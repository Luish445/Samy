(function() {
  const pedidoLocal = new Map();

  const $root   = document.getElementById('catalogoTabla');
  const waPhone = $root?.getAttribute('data-wa-phone')  || '521234567890';
  const waPrefix= $root?.getAttribute('data-wa-prefix') || 'Hola, me gustaría solicitar este pedido:%0A';
  const $btnWA  = document.getElementById('btnWA');

  // === Render carrito visible ===
  function renderCart() {
    const cartContainer = document.getElementById('cartItems');
    const totalEl = document.getElementById('cartTotal');
    if (!cartContainer || !totalEl) return;

    cartContainer.innerHTML = '';
    let total = 0;

    pedidoLocal.forEach(item => {
      let subtotal = 0;
      item.tallas.forEach(t => subtotal += t.qty);
      total += subtotal;

      const tallasHtml = item.tallas.map(t => `<div>Talla ${t.talla}: ${t.qty}</div>`).join('');
      cartContainer.innerHTML += `
        <div class="cart-item">
          <img src="${item.img}" alt="${item.name}">
          <div class="cart-item-info">
            <div><strong>${item.name}</strong></div>
            ${tallasHtml}
          </div>
        </div>
      `;
    });

    totalEl.textContent = `${total} pares`;
  }

  // === Click en “Agregar” ===
  $root.addEventListener('click', async (ev)=>{
    const btn = ev.target.closest('.btn-add');
    if(!btn) return;

    const row = btn.closest('tr.item');
    const sku   = (row.getAttribute('data-sku')   || '').trim();
    const name  = (row.getAttribute('data-name')  || '').trim();
    const img   = row.getAttribute('data-img') || row.querySelector('img')?.src || '';

    const tallas = [];
    row.querySelectorAll('.talla-box').forEach(box=>{
      // Capturar la talla como cadena (por ejemplo, '22')
      const talla = box.textContent.trim().split(' ')[0]; 
      const qty = parseInt(box.querySelector('input')?.value || '0',10);
      // Solo agregamos tallas con cantidad > 0, como antes
      if(qty>0) tallas.push({talla, qty}); 
    });

    if (tallas.length === 0) {
      alert('Debes ingresar al menos una cantidad en alguna talla.');
      return;
    }

    pedidoLocal.set(sku, { name, img, tallas });
    renderCart();
    alert(`${name} agregado al carrito ✅`);
  });

  // === Enviar pedido por WhatsApp con PDF (LÓGICA CORREGIDA) ===
  $btnWA.addEventListener('click', async () => {
  if (!window.jspdf) {
    alert('Falta jsPDF. Asegúrate de cargarlo antes de catalogo.js');
    return;
  }
  if (pedidoLocal.size === 0) {
    alert('Aún no has agregado artículos al carrito.');
    return;
  }

  // 1. Configuración de PDF en modo horizontal (Landscape)
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF({ orientation: 'l' }); // MODO HORIZONTAL (Landscape)

  // -------- helpers --------
  const loadAsDataURL = (url) =>
    new Promise((resolve) => {
      const img = new Image();
      img.crossOrigin = 'anonymous';
      img.onload = () => {
        try {
          const c = document.createElement('canvas');
          c.width = img.naturalWidth;
          c.height = img.naturalHeight;
          const ctx = c.getContext('2d');
          ctx.drawImage(img, 0, 0);
          resolve(c.toDataURL('image/jpeg', 0.9)); // usamos JPEG para compatibilidad
        } catch (_) {
          resolve(null);
        }
      };
      img.onerror = () => resolve(null);
      img.src = url;
    });

  const pageWidth = doc.internal.pageSize.getWidth();
  const pageHeight = doc.internal.pageSize.getHeight(); 
  const left = 15;
  const top = 18;

  doc.setFontSize(18);
  doc.text('Pedido', left, top);
  doc.setFontSize(12);
  doc.text('Resumen de artículos solicitados', left, top + 7);

  // --- 2. Definición de Tallas y Columnas ---
  const ALL_SIZES = Array.from({ length: 46 - 22 + 1 }, (_, i) => String(22 + i)); 
  const sizeCols = ALL_SIZES.length; 
  
  // Alturas de las sub-filas (NUEVAS VARIABLES)
  const rowHHeader = 10;
  const rowHTalla = 8; // Talla: fila superior (más delgada)
  const rowHCantidad = 14; // Cantidad: fila inferior (más alta para diferenciar)
  const rowHTotal = rowHTalla + rowHCantidad; // 22mm de altura total por producto

  // Anchos de columna: # | Código | Producto | Foto (25mm) | Tallas...
  // Columna Foto (índice 3) aumentada de 20 a 25.
  const colWBase = [10, 25, 40, 25]; 
  const colWSize = 7; // Ancho para cada columna de talla
  
  const colWTotal = [...colWBase, ...Array(sizeCols).fill(colWSize)];
  const tableWidth = colWTotal.reduce((a, b) => a + b, 0);

  // Encabezados (Tabla superior)
  const headers = ['#', 'Cod.', 'Producto', 'Foto', ...ALL_SIZES];

  const startY = top + 17;
  
  let y = startY;
  let idx = 1;

  // Encabezados de la Tabla PDF (dibujado en una sola fila inicial)
  doc.setFont('helvetica', 'bold');
  let x = left;
  for (let i = 0; i < headers.length; i++) {
    const width = colWTotal[i];
    doc.rect(x, y, width, rowHHeader);
    const textX = (i < colWBase.length) ? x + 2 : x + (width / 2); // Izquierda o centrado
    doc.text(headers[i], textX, y + 6, null, null, (i < colWBase.length ? 'left' : 'center'));
    x += width;
  }
  y += rowHHeader;
  doc.setFont('helvetica', 'normal');

  const ensureSpace = (needed) => {
    const bottom = pageHeight - 15; 
    if (y + needed > bottom) {
      doc.addPage();
      y = 20;

      // redibujar encabezados en nueva página
      doc.setFont('helvetica', 'bold');
      let xh = left;
      for (let i = 0; i < headers.length; i++) {
        const width = colWTotal[i];
        doc.rect(xh, y, width, rowHHeader);
        const textX = (i < colWBase.length) ? xh + 2 : xh + (width / 2);
        doc.text(headers[i], textX, y + 6, null, null, (i < colWBase.length ? 'left' : 'center'));
        xh += width;
      }
      y += rowHHeader;
      doc.setFont('helvetica', 'normal');
    }
  };

  // --- 3. Filas de datos (Talla + Cantidad = rowHTotal de altura) ---
  for (const [sku, item] of pedidoLocal) {
    
    const currentTallasMap = new Map(item.tallas.map(t => [t.talla, t.qty]));

    ensureSpace(rowHTotal); 

    // --- FILA DE DATOS (rowHTotal de altura total) ---
    
    // Rellenar las dos filas para el efecto cebra
    if (idx % 2 === 0) {
      doc.setFillColor(245, 245, 245);
      doc.rect(left, y, tableWidth, rowHTotal, 'F');
    }

    // Parte de Producto (Cols 0-3) - Abarcan las DOS filas
    let cx = left;

    // Col 0: # 
    doc.rect(cx, y, colWTotal[0], rowHTotal); 
    doc.text(String(idx), cx + 2, y + rowHTotal / 2 + 3); 
    cx += colWTotal[0];
    
    // Col 1: Código
    doc.rect(cx, y, colWTotal[1], rowHTotal);
    doc.text(sku, cx + 2, y + rowHTotal / 2 + 3);
    cx += colWTotal[1];

    // Col 2: Producto (multilínea)
    doc.rect(cx, y, colWTotal[2], rowHTotal);
    const prodLines = doc.splitTextToSize(item.name, colWTotal[2] - 4);
    doc.text(prodLines, cx + 2, y + rowHTotal / 2 + 3); 
    cx += colWTotal[2];

    // Col 3: Foto (Abarca ambas sub-filas y es más ancha)
    doc.rect(cx, y, colWTotal[3], rowHTotal);
    if (item.img) {
      const dataURL = await loadAsDataURL(item.img);
      if (dataURL) {
        const maxW = colWTotal[3] - 4;
        const maxH = rowHTotal - 4;
        doc.addImage(dataURL, 'JPEG', cx + 2, y + 2, maxW, maxH);
      }
    }
    cx += colWTotal[3];
    
    // Columnas de Talla (Fila 1: TALLAS)
    let cx1 = cx;
    for (const size of ALL_SIZES) {
      const width = colWSize;
      
      doc.rect(cx1, y, width, rowHTalla); // Celda de Talla (fila superior, 8mm)
      doc.text(size, cx1 + (width / 2), y + 6, null, null, 'center');
      cx1 += width;
    }
    
    // Columnas de Cantidad (Fila 2: CANTIDADES)
    let cx2 = cx; 
    for (const size of ALL_SIZES) {
      const width = colWSize;
      
      // Celda de Cantidad (fila inferior, 14mm)
      doc.rect(cx2, y + rowHTalla, width, rowHCantidad); 
      
      const qty = currentTallasMap.get(size) || 0;
      if (qty > 0) {
        // Escribir cantidad
        // Posición ajustada para centrar verticalmente en la fila de 14mm
        doc.text(String(qty), cx2 + (width / 2), y + rowHTalla + 9, null, null, 'center'); 
      }
      
      cx2 += width;
    }
    
    y += rowHTotal; // Avanza por la altura total de las dos filas
    idx++;
  }

  // pie de página
  doc.setFont('helvetica', 'italic');
  doc.text('Gracias por tu pedido', left, doc.internal.pageSize.getHeight() - 10);

  // ------- subir PDF y enviar a WhatsApp -------
  const pdfBlob = doc.output('blob');
  const formData = new FormData();
  formData.append('file', pdfBlob, 'pedido.pdf');

  try {
    const res = await fetch('https://samisneakers.com/wp-content/uploads/pedidos/upload-pedido.php', {
      method: 'POST',
      body: formData
    });
    const data = await res.json();
    if (!data.url) throw new Error(data.error || 'Error al subir el PDF');

    // construir mensaje de WhatsApp (manteniendo el formato anterior)
    const lines = [];
    pedidoLocal.forEach((item) => {
      lines.push(`*${item.name}* (${item.tallas.length} tallas seleccionadas)`);
      item.tallas.forEach((t) => lines.push(`Talla ${t.talla}: ${t.qty} par(es)`));
      if (item.img) lines.push(`📸 ${item.img}`);
      lines.push(''); // línea en blanco
    });
    lines.push(`📄 PDF del pedido: ${data.url}`);

    const body = ( $root?.getAttribute('data-wa-prefix') || 'Hola, me gustaría solicitar este pedido:%0A' )
                 + encodeURIComponent(lines.join('\n'))
                 + encodeURIComponent('\nGracias.');
    const phone = $root?.getAttribute('data-wa-phone') || '521234567890';
    const href = `https://wa.me/${phone}?text=${body}`;
    window.open(href, '_blank');
  } catch (err) {
    console.error(err);
    alert('No se pudo subir el PDF. Intenta de nuevo.');
  }
});


  // === Lightbox ===
  const lightbox = document.createElement("div");
  lightbox.classList.add("lightbox");
  lightbox.innerHTML = `<span class="close-btn">&times;</span><img src="" alt="preview">`;
  // document.body.appendChild(lightbox); // Línea original comentada. Asumiendo que el lightbox ya está en el DOM

  const lightboxImg = document.getElementById('lightbox')?.querySelector("img") || document.querySelector(".lightbox img");
  const closeBtn = document.getElementById('lightbox')?.querySelector(".close-btn") || document.querySelector(".lightbox .close-btn");

  document.querySelectorAll(".preview img").forEach(img=>{
    img.addEventListener("click", (e)=>{
      e.preventDefault();
      if(lightboxImg) {
        lightboxImg.src = img.src;
        document.getElementById('lightbox')?.classList.add("active");
      }
    });
  });

// === Acordeón de marcas (mejorado para móviles) ===
document.querySelectorAll('.brand-toggle').forEach(btn => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();

    const content = btn.nextElementSibling;
    const isActive = content.classList.contains('active');

    // Cierra todos los demás
    document.querySelectorAll('.brand-content.active').forEach(open => {
      if (open !== content) open.classList.remove('active');
    });

    // Alterna el seleccionado
    content.classList.toggle('active', !isActive);
  });

  // Soporte adicional para eventos táctiles
  btn.addEventListener('touchend', (e) => {
    e.preventDefault();
    btn.click();
  });
});



  if (closeBtn) closeBtn.addEventListener("click", ()=> document.getElementById('lightbox')?.classList.remove("active"));
  document.getElementById('lightbox')?.addEventListener("click", (e)=>{ if(e.target===document.getElementById('lightbox')) document.getElementById('lightbox')?.classList.remove("active"); });

  // === Cambio de marcas con animación tipo aparador ===
const tabs = document.querySelectorAll('.brand-tab');
const views = document.querySelectorAll('.brand-view');

tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const target = tab.dataset.target;

    // Cambiar pestaña activa
    tabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');

    // Animación de cambio de vista
    views.forEach(v => {
      v.classList.remove('active');
      if (v.id === target) v.classList.add('active');
    });
  });
});

// === LÓGICA DE DETECCIÓN DE ORIENTACIÓN (Popup) ===
document.addEventListener('DOMContentLoaded', function() {
    const alert = document.getElementById('orientationAlert');
    // Coincide con la media query CSS para definir "móvil" (720px es el breakpoint que usaste)
    const isMobile = window.matchMedia("(max-width: 720px)").matches; 

    // Solo ejecuta la lógica de orientación si el elemento existe Y es un dispositivo móvil
    if (!alert || !isMobile) return;

    function checkOrientation() {
        // Muestra el pop-up si la altura es mayor que la anchura (modo vertical/portrait)
        if (window.innerHeight > window.innerWidth) {
            // Utilizamos la clase 'active' que definimos en el CSS
            alert.classList.add('active');
        } else {
            // Oculta el pop-up en modo horizontal/landscape
            alert.classList.remove('active');
        }
    }

    // 1. Comprobar la orientación al cargar la página
    checkOrientation();

    // 2. Comprobar la orientación al cambiar la orientación del dispositivo o redimensionar la ventana
    window.addEventListener('resize', checkOrientation);
    window.addEventListener('orientationchange', checkOrientation);
});



})();

<?php
/* Template Name: Catálogo
get_header(); */
?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<main class="catalogo-page">
  <section class="catalogo-section">
    <h1>Catálogo de Productos</h1>

    <!-- === AQUI PEGAS TU CÓDIGO HTML DEL CATÁLOGO === -->
    <div class="catalogo-container">
      <!-- ======= CATÁLOGO EN TABLA (WooCommerce) ======= -->
<style>
  .catwrap {
    font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    width: 100%;
  }

  .catwrap table {
    width: 100%;
    border-collapse: collapse;
  }

  .catwrap th,
  .catwrap td {
    border-bottom: 1px solid #eee;
    padding: 10px;
    text-align: left;
    vertical-align: middle;
    font-size: 0.95rem;
  }

  .catwrap th {
    background: #000;
    color: #fff !important;
    font-weight: 600;
  }

  .catwrap img {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border-radius: 6px;
    cursor: pointer;
  }

  .catwrap .tallas {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
  }

  .catwrap .talla-box {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 0.9rem;
    background: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 4px 6px;
  }

  .catwrap .talla-box input[type="number"] {
    width: 45px;
    text-align: center;
    border-radius: 6px;
    border: 1px solid #bbb;
    padding: 3px;
  }

  .catwrap .btn {
    display: inline-block;
    padding: 8px 12px;
    border-radius: 8px;
    border: 0;
    cursor: pointer;
    font-size: 0.9rem;
  }

  .catwrap .btn-add {
    background: #111;
    color: #fff;
    font-weight: 600;
  }

  .catwrap .btn-add[disabled] {
    opacity: .5;
    cursor: not-allowed;
  }

  .catwrap .footbar {
    margin-top: 16px;
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
  }

  .catwrap .btn-wa {
    background: #25D366;
    color: #fff;
    font-weight: 600;
    padding: 10px 15px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
  }

  /* Zebra */
  .catwrap tbody tr:nth-child(odd) {
    background-color: #ffffff;
  }

  .catwrap tbody tr:nth-child(even) {
    background-color: #f5f5f5;
  }

  /* Hover */
  .catwrap tbody tr:hover {
    background-color: #d1ecf1;
    transition: background-color 0.3s ease;
  }

  /* Lightbox */
  .lightbox {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .lightbox.active {
    visibility: visible;
    opacity: 1;
  }

  .lightbox img {
    width: auto;
    height: auto;
    max-width: 95vw;
    max-height: 95vh;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
    animation: zoomIn 0.3s ease;
    object-fit: contain;
  }

  @keyframes zoomIn {
    from {
      transform: scale(0.8);
      opacity: 0;
    }
    to {
      transform: scale(1);
      opacity: 1;
    }
  }

  .lightbox .close-btn {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 2.5rem;
    font-weight: bold;
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    cursor: pointer;
    user-select: none;
    z-index: 10001;
  }

  /* Carrito */
  .cart-panel {
    margin-top: 30px;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family: system-ui, sans-serif;
  }

  .cart-panel h3 {
    margin-bottom: 15px;
    font-size: 1.2rem;
    font-weight: 600;
  }

  #cartItems {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .cart-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #eee;
  }

  .cart-item img {
    width: 48px;
    height: 48px;
    object-fit: cover;
    border-radius: 6px;
  }

  .cart-item-info {
    flex: 1;
    margin-left: 10px;
  }

  .cart-total {
    text-align: right;
    margin-top: 15px;
    font-weight: 600;
  }

  /* ===== MÓVILES: TARJETAS ===== */
  @media (max-width: 480px) {
    .catwrap table,
    .catwrap thead,
    .catwrap tbody,
    .catwrap th,
    .catwrap td,
    .catwrap tr {
      display: block !important;
      width: 100% !important;
    }

    .catwrap thead {
      display: none !important;
    }

    .catwrap tr {
      margin-bottom: 15px !important;
      border: 1px solid #ddd !important;
      border-radius: 8px !important;
      padding: 10px !important;
      background: #fff !important;
    }

    .catwrap td {
      border: none !important;
      padding: 6px 0 !important;
      display: flex !important;
      flex-direction: column !important;
      align-items: flex-start !important;
      font-size: 0.9rem !important;
    }

    .catwrap td::before {
      content: attr(data-label);
      font-weight: bold;
      margin-bottom: 4px;
      color: #333;
    }

    .catwrap img {
  /* Asegura que la imagen tenga un ancho flexible que respete los márgenes */
      width: calc(100% - 20px); /* 100% del contenedor menos (10px izq + 10px der) */
      height: auto;
  
  /* Centra la imagen y aplica el margen inferior */
      display: block; 
      margin: 0 auto 10px auto; /* 0 superior, 'auto' laterales (para centrar), 10px inferior */
    }

    .catwrap .tallas {
      flex-direction: column;
      gap: 6px;
    }

    .catwrap .talla-box {
      justify-content: space-between;
      width: 100%;
    }
  }

/* Ajustes para tablas dentro de marcas */
.brand-table {
  width: 100%;
  border-collapse: collapse;
}

.brand-table th {
  background: #000;
  color: #fff;
}

.brand-table td {
  vertical-align: middle;
  border-bottom: 1px solid #eee;
}

/* ==== Diseño tallas y cantidades ==== */
.tallas {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  justify-content: flex-start;
}

.talla-box {
  display: flex;
  align-items: center;
  gap: 6px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 4px 10px;
  background: #fff;
  font-size: 0.95rem;
}

.talla-box input[type="number"] {
  width: 50px;
  padding: 4px;
  border: 1px solid #ccc;
  border-radius: 4px;
  text-align: center;
}

/* ==== En móviles: dos columnas ==== */
@media (max-width: 720px) {
  .tallas {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 6px;
  }

  .talla-box {
    justify-content: space-between;
  }

  .talla-box input[type="number"] {
    width: 60px;
  }
}

/* ==== Ajustes responsivos para móviles ==== */
@media (max-width: 720px) {

  /* Quita márgenes laterales y ajusta todo al 100% */
  .catwrap table,
  .catwrap tbody,
  .catwrap tr,
  .catwrap td {
    width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
  }

  .brand-table {
    width: 100%;
    border-spacing: 0;
  }

  .brand-content {
    padding: 0;
  }

  /* ---- Tallas ---- */
  .tallas {
    width: 100%;
    max-width: 100%;
    margin: 0;
    padding: 8px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
  }

  .talla-box {
    width: 100%;
    box-sizing: border-box;
    justify-content: space-between;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 6px 10px;
    background: #fff;
  }

  .talla-box input[type="number"] {
    width: 55px;
    text-align: center;
    border-radius: 4px;
    border: 1px solid #ccc;
    padding: 4px;
  }

  /* ---- Botón “Agregar” centrado ---- */
  .btn-add {
    display: block;
    width: calc(100% - 20px);
    margin: 15px auto 10px auto;
    text-align: center;
    font-weight: 600;
    font-size: 1rem;
    background: #111;
    color: #fff;
    padding: 10px;
    border-radius: 8px;
  }

  .btn-add:active {
    background: #222;
  }
}


/* ==== Corrección final del espacio lateral derecho en móviles ==== */
@media (max-width: 720px) {

  html, body {
    overflow-x: hidden !important;
    width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;    
  }

  .catwrap, 
  .brand-section, 
  .brand-content, 
  .brand-table,
  .catwrap table,
  .catwrap tbody,
  .catwrap tr,
  .catwrap td {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    box-sizing: border-box;
  }

  .tallas {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
    padding: 8px;
    box-sizing: border-box;
  }

  .talla-box {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .talla-box input[type="number"] {
    width: 55px;
    text-align: center;
  }

  .btn-add {
    display: block;
    width: 90%;
    margin: 15px auto;
    text-align: center;
  }
}

/* ====== Barra superior de marcas ====== */
.brand-tabs {
  display: flex;
  justify-content: center;
  gap: 12px;
  margin: 20px 0;
  flex-wrap: wrap;
  
  /* === INICIO DE CORRECCIÓN PARA CLICS EN MÓVIL === */
  position: relative; /* Necesario para que z-index funcione correctamente */
  z-index: 100;     /* Asegura que los botones estén por encima de cualquier otro elemento. */
  /* === FIN DE CORRECCIÓN === */
}

/* ... el resto de tu CSS ... */

.brand-tab {
  background: #111;
  color: white;
  border: none;
  padding: 10px 10px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  transition: transform 0.3s ease, background 0.3s ease;
}

.brand-tab:hover {
  background: #25D366;
  transform: scale(1.05);
}

.brand-tab.active {
  background: #25D366;
}

/* ====== Contenedor de vistas (brand-views) ====== */
.brand-views {
  position: relative !important;
  perspective: 1000px;
  /* ELIMINAR: min-height: 400px; */ 
  height: auto; /* CRÍTICO: Asegura que el contenedor se ajuste al contenido. */
  display: block !important; /* Debe estar visible y en el flujo. */
  width: 100%;
  margin: 0 !important;
  padding: 0 !important;
}

/* Base de la vista de marca (Inactiva por defecto) */
.brand-view {
  /* ¡CRÍTICO! Esta combinación de reglas oculta el elemento Y asegura que NO ocupe espacio. */
  position: absolute !important; 
  display: none !important;
  
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0;
  transform: rotateY(90deg);
  transition: all 0.6s ease;
  pointer-events: none;
}

/* La marca visible y activa */
.brand-view.active {
  /* ¡CRÍTICO! Lo volvemos 'relative' para que OCUPE su espacio y empuje el contenido. */
  position: relative !important; 
  display: block !important; /* Muestra el contenido. */
  
  opacity: 1 !important;
  transform: rotateY(0deg) !important;
  pointer-events: auto !important;
}

/* === POPUP MODO HORIZONTAL (CSS) === */
.orientation-alert {
  display: none; /* Oculto por defecto */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.95);
  color: white;
  z-index: 10000;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 20px;
  text-align: center;
}

.orientation-alert p {
  font-size: 1.5rem;
  margin-bottom: 20px;
  font-weight: 600;
  max-width: 80%;
}

.orientation-alert .icon {
  display: block;
  font-size: 3rem;
  margin-bottom: 10px;
}

.orientation-alert button {
  padding: 10px 20px;
  background: #25D366;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 1.1rem;
  font-weight: bold;
}

/* REGLA CRÍTICA: Solo se muestra si es mobile, en modo vertical Y tiene la clase 'active' (puesta por JS) */
@media screen and (orientation: portrait) and (max-width: 720px) {
  .orientation-alert.active {
    display: flex;
  }
}
</style>


<div class="catwrap" id="catalogoTabla" data-wa-phone="523328668222"
  data-wa-prefix="Hola, me gustaría solicitar este pedido:%0A">

<div class="orientation-alert" id="orientationAlert">
   <p>
       <span class="icon">🔄</span>
       Para una mejor visualización del catálogo, por favor, gira tu teléfono a modo <strong>horizontal</strong> (paisaje).
   </p>
   <button onclick="document.getElementById('orientationAlert').style.display='none'">Entendido</button>
</div>

<div class="brand-tabs">
  <button class="brand-tab active" data-target="newbalance">New Balance</button>
  <button class="brand-tab" data-target="nike">Nike</button>
  <button class="brand-tab" data-target="adidas">Adidas</button>
  <button class="brand-tab" data-target="timberland">Timberland</button>
  <button class="brand-tab" data-target="puma">Puma</button>
  <button class="brand-tab" data-target="louis">Louis Vuiton</button>
  <button class="brand-tab" data-target="on">ON</button>
  <button class="brand-tab" data-target="under">Under Armour</button>
  <button class="brand-tab" data-target="balenciaga">Balenciaga</button>
  <button class="brand-tab" data-target="off">Off White</button>
  <button class="brand-tab" data-target="dior">Dior</button>
  <button class="brand-tab" data-target="golden">Golden Goose</button>
  <button class="brand-tab" data-target="hugo">Hugo Boss</button>
  <button class="brand-tab" data-target="amiri">Amiri</button>
  <button class="brand-tab" data-target="queen">Alexander McQueen</button>
</div>

<div class="brand-views">
  <!-- ======== SECCIÓN New Balance ======== -->
  <div class="brand-view active" id="newbalance">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <!-- ======= Producto 1 ======= -->
        <tr class="item" data-sku="SNK-001" data-name="New balance rosa con blanco" data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM.jpeg">
          <td data-label="Código">SNK-001</td>
          <td data-label="Foto">
            <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM.jpeg" class="preview">
              <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM.jpeg" alt="New Balance Rosa con blanco">
            </a>
          </td>
          <td data-label="Tallas y cantidades">
            <div class="tallas">
              <div class="talla-box">22 <input type="number" min="0" value="0"></div>
              <div class="talla-box">23 <input type="number" min="0" value="0"></div>
              <div class="talla-box">24 <input type="number" min="0" value="0"></div>
              <div class="talla-box">25 <input type="number" min="0" value="0"></div>
              <div class="talla-box">26 <input type="number" min="0" value="0"></div>
              <div class="talla-box">27 <input type="number" min="0" value="0"></div>
              <div class="talla-box">28 <input type="number" min="0" value="0"></div>
              <div class="talla-box">29 <input type="number" min="0" value="0"></div>
              <div class="talla-box">30 <input type="number" min="0" value="0"></div>
              <div class="talla-box">31 <input type="number" min="0" value="0"></div>
              <div class="talla-box">32 <input type="number" min="0" value="0"></div>
              <div class="talla-box">33 <input type="number" min="0" value="0"></div>
              <div class="talla-box">34 <input type="number" min="0" value="0"></div>
              <div class="talla-box">35 <input type="number" min="0" value="0"></div>
              <div class="talla-box">36 <input type="number" min="0" value="0"></div>
              <div class="talla-box">37 <input type="number" min="0" value="0"></div>
              <div class="talla-box">38 <input type="number" min="0" value="0"></div>
              <div class="talla-box">39 <input type="number" min="0" value="0"></div>
              <div class="talla-box">40 <input type="number" min="0" value="0"></div>
              <div class="talla-box">41 <input type="number" min="0" value="0"></div>
              <div class="talla-box">42 <input type="number" min="0" value="0"></div>
              <div class="talla-box">43 <input type="number" min="0" value="0"></div>
              <div class="talla-box">44 <input type="number" min="0" value="0"></div>
              <div class="talla-box">45 <input type="number" min="0" value="0"></div>
              <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
            </div>
          </td>

          <td data-label="">
            <button class="btn btn-add">Agregar</button>
          </td>
        </tr>
        <!-- ======= Producto 2 ======= -->
        <tr class="item"
          data-brand="Adidas"
          data-product-id="1002"
          data-sku="SNK-002"
          data-name="New Balance 2"
          data-price="850.00"
          data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-1.jpeg">

          <td data-label="Código">SNK-002</td>

          <td data-label="Foto">
            <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-1.jpeg" class="preview">
              <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-1.jpeg" alt="New balance 2">
            </a>
          </td>

          <td data-label="Tallas y cantidades">
            <div class="tallas">
              <div class="talla-box">22 <input type="number" min="0" value="0"></div>
              <div class="talla-box">23 <input type="number" min="0" value="0"></div>
              <div class="talla-box">24 <input type="number" min="0" value="0"></div>
              <div class="talla-box">25 <input type="number" min="0" value="0"></div>
              <div class="talla-box">26 <input type="number" min="0" value="0"></div>
              <div class="talla-box">27 <input type="number" min="0" value="0"></div>
              <div class="talla-box">28 <input type="number" min="0" value="0"></div>
              <div class="talla-box">29 <input type="number" min="0" value="0"></div>
              <div class="talla-box">30 <input type="number" min="0" value="0"></div>
              <div class="talla-box">31 <input type="number" min="0" value="0"></div>
              <div class="talla-box">32 <input type="number" min="0" value="0"></div>
              <div class="talla-box">33 <input type="number" min="0" value="0"></div>
              <div class="talla-box">34 <input type="number" min="0" value="0"></div>
              <div class="talla-box">35 <input type="number" min="0" value="0"></div>
              <div class="talla-box">36 <input type="number" min="0" value="0"></div>
              <div class="talla-box">37 <input type="number" min="0" value="0"></div>
              <div class="talla-box">38 <input type="number" min="0" value="0"></div>
              <div class="talla-box">39 <input type="number" min="0" value="0"></div>
              <div class="talla-box">40 <input type="number" min="0" value="0"></div>
              <div class="talla-box">41 <input type="number" min="0" value="0"></div>
              <div class="talla-box">42 <input type="number" min="0" value="0"></div>
              <div class="talla-box">43 <input type="number" min="0" value="0"></div>
              <div class="talla-box">44 <input type="number" min="0" value="0"></div>
              <div class="talla-box">45 <input type="number" min="0" value="0"></div>
              <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
            </div>
          </td>

          <td data-label="">
            <button class="btn btn-add">Agregar</button>
          </td>
        </tr>

      

      <tr class="item"
        data-sku="SNK-003"
        data-name="New Balance Gris"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-7.jpeg">

        <td data-label="Código">SNK-003</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-7.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-7.jpeg" alt="New Balance gris con blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-004"
        data-name="New Balance 1000"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-4.jpeg">

        <td data-label="Código">SNK-004</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-4.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-4.jpeg" alt="New Balance 1000">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>
      
      <tr class="item"
        data-sku="SNK-005"
        data-name="New Balance Rosa con Gris"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-2.jpeg">

        <td data-label="Código">SNK-005</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-2.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-2.jpeg" alt="New Balance Rosa con Gris">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-006"
        data-name="New Balance Verde y Morado"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM-2.jpeg">

        <td data-label="Código">SNK-006</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM-2.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM-2.jpeg" alt="New Balance Verde y Morado">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-007"
        data-name="New Balance Rosa claro con blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM.jpeg">

        <td data-label="Código">SNK-007</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM.jpeg" alt="New Balance Rosa claro con blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-008"
        data-name="New Balance Verde con morado"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-3.jpeg">

        <td data-label="Código">SNK-008</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-3.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-3.jpeg" alt="New Balance Verde con morado">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-009"
        data-name="New Balance rosa morado y gris"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-3.jpeg">

        <td data-label="Código">SNK-009</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-3.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-3.jpeg" alt="New Balance rosa morado y gris">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-010"
        data-name="New Balance Blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-3.jpeg">

        <td data-label="Código">SNK-010</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-3.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-3.jpeg" alt="New Balance Blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-010"
        data-name="New Balance Azul con blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-8.jpeg">

        <td data-label="Código">SNK-010-A</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-8.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-8.jpeg" alt="Adidas Questar 2 M">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-011"
        data-name="New Balance rosa"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-2.jpeg">

        <td data-label="Código">SNK-011</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-2.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-2.jpeg" alt="New Balance Rosa">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-012"
        data-name="New Balance Solo Rosa"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-3.jpeg">

        <td data-label="Código">SNK-012</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-3.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-3.jpeg" alt="New Balance solo rosa">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-013"
        data-name="New Balance Rosa con cafe"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-9.jpeg">

        <td data-label="Código">SNK-013</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-9.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-9.jpeg" alt="New Balance rosa con cafe">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-014"
        data-name="New Balance cafe"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-7.jpeg">

        <td data-label="Código">SNK-014</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-7.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-7.jpeg" alt="New Balance Cafe">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      </tbody>
    </table>
  </div>
<!-- === Seccion Nike === -->
  <div class="brand-view" id="nike">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
        data-sku="SNK-015"
        data-name="Nike air rojo"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-4.jpeg">

        <td data-label="Código">SNK-015</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-4.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-4.jpeg" alt="Adidas Questar 2 M">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-016"
        data-name="Nike Rosa con Blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-2.jpeg">

        <td data-label="Código">SNK-016</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-2.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-2.jpeg" alt="Adidas Questar 2 M">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-017"
        data-name="Nike Air Negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-3.jpeg">

        <td data-label="Código">SNK-017</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-3.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-3.jpeg" alt="Adidas Questar 2 M">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-018"
        data-name="Nike Air Force 1 blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-8.jpeg">

        <td data-label="Código">SNK-018</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-8.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-8.jpeg" alt="Nike Air Force 1 blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-019"
        data-name="Nike verde con cafe"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-6.jpeg">

        <td data-label="Código">SNK-019</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-6.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-6.jpeg" alt="Nike verde con cafe">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-020"
        data-name="Nike Air verde con blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.39-PM-2.jpeg">
        <td data-label="Código">SNK-020</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.39-PM-2.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.39-PM-2.jpeg" alt="Nike Air verde con blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-021"
        data-name="Nike blanco y negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.39-PM-1.jpeg">

        <td data-label="Código">SNK-021</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.39-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.39-PM-1.jpeg" alt="Nike blanco y negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-022"
        data-name="Nike Air force 1 cafe con gris"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM.jpeg">

        <td data-label="Código">SNK-022</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM.jpeg" alt="Nike Air force 1 cafe con gris">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-023"
        data-name="Nike air force 1 rojo"
        data-img="https://simysneakers.site/wp-content/uploads/2025/09/AdiAzu.webp">

        <td data-label="Código">SNK-023</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/09/AdiAzu.webp" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/09/AdiAzu.webp" alt="Nike air force 1 rojo">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-024"
        data-name="Nike Air force 1 negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-1.jpeg">

        <td data-label="Código">SNK-024</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-1.jpeg" alt="Nike Air force 1 negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-025"
        data-name="Nike Air max verde"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM.jpeg">

        <td data-label="Código">SNK-025</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM.jpeg" alt="Nike Air max verde">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-026"
        data-name="Nike Air blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM.jpeg">

        <td data-label="Código">SNK-026</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM.jpeg" alt="Nike air blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-027"
        data-name="Nike moderno negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM-3.jpeg">

        <td data-label="Código">SNK-027</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM-3.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.38-PM-3.jpeg" alt="Nike Moderno negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-028"
        data-name="Nike moderno blanco y negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-5.jpeg">

        <td data-label="Código">SNK-028</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-5.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-5.jpeg" alt="Nike moderno blanco y negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-029"
        data-name="Nike moderno y clasico negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-2.jpeg">

        <td data-label="Código">SNK-029</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-2.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-2.jpeg" alt="Nike moderno y clasico negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-030"
        data-name="Nike sport negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-1.jpeg">

        <td data-label="Código">SNK-030</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-1.jpeg" alt="Nike sport negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-031"
        data-name="Nike modern negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.45-PM-1.jpeg">

        <td data-label="Código">SNK-031</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.45-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.45-PM-1.jpeg" alt="Nike modern negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-032"
        data-name="Nike classic negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-7.jpeg">

        <td data-label="Código">SNK-032</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-7.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-7.jpeg" alt="Nike classic negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-033"
        data-name="Nike modern blanco con negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-1.jpeg">

        <td data-label="Código">SNK-033</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-1.jpeg" alt="Nike modern blanco y negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-034"
        data-name="Nike run rojo"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-9.jpeg">

        <td data-label="Código">SNK-034</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-9.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-9.jpeg" alt="Nike run rojo">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-035"
        data-name="Nike varios colores"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-7.jpeg">

        <td data-label="Código">SNK-035</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-7.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-7.jpeg" alt="Nike varios colores">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-036"
        data-name="Nike retro cafe y negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-1.jpeg">

        <td data-label="Código">SNK-036</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-1.jpeg" alt="Nike retro cafe y negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-037"
        data-name="Nike modern blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-10.jpeg">

        <td data-label="Código">SNK-037</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-10.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-10.jpeg" alt="Nike modern blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-038"
        data-name="Nike Air f1 botin blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-7.jpeg">

        <td data-label="Código">SNK-038</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-7.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-7.jpeg" alt="Nike AF1 botin blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-039"
        data-name="Nike classic rosa"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-11.jpeg">

        <td data-label="Código">SNK-039</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-11.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-11.jpeg" alt="Nike classic rosa">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-040"
        data-name="Nike Run cafe con blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-8.jpeg">

        <td data-label="Código">SNK-040</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-8.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-8.jpeg" alt="Nike run cafe con blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-041"
        data-name="Nike clasico y moderno gris con negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-6.jpeg">

        <td data-label="Código">SNK-041</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-6.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-6.jpeg" alt="Nike clasico y moderno gris con negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-042"
        data-name="Nike jordan negro brillo"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-1.jpeg">

        <td data-label="Código">SNK-042</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-1.jpeg" alt="Nike jordan negro brillo">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-043"
        data-name="Jordan moderno rojo y negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-1.jpeg">

        <td data-label="Código">SNK-043</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-1.jpeg" alt="Jordan moderno rojo y negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-044"
        data-name="Jordan moderno negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-1.jpeg">

        <td data-label="Código">SNK-044</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-1.jpeg" alt="Jordan moderno negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-045"
        data-name="Jordan moderno blanco y negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM.jpeg">

        <td data-label="Código">SNK-045</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM.jpeg" alt="Jordan moderno blanco y negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-046"
        data-name="Jordan classic plata y blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-2.jpeg">

        <td data-label="Código">SNK-046</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-2.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-2.jpeg" alt="Jordan classic plata y blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-047"
        data-name="Jordan rojo y negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-8.jpeg">

        <td data-label="Código">SNK-047</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-8.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-8.jpeg" alt="Jordan rojo y negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-048"
        data-name="Jordan plata y negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM.jpeg">

        <td data-label="Código">SNK-048</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM.jpeg" alt="Jordan plata y negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-049"
        data-name="Jordan retro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-11.jpeg">

        <td data-label="Código">SNK-049</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-11.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-11.jpeg" alt="Jordan retro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-050"
        data-name="Jordan negro brillo"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-1.jpeg">

        <td data-label="Código">SNK-050</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-1.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-1.jpeg" alt="Jordan negro brillo">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
        </tr>
      </tbody>
    </table>
  </div>
  
  <div class="brand-view" id="adidas">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <!-- ======= Producto 1 ======= -->
        <tr class="item" data-sku="SNK-051" data-name="Adidas samba red" data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM.jpeg">
          <td data-label="Código">SNK-051</td>
          <td data-label="Foto">
            <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM.jpeg" class="preview">
              <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM.jpeg" alt="Adidas samba red">
            </a>
          </td>
          <td data-label="Tallas y cantidades">
            <div class="tallas">
              <div class="talla-box">22 <input type="number" min="0" value="0"></div>
              <div class="talla-box">23 <input type="number" min="0" value="0"></div>
              <div class="talla-box">24 <input type="number" min="0" value="0"></div>
              <div class="talla-box">25 <input type="number" min="0" value="0"></div>
              <div class="talla-box">26 <input type="number" min="0" value="0"></div>
              <div class="talla-box">27 <input type="number" min="0" value="0"></div>
              <div class="talla-box">28 <input type="number" min="0" value="0"></div>
              <div class="talla-box">29 <input type="number" min="0" value="0"></div>
              <div class="talla-box">30 <input type="number" min="0" value="0"></div>
              <div class="talla-box">31 <input type="number" min="0" value="0"></div>
              <div class="talla-box">32 <input type="number" min="0" value="0"></div>
              <div class="talla-box">33 <input type="number" min="0" value="0"></div>
              <div class="talla-box">34 <input type="number" min="0" value="0"></div>
              <div class="talla-box">35 <input type="number" min="0" value="0"></div>
              <div class="talla-box">36 <input type="number" min="0" value="0"></div>
              <div class="talla-box">37 <input type="number" min="0" value="0"></div>
              <div class="talla-box">38 <input type="number" min="0" value="0"></div>
              <div class="talla-box">39 <input type="number" min="0" value="0"></div>
              <div class="talla-box">40 <input type="number" min="0" value="0"></div>
              <div class="talla-box">41 <input type="number" min="0" value="0"></div>
              <div class="talla-box">42 <input type="number" min="0" value="0"></div>
              <div class="talla-box">43 <input type="number" min="0" value="0"></div>
              <div class="talla-box">44 <input type="number" min="0" value="0"></div>
              <div class="talla-box">45 <input type="number" min="0" value="0"></div>
              <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
            </div>
          </td>

          <td data-label="">
            <button class="btn btn-add">Agregar</button>
          </td>
        </tr>
        <!-- ======= Producto 2 ======= -->
        <tr class="item"
          data-brand="New Balance"
          data-product-id="1002"
          data-sku="SNK-052"
          data-name="Adidas samba cafe y negro"
          data-price="850.00"
          data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-2.jpeg">

          <td data-label="Código">SNK-052</td>

          <td data-label="Foto">
            <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-2.jpeg" class="preview">
              <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.16-PM-2.jpeg" alt="Adidas samba cafe y negro">
            </a>
          </td>

          <td data-label="Tallas y cantidades">
            <div class="tallas">
              <div class="talla-box">22 <input type="number" min="0" value="0"></div>
              <div class="talla-box">23 <input type="number" min="0" value="0"></div>
              <div class="talla-box">24 <input type="number" min="0" value="0"></div>
              <div class="talla-box">25 <input type="number" min="0" value="0"></div>
              <div class="talla-box">26 <input type="number" min="0" value="0"></div>
              <div class="talla-box">27 <input type="number" min="0" value="0"></div>
              <div class="talla-box">28 <input type="number" min="0" value="0"></div>
              <div class="talla-box">29 <input type="number" min="0" value="0"></div>
              <div class="talla-box">30 <input type="number" min="0" value="0"></div>
              <div class="talla-box">31 <input type="number" min="0" value="0"></div>
              <div class="talla-box">32 <input type="number" min="0" value="0"></div>
              <div class="talla-box">33 <input type="number" min="0" value="0"></div>
              <div class="talla-box">34 <input type="number" min="0" value="0"></div>
              <div class="talla-box">35 <input type="number" min="0" value="0"></div>
              <div class="talla-box">36 <input type="number" min="0" value="0"></div>
              <div class="talla-box">37 <input type="number" min="0" value="0"></div>
              <div class="talla-box">38 <input type="number" min="0" value="0"></div>
              <div class="talla-box">39 <input type="number" min="0" value="0"></div>
              <div class="talla-box">40 <input type="number" min="0" value="0"></div>
              <div class="talla-box">41 <input type="number" min="0" value="0"></div>
              <div class="talla-box">42 <input type="number" min="0" value="0"></div>
              <div class="talla-box">43 <input type="number" min="0" value="0"></div>
              <div class="talla-box">44 <input type="number" min="0" value="0"></div>
              <div class="talla-box">45 <input type="number" min="0" value="0"></div>
              <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
            </div>
          </td>

          <td data-label="">
            <button class="btn btn-add">Agregar</button>
          </td>
        </tr>

      

      <tr class="item"
        data-sku="SNK-053"
        data-name="Adidas dama blanco cafe"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-5.jpeg">

        <td data-label="Código">SNK-053</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-5.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.01.15-PM-5.jpeg" alt="Adidas dama blanco cafe">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-054"
        data-name="Adidas samba negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-6.jpeg.jpeg">

        <td data-label="Código">SNK-054</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-6.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM-6.jpeg" alt="Adidas samba negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>
      
      <tr class="item"
        data-sku="SNK-055"
        data-name="Adidas samba altos"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-12.jpeg">

        <td data-label="Código">SNK-055</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-12.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-12.jpeg" alt="Adidas samba alto">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-056"
        data-name="Adidas alto negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-11.jpeg">

        <td data-label="Código">SNK-056</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-11.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-11.jpeg" alt="Adidas alto negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-057"
        data-name="Adidas samba verde"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-8.jpeg">

        <td data-label="Código">SNK-057</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-8.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-8.jpeg" alt="Adidas samba verde">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-058"
        data-name="Adidas verde gamuza"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-5.jpeg">

        <td data-label="Código">SNK-058</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-5.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-5.jpeg" alt="Adidas verde gamuza">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-059"
        data-name="Adidas botin blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-12.jpeg">

        <td data-label="Código">SNK-059</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-12.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-12.jpeg" alt="Adidas botin blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-060"
        data-name="Adidas gris gamuza"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-10.jpeg">

        <td data-label="Código">SNK-060</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-10.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-10.jpeg" alt="Adidas gris gamuza">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-061"
        data-name="Adidas superstar negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/09/SuperStarN.webp">

        <td data-label="Código">SNK-061-A</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/09/SuperStarN.webp" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/09/SuperStarN.webp" alt="Adidas superstar negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-062"
        data-name="Adidas superstar blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/09/SuperStarBL.webp">

        <td data-label="Código">SNK-062</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/09/SuperStarBL.webp" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/09/SuperStarBL.webp" alt="Adidas superstar blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-063"
        data-name="Adidas Questar azul"
        data-img="https://simysneakers.site/wp-content/uploads/2025/09/AdiAzu.webp">

        <td data-label="Código">SNK-063</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/09/AdiAzu.webp" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/09/AdiAzu.webp" alt="Adidas Questar azul">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>
      
      </tbody>
    </table>
  </div>

  <!-- ======== SECCIÓN Timberland ======== -->
  <div class="brand-view" id="timberland">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
        data-sku="SNK-064"
        data-name="Timberland bota negra"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0052-scaled.jpg">

        <td data-label="Código">SNK-064</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0052-scaled.jpg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0052-scaled.jpg" alt="Timberland bota negra">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-065"
        data-name="Timberland botin verde"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0127-scaled.jpg">

        <td data-label="Código">SNK-065</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0127-scaled.jpg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0127-scaled.jpg" alt="Timberland botin verde">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-066"
        data-name="Timberland teni AN"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0161-scaled.jpg">

        <td data-label="Código">SNK-066</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0161-scaled.jpg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0161-scaled.jpg" alt="Timberland Teni AN">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-067"
        data-name="Timberland Botin blanco"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0163-scaled.jpg">

        <td data-label="Código">SNK-067</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0163-scaled.jpg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0163-scaled.jpg" alt="Timberland Botin blanco">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-068"
        data-name="Timberland Botin NCA"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0211-scaled.jpg">

        <td data-label="Código">SNK-068</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0211-scaled.jpg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0211-scaled.jpg" alt="Timberland Botin NCA">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-069"
        data-name="Timberland Botin cafe BN"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0301-scaled.jpg">

        <td data-label="Código">SNK-069</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0301-scaled.jpg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0301-scaled.jpg" alt="Timberland Botin cafe BN">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-070"
        data-name="Timberland Bota cafe"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/Timberland-Bot-scaled.jpg">

        <td data-label="Código">SNK-070</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/Timberland-Bot-scaled.jpg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/Timberland-Bot-scaled.jpg" alt="Timberland Bota cafe">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      <tr class="item"
        data-sku="SNK-071"
        data-name="Timberland Botin negro"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0032-scaled.jpg">

        <td data-label="Código">SNK-071</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0032-scaled.jpg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0032-scaled.jpg" alt="Timberland Botin negro">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

       <tr class="item"
        data-sku="SNK-072"
        data-name="Timberland Botin azul gris"
        data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-2.jpeg">

        <td data-label="Código">SNK-072</td>

        <td data-label="Foto">
          <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-2.jpeg" class="preview">
            <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-2.jpeg" alt="Timberland Botin azul gris">
          </a>
        </td>

        <td data-label="Tallas y cantidades">
          <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
        </td>

        <td data-label="">
          <button class="btn btn-add">Agregar</button>
        </td>
      </tr>

      
      </tbody>
    </table>
  </div>

   <!-- ======== SECCIÓN Puma ======== -->
  <div class="brand-view" id="puma">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

     <tr class="item"
       data-sku="SNK-073"
       data-name="Puma BCN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM.jpeg">

       <td data-label="Código">SNK-073</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.57-PM.jpeg" alt="Puma BCN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-074"
       data-name="Puma Blanco"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM.jpeg">

       <td data-label="Código">SNK-074</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM.jpeg" alt="Puma Blanco">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-075"
       data-name="Puma VRB"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0169-scaled.jpg">

       <td data-label="Código">SNK-075</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0169-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0169-scaled.jpg" alt="Puma VRB">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-076"
       data-name="Puma BYN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0184-scaled.jpg">

       <td data-label="Código">SNK-076</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0184-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0184-scaled.jpg" alt="Puma BYN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-077"
       data-name="Puma BYN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0184-scaled.jpg">

       <td data-label="Código">SNK-077</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0184-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0184-scaled.jpg" alt="Puma BYN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>
    
       </tbody>
    </table>
  </div>

  <!-- ======== SECCIÓN Louis Vuiton ======== -->
  <div class="brand-view" id="louis">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-078"
       data-name="Louis Vuiton Amarillo"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-5.jpeg">

       <td data-label="Código">SNK-078</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-5.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM-5.jpeg" alt="Louis Vuiton Amarillo">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-079"
       data-name="Louis Vuiton MR"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM.jpeg">

       <td data-label="Código">SNK-079</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.54-PM.jpeg" alt="Louis Vuiton MR">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-080"
       data-name="Louis Vuiton Negro"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-10.jpeg">

       <td data-label="Código">SNK-080</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-10.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM-10.jpeg" alt="Louis Vuiton Negro">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-081"
       data-name="Louis Vuiton NegroB"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-2.jpeg">

       <td data-label="Código">SNK-081</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-2.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-2.jpeg" alt="Louis Vuiton NegroB">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-082"
       data-name="Louis Vuiton BYN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-2.jpeg">

       <td data-label="Código">SNK-082</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-2.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.32.38-PM-2.jpeg" alt="Louis Vuiton BYN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-083"
       data-name="Louis Vuiton RYB"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0306-scaled.jpg">

       <td data-label="Código">SNK-083</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0306-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0306-scaled.jpg" alt="Louis Vuiton RYB">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>

  <!-- ======== SECCIÓN ON ======== -->
  <div class="brand-view" id="on">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

     <tr class="item"
       data-sku="SNK-084"
       data-name="ON GAZ"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-1.jpeg">

       <td data-label="Código">SNK-084</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-1.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-1.jpeg" alt="ON GAZ">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-085"
       data-name="ON Gris"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-4.jpeg">

       <td data-label="Código">SNK-085</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-4.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-4.jpeg" alt="ON Gris">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-086"
       data-name="ON negro"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-12.jpeg">

       <td data-label="Código">SNK-086</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-12.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-12.jpeg" alt="ON negro">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-087"
       data-name="ON Blanco"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-13.jpeg">

       <td data-label="Código">SNK-087</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-13.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-13.jpeg" alt="ON Blanco">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-088"
       data-name="ON Blanco"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-13.jpeg">

       <td data-label="Código">SNK-088</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-13.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-13.jpeg" alt="ON Blanco">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-089"
       data-name="ON BYN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM.jpeg">

       <td data-label="Código">SNK-089</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.56-PM.jpeg" alt="ON BYN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-090"
       data-name="ON Gris Bl"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-5.jpeg">

       <td data-label="Código">SNK-090</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-5.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-5.jpeg" alt="ON Gris Bl">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-091"
       data-name="ON Negro II"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-3.jpeg">

       <td data-label="Código">SNK-091</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-3.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-4.03.04-PM-3.jpeg" alt="ON Negro II">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-092"
       data-name="ON Negro SB"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0055-scaled.jpg">

       <td data-label="Código">SNK-092</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0055-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0055-scaled.jpg" alt="ON Negro SB">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-093"
       data-name="ON Deg"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0058-scaled.jpg">

       <td data-label="Código">SNK-093</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0058-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0058-scaled.jpg" alt="ON Deg">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-094"
       data-name="ON GYN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0063-scaled.jpg">

       <td data-label="Código">SNK-094</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0063-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0063-scaled.jpg" alt="ON GYN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-095"
       data-name="ON Botin Negro"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0276-scaled.jpg">

       <td data-label="Código">SNK-095</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0276-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0276-scaled.jpg" alt="ON Botin Negro">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-096"
       data-name="ON Bota cafe"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0287-scaled.jpg">

       <td data-label="Código">SNK-096</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0287-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0287-scaled.jpg" alt="ON Bota cafe">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-097"
       data-name="ON Neg low"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0290-scaled.jpg">

       <td data-label="Código">SNK-097</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0290-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0290-scaled.jpg" alt="ON Neg low">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-098"
       data-name="ON gris lw"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0292-scaled.jpg">

       <td data-label="Código">SNK-098</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0292-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0292-scaled.jpg" alt="ON Gris lw">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-099"
       data-name="ON cafe lw"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0036-scaled.jpg">

       <td data-label="Código">SNK-099</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0036-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0036-scaled.jpg" alt="ON cafe lw">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>

  <!-- ======== SECCIÓN Under Armour ======== -->
  <div class="brand-view" id="under">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-100"
       data-name="Under Armour bota gris"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-4.jpeg">

       <td data-label="Código">SNK-100</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-4.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-4.jpeg" alt="ON cafe lw">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-101"
       data-name="Under Armour bota gris"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-4.jpeg">

       <td data-label="Código">SNK-101</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-4.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.28.39-PM-4.jpeg" alt="ON cafe lw">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>
  <!-- === Seccion balenciaga === -->
   <div class="brand-view" id="balenciaga">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-102"
       data-name="Balenciaga negro botin"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-1.jpeg">

       <td data-label="Código">SNK-102</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-1.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-1.jpeg" alt="Balenciaga negro botin">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-103"
       data-name="Balenciaga blanco y negro botin"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0201-scaled.jpg">

       <td data-label="Código">SNK-103</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0201-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0201-scaled.jpg" alt="Balenciaga blanco y negro botin">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>
  <!-- === Seccion Off White === -->
  <div class="brand-view" id="off">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-104"
       data-name="Off White BYN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM.jpeg">

       <td data-label="Código">SNK-104</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM.jpeg" alt="Off white BYN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-105"
       data-name="Off White Blanco"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.45-PM.jpeg">

       <td data-label="Código">SNK-105</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.45-PM.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.45-PM.jpeg" alt="Off white Blanco">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>

  <!-- === Seccion Dior === -->
  <div class="brand-view" id="dior">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-106"
       data-name="Dior"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-4.jpeg">

       <td data-label="Código">SNK-106</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-4.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-4.jpeg" alt="Dior">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-107"
       data-name="Dior converse"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0374-scaled.jpg">

       <td data-label="Código">SNK-107</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0374-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0374-scaled.jpg" alt="Dior converse">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>

  <!-- === Seccion Golden Goose === -->
  <div class="brand-view" id="golden">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-108"
       data-name="Golden goose BYC"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM-1.jpeg">

       <td data-label="Código">SNK-108</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM-1.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM-1.jpeg" alt="Golden goose BYC">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-109"
       data-name="Golden goose BYC"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM-1.jpeg">

       <td data-label="Código">SNK-109</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM-1.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.22-PM-1.jpeg" alt="Golden goose BYC">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>

  <!-- === Seccion Hugo Boss === -->
  <div class="brand-view" id="hugo">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-110"
       data-name="Hugo boss BYN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-3.jpeg">

       <td data-label="Código">SNK-110</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-3.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.55.21-PM-3.jpeg" alt="Hugo Boss BYN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-111"
       data-name="Hugo boss Negro"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-1.jpeg">

       <td data-label="Código">SNK-111</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-1.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-3.06.15-PM-1.jpeg" alt="Hugo Boss Negro">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>

  <!-- === Seccion Amiri === -->
  <div class="brand-view" id="amiri">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-112"
       data-name="Amiri BYN"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0291-scaled.jpg">

       <td data-label="Código">SNK-112</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0291-scaled.jpg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/IMG_0291-scaled.jpg" alt="Amiri BYN">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-113"
       data-name="Amiri Azul"
       data-img="https://simysneakers.site/wp-content/uploads/2025/03/115.png">

       <td data-label="Código">SNK-113</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/03/115.png" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/03/115.png" alt="Amiri Azul">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>

  <!-- === Seccion Alexander McQueen === -->
  <div class="brand-view" id="queen">
    <table class="brand-table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Foto</th>
          <th>Tallas y cantidades</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      <tr class="item"
       data-sku="SNK-114"
       data-name="Alexander negro"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-14.jpeg">

       <td data-label="Código">SNK-114</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-14.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.16.55-PM-14.jpeg" alt="Alexander negro">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

     <tr class="item"
       data-sku="SNK-115"
       data-name="Alexander Blanco"
       data-img="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-4.jpeg">

       <td data-label="Código">SNK-115</td>

       <td data-label="Foto">
         <a href="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-4.jpeg" class="preview">
           <img src="https://simysneakers.site/wp-content/uploads/2025/10/WhatsApp-Image-2025-10-14-at-2.47.44-PM-4.jpeg" alt="Alexander Blanco">
         </a>
       </td>

       <td data-label="Tallas y cantidades">
         <div class="tallas">
            <div class="talla-box">22 <input type="number" min="0" value="0"></div>
            <div class="talla-box">23 <input type="number" min="0" value="0"></div>
            <div class="talla-box">24 <input type="number" min="0" value="0"></div>
            <div class="talla-box">25 <input type="number" min="0" value="0"></div>
            <div class="talla-box">26 <input type="number" min="0" value="0"></div>
            <div class="talla-box">27 <input type="number" min="0" value="0"></div>
            <div class="talla-box">28 <input type="number" min="0" value="0"></div>
            <div class="talla-box">29 <input type="number" min="0" value="0"></div>
            <div class="talla-box">30 <input type="number" min="0" value="0"></div>
            <div class="talla-box">31 <input type="number" min="0" value="0"></div>
            <div class="talla-box">32 <input type="number" min="0" value="0"></div>
            <div class="talla-box">33 <input type="number" min="0" value="0"></div>
            <div class="talla-box">34 <input type="number" min="0" value="0"></div>
            <div class="talla-box">35 <input type="number" min="0" value="0"></div>
            <div class="talla-box">36 <input type="number" min="0" value="0"></div>
            <div class="talla-box">37 <input type="number" min="0" value="0"></div>
            <div class="talla-box">38 <input type="number" min="0" value="0"></div>
            <div class="talla-box">39 <input type="number" min="0" value="0"></div>
            <div class="talla-box">40 <input type="number" min="0" value="0"></div>
            <div class="talla-box">41 <input type="number" min="0" value="0"></div>
            <div class="talla-box">42 <input type="number" min="0" value="0"></div>
            <div class="talla-box">43 <input type="number" min="0" value="0"></div>
            <div class="talla-box">44 <input type="number" min="0" value="0"></div>
            <div class="talla-box">45 <input type="number" min="0" value="0"></div>
            <div class="talla-box">46 <input type="number" min="0" value="0"></div> 
          </div>
       </td>

       <td data-label="">
          <button class="btn btn-add">Agregar</button>
       </td>
     </tr>

      </tbody>
    </table>
  </div>
</div>

  
  
  <div class="footbar">
    <button class="btn btn-wa" id="btnWA">📦 Solicitar pedido por WhatsApp</button>
  </div>

      <!-- ====== /FIN DE PRODUCTOS ====== -->
 
 <!-- <div class="footbar">
    <span class="mini-alert" id="miniAlert">¡Artículo(s) agregados! Puedes solicitar el pedido por WhatsApp.</span>    
  </div> -->

  <div class="cart-panel">
  <h3>🛒 Carrito de pedido</h3>
  <div id="cartItems"></div>
  <div class="cart-total">
    <strong>Total:</strong> <span id="cartTotal">$0.00</span>
  </div>
  </div>

  <div class="lightbox" id="lightbox">
    <span class="close-btn">×</span>
    <img src="" alt="Preview">?
  </div>
  </div>
  


<!-- ======= /FIN CATÁLOGO EN TABLA ======= -->
    </div>
    <!-- === FIN DEL CÓDIGO DEL CATÁLOGO === -->


    
  </section>
</main>

<!-- jsPDF primero -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<!-- luego tu script principal -->
<script src="https://simysneakers.site/wp-content/themes/tema-simi/catalogo.js"></script>


<?php /* get_footer(); */ ?>

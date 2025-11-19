<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3>SamySneakers</h3>
            <p>Tu tienda de sneakers y ropa urbana en México.
                Estilo, comodidad y calidad a los mejores precios</p>
        </div>

        <div class="footer-column">
            <h3>Enlaces útiles</h3>
            <ul>
                <li><a href="<?php echo home_url('/categoria/sneakers'); ?>">Sneakers</a></li>
                <li><a href="<?php echo home_url('/categoria/playeras'); ?>">Playeras</a></li>
                <li><a href="<?php echo home_url('/categoria/gorras'); ?>">Gorras</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Contacto</h3>
            <ul>
                <li><a href="mailto:contacto@samisneakers.com"> contacto@samisneakers.com</a></li>
                <li>Leon Gto. Mexico</li>
                <li><a href="https://wa.me/524779208851" target="_blank">WhatsApp directo</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Síguenos</h3>
            <div class="social-links">
                <a href="https://www.instagram.com/simi_sneakers_gdl/" target="_blank"> Instagram</a><br>
                <a href="https://www.facebook.com/profile.php?id=61573340627237" target="_blank"> Facebook</a><br>
                <a href="https://www.tiktok.com/@sami.sneakers" target="_blank"> Tiktok</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© <?php echo date('Y'); ?> SamySneakers - Todos los derechos reservados.</p>
    </div>
</footer>
<?php wp_footer(); ?>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".hero-slider .slide");
  let current = 0;

  if (slides.length <= 1) {
    return;
  }

  function changeSlide() {
    slides[current].classList.remove("active");
    current = (current + 1) % slides.length;
    slides[current].classList.add("active");
  }

  setInterval(changeSlide, 4000); // 🔁 cambia cada 4 segundos
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const viewport = document.querySelector(".brand-viewport");
  const track = document.querySelector(".brand-track");

  if (!viewport || !track) {
    return;
  }

  const baseHTML = track.innerHTML;

  function fillTrack() {
    track.innerHTML = baseHTML;

    const baseItems = Array.from(track.children);

    if (baseItems.length === 0) {
      return;
    }

    const viewportWidth = viewport.offsetWidth;

    if (viewportWidth === 0) {
      return;
    }

    let totalWidth = track.scrollWidth;

    if (totalWidth === 0) {
      return;
    }

    let iterations = 0;

    while (totalWidth < viewportWidth * 2 && iterations < 10) {
      baseItems.forEach((item) => {
        const clone = item.cloneNode(true);
        clone.setAttribute("aria-hidden", "true");
        track.appendChild(clone);
      });

      totalWidth = track.scrollWidth;
      iterations += 1;
    }
  }

  fillTrack();
  window.addEventListener("load", fillTrack);
  window.addEventListener("resize", fillTrack);
});
</script>

</body>
</html>

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
                <li><a href="<?php echo home_url('/tienda'); ?>">Catálogo</a></li>
                <li><a href="<?php echo home_url('/categoria/sneakers'); ?>">Sneakers</a></li>
                <li><a href="<?php echo home_url('/categoria/playeras'); ?>">Playeras</a></li>
                <li><a href="<?php echo home_url('/categoria/gorras'); ?>">Gorras</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Contacto</h3>
            <ul>
                <li><a href="mailto:contacto@simysneakers.site"> contacto@simysneakers.site</a></li>
                <li>Leon Gto. Mexico</li>
                <li><a href="https://wa.me/523328668222" target="_blank">WhatsApp directo</a></li>
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
        <p>© <?phpecho date('Y'); ?> SamySneakers - Todos los derechos reservados.</p>
    </div>
</footer>
<?php wp_footer(); ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const menuToggle = document.querySelector(".menu-toggle");
  const mainNav = document.querySelector(".main-nav");
  const body = document.body;

  if (menuToggle && mainNav) {
    menuToggle.addEventListener("click", function() {
      mainNav.classList.toggle("active");
      menuToggle.classList.toggle("active");
      body.classList.toggle("menu-open");
    });
  }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".hero-slider .slide");
  let current = 0;

  function changeSlide() {
    slides[current].classList.remove("active");
    current = (current + 1) % slides.length;
    slides[current].classList.add("active");
  }

  setInterval(changeSlide, 4000); // 🔁 cambia cada 4 segundos
});
</script>


</body>
</html>
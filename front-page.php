<?php get_header(); ?>

<main class="site-main">
   <!-- Hero Principal -->
    <section class="hero-slider">
      <div class="slide active" style="background-image: url('https://samisneakers.com/wp-content/uploads/2025/10/SAMI.svg');"></div>
      diff --git a/front-page.php b/front-page.php
index e66322f6fccc2679f71115baeb0f27b501af24c5..d31fb7bf19f3f633a5a00631e10b29d7af3e03f5 100644
--- a/front-page.php
+++ b/front-page.php
@@ -7,58 +7,50 @@
       <div class="slide" style="background-image: url('https://samisneakers.com/wp-content/uploads/2025/03/139-e1741280505888.png');"></div>
       <div class="slide" style="background-image: url('https://samisneakers.com/wp-content/uploads/2025/09/Airf1C.webp');"></div>
       <div class="slide" style="background-image: url('https://samisneakers.com/wp-content/uploads/2025/09/Uptempo-Blan.webp');"></div>
 
       <div class="hero-overlay">
         <div class="hero-content">          
           <a href="#" class="btn-hero">Ver catálogo</a>
         </div>
       </div>
     </section>
 
 
   <section>
   <h2>Productos Destacados</h2>
   <div class="products-grid">
     <?php 
     // Vuelve a 5 productos y 5 columnas para la cuadrícula estática
     echo do_shortcode('[products_no_cart limit="5" columns="5" orderby="date" order="DESC"]');
     ?>
   </div>
 </section>
 
 <section class="brand-ticker" aria-label="Marcas que vendemos">
   <div class="brand-viewport">
     <div class="brand-track" id="brandTrack">
-      <!-- Bloque A -->
-      <div class="brand"><img src="https://samisneakers.com/wp-content/uploads/2025/10/nike.svg" alt="Nike"></div>
-      <div class="brand"><img src="https://samisneakers.com/wp-content/uploads/2025/10/new-balance-logo-png_seeklogo-98723.png" alt="New Balance"></div>
-      <div class="brand"><img src="https://samisneakers.com/wp-content/uploads/2025/10/Louis_Vuitton_logo_and_wordmark.svg.png" alt="Louis Vuitton"></div>
-      <div class="brand"><img src="https://samisneakers.com/wp-content/uploads/2025/10/Logo-McQ-Alexander-McQueen.png" alt="McQ"></div>
-      <div class="brand"><img src="https://samisneakers.com/wp-content/uploads/2025/10/jordan.png" alt="Jordan"></div>--      
     </div>
   </div>
 </section>
 
 <section class="about-section">
   <div class="about-content">
     <div class="about-text">
       <h2>Sobre SamySneakers</h2>
       <p>
         En <strong>SamySneakers</strong> somos apasionados por el estilo y la comodidad.
         Trabajamos para ofrecerte los mejores Sneakers del mercado a los mejores precios.
       </p>
       <p>
         Visitanos en nuestras 6 tiendas físicas o compra en línea con total confianza -
         ¡tenemos envío a todo México!
       </p>
       <a href="<?php echo home_url('/contacto'); ?>" class="btn-about">Contáctanos</a>
     </div>
 
     <div class="about-image">

      <img src="https://samisneakers.com/wp-content/uploads/2025/07/WhatsApp-Image-2025-06-27-at-7.46.15-PM.jpeg" alt="Tienda SamySneakers">
    </div>
  </div>
</section>

<section class="categories">
  <h2>Categorías principales</h2>
  <div class="categories-grid">
    <div class="category">
      <a href="<?php echo home_url('/categoria/sneakers'); ?>">
        <img src="https://samisneakers.com/wp-content/uploads/2025/09/SuperStarBL.webp" alt="Sneakers">
        <h3>Sneakers</h3>
      </a>
    </div>

    <div class="category">
      <a href="<?php echo home_url('/categoria/pantalones'); ?>">
        <img src="https://samisneakers.com/wp-content/uploads/2025/10/pantalones.png" alt="pantalones">
        <h3>Pantalones</h3>
      </a>
    </div>

    <div class="category">
      <a href="<?php echo home_url('/categoria/playeras'); ?>">
        <img src="https://samisneakers.com/wp-content/uploads/2025/10/playeras.png" alt="Playeras">
        <h3>Playeras</h3>
      </a>
    </div>

    <div class="category">
      <a href="<?php echo home_url('/categoria/gorras'); ?>">
        <img src="https://samisneakers.com/wp-content/uploads/2025/10/gorras.png" alt="gorras">
        <h3>Gorras</h3>
      </a>
    </div>

    <div class="category">
      <a href="#">
        <img src="https://samisneakers.com/wp-content/uploads/2025/07/Calidad-importacion-🔥🇨🇳🇲🇽-samysneakers-aereo-modelos-exclusivos-mp3-image.png" alt="Proximamente">
        <h3>Proximamente</h3>
      </a>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
        

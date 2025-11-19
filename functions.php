<?php
// Cargar estilos
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('tema-simi-style', get_stylesheet_uri());
});

// Cargar Font Awesome
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
});


function simysneakers_register_menus() {
    register_nav_menus(array(
        'main-menu' => __( 'Menu principal', 'simysneakers' ),
    ));
}
add_action('init', 'simysneakers_register_menus');

// === Agregar soporte para WooCommerce ===
function simysneakers_agregar_soporte_woocommerce() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'simysneakers_agregar_soporte_woocommerce');

// === Script mejorado para el menú hamburguesa ===
add_action('wp_footer', function() { ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.main-nav');

  if (!toggle || !nav) {
    return;
  }

  toggle.addEventListener('click', () => {
    const icon = toggle.querySelector('i');
    const isOpen = nav.classList.toggle('active');

    toggle.classList.toggle('active', isOpen);
    document.body.classList.toggle('menu-open', isOpen);
    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

    // Cambiar ícono dinámicamente
    if (icon) {
      if (isOpen) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
      } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
      }
    }
  });
});
</script>
<?php });

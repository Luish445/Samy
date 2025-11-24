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

  toggle.addEventListener('click', () => {
    const icon = toggle.querySelector('i');
    nav.classList.toggle('active');
    toggle.classList.toggle('active');
    document.body.classList.toggle('menu-open');

    // Cambiar ícono dinámicamente
    if (nav.classList.contains('active')) {
      icon.classList.remove('fa-bars');
      icon.classList.add('fa-times');
    } else {
      icon.classList.remove('fa-times');
      icon.classList.add('fa-bars');
    }
  });
});
</script>
<?php });

// Shortcode [products_no_cart]: muestra productos SIN botón de "Añadir al carrito"
function simi_products_no_cart_shortcode( $atts ) {

    if ( ! class_exists( 'WC_Shortcodes' ) ) {
        return ''; // WooCommerce no está activo
    }

    // Quita temporalmente el botón de añadir al carrito
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

    // Genera el HTML normal del shortcode [products]
    $content = WC_Shortcodes::products( $atts );

    // Vuelve a activar el botón para el resto de la tienda
    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

    return $content;
}
add_shortcode( 'products_no_cart', 'simi_products_no_cart_shortcode' );

// functions.php
function mi_ticker_scripts() {
    // Encola el script solo si estamos en la página de inicio
    if ( is_front_page() ) {
        wp_enqueue_script( 
            'brand-ticker-script', // Handle (Nombre del script)
            get_template_directory_uri() . '/ticker.js', // Ruta al archivo
            array(), // Dependencias (otros scripts que debe cargar antes)
            '1.0', // Versión
            true // Cargar en el footer (antes de </body>)
        );
    }
}
add_action( 'wp_enqueue_scripts', 'mi_ticker_scripts' );


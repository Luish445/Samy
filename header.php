<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Barra de anuncio -->
<div class="announcement-bar">
  <div class="announcement-bar-inner">
    <div class="announcement-item">PAGOS CON TARJETA DE DÉBITO Y CRÉDITO</div>
    <div class="announcement-item">PRECIO DE MAYOREO 🔥</div>
    <div class="announcement-item">ENVÍO GRATIS EN TU PRIMERA COMPRA 🚚</div>
  </div>
</div>

<header class="main-header">
  <div class="container-header">
    
    <!-- Logo -->
    <div class="logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="https://samisneakers.com/wp-content/uploads/2025/11/logo234.svg" alt="SamiSneakers">
      </a>
    </div>

    <!-- Botón hamburguesa (se oculta en escritorio mediante CSS) -->
    <button class="menu-toggle" aria-label="Abrir menú" aria-expanded="false">
      <i class="fas fa-bars"></i>
    </button>


    <!-- Menú principal -->
    <nav class="main-nav">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'main-menu',
          'container'      => false,
          'menu_class'     => 'menu',
        ));
      ?>
    </nav>

    <!-- Iconos -->
    <div class="header-icons">
      <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="icon"><i class="fas fa-user"></i></a>
      <a href="#" class="icon"><i class="fas fa-search"></i></a>
      <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="icon">
        <i class="fas fa-shopping-bag"></i>
        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
      </a>
    </div>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</header>

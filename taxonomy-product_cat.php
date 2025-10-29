<?php
get_header();
?>

<main class="categoria-productos">
  <div class="categoria-header">
    <h1><?php single_term_title(); ?></h1>
    <p><?php echo term_description(); ?></p>
  </div>

  <div class="productos-grid">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="producto-item">
          <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('medium'); ?>
            <?php else: ?>
              <img src="<?php echo wc_placeholder_img_src(); ?>" alt="Sin imagen">
            <?php endif; ?>
            <h3><?php the_title(); ?></h3>
            <span class="precio"><?php wc_get_template( 'loop/price.php' ); ?></span>
          </a>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <p>No hay productos en esta categoría todavía.</p>
    <?php endif; ?>
  </div>
</main>

<?php
get_footer();
?>

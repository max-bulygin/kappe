<?php get_header(); ?>

<main class="container">
  <div class="portfolio-wrapper">
    <?php
    $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 9 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <?php
      $classes_raw = wp_get_post_tags( $post->ID, array( 'fields' => 'names' ) );
      $classes_front = implode( ', ', $classes_raw );
      $classes_front = strtolower( $classes_front );
      $classes_back = wp_get_post_tags( $post->ID, array( 'fields' => 'slugs' ) );
      $classes_back = implode( ' ', $classes_back );
      ?>
      <div class="portfolio-item <?php echo $classes_back; ?>">
        <?php the_post_thumbnail( 'portfolio-grid' ); ?>
        <div class="portfolio-item-overlay">
          <div class="overlay-content">
            <h4><?php the_title(); ?></h4>
            <p><?php echo $classes_front; ?></p>
            <a href="<?php the_permalink(); ?>" class="portfolio-item-link">
              <svg class="icon icon-baseline">
                <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#arrow-right'; ?>"></use>
              </svg>
            </a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>

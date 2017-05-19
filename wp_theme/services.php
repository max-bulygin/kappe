<?php

/*
 * Template Name: Services
 */

get_header(); ?>

<main class="container">

  <div class="content clearfix">

    <div class="content-grid-column content-main">

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="img">
          <?php the_post_thumbnail( 'about-featured' ); ?>
        </div>
      <?php endif; ?>

      <?php

      if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>

        <?php endwhile;

      else:
        echo '<p>No content found</p>';

      endif;

      ?>

      <?php
      $args = array(
        'post_type' => 'service'
      );
      $services = new WP_Query( $args ); ?>
      <div id="accordion">
      <?php

      while ( $services->have_posts() ) : $services->the_post(); ?>
        <h3><?php the_title(); ?>
          <svg class="icon icon-baseline">
            <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#angle-right'; ?>"></use>
          </svg></h3>
        <div><?php the_content(); ?></div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </div>

    </div><!--  /.content-grid-column  -->

    <?php get_sidebar(); ?>

  </div>

</main>

<?php get_footer(); ?>

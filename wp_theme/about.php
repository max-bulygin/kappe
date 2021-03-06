<?php

/*
 * Template Name: About
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
        while ( have_posts() ) : the_post();

          echo '<div>';
          the_title('<h2>', '</h2>');
          the_content();
          echo '</div>';

        endwhile;
      endif;
      ?>

      <div class="gallery">
        <h2><?php _e( 'Certificates', 'kappe' ); ?></h2>
        <div id="certificates" class="gallery-items clearfix">
          <?php
          $args = array(
            'post_type' => 'certificate'
          );

          $certificates = new WP_Query( $args );
          if ( $certificates->have_posts() ) :
            while ( $certificates->have_posts() ) : $certificates->the_post(); ?>
              <a href="<?php the_post_thumbnail_url(); ?>" data-caption="<?php the_title(); ?>">
                <?php the_post_thumbnail( 'certificate-thumb' ); ?>
              </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <em><?php _e( 'Sorry, no certificates have been added yet.', 'kappe' ); ?></em>
          <?php endif; ?>

        </div>
      </div>
    </div><!--  /.content-grid-column  -->

    <?php get_sidebar( 'about' ); ?>

  </div>

</main>

<?php get_footer(); ?>

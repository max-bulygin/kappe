<?php get_header(); ?>

  <main class="container">

    <div class="content clearfix">

      <div class="content-grid-column content-main project">

        <?php if ( has_post_thumbnail() ) : ?>

          <div class="project-image">
            <?php the_post_thumbnail( 'portfolio-featured' ); ?>
          </div>

        <?php endif; ?>

        <article class="project-description">
          <header>
            <?php the_title('<h2>', '</h2>'); ?>
          </header>
          <?php echo $post->post_content; ?>

          <?php
          $nonce = wp_create_nonce( 'kp_like_it_nonce' );
          $link = admin_url( 'admin-ajax.php?action=kp_like_it&post_id=' . $post->ID . '&nonce=' . $nonce );
          $likes = get_post_meta( get_the_ID(), '_likes', true );
          $likes = ( empty( $likes ) ) ? 0 : $likes; ?>

          <footer>
            <a class="btn btn-tag btn-like"
               href="<?php echo $link; ?>"
               data-id="<?php echo get_the_ID(); ?>"
               data-nonce="<?php echo $nonce; ?>"
               role="button">
              <svg class="icon">
                <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#thumbs-up' ?>"></use>
              </svg> <?php _e( 'Like it', 'kappe' ); ?>
            </a>
          </footer>
        </article>

      </div><!--  /.content-grid-column  -->

      <?php get_sidebar( 'portfolio' ); ?>

      <?php

      if ( is_active_sidebar( 'related-posts' ) ) {
        get_sidebar( 'related' );
      }

      ?>

    </div><!--  /.content  -->

  </main>

<?php get_footer(); ?>
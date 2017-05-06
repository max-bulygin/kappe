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
            <h2><?php the_title(); ?></h2>
          </header>
          <?php echo $post->post_content; ?>

          <?php
          $nonce = wp_create_nonce( 'kp_like_it_nonce' );
          $link = admin_url( 'admin-ajax.php?action=kp_like_it&post_id=' . $post->ID . '&nonce=' . $nonce );
          $likes = get_post_meta( get_the_ID(), '_likes', true );
          $likes = ( empty( $likes ) ) ? 0 : $likes; ?>

          <footer>
            <a class="btn btn-like"
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

        <div class="gallery">
          <h2><?php _e( 'Related Projects', 'kappe' ) ?></h2>
          <?php
          $tags = wp_get_post_tags( $post->ID );

          if ( $tags ) {
            $tag_ids = array();
            foreach ( $tags as $tag ) $tag_ids[] = $tag->term_id;

            $args = array(
              'post_type' => 'portfolio',
              'tag__in' => $tag_ids,
              'post__not_in' => array( $post->ID ),
              'posts_per_page' => 3
            );

            $the_query = new WP_Query( $args );
            ?>
            <div class="gallery-items gallery-items--no-margin clearfix">
              <?php if ( $the_query->have_posts() ) : ?>

                <!-- pagination here -->

                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'portfolio-related' ) ?>
                  </a>
                <?php endwhile; ?>
                <!-- end of the loop -->

                <!-- pagination here -->

                <?php wp_reset_postdata(); ?>

              <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
              <?php endif; ?>

            </div>
          <?php } ?>
        </div>
      </div><!--  /.content-grid-column  -->

      <?php get_sidebar( 'portfolio' ); ?>

    </div><!--  /.content  -->

  </main>

<?php get_footer(); ?>
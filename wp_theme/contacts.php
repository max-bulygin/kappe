<?php

/*
 * Template Name: Contacts
 */

get_header(); ?>

<main class="container">

    <div class="contacts">
        <h3 class="heading"><?php _e( 'Get in touch with us', 'kappe' ); ?></h3>
        <p class="paragraph">
          <?php echo $post->post_content; ?>
        </p>
        <h3 class="heading"><?php _e( 'Send us a message', 'kappe' ); ?></h3>
      <?php
      echo do_shortcode( '[contact-form-7 id="35" title="Contacts page form" html_class="clearfix"]' );
      ?>
    </div>

</main>

<?php get_footer(); ?>

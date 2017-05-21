<?php

/*
 * Template Name: Contacts
 */

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
  wpcf7_enqueue_scripts();
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
  wpcf7_enqueue_styles();
}

get_header(); ?>

<main class="container">

  <div class="contacts">
    <h3 class="heading"><?php _e( 'Get in touch with us', 'kappe' ); ?></h3>
    <p class="paragraph">
      <?php echo $post->post_content; ?>
    </p>
    <h3 class="heading"><?php _e( 'Send us a message', 'kappe' ); ?></h3>

    <?php echo do_shortcode('[contact-form-7 id="99" title="Contacts page"]'); ?>

  </div>

</main>

<?php get_footer(); ?>

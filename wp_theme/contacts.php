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

if ( function_exists( 'pll_current_language' ) ) {
  $shortcode = ( pll_current_language() == 'ru' ) ? get_option( 'cf7_value_ru' ) : get_option( 'cf7_value_en' );
}

get_header(); ?>

<main class="container">

  <div class="contacts">
    <h3 class="heading"><?php _e( 'Get in touch', 'kappe' ); ?></h3>
    <?php echo $post->post_content; ?>
    <h3 class="heading"><?php _e( 'Send a message', 'kappe' ); ?></h3>

    <?php echo do_shortcode( $shortcode ); ?>

  </div>

</main>

<?php get_footer(); ?>

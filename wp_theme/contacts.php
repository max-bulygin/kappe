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
    <h3 class="heading"><?php echo __( 'Get in touch with us', THEME_NAME ); ?></h3>
    <p class="paragraph">
      <?php echo $post->post_content; ?>
    </p>
    <h3 class="heading"><?php echo __( 'Send us a message', THEME_NAME ); ?></h3>
    <form class="clearfix form-wrap">
      <div class="form-column-half">
        <div class="form-control-wrap">
          <span class="form-control-icon">
            <span class="form-icon-border">
              <svg class="icon icon-middle icon-user"><use
                    xlink:href="<?php echo THEME_URI . '/images/icons.svg#user'; ?>"></use></svg>
            </span>
          </span>
          <?php echo do_shortcode( '[text* your-name placeholder"Name"]' ); ?>
        </div>
        <div class="form-control-wrap">
          <span class="form-control-icon">
            <span class="form-icon-border">
              <svg class="icon icon-middle icon-envelope-o"><use
                    xlink:href="<?php echo THEME_URI . '/images/icons.svg#envelope-o'; ?>"></use></svg>
            </span>
          </span>
          <?php echo do_shortcode( '[email* your-email placeholder"Email Address"]' ); ?>
        </div>
        <div class="form-control-wrap">
          <span class="form-control-icon">
            <span class="form-icon-border">
              <svg class="icon icon-middle icon-chain"><use
                    xlink:href="<?php echo THEME_URI . '/images/icons.svg#chain'; ?>"></use></svg>
            </span>
          </span>
          <?php echo do_shortcode( '[url* your-site placeholder"Web Site"]' ); ?>
        </div>
      </div>
      <div class="form-column-half">
        <?php echo do_shortcode( '[textarea* your-message class:form-textarea-height size:30 placeholder"Message"]' ); ?>
        <?php echo do_shortcode( '[submit class:btn "Send Mail"]', true ); ?>
      </div>
    </form>

  </div>

</main>

<?php get_footer(); ?>

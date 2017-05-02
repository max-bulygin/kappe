<?php

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_NAME', 'Kappe' );
define( 'THEME_VERSION', '1.0' );

function kp_adding_scripts()
{
  // Custom styles
  wp_register_style( 'main', THEME_URI . '/styles/main.css', null, THEME_VERSION, 'all' );
  wp_enqueue_style( 'main' );

  // Animate.css library
  wp_register_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', null, null, 'all' );
  wp_enqueue_style( 'animate' );

  // Google fonts
  wp_register_style( 'fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,300,700&amp;subset=cyrillic-ext', null, null, 'all' );
  wp_enqueue_style( 'fonts' );

  // jQuery
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', null, null, true );
  wp_enqueue_script( 'jquery' );

  // Isotope
  wp_register_script( 'isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.3/isotope.pkgd.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'isotope' );

  // Custom scripts
  wp_register_script( 'main', THEME_URI . '/scripts/main.min.js', array( 'jquery', 'isotope' ), THEME_VERSION, true );
  wp_enqueue_script( 'main' );
}

add_action( 'wp_enqueue_scripts', 'kp_adding_scripts' );

/*-----------------------------------------------------------------------------------
 * Register nav menu
 *-----------------------------------------------------------------------------------*/

register_nav_menus( array(
  'primary' => __( 'Primary Menu', THEME_NAME )
) );

/*-----------------------------------------------------------------------------------
 * Contact Form 7 Custom Setup
 *-----------------------------------------------------------------------------------*/

function mod_contact7_form_content( $template, $prop ) {
  if ( 'form' == $prop ) {
    return implode( '', array(
      '<div class="form-column-half">',
      '<div class="form-control-wrap">',
      '<span class="form-control-icon">',
      '<span class="form-icon-border">',
      '</span>',
      '</span>',
      '[text* your-name placeholder"Name"]',
      '</div>',
      '<div class="form-control-wrap">',
      '<span class="form-control-icon">',
      '<span class="form-icon-border">',
      '</span>',
      '</span>',
      '[email* your-email placeholder"Email Address"]',
      '</div>',
      '<div class="form-control-wrap">',
      '<span class="form-control-icon">',
      '<span class="form-icon-border">',
      '</span>',
      '</span>',
      '[url* your-site placeholder"Web Site"]',
      '</div>',
      '</div>',
      '<div class="form-column-half">',
      '[textarea* your-message class:form-textarea-height size:30 placeholder"Message"]',
      '[submit class:btn "Send Mail"]',
      '</div>'
    ) );
  } else {
    return $template;
  }
}

add_filter(
  'wpcf7_default_template',
  'mod_contact7_form_content',
  10,
  2
);
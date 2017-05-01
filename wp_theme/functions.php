<?php

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_NAME', 'Kappe' );
define( 'THEME_VERSION', '1.0' );

function kp_adding_scripts() {
    // Custom styles
    wp_register_style( 'main', THEME_URI . '/styles/main.css', null, THEME_VERSION, 'all' );
    wp_enqueue_style( 'main' );

    // Animate.css library
    wp_register_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', null, null, 'all');
    wp_enqueue_style( 'animate' );

    // Google fonts
    wp_register_style('fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,300,700&amp;subset=cyrillic-ext', null, null, 'all');
    wp_enqueue_style( 'fonts' );

    // jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', null, null, true);
    wp_enqueue_script('jquery');

    // Isotope
    wp_register_script('isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.3/isotope.pkgd.min.js', array('jquery'), null, true);
    wp_enqueue_script('isotope');

    // Custom scripts
    wp_register_script('main', THEME_URI . '/scripts/main.min.js', array('jquery', 'isotope'), THEME_VERSION, true);
    wp_enqueue_script('main');
}

add_action( 'wp_enqueue_scripts', 'kp_adding_scripts' );

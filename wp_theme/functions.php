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
}

add_action( 'wp_enqueue_scripts', 'kp_adding_scripts' );

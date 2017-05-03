<?php

define( 'THEME_NAME', 'Kappe' );
define( 'THEME_VERSION', '1.0' );

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'LIBS_DIR', THEME_DIR . '/functions');
define( 'OPTS_DIR', THEME_DIR . '/kappe-options');

/*-----------------------------------------------------------------------------------
 * Theme functions
 *-----------------------------------------------------------------------------------*/

require_once ( LIBS_DIR . '/theme-functions.php' );

/*-----------------------------------------------------------------------------------
 * Admin options
 *-----------------------------------------------------------------------------------*/

require_once ( OPTS_DIR . '/functions-admin.php' );
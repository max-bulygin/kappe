<?php

define( 'THEME_NAME', 'Kappe' );
define( 'THEME_VERSION', '1.0' );

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'LIBS_DIR', THEME_DIR . '/functions');
define( 'OPTS_DIR', THEME_DIR . '/admin-options');
define( 'LANG_DIR', THEME_DIR . '/languages');

/*-----------------------------------------------------------------------------------
 * Theme Functions
 *-----------------------------------------------------------------------------------*/

require_once ( LIBS_DIR . '/theme-functions.php' );
require_once ( LIBS_DIR . '/widgets.php' );

/*-----------------------------------------------------------------------------------
 * Load Theme Textdomain
 *-----------------------------------------------------------------------------------*/

load_theme_textdomain('kappe', LANG_DIR);

/*-----------------------------------------------------------------------------------
 * Admin Options
 *-----------------------------------------------------------------------------------*/

require_once ( OPTS_DIR . '/functions-admin.php' );
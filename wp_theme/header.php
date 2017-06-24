<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
     <?php $no_scale = ', maximum-scale=1.0, user-scalable=no'; ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1<?php echo (wp_is_mobile() ? $no_scale : ''); ?>">
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="<?php echo esc_attr(get_option( 'meta_application_name' )); ?>">
    <link rel="icon" sizes="192x192" href="<?php echo THEME_URI . '/images/touch/chrome-touch-icon-192x192.png'; ?>">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php echo esc_attr(get_option( 'meta_application_name' )); ?>">
    <link rel="apple-touch-icon" href="<?php echo THEME_URI . '/images/touch/apple-touch-icon.png'; ?>">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="<?php echo THEME_URI . '/images/touch/ms-touch-icon-144x144-precomposed.png'; ?>">
    <meta name="msapplication-TileColor" content="<?php echo esc_attr(get_option( 'meta_application_color' )); ?>">

    <!-- Color the status bar on mobile devices -->
    <meta name="theme-color" content="<?php echo esc_attr(get_option( 'meta_application_color' )); ?>">

    <!-- Favicon   -->
    <link rel="shortcut icon" href="<?php echo THEME_URI . '/favicon.ico'; ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo THEME_URI . '/favicon.ico'; ?>" type="image/x-icon">

    <?php wp_head(); ?>

</head>
<body <?php body_class()?>>

<?php get_template_part('navigation'); ?>
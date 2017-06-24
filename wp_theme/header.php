<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
     <?php $no_scale = ', maximum-scale=1.0, user-scalable=no'; ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1<?php echo (wp_is_mobile() ? $no_scale : ''); ?>">
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>


    <link rel="manifest" href="<?php echo site_url() . '/manifest.json'; ?>">
    <link rel="mask-icon" href="<?php echo site_url() . '/touch/safari-pinned-tab.svg'; ?>" color="#5bbad5">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="<?php echo esc_attr(get_option( 'meta_application_name' )); ?>">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php echo esc_attr(get_option( 'meta_application_name' )); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url() . '/touch/apple-touch-icon.png'; ?>">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileColor" content="<?php echo esc_attr(get_option( 'meta_application_color' )); ?>">

    <!-- Color the status bar on mobile devices -->
    <meta name="theme-color" content="<?php echo esc_attr(get_option( 'meta_application_color' )); ?>">

    <!-- Favicon   -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url() . '/touch/favicon-32x32.png'; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url() . '/touch/favicon-16x16.png'; ?>">

    <?php wp_head(); ?>

</head>
<body <?php body_class()?>>

<?php get_template_part('navigation'); ?>
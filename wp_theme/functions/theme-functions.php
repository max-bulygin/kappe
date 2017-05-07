<?php

/*-----------------------------------------------------------------------------------
 * Include frontend styles and scripts
 *-----------------------------------------------------------------------------------*/

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

  if ( is_singular( 'portfolio' ) ) {

    wp_enqueue_script( 'like-it', THEME_URI . '/scripts/like-it.js', array( 'jquery' ), THEME_VERSION, true );

    wp_localize_script( 'like-it', 'likeit', array(
      'ajax_url' => admin_url( 'admin-ajax.php' )
    ) );
  }
}

add_action( 'wp_enqueue_scripts', 'kp_adding_scripts' );

/*-----------------------------------------------------------------------------------
 * Theme features setup
 *-----------------------------------------------------------------------------------*/

function kp_theme_setup()
{
  // register nav menu
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'kappe' )
  ) );

  // add theme support
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'portfolio-featured', 720, 560, array( 'left', 'top' ) );
  add_image_size( 'portfolio-related', 240, 182, array( 'left', 'top' ) );
  add_image_size( 'portfolio-grid', 405, 311, array( 'left', 'top' ) );
  add_image_size( 'thumb-80x80', 80, 80, array( 'left', 'top' ) );
}

add_action( 'after_setup_theme', 'kp_theme_setup' );

/*-----------------------------------------------------------------------------------
 * Contact Form 7 Custom Setup
 *-----------------------------------------------------------------------------------*/

function mod_contact7_form_content( $template, $prop )
{
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

/*-----------------------------------------------------------------------------------
 * Custom post types
 *-----------------------------------------------------------------------------------*/

function kp_portfolio_post_type()
{
  $labels = array(
    'name' => 'Portfolio',
    'singular_name' => 'Portfolio',
    'add_new' => 'Add Portfolio Item',
    'all_items' => 'All Items',
    'add_new_item' => 'Add New Item',
    'edit_item' => 'Edit Item',
    'new_item' => 'New Item',
    'view_item' => 'View Item',
    'search_item' => 'Search Portfolio',
    'not_found' => 'No items found',
    'not_found_in_trash' => 'No items found in trash',
    'parent_item_colon' => 'Parent Item'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
      'excerpt'
    ),
    'taxonomies' => array(
      'post_tag'
    ),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-art',
    'exclude_from_search' => false,
    'register_meta_box_cb' => 'kp_add_portfolio_metaboxes'
  );

  register_post_type( 'portfolio', $args );
}

add_action( 'init', 'kp_portfolio_post_type' );

// Add the Portfolio Meta Boxes

function kp_add_portfolio_metaboxes()
{
  add_meta_box( 'kp_portfolio_link', 'Project URL', 'kp_portfolio_link', 'portfolio', 'side', 'high' );
  add_meta_box( 'kp_portfolio_client', 'Client', 'kp_portfolio_client', 'portfolio', 'side', 'high' );
}

function kp_portfolio_link( $post )
{
  // Noncename needed to verify where the data originated
  wp_nonce_field( 'kp_save_portfolio_link_data', 'kp_portfolio_link_meta_box_nonce' );

  $value = get_post_meta( $post->ID, '_link', true );
  $hint = '<p class="howto">Link to project website</p>';
  echo '<input name="kp_portfolio_link_field" type="url" value="' . esc_attr( $value ) . '" style="width:100%">' . $hint;
}

function kp_portfolio_client( $post )
{
  // Noncename needed to verify where the data originated
  wp_nonce_field( 'kp_save_portfolio_client_data', 'kp_portfolio_client_meta_box_nonce' );

  $value = get_post_meta( $post->ID, '_client', true );
  $hint = '<p class="howto">Company name</p>';
  echo '<input name="kp_portfolio_client_field" type="text" value="' . esc_attr( $value ) . '" style="width:100%">' . $hint;
}

function kp_save_portfolio_link_data( $post_id )
{
  // Check is meta box exists
  if ( !isset( $_POST[ 'kp_portfolio_link_meta_box_nonce' ] ) ) {
    return;
  }
  // Check is meta box is generated by WP
  if ( !wp_verify_nonce( $_POST[ 'kp_portfolio_link_meta_box_nonce' ], 'kp_save_portfolio_link_data' ) ) {
    return;
  }
  // Disable auto saving by WP
  if ( defined( 'DOING_AUTO_SAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // User permissions
  if ( !current_user_can( 'edit_post', $post_id ) ) {
    return;
  }
  // Check if field is set and have value
  if ( !isset( $_POST[ 'kp_portfolio_link_field' ] ) ) {
    return;
  }

  $data = sanitize_text_field( $_POST[ 'kp_portfolio_link_field' ] );

  update_post_meta( $post_id, '_link', $data );
}

function kp_save_portfolio_client_data( $post_id )
{
  // Check is meta box exists
  if ( !isset( $_POST[ 'kp_portfolio_client_meta_box_nonce' ] ) ) {
    return;
  }
  // Check is meta box is generated by WP
  if ( !wp_verify_nonce( $_POST[ 'kp_portfolio_client_meta_box_nonce' ], 'kp_save_portfolio_client_data' ) ) {
    return;
  }
  // Disable auto saving by WP
  if ( defined( 'DOING_AUTO_SAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // User permissions
  if ( !current_user_can( 'edit_post', $post_id ) ) {
    return;
  }
  // Check if field is set and have value
  if ( !isset( $_POST[ 'kp_portfolio_client_field' ] ) ) {
    return;
  }

  $data = sanitize_text_field( $_POST[ 'kp_portfolio_client_field' ] );

  update_post_meta( $post_id, '_client', $data );
}

add_action( 'save_post', 'kp_save_portfolio_link_data' );
add_action( 'save_post', 'kp_save_portfolio_client_data' );

// Testimonials

function kp_testimonials_post_type()
{
  $labels = array(
    'name' => 'Testimonials',
    'singular_name' => 'Testimonial',
    'add_new' => 'Add Testimonial',
    'all_items' => 'All Testimonials',
    'add_new_item' => 'Add New Testimonial Item',
    'edit_item' => 'Edit Testimonial',
    'new_item' => 'New Item',
    'view_item' => 'View Item',
    'parent_item_colon' => 'Parent Item'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => false,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
    ),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-megaphone',
    'exclude_from_search' => true,
  );

  register_post_type( 'testimonial', $args );
}

add_action( 'init', 'kp_testimonials_post_type' );

function kp_testimonials_thumbnail_columns( $defaults )
{
  $new = array();
  foreach ( $defaults as $key => $title ) {
    if ( $key == 'title' ) // Put the Thumbnail column before the Author column
      $new[ 'thumbnail' ] = __( 'Thumbnail' );
    $new[ $key ] = $title;
  }
  return $new;
}

function kp_posts_custom_columns( $column_name, $id )
{
  if ( $column_name === 'thumbnail' ) {
    the_post_thumbnail( 'thumb-80x80' );
  }
}

add_filter( 'manage_testimonial_posts_columns', 'kp_testimonials_thumbnail_columns', 5 );
add_action( 'manage_posts_custom_column', 'kp_posts_custom_columns', 5, 2 );

// Project features repeating fields with Meta Box plugin

add_filter( 'rwmb_meta_boxes', 'kp_meta_boxes_features' );
function kp_meta_boxes_features( $meta_boxes )
{
  $meta_boxes[] = array(
    'title' => __( 'Project Features', 'kappe' ),
    'post_types' => 'portfolio',
    'fields' => array(
      array(
        'id' => 'feature',
        'name' => __( 'Feature', 'kappe' ),
        'type' => 'text',
        'clone' => true,
        'sort_clone' => true
      )
    ),
  );
  return $meta_boxes;
}

// Likes handler

add_action( 'wp_ajax_nopriv_kp_like_it', 'kp_like_it' );
add_action( 'wp_ajax_kp_like_it', 'kp_like_it' );

function kp_like_it()
{

  if ( !wp_verify_nonce( $_REQUEST[ 'nonce' ], 'kp_like_it_nonce' ) || !isset( $_REQUEST[ 'nonce' ] ) ) {
    exit( "No naughty business please" );
  }

  $likes = get_post_meta( $_REQUEST[ 'post_id' ], '_likes', true );
  $likes = ( empty( $likes ) ) ? 0 : $likes;
  $likes_updated = $likes + 1;

  if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
    update_post_meta( $_REQUEST[ 'post_id' ], '_likes', $likes_updated );
    printf( esc_html( _n( '%d Like', '%d Likes', $likes_updated, 'kappe' ) ), $likes_updated );
    die();
  } else {
    wp_redirect( get_permalink( $_REQUEST[ 'post_id' ] ) );
    exit();
  }
}
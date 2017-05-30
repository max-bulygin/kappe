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

  // Owl Carousel
  wp_register_style( 'owl.carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css', null, null, 'all' );
  wp_register_style( 'owl.carousel.theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css', null, null, 'all' );
  wp_register_script( 'owl.carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js', array( 'jquery' ), null, true );

  // Google fonts
  wp_register_style( 'fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,300,700&amp;subset=cyrillic-ext', null, null, 'all' );
  wp_enqueue_style( 'fonts' );

  // jQuery
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', null, null, true );
  wp_enqueue_script( 'jquery' );

  // jQuery-UI
  wp_register_script( 'jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ), null, true );

  // Isotope
  wp_register_script( 'isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.3/isotope.pkgd.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'isotope' );

  // Custom scripts
  wp_register_script( 'main', THEME_URI . '/scripts/main.min.js', array( 'jquery', 'isotope', 'baguette', 'owl.carousel' ), THEME_VERSION, true );
  wp_enqueue_script( 'main' );

  // Baguette Lightbox
  wp_register_script( 'baguette', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.2/baguetteBox.min.js', null, THEME_VERSION, true );
  if ( is_page_template( 'about.php' ) ) {
    wp_enqueue_script( 'baguette' );
    wp_enqueue_style( 'owl.carousel' );
    wp_enqueue_style( 'owl.carousel.theme' );
    wp_enqueue_script( 'owl.carousel' );
  }

  if ( is_page_template( 'services.php' ) ) {
    wp_enqueue_script( 'jquery-ui' );
  }

  if ( is_singular( 'portfolio' ) ) {

    wp_enqueue_script( 'like-it', THEME_URI . '/scripts/like-it.js', array( 'jquery' ), THEME_VERSION, true );

    wp_enqueue_style( 'owl.carousel' );
    wp_enqueue_style( 'owl.carousel.theme' );
    wp_enqueue_script( 'owl.carousel' );

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
  add_theme_support( 'post-formats', array(
    'image',
    'quote',
    'aside',
    'gallery'
  ) );

  add_image_size( 'portfolio-featured', 720, 560, array( 'center', 'top' ) );
  add_image_size( 'portfolio-related', 240, 182, array( 'center', 'top' ) );
  add_image_size( 'portfolio-grid', 405, 311, array( 'center', 'top' ) );
  add_image_size( 'about-featured', 720, 300, array( 'left', 'top' ) );
  add_image_size( 'certificate-thumb', 227, 180, array( 'center', 'center' ) );
  add_image_size( 'thumb-200x200', 100, 100, array( 'left', 'top' ) );
  add_image_size( 'thumb-80x80', 80, 80, array( 'left', 'top' ) );

  // register sidebars
  register_sidebar( array(
    'name' => 'Common Sidebar',
    'id' => 'common-sidebar',
    'description' => 'Common Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'
  ) );

  register_sidebar( array(
    'name' => 'Related Posts Area',
    'id' => 'related-posts',
    'description' => 'This sidebar displays related posts. Leave blank if you don\'t need this option.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'
  ) );
}

add_action( 'after_setup_theme', 'kp_theme_setup' );

/*-----------------------------------------------------------------------------------
 * Contact Form 7 Custom Setup
 *-----------------------------------------------------------------------------------*/

// Unload JS and CSS from pages
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

// Change default form markup
//apply_filters('comment_form_default_fields', $fields);

function mod_contact7_form_content( $template, $prop )
{
  if ( 'form' == $prop ) {
    return implode( '', array(
      '<div class="form-col-half">',
      '<label for="author">',
      '[text* your-name placeholder"Name"]',
      '</label><label for="email">',
      '[email* your-email placeholder"Email Address"]',
      '</label><label for="url">',
      '[url* your-site placeholder"Web Site"]',
      '</label></div><div class="form-col-half">',
      '[textarea* your-message size:30 placeholder"Message"]',
      '[submit "Send Mail"]',
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
    'exclude_from_search' => true,
    'show_in_admin_bar' => false,
    'show_in_nav_menus' => false,
    'publicly_queryable' => false,
    'query_var' => false,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
    ),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-megaphone'
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

// Certificates

function kp_certificate_post_type()
{
  $labels = array(
    'name' => 'Certificates',
    'singular_name' => 'Certificate',
    'add_new' => 'Add Certificate',
    'all_items' => 'All Certificates',
    'add_new_item' => 'Add New Certificate',
    'edit_item' => 'Edit Certificate',
    'new_item' => 'New Item',
    'view_item' => 'View Item',
    'parent_item_colon' => 'Parent Item'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => false,
    'exclude_from_search' => true,
    'show_in_admin_bar' => false,
    'show_in_nav_menus' => false,
    'publicly_queryable' => false,
    'query_var' => false,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'thumbnail',
    ),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-awards',
  );

  register_post_type( 'certificate', $args );
}

add_action( 'init', 'kp_certificate_post_type' );

// Move featured image box from sidebar

function kp_certificate_featured_image()
{
  remove_meta_box( 'postimagediv', 'certificate', 'side' );
  add_meta_box( 'postimagediv', __( 'Certificate Image', 'kappe' ), 'post_thumbnail_meta_box', 'certificate', 'normal', 'high' );
}

add_action( 'do_meta_boxes', 'kp_certificate_featured_image' );

// Services

function kp_service_post_type()
{
  $labels = array(
    'name' => 'Services',
    'singular_name' => 'Service',
    'add_new' => 'Add Service',
    'all_items' => 'All Services',
    'add_new_item' => 'Add New Service',
    'edit_item' => 'Edit Service',
    'new_item' => 'New Item',
    'view_item' => 'View Item',
    'parent_item_colon' => 'Parent Item'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => false,
    'exclude_from_search' => true,
    'show_in_admin_bar' => false,
    'show_in_nav_menus' => false,
    'publicly_queryable' => false,
    'query_var' => false,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
    ),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-hammer',
  );

  register_post_type( 'service', $args );
}

add_action( 'init', 'kp_service_post_type' );

// Project features repeating fields with Meta Box plugin

function kp_project_features_meta_box( $meta_boxes )
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

add_filter( 'rwmb_meta_boxes', 'kp_project_features_meta_box' );


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

// Skill Meters

function kp_skill_meter_meta_box( $meta_boxes )
{
  $meta_boxes[] = array(
    'title' => __( 'Skills Widget Area', 'kappe' ),
    'post_types' => 'page',
    'fields' => array(
      array(
        'id' => 'skill',
        'name' => __( 'Skill', 'kappe' ),
        'type' => 'key_value',
        'clone' => true,
        'sort_clone' => true
      )
    ),
  );
  return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'kp_skill_meter_meta_box' );

function kp_filter_skill_meter_meta_box()
{
  global $post;
  if ( !empty( $post ) ) {
    $page = get_page_template_slug( $post->ID );
    if ( $page != 'about.php' ) {
      remove_meta_box( 'skills-widget-area', 'page', 'normal' );
    }
  }
}

add_action( 'admin_head', 'kp_filter_skill_meter_meta_box' );

/*-----------------------------------------------------------------------------------
 * Clean head
 *-----------------------------------------------------------------------------------*/

function kp_remove_version()
{
  return '';
}

add_filter( 'the_generator', 'kp_remove_version' );

/*-----------------------------------------------------------------------------------
 * Query custom post type tags
 *-----------------------------------------------------------------------------------*/

function kp_tag_filter( $query )
{
  if ( !is_admin() && $query->is_main_query() ) {
    if ( $query->is_tag ) {
      $query->set( 'post_type', array( 'portfolio' ) );
    }
  }
}

add_action( 'pre_get_posts', 'kp_tag_filter' );

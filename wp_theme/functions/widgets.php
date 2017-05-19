<?php

class Kp_Related_Posts_Widget extends WP_Widget
{
  // Setup the widget name
  public function __construct(
    $id_base = 'kappe-related',
    $name = 'Kappe Related Posts',
    array $widget_options = array(
      'classname' => 'widget_related',
      'description' => 'Kappe Related Posts Widget'
    ),
    array $control_options = array()
  )
  {
    parent::__construct( $id_base, $name, $widget_options, $control_options );
  }

  // Setup back-end of the widget
  public function form( $instance )
  {
    return parent::form( $instance );
  }

  // Setup front-end of the widget
  public function widget( $args, $instance )
  {
    echo $args[ 'before_widget' ]; ?>

    <h2 class="widget-title"><?php _e( 'Related Projects', 'kappe' ) ?></h2>
    <?php
    global $post;
    $tags = wp_get_post_tags( $post->ID );

    if ( $tags ) {
      $tag_ids = array();
      foreach ( $tags as $tag ) $tag_ids[] = $tag->term_id;

      $post_args = array(
        'post_type' => 'portfolio',
        'tag__in' => $tag_ids,
        'post__not_in' => array( $post->ID ),
        'posts_per_page' => 4
      );

      $the_query = new WP_Query( $post_args );
      ?>
      <div class="widget_related-items owl-carousel">
        <?php if ( $the_query->have_posts() ) : ?>

          <!-- pagination here -->

          <!-- the loop -->
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <figure class="imghvr-push-up">
              <?php the_post_thumbnail( 'portfolio-related' ); ?>
              <figcaption>
                <?php the_title( '<h6>', '</h6>' ); ?>
              </figcaption>
              <a href="<?php the_permalink(); ?>"></a>
            </figure>

          <?php endwhile; ?>
          <!-- end of the loop -->

          <?php wp_reset_postdata(); ?>

        <?php else : ?>
          <p><?php _e( 'Sorry, no similar projects found', 'kappe' ); ?></p>
        <?php endif; ?>

      </div>
    <?php } ?>

    <?php echo $args[ 'after_widget' ];
  }
}

add_action( 'widgets_init', function () {
  register_widget( 'Kp_Related_Posts_Widget' );
} );

/*-----------------------------------------------------------------------------------
 * Manage body_class depending on the widgets
 *-----------------------------------------------------------------------------------*/

function kp_manage_body_classes( $classes )
{

  if ( !is_active_sidebar( 'related-posts' ) && is_singular( 'portfolio' ) ) {

    $classes[] = 'no-related';

  }

  return $classes;

}

add_filter( 'body_class', 'kp_manage_body_classes' );

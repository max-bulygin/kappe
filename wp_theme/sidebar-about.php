<div class="content-grid-column content-sidebar">

  <div class="progress">
    <h2><?php _e('Experience', 'kappe')?></h2>
    <?php
    $args = array(
      'type' => 'key_value'
    );
    if (function_exists('rwmb_meta')) {
      $skills = rwmb_meta( 'skill', $args );
      foreach ( $skills as $skill ) : ?>
        <div class="progress-item">
          <h6><?php echo $skill[ 0 ]; ?><span></span></h6>
          <div class="progress-meter">
            <span data-progress-percent="<?php echo $skill[ 1 ]; ?>"></span>
          </div>
        </div>
      <?php endforeach;
    } else {
      echo '<p>This widget requires <a href="http://metabox.io" target="_blank">Meta Box</a> plugin to be installed</p>';
    } ?>
  </div>

  <div class="testimonial">
    <h2><?php _e( 'Testimonials', 'kappe' ) ?></h2>
    <div class="testimonial-carousel owl-carousel">
      <?php
      $args = array(
        'post_type' => 'testimonial',
        'post_per_page' => 3
      );
      $testimonials = new WP_Query( $args );
      while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
        <div>
          <header class="testimonial-header clearfix">
            <?php the_post_thumbnail( 'thumb-80x80', array(
              'class' => 'testimonial-img'
            ) ); ?>
            <?php the_title( '<h6 class="testimonial-author">', '</h6>' ); ?>
          </header>
          <p class="testimonial-content"><?php echo get_the_content(); ?></p>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>

  <?php
  $args = array(
    'post_type' => 'service'
  );
  $services = new WP_Query( $args );

  if ( $services->have_posts() ) : ?>
  <div class="services">
    <h2><?php _e( 'Services', 'kappe' ) ?></h2>
    <ul class="custom-list">
      <?php
      while ( $services->have_posts() ):$services->the_post();
        the_title( '<li>', '</li>' );
      endwhile;
      wp_reset_postdata();
      ?>
    </ul>
  </div>
  <?php endif; ?>

  </div><!--  /.content-grid-column  -->
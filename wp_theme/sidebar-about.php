<div class="content-grid-column content-sidebar">

  <div class="progress">
    <h2>Our Skills</h2>
    <div class="progress-item">
      <h6>Web Development <span>25%</span></h6>
      <div class="progress-meter">
        <span data-progress-percent="25"></span>
      </div>
    </div>
    <div class="progress-item">
      <h6>Web Design <span>25%</span></h6>
      <div class="progress-meter">
        <span data-progress-percent="45"></span>
      </div>
    </div>
    <div class="progress-item">
      <h6>Plugins <span>25%</span></h6>
      <div class="progress-meter">
        <span data-progress-percent="50"></span>
      </div>
    </div>
    <div class="progress-item">
      <h6>Frontend <span>25%</span></h6>
      <div class="progress-meter">
        <span data-progress-percent="25"></span>
      </div>
    </div>
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
          <h6 class="testimonial-author"><?php the_title(); ?></h6>
        </header>
        <p class="testimonial-content"><?php echo get_the_content(); ?></p>
      </div>
    <?php endwhile; ?>
    </div>
  </div>

  <div class="services">
    <h2>Services</h2>
    <ul class="custom-list">
      <li>service 1</li>
      <li>service 2</li>
      <li>service 3</li>
      <li>service 4</li>
      <li>service 5</li>
      <li>service 6</li>
    </ul>
  </div>

</div><!--  /.content-grid-column  -->
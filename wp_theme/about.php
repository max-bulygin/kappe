<?php

/*
 * Template Name: About
 */

get_header(); ?>

<main class="container">

  <div class="content clearfix">

    <div class="content-grid-column content-main">

      <div class="img">
        <?php the_post_thumbnail('about-featured'); ?>
      </div>

      <div>
        <h2><?php _e('About me', 'kappe'); ?></h2>
        <?php echo $post->post_content; ?>
      </div>

      <div class="gallery">
        <h2><?php _e('Certificates', 'kappe'); ?></h2>
        <div id="certificates" class="gallery-items clearfix">
          <a href="images/fancy-box-thumb.jpg" data-caption="Image caption">
<!--            <img src="images/fancy-box-227x180.jpg" alt="First image">-->
          </a>
          <a href="images/fancy-box-thumb.jpg">
<!--            <img src="images/fancy-box-227x180.jpg" alt="Second image">-->
          </a>
          <a href="images/fancy-box-thumb.jpg" data-caption="Image caption">
<!--            <img src="images/fancy-box-227x180.jpg" alt="First image">-->
          </a>
          <a href="images/fancy-box-thumb.jpg">
<!--            <img src="images/fancy-box-227x180.jpg" alt="Second image">-->
          </a>
        </div>
      </div>
    </div><!--  /.content-grid-column  -->

    <?php get_sidebar('about'); ?>

  </div>

</main>

<?php get_footer(); ?>

<?php

get_header(); ?>

<main class="container">

  <div class="content clearfix">

    <div class="content-grid-column content-main">

      <?php

      if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>

        <?php endwhile;

      else:

        echo '<p>' . __('No content found', 'kappe') . '</p>';

      endif;

      ?>

    </div><!--  /.content-grid-column  -->

    <?php get_sidebar(); ?>

  </div>

</main>

<?php get_footer(); ?>

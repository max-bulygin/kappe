<?php

get_header(); ?>

<main class="container">

  <div class="content clearfix">

    <div class="content-grid-column content-main">

      <?php

      the_archive_title( '<h2>', '</h2>' );
      the_archive_description( '<div class="taxonomy-description">', '</div>' );

      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

          get_template_part('content', 'archive');

        endwhile;

      else:

        echo '<p>' . __('No content found', 'kappe') . '</p>';

      endif;

      ?>

    </div><!--  /.content-grid-column  -->

    <?php get_sidebar(); ?>

  </div>

</main>

<?php get_footer(); ?>

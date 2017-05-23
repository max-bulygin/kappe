<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-item' ); ?> role="article">

  <figure class="imghvr-push-up">
    <?php the_post_thumbnail( 'about-featured' ); ?>
    <figcaption>
      <h5 class="archive-item-title"><?php the_title(); ?></h5>
    </figcaption>
    <a href="<?php the_permalink(); ?>"></a>
  </figure>

  <footer>
    <ul class="archive-item-meta clearfix">
      <?php
      $meta_client = get_post_meta( get_the_ID(), '_client', true );
      if ( $meta_client ) : ?>
      <li>
        <svg class="icon icon-user icon-baseline">
          <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#user'; ?>"></use>
        </svg>
        <?php echo esc_html( $meta_client ); ?>
      </li>
      <?php endif; ?>
      <li>
        <svg class="icon icon-calendar icon-baseline">
          <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#calendar'; ?>"></use>
        </svg>
        <?php echo get_the_date( 'j F, Y' ); ?>
      </li>
      <li>
        <svg class="icon icon-thumbs-up icon-baseline">
          <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#thumbs-up'; ?>"></use>
        </svg>
        <?php
        $likes = get_post_meta( get_the_ID(), '_likes', true );
        $likes = ( empty( $likes ) ) ? 0 : $likes;
        printf( esc_html( _n( '%d Like', '%d Likes', $likes, 'kappe' ) ), $likes );
        ?>
      </li>
    </ul>
  </footer>

</article>
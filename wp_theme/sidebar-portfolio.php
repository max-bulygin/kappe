<div class="content-grid-column content-sidebar">

  <div class="info-box">
    <h2><?php _e( 'Project Info', 'kappe' ) ?></h2>
    <ul class="info">
      <?php
      $meta_client = get_post_meta( get_the_ID(), '_client', true );
      if ( $meta_client ) : ?>
        <li class="info-item">
          <span class="info-item-icon">
            <svg class="icon icon-user">
              <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#user'; ?>"></use>
            </svg>
          </span>
          <span class="info-item-data"><?php echo esc_html( $meta_client ); ?></span>
        </li>
      <?php endif; ?>
      <li class="info-item">
        <span class="info-item-icon">
          <svg class="icon icon-heart">
            <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#heart'; ?>"></use>
          </svg>
        </span>
        <span class="info-item-data" id="<?php echo 'like-count-' . get_the_ID(); ?>">
          <?php
          $likes = get_post_meta( get_the_ID(), '_likes', true );
          $likes = ( empty( $likes ) ) ? 0 : $likes;
          printf( esc_html( _n( '%d Like', '%d Likes', $likes, 'kappe' ) ), $likes );
          ?>
        </span>
      </li>
      <li class="info-item">
        <span class="info-item-icon">
          <svg class="icon icon-calendar">
            <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#calendar'; ?>"></use>
          </svg>
        </span>
        <span class="info-item-data"><?php echo get_the_date( 'j F, Y' ); ?></span>
      </li>
      <?php
      $meta_link = get_post_meta( get_the_ID(), '_link', true );
      if ( $meta_link ) : ?>
        <li class="info-item">
          <span class="info-item-icon">
            <svg class="icon icon-chain">
              <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#chain'; ?>"></use>
            </svg>
          </span>
            <a class="info-item-data info-item-data-link"
               target="_blank"
               href="<?php echo esc_url( $meta_link ); ?>"><?php echo esc_html( $meta_link ); ?></a>
        </li>
      <?php endif; ?>
    </ul>
  </div>

  <?php
  $tags = wp_get_post_tags( get_the_ID() );
  if ( $tags ) :?>
    <div class="tag">
      <h2><?php _e( 'Tags', 'kappe' ) ?></h2>

      <?php

      $html = '<ul class="tag-list">';
      foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );

        $html .= "<li><a href='{$tag_link}' title='{$tag->name}'>";
        $html .= "{$tag->name}</a></li>";
      }
      $html .= '</ul>';
      echo $html;

      ?>

    </div>
  <?php endif; ?>

  <?php

  $features = rwmb_meta( 'feature' );

  if ( !empty( $features ) ) : ?>
    <div class="services">
      <h2><?php _e( 'Project Features', 'kappe' ) ?></h2>
      <ul class="custom-list custom-list-alt">
        <?php

        foreach ( $features as $feature ) {
          echo "<li>$feature</li>";
        }

        ?>
      </ul>
    </div>
  <?php endif; ?>

</div><!--  /.content-grid-column  content-sidebar -->
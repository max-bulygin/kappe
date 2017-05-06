<div id="nav-toggle">
  <span></span>
  <span></span>
  <span></span>
</div>
<div class="info-toggle">
  <button id="info-toggle">
    <svg class="icon icon-info-circle icon-baseline">
      <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#info-circle'; ?>"></use>
    </svg>
  </button>
  <ul class="info-toggle-list">
    <?php if ( get_option( 'phone' ) ) : ?>
      <?php $phone = get_option( 'phone' ); ?>
      <li><a href="<?php echo 'tel:+' . esc_attr( $phone ); ?>">
          <svg class="icon icon-phone icon-middle">
            <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#phone'; ?>"></use>
          </svg>
          <?php echo '+' . esc_html( $phone ); ?></a>
      </li>
    <?php endif; ?>
    <?php if ( get_option( 'email' ) ) : ?>
      <?php $email = get_option( 'email' ); ?>
      <li><a href="<?php echo 'mailto:' . esc_attr( $email ); ?>">
          <svg class="icon icon-envelope icon-middle">
            <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#envelope'; ?>"></use>
          </svg>
          <?php echo esc_html( $email ); ?></a>
      </li>
    <?php endif; ?>
    <?php if ( get_option( 'skype' ) ) : ?>
      <?php $skype = get_option( 'skype' ); ?>
      <li><a href="<?php echo 'skype:' . esc_attr( $skype ); ?>">
          <svg class="icon icon-skype icon-middle">
            <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#skype'; ?>"></use>
          </svg>
          <?php echo esc_html( $skype ); ?></a>
      </li>
    <?php endif; ?>
  </ul>
</div>
<aside class="main-aside">
  <header class="main-logo">
    <?php if ( is_home() || is_front_page() ) : ?>
      <img src="<?php echo THEME_URI . '/images/logo.png'; ?>"
           alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    <?php else : ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>>">
        <img src="<?php echo THEME_URI . '/images/logo.png'; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
      </a>
    <?php endif; ?>
    <div class="description"><?php echo bloginfo( 'description' ); ?></div>
  </header>
  <nav class="main-nav">
    <?php

    $args = array(
      'theme_location' => 'primary'
    );

    ?>
    <?php wp_nav_menu( $args ); ?>
  </nav>
  <?php
  if ( is_home() ) : ?>
    <div class="filter">
      <h6 id="filter-toggle">Filter
        <svg class="icon icon-th-large icon-baseline">
          <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#th-large'; ?>"></use>
        </svg>
      </h6>
      <ul class="filter-tags">
        <li class="filter-current" data-filter="*">All Works</li>
        <li data-filter=".design">design</li>
        <li data-filter=".illustration">illustration</li>
        <li data-filter=".wordpress">wordpress</li>
        <li data-filter=".html">html</li>
        <li data-filter=".development">development</li>
      </ul>
    </div>
  <?php endif; ?>
  <footer class="main-footer">
    <ul class="social">
      <?php if ( get_option( 'linkedin' ) ) : ?>
        <li><a href="<?php echo esc_attr( get_option( 'linkedin' ) ); ?>>"
               class="social-item-link social-item-linkedin">
            <svg class="icon icon-baseline">
              <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#linkedin'; ?>"></use>
            </svg>
          </a>
        </li>
      <?php endif; ?>
      <?php if ( get_option( 'twitter' ) ) : ?>
        <li><a href="<?php echo esc_attr( get_option( 'twitter' ) ); ?>>" class="social-item-link social-item-twitter">
            <svg class="icon icon-baseline">
              <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#twitter'; ?>"></use>
            </svg>
          </a>
        </li>
      <?php endif; ?>
      <?php if ( get_option( 'facebook' ) ) : ?>
        <li><a href="<?php echo esc_attr( get_option( 'facebook' ) ); ?>>"
               class="social-item-link social-item-facebook">
            <svg class="icon icon-baseline">
              <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#facebook'; ?>"></use>
            </svg>
          </a>
        </li>
      <?php endif; ?>
      <?php if ( get_option( 'github' ) )  : ?>
        <li><a href="<?php echo esc_attr( get_option( 'github' ) ); ?>>" class="social-item-link social-item-github">
            <svg class="icon icon-baseline">
              <use xlink:href="<?php echo THEME_URI . '/images/icons.svg#github-alt'; ?>"></use>
            </svg>
          </a>
        </li>
      <?php endif; ?>
    </ul>
    <p class="copy">© <?php echo date( 'Y' ); ?> Kappe. All Rights Reserved</p>
  </footer>
</aside>
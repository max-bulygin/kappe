/*!
 *
 *  Web Starter Kit
 *  Copyright 2015 Google Inc. All rights reserved.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *    https://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License
 *
 */
/* eslint-env browser */
(function() {
  'use strict';

  // Check to make sure service workers are supported in the current browser,
  // and that the current page is accessed from a secure origin. Using a
  // service worker from an insecure origin will trigger JS console errors. See
  // http://www.chromium.org/Home/chromium-security/prefer-secure-origins-for-powerful-new-features
  var isLocalhost = Boolean(window.location.hostname === 'localhost' ||
    // [::1] is the IPv6 localhost address.
    window.location.hostname === '[::1]' ||
    // 127.0.0.1/8 is considered localhost for IPv4.
    window.location.hostname.match(
      /^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/
    )
  );

  if ('serviceWorker' in navigator &&
    (window.location.protocol === 'https:' || isLocalhost)) {
    navigator.serviceWorker.register('service-worker.js')
      .then(function(registration) {
        // updatefound is fired if service-worker.js changes.
        registration.onupdatefound = function() {
          // updatefound is also fired the very first time the SW is installed,
          // and there's no need to prompt for a reload at that point.
          // So check here to see if the page is already controlled,
          // i.e. whether there's an existing service worker.
          if (navigator.serviceWorker.controller) {
            // The updatefound event implies that registration.installing is set:
            // https://slightlyoff.github.io/ServiceWorker/spec/service_worker/index.html#service-worker-container-updatefound-event
            var installingWorker = registration.installing;

            installingWorker.onstatechange = function() {
              switch (installingWorker.state) {
                case 'installed':
                  // At this point, the old content will have been purged and the
                  // fresh content will have been added to the cache.
                  // It's the perfect time to display a "New content is
                  // available; please refresh." message in the page's interface.
                  break;

                case 'redundant':
                  throw new Error('The installing ' +
                    'service worker became redundant.');

                default:
                // Ignore
              }
            };
          }
        };
      }).catch(function(e) {
      console.error('Error during service worker registration:', e);
    });
  }

  // Your custom JavaScript goes here

  $(document).ready(function() {

    var isTouch = (('ontouchstart' in window)
    || (navigator.maxTouchPoints > 0)
    || (navigator.msMaxTouchPoints > 0));

    $('#nav-toggle').click(function() {
      $(this).toggleClass('open');
      $('.main-aside').toggleClass('is-open');
    });

    $('#info-toggle').click(function() {
      $('.info-toggle-list').toggleClass('is-open');
    });

    var $filterTagsLi = $('.filter-tags li');
    var $filter = $('.filter');
    var $ulHeight = $filterTagsLi.length * 1.25; // em value of 20px/16px
    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

    if (window.innerHeight < 820) {
      $filter.addClass('collapsed');
    }

    $filterTagsLi.each(function(index) {
      $(this).css('animationDelay', index / 10 + 's');
    });

    $('#filter-toggle').click(function() {
      if ($filter.hasClass('collapsed')) {
        $('.filter-tags').height($ulHeight + 'em');
        $filterTagsLi.each(function() {
          $(this)
            .addClass('animated fadeInLeft')
            .one(animationEnd, function() {
              $(this).removeClass('animated fadeInLeft');
            });
        });
        $filter.removeClass('collapsed');
      } else {
        $filterTagsLi.each(function() {
          $(this)
            .addClass('animated fadeOutRight')
            .one(animationEnd, function() {
              $(this).removeClass('animated fadeOutRight');
            });
        }).delay(500).queue(function(next) {
          $('.filter-tags').height('');
          $filter.addClass('collapsed');
          next();
        });
      } // else
    });

    var $portfolio = $('.portfolio-wrapper');

    $portfolio.isotope({
      itemSelector: '.portfolio-item',
      layoutMode: 'fitRows'
    });

    var $portfolioItem = $('.portfolio-item');

    $portfolioItem.bind('touchstart touchend', function() {
      $(this).toggleClass('over');
    });

    $filterTagsLi.click(function() {
      $($filterTagsLi).removeClass('filter-current');
      $(this).addClass('filter-current');
      var filterValue = $(this).attr('data-filter');
      $portfolio.isotope({filter: filterValue});
    });

    // Social

    var $socialIcon = $('.social li');
    $socialIcon.mouseenter(function() {
      $(this)
        .addClass('animated flipInX')
        .one(animationEnd, function() {
          $(this).removeClass('animated flipInX');

          if (isTouch) {
            window.location.href = $(this).children().attr('href');
          }
        });
    });

    // Progress

    var $progressMeters = $('.progress-meter span');

    $progressMeters.map(moveProgressBar);

    function moveProgressBar() {
      var $this = $(this);
      var $getPercent = $this.data('progress-percent');
      var animationLength = 1500;
      var $percentCounter = $this.closest('.progress-item').children('h6').find('span');
      // on page load, animate percentage bar to data percentage length
      // .stop() used to prevent animation queueing

      var value = 0;

      var intId = setInterval(function() {
        if (value >= $getPercent) {
          clearInterval(intId);
        }
        $percentCounter.text((value++) + '%');

      }, animationLength / $getPercent);


      $this.stop().animate({
        width: $getPercent + '%'
      }, animationLength);
    }

    // Gallery

    if ($('#certificates').length) {
      baguetteBox.run('#certificates');
    }

    // Info-box animations

    var $infoItem = $('.info-item');
    $infoItem.mouseenter(function() {

      var $icon = $(this).children('.info-item-icon');

      $icon
        .addClass('animated pulse')
        .one(animationEnd, function() {
          $(this).removeClass('animated pulse');
        });
    });

    // Testimonials Carousel

    var $testimonialCarousel = $('.testimonial-carousel');

    if ($testimonialCarousel.length) {
      $testimonialCarousel.owlCarousel({
        items: 1,
        nav: false,
        dots: false,
        autoHeight: true,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        itemElement: 'aside',
        animateOut: 'fadeOutLeft',
        animateIn: 'fadeInRight'
      });
    }

    var $relatedCarousel = $('.widget_related-items');

    if ($relatedCarousel.length) {
      $relatedCarousel.owlCarousel({
        items: 1,
        nav: false,
        dots: false,
        stagePadding: 50,
        loop: true,
        center: true,
        autoplay: true,
        autoplayHoverPause: true
      });
    }

    var $accordion = $( '#accordion' );

    if($accordion.length) {
      $accordion.accordion({
        heightStyle: 'content',
        icons: false
      });
    }

  });

  window.onload = function() {
    $('.testimonial-carousel').trigger('refresh.owl.carousel');
  };

})();

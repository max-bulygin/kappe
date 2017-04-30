<?php get_header(); ?>

<div id="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
</div>
<div class="info-toggle">
    <button id="info-toggle">
        <svg class="icon icon-info-circle icon-baseline">
            <use xlink:href="images/icons.svg#info-circle"></use>
        </svg>
    </button>
    <ul class="info-toggle-list">
        <li><a href="tel:+380957033014">
                <svg class="icon icon-phone icon-middle">
                    <use xlink:href="images/icons.svg#phone"></use>
                </svg> +380957033014</a></li>
        <li><a href="mailto:maksym.bulygin@gmail.com">
                <svg class="icon icon-envelope icon-middle">
                    <use xlink:href="images/icons.svg#envelope"></use>
                </svg> maksym.bulygin@gmail.com</a></li>
        <li><a href="skype:bulyginbass">
                <svg class="icon icon-skype icon-middle">
                    <use xlink:href="images/icons.svg#skype"></use>
                </svg> bulyginbass</a></li>
    </ul>
</div>
<aside class="main-aside">
    <header class="main-logo">
        <a href="#"><img src="images/logo.png" alt="main-logo"></a>
        <div class="description">some text here</div>
    </header>
    <nav class="main-nav">
        <ul>
            <li class="current-menu-item"><a href="#">home</a></li>
            <li><a href="#">work</a></li>
            <li><a href="about.html">about</a></li>
            <li><a href="#">blog</a></li>
            <li><a href="#">services</a></li>
            <li><a href="contacts.html">contacts</a></li>
        </ul>
    </nav>
    <div class="filter">
        <h6 id="filter-toggle">Filter
            <svg class="icon icon-th-large icon-baseline">
                <use xlink:href="images/icons.svg#th-large"></use>
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
    <footer class="main-footer">
        <ul class="social">
            <li><a href="#" class="social-item-link social-item-linkedin">
                    <svg class="icon icon-baseline">
                        <use xlink:href="images/icons.svg#linkedin"></use>
                    </svg>
                </a></li>
            <li><a href="#" class="social-item-link social-item-twitter">
                    <svg class="icon icon-baseline">
                        <use xlink:href="images/icons.svg#twitter"></use>
                    </svg>
                </a></li>
            <li><a href="#" class="social-item-link social-item-facebook">
                    <svg class="icon icon-baseline">
                        <use xlink:href="images/icons.svg#facebook"></use>
                    </svg>
                </a></li>
            <li><a href="#" class="social-item-link social-item-github">
                    <svg class="icon icon-baseline">
                        <use xlink:href="images/icons.svg#github-alt"></use>
                    </svg>
                </a></li>
        </ul>
        <p class="copy">© 2014 Kappe. All Rights Reserved</p>
    </footer>
</aside>
<main class="container">
    <div class="portfolio">
        <div class="portfolio-item illustration html">
            <img src="images/img-placeholder-light.jpg" alt="">
            <div class="portfolio-item-overlay">
                <div class="overlay-content">
                    <h4>Cool Design</h4>
                    <p>development, design</p>
                    <a href="#" class="portfolio-item-link">
                        <svg class="icon icon-baseline">
                            <use xlink:href="images/icons.svg#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="portfolio-item wordpress">
            <img src="images/image-placeholder-dark.jpg" alt="">
            <div class="portfolio-item-overlay">
                <div class="overlay-content">
                    <h4>Cool Design</h4>
                    <p>wordpress</p>
                    <a href="#" class="portfolio-item-link">
                        <svg class="icon icon-baseline">
                            <use xlink:href="images/icons.svg#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="portfolio-item wordpress illustration">
            <img src="images/img-placeholder-light.jpg" alt="">
            <div class="portfolio-item-overlay">
                <div class="overlay-content">
                    <h4>Cool Design</h4>
                    <p>wordpress, illustration</p>
                    <a href="#" class="portfolio-item-link">
                        <svg class="icon icon-baseline">
                            <use xlink:href="images/icons.svg#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="images/image-placeholder-dark.jpg" alt="">
            <div class="portfolio-item-overlay">
                <div class="overlay-content">
                    <h4>Cool Design</h4>
                    <p>development, mobile</p>
                    <a href="#" class="portfolio-item-link">
                        <svg class="icon icon-baseline">
                            <use xlink:href="images/icons.svg#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="images/img-placeholder-light.jpg" alt="">
            <div class="portfolio-item-overlay">
                <div class="overlay-content">
                    <h4>Cool Design</h4>
                    <p>development, mobile, app, wordpress</p>
                    <a href="#" class="portfolio-item-link">
                        <svg class="icon icon-baseline">
                            <use xlink:href="images/icons.svg#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="images/image-placeholder-dark.jpg" alt="">
            <div class="portfolio-item-overlay">
                <div class="overlay-content">
                    <h4>Cool Design</h4>
                    <p>development, mobile</p>
                    <a href="#" class="portfolio-item-link">
                        <svg class="icon icon-baseline">
                            <use xlink:href="images/icons.svg#arrow-right"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>

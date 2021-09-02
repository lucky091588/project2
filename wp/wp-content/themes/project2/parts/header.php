<header class="l-header header js-header <?php echo !empty($modifier) ? ' header--'.$modifier : ''; ?>">
  <div class="header__pc js-header-pc">
    <div class="l-container l-container--medium<?php echo !empty($modifier) ? ' l-container--'.$modifier : ''; ?>">
      <div class="header__wrapper clearfix">
        <div class="logo <?php echo !empty($modifier) ? 'logo--'.$modifier : ''; ?>">
          <a class="logo__link" href="<?php echo get_top_url(); ?>">
            <?php if(is_front_page()): ?>
              <h1>
                <svg role="img" class="logo__svg">
                    <title>Jackson</title>
                    <use xlink:href="#logo__svg-main"/>
                </svg>
              </h1>
            <?php else: ?>
              <svg role="img" class="logo__svg">
                  <title>Jackson</title>
                  <use xlink:href="#logo__svg-main"/>
              </svg>
            <?php endif; ?>
          </a>
        </div>
        <?php
          $term_slug = '';
          if(is_singular( PRODUCT_POST_TYPE )){
            $term = get_the_terms( get_the_ID(), PRODUCT_TAX_CAT );
            $term_slug = !empty($term[0]->slug) ? $term[0]->slug : '';
          }
        ?>
        <div class="nav <?php echo !empty($modifier) ? 'nav--'.$modifier : ''; ?>">
          <ul class="nav__inner">
            <li class="nav__item nav__item--parent">
              <a class="nav__link icon-arrow-down-after<?php echo (get_query_var( 'post_type' ) == 'products' || is_archive( PRODUCT_POST_TYPE ) || is_tax() )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG); ?>">
                <span>PRODUCT</span>
              </a>
              <ul class="nav-sub__inner">
                <li class="nav-sub__item">
                  <a class="nav-sub__link<?php echo (is_tax( PRODUCT_TAX_CAT, 'salt' ) || $term_slug == 'salt' )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG . '/salt'); ?>">
                    <span>SALT</span>
                  </a>
                </li>
                <li class="nav-sub__item">
                  <a class="nav-sub__link<?php echo (is_tax( PRODUCT_TAX_CAT, 'bass' ) || $term_slug == 'bass' )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG . '/bass'); ?>">
                    <span>BASS</span>
                  </a>
                </li>
                <li class="nav-sub__item">
                  <a class="nav-sub__link<?php echo (is_tax( PRODUCT_TAX_CAT, 'trout' ) || $term_slug == 'trout' )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG . '/trout'); ?>">
                    <span>TROUT</span>
                  </a>
                </li>
                <li class="nav-sub__item">
                  <a class="nav-sub__link<?php echo (is_tax( PRODUCT_TAX_CAT, 'accessories' ) || $term_slug == 'accessories' )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG . '/accessories'); ?>">
                    <span>ACCESSORIES</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav__item">
              <a class="nav__link" href="<?php the_field('catalogue_section_file','option'); ?>" target="_blank">
                <span>CATALOGUE</span>
              </a>
            </li>
            <li class="nav__item">
              <a class="nav__link<?php echo is_page('about-us')  ? ' is-current' : '' ?>" href="<?php echo resolve_url('about-us'); ?>">
                <span>ABOUT US</span>
              </a>
            </li>
            <li class="nav__item">
              <a class="nav__link<?php echo is_page('distributors')  ? ' is-current' : '' ?>" href="<?php echo resolve_url('distributors'); ?>">
                <span>DISTRIBUTORS</span>
              </a>
            </li>
            <li class="nav__item nav__item--contact">
              <a class="nav__link" href="<?php echo resolve_url('contact'); ?>">
                <span>CONTACT</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="header-sp">
    <div class="nav__hamburger clearfix" id="js-nav-hamburger">
      <button class="nav__button u-notap" type="button" id="js-nav-button">
        <span class="nav__button-icon"></span>
        <span class="nav__button-icon"></span>
        <span class="nav__button-icon"></span>
      </button>
    </div>
    <div class="nav__sp js-nav-sp">
      <div class="nav__sp-wrapper">
        <ul class="nav__sp-inner">
          <li class="nav__sp-item">
            <a class="nav__sp-link<?php echo is_front_page()  ? ' is-current' : '' ?>" href="<?php echo get_top_url(); ?>">
              <span>TOP</span>
            </a>
          </li>
          <li class="nav__sp-item nav__sp-item--parent">
            <a class="nav__sp-link<?php echo (get_query_var( 'post_type' ) == 'products' || is_archive( PRODUCT_POST_TYPE ) || is_tax() )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG); ?>">
              <span>PRODUCT</span>
            </a>
            <ul class="nav-sub__sp-inner">
              <li class="nav-sub__sp-item">
                <a class="nav-sub__sp-link<?php echo (is_tax( PRODUCT_TAX_CAT, 'salt' ) || $term_slug == 'salt' )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG . '/salt'); ?>">
                  <span>SALT</span>
                </a>
              </li>
              <li class="nav-sub__sp-item">
                <a class="nav-sub__sp-link<?php echo (is_tax( PRODUCT_TAX_CAT, 'bass' ) || $term_slug == 'bass' )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG . '/bass'); ?>">
                  <span>BASS</span>
                </a>
              </li>
              <li class="nav-sub__sp-item">
                <a class="nav-sub__sp-link<?php echo (is_tax( PRODUCT_TAX_CAT, 'trout' ) || $term_slug == 'trout' )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG . '/trout'); ?>">
                  <span>TROUT</span>
                </a>
              </li>
              <li class="nav-sub__sp-item">
                <a class="nav-sub__sp-link<?php echo (is_tax( PRODUCT_TAX_CAT, 'accessories' ) || $term_slug == 'accessories' )  ? ' is-current' : '' ?>" href="<?php echo resolve_url(PRODUCT_SLUG . '/accessories'); ?>">
                  <span>ACCESSORIES</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav__sp-item">
            <a class="nav__sp-link<?php echo is_page('about-us')  ? ' is-current' : '' ?>" href="<?php echo resolve_url('about-us'); ?>">
              <span>ABOUT US</span>
            </a>
          </li>
          <li class="nav__sp-item">
            <a class="nav__sp-link" href="<?php the_field('catalogue_section_file','option'); ?>" target="_blank">
              <span>CATALOGUE</span>
            </a>
          </li>
          <li class="nav__sp-item">
            <a class="nav__sp-link<?php echo is_page('distributors')  ? ' is-current' : '' ?>" href="<?php echo resolve_url('distributors'); ?>">
              <span>DISTRIBUTORS</span>
            </a>
          </li>
          <li class="nav__sp-item">
            <a class="nav__sp-link<?php echo (is_page('contact') || is_page('contact-error') || is_page('contact-confirm') || is_page('thank-you'))  ? ' is-current' : '' ?>" href="<?php echo resolve_url('contact'); ?>">
              <span>CONTACT</span>
            </a>
          </li>
        </ul>
        <div class="nav__social-media">
          <ul class="nav__social-media-inner">
            <li class="nav__social-media-item">
              <a class="nav__social-media-link nav__social-media-link--youtube" target="_blank" href="https://www.youtube.com/user/studiojackson1">
                <img src="<?php echo resolve_image_uri('icon-youtube-white.png'); ?>" alt="" />
              </a>
            </li>
            <li class="nav__social-media-item">
              <a class="nav__social-media-link" target="_blank" href="https://www.facebook.com/jacksonquon">
                <span class="nav__social-media-facebook icon-facebook">
                  <i class="path1"></i>
                  <i class="path2"></i>
                </span>
              </a>
            </li>
            <li class="nav__social-media-item">
              <a class="nav__social-media-link" target="_blank" href="https://twitter.com/jacksonlure">
                <span class="nav__social-media-twitter icon-twitter">
                  <i class="path1"></i>
                  <i class="path2"></i>
                </span>
              </a>
            </li>
            <li class="nav__social-media-item">
              <a class="nav__social-media-link" target="_blank" href="https://www.instagram.com/jackson_quon/">
                <span class="nav__social-media-instagram"></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>

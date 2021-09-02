<div class="footer">
  <div class="footer__menu">
    <div class="l-container">
      <div class="footer__menu-wrapper">
        <ul class="footer__menu-list">
          <li class="footer__menu-item">
            <a class="footer__menu-link" href="<?php echo get_top_url(); ?>"><span>TOP</span></a>
          </li>
          <li class="footer__menu-item">
            <a class="footer__menu-link" href="<?php echo resolve_url(PRODUCT_SLUG); ?>"><span>PRODUCT</span></a>
          </li>
          <li class="footer__menu-item">
            <a class="footer__menu-link" href="<?php echo resolve_url('about-us'); ?>"><span>ABOUT US</span></a>
          </li>
          <li class="footer__menu-item">
            <a class="footer__menu-link" href="<?php the_field('catalogue_section_file','option'); ?>" target="_blank"><span>CATALOGUE</span></a>
          </li>
          <li class="footer__menu-item">
            <a class="footer__menu-link" href="<?php echo resolve_url('distributors'); ?>"><span>DISTRIBUTORS</span></a>
          </li>
          <li class="footer__menu-item">
            <a class="footer__menu-link" href="<?php echo resolve_url('contact'); ?>"><span>CONTACT</span></a>
          </li>
        </ul>
        <a class="footer__to-top js-to-top" href="body">
          <span class="icon-up"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="footer__main">
    <div class="l-container">
      <div class="footer__main-wrapper">
        <ul class="footer__main-social">
          <li class="footer__main-social-item">
            <a class="footer__main-social-link" target="_blank" href="https://www.youtube.com/user/studiojackson1">
              <span class="footer__main-social-youtube"></span>
            </a>
          </li>
          <li class="footer__main-social-item">
            <a class="footer__main-social-link" target="_blank" href="https://www.facebook.com/jacksonquon">
              <span class="footer__main-social-facebook icon-facebook">
                <i class="path1"></i>
                <i class="path2"></i>
              </span>
            </a>
          </li>
          <li class="footer__main-social-item">
            <a class="footer__main-social-link" target="_blank" href="https://twitter.com/jacksonlure">
              <span class="footer__main-social-twitter icon-twitter">
                <i class="path1"></i>
                <i class="path2"></i>
              </span>
            </a>
          </li>
          <li class="footer__main-social-item">
            <a class="footer__main-social-link" target="_blank" href="https://www.instagram.com/jackson_quon/">
              <span class="footer__main-social-instagram"></span>
            </a>
          </li>
        </ul>
        <p class="footer__main-copyright">
          <small>
            <svg role="img" class="footer__copyright">
                <use xlink:href="#footer__copyright"/>
            </svg>
          </small>
        </p>
      </div>
    </div>
  </div>
</div>

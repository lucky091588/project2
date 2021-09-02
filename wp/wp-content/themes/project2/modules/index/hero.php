<?php
  $hero_slider_query = recent_products_query();
  if($hero_slider_query->have_posts()):

  $hero_images = '';
?>
<div class="hero">
  <div class="l-container l-container--large l-container--fluid">
    <div class="hero__wrapper">
      <div class="hero__slider-counter js-hero-slider-counter" data-count='1'></div>
      <div class="hero__slider-wrapper">
        <ol class="hero__slider" id="js-hero-slider">
          <?php
            $count_slider = 1;
            while($hero_slider_query->have_posts()): $hero_slider_query->the_post();
          ?>
            <li class="hero__slider-item hero__slider-item--<?php echo $count_slider; $count_slider++; ?>" >
              <div class="l-container l-container--large l-container--hero">
                <article class="hero__slider-article">
                  <h2 class="hero__slider-title"><?php the_title(); ?></h2>
                  <p class="hero__slider-bottom-title"><?php the_field('bottom_title'); ?></p>
                  <div class="hero__slider-image" style="background-image: url(<?php echo get_eyecatch_data( get_the_ID(), 'full', resolve_image_uri('no-image.jpg')); ?>);"></div>
                  <p class="hero__slider-description"><?php the_field('slider_description'); ?></p>
                  <a class="hero__slider-link hero__slider-link--pc" href="<?php the_permalink(); ?>"><span>More</span> <i class="icon-arrow-right"></i></a>
                  <a class="button hero__slider-link--sp" href="<?php the_permalink(); ?>"><span>MORE</span></a>
                </article>
              </div>
            </li>
          <?php $hero_images .= get_eyecatch_data( get_the_ID(), 'full', resolve_image_uri('no-image.jpg')).','; ?>
          <?php endwhile; wp_reset_query();?>
        </ol>
        <div class="hero__slider-paging">
          <a class="hero__slider-paging-item js-slider-paging is-active" href="#"></a>
          <a class="hero__slider-paging-item js-slider-paging" href="#"></a>
          <a class="hero__slider-paging-item js-slider-paging" href="#"></a>
        </div>
      </div>
      <div class="hero__bottom clearfix">
        <div class="hero__bottom-left">
          <p class="hero__bottom-tagline">PRODUCTS</p>
        </div>
        <?php if(get_field('information_section_slider','option')): ?>
          <div class="hero__bottom-right">
            <h2 class="hero__info-title">INFORMATION</h2>
            <div class="hero__info js-slider-info">
              <ol class="hero__info-slider">
                <?php while(has_sub_field('information_section_slider','option')): ?>
                  <li class="hero__info-item is-active">
                    <?php if(get_sub_field('link_type') == true): ?>
                      <a class="hero__info-link" target="_blank" href="<?php the_sub_field('external_link'); ?>">
                        <span><?php the_sub_field('title'); ?></span>
                      </a>
                    <?php else: ?>
                      <a class="hero__info-link" href="<?php the_sub_field('internal_link'); ?>">
                        <span><?php the_sub_field('title'); ?></span>
                      </a>
                    <?php endif; ?>
                  </li>
                <?php endwhile; ?>
              </ol>
            </div>
            <div class="hero__info-counter">
              <a class="hero__info-counter-button hero__info-counter-button--prev js-info-button js-info-prev" href="#">
                <i class="icon-arrow-left"></i>
              </a>
              <span>1/3</span>
              <a class="hero__info-counter-button hero__info-counter-button--next js-info-button js-info-next" href="#">
                <i class="icon-arrow-right"></i>
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <input type="hidden" value="<?php echo $hero_images; ?>" id="js-preload-images" />
  <input type="hidden" value="<?php echo resolve_image_uri('loader.gif'); ?>" id="js-loader-url" />
</div>
<?php endif; ?>

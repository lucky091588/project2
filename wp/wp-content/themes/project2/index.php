<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

  <?php importTemplate('modules/index/hero'); ?>

  <main class="main main--index">

    <section class="section section--index section--index-products">
      <div class="l-container l-container--medium">
        <div class="section__wrapper section__wrapper--index-products">
          <div class="l-container">
            <h2 class="section__title section__title--index-products">Products</h2>
            <p class="section__description">Introduction of items handled by Jackson.</p>
            <div class="products js-filter-products">
              <?php
                $offset                = product_offset();
                $categories            = product_category_query();
                $product_section_query = product_section_query($offset,$categories);

                // filter buttons
                $queried_filter = array(
                  'all'            => true,
                  'modifier'       => '',
                  'custom_query'   => $categories,
                );
                importPart('filter', $queried_filter);

                // filter product content
                $queried_products = array(
                  'modifier'       => 'products',
                  'filter'         => true,
                  'custom_query'   => $product_section_query,
                );
                importPart('query', $queried_products);
              ?>
              <div class="section__view-more">
                <a class="button button--products" href="<?php echo resolve_url(PRODUCT_SLUG); ?>"><span>VIEW MORE</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section--index section--index-about">
      <div class="l-container">
        <div class="section__wrapper section__wrapper--index-about">
          <h2 class="section__title">About Us</h2>
          <div class="section__content">
            <img class="section__content-image" src="<?php echo resolve_image_uri('image-about.jpg'); ?>" alt="Make a tool that you can enjoy. One by one, with soul." />
            <p class="section__description">Jackson Inc is well know for its history in unique designs and high quality fishing tackle products. A name well known by the Japanese fishing fraternity, and now very quickly getting the same high regard around the world for innovative and the highest quality fishing tackle for both salt and fresh water applications. <br>The Jackson company ethos remains the same since 1980 and the entire team at Jackson pride themselves on providing anglers all over the world with enjoyment and are dedicated to manufacturing reliable high performance fishing products.</p>
            <p class="section__description">Jackson began in the early days of Japanese lure fishing and launched the “Cherion”, the very first fishing rod specifically designed for Seabass fishing in Japanese waters. Then cam the now famous “Athlete” series lure with a new action for a minnow the anglers had not seen and remains a mainstay range in the Jackson stable to this day, this success prompted the team to produce further successful lures like “NyoroNyoro, “Pintail”, “Rogos” and “Artoron”. All of these lures were designed with innovation and new actions for specific fishing needs, and the news of this innovative designed quickly spread through the Japanese fishing world. <br>The design team at Jackson have never been afraid to produce the unconventional, the different and the specific for its customers and this plan has seen Jackson now used with great results all over the world. </p>
            <div class="section__view-more section__view-more--index-about">
              <a class="button" href="<?php echo resolve_url('about-us'); ?>"><span>VIEW MORE</span></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section--index section--index-catalogue">
      <div class="l-container l-container--medium">
        <div class="section__wrapper section__wrapper--index-catalogue">
          <div class="l-container">
            <div class="section__left">
              <h2 class="section__title section__title--index-catalogue">Catalogue</h2>
              <p class="section__description">You can download Jackson's latest catalogue here.</p>
              <div class="section__catalogue-image" style="background-image: url(<?php echo get_field('catalogue_section_image','option') ? get_field('catalogue_section_image','option') :resolve_image_uri('no-image.jpg'); ?>);">
              </div>
              <div class="section__view-more section__view-more--index-catalogue">
                <a class="button" href="<?php the_field('catalogue_section_file','option'); ?>" target="_blank"><span>DOWNLOAD</span></a>
              </div>
            </div>
            <div class="section__right">
              <div class="section__catalogue-image" style="background-image: url(<?php echo get_field('catalogue_section_image','option') ? get_field('catalogue_section_image','option') :resolve_image_uri('no-image.jpg'); ?>);">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section--index section--index-distributors">
      <div class="l-container">
        <div class="section__wrapper section__wrapper--index-distributors section__wrapper--distributors">
          <h2 class="section__title">Distributors</h2>
          <p class="section__description section__description--distributors">Jackson’s products are available for purchase through our global distributors.<br> Here's our list of distributors in Europe, Asia, Middle East, Oceania, and Latin America. </p>
          <div class="section__content">
            <div class="section__view-more section__view-more--index-distributors">
              <a class="button" href="<?php echo resolve_url('distributors'); ?>"><span>VIEW MORE</span></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="instagram-feed">
      <div class="l-container l-container--large">
        <div class="instagram-feed__wrapper">
          <ul class="instagram-feed__list flex flex-wrap" id="js-instagram-feed"></ul>
          <div class="section__view-more">
            <a class="button" href="https://www.instagram.com/jackson_quon/" target="_blank"><span>VIEW INSTAGRAM</span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="featured-social">
      <div class="l-container">
        <div class="featured-social__wrapper clearfix">
          <?php if(get_field('youtube_video_link','option')): ?>
            <div class="featured-social__left">
              <div class="featured-social__youtube">
                  <iframe width="518" height="518" src="<?php echo get_youtube_embed_url(get_field('youtube_video_link','option')); ?>" allowfullscreen></iframe>
              </div>
            </div>
          <?php endif; ?>
          <div class="featured-social__right">
            <div class="featured-social__facebook">
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fjacksonquon&tabs=timeline&width=340&height=360&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="360" style="border:none;overflow:hidden" allow="encrypted-media"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

<?php
get_footer();

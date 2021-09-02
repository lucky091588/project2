<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: About Us
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

  <?php
    // set breadcrumbs and it will be pass on the footer
    $breadcrumbs = array(
      'breadcrumbs' => array (
        array(
          'title' => 'ABOUT US',
        ),
      )
    );
  ?>

  <main class="main main--about">

    <div class="section section--page-about">
      <div class="l-container">
        <div class="section__wrapper section__wrapper--about">
          <h1 class="section__title section__title--inner">About Us</h1>
          <p class="section__description section__description--inner section__description--about">Make a tool that you can enjoy. <br class="u-pc-hidden">One by one, with soul. </p>
          <section class="about">
            <div class="about__top-content">
              <?php if(get_field('about_image')): ?>
                <div class="about__image-wrapper">
                  <img class="about__image" src="<?php the_field('about_image'); ?>" alt="" />
                </div>
              <?php endif; ?>
              <?php if(get_field('about_sub_title')): ?>
                <h2 class="section__title section__title--inner-cat about__sub-title"><?php the_field('about_sub_title'); ?></h2>
              <?php endif; ?>
              <?php if(get_field('about_description')): ?>
                <p class="section__description"><?php the_field('about_description'); ?></p>
              <?php endif; ?>
              <?php if(get_field('about_youtube_video')): ?>
                <iframe width="518" height="518" src="<?php echo get_youtube_embed_url(get_field('about_youtube_video')); ?>" allowfullscreen></iframe>
              <?php endif; ?>
            </div>
            <div class="about__bottom-content flex flex-wrap">
              <?php if(get_field('about_bottom_image')): ?>
                <div class="about__bottom-item about__bottom-left">
                  <div class="about__bottom-image" style="background-image: url(<?php the_field('about_bottom_image'); ?>);"></div>
                </div>
              <?php endif; ?>
              <?php if(get_field('about_bottom_description')): ?>
                <div class="about__bottom-item about__bottom-right">
                  <p class="section__description"><?php the_field('about_bottom_description'); ?></p>
                </div>
              <?php endif; ?>
            </div>
            <?php if(get_field('about_company_details')): ?>
              <div class="about__company">
                <h3 class="section__title section__title--inner-cat about__sub-title"><?php the_field('about_company_title'); ?></h3>
                <table class="about__company-details">
                  <tbody class="about__company-body">
                    <?php while(has_sub_field('about_company_details')): ?>
                      <tr class="about__company-row">
                        <td class="about__company-column about__company-column--label"><?php the_sub_field('label'); ?></td>
                        <td class="about__company-column about__company-column--description"><?php the_sub_field('description'); ?></td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
          </section>
        </div>
      </div>
    </div>

  </main>

<?php
get_footer();

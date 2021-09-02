<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Thank You Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

  <?php
    // set breadcrumbs and it will be pass on the footer
    $breadcrumbs = array(
      'breadcrumbs' => array (
        array(
          'title' => 'CONTACT US',
        ),
      )
    );
  ?>

  <main class="main main--contact">

    <div class="section section--page-contact">
      <div class="l-container">
        <div class="section__wrapper section__wrapper--contact">
          <h1 class="section__title section__title--inner">CONTACT US</h1>
          <p class="section__description section__description--inner">If you would like to make general inquiries about our products or the website, please use the following form. </p>
          <div class="form-steps">
            <ol class="form-steps__inner">
              <li class="form-steps__item form-steps__item--one">
                <span class="form-steps__order">STEP 01</span>
                <span class="form-steps__label">Input Item</span>
                <span class="form-steps__arrow icon-arrow-steps"></span>
              </li>
              <li class="form-steps__item form-steps__item--two">
                <span class="form-steps__order">STEP 02</span>
                <span class="form-steps__label">Confirmation</span>
                <span class="form-steps__arrow icon-arrow-steps"></span>
              </li>
              <li class="form-steps__item form-steps__item--last is-current">
                <span class="form-steps__order">STEP 03</span>
                <span class="form-steps__label">Success</span>
              </li>
            </ol>
          </div>
          <section class="form form--thank-you">
            <h2 class="form__thank-you-title">Thank you for your inquiry!</h2>
            <p class="section__description section__description--thank-you">We have received your message and will get back to you shortly.</p>
            <div class="form__submit">
              <a class="button button--thank-you" href="<?php echo get_top_url(); ?>">
                <span>TOP</span>
              </a>
            </div>
            <div class="form__thank-you-wrapper">
              <?php if (have_posts()): ?>
                <?php while(have_posts()): the_post(); ?>
                  <?php the_content(); ?>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </section>
        </div>
      </div>
    </div>

  </main>

<?php
get_footer();

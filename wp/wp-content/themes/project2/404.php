<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

  <?php
    // set breadcrumbs and it will be pass on the footer
    $breadcrumbs = array(
      'breadcrumbs' => array (
        array(
          'title' => '404',
        ),
      )
    );
  ?>

  <main class="main main--404">

    <div class="section section--page-404">
      <div class="l-container">
        <div class="section__wrapper section__wrapper--404">
          <h1 class="section__title section__title--inner section__title--404">404 PAGE <br class="u-pc-hidden">NOT FOUND</h1>
          <p class="section__description section__description--404">I'm really sorry but the page you were looking for could not be found. The page you clicked may broken or have been removed.</p>
          <a class="button button--404" href="<?php echo get_top_url(); ?>">
            <span>TOP</span>
          </a>
        </div>
      </div>
    </div>

  </main>

<?php
get_footer();

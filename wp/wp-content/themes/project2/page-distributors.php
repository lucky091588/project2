<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Distributors Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

  <?php
    // set breadcrumbs and it will be pass on the footer
    $breadcrumbs = array(
      'breadcrumbs' => array (
        array(
          'title' => 'DISTRIBUTORS',
        ),
      )
    );
  ?>

  <main class="main main--distributors">

    <div class="section section--page-distributors">
      <div class="l-container">
        <div class="section__wrapper section__wrapper--distributors">
          <h1 class="section__title section__title--inner">Distributors</h1>
          <p class="section__description section__description--inner section__description--page-distributors">Jackson Global Distributors</p>
          <?php if(get_field('distributors_details')): ?>
            <div class="distributors">
              <?php while(has_sub_field('distributors_details')): ?>
                  <div class="distributors__details">
                    <div class="distributors__country-wrapper">
                      <h2 class="distributors__country"><?php the_sub_field('country'); ?></h2>
                    </div>
                    <div class="table__wrapper">
                      <div class="table__wrapper-inner js-table-wrapper">
                        <table class="distributors__table js-table">
                          <thead class="distributors__table-head">
                            <tr class="distributors__table-head-row">
                              <th class="distributors__table-head-column table__column-fixed">Company</th>
                              <th class="distributors__table-head-column">Head Office</th>
                              <th class="distributors__table-head-column">Area</th>
                              <th class="distributors__table-head-column">Website</th>
                            </tr>
                          </thead>
                          <?php if(have_rows('details')): ?>
                            <tbody class="distributors__table-body">
                              <?php while ( have_rows('details') ) : the_row(); ?>
                                <tr class="distributors__table-body-row">
                                  <td class="distributors__table-body-column table__column-fixed"><?php echo get_sub_field('company') ? get_sub_field('company') : '-'; ?></td>
                                  <td class="distributors__table-body-column"><?php echo get_sub_field('head_office') ? get_sub_field('head_office') : '-'; ?></td>
                                  <td class="distributors__table-body-column"><?php echo get_sub_field('area') ? get_sub_field('area') : '-'; ?></td>
                                  <td class="distributors__table-body-column">
                                    <?php if(get_sub_field('website')): ?>
                                      <a href="<?php the_sub_field('website'); ?>" target="_blank"><?php the_sub_field('website'); ?></a>
                                    <?php else: ?>
                                      -
                                    <?php endif; ?>
                                  </td>
                                </tr>
                              <?php endwhile; ?>
                            </tbody>
                          <?php endif; ?>
                        </table>
                      </div>
                    </div>
                  </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </main>

<?php
get_footer();

<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

  <?php
    // set breadcrumbs and it will be pass on the footer
    $term     = get_queried_object();
    $children = count(get_term_children( $term->term_id, PRODUCT_TAX_CAT ));

    $breadcrumbs = array(
      'breadcrumbs' => array (
        array(
          'title' => 'PRODUCT',
          'link'  => resolve_url(PRODUCT_SLUG),
        ),
        array(
          'title' => strtoupper(single_cat_title("", false)),
          'link'  => resolve_url(PRODUCT_SLUG . '/' . $term->slug),
        ),
      )
    );
  ?>

  <main class="main main--products">

    <div class="section product product--taxonomy">
      <div class="l-container l-container--medium">
        <div class="product__wrapper">
          <div class="l-container">
            <h1 class="section__title section__title--taxonomy"><?php echo $term->name; ?></h1>
            <p class="section__description section__description--taxonomy"><?php echo $term->description; ?></p>
            <?php if($children): ?>
              <section class="product__filter js-filter-products">
                <?php
                  $categories = product_category_query($term->term_id);

                  // filter buttons
                  $queried_filter = array(
                    'modifier'       => 'products-taxonomy',
                    'custom_query'   => $categories,
                  );
                  importPart('filter', $queried_filter);
                ?>

                <div class="product__filter-content js-filter-content">

                  <?php foreach($categories as $category): ?>

                    <?php $category_details = get_term_by( 'id', $category, PRODUCT_TAX_CAT ); ?>

                    <div class="product__main-list product__main-list--taxonomy <?php echo $category_details->slug; ?>">
                      <h2 class="section__title section__title--inner-cat section__title--hidden"><?php echo $category_details->name; ?></h2>
                      <?php $grand_children = count(get_term_children( $category_details->term_id, PRODUCT_TAX_CAT )); ?>

                      <?php if($grand_children): ?>

                        <?php $children_categories = product_category_query($category_details->term_id); ?>

                          <?php foreach($children_categories as $children_category): ?>

                            <?php $children_category_details = get_term_by( 'id', $children_category, PRODUCT_TAX_CAT ); ?>
                            <h3 class="section__title section__title--inner-cat"><?php echo $children_category_details->name; ?></h3>

                            <?php $ggrand_children = count(get_term_children( $children_category_details->term_id, PRODUCT_TAX_CAT )); ?>

                            <?php if($ggrand_children): ?>

                              <?php $grand_children_categories = product_category_query($children_category_details->term_id); ?>

                              <?php foreach($grand_children_categories as $grand_children_category): ?>
                                <?php $grand_children_category_details = get_term_by( 'id', $grand_children_category, PRODUCT_TAX_CAT ); ?>
                                <h4 class="section__title section__title--inner-cat-small"><span><?php echo $grand_children_category_details->name; ?></span></h4>
                                <?php
                                  $product_page_query  = product_page_query($grand_children_category, -1);
                                  $queried_products = array(
                                    'modifier'       => 'product-taxonomy',
                                    'heading'        => 'h5',
                                    'custom_query'   => $product_page_query,
                                  );
                                  importPart('query', $queried_products);
                                ?>

                              <?php endforeach; ?>

                            <?php else: ?>

                              <?php
                                $product_page_query  = product_page_query($children_category, -1);
                                $queried_products = array(
                                  'modifier'       => 'product-taxonomy',
                                  'heading'        => 'h4',
                                  'custom_query'   => $product_page_query,
                                );
                                importPart('query', $queried_products);
                              ?>

                            <?php endif; ?>

                          <?php endforeach; ?>

                      <?php else: ?>
                        <?php
                          $product_page_query  = product_page_query($category, -1);
                          $queried_products = array(
                            'modifier'       => 'product-taxonomy',
                            'custom_query'   => $product_page_query,
                          );
                          importPart('query', $queried_products);
                        ?>
                      <?php endif; ?>

                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="section__view-more section__view-more--taxonomy">
                  <a class="button button--products" href="<?php echo resolve_url(PRODUCT_SLUG); ?>"><span>PRODUCT LIST</span></a>
                </div>
              </section>
            <?php else: ?>
              <div class="product__filter">
                <div class="product__filter-content">
                  <div class="product__main-list product__main-list--taxonomy <?php echo $term->slug; ?>">
                    <?php
                      $product_page_query  = product_page_query($term->term_id, 8);
                      $queried_products = array(
                        'modifier'       => 'product-taxonomy',
                        'heading'        => 'h2',
                        'custom_query'   => $product_page_query,
                      );
                      importPart('query', $queried_products);
                    ?>
                  </div>
                </div>
                <div class="section__view-more section__view-more--taxonomy">
                  <a class="button button--products" href="<?php echo resolve_url(PRODUCT_SLUG); ?>"><span>PRODUCT LIST</span></a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  </main>

<?php
get_footer();

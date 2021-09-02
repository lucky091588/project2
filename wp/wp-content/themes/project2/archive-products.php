<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

  <?php
    // set breadcrumbs and it will be pass on the footer
    $breadcrumbs = array(
      'breadcrumbs' => array (
        array(
          'title' => 'PRODUCT',
        ),
      )
    );
  ?>

  <main class="main main--products">

    <div class="section product section--page-products">
      <div class="l-container l-container--medium">
        <div class="product__wrapper">
          <div class="l-container">
            <h1 class="section__title section__title--inner">Product</h1>
            <p class="section__description section__description--inner">Jackson's wide range offers you all the options you need to target.</p>
            <section class="product__filter js-filter-products">
              <?php
                $categories = product_category_query();

                // filter buttons
                $queried_filter = array(
                  'all'            => true,
                  'modifier'       => 'products',
                  'custom_query'   => $categories,
                );
                importPart('filter', $queried_filter);
              ?>

              <div class="product__filter-content product__filter-content--product js-filter-content">
                <?php foreach($categories as $category): ?>
                  <?php $category_details = get_term_by( 'id', $category, PRODUCT_TAX_CAT ); ?>
                  <div class="product__main-list product__main-list--product product__main-list--<?php echo $category_details->slug; ?> all <?php echo $category_details->slug; ?>">
                    <h2 class="section__title section__title--inner-cat"><?php echo $category_details->name; ?></h2>
                    <?php
                      $product_page_query  = product_page_query($category);
                      $queried_products = array(
                        'modifier'       => 'product-page query--product-'.$category_details->slug,
                        'custom_query'   => $product_page_query,
                      );
                      importPart('query', $queried_products);
                    ?>
                    <div class="section__view-more">
                      <a class="button button--products" href="<?php echo resolve_url('product/' . $category_details->slug ); ?>"><span>VIEW MORE</span></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>

  </main>

<?php
get_footer();

<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); ?>

  <?php
    // set breadcrumbs and it will be pass on the footer
    $categories    = get_the_terms( $post->ID, PRODUCT_TAX_CAT );
    if($categories) {
      $main_category = get_main_product_category($categories);

      $bread_details = array(
        'breadcrumbs' => array (
          array(
            'title' => 'PRODUCT',
            'link'  => resolve_url(PRODUCT_SLUG),
          ),
          array(
            'title' => strtoupper($main_category->name),
            'link'  => resolve_url(PRODUCT_SLUG . '/' . $main_category->slug),
          ),
          array(
            'title' => strtoupper(get_the_title()),
            'link'  => get_the_permalink(),
          ),
        ),
      );
    } else {
      $bread_details = array(
        'breadcrumbs' => array (
          array(
            'title' => 'PRODUCT',
            'link'  => resolve_url(PRODUCT_SLUG),
          ),
          array(
            'title' => strtoupper(get_the_title()),
            'link'  => get_the_permalink(),
          ),
        ),
      );
    }

    $breadcrumbs = $bread_details;
  ?>

  <main class="main main--products-single">

    <div class="section section--single">
      <div class="l-container">
        <div class="section__wrapper section__wrapper--single">
          <h1 class="section__title section__title--single"><?php the_title(); ?></h1>
          <div class="single__hero-image" style="background-image: url(<?php echo get_eyecatch_data( get_the_ID(), 'full', resolve_image_uri('no-image.jpg')); ?>);"></div>
          <p class="section__description section__description--single"><?php the_field('description'); ?></p>
        </div>
      </div>
    </div>

    <div class="single__main">
      <div class="l-container">
        <div class="single__wrapper">
          <?php if(get_field('feature_video_link') || get_field('single_page_content')): ?>
            <div class="single__content">
              <?php if(get_field('feature_video_link')): ?>
                <iframe width="518" height="518" src="<?php echo get_youtube_embed_url(get_field('feature_video_link')); ?>" allowfullscreen></iframe>
              <?php endif; ?>
              <?php if(get_field('single_page_content')): ?>
                <?php the_field('single_page_content'); ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <?php if(get_field('three_column')): ?>
            <div class="single__more-details">
              <ol class="single__more-details-inner">
                <?php while(has_sub_field('three_column')): ?>
                  <li class="single__more-details-item">
                    <div class="single__more-details-item-wrapper">
                      <div class="single__more-details-image" style="background-image: url(<?php echo get_sub_field('image') ? get_sub_field('image') : resolve_image_uri('no-image.jpg'); ?>);"></div>
                      <p class="single__more-details-description"><?php the_sub_field('description'); ?></p>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ol>
            </div>
          <?php endif; ?>

          <?php if(get_field('one_column')): ?>
            <section class="single__specs">
              <h2 class="section__title section__title--single-sub"><?php the_field('one_column_title'); ?></h2>
              <ol class="single__specs-inner">
                <?php while(has_sub_field('one_column')): ?>
                  <li class="single__specs-item">
                    <div class="single__specs-item-wrapper">
                      <?php if(get_sub_field('image')): ?>
                        <img src="<?php the_sub_field('image'); ?>" alt="" />
                      <?php endif; ?>
                      <div class="single__specs-item-title">
                        <?php if(get_sub_field('title')): ?>
                          <h3 class="single__specs-title"><?php the_sub_field('title'); ?></h3>
                        <?php endif; ?>
                        <?php if(is_numeric(get_sub_field('price'))): ?>
                          <p class="single__specs-price">￥<?php echo number_format(get_sub_field('price')); ?> <span>(Not including tax)</span></p>
                        <?php endif; ?>
                        <a class="single__specs-button js-specs-more-button" href="#"></a>
                      </div>
                      <div class="single__specs-more js-specs-more">
                        <div class="single__specs-more-item u-sp-inline-hidden">
                          <p>
                            Length : <?php echo get_sub_field('length') ? get_sub_field('length') : '-' ; ?><br>
                            Section : <?php echo get_sub_field('section') ? get_sub_field('section') : '-' ; ?><br>
                            Action : <?php echo get_sub_field('action') ? get_sub_field('action') : '-' ; ?>
                          </p>
                        </div>
                        <div class="single__specs-more-item u-sp-inline-hidden">
                          <p>
                            Closed Length : <?php echo get_sub_field('closed_length') ? get_sub_field('closed_length') : '-' ; ?><br>
                            Lure : <?php echo get_sub_field('lure') ? get_sub_field('lure') : '-' ; ?><br>
                            Self Weight : <?php echo get_sub_field('self_weight') ? get_sub_field('self_weight') : '-' ; ?>
                          </p>
                        </div>
                        <div class="single__specs-more-item u-sp-inline-hidden">
                          <p>
                            Power : <?php echo get_sub_field('power') ? get_sub_field('power') : '-' ; ?><br>
                            Line : <?php echo get_sub_field('line') ? get_sub_field('line') : '-' ; ?>
                          </p>
                        </div>
                        <div class="single__specs-more-item u-pc-inline-hidden">
                          <p>
                            Length : <?php echo get_sub_field('length') ? get_sub_field('length') : '-' ; ?><br>
                            Power : <?php echo get_sub_field('power') ? get_sub_field('power') : '-' ; ?><br>
                            Lure : <?php echo get_sub_field('lure') ? get_sub_field('lure') : '-' ; ?><br>
                            Action : <?php echo get_sub_field('action') ? get_sub_field('action') : '-' ; ?>
                          </p>
                        </div>
                        <div class="single__specs-more-item u-pc-inline-hidden">
                          <p>
                            Closed Length : <?php echo get_sub_field('closed_length') ? get_sub_field('closed_length') : '-' ; ?> <br>
                            Section : <?php echo get_sub_field('section') ? get_sub_field('section') : '-' ; ?><br>
                            Line : <?php echo get_sub_field('line') ? get_sub_field('line') : '-' ; ?><br>
                            Self Weight : <?php echo get_sub_field('self_weight') ? get_sub_field('self_weight') : '-' ; ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ol>
            </section>
          <?php endif; ?>

          <?php if(get_field('one_column_casting')): ?>
            <section class="single__specs">
              <h2 class="section__title section__title--single-sub"><?php the_field('one_column_casting_title'); ?></h2>
              <ol class="single__specs-inner">
                <?php while(has_sub_field('one_column_casting')): ?>
                  <li class="single__specs-item">
                    <div class="single__specs-item-wrapper">
                      <?php if(get_sub_field('image')): ?>
                        <img src="<?php the_sub_field('image'); ?>" alt="" />
                      <?php endif; ?>
                      <div class="single__specs-item-title">
                        <?php if(get_sub_field('title')): ?>
                          <h3 class="single__specs-title"><?php the_sub_field('title'); ?></h3>
                        <?php endif; ?>
                        <?php if(is_numeric(get_sub_field('price'))): ?>
                          <p class="single__specs-price">￥<?php echo number_format(get_sub_field('price')); ?> <span>(Not including tax)</span></p>
                        <?php endif; ?>
                        <a class="single__specs-button js-specs-more-button" href="#"></a>
                      </div>
                      <div class="single__specs-more js-specs-more">
                        <div class="single__specs-more-item u-sp-inline-hidden">
                          <p>
                            Length : <?php echo get_sub_field('length') ? get_sub_field('length') : '-' ; ?><br>
                            Section : <?php echo get_sub_field('section') ? get_sub_field('section') : '-' ; ?><br>
                            Action : <?php echo get_sub_field('action') ? get_sub_field('action') : '-' ; ?>
                          </p>
                        </div>
                        <div class="single__specs-more-item u-sp-inline-hidden">
                          <p>
                            Closed Length : <?php echo get_sub_field('closed_length') ? get_sub_field('closed_length') : '-' ; ?><br>
                            Lure : <?php echo get_sub_field('lure') ? get_sub_field('lure') : '-' ; ?><br>
                            Self Weight : <?php echo get_sub_field('self_weight') ? get_sub_field('self_weight') : '-' ; ?>
                          </p>
                        </div>
                        <div class="single__specs-more-item u-sp-inline-hidden">
                          <p>
                            Power : <?php echo get_sub_field('power') ? get_sub_field('power') : '-' ; ?><br>
                            Line : <?php echo get_sub_field('line') ? get_sub_field('line') : '-' ; ?>
                          </p>
                        </div>
                        <div class="single__specs-more-item u-pc-inline-hidden">
                          <p>
                            Length : <?php echo get_sub_field('length') ? get_sub_field('length') : '-' ; ?><br>
                            Power : <?php echo get_sub_field('power') ? get_sub_field('power') : '-' ; ?><br>
                            Lure : <?php echo get_sub_field('lure') ? get_sub_field('lure') : '-' ; ?><br>
                            Action : <?php echo get_sub_field('action') ? get_sub_field('action') : '-' ; ?>
                          </p>
                        </div>
                        <div class="single__specs-more-item u-pc-inline-hidden">
                          <p>
                            Closed Length : <?php echo get_sub_field('closed_length') ? get_sub_field('closed_length') : '-' ; ?> <br>
                            Section : <?php echo get_sub_field('section') ? get_sub_field('section') : '-' ; ?><br>
                            Line : <?php echo get_sub_field('line') ? get_sub_field('line') : '-' ; ?><br>
                            Self Weight : <?php echo get_sub_field('self_weight') ? get_sub_field('self_weight') : '-' ; ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ol>
            </section>
          <?php endif; ?>

          <?php if(get_field('lure_specs')): ?>
            <section class="single__table">
              <h2 class="section__title section__title--single-sub"><?php the_field('lure_specs_title'); ?></h2>
              <div class="table__wrapper">
                <div class="table__wrapper-inner js-table-wrapper">
                  <table class="single__table-content js-table">
                    <thead class="single__table-head">
                      <tr class="single__table-head-row">
                        <th class="single__table-head-column table__column-fixed">Size</th>
                        <th class="single__table-head-column">Weight</th>
                        <th class="single__table-head-column">Type</th>
                        <th class="single__table-head-column">Range</th>
                        <th class="single__table-head-column">Hook</th>
                        <th class="single__table-head-column">Quantity</th>
                        <th class="single__table-head-column">Price</th>
                      </tr>
                    </thead>
                    <tbody class="single__table-body">
                      <?php while(has_sub_field('lure_specs')): ?>
                        <tr class="single__table-body-row">
                          <td class="single__table-body-column table__column-fixed"><?php echo get_sub_field('size') ? get_sub_field('size') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('weight') ? get_sub_field('weight') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('type') ? get_sub_field('type') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('range') ? get_sub_field('range') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('hook') ? get_sub_field('hook') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('quantity') ? get_sub_field('quantity') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo is_numeric(get_sub_field('price')) ? '￥'.number_format(get_sub_field('price')) : '-' ; ?></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <p class="single__table-note">(Price does not include tax)</p>
            </section>
          <?php endif; ?>

          <?php if(get_field('four_column')): ?>
            <section class="single__lures">
              <h2 class="section__title section__title--single-sub"><?php the_field('four_column_title'); ?></h2>
              <ol class="single__lures-inner flex flex-wrap">
                <?php while(has_sub_field('four_column')): ?>
                  <li class="single__lures-item">
                    <div class="single__lures-item-wrapper">
                      <div class="single__lures-image-wrapper">
                        <div class="single__lures-image" style="background-image: url(<?php echo get_sub_field('image') ? get_sub_field('image') : resolve_image_uri('no-image.jpg'); ?>);"></div>
                      </div>
                      <p class="single__lures-title"><?php the_sub_field('title'); ?></p>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ol>
            </section>
          <?php endif; ?>

          <?php if(get_field('one_column') || get_field('one_column_casting')): ?>
            <section class="single__table">
              <h2 class="section__title section__title--single-sub"><?php the_field('specs_table_title'); ?></h2>
              <div class="table__wrapper">
                <div class="table__wrapper-inner js-table-wrapper">
                  <table class="single__table-content js-table">
                    <thead class="single__table-head">
                      <tr class="single__table-head-row">
                        <th class="single__table-head-column table__column-fixed">Model No.</th>
                        <th class="single__table-head-column">Length</th>
                        <th class="single__table-head-column">Closed Length</th>
                        <th class="single__table-head-column">Power</th>
                        <th class="single__table-head-column">Section</th>
                        <th class="single__table-head-column">Lure Weight</th>
                        <th class="single__table-head-column">Line</th>
                        <th class="single__table-head-column">Action</th>
                        <th class="single__table-head-column">Self Weight</th>
                        <th class="single__table-head-column">Price</th>
                      </tr>
                    </thead>
                    <tbody class="single__table-body">
                      <?php while(has_sub_field('one_column')): ?>
                        <tr class="single__table-body-row">
                          <td class="single__table-body-column table__column-fixed"><?php echo get_sub_field('model_no') ? get_sub_field('model_no') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('length') ? get_sub_field('length') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('closed_length') ? get_sub_field('closed_length') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('power') ? get_sub_field('power') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('section') ? get_sub_field('section') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('lure') ? get_sub_field('lure') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('line') ? get_sub_field('line') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('action') ? get_sub_field('action') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('self_weight') ? get_sub_field('self_weight') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo is_numeric(get_sub_field('price')) ? '￥'.number_format(get_sub_field('price')) : '-' ; ?></td>
                        </tr>
                      <?php endwhile; ?>
                      <?php while(has_sub_field('one_column_casting')): ?>
                        <tr class="single__table-body-row">
                          <td class="single__table-body-column table__column-fixed"><?php echo get_sub_field('model_no') ? get_sub_field('model_no') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('length') ? get_sub_field('length') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('closed_length') ? get_sub_field('closed_length') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('power') ? get_sub_field('power') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('section') ? get_sub_field('section') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('lure') ? get_sub_field('lure') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('line') ? get_sub_field('line') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('action') ? get_sub_field('action') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo get_sub_field('self_weight') ? get_sub_field('self_weight') : '-' ; ?></td>
                          <td class="single__table-body-column"><?php echo is_numeric(get_sub_field('price')) ? '￥'.number_format(get_sub_field('price')) : '-' ; ?></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <p class="single__table-note">(Price does not include tax)</p>
            </section>
          <?php endif; ?>
          <div class="section__view-more section__view-more--single">
            <a class="button button--products" href="<?php echo resolve_url(PRODUCT_SLUG); ?>"><span>PRODUCT LIST</span></a>
          </div>
        </div>
      </div>
    </div>

  </main>

<?php
get_footer();

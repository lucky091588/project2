<?php if ( $custom_query->have_posts() ) : ?>
  <div class="query<?php echo !empty($modifier) ? ' query--'.$modifier : ''; ?>">
    <ul class="query__content flex flex-wrap<?php echo !empty($filter) ? ' js-filter-content' : ''; ?>">
      <?php
        $count_new = 1;
        while($custom_query->have_posts()):
        $custom_query->the_post();

        $categories         = get_the_terms( get_the_ID(), PRODUCT_TAX_CAT );
        $main_category      = get_main_product_category($categories);
        $main_category_slug = $main_category->slug;
        $main_category_name = $main_category->name;
      ?>
      <li class="query__content-item<?php echo $count_new < 9 ? ' all '.$main_category_slug : ' '.$main_category_slug; $count_new++; ?>">
        <article class="query__article">
          <a href="<?php the_permalink(); ?>" class="query__article-link">
            <div class="query__article-eyecatch-wrapper">
              <?php if (strtotime( get_the_date('Y-m-d H:i:s') ) > strtotime('-7 days')): ?>
                <em class="query__article-tag">
                  <span>NEW</span>
                </em>
              <?php endif; ?>
              <div class="query__article-eyecatch" style="background-image: url(<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : resolve_image_uri('no-image.jpg'); ?>);"></div>
            </div>
            <?php if(!empty($heading)): ?>
              <<?php echo $heading; ?> class="query__article-title js-title-ellipsis"><?php the_title(); ?></<?php echo $heading; ?>>
            <?php else: ?>
              <h3 class="query__article-title js-title-ellipsis"><?php the_title(); ?></h3>
            <?php endif; ?>
          </a>
        </article>
      </li>
      <?php endwhile; wp_reset_query();?>
    </ul>
  </div>
<?php else:?>
  <p class="query__no-result">該当する製品はありません。</p>
<?php endif;?>



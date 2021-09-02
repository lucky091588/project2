<?php

  function recent_products_query() {

    $args = array(
      'post_type'      => PRODUCT_POST_TYPE,
      'posts_per_page' => 3,
      'order'          => 'DESC',
    );

    return new WP_Query( $args );
  }

  function product_offset() {

    $args = array(
      'post_type'      => PRODUCT_POST_TYPE,
      'posts_per_page' => 3,
      'order'          => 'DESC',
    );

    $recent_post  = new WP_Query( $args );
    $count_post   = 0;
    $queried_ids  = array();

    while($recent_post->have_posts()){
      $recent_post->the_post();

      $queried_ids[$count_post] = get_the_ID();
      $count_post++;
    }
    wp_reset_query();

    return $queried_ids;

  }

  function get_main_product_category($categories) {
    $main_category = '';

    if ( $categories && ! is_wp_error( $categories && !empty($filter)) ) {
      foreach($categories as $category) {
        if($category->parent == 0){
          $main_category = $category;
        }
      }
    }

    return $main_category;
  }

  function product_category_query($parent = 0) {
    $args = array(
      'orderby'     => 'id',
      'order'       => 'ASC',
      'parent'      => $parent
    );

    $terms        = get_terms(PRODUCT_TAX_CAT, $args);
    $count_cat    = 1;
    $queried_cats = array();

    if ( $terms && !is_wp_error( $terms ) ) {
      foreach ( $terms as $term ) {
        // to make salt category first :(
        if($count_cat == 2 && $term->term_id == 3){
          $queried_cats[0] = $term->term_id;
        }else{
          $queried_cats[$count_cat] = $term->term_id;
        }
        $count_cat++;
      }
    }
    ksort($queried_cats);

    return $queried_cats;

  }

  function product_tree_query($cat_id) {
    $data       = [];
    $categories = product_category_query($cat_id);

    foreach($categories as $j => $category) {
      $categories[$j]      = get_term_by( 'id', $category, PRODUCT_TAX_CAT );
      $data[$j]['name']    = $categories[$j]->name;
      $data[$j]['slug']    = $categories[$j]->slug;
      $data[$j]['term_id'] = $categories[$j]->term_id;

      if (count(get_term_children( $categories[$j]->term_id, PRODUCT_TAX_CAT ))) {
        $categories[$j]->children = product_category_query($categories[$j]->term_id);

        foreach ($categories[$j]->children as $k => $grandChild) {

          $categories[$j]->children[$k]     = get_term_by( 'id', $grandChild, PRODUCT_TAX_CAT );
          $data[$j]['children'][$k]['name']    = $categories[$j]->children[$k]->name;
          $data[$j]['children'][$k]['slug']    = $categories[$j]->children[$k]->slug;
          $data[$j]['children'][$k]['term_id'] = $categories[$j]->children[$k]->term_id;

          if (count(get_term_children( $categories[$j]->children[$k]->term_id, PRODUCT_TAX_CAT ))) {

            $categories[$j]->children[$k]->children = product_category_query($categories[$j]->children[$k]->term_id);

            foreach ($categories[$j]->children[$k]->children as $l => $greatGrandChild) {

              $categories[$j]->children[$k]->children[$l] = get_term_by( 'id', $greatGrandChild, PRODUCT_TAX_CAT );
              $data[$j]['children'][$k]['children'][$l]['name']    = $categories[$j]->children[$k]->children[$l]->name;
              $data[$j]['children'][$k]['children'][$l]['slug']    = $categories[$j]->children[$k]->children[$l]->slug;
              $data[$j]['children'][$k]['children'][$l]['term_id'] = $categories[$j]->children[$k]->children[$l]->term_id;

            }
          }
        }
      }
    }

    return $data;
  }

  function product_section_query($offset, $categories) {

    $post_list      = array();
    $count_post_tax = 0;

    foreach($categories as $category) {
      $args_tax = array(
        'post_type'      => PRODUCT_POST_TYPE,
        'order'          => 'DESC',
        'post__not_in'   => $offset,
        'posts_per_page' => 8,
        'tax_query'      => array(
          array(
            'taxonomy'   => PRODUCT_TAX_CAT,
            'field'      => 'term_id',
            'terms'      => $category,
          ),
        ),
      );

      $queried_tax = new WP_Query( $args_tax );

      while($queried_tax->have_posts()){
        $queried_tax->the_post();

        $post_list[$count_post_tax] = get_the_ID();
        $count_post_tax++;
      }
      wp_reset_query();

    }

    $args = array(
      'post_type'      => PRODUCT_POST_TYPE,
      'posts_per_page' => -1,
      'order'          => 'DESC',
      'post__in'       => $post_list,
    );

    return new WP_Query( $args );

  }

  function product_page_query($category, $per_page = 8) {

    $args = array(
      'post_type'      => PRODUCT_POST_TYPE,
      'order'          => 'DESC',
      'posts_per_page' => $per_page,
      'tax_query'      => array(
        array(
          'taxonomy'   => PRODUCT_TAX_CAT,
          'field'      => 'term_id',
          'terms'      => $category,
        ),
      ),
    );

    return new WP_Query( $args );

  }

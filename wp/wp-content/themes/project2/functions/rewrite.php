<?php
/**
 * ここはパーマリンク設定、リライトルールを変更する処理を記載するファイルです。
 */

add_action( "init", "lig_add_post_type_rules" );

function lig_add_post_type_rules() {

  function posts_link( $post_link, $post = 0 ) {
    if ( $post->post_type === PRODUCT_POST_TYPE ) {
      return home_url( 'product/' . $post->ID . '/' );
    } else {
      return $post_link;
    }
  }
  add_filter( 'post_type_link', 'posts_link', 1, 2 );


  function rewrite_rules( $wp_rewrite ) {
    $rules = array(
      'product/?$'                           => 'index.php?post_type=products',
      'product/([0-9]+)?$'                   => 'index.php?post_type=products&p=$matches[1]',
      'product/([^/]+)/?$'                   => 'index.php?products-cat=$matches[1]',
      'product/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?products-cat=$matches[1]&paged=$matches[2]',
    );

    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
  }
  add_action( 'generate_rewrite_rules', 'rewrite_rules' );

}

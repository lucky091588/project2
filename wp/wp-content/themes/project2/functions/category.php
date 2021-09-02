<?php
/**
 *  カテゴリの操作に関する処理
 */

/**
 * 全親カテゴリのみ取得
 *
 * @param string $category
 *
 * @return array
 */
function get_parent_categories( $category = "category" ) {
  $parent_categories = array();
  $parent_datas      = get_terms(
    $category,
    array(
      "fields" => "all",
      "get"    => "all",
      "parent" => 0
    )
  );
  if ( ! empty( $parent_datas ) ) {
    foreach ( $parent_datas as $key => $val ) {
      $parent_categories[ $val->term_id ] = $val;
    }
  }

  return $parent_categories;
}

<?php
/**
 *  定数:定数はここに全部書いてください
 *  定数名は単語毎「_」区切りで全て大文字にすること
 *  使用方法のコメントを必ず残すこと
 */

/** TOPページの投稿取得件数 */
//define("TOP_POST_LIMIT", "999");

// home url
define( 'HOME_URL', home_url() . '/' );

// テーマディレクトリまでのパス
define( 'ITEM_URL', get_stylesheet_directory_uri() . '/' );

// ノーイメージパス
define( 'NOIMAGE', ITEM_URL . 'assets/images/noimage.png' );

define( 'PRODUCT_POST_TYPE', 'products' );
define( 'PRODUCT_SLUG', 'product' );
define( 'PRODUCT_TAX_CAT', 'products-cat' );
define( 'PRODUCT_TAX_TAG', 'products-tag' );

define( 'SITE_SEO_DESCRIPTION', "Discover the wide range of salt products made in Japan. Jackson has made joyful fishing tackle one by one,with soul into them." );
define( 'ERROR_SEO_DESCRIPTION', "I'm really sorry but the page you were looking for could not be found. The page you clicked may broken or have been removed." );
define( 'PRODUCT_ARCHIVE_DESCRIPTION', "Discover the wide range of trout products made in Japan. Jackson has made joyful fishing tackle one by one,with soul into them." );


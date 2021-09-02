<?php

/**
 * 不要なメニューを削除する場合に利用します。
 */
function lig_wp_remove_menus() {
  remove_menu_page( 'edit.php?post_type=mw-wp-form' );
  remove_menu_page( 'edit.php?post_type=page' );
  remove_menu_page( 'edit.php' );
  remove_menu_page( 'upload.php' );
  remove_menu_page( 'link-manager.php' );
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'tools.php' );
  remove_menu_page( 'profile.php' );
  remove_submenu_page( 'index.php', 'update-core.php' ); // 本体更新ページ
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
}

//remove default post
function lig_wp_hide_post_menu() {
  remove_menu_page( 'edit.php' );
}

if ( ! is_super_admin() ) { // ※管理者以外のログイン時にフックする場合。
  add_action( 'admin_menu', 'lig_wp_remove_menus' );
}else{
	add_action( 'admin_menu', 'lig_wp_hide_post_menu' );
}

//remove default post
function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

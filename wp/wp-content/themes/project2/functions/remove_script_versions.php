<?php
/**
 * remove script versions
 *
 *
 */

//wp version
remove_action( 'wp_head', 'wp_generator' );

function hidden_ver( $src ) {
  if ( strpos( $src, 'ver=' ) ) {
    $src = remove_query_arg( 'ver', $src );
  }

  return $src;
}

add_filter( 'style_loader_src', 'hidden_ver', 9999 );
add_filter( 'script_loader_src', 'hidden_ver', 9999 );

//remove api.w.org tag
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
<?php

function get_current_uri() {
  $scheme = is_ssl() ? 'https' : 'http';

  return "$scheme://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}

function resolve_asset_uri( $subpath = '' ) {
  return esc_url( rtrim( get_template_directory_uri(), '/' ) . '/assets/' . ltrim( $subpath, '/' ) );
}

function resolve_url( $path = '' ) {
  return esc_url( get_home_url( null, $path ) );
}

function resolve_archive_uri( $post_type ) {
  if ( false === $url = get_post_type_archive_link( $post_type ) ) {
    throw new BadMethodCallException( "Unsupported/unarchivable post_type [$post_type]" );
  }

  return $url;
}

function resolve_image_uri( $subpath = '' ) {
  return resolve_asset_uri( 'images/' . $subpath );
}

function resolve_js_uri( $subpath = '' ) {
  return resolve_asset_uri( 'js/' . $subpath );
}

function resolve_lib_uri( $subpath = '' ) {
  return resolve_asset_uri( 'lib/' . $subpath );
}

function get_top_url() {
  return esc_url( site_url() );
}

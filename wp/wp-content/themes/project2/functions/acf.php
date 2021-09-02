<?php
// advance custom field option page
if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'  => 'Top Page',
    'menu_title'  => 'Top Page',
    'menu_slug'   => 'top-page',
    'capability'  => 'edit_themes',
    'redirect'    => false
  ));

}

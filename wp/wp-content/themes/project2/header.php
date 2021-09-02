<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php echo is_front_page() ? 'class="is-scrolled is-disable"' : ''; ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title('|'); ?></title>
  <base href="/">
  <link rel="shortcut icon" href="<?php echo resolve_image_uri('favicon.ico'); ?>">
  <link rel="apple-touch-icon-precomposed" href="<?php echo resolve_image_uri('favicon.ico'); ?>">
  <link rel="stylesheet" href="<?php echo resolve_asset_uri('css/style.css'); ?>">
  <meta name="viewport" content="width=device-width,user-scalable=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">

  <?php if(!is_single() || is_archive()): ?>
    <meta property="og:image" content="<?php echo resolve_image_uri('ogp.jpg'); ?>">
  <?php elseif(is_single() && !get_the_post_thumbnail()): ?>
    <meta property="og:image" content="<?php echo resolve_image_uri('ogp.jpg'); ?>">
  <?php endif; ?>

  <?php if(is_single() && !get_field('description')): ?>
    <meta name="description" content="<?php echo SITE_SEO_DESCRIPTION; ?>"/>
    <meta name="og:description" content="<?php echo SITE_SEO_DESCRIPTION; ?>"/>
  <?php elseif(is_single() && get_field('description')): ?>
    <meta name="description" content="<?php echo substr(get_field('description'), 0, 160); ?>"/>
    <meta name="og:description" content="<?php echo substr(get_field('description'), 0, 160); ?>"/>
  <?php elseif(is_404()): ?>
    <meta name="description" content="<?php echo ERROR_SEO_DESCRIPTION; ?>"/>
    <meta name="og:description" content="<?php echo ERROR_SEO_DESCRIPTION; ?>"/>
  <?php endif; ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102913578-1"></script>
  <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-102913578-1');
  </script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="js-body">

  <div class="l-wrapper js-wrapper<?php echo is_front_page() ? '  l-wrapper--home is-lock' : ''; ?>"> <!-- JS WRAPPER START -->
    <?php if(is_front_page()): ?>
      <div class="loader" id="js-loading">
        <div class="loader-inner">
          <p class="loader-percent">0%</p>
          <div class="loader-bar"></div>
        </div>
      </div>
    <?php endif; ?>

    <?php importPart('svg-icon/svg-icon'); ?>

    <?php
      $header_args = array();
      if(is_front_page()) {
        $header_args = array(
          'modifier' => 'home',
        );
      }
    ?>
    <?php importPart('header', $header_args); ?>

    <div class="tagline<?php echo is_front_page() ? ' tagline--home' : ''; ?>">
      <div class="l-container<?php echo is_front_page() ? ' l-container--tagline' : ''; ?>">
        <div class="tagline__wrapper">
          <p class="tagline__main">
            High-Quality Fishing Tackle <br>
            Design and Manufacturer <br>
            in Japan.
          </p>
        </div>
      </div>
    </div>


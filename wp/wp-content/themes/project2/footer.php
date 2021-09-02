<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>

      <?php
        if(!is_tax() &&
          !is_single() &&
          !is_404() &&
          $post->ID != 196 &&
          $post->ID != 201 &&
          $post->ID != 207 &&
          $post->ID != 209)
        {
          importPart('footer-contact');
        }
      ?>

      <?php
        global $breadcrumbs;
        if(!is_front_page() && !empty($breadcrumbs)) {
          importPart('breadcrumbs', $breadcrumbs);
        }
      ?>

      <?php importPart('footer'); ?>
    </div>
    <?php wp_footer(); ?>
    <?php if(is_front_page()): ?>
      <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/js/index.js" async></script>
    <?php endif; ?>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js" async></script>

  </body>
</html>

<?php
  $modifier = !empty($modifier) ? $modifier : '';
?>
<div class="breadcrumbs <?php echo $modifier; ?>">
  <div class="l-container l-container--bg">
    <ol class="breadcrumbs__wrapper">
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="<?php echo get_top_url();?>"><span>TOP</span></a>
      </li>
      <?php
        $count_bread = count($breadcrumbs);
        $count = 1;
        foreach($breadcrumbs as $crumb):
        $link  = !empty($crumb['link']) ? $crumb['link'] : '';
        $title = !empty($crumb['title']) ? $crumb['title'] : '';
      ?>
        <li class="breadcrumbs__item <?php echo ($count == $count_bread ? 'is-current' : ''); ?>">
          <a class="breadcrumbs__link" href="<?php echo $link; ?>"><span><?php echo $title; ?></span></a>
        </li>
      <?php $count++; endforeach; ?>
    </ol>
  </div>
</div>

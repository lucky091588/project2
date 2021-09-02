<?php
  if(!empty($custom_query)):
?>
  <div class="filter__sp js-filter-button-sp<?php echo !empty($modifier) ? ' filter-sp--'.$modifier : ''; ?>">
    <div class="filter__sp-placeholder js-filter-placeholder"><span>Sort Category</span><i class="filter__sp-placeholder-icon icon-arrow-down-after"></i></div>
    <ul class="filter__sp-inner">
      <?php if(!empty($all)): ?>
        <li class="filter__sp-item">
          <a class="filter__sp-link" href=".all"><span>ALL</span></a>
        </li>
      <?php endif; ?>
      <?php
        foreach($custom_query as $queried):
        $term = get_term_by('id', $queried, PRODUCT_TAX_CAT);
      ?>
        <li class="filter__sp-item">
          <a class="filter__sp-link" href="#"><span><?php echo $term->name; ?></span></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <ul class="filter js-filter-button<?php echo !empty($modifier) ? ' filter--'.$modifier : ''; ?>">
    <?php if(!empty($all)): ?>
      <li class="filter__item">
        <a class="filter__link" href=".all"><span>ALL</span></a>
      </li>
    <?php endif; ?>
    <?php
      foreach($custom_query as $queried):
      $term = get_term_by('id', $queried, PRODUCT_TAX_CAT);
    ?>
      <li class="filter__item">
        <a class="filter__link" href=".<?php echo $term->slug; ?>"><span><?php echo $term->name; ?></span></a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

import $ from 'jquery';

export default function table() {

  const $window           = $(window),
        $mainTable        = $('.js-table'),
        mainTableWrapper  = '.js-table-wrapper';

  let $parent,
      clone   = 'table__clone',
      padding = 40;

  function fixedTableLayout() {
    $('.'+clone).remove();
    if($mainTable.length && $window.width() < 769 && ($window.width() - padding) < $mainTable.width()) {
      $mainTable.each(function(){
        if(!$(this).hasClass(clone)) {
          $parent = $(this).parent(mainTableWrapper);
          $(this).clone(true).appendTo($parent).addClass(clone);
        }
      });
    }
  }
  fixedTableLayout();
  $window.resize(function(){
    fixedTableLayout();
  });

}

import { STATE_CLASS } from '../constants/index';
import $ from 'jquery';
import Isotope from 'isotope-layout';

export default function filterProducts() {

  const $filterButton         = $('.js-filter-button'),
        $filterButtonSP       = $('.js-filter-button-sp'),
        $filterPlaceholderSP  = $('.js-filter-placeholder'),
        filterContent         = '.js-filter-content';

  let filterValue,
      placeholderValue,
      $firstCategory,
      filterButtonIndex;


  if($filterButton.length){
    // init Isotope
    $firstCategory = $filterButton.find('li').eq(0).find('a');
    $firstCategory.addClass(STATE_CLASS.CURRENT);
    const $filterContent = new Isotope(filterContent, {
      filter: $firstCategory.attr('href')
    });

    $filterButton.on( 'click', 'a', function(e) {
      e.preventDefault();
      $filterButton.find('a').removeClass(STATE_CLASS.CURRENT);
      $(this).addClass(STATE_CLASS.CURRENT);
      filterValue = $(this).attr('href');
      $filterContent.arrange({
        filter: filterValue
      });
    });

    // SP functionality
    $filterPlaceholderSP.on('click', function(){
      $(this).next().slideToggle();
    });

    $filterButtonSP.on('click', function(event){
      event.stopPropagation();
    });

    $(document).click(function(){
      $filterButtonSP.find('ul').slideUp();
    });

    $filterButtonSP.on('click','a', function(e){
      filterButtonIndex = $(this).parent().index();
      placeholderValue = $(this).text();

      $filterButton.find('li').eq(filterButtonIndex).find('a').trigger('click');
      $filterPlaceholderSP.find('span').text(placeholderValue);
      $filterButtonSP.find('ul').slideUp();
      e.preventDefault();
    });

  }

}

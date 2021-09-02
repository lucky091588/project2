import { STATE_CLASS } from '../constants/index';
import $ from 'jquery';

export default function modelButton() {
  // Get the header
  const $moreSpecsButton = $(".js-specs-more-button"),
        $moreSpecs       = $(".js-specs-more");

  $moreSpecsButton.on('click',function(e){
    e.preventDefault();
    if($(this).hasClass(STATE_CLASS.CURRENT)){
      $(this).removeClass(STATE_CLASS.CURRENT);
      $(this).parent().next().slideUp();
    }else{
      $moreSpecsButton.removeClass(STATE_CLASS.CURRENT);
      $moreSpecs.slideUp();
      $(this).addClass(STATE_CLASS.CURRENT);
      $(this).parent().next().slideDown();
    }
  });
}

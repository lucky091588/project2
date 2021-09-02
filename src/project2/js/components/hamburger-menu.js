import { $window, $html, $body, STATE_CLASS } from '../constants/index';
import $ from 'jquery';


export default function hamburgerMenu() {

  const $navButton = $('#js-nav-button'),
    $navSP = $('.js-nav-sp'),
    $header = $('header');

  let scrollPos = 0,
      $wrapper = $('.js-wrapper');

  if(!$navButton) return;

  $navButton.click((e) => {
    e.preventDefault();
    if($('.'+STATE_CLASS.STICK).length){
      $html.addClass(STATE_CLASS.SCROLLED);
    } else {
      $html.removeClass(STATE_CLASS.SCROLLED);
    }
    $navSP.fadeToggle( 500 );
    $(e.currentTarget).parent().toggleClass(STATE_CLASS.ACTIVE);
    $html.toggleClass(STATE_CLASS.DISABLE);

    if($(e.currentTarget).parent().hasClass(STATE_CLASS.ACTIVE)) {
      scrollLock();
    } else {
      scrollAble();
    }
  });

  let scrollLock = () => {
    $header.addClass(STATE_CLASS.EXPAND);
    scrollPos = $window.scrollTop();
    $wrapper.css({
      top: `-${scrollPos}px`
    });
    setTimeout(function(){
      $wrapper.addClass(STATE_CLASS.LOCK);
    }, 400);
  };

  let scrollAble = () => {
    $header.removeClass(STATE_CLASS.EXPAND);
    $wrapper.removeClass(STATE_CLASS.LOCK);
    $wrapper.css({
        top: ''
    });
    $window.scrollTop(scrollPos);
  };

  $window.resize(() => {
    if($window.width() > 768) {
      $html.removeClass(STATE_CLASS.DISABLE).removeClass(STATE_CLASS.SCROLLED);
      $navButton.parent().removeClass(STATE_CLASS.ACTIVE);
      $navSP.css('display', 'none');
      $body.removeClass(STATE_CLASS.LOCK);
      $wrapper.removeClass(STATE_CLASS.LOCK);
      $header.removeClass(STATE_CLASS.EXPAND);
      $wrapper.css({
          top: ''
      });
    }
  });
}

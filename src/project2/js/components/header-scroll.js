import { STATE_CLASS } from '../constants/index';

export default function headerScroll() {
  // Get the header
  const headerHome    = document.querySelector(".js-header"),
        $headerHome   = document.querySelectorAll(".js-header"),
        $stickyHeader = document.querySelector(".js-header-pc"),
        sticky        = 60;

  if($headerHome.length){
    // When the user scrolls the page, execute myFunction
    window.onscroll = () => {scrollFunction()};

    function scrollFunction() {
      if (window.pageYOffset >= sticky) {
        headerHome.classList.add(STATE_CLASS.STICK);
      } else {
        headerHome.classList.remove(STATE_CLASS.STICK);
      }
    }
  }

  window.addEventListener('scroll', function(){
    if(window.outerWidth > 768 && window.innerWidth < 1306){
      if(headerHome.classList.contains(STATE_CLASS.STICK)){
        $stickyHeader.style.transform = 'translate3d(' + -Math.abs(window.scrollX) + 'px, 0, 0)';
      } else {
        $stickyHeader.removeAttribute('style');
      }
    } else {
      $stickyHeader.removeAttribute('style');
    }
  });

}

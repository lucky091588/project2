import { STATE_CLASS } from '../constants/index';
import $ from 'jquery';
import 'slick-carousel';

const slickHeroOption = {
  slidesToShow: 1,
  autoplay: true,
  autoplaySpeed: 6000,
  draggable: true,
  arrows: false,
  adaptiveHeight: true
};

export default function slickHero(params) {
  const $sliderContainer     = $('#js-hero-slider');
  const $sliderCount         = $('.js-hero-slider-counter');
  const $sliderPagingLink    = $('.js-slider-paging');
  let $currentSlideIndex;

  const $slickTarget = $(params.target);
  let options = {};

  if(!$slickTarget) return;

  if(typeof params.options === 'undefined') {
    options = slickHeroOption;
  } else {
    options = params.options;
  }

  $slickTarget.slick(options);

  $sliderPagingLink.click(function(e){
      e.preventDefault();
      if(!$(this).hasClass(STATE_CLASS.ACTIVE)) {
        let slideIndex = $(this).index();
        $sliderPagingLink.removeClass(STATE_CLASS.ACTIVE);
        $(this).addClass(STATE_CLASS.ACTIVE);
        $sliderContainer.slick('slickGoTo', slideIndex, false);
      }
  });

  $sliderContainer.on('beforeChange', function() {
    //an event listener that will give you chance what you want to do before changing the slide
    $sliderCount.fadeOut(300);
  })

  $sliderContainer.on('afterChange', function() {
    //an event listener that will listen if the slide already changed

    //get the slick index
    $currentSlideIndex = $(this).find('.slick-active').attr('data-slick-index');
    $sliderCount.attr('data-count',parseInt($currentSlideIndex) + 1);
    $sliderCount.fadeIn(300);
    $sliderPagingLink.removeClass(STATE_CLASS.ACTIVE).eq($currentSlideIndex).addClass(STATE_CLASS.ACTIVE);

  });
}

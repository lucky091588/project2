import { STATE_CLASS } from '../constants/index';
import $ from 'jquery';
export default function infoSlider() {
  const $infoContainer      = $('.js-slider-info'),
        $infoInnerContainer = $infoContainer.find('ol'),
        $infoInnerItem      = $infoInnerContainer.find('li'),
        $infoButton         = $('.js-info-button'),
        $heroInfoCounter    = $('.hero__info-counter span'),
        infoPrevClass       = 'js-info-prev';

  let infoContainerWidth,
      infoInnerChildCount,
      infoContainerNewWidth;


      if($infoContainer.length){

          infoContainerWidth    = $infoContainer.width();
          infoInnerChildCount   = $infoInnerItem.length;
          infoContainerNewWidth = infoInnerChildCount * infoContainerWidth;
          $infoInnerContainer.width(infoContainerNewWidth);
          $infoInnerItem.css('width', (100 / infoInnerChildCount) + '%');

          let startSlider = setInterval(function(){
            infoSlider('next');
          }, 4000);

          window.addEventListener('resize', function(){
            setTimeout(function(){
              infoContainerWidth    = $infoContainer.width();
              infoInnerChildCount   = $infoInnerItem.length;
              infoContainerNewWidth = infoInnerChildCount * infoContainerWidth;
              $infoInnerContainer.width(infoContainerNewWidth);
              $infoInnerItem.css('width', (100 / infoInnerChildCount) + '%');
            }, 0);
          });

          function infoSlider($moves) {
            if($moves === 'prev') {
              if($infoInnerContainer.find('.'+STATE_CLASS.ACTIVE).prev().length){
                $infoInnerContainer.find('.'+STATE_CLASS.ACTIVE).removeClass(STATE_CLASS.ACTIVE).prev().addClass(STATE_CLASS.ACTIVE);
              } else {
                $infoInnerContainer.find('.'+STATE_CLASS.ACTIVE).removeClass(STATE_CLASS.ACTIVE);
                $infoInnerContainer.find('li:last-child').addClass(STATE_CLASS.ACTIVE);
              }
            } else {
              if($infoInnerContainer.find('.'+STATE_CLASS.ACTIVE).next().length){
                $infoInnerContainer.find('.'+STATE_CLASS.ACTIVE).removeClass(STATE_CLASS.ACTIVE).next().addClass(STATE_CLASS.ACTIVE);
              } else {
                $infoInnerContainer.find('.'+STATE_CLASS.ACTIVE).removeClass(STATE_CLASS.ACTIVE);
                $infoInnerContainer.find('li:first-child').addClass(STATE_CLASS.ACTIVE);
              }
            }
            let position = $infoInnerContainer.find('.'+STATE_CLASS.ACTIVE).index() * infoContainerWidth;
            $infoInnerContainer.stop().animate({'left':-Math.abs(position)}, function() {
              $heroInfoCounter.text(($infoInnerContainer.find('.'+STATE_CLASS.ACTIVE).index() + 1) + '/' + infoInnerChildCount);
            });
          }

          $infoButton.click(function(e){
            clearInterval(startSlider);

            if($(this).hasClass(infoPrevClass)){
              infoSlider('prev');
            }else{
              infoSlider('next');
            }

            startSlider = setInterval(function(){
              infoSlider('next');
            }, 4000);

            e.preventDefault();
          });

      }

}

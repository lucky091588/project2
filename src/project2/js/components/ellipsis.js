import $ from 'jquery';
import 'jquery.dotdotdot';

export default function ellipsis() {

    function ellipsisGenerator($target) {
      const targetEllipsis = $($target);
      let targetHeight,
          $this;

      if($($target).length){
        targetEllipsis.each(function(){
          $this        = $(this);
          targetHeight = $this.outerHeight();
          $(this).dotdotdot({
            ellipsis: "···",
            height: targetHeight,
            truncate: "letter",
            tolerance: 2
          });
        });
      }
    }

    ellipsisGenerator('.js-title-ellipsis');

}

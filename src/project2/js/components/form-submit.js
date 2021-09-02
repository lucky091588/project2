import $ from 'jquery';

export default function formSubmit() {

  const $terms     = $('.js-form-terms');
  const $btnSubmit = $('.js-form-submit');
  if($terms.length) {
    $btnSubmit.attr('disabled','disabled');

    $terms.on('change', function(){
      if ($(this).is(':checked')) {
        $btnSubmit.removeAttr('disabled');
      }else{
        $btnSubmit.attr('disabled','disabled');
      }
    });
  }

}

import $ from 'jquery';

export default function toTop() {
    const $htmlBody = $('html, body');
    const HEADER_HEIGHT = 82;

    let $document = $(document);

    let mStopOn = () => {
        $document.on('DOMMouseScroll', preventDefault);
        $document.on('mousewheel', preventDefault);
    };

    let mStopOff = () => {
        $document.off('DOMMouseScroll', preventDefault);
        $document.off('mousewheel', preventDefault);
    };

    let preventDefault = (event) => {
        event.preventDefault();
    };

    let handleClick = (e) => {
        if (!$(e.currentTarget).hasClass('nolink')) {
            let id = $(e.currentTarget).attr('href'),
                target = $(id).offset().top;
            mStopOn();
            $htmlBody.animate({scrollTop: target - HEADER_HEIGHT}, 500, mStopOff);
            e.preventDefault();
        }
    };

    $('.js-to-top').on('click', handleClick);
}

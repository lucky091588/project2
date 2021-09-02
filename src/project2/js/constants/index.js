import $ from 'jquery';
module.exports = {
    STATE_CLASS: {
      ACTIVE: 'is-active',
      FIXED: 'is-fixed',
      OPEN: 'is-open',
      LOCK: 'is-locked',
      STICK: 'is-stick',
      COLLAPSE: 'is-collapse',
      LOCK: 'is-lock',
      DISABLE: 'is-disable',
      EXPAND: 'is-expand',
      CURRENT: 'is-current',
      SCROLLED: 'is-scrolled'
    },
    $window: $(window),
    $document: $(document),
    $htmlBody: $('html, body'),
    $html: $('html'),
    $body: $('body')
};

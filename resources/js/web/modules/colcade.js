import debounce from '../vendor/debounce';

var Colcade = (function() {

  var selectors = {
    body: 'body',
  };

  var mq = {
    sm: window.matchMedia("(max-width: 999px)"),
    md: window.matchMedia("(min-width: 1000px)"),
  };

  var _initialize = function() {
    _bind();
  };

  var _bind = function() {
    _colcade();

    $(window).resize(function(event){
      _colcade();
    });
  };

  var _colcade = debounce(function(){

    if (mq.sm.matches) {
      $('.masonry').colcade('destroy');
    }

    if (mq.md.matches) {
      $('.masonry').colcade({
        columns: '.masonry-col',
        items: '.masonry-item'
      });
    }
  }, 100);

  return {
    init: _initialize,
  };

})();

// Initialize
$(function() {
  Colcade.init();
});

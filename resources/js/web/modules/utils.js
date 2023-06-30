import LazyLoad from '../vendor/lazyload';

var Utils = (function() {
	
	// selectors
	var selectors = {
    html:     'html',
    body:     'body',
    btnTouch: '[data-touch]',
  };

  var classes = {
    active: 'is-active',
    touched: 'is-touched',
  };

  // Init
  var _initialize = function() {
    _bind();
    // check for hash
    let hash = window.location.hash;
    if (hash) {
      hash = hash.substring(1,hash.length);
      _jumpTo(hash);
    }
  };

  // Bind events
  var _bind = function() {
    $(selectors.btnTouch).on('touchstart', function(e) {
      $(this).addClass(classes.touched);
    });

    $(selectors.btnTouch).on('touchend', function(e) {
      $(this).removeClass(classes.touched);
    });

    var lazyLoadInstance = new LazyLoad();

    $(window).on('hashchange', function(e) {
      let hash = window.location.hash;
      if (hash) {
        hash = hash.substring(1,hash.length);
        _jumpTo(hash);
      }
    });

  };

  var _jumpTo = function(hash) {
    var el = document.getElementById(hash);
    el.scrollIntoView({block: "start", behavior: "auto"});
  };

  /* --------------------------------------------------------------
    * RETURN PUBLIC METHODS
    * ------------------------------------------------------------ */

  return {
    init:  _initialize,
  };
	
})();

// Initialize
$(function() {
  Utils.init();
});


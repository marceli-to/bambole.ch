var Menu = (function() {
	
	// selectors
	var selectors = {
    html:           'html',
    body:           'body',
    menu:           '.js-menu',
    menuBtn:        '.js-menu-btn',
    menuItem:       '.js-menu-item'
	};

  // css classes
  var classes = {
    active:   'is-active',
    visible:  'is-visible',
    hidden:   'is-hidden',
    open:     'is-open',
    hasMenu:  'has-menu',
  };

  // Init
  var _initialize = function() {
    _bind();
  };

  // Bind events
  var _bind = function() {
    $(selectors.body).on('click', selectors.menuBtn, function(){
      _toggle($(this));
    });
    $(selectors.body).on('click', selectors.menuItem, function(e){
      e.preventDefault();
      _jumpTo($(this));
    });

    $(window).on('hashchange', function(e) {
      let hash = window.location.hash.substr(1);
      _jumpTo(hash);
  } );
  };

  var _toggle = function() {
    $(selectors.menu).toggleClass(classes.visible);
    $(selectors.menuBtn).toggleClass(classes.active);
  };

  var _hide = function() {
    $(selectors.menu).removeClass(classes.visible);
    $(selectors.menuBtn).removeClass(classes.active);
  };

  var _jumpTo = function(hash) {
    var el = document.getElementById(hash);
    _hide();
    el.scrollIntoView({block: "end", behavior: "smooth"});
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
  Menu.init();
});


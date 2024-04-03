/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/javascript/countto.js":
/*!***********************************!*\
  !*** ./src/javascript/countto.js ***!
  \***********************************/
/***/ ((module, exports, __webpack_require__) => {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
/* Copyright (c) 2012-2014 Matt Huggins

-----------------------------------------------------------------------*/
(function (factory) {
  if (true) {
    // AMD
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "jquery")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
})(function ($) {
  var CountTo = function CountTo(element, options) {
    this.$element = $(element);
    this.options = $.extend({}, CountTo.DEFAULTS, this.dataOptions(), options);
    this.init();
  };
  CountTo.DEFAULTS = {
    from: 0,
    // the number the element should start at
    to: 0,
    // the number the element should end at
    speed: 1000,
    // how long it should take to count between the target numbers
    refreshInterval: 100,
    // how often the element should be updated
    decimals: 0,
    // the number of decimal places to show
    formatter: formatter,
    // handler for formatting the value before rendering
    onUpdate: null,
    // callback method for every time the element is updated
    onComplete: null // callback method for when the element finishes updating
  };
  CountTo.prototype.init = function () {
    this.value = this.options.from;
    this.loops = Math.ceil(this.options.speed / this.options.refreshInterval);
    this.loopCount = 0;
    this.increment = (this.options.to - this.options.from) / this.loops;
  };
  CountTo.prototype.dataOptions = function () {
    var options = {
      from: this.$element.data('from'),
      to: this.$element.data('to'),
      speed: this.$element.data('speed'),
      refreshInterval: this.$element.data('refresh-interval'),
      decimals: this.$element.data('decimals')
    };
    var keys = Object.keys(options);
    for (var i in keys) {
      var key = keys[i];
      if (typeof options[key] === 'undefined') {
        delete options[key];
      }
    }
    return options;
  };
  CountTo.prototype.update = function () {
    this.value += this.increment;
    this.loopCount++;
    this.render();
    if (typeof this.options.onUpdate == 'function') {
      this.options.onUpdate.call(this.$element, this.value);
    }
    if (this.loopCount >= this.loops) {
      clearInterval(this.interval);
      this.value = this.options.to;
      if (typeof this.options.onComplete == 'function') {
        this.options.onComplete.call(this.$element, this.value);
      }
    }
  };
  CountTo.prototype.render = function () {
    var formattedValue = this.options.formatter.call(this.$element, this.value, this.options);
    this.$element.text(formattedValue);
  };
  CountTo.prototype.restart = function () {
    this.stop();
    this.init();
    this.start();
  };
  CountTo.prototype.start = function () {
    this.stop();
    this.render();
    this.interval = setInterval(this.update.bind(this), this.options.refreshInterval);
  };
  CountTo.prototype.stop = function () {
    if (this.interval) {
      clearInterval(this.interval);
    }
  };
  CountTo.prototype.toggle = function () {
    if (this.interval) {
      this.stop();
    } else {
      this.start();
    }
  };
  function formatter(value, options) {
    return value.toFixed(options.decimals);
  }
  $.fn.countTo = function (option) {
    return this.each(function () {
      var $this = $(this);
      var data = $this.data('countTo');
      var init = !data || _typeof(option) === 'object';
      var options = _typeof(option) === 'object' ? option : {};
      var method = typeof option === 'string' ? option : 'start';
      if (init) {
        if (data) data.stop();
        $this.data('countTo', data = new CountTo(this, options));
      }
      data[method].call(data);
    });
  };
});

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ ((module) => {

"use strict";
module.exports = jQuery;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module used 'module' so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./src/javascript/countto.js");
/******/ 	
/******/ })()
;
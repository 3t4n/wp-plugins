/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/js/newsticker.js":
/*!*************************************!*\
  !*** ./assets/src/js/newsticker.js ***!
  \*************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _css_newsticker_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/newsticker.css */ \"./assets/src/css/newsticker.css\");\n// Styles\n\n\n(function ($) {\n  'use strict';\n  /**\r\n   * All of the code for your public-facing JavaScript source\r\n   * should reside in this file.\r\n   *\r\n   * Note: It has been assumed you will write jQuery code here, so the\r\n   * $ function reference has been prepared for usage within the scope\r\n   * of this function.\r\n   *\r\n   * This enables you to define handlers, for when the DOM is ready:\r\n   *\r\n   * $(function() {\r\n   *\r\n   * });\r\n   *\r\n   * When the window is loaded:\r\n   *\r\n   * $( window ).load(function() {\r\n   *\r\n   * });\r\n   *\r\n   * ...and/or other possibilities.\r\n   *\r\n   * Ideally, it is not considered best practise to attach more than a\r\n   * single DOM-ready or window-load handler for a particular page.\r\n   * Although scripts in the WordPress core, Plugins and Themes may be\r\n   * practising this, we should strive to set a better example in our own work.\r\n   */\n\n  var $widgetNewsTicker = function $widgetNewsTicker($scope, $) {\n    var $wid = $scope.data('id'),\n        $wclass = 'elementor-element-' + $wid;\n    $('.' + $wclass + ' .aarambha-kits-block-news-ticker-container').each(function (index, element) {\n      var $container = $(this),\n          $settings = $container.data('settings'),\n          $holder = $container.find('.aarambha-kits-news-ticker-wrap .aarambha-kits-posts-list');\n      var $sliderAttrs = {\n        row_height: 30,\n        max_rows: 1,\n        direction: 'up',\n        autostart: 1,\n        pauseOnHover: 1\n      }; // Delay\n\n      if ($settings.delay) {\n        $sliderAttrs.duration = $settings.delay;\n      } // Speed\n\n\n      if ($settings.speed) {\n        $sliderAttrs.speed = $settings.speed;\n      }\n\n      $holder.newsTicker($sliderAttrs);\n    });\n  }; // Run this code under Elementor.\n\n\n  $(window).on('elementor/frontend/init', function () {\n    elementorFrontend.hooks.addAction('frontend/element_ready/aarambha-kits-block-news-ticker.default', $widgetNewsTicker); // Hero Slider\n  });\n})(jQuery);\n\n//# sourceURL=webpack://aarambha-kits/./assets/src/js/newsticker.js?");

/***/ }),

/***/ "./assets/src/css/newsticker.css":
/*!***************************************!*\
  !*** ./assets/src/css/newsticker.css ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://aarambha-kits/./assets/src/css/newsticker.css?");

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
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/src/js/newsticker.js");
/******/ 	
/******/ })()
;
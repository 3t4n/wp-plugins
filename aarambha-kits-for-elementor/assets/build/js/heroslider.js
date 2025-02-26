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

/***/ "./assets/src/js/heroslider.js":
/*!*************************************!*\
  !*** ./assets/src/js/heroslider.js ***!
  \*************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _css_heroslider_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/heroslider.css */ \"./assets/src/css/heroslider.css\");\n// Styles\n\n\n(function ($) {\n  'use strict';\n  /**\r\n   * All of the code for your public-facing JavaScript source\r\n   * should reside in this file.\r\n   *\r\n   * Note: It has been assumed you will write jQuery code here, so the\r\n   * $ function reference has been prepared for usage within the scope\r\n   * of this function.\r\n   *\r\n   * This enables you to define handlers, for when the DOM is ready:\r\n   *\r\n   * $(function() {\r\n   *\r\n   * });\r\n   *\r\n   * When the window is loaded:\r\n   *\r\n   * $( window ).load(function() {\r\n   *\r\n   * });\r\n   *\r\n   * ...and/or other possibilities.\r\n   *\r\n   * Ideally, it is not considered best practise to attach more than a\r\n   * single DOM-ready or window-load handler for a particular page.\r\n   * Although scripts in the WordPress core, Plugins and Themes may be\r\n   * practising this, we should strive to set a better example in our own work.\r\n   */\n\n  var $widgetHeroSlider = function $widgetHeroSlider($scope, $) {\n    var $wid = $scope.data('id'),\n        $wclass = 'elementor-element-' + $wid;\n    $('.' + $wclass + ' .aarambha-kits-hero-slider-container').each(function (index, element) {\n      var $container = $(this),\n          $settings = $container.data('settings');\n      var $HeroSwiperOptions = {\n        speed: $settings.speed,\n        effect: $settings.effect,\n        crossFade: true\n      }; // Enable Autoplay\n\n      if ($settings.autoplay) {\n        $HeroSwiperOptions.autoplay = {\n          delay: $settings.delay,\n          disableOnInteraction: false\n        };\n      } // Enable Infinite Loop\n\n\n      if ($settings.loop) {\n        $HeroSwiperOptions.loop = true;\n      } // Enable navigation\n\n\n      if ($settings.navigation) {\n        $HeroSwiperOptions.navigation = {\n          prevEl: '.aarambha-kits-hero-slider-container .hero-swiper-button-prev',\n          nextEl: '.aarambha-kits-hero-slider-container .hero-swiper-button-next'\n        };\n      } // Enable pagination\n\n\n      if ($settings.pagination) {\n        $HeroSwiperOptions.pagination = {\n          el: '.aarambha-kits-hero-slider-container .swiper-pagination',\n          type: 'bullets',\n          clickable: true\n        };\n      }\n\n      var $HeroSwiper = new Swiper('.' + $wclass + ' .aarambha-kits-hero-slider-container .swiper-container', $HeroSwiperOptions); // Pause On Hover\n\n      if ($settings.pause === true) {\n        $('.' + $wclass + ' .aarambha-kits-hero-slider-container .swiper-container').mouseenter(function () {\n          $HeroSwiper.autoplay.stop();\n        });\n        $('.' + $wclass + ' .aarambha-kits-hero-slider-container .swiper-container').mouseleave(function () {\n          $HeroSwiper.autoplay.start();\n        });\n      }\n    });\n  }; // Run this code under Elementor.\n\n\n  $(window).on('elementor/frontend/init', function () {\n    elementorFrontend.hooks.addAction('frontend/element_ready/aarambha-kits-block-hero-slider.default', $widgetHeroSlider); // Hero Slider\n  });\n})(jQuery);\n\n//# sourceURL=webpack://aarambha-kits/./assets/src/js/heroslider.js?");

/***/ }),

/***/ "./assets/src/css/heroslider.css":
/*!***************************************!*\
  !*** ./assets/src/css/heroslider.css ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://aarambha-kits/./assets/src/css/heroslider.css?");

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
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/src/js/heroslider.js");
/******/ 	
/******/ })()
;
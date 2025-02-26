/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/editor.js":
/*!***********************!*\
  !*** ./src/editor.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _japaneseloremblock__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./japaneseloremblock */ "./src/japaneseloremblock/index.js");


/***/ }),

/***/ "./src/japaneseloremblock/data.js":
/*!****************************************!*\
  !*** ./src/japaneseloremblock/data.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "blurb": () => /* binding */ blurb
/* harmony export */ });
var blurb = {
  gogh: 'フィンセント・ヴィレム・ファン・ゴッホ（Vincent Willem van Gogh、1853年3月30日 – 1890年7月29日）は、オランダのポスト印象派の画家。主要作品の多くは1886年以降のフランス居住時代、特にアルル時代（1888年 – 1889年5月）とサン＝レミでの療養時代（1889年5月 – 1890年5月）に制作された。感情の率直な表現、大胆な色使いで知られ、ポスト印象派を代表する画家である。フォーヴィスムやドイツ表現主義など、20世紀の美術にも大きな影響を及ぼした。なお、オランダ人名のファン (van) はミドルネームではなく姓の一部であるために省略しない。英語の読みでヴィンセント・ヴァン・ゴッホ（実際には「ホ」は発音されたとしても非常に弱い。）'
};


/***/ }),

/***/ "./src/japaneseloremblock/index.js":
/*!*****************************************!*\
  !*** ./src/japaneseloremblock/index.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles.editor.scss */ "./src/japaneseloremblock/styles.editor.scss");
/* harmony import */ var _data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./data */ "./src/japaneseloremblock/data.js");


var registerBlockType = wp.blocks.registerBlockType;
var _n = wp.i18n._n;
var RichText = wp.editor.RichText;
var defaultBlurb = _data__WEBPACK_IMPORTED_MODULE_1__.blurb.gogh;
registerBlockType('japanese-lorem-block/japaneseloremblock', {
  title: _n('Japanese Lorem Block', 'japanese-lorem-block'),
  description: _n('Japanese lorem text placeholder', 'japanese-lorem-block'),
  category: 'common',
  icon: wp.element.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    fill: "none",
    viewBox: "0 0 24 24",
    stroke: "currentColor"
  }, wp.element.createElement("path", {
    "stroke-linecap": "round",
    "stroke-linejoin": "round",
    "stroke-width": "2",
    d: "M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"
  })),
  keywords: [_n('Placeholder', 'japanese-lorem-block'), _n('Japanese', 'japanese-lorem-block'), _n('Dummy Text', 'japanese-lorem-block')],
  attributes: {
    content: {
      type: 'string',
      source: 'html',
      selector: 'p',
      "default": defaultBlurb
    }
  },
  edit: function edit(_ref) {
    var className = _ref.className,
        attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var content = attributes.content;

    var onChangeContent = function onChangeContent(content) {
      setAttributes({
        content: content
      });
    };

    return wp.element.createElement(RichText, {
      tagName: "p",
      className: className,
      formattingControls: ['bold'],
      onChange: onChangeContent,
      value: content
    });
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    return wp.element.createElement(RichText.Content, {
      tagName: "p",
      value: attributes.content
    });
  }
});

/***/ }),

/***/ "./src/japaneseloremblock/styles.editor.scss":
/*!***************************************************!*\
  !*** ./src/japaneseloremblock/styles.editor.scss ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
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
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => Object.prototype.hasOwnProperty.call(obj, prop)
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	// startup
/******/ 	// Load entry module
/******/ 	__webpack_require__("./src/editor.js");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;
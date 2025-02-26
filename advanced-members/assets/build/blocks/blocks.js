/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/blocks/form/edit.js":
/*!*********************************!*\
  !*** ./src/blocks/form/edit.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_6__);






// import { compose } from "@wordpress/compose";


// import withSetAttributes from '../../hoc/withSetAttributes';

const formEdit = props => {
  const {
    attributes,
    setAttributes,
    clientId,
    className
  } = props;
  const {
    type,
    form,
    preForm,
    hash,
    title,
    output,
    blockId
  } = attributes;
  const formOptions = e => {
      const t = [];
      if (typeof e === 'object') {
        Object.entries(e).map(([a, l]) => t.push({
          value: a,
          label: l.title
        }));
      } else {
        for (const [a, l] of e) t.push({
          value: a,
          label: l.title
        });
      }
      return t;
    },
    editURL = id => {
      const t = ajaxurl.replace(/\/admin-ajax\.php$/, "/post.php");
      return (0, _wordpress_url__WEBPACK_IMPORTED_MODULE_6__.addQueryArgs)(t, {
        post: id,
        action: "edit"
      });
    };
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)({});
  const forms = formOptions(amemBlocks.forms);
  const preForms = formOptions(amemBlocks.preForms);
  const formSelect = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Select Form", "advanced-members"),
    value: form == "0" ? preForm : form,
    onChange: value => {
      const atts = amemBlocks.forms[value] ? amemBlocks.forms[value] : amemBlocks.preForms[value];
      setAttributes(atts);
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: ""
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("\u2013 Select a Form \u2013", "advanced-members")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("optgroup", {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Login / Registration", "advanced-members")
  }, forms.map((option, index) => {
    const key = option.id || `${option.label}-${option.value}-${index}`;
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
      key: key,
      value: option.value,
      disabled: option.disabled,
      hidden: option.hidden
    }, option.label);
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("optgroup", {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Predefined Forms", "advanced-members")
  }, preForms.map((option, index) => {
    const key = option.id || `${option.label}-${option.value}-${index}`;
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
      key: key,
      value: option.value,
      disabled: option.disabled,
      hidden: option.hidden
    }, option.label);
  })));
  const settingsPanel = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
    key: "setting"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Advanced Members for ACF Form", "advanced-members")
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Select Form", "advanced-members"),
    value: form == "0" ? preForm : form,
    onChange: value => {
      const atts = amemBlocks.forms[value] ? amemBlocks.forms[value] : amemBlocks.preForms[value];
      setAttributes(atts);
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: ""
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("\u2013 Select a Form \u2013", "advanced-members")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("optgroup", {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Login / Registration", "advanced-members")
  }, forms.map((option, index) => {
    const key = option.id || `${option.label}-${option.value}-${index}`;
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
      key: key,
      value: option.value,
      disabled: option.disabled,
      hidden: option.hidden
    }, option.label);
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("optgroup", {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Predefined Forms", "advanced-members")
  }, preForms.map((option, index) => {
    const key = option.id || `${option.label}-${option.value}-${index}`;
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
      key: key,
      value: option.value,
      disabled: option.disabled,
      hidden: option.hidden
    }, option.label);
  })))));
  const renderBlock = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "acf-block-component acf-block-body amem-block-component amem-block-body"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "acf-block-preview amem-block-preview"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "amem-block-description"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)('Adv. Members Form', 'advanced-members')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "amem-block-form-name"
  }, title), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "amem-block-form-select"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, formSelect)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "amem-block-subtitle"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)('Preview page to view form', 'advanced-members'))))));
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, settingsPanel, renderBlock);
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (formEdit);

/***/ }),

/***/ "./src/blocks/form/index.js":
/*!**********************************!*\
  !*** ./src/blocks/form/index.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./block.json */ "./src/blocks/form/block.json");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./edit */ "./src/blocks/form/edit.js");

/**
 * WordPress dependencies
 */




// import { useState } from '@wordpress/element';

// import apiFetch from '@wordpress/api-fetch';

/**
 * Internal dependencies
 */


const attributes = Object.assign({}, _block_json__WEBPACK_IMPORTED_MODULE_6__.attributes);
const toShortcode = e => {
  if (e.hash && e.hash.indexOf('[') == 0) return e.hash;
  let t = "[advanced-members]";
  return e.hash ? t = t.replace(/\]$/, ` form="${e.hash}"]`) : e.form && (t = t.replace(/\]$/, ` form="${e.form}"]`)), e.title && (t = t.replace(/\]$/, ` title="${e.title}"]`)), t;
};
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)('amem/form', {
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Adv. Members Form', 'advanced-members'),
  // icon: 'people',
  icon: {
    src: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      height: "100%",
      strokeMiterlimit: "10",
      version: "1.1",
      viewBox: "0 0 113 113",
      width: "100%",
      xmlSpace: "preserve",
      xmlns: "http://www.w3.org/2000/svg",
      xmlnsXlink: "http://www.w3.org/1999/xlink"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M56.25 0C25.169 0 0 25.169 0 56.25C0 87.279 25.169 112.5 56.25 112.5C87.279 112.5 112.5 87.279 112.5 56.25C112.5 25.169 87.279 0 56.25 0ZM56.25 7.84375C82.936 7.84375 104.656 29.512 104.656 56.25C104.656 82.936 82.936 104.656 56.25 104.656C29.512 104.656 7.84375 82.936 7.84375 56.25C7.84375 29.512 29.512 7.84375 56.25 7.84375ZM40.3125 68.0625C39.3051 68.1214 38.3315 68.564 37.625 69.375C36.16 70.944 36.3155 73.462 37.9375 74.875L40.5312 71.9062L40.5625 71.9375L37.9375 74.875C37.9375 74.875 38 74.8855 38 74.9375C38.053 74.9905 38.145 75.02 38.25 75.125C38.459 75.282 38.779 75.561 39.25 75.875C40.087 76.451 41.2738 77.1837 42.8438 77.9688C45.9307 79.4338 50.4428 80.9375 56.0938 80.9375L56.0938 80.7812C56.1711 80.9362 56.25 81.0937 56.25 81.0938C61.849 81.0938 66.361 79.5795 69.5 78.0625C71.018 77.2775 72.2568 76.5655 73.0938 75.9375C73.5117 75.6235 73.8317 75.334 74.0938 75.125C74.1988 75.02 74.2908 74.927 74.3438 74.875C74.3438 74.823 74.4062 74.7813 74.4062 74.7812L74.5 74.875L74.5625 74.9375C76.1325 73.4725 76.288 70.997 74.875 69.375C73.4529 67.8005 71.1206 67.6561 69.5 68.9375C69.4662 68.8993 69.1875 68.5937 69.1875 68.5938L69.1875 68.375C69.1875 68.322 69.125 68.375 69.125 68.375C69.073 68.375 69.0208 68.3855 68.9688 68.4375C68.8118 68.4895 68.6057 68.666 68.3438 68.875C67.7687 69.242 66.8698 69.7365 65.7188 70.3125C63.4167 71.4105 60.061 72.5313 55.875 72.5312L55.875 73.0625C51.7549 73.0192 48.5074 71.9215 46.25 70.8438C45.099 70.2677 44.2 69.7628 43.625 69.3438C43.3738 69.1766 43.242 69.0694 43.125 68.9688L43.1562 69.0625C43.1381 69.0461 43.1122 69.0473 43.0938 69.0312L43.125 68.9688C43.0957 68.9436 43.0208 68.896 43 68.875C42.895 68.823 42.8958 68.75 42.8438 68.75L42.8125 68.6875L42.7188 68.8125C41.9842 68.3084 41.1566 68.0132 40.3125 68.0625Z",
      fill: "#28303f",
      fillRule: "nonzero",
      opacity: "1",
      stroke: "none"
    }))))
  },
  attributes,
  edit: _edit__WEBPACK_IMPORTED_MODULE_7__["default"],
  save: ({
    attributes
  }) => {
    const shortCode = toShortcode(attributes);
    const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.useBlockProps.save();
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      ...blockProps
    }, shortCode);
  }
});

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = window["React"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/url":
/*!*****************************!*\
  !*** external ["wp","url"] ***!
  \*****************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["url"];

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ ((module, exports) => {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
	Copyright (c) 2018 Jed Watson.
	Licensed under the MIT License (MIT), see
	http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames () {
		var classes = '';

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (arg) {
				classes = appendClass(classes, parseValue(arg));
			}
		}

		return classes;
	}

	function parseValue (arg) {
		if (typeof arg === 'string' || typeof arg === 'number') {
			return arg;
		}

		if (typeof arg !== 'object') {
			return '';
		}

		if (Array.isArray(arg)) {
			return classNames.apply(null, arg);
		}

		if (arg.toString !== Object.prototype.toString && !arg.toString.toString().includes('[native code]')) {
			return arg.toString();
		}

		var classes = '';

		for (var key in arg) {
			if (hasOwn.call(arg, key) && arg[key]) {
				classes = appendClass(classes, key);
			}
		}

		return classes;
	}

	function appendClass (value, newClass) {
		if (!newClass) {
			return value;
		}
	
		if (value) {
			return value + ' ' + newClass;
		}
	
		return value + newClass;
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./src/blocks/form/block.json":
/*!************************************!*\
  !*** ./src/blocks/form/block.json ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"amem/form","title":"Adv. Members Form","category":"text","description":"Add Advanced Members for ACF Form to your content.","textdomain":"advanced-members","attributes":{"type":{"enum":["","form","preForm"],"default":"form"},"form":{"type":"number","default":0},"preForm":{"type":"string","default":""},"hash":{"type":"string","default":""},"title":{"type":"string","default":""}},"usesContext":["form","type","hasy"],"supports":{"className":true,"customClassName":true,"anchor":true,"html":true},"_supports":{"align":["wide","full"],"anchor":false,"className":false,"color":{"gradients":true,"link":true,"__experimentalDefaultControls":{"background":true,"text":true}},"spacing":{"margin":true,"padding":true,"__experimentalDefaultControls":{"margin":false,"padding":false}},"typography":{"fontSize":true,"lineHeight":true,"__experimentalFontFamily":true,"__experimentalFontStyle":true,"__experimentalFontWeight":true,"__experimentalLetterSpacing":true,"__experimentalTextTransform":true,"__experimentalTextDecoration":true,"__experimentalWritingMode":true,"__experimentalDefaultControls":{"fontSize":true}},"__unstablePasteTextInline":true,"__experimentalSlashInserter":true,"interactivity":{"clientNavigation":true}},"style":"wp-block-amem-form"}');

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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
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
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be in strict mode.
(() => {
"use strict";
/*!***********************!*\
  !*** ./src/blocks.js ***!
  \***********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/form */ "./src/blocks/form/index.js");
/**
 * GenerateBlocks
 */


})();

/******/ })()
;
//# sourceMappingURL=blocks.js.map
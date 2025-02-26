/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ 184:
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
	var nativeCodeString = '[native code]';

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString !== Object.prototype.toString && !arg.toString.toString().includes('[native code]')) {
					classes.push(arg.toString());
					continue;
				}

				for (var key in arg) {
					if (hasOwn.call(arg, key) && arg[key]) {
						classes.push(key);
					}
				}
			}
		}

		return classes.join(' ');
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";

;// CONCATENATED MODULE: external ["wp","blocks"]
const external_wp_blocks_namespaceObject = window["wp"]["blocks"];
;// CONCATENATED MODULE: ./plugin/blocks/bibliography/block.json
const block_namespaceObject = JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"lh/bibliography","title":"Bibliography","description":"Integrate a comprehensive bibliography into your narrative.","textdomain":"citations","category":"design","supports":{"align":["wide"],"multiple":false,"color":{"background":true,"text":true}},"attributes":{},"example":{},"editorScript":"citations-blocks","style":"citations"}');
;// CONCATENATED MODULE: external ["wp","element"]
const external_wp_element_namespaceObject = window["wp"]["element"];
;// CONCATENATED MODULE: external "React"
const external_React_namespaceObject = window["React"];
var external_React_default = /*#__PURE__*/__webpack_require__.n(external_React_namespaceObject);
;// CONCATENATED MODULE: external ["wp","blockEditor"]
const external_wp_blockEditor_namespaceObject = window["wp"]["blockEditor"];
;// CONCATENATED MODULE: external ["wp","data"]
const external_wp_data_namespaceObject = window["wp"]["data"];
// EXTERNAL MODULE: ./node_modules/classnames/index.js
var classnames = __webpack_require__(184);
var classnames_default = /*#__PURE__*/__webpack_require__.n(classnames);
;// CONCATENATED MODULE: ./plugin/blocks/bibliography/edit.js


/**
 * WordPress dependencies.
 */



/**
 * External dependencies.
 */

const Edit = props => {
  const {
    className,
    postContent
  } = props;

  // An array of the citations in the post content.
  const citations = [];

  // Parse the post content into a document tree.
  const parsed = new window.DOMParser().parseFromString(postContent, 'text/html');

  // Find all elements with the class 'js--wpm-format-cite'.
  const rawCitations = parsed.querySelectorAll('.js--wpm-format-cite');
  rawCitations.forEach(citation => {
    // Get the citation from the 'data-cite-text' attribute.
    const citationText = citation.getAttribute('data-cite-text');
    citations.push(citationText);
  });

  /* Element classNames. */
  const blockClassNames = classnames_default()(className, 'lh-bibliography-block', {});
  const blockProps = {
    ...(0,external_wp_blockEditor_namespaceObject.useBlockProps)({
      className: blockClassNames
    })
  };
  return /*#__PURE__*/external_React_default().createElement("div", blockProps, /*#__PURE__*/external_React_default().createElement("ul", {
    className: "lh-bibliography-block--citations"
  }, citations.map((citation, index) => /*#__PURE__*/external_React_default().createElement("li", {
    key: `citation-${index}`,
    className: "lh-bibliography-block--citation"
  }, /*#__PURE__*/external_React_default().createElement("a", {
    href: `#citation-${index + 1}`,
    className: "lh-bibliography-block--citation-link"
  }, "[", index + 1, "]"), /*#__PURE__*/external_React_default().createElement("span", {
    className: "lh-bibliography-block--citation-text"
  }, citation)))));
};
/* harmony default export */ const edit = ((0,external_wp_data_namespaceObject.withSelect)(select => {
  return {
    postContent: select('core/editor').getEditedPostContent()
  };
})(Edit));
;// CONCATENATED MODULE: ./plugin/img/icons/citation.svg
var _path, _path2, _path3, _path4;
function _extends() { _extends = Object.assign ? Object.assign.bind() : function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

var SvgCitation = function SvgCitation(props) {
  return /*#__PURE__*/external_React_namespaceObject.createElement("svg", _extends({
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 1200 1200"
  }, props), _path || (_path = /*#__PURE__*/external_React_namespaceObject.createElement("path", {
    d: "M788 975H188c-21 0-38-17-38-37v-75a38 38 0 0 0-75 0v75c0 62 50 112 113 112h600a38 38 0 0 0 0-75z"
  })), _path2 || (_path2 = /*#__PURE__*/external_React_namespaceObject.createElement("path", {
    d: "M675 863v150a38 38 0 0 0 75 0V863a38 38 0 0 0-75 0zM225 188v675a38 38 0 0 0 75 0V188a38 38 0 0 0-75 0z"
  })), _path3 || (_path3 = /*#__PURE__*/external_React_namespaceObject.createElement("path", {
    d: "M750 825V674a38 38 0 0 1 75 0v189c0 20-17 37-37 37H113c-21 0-38-17-38-37V263c0-63 50-113 113-113h225a38 38 0 0 1 0 75H188c-21 0-38 17-38 38v562zm139-337h-27c-20 0-37-17-37-38V300c0-21 17-37 37-37h225c21 0 38 16 38 37v153c-1 96-48 135-86 174-7 7-17 11-27 11H900a38 38 0 0 1-36-47l25-103zm161-40V337H900v75h38a38 38 0 0 1 36 47l-26 104h49c25-25 53-53 53-113v-2z"
  })), _path4 || (_path4 = /*#__PURE__*/external_React_namespaceObject.createElement("path", {
    d: "M514 488h-27c-20 0-37-17-37-38V300c0-21 17-37 37-37h225c21 0 38 16 38 37v153c-1 96-48 135-86 174-7 7-17 11-27 11H525a38 38 0 0 1-36-47l25-103zm161-40V337H525v75h38a38 38 0 0 1 36 47l-26 104h49c25-25 53-53 53-113v-2z"
  })));
};
/* harmony default export */ const citation = (SvgCitation);
;// CONCATENATED MODULE: ./plugin/blocks/bibliography/index.js
/**
 * A dynamic block for the Gutenberg editor. The edit.js file is used to
 * define the editor interface of the block. The rendering of the
 * frontend component happens in PHP.
 */

/**
 * WordPress dependencies
 */


/**
 * The block metadata.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/
 */


/**
 * The block edit function.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 */


const settings = {
  edit: edit,
  icon: citation,
  /**
   * The save function returns null because the output is generated
   * within php.
   *
   * @return {null} The save function returns null.
   */
  save: () => null
};

/**
 * Actually register the block.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-registration/
 */
(0,external_wp_blocks_namespaceObject.registerBlockType)(block_namespaceObject, settings);
;// CONCATENATED MODULE: ./plugin/admin/src/js/blocks.js

})();

/******/ })()
;
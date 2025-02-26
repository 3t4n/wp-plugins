/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

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
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!*************************************************!*\
  !*** ./src/block-pwd-adjustment-disable-row.js ***!
  \*************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_0__);
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * External Dependencies
 */
 //npm install classnames --save

/* https://jeffreycarandang.com/extending-gutenberg-core-blocks-with-custom-attributes-and-controls/ */

/**
 * WordPress Dependencies
 */
var __ = wp.i18n.__;
var addFilter = wp.hooks.addFilter;
var Fragment = wp.element.Fragment;
var InspectorAdvancedControls = wp.blockEditor.InspectorAdvancedControls;
var createHigherOrderComponent = wp.compose.createHigherOrderComponent;
var ToggleControl = wp.components.ToggleControl;

//restrict to specific block names
var allowedBlocks = ['core/columns'];

/**
 * Add custom attribute for disabling rows.
 *
 * @param {Object} settings Settings for the block.
 *
 * @return {Object} settings Modified settings.
 */
function addAttributes(settings) {
  //check if object exists for old Gutenberg version compatibility
  //add allowedBlocks restriction
  if (typeof settings.attributes !== 'undefined' && allowedBlocks.includes(settings.name)) {
    settings.attributes = Object.assign(settings.attributes, {
      showRow: {
        type: 'boolean',
        "default": true
      }
    });
  }
  return settings;
}

/**
 * Add row disabling controls on Advanced Block Panel.
 *
 * @param {function} BlockEdit Block edit component.
 *
 * @return {function} BlockEdit Modified block edit component.
 */
var withAdvancedControls = createHigherOrderComponent(function (BlockEdit) {
  return function (props) {
    var name = props.name,
      attributes = props.attributes,
      setAttributes = props.setAttributes,
      isSelected = props.isSelected;
    var showRow = attributes.showRow;
    return /*#__PURE__*/React.createElement(Fragment, null, /*#__PURE__*/React.createElement(BlockEdit, props), isSelected && allowedBlocks.includes(name) && /*#__PURE__*/React.createElement(InspectorAdvancedControls, null, /*#__PURE__*/React.createElement(ToggleControl, {
      label: __('Show Row On Website'),
      checked: !!showRow,
      onChange: function onChange() {
        return setAttributes({
          showRow: !showRow
        });
      },
      help: !!showRow ? __('Showing on website.') : __('Removed from website.'),
      __nextHasNoMarginBottom: true
    })));
  };
}, 'withAdvancedControls');

/* Apply the adjustment in the editor too */ // https://wordpress.stackexchange.com/questions/324091/
var withRowDisabled = createHigherOrderComponent(function (BlockListBlock) {
  return function (props) {
    if (allowedBlocks.includes(props.name)) {
      if (props.attributes.showRow) {
        return /*#__PURE__*/React.createElement(BlockListBlock, props);
      } else {
        //return <BlockListBlock { ...props } className={ 'row-disabled' } />;
        return /*#__PURE__*/React.createElement(BlockListBlock, _extends({}, props, {
          className: classnames__WEBPACK_IMPORTED_MODULE_0___default()(props.className, 'row-disabled')
        }));
      }
    } else {
      return /*#__PURE__*/React.createElement(BlockListBlock, props);
    }
  };
}, 'withClientIdClassName');
wp.hooks.addFilter('editor.BlockListBlock', 'pwd-blocks/with-client-id-class-name', withRowDisabled);

/**
 * Add custom element class in save element.
 *
 * @param {Object} extraProps     Block element.
 * @param {Object} blockType      Blocks object.
 * @param {Object} attributes     Blocks attributes.
 *
 * @return {Object} extraProps Modified block element.
 */
function applyExtraClass(extraProps, blockType, attributes) {
  var showRow = attributes.showRow;

  //check if attribute exists for old Gutenberg version compatibility
  //add class only when showRow = false
  //add allowedBlocks restriction
  if (typeof showRow !== 'undefined' && !showRow && allowedBlocks.includes(blockType.name)) {
    extraProps.className = classnames__WEBPACK_IMPORTED_MODULE_0___default()(extraProps.className, 'row-disabled');
  }
  return extraProps;
}

//add filters

addFilter('blocks.registerBlockType', 'pwd-blocks/custom-attributes', addAttributes);
addFilter('editor.BlockEdit', 'pwd-blocks/custom-advanced-control', withAdvancedControls);
addFilter('blocks.getSaveContent.extraProps', 'pwd-blocks/applyExtraClass', applyExtraClass);
})();

/******/ })()
;
//# sourceMappingURL=block-pwd-adjustment-disable-row.js.map
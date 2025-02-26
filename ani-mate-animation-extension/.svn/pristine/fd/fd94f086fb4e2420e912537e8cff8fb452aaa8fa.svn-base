/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/add-attributes.js":
/*!*******************************!*\
  !*** ./src/add-attributes.js ***!
  \*******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);


/**
 * External Dependencies
 */
//  import classnames from 'classnames';

/**
 * WordPress Dependencies
 */
const {
  __
} = wp.i18n;
const {
  addFilter
} = wp.hooks;
const {
  Fragment
} = wp.element;
const {
  InspectorControls
} = wp.blockEditor;
const {
  createHigherOrderComponent
} = wp.compose;
const {
  SelectControl,
  TextControl,
  ToggleControl,
  Panel,
  PanelBody
} = wp.components; //restrict to specific block names

const allowedBlocks = ['core/group', 'core/columns', 'core/cover', 'core/image', 'core/media-text', 'core/gallery', 'core/embed', 'core/paragraph', 'core/heading'];
/**
 * Add custom attribute for mobile visibility.
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
      aosFadeType: {
        type: 'select',
        default: null
      },
      aosDuration: {
        type: 'string',
        default: null
      },
      aosEasing: {
        type: 'string',
        default: null
      },
      aosOffset: {
        type: 'string',
        default: null
      },
      aosDelay: {
        type: 'string',
        default: null
      },
      aosAnchor: {
        type: 'string',
        default: null
      },
      aosAnchorPlacement: {
        type: 'string',
        default: null
      },
      aosOnce: {
        type: 'boolean',
        default: false
      },
      aosMirror: {
        type: 'boolean',
        default: false
      }
    });
  }

  return settings;
}
/**
 * Add mobile visibility controls on Advanced Block Panel.
 *
 * @param {function} BlockEdit Block edit component.
 *
 * @return {function} BlockEdit Modified block edit component.
 */


const withAnimationControls = createHigherOrderComponent(BlockEdit => {
  return props => {
    const {
      name,
      attributes,
      setAttributes,
      isSelected
    } = props;
    const {
      aosFadeType,
      aosDuration,
      aosEasing,
      aosOffset,
      aosDelay,
      aosAnchor,
      aosAnchorPlacement,
      aosOnce,
      aosMirror
    } = attributes;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props), isSelected && allowedBlocks.includes(name) && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, {
      key: "mvam-animation"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Panel, {
      id: "gutenpride-controls"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: "Animation Controls",
      initialOpen: false
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Animation Style', 'mvam-animiate'),
      value: props.attributes.aosFadeType,
      onChange: value => props.setAttributes({
        aosFadeType: value
      }),
      options: [{
        value: null,
        label: 'None'
      }, {
        value: 'fade-up',
        label: 'Fade Up'
      }, {
        value: 'fade-down',
        label: 'Fade Down'
      }, {
        value: 'fade-left',
        label: 'Fade Left'
      }, {
        value: 'fade-right',
        label: 'Fade Right'
      }, {
        value: 'fade-up-right',
        label: 'Fade Up Down'
      }, {
        value: 'fade-up-left',
        label: 'Fade Up Left'
      }, {
        value: 'fade-down-right',
        label: 'Fade Down Right'
      }, {
        value: 'fade-down-left',
        label: 'Fade Down Left'
      }, {
        value: 'flip-left',
        label: 'Flip Left'
      }, {
        value: 'flip-right',
        label: 'Flip Right'
      }, {
        value: 'flip-up',
        label: 'Flip Up'
      }, {
        value: 'flip-down',
        label: 'Flip Down'
      }, {
        value: 'zoom-in',
        label: 'Zoom In'
      }, {
        value: 'zoom-in-up',
        label: 'Zoom In Up'
      }, {
        value: 'zoom-in-down',
        label: 'Zoom In Down'
      }, {
        value: 'zoom-in-left',
        label: 'Zoom In Left'
      }, {
        value: 'zoom-in-right',
        label: 'Zoom in Right'
      }, {
        value: 'zoom-out',
        label: 'Zoom Out'
      }, {
        value: 'zoom-out-up',
        label: 'Zoom Out Up'
      }, {
        value: 'zoom-out-down',
        label: 'Zoom Out Down'
      }, {
        value: 'zoom-out-left',
        label: 'Zoom Out Left'
      }, {
        value: 'zoom-out-right',
        label: 'Zoom Out Right'
      }]
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
      label: __('Duration (ms)', 'mvam-animiate'),
      onChange: value => props.setAttributes({
        aosDuration: value
      }),
      value: props.attributes.aosDuration,
      help: __('Leave blank for default duration', 'mvam-animiate')
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Easing', 'mvam-animiate'),
      value: props.attributes.aosEasing,
      onChange: value => props.setAttributes({
        aosEasing: value
      }),
      options: [{
        value: null,
        label: 'Default'
      }, {
        value: 'linear',
        label: 'Linear'
      }, {
        value: 'ease',
        label: 'Ease'
      }, {
        value: 'ease-in',
        label: 'In'
      }, {
        value: 'ease-out',
        label: 'Out'
      }, {
        value: 'ease-in-out',
        label: 'In Out'
      }, {
        value: 'ease-in-back',
        label: 'In Back'
      }, {
        value: 'ease-out-back',
        label: 'Out Back'
      }, {
        value: 'ease-in-out-back',
        label: 'In Out Back'
      }, {
        value: 'ease-in-sine',
        label: 'In Sine'
      }, {
        value: 'ease-out-sine',
        label: 'Out Sine'
      }, {
        value: 'ease-in-out-sine',
        label: 'In Out Sine'
      }, {
        value: 'ease-in-quad',
        label: 'In Quad'
      }, {
        value: 'ease-out-quad',
        label: 'Out Quad'
      }, {
        value: 'ease-in-out-quad',
        label: 'In Out Quad'
      }, {
        value: 'ease-in-cubic',
        label: 'In Cubic'
      }, {
        value: 'ease-out-cubic',
        label: 'Out Cubic'
      }, {
        value: 'ease-in-out-cubic',
        label: 'In Out Cubic'
      }, {
        value: 'ease-in-quart',
        label: 'In Quart'
      }, {
        value: 'ease-out-quart',
        label: 'Out Quart'
      }, {
        value: 'ease-in-out-quart',
        label: 'In Out Quart'
      }]
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
      label: __('Delay (ms)', 'mvam-animiate'),
      onChange: value => props.setAttributes({
        aosDelay: value
      }),
      value: props.attributes.aosDelay
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
      label: __('Offset', 'mvam-animiate'),
      onChange: value => props.setAttributes({
        aosOffset: value
      }),
      value: props.attributes.aosOffset,
      help: __('Offset (in px) from the original trigger point', 'mvam-animiate')
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
      label: __('Anchor', 'mvam-animiate'),
      onChange: value => props.setAttributes({
        aosAnchor: value
      }),
      value: props.attributes.aosAnchor,
      help: __('element whose offset will be used to trigger animation instead of an actual one', 'mvam-animiate')
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Anchor Placement', 'mvam-animiate'),
      value: props.attributes.aosAnchorPlacement,
      onChange: value => props.setAttributes({
        aosAnchorPlacement: value
      }),
      options: [{
        value: null,
        label: 'Default'
      }, {
        value: 'top-bottom',
        label: 'Top Bottom'
      }, {
        value: 'top-center',
        label: 'Top Center'
      }, {
        value: 'top-top',
        label: 'Top Top'
      }, {
        value: 'center-bottom',
        label: 'Center Bottom'
      }, {
        value: 'center-center',
        label: 'Center Center'
      }, {
        value: 'center-top',
        label: 'Center Top'
      }, {
        value: 'bottom-bottom',
        label: 'Bottom Bottom'
      }, {
        value: 'bottom-center',
        label: 'Bottom Center'
      }, {
        value: 'bottom-top',
        label: 'Bottom Top'
      }],
      help: __('Position of anchor to window to trigger annimation', 'mvam-animiate')
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
      label: __('Once'),
      checked: !!aosOnce,
      onChange: () => setAttributes({
        aosOnce: !aosOnce
      }),
      help: __('Whether animation should happen only once - while scrolling down', 'mvam-animiate')
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
      label: __('Mirror'),
      checked: !!aosMirror,
      onChange: () => setAttributes({
        aosMirror: !aosMirror
      }),
      help: __('Whether elements should animate out while scrolling past them', 'mvam-animiate')
    })))));
  };
}, 'withAnimationControls');
/**
 * Add custom element class in save element.
 *
 * @param {Object} extraProps     Block element.
 * @param {Object} blockType      Blocks object.
 * @param {Object} attributes     Blocks attributes.
 *
 * @return {Object} extraProps Modified block element.
 */

function applyExtraAttributes(extraProps, blockType, attributes) {
  const {
    aosFadeType,
    aosDuration,
    aosEasing,
    aosOffset,
    aosAnchor,
    aosAnchorPlacement,
    aosOnce,
    aosMirror,
    aosDelay
  } = attributes; //check if attribute exists for old Gutenberg version compatibility
  //add class only when visibleOnMobile = false
  //add allowedBlocks restriction

  if (typeof aosFadeType !== 'undefined' && aosFadeType !== null && aosFadeType !== "None" && allowedBlocks.includes(blockType.name)) {
    extraProps['data-aos'] = aosFadeType;

    if (typeof aosDuration !== 'undefined' && aosDuration !== null && aosDuration != "") {
      extraProps['data-aos-duration'] = aosDuration;
    }

    if (typeof aosEasing !== 'undefined' && aosEasing !== null && aosEasing != "Default") {
      extraProps['data-aos-easing'] = aosEasing;
    }

    if (typeof aosDelay !== 'undefined' && aosDelay !== null && aosDelay != "") {
      extraProps['data-aos-delay'] = aosDelay;
    }

    if (typeof aosOffset !== 'undefined' && aosOffset !== null && aosOffset != "") {
      extraProps['data-aos-offset'] = aosOffset;
    }

    if (typeof aosAnchor !== 'undefined' && aosAnchor !== null && aosAnchor != "") {
      extraProps['data-aos-anchor'] = aosAnchor;

      if (typeof aosAnchorPlacement !== 'undefined' && aosAnchorPlacement !== null && aosAnchorPlacement != "Default") {
        extraProps['data-aos-anchor-placement'] = aosAnchorPlacement;
      }
    }

    if (typeof aosOnce !== 'undefined' && aosOnce !== null && aosOnce) {
      extraProps['data-aos-once'] = 'true';
    }

    if (typeof aosMirror !== 'undefined' && aosMirror !== null && aosMirror) {
      extraProps['data-aos-mirror'] = 'true';
    }
  }

  return extraProps;
} //add filters


addFilter('blocks.registerBlockType', 'editorskit/custom-attributes', addAttributes);
addFilter('editor.BlockEdit', 'editorskit/custom-advanced-control', withAnimationControls);
addFilter('blocks.getSaveContent.extraProps', 'editorskit/applyExtraClass', applyExtraAttributes);

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = window["wp"]["element"];

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
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
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
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _add_attributes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add-attributes */ "./src/add-attributes.js");

}();
/******/ })()
;
//# sourceMappingURL=index.js.map
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "@wordpress/api-fetch":
/*!**********************************!*\
  !*** external ["wp","apiFetch"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["apiFetch"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["data"];

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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************************************!*\
  !*** ./src/block-pwd-adjustment-document-settings.js ***!
  \*******************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/api-fetch */ "@wordpress/api-fetch");
/* harmony import */ var _wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_api_fetch__WEBPACK_IMPORTED_MODULE_1__);
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
var registerPlugin = wp.plugins.registerPlugin;
var useState = wp.element.useState;
//const { useEffect } = wp.element;

registerPlugin('blocksolid-custom-settings-plugin', {
  render: function render() {
    return /*#__PURE__*/React.createElement(Blocksolid_Plugin, null);
  }
});
var __ = wp.i18n.__;
var compose = wp.compose.compose;
var _wp$data = wp.data,
  withSelect = _wp$data.withSelect,
  withDispatch = _wp$data.withDispatch;
var PluginDocumentSettingPanel = wp.editor.PluginDocumentSettingPanel;
var _wp$components = wp.components,
  ToggleControl = _wp$components.ToggleControl,
  PanelRow = _wp$components.PanelRow,
  ButtonGroup = _wp$components.ButtonGroup,
  Button = _wp$components.Button;
var blocksolid_field_allow_editor_overlay = jsData.blocksolid_field_allow_editor_overlay; // Blocksolid setting sent from PHP - deprecated
var blocksolid_wordpress_version = jsData.blocksolid_wordpress_version; // Blocksolid setting sent from PHP - deprecated
var blocksolid_current_user_id = jsData.blocksolid_current_user_id; // Blocksolid setting sent from PHP
var blocksolid_current_user_overlay_active = jsData.blocksolid_current_user_overlay_active; // Blocksolid setting sent from PHP
var blocksolid_allow_vc_converter = jsData.blocksolid_allow_vc_converter; // Blocksolid setting sent from PHP



// They made changes to localStorage again in 6.1 so using a user meta field instead now!

var Blocksolid_Plugin = function Blocksolid_Plugin(_ref) {
  var postType = _ref.postType,
    postMeta = _ref.postMeta,
    setPostMeta = _ref.setPostMeta;
  var currentPostId = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_0__.useSelect)(function (select) {
    return select('core/editor').getCurrentPostId();
  }, []);
  function check_overlay_feature_active() {
    var feature_value = blocksolid_current_user_overlay_active;
    return feature_value;
  }
  function check_allow_vc_converter() {
    var feature_value = blocksolid_allow_vc_converter;
    return feature_value;
  }
  function initiate_vc_converter() {
    var datat = false;
    wp.apiFetch({
      path: 'blocksolid/v1/initiate_vc_converter/' + currentPostId
    }).then(function (datat) {
      if (datat.message) {
        alert(datat.message);
      }
    });
    return true;
  }
  function toggle_overlay_feature_active() {
    var datat = false;
    wp.apiFetch({
      path: 'blocksolid/v1/toggle_overlay_active_setting_rest/' + blocksolid_current_user_id
    }).then(function (datat) {
      //console.log( datat );
    });
    return true;
  }
  var _useState = useState(check_overlay_feature_active()),
    _useState2 = _slicedToArray(_useState, 2),
    isChecked = _useState2[0],
    setChecked = _useState2[1];
  var _useState3 = useState(check_allow_vc_converter()),
    _useState4 = _slicedToArray(_useState3, 1),
    allow_vc_converter = _useState4[0];
  var overlay_class_name = 'blocksolid-overlay';

  // Function to add class to the body of an iframe
  function add_blocksolid_overlay_class_to_any_iframe_bodies(iframe) {
    try {
      if (iframe.contentDocument && iframe.contentDocument.body) {
        iframe.contentDocument.body.classList.add(overlay_class_name);
      }
    } catch (e) {
      // Handle potential cross-origin errors
      console.error('Error accessing iframe body:', e);
    }
  }

  /* NOTE: Currently the iframed mobile and tablet versions only show the overlay if switched on while in them
     This https://wordpress.stackexchange.com/questions/424575/hook-into-viewport-change suggests there is no clear way around this
     Potentially we could listen out for changes to canvas size or the value returned by select( 'core/editor' ).getDeviceType() but how to trigger? */

  // Function to add class to the body of an iframe
  function remove_blocksolid_overlay_class_from_any_iframe_bodies(iframe) {
    try {
      if (iframe.contentDocument && iframe.contentDocument.body) {
        iframe.contentDocument.body.classList.remove(overlay_class_name);
      }
    } catch (e) {
      // Handle potential cross-origin errors
      console.error('Error accessing iframe body:', e);
    }
  }
  toggle_blocksolid_overlay_class();
  function toggle_blocksolid_overlay_class(blocksolid_wordpress_version) {
    if (isChecked) {
      document.body.classList.add(overlay_class_name);
      //Add class to any nested iframe bodies
      document.querySelectorAll('iframe').forEach(add_blocksolid_overlay_class_to_any_iframe_bodies);
    } else {
      document.body.classList.remove(overlay_class_name);
      ///Remove class from any nested iframe bodies
      document.querySelectorAll('iframe').forEach(remove_blocksolid_overlay_class_from_any_iframe_bodies);
    }
  }
  var el = wp.element.createElement;
  var cube = el('svg', {
    width: 14,
    height: 14,
    viewBox: '0 0 512 512',
    transform: "scale(1.0,1.0)"
  }, el('path', {
    d: "M234.5 5.709C248.4 .7377 263.6 .7377 277.5 5.709L469.5 74.28C494.1 83.38 512 107.5 512 134.6V377.4C512 404.5 494.1 428.6 469.5 437.7L277.5 506.3C263.6 511.3 248.4 511.3 234.5 506.3L42.47 437.7C17 428.6 0 404.5 0 377.4V134.6C0 107.5 17 83.38 42.47 74.28L234.5 5.709zM256 65.98L82.34 128L256 190L429.7 128L256 65.98zM288 434.6L448 377.4V189.4L288 246.6V434.6z"
  }));
  function blocksolid_toggle_meta() {
    toggle_overlay_feature_active();
    toggle_blocksolid_overlay_class();
    setChecked(!isChecked);
  }
  var default_content_blocks = '<!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><!-- wp:freeform --><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin accumsan ante nisl, sit amet pharetra nulla fermentum eu. Sed in neque in lectus accumsan scelerisque sed vel nisl. Donec leo dolor, laoreet eget dolor id, consequat dictum dolor. Phasellus nec aliquam sem. Morbi eget consequat metus, non convallis nibh. Aliquam viverra quam at imperdiet egestas. Fusce hendrerit ipsum pharetra ex interdum, id eleifend est dictum. Integer libero nunc, mollis id molestie eget, imperdiet ut diam.</p><!-- /wp:freeform --></div><!-- /wp:column --></div><!-- /wp:columns -->';
  function add_new_blocksolid_row_top() {
    // https://github.com/markhowellsmead/helpers/wiki/Gutenberg-Patterns
    var newBlocks = wp.blocks.rawHandler({
      HTML: default_content_blocks
    });
    wp.data.dispatch('core/block-editor').insertBlocks(newBlocks, 0);
    return true;
  }
  function add_new_blocksolid_row_below() {
    var newBlocks = wp.blocks.rawHandler({
      HTML: default_content_blocks
    });
    wp.data.dispatch('core/block-editor').insertBlocks(newBlocks, 1);
    return true;
  }

  // Add a space: el("br",{key: 'blocksolid_settings_break_01'}),

  return el(PluginDocumentSettingPanel, {
    name: 'blocksolid_settings',
    title: 'Blocksolid',
    icon: cube,
    initialOpen: "false"
  }, [el(PanelRow, {
    key: 'blocksolid_settings_panelrow'
  }, el(ToggleControl, {
    label: __('Show desktop overlay'),
    onChange: function onChange(value) {
      return blocksolid_toggle_meta();
    },
    checked: isChecked,
    __nextHasNoMarginBottom: true
  })), el(ButtonGroup, {
    title: '',
    key: 'blocksolid_settings_buttons'
  }, el(Button, {
    key: 'blocksolid_add_new_blocksolid_row_top',
    value: 'add_row_at_top',
    title: 'Add row at top',
    onClick: add_new_blocksolid_row_top,
    isPrimary: false
  }, 'Add row at top'), el("span", {
    key: 'blocksolid_settings_space_01'
  }, ' '), el(Button, {
    key: 'blocksolid_add_new_blocksolid_row_below',
    value: 'add_row_below',
    title: 'Add row below',
    onClick: add_new_blocksolid_row_below,
    isPrimary: false
  }, 'Add row below'))], allow_vc_converter && [el("br", {
    key: 'blocksolid_settings_break_01'
  }), el("br", {
    key: 'blocksolid_settings_break_02'
  }), el(ButtonGroup, {
    title: '',
    key: 'blocksolid_vc_converter_buttons'
  }, el(Button, {
    key: 'blocksolid_vc_converter_button',
    value: 'vc_converter_button',
    title: 'Clone and convert VC to Gutenberg',
    onClick: initiate_vc_converter,
    isPrimary: true
  }, 'Clone and convert VC to Gutenberg'))]);
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (compose([])(Blocksolid_Plugin));
})();

/******/ })()
;
//# sourceMappingURL=block-pwd-adjustment-document-settings.js.map
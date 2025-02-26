/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/admin/GeneralTab.js":
/*!*********************************!*\
  !*** ./src/admin/GeneralTab.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);




const GeneralTab = () => {
  const [isEnabled, setIsEnabled] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [googlePlacesApiKey, setGooglePlacesApiKey] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)('');
  const [specificCountry, setSpecificCountry] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)('');
  const [addressOptions, setAddressOptions] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)({
    streetNumber: false,
    postcode: false,
    locality: false,
    state: false,
    country: false
  });
  const [placeTypes, setPlaceTypes] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)('');
  const [isSaving, setIsSaving] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [loading, setLoading] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(true);
  const optionNames = {
    enabled: 'gmacaw_enabled',
    googlePlacesApiKey: 'gmacaw_google_places_api_key',
    specificCountry: 'gmacaw_specific_country',
    addressOptions: 'gmacaw_address_options',
    placeTypes: 'gmacaw_place_types'
  };
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    // Fetch settings from the REST API
    fetch(gmacaw_wp_ajax.getsettings, {
      method: 'GET',
      headers: {
        'Accept': 'application/json',
        'X-WP-Nonce': gmacaw_wp_ajax.nonce
      }
    }).then(response => response.json()).then(data => {
      setIsEnabled(data[optionNames.enabled] === '1');
      setGooglePlacesApiKey(data[optionNames.googlePlacesApiKey] || '');
      setSpecificCountry(data[optionNames.specificCountry] || '');
      setAddressOptions(data[optionNames.addressOptions] || {
        streetNumber: false,
        postcode: false,
        locality: false,
        state: false,
        country: false
      });
      setPlaceTypes(data[optionNames.placeTypes] || '');
      setLoading(false);
    }).catch(error => {
      console.error('Error fetching settings:', error);
      setLoading(false);
    });
  }, []);
  const saveSettings = () => {
    setIsSaving(true);
    const settings = {
      [optionNames.enabled]: isEnabled ? '1' : '0',
      [optionNames.googlePlacesApiKey]: googlePlacesApiKey,
      [optionNames.specificCountry]: specificCountry,
      [optionNames.addressOptions]: addressOptions,
      // Ensure addressOptions is formatted as an object
      [optionNames.placeTypes]: placeTypes
    };
    fetch(gmacaw_wp_ajax.savedata, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': gmacaw_wp_ajax.nonce // Ensure the nonce is included for authentication
      },
      body: JSON.stringify({
        settings: settings
      })
    }).then(response => response.json()).then(data => {
      setIsSaving(false);
      if (data.success) {
        // Check for a success property in the response
        alert((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Settings saved!', 'custom-fields-checkout-block-for-woocommerce'));
      } else {
        alert((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Failed to save settings.', 'custom-fields-checkout-block-for-woocommerce'));
      }
    }).catch(error => {
      setIsSaving(false);
      console.error('Error saving settings:', error);
      alert((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Failed to save settings.', 'custom-fields-checkout-block-for-woocommerce'));
    });
  };
  const toggleAddressOption = key => {
    setAddressOptions(prev => ({
      ...prev,
      [key]: !prev[key]
    }));
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('General Settings', 'custom-fields-checkout-block-for-woocommerce'),
    initialOpen: true
  }, loading ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Spinner, null) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.CheckboxControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Enable', 'custom-fields-checkout-block-for-woocommerce'),
    checked: isEnabled,
    onChange: setIsEnabled
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Google Places API Key', 'custom-fields-checkout-block-for-woocommerce'),
    value: googlePlacesApiKey,
    onChange: setGooglePlacesApiKey
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, "Google requires an API key to retrieve Auto Complete Address for job listings. Acquire an API key from the ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    target: "_blank",
    href: "https://developers.google.com/maps/documentation/javascript/places-autocomplete"
  }, "Google Maps API developer site"), "."))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Specific Country Address Show', 'custom-fields-checkout-block-for-woocommerce'),
    value: specificCountry,
    onChange: setSpecificCountry
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("strong", null, "Default is blank"), " it will be show all Country address if you want to particular country address than add two digit code ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("strong", null, "Example: France for add fr"), " ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: "https://codesmade.com/demo/country-code-list/"
  }, "Get Country Code list")))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "mb-10"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    class: "bold"
  }, "Address Field showing")), ['streetNumber', 'postcode', 'locality', 'state', 'country'].map(field => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.CheckboxControl, {
    key: field,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)(field.charAt(0).toUpperCase() + field.slice(1), 'custom-fields-checkout-block-for-woocommerce'),
    checked: addressOptions[field],
    onChange: () => toggleAddressOption(field)
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Place Types', 'custom-fields-checkout-block-for-woocommerce'),
    placeholder: "airport,art_gallery",
    value: placeTypes,
    onChange: setPlaceTypes
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("strong", null, "Default is blank"), " You can setup place type there. example if you want art gallery than you need to add there ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("strong", null, "art_gallery"), ".", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: "https://developers.google.com/maps/documentation/places/web-service/supported_type"
  }, "Get Place Type")))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
    isPrimary: true,
    onClick: saveSettings,
    disabled: isSaving
  }, isSaving ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Spinner, null) : (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Save Settings', 'custom-fields-checkout-block-for-woocommerce'))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (GeneralTab);

/***/ }),

/***/ "./src/admin.scss":
/*!************************!*\
  !*** ./src/admin.scss ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/dom-ready":
/*!**********************************!*\
  !*** external ["wp","domReady"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["domReady"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

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
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/admin.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _admin_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./admin.scss */ "./src/admin.scss");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/dom-ready */ "@wordpress/dom-ready");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _admin_GeneralTab__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./admin/GeneralTab */ "./src/admin/GeneralTab.js");







// Import the tab components

const SettingsPage = () => {
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Panel, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_admin_GeneralTab__WEBPACK_IMPORTED_MODULE_6__["default"], null));
};
_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_2___default()(() => {
  const root = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_3__.createRoot)(document.getElementById('gmacaw-admin-root'));
  root.render((0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(SettingsPage, null));
});
})();

/******/ })()
;
//# sourceMappingURL=admin.js.map
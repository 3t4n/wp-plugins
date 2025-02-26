/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/admin/OptionSettings.js":
/*!*************************************!*\
  !*** ./src/admin/OptionSettings.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__);





const OptionSettings = ({
  handleOnChange,
  objKey,
  values,
  fields = undefined
}) => {
  const [isVisible, setIsVisible] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)(false);
  const ref = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useRef)(false);
  const keyName = key => {
    return `${objKey}.${key}`;
  };
  const getVal = (key, defaultVal = "") => {
    return (0,lodash__WEBPACK_IMPORTED_MODULE_1__.get)(values, `${objKey}.${key}`, defaultVal);
  };
  const showAll = !fields || !fields?.length;
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
    ref: ref,
    variant: "secondary",
    onClick: () => setIsVisible(!isVisible)
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Settings", "sa-swatches")), isVisible && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Popover, {
    placement: `right-start`,
    className: "sasw_setting_popover",
    offset: 15,
    noArrow: false,
    anchor: ref?.current,
    onClose: () => {
      setIsVisible(false);
    }
  }, showAll || fields.includes("layout") ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Item Layout", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: getVal("layout"),
    defaultValue: `inline`,
    onChange: e => {
      handleOnChange(keyName(`layout`), e.target.value);
    }
  }, Object.keys(SASW_SWATCHES.configs.option_layout).map(key => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: key,
    key: key
  }, SASW_SWATCHES.configs.option_layout[key]))))) : null, showAll || fields.includes("label") ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Label", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: getVal("label"),
    defaultValue: "",
    onChange: e => {
      const v = e.target.value;
      handleOnChange(keyName("label"), v);
    }
  }, Object.keys(SASW_SWATCHES.configs.show_hide).map(k => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: k,
    key: k
  }, SASW_SWATCHES.configs.show_hide[k]))))) : null, showAll || fields.includes("col") ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Items per row", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    value: getVal("col"),
    type: "search",
    placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Auto", "sa-swatches"),
    step: 1,
    onChange: e => {
      handleOnChange(keyName("col"), e.target.value);
    },
    size: 3
  }))) : null, showAll || fields.includes("size") ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Size", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    value: getVal("size"),
    type: "number",
    placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Auto", "sa-swatches"),
    onChange: e => {
      handleOnChange(keyName("size"), e.target.value);
    },
    size: 3
  }))) : null, showAll || fields.includes("style") ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Style", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: getVal("style"),
    defaultValue: "",
    onChange: e => {
      const v = e.target.value;
      handleOnChange(keyName("style"), v);
    }
  }, Object.keys(SASW_SWATCHES.configs.swatch_style).map(key => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: key,
    key: key
  }, SASW_SWATCHES.configs.swatch_style[key]))))) : null));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (OptionSettings);

/***/ }),

/***/ "./src/admin/admin.scss":
/*!******************************!*\
  !*** ./src/admin/admin.scss ***!
  \******************************/
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

/***/ "lodash":
/*!*************************!*\
  !*** external "lodash" ***!
  \*************************/
/***/ ((module) => {

module.exports = window["lodash"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*************************************!*\
  !*** ./src/admin/admin-settings.js ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _admin_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./admin.scss */ "./src/admin/admin.scss");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _OptionSettings__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./OptionSettings */ "./src/admin/OptionSettings.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__);








const Settings = ({
  onChange,
  values
}) => {
  const getVal = (key, defaultVal = "") => {
    return (0,lodash__WEBPACK_IMPORTED_MODULE_3__.get)(values, `${key}`, defaultVal);
  };
  const handleOnChange = (key, value) => {
    onChange(prev => {
      let next = {
        ...prev
      };
      (0,lodash__WEBPACK_IMPORTED_MODULE_3__.set)(next, key, value);
      return next;

      // let next = { ...prev, [key]: value, _t: Date.now() };
      // if (["", null, undefined].includes(value)) {
      // 	delete next[key];
      // }
      // return next;
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sa-settings-form"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h2", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Variations in product page", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "group-items"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sasw_heading"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Layout Settings", "sa-swatches"))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Form Layout", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: getVal("single.layout"),
    defaultValue: "",
    onChange: e => {
      const v = e.target.value;
      handleOnChange("single.layout", v);
    }
  }, Object.keys(SASW_SWATCHES.configs.main_layout).map(k => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: k,
    key: k
  }, SASW_SWATCHES.configs.main_layout[k]))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Popover size", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__.__experimentalUnitControl, {
    placeholder: "Auto",
    value: getVal("single.pooverSize"),
    onChange: v => {
      handleOnChange("single.pooverSize", v);
    }
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Attribute description", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: getVal("single.viewAttrDetail"),
    defaultValue: "",
    onChange: e => {
      const v = e.target.value;
      handleOnChange("single.viewAttrDetail", v);
    }
  }, Object.keys(SASW_SWATCHES.configs.show_hide).map(k => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: k,
    key: k
  }, SASW_SWATCHES.configs.show_hide[k])))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "group-items"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sasw_heading"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Options Settings", "sa-swatches"))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch image", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "single.option.image",
    values: values,
    handleOnChange: handleOnChange
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch color", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "single.option.color",
    values: values,
    handleOnChange: handleOnChange
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch default", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "single.option.default",
    values: values,
    handleOnChange: handleOnChange
  })))), ["drawer"].includes(getVal("single.layout")) ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "group-items"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sasw_heading has_desc"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Selected Option Settings", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "sasw_desc"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Apply for drawer layout only.", "sa-swatches"))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch image", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "drawer.option.image",
    values: values,
    fields: ["layout", "size", "style"],
    handleOnChange: handleOnChange
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch color", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "drawer.option.color",
    values: values,
    fields: ["layout", "size", "style"],
    handleOnChange: handleOnChange
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch default", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "drawer.option.default",
    values: values,
    fields: ["layout", "size", "style"],
    handleOnChange: handleOnChange
  })))) : null), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sa-settings-form"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h2", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Variations in shop & archive pages", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "group-items"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sasw_heading"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Layout Settings", "sa-swatches"))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Enable", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: values?.shop?.show || "",
    defaultValue: "yes",
    onChange: e => {
      const v = e.target.value;
      handleOnChange("shop.show", v);
    }
  }, Object.keys(SASW_SWATCHES.configs.yes_no).map(key => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: key,
    key: key
  }, SASW_SWATCHES.configs.yes_no[key])))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "group-items"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "sasw_heading"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Options Settings", "sa-swatches"))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Position", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: values?.shop?.position || "",
    defaultValue: "",
    onChange: e => {
      const v = e.target.value;
      handleOnChange("shop.position", v);
    }
  }, Object.keys(SASW_SWATCHES.configs.position).map(key => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: key,
    key: key
  }, SASW_SWATCHES.configs.position[key]))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatches align", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: values?.shop_align || "",
    defaultValue: "",
    onChange: e => {
      const v = e.target.value;
      handleOnChange("shop.align", v);
    }
  }, Object.keys(SASW_SWATCHES.configs.align).map(key => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: key,
    key: key
  }, SASW_SWATCHES.configs.align[key]))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Allow attributes selection", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("select", {
    value: values?.shop?.selection || "",
    defaultValue: "",
    onChange: e => {
      const v = e.target.value;
      handleOnChange("shop.selection", v);
    }
  }, Object.keys(SASW_SWATCHES.configs.yes_no).map(key => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("option", {
    value: key,
    key: key
  }, SASW_SWATCHES.configs.yes_no[key]))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch image", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "shop.option.image",
    values: values,
    handleOnChange: handleOnChange
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch color", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "shop.option.color",
    values: values,
    handleOnChange: handleOnChange
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "form-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "form_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Swatch default", "sa-swatches")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "form_value"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_OptionSettings__WEBPACK_IMPORTED_MODULE_5__["default"], {
    objKey: "shop.option.default",
    values: values,
    handleOnChange: handleOnChange
  }))))));
};
const App = ({
  input,
  initValues
}) => {
  const [settings, setSettings] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)(initValues);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useEffect)(() => {
    input.val(JSON.stringify(settings));
  }, [settings]);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Settings, {
    onChange: setSettings,
    values: settings
  }));
};
jQuery("#sasw_setting_wrap").each(function () {
  const panel = jQuery(this);
  const input = jQuery("#sasw_swatches_settings");
  const form = panel.closest("form");
  form.append(input);
  jQuery(".wc-settings-row-sasw_swatches_settings, h2", form).remove();
  let initValues = {};
  try {
    initValues = JSON.parse(input.val());
  } catch (e) {
    initValues = {};
  }
  console.log(".initValues", initValues);
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.render)((0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(App, {
    input: input,
    initValues: initValues
  }), panel.get(0));
});
})();

/******/ })()
;
//# sourceMappingURL=admin-settings.js.map
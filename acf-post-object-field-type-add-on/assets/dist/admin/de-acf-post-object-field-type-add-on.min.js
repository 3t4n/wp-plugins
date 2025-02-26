/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/js/admin.js":
/*!********************************!*\
  !*** ./assets/src/js/admin.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }\n\nfunction _nonIterableRest() { throw new TypeError(\"Invalid attempt to destructure non-iterable instance.\\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.\"); }\n\nfunction _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === \"string\") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === \"Object\" && o.constructor) n = o.constructor.name; if (n === \"Map\" || n === \"Set\") return Array.from(o); if (n === \"Arguments\" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }\n\nfunction _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }\n\nfunction _iterableToArrayLimit(arr, i) { if (typeof Symbol === \"undefined\" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i[\"return\"] != null) _i[\"return\"](); } finally { if (_d) throw _e; } } return _arr; }\n\nfunction _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }\n\n/* eslint-disable camelcase */\nvar __ = wp.i18n.__;\nvar _wp$components = wp.components,\n    BaseControl = _wp$components.BaseControl,\n    Button = _wp$components.Button,\n    ExternalLink = _wp$components.ExternalLink,\n    PanelBody = _wp$components.PanelBody,\n    PanelRow = _wp$components.PanelRow,\n    Placeholder = _wp$components.Placeholder,\n    Spinner = _wp$components.Spinner,\n    Snackbar = _wp$components.Snackbar,\n    ToggleControl = _wp$components.ToggleControl,\n    SelectControl = _wp$components.SelectControl,\n    RadioControl = _wp$components.RadioControl;\nvar _wp$element = wp.element,\n    render = _wp$element.render,\n    Fragment = _wp$element.Fragment,\n    useState = _wp$element.useState,\n    useEffect = _wp$element.useEffect;\n\nvar App = function App() {\n  var _useState = useState(false),\n      _useState2 = _slicedToArray(_useState, 2),\n      apiLoaded = _useState2[0],\n      setAPILoaded = _useState2[1];\n\n  var _useState3 = useState(false),\n      _useState4 = _slicedToArray(_useState3, 2),\n      apiSaving = _useState4[0],\n      setAPISaving = _useState4[1];\n\n  var _useState5 = useState(false),\n      _useState6 = _slicedToArray(_useState5, 2),\n      apiSaved = _useState6[0],\n      setAPISaved = _useState6[1];\n\n  var _useState7 = useState(false),\n      _useState8 = _slicedToArray(_useState7, 2),\n      enabled = _useState8[0],\n      setEnabled = _useState8[1];\n\n  var _useState9 = useState(''),\n      _useState10 = _slicedToArray(_useState9, 2),\n      appendField = _useState10[0],\n      setAppendField = _useState10[1];\n\n  var _useState11 = useState(''),\n      _useState12 = _slicedToArray(_useState11, 2),\n      appendFieldFormat = _useState12[0],\n      setAppendFieldFormat = _useState12[1];\n\n  useEffect(function () {\n    wp.api.loadPromise.then(function () {\n      var settings = new wp.api.models.Settings();\n\n      if (false === apiLoaded) {\n        settings.fetch().then(function (response) {\n          setEnabled(response.de_acfpoftao_enable);\n          setAppendField(response.de_acfpoftao_append_field);\n          setAppendFieldFormat(response.de_acfpoftao_append_field_format);\n          setAPILoaded(true);\n        });\n      }\n    });\n  }, []);\n\n  var updateOptions = function updateOptions(event) {\n    event.preventDefault();\n    setAPISaving(true);\n    var model = new wp.api.models.Settings({\n      // eslint-disable-next-line camelcase\n      de_acfpoftao_enable: enabled,\n      de_acfpoftao_append_field: appendField,\n      de_acfpoftao_append_field_format: appendFieldFormat\n    });\n    model.save().then(function (response) {\n      setEnabled(response.de_acfpoftao_enable);\n      setAppendField(response.de_acfpoftao_append_field);\n      setAppendFieldFormat(response.de_acfpoftao_append_field_format);\n      setAPISaving(false);\n      setAPISaved(true);\n      setTimeout(function () {\n        setAPISaved(false);\n      }, 5000);\n    });\n  };\n\n  var getAppendFieldOptions = function getAppendFieldOptions() {\n    var options = DE_ACFPOFTAO.ACF_FIELD_GROUPS;\n    var newOptions = [];\n\n    for (var group in options) {\n      newOptions.push({\n        label: group,\n        value: group,\n        disabled: true\n      });\n      options[group].forEach(function (field) {\n        return newOptions.push(field);\n      });\n    }\n\n    return newOptions;\n  };\n\n  var getAppendFieldFormatOptions = function getAppendFieldFormatOptions() {\n    return DE_ACFPOFTAO.APPEND_FIELD_FORMATS;\n  };\n\n  return wp.element.createElement(Fragment, null, wp.element.createElement(\"div\", {\n    className: \"settings-header\"\n  }, wp.element.createElement(\"div\", {\n    className: \"settings-container\"\n  }, wp.element.createElement(\"div\", {\n    className: \"settings-logo\"\n  }, wp.element.createElement(\"h1\", null, __('ACF Post Object Field Type Add-On'))))), wp.element.createElement(\"div\", {\n    className: \"settings-main\"\n  }, !apiLoaded ? wp.element.createElement(Placeholder, null, wp.element.createElement(Spinner, null)) : wp.element.createElement(Fragment, null, apiSaved && wp.element.createElement(Snackbar, null, wp.element.createElement(\"p\", null, __('Settings saved!'))), wp.element.createElement(PanelBody, {\n    title: __('Settings for ACF Post Object Field Type plugin.  This plugin is specifically for appending post data to each option for the \"post object\" field type.  When enabled, the selected fields will be suffixed to each available option in \"post object\" selects.')\n  }, wp.element.createElement(PanelRow, null, wp.element.createElement(ToggleControl, {\n    label: __('Enable?'),\n    help: 'Do you want to enable the plugin?',\n    checked: enabled,\n    disabled: apiSaving,\n    onChange: function onChange() {\n      return setEnabled(!enabled);\n    },\n    className: \"settings-field\"\n  })), enabled && wp.element.createElement(Fragment, null, wp.element.createElement(PanelRow, null, wp.element.createElement(SelectControl, {\n    label: __('Field To Append'),\n    value: appendField,\n    onChange: setAppendField,\n    options: getAppendFieldOptions(),\n    className: \"settings-field\"\n  })), wp.element.createElement(PanelRow, null, wp.element.createElement(SelectControl, {\n    label: __('Append Format'),\n    value: appendFieldFormat,\n    onChange: setAppendFieldFormat,\n    options: getAppendFieldFormatOptions(),\n    className: \"settings-field\"\n  }))), wp.element.createElement(Button, {\n    isPrimary: true,\n    isBusy: apiSaving,\n    isLarge: true,\n    target: \"_blank\",\n    href: \"#\",\n    onClick: updateOptions\n  }, __('Save'))))));\n};\n\nrender(wp.element.createElement(App, null), document.getElementById('de_acfpoftao'));\n\n//# sourceURL=webpack:///./assets/src/js/admin.js?");

/***/ }),

/***/ "./assets/src/scss/admin.scss":
/*!************************************!*\
  !*** ./assets/src/scss/admin.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./assets/src/scss/admin.scss?");

/***/ }),

/***/ 0:
/*!*******************************************************************!*\
  !*** multi ./assets/src/js/admin.js ./assets/src/scss/admin.scss ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./assets/src/js/admin.js */\"./assets/src/js/admin.js\");\nmodule.exports = __webpack_require__(/*! ./assets/src/scss/admin.scss */\"./assets/src/scss/admin.scss\");\n\n\n//# sourceURL=webpack:///multi_./assets/src/js/admin.js_./assets/src/scss/admin.scss?");

/***/ })

/******/ });
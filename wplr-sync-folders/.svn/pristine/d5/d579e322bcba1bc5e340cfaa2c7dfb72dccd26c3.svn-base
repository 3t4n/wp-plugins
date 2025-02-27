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
/******/ 	return __webpack_require__(__webpack_require__.s = "./public/src/admin.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./public/src/admin.js":
/*!*****************************!*\
  !*** ./public/src/admin.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var rml__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! rml */ "rml");
/* harmony import */ var rml__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(rml__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./public/src/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var rmlopts__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! rmlopts */ "rmlopts");
/* harmony import */ var rmlopts__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(rmlopts__WEBPACK_IMPORTED_MODULE_4__);





var ICON_OBJ_LR_TYPE_ROOT = react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement("span", {
  className: "wplrRml-icon-root"
}, "Lr");
var ICON_OBJ_LR_TYPE_COLLECTION = react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement("i", {
  className: "rmlicon-gallery"
});
var ICON_OBJ_LR_TYPE_FOLDER = react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement("i", {
  className: "rmlicon-archive"
});
/**
 * Since Real Media Library v4.6.0 the icon is hold in a string instead
 * of a frozen icon object.
 */

var needsIconString = rmlopts__WEBPACK_IMPORTED_MODULE_4___default.a.hasOwnProperty("lastQueried");
rml__WEBPACK_IMPORTED_MODULE_2__["hooks"].register('tree/node', function (node) {
  switch (node.properties.type) {
    case 10:
      node.icon = needsIconString ? 'lrRoot' : ICON_OBJ_LR_TYPE_ROOT;
      break;

    case 11:
      node.icon = needsIconString ? 'lrCollection' : ICON_OBJ_LR_TYPE_COLLECTION;
      break;

    case 12:
      node.icon = needsIconString ? 'lrFolder' : ICON_OBJ_LR_TYPE_FOLDER;
      break;

    default:
      break;
  }
});
/**
 * @see needsIconString description
 */

needsIconString && rml__WEBPACK_IMPORTED_MODULE_2__["hooks"].register('tree/node/icon', function (result, icon) {
  switch (icon) {
    case "lrRoot":
      result.icon = ICON_OBJ_LR_TYPE_ROOT;
      break;

    case "lrCollection":
      result.icon = ICON_OBJ_LR_TYPE_COLLECTION;
      break;

    case "lrFolder":
      result.icon = ICON_OBJ_LR_TYPE_FOLDER;
      break;

    default:
      break;
  }
});
rml__WEBPACK_IMPORTED_MODULE_2__["hooks"].register('rest/button/success/notice/issue3', function () {
  return window.location.reload();
});

/***/ }),

/***/ "./public/src/style.scss":
/*!*******************************!*\
  !*** ./public/src/style.scss ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = React;

/***/ }),

/***/ "react-dom":
/*!***************************!*\
  !*** external "ReactDOM" ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ReactDOM;

/***/ }),

/***/ "rml":
/*!**********************!*\
  !*** external "rml" ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = rml;

/***/ }),

/***/ "rmlopts":
/*!**************************!*\
  !*** external "rmlOpts" ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = rmlOpts;

/***/ })

/******/ });
//# sourceMappingURL=admin.js.map
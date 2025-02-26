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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/assets/js/blocks/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@iconify/icons-ant-design/colum-height-outline.js":
/*!************************************************************************!*\
  !*** ./node_modules/@iconify/icons-ant-design/colum-height-outline.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path d=\"M840 836H184c-4.4 0-8 3.6-8 8v60c0 4.4 3.6 8 8 8h656c4.4 0 8-3.6 8-8v-60c0-4.4-3.6-8-8-8zm0-724H184c-4.4 0-8 3.6-8 8v60c0 4.4 3.6 8 8 8h656c4.4 0 8-3.6 8-8v-60c0-4.4-3.6-8-8-8zM610.8 378c6 0 9.4-7 5.7-11.7L515.7 238.7a7.14 7.14 0 0 0-11.3 0L403.6 366.3a7.23 7.23 0 0 0 5.7 11.7H476v268h-62.8c-6 0-9.4 7-5.7 11.7l100.8 127.5c2.9 3.7 8.5 3.7 11.3 0l100.8-127.5c3.7-4.7.4-11.7-5.7-11.7H548V378h62.8z\" fill=\"currentColor\"/>",
	"width": 1024,
	"height": 1024
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-dashicons/welcome-widgets-menus.js":
/*!************************************************************************!*\
  !*** ./node_modules/@iconify/icons-dashicons/welcome-widgets-menus.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path d=\"M19 16V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v13c0 .55.45 1 1 1h15c.55 0 1-.45 1-1zM4 4h13v4H4V4zm1 1v2h3V5H5zm4 0v2h3V5H9zm4 0v2h3V5h-3zm-8.5 5c.28 0 .5.22.5.5s-.22.5-.5.5s-.5-.22-.5-.5s.22-.5.5-.5zM6 10h4v1H6v-1zm6 0h5v5h-5v-5zm-7.5 2c.28 0 .5.22.5.5s-.22.5-.5.5s-.5-.22-.5-.5s.22-.5.5-.5zM6 12h4v1H6v-1zm7 0v2h3v-2h-3zm-8.5 2c.28 0 .5.22.5.5s-.22.5-.5.5s-.5-.22-.5-.5s.22-.5.5-.5zM6 14h4v1H6v-1z\" fill=\"currentColor\"/>",
	"width": 20,
	"height": 20
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-emojione-v1/bookmark-tabs.js":
/*!******************************************************************!*\
  !*** ./node_modules/@iconify/icons-emojione-v1/bookmark-tabs.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path fill=\"#d0d2d3\" d=\"M39.972 48.14c0 2.097-1.936 3.788-4.334 3.788H8.012c-2.395 0-4.334-1.691-4.334-3.788V14.01c0-2.092 1.938-3.789 4.334-3.789H35.64c2.396 0 4.334 1.696 4.334 3.789v34.13h-.002\"/><path fill=\"#fff\" d=\"M37.742 45.22c0 1.834-1.701 3.322-3.8 3.322H9.712c-2.1 0-3.801-1.488-3.801-3.322V15.284c0-1.833 1.702-3.318 3.801-3.318h24.23c2.099 0 3.8 1.486 3.8 3.318V45.22\"/><g fill=\"#34484c\"><path d=\"M10.702 20.01h21.56c1.446 0 1.446-1.963 0-1.963h-21.56c-1.451 0-1.451 1.963 0 1.963\"/><path d=\"M10.702 23.995h21.56c1.446 0 1.446-1.959 0-1.959h-21.56c-1.451 0-1.451 1.959 0 1.959\"/><path d=\"M10.702 28.07h21.56c1.446 0 1.446-1.961 0-1.961h-21.56c-1.451 0-1.451 1.961 0 1.961\"/><path d=\"M10.702 32.06h21.56c1.446 0 1.446-1.963 0-1.963h-21.56c-1.451-.002-1.451 1.963 0 1.963\"/><path d=\"M10.702 46.46h9.921c1.446 0 1.446-1.963 0-1.963h-9.921c-1.451 0-1.451 1.963 0 1.963\"/></g><path fill=\"#20afc3\" d=\"M21.482 11.966c0 3.078-2.556 5.575-5.702 5.575h-9.1c-3.149 0-5.702-2.497-5.702-5.575c0-3.079 2.552-5.573 5.702-5.573h9.09c3.147 0 5.703 2.494 5.703 5.573\"/><path fill=\"#d0d2d3\" d=\"M51.5 39.1c0 2.093-1.94 3.789-4.332 3.789H19.535c-2.392 0-4.332-1.696-4.332-3.789V4.97c0-2.09 1.94-3.786 4.332-3.786h27.633c2.392 0 4.332 1.696 4.332 3.786V39.1\"/><path fill=\"#fff\" d=\"M49.27 36.19c0 1.834-1.701 3.321-3.8 3.321H21.24c-2.098 0-3.798-1.487-3.798-3.321V6.251c0-1.833 1.7-3.316 3.798-3.316h24.23c2.099 0 3.8 1.485 3.8 3.316V36.19\"/><g fill=\"#34484c\"><path d=\"M22.22 10.972h21.556c1.452 0 1.452-1.961 0-1.961H22.22c-1.447 0-1.447 1.961 0 1.961\"/><path d=\"M22.22 14.959h21.556c1.452 0 1.452-1.963 0-1.963H22.22c-1.447 0-1.447 1.963 0 1.963\"/><path d=\"M22.22 19.03h21.556c1.452 0 1.452-1.963 0-1.963H22.22c-1.447 0-1.447 1.963 0 1.963\"/><path d=\"M22.22 23.02h21.556c1.452 0 1.452-1.961 0-1.961H22.22c-1.447 0-1.447 1.961 0 1.961\"/><path d=\"M22.22 37.424h9.922c1.446 0 1.446-1.963 0-1.963H22.22c-1.447 0-1.447 1.963 0 1.963\"/></g><path fill=\"#20afc3\" d=\"M33.35 33.03c0 3.079-2.555 5.575-5.701 5.575h-9.09c-3.152 0-5.703-2.496-5.703-5.575c0-3.078 2.55-5.572 5.703-5.572h9.09c3.147 0 5.701 2.494 5.701 5.572\"/><path fill=\"#d0d2d3\" d=\"M63.02 59.13c0 2.095-1.939 3.786-4.332 3.786H31.057c-2.395 0-4.336-1.691-4.336-3.786V25c0-2.092 1.941-3.789 4.336-3.789h27.632c2.394 0 4.331 1.695 4.331 3.789v34.13\"/><path fill=\"#fff\" d=\"M60.79 56.22c0 1.835-1.705 3.32-3.803 3.32h-24.23c-2.098 0-3.802-1.485-3.802-3.32V26.285c0-1.835 1.705-3.319 3.802-3.319h24.23c2.098 0 3.803 1.484 3.803 3.319V56.22\"/><g fill=\"#34484c\"><path d=\"M33.746 31.01h21.562c1.447 0 1.447-1.965 0-1.965H33.746c-1.447 0-1.447 1.965 0 1.965\"/><path d=\"M33.746 34.993h21.562c1.447 0 1.447-1.961 0-1.961H33.746c-1.447 0-1.447 1.961 0 1.961\"/><path d=\"M33.746 39.07h21.562c1.447 0 1.447-1.961 0-1.961H33.746c-1.447 0-1.447 1.961 0 1.961\"/><path d=\"M33.746 43.05h21.562c1.447 0 1.447-1.962 0-1.962H33.746c-1.447 0-1.447 1.962 0 1.962\"/><path d=\"M33.746 57.46h9.925c1.446 0 1.446-1.961 0-1.961h-9.925c-1.447 0-1.447 1.961 0 1.961\"/></g>",
	"width": 64,
	"height": 64
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-emojione/ab-button.js":
/*!***********************************************************!*\
  !*** ./node_modules/@iconify/icons-emojione/ab-button.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path d=\"M62 52c0 5.5-4.5 10-10 10H12C6.5 62 2 57.5 2 52V12C2 6.5 6.5 2 12 2h40c5.5 0 10 4.5 10 10v40z\" fill=\"#ff5a79\"/><g fill=\"#fff\"><path d=\"M28.1 45H32l-8.8-26h-4.4L10 45h3.9l3.1-9.1h8.1l3 9.1m-9.8-13l2.7-8.1l2.7 8.1h-5.4\"/><path d=\"M52 26.5c0-4.1-2.2-7.5-6-7.5H36v26h9.2c3.8 0 6.8-3.4 6.8-7.5c0-2.2-.8-4.1-2.2-5.5c1.4-1.4 2.2-3.3 2.2-5.5m-6.8 14.4h-5.6v-6.8h5.6c1.7 0 3.1 1.5 3.1 3.4c0 1.8-1.4 3.4-3.1 3.4m0-10.9h-5.6v-6.8h5.6c1.7 0 3.1 1.5 3.1 3.4S46.9 30 45.2 30\"/></g>",
	"width": 64,
	"height": 64
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-flat-color-icons/external.js":
/*!******************************************************************!*\
  !*** ./node_modules/@iconify/icons-flat-color-icons/external.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<circle fill=\"#B2DFDB\" cx=\"24\" cy=\"31\" r=\"14\"/><g fill=\"#009688\"><path d=\"M24 3.3L33 14H15z\"/><path d=\"M21 11h6v23h-6z\"/></g>",
	"width": 48,
	"height": 48
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-jam/users.js":
/*!**************************************************!*\
  !*** ./node_modules/@iconify/icons-jam/users.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path d=\"M5.534 12.57a1 1 0 1 1 .733 1.86A3.579 3.579 0 0 0 4 17.76v1.74a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1.647a3.658 3.658 0 0 0-2.356-3.419a1 1 0 1 1 .712-1.868A5.658 5.658 0 0 1 16 17.853V19.5a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-1.74a5.579 5.579 0 0 1 3.534-5.19zM9 2.5a4 4 0 0 1 4 4v2a4 4 0 1 1-8 0v-2a4 4 0 0 1 4-4zm0 2a2 2 0 0 0-2 2v2a2 2 0 1 0 4 0v-2a2 2 0 0 0-2-2zm9 17a1 1 0 0 1 0-2h1a1 1 0 0 0 1-1v-1.838a3.387 3.387 0 0 0-2.316-3.213a1 1 0 1 1 .632-1.898A5.387 5.387 0 0 1 22 16.662V18.5a3 3 0 0 1-3 3h-1zm-3-18a1 1 0 0 1 0-2a4 4 0 0 1 4 4v2a4 4 0 0 1-4 4a1 1 0 0 1 0-2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2z\" fill=\"currentColor\"/>",
	"width": 24,
	"height": 24
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-mdi/arrow-split-horizontal.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@iconify/icons-mdi/arrow-split-horizontal.js ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path d=\"M8 18h3v-3H2v-2h20v2h-9v3h3l-4 4l-4-4m4-16L8 6h3v3H2v2h20V9h-9V6h3l-4-4z\" fill=\"currentColor\"/>",
	"width": 24,
	"height": 24
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-mdi/table-row.js":
/*!******************************************************!*\
  !*** ./node_modules/@iconify/icons-mdi/table-row.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path d=\"M22 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4M4 14h4v-4H4v4m6 0h4v-4h-4v4m6 0h4v-4h-4v4z\" fill=\"currentColor\"/>",
	"width": 24,
	"height": 24
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-noto/bookmark-tabs.js":
/*!***********************************************************!*\
  !*** ./node_modules/@iconify/icons-noto/bookmark-tabs.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<linearGradient id=\"ssvg-id-bookmark-tabsa\" x1=\"65.332\" x2=\"65.332\" y1=\"10.969\" y2=\"124.38\" gradientUnits=\"userSpaceOnUse\"><stop stop-color=\"#fff\" offset=\"0\"/><stop stop-color=\"#FDFDFD\" offset=\".386\"/><stop stop-color=\"#F5F5F5\" offset=\".588\"/><stop stop-color=\"#E7E7E7\" offset=\".747\"/><stop stop-color=\"#D5D5D5\" offset=\".882\"/><stop stop-color=\"#BDBDBD\" offset=\"1\"/></linearGradient><path d=\"M102.24 123.88H28.42c-2.21 0-4-1.79-4-4V14.79c0-2.21 1.79-4 4-4h73.82c2.21 0 4 1.79 4 4v105.09c0 2.21-1.79 4-4 4z\" fill=\"url(#ssvg-id-bookmark-tabsa)\"/><path d=\"M102.24 13.64c.64 0 1.15.52 1.15 1.15v105.09c0 .64-.52 1.15-1.15 1.15H28.42c-.64 0-1.15-.52-1.15-1.15V14.79c0-.64.52-1.15 1.15-1.15h73.82m0-2.85H28.42c-2.21 0-4 1.79-4 4v105.09c0 2.21 1.79 4 4 4h73.82c2.21 0 4-1.79 4-4V14.79c0-2.2-1.79-4-4-4z\" fill=\"#424242\" opacity=\".2\"/><linearGradient id=\"ssvg-id-bookmark-tabsb\" x1=\"84.916\" x2=\"119.97\" y1=\"99.397\" y2=\"99.397\" gradientUnits=\"userSpaceOnUse\"><stop stop-color=\"#E0E0E0\" offset=\".013\"/><stop stop-color=\"#EAEAEA\" offset=\".094\"/><stop stop-color=\"#F6F6F6\" offset=\".249\"/><stop stop-color=\"#FDFDFD\" offset=\".463\"/><stop stop-color=\"#fff\" offset=\"1\"/></linearGradient><path fill=\"url(#ssvg-id-bookmark-tabsb)\" d=\"M84.92 93.26h35.06v12.27H84.92z\"/><path fill=\"#4480F7\" d=\"M103.51 93.26h16.47v12.27h-16.47z\"/><path d=\"M117.78 95.45v7.89H87.11v-7.89h30.67m2.19-2.19H84.92v12.27h35.06V93.26h-.01z\" fill=\"#757575\" opacity=\".2\"/><linearGradient id=\"ssvg-id-bookmark-tabsc\" x1=\"84.916\" x2=\"119.97\" y1=\"41.803\" y2=\"41.803\" gradientUnits=\"userSpaceOnUse\"><stop stop-color=\"#E0E0E0\" offset=\".013\"/><stop stop-color=\"#EAEAEA\" offset=\".094\"/><stop stop-color=\"#F6F6F6\" offset=\".249\"/><stop stop-color=\"#FDFDFD\" offset=\".463\"/><stop stop-color=\"#fff\" offset=\"1\"/></linearGradient><path fill=\"url(#ssvg-id-bookmark-tabsc)\" d=\"M84.92 35.67h35.06v12.27H84.92z\"/><path fill=\"#FBBE00\" d=\"M103.51 35.67h16.47v12.27h-16.47z\"/><path d=\"M117.78 37.86v7.89H87.11v-7.89h30.67m2.19-2.19H84.92v12.27h35.06V35.67h-.01z\" fill=\"#757575\" opacity=\".2\"/><linearGradient id=\"ssvg-id-bookmark-tabsd\" x1=\"52.444\" x2=\"52.444\" y1=\"4.17\" y2=\"114.61\" gradientUnits=\"userSpaceOnUse\"><stop stop-color=\"#fff\" offset=\"0\"/><stop stop-color=\"#FDFDFD\" offset=\".386\"/><stop stop-color=\"#F5F5F5\" offset=\".588\"/><stop stop-color=\"#E7E7E7\" offset=\".747\"/><stop stop-color=\"#D5D5D5\" offset=\".882\"/><stop stop-color=\"#BDBDBD\" offset=\"1\"/></linearGradient><path d=\"M91.35 114.13H13.54c-2.21 0-4-1.79-4-4V8c0-2.21 1.79-4 4-4h77.81c2.21 0 4 1.79 4 4v102.13c0 2.21-1.79 4-4 4z\" fill=\"url(#ssvg-id-bookmark-tabsd)\"/><path d=\"M91.35 6.88c.62 0 1.12.5 1.12 1.12v102.13c0 .62-.5 1.12-1.12 1.12H13.54c-.62 0-1.12-.5-1.12-1.12V8c0-.62.5-1.12 1.12-1.12h77.81m0-2.88H13.54c-2.21 0-4 1.79-4 4v102.13c0 2.21 1.79 4 4 4h77.81c2.21 0 4-1.79 4-4V8c0-2.21-1.79-4-4-4z\" fill=\"#424242\" opacity=\".2\"/><g fill=\"none\" stroke=\"#757575\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-miterlimit=\"10\" stroke-width=\"3.797\"><path d=\"M21.6 30.48h61.69\"/><path d=\"M21.6 44.25h61.69\"/><path d=\"M21.6 58.03h61.69\"/><path d=\"M21.6 71.81h61.69\"/><path d=\"M21.6 85.58h26.38\"/></g><linearGradient id=\"ssvg-id-bookmark-tabse\" x1=\"78.71\" x2=\"113.77\" y1=\"19.988\" y2=\"19.988\" gradientUnits=\"userSpaceOnUse\"><stop stop-color=\"#E0E0E0\" offset=\".013\"/><stop stop-color=\"#EAEAEA\" offset=\".094\"/><stop stop-color=\"#F6F6F6\" offset=\".249\"/><stop stop-color=\"#FDFDFD\" offset=\".463\"/><stop stop-color=\"#fff\" offset=\"1\"/></linearGradient><path fill=\"url(#ssvg-id-bookmark-tabse)\" d=\"M78.71 13.85h35.06v12.27H78.71z\"/><path fill=\"#EC4431\" d=\"M97.3 13.85h16.47v12.27H97.3z\"/><path d=\"M111.58 16.04v7.89H80.9v-7.89h30.68m2.19-2.19H78.71v12.27h35.06V13.85z\" fill=\"#757575\" opacity=\".2\"/><linearGradient id=\"ssvg-id-bookmark-tabsf\" x1=\"78.71\" x2=\"113.77\" y1=\"72.882\" y2=\"72.882\" gradientUnits=\"userSpaceOnUse\"><stop stop-color=\"#E0E0E0\" offset=\".013\"/><stop stop-color=\"#EAEAEA\" offset=\".094\"/><stop stop-color=\"#F6F6F6\" offset=\".249\"/><stop stop-color=\"#FDFDFD\" offset=\".463\"/><stop stop-color=\"#fff\" offset=\"1\"/></linearGradient><path fill=\"url(#ssvg-id-bookmark-tabsf)\" d=\"M78.71 66.75h35.06v12.27H78.71z\"/><path fill=\"#2CA94F\" d=\"M97.3 66.75h16.47v12.27H97.3z\"/><path d=\"M111.58 68.94v7.89H80.9v-7.89h30.68m2.19-2.19H78.71v12.27h35.06V66.75z\" fill=\"#757575\" opacity=\".2\"/>",
	"width": 128,
	"height": 128
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-si-glyph/layout-4.js":
/*!**********************************************************!*\
  !*** ./node_modules/@iconify/icons-si-glyph/layout-4.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<g fill=\"currentColor\" fill-rule=\"evenodd\"><path d=\"M10.956 6.326c0 .35-.299.632-.669.632H1.689c-.371 0-.67-.282-.67-.632V.633c0-.35.299-.633.67-.633h8.598c.37 0 .669.283.669.633v5.693z\"/><path d=\"M17 15.333a.669.669 0 0 1-.671.667H7.714a.668.668 0 0 1-.671-.667V8.666c0-.368.3-.666.671-.666h8.615c.37 0 .671.298.671.666v6.667z\"/><path d=\"M5.976 15.333c0 .369-.3.667-.668.667H1.691a.668.668 0 0 1-.671-.667V8.666c0-.368.299-.666.671-.666h3.617c.368 0 .668.298.668.666v6.667z\"/><path d=\"M17 6.345c0 .351-.324.634-.726.634h-3.528c-.398 0-.723-.283-.723-.634V.635c0-.352.324-.635.723-.635h3.528c.401 0 .726.283.726.635v5.71z\"/></g>",
	"width": 17,
	"height": 16
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-whh/quote.js":
/*!**************************************************!*\
  !*** ./node_modules/@iconify/icons-whh/quote.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path d=\"M855.048 768h-87l-256 256V768h-343q-57 0-113-57t-56-115V172q0-58 56-115t113-57h686q57 0 113 57t56 115v424q0 58-56 115t-113 57zm-407-384q0-27-18.5-45.5t-45.5-18.5h-64v-64h32q13 0 22.5-9.5t9.5-22.5t-9.5-22.5t-22.5-9.5h-96q-26 0-45 19t-19 45v256q0 26 19 45t45 19h128q26 0 45-19t19-45V384zm384 0q0-27-19-45.5t-45-18.5h-64v-64h32q13 0 22.5-9.5t9.5-22.5t-9.5-22.5t-22.5-9.5h-96q-27 0-45.5 19t-18.5 45v256q0 26 18.5 45t45.5 19h128q26 0 45-18.5t19-45.5V384z\" fill=\"currentColor\"/>",
	"width": 1025,
	"height": 1024
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/icons-wpf/search.js":
/*!***************************************************!*\
  !*** ./node_modules/@iconify/icons-wpf/search.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var data = {
	"body": "<path d=\"M10 .188A9.812 9.812 0 0 0 .187 10A9.812 9.812 0 0 0 10 19.813c2.29 0 4.393-.811 6.063-2.125l.875.875a1.845 1.845 0 0 0 .343 2.156l4.594 4.625c.713.714 1.88.714 2.594 0l.875-.875a1.84 1.84 0 0 0 0-2.594l-4.625-4.594a1.824 1.824 0 0 0-2.157-.312l-.875-.875A9.812 9.812 0 0 0 10 .188zM10 2a8 8 0 1 1 0 16a8 8 0 0 1 0-16zM4.937 7.469a5.446 5.446 0 0 0-.812 2.875a5.46 5.46 0 0 0 5.469 5.469a5.516 5.516 0 0 0 3.156-1a7.166 7.166 0 0 1-.75.03a7.045 7.045 0 0 1-7.063-7.062c0-.104-.005-.208 0-.312z\" fill=\"currentColor\"/>",
	"width": 26,
	"height": 26
};
exports.__esModule = true;
exports.default = data;


/***/ }),

/***/ "./node_modules/@iconify/react/dist/icon.js":
/*!**************************************************!*\
  !*** ./node_modules/@iconify/react/dist/icon.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = exports.InlineIcon = exports.Icon = void 0;

var _react = _interopRequireDefault(__webpack_require__(/*! react */ "./node_modules/react/index.js"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Unique id counter
 *
 * @type {number}
 */
var idCounter = 0;
/**
 * Regex used to split dimensions
 *
 * @type {RegExp}
 * @private
 */

var unitsSplit = /(-?[0-9.]*[0-9]+[0-9.]*)/g;
var unitsTest = /^-?[0-9.]*[0-9]+[0-9.]*$/g;
/**
 * Attributes used for icon
 *
 * @type {string[]}
 */

var iconAttributes = ['width', 'height', 'inline', 'hFlip', 'vFlip', 'flip', 'rotate', 'align', 'color', 'box'];
/**
 * Default attribute values
 *
 * @type {object}
 */

var defaultAttributes = {
  left: 0,
  top: 0,
  width: 16,
  height: 16,
  rotate: 0,
  hFlip: false,
  vFlip: false
};
/**
 * Add missing properties to icon
 *
 * Important: in PHP version of this library this function is part of Collection class: Collection::addMissingAttributes()
 *
 * JavaScript version uses separate file so this function could be used in React and other components without loading
 * entire Collection class.
 *
 * @param {object} data
 * @return {object}
 */

function normalize(data) {
  var item = Object.assign(Object.create(null), defaultAttributes, data);

  if (item.inlineTop === void 0) {
    item.inlineTop = item.top;
  }

  if (item.inlineHeight === void 0) {
    item.inlineHeight = item.height;
  }

  if (item.verticalAlign === void 0) {
    // -0.143 if icon is designed for 14px height,
    // otherwise assume icon is designed for 16px height
    item.verticalAlign = item.height % 7 === 0 && item.height % 8 !== 0 ? -0.143 : -0.125;
  }

  return item;
}
/**
 * Get preserveAspectRatio attribute value
 *
 * @param {object} align
 * @return {string}
 * @private
 */


function getAlignment(align) {
  var result;

  switch (align.horizontal) {
    case 'left':
      result = 'xMin';
      break;

    case 'right':
      result = 'xMax';
      break;

    default:
      result = 'xMid';
  }

  switch (align.vertical) {
    case 'top':
      result += 'YMin';
      break;

    case 'bottom':
      result += 'YMax';
      break;

    default:
      result += 'YMid';
  }

  result += align.slice ? ' slice' : ' meet';
  return result;
}
/**
 * SVG class
 *
 * @see @iconify/json-tools/src/svg.js
 */


var SVG =
/*#__PURE__*/
function () {
  /**
   * Constructor
   *
   * @param icon Icon data
   *  Use Collection.getIconData() to retrieve icon data
   */
  function SVG(icon) {
    _classCallCheck(this, SVG);

    this._item = icon;
  }
  /**
   * Get SVG attributes
   *
   * @param {object} props Custom properties (same as query string in Iconify API)
   * @returns {string}
   */


  _createClass(SVG, [{
    key: "getAttributes",
    value: function getAttributes(props) {
      var item = this._item;

      if (_typeof(props) !== 'object') {
        props = Object.create(null);
      } // Set data


      var align = {
        horizontal: 'center',
        vertical: 'middle',
        slice: false
      };
      var transform = {
        rotate: item.rotate,
        hFlip: item.hFlip,
        vFlip: item.vFlip
      };
      var style = Object.create(null);
      var attributes = Object.create(null); // Get width/height

      var inline = props.inline === true || props.inline === 'true' || props.inline === '1';
      var box = {
        left: item.left,
        top: inline ? item.inlineTop : item.top,
        width: item.width,
        height: inline ? item.inlineHeight : item.height
      }; // Transformations

      ['hFlip', 'vFlip'].forEach(function (key) {
        if (props[key] !== void 0 && (props[key] === true || props[key] === 'true' || props[key] === '1')) {
          transform[key] = !transform[key];
        }
      });

      if (props.flip !== void 0) {
        props.flip.toLowerCase().split(/[\s,]+/).forEach(function (value) {
          switch (value) {
            case 'horizontal':
              transform.hFlip = !transform.hFlip;
              break;

            case 'vertical':
              transform.vFlip = !transform.vFlip;
          }
        });
      }

      if (props.rotate !== void 0) {
        var value = props.rotate;

        if (typeof value === 'number') {
          transform.rotate += value;
        } else if (typeof value === 'string') {
          var units = value.replace(/^-?[0-9.]*/, '');

          if (units === '') {
            value = parseInt(value);

            if (!isNaN(value)) {
              transform.rotate += value;
            }
          } else if (units !== value) {
            var split = false;

            switch (units) {
              case '%':
                // 25% -> 1, 50% -> 2, ...
                split = 25;
                break;

              case 'deg':
                // 90deg -> 1, 180deg -> 2, ...
                split = 90;
            }

            if (split) {
              value = parseInt(value.slice(0, value.length - units.length));

              if (!isNaN(value)) {
                transform.rotate += Math.round(value / split);
              }
            }
          }
        }
      } // Apply transformations to box


      var transformations = [],
          tempValue;

      if (transform.hFlip) {
        if (transform.vFlip) {
          transform.rotate += 2;
        } else {
          // Horizontal flip
          transformations.push('translate(' + (box.width + box.left) + ' ' + (0 - box.top) + ')');
          transformations.push('scale(-1 1)');
          box.top = box.left = 0;
        }
      } else if (transform.vFlip) {
        // Vertical flip
        transformations.push('translate(' + (0 - box.left) + ' ' + (box.height + box.top) + ')');
        transformations.push('scale(1 -1)');
        box.top = box.left = 0;
      }

      switch (transform.rotate % 4) {
        case 1:
          // 90deg
          tempValue = box.height / 2 + box.top;
          transformations.unshift('rotate(90 ' + tempValue + ' ' + tempValue + ')'); // swap width/height and x/y

          if (box.left !== 0 || box.top !== 0) {
            tempValue = box.left;
            box.left = box.top;
            box.top = tempValue;
          }

          if (box.width !== box.height) {
            tempValue = box.width;
            box.width = box.height;
            box.height = tempValue;
          }

          break;

        case 2:
          // 180deg
          transformations.unshift('rotate(180 ' + (box.width / 2 + box.left) + ' ' + (box.height / 2 + box.top) + ')');
          break;

        case 3:
          // 270deg
          tempValue = box.width / 2 + box.left;
          transformations.unshift('rotate(-90 ' + tempValue + ' ' + tempValue + ')'); // swap width/height and x/y

          if (box.left !== 0 || box.top !== 0) {
            tempValue = box.left;
            box.left = box.top;
            box.top = tempValue;
          }

          if (box.width !== box.height) {
            tempValue = box.width;
            box.width = box.height;
            box.height = tempValue;
          }

          break;
      } // Calculate dimensions
      // Values for width/height: null = default, 'auto' = from svg, false = do not set
      // Default: if both values aren't set, height defaults to '1em', width is calculated from height


      var customWidth = props.width ? props.width : null;
      var customHeight = props.height ? props.height : null;
      var width, height;

      if (customWidth === null && customHeight === null) {
        customHeight = '1em';
      }

      if (customWidth !== null && customHeight !== null) {
        width = customWidth;
        height = customHeight;
      } else if (customWidth !== null) {
        width = customWidth;
        height = SVG.calculateDimension(width, box.height / box.width);
      } else {
        height = customHeight;
        width = SVG.calculateDimension(height, box.width / box.height);
      }

      if (width !== false) {
        attributes.width = width === 'auto' ? box.width : width;
      }

      if (height !== false) {
        attributes.height = height === 'auto' ? box.height : height;
      } // Add vertical-align for inline icon


      if (inline && item.verticalAlign !== 0) {
        style['vertical-align'] = item.verticalAlign + 'em';
      } // Check custom alignment


      if (props.align !== void 0) {
        props.align.toLowerCase().split(/[\s,]+/).forEach(function (value) {
          switch (value) {
            case 'left':
            case 'right':
            case 'center':
              align.horizontal = value;
              break;

            case 'top':
            case 'bottom':
            case 'middle':
              align.vertical = value;
              break;

            case 'crop':
              align.slice = true;
              break;

            case 'meet':
              align.slice = false;
          }
        });
      } // Generate viewBox and preserveAspectRatio attributes


      attributes.preserveAspectRatio = getAlignment(align);
      attributes.viewBox = box.left + ' ' + box.top + ' ' + box.width + ' ' + box.height; // Generate body

      var body = SVG.replaceIDs(item.body);

      if (props.color !== void 0) {
        body = body.replace(/currentColor/g, props.color);
      }

      if (transformations.length) {
        body = '<g transform="' + transformations.join(' ') + '">' + body + '</g>';
      }

      if (props.box === true || props.box === 'true' || props.box === '1') {
        // Add transparent bounding box
        body += '<rect x="' + box.left + '" y="' + box.top + '" width="' + box.width + '" height="' + box.height + '" fill="rgba(0, 0, 0, 0)" />';
      }

      return {
        attributes: attributes,
        body: body,
        style: style
      };
    }
    /**
     * Generate SVG
     *
     * @param {object} props Custom properties (same as query string in Iconify API)
     * @param {boolean} [addExtra] True if extra attributes should be added to SVG.
     *  Due to lack of functions in JavaScript for escaping attributes, it is your job to make sure key and value are both properly escaped. Default value is false.
     * @returns {string}
     */

  }, {
    key: "getSVG",
    value: function getSVG(props, addExtra) {
      var attributes = SVG.splitAttributes(props),
          data = this.getAttributes(attributes.icon);
      var svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"'; // Add extra attributes - assume that their names and values are escaped

      if (addExtra) {
        Object.keys(attributes.node).forEach(function (attr) {
          svg += ' ' + attr + '="' + attributes.node[attr] + '"';
        });
      } // Add SVG attributes


      Object.keys(data.attributes).forEach(function (attr) {
        svg += ' ' + attr + '="' + data.attributes[attr] + '"';
      }); // Add style with 360deg transformation to style to prevent subpixel rendering bug

      svg += ' style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);';
      Object.keys(data.style).forEach(function (attr) {
        svg += ' ' + attr + ': ' + data.style[attr] + ';';
      });

      if (props && props.style !== void 0) {
        svg += props.style;
      }

      svg += '">';
      svg += data.body + '</svg>';
      return svg;
    }
    /**
     * Split attributes
     *
     * @param props
     * @return {{icon: {}, node: {}}}
     */

  }], [{
    key: "splitAttributes",
    value: function splitAttributes(props) {
      var result = {
        icon: Object.create(null),
        node: Object.create(null)
      };
      Object.keys(props).forEach(function (name) {
        result[iconAttributes.indexOf(name) === -1 ? 'node' : 'icon'][name] = props[name];
      });
      return result;
    }
    /**
     * Calculate second dimension when only 1 dimension is set
     *
     * @param {string|number} size One dimension (such as width)
     * @param {number} ratio Width/height ratio.
     *      If size == width, ratio = height/width
     *      If size == height, ratio = width/height
     * @param {number} [precision] Floating number precision in result to minimize output. Default = 100
     * @return {string|number|null} Another dimension, null on error
     */

  }, {
    key: "calculateDimension",
    value: function calculateDimension(size, ratio, precision) {
      if (ratio === 1) {
        return size;
      }

      precision = precision === void 0 ? 100 : precision;

      if (typeof size === 'number') {
        return Math.ceil(size * ratio * precision) / precision;
      } // split code into sets of strings and numbers


      var split = size.split(unitsSplit);

      if (split === null || !split.length) {
        return null;
      }

      var results = [],
          code = split.shift(),
          isNumber = unitsTest.test(code),
          num;

      while (true) {
        if (isNumber) {
          num = parseFloat(code);

          if (isNaN(num)) {
            results.push(code);
          } else {
            results.push(Math.ceil(num * ratio * precision) / precision);
          }
        } else {
          results.push(code);
        } // next


        code = split.shift();

        if (code === void 0) {
          return results.join('');
        }

        isNumber = !isNumber;
      }
    }
    /**
     * Replace IDs in SVG output with unique IDs
     * Fast replacement without parsing XML, assuming commonly used patterns.
     *
     * @param {string} body
     * @return {string}
     */

  }, {
    key: "replaceIDs",
    value: function replaceIDs(body) {
      var regex = /\sid="(\S+)"/g,
          ids = [],
          match,
          prefix;

      function strReplace(search, replace, subject) {
        var pos = 0;

        while ((pos = subject.indexOf(search, pos)) !== -1) {
          subject = subject.slice(0, pos) + replace + subject.slice(pos + search.length);
          pos += replace.length;
        }

        return subject;
      } // Find all IDs


      while (match = regex.exec(body)) {
        ids.push(match[1]);
      }

      if (!ids.length) {
        return body;
      }

      prefix = 'IconifyId-' + Date.now().toString(16) + '-' + (Math.random() * 0x1000000 | 0).toString(16) + '-'; // Replace with unique ids

      ids.forEach(function (id) {
        var newID = prefix + idCounter;
        idCounter++;
        body = strReplace('="' + id + '"', '="' + newID + '"', body);
        body = strReplace('="#' + id + '"', '="#' + newID + '"', body);
        body = strReplace('(#' + id + ')', '(#' + newID + ')', body);
      });
      return body;
    }
  }]);

  return SVG;
}();
/**
 * Create React component with SVG data
 *
 * @param {object} props
 * @param {boolean} inline
 * @return {null|React.Component}
 */


function component(props, inline) {
  if (_typeof(props.icon) !== 'object') {
    return null;
  } // Split properties into SVG properties and icon properties


  var split = SVG.splitAttributes(props),
      iconProps = split.icon,
      customAttributes = split.node;
  delete customAttributes.icon; // Set default inline value

  if (iconProps.inline === void 0) {
    iconProps.inline = inline;
  } // Get SVG data


  var svg = new SVG(normalize(props.icon));
  var iconData = svg.getAttributes(iconProps); // Set style

  var style = {
    transform: 'rotate(360deg)'
  };

  if (iconData.style['vertical-align'] !== void 0) {
    style.verticalAlign = iconData.style['vertical-align'];
  }

  if (props.style !== void 0) {
    style = Object.assign(style, props.style);
  } // Generate element attributes


  var attributes = Object.assign({
    xmlns: 'http://www.w3.org/2000/svg',
    focusable: false,
    style: style
  }, customAttributes, iconData.attributes);
  attributes.dangerouslySetInnerHTML = {
    __html: iconData.body
  }; // Generate SVG

  return _react["default"].createElement('svg', attributes, null);
}
/**
 * Icon without vertical alignment
 *
 * @param {object} props
 * @return {React.Component}
 * @constructor
 */


var Icon = function Icon(props) {
  return component(props, false);
};
/**
 * Icon with vertical alignment
 *
 * @param {object} props
 * @return {React.Component}
 * @constructor
 */


exports.Icon = Icon;

var InlineIcon = function InlineIcon(props) {
  return component(props, true);
};
/**
 * Default export
 */


exports.InlineIcon = InlineIcon;
var _default = Icon;
exports["default"] = _default;

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/style.scss":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/style.scss ***!
  \*********************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, "div.awesome-blocks-background .awesome-blocks-bg_button {\n  margin: 10px 0;\n  width: 100%;\n  height: 100px;\n  background: #f7f7f7;\n  text-align: center;\n  position: relative;\n  background-position: center center;\n  background-size: cover;\n  border-radius: 2px;\n  border: 1px solid #fff;\n  box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.3); }\n  div.awesome-blocks-background .awesome-blocks-bg_button .bg_button {\n    position: absolute;\n    height: 100%;\n    width: 100%;\n    left: 0px;\n    background: transparent;\n    line-height: 100px;\n    color: #555;\n    text-decoration: none;\n    opacity: 0.5;\n    text-shadow: 0px 0px 1px #FFFFFF, 0px 0px 2px #FFFFFF;\n    transition: color 0.5s, opacity 0.5s; }\n  div.awesome-blocks-background .awesome-blocks-bg_button:HOVER .bg_button {\n    color: #555;\n    opacity: 1; }\n  div.awesome-blocks-background .awesome-blocks-bg_button .remove {\n    position: absolute;\n    height: 20px;\n    width: 20px;\n    line-height: 20px;\n    right: 10px;\n    top: 10px;\n    background: transparent;\n    text-decoration: none;\n    border-radius: 20px;\n    font-size: 12px;\n    color: #888; }\n    div.awesome-blocks-background .awesome-blocks-bg_button .remove:HOVER {\n      background: #888;\n      color: #FFFFFF;\n      -ms-transform: scale(1.2, 1.2);\n      /* IE 9 */\n      -webkit-transform: scale(1.2, 1.2);\n      /* Chrome, Safari, Opera */\n      transform: scale(1.2, 1.2); }\n\ndiv.awesome-blocks-background .background-options {\n  display: flex; }\n  div.awesome-blocks-background .background-options > * {\n    width: 50%;\n    margin: 10px 5px; }\n\ndiv.awesome-blocks-background .bg_image {\n  width: 100%; }\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/awesome-blocks-options/style.scss":
/*!**************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/awesome-blocks-options/style.scss ***!
  \**************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, "#editor .react-appended-modal-popup .modal-container {\n  box-shadow: 0 0 40px rgba(0, 0, 0, 0.4), 0 0 20px rgba(0, 0, 0, 0.4);\n  overflow: hidden; }\n  #editor .react-appended-modal-popup .modal-container .modal-header {\n    border-bottom: none;\n    padding: 0; }\n  #editor .react-appended-modal-popup .modal-container .modal-body {\n    overflow: hidden;\n    overflow-y: auto; }\n    #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-classes {\n      width: calc(100% - 30px);\n      margin: 0 auto; }\n    #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset div.options-checkbox {\n      padding: 0 10px;\n      box-sizing: border-box;\n      width: 50%;\n      margin: 5px 0;\n      display: inline-block; }\n      #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset div.options-checkbox input[type=\"checkbox\"] {\n        border: 1px solid #CCCCCC; }\n        #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset div.options-checkbox input[type=\"checkbox\"]:checked {\n          border: 1px solid #00AE39; }\n          #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset div.options-checkbox input[type=\"checkbox\"]:checked + label {\n            color: #00AE39; }\n    #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset .components-range-control.with_unit {\n      margin: 0;\n      display: inline-block;\n      width: calc( 100% - 80px); }\n    #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset .unit_container.for_range {\n      display: inline-block; }\n      #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset .unit_container.for_range select {\n        width: 100%;\n        margin-top: -25px; }\n    #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset .scroll-options {\n      padding: 10px;\n      margin-bottom: 10px;\n      border-bottom: 1px solid #EEEEEE; }\n      #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset .scroll-options > div,\n      #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset .scroll-options > select {\n        display: inline-block;\n        width: 70%;\n        box-sizing: border-box;\n        margin: 0;\n        height: 50px; }\n      #editor .react-appended-modal-popup .modal-container .modal-body fieldset.react-fieldset .scroll-options select {\n        margin-left: 10px;\n        width: calc(30% - 10px);\n        height: 28px;\n        vertical-align: bottom; }\n    #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div {\n      display: block;\n      width: 50%;\n      padding: 5px;\n      box-sizing: border-box;\n      float: left; }\n      @media screen and (max-width: 950px) {\n        #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div {\n          width: 100%;\n          float: none; } }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .react-fieldset {\n        display: block; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .editor-panel-color-settings {\n        width: 100%; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout input, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .unit {\n        position: absolute;\n        text-align: center;\n        padding: 3px 0;\n        height: 24px;\n        width: 45px;\n        margin: 0;\n        font-size: 12px;\n        line-height: 12px; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout span.unit, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .unit {\n        text-align: left;\n        padding-left: 5px;\n        line-height: 20px;\n        width: 50px; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .margin, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .border, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .padding, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .content {\n        margin: 55px;\n        position: relative;\n        border: 1px solid #DDD; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .margin {\n        border: 1px solid #FFF; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .margin {\n        margin: 0;\n        padding: 0; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .margin_top, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .border_top_width, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .padding_top {\n        top: 5px;\n        left: 50%;\n        margin-left: -45px; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .unit {\n        top: 5px;\n        left: 50%; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .margin_right, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .border_right_width, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .padding_right {\n        top: 50%;\n        right: 5px;\n        margin-top: -12px; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .margin_bottom, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .border_bottom_width, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .padding_bottom {\n        bottom: 5px;\n        left: 50%;\n        margin-left: -17px; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .margin_left, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .border_left_width, #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .padding_left {\n        top: 50%;\n        left: 5px;\n        margin-top: -12px; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout label {\n        display: inline-block;\n        position: absolute;\n        font-size: 11px;\n        line-height: 9px;\n        top: 6px;\n        left: 5px;\n        color: #2C2C2C;\n        margin: 0;\n        padding: 0; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .content {\n        border: none;\n        height: 30px;\n        padding: 0px;\n        text-align: center;\n        font-size: 10px;\n        line-height: 11px;\n        -webkit-box-sizing: border-box;\n        box-sizing: border-box; }\n      #editor .react-appended-modal-popup .modal-container .modal-body .awesome-blocks-styles > div .layout .content .help-tip {\n        left: 40%; }\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/openstreetmap/style.scss":
/*!*****************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/openstreetmap/style.scss ***!
  \*****************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, ".fullScreen-activated {\n  height: 150vh;\n  left: 0; }\n\ndiv.react-opensstreetmap-leaflet {\n  position: relative;\n  overflow: hidden;\n  width: 100%;\n  height: 100%; }\n  div.react-opensstreetmap-leaflet .awesome-blocks-map {\n    position: relative;\n    height: 100%;\n    width: 100%;\n    top: 0;\n    left: 0;\n    right: 0;\n    bottom: 0; }\n    div.react-opensstreetmap-leaflet .awesome-blocks-map button.save-button,\n    div.react-opensstreetmap-leaflet .awesome-blocks-map button.add-marker,\n    div.react-opensstreetmap-leaflet .awesome-blocks-map button.fullscreen-button {\n      display: block;\n      position: absolute;\n      top: 10px;\n      right: 10px;\n      width: 30px;\n      height: 30px;\n      border-radius: 50%;\n      z-index: 15;\n      overflow: hidden;\n      padding: 0 5px;\n      border: 1px solid rgba(255, 255, 255, 0.5);\n      background-color: #0085ba;\n      color: #FFF;\n      box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);\n      transform: scale(0.8);\n      cursor: pointer;\n      transition: transform 0.3s ease-out; }\n      div.react-opensstreetmap-leaflet .awesome-blocks-map button.save-button:not(.disabled):not(.add-marker):hover,\n      div.react-opensstreetmap-leaflet .awesome-blocks-map button.add-marker:not(.disabled):not(.add-marker):hover,\n      div.react-opensstreetmap-leaflet .awesome-blocks-map button.fullscreen-button:not(.disabled):not(.add-marker):hover {\n        background-color: #005D82;\n        transform: scale(1); }\n      div.react-opensstreetmap-leaflet .awesome-blocks-map button.save-button i,\n      div.react-opensstreetmap-leaflet .awesome-blocks-map button.add-marker i,\n      div.react-opensstreetmap-leaflet .awesome-blocks-map button.fullscreen-button i {\n        display: block;\n        height: 20px;\n        width: 20px;\n        font-size: 16px;\n        line-height: 20px; }\n    div.react-opensstreetmap-leaflet .awesome-blocks-map button.fullscreen-button {\n      top: 40px;\n      background-color: #EE8700; }\n      div.react-opensstreetmap-leaflet .awesome-blocks-map button.fullscreen-button:hover {\n        background-color: #F0A036;\n        transform: scale(1); }\n    div.react-opensstreetmap-leaflet .awesome-blocks-map button.add-marker {\n      background-color: #00BA49;\n      top: 80px; }\n      div.react-opensstreetmap-leaflet .awesome-blocks-map button.add-marker:hover {\n        background-color: #00983B;\n        transform: scale(1); }\n    div.react-opensstreetmap-leaflet .awesome-blocks-map button.save-button.disabled {\n      background-color: #AAA;\n      color: #FFF;\n      cursor: not-allowed; }\n    div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers {\n      position: absolute;\n      top: 0;\n      left: 100%;\n      width: 50%;\n      min-width: 300px;\n      max-width: 400px;\n      height: 100%;\n      z-index: 16; }\n      div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker {\n        position: absolute;\n        padding: 10px;\n        width: 100%;\n        height: 100%;\n        top: 0;\n        left: -100%;\n        font-size: 0.9rem;\n        background-color: rgba(255, 255, 255, 0.75);\n        border: 1px solid rgba(255, 255, 255, 0.95);\n        overflow-y: scroll;\n        overflow-x: hidden;\n        transform: scaleX(0);\n        transform-origin: right;\n        transition: transform 0.2s, opacity 0.3s 0.2s;\n        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); }\n        div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker.show {\n          opacity: 1;\n          transform: scaleX(1);\n          transition: transform 0.2s, opacity 0.7s; }\n        div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker span.info {\n          display: block;\n          font-size: 12px;\n          color: #555; }\n        div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .close-editor,\n        div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .remove-marker {\n          margin-bottom: 5px;\n          width: 30px;\n          padding: 0;\n          border-radius: 50%;\n          border: none;\n          background-color: #11A0D2;\n          height: 30px;\n          cursor: pointer;\n          color: #FFF; }\n          div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .close-editor i,\n          div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .remove-marker i {\n            font-size: 20px;\n            line-height: 24px; }\n          div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .close-editor:hover,\n          div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .remove-marker:hover {\n            background-color: #278AAD; }\n        div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .remove-marker {\n          background-color: #FF8A8A; }\n          div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .remove-marker:hover {\n            background-color: #FF5F5F; }\n        div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .marker-icon-type {\n          text-align: center; }\n          div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .marker-icon-type svg {\n            width: 40px;\n            height: 40px;\n            cursor: pointer;\n            margin: 10px 3px;\n            padding: 5px;\n            border-radius: 3px;\n            border: 1px solid rgba(0, 0, 0, 0.1);\n            transition: all 0.3s ease-out; }\n            div.react-opensstreetmap-leaflet .awesome-blocks-map .edit-markers .edit-marker .marker-icon-type svg:hover {\n              background-color: rgba(0, 0, 0, 0.1); }\n  div.react-opensstreetmap-leaflet__loading {\n    display: none; }\n    div.react-opensstreetmap-leaflet__loading.show-loading, div.react-opensstreetmap-leaflet__loading.show-success, div.react-opensstreetmap-leaflet__loading.show-error {\n      position: absolute;\n      display: block;\n      top: 0;\n      left: 0;\n      right: 0;\n      bottom: 0;\n      width: 100%;\n      height: 100%;\n      z-index: 20;\n      transition: background-color 0.5s; }\n      div.react-opensstreetmap-leaflet__loading.show-loading .loading__icon, div.react-opensstreetmap-leaflet__loading.show-success .loading__icon, div.react-opensstreetmap-leaflet__loading.show-error .loading__icon {\n        position: absolute;\n        display: inline-block;\n        width: 120px;\n        height: 120px;\n        top: 50%;\n        left: 50%;\n        transform: translate(-50%, -50%); }\n        div.react-opensstreetmap-leaflet__loading.show-loading .loading__icon:after, div.react-opensstreetmap-leaflet__loading.show-success .loading__icon:after, div.react-opensstreetmap-leaflet__loading.show-error .loading__icon:after {\n          position: absolute;\n          top: 0;\n          content: \" \";\n          display: block;\n          width: 120px;\n          height: 120px;\n          margin: 1px;\n          border: 10px solid #FFF;\n          transition: width 0.3s; }\n    div.react-opensstreetmap-leaflet__loading.show-loading {\n      background-color: rgba(255, 245, 100, 0.5); }\n    div.react-opensstreetmap-leaflet__loading.show-success {\n      background-color: rgba(100, 245, 100, 0.5); }\n    div.react-opensstreetmap-leaflet__loading.show-error {\n      background-color: rgba(255, 100, 100, 0.5); }\n    div.react-opensstreetmap-leaflet__loading.show-loading .loading__icon:after {\n      border-radius: 50%;\n      border: 10px solid #FFF;\n      border-color: #FFF transparent #FFF transparent;\n      animation: lds-dual-ring 1.2s linear infinite; }\n    div.react-opensstreetmap-leaflet__loading.show-success .loading__icon {\n      width: 60px; }\n      div.react-opensstreetmap-leaflet__loading.show-success .loading__icon:after {\n        width: 60px;\n        border: 10px solid #FFF;\n        border-color: transparent #FFF #FFF transparent;\n        transform: rotateZ(45deg);\n        transform-origin: right; }\n    div.react-opensstreetmap-leaflet__loading.show-error .loading__icon {\n      width: 10px; }\n      div.react-opensstreetmap-leaflet__loading.show-error .loading__icon:before {\n        content: \" \";\n        display: block;\n        margin: 1px; }\n      div.react-opensstreetmap-leaflet__loading.show-error .loading__icon:before, div.react-opensstreetmap-leaflet__loading.show-error .loading__icon:after {\n        position: absolute;\n        top: 0;\n        width: 10px;\n        height: 120px;\n        border: none;\n        background-color: #FFF;\n        transform: rotateZ(-45deg);\n        transition: width 0.3s, border-radius 0.3s; }\n      div.react-opensstreetmap-leaflet__loading.show-error .loading__icon:after {\n        transform: rotateZ(45deg); }\n\n@keyframes lds-dual-ring {\n  0% {\n    transform: rotate(0deg); }\n  100% {\n    transform: rotate(360deg); } }\n  div.react-opensstreetmap-leaflet .awesome-blocks-map-info.show {\n    position: absolute;\n    z-index: 18;\n    top: auto;\n    bottom: 10px;\n    right: 10px;\n    color: #333;\n    background-color: #FFF;\n    border-radius: 3px;\n    padding: 5px 10px;\n    font-size: 14px;\n    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); }\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-clean-tabs/style.scss":
/*!********************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-clean-tabs/style.scss ***!
  \********************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, ".react-clean-tabs {\n  position: relative;\n  width: 100%;\n  margin-bottom: 10px;\n  height: 100%;\n  /*----- Tab Links -----*/\n  /*----- Content of Tabs -----*/\n  /*------ Flex tabs ------*/ }\n  .react-clean-tabs ul.tab-links {\n    position: relative;\n    display: block;\n    margin: 0;\n    padding: 0 10px;\n    z-index: 2;\n    height: 40px;\n    width: 100%;\n    /* Clearfix */ }\n    .react-clean-tabs ul.tab-links:after {\n      display: block;\n      clear: both; }\n    .react-clean-tabs ul.tab-links li {\n      margin: 0px;\n      list-style: none;\n      display: inline-block;\n      overflow: hidden;\n      padding: 5px 5px 0 5px;\n      margin: 0 -5px; }\n      .react-clean-tabs ul.tab-links li a {\n        padding: 9px 15px;\n        display: inline-block;\n        border-radius: 5px 5px 0px 0px;\n        width: 100%;\n        text-align: center;\n        text-decoration: none;\n        opacity: .6;\n        margin-bottom: -1px;\n        transition: opacity linear 0.2s;\n        box-sizing: border-box; }\n        .react-clean-tabs ul.tab-links li a:hover {\n          opacity: 1; }\n      .react-clean-tabs ul.tab-links li:not(.active) a {\n        background-color: transparent !important; }\n      .react-clean-tabs ul.tab-links li.active a,\n      .react-clean-tabs ul.tab-links li.active a:focus {\n        outline: none;\n        background: #fff;\n        color: #4c4c4c;\n        opacity: 1;\n        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); }\n  .react-clean-tabs .tabs-content {\n    width: 100%;\n    padding: 0;\n    margin: 0;\n    border-radius: 5px;\n    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);\n    overflow: hidden;\n    overflow-x: scroll;\n    min-height: 200px;\n    max-height: 100%; }\n    .react-clean-tabs .tabs-content .tab {\n      background: #fff;\n      max-height: 100%;\n      display: none;\n      transform-origin: top;\n      padding: 10px;\n      transition: all .5s; }\n    .react-clean-tabs .tabs-content .active {\n      display: block; }\n  .react-clean-tabs.flex-tabs .tab-links {\n    display: flex; }\n    .react-clean-tabs.flex-tabs .tab-links li {\n      flex: auto; }\n  .react-clean-tabs.flex-tabs .tabs-content .tab {\n    border-radius: 0 0 3px 3px; }\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-fieldset/style.scss":
/*!******************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-fieldset/style.scss ***!
  \******************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, "fieldset.react-fieldset {\n  /*background: #fdfdfd;*/\n  border: 1px solid #CCC;\n  padding: 10px;\n  margin: 10px;\n  top: 0;\n  left: 0;\n  width: calc(100% - 20px);\n  box-sizing: border-box; }\n  fieldset.react-fieldset > legend {\n    height: 20px;\n    line-height: 20px;\n    width: auto;\n    color: #AAA;\n    background-color: #FFF;\n    padding: 0 10px; }\n\nbody.rtl fieldset.react-fieldset > legend {\n  left: auto;\n  right: 5px; }\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-modal-popup/style.scss":
/*!*********************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-modal-popup/style.scss ***!
  \*********************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, ".react-modal-popup {\n  position: relative;\n  padding: 0;\n  margin: 20px 0;\n  height: 40px; }\n  .react-modal-popup a.open-modal {\n    position: relative;\n    display: block;\n    width: 100%;\n    height: 40px;\n    line-height: 30px;\n    background-color: #fafafa;\n    border: 1px solid #EEE;\n    color: #555;\n    text-decoration: none;\n    padding: 5px 10px;\n    outline: none;\n    border-radius: 1px; }\n    .react-modal-popup a.open-modal:focus {\n      outline: none; }\n  .react-modal-popup .react-appended-modal-popup {\n    display: none;\n    visibility: hidden;\n    opacity: 0; }\n\n.react-modal-popup-parent > .react-appended-modal-popup {\n  background-color: rgba(0, 0, 0, 0.5);\n  position: absolute;\n  width: 100%;\n  height: 100%;\n  min-width: 100%;\n  min-height: 100%;\n  left: 0;\n  top: 0;\n  display: none;\n  visibility: hidden;\n  z-index: 9989; }\n  .react-modal-popup-parent > .react-appended-modal-popup.madal-opend {\n    display: block;\n    visibility: visible; }\n  .react-modal-popup-parent > .react-appended-modal-popup div.modal-container {\n    position: absolute;\n    display: flex;\n    flex-direction: column;\n    width: calc(100% - 60px);\n    height: 80vh;\n    min-height: 400px;\n    top: 30px;\n    left: 50%;\n    transform: translateX(-50%);\n    transform-origin: center center;\n    background-color: #FFF;\n    border-radius: 3px;\n    overflow: hidden;\n    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); }\n    .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header,\n    .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-body,\n    .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.awesome-blocks-modal-footer {\n      position: relative;\n      display: block;\n      width: 100%;\n      padding: 10px;\n      box-sizing: border-box; }\n    .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header {\n      display: flex;\n      padding: 0; }\n      .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header .modal-title {\n        flex: 1;\n        padding: 0 10px;\n        font-weight: 500;\n        font-size: 1rem; }\n      .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header div.react-modal-popup-close {\n        position: relative;\n        width: 65px;\n        cursor: pointer; }\n        .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header div.react-modal-popup-close:before, .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header div.react-modal-popup-close:after {\n          content: \" \";\n          position: absolute;\n          left: 20px;\n          top: 26px;\n          height: 1px;\n          width: 30px;\n          background-color: rgba(0, 0, 0, 0.3);\n          transform: rotateZ(45deg);\n          transform-origin: center;\n          transition: transform 0.5s ease-out; }\n        .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header div.react-modal-popup-close:after {\n          transform: rotateZ(-45deg); }\n        .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header div.react-modal-popup-close:hover:before {\n          transform: rotateZ(225deg); }\n        .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-header div.react-modal-popup-close:hover:after {\n          transform: rotateZ(135deg); }\n    .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.modal-body {\n      overflow-x: scroll;\n      height: auto;\n      padding: 0;\n      flex-grow: 1;\n      max-height: 100%; }\n    .react-modal-popup-parent > .react-appended-modal-popup div.modal-container div.awesome-blocks-modal-footer {\n      text-align: right;\n      border-top: 1px solid #EEE;\n      height: 50px; }\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/select-icon/style.scss":
/*!***************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/select-icon/style.scss ***!
  \***************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, ".awesome-blocks-select-icon {\n  position: relative;\n  border: 1px solid #EEE;\n  padding: 0;\n  margin: 20px 0;\n  text-align: center;\n  background-color: #FFF;\n  height: 40px; }\n  .awesome-blocks-select-icon a:active,\n  .awesome-blocks-select-icon a:focus {\n    outline: none;\n    box-shadow: none; }\n  .awesome-blocks-select-icon a.toggle {\n    position: relative;\n    display: block;\n    width: 100%;\n    height: 40px;\n    line-height: 30px;\n    background-color: #fafafa;\n    color: #555;\n    text-decoration: none;\n    padding: 5px 10px;\n    outline: none;\n    border-radius: 1px;\n    text-align: left;\n    z-index: 9999; }\n    .awesome-blocks-select-icon a.toggle:focus {\n      outline: none; }\n    .awesome-blocks-select-icon a.toggle:after {\n      content: '\\f107';\n      font-family: 'FontAwesome';\n      position: absolute;\n      right: 10px;\n      top: 5px; }\n    .awesome-blocks-select-icon a.toggle.opened {\n      z-index: 999999; }\n      .awesome-blocks-select-icon a.toggle.opened:after {\n        content: '\\f106'; }\n  .awesome-blocks-select-icon .icons-container {\n    height: 0;\n    overflow: hidden;\n    position: absolute;\n    width: 100%;\n    top: 0;\n    left: 0;\n    z-index: 999;\n    background-color: #FFF;\n    border: 1px solid #EEE;\n    transition: height .2s ease-in, box-shadow .2s ease-in;\n    padding-top: 40px; }\n    .awesome-blocks-select-icon .icons-container.opened {\n      height: 340px;\n      z-index: 99999;\n      box-shadow: 0px 5px 15px rgba(5, 5, 5, 0.3); }\n    .awesome-blocks-select-icon .icons-container input[type=text],\n    .awesome-blocks-select-icon .icons-container input[type=search] {\n      display: inline-block;\n      width: 48%;\n      margin: 0;\n      border-radius: 0;\n      border: 0;\n      border-bottom: 1px solid #CCC; }\n      .awesome-blocks-select-icon .icons-container input[type=text][type=text],\n      .awesome-blocks-select-icon .icons-container input[type=search][type=text] {\n        margin-right: 2%; }\n      .awesome-blocks-select-icon .icons-container input[type=text]:focus,\n      .awesome-blocks-select-icon .icons-container input[type=search]:focus {\n        box-shadow: none;\n        border-bottom: 1px solid #888; }\n    .awesome-blocks-select-icon .icons-container ul {\n      overflow-y: scroll;\n      overflow-x: hidden;\n      height: 250px;\n      display: block;\n      widows: 100%;\n      text-align: center;\n      list-style: none; }\n      .awesome-blocks-select-icon .icons-container ul li {\n        display: inline-block;\n        margin: 1%;\n        width: 18%;\n        height: 37px; }\n        .awesome-blocks-select-icon .icons-container ul li a {\n          display: inline-block;\n          width: 100%;\n          height: 100%;\n          border: 1px solid #DDD;\n          background-color: #f8f8f8;\n          color: #555;\n          border-radius: 1px;\n          text-align: center;\n          transition: color .1s ease-in; }\n          .awesome-blocks-select-icon .icons-container ul li a.active {\n            background-color: #0085ba;\n            color: #ffffff; }\n          .awesome-blocks-select-icon .icons-container ul li a:hover {\n            color: #0085ba;\n            background-color: #EEE; }\n            .awesome-blocks-select-icon .icons-container ul li a:hover i {\n              transform: scale(1.5); }\n          .awesome-blocks-select-icon .icons-container ul li a i {\n            line-height: 35px;\n            font-size: 17px;\n            transition: transform .1s linear;\n            transform: scale(1); }\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/social/style.scss":
/*!*****************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/social/style.scss ***!
  \*****************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// Imports
var ___CSS_LOADER_API_IMPORT___ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
exports = ___CSS_LOADER_API_IMPORT___(false);
// Module
exports.push([module.i, ".awesome-blocks-social-links {\n  padding: 20px; }\n  .awesome-blocks-social-links .fab {\n    position: relative;\n    text-align: center;\n    display: inline-block;\n    width: 30px;\n    height: 30px;\n    line-height: 30px;\n    font-size: 20px;\n    color: #FFF;\n    border-radius: 3px;\n    top: 2px;\n    margin: 0 5px; }\n    .awesome-blocks-social-links .fab.fa-facebook {\n      background: #3b5998; }\n    .awesome-blocks-social-links .fab.fa-twitter {\n      background: #00aced; }\n    .awesome-blocks-social-links .fab.fa-instagram {\n      background: #125688; }\n    .awesome-blocks-social-links .fab.fa-youtube {\n      background: #bb0000; }\n    .awesome-blocks-social-links .fab.fa-github {\n      background: #000000; }\n    .awesome-blocks-social-links .fab.fa-linkedin {\n      background: #007bb5; }\n    .awesome-blocks-social-links .fab.fa-pinterest {\n      background: #cb2027; }\n    .awesome-blocks-social-links .fab.fa-vimeo {\n      background: #aad450; }\n    .awesome-blocks-social-links .fab.fa-flickr {\n      background: #ff0084; }\n    .awesome-blocks-social-links .fab.fa-tumblr {\n      background: #32506d; }\n    .awesome-blocks-social-links .fab.fa-vk {\n      background: #4680c2; }\n  .awesome-blocks-social-links .awesome-blocks-social-text {\n    display: inline-block;\n    width: 50%; }\n", ""]);
// Exports
module.exports = exports;


/***/ }),

/***/ "./node_modules/css-loader/dist/runtime/api.js":
/*!*****************************************************!*\
  !*** ./node_modules/css-loader/dist/runtime/api.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
// eslint-disable-next-line func-names
module.exports = function (useSourceMap) {
  var list = []; // return the list of modules as css string

  list.toString = function toString() {
    return this.map(function (item) {
      var content = cssWithMappingToString(item, useSourceMap);

      if (item[2]) {
        return "@media ".concat(item[2], " {").concat(content, "}");
      }

      return content;
    }).join('');
  }; // import a list of modules into the list
  // eslint-disable-next-line func-names


  list.i = function (modules, mediaQuery, dedupe) {
    if (typeof modules === 'string') {
      // eslint-disable-next-line no-param-reassign
      modules = [[null, modules, '']];
    }

    var alreadyImportedModules = {};

    if (dedupe) {
      for (var i = 0; i < this.length; i++) {
        // eslint-disable-next-line prefer-destructuring
        var id = this[i][0];

        if (id != null) {
          alreadyImportedModules[id] = true;
        }
      }
    }

    for (var _i = 0; _i < modules.length; _i++) {
      var item = [].concat(modules[_i]);

      if (dedupe && alreadyImportedModules[item[0]]) {
        // eslint-disable-next-line no-continue
        continue;
      }

      if (mediaQuery) {
        if (!item[2]) {
          item[2] = mediaQuery;
        } else {
          item[2] = "".concat(mediaQuery, " and ").concat(item[2]);
        }
      }

      list.push(item);
    }
  };

  return list;
};

function cssWithMappingToString(item, useSourceMap) {
  var content = item[1] || ''; // eslint-disable-next-line prefer-destructuring

  var cssMapping = item[3];

  if (!cssMapping) {
    return content;
  }

  if (useSourceMap && typeof btoa === 'function') {
    var sourceMapping = toComment(cssMapping);
    var sourceURLs = cssMapping.sources.map(function (source) {
      return "/*# sourceURL=".concat(cssMapping.sourceRoot || '').concat(source, " */");
    });
    return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
  }

  return [content].join('\n');
} // Adapted from convert-source-map (MIT)


function toComment(sourceMap) {
  // eslint-disable-next-line no-undef
  var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
  var data = "sourceMappingURL=data:application/json;charset=utf-8;base64,".concat(base64);
  return "/*# ".concat(data, " */");
}

/***/ }),

/***/ "./node_modules/dom-scroll-into-view/dist-web/index.js":
/*!*************************************************************!*\
  !*** ./node_modules/dom-scroll-into-view/dist-web/index.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _typeof(obj) {
  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function (obj) {
      return typeof obj;
    };
  } else {
    _typeof = function (obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) symbols = symbols.filter(function (sym) {
      return Object.getOwnPropertyDescriptor(object, sym).enumerable;
    });
    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread2(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(source, true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(source).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

var RE_NUM = /[\-+]?(?:\d*\.|)\d+(?:[eE][\-+]?\d+|)/.source;

function getClientPosition(elem) {
  var box;
  var x;
  var y;
  var doc = elem.ownerDocument;
  var body = doc.body;
  var docElem = doc && doc.documentElement; // 根据 GBS 最新数据，A-Grade Browsers 都已支持 getBoundingClientRect 方法，不用再考虑传统的实现方式

  box = elem.getBoundingClientRect(); // 注：jQuery 还考虑减去 docElem.clientLeft/clientTop
  // 但测试发现，这样反而会导致当 html 和 body 有边距/边框样式时，获取的值不正确
  // 此外，ie6 会忽略 html 的 margin 值，幸运地是没有谁会去设置 html 的 margin

  x = box.left;
  y = box.top; // In IE, most of the time, 2 extra pixels are added to the top and left
  // due to the implicit 2-pixel inset border.  In IE6/7 quirks mode and
  // IE6 standards mode, this border can be overridden by setting the
  // document element's border to zero -- thus, we cannot rely on the
  // offset always being 2 pixels.
  // In quirks mode, the offset can be determined by querying the body's
  // clientLeft/clientTop, but in standards mode, it is found by querying
  // the document element's clientLeft/clientTop.  Since we already called
  // getClientBoundingRect we have already forced a reflow, so it is not
  // too expensive just to query them all.
  // ie 下应该减去窗口的边框吧，毕竟默认 absolute 都是相对窗口定位的
  // 窗口边框标准是设 documentElement ,quirks 时设置 body
  // 最好禁止在 body 和 html 上边框 ，但 ie < 9 html 默认有 2px ，减去
  // 但是非 ie 不可能设置窗口边框，body html 也不是窗口 ,ie 可以通过 html,body 设置
  // 标准 ie 下 docElem.clientTop 就是 border-top
  // ie7 html 即窗口边框改变不了。永远为 2
  // 但标准 firefox/chrome/ie9 下 docElem.clientTop 是窗口边框，即使设了 border-top 也为 0

  x -= docElem.clientLeft || body.clientLeft || 0;
  y -= docElem.clientTop || body.clientTop || 0;
  return {
    left: x,
    top: y
  };
}

function getScroll(w, top) {
  var ret = w["page".concat(top ? 'Y' : 'X', "Offset")];
  var method = "scroll".concat(top ? 'Top' : 'Left');

  if (typeof ret !== 'number') {
    var d = w.document; // ie6,7,8 standard mode

    ret = d.documentElement[method];

    if (typeof ret !== 'number') {
      // quirks mode
      ret = d.body[method];
    }
  }

  return ret;
}

function getScrollLeft(w) {
  return getScroll(w);
}

function getScrollTop(w) {
  return getScroll(w, true);
}

function getOffset(el) {
  var pos = getClientPosition(el);
  var doc = el.ownerDocument;
  var w = doc.defaultView || doc.parentWindow;
  pos.left += getScrollLeft(w);
  pos.top += getScrollTop(w);
  return pos;
}

function _getComputedStyle(elem, name, computedStyle_) {
  var val = '';
  var d = elem.ownerDocument;
  var computedStyle = computedStyle_ || d.defaultView.getComputedStyle(elem, null); // https://github.com/kissyteam/kissy/issues/61

  if (computedStyle) {
    val = computedStyle.getPropertyValue(name) || computedStyle[name];
  }

  return val;
}

var _RE_NUM_NO_PX = new RegExp("^(".concat(RE_NUM, ")(?!px)[a-z%]+$"), 'i');

var RE_POS = /^(top|right|bottom|left)$/;
var CURRENT_STYLE = 'currentStyle';
var RUNTIME_STYLE = 'runtimeStyle';
var LEFT = 'left';
var PX = 'px';

function _getComputedStyleIE(elem, name) {
  // currentStyle maybe null
  // http://msdn.microsoft.com/en-us/library/ms535231.aspx
  var ret = elem[CURRENT_STYLE] && elem[CURRENT_STYLE][name]; // 当 width/height 设置为百分比时，通过 pixelLeft 方式转换的 width/height 值
  // 一开始就处理了! CUSTOM_STYLE.height,CUSTOM_STYLE.width ,cssHook 解决@2011-08-19
  // 在 ie 下不对，需要直接用 offset 方式
  // borderWidth 等值也有问题，但考虑到 borderWidth 设为百分比的概率很小，这里就不考虑了
  // From the awesome hack by Dean Edwards
  // http://erik.eae.net/archives/2007/07/27/18.54.15/#comment-102291
  // If we're not dealing with a regular pixel number
  // but a number that has a weird ending, we need to convert it to pixels
  // exclude left right for relativity

  if (_RE_NUM_NO_PX.test(ret) && !RE_POS.test(name)) {
    // Remember the original values
    var style = elem.style;
    var left = style[LEFT];
    var rsLeft = elem[RUNTIME_STYLE][LEFT]; // prevent flashing of content

    elem[RUNTIME_STYLE][LEFT] = elem[CURRENT_STYLE][LEFT]; // Put in the new values to get a computed value out

    style[LEFT] = name === 'fontSize' ? '1em' : ret || 0;
    ret = style.pixelLeft + PX; // Revert the changed values

    style[LEFT] = left;
    elem[RUNTIME_STYLE][LEFT] = rsLeft;
  }

  return ret === '' ? 'auto' : ret;
}

var getComputedStyleX;

if (typeof window !== 'undefined') {
  getComputedStyleX = window.getComputedStyle ? _getComputedStyle : _getComputedStyleIE;
}

function each(arr, fn) {
  for (var i = 0; i < arr.length; i++) {
    fn(arr[i]);
  }
}

function isBorderBoxFn(elem) {
  return getComputedStyleX(elem, 'boxSizing') === 'border-box';
}

var BOX_MODELS = ['margin', 'border', 'padding'];
var CONTENT_INDEX = -1;
var PADDING_INDEX = 2;
var BORDER_INDEX = 1;
var MARGIN_INDEX = 0;

function swap(elem, options, callback) {
  var old = {};
  var style = elem.style;
  var name; // Remember the old values, and insert the new ones

  for (name in options) {
    if (options.hasOwnProperty(name)) {
      old[name] = style[name];
      style[name] = options[name];
    }
  }

  callback.call(elem); // Revert the old values

  for (name in options) {
    if (options.hasOwnProperty(name)) {
      style[name] = old[name];
    }
  }
}

function getPBMWidth(elem, props, which) {
  var value = 0;
  var prop;
  var j;
  var i;

  for (j = 0; j < props.length; j++) {
    prop = props[j];

    if (prop) {
      for (i = 0; i < which.length; i++) {
        var cssProp = void 0;

        if (prop === 'border') {
          cssProp = "".concat(prop + which[i], "Width");
        } else {
          cssProp = prop + which[i];
        }

        value += parseFloat(getComputedStyleX(elem, cssProp)) || 0;
      }
    }
  }

  return value;
}
/**
 * A crude way of determining if an object is a window
 * @member util
 */


function isWindow(obj) {
  // must use == for ie8

  /* eslint eqeqeq:0 */
  return obj != null && obj == obj.window;
}

var domUtils = {};
each(['Width', 'Height'], function (name) {
  domUtils["doc".concat(name)] = function (refWin) {
    var d = refWin.document;
    return Math.max( // firefox chrome documentElement.scrollHeight< body.scrollHeight
    // ie standard mode : documentElement.scrollHeight> body.scrollHeight
    d.documentElement["scroll".concat(name)], // quirks : documentElement.scrollHeight 最大等于可视窗口多一点？
    d.body["scroll".concat(name)], domUtils["viewport".concat(name)](d));
  };

  domUtils["viewport".concat(name)] = function (win) {
    // pc browser includes scrollbar in window.innerWidth
    var prop = "client".concat(name);
    var doc = win.document;
    var body = doc.body;
    var documentElement = doc.documentElement;
    var documentElementProp = documentElement[prop]; // 标准模式取 documentElement
    // backcompat 取 body

    return doc.compatMode === 'CSS1Compat' && documentElementProp || body && body[prop] || documentElementProp;
  };
});
/*
 得到元素的大小信息
 @param elem
 @param name
 @param {String} [extra]  'padding' : (css width) + padding
 'border' : (css width) + padding + border
 'margin' : (css width) + padding + border + margin
 */

function getWH(elem, name, extra) {
  if (isWindow(elem)) {
    return name === 'width' ? domUtils.viewportWidth(elem) : domUtils.viewportHeight(elem);
  } else if (elem.nodeType === 9) {
    return name === 'width' ? domUtils.docWidth(elem) : domUtils.docHeight(elem);
  }

  var which = name === 'width' ? ['Left', 'Right'] : ['Top', 'Bottom'];
  var borderBoxValue = name === 'width' ? elem.offsetWidth : elem.offsetHeight;
  var computedStyle = getComputedStyleX(elem);
  var isBorderBox = isBorderBoxFn(elem);
  var cssBoxValue = 0;

  if (borderBoxValue == null || borderBoxValue <= 0) {
    borderBoxValue = undefined; // Fall back to computed then un computed css if necessary

    cssBoxValue = getComputedStyleX(elem, name);

    if (cssBoxValue == null || Number(cssBoxValue) < 0) {
      cssBoxValue = elem.style[name] || 0;
    } // Normalize '', auto, and prepare for extra


    cssBoxValue = parseFloat(cssBoxValue) || 0;
  }

  if (extra === undefined) {
    extra = isBorderBox ? BORDER_INDEX : CONTENT_INDEX;
  }

  var borderBoxValueOrIsBorderBox = borderBoxValue !== undefined || isBorderBox;
  var val = borderBoxValue || cssBoxValue;

  if (extra === CONTENT_INDEX) {
    if (borderBoxValueOrIsBorderBox) {
      return val - getPBMWidth(elem, ['border', 'padding'], which);
    }

    return cssBoxValue;
  }

  if (borderBoxValueOrIsBorderBox) {
    var padding = extra === PADDING_INDEX ? -getPBMWidth(elem, ['border'], which) : getPBMWidth(elem, ['margin'], which);
    return val + (extra === BORDER_INDEX ? 0 : padding);
  }

  return cssBoxValue + getPBMWidth(elem, BOX_MODELS.slice(extra), which);
}

var cssShow = {
  position: 'absolute',
  visibility: 'hidden',
  display: 'block'
}; // fix #119 : https://github.com/kissyteam/kissy/issues/119

function getWHIgnoreDisplay(elem) {
  var val;
  var args = arguments; // in case elem is window
  // elem.offsetWidth === undefined

  if (elem.offsetWidth !== 0) {
    val = getWH.apply(undefined, args);
  } else {
    swap(elem, cssShow, function () {
      val = getWH.apply(undefined, args);
    });
  }

  return val;
}

function css(el, name, v) {
  var value = v;

  if (_typeof(name) === 'object') {
    for (var i in name) {
      if (name.hasOwnProperty(i)) {
        css(el, i, name[i]);
      }
    }

    return undefined;
  }

  if (typeof value !== 'undefined') {
    if (typeof value === 'number') {
      value += 'px';
    }

    el.style[name] = value;
    return undefined;
  }

  return getComputedStyleX(el, name);
}

each(['width', 'height'], function (name) {
  var first = name.charAt(0).toUpperCase() + name.slice(1);

  domUtils["outer".concat(first)] = function (el, includeMargin) {
    return el && getWHIgnoreDisplay(el, name, includeMargin ? MARGIN_INDEX : BORDER_INDEX);
  };

  var which = name === 'width' ? ['Left', 'Right'] : ['Top', 'Bottom'];

  domUtils[name] = function (elem, val) {
    if (val !== undefined) {
      if (elem) {
        var computedStyle = getComputedStyleX(elem);
        var isBorderBox = isBorderBoxFn(elem);

        if (isBorderBox) {
          val += getPBMWidth(elem, ['padding', 'border'], which);
        }

        return css(elem, name, val);
      }

      return undefined;
    }

    return elem && getWHIgnoreDisplay(elem, name, CONTENT_INDEX);
  };
}); // 设置 elem 相对 elem.ownerDocument 的坐标

function setOffset(elem, offset) {
  // set position first, in-case top/left are set even on static elem
  if (css(elem, 'position') === 'static') {
    elem.style.position = 'relative';
  }

  var old = getOffset(elem);
  var ret = {};
  var current;
  var key;

  for (key in offset) {
    if (offset.hasOwnProperty(key)) {
      current = parseFloat(css(elem, key)) || 0;
      ret[key] = current + offset[key] - old[key];
    }
  }

  css(elem, ret);
}

var util = _objectSpread2({
  getWindow: function getWindow(node) {
    var doc = node.ownerDocument || node;
    return doc.defaultView || doc.parentWindow;
  },
  offset: function offset(el, value) {
    if (typeof value !== 'undefined') {
      setOffset(el, value);
    } else {
      return getOffset(el);
    }
  },
  isWindow: isWindow,
  each: each,
  css: css,
  clone: function clone(obj) {
    var ret = {};

    for (var i in obj) {
      if (obj.hasOwnProperty(i)) {
        ret[i] = obj[i];
      }
    }

    var overflow = obj.overflow;

    if (overflow) {
      for (var _i in obj) {
        if (obj.hasOwnProperty(_i)) {
          ret.overflow[_i] = obj.overflow[_i];
        }
      }
    }

    return ret;
  },
  scrollLeft: function scrollLeft(w, v) {
    if (isWindow(w)) {
      if (v === undefined) {
        return getScrollLeft(w);
      }

      window.scrollTo(v, getScrollTop(w));
    } else {
      if (v === undefined) {
        return w.scrollLeft;
      }

      w.scrollLeft = v;
    }
  },
  scrollTop: function scrollTop(w, v) {
    if (isWindow(w)) {
      if (v === undefined) {
        return getScrollTop(w);
      }

      window.scrollTo(getScrollLeft(w), v);
    } else {
      if (v === undefined) {
        return w.scrollTop;
      }

      w.scrollTop = v;
    }
  },
  viewportWidth: 0,
  viewportHeight: 0
}, domUtils);

function scrollIntoView(elem, container, config) {
  config = config || {}; // document 归一化到 window

  if (container.nodeType === 9) {
    container = util.getWindow(container);
  }

  var allowHorizontalScroll = config.allowHorizontalScroll;
  var onlyScrollIfNeeded = config.onlyScrollIfNeeded;
  var alignWithTop = config.alignWithTop;
  var alignWithLeft = config.alignWithLeft;
  var offsetTop = config.offsetTop || 0;
  var offsetLeft = config.offsetLeft || 0;
  var offsetBottom = config.offsetBottom || 0;
  var offsetRight = config.offsetRight || 0;
  allowHorizontalScroll = allowHorizontalScroll === undefined ? true : allowHorizontalScroll;
  var isWin = util.isWindow(container);
  var elemOffset = util.offset(elem);
  var eh = util.outerHeight(elem);
  var ew = util.outerWidth(elem);
  var containerOffset;
  var ch;
  var cw;
  var containerScroll;
  var diffTop;
  var diffBottom;
  var win;
  var winScroll;
  var ww;
  var wh;

  if (isWin) {
    win = container;
    wh = util.height(win);
    ww = util.width(win);
    winScroll = {
      left: util.scrollLeft(win),
      top: util.scrollTop(win)
    }; // elem 相对 container 可视视窗的距离

    diffTop = {
      left: elemOffset.left - winScroll.left - offsetLeft,
      top: elemOffset.top - winScroll.top - offsetTop
    };
    diffBottom = {
      left: elemOffset.left + ew - (winScroll.left + ww) + offsetRight,
      top: elemOffset.top + eh - (winScroll.top + wh) + offsetBottom
    };
    containerScroll = winScroll;
  } else {
    containerOffset = util.offset(container);
    ch = container.clientHeight;
    cw = container.clientWidth;
    containerScroll = {
      left: container.scrollLeft,
      top: container.scrollTop
    }; // elem 相对 container 可视视窗的距离
    // 注意边框, offset 是边框到根节点

    diffTop = {
      left: elemOffset.left - (containerOffset.left + (parseFloat(util.css(container, 'borderLeftWidth')) || 0)) - offsetLeft,
      top: elemOffset.top - (containerOffset.top + (parseFloat(util.css(container, 'borderTopWidth')) || 0)) - offsetTop
    };
    diffBottom = {
      left: elemOffset.left + ew - (containerOffset.left + cw + (parseFloat(util.css(container, 'borderRightWidth')) || 0)) + offsetRight,
      top: elemOffset.top + eh - (containerOffset.top + ch + (parseFloat(util.css(container, 'borderBottomWidth')) || 0)) + offsetBottom
    };
  }

  if (diffTop.top < 0 || diffBottom.top > 0) {
    // 强制向上
    if (alignWithTop === true) {
      util.scrollTop(container, containerScroll.top + diffTop.top);
    } else if (alignWithTop === false) {
      util.scrollTop(container, containerScroll.top + diffBottom.top);
    } else {
      // 自动调整
      if (diffTop.top < 0) {
        util.scrollTop(container, containerScroll.top + diffTop.top);
      } else {
        util.scrollTop(container, containerScroll.top + diffBottom.top);
      }
    }
  } else {
    if (!onlyScrollIfNeeded) {
      alignWithTop = alignWithTop === undefined ? true : !!alignWithTop;

      if (alignWithTop) {
        util.scrollTop(container, containerScroll.top + diffTop.top);
      } else {
        util.scrollTop(container, containerScroll.top + diffBottom.top);
      }
    }
  }

  if (allowHorizontalScroll) {
    if (diffTop.left < 0 || diffBottom.left > 0) {
      // 强制向上
      if (alignWithLeft === true) {
        util.scrollLeft(container, containerScroll.left + diffTop.left);
      } else if (alignWithLeft === false) {
        util.scrollLeft(container, containerScroll.left + diffBottom.left);
      } else {
        // 自动调整
        if (diffTop.left < 0) {
          util.scrollLeft(container, containerScroll.left + diffTop.left);
        } else {
          util.scrollLeft(container, containerScroll.left + diffBottom.left);
        }
      }
    } else {
      if (!onlyScrollIfNeeded) {
        alignWithLeft = alignWithLeft === undefined ? true : !!alignWithLeft;

        if (alignWithLeft) {
          util.scrollLeft(container, containerScroll.left + diffTop.left);
        } else {
          util.scrollLeft(container, containerScroll.left + diffBottom.left);
        }
      }
    }
  }
}

/* harmony default export */ __webpack_exports__["default"] = (scrollIntoView);
//# sourceMappingURL=index.js.map


/***/ }),

/***/ "./node_modules/memize/index.js":
/*!**************************************!*\
  !*** ./node_modules/memize/index.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = function memize( fn, options ) {
	var size = 0,
		maxSize, head, tail;

	if ( options && options.maxSize ) {
		maxSize = options.maxSize;
	}

	function memoized( /* ...args */ ) {
		var node = head,
			len = arguments.length,
			args, i;

		searchCache: while ( node ) {
			// Perform a shallow equality test to confirm that whether the node
			// under test is a candidate for the arguments passed. Two arrays
			// are shallowly equal if their length matches and each entry is
			// strictly equal between the two sets. Avoid abstracting to a
			// function which could incur an arguments leaking deoptimization.

			// Check whether node arguments match arguments length
			if ( node.args.length !== arguments.length ) {
				node = node.next;
				continue;
			}

			// Check whether node arguments match arguments values
			for ( i = 0; i < len; i++ ) {
				if ( node.args[ i ] !== arguments[ i ] ) {
					node = node.next;
					continue searchCache;
				}
			}

			// At this point we can assume we've found a match

			// Surface matched node to head if not already
			if ( node !== head ) {
				// As tail, shift to previous. Must only shift if not also
				// head, since if both head and tail, there is no previous.
				if ( node === tail ) {
					tail = node.prev;
				}

				// Adjust siblings to point to each other. If node was tail,
				// this also handles new tail's empty `next` assignment.
				node.prev.next = node.next;
				if ( node.next ) {
					node.next.prev = node.prev;
				}

				node.next = head;
				node.prev = null;
				head.prev = node;
				head = node;
			}

			// Return immediately
			return node.val;
		}

		// No cached value found. Continue to insertion phase:

		// Create a copy of arguments (avoid leaking deoptimization)
		args = new Array( len );
		for ( i = 0; i < len; i++ ) {
			args[ i ] = arguments[ i ];
		}

		node = {
			args: args,

			// Generate the result from original function
			val: fn.apply( null, args )
		};

		// Don't need to check whether node is already head, since it would
		// have been returned above already if it was

		// Shift existing head down list
		if ( head ) {
			head.prev = node;
			node.next = head;
		} else {
			// If no head, follows that there's no tail (at initial or reset)
			tail = node;
		}

		// Trim tail if we're reached max size and are pending cache insertion
		if ( size === maxSize ) {
			tail = tail.prev;
			tail.next = null;
		} else {
			size++;
		}

		head = node;

		return node.val;
	}

	memoized.clear = function() {
		head = null;
		tail = null;
		size = 0;
	};

	if ( false ) {}

	return memoized;
};


/***/ }),

/***/ "./node_modules/object-assign/index.js":
/*!*********************************************!*\
  !*** ./node_modules/object-assign/index.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/


/* eslint-disable no-unused-vars */
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if (val === null || val === undefined) {
		throw new TypeError('Object.assign cannot be called with null or undefined');
	}

	return Object(val);
}

function shouldUseNative() {
	try {
		if (!Object.assign) {
			return false;
		}

		// Detect buggy property enumeration order in older V8 versions.

		// https://bugs.chromium.org/p/v8/issues/detail?id=4118
		var test1 = new String('abc');  // eslint-disable-line no-new-wrappers
		test1[5] = 'de';
		if (Object.getOwnPropertyNames(test1)[0] === '5') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test2 = {};
		for (var i = 0; i < 10; i++) {
			test2['_' + String.fromCharCode(i)] = i;
		}
		var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
			return test2[n];
		});
		if (order2.join('') !== '0123456789') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test3 = {};
		'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
			test3[letter] = letter;
		});
		if (Object.keys(Object.assign({}, test3)).join('') !==
				'abcdefghijklmnopqrst') {
			return false;
		}

		return true;
	} catch (err) {
		// We don't expect any of the above to throw, but better to be safe.
		return false;
	}
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
	var from;
	var to = toObject(target);
	var symbols;

	for (var s = 1; s < arguments.length; s++) {
		from = Object(arguments[s]);

		for (var key in from) {
			if (hasOwnProperty.call(from, key)) {
				to[key] = from[key];
			}
		}

		if (getOwnPropertySymbols) {
			symbols = getOwnPropertySymbols(from);
			for (var i = 0; i < symbols.length; i++) {
				if (propIsEnumerable.call(from, symbols[i])) {
					to[symbols[i]] = from[symbols[i]];
				}
			}
		}
	}

	return to;
};


/***/ }),

/***/ "./node_modules/prop-types/checkPropTypes.js":
/*!***************************************************!*\
  !*** ./node_modules/prop-types/checkPropTypes.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var printWarning = function() {};

if (true) {
  var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
  var loggedTypeFailures = {};
  var has = Function.call.bind(Object.prototype.hasOwnProperty);

  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

/**
 * Assert that the values match with the type specs.
 * Error messages are memorized and will only be shown once.
 *
 * @param {object} typeSpecs Map of name to a ReactPropType
 * @param {object} values Runtime values that need to be type-checked
 * @param {string} location e.g. "prop", "context", "child context"
 * @param {string} componentName Name of the component for error messages.
 * @param {?Function} getStack Returns the component stack.
 * @private
 */
function checkPropTypes(typeSpecs, values, location, componentName, getStack) {
  if (true) {
    for (var typeSpecName in typeSpecs) {
      if (has(typeSpecs, typeSpecName)) {
        var error;
        // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.
        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          if (typeof typeSpecs[typeSpecName] !== 'function') {
            var err = Error(
              (componentName || 'React class') + ': ' + location + ' type `' + typeSpecName + '` is invalid; ' +
              'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.'
            );
            err.name = 'Invariant Violation';
            throw err;
          }
          error = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, ReactPropTypesSecret);
        } catch (ex) {
          error = ex;
        }
        if (error && !(error instanceof Error)) {
          printWarning(
            (componentName || 'React class') + ': type specification of ' +
            location + ' `' + typeSpecName + '` is invalid; the type checker ' +
            'function must return `null` or an `Error` but returned a ' + typeof error + '. ' +
            'You may have forgotten to pass an argument to the type checker ' +
            'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' +
            'shape all require an argument).'
          );
        }
        if (error instanceof Error && !(error.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error.message] = true;

          var stack = getStack ? getStack() : '';

          printWarning(
            'Failed ' + location + ' type: ' + error.message + (stack != null ? stack : '')
          );
        }
      }
    }
  }
}

/**
 * Resets warning cache when testing.
 *
 * @private
 */
checkPropTypes.resetWarningCache = function() {
  if (true) {
    loggedTypeFailures = {};
  }
}

module.exports = checkPropTypes;


/***/ }),

/***/ "./node_modules/prop-types/lib/ReactPropTypesSecret.js":
/*!*************************************************************!*\
  !*** ./node_modules/prop-types/lib/ReactPropTypesSecret.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

module.exports = ReactPropTypesSecret;


/***/ }),

/***/ "./node_modules/react-dom/cjs/react-dom-server.browser.development.js":
/*!****************************************************************************!*\
  !*** ./node_modules/react-dom/cjs/react-dom-server.browser.development.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/** @license React v16.12.0
 * react-dom-server.browser.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */





if (true) {
  (function() {
'use strict';

var _assign = __webpack_require__(/*! object-assign */ "./node_modules/object-assign/index.js");
var React = __webpack_require__(/*! react */ "./node_modules/react/index.js");
var checkPropTypes = __webpack_require__(/*! prop-types/checkPropTypes */ "./node_modules/prop-types/checkPropTypes.js");

// Do not require this module directly! Use normal `invariant` calls with
// template literal strings. The messages will be replaced with error codes
// during build.

// TODO: this is special because it gets imported during build.

var ReactVersion = '16.12.0';

/**
 * Use invariant() to assert state which your program assumes to be true.
 *
 * Provide sprintf-style format (only %s is supported) and arguments
 * to provide information about what broke and what you were
 * expecting.
 *
 * The invariant message will be stripped in production, but the invariant
 * will remain to ensure logic does not differ in production.
 */

/**
 * Similar to invariant but only logs a warning if the condition is not met.
 * This can be used to log issues in development environments in critical
 * paths. Removing the logging code for production environments will keep the
 * same logic and follow the same code paths.
 */
var warningWithoutStack = function () {};

{
  warningWithoutStack = function (condition, format) {
    for (var _len = arguments.length, args = new Array(_len > 2 ? _len - 2 : 0), _key = 2; _key < _len; _key++) {
      args[_key - 2] = arguments[_key];
    }

    if (format === undefined) {
      throw new Error('`warningWithoutStack(condition, format, ...args)` requires a warning ' + 'message argument');
    }

    if (args.length > 8) {
      // Check before the condition to catch violations early.
      throw new Error('warningWithoutStack() currently supports at most 8 arguments.');
    }

    if (condition) {
      return;
    }

    if (typeof console !== 'undefined') {
      var argsWithFormat = args.map(function (item) {
        return '' + item;
      });
      argsWithFormat.unshift('Warning: ' + format); // We intentionally don't use spread (or .apply) directly because it
      // breaks IE9: https://github.com/facebook/react/issues/13610

      Function.prototype.apply.call(console.error, console, argsWithFormat);
    }

    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      var argIndex = 0;
      var message = 'Warning: ' + format.replace(/%s/g, function () {
        return args[argIndex++];
      });
      throw new Error(message);
    } catch (x) {}
  };
}

var warningWithoutStack$1 = warningWithoutStack;

// The Symbol used to tag the ReactElement-like types. If there is no native Symbol
// nor polyfill, then a plain number is used for performance.
var hasSymbol = typeof Symbol === 'function' && Symbol.for;

var REACT_PORTAL_TYPE = hasSymbol ? Symbol.for('react.portal') : 0xeaca;
var REACT_FRAGMENT_TYPE = hasSymbol ? Symbol.for('react.fragment') : 0xeacb;
var REACT_STRICT_MODE_TYPE = hasSymbol ? Symbol.for('react.strict_mode') : 0xeacc;
var REACT_PROFILER_TYPE = hasSymbol ? Symbol.for('react.profiler') : 0xead2;
var REACT_PROVIDER_TYPE = hasSymbol ? Symbol.for('react.provider') : 0xeacd;
var REACT_CONTEXT_TYPE = hasSymbol ? Symbol.for('react.context') : 0xeace; // TODO: We don't use AsyncMode or ConcurrentMode anymore. They were temporary
// (unstable) APIs that have been removed. Can we remove the symbols?


var REACT_CONCURRENT_MODE_TYPE = hasSymbol ? Symbol.for('react.concurrent_mode') : 0xeacf;
var REACT_FORWARD_REF_TYPE = hasSymbol ? Symbol.for('react.forward_ref') : 0xead0;
var REACT_SUSPENSE_TYPE = hasSymbol ? Symbol.for('react.suspense') : 0xead1;
var REACT_SUSPENSE_LIST_TYPE = hasSymbol ? Symbol.for('react.suspense_list') : 0xead8;
var REACT_MEMO_TYPE = hasSymbol ? Symbol.for('react.memo') : 0xead3;
var REACT_LAZY_TYPE = hasSymbol ? Symbol.for('react.lazy') : 0xead4;
var REACT_FUNDAMENTAL_TYPE = hasSymbol ? Symbol.for('react.fundamental') : 0xead5;

var REACT_SCOPE_TYPE = hasSymbol ? Symbol.for('react.scope') : 0xead7;

var ReactSharedInternals = React.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED; // Prevent newer renderers from RTE when used with older react package versions.
// Current owner and dispatcher used to share the same ref,
// but PR #14548 split them out to better support the react-debug-tools package.

if (!ReactSharedInternals.hasOwnProperty('ReactCurrentDispatcher')) {
  ReactSharedInternals.ReactCurrentDispatcher = {
    current: null
  };
}

if (!ReactSharedInternals.hasOwnProperty('ReactCurrentBatchConfig')) {
  ReactSharedInternals.ReactCurrentBatchConfig = {
    suspense: null
  };
}

/**
 * Similar to invariant but only logs a warning if the condition is not met.
 * This can be used to log issues in development environments in critical
 * paths. Removing the logging code for production environments will keep the
 * same logic and follow the same code paths.
 */

var warning = warningWithoutStack$1;

{
  warning = function (condition, format) {
    if (condition) {
      return;
    }

    var ReactDebugCurrentFrame = ReactSharedInternals.ReactDebugCurrentFrame;
    var stack = ReactDebugCurrentFrame.getStackAddendum(); // eslint-disable-next-line react-internal/warning-and-invariant-args

    for (var _len = arguments.length, args = new Array(_len > 2 ? _len - 2 : 0), _key = 2; _key < _len; _key++) {
      args[_key - 2] = arguments[_key];
    }

    warningWithoutStack$1.apply(void 0, [false, format + '%s'].concat(args, [stack]));
  };
}

var warning$1 = warning;

var Uninitialized = -1;
var Pending = 0;
var Resolved = 1;
var Rejected = 2;
function refineResolvedLazyComponent(lazyComponent) {
  return lazyComponent._status === Resolved ? lazyComponent._result : null;
}
function initializeLazyComponentType(lazyComponent) {
  if (lazyComponent._status === Uninitialized) {
    lazyComponent._status = Pending;
    var ctor = lazyComponent._ctor;
    var thenable = ctor();
    lazyComponent._result = thenable;
    thenable.then(function (moduleObject) {
      if (lazyComponent._status === Pending) {
        var defaultExport = moduleObject.default;

        {
          if (defaultExport === undefined) {
            warning$1(false, 'lazy: Expected the result of a dynamic import() call. ' + 'Instead received: %s\n\nYour code should look like: \n  ' + "const MyComponent = lazy(() => import('./MyComponent'))", moduleObject);
          }
        }

        lazyComponent._status = Resolved;
        lazyComponent._result = defaultExport;
      }
    }, function (error) {
      if (lazyComponent._status === Pending) {
        lazyComponent._status = Rejected;
        lazyComponent._result = error;
      }
    });
  }
}

function getWrappedName(outerType, innerType, wrapperName) {
  var functionName = innerType.displayName || innerType.name || '';
  return outerType.displayName || (functionName !== '' ? wrapperName + "(" + functionName + ")" : wrapperName);
}

function getComponentName(type) {
  if (type == null) {
    // Host root, text node or just invalid type.
    return null;
  }

  {
    if (typeof type.tag === 'number') {
      warningWithoutStack$1(false, 'Received an unexpected object in getComponentName(). ' + 'This is likely a bug in React. Please file an issue.');
    }
  }

  if (typeof type === 'function') {
    return type.displayName || type.name || null;
  }

  if (typeof type === 'string') {
    return type;
  }

  switch (type) {
    case REACT_FRAGMENT_TYPE:
      return 'Fragment';

    case REACT_PORTAL_TYPE:
      return 'Portal';

    case REACT_PROFILER_TYPE:
      return "Profiler";

    case REACT_STRICT_MODE_TYPE:
      return 'StrictMode';

    case REACT_SUSPENSE_TYPE:
      return 'Suspense';

    case REACT_SUSPENSE_LIST_TYPE:
      return 'SuspenseList';
  }

  if (typeof type === 'object') {
    switch (type.$$typeof) {
      case REACT_CONTEXT_TYPE:
        return 'Context.Consumer';

      case REACT_PROVIDER_TYPE:
        return 'Context.Provider';

      case REACT_FORWARD_REF_TYPE:
        return getWrappedName(type, type.render, 'ForwardRef');

      case REACT_MEMO_TYPE:
        return getComponentName(type.type);

      case REACT_LAZY_TYPE:
        {
          var thenable = type;
          var resolvedThenable = refineResolvedLazyComponent(thenable);

          if (resolvedThenable) {
            return getComponentName(resolvedThenable);
          }

          break;
        }
    }
  }

  return null;
}

/**
 * Forked from fbjs/warning:
 * https://github.com/facebook/fbjs/blob/e66ba20ad5be433eb54423f2b097d829324d9de6/packages/fbjs/src/__forks__/warning.js
 *
 * Only change is we use console.warn instead of console.error,
 * and do nothing when 'console' is not supported.
 * This really simplifies the code.
 * ---
 * Similar to invariant but only logs a warning if the condition is not met.
 * This can be used to log issues in development environments in critical
 * paths. Removing the logging code for production environments will keep the
 * same logic and follow the same code paths.
 */
var lowPriorityWarningWithoutStack = function () {};

{
  var printWarning = function (format) {
    for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
      args[_key - 1] = arguments[_key];
    }

    var argIndex = 0;
    var message = 'Warning: ' + format.replace(/%s/g, function () {
      return args[argIndex++];
    });

    if (typeof console !== 'undefined') {
      console.warn(message);
    }

    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };

  lowPriorityWarningWithoutStack = function (condition, format) {
    if (format === undefined) {
      throw new Error('`lowPriorityWarningWithoutStack(condition, format, ...args)` requires a warning ' + 'message argument');
    }

    if (!condition) {
      for (var _len2 = arguments.length, args = new Array(_len2 > 2 ? _len2 - 2 : 0), _key2 = 2; _key2 < _len2; _key2++) {
        args[_key2 - 2] = arguments[_key2];
      }

      printWarning.apply(void 0, [format].concat(args));
    }
  };
}

var lowPriorityWarningWithoutStack$1 = lowPriorityWarningWithoutStack;

var BEFORE_SLASH_RE = /^(.*)[\\\/]/;
var describeComponentFrame = function (name, source, ownerName) {
  var sourceInfo = '';

  if (source) {
    var path = source.fileName;
    var fileName = path.replace(BEFORE_SLASH_RE, '');

    {
      // In DEV, include code for a common special case:
      // prefer "folder/index.js" instead of just "index.js".
      if (/^index\./.test(fileName)) {
        var match = path.match(BEFORE_SLASH_RE);

        if (match) {
          var pathBeforeSlash = match[1];

          if (pathBeforeSlash) {
            var folderName = pathBeforeSlash.replace(BEFORE_SLASH_RE, '');
            fileName = folderName + '/' + fileName;
          }
        }
      }
    }

    sourceInfo = ' (at ' + fileName + ':' + source.lineNumber + ')';
  } else if (ownerName) {
    sourceInfo = ' (created by ' + ownerName + ')';
  }

  return '\n    in ' + (name || 'Unknown') + sourceInfo;
};

// Helps identify side effects in render-phase lifecycle hooks and setState
// reducers by double invoking them in Strict Mode.

 // To preserve the "Pause on caught exceptions" behavior of the debugger, we
// replay the begin phase of a failed component inside invokeGuardedCallback.

 // Warn about deprecated, async-unsafe lifecycles; relates to RFC #6:

var warnAboutDeprecatedLifecycles = true; // Gather advanced timing metrics for Profiler subtrees.

 // Trace which interactions trigger each commit.

 // SSR experiments

var enableSuspenseServerRenderer = false;
 // Only used in www builds.

 // Only used in www builds.

 // Disable javascript: URL strings in href for XSS protection.

var disableJavaScriptURLs = false; // React Fire: prevent the value and checked attributes from syncing
// with their related DOM properties

 // These APIs will no longer be "unstable" in the upcoming 16.7 release,
// Control this behavior with a flag to support 16.6 minor releases in the meanwhile.


 // Experimental React Flare event system and event components support.

var enableFlareAPI = false; // Experimental Host Component support.

var enableFundamentalAPI = false; // Experimental Scope support.

var enableScopeAPI = false; // New API for JSX transforms to target - https://github.com/reactjs/rfcs/pull/107

 // We will enforce mocking scheduler with scheduler/unstable_mock at some point. (v17?)
// Till then, we warn about the missing mock, but still fallback to a legacy mode compatible version

 // For tests, we flush suspense fallbacks in an act scope;
// *except* in some of our own tests, where we test incremental loading states.

 // Add a callback property to suspense to notify which promises are currently
// in the update queue. This allows reporting and tracing of what is causing
// the user to see a loading state.
// Also allows hydration callbacks to fire when a dehydrated boundary gets
// hydrated or deleted.

 // Part of the simplification of React.createElement so we can eventually move
// from React.createElement to React.jsx
// https://github.com/reactjs/rfcs/blob/createlement-rfc/text/0000-create-element-changes.md



var disableLegacyContext = false;

 // Flag to turn event.target and event.currentTarget in ReactNative from a reactTag to a component instance

var ReactDebugCurrentFrame$1;
var didWarnAboutInvalidateContextType;

{
  ReactDebugCurrentFrame$1 = ReactSharedInternals.ReactDebugCurrentFrame;
  didWarnAboutInvalidateContextType = new Set();
}

var emptyObject = {};

{
  Object.freeze(emptyObject);
}

function maskContext(type, context) {
  var contextTypes = type.contextTypes;

  if (!contextTypes) {
    return emptyObject;
  }

  var maskedContext = {};

  for (var contextName in contextTypes) {
    maskedContext[contextName] = context[contextName];
  }

  return maskedContext;
}

function checkContextTypes(typeSpecs, values, location) {
  {
    checkPropTypes(typeSpecs, values, location, 'Component', ReactDebugCurrentFrame$1.getCurrentStack);
  }
}

function validateContextBounds(context, threadID) {
  // If we don't have enough slots in this context to store this threadID,
  // fill it in without leaving any holes to ensure that the VM optimizes
  // this as non-holey index properties.
  // (Note: If `react` package is < 16.6, _threadCount is undefined.)
  for (var i = context._threadCount | 0; i <= threadID; i++) {
    // We assume that this is the same as the defaultValue which might not be
    // true if we're rendering inside a secondary renderer but they are
    // secondary because these use cases are very rare.
    context[i] = context._currentValue2;
    context._threadCount = i + 1;
  }
}
function processContext(type, context, threadID, isClass) {
  if (isClass) {
    var contextType = type.contextType;

    {
      if ('contextType' in type) {
        var isValid = // Allow null for conditional declaration
        contextType === null || contextType !== undefined && contextType.$$typeof === REACT_CONTEXT_TYPE && contextType._context === undefined; // Not a <Context.Consumer>

        if (!isValid && !didWarnAboutInvalidateContextType.has(type)) {
          didWarnAboutInvalidateContextType.add(type);
          var addendum = '';

          if (contextType === undefined) {
            addendum = ' However, it is set to undefined. ' + 'This can be caused by a typo or by mixing up named and default imports. ' + 'This can also happen due to a circular dependency, so ' + 'try moving the createContext() call to a separate file.';
          } else if (typeof contextType !== 'object') {
            addendum = ' However, it is set to a ' + typeof contextType + '.';
          } else if (contextType.$$typeof === REACT_PROVIDER_TYPE) {
            addendum = ' Did you accidentally pass the Context.Provider instead?';
          } else if (contextType._context !== undefined) {
            // <Context.Consumer>
            addendum = ' Did you accidentally pass the Context.Consumer instead?';
          } else {
            addendum = ' However, it is set to an object with keys {' + Object.keys(contextType).join(', ') + '}.';
          }

          warningWithoutStack$1(false, '%s defines an invalid contextType. ' + 'contextType should point to the Context object returned by React.createContext().%s', getComponentName(type) || 'Component', addendum);
        }
      }
    }

    if (typeof contextType === 'object' && contextType !== null) {
      validateContextBounds(contextType, threadID);
      return contextType[threadID];
    }

    if (disableLegacyContext) {
      {
        if (type.contextTypes) {
          warningWithoutStack$1(false, '%s uses the legacy contextTypes API which is no longer supported. ' + 'Use React.createContext() with static contextType instead.', getComponentName(type) || 'Unknown');
        }
      }

      return emptyObject;
    } else {
      var maskedContext = maskContext(type, context);

      {
        if (type.contextTypes) {
          checkContextTypes(type.contextTypes, maskedContext, 'context');
        }
      }

      return maskedContext;
    }
  } else {
    if (disableLegacyContext) {
      {
        if (type.contextTypes) {
          warningWithoutStack$1(false, '%s uses the legacy contextTypes API which is no longer supported. ' + 'Use React.createContext() with React.useContext() instead.', getComponentName(type) || 'Unknown');
        }
      }

      return undefined;
    } else {
      var _maskedContext = maskContext(type, context);

      {
        if (type.contextTypes) {
          checkContextTypes(type.contextTypes, _maskedContext, 'context');
        }
      }

      return _maskedContext;
    }
  }
}

// Allocates a new index for each request. Tries to stay as compact as possible so that these
// indices can be used to reference a tightly packed array. As opposed to being used in a Map.
// The first allocated index is 1.
var nextAvailableThreadIDs = new Uint16Array(16);

for (var i = 0; i < 15; i++) {
  nextAvailableThreadIDs[i] = i + 1;
}

nextAvailableThreadIDs[15] = 0;

function growThreadCountAndReturnNextAvailable() {
  var oldArray = nextAvailableThreadIDs;
  var oldSize = oldArray.length;
  var newSize = oldSize * 2;

  if (!(newSize <= 0x10000)) {
    {
      throw Error("Maximum number of concurrent React renderers exceeded. This can happen if you are not properly destroying the Readable provided by React. Ensure that you call .destroy() on it if you no longer want to read from it, and did not read to the end. If you use .pipe() this should be automatic.");
    }
  }

  var newArray = new Uint16Array(newSize);
  newArray.set(oldArray);
  nextAvailableThreadIDs = newArray;
  nextAvailableThreadIDs[0] = oldSize + 1;

  for (var _i = oldSize; _i < newSize - 1; _i++) {
    nextAvailableThreadIDs[_i] = _i + 1;
  }

  nextAvailableThreadIDs[newSize - 1] = 0;
  return oldSize;
}

function allocThreadID() {
  var nextID = nextAvailableThreadIDs[0];

  if (nextID === 0) {
    return growThreadCountAndReturnNextAvailable();
  }

  nextAvailableThreadIDs[0] = nextAvailableThreadIDs[nextID];
  return nextID;
}
function freeThreadID(id) {
  nextAvailableThreadIDs[id] = nextAvailableThreadIDs[0];
  nextAvailableThreadIDs[0] = id;
}

// A reserved attribute.
// It is handled by React separately and shouldn't be written to the DOM.
var RESERVED = 0; // A simple string attribute.
// Attributes that aren't in the whitelist are presumed to have this type.

var STRING = 1; // A string attribute that accepts booleans in React. In HTML, these are called
// "enumerated" attributes with "true" and "false" as possible values.
// When true, it should be set to a "true" string.
// When false, it should be set to a "false" string.

var BOOLEANISH_STRING = 2; // A real boolean attribute.
// When true, it should be present (set either to an empty string or its name).
// When false, it should be omitted.

var BOOLEAN = 3; // An attribute that can be used as a flag as well as with a value.
// When true, it should be present (set either to an empty string or its name).
// When false, it should be omitted.
// For any other value, should be present with that value.

var OVERLOADED_BOOLEAN = 4; // An attribute that must be numeric or parse as a numeric.
// When falsy, it should be removed.

var NUMERIC = 5; // An attribute that must be positive numeric or parse as a positive numeric.
// When falsy, it should be removed.

var POSITIVE_NUMERIC = 6;

/* eslint-disable max-len */
var ATTRIBUTE_NAME_START_CHAR = ":A-Z_a-z\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u02FF\\u0370-\\u037D\\u037F-\\u1FFF\\u200C-\\u200D\\u2070-\\u218F\\u2C00-\\u2FEF\\u3001-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFFD";
/* eslint-enable max-len */

var ATTRIBUTE_NAME_CHAR = ATTRIBUTE_NAME_START_CHAR + "\\-.0-9\\u00B7\\u0300-\\u036F\\u203F-\\u2040";

var ROOT_ATTRIBUTE_NAME = 'data-reactroot';
var VALID_ATTRIBUTE_NAME_REGEX = new RegExp('^[' + ATTRIBUTE_NAME_START_CHAR + '][' + ATTRIBUTE_NAME_CHAR + ']*$');
var hasOwnProperty$1 = Object.prototype.hasOwnProperty;
var illegalAttributeNameCache = {};
var validatedAttributeNameCache = {};
function isAttributeNameSafe(attributeName) {
  if (hasOwnProperty$1.call(validatedAttributeNameCache, attributeName)) {
    return true;
  }

  if (hasOwnProperty$1.call(illegalAttributeNameCache, attributeName)) {
    return false;
  }

  if (VALID_ATTRIBUTE_NAME_REGEX.test(attributeName)) {
    validatedAttributeNameCache[attributeName] = true;
    return true;
  }

  illegalAttributeNameCache[attributeName] = true;

  {
    warning$1(false, 'Invalid attribute name: `%s`', attributeName);
  }

  return false;
}
function shouldIgnoreAttribute(name, propertyInfo, isCustomComponentTag) {
  if (propertyInfo !== null) {
    return propertyInfo.type === RESERVED;
  }

  if (isCustomComponentTag) {
    return false;
  }

  if (name.length > 2 && (name[0] === 'o' || name[0] === 'O') && (name[1] === 'n' || name[1] === 'N')) {
    return true;
  }

  return false;
}
function shouldRemoveAttributeWithWarning(name, value, propertyInfo, isCustomComponentTag) {
  if (propertyInfo !== null && propertyInfo.type === RESERVED) {
    return false;
  }

  switch (typeof value) {
    case 'function': // $FlowIssue symbol is perfectly valid here

    case 'symbol':
      // eslint-disable-line
      return true;

    case 'boolean':
      {
        if (isCustomComponentTag) {
          return false;
        }

        if (propertyInfo !== null) {
          return !propertyInfo.acceptsBooleans;
        } else {
          var prefix = name.toLowerCase().slice(0, 5);
          return prefix !== 'data-' && prefix !== 'aria-';
        }
      }

    default:
      return false;
  }
}
function shouldRemoveAttribute(name, value, propertyInfo, isCustomComponentTag) {
  if (value === null || typeof value === 'undefined') {
    return true;
  }

  if (shouldRemoveAttributeWithWarning(name, value, propertyInfo, isCustomComponentTag)) {
    return true;
  }

  if (isCustomComponentTag) {
    return false;
  }

  if (propertyInfo !== null) {
    switch (propertyInfo.type) {
      case BOOLEAN:
        return !value;

      case OVERLOADED_BOOLEAN:
        return value === false;

      case NUMERIC:
        return isNaN(value);

      case POSITIVE_NUMERIC:
        return isNaN(value) || value < 1;
    }
  }

  return false;
}
function getPropertyInfo(name) {
  return properties.hasOwnProperty(name) ? properties[name] : null;
}

function PropertyInfoRecord(name, type, mustUseProperty, attributeName, attributeNamespace, sanitizeURL) {
  this.acceptsBooleans = type === BOOLEANISH_STRING || type === BOOLEAN || type === OVERLOADED_BOOLEAN;
  this.attributeName = attributeName;
  this.attributeNamespace = attributeNamespace;
  this.mustUseProperty = mustUseProperty;
  this.propertyName = name;
  this.type = type;
  this.sanitizeURL = sanitizeURL;
} // When adding attributes to this list, be sure to also add them to
// the `possibleStandardNames` module to ensure casing and incorrect
// name warnings.


var properties = {}; // These props are reserved by React. They shouldn't be written to the DOM.

['children', 'dangerouslySetInnerHTML', // TODO: This prevents the assignment of defaultValue to regular
// elements (not just inputs). Now that ReactDOMInput assigns to the
// defaultValue property -- do we need this?
'defaultValue', 'defaultChecked', 'innerHTML', 'suppressContentEditableWarning', 'suppressHydrationWarning', 'style'].forEach(function (name) {
  properties[name] = new PropertyInfoRecord(name, RESERVED, false, // mustUseProperty
  name, // attributeName
  null, // attributeNamespace
  false);
}); // A few React string attributes have a different name.
// This is a mapping from React prop names to the attribute names.

[['acceptCharset', 'accept-charset'], ['className', 'class'], ['htmlFor', 'for'], ['httpEquiv', 'http-equiv']].forEach(function (_ref) {
  var name = _ref[0],
      attributeName = _ref[1];
  properties[name] = new PropertyInfoRecord(name, STRING, false, // mustUseProperty
  attributeName, // attributeName
  null, // attributeNamespace
  false);
}); // These are "enumerated" HTML attributes that accept "true" and "false".
// In React, we let users pass `true` and `false` even though technically
// these aren't boolean attributes (they are coerced to strings).

['contentEditable', 'draggable', 'spellCheck', 'value'].forEach(function (name) {
  properties[name] = new PropertyInfoRecord(name, BOOLEANISH_STRING, false, // mustUseProperty
  name.toLowerCase(), // attributeName
  null, // attributeNamespace
  false);
}); // These are "enumerated" SVG attributes that accept "true" and "false".
// In React, we let users pass `true` and `false` even though technically
// these aren't boolean attributes (they are coerced to strings).
// Since these are SVG attributes, their attribute names are case-sensitive.

['autoReverse', 'externalResourcesRequired', 'focusable', 'preserveAlpha'].forEach(function (name) {
  properties[name] = new PropertyInfoRecord(name, BOOLEANISH_STRING, false, // mustUseProperty
  name, // attributeName
  null, // attributeNamespace
  false);
}); // These are HTML boolean attributes.

['allowFullScreen', 'async', // Note: there is a special case that prevents it from being written to the DOM
// on the client side because the browsers are inconsistent. Instead we call focus().
'autoFocus', 'autoPlay', 'controls', 'default', 'defer', 'disabled', 'disablePictureInPicture', 'formNoValidate', 'hidden', 'loop', 'noModule', 'noValidate', 'open', 'playsInline', 'readOnly', 'required', 'reversed', 'scoped', 'seamless', // Microdata
'itemScope'].forEach(function (name) {
  properties[name] = new PropertyInfoRecord(name, BOOLEAN, false, // mustUseProperty
  name.toLowerCase(), // attributeName
  null, // attributeNamespace
  false);
}); // These are the few React props that we set as DOM properties
// rather than attributes. These are all booleans.

['checked', // Note: `option.selected` is not updated if `select.multiple` is
// disabled with `removeAttribute`. We have special logic for handling this.
'multiple', 'muted', 'selected'].forEach(function (name) {
  properties[name] = new PropertyInfoRecord(name, BOOLEAN, true, // mustUseProperty
  name, // attributeName
  null, // attributeNamespace
  false);
}); // These are HTML attributes that are "overloaded booleans": they behave like
// booleans, but can also accept a string value.

['capture', 'download'].forEach(function (name) {
  properties[name] = new PropertyInfoRecord(name, OVERLOADED_BOOLEAN, false, // mustUseProperty
  name, // attributeName
  null, // attributeNamespace
  false);
}); // These are HTML attributes that must be positive numbers.

['cols', 'rows', 'size', 'span'].forEach(function (name) {
  properties[name] = new PropertyInfoRecord(name, POSITIVE_NUMERIC, false, // mustUseProperty
  name, // attributeName
  null, // attributeNamespace
  false);
}); // These are HTML attributes that must be numbers.

['rowSpan', 'start'].forEach(function (name) {
  properties[name] = new PropertyInfoRecord(name, NUMERIC, false, // mustUseProperty
  name.toLowerCase(), // attributeName
  null, // attributeNamespace
  false);
});
var CAMELIZE = /[\-\:]([a-z])/g;

var capitalize = function (token) {
  return token[1].toUpperCase();
}; // This is a list of all SVG attributes that need special casing, namespacing,
// or boolean value assignment. Regular attributes that just accept strings
// and have the same names are omitted, just like in the HTML whitelist.
// Some of these attributes can be hard to find. This list was created by
// scrapping the MDN documentation.


['accent-height', 'alignment-baseline', 'arabic-form', 'baseline-shift', 'cap-height', 'clip-path', 'clip-rule', 'color-interpolation', 'color-interpolation-filters', 'color-profile', 'color-rendering', 'dominant-baseline', 'enable-background', 'fill-opacity', 'fill-rule', 'flood-color', 'flood-opacity', 'font-family', 'font-size', 'font-size-adjust', 'font-stretch', 'font-style', 'font-variant', 'font-weight', 'glyph-name', 'glyph-orientation-horizontal', 'glyph-orientation-vertical', 'horiz-adv-x', 'horiz-origin-x', 'image-rendering', 'letter-spacing', 'lighting-color', 'marker-end', 'marker-mid', 'marker-start', 'overline-position', 'overline-thickness', 'paint-order', 'panose-1', 'pointer-events', 'rendering-intent', 'shape-rendering', 'stop-color', 'stop-opacity', 'strikethrough-position', 'strikethrough-thickness', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'text-anchor', 'text-decoration', 'text-rendering', 'underline-position', 'underline-thickness', 'unicode-bidi', 'unicode-range', 'units-per-em', 'v-alphabetic', 'v-hanging', 'v-ideographic', 'v-mathematical', 'vector-effect', 'vert-adv-y', 'vert-origin-x', 'vert-origin-y', 'word-spacing', 'writing-mode', 'xmlns:xlink', 'x-height'].forEach(function (attributeName) {
  var name = attributeName.replace(CAMELIZE, capitalize);
  properties[name] = new PropertyInfoRecord(name, STRING, false, // mustUseProperty
  attributeName, null, // attributeNamespace
  false);
}); // String SVG attributes with the xlink namespace.

['xlink:actuate', 'xlink:arcrole', 'xlink:role', 'xlink:show', 'xlink:title', 'xlink:type'].forEach(function (attributeName) {
  var name = attributeName.replace(CAMELIZE, capitalize);
  properties[name] = new PropertyInfoRecord(name, STRING, false, // mustUseProperty
  attributeName, 'http://www.w3.org/1999/xlink', false);
}); // String SVG attributes with the xml namespace.

['xml:base', 'xml:lang', 'xml:space'].forEach(function (attributeName) {
  var name = attributeName.replace(CAMELIZE, capitalize);
  properties[name] = new PropertyInfoRecord(name, STRING, false, // mustUseProperty
  attributeName, 'http://www.w3.org/XML/1998/namespace', false);
}); // These attribute exists both in HTML and SVG.
// The attribute name is case-sensitive in SVG so we can't just use
// the React name like we do for attributes that exist only in HTML.

['tabIndex', 'crossOrigin'].forEach(function (attributeName) {
  properties[attributeName] = new PropertyInfoRecord(attributeName, STRING, false, // mustUseProperty
  attributeName.toLowerCase(), // attributeName
  null, // attributeNamespace
  false);
}); // These attributes accept URLs. These must not allow javascript: URLS.
// These will also need to accept Trusted Types object in the future.

var xlinkHref = 'xlinkHref';
properties[xlinkHref] = new PropertyInfoRecord('xlinkHref', STRING, false, // mustUseProperty
'xlink:href', 'http://www.w3.org/1999/xlink', true);
['src', 'href', 'action', 'formAction'].forEach(function (attributeName) {
  properties[attributeName] = new PropertyInfoRecord(attributeName, STRING, false, // mustUseProperty
  attributeName.toLowerCase(), // attributeName
  null, // attributeNamespace
  true);
});

var ReactDebugCurrentFrame$2 = null;

{
  ReactDebugCurrentFrame$2 = ReactSharedInternals.ReactDebugCurrentFrame;
} // A javascript: URL can contain leading C0 control or \u0020 SPACE,
// and any newline or tab are filtered out as if they're not part of the URL.
// https://url.spec.whatwg.org/#url-parsing
// Tab or newline are defined as \r\n\t:
// https://infra.spec.whatwg.org/#ascii-tab-or-newline
// A C0 control is a code point in the range \u0000 NULL to \u001F
// INFORMATION SEPARATOR ONE, inclusive:
// https://infra.spec.whatwg.org/#c0-control-or-space

/* eslint-disable max-len */


var isJavaScriptProtocol = /^[\u0000-\u001F ]*j[\r\n\t]*a[\r\n\t]*v[\r\n\t]*a[\r\n\t]*s[\r\n\t]*c[\r\n\t]*r[\r\n\t]*i[\r\n\t]*p[\r\n\t]*t[\r\n\t]*\:/i;
var didWarn = false;

function sanitizeURL(url) {
  if (disableJavaScriptURLs) {
    if (!!isJavaScriptProtocol.test(url)) {
      {
        throw Error("React has blocked a javascript: URL as a security precaution." + (ReactDebugCurrentFrame$2.getStackAddendum()));
      }
    }
  } else if ( true && !didWarn && isJavaScriptProtocol.test(url)) {
    didWarn = true;
    warning$1(false, 'A future version of React will block javascript: URLs as a security precaution. ' + 'Use event handlers instead if you can. If you need to generate unsafe HTML try ' + 'using dangerouslySetInnerHTML instead. React was passed %s.', JSON.stringify(url));
  }
}

// code copied and modified from escape-html

/**
 * Module variables.
 * @private
 */
var matchHtmlRegExp = /["'&<>]/;
/**
 * Escapes special characters and HTML entities in a given html string.
 *
 * @param  {string} string HTML string to escape for later insertion
 * @return {string}
 * @public
 */

function escapeHtml(string) {
  var str = '' + string;
  var match = matchHtmlRegExp.exec(str);

  if (!match) {
    return str;
  }

  var escape;
  var html = '';
  var index;
  var lastIndex = 0;

  for (index = match.index; index < str.length; index++) {
    switch (str.charCodeAt(index)) {
      case 34:
        // "
        escape = '&quot;';
        break;

      case 38:
        // &
        escape = '&amp;';
        break;

      case 39:
        // '
        escape = '&#x27;'; // modified from escape-html; used to be '&#39'

        break;

      case 60:
        // <
        escape = '&lt;';
        break;

      case 62:
        // >
        escape = '&gt;';
        break;

      default:
        continue;
    }

    if (lastIndex !== index) {
      html += str.substring(lastIndex, index);
    }

    lastIndex = index + 1;
    html += escape;
  }

  return lastIndex !== index ? html + str.substring(lastIndex, index) : html;
} // end code copied and modified from escape-html

/**
 * Escapes text to prevent scripting attacks.
 *
 * @param {*} text Text value to escape.
 * @return {string} An escaped string.
 */


function escapeTextForBrowser(text) {
  if (typeof text === 'boolean' || typeof text === 'number') {
    // this shortcircuit helps perf for types that we know will never have
    // special characters, especially given that this function is used often
    // for numeric dom ids.
    return '' + text;
  }

  return escapeHtml(text);
}

/**
 * Escapes attribute value to prevent scripting attacks.
 *
 * @param {*} value Value to escape.
 * @return {string} An escaped string.
 */

function quoteAttributeValueForBrowser(value) {
  return '"' + escapeTextForBrowser(value) + '"';
}

/**
 * Operations for dealing with DOM properties.
 */

/**
 * Creates markup for the ID property.
 *
 * @param {string} id Unescaped ID.
 * @return {string} Markup string.
 */


function createMarkupForRoot() {
  return ROOT_ATTRIBUTE_NAME + '=""';
}
/**
 * Creates markup for a property.
 *
 * @param {string} name
 * @param {*} value
 * @return {?string} Markup string, or null if the property was invalid.
 */

function createMarkupForProperty(name, value) {
  var propertyInfo = getPropertyInfo(name);

  if (name !== 'style' && shouldIgnoreAttribute(name, propertyInfo, false)) {
    return '';
  }

  if (shouldRemoveAttribute(name, value, propertyInfo, false)) {
    return '';
  }

  if (propertyInfo !== null) {
    var attributeName = propertyInfo.attributeName;
    var type = propertyInfo.type;

    if (type === BOOLEAN || type === OVERLOADED_BOOLEAN && value === true) {
      return attributeName + '=""';
    } else {
      if (propertyInfo.sanitizeURL) {
        value = '' + value;
        sanitizeURL(value);
      }

      return attributeName + '=' + quoteAttributeValueForBrowser(value);
    }
  } else if (isAttributeNameSafe(name)) {
    return name + '=' + quoteAttributeValueForBrowser(value);
  }

  return '';
}
/**
 * Creates markup for a custom property.
 *
 * @param {string} name
 * @param {*} value
 * @return {string} Markup string, or empty string if the property was invalid.
 */

function createMarkupForCustomAttribute(name, value) {
  if (!isAttributeNameSafe(name) || value == null) {
    return '';
  }

  return name + '=' + quoteAttributeValueForBrowser(value);
}

/**
 * inlined Object.is polyfill to avoid requiring consumers ship their own
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/is
 */
function is(x, y) {
  return x === y && (x !== 0 || 1 / x === 1 / y) || x !== x && y !== y // eslint-disable-line no-self-compare
  ;
}

var is$1 = typeof Object.is === 'function' ? Object.is : is;

var currentlyRenderingComponent = null;
var firstWorkInProgressHook = null;
var workInProgressHook = null; // Whether the work-in-progress hook is a re-rendered hook

var isReRender = false; // Whether an update was scheduled during the currently executing render pass.

var didScheduleRenderPhaseUpdate = false; // Lazily created map of render-phase updates

var renderPhaseUpdates = null; // Counter to prevent infinite loops.

var numberOfReRenders = 0;
var RE_RENDER_LIMIT = 25;
var isInHookUserCodeInDev = false; // In DEV, this is the name of the currently executing primitive hook

var currentHookNameInDev;

function resolveCurrentlyRenderingComponent() {
  if (!(currentlyRenderingComponent !== null)) {
    {
      throw Error("Invalid hook call. Hooks can only be called inside of the body of a function component. This could happen for one of the following reasons:\n1. You might have mismatching versions of React and the renderer (such as React DOM)\n2. You might be breaking the Rules of Hooks\n3. You might have more than one copy of React in the same app\nSee https://fb.me/react-invalid-hook-call for tips about how to debug and fix this problem.");
    }
  }

  {
    !!isInHookUserCodeInDev ? warning$1(false, 'Do not call Hooks inside useEffect(...), useMemo(...), or other built-in Hooks. ' + 'You can only call Hooks at the top level of your React function. ' + 'For more information, see ' + 'https://fb.me/rules-of-hooks') : void 0;
  }

  return currentlyRenderingComponent;
}

function areHookInputsEqual(nextDeps, prevDeps) {
  if (prevDeps === null) {
    {
      warning$1(false, '%s received a final argument during this render, but not during ' + 'the previous render. Even though the final argument is optional, ' + 'its type cannot change between renders.', currentHookNameInDev);
    }

    return false;
  }

  {
    // Don't bother comparing lengths in prod because these arrays should be
    // passed inline.
    if (nextDeps.length !== prevDeps.length) {
      warning$1(false, 'The final argument passed to %s changed size between renders. The ' + 'order and size of this array must remain constant.\n\n' + 'Previous: %s\n' + 'Incoming: %s', currentHookNameInDev, "[" + nextDeps.join(', ') + "]", "[" + prevDeps.join(', ') + "]");
    }
  }

  for (var i = 0; i < prevDeps.length && i < nextDeps.length; i++) {
    if (is$1(nextDeps[i], prevDeps[i])) {
      continue;
    }

    return false;
  }

  return true;
}

function createHook() {
  if (numberOfReRenders > 0) {
    {
      {
        throw Error("Rendered more hooks than during the previous render");
      }
    }
  }

  return {
    memoizedState: null,
    queue: null,
    next: null
  };
}

function createWorkInProgressHook() {
  if (workInProgressHook === null) {
    // This is the first hook in the list
    if (firstWorkInProgressHook === null) {
      isReRender = false;
      firstWorkInProgressHook = workInProgressHook = createHook();
    } else {
      // There's already a work-in-progress. Reuse it.
      isReRender = true;
      workInProgressHook = firstWorkInProgressHook;
    }
  } else {
    if (workInProgressHook.next === null) {
      isReRender = false; // Append to the end of the list

      workInProgressHook = workInProgressHook.next = createHook();
    } else {
      // There's already a work-in-progress. Reuse it.
      isReRender = true;
      workInProgressHook = workInProgressHook.next;
    }
  }

  return workInProgressHook;
}

function prepareToUseHooks(componentIdentity) {
  currentlyRenderingComponent = componentIdentity;

  {
    isInHookUserCodeInDev = false;
  } // The following should have already been reset
  // didScheduleRenderPhaseUpdate = false;
  // firstWorkInProgressHook = null;
  // numberOfReRenders = 0;
  // renderPhaseUpdates = null;
  // workInProgressHook = null;

}
function finishHooks(Component, props, children, refOrContext) {
  // This must be called after every function component to prevent hooks from
  // being used in classes.
  while (didScheduleRenderPhaseUpdate) {
    // Updates were scheduled during the render phase. They are stored in
    // the `renderPhaseUpdates` map. Call the component again, reusing the
    // work-in-progress hooks and applying the additional updates on top. Keep
    // restarting until no more updates are scheduled.
    didScheduleRenderPhaseUpdate = false;
    numberOfReRenders += 1; // Start over from the beginning of the list

    workInProgressHook = null;
    children = Component(props, refOrContext);
  }

  currentlyRenderingComponent = null;
  firstWorkInProgressHook = null;
  numberOfReRenders = 0;
  renderPhaseUpdates = null;
  workInProgressHook = null;

  {
    isInHookUserCodeInDev = false;
  } // These were reset above
  // currentlyRenderingComponent = null;
  // didScheduleRenderPhaseUpdate = false;
  // firstWorkInProgressHook = null;
  // numberOfReRenders = 0;
  // renderPhaseUpdates = null;
  // workInProgressHook = null;


  return children;
}

function readContext(context, observedBits) {
  var threadID = currentThreadID;
  validateContextBounds(context, threadID);

  {
    !!isInHookUserCodeInDev ? warning$1(false, 'Context can only be read while React is rendering. ' + 'In classes, you can read it in the render method or getDerivedStateFromProps. ' + 'In function components, you can read it directly in the function body, but not ' + 'inside Hooks like useReducer() or useMemo().') : void 0;
  }

  return context[threadID];
}

function useContext(context, observedBits) {
  {
    currentHookNameInDev = 'useContext';
  }

  resolveCurrentlyRenderingComponent();
  var threadID = currentThreadID;
  validateContextBounds(context, threadID);
  return context[threadID];
}

function basicStateReducer(state, action) {
  return typeof action === 'function' ? action(state) : action;
}

function useState(initialState) {
  {
    currentHookNameInDev = 'useState';
  }

  return useReducer(basicStateReducer, // useReducer has a special case to support lazy useState initializers
  initialState);
}
function useReducer(reducer, initialArg, init) {
  {
    if (reducer !== basicStateReducer) {
      currentHookNameInDev = 'useReducer';
    }
  }

  currentlyRenderingComponent = resolveCurrentlyRenderingComponent();
  workInProgressHook = createWorkInProgressHook();

  if (isReRender) {
    // This is a re-render. Apply the new render phase updates to the previous
    // current hook.
    var queue = workInProgressHook.queue;
    var dispatch = queue.dispatch;

    if (renderPhaseUpdates !== null) {
      // Render phase updates are stored in a map of queue -> linked list
      var firstRenderPhaseUpdate = renderPhaseUpdates.get(queue);

      if (firstRenderPhaseUpdate !== undefined) {
        renderPhaseUpdates.delete(queue);
        var newState = workInProgressHook.memoizedState;
        var update = firstRenderPhaseUpdate;

        do {
          // Process this render phase update. We don't have to check the
          // priority because it will always be the same as the current
          // render's.
          var action = update.action;

          {
            isInHookUserCodeInDev = true;
          }

          newState = reducer(newState, action);

          {
            isInHookUserCodeInDev = false;
          }

          update = update.next;
        } while (update !== null);

        workInProgressHook.memoizedState = newState;
        return [newState, dispatch];
      }
    }

    return [workInProgressHook.memoizedState, dispatch];
  } else {
    {
      isInHookUserCodeInDev = true;
    }

    var initialState;

    if (reducer === basicStateReducer) {
      // Special case for `useState`.
      initialState = typeof initialArg === 'function' ? initialArg() : initialArg;
    } else {
      initialState = init !== undefined ? init(initialArg) : initialArg;
    }

    {
      isInHookUserCodeInDev = false;
    }

    workInProgressHook.memoizedState = initialState;

    var _queue = workInProgressHook.queue = {
      last: null,
      dispatch: null
    };

    var _dispatch = _queue.dispatch = dispatchAction.bind(null, currentlyRenderingComponent, _queue);

    return [workInProgressHook.memoizedState, _dispatch];
  }
}

function useMemo(nextCreate, deps) {
  currentlyRenderingComponent = resolveCurrentlyRenderingComponent();
  workInProgressHook = createWorkInProgressHook();
  var nextDeps = deps === undefined ? null : deps;

  if (workInProgressHook !== null) {
    var prevState = workInProgressHook.memoizedState;

    if (prevState !== null) {
      if (nextDeps !== null) {
        var prevDeps = prevState[1];

        if (areHookInputsEqual(nextDeps, prevDeps)) {
          return prevState[0];
        }
      }
    }
  }

  {
    isInHookUserCodeInDev = true;
  }

  var nextValue = nextCreate();

  {
    isInHookUserCodeInDev = false;
  }

  workInProgressHook.memoizedState = [nextValue, nextDeps];
  return nextValue;
}

function useRef(initialValue) {
  currentlyRenderingComponent = resolveCurrentlyRenderingComponent();
  workInProgressHook = createWorkInProgressHook();
  var previousRef = workInProgressHook.memoizedState;

  if (previousRef === null) {
    var ref = {
      current: initialValue
    };

    {
      Object.seal(ref);
    }

    workInProgressHook.memoizedState = ref;
    return ref;
  } else {
    return previousRef;
  }
}

function useLayoutEffect(create, inputs) {
  {
    currentHookNameInDev = 'useLayoutEffect';
  }

  warning$1(false, 'useLayoutEffect does nothing on the server, because its effect cannot ' + "be encoded into the server renderer's output format. This will lead " + 'to a mismatch between the initial, non-hydrated UI and the intended ' + 'UI. To avoid this, useLayoutEffect should only be used in ' + 'components that render exclusively on the client. ' + 'See https://fb.me/react-uselayouteffect-ssr for common fixes.');
}

function dispatchAction(componentIdentity, queue, action) {
  if (!(numberOfReRenders < RE_RENDER_LIMIT)) {
    {
      throw Error("Too many re-renders. React limits the number of renders to prevent an infinite loop.");
    }
  }

  if (componentIdentity === currentlyRenderingComponent) {
    // This is a render phase update. Stash it in a lazily-created map of
    // queue -> linked list of updates. After this render pass, we'll restart
    // and apply the stashed updates on top of the work-in-progress hook.
    didScheduleRenderPhaseUpdate = true;
    var update = {
      action: action,
      next: null
    };

    if (renderPhaseUpdates === null) {
      renderPhaseUpdates = new Map();
    }

    var firstRenderPhaseUpdate = renderPhaseUpdates.get(queue);

    if (firstRenderPhaseUpdate === undefined) {
      renderPhaseUpdates.set(queue, update);
    } else {
      // Append the update to the end of the list.
      var lastRenderPhaseUpdate = firstRenderPhaseUpdate;

      while (lastRenderPhaseUpdate.next !== null) {
        lastRenderPhaseUpdate = lastRenderPhaseUpdate.next;
      }

      lastRenderPhaseUpdate.next = update;
    }
  } else {// This means an update has happened after the function component has
    // returned. On the server this is a no-op. In React Fiber, the update
    // would be scheduled for a future render.
  }
}

function useCallback(callback, deps) {
  // Callbacks are passed as they are in the server environment.
  return callback;
}

function useResponder(responder, props) {
  return {
    props: props,
    responder: responder
  };
}

function useDeferredValue(value, config) {
  resolveCurrentlyRenderingComponent();
  return value;
}

function useTransition(config) {
  resolveCurrentlyRenderingComponent();

  var startTransition = function (callback) {
    callback();
  };

  return [startTransition, false];
}

function noop() {}

var currentThreadID = 0;
function setCurrentThreadID(threadID) {
  currentThreadID = threadID;
}
var Dispatcher = {
  readContext: readContext,
  useContext: useContext,
  useMemo: useMemo,
  useReducer: useReducer,
  useRef: useRef,
  useState: useState,
  useLayoutEffect: useLayoutEffect,
  useCallback: useCallback,
  // useImperativeHandle is not run in the server environment
  useImperativeHandle: noop,
  // Effects are not run in the server environment.
  useEffect: noop,
  // Debugging effect
  useDebugValue: noop,
  useResponder: useResponder,
  useDeferredValue: useDeferredValue,
  useTransition: useTransition
};

var HTML_NAMESPACE = 'http://www.w3.org/1999/xhtml';
var MATH_NAMESPACE = 'http://www.w3.org/1998/Math/MathML';
var SVG_NAMESPACE = 'http://www.w3.org/2000/svg';
var Namespaces = {
  html: HTML_NAMESPACE,
  mathml: MATH_NAMESPACE,
  svg: SVG_NAMESPACE
}; // Assumes there is no parent namespace.

function getIntrinsicNamespace(type) {
  switch (type) {
    case 'svg':
      return SVG_NAMESPACE;

    case 'math':
      return MATH_NAMESPACE;

    default:
      return HTML_NAMESPACE;
  }
}
function getChildNamespace(parentNamespace, type) {
  if (parentNamespace == null || parentNamespace === HTML_NAMESPACE) {
    // No (or default) parent namespace: potential entry point.
    return getIntrinsicNamespace(type);
  }

  if (parentNamespace === SVG_NAMESPACE && type === 'foreignObject') {
    // We're leaving SVG.
    return HTML_NAMESPACE;
  } // By default, pass namespace below.


  return parentNamespace;
}

var ReactDebugCurrentFrame$3 = null;
var ReactControlledValuePropTypes = {
  checkPropTypes: null
};

{
  ReactDebugCurrentFrame$3 = ReactSharedInternals.ReactDebugCurrentFrame;
  var hasReadOnlyValue = {
    button: true,
    checkbox: true,
    image: true,
    hidden: true,
    radio: true,
    reset: true,
    submit: true
  };
  var propTypes = {
    value: function (props, propName, componentName) {
      if (hasReadOnlyValue[props.type] || props.onChange || props.readOnly || props.disabled || props[propName] == null || enableFlareAPI && props.listeners) {
        return null;
      }

      return new Error('You provided a `value` prop to a form field without an ' + '`onChange` handler. This will render a read-only field. If ' + 'the field should be mutable use `defaultValue`. Otherwise, ' + 'set either `onChange` or `readOnly`.');
    },
    checked: function (props, propName, componentName) {
      if (props.onChange || props.readOnly || props.disabled || props[propName] == null || enableFlareAPI && props.listeners) {
        return null;
      }

      return new Error('You provided a `checked` prop to a form field without an ' + '`onChange` handler. This will render a read-only field. If ' + 'the field should be mutable use `defaultChecked`. Otherwise, ' + 'set either `onChange` or `readOnly`.');
    }
  };
  /**
   * Provide a linked `value` attribute for controlled forms. You should not use
   * this outside of the ReactDOM controlled form components.
   */

  ReactControlledValuePropTypes.checkPropTypes = function (tagName, props) {
    checkPropTypes(propTypes, props, 'prop', tagName, ReactDebugCurrentFrame$3.getStackAddendum);
  };
}

// For HTML, certain tags should omit their close tag. We keep a whitelist for
// those special-case tags.
var omittedCloseTags = {
  area: true,
  base: true,
  br: true,
  col: true,
  embed: true,
  hr: true,
  img: true,
  input: true,
  keygen: true,
  link: true,
  meta: true,
  param: true,
  source: true,
  track: true,
  wbr: true // NOTE: menuitem's close tag should be omitted, but that causes problems.

};

// `omittedCloseTags` except that `menuitem` should still have its closing tag.

var voidElementTags = _assign({
  menuitem: true
}, omittedCloseTags);

// or add stack by default to invariants where possible.

var HTML = '__html';
var ReactDebugCurrentFrame$4 = null;

{
  ReactDebugCurrentFrame$4 = ReactSharedInternals.ReactDebugCurrentFrame;
}

function assertValidProps(tag, props) {
  if (!props) {
    return;
  } // Note the use of `==` which checks for null or undefined.


  if (voidElementTags[tag]) {
    if (!(props.children == null && props.dangerouslySetInnerHTML == null)) {
      {
        throw Error(tag + " is a void element tag and must neither have `children` nor use `dangerouslySetInnerHTML`." + (ReactDebugCurrentFrame$4.getStackAddendum()));
      }
    }
  }

  if (props.dangerouslySetInnerHTML != null) {
    if (!(props.children == null)) {
      {
        throw Error("Can only set one of `children` or `props.dangerouslySetInnerHTML`.");
      }
    }

    if (!(typeof props.dangerouslySetInnerHTML === 'object' && HTML in props.dangerouslySetInnerHTML)) {
      {
        throw Error("`props.dangerouslySetInnerHTML` must be in the form `{__html: ...}`. Please visit https://fb.me/react-invariant-dangerously-set-inner-html for more information.");
      }
    }
  }

  {
    !(props.suppressContentEditableWarning || !props.contentEditable || props.children == null) ? warning$1(false, 'A component is `contentEditable` and contains `children` managed by ' + 'React. It is now your responsibility to guarantee that none of ' + 'those nodes are unexpectedly modified or duplicated. This is ' + 'probably not intentional.') : void 0;
  }

  if (!(props.style == null || typeof props.style === 'object')) {
    {
      throw Error("The `style` prop expects a mapping from style properties to values, not a string. For example, style={{marginRight: spacing + 'em'}} when using JSX." + (ReactDebugCurrentFrame$4.getStackAddendum()));
    }
  }
}

/**
 * CSS properties which accept numbers but are not in units of "px".
 */
var isUnitlessNumber = {
  animationIterationCount: true,
  borderImageOutset: true,
  borderImageSlice: true,
  borderImageWidth: true,
  boxFlex: true,
  boxFlexGroup: true,
  boxOrdinalGroup: true,
  columnCount: true,
  columns: true,
  flex: true,
  flexGrow: true,
  flexPositive: true,
  flexShrink: true,
  flexNegative: true,
  flexOrder: true,
  gridArea: true,
  gridRow: true,
  gridRowEnd: true,
  gridRowSpan: true,
  gridRowStart: true,
  gridColumn: true,
  gridColumnEnd: true,
  gridColumnSpan: true,
  gridColumnStart: true,
  fontWeight: true,
  lineClamp: true,
  lineHeight: true,
  opacity: true,
  order: true,
  orphans: true,
  tabSize: true,
  widows: true,
  zIndex: true,
  zoom: true,
  // SVG-related properties
  fillOpacity: true,
  floodOpacity: true,
  stopOpacity: true,
  strokeDasharray: true,
  strokeDashoffset: true,
  strokeMiterlimit: true,
  strokeOpacity: true,
  strokeWidth: true
};
/**
 * @param {string} prefix vendor-specific prefix, eg: Webkit
 * @param {string} key style name, eg: transitionDuration
 * @return {string} style name prefixed with `prefix`, properly camelCased, eg:
 * WebkitTransitionDuration
 */

function prefixKey(prefix, key) {
  return prefix + key.charAt(0).toUpperCase() + key.substring(1);
}
/**
 * Support style names that may come passed in prefixed by adding permutations
 * of vendor prefixes.
 */


var prefixes = ['Webkit', 'ms', 'Moz', 'O']; // Using Object.keys here, or else the vanilla for-in loop makes IE8 go into an
// infinite loop, because it iterates over the newly added props too.

Object.keys(isUnitlessNumber).forEach(function (prop) {
  prefixes.forEach(function (prefix) {
    isUnitlessNumber[prefixKey(prefix, prop)] = isUnitlessNumber[prop];
  });
});

/**
 * Convert a value into the proper css writable value. The style name `name`
 * should be logical (no hyphens), as specified
 * in `CSSProperty.isUnitlessNumber`.
 *
 * @param {string} name CSS property name such as `topMargin`.
 * @param {*} value CSS property value such as `10px`.
 * @return {string} Normalized style value with dimensions applied.
 */

function dangerousStyleValue(name, value, isCustomProperty) {
  // Note that we've removed escapeTextForBrowser() calls here since the
  // whole string will be escaped when the attribute is injected into
  // the markup. If you provide unsafe user data here they can inject
  // arbitrary CSS which may be problematic (I couldn't repro this):
  // https://www.owasp.org/index.php/XSS_Filter_Evasion_Cheat_Sheet
  // http://www.thespanner.co.uk/2007/11/26/ultimate-xss-css-injection/
  // This is not an XSS hole but instead a potential CSS injection issue
  // which has lead to a greater discussion about how we're going to
  // trust URLs moving forward. See #2115901
  var isEmpty = value == null || typeof value === 'boolean' || value === '';

  if (isEmpty) {
    return '';
  }

  if (!isCustomProperty && typeof value === 'number' && value !== 0 && !(isUnitlessNumber.hasOwnProperty(name) && isUnitlessNumber[name])) {
    return value + 'px'; // Presumes implicit 'px' suffix for unitless numbers
  }

  return ('' + value).trim();
}

var uppercasePattern = /([A-Z])/g;
var msPattern = /^ms-/;
/**
 * Hyphenates a camelcased CSS property name, for example:
 *
 *   > hyphenateStyleName('backgroundColor')
 *   < "background-color"
 *   > hyphenateStyleName('MozTransition')
 *   < "-moz-transition"
 *   > hyphenateStyleName('msTransition')
 *   < "-ms-transition"
 *
 * As Modernizr suggests (http://modernizr.com/docs/#prefixed), an `ms` prefix
 * is converted to `-ms-`.
 */

function hyphenateStyleName(name) {
  return name.replace(uppercasePattern, '-$1').toLowerCase().replace(msPattern, '-ms-');
}

function isCustomComponent(tagName, props) {
  if (tagName.indexOf('-') === -1) {
    return typeof props.is === 'string';
  }

  switch (tagName) {
    // These are reserved SVG and MathML elements.
    // We don't mind this whitelist too much because we expect it to never grow.
    // The alternative is to track the namespace in a few places which is convoluted.
    // https://w3c.github.io/webcomponents/spec/custom/#custom-elements-core-concepts
    case 'annotation-xml':
    case 'color-profile':
    case 'font-face':
    case 'font-face-src':
    case 'font-face-uri':
    case 'font-face-format':
    case 'font-face-name':
    case 'missing-glyph':
      return false;

    default:
      return true;
  }
}

var warnValidStyle = function () {};

{
  // 'msTransform' is correct, but the other prefixes should be capitalized
  var badVendoredStyleNamePattern = /^(?:webkit|moz|o)[A-Z]/;
  var msPattern$1 = /^-ms-/;
  var hyphenPattern = /-(.)/g; // style values shouldn't contain a semicolon

  var badStyleValueWithSemicolonPattern = /;\s*$/;
  var warnedStyleNames = {};
  var warnedStyleValues = {};
  var warnedForNaNValue = false;
  var warnedForInfinityValue = false;

  var camelize = function (string) {
    return string.replace(hyphenPattern, function (_, character) {
      return character.toUpperCase();
    });
  };

  var warnHyphenatedStyleName = function (name) {
    if (warnedStyleNames.hasOwnProperty(name) && warnedStyleNames[name]) {
      return;
    }

    warnedStyleNames[name] = true;
    warning$1(false, 'Unsupported style property %s. Did you mean %s?', name, // As Andi Smith suggests
    // (http://www.andismith.com/blog/2012/02/modernizr-prefixed/), an `-ms` prefix
    // is converted to lowercase `ms`.
    camelize(name.replace(msPattern$1, 'ms-')));
  };

  var warnBadVendoredStyleName = function (name) {
    if (warnedStyleNames.hasOwnProperty(name) && warnedStyleNames[name]) {
      return;
    }

    warnedStyleNames[name] = true;
    warning$1(false, 'Unsupported vendor-prefixed style property %s. Did you mean %s?', name, name.charAt(0).toUpperCase() + name.slice(1));
  };

  var warnStyleValueWithSemicolon = function (name, value) {
    if (warnedStyleValues.hasOwnProperty(value) && warnedStyleValues[value]) {
      return;
    }

    warnedStyleValues[value] = true;
    warning$1(false, "Style property values shouldn't contain a semicolon. " + 'Try "%s: %s" instead.', name, value.replace(badStyleValueWithSemicolonPattern, ''));
  };

  var warnStyleValueIsNaN = function (name, value) {
    if (warnedForNaNValue) {
      return;
    }

    warnedForNaNValue = true;
    warning$1(false, '`NaN` is an invalid value for the `%s` css style property.', name);
  };

  var warnStyleValueIsInfinity = function (name, value) {
    if (warnedForInfinityValue) {
      return;
    }

    warnedForInfinityValue = true;
    warning$1(false, '`Infinity` is an invalid value for the `%s` css style property.', name);
  };

  warnValidStyle = function (name, value) {
    if (name.indexOf('-') > -1) {
      warnHyphenatedStyleName(name);
    } else if (badVendoredStyleNamePattern.test(name)) {
      warnBadVendoredStyleName(name);
    } else if (badStyleValueWithSemicolonPattern.test(value)) {
      warnStyleValueWithSemicolon(name, value);
    }

    if (typeof value === 'number') {
      if (isNaN(value)) {
        warnStyleValueIsNaN(name, value);
      } else if (!isFinite(value)) {
        warnStyleValueIsInfinity(name, value);
      }
    }
  };
}

var warnValidStyle$1 = warnValidStyle;

var ariaProperties = {
  'aria-current': 0,
  // state
  'aria-details': 0,
  'aria-disabled': 0,
  // state
  'aria-hidden': 0,
  // state
  'aria-invalid': 0,
  // state
  'aria-keyshortcuts': 0,
  'aria-label': 0,
  'aria-roledescription': 0,
  // Widget Attributes
  'aria-autocomplete': 0,
  'aria-checked': 0,
  'aria-expanded': 0,
  'aria-haspopup': 0,
  'aria-level': 0,
  'aria-modal': 0,
  'aria-multiline': 0,
  'aria-multiselectable': 0,
  'aria-orientation': 0,
  'aria-placeholder': 0,
  'aria-pressed': 0,
  'aria-readonly': 0,
  'aria-required': 0,
  'aria-selected': 0,
  'aria-sort': 0,
  'aria-valuemax': 0,
  'aria-valuemin': 0,
  'aria-valuenow': 0,
  'aria-valuetext': 0,
  // Live Region Attributes
  'aria-atomic': 0,
  'aria-busy': 0,
  'aria-live': 0,
  'aria-relevant': 0,
  // Drag-and-Drop Attributes
  'aria-dropeffect': 0,
  'aria-grabbed': 0,
  // Relationship Attributes
  'aria-activedescendant': 0,
  'aria-colcount': 0,
  'aria-colindex': 0,
  'aria-colspan': 0,
  'aria-controls': 0,
  'aria-describedby': 0,
  'aria-errormessage': 0,
  'aria-flowto': 0,
  'aria-labelledby': 0,
  'aria-owns': 0,
  'aria-posinset': 0,
  'aria-rowcount': 0,
  'aria-rowindex': 0,
  'aria-rowspan': 0,
  'aria-setsize': 0
};

var warnedProperties = {};
var rARIA = new RegExp('^(aria)-[' + ATTRIBUTE_NAME_CHAR + ']*$');
var rARIACamel = new RegExp('^(aria)[A-Z][' + ATTRIBUTE_NAME_CHAR + ']*$');
var hasOwnProperty$2 = Object.prototype.hasOwnProperty;

function validateProperty(tagName, name) {
  if (hasOwnProperty$2.call(warnedProperties, name) && warnedProperties[name]) {
    return true;
  }

  if (rARIACamel.test(name)) {
    var ariaName = 'aria-' + name.slice(4).toLowerCase();
    var correctName = ariaProperties.hasOwnProperty(ariaName) ? ariaName : null; // If this is an aria-* attribute, but is not listed in the known DOM
    // DOM properties, then it is an invalid aria-* attribute.

    if (correctName == null) {
      warning$1(false, 'Invalid ARIA attribute `%s`. ARIA attributes follow the pattern aria-* and must be lowercase.', name);
      warnedProperties[name] = true;
      return true;
    } // aria-* attributes should be lowercase; suggest the lowercase version.


    if (name !== correctName) {
      warning$1(false, 'Invalid ARIA attribute `%s`. Did you mean `%s`?', name, correctName);
      warnedProperties[name] = true;
      return true;
    }
  }

  if (rARIA.test(name)) {
    var lowerCasedName = name.toLowerCase();
    var standardName = ariaProperties.hasOwnProperty(lowerCasedName) ? lowerCasedName : null; // If this is an aria-* attribute, but is not listed in the known DOM
    // DOM properties, then it is an invalid aria-* attribute.

    if (standardName == null) {
      warnedProperties[name] = true;
      return false;
    } // aria-* attributes should be lowercase; suggest the lowercase version.


    if (name !== standardName) {
      warning$1(false, 'Unknown ARIA attribute `%s`. Did you mean `%s`?', name, standardName);
      warnedProperties[name] = true;
      return true;
    }
  }

  return true;
}

function warnInvalidARIAProps(type, props) {
  var invalidProps = [];

  for (var key in props) {
    var isValid = validateProperty(type, key);

    if (!isValid) {
      invalidProps.push(key);
    }
  }

  var unknownPropString = invalidProps.map(function (prop) {
    return '`' + prop + '`';
  }).join(', ');

  if (invalidProps.length === 1) {
    warning$1(false, 'Invalid aria prop %s on <%s> tag. ' + 'For details, see https://fb.me/invalid-aria-prop', unknownPropString, type);
  } else if (invalidProps.length > 1) {
    warning$1(false, 'Invalid aria props %s on <%s> tag. ' + 'For details, see https://fb.me/invalid-aria-prop', unknownPropString, type);
  }
}

function validateProperties(type, props) {
  if (isCustomComponent(type, props)) {
    return;
  }

  warnInvalidARIAProps(type, props);
}

var didWarnValueNull = false;
function validateProperties$1(type, props) {
  if (type !== 'input' && type !== 'textarea' && type !== 'select') {
    return;
  }

  if (props != null && props.value === null && !didWarnValueNull) {
    didWarnValueNull = true;

    if (type === 'select' && props.multiple) {
      warning$1(false, '`value` prop on `%s` should not be null. ' + 'Consider using an empty array when `multiple` is set to `true` ' + 'to clear the component or `undefined` for uncontrolled components.', type);
    } else {
      warning$1(false, '`value` prop on `%s` should not be null. ' + 'Consider using an empty string to clear the component or `undefined` ' + 'for uncontrolled components.', type);
    }
  }
}

/**
 * Registers plugins so that they can extract and dispatch events.
 *
 * @see {EventPluginHub}
 */

/**
 * Ordered list of injected plugins.
 */



/**
 * Mapping from event name to dispatch config
 */


/**
 * Mapping from registration name to plugin module
 */

var registrationNameModules = {};
/**
 * Mapping from registration name to event name
 */


/**
 * Mapping from lowercase registration names to the properly cased version,
 * used to warn in the case of missing event handlers. Available
 * only in true.
 * @type {Object}
 */

var possibleRegistrationNames = {}; // Trust the developer to only use possibleRegistrationNames in true

/**
 * Injects an ordering of plugins (by plugin name). This allows the ordering
 * to be decoupled from injection of the actual plugins so that ordering is
 * always deterministic regardless of packaging, on-the-fly injection, etc.
 *
 * @param {array} InjectedEventPluginOrder
 * @internal
 * @see {EventPluginHub.injection.injectEventPluginOrder}
 */


/**
 * Injects plugins to be used by `EventPluginHub`. The plugin names must be
 * in the ordering injected by `injectEventPluginOrder`.
 *
 * Plugins can be injected as part of page initialization or on-the-fly.
 *
 * @param {object} injectedNamesToPlugins Map from names to plugin modules.
 * @internal
 * @see {EventPluginHub.injection.injectEventPluginsByName}
 */

// When adding attributes to the HTML or SVG whitelist, be sure to
// also add them to this module to ensure casing and incorrect name
// warnings.
var possibleStandardNames = {
  // HTML
  accept: 'accept',
  acceptcharset: 'acceptCharset',
  'accept-charset': 'acceptCharset',
  accesskey: 'accessKey',
  action: 'action',
  allowfullscreen: 'allowFullScreen',
  alt: 'alt',
  as: 'as',
  async: 'async',
  autocapitalize: 'autoCapitalize',
  autocomplete: 'autoComplete',
  autocorrect: 'autoCorrect',
  autofocus: 'autoFocus',
  autoplay: 'autoPlay',
  autosave: 'autoSave',
  capture: 'capture',
  cellpadding: 'cellPadding',
  cellspacing: 'cellSpacing',
  challenge: 'challenge',
  charset: 'charSet',
  checked: 'checked',
  children: 'children',
  cite: 'cite',
  class: 'className',
  classid: 'classID',
  classname: 'className',
  cols: 'cols',
  colspan: 'colSpan',
  content: 'content',
  contenteditable: 'contentEditable',
  contextmenu: 'contextMenu',
  controls: 'controls',
  controlslist: 'controlsList',
  coords: 'coords',
  crossorigin: 'crossOrigin',
  dangerouslysetinnerhtml: 'dangerouslySetInnerHTML',
  data: 'data',
  datetime: 'dateTime',
  default: 'default',
  defaultchecked: 'defaultChecked',
  defaultvalue: 'defaultValue',
  defer: 'defer',
  dir: 'dir',
  disabled: 'disabled',
  disablepictureinpicture: 'disablePictureInPicture',
  download: 'download',
  draggable: 'draggable',
  enctype: 'encType',
  for: 'htmlFor',
  form: 'form',
  formmethod: 'formMethod',
  formaction: 'formAction',
  formenctype: 'formEncType',
  formnovalidate: 'formNoValidate',
  formtarget: 'formTarget',
  frameborder: 'frameBorder',
  headers: 'headers',
  height: 'height',
  hidden: 'hidden',
  high: 'high',
  href: 'href',
  hreflang: 'hrefLang',
  htmlfor: 'htmlFor',
  httpequiv: 'httpEquiv',
  'http-equiv': 'httpEquiv',
  icon: 'icon',
  id: 'id',
  innerhtml: 'innerHTML',
  inputmode: 'inputMode',
  integrity: 'integrity',
  is: 'is',
  itemid: 'itemID',
  itemprop: 'itemProp',
  itemref: 'itemRef',
  itemscope: 'itemScope',
  itemtype: 'itemType',
  keyparams: 'keyParams',
  keytype: 'keyType',
  kind: 'kind',
  label: 'label',
  lang: 'lang',
  list: 'list',
  loop: 'loop',
  low: 'low',
  manifest: 'manifest',
  marginwidth: 'marginWidth',
  marginheight: 'marginHeight',
  max: 'max',
  maxlength: 'maxLength',
  media: 'media',
  mediagroup: 'mediaGroup',
  method: 'method',
  min: 'min',
  minlength: 'minLength',
  multiple: 'multiple',
  muted: 'muted',
  name: 'name',
  nomodule: 'noModule',
  nonce: 'nonce',
  novalidate: 'noValidate',
  open: 'open',
  optimum: 'optimum',
  pattern: 'pattern',
  placeholder: 'placeholder',
  playsinline: 'playsInline',
  poster: 'poster',
  preload: 'preload',
  profile: 'profile',
  radiogroup: 'radioGroup',
  readonly: 'readOnly',
  referrerpolicy: 'referrerPolicy',
  rel: 'rel',
  required: 'required',
  reversed: 'reversed',
  role: 'role',
  rows: 'rows',
  rowspan: 'rowSpan',
  sandbox: 'sandbox',
  scope: 'scope',
  scoped: 'scoped',
  scrolling: 'scrolling',
  seamless: 'seamless',
  selected: 'selected',
  shape: 'shape',
  size: 'size',
  sizes: 'sizes',
  span: 'span',
  spellcheck: 'spellCheck',
  src: 'src',
  srcdoc: 'srcDoc',
  srclang: 'srcLang',
  srcset: 'srcSet',
  start: 'start',
  step: 'step',
  style: 'style',
  summary: 'summary',
  tabindex: 'tabIndex',
  target: 'target',
  title: 'title',
  type: 'type',
  usemap: 'useMap',
  value: 'value',
  width: 'width',
  wmode: 'wmode',
  wrap: 'wrap',
  // SVG
  about: 'about',
  accentheight: 'accentHeight',
  'accent-height': 'accentHeight',
  accumulate: 'accumulate',
  additive: 'additive',
  alignmentbaseline: 'alignmentBaseline',
  'alignment-baseline': 'alignmentBaseline',
  allowreorder: 'allowReorder',
  alphabetic: 'alphabetic',
  amplitude: 'amplitude',
  arabicform: 'arabicForm',
  'arabic-form': 'arabicForm',
  ascent: 'ascent',
  attributename: 'attributeName',
  attributetype: 'attributeType',
  autoreverse: 'autoReverse',
  azimuth: 'azimuth',
  basefrequency: 'baseFrequency',
  baselineshift: 'baselineShift',
  'baseline-shift': 'baselineShift',
  baseprofile: 'baseProfile',
  bbox: 'bbox',
  begin: 'begin',
  bias: 'bias',
  by: 'by',
  calcmode: 'calcMode',
  capheight: 'capHeight',
  'cap-height': 'capHeight',
  clip: 'clip',
  clippath: 'clipPath',
  'clip-path': 'clipPath',
  clippathunits: 'clipPathUnits',
  cliprule: 'clipRule',
  'clip-rule': 'clipRule',
  color: 'color',
  colorinterpolation: 'colorInterpolation',
  'color-interpolation': 'colorInterpolation',
  colorinterpolationfilters: 'colorInterpolationFilters',
  'color-interpolation-filters': 'colorInterpolationFilters',
  colorprofile: 'colorProfile',
  'color-profile': 'colorProfile',
  colorrendering: 'colorRendering',
  'color-rendering': 'colorRendering',
  contentscripttype: 'contentScriptType',
  contentstyletype: 'contentStyleType',
  cursor: 'cursor',
  cx: 'cx',
  cy: 'cy',
  d: 'd',
  datatype: 'datatype',
  decelerate: 'decelerate',
  descent: 'descent',
  diffuseconstant: 'diffuseConstant',
  direction: 'direction',
  display: 'display',
  divisor: 'divisor',
  dominantbaseline: 'dominantBaseline',
  'dominant-baseline': 'dominantBaseline',
  dur: 'dur',
  dx: 'dx',
  dy: 'dy',
  edgemode: 'edgeMode',
  elevation: 'elevation',
  enablebackground: 'enableBackground',
  'enable-background': 'enableBackground',
  end: 'end',
  exponent: 'exponent',
  externalresourcesrequired: 'externalResourcesRequired',
  fill: 'fill',
  fillopacity: 'fillOpacity',
  'fill-opacity': 'fillOpacity',
  fillrule: 'fillRule',
  'fill-rule': 'fillRule',
  filter: 'filter',
  filterres: 'filterRes',
  filterunits: 'filterUnits',
  floodopacity: 'floodOpacity',
  'flood-opacity': 'floodOpacity',
  floodcolor: 'floodColor',
  'flood-color': 'floodColor',
  focusable: 'focusable',
  fontfamily: 'fontFamily',
  'font-family': 'fontFamily',
  fontsize: 'fontSize',
  'font-size': 'fontSize',
  fontsizeadjust: 'fontSizeAdjust',
  'font-size-adjust': 'fontSizeAdjust',
  fontstretch: 'fontStretch',
  'font-stretch': 'fontStretch',
  fontstyle: 'fontStyle',
  'font-style': 'fontStyle',
  fontvariant: 'fontVariant',
  'font-variant': 'fontVariant',
  fontweight: 'fontWeight',
  'font-weight': 'fontWeight',
  format: 'format',
  from: 'from',
  fx: 'fx',
  fy: 'fy',
  g1: 'g1',
  g2: 'g2',
  glyphname: 'glyphName',
  'glyph-name': 'glyphName',
  glyphorientationhorizontal: 'glyphOrientationHorizontal',
  'glyph-orientation-horizontal': 'glyphOrientationHorizontal',
  glyphorientationvertical: 'glyphOrientationVertical',
  'glyph-orientation-vertical': 'glyphOrientationVertical',
  glyphref: 'glyphRef',
  gradienttransform: 'gradientTransform',
  gradientunits: 'gradientUnits',
  hanging: 'hanging',
  horizadvx: 'horizAdvX',
  'horiz-adv-x': 'horizAdvX',
  horizoriginx: 'horizOriginX',
  'horiz-origin-x': 'horizOriginX',
  ideographic: 'ideographic',
  imagerendering: 'imageRendering',
  'image-rendering': 'imageRendering',
  in2: 'in2',
  in: 'in',
  inlist: 'inlist',
  intercept: 'intercept',
  k1: 'k1',
  k2: 'k2',
  k3: 'k3',
  k4: 'k4',
  k: 'k',
  kernelmatrix: 'kernelMatrix',
  kernelunitlength: 'kernelUnitLength',
  kerning: 'kerning',
  keypoints: 'keyPoints',
  keysplines: 'keySplines',
  keytimes: 'keyTimes',
  lengthadjust: 'lengthAdjust',
  letterspacing: 'letterSpacing',
  'letter-spacing': 'letterSpacing',
  lightingcolor: 'lightingColor',
  'lighting-color': 'lightingColor',
  limitingconeangle: 'limitingConeAngle',
  local: 'local',
  markerend: 'markerEnd',
  'marker-end': 'markerEnd',
  markerheight: 'markerHeight',
  markermid: 'markerMid',
  'marker-mid': 'markerMid',
  markerstart: 'markerStart',
  'marker-start': 'markerStart',
  markerunits: 'markerUnits',
  markerwidth: 'markerWidth',
  mask: 'mask',
  maskcontentunits: 'maskContentUnits',
  maskunits: 'maskUnits',
  mathematical: 'mathematical',
  mode: 'mode',
  numoctaves: 'numOctaves',
  offset: 'offset',
  opacity: 'opacity',
  operator: 'operator',
  order: 'order',
  orient: 'orient',
  orientation: 'orientation',
  origin: 'origin',
  overflow: 'overflow',
  overlineposition: 'overlinePosition',
  'overline-position': 'overlinePosition',
  overlinethickness: 'overlineThickness',
  'overline-thickness': 'overlineThickness',
  paintorder: 'paintOrder',
  'paint-order': 'paintOrder',
  panose1: 'panose1',
  'panose-1': 'panose1',
  pathlength: 'pathLength',
  patterncontentunits: 'patternContentUnits',
  patterntransform: 'patternTransform',
  patternunits: 'patternUnits',
  pointerevents: 'pointerEvents',
  'pointer-events': 'pointerEvents',
  points: 'points',
  pointsatx: 'pointsAtX',
  pointsaty: 'pointsAtY',
  pointsatz: 'pointsAtZ',
  prefix: 'prefix',
  preservealpha: 'preserveAlpha',
  preserveaspectratio: 'preserveAspectRatio',
  primitiveunits: 'primitiveUnits',
  property: 'property',
  r: 'r',
  radius: 'radius',
  refx: 'refX',
  refy: 'refY',
  renderingintent: 'renderingIntent',
  'rendering-intent': 'renderingIntent',
  repeatcount: 'repeatCount',
  repeatdur: 'repeatDur',
  requiredextensions: 'requiredExtensions',
  requiredfeatures: 'requiredFeatures',
  resource: 'resource',
  restart: 'restart',
  result: 'result',
  results: 'results',
  rotate: 'rotate',
  rx: 'rx',
  ry: 'ry',
  scale: 'scale',
  security: 'security',
  seed: 'seed',
  shaperendering: 'shapeRendering',
  'shape-rendering': 'shapeRendering',
  slope: 'slope',
  spacing: 'spacing',
  specularconstant: 'specularConstant',
  specularexponent: 'specularExponent',
  speed: 'speed',
  spreadmethod: 'spreadMethod',
  startoffset: 'startOffset',
  stddeviation: 'stdDeviation',
  stemh: 'stemh',
  stemv: 'stemv',
  stitchtiles: 'stitchTiles',
  stopcolor: 'stopColor',
  'stop-color': 'stopColor',
  stopopacity: 'stopOpacity',
  'stop-opacity': 'stopOpacity',
  strikethroughposition: 'strikethroughPosition',
  'strikethrough-position': 'strikethroughPosition',
  strikethroughthickness: 'strikethroughThickness',
  'strikethrough-thickness': 'strikethroughThickness',
  string: 'string',
  stroke: 'stroke',
  strokedasharray: 'strokeDasharray',
  'stroke-dasharray': 'strokeDasharray',
  strokedashoffset: 'strokeDashoffset',
  'stroke-dashoffset': 'strokeDashoffset',
  strokelinecap: 'strokeLinecap',
  'stroke-linecap': 'strokeLinecap',
  strokelinejoin: 'strokeLinejoin',
  'stroke-linejoin': 'strokeLinejoin',
  strokemiterlimit: 'strokeMiterlimit',
  'stroke-miterlimit': 'strokeMiterlimit',
  strokewidth: 'strokeWidth',
  'stroke-width': 'strokeWidth',
  strokeopacity: 'strokeOpacity',
  'stroke-opacity': 'strokeOpacity',
  suppresscontenteditablewarning: 'suppressContentEditableWarning',
  suppresshydrationwarning: 'suppressHydrationWarning',
  surfacescale: 'surfaceScale',
  systemlanguage: 'systemLanguage',
  tablevalues: 'tableValues',
  targetx: 'targetX',
  targety: 'targetY',
  textanchor: 'textAnchor',
  'text-anchor': 'textAnchor',
  textdecoration: 'textDecoration',
  'text-decoration': 'textDecoration',
  textlength: 'textLength',
  textrendering: 'textRendering',
  'text-rendering': 'textRendering',
  to: 'to',
  transform: 'transform',
  typeof: 'typeof',
  u1: 'u1',
  u2: 'u2',
  underlineposition: 'underlinePosition',
  'underline-position': 'underlinePosition',
  underlinethickness: 'underlineThickness',
  'underline-thickness': 'underlineThickness',
  unicode: 'unicode',
  unicodebidi: 'unicodeBidi',
  'unicode-bidi': 'unicodeBidi',
  unicoderange: 'unicodeRange',
  'unicode-range': 'unicodeRange',
  unitsperem: 'unitsPerEm',
  'units-per-em': 'unitsPerEm',
  unselectable: 'unselectable',
  valphabetic: 'vAlphabetic',
  'v-alphabetic': 'vAlphabetic',
  values: 'values',
  vectoreffect: 'vectorEffect',
  'vector-effect': 'vectorEffect',
  version: 'version',
  vertadvy: 'vertAdvY',
  'vert-adv-y': 'vertAdvY',
  vertoriginx: 'vertOriginX',
  'vert-origin-x': 'vertOriginX',
  vertoriginy: 'vertOriginY',
  'vert-origin-y': 'vertOriginY',
  vhanging: 'vHanging',
  'v-hanging': 'vHanging',
  videographic: 'vIdeographic',
  'v-ideographic': 'vIdeographic',
  viewbox: 'viewBox',
  viewtarget: 'viewTarget',
  visibility: 'visibility',
  vmathematical: 'vMathematical',
  'v-mathematical': 'vMathematical',
  vocab: 'vocab',
  widths: 'widths',
  wordspacing: 'wordSpacing',
  'word-spacing': 'wordSpacing',
  writingmode: 'writingMode',
  'writing-mode': 'writingMode',
  x1: 'x1',
  x2: 'x2',
  x: 'x',
  xchannelselector: 'xChannelSelector',
  xheight: 'xHeight',
  'x-height': 'xHeight',
  xlinkactuate: 'xlinkActuate',
  'xlink:actuate': 'xlinkActuate',
  xlinkarcrole: 'xlinkArcrole',
  'xlink:arcrole': 'xlinkArcrole',
  xlinkhref: 'xlinkHref',
  'xlink:href': 'xlinkHref',
  xlinkrole: 'xlinkRole',
  'xlink:role': 'xlinkRole',
  xlinkshow: 'xlinkShow',
  'xlink:show': 'xlinkShow',
  xlinktitle: 'xlinkTitle',
  'xlink:title': 'xlinkTitle',
  xlinktype: 'xlinkType',
  'xlink:type': 'xlinkType',
  xmlbase: 'xmlBase',
  'xml:base': 'xmlBase',
  xmllang: 'xmlLang',
  'xml:lang': 'xmlLang',
  xmlns: 'xmlns',
  'xml:space': 'xmlSpace',
  xmlnsxlink: 'xmlnsXlink',
  'xmlns:xlink': 'xmlnsXlink',
  xmlspace: 'xmlSpace',
  y1: 'y1',
  y2: 'y2',
  y: 'y',
  ychannelselector: 'yChannelSelector',
  z: 'z',
  zoomandpan: 'zoomAndPan'
};

var validateProperty$1 = function () {};

{
  var warnedProperties$1 = {};
  var _hasOwnProperty = Object.prototype.hasOwnProperty;
  var EVENT_NAME_REGEX = /^on./;
  var INVALID_EVENT_NAME_REGEX = /^on[^A-Z]/;
  var rARIA$1 = new RegExp('^(aria)-[' + ATTRIBUTE_NAME_CHAR + ']*$');
  var rARIACamel$1 = new RegExp('^(aria)[A-Z][' + ATTRIBUTE_NAME_CHAR + ']*$');

  validateProperty$1 = function (tagName, name, value, canUseEventSystem) {
    if (_hasOwnProperty.call(warnedProperties$1, name) && warnedProperties$1[name]) {
      return true;
    }

    var lowerCasedName = name.toLowerCase();

    if (lowerCasedName === 'onfocusin' || lowerCasedName === 'onfocusout') {
      warning$1(false, 'React uses onFocus and onBlur instead of onFocusIn and onFocusOut. ' + 'All React events are normalized to bubble, so onFocusIn and onFocusOut ' + 'are not needed/supported by React.');
      warnedProperties$1[name] = true;
      return true;
    } // We can't rely on the event system being injected on the server.


    if (canUseEventSystem) {
      if (registrationNameModules.hasOwnProperty(name)) {
        return true;
      }

      var registrationName = possibleRegistrationNames.hasOwnProperty(lowerCasedName) ? possibleRegistrationNames[lowerCasedName] : null;

      if (registrationName != null) {
        warning$1(false, 'Invalid event handler property `%s`. Did you mean `%s`?', name, registrationName);
        warnedProperties$1[name] = true;
        return true;
      }

      if (EVENT_NAME_REGEX.test(name)) {
        warning$1(false, 'Unknown event handler property `%s`. It will be ignored.', name);
        warnedProperties$1[name] = true;
        return true;
      }
    } else if (EVENT_NAME_REGEX.test(name)) {
      // If no event plugins have been injected, we are in a server environment.
      // So we can't tell if the event name is correct for sure, but we can filter
      // out known bad ones like `onclick`. We can't suggest a specific replacement though.
      if (INVALID_EVENT_NAME_REGEX.test(name)) {
        warning$1(false, 'Invalid event handler property `%s`. ' + 'React events use the camelCase naming convention, for example `onClick`.', name);
      }

      warnedProperties$1[name] = true;
      return true;
    } // Let the ARIA attribute hook validate ARIA attributes


    if (rARIA$1.test(name) || rARIACamel$1.test(name)) {
      return true;
    }

    if (lowerCasedName === 'innerhtml') {
      warning$1(false, 'Directly setting property `innerHTML` is not permitted. ' + 'For more information, lookup documentation on `dangerouslySetInnerHTML`.');
      warnedProperties$1[name] = true;
      return true;
    }

    if (lowerCasedName === 'aria') {
      warning$1(false, 'The `aria` attribute is reserved for future use in React. ' + 'Pass individual `aria-` attributes instead.');
      warnedProperties$1[name] = true;
      return true;
    }

    if (lowerCasedName === 'is' && value !== null && value !== undefined && typeof value !== 'string') {
      warning$1(false, 'Received a `%s` for a string attribute `is`. If this is expected, cast ' + 'the value to a string.', typeof value);
      warnedProperties$1[name] = true;
      return true;
    }

    if (typeof value === 'number' && isNaN(value)) {
      warning$1(false, 'Received NaN for the `%s` attribute. If this is expected, cast ' + 'the value to a string.', name);
      warnedProperties$1[name] = true;
      return true;
    }

    var propertyInfo = getPropertyInfo(name);
    var isReserved = propertyInfo !== null && propertyInfo.type === RESERVED; // Known attributes should match the casing specified in the property config.

    if (possibleStandardNames.hasOwnProperty(lowerCasedName)) {
      var standardName = possibleStandardNames[lowerCasedName];

      if (standardName !== name) {
        warning$1(false, 'Invalid DOM property `%s`. Did you mean `%s`?', name, standardName);
        warnedProperties$1[name] = true;
        return true;
      }
    } else if (!isReserved && name !== lowerCasedName) {
      // Unknown attributes should have lowercase casing since that's how they
      // will be cased anyway with server rendering.
      warning$1(false, 'React does not recognize the `%s` prop on a DOM element. If you ' + 'intentionally want it to appear in the DOM as a custom ' + 'attribute, spell it as lowercase `%s` instead. ' + 'If you accidentally passed it from a parent component, remove ' + 'it from the DOM element.', name, lowerCasedName);
      warnedProperties$1[name] = true;
      return true;
    }

    if (typeof value === 'boolean' && shouldRemoveAttributeWithWarning(name, value, propertyInfo, false)) {
      if (value) {
        warning$1(false, 'Received `%s` for a non-boolean attribute `%s`.\n\n' + 'If you want to write it to the DOM, pass a string instead: ' + '%s="%s" or %s={value.toString()}.', value, name, name, value, name);
      } else {
        warning$1(false, 'Received `%s` for a non-boolean attribute `%s`.\n\n' + 'If you want to write it to the DOM, pass a string instead: ' + '%s="%s" or %s={value.toString()}.\n\n' + 'If you used to conditionally omit it with %s={condition && value}, ' + 'pass %s={condition ? value : undefined} instead.', value, name, name, value, name, name, name);
      }

      warnedProperties$1[name] = true;
      return true;
    } // Now that we've validated casing, do not validate
    // data types for reserved props


    if (isReserved) {
      return true;
    } // Warn when a known attribute is a bad type


    if (shouldRemoveAttributeWithWarning(name, value, propertyInfo, false)) {
      warnedProperties$1[name] = true;
      return false;
    } // Warn when passing the strings 'false' or 'true' into a boolean prop


    if ((value === 'false' || value === 'true') && propertyInfo !== null && propertyInfo.type === BOOLEAN) {
      warning$1(false, 'Received the string `%s` for the boolean attribute `%s`. ' + '%s ' + 'Did you mean %s={%s}?', value, name, value === 'false' ? 'The browser will interpret it as a truthy value.' : 'Although this works, it will not work as expected if you pass the string "false".', name, value);
      warnedProperties$1[name] = true;
      return true;
    }

    return true;
  };
}

var warnUnknownProperties = function (type, props, canUseEventSystem) {
  var unknownProps = [];

  for (var key in props) {
    var isValid = validateProperty$1(type, key, props[key], canUseEventSystem);

    if (!isValid) {
      unknownProps.push(key);
    }
  }

  var unknownPropString = unknownProps.map(function (prop) {
    return '`' + prop + '`';
  }).join(', ');

  if (unknownProps.length === 1) {
    warning$1(false, 'Invalid value for prop %s on <%s> tag. Either remove it from the element, ' + 'or pass a string or number value to keep it in the DOM. ' + 'For details, see https://fb.me/react-attribute-behavior', unknownPropString, type);
  } else if (unknownProps.length > 1) {
    warning$1(false, 'Invalid values for props %s on <%s> tag. Either remove them from the element, ' + 'or pass a string or number value to keep them in the DOM. ' + 'For details, see https://fb.me/react-attribute-behavior', unknownPropString, type);
  }
};

function validateProperties$2(type, props, canUseEventSystem) {
  if (isCustomComponent(type, props)) {
    return;
  }

  warnUnknownProperties(type, props, canUseEventSystem);
}

var toArray = React.Children.toArray; // This is only used in DEV.
// Each entry is `this.stack` from a currently executing renderer instance.
// (There may be more than one because ReactDOMServer is reentrant).
// Each stack is an array of frames which may contain nested stacks of elements.

var currentDebugStacks = [];
var ReactCurrentDispatcher = ReactSharedInternals.ReactCurrentDispatcher;
var ReactDebugCurrentFrame;
var prevGetCurrentStackImpl = null;

var getCurrentServerStackImpl = function () {
  return '';
};

var describeStackFrame = function (element) {
  return '';
};

var validatePropertiesInDevelopment = function (type, props) {};

var pushCurrentDebugStack = function (stack) {};

var pushElementToDebugStack = function (element) {};

var popCurrentDebugStack = function () {};

var hasWarnedAboutUsingContextAsConsumer = false;

{
  ReactDebugCurrentFrame = ReactSharedInternals.ReactDebugCurrentFrame;

  validatePropertiesInDevelopment = function (type, props) {
    validateProperties(type, props);
    validateProperties$1(type, props);
    validateProperties$2(type, props,
    /* canUseEventSystem */
    false);
  };

  describeStackFrame = function (element) {
    var source = element._source;
    var type = element.type;
    var name = getComponentName(type);
    var ownerName = null;
    return describeComponentFrame(name, source, ownerName);
  };

  pushCurrentDebugStack = function (stack) {
    currentDebugStacks.push(stack);

    if (currentDebugStacks.length === 1) {
      // We are entering a server renderer.
      // Remember the previous (e.g. client) global stack implementation.
      prevGetCurrentStackImpl = ReactDebugCurrentFrame.getCurrentStack;
      ReactDebugCurrentFrame.getCurrentStack = getCurrentServerStackImpl;
    }
  };

  pushElementToDebugStack = function (element) {
    // For the innermost executing ReactDOMServer call,
    var stack = currentDebugStacks[currentDebugStacks.length - 1]; // Take the innermost executing frame (e.g. <Foo>),

    var frame = stack[stack.length - 1]; // and record that it has one more element associated with it.

    frame.debugElementStack.push(element); // We only need this because we tail-optimize single-element
    // children and directly handle them in an inner loop instead of
    // creating separate frames for them.
  };

  popCurrentDebugStack = function () {
    currentDebugStacks.pop();

    if (currentDebugStacks.length === 0) {
      // We are exiting the server renderer.
      // Restore the previous (e.g. client) global stack implementation.
      ReactDebugCurrentFrame.getCurrentStack = prevGetCurrentStackImpl;
      prevGetCurrentStackImpl = null;
    }
  };

  getCurrentServerStackImpl = function () {
    if (currentDebugStacks.length === 0) {
      // Nothing is currently rendering.
      return '';
    } // ReactDOMServer is reentrant so there may be multiple calls at the same time.
    // Take the frames from the innermost call which is the last in the array.


    var frames = currentDebugStacks[currentDebugStacks.length - 1];
    var stack = ''; // Go through every frame in the stack from the innermost one.

    for (var i = frames.length - 1; i >= 0; i--) {
      var frame = frames[i]; // Every frame might have more than one debug element stack entry associated with it.
      // This is because single-child nesting doesn't create materialized frames.
      // Instead it would push them through `pushElementToDebugStack()`.

      var debugElementStack = frame.debugElementStack;

      for (var ii = debugElementStack.length - 1; ii >= 0; ii--) {
        stack += describeStackFrame(debugElementStack[ii]);
      }
    }

    return stack;
  };
}

var didWarnDefaultInputValue = false;
var didWarnDefaultChecked = false;
var didWarnDefaultSelectValue = false;
var didWarnDefaultTextareaValue = false;
var didWarnInvalidOptionChildren = false;
var didWarnAboutNoopUpdateForComponent = {};
var didWarnAboutBadClass = {};
var didWarnAboutModulePatternComponent = {};
var didWarnAboutDeprecatedWillMount = {};
var didWarnAboutUndefinedDerivedState = {};
var didWarnAboutUninitializedState = {};
var valuePropNames = ['value', 'defaultValue'];
var newlineEatingTags = {
  listing: true,
  pre: true,
  textarea: true
}; // We accept any tag to be rendered but since this gets injected into arbitrary
// HTML, we want to make sure that it's a safe tag.
// http://www.w3.org/TR/REC-xml/#NT-Name

var VALID_TAG_REGEX = /^[a-zA-Z][a-zA-Z:_\.\-\d]*$/; // Simplified subset

var validatedTagCache = {};

function validateDangerousTag(tag) {
  if (!validatedTagCache.hasOwnProperty(tag)) {
    if (!VALID_TAG_REGEX.test(tag)) {
      {
        throw Error("Invalid tag: " + tag);
      }
    }

    validatedTagCache[tag] = true;
  }
}

var styleNameCache = {};

var processStyleName = function (styleName) {
  if (styleNameCache.hasOwnProperty(styleName)) {
    return styleNameCache[styleName];
  }

  var result = hyphenateStyleName(styleName);
  styleNameCache[styleName] = result;
  return result;
};

function createMarkupForStyles(styles) {
  var serialized = '';
  var delimiter = '';

  for (var styleName in styles) {
    if (!styles.hasOwnProperty(styleName)) {
      continue;
    }

    var isCustomProperty = styleName.indexOf('--') === 0;
    var styleValue = styles[styleName];

    {
      if (!isCustomProperty) {
        warnValidStyle$1(styleName, styleValue);
      }
    }

    if (styleValue != null) {
      serialized += delimiter + (isCustomProperty ? styleName : processStyleName(styleName)) + ':';
      serialized += dangerousStyleValue(styleName, styleValue, isCustomProperty);
      delimiter = ';';
    }
  }

  return serialized || null;
}

function warnNoop(publicInstance, callerName) {
  {
    var _constructor = publicInstance.constructor;
    var componentName = _constructor && getComponentName(_constructor) || 'ReactClass';
    var warningKey = componentName + '.' + callerName;

    if (didWarnAboutNoopUpdateForComponent[warningKey]) {
      return;
    }

    warningWithoutStack$1(false, '%s(...): Can only update a mounting component. ' + 'This usually means you called %s() outside componentWillMount() on the server. ' + 'This is a no-op.\n\nPlease check the code for the %s component.', callerName, callerName, componentName);
    didWarnAboutNoopUpdateForComponent[warningKey] = true;
  }
}

function shouldConstruct(Component) {
  return Component.prototype && Component.prototype.isReactComponent;
}

function getNonChildrenInnerMarkup(props) {
  var innerHTML = props.dangerouslySetInnerHTML;

  if (innerHTML != null) {
    if (innerHTML.__html != null) {
      return innerHTML.__html;
    }
  } else {
    var content = props.children;

    if (typeof content === 'string' || typeof content === 'number') {
      return escapeTextForBrowser(content);
    }
  }

  return null;
}

function flattenTopLevelChildren(children) {
  if (!React.isValidElement(children)) {
    return toArray(children);
  }

  var element = children;

  if (element.type !== REACT_FRAGMENT_TYPE) {
    return [element];
  }

  var fragmentChildren = element.props.children;

  if (!React.isValidElement(fragmentChildren)) {
    return toArray(fragmentChildren);
  }

  var fragmentChildElement = fragmentChildren;
  return [fragmentChildElement];
}

function flattenOptionChildren(children) {
  if (children === undefined || children === null) {
    return children;
  }

  var content = ''; // Flatten children and warn if they aren't strings or numbers;
  // invalid types are ignored.

  React.Children.forEach(children, function (child) {
    if (child == null) {
      return;
    }

    content += child;

    {
      if (!didWarnInvalidOptionChildren && typeof child !== 'string' && typeof child !== 'number') {
        didWarnInvalidOptionChildren = true;
        warning$1(false, 'Only strings and numbers are supported as <option> children.');
      }
    }
  });
  return content;
}

var hasOwnProperty = Object.prototype.hasOwnProperty;
var STYLE = 'style';
var RESERVED_PROPS = {
  children: null,
  dangerouslySetInnerHTML: null,
  suppressContentEditableWarning: null,
  suppressHydrationWarning: null
};

function createOpenTagMarkup(tagVerbatim, tagLowercase, props, namespace, makeStaticMarkup, isRootElement) {
  var ret = '<' + tagVerbatim;

  for (var propKey in props) {
    if (!hasOwnProperty.call(props, propKey)) {
      continue;
    }

    if (enableFlareAPI && propKey === 'listeners') {
      continue;
    }

    var propValue = props[propKey];

    if (propValue == null) {
      continue;
    }

    if (propKey === STYLE) {
      propValue = createMarkupForStyles(propValue);
    }

    var markup = null;

    if (isCustomComponent(tagLowercase, props)) {
      if (!RESERVED_PROPS.hasOwnProperty(propKey)) {
        markup = createMarkupForCustomAttribute(propKey, propValue);
      }
    } else {
      markup = createMarkupForProperty(propKey, propValue);
    }

    if (markup) {
      ret += ' ' + markup;
    }
  } // For static pages, no need to put React ID and checksum. Saves lots of
  // bytes.


  if (makeStaticMarkup) {
    return ret;
  }

  if (isRootElement) {
    ret += ' ' + createMarkupForRoot();
  }

  return ret;
}

function validateRenderResult(child, type) {
  if (child === undefined) {
    {
      {
        throw Error((getComponentName(type) || 'Component') + "(...): Nothing was returned from render. This usually means a return statement is missing. Or, to render nothing, return null.");
      }
    }
  }
}

function resolve(child, context, threadID) {
  while (React.isValidElement(child)) {
    // Safe because we just checked it's an element.
    var element = child;
    var Component = element.type;

    {
      pushElementToDebugStack(element);
    }

    if (typeof Component !== 'function') {
      break;
    }

    processChild(element, Component);
  } // Extra closure so queue and replace can be captured properly


  function processChild(element, Component) {
    var isClass = shouldConstruct(Component);
    var publicContext = processContext(Component, context, threadID, isClass);
    var queue = [];
    var replace = false;
    var updater = {
      isMounted: function (publicInstance) {
        return false;
      },
      enqueueForceUpdate: function (publicInstance) {
        if (queue === null) {
          warnNoop(publicInstance, 'forceUpdate');
          return null;
        }
      },
      enqueueReplaceState: function (publicInstance, completeState) {
        replace = true;
        queue = [completeState];
      },
      enqueueSetState: function (publicInstance, currentPartialState) {
        if (queue === null) {
          warnNoop(publicInstance, 'setState');
          return null;
        }

        queue.push(currentPartialState);
      }
    };
    var inst;

    if (isClass) {
      inst = new Component(element.props, publicContext, updater);

      if (typeof Component.getDerivedStateFromProps === 'function') {
        {
          if (inst.state === null || inst.state === undefined) {
            var componentName = getComponentName(Component) || 'Unknown';

            if (!didWarnAboutUninitializedState[componentName]) {
              warningWithoutStack$1(false, '`%s` uses `getDerivedStateFromProps` but its initial state is ' + '%s. This is not recommended. Instead, define the initial state by ' + 'assigning an object to `this.state` in the constructor of `%s`. ' + 'This ensures that `getDerivedStateFromProps` arguments have a consistent shape.', componentName, inst.state === null ? 'null' : 'undefined', componentName);
              didWarnAboutUninitializedState[componentName] = true;
            }
          }
        }

        var partialState = Component.getDerivedStateFromProps.call(null, element.props, inst.state);

        {
          if (partialState === undefined) {
            var _componentName = getComponentName(Component) || 'Unknown';

            if (!didWarnAboutUndefinedDerivedState[_componentName]) {
              warningWithoutStack$1(false, '%s.getDerivedStateFromProps(): A valid state object (or null) must be returned. ' + 'You have returned undefined.', _componentName);
              didWarnAboutUndefinedDerivedState[_componentName] = true;
            }
          }
        }

        if (partialState != null) {
          inst.state = _assign({}, inst.state, partialState);
        }
      }
    } else {
      {
        if (Component.prototype && typeof Component.prototype.render === 'function') {
          var _componentName2 = getComponentName(Component) || 'Unknown';

          if (!didWarnAboutBadClass[_componentName2]) {
            warningWithoutStack$1(false, "The <%s /> component appears to have a render method, but doesn't extend React.Component. " + 'This is likely to cause errors. Change %s to extend React.Component instead.', _componentName2, _componentName2);
            didWarnAboutBadClass[_componentName2] = true;
          }
        }
      }

      var componentIdentity = {};
      prepareToUseHooks(componentIdentity);
      inst = Component(element.props, publicContext, updater);
      inst = finishHooks(Component, element.props, inst, publicContext);

      if (inst == null || inst.render == null) {
        child = inst;
        validateRenderResult(child, Component);
        return;
      }

      {
        var _componentName3 = getComponentName(Component) || 'Unknown';

        if (!didWarnAboutModulePatternComponent[_componentName3]) {
          warningWithoutStack$1(false, 'The <%s /> component appears to be a function component that returns a class instance. ' + 'Change %s to a class that extends React.Component instead. ' + "If you can't use a class try assigning the prototype on the function as a workaround. " + "`%s.prototype = React.Component.prototype`. Don't use an arrow function since it " + 'cannot be called with `new` by React.', _componentName3, _componentName3, _componentName3);
          didWarnAboutModulePatternComponent[_componentName3] = true;
        }
      }
    }

    inst.props = element.props;
    inst.context = publicContext;
    inst.updater = updater;
    var initialState = inst.state;

    if (initialState === undefined) {
      inst.state = initialState = null;
    }

    if (typeof inst.UNSAFE_componentWillMount === 'function' || typeof inst.componentWillMount === 'function') {
      if (typeof inst.componentWillMount === 'function') {
        {
          if (warnAboutDeprecatedLifecycles && inst.componentWillMount.__suppressDeprecationWarning !== true) {
            var _componentName4 = getComponentName(Component) || 'Unknown';

            if (!didWarnAboutDeprecatedWillMount[_componentName4]) {
              lowPriorityWarningWithoutStack$1(false, // keep this warning in sync with ReactStrictModeWarning.js
              'componentWillMount has been renamed, and is not recommended for use. ' + 'See https://fb.me/react-unsafe-component-lifecycles for details.\n\n' + '* Move code from componentWillMount to componentDidMount (preferred in most cases) ' + 'or the constructor.\n' + '\nPlease update the following components: %s', _componentName4);
              didWarnAboutDeprecatedWillMount[_componentName4] = true;
            }
          }
        } // In order to support react-lifecycles-compat polyfilled components,
        // Unsafe lifecycles should not be invoked for any component with the new gDSFP.


        if (typeof Component.getDerivedStateFromProps !== 'function') {
          inst.componentWillMount();
        }
      }

      if (typeof inst.UNSAFE_componentWillMount === 'function' && typeof Component.getDerivedStateFromProps !== 'function') {
        // In order to support react-lifecycles-compat polyfilled components,
        // Unsafe lifecycles should not be invoked for any component with the new gDSFP.
        inst.UNSAFE_componentWillMount();
      }

      if (queue.length) {
        var oldQueue = queue;
        var oldReplace = replace;
        queue = null;
        replace = false;

        if (oldReplace && oldQueue.length === 1) {
          inst.state = oldQueue[0];
        } else {
          var nextState = oldReplace ? oldQueue[0] : inst.state;
          var dontMutate = true;

          for (var i = oldReplace ? 1 : 0; i < oldQueue.length; i++) {
            var partial = oldQueue[i];

            var _partialState = typeof partial === 'function' ? partial.call(inst, nextState, element.props, publicContext) : partial;

            if (_partialState != null) {
              if (dontMutate) {
                dontMutate = false;
                nextState = _assign({}, nextState, _partialState);
              } else {
                _assign(nextState, _partialState);
              }
            }
          }

          inst.state = nextState;
        }
      } else {
        queue = null;
      }
    }

    child = inst.render();

    {
      if (child === undefined && inst.render._isMockFunction) {
        // This is probably bad practice. Consider warning here and
        // deprecating this convenience.
        child = null;
      }
    }

    validateRenderResult(child, Component);
    var childContext;

    if (disableLegacyContext) {
      {
        var childContextTypes = Component.childContextTypes;

        if (childContextTypes !== undefined) {
          warningWithoutStack$1(false, '%s uses the legacy childContextTypes API which is no longer supported. ' + 'Use React.createContext() instead.', getComponentName(Component) || 'Unknown');
        }
      }
    } else {
      if (typeof inst.getChildContext === 'function') {
        var _childContextTypes = Component.childContextTypes;

        if (typeof _childContextTypes === 'object') {
          childContext = inst.getChildContext();

          for (var contextKey in childContext) {
            if (!(contextKey in _childContextTypes)) {
              {
                throw Error((getComponentName(Component) || 'Unknown') + ".getChildContext(): key \"" + contextKey + "\" is not defined in childContextTypes.");
              }
            }
          }
        } else {
          warningWithoutStack$1(false, '%s.getChildContext(): childContextTypes must be defined in order to ' + 'use getChildContext().', getComponentName(Component) || 'Unknown');
        }
      }

      if (childContext) {
        context = _assign({}, context, childContext);
      }
    }
  }

  return {
    child: child,
    context: context
  };
}

var ReactDOMServerRenderer =
/*#__PURE__*/
function () {
  // TODO: type this more strictly:
  // DEV-only
  function ReactDOMServerRenderer(children, makeStaticMarkup) {
    var flatChildren = flattenTopLevelChildren(children);
    var topFrame = {
      type: null,
      // Assume all trees start in the HTML namespace (not totally true, but
      // this is what we did historically)
      domNamespace: Namespaces.html,
      children: flatChildren,
      childIndex: 0,
      context: emptyObject,
      footer: ''
    };

    {
      topFrame.debugElementStack = [];
    }

    this.threadID = allocThreadID();
    this.stack = [topFrame];
    this.exhausted = false;
    this.currentSelectValue = null;
    this.previousWasTextNode = false;
    this.makeStaticMarkup = makeStaticMarkup;
    this.suspenseDepth = 0; // Context (new API)

    this.contextIndex = -1;
    this.contextStack = [];
    this.contextValueStack = [];

    {
      this.contextProviderStack = [];
    }
  }

  var _proto = ReactDOMServerRenderer.prototype;

  _proto.destroy = function destroy() {
    if (!this.exhausted) {
      this.exhausted = true;
      this.clearProviders();
      freeThreadID(this.threadID);
    }
  }
  /**
   * Note: We use just two stacks regardless of how many context providers you have.
   * Providers are always popped in the reverse order to how they were pushed
   * so we always know on the way down which provider you'll encounter next on the way up.
   * On the way down, we push the current provider, and its context value *before*
   * we mutated it, onto the stacks. Therefore, on the way up, we always know which
   * provider needs to be "restored" to which value.
   * https://github.com/facebook/react/pull/12985#issuecomment-396301248
   */
  ;

  _proto.pushProvider = function pushProvider(provider) {
    var index = ++this.contextIndex;
    var context = provider.type._context;
    var threadID = this.threadID;
    validateContextBounds(context, threadID);
    var previousValue = context[threadID]; // Remember which value to restore this context to on our way up.

    this.contextStack[index] = context;
    this.contextValueStack[index] = previousValue;

    {
      // Only used for push/pop mismatch warnings.
      this.contextProviderStack[index] = provider;
    } // Mutate the current value.


    context[threadID] = provider.props.value;
  };

  _proto.popProvider = function popProvider(provider) {
    var index = this.contextIndex;

    {
      !(index > -1 && provider === this.contextProviderStack[index]) ? warningWithoutStack$1(false, 'Unexpected pop.') : void 0;
    }

    var context = this.contextStack[index];
    var previousValue = this.contextValueStack[index]; // "Hide" these null assignments from Flow by using `any`
    // because conceptually they are deletions--as long as we
    // promise to never access values beyond `this.contextIndex`.

    this.contextStack[index] = null;
    this.contextValueStack[index] = null;

    {
      this.contextProviderStack[index] = null;
    }

    this.contextIndex--; // Restore to the previous value we stored as we were walking down.
    // We've already verified that this context has been expanded to accommodate
    // this thread id, so we don't need to do it again.

    context[this.threadID] = previousValue;
  };

  _proto.clearProviders = function clearProviders() {
    // Restore any remaining providers on the stack to previous values
    for (var index = this.contextIndex; index >= 0; index--) {
      var context = this.contextStack[index];
      var previousValue = this.contextValueStack[index];
      context[this.threadID] = previousValue;
    }
  };

  _proto.read = function read(bytes) {
    if (this.exhausted) {
      return null;
    }

    var prevThreadID = currentThreadID;
    setCurrentThreadID(this.threadID);
    var prevDispatcher = ReactCurrentDispatcher.current;
    ReactCurrentDispatcher.current = Dispatcher;

    try {
      // Markup generated within <Suspense> ends up buffered until we know
      // nothing in that boundary suspended
      var out = [''];
      var suspended = false;

      while (out[0].length < bytes) {
        if (this.stack.length === 0) {
          this.exhausted = true;
          freeThreadID(this.threadID);
          break;
        }

        var frame = this.stack[this.stack.length - 1];

        if (suspended || frame.childIndex >= frame.children.length) {
          var footer = frame.footer;

          if (footer !== '') {
            this.previousWasTextNode = false;
          }

          this.stack.pop();

          if (frame.type === 'select') {
            this.currentSelectValue = null;
          } else if (frame.type != null && frame.type.type != null && frame.type.type.$$typeof === REACT_PROVIDER_TYPE) {
            var provider = frame.type;
            this.popProvider(provider);
          } else if (frame.type === REACT_SUSPENSE_TYPE) {
            this.suspenseDepth--;
            var buffered = out.pop();

            if (suspended) {
              suspended = false; // If rendering was suspended at this boundary, render the fallbackFrame

              var fallbackFrame = frame.fallbackFrame;

              if (!fallbackFrame) {
                {
                  throw Error("ReactDOMServer did not find an internal fallback frame for Suspense. This is a bug in React. Please file an issue.");
                }
              }

              this.stack.push(fallbackFrame);
              out[this.suspenseDepth] += '<!--$!-->'; // Skip flushing output since we're switching to the fallback

              continue;
            } else {
              out[this.suspenseDepth] += buffered;
            }
          } // Flush output


          out[this.suspenseDepth] += footer;
          continue;
        }

        var child = frame.children[frame.childIndex++];
        var outBuffer = '';

        {
          pushCurrentDebugStack(this.stack); // We're starting work on this frame, so reset its inner stack.

          frame.debugElementStack.length = 0;
        }

        try {
          outBuffer += this.render(child, frame.context, frame.domNamespace);
        } catch (err) {
          if (err != null && typeof err.then === 'function') {
            if (enableSuspenseServerRenderer) {
              if (!(this.suspenseDepth > 0)) {
                {
                  throw Error("A React component suspended while rendering, but no fallback UI was specified.\n\nAdd a <Suspense fallback=...> component higher in the tree to provide a loading indicator or placeholder to display.");
                }
              }

              suspended = true;
            } else {
              {
                {
                  throw Error("ReactDOMServer does not yet support Suspense.");
                }
              }
            }
          } else {
            throw err;
          }
        } finally {
          {
            popCurrentDebugStack();
          }
        }

        if (out.length <= this.suspenseDepth) {
          out.push('');
        }

        out[this.suspenseDepth] += outBuffer;
      }

      return out[0];
    } finally {
      ReactCurrentDispatcher.current = prevDispatcher;
      setCurrentThreadID(prevThreadID);
    }
  };

  _proto.render = function render(child, context, parentNamespace) {
    if (typeof child === 'string' || typeof child === 'number') {
      var text = '' + child;

      if (text === '') {
        return '';
      }

      if (this.makeStaticMarkup) {
        return escapeTextForBrowser(text);
      }

      if (this.previousWasTextNode) {
        return '<!-- -->' + escapeTextForBrowser(text);
      }

      this.previousWasTextNode = true;
      return escapeTextForBrowser(text);
    } else {
      var nextChild;

      var _resolve = resolve(child, context, this.threadID);

      nextChild = _resolve.child;
      context = _resolve.context;

      if (nextChild === null || nextChild === false) {
        return '';
      } else if (!React.isValidElement(nextChild)) {
        if (nextChild != null && nextChild.$$typeof != null) {
          // Catch unexpected special types early.
          var $$typeof = nextChild.$$typeof;

          if (!($$typeof !== REACT_PORTAL_TYPE)) {
            {
              throw Error("Portals are not currently supported by the server renderer. Render them conditionally so that they only appear on the client render.");
            }
          } // Catch-all to prevent an infinite loop if React.Children.toArray() supports some new type.


          {
            {
              throw Error("Unknown element-like object type: " + $$typeof.toString() + ". This is likely a bug in React. Please file an issue.");
            }
          }
        }

        var nextChildren = toArray(nextChild);
        var frame = {
          type: null,
          domNamespace: parentNamespace,
          children: nextChildren,
          childIndex: 0,
          context: context,
          footer: ''
        };

        {
          frame.debugElementStack = [];
        }

        this.stack.push(frame);
        return '';
      } // Safe because we just checked it's an element.


      var nextElement = nextChild;
      var elementType = nextElement.type;

      if (typeof elementType === 'string') {
        return this.renderDOM(nextElement, context, parentNamespace);
      }

      switch (elementType) {
        case REACT_STRICT_MODE_TYPE:
        case REACT_CONCURRENT_MODE_TYPE:
        case REACT_PROFILER_TYPE:
        case REACT_SUSPENSE_LIST_TYPE:
        case REACT_FRAGMENT_TYPE:
          {
            var _nextChildren = toArray(nextChild.props.children);

            var _frame = {
              type: null,
              domNamespace: parentNamespace,
              children: _nextChildren,
              childIndex: 0,
              context: context,
              footer: ''
            };

            {
              _frame.debugElementStack = [];
            }

            this.stack.push(_frame);
            return '';
          }

        case REACT_SUSPENSE_TYPE:
          {
            if (enableSuspenseServerRenderer) {
              var fallback = nextChild.props.fallback;

              if (fallback === undefined) {
                // If there is no fallback, then this just behaves as a fragment.
                var _nextChildren3 = toArray(nextChild.props.children);

                var _frame3 = {
                  type: null,
                  domNamespace: parentNamespace,
                  children: _nextChildren3,
                  childIndex: 0,
                  context: context,
                  footer: ''
                };

                {
                  _frame3.debugElementStack = [];
                }

                this.stack.push(_frame3);
                return '';
              }

              var fallbackChildren = toArray(fallback);

              var _nextChildren2 = toArray(nextChild.props.children);

              var fallbackFrame = {
                type: null,
                domNamespace: parentNamespace,
                children: fallbackChildren,
                childIndex: 0,
                context: context,
                footer: '<!--/$-->'
              };
              var _frame2 = {
                fallbackFrame: fallbackFrame,
                type: REACT_SUSPENSE_TYPE,
                domNamespace: parentNamespace,
                children: _nextChildren2,
                childIndex: 0,
                context: context,
                footer: '<!--/$-->'
              };

              {
                _frame2.debugElementStack = [];
                fallbackFrame.debugElementStack = [];
              }

              this.stack.push(_frame2);
              this.suspenseDepth++;
              return '<!--$-->';
            } else {
              {
                {
                  throw Error("ReactDOMServer does not yet support Suspense.");
                }
              }
            }
          }
        // eslint-disable-next-line-no-fallthrough

        default:
          break;
      }

      if (typeof elementType === 'object' && elementType !== null) {
        switch (elementType.$$typeof) {
          case REACT_FORWARD_REF_TYPE:
            {
              var element = nextChild;

              var _nextChildren4;

              var componentIdentity = {};
              prepareToUseHooks(componentIdentity);
              _nextChildren4 = elementType.render(element.props, element.ref);
              _nextChildren4 = finishHooks(elementType.render, element.props, _nextChildren4, element.ref);
              _nextChildren4 = toArray(_nextChildren4);
              var _frame4 = {
                type: null,
                domNamespace: parentNamespace,
                children: _nextChildren4,
                childIndex: 0,
                context: context,
                footer: ''
              };

              {
                _frame4.debugElementStack = [];
              }

              this.stack.push(_frame4);
              return '';
            }

          case REACT_MEMO_TYPE:
            {
              var _element = nextChild;
              var _nextChildren5 = [React.createElement(elementType.type, _assign({
                ref: _element.ref
              }, _element.props))];
              var _frame5 = {
                type: null,
                domNamespace: parentNamespace,
                children: _nextChildren5,
                childIndex: 0,
                context: context,
                footer: ''
              };

              {
                _frame5.debugElementStack = [];
              }

              this.stack.push(_frame5);
              return '';
            }

          case REACT_PROVIDER_TYPE:
            {
              var provider = nextChild;
              var nextProps = provider.props;

              var _nextChildren6 = toArray(nextProps.children);

              var _frame6 = {
                type: provider,
                domNamespace: parentNamespace,
                children: _nextChildren6,
                childIndex: 0,
                context: context,
                footer: ''
              };

              {
                _frame6.debugElementStack = [];
              }

              this.pushProvider(provider);
              this.stack.push(_frame6);
              return '';
            }

          case REACT_CONTEXT_TYPE:
            {
              var reactContext = nextChild.type; // The logic below for Context differs depending on PROD or DEV mode. In
              // DEV mode, we create a separate object for Context.Consumer that acts
              // like a proxy to Context. This proxy object adds unnecessary code in PROD
              // so we use the old behaviour (Context.Consumer references Context) to
              // reduce size and overhead. The separate object references context via
              // a property called "_context", which also gives us the ability to check
              // in DEV mode if this property exists or not and warn if it does not.

              {
                if (reactContext._context === undefined) {
                  // This may be because it's a Context (rather than a Consumer).
                  // Or it may be because it's older React where they're the same thing.
                  // We only want to warn if we're sure it's a new React.
                  if (reactContext !== reactContext.Consumer) {
                    if (!hasWarnedAboutUsingContextAsConsumer) {
                      hasWarnedAboutUsingContextAsConsumer = true;
                      warning$1(false, 'Rendering <Context> directly is not supported and will be removed in ' + 'a future major release. Did you mean to render <Context.Consumer> instead?');
                    }
                  }
                } else {
                  reactContext = reactContext._context;
                }
              }

              var _nextProps = nextChild.props;
              var threadID = this.threadID;
              validateContextBounds(reactContext, threadID);
              var nextValue = reactContext[threadID];

              var _nextChildren7 = toArray(_nextProps.children(nextValue));

              var _frame7 = {
                type: nextChild,
                domNamespace: parentNamespace,
                children: _nextChildren7,
                childIndex: 0,
                context: context,
                footer: ''
              };

              {
                _frame7.debugElementStack = [];
              }

              this.stack.push(_frame7);
              return '';
            }
          // eslint-disable-next-line-no-fallthrough

          case REACT_FUNDAMENTAL_TYPE:
            {
              if (enableFundamentalAPI) {
                var fundamentalImpl = elementType.impl;
                var open = fundamentalImpl.getServerSideString(null, nextElement.props);
                var getServerSideStringClose = fundamentalImpl.getServerSideStringClose;
                var close = getServerSideStringClose !== undefined ? getServerSideStringClose(null, nextElement.props) : '';

                var _nextChildren8 = fundamentalImpl.reconcileChildren !== false ? toArray(nextChild.props.children) : [];

                var _frame8 = {
                  type: null,
                  domNamespace: parentNamespace,
                  children: _nextChildren8,
                  childIndex: 0,
                  context: context,
                  footer: close
                };

                {
                  _frame8.debugElementStack = [];
                }

                this.stack.push(_frame8);
                return open;
              }

              {
                {
                  throw Error("ReactDOMServer does not yet support the fundamental API.");
                }
              }
            }
          // eslint-disable-next-line-no-fallthrough

          case REACT_LAZY_TYPE:
            {
              var _element2 = nextChild;
              var lazyComponent = nextChild.type; // Attempt to initialize lazy component regardless of whether the
              // suspense server-side renderer is enabled so synchronously
              // resolved constructors are supported.

              initializeLazyComponentType(lazyComponent);

              switch (lazyComponent._status) {
                case Resolved:
                  {
                    var _nextChildren9 = [React.createElement(lazyComponent._result, _assign({
                      ref: _element2.ref
                    }, _element2.props))];
                    var _frame9 = {
                      type: null,
                      domNamespace: parentNamespace,
                      children: _nextChildren9,
                      childIndex: 0,
                      context: context,
                      footer: ''
                    };

                    {
                      _frame9.debugElementStack = [];
                    }

                    this.stack.push(_frame9);
                    return '';
                  }

                case Rejected:
                  throw lazyComponent._result;

                case Pending:
                default:
                  {
                    {
                      throw Error("ReactDOMServer does not yet support lazy-loaded components.");
                    }
                  }

              }
            }
          // eslint-disable-next-line-no-fallthrough

          case REACT_SCOPE_TYPE:
            {
              if (enableScopeAPI) {
                var _nextChildren10 = toArray(nextChild.props.children);

                var _frame10 = {
                  type: null,
                  domNamespace: parentNamespace,
                  children: _nextChildren10,
                  childIndex: 0,
                  context: context,
                  footer: ''
                };

                {
                  _frame10.debugElementStack = [];
                }

                this.stack.push(_frame10);
                return '';
              }

              {
                {
                  throw Error("ReactDOMServer does not yet support scope components.");
                }
              }
            }
        }
      }

      var info = '';

      {
        var owner = nextElement._owner;

        if (elementType === undefined || typeof elementType === 'object' && elementType !== null && Object.keys(elementType).length === 0) {
          info += ' You likely forgot to export your component from the file ' + "it's defined in, or you might have mixed up default and " + 'named imports.';
        }

        var ownerName = owner ? getComponentName(owner) : null;

        if (ownerName) {
          info += '\n\nCheck the render method of `' + ownerName + '`.';
        }
      }

      {
        {
          throw Error("Element type is invalid: expected a string (for built-in components) or a class/function (for composite components) but got: " + (elementType == null ? elementType : typeof elementType) + "." + info);
        }
      }
    }
  };

  _proto.renderDOM = function renderDOM(element, context, parentNamespace) {
    var tag = element.type.toLowerCase();
    var namespace = parentNamespace;

    if (parentNamespace === Namespaces.html) {
      namespace = getIntrinsicNamespace(tag);
    }

    {
      if (namespace === Namespaces.html) {
        // Should this check be gated by parent namespace? Not sure we want to
        // allow <SVG> or <mATH>.
        !(tag === element.type) ? warning$1(false, '<%s /> is using incorrect casing. ' + 'Use PascalCase for React components, ' + 'or lowercase for HTML elements.', element.type) : void 0;
      }
    }

    validateDangerousTag(tag);
    var props = element.props;

    if (tag === 'input') {
      {
        ReactControlledValuePropTypes.checkPropTypes('input', props);

        if (props.checked !== undefined && props.defaultChecked !== undefined && !didWarnDefaultChecked) {
          warning$1(false, '%s contains an input of type %s with both checked and defaultChecked props. ' + 'Input elements must be either controlled or uncontrolled ' + '(specify either the checked prop, or the defaultChecked prop, but not ' + 'both). Decide between using a controlled or uncontrolled input ' + 'element and remove one of these props. More info: ' + 'https://fb.me/react-controlled-components', 'A component', props.type);
          didWarnDefaultChecked = true;
        }

        if (props.value !== undefined && props.defaultValue !== undefined && !didWarnDefaultInputValue) {
          warning$1(false, '%s contains an input of type %s with both value and defaultValue props. ' + 'Input elements must be either controlled or uncontrolled ' + '(specify either the value prop, or the defaultValue prop, but not ' + 'both). Decide between using a controlled or uncontrolled input ' + 'element and remove one of these props. More info: ' + 'https://fb.me/react-controlled-components', 'A component', props.type);
          didWarnDefaultInputValue = true;
        }
      }

      props = _assign({
        type: undefined
      }, props, {
        defaultChecked: undefined,
        defaultValue: undefined,
        value: props.value != null ? props.value : props.defaultValue,
        checked: props.checked != null ? props.checked : props.defaultChecked
      });
    } else if (tag === 'textarea') {
      {
        ReactControlledValuePropTypes.checkPropTypes('textarea', props);

        if (props.value !== undefined && props.defaultValue !== undefined && !didWarnDefaultTextareaValue) {
          warning$1(false, 'Textarea elements must be either controlled or uncontrolled ' + '(specify either the value prop, or the defaultValue prop, but not ' + 'both). Decide between using a controlled or uncontrolled textarea ' + 'and remove one of these props. More info: ' + 'https://fb.me/react-controlled-components');
          didWarnDefaultTextareaValue = true;
        }
      }

      var initialValue = props.value;

      if (initialValue == null) {
        var defaultValue = props.defaultValue; // TODO (yungsters): Remove support for children content in <textarea>.

        var textareaChildren = props.children;

        if (textareaChildren != null) {
          {
            warning$1(false, 'Use the `defaultValue` or `value` props instead of setting ' + 'children on <textarea>.');
          }

          if (!(defaultValue == null)) {
            {
              throw Error("If you supply `defaultValue` on a <textarea>, do not pass children.");
            }
          }

          if (Array.isArray(textareaChildren)) {
            if (!(textareaChildren.length <= 1)) {
              {
                throw Error("<textarea> can only have at most one child.");
              }
            }

            textareaChildren = textareaChildren[0];
          }

          defaultValue = '' + textareaChildren;
        }

        if (defaultValue == null) {
          defaultValue = '';
        }

        initialValue = defaultValue;
      }

      props = _assign({}, props, {
        value: undefined,
        children: '' + initialValue
      });
    } else if (tag === 'select') {
      {
        ReactControlledValuePropTypes.checkPropTypes('select', props);

        for (var i = 0; i < valuePropNames.length; i++) {
          var propName = valuePropNames[i];

          if (props[propName] == null) {
            continue;
          }

          var isArray = Array.isArray(props[propName]);

          if (props.multiple && !isArray) {
            warning$1(false, 'The `%s` prop supplied to <select> must be an array if ' + '`multiple` is true.', propName);
          } else if (!props.multiple && isArray) {
            warning$1(false, 'The `%s` prop supplied to <select> must be a scalar ' + 'value if `multiple` is false.', propName);
          }
        }

        if (props.value !== undefined && props.defaultValue !== undefined && !didWarnDefaultSelectValue) {
          warning$1(false, 'Select elements must be either controlled or uncontrolled ' + '(specify either the value prop, or the defaultValue prop, but not ' + 'both). Decide between using a controlled or uncontrolled select ' + 'element and remove one of these props. More info: ' + 'https://fb.me/react-controlled-components');
          didWarnDefaultSelectValue = true;
        }
      }

      this.currentSelectValue = props.value != null ? props.value : props.defaultValue;
      props = _assign({}, props, {
        value: undefined
      });
    } else if (tag === 'option') {
      var selected = null;
      var selectValue = this.currentSelectValue;
      var optionChildren = flattenOptionChildren(props.children);

      if (selectValue != null) {
        var value;

        if (props.value != null) {
          value = props.value + '';
        } else {
          value = optionChildren;
        }

        selected = false;

        if (Array.isArray(selectValue)) {
          // multiple
          for (var j = 0; j < selectValue.length; j++) {
            if ('' + selectValue[j] === value) {
              selected = true;
              break;
            }
          }
        } else {
          selected = '' + selectValue === value;
        }

        props = _assign({
          selected: undefined,
          children: undefined
        }, props, {
          selected: selected,
          children: optionChildren
        });
      }
    }

    {
      validatePropertiesInDevelopment(tag, props);
    }

    assertValidProps(tag, props);
    var out = createOpenTagMarkup(element.type, tag, props, namespace, this.makeStaticMarkup, this.stack.length === 1);
    var footer = '';

    if (omittedCloseTags.hasOwnProperty(tag)) {
      out += '/>';
    } else {
      out += '>';
      footer = '</' + element.type + '>';
    }

    var children;
    var innerMarkup = getNonChildrenInnerMarkup(props);

    if (innerMarkup != null) {
      children = [];

      if (newlineEatingTags[tag] && innerMarkup.charAt(0) === '\n') {
        // text/html ignores the first character in these tags if it's a newline
        // Prefer to break application/xml over text/html (for now) by adding
        // a newline specifically to get eaten by the parser. (Alternately for
        // textareas, replacing "^\n" with "\r\n" doesn't get eaten, and the first
        // \r is normalized out by HTMLTextAreaElement#value.)
        // See: <http://www.w3.org/TR/html-polyglot/#newlines-in-textarea-and-pre>
        // See: <http://www.w3.org/TR/html5/syntax.html#element-restrictions>
        // See: <http://www.w3.org/TR/html5/syntax.html#newlines>
        // See: Parsing of "textarea" "listing" and "pre" elements
        //  from <http://www.w3.org/TR/html5/syntax.html#parsing-main-inbody>
        out += '\n';
      }

      out += innerMarkup;
    } else {
      children = toArray(props.children);
    }

    var frame = {
      domNamespace: getChildNamespace(parentNamespace, element.type),
      type: tag,
      children: children,
      childIndex: 0,
      context: context,
      footer: footer
    };

    {
      frame.debugElementStack = [];
    }

    this.stack.push(frame);
    this.previousWasTextNode = false;
    return out;
  };

  return ReactDOMServerRenderer;
}();

/**
 * Render a ReactElement to its initial HTML. This should only be used on the
 * server.
 * See https://reactjs.org/docs/react-dom-server.html#rendertostring
 */

function renderToString(element) {
  var renderer = new ReactDOMServerRenderer(element, false);

  try {
    var markup = renderer.read(Infinity);
    return markup;
  } finally {
    renderer.destroy();
  }
}
/**
 * Similar to renderToString, except this doesn't create extra DOM attributes
 * such as data-react-id that React uses internally.
 * See https://reactjs.org/docs/react-dom-server.html#rendertostaticmarkup
 */

function renderToStaticMarkup(element) {
  var renderer = new ReactDOMServerRenderer(element, true);

  try {
    var markup = renderer.read(Infinity);
    return markup;
  } finally {
    renderer.destroy();
  }
}

function renderToNodeStream() {
  {
    {
      throw Error("ReactDOMServer.renderToNodeStream(): The streaming API is not available in the browser. Use ReactDOMServer.renderToString() instead.");
    }
  }
}

function renderToStaticNodeStream() {
  {
    {
      throw Error("ReactDOMServer.renderToStaticNodeStream(): The streaming API is not available in the browser. Use ReactDOMServer.renderToStaticMarkup() instead.");
    }
  }
} // Note: when changing this, also consider https://github.com/facebook/react/issues/11526


var ReactDOMServerBrowser = {
  renderToString: renderToString,
  renderToStaticMarkup: renderToStaticMarkup,
  renderToNodeStream: renderToNodeStream,
  renderToStaticNodeStream: renderToStaticNodeStream,
  version: ReactVersion
};

var ReactDOMServerBrowser$1 = Object.freeze({
	default: ReactDOMServerBrowser
});

var ReactDOMServer = ( ReactDOMServerBrowser$1 && ReactDOMServerBrowser ) || ReactDOMServerBrowser$1;

// TODO: decide on the top-level export form.
// This is hacky but makes it work with both Rollup and Jest


var server_browser = ReactDOMServer.default || ReactDOMServer;

module.exports = server_browser;
  })();
}


/***/ }),

/***/ "./node_modules/react-dom/server.browser.js":
/*!**************************************************!*\
  !*** ./node_modules/react-dom/server.browser.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


if (false) {} else {
  module.exports = __webpack_require__(/*! ./cjs/react-dom-server.browser.development.js */ "./node_modules/react-dom/cjs/react-dom-server.browser.development.js");
}


/***/ }),

/***/ "./node_modules/react/cjs/react.development.js":
/*!*****************************************************!*\
  !*** ./node_modules/react/cjs/react.development.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/** @license React v16.12.0
 * react.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */





if (true) {
  (function() {
'use strict';

var _assign = __webpack_require__(/*! object-assign */ "./node_modules/object-assign/index.js");
var checkPropTypes = __webpack_require__(/*! prop-types/checkPropTypes */ "./node_modules/prop-types/checkPropTypes.js");

// TODO: this is special because it gets imported during build.

var ReactVersion = '16.12.0';

// The Symbol used to tag the ReactElement-like types. If there is no native Symbol
// nor polyfill, then a plain number is used for performance.
var hasSymbol = typeof Symbol === 'function' && Symbol.for;
var REACT_ELEMENT_TYPE = hasSymbol ? Symbol.for('react.element') : 0xeac7;
var REACT_PORTAL_TYPE = hasSymbol ? Symbol.for('react.portal') : 0xeaca;
var REACT_FRAGMENT_TYPE = hasSymbol ? Symbol.for('react.fragment') : 0xeacb;
var REACT_STRICT_MODE_TYPE = hasSymbol ? Symbol.for('react.strict_mode') : 0xeacc;
var REACT_PROFILER_TYPE = hasSymbol ? Symbol.for('react.profiler') : 0xead2;
var REACT_PROVIDER_TYPE = hasSymbol ? Symbol.for('react.provider') : 0xeacd;
var REACT_CONTEXT_TYPE = hasSymbol ? Symbol.for('react.context') : 0xeace; // TODO: We don't use AsyncMode or ConcurrentMode anymore. They were temporary
// (unstable) APIs that have been removed. Can we remove the symbols?


var REACT_CONCURRENT_MODE_TYPE = hasSymbol ? Symbol.for('react.concurrent_mode') : 0xeacf;
var REACT_FORWARD_REF_TYPE = hasSymbol ? Symbol.for('react.forward_ref') : 0xead0;
var REACT_SUSPENSE_TYPE = hasSymbol ? Symbol.for('react.suspense') : 0xead1;
var REACT_SUSPENSE_LIST_TYPE = hasSymbol ? Symbol.for('react.suspense_list') : 0xead8;
var REACT_MEMO_TYPE = hasSymbol ? Symbol.for('react.memo') : 0xead3;
var REACT_LAZY_TYPE = hasSymbol ? Symbol.for('react.lazy') : 0xead4;
var REACT_FUNDAMENTAL_TYPE = hasSymbol ? Symbol.for('react.fundamental') : 0xead5;
var REACT_RESPONDER_TYPE = hasSymbol ? Symbol.for('react.responder') : 0xead6;
var REACT_SCOPE_TYPE = hasSymbol ? Symbol.for('react.scope') : 0xead7;
var MAYBE_ITERATOR_SYMBOL = typeof Symbol === 'function' && Symbol.iterator;
var FAUX_ITERATOR_SYMBOL = '@@iterator';
function getIteratorFn(maybeIterable) {
  if (maybeIterable === null || typeof maybeIterable !== 'object') {
    return null;
  }

  var maybeIterator = MAYBE_ITERATOR_SYMBOL && maybeIterable[MAYBE_ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL];

  if (typeof maybeIterator === 'function') {
    return maybeIterator;
  }

  return null;
}

// Do not require this module directly! Use normal `invariant` calls with
// template literal strings. The messages will be replaced with error codes
// during build.

/**
 * Use invariant() to assert state which your program assumes to be true.
 *
 * Provide sprintf-style format (only %s is supported) and arguments
 * to provide information about what broke and what you were
 * expecting.
 *
 * The invariant message will be stripped in production, but the invariant
 * will remain to ensure logic does not differ in production.
 */

/**
 * Forked from fbjs/warning:
 * https://github.com/facebook/fbjs/blob/e66ba20ad5be433eb54423f2b097d829324d9de6/packages/fbjs/src/__forks__/warning.js
 *
 * Only change is we use console.warn instead of console.error,
 * and do nothing when 'console' is not supported.
 * This really simplifies the code.
 * ---
 * Similar to invariant but only logs a warning if the condition is not met.
 * This can be used to log issues in development environments in critical
 * paths. Removing the logging code for production environments will keep the
 * same logic and follow the same code paths.
 */
var lowPriorityWarningWithoutStack = function () {};

{
  var printWarning = function (format) {
    for (var _len = arguments.length, args = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
      args[_key - 1] = arguments[_key];
    }

    var argIndex = 0;
    var message = 'Warning: ' + format.replace(/%s/g, function () {
      return args[argIndex++];
    });

    if (typeof console !== 'undefined') {
      console.warn(message);
    }

    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };

  lowPriorityWarningWithoutStack = function (condition, format) {
    if (format === undefined) {
      throw new Error('`lowPriorityWarningWithoutStack(condition, format, ...args)` requires a warning ' + 'message argument');
    }

    if (!condition) {
      for (var _len2 = arguments.length, args = new Array(_len2 > 2 ? _len2 - 2 : 0), _key2 = 2; _key2 < _len2; _key2++) {
        args[_key2 - 2] = arguments[_key2];
      }

      printWarning.apply(void 0, [format].concat(args));
    }
  };
}

var lowPriorityWarningWithoutStack$1 = lowPriorityWarningWithoutStack;

/**
 * Similar to invariant but only logs a warning if the condition is not met.
 * This can be used to log issues in development environments in critical
 * paths. Removing the logging code for production environments will keep the
 * same logic and follow the same code paths.
 */
var warningWithoutStack = function () {};

{
  warningWithoutStack = function (condition, format) {
    for (var _len = arguments.length, args = new Array(_len > 2 ? _len - 2 : 0), _key = 2; _key < _len; _key++) {
      args[_key - 2] = arguments[_key];
    }

    if (format === undefined) {
      throw new Error('`warningWithoutStack(condition, format, ...args)` requires a warning ' + 'message argument');
    }

    if (args.length > 8) {
      // Check before the condition to catch violations early.
      throw new Error('warningWithoutStack() currently supports at most 8 arguments.');
    }

    if (condition) {
      return;
    }

    if (typeof console !== 'undefined') {
      var argsWithFormat = args.map(function (item) {
        return '' + item;
      });
      argsWithFormat.unshift('Warning: ' + format); // We intentionally don't use spread (or .apply) directly because it
      // breaks IE9: https://github.com/facebook/react/issues/13610

      Function.prototype.apply.call(console.error, console, argsWithFormat);
    }

    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      var argIndex = 0;
      var message = 'Warning: ' + format.replace(/%s/g, function () {
        return args[argIndex++];
      });
      throw new Error(message);
    } catch (x) {}
  };
}

var warningWithoutStack$1 = warningWithoutStack;

var didWarnStateUpdateForUnmountedComponent = {};

function warnNoop(publicInstance, callerName) {
  {
    var _constructor = publicInstance.constructor;
    var componentName = _constructor && (_constructor.displayName || _constructor.name) || 'ReactClass';
    var warningKey = componentName + "." + callerName;

    if (didWarnStateUpdateForUnmountedComponent[warningKey]) {
      return;
    }

    warningWithoutStack$1(false, "Can't call %s on a component that is not yet mounted. " + 'This is a no-op, but it might indicate a bug in your application. ' + 'Instead, assign to `this.state` directly or define a `state = {};` ' + 'class property with the desired state in the %s component.', callerName, componentName);
    didWarnStateUpdateForUnmountedComponent[warningKey] = true;
  }
}
/**
 * This is the abstract API for an update queue.
 */


var ReactNoopUpdateQueue = {
  /**
   * Checks whether or not this composite component is mounted.
   * @param {ReactClass} publicInstance The instance we want to test.
   * @return {boolean} True if mounted, false otherwise.
   * @protected
   * @final
   */
  isMounted: function (publicInstance) {
    return false;
  },

  /**
   * Forces an update. This should only be invoked when it is known with
   * certainty that we are **not** in a DOM transaction.
   *
   * You may want to call this when you know that some deeper aspect of the
   * component's state has changed but `setState` was not called.
   *
   * This will not invoke `shouldComponentUpdate`, but it will invoke
   * `componentWillUpdate` and `componentDidUpdate`.
   *
   * @param {ReactClass} publicInstance The instance that should rerender.
   * @param {?function} callback Called after component is updated.
   * @param {?string} callerName name of the calling function in the public API.
   * @internal
   */
  enqueueForceUpdate: function (publicInstance, callback, callerName) {
    warnNoop(publicInstance, 'forceUpdate');
  },

  /**
   * Replaces all of the state. Always use this or `setState` to mutate state.
   * You should treat `this.state` as immutable.
   *
   * There is no guarantee that `this.state` will be immediately updated, so
   * accessing `this.state` after calling this method may return the old value.
   *
   * @param {ReactClass} publicInstance The instance that should rerender.
   * @param {object} completeState Next state.
   * @param {?function} callback Called after component is updated.
   * @param {?string} callerName name of the calling function in the public API.
   * @internal
   */
  enqueueReplaceState: function (publicInstance, completeState, callback, callerName) {
    warnNoop(publicInstance, 'replaceState');
  },

  /**
   * Sets a subset of the state. This only exists because _pendingState is
   * internal. This provides a merging strategy that is not available to deep
   * properties which is confusing. TODO: Expose pendingState or don't use it
   * during the merge.
   *
   * @param {ReactClass} publicInstance The instance that should rerender.
   * @param {object} partialState Next partial state to be merged with state.
   * @param {?function} callback Called after component is updated.
   * @param {?string} Name of the calling function in the public API.
   * @internal
   */
  enqueueSetState: function (publicInstance, partialState, callback, callerName) {
    warnNoop(publicInstance, 'setState');
  }
};

var emptyObject = {};

{
  Object.freeze(emptyObject);
}
/**
 * Base class helpers for the updating state of a component.
 */


function Component(props, context, updater) {
  this.props = props;
  this.context = context; // If a component has string refs, we will assign a different object later.

  this.refs = emptyObject; // We initialize the default updater but the real one gets injected by the
  // renderer.

  this.updater = updater || ReactNoopUpdateQueue;
}

Component.prototype.isReactComponent = {};
/**
 * Sets a subset of the state. Always use this to mutate
 * state. You should treat `this.state` as immutable.
 *
 * There is no guarantee that `this.state` will be immediately updated, so
 * accessing `this.state` after calling this method may return the old value.
 *
 * There is no guarantee that calls to `setState` will run synchronously,
 * as they may eventually be batched together.  You can provide an optional
 * callback that will be executed when the call to setState is actually
 * completed.
 *
 * When a function is provided to setState, it will be called at some point in
 * the future (not synchronously). It will be called with the up to date
 * component arguments (state, props, context). These values can be different
 * from this.* because your function may be called after receiveProps but before
 * shouldComponentUpdate, and this new state, props, and context will not yet be
 * assigned to this.
 *
 * @param {object|function} partialState Next partial state or function to
 *        produce next partial state to be merged with current state.
 * @param {?function} callback Called after state is updated.
 * @final
 * @protected
 */

Component.prototype.setState = function (partialState, callback) {
  if (!(typeof partialState === 'object' || typeof partialState === 'function' || partialState == null)) {
    {
      throw Error("setState(...): takes an object of state variables to update or a function which returns an object of state variables.");
    }
  }

  this.updater.enqueueSetState(this, partialState, callback, 'setState');
};
/**
 * Forces an update. This should only be invoked when it is known with
 * certainty that we are **not** in a DOM transaction.
 *
 * You may want to call this when you know that some deeper aspect of the
 * component's state has changed but `setState` was not called.
 *
 * This will not invoke `shouldComponentUpdate`, but it will invoke
 * `componentWillUpdate` and `componentDidUpdate`.
 *
 * @param {?function} callback Called after update is complete.
 * @final
 * @protected
 */


Component.prototype.forceUpdate = function (callback) {
  this.updater.enqueueForceUpdate(this, callback, 'forceUpdate');
};
/**
 * Deprecated APIs. These APIs used to exist on classic React classes but since
 * we would like to deprecate them, we're not going to move them over to this
 * modern base class. Instead, we define a getter that warns if it's accessed.
 */


{
  var deprecatedAPIs = {
    isMounted: ['isMounted', 'Instead, make sure to clean up subscriptions and pending requests in ' + 'componentWillUnmount to prevent memory leaks.'],
    replaceState: ['replaceState', 'Refactor your code to use setState instead (see ' + 'https://github.com/facebook/react/issues/3236).']
  };

  var defineDeprecationWarning = function (methodName, info) {
    Object.defineProperty(Component.prototype, methodName, {
      get: function () {
        lowPriorityWarningWithoutStack$1(false, '%s(...) is deprecated in plain JavaScript React classes. %s', info[0], info[1]);
        return undefined;
      }
    });
  };

  for (var fnName in deprecatedAPIs) {
    if (deprecatedAPIs.hasOwnProperty(fnName)) {
      defineDeprecationWarning(fnName, deprecatedAPIs[fnName]);
    }
  }
}

function ComponentDummy() {}

ComponentDummy.prototype = Component.prototype;
/**
 * Convenience component with default shallow equality check for sCU.
 */

function PureComponent(props, context, updater) {
  this.props = props;
  this.context = context; // If a component has string refs, we will assign a different object later.

  this.refs = emptyObject;
  this.updater = updater || ReactNoopUpdateQueue;
}

var pureComponentPrototype = PureComponent.prototype = new ComponentDummy();
pureComponentPrototype.constructor = PureComponent; // Avoid an extra prototype jump for these methods.

_assign(pureComponentPrototype, Component.prototype);

pureComponentPrototype.isPureReactComponent = true;

// an immutable object with a single mutable value
function createRef() {
  var refObject = {
    current: null
  };

  {
    Object.seal(refObject);
  }

  return refObject;
}

/**
 * Keeps track of the current dispatcher.
 */
var ReactCurrentDispatcher = {
  /**
   * @internal
   * @type {ReactComponent}
   */
  current: null
};

/**
 * Keeps track of the current batch's configuration such as how long an update
 * should suspend for if it needs to.
 */
var ReactCurrentBatchConfig = {
  suspense: null
};

/**
 * Keeps track of the current owner.
 *
 * The current owner is the component who should own any components that are
 * currently being constructed.
 */
var ReactCurrentOwner = {
  /**
   * @internal
   * @type {ReactComponent}
   */
  current: null
};

var BEFORE_SLASH_RE = /^(.*)[\\\/]/;
var describeComponentFrame = function (name, source, ownerName) {
  var sourceInfo = '';

  if (source) {
    var path = source.fileName;
    var fileName = path.replace(BEFORE_SLASH_RE, '');

    {
      // In DEV, include code for a common special case:
      // prefer "folder/index.js" instead of just "index.js".
      if (/^index\./.test(fileName)) {
        var match = path.match(BEFORE_SLASH_RE);

        if (match) {
          var pathBeforeSlash = match[1];

          if (pathBeforeSlash) {
            var folderName = pathBeforeSlash.replace(BEFORE_SLASH_RE, '');
            fileName = folderName + '/' + fileName;
          }
        }
      }
    }

    sourceInfo = ' (at ' + fileName + ':' + source.lineNumber + ')';
  } else if (ownerName) {
    sourceInfo = ' (created by ' + ownerName + ')';
  }

  return '\n    in ' + (name || 'Unknown') + sourceInfo;
};

var Resolved = 1;

function refineResolvedLazyComponent(lazyComponent) {
  return lazyComponent._status === Resolved ? lazyComponent._result : null;
}

function getWrappedName(outerType, innerType, wrapperName) {
  var functionName = innerType.displayName || innerType.name || '';
  return outerType.displayName || (functionName !== '' ? wrapperName + "(" + functionName + ")" : wrapperName);
}

function getComponentName(type) {
  if (type == null) {
    // Host root, text node or just invalid type.
    return null;
  }

  {
    if (typeof type.tag === 'number') {
      warningWithoutStack$1(false, 'Received an unexpected object in getComponentName(). ' + 'This is likely a bug in React. Please file an issue.');
    }
  }

  if (typeof type === 'function') {
    return type.displayName || type.name || null;
  }

  if (typeof type === 'string') {
    return type;
  }

  switch (type) {
    case REACT_FRAGMENT_TYPE:
      return 'Fragment';

    case REACT_PORTAL_TYPE:
      return 'Portal';

    case REACT_PROFILER_TYPE:
      return "Profiler";

    case REACT_STRICT_MODE_TYPE:
      return 'StrictMode';

    case REACT_SUSPENSE_TYPE:
      return 'Suspense';

    case REACT_SUSPENSE_LIST_TYPE:
      return 'SuspenseList';
  }

  if (typeof type === 'object') {
    switch (type.$$typeof) {
      case REACT_CONTEXT_TYPE:
        return 'Context.Consumer';

      case REACT_PROVIDER_TYPE:
        return 'Context.Provider';

      case REACT_FORWARD_REF_TYPE:
        return getWrappedName(type, type.render, 'ForwardRef');

      case REACT_MEMO_TYPE:
        return getComponentName(type.type);

      case REACT_LAZY_TYPE:
        {
          var thenable = type;
          var resolvedThenable = refineResolvedLazyComponent(thenable);

          if (resolvedThenable) {
            return getComponentName(resolvedThenable);
          }

          break;
        }
    }
  }

  return null;
}

var ReactDebugCurrentFrame = {};
var currentlyValidatingElement = null;
function setCurrentlyValidatingElement(element) {
  {
    currentlyValidatingElement = element;
  }
}

{
  // Stack implementation injected by the current renderer.
  ReactDebugCurrentFrame.getCurrentStack = null;

  ReactDebugCurrentFrame.getStackAddendum = function () {
    var stack = ''; // Add an extra top frame while an element is being validated

    if (currentlyValidatingElement) {
      var name = getComponentName(currentlyValidatingElement.type);
      var owner = currentlyValidatingElement._owner;
      stack += describeComponentFrame(name, currentlyValidatingElement._source, owner && getComponentName(owner.type));
    } // Delegate to the injected renderer-specific implementation


    var impl = ReactDebugCurrentFrame.getCurrentStack;

    if (impl) {
      stack += impl() || '';
    }

    return stack;
  };
}

/**
 * Used by act() to track whether you're inside an act() scope.
 */
var IsSomeRendererActing = {
  current: false
};

var ReactSharedInternals = {
  ReactCurrentDispatcher: ReactCurrentDispatcher,
  ReactCurrentBatchConfig: ReactCurrentBatchConfig,
  ReactCurrentOwner: ReactCurrentOwner,
  IsSomeRendererActing: IsSomeRendererActing,
  // Used by renderers to avoid bundling object-assign twice in UMD bundles:
  assign: _assign
};

{
  _assign(ReactSharedInternals, {
    // These should not be included in production.
    ReactDebugCurrentFrame: ReactDebugCurrentFrame,
    // Shim for React DOM 16.0.0 which still destructured (but not used) this.
    // TODO: remove in React 17.0.
    ReactComponentTreeHook: {}
  });
}

/**
 * Similar to invariant but only logs a warning if the condition is not met.
 * This can be used to log issues in development environments in critical
 * paths. Removing the logging code for production environments will keep the
 * same logic and follow the same code paths.
 */

var warning = warningWithoutStack$1;

{
  warning = function (condition, format) {
    if (condition) {
      return;
    }

    var ReactDebugCurrentFrame = ReactSharedInternals.ReactDebugCurrentFrame;
    var stack = ReactDebugCurrentFrame.getStackAddendum(); // eslint-disable-next-line react-internal/warning-and-invariant-args

    for (var _len = arguments.length, args = new Array(_len > 2 ? _len - 2 : 0), _key = 2; _key < _len; _key++) {
      args[_key - 2] = arguments[_key];
    }

    warningWithoutStack$1.apply(void 0, [false, format + '%s'].concat(args, [stack]));
  };
}

var warning$1 = warning;

var hasOwnProperty = Object.prototype.hasOwnProperty;
var RESERVED_PROPS = {
  key: true,
  ref: true,
  __self: true,
  __source: true
};
var specialPropKeyWarningShown;
var specialPropRefWarningShown;

function hasValidRef(config) {
  {
    if (hasOwnProperty.call(config, 'ref')) {
      var getter = Object.getOwnPropertyDescriptor(config, 'ref').get;

      if (getter && getter.isReactWarning) {
        return false;
      }
    }
  }

  return config.ref !== undefined;
}

function hasValidKey(config) {
  {
    if (hasOwnProperty.call(config, 'key')) {
      var getter = Object.getOwnPropertyDescriptor(config, 'key').get;

      if (getter && getter.isReactWarning) {
        return false;
      }
    }
  }

  return config.key !== undefined;
}

function defineKeyPropWarningGetter(props, displayName) {
  var warnAboutAccessingKey = function () {
    if (!specialPropKeyWarningShown) {
      specialPropKeyWarningShown = true;
      warningWithoutStack$1(false, '%s: `key` is not a prop. Trying to access it will result ' + 'in `undefined` being returned. If you need to access the same ' + 'value within the child component, you should pass it as a different ' + 'prop. (https://fb.me/react-special-props)', displayName);
    }
  };

  warnAboutAccessingKey.isReactWarning = true;
  Object.defineProperty(props, 'key', {
    get: warnAboutAccessingKey,
    configurable: true
  });
}

function defineRefPropWarningGetter(props, displayName) {
  var warnAboutAccessingRef = function () {
    if (!specialPropRefWarningShown) {
      specialPropRefWarningShown = true;
      warningWithoutStack$1(false, '%s: `ref` is not a prop. Trying to access it will result ' + 'in `undefined` being returned. If you need to access the same ' + 'value within the child component, you should pass it as a different ' + 'prop. (https://fb.me/react-special-props)', displayName);
    }
  };

  warnAboutAccessingRef.isReactWarning = true;
  Object.defineProperty(props, 'ref', {
    get: warnAboutAccessingRef,
    configurable: true
  });
}
/**
 * Factory method to create a new React element. This no longer adheres to
 * the class pattern, so do not use new to call it. Also, instanceof check
 * will not work. Instead test $$typeof field against Symbol.for('react.element') to check
 * if something is a React Element.
 *
 * @param {*} type
 * @param {*} props
 * @param {*} key
 * @param {string|object} ref
 * @param {*} owner
 * @param {*} self A *temporary* helper to detect places where `this` is
 * different from the `owner` when React.createElement is called, so that we
 * can warn. We want to get rid of owner and replace string `ref`s with arrow
 * functions, and as long as `this` and owner are the same, there will be no
 * change in behavior.
 * @param {*} source An annotation object (added by a transpiler or otherwise)
 * indicating filename, line number, and/or other information.
 * @internal
 */


var ReactElement = function (type, key, ref, self, source, owner, props) {
  var element = {
    // This tag allows us to uniquely identify this as a React Element
    $$typeof: REACT_ELEMENT_TYPE,
    // Built-in properties that belong on the element
    type: type,
    key: key,
    ref: ref,
    props: props,
    // Record the component responsible for creating this element.
    _owner: owner
  };

  {
    // The validation flag is currently mutative. We put it on
    // an external backing store so that we can freeze the whole object.
    // This can be replaced with a WeakMap once they are implemented in
    // commonly used development environments.
    element._store = {}; // To make comparing ReactElements easier for testing purposes, we make
    // the validation flag non-enumerable (where possible, which should
    // include every environment we run tests in), so the test framework
    // ignores it.

    Object.defineProperty(element._store, 'validated', {
      configurable: false,
      enumerable: false,
      writable: true,
      value: false
    }); // self and source are DEV only properties.

    Object.defineProperty(element, '_self', {
      configurable: false,
      enumerable: false,
      writable: false,
      value: self
    }); // Two elements created in two different places should be considered
    // equal for testing purposes and therefore we hide it from enumeration.

    Object.defineProperty(element, '_source', {
      configurable: false,
      enumerable: false,
      writable: false,
      value: source
    });

    if (Object.freeze) {
      Object.freeze(element.props);
      Object.freeze(element);
    }
  }

  return element;
};
/**
 * https://github.com/reactjs/rfcs/pull/107
 * @param {*} type
 * @param {object} props
 * @param {string} key
 */



/**
 * https://github.com/reactjs/rfcs/pull/107
 * @param {*} type
 * @param {object} props
 * @param {string} key
 */

function jsxDEV(type, config, maybeKey, source, self) {
  var propName; // Reserved names are extracted

  var props = {};
  var key = null;
  var ref = null; // Currently, key can be spread in as a prop. This causes a potential
  // issue if key is also explicitly declared (ie. <div {...props} key="Hi" />
  // or <div key="Hi" {...props} /> ). We want to deprecate key spread,
  // but as an intermediary step, we will use jsxDEV for everything except
  // <div {...props} key="Hi" />, because we aren't currently able to tell if
  // key is explicitly declared to be undefined or not.

  if (maybeKey !== undefined) {
    key = '' + maybeKey;
  }

  if (hasValidKey(config)) {
    key = '' + config.key;
  }

  if (hasValidRef(config)) {
    ref = config.ref;
  } // Remaining properties are added to a new props object


  for (propName in config) {
    if (hasOwnProperty.call(config, propName) && !RESERVED_PROPS.hasOwnProperty(propName)) {
      props[propName] = config[propName];
    }
  } // Resolve default props


  if (type && type.defaultProps) {
    var defaultProps = type.defaultProps;

    for (propName in defaultProps) {
      if (props[propName] === undefined) {
        props[propName] = defaultProps[propName];
      }
    }
  }

  if (key || ref) {
    var displayName = typeof type === 'function' ? type.displayName || type.name || 'Unknown' : type;

    if (key) {
      defineKeyPropWarningGetter(props, displayName);
    }

    if (ref) {
      defineRefPropWarningGetter(props, displayName);
    }
  }

  return ReactElement(type, key, ref, self, source, ReactCurrentOwner.current, props);
}
/**
 * Create and return a new ReactElement of the given type.
 * See https://reactjs.org/docs/react-api.html#createelement
 */

function createElement(type, config, children) {
  var propName; // Reserved names are extracted

  var props = {};
  var key = null;
  var ref = null;
  var self = null;
  var source = null;

  if (config != null) {
    if (hasValidRef(config)) {
      ref = config.ref;
    }

    if (hasValidKey(config)) {
      key = '' + config.key;
    }

    self = config.__self === undefined ? null : config.__self;
    source = config.__source === undefined ? null : config.__source; // Remaining properties are added to a new props object

    for (propName in config) {
      if (hasOwnProperty.call(config, propName) && !RESERVED_PROPS.hasOwnProperty(propName)) {
        props[propName] = config[propName];
      }
    }
  } // Children can be more than one argument, and those are transferred onto
  // the newly allocated props object.


  var childrenLength = arguments.length - 2;

  if (childrenLength === 1) {
    props.children = children;
  } else if (childrenLength > 1) {
    var childArray = Array(childrenLength);

    for (var i = 0; i < childrenLength; i++) {
      childArray[i] = arguments[i + 2];
    }

    {
      if (Object.freeze) {
        Object.freeze(childArray);
      }
    }

    props.children = childArray;
  } // Resolve default props


  if (type && type.defaultProps) {
    var defaultProps = type.defaultProps;

    for (propName in defaultProps) {
      if (props[propName] === undefined) {
        props[propName] = defaultProps[propName];
      }
    }
  }

  {
    if (key || ref) {
      var displayName = typeof type === 'function' ? type.displayName || type.name || 'Unknown' : type;

      if (key) {
        defineKeyPropWarningGetter(props, displayName);
      }

      if (ref) {
        defineRefPropWarningGetter(props, displayName);
      }
    }
  }

  return ReactElement(type, key, ref, self, source, ReactCurrentOwner.current, props);
}
/**
 * Return a function that produces ReactElements of a given type.
 * See https://reactjs.org/docs/react-api.html#createfactory
 */


function cloneAndReplaceKey(oldElement, newKey) {
  var newElement = ReactElement(oldElement.type, newKey, oldElement.ref, oldElement._self, oldElement._source, oldElement._owner, oldElement.props);
  return newElement;
}
/**
 * Clone and return a new ReactElement using element as the starting point.
 * See https://reactjs.org/docs/react-api.html#cloneelement
 */

function cloneElement(element, config, children) {
  if (!!(element === null || element === undefined)) {
    {
      throw Error("React.cloneElement(...): The argument must be a React element, but you passed " + element + ".");
    }
  }

  var propName; // Original props are copied

  var props = _assign({}, element.props); // Reserved names are extracted


  var key = element.key;
  var ref = element.ref; // Self is preserved since the owner is preserved.

  var self = element._self; // Source is preserved since cloneElement is unlikely to be targeted by a
  // transpiler, and the original source is probably a better indicator of the
  // true owner.

  var source = element._source; // Owner will be preserved, unless ref is overridden

  var owner = element._owner;

  if (config != null) {
    if (hasValidRef(config)) {
      // Silently steal the ref from the parent.
      ref = config.ref;
      owner = ReactCurrentOwner.current;
    }

    if (hasValidKey(config)) {
      key = '' + config.key;
    } // Remaining properties override existing props


    var defaultProps;

    if (element.type && element.type.defaultProps) {
      defaultProps = element.type.defaultProps;
    }

    for (propName in config) {
      if (hasOwnProperty.call(config, propName) && !RESERVED_PROPS.hasOwnProperty(propName)) {
        if (config[propName] === undefined && defaultProps !== undefined) {
          // Resolve default props
          props[propName] = defaultProps[propName];
        } else {
          props[propName] = config[propName];
        }
      }
    }
  } // Children can be more than one argument, and those are transferred onto
  // the newly allocated props object.


  var childrenLength = arguments.length - 2;

  if (childrenLength === 1) {
    props.children = children;
  } else if (childrenLength > 1) {
    var childArray = Array(childrenLength);

    for (var i = 0; i < childrenLength; i++) {
      childArray[i] = arguments[i + 2];
    }

    props.children = childArray;
  }

  return ReactElement(element.type, key, ref, self, source, owner, props);
}
/**
 * Verifies the object is a ReactElement.
 * See https://reactjs.org/docs/react-api.html#isvalidelement
 * @param {?object} object
 * @return {boolean} True if `object` is a ReactElement.
 * @final
 */

function isValidElement(object) {
  return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
}

var SEPARATOR = '.';
var SUBSEPARATOR = ':';
/**
 * Escape and wrap key so it is safe to use as a reactid
 *
 * @param {string} key to be escaped.
 * @return {string} the escaped key.
 */

function escape(key) {
  var escapeRegex = /[=:]/g;
  var escaperLookup = {
    '=': '=0',
    ':': '=2'
  };
  var escapedString = ('' + key).replace(escapeRegex, function (match) {
    return escaperLookup[match];
  });
  return '$' + escapedString;
}
/**
 * TODO: Test that a single child and an array with one item have the same key
 * pattern.
 */


var didWarnAboutMaps = false;
var userProvidedKeyEscapeRegex = /\/+/g;

function escapeUserProvidedKey(text) {
  return ('' + text).replace(userProvidedKeyEscapeRegex, '$&/');
}

var POOL_SIZE = 10;
var traverseContextPool = [];

function getPooledTraverseContext(mapResult, keyPrefix, mapFunction, mapContext) {
  if (traverseContextPool.length) {
    var traverseContext = traverseContextPool.pop();
    traverseContext.result = mapResult;
    traverseContext.keyPrefix = keyPrefix;
    traverseContext.func = mapFunction;
    traverseContext.context = mapContext;
    traverseContext.count = 0;
    return traverseContext;
  } else {
    return {
      result: mapResult,
      keyPrefix: keyPrefix,
      func: mapFunction,
      context: mapContext,
      count: 0
    };
  }
}

function releaseTraverseContext(traverseContext) {
  traverseContext.result = null;
  traverseContext.keyPrefix = null;
  traverseContext.func = null;
  traverseContext.context = null;
  traverseContext.count = 0;

  if (traverseContextPool.length < POOL_SIZE) {
    traverseContextPool.push(traverseContext);
  }
}
/**
 * @param {?*} children Children tree container.
 * @param {!string} nameSoFar Name of the key path so far.
 * @param {!function} callback Callback to invoke with each child found.
 * @param {?*} traverseContext Used to pass information throughout the traversal
 * process.
 * @return {!number} The number of children in this subtree.
 */


function traverseAllChildrenImpl(children, nameSoFar, callback, traverseContext) {
  var type = typeof children;

  if (type === 'undefined' || type === 'boolean') {
    // All of the above are perceived as null.
    children = null;
  }

  var invokeCallback = false;

  if (children === null) {
    invokeCallback = true;
  } else {
    switch (type) {
      case 'string':
      case 'number':
        invokeCallback = true;
        break;

      case 'object':
        switch (children.$$typeof) {
          case REACT_ELEMENT_TYPE:
          case REACT_PORTAL_TYPE:
            invokeCallback = true;
        }

    }
  }

  if (invokeCallback) {
    callback(traverseContext, children, // If it's the only child, treat the name as if it was wrapped in an array
    // so that it's consistent if the number of children grows.
    nameSoFar === '' ? SEPARATOR + getComponentKey(children, 0) : nameSoFar);
    return 1;
  }

  var child;
  var nextName;
  var subtreeCount = 0; // Count of children found in the current subtree.

  var nextNamePrefix = nameSoFar === '' ? SEPARATOR : nameSoFar + SUBSEPARATOR;

  if (Array.isArray(children)) {
    for (var i = 0; i < children.length; i++) {
      child = children[i];
      nextName = nextNamePrefix + getComponentKey(child, i);
      subtreeCount += traverseAllChildrenImpl(child, nextName, callback, traverseContext);
    }
  } else {
    var iteratorFn = getIteratorFn(children);

    if (typeof iteratorFn === 'function') {
      {
        // Warn about using Maps as children
        if (iteratorFn === children.entries) {
          !didWarnAboutMaps ? warning$1(false, 'Using Maps as children is unsupported and will likely yield ' + 'unexpected results. Convert it to a sequence/iterable of keyed ' + 'ReactElements instead.') : void 0;
          didWarnAboutMaps = true;
        }
      }

      var iterator = iteratorFn.call(children);
      var step;
      var ii = 0;

      while (!(step = iterator.next()).done) {
        child = step.value;
        nextName = nextNamePrefix + getComponentKey(child, ii++);
        subtreeCount += traverseAllChildrenImpl(child, nextName, callback, traverseContext);
      }
    } else if (type === 'object') {
      var addendum = '';

      {
        addendum = ' If you meant to render a collection of children, use an array ' + 'instead.' + ReactDebugCurrentFrame.getStackAddendum();
      }

      var childrenString = '' + children;

      {
        {
          throw Error("Objects are not valid as a React child (found: " + (childrenString === '[object Object]' ? 'object with keys {' + Object.keys(children).join(', ') + '}' : childrenString) + ")." + addendum);
        }
      }
    }
  }

  return subtreeCount;
}
/**
 * Traverses children that are typically specified as `props.children`, but
 * might also be specified through attributes:
 *
 * - `traverseAllChildren(this.props.children, ...)`
 * - `traverseAllChildren(this.props.leftPanelChildren, ...)`
 *
 * The `traverseContext` is an optional argument that is passed through the
 * entire traversal. It can be used to store accumulations or anything else that
 * the callback might find relevant.
 *
 * @param {?*} children Children tree object.
 * @param {!function} callback To invoke upon traversing each child.
 * @param {?*} traverseContext Context for traversal.
 * @return {!number} The number of children in this subtree.
 */


function traverseAllChildren(children, callback, traverseContext) {
  if (children == null) {
    return 0;
  }

  return traverseAllChildrenImpl(children, '', callback, traverseContext);
}
/**
 * Generate a key string that identifies a component within a set.
 *
 * @param {*} component A component that could contain a manual key.
 * @param {number} index Index that is used if a manual key is not provided.
 * @return {string}
 */


function getComponentKey(component, index) {
  // Do some typechecking here since we call this blindly. We want to ensure
  // that we don't block potential future ES APIs.
  if (typeof component === 'object' && component !== null && component.key != null) {
    // Explicit key
    return escape(component.key);
  } // Implicit key determined by the index in the set


  return index.toString(36);
}

function forEachSingleChild(bookKeeping, child, name) {
  var func = bookKeeping.func,
      context = bookKeeping.context;
  func.call(context, child, bookKeeping.count++);
}
/**
 * Iterates through children that are typically specified as `props.children`.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrenforeach
 *
 * The provided forEachFunc(child, index) will be called for each
 * leaf child.
 *
 * @param {?*} children Children tree container.
 * @param {function(*, int)} forEachFunc
 * @param {*} forEachContext Context for forEachContext.
 */


function forEachChildren(children, forEachFunc, forEachContext) {
  if (children == null) {
    return children;
  }

  var traverseContext = getPooledTraverseContext(null, null, forEachFunc, forEachContext);
  traverseAllChildren(children, forEachSingleChild, traverseContext);
  releaseTraverseContext(traverseContext);
}

function mapSingleChildIntoContext(bookKeeping, child, childKey) {
  var result = bookKeeping.result,
      keyPrefix = bookKeeping.keyPrefix,
      func = bookKeeping.func,
      context = bookKeeping.context;
  var mappedChild = func.call(context, child, bookKeeping.count++);

  if (Array.isArray(mappedChild)) {
    mapIntoWithKeyPrefixInternal(mappedChild, result, childKey, function (c) {
      return c;
    });
  } else if (mappedChild != null) {
    if (isValidElement(mappedChild)) {
      mappedChild = cloneAndReplaceKey(mappedChild, // Keep both the (mapped) and old keys if they differ, just as
      // traverseAllChildren used to do for objects as children
      keyPrefix + (mappedChild.key && (!child || child.key !== mappedChild.key) ? escapeUserProvidedKey(mappedChild.key) + '/' : '') + childKey);
    }

    result.push(mappedChild);
  }
}

function mapIntoWithKeyPrefixInternal(children, array, prefix, func, context) {
  var escapedPrefix = '';

  if (prefix != null) {
    escapedPrefix = escapeUserProvidedKey(prefix) + '/';
  }

  var traverseContext = getPooledTraverseContext(array, escapedPrefix, func, context);
  traverseAllChildren(children, mapSingleChildIntoContext, traverseContext);
  releaseTraverseContext(traverseContext);
}
/**
 * Maps children that are typically specified as `props.children`.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrenmap
 *
 * The provided mapFunction(child, key, index) will be called for each
 * leaf child.
 *
 * @param {?*} children Children tree container.
 * @param {function(*, int)} func The map function.
 * @param {*} context Context for mapFunction.
 * @return {object} Object containing the ordered map of results.
 */


function mapChildren(children, func, context) {
  if (children == null) {
    return children;
  }

  var result = [];
  mapIntoWithKeyPrefixInternal(children, result, null, func, context);
  return result;
}
/**
 * Count the number of children that are typically specified as
 * `props.children`.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrencount
 *
 * @param {?*} children Children tree container.
 * @return {number} The number of children.
 */


function countChildren(children) {
  return traverseAllChildren(children, function () {
    return null;
  }, null);
}
/**
 * Flatten a children object (typically specified as `props.children`) and
 * return an array with appropriately re-keyed children.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrentoarray
 */


function toArray(children) {
  var result = [];
  mapIntoWithKeyPrefixInternal(children, result, null, function (child) {
    return child;
  });
  return result;
}
/**
 * Returns the first child in a collection of children and verifies that there
 * is only one child in the collection.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrenonly
 *
 * The current implementation of this function assumes that a single child gets
 * passed without a wrapper, but the purpose of this helper function is to
 * abstract away the particular structure of children.
 *
 * @param {?object} children Child collection structure.
 * @return {ReactElement} The first and only `ReactElement` contained in the
 * structure.
 */


function onlyChild(children) {
  if (!isValidElement(children)) {
    {
      throw Error("React.Children.only expected to receive a single React element child.");
    }
  }

  return children;
}

function createContext(defaultValue, calculateChangedBits) {
  if (calculateChangedBits === undefined) {
    calculateChangedBits = null;
  } else {
    {
      !(calculateChangedBits === null || typeof calculateChangedBits === 'function') ? warningWithoutStack$1(false, 'createContext: Expected the optional second argument to be a ' + 'function. Instead received: %s', calculateChangedBits) : void 0;
    }
  }

  var context = {
    $$typeof: REACT_CONTEXT_TYPE,
    _calculateChangedBits: calculateChangedBits,
    // As a workaround to support multiple concurrent renderers, we categorize
    // some renderers as primary and others as secondary. We only expect
    // there to be two concurrent renderers at most: React Native (primary) and
    // Fabric (secondary); React DOM (primary) and React ART (secondary).
    // Secondary renderers store their context values on separate fields.
    _currentValue: defaultValue,
    _currentValue2: defaultValue,
    // Used to track how many concurrent renderers this context currently
    // supports within in a single renderer. Such as parallel server rendering.
    _threadCount: 0,
    // These are circular
    Provider: null,
    Consumer: null
  };
  context.Provider = {
    $$typeof: REACT_PROVIDER_TYPE,
    _context: context
  };
  var hasWarnedAboutUsingNestedContextConsumers = false;
  var hasWarnedAboutUsingConsumerProvider = false;

  {
    // A separate object, but proxies back to the original context object for
    // backwards compatibility. It has a different $$typeof, so we can properly
    // warn for the incorrect usage of Context as a Consumer.
    var Consumer = {
      $$typeof: REACT_CONTEXT_TYPE,
      _context: context,
      _calculateChangedBits: context._calculateChangedBits
    }; // $FlowFixMe: Flow complains about not setting a value, which is intentional here

    Object.defineProperties(Consumer, {
      Provider: {
        get: function () {
          if (!hasWarnedAboutUsingConsumerProvider) {
            hasWarnedAboutUsingConsumerProvider = true;
            warning$1(false, 'Rendering <Context.Consumer.Provider> is not supported and will be removed in ' + 'a future major release. Did you mean to render <Context.Provider> instead?');
          }

          return context.Provider;
        },
        set: function (_Provider) {
          context.Provider = _Provider;
        }
      },
      _currentValue: {
        get: function () {
          return context._currentValue;
        },
        set: function (_currentValue) {
          context._currentValue = _currentValue;
        }
      },
      _currentValue2: {
        get: function () {
          return context._currentValue2;
        },
        set: function (_currentValue2) {
          context._currentValue2 = _currentValue2;
        }
      },
      _threadCount: {
        get: function () {
          return context._threadCount;
        },
        set: function (_threadCount) {
          context._threadCount = _threadCount;
        }
      },
      Consumer: {
        get: function () {
          if (!hasWarnedAboutUsingNestedContextConsumers) {
            hasWarnedAboutUsingNestedContextConsumers = true;
            warning$1(false, 'Rendering <Context.Consumer.Consumer> is not supported and will be removed in ' + 'a future major release. Did you mean to render <Context.Consumer> instead?');
          }

          return context.Consumer;
        }
      }
    }); // $FlowFixMe: Flow complains about missing properties because it doesn't understand defineProperty

    context.Consumer = Consumer;
  }

  {
    context._currentRenderer = null;
    context._currentRenderer2 = null;
  }

  return context;
}

function lazy(ctor) {
  var lazyType = {
    $$typeof: REACT_LAZY_TYPE,
    _ctor: ctor,
    // React uses these fields to store the result.
    _status: -1,
    _result: null
  };

  {
    // In production, this would just set it on the object.
    var defaultProps;
    var propTypes;
    Object.defineProperties(lazyType, {
      defaultProps: {
        configurable: true,
        get: function () {
          return defaultProps;
        },
        set: function (newDefaultProps) {
          warning$1(false, 'React.lazy(...): It is not supported to assign `defaultProps` to ' + 'a lazy component import. Either specify them where the component ' + 'is defined, or create a wrapping component around it.');
          defaultProps = newDefaultProps; // Match production behavior more closely:

          Object.defineProperty(lazyType, 'defaultProps', {
            enumerable: true
          });
        }
      },
      propTypes: {
        configurable: true,
        get: function () {
          return propTypes;
        },
        set: function (newPropTypes) {
          warning$1(false, 'React.lazy(...): It is not supported to assign `propTypes` to ' + 'a lazy component import. Either specify them where the component ' + 'is defined, or create a wrapping component around it.');
          propTypes = newPropTypes; // Match production behavior more closely:

          Object.defineProperty(lazyType, 'propTypes', {
            enumerable: true
          });
        }
      }
    });
  }

  return lazyType;
}

function forwardRef(render) {
  {
    if (render != null && render.$$typeof === REACT_MEMO_TYPE) {
      warningWithoutStack$1(false, 'forwardRef requires a render function but received a `memo` ' + 'component. Instead of forwardRef(memo(...)), use ' + 'memo(forwardRef(...)).');
    } else if (typeof render !== 'function') {
      warningWithoutStack$1(false, 'forwardRef requires a render function but was given %s.', render === null ? 'null' : typeof render);
    } else {
      !( // Do not warn for 0 arguments because it could be due to usage of the 'arguments' object
      render.length === 0 || render.length === 2) ? warningWithoutStack$1(false, 'forwardRef render functions accept exactly two parameters: props and ref. %s', render.length === 1 ? 'Did you forget to use the ref parameter?' : 'Any additional parameter will be undefined.') : void 0;
    }

    if (render != null) {
      !(render.defaultProps == null && render.propTypes == null) ? warningWithoutStack$1(false, 'forwardRef render functions do not support propTypes or defaultProps. ' + 'Did you accidentally pass a React component?') : void 0;
    }
  }

  return {
    $$typeof: REACT_FORWARD_REF_TYPE,
    render: render
  };
}

function isValidElementType(type) {
  return typeof type === 'string' || typeof type === 'function' || // Note: its typeof might be other than 'symbol' or 'number' if it's a polyfill.
  type === REACT_FRAGMENT_TYPE || type === REACT_CONCURRENT_MODE_TYPE || type === REACT_PROFILER_TYPE || type === REACT_STRICT_MODE_TYPE || type === REACT_SUSPENSE_TYPE || type === REACT_SUSPENSE_LIST_TYPE || typeof type === 'object' && type !== null && (type.$$typeof === REACT_LAZY_TYPE || type.$$typeof === REACT_MEMO_TYPE || type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE || type.$$typeof === REACT_FUNDAMENTAL_TYPE || type.$$typeof === REACT_RESPONDER_TYPE || type.$$typeof === REACT_SCOPE_TYPE);
}

function memo(type, compare) {
  {
    if (!isValidElementType(type)) {
      warningWithoutStack$1(false, 'memo: The first argument must be a component. Instead ' + 'received: %s', type === null ? 'null' : typeof type);
    }
  }

  return {
    $$typeof: REACT_MEMO_TYPE,
    type: type,
    compare: compare === undefined ? null : compare
  };
}

function resolveDispatcher() {
  var dispatcher = ReactCurrentDispatcher.current;

  if (!(dispatcher !== null)) {
    {
      throw Error("Invalid hook call. Hooks can only be called inside of the body of a function component. This could happen for one of the following reasons:\n1. You might have mismatching versions of React and the renderer (such as React DOM)\n2. You might be breaking the Rules of Hooks\n3. You might have more than one copy of React in the same app\nSee https://fb.me/react-invalid-hook-call for tips about how to debug and fix this problem.");
    }
  }

  return dispatcher;
}

function useContext(Context, unstable_observedBits) {
  var dispatcher = resolveDispatcher();

  {
    !(unstable_observedBits === undefined) ? warning$1(false, 'useContext() second argument is reserved for future ' + 'use in React. Passing it is not supported. ' + 'You passed: %s.%s', unstable_observedBits, typeof unstable_observedBits === 'number' && Array.isArray(arguments[2]) ? '\n\nDid you call array.map(useContext)? ' + 'Calling Hooks inside a loop is not supported. ' + 'Learn more at https://fb.me/rules-of-hooks' : '') : void 0; // TODO: add a more generic warning for invalid values.

    if (Context._context !== undefined) {
      var realContext = Context._context; // Don't deduplicate because this legitimately causes bugs
      // and nobody should be using this in existing code.

      if (realContext.Consumer === Context) {
        warning$1(false, 'Calling useContext(Context.Consumer) is not supported, may cause bugs, and will be ' + 'removed in a future major release. Did you mean to call useContext(Context) instead?');
      } else if (realContext.Provider === Context) {
        warning$1(false, 'Calling useContext(Context.Provider) is not supported. ' + 'Did you mean to call useContext(Context) instead?');
      }
    }
  }

  return dispatcher.useContext(Context, unstable_observedBits);
}
function useState(initialState) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useState(initialState);
}
function useReducer(reducer, initialArg, init) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useReducer(reducer, initialArg, init);
}
function useRef(initialValue) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useRef(initialValue);
}
function useEffect(create, inputs) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useEffect(create, inputs);
}
function useLayoutEffect(create, inputs) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useLayoutEffect(create, inputs);
}
function useCallback(callback, inputs) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useCallback(callback, inputs);
}
function useMemo(create, inputs) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useMemo(create, inputs);
}
function useImperativeHandle(ref, create, inputs) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useImperativeHandle(ref, create, inputs);
}
function useDebugValue(value, formatterFn) {
  {
    var dispatcher = resolveDispatcher();
    return dispatcher.useDebugValue(value, formatterFn);
  }
}
var emptyObject$1 = {};
function useResponder(responder, listenerProps) {
  var dispatcher = resolveDispatcher();

  {
    if (responder == null || responder.$$typeof !== REACT_RESPONDER_TYPE) {
      warning$1(false, 'useResponder: invalid first argument. Expected an event responder, but instead got %s', responder);
      return;
    }
  }

  return dispatcher.useResponder(responder, listenerProps || emptyObject$1);
}
function useTransition(config) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useTransition(config);
}
function useDeferredValue(value, config) {
  var dispatcher = resolveDispatcher();
  return dispatcher.useDeferredValue(value, config);
}

function withSuspenseConfig(scope, config) {
  var previousConfig = ReactCurrentBatchConfig.suspense;
  ReactCurrentBatchConfig.suspense = config === undefined ? null : config;

  try {
    scope();
  } finally {
    ReactCurrentBatchConfig.suspense = previousConfig;
  }
}

/**
 * ReactElementValidator provides a wrapper around a element factory
 * which validates the props passed to the element. This is intended to be
 * used only in DEV and could be replaced by a static type checker for languages
 * that support it.
 */
var propTypesMisspellWarningShown;

{
  propTypesMisspellWarningShown = false;
}

var hasOwnProperty$1 = Object.prototype.hasOwnProperty;

function getDeclarationErrorAddendum() {
  if (ReactCurrentOwner.current) {
    var name = getComponentName(ReactCurrentOwner.current.type);

    if (name) {
      return '\n\nCheck the render method of `' + name + '`.';
    }
  }

  return '';
}

function getSourceInfoErrorAddendum(source) {
  if (source !== undefined) {
    var fileName = source.fileName.replace(/^.*[\\\/]/, '');
    var lineNumber = source.lineNumber;
    return '\n\nCheck your code at ' + fileName + ':' + lineNumber + '.';
  }

  return '';
}

function getSourceInfoErrorAddendumForProps(elementProps) {
  if (elementProps !== null && elementProps !== undefined) {
    return getSourceInfoErrorAddendum(elementProps.__source);
  }

  return '';
}
/**
 * Warn if there's no key explicitly set on dynamic arrays of children or
 * object keys are not valid. This allows us to keep track of children between
 * updates.
 */


var ownerHasKeyUseWarning = {};

function getCurrentComponentErrorInfo(parentType) {
  var info = getDeclarationErrorAddendum();

  if (!info) {
    var parentName = typeof parentType === 'string' ? parentType : parentType.displayName || parentType.name;

    if (parentName) {
      info = "\n\nCheck the top-level render call using <" + parentName + ">.";
    }
  }

  return info;
}
/**
 * Warn if the element doesn't have an explicit key assigned to it.
 * This element is in an array. The array could grow and shrink or be
 * reordered. All children that haven't already been validated are required to
 * have a "key" property assigned to it. Error statuses are cached so a warning
 * will only be shown once.
 *
 * @internal
 * @param {ReactElement} element Element that requires a key.
 * @param {*} parentType element's parent's type.
 */


function validateExplicitKey(element, parentType) {
  if (!element._store || element._store.validated || element.key != null) {
    return;
  }

  element._store.validated = true;
  var currentComponentErrorInfo = getCurrentComponentErrorInfo(parentType);

  if (ownerHasKeyUseWarning[currentComponentErrorInfo]) {
    return;
  }

  ownerHasKeyUseWarning[currentComponentErrorInfo] = true; // Usually the current owner is the offender, but if it accepts children as a
  // property, it may be the creator of the child that's responsible for
  // assigning it a key.

  var childOwner = '';

  if (element && element._owner && element._owner !== ReactCurrentOwner.current) {
    // Give the component that originally created this child.
    childOwner = " It was passed a child from " + getComponentName(element._owner.type) + ".";
  }

  setCurrentlyValidatingElement(element);

  {
    warning$1(false, 'Each child in a list should have a unique "key" prop.' + '%s%s See https://fb.me/react-warning-keys for more information.', currentComponentErrorInfo, childOwner);
  }

  setCurrentlyValidatingElement(null);
}
/**
 * Ensure that every element either is passed in a static location, in an
 * array with an explicit keys property defined, or in an object literal
 * with valid key property.
 *
 * @internal
 * @param {ReactNode} node Statically passed child of any type.
 * @param {*} parentType node's parent's type.
 */


function validateChildKeys(node, parentType) {
  if (typeof node !== 'object') {
    return;
  }

  if (Array.isArray(node)) {
    for (var i = 0; i < node.length; i++) {
      var child = node[i];

      if (isValidElement(child)) {
        validateExplicitKey(child, parentType);
      }
    }
  } else if (isValidElement(node)) {
    // This element was passed in a valid location.
    if (node._store) {
      node._store.validated = true;
    }
  } else if (node) {
    var iteratorFn = getIteratorFn(node);

    if (typeof iteratorFn === 'function') {
      // Entry iterators used to provide implicit keys,
      // but now we print a separate warning for them later.
      if (iteratorFn !== node.entries) {
        var iterator = iteratorFn.call(node);
        var step;

        while (!(step = iterator.next()).done) {
          if (isValidElement(step.value)) {
            validateExplicitKey(step.value, parentType);
          }
        }
      }
    }
  }
}
/**
 * Given an element, validate that its props follow the propTypes definition,
 * provided by the type.
 *
 * @param {ReactElement} element
 */


function validatePropTypes(element) {
  var type = element.type;

  if (type === null || type === undefined || typeof type === 'string') {
    return;
  }

  var name = getComponentName(type);
  var propTypes;

  if (typeof type === 'function') {
    propTypes = type.propTypes;
  } else if (typeof type === 'object' && (type.$$typeof === REACT_FORWARD_REF_TYPE || // Note: Memo only checks outer props here.
  // Inner props are checked in the reconciler.
  type.$$typeof === REACT_MEMO_TYPE)) {
    propTypes = type.propTypes;
  } else {
    return;
  }

  if (propTypes) {
    setCurrentlyValidatingElement(element);
    checkPropTypes(propTypes, element.props, 'prop', name, ReactDebugCurrentFrame.getStackAddendum);
    setCurrentlyValidatingElement(null);
  } else if (type.PropTypes !== undefined && !propTypesMisspellWarningShown) {
    propTypesMisspellWarningShown = true;
    warningWithoutStack$1(false, 'Component %s declared `PropTypes` instead of `propTypes`. Did you misspell the property assignment?', name || 'Unknown');
  }

  if (typeof type.getDefaultProps === 'function') {
    !type.getDefaultProps.isReactClassApproved ? warningWithoutStack$1(false, 'getDefaultProps is only used on classic React.createClass ' + 'definitions. Use a static property named `defaultProps` instead.') : void 0;
  }
}
/**
 * Given a fragment, validate that it can only be provided with fragment props
 * @param {ReactElement} fragment
 */


function validateFragmentProps(fragment) {
  setCurrentlyValidatingElement(fragment);
  var keys = Object.keys(fragment.props);

  for (var i = 0; i < keys.length; i++) {
    var key = keys[i];

    if (key !== 'children' && key !== 'key') {
      warning$1(false, 'Invalid prop `%s` supplied to `React.Fragment`. ' + 'React.Fragment can only have `key` and `children` props.', key);
      break;
    }
  }

  if (fragment.ref !== null) {
    warning$1(false, 'Invalid attribute `ref` supplied to `React.Fragment`.');
  }

  setCurrentlyValidatingElement(null);
}

function jsxWithValidation(type, props, key, isStaticChildren, source, self) {
  var validType = isValidElementType(type); // We warn in this case but don't throw. We expect the element creation to
  // succeed and there will likely be errors in render.

  if (!validType) {
    var info = '';

    if (type === undefined || typeof type === 'object' && type !== null && Object.keys(type).length === 0) {
      info += ' You likely forgot to export your component from the file ' + "it's defined in, or you might have mixed up default and named imports.";
    }

    var sourceInfo = getSourceInfoErrorAddendum(source);

    if (sourceInfo) {
      info += sourceInfo;
    } else {
      info += getDeclarationErrorAddendum();
    }

    var typeString;

    if (type === null) {
      typeString = 'null';
    } else if (Array.isArray(type)) {
      typeString = 'array';
    } else if (type !== undefined && type.$$typeof === REACT_ELEMENT_TYPE) {
      typeString = "<" + (getComponentName(type.type) || 'Unknown') + " />";
      info = ' Did you accidentally export a JSX literal instead of a component?';
    } else {
      typeString = typeof type;
    }

    warning$1(false, 'React.jsx: type is invalid -- expected a string (for ' + 'built-in components) or a class/function (for composite ' + 'components) but got: %s.%s', typeString, info);
  }

  var element = jsxDEV(type, props, key, source, self); // The result can be nullish if a mock or a custom function is used.
  // TODO: Drop this when these are no longer allowed as the type argument.

  if (element == null) {
    return element;
  } // Skip key warning if the type isn't valid since our key validation logic
  // doesn't expect a non-string/function type and can throw confusing errors.
  // We don't want exception behavior to differ between dev and prod.
  // (Rendering will throw with a helpful message and as soon as the type is
  // fixed, the key warnings will appear.)


  if (validType) {
    var children = props.children;

    if (children !== undefined) {
      if (isStaticChildren) {
        if (Array.isArray(children)) {
          for (var i = 0; i < children.length; i++) {
            validateChildKeys(children[i], type);
          }

          if (Object.freeze) {
            Object.freeze(children);
          }
        } else {
          warning$1(false, 'React.jsx: Static children should always be an array. ' + 'You are likely explicitly calling React.jsxs or React.jsxDEV. ' + 'Use the Babel transform instead.');
        }
      } else {
        validateChildKeys(children, type);
      }
    }
  }

  if (hasOwnProperty$1.call(props, 'key')) {
    warning$1(false, 'React.jsx: Spreading a key to JSX is a deprecated pattern. ' + 'Explicitly pass a key after spreading props in your JSX call. ' + 'E.g. <ComponentName {...props} key={key} />');
  }

  if (type === REACT_FRAGMENT_TYPE) {
    validateFragmentProps(element);
  } else {
    validatePropTypes(element);
  }

  return element;
} // These two functions exist to still get child warnings in dev
// even with the prod transform. This means that jsxDEV is purely
// opt-in behavior for better messages but that we won't stop
// giving you warnings if you use production apis.

function jsxWithValidationStatic(type, props, key) {
  return jsxWithValidation(type, props, key, true);
}
function jsxWithValidationDynamic(type, props, key) {
  return jsxWithValidation(type, props, key, false);
}
function createElementWithValidation(type, props, children) {
  var validType = isValidElementType(type); // We warn in this case but don't throw. We expect the element creation to
  // succeed and there will likely be errors in render.

  if (!validType) {
    var info = '';

    if (type === undefined || typeof type === 'object' && type !== null && Object.keys(type).length === 0) {
      info += ' You likely forgot to export your component from the file ' + "it's defined in, or you might have mixed up default and named imports.";
    }

    var sourceInfo = getSourceInfoErrorAddendumForProps(props);

    if (sourceInfo) {
      info += sourceInfo;
    } else {
      info += getDeclarationErrorAddendum();
    }

    var typeString;

    if (type === null) {
      typeString = 'null';
    } else if (Array.isArray(type)) {
      typeString = 'array';
    } else if (type !== undefined && type.$$typeof === REACT_ELEMENT_TYPE) {
      typeString = "<" + (getComponentName(type.type) || 'Unknown') + " />";
      info = ' Did you accidentally export a JSX literal instead of a component?';
    } else {
      typeString = typeof type;
    }

    warning$1(false, 'React.createElement: type is invalid -- expected a string (for ' + 'built-in components) or a class/function (for composite ' + 'components) but got: %s.%s', typeString, info);
  }

  var element = createElement.apply(this, arguments); // The result can be nullish if a mock or a custom function is used.
  // TODO: Drop this when these are no longer allowed as the type argument.

  if (element == null) {
    return element;
  } // Skip key warning if the type isn't valid since our key validation logic
  // doesn't expect a non-string/function type and can throw confusing errors.
  // We don't want exception behavior to differ between dev and prod.
  // (Rendering will throw with a helpful message and as soon as the type is
  // fixed, the key warnings will appear.)


  if (validType) {
    for (var i = 2; i < arguments.length; i++) {
      validateChildKeys(arguments[i], type);
    }
  }

  if (type === REACT_FRAGMENT_TYPE) {
    validateFragmentProps(element);
  } else {
    validatePropTypes(element);
  }

  return element;
}
function createFactoryWithValidation(type) {
  var validatedFactory = createElementWithValidation.bind(null, type);
  validatedFactory.type = type; // Legacy hook: remove it

  {
    Object.defineProperty(validatedFactory, 'type', {
      enumerable: false,
      get: function () {
        lowPriorityWarningWithoutStack$1(false, 'Factory.type is deprecated. Access the class directly ' + 'before passing it to createFactory.');
        Object.defineProperty(this, 'type', {
          value: type
        });
        return type;
      }
    });
  }

  return validatedFactory;
}
function cloneElementWithValidation(element, props, children) {
  var newElement = cloneElement.apply(this, arguments);

  for (var i = 2; i < arguments.length; i++) {
    validateChildKeys(arguments[i], newElement.type);
  }

  validatePropTypes(newElement);
  return newElement;
}

var hasBadMapPolyfill;

{
  hasBadMapPolyfill = false;

  try {
    var frozenObject = Object.freeze({});
    var testMap = new Map([[frozenObject, null]]);
    var testSet = new Set([frozenObject]); // This is necessary for Rollup to not consider these unused.
    // https://github.com/rollup/rollup/issues/1771
    // TODO: we can remove these if Rollup fixes the bug.

    testMap.set(0, 0);
    testSet.add(0);
  } catch (e) {
    // TODO: Consider warning about bad polyfills
    hasBadMapPolyfill = true;
  }
}

function createFundamentalComponent(impl) {
  // We use responder as a Map key later on. When we have a bad
  // polyfill, then we can't use it as a key as the polyfill tries
  // to add a property to the object.
  if ( true && !hasBadMapPolyfill) {
    Object.freeze(impl);
  }

  var fundamantalComponent = {
    $$typeof: REACT_FUNDAMENTAL_TYPE,
    impl: impl
  };

  {
    Object.freeze(fundamantalComponent);
  }

  return fundamantalComponent;
}

function createEventResponder(displayName, responderConfig) {
  var getInitialState = responderConfig.getInitialState,
      onEvent = responderConfig.onEvent,
      onMount = responderConfig.onMount,
      onUnmount = responderConfig.onUnmount,
      onRootEvent = responderConfig.onRootEvent,
      rootEventTypes = responderConfig.rootEventTypes,
      targetEventTypes = responderConfig.targetEventTypes,
      targetPortalPropagation = responderConfig.targetPortalPropagation;
  var eventResponder = {
    $$typeof: REACT_RESPONDER_TYPE,
    displayName: displayName,
    getInitialState: getInitialState || null,
    onEvent: onEvent || null,
    onMount: onMount || null,
    onRootEvent: onRootEvent || null,
    onUnmount: onUnmount || null,
    rootEventTypes: rootEventTypes || null,
    targetEventTypes: targetEventTypes || null,
    targetPortalPropagation: targetPortalPropagation || false
  }; // We use responder as a Map key later on. When we have a bad
  // polyfill, then we can't use it as a key as the polyfill tries
  // to add a property to the object.

  if ( true && !hasBadMapPolyfill) {
    Object.freeze(eventResponder);
  }

  return eventResponder;
}

function createScope() {
  var scopeComponent = {
    $$typeof: REACT_SCOPE_TYPE
  };

  {
    Object.freeze(scopeComponent);
  }

  return scopeComponent;
}

// Helps identify side effects in render-phase lifecycle hooks and setState
// reducers by double invoking them in Strict Mode.

 // To preserve the "Pause on caught exceptions" behavior of the debugger, we
// replay the begin phase of a failed component inside invokeGuardedCallback.

 // Warn about deprecated, async-unsafe lifecycles; relates to RFC #6:

 // Gather advanced timing metrics for Profiler subtrees.

 // Trace which interactions trigger each commit.

 // SSR experiments


 // Only used in www builds.

 // Only used in www builds.

 // Disable javascript: URL strings in href for XSS protection.

 // React Fire: prevent the value and checked attributes from syncing
// with their related DOM properties

 // These APIs will no longer be "unstable" in the upcoming 16.7 release,
// Control this behavior with a flag to support 16.6 minor releases in the meanwhile.

var exposeConcurrentModeAPIs = false;
 // Experimental React Flare event system and event components support.

var enableFlareAPI = false; // Experimental Host Component support.

var enableFundamentalAPI = false; // Experimental Scope support.

var enableScopeAPI = false; // New API for JSX transforms to target - https://github.com/reactjs/rfcs/pull/107

var enableJSXTransformAPI = false; // We will enforce mocking scheduler with scheduler/unstable_mock at some point. (v17?)
// Till then, we warn about the missing mock, but still fallback to a legacy mode compatible version

 // For tests, we flush suspense fallbacks in an act scope;
// *except* in some of our own tests, where we test incremental loading states.

 // Add a callback property to suspense to notify which promises are currently
// in the update queue. This allows reporting and tracing of what is causing
// the user to see a loading state.
// Also allows hydration callbacks to fire when a dehydrated boundary gets
// hydrated or deleted.

 // Part of the simplification of React.createElement so we can eventually move
// from React.createElement to React.jsx
// https://github.com/reactjs/rfcs/blob/createlement-rfc/text/0000-create-element-changes.md





 // Flag to turn event.target and event.currentTarget in ReactNative from a reactTag to a component instance

var React = {
  Children: {
    map: mapChildren,
    forEach: forEachChildren,
    count: countChildren,
    toArray: toArray,
    only: onlyChild
  },
  createRef: createRef,
  Component: Component,
  PureComponent: PureComponent,
  createContext: createContext,
  forwardRef: forwardRef,
  lazy: lazy,
  memo: memo,
  useCallback: useCallback,
  useContext: useContext,
  useEffect: useEffect,
  useImperativeHandle: useImperativeHandle,
  useDebugValue: useDebugValue,
  useLayoutEffect: useLayoutEffect,
  useMemo: useMemo,
  useReducer: useReducer,
  useRef: useRef,
  useState: useState,
  Fragment: REACT_FRAGMENT_TYPE,
  Profiler: REACT_PROFILER_TYPE,
  StrictMode: REACT_STRICT_MODE_TYPE,
  Suspense: REACT_SUSPENSE_TYPE,
  createElement: createElementWithValidation,
  cloneElement: cloneElementWithValidation,
  createFactory: createFactoryWithValidation,
  isValidElement: isValidElement,
  version: ReactVersion,
  __SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED: ReactSharedInternals
};

if (exposeConcurrentModeAPIs) {
  React.useTransition = useTransition;
  React.useDeferredValue = useDeferredValue;
  React.SuspenseList = REACT_SUSPENSE_LIST_TYPE;
  React.unstable_withSuspenseConfig = withSuspenseConfig;
}

if (enableFlareAPI) {
  React.unstable_useResponder = useResponder;
  React.unstable_createResponder = createEventResponder;
}

if (enableFundamentalAPI) {
  React.unstable_createFundamental = createFundamentalComponent;
}

if (enableScopeAPI) {
  React.unstable_createScope = createScope;
} // Note: some APIs are added with feature flags.
// Make sure that stable builds for open source
// don't modify the React object to avoid deopts.
// Also let's not expose their names in stable builds.


if (enableJSXTransformAPI) {
  {
    React.jsxDEV = jsxWithValidation;
    React.jsx = jsxWithValidationDynamic;
    React.jsxs = jsxWithValidationStatic;
  }
}



var React$2 = Object.freeze({
	default: React
});

var React$3 = ( React$2 && React ) || React$2;

// TODO: decide on the top-level export form.
// This is hacky but makes it work with both Rollup and Jest.


var react = React$3.default || React$3;

module.exports = react;
  })();
}


/***/ }),

/***/ "./node_modules/react/index.js":
/*!*************************************!*\
  !*** ./node_modules/react/index.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


if (false) {} else {
  module.exports = __webpack_require__(/*! ./cjs/react.development.js */ "./node_modules/react/cjs/react.development.js");
}


/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var isOldIE = function isOldIE() {
  var memo;
  return function memorize() {
    if (typeof memo === 'undefined') {
      // Test for IE <= 9 as proposed by Browserhacks
      // @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
      // Tests for existence of standard globals is to allow style-loader
      // to operate correctly into non-standard environments
      // @see https://github.com/webpack-contrib/style-loader/issues/177
      memo = Boolean(window && document && document.all && !window.atob);
    }

    return memo;
  };
}();

var getTarget = function getTarget() {
  var memo = {};
  return function memorize(target) {
    if (typeof memo[target] === 'undefined') {
      var styleTarget = document.querySelector(target); // Special case to return head of iframe instead of iframe itself

      if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
        try {
          // This will throw an exception if access to iframe is blocked
          // due to cross-origin restrictions
          styleTarget = styleTarget.contentDocument.head;
        } catch (e) {
          // istanbul ignore next
          styleTarget = null;
        }
      }

      memo[target] = styleTarget;
    }

    return memo[target];
  };
}();

var stylesInDom = [];

function getIndexByIdentifier(identifier) {
  var result = -1;

  for (var i = 0; i < stylesInDom.length; i++) {
    if (stylesInDom[i].identifier === identifier) {
      result = i;
      break;
    }
  }

  return result;
}

function modulesToDom(list, options) {
  var idCountMap = {};
  var identifiers = [];

  for (var i = 0; i < list.length; i++) {
    var item = list[i];
    var id = options.base ? item[0] + options.base : item[0];
    var count = idCountMap[id] || 0;
    var identifier = "".concat(id, " ").concat(count);
    idCountMap[id] = count + 1;
    var index = getIndexByIdentifier(identifier);
    var obj = {
      css: item[1],
      media: item[2],
      sourceMap: item[3]
    };

    if (index !== -1) {
      stylesInDom[index].references++;
      stylesInDom[index].updater(obj);
    } else {
      stylesInDom.push({
        identifier: identifier,
        updater: addStyle(obj, options),
        references: 1
      });
    }

    identifiers.push(identifier);
  }

  return identifiers;
}

function insertStyleElement(options) {
  var style = document.createElement('style');
  var attributes = options.attributes || {};

  if (typeof attributes.nonce === 'undefined') {
    var nonce =  true ? __webpack_require__.nc : undefined;

    if (nonce) {
      attributes.nonce = nonce;
    }
  }

  Object.keys(attributes).forEach(function (key) {
    style.setAttribute(key, attributes[key]);
  });

  if (typeof options.insert === 'function') {
    options.insert(style);
  } else {
    var target = getTarget(options.insert || 'head');

    if (!target) {
      throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
    }

    target.appendChild(style);
  }

  return style;
}

function removeStyleElement(style) {
  // istanbul ignore if
  if (style.parentNode === null) {
    return false;
  }

  style.parentNode.removeChild(style);
}
/* istanbul ignore next  */


var replaceText = function replaceText() {
  var textStore = [];
  return function replace(index, replacement) {
    textStore[index] = replacement;
    return textStore.filter(Boolean).join('\n');
  };
}();

function applyToSingletonTag(style, index, remove, obj) {
  var css = remove ? '' : obj.media ? "@media ".concat(obj.media, " {").concat(obj.css, "}") : obj.css; // For old IE

  /* istanbul ignore if  */

  if (style.styleSheet) {
    style.styleSheet.cssText = replaceText(index, css);
  } else {
    var cssNode = document.createTextNode(css);
    var childNodes = style.childNodes;

    if (childNodes[index]) {
      style.removeChild(childNodes[index]);
    }

    if (childNodes.length) {
      style.insertBefore(cssNode, childNodes[index]);
    } else {
      style.appendChild(cssNode);
    }
  }
}

function applyToTag(style, options, obj) {
  var css = obj.css;
  var media = obj.media;
  var sourceMap = obj.sourceMap;

  if (media) {
    style.setAttribute('media', media);
  } else {
    style.removeAttribute('media');
  }

  if (sourceMap && btoa) {
    css += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), " */");
  } // For old IE

  /* istanbul ignore if  */


  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    while (style.firstChild) {
      style.removeChild(style.firstChild);
    }

    style.appendChild(document.createTextNode(css));
  }
}

var singleton = null;
var singletonCounter = 0;

function addStyle(obj, options) {
  var style;
  var update;
  var remove;

  if (options.singleton) {
    var styleIndex = singletonCounter++;
    style = singleton || (singleton = insertStyleElement(options));
    update = applyToSingletonTag.bind(null, style, styleIndex, false);
    remove = applyToSingletonTag.bind(null, style, styleIndex, true);
  } else {
    style = insertStyleElement(options);
    update = applyToTag.bind(null, style, options);

    remove = function remove() {
      removeStyleElement(style);
    };
  }

  update(obj);
  return function updateStyle(newObj) {
    if (newObj) {
      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap) {
        return;
      }

      update(obj = newObj);
    } else {
      remove();
    }
  };
}

module.exports = function (list, options) {
  options = options || {}; // Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
  // tags it will allow on a page

  if (!options.singleton && typeof options.singleton !== 'boolean') {
    options.singleton = isOldIE();
  }

  list = list || [];
  var lastIdentifiers = modulesToDom(list, options);
  return function update(newList) {
    newList = newList || [];

    if (Object.prototype.toString.call(newList) !== '[object Array]') {
      return;
    }

    for (var i = 0; i < lastIdentifiers.length; i++) {
      var identifier = lastIdentifiers[i];
      var index = getIndexByIdentifier(identifier);
      stylesInDom[index].references--;
    }

    var newLastIdentifiers = modulesToDom(newList, options);

    for (var _i = 0; _i < lastIdentifiers.length; _i++) {
      var _identifier = lastIdentifiers[_i];

      var _index = getIndexByIdentifier(_identifier);

      if (stylesInDom[_index].references === 0) {
        stylesInDom[_index].updater();

        stylesInDom.splice(_index, 1);
      }
    }

    lastIdentifiers = newLastIdentifiers;
  };
};

/***/ }),

/***/ "./src/assets/js/blocks/accordion/edit-panel.js":
/*!******************************************************!*\
  !*** ./src/assets/js/blocks/accordion/edit-panel.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return DupleSideBox; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * External dependencies
 */
 // import React from 'react';

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    _wp$blockEditor = _wp.blockEditor,
    InspectorControls = _wp$blockEditor.InspectorControls,
    RichText = _wp$blockEditor.RichText,
    InnerBlocks = _wp.blockEditor.InnerBlocks;

var DupleSideBox =
/*#__PURE__*/
function (_Component) {
  _inherits(DupleSideBox, _Component);

  function DupleSideBox() {
    var _this;

    _classCallCheck(this, DupleSideBox);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(DupleSideBox).apply(this, arguments));
    _this.state = {
      isExpanded: false
    };
    _this.collapseExpandRef = React.createRef();
    _this.bodyRef = React.createRef();
    _this.collapseExpand = _this.collapseExpand.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(DupleSideBox, [{
    key: "collapseExpand",
    value: function collapseExpand() {
      // console.log(this.collapseExpandRef)
      // console.log(this.bodyRef)
      this.setState({
        isExpanded: !this.state.isExpanded
      }); // this.bodyRef.current.classList.add('')
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var title = attributes.title,
          icon = attributes.icon,
          active = attributes.active,
          alwaysactive = attributes.alwaysactive,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Accordion Item Settings', 'awesome-blocks')
      }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
        title: __('Icon', 'awesome-blocks'),
        classPlaceholder: __('Insert icon class', 'awesome-blocks'),
        fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
        ,
        value: icon,
        onSelect: function onSelect(v) {
          return setAttributes({
            icon: v
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Always expanded', 'awesome-blocks'),
        checked: !!alwaysactive,
        onChange: function onChange() {
          return setAttributes({
            alwaysactive: !alwaysactive
          });
        }
      }), !alwaysactive && React.createElement(ToggleControl, {
        label: __('Expand when load', 'awesome-blocks'),
        checked: !!active,
        onChange: function onChange() {
          return setAttributes({
            active: !active
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-accordion__content', {
          'awesome-blocks-accordion__content--alwaysactive': !!alwaysactive,
          'active': !!active
        }, {
          classesList: classesList
        }, id)
      }, React.createElement("div", {
        className: "awesome-blocks-accordion__content__header"
      }, icon && React.createElement("i", {
        className: icon
      }), React.createElement(RichText, {
        tagName: "span",
        className: "awesome-blocks-accordion__content__header__title",
        value: title,
        placeholder: __('Insert Accordion Title', 'awesome-blocks'),
        onChange: function onChange(v) {
          return setAttributes({
            title: v
          });
        }
      }), React.createElement("i", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('collapse-expand', {
          'expanded': !!this.state.isExpanded
        }),
        onClick: this.collapseExpand,
        ref: this.collapseExpandRef
      })), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-accordion__content__body', {
          'expanded': !!this.state.isExpanded
        })
      }, React.createElement(InnerBlocks, {
        templateLock: false
      }))));
    }
  }]);

  return DupleSideBox;
}(Component);



/***/ }),

/***/ "./src/assets/js/blocks/accordion/edit.js":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/accordion/edit.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return DupleSideBox; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    InspectorControls = _wp.blockEditor.InspectorControls,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var TEMPLATE = [['awesome-blocks/accordionpanel', {}], ['awesome-blocks/accordionpanel', {}], ['awesome-blocks/accordionpanel', {}]];

var DupleSideBox =
/*#__PURE__*/
function (_Component) {
  _inherits(DupleSideBox, _Component);

  function DupleSideBox() {
    var _this;

    _classCallCheck(this, DupleSideBox);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(DupleSideBox).apply(this, arguments));
    _this.state = {
      isFlipped: false
    };
    return _this;
  }

  _createClass(DupleSideBox, [{
    key: "flipChange",
    value: function flipChange() {
      var id = this.props.attributes.id;
      var flip = this.flipRef.current.querySelector("[data-id=".concat(id, "] > div > div"));

      if (flip) {
        if (flip.classList.contains('flip')) {
          flip.classList.remove('flip');
          this.setState({
            isFlipped: false
          });
        } else {
          flip.classList.add('flip');
          this.setState({
            isFlipped: true
          });
        }
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var vertical = attributes.vertical,
          expandable = attributes.expandable,
          hideplus = attributes.hideplus,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Accordion Settings', 'awesome-blocks')
      }, React.createElement(ToggleControl, {
        label: __('Vertical', 'awesome-blocks'),
        checked: !!vertical,
        onChange: function onChange() {
          return setAttributes({
            vertical: !vertical
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Expandable', 'awesome-blocks'),
        checked: !!expandable,
        onChange: function onChange() {
          return setAttributes({
            expandable: !expandable
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Hide Plus Icon', 'awesome-blocks'),
        checked: !!hideplus,
        onChange: function onChange() {
          return setAttributes({
            hideplus: !hideplus
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        },
        lite: {
          style: true,
          scroll: true,
          hover: true
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses({
          'awesome-blocks-accordion--expandable': expandable,
          'awesome-blocks-accordion--hideplus': hideplus
        }, {
          classesList: classesList
        }, id)
      }, React.createElement(InnerBlocks, {
        allowedBlocks: ['awesome-blocks/accordionpanel'],
        template: TEMPLATE,
        templateLock: false
      })));
    }
  }]);

  return DupleSideBox;
}(Component);



/***/ }),

/***/ "./src/assets/js/blocks/accordion/index.js":
/*!*************************************************!*\
  !*** ./src/assets/js/blocks/accordion/index.js ***!
  \*************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/accordion/edit.js");
/**
 * External dependencies
 */
 // import accordionMenu from '@iconify/icons-vaadin/accordion-menu';


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/accordion';
var settings = {
  title: __('Accordion', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('feedback'),
  description: __('The Accordion is a block that organizes content within collapsable items.', 'awesome-blocks'),
  category: 'design',
  attributes: {
    vertical: {
      type: 'boolean',
      default: false
    },
    expandable: {
      type: 'boolean',
      default: false
    },
    hideplus: {
      type: 'boolean',
      default: false
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  example: {
    innerBlocks: [{
      name: 'awesome-blocks/accordionpanel',
      attributes: {
        icon: 'fa fa-home',
        title: __('Accordion Title 1', 'awesome-blocks')
      }
    }, {
      name: 'awesome-blocks/accordionpanel',
      attributes: {
        icon: 'fa fa-tachometer-alt',
        title: __('Accordion Title 2', 'awesome-blocks')
      }
    }, {
      name: 'awesome-blocks/accordionpanel',
      attributes: {
        icon: 'fa fa-shopping-cart',
        title: __('Accordion Title 3', 'awesome-blocks')
      }
    }]
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_1__["default"],
  save: function save(_ref) {
    var attributes = _ref.attributes;
    var vertical = attributes.vertical,
        expandable = attributes.expandable,
        hideplus = attributes.hideplus,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses({
        'awesome-blocks-accordion--expandable': expandable,
        'awesome-blocks-accordion--hideplus': hideplus,
        'awesome-blocks-accordion--vertical': vertical
      }, {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks.Content, null));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/accordion/panel.js":
/*!*************************************************!*\
  !*** ./src/assets/js/blocks/accordion/panel.js ***!
  \*************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _edit_panel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit-panel */ "./src/assets/js/blocks/accordion/edit-panel.js");
/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RichText = _wp.blockEditor.RichText,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/accordionpanel';
var attributes = {
  title: {
    type: 'text',
    source: 'children',
    selector: '.awesome-blocks-accordion__content__header__title' // default: ''

  },
  icon: {
    type: 'string',
    source: 'attribute',
    attribute: 'class',
    selector: '.awesome-blocks-accordion__content__header i',
    default: ''
  },
  active: {
    type: 'boolean',
    default: false
  },
  alwaysactive: {
    type: 'boolean',
    default: false
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  }
};
var settings = {
  title: __('Accordion Panel', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('feedback'),
  // description: __('Content Box', 'awesome-blocks'),
  category: 'design',
  attributes: attributes,
  parent: ['awesome-blocks/accordion'],
  edit: _edit_panel__WEBPACK_IMPORTED_MODULE_1__["default"],
  save: function save(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className;
    var title = attributes.title,
        icon = attributes.icon,
        active = attributes.active,
        alwaysactive = attributes.alwaysactive,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-accordion__content', {
        'awesome-blocks-accordion__content--alwaysactive': !!alwaysactive,
        'active': !!active
      }, {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "awesome-blocks-accordion__content__header"
    }, icon && React.createElement("i", {
      className: icon
    }), React.createElement(RichText.Content, {
      tagName: "span",
      className: "awesome-blocks-accordion__content__header__title",
      value: title
    })), React.createElement("div", {
      className: "awesome-blocks-accordion__content__body"
    }, React.createElement(InnerBlocks.Content, null)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/alert/index.js":
/*!*********************************************!*\
  !*** ./src/assets/js/blocks/alert/index.js ***!
  \*********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */
// import warningIcon from '@iconify/icons-emojione/warning'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    RangeControl = _wp$components.RangeControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    BlockControls = _wp$blockEditor.BlockControls,
    InspectorControls = _wp$blockEditor.InspectorControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar;
var name = 'awesome-blocks/alert';
var gutenClass = 'wp-block-awesome-blocks-alert';
var settings = {
  title: __('Alert Box', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('warning'),
  description: __('Alerts. Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.', 'awesome-blocks'),
  category: 'design',
  attributes: {
    text: {
      type: 'text',
      source: 'children',
      selector: ".".concat(gutenClass, "__body")
    },
    dismissible: {
      type: 'boolean',
      default: false
    },
    rememberDismissible: {
      type: 'boolean',
      default: false
    },
    icon: {
      type: 'string'
    },
    type: {
      type: 'string',
      default: ''
    },
    align: {
      type: 'string',
      default: ''
    },
    radius: {
      type: 'number',
      default: 3
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  example: {
    attributes: {
      text: __('Alerts. Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.', 'awesome-blocks'),
      icon: 'fa fa-info-circle',
      dismissible: true,
      type: 'warning'
    }
  },
  edit: function edit(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className;
    var text = attributes.text,
        align = attributes.align,
        icon = attributes.icon,
        dismissible = attributes.dismissible,
        rememberDismissible = attributes.rememberDismissible,
        type = attributes.type,
        radius = attributes.radius,
        id = attributes.id,
        classesList = attributes.classesList;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
      value: align,
      onChange: function onChange(v) {
        setAttributes({
          align: v
        });
      }
    })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Button Settings', 'awesome-blocks')
    }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(ToggleControl, {
      label: __('Dismissible', 'awesome-blocks'),
      checked: !!dismissible,
      onChange: function onChange() {
        return setAttributes({
          dismissible: !dismissible
        });
      }
    }), dismissible && React.createElement(ToggleControl, {
      label: __('Don`t show again', 'awesome-blocks'),
      checked: !!rememberDismissible,
      onChange: function onChange() {
        return setAttributes({
          rememberDismissible: !rememberDismissible
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
      title: __('Icon', 'awesome-blocks'),
      classPlaceholder: __('Insert icon class', 'awesome-blocks'),
      fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
      ,
      value: icon,
      onSelect: function onSelect(v) {
        return setAttributes({
          icon: v
        });
      }
    }), React.createElement(SelectControl, {
      value: type,
      options: [{
        label: __('Alert style', 'awesome-blocks'),
        Key: '',
        value: ''
      }, {
        label: __('primary', 'awesome-blocks'),
        Key: 'primary',
        value: 'primary'
      }, {
        label: __('Info', 'awesome-blocks'),
        Key: 'info',
        value: 'info'
      }, {
        label: __('Success', 'awesome-blocks'),
        Key: 'success',
        value: 'success'
      }, {
        label: __('Warning', 'awesome-blocks'),
        Key: 'warning',
        value: 'warning'
      }, {
        label: __('Danger', 'awesome-blocks'),
        Key: 'danger',
        value: 'danger'
      }],
      onChange: function onChange(v) {
        return setAttributes({
          type: v
        });
      }
    }), React.createElement(RangeControl, {
      label: __('Rounded Corners', 'awesome-blocks'),
      value: parseInt(radius),
      onChange: function onChange(v) {
        return setAttributes({
          radius: v
        });
      },
      min: 0,
      max: 10
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      },
      lite: {
        style: true,
        scroll: true,
        hover: true
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--remembrt-dismissible"), dismissible && rememberDismissible), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--radius-").concat(radius), radius), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--").concat(type), type), _H$gutenClasses), {
        classesList: classesList
      }, id)
    }, icon && React.createElement("i", {
      className: "".concat(gutenClass, "__icon ").concat(icon)
    }), React.createElement(RichText, {
      tagName: "div",
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses("".concat(gutenClass, "__body"), _defineProperty({}, "align-".concat(align), align)),
      value: text,
      placeholder: __('Add text here!', 'awesome-blocks'),
      onChange: function onChange(v) {
        return setAttributes({
          text: v
        });
      },
      allowedFormats: ['core/bold', 'core/italic', 'core/image', 'core/strikethrough', 'core/link', 'core/code']
    }), dismissible && React.createElement("a", {
      id: "".concat(id, "__close"),
      href: "#",
      className: "".concat(gutenClass, "__close")
    }, "\u2A2F")));
  },
  deprecated: [{
    attributes: {
      text: {
        type: 'text',
        source: 'children',
        selector: ".".concat(gutenClass, "__body")
      },
      dismissible: {
        type: 'boolean',
        default: false
      },
      rememberDismissible: {
        type: 'boolean',
        default: false
      },
      icon: {
        type: 'string'
      },
      type: {
        type: 'string',
        default: ''
      },
      align: {
        type: 'string',
        default: ''
      },
      radius: {
        type: 'number',
        default: 3
      },
      id: {
        type: 'string'
      },
      classesList: {
        type: 'string',
        default: ''
      }
    },
    save: function save(_ref2) {
      var _H$gutenClasses3;

      var attributes = _ref2.attributes;
      var text = attributes.text,
          align = attributes.align,
          icon = attributes.icon,
          dismissible = attributes.dismissible,
          rememberDismissible = attributes.rememberDismissible,
          type = attributes.type,
          radius = attributes.radius,
          id = attributes.id,
          classesList = attributes.classesList;
      return React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses((_H$gutenClasses3 = {}, _defineProperty(_H$gutenClasses3, "".concat(gutenClass, "--remembrt-dismissible"), dismissible && rememberDismissible), _defineProperty(_H$gutenClasses3, "".concat(gutenClass, "--radius-").concat(radius), radius), _defineProperty(_H$gutenClasses3, "".concat(gutenClass, "--").concat(type), type), _H$gutenClasses3), {
          classesList: classesList
        }, id)
      }, icon && React.createElement("i", {
        className: "".concat(gutenClass, "__icon ").concat(icon)
      }), React.createElement(RichText.Content, {
        tagName: "div",
        value: text,
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses("".concat(gutenClass, "__body"), _defineProperty({}, "align-".concat(align), align))
      }), dismissible && React.createElement("a", {
        id: "".concat(id, "__close"),
        href: "#",
        className: "".concat(gutenClass, "__close")
      }, " "));
    }
  }],
  save: function save(_ref3) {
    var _H$gutenClasses5;

    var attributes = _ref3.attributes;
    var text = attributes.text,
        align = attributes.align,
        icon = attributes.icon,
        dismissible = attributes.dismissible,
        rememberDismissible = attributes.rememberDismissible,
        type = attributes.type,
        radius = attributes.radius,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      id: id,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses((_H$gutenClasses5 = {}, _defineProperty(_H$gutenClasses5, "".concat(gutenClass, "--remembrt-dismissible"), dismissible && rememberDismissible), _defineProperty(_H$gutenClasses5, "".concat(gutenClass, "--radius-").concat(radius), radius), _defineProperty(_H$gutenClasses5, "".concat(gutenClass, "--").concat(type), type), _H$gutenClasses5), {
        classesList: classesList
      }, id)
    }, icon && React.createElement("i", {
      className: "".concat(gutenClass, "__icon ").concat(icon)
    }), React.createElement(RichText.Content, {
      tagName: "div",
      value: text,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses("".concat(gutenClass, "__body"), _defineProperty({}, "align-".concat(align), align))
    }), dismissible && React.createElement("a", {
      id: "".concat(id, "__close"),
      href: "#",
      className: "".concat(gutenClass, "__close")
    }, " "));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/breadcrumb/index.js":
/*!**************************************************!*\
  !*** ./src/assets/js/blocks/breadcrumb/index.js ***!
  \**************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/**
 *  External dependencies
 */
 // import icon from '@iconify/icons-entypo/dots-three-horizontal'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ServerSideRender = _wp$components.ServerSideRender,
    TextControl = _wp$components.TextControl,
    InspectorControls = _wp.blockEditor.InspectorControls,
    serverSideRender = _wp.serverSideRender;
var name = 'awesome-blocks/breadcrumb';
var settings = {
  title: __('Breadcrumb Menu', 'awesome-blocks'),
  description: __('A breadcrumb or breadcrumb trail is a graphical control element frequently used as a navigational aid in user interfaces and on web pages. It allows users to keep track and maintain awareness of their locations within websites.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('rest-api', 'orange'),
  category: 'widgets',
  attributes: {
    home_title: {
      type: 'string',
      default: __('Home', 'awesome-blocks')
    },
    home_icon: {
      type: 'string',
      default: 'fa fa-home'
    },
    separator: {
      type: 'string',
      default: 'fa fa-angle-double-right'
    },
    editor: {
      type: 'boolean',
      default: false
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  supports: {
    html: false // duplicate: false

  },
  example: {
    attributes: {
      home_title: '',
      home_icon: 'fa fa-home'
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var home_title = attributes.home_title,
        home_icon = attributes.home_icon,
        separator = attributes.separator,
        id = attributes.id,
        classesList = attributes.classesList;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Breadcrumb Menu Settings', 'awesome-blocks')
    }, React.createElement(TextControl, {
      label: __('Home Title', 'awesome-blocks'),
      value: home_title,
      onChange: function onChange(v) {
        return setAttributes({
          home_title: v
        });
      }
    }), !home_title && React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
      title: __('Home Icon', 'awesome-blocks'),
      classPlaceholder: __('Insert icon class', 'awesome-blocks'),
      fliterPlaceholder: __('Search for icon', 'awesome-blocks'),
      value: home_icon,
      onSelect: function onSelect(v) {
        return setAttributes({
          home_icon: v
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
      title: __('Separator Icon', 'awesome-blocks'),
      classPlaceholder: __('Insert icon class', 'awesome-blocks'),
      fliterPlaceholder: __('Search for icon', 'awesome-blocks'),
      value: separator,
      onSelect: function onSelect(v) {
        return setAttributes({
          separator: v
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      icon: "fa fa-cogs",
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement(ServerSideRender, {
      block: "awesome-blocks/breadcrumb",
      attributes: {
        home_title: home_title,
        home_icon: home_icon,
        separator: separator,
        id: id,
        editor: true,
        classesList: classesList
      }
    }));
  },
  save: function save() {
    return null;
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/button/block.json":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/button/block.json ***!
  \************************************************/
/*! exports provided: name, attributes, default */
/***/ (function(module) {

module.exports = JSON.parse("{\"name\":\"awesome-blocks/button\",\"attributes\":{\"text\":{\"type\":\"array\",\"source\":\"children\",\"selector\":\"span\"},\"title\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a\",\"attribute\":\"title\"},\"link\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a\",\"attribute\":\"href\"},\"align\":{\"type\":\"string\"},\"icon\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a i\",\"attribute\":\"class\"},\"newTab\":{\"type\":\"boolean\",\"source\":\"attribute\",\"selector\":\"a\",\"attribute\":\"target\"},\"waveEffect\":{\"type\":\"boolean\",\"default\":true},\"shadowffect\":{\"type\":\"boolean\",\"default\":true},\"effectType\":{\"type\":\"string\",\"default\":\"light\"},\"size\":{\"type\":\"number\",\"default\":3},\"id\":{\"type\":\"string\"},\"classesList\":{\"type\":\"string\",\"default\":\"\"},\"style\":{\"type\":\"object\",\"source\":\"attribute\",\"selector\":\"a\",\"attribute\":\"style\"}}}");

/***/ }),

/***/ "./src/assets/js/blocks/button/index.js":
/*!**********************************************!*\
  !*** ./src/assets/js/blocks/button/index.js ***!
  \**********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _iconify_icons_emojione_ab_button__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @iconify/icons-emojione/ab-button */ "./node_modules/@iconify/icons-emojione/ab-button.js");
/* harmony import */ var _iconify_icons_emojione_ab_button__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_emojione_ab_button__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./block.json */ "./src/assets/js/blocks/button/block.json");
var _block_json__WEBPACK_IMPORTED_MODULE_2___namespace = /*#__PURE__*/__webpack_require__.t(/*! ./block.json */ "./src/assets/js/blocks/button/block.json", 1);
function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */



/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    TextControl = _wp$components.TextControl,
    RangeControl = _wp$components.RangeControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls;
var name = _block_json__WEBPACK_IMPORTED_MODULE_2__.name,
    attributes = _block_json__WEBPACK_IMPORTED_MODULE_2__.attributes;
var gutenClass = 'wp-block-awesome-blocks-button';

var settings = {
  title: __('Button', 'awesome-blocks'),
  description: __('The button block defines a clickable button. Inside a button block you can put content, like text or icon.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].iconStyle(_iconify_icons_emojione_ab_button__WEBPACK_IMPORTED_MODULE_0___default.a),
  category: 'design',
  attributes: attributes,
  example: {
    attributes: {
      text: 'Button',
      icon: 'fa fa-hand-pointer',
      size: 5,
      style: {
        background: '#389BFF'
      }
    }
  },
  edit: function edit(_ref) {
    var _H$gutenClasses2;

    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className;
    var text = attributes.text,
        link = attributes.link,
        title = attributes.title,
        align = attributes.align,
        icon = attributes.icon,
        newTab = attributes.newTab,
        size = attributes.size,
        waveEffect = attributes.waveEffect,
        shadowffect = attributes.shadowffect,
        effectType = attributes.effectType,
        id = attributes.id,
        classesList = attributes.classesList,
        style = attributes.style;
    _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].blockID(id, name, setAttributes);
    return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
      value: align,
      onChange: function onChange(v) {
        return setAttributes({
          align: v
        });
      }
    })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Button Settings', 'awesome-blocks')
    }, React.createElement(TextControl, {
      label: __('Button title', 'awesome-blocks'),
      value: title,
      onChange: function onChange(v) {
        setAttributes({
          title: v
        });
      }
    }), React.createElement(TextControl, {
      label: __('Button Link', 'awesome-blocks'),
      value: link,
      onChange: function onChange(v) {
        setAttributes({
          link: v
        });
      }
    }), React.createElement(RangeControl, {
      label: __('Button size', 'awesome-blocks'),
      value: size,
      onChange: function onChange(v) {
        return setAttributes({
          size: v
        });
      },
      min: 1,
      max: 5
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].SelectIcon, {
      title: __('Icon', 'awesome-blocks'),
      classPlaceholder: __('Insert icon class', 'awesome-blocks'),
      fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
      ,
      value: icon,
      onSelect: function onSelect(value) {
        return setAttributes({
          icon: value
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Open in new tab', 'awesome-blocks'),
      checked: !!newTab,
      onChange: function onChange() {
        setAttributes({
          newTab: !newTab
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Shadow effect', 'awesome-blocks'),
      checked: !!shadowffect,
      onChange: function onChange() {
        setAttributes({
          shadowffect: !shadowffect
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Wave effect', 'awesome-blocks'),
      checked: !!waveEffect,
      onChange: function onChange() {
        setAttributes({
          waveEffect: !waveEffect
        });
      }
    }), waveEffect && React.createElement(SelectControl, {
      label: __('Effect color', 'awesome-blocks'),
      value: effectType,
      options: [{
        label: __('Light', 'awesome-blocks'),
        Key: 'light',
        value: 'light'
      }, {
        label: __('Red', 'awesome-blocks'),
        Key: 'red',
        value: 'red'
      }, {
        label: __('Yellow', 'awesome-blocks'),
        Key: 'yellow',
        value: 'yellow'
      }, {
        label: __('Orange', 'awesome-blocks'),
        Key: 'orange',
        value: 'orange'
      }, {
        label: __('Purple', 'awesome-blocks'),
        Key: 'purple',
        value: 'purple'
      }, {
        label: __('Green', 'awesome-blocks'),
        Key: 'green',
        value: 'green'
      }, {
        label: __('Teal', 'awesome-blocks'),
        Key: 'teal',
        value: 'teal'
      }],
      onChange: function onChange(v) {
        setAttributes({
          effectType: v
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].BlocksOptions, {
      elementID: id,
      elementStyle: ".".concat(id, " > a"),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      },
      lite: {
        style: true,
        scroll: true,
        hover: true
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses(gutenClass, _defineProperty({}, 'align-' + align, align), {
        classesList: classesList
      }, id)
    }, React.createElement("a", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses("".concat(gutenClass, "__button"), (_H$gutenClasses2 = {}, _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "__button--size-").concat(size), true), _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "__button--shadow"), shadowffect), _defineProperty(_H$gutenClasses2, 'waves-effect', waveEffect), _defineProperty(_H$gutenClasses2, "waves-".concat(effectType), waveEffect && effectType), _H$gutenClasses2)) // href={ link }
      ,
      title: title || text,
      style: style
    }, React.createElement(RichText, {
      tagName: "span",
      value: text // allowedFormats={ ['bold', 'italic', 'strikethrough', 'code'] }
      // formattingControls={ [ 'bold', 'italic', 'strikethrough', 'code' ] }
      ,
      allowedFormats: ['core/bold', 'core/italic', 'core/image', 'core/strikethrough', // 'core/link',
      'core/code'],
      onChange: function onChange(v) {
        return setAttributes({
          text: v
        });
      }
    }), !!icon && React.createElement("i", {
      className: icon
    }))));
  },
  deprecated: [{
    attributes: attributes,
    save: function save(_ref2) {
      var _H$gutenClasses4;

      var attributes = _ref2.attributes;
      var text = attributes.text,
          link = attributes.link,
          title = attributes.title,
          align = attributes.align,
          icon = attributes.icon,
          newTab = attributes.newTab,
          size = attributes.size,
          waveEffect = attributes.waveEffect,
          shadowffect = attributes.shadowffect,
          effectType = attributes.effectType,
          id = attributes.id,
          classesList = attributes.classesList,
          className = attributes.className;
      return React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses(_defineProperty({}, 'align-' + align, align), id)
      }, React.createElement("a", _extends({
        href: link,
        title: title || text,
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses("".concat(gutenClass, "__button"), (_H$gutenClasses4 = {}, _defineProperty(_H$gutenClasses4, "".concat(gutenClass, "__button--size-").concat(size), true), _defineProperty(_H$gutenClasses4, "".concat(gutenClass, "__button--shadow"), shadowffect), _defineProperty(_H$gutenClasses4, 'waves-effect', waveEffect), _defineProperty(_H$gutenClasses4, "waves-".concat(effectType), waveEffect && effectType), _H$gutenClasses4), {
          classesList: classesList
        })
      }, newTab ? {
        target: '_blank',
        rel: 'noopener noreferrer'
      } : {}), !!text && React.createElement("span", null, text), !!icon && React.createElement("i", {
        className: icon
      })));
    }
  }],
  save: function save(_ref3) {
    var _H$gutenClasses6;

    var attributes = _ref3.attributes;
    var text = attributes.text,
        link = attributes.link,
        title = attributes.title,
        align = attributes.align,
        icon = attributes.icon,
        newTab = attributes.newTab,
        size = attributes.size,
        waveEffect = attributes.waveEffect,
        shadowffect = attributes.shadowffect,
        effectType = attributes.effectType,
        id = attributes.id,
        classesList = attributes.classesList,
        className = attributes.className;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses(_defineProperty({}, 'align-' + align, align), {
        classesList: classesList
      }, id)
    }, React.createElement("a", _extends({
      href: link,
      title: title || text,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses("".concat(gutenClass, "__button"), (_H$gutenClasses6 = {}, _defineProperty(_H$gutenClasses6, "".concat(gutenClass, "__button--size-").concat(size), true), _defineProperty(_H$gutenClasses6, "".concat(gutenClass, "__button--shadow"), shadowffect), _defineProperty(_H$gutenClasses6, 'waves-effect', waveEffect), _defineProperty(_H$gutenClasses6, "waves-".concat(effectType), waveEffect && effectType), _H$gutenClasses6))
    }, newTab ? {
      target: '_blank',
      rel: 'noopener noreferrer'
    } : {}), !!text && React.createElement("span", null, text), !!icon && React.createElement("i", {
      className: icon
    })));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/buttons/edit.js":
/*!**********************************************!*\
  !*** ./src/assets/js/blocks/buttons/edit.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ButtonBlock; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _objectDestructuringEmpty(obj) { if (obj == null) throw new TypeError("Cannot destructure undefined"); }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    RangeControl = _wp$components.RangeControl,
    PanelBody = _wp$components.PanelBody;

_objectDestructuringEmpty(_wp.editor);

var _wp$blockEditor = _wp.blockEditor,
    BlockControls = _wp$blockEditor.BlockControls,
    InspectorControls = _wp$blockEditor.InspectorControls,
    InnerBlocks = _wp$blockEditor.InnerBlocks;
var gutenClass = 'awesome-blocks-buttons';

var ButtonBlock =
/*#__PURE__*/
function (_Component) {
  _inherits(ButtonBlock, _Component);

  function ButtonBlock() {
    _classCallCheck(this, ButtonBlock);

    return _possibleConstructorReturn(this, _getPrototypeOf(ButtonBlock).apply(this, arguments));
  }

  _createClass(ButtonBlock, [{
    key: "render",
    // constructor () {
    //   super(...arguments)
    // }
    // insertButton() {
    //     return wp.data.dispatch('awesome-blocks/button').insertBlock(insertedBlock, index, rootClientId);
    // }
    value: function render() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var buttonsSpace = attributes.buttonsSpace,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement("div", {
        className: "editor-format-toolbar"
      })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Buttons Group Settings', 'awesome-blocks')
      }, React.createElement(RangeControl, {
        label: __('Space between buttons', 'awesome-blocks'),
        value: buttonsSpace,
        onChange: function onChange(v) {
          return setAttributes({
            buttonsSpace: v
          });
        },
        min: 0,
        max: 5
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        icon: "fa fa-cogs",
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, _defineProperty({}, "".concat(gutenClass, "--space-").concat(buttonsSpace), buttonsSpace !== 0), {
          classesList: classesList
        }, id)
      }, React.createElement(InnerBlocks, {
        allowedBlocks: ['awesome-blocks/button']
      })));
    }
  }]);

  return ButtonBlock;
}(Component); // export default ColumnBlock;




/***/ }),

/***/ "./src/assets/js/blocks/buttons/index.js":
/*!***********************************************!*\
  !*** ./src/assets/js/blocks/buttons/index.js ***!
  \***********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/buttons/edit.js");
/* harmony import */ var _iconify_icons_mdi_table_row__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-mdi/table-row */ "./node_modules/@iconify/icons-mdi/table-row.js");
/* harmony import */ var _iconify_icons_mdi_table_row__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_mdi_table_row__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */



/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
/**
 * Allowed blocks constant is passed to InnerBlocks precisely as specified here.
 * The contents of the array should never change.
 * The array should contain the name of each block that is allowed.
 * In columns block, the only block we allow is 'awesome-blocks/buttons'.
 *
 * @constant
 * @type {string[]}
*/

var name = 'awesome-blocks/buttons';
var gutenClass = 'awesome-blocks-buttons';
var settings = {
  title: __('Buttons Group', 'awesome-blocks'),
  description: __('The buttons block is row of clickable buttons.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].iconStyle(_iconify_icons_mdi_table_row__WEBPACK_IMPORTED_MODULE_1___default.a),
  category: 'design',
  attributes: {
    buttonsSpace: {
      type: 'number',
      default: 0
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  supports: {
    align: ['wide', 'full']
  },
  example: {
    innerBlocks: [{
      name: 'awesome-blocks/button',
      attributes: {
        text: __('Button 1', 'awesome-blocks'),
        icon: 'fa fa-hand-pointer',
        size: 2,
        style: {
          background: '#FF6B6B'
        }
      }
    }, {
      name: 'awesome-blocks/button',
      attributes: {
        text: __('Button 2', 'awesome-blocks'),
        size: 2,
        style: {
          background: '#FF6BCD'
        }
      }
    }, {
      name: 'awesome-blocks/button',
      attributes: {
        text: __('Button 3', 'awesome-blocks'),
        icon: 'fa fa-home',
        size: 2,
        style: {
          background: '#A2E23A'
        }
      }
    }]
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save(_ref) {
    var attributes = _ref.attributes;
    var buttonsSpace = attributes.buttonsSpace,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].gutenClasses(_defineProperty({}, "".concat(gutenClass, "--space-").concat(buttonsSpace), buttonsSpace !== 0), {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks.Content, null));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/card/edit.js":
/*!*******************************************!*\
  !*** ./src/assets/js/blocks/card/edit.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * Edit block.
 */

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    TextControl = _wp$components.TextControl,
    RangeControl = _wp$components.RangeControl,
    MediaPlaceholder = _wp.editor.MediaPlaceholder,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    InspectorControls = _wp$blockEditor.InspectorControls;
var IMAGE_BACKGROUND_TYPE = 'image'; // const ALLOWED_MEDIA_TYPES = [ 'image', 'video' ]

var gutenClass = 'wp-block-awesome-blocks-card';

var SeparatorBlock =
/*#__PURE__*/
function (_Component) {
  _inherits(SeparatorBlock, _Component);

  function SeparatorBlock() {
    _classCallCheck(this, SeparatorBlock);

    return _possibleConstructorReturn(this, _getPrototypeOf(SeparatorBlock).apply(this, arguments));
  }

  _createClass(SeparatorBlock, [{
    key: "render",
    value: function render() {
      var _H$gutenClasses;

      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var image = attributes.image,
          imgtitle = attributes.imgtitle,
          icon = attributes.icon,
          iconsize = attributes.iconsize,
          shadow = attributes.shadow,
          hovereffect = attributes.hovereffect,
          title = attributes.title,
          text = attributes.text,
          btntitle = attributes.btntitle,
          btnlink = attributes.btnlink,
          waveeffect = attributes.waveeffect,
          wavestyle = attributes.wavestyle,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes); // const onSelectMedia = ( media ) => {
      //   if ( ! media || ! media.url ) {
      //     setAttributes( { image: undefined } )
      //     return
      //   }
      //   let mediaType
      //   // for media selections originated from a file upload.
      //   if ( media.media_type ) {
      //     if ( media.media_type === IMAGE_BACKGROUND_TYPE ) {
      //       mediaType = IMAGE_BACKGROUND_TYPE
      //     } else {
      //       return
      //     }
      //   } else { // for media selections originated from existing files in the media library.
      //     if ( media.type !== IMAGE_BACKGROUND_TYPE ) {
      //       return
      //     }
      //     mediaType = media.type
      //   }
      //   setAttributes( { image: media.url } )
      // }

      return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Card Settings', 'awesome-blocks')
      }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
        title: __('Card Icon', 'awesome-blocks'),
        classPlaceholder: __('Insert icon class', 'awesome-blocks'),
        fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
        ,
        value: icon,
        onSelect: function onSelect(v) {
          return setAttributes({
            icon: v
          });
        }
      }), icon && React.createElement(RangeControl, {
        label: __('Icons size', 'awesome-blocks'),
        value: iconsize,
        onChange: function onChange(v) {
          return setAttributes({
            iconsize: v
          });
        },
        min: 1,
        max: 10
      }), React.createElement(SelectControl, {
        label: __('Hover Effect', 'awesome-blocks'),
        value: hovereffect,
        options: [{
          label: __('Empty', 'awesome-blocks'),
          Key: 'empty',
          value: ''
        }, {
          label: __('Slide Right', 'awesome-blocks'),
          Key: 'slideright',
          value: 'slideright'
        }, {
          label: __('Slide up', 'awesome-blocks'),
          Key: 'slideup',
          value: 'slideup'
        }, {
          label: __('Slide Down', 'awesome-blocks'),
          Key: 'slidedown',
          value: 'slidedown'
        }, {
          label: __('Slide Left', 'awesome-blocks'),
          Key: 'slideleft',
          value: 'slideleft'
        }, {
          label: __('Scale In', 'awesome-blocks'),
          Key: 'scalein',
          value: 'scalein'
        }, {
          label: __('Rotate', 'awesome-blocks'),
          Key: 'rotate',
          value: 'rotate'
        }],
        onChange: function onChange(v) {
          return setAttributes({
            hovereffect: v
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Shadow Effect', 'awesome-blocks'),
        checked: !!shadow,
        onChange: function onChange() {
          return setAttributes({
            shadow: !shadow
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Wave Effect', 'awesome-blocks'),
        checked: !!waveeffect,
        onChange: function onChange() {
          return setAttributes({
            waveeffect: !waveeffect
          });
        }
      }), !!waveeffect && React.createElement(SelectControl, {
        label: __('Effect color', 'awesome-blocks'),
        value: wavestyle,
        options: [{
          label: __('Light', 'awesome-blocks'),
          Key: 'light',
          value: 'light'
        }, {
          label: __('Red', 'awesome-blocks'),
          Key: 'red',
          value: 'red'
        }, {
          label: __('Yellow', 'awesome-blocks'),
          Key: 'yellow',
          value: 'yellow'
        }, {
          label: __('Orange', 'awesome-blocks'),
          Key: 'orange',
          value: 'orange'
        }, {
          label: __('Purple', 'awesome-blocks'),
          Key: 'purple',
          value: 'purple'
        }, {
          label: __('Green', 'awesome-blocks'),
          Key: 'green',
          value: 'green'
        }, {
          label: __('Teal', 'awesome-blocks'),
          Key: 'teal',
          value: 'teal'
        }],
        onChange: function onChange(v) {
          return setAttributes({
            wavestyle: v
          });
        }
      }), React.createElement("div", {
        className: "awesome-blocks__admin__block__image",
        style: {
          backgroundImage: "url(".concat(image, ")")
        }
      }, React.createElement("button", {
        href: "#",
        className: "components-button components-circular-option-picker__clear is-secondary is-small remove-image",
        onClick: function onClick() {
          return setAttributes({
            image: undefined
          });
        },
        type: "button"
      }, __('Clear', 'awesome-blocks')), React.createElement(MediaPlaceholder, {
        onSelect: function onSelect(el) {
          setAttributes({
            image: el.url
          });
        },
        allowedTypes: ['image', 'video'],
        multiple: false,
        labels: {
          title: __('Card Image', 'awesome-blocks'),
          instructions: __('Keep it empty to display icon instead.', 'awesome-blocks')
        }
      })), React.createElement(TextControl, {
        label: __('Image title', 'awesome-blocks'),
        value: imgtitle,
        onChange: function onChange(v) {
          return setAttributes({
            imgtitle: v
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        },
        lite: {
          style: true
        }
      })), React.createElement(PanelBody, {
        title: __('Button Settings', 'awesome-blocks')
      }, React.createElement(TextControl, {
        label: __('Button title', 'awesome-blocks'),
        value: btntitle,
        onChange: function onChange(v) {
          return setAttributes({
            btntitle: v
          });
        }
      }), React.createElement(TextControl, {
        label: __('Button Link', 'awesome-blocks'),
        value: btnlink,
        onChange: function onChange(v) {
          return setAttributes({
            btnlink: v
          });
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, "".concat(className), true), _defineProperty(_H$gutenClasses, 'awesome-blocks-card--shadow', !!shadow), _defineProperty(_H$gutenClasses, "awesome-blocks-card--".concat(hovereffect), !!hovereffect), _defineProperty(_H$gutenClasses, 'waves-effect', !!waveeffect), _defineProperty(_H$gutenClasses, "waves-".concat(wavestyle), !!waveeffect && !!wavestyle), _H$gutenClasses), {
          classesList: classesList
        }, id)
      }, React.createElement("div", {
        className: "awesome-blocks-card__header"
      }, image && React.createElement("img", {
        title: imgtitle,
        className: "awesome-blocks-card__header__image",
        src: image
      }), icon && !image && React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses("awesome-blocks-card__header__icon", "awesome-blocks-card__header__icon--size-".concat(iconsize))
      }, React.createElement("i", {
        className: icon
      })), React.createElement(RichText, {
        tagName: "div",
        className: "awesome-blocks-card__header__title",
        value: title,
        placeholder: __('Add card title', 'awesome-blocks'),
        onChange: function onChange(v) {
          return setAttributes({
            title: v
          });
        },
        allowedFormats: ['core/bold', 'core/italic', // 'core/image',
        'core/strikethrough', 'core/link' // 'core/code',
        ]
      })), React.createElement("div", {
        className: "awesome-blocks-card__body"
      }, React.createElement("div", {
        className: "awesome-blocks-card__body__content"
      }, React.createElement(RichText, {
        tagName: "div",
        value: text,
        placeholder: __('Add card text', 'awesome-blocks'),
        onChange: function onChange(v) {
          return setAttributes({
            text: v
          });
        },
        allowedFormats: ['core/bold', 'core/italic', 'core/image', 'core/strikethrough', 'core/link', 'core/code']
      }), btntitle && btnlink && React.createElement("a", {
        title: btntitle,
        href: btnlink,
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-card__body__button', _defineProperty({
          'waves-effect': !!waveeffect
        }, "waves-".concat(wavestyle), !!waveeffect && !!wavestyle))
      }, btntitle)))));
    }
  }]);

  return SeparatorBlock;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (SeparatorBlock);

/***/ }),

/***/ "./src/assets/js/blocks/card/index.js":
/*!********************************************!*\
  !*** ./src/assets/js/blocks/card/index.js ***!
  \********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/card/edit.js");
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 *  Start ExtraBlocks Separator block.
 */
 // import cardIcon from '@iconify/icons-flat-ui/card';
// import creditCard from '@iconify/icons-fe/credit-card';


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RichText = _wp.blockEditor.RichText;
var name = 'awesome-blocks/card';
var blockAttributes = {
  image: {
    type: 'url',
    source: 'attribute',
    attribute: 'src',
    selector: '.awesome-blocks-card__header__image'
  },
  imgtitle: {
    type: 'string',
    source: 'attribute',
    attribute: 'title',
    selector: '.awesome-blocks-card__header__image',
    default: ''
  },
  icon: {
    type: 'string',
    source: 'attribute',
    attribute: 'class',
    selector: '.awesome-blocks-card__header__icon > i'
  },
  iconsize: {
    type: 'number',
    default: 3
  },
  shadow: {
    type: 'string',
    source: 'attribute',
    attribute: 'class',
    selector: '.awesome-blocks-card--shadow'
  },
  hovereffect: {
    type: 'string'
  },
  title: {
    type: 'text',
    source: 'children',
    selector: '.awesome-blocks-card__header__title'
  },
  text: {
    type: 'text',
    source: 'children',
    selector: '.awesome-blocks-card__body__content > div'
  },
  btntitle: {
    type: 'string',
    source: 'attribute',
    attribute: 'title',
    selector: '.awesome-blocks-card__body__button'
  },
  btnlink: {
    type: 'url',
    source: 'attribute',
    attribute: 'href',
    selector: '.awesome-blocks-card__body__button'
  },
  waveeffect: {
    type: 'string',
    source: 'attribute',
    attribute: 'class',
    selector: '.waves-effect'
  },
  wavestyle: {
    type: 'string',
    default: 'light'
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  }
};
var settings = {
  title: __('Info Card', 'awesome-blocks'),
  description: __('Information cards are personal digital identities that people can use online, and the key component of an identity metasystem.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].iconStyle('id'),
  category: 'text',
  attributes: blockAttributes,
  example: {
    attributes: {
      icon: 'fa fa-shopping-cart',
      shadow: true,
      title: __('Card Title', 'awesome-blocks'),
      text: __('Information cards are personal digital identities that people can use online, and the key component of an identity metasystem.', 'awesome-blocks'),
      btntitle: __('Card Button', 'awesome-blocks'),
      btnlink: '#'
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes;
    var image = attributes.image,
        imgtitle = attributes.imgtitle,
        icon = attributes.icon,
        iconsize = attributes.iconsize,
        shadow = attributes.shadow,
        hovereffect = attributes.hovereffect,
        title = attributes.title,
        text = attributes.text,
        btntitle = attributes.btntitle,
        btnlink = attributes.btnlink,
        waveeffect = attributes.waveeffect,
        wavestyle = attributes.wavestyle,
        id = attributes.id,
        classesList = attributes.classesList;
    var printTitle = title.length === 1 && title[0] !== '' || title.length > 1;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses((_H$gutenClasses = {
        'awesome-blocks-card--shadow': !!shadow
      }, _defineProperty(_H$gutenClasses, "awesome-blocks-card--".concat(hovereffect), !!hovereffect), _defineProperty(_H$gutenClasses, 'waves-effect', !!waveeffect), _defineProperty(_H$gutenClasses, "waves-".concat(wavestyle), !!waveeffect && !!wavestyle), _H$gutenClasses), {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "awesome-blocks-card__header"
    }, image && React.createElement("img", {
      title: imgtitle,
      className: "awesome-blocks-card__header__image",
      src: image
    }), icon && !image && React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses("awesome-blocks-card__header__icon", "awesome-blocks-card__header__icon--size-".concat(iconsize))
    }, React.createElement("i", {
      className: icon
    })), printTitle && React.createElement(RichText.Content, {
      tagName: "div",
      className: "awesome-blocks-card__header__title",
      value: title
    })), React.createElement("div", {
      className: "awesome-blocks-card__body"
    }, React.createElement("div", {
      className: "awesome-blocks-card__body__content"
    }, React.createElement(RichText.Content, {
      tagName: "div",
      className: "awesome-blocks-card__body__content",
      value: text
    }), btntitle && btnlink && React.createElement("a", {
      title: btntitle,
      href: btnlink,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses('awesome-blocks-card__body__button', _defineProperty({
        'waves-effect': !!waveeffect
      }, "waves-".concat(wavestyle), !!waveeffect && !!wavestyle))
    }, btntitle))));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/contentbox/index.js":
/*!**************************************************!*\
  !*** ./src/assets/js/blocks/contentbox/index.js ***!
  \**************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */
 // import boxIcon from '@iconify/icons-flat-ui/box'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    _wp$blockEditor = _wp.blockEditor,
    InspectorControls = _wp$blockEditor.InspectorControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    _wp$blockEditor2 = _wp.blockEditor,
    InnerBlocks = _wp$blockEditor2.InnerBlocks,
    BlockControls = _wp$blockEditor2.BlockControls;
var name = 'awesome-blocks/contentbox';
var attributes = {
  container: {
    type: 'boolean',
    default: false
  },
  textAlign: {
    type: 'string' // default: ''

  },
  align: {
    type: 'string' // @TODO: remove this attribute ( replaced with textAlign )

  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  },
  style: {
    // just for example (block preview)
    type: 'object',
    source: 'attribute',
    selector: 'a',
    attribute: 'style'
  }
};
var gutenClass = 'wp-block-awesome-blocks-contentbox';
var settings = {
  title: __('Content Box', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('analytics'),
  description: __('The Content Box block is a generic container for flow content. It has no effect on the content or layout until customize it with all options provided by this plugin.', 'awesome-blocks'),
  category: 'design',
  attributes: attributes,
  supports: {
    align: ['wide', 'full']
  },
  example: {
    attributes: {
      style: {
        border: '1px solid #D0D0D0',
        borderRadius: '5px',
        padding: '5px 20px'
      }
    },
    innerBlocks: [{
      name: 'core/paragraph',
      attributes: {
        customFontSize: 25,
        content: __('The Content Box block is a generic container for flow content. It has no effect on the content or layout until customize it with all options provided by Gutenberg Blocks plugin.', 'awesome-blocks'),
        textAlign: 'center'
      }
    }, {
      name: 'awesome-blocks/button',
      attributes: {
        text: __('Button', 'awesome-blocks'),
        icon: 'fa fa-home',
        size: 2,
        style: {
          background: '#6BAFFF'
        }
      }
    }]
  },
  edit: function edit(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        clientId = _ref.clientId,
        isSelected = _ref.isSelected;
    var container = attributes.container,
        textAlign = attributes.textAlign,
        align = attributes.align,
        id = attributes.id,
        classesList = attributes.classesList,
        style = attributes.style;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes); // const hasChildBlocks = select( 'core/block-editor' ).getBlockOrder( clientId ).length > 0

    return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
      title: __('Content Alignment', 'awesome-blocks'),
      value: textAlign,
      onChange: function onChange(v) {
        return setAttributes({
          textAlign: v
        });
      }
    })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Content Box Settings', 'awesome-blocks')
    }, React.createElement(ToggleControl, {
      label: __('Container Box', 'awesome-blocks'),
      checked: !!container,
      onChange: function onChange() {
        setAttributes({
          container: !container
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      },
      lite: {
        style: true
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, gutenClass, (_H$gutenClasses = {
        'container': container
      }, _defineProperty(_H$gutenClasses, 'align-' + textAlign, textAlign), _defineProperty(_H$gutenClasses, 'align-' + align, align), _H$gutenClasses), {
        classesList: classesList
      }, id),
      style: style
    }, React.createElement(InnerBlocks, {
      templateLock: false // renderAppender={
      //   isSelected
      //     ? () => <InnerBlocks.ButtonBlockAppender />
      //     : () => <Fragment/>
      // }

    })));
  },
  save: function save(_ref2) {
    var _H$gutenClasses2;

    var attributes = _ref2.attributes,
        className = _ref2.className;
    var container = attributes.container,
        textAlign = attributes.textAlign,
        align = attributes.align,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses((_H$gutenClasses2 = {
        'container': container
      }, _defineProperty(_H$gutenClasses2, 'align-' + textAlign, textAlign), _defineProperty(_H$gutenClasses2, 'align-' + align, align), _H$gutenClasses2), {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks.Content, null));
  },
  deprecated: [{
    attributes: {
      container: {
        type: 'boolean',
        default: false
      },
      align: {
        type: 'string' // default: ''

      },
      id: {
        type: 'string'
      },
      classesList: {
        type: 'string',
        default: ''
      },
      style: {
        // just for example (block preview)
        type: 'object',
        source: 'attribute',
        selector: 'a',
        attribute: 'style'
      }
    },
    save: function save(_ref3) {
      var attributes = _ref3.attributes,
          className = _ref3.className;
      var container = attributes.container,
          align = attributes.align,
          id = attributes.id,
          classesList = attributes.classesList;
      return React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(_defineProperty({
          'container': container
        }, 'align-' + align, align), {
          classesList: classesList
        }, id)
      }, React.createElement(InnerBlocks.Content, null));
    }
  }]
};

/***/ }),

/***/ "./src/assets/js/blocks/countdown/edit.js":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/countdown/edit.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * Edit Countdown block.
 */

var _lodash = lodash,
    range = _lodash.range;
/**
 * WordPress dependencies
 */

var _wp = wp,
    _wp$i18n = _wp.i18n,
    __ = _wp$i18n.__,
    sprintf = _wp$i18n.sprintf,
    _wp$element = _wp.element,
    Platform = _wp$element.Platform,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    Toolbar = _wp$components.Toolbar,
    DateTimePicker = _wp$components.DateTimePicker,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    TextControl = _wp$components.TextControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls;
var gutenClass = 'awesome-blocks-countdown';

var CountdownBlock =
/*#__PURE__*/
function (_Component) {
  _inherits(CountdownBlock, _Component);

  /**
   * Constructs a new instance.
   */
  function CountdownBlock() {
    _classCallCheck(this, CountdownBlock);

    return _possibleConstructorReturn(this, _getPrototypeOf(CountdownBlock).apply(this, arguments));
  }
  /**
   * { function_description }
   *
   * @param      {number}  time    The time
   * @return     {string}  { description_of_the_return_value }
   */


  _createClass(CountdownBlock, [{
    key: "timeOutput",
    value: function timeOutput(time) {
      // Get today's date and time
      var now = new Date().getTime(); // Find the distance between now and the count down date

      var distance = time - now; // Time calculations for days, hours, minutes and seconds

      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
      var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
      var seconds = Math.floor(distance % (1000 * 60) / 1000); // return `<span className="days">${days}<span>days</span></span> <span className="hours">${hours}<span>hours</span></span> <span className="minutes">${minutes}<span>minutes</span></span> <span className="seconds">${seconds}<span>seconds</span></span>`

      return {
        weeks: Math.floor(days / 7),
        days: days,
        hours: "".concat(hours).length === 1 ? "0".concat(hours) : hours,
        minutes: "".concat(minutes).length === 1 ? "0".concat(minutes) : minutes,
        seconds: "".concat(seconds).length === 1 ? "0".concat(seconds) : seconds
      };
    }
    /**
     * Renders the object.
     *
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var showWeeks = attributes.showWeeks,
          action = attributes.action,
          url = attributes.url,
          hide = attributes.hide,
          weeksTitle = attributes.weeksTitle,
          daysTitle = attributes.daysTitle,
          hoursTitle = attributes.hoursTitle,
          minutesTitle = attributes.minutesTitle,
          secondsTitle = attributes.secondsTitle,
          id = attributes.id,
          classesList = attributes.classesList;
      var time = attributes.time;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);

      if (!time || undefined === time) {
        var today = new Date();
        var tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);
        time = tomorrow.getTime();
        setAttributes({
          time: tomorrow.getTime()
        });
      }

      var timeOutput = this.timeOutput(time);
      var currentDate = new Date(time);
      return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Time Setting', 'awesome-blocks')
      }, React.createElement(DateTimePicker, {
        currentDate: currentDate.getTime(),
        onChange: function onChange(v) {
          return setAttributes({
            time: new Date(v).getTime()
          });
        }
      })), React.createElement(PanelBody, {
        title: __('Countdown Settings', 'awesome-blocks')
      }, React.createElement(ToggleControl, {
        label: __('Show Weeks', 'awesome-blocks'),
        checked: !!showWeeks,
        onChange: function onChange() {
          setAttributes({
            showWeeks: !showWeeks
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        icon: "fa fa-cogs",
        elementID: id,
        elementStyle: ".".concat(id, " > .").concat(gutenClass, "__timer > div"),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        },
        lite: {
          style: true
        }
      })), React.createElement(PanelBody, {
        title: __('After Finishing', 'awesome-blocks')
      }, React.createElement(SelectControl, {
        label: __('Action', 'awesome-blocks'),
        value: action,
        options: [{
          label: __('None', 'awesome-blocks'),
          Key: 'none',
          value: 'none'
        }, {
          label: __('Redirect to URL', 'awesome-blocks'),
          Key: 'redirect',
          value: 'redirect'
        }, {
          label: __('Refresh Page', 'awesome-blocks'),
          Key: 'refresh',
          value: 'refresh'
        }],
        onChange: function onChange(v) {
          return setAttributes({
            action: v
          });
        }
      }), action === 'redirect' && React.createElement(TextControl, {
        label: __('URL', 'awesome-blocks'),
        value: url,
        onChange: function onChange(v) {
          return setAttributes({
            url: v
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Hide Timer', 'awesome-blocks'),
        checked: !!hide,
        onChange: function onChange() {
          setAttributes({
            hide: !hide
          });
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, {
          classesList: classesList
        }, id),
        "data-time": time
      }, React.createElement("div", {
        className: "".concat(gutenClass, "__timer")
      }, showWeeks && React.createElement("div", {
        className: "weeks"
      }, React.createElement("span", {
        className: "value"
      }, timeOutput.weeks), React.createElement(RichText, {
        tagName: "span",
        onChange: function onChange(v) {
          return setAttributes({
            weeksTitle: v
          });
        },
        value: weeksTitle,
        className: "title",
        placeholder: __('Weeks', 'awesome-blocks'),
        allowedFormats: ['core/bold', 'core/italic']
      })), React.createElement("div", {
        className: "days"
      }, React.createElement("span", {
        className: "value"
      }, !showWeeks ? timeOutput.days : timeOutput.days % 7), React.createElement(RichText, {
        tagName: "span",
        onChange: function onChange(v) {
          return setAttributes({
            daysTitle: v
          });
        },
        value: daysTitle,
        className: "title",
        placeholder: __('Days', 'awesome-blocks'),
        allowedFormats: ['core/bold', 'core/italic']
      })), React.createElement("div", {
        className: "hours"
      }, React.createElement("span", {
        className: "value"
      }, timeOutput.hours), React.createElement(RichText, {
        tagName: "span",
        onChange: function onChange(v) {
          return setAttributes({
            hoursTitle: v
          });
        },
        value: hoursTitle,
        className: "title",
        placeholder: __('Hours', 'awesome-blocks'),
        allowedFormats: ['core/bold', 'core/italic']
      })), React.createElement("div", {
        className: "minutes"
      }, React.createElement("span", {
        className: "value"
      }, timeOutput.minutes), React.createElement(RichText, {
        tagName: "span",
        onChange: function onChange(v) {
          return setAttributes({
            minutesTitle: v
          });
        },
        value: minutesTitle,
        className: "title",
        placeholder: __('Minutes', 'awesome-blocks'),
        allowedFormats: ['core/bold', 'core/italic']
      })), React.createElement("div", {
        className: "seconds"
      }, React.createElement("span", {
        className: "value"
      }, timeOutput.seconds), React.createElement(RichText, {
        tagName: "span",
        onChange: function onChange(v) {
          return setAttributes({
            secondsTitle: v
          });
        },
        value: secondsTitle,
        className: "title",
        placeholder: __('Seconds', 'awesome-blocks'),
        allowedFormats: ['core/bold', 'core/italic']
      })))));
    }
  }]);

  return CountdownBlock;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (CountdownBlock);

/***/ }),

/***/ "./src/assets/js/blocks/countdown/index.js":
/*!*************************************************!*\
  !*** ./src/assets/js/blocks/countdown/index.js ***!
  \*************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/countdown/edit.js");
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

/**
 *  Start ExtraBlocks Separator block.
 */
 // import arrowSplitHorizontal from '@iconify/icons-mdi/arrow-split-horizontal'


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RichText = _wp.blockEditor.RichText;
var name = 'awesome-blocks/countdown';
var gutenClass = 'awesome-blocks-countdown';
var blockAttributes = {
  time: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-time',
    selector: ".".concat(gutenClass)
  },
  showWeeks: {
    type: 'boolean',
    default: false
  },
  action: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-action',
    selector: ".".concat(gutenClass)
  },
  url: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-url',
    selector: ".".concat(gutenClass)
  },
  hide: {
    type: 'boolean',
    default: false
  },
  weeksTitle: {
    type: 'array',
    source: 'children',
    selector: '.weeks .title',
    default: __('Weeks', 'awesome-blocks')
  },
  daysTitle: {
    type: 'array',
    source: 'children',
    selector: '.days .title',
    default: __('Days', 'awesome-blocks')
  },
  hoursTitle: {
    type: 'array',
    source: 'children',
    selector: '.hours .title',
    default: __('Hours', 'awesome-blocks')
  },
  minutesTitle: {
    type: 'array',
    source: 'children',
    selector: '.minutes .title',
    default: __('Minutes', 'awesome-blocks')
  },
  secondsTitle: {
    type: 'array',
    source: 'children',
    selector: '.seconds .title',
    default: __('Seconds', 'awesome-blocks')
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string'
  }
};
var settings = {
  title: __('Countdow', 'awesome-blocks'),
  description: __('You can use this block to separate the content vertically.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].iconStyle('backup'),
  category: 'widgets',
  attributes: blockAttributes,
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var time = attributes.time,
        showWeeks = attributes.showWeeks,
        action = attributes.action,
        url = attributes.url,
        hide = attributes.hide,
        weeksTitle = attributes.weeksTitle,
        daysTitle = attributes.daysTitle,
        hoursTitle = attributes.hoursTitle,
        minutesTitle = attributes.minutesTitle,
        secondsTitle = attributes.secondsTitle,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", _extends({
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses(gutenClass, {
        classesList: classesList
      }, id),
      "data-time": time,
      "data-action": action
    }, action === 'redirect' && !!url ? {
      'data-url': url
    } : {}, !!hide ? {
      'data-hide': 'hide'
    } : {}), React.createElement("div", {
      className: "".concat(gutenClass, "__timer")
    }, showWeeks && React.createElement("div", {
      className: "weeks"
    }, React.createElement("span", {
      className: "value"
    }, "00"), weeksTitle && React.createElement(RichText.Content, {
      tagName: "span",
      value: weeksTitle,
      className: "title"
    })), React.createElement("div", {
      className: "days"
    }, React.createElement("span", {
      className: "value"
    }, "00"), daysTitle && React.createElement(RichText.Content, {
      tagName: "span",
      value: daysTitle,
      className: "title"
    })), React.createElement("div", {
      className: "hours"
    }, React.createElement("span", {
      className: "value"
    }, "00"), hoursTitle && React.createElement(RichText.Content, {
      tagName: "span",
      value: hoursTitle,
      className: "title"
    })), React.createElement("div", {
      className: "minutes"
    }, React.createElement("span", {
      className: "value"
    }, "00"), minutesTitle && React.createElement(RichText.Content, {
      tagName: "span",
      value: minutesTitle,
      className: "title"
    })), React.createElement("div", {
      className: "seconds"
    }, React.createElement("span", {
      className: "value"
    }, "00"), secondsTitle && React.createElement(RichText.Content, {
      tagName: "span",
      value: secondsTitle,
      className: "title"
    }))));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/doublesidedbox/edit.js":
/*!*****************************************************!*\
  !*** ./src/assets/js/blocks/doublesidedbox/edit.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return DoubleSidedBox; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    SelectControl = _wp$components.SelectControl,
    Toolbar = _wp$components.Toolbar,
    _wp$blockEditor = _wp.blockEditor,
    BlockControls = _wp$blockEditor.BlockControls,
    InspectorControls = _wp$blockEditor.InspectorControls,
    InnerBlocks = _wp$blockEditor.InnerBlocks;
var TEMPLATE = [['awesome-blocks/doublesidedboxsides', {
  side: 'front'
}], ['awesome-blocks/doublesidedboxsides', {
  side: 'back'
}]];
var gutenClass = 'wp-block-awesome-blocks-doublesidedbox';

var DoubleSidedBox =
/*#__PURE__*/
function (_Component) {
  _inherits(DoubleSidedBox, _Component);

  function DoubleSidedBox() {
    var _this;

    _classCallCheck(this, DoubleSidedBox);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(DoubleSidedBox).apply(this, arguments));
    _this.state = {
      isFlipped: false
    };
    _this.flipRef = React.createRef();
    _this.flipChange = _this.flipChange.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(DoubleSidedBox, [{
    key: "flipChange",
    value: function flipChange() {
      var id = this.props.attributes.id;
      var flip = this.flipRef.current.querySelector("[data-id=".concat(id, "] > div > div"));

      if (flip) {
        if (flip.classList.contains('flip')) {
          flip.classList.remove('flip');
          this.setState({
            isFlipped: false
          });
        } else {
          flip.classList.add('flip');
          this.setState({
            isFlipped: true
          });
        }
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var type = attributes.type,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);

      var createThumbsControl = function createThumbsControl() {
        return {
          icon: 'update',
          title: __('Flip', 'awesome-blocks'),
          isActive: !!_this2.state.isFlipped,
          onClick: _this2.flipChange
        };
      };

      return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(Toolbar, {
        controls: ['update'].map(createThumbsControl)
      })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Double Sided Box Settings', 'awesome-blocks')
      }, React.createElement(Toolbar, {
        controls: ['update'].map(createThumbsControl)
      }), React.createElement(SelectControl, {
        label: __('Sliding type', 'awesome-blocks'),
        value: type,
        options: [{
          label: __('Flipping', 'awesome-blocks'),
          key: 'flip',
          value: 'flip'
        }, {
          label: __('Flipping up', 'awesome-blocks'),
          key: 'flipup',
          value: 'flipup'
        }, {
          label: __('Slide up', 'awesome-blocks'),
          key: 'slideup',
          value: 'slideup'
        }, {
          label: __('Slide right', 'awesome-blocks'),
          key: 'slideright',
          value: 'slideright'
        }, {
          label: __('Slide down', 'awesome-blocks'),
          key: 'slidedown',
          value: 'slidedown'
        }, {
          label: __('Slide left', 'awesome-blocks'),
          key: 'slideleft',
          value: 'slideleft'
        }],
        onChange: function onChange(v) {
          return setAttributes({
            type: v
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        icon: "fa fa-cogs",
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, _defineProperty({}, "awesome-blocks-doublesidedbox--".concat(type), type), {
          classesList: classesList
        }, id),
        ref: this.flipRef
      }, React.createElement("div", {
        className: "awesome-blocks-doublesidedbox__container",
        "data-id": id
      }, React.createElement(InnerBlocks, {
        allowedBlocks: ['awesome-blocks/doublesidedboxsides'],
        template: TEMPLATE,
        templateLock: "all"
      }))));
    }
  }]);

  return DoubleSidedBox;
}(Component);



/***/ }),

/***/ "./src/assets/js/blocks/doublesidedbox/index.js":
/*!******************************************************!*\
  !*** ./src/assets/js/blocks/doublesidedbox/index.js ***!
  \******************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/doublesidedbox/edit.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */
 // import boxIcon from '@iconify/icons-ic/outline-flip'
// import boxIcon from '@iconify/icons-ic/outline-flip'


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/doublesidedbox';
var settings = {
  title: __('Double Sided Box', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('update'),
  description: __('It`s a box with tow faces the first one is visible and the second one is hidden, but when hover/tap over it the second one will be visible and the first one will be hidden.', 'awesome-blocks'),
  category: 'design',
  attributes: {
    type: {
      type: 'string',
      default: 'flip'
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  // example: {
  //   url: 'doublesidedbox-example.gif',
  //   innerBlocks: [
  //     {
  //       name: 'awesome-blocks/doublesidedboxsides',
  //       attributes: {
  //         align: 'center'
  //       }
  //     },
  //     {
  //       name: 'awesome-blocks/doublesidedboxsides',
  //       attributes: {
  //         align: 'center'
  //       }
  //     },
  //   ]
  // },
  edit: _edit__WEBPACK_IMPORTED_MODULE_1__["default"],
  save: function save(_ref) {
    var attributes = _ref.attributes;
    var type = attributes.type,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(_defineProperty({}, "awesome-blocks-doublesidedbox--".concat(type), type), {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "awesome-blocks-doublesidedbox__container"
    }, React.createElement(InnerBlocks.Content, null)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/doublesidedbox/sides.js":
/*!******************************************************!*\
  !*** ./src/assets/js/blocks/doublesidedbox/sides.js ***!
  \******************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */
 // import boxIcon from '@iconify/icons-ic/outline-flip-to-front'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    PanelBody = _wp.components.PanelBody,
    _wp$blockEditor = _wp.blockEditor,
    InspectorControls = _wp$blockEditor.InspectorControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/doublesidedboxsides';
var attributes = {
  side: {
    type: 'string',
    default: 'front'
  },
  align: {
    type: 'string' // default: ''

  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  }
};
var gutenClass = 'wp-block-awesome-blocks-doublesidedboxsides';
var settings = {
  title: __('Sides', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('update'),
  // description: __('Content Box', 'awesome-blocks'),
  category: 'design',
  attributes: attributes,
  parent: ['awesome-blocks/doublesidedbox'],
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className;
    var side = attributes.side,
        align = attributes.align,
        id = attributes.id,
        classesList = attributes.classesList;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    var sideClass = 'front' === side ? 'awesome-blocks-doublesidedbox__front' : 'awesome-blocks-doublesidedbox__back';
    return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Sides Settings', 'awesome-blocks')
    }, React.createElement(AlignmentToolbar, {
      title: __('Content Alignment', 'awesome-blocks'),
      value: align,
      onChange: function onChange(v) {
        return setAttributes({
          align: v
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, sideClass, _defineProperty({}, 'align-' + align, align), {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks, {
      templateLock: false
    })));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes,
        className = _ref2.className;
    var side = attributes.side,
        align = attributes.align,
        id = attributes.id,
        classesList = attributes.classesList;
    var sideClass = 'front' === side ? 'awesome-blocks-doublesidedbox__front' : 'awesome-blocks-doublesidedbox__back';
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(sideClass, _defineProperty({}, 'align-' + align, align), {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks.Content, null));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/featureslist/featureslistitem.js":
/*!***************************************************************!*\
  !*** ./src/assets/js/blocks/featureslist/featureslistitem.js ***!
  \***************************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/**
 * External dependencies
 */
// import checkmarkIcon from '@iconify/icons-flat-color-icons/checkmark'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    PanelBody = _wp.components.PanelBody,
    Fragment = _wp.element.Fragment,
    _wp$blockEditor = _wp.blockEditor,
    InspectorControls = _wp$blockEditor.InspectorControls,
    InnerBlocks = _wp$blockEditor.InnerBlocks;
/**
 * Allowed blocks constant is passed to InnerBlocks precisely as specified here.
 * The contents of the array should never change.
 * The array should contain the name of each block that is allowed.
 * In columns block, the only block we allow is 'awesome-blocks/buttons'.
 *
 * @constant
 * @type {string[]}
*/

var name = 'awesome-blocks/featureslistitem';
var gutenClass = 'wp-block-awesome-blocks-featureslistitem';
var settings = {
  title: __('Features Item', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('yes'),
  category: 'design',
  attributes: {
    icon: {
      type: 'string',
      default: 'fa fa-check-double'
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  parent: ['awesome-blocks/featureslist'],
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var icon = attributes.icon,
        id = attributes.id,
        classesList = attributes.classesList;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Features Item Settings', 'awesome-blocks')
    }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
      title: __('Icon', 'awesome-blocks'),
      classPlaceholder: __('Insert icon class', 'awesome-blocks'),
      fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
      ,
      value: icon,
      onSelect: function onSelect(value) {
        return setAttributes({
          icon: value
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      },
      lite: {
        style: true
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, 'awesome-blocks-featuresitem', {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "awesome-blocks-featuresitem__icon"
    }, React.createElement("i", {
      className: icon
    })), React.createElement("div", {
      className: "awesome-blocks-featuresitem__content"
    }, React.createElement(InnerBlocks, null))));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var icon = attributes.icon,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-featuresitem', {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "awesome-blocks-featuresitem__icon"
    }, React.createElement("i", {
      className: icon
    })), React.createElement("div", {
      className: "awesome-blocks-featuresitem__content"
    }, React.createElement(InnerBlocks.Content, null)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/featureslist/index.js":
/*!****************************************************!*\
  !*** ./src/assets/js/blocks/featureslist/index.js ***!
  \****************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */
// import todoList from '@iconify/icons-flat-color-icons/todo-list'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    Fragment = _wp.element.Fragment,
    _wp$blockEditor = _wp.blockEditor,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls,
    InnerBlocks = _wp$blockEditor.InnerBlocks;
/**
 * Allowed blocks constant is passed to InnerBlocks precisely as specified here.
 * The contents of the array should never change.
 * The array should contain the name of each block that is allowed.
 * In columns block, the only block we allow is 'awesome-blocks/buttons'.
 *
 * @constant
 * @type {string[]}
*/

var TEMPLATE = [['awesome-blocks/featureslistitem', {}], ['awesome-blocks/featureslistitem', {}], ['awesome-blocks/featureslistitem', {}]];
var name = 'awesome-blocks/featureslist';
var gutenClass = 'wp-block-awesome-blocks-featureslist';
var settings = {
  title: __('Features List', 'awesome-blocks'),
  description: __('Features List block are an advanced list to clarify the features of your products/services.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('yes'),
  category: 'design',
  attributes: {
    align: {
      type: 'string',
      default: ''
    },
    showline: {
      type: 'boolean',
      default: true
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  example: {
    innerBlocks: [{
      name: 'awesome-blocks/featureslistitem',
      attributes: {
        customFontSize: 25
      },
      innerBlocks: [{
        name: 'core/paragraph',
        attributes: {
          customFontSize: 25,
          content: __('Features Line 1.', 'awesome-blocks')
        }
      }]
    }, {
      name: 'awesome-blocks/featureslistitem',
      attributes: {
        customFontSize: 25
      },
      innerBlocks: [{
        name: 'core/paragraph',
        attributes: {
          customFontSize: 25,
          content: __('Features Line 2.', 'awesome-blocks')
        }
      }]
    }, {
      name: 'awesome-blocks/featureslistitem',
      attributes: {
        customFontSize: 25
      },
      innerBlocks: [{
        name: 'core/paragraph',
        attributes: {
          customFontSize: 25,
          content: __('Features Line 3.', 'awesome-blocks')
        }
      }]
    }, {
      name: 'awesome-blocks/featureslistitem',
      attributes: {
        customFontSize: 25
      },
      innerBlocks: [{
        name: 'awesome-blocks/button',
        attributes: {
          text: __('You can add any block', 'awesome-blocks'),
          icon: 'fa fa-home',
          size: 3,
          align: 'left',
          style: {
            background: '#6BAFFF'
          }
        }
      }]
    }]
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var align = attributes.align,
        showline = attributes.showline,
        id = attributes.id,
        classesList = attributes.classesList;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
      value: align,
      onChange: function onChange(v) {
        return setAttributes({
          align: v
        });
      }
    })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Features List Settings', 'awesome-blocks')
    }, React.createElement(ToggleControl, {
      label: __('Show Icons Line', 'awesome-blocks'),
      checked: !!showline,
      onChange: function onChange() {
        setAttributes({
          showline: !showline
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, _defineProperty({
        'awesome-blocks-featureslist--showline': !!showline
      }, "awesome-blocks-featureslist--".concat(align), !!align), {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks, {
      allowedBlocks: ['awesome-blocks/featureslistitem'],
      template: TEMPLATE,
      templateLock: false
    })));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var align = attributes.align,
        showline = attributes.showline,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(_defineProperty({
        'awesome-blocks-featureslist--showline': !!showline
      }, "awesome-blocks-featureslist--".concat(align), !!align), {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks.Content, null));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/gallerybox/edit.js":
/*!*************************************************!*\
  !*** ./src/assets/js/blocks/gallerybox/edit.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./icon */ "./src/assets/js/blocks/gallerybox/icon.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * External dependencies
 */
 // import galleryIcon from '@iconify/icons-whh/gallery'
// import GalleryImage from './gallery-image'

 // import edit from './edit'
// import filter from 'lodash/filter'
// import pick from 'lodash/pick'
// import get from 'lodash/get'
// import map from 'lodash/map'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment,
    _wp$components = _wp.components,
    Button = _wp$components.Button,
    PanelBody = _wp$components.PanelBody,
    RangeControl = _wp$components.RangeControl,
    SelectControl = _wp$components.SelectControl,
    ToggleControl = _wp$components.ToggleControl,
    Toolbar = _wp$components.Toolbar,
    withNotices = _wp$components.withNotices,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    InspectorControls = _wp$blockEditor.InspectorControls,
    BlockIcon = _wp$blockEditor.BlockIcon,
    MediaPlaceholder = _wp$blockEditor.MediaPlaceholder,
    BlockControls = _wp$blockEditor.BlockControls,
    MediaUpload = _wp$blockEditor.MediaUpload;
var gutenClass = 'awesome-blocks-gallerybox'; // const linkOptions = [
//   { value: 'attachment', label: __( 'Attachment Page' ) },
//   { value: 'media', label: __( 'Media File' ) },
//   { value: 'none', label: __( 'None' ) },
// ];

var ALLOWED_MEDIA_TYPES = ['image']; // export function defaultColumnsNumber( attributes ) {
//   return Math.min( 3, attributes.images.length )
// }
// export const pickRelevantMediaFiles = ( image ) => {
//   return { id: image.id, alt: image.alt, url: image.url, caption: image.caption }
// }

var GalleryBoxEdit =
/*#__PURE__*/
function (_Component) {
  _inherits(GalleryBoxEdit, _Component);

  function GalleryBoxEdit() {
    var _this;

    _classCallCheck(this, GalleryBoxEdit);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(GalleryBoxEdit).apply(this, arguments));
    _this.onSelectImage = _this.onSelectImage.bind(_assertThisInitialized(_this));
    _this.onSelectImages = _this.onSelectImages.bind(_assertThisInitialized(_this)); // this.onRemoveImage = this.onRemoveImage.bind( this );
    // this.toggleImageCrop = this.toggleImageCrop.bind( this );
    // this.setColumnsNumber = this.setColumnsNumber.bind( this );
    // this.setLinkTo = this.setLinkTo.bind( this );
    // this.setImageAttributes = this.setImageAttributes.bind( this );

    _this.setAttributes = _this.setAttributes.bind(_assertThisInitialized(_this));
    _this.state = {
      selectedImage: null
    };
    return _this;
  }

  _createClass(GalleryBoxEdit, [{
    key: "setAttributes",
    value: function setAttributes(attributes) {
      if (attributes.images) {
        attributes = attributes;
      }

      this.props.setAttributes(attributes);
    }
  }, {
    key: "onSelectImage",
    value: function onSelectImage(index) {
      var _this2 = this;

      return function () {
        if (_this2.state.selectedImage !== index) {
          _this2.setState({
            selectedImage: index
          });
        }
      };
    } // onRemoveImage( index ) {
    //   return () => {
    //     const images = filter( this.props.attributes.images, ( img, i ) => index !== i );
    //     const { columns } = this.props.attributes;
    //     this.setState( { selectedImage: null } );
    //     this.setAttributes( {
    //       images,
    //       columns: columns ? Math.min( images.length, columns ) : columns,
    //     } );
    //   };
    // }

  }, {
    key: "onSelectImages",
    value: function onSelectImages(images) {
      this.setAttributes({
        images: images.map(function (image) {
          return {
            id: image.id,
            alt: image.alt,
            url: image.url,
            caption: image.caption
          };
        })
      });
    } // setLinkTo( value ) {
    //   this.setAttributes( { linkTo: value } );
    // }
    // setColumnsNumber( value ) {
    //   this.setAttributes( { columns: value } );
    // }
    // toggleImageCrop() {
    //   this.setAttributes( { imageCrop: ! this.props.attributes.imageCrop } );
    // }
    // getImageCropHelp( checked ) {
    //   return checked ? __( 'Thumbnails are cropped to align.' ) : __( 'Thumbnails are not cropped.' );
    // }
    // setImageAttributes( index, attributes ) {
    //   const { attributes: { images } } = this.props;
    //   const { setAttributes } = this;
    //   if ( ! images[ index ] ) {
    //     return;
    //   }
    //   setAttributes( {
    //     images: [
    //       ...images.slice( 0, index ),
    //       {
    //         ...images[ index ],
    //         ...attributes,
    //       },
    //       ...images.slice( index + 1 ),
    //     ],
    //   } );
    // }

  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      // Deselect images when deselecting the block
      if (!this.props.isSelected && prevProps.isSelected) {
        this.setState({
          selectedImage: null,
          captionSelected: false
        });
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this3 = this,
          _H$gutenClasses;

      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          isSelected = _this$props.isSelected,
          className = _this$props.className,
          noticeOperations = _this$props.noticeOperations,
          noticeUI = _this$props.noticeUI,
          name = _this$props.name;
      var images = attributes.images,
          size = attributes.size,
          showcaption = attributes.showcaption,
          effect = attributes.effect,
          autoplay = attributes.autoplay,
          fitimages = attributes.fitimages,
          zoomimage = attributes.zoomimage,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      var hasImages = !!images.length;
      var controls = React.createElement(BlockControls, null, React.createElement(Toolbar, null, React.createElement(MediaUpload, {
        onSelect: this.onSelectImages,
        allowedTypes: ALLOWED_MEDIA_TYPES,
        multiple: true,
        gallery: true,
        value: images.map(function (img) {
          return img.id;
        }),
        render: function render(_ref) {
          var open = _ref.open;
          return React.createElement(Button, {
            className: "components-toolbar__control",
            label: __('Edit gallery', 'awesome-blocks'),
            icon: "edit",
            onClick: open
          });
        }
      })));
      var mediaPlaceholder = React.createElement(MediaPlaceholder, {
        addToGallery: hasImages,
        isAppender: hasImages,
        className: className // dropZoneUIOnly={ hasImages && ! isSelected }
        ,
        disableMediaButtons: hasImages && !isSelected,
        icon: !hasImages && React.createElement(BlockIcon, {
          icon: _icon__WEBPACK_IMPORTED_MODULE_1__["default"]
        }),
        labels: {
          title: !hasImages && __('Gallery', 'awesome-blocks'),
          instructions: !hasImages && __('Drag images, upload new ones or select files from your library.', 'awesome-blocks')
        },
        onSelect: this.onSelectImages,
        accept: "image/*",
        allowedTypes: ALLOWED_MEDIA_TYPES,
        multiple: true,
        value: hasImages ? images : undefined,
        onError: noticeOperations.createErrorNotice,
        notices: hasImages ? undefined : noticeUI
      });

      if (!hasImages) {
        return React.createElement(Fragment, null, controls, mediaPlaceholder);
      }

      return React.createElement(Fragment, null, controls, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Gallery Box Settings', 'awesome-blocks')
      }, React.createElement(RangeControl, {
        label: __('Images size', 'awesome-blocks'),
        value: parseInt(size),
        onChange: function onChange(v) {
          return _this3.setAttributes({
            size: v
          });
        },
        min: 1,
        max: 5
      }), React.createElement(ToggleControl, {
        label: __('Show Caption', 'awesome-blocks'),
        help: __('Show caption on image hover.', 'awesome-blocks'),
        checked: !!showcaption,
        onChange: function onChange() {
          _this3.setAttributes({
            showcaption: !showcaption
          });
        }
      }), React.createElement(SelectControl, {
        label: __('Transition Effect', 'awesome-blocks'),
        value: effect,
        options: [{
          label: __('None', 'awesome-blocks'),
          Key: 'none',
          value: 'none'
        }, {
          label: __('Fade', 'awesome-blocks'),
          Key: 'fade',
          value: 'fade'
        }],
        onChange: function onChange(v) {
          return _this3.setAttributes({
            effect: v
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Auto Playing Slideshow', 'awesome-blocks'),
        help: __('Slideshow paly automatically.', 'awesome-blocks'),
        checked: !!autoplay,
        onChange: function onChange() {
          _this3.setAttributes({
            autoplay: !autoplay
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Fit to screen', 'awesome-blocks'),
        help: __('Fit images to screen.', 'awesome-blocks'),
        checked: !!fitimages,
        onChange: function onChange() {
          _this3.setAttributes({
            fitimages: !fitimages
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Zoom Effect', 'awesome-blocks'),
        help: __('Zoom effect on image hover.', 'awesome-blocks'),
        checked: !!zoomimage,
        onChange: function onChange() {
          _this3.setAttributes({
            zoomimage: !zoomimage
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        icon: "fa fa-cogs",
        elementID: id,
        elementStyle: ".".concat(id, " .awesome-blocks-gallerybox__container"),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return _this3.setAttributes({
            classesList: v.classesList
          });
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--showcaption"), !!showcaption), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--autoplay"), !!autoplay), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--fitimages"), !!fitimages), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--zoomimage"), !!zoomimage), _H$gutenClasses), {
          classesList: classesList
        }, id),
        "data-size": size,
        "data-effect": effect
      }, React.createElement("div", {
        className: "awesome-blocks-gallerybox__container"
      }, images.map(function (img, index) {
        return React.createElement("figure", {
          className: "awesome-blocks-gallerybox__container__image",
          key: img.id || img.url
        }, React.createElement("img", {
          src: img.url,
          alt: img.alt,
          "data-id": img.id
        }), React.createElement(RichText, {
          tagName: "figcaption",
          placeholder: __('Write caption…', 'awesome-blocks'),
          value: img.caption,
          isSelected: _this3.state.captionSelected,
          onChange: function onChange(v) {
            return _this3.setAttributes({
              caption: v
            });
          },
          unstableOnFocus: _this3.onSelectCaption,
          allowedFormats: ['core/bold', 'core/italic', // 'core/image',
          'core/strikethrough', 'core/link' // 'core/code',
          ],
          inlineToolbar: true
        }));
      }))), isSelected && mediaPlaceholder);
    }
  }]);

  return GalleryBoxEdit;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (withNotices(GalleryBoxEdit));

/***/ }),

/***/ "./src/assets/js/blocks/gallerybox/icon.js":
/*!*************************************************!*\
  !*** ./src/assets/js/blocks/gallerybox/icon.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/**
 * WordPress dependencies
 */
var _wp = wp,
    _wp$components = _wp.components,
    G = _wp$components.G,
    Path = _wp$components.Path,
    SVG = _wp$components.SVG;
/* harmony default export */ __webpack_exports__["default"] = (React.createElement(SVG, {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, React.createElement(Path, {
  fill: "none",
  d: "M0 0h24v24H0V0z"
}), React.createElement(G, null, React.createElement(Path, {
  d: "M20 4v12H8V4h12m0-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 9.67l1.69 2.26 2.48-3.1L19 15H9zM2 6v14c0 1.1.9 2 2 2h14v-2H4V6H2z"
}))));

/***/ }),

/***/ "./src/assets/js/blocks/gallerybox/index.js":
/*!**************************************************!*\
  !*** ./src/assets/js/blocks/gallerybox/index.js ***!
  \**************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/gallerybox/edit.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */
 // import galleryIcon from '@iconify/icons-whh/gallery'
// import GalleryImage from './gallery-image'
// import icon from './icon'

 // import pick from 'lodash/pick'
// import get from 'lodash/get'
// import map from 'lodash/map'
// import { filter, pick, map, get } from 'lodash'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RichText = _wp.blockEditor.RichText;
var name = 'awesome-blocks/gallerybox';
var gutenClass = 'awesome-blocks-gallerybox'; // const ALLOWED_MEDIA_TYPES = [ 'image' ];

var attributes = {
  images: {
    type: 'array',
    default: [],
    source: 'query',
    selector: 'figure.awesome-blocks-gallerybox__container__image',
    query: {
      url: {
        source: 'attribute',
        selector: 'img',
        attribute: 'src'
      },
      alt: {
        source: 'attribute',
        selector: 'img',
        attribute: 'alt',
        default: ''
      },
      caption: {
        type: 'string',
        source: 'html',
        selector: 'figcaption'
      },
      id: {
        source: 'attribute',
        selector: 'img',
        attribute: 'data-id'
      }
    }
  },
  size: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-size',
    selector: ".".concat(gutenClass),
    default: '3'
  },
  showcaption: {
    type: 'boolean',
    source: 'attribute',
    attribute: 'class',
    selector: ".".concat(gutenClass, "--showcaption"),
    default: true
  },
  effect: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-effect',
    selector: ".".concat(gutenClass),
    default: 'fade'
  },
  autoplay: {
    type: 'boolean',
    source: 'attribute',
    attribute: 'class',
    selector: ".".concat(gutenClass, "--autoplay"),
    default: true
  },
  fitimages: {
    type: 'boolean',
    source: 'attribute',
    attribute: 'class',
    selector: ".".concat(gutenClass, "--fitimages"),
    default: true
  },
  zoomimage: {
    type: 'boolean',
    source: 'attribute',
    attribute: 'class',
    selector: ".".concat(gutenClass, "--zoomimage"),
    default: true
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  }
};
var settings = {
  title: __('Gallery Box', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('images-alt2'),
  description: __('Gallery Box block is a block for displaying images in a Mac-style "lightbox" that floats overtop of web page.', 'awesome-blocks'),
  category: 'media',
  attributes: attributes,
  keywords: [__('image', 'awesome-blocks'), __('images', 'awesome-blocks'), __('gallery', 'awesome-blocks')],
  supports: {
    align: ['wide', 'full']
  },
  example: {
    attributes: {
      images: [{
        url: 'https://s.w.org/images/core/5.3/Glacial_lakes%2C_Bhutan.jpg'
      }, {
        url: 'https://s.w.org/images/core/5.3/Sediment_off_the_Yucatan_Peninsula.jpg'
      }, {
        url: 'https://s.w.org/images/core/5.3/Sediment_off_the_Yucatan_Peninsula.jpg'
      }, {
        url: 'https://s.w.org/images/core/5.3/Glacial_lakes%2C_Bhutan.jpg'
      }, {
        url: 'https://s.w.org/images/core/5.3/Glacial_lakes%2C_Bhutan.jpg'
      }, {
        url: 'https://s.w.org/images/core/5.3/Sediment_off_the_Yucatan_Peninsula.jpg'
      }]
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_1__["default"],
  save: function save(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes,
        className = _ref.className;
    var images = attributes.images,
        size = attributes.size,
        showcaption = attributes.showcaption,
        effect = attributes.effect,
        autoplay = attributes.autoplay,
        fitimages = attributes.fitimages,
        zoomimage = attributes.zoomimage,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--showcaption"), !!showcaption), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--autoplay"), !!autoplay), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--fitimages"), !!fitimages), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--zoomimage"), !!zoomimage), _H$gutenClasses), {
        classesList: classesList
      }, id),
      "data-size": size,
      "data-effect": effect
    }, React.createElement("div", {
      className: "".concat(gutenClass, "__container")
    }, images.map(function (img, index) {
      return React.createElement("figure", {
        className: "".concat(gutenClass, "__container__image"),
        key: img.url
      }, React.createElement("img", {
        src: img.url,
        alt: img.alt,
        "data-id": img.id
      }), React.createElement(RichText.Content, {
        tagName: "figcaption",
        value: img.caption
      }));
    }), React.createElement("div", null, React.createElement("div", {
      className: "awesome-blocks-gallerybox__container__next"
    }), React.createElement("div", {
      className: "awesome-blocks-gallerybox__container__previous"
    }), React.createElement("div", {
      className: "awesome-blocks-gallerybox__container__close"
    }))));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/heading/edit.js":
/*!**********************************************!*\
  !*** ./src/assets/js/blocks/heading/edit.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _heading_toolbar__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./heading-toolbar */ "./src/assets/js/blocks/heading/heading-toolbar.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * Edit Heading block.
 */


var _lodash = lodash,
    range = _lodash.range;
/**
 * WordPress dependencies
 */

var _wp = wp,
    _wp$i18n = _wp.i18n,
    __ = _wp$i18n.__,
    sprintf = _wp$i18n.sprintf,
    _wp$element = _wp.element,
    Platform = _wp$element.Platform,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    Toolbar = _wp$components.Toolbar,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls;

var HeadingBlock =
/*#__PURE__*/
function (_Component) {
  _inherits(HeadingBlock, _Component);

  function HeadingBlock() {
    _classCallCheck(this, HeadingBlock);

    return _possibleConstructorReturn(this, _getPrototypeOf(HeadingBlock).apply(this, arguments));
  }

  _createClass(HeadingBlock, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var content = attributes.content,
          align = attributes.align,
          level = attributes.level,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      var isAndroid = Platform.select({
        android: true,
        native: false,
        web: false
      });
      var tagName = 'h' + level;
      return React.createElement(Fragment, null, React.createElement(BlockControls, null, !isAndroid && React.createElement(AlignmentToolbar, {
        value: align,
        onChange: function onChange(v) {
          return setAttributes({
            align: v
          });
        }
      }), React.createElement(_heading_toolbar__WEBPACK_IMPORTED_MODULE_1__["default"], {
        minLevel: Platform.OS === 'web' ? 2 : 1,
        maxLevel: Platform.OS === 'web' ? 5 : 7,
        selectedLevel: level,
        onChange: function onChange(v) {
          return setAttributes({
            level: v
          });
        }
      })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Heading Settings', 'awesome-blocks')
      }, Platform.OS === 'web' && React.createElement(Fragment, null, React.createElement("p", null, __('Text Level', 'awesome-blocks')), React.createElement(_heading_toolbar__WEBPACK_IMPORTED_MODULE_1__["default"], {
        isCollapsed: false,
        minLevel: 1,
        maxLevel: 7,
        selectedLevel: level,
        onChange: function onChange(v) {
          return setAttributes({
            level: v
          });
        }
      })), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        icon: "fa fa-cogs",
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        },
        lite: {
          style: true
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, _defineProperty({}, align + '-text', !!align), {
          classesList: classesList
        }, id)
      }, React.createElement(RichText, {
        identifier: "content",
        tagName: tagName,
        value: content,
        onChange: function onChange(v) {
          return setAttributes({
            content: v
          });
        },
        "aria-label": content ? __('Paragraph block') : __('Empty block; start writing or type forward slash to choose a block'),
        __unstableEmbedURLOnPaste: true,
        __unstableAllowPrefixTransformations: true
      })));
    }
  }]);

  return HeadingBlock;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (HeadingBlock);

/***/ }),

/***/ "./src/assets/js/blocks/heading/heading-level-icon.js":
/*!************************************************************!*\
  !*** ./src/assets/js/blocks/heading/heading-level-icon.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return AwesomeBlocksHeadingLevelIcon; });
/**
 * WordPress dependencies
 */
var _wp = wp,
    _wp$components = _wp.components,
    Path = _wp$components.Path,
    SVG = _wp$components.SVG;
function AwesomeBlocksHeadingLevelIcon(_ref) {
  var level = _ref.level,
      _ref$isPressed = _ref.isPressed,
      isPressed = _ref$isPressed === void 0 ? false : _ref$isPressed;
  var levelToPath = {
    1: 'M9 5h2v10H9v-4H5v4H3V5h2v4h4V5zm6.6 0c-.6.9-1.5 1.7-2.6 2v1h2v7h2V5h-1.4z',
    2: 'M7 5h2v10H7v-4H3v4H1V5h2v4h4V5zm8 8c.5-.4.6-.6 1.1-1.1.4-.4.8-.8 1.2-1.3.3-.4.6-.8.9-1.3.2-.4.3-.8.3-1.3 0-.4-.1-.9-.3-1.3-.2-.4-.4-.7-.8-1-.3-.3-.7-.5-1.2-.6-.5-.2-1-.2-1.5-.2-.4 0-.7 0-1.1.1-.3.1-.7.2-1 .3-.3.1-.6.3-.9.5-.3.2-.6.4-.8.7l1.2 1.2c.3-.3.6-.5 1-.7.4-.2.7-.3 1.2-.3s.9.1 1.3.4c.3.3.5.7.5 1.1 0 .4-.1.8-.4 1.1-.3.5-.6.9-1 1.2-.4.4-1 .9-1.6 1.4-.6.5-1.4 1.1-2.2 1.6V15h8v-2H15z',
    3: 'M12.1 12.2c.4.3.8.5 1.2.7.4.2.9.3 1.4.3.5 0 1-.1 1.4-.3.3-.1.5-.5.5-.8 0-.2 0-.4-.1-.6-.1-.2-.3-.3-.5-.4-.3-.1-.7-.2-1-.3-.5-.1-1-.1-1.5-.1V9.1c.7.1 1.5-.1 2.2-.4.4-.2.6-.5.6-.9 0-.3-.1-.6-.4-.8-.3-.2-.7-.3-1.1-.3-.4 0-.8.1-1.1.3-.4.2-.7.4-1.1.6l-1.2-1.4c.5-.4 1.1-.7 1.6-.9.5-.2 1.2-.3 1.8-.3.5 0 1 .1 1.6.2.4.1.8.3 1.2.5.3.2.6.5.8.8.2.3.3.7.3 1.1 0 .5-.2.9-.5 1.3-.4.4-.9.7-1.5.9v.1c.6.1 1.2.4 1.6.8.4.4.7.9.7 1.5 0 .4-.1.8-.3 1.2-.2.4-.5.7-.9.9-.4.3-.9.4-1.3.5-.5.1-1 .2-1.6.2-.8 0-1.6-.1-2.3-.4-.6-.2-1.1-.6-1.6-1l1.1-1.4zM7 9H3V5H1v10h2v-4h4v4h2V5H7v4z',
    4: 'M9 15H7v-4H3v4H1V5h2v4h4V5h2v10zm10-2h-1v2h-2v-2h-5v-2l4-6h3v6h1v2zm-3-2V7l-2.8 4H16z',
    5: 'M12.1 12.2c.4.3.7.5 1.1.7.4.2.9.3 1.3.3.5 0 1-.1 1.4-.4.4-.3.6-.7.6-1.1 0-.4-.2-.9-.6-1.1-.4-.3-.9-.4-1.4-.4H14c-.1 0-.3 0-.4.1l-.4.1-.5.2-1-.6.3-5h6.4v1.9h-4.3L14 8.8c.2-.1.5-.1.7-.2.2 0 .5-.1.7-.1.5 0 .9.1 1.4.2.4.1.8.3 1.1.6.3.2.6.6.8.9.2.4.3.9.3 1.4 0 .5-.1 1-.3 1.4-.2.4-.5.8-.9 1.1-.4.3-.8.5-1.3.7-.5.2-1 .3-1.5.3-.8 0-1.6-.1-2.3-.4-.6-.2-1.1-.6-1.6-1-.1-.1 1-1.5 1-1.5zM9 15H7v-4H3v4H1V5h2v4h4V5h2v10z',
    6: 'M9 15H7v-4H3v4H1V5h2v4h4V5h2v10zm8.6-7.5c-.2-.2-.5-.4-.8-.5-.6-.2-1.3-.2-1.9 0-.3.1-.6.3-.8.5l-.6.9c-.2.5-.2.9-.2 1.4.4-.3.8-.6 1.2-.8.4-.2.8-.3 1.3-.3.4 0 .8 0 1.2.2.4.1.7.3 1 .6.3.3.5.6.7.9.2.4.3.8.3 1.3s-.1.9-.3 1.4c-.2.4-.5.7-.8 1-.4.3-.8.5-1.2.6-1 .3-2 .3-3 0-.5-.2-1-.5-1.4-.9-.4-.4-.8-.9-1-1.5-.2-.6-.3-1.3-.3-2.1s.1-1.6.4-2.3c.2-.6.6-1.2 1-1.6.4-.4.9-.7 1.4-.9.6-.3 1.1-.4 1.7-.4.7 0 1.4.1 2 .3.5.2 1 .5 1.4.8 0 .1-1.3 1.4-1.3 1.4zm-2.4 5.8c.2 0 .4 0 .6-.1.2 0 .4-.1.5-.2.1-.1.3-.3.4-.5.1-.2.1-.5.1-.7 0-.4-.1-.8-.4-1.1-.3-.2-.7-.3-1.1-.3-.3 0-.7.1-1 .2-.4.2-.7.4-1 .7 0 .3.1.7.3 1 .1.2.3.4.4.6.2.1.3.3.5.3.2.1.5.2.7.1z'
  };

  if (!levelToPath.hasOwnProperty(level)) {
    return null;
  }

  return React.createElement(SVG, {
    width: "24",
    height: "24",
    viewBox: "0 0 20 20",
    xmlns: "http://www.w3.org/2000/svg",
    isPressed: isPressed
  }, React.createElement(Path, {
    d: levelToPath[level]
  }));
}

/***/ }),

/***/ "./src/assets/js/blocks/heading/heading-toolbar.js":
/*!*********************************************************!*\
  !*** ./src/assets/js/blocks/heading/heading-toolbar.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _heading_level_icon__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./heading-level-icon */ "./src/assets/js/blocks/heading/heading-level-icon.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * External dependencies
 */
// import { range } from 'lodash';

/**
 * WordPress dependencies
 */
var _wp = wp,
    _wp$i18n = _wp.i18n,
    __ = _wp$i18n.__,
    sprintf = _wp$i18n.sprintf,
    Component = _wp.element.Component,
    ToolbarGroup = _wp.components.ToolbarGroup;
/**
 * Internal dependencies
 */



var AwesomeBlocksHeadingToolbar =
/*#__PURE__*/
function (_Component) {
  _inherits(AwesomeBlocksHeadingToolbar, _Component);

  function AwesomeBlocksHeadingToolbar() {
    _classCallCheck(this, AwesomeBlocksHeadingToolbar);

    return _possibleConstructorReturn(this, _getPrototypeOf(AwesomeBlocksHeadingToolbar).apply(this, arguments));
  }

  _createClass(AwesomeBlocksHeadingToolbar, [{
    key: "createLevelControl",
    value: function createLevelControl(targetLevel, selectedLevel, onChange) {
      var isActive = targetLevel === selectedLevel;
      return {
        icon: React.createElement(_heading_level_icon__WEBPACK_IMPORTED_MODULE_0__["default"], {
          level: targetLevel,
          isPressed: isActive
        }),
        // translators: %s: heading level e.g: "1", "2", "3"
        title: sprintf(__('Heading %d', 'awesome-blocks'), targetLevel),
        isActive: isActive,
        onClick: function onClick() {
          return onChange(targetLevel);
        }
      };
    }
  }, {
    key: "render",
    value: function render() {
      var _this = this;

      var _this$props = this.props,
          _this$props$isCollaps = _this$props.isCollapsed,
          isCollapsed = _this$props$isCollaps === void 0 ? true : _this$props$isCollaps,
          minLevel = _this$props.minLevel,
          maxLevel = _this$props.maxLevel,
          selectedLevel = _this$props.selectedLevel,
          onChange = _this$props.onChange;

      var range = function range(fromValue, toValue) {
        var array = [];

        for (var i = fromValue; i <= toValue; i++) {
          array.push(i);
        }

        return array;
      };

      return React.createElement(ToolbarGroup, {
        isCollapsed: isCollapsed,
        icon: React.createElement(_heading_level_icon__WEBPACK_IMPORTED_MODULE_0__["default"], {
          level: selectedLevel
        }),
        controls: range(minLevel, maxLevel).map(function (index) {
          return _this.createLevelControl(index, selectedLevel, onChange);
        }),
        label: __('Change heading level', 'awesome-blocks')
      });
    }
  }]);

  return AwesomeBlocksHeadingToolbar;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (AwesomeBlocksHeadingToolbar);

/***/ }),

/***/ "./src/assets/js/blocks/heading/index.js":
/*!***********************************************!*\
  !*** ./src/assets/js/blocks/heading/index.js ***!
  \***********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/heading/edit.js");
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 *  Start ExtraBlocks Heading block.
 */
 // import arrowSplitHorizontal from '@iconify/icons-mdi/arrow-split-horizontal'


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RichText = _wp.blockEditor.RichText;
var name = 'awesome-blocks/heading';
var blockAttributes = {
  content: {
    type: 'array',
    source: 'children',
    selector: 'h1,h2,h3,h4,h5,h6'
  },
  align: {
    type: 'string' // default: 'center'

  },
  level: {
    type: 'number',
    default: 3
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string'
  }
};
var settings = {
  title: __('Advanced Heading', 'awesome-blocks'),
  description: __('You can use this block to separate the content vertically.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].iconStyle('editor-table'),
  category: 'text',
  attributes: blockAttributes,
  // supports: {
  //   align: [ 'wide', 'full' ]
  // },
  example: {
    attributes: {
      content: __('Advanced Heading', 'awesome-blocks')
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var content = attributes.content,
        align = attributes.align,
        level = attributes.level,
        id = attributes.id,
        classesList = attributes.classesList;
    var tagName = 'h' + level;
    var isEmpty = content.length > 0 && content[0] !== '';
    return isEmpty && React.createElement(RichText.Content, {
      tagName: tagName,
      value: content,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses(_defineProperty({}, align + '-text', !!align), {
        classesList: classesList
      }, id)
    });
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/index.js":
/*!***************************************!*\
  !*** ./src/assets/js/blocks/index.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * start Gutenberg Blocks
 */
var registerAwesomeBlocks =
/*#__PURE__*/
function () {
  function registerAwesomeBlocks() {
    _classCallCheck(this, registerAwesomeBlocks);

    // Gutenberg Blocks version
    this.name = 'Gutenberg Blocks'; // Gutenberg Blocks description

    this.description = 'Gutenberg Blocks is the most advanced Gutenberg blocks plugin.'; // Gutenberg Blocks version

    this.version = '5';
    this.helper = __webpack_require__(/*! ./libs/helper */ "./src/assets/js/blocks/libs/helper.js").H;

    this._initializer();
  }

  _createClass(registerAwesomeBlocks, [{
    key: "_initializer",
    value: function _initializer() {
      // This variable is set in class-awesomeblocks-adminhooks.php in post_type() function
      // const type = window.awesomeblocks_type || ''
      var contentbox = __webpack_require__(/*! ./contentbox */ "./src/assets/js/blocks/contentbox/index.js");

      var magicbox = __webpack_require__(/*! ./magicbox */ "./src/assets/js/blocks/magicbox/index.js");

      var gallerybox = __webpack_require__(/*! ./gallerybox */ "./src/assets/js/blocks/gallerybox/index.js");

      var row = __webpack_require__(/*! ./row */ "./src/assets/js/blocks/row/index.js");

      var column = __webpack_require__(/*! ./row/column */ "./src/assets/js/blocks/row/column.js");

      var buttons = __webpack_require__(/*! ./buttons */ "./src/assets/js/blocks/buttons/index.js");

      var button = __webpack_require__(/*! ./button */ "./src/assets/js/blocks/button/index.js");

      var openstreetmap = __webpack_require__(/*! ./openstreetmap */ "./src/assets/js/blocks/openstreetmap/index.js");

      var separator = __webpack_require__(/*! ./separator */ "./src/assets/js/blocks/separator/index.js");

      var spacer = __webpack_require__(/*! ./spacer */ "./src/assets/js/blocks/spacer/index.js");

      var testimonial = __webpack_require__(/*! ./testimonial */ "./src/assets/js/blocks/testimonial/index.js");

      var alert = __webpack_require__(/*! ./alert */ "./src/assets/js/blocks/alert/index.js");

      var menu = __webpack_require__(/*! ./menu */ "./src/assets/js/blocks/menu/index.js");

      var smenu = __webpack_require__(/*! ./smenu */ "./src/assets/js/blocks/smenu/index.js");

      var breadcrumb = __webpack_require__(/*! ./breadcrumb */ "./src/assets/js/blocks/breadcrumb/index.js");

      var search = __webpack_require__(/*! ./search */ "./src/assets/js/blocks/search/index.js");

      var doublesidedbox = __webpack_require__(/*! ./doublesidedbox */ "./src/assets/js/blocks/doublesidedbox/index.js");

      var doublesidedboxsides = __webpack_require__(/*! ./doublesidedbox/sides */ "./src/assets/js/blocks/doublesidedbox/sides.js");

      var accordion = __webpack_require__(/*! ./accordion */ "./src/assets/js/blocks/accordion/index.js");

      var accordionpanel = __webpack_require__(/*! ./accordion/panel */ "./src/assets/js/blocks/accordion/panel.js");

      var tabs = __webpack_require__(/*! ./tabs */ "./src/assets/js/blocks/tabs/index.js");

      var tabstab = __webpack_require__(/*! ./tabs/tab */ "./src/assets/js/blocks/tabs/tab.js");

      var social = __webpack_require__(/*! ./social */ "./src/assets/js/blocks/social/index.js");

      var card = __webpack_require__(/*! ./card */ "./src/assets/js/blocks/card/index.js");

      var modalbox = __webpack_require__(/*! ./modalbox */ "./src/assets/js/blocks/modalbox/index.js");

      var featureslist = __webpack_require__(/*! ./featureslist */ "./src/assets/js/blocks/featureslist/index.js");

      var featureslistitem = __webpack_require__(/*! ./featureslist/featureslistitem */ "./src/assets/js/blocks/featureslist/featureslistitem.js");

      var pricingtable = __webpack_require__(/*! ./pricingtable */ "./src/assets/js/blocks/pricingtable/index.js");

      var pricingtableplan = __webpack_require__(/*! ./pricingtable/plan */ "./src/assets/js/blocks/pricingtable/plan.js");

      var progressbar = __webpack_require__(/*! ./progressbar */ "./src/assets/js/blocks/progressbar/index.js");

      var heading = __webpack_require__(/*! ./heading */ "./src/assets/js/blocks/heading/index.js");

      var paragraph = __webpack_require__(/*! ./paragraph */ "./src/assets/js/blocks/paragraph/index.js");

      var stickybox = __webpack_require__(/*! ./stickybox */ "./src/assets/js/blocks/stickybox/index.js");

      var countdown = __webpack_require__(/*! ./countdown */ "./src/assets/js/blocks/countdown/index.js"); // const image           = require( './image')


      var blocks = [progressbar, countdown, accordion, accordionpanel, gallerybox, heading, paragraph, pricingtable, pricingtableplan, doublesidedbox, doublesidedboxsides, separator, social, // image,
      button, buttons, openstreetmap, modalbox, magicbox, featureslist, featureslistitem, smenu, breadcrumb, contentbox, row, column, tabs, tabstab, card, testimonial, spacer, alert, search, menu, stickybox];
      blocks.forEach(function (_ref) {
        var name = _ref.name,
            settings = _ref.settings;
        wp.blocks.registerBlockType(name, settings);
      }); // subscribe any changes in blocks

      wp.data.subscribe(this.helper.awesomeblocksSubscribe); // set head style when load
      // this.helper.setHeadStyle()
    }
  }]);

  return registerAwesomeBlocks;
}();

var register_awesomeblocks = new registerAwesomeBlocks();
document.addEventListener('DOMContentLoaded', function () {
  register_awesomeblocks.helper.setHeadStyle();
});

/***/ }),

/***/ "./src/assets/js/blocks/libs/awesome-blocks-options/components/classes.js":
/*!********************************************************************************!*\
  !*** ./src/assets/js/blocks/libs/awesome-blocks-options/components/classes.js ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _react_fieldset__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../react-fieldset */ "./src/assets/js/blocks/libs/react-fieldset/index.js");
/* harmony import */ var _helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }



/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RangeControl = _wp.components.RangeControl;
var i18n = {
  visibility: __('Visibility Options', 'awesome-blocks'),
  scroll: __('Scrollin Options', 'awesome-blocks'),
  hover: __('Hovering Options', 'awesome-blocks'),
  other: __('Other Options', 'awesome-blocks')
}; // classes list

var AwesomeBlocksclasses = {
  visibility: {
    SM: {
      visibleSM: ['awbo-visible-sm', __('Visible on small screen', 'awesome-blocks')],
      hiddenSM: ['awbo-hidden-sm', __('Hidden on small screen', 'awesome-blocks')]
    },
    MD: {
      visibleMD: ['awbo-visible-md', __('Visible on medium screen', 'awesome-blocks')],
      hiddenMD: ['awbo-hidden-md', __('Hidden on medium screen', 'awesome-blocks')]
    },
    LG: {
      visibleLG: ['awbo-visible-lg', __('Visible on large screen', 'awesome-blocks')],
      hiddenLG: ['awbo-hidden-lg', __('Hidden on large screen', 'awesome-blocks')]
    },
    XLG: {
      visibleXLG: ['awbo-visible-xlg', __('Visible on extra large screen', 'awesome-blocks')],
      hiddenXLG: ['awbo-hidden-xlg', __('Hidden on extra large screen', 'awesome-blocks')]
    }
  },
  scroll: {
    scale: {
      scaleIn: ['awbo-scale-in', __('Scale in', 'awesome-blocks')],
      scaleOut: ['awbo-scale-out', __('Scale out', 'awesome-blocks')]
    },
    slideX: {
      slideRight: ['awbo-slide-left', __('Slide left', 'awesome-blocks')],
      slideLeft: ['awbo-slide-right', __('Slide right', 'awesome-blocks')]
    },
    slideY: {
      slideUp: ['awbo-slide-up', __('Slide up', 'awesome-blocks')],
      slideDown: ['awbo-slide-down', __('Slide down', 'awesome-blocks')]
    },
    fade: {
      fadeIn: ['awbo-fade-in', __('Fade in', 'awesome-blocks')],
      fadeOut: ['awbo-fade-out', __('Fade out', 'awesome-blocks')]
    },
    rotation: {
      rightRotation: ['awbo-left-rotation', __('Left rotation', 'awesome-blocks')],
      leftRotation: ['awbo-right-rotation', __('Right rotation', 'awesome-blocks')]
    },
    uprotation: {
      upRotation: ['awbo-up-rotation', __('Up rotation', 'awesome-blocks')],
      downRotation: ['awbo-down-rotation', __('Down rotation', 'awesome-blocks')]
    },
    parallax: {
      fixedBackground: ['awbo-fixed-bg', __('Fixed background', 'awesome-blocks')],
      parallaxUp: ['awbo-parallax-up', __('Parallax background "Up"', 'awesome-blocks')],
      parallaxDown: ['awbo-parallax-down', __('Parallax background "DWON"', 'awesome-blocks')]
    }
  },
  hover: {
    zoom: {
      zoomBgIn: ['awbo-hover-bg-zoomin', __('Background Zoom-in', 'awesome-blocks')],
      zoomBgOut: ['awbo-hover-bg-zoomout', __('Background Zoom-out', 'awesome-blocks')]
    },
    shadow: {
      boxShadow: ['awbo-hover-shadow', __('Draw Shadow', 'awesome-blocks')]
    },
    scale: {
      hoveScaleIn: ['awbo-hover-scalein', __('Scale in', 'awesome-blocks')],
      hoveScaleOut: ['awbo-hover-scaleout', __('Scale out', 'awesome-blocks')]
    },
    visibility: {
      opacityInc: ['awbo-hover-visibility-inc', __('Increase visibility', 'awesome-blocks')],
      opacityDec: ['awbo-hover-visibility-dec', __('Reduction visibility', 'awesome-blocks')]
    }
  },
  other: {
    align: {
      textLeft: ['awbo-text-left', __('Align left', 'awesome-blocks')],
      textRight: ['awbo-text-right', __('Align right', 'awesome-blocks')],
      textCenter: ['awbo-text-center', __('Align center', 'awesome-blocks')],
      textJustify: ['awbo-text-justify', __('Align justify', 'awesome-blocks')]
    },
    sizeAlign: {
      centerSM: ['awbo-center-sm', __('Align content to center on small device', 'awesome-blocks')],
      centerMD: ['awbo-center-md', __('Align content to center on medium device', 'awesome-blocks')],
      centerLG: ['awbo-center-lg', __('Align content to center on large device', 'awesome-blocks')]
    }
  }
};
var HBclasses = {};
Object.keys(AwesomeBlocksclasses).map(function (index) {
  Object.keys(AwesomeBlocksclasses[index]).map(function (i) {
    Object.keys(AwesomeBlocksclasses[index][i]).map(function (j) {
      HBclasses[j] = AwesomeBlocksclasses[index][i][j][0];
    });
  });
});
var Component = wp.element.Component;

var AwesomeBlocksClasses =
/*#__PURE__*/
function (_Component) {
  _inherits(AwesomeBlocksClasses, _Component);

  function AwesomeBlocksClasses() {
    var _this;

    _classCallCheck(this, AwesomeBlocksClasses);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(AwesomeBlocksClasses).apply(this, arguments));
    _this.options = {
      lite: _this.props.lite
    };
    Object.keys(HBclasses).map(function (index) {
      if (_this.props.value) _this.options[index] = _this.props.value.indexOf(HBclasses[index]) > -1;
    });

    if (_this.props.value && 'string' === typeof _this.props.value) {
      var classesArray = _this.props.value.split(' ');

      classesArray && 'function' === typeof classesArray.map && classesArray.map(function (index) {
        if (index.indexOf('awbo-scroll_duration_') > -1) {
          _this.options.scrollDuration = parseInt(index.replace('awbo-scroll_duration_', ''));
        } else if (index.indexOf('awbo-scroll_easing_') > -1) {
          _this.options.scrollEasing = index.replace('awbo-scroll_easing_', '');
        }
      });
    }

    _this.setClasses = _this.setClasses.bind(_assertThisInitialized(_this));
    _this.onChangeToggle = _this.onChangeToggle.bind(_assertThisInitialized(_this));
    return _this;
  }
  /**
   * set classes array
   * @param {object} options
   */


  _createClass(AwesomeBlocksClasses, [{
    key: "setClasses",
    value: function setClasses() {
      var _this2 = this;

      var classesList = [];
      Object.keys(this.options).map(function (index) {
        _this2.options[index] === true && classesList.push(HBclasses[index]);
      });
      typeof this.options.scrollDuration !== 'undefined' && this.options.scrollDuration !== 70 && classesList.push('awbo-scroll_duration_' + this.options.scrollDuration);
      this.options.scrollEasing && classesList.push('awbo-scroll_easing_' + this.options.scrollEasing);
      this.props.onChange(classesList);
    }
    /**
     * { function_description }
     *
     * @param      {(number|string)}  event   The event
     */

  }, {
    key: "onChangeToggle",
    value: function onChangeToggle(event) {
      var _this3 = this;

      if (event !== 'undefined') {
        if (typeof event === 'number') {
          var value = (event / 100).toFixed(2) * 100;
          this.options.scrollDuration = value;
        } else {
          var target = event.currentTarget;
          var id = target.id;
          var _value = event.currentTarget.value;
          var checked = target.checked;
          var group = target.attributes.classgroup.value;

          if (HBclasses[id]) {
            this.options[id] = checked;
            Object.keys(AwesomeBlocksclasses[group]).map(function (i) {
              if ('sizeAlign' !== i && AwesomeBlocksclasses[group][i][id]) {
                Object.keys(AwesomeBlocksclasses[group][i]).map(function (j) {
                  if (id !== j) {
                    _this3.options[j] = false;
                  }
                });
              }
            });
          } else if (id === 'scrollEasing' && _value !== 'undefined') {
            this.options.scrollEasing = _value;
          }
        }

        this.setClasses();
      }
    }
    /**
     * { function_description }
     *
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "scrollOptions",
    value: function scrollOptions() {
      var _this$options = this.options,
          scrollDuration = _this$options.scrollDuration,
          scrollEasing = _this$options.scrollEasing;
      return React.createElement("div", {
        className: "scroll-options"
      }, React.createElement(RangeControl, {
        label: __('Scroll duration', 'awesome-blocks'),
        id: "scrollDuration",
        className: "scroll_duration",
        classgroup: "scroll",
        value: scrollDuration || 70,
        onChange: this.onChangeToggle,
        min: 0,
        max: 100,
        step: 5
      }), React.createElement("select", {
        id: "scrollEasing",
        value: scrollEasing,
        classgroup: "scroll",
        onChange: this.onChangeToggle
      }, React.createElement("option", {
        value: ""
      }, __('Select Easing', 'awesome-blocks')), React.createElement("option", {
        value: "ease"
      }, "ease"), React.createElement("option", {
        value: "linear"
      }, "linear"), React.createElement("option", {
        value: "ease-in"
      }, "ease-in"), React.createElement("option", {
        value: "ease-out"
      }, "ease-out"), React.createElement("option", {
        value: "ease-in-out"
      }, "ease-in-out"), React.createElement("option", {
        value: "easeInQuad"
      }, "easeInQuad"), React.createElement("option", {
        value: "easeInCubic"
      }, "easeInCubic"), React.createElement("option", {
        value: "easeInQuart"
      }, "easeInQuart"), React.createElement("option", {
        value: "easeInQuint"
      }, "easeInQuint"), React.createElement("option", {
        value: "easeInSine"
      }, "easeInSine"), React.createElement("option", {
        value: "easeInExpo"
      }, "easeInExpo"), React.createElement("option", {
        value: "easeInCirc"
      }, "easeInCirc"), React.createElement("option", {
        value: "easeInBack"
      }, "easeInBack"), React.createElement("option", {
        value: "easeOutQuad"
      }, "easeOutQuad"), React.createElement("option", {
        value: "easeOutCubic"
      }, "easeOutCubic"), React.createElement("option", {
        value: "easeOutQuart"
      }, "easeOutQuart"), React.createElement("option", {
        value: "easeOutQuint"
      }, "easeOutQuint"), React.createElement("option", {
        value: "easeOutSine"
      }, "easeOutSine"), React.createElement("option", {
        value: "easeOutExpo"
      }, "easeOutExpo"), React.createElement("option", {
        value: "easeOutCirc"
      }, "easeOutCirc"), React.createElement("option", {
        value: "easeOutBack"
      }, "easeOutBack"), React.createElement("option", {
        value: "easeInOutQuad"
      }, "easeInOutQuad"), React.createElement("option", {
        value: "easeInOutCubic"
      }, "easeInOutCubic"), React.createElement("option", {
        value: "easeInOutQuart"
      }, "easeInOutQuart"), React.createElement("option", {
        value: "easeInOutQuint"
      }, "easeInOutQuint"), React.createElement("option", {
        value: "easeInOutSine"
      }, "easeInOutSine"), React.createElement("option", {
        value: "easeInOutExpo"
      }, "easeInOutExpo"), React.createElement("option", {
        value: "easeInOutCirc"
      }, "easeInOutCirc"), React.createElement("option", {
        value: "easeInOutBack"
      }, "easeInOutBack")));
    } //

    /**
     * { function_description }
     *
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "render",
    value: function render() {
      var _this4 = this;

      var lite = this.props.lite;
      var key = Math.floor(Math.random() * 999 + 111);
      return React.createElement("div", {
        className: "gutenberg-classes"
      }, Object.keys(AwesomeBlocksclasses).map(function (group, index) {
        return  false || group === 'visibility' || group === 'other' || lite.scroll === true && group === 'scroll' || lite.hover === true && group === 'hover' ? React.createElement(_react_fieldset__WEBPACK_IMPORTED_MODULE_0__["default"], {
          key: group,
          title: i18n[group],
          iconClass: "fa fa-search-plus"
        }, React.createElement("div", null, group === 'scroll' && _this4.scrollOptions(), Object.keys(AwesomeBlocksclasses[group]).map(function (index) {
          var el = AwesomeBlocksclasses[group][index];
          return Object.keys(el).map(function (i) {
            var value = el[i];
            return React.createElement("div", {
              key: "div-".concat(i),
              className: "options-checkbox"
            }, React.createElement("input", {
              key: i,
              id: i,
              name: i,
              type: "checkbox",
              classgroup: group,
              checked: !!_this4.options[i],
              onChange: _this4.onChangeToggle
            }), React.createElement("label", {
              key: "label-".concat(i),
              htmlFor: i
            }, value[1]));
          });
        }))) : React.createElement(_helper__WEBPACK_IMPORTED_MODULE_1__["H"].getPro, {
          list: true,
          key: index
        });
      }));
    }
  }]);

  return AwesomeBlocksClasses;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (AwesomeBlocksClasses);

/***/ }),

/***/ "./src/assets/js/blocks/libs/awesome-blocks-options/components/style.js":
/*!******************************************************************************!*\
  !*** ./src/assets/js/blocks/libs/awesome-blocks-options/components/style.js ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _react_fieldset__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../react-fieldset */ "./src/assets/js/blocks/libs/react-fieldset/index.js");
/* harmony import */ var _helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _libs_awesome_blocks_background__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../libs/awesome-blocks-background */ "./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/index.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

// import ReactFieldset from "../../react-fieldset"



/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    RangeControl = _wp.components.RangeControl,
    PanelColorSettings = _wp.blockEditor.PanelColorSettings;
var Component = wp.element.Component;
var allowedStyle = ['padding', 'paddingRight', 'paddingTop', 'paddingLeft', 'paddingBottom', 'margin', 'marginRight', 'marginTop', 'marginLeft', 'marginBottom', 'borderWidth', 'borderRightWidth', 'borderTopWidth', 'borderLeftWidth', 'borderBottomWidth', 'borderColor', 'borderStyle', 'borderRadius', 'fontSize', 'color', 'opacity', 'backgroundColor', 'backgroundImage', 'backgroundRepeat', 'backgroundSize'];

var AwesomeBlocksStyle =
/*#__PURE__*/
function (_Component) {
  _inherits(AwesomeBlocksStyle, _Component);

  /**
   * Constructs the object.
   */
  function AwesomeBlocksStyle() {
    var _this;

    _classCallCheck(this, AwesomeBlocksStyle);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(AwesomeBlocksStyle).apply(this, arguments));
    _this.options = {};
    _this.background = {};
    _this.state = {
      justUpdate: 'id'
    };

    var style = _this.getValue();

    var inlineStyle = _this.styleToObject(style);

    var background = {
      backgroundColor: true,
      backgroundImage: true,
      backgroundRepeat: true,
      backgroundSize: true
    };
    inlineStyle && Object.keys(inlineStyle).map(function (index) {
      _this.options[index] = inlineStyle[index];

      if (background[index]) {
        _this.background[index] = inlineStyle[index];
      }
    });
    _this.units = {
      marginUnit: _this.getUnit(_this.options.marginTop) || 'px',
      paddingUnit: _this.getUnit(_this.options.paddingTop) || 'px',
      radiusUnit: _this.getUnit(_this.options.borderRadius) || 'px',
      fontSizeUnit: _this.getUnit(_this.options.fontSize) || 'px'
    };
    if (_this.options.borderBottomWidth || _this.options.borderLeftWidth || _this.options.borderRightWidth || _this.options.borderTopWidth) _this.border = true;else _this.border = false;
    _this.setOption = _this.setOption.bind(_assertThisInitialized(_this));
    _this.bgChange = _this.bgChange.bind(_assertThisInitialized(_this));
    _this.onEvent = _this.onEvent.bind(_assertThisInitialized(_this));
    _this.propsChange = _this.propsChange.bind(_assertThisInitialized(_this));
    _this.changeUnit = _this.changeUnit.bind(_assertThisInitialized(_this)); // this.styleToString = this.styleToString.bind(this)
    // this.styleToObject = this.styleToObject.bind(this)

    return _this;
  }
  /**
   * set classes array
   * @param {object} options
   */


  _createClass(AwesomeBlocksStyle, [{
    key: "setOption",
    value: function setOption(value, id) {
      if (value === '' || value === null || typeof value === 'undefined') delete this.options[id];else this.options[id] = value;

      if (this.options.borderBottomWidth || this.options.borderLeftWidth || this.options.borderRightWidth || this.options.borderTopWidth) {
        this.border = true;
      } else {
        delete this.options.borderStyle;
        delete this.options.borderColor;
        this.border = false;
      }

      this.propsChange();
    }
    /**
     * { function_description }
     *
     * @param      {<type>}  event   The event
     */

  }, {
    key: "onEvent",
    value: function onEvent(event) {
      var value = event.currentTarget.value;
      var id = event.currentTarget.id;
      this.setOption(value, id);
    }
    /**
     * background change
     *
     * @param      {<type>}  background  The background
     */

  }, {
    key: "bgChange",
    value: function bgChange(background) {
      var _this2 = this;

      var backgroundStyle = {
        backgroundColor: true,
        backgroundImage: true,
        backgroundRepeat: true,
        backgroundSize: true
      };

      if (background) {
        Object.keys(backgroundStyle).map(function (index) {
          delete _this2.options[index];
        });
        Object.keys(background).map(function (index) {
          if (background[index]) {
            _this2.options[index] = background[index];
          } else {
            delete _this2.options[index];
          }
        });
      }

      this.propsChange();
    }
    /**
     * { function_description }
     */

  }, {
    key: "propsChange",
    value: function propsChange() {
      var _this3 = this;

      var options = this.options;
      var inlineStyle = {};
      Object.keys(options).map(function (index) {
        if (options[index] !== '' && options[index] !== null && typeof options[index] !== 'undefined') {
          inlineStyle[index] = options[index];

          if (_this3.removeUnit(options[index])) {
            if (index.indexOf('margin') > -1) inlineStyle[index] = _this3.removeUnit(options[index]) + _this3.units.marginUnit;else if (index.indexOf('padding') > -1) inlineStyle[index] = _this3.removeUnit(options[index]) + _this3.units.paddingUnit;else if (index.indexOf('radius') > -1) inlineStyle[index] = _this3.removeUnit(options[index]) + _this3.units.radiusUnit;else if (index.indexOf('fontSize') > -1) inlineStyle[index] = _this3.removeUnit(options[index]) + _this3.units.fontSizeUnit;else if (index.indexOf('border') > -1 && index !== 'borderColor') inlineStyle[index] = _this3.removeUnit(options[index]) + 'px';
          }
        }
      });

      if (typeof window.AwesomeBlocks.inlineStyle === 'undefined') {
        window.AwesomeBlocks.inlineStyle = {};
      }

      var style = window.AwesomeBlocks.inlineStyle;

      if (this.props.elementID && this.props.elementStyle) {
        style[this.props.elementID] = {
          element: this.props.elementStyle,
          style: this.styleToString(inlineStyle)
        };
        window.AwesomeBlocks.inlineStyle = style; // styleInput.value = JSON.stringify( style )
        // styleInput.textContent = styleInput.value

        this.setState({
          justUpdate: 'id'
        });
      }
    }
    /**
     * get style value from textarea
     *
     * @return     {string}  The style value.
     */

  }, {
    key: "getValue",
    value: function getValue() {
      var style = window.AwesomeBlocks.inlineStyle || {};
      var inlineStyle = this.props.elementID && style ? style[this.props.elementID] : {};
      return inlineStyle && typeof inlineStyle.style === 'string' ? inlineStyle.style : {}; // const inlineStyle = this.props.elementID && style ? style[ this.props.elementID ] : {}
      // return inlineStyle && typeof inlineStyle.style === 'string' ? inlineStyle.style : {}
    }
    /**
     *
     * @param {number} num
     * @param {string} unit
     */

  }, {
    key: "addUnit",
    value: function addUnit(num, unit) {
      // if ( ! num || ! unit ) return
      num = parseFloat(num);
      return !num || num === 'NaN' ? '' : num + unit;
    }
    /**
     * get nnit value
     * @param {string} string
     */

  }, {
    key: "getUnit",
    value: function getUnit(string) {
      return string && string.replace ? string.replace(/\d+|^\s+|\s+$/g, '').replace(/\./g, '') : '';
    }
    /**
     * Remove unit from numbers
     * @param {string} num
     */

  }, {
    key: "removeUnit",
    value: function removeUnit(num) {
      if (!num) return;
      var newNum = parseFloat(num);
      return newNum !== 'undefined' ? newNum : '';
    }
    /**
     * { function_description }
     *
     * @param      {<type>}  event   The event
     */

  }, {
    key: "changeUnit",
    value: function changeUnit(event) {
      this.units[event.currentTarget.id] = event.currentTarget.value;
      this.propsChange();
    }
    /**
     * render units HTML
     * @param {string} id
     */

  }, {
    key: "unitsHTML",
    value: function unitsHTML(id, value) {
      return React.createElement("select", {
        id: id,
        className: "unit",
        value: this.getUnit(value),
        onChange: this.changeUnit
      }, React.createElement("option", {
        value: "px"
      }, "px"), React.createElement("option", {
        value: "em"
      }, "em"), React.createElement("option", {
        value: "rem"
      }, "rem"), id !== 'fontSizeUnit' && React.createElement(Fragment, null, React.createElement("option", {
        value: "%"
      }, "%")));
    }
    /**
     * convert style string to object
     *
     * @param      {<type>}                         style   The style
     * @return     {(Array|Object|boolean|string)}  { description_of_the_return_value }
     */

  }, {
    key: "styleToObject",
    value: function styleToObject(style) {
      if (!style) return;
      if (_typeof(style) === 'object') return style;
      var result = {};
      var element = document.createElement('I');
      element.setAttribute('style', style);
      var elementStyle = element.style;
      element.remove();
      allowedStyle.forEach(function (el) {
        // let s = elementStyle[el].indexOf('-') > -1 ? elementStyle[el].replace(/(-.)/g,function(x){return x[1].toUpperCase()}) : elementStyle[el]
        if (el && elementStyle[el]) {
          // let s = elementStyle[el]
          result[el] = elementStyle[el];
        }
      });
      return result;
    }
    /**
     * convert style object to string
     *
     * @param      {string}  style   The style
     */

  }, {
    key: "styleToString",
    value: function styleToString(style) {
      var result = '';
      var css = document.createElement('I');
      Object.keys(style).map(function (index) {
        css.style[index] = style[index];
      });
      result = css.getAttribute('style');
      css.remove();
      return result;
    }
    /**
     *
     */

  }, {
    key: "render",
    value: function render() {
      var _this4 = this;

      var _this$options = this.options,
          marginTop = _this$options.marginTop,
          borderStyle = _this$options.borderStyle,
          marginRight = _this$options.marginRight,
          marginBottom = _this$options.marginBottom,
          marginLeft = _this$options.marginLeft,
          borderTopWidth = _this$options.borderTopWidth,
          borderRightWidth = _this$options.borderRightWidth,
          borderBottomWidth = _this$options.borderBottomWidth,
          borderLeftWidth = _this$options.borderLeftWidth,
          paddingTop = _this$options.paddingTop,
          paddingRight = _this$options.paddingRight,
          paddingBottom = _this$options.paddingBottom,
          paddingLeft = _this$options.paddingLeft;
      var _this$options2 = this.options,
          borderColor = _this$options2.borderColor,
          borderRadius = _this$options2.borderRadius,
          fontSize = _this$options2.fontSize,
          color = _this$options2.color,
          opacity = _this$options2.opacity;
      var _this$units = this.units,
          marginUnit = _this$units.marginUnit,
          paddingUnit = _this$units.paddingUnit,
          radiusUnit = _this$units.radiusUnit,
          fontSizeUnit = _this$units.fontSizeUnit; // const getUnit = (string) => this.getUnit(string)
      // const removeUnit = (num) => this.removeUnit(num)

      return React.createElement("div", {
        className: "awesome-blocks-styles"
      }, React.createElement("div", null, React.createElement(_react_fieldset__WEBPACK_IMPORTED_MODULE_0__["default"], {
        key: "layoutoptions",
        title: __('Layout options', 'awesome-blocks'),
        iconClass: "fa fa-search-plus"
      }, React.createElement("div", {
        className: "layout"
      }, React.createElement("div", {
        className: "margin"
      }, React.createElement("label", {
        htmlFor: "marginTop"
      }, __('Margin', 'awesome-blocks')), React.createElement("input", {
        id: "marginTop",
        min: "-1000",
        max: "1000",
        type: "number",
        className: "margin_top",
        value: this.removeUnit(marginTop),
        onChange: this.onEvent
      }), this.unitsHTML('marginUnit', marginUnit), React.createElement("input", {
        id: "marginRight",
        min: "-1000",
        max: "1000",
        type: "number",
        className: "margin_right",
        value: this.removeUnit(marginRight),
        onChange: this.onEvent
      }), React.createElement("input", {
        id: "marginBottom",
        min: "-1000",
        max: "1000",
        type: "number",
        className: "margin_bottom",
        value: this.removeUnit(marginBottom),
        onChange: this.onEvent
      }), React.createElement("input", {
        id: "marginLeft",
        min: "-1000",
        max: "1000",
        type: "number",
        className: "margin_left",
        value: this.removeUnit(marginLeft),
        onChange: this.onEvent
      }), React.createElement("div", {
        className: "border"
      }, React.createElement("label", {
        htmlFor: "borderTopWidth"
      }, __('Border', 'awesome-blocks')), React.createElement("input", {
        id: "borderTopWidth",
        min: "0",
        max: "20",
        type: "number",
        className: "border_top_width",
        value: this.removeUnit(borderTopWidth),
        onChange: this.onEvent
      }), React.createElement("span", {
        className: "unit"
      }, "PX"), React.createElement("input", {
        id: "borderRightWidth",
        min: "0",
        max: "20",
        type: "number",
        className: "border_right_width",
        value: this.removeUnit(borderRightWidth),
        onChange: this.onEvent
      }), React.createElement("input", {
        id: "borderBottomWidth",
        min: "0",
        max: "20",
        type: "number",
        className: "border_bottom_width",
        value: this.removeUnit(borderBottomWidth),
        onChange: this.onEvent
      }), React.createElement("input", {
        id: "borderLeftWidth",
        min: "0",
        max: "20",
        type: "number",
        className: "border_left_width",
        value: this.removeUnit(borderLeftWidth),
        onChange: this.onEvent
      }), React.createElement("div", {
        className: "padding"
      }, React.createElement("label", {
        htmlFor: "paddingTop"
      }, __('Padding', 'awesome-blocks')), React.createElement("input", {
        id: "paddingTop",
        min: "0",
        max: "1000",
        type: "number",
        className: "padding_top",
        value: this.removeUnit(paddingTop),
        onChange: this.onEvent
      }), this.unitsHTML('paddingUnit', paddingUnit), React.createElement("input", {
        id: "paddingRight",
        min: "0",
        max: "1000",
        type: "number",
        className: "padding_right",
        value: this.removeUnit(paddingRight),
        onChange: this.onEvent
      }), React.createElement("input", {
        id: "paddingBottom",
        min: "0",
        max: "1000",
        type: "number",
        className: "padding_bottom",
        value: this.removeUnit(paddingBottom),
        onChange: this.onEvent
      }), React.createElement("input", {
        id: "paddingLeft",
        min: "0",
        max: "1000",
        type: "number",
        className: "padding_left",
        value: this.removeUnit(paddingLeft),
        onChange: this.onEvent
      }), React.createElement("div", {
        className: "content"
      })))))), React.createElement(_react_fieldset__WEBPACK_IMPORTED_MODULE_0__["default"], {
        key: "borderoptions",
        title: __('Border options', 'awesome-blocks'),
        iconClass: "fa fa-search-plus"
      }, React.createElement(RangeControl, {
        label: __('Border radius', 'awesome-blocks'),
        id: "fontSize",
        className: "with_unit",
        value: this.removeUnit(borderRadius),
        onChange: function onChange(value) {
          return _this4.setOption(value, 'borderRadius');
        },
        min: 0,
        max: 100
      }), React.createElement("div", {
        className: "unit_container for_range"
      }, this.unitsHTML('radiusUnit', radiusUnit)), this.border && React.createElement("div", null, React.createElement(PanelColorSettings, {
        id: "borderColor",
        title: __('Border color', 'awesome-blocks'),
        initialOpen: false,
        disableAlpha: false,
        colorSettings: [{
          label: __('Border Color', 'awesome-blocks'),
          value: borderColor,
          onChange: function onChange(value) {
            return _this4.setOption(value, 'borderColor');
          }
        }]
      }), React.createElement("select", {
        id: "borderStyle",
        value: borderStyle // onChange={ this.setStyle }
        ,
        onChange: this.onEvent
      }, React.createElement("option", {
        value: ""
      }, __('Border style', 'awesome-blocks')), React.createElement("option", {
        value: "solid"
      }, __('Solid', 'awesome-blocks')), React.createElement("option", {
        value: "dashed"
      }, __('Dashed', 'awesome-blocks')), React.createElement("option", {
        value: "dotted"
      }, __('Dotted', 'awesome-blocks')), React.createElement("option", {
        value: "double"
      }, __('Double', 'awesome-blocks')), React.createElement("option", {
        value: "groove"
      }, __('Groove', 'awesome-blocks')), React.createElement("option", {
        value: "ridge"
      }, __('Ridge', 'awesome-blocks')))))), React.createElement("div", null, React.createElement(_react_fieldset__WEBPACK_IMPORTED_MODULE_0__["default"], {
        key: "fontoptions",
        title: __('Font options', 'awesome-blocks'),
        iconClass: "fa fa-search-plus"
      }, React.createElement(RangeControl, {
        label: __('Font size', 'awesome-blocks'),
        id: "fontSize",
        className: "with_unit",
        value: this.removeUnit(fontSize),
        onChange: function onChange(value) {
          return _this4.setOption(value, 'fontSize');
        },
        min: 0,
        max: 100
      }), React.createElement("div", {
        className: "unit_container for_range"
      }, this.unitsHTML('fontSizeUnit', fontSizeUnit)), React.createElement(PanelColorSettings, {
        id: "fontColor",
        title: __('Text color', 'awesome-blocks'),
        initialOpen: false,
        colorSettings: [{
          label: __('Text Color', 'awesome-blocks'),
          value: color,
          onChange: function onChange(value) {
            return _this4.setOption(value, 'color');
          }
        }]
      })), React.createElement(_react_fieldset__WEBPACK_IMPORTED_MODULE_0__["default"], {
        key: "Opacity",
        title: __('Opacity', 'awesome-blocks'),
        iconClass: "fa fa-search-plus"
      }, React.createElement(RangeControl, {
        label: __('Opacity', 'awesome-blocks'),
        id: "opacity",
        value: opacity,
        onChange: function onChange(value) {
          return _this4.setOption(value, 'opacity');
        },
        min: 0,
        max: 1,
        step: 0.01 // help="{ help }"

      })), React.createElement(_react_fieldset__WEBPACK_IMPORTED_MODULE_0__["default"], {
        key: "backgroundoptions",
        title: __('Background options', 'awesome-blocks'),
        iconClass: "fa fa-search-plus"
      }, React.createElement(_libs_awesome_blocks_background__WEBPACK_IMPORTED_MODULE_2__["default"], {
        value: this.background,
        onChange: function onChange(value) {
          return _this4.bgChange(value);
        }
      }))));
    }
  }]);

  return AwesomeBlocksStyle;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (AwesomeBlocksStyle);

/***/ }),

/***/ "./src/assets/js/blocks/libs/awesome-blocks-options/index.js":
/*!*******************************************************************!*\
  !*** ./src/assets/js/blocks/libs/awesome-blocks-options/index.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _react_modal_popup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../react-modal-popup */ "./src/assets/js/blocks/libs/react-modal-popup/index.js");
/* harmony import */ var _react_clean_tabs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../react-clean-tabs */ "./src/assets/js/blocks/libs/react-clean-tabs/index.js");
/* harmony import */ var _components_style__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/style */ "./src/assets/js/blocks/libs/awesome-blocks-options/components/style.js");
/* harmony import */ var _components_classes__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/classes */ "./src/assets/js/blocks/libs/awesome-blocks-options/components/classes.js");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./src/assets/js/blocks/libs/awesome-blocks-options/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _helper__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }







/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__;
var _wp2 = wp,
    _wp2$element = _wp2.element,
    Fragment = _wp2$element.Fragment,
    Component = _wp2$element.Component;

var BlocksOptions =
/*#__PURE__*/
function (_Component) {
  _inherits(BlocksOptions, _Component);

  function BlocksOptions() {
    var _this;

    _classCallCheck(this, BlocksOptions);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(BlocksOptions).apply(this, arguments));
    _this.options = {
      classesList: _this.props.value.classesList,
      inlineStyle: _this.props.value.inlineStyle
    };

    if (_this.props.lite === undefined) {
      _this.options.lite = {
        style: false,
        scroll: false,
        hover: false
      };
    } else {
      _this.options.lite = {
        style: _this.props.lite.style || false,
        scroll: _this.props.lite.scroll || false,
        hover: _this.props.lite.hover || false
      };
    }

    _this.setValue = _this.setValue.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(BlocksOptions, [{
    key: "setValue",
    value: function setValue() {
      var classes = this.options.classesList || [];
      var animation = ['awbo-scale-in', 'awbo-scale-out', 'awbo-slide-right', 'awbo-slide-left', 'awbo-slide-up', 'awbo-slide-down', 'awbo-fade-in', 'awbo-fade-out', 'awbo-right-rotation', 'awbo-left-rotation', 'awbo-up-rotation', 'awbo-down-rotation', 'awbo-fixed-bg', 'awbo-parallax-up', 'awbo-parallax-down'];

      for (var _i = 0, _animation = animation; _i < _animation.length; _i++) {
        var animate = _animation[_i];

        if (classes.indexOf(animate) > -1) {
          this.options.classesList.push('awbo-scrolleffects');
          break;
        }
      }

      var value = {
        classesList: classes.join(' '),
        inlineStyle: this.options.inlineStyle
      };
      this.props.onChange(value);
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$options = this.options,
          classesList = _this$options.classesList,
          inlineStyle = _this$options.inlineStyle,
          lite = _this$options.lite;
      return React.createElement(Fragment, null, React.createElement(_react_modal_popup__WEBPACK_IMPORTED_MODULE_0__["default"] // title={ this.props.optionsTitle }
      , {
        title: __('Options', 'awesome-blocks'),
        iconClass: "fa fa-cogs",
        appendTo: "editor",
        onOpen: _helper__WEBPACK_IMPORTED_MODULE_5__["H"].optionsModalOpened,
        onClose: _helper__WEBPACK_IMPORTED_MODULE_5__["H"].optionsModalClosed
      }, React.createElement(_components_classes__WEBPACK_IMPORTED_MODULE_3__["default"], {
        value: classesList,
        onChange: function onChange(v) {
          _this2.options.classesList = v;

          _this2.setValue();
        },
        lite: lite
      })), typeof this.options.inlineStyle !== 'undefined' && React.createElement(Fragment, null, lite.style === true || "lite" === 'pro' ? React.createElement(_react_modal_popup__WEBPACK_IMPORTED_MODULE_0__["default"] // title={ this.props.styleTitle }
      , {
        title: __('Style', 'awesome-blocks'),
        iconClass: "fa fa-paint-brush",
        appendTo: "editor",
        onOpen: _helper__WEBPACK_IMPORTED_MODULE_5__["H"].optionsModalOpened,
        onClose: _helper__WEBPACK_IMPORTED_MODULE_5__["H"].optionsModalClosed
      }, React.createElement("div", null, React.createElement(_components_style__WEBPACK_IMPORTED_MODULE_2__["default"], {
        elementStyle: this.props.elementStyle,
        elementID: this.props.elementID // value={ inlineStyle }
        // onChange={ v => {
        //   this.options.inlineStyle = v
        //   this.setValue()
        // } }

      }))) : ''));
    }
  }]);

  return BlocksOptions;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (BlocksOptions);

/***/ }),

/***/ "./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/index.js":
/*!**************************************************************************************************!*\
  !*** ./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/index.js ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.scss */ "./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_0__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

var Component = wp.element.Component;

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$components = _wp.components,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    RangeControl = _wp$components.RangeControl,
    TextControl = _wp$components.TextControl,
    InspectorControls = _wp.editor.InspectorControls,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    PanelColorSettings = _wp$blockEditor.PanelColorSettings,
    __experimentalPanelColorGradientSettings = _wp$blockEditor.__experimentalPanelColorGradientSettings;

var AwesomeBlocksBackground =
/*#__PURE__*/
function (_Component) {
  _inherits(AwesomeBlocksBackground, _Component);

  function AwesomeBlocksBackground() {
    var _this;

    _classCallCheck(this, AwesomeBlocksBackground);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(AwesomeBlocksBackground).apply(this, arguments));
    _this.options = {};
    var style = _this.props.value;
    style && Object.keys(style).map(function (index) {
      _this.options[index] = style[index];
    }); // this.imageURL = this.options.backgroundImage && this.options.backgroundImage.indexOf('url') > -1 ? this.options.backgroundImage.replace('url("', '').replace('")', '') : ''

    if (_this.options.backgroundImage && _this.options.backgroundImage.indexOf('url') === 0) {
      _this.imageURL = _this.options.backgroundImage.replace('url("', '').replace('")', '');
    } else {
      var _this$options$backgro;

      _this.imageURL = (_this$options$backgro = _this.options.backgroundImage) !== null && _this$options$backgro !== void 0 ? _this$options$backgro : '';
    }

    _this.selectImages = _this.selectImages.bind(_assertThisInitialized(_this));
    _this.bgColor = _this.bgColor.bind(_assertThisInitialized(_this));
    _this.setGradient = _this.setGradient.bind(_assertThisInitialized(_this));
    _this.clearImage = _this.clearImage.bind(_assertThisInitialized(_this));
    _this.setStyle = _this.setStyle.bind(_assertThisInitialized(_this));
    _this.propsChange = _this.propsChange.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(AwesomeBlocksBackground, [{
    key: "selectImages",
    value: function selectImages(event) {
      var _this2 = this;

      event.preventDefault();
      var custom_uploader = wp.media.frames.file_frame = wp.media({
        title: __('Choose Image', 'awesome-blocks')
      });
      custom_uploader.on('select', function () {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        _this2.options.backgroundImage = "url(".concat(attachment.url, ")");
        _this2.imageURL = attachment.url;

        _this2.props.onChange(_this2.options);
      });
      custom_uploader.open();
    }
  }, {
    key: "setStyle",
    value: function setStyle(event) {
      if (event.currentTarget) {
        var id = event.currentTarget.id;
        var value = event.currentTarget.value;

        if (id === 'backgroundImage') {
          this.imageURL = value;

          if (value.indexOf('radial-gradient') === 0 || value.indexOf('linear-gradient') === 0) {
            value = event.currentTarget.value;
          } else {
            value = "url(".concat(event.currentTarget.value, ")");
          }
        }

        if ('' === value || null === value || 'undefined' === typeof value) {
          delete this.options[id];
        } else {
          if (id === 'backgroundSize' && value === 'stretch') {
            value = '100% 100%';
          }

          this.options[id] = value;
        }

        this.propsChange(this.options);
      }
    }
  }, {
    key: "bgColor",
    value: function bgColor(value) {
      if ('' === value || null === value || 'undefined' === typeof value) {
        delete this.options.backgroundColor;
      } else {
        this.options.backgroundColor = value;
      }

      this.propsChange(this.options);
    }
  }, {
    key: "setGradient",
    value: function setGradient(value) {
      if ('' === value || null === value || 'undefined' === typeof value) {
        delete this.options.backgroundImage;
      } else {
        this.options.backgroundImage = value;
        this.imageURL = value;
      }

      this.propsChange(this.options);
    }
  }, {
    key: "clearImage",
    value: function clearImage(event) {
      event.preventDefault();
      this.imageURL = this.options.backgroundImage = this.options.backgroundSize = this.options.backgroundRepeat = "";
      this.propsChange(this.options);
    }
  }, {
    key: "propsChange",
    value: function propsChange(options) {
      var inlineStyle = {};
      Object.keys(options).map(function (index) {
        if (options[index]) {
          inlineStyle[index] = options[index];
        }
      });
      this.props.onChange(inlineStyle);
    }
    /**
     * Renders the object.
     * 
     *
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "render",
    value: function render() {
      var _this3 = this;

      var _background_size = this.options.backgroundSize !== '100% 100%' ? this.options.backgroundSize : 'stretch';

      var AwesomeBlocksBackgroundColor = function AwesomeBlocksBackgroundColor() {
        if (typeof __experimentalPanelColorGradientSettings === 'function') {
          var PanelColorGradientSettings = __experimentalPanelColorGradientSettings;
          return React.createElement(PanelColorGradientSettings, {
            title: __('Background Color', 'awesome-blocks'),
            settings: [{
              label: __('Background Color', 'awesome-blocks'),
              colorValue: _this3.options.backgroundColor,
              onColorChange: _this3.bgColor,
              gradientValue: _this3.options.backgroundImage && _this3.options.backgroundImage.indexOf('gradient') > -1 ? _this3.options.backgroundImage : '',
              onGradientChange: _this3.setGradient
            }]
          });
        } else {
          return React.createElement(PanelColorSettings, {
            id: "backgroundColor",
            title: __('Background Color', 'awesome-blocks'),
            initialOpen: false,
            disableAlpha: false,
            colorSettings: [{
              label: __('Background Color', 'awesome-blocks'),
              value: _this3.options.backgroundColor,
              onChange: _this3.bgColor
            }]
          });
        }
      };

      return React.createElement("div", {
        className: "awesome-blocks-background"
      }, React.createElement(AwesomeBlocksBackgroundColor, null), React.createElement("div", {
        className: "awesome-blocks-bg_button",
        style: _objectSpread({}, this.options)
      }, React.createElement("a", {
        className: "bg_button",
        href: "#",
        onClick: this.selectImages
      }, __('Select Image', 'awesome-blocks')), React.createElement("a", {
        className: "remove",
        href: "#",
        onClick: this.clearImage
      }, "x")), React.createElement("div", {
        className: "background-options"
      }, React.createElement("select", {
        id: "backgroundSize",
        value: _background_size,
        onChange: this.setStyle
      }, React.createElement("option", {
        value: ""
      }, __('Background size', 'awesome-blocks')), React.createElement("option", {
        value: "stretch"
      }, __('stretch', 'awesome-blocks')), React.createElement("option", {
        value: "cover"
      }, __('Cover', 'awesome-blocks')), React.createElement("option", {
        value: "contain"
      }, __('Contain', 'awesome-blocks')), React.createElement("option", {
        value: "initial"
      }, __('Initial', 'awesome-blocks'))), React.createElement("select", {
        id: "backgroundRepeat",
        value: this.options.backgroundRepeat,
        onChange: this.setStyle
      }, React.createElement("option", {
        value: ""
      }, __('Background repeat', 'awesome-blocks')), React.createElement("option", {
        value: "repeat"
      }, __('Repeat', 'awesome-blocks')), React.createElement("option", {
        value: "repeat-x"
      }, __('Repeat X', 'awesome-blocks')), React.createElement("option", {
        value: "repeat-y"
      }, __('Repeat Y', 'awesome-blocks')), React.createElement("option", {
        value: "no-repeat"
      }, __('No repeat', 'awesome-blocks')))), React.createElement("label", {
        htmlFor: "backgroundImage",
        id: "label-backgroundImage"
      }, __('Add image URL or gradient color value', 'awesome-blocks')), React.createElement("input", {
        id: "backgroundImage",
        className: "bg_image",
        type: "text",
        value: this.imageURL,
        placeholder: __('Background Image', 'awesome-blocks'),
        onChange: this.setStyle
      }));
    }
  }]);

  return AwesomeBlocksBackground;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (AwesomeBlocksBackground);

/***/ }),

/***/ "./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/style.scss":
/*!****************************************************************************************************!*\
  !*** ./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/style.scss ***!
  \****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../../../../../node_modules/css-loader/dist/cjs.js!../../../../../../../../node_modules/sass-loader/dist/cjs.js!./style.scss */ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/awesome-blocks-options/libs/awesome-blocks-background/style.scss");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "./src/assets/js/blocks/libs/awesome-blocks-options/style.scss":
/*!*********************************************************************!*\
  !*** ./src/assets/js/blocks/libs/awesome-blocks-options/style.scss ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader/dist/cjs.js!../../../../../../node_modules/sass-loader/dist/cjs.js!./style.scss */ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/awesome-blocks-options/style.scss");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "./src/assets/js/blocks/libs/helper.js":
/*!*********************************************!*\
  !*** ./src/assets/js/blocks/libs/helper.js ***!
  \*********************************************/
/*! exports provided: H */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "H", function() { return H; });
/* harmony import */ var _awesome_blocks_options__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./awesome-blocks-options */ "./src/assets/js/blocks/libs/awesome-blocks-options/index.js");
/* harmony import */ var _openstreetmap__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./openstreetmap */ "./src/assets/js/blocks/libs/openstreetmap/index.js");
/* harmony import */ var _select_icon__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./select-icon */ "./src/assets/js/blocks/libs/select-icon/index.js");
/* harmony import */ var memize__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! memize */ "./node_modules/memize/index.js");
/* harmony import */ var memize__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(memize__WEBPACK_IMPORTED_MODULE_3__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 *  start AwesomeBlocks helper libs
 *
 *
 */




var __ = wp.i18n.__;

var awesomeblocksHelper =
/*#__PURE__*/
function () {
  function awesomeblocksHelper() {
    _classCallCheck(this, awesomeblocksHelper);

    // AwesomeBlocks Blocks version
    this.version = '4.0'; // AwesomeBlocks description

    this.description = 'Gutenberg Blocks allows you to build content.';
    this.memoize = memize__WEBPACK_IMPORTED_MODULE_3___default.a;
    this.BlocksOptions = _awesome_blocks_options__WEBPACK_IMPORTED_MODULE_0__["default"];
    this.SelectIcon = _select_icon__WEBPACK_IMPORTED_MODULE_2__["default"];
    this.OpenStreetMap = _openstreetmap__WEBPACK_IMPORTED_MODULE_1__["default"]; // this.classes = this.getAdditionalCSSClass()
    // binding (this) to awesomeblocksSubscribe() function

    this.awesomeblocksSubscribe = this.awesomeblocksSubscribe.bind(this);
    this.optionsModalOpened = this.optionsModalOpened.bind(this);
    this.optionsModalClosed = this.optionsModalClosed.bind(this);
  }
  /**
   * Gets the pro.
   *
   * @class      GetPro (name)
   * @return     {string}  The pro.
   */


  _createClass(awesomeblocksHelper, [{
    key: "getPro",
    value: function getPro() {
      var args = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

      var sorry = __('Sorry about that. but this feature is unavailable in lite version.', 'awesome-blocks');

      var getIt = __('Get more options', 'awesome-blocks');

      var here = __('from here.', 'awesome-blocks');

      return  false ? undefined : React.createElement("div", null); // return process.env.HB_VERSION === 'pro' ? '' : (
      //   <div className="awesome-blocks-get-pro">
      //     { args.list !== undefined &&
      //       <div>
      //         { sorry }
      //       </div>
      //     }
      //     { getIt }
      //     <a href="https://awesomeblocks.zintathemes.com?blocks=1" target="_blank">
      //       { here }
      //     </a>
      //   </div>
      // )
    }
    /**
     * Subscribe any changes in AwesomeBlocks blocks
     * When copy block this will cange the ID
     *
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "awesomeblocksSubscribe",
    value: function awesomeblocksSubscribe() {
      var _this = this;

      var data = wp.data; // for saving post meta

      var isSavingPost = data.select('core/editor').isSavingPost();
      var isAutosavingPost = data.select('core/editor').isAutosavingPost();

      if (isSavingPost && !isAutosavingPost) {
        // wp.data.select('core/editor').getCurrentPost() // to get post object
        this.save_meta_box();
      }

      var blockList = wp.data.select('core/block-editor').getBlocks();
      if (!blockList.length) return;
      var tempIDs = [];
      /**
       * check for duplicated IDs
       *
       * @param      {array}  blocks  The blocks list
       * @return     {null}
       */

      var checkBlocksID = function checkBlocksID(blocks) {
        blocks.forEach(function (block) {
          if (block.name.indexOf('awesome-blocks') === 0) {
            var n = block.name; // update numOfplans attribute for pricing table block
            // if ( n.indexOf('pricingblocktable') >= 0 ) {
            //   block.attributes.numOfplans = block.innerBlocks.length
            // }

            if (tempIDs.indexOf(block.attributes.id) >= 0) {
              block.attributes.id = _this.generateID(n);
            }

            block.attributes.id && tempIDs.push(block.attributes.id);
          }

          block.innerBlocks.length && checkBlocksID(block.innerBlocks);
        });
      };

      checkBlocksID(blockList); // this.setHeadStyle()
    }
    /**
     * Set the head style.
     *
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "setHeadStyle",
    value: function setHeadStyle() {
      if (typeof window.AwesomeBlocks.inlineStyle === 'undefined') {
        window.AwesomeBlocks.inlineStyle = {};
        return;
      }

      var value = window.AwesomeBlocks.inlineStyle;

      if (Object.keys(value).length === 0) {
        return;
      } // remove unavailable ID's from style object and update hidden style object in textarea to


      var newValue = {};
      var blocksList = this.getBlocks();

      if (blocksList.length) {
        blocksList.forEach(function (block) {
          if (value[block.attributes.id]) {
            newValue[block.attributes.id] = value[block.attributes.id];
          }
        });
        window.AwesomeBlocks.inlineStyle = newValue; // styleInput.value = JSON.stringify(newValue)
      } else {
        newValue = value;
      }

      var css = '';
      Object.keys(newValue).forEach(function (index) {
        css = "".concat(css, " ").concat(newValue[index]['element'], " { ").concat(newValue[index]['style'], " }");
      });
      var id = 'awesome-blocks-head-style';
      var head = document.head || document.getElementsByTagName('head')[0];
      var style = document.getElementById(id); // if there is no style in head then create one

      if (!style) {
        style = document.createElement('style');
        head.appendChild(style);
        style.type = 'text/css';
        style.id = id;
      }

      if (css) {
        style.textContent = css;
      }

      var styleInput = document.getElementById('awesome-blocks_inline_style');

      if (styleInput) {
        styleInput.value = css;
      }
    }
    /**
     * Gets blocks list.
     *
     * @return     {<type>}  The blocks.
     */

  }, {
    key: "getBlocks",
    value: function getBlocks() {
      var editor = wp.data.select('core/block-editor');
      var blocks = editor.getBlocks();
      if (!blocks.length) return [];
      var gutenBlocks = [];

      var blocksList = function blocksList(blocks) {
        blocks.length && blocks.forEach(function (block) {
          block.name.indexOf('awesome-blocks') === 0 && gutenBlocks.push({
            name: block.name,
            clientId: block.clientId,
            attributes: block.attributes
          });
          var inner = block.innerBlocks;
          inner.length && blocksList(inner);
        });
      };

      blocksList(blocks);
      return gutenBlocks;
    }
    /**
     * do any actions when options modal is opend
     */

  }, {
    key: "optionsModalOpened",
    value: function optionsModalOpened() {}
    /**
     * do any actions when options modal is closed
     */

  }, {
    key: "optionsModalClosed",
    value: function optionsModalClosed() {
      this.setHeadStyle();
    }
    /**
     * Saves a meta box.
     *
     */

  }, {
    key: "save_meta_box",
    value: function save_meta_box() {
      // add ;
      var data = window.AwesomeBlocks;

      (function ($, window, document) {
        $(document).ready(function () {
          $.post(data.ajaxurl, {
            action: 'awesome_blocks_inlinestyle',
            nonce: data.nonce,
            id: data.id,
            style_array: data.inlineStyle || {}
          }, function (output) {
            if (output !== 'success') {
              console.log("Can't save Awesome Blocks meta data");
            }
          });
        });
      })(jQuery, window, document);
    }
    /**
     * generate Block ID based from block name
     *
     * @param      {string}  name    The block name
     * @return     {string}  generated ID
     */

  }, {
    key: "generateID",
    value: function generateID(name) {
      var input = document.getElementById('post_ID');
      var n = name.replace('awesome-blocks/', 'awbo-') || 'awbo-';
      var v = input.value || Math.floor(Math.random() * 999 + 111);
      var g = Math.floor(Math.random() * 999 + 111);
      return "".concat(n + v, "-").concat(g);
    }
    /**
     * generat ID of block
     *
     * @param      {string}  name           The name
     * @param      {string}          id             The identifier
     * @param      {Function}        setAttributes  The set attributes
     * @return     {string}          return generator ID
     */

  }, {
    key: "blockID",
    value: function blockID(id, name, setAttributes) {
      if (!name || !setAttributes || id) return id;
      var ID = this.generateID(name);
      ID && setAttributes({
        id: ID
      });
      return ID;
    }
    /**
     * generate class name for blocks
     *
     * @param      {string}  name    The name of block
     * @return     {string}          return class name from block name
     */

  }, {
    key: "generateClass",
    value: function generateClass(name) {
      return name.replace('/', '-') || 'awsb-' + Math.floor(Math.random() * 999 + 111);
    }
    /**
     * AwesomeBlocks Icon style
     *
     * @param      {<type>}                         icon    The icon
     * @param      {<type>}                         color   The color
     * @return     {(Array|Object|boolean|string)}  { description_of_the_return_value }
     */

  }, {
    key: "iconStyle",
    value: function iconStyle(icon) {
      var color = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
      var rotate = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '0deg';
      if (!icon) return;

      var _require = __webpack_require__(/*! @iconify/react */ "./node_modules/@iconify/react/dist/icon.js"),
          Icon = _require.Icon;

      var blockIcon = _typeof(icon) === 'object' && !icon.type ? React.createElement(Icon, {
        icon: icon,
        color: color,
        rotate: rotate
      }) : icon; /// return value

      return {
        background: '#D2FFFF',
        // background: 'linear-gradient(#000000, #ffffff)',
        foreground: '#0088DD',
        // fill: '#FF0000',
        // color: '#FF0000',
        src: blockIcon
      };
    }
  }, {
    key: "getAdditionalCSSClass",
    value: function getAdditionalCSSClass() {
      var classes = document.getElementById('inspector-text-control-1');
      classes && classes.addEventListener('change', function () {});
    }
    /**
     * check if color is dark or light
     *
     * @param      {<type>}                  color   The color
     * @param      {(boolean|string)}        hex     The hexadecimal
     * @return     {(Array|boolean|string)}  True if color light, False otherwise.
     */

  }, {
    key: "isColorLight",
    value: function isColorLight(color) {
      var hex = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      if (!color) return false;
      var r, g, b, bigint;

      if (hex) {
        bigint = parseInt(color, 16);
        r = bigint >> 16 & 255;
        g = bigint >> 8 & 255;
        b = bigint & 255;
      } else {
        r = color.r;
        g = color.g;
        b = color.b;
      }

      var value = Math.sqrt(r * r * 0.299 + g * g * 0.587 + b * b * 0.114);
      return value < 130;
    }
    /**
     * Convert HEX color to RGB
     *
     * @param      {string}                  hex      The hexadecimal
     * @param      {<type>}                  opacity  The opacity
     * @return     {(Array|boolean|string)}  { description_of_the_return_value }
     */

  }, {
    key: "hexToRgb",
    value: function hexToRgb(hex, opacity) {
      return 'rgba(' + (hex = hex.replace('#', '')).match(new RegExp('(.{' + hex.length / 3 + '})', 'g')).map(function (l) {
        return parseInt(hex.length % 2 ? l + l : l, 16);
      }).concat(opacity || 1).join(',') + ')';
    }
    /**
     * Convert RBG color to HEX
     *
     * @param      {<type>}           r       { parameter_description }
     * @param      {<type>}           g       { parameter_description }
     * @param      {<type>}           b       { parameter_description }
     * @return     {(Array|boolean)}  { description_of_the_return_value }
     */

  }, {
    key: "rgbToHex",
    value: function rgbToHex(r, g, b) {
      return '#' + [r, g, b].map(function (x) {
        return x.toString(16).padStart(2, '0');
      }).join('');
    }
    /**
     * The CSS preprocessors Sass and LESS can take any color and darken() or lighten() it by a specific value.
     * But no such ability is built into JavaScript.
     * This function takes colors in hex format (i.e. #F06D06, with or without hash)
     * and lightens or darkens them with a value.
     * source https://css-tricks.com/snippets/javascript/lighten-darken-color/
     *
     * @param      {string}                    col     The col
     * @param      {(Function|number|string)}  amt     The amount
     * @return     {(Array|boolean)}           { description_of_the_return_value }
     */

  }, {
    key: "lightenAndDarken",
    value: function lightenAndDarken() {
      var col = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '#000000';
      var amt = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '0';
      if (typeof col === 'undefined' || typeof amt === 'undefined') return '';
      var usePound = false;

      if (col[0] === '#') {
        col = col.slice(1);
        usePound = true;
      }

      var R = parseInt(col.substring(0, 2), 16);
      var G = parseInt(col.substring(2, 4), 16);
      var B = parseInt(col.substring(4, 6), 16); // to make the colour less bright than the input
      // change the following three "+" symbols to "-"

      R = R + amt;
      G = G + amt;
      B = B + amt;
      if (R > 255) R = 255;else if (R < 0) R = 0;
      if (G > 255) G = 255;else if (G < 0) G = 0;
      if (B > 255) B = 255;else if (B < 0) B = 0;
      var RR = R.toString(16).length === 1 ? '0' + R.toString(16) : R.toString(16);
      var GG = G.toString(16).length === 1 ? '0' + G.toString(16) : G.toString(16);
      var BB = B.toString(16).length === 1 ? '0' + B.toString(16) : B.toString(16);
      return (usePound ? '#' : '') + RR + GG + BB;
    }
    /**
     * check clasessList and remove unregesterd classes
     *
     * @param      {(Array|string|string[])}  classes  The classes
     * @return     {string[]}                 clean classes
     */

  }, {
    key: "classesClean",
    value: function classesClean(classes) {
      if (!classes) return;
      var AwesomeBlocksclasses = ['awbo-visible-sm', 'awbo-hidden-sm', 'awbo-visible-md', 'awbo-hidden-md', 'awbo-visible-lg', 'awbo-hidden-lg', 'awbo-visible-Xlg', 'awbo-hidden-Xlg', 'awbo-scale-in', 'awbo-scale-out', 'awbo-slide-right', 'awbo-slide-left', 'awbo-slide-up', 'awbo-slide-down', 'awbo-fade-in', 'awbo-fade-out', 'awbo-right-rotation', 'awbo-left-rotation', 'awbo-up-rotation', 'awbo-down-rotation', 'awbo-fixed-bg', 'awbo-parallax-up', 'awbo-parallax-down', 'awbo-hover-bg-zoomin', 'awbo-hover-bg-zoomout', 'awbo-hover-shadow', 'awbo-hover-scalein', 'awbo-hover-scaleout', 'awbo-hover-visibility-inc', 'awbo-hover-visibility-dec', 'awbo-text-left', 'awbo-text-right', 'awbo-text-center', 'awbo-text-justify', 'awbo-center-sm', 'awbo-center-md', 'awbo-center-lg', 'awbo-scrolleffects', 'awbo-scroll_duration_0', 'awbo-scroll_duration_5', 'awbo-scroll_duration_10', 'awbo-scroll_duration_15', 'awbo-scroll_duration_20', 'awbo-scroll_duration_25', 'awbo-scroll_duration_30', 'awbo-scroll_duration_35', 'awbo-scroll_duration_40', 'awbo-scroll_duration_45', 'awbo-scroll_duration_50', 'awbo-scroll_duration_55', 'awbo-scroll_duration_60', 'awbo-scroll_duration_65', 'awbo-scroll_duration_70', 'awbo-scroll_duration_75', 'awbo-scroll_duration_80', 'awbo-scroll_duration_85', 'awbo-scroll_duration_90', 'awbo-scroll_duration_95', 'awbo-scroll_duration_100', 'awbo-scroll_easing_ease', 'awbo-scroll_easing_linear', 'awbo-scroll_easing_ease-in', 'awbo-scroll_easing_ease-out', 'awbo-scroll_easing_ease-in-out', 'awbo-scroll_easing_easeInQuad', 'awbo-scroll_easing_easeInCubic', 'awbo-scroll_easing_easeInQuart', 'awbo-scroll_easing_easeInQuint', 'awbo-scroll_easing_easeInSine', 'awbo-scroll_easing_easeInExpo', 'awbo-scroll_easing_easeInCirc', 'awbo-scroll_easing_easeInBack', 'awbo-scroll_easing_easeOutQuad', 'awbo-scroll_easing_easeOutCubic', 'awbo-scroll_easing_easeOutQuart', 'awbo-scroll_easing_easeOutQuint', 'awbo-scroll_easing_easeOutSine', 'awbo-scroll_easing_easeOutExpo', 'awbo-scroll_easing_easeOutCirc', 'awbo-scroll_easing_easeOutBack', 'awbo-scroll_easing_easeInOutQuad', 'awbo-scroll_easing_easeInOutCubic', 'awbo-scroll_easing_easeInOutQuart', 'awbo-scroll_easing_easeInOutQuint', 'awbo-scroll_easing_easeInOutSine', 'awbo-scroll_easing_easeInOutExpo', 'awbo-scroll_easing_easeInOutCirc', 'awbo-scroll_easing_easeInOutBack'];
      var array = [];
      classes = classes.split(' ');
      AwesomeBlocksclasses.map(function (i) {
        classes.indexOf(i) > -1 && array.push(i);
      });
      return array.join(' ');
    }
    /**
     * set classes
     *
     * @param      {Array}     args    The arguments
     * @return     {string[]}  classes
     */

  }, {
    key: "gutenClasses",
    value: function gutenClasses() {
      var _this2 = this;

      var classes = [];

      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      args.forEach(function (arg) {
        var argType = _typeof(arg);

        if (argType === 'string' || argType === 'number') {
          classes.push(arg.trim());
        } else if (Array.isArray(arg) && arg.length) {
          arg.forEach(function (index) {
            return typeof index === 'string' && classes.push(index.trim());
          });
        } else if (argType === 'object' && !Array.isArray(arg)) {
          Object.keys(arg).forEach(function (index) {
            if (index === 'classesList') {
              var clean = _this2.classesClean(arg[index]);

              clean && classes.push(clean.trim());
            } else if (arg[index]) {
              classes.push(index.trim());
            }
          });
        }
      });
      return classes.join(' ');
    }
  }]);

  return awesomeblocksHelper;
}();

var H = new awesomeblocksHelper();

/***/ }),

/***/ "./src/assets/js/blocks/libs/openstreetmap/index.js":
/*!**********************************************************!*\
  !*** ./src/assets/js/blocks/libs/openstreetmap/index.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react_dom_server__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react-dom/server */ "./node_modules/react-dom/server.browser.js");
/* harmony import */ var react_dom_server__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react_dom_server__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var dom_scroll_into_view__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! dom-scroll-into-view */ "./node_modules/dom-scroll-into-view/dist-web/index.js");
/* harmony import */ var _helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/assets/js/blocks/libs/openstreetmap/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_3__);
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

// import React from 'react'




/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    RangeControl = _wp$components.RangeControl,
    SelectControl = _wp$components.SelectControl,
    TextareaControl = _wp$components.TextareaControl,
    AlignmentToolbar = _wp.editor.AlignmentToolbar,
    _wp$blockEditor = _wp.blockEditor,
    ColorPalette = _wp$blockEditor.ColorPalette,
    InspectorControls = _wp$blockEditor.InspectorControls,
    InnerBlocks = _wp.blockEditor.InnerBlocks;

var openStreetMap =
/*#__PURE__*/
function (_React$Component) {
  _inherits(openStreetMap, _React$Component);

  function openStreetMap() {
    var _this;

    _classCallCheck(this, openStreetMap);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(openStreetMap).apply(this, arguments));
    _this.state = {
      id: _this.props.id,
      zoom: _this.props.zoom,
      latitude: _this.props.latitude,
      longitude: _this.props.longitude,
      markers: _this.props.markers,
      isChanged: false,
      isfullScreen: false,
      eventListener: false
    };
    _this.editMarkerRef = React.createRef();
    _this.containerRef = React.createRef();
    _this.mapRef = React.createRef();
    _this.loadingContainerRef = React.createRef();
    _this.fullScreen = _this.fullScreen.bind(_assertThisInitialized(_this));
    _this.loadMap = _this.loadMap.bind(_assertThisInitialized(_this));
    _this.saveMap = _this.saveMap.bind(_assertThisInitialized(_this));
    _this.addMarker = _this.addMarker.bind(_assertThisInitialized(_this));
    _this.updateMap = _this.updateMap.bind(_assertThisInitialized(_this));
    _this.markerIcon = _this.markerIcon.bind(_assertThisInitialized(_this));
    _this.editMarker = _this.editMarker.bind(_assertThisInitialized(_this)); // this.markerclick = this.markerclick.bind( this )

    _this.closeEditor = _this.closeEditor.bind(_assertThisInitialized(_this));
    _this.saveChanges = _this.saveChanges.bind(_assertThisInitialized(_this));
    _this.removeMarker = _this.removeMarker.bind(_assertThisInitialized(_this));
    _this.markerChange = _this.markerChange.bind(_assertThisInitialized(_this));
    _this.markerDragged = _this.markerDragged.bind(_assertThisInitialized(_this));
    _this.createMapProps = _this.createMapProps.bind(_assertThisInitialized(_this));
    return _this;
  }
  /**
   * call append modal functionat first
   * 
   */


  _createClass(openStreetMap, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var clientId = this.props.clientId;
      this.extentNode = document.querySelector('[data-block="' + clientId + '"]');
      this.scrollContainer = wp.dom.getScrollContainer(this.extentNode);
      this.createMapProps();
    }
    /**
     * call append modal functionat first
     * 
     */

  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate() {
      this.loadMap();
    }
    /**
     * handel fullscreen
     * 
     */

  }, {
    key: "fullScreen",
    value: function fullScreen() {
      var _this2 = this;

      if (!Element.prototype.requestFullscreen) {
        Element.prototype.requestFullscreen = Element.prototype.mozRequestFullscreen || Element.prototype.webkitRequestFullscreen || Element.prototype.msRequestFullscreen;
      }

      if (!document.exitFullscreen) {
        document.exitFullscreen = document.mozExitFullscreen || document.webkitExitFullscreen || document.msExitFullscreen;
      }

      var container = this.containerRef.current; // check if fullscreen or not.

      var isFullscreen = function isFullscreen() {
        return document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement;
      };

      var enterFullscreen = function enterFullscreen() {
        if (container.requestFullscreen) {
          container.requestFullscreen();
          return true;
        }
      };

      var exitFullscreen = function exitFullscreen() {
        if (document.exitFullscreen) {
          document.exitFullscreen();
          return false;
        }
      };

      var fullscreenEvent = function fullscreenEvent() {
        if (isFullscreen()) {
          container.parentElement.classList.add('fullScreen-activated');
          _this2.scrollContainer.style.overflow = 'hidden';
          Object(dom_scroll_into_view__WEBPACK_IMPORTED_MODULE_1__["default"])(_this2.extentNode, _this2.scrollContainer, {
            offsetTop: -300,
            alignWithLeft: true,
            alignWithTop: true
          });
        } else {
          container.parentElement.classList.remove('fullScreen-activated');
          _this2.scrollContainer.style.overflow = null;
        }
      };

      if (!this.state.eventListener) {
        container.addEventListener('fullscreenchange', fullscreenEvent);
        this.setState({
          eventListener: true
        });
      }

      return new Promise(function (resolve, reject) {
        if (!isFullscreen()) enterFullscreen();else exitFullscreen();
      });
    }
    /**
     * This method is called when a component
     * is being removed from the DOM:
     * 
     */

  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      return;
    }
  }, {
    key: "createMapProps",
    value: function createMapProps() {
      var _this$props$attrs = this.props.attrs,
          id = _this$props$attrs.id,
          zoom = _this$props$attrs.zoom,
          latitude = _this$props$attrs.latitude,
          longitude = _this$props$attrs.longitude,
          markers = _this$props$attrs.markers;
      if (!id || !latitude || !longitude || !zoom) return;

      if ('object' !== _typeof(window.AwesomeBlocks.openstreetmap)) {
        window.AwesomeBlocks['openstreetmap'] = {};
        window.AwesomeBlocks.openstreetmap.list = {};
      } // let markerDoms = document.getElementById( bodyId )


      var markerDoms = window.AwesomeBlocks.openstreetmap[id];

      if (!markerDoms) {
        markerDoms = document.createElement('div'); // markerDoms.classList.add( 'awesome-blocks-map-marker-body' )

        markerDoms.innerHTML = markers;
        markerDoms.setAttribute('data-zoom', zoom);
        markerDoms.setAttribute('data-latitude', latitude);
        markerDoms.setAttribute('data-longitude', longitude); // document.body.appendChild( markerDoms )
      }

      var markerDom = markerDoms.querySelectorAll('.awesome-blocks-map-marker');
      markerDom && markerDom.forEach(function (markerElement, i) {
        markerElement.setAttribute('data-key', "mark-".concat(i));
      });
      window.AwesomeBlocks.openstreetmap[id] = markerDoms;
      this.loadMap();
    }
    /**
     * Loads a map.
     *
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "loadMap",
    value: function loadMap() {
      var _this3 = this;

      try {
        window.AwesomeBlocks.openstreetmap;
      } catch (_unused) {
        console.log('Gutenberg Blocks Map ERROR01');
        return;
      }

      var attrs = this.props.attrs;
      var id = attrs.id;
      var map = this.mapRef.current;

      if (!id || !attrs || !map) {
        return;
      }

      var ABMap;
      var mapIsAdded = true;

      if (!window.AwesomeBlocks.openstreetmap.list[id]) {
        ABMap = new L.map(map, {
          scrollWheelZoom: false
        });
        window.AwesomeBlocks.openstreetmap.list[id] = ABMap;
      } else {
        mapIsAdded = false;
        ABMap = window.AwesomeBlocks.openstreetmap.list[id];
      }

      if (!ABMap) return;
      ABMap.invalidateSize();
      var styles = {
        style1: 'https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png',
        style2: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        style3: 'https://{s}.tile.stamen.com/toner/{z}/{x}/{y}.png',
        style4: 'https://{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.jpg',
        style5: 'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',
        style6: 'https://{s}.tiles.openrailwaymap.org/standard/{z}/{x}/{y}.png'
      };
      var dom = window.AwesomeBlocks.openstreetmap[id];
      var latitude = dom.dataset.latitude;
      var longitude = dom.dataset.longitude;
      var zoom = dom.dataset.zoom;
      var style = attrs.style;
      var customstyle = attrs.customstyle;
      var mapStyle = style === 'customstyle' ? customstyle : styles[style];
      ABMap.eachLayer(function (layer) {
        return ABMap.removeLayer(layer);
      });
      /**
       * show marker
       */
      // let markerDom = this.state.markers.querySelectorAll('.AwesomeBlocks-map-marker')

      var markerDom = dom.querySelectorAll('.awesome-blocks-map-marker');
      markerDom && markerDom.forEach(function (markerElement, i) {
        markerElement.setAttribute('data-key', "key-".concat(i));
        var lat = markerElement.dataset.lat || 0;
        var lng = markerElement.dataset.lng || 0;
        var icon = markerElement.dataset.icon || '';
        var markerColor = markerElement.dataset.markercolor || '#00A4FF';
        var markerSize = markerElement.dataset.markersize || '3';
        var openPopup = markerElement.dataset.openpopup || false;
        var type = markerElement.dataset.type || 'icon1';
        var markerContent = markerElement.innerHTML || '<br/>'; // let markerIcon1 = `<svg viewBox="0 0 12.25 23" id="AwesomeBlocks-map-svg-marker-${id}-${i}" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="AwesomeBlocks-map-svg-shadow-grad-${id}-${i}" x1="0%" y1="0%" x2="0%" y2="100%"><stop style="stop-color:${markerColor};stop-opacity:1" offset="50%"/><stop style="stop-color:${markerColor};stop-opacity:0.4" offset="90%"/></linearGradient><filter height="1.6" y="-0.3" width="1.15" x="-0.06" id="AwesomeBlocks-map-svg-filter-${id}-${i}"><feGaussianBlur stdDeviation="0.5" /></filter></defs><ellipse ry="1" rx="5" cy="21.3" cx="6" style="opacity:0.2;fill:#000000;filter:url(#AwesomeBlocks-map-svg-filter-${id}-${i})"/><path fill="url(#AwesomeBlocks-map-svg-shadow-grad-${id}-${i})" d="m 6.1284166,0 c -3.3836036,2e-5 -6.12656623,2.74529 -6.12662993,6.1318 3.3671e-4,2.08169 1.05587353,4.02105 2.80316193,5.1503 l -1.0114895,0.47335 c 0,0 1.292539,0.17126 2.5904906,3.26793 1.6185953,3.86165 1.7444669,4.4479 1.7444669,4.4479 0,0 0.1798032,-0.55003 1.6476906,-4.41865 1.2138736,-3.19917 2.6869938,-3.29718 2.6869938,-3.29718 l -1.0151097,-0.47705 c 1.7476767,-1.12762 2.8046167,-3.06546 2.8070597,-5.1466 -6.4e-5,-3.38651 -2.7430296,-6.13179 -6.1266344,-6.1318 z"/></svg>`
        // let markerIcon2 = `<svg viewBox="0 0 50 50" id="AwesomeBlocks-map-svg-marker-${id}-${i}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet"><path d="M25.015 2.4c-7.8 0-14.121 6.204-14.121 13.854C10.894 23.906 25.015 49 25.015 49s14.122-25.094 14.122-32.746c0-7.65-6.325-13.854-14.122-13.854z" fill="#626262"/></svg>`
        // let markerIcon2 = `<svg viewBox="0 0 50 50" id="AwesomeBlocks-map-svg-marker-${id}-${i}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet"><path d="M25.015 2.4c-7.8 0-14.121 6.204-14.121 13.854C10.894 23.906 25.015 49 25.015 49s14.122-25.094 14.122-32.746c0-7.65-6.325-13.854-14.122-13.854z" fill="#626262"/></svg>`

        var markerIcon1 = react_dom_server__WEBPACK_IMPORTED_MODULE_0___default.a.renderToStaticMarkup(_this3.markerIcon({
          icon: type,
          color: markerColor,
          clickEvent: false
        })); // let test = ReactDOMServer.renderToStaticMarkup(markerIcon1)
        // console.log(test, type)

        var divIcon = L.divIcon({
          className: "awesome-blocks-map__marker awesome-blocks-map__marker_".concat(i + 1, " awesome-blocks-map__marker--size-").concat(markerSize, " ").concat(icon),
          iconSize: [15 * markerSize, 24 * markerSize],
          // size of the icon
          iconAnchor: [7 * markerSize, markerSize * 24],
          // point of the icon which will correspond to marker's location
          popupAnchor: [0, markerSize * -24],
          // point from which the popup should open relative to the iconAnchor
          html: markerIcon1
        });
        var layerGroup = L.layerGroup().addTo(ABMap);
        var marker = L.marker([lat, lng], {
          icon: divIcon,
          draggable: true
        }).addTo(layerGroup);
        marker.on('dragend', function (event) {
          _this3.markerDragged(event, "key-".concat(i));
        });
        var popup = marker.bindPopup(markerContent);
        popup.on('popupopen', function () {
          return _this3.editMarker("key-".concat(i), 'opened');
        });
      }); // End marker

      ABMap.on('load', function (e) {
        markerDom && markerDom.forEach(function (markerElement, i) {
          var markerColor = markerElement.dataset.markercolor || '#00A4FF';

          var markerstyle = e.target._container.querySelector(".awesome-blocks-map__marker_".concat(i + 1));

          if (markerstyle && 'object' === _typeof(markerstyle.style)) {
            markerstyle.style.color = markerColor;
          }
        });
      });

      if (mapIsAdded) {
        ABMap.setView([latitude, longitude], zoom);
      }

      mapStyle && L.tileLayer(mapStyle, {
        minZoom: 1,
        maxZoom: 20
      }).addTo(ABMap);
      ABMap.on('zoomend', function (event) {
        _this3.updateMap(event);
      });
      ABMap.on('move', function (event) {
        _this3.updateMap(event);
      });
    }
    /**
     * { function_description }
     *
     * @param      {<type>}   event   The event
     * @return     {boolean}  { description_of_the_return_value }
     */

  }, {
    key: "updateMap",
    value: function updateMap(event) {
      var id = this.props.attrs.id;
      var dom = window.AwesomeBlocks.openstreetmap[id];
      if (!dom) return false;

      if ('zoomend' === event.type) {
        dom.setAttribute('data-zoom', event.target._animateToZoom);
      } else if ('click' === event.type) {} else if ('move' === event.type) {
        var latLng = event.target.getCenter();
        dom.setAttribute('data-latitude', latLng.lat.toFixed(6));
        dom.setAttribute('data-longitude', latLng.lng.toFixed(6));
      }

      if ('zoomend' === event.type || 'move' === event.type) {
        if (!this.state.isChanged) this.setState({
          isChanged: true
        });
      }
    }
    /**
     * Saves changes.
     *
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "saveChanges",
    value: function saveChanges() {
      var id = this.props.attrs.id;
      var dom = window.AwesomeBlocks.openstreetmap[id];
      if (!id || !dom) return false;
      var latitude = dom.dataset.latitude;
      var longitude = dom.dataset.longitude;
      var zoom = dom.dataset.zoom;
      var markers = dom.innerHTML;
      var status = this.props.onChange({
        latitude: latitude,
        longitude: longitude,
        zoom: zoom,
        markers: markers
      });
      return status;
    }
    /**
     * { function_description }
     *
     * @param      {<type>}  event   The event
     * @param      {string}  key     The key
     */

  }, {
    key: "markerDragged",
    value: function markerDragged(event, key) {
      var id = this.props.attrs.id;
      var dom = window.AwesomeBlocks.openstreetmap[id];
      var marker = dom.querySelector("[data-key=\"".concat(key, "\"]"));

      var lat = event.target._latlng.lat.toFixed(6);

      var lng = event.target._latlng.lng.toFixed(6);

      marker.setAttribute('data-lat', lat);
      marker.setAttribute('data-lng', lng);
      this.setState({
        isChanged: true
      });
    }
    /**
     * Adds a marker.
     * 
     * 
     */

  }, {
    key: "addMarker",
    value: function addMarker() {
      var id = this.props.attrs.id;
      var dom = window.AwesomeBlocks.openstreetmap[id];
      var map = window.AwesomeBlocks.openstreetmap.list[id];
      var lat = map.getCenter().lat.toFixed(6);
      var lng = map.getCenter().lng.toFixed(6);
      var newMarker = document.createElement('div');
      newMarker.classList.add('awesome-blocks-map-marker');
      newMarker.setAttribute('data-lat', lat);
      newMarker.setAttribute('data-lng', lng);
      newMarker.setAttribute('data-openpopup', "false");
      newMarker.setAttribute('data-type', "icon1");
      newMarker.setAttribute('data-markercolor', "#CA1B1B");
      newMarker.setAttribute('data-markersize', "2");
      newMarker.setAttribute('data-icon', "fa fa-circle");
      dom.appendChild(newMarker);
      this.setState({
        isChanged: true
      });
    }
    /**
     * { function_description }
     *
     * @param      {<type>}  key     The key
     * @param      {<type>}  status  The status
     */

  }, {
    key: "editMarker",
    value: function editMarker(key, status) {
      var node = this.editMarkerRef.current.querySelectorAll('.edit-marker');
      node && node.forEach(function (el) {
        if (key === el.getAttribute('data-key')) {
          el.classList.add('show');
        } else {
          el.classList.remove('show');
        }
      });
    }
    /**
     * Saves a map.
     *
     * @return     {Promise}  { description_of_the_return_value }
     */

  }, {
    key: "saveMap",
    value: function () {
      var _saveMap = _asyncToGenerator(
      /*#__PURE__*/
      regeneratorRuntime.mark(function _callee() {
        var _this4 = this;

        var id, loading, status;
        return regeneratorRuntime.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                if (this.state.isChanged) {
                  _context.next = 2;
                  break;
                }

                return _context.abrupt("return");

              case 2:
                id = this.props.attrs.id;
                loading = this.loadingContainerRef.current;
                loading.classList.add('show-loading');
                _context.next = 7;
                return new Promise(function (resolve, reject) {
                  setTimeout(function () {
                    var saved = _this4.saveChanges();

                    resolve(saved);
                    reject(false);
                  }, 500);
                });

              case 7:
                status = _context.sent;
                loading.classList.remove('show-loading');

                if (status) {
                  loading.classList.add('show-success');
                  this.state.isChanged = false;
                } else {
                  loading.classList.add('show-error');
                }

                setTimeout(function () {
                  loading.classList.remove('show-success');
                  loading.classList.remove('show-error');
                }, 2000);

              case 11:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function saveMap() {
        return _saveMap.apply(this, arguments);
      }

      return saveMap;
    }()
    /**
     * { function_description }
     *
     * @param      {string}  key     The key
     * @param      {string}  value   The value
     * @param      {string}  el      { parameter_description }
     */

  }, {
    key: "markerChange",
    value: function markerChange(key, value, el) {
      var id = this.props.attrs.id;
      var marker = window.AwesomeBlocks.openstreetmap[id].querySelector("[data-key=\"".concat(key, "\"]"));

      if ('openpopup' === el) {
        marker.setAttribute('data-openpopup', value ? 'true' : 'false');
      } else if ('type' === el) {
        marker.setAttribute('data-type', value);
      } else if ('icon' === el) {
        marker.setAttribute('data-icon', value);
      } else if ('color' === el) {
        marker.setAttribute('data-markercolor', value);
      } else if ('size' === el) {
        marker.setAttribute('data-markersize', value);
      } else if ('text' === el) {
        marker.innerHTML = value;
      }

      this.setState({
        isChanged: true
      });
    }
    /**
     * Closes an editor.
     *
     * @param      {<type>}  key     The key
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "closeEditor",
    value: function closeEditor(key) {
      var dom = this.editMarkerRef.current;
      if (!dom) return;
      var editor = dom.querySelector("[data-key=\"".concat(key, "\"]"));
      if (editor) editor.classList.remove('show');
      return;
    }
    /**
     * Removes a marker.
     *
     * @param      {string}  key     The key
     */

  }, {
    key: "removeMarker",
    value: function removeMarker(key) {
      var id = this.props.attrs.id;
      var marker = window.AwesomeBlocks.openstreetmap[id].querySelector("[data-key=\"".concat(key, "\"]"));
      if (marker) marker.remove();
      this.setState({
        isChanged: true
      });
      return;
    }
    /**
     * { function_description }
     *
     * @param      {<type>}  props   The properties
     * @return     {<type>}  { description_of_the_return_value }
     */

  }, {
    key: "markerIcon",
    value: function markerIcon(props) {
      var icon = props.icon,
          color = props.color,
          clickEvent = props.clickEvent;
      return React.createElement(Fragment, null, ('all' === icon || 'icon1' === icon) && React.createElement("svg", {
        viewBox: "0 0 180 320",
        xmlns: "http://www.w3.org/2000/svg",
        onClick: function onClick() {
          return 'function' === typeof clickEvent && clickEvent('icon1');
        }
      }, React.createElement("filter", {
        height: "1.6",
        y: "-0.3",
        width: "1.15",
        x: "-0.06",
        id: "awesome-blocks-map-svg-filter"
      }, React.createElement("feGaussianBlur", {
        stdDeviation: "0.5"
      })), React.createElement("ellipse", {
        ry: "1",
        rx: "5",
        cy: "21.299999",
        cx: "6",
        style: {
          opacity: '0.3',
          filter: 'url(#awesome-blocks-map-svg-filter)'
        },
        transform: "matrix(14.462133,0,0,14.462133,1.6729169,-12)"
      }), React.createElement("path", {
        fill: color,
        d: "M 90.302891,0 C 41.368767,2.8924265e-4 1.6996776,39.702748 1.6987564,88.678903 1.7036256,118.78458 16.968939,146.83186 42.238456,163.16323 l -14.628295,6.84565 c 0,0 18.69287,2.47678 37.464021,47.26123 23.408336,55.8477 25.228709,60.32613 25.228709,60.32613 0,0 2.600342,-3.95462 23.829119,-59.90311 17.55521,-46.26682 38.85966,-47.68425 38.85966,-47.68425 l -14.68065,-6.89916 C 163.58615,146.80193 178.87176,118.77663 178.9071,88.678903 178.90617,39.702748 139.23704,1.4462133e-4 90.302891,0 Z"
      })), ('all' === icon || 'icon2' === icon) && React.createElement("svg", {
        viewBox: "0 0 180 320",
        xmlns: "http://www.w3.org/2000/svg",
        onClick: function onClick() {
          return 'function' === typeof clickEvent && clickEvent('icon2');
        }
      }, React.createElement("path", {
        fill: color,
        d: "m 90.434743,0.40000002 c -49.459514,0 -89.54074301,39.33933598 -89.54074301,87.84770598 0,48.521054 89.54074301,207.641184 89.54074301,207.641184 0,0 89.547087,-159.12013 89.547087,-207.641184 0,-48.50837 -40.1066,-87.84770598 -89.547087,-87.84770598 z"
      })), ('all' === icon || 'icon3' === icon) && React.createElement("svg", {
        viewBox: "0 0 180 320",
        xmlns: "http://www.w3.org/2000/svg",
        onClick: function onClick() {
          return 'function' === typeof clickEvent && clickEvent('icon3');
        }
      }, React.createElement("path", {
        fill: color,
        d: "M 89.939396,256.0246 C 30.211223,178.0849 0.35353635,122.63125 0.35353635,89.65086 a 89.585863,89.585863 0 1 1 179.17172365,0 c 0,32.98039 -29.85769,88.43404 -89.585864,166.37374 z m 0,-115.18182 a 51.191921,51.191921 0 1 0 0,-102.38384 51.191922,51.191922 0 0 0 0,102.38384 z"
      })), ('all' === icon || 'icon4' === icon) && React.createElement("svg", {
        viewBox: "0 0 180 320",
        xmlns: "http://www.w3.org/2000/svg",
        onClick: function onClick() {
          return 'function' === typeof clickEvent && clickEvent('icon4');
        }
      }, React.createElement("path", {
        fill: color,
        d: "m 69.543779,196.79648 v 97.29299 l 13.672804,20.503 c 2.949402,4.42099 9.450504,4.42099 12.399905,0 l 13.666602,-20.503 v -97.29299 c -6.45144,1.19218 -13.076722,1.90003 -19.869659,1.90003 -6.792937,0 -13.418224,-0.70785 -19.869652,-1.90003 z M 89.413431,0 C 40.031139,0 0,40.031139 0,89.413431 c 0,49.382299 40.031139,89.413429 89.413431,89.413429 49.382299,0 89.413429,-40.03113 89.413429,-89.413429 C 178.82686,40.031139 138.79573,0 89.413431,0 Z m 0,47.190421 c -23.284747,0 -42.22301,18.938263 -42.22301,42.22301 0,4.110534 -3.340584,7.45112 -7.451118,7.45112 -4.110534,0 -7.451119,-3.340586 -7.451119,-7.45112 0,-31.499606 25.63185,-57.125247 57.125247,-57.125247 4.110534,0 7.45112,3.340585 7.45112,7.451119 0,4.110534 -3.340586,7.451118 -7.45112,7.451118 z"
      })), ('all' === icon || 'icon5' === icon) && React.createElement("svg", {
        viewBox: "0 0 180 320",
        xmlns: "http://www.w3.org/2000/svg",
        onClick: function onClick() {
          return 'function' === typeof clickEvent && clickEvent('icon5');
        }
      }, React.createElement("path", {
        fill: color,
        d: "M 89.898438 -0.28320312 A 89.818184 89.818184 0 0 0 0.080078125 89.535156 A 89.818184 89.818184 0 0 0 75.662109 178.10742 L 75.662109 247.34375 L 89.859375 291.34375 L 104.12109 247.34375 L 104.12109 178.17383 A 89.818184 89.818184 0 0 0 179.7168 89.535156 A 89.818184 89.818184 0 0 0 89.898438 -0.28320312 z "
      })), ('all' === icon || 'icon6' === icon) && React.createElement("svg", {
        viewBox: "0 0 180 320",
        xmlns: "http://www.w3.org/2000/svg",
        onClick: function onClick() {
          return 'function' === typeof clickEvent && clickEvent('icon6');
        }
      }, React.createElement("path", {
        fill: color,
        d: "m 127.40549,219.26791 -4.68502,16.94692 c 22.77463,6.29357 37.49771,18.39726 37.49771,30.84376 0,16.63048 -28.87482,35.15959 -70.31919,35.15959 -41.444374,0 -70.319192,-18.52911 -70.319192,-35.15959 0,-12.4465 14.723081,-24.55019 37.506499,-30.85255 L 52.401281,219.25911 C 21.311408,227.85564 2,246.165 2,267.05859 c 0,29.56922 38.614026,52.73939 87.89899,52.73939 49.28496,0 87.89899,-23.17017 87.89899,-52.73939 0,-20.89359 -19.31141,-39.20295 -50.39249,-47.79068 z"
      }), React.createElement("path", {
        fill: color,
        d: "M 89.898438 -0.28320312 A 89.818184 89.818184 0 0 0 0.080078125 89.535156 A 89.818184 89.818184 0 0 0 75.662109 178.10742 L 75.662109 247.34375 L 89.859375 291.34375 L 104.12109 247.34375 L 104.12109 178.17383 A 89.818184 89.818184 0 0 0 179.7168 89.535156 A 89.818184 89.818184 0 0 0 89.898438 -0.28320312 z "
      })));
    } // markerclick( icon ) {
    //   this.iconType = icon
    // }

    /**
     * { function_description }
     *
     * @return     {Function}  { description_of_the_return_value }
     */

  }, {
    key: "render",
    value: function render() {
      var _this5 = this;

      var _this$props = this.props,
          attrs = _this$props.attrs,
          saveButtonTitle = _this$props.saveButtonTitle;
      var min_height = attrs.min_height,
          id = attrs.id;
      var MarkerIcon = this.markerIcon;

      var markersDom = function markersDom() {
        var map = {};

        if (window.AwesomeBlocks.openstreetmap && window.AwesomeBlocks.openstreetmap[id]) {
          var dom = window.AwesomeBlocks.openstreetmap[id].querySelectorAll('.awesome-blocks-map-marker');
          dom && dom.forEach(function (el, i) {
            map[el.getAttribute('data-key')] = {
              lat: el.getAttribute('data-lat'),
              lng: el.getAttribute('data-lng'),
              openpopup: el.getAttribute('data-openpopup'),
              type: el.getAttribute('data-type'),
              markercolor: el.getAttribute('data-markercolor'),
              markersize: el.getAttribute('data-markersize'),
              icon: el.getAttribute('data-icon'),
              text: el.innerHTML
            };
          });
        }

        return map;
      };

      var markersDoms = markersDom();
      var buttonClass = this.state.isChanged ? '' : ' disabled';
      return React.createElement("div", {
        id: id,
        className: "react-opensstreetmap-leaflet",
        ref: this.containerRef
      }, React.createElement("div", {
        className: "awesome-blocks-map-info"
      }), React.createElement("div", {
        className: "awesome-blocks-map",
        style: {
          minHeight: "".concat(min_height, "px")
        },
        ref: this.mapRef
      }, React.createElement("button", {
        title: __('Save Map', 'awesome-blocks'),
        className: "save-button".concat(buttonClass),
        onClick: function onClick() {
          return _this5.saveMap();
        },
        key: "save-button-key"
      }, React.createElement("i", {
        className: "fa fa-save"
      })), React.createElement("button", {
        className: "fullscreen-button".concat(buttonClass),
        onClick: function onClick() {
          return _this5.fullScreen();
        },
        title: __('Full Screen', 'awesome-blocks'),
        style: {
          backgroundColor: this.state.isfullScreen ? '#FDC57C' : null
        },
        key: "save-button-fullscreen"
      }, React.createElement("i", {
        className: "fa fa-expand-arrows-alt"
      })), React.createElement("button", {
        title: __('Add Marker', 'awesome-blocks'),
        className: "add-marker",
        onClick: function onClick() {
          return _this5.addMarker();
        },
        key: "add-marker-button-key"
      }, React.createElement("i", {
        className: "fa fa-plus"
      })), React.createElement("div", {
        className: "edit-markers",
        ref: this.editMarkerRef
      }, Object.keys(markersDoms).map(function (key, index) {
        var merkerprops = markersDoms[key]; // let MarkerIcon1 = () => <svg viewBox="0 0 12.25 23" id="awesome-blocks-map-svg-marker1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="awesome-blocks-map-svg-shadow-grad" x1="0%" y1="0%" x2="0%" y2="100%"><stop style="stop-color:#0095FF;stop-opacity:1" offset="50%"/><stop style="stop-color:#0095FF;stop-opacity:0.4" offset="90%"/></linearGradient><filter height="1.6" y="-0.3" width="1.15" x="-0.06" id="awesome-blocks-map-svg-filter"><feGaussianBlur stdDeviation="0.5" /></filter></defs><ellipse ry="1" rx="5" cy="21.3" cx="6" style="opacity:0.2;fill:#000000;filter:url(#awesome-blocks-map-svg-filter)"/><path fill="url(#awesome-blocks-map-svg-shadow-grad)" d="m 6.1284166,0 c -3.3836036,2e-5 -6.12656623,2.74529 -6.12662993,6.1318 3.3671e-4,2.08169 1.05587353,4.02105 2.80316193,5.1503 l -1.0114895,0.47335 c 0,0 1.292539,0.17126 2.5904906,3.26793 1.6185953,3.86165 1.7444669,4.4479 1.7444669,4.4479 0,0 0.1798032,-0.55003 1.6476906,-4.41865 1.2138736,-3.19917 2.6869938,-3.29718 2.6869938,-3.29718 l -1.0151097,-0.47705 c 1.7476767,-1.12762 2.8046167,-3.06546 2.8070597,-5.1466 -6.4e-5,-3.38651 -2.7430296,-6.13179 -6.1266344,-6.1318 z"/></svg>
        // // let markerIcon2 = `<svg viewBox="0 0 50 50" id="awesome-blocks-map-svg-marker-${id}-${i}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet"><path d="M25.015 2.4c-7.8 0-14.121 6.204-14.121 13.854C10.894 23.906 25.015 49 25.015 49s14.122-25.094 14.122-32.746c0-7.65-6.325-13.854-14.122-13.854z" fill="#626262"/></svg>`
        // let MarkerIcon2 = () => `<svg viewBox="0 0 50 50" id="awesome-blocks-map-svg-marker2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet"><path d="M25.015 2.4c-7.8 0-14.121 6.204-14.121 13.854C10.894 23.906 25.015 49 25.015 49s14.122-25.094 14.122-32.746c0-7.65-6.325-13.854-14.122-13.854z" fill="#626262"/></svg>`
        // console.log(key, merkerprops, index)

        return React.createElement("div", {
          className: "edit-marker",
          "data-key": key,
          key: key
        }, React.createElement("button", {
          className: "close-editor",
          onClick: function onClick(event) {
            return _this5.closeEditor(key);
          },
          key: "close-".concat(key)
        }, React.createElement("i", {
          className: "fa fa-chevron-circle-right"
        })), React.createElement("span", {
          className: "info",
          key: "info-".concat(key)
        }, __('You have to save map status to save a changes.', 'awesome-blocks')), React.createElement(_helper__WEBPACK_IMPORTED_MODULE_2__["H"].getPro, null), React.createElement("hr", null), React.createElement("div", {
          className: "marker-icon-type"
        }, React.createElement("label", {
          className: "components-base-control__label",
          key: "marker-type-".concat(key)
        }, __('Marker Type', 'awesome-blocks')), React.createElement("br", null), React.createElement(MarkerIcon, {
          icon: "all",
          color: "#4B7596",
          clickEvent: function clickEvent(value) {
            return _this5.markerChange(key, value, 'type');
          }
        })), React.createElement("hr", null), React.createElement(ToggleControl, {
          label: __('Open popup when loaded', 'awesome-blocks'),
          checked: 'true' === merkerprops.openpopup ? true : false,
          onChange: function onChange(value) {
            return _this5.markerChange(key, value, 'openpopup');
          }
        }), React.createElement(_helper__WEBPACK_IMPORTED_MODULE_2__["H"].SelectIcon, {
          title: __('Icon', 'awesome-blocks'),
          classPlaceholder: __('Insert icon class', 'awesome-blocks'),
          fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
          ,
          value: merkerprops.icon,
          onSelect: function onSelect(value) {
            return _this5.markerChange(key, value, 'icon');
          }
        }), React.createElement(TextareaControl, {
          label: __('Marker Text', 'awesome-blocks'),
          help: __('Popup marker text', 'awesome-blocks'),
          value: merkerprops.text,
          onChange: function onChange(value) {
            return _this5.markerChange(key, value, 'text');
          }
        }), React.createElement("label", {
          className: "components-base-control__label",
          key: "color-".concat(key)
        }, __('Marker Color', 'awesome-blocks')), React.createElement(ColorPalette, {
          value: merkerprops.markercolor,
          label: __('Marker Color', 'awesome-blocks'),
          onChange: function onChange(value) {
            return _this5.markerChange(key, value, 'color');
          }
        }), React.createElement(RangeControl, {
          label: __('Marker Size', 'awesome-blocks'),
          value: merkerprops.markersize,
          onChange: function onChange(value) {
            return _this5.markerChange(key, value, 'size');
          },
          min: 1,
          max: 5
        }), React.createElement("button", {
          title: __('Remove This Marker', 'awesome-blocks'),
          className: "remove-marker",
          onClick: function onClick(event) {
            return _this5.removeMarker(key);
          },
          key: "remove-marker-".concat(key)
        }, React.createElement("i", {
          className: "fa fa-times-circle"
        })));
      })), React.createElement("div", {
        className: "react-opensstreetmap-leaflet__loading",
        ref: this.loadingContainerRef
      }, React.createElement("div", {
        className: "loading__icon"
      }))));
    }
  }]);

  return openStreetMap;
}(React.Component);

/* harmony default export */ __webpack_exports__["default"] = (openStreetMap);

/***/ }),

/***/ "./src/assets/js/blocks/libs/openstreetmap/style.scss":
/*!************************************************************!*\
  !*** ./src/assets/js/blocks/libs/openstreetmap/style.scss ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader/dist/cjs.js!../../../../../../node_modules/sass-loader/dist/cjs.js!./style.scss */ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/openstreetmap/style.scss");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "./src/assets/js/blocks/libs/react-clean-tabs/index.js":
/*!*************************************************************!*\
  !*** ./src/assets/js/blocks/libs/react-clean-tabs/index.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.scss */ "./src/assets/js/blocks/libs/react-clean-tabs/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_0__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

// import React from 'react'


var ReactCleanTabs =
/*#__PURE__*/
function (_React$Component) {
  _inherits(ReactCleanTabs, _React$Component);

  function ReactCleanTabs() {
    var _this;

    _classCallCheck(this, ReactCleanTabs);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(ReactCleanTabs).apply(this, arguments));
    _this.state = {
      active: 0,
      selected: false
    };
    _this.active = _this.active.bind(_assertThisInitialized(_this)); // this.activeTwo = this.activeTwo.bind(this)

    _this.mapRender = _this.mapRender.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(ReactCleanTabs, [{
    key: "active",
    value: function active(event, index) {
      event.preventDefault();
      this.setState({
        active: index,
        selected: true
      });
    } // activeTwo (event, index) {
    //   event.preventDefault()
    //   // const link = event.currentTarget
    // }

  }, {
    key: "mapRender",
    value: function mapRender() {
      var _this2 = this;

      var _this$props = this.props,
          color = _this$props.color,
          bgColor = _this$props.bgColor,
          children = _this$props.children,
          fullWidthTabs = _this$props.fullWidthTabs;
      var flex = fullWidthTabs === true ? ' flex-tabs' : '';
      var links = [];
      var tab = [];
      var activated = false;
      var childrenArray = typeof children.map === 'function' ? children : [children];
      typeof childrenArray.map === 'function' && childrenArray.map(function (child, index) {
        if (child && ReactCleanTab.name === child.type.name) {
          var _child$props = child.props,
              title = _child$props.title,
              iconClass = _child$props.iconClass,
              className = _child$props.className;
          var content = child.props.children;
          var textColor = child.props.color;
          var backgroundColor = child.props.bgColor;
          var active = '';

          if (child.props.active && !activated && !_this2.state.selected) {
            active = 'active';
            activated = true;
          }

          if (index === _this2.state.active && _this2.state.selected) {
            active = 'active';
          }

          var tabColor = {};
          var style = '';

          if (color || textColor) {
            tabColor.color = color || textColor;
          }

          if (bgColor || backgroundColor) {
            tabColor.backgroundColor = bgColor || backgroundColor;
          }

          if (tabColor.color || tabColor.backgroundColor) {
            style = tabColor;
          }

          links.push(React.createElement("li", {
            key: "link-".concat(index),
            className: active
          }, React.createElement("a", {
            href: "#tab-".concat(index),
            style: style,
            onClick: function onClick(event) {
              return _this2.active(event, index);
            }
          }, iconClass && React.createElement("i", {
            className: iconClass
          }), " ".concat(title))));
          tab.push(React.createElement("div", {
            key: "tab-".concat(index),
            className: "tab ".concat(active, " ").concat(className),
            style: style
          }, content));
        }
      });
      return React.createElement("div", {
        className: "react-clean-tabs".concat(flex)
      }, React.createElement("ul", {
        className: "tab-links"
      }, links), React.createElement("div", {
        className: "tabs-content"
      }, tab));
    }
  }, {
    key: "render",
    value: function render() {
      return this.mapRender();
    }
  }]);

  return ReactCleanTabs;
}(React.Component);

var ReactCleanTab =
/*#__PURE__*/
function (_ReactCleanTabs) {
  _inherits(ReactCleanTab, _ReactCleanTabs);

  function ReactCleanTab() {
    _classCallCheck(this, ReactCleanTab);

    return _possibleConstructorReturn(this, _getPrototypeOf(ReactCleanTab).apply(this, arguments));
  }

  _createClass(ReactCleanTab, [{
    key: "render",
    // constructor () {
    //   super(...arguments)
    // }
    value: function render() {
      var children = this.props.children;
      return React.createElement("div", null, children);
    }
  }]);

  return ReactCleanTab;
}(ReactCleanTabs);

ReactCleanTabs.Item = ReactCleanTab;
/* harmony default export */ __webpack_exports__["default"] = (ReactCleanTabs);

/***/ }),

/***/ "./src/assets/js/blocks/libs/react-clean-tabs/style.scss":
/*!***************************************************************!*\
  !*** ./src/assets/js/blocks/libs/react-clean-tabs/style.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader/dist/cjs.js!../../../../../../node_modules/sass-loader/dist/cjs.js!./style.scss */ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-clean-tabs/style.scss");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "./src/assets/js/blocks/libs/react-fieldset/index.js":
/*!***********************************************************!*\
  !*** ./src/assets/js/blocks/libs/react-fieldset/index.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.scss */ "./src/assets/js/blocks/libs/react-fieldset/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_0__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

// import React from 'react';


var reactFieldset =
/*#__PURE__*/
function (_React$Component) {
  _inherits(reactFieldset, _React$Component);

  function reactFieldset() {
    _classCallCheck(this, reactFieldset);

    return _possibleConstructorReturn(this, _getPrototypeOf(reactFieldset).apply(this, arguments));
  }

  _createClass(reactFieldset, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          title = _this$props.title,
          iconClass = _this$props.iconClass,
          color = _this$props.color,
          children = _this$props.children;
      return React.createElement("fieldset", {
        className: "react-fieldset",
        style: {
          color: color,
          borderColor: color
        }
      }, React.createElement("legend", null, "undefined" !== typeof iconClass && React.createElement("i", {
        className: iconClass
      }), " ".concat(title)), children);
    }
  }]);

  return reactFieldset;
}(React.Component);

/* harmony default export */ __webpack_exports__["default"] = (reactFieldset);

/***/ }),

/***/ "./src/assets/js/blocks/libs/react-fieldset/style.scss":
/*!*************************************************************!*\
  !*** ./src/assets/js/blocks/libs/react-fieldset/style.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader/dist/cjs.js!../../../../../../node_modules/sass-loader/dist/cjs.js!./style.scss */ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-fieldset/style.scss");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "./src/assets/js/blocks/libs/react-modal-popup/index.js":
/*!**************************************************************!*\
  !*** ./src/assets/js/blocks/libs/react-modal-popup/index.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.scss */ "./src/assets/js/blocks/libs/react-modal-popup/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_0__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

// import React from 'react'


var reactModalPopup =
/*#__PURE__*/
function (_React$Component) {
  _inherits(reactModalPopup, _React$Component);

  function reactModalPopup() {
    var _this;

    _classCallCheck(this, reactModalPopup);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(reactModalPopup).apply(this, arguments));
    _this.state = {
      modalOpened: ""
    };
    _this.hbModalRef = React.createRef();
    _this.appendModal = _this.appendModal.bind(_assertThisInitialized(_this));
    _this.removeModal = _this.removeModal.bind(_assertThisInitialized(_this));
    _this.openModal = _this.openModal.bind(_assertThisInitialized(_this));
    _this.closeModal = _this.closeModal.bind(_assertThisInitialized(_this));
    _this.events = _this.events.bind(_assertThisInitialized(_this));
    return _this;
  }
  /**
   * call append modal functionat first
   */


  _createClass(reactModalPopup, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.appendModal();
    }
    /**
     * { function_description }
     */

  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      this.removeModal();
    }
    /**
     *  append modal to container
     */

  }, {
    key: "appendModal",
    value: function appendModal() {
      var appendTo = this.props.appendTo;
      var container = document.body;
      var c = {};

      if ('string' === typeof appendTo) {
        c = '.' !== appendTo.charAt(0) ? document.getElementById(appendTo) : document.querySelector(appendTo);
        if (c) container = c;
      } // const container = "undefined" !== typeof appendTo ? document.getElementById( appendTo ) : document.body


      container.classList.add('react-modal-popup-parent');
      this.hbModalRef.current && container.appendChild(this.hbModalRef.current);
    }
    /**
     * when modal is opend
     * 
     * @param {*} event 
     */

  }, {
    key: "openModal",
    value: function openModal(event) {
      event.preventDefault();
      var wpwrap = document.getElementById("wpwrap");

      if (wpwrap) {
        wpwrap.style.overflow = "hidden";
      }

      this.hbModalRef.current.addEventListener('click', this.events);
      document.body.addEventListener('keydown', this.events);
      this.setState({
        modalOpened: ' madal-opend'
      }); // when modal is opened call props.onOpen

      var openCallback = this.props.onOpen;
      typeof openCallback === 'function' && openCallback();
    }
    /**
     * when modal is closed
     * @param {*} event 
     */

  }, {
    key: "closeModal",
    value: function closeModal() {
      var event = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

      if (event) {
        event.preventDefault();
        this.removeModal();
      } // when modal is closed call props.onClose


      var closeCallback = this.props.onClose;
      typeof closeCallback === 'function' && closeCallback();
    }
    /**
     * Removes a modal.
     */

  }, {
    key: "removeModal",
    value: function removeModal() {
      var wpwrap = document.getElementById("wpwrap");
      wpwrap && (wpwrap.style.overflow = "unset");
      this.setState({
        modalOpened: ""
      });

      if (this.hbModalRef.current.classList) {
        this.hbModalRef.current.classList.remove('madal-opend');
      }
    }
    /**
     * Modal Events
     * @param {*} event 
     */

  }, {
    key: "events",
    value: function events(event) {
      if ("click" === event.type && event.target.classList && event.target.classList.contains("madal-opend")) {
        this.setState({
          modalOpened: ""
        });
        this.closeModal();
      } else if ("keydown" === event.type && (event.key === "Escape" || event.keyCode === "27" || event.key == 'Esc')) {
        this.setState({
          modalOpened: ""
        });
        document.body.removeEventListener("keydown", this.events);
        this.closeModal();
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
          title = _this$props.title,
          iconClass = _this$props.iconClass,
          children = _this$props.children;
      /**
       * render link and modal title 
       */

      var RenderTitle = function RenderTitle() {
        if (title) {
          return React.createElement("span", null, "undefined" !== typeof iconClass && React.createElement("i", {
            className: iconClass
          }), " ".concat(title));
        } else {
          if ("undefined" !== typeof iconClass) {
            return React.createElement("div", {
              className: "components-toolbar components-toolbar"
            }, React.createElement("i", {
              className: iconClass
            }));
          }
        }
      };

      return React.createElement("div", {
        className: "react-modal-popup"
      }, React.createElement("a", {
        href: "#",
        onClick: this.openModal,
        className: "open-modal"
      }, React.createElement(RenderTitle, null)), React.createElement("div", {
        className: "react-appended-modal-popup".concat(this.state.modalOpened),
        ref: this.hbModalRef
      }, React.createElement("div", {
        className: "modal-container"
      }, React.createElement("div", {
        className: "modal-header"
      }, React.createElement("h2", {
        className: "modal-title"
      }, React.createElement(RenderTitle, null)), React.createElement("div", {
        className: "react-modal-popup-close",
        onClick: this.closeModal
      })), React.createElement("div", {
        className: "modal-body"
      }, children))));
    }
  }]);

  return reactModalPopup;
}(React.Component);

/* harmony default export */ __webpack_exports__["default"] = (reactModalPopup);

/***/ }),

/***/ "./src/assets/js/blocks/libs/react-modal-popup/style.scss":
/*!****************************************************************!*\
  !*** ./src/assets/js/blocks/libs/react-modal-popup/style.scss ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader/dist/cjs.js!../../../../../../node_modules/sass-loader/dist/cjs.js!./style.scss */ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/react-modal-popup/style.scss");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "./src/assets/js/blocks/libs/select-icon/icons.js":
/*!********************************************************!*\
  !*** ./src/assets/js/blocks/libs/select-icon/icons.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/**
 * Extra Blocks icons list
 */
var iconsList = {
  // 'WordPress Dashicons': [
  //   'dashicons dashicons-admin-appearance',
  //   'dashicons dashicons-admin-collapse',
  //   'dashicons dashicons-admin-comments',
  //   'dashicons dashicons-admin-customizer',
  //   'dashicons dashicons-admin-generic',
  //   'dashicons dashicons-admin-home',
  //   'dashicons dashicons-admin-links',
  //   'dashicons dashicons-admin-media',
  //   'dashicons dashicons-admin-multisite',
  //   'dashicons dashicons-admin-network',
  //   'dashicons dashicons-admin-page',
  //   'dashicons dashicons-admin-plugins',
  //   'dashicons dashicons-admin-post',
  //   'dashicons dashicons-admin-settings',
  //   'dashicons dashicons-admin-site-alt',
  //   'dashicons dashicons-admin-site-alt2',
  //   'dashicons dashicons-admin-site-alt3',
  //   'dashicons dashicons-admin-site',
  //   'dashicons dashicons-admin-tools',
  //   'dashicons dashicons-admin-users',
  //   'dashicons dashicons-album',
  //   'dashicons dashicons-align-center',
  //   'dashicons dashicons-align-full-width',
  //   'dashicons dashicons-align-left',
  //   'dashicons dashicons-align-none',
  //   'dashicons dashicons-align-pull-left',
  //   'dashicons dashicons-align-pull-right',
  //   'dashicons dashicons-align-right',
  //   'dashicons dashicons-align-wide',
  //   'dashicons dashicons-analytics',
  //   'dashicons dashicons-archive',
  //   'dashicons dashicons-arrow-down-alt',
  //   'dashicons dashicons-arrow-down-alt2',
  //   'dashicons dashicons-arrow-down',
  //   'dashicons dashicons-arrow-left-alt',
  //   'dashicons dashicons-arrow-left-alt2',
  //   'dashicons dashicons-arrow-left',
  //   'dashicons dashicons-arrow-right-alt',
  //   'dashicons dashicons-arrow-right-alt2',
  //   'dashicons dashicons-arrow-right',
  //   'dashicons dashicons-arrow-up-alt',
  //   'dashicons dashicons-arrow-up-alt2',
  //   'dashicons dashicons-arrow-up-duplicate',
  //   'dashicons dashicons-arrow-up',
  //   'dashicons dashicons-art',
  //   'dashicons dashicons-awards',
  //   'dashicons dashicons-backup',
  //   'dashicons dashicons-block-default',
  //   'dashicons dashicons-book-alt',
  //   'dashicons dashicons-book',
  //   'dashicons dashicons-buddicons-activity',
  //   'dashicons dashicons-buddicons-bbpress-logo',
  //   'dashicons dashicons-buddicons-buddypress-logo',
  //   'dashicons dashicons-buddicons-community',
  //   'dashicons dashicons-buddicons-forums',
  //   'dashicons dashicons-buddicons-friends',
  //   'dashicons dashicons-buddicons-groups',
  //   'dashicons dashicons-buddicons-pm',
  //   'dashicons dashicons-buddicons-replies',
  //   'dashicons dashicons-buddicons-topics',
  //   'dashicons dashicons-buddicons-tracking',
  //   'dashicons dashicons-building',
  //   'dashicons dashicons-businessman',
  //   'dashicons dashicons-businessperson',
  //   'dashicons dashicons-businesswoman',
  //   'dashicons dashicons-button',
  //   'dashicons dashicons-calendar-alt',
  //   'dashicons dashicons-calendar',
  //   'dashicons dashicons-camera-alt',
  //   'dashicons dashicons-camera',
  //   'dashicons dashicons-carrot',
  //   'dashicons dashicons-cart',
  //   'dashicons dashicons-category',
  //   'dashicons dashicons-chart-area',
  //   'dashicons dashicons-chart-bar',
  //   'dashicons dashicons-chart-line',
  //   'dashicons dashicons-chart-pie',
  //   'dashicons dashicons-clipboard',
  //   'dashicons dashicons-clock',
  //   'dashicons dashicons-cloud-saved',
  //   'dashicons dashicons-cloud-upload',
  //   'dashicons dashicons-cloud',
  //   'dashicons dashicons-code-standards',
  //   'dashicons dashicons-color-picker',
  //   'dashicons dashicons-columns',
  //   'dashicons dashicons-controls-back',
  //   'dashicons dashicons-controls-forward',
  //   'dashicons dashicons-controls-pause',
  //   'dashicons dashicons-controls-play',
  //   'dashicons dashicons-controls-repeat',
  //   'dashicons dashicons-controls-skipback',
  //   'dashicons dashicons-controls-skipforward',
  //   'dashicons dashicons-controls-volumeoff',
  //   'dashicons dashicons-controls-volumeon',
  //   'dashicons dashicons-cover-image',
  //   'dashicons dashicons-dashboard',
  //   'dashicons dashicons-desktop',
  //   'dashicons dashicons-dismiss',
  //   'dashicons dashicons-download',
  //   'dashicons dashicons-edit-large',
  //   'dashicons dashicons-edit',
  //   'dashicons dashicons-editor-aligncenter',
  //   'dashicons dashicons-editor-alignleft',
  //   'dashicons dashicons-editor-alignright',
  //   'dashicons dashicons-editor-bold',
  //   'dashicons dashicons-editor-break',
  //   'dashicons dashicons-editor-code-duplicate',
  //   'dashicons dashicons-editor-code',
  //   'dashicons dashicons-editor-contract',
  //   'dashicons dashicons-editor-customchar',
  //   'dashicons dashicons-editor-expand',
  //   'dashicons dashicons-editor-help',
  //   'dashicons dashicons-editor-indent',
  //   'dashicons dashicons-editor-insertmore',
  //   'dashicons dashicons-editor-italic',
  //   'dashicons dashicons-editor-justify',
  //   'dashicons dashicons-editor-kitchensink',
  //   'dashicons dashicons-editor-ltr',
  //   'dashicons dashicons-editor-ol-rtl',
  //   'dashicons dashicons-editor-ol',
  //   'dashicons dashicons-editor-outdent',
  //   'dashicons dashicons-editor-paragraph',
  //   'dashicons dashicons-editor-paste-text',
  //   'dashicons dashicons-editor-paste-word',
  //   'dashicons dashicons-editor-quote',
  //   'dashicons dashicons-editor-removeformatting',
  //   'dashicons dashicons-editor-rtl',
  //   'dashicons dashicons-editor-spellcheck',
  //   'dashicons dashicons-editor-strikethrough',
  //   'dashicons dashicons-editor-table',
  //   'dashicons dashicons-editor-textcolor',
  //   'dashicons dashicons-editor-ul',
  //   'dashicons dashicons-editor-underline',
  //   'dashicons dashicons-editor-unlink',
  //   'dashicons dashicons-editor-video',
  //   'dashicons dashicons-ellipsis',
  //   'dashicons dashicons-email-alt',
  //   'dashicons dashicons-email-alt2',
  //   'dashicons dashicons-email',
  //   'dashicons dashicons-embed-audio',
  //   'dashicons dashicons-embed-generic',
  //   'dashicons dashicons-embed-photo',
  //   'dashicons dashicons-embed-post',
  //   'dashicons dashicons-embed-video',
  //   'dashicons dashicons-excerpt-view',
  //   'dashicons dashicons-exit',
  //   'dashicons dashicons-external',
  //   'dashicons dashicons-facebook-alt',
  //   'dashicons dashicons-facebook',
  //   'dashicons dashicons-feedback',
  //   'dashicons dashicons-filter',
  //   'dashicons dashicons-flag',
  //   'dashicons dashicons-format-aside',
  //   'dashicons dashicons-format-audio',
  //   'dashicons dashicons-format-chat',
  //   'dashicons dashicons-format-gallery',
  //   'dashicons dashicons-format-image',
  //   'dashicons dashicons-format-quote',
  //   'dashicons dashicons-format-status',
  //   'dashicons dashicons-format-video',
  //   'dashicons dashicons-forms',
  //   'dashicons dashicons-googleplus',
  //   'dashicons dashicons-grid-view',
  //   'dashicons dashicons-groups',
  //   'dashicons dashicons-hammer',
  //   'dashicons dashicons-heading',
  //   'dashicons dashicons-heart',
  //   'dashicons dashicons-hidden',
  //   'dashicons dashicons-html',
  //   'dashicons dashicons-id-alt',
  //   'dashicons dashicons-id',
  //   'dashicons dashicons-image-crop',
  //   'dashicons dashicons-image-filter',
  //   'dashicons dashicons-image-flip-horizontal',
  //   'dashicons dashicons-image-flip-vertical',
  //   'dashicons dashicons-image-rotate-left',
  //   'dashicons dashicons-image-rotate-right',
  //   'dashicons dashicons-image-rotate',
  //   'dashicons dashicons-images-alt',
  //   'dashicons dashicons-images-alt2',
  //   'dashicons dashicons-index-card',
  //   'dashicons dashicons-info-outline',
  //   'dashicons dashicons-info',
  //   'dashicons dashicons-insert-after',
  //   'dashicons dashicons-insert-before',
  //   'dashicons dashicons-insert',
  //   'dashicons dashicons-instagram',
  //   'dashicons dashicons-laptop',
  //   'dashicons dashicons-layout',
  //   'dashicons dashicons-leftright',
  //   'dashicons dashicons-lightbulb',
  //   'dashicons dashicons-list-view',
  //   'dashicons dashicons-location-alt',
  //   'dashicons dashicons-location',
  //   'dashicons dashicons-lock-duplicate',
  //   'dashicons dashicons-lock',
  //   'dashicons dashicons-marker',
  //   'dashicons dashicons-media-archive',
  //   'dashicons dashicons-media-audio',
  //   'dashicons dashicons-media-code',
  //   'dashicons dashicons-media-default',
  //   'dashicons dashicons-media-document',
  //   'dashicons dashicons-media-interactive',
  //   'dashicons dashicons-media-spreadsheet',
  //   'dashicons dashicons-media-text',
  //   'dashicons dashicons-media-video',
  //   'dashicons dashicons-megaphone',
  //   'dashicons dashicons-menu-alt',
  //   'dashicons dashicons-menu-alt2',
  //   'dashicons dashicons-menu-alt3',
  //   'dashicons dashicons-menu',
  //   'dashicons dashicons-microphone',
  //   'dashicons dashicons-migrate',
  //   'dashicons dashicons-minus',
  //   'dashicons dashicons-money',
  //   'dashicons dashicons-move',
  //   'dashicons dashicons-nametag',
  //   'dashicons dashicons-networking',
  //   'dashicons dashicons-no-alt',
  //   'dashicons dashicons-no',
  //   'dashicons dashicons-palmtree',
  //   'dashicons dashicons-paperclip',
  //   'dashicons dashicons-performance',
  //   'dashicons dashicons-phone',
  //   'dashicons dashicons-playlist-audio',
  //   'dashicons dashicons-playlist-video',
  //   'dashicons dashicons-plugins-checked',
  //   'dashicons dashicons-plus-alt',
  //   'dashicons dashicons-plus-alt2',
  //   'dashicons dashicons-plus',
  //   'dashicons dashicons-portfolio',
  //   'dashicons dashicons-post-status',
  //   'dashicons dashicons-pressthis',
  //   'dashicons dashicons-products',
  //   'dashicons dashicons-randomize',
  //   'dashicons dashicons-redo',
  //   'dashicons dashicons-remove',
  //   'dashicons dashicons-rest-api',
  //   'dashicons dashicons-rss',
  //   'dashicons dashicons-saved',
  //   'dashicons dashicons-schedule',
  //   'dashicons dashicons-screenoptions',
  //   'dashicons dashicons-search',
  //   'dashicons dashicons-share-alt',
  //   'dashicons dashicons-share-alt2',
  //   'dashicons dashicons-share',
  //   'dashicons dashicons-shield-alt',
  //   'dashicons dashicons-shield',
  //   'dashicons dashicons-shortcode',
  //   'dashicons dashicons-slides',
  //   'dashicons dashicons-smartphone',
  //   'dashicons dashicons-smiley',
  //   'dashicons dashicons-sort',
  //   'dashicons dashicons-sos',
  //   'dashicons dashicons-star-empty',
  //   'dashicons dashicons-star-filled',
  //   'dashicons dashicons-star-half',
  //   'dashicons dashicons-sticky',
  //   'dashicons dashicons-store',
  //   'dashicons dashicons-table-col-after',
  //   'dashicons dashicons-table-col-before',
  //   'dashicons dashicons-table-col-delete',
  //   'dashicons dashicons-table-row-after',
  //   'dashicons dashicons-table-row-before',
  //   'dashicons dashicons-table-row-delete',
  //   'dashicons dashicons-tablet',
  //   'dashicons dashicons-tag',
  //   'dashicons dashicons-tagcloud',
  //   'dashicons dashicons-testimonial',
  //   'dashicons dashicons-text-page',
  //   'dashicons dashicons-text',
  //   'dashicons dashicons-thumbs-down',
  //   'dashicons dashicons-thumbs-up',
  //   'dashicons dashicons-tickets-alt',
  //   'dashicons dashicons-tickets',
  //   'dashicons dashicons-tide',
  //   'dashicons dashicons-translation',
  //   'dashicons dashicons-trash',
  //   'dashicons dashicons-twitter-alt',
  //   'dashicons dashicons-twitter',
  //   'dashicons dashicons-undo',
  //   'dashicons dashicons-universal-access-alt',
  //   'dashicons dashicons-universal-access',
  //   'dashicons dashicons-unlock',
  //   'dashicons dashicons-update-alt',
  //   'dashicons dashicons-update',
  //   'dashicons dashicons-upload',
  //   'dashicons dashicons-vault',
  //   'dashicons dashicons-video-alt',
  //   'dashicons dashicons-video-alt2',
  //   'dashicons dashicons-video-alt3',
  //   'dashicons dashicons-visibility',
  //   'dashicons dashicons-warning',
  //   'dashicons dashicons-welcome-add-page',
  //   'dashicons dashicons-welcome-comments',
  //   'dashicons dashicons-welcome-learn-more',
  //   'dashicons dashicons-welcome-view-site',
  //   'dashicons dashicons-welcome-widgets-menus',
  //   'dashicons dashicons-welcome-write-blog',
  //   'dashicons dashicons-wordpress-alt',
  //   'dashicons dashicons-wordpress',
  //   'dashicons dashicons-yes-alt',
  //   'dashicons dashicons-yes',
  //   'dashicons dashicons-editor-distractionfree',
  //   'dashicons dashicons-exerpt-view',
  //   'dashicons dashicons-format-links',
  //   'dashicons dashicons-format-standard',
  //   'dashicons dashicons-post-trash',
  //   'dashicons dashicons-share1',
  //   'dashicons dashicons-welcome-edit-page'
  // ],
  'Font Awesome icons': ['fab fa-500px', 'fab fa-accessible-icon', 'fab fa-accusoft', 'fab fa-acquisitions-incorporated', 'fa fa-ad', 'fa fa-address-book', 'fa fa-address-card', 'fa fa-adjust', 'fab fa-adn', 'fab fa-adobe', 'fab fa-adversal', 'fab fa-affiliatetheme', 'fa fa-air-freshener', 'fab fa-airbnb', 'fab fa-algolia', 'fa fa-align-center', 'fa fa-align-justify', 'fa fa-align-left', 'fa fa-align-right', 'fab fa-alipay', 'fa fa-allergies', 'fab fa-amazon', 'fab fa-amazon-pay', 'fa fa-ambulance', 'fa fa-american-sign-language-interpreting', 'fab fa-amilia', 'fa fa-anchor', 'fab fa-android', 'fab fa-angellist', 'fa fa-angle-double-down', 'fa fa-angle-double-left', 'fa fa-angle-double-right', 'fa fa-angle-double-up', 'fa fa-angle-down', 'fa fa-angle-left', 'fa fa-angle-right', 'fa fa-angle-up', 'fa fa-angry', 'fab fa-angrycreative', 'fab fa-angular', 'fa fa-ankh', 'fab fa-app-store', 'fab fa-app-store-ios', 'fab fa-apper', 'fab fa-apple', 'fa fa-apple-alt', 'fab fa-apple-pay', 'fa fa-archive', 'fa fa-archway', 'fa fa-arrow-alt-circle-down', 'fa fa-arrow-alt-circle-left', 'fa fa-arrow-alt-circle-right', 'fa fa-arrow-alt-circle-up', 'fa fa-arrow-circle-down', 'fa fa-arrow-circle-left', 'fa fa-arrow-circle-right', 'fa fa-arrow-circle-up', 'fa fa-arrow-down', 'fa fa-arrow-left', 'fa fa-arrow-right', 'fa fa-arrow-up', 'fa fa-arrows-alt', 'fa fa-arrows-alt-h', 'fa fa-arrows-alt-v', 'fab fa-artstation', 'fa fa-assistive-listening-systems', 'fa fa-asterisk', 'fab fa-asymmetrik', 'fa fa-at', 'fa fa-atlas', 'fab fa-atlassian', 'fa fa-atom', 'fab fa-audible', 'fa fa-audio-description', 'fab fa-autoprefixer', 'fab fa-avianex', 'fab fa-aviato', 'fa fa-award', 'fab fa-aws', 'fa fa-baby', 'fa fa-baby-carriage', 'fa fa-backspace', 'fa fa-backward', 'fa fa-bacon', 'fa fa-balance-scale', 'fa fa-balance-scale-left', 'fa fa-balance-scale-right', 'fa fa-ban', 'fa fa-band-aid', 'fab fa-bandcamp', 'fa fa-barcode', 'fa fa-bars', 'fa fa-baseball-ball', 'fa fa-basketball-ball', 'fa fa-bath', 'fa fa-battery-empty', 'fa fa-battery-full', 'fa fa-battery-half', 'fa fa-battery-quarter', 'fa fa-battery-three-quarters', 'fab fa-battle-net', 'fa fa-bed', 'fa fa-beer', 'fab fa-behance', 'fab fa-behance-square', 'fa fa-bell', 'fa fa-bell-slash', 'fa fa-bezier-curve', 'fa fa-bible', 'fa fa-bicycle', 'fa fa-biking', 'fab fa-bimobject', 'fa fa-binoculars', 'fa fa-biohazard', 'fa fa-birthday-cake', 'fab fa-bitbucket', 'fab fa-bitcoin', 'fab fa-bity', 'fab fa-black-tie', 'fab fa-blackberry', 'fa fa-blender', 'fa fa-blender-phone', 'fa fa-blind', 'fa fa-blog', 'fab fa-blogger', 'fab fa-blogger-b', 'fab fa-bluetooth', 'fab fa-bluetooth-b', 'fa fa-bold', 'fa fa-bolt', 'fa fa-bomb', 'fa fa-bone', 'fa fa-bong', 'fa fa-book', 'fa fa-book-dead', 'fa fa-book-medical', 'fa fa-book-open', 'fa fa-book-reader', 'fa fa-bookmark', 'fab fa-bootstrap', 'fa fa-border-all', 'fa fa-border-none', 'fa fa-border-style', 'fa fa-bowling-ball', 'fa fa-box', 'fa fa-box-open', 'fa fa-boxes', 'fa fa-braille', 'fa fa-brain', 'fa fa-bread-slice', 'fa fa-briefcase', 'fa fa-briefcase-medical', 'fa fa-broadcast-tower', 'fa fa-broom', 'fa fa-brush', 'fab fa-btc', 'fab fa-buffer', 'fa fa-bug', 'fa fa-building', 'fa fa-bullhorn', 'fa fa-bullseye', 'fa fa-burn', 'fab fa-buromobelexperte', 'fa fa-bus', 'fa fa-bus-alt', 'fa fa-business-time', 'fab fa-buysellads', 'fa fa-calculator', 'fa fa-calendar', 'fa fa-calendar-alt', 'fa fa-calendar-check', 'fa fa-calendar-day', 'fa fa-calendar-minus', 'fa fa-calendar-plus', 'fa fa-calendar-times', 'fa fa-calendar-week', 'fa fa-camera', 'fa fa-camera-retro', 'fa fa-campground', 'fab fa-canadian-maple-leaf', 'fa fa-candy-cane', 'fa fa-cannabis', 'fa fa-capsules', 'fa fa-car', 'fa fa-car-alt', 'fa fa-car-battery', 'fa fa-car-crash', 'fa fa-car-side', 'fa fa-caret-down', 'fa fa-caret-left', 'fa fa-caret-right', 'fa fa-caret-square-down', 'fa fa-caret-square-left', 'fa fa-caret-square-right', 'fa fa-caret-square-up', 'fa fa-caret-up', 'fa fa-carrot', 'fa fa-cart-arrow-down', 'fa fa-cart-plus', 'fa fa-cash-register', 'fa fa-cat', 'fab fa-cc-amazon-pay', 'fab fa-cc-amex', 'fab fa-cc-apple-pay', 'fab fa-cc-diners-club', 'fab fa-cc-discover', 'fab fa-cc-jcb', 'fab fa-cc-mastercard', 'fab fa-cc-paypal', 'fab fa-cc-stripe', 'fab fa-cc-visa', 'fab fa-centercode', 'fab fa-centos', 'fa fa-certificate', 'fa fa-chair', 'fa fa-chalkboard', 'fa fa-chalkboard-teacher', 'fa fa-charging-station', 'fa fa-chart-area', 'fa fa-chart-bar', 'fa fa-chart-line', 'fa fa-chart-pie', 'fa fa-check', 'fa fa-check-circle', 'fa fa-check-double', 'fa fa-check-square', 'fa fa-cheese', 'fa fa-chess', 'fa fa-chess-bishop', 'fa fa-chess-board', 'fa fa-chess-king', 'fa fa-chess-knight', 'fa fa-chess-pawn', 'fa fa-chess-queen', 'fa fa-chess-rook', 'fa fa-chevron-circle-down', 'fa fa-chevron-circle-left', 'fa fa-chevron-circle-right', 'fa fa-chevron-circle-up', 'fa fa-chevron-down', 'fa fa-chevron-left', 'fa fa-chevron-right', 'fa fa-chevron-up', 'fa fa-child', 'fab fa-chrome', 'fab fa-chromecast', 'fa fa-church', 'fa fa-circle', 'fa fa-circle-notch', 'fa fa-city', 'fa fa-clinic-medical', 'fa fa-clipboard', 'fa fa-clipboard-check', 'fa fa-clipboard-list', 'fa fa-clock', 'fa fa-clone', 'fa fa-closed-captioning', 'fa fa-cloud', 'fa fa-cloud-download-alt', 'fa fa-cloud-meatball', 'fa fa-cloud-moon', 'fa fa-cloud-moon-rain', 'fa fa-cloud-rain', 'fa fa-cloud-showers-heavy', 'fa fa-cloud-sun', 'fa fa-cloud-sun-rain', 'fa fa-cloud-upload-alt', 'fab fa-cloudscale', 'fab fa-cloudsmith', 'fab fa-cloudversify', 'fa fa-cocktail', 'fa fa-code', 'fa fa-code-branch', 'fab fa-codepen', 'fab fa-codiepie', 'fa fa-coffee', 'fa fa-cog', 'fa fa-cogs', 'fa fa-coins', 'fa fa-columns', 'fa fa-comment', 'fa fa-comment-alt', 'fa fa-comment-dollar', 'fa fa-comment-dots', 'fa fa-comment-medical', 'fa fa-comment-slash', 'fa fa-comments', 'fa fa-comments-dollar', 'fa fa-compact-disc', 'fa fa-compass', 'fa fa-compress', 'fa fa-compress-arrows-alt', 'fa fa-concierge-bell', 'fab fa-confluence', 'fab fa-connectdevelop', 'fab fa-contao', 'fa fa-cookie', 'fa fa-cookie-bite', 'fa fa-copy', 'fa fa-copyright', 'fa fa-couch', 'fab fa-cpanel', 'fab fa-creative-commons', 'fab fa-creative-commons-by', 'fab fa-creative-commons-nc', 'fab fa-creative-commons-nc-eu', 'fab fa-creative-commons-nc-jp', 'fab fa-creative-commons-nd', 'fab fa-creative-commons-pd', 'fab fa-creative-commons-pd-alt', 'fab fa-creative-commons-remix', 'fab fa-creative-commons-sa', 'fab fa-creative-commons-sampling', 'fab fa-creative-commons-sampling-plus', 'fab fa-creative-commons-share', 'fab fa-creative-commons-zero', 'fa fa-credit-card', 'fab fa-critical-role', 'fa fa-crop', 'fa fa-crop-alt', 'fa fa-cross', 'fa fa-crosshairs', 'fa fa-crow', 'fa fa-crown', 'fa fa-crutch', 'fab fa-css3', 'fab fa-css3-alt', 'fa fa-cube', 'fa fa-cubes', 'fa fa-cut', 'fab fa-cuttlefish', 'fab fa-d-and-d', 'fab fa-d-and-d-beyond', 'fab fa-dashcube', 'fa fa-database', 'fa fa-deaf', 'fab fa-delicious', 'fa fa-democrat', 'fab fa-deploydog', 'fab fa-deskpro', 'fa fa-desktop', 'fab fa-dev', 'fab fa-deviantart', 'fa fa-dharmachakra', 'fab fa-dhl', 'fa fa-diagnoses', 'fab fa-diaspora', 'fa fa-dice', 'fa fa-dice-d20', 'fa fa-dice-d6', 'fa fa-dice-five', 'fa fa-dice-four', 'fa fa-dice-one', 'fa fa-dice-six', 'fa fa-dice-three', 'fa fa-dice-two', 'fab fa-digg', 'fab fa-digital-ocean', 'fa fa-digital-tachograph', 'fa fa-directions', 'fab fa-discord', 'fab fa-discourse', 'fa fa-divide', 'fa fa-dizzy', 'fa fa-dna', 'fab fa-dochub', 'fab fa-docker', 'fa fa-dog', 'fa fa-dollar-sign', 'fa fa-dolly', 'fa fa-dolly-flatbed', 'fa fa-donate', 'fa fa-door-closed', 'fa fa-door-open', 'fa fa-dot-circle', 'fa fa-dove', 'fa fa-download', 'fab fa-draft2digital', 'fa fa-drafting-compass', 'fa fa-dragon', 'fa fa-draw-polygon', 'fab fa-dribbble', 'fab fa-dribbble-square', 'fab fa-dropbox', 'fa fa-drum', 'fa fa-drum-steelpan', 'fa fa-drumstick-bite', 'fab fa-drupal', 'fa fa-dumbbell', 'fa fa-dumpster', 'fa fa-dumpster-fire', 'fa fa-dungeon', 'fab fa-dyalog', 'fab fa-earlybirds', 'fab fa-ebay', 'fab fa-edge', 'fa fa-edit', 'fa fa-egg', 'fa fa-eject', 'fab fa-elementor', 'fa fa-ellipsis-h', 'fa fa-ellipsis-v', 'fab fa-ello', 'fab fa-ember', 'fab fa-empire', 'fa fa-envelope', 'fa fa-envelope-open', 'fa fa-envelope-open-text', 'fa fa-envelope-square', 'fab fa-envira', 'fa fa-equals', 'fa fa-eraser', 'fab fa-erlang', 'fab fa-ethereum', 'fa fa-ethernet', 'fab fa-etsy', 'fa fa-euro-sign', 'fab fa-evernote', 'fa fa-exchange-alt', 'fa fa-exclamation', 'fa fa-exclamation-circle', 'fa fa-exclamation-triangle', 'fa fa-expand', 'fa fa-expand-arrows-alt', 'fab fa-expeditedssl', 'fa fa-external-link-alt', 'fa fa-external-link-square-alt', 'fa fa-eye', 'fa fa-eye-dropper', 'fa fa-eye-slash', 'fab fa-facebook', 'fab fa-facebook-f', 'fab fa-facebook-messenger', 'fab fa-facebook-square', 'fa fa-fan', 'fab fa-fantasy-flight-games', 'fa fa-fast-backward', 'fa fa-fast-forward', 'fa fa-fax', 'fa fa-feather', 'fa fa-feather-alt', 'fab fa-fedex', 'fab fa-fedora', 'fa fa-female', 'fa fa-fighter-jet', 'fab fa-figma', 'fa fa-file', 'fa fa-file-alt', 'fa fa-file-archive', 'fa fa-file-audio', 'fa fa-file-code', 'fa fa-file-contract', 'fa fa-file-csv', 'fa fa-file-download', 'fa fa-file-excel', 'fa fa-file-export', 'fa fa-file-image', 'fa fa-file-import', 'fa fa-file-invoice', 'fa fa-file-invoice-dollar', 'fa fa-file-medical', 'fa fa-file-medical-alt', 'fa fa-file-pdf', 'fa fa-file-powerpoint', 'fa fa-file-prescription', 'fa fa-file-signature', 'fa fa-file-upload', 'fa fa-file-video', 'fa fa-file-word', 'fa fa-fill', 'fa fa-fill-drip', 'fa fa-film', 'fa fa-filter', 'fa fa-fingerprint', 'fa fa-fire', 'fa fa-fire-alt', 'fa fa-fire-extinguisher', 'fab fa-firefox', 'fa fa-first-aid', 'fab fa-first-order', 'fab fa-first-order-alt', 'fab fa-firstdraft', 'fa fa-fish', 'fa fa-fist-raised', 'fa fa-flag', 'fa fa-flag-checkered', 'fa fa-flag-usa', 'fa fa-flask', 'fab fa-flickr', 'fab fa-flipboard', 'fa fa-flushed', 'fab fa-fly', 'fa fa-folder', 'fa fa-folder-minus', 'fa fa-folder-open', 'fa fa-folder-plus', 'fa fa-font', 'fab fa-font-awesome', 'fab fa-font-awesome-alt', 'fab fa-font-awesome-flag', 'fab fa-font-awesome-logo-full', 'fab fa-fonticons', 'fab fa-fonticons-fi', 'fa fa-football-ball', 'fab fa-fort-awesome', 'fab fa-fort-awesome-alt', 'fab fa-forumbee', 'fa fa-forward', 'fab fa-foursquare', 'fab fa-free-code-camp', 'fab fa-freebsd', 'fa fa-frog', 'fa fa-frown', 'fa fa-frown-open', 'fab fa-fulcrum', 'fa fa-funnel-dollar', 'fa fa-futbol', 'fab fa-galactic-republic', 'fab fa-galactic-senate', 'fa fa-gamepad', 'fa fa-gas-pump', 'fa fa-gavel', 'fa fa-gem', 'fa fa-genderless', 'fab fa-get-pocket', 'fab fa-gg', 'fab fa-gg-circle', 'fa fa-ghost', 'fa fa-gift', 'fa fa-gifts', 'fab fa-git', 'fab fa-git-alt', 'fab fa-git-square', 'fab fa-github', 'fab fa-github-alt', 'fab fa-github-square', 'fab fa-gitkraken', 'fab fa-gitlab', 'fab fa-gitter', 'fa fa-glass-cheers', 'fa fa-glass-martini', 'fa fa-glass-martini-alt', 'fa fa-glass-whiskey', 'fa fa-glasses', 'fab fa-glide', 'fab fa-glide-g', 'fa fa-globe', 'fa fa-globe-africa', 'fa fa-globe-americas', 'fa fa-globe-asia', 'fa fa-globe-europe', 'fab fa-gofore', 'fa fa-golf-ball', 'fab fa-goodreads', 'fab fa-goodreads-g', 'fab fa-google', 'fab fa-google-drive', 'fab fa-google-play', 'fab fa-google-plus', 'fab fa-google-plus-g', 'fab fa-google-plus-square', 'fab fa-google-wallet', 'fa fa-gopuram', 'fa fa-graduation-cap', 'fab fa-gratipay', 'fab fa-grav', 'fa fa-greater-than', 'fa fa-greater-than-equal', 'fa fa-grimace', 'fa fa-grin', 'fa fa-grin-alt', 'fa fa-grin-beam', 'fa fa-grin-beam-sweat', 'fa fa-grin-hearts', 'fa fa-grin-squint', 'fa fa-grin-squint-tears', 'fa fa-grin-stars', 'fa fa-grin-tears', 'fa fa-grin-tongue', 'fa fa-grin-tongue-squint', 'fa fa-grin-tongue-wink', 'fa fa-grin-wink', 'fa fa-grip-horizontal', 'fa fa-grip-lines', 'fa fa-grip-lines-vertical', 'fa fa-grip-vertical', 'fab fa-gripfire', 'fab fa-grunt', 'fa fa-guitar', 'fab fa-gulp', 'fa fa-h-square', 'fab fa-hacker-news', 'fab fa-hacker-news-square', 'fab fa-hackerrank', 'fa fa-hamburger', 'fa fa-hammer', 'fa fa-hamsa', 'fa fa-hand-holding', 'fa fa-hand-holding-heart', 'fa fa-hand-holding-usd', 'fa fa-hand-lizard', 'fa fa-hand-middle-finger', 'fa fa-hand-paper', 'fa fa-hand-peace', 'fa fa-hand-point-down', 'fa fa-hand-point-left', 'fa fa-hand-point-right', 'fa fa-hand-point-up', 'fa fa-hand-pointer', 'fa fa-hand-rock', 'fa fa-hand-scissors', 'fa fa-hand-spock', 'fa fa-hands', 'fa fa-hands-helping', 'fa fa-handshake', 'fa fa-hanukiah', 'fa fa-hard-hat', 'fa fa-hashtag', 'fa fa-hat-wizard', 'fa fa-haykal', 'fa fa-hdd', 'fa fa-heading', 'fa fa-headphones', 'fa fa-headphones-alt', 'fa fa-headset', 'fa fa-heart', 'fa fa-heart-broken', 'fa fa-heartbeat', 'fa fa-helicopter', 'fa fa-highlighter', 'fa fa-hiking', 'fa fa-hippo', 'fab fa-hips', 'fab fa-hire-a-helper', 'fa fa-history', 'fa fa-hockey-puck', 'fa fa-holly-berry', 'fa fa-home', 'fab fa-hooli', 'fab fa-hornbill', 'fa fa-horse', 'fa fa-horse-head', 'fa fa-hospital', 'fa fa-hospital-alt', 'fa fa-hospital-symbol', 'fa fa-hot-tub', 'fa fa-hotdog', 'fa fa-hotel', 'fab fa-hotjar', 'fa fa-hourglass', 'fa fa-hourglass-end', 'fa fa-hourglass-half', 'fa fa-hourglass-start', 'fa fa-house-damage', 'fab fa-houzz', 'fa fa-hryvnia', 'fab fa-html5', 'fab fa-hubspot', 'fa fa-i-cursor', 'fa fa-ice-cream', 'fa fa-icicles', 'fa fa-icons', 'fa fa-id-badge', 'fa fa-id-card', 'fa fa-id-card-alt', 'fa fa-igloo', 'fa fa-image', 'fa fa-images', 'fab fa-imdb', 'fa fa-inbox', 'fa fa-indent', 'fa fa-industry', 'fa fa-infinity', 'fa fa-info', 'fa fa-info-circle', 'fab fa-instagram', 'fab fa-intercom', 'fab fa-internet-explorer', 'fab fa-invision', 'fab fa-ioxhost', 'fa fa-italic', 'fab fa-itch-io', 'fab fa-itunes', 'fab fa-itunes-note', 'fab fa-java', 'fa fa-jedi', 'fab fa-jedi-order', 'fab fa-jenkins', 'fab fa-jira', 'fab fa-joget', 'fa fa-joint', 'fab fa-joomla', 'fa fa-journal-whills', 'fab fa-js', 'fab fa-js-square', 'fab fa-jsfiddle', 'fa fa-kaaba', 'fab fa-kaggle', 'fa fa-key', 'fab fa-keybase', 'fa fa-keyboard', 'fab fa-keycdn', 'fa fa-khanda', 'fab fa-kickstarter', 'fab fa-kickstarter-k', 'fa fa-kiss', 'fa fa-kiss-beam', 'fa fa-kiss-wink-heart', 'fa fa-kiwi-bird', 'fab fa-korvue', 'fa fa-landmark', 'fa fa-language', 'fa fa-laptop', 'fa fa-laptop-code', 'fa fa-laptop-medical', 'fab fa-laravel', 'fab fa-lastfm', 'fab fa-lastfm-square', 'fa fa-laugh', 'fa fa-laugh-beam', 'fa fa-laugh-squint', 'fa fa-laugh-wink', 'fa fa-layer-group', 'fa fa-leaf', 'fab fa-leanpub', 'fa fa-lemon', 'fab fa-less', 'fa fa-less-than', 'fa fa-less-than-equal', 'fa fa-level-down-alt', 'fa fa-level-up-alt', 'fa fa-life-ring', 'fa fa-lightbulb', 'fab fa-line', 'fa fa-link', 'fab fa-linkedin', 'fab fa-linkedin-in', 'fab fa-linode', 'fab fa-linux', 'fa fa-lira-sign', 'fa fa-list', 'fa fa-list-alt', 'fa fa-list-ol', 'fa fa-list-ul', 'fa fa-location-arrow', 'fa fa-lock', 'fa fa-lock-open', 'fa fa-long-arrow-alt-down', 'fa fa-long-arrow-alt-left', 'fa fa-long-arrow-alt-right', 'fa fa-long-arrow-alt-up', 'fa fa-low-vision', 'fa fa-luggage-cart', 'fab fa-lyft', 'fab fa-magento', 'fa fa-magic', 'fa fa-magnet', 'fa fa-mail-bulk', 'fab fa-mailchimp', 'fa fa-male', 'fab fa-mandalorian', 'fa fa-map', 'fa fa-map-marked', 'fa fa-map-marked-alt', 'fa fa-map-marker', 'fa fa-map-marker-alt', 'fa fa-map-pin', 'fa fa-map-signs', 'fab fa-markdown', 'fa fa-marker', 'fa fa-mars', 'fa fa-mars-double', 'fa fa-mars-stroke', 'fa fa-mars-stroke-h', 'fa fa-mars-stroke-v', 'fa fa-mask', 'fab fa-mastodon', 'fab fa-maxcdn', 'fa fa-medal', 'fab fa-medapps', 'fab fa-medium', 'fab fa-medium-m', 'fa fa-medkit', 'fab fa-medrt', 'fab fa-meetup', 'fab fa-megaport', 'fa fa-meh', 'fa fa-meh-blank', 'fa fa-meh-rolling-eyes', 'fa fa-memory', 'fab fa-mendeley', 'fa fa-menorah', 'fa fa-mercury', 'fa fa-meteor', 'fa fa-microchip', 'fa fa-microphone', 'fa fa-microphone-alt', 'fa fa-microphone-alt-slash', 'fa fa-microphone-slash', 'fa fa-microscope', 'fab fa-microsoft', 'fa fa-minus', 'fa fa-minus-circle', 'fa fa-minus-square', 'fa fa-mitten', 'fab fa-mix', 'fab fa-mixcloud', 'fab fa-mizuni', 'fa fa-mobile', 'fa fa-mobile-alt', 'fab fa-modx', 'fab fa-monero', 'fa fa-money-bill', 'fa fa-money-bill-alt', 'fa fa-money-bill-wave', 'fa fa-money-bill-wave-alt', 'fa fa-money-check', 'fa fa-money-check-alt', 'fa fa-monument', 'fa fa-moon', 'fa fa-mortar-pestle', 'fa fa-mosque', 'fa fa-motorcycle', 'fa fa-mountain', 'fa fa-mouse-pointer', 'fa fa-mug-hot', 'fa fa-music', 'fab fa-napster', 'fab fa-neos', 'fa fa-network-wired', 'fa fa-neuter', 'fa fa-newspaper', 'fab fa-nimblr', 'fab fa-node', 'fab fa-node-js', 'fa fa-not-equal', 'fa fa-notes-medical', 'fab fa-npm', 'fab fa-ns8', 'fab fa-nutritionix', 'fa fa-object-group', 'fa fa-object-ungroup', 'fab fa-odnoklassniki', 'fab fa-odnoklassniki-square', 'fa fa-oil-can', 'fab fa-old-republic', 'fa fa-om', 'fab fa-opencart', 'fab fa-openid', 'fab fa-opera', 'fab fa-optin-monster', 'fab fa-osi', 'fa fa-otter', 'fa fa-outdent', 'fab fa-page4', 'fab fa-pagelines', 'fa fa-pager', 'fa fa-paint-brush', 'fa fa-paint-roller', 'fa fa-palette', 'fab fa-palfed', 'fa fa-pallet', 'fa fa-paper-plane', 'fa fa-paperclip', 'fa fa-parachute-box', 'fa fa-paragraph', 'fa fa-parking', 'fa fa-passport', 'fa fa-pastafarianism', 'fa fa-paste', 'fab fa-patreon', 'fa fa-pause', 'fa fa-pause-circle', 'fa fa-paw', 'fab fa-paypal', 'fa fa-peace', 'fa fa-pen', 'fa fa-pen-alt', 'fa fa-pen-fancy', 'fa fa-pen-nib', 'fa fa-pen-square', 'fa fa-pencil-alt', 'fa fa-pencil-ruler', 'fab fa-penny-arcade', 'fa fa-people-carry', 'fa fa-pepper-hot', 'fa fa-percent', 'fa fa-percentage', 'fab fa-periscope', 'fa fa-person-booth', 'fab fa-phabricator', 'fab fa-phoenix-framework', 'fab fa-phoenix-squadron', 'fa fa-phone', 'fa fa-phone-alt', 'fa fa-phone-slash', 'fa fa-phone-square', 'fa fa-phone-square-alt', 'fa fa-phone-volume', 'fa fa-photo-video', 'fab fa-php', 'fab fa-pied-piper', 'fab fa-pied-piper-alt', 'fab fa-pied-piper-hat', 'fab fa-pied-piper-pp', 'fa fa-piggy-bank', 'fa fa-pills', 'fab fa-pinterest', 'fab fa-pinterest-p', 'fab fa-pinterest-square', 'fa fa-pizza-slice', 'fa fa-place-of-worship', 'fa fa-plane', 'fa fa-plane-arrival', 'fa fa-plane-departure', 'fa fa-play', 'fa fa-play-circle', 'fab fa-playstation', 'fa fa-plug', 'fa fa-plus', 'fa fa-plus-circle', 'fa fa-plus-square', 'fa fa-podcast', 'fa fa-poll', 'fa fa-poll-h', 'fa fa-poo', 'fa fa-poo-storm', 'fa fa-poop', 'fa fa-portrait', 'fa fa-pound-sign', 'fa fa-power-off', 'fa fa-pray', 'fa fa-praying-hands', 'fa fa-prescription', 'fa fa-prescription-bottle', 'fa fa-prescription-bottle-alt', 'fa fa-print', 'fa fa-procedures', 'fab fa-product-hunt', 'fa fa-project-diagram', 'fab fa-pushed', 'fa fa-puzzle-piece', 'fab fa-python', 'fab fa-qq', 'fa fa-qrcode', 'fa fa-question', 'fa fa-question-circle', 'fa fa-quidditch', 'fab fa-quinscape', 'fab fa-quora', 'fa fa-quote-left', 'fa fa-quote-right', 'fa fa-quran', 'fab fa-r-project', 'fa fa-radiation', 'fa fa-radiation-alt', 'fa fa-rainbow', 'fa fa-random', 'fab fa-raspberry-pi', 'fab fa-ravelry', 'fab fa-react', 'fab fa-reacteurope', 'fab fa-readme', 'fab fa-rebel', 'fa fa-receipt', 'fa fa-recycle', 'fab fa-red-river', 'fab fa-reddit', 'fab fa-reddit-alien', 'fab fa-reddit-square', 'fab fa-redhat', 'fa fa-redo', 'fa fa-redo-alt', 'fa fa-registered', 'fa fa-remove-format', 'fab fa-renren', 'fa fa-reply', 'fa fa-reply-all', 'fab fa-replyd', 'fa fa-republican', 'fab fa-researchgate', 'fab fa-resolving', 'fa fa-restroom', 'fa fa-retweet', 'fab fa-rev', 'fa fa-ribbon', 'fa fa-ring', 'fa fa-road', 'fa fa-robot', 'fa fa-rocket', 'fab fa-rocketchat', 'fab fa-rockrms', 'fa fa-route', 'fa fa-rss', 'fa fa-rss-square', 'fa fa-ruble-sign', 'fa fa-ruler', 'fa fa-ruler-combined', 'fa fa-ruler-horizontal', 'fa fa-ruler-vertical', 'fa fa-running', 'fa fa-rupee-sign', 'fa fa-sad-cry', 'fa fa-sad-tear', 'fab fa-safari', 'fab fa-salesforce', 'fab fa-sass', 'fa fa-satellite', 'fa fa-satellite-dish', 'fa fa-save', 'fab fa-schlix', 'fa fa-school', 'fa fa-screwdriver', 'fab fa-scribd', 'fa fa-scroll', 'fa fa-sd-card', 'fa fa-search', 'fa fa-search-dollar', 'fa fa-search-location', 'fa fa-search-minus', 'fa fa-search-plus', 'fab fa-searchengin', 'fa fa-seedling', 'fab fa-sellcast', 'fab fa-sellsy', 'fa fa-server', 'fab fa-servicestack', 'fa fa-shapes', 'fa fa-share', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-share-square', 'fa fa-shekel-sign', 'fa fa-shield-alt', 'fa fa-ship', 'fa fa-shipping-fast', 'fab fa-shirtsinbulk', 'fa fa-shoe-prints', 'fa fa-shopping-bag', 'fa fa-shopping-basket', 'fa fa-shopping-cart', 'fab fa-shopware', 'fa fa-shower', 'fa fa-shuttle-van', 'fa fa-sign', 'fa fa-sign-in-alt', 'fa fa-sign-language', 'fa fa-sign-out-alt', 'fa fa-signal', 'fa fa-signature', 'fa fa-sim-card', 'fab fa-simplybuilt', 'fab fa-sistrix', 'fa fa-sitemap', 'fab fa-sith', 'fa fa-skating', 'fab fa-sketch', 'fa fa-skiing', 'fa fa-skiing-nordic', 'fa fa-skull', 'fa fa-skull-crossbones', 'fab fa-skyatlas', 'fab fa-skype', 'fab fa-slack', 'fab fa-slack-hash', 'fa fa-slash', 'fa fa-sleigh', 'fa fa-sliders-h', 'fab fa-slideshare', 'fa fa-smile', 'fa fa-smile-beam', 'fa fa-smile-wink', 'fa fa-smog', 'fa fa-smoking', 'fa fa-smoking-ban', 'fa fa-sms', 'fab fa-snapchat', 'fab fa-snapchat-ghost', 'fab fa-snapchat-square', 'fa fa-snowboarding', 'fa fa-snowflake', 'fa fa-snowman', 'fa fa-snowplow', 'fa fa-socks', 'fa fa-solar-panel', 'fa fa-sort', 'fa fa-sort-alpha-down', 'fa fa-sort-alpha-down-alt', 'fa fa-sort-alpha-up', 'fa fa-sort-alpha-up-alt', 'fa fa-sort-amount-down', 'fa fa-sort-amount-down-alt', 'fa fa-sort-amount-up', 'fa fa-sort-amount-up-alt', 'fa fa-sort-down', 'fa fa-sort-numeric-down', 'fa fa-sort-numeric-down-alt', 'fa fa-sort-numeric-up', 'fa fa-sort-numeric-up-alt', 'fa fa-sort-up', 'fab fa-soundcloud', 'fab fa-sourcetree', 'fa fa-spa', 'fa fa-space-shuttle', 'fab fa-speakap', 'fab fa-speaker-deck', 'fa fa-spell-check', 'fa fa-spider', 'fa fa-spinner', 'fa fa-splotch', 'fab fa-spotify', 'fa fa-spray-can', 'fa fa-square', 'fa fa-square-full', 'fa fa-square-root-alt', 'fab fa-squarespace', 'fab fa-stack-exchange', 'fab fa-stack-overflow', 'fab fa-stackpath', 'fa fa-stamp', 'fa fa-star', 'fa fa-star-and-crescent', 'fa fa-star-half', 'fa fa-star-half-alt', 'fa fa-star-of-david', 'fa fa-star-of-life', 'fab fa-staylinked', 'fab fa-steam', 'fab fa-steam-square', 'fab fa-steam-symbol', 'fa fa-step-backward', 'fa fa-step-forward', 'fa fa-stethoscope', 'fab fa-sticker-mule', 'fa fa-sticky-note', 'fa fa-stop', 'fa fa-stop-circle', 'fa fa-stopwatch', 'fa fa-store', 'fa fa-store-alt', 'fab fa-strava', 'fa fa-stream', 'fa fa-street-view', 'fa fa-strikethrough', 'fab fa-stripe', 'fab fa-stripe-s', 'fa fa-stroopwafel', 'fab fa-studiovinari', 'fab fa-stumbleupon', 'fab fa-stumbleupon-circle', 'fa fa-subscript', 'fa fa-subway', 'fa fa-suitcase', 'fa fa-suitcase-rolling', 'fa fa-sun', 'fab fa-superpowers', 'fa fa-superscript', 'fab fa-supple', 'fa fa-surprise', 'fab fa-suse', 'fa fa-swatchbook', 'fa fa-swimmer', 'fa fa-swimming-pool', 'fab fa-symfony', 'fa fa-synagogue', 'fa fa-sync', 'fa fa-sync-alt', 'fa fa-syringe', 'fa fa-table', 'fa fa-table-tennis', 'fa fa-tablet', 'fa fa-tablet-alt', 'fa fa-tablets', 'fa fa-tachometer-alt', 'fa fa-tag', 'fa fa-tags', 'fa fa-tape', 'fa fa-tasks', 'fa fa-taxi', 'fab fa-teamspeak', 'fa fa-teeth', 'fa fa-teeth-open', 'fab fa-telegram', 'fab fa-telegram-plane', 'fa fa-temperature-high', 'fa fa-temperature-low', 'fab fa-tencent-weibo', 'fa fa-tenge', 'fa fa-terminal', 'fa fa-text-height', 'fa fa-text-width', 'fa fa-th', 'fa fa-th-large', 'fa fa-th-list', 'fab fa-the-red-yeti', 'fa fa-theater-masks', 'fab fa-themeco', 'fab fa-themeisle', 'fa fa-thermometer', 'fa fa-thermometer-empty', 'fa fa-thermometer-full', 'fa fa-thermometer-half', 'fa fa-thermometer-quarter', 'fa fa-thermometer-three-quarters', 'fab fa-think-peaks', 'fa fa-thumbs-down', 'fa fa-thumbs-up', 'fa fa-thumbtack', 'fa fa-ticket-alt', 'fa fa-times', 'fa fa-times-circle', 'fa fa-tint', 'fa fa-tint-slash', 'fa fa-tired', 'fa fa-toggle-off', 'fa fa-toggle-on', 'fa fa-toilet', 'fa fa-toilet-paper', 'fa fa-toolbox', 'fa fa-tools', 'fa fa-tooth', 'fa fa-torah', 'fa fa-torii-gate', 'fa fa-tractor', 'fab fa-trade-federation', 'fa fa-trademark', 'fa fa-traffic-light', 'fa fa-train', 'fa fa-tram', 'fa fa-transgender', 'fa fa-transgender-alt', 'fa fa-trash', 'fa fa-trash-alt', 'fa fa-trash-restore', 'fa fa-trash-restore-alt', 'fa fa-tree', 'fab fa-trello', 'fab fa-tripadvisor', 'fa fa-trophy', 'fa fa-truck', 'fa fa-truck-loading', 'fa fa-truck-monster', 'fa fa-truck-moving', 'fa fa-truck-pickup', 'fa fa-tshirt', 'fa fa-tty', 'fab fa-tumblr', 'fab fa-tumblr-square', 'fa fa-tv', 'fab fa-twitch', 'fab fa-twitter', 'fab fa-twitter-square', 'fab fa-typo3', 'fab fa-uber', 'fab fa-ubuntu', 'fab fa-uikit', 'fa fa-umbrella', 'fa fa-umbrella-beach', 'fa fa-underline', 'fa fa-undo', 'fa fa-undo-alt', 'fab fa-uniregistry', 'fa fa-universal-access', 'fa fa-university', 'fa fa-unlink', 'fa fa-unlock', 'fa fa-unlock-alt', 'fab fa-untappd', 'fa fa-upload', 'fab fa-ups', 'fab fa-usb', 'fa fa-user', 'fa fa-user-alt', 'fa fa-user-alt-slash', 'fa fa-user-astronaut', 'fa fa-user-check', 'fa fa-user-circle', 'fa fa-user-clock', 'fa fa-user-cog', 'fa fa-user-edit', 'fa fa-user-friends', 'fa fa-user-graduate', 'fa fa-user-injured', 'fa fa-user-lock', 'fa fa-user-md', 'fa fa-user-minus', 'fa fa-user-ninja', 'fa fa-user-nurse', 'fa fa-user-plus', 'fa fa-user-secret', 'fa fa-user-shield', 'fa fa-user-slash', 'fa fa-user-tag', 'fa fa-user-tie', 'fa fa-user-times', 'fa fa-users', 'fa fa-users-cog', 'fab fa-usps', 'fab fa-ussunnah', 'fa fa-utensil-spoon', 'fa fa-utensils', 'fab fa-vaadin', 'fa fa-vector-square', 'fa fa-venus', 'fa fa-venus-double', 'fa fa-venus-mars', 'fab fa-viacoin', 'fab fa-viadeo', 'fab fa-viadeo-square', 'fa fa-vial', 'fa fa-vials', 'fab fa-viber', 'fa fa-video', 'fa fa-video-slash', 'fa fa-vihara', 'fab fa-vimeo', 'fab fa-vimeo-square', 'fab fa-vimeo-v', 'fab fa-vine', 'fab fa-vk', 'fab fa-vnv', 'fa fa-voicemail', 'fa fa-volleyball-ball', 'fa fa-volume-down', 'fa fa-volume-mute', 'fa fa-volume-off', 'fa fa-volume-up', 'fa fa-vote-yea', 'fa fa-vr-cardboard', 'fab fa-vuejs', 'fa fa-walking', 'fa fa-wallet', 'fa fa-warehouse', 'fa fa-water', 'fa fa-wave-square', 'fab fa-waze', 'fab fa-weebly', 'fab fa-weibo', 'fa fa-weight', 'fa fa-weight-hanging', 'fab fa-weixin', 'fab fa-whatsapp', 'fab fa-whatsapp-square', 'fa fa-wheelchair', 'fab fa-whmcs', 'fa fa-wifi', 'fab fa-wikipedia-w', 'fa fa-wind', 'fa fa-window-close', 'fa fa-window-maximize', 'fa fa-window-minimize', 'fa fa-window-restore', 'fab fa-windows', 'fa fa-wine-bottle', 'fa fa-wine-glass', 'fa fa-wine-glass-alt', 'fab fa-wix', 'fab fa-wizards-of-the-coast', 'fab fa-wolf-pack-battalion', 'fa fa-won-sign', 'fab fa-wordpress', 'fab fa-wordpress-simple', 'fab fa-wpbeginner', 'fab fa-wpexplorer', 'fab fa-wpforms', 'fab fa-wpressr', 'fa fa-wrench', 'fa fa-x-ray', 'fab fa-xbox', 'fab fa-xing', 'fab fa-xing-square', 'fab fa-y-combinator', 'fab fa-yahoo', 'fab fa-yammer', 'fab fa-yandex', 'fab fa-yandex-international', 'fab fa-yarn', 'fab fa-yelp', 'fa fa-yen-sign', 'fa fa-yin-yang', 'fab fa-yoast', 'fab fa-youtube', 'fab fa-youtube-square', 'fab fa-zhihu']
};
/* harmony default export */ __webpack_exports__["default"] = (iconsList);

/***/ }),

/***/ "./src/assets/js/blocks/libs/select-icon/index.js":
/*!********************************************************!*\
  !*** ./src/assets/js/blocks/libs/select-icon/index.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./icons */ "./src/assets/js/blocks/libs/select-icon/icons.js");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/assets/js/blocks/libs/select-icon/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_1__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }



var Component = wp.element.Component;

var SelectIcon =
/*#__PURE__*/
function (_Component) {
  _inherits(SelectIcon, _Component);

  function SelectIcon() {
    var _this;

    _classCallCheck(this, SelectIcon);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(SelectIcon).call(this));
    _this.state = {
      items: [],
      search: '',
      icon: ''
    };
    _this.loadData = _this.loadData.bind(_assertThisInitialized(_this));
    _this.iconShanged = _this.iconShanged.bind(_assertThisInitialized(_this));
    _this.filter = _this.filter.bind(_assertThisInitialized(_this));
    _this.run = _this.run.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(SelectIcon, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.loadData();
    }
  }, {
    key: "loadData",
    value: function loadData() {
      var _this2 = this;

      if (!_icons__WEBPACK_IMPORTED_MODULE_0__["default"]) return;
      var items = [];
      Object.keys(_icons__WEBPACK_IMPORTED_MODULE_0__["default"]).forEach(function (cat) {
        for (var j = 0; j < _icons__WEBPACK_IMPORTED_MODULE_0__["default"][cat].length; j++) {
          if (_icons__WEBPACK_IMPORTED_MODULE_0__["default"][cat][j].indexOf(_this2.state.search) > -1) {
            items.push(_icons__WEBPACK_IMPORTED_MODULE_0__["default"][cat][j]);
          }
        }
      });
      this.setState({
        items: items
      });
    }
  }, {
    key: "iconShanged",
    value: function iconShanged(e) {
      e.preventDefault();
      var icon = e.target.tagName === 'INPUT' ? e.target.value : e.currentTarget.dataset.icon;
      this.setState({
        icon: icon
      });
      this.props.onSelect(icon);
    }
  }, {
    key: "filter",
    value: function filter(e) {
      this.setState({
        search: e.target.value
      }, this.loadData);
    }
  }, {
    key: "run",
    value: function run(e) {
      e.preventDefault();
      var target = e.currentTarget;
      var parent = target.parentElement;
      var container = parent.querySelector('.icons-container');

      if (container) {
        if (!container.classList.contains('opened')) {
          target.classList.add('opened');
          container.classList.add('opened');
        } else {
          target.classList.remove('opened');
          container.classList.remove('opened');
        }

        var remove = function remove() {
          target.classList.remove('opened');
          container.classList.remove('opened');

          if (parent.removeEventListener) {
            parent.removeEventListener('mouseleave', remove);
          }
        };

        parent.addEventListener('mouseleave', remove);
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this3 = this;

      var _this$props = this.props,
          classPlaceholder = _this$props.classPlaceholder,
          fliterPlaceholder = _this$props.fliterPlaceholder;
      return React.createElement("div", {
        className: "awesome-blocks-select-icon"
      }, React.createElement("a", {
        href: "#",
        onClick: this.run,
        className: "toggle"
      }, this.props.title, " [ ", React.createElement("i", {
        className: this.props.value
      }), " ]"), React.createElement("div", {
        className: "icons-container"
      }, React.createElement("input", _extends({
        type: "text",
        name: "icon",
        value: this.props.value || '',
        onChange: this.iconShanged
      }, classPlaceholder ? {
        placeholder: classPlaceholder
      } : {})), React.createElement("input", _extends({
        type: "search",
        name: "filter",
        onChange: this.filter
      }, fliterPlaceholder ? {
        placeholder: fliterPlaceholder
      } : {})), React.createElement("ul", null, this.state.items.length && this.state.items.map(function (item, index) {
        return React.createElement("li", {
          key: index
        }, React.createElement("a", {
          href: "#",
          "data-icon": item,
          onClick: _this3.iconShanged,
          className: _this3.props.value === item ? 'active' : ''
        }, React.createElement("i", {
          className: item
        })));
      }))));
    }
  }]);

  return SelectIcon;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (SelectIcon);

/***/ }),

/***/ "./src/assets/js/blocks/libs/select-icon/style.scss":
/*!**********************************************************!*\
  !*** ./src/assets/js/blocks/libs/select-icon/style.scss ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader/dist/cjs.js!../../../../../../node_modules/sass-loader/dist/cjs.js!./style.scss */ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/libs/select-icon/style.scss");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "./src/assets/js/blocks/magicbox/icon.js":
/*!***********************************************!*\
  !*** ./src/assets/js/blocks/magicbox/icon.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/**
 * WordPress dependencies
 */
var _wp = wp,
    _wp$components = _wp.components,
    Path = _wp$components.Path,
    SVG = _wp$components.SVG,
    rect = _wp$components.rect; // <circle fill="#2C3E50" cx="50" cy="50" r="50"/>

/* harmony default export */ __webpack_exports__["default"] = (React.createElement("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  width: "40px",
  height: "40px",
  viewBox: "0 0 100 100"
}, React.createElement("path", {
  fillRule: "evenodd",
  clipRule: "evenodd",
  fill: "#DED559",
  d: "M7 22L50 0l43 22-43 21.001L7 22z"
}), React.createElement("path", {
  fillRule: "evenodd",
  clipRule: "evenodd",
  fill: "#D0881F",
  d: "M50.003 42.997L7 22v54.28l43.006 21.714-.003-54.997z"
}), React.createElement("path", {
  fillRule: "evenodd",
  clipRule: "evenodd",
  fill: "#C7A934",
  d: "M50 97.994L93.006 76.28V22L50.003 42.997 50 97.994z"
}), React.createElement("path", {
  opacity: ".5",
  fillRule: "evenodd",
  clipRule: "evenodd",
  fill: "#CE851B",
  d: "M27.036 11.705l42.995 21.498 2.263-1.105-43.047-21.524z"
}), React.createElement("path", {
  opacity: ".5",
  fillRule: "evenodd",
  clipRule: "evenodd",
  fill: "#fff",
  d: "M21.318 14.674L63.3 36.505l15.99-7.809L35.788 7.271z"
}), React.createElement("path", {
  opacity: ".5",
  fillRule: "evenodd",
  clipRule: "evenodd",
  fill: "#fff",
  d: "M63.312 36.505l15.978-7.818v11l-15.978 8.817V36.505z"
}), React.createElement("rect", {
  x: "0",
  y: "0",
  width: "100",
  height: "100",
  fill: "rgba(0, 0, 0, 0)"
}), React.createElement("path", {
  clipRule: "evenodd",
  d: "M16.488 73.027L70.906 18.61c1.172-1.172 4.021-.222 6.364 2.121s3.293 5.193 2.121 6.364L24.973 81.513l-8.485-8.486z",
  fill: "none"
}), React.createElement("path", {
  fillRule: "evenodd",
  clipRule: "evenodd",
  fill: "#2C3E50",
  d: "M64.906 29.609L12.018 82.497a50.269 50.269 0 0 0 8.847 8.124l52.527-52.527c1.172-1.171.222-4.021-2.121-6.364-2.344-2.342-5.194-3.292-6.365-2.121z"
}), React.createElement("path", {
  fill: "#F0C419",
  d: "M88.5 23.002c.767-6.901 4.6-10.735 11.5-11.501-6.9-.767-10.734-4.6-11.5-11.5-.767 6.9-4.6 10.734-11.5 11.5 6.899.766 10.733 4.6 11.5 11.501zM31.5 0c-.5 4.5-3 7-7.501 7.501 4.5.5 7.001 3 7.501 7.5.5-4.5 3-7 7.501-7.5C34.5 7 32 4.5 31.5 0zm60 46.001c-.5 4.5-3 7-7.501 7.501 4.5.5 7.001 3 7.501 7.5.5-4.5 3-7 7.501-7.5C94.5 53.001 92 50.5 91.5 46.001z"
}), React.createElement("path", {
  fill: "#fff",
  d: "M71.5 53c-.367 3.299-2.2 5.133-5.5 5.5 3.3.366 5.134 2.2 5.5 5.499.367-3.299 2.2-5.133 5.5-5.499-3.3-.367-5.134-2.202-5.5-5.5zm-25-31.001c-.367 3.3-2.2 5.134-5.5 5.501 3.3.367 5.134 2.199 5.5 5.5.367-3.301 2.2-5.133 5.5-5.5-3.3-.367-5.134-2.201-5.5-5.501zM58.5 3c-.367 3.298-2.2 5.133-5.5 5.5 3.3.366 5.134 2.2 5.5 5.499.366-3.299 2.2-5.133 5.5-5.499-3.3-.367-5.134-2.202-5.5-5.5z"
}), React.createElement("rect", {
  x: "0",
  y: "0",
  width: "100",
  height: "100",
  fill: "rgba(0, 0, 0, 0)"
})));

/***/ }),

/***/ "./src/assets/js/blocks/magicbox/index.js":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/magicbox/index.js ***!
  \************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./icon */ "./src/assets/js/blocks/magicbox/icon.js");
/**
 *  External dependencies
 */


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    TextControl = _wp$components.TextControl,
    SelectControl = _wp$components.SelectControl,
    InspectorControls = _wp.blockEditor.InspectorControls,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/magicbox';
var settings = {
  title: __('Magic Box', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle(_icon__WEBPACK_IMPORTED_MODULE_1__["default"]),
  description: __('With magic box block you can show or hide inner content based on different conditions. For example some times you need to show some information for only logged-in users or you need to put some content in footer only for the front page.', 'awesome-blocks'),
  category: 'design',
  attributes: {
    show_in_all: {
      type: 'boolean',
      default: false
    },
    is_user_logged_in: {
      type: 'string',
      default: ''
    },
    is_front_page: {
      type: 'boolean',
      default: false
    },
    is_home: {
      type: 'boolean',
      default: false
    },
    is_single: {
      type: 'boolean',
      default: false
    },
    is_author: {
      type: 'boolean',
      default: false
    },
    show_pages: {
      type: 'string',
      default: ''
    },
    hide_pages: {
      type: 'string',
      default: ''
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    },
    classesName: {
      type: 'string',
      default: ''
    },
    'is_updated': {
      type: 'boolean',
      default: false
    },
    style: {
      // just for example (block preview)
      type: 'object',
      source: 'attribute',
      selector: 'a',
      attribute: 'style'
    }
  },
  // supports: {
  //   align: [ 'wide', 'full' ]
  // },
  example: {
    attributes: {
      style: {
        border: '1px solid #D0D0D0',
        borderRadius: '5px',
        padding: '5px 20px'
      }
    },
    innerBlocks: [{
      name: 'core/paragraph',
      attributes: {
        customFontSize: 25,
        content: __('You can use this box to display content under a specific conditions.', 'awesome-blocks'),
        align: 'center'
      }
    }, {
      name: 'awesome-blocks/button',
      attributes: {
        text: __('Button', 'awesome-blocks'),
        icon: 'fa fa-home',
        size: 2,
        style: {
          background: '#6BAFFF'
        }
      }
    }]
  },
  edit: function edit(props) {
    var attributes = props.attributes,
        setAttributes = props.setAttributes,
        className = props.className;
    var show_in_all = attributes.show_in_all,
        is_user_logged_in = attributes.is_user_logged_in,
        is_front_page = attributes.is_front_page,
        is_home = attributes.is_home,
        is_single = attributes.is_single,
        is_author = attributes.is_author,
        show_pages = attributes.show_pages,
        hide_pages = attributes.hide_pages,
        id = attributes.id,
        classesList = attributes.classesList,
        classesName = attributes.classesName,
        style = attributes.style;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    classesName !== className && setAttributes({
      classesName: className
    });
    return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Magic Box Settings', 'awesome-blocks')
    }, React.createElement(ToggleControl, {
      label: __('Show on all pages', 'awesome-blocks'),
      checked: !!show_in_all,
      onChange: function onChange() {
        setAttributes({
          show_in_all: !show_in_all,
          is_front_page: !show_in_all,
          is_home: !show_in_all,
          is_single: !show_in_all,
          is_author: !show_in_all,
          is_updated: true
        });
      }
    }), React.createElement("hr", {
      className: "awesome-blocks-hr-separator"
    }), React.createElement(SelectControl, {
      label: __('Logged in users', 'awesome-blocks'),
      value: is_user_logged_in,
      options: [{
        label: __('Never mind!', 'awesome-blocks'),
        Key: '',
        value: ''
      }, {
        label: __('Show', 'awesome-blocks'),
        Key: 'show',
        value: 'show'
      }, {
        label: __('Hide', 'awesome-blocks'),
        Key: 'hide',
        value: 'hide'
      }],
      onChange: function onChange(v) {
        setAttributes({
          is_user_logged_in: v
        });
      }
    }), React.createElement("hr", {
      className: "awesome-blocks-hr-separator"
    }), React.createElement(ToggleControl, {
      label: __('Show on front page', 'awesome-blocks'),
      checked: !!is_front_page,
      onChange: function onChange() {
        setAttributes({
          is_front_page: !is_front_page,
          is_updated: true
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('show in blog home page', 'awesome-blocks'),
      checked: !!is_home,
      onChange: function onChange() {
        setAttributes({
          is_home: !is_home,
          is_updated: true
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('show in post page', 'awesome-blocks'),
      checked: !!is_single,
      onChange: function onChange() {
        setAttributes({
          is_single: !is_single,
          is_updated: true
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Show on author page', 'awesome-blocks'),
      checked: !!is_author,
      onChange: function onChange() {
        setAttributes({
          is_author: !is_author,
          is_updated: true
        });
      }
    }), !show_in_all && React.createElement(TextControl, {
      label: __('Show on pages', 'awesome-blocks'),
      placeholder: __('pages ID’s separated by comma "," .', 'awesome-blocks'),
      value: show_pages,
      onChange: function onChange(v) {
        setAttributes({
          show_pages: v,
          is_updated: true
        });
      }
    }), show_in_all && React.createElement(TextControl, {
      label: __('Hide from pages', 'awesome-blocks'),
      placeholder: __('pages ID’s separated by comma "," .', 'awesome-blocks'),
      value: hide_pages,
      onChange: function onChange(v) {
        setAttributes({
          hide_pages: v,
          is_updated: true
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, {
        classesList: classesList
      }, id),
      style: style
    }, React.createElement(InnerBlocks, {
      templateLock: false
    })));
  },
  save: function save(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className;
    return React.createElement(InnerBlocks.Content, null);
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/menu/index.js":
/*!********************************************!*\
  !*** ./src/assets/js/blocks/menu/index.js ***!
  \********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 *  External dependencies
 */
// import icon from '@iconify/icons-whh/dropmenu'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ServerSideRender = _wp$components.ServerSideRender,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    _wp$blockEditor = _wp.blockEditor,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls;
var name = 'awesome-blocks/menu';
var settings = {
  title: __('Menu', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('welcome-widgets-menus'),
  description: __('You can use this menu block in headers as the main menu with many options.', 'awesome-blocks'),
  category: 'widgets',
  attributes: {
    menu: {
      type: 'string',
      default: ''
    },
    menuIcon: {
      type: 'string',
      default: ''
    },
    align: {
      type: 'string',
      default: ''
    },
    editor: {
      type: 'boolean',
      default: false
    },
    container: {
      type: 'boolean',
      default: false
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  supports: {
    html: false
  },
  example: {
    attributes: {
      menuIcon: ''
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var menu = attributes.menu,
        menuIcon = attributes.menuIcon,
        align = attributes.align,
        container = attributes.container,
        id = attributes.id,
        classesList = attributes.classesList;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    var menusList = [{
      label: __('Select Menu', 'awesome-blocks'),
      key: '',
      value: ''
    }];

    if ((typeof awesomeblocks_menu_list === "undefined" ? "undefined" : _typeof(awesomeblocks_menu_list)) === 'object' && typeof awesomeblocks_menu_list.map === 'function') {
      awesomeblocks_menu_list.map(function (menu) {
        menusList.push({
          label: menu.name,
          key: menu.slug,
          value: menu.slug
        });
      });
    }

    return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
      value: align,
      onChange: function onChange(v) {
        return setAttributes({
          align: v
        });
      }
    })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Menu Settings', 'awesome-blocks')
    }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(SelectControl, {
      label: __('Select Menu', 'awesome-blocks'),
      value: menu,
      options: menusList,
      onChange: function onChange(v) {
        return setAttributes({
          menu: v
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Container', 'awesome-blocks'),
      checked: !!container,
      onChange: function onChange() {
        setAttributes({
          container: !container
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
      title: __('Menu Icon', 'awesome-blocks'),
      classPlaceholder: __('Insert icon class', 'awesome-blocks'),
      fliterPlaceholder: __('Search for icon', 'awesome-blocks'),
      value: menuIcon,
      onSelect: function onSelect(v) {
        return setAttributes({
          menuIcon: v
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement(ServerSideRender, {
      block: "awesome-blocks/menu",
      attributes: {
        menu: menu,
        menuIcon: menuIcon,
        align: align,
        id: id,
        container: container,
        editor: true,
        classesList: classesList
      }
    }));
  },
  save: function save() {
    return null;
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/modalbox/index.js":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/modalbox/index.js ***!
  \************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/**
 * External dependencies
 */
 // import modalboxIcon from '@iconify/icons-entypo/popup'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    RangeControl = _wp$components.RangeControl,
    InspectorControls = _wp.blockEditor.InspectorControls,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/modalbox';
var attributes = {
  close: {
    type: 'boolean',
    source: 'attribute',
    selector: '.awesome-blocks-modalbox__body__close',
    attribute: 'class',
    default: true
  },
  delay: {
    type: 'string',
    source: 'attribute',
    selector: '.wp-block-awesome-blocks-modalbox',
    attribute: 'data-delay',
    default: '5'
  },
  remember: {
    type: 'string',
    source: 'attribute',
    selector: '.wp-block-awesome-blocks-modalbox',
    attribute: 'data-remember',
    default: '1'
  },
  size: {
    type: 'string',
    source: 'attribute',
    selector: '.wp-block-awesome-blocks-modalbox',
    attribute: 'data-size',
    default: 'medium'
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  },
  style: {
    type: 'object',
    source: 'attribute',
    selector: 'empty',
    attribute: 'style'
  }
};

var description = __('The Modal Box block is a dialog box/popup window that is displayed on top of the current page. Use a modal for dialog boxes, confirmation messages, or other content that can be called up.', 'awesome-blocks');

var gutenClass = 'awesome-blocks-modalbox';
var settings = {
  title: __('Modal Box (Popup)', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('editor-expand'),
  description: description,
  category: 'design',
  attributes: attributes,
  example: {
    attributes: {
      style: {
        border: '1px solid #D0D0D0',
        borderRadius: '5px',
        padding: '5px 20px'
      }
    },
    innerBlocks: [{
      name: 'core/paragraph',
      attributes: {
        customFontSize: 25,
        content: description,
        align: 'center'
      }
    }, {
      name: 'awesome-blocks/button',
      attributes: {
        text: __('Close', 'awesome-blocks'),
        icon: 'fa fa-home',
        size: 2,
        style: {
          background: '#6BAFFF'
        }
      }
    }]
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className;
    var close = attributes.close,
        delay = attributes.delay,
        remember = attributes.remember,
        size = attributes.size,
        id = attributes.id,
        classesList = attributes.classesList,
        style = attributes.style;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Modal Box Settings', 'awesome-blocks')
    }, React.createElement(SelectControl, {
      label: __('Modal Size', 'awesome-blocks'),
      value: size,
      options: [{
        label: __('Full Width', 'awesome-blocks'),
        Key: 'full',
        value: 'full'
      }, {
        label: __('Medium Size', 'awesome-blocks'),
        Key: 'medium',
        value: 'medium'
      }, {
        label: __('Small Size', 'awesome-blocks'),
        Key: 'small',
        value: 'small'
      }],
      onChange: function onChange(v) {
        setAttributes({
          size: v
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Show Close Button', 'awesome-blocks'),
      help: __('You can add any button or link inside the modal with "awesome-blocks-modalbox__close" class to close the modal.', 'awesome-blocks'),
      checked: !!close,
      onChange: function onChange() {
        setAttributes({
          close: !close
        });
      }
    }), React.createElement(RangeControl, {
      label: __('Delay (seconds)', 'awesome-blocks'),
      value: parseInt(delay),
      onChange: function onChange(v) {
        return setAttributes({
          delay: v
        });
      },
      min: 1,
      max: 60
    }), React.createElement(RangeControl, {
      label: __('Days', 'awesome-blocks'),
      help: __('Show once per number of days', 'awesome-blocks'),
      value: parseInt(remember),
      onChange: function onChange(v) {
        return setAttributes({
          remember: v
        });
      },
      min: 0,
      max: 30
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: "#".concat(id, " .").concat(gutenClass, "__body"),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement("div", {
      id: id,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, {
        classesList: classesList
      }),
      style: style
    }, React.createElement("div", {
      className: "".concat(gutenClass, "__body")
    }, React.createElement("div", {
      className: "".concat(gutenClass, "__body__content")
    }, React.createElement(InnerBlocks, {
      templateLock: false
    })))));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes,
        className = _ref2.className;
    var close = attributes.close,
        delay = attributes.delay,
        remember = attributes.remember,
        size = attributes.size,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      id: id,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses({
        classesList: classesList
      }),
      "data-delay": delay,
      "data-remember": remember,
      "data-size": size
    }, React.createElement("div", {
      className: "".concat(gutenClass, "__body")
    }, React.createElement("div", {
      className: "".concat(gutenClass, "__body__content")
    }, React.createElement(InnerBlocks.Content, null)), close && React.createElement("div", {
      className: "".concat(gutenClass, "__body__close ").concat(gutenClass, "__close")
    })));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/openstreetmap/index.js":
/*!*****************************************************!*\
  !*** ./src/assets/js/blocks/openstreetmap/index.js ***!
  \*****************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/**
 * External dependencies
 */
 // import boxIcon from '@iconify/icons-flat-ui/map'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    select = _wp.data.select,
    _wp$components = _wp.components,
    Button = _wp$components.Button,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    RangeControl = _wp$components.RangeControl,
    SelectControl = _wp$components.SelectControl,
    TextControl = _wp$components.TextControl,
    InspectorControls = _wp.blockEditor.InspectorControls,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/openstreetmap';
var attributes = {
  show_content: {
    type: 'boolean',
    default: false
  },
  min_height: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-height',
    selector: '.wp-block-awesome-blocks-openstreetmap',
    default: '400'
  },
  style: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-style',
    selector: '.wp-block-awesome-blocks-openstreetmap',
    default: 'style1'
  },
  customstyle: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-customstyle',
    selector: '.wp-block-awesome-blocks-openstreetmap',
    default: ''
  },
  attribution: {
    type: 'string',
    source: 'html',
    // attribute: 'data-customstyle',
    selector: '.awesome-blocks-map-attribution',
    default: ''
  },
  latitude: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-lat',
    selector: '.wp-block-awesome-blocks-openstreetmap',
    default: '00.000000'
  },
  longitude: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-lng',
    selector: '.wp-block-awesome-blocks-openstreetmap',
    default: '00.000000'
  },
  zoom: {
    type: 'string',
    source: 'attribute',
    attribute: 'data-zoom',
    selector: '.wp-block-awesome-blocks-openstreetmap',
    default: '1'
  },
  markerIcon: {
    type: 'string',
    // source: 'html',
    selector: 'icon1'
  },
  markers: {
    type: 'string',
    source: 'html',
    selector: '.awesome-blocks-map-markers-list'
  },
  id: {
    type: 'string'
  }
};
var settings = {
  title: __('Map', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('location-alt'),
  description: __('With Map block you can include a map on your site that includes unlimited markers dropped at the address of locations.', 'awesome-blocks'),
  category: 'media',
  attributes: attributes,
  supports: {
    align: ['wide', 'full']
  },
  example: {
    attributes: {
      animate: true,
      size: 2,
      style: {
        latitude: '31.924302',
        longitude: '12.254648',
        zoom: '5',
        min_height: '150'
      }
    }
  },
  edit: function edit(props) {
    var attributes = props.attributes,
        setAttributes = props.setAttributes,
        className = props.className,
        clientId = props.clientId;
    var show_content = attributes.show_content,
        min_height = attributes.min_height,
        style = attributes.style,
        customstyle = attributes.customstyle,
        attribution = attributes.attribution,
        latitude = attributes.latitude,
        longitude = attributes.longitude,
        zoom = attributes.zoom,
        id = attributes.id;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    var hasChildBlocks = select('core/block-editor').getBlockOrder(clientId).length > 0;

    var change = function change(attrs) {
      var latitude = attrs.latitude,
          longitude = attrs.longitude,
          zoom = attrs.zoom,
          markers = attrs.markers;
      if (!latitude || !longitude || !zoom) return false;
      setAttributes({
        latitude: latitude,
        longitude: longitude,
        zoom: zoom,
        markers: markers
      });
      return true;
    };

    var mapTiler = __('Map Tiler', 'awesome-blocks');

    var style1 = __('Style 1', 'awesome-blocks');

    var style2 = __('Style 2', 'awesome-blocks');

    var style3 = __('Style 3', 'awesome-blocks');

    var style4 = __('Style 4', 'awesome-blocks');

    var style5 = __('Style 5', 'awesome-blocks');

    var style6 = __('Style 6', 'awesome-blocks');

    var customStyle = __('Custom Style', 'awesome-blocks');

    var customMapTiler = __('Custom Map Tiler', 'awesome-blocks');

    return React.createElement(React.Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Content box Settings', 'awesome-blocks')
    }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(ToggleControl, {
      label: __('Show Content', 'awesome-blocks'),
      checked: !!show_content,
      onChange: function onChange() {
        setAttributes({
          show_content: !show_content
        });
      }
    }),  false && false, React.createElement(TextControl, {
      label: __('Attribution', 'awesome-blocks'),
      value: attribution,
      onChange: function onChange(v) {
        setAttributes({
          attribution: v
        });
      }
    }), React.createElement(RangeControl, {
      label: __('Map Height', 'awesome-blocks'),
      value: parseInt(min_height),
      onChange: function onChange(v) {
        return setAttributes({
          min_height: v
        });
      },
      min: 200,
      max: 2000
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, id),
      "data-lat": latitude,
      "data-lng": longitude,
      "data-style": style,
      "data-customstyle": customstyle,
      "data-zoom": zoom,
      "data-height": min_height
    }, id && React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].OpenStreetMap, {
      clientId: clientId,
      attrs: attributes,
      saveButtonTitle: __('Save', 'awesome-blocks'),
      onChange: function onChange(v) {
        return change(v);
      }
    }), show_content && React.createElement("div", {
      className: "awesome-blocks-map-content"
    }, React.createElement(InnerBlocks, {
      templateLock: false,
      renderAppender: hasChildBlocks ? undefined : function () {
        return React.createElement(InnerBlocks.ButtonBlockAppender, null);
      }
    }))));
  },
  save: function save(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className;
    var show_content = attributes.show_content,
        min_height = attributes.min_height,
        style = attributes.style,
        customstyle = attributes.customstyle,
        attribution = attributes.attribution,
        latitude = attributes.latitude,
        longitude = attributes.longitude,
        zoom = attributes.zoom,
        markers = attributes.markers,
        id = attributes.id;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, id),
      "data-lat": latitude,
      "data-lng": longitude,
      "data-style": style,
      "data-customstyle": customstyle,
      "data-zoom": zoom,
      "data-height": min_height
    }, React.createElement("div", {
      className: "awesome-blocks-map"
    }), attribution && React.createElement("div", {
      className: "awesome-blocks-map-attribution",
      dangerouslySetInnerHTML: {
        __html: "".concat(attribution)
      }
    }), markers && React.createElement("div", {
      className: "awesome-blocks-map-markers-list",
      dangerouslySetInnerHTML: {
        __html: "".concat(markers)
      }
    }), show_content && React.createElement("div", {
      className: "awesome-blocks-map-content"
    }, React.createElement(InnerBlocks.Content, null)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/paragraph/edit.js":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/paragraph/edit.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * Edit Paragraph block.
 */

var _lodash = lodash,
    range = _lodash.range;
/**
 * WordPress dependencies
 */

var _wp = wp,
    _wp$i18n = _wp.i18n,
    __ = _wp$i18n.__,
    sprintf = _wp$i18n.sprintf,
    _wp$element = _wp.element,
    Platform = _wp$element.Platform,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    Toolbar = _wp$components.Toolbar,
    ToggleControl = _wp$components.ToggleControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls;

var ParagraphBlock =
/*#__PURE__*/
function (_Component) {
  _inherits(ParagraphBlock, _Component);

  function ParagraphBlock() {
    _classCallCheck(this, ParagraphBlock);

    return _possibleConstructorReturn(this, _getPrototypeOf(ParagraphBlock).apply(this, arguments));
  }

  _createClass(ParagraphBlock, [{
    key: "render",
    value: function render() {
      var _H$gutenClasses;

      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var content = attributes.content,
          align = attributes.align,
          dropCap = attributes.dropCap,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
        value: align,
        onChange: function onChange(v) {
          return setAttributes({
            align: v
          });
        }
      })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Paragraph Settings', 'awesome-blocks')
      }, React.createElement(ToggleControl, {
        label: __('Drop Cap', 'awesome-blocks'),
        checked: !!dropCap,
        onChange: function onChange() {
          return setAttributes({
            dropCap: !dropCap
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        icon: "fa fa-cogs",
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        },
        lite: {
          style: true
        }
      }))), React.createElement(RichText, {
        tagName: "p",
        onChange: function onChange(v) {
          return setAttributes({
            content: v
          });
        },
        value: content,
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, align + '-text', !!align), _defineProperty(_H$gutenClasses, 'has-drop-cap', !!dropCap), _H$gutenClasses), {
          classesList: classesList
        }, id),
        __unstableEmbedURLOnPaste: true,
        __unstableAllowPrefixTransformations: true
      }));
    }
  }]);

  return ParagraphBlock;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (ParagraphBlock);

/***/ }),

/***/ "./src/assets/js/blocks/paragraph/index.js":
/*!*************************************************!*\
  !*** ./src/assets/js/blocks/paragraph/index.js ***!
  \*************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/paragraph/edit.js");
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 *  Start awesome-blocks Paragraph block.
 */
 // import arrowSplitHorizontal from '@iconify/icons-mdi/arrow-split-horizontal'


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RichText = _wp.blockEditor.RichText;
var name = 'awesome-blocks/paragraph';
var blockAttributes = {
  content: {
    type: 'array',
    source: 'children',
    selector: 'p'
  },
  align: {
    type: 'string' // default: 'center'

  },
  dropCap: {
    type: "boolean",
    default: false
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string'
  }
};
var settings = {
  title: __('Advanced Paragraph', 'awesome-blocks'),
  description: __('You can use this block to separate the content vertically.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].iconStyle('editor-paragraph'),
  category: 'text',
  attributes: blockAttributes,
  // supports: {
  //   align: [ 'wide', 'full' ]
  // },
  example: {
    attributes: {
      content: __('Gutenberg Blocks is working with the new WordPress editor aka Gutenberg that makes it very lightweight, extendable and efficient. So it’s possible to use Gutenberg Blocks blocks with pages, posts or any posts type that uses Gutenberg editor.', 'awesome-blocks')
    }
  },
  styles: [{
    name: 'default',
    label: __('Default', 'awesome-blocks'),
    isDefault: true
  }, {
    name: 'two-columns',
    label: __('Two column', 'awesome-blocks')
  }, {
    name: 'three-columns',
    label: __('Three column', 'awesome-blocks')
  }],
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var content = attributes.content,
        align = attributes.align,
        dropCap = attributes.dropCap,
        id = attributes.id,
        classesList = attributes.classesList;
    var isEmpty = content.length > 0 && content[0] !== '';
    return isEmpty && React.createElement(RichText.Content, {
      tagName: "p",
      value: content,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses((_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, align + '-text', !!align), _defineProperty(_H$gutenClasses, 'has-drop-cap', !!dropCap), _H$gutenClasses), {
        classesList: classesList
      }, id)
    });
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/pricingtable/block.json":
/*!******************************************************!*\
  !*** ./src/assets/js/blocks/pricingtable/block.json ***!
  \******************************************************/
/*! exports provided: pricingtable, pricingtableplan, default */
/***/ (function(module) {

module.exports = JSON.parse("{\"pricingtable\":{\"name\":\"awesome-blocks/pricingtable\",\"category\":\"design\",\"attributes\":{\"cleanStyle\":{\"type\":\"boolean\",\"source\":\"attribute\",\"attribute\":\"class\",\"selector\":\".awesome-blocks-pricingtable--clean-style\",\"default\":true},\"zoomEffect\":{\"type\":\"boolean\",\"source\":\"attribute\",\"attribute\":\"class\",\"selector\":\".awesome-blocks-pricingtable--zoom-effect\",\"default\":false},\"opacityEffect\":{\"type\":\"boolean\",\"source\":\"attribute\",\"attribute\":\"class\",\"selector\":\".awesome-blocks-pricingtable--opacity-effect\",\"default\":false},\"gradientEffect\":{\"type\":\"boolean\",\"source\":\"attribute\",\"attribute\":\"class\",\"selector\":\".awesome-blocks-pricingtable--gradient-effect\",\"default\":false},\"shadowEffect\":{\"type\":\"boolean\",\"source\":\"attribute\",\"attribute\":\"class\",\"selector\":\".awesome-blocks-pricingtable--shadow-effect\",\"default\":false},\"numOfplans\":{\"type\":\"number\",\"default\":\"1\"},\"id\":{\"type\":\"string\",\"default\":\"\"},\"classesList\":{\"type\":\"string\",\"default\":\"\"}},\"deprecated\":{\"attributes\":{}}},\"pricingtableplan\":{\"name\":\"awesome-blocks/pricingtableplan\",\"category\":\"design\",\"attributes\":{\"ribbonText\":{\"type\":\"array\",\"source\":\"children\",\"selector\":\".awesome-blocks-pricingtable__plan__header__ribbon span\"},\"headingText\":{\"type\":\"array\",\"source\":\"children\",\"selector\":\".awesome-blocks-pricingtable__plan__header__heading\"},\"planIcon\":{\"typr\":\"string\",\"source\":\"attribute\",\"selector\":\".awesome-blocks-pricingtable__plan__header__icon > i\",\"attribute\":\"class\"},\"priceText\":{\"type\":\"string\",\"source\":\"html\",\"selector\":\".awesome-blocks-pricingtable__plan__header__price\"},\"featuredPlan\":{\"type\":\"boolean\",\"default\":false},\"ribbonTextColor\":{\"type\":\"string\",\"default\":\"#fff\"},\"ribbonBgColor\":{\"type\":\"string\",\"default\":\"#0097d4\"},\"id\":{\"type\":\"string\",\"default\":\"\"},\"classesList\":{\"type\":\"string\",\"default\":\"\"}},\"deprecated\":{\"attributes\":{}}}}");

/***/ }),

/***/ "./src/assets/js/blocks/pricingtable/index.js":
/*!****************************************************!*\
  !*** ./src/assets/js/blocks/pricingtable/index.js ***!
  \****************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./block.json */ "./src/assets/js/blocks/pricingtable/block.json");
var _block_json__WEBPACK_IMPORTED_MODULE_1___namespace = /*#__PURE__*/__webpack_require__.t(/*! ./block.json */ "./src/assets/js/blocks/pricingtable/block.json", 1);
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 *  Start ExtraBlocks Separator block.
 */
// import edit from './edit'
// import priceRibbon from '@iconify/icons-entypo/price-ribbon';
// import priceRibbon from '@iconify/icons-entypo/price-ribbon'


var _metadata$pricingtabl = _block_json__WEBPACK_IMPORTED_MODULE_1__.pricingtable,
    name = _metadata$pricingtabl.name,
    attributes = _metadata$pricingtabl.attributes,
    category = _metadata$pricingtabl.category;
/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    AlignmentToolbar = _wp.editor.AlignmentToolbar,
    _wp$blockEditor = _wp.blockEditor,
    PanelColorSettings = _wp$blockEditor.PanelColorSettings,
    BlockControls = _wp$blockEditor.BlockControls,
    InspectorControls = _wp$blockEditor.InspectorControls,
    RichText = _wp$blockEditor.RichText,
    InnerBlocks = _wp$blockEditor.InnerBlocks;
var pricingTemplate = [['awesome-blocks/pricingtableplan', {
  headingText: __('Basic', 'awesome-blocks')
}], ['awesome-blocks/pricingtableplan', {
  headingText: __('Standard', 'awesome-blocks'),
  ribbonText: __('Featured', 'awesome-blocks'),
  btnText: __('Sign up', 'awesome-blocks'),
  featuredPlan: true,
  btnLink: '#'
}], ['awesome-blocks/pricingtableplan', {
  headingText: __('Premium', 'awesome-blocks'),
  btnText: __('Sign up', 'awesome-blocks'),
  btnLink: '#'
}]];
var gutenClass = 'awesome-blocks-pricingtable';

var settings = {
  title: __('Pricing Table', 'awesome-blocks'),
  description: __('Pricing table block for entrepreneurs and service providers. With this block you can create a modern and responsive pricing table for your business pricing plans in just a few seconds.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('awards', '#FFA500'),
  category: category,
  attributes: attributes,
  supports: {
    align: ['wide', 'full']
  },
  // styles: [
  //   { name: 'small', label: __('Small', 'awesome-blocks') },
  //   { name: 'default', label: __('Regular', 'awesome-blocks'), isDefault: true },
  //   { name: 'large', label: __('Large', 'awesome-blocks') }
  // ],
  // edit,
  edit: function edit(_ref) {
    var _this = this,
        _H$gutenClasses;

    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name,
        clientId = _ref.clientId;
    var cleanStyle = attributes.cleanStyle,
        zoomEffect = attributes.zoomEffect,
        opacityEffect = attributes.opacityEffect,
        gradientEffect = attributes.gradientEffect,
        shadowEffect = attributes.shadowEffect,
        classesList = attributes.classesList,
        id = attributes.id,
        numOfplans = attributes.numOfplans;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    var lock = false;

    var shadow = __('Shadow', 'awesome-blocks');

    return React.createElement(Fragment, null, React.createElement(BlockControls, null), React.createElement(InspectorControls, null, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(PanelBody, {
      title: __('Pricing Table Settings', 'awesome-blocks')
    }, React.createElement(ToggleControl, {
      label: __('Zoom Effect', 'awesome-blocks'),
      checked: !!zoomEffect,
      onChange: function onChange() {
        return setAttributes({
          zoomEffect: !zoomEffect
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Gradient Color', 'awesome-blocks'),
      checked: !!gradientEffect,
      onChange: function onChange() {
        return setAttributes({
          gradientEffect: !gradientEffect
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Transparency', 'awesome-blocks'),
      checked: !!opacityEffect,
      onChange: function onChange() {
        return setAttributes({
          opacityEffect: !opacityEffect
        });
      }
    }),  false && false, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id, " .awesome-blocks-pricingtable__plan"),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return _this.setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, "".concat(gutenClass, "--").concat(numOfplans, "-palns"), (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--clean-style"), !!cleanStyle), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--zoom-effect"), !!zoomEffect), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--opacity-effect"), !!opacityEffect), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--gradient-effect"), !!gradientEffect), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--shadow-effect"), !!shadowEffect), _H$gutenClasses), {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks, {
      allowedBlocks: ['awesome-blocks/pricingtableplan'],
      templateLock: lock,
      template: pricingTemplate
    })));
  },
  save: function save(_ref2) {
    var _H$gutenClasses2;

    var attributes = _ref2.attributes,
        innerBlocks = _ref2.innerBlocks;
    var cleanStyle = attributes.cleanStyle,
        zoomEffect = attributes.zoomEffect,
        opacityEffect = attributes.opacityEffect,
        gradientEffect = attributes.gradientEffect,
        shadowEffect = attributes.shadowEffect,
        classesList = attributes.classesList,
        id = attributes.id,
        numOfplans = attributes.numOfplans;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClass, "".concat(gutenClass, "--").concat(numOfplans, "-palns"), (_H$gutenClasses2 = {}, _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--clean-style"), !!cleanStyle), _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--zoom-effect"), !!zoomEffect), _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--opacity-effect"), !!opacityEffect), _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--gradient-effect"), !!gradientEffect), _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--shadow-effect"), !!shadowEffect), _H$gutenClasses2), {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "".concat(gutenClass, "__plans")
    }, React.createElement(InnerBlocks.Content, null)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/pricingtable/plan.js":
/*!***************************************************!*\
  !*** ./src/assets/js/blocks/pricingtable/plan.js ***!
  \***************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./block.json */ "./src/assets/js/blocks/pricingtable/block.json");
var _block_json__WEBPACK_IMPORTED_MODULE_1___namespace = /*#__PURE__*/__webpack_require__.t(/*! ./block.json */ "./src/assets/js/blocks/pricingtable/block.json", 1);
/**
 * External dependencies
 */
 // import { __ } from '@wordpress/i18n';


var _metadata$pricingtabl = _block_json__WEBPACK_IMPORTED_MODULE_1__.pricingtableplan,
    name = _metadata$pricingtabl.name,
    attributes = _metadata$pricingtabl.attributes,
    category = _metadata$pricingtabl.category;
/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    TextControl = _wp$components.TextControl,
    ToggleControl = _wp$components.ToggleControl,
    PanelBody = _wp$components.PanelBody,
    Toolbar = _wp$components.Toolbar,
    _wp$editor = _wp.editor,
    ColorPalette = _wp$editor.ColorPalette,
    MediaPlaceholder = _wp$editor.MediaPlaceholder,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    InspectorControls = _wp$blockEditor.InspectorControls,
    InnerBlocks = _wp$blockEditor.InnerBlocks;

var settings = {
  title: __('Pricing Plan', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('columns'),
  description: __('Single table.', 'awesome-blocks'),
  parent: ['awesome-blocks/pricingtable'],
  category: 'design',
  attributes: attributes,
  edit: function edit(props) {
    var _this = this;

    var attributes = props.attributes,
        setAttributes = props.setAttributes,
        className = props.className,
        noticeUI = props.noticeUI,
        noticeOperations = props.noticeOperations;
    var ribbonText = attributes.ribbonText,
        headingText = attributes.headingText,
        planIcon = attributes.planIcon,
        featuredPlan = attributes.featuredPlan,
        ribbonTextColor = attributes.ribbonTextColor,
        ribbonBgColor = attributes.ribbonBgColor,
        classesList = attributes.classesList,
        id = attributes.id;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    var priceText = attributes.priceText;

    if (priceText && typeof priceText.replace === 'function') {
      priceText = priceText.replace(/<[^>]+>/g, '');
    }

    return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(PanelBody, {
      title: __('Plan Settings', 'awesome-blocks')
    }, React.createElement(ToggleControl, {
      label: __('Featured Plan', 'awesome-blocks'),
      checked: !!featuredPlan,
      onChange: function onChange() {
        return setAttributes({
          featuredPlan: !featuredPlan
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
      title: __('Plan Icon', 'awesome-blocks'),
      classPlaceholder: __('Insert icon class', 'awesome-blocks'),
      fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
      ,
      value: planIcon,
      onSelect: function onSelect(v) {
        return setAttributes({
          planIcon: v
        });
      }
    })), React.createElement(PanelBody, {
      title: __('Ribbon Settings', 'awesome-blocks'),
      initialOpen: false
    }, React.createElement(TextControl, {
      label: __('Ribbon Text', 'awesome-blocks'),
      value: ribbonText,
      onChange: function onChange(v) {
        return setAttributes({
          ribbonText: v
        });
      }
    }), React.createElement("label", null, __('Text Color', 'awesome-blocks')), React.createElement(ColorPalette, {
      value: ribbonTextColor,
      label: __('Text Color', 'awesome-blocks'),
      onChange: function onChange(v) {
        return setAttributes({
          ribbonTextColor: v
        });
      }
    }), React.createElement("hr", null), React.createElement("label", null, __('Background Color', 'awesome-blocks')), React.createElement(ColorPalette, {
      value: ribbonBgColor,
      label: __('Background Color', 'awesome-blocks'),
      onChange: function onChange(v) {
        return setAttributes({
          ribbonBgColor: v
        });
      }
    })), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return _this.setAttributes({
          classesList: v.classesList
        });
      }
    })), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-pricingtable__plan', {
        'awesome-blocks-pricingtable__plan--featured': !!featuredPlan
      }, {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__header"
    }, ribbonText && React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__header__ribbon"
    }, React.createElement("span", {
      style: {
        color: ribbonTextColor,
        backgroundColor: ribbonBgColor
      }
    }, ribbonText)), React.createElement("h3", {
      className: "awesome-blocks-pricingtable__plan__header__heading"
    }, React.createElement(RichText, {
      tagName: "span",
      value: headingText,
      placeholder: __('Heading', 'awesome-blocks'),
      onChange: function onChange(v) {
        return setAttributes({
          headingText: v
        });
      },
      allowedFormats: ['core/bold', 'core/italic', // 'core/image',
      'core/strikethrough', 'core/link' // 'core/code',
      ],
      inlineToolbar: true
    })), planIcon && React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__header__icon"
    }, React.createElement("i", {
      className: planIcon
    })), React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__header__price"
    }, React.createElement(RichText, {
      tagName: "span",
      value: priceText,
      placeholder: "$00",
      onChange: function onChange(v) {
        return setAttributes({
          priceText: v
        });
      }
    }))), React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__body"
    }, React.createElement(InnerBlocks // allowedBlocks={ [ 'core/paragraph' ] }
    , {
      template: [['core/paragraph', {
        placeholder: __('Features Here', 'awesome-blocks')
      }], ['awesome-blocks/button', {
        text: __('Sign up', 'awesome-blocks'),
        title: __('Sign up', 'awesome-blocks'),
        link: '#',
        // icon: 'fa fa-shopping-cart',
        size: 2
      }]] // templateLock="all"
      ,
      templateLock: false
    }))));
  },
  save: function save(_ref) {
    var attributes = _ref.attributes;
    var ribbonText = attributes.ribbonText,
        headingText = attributes.headingText,
        planIcon = attributes.planIcon,
        featuredPlan = attributes.featuredPlan,
        ribbonTextColor = attributes.ribbonTextColor,
        ribbonBgColor = attributes.ribbonBgColor,
        classesList = attributes.classesList,
        id = attributes.id;
    var priceText = attributes.priceText;
    var decimal = '';

    if (priceText && typeof priceText.replace === 'function') {
      priceText = priceText.replace(/<[^>]+>/g, '');
      var splitedPrice = priceText.split('.');

      if (splitedPrice.length === 2) {
        priceText = splitedPrice[0];
        decimal = splitedPrice[1];
      }
    }

    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-pricingtable__plan', {
        'awesome-blocks-pricingtable__plan--featured': !!featuredPlan
      }, {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__header"
    }, ribbonText && React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__header__ribbon"
    }, React.createElement("span", {
      style: {
        color: ribbonTextColor,
        backgroundColor: ribbonBgColor
      }
    }, ribbonText)), headingText && React.createElement("h3", {
      className: "awesome-blocks-pricingtable__plan__header__heading"
    }, headingText), planIcon && React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__header__icon"
    }, React.createElement("i", {
      className: planIcon
    })), priceText && React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__header__price"
    }, priceText, decimal !== '' && React.createElement("sup", null, ".", decimal))), React.createElement("div", {
      className: "awesome-blocks-pricingtable__plan__body"
    }, React.createElement(InnerBlocks.Content, null)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/progressbar/block.json":
/*!*****************************************************!*\
  !*** ./src/assets/js/blocks/progressbar/block.json ***!
  \*****************************************************/
/*! exports provided: name, category, attributes, default */
/***/ (function(module) {

module.exports = JSON.parse("{\"name\":\"awesome-blocks/progressbar\",\"category\":\"design\",\"attributes\":{\"title\":{\"type\":\"array\",\"source\":\"children\",\"selector\":\"span.awesome-blocks-progressbar__title\"},\"showProgressText\":{\"type\":\"boolean\",\"default\":true},\"percent\":{\"type\":\"boolean\",\"default\":true},\"animate\":{\"type\":\"boolean\",\"default\":false},\"value\":{\"type\":\"number\",\"default\":50},\"max\":{\"type\":\"number\",\"default\":100},\"id\":{\"type\":\"string\"},\"classesList\":{\"type\":\"string\",\"default\":\"\"},\"style\":{\"type\":\"object\",\"source\":\"attribute\",\"selector\":\"xx\",\"attribute\":\"xx\"}}}");

/***/ }),

/***/ "./src/assets/js/blocks/progressbar/index.js":
/*!***************************************************!*\
  !*** ./src/assets/js/blocks/progressbar/index.js ***!
  \***************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./block.json */ "./src/assets/js/blocks/progressbar/block.json");
var _block_json__WEBPACK_IMPORTED_MODULE_1___namespace = /*#__PURE__*/__webpack_require__.t(/*! ./block.json */ "./src/assets/js/blocks/progressbar/block.json", 1);
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 *  External dependencies
 */
 // import icon from '@iconify/icons-flat-color-icons/bar-chart'


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    RangeControl = _wp$components.RangeControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    InspectorControls = _wp$blockEditor.InspectorControls;
var name = _block_json__WEBPACK_IMPORTED_MODULE_1__.name,
    attributes = _block_json__WEBPACK_IMPORTED_MODULE_1__.attributes;
var gutenClassName = 'awesome-blocks-progressbar';


var getProgressValue = function getProgressValue(value, max, percent) {
  value = value > max ? max : value;
  value = percent && value > 100 ? 100 : value;
  value = value < 0 ? 0 : value;
  max = !percent ? max : 100;
  var v = (percent ? value : value / max * 100).toFixed(0);
  return {
    v: v,
    max: max,
    value: value
  };
};

var settings = {
  title: __('Progress Bar', 'awesome-blocks'),
  description: __('Easily create beautiful progress bar.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('performance', 'green', '90deg'),
  keywords: [__('progress bar', 'awesome-blocks')],
  attributes: attributes,
  category: 'design',
  supports: {
    html: false
  },
  example: {
    attributes: {
      title: __('Progress bar', 'awesome-blocks'),
      percent: false,
      showProgressText: false,
      max: 88,
      value: 60,
      style: {
        backgroundImage: 'linear-gradient(257deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)'
      }
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var title = attributes.title,
        percent = attributes.percent,
        showProgressText = attributes.showProgressText,
        animate = attributes.animate,
        id = attributes.id,
        classesList = attributes.classesList;
    var max = attributes.max,
        value = attributes.value,
        style = attributes.style;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    var allValue = getProgressValue(value, max, percent);
    var v = allValue.v;
    max = allValue.max;
    value = allValue.value;

    var width = _objectSpread({}, style, {
      width: v + '%'
    });

    var progressText = showProgressText ? "".concat(value).concat(percent ? '%' : '') : '';
    var maxText = showProgressText ? "".concat(max).concat(percent ? '%' : '') : "".concat(value).concat(percent ? '%' : '', " ").concat(!percent ? '/' + max : '');
    return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Progress Bar Settings', 'awesome-blocks')
    }, React.createElement(ToggleControl, {
      label: __('Percent', 'awesome-blocks'),
      checked: !!percent,
      onChange: function onChange() {
        setAttributes({
          percent: !percent
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Show Progress Text', 'awesome-blocks'),
      checked: !!showProgressText,
      onChange: function onChange() {
        setAttributes({
          showProgressText: !showProgressText
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Animated Background', 'awesome-blocks'),
      checked: !!animate,
      help: __('For gradient background only.', 'awesome-blocks'),
      onChange: function onChange() {
        setAttributes({
          animate: !animate
        });
      }
    }), React.createElement(RangeControl, {
      label: __('Value', 'awesome-blocks'),
      value: value,
      onChange: function onChange(v) {
        return setAttributes({
          value: v
        });
      },
      min: 0,
      max: max
    }), !percent && React.createElement(RangeControl, {
      label: __('Max', 'awesome-blocks'),
      value: max,
      onChange: function onChange(v) {
        return setAttributes({
          max: v
        });
      },
      min: 0,
      max: 10000
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      elementID: id,
      elementStyle: ".".concat(id, " .").concat(gutenClassName, "__container__bar"),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      },
      lite: {
        style: true
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(gutenClassName, {
        classesList: classesList
      }, id)
    }, React.createElement(RichText, {
      tagName: "span",
      placeholder: __('Write Title…', 'awesome-blocks'),
      value: title,
      className: "".concat(gutenClassName, "__title"),
      onChange: function onChange(v) {
        return setAttributes({
          title: v
        });
      } // formattingControls={ [ 'bold', 'italic', 'strikethrough', 'code', 'link' ] }
      ,
      allowedFormats: ['core/bold', 'core/italic', // 'core/image',
      'core/strikethrough', 'core/link'] // allowedFormats={ ['bold', 'italic', 'strikethrough', 'code', 'link' ] }
      // inlineToolbar

    }), React.createElement("span", {
      className: "".concat(gutenClassName, "__max")
    }, maxText), React.createElement("div", {
      className: "".concat(gutenClassName, "__container")
    }, React.createElement("div", {
      className: "".concat(gutenClassName, "__container__bar").concat(animate ? ' ' + gutenClassName + '__container__bar--animate' : ''),
      style: width
    }, progressText))));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes,
        className = _ref2.className;
    var title = attributes.title,
        percent = attributes.percent,
        showProgressText = attributes.showProgressText,
        animate = attributes.animate,
        id = attributes.id,
        classesList = attributes.classesList;
    var value = attributes.value,
        max = attributes.max;
    var allValue = getProgressValue(value, max, percent);
    var v = allValue.v;
    max = allValue.max;
    value = allValue.value;
    var width = {
      width: v + '%'
    };
    var progressText = showProgressText ? "".concat(value).concat(percent ? '%' : '') : '';
    var maxText = showProgressText ? "".concat(max).concat(percent ? '%' : '') : "".concat(value).concat(percent ? '%' : '', " ").concat(!percent ? '/' + max : '');
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, gutenClassName, {
        classesList: classesList
      }, id)
    }, React.createElement("span", {
      className: "".concat(gutenClassName, "__title")
    }, title), React.createElement("span", {
      className: "".concat(gutenClassName, "__max")
    }, maxText), React.createElement("div", {
      className: "".concat(gutenClassName, "__container")
    }, React.createElement("div", {
      className: "".concat(gutenClassName, "__container__bar").concat(animate ? ' ' + gutenClassName + '__container__bar--animate' : ''),
      style: width
    }, progressText)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/row/column.js":
/*!********************************************!*\
  !*** ./src/assets/js/blocks/row/column.js ***!
  \********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    PanelBody = _wp.components.PanelBody,
    InspectorControls = _wp.blockEditor.InspectorControls,
    InnerBlocks = _wp.blockEditor.InnerBlocks,
    select = _wp.data.select;
var name = 'awesome-blocks/column';
var settings = {
  title: __('Column', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle('columns'),
  description: __('A single column.', 'awesome-blocks'),
  parent: ['awesome-blocks/row'],
  category: 'design',
  attributes: {
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    },
    style: {
      // just for example (block preview)
      type: 'object',
      source: 'attribute',
      selector: 'xx',
      attribute: 'xx'
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        clientId = _ref.clientId,
        isSelected = _ref.isSelected;
    var id = attributes.id,
        classesList = attributes.classesList,
        style = attributes.style;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    var hasChildBlocks = select('core/block-editor').getBlockOrder(clientId).length > 0;
    return React.createElement(React.Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Column Settings', 'awesome-blocks')
    }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      },
      lite: {
        style: true,
        scroll: true,
        hover: true
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, {
        classesList: classesList
      }, id),
      style: style
    }, React.createElement(InnerBlocks, {
      templateLock: false,
      renderAppender: isSelected || !hasChildBlocks ? function () {
        return React.createElement(InnerBlocks.ButtonBlockAppender, null);
      } : function () {
        return React.createElement(Fragment, null);
      }
    })));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses({
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks.Content, null));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/row/edit.js":
/*!******************************************!*\
  !*** ./src/assets/js/blocks/row/edit.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ColumnBlock; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Component = _wp.element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    SelectControl = _wp$components.SelectControl,
    Button = _wp$components.Button,
    ToggleControl = _wp$components.ToggleControl,
    _wp$blockEditor = _wp.blockEditor,
    BlockVerticalAlignmentToolbar = _wp$blockEditor.BlockVerticalAlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls,
    BlockControls = _wp$blockEditor.BlockControls,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
/**
 * Returns the layouts configuration for a given number of columns.
 *
 * @param {number} columns Number of columns.
 *
 * @return {Object[]} Columns layout configuration.
 */

var getColumnsTemplate = _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].memoize(function (row) {
  var buildLayout = [];
  var listOfColumns = row.split('_');

  for (var col = 1; col <= listOfColumns.length; col++) {
    buildLayout.push(['awesome-blocks/column', {}]);
  }

  return buildLayout;
});
var columnsList = {
  '1-2_1-2': '1/2 + 1/2',
  '1-3_1-3_1-3': '1/3 + 1/3 + 1/3',
  '1-3_2-3': '1/3 + 2/3',
  '2-3_1-3': '2/3 + 1/3',
  '1-4_1-4_1-4_1-4': '1/4 + 1/4 + 1/4 + 1/4',
  '1-4_1-2_1-4': '1/4 + 1/2 + 1/4',
  '1-4_1-4_1-2': '1/4 + 1/4 + 1/2',
  '1-2_1-4_1-4': '1/2 + 1/4 + 1/4',
  '1-4_3-4': '1/4 + 3/4',
  '3-4_1-4': '3/4 + 1/4'
};

var ColumnBlock =
/*#__PURE__*/
function (_Component) {
  _inherits(ColumnBlock, _Component);

  function ColumnBlock() {
    var _this;

    _classCallCheck(this, ColumnBlock);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(ColumnBlock).apply(this, arguments));
    _this.setColumn = _this.setColumn.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(ColumnBlock, [{
    key: "setColumn",
    value: function setColumn(value) {
      this.props.setAttributes({
        row: value
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var row = attributes.row,
          device = attributes.device,
          verticalAlignment = attributes.verticalAlignment,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes); // Set layouts

      var layouts = [];

      var _loop = function _loop(layout) {
        layouts.push(React.createElement(Button, {
          label: columnsList[layout],
          className: 'awesome-blocks-icon icon-' + layout,
          key: layout,
          onClick: function onClick() {
            _this2.setColumn(layout);
          }
        }));
      };

      for (var layout in columnsList) {
        _loop(layout);
      }

      return React.createElement(React.Fragment, null, React.createElement(BlockControls, null, React.createElement(BlockVerticalAlignmentToolbar // onChange={ (v) => console.log(v) }
      , {
        onChange: function onChange(v) {
          setAttributes({
            verticalAlignment: v
          });
        },
        value: verticalAlignment
      })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Row Settings', 'awesome-blocks')
      }, React.createElement("label", null, __('layouts configuration', 'awesome-blocks')), React.createElement("div", {
        style: {
          textAlign: 'center'
        }
      }, layouts), React.createElement("hr", null), React.createElement(SelectControl, {
        label: __('Screen size', 'awesome-blocks'),
        value: device,
        options: [{
          label: __('Disable responsive', 'awesome-blocks'),
          Key: 'none',
          value: ''
        }, {
          label: __('Small screens', 'awesome-blocks'),
          Key: 'small',
          value: 'awesome-blocks-row-small'
        }, {
          label: __('Medium screens', 'awesome-blocks'),
          Key: 'medium',
          value: 'awesome-blocks-row-medium'
        }, {
          label: __('Large screens', 'awesome-blocks'),
          Key: 'large',
          value: 'awesome-blocks-row-large'
        }],
        onChange: function onChange(v) {
          return setAttributes({
            device: v
          });
        }
      }), React.createElement("i", null, __('create responsive grid system for small, medium or large screen sizes.', 'awesome-blocks')), React.createElement("hr", null), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        icon: "fa fa-cogs",
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, "has-".concat(row, "-columns"), _defineProperty({}, "awesome-blocks-rows-".concat(verticalAlignment, "-columns"), !!verticalAlignment), {
          classesList: classesList
        }, id)
      }, React.createElement(InnerBlocks, {
        allowedBlocks: ['awesome-blocks/column'],
        template: getColumnsTemplate(row) // templateLock="all"
        // templateLock="insert"
        // templateLock={ false }

      })));
    }
  }]);

  return ColumnBlock;
}(Component); // export default ColumnBlock;




/***/ }),

/***/ "./src/assets/js/blocks/row/index.js":
/*!*******************************************!*\
  !*** ./src/assets/js/blocks/row/index.js ***!
  \*******************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/row/edit.js");
/* harmony import */ var _iconify_icons_si_glyph_layout_4__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-si-glyph/layout-4 */ "./node_modules/@iconify/icons-si-glyph/layout-4.js");
/* harmony import */ var _iconify_icons_si_glyph_layout_4__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_si_glyph_layout_4__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */



/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
/**
 * Allowed blocks constant is passed to InnerBlocks precisely as specified here.
 * The contents of the array should never change.
 * The array should contain the name of each block that is allowed.
 * In columns block, the only block we allow is 'awesome-blocks/column'.
 *
 * @constant
 * @type {string[]}
*/

var name = 'awesome-blocks/row';
var settings = {
  title: __('Row and Columns', 'awesome-blocks'),
  description: __('CSS Grid Layout aka "Grid", It is a 2-dimensional grid system, meaning it can handle both columns and rows.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].iconStyle(_iconify_icons_si_glyph_layout_4__WEBPACK_IMPORTED_MODULE_1___default.a),
  category: 'design',
  attributes: {
    row: {
      type: 'string',
      default: '1-2_1-2' // default: '1-3_1-3_1-3',

    },
    device: {
      type: 'string' // default: 'awesome-blocks-row-small'

    },
    verticalAlignment: {
      type: 'string',
      default: ''
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  supports: {
    align: ['wide', 'full']
  },
  example: {
    attributes: {
      row: '1-3_2-3'
    },
    innerBlocks: [{
      name: 'awesome-blocks/column',
      attributes: {
        style: {
          borderRadius: '3px',
          padding: '20px 0',
          background: '#D4ECFF',
          border: '2px solid transparent'
        }
      },
      innerBlocks: [{
        name: 'core/paragraph',
        attributes: {
          customFontSize: 25,
          content: __('Column 1', 'awesome-blocks'),
          align: 'center'
        }
      }]
    }, {
      name: 'awesome-blocks/column',
      attributes: {
        style: {
          borderRadius: '3px',
          padding: '20px 0',
          background: '#FFD1E5',
          border: '2px solid transparent'
        }
      },
      innerBlocks: [{
        name: 'core/paragraph',
        attributes: {
          customFontSize: 25,
          content: __('Column 2', 'awesome-blocks'),
          align: 'center'
        }
      }]
    }]
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes;
    var row = attributes.row,
        device = attributes.device,
        verticalAlignment = attributes.verticalAlignment,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].gutenClasses("has-".concat(row, "-columns"), (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, device, device), _defineProperty(_H$gutenClasses, "awesome-blocks-rows-".concat(verticalAlignment, "-columns"), !!verticalAlignment), _H$gutenClasses), {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks.Content, null));
  },
  deprecated: [{
    attributes: {
      row: {
        type: 'string',
        default: '1-2_1-2' // default: '1-3_1-3_1-3',

      },
      device: {
        type: 'string' // default: 'awesome-blocks-row-small'

      },
      middleColumns: {
        type: 'string',
        default: ''
      },
      id: {
        type: 'string'
      },
      classesList: {
        type: 'string',
        default: ''
      }
    },
    save: function save(_ref2) {
      var _H$gutenClasses2;

      var attributes = _ref2.attributes;
      var row = attributes.row,
          device = attributes.device,
          middleColumns = attributes.middleColumns,
          id = attributes.id,
          classesList = attributes.classesList;
      return React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].gutenClasses("has-".concat(row, "-columns"), (_H$gutenClasses2 = {}, _defineProperty(_H$gutenClasses2, device, device), _defineProperty(_H$gutenClasses2, "awesome-blocks-rows-".concat(middleColumns, "-columns"), !!middleColumns), _H$gutenClasses2), {
          classesList: classesList
        }, id)
      }, React.createElement(InnerBlocks.Content, null));
    }
  }, {
    attributes: {
      row: {
        type: 'string',
        default: '1-2_1-2' // default: '1-3_1-3_1-3',

      },
      device: {
        type: 'string' // default: 'awesome-blocks-row-small'

      },
      middleColumns: {
        type: 'string',
        default: ''
      },
      id: {
        type: 'string'
      },
      classesList: {
        type: 'string',
        default: ''
      }
    },
    save: function save(_ref3) {
      var _H$gutenClasses3;

      var attributes = _ref3.attributes;
      var row = attributes.row,
          device = attributes.device,
          middleColumns = attributes.middleColumns,
          id = attributes.id,
          classesList = attributes.classesList;
      return React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].gutenClasses("has-".concat(row, "-columns"), (_H$gutenClasses3 = {}, _defineProperty(_H$gutenClasses3, device, device), _defineProperty(_H$gutenClasses3, "awesome-blocks-rows-middle-columns", !!middleColumns), _H$gutenClasses3), {
          classesList: classesList
        }, id)
      }, React.createElement(InnerBlocks.Content, null));
    }
  }]
};

/***/ }),

/***/ "./src/assets/js/blocks/search/index.js":
/*!**********************************************!*\
  !*** ./src/assets/js/blocks/search/index.js ***!
  \**********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _iconify_icons_wpf_search__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-wpf/search */ "./node_modules/@iconify/icons-wpf/search.js");
/* harmony import */ var _iconify_icons_wpf_search__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_wpf_search__WEBPACK_IMPORTED_MODULE_1__);
/**
 *  External dependencies
 */


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ServerSideRender = _wp$components.ServerSideRender,
    ToggleControl = _wp$components.ToggleControl,
    TextControl = _wp$components.TextControl,
    SelectControl = _wp$components.SelectControl,
    _wp$blockEditor = _wp.blockEditor,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls;
var name = 'awesome-blocks/search';
var settings = {
  title: __('Search Box', 'awesome-blocks'),
  description: __('It`s a search input which enables the visitors to find words, sentences, and numbers in a pages and posts.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle(_iconify_icons_wpf_search__WEBPACK_IMPORTED_MODULE_1___default.a, '#727272'),
  category: 'widgets',
  attributes: {
    theme: {
      type: 'string',
      default: ''
    },
    expand: {
      type: 'boolean',
      default: false
    },
    right: {
      type: 'boolean',
      default: false
    },
    editor: {
      type: 'boolean',
      default: false
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  example: {
    attributes: {
      theme: 'awesome-blocks-transparent'
    }
  },
  supports: {
    html: false // duplicate: false

  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var theme = attributes.theme,
        expand = attributes.expand,
        right = attributes.right,
        id = attributes.id,
        classesList = attributes.classesList;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Breadcrumb Menu Settings', 'awesome-blocks')
    }, React.createElement(SelectControl, {
      label: __('Select Theme', 'awesome-blocks'),
      value: theme,
      options: [{
        label: __('Select Theme', 'awesome-blocks'),
        key: '',
        value: ''
      }, {
        label: __('Light', 'awesome-blocks'),
        key: 'awesome-blocks-light',
        value: 'awesome-blocks-light'
      }, {
        label: __('Dark', 'awesome-blocks'),
        key: 'awesome-blocks-dark',
        value: 'awesome-blocks-dark'
      }, {
        label: __('Transparent', 'awesome-blocks'),
        key: 'awesome-blocks-transparent',
        value: 'awesome-blocks-transparent'
      }],
      onChange: function onChange(v) {
        return setAttributes({
          theme: v
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Expand on Hover', 'awesome-blocks'),
      checked: !!expand,
      onChange: function onChange() {
        setAttributes({
          expand: !expand
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Right Align', 'awesome-blocks'),
      checked: !!right,
      onChange: function onChange() {
        setAttributes({
          right: !right
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement(ServerSideRender, {
      block: "awesome-blocks/search",
      attributes: {
        theme: theme,
        expand: expand,
        right: right,
        id: id,
        editor: true,
        classesList: classesList
      }
    }));
  },
  save: function save() {
    return null;
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/separator/edit.js":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/separator/edit.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _heading_toolbar__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./heading-toolbar */ "./src/assets/js/blocks/separator/heading-toolbar.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * Edit Separator block.
 */


var _lodash = lodash,
    range = _lodash.range;
/**
 * WordPress dependencies
 */

var _wp = wp,
    _wp$i18n = _wp.i18n,
    __ = _wp$i18n.__,
    sprintf = _wp$i18n.sprintf,
    _wp$element = _wp.element,
    Platform = _wp$element.Platform,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    Toolbar = _wp$components.Toolbar,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    PanelColorSettings = _wp$blockEditor.PanelColorSettings,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls;

var SeparatorBlock =
/*#__PURE__*/
function (_Component) {
  _inherits(SeparatorBlock, _Component);

  function SeparatorBlock() {
    var _this;

    _classCallCheck(this, SeparatorBlock);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(SeparatorBlock).apply(this, arguments)); // this.createLevelControl = this.createLevelControl.bind(this)

    _this.onChangeContent = _this.onChangeContent.bind(_assertThisInitialized(_this));
    _this.toggleMask = _this.toggleMask.bind(_assertThisInitialized(_this));
    _this.toggleDubleLines = _this.toggleDubleLines.bind(_assertThisInitialized(_this));
    _this.setStyle = _this.setStyle.bind(_assertThisInitialized(_this));
    return _this;
  } // createLevelControl (targetLevel) {
  //   const { attributes, setAttributes } = this.props
  //   const { level } = attributes
  //   return {
  //     icon: 'heading',
  //     // translators: %s: heading level e.g: "1", "2", "3"
  //     title: sprintf(__('Heading %d', 'awesome-blocks'), targetLevel),
  //     isActive: targetLevel === level,
  //     onClick: () => setAttributes({ level: targetLevel }),
  //     subscript: String(targetLevel)
  //   }
  // }


  _createClass(SeparatorBlock, [{
    key: "onChangeContent",
    value: function onChangeContent(newContent) {
      var setAttributes = this.props.setAttributes;
      setAttributes({
        content: newContent
      });
    }
  }, {
    key: "toggleDubleLines",
    value: function toggleDubleLines() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes;
      setAttributes({
        dubleLines: !attributes.dubleLines
      });
    }
  }, {
    key: "toggleMask",
    value: function toggleMask() {
      var _this$props2 = this.props,
          attributes = _this$props2.attributes,
          setAttributes = _this$props2.setAttributes;
      setAttributes({
        apllyMask: !attributes.apllyMask
      });
    }
  }, {
    key: "setStyle",
    value: function setStyle(v) {
      var setAttributes = this.props.setAttributes;
      setAttributes({
        separatorStyle: v
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _H$gutenClasses;

      var _this$props3 = this.props,
          attributes = _this$props3.attributes,
          setAttributes = _this$props3.setAttributes,
          className = _this$props3.className,
          name = _this$props3.name;
      var content = attributes.content,
          icon = attributes.icon,
          align = attributes.align,
          level = attributes.level,
          dubleLines = attributes.dubleLines,
          apllyMask = attributes.apllyMask,
          separatorStyle = attributes.separatorStyle,
          borderColor = attributes.borderColor,
          textColor = attributes.textColor,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      var isAndroid = Platform.select({
        android: true,
        native: false,
        web: false
      });
      var tagName = 'h' + level;
      return React.createElement(Fragment, null, React.createElement(BlockControls, null, !isAndroid && React.createElement(AlignmentToolbar, {
        value: align,
        onChange: function onChange(v) {
          return setAttributes({
            align: v
          });
        }
      }), React.createElement(_heading_toolbar__WEBPACK_IMPORTED_MODULE_1__["default"], {
        minLevel: Platform.OS === 'web' ? 2 : 1,
        maxLevel: Platform.OS === 'web' ? 5 : 7,
        selectedLevel: level,
        onChange: function onChange(newLevel) {
          return setAttributes({
            level: newLevel
          });
        }
      })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Separator Settings', 'awesome-blocks')
      }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), Platform.OS === 'web' && React.createElement(Fragment, null, React.createElement("p", null, __('Text Level', 'awesome-blocks')), React.createElement(_heading_toolbar__WEBPACK_IMPORTED_MODULE_1__["default"], {
        isCollapsed: false,
        minLevel: 1,
        maxLevel: 7,
        selectedLevel: level,
        onChange: function onChange(newLevel) {
          return setAttributes({
            level: newLevel
          });
        }
      })), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
        title: __('Icon', 'awesome-blocks'),
        classPlaceholder: __('Insert icon class', 'awesome-blocks'),
        fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
        ,
        value: icon,
        onSelect: function onSelect(value) {
          return setAttributes({
            icon: value
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Duble Lines', 'awesome-blocks'),
        checked: !!dubleLines,
        onChange: this.toggleDubleLines
      }), React.createElement(ToggleControl, {
        label: __('Apply Mask', 'awesome-blocks'),
        checked: !!apllyMask,
        onChange: this.toggleMask
      }), React.createElement(SelectControl, {
        label: __('Separator Style', 'awesome-blocks'),
        value: separatorStyle,
        options: [{
          label: __('Default', 'awesome-blocks'),
          Key: 'default',
          value: 'Default'
        }, {
          label: __('Dotted', 'awesome-blocks'),
          Key: 'dotted',
          value: 'dotted'
        }, {
          label: __('dashed', 'awesome-blocks'),
          Key: 'dashed',
          value: 'dashed'
        }],
        onChange: this.setStyle
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        icon: "fa fa-cogs",
        value: {
          classesList: classesList
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        }
      })), React.createElement(PanelColorSettings, {
        title: __('Color Settings', 'awesome-blocks'),
        initialOpen: false,
        colorSettings: [{
          value: textColor,
          onChange: function onChange(nextColor) {
            return setAttributes({
              textColor: nextColor
            });
          },
          label: __('Text Color', 'awesome-blocks')
        }, {
          value: borderColor,
          onChange: function onChange(nextColor) {
            return setAttributes({
              borderColor: nextColor
            });
          },
          label: __('Separator Color', 'awesome-blocks')
        }]
      })), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, (_H$gutenClasses = {
          'separator-mask': apllyMask,
          'duble-lines': dubleLines
        }, _defineProperty(_H$gutenClasses, align + '-text', align), _defineProperty(_H$gutenClasses, separatorStyle, separatorStyle), _H$gutenClasses), {
          classesList: classesList
        }, id)
      }, React.createElement("div", {
        className: "left-separator",
        style: {
          borderColor: borderColor
        }
      }), React.createElement(RichText, {
        tagName: tagName,
        className: "separator-text",
        onChange: this.onChangeContent,
        value: content,
        style: {
          color: textColor
        },
        allowedFormats: ['core/bold', 'core/italic', // 'core/image',
        'core/strikethrough', 'core/link' // 'core/code',
        ],
        inlineToolbar: true
      }), icon && React.createElement("i", {
        className: icon,
        style: {
          color: textColor
        }
      }), React.createElement("div", {
        className: "right-separator",
        style: {
          borderColor: borderColor
        }
      })));
    }
  }]);

  return SeparatorBlock;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (SeparatorBlock);

/***/ }),

/***/ "./src/assets/js/blocks/separator/heading-level-icon.js":
/*!**************************************************************!*\
  !*** ./src/assets/js/blocks/separator/heading-level-icon.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return AwesomeBlocksHeadingLevelIcon; });
/**
 * WordPress dependencies
 */
var _wp = wp,
    _wp$components = _wp.components,
    Path = _wp$components.Path,
    SVG = _wp$components.SVG;
function AwesomeBlocksHeadingLevelIcon(_ref) {
  var level = _ref.level,
      _ref$isPressed = _ref.isPressed,
      isPressed = _ref$isPressed === void 0 ? false : _ref$isPressed;
  var levelToPath = {
    1: 'M9 5h2v10H9v-4H5v4H3V5h2v4h4V5zm6.6 0c-.6.9-1.5 1.7-2.6 2v1h2v7h2V5h-1.4z',
    2: 'M7 5h2v10H7v-4H3v4H1V5h2v4h4V5zm8 8c.5-.4.6-.6 1.1-1.1.4-.4.8-.8 1.2-1.3.3-.4.6-.8.9-1.3.2-.4.3-.8.3-1.3 0-.4-.1-.9-.3-1.3-.2-.4-.4-.7-.8-1-.3-.3-.7-.5-1.2-.6-.5-.2-1-.2-1.5-.2-.4 0-.7 0-1.1.1-.3.1-.7.2-1 .3-.3.1-.6.3-.9.5-.3.2-.6.4-.8.7l1.2 1.2c.3-.3.6-.5 1-.7.4-.2.7-.3 1.2-.3s.9.1 1.3.4c.3.3.5.7.5 1.1 0 .4-.1.8-.4 1.1-.3.5-.6.9-1 1.2-.4.4-1 .9-1.6 1.4-.6.5-1.4 1.1-2.2 1.6V15h8v-2H15z',
    3: 'M12.1 12.2c.4.3.8.5 1.2.7.4.2.9.3 1.4.3.5 0 1-.1 1.4-.3.3-.1.5-.5.5-.8 0-.2 0-.4-.1-.6-.1-.2-.3-.3-.5-.4-.3-.1-.7-.2-1-.3-.5-.1-1-.1-1.5-.1V9.1c.7.1 1.5-.1 2.2-.4.4-.2.6-.5.6-.9 0-.3-.1-.6-.4-.8-.3-.2-.7-.3-1.1-.3-.4 0-.8.1-1.1.3-.4.2-.7.4-1.1.6l-1.2-1.4c.5-.4 1.1-.7 1.6-.9.5-.2 1.2-.3 1.8-.3.5 0 1 .1 1.6.2.4.1.8.3 1.2.5.3.2.6.5.8.8.2.3.3.7.3 1.1 0 .5-.2.9-.5 1.3-.4.4-.9.7-1.5.9v.1c.6.1 1.2.4 1.6.8.4.4.7.9.7 1.5 0 .4-.1.8-.3 1.2-.2.4-.5.7-.9.9-.4.3-.9.4-1.3.5-.5.1-1 .2-1.6.2-.8 0-1.6-.1-2.3-.4-.6-.2-1.1-.6-1.6-1l1.1-1.4zM7 9H3V5H1v10h2v-4h4v4h2V5H7v4z',
    4: 'M9 15H7v-4H3v4H1V5h2v4h4V5h2v10zm10-2h-1v2h-2v-2h-5v-2l4-6h3v6h1v2zm-3-2V7l-2.8 4H16z',
    5: 'M12.1 12.2c.4.3.7.5 1.1.7.4.2.9.3 1.3.3.5 0 1-.1 1.4-.4.4-.3.6-.7.6-1.1 0-.4-.2-.9-.6-1.1-.4-.3-.9-.4-1.4-.4H14c-.1 0-.3 0-.4.1l-.4.1-.5.2-1-.6.3-5h6.4v1.9h-4.3L14 8.8c.2-.1.5-.1.7-.2.2 0 .5-.1.7-.1.5 0 .9.1 1.4.2.4.1.8.3 1.1.6.3.2.6.6.8.9.2.4.3.9.3 1.4 0 .5-.1 1-.3 1.4-.2.4-.5.8-.9 1.1-.4.3-.8.5-1.3.7-.5.2-1 .3-1.5.3-.8 0-1.6-.1-2.3-.4-.6-.2-1.1-.6-1.6-1-.1-.1 1-1.5 1-1.5zM9 15H7v-4H3v4H1V5h2v4h4V5h2v10z',
    6: 'M9 15H7v-4H3v4H1V5h2v4h4V5h2v10zm8.6-7.5c-.2-.2-.5-.4-.8-.5-.6-.2-1.3-.2-1.9 0-.3.1-.6.3-.8.5l-.6.9c-.2.5-.2.9-.2 1.4.4-.3.8-.6 1.2-.8.4-.2.8-.3 1.3-.3.4 0 .8 0 1.2.2.4.1.7.3 1 .6.3.3.5.6.7.9.2.4.3.8.3 1.3s-.1.9-.3 1.4c-.2.4-.5.7-.8 1-.4.3-.8.5-1.2.6-1 .3-2 .3-3 0-.5-.2-1-.5-1.4-.9-.4-.4-.8-.9-1-1.5-.2-.6-.3-1.3-.3-2.1s.1-1.6.4-2.3c.2-.6.6-1.2 1-1.6.4-.4.9-.7 1.4-.9.6-.3 1.1-.4 1.7-.4.7 0 1.4.1 2 .3.5.2 1 .5 1.4.8 0 .1-1.3 1.4-1.3 1.4zm-2.4 5.8c.2 0 .4 0 .6-.1.2 0 .4-.1.5-.2.1-.1.3-.3.4-.5.1-.2.1-.5.1-.7 0-.4-.1-.8-.4-1.1-.3-.2-.7-.3-1.1-.3-.3 0-.7.1-1 .2-.4.2-.7.4-1 .7 0 .3.1.7.3 1 .1.2.3.4.4.6.2.1.3.3.5.3.2.1.5.2.7.1z'
  };

  if (!levelToPath.hasOwnProperty(level)) {
    return null;
  }

  return React.createElement(SVG, {
    width: "24",
    height: "24",
    viewBox: "0 0 20 20",
    xmlns: "http://www.w3.org/2000/svg",
    isPressed: isPressed
  }, React.createElement(Path, {
    d: levelToPath[level]
  }));
}

/***/ }),

/***/ "./src/assets/js/blocks/separator/heading-toolbar.js":
/*!***********************************************************!*\
  !*** ./src/assets/js/blocks/separator/heading-toolbar.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _heading_level_icon__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./heading-level-icon */ "./src/assets/js/blocks/separator/heading-level-icon.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * External dependencies
 */
// import { range } from 'lodash';

/**
 * WordPress dependencies
 */
var _wp = wp,
    _wp$i18n = _wp.i18n,
    __ = _wp$i18n.__,
    sprintf = _wp$i18n.sprintf,
    Component = _wp.element.Component,
    ToolbarGroup = _wp.components.ToolbarGroup;
/**
 * Internal dependencies
 */



var AwesomeBlocksHeadingToolbar =
/*#__PURE__*/
function (_Component) {
  _inherits(AwesomeBlocksHeadingToolbar, _Component);

  function AwesomeBlocksHeadingToolbar() {
    _classCallCheck(this, AwesomeBlocksHeadingToolbar);

    return _possibleConstructorReturn(this, _getPrototypeOf(AwesomeBlocksHeadingToolbar).apply(this, arguments));
  }

  _createClass(AwesomeBlocksHeadingToolbar, [{
    key: "createLevelControl",
    value: function createLevelControl(targetLevel, selectedLevel, onChange) {
      var isActive = targetLevel === selectedLevel;
      return {
        icon: React.createElement(_heading_level_icon__WEBPACK_IMPORTED_MODULE_0__["default"], {
          level: targetLevel,
          isPressed: isActive
        }),
        // translators: %s: heading level e.g: "1", "2", "3"
        title: sprintf(__('Heading %d', 'awesome-blocks'), targetLevel),
        isActive: isActive,
        onClick: function onClick() {
          return onChange(targetLevel);
        }
      };
    }
  }, {
    key: "render",
    value: function render() {
      var _this = this;

      var _this$props = this.props,
          _this$props$isCollaps = _this$props.isCollapsed,
          isCollapsed = _this$props$isCollaps === void 0 ? true : _this$props$isCollaps,
          minLevel = _this$props.minLevel,
          maxLevel = _this$props.maxLevel,
          selectedLevel = _this$props.selectedLevel,
          onChange = _this$props.onChange;

      var range = function range(fromValue, toValue) {
        var array = [];

        for (var i = fromValue; i <= toValue; i++) {
          array.push(i);
        }

        return array;
      };

      return React.createElement(ToolbarGroup, {
        isCollapsed: isCollapsed,
        icon: React.createElement(_heading_level_icon__WEBPACK_IMPORTED_MODULE_0__["default"], {
          level: selectedLevel
        }),
        controls: range(minLevel, maxLevel).map(function (index) {
          return _this.createLevelControl(index, selectedLevel, onChange);
        }),
        label: __('Change heading level', 'awesome-blocks')
      });
    }
  }]);

  return AwesomeBlocksHeadingToolbar;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (AwesomeBlocksHeadingToolbar);

/***/ }),

/***/ "./src/assets/js/blocks/separator/index.js":
/*!*************************************************!*\
  !*** ./src/assets/js/blocks/separator/index.js ***!
  \*************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/separator/edit.js");
/* harmony import */ var _iconify_icons_mdi_arrow_split_horizontal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-mdi/arrow-split-horizontal */ "./node_modules/@iconify/icons-mdi/arrow-split-horizontal.js");
/* harmony import */ var _iconify_icons_mdi_arrow_split_horizontal__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_mdi_arrow_split_horizontal__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 *  Start ExtraBlocks Separator block.
 */



/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RichText = _wp.blockEditor.RichText;
var name = 'awesome-blocks/separator';
var blockAttributes = {
  content: {
    type: 'array',
    source: 'children',
    selector: 'h1,h2,h3,h4,h5,h6'
  },
  icon: {
    type: 'string'
  },
  align: {
    type: 'string',
    default: 'center'
  },
  level: {
    type: 'number',
    default: 4
  },
  separatorStyle: {
    type: 'string'
  },
  dubleLines: {
    type: 'boolean',
    default: false
  },
  apllyMask: {
    type: 'boolean',
    default: false
  },
  borderColor: {
    type: 'string'
  },
  textColor: {
    type: 'string'
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string'
  }
};
var settings = {
  title: __('Separator', 'awesome-blocks'),
  description: __('You can use this block to separate the content vertically.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].iconStyle(_iconify_icons_mdi_arrow_split_horizontal__WEBPACK_IMPORTED_MODULE_1___default.a),
  category: 'design',
  attributes: blockAttributes,
  supports: {
    align: ['wide', 'full']
  },
  example: {
    attributes: {
      content: __('Separator Block', 'awesome-blocks'),
      icon: 'fa fa-angle-down',
      dubleLines: true,
      // apllyMask: true,
      borderColor: '#3888DB',
      textColor: '#3888DB',
      separatorStyle: 'default'
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var content = attributes.content,
        icon = attributes.icon,
        align = attributes.align,
        level = attributes.level,
        dubleLines = attributes.dubleLines,
        apllyMask = attributes.apllyMask,
        separatorStyle = attributes.separatorStyle,
        borderColor = attributes.borderColor,
        textColor = attributes.textColor,
        id = attributes.id,
        classesList = attributes.classesList;
    var tagName = 'h' + level;
    var isEmpty = content.length > 0 && content[0] !== '';
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].gutenClasses((_H$gutenClasses = {
        'separator-mask': apllyMask,
        'duble-lines': dubleLines
      }, _defineProperty(_H$gutenClasses, align + '-text', !!align), _defineProperty(_H$gutenClasses, separatorStyle, !!separatorStyle), _H$gutenClasses), {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "left-separator",
      style: {
        borderColor: borderColor
      }
    }), isEmpty && React.createElement(RichText.Content, {
      tagName: tagName,
      value: content,
      style: {
        color: textColor
      }
    }), icon && React.createElement("i", {
      className: icon,
      style: {
        color: textColor
      }
    }), React.createElement("div", {
      className: "right-separator",
      style: {
        borderColor: borderColor
      }
    }));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/smenu/index.js":
/*!*********************************************!*\
  !*** ./src/assets/js/blocks/smenu/index.js ***!
  \*********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _iconify_icons_dashicons_welcome_widgets_menus__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-dashicons/welcome-widgets-menus */ "./node_modules/@iconify/icons-dashicons/welcome-widgets-menus.js");
/* harmony import */ var _iconify_icons_dashicons_welcome_widgets_menus__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_dashicons_welcome_widgets_menus__WEBPACK_IMPORTED_MODULE_1__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 *  External dependencies
 */


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ServerSideRender = _wp$components.ServerSideRender,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    _wp$blockEditor = _wp.blockEditor,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls;
var name = 'awesome-blocks/smenu';
var settings = {
  title: __('Simple Menu', 'awesome-blocks'),
  description: __('With Simple Menu block you can add menus to any place.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle(_iconify_icons_dashicons_welcome_widgets_menus__WEBPACK_IMPORTED_MODULE_1___default.a),
  category: 'widgets',
  attributes: {
    menu: {
      type: 'string',
      default: ''
    },
    align: {
      type: 'string',
      default: ''
    },
    'vertical': {
      type: 'boolean',
      default: false
    },
    editor: {
      type: 'boolean',
      default: false
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  supports: {
    html: false // duplicate: false

  },
  example: {
    attributes: {
      vertical: true
    }
  },
  edit: function edit(_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var menu = attributes.menu,
        align = attributes.align,
        vertical = attributes.vertical,
        id = attributes.id,
        classesList = attributes.classesList;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    var menusList = [{
      label: __('Select Menu', 'awesome-blocks'),
      key: '',
      value: ''
    }];

    if ((typeof awesomeblocks_menu_list === "undefined" ? "undefined" : _typeof(awesomeblocks_menu_list)) === 'object' && typeof awesomeblocks_menu_list.map === 'function') {
      awesomeblocks_menu_list.map(function (menu) {
        menusList.push({
          label: menu.name,
          key: menu.slug,
          value: menu.slug
        });
      });
    }

    return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
      value: align,
      onChange: function onChange(v) {
        return setAttributes({
          align: v
        });
      }
    })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Menu Settings', 'awesome-blocks')
    }, React.createElement(SelectControl, {
      label: __('Select Menu', 'awesome-blocks'),
      value: menu,
      options: menusList,
      onChange: function onChange(v) {
        return setAttributes({
          menu: v
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Vertical', 'awesome-blocks'),
      checked: !!vertical,
      onChange: function onChange() {
        setAttributes({
          vertical: !vertical
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id, " ul li"),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement(ServerSideRender, {
      block: "awesome-blocks/smenu",
      attributes: {
        menu: menu,
        align: align,
        id: id,
        vertical: vertical,
        editor: true,
        classesList: classesList
      }
    }));
  },
  save: function save() {
    return null;
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/social/block.json":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/social/block.json ***!
  \************************************************/
/*! exports provided: name, category, attributes, default */
/***/ (function(module) {

module.exports = JSON.parse("{\"name\":\"awesome-blocks/social\",\"category\":\"design\",\"attributes\":{\"align\":{\"type\":\"string\",\"default\":\"\"},\"size\":{\"type\":\"number\",\"default\":5},\"shadow\":{\"type\":\"boolean\",\"default\":false},\"facebook\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.facebook\",\"attribute\":\"href\"},\"twitter\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.twitter\",\"attribute\":\"href\"},\"linkedin\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.linkedin\",\"attribute\":\"href\"},\"youtube\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.youtube\",\"attribute\":\"href\"},\"vimeo\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.vimeo\",\"attribute\":\"href\"},\"instagram\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.instagram\",\"attribute\":\"href\"},\"pinterest\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.pinterest\",\"attribute\":\"href\"},\"flickr\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.flickr\",\"attribute\":\"href\"},\"github\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.github\",\"attribute\":\"href\"},\"vk\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.vk\",\"attribute\":\"href\"},\"tumblr\":{\"type\":\"string\",\"source\":\"attribute\",\"selector\":\"a.tumblr\",\"attribute\":\"href\"},\"id\":{\"type\":\"string\"},\"classesList\":{\"type\":\"string\",\"default\":\"\"},\"style\":{\"type\":\"object\",\"source\":\"attribute\",\"selector\":\"xx\",\"attribute\":\"xx\"}}}");

/***/ }),

/***/ "./src/assets/js/blocks/social/index.js":
/*!**********************************************!*\
  !*** ./src/assets/js/blocks/social/index.js ***!
  \**********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/assets/js/blocks/social/style.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_style_scss__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _iconify_icons_jam_users__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @iconify/icons-jam/users */ "./node_modules/@iconify/icons-jam/users.js");
/* harmony import */ var _iconify_icons_jam_users__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_jam_users__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _libs_react_modal_popup__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../libs/react-modal-popup */ "./src/assets/js/blocks/libs/react-modal-popup/index.js");
/* harmony import */ var _libs_react_clean_tabs__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../libs/react-clean-tabs */ "./src/assets/js/blocks/libs/react-clean-tabs/index.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./block.json */ "./src/assets/js/blocks/social/block.json");
var _block_json__WEBPACK_IMPORTED_MODULE_5___namespace = /*#__PURE__*/__webpack_require__.t(/*! ./block.json */ "./src/assets/js/blocks/social/block.json", 1);
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 *  External dependencies
 */




 // import deprecated from './deprecated'


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    TextControl = _wp$components.TextControl,
    RangeControl = _wp$components.RangeControl,
    _wp$blockEditor = _wp.blockEditor,
    BlockControls = _wp$blockEditor.BlockControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InspectorControls = _wp$blockEditor.InspectorControls; // export const name = 'awesome-blocks/social'

var name = _block_json__WEBPACK_IMPORTED_MODULE_5__.name,
    attributes = _block_json__WEBPACK_IMPORTED_MODULE_5__.attributes;

var settings = {
  title: __('Social Media Menu', 'awesome-blocks'),
  description: __('Easily create beautiful social media menu.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle(_iconify_icons_jam_users__WEBPACK_IMPORTED_MODULE_2___default.a, '#5ED561'),
  keywords: [__('social media', 'awesome-blocks')],
  attributes: attributes,
  category: 'widgets',
  supports: {
    html: false
  },
  example: {
    attributes: {
      shadow: true,
      style: {
        padding: '0 10px',
        background: 'rgba(0,130,190,0.6)',
        border: '1px solid rgba(0,130,190,0.7)',
        borderRadius: '3px',
        margin: '5px',
        size: '15'
      }
    }
  },
  edit: function edit(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var align = attributes.align,
        size = attributes.size,
        shadow = attributes.shadow,
        id = attributes.id,
        classesList = attributes.classesList,
        style = attributes.style;
    var facebook = attributes.facebook,
        twitter = attributes.twitter,
        linkedin = attributes.linkedin,
        youtube = attributes.youtube,
        vimeo = attributes.vimeo,
        instagram = attributes.instagram,
        pinterest = attributes.pinterest,
        flickr = attributes.flickr,
        github = attributes.github,
        vk = attributes.vk,
        tumblr = attributes.tumblr;
    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);

    if (!facebook && !twitter && !linkedin && !youtube && !vimeo && !instagram && !pinterest && !flickr && !github && !vk && !tumblr) {
      facebook = twitter = youtube = instagram = linkedin = github = '#';
    }

    var titleLinkedIn = __('LinkedIn', 'awesome-blocks');

    var titlePinterest = __('Pinterest', 'awesome-blocks');

    var titleVimeo = __('Vimeo', 'vimeo');

    var titleFlickr = __('Flickr', 'awesome-blocks');

    var titleTumblr = __('Tumblr', 'awesome-blocks');

    var titlevk = __('vk', 'awesome-blocks');

    return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
      value: align,
      onChange: function onChange(v) {
        return setAttributes({
          align: v
        });
      }
    })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Social Menu Settings', 'awesome-blocks')
    }, React.createElement(RangeControl, {
      label: __('Icons size', 'awesome-blocks'),
      value: size,
      onChange: function onChange(v) {
        return setAttributes({
          size: v
        });
      },
      min: 1,
      max: 20
    }), React.createElement(ToggleControl, {
      label: __('Shadow', 'awesome-blocks'),
      checked: !!shadow,
      onChange: function onChange() {
        setAttributes({
          shadow: !shadow
        });
      }
    }), React.createElement(_libs_react_modal_popup__WEBPACK_IMPORTED_MODULE_3__["default"], {
      title: __('Edit Social Menu', 'awesome-blocks'),
      iconClass: "fa fa-users",
      appendTo: "editor"
    }, React.createElement(_libs_react_clean_tabs__WEBPACK_IMPORTED_MODULE_4__["default"], {
      color: "#555",
      bgColor: "#FFF"
    }, React.createElement(_libs_react_clean_tabs__WEBPACK_IMPORTED_MODULE_4__["default"].Item, {
      active: true,
      title: __('SocialMedia links', 'awesome-blocks'),
      iconClass: "fa fa-group",
      className: "awesome-blocks-social-links"
    }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement("div", null, React.createElement("i", {
      className: "fab fa-facebook"
    }), React.createElement(TextControl, {
      className: "awesome-blocks-social-text",
      placeholder: __('Facebook', 'awesome-blocks'),
      value: facebook,
      onChange: function onChange(v) {
        return setAttributes({
          facebook: v
        });
      }
    })), React.createElement("div", null, React.createElement("i", {
      className: "fab fa-twitter"
    }), React.createElement(TextControl, {
      className: "awesome-blocks-social-text",
      placeholder: __('Twitter', 'awesome-blocks'),
      value: twitter,
      onChange: function onChange(v) {
        return setAttributes({
          twitter: v
        });
      }
    })), React.createElement("div", null, React.createElement("i", {
      className: "fab fa-instagram"
    }), React.createElement(TextControl, {
      className: "awesome-blocks-social-text",
      placeholder: __('Instagram', 'awesome-blocks'),
      value: instagram,
      onChange: function onChange(v) {
        return setAttributes({
          instagram: v
        });
      }
    })), React.createElement("div", null, React.createElement("i", {
      className: "fab fa-youtube"
    }), React.createElement(TextControl, {
      className: "awesome-blocks-social-text",
      placeholder: __('Youtube', 'awesome-blocks'),
      value: youtube,
      onChange: function onChange(v) {
        return setAttributes({
          youtube: v
        });
      }
    })), React.createElement("div", null, React.createElement("i", {
      className: "fab fa-github"
    }), React.createElement(TextControl, {
      className: "awesome-blocks-social-text",
      placeholder: __('Github', 'awesome-blocks'),
      value: github,
      onChange: function onChange(v) {
        return setAttributes({
          github: v
        });
      }
    })),  false && false))), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      icon: "fa fa-cogs",
      elementID: id,
      elementStyle: ".".concat(id, " a.awesome-blocks-social"),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      },
      lite: {
        style: true
      }
    }))), React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, (_H$gutenClasses = {
        'awesome-blocks-shadow': shadow
      }, _defineProperty(_H$gutenClasses, 'awesome-blocks-' + align, align), _defineProperty(_H$gutenClasses, 'size-' + size, true), _H$gutenClasses), {
        classesList: classesList
      }, id)
    }, !!facebook && React.createElement("a", {
      className: "awesome-blocks-social facebook",
      href: facebook,
      style: style
    }, React.createElement("i", {
      className: "fab fa-facebook"
    })), !!twitter && React.createElement("a", {
      className: "awesome-blocks-social twitter",
      href: twitter,
      style: style
    }, React.createElement("i", {
      className: "fab fa-twitter"
    })), !!instagram && React.createElement("a", {
      className: "awesome-blocks-social instagram",
      href: instagram,
      style: style
    }, React.createElement("i", {
      className: "fab fa-instagram"
    })), !!youtube && React.createElement("a", {
      className: "awesome-blocks-social youtube",
      href: youtube,
      style: style
    }, React.createElement("i", {
      className: "fab fa-youtube"
    })), !!github && React.createElement("a", {
      className: "awesome-blocks-social github",
      href: github,
      style: style
    }, React.createElement("i", {
      className: "fab fa-github"
    })), !!linkedin && React.createElement("a", {
      className: "awesome-blocks-social linkedin",
      href: linkedin,
      style: style
    }, React.createElement("i", {
      className: "fab fa-linkedin"
    })), !!pinterest && React.createElement("a", {
      className: "awesome-blocks-social pinterest",
      href: pinterest,
      style: style
    }, React.createElement("i", {
      className: "fab fa-pinterest"
    })), !!vimeo && React.createElement("a", {
      className: "awesome-blocks-social vimeo",
      href: vimeo,
      style: style
    }, React.createElement("i", {
      className: "fab fa-vimeo"
    })), !!flickr && React.createElement("a", {
      className: "awesome-blocks-social flickr",
      href: flickr,
      style: style
    }, React.createElement("i", {
      className: "fab fa-flickr"
    })), !!tumblr && React.createElement("a", {
      className: "awesome-blocks-social tumblr",
      href: tumblr,
      style: style
    }, React.createElement("i", {
      className: "fab fa-tumblr"
    })), !!vk && React.createElement("a", {
      className: "awesome-blocks-social vk",
      href: vk,
      style: style
    }, React.createElement("i", {
      className: "fab fa-vk"
    }))));
  },
  save: function save(_ref2) {
    var _H$gutenClasses2;

    var attributes = _ref2.attributes,
        className = _ref2.className;
    var id = attributes.id,
        align = attributes.align,
        size = attributes.size,
        shadow = attributes.shadow,
        classesList = attributes.classesList;
    var facebook = attributes.facebook,
        twitter = attributes.twitter,
        linkedin = attributes.linkedin,
        youtube = attributes.youtube,
        vimeo = attributes.vimeo,
        instagram = attributes.instagram,
        pinterest = attributes.pinterest,
        flickr = attributes.flickr,
        github = attributes.github,
        vk = attributes.vk,
        tumblr = attributes.tumblr;

    if (!facebook && !twitter && !linkedin && !youtube && !vimeo && !instagram && !pinterest && !flickr && !github && !vk && !tumblr) {
      facebook = twitter = youtube = instagram = linkedin = github = '#';
    }

    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses((_H$gutenClasses2 = {
        'awesome-blocks-shadow': shadow
      }, _defineProperty(_H$gutenClasses2, 'awesome-blocks-' + align, align), _defineProperty(_H$gutenClasses2, 'size-' + size, true), _H$gutenClasses2), {
        classesList: classesList
      }, id)
    }, !!facebook && React.createElement("a", {
      className: "awesome-blocks-social facebook",
      href: facebook
    }, React.createElement("i", {
      className: "fab fa-facebook"
    })), !!twitter && React.createElement("a", {
      className: "awesome-blocks-social twitter",
      href: twitter
    }, React.createElement("i", {
      className: "fab fa-twitter"
    })), !!instagram && React.createElement("a", {
      className: "awesome-blocks-social instagram",
      href: instagram
    }, React.createElement("i", {
      className: "fab fa-instagram"
    })), !!youtube && React.createElement("a", {
      className: "awesome-blocks-social youtube",
      href: youtube
    }, React.createElement("i", {
      className: "fab fa-youtube"
    })), !!github && React.createElement("a", {
      className: "awesome-blocks-social github",
      href: github
    }, React.createElement("i", {
      className: "fab fa-github"
    })), !!linkedin && React.createElement("a", {
      className: "awesome-blocks-social linkedin",
      href: linkedin
    }, React.createElement("i", {
      className: "fab fa-linkedin"
    })), !!pinterest && React.createElement("a", {
      className: "awesome-blocks-social pinterest",
      href: pinterest
    }, React.createElement("i", {
      className: "fab fa-pinterest"
    })), !!vimeo && React.createElement("a", {
      className: "awesome-blocks-social vimeo",
      href: vimeo
    }, React.createElement("i", {
      className: "fab fa-vimeo"
    })), !!flickr && React.createElement("a", {
      className: "awesome-blocks-social flickr",
      href: flickr
    }, React.createElement("i", {
      className: "fab fa-flickr"
    })), !!tumblr && React.createElement("a", {
      className: "awesome-blocks-social tumblr",
      href: tumblr
    }, React.createElement("i", {
      className: "fab fa-tumblr"
    })), !!vk && React.createElement("a", {
      className: "awesome-blocks-social vk",
      href: vk
    }, React.createElement("i", {
      className: "fab fa-vk"
    })));
  } // deprecated

};

/***/ }),

/***/ "./src/assets/js/blocks/social/style.scss":
/*!************************************************!*\
  !*** ./src/assets/js/blocks/social/style.scss ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../../../node_modules/css-loader/dist/cjs.js!../../../../../node_modules/sass-loader/dist/cjs.js!./style.scss */ "./node_modules/css-loader/dist/cjs.js!./node_modules/sass-loader/dist/cjs.js!./src/assets/js/blocks/social/style.scss");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);

var exported = content.locals ? content.locals : {};



module.exports = exported;

/***/ }),

/***/ "./src/assets/js/blocks/spacer/index.js":
/*!**********************************************!*\
  !*** ./src/assets/js/blocks/spacer/index.js ***!
  \**********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _iconify_icons_ant_design_colum_height_outline__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @iconify/icons-ant-design/colum-height-outline */ "./node_modules/@iconify/icons-ant-design/colum-height-outline.js");
/* harmony import */ var _iconify_icons_ant_design_colum_height_outline__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_ant_design_colum_height_outline__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
var _settings;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */
// import Resizable from 're-resizable'
// const Resizable = require('re-resizable')


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    SelectControl = _wp$components.SelectControl,
    ToggleControl = _wp$components.ToggleControl,
    RangeControl = _wp$components.RangeControl,
    PanelBody = _wp$components.PanelBody,
    _wp$blockEditor = _wp.blockEditor,
    PanelColorSettings = _wp$blockEditor.PanelColorSettings,
    InspectorControls = _wp$blockEditor.InspectorControls;
var name = 'awesome-blocks/spacer';
var settings = (_settings = {
  title: __('Spacer', 'awesome-blocks'),
  description: __('This will help you to create a flexible spacer.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].iconStyle(_iconify_icons_ant_design_colum_height_outline__WEBPACK_IMPORTED_MODULE_0___default.a)
}, _defineProperty(_settings, "description", __('Spacer block.', 'awesome-blocks')), _defineProperty(_settings, "category", 'design'), _defineProperty(_settings, "attributes", {
  style: {
    type: 'string',
    default: 'center'
  },
  ratio: {
    type: 'string',
    default: ''
  },
  height: {
    type: 'number',
    default: 50
  },
  container: {
    type: 'boolean',
    default: false
  },
  borderSize: {
    type: 'number',
    default: 0
  },
  borderColor: {
    type: 'string',
    default: '#DDDDDD'
  },
  id: {
    type: 'string',
    default: ''
  },
  classesList: {
    type: 'string',
    default: ''
  }
}), _defineProperty(_settings, "supports", {
  align: ['wide', 'full']
}), _defineProperty(_settings, "example", {
  attributes: {
    borderSize: '1'
  }
}), _defineProperty(_settings, "edit", function edit(_ref) {
  var attributes = _ref.attributes,
      setAttributes = _ref.setAttributes,
      className = _ref.className;
  var style = attributes.style,
      ratio = attributes.ratio,
      height = attributes.height,
      borderSize = attributes.borderSize,
      borderColor = attributes.borderColor,
      container = attributes.container,
      id = attributes.id,
      classesList = attributes.classesList;
  _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].blockID(id, name, setAttributes);
  var spacerStyle = ratio ? {
    paddingTop: "".concat(ratio)
  } : {
    height: "".concat(height, "px")
  };
  return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
    title: __('Spacer Settings', 'awesome-blocks')
  }, !ratio && React.createElement(RangeControl, {
    label: __('Spacer Height', 'awesome-blocks'),
    value: height,
    onChange: function onChange(v) {
      return setAttributes({
        height: v
      });
    },
    min: 1,
    max: 1000
  }), React.createElement(SelectControl, {
    label: __('Aspect Ratio', 'awesome-blocks'),
    value: ratio,
    help: __('The aspect ratio of the spacer describes the proportional relationship between its width and its height.', 'awesome-blocks'),
    options: [{
      label: __('Empty', 'awesome-blocks'),
      Key: 'empty',
      value: ''
    }, {
      label: '15:1',
      Key: '6.6%',
      value: '6.6%'
    }, {
      label: '14:1',
      Key: '7.1%',
      value: '7.1%'
    }, {
      label: '13:1',
      Key: '7.7%',
      value: '7.7%'
    }, {
      label: '12:1',
      Key: '8.33%',
      value: '8.33%'
    }, {
      label: '11:1',
      Key: '9%',
      value: '9%'
    }, {
      label: '10:1',
      Key: '10%',
      value: '10%'
    }, {
      label: '9:1',
      Key: '11.11%',
      value: '11.11%'
    }, {
      label: '8:1',
      Key: '12.5%',
      value: '12.5%'
    }, {
      label: '7:1',
      Key: '14.28%',
      value: '14.28%'
    }, {
      label: '6:1',
      Key: '16.66%',
      value: '16.66%'
    }, {
      label: '5:1',
      Key: '20%',
      value: '20%'
    }],
    onChange: function onChange(v) {
      return setAttributes({
        ratio: v
      });
    }
  }), React.createElement(SelectControl, {
    label: __('Spacer Style', 'awesome-blocks'),
    value: style,
    options: [{
      label: __('Empty', 'awesome-blocks'),
      Key: 'empty',
      value: 'empty'
    }, {
      label: __('Solid', 'awesome-blocks'),
      Key: 'solid',
      value: 'solid'
    }, {
      label: __('Shadow Center', 'awesome-blocks'),
      Key: 'center',
      value: 'center'
    }, {
      label: __('Shadow Edges', 'awesome-blocks'),
      Key: 'duble',
      value: 'duble'
    }, {
      label: __('Shadow Right', 'awesome-blocks'),
      Key: 'right',
      value: 'right'
    }, {
      label: __('Shadow Left', 'awesome-blocks'),
      Key: 'left',
      value: 'left'
    }],
    onChange: function onChange(v) {
      return setAttributes({
        style: v
      });
    }
  }), style !== 'empty' && React.createElement(RangeControl, {
    label: __('Border size', 'awesome-blocks'),
    value: borderSize,
    onChange: function onChange(v) {
      return setAttributes({
        borderSize: v
      });
    },
    min: 0,
    max: 5
  }), React.createElement(ToggleControl, {
    label: __('Container', 'awesome-blocks'),
    checked: !!container,
    onChange: function onChange() {
      setAttributes({
        container: !container
      });
    }
  }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].BlocksOptions, {
    icon: "fa fa-cogs",
    elementID: id,
    elementStyle: ".".concat(id),
    value: {
      classesList: classesList,
      inlineStyle: true
    },
    onChange: function onChange(v) {
      return setAttributes({
        classesList: v.classesList
      });
    }
  }), style !== 'empty' && React.createElement(PanelColorSettings, {
    title: __('Color Settings', 'awesome-blocks'),
    initialOpen: false,
    colorSettings: [{
      value: borderColor,
      onChange: function onChange(v) {
        return setAttributes({
          borderColor: v
        });
      },
      label: __('Border Color', 'awesome-blocks')
    }]
  }))), React.createElement("div", {
    className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses(className, 'spacer-editor', {
      classesList: classesList
    }, id),
    style: spacerStyle
  }, style !== 'empty' && React.createElement("div", {
    className: "awesome-blocks-z-depth ".concat(style, "-shadow"),
    style: {
      height: "".concat(borderSize, "px"),
      backgroundColor: borderColor
    }
  })));
}), _defineProperty(_settings, "save", function save(_ref2) {
  var attributes = _ref2.attributes,
      className = _ref2.className;
  var style = attributes.style,
      ratio = attributes.ratio,
      height = attributes.height,
      borderSize = attributes.borderSize,
      borderColor = attributes.borderColor,
      container = attributes.container,
      id = attributes.id,
      classesList = attributes.classesList;
  var spacerStyle = ratio ? {
    paddingTop: "".concat(ratio)
  } : {
    height: "".concat(height, "px")
  };
  return React.createElement("div", {
    className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses({
      'container': container
    }, {
      classesList: classesList
    }, id),
    style: spacerStyle
  }, style !== 'empty' && React.createElement("div", {
    className: "awesome-blocks-z-depth ".concat(style, "-shadow"),
    style: {
      height: "".concat(borderSize, "px"),
      backgroundColor: borderColor
    }
  }));
}), _defineProperty(_settings, "deprecated", [{
  attributes: {
    style: {
      type: 'string',
      default: 'center'
    },
    ratio: {
      type: 'string',
      default: ''
    },
    height: {
      type: 'number',
      default: 50
    },
    container: {
      type: 'boolean',
      default: false
    },
    borderSize: {
      type: 'number',
      default: 1
    },
    borderColor: {
      type: 'string',
      default: '#DDDDDD'
    },
    id: {
      type: 'string',
      default: ''
    },
    classesList: {
      type: 'string',
      default: ''
    }
  },
  save: function save(_ref3) {
    var attributes = _ref3.attributes,
        className = _ref3.className;
    var style = attributes.style,
        ratio = attributes.ratio,
        height = attributes.height,
        borderSize = attributes.borderSize,
        borderColor = attributes.borderColor,
        container = attributes.container,
        id = attributes.id,
        classesList = attributes.classesList;
    var spacerStyle = ratio ? {
      paddingTop: "".concat(ratio)
    } : {
      height: "".concat(height, "px")
    };
    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_1__["H"].gutenClasses({
        'container': container
      }, {
        classesList: classesList
      }, id),
      style: spacerStyle
    }, style !== 'empty' && React.createElement("div", {
      className: "awesome-blocks-z-depth ".concat(style, "-shadow"),
      style: {
        height: "".concat(borderSize, "px"),
        backgroundColor: borderColor
      }
    }));
  }
}]), _settings);

/***/ }),

/***/ "./src/assets/js/blocks/stickybox/index.js":
/*!*************************************************!*\
  !*** ./src/assets/js/blocks/stickybox/index.js ***!
  \*************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _iconify_icons_flat_color_icons_external__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-flat-color-icons/external */ "./node_modules/@iconify/icons-flat-color-icons/external.js");
/* harmony import */ var _iconify_icons_flat_color_icons_external__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_flat_color_icons_external__WEBPACK_IMPORTED_MODULE_1__);
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    Fragment = _wp.element.Fragment,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    _wp$blockEditor = _wp.blockEditor,
    BlockControls = _wp$blockEditor.BlockControls,
    InspectorControls = _wp$blockEditor.InspectorControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InnerBlocks = _wp$blockEditor.InnerBlocks,
    select = _wp.data.select;
var name = 'awesome-blocks/stickybox';
var gutenClass = 'awesome-blocks-stickybox';
var settings = {
  title: __('Sticky Box', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle(_iconify_icons_flat_color_icons_external__WEBPACK_IMPORTED_MODULE_1___default.a),
  description: __('This content box will stick to the screen when you reach scroll position.', 'awesome-blocks'),
  category: 'design',
  attributes: {
    align: {
      type: 'string' // default: ''

    },
    container: {
      type: 'boolean',
      default: false
    },
    onlyFixed: {
      type: 'boolean',
      default: false
    },
    afterHeaderEnd: {
      type: 'boolean',
      default: false
    },
    showOnScrollup: {
      type: 'boolean',
      default: false
    },
    id: {
      type: 'string'
    },
    classesList: {
      type: 'string',
      default: ''
    },
    style: {
      // just for example (block preview)
      type: 'object',
      source: 'attribute',
      selector: 'a',
      attribute: 'style'
    }
  },
  supports: {
    // className: false,
    align: ['wide', 'full']
  },
  example: {
    attributes: {
      style: {
        border: '1px solid #D0D0D0',
        borderRadius: '5px',
        padding: '5px 20px'
      }
    },
    innerBlocks: [{
      name: 'core/paragraph',
      attributes: {
        customFontSize: 25,
        content: __('This content box will stick to the screen when you reach scroll position.', 'awesome-blocks'),
        align: 'center'
      }
    }, {
      name: 'awesome-blocks/button',
      attributes: {
        text: __('Button', 'awesome-blocks'),
        icon: 'fa fa-home',
        size: 2,
        style: {
          background: '#6BAFFF'
        }
      }
    }]
  },
  edit: function edit(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        className = _ref.className,
        name = _ref.name;
    var container = attributes.container,
        align = attributes.align,
        id = attributes.id,
        onlyFixed = attributes.onlyFixed,
        afterHeaderEnd = attributes.afterHeaderEnd,
        showOnScrollup = attributes.showOnScrollup,
        classesList = attributes.classesList,
        style = attributes.style; // const type = H.awesome-blocksType()

    _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
    return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
      value: align,
      onChange: function onChange(v) {
        return setAttributes({
          align: v
        });
      }
    })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
      title: __('Sticky box Settings', 'awesome-blocks')
    }, React.createElement(ToggleControl, {
      label: __('Add Container Box', 'awesome-blocks'),
      checked: !!container,
      onChange: function onChange() {
        setAttributes({
          container: !container
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Show Only Sticky', 'awesome-blocks'),
      checked: !!onlyFixed,
      onChange: function onChange() {
        setAttributes({
          onlyFixed: !onlyFixed
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Show it After Header Ends', 'awesome-blocks'),
      checked: !!afterHeaderEnd,
      onChange: function onChange() {
        setAttributes({
          afterHeaderEnd: !afterHeaderEnd
        });
      }
    }), React.createElement(ToggleControl, {
      label: __('Show it when Scroll up', 'awesome-blocks'),
      checked: !!showOnScrollup,
      onChange: function onChange() {
        setAttributes({
          showOnScrollup: !showOnScrollup
        });
      }
    }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
      elementID: id,
      elementStyle: ".".concat(id, ".stickybox-fixed"),
      value: {
        classesList: classesList,
        inlineStyle: true
      },
      onChange: function onChange(v) {
        return setAttributes({
          classesList: v.classesList
        });
      }
    }))), React.createElement("div", {
      id: id,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--add-container"), container), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--only-fixed"), onlyFixed), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--after-header-end"), afterHeaderEnd), _defineProperty(_H$gutenClasses, "".concat(gutenClass, "--show-on-scrollup"), showOnScrollup), _defineProperty(_H$gutenClasses, 'awesome-blocks-' + align, align), _H$gutenClasses), {
        classesList: classesList
      }, id, 'stickybox-fixed'),
      style: style
    }, React.createElement("div", {
      className: "stickybox-container"
    }, React.createElement(InnerBlocks, {
      templateLock: false // renderAppender={
      //   isSelected
      //     ? () => <InnerBlocks.ButtonBlockAppender />
      //     : () => <Fragment/>
      // }

    }))));
  },
  save: function save(_ref2) {
    var _H$gutenClasses2;

    var attributes = _ref2.attributes;
    var container = attributes.container,
        align = attributes.align,
        id = attributes.id,
        onlyFixed = attributes.onlyFixed,
        afterHeaderEnd = attributes.afterHeaderEnd,
        showOnScrollup = attributes.showOnScrollup,
        classesList = attributes.classesList;
    return React.createElement("div", {
      id: id,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses((_H$gutenClasses2 = {}, _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--add-container"), container), _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--only-fixed"), onlyFixed), _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--after-header-end"), afterHeaderEnd), _defineProperty(_H$gutenClasses2, "".concat(gutenClass, "--show-on-scrollup"), showOnScrollup), _defineProperty(_H$gutenClasses2, 'awesome-blocks-' + align, align), _H$gutenClasses2), {
        classesList: classesList
      }, id)
    }, React.createElement("div", {
      className: "stickybox-container"
    }, React.createElement(InnerBlocks.Content, null)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/tabs/edit-tab.js":
/*!***********************************************!*\
  !*** ./src/assets/js/blocks/tabs/edit-tab.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return DupleSideBox; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * External dependencies
 */
 // import React from 'react';

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    InspectorControls = _wp$blockEditor.InspectorControls,
    InnerBlocks = _wp$blockEditor.InnerBlocks;

var DupleSideBox =
/*#__PURE__*/
function (_Component) {
  _inherits(DupleSideBox, _Component);

  function DupleSideBox() {
    var _this;

    _classCallCheck(this, DupleSideBox);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(DupleSideBox).apply(this, arguments));
    _this.state = {
      isExpanded: false
    };
    _this.collapseExpandRef = React.createRef();
    _this.bodyRef = React.createRef();
    _this.collapseExpand = _this.collapseExpand.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(DupleSideBox, [{
    key: "collapseExpand",
    value: function collapseExpand() {
      this.setState({
        isExpanded: !this.state.isExpanded
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          name = _this$props.name;
      var title = attributes.title,
          icon = attributes.icon,
          active = attributes.active,
          alwaysactive = attributes.alwaysactive,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Tab Settings', 'awesome-blocks')
      }, React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].getPro, null), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].SelectIcon, {
        title: __('Icon', 'awesome-blocks'),
        classPlaceholder: __('Insert icon class', 'awesome-blocks'),
        fliterPlaceholder: __('Search for icon', 'awesome-blocks') // icons={ iconsList }
        ,
        value: icon,
        onSelect: function onSelect(v) {
          return setAttributes({
            icon: v
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Active', 'awesome-blocks'),
        checked: !!active,
        onChange: function onChange() {
          return setAttributes({
            active: !active
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-tabs__body', {
          'active': !!active
        }, {
          classesList: classesList
        }, id)
      }, React.createElement("div", {
        className: "awesome-blocks-tabs__header"
      }, icon && React.createElement("i", {
        className: icon
      }), React.createElement(RichText, {
        tagName: "span",
        className: "awesome-blocks-tabs__header__title",
        value: title,
        placeholder: __('Insert Tab Title', 'awesome-blocks'),
        onChange: function onChange(v) {
          return setAttributes({
            title: v
          });
        }
      }), React.createElement("i", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('collapse-expand', {
          'expanded': !!this.state.isExpanded
        }),
        onClick: this.collapseExpand,
        ref: this.collapseExpandRef
      })), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-tabs__body__content', {
          'expanded': !!this.state.isExpanded
        })
      }, React.createElement(InnerBlocks, {
        templateLock: false
      }))));
    }
  }]);

  return DupleSideBox;
}(Component);



/***/ }),

/***/ "./src/assets/js/blocks/tabs/edit.js":
/*!*******************************************!*\
  !*** ./src/assets/js/blocks/tabs/edit.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return TabsEdit; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * External dependencies
 */
 // import { isEqual } from 'lodash'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    _wp$blockEditor = _wp.blockEditor,
    InspectorControls = _wp$blockEditor.InspectorControls,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar,
    InnerBlocks = _wp$blockEditor.InnerBlocks;
var TEMPLATE = [['awesome-blocks/tabstab', {}], ['awesome-blocks/tabstab', {}], ['awesome-blocks/tabstab', {}]];
/**
 * Check if object are equals for tabs
 */

var equalObjects = function equalObjects(object, other) {
  if ('object' !== _typeof(other)) {
    other = {};
  }

  var objProps = Object.keys(object),
      objLength = objProps.length,
      othProps = Object.keys(other),
      othLength = othProps.length;
  if (objLength !== othLength) return false;
  var index = objLength;

  while (index--) {
    if (objProps[index] !== othProps[index]) return false;
    var obj1 = object[objProps[index]];
    var obj2 = other[othProps[index]];

    if (obj1.title !== obj2.title || obj1.icon !== obj2.icon || obj1.active !== obj2.active) {
      return false;
    }
  }

  return true;
};

var TabsEdit =
/*#__PURE__*/
function (_Component) {
  _inherits(TabsEdit, _Component);

  function TabsEdit() {
    var _this;

    _classCallCheck(this, TabsEdit);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(TabsEdit).apply(this, arguments));
    _this.state = {
      isFlipped: false // list: ''

    };
    return _this;
  }

  _createClass(TabsEdit, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          className = _this$props.className,
          clientId = _this$props.clientId,
          name = _this$props.name;
      var align = attributes.align,
          vertical = attributes.vertical,
          expandable = attributes.expandable,
          hideplus = attributes.hideplus,
          list = attributes.list,
          effect = attributes.effect,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);

      var getList = function getList() {
        var block = wp.data.select('core/block-editor').getBlock(clientId);
        if (!block) return;
        var listTmp = {};
        block.innerBlocks.forEach(function (b) {
          if (!b.attributes.id) return;
          listTmp[b.attributes.id] = {
            id: b.attributes.id,
            title: b.attributes.title,
            icon: b.attributes.icon,
            active: b.attributes.active
          };
        });

        if (listTmp) {
          // this.state.list = listTmp
          if (!equalObjects(listTmp, list)) {
            setAttributes({
              list: listTmp
            });
          }
        }
      };

      getList();
      return React.createElement(Fragment, null, React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Tabs Settings', 'awesome-blocks')
      }, React.createElement(AlignmentToolbar, {
        label: __('Tabs Alignment', 'awesome-blocks'),
        value: align,
        onChange: function onChange(v) {
          return setAttributes({
            align: v
          });
        }
      }), React.createElement(ToggleControl, {
        label: __('Hide Plus Icon', 'awesome-blocks'),
        checked: !!hideplus,
        onChange: function onChange() {
          return setAttributes({
            hideplus: !hideplus
          });
        }
      }), React.createElement(SelectControl, {
        label: __('Effect', 'awesome-blocks'),
        value: effect,
        options: [{
          label: __('None', 'awesome-blocks'),
          Key: 'none',
          value: ''
        }, {
          label: __('Fade', 'awesome-blocks'),
          Key: 'fade',
          value: 'fade'
        }, {
          label: __('Slide Up', 'awesome-blocks'),
          Key: 'slideup',
          value: 'slideup'
        }, {
          label: __('Swipe Up', 'awesome-blocks'),
          Key: 'swipeup',
          value: 'swipeup'
        }, {
          label: __('Swipe Left', 'awesome-blocks'),
          Key: 'swipeleft',
          value: 'swipeleft'
        }],
        onChange: function onChange(v) {
          return setAttributes({
            effect: v
          });
        }
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        elementID: id,
        elementStyle: ".".concat(id),
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        },
        lite: {
          style: true
        }
      }))), React.createElement("div", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses({
          'awesome-blocks-tabs--hideplus': hideplus
        }, {
          classesList: classesList
        }, id)
      }, React.createElement(InnerBlocks, {
        template: TEMPLATE,
        allowedBlocks: ['awesome-blocks/tabstab'],
        defaultBlock: 'awesome-blocks/tabstab',
        templateLock: false // renderAppender={ () => (
        //   <button className="bespoke-appender" type="button">
        //     <i className="fa fa-plus" />
        //   </button>
        // ) }

      })));
    }
  }]);

  return TabsEdit;
}(Component);



/***/ }),

/***/ "./src/assets/js/blocks/tabs/index.js":
/*!********************************************!*\
  !*** ./src/assets/js/blocks/tabs/index.js ***!
  \********************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _iconify_icons_noto_bookmark_tabs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-noto/bookmark-tabs */ "./node_modules/@iconify/icons-noto/bookmark-tabs.js");
/* harmony import */ var _iconify_icons_noto_bookmark_tabs__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_noto_bookmark_tabs__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/tabs/edit.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * External dependencies
 */


 // import save from './save'

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/tabs';
var attributes = {
  vertical: {
    type: 'boolean',
    default: false
  },
  align: {
    type: 'string' // default: ''

  },
  hideplus: {
    type: 'boolean',
    default: false
  },
  effect: {
    type: 'string'
  },
  list: {
    type: 'object' // source: 'attribute',
    // attribute: 'data-list',
    // selector: '.awesome-blocks-tabs__header__title',
    // default: {}

  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  }
};
var settings = {
  title: __('Tabs', 'awesome-blocks'),
  description: __('Tabs are components which separate content placed in the same wrapper but in the separate pane.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle(_iconify_icons_noto_bookmark_tabs__WEBPACK_IMPORTED_MODULE_1___default.a),
  category: 'design',
  attributes: attributes,
  example: {
    innerBlocks: [{
      name: 'awesome-blocks/tabstab',
      attributes: {
        icon: 'fa fa-home',
        title: __('Tab Title 1', 'awesome-blocks')
      }
    }, {
      name: 'awesome-blocks/tabstab',
      attributes: {
        icon: 'fa fa-tachometer-alt',
        title: __('Tab Title 2', 'awesome-blocks')
      }
    }, {
      name: 'awesome-blocks/tabstab',
      attributes: {
        icon: 'fa fa-shopping-cart',
        title: __('Tab Title 3', 'awesome-blocks')
      }
    }]
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  save: function save(props) {
    var attributes = props.attributes;
    var _props$attributes = props.attributes,
        align = _props$attributes.align,
        vertical = _props$attributes.vertical,
        expandable = _props$attributes.expandable,
        hideplus = _props$attributes.hideplus,
        effect = _props$attributes.effect,
        list = _props$attributes.list,
        id = _props$attributes.id,
        classesList = _props$attributes.classesList;
    var innerBlocks = props.innerBlocks;

    var getList = function getList() {
      if (!list) return;
      var ulClass = _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-tabs__tabs', _defineProperty({}, "awesome-blocks-tabs__tabs--".concat(align), !!align));
      return React.createElement("ul", {
        className: ulClass
      }, Object.keys(list).map(function (item, index) {
        if (list[item] && 'object' === _typeof(list[item])) {
          var active = list[item].active ? 'active' : null;
          return React.createElement("li", {
            className: active
          }, React.createElement("a", {
            href: "#".concat(item)
          }, list[item].icon && React.createElement("i", {
            className: list[item].icon
          }), list[item].title));
        }
      }));
    };

    return React.createElement("div", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(_defineProperty({
        'awesome-blocks-tabs--hideplus': !!hideplus,
        'awesome-blocks-tabs--vertical': !!vertical
      }, "awesome-blocks-tabs--".concat(effect), !!effect), {
        classesList: classesList
      }, id)
    }, getList(), React.createElement("div", {
      className: "awesome-blocks-tabs__content"
    }, React.createElement(InnerBlocks.Content, null)));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/tabs/tab.js":
/*!******************************************!*\
  !*** ./src/assets/js/blocks/tabs/tab.js ***!
  \******************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
/* harmony import */ var _iconify_icons_emojione_v1_bookmark_tabs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-emojione-v1/bookmark-tabs */ "./node_modules/@iconify/icons-emojione-v1/bookmark-tabs.js");
/* harmony import */ var _iconify_icons_emojione_v1_bookmark_tabs__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_emojione_v1_bookmark_tabs__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _edit_tab__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit-tab */ "./src/assets/js/blocks/tabs/edit-tab.js");
/**
 * External dependencies
 */



/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    InnerBlocks = _wp.blockEditor.InnerBlocks;
var name = 'awesome-blocks/tabstab';
var attributes = {
  title: {
    type: 'text',
    // source: 'children',
    // selector: '.awesome-blocks-tabs__header__title',
    default: ''
  },
  icon: {
    type: 'string',
    // source: 'attribute',
    // attribute: 'class',
    // selector: '.awesome-blocks-tabs__header i',
    default: ''
  },
  active: {
    type: 'boolean',
    default: false
  },
  // alwaysactive: {
  //   type: 'boolean',
  //   default: false
  // },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  }
};
var settings = {
  title: __('Tab', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].iconStyle(_iconify_icons_emojione_v1_bookmark_tabs__WEBPACK_IMPORTED_MODULE_1___default.a),
  // description: __('Content Box', 'awesome-blocks'),
  category: 'design',
  attributes: attributes,
  parent: ['awesome-blocks/tabs'],
  edit: _edit_tab__WEBPACK_IMPORTED_MODULE_2__["default"],
  save: function save(_ref) {
    var attributes = _ref.attributes,
        className = _ref.className;
    var title = attributes.title,
        icon = attributes.icon,
        active = attributes.active,
        alwaysactive = attributes.alwaysactive,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("div", {
      id: id,
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses('awesome-blocks-tabs__body', {
        'active': !!active
      }, {
        classesList: classesList
      }, id)
    }, React.createElement(InnerBlocks.Content, null));
  }
};

/***/ }),

/***/ "./src/assets/js/blocks/testimonial/edit.js":
/*!**************************************************!*\
  !*** ./src/assets/js/blocks/testimonial/edit.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * Edit block.
 */

/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    _wp$element = _wp.element,
    Fragment = _wp$element.Fragment,
    Component = _wp$element.Component,
    _wp$components = _wp.components,
    PanelBody = _wp$components.PanelBody,
    ToggleControl = _wp$components.ToggleControl,
    SelectControl = _wp$components.SelectControl,
    _wp$blockEditor = _wp.blockEditor,
    RichText = _wp$blockEditor.RichText,
    BlockControls = _wp$blockEditor.BlockControls,
    InspectorControls = _wp$blockEditor.InspectorControls,
    PanelColorSettings = _wp$blockEditor.PanelColorSettings,
    AlignmentToolbar = _wp$blockEditor.AlignmentToolbar;

var SeparatorBlock =
/*#__PURE__*/
function (_Component) {
  _inherits(SeparatorBlock, _Component);

  function SeparatorBlock() {
    var _this;

    _classCallCheck(this, SeparatorBlock);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(SeparatorBlock).apply(this, arguments));
    _this.onChangeContent = _this.onChangeContent.bind(_assertThisInitialized(_this));
    _this.onChangeCiteText = _this.onChangeCiteText.bind(_assertThisInitialized(_this));
    _this.toggleStars = _this.toggleStars.bind(_assertThisInitialized(_this));
    _this.setStyle = _this.setStyle.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(SeparatorBlock, [{
    key: "onChangeContent",
    value: function onChangeContent(newContent) {
      var setAttributes = this.props.setAttributes;
      setAttributes({
        contentText: newContent
      });
    }
  }, {
    key: "onChangeCiteText",
    value: function onChangeCiteText(newContent) {
      var setAttributes = this.props.setAttributes;
      setAttributes({
        citeText: newContent
      });
    }
  }, {
    key: "toggleStars",
    value: function toggleStars() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes;
      setAttributes({
        showStars: !attributes.showStars
      });
    }
  }, {
    key: "setStyle",
    value: function setStyle(value) {
      var setAttributes = this.props.setAttributes;
      setAttributes({
        testimonialStyle: value
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _H$gutenClasses;

      var _this$props2 = this.props,
          attributes = _this$props2.attributes,
          setAttributes = _this$props2.setAttributes,
          className = _this$props2.className,
          name = _this$props2.name;
      var contentText = attributes.contentText,
          align = attributes.align,
          showStars = attributes.showStars,
          testimonialStyle = attributes.testimonialStyle,
          citeText = attributes.citeText,
          placeholder = attributes.placeholder,
          textColor = attributes.textColor,
          citeColor = attributes.citeColor,
          id = attributes.id,
          classesList = attributes.classesList;
      _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].blockID(id, name, setAttributes);
      return React.createElement(Fragment, null, React.createElement(BlockControls, null, React.createElement(AlignmentToolbar, {
        value: align,
        onChange: function onChange(v) {
          return setAttributes({
            align: v
          });
        }
      })), React.createElement(InspectorControls, null, React.createElement(PanelBody, {
        title: __('Testimonial Settings', 'awesome-blocks')
      }, React.createElement(SelectControl, {
        label: __('Testimonial Style', 'awesome-blocks'),
        value: testimonialStyle,
        options: [{
          label: __('None', 'awesome-blocks'),
          Key: 'none',
          value: 'wp-block-quote'
        }, {
          label: __('Style 1', 'awesome-blocks'),
          Key: 'awesome-blocks-quote-style1',
          value: 'awesome-blocks-quote-style1'
        }],
        onChange: this.setStyle
      }), React.createElement(ToggleControl, {
        label: __('Show Stars', 'awesome-blocks'),
        checked: !!showStars,
        onChange: this.toggleStars
      }), React.createElement(_libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].BlocksOptions, {
        elementID: id,
        elementStyle: ".".concat(className, ".").concat(id),
        onChange: function onChange(v) {
          return setAttributes({
            classesList: v.classesList
          });
        },
        value: {
          classesList: classesList,
          inlineStyle: true
        },
        lite: {
          style: true,
          scroll: true,
          hover: true
        }
      })), React.createElement(PanelColorSettings, {
        title: __('Color Settings', 'awesome-blocks'),
        initialOpen: false,
        colorSettings: [{
          value: textColor,
          onChange: function onChange(v) {
            return setAttributes({
              textColor: v
            });
          },
          label: __('Text Color', 'awesome-blocks')
        }, {
          value: citeColor,
          onChange: function onChange(v) {
            return setAttributes({
              citeColor: v
            });
          },
          label: __('Cite Color', 'awesome-blocks')
        }]
      })), React.createElement("blockquote", {
        className: _libs_helper__WEBPACK_IMPORTED_MODULE_0__["H"].gutenClasses(className, (_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, testimonialStyle, testimonialStyle), _defineProperty(_H$gutenClasses, 'align-' + align, align), _H$gutenClasses), {
          classesList: classesList
        }, id)
      }, React.createElement(RichText, {
        tagName: "div",
        className: "quote",
        value: contentText,
        style: {
          color: textColor
        },
        placeholder: placeholder || __('Add testimonial text', 'awesome-blocks'),
        onChange: this.onChangeContent,
        keepPlaceholderOnFocus: true,
        allowedFormats: ['core/bold', 'core/italic', 'core/image', 'core/strikethrough', 'core/link', 'core/code']
      }), React.createElement(RichText, {
        tagName: "cite",
        value: citeText,
        style: {
          color: citeColor
        },
        placeholder: placeholder || __('Add cite text', 'awesome-blocks'),
        onChange: this.onChangeCiteText,
        keepPlaceholderOnFocus: true,
        allowedFormats: ['core/bold', 'core/italic', // 'core/image',
        'core/strikethrough', 'core/link' // 'core/code',
        ]
      }), showStars && React.createElement("div", {
        className: "awesome-blocks-rating"
      }, React.createElement("i", {
        className: "fa fa-star"
      }), React.createElement("i", {
        className: "fa fa-star"
      }), React.createElement("i", {
        className: "fa fa-star"
      }), React.createElement("i", {
        className: "fa fa-star"
      }), React.createElement("i", {
        className: "fa fa-star"
      }))));
    }
  }]);

  return SeparatorBlock;
}(Component);

/* harmony default export */ __webpack_exports__["default"] = (SeparatorBlock);

/***/ }),

/***/ "./src/assets/js/blocks/testimonial/index.js":
/*!***************************************************!*\
  !*** ./src/assets/js/blocks/testimonial/index.js ***!
  \***************************************************/
/*! exports provided: name, settings */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "name", function() { return name; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settings", function() { return settings; });
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./edit */ "./src/assets/js/blocks/testimonial/edit.js");
/* harmony import */ var _iconify_icons_whh_quote__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @iconify/icons-whh/quote */ "./node_modules/@iconify/icons-whh/quote.js");
/* harmony import */ var _iconify_icons_whh_quote__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_iconify_icons_whh_quote__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _libs_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../libs/helper */ "./src/assets/js/blocks/libs/helper.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 *  Start ExtraBlocks Separator block.
 */



/**
 * WordPress dependencies
 */

var _wp = wp,
    __ = _wp.i18n.__,
    RichText = _wp.blockEditor.RichText;
var name = 'awesome-blocks/testimonial';
var blockAttributes = {
  contentText: {
    type: 'array',
    source: 'children',
    selector: '.quote'
  },
  citeText: {
    type: 'array',
    source: 'children',
    selector: 'cite'
  },
  align: {
    type: 'string',
    default: 'left'
  },
  testimonialStyle: {
    type: 'string'
  },
  showStars: {
    type: 'boolean',
    default: false
  },
  textColor: {
    type: 'string'
  },
  citeColor: {
    type: 'string'
  },
  id: {
    type: 'string'
  },
  classesList: {
    type: 'string',
    default: ''
  }
};
var settings = {
  title: __('Testimonial', 'awesome-blocks'),
  description: __('A testimonial is often used to let people know what other people think of you or your product.', 'awesome-blocks'),
  icon: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].iconStyle(_iconify_icons_whh_quote__WEBPACK_IMPORTED_MODULE_1___default.a),
  category: 'text',
  attributes: blockAttributes,
  // styles: [
  //   { name: 'default', label: __('Regular', 'awesome-blocks'), isDefault: true },
  //   { name: 'large', label: __('Large', 'awesome-blocks') }
  // ],
  example: {
    attributes: {
      contentText: __('A testimonial is often used to let people know what other people think of you or your product.', 'awesome-blocks'),
      citeText: 'ZintaThemes',
      align: 'center',
      testimonialStyle: 'awesome-blocks-quote-style1',
      showStars: true
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_0__["default"],
  save: function save(_ref) {
    var _H$gutenClasses;

    var attributes = _ref.attributes;
    var contentText = attributes.contentText,
        align = attributes.align,
        citeText = attributes.citeText,
        showStars = attributes.showStars,
        testimonialStyle = attributes.testimonialStyle,
        citeColor = attributes.citeColor,
        textColor = attributes.textColor,
        id = attributes.id,
        classesList = attributes.classesList;
    return React.createElement("blockquote", {
      className: _libs_helper__WEBPACK_IMPORTED_MODULE_2__["H"].gutenClasses((_H$gutenClasses = {}, _defineProperty(_H$gutenClasses, testimonialStyle, testimonialStyle), _defineProperty(_H$gutenClasses, 'align-' + align, align), _H$gutenClasses), {
        classesList: classesList
      }, id)
    }, React.createElement(RichText.Content, {
      tagName: "div",
      className: "quote",
      value: contentText,
      style: {
        color: textColor
      }
    }), React.createElement(RichText.Content, {
      tagName: "cite",
      value: citeText,
      style: {
        color: citeColor
      }
    }), showStars && React.createElement("div", {
      className: "awesome-blocks-rating"
    }, React.createElement("i", {
      className: "fa fa-star"
    }), React.createElement("i", {
      className: "fa fa-star"
    }), React.createElement("i", {
      className: "fa fa-star"
    }), React.createElement("i", {
      className: "fa fa-star"
    }), React.createElement("i", {
      className: "fa fa-star"
    })));
  }
};

/***/ })

/******/ });
//# sourceMappingURL=awesome-blocks.bundle-lite.js.map
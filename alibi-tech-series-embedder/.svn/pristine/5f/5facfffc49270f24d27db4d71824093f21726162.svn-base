/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./js/alibi-tech-widget-lib.js":
/*!*************************************!*\
  !*** ./js/alibi-tech-widget-lib.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _node_modules_alibi_tech_widget_lib_build_module_widget_lib_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../node_modules/@alibi-tech/widget-lib/build/module/widget-lib.js */ \"./node_modules/@alibi-tech/widget-lib/build/module/widget-lib.js\");\n\n\nconst DEBUG = false;\n\nlet size;\nconst post = alibi_tech_widget_lib_ajax_object.post;\nconst content = post.post_content.split(\" \");\n\nconst findHost = (content) => {\n  const hostFilter = content.filter(data => /host/.test(data));\n  if (hostFilter.length != 0) {\n    const host = hostFilter[0].replace(\"host=\", \"\").replace(/\\\"/g, \"\");\n    const hostUrl = new URL(host);\n    return hostUrl.origin;\n  }\n  else return \"\";\n}\n\nconst findSeriesId = (content) => {\n  const seriesFilter = content.filter(data => /series_id/.test(data));\n  if (seriesFilter.length != 0) {\n    const seriesId = seriesFilter[0].match(/(\\d)+/g)[0];\n    return seriesId;\n  }\n  else return \"\";\n}\n\nconst host = findHost(content);\nDEBUG && console.log('host', host);\n\nconst seriesId = findSeriesId(content);\nDEBUG && console.log('seriesId', seriesId);\n\nconst series = `${host}/series-embed/${seriesId}/`;\nDEBUG && console.log('series', series);\n\n(function ($) {\n  'use strict';\n\n  const handler = (event) => {\n    DEBUG && console.log('event', event);\n    const widgetMessage = _node_modules_alibi_tech_widget_lib_build_module_widget_lib_js__WEBPACK_IMPORTED_MODULE_0__.WidgetLib.widgetMessage(host, event);\n    DEBUG && console.log('widgetMessage', widgetMessage);\n\n    if (widgetMessage) {\n      switch (widgetMessage.messageType) {\n        case 'resize':\n          if (widgetMessage.newSize) {\n            DEBUG && console.log('size', widgetMessage.newSize);\n            size = widgetMessage.newSize;\n          } else {\n            console.error(`Expected event to have newSize`, { event, widgetMessage });\n          }\n          break;\n      }\n      DEBUG && console.log('Data : ', { widgetMessage, event, series });\n    }\n\n    if (size === 'filmStripAndPlayer') {\n      $(`#${alibi_tech_widget_lib_ajax_object.id}`).addClass('alibiTechWidgetFilmStripAndPlayer').removeClass('alibiTechWidgetFilmStrip');\n\n    }\n    else {\n      $(`#${alibi_tech_widget_lib_ajax_object.id}`).addClass('alibiTechWidgetFilmStrip').removeClass('alibiTechWidgetFilmStripAndPlayer');\n    }\n  }\n  window.addEventListener('message', handler);\n})(jQuery);\n\n\n\n\n//# sourceURL=webpack://alibi-tech-series-embed/./js/alibi-tech-widget-lib.js?");

/***/ }),

/***/ "./node_modules/@alibi-tech/widget-lib/build/module/widget-lib.js":
/*!************************************************************************!*\
  !*** ./node_modules/@alibi-tech/widget-lib/build/module/widget-lib.js ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"WidgetLib\": () => (/* binding */ WidgetLib)\n/* harmony export */ });\nconst SIGNATURE = 'alibi-tech-message';\nconst DEBUG = false;\nclass WidgetLib {\n    static sendParent(payload) {\n        if (window.parent) {\n            DEBUG && console.log(`WidgetLib.sendParent`, payload);\n            window.parent.postMessage(payload, '*');\n        }\n        else {\n            DEBUG && console.log(`WidgetLib.sendParent skipped - no parent`, payload);\n        }\n    }\n    static setSize(size) {\n        WidgetLib.sendParent({ SIGNATURE, messageType: 'resize', newSize: size });\n    }\n    static widgetMessage(origin, event) {\n        DEBUG &&\n            console.log(`WidgetLib.isWidgetMessage `, {\n                origin,\n                event,\n                s: event.data['SIGNATURE'],\n                SIGNATURE,\n            });\n        return event.origin === origin && event.data['SIGNATURE'] === SIGNATURE ? event.data : undefined;\n    }\n}\n//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoid2lkZ2V0LWxpYi5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbIi4uLy4uL3NyYy93aWRnZXQtbGliLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUdBLE1BQU0sU0FBUyxHQUFHLG9CQUFvQixDQUFDO0FBUXZDLE1BQU0sS0FBSyxHQUFHLEtBQUssQ0FBQztBQUVwQixNQUFNLE9BQU8sU0FBUztJQUNaLE1BQU0sQ0FBQyxVQUFVLENBQUMsT0FBNkI7UUFDckQsSUFBSSxNQUFNLENBQUMsTUFBTSxFQUFFO1lBQ2pCLEtBQUssSUFBSSxPQUFPLENBQUMsR0FBRyxDQUFDLHNCQUFzQixFQUFFLE9BQU8sQ0FBQyxDQUFDO1lBQ3RELE1BQU0sQ0FBQyxNQUFNLENBQUMsV0FBVyxDQUFDLE9BQU8sRUFBRSxHQUFHLENBQUMsQ0FBQztTQUN6QzthQUFNO1lBQ0wsS0FBSyxJQUFJLE9BQU8sQ0FBQyxHQUFHLENBQUMsMENBQTBDLEVBQUUsT0FBTyxDQUFDLENBQUM7U0FDM0U7SUFDSCxDQUFDO0lBQ00sTUFBTSxDQUFDLE9BQU8sQ0FBQyxJQUFnQjtRQUNwQyxTQUFTLENBQUMsVUFBVSxDQUFDLEVBQUUsU0FBUyxFQUFFLFdBQVcsRUFBRSxRQUFRLEVBQUUsT0FBTyxFQUFFLElBQUksRUFBRSxDQUFDLENBQUM7SUFDNUUsQ0FBQztJQUVNLE1BQU0sQ0FBQyxhQUFhLENBQUMsTUFBYyxFQUFFLEtBQW1CO1FBQzdELEtBQUs7WUFDSCxPQUFPLENBQUMsR0FBRyxDQUFDLDRCQUE0QixFQUFFO2dCQUN4QyxNQUFNO2dCQUNOLEtBQUs7Z0JBQ0wsQ0FBQyxFQUFFLEtBQUssQ0FBQyxJQUFJLENBQUMsV0FBVyxDQUFDO2dCQUMxQixTQUFTO2FBQ1YsQ0FBQyxDQUFDO1FBQ0wsT0FBTyxLQUFLLENBQUMsTUFBTSxLQUFLLE1BQU0sSUFBSSxLQUFLLENBQUMsSUFBSSxDQUFDLFdBQVcsQ0FBQyxLQUFLLFNBQVMsQ0FBQyxDQUFDLENBQUMsS0FBSyxDQUFDLElBQUksQ0FBQyxDQUFDLENBQUMsU0FBUyxDQUFDO0lBQ25HLENBQUM7Q0FDRiJ9\n\n//# sourceURL=webpack://alibi-tech-series-embed/./node_modules/@alibi-tech/widget-lib/build/module/widget-lib.js?");

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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./js/alibi-tech-widget-lib.js");
/******/ 	
/******/ })()
;
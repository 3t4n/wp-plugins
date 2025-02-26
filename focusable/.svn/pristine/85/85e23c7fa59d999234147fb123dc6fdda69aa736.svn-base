/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/js/main.js":
/*!*******************************!*\
  !*** ./assets/src/js/main.js ***!
  \*******************************/
/***/ (() => {

function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Focusable = /*#__PURE__*/function () {
  function Focusable() {
    _classCallCheck(this, Focusable);

    if (!ally.hasOwnProperty("style") || !ally.hasOwnProperty("query")) {
      return;
    }

    this.focusSource = ally.style.focusSource();
    this.focusableElements = ally.query.focusable();
    this.activeElement = ally.event.activeElement();
    this.activeElementBoundingRect = {
      left: 0,
      top: 0,
      width: 0,
      height: 0
    };
    this.focusRingElement = document.createElement("span");
    this.settings = focusableData.settings;
    this.ringColor = window.getComputedStyle(document.body, null).getPropertyValue("color");
    this.mountElement();
    this.addClasses();
    this.addAttributes();
    this.addEvents();
  }

  _createClass(Focusable, [{
    key: "mountElement",
    value: function mountElement() {
      var mountToElement = document.body;
      var footer = document.querySelector("footer");

      if (footer) {
        mountToElement = footer;
      }

      mountToElement.insertAdjacentElement("beforeend", this.focusRingElement);
    }
  }, {
    key: "addClasses",
    value: function addClasses() {
      this.focusRingElement.classList.add("focusable__ring");

      var _iterator = _createForOfIteratorHelper(this.focusableElements),
          _step;

      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var element = _step.value;
          element.classList.add("focusable");
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
    }
  }, {
    key: "addAttributes",
    value: function addAttributes() {
      this.focusRingElement.setAttribute("data-focusable-transition", this.settings.transition);
    }
  }, {
    key: "addEvents",
    value: function addEvents() {
      var _this = this;

      document.addEventListener("active-element", function (event) {
        if (_this.focusSource.used("key") === false) {
          return;
        }

        _this.activeElement = event.detail.focus;

        _this.updateRingStyle();
      }, false);
      document.addEventListener("scroll", function () {
        if (_this.focusSource.used("key") === false) {
          return;
        }

        _this.updateRingPosition();
      });
    }
  }, {
    key: "updateRingStyle",
    value: function updateRingStyle() {
      if (!this.isElement(this.activeElement)) {
        return;
      }

      this.activeElementBoundingRect = this.activeElement.getBoundingClientRect();
      this.updateRingColor(this.activeElement, "color");
      var style = {
        transform: "translate(".concat(this.activeElementBoundingRect.left, "px, ").concat(this.activeElementBoundingRect.top, "px)"),
        width: this.activeElementBoundingRect.width + "px",
        height: this.activeElementBoundingRect.height + "px",
        outlineColor: this.ringColor
      };
      this.applyStyle(style);
    }
  }, {
    key: "updateRingColor",
    value: function updateRingColor(element, property) {
      if (!this.isElement(element)) {
        return;
      }

      if (!this.isElement(element.parentElement)) {
        return;
      }

      var color = window.getComputedStyle(element.parentElement, null).getPropertyValue(property);

      if (color === "rgba(0, 0, 0, 0)" && element !== document.body) {
        this.updateRingColor(element.parentElement, "color");
      } else {
        this.ringColor = color;
      }

      return;
    }
  }, {
    key: "updateRingPosition",
    value: function updateRingPosition() {
      if (!this.isElement(this.activeElement)) {
        return;
      }

      this.activeElementBoundingRect = this.activeElement.getBoundingClientRect();
      var style = {
        transform: "translate(".concat(this.activeElementBoundingRect.left, "px, ").concat(this.activeElementBoundingRect.top, "px)")
      };
      this.applyStyle(style);
    }
  }, {
    key: "applyStyle",
    value: function applyStyle(style) {
      for (var property in style) {
        if (Object.hasOwnProperty.call(style, property)) {
          var value = style[property];
          this.focusRingElement.style[property] = value;
        }
      }
    }
  }, {
    key: "isElement",
    value: function isElement(element) {
      return element instanceof Element || element instanceof HTMLDocument;
    }
  }]);

  return Focusable;
}();

if (typeof jQuery === "function") {
  jQuery(document).ready(function () {
    new Focusable();
  });
} else {
  document.addEventListener("DOMContentLoaded", function () {
    new Focusable();
  });
}

/***/ }),

/***/ "./assets/src/sass/style.scss":
/*!************************************!*\
  !*** ./assets/src/sass/style.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					result = fn();
/******/ 				}
/******/ 			}
/******/ 			return result;
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/main": 0,
/******/ 			"css/style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) var result = runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkfocusable"] = self["webpackChunkfocusable"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./assets/src/js/main.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./assets/src/sass/style.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@wordpress/escape-html/build-module/escape-greater.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/escape-html/build-module/escape-greater.js ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ __unstableEscapeGreaterThan)
/* harmony export */ });
/**
 * Returns a string with greater-than sign replaced.
 *
 * Note that if a resolution for Trac#45387 comes to fruition, it is no longer
 * necessary for `__unstableEscapeGreaterThan` to exist.
 *
 * See: https://core.trac.wordpress.org/ticket/45387
 *
 * @param {string} value Original string.
 *
 * @return {string} Escaped string.
 */
function __unstableEscapeGreaterThan(value) {
  return value.replace(/>/g, '&gt;');
}

/***/ }),

/***/ "./node_modules/@wordpress/escape-html/build-module/index.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/escape-html/build-module/index.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   escapeAmpersand: () => (/* binding */ escapeAmpersand),
/* harmony export */   escapeAttribute: () => (/* binding */ escapeAttribute),
/* harmony export */   escapeEditableHTML: () => (/* binding */ escapeEditableHTML),
/* harmony export */   escapeHTML: () => (/* binding */ escapeHTML),
/* harmony export */   escapeLessThan: () => (/* binding */ escapeLessThan),
/* harmony export */   escapeQuotationMark: () => (/* binding */ escapeQuotationMark),
/* harmony export */   isValidAttributeName: () => (/* binding */ isValidAttributeName)
/* harmony export */ });
/* harmony import */ var _escape_greater__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./escape-greater */ "./node_modules/@wordpress/escape-html/build-module/escape-greater.js");
/**
 * Internal dependencies
 */


/**
 * Regular expression matching invalid attribute names.
 *
 * "Attribute names must consist of one or more characters other than controls,
 * U+0020 SPACE, U+0022 ("), U+0027 ('), U+003E (>), U+002F (/), U+003D (=),
 * and noncharacters."
 *
 * @see https://html.spec.whatwg.org/multipage/syntax.html#attributes-2
 *
 * @type {RegExp}
 */
const REGEXP_INVALID_ATTRIBUTE_NAME = /[\u007F-\u009F "'>/="\uFDD0-\uFDEF]/;

/**
 * Returns a string with ampersands escaped. Note that this is an imperfect
 * implementation, where only ampersands which do not appear as a pattern of
 * named, decimal, or hexadecimal character references are escaped. Invalid
 * named references (i.e. ambiguous ampersand) are still permitted.
 *
 * @see https://w3c.github.io/html/syntax.html#character-references
 * @see https://w3c.github.io/html/syntax.html#ambiguous-ampersand
 * @see https://w3c.github.io/html/syntax.html#named-character-references
 *
 * @param {string} value Original string.
 *
 * @return {string} Escaped string.
 */
function escapeAmpersand(value) {
  return value.replace(/&(?!([a-z0-9]+|#[0-9]+|#x[a-f0-9]+);)/gi, '&amp;');
}

/**
 * Returns a string with quotation marks replaced.
 *
 * @param {string} value Original string.
 *
 * @return {string} Escaped string.
 */
function escapeQuotationMark(value) {
  return value.replace(/"/g, '&quot;');
}

/**
 * Returns a string with less-than sign replaced.
 *
 * @param {string} value Original string.
 *
 * @return {string} Escaped string.
 */
function escapeLessThan(value) {
  return value.replace(/</g, '&lt;');
}

/**
 * Returns an escaped attribute value.
 *
 * @see https://w3c.github.io/html/syntax.html#elements-attributes
 *
 * "[...] the text cannot contain an ambiguous ampersand [...] must not contain
 * any literal U+0022 QUOTATION MARK characters (")"
 *
 * Note we also escape the greater than symbol, as this is used by wptexturize to
 * split HTML strings. This is a WordPress specific fix
 *
 * Note that if a resolution for Trac#45387 comes to fruition, it is no longer
 * necessary for `__unstableEscapeGreaterThan` to be used.
 *
 * See: https://core.trac.wordpress.org/ticket/45387
 *
 * @param {string} value Attribute value.
 *
 * @return {string} Escaped attribute value.
 */
function escapeAttribute(value) {
  return (0,_escape_greater__WEBPACK_IMPORTED_MODULE_0__["default"])(escapeQuotationMark(escapeAmpersand(value)));
}

/**
 * Returns an escaped HTML element value.
 *
 * @see https://w3c.github.io/html/syntax.html#writing-html-documents-elements
 *
 * "the text must not contain the character U+003C LESS-THAN SIGN (<) or an
 * ambiguous ampersand."
 *
 * @param {string} value Element value.
 *
 * @return {string} Escaped HTML element value.
 */
function escapeHTML(value) {
  return escapeLessThan(escapeAmpersand(value));
}

/**
 * Returns an escaped Editable HTML element value. This is different from
 * `escapeHTML`, because for editable HTML, ALL ampersands must be escaped in
 * order to render the content correctly on the page.
 *
 * @param {string} value Element value.
 *
 * @return {string} Escaped HTML element value.
 */
function escapeEditableHTML(value) {
  return escapeLessThan(value.replace(/&/g, '&amp;'));
}

/**
 * Returns true if the given attribute name is valid, or false otherwise.
 *
 * @param {string} name Attribute name to test.
 *
 * @return {boolean} Whether attribute is valid.
 */
function isValidAttributeName(name) {
  return !REGEXP_INVALID_ATTRIBUTE_NAME.test(name);
}

/***/ }),

/***/ "./src/js/tournamatch.js":
/*!*******************************!*\
  !*** ./src/js/tournamatch.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   trn: () => (/* binding */ trn)
/* harmony export */ });


function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Tournamatch = /*#__PURE__*/function () {
  function Tournamatch() {
    _classCallCheck(this, Tournamatch);
    this.events = {};
  }
  return _createClass(Tournamatch, [{
    key: "param",
    value: function param(object, prefix) {
      var str = [];
      for (var prop in object) {
        if (object.hasOwnProperty(prop)) {
          var k = prefix ? prefix + "[" + prop + "]" : prop;
          var v = object[prop];
          str.push(v !== null && _typeof(v) === "object" ? this.param(v, k) : encodeURIComponent(k) + "=" + encodeURIComponent(v));
        }
      }
      return str.join("&");
    }
  }, {
    key: "event",
    value: function event(eventName) {
      if (!(eventName in this.events)) {
        this.events[eventName] = new EventTarget(eventName);
      }
      return this.events[eventName];
    }
  }, {
    key: "autocomplete",
    value: function autocomplete(input, dataCallback) {
      new Tournamatch_Autocomplete(input, dataCallback);
    }
  }, {
    key: "ucfirst",
    value: function ucfirst(s) {
      if (typeof s !== 'string') return '';
      return s.charAt(0).toUpperCase() + s.slice(1);
    }
  }, {
    key: "ordinal_suffix",
    value: function ordinal_suffix(number) {
      var remainder = number % 100;
      if (remainder < 11 || remainder > 13) {
        switch (remainder % 10) {
          case 1:
            return 'st';
          case 2:
            return 'nd';
          case 3:
            return 'rd';
        }
      }
      return 'th';
    }
  }, {
    key: "tabs",
    value: function tabs(element) {
      var tabs = element.getElementsByClassName('trn-nav-link');
      var panes = document.getElementsByClassName('trn-tab-pane');
      var clearActive = function clearActive() {
        Array.prototype.forEach.call(tabs, function (tab) {
          tab.classList.remove('trn-nav-active');
          tab.ariaSelected = false;
        });
        Array.prototype.forEach.call(panes, function (pane) {
          return pane.classList.remove('trn-tab-active');
        });
      };
      var setActive = function setActive(targetId) {
        var targetTab = document.querySelector('a[href="#' + targetId + '"].trn-nav-link');
        var targetPaneId = targetTab && targetTab.dataset && targetTab.dataset.target || false;
        if (targetPaneId) {
          clearActive();
          targetTab.classList.add('trn-nav-active');
          targetTab.ariaSelected = true;
          document.getElementById(targetPaneId).classList.add('trn-tab-active');
        }
      };
      var tabClick = function tabClick(event) {
        var targetTab = event.currentTarget;
        var targetPaneId = targetTab && targetTab.dataset && targetTab.dataset.target || false;
        if (targetPaneId) {
          setActive(targetPaneId);
          event.preventDefault();
        }
      };
      Array.prototype.forEach.call(tabs, function (tab) {
        tab.addEventListener('click', tabClick);
      });
      if (location.hash) {
        setActive(location.hash.substr(1));
      } else if (tabs.length > 0) {
        setActive(tabs[0].dataset.target);
      }
    }
  }]);
}(); //trn.initialize();
if (!window.trn_obj_instance) {
  window.trn_obj_instance = new Tournamatch();
  window.addEventListener('load', function () {
    var tabViews = document.getElementsByClassName('trn-nav');
    Array.from(tabViews).forEach(function (tab) {
      trn.tabs(tab);
    });
    var dropdowns = document.getElementsByClassName('trn-dropdown-toggle');
    var handleDropdownClose = function handleDropdownClose() {
      Array.from(dropdowns).forEach(function (dropdown) {
        dropdown.nextElementSibling.classList.remove('trn-show');
      });
      document.removeEventListener("click", handleDropdownClose, false);
    };
    Array.from(dropdowns).forEach(function (dropdown) {
      dropdown.addEventListener('click', function (e) {
        e.stopPropagation();
        this.nextElementSibling.classList.add('trn-show');
        document.addEventListener("click", handleDropdownClose, false);
      }, false);
    });
  }, false);
}
var trn = window.trn_obj_instance;
var Tournamatch_Autocomplete = /*#__PURE__*/function () {
  // currentFocus;
  //
  // nameInput;
  //
  // self;

  function Tournamatch_Autocomplete(input, dataCallback) {
    var _this = this;
    _classCallCheck(this, Tournamatch_Autocomplete);
    // this.self = this;
    this.nameInput = input;
    this.nameInput.addEventListener("input", function () {
      var a,
        b,
        i,
        val = _this.nameInput.value; //this.value;
      var parent = _this.nameInput.parentNode; //this.parentNode;

      // let p = new Promise((resolve, reject) => {
      //     /* need to query server for names here. */
      //     let xhr = new XMLHttpRequest();
      //     xhr.open('GET', options.api_url + 'players/?search=' + val + '&per_page=5');
      //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      //     xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
      //     xhr.onload = function () {
      //         if (xhr.status === 200) {
      //             // resolve(JSON.parse(xhr.response).map((player) => {return { 'value': player.id, 'text': player.name };}));
      //             resolve(JSON.parse(xhr.response).map((player) => {return player.name;}));
      //         } else {
      //             reject();
      //         }
      //     };
      //     xhr.send();
      // });
      dataCallback(val).then(function (data) {
        //p.then((data) => {
        console.log(data);

        /*close any already open lists of auto-completed values*/
        _this.closeAllLists();
        if (!val) {
          return false;
        }
        _this.currentFocus = -1;

        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", _this.nameInput.id + "-auto-complete-list");
        a.setAttribute("class", "trn-auto-complete-items");

        /*append the DIV element as a child of the auto-complete container:*/
        parent.appendChild(a);

        /*for each item in the array...*/
        for (i = 0; i < data.length; i++) {
          var text = void 0,
            value = void 0;

          /* Which format did they give us. */
          if (_typeof(data[i]) === 'object') {
            text = data[i]['text'];
            value = data[i]['value'];
          } else {
            text = data[i];
            value = data[i];
          }

          /*check if the item starts with the same letters as the text field value:*/
          if (text.substr(0, val.length).toUpperCase() === val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + text.substr(0, val.length) + "</strong>";
            b.innerHTML += text.substr(val.length);

            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + value + "'>";
            b.dataset.value = value;
            b.dataset.text = text;

            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function (e) {
              console.log("item clicked with value ".concat(e.currentTarget.dataset.value));

              /* insert the value for the autocomplete text field: */
              _this.nameInput.value = e.currentTarget.dataset.text;
              _this.nameInput.dataset.selectedId = e.currentTarget.dataset.value;

              /* close the list of autocompleted values, (or any other open lists of autocompleted values:*/
              _this.closeAllLists();
              _this.nameInput.dispatchEvent(new Event('change'));
            });
            a.appendChild(b);
          }
        }
      });
    });

    /*execute a function presses a key on the keyboard:*/
    this.nameInput.addEventListener("keydown", function (e) {
      var x = document.getElementById(_this.nameInput.id + "-auto-complete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode === 40) {
        /*If the arrow DOWN key is pressed,
         increase the currentFocus variable:*/
        _this.currentFocus++;
        /*and and make the current item more visible:*/
        _this.addActive(x);
      } else if (e.keyCode === 38) {
        //up
        /*If the arrow UP key is pressed,
         decrease the currentFocus variable:*/
        _this.currentFocus--;
        /*and and make the current item more visible:*/
        _this.addActive(x);
      } else if (e.keyCode === 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (_this.currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[_this.currentFocus].click();
        }
      }
    });

    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
      _this.closeAllLists(e.target);
    });
  }
  return _createClass(Tournamatch_Autocomplete, [{
    key: "addActive",
    value: function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      this.removeActive(x);
      if (this.currentFocus >= x.length) this.currentFocus = 0;
      if (this.currentFocus < 0) this.currentFocus = x.length - 1;
      /*add class "autocomplete-active":*/
      x[this.currentFocus].classList.add("trn-auto-complete-active");
    }
  }, {
    key: "removeActive",
    value: function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("trn-auto-complete-active");
      }
    }
  }, {
    key: "closeAllLists",
    value: function closeAllLists(element) {
      console.log("close all lists");
      /*close all autocomplete lists in the document,
       except the one passed as an argument:*/
      var x = document.getElementsByClassName("trn-auto-complete-items");
      for (var i = 0; i < x.length; i++) {
        if (element !== x[i] && element !== this.nameInput) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
  }]);
}(); // First, checks if it isn't implemented yet.
if (!String.prototype.format) {
  String.prototype.format = function () {
    var args = arguments;
    return this.replace(/{(\d+)}/g, function (match, number) {
      return typeof args[number] !== 'undefined' ? args[number] : match;
    });
  };
}

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
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!********************************!*\
  !*** ./src/js/delete-match.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
/**
 * Handles the click event for deleting a match.
 *
 * @link       https://www.tournamatch.com
 * @since      3.11.0
 *
 * @package    Tournamatch
 *
 */


(function ($) {
  'use strict';

  window.addEventListener('load', function () {
    var options = trn_delete_match_options;
    var targets = document.getElementsByClassName('trn-delete-match-action');
    Array.prototype.forEach.call(targets, function (target) {
      target.addEventListener('trn.confirmed.action.delete-match', function (event) {
        event.preventDefault();
        console.log("modal was confirmed for link ".concat(target.dataset.matchId));
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', "".concat(options.api_url, "matches/").concat(target.dataset.matchId));
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
        xhr.onload = function () {
          if (xhr.status === 204) {
            $.event('match').dispatchEvent(new Event('deleted'));
          } else {
            var response = JSON.parse(xhr.response);
            document.getElementById('trn-delete-match-response').innerHTML = "<div class=\"trn-alert trn-alert-danger\"><strong>".concat(options.language.failure, "</strong>: ").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(response.message), "</div>");
          }
        };
        xhr.send();
      });
    }, false);
  }, false);
})(_tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QyxDQUFDO1FBQ3pFSixHQUFHLENBQUNJLGdCQUFnQixDQUFDLFlBQVksRUFBRVIsT0FBTyxDQUFDUyxVQUFVLENBQUM7UUFDdERMLEdBQUcsQ0FBQ00sTUFBTSxHQUFHLFlBQVk7VUFDckIsSUFBSU4sR0FBRyxDQUFDTyxNQUFNLEtBQUssR0FBRyxFQUFFO1lBQ3BCWixDQUFDLENBQUN4RixLQUFLLENBQUMsT0FBTyxDQUFDLENBQUMyRSxhQUFhLENBQUMsSUFBSUMsS0FBSyxDQUFDLFNBQVMsQ0FBQyxDQUFDO1VBQ3hELENBQUMsTUFBTTtZQUNILElBQUl5QixRQUFRLEdBQUdDLElBQUksQ0FBQ0MsS0FBSyxDQUFDVixHQUFHLENBQUNRLFFBQVEsQ0FBQztZQUN2Q2xGLFFBQVEsQ0FBQ2lCLGNBQWMsQ0FBQywyQkFBMkIsQ0FBQyxDQUFDb0MsU0FBUyx3REFBQUMsTUFBQSxDQUFzRGdCLE9BQU8sQ0FBQ2UsUUFBUSxDQUFDQyxPQUFPLGlCQUFBaEMsTUFBQSxDQUFjeEgsa0VBQVUsQ0FBQ29KLFFBQVEsQ0FBQ0ssT0FBTyxDQUFDLFdBQVE7VUFDbE07UUFDSixDQUFDO1FBRURiLEdBQUcsQ0FBQ2MsSUFBSSxDQUFDLENBQUM7TUFDZCxDQUFDLENBQUM7SUFDTixDQUFDLEVBQUUsS0FBSyxDQUFDO0VBQ2IsQ0FBQyxFQUFFLEtBQUssQ0FBQztBQUNiLENBQUMsRUFBRTNELGdEQUFHLENBQUMsQyIsInNvdXJjZXMiOlsid2VicGFjazovL3RvdXJuYW1hdGNoL0B3b3JkcHJlc3MvZXNjYXBlLWh0bWwvc3JjL2VzY2FwZS1ncmVhdGVyLmpzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL0B3b3JkcHJlc3MvZXNjYXBlLWh0bWwvc3JjL2luZGV4LmpzIiwid2VicGFjazovL3RvdXJuYW1hdGNoLy4vc3JjL2pzL3RvdXJuYW1hdGNoLmpzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svYm9vdHN0cmFwIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9kZWZpbmUgcHJvcGVydHkgZ2V0dGVycyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvaGFzT3duUHJvcGVydHkgc2hvcnRoYW5kIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9tYWtlIG5hbWVzcGFjZSBvYmplY3QiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvLi9zcmMvanMvZGVsZXRlLW1hdGNoLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGdyZWF0ZXItdGhhbiBzaWduIHJlcGxhY2VkLlxuICpcbiAqIE5vdGUgdGhhdCBpZiBhIHJlc29sdXRpb24gZm9yIFRyYWMjNDUzODcgY29tZXMgdG8gZnJ1aXRpb24sIGl0IGlzIG5vIGxvbmdlclxuICogbmVjZXNzYXJ5IGZvciBgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuYCB0byBleGlzdC5cbiAqXG4gKiBTZWU6IGh0dHBzOi8vY29yZS50cmFjLndvcmRwcmVzcy5vcmcvdGlja2V0LzQ1Mzg3XG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4oIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLz4vZywgJyZndDsnICk7XG59XG4iLCIvKipcbiAqIEludGVybmFsIGRlcGVuZGVuY2llc1xuICovXG5pbXBvcnQgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuIGZyb20gJy4vZXNjYXBlLWdyZWF0ZXInO1xuXG4vKipcbiAqIFJlZ3VsYXIgZXhwcmVzc2lvbiBtYXRjaGluZyBpbnZhbGlkIGF0dHJpYnV0ZSBuYW1lcy5cbiAqXG4gKiBcIkF0dHJpYnV0ZSBuYW1lcyBtdXN0IGNvbnNpc3Qgb2Ygb25lIG9yIG1vcmUgY2hhcmFjdGVycyBvdGhlciB0aGFuIGNvbnRyb2xzLFxuICogVSswMDIwIFNQQUNFLCBVKzAwMjIgKFwiKSwgVSswMDI3ICgnKSwgVSswMDNFICg+KSwgVSswMDJGICgvKSwgVSswMDNEICg9KSxcbiAqIGFuZCBub25jaGFyYWN0ZXJzLlwiXG4gKlxuICogQHNlZSBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS9zeW50YXguaHRtbCNhdHRyaWJ1dGVzLTJcbiAqXG4gKiBAdHlwZSB7UmVnRXhwfVxuICovXG5jb25zdCBSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRSA9IC9bXFx1MDA3Ri1cXHUwMDlGIFwiJz4vPVwiXFx1RkREMC1cXHVGREVGXS87XG5cbi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGFtcGVyc2FuZHMgZXNjYXBlZC4gTm90ZSB0aGF0IHRoaXMgaXMgYW4gaW1wZXJmZWN0XG4gKiBpbXBsZW1lbnRhdGlvbiwgd2hlcmUgb25seSBhbXBlcnNhbmRzIHdoaWNoIGRvIG5vdCBhcHBlYXIgYXMgYSBwYXR0ZXJuIG9mXG4gKiBuYW1lZCwgZGVjaW1hbCwgb3IgaGV4YWRlY2ltYWwgY2hhcmFjdGVyIHJlZmVyZW5jZXMgYXJlIGVzY2FwZWQuIEludmFsaWRcbiAqIG5hbWVkIHJlZmVyZW5jZXMgKGkuZS4gYW1iaWd1b3VzIGFtcGVyc2FuZCkgYXJlIHN0aWxsIHBlcm1pdHRlZC5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2NoYXJhY3Rlci1yZWZlcmVuY2VzXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2FtYmlndW91cy1hbXBlcnNhbmRcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjbmFtZWQtY2hhcmFjdGVyLXJlZmVyZW5jZXNcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVBbXBlcnNhbmQoIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLyYoPyEoW2EtejAtOV0rfCNbMC05XSt8I3hbYS1mMC05XSspOykvZ2ksICcmYW1wOycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggcXVvdGF0aW9uIG1hcmtzIHJlcGxhY2VkLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZVF1b3RhdGlvbk1hcmsoIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggL1wiL2csICcmcXVvdDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGxlc3MtdGhhbiBzaWduIHJlcGxhY2VkLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUxlc3NUaGFuKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC88L2csICcmbHQ7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYW4gZXNjYXBlZCBhdHRyaWJ1dGUgdmFsdWUuXG4gKlxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNlbGVtZW50cy1hdHRyaWJ1dGVzXG4gKlxuICogXCJbLi4uXSB0aGUgdGV4dCBjYW5ub3QgY29udGFpbiBhbiBhbWJpZ3VvdXMgYW1wZXJzYW5kIFsuLi5dIG11c3Qgbm90IGNvbnRhaW5cbiAqIGFueSBsaXRlcmFsIFUrMDAyMiBRVU9UQVRJT04gTUFSSyBjaGFyYWN0ZXJzIChcIilcIlxuICpcbiAqIE5vdGUgd2UgYWxzbyBlc2NhcGUgdGhlIGdyZWF0ZXIgdGhhbiBzeW1ib2wsIGFzIHRoaXMgaXMgdXNlZCBieSB3cHRleHR1cml6ZSB0b1xuICogc3BsaXQgSFRNTCBzdHJpbmdzLiBUaGlzIGlzIGEgV29yZFByZXNzIHNwZWNpZmljIGZpeFxuICpcbiAqIE5vdGUgdGhhdCBpZiBhIHJlc29sdXRpb24gZm9yIFRyYWMjNDUzODcgY29tZXMgdG8gZnJ1aXRpb24sIGl0IGlzIG5vIGxvbmdlclxuICogbmVjZXNzYXJ5IGZvciBgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuYCB0byBiZSB1c2VkLlxuICpcbiAqIFNlZTogaHR0cHM6Ly9jb3JlLnRyYWMud29yZHByZXNzLm9yZy90aWNrZXQvNDUzODdcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgQXR0cmlidXRlIHZhbHVlLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBhdHRyaWJ1dGUgdmFsdWUuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVBdHRyaWJ1dGUoIHZhbHVlICkge1xuXHRyZXR1cm4gX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuKFxuXHRcdGVzY2FwZVF1b3RhdGlvbk1hcmsoIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSApXG5cdCk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI3dyaXRpbmctaHRtbC1kb2N1bWVudHMtZWxlbWVudHNcbiAqXG4gKiBcInRoZSB0ZXh0IG11c3Qgbm90IGNvbnRhaW4gdGhlIGNoYXJhY3RlciBVKzAwM0MgTEVTUy1USEFOIFNJR04gKDwpIG9yIGFuXG4gKiBhbWJpZ3VvdXMgYW1wZXJzYW5kLlwiXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUhUTUwoIHZhbHVlICkge1xuXHRyZXR1cm4gZXNjYXBlTGVzc1RoYW4oIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYW4gZXNjYXBlZCBFZGl0YWJsZSBIVE1MIGVsZW1lbnQgdmFsdWUuIFRoaXMgaXMgZGlmZmVyZW50IGZyb21cbiAqIGBlc2NhcGVIVE1MYCwgYmVjYXVzZSBmb3IgZWRpdGFibGUgSFRNTCwgQUxMIGFtcGVyc2FuZHMgbXVzdCBiZSBlc2NhcGVkIGluXG4gKiBvcmRlciB0byByZW5kZXIgdGhlIGNvbnRlbnQgY29ycmVjdGx5IG9uIHRoZSBwYWdlLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBFbGVtZW50IHZhbHVlLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBIVE1MIGVsZW1lbnQgdmFsdWUuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVFZGl0YWJsZUhUTUwoIHZhbHVlICkge1xuXHRyZXR1cm4gZXNjYXBlTGVzc1RoYW4oIHZhbHVlLnJlcGxhY2UoIC8mL2csICcmYW1wOycgKSApO1xufVxuXG4vKipcbiAqIFJldHVybnMgdHJ1ZSBpZiB0aGUgZ2l2ZW4gYXR0cmlidXRlIG5hbWUgaXMgdmFsaWQsIG9yIGZhbHNlIG90aGVyd2lzZS5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gbmFtZSBBdHRyaWJ1dGUgbmFtZSB0byB0ZXN0LlxuICpcbiAqIEByZXR1cm4ge2Jvb2xlYW59IFdoZXRoZXIgYXR0cmlidXRlIGlzIHZhbGlkLlxuICovXG5leHBvcnQgZnVuY3Rpb24gaXNWYWxpZEF0dHJpYnV0ZU5hbWUoIG5hbWUgKSB7XG5cdHJldHVybiAhIFJFR0VYUF9JTlZBTElEX0FUVFJJQlVURV9OQU1FLnRlc3QoIG5hbWUgKTtcbn1cbiIsIid1c2Ugc3RyaWN0JztcclxuY2xhc3MgVG91cm5hbWF0Y2gge1xyXG5cclxuICAgIGNvbnN0cnVjdG9yKCkge1xyXG4gICAgICAgIHRoaXMuZXZlbnRzID0ge307XHJcbiAgICB9XHJcblxyXG4gICAgcGFyYW0ob2JqZWN0LCBwcmVmaXgpIHtcclxuICAgICAgICBsZXQgc3RyID0gW107XHJcbiAgICAgICAgZm9yIChsZXQgcHJvcCBpbiBvYmplY3QpIHtcclxuICAgICAgICAgICAgaWYgKG9iamVjdC5oYXNPd25Qcm9wZXJ0eShwcm9wKSkge1xyXG4gICAgICAgICAgICAgICAgbGV0IGsgPSBwcmVmaXggPyBwcmVmaXggKyBcIltcIiArIHByb3AgKyBcIl1cIiA6IHByb3A7XHJcbiAgICAgICAgICAgICAgICBsZXQgdiA9IG9iamVjdFtwcm9wXTtcclxuICAgICAgICAgICAgICAgIHN0ci5wdXNoKCh2ICE9PSBudWxsICYmIHR5cGVvZiB2ID09PSBcIm9iamVjdFwiKSA/IHRoaXMucGFyYW0odiwgaykgOiBlbmNvZGVVUklDb21wb25lbnQoaykgKyBcIj1cIiArIGVuY29kZVVSSUNvbXBvbmVudCh2KSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuIHN0ci5qb2luKFwiJlwiKTtcclxuICAgIH1cclxuXHJcbiAgICBldmVudChldmVudE5hbWUpIHtcclxuICAgICAgICBpZiAoIShldmVudE5hbWUgaW4gdGhpcy5ldmVudHMpKSB7XHJcbiAgICAgICAgICAgIHRoaXMuZXZlbnRzW2V2ZW50TmFtZV0gPSBuZXcgRXZlbnRUYXJnZXQoZXZlbnROYW1lKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuIHRoaXMuZXZlbnRzW2V2ZW50TmFtZV07XHJcbiAgICB9XHJcblxyXG4gICAgYXV0b2NvbXBsZXRlKGlucHV0LCBkYXRhQ2FsbGJhY2spIHtcclxuICAgICAgICBuZXcgVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlKGlucHV0LCBkYXRhQ2FsbGJhY2spO1xyXG4gICAgfVxyXG5cclxuICAgIHVjZmlyc3Qocykge1xyXG4gICAgICAgIGlmICh0eXBlb2YgcyAhPT0gJ3N0cmluZycpIHJldHVybiAnJztcclxuICAgICAgICByZXR1cm4gcy5jaGFyQXQoMCkudG9VcHBlckNhc2UoKSArIHMuc2xpY2UoMSk7XHJcbiAgICB9XHJcblxyXG4gICAgb3JkaW5hbF9zdWZmaXgobnVtYmVyKSB7XHJcbiAgICAgICAgY29uc3QgcmVtYWluZGVyID0gbnVtYmVyICUgMTAwO1xyXG5cclxuICAgICAgICBpZiAoKHJlbWFpbmRlciA8IDExKSB8fCAocmVtYWluZGVyID4gMTMpKSB7XHJcbiAgICAgICAgICAgIHN3aXRjaCAocmVtYWluZGVyICUgMTApIHtcclxuICAgICAgICAgICAgICAgIGNhc2UgMTogcmV0dXJuICdzdCc7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDI6IHJldHVybiAnbmQnO1xyXG4gICAgICAgICAgICAgICAgY2FzZSAzOiByZXR1cm4gJ3JkJztcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gJ3RoJztcclxuICAgIH1cclxuXHJcbiAgICB0YWJzKGVsZW1lbnQpIHtcclxuICAgICAgICBjb25zdCB0YWJzID0gZWxlbWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tbmF2LWxpbmsnKTtcclxuICAgICAgICBjb25zdCBwYW5lcyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi10YWItcGFuZScpO1xyXG4gICAgICAgIGNvbnN0IGNsZWFyQWN0aXZlID0gKCkgPT4ge1xyXG4gICAgICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhYnMsICh0YWIpID0+IHtcclxuICAgICAgICAgICAgICAgIHRhYi5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tbmF2LWFjdGl2ZScpO1xyXG4gICAgICAgICAgICAgICAgdGFiLmFyaWFTZWxlY3RlZCA9IGZhbHNlO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChwYW5lcywgcGFuZSA9PiBwYW5lLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi10YWItYWN0aXZlJykpO1xyXG4gICAgICAgIH07XHJcbiAgICAgICAgY29uc3Qgc2V0QWN0aXZlID0gKHRhcmdldElkKSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFRhYiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ2FbaHJlZj1cIiMnICsgdGFyZ2V0SWQgKyAnXCJdLnRybi1uYXYtbGluaycpO1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRQYW5lSWQgPSB0YXJnZXRUYWIgJiYgdGFyZ2V0VGFiLmRhdGFzZXQgJiYgdGFyZ2V0VGFiLmRhdGFzZXQudGFyZ2V0IHx8IGZhbHNlO1xyXG5cclxuICAgICAgICAgICAgaWYgKHRhcmdldFBhbmVJZCkge1xyXG4gICAgICAgICAgICAgICAgY2xlYXJBY3RpdmUoKTtcclxuICAgICAgICAgICAgICAgIHRhcmdldFRhYi5jbGFzc0xpc3QuYWRkKCd0cm4tbmF2LWFjdGl2ZScpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0VGFiLmFyaWFTZWxlY3RlZCA9IHRydWU7XHJcblxyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQodGFyZ2V0UGFuZUlkKS5jbGFzc0xpc3QuYWRkKCd0cm4tdGFiLWFjdGl2ZScpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuICAgICAgICBjb25zdCB0YWJDbGljayA9IChldmVudCkgPT4ge1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRUYWIgPSBldmVudC5jdXJyZW50VGFyZ2V0O1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRQYW5lSWQgPSB0YXJnZXRUYWIgJiYgdGFyZ2V0VGFiLmRhdGFzZXQgJiYgdGFyZ2V0VGFiLmRhdGFzZXQudGFyZ2V0IHx8IGZhbHNlO1xyXG5cclxuICAgICAgICAgICAgaWYgKHRhcmdldFBhbmVJZCkge1xyXG4gICAgICAgICAgICAgICAgc2V0QWN0aXZlKHRhcmdldFBhbmVJZCk7XHJcbiAgICAgICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbCh0YWJzLCAodGFiKSA9PiB7XHJcbiAgICAgICAgICAgIHRhYi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHRhYkNsaWNrKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgaWYgKGxvY2F0aW9uLmhhc2gpIHtcclxuICAgICAgICAgICAgc2V0QWN0aXZlKGxvY2F0aW9uLmhhc2guc3Vic3RyKDEpKTtcclxuICAgICAgICB9IGVsc2UgaWYgKHRhYnMubGVuZ3RoID4gMCkge1xyXG4gICAgICAgICAgICBzZXRBY3RpdmUodGFic1swXS5kYXRhc2V0LnRhcmdldCk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxufVxyXG5cclxuLy90cm4uaW5pdGlhbGl6ZSgpO1xyXG5pZiAoIXdpbmRvdy50cm5fb2JqX2luc3RhbmNlKSB7XHJcbiAgICB3aW5kb3cudHJuX29ial9pbnN0YW5jZSA9IG5ldyBUb3VybmFtYXRjaCgpO1xyXG5cclxuICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKCkge1xyXG5cclxuICAgICAgICBjb25zdCB0YWJWaWV3cyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1uYXYnKTtcclxuXHJcbiAgICAgICAgQXJyYXkuZnJvbSh0YWJWaWV3cykuZm9yRWFjaCgodGFiKSA9PiB7XHJcbiAgICAgICAgICAgIHRybi50YWJzKHRhYik7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGNvbnN0IGRyb3Bkb3ducyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1kcm9wZG93bi10b2dnbGUnKTtcclxuICAgICAgICBjb25zdCBoYW5kbGVEcm9wZG93bkNsb3NlID0gKCkgPT4ge1xyXG4gICAgICAgICAgICBBcnJheS5mcm9tKGRyb3Bkb3ducykuZm9yRWFjaCgoZHJvcGRvd24pID0+IHtcclxuICAgICAgICAgICAgICAgIGRyb3Bkb3duLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tc2hvdycpO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgZG9jdW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhhbmRsZURyb3Bkb3duQ2xvc2UsIGZhbHNlKTtcclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICBBcnJheS5mcm9tKGRyb3Bkb3ducykuZm9yRWFjaCgoZHJvcGRvd24pID0+IHtcclxuICAgICAgICAgICAgZHJvcGRvd24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgICAgICAgICAgICAgdGhpcy5uZXh0RWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LmFkZCgndHJuLXNob3cnKTtcclxuICAgICAgICAgICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBoYW5kbGVEcm9wZG93bkNsb3NlLCBmYWxzZSk7XHJcbiAgICAgICAgICAgIH0sIGZhbHNlKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICB9LCBmYWxzZSk7XHJcbn1cclxuZXhwb3J0IGxldCB0cm4gPSB3aW5kb3cudHJuX29ial9pbnN0YW5jZTtcclxuXHJcbmNsYXNzIFRvdXJuYW1hdGNoX0F1dG9jb21wbGV0ZSB7XHJcblxyXG4gICAgLy8gY3VycmVudEZvY3VzO1xyXG4gICAgLy9cclxuICAgIC8vIG5hbWVJbnB1dDtcclxuICAgIC8vXHJcbiAgICAvLyBzZWxmO1xyXG5cclxuICAgIGNvbnN0cnVjdG9yKGlucHV0LCBkYXRhQ2FsbGJhY2spIHtcclxuICAgICAgICAvLyB0aGlzLnNlbGYgPSB0aGlzO1xyXG4gICAgICAgIHRoaXMubmFtZUlucHV0ID0gaW5wdXQ7XHJcblxyXG4gICAgICAgIHRoaXMubmFtZUlucHV0LmFkZEV2ZW50TGlzdGVuZXIoXCJpbnB1dFwiLCAoKSA9PiB7XHJcbiAgICAgICAgICAgIGxldCBhLCBiLCBpLCB2YWwgPSB0aGlzLm5hbWVJbnB1dC52YWx1ZTsvL3RoaXMudmFsdWU7XHJcbiAgICAgICAgICAgIGxldCBwYXJlbnQgPSB0aGlzLm5hbWVJbnB1dC5wYXJlbnROb2RlOy8vdGhpcy5wYXJlbnROb2RlO1xyXG5cclxuICAgICAgICAgICAgLy8gbGV0IHAgPSBuZXcgUHJvbWlzZSgocmVzb2x2ZSwgcmVqZWN0KSA9PiB7XHJcbiAgICAgICAgICAgIC8vICAgICAvKiBuZWVkIHRvIHF1ZXJ5IHNlcnZlciBmb3IgbmFtZXMgaGVyZS4gKi9cclxuICAgICAgICAgICAgLy8gICAgIGxldCB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5vcGVuKCdHRVQnLCBvcHRpb25zLmFwaV91cmwgKyAncGxheWVycy8/c2VhcmNoPScgKyB2YWwgKyAnJnBlcl9wYWdlPTUnKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdDb250ZW50LVR5cGUnLCAnYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkJyk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1XUC1Ob25jZScsIG9wdGlvbnMucmVzdF9ub25jZSk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIub25sb2FkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDApIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgLy8gcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4geyAndmFsdWUnOiBwbGF5ZXIuaWQsICd0ZXh0JzogcGxheWVyLm5hbWUgfTt9KSk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJlc29sdmUoSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpLm1hcCgocGxheWVyKSA9PiB7cmV0dXJuIHBsYXllci5uYW1lO30pKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICByZWplY3QoKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICB9XHJcbiAgICAgICAgICAgIC8vICAgICB9O1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNlbmQoKTtcclxuICAgICAgICAgICAgLy8gfSk7XHJcbiAgICAgICAgICAgIGRhdGFDYWxsYmFjayh2YWwpLnRoZW4oKGRhdGEpID0+IHsvL3AudGhlbigoZGF0YSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XHJcblxyXG4gICAgICAgICAgICAgICAgLypjbG9zZSBhbnkgYWxyZWFkeSBvcGVuIGxpc3RzIG9mIGF1dG8tY29tcGxldGVkIHZhbHVlcyovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoKTtcclxuICAgICAgICAgICAgICAgIGlmICghdmFsKSB7IHJldHVybiBmYWxzZTt9XHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cyA9IC0xO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qY3JlYXRlIGEgRElWIGVsZW1lbnQgdGhhdCB3aWxsIGNvbnRhaW4gdGhlIGl0ZW1zICh2YWx1ZXMpOiovXHJcbiAgICAgICAgICAgICAgICBhID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcIkRJVlwiKTtcclxuICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiaWRcIiwgdGhpcy5uYW1lSW5wdXQuaWQgKyBcIi1hdXRvLWNvbXBsZXRlLWxpc3RcIik7XHJcbiAgICAgICAgICAgICAgICBhLnNldEF0dHJpYnV0ZShcImNsYXNzXCIsIFwidHJuLWF1dG8tY29tcGxldGUtaXRlbXNcIik7XHJcblxyXG4gICAgICAgICAgICAgICAgLyphcHBlbmQgdGhlIERJViBlbGVtZW50IGFzIGEgY2hpbGQgb2YgdGhlIGF1dG8tY29tcGxldGUgY29udGFpbmVyOiovXHJcbiAgICAgICAgICAgICAgICBwYXJlbnQuYXBwZW5kQ2hpbGQoYSk7XHJcblxyXG4gICAgICAgICAgICAgICAgLypmb3IgZWFjaCBpdGVtIGluIHRoZSBhcnJheS4uLiovXHJcbiAgICAgICAgICAgICAgICBmb3IgKGkgPSAwOyBpIDwgZGF0YS5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCB0ZXh0LCB2YWx1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLyogV2hpY2ggZm9ybWF0IGRpZCB0aGV5IGdpdmUgdXMuICovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHR5cGVvZiBkYXRhW2ldID09PSAnb2JqZWN0Jykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0ID0gZGF0YVtpXVsndGV4dCddO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IGRhdGFbaV1bJ3ZhbHVlJ107XHJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dCA9IGRhdGFbaV07XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8qY2hlY2sgaWYgdGhlIGl0ZW0gc3RhcnRzIHdpdGggdGhlIHNhbWUgbGV0dGVycyBhcyB0aGUgdGV4dCBmaWVsZCB2YWx1ZToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh0ZXh0LnN1YnN0cigwLCB2YWwubGVuZ3RoKS50b1VwcGVyQ2FzZSgpID09PSB2YWwudG9VcHBlckNhc2UoKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmNyZWF0ZSBhIERJViBlbGVtZW50IGZvciBlYWNoIG1hdGNoaW5nIGVsZW1lbnQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJESVZcIik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qbWFrZSB0aGUgbWF0Y2hpbmcgbGV0dGVycyBib2xkOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MID0gXCI8c3Ryb25nPlwiICsgdGV4dC5zdWJzdHIoMCwgdmFsLmxlbmd0aCkgKyBcIjwvc3Ryb25nPlwiO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCArPSB0ZXh0LnN1YnN0cih2YWwubGVuZ3RoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qaW5zZXJ0IGEgaW5wdXQgZmllbGQgdGhhdCB3aWxsIGhvbGQgdGhlIGN1cnJlbnQgYXJyYXkgaXRlbSdzIHZhbHVlOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IFwiPGlucHV0IHR5cGU9J2hpZGRlbicgdmFsdWU9J1wiICsgdmFsdWUgKyBcIic+XCI7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudmFsdWUgPSB2YWx1ZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5kYXRhc2V0LnRleHQgPSB0ZXh0O1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gd2hlbiBzb21lb25lIGNsaWNrcyBvbiB0aGUgaXRlbSB2YWx1ZSAoRElWIGVsZW1lbnQpOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhgaXRlbSBjbGlja2VkIHdpdGggdmFsdWUgJHtlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC52YWx1ZX1gKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvKiBpbnNlcnQgdGhlIHZhbHVlIGZvciB0aGUgYXV0b2NvbXBsZXRlIHRleHQgZmllbGQ6ICovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC52YWx1ZSA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0LnRleHQ7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC5kYXRhc2V0LnNlbGVjdGVkSWQgPSBlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC52YWx1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvKiBjbG9zZSB0aGUgbGlzdCBvZiBhdXRvY29tcGxldGVkIHZhbHVlcywgKG9yIGFueSBvdGhlciBvcGVuIGxpc3RzIG9mIGF1dG9jb21wbGV0ZWQgdmFsdWVzOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC5kaXNwYXRjaEV2ZW50KG5ldyBFdmVudCgnY2hhbmdlJykpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYS5hcHBlbmRDaGlsZChiKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiBwcmVzc2VzIGEga2V5IG9uIHRoZSBrZXlib2FyZDoqL1xyXG4gICAgICAgIHRoaXMubmFtZUlucHV0LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXlkb3duXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQodGhpcy5uYW1lSW5wdXQuaWQgKyBcIi1hdXRvLWNvbXBsZXRlLWxpc3RcIik7XHJcbiAgICAgICAgICAgIGlmICh4KSB4ID0geC5nZXRFbGVtZW50c0J5VGFnTmFtZShcImRpdlwiKTtcclxuICAgICAgICAgICAgaWYgKGUua2V5Q29kZSA9PT0gNDApIHtcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIGFycm93IERPV04ga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgaW5jcmVhc2UgdGhlIGN1cnJlbnRGb2N1cyB2YXJpYWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMrKztcclxuICAgICAgICAgICAgICAgIC8qYW5kIGFuZCBtYWtlIHRoZSBjdXJyZW50IGl0ZW0gbW9yZSB2aXNpYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT09IDM4KSB7IC8vdXBcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIGFycm93IFVQIGtleSBpcyBwcmVzc2VkLFxyXG4gICAgICAgICAgICAgICAgIGRlY3JlYXNlIHRoZSBjdXJyZW50Rm9jdXMgdmFyaWFibGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzLS07XHJcbiAgICAgICAgICAgICAgICAvKmFuZCBhbmQgbWFrZSB0aGUgY3VycmVudCBpdGVtIG1vcmUgdmlzaWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5hZGRBY3RpdmUoeCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09PSAxMykge1xyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgRU5URVIga2V5IGlzIHByZXNzZWQsIHByZXZlbnQgdGhlIGZvcm0gZnJvbSBiZWluZyBzdWJtaXR0ZWQsKi9cclxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA+IC0xKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgLyphbmQgc2ltdWxhdGUgYSBjbGljayBvbiB0aGUgXCJhY3RpdmVcIiBpdGVtOiovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHgpIHhbdGhpcy5jdXJyZW50Rm9jdXNdLmNsaWNrKCk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gd2hlbiBzb21lb25lIGNsaWNrcyBpbiB0aGUgZG9jdW1lbnQ6Ki9cclxuICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKGUudGFyZ2V0KTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICBhZGRBY3RpdmUoeCkge1xyXG4gICAgICAgIC8qYSBmdW5jdGlvbiB0byBjbGFzc2lmeSBhbiBpdGVtIGFzIFwiYWN0aXZlXCI6Ki9cclxuICAgICAgICBpZiAoIXgpIHJldHVybiBmYWxzZTtcclxuICAgICAgICAvKnN0YXJ0IGJ5IHJlbW92aW5nIHRoZSBcImFjdGl2ZVwiIGNsYXNzIG9uIGFsbCBpdGVtczoqL1xyXG4gICAgICAgIHRoaXMucmVtb3ZlQWN0aXZlKHgpO1xyXG4gICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA+PSB4Lmxlbmd0aCkgdGhpcy5jdXJyZW50Rm9jdXMgPSAwO1xyXG4gICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA8IDApIHRoaXMuY3VycmVudEZvY3VzID0gKHgubGVuZ3RoIC0gMSk7XHJcbiAgICAgICAgLyphZGQgY2xhc3MgXCJhdXRvY29tcGxldGUtYWN0aXZlXCI6Ki9cclxuICAgICAgICB4W3RoaXMuY3VycmVudEZvY3VzXS5jbGFzc0xpc3QuYWRkKFwidHJuLWF1dG8tY29tcGxldGUtYWN0aXZlXCIpO1xyXG4gICAgfVxyXG5cclxuICAgIHJlbW92ZUFjdGl2ZSh4KSB7XHJcbiAgICAgICAgLyphIGZ1bmN0aW9uIHRvIHJlbW92ZSB0aGUgXCJhY3RpdmVcIiBjbGFzcyBmcm9tIGFsbCBhdXRvY29tcGxldGUgaXRlbXM6Ki9cclxuICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IHgubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgeFtpXS5jbGFzc0xpc3QucmVtb3ZlKFwidHJuLWF1dG8tY29tcGxldGUtYWN0aXZlXCIpO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbiAgICBjbG9zZUFsbExpc3RzKGVsZW1lbnQpIHtcclxuICAgICAgICBjb25zb2xlLmxvZyhcImNsb3NlIGFsbCBsaXN0c1wiKTtcclxuICAgICAgICAvKmNsb3NlIGFsbCBhdXRvY29tcGxldGUgbGlzdHMgaW4gdGhlIGRvY3VtZW50LFxyXG4gICAgICAgICBleGNlcHQgdGhlIG9uZSBwYXNzZWQgYXMgYW4gYXJndW1lbnQ6Ki9cclxuICAgICAgICBsZXQgeCA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoXCJ0cm4tYXV0by1jb21wbGV0ZS1pdGVtc1wiKTtcclxuICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IHgubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgaWYgKGVsZW1lbnQgIT09IHhbaV0gJiYgZWxlbWVudCAhPT0gdGhpcy5uYW1lSW5wdXQpIHtcclxuICAgICAgICAgICAgICAgIHhbaV0ucGFyZW50Tm9kZS5yZW1vdmVDaGlsZCh4W2ldKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgIH1cclxufVxyXG5cclxuLy8gRmlyc3QsIGNoZWNrcyBpZiBpdCBpc24ndCBpbXBsZW1lbnRlZCB5ZXQuXHJcbmlmICghU3RyaW5nLnByb3RvdHlwZS5mb3JtYXQpIHtcclxuICAgIFN0cmluZy5wcm90b3R5cGUuZm9ybWF0ID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgY29uc3QgYXJncyA9IGFyZ3VtZW50cztcclxuICAgICAgICByZXR1cm4gdGhpcy5yZXBsYWNlKC97KFxcZCspfS9nLCBmdW5jdGlvbihtYXRjaCwgbnVtYmVyKSB7XHJcbiAgICAgICAgICAgIHJldHVybiB0eXBlb2YgYXJnc1tudW1iZXJdICE9PSAndW5kZWZpbmVkJ1xyXG4gICAgICAgICAgICAgICAgPyBhcmdzW251bWJlcl1cclxuICAgICAgICAgICAgICAgIDogbWF0Y2hcclxuICAgICAgICAgICAgICAgIDtcclxuICAgICAgICB9KTtcclxuICAgIH07XHJcbn0iLCIvLyBUaGUgbW9kdWxlIGNhY2hlXG52YXIgX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fID0ge307XG5cbi8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG5mdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuXHR2YXIgY2FjaGVkTW9kdWxlID0gX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fW21vZHVsZUlkXTtcblx0aWYgKGNhY2hlZE1vZHVsZSAhPT0gdW5kZWZpbmVkKSB7XG5cdFx0cmV0dXJuIGNhY2hlZE1vZHVsZS5leHBvcnRzO1xuXHR9XG5cdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG5cdHZhciBtb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdID0ge1xuXHRcdC8vIG5vIG1vZHVsZS5pZCBuZWVkZWRcblx0XHQvLyBubyBtb2R1bGUubG9hZGVkIG5lZWRlZFxuXHRcdGV4cG9ydHM6IHt9XG5cdH07XG5cblx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG5cdF9fd2VicGFja19tb2R1bGVzX19bbW9kdWxlSWRdKG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG5cdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG5cdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbn1cblxuIiwiLy8gZGVmaW5lIGdldHRlciBmdW5jdGlvbnMgZm9yIGhhcm1vbnkgZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5kID0gKGV4cG9ydHMsIGRlZmluaXRpb24pID0+IHtcblx0Zm9yKHZhciBrZXkgaW4gZGVmaW5pdGlvbikge1xuXHRcdGlmKF9fd2VicGFja19yZXF1aXJlX18ubyhkZWZpbml0aW9uLCBrZXkpICYmICFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywga2V5KSkge1xuXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIGtleSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGRlZmluaXRpb25ba2V5XSB9KTtcblx0XHR9XG5cdH1cbn07IiwiX193ZWJwYWNrX3JlcXVpcmVfXy5vID0gKG9iaiwgcHJvcCkgPT4gKE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmosIHByb3ApKSIsIi8vIGRlZmluZSBfX2VzTW9kdWxlIG9uIGV4cG9ydHNcbl9fd2VicGFja19yZXF1aXJlX18uciA9IChleHBvcnRzKSA9PiB7XG5cdGlmKHR5cGVvZiBTeW1ib2wgIT09ICd1bmRlZmluZWQnICYmIFN5bWJvbC50b1N0cmluZ1RhZykge1xuXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBTeW1ib2wudG9TdHJpbmdUYWcsIHsgdmFsdWU6ICdNb2R1bGUnIH0pO1xuXHR9XG5cdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCAnX19lc01vZHVsZScsIHsgdmFsdWU6IHRydWUgfSk7XG59OyIsIi8qKlxyXG4gKiBIYW5kbGVzIHRoZSBjbGljayBldmVudCBmb3IgZGVsZXRpbmcgYSBtYXRjaC5cclxuICpcclxuICogQGxpbmsgICAgICAgaHR0cHM6Ly93d3cudG91cm5hbWF0Y2guY29tXHJcbiAqIEBzaW5jZSAgICAgIDMuMTEuMFxyXG4gKlxyXG4gKiBAcGFja2FnZSAgICBUb3VybmFtYXRjaFxyXG4gKlxyXG4gKi9cclxuaW1wb3J0IHsgdHJuIH0gZnJvbSAnLi90b3VybmFtYXRjaC5qcyc7XHJcbmltcG9ydCB7IGVzY2FwZUhUTUwgfSBmcm9tICdAd29yZHByZXNzL2VzY2FwZS1odG1sJztcclxuXHJcbihmdW5jdGlvbiAoJCkge1xyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGxldCBvcHRpb25zID0gdHJuX2RlbGV0ZV9tYXRjaF9vcHRpb25zO1xyXG5cclxuICAgICAgICBsZXQgdGFyZ2V0cyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1kZWxldGUtbWF0Y2gtYWN0aW9uJyk7XHJcbiAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbCh0YXJnZXRzLCBmdW5jdGlvbiAodGFyZ2V0KSB7XHJcbiAgICAgICAgICAgIHRhcmdldC5hZGRFdmVudExpc3RlbmVyKCd0cm4uY29uZmlybWVkLmFjdGlvbi5kZWxldGUtbWF0Y2gnLCBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coYG1vZGFsIHdhcyBjb25maXJtZWQgZm9yIGxpbmsgJHt0YXJnZXQuZGF0YXNldC5tYXRjaElkfWApO1xyXG4gICAgICAgICAgICAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAgICAgeGhyLm9wZW4oJ0RFTEVURScsIGAke29wdGlvbnMuYXBpX3VybH1tYXRjaGVzLyR7dGFyZ2V0LmRhdGFzZXQubWF0Y2hJZH1gKTtcclxuICAgICAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdDb250ZW50LVR5cGUnLCAnYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkJyk7XHJcbiAgICAgICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1XUC1Ob25jZScsIG9wdGlvbnMucmVzdF9ub25jZSk7XHJcbiAgICAgICAgICAgICAgICB4aHIub25sb2FkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJC5ldmVudCgnbWF0Y2gnKS5kaXNwYXRjaEV2ZW50KG5ldyBFdmVudCgnZGVsZXRlZCcpKTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBsZXQgcmVzcG9uc2UgPSBKU09OLnBhcnNlKHhoci5yZXNwb25zZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tZGVsZXRlLW1hdGNoLXJlc3BvbnNlJykuaW5uZXJIVE1MID0gYDxkaXYgY2xhc3M9XCJ0cm4tYWxlcnQgdHJuLWFsZXJ0LWRhbmdlclwiPjxzdHJvbmc+JHtvcHRpb25zLmxhbmd1YWdlLmZhaWx1cmV9PC9zdHJvbmc+OiAke2VzY2FwZUhUTUwocmVzcG9uc2UubWVzc2FnZSl9PC9kaXY+YDtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgICAgIHhoci5zZW5kKCk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0sIGZhbHNlKTtcclxuICAgIH0sIGZhbHNlKTtcclxufSkodHJuKTsiXSwibmFtZXMiOlsiX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuIiwidmFsdWUiLCJyZXBsYWNlIiwiUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUiLCJlc2NhcGVBbXBlcnNhbmQiLCJlc2NhcGVRdW90YXRpb25NYXJrIiwiZXNjYXBlTGVzc1RoYW4iLCJlc2NhcGVBdHRyaWJ1dGUiLCJlc2NhcGVIVE1MIiwiZXNjYXBlRWRpdGFibGVIVE1MIiwiaXNWYWxpZEF0dHJpYnV0ZU5hbWUiLCJuYW1lIiwidGVzdCIsIl90eXBlb2YiLCJvIiwiU3ltYm9sIiwiaXRlcmF0b3IiLCJjb25zdHJ1Y3RvciIsInByb3RvdHlwZSIsIl9jbGFzc0NhbGxDaGVjayIsImEiLCJuIiwiVHlwZUVycm9yIiwiX2RlZmluZVByb3BlcnRpZXMiLCJlIiwiciIsInQiLCJsZW5ndGgiLCJlbnVtZXJhYmxlIiwiY29uZmlndXJhYmxlIiwid3JpdGFibGUiLCJPYmplY3QiLCJkZWZpbmVQcm9wZXJ0eSIsIl90b1Byb3BlcnR5S2V5Iiwia2V5IiwiX2NyZWF0ZUNsYXNzIiwiaSIsIl90b1ByaW1pdGl2ZSIsInRvUHJpbWl0aXZlIiwiY2FsbCIsIlN0cmluZyIsIk51bWJlciIsIlRvdXJuYW1hdGNoIiwiZXZlbnRzIiwicGFyYW0iLCJvYmplY3QiLCJwcmVmaXgiLCJzdHIiLCJwcm9wIiwiaGFzT3duUHJvcGVydHkiLCJrIiwidiIsInB1c2giLCJlbmNvZGVVUklDb21wb25lbnQiLCJqb2luIiwiZXZlbnQiLCJldmVudE5hbWUiLCJFdmVudFRhcmdldCIsImF1dG9jb21wbGV0ZSIsImlucHV0IiwiZGF0YUNhbGxiYWNrIiwiVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlIiwidWNmaXJzdCIsInMiLCJjaGFyQXQiLCJ0b1VwcGVyQ2FzZSIsInNsaWNlIiwib3JkaW5hbF9zdWZmaXgiLCJudW1iZXIiLCJyZW1haW5kZXIiLCJ0YWJzIiwiZWxlbWVudCIsImdldEVsZW1lbnRzQnlDbGFzc05hbWUiLCJwYW5lcyIsImRvY3VtZW50IiwiY2xlYXJBY3RpdmUiLCJBcnJheSIsImZvckVhY2giLCJ0YWIiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJhcmlhU2VsZWN0ZWQiLCJwYW5lIiwic2V0QWN0aXZlIiwidGFyZ2V0SWQiLCJ0YXJnZXRUYWIiLCJxdWVyeVNlbGVjdG9yIiwidGFyZ2V0UGFuZUlkIiwiZGF0YXNldCIsInRhcmdldCIsImFkZCIsImdldEVsZW1lbnRCeUlkIiwidGFiQ2xpY2siLCJjdXJyZW50VGFyZ2V0IiwicHJldmVudERlZmF1bHQiLCJhZGRFdmVudExpc3RlbmVyIiwibG9jYXRpb24iLCJoYXNoIiwic3Vic3RyIiwid2luZG93IiwidHJuX29ial9pbnN0YW5jZSIsInRhYlZpZXdzIiwiZnJvbSIsInRybiIsImRyb3Bkb3ducyIsImhhbmRsZURyb3Bkb3duQ2xvc2UiLCJkcm9wZG93biIsIm5leHRFbGVtZW50U2libGluZyIsInJlbW92ZUV2ZW50TGlzdGVuZXIiLCJzdG9wUHJvcGFnYXRpb24iLCJfdGhpcyIsIm5hbWVJbnB1dCIsImIiLCJ2YWwiLCJwYXJlbnQiLCJwYXJlbnROb2RlIiwidGhlbiIsImRhdGEiLCJjb25zb2xlIiwibG9nIiwiY2xvc2VBbGxMaXN0cyIsImN1cnJlbnRGb2N1cyIsImNyZWF0ZUVsZW1lbnQiLCJzZXRBdHRyaWJ1dGUiLCJpZCIsImFwcGVuZENoaWxkIiwidGV4dCIsImlubmVySFRNTCIsImNvbmNhdCIsInNlbGVjdGVkSWQiLCJkaXNwYXRjaEV2ZW50IiwiRXZlbnQiLCJ4IiwiZ2V0RWxlbWVudHNCeVRhZ05hbWUiLCJrZXlDb2RlIiwiYWRkQWN0aXZlIiwiY2xpY2siLCJyZW1vdmVBY3RpdmUiLCJyZW1vdmVDaGlsZCIsImZvcm1hdCIsImFyZ3MiLCJhcmd1bWVudHMiLCJtYXRjaCIsIiQiLCJvcHRpb25zIiwidHJuX2RlbGV0ZV9tYXRjaF9vcHRpb25zIiwidGFyZ2V0cyIsIm1hdGNoSWQiLCJ4aHIiLCJYTUxIdHRwUmVxdWVzdCIsIm9wZW4iLCJhcGlfdXJsIiwic2V0UmVxdWVzdEhlYWRlciIsInJlc3Rfbm9uY2UiLCJvbmxvYWQiLCJzdGF0dXMiLCJyZXNwb25zZSIsIkpTT04iLCJwYXJzZSIsImxhbmd1YWdlIiwiZmFpbHVyZSIsIm1lc3NhZ2UiLCJzZW5kIl0sInNvdXJjZVJvb3QiOiIifQ==
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
/*!***************************************!*\
  !*** ./src/js/update-team-profile.js ***!
  \***************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
/**
 * Handles asynchronously updating a team profile.
 *
 * @link       https://www.tournamatch.com
 * @since      3.16.0
 *
 * @package    Tournamatch
 *
 */


(function ($) {
  'use strict';

  // add listener for roster changed event
  window.addEventListener('load', function () {
    var options = trn_team_profile_options;
    var form = document.getElementById('trn-edit-team-profile-form');
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      var xhr = new XMLHttpRequest();
      xhr.open('POST', options.api_url + 'teams/' + form.dataset.teamId);
      xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
      xhr.onload = function () {
        console.log(xhr);
        var response = JSON.parse(xhr.response);
        if (xhr.status === 200) {
          document.getElementById('trn-update-response').innerHTML = "<div class=\"trn-alert trn-alert-success\"><strong>".concat(options.language.success, "!</strong> ").concat(options.language.success_message, "</div>");

          // Update the team profile avatar.
          if (response.avatar.length > 0) {
            var avatarPreview = form.getElementsByClassName('profile-picture');
            if (avatarPreview.length === 1) {
              avatarPreview[0].setAttribute('src', options.avatar_upload_path + response.avatar);
            }
          }
        } else if (xhr.status === 409) {
          document.getElementById('trn-update-response').innerHTML = "<div class=\"trn-alert trn-alert-warning\"><strong>".concat(options.language.failure, ":</strong> ").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(response.message), "</div>");
        } else {
          document.getElementById('trn-update-response').innerHTML = "<div class=\"trn-alert trn-alert-danger\"><strong>".concat(options.language.failure, ":</strong> ").concat(options.language.failure_message, "</div>");
        }
      };
      xhr.send(new FormData(form));
    });
  }, false);
})(_tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUN2QixJQUFJLENBQUMsQ0FBQztJQUNoQyxDQUFDLENBQUM7RUFDTixDQUFDLEVBQUUsS0FBSyxDQUFDO0FBQ2IsQ0FBQyxFQUFFM0MsZ0RBQUcsQ0FBQyxDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvQHdvcmRwcmVzcy9lc2NhcGUtaHRtbC9zcmMvZXNjYXBlLWdyZWF0ZXIuanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvQHdvcmRwcmVzcy9lc2NhcGUtaHRtbC9zcmMvaW5kZXguanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvLi9zcmMvanMvdG91cm5hbWF0Y2guanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2RlZmluZSBwcm9wZXJ0eSBnZXR0ZXJzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9oYXNPd25Qcm9wZXJ0eSBzaG9ydGhhbmQiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL21ha2UgbmFtZXNwYWNlIG9iamVjdCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC8uL3NyYy9qcy91cGRhdGUtdGVhbS1wcm9maWxlLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGdyZWF0ZXItdGhhbiBzaWduIHJlcGxhY2VkLlxuICpcbiAqIE5vdGUgdGhhdCBpZiBhIHJlc29sdXRpb24gZm9yIFRyYWMjNDUzODcgY29tZXMgdG8gZnJ1aXRpb24sIGl0IGlzIG5vIGxvbmdlclxuICogbmVjZXNzYXJ5IGZvciBgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuYCB0byBleGlzdC5cbiAqXG4gKiBTZWU6IGh0dHBzOi8vY29yZS50cmFjLndvcmRwcmVzcy5vcmcvdGlja2V0LzQ1Mzg3XG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4oIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLz4vZywgJyZndDsnICk7XG59XG4iLCIvKipcbiAqIEludGVybmFsIGRlcGVuZGVuY2llc1xuICovXG5pbXBvcnQgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuIGZyb20gJy4vZXNjYXBlLWdyZWF0ZXInO1xuXG4vKipcbiAqIFJlZ3VsYXIgZXhwcmVzc2lvbiBtYXRjaGluZyBpbnZhbGlkIGF0dHJpYnV0ZSBuYW1lcy5cbiAqXG4gKiBcIkF0dHJpYnV0ZSBuYW1lcyBtdXN0IGNvbnNpc3Qgb2Ygb25lIG9yIG1vcmUgY2hhcmFjdGVycyBvdGhlciB0aGFuIGNvbnRyb2xzLFxuICogVSswMDIwIFNQQUNFLCBVKzAwMjIgKFwiKSwgVSswMDI3ICgnKSwgVSswMDNFICg+KSwgVSswMDJGICgvKSwgVSswMDNEICg9KSxcbiAqIGFuZCBub25jaGFyYWN0ZXJzLlwiXG4gKlxuICogQHNlZSBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS9zeW50YXguaHRtbCNhdHRyaWJ1dGVzLTJcbiAqXG4gKiBAdHlwZSB7UmVnRXhwfVxuICovXG5jb25zdCBSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRSA9IC9bXFx1MDA3Ri1cXHUwMDlGIFwiJz4vPVwiXFx1RkREMC1cXHVGREVGXS87XG5cbi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGFtcGVyc2FuZHMgZXNjYXBlZC4gTm90ZSB0aGF0IHRoaXMgaXMgYW4gaW1wZXJmZWN0XG4gKiBpbXBsZW1lbnRhdGlvbiwgd2hlcmUgb25seSBhbXBlcnNhbmRzIHdoaWNoIGRvIG5vdCBhcHBlYXIgYXMgYSBwYXR0ZXJuIG9mXG4gKiBuYW1lZCwgZGVjaW1hbCwgb3IgaGV4YWRlY2ltYWwgY2hhcmFjdGVyIHJlZmVyZW5jZXMgYXJlIGVzY2FwZWQuIEludmFsaWRcbiAqIG5hbWVkIHJlZmVyZW5jZXMgKGkuZS4gYW1iaWd1b3VzIGFtcGVyc2FuZCkgYXJlIHN0aWxsIHBlcm1pdHRlZC5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2NoYXJhY3Rlci1yZWZlcmVuY2VzXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2FtYmlndW91cy1hbXBlcnNhbmRcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjbmFtZWQtY2hhcmFjdGVyLXJlZmVyZW5jZXNcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVBbXBlcnNhbmQoIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLyYoPyEoW2EtejAtOV0rfCNbMC05XSt8I3hbYS1mMC05XSspOykvZ2ksICcmYW1wOycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggcXVvdGF0aW9uIG1hcmtzIHJlcGxhY2VkLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZVF1b3RhdGlvbk1hcmsoIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggL1wiL2csICcmcXVvdDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGxlc3MtdGhhbiBzaWduIHJlcGxhY2VkLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUxlc3NUaGFuKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC88L2csICcmbHQ7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYW4gZXNjYXBlZCBhdHRyaWJ1dGUgdmFsdWUuXG4gKlxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNlbGVtZW50cy1hdHRyaWJ1dGVzXG4gKlxuICogXCJbLi4uXSB0aGUgdGV4dCBjYW5ub3QgY29udGFpbiBhbiBhbWJpZ3VvdXMgYW1wZXJzYW5kIFsuLi5dIG11c3Qgbm90IGNvbnRhaW5cbiAqIGFueSBsaXRlcmFsIFUrMDAyMiBRVU9UQVRJT04gTUFSSyBjaGFyYWN0ZXJzIChcIilcIlxuICpcbiAqIE5vdGUgd2UgYWxzbyBlc2NhcGUgdGhlIGdyZWF0ZXIgdGhhbiBzeW1ib2wsIGFzIHRoaXMgaXMgdXNlZCBieSB3cHRleHR1cml6ZSB0b1xuICogc3BsaXQgSFRNTCBzdHJpbmdzLiBUaGlzIGlzIGEgV29yZFByZXNzIHNwZWNpZmljIGZpeFxuICpcbiAqIE5vdGUgdGhhdCBpZiBhIHJlc29sdXRpb24gZm9yIFRyYWMjNDUzODcgY29tZXMgdG8gZnJ1aXRpb24sIGl0IGlzIG5vIGxvbmdlclxuICogbmVjZXNzYXJ5IGZvciBgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuYCB0byBiZSB1c2VkLlxuICpcbiAqIFNlZTogaHR0cHM6Ly9jb3JlLnRyYWMud29yZHByZXNzLm9yZy90aWNrZXQvNDUzODdcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgQXR0cmlidXRlIHZhbHVlLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBhdHRyaWJ1dGUgdmFsdWUuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVBdHRyaWJ1dGUoIHZhbHVlICkge1xuXHRyZXR1cm4gX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuKFxuXHRcdGVzY2FwZVF1b3RhdGlvbk1hcmsoIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSApXG5cdCk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI3dyaXRpbmctaHRtbC1kb2N1bWVudHMtZWxlbWVudHNcbiAqXG4gKiBcInRoZSB0ZXh0IG11c3Qgbm90IGNvbnRhaW4gdGhlIGNoYXJhY3RlciBVKzAwM0MgTEVTUy1USEFOIFNJR04gKDwpIG9yIGFuXG4gKiBhbWJpZ3VvdXMgYW1wZXJzYW5kLlwiXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUhUTUwoIHZhbHVlICkge1xuXHRyZXR1cm4gZXNjYXBlTGVzc1RoYW4oIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYW4gZXNjYXBlZCBFZGl0YWJsZSBIVE1MIGVsZW1lbnQgdmFsdWUuIFRoaXMgaXMgZGlmZmVyZW50IGZyb21cbiAqIGBlc2NhcGVIVE1MYCwgYmVjYXVzZSBmb3IgZWRpdGFibGUgSFRNTCwgQUxMIGFtcGVyc2FuZHMgbXVzdCBiZSBlc2NhcGVkIGluXG4gKiBvcmRlciB0byByZW5kZXIgdGhlIGNvbnRlbnQgY29ycmVjdGx5IG9uIHRoZSBwYWdlLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBFbGVtZW50IHZhbHVlLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBIVE1MIGVsZW1lbnQgdmFsdWUuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVFZGl0YWJsZUhUTUwoIHZhbHVlICkge1xuXHRyZXR1cm4gZXNjYXBlTGVzc1RoYW4oIHZhbHVlLnJlcGxhY2UoIC8mL2csICcmYW1wOycgKSApO1xufVxuXG4vKipcbiAqIFJldHVybnMgdHJ1ZSBpZiB0aGUgZ2l2ZW4gYXR0cmlidXRlIG5hbWUgaXMgdmFsaWQsIG9yIGZhbHNlIG90aGVyd2lzZS5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gbmFtZSBBdHRyaWJ1dGUgbmFtZSB0byB0ZXN0LlxuICpcbiAqIEByZXR1cm4ge2Jvb2xlYW59IFdoZXRoZXIgYXR0cmlidXRlIGlzIHZhbGlkLlxuICovXG5leHBvcnQgZnVuY3Rpb24gaXNWYWxpZEF0dHJpYnV0ZU5hbWUoIG5hbWUgKSB7XG5cdHJldHVybiAhIFJFR0VYUF9JTlZBTElEX0FUVFJJQlVURV9OQU1FLnRlc3QoIG5hbWUgKTtcbn1cbiIsIid1c2Ugc3RyaWN0JztcclxuY2xhc3MgVG91cm5hbWF0Y2gge1xyXG5cclxuICAgIGNvbnN0cnVjdG9yKCkge1xyXG4gICAgICAgIHRoaXMuZXZlbnRzID0ge307XHJcbiAgICB9XHJcblxyXG4gICAgcGFyYW0ob2JqZWN0LCBwcmVmaXgpIHtcclxuICAgICAgICBsZXQgc3RyID0gW107XHJcbiAgICAgICAgZm9yIChsZXQgcHJvcCBpbiBvYmplY3QpIHtcclxuICAgICAgICAgICAgaWYgKG9iamVjdC5oYXNPd25Qcm9wZXJ0eShwcm9wKSkge1xyXG4gICAgICAgICAgICAgICAgbGV0IGsgPSBwcmVmaXggPyBwcmVmaXggKyBcIltcIiArIHByb3AgKyBcIl1cIiA6IHByb3A7XHJcbiAgICAgICAgICAgICAgICBsZXQgdiA9IG9iamVjdFtwcm9wXTtcclxuICAgICAgICAgICAgICAgIHN0ci5wdXNoKCh2ICE9PSBudWxsICYmIHR5cGVvZiB2ID09PSBcIm9iamVjdFwiKSA/IHRoaXMucGFyYW0odiwgaykgOiBlbmNvZGVVUklDb21wb25lbnQoaykgKyBcIj1cIiArIGVuY29kZVVSSUNvbXBvbmVudCh2KSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuIHN0ci5qb2luKFwiJlwiKTtcclxuICAgIH1cclxuXHJcbiAgICBldmVudChldmVudE5hbWUpIHtcclxuICAgICAgICBpZiAoIShldmVudE5hbWUgaW4gdGhpcy5ldmVudHMpKSB7XHJcbiAgICAgICAgICAgIHRoaXMuZXZlbnRzW2V2ZW50TmFtZV0gPSBuZXcgRXZlbnRUYXJnZXQoZXZlbnROYW1lKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuIHRoaXMuZXZlbnRzW2V2ZW50TmFtZV07XHJcbiAgICB9XHJcblxyXG4gICAgYXV0b2NvbXBsZXRlKGlucHV0LCBkYXRhQ2FsbGJhY2spIHtcclxuICAgICAgICBuZXcgVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlKGlucHV0LCBkYXRhQ2FsbGJhY2spO1xyXG4gICAgfVxyXG5cclxuICAgIHVjZmlyc3Qocykge1xyXG4gICAgICAgIGlmICh0eXBlb2YgcyAhPT0gJ3N0cmluZycpIHJldHVybiAnJztcclxuICAgICAgICByZXR1cm4gcy5jaGFyQXQoMCkudG9VcHBlckNhc2UoKSArIHMuc2xpY2UoMSk7XHJcbiAgICB9XHJcblxyXG4gICAgb3JkaW5hbF9zdWZmaXgobnVtYmVyKSB7XHJcbiAgICAgICAgY29uc3QgcmVtYWluZGVyID0gbnVtYmVyICUgMTAwO1xyXG5cclxuICAgICAgICBpZiAoKHJlbWFpbmRlciA8IDExKSB8fCAocmVtYWluZGVyID4gMTMpKSB7XHJcbiAgICAgICAgICAgIHN3aXRjaCAocmVtYWluZGVyICUgMTApIHtcclxuICAgICAgICAgICAgICAgIGNhc2UgMTogcmV0dXJuICdzdCc7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDI6IHJldHVybiAnbmQnO1xyXG4gICAgICAgICAgICAgICAgY2FzZSAzOiByZXR1cm4gJ3JkJztcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gJ3RoJztcclxuICAgIH1cclxuXHJcbiAgICB0YWJzKGVsZW1lbnQpIHtcclxuICAgICAgICBjb25zdCB0YWJzID0gZWxlbWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tbmF2LWxpbmsnKTtcclxuICAgICAgICBjb25zdCBwYW5lcyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi10YWItcGFuZScpO1xyXG4gICAgICAgIGNvbnN0IGNsZWFyQWN0aXZlID0gKCkgPT4ge1xyXG4gICAgICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhYnMsICh0YWIpID0+IHtcclxuICAgICAgICAgICAgICAgIHRhYi5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tbmF2LWFjdGl2ZScpO1xyXG4gICAgICAgICAgICAgICAgdGFiLmFyaWFTZWxlY3RlZCA9IGZhbHNlO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChwYW5lcywgcGFuZSA9PiBwYW5lLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi10YWItYWN0aXZlJykpO1xyXG4gICAgICAgIH07XHJcbiAgICAgICAgY29uc3Qgc2V0QWN0aXZlID0gKHRhcmdldElkKSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFRhYiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ2FbaHJlZj1cIiMnICsgdGFyZ2V0SWQgKyAnXCJdLnRybi1uYXYtbGluaycpO1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRQYW5lSWQgPSB0YXJnZXRUYWIgJiYgdGFyZ2V0VGFiLmRhdGFzZXQgJiYgdGFyZ2V0VGFiLmRhdGFzZXQudGFyZ2V0IHx8IGZhbHNlO1xyXG5cclxuICAgICAgICAgICAgaWYgKHRhcmdldFBhbmVJZCkge1xyXG4gICAgICAgICAgICAgICAgY2xlYXJBY3RpdmUoKTtcclxuICAgICAgICAgICAgICAgIHRhcmdldFRhYi5jbGFzc0xpc3QuYWRkKCd0cm4tbmF2LWFjdGl2ZScpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0VGFiLmFyaWFTZWxlY3RlZCA9IHRydWU7XHJcblxyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQodGFyZ2V0UGFuZUlkKS5jbGFzc0xpc3QuYWRkKCd0cm4tdGFiLWFjdGl2ZScpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuICAgICAgICBjb25zdCB0YWJDbGljayA9IChldmVudCkgPT4ge1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRUYWIgPSBldmVudC5jdXJyZW50VGFyZ2V0O1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRQYW5lSWQgPSB0YXJnZXRUYWIgJiYgdGFyZ2V0VGFiLmRhdGFzZXQgJiYgdGFyZ2V0VGFiLmRhdGFzZXQudGFyZ2V0IHx8IGZhbHNlO1xyXG5cclxuICAgICAgICAgICAgaWYgKHRhcmdldFBhbmVJZCkge1xyXG4gICAgICAgICAgICAgICAgc2V0QWN0aXZlKHRhcmdldFBhbmVJZCk7XHJcbiAgICAgICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbCh0YWJzLCAodGFiKSA9PiB7XHJcbiAgICAgICAgICAgIHRhYi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHRhYkNsaWNrKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgaWYgKGxvY2F0aW9uLmhhc2gpIHtcclxuICAgICAgICAgICAgc2V0QWN0aXZlKGxvY2F0aW9uLmhhc2guc3Vic3RyKDEpKTtcclxuICAgICAgICB9IGVsc2UgaWYgKHRhYnMubGVuZ3RoID4gMCkge1xyXG4gICAgICAgICAgICBzZXRBY3RpdmUodGFic1swXS5kYXRhc2V0LnRhcmdldCk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxufVxyXG5cclxuLy90cm4uaW5pdGlhbGl6ZSgpO1xyXG5pZiAoIXdpbmRvdy50cm5fb2JqX2luc3RhbmNlKSB7XHJcbiAgICB3aW5kb3cudHJuX29ial9pbnN0YW5jZSA9IG5ldyBUb3VybmFtYXRjaCgpO1xyXG5cclxuICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKCkge1xyXG5cclxuICAgICAgICBjb25zdCB0YWJWaWV3cyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1uYXYnKTtcclxuXHJcbiAgICAgICAgQXJyYXkuZnJvbSh0YWJWaWV3cykuZm9yRWFjaCgodGFiKSA9PiB7XHJcbiAgICAgICAgICAgIHRybi50YWJzKHRhYik7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGNvbnN0IGRyb3Bkb3ducyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1kcm9wZG93bi10b2dnbGUnKTtcclxuICAgICAgICBjb25zdCBoYW5kbGVEcm9wZG93bkNsb3NlID0gKCkgPT4ge1xyXG4gICAgICAgICAgICBBcnJheS5mcm9tKGRyb3Bkb3ducykuZm9yRWFjaCgoZHJvcGRvd24pID0+IHtcclxuICAgICAgICAgICAgICAgIGRyb3Bkb3duLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tc2hvdycpO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgZG9jdW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhhbmRsZURyb3Bkb3duQ2xvc2UsIGZhbHNlKTtcclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICBBcnJheS5mcm9tKGRyb3Bkb3ducykuZm9yRWFjaCgoZHJvcGRvd24pID0+IHtcclxuICAgICAgICAgICAgZHJvcGRvd24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgICAgICAgICAgICAgdGhpcy5uZXh0RWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LmFkZCgndHJuLXNob3cnKTtcclxuICAgICAgICAgICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBoYW5kbGVEcm9wZG93bkNsb3NlLCBmYWxzZSk7XHJcbiAgICAgICAgICAgIH0sIGZhbHNlKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICB9LCBmYWxzZSk7XHJcbn1cclxuZXhwb3J0IGxldCB0cm4gPSB3aW5kb3cudHJuX29ial9pbnN0YW5jZTtcclxuXHJcbmNsYXNzIFRvdXJuYW1hdGNoX0F1dG9jb21wbGV0ZSB7XHJcblxyXG4gICAgLy8gY3VycmVudEZvY3VzO1xyXG4gICAgLy9cclxuICAgIC8vIG5hbWVJbnB1dDtcclxuICAgIC8vXHJcbiAgICAvLyBzZWxmO1xyXG5cclxuICAgIGNvbnN0cnVjdG9yKGlucHV0LCBkYXRhQ2FsbGJhY2spIHtcclxuICAgICAgICAvLyB0aGlzLnNlbGYgPSB0aGlzO1xyXG4gICAgICAgIHRoaXMubmFtZUlucHV0ID0gaW5wdXQ7XHJcblxyXG4gICAgICAgIHRoaXMubmFtZUlucHV0LmFkZEV2ZW50TGlzdGVuZXIoXCJpbnB1dFwiLCAoKSA9PiB7XHJcbiAgICAgICAgICAgIGxldCBhLCBiLCBpLCB2YWwgPSB0aGlzLm5hbWVJbnB1dC52YWx1ZTsvL3RoaXMudmFsdWU7XHJcbiAgICAgICAgICAgIGxldCBwYXJlbnQgPSB0aGlzLm5hbWVJbnB1dC5wYXJlbnROb2RlOy8vdGhpcy5wYXJlbnROb2RlO1xyXG5cclxuICAgICAgICAgICAgLy8gbGV0IHAgPSBuZXcgUHJvbWlzZSgocmVzb2x2ZSwgcmVqZWN0KSA9PiB7XHJcbiAgICAgICAgICAgIC8vICAgICAvKiBuZWVkIHRvIHF1ZXJ5IHNlcnZlciBmb3IgbmFtZXMgaGVyZS4gKi9cclxuICAgICAgICAgICAgLy8gICAgIGxldCB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5vcGVuKCdHRVQnLCBvcHRpb25zLmFwaV91cmwgKyAncGxheWVycy8/c2VhcmNoPScgKyB2YWwgKyAnJnBlcl9wYWdlPTUnKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdDb250ZW50LVR5cGUnLCAnYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkJyk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1XUC1Ob25jZScsIG9wdGlvbnMucmVzdF9ub25jZSk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIub25sb2FkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDApIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgLy8gcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4geyAndmFsdWUnOiBwbGF5ZXIuaWQsICd0ZXh0JzogcGxheWVyLm5hbWUgfTt9KSk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJlc29sdmUoSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpLm1hcCgocGxheWVyKSA9PiB7cmV0dXJuIHBsYXllci5uYW1lO30pKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICByZWplY3QoKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICB9XHJcbiAgICAgICAgICAgIC8vICAgICB9O1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNlbmQoKTtcclxuICAgICAgICAgICAgLy8gfSk7XHJcbiAgICAgICAgICAgIGRhdGFDYWxsYmFjayh2YWwpLnRoZW4oKGRhdGEpID0+IHsvL3AudGhlbigoZGF0YSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XHJcblxyXG4gICAgICAgICAgICAgICAgLypjbG9zZSBhbnkgYWxyZWFkeSBvcGVuIGxpc3RzIG9mIGF1dG8tY29tcGxldGVkIHZhbHVlcyovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoKTtcclxuICAgICAgICAgICAgICAgIGlmICghdmFsKSB7IHJldHVybiBmYWxzZTt9XHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cyA9IC0xO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qY3JlYXRlIGEgRElWIGVsZW1lbnQgdGhhdCB3aWxsIGNvbnRhaW4gdGhlIGl0ZW1zICh2YWx1ZXMpOiovXHJcbiAgICAgICAgICAgICAgICBhID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcIkRJVlwiKTtcclxuICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiaWRcIiwgdGhpcy5uYW1lSW5wdXQuaWQgKyBcIi1hdXRvLWNvbXBsZXRlLWxpc3RcIik7XHJcbiAgICAgICAgICAgICAgICBhLnNldEF0dHJpYnV0ZShcImNsYXNzXCIsIFwidHJuLWF1dG8tY29tcGxldGUtaXRlbXNcIik7XHJcblxyXG4gICAgICAgICAgICAgICAgLyphcHBlbmQgdGhlIERJViBlbGVtZW50IGFzIGEgY2hpbGQgb2YgdGhlIGF1dG8tY29tcGxldGUgY29udGFpbmVyOiovXHJcbiAgICAgICAgICAgICAgICBwYXJlbnQuYXBwZW5kQ2hpbGQoYSk7XHJcblxyXG4gICAgICAgICAgICAgICAgLypmb3IgZWFjaCBpdGVtIGluIHRoZSBhcnJheS4uLiovXHJcbiAgICAgICAgICAgICAgICBmb3IgKGkgPSAwOyBpIDwgZGF0YS5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCB0ZXh0LCB2YWx1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLyogV2hpY2ggZm9ybWF0IGRpZCB0aGV5IGdpdmUgdXMuICovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHR5cGVvZiBkYXRhW2ldID09PSAnb2JqZWN0Jykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0ID0gZGF0YVtpXVsndGV4dCddO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IGRhdGFbaV1bJ3ZhbHVlJ107XHJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dCA9IGRhdGFbaV07XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8qY2hlY2sgaWYgdGhlIGl0ZW0gc3RhcnRzIHdpdGggdGhlIHNhbWUgbGV0dGVycyBhcyB0aGUgdGV4dCBmaWVsZCB2YWx1ZToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh0ZXh0LnN1YnN0cigwLCB2YWwubGVuZ3RoKS50b1VwcGVyQ2FzZSgpID09PSB2YWwudG9VcHBlckNhc2UoKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmNyZWF0ZSBhIERJViBlbGVtZW50IGZvciBlYWNoIG1hdGNoaW5nIGVsZW1lbnQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJESVZcIik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qbWFrZSB0aGUgbWF0Y2hpbmcgbGV0dGVycyBib2xkOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MID0gXCI8c3Ryb25nPlwiICsgdGV4dC5zdWJzdHIoMCwgdmFsLmxlbmd0aCkgKyBcIjwvc3Ryb25nPlwiO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCArPSB0ZXh0LnN1YnN0cih2YWwubGVuZ3RoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qaW5zZXJ0IGEgaW5wdXQgZmllbGQgdGhhdCB3aWxsIGhvbGQgdGhlIGN1cnJlbnQgYXJyYXkgaXRlbSdzIHZhbHVlOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IFwiPGlucHV0IHR5cGU9J2hpZGRlbicgdmFsdWU9J1wiICsgdmFsdWUgKyBcIic+XCI7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudmFsdWUgPSB2YWx1ZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5kYXRhc2V0LnRleHQgPSB0ZXh0O1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gd2hlbiBzb21lb25lIGNsaWNrcyBvbiB0aGUgaXRlbSB2YWx1ZSAoRElWIGVsZW1lbnQpOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhgaXRlbSBjbGlja2VkIHdpdGggdmFsdWUgJHtlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC52YWx1ZX1gKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvKiBpbnNlcnQgdGhlIHZhbHVlIGZvciB0aGUgYXV0b2NvbXBsZXRlIHRleHQgZmllbGQ6ICovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC52YWx1ZSA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0LnRleHQ7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC5kYXRhc2V0LnNlbGVjdGVkSWQgPSBlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC52YWx1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvKiBjbG9zZSB0aGUgbGlzdCBvZiBhdXRvY29tcGxldGVkIHZhbHVlcywgKG9yIGFueSBvdGhlciBvcGVuIGxpc3RzIG9mIGF1dG9jb21wbGV0ZWQgdmFsdWVzOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC5kaXNwYXRjaEV2ZW50KG5ldyBFdmVudCgnY2hhbmdlJykpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYS5hcHBlbmRDaGlsZChiKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiBwcmVzc2VzIGEga2V5IG9uIHRoZSBrZXlib2FyZDoqL1xyXG4gICAgICAgIHRoaXMubmFtZUlucHV0LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXlkb3duXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQodGhpcy5uYW1lSW5wdXQuaWQgKyBcIi1hdXRvLWNvbXBsZXRlLWxpc3RcIik7XHJcbiAgICAgICAgICAgIGlmICh4KSB4ID0geC5nZXRFbGVtZW50c0J5VGFnTmFtZShcImRpdlwiKTtcclxuICAgICAgICAgICAgaWYgKGUua2V5Q29kZSA9PT0gNDApIHtcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIGFycm93IERPV04ga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgaW5jcmVhc2UgdGhlIGN1cnJlbnRGb2N1cyB2YXJpYWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMrKztcclxuICAgICAgICAgICAgICAgIC8qYW5kIGFuZCBtYWtlIHRoZSBjdXJyZW50IGl0ZW0gbW9yZSB2aXNpYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT09IDM4KSB7IC8vdXBcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIGFycm93IFVQIGtleSBpcyBwcmVzc2VkLFxyXG4gICAgICAgICAgICAgICAgIGRlY3JlYXNlIHRoZSBjdXJyZW50Rm9jdXMgdmFyaWFibGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzLS07XHJcbiAgICAgICAgICAgICAgICAvKmFuZCBhbmQgbWFrZSB0aGUgY3VycmVudCBpdGVtIG1vcmUgdmlzaWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5hZGRBY3RpdmUoeCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09PSAxMykge1xyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgRU5URVIga2V5IGlzIHByZXNzZWQsIHByZXZlbnQgdGhlIGZvcm0gZnJvbSBiZWluZyBzdWJtaXR0ZWQsKi9cclxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA+IC0xKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgLyphbmQgc2ltdWxhdGUgYSBjbGljayBvbiB0aGUgXCJhY3RpdmVcIiBpdGVtOiovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHgpIHhbdGhpcy5jdXJyZW50Rm9jdXNdLmNsaWNrKCk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gd2hlbiBzb21lb25lIGNsaWNrcyBpbiB0aGUgZG9jdW1lbnQ6Ki9cclxuICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKGUudGFyZ2V0KTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICBhZGRBY3RpdmUoeCkge1xyXG4gICAgICAgIC8qYSBmdW5jdGlvbiB0byBjbGFzc2lmeSBhbiBpdGVtIGFzIFwiYWN0aXZlXCI6Ki9cclxuICAgICAgICBpZiAoIXgpIHJldHVybiBmYWxzZTtcclxuICAgICAgICAvKnN0YXJ0IGJ5IHJlbW92aW5nIHRoZSBcImFjdGl2ZVwiIGNsYXNzIG9uIGFsbCBpdGVtczoqL1xyXG4gICAgICAgIHRoaXMucmVtb3ZlQWN0aXZlKHgpO1xyXG4gICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA+PSB4Lmxlbmd0aCkgdGhpcy5jdXJyZW50Rm9jdXMgPSAwO1xyXG4gICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA8IDApIHRoaXMuY3VycmVudEZvY3VzID0gKHgubGVuZ3RoIC0gMSk7XHJcbiAgICAgICAgLyphZGQgY2xhc3MgXCJhdXRvY29tcGxldGUtYWN0aXZlXCI6Ki9cclxuICAgICAgICB4W3RoaXMuY3VycmVudEZvY3VzXS5jbGFzc0xpc3QuYWRkKFwidHJuLWF1dG8tY29tcGxldGUtYWN0aXZlXCIpO1xyXG4gICAgfVxyXG5cclxuICAgIHJlbW92ZUFjdGl2ZSh4KSB7XHJcbiAgICAgICAgLyphIGZ1bmN0aW9uIHRvIHJlbW92ZSB0aGUgXCJhY3RpdmVcIiBjbGFzcyBmcm9tIGFsbCBhdXRvY29tcGxldGUgaXRlbXM6Ki9cclxuICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IHgubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgeFtpXS5jbGFzc0xpc3QucmVtb3ZlKFwidHJuLWF1dG8tY29tcGxldGUtYWN0aXZlXCIpO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbiAgICBjbG9zZUFsbExpc3RzKGVsZW1lbnQpIHtcclxuICAgICAgICBjb25zb2xlLmxvZyhcImNsb3NlIGFsbCBsaXN0c1wiKTtcclxuICAgICAgICAvKmNsb3NlIGFsbCBhdXRvY29tcGxldGUgbGlzdHMgaW4gdGhlIGRvY3VtZW50LFxyXG4gICAgICAgICBleGNlcHQgdGhlIG9uZSBwYXNzZWQgYXMgYW4gYXJndW1lbnQ6Ki9cclxuICAgICAgICBsZXQgeCA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoXCJ0cm4tYXV0by1jb21wbGV0ZS1pdGVtc1wiKTtcclxuICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IHgubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgaWYgKGVsZW1lbnQgIT09IHhbaV0gJiYgZWxlbWVudCAhPT0gdGhpcy5uYW1lSW5wdXQpIHtcclxuICAgICAgICAgICAgICAgIHhbaV0ucGFyZW50Tm9kZS5yZW1vdmVDaGlsZCh4W2ldKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgIH1cclxufVxyXG5cclxuLy8gRmlyc3QsIGNoZWNrcyBpZiBpdCBpc24ndCBpbXBsZW1lbnRlZCB5ZXQuXHJcbmlmICghU3RyaW5nLnByb3RvdHlwZS5mb3JtYXQpIHtcclxuICAgIFN0cmluZy5wcm90b3R5cGUuZm9ybWF0ID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgY29uc3QgYXJncyA9IGFyZ3VtZW50cztcclxuICAgICAgICByZXR1cm4gdGhpcy5yZXBsYWNlKC97KFxcZCspfS9nLCBmdW5jdGlvbihtYXRjaCwgbnVtYmVyKSB7XHJcbiAgICAgICAgICAgIHJldHVybiB0eXBlb2YgYXJnc1tudW1iZXJdICE9PSAndW5kZWZpbmVkJ1xyXG4gICAgICAgICAgICAgICAgPyBhcmdzW251bWJlcl1cclxuICAgICAgICAgICAgICAgIDogbWF0Y2hcclxuICAgICAgICAgICAgICAgIDtcclxuICAgICAgICB9KTtcclxuICAgIH07XHJcbn0iLCIvLyBUaGUgbW9kdWxlIGNhY2hlXG52YXIgX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fID0ge307XG5cbi8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG5mdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuXHR2YXIgY2FjaGVkTW9kdWxlID0gX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fW21vZHVsZUlkXTtcblx0aWYgKGNhY2hlZE1vZHVsZSAhPT0gdW5kZWZpbmVkKSB7XG5cdFx0cmV0dXJuIGNhY2hlZE1vZHVsZS5leHBvcnRzO1xuXHR9XG5cdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG5cdHZhciBtb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdID0ge1xuXHRcdC8vIG5vIG1vZHVsZS5pZCBuZWVkZWRcblx0XHQvLyBubyBtb2R1bGUubG9hZGVkIG5lZWRlZFxuXHRcdGV4cG9ydHM6IHt9XG5cdH07XG5cblx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG5cdF9fd2VicGFja19tb2R1bGVzX19bbW9kdWxlSWRdKG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG5cdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG5cdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbn1cblxuIiwiLy8gZGVmaW5lIGdldHRlciBmdW5jdGlvbnMgZm9yIGhhcm1vbnkgZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5kID0gKGV4cG9ydHMsIGRlZmluaXRpb24pID0+IHtcblx0Zm9yKHZhciBrZXkgaW4gZGVmaW5pdGlvbikge1xuXHRcdGlmKF9fd2VicGFja19yZXF1aXJlX18ubyhkZWZpbml0aW9uLCBrZXkpICYmICFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywga2V5KSkge1xuXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIGtleSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGRlZmluaXRpb25ba2V5XSB9KTtcblx0XHR9XG5cdH1cbn07IiwiX193ZWJwYWNrX3JlcXVpcmVfXy5vID0gKG9iaiwgcHJvcCkgPT4gKE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmosIHByb3ApKSIsIi8vIGRlZmluZSBfX2VzTW9kdWxlIG9uIGV4cG9ydHNcbl9fd2VicGFja19yZXF1aXJlX18uciA9IChleHBvcnRzKSA9PiB7XG5cdGlmKHR5cGVvZiBTeW1ib2wgIT09ICd1bmRlZmluZWQnICYmIFN5bWJvbC50b1N0cmluZ1RhZykge1xuXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBTeW1ib2wudG9TdHJpbmdUYWcsIHsgdmFsdWU6ICdNb2R1bGUnIH0pO1xuXHR9XG5cdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCAnX19lc01vZHVsZScsIHsgdmFsdWU6IHRydWUgfSk7XG59OyIsIi8qKlxyXG4gKiBIYW5kbGVzIGFzeW5jaHJvbm91c2x5IHVwZGF0aW5nIGEgdGVhbSBwcm9maWxlLlxyXG4gKlxyXG4gKiBAbGluayAgICAgICBodHRwczovL3d3dy50b3VybmFtYXRjaC5jb21cclxuICogQHNpbmNlICAgICAgMy4xNi4wXHJcbiAqXHJcbiAqIEBwYWNrYWdlICAgIFRvdXJuYW1hdGNoXHJcbiAqXHJcbiAqL1xyXG5pbXBvcnQgeyB0cm4gfSBmcm9tICcuL3RvdXJuYW1hdGNoLmpzJztcclxuaW1wb3J0IHsgZXNjYXBlSFRNTCB9IGZyb20gJ0B3b3JkcHJlc3MvZXNjYXBlLWh0bWwnO1xyXG5cclxuKGZ1bmN0aW9uICgkKSB7XHJcbiAgICAndXNlIHN0cmljdCc7XHJcblxyXG4gICAgLy8gYWRkIGxpc3RlbmVyIGZvciByb3N0ZXIgY2hhbmdlZCBldmVudFxyXG4gICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgbGV0IG9wdGlvbnMgPSB0cm5fdGVhbV9wcm9maWxlX29wdGlvbnM7XHJcblxyXG4gICAgICAgIGxldCBmb3JtID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1lZGl0LXRlYW0tcHJvZmlsZS1mb3JtJyk7XHJcbiAgICAgICAgZm9ybS5hZGRFdmVudExpc3RlbmVyKCdzdWJtaXQnLCBmdW5jdGlvbihldmVudCkge1xyXG4gICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cclxuICAgICAgICAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICB4aHIub3BlbignUE9TVCcsIG9wdGlvbnMuYXBpX3VybCArICd0ZWFtcy8nICsgZm9ybS5kYXRhc2V0LnRlYW1JZCk7XHJcbiAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHhocik7XHJcbiAgICAgICAgICAgICAgICBsZXQgcmVzcG9uc2UgPSBKU09OLnBhcnNlKHhoci5yZXNwb25zZSk7XHJcbiAgICAgICAgICAgICAgICBpZiAoeGhyLnN0YXR1cyA9PT0gMjAwKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi11cGRhdGUtcmVzcG9uc2UnKS5pbm5lckhUTUwgPSBgPGRpdiBjbGFzcz1cInRybi1hbGVydCB0cm4tYWxlcnQtc3VjY2Vzc1wiPjxzdHJvbmc+JHtvcHRpb25zLmxhbmd1YWdlLnN1Y2Nlc3N9ITwvc3Ryb25nPiAke29wdGlvbnMubGFuZ3VhZ2Uuc3VjY2Vzc19tZXNzYWdlfTwvZGl2PmA7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8vIFVwZGF0ZSB0aGUgdGVhbSBwcm9maWxlIGF2YXRhci5cclxuICAgICAgICAgICAgICAgICAgICBpZiAocmVzcG9uc2UuYXZhdGFyLmxlbmd0aCA+IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGF2YXRhclByZXZpZXcgPSBmb3JtLmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Byb2ZpbGUtcGljdHVyZScpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoYXZhdGFyUHJldmlldy5sZW5ndGggPT09IDEpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGF2YXRhclByZXZpZXdbMF0uc2V0QXR0cmlidXRlKCdzcmMnLCBvcHRpb25zLmF2YXRhcl91cGxvYWRfcGF0aCArIHJlc3BvbnNlLmF2YXRhcik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9IGVsc2UgaWYgKHhoci5zdGF0dXMgPT09IDQwOSkge1xyXG4gICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tdXBkYXRlLXJlc3BvbnNlJykuaW5uZXJIVE1MID0gYDxkaXYgY2xhc3M9XCJ0cm4tYWxlcnQgdHJuLWFsZXJ0LXdhcm5pbmdcIj48c3Ryb25nPiR7b3B0aW9ucy5sYW5ndWFnZS5mYWlsdXJlfTo8L3N0cm9uZz4gJHtlc2NhcGVIVE1MKHJlc3BvbnNlLm1lc3NhZ2UpfTwvZGl2PmA7XHJcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tdXBkYXRlLXJlc3BvbnNlJykuaW5uZXJIVE1MID0gYDxkaXYgY2xhc3M9XCJ0cm4tYWxlcnQgdHJuLWFsZXJ0LWRhbmdlclwiPjxzdHJvbmc+JHtvcHRpb25zLmxhbmd1YWdlLmZhaWx1cmV9Ojwvc3Ryb25nPiAke29wdGlvbnMubGFuZ3VhZ2UuZmFpbHVyZV9tZXNzYWdlfTwvZGl2PmA7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgICAgICB4aHIuc2VuZChuZXcgRm9ybURhdGEoZm9ybSkpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfSwgZmFsc2UpO1xyXG59KSh0cm4pOyJdLCJuYW1lcyI6WyJfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4iLCJ2YWx1ZSIsInJlcGxhY2UiLCJSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRSIsImVzY2FwZUFtcGVyc2FuZCIsImVzY2FwZVF1b3RhdGlvbk1hcmsiLCJlc2NhcGVMZXNzVGhhbiIsImVzY2FwZUF0dHJpYnV0ZSIsImVzY2FwZUhUTUwiLCJlc2NhcGVFZGl0YWJsZUhUTUwiLCJpc1ZhbGlkQXR0cmlidXRlTmFtZSIsIm5hbWUiLCJ0ZXN0IiwiX3R5cGVvZiIsIm8iLCJTeW1ib2wiLCJpdGVyYXRvciIsImNvbnN0cnVjdG9yIiwicHJvdG90eXBlIiwiX2NsYXNzQ2FsbENoZWNrIiwiYSIsIm4iLCJUeXBlRXJyb3IiLCJfZGVmaW5lUHJvcGVydGllcyIsImUiLCJyIiwidCIsImxlbmd0aCIsImVudW1lcmFibGUiLCJjb25maWd1cmFibGUiLCJ3cml0YWJsZSIsIk9iamVjdCIsImRlZmluZVByb3BlcnR5IiwiX3RvUHJvcGVydHlLZXkiLCJrZXkiLCJfY3JlYXRlQ2xhc3MiLCJpIiwiX3RvUHJpbWl0aXZlIiwidG9QcmltaXRpdmUiLCJjYWxsIiwiU3RyaW5nIiwiTnVtYmVyIiwiVG91cm5hbWF0Y2giLCJldmVudHMiLCJwYXJhbSIsIm9iamVjdCIsInByZWZpeCIsInN0ciIsInByb3AiLCJoYXNPd25Qcm9wZXJ0eSIsImsiLCJ2IiwicHVzaCIsImVuY29kZVVSSUNvbXBvbmVudCIsImpvaW4iLCJldmVudCIsImV2ZW50TmFtZSIsIkV2ZW50VGFyZ2V0IiwiYXV0b2NvbXBsZXRlIiwiaW5wdXQiLCJkYXRhQ2FsbGJhY2siLCJUb3VybmFtYXRjaF9BdXRvY29tcGxldGUiLCJ1Y2ZpcnN0IiwicyIsImNoYXJBdCIsInRvVXBwZXJDYXNlIiwic2xpY2UiLCJvcmRpbmFsX3N1ZmZpeCIsIm51bWJlciIsInJlbWFpbmRlciIsInRhYnMiLCJlbGVtZW50IiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsInBhbmVzIiwiZG9jdW1lbnQiLCJjbGVhckFjdGl2ZSIsIkFycmF5IiwiZm9yRWFjaCIsInRhYiIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFyaWFTZWxlY3RlZCIsInBhbmUiLCJzZXRBY3RpdmUiLCJ0YXJnZXRJZCIsInRhcmdldFRhYiIsInF1ZXJ5U2VsZWN0b3IiLCJ0YXJnZXRQYW5lSWQiLCJkYXRhc2V0IiwidGFyZ2V0IiwiYWRkIiwiZ2V0RWxlbWVudEJ5SWQiLCJ0YWJDbGljayIsImN1cnJlbnRUYXJnZXQiLCJwcmV2ZW50RGVmYXVsdCIsImFkZEV2ZW50TGlzdGVuZXIiLCJsb2NhdGlvbiIsImhhc2giLCJzdWJzdHIiLCJ3aW5kb3ciLCJ0cm5fb2JqX2luc3RhbmNlIiwidGFiVmlld3MiLCJmcm9tIiwidHJuIiwiZHJvcGRvd25zIiwiaGFuZGxlRHJvcGRvd25DbG9zZSIsImRyb3Bkb3duIiwibmV4dEVsZW1lbnRTaWJsaW5nIiwicmVtb3ZlRXZlbnRMaXN0ZW5lciIsInN0b3BQcm9wYWdhdGlvbiIsIl90aGlzIiwibmFtZUlucHV0IiwiYiIsInZhbCIsInBhcmVudCIsInBhcmVudE5vZGUiLCJ0aGVuIiwiZGF0YSIsImNvbnNvbGUiLCJsb2ciLCJjbG9zZUFsbExpc3RzIiwiY3VycmVudEZvY3VzIiwiY3JlYXRlRWxlbWVudCIsInNldEF0dHJpYnV0ZSIsImlkIiwiYXBwZW5kQ2hpbGQiLCJ0ZXh0IiwiaW5uZXJIVE1MIiwiY29uY2F0Iiwic2VsZWN0ZWRJZCIsImRpc3BhdGNoRXZlbnQiLCJFdmVudCIsIngiLCJnZXRFbGVtZW50c0J5VGFnTmFtZSIsImtleUNvZGUiLCJhZGRBY3RpdmUiLCJjbGljayIsInJlbW92ZUFjdGl2ZSIsInJlbW92ZUNoaWxkIiwiZm9ybWF0IiwiYXJncyIsImFyZ3VtZW50cyIsIm1hdGNoIiwiJCIsIm9wdGlvbnMiLCJ0cm5fdGVhbV9wcm9maWxlX29wdGlvbnMiLCJmb3JtIiwieGhyIiwiWE1MSHR0cFJlcXVlc3QiLCJvcGVuIiwiYXBpX3VybCIsInRlYW1JZCIsInNldFJlcXVlc3RIZWFkZXIiLCJyZXN0X25vbmNlIiwib25sb2FkIiwicmVzcG9uc2UiLCJKU09OIiwicGFyc2UiLCJzdGF0dXMiLCJsYW5ndWFnZSIsInN1Y2Nlc3MiLCJzdWNjZXNzX21lc3NhZ2UiLCJhdmF0YXIiLCJhdmF0YXJQcmV2aWV3IiwiYXZhdGFyX3VwbG9hZF9wYXRoIiwiZmFpbHVyZSIsIm1lc3NhZ2UiLCJmYWlsdXJlX21lc3NhZ2UiLCJzZW5kIiwiRm9ybURhdGEiXSwic291cmNlUm9vdCI6IiJ9
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
/*!*******************************!*\
  !*** ./src/js/admin/games.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../tournamatch.js */ "./src/js/tournamatch.js");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
/**
 * Admin manage games.
 *
 * @link       https://www.tournamatch.com
 * @since      3.18.0
 *
 * @package    Tournamatch
 *
 */


(function ($) {
  'use strict';

  window.addEventListener('load', function () {
    var options = trn_manage_games_options;
    var form = document.getElementById('trn-new-game-form');
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      if (form.checkValidity() === true) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', options.api_url + 'games/');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
        xhr.onload = function () {
          console.log(xhr);
          if (xhr.status === 201) {
            var new_game = JSON.parse(xhr.response);
            $.event('games').dispatchEvent(new Event('changed'));
            document.getElementById('trn-create-game-response').innerHTML = "<p class=\"notice notice-success\"><strong>".concat(options.language.success, ":</strong> ").concat(options.language.success_message.format((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(new_game.name)), "</p>");
            form.reset();
          } else {
            console.log(xhr.response);
            document.getElementById('trn-create-game-response').innerHTML = "<p class=\"notice notice-error\"><strong>".concat(options.language.failure, ":</strong> ").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(response.message), "</p>");
          }
        };
        xhr.send($.param({
          name: document.getElementById('trn-game-name').value,
          platform: document.getElementById('trn-game-platform').value,
          thumbnail_id: document.getElementById('trn-game-thumbnail').value || 0,
          banner_id: document.getElementById('trn-game-banner').value || 0
        }));
      }
    }, false);
    var old_games = document.getElementsByClassName('trn-admin-game-warning');
    if (old_games && 0 < old_games.length) {
      document.getElementById('trn-game-thumbnail-warning').classList.remove('d-none');
    } else {
      document.getElementById('trn-game-thumbnail-warning').classList.add('d-none');
    }
    Array.prototype.forEach.call(old_games, function (old_game) {
      old_game.parentNode.classList.add('trn-admin-game-thumbnail-warning');
    });
  }, false);
})(_tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiZ2FtZXMuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDZSxTQUFTQSwyQkFBMkJBLENBQUVDLEtBQUssRUFBRztFQUM1RCxPQUFPQSxLQUFLLENBQUNDLE9BQU8sQ0FBRSxJQUFJLEVBQUUsTUFBTyxDQUFDO0FBQ3JDOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUNkQTtBQUNBO0FBQ0E7QUFDMkQ7O0FBRTNEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxNQUFNQyw2QkFBNkIsR0FBRyxxQ0FBcUM7O0FBRTNFO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDTyxTQUFTQyxlQUFlQSxDQUFFSCxLQUFLLEVBQUc7RUFDeEMsT0FBT0EsS0FBSyxDQUFDQyxPQUFPLENBQUUseUNBQXlDLEVBQUUsT0FBUSxDQUFDO0FBQzNFOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ08sU0FBU0csbUJBQW1CQSxDQUFFSixLQUFLLEVBQUc7RUFDNUMsT0FBT0EsS0FBSyxDQUFDQyxPQUFPLENBQUUsSUFBSSxFQUFFLFFBQVMsQ0FBQztBQUN2Qzs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNPLFNBQVNJLGNBQWNBLENBQUVMLEtBQUssRUFBRztFQUN2QyxPQUFPQSxLQUFLLENBQUNDLE9BQU8sQ0FBRSxJQUFJLEVBQUUsTUFBTyxDQUFDO0FBQ3JDOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDTyxTQUFTSyxlQUFlQSxDQUFFTixLQUFLLEVBQUc7RUFDeEMsT0FBT0QsMkRBQTJCLENBQ2pDSyxtQkFBbUIsQ0FBRUQsZUFBZSxDQUFFSCxLQUFNLENBQUUsQ0FDL0MsQ0FBQztBQUNGOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNPLFNBQVNPLFVBQVVBLENBQUVQLEtBQUssRUFBRztFQUNuQyxPQUFPSyxjQUFjLENBQUVGLGVBQWUsQ0FBRUgsS0FBTSxDQUFFLENBQUM7QUFDbEQ7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ08sU0FBU1Esa0JBQWtCQSxDQUFFUixLQUFLLEVBQUc7RUFDM0MsT0FBT0ssY0FBYyxDQUFFTCxLQUFLLENBQUNDLE9BQU8sQ0FBRSxJQUFJLEVBQUUsT0FBUSxDQUFFLENBQUM7QUFDeEQ7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDTyxTQUFTUSxvQkFBb0JBLENBQUVDLElBQUksRUFBRztFQUM1QyxPQUFPLENBQUVSLDZCQUE2QixDQUFDUyxJQUFJLENBQUVELElBQUssQ0FBQztBQUNwRDs7Ozs7Ozs7Ozs7Ozs7QUMxSGE7O0FBQUEsU0FBQUUsUUFBQUMsQ0FBQSxzQ0FBQUQsT0FBQSx3QkFBQUUsTUFBQSx1QkFBQUEsTUFBQSxDQUFBQyxRQUFBLGFBQUFGLENBQUEsa0JBQUFBLENBQUEsZ0JBQUFBLENBQUEsV0FBQUEsQ0FBQSx5QkFBQUMsTUFBQSxJQUFBRCxDQUFBLENBQUFHLFdBQUEsS0FBQUYsTUFBQSxJQUFBRCxDQUFBLEtBQUFDLE1BQUEsQ0FBQUcsU0FBQSxxQkFBQUosQ0FBQSxLQUFBRCxPQUFBLENBQUFDLENBQUE7QUFBQSxTQUFBSyxnQkFBQUMsQ0FBQSxFQUFBQyxDQUFBLFVBQUFELENBQUEsWUFBQUMsQ0FBQSxhQUFBQyxTQUFBO0FBQUEsU0FBQUMsa0JBQUFDLENBQUEsRUFBQUMsQ0FBQSxhQUFBQyxDQUFBLE1BQUFBLENBQUEsR0FBQUQsQ0FBQSxDQUFBRSxNQUFBLEVBQUFELENBQUEsVUFBQVosQ0FBQSxHQUFBVyxDQUFBLENBQUFDLENBQUEsR0FBQVosQ0FBQSxDQUFBYyxVQUFBLEdBQUFkLENBQUEsQ0FBQWMsVUFBQSxRQUFBZCxDQUFBLENBQUFlLFlBQUEsa0JBQUFmLENBQUEsS0FBQUEsQ0FBQSxDQUFBZ0IsUUFBQSxRQUFBQyxNQUFBLENBQUFDLGNBQUEsQ0FBQVIsQ0FBQSxFQUFBUyxjQUFBLENBQUFuQixDQUFBLENBQUFvQixHQUFBLEdBQUFwQixDQUFBO0FBQUEsU0FBQXFCLGFBQUFYLENBQUEsRUFBQUMsQ0FBQSxFQUFBQyxDQUFBLFdBQUFELENBQUEsSUFBQUYsaUJBQUEsQ0FBQUMsQ0FBQSxDQUFBTixTQUFBLEVBQUFPLENBQUEsR0FBQUMsQ0FBQSxJQUFBSCxpQkFBQSxDQUFBQyxDQUFBLEVBQUFFLENBQUEsR0FBQUssTUFBQSxDQUFBQyxjQUFBLENBQUFSLENBQUEsaUJBQUFNLFFBQUEsU0FBQU4sQ0FBQTtBQUFBLFNBQUFTLGVBQUFQLENBQUEsUUFBQVUsQ0FBQSxHQUFBQyxZQUFBLENBQUFYLENBQUEsZ0NBQUFiLE9BQUEsQ0FBQXVCLENBQUEsSUFBQUEsQ0FBQSxHQUFBQSxDQUFBO0FBQUEsU0FBQUMsYUFBQVgsQ0FBQSxFQUFBRCxDQUFBLG9CQUFBWixPQUFBLENBQUFhLENBQUEsTUFBQUEsQ0FBQSxTQUFBQSxDQUFBLE1BQUFGLENBQUEsR0FBQUUsQ0FBQSxDQUFBWCxNQUFBLENBQUF1QixXQUFBLGtCQUFBZCxDQUFBLFFBQUFZLENBQUEsR0FBQVosQ0FBQSxDQUFBZSxJQUFBLENBQUFiLENBQUEsRUFBQUQsQ0FBQSxnQ0FBQVosT0FBQSxDQUFBdUIsQ0FBQSxVQUFBQSxDQUFBLFlBQUFkLFNBQUEseUVBQUFHLENBQUEsR0FBQWUsTUFBQSxHQUFBQyxNQUFBLEVBQUFmLENBQUE7QUFBQSxJQUNQZ0IsV0FBVztFQUViLFNBQUFBLFlBQUEsRUFBYztJQUFBdkIsZUFBQSxPQUFBdUIsV0FBQTtJQUNWLElBQUksQ0FBQ0MsTUFBTSxHQUFHLENBQUMsQ0FBQztFQUNwQjtFQUFDLE9BQUFSLFlBQUEsQ0FBQU8sV0FBQTtJQUFBUixHQUFBO0lBQUFqQyxLQUFBLEVBRUQsU0FBQTJDLE1BQU1DLE1BQU0sRUFBRUMsTUFBTSxFQUFFO01BQ2xCLElBQUlDLEdBQUcsR0FBRyxFQUFFO01BQ1osS0FBSyxJQUFJQyxJQUFJLElBQUlILE1BQU0sRUFBRTtRQUNyQixJQUFJQSxNQUFNLENBQUNJLGNBQWMsQ0FBQ0QsSUFBSSxDQUFDLEVBQUU7VUFDN0IsSUFBSUUsQ0FBQyxHQUFHSixNQUFNLEdBQUdBLE1BQU0sR0FBRyxHQUFHLEdBQUdFLElBQUksR0FBRyxHQUFHLEdBQUdBLElBQUk7VUFDakQsSUFBSUcsQ0FBQyxHQUFHTixNQUFNLENBQUNHLElBQUksQ0FBQztVQUNwQkQsR0FBRyxDQUFDSyxJQUFJLENBQUVELENBQUMsS0FBSyxJQUFJLElBQUl0QyxPQUFBLENBQU9zQyxDQUFDLE1BQUssUUFBUSxHQUFJLElBQUksQ0FBQ1AsS0FBSyxDQUFDTyxDQUFDLEVBQUVELENBQUMsQ0FBQyxHQUFHRyxrQkFBa0IsQ0FBQ0gsQ0FBQyxDQUFDLEdBQUcsR0FBRyxHQUFHRyxrQkFBa0IsQ0FBQ0YsQ0FBQyxDQUFDLENBQUM7UUFDNUg7TUFDSjtNQUNBLE9BQU9KLEdBQUcsQ0FBQ08sSUFBSSxDQUFDLEdBQUcsQ0FBQztJQUN4QjtFQUFDO0lBQUFwQixHQUFBO0lBQUFqQyxLQUFBLEVBRUQsU0FBQXNELE1BQU1DLFNBQVMsRUFBRTtNQUNiLElBQUksRUFBRUEsU0FBUyxJQUFJLElBQUksQ0FBQ2IsTUFBTSxDQUFDLEVBQUU7UUFDN0IsSUFBSSxDQUFDQSxNQUFNLENBQUNhLFNBQVMsQ0FBQyxHQUFHLElBQUlDLFdBQVcsQ0FBQ0QsU0FBUyxDQUFDO01BQ3ZEO01BQ0EsT0FBTyxJQUFJLENBQUNiLE1BQU0sQ0FBQ2EsU0FBUyxDQUFDO0lBQ2pDO0VBQUM7SUFBQXRCLEdBQUE7SUFBQWpDLEtBQUEsRUFFRCxTQUFBeUQsYUFBYUMsS0FBSyxFQUFFQyxZQUFZLEVBQUU7TUFDOUIsSUFBSUMsd0JBQXdCLENBQUNGLEtBQUssRUFBRUMsWUFBWSxDQUFDO0lBQ3JEO0VBQUM7SUFBQTFCLEdBQUE7SUFBQWpDLEtBQUEsRUFFRCxTQUFBNkQsUUFBUUMsQ0FBQyxFQUFFO01BQ1AsSUFBSSxPQUFPQSxDQUFDLEtBQUssUUFBUSxFQUFFLE9BQU8sRUFBRTtNQUNwQyxPQUFPQSxDQUFDLENBQUNDLE1BQU0sQ0FBQyxDQUFDLENBQUMsQ0FBQ0MsV0FBVyxDQUFDLENBQUMsR0FBR0YsQ0FBQyxDQUFDRyxLQUFLLENBQUMsQ0FBQyxDQUFDO0lBQ2pEO0VBQUM7SUFBQWhDLEdBQUE7SUFBQWpDLEtBQUEsRUFFRCxTQUFBa0UsZUFBZUMsTUFBTSxFQUFFO01BQ25CLElBQU1DLFNBQVMsR0FBR0QsTUFBTSxHQUFHLEdBQUc7TUFFOUIsSUFBS0MsU0FBUyxHQUFHLEVBQUUsSUFBTUEsU0FBUyxHQUFHLEVBQUcsRUFBRTtRQUN0QyxRQUFRQSxTQUFTLEdBQUcsRUFBRTtVQUNsQixLQUFLLENBQUM7WUFBRSxPQUFPLElBQUk7VUFDbkIsS0FBSyxDQUFDO1lBQUUsT0FBTyxJQUFJO1VBQ25CLEtBQUssQ0FBQztZQUFFLE9BQU8sSUFBSTtRQUN2QjtNQUNKO01BQ0EsT0FBTyxJQUFJO0lBQ2Y7RUFBQztJQUFBbkMsR0FBQTtJQUFBakMsS0FBQSxFQUVELFNBQUFxRSxLQUFLQyxPQUFPLEVBQUU7TUFDVixJQUFNRCxJQUFJLEdBQUdDLE9BQU8sQ0FBQ0Msc0JBQXNCLENBQUMsY0FBYyxDQUFDO01BQzNELElBQU1DLEtBQUssR0FBR0MsUUFBUSxDQUFDRixzQkFBc0IsQ0FBQyxjQUFjLENBQUM7TUFDN0QsSUFBTUcsV0FBVyxHQUFHLFNBQWRBLFdBQVdBLENBQUEsRUFBUztRQUN0QkMsS0FBSyxDQUFDMUQsU0FBUyxDQUFDMkQsT0FBTyxDQUFDdEMsSUFBSSxDQUFDK0IsSUFBSSxFQUFFLFVBQUNRLEdBQUcsRUFBSztVQUN4Q0EsR0FBRyxDQUFDQyxTQUFTLENBQUNDLE1BQU0sQ0FBQyxnQkFBZ0IsQ0FBQztVQUN0Q0YsR0FBRyxDQUFDRyxZQUFZLEdBQUcsS0FBSztRQUM1QixDQUFDLENBQUM7UUFDRkwsS0FBSyxDQUFDMUQsU0FBUyxDQUFDMkQsT0FBTyxDQUFDdEMsSUFBSSxDQUFDa0MsS0FBSyxFQUFFLFVBQUFTLElBQUk7VUFBQSxPQUFJQSxJQUFJLENBQUNILFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLGdCQUFnQixDQUFDO1FBQUEsRUFBQztNQUN4RixDQUFDO01BQ0QsSUFBTUcsU0FBUyxHQUFHLFNBQVpBLFNBQVNBLENBQUlDLFFBQVEsRUFBSztRQUM1QixJQUFNQyxTQUFTLEdBQUdYLFFBQVEsQ0FBQ1ksYUFBYSxDQUFDLFdBQVcsR0FBR0YsUUFBUSxHQUFHLGlCQUFpQixDQUFDO1FBQ3BGLElBQU1HLFlBQVksR0FBR0YsU0FBUyxJQUFJQSxTQUFTLENBQUNHLE9BQU8sSUFBSUgsU0FBUyxDQUFDRyxPQUFPLENBQUNDLE1BQU0sSUFBSSxLQUFLO1FBRXhGLElBQUlGLFlBQVksRUFBRTtVQUNkWixXQUFXLENBQUMsQ0FBQztVQUNiVSxTQUFTLENBQUNOLFNBQVMsQ0FBQ1csR0FBRyxDQUFDLGdCQUFnQixDQUFDO1VBQ3pDTCxTQUFTLENBQUNKLFlBQVksR0FBRyxJQUFJO1VBRTdCUCxRQUFRLENBQUNpQixjQUFjLENBQUNKLFlBQVksQ0FBQyxDQUFDUixTQUFTLENBQUNXLEdBQUcsQ0FBQyxnQkFBZ0IsQ0FBQztRQUN6RTtNQUNKLENBQUM7TUFDRCxJQUFNRSxRQUFRLEdBQUcsU0FBWEEsUUFBUUEsQ0FBSXJDLEtBQUssRUFBSztRQUN4QixJQUFNOEIsU0FBUyxHQUFHOUIsS0FBSyxDQUFDc0MsYUFBYTtRQUNyQyxJQUFNTixZQUFZLEdBQUdGLFNBQVMsSUFBSUEsU0FBUyxDQUFDRyxPQUFPLElBQUlILFNBQVMsQ0FBQ0csT0FBTyxDQUFDQyxNQUFNLElBQUksS0FBSztRQUV4RixJQUFJRixZQUFZLEVBQUU7VUFDZEosU0FBUyxDQUFDSSxZQUFZLENBQUM7VUFDdkJoQyxLQUFLLENBQUN1QyxjQUFjLENBQUMsQ0FBQztRQUMxQjtNQUNKLENBQUM7TUFFRGxCLEtBQUssQ0FBQzFELFNBQVMsQ0FBQzJELE9BQU8sQ0FBQ3RDLElBQUksQ0FBQytCLElBQUksRUFBRSxVQUFDUSxHQUFHLEVBQUs7UUFDeENBLEdBQUcsQ0FBQ2lCLGdCQUFnQixDQUFDLE9BQU8sRUFBRUgsUUFBUSxDQUFDO01BQzNDLENBQUMsQ0FBQztNQUVGLElBQUlJLFFBQVEsQ0FBQ0MsSUFBSSxFQUFFO1FBQ2ZkLFNBQVMsQ0FBQ2EsUUFBUSxDQUFDQyxJQUFJLENBQUNDLE1BQU0sQ0FBQyxDQUFDLENBQUMsQ0FBQztNQUN0QyxDQUFDLE1BQU0sSUFBSTVCLElBQUksQ0FBQzNDLE1BQU0sR0FBRyxDQUFDLEVBQUU7UUFDeEJ3RCxTQUFTLENBQUNiLElBQUksQ0FBQyxDQUFDLENBQUMsQ0FBQ2tCLE9BQU8sQ0FBQ0MsTUFBTSxDQUFDO01BQ3JDO0lBQ0o7RUFBQztBQUFBLEtBSUw7QUFDQSxJQUFJLENBQUNVLE1BQU0sQ0FBQ0MsZ0JBQWdCLEVBQUU7RUFDMUJELE1BQU0sQ0FBQ0MsZ0JBQWdCLEdBQUcsSUFBSTFELFdBQVcsQ0FBQyxDQUFDO0VBRTNDeUQsTUFBTSxDQUFDSixnQkFBZ0IsQ0FBQyxNQUFNLEVBQUUsWUFBWTtJQUV4QyxJQUFNTSxRQUFRLEdBQUczQixRQUFRLENBQUNGLHNCQUFzQixDQUFDLFNBQVMsQ0FBQztJQUUzREksS0FBSyxDQUFDMEIsSUFBSSxDQUFDRCxRQUFRLENBQUMsQ0FBQ3hCLE9BQU8sQ0FBQyxVQUFDQyxHQUFHLEVBQUs7TUFDbEN5QixHQUFHLENBQUNqQyxJQUFJLENBQUNRLEdBQUcsQ0FBQztJQUNqQixDQUFDLENBQUM7SUFFRixJQUFNMEIsU0FBUyxHQUFHOUIsUUFBUSxDQUFDRixzQkFBc0IsQ0FBQyxxQkFBcUIsQ0FBQztJQUN4RSxJQUFNaUMsbUJBQW1CLEdBQUcsU0FBdEJBLG1CQUFtQkEsQ0FBQSxFQUFTO01BQzlCN0IsS0FBSyxDQUFDMEIsSUFBSSxDQUFDRSxTQUFTLENBQUMsQ0FBQzNCLE9BQU8sQ0FBQyxVQUFDNkIsUUFBUSxFQUFLO1FBQ3hDQSxRQUFRLENBQUNDLGtCQUFrQixDQUFDNUIsU0FBUyxDQUFDQyxNQUFNLENBQUMsVUFBVSxDQUFDO01BQzVELENBQUMsQ0FBQztNQUNGTixRQUFRLENBQUNrQyxtQkFBbUIsQ0FBQyxPQUFPLEVBQUVILG1CQUFtQixFQUFFLEtBQUssQ0FBQztJQUNyRSxDQUFDO0lBRUQ3QixLQUFLLENBQUMwQixJQUFJLENBQUNFLFNBQVMsQ0FBQyxDQUFDM0IsT0FBTyxDQUFDLFVBQUM2QixRQUFRLEVBQUs7TUFDeENBLFFBQVEsQ0FBQ1gsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQVN2RSxDQUFDLEVBQUU7UUFDM0NBLENBQUMsQ0FBQ3FGLGVBQWUsQ0FBQyxDQUFDO1FBQ25CLElBQUksQ0FBQ0Ysa0JBQWtCLENBQUM1QixTQUFTLENBQUNXLEdBQUcsQ0FBQyxVQUFVLENBQUM7UUFDakRoQixRQUFRLENBQUNxQixnQkFBZ0IsQ0FBQyxPQUFPLEVBQUVVLG1CQUFtQixFQUFFLEtBQUssQ0FBQztNQUNsRSxDQUFDLEVBQUUsS0FBSyxDQUFDO0lBQ2IsQ0FBQyxDQUFDO0VBRU4sQ0FBQyxFQUFFLEtBQUssQ0FBQztBQUNiO0FBQ08sSUFBSUYsR0FBRyxHQUFHSixNQUFNLENBQUNDLGdCQUFnQjtBQUFDLElBRW5DdkMsd0JBQXdCO0VBRTFCO0VBQ0E7RUFDQTtFQUNBO0VBQ0E7O0VBRUEsU0FBQUEseUJBQVlGLEtBQUssRUFBRUMsWUFBWSxFQUFFO0lBQUEsSUFBQWtELEtBQUE7SUFBQTNGLGVBQUEsT0FBQTBDLHdCQUFBO0lBQzdCO0lBQ0EsSUFBSSxDQUFDa0QsU0FBUyxHQUFHcEQsS0FBSztJQUV0QixJQUFJLENBQUNvRCxTQUFTLENBQUNoQixnQkFBZ0IsQ0FBQyxPQUFPLEVBQUUsWUFBTTtNQUMzQyxJQUFJM0UsQ0FBQztRQUFFNEYsQ0FBQztRQUFFNUUsQ0FBQztRQUFFNkUsR0FBRyxHQUFHSCxLQUFJLENBQUNDLFNBQVMsQ0FBQzlHLEtBQUssQ0FBQztNQUN4QyxJQUFJaUgsTUFBTSxHQUFHSixLQUFJLENBQUNDLFNBQVMsQ0FBQ0ksVUFBVSxDQUFDOztNQUV2QztNQUNBO01BQ0E7TUFDQTtNQUNBO01BQ0E7TUFDQTtNQUNBO01BQ0E7TUFDQTtNQUNBO01BQ0E7TUFDQTtNQUNBO01BQ0E7TUFDQTtNQUNBdkQsWUFBWSxDQUFDcUQsR0FBRyxDQUFDLENBQUNHLElBQUksQ0FBQyxVQUFDQyxJQUFJLEVBQUs7UUFBQztRQUM5QkMsT0FBTyxDQUFDQyxHQUFHLENBQUNGLElBQUksQ0FBQzs7UUFFakI7UUFDQVAsS0FBSSxDQUFDVSxhQUFhLENBQUMsQ0FBQztRQUNwQixJQUFJLENBQUNQLEdBQUcsRUFBRTtVQUFFLE9BQU8sS0FBSztRQUFDO1FBQ3pCSCxLQUFJLENBQUNXLFlBQVksR0FBRyxDQUFDLENBQUM7O1FBRXRCO1FBQ0FyRyxDQUFDLEdBQUdzRCxRQUFRLENBQUNnRCxhQUFhLENBQUMsS0FBSyxDQUFDO1FBQ2pDdEcsQ0FBQyxDQUFDdUcsWUFBWSxDQUFDLElBQUksRUFBRWIsS0FBSSxDQUFDQyxTQUFTLENBQUNhLEVBQUUsR0FBRyxxQkFBcUIsQ0FBQztRQUMvRHhHLENBQUMsQ0FBQ3VHLFlBQVksQ0FBQyxPQUFPLEVBQUUseUJBQXlCLENBQUM7O1FBRWxEO1FBQ0FULE1BQU0sQ0FBQ1csV0FBVyxDQUFDekcsQ0FBQyxDQUFDOztRQUVyQjtRQUNBLEtBQUtnQixDQUFDLEdBQUcsQ0FBQyxFQUFFQSxDQUFDLEdBQUdpRixJQUFJLENBQUMxRixNQUFNLEVBQUVTLENBQUMsRUFBRSxFQUFFO1VBQzlCLElBQUkwRixJQUFJO1lBQUU3SCxLQUFLOztVQUVmO1VBQ0EsSUFBSVksT0FBQSxDQUFPd0csSUFBSSxDQUFDakYsQ0FBQyxDQUFDLE1BQUssUUFBUSxFQUFFO1lBQzdCMEYsSUFBSSxHQUFHVCxJQUFJLENBQUNqRixDQUFDLENBQUMsQ0FBQyxNQUFNLENBQUM7WUFDdEJuQyxLQUFLLEdBQUdvSCxJQUFJLENBQUNqRixDQUFDLENBQUMsQ0FBQyxPQUFPLENBQUM7VUFDNUIsQ0FBQyxNQUFNO1lBQ0gwRixJQUFJLEdBQUdULElBQUksQ0FBQ2pGLENBQUMsQ0FBQztZQUNkbkMsS0FBSyxHQUFHb0gsSUFBSSxDQUFDakYsQ0FBQyxDQUFDO1VBQ25COztVQUVBO1VBQ0EsSUFBSTBGLElBQUksQ0FBQzVCLE1BQU0sQ0FBQyxDQUFDLEVBQUVlLEdBQUcsQ0FBQ3RGLE1BQU0sQ0FBQyxDQUFDc0MsV0FBVyxDQUFDLENBQUMsS0FBS2dELEdBQUcsQ0FBQ2hELFdBQVcsQ0FBQyxDQUFDLEVBQUU7WUFDaEU7WUFDQStDLENBQUMsR0FBR3RDLFFBQVEsQ0FBQ2dELGFBQWEsQ0FBQyxLQUFLLENBQUM7WUFDakM7WUFDQVYsQ0FBQyxDQUFDZSxTQUFTLEdBQUcsVUFBVSxHQUFHRCxJQUFJLENBQUM1QixNQUFNLENBQUMsQ0FBQyxFQUFFZSxHQUFHLENBQUN0RixNQUFNLENBQUMsR0FBRyxXQUFXO1lBQ25FcUYsQ0FBQyxDQUFDZSxTQUFTLElBQUlELElBQUksQ0FBQzVCLE1BQU0sQ0FBQ2UsR0FBRyxDQUFDdEYsTUFBTSxDQUFDOztZQUV0QztZQUNBcUYsQ0FBQyxDQUFDZSxTQUFTLElBQUksOEJBQThCLEdBQUc5SCxLQUFLLEdBQUcsSUFBSTtZQUU1RCtHLENBQUMsQ0FBQ3hCLE9BQU8sQ0FBQ3ZGLEtBQUssR0FBR0EsS0FBSztZQUN2QitHLENBQUMsQ0FBQ3hCLE9BQU8sQ0FBQ3NDLElBQUksR0FBR0EsSUFBSTs7WUFFckI7WUFDQWQsQ0FBQyxDQUFDakIsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQUN2RSxDQUFDLEVBQUs7Y0FDL0I4RixPQUFPLENBQUNDLEdBQUcsNEJBQUFTLE1BQUEsQ0FBNEJ4RyxDQUFDLENBQUNxRSxhQUFhLENBQUNMLE9BQU8sQ0FBQ3ZGLEtBQUssQ0FBRSxDQUFDOztjQUV2RTtjQUNBNkcsS0FBSSxDQUFDQyxTQUFTLENBQUM5RyxLQUFLLEdBQUd1QixDQUFDLENBQUNxRSxhQUFhLENBQUNMLE9BQU8sQ0FBQ3NDLElBQUk7Y0FDbkRoQixLQUFJLENBQUNDLFNBQVMsQ0FBQ3ZCLE9BQU8sQ0FBQ3lDLFVBQVUsR0FBR3pHLENBQUMsQ0FBQ3FFLGFBQWEsQ0FBQ0wsT0FBTyxDQUFDdkYsS0FBSzs7Y0FFakU7Y0FDQTZHLEtBQUksQ0FBQ1UsYUFBYSxDQUFDLENBQUM7Y0FFcEJWLEtBQUksQ0FBQ0MsU0FBUyxDQUFDbUIsYUFBYSxDQUFDLElBQUlDLEtBQUssQ0FBQyxRQUFRLENBQUMsQ0FBQztZQUNyRCxDQUFDLENBQUM7WUFDRi9HLENBQUMsQ0FBQ3lHLFdBQVcsQ0FBQ2IsQ0FBQyxDQUFDO1VBQ3BCO1FBQ0o7TUFDSixDQUFDLENBQUM7SUFDTixDQUFDLENBQUM7O0lBRUY7SUFDQSxJQUFJLENBQUNELFNBQVMsQ0FBQ2hCLGdCQUFnQixDQUFDLFNBQVMsRUFBRSxVQUFDdkUsQ0FBQyxFQUFLO01BQzlDLElBQUk0RyxDQUFDLEdBQUcxRCxRQUFRLENBQUNpQixjQUFjLENBQUNtQixLQUFJLENBQUNDLFNBQVMsQ0FBQ2EsRUFBRSxHQUFHLHFCQUFxQixDQUFDO01BQzFFLElBQUlRLENBQUMsRUFBRUEsQ0FBQyxHQUFHQSxDQUFDLENBQUNDLG9CQUFvQixDQUFDLEtBQUssQ0FBQztNQUN4QyxJQUFJN0csQ0FBQyxDQUFDOEcsT0FBTyxLQUFLLEVBQUUsRUFBRTtRQUNsQjtBQUNoQjtRQUNnQnhCLEtBQUksQ0FBQ1csWUFBWSxFQUFFO1FBQ25CO1FBQ0FYLEtBQUksQ0FBQ3lCLFNBQVMsQ0FBQ0gsQ0FBQyxDQUFDO01BQ3JCLENBQUMsTUFBTSxJQUFJNUcsQ0FBQyxDQUFDOEcsT0FBTyxLQUFLLEVBQUUsRUFBRTtRQUFFO1FBQzNCO0FBQ2hCO1FBQ2dCeEIsS0FBSSxDQUFDVyxZQUFZLEVBQUU7UUFDbkI7UUFDQVgsS0FBSSxDQUFDeUIsU0FBUyxDQUFDSCxDQUFDLENBQUM7TUFDckIsQ0FBQyxNQUFNLElBQUk1RyxDQUFDLENBQUM4RyxPQUFPLEtBQUssRUFBRSxFQUFFO1FBQ3pCO1FBQ0E5RyxDQUFDLENBQUNzRSxjQUFjLENBQUMsQ0FBQztRQUNsQixJQUFJZ0IsS0FBSSxDQUFDVyxZQUFZLEdBQUcsQ0FBQyxDQUFDLEVBQUU7VUFDeEI7VUFDQSxJQUFJVyxDQUFDLEVBQUVBLENBQUMsQ0FBQ3RCLEtBQUksQ0FBQ1csWUFBWSxDQUFDLENBQUNlLEtBQUssQ0FBQyxDQUFDO1FBQ3ZDO01BQ0o7SUFDSixDQUFDLENBQUM7O0lBRUY7SUFDQTlELFFBQVEsQ0FBQ3FCLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFDdkUsQ0FBQyxFQUFLO01BQ3RDc0YsS0FBSSxDQUFDVSxhQUFhLENBQUNoRyxDQUFDLENBQUNpRSxNQUFNLENBQUM7SUFDaEMsQ0FBQyxDQUFDO0VBQ047RUFBQyxPQUFBdEQsWUFBQSxDQUFBMEIsd0JBQUE7SUFBQTNCLEdBQUE7SUFBQWpDLEtBQUEsRUFFRCxTQUFBc0ksVUFBVUgsQ0FBQyxFQUFFO01BQ1Q7TUFDQSxJQUFJLENBQUNBLENBQUMsRUFBRSxPQUFPLEtBQUs7TUFDcEI7TUFDQSxJQUFJLENBQUNLLFlBQVksQ0FBQ0wsQ0FBQyxDQUFDO01BQ3BCLElBQUksSUFBSSxDQUFDWCxZQUFZLElBQUlXLENBQUMsQ0FBQ3pHLE1BQU0sRUFBRSxJQUFJLENBQUM4RixZQUFZLEdBQUcsQ0FBQztNQUN4RCxJQUFJLElBQUksQ0FBQ0EsWUFBWSxHQUFHLENBQUMsRUFBRSxJQUFJLENBQUNBLFlBQVksR0FBSVcsQ0FBQyxDQUFDekcsTUFBTSxHQUFHLENBQUU7TUFDN0Q7TUFDQXlHLENBQUMsQ0FBQyxJQUFJLENBQUNYLFlBQVksQ0FBQyxDQUFDMUMsU0FBUyxDQUFDVyxHQUFHLENBQUMsMEJBQTBCLENBQUM7SUFDbEU7RUFBQztJQUFBeEQsR0FBQTtJQUFBakMsS0FBQSxFQUVELFNBQUF3SSxhQUFhTCxDQUFDLEVBQUU7TUFDWjtNQUNBLEtBQUssSUFBSWhHLENBQUMsR0FBRyxDQUFDLEVBQUVBLENBQUMsR0FBR2dHLENBQUMsQ0FBQ3pHLE1BQU0sRUFBRVMsQ0FBQyxFQUFFLEVBQUU7UUFDL0JnRyxDQUFDLENBQUNoRyxDQUFDLENBQUMsQ0FBQzJDLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLDBCQUEwQixDQUFDO01BQ3JEO0lBQ0o7RUFBQztJQUFBOUMsR0FBQTtJQUFBakMsS0FBQSxFQUVELFNBQUF1SCxjQUFjakQsT0FBTyxFQUFFO01BQ25CK0MsT0FBTyxDQUFDQyxHQUFHLENBQUMsaUJBQWlCLENBQUM7TUFDOUI7QUFDUjtNQUNRLElBQUlhLENBQUMsR0FBRzFELFFBQVEsQ0FBQ0Ysc0JBQXNCLENBQUMseUJBQXlCLENBQUM7TUFDbEUsS0FBSyxJQUFJcEMsQ0FBQyxHQUFHLENBQUMsRUFBRUEsQ0FBQyxHQUFHZ0csQ0FBQyxDQUFDekcsTUFBTSxFQUFFUyxDQUFDLEVBQUUsRUFBRTtRQUMvQixJQUFJbUMsT0FBTyxLQUFLNkQsQ0FBQyxDQUFDaEcsQ0FBQyxDQUFDLElBQUltQyxPQUFPLEtBQUssSUFBSSxDQUFDd0MsU0FBUyxFQUFFO1VBQ2hEcUIsQ0FBQyxDQUFDaEcsQ0FBQyxDQUFDLENBQUMrRSxVQUFVLENBQUN1QixXQUFXLENBQUNOLENBQUMsQ0FBQ2hHLENBQUMsQ0FBQyxDQUFDO1FBQ3JDO01BQ0o7SUFDSjtFQUFDO0FBQUEsS0FHTDtBQUNBLElBQUksQ0FBQ0ksTUFBTSxDQUFDdEIsU0FBUyxDQUFDeUgsTUFBTSxFQUFFO0VBQzFCbkcsTUFBTSxDQUFDdEIsU0FBUyxDQUFDeUgsTUFBTSxHQUFHLFlBQVc7SUFDakMsSUFBTUMsSUFBSSxHQUFHQyxTQUFTO0lBQ3RCLE9BQU8sSUFBSSxDQUFDM0ksT0FBTyxDQUFDLFVBQVUsRUFBRSxVQUFTNEksS0FBSyxFQUFFMUUsTUFBTSxFQUFFO01BQ3BELE9BQU8sT0FBT3dFLElBQUksQ0FBQ3hFLE1BQU0sQ0FBQyxLQUFLLFdBQVcsR0FDcEN3RSxJQUFJLENBQUN4RSxNQUFNLENBQUMsR0FDWjBFLEtBQUs7SUFFZixDQUFDLENBQUM7RUFDTixDQUFDO0FBQ0w7Ozs7OztVQ3JTQTtVQUNBOztVQUVBO1VBQ0E7VUFDQTtVQUNBO1VBQ0E7VUFDQTtVQUNBO1VBQ0E7VUFDQTtVQUNBO1VBQ0E7VUFDQTtVQUNBOztVQUVBO1VBQ0E7O1VBRUE7VUFDQTtVQUNBOzs7OztXQ3RCQTtXQUNBO1dBQ0E7V0FDQTtXQUNBLHlDQUF5Qyx3Q0FBd0M7V0FDakY7V0FDQTtXQUNBOzs7OztXQ1BBOzs7OztXQ0FBO1dBQ0E7V0FDQTtXQUNBLHVEQUF1RCxpQkFBaUI7V0FDeEU7V0FDQSxnREFBZ0QsYUFBYTtXQUM3RDs7Ozs7Ozs7Ozs7OztBQ05BO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUMwQztBQUNVO0FBRXBELENBQUMsVUFBVUMsQ0FBQyxFQUFFO0VBQ1YsWUFBWTs7RUFFWjVDLE1BQU0sQ0FBQ0osZ0JBQWdCLENBQUMsTUFBTSxFQUFFLFlBQVk7SUFDeEMsSUFBSWlELE9BQU8sR0FBR0Msd0JBQXdCO0lBRXRDLElBQUlDLElBQUksR0FBR3hFLFFBQVEsQ0FBQ2lCLGNBQWMsQ0FBQyxtQkFBbUIsQ0FBQztJQUN2RHVELElBQUksQ0FBQ25ELGdCQUFnQixDQUFDLFFBQVEsRUFBRSxVQUFVeEMsS0FBSyxFQUFFO01BQzdDQSxLQUFLLENBQUN1QyxjQUFjLENBQUMsQ0FBQztNQUV0QixJQUFJb0QsSUFBSSxDQUFDQyxhQUFhLENBQUMsQ0FBQyxLQUFLLElBQUksRUFBRTtRQUMvQixJQUFJQyxHQUFHLEdBQUcsSUFBSUMsY0FBYyxDQUFDLENBQUM7UUFDOUJELEdBQUcsQ0FBQ0UsSUFBSSxDQUFDLE1BQU0sRUFBRU4sT0FBTyxDQUFDTyxPQUFPLEdBQUcsUUFBUSxDQUFDO1FBQzVDSCxHQUFHLENBQUNJLGdCQUFnQixDQUFDLGNBQWMsRUFBRSxtQ0FBbUMsQ0FBQztRQUN6RUosR0FBRyxDQUFDSSxnQkFBZ0IsQ0FBQyxZQUFZLEVBQUVSLE9BQU8sQ0FBQ1MsVUFBVSxDQUFDO1FBQ3RETCxHQUFHLENBQUNNLE1BQU0sR0FBRyxZQUFZO1VBQ3JCcEMsT0FBTyxDQUFDQyxHQUFHLENBQUM2QixHQUFHLENBQUM7VUFDaEIsSUFBSUEsR0FBRyxDQUFDTyxNQUFNLEtBQUssR0FBRyxFQUFFO1lBQ3BCLElBQUlDLFFBQVEsR0FBR0MsSUFBSSxDQUFDQyxLQUFLLENBQUNWLEdBQUcsQ0FBQ1csUUFBUSxDQUFDO1lBQ3ZDaEIsQ0FBQyxDQUFDeEYsS0FBSyxDQUFDLE9BQU8sQ0FBQyxDQUFDMkUsYUFBYSxDQUFDLElBQUlDLEtBQUssQ0FBQyxTQUFTLENBQUMsQ0FBQztZQUNwRHpELFFBQVEsQ0FBQ2lCLGNBQWMsQ0FBQywwQkFBMEIsQ0FBQyxDQUFDb0MsU0FBUyxpREFBQUMsTUFBQSxDQUErQ2dCLE9BQU8sQ0FBQ2dCLFFBQVEsQ0FBQ0MsT0FBTyxpQkFBQWpDLE1BQUEsQ0FBY2dCLE9BQU8sQ0FBQ2dCLFFBQVEsQ0FBQ0UsZUFBZSxDQUFDdkIsTUFBTSxDQUFDbkksa0VBQVUsQ0FBQ29KLFFBQVEsQ0FBQ2pKLElBQUksQ0FBQyxDQUFDLFNBQU07WUFDMU51SSxJQUFJLENBQUNpQixLQUFLLENBQUMsQ0FBQztVQUNoQixDQUFDLE1BQU07WUFDSDdDLE9BQU8sQ0FBQ0MsR0FBRyxDQUFDNkIsR0FBRyxDQUFDVyxRQUFRLENBQUM7WUFDekJyRixRQUFRLENBQUNpQixjQUFjLENBQUMsMEJBQTBCLENBQUMsQ0FBQ29DLFNBQVMsK0NBQUFDLE1BQUEsQ0FBNkNnQixPQUFPLENBQUNnQixRQUFRLENBQUNJLE9BQU8saUJBQUFwQyxNQUFBLENBQWN4SCxrRUFBVSxDQUFDdUosUUFBUSxDQUFDTSxPQUFPLENBQUMsU0FBTTtVQUN0TDtRQUNKLENBQUM7UUFFRGpCLEdBQUcsQ0FBQ2tCLElBQUksQ0FBQ3ZCLENBQUMsQ0FBQ25HLEtBQUssQ0FBQztVQUNiakMsSUFBSSxFQUFFK0QsUUFBUSxDQUFDaUIsY0FBYyxDQUFDLGVBQWUsQ0FBQyxDQUFDMUYsS0FBSztVQUNwRHNLLFFBQVEsRUFBRTdGLFFBQVEsQ0FBQ2lCLGNBQWMsQ0FBQyxtQkFBbUIsQ0FBQyxDQUFDMUYsS0FBSztVQUM1RHVLLFlBQVksRUFBRTlGLFFBQVEsQ0FBQ2lCLGNBQWMsQ0FBQyxvQkFBb0IsQ0FBQyxDQUFDMUYsS0FBSyxJQUFJLENBQUM7VUFDdEV3SyxTQUFTLEVBQUUvRixRQUFRLENBQUNpQixjQUFjLENBQUMsaUJBQWlCLENBQUMsQ0FBQzFGLEtBQUssSUFBSTtRQUNuRSxDQUFDLENBQUMsQ0FBQztNQUNQO0lBQ0osQ0FBQyxFQUFFLEtBQUssQ0FBQztJQUdULElBQUl5SyxTQUFTLEdBQUdoRyxRQUFRLENBQUNGLHNCQUFzQixDQUFDLHdCQUF3QixDQUFDO0lBQ3pFLElBQUlrRyxTQUFTLElBQU0sQ0FBQyxHQUFHQSxTQUFTLENBQUMvSSxNQUFPLEVBQUU7TUFDdEMrQyxRQUFRLENBQUNpQixjQUFjLENBQUMsNEJBQTRCLENBQUMsQ0FBQ1osU0FBUyxDQUFDQyxNQUFNLENBQUMsUUFBUSxDQUFDO0lBQ3BGLENBQUMsTUFBTTtNQUNITixRQUFRLENBQUNpQixjQUFjLENBQUMsNEJBQTRCLENBQUMsQ0FBQ1osU0FBUyxDQUFDVyxHQUFHLENBQUMsUUFBUSxDQUFDO0lBQ2pGO0lBQ0FkLEtBQUssQ0FBQzFELFNBQVMsQ0FBQzJELE9BQU8sQ0FBQ3RDLElBQUksQ0FBQ21JLFNBQVMsRUFBRSxVQUFTQyxRQUFRLEVBQUU7TUFDdkRBLFFBQVEsQ0FBQ3hELFVBQVUsQ0FBQ3BDLFNBQVMsQ0FBQ1csR0FBRyxDQUFDLGtDQUFrQyxDQUFDO0lBQ3pFLENBQUMsQ0FBQztFQUNOLENBQUMsRUFBRSxLQUFLLENBQUM7QUFDYixDQUFDLEVBQUVhLGdEQUFHLENBQUMsQyIsInNvdXJjZXMiOlsid2VicGFjazovL3RvdXJuYW1hdGNoL0B3b3JkcHJlc3MvZXNjYXBlLWh0bWwvc3JjL2VzY2FwZS1ncmVhdGVyLmpzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL0B3b3JkcHJlc3MvZXNjYXBlLWh0bWwvc3JjL2luZGV4LmpzIiwid2VicGFjazovL3RvdXJuYW1hdGNoLy4vc3JjL2pzL3RvdXJuYW1hdGNoLmpzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svYm9vdHN0cmFwIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9kZWZpbmUgcHJvcGVydHkgZ2V0dGVycyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvaGFzT3duUHJvcGVydHkgc2hvcnRoYW5kIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9tYWtlIG5hbWVzcGFjZSBvYmplY3QiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvLi9zcmMvanMvYWRtaW4vZ2FtZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggZ3JlYXRlci10aGFuIHNpZ24gcmVwbGFjZWQuXG4gKlxuICogTm90ZSB0aGF0IGlmIGEgcmVzb2x1dGlvbiBmb3IgVHJhYyM0NTM4NyBjb21lcyB0byBmcnVpdGlvbiwgaXQgaXMgbm8gbG9uZ2VyXG4gKiBuZWNlc3NhcnkgZm9yIGBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW5gIHRvIGV4aXN0LlxuICpcbiAqIFNlZTogaHR0cHM6Ly9jb3JlLnRyYWMud29yZHByZXNzLm9yZy90aWNrZXQvNDUzODdcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbiggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvPi9nLCAnJmd0OycgKTtcbn1cbiIsIi8qKlxuICogSW50ZXJuYWwgZGVwZW5kZW5jaWVzXG4gKi9cbmltcG9ydCBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4gZnJvbSAnLi9lc2NhcGUtZ3JlYXRlcic7XG5cbi8qKlxuICogUmVndWxhciBleHByZXNzaW9uIG1hdGNoaW5nIGludmFsaWQgYXR0cmlidXRlIG5hbWVzLlxuICpcbiAqIFwiQXR0cmlidXRlIG5hbWVzIG11c3QgY29uc2lzdCBvZiBvbmUgb3IgbW9yZSBjaGFyYWN0ZXJzIG90aGVyIHRoYW4gY29udHJvbHMsXG4gKiBVKzAwMjAgU1BBQ0UsIFUrMDAyMiAoXCIpLCBVKzAwMjcgKCcpLCBVKzAwM0UgKD4pLCBVKzAwMkYgKC8pLCBVKzAwM0QgKD0pLFxuICogYW5kIG5vbmNoYXJhY3RlcnMuXCJcbiAqXG4gKiBAc2VlIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3N5bnRheC5odG1sI2F0dHJpYnV0ZXMtMlxuICpcbiAqIEB0eXBlIHtSZWdFeHB9XG4gKi9cbmNvbnN0IFJFR0VYUF9JTlZBTElEX0FUVFJJQlVURV9OQU1FID0gL1tcXHUwMDdGLVxcdTAwOUYgXCInPi89XCJcXHVGREQwLVxcdUZERUZdLztcblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggYW1wZXJzYW5kcyBlc2NhcGVkLiBOb3RlIHRoYXQgdGhpcyBpcyBhbiBpbXBlcmZlY3RcbiAqIGltcGxlbWVudGF0aW9uLCB3aGVyZSBvbmx5IGFtcGVyc2FuZHMgd2hpY2ggZG8gbm90IGFwcGVhciBhcyBhIHBhdHRlcm4gb2ZcbiAqIG5hbWVkLCBkZWNpbWFsLCBvciBoZXhhZGVjaW1hbCBjaGFyYWN0ZXIgcmVmZXJlbmNlcyBhcmUgZXNjYXBlZC4gSW52YWxpZFxuICogbmFtZWQgcmVmZXJlbmNlcyAoaS5lLiBhbWJpZ3VvdXMgYW1wZXJzYW5kKSBhcmUgc3RpbGwgcGVybWl0dGVkLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjY2hhcmFjdGVyLXJlZmVyZW5jZXNcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjYW1iaWd1b3VzLWFtcGVyc2FuZFxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNuYW1lZC1jaGFyYWN0ZXItcmVmZXJlbmNlc1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvJig/IShbYS16MC05XSt8I1swLTldK3wjeFthLWYwLTldKyk7KS9naSwgJyZhbXA7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBxdW90YXRpb24gbWFya3MgcmVwbGFjZWQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlUXVvdGF0aW9uTWFyayggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvXCIvZywgJyZxdW90OycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggbGVzcy10aGFuIHNpZ24gcmVwbGFjZWQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlTGVzc1RoYW4oIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLzwvZywgJyZsdDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIGF0dHJpYnV0ZSB2YWx1ZS5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2VsZW1lbnRzLWF0dHJpYnV0ZXNcbiAqXG4gKiBcIlsuLi5dIHRoZSB0ZXh0IGNhbm5vdCBjb250YWluIGFuIGFtYmlndW91cyBhbXBlcnNhbmQgWy4uLl0gbXVzdCBub3QgY29udGFpblxuICogYW55IGxpdGVyYWwgVSswMDIyIFFVT1RBVElPTiBNQVJLIGNoYXJhY3RlcnMgKFwiKVwiXG4gKlxuICogTm90ZSB3ZSBhbHNvIGVzY2FwZSB0aGUgZ3JlYXRlciB0aGFuIHN5bWJvbCwgYXMgdGhpcyBpcyB1c2VkIGJ5IHdwdGV4dHVyaXplIHRvXG4gKiBzcGxpdCBIVE1MIHN0cmluZ3MuIFRoaXMgaXMgYSBXb3JkUHJlc3Mgc3BlY2lmaWMgZml4XG4gKlxuICogTm90ZSB0aGF0IGlmIGEgcmVzb2x1dGlvbiBmb3IgVHJhYyM0NTM4NyBjb21lcyB0byBmcnVpdGlvbiwgaXQgaXMgbm8gbG9uZ2VyXG4gKiBuZWNlc3NhcnkgZm9yIGBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW5gIHRvIGJlIHVzZWQuXG4gKlxuICogU2VlOiBodHRwczovL2NvcmUudHJhYy53b3JkcHJlc3Mub3JnL3RpY2tldC80NTM4N1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBBdHRyaWJ1dGUgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIGF0dHJpYnV0ZSB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUF0dHJpYnV0ZSggdmFsdWUgKSB7XG5cdHJldHVybiBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4oXG5cdFx0ZXNjYXBlUXVvdGF0aW9uTWFyayggZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApIClcblx0KTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGFuIGVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjd3JpdGluZy1odG1sLWRvY3VtZW50cy1lbGVtZW50c1xuICpcbiAqIFwidGhlIHRleHQgbXVzdCBub3QgY29udGFpbiB0aGUgY2hhcmFjdGVyIFUrMDAzQyBMRVNTLVRIQU4gU0lHTiAoPCkgb3IgYW5cbiAqIGFtYmlndW91cyBhbXBlcnNhbmQuXCJcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgRWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlSFRNTCggdmFsdWUgKSB7XG5cdHJldHVybiBlc2NhcGVMZXNzVGhhbiggZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIEVkaXRhYmxlIEhUTUwgZWxlbWVudCB2YWx1ZS4gVGhpcyBpcyBkaWZmZXJlbnQgZnJvbVxuICogYGVzY2FwZUhUTUxgLCBiZWNhdXNlIGZvciBlZGl0YWJsZSBIVE1MLCBBTEwgYW1wZXJzYW5kcyBtdXN0IGJlIGVzY2FwZWQgaW5cbiAqIG9yZGVyIHRvIHJlbmRlciB0aGUgY29udGVudCBjb3JyZWN0bHkgb24gdGhlIHBhZ2UuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUVkaXRhYmxlSFRNTCggdmFsdWUgKSB7XG5cdHJldHVybiBlc2NhcGVMZXNzVGhhbiggdmFsdWUucmVwbGFjZSggLyYvZywgJyZhbXA7JyApICk7XG59XG5cbi8qKlxuICogUmV0dXJucyB0cnVlIGlmIHRoZSBnaXZlbiBhdHRyaWJ1dGUgbmFtZSBpcyB2YWxpZCwgb3IgZmFsc2Ugb3RoZXJ3aXNlLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSBuYW1lIEF0dHJpYnV0ZSBuYW1lIHRvIHRlc3QuXG4gKlxuICogQHJldHVybiB7Ym9vbGVhbn0gV2hldGhlciBhdHRyaWJ1dGUgaXMgdmFsaWQuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBpc1ZhbGlkQXR0cmlidXRlTmFtZSggbmFtZSApIHtcblx0cmV0dXJuICEgUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUudGVzdCggbmFtZSApO1xufVxuIiwiJ3VzZSBzdHJpY3QnO1xyXG5jbGFzcyBUb3VybmFtYXRjaCB7XHJcblxyXG4gICAgY29uc3RydWN0b3IoKSB7XHJcbiAgICAgICAgdGhpcy5ldmVudHMgPSB7fTtcclxuICAgIH1cclxuXHJcbiAgICBwYXJhbShvYmplY3QsIHByZWZpeCkge1xyXG4gICAgICAgIGxldCBzdHIgPSBbXTtcclxuICAgICAgICBmb3IgKGxldCBwcm9wIGluIG9iamVjdCkge1xyXG4gICAgICAgICAgICBpZiAob2JqZWN0Lmhhc093blByb3BlcnR5KHByb3ApKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgayA9IHByZWZpeCA/IHByZWZpeCArIFwiW1wiICsgcHJvcCArIFwiXVwiIDogcHJvcDtcclxuICAgICAgICAgICAgICAgIGxldCB2ID0gb2JqZWN0W3Byb3BdO1xyXG4gICAgICAgICAgICAgICAgc3RyLnB1c2goKHYgIT09IG51bGwgJiYgdHlwZW9mIHYgPT09IFwib2JqZWN0XCIpID8gdGhpcy5wYXJhbSh2LCBrKSA6IGVuY29kZVVSSUNvbXBvbmVudChrKSArIFwiPVwiICsgZW5jb2RlVVJJQ29tcG9uZW50KHYpKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gc3RyLmpvaW4oXCImXCIpO1xyXG4gICAgfVxyXG5cclxuICAgIGV2ZW50KGV2ZW50TmFtZSkge1xyXG4gICAgICAgIGlmICghKGV2ZW50TmFtZSBpbiB0aGlzLmV2ZW50cykpIHtcclxuICAgICAgICAgICAgdGhpcy5ldmVudHNbZXZlbnROYW1lXSA9IG5ldyBFdmVudFRhcmdldChldmVudE5hbWUpO1xyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gdGhpcy5ldmVudHNbZXZlbnROYW1lXTtcclxuICAgIH1cclxuXHJcbiAgICBhdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIG5ldyBUb3VybmFtYXRjaF9BdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjayk7XHJcbiAgICB9XHJcblxyXG4gICAgdWNmaXJzdChzKSB7XHJcbiAgICAgICAgaWYgKHR5cGVvZiBzICE9PSAnc3RyaW5nJykgcmV0dXJuICcnO1xyXG4gICAgICAgIHJldHVybiBzLmNoYXJBdCgwKS50b1VwcGVyQ2FzZSgpICsgcy5zbGljZSgxKTtcclxuICAgIH1cclxuXHJcbiAgICBvcmRpbmFsX3N1ZmZpeChudW1iZXIpIHtcclxuICAgICAgICBjb25zdCByZW1haW5kZXIgPSBudW1iZXIgJSAxMDA7XHJcblxyXG4gICAgICAgIGlmICgocmVtYWluZGVyIDwgMTEpIHx8IChyZW1haW5kZXIgPiAxMykpIHtcclxuICAgICAgICAgICAgc3dpdGNoIChyZW1haW5kZXIgJSAxMCkge1xyXG4gICAgICAgICAgICAgICAgY2FzZSAxOiByZXR1cm4gJ3N0JztcclxuICAgICAgICAgICAgICAgIGNhc2UgMjogcmV0dXJuICduZCc7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDM6IHJldHVybiAncmQnO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiAndGgnO1xyXG4gICAgfVxyXG5cclxuICAgIHRhYnMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnN0IHRhYnMgPSBlbGVtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1uYXYtbGluaycpO1xyXG4gICAgICAgIGNvbnN0IHBhbmVzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLXRhYi1wYW5lJyk7XHJcbiAgICAgICAgY29uc3QgY2xlYXJBY3RpdmUgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwodGFicywgKHRhYikgPT4ge1xyXG4gICAgICAgICAgICAgICAgdGFiLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YWIuYXJpYVNlbGVjdGVkID0gZmFsc2U7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHBhbmVzLCBwYW5lID0+IHBhbmUuY2xhc3NMaXN0LnJlbW92ZSgndHJuLXRhYi1hY3RpdmUnKSk7XHJcbiAgICAgICAgfTtcclxuICAgICAgICBjb25zdCBzZXRBY3RpdmUgPSAodGFyZ2V0SWQpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0VGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignYVtocmVmPVwiIycgKyB0YXJnZXRJZCArICdcIl0udHJuLW5hdi1saW5rJyk7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBjbGVhckFjdGl2ZSgpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0VGFiLmNsYXNzTGlzdC5hZGQoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRUYWIuYXJpYVNlbGVjdGVkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0YXJnZXRQYW5lSWQpLmNsYXNzTGlzdC5hZGQoJ3Rybi10YWItYWN0aXZlJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG4gICAgICAgIGNvbnN0IHRhYkNsaWNrID0gKGV2ZW50KSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFRhYiA9IGV2ZW50LmN1cnJlbnRUYXJnZXQ7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBzZXRBY3RpdmUodGFyZ2V0UGFuZUlkKTtcclxuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhYnMsICh0YWIpID0+IHtcclxuICAgICAgICAgICAgdGFiLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGFiQ2xpY2spO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBpZiAobG9jYXRpb24uaGFzaCkge1xyXG4gICAgICAgICAgICBzZXRBY3RpdmUobG9jYXRpb24uaGFzaC5zdWJzdHIoMSkpO1xyXG4gICAgICAgIH0gZWxzZSBpZiAodGFicy5sZW5ndGggPiAwKSB7XHJcbiAgICAgICAgICAgIHNldEFjdGl2ZSh0YWJzWzBdLmRhdGFzZXQudGFyZ2V0KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG59XHJcblxyXG4vL3Rybi5pbml0aWFsaXplKCk7XHJcbmlmICghd2luZG93LnRybl9vYmpfaW5zdGFuY2UpIHtcclxuICAgIHdpbmRvdy50cm5fb2JqX2luc3RhbmNlID0gbmV3IFRvdXJuYW1hdGNoKCk7XHJcblxyXG4gICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgIGNvbnN0IHRhYlZpZXdzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLW5hdicpO1xyXG5cclxuICAgICAgICBBcnJheS5mcm9tKHRhYlZpZXdzKS5mb3JFYWNoKCh0YWIpID0+IHtcclxuICAgICAgICAgICAgdHJuLnRhYnModGFiKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgY29uc3QgZHJvcGRvd25zID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLWRyb3Bkb3duLXRvZ2dsZScpO1xyXG4gICAgICAgIGNvbnN0IGhhbmRsZURyb3Bkb3duQ2xvc2UgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICAgICAgZHJvcGRvd24ubmV4dEVsZW1lbnRTaWJsaW5nLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1zaG93Jyk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgaGFuZGxlRHJvcGRvd25DbG9zZSwgZmFsc2UpO1xyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICBkcm9wZG93bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICAgICAgICAgICAgICB0aGlzLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QuYWRkKCd0cm4tc2hvdycpO1xyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhhbmRsZURyb3Bkb3duQ2xvc2UsIGZhbHNlKTtcclxuICAgICAgICAgICAgfSwgZmFsc2UpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH0sIGZhbHNlKTtcclxufVxyXG5leHBvcnQgbGV0IHRybiA9IHdpbmRvdy50cm5fb2JqX2luc3RhbmNlO1xyXG5cclxuY2xhc3MgVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlIHtcclxuXHJcbiAgICAvLyBjdXJyZW50Rm9jdXM7XHJcbiAgICAvL1xyXG4gICAgLy8gbmFtZUlucHV0O1xyXG4gICAgLy9cclxuICAgIC8vIHNlbGY7XHJcblxyXG4gICAgY29uc3RydWN0b3IoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIC8vIHRoaXMuc2VsZiA9IHRoaXM7XHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQgPSBpbnB1dDtcclxuXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImlucHV0XCIsICgpID0+IHtcclxuICAgICAgICAgICAgbGV0IGEsIGIsIGksIHZhbCA9IHRoaXMubmFtZUlucHV0LnZhbHVlOy8vdGhpcy52YWx1ZTtcclxuICAgICAgICAgICAgbGV0IHBhcmVudCA9IHRoaXMubmFtZUlucHV0LnBhcmVudE5vZGU7Ly90aGlzLnBhcmVudE5vZGU7XHJcblxyXG4gICAgICAgICAgICAvLyBsZXQgcCA9IG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcclxuICAgICAgICAgICAgLy8gICAgIC8qIG5lZWQgdG8gcXVlcnkgc2VydmVyIGZvciBuYW1lcyBoZXJlLiAqL1xyXG4gICAgICAgICAgICAvLyAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLm9wZW4oJ0dFVCcsIG9wdGlvbnMuYXBpX3VybCArICdwbGF5ZXJzLz9zZWFyY2g9JyArIHZhbCArICcmcGVyX3BhZ2U9NScpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICAvLyByZXNvbHZlKEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tYXAoKHBsYXllcikgPT4ge3JldHVybiB7ICd2YWx1ZSc6IHBsYXllci5pZCwgJ3RleHQnOiBwbGF5ZXIubmFtZSB9O30pKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4gcGxheWVyLm5hbWU7fSkpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJlamVjdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH1cclxuICAgICAgICAgICAgLy8gICAgIH07XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2VuZCgpO1xyXG4gICAgICAgICAgICAvLyB9KTtcclxuICAgICAgICAgICAgZGF0YUNhbGxiYWNrKHZhbCkudGhlbigoZGF0YSkgPT4gey8vcC50aGVuKChkYXRhKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmNsb3NlIGFueSBhbHJlYWR5IG9wZW4gbGlzdHMgb2YgYXV0by1jb21wbGV0ZWQgdmFsdWVzKi9cclxuICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG4gICAgICAgICAgICAgICAgaWYgKCF2YWwpIHsgcmV0dXJuIGZhbHNlO31cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzID0gLTE7XHJcblxyXG4gICAgICAgICAgICAgICAgLypjcmVhdGUgYSBESVYgZWxlbWVudCB0aGF0IHdpbGwgY29udGFpbiB0aGUgaXRlbXMgKHZhbHVlcyk6Ki9cclxuICAgICAgICAgICAgICAgIGEgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgYS5zZXRBdHRyaWJ1dGUoXCJpZFwiLCB0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiY2xhc3NcIiwgXCJ0cm4tYXV0by1jb21wbGV0ZS1pdGVtc1wiKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmFwcGVuZCB0aGUgRElWIGVsZW1lbnQgYXMgYSBjaGlsZCBvZiB0aGUgYXV0by1jb21wbGV0ZSBjb250YWluZXI6Ki9cclxuICAgICAgICAgICAgICAgIHBhcmVudC5hcHBlbmRDaGlsZChhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmZvciBlYWNoIGl0ZW0gaW4gdGhlIGFycmF5Li4uKi9cclxuICAgICAgICAgICAgICAgIGZvciAoaSA9IDA7IGkgPCBkYXRhLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHRleHQsIHZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKiBXaGljaCBmb3JtYXQgZGlkIHRoZXkgZ2l2ZSB1cy4gKi9cclxuICAgICAgICAgICAgICAgICAgICBpZiAodHlwZW9mIGRhdGFbaV0gPT09ICdvYmplY3QnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldWyd0ZXh0J107XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXVsndmFsdWUnXTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0ID0gZGF0YVtpXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLypjaGVjayBpZiB0aGUgaXRlbSBzdGFydHMgd2l0aCB0aGUgc2FtZSBsZXR0ZXJzIGFzIHRoZSB0ZXh0IGZpZWxkIHZhbHVlOiovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpLnRvVXBwZXJDYXNlKCkgPT09IHZhbC50b1VwcGVyQ2FzZSgpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qY3JlYXRlIGEgRElWIGVsZW1lbnQgZm9yIGVhY2ggbWF0Y2hpbmcgZWxlbWVudDoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcIkRJVlwiKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLyptYWtlIHRoZSBtYXRjaGluZyBsZXR0ZXJzIGJvbGQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgPSBcIjxzdHJvbmc+XCIgKyB0ZXh0LnN1YnN0cigwLCB2YWwubGVuZ3RoKSArIFwiPC9zdHJvbmc+XCI7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IHRleHQuc3Vic3RyKHZhbC5sZW5ndGgpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLyppbnNlcnQgYSBpbnB1dCBmaWVsZCB0aGF0IHdpbGwgaG9sZCB0aGUgY3VycmVudCBhcnJheSBpdGVtJ3MgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gXCI8aW5wdXQgdHlwZT0naGlkZGVuJyB2YWx1ZT0nXCIgKyB2YWx1ZSArIFwiJz5cIjtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuZGF0YXNldC52YWx1ZSA9IHZhbHVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudGV4dCA9IHRleHQ7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIG9uIHRoZSBpdGVtIHZhbHVlIChESVYgZWxlbWVudCk6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGBpdGVtIGNsaWNrZWQgd2l0aCB2YWx1ZSAke2UuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlfWApO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGluc2VydCB0aGUgdmFsdWUgZm9yIHRoZSBhdXRvY29tcGxldGUgdGV4dCBmaWVsZDogKi9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LnZhbHVlID0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudGV4dDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRhdGFzZXQuc2VsZWN0ZWRJZCA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGNsb3NlIHRoZSBsaXN0IG9mIGF1dG9jb21wbGV0ZWQgdmFsdWVzLCAob3IgYW55IG90aGVyIG9wZW4gbGlzdHMgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXM6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRpc3BhdGNoRXZlbnQobmV3IEV2ZW50KCdjaGFuZ2UnKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBhLmFwcGVuZENoaWxkKGIpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHByZXNzZXMgYSBrZXkgb24gdGhlIGtleWJvYXJkOiovXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImtleWRvd25cIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgbGV0IHggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgaWYgKHgpIHggPSB4LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiZGl2XCIpO1xyXG4gICAgICAgICAgICBpZiAoZS5rZXlDb2RlID09PSA0MCkge1xyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgRE9XTiBrZXkgaXMgcHJlc3NlZCxcclxuICAgICAgICAgICAgICAgICBpbmNyZWFzZSB0aGUgY3VycmVudEZvY3VzIHZhcmlhYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cysrO1xyXG4gICAgICAgICAgICAgICAgLyphbmQgYW5kIG1ha2UgdGhlIGN1cnJlbnQgaXRlbSBtb3JlIHZpc2libGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuYWRkQWN0aXZlKHgpO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKGUua2V5Q29kZSA9PT0gMzgpIHsgLy91cFxyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgVVAga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgZGVjcmVhc2UgdGhlIGN1cnJlbnRGb2N1cyB2YXJpYWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMtLTtcclxuICAgICAgICAgICAgICAgIC8qYW5kIGFuZCBtYWtlIHRoZSBjdXJyZW50IGl0ZW0gbW9yZSB2aXNpYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT09IDEzKSB7XHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBFTlRFUiBrZXkgaXMgcHJlc3NlZCwgcHJldmVudCB0aGUgZm9ybSBmcm9tIGJlaW5nIHN1Ym1pdHRlZCwqL1xyXG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID4gLTEpIHtcclxuICAgICAgICAgICAgICAgICAgICAvKmFuZCBzaW11bGF0ZSBhIGNsaWNrIG9uIHRoZSBcImFjdGl2ZVwiIGl0ZW06Ki9cclxuICAgICAgICAgICAgICAgICAgICBpZiAoeCkgeFt0aGlzLmN1cnJlbnRGb2N1c10uY2xpY2soKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIGluIHRoZSBkb2N1bWVudDoqL1xyXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoZS50YXJnZXQpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIGFkZEFjdGl2ZSh4KSB7XHJcbiAgICAgICAgLyphIGZ1bmN0aW9uIHRvIGNsYXNzaWZ5IGFuIGl0ZW0gYXMgXCJhY3RpdmVcIjoqL1xyXG4gICAgICAgIGlmICgheCkgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIC8qc3RhcnQgYnkgcmVtb3ZpbmcgdGhlIFwiYWN0aXZlXCIgY2xhc3Mgb24gYWxsIGl0ZW1zOiovXHJcbiAgICAgICAgdGhpcy5yZW1vdmVBY3RpdmUoeCk7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID49IHgubGVuZ3RoKSB0aGlzLmN1cnJlbnRGb2N1cyA9IDA7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzIDwgMCkgdGhpcy5jdXJyZW50Rm9jdXMgPSAoeC5sZW5ndGggLSAxKTtcclxuICAgICAgICAvKmFkZCBjbGFzcyBcImF1dG9jb21wbGV0ZS1hY3RpdmVcIjoqL1xyXG4gICAgICAgIHhbdGhpcy5jdXJyZW50Rm9jdXNdLmNsYXNzTGlzdC5hZGQoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICB9XHJcblxyXG4gICAgcmVtb3ZlQWN0aXZlKHgpIHtcclxuICAgICAgICAvKmEgZnVuY3Rpb24gdG8gcmVtb3ZlIHRoZSBcImFjdGl2ZVwiIGNsYXNzIGZyb20gYWxsIGF1dG9jb21wbGV0ZSBpdGVtczoqL1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICB4W2ldLmNsYXNzTGlzdC5yZW1vdmUoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIGNsb3NlQWxsTGlzdHMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnNvbGUubG9nKFwiY2xvc2UgYWxsIGxpc3RzXCIpO1xyXG4gICAgICAgIC8qY2xvc2UgYWxsIGF1dG9jb21wbGV0ZSBsaXN0cyBpbiB0aGUgZG9jdW1lbnQsXHJcbiAgICAgICAgIGV4Y2VwdCB0aGUgb25lIHBhc3NlZCBhcyBhbiBhcmd1bWVudDoqL1xyXG4gICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICBpZiAoZWxlbWVudCAhPT0geFtpXSAmJiBlbGVtZW50ICE9PSB0aGlzLm5hbWVJbnB1dCkge1xyXG4gICAgICAgICAgICAgICAgeFtpXS5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHhbaV0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59XHJcblxyXG4vLyBGaXJzdCwgY2hlY2tzIGlmIGl0IGlzbid0IGltcGxlbWVudGVkIHlldC5cclxuaWYgKCFTdHJpbmcucHJvdG90eXBlLmZvcm1hdCkge1xyXG4gICAgU3RyaW5nLnByb3RvdHlwZS5mb3JtYXQgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICBjb25zdCBhcmdzID0gYXJndW1lbnRzO1xyXG4gICAgICAgIHJldHVybiB0aGlzLnJlcGxhY2UoL3soXFxkKyl9L2csIGZ1bmN0aW9uKG1hdGNoLCBudW1iZXIpIHtcclxuICAgICAgICAgICAgcmV0dXJuIHR5cGVvZiBhcmdzW251bWJlcl0gIT09ICd1bmRlZmluZWQnXHJcbiAgICAgICAgICAgICAgICA/IGFyZ3NbbnVtYmVyXVxyXG4gICAgICAgICAgICAgICAgOiBtYXRjaFxyXG4gICAgICAgICAgICAgICAgO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfTtcclxufSIsIi8vIFRoZSBtb2R1bGUgY2FjaGVcbnZhciBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX18gPSB7fTtcblxuLy8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbmZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG5cdHZhciBjYWNoZWRNb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdO1xuXHRpZiAoY2FjaGVkTW9kdWxlICE9PSB1bmRlZmluZWQpIHtcblx0XHRyZXR1cm4gY2FjaGVkTW9kdWxlLmV4cG9ydHM7XG5cdH1cblx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcblx0dmFyIG1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF0gPSB7XG5cdFx0Ly8gbm8gbW9kdWxlLmlkIG5lZWRlZFxuXHRcdC8vIG5vIG1vZHVsZS5sb2FkZWQgbmVlZGVkXG5cdFx0ZXhwb3J0czoge31cblx0fTtcblxuXHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cblx0X193ZWJwYWNrX21vZHVsZXNfX1ttb2R1bGVJZF0obW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cblx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcblx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xufVxuXG4iLCIvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9ucyBmb3IgaGFybW9ueSBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSAoZXhwb3J0cywgZGVmaW5pdGlvbikgPT4ge1xuXHRmb3IodmFyIGtleSBpbiBkZWZpbml0aW9uKSB7XG5cdFx0aWYoX193ZWJwYWNrX3JlcXVpcmVfXy5vKGRlZmluaXRpb24sIGtleSkgJiYgIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBrZXkpKSB7XG5cdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywga2V5LCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZGVmaW5pdGlvbltrZXldIH0pO1xuXHRcdH1cblx0fVxufTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSAob2JqLCBwcm9wKSA9PiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iaiwgcHJvcCkpIiwiLy8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5yID0gKGV4cG9ydHMpID0+IHtcblx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG5cdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG5cdH1cblx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbn07IiwiLyoqXHJcbiAqIEFkbWluIG1hbmFnZSBnYW1lcy5cclxuICpcclxuICogQGxpbmsgICAgICAgaHR0cHM6Ly93d3cudG91cm5hbWF0Y2guY29tXHJcbiAqIEBzaW5jZSAgICAgIDMuMTguMFxyXG4gKlxyXG4gKiBAcGFja2FnZSAgICBUb3VybmFtYXRjaFxyXG4gKlxyXG4gKi9cclxuaW1wb3J0IHsgdHJuIH0gZnJvbSAnLi8uLi90b3VybmFtYXRjaC5qcyc7XHJcbmltcG9ydCB7IGVzY2FwZUhUTUwgfSBmcm9tICdAd29yZHByZXNzL2VzY2FwZS1odG1sJztcclxuXHJcbihmdW5jdGlvbiAoJCkge1xyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGxldCBvcHRpb25zID0gdHJuX21hbmFnZV9nYW1lc19vcHRpb25zO1xyXG5cclxuICAgICAgICBsZXQgZm9ybSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tbmV3LWdhbWUtZm9ybScpO1xyXG4gICAgICAgIGZvcm0uYWRkRXZlbnRMaXN0ZW5lcignc3VibWl0JywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICBpZiAoZm9ybS5jaGVja1ZhbGlkaXR5KCkgPT09IHRydWUpIHtcclxuICAgICAgICAgICAgICAgIGxldCB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgICAgIHhoci5vcGVuKCdQT1NUJywgb3B0aW9ucy5hcGlfdXJsICsgJ2dhbWVzLycpO1xyXG4gICAgICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coeGhyKTtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoeGhyLnN0YXR1cyA9PT0gMjAxKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCBuZXdfZ2FtZSA9IEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgJC5ldmVudCgnZ2FtZXMnKS5kaXNwYXRjaEV2ZW50KG5ldyBFdmVudCgnY2hhbmdlZCcpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1jcmVhdGUtZ2FtZS1yZXNwb25zZScpLmlubmVySFRNTCA9IGA8cCBjbGFzcz1cIm5vdGljZSBub3RpY2Utc3VjY2Vzc1wiPjxzdHJvbmc+JHtvcHRpb25zLmxhbmd1YWdlLnN1Y2Nlc3N9Ojwvc3Ryb25nPiAke29wdGlvbnMubGFuZ3VhZ2Uuc3VjY2Vzc19tZXNzYWdlLmZvcm1hdChlc2NhcGVIVE1MKG5ld19nYW1lLm5hbWUpKX08L3A+YDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgZm9ybS5yZXNldCgpO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHhoci5yZXNwb25zZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tY3JlYXRlLWdhbWUtcmVzcG9uc2UnKS5pbm5lckhUTUwgPSBgPHAgY2xhc3M9XCJub3RpY2Ugbm90aWNlLWVycm9yXCI+PHN0cm9uZz4ke29wdGlvbnMubGFuZ3VhZ2UuZmFpbHVyZX06PC9zdHJvbmc+ICR7ZXNjYXBlSFRNTChyZXNwb25zZS5tZXNzYWdlKX08L3A+YDtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgICAgIHhoci5zZW5kKCQucGFyYW0oe1xyXG4gICAgICAgICAgICAgICAgICAgIG5hbWU6IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tZ2FtZS1uYW1lJykudmFsdWUsXHJcbiAgICAgICAgICAgICAgICAgICAgcGxhdGZvcm06IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tZ2FtZS1wbGF0Zm9ybScpLnZhbHVlLFxyXG4gICAgICAgICAgICAgICAgICAgIHRodW1ibmFpbF9pZDogZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1nYW1lLXRodW1ibmFpbCcpLnZhbHVlIHx8IDAsXHJcbiAgICAgICAgICAgICAgICAgICAgYmFubmVyX2lkOiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLWdhbWUtYmFubmVyJykudmFsdWUgfHwgMCxcclxuICAgICAgICAgICAgICAgIH0pKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0sIGZhbHNlKTtcclxuXHJcblxyXG4gICAgICAgIGxldCBvbGRfZ2FtZXMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tYWRtaW4tZ2FtZS13YXJuaW5nJyk7XHJcbiAgICAgICAgaWYgKG9sZF9nYW1lcyAmJiAoIDAgPCBvbGRfZ2FtZXMubGVuZ3RoKSkge1xyXG4gICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLWdhbWUtdGh1bWJuYWlsLXdhcm5pbmcnKS5jbGFzc0xpc3QucmVtb3ZlKCdkLW5vbmUnKTtcclxuICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLWdhbWUtdGh1bWJuYWlsLXdhcm5pbmcnKS5jbGFzc0xpc3QuYWRkKCdkLW5vbmUnKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChvbGRfZ2FtZXMsIGZ1bmN0aW9uKG9sZF9nYW1lKSB7XHJcbiAgICAgICAgICAgIG9sZF9nYW1lLnBhcmVudE5vZGUuY2xhc3NMaXN0LmFkZCgndHJuLWFkbWluLWdhbWUtdGh1bWJuYWlsLXdhcm5pbmcnKTtcclxuICAgICAgICB9KTtcclxuICAgIH0sIGZhbHNlKTtcclxufSkodHJuKTsiXSwibmFtZXMiOlsiX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuIiwidmFsdWUiLCJyZXBsYWNlIiwiUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUiLCJlc2NhcGVBbXBlcnNhbmQiLCJlc2NhcGVRdW90YXRpb25NYXJrIiwiZXNjYXBlTGVzc1RoYW4iLCJlc2NhcGVBdHRyaWJ1dGUiLCJlc2NhcGVIVE1MIiwiZXNjYXBlRWRpdGFibGVIVE1MIiwiaXNWYWxpZEF0dHJpYnV0ZU5hbWUiLCJuYW1lIiwidGVzdCIsIl90eXBlb2YiLCJvIiwiU3ltYm9sIiwiaXRlcmF0b3IiLCJjb25zdHJ1Y3RvciIsInByb3RvdHlwZSIsIl9jbGFzc0NhbGxDaGVjayIsImEiLCJuIiwiVHlwZUVycm9yIiwiX2RlZmluZVByb3BlcnRpZXMiLCJlIiwiciIsInQiLCJsZW5ndGgiLCJlbnVtZXJhYmxlIiwiY29uZmlndXJhYmxlIiwid3JpdGFibGUiLCJPYmplY3QiLCJkZWZpbmVQcm9wZXJ0eSIsIl90b1Byb3BlcnR5S2V5Iiwia2V5IiwiX2NyZWF0ZUNsYXNzIiwiaSIsIl90b1ByaW1pdGl2ZSIsInRvUHJpbWl0aXZlIiwiY2FsbCIsIlN0cmluZyIsIk51bWJlciIsIlRvdXJuYW1hdGNoIiwiZXZlbnRzIiwicGFyYW0iLCJvYmplY3QiLCJwcmVmaXgiLCJzdHIiLCJwcm9wIiwiaGFzT3duUHJvcGVydHkiLCJrIiwidiIsInB1c2giLCJlbmNvZGVVUklDb21wb25lbnQiLCJqb2luIiwiZXZlbnQiLCJldmVudE5hbWUiLCJFdmVudFRhcmdldCIsImF1dG9jb21wbGV0ZSIsImlucHV0IiwiZGF0YUNhbGxiYWNrIiwiVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlIiwidWNmaXJzdCIsInMiLCJjaGFyQXQiLCJ0b1VwcGVyQ2FzZSIsInNsaWNlIiwib3JkaW5hbF9zdWZmaXgiLCJudW1iZXIiLCJyZW1haW5kZXIiLCJ0YWJzIiwiZWxlbWVudCIsImdldEVsZW1lbnRzQnlDbGFzc05hbWUiLCJwYW5lcyIsImRvY3VtZW50IiwiY2xlYXJBY3RpdmUiLCJBcnJheSIsImZvckVhY2giLCJ0YWIiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJhcmlhU2VsZWN0ZWQiLCJwYW5lIiwic2V0QWN0aXZlIiwidGFyZ2V0SWQiLCJ0YXJnZXRUYWIiLCJxdWVyeVNlbGVjdG9yIiwidGFyZ2V0UGFuZUlkIiwiZGF0YXNldCIsInRhcmdldCIsImFkZCIsImdldEVsZW1lbnRCeUlkIiwidGFiQ2xpY2siLCJjdXJyZW50VGFyZ2V0IiwicHJldmVudERlZmF1bHQiLCJhZGRFdmVudExpc3RlbmVyIiwibG9jYXRpb24iLCJoYXNoIiwic3Vic3RyIiwid2luZG93IiwidHJuX29ial9pbnN0YW5jZSIsInRhYlZpZXdzIiwiZnJvbSIsInRybiIsImRyb3Bkb3ducyIsImhhbmRsZURyb3Bkb3duQ2xvc2UiLCJkcm9wZG93biIsIm5leHRFbGVtZW50U2libGluZyIsInJlbW92ZUV2ZW50TGlzdGVuZXIiLCJzdG9wUHJvcGFnYXRpb24iLCJfdGhpcyIsIm5hbWVJbnB1dCIsImIiLCJ2YWwiLCJwYXJlbnQiLCJwYXJlbnROb2RlIiwidGhlbiIsImRhdGEiLCJjb25zb2xlIiwibG9nIiwiY2xvc2VBbGxMaXN0cyIsImN1cnJlbnRGb2N1cyIsImNyZWF0ZUVsZW1lbnQiLCJzZXRBdHRyaWJ1dGUiLCJpZCIsImFwcGVuZENoaWxkIiwidGV4dCIsImlubmVySFRNTCIsImNvbmNhdCIsInNlbGVjdGVkSWQiLCJkaXNwYXRjaEV2ZW50IiwiRXZlbnQiLCJ4IiwiZ2V0RWxlbWVudHNCeVRhZ05hbWUiLCJrZXlDb2RlIiwiYWRkQWN0aXZlIiwiY2xpY2siLCJyZW1vdmVBY3RpdmUiLCJyZW1vdmVDaGlsZCIsImZvcm1hdCIsImFyZ3MiLCJhcmd1bWVudHMiLCJtYXRjaCIsIiQiLCJvcHRpb25zIiwidHJuX21hbmFnZV9nYW1lc19vcHRpb25zIiwiZm9ybSIsImNoZWNrVmFsaWRpdHkiLCJ4aHIiLCJYTUxIdHRwUmVxdWVzdCIsIm9wZW4iLCJhcGlfdXJsIiwic2V0UmVxdWVzdEhlYWRlciIsInJlc3Rfbm9uY2UiLCJvbmxvYWQiLCJzdGF0dXMiLCJuZXdfZ2FtZSIsIkpTT04iLCJwYXJzZSIsInJlc3BvbnNlIiwibGFuZ3VhZ2UiLCJzdWNjZXNzIiwic3VjY2Vzc19tZXNzYWdlIiwicmVzZXQiLCJmYWlsdXJlIiwibWVzc2FnZSIsInNlbmQiLCJwbGF0Zm9ybSIsInRodW1ibmFpbF9pZCIsImJhbm5lcl9pZCIsIm9sZF9nYW1lcyIsIm9sZF9nYW1lIl0sInNvdXJjZVJvb3QiOiIifQ==
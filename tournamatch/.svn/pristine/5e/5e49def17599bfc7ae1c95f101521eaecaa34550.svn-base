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
/*!*****************************!*\
  !*** ./src/js/standings.js ***!
  \*****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
/**
 * Ladder standings page.
 *
 * @link       https://www.tournamatch.com
 * @since      3.11.0
 *
 * @package    Tournamatch
 *
 */


(function ($) {
  'use strict';

  var options = trn_ladder_standings_options;
  function handlePromoteLink() {
    var promoteLinks = document.getElementsByClassName('trn-promote-competitor-link');
    Array.prototype.forEach.call(promoteLinks, function (promoteLink) {
      promoteLink.addEventListener('click', function (event) {
        event.preventDefault();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "".concat(options.api_url, "ladder-competitors/").concat(promoteLink.dataset.competitorId, "/promote"));
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
        xhr.onload = function () {
          if (xhr.status === 303) {
            window.location.reload();
          } else {
            var response = JSON.parse(xhr.response);
            document.getElementById('trn-promote-competitor-response').innerHTML = "<div class=\"trn-alert trn-alert-danger\"><strong>".concat(options.language.failure, "</strong>: ").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(response.message), "</div>");
          }
        };
        xhr.send();
      }, false);
    });
  }
  function handleDeleteConfirm() {
    var links = document.getElementsByClassName('trn-remove-competitor-link');
    Array.prototype.forEach.call(links, function (link) {
      link.addEventListener('trn.confirmed.action.delete-competitor', function (event) {
        event.preventDefault();
        console.log("modal was confirmed for link ".concat(link.dataset.competitorId));
        var xhr = new XMLHttpRequest();
        xhr.open('DELETE', "".concat(options.api_url, "ladder-competitors/").concat(link.dataset.competitorId, "?admin=1"));
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
        xhr.onload = function () {
          if (xhr.status === 204) {
            window.location.reload();
          } else {
            var response = JSON.parse(xhr.response);
            document.getElementById('trn-remove-competitor-response').innerHTML = "<div class=\"trn-alert trn-alert-danger\"><strong>".concat(options.language.failure, "</strong>: ").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(response.message), "</div>");
          }
        };
        xhr.send();
      }, false);
    });
  }
  window.addEventListener('load', function () {
    document.addEventListener('trn-html-updated', function (e) {
      handleDeleteConfirm();
      handlePromoteLink();
    });
    handleDeleteConfirm();
    handlePromoteLink();
    var default_target = options.default_target;
    var target = 0;
    var columnDefs = [{
      targets: target++,
      name: 'number',
      className: 'trn-ladder-standings-table-number',
      render: function render(data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      },
      orderable: false
    }, {
      targets: target++,
      name: 'name',
      className: 'trn-ladder-standings-table-name',
      render: function render(data, type, row) {
        return "<img src=\"".concat(options.flag_path).concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.competitor[0].flag), "\" width=\"18\" height=\"12\" title=\"").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.competitor[0].flag), "\"> <a href=\"").concat(row._embedded.competitor[0].link, "\">").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.competitor[0].name), "</a>");
      }
    }, {
      targets: target++,
      name: default_target,
      className: 'trn-ladder-standings-table-rating rating',
      render: function render(data, type, row) {
        return row[default_target];
      }
    }, {
      targets: target++,
      name: 'games_played',
      className: 'trn-ladder-standings-table-games-played',
      render: function render(data, type, row) {
        return row.games_played;
      }
    }, {
      targets: target++,
      name: 'wins',
      className: 'trn-ladder-standings-table-wins wins',
      render: function render(data, type, row) {
        return row.wins;
      }
    }, {
      targets: target++,
      name: 'losses',
      className: 'trn-ladder-standings-table-losses losses',
      render: function render(data, type, row) {
        return row.losses;
      }
    }];
    if (options.uses_draws) {
      columnDefs.push({
        targets: target++,
        name: 'draws',
        className: 'trn-ladder-standings-table-draws ties',
        render: function render(data, type, row) {
          return row.draws;
        }
      });
    }
    if (options.uses_scores) {
      columnDefs.push({
        targets: target++,
        name: 'goals_for',
        className: 'trn-ladder-standings-table-goals-for',
        render: function render(data, type, row) {
          return row.goals_for;
        }
      }, {
        targets: target++,
        name: 'goals_against',
        className: 'trn-ladder-standings-table-goals-against',
        render: function render(data, type, row) {
          return row.goals_against;
        }
      }, {
        targets: target++,
        name: 'goals_difference',
        className: 'trn-ladder-standings-table-goals-difference',
        render: function render(data, type, row) {
          return row.goals_delta;
        }
      });
    }
    columnDefs.push({
      targets: target++,
      name: 'win_percent',
      className: 'trn-ladder-standings-table-win-percent',
      render: function render(data, type, row) {
        return row.win_percent;
      }
    }, {
      targets: target++,
      name: 'streak',
      className: 'trn-ladder-standings-table-streak',
      render: function render(data, type, row) {
        var streakClass;
        if (0 > row.streak) {
          streakClass = "negative-streak";
        } else if (0 < row.streak) {
          streakClass = "positive-streak";
        } else {
          streakClass = "";
        }
        return "<span class=\"".concat(streakClass, "\">").concat(row.streak, "</span>");
      }
    }, {
      targets: target++,
      name: 'idle',
      className: 'trn-ladder-standings-table-idle',
      render: function render(data, type, row) {
        var idleClass;
        if (7 >= row.days_idle) {
          idleClass = "trn-ladder-active-last-7";
        } else if (14 >= row.days_idle) {
          idleClass = "trn-ladder-active-last-14";
        } else if (21 >= row.days_idle) {
          idleClass = "trn-ladder-active-last-21";
        } else {
          idleClass = "trn-ladder-inactive";
        }
        return "<span class=\"".concat(idleClass, "\">").concat(row.days_idle, "</span>");
      }
    });
    if (options.can_challenge || options.is_admin) {
      columnDefs.push({
        targets: target,
        name: 'actions',
        className: 'trn-ladder-standings-table-actions',
        render: function render(data, type, row) {
          var links = [];
          if (options.can_challenge) {
            links.push("<a href=\"".concat(options.challenge_url).concat(row.competitor_id, "\" title=\"").concat(options.language.challenge_link_title, "\"><i class=\"fa fa-crosshairs\" aria-hidden=\"true\"></i></a>"));
          }
          if (options.is_admin) {
            links.push("<a href=\"".concat(row.edit_link, "\" title=\"").concat(options.language.edit_link_title, "\"><i class=\"fa fa-edit\" aria-hidden=\"true\"></i></a>"));
            var competitor_name = "";
            if ('player' === row.competitor_type) {
              competitor_name = options.language.confirm_delete_message.format((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.competitor[0].name));
            } else {
              competitor_name = options.language.confirm_delete_message.format((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.competitor[0].name));
            }
            links.push("<a class=\"trn-remove-competitor-link trn-confirm-action-link\" href=\"#\" title=\"".concat(options.language.remove_link_title, "\" data-competitor-id=\"").concat(row.ladder_entry_id, "\" data-confirm-title=\"").concat(options.language.confirm_delete_title, "\" data-confirm-message=\"").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(competitor_name), "\" data-modal-id=\"delete-competitor\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>"));
            if (options.can_promote && 1 !== row.rank) {
              links.push("<a class=\"trn-promote-competitor-link\" href=\"#\" title=\"".concat(options.language.promote_link_title, "\" data-competitor-id=\"").concat(row.ladder_competitor_id, "\"><i class=\"fa fa-long-arrow-alt-up\" aria-hidden=\"true\"></i></a>"));
            }
          }
          if (links.length > 0) {
            return links.join(' ');
          } else {
            return "";
          }
        },
        orderable: false
      });
    }
    var default_direction = 'desc';
    var standings = jQuery('#ladder-standings-table').on('xhr.dt', function (e, settings, json, xhr) {
      json.data = JSON.parse(JSON.stringify(json));
      json.recordsTotal = xhr.getResponseHeader('X-WP-Total');
      json.recordsFiltered = xhr.getResponseHeader('TRN-Filtered');
      json.length = xhr.getResponseHeader('X-WP-TotalPages');
      json.draw = xhr.getResponseHeader('TRN-Draw');
    }).DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'All']],
      language: options.table_language,
      autoWidth: false,
      ajax: {
        url: "".concat(options.api_url, "ladder-competitors/?_wpnonce=").concat(options.rest_nonce, "&_embed&ladder_id=").concat(options.ladder_id),
        type: 'GET',
        data: function data(_data) {
          return {
            draw: _data.draw,
            page: Math.floor(_data.start / _data.length),
            per_page: _data.length,
            search: _data.search.value,
            orderby: "".concat(_data.columns[_data.order[0].column].name, ".").concat(_data.order[0].dir)
          };
        }
      },
      order: [[2, default_direction]],
      columnDefs: columnDefs,
      drawCallback: function drawCallback(settings) {
        document.dispatchEvent(new CustomEvent('trn-html-updated', {
          'detail': 'The table html has updated.'
        }));
      }
    });
  }, false);
})(_tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUFDMUYsTUFBTSxDQUFDO1lBQzFDbU4sUUFBUSxFQUFFekgsS0FBSSxDQUFDMUYsTUFBTTtZQUNyQm9OLE1BQU0sRUFBRTFILEtBQUksQ0FBQzBILE1BQU0sQ0FBQzlPLEtBQUs7WUFDekIrTyxPQUFPLEtBQUFoSCxNQUFBLENBQUtYLEtBQUksQ0FBQzRILE9BQU8sQ0FBQzVILEtBQUksQ0FBQzZILEtBQUssQ0FBQyxDQUFDLENBQUMsQ0FBQ0MsTUFBTSxDQUFDLENBQUN4TyxJQUFJLE9BQUFxSCxNQUFBLENBQUlYLEtBQUksQ0FBQzZILEtBQUssQ0FBQyxDQUFDLENBQUMsQ0FBQ0UsR0FBRztVQUM1RSxDQUFDO1FBQ0w7TUFDSixDQUFDO01BQ0RGLEtBQUssRUFBRSxDQUFDLENBQUMsQ0FBQyxFQUFFM0IsaUJBQWlCLENBQUMsQ0FBQztNQUMvQjdDLFVBQVUsRUFBRUEsVUFBVTtNQUN0QjJFLFlBQVksRUFBRSxTQUFBQSxhQUFVcEUsUUFBUSxFQUFHO1FBQy9CdkcsUUFBUSxDQUFDd0QsYUFBYSxDQUFFLElBQUlvSCxXQUFXLENBQUUsa0JBQWtCLEVBQUU7VUFBRSxRQUFRLEVBQUU7UUFBOEIsQ0FBRSxDQUFDLENBQUM7TUFDL0c7SUFDSixDQUFDLENBQUM7RUFDVixDQUFDLEVBQUUsS0FBSyxDQUFDO0FBQ2IsQ0FBQyxFQUFFL0ksZ0RBQUcsQ0FBQyxDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvQHdvcmRwcmVzcy9lc2NhcGUtaHRtbC9zcmMvZXNjYXBlLWdyZWF0ZXIuanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvQHdvcmRwcmVzcy9lc2NhcGUtaHRtbC9zcmMvaW5kZXguanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvLi9zcmMvanMvdG91cm5hbWF0Y2guanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2RlZmluZSBwcm9wZXJ0eSBnZXR0ZXJzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9oYXNPd25Qcm9wZXJ0eSBzaG9ydGhhbmQiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL21ha2UgbmFtZXNwYWNlIG9iamVjdCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC8uL3NyYy9qcy9zdGFuZGluZ3MuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggZ3JlYXRlci10aGFuIHNpZ24gcmVwbGFjZWQuXG4gKlxuICogTm90ZSB0aGF0IGlmIGEgcmVzb2x1dGlvbiBmb3IgVHJhYyM0NTM4NyBjb21lcyB0byBmcnVpdGlvbiwgaXQgaXMgbm8gbG9uZ2VyXG4gKiBuZWNlc3NhcnkgZm9yIGBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW5gIHRvIGV4aXN0LlxuICpcbiAqIFNlZTogaHR0cHM6Ly9jb3JlLnRyYWMud29yZHByZXNzLm9yZy90aWNrZXQvNDUzODdcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbiggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvPi9nLCAnJmd0OycgKTtcbn1cbiIsIi8qKlxuICogSW50ZXJuYWwgZGVwZW5kZW5jaWVzXG4gKi9cbmltcG9ydCBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4gZnJvbSAnLi9lc2NhcGUtZ3JlYXRlcic7XG5cbi8qKlxuICogUmVndWxhciBleHByZXNzaW9uIG1hdGNoaW5nIGludmFsaWQgYXR0cmlidXRlIG5hbWVzLlxuICpcbiAqIFwiQXR0cmlidXRlIG5hbWVzIG11c3QgY29uc2lzdCBvZiBvbmUgb3IgbW9yZSBjaGFyYWN0ZXJzIG90aGVyIHRoYW4gY29udHJvbHMsXG4gKiBVKzAwMjAgU1BBQ0UsIFUrMDAyMiAoXCIpLCBVKzAwMjcgKCcpLCBVKzAwM0UgKD4pLCBVKzAwMkYgKC8pLCBVKzAwM0QgKD0pLFxuICogYW5kIG5vbmNoYXJhY3RlcnMuXCJcbiAqXG4gKiBAc2VlIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3N5bnRheC5odG1sI2F0dHJpYnV0ZXMtMlxuICpcbiAqIEB0eXBlIHtSZWdFeHB9XG4gKi9cbmNvbnN0IFJFR0VYUF9JTlZBTElEX0FUVFJJQlVURV9OQU1FID0gL1tcXHUwMDdGLVxcdTAwOUYgXCInPi89XCJcXHVGREQwLVxcdUZERUZdLztcblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggYW1wZXJzYW5kcyBlc2NhcGVkLiBOb3RlIHRoYXQgdGhpcyBpcyBhbiBpbXBlcmZlY3RcbiAqIGltcGxlbWVudGF0aW9uLCB3aGVyZSBvbmx5IGFtcGVyc2FuZHMgd2hpY2ggZG8gbm90IGFwcGVhciBhcyBhIHBhdHRlcm4gb2ZcbiAqIG5hbWVkLCBkZWNpbWFsLCBvciBoZXhhZGVjaW1hbCBjaGFyYWN0ZXIgcmVmZXJlbmNlcyBhcmUgZXNjYXBlZC4gSW52YWxpZFxuICogbmFtZWQgcmVmZXJlbmNlcyAoaS5lLiBhbWJpZ3VvdXMgYW1wZXJzYW5kKSBhcmUgc3RpbGwgcGVybWl0dGVkLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjY2hhcmFjdGVyLXJlZmVyZW5jZXNcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjYW1iaWd1b3VzLWFtcGVyc2FuZFxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNuYW1lZC1jaGFyYWN0ZXItcmVmZXJlbmNlc1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvJig/IShbYS16MC05XSt8I1swLTldK3wjeFthLWYwLTldKyk7KS9naSwgJyZhbXA7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBxdW90YXRpb24gbWFya3MgcmVwbGFjZWQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlUXVvdGF0aW9uTWFyayggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvXCIvZywgJyZxdW90OycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggbGVzcy10aGFuIHNpZ24gcmVwbGFjZWQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlTGVzc1RoYW4oIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLzwvZywgJyZsdDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIGF0dHJpYnV0ZSB2YWx1ZS5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2VsZW1lbnRzLWF0dHJpYnV0ZXNcbiAqXG4gKiBcIlsuLi5dIHRoZSB0ZXh0IGNhbm5vdCBjb250YWluIGFuIGFtYmlndW91cyBhbXBlcnNhbmQgWy4uLl0gbXVzdCBub3QgY29udGFpblxuICogYW55IGxpdGVyYWwgVSswMDIyIFFVT1RBVElPTiBNQVJLIGNoYXJhY3RlcnMgKFwiKVwiXG4gKlxuICogTm90ZSB3ZSBhbHNvIGVzY2FwZSB0aGUgZ3JlYXRlciB0aGFuIHN5bWJvbCwgYXMgdGhpcyBpcyB1c2VkIGJ5IHdwdGV4dHVyaXplIHRvXG4gKiBzcGxpdCBIVE1MIHN0cmluZ3MuIFRoaXMgaXMgYSBXb3JkUHJlc3Mgc3BlY2lmaWMgZml4XG4gKlxuICogTm90ZSB0aGF0IGlmIGEgcmVzb2x1dGlvbiBmb3IgVHJhYyM0NTM4NyBjb21lcyB0byBmcnVpdGlvbiwgaXQgaXMgbm8gbG9uZ2VyXG4gKiBuZWNlc3NhcnkgZm9yIGBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW5gIHRvIGJlIHVzZWQuXG4gKlxuICogU2VlOiBodHRwczovL2NvcmUudHJhYy53b3JkcHJlc3Mub3JnL3RpY2tldC80NTM4N1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBBdHRyaWJ1dGUgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIGF0dHJpYnV0ZSB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUF0dHJpYnV0ZSggdmFsdWUgKSB7XG5cdHJldHVybiBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4oXG5cdFx0ZXNjYXBlUXVvdGF0aW9uTWFyayggZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApIClcblx0KTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGFuIGVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjd3JpdGluZy1odG1sLWRvY3VtZW50cy1lbGVtZW50c1xuICpcbiAqIFwidGhlIHRleHQgbXVzdCBub3QgY29udGFpbiB0aGUgY2hhcmFjdGVyIFUrMDAzQyBMRVNTLVRIQU4gU0lHTiAoPCkgb3IgYW5cbiAqIGFtYmlndW91cyBhbXBlcnNhbmQuXCJcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgRWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlSFRNTCggdmFsdWUgKSB7XG5cdHJldHVybiBlc2NhcGVMZXNzVGhhbiggZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIEVkaXRhYmxlIEhUTUwgZWxlbWVudCB2YWx1ZS4gVGhpcyBpcyBkaWZmZXJlbnQgZnJvbVxuICogYGVzY2FwZUhUTUxgLCBiZWNhdXNlIGZvciBlZGl0YWJsZSBIVE1MLCBBTEwgYW1wZXJzYW5kcyBtdXN0IGJlIGVzY2FwZWQgaW5cbiAqIG9yZGVyIHRvIHJlbmRlciB0aGUgY29udGVudCBjb3JyZWN0bHkgb24gdGhlIHBhZ2UuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUVkaXRhYmxlSFRNTCggdmFsdWUgKSB7XG5cdHJldHVybiBlc2NhcGVMZXNzVGhhbiggdmFsdWUucmVwbGFjZSggLyYvZywgJyZhbXA7JyApICk7XG59XG5cbi8qKlxuICogUmV0dXJucyB0cnVlIGlmIHRoZSBnaXZlbiBhdHRyaWJ1dGUgbmFtZSBpcyB2YWxpZCwgb3IgZmFsc2Ugb3RoZXJ3aXNlLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSBuYW1lIEF0dHJpYnV0ZSBuYW1lIHRvIHRlc3QuXG4gKlxuICogQHJldHVybiB7Ym9vbGVhbn0gV2hldGhlciBhdHRyaWJ1dGUgaXMgdmFsaWQuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBpc1ZhbGlkQXR0cmlidXRlTmFtZSggbmFtZSApIHtcblx0cmV0dXJuICEgUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUudGVzdCggbmFtZSApO1xufVxuIiwiJ3VzZSBzdHJpY3QnO1xyXG5jbGFzcyBUb3VybmFtYXRjaCB7XHJcblxyXG4gICAgY29uc3RydWN0b3IoKSB7XHJcbiAgICAgICAgdGhpcy5ldmVudHMgPSB7fTtcclxuICAgIH1cclxuXHJcbiAgICBwYXJhbShvYmplY3QsIHByZWZpeCkge1xyXG4gICAgICAgIGxldCBzdHIgPSBbXTtcclxuICAgICAgICBmb3IgKGxldCBwcm9wIGluIG9iamVjdCkge1xyXG4gICAgICAgICAgICBpZiAob2JqZWN0Lmhhc093blByb3BlcnR5KHByb3ApKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgayA9IHByZWZpeCA/IHByZWZpeCArIFwiW1wiICsgcHJvcCArIFwiXVwiIDogcHJvcDtcclxuICAgICAgICAgICAgICAgIGxldCB2ID0gb2JqZWN0W3Byb3BdO1xyXG4gICAgICAgICAgICAgICAgc3RyLnB1c2goKHYgIT09IG51bGwgJiYgdHlwZW9mIHYgPT09IFwib2JqZWN0XCIpID8gdGhpcy5wYXJhbSh2LCBrKSA6IGVuY29kZVVSSUNvbXBvbmVudChrKSArIFwiPVwiICsgZW5jb2RlVVJJQ29tcG9uZW50KHYpKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gc3RyLmpvaW4oXCImXCIpO1xyXG4gICAgfVxyXG5cclxuICAgIGV2ZW50KGV2ZW50TmFtZSkge1xyXG4gICAgICAgIGlmICghKGV2ZW50TmFtZSBpbiB0aGlzLmV2ZW50cykpIHtcclxuICAgICAgICAgICAgdGhpcy5ldmVudHNbZXZlbnROYW1lXSA9IG5ldyBFdmVudFRhcmdldChldmVudE5hbWUpO1xyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gdGhpcy5ldmVudHNbZXZlbnROYW1lXTtcclxuICAgIH1cclxuXHJcbiAgICBhdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIG5ldyBUb3VybmFtYXRjaF9BdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjayk7XHJcbiAgICB9XHJcblxyXG4gICAgdWNmaXJzdChzKSB7XHJcbiAgICAgICAgaWYgKHR5cGVvZiBzICE9PSAnc3RyaW5nJykgcmV0dXJuICcnO1xyXG4gICAgICAgIHJldHVybiBzLmNoYXJBdCgwKS50b1VwcGVyQ2FzZSgpICsgcy5zbGljZSgxKTtcclxuICAgIH1cclxuXHJcbiAgICBvcmRpbmFsX3N1ZmZpeChudW1iZXIpIHtcclxuICAgICAgICBjb25zdCByZW1haW5kZXIgPSBudW1iZXIgJSAxMDA7XHJcblxyXG4gICAgICAgIGlmICgocmVtYWluZGVyIDwgMTEpIHx8IChyZW1haW5kZXIgPiAxMykpIHtcclxuICAgICAgICAgICAgc3dpdGNoIChyZW1haW5kZXIgJSAxMCkge1xyXG4gICAgICAgICAgICAgICAgY2FzZSAxOiByZXR1cm4gJ3N0JztcclxuICAgICAgICAgICAgICAgIGNhc2UgMjogcmV0dXJuICduZCc7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDM6IHJldHVybiAncmQnO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiAndGgnO1xyXG4gICAgfVxyXG5cclxuICAgIHRhYnMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnN0IHRhYnMgPSBlbGVtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1uYXYtbGluaycpO1xyXG4gICAgICAgIGNvbnN0IHBhbmVzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLXRhYi1wYW5lJyk7XHJcbiAgICAgICAgY29uc3QgY2xlYXJBY3RpdmUgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwodGFicywgKHRhYikgPT4ge1xyXG4gICAgICAgICAgICAgICAgdGFiLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YWIuYXJpYVNlbGVjdGVkID0gZmFsc2U7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHBhbmVzLCBwYW5lID0+IHBhbmUuY2xhc3NMaXN0LnJlbW92ZSgndHJuLXRhYi1hY3RpdmUnKSk7XHJcbiAgICAgICAgfTtcclxuICAgICAgICBjb25zdCBzZXRBY3RpdmUgPSAodGFyZ2V0SWQpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0VGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignYVtocmVmPVwiIycgKyB0YXJnZXRJZCArICdcIl0udHJuLW5hdi1saW5rJyk7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBjbGVhckFjdGl2ZSgpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0VGFiLmNsYXNzTGlzdC5hZGQoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRUYWIuYXJpYVNlbGVjdGVkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0YXJnZXRQYW5lSWQpLmNsYXNzTGlzdC5hZGQoJ3Rybi10YWItYWN0aXZlJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG4gICAgICAgIGNvbnN0IHRhYkNsaWNrID0gKGV2ZW50KSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFRhYiA9IGV2ZW50LmN1cnJlbnRUYXJnZXQ7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBzZXRBY3RpdmUodGFyZ2V0UGFuZUlkKTtcclxuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhYnMsICh0YWIpID0+IHtcclxuICAgICAgICAgICAgdGFiLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGFiQ2xpY2spO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBpZiAobG9jYXRpb24uaGFzaCkge1xyXG4gICAgICAgICAgICBzZXRBY3RpdmUobG9jYXRpb24uaGFzaC5zdWJzdHIoMSkpO1xyXG4gICAgICAgIH0gZWxzZSBpZiAodGFicy5sZW5ndGggPiAwKSB7XHJcbiAgICAgICAgICAgIHNldEFjdGl2ZSh0YWJzWzBdLmRhdGFzZXQudGFyZ2V0KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG59XHJcblxyXG4vL3Rybi5pbml0aWFsaXplKCk7XHJcbmlmICghd2luZG93LnRybl9vYmpfaW5zdGFuY2UpIHtcclxuICAgIHdpbmRvdy50cm5fb2JqX2luc3RhbmNlID0gbmV3IFRvdXJuYW1hdGNoKCk7XHJcblxyXG4gICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgIGNvbnN0IHRhYlZpZXdzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLW5hdicpO1xyXG5cclxuICAgICAgICBBcnJheS5mcm9tKHRhYlZpZXdzKS5mb3JFYWNoKCh0YWIpID0+IHtcclxuICAgICAgICAgICAgdHJuLnRhYnModGFiKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgY29uc3QgZHJvcGRvd25zID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLWRyb3Bkb3duLXRvZ2dsZScpO1xyXG4gICAgICAgIGNvbnN0IGhhbmRsZURyb3Bkb3duQ2xvc2UgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICAgICAgZHJvcGRvd24ubmV4dEVsZW1lbnRTaWJsaW5nLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1zaG93Jyk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgaGFuZGxlRHJvcGRvd25DbG9zZSwgZmFsc2UpO1xyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICBkcm9wZG93bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICAgICAgICAgICAgICB0aGlzLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QuYWRkKCd0cm4tc2hvdycpO1xyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhhbmRsZURyb3Bkb3duQ2xvc2UsIGZhbHNlKTtcclxuICAgICAgICAgICAgfSwgZmFsc2UpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH0sIGZhbHNlKTtcclxufVxyXG5leHBvcnQgbGV0IHRybiA9IHdpbmRvdy50cm5fb2JqX2luc3RhbmNlO1xyXG5cclxuY2xhc3MgVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlIHtcclxuXHJcbiAgICAvLyBjdXJyZW50Rm9jdXM7XHJcbiAgICAvL1xyXG4gICAgLy8gbmFtZUlucHV0O1xyXG4gICAgLy9cclxuICAgIC8vIHNlbGY7XHJcblxyXG4gICAgY29uc3RydWN0b3IoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIC8vIHRoaXMuc2VsZiA9IHRoaXM7XHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQgPSBpbnB1dDtcclxuXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImlucHV0XCIsICgpID0+IHtcclxuICAgICAgICAgICAgbGV0IGEsIGIsIGksIHZhbCA9IHRoaXMubmFtZUlucHV0LnZhbHVlOy8vdGhpcy52YWx1ZTtcclxuICAgICAgICAgICAgbGV0IHBhcmVudCA9IHRoaXMubmFtZUlucHV0LnBhcmVudE5vZGU7Ly90aGlzLnBhcmVudE5vZGU7XHJcblxyXG4gICAgICAgICAgICAvLyBsZXQgcCA9IG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcclxuICAgICAgICAgICAgLy8gICAgIC8qIG5lZWQgdG8gcXVlcnkgc2VydmVyIGZvciBuYW1lcyBoZXJlLiAqL1xyXG4gICAgICAgICAgICAvLyAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLm9wZW4oJ0dFVCcsIG9wdGlvbnMuYXBpX3VybCArICdwbGF5ZXJzLz9zZWFyY2g9JyArIHZhbCArICcmcGVyX3BhZ2U9NScpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICAvLyByZXNvbHZlKEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tYXAoKHBsYXllcikgPT4ge3JldHVybiB7ICd2YWx1ZSc6IHBsYXllci5pZCwgJ3RleHQnOiBwbGF5ZXIubmFtZSB9O30pKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4gcGxheWVyLm5hbWU7fSkpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJlamVjdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH1cclxuICAgICAgICAgICAgLy8gICAgIH07XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2VuZCgpO1xyXG4gICAgICAgICAgICAvLyB9KTtcclxuICAgICAgICAgICAgZGF0YUNhbGxiYWNrKHZhbCkudGhlbigoZGF0YSkgPT4gey8vcC50aGVuKChkYXRhKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmNsb3NlIGFueSBhbHJlYWR5IG9wZW4gbGlzdHMgb2YgYXV0by1jb21wbGV0ZWQgdmFsdWVzKi9cclxuICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG4gICAgICAgICAgICAgICAgaWYgKCF2YWwpIHsgcmV0dXJuIGZhbHNlO31cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzID0gLTE7XHJcblxyXG4gICAgICAgICAgICAgICAgLypjcmVhdGUgYSBESVYgZWxlbWVudCB0aGF0IHdpbGwgY29udGFpbiB0aGUgaXRlbXMgKHZhbHVlcyk6Ki9cclxuICAgICAgICAgICAgICAgIGEgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgYS5zZXRBdHRyaWJ1dGUoXCJpZFwiLCB0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiY2xhc3NcIiwgXCJ0cm4tYXV0by1jb21wbGV0ZS1pdGVtc1wiKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmFwcGVuZCB0aGUgRElWIGVsZW1lbnQgYXMgYSBjaGlsZCBvZiB0aGUgYXV0by1jb21wbGV0ZSBjb250YWluZXI6Ki9cclxuICAgICAgICAgICAgICAgIHBhcmVudC5hcHBlbmRDaGlsZChhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmZvciBlYWNoIGl0ZW0gaW4gdGhlIGFycmF5Li4uKi9cclxuICAgICAgICAgICAgICAgIGZvciAoaSA9IDA7IGkgPCBkYXRhLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHRleHQsIHZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKiBXaGljaCBmb3JtYXQgZGlkIHRoZXkgZ2l2ZSB1cy4gKi9cclxuICAgICAgICAgICAgICAgICAgICBpZiAodHlwZW9mIGRhdGFbaV0gPT09ICdvYmplY3QnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldWyd0ZXh0J107XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXVsndmFsdWUnXTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0ID0gZGF0YVtpXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLypjaGVjayBpZiB0aGUgaXRlbSBzdGFydHMgd2l0aCB0aGUgc2FtZSBsZXR0ZXJzIGFzIHRoZSB0ZXh0IGZpZWxkIHZhbHVlOiovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpLnRvVXBwZXJDYXNlKCkgPT09IHZhbC50b1VwcGVyQ2FzZSgpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qY3JlYXRlIGEgRElWIGVsZW1lbnQgZm9yIGVhY2ggbWF0Y2hpbmcgZWxlbWVudDoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcIkRJVlwiKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLyptYWtlIHRoZSBtYXRjaGluZyBsZXR0ZXJzIGJvbGQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgPSBcIjxzdHJvbmc+XCIgKyB0ZXh0LnN1YnN0cigwLCB2YWwubGVuZ3RoKSArIFwiPC9zdHJvbmc+XCI7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IHRleHQuc3Vic3RyKHZhbC5sZW5ndGgpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLyppbnNlcnQgYSBpbnB1dCBmaWVsZCB0aGF0IHdpbGwgaG9sZCB0aGUgY3VycmVudCBhcnJheSBpdGVtJ3MgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gXCI8aW5wdXQgdHlwZT0naGlkZGVuJyB2YWx1ZT0nXCIgKyB2YWx1ZSArIFwiJz5cIjtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuZGF0YXNldC52YWx1ZSA9IHZhbHVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudGV4dCA9IHRleHQ7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIG9uIHRoZSBpdGVtIHZhbHVlIChESVYgZWxlbWVudCk6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGBpdGVtIGNsaWNrZWQgd2l0aCB2YWx1ZSAke2UuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlfWApO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGluc2VydCB0aGUgdmFsdWUgZm9yIHRoZSBhdXRvY29tcGxldGUgdGV4dCBmaWVsZDogKi9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LnZhbHVlID0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudGV4dDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRhdGFzZXQuc2VsZWN0ZWRJZCA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGNsb3NlIHRoZSBsaXN0IG9mIGF1dG9jb21wbGV0ZWQgdmFsdWVzLCAob3IgYW55IG90aGVyIG9wZW4gbGlzdHMgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXM6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRpc3BhdGNoRXZlbnQobmV3IEV2ZW50KCdjaGFuZ2UnKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBhLmFwcGVuZENoaWxkKGIpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHByZXNzZXMgYSBrZXkgb24gdGhlIGtleWJvYXJkOiovXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImtleWRvd25cIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgbGV0IHggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgaWYgKHgpIHggPSB4LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiZGl2XCIpO1xyXG4gICAgICAgICAgICBpZiAoZS5rZXlDb2RlID09PSA0MCkge1xyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgRE9XTiBrZXkgaXMgcHJlc3NlZCxcclxuICAgICAgICAgICAgICAgICBpbmNyZWFzZSB0aGUgY3VycmVudEZvY3VzIHZhcmlhYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cysrO1xyXG4gICAgICAgICAgICAgICAgLyphbmQgYW5kIG1ha2UgdGhlIGN1cnJlbnQgaXRlbSBtb3JlIHZpc2libGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuYWRkQWN0aXZlKHgpO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKGUua2V5Q29kZSA9PT0gMzgpIHsgLy91cFxyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgVVAga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgZGVjcmVhc2UgdGhlIGN1cnJlbnRGb2N1cyB2YXJpYWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMtLTtcclxuICAgICAgICAgICAgICAgIC8qYW5kIGFuZCBtYWtlIHRoZSBjdXJyZW50IGl0ZW0gbW9yZSB2aXNpYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT09IDEzKSB7XHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBFTlRFUiBrZXkgaXMgcHJlc3NlZCwgcHJldmVudCB0aGUgZm9ybSBmcm9tIGJlaW5nIHN1Ym1pdHRlZCwqL1xyXG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID4gLTEpIHtcclxuICAgICAgICAgICAgICAgICAgICAvKmFuZCBzaW11bGF0ZSBhIGNsaWNrIG9uIHRoZSBcImFjdGl2ZVwiIGl0ZW06Ki9cclxuICAgICAgICAgICAgICAgICAgICBpZiAoeCkgeFt0aGlzLmN1cnJlbnRGb2N1c10uY2xpY2soKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIGluIHRoZSBkb2N1bWVudDoqL1xyXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoZS50YXJnZXQpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIGFkZEFjdGl2ZSh4KSB7XHJcbiAgICAgICAgLyphIGZ1bmN0aW9uIHRvIGNsYXNzaWZ5IGFuIGl0ZW0gYXMgXCJhY3RpdmVcIjoqL1xyXG4gICAgICAgIGlmICgheCkgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIC8qc3RhcnQgYnkgcmVtb3ZpbmcgdGhlIFwiYWN0aXZlXCIgY2xhc3Mgb24gYWxsIGl0ZW1zOiovXHJcbiAgICAgICAgdGhpcy5yZW1vdmVBY3RpdmUoeCk7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID49IHgubGVuZ3RoKSB0aGlzLmN1cnJlbnRGb2N1cyA9IDA7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzIDwgMCkgdGhpcy5jdXJyZW50Rm9jdXMgPSAoeC5sZW5ndGggLSAxKTtcclxuICAgICAgICAvKmFkZCBjbGFzcyBcImF1dG9jb21wbGV0ZS1hY3RpdmVcIjoqL1xyXG4gICAgICAgIHhbdGhpcy5jdXJyZW50Rm9jdXNdLmNsYXNzTGlzdC5hZGQoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICB9XHJcblxyXG4gICAgcmVtb3ZlQWN0aXZlKHgpIHtcclxuICAgICAgICAvKmEgZnVuY3Rpb24gdG8gcmVtb3ZlIHRoZSBcImFjdGl2ZVwiIGNsYXNzIGZyb20gYWxsIGF1dG9jb21wbGV0ZSBpdGVtczoqL1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICB4W2ldLmNsYXNzTGlzdC5yZW1vdmUoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIGNsb3NlQWxsTGlzdHMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnNvbGUubG9nKFwiY2xvc2UgYWxsIGxpc3RzXCIpO1xyXG4gICAgICAgIC8qY2xvc2UgYWxsIGF1dG9jb21wbGV0ZSBsaXN0cyBpbiB0aGUgZG9jdW1lbnQsXHJcbiAgICAgICAgIGV4Y2VwdCB0aGUgb25lIHBhc3NlZCBhcyBhbiBhcmd1bWVudDoqL1xyXG4gICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICBpZiAoZWxlbWVudCAhPT0geFtpXSAmJiBlbGVtZW50ICE9PSB0aGlzLm5hbWVJbnB1dCkge1xyXG4gICAgICAgICAgICAgICAgeFtpXS5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHhbaV0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59XHJcblxyXG4vLyBGaXJzdCwgY2hlY2tzIGlmIGl0IGlzbid0IGltcGxlbWVudGVkIHlldC5cclxuaWYgKCFTdHJpbmcucHJvdG90eXBlLmZvcm1hdCkge1xyXG4gICAgU3RyaW5nLnByb3RvdHlwZS5mb3JtYXQgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICBjb25zdCBhcmdzID0gYXJndW1lbnRzO1xyXG4gICAgICAgIHJldHVybiB0aGlzLnJlcGxhY2UoL3soXFxkKyl9L2csIGZ1bmN0aW9uKG1hdGNoLCBudW1iZXIpIHtcclxuICAgICAgICAgICAgcmV0dXJuIHR5cGVvZiBhcmdzW251bWJlcl0gIT09ICd1bmRlZmluZWQnXHJcbiAgICAgICAgICAgICAgICA/IGFyZ3NbbnVtYmVyXVxyXG4gICAgICAgICAgICAgICAgOiBtYXRjaFxyXG4gICAgICAgICAgICAgICAgO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfTtcclxufSIsIi8vIFRoZSBtb2R1bGUgY2FjaGVcbnZhciBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX18gPSB7fTtcblxuLy8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbmZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG5cdHZhciBjYWNoZWRNb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdO1xuXHRpZiAoY2FjaGVkTW9kdWxlICE9PSB1bmRlZmluZWQpIHtcblx0XHRyZXR1cm4gY2FjaGVkTW9kdWxlLmV4cG9ydHM7XG5cdH1cblx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcblx0dmFyIG1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF0gPSB7XG5cdFx0Ly8gbm8gbW9kdWxlLmlkIG5lZWRlZFxuXHRcdC8vIG5vIG1vZHVsZS5sb2FkZWQgbmVlZGVkXG5cdFx0ZXhwb3J0czoge31cblx0fTtcblxuXHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cblx0X193ZWJwYWNrX21vZHVsZXNfX1ttb2R1bGVJZF0obW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cblx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcblx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xufVxuXG4iLCIvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9ucyBmb3IgaGFybW9ueSBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSAoZXhwb3J0cywgZGVmaW5pdGlvbikgPT4ge1xuXHRmb3IodmFyIGtleSBpbiBkZWZpbml0aW9uKSB7XG5cdFx0aWYoX193ZWJwYWNrX3JlcXVpcmVfXy5vKGRlZmluaXRpb24sIGtleSkgJiYgIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBrZXkpKSB7XG5cdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywga2V5LCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZGVmaW5pdGlvbltrZXldIH0pO1xuXHRcdH1cblx0fVxufTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSAob2JqLCBwcm9wKSA9PiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iaiwgcHJvcCkpIiwiLy8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5yID0gKGV4cG9ydHMpID0+IHtcblx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG5cdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG5cdH1cblx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbn07IiwiLyoqXHJcbiAqIExhZGRlciBzdGFuZGluZ3MgcGFnZS5cclxuICpcclxuICogQGxpbmsgICAgICAgaHR0cHM6Ly93d3cudG91cm5hbWF0Y2guY29tXHJcbiAqIEBzaW5jZSAgICAgIDMuMTEuMFxyXG4gKlxyXG4gKiBAcGFja2FnZSAgICBUb3VybmFtYXRjaFxyXG4gKlxyXG4gKi9cclxuaW1wb3J0IHsgdHJuIH0gZnJvbSAnLi90b3VybmFtYXRjaC5qcyc7XHJcbmltcG9ydCB7IGVzY2FwZUhUTUwgfSBmcm9tICdAd29yZHByZXNzL2VzY2FwZS1odG1sJztcclxuXHJcbihmdW5jdGlvbiAoJCkge1xyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICAgIGxldCBvcHRpb25zID0gdHJuX2xhZGRlcl9zdGFuZGluZ3Nfb3B0aW9ucztcclxuXHJcbiAgICBmdW5jdGlvbiBoYW5kbGVQcm9tb3RlTGluaygpIHtcclxuICAgICAgICBsZXQgcHJvbW90ZUxpbmtzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLXByb21vdGUtY29tcGV0aXRvci1saW5rJyk7XHJcbiAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChwcm9tb3RlTGlua3MsIGZ1bmN0aW9uIChwcm9tb3RlTGluaykge1xyXG4gICAgICAgICAgICBwcm9tb3RlTGluay5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uIChldmVudCkge1xyXG4gICAgICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICAgICAgICAgICAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgICAgICB4aHIub3BlbignUE9TVCcsIGAke29wdGlvbnMuYXBpX3VybH1sYWRkZXItY29tcGV0aXRvcnMvJHtwcm9tb3RlTGluay5kYXRhc2V0LmNvbXBldGl0b3JJZH0vcHJvbW90ZWApO1xyXG4gICAgICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDMwMykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB3aW5kb3cubG9jYXRpb24ucmVsb2FkKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IHJlc3BvbnNlID0gSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLXByb21vdGUtY29tcGV0aXRvci1yZXNwb25zZScpLmlubmVySFRNTCA9IGA8ZGl2IGNsYXNzPVwidHJuLWFsZXJ0IHRybi1hbGVydC1kYW5nZXJcIj48c3Ryb25nPiR7b3B0aW9ucy5sYW5ndWFnZS5mYWlsdXJlfTwvc3Ryb25nPjogJHtlc2NhcGVIVE1MKHJlc3BvbnNlLm1lc3NhZ2UpfTwvZGl2PmA7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfTtcclxuXHJcbiAgICAgICAgICAgICAgICB4aHIuc2VuZCgpO1xyXG4gICAgICAgICAgICB9LCBmYWxzZSk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgZnVuY3Rpb24gaGFuZGxlRGVsZXRlQ29uZmlybSgpIHtcclxuICAgICAgICBsZXQgbGlua3MgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tcmVtb3ZlLWNvbXBldGl0b3ItbGluaycpO1xyXG4gICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwobGlua3MsIGZ1bmN0aW9uIChsaW5rKSB7XHJcbiAgICAgICAgICAgIGxpbmsuYWRkRXZlbnRMaXN0ZW5lcigndHJuLmNvbmZpcm1lZC5hY3Rpb24uZGVsZXRlLWNvbXBldGl0b3InLCBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcblxyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coYG1vZGFsIHdhcyBjb25maXJtZWQgZm9yIGxpbmsgJHtsaW5rLmRhdGFzZXQuY29tcGV0aXRvcklkfWApO1xyXG4gICAgICAgICAgICAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAgICAgeGhyLm9wZW4oJ0RFTEVURScsIGAke29wdGlvbnMuYXBpX3VybH1sYWRkZXItY29tcGV0aXRvcnMvJHtsaW5rLmRhdGFzZXQuY29tcGV0aXRvcklkfT9hZG1pbj0xYCk7XHJcbiAgICAgICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQ29udGVudC1UeXBlJywgJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcpO1xyXG4gICAgICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtV1AtTm9uY2UnLCBvcHRpb25zLnJlc3Rfbm9uY2UpO1xyXG4gICAgICAgICAgICAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoeGhyLnN0YXR1cyA9PT0gMjA0KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5yZWxvYWQoKTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBsZXQgcmVzcG9uc2UgPSBKU09OLnBhcnNlKHhoci5yZXNwb25zZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tcmVtb3ZlLWNvbXBldGl0b3ItcmVzcG9uc2UnKS5pbm5lckhUTUwgPSBgPGRpdiBjbGFzcz1cInRybi1hbGVydCB0cm4tYWxlcnQtZGFuZ2VyXCI+PHN0cm9uZz4ke29wdGlvbnMubGFuZ3VhZ2UuZmFpbHVyZX08L3N0cm9uZz46ICR7ZXNjYXBlSFRNTChyZXNwb25zZS5tZXNzYWdlKX08L2Rpdj5gO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgICAgICAgICAgeGhyLnNlbmQoKTtcclxuICAgICAgICAgICAgfSwgZmFsc2UpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ3Rybi1odG1sLXVwZGF0ZWQnLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICBoYW5kbGVEZWxldGVDb25maXJtKCk7XHJcbiAgICAgICAgICAgIGhhbmRsZVByb21vdGVMaW5rKCk7XHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgaGFuZGxlRGVsZXRlQ29uZmlybSgpO1xyXG4gICAgICAgIGhhbmRsZVByb21vdGVMaW5rKCk7XHJcblxyXG4gICAgICAgIGxldCBkZWZhdWx0X3RhcmdldCA9IG9wdGlvbnMuZGVmYXVsdF90YXJnZXQ7XHJcbiAgICAgICAgbGV0IHRhcmdldCA9IDA7XHJcbiAgICAgICAgbGV0IGNvbHVtbkRlZnMgPSBbXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IHRhcmdldCsrLFxyXG4gICAgICAgICAgICAgICAgbmFtZTogJ251bWJlcicsXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tbGFkZGVyLXN0YW5kaW5ncy10YWJsZS1udW1iZXInLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93LCBtZXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIG1ldGEucm93ICsgbWV0YS5zZXR0aW5ncy5faURpc3BsYXlTdGFydCArIDE7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgb3JkZXJhYmxlOiBmYWxzZSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogdGFyZ2V0KyssXHJcbiAgICAgICAgICAgICAgICBuYW1lOiAnbmFtZScsXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tbGFkZGVyLXN0YW5kaW5ncy10YWJsZS1uYW1lJyxcclxuICAgICAgICAgICAgICAgIHJlbmRlcjogZnVuY3Rpb24gKGRhdGEsIHR5cGUsIHJvdykge1xyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiBgPGltZyBzcmM9XCIke29wdGlvbnMuZmxhZ19wYXRofSR7ZXNjYXBlSFRNTChyb3cuX2VtYmVkZGVkLmNvbXBldGl0b3JbMF0uZmxhZyl9XCIgd2lkdGg9XCIxOFwiIGhlaWdodD1cIjEyXCIgdGl0bGU9XCIke2VzY2FwZUhUTUwocm93Ll9lbWJlZGRlZC5jb21wZXRpdG9yWzBdLmZsYWcpfVwiPiA8YSBocmVmPVwiJHtyb3cuX2VtYmVkZGVkLmNvbXBldGl0b3JbMF0ubGlua31cIj4ke2VzY2FwZUhUTUwocm93Ll9lbWJlZGRlZC5jb21wZXRpdG9yWzBdLm5hbWUpfTwvYT5gO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogdGFyZ2V0KyssXHJcbiAgICAgICAgICAgICAgICBuYW1lOiBkZWZhdWx0X3RhcmdldCxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1sYWRkZXItc3RhbmRpbmdzLXRhYmxlLXJhdGluZyByYXRpbmcnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvd1tkZWZhdWx0X3RhcmdldF07XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRzOiB0YXJnZXQrKyxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICdnYW1lc19wbGF5ZWQnLFxyXG4gICAgICAgICAgICAgICAgY2xhc3NOYW1lOiAndHJuLWxhZGRlci1zdGFuZGluZ3MtdGFibGUtZ2FtZXMtcGxheWVkJyxcclxuICAgICAgICAgICAgICAgIHJlbmRlcjogZnVuY3Rpb24gKGRhdGEsIHR5cGUsIHJvdykge1xyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiByb3cuZ2FtZXNfcGxheWVkO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogdGFyZ2V0KyssXHJcbiAgICAgICAgICAgICAgICBuYW1lOiAnd2lucycsXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tbGFkZGVyLXN0YW5kaW5ncy10YWJsZS13aW5zIHdpbnMnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvdy53aW5zO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogdGFyZ2V0KyssXHJcbiAgICAgICAgICAgICAgICBuYW1lOiAnbG9zc2VzJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1sYWRkZXItc3RhbmRpbmdzLXRhYmxlLWxvc3NlcyBsb3NzZXMnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvdy5sb3NzZXM7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgIF07XHJcblxyXG4gICAgICAgIGlmIChvcHRpb25zLnVzZXNfZHJhd3MpIHtcclxuICAgICAgICAgICAgY29sdW1uRGVmcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IHRhcmdldCsrLFxyXG4gICAgICAgICAgICAgICAgbmFtZTogJ2RyYXdzJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1sYWRkZXItc3RhbmRpbmdzLXRhYmxlLWRyYXdzIHRpZXMnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvdy5kcmF3cztcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYgKG9wdGlvbnMudXNlc19zY29yZXMpIHtcclxuICAgICAgICAgICAgY29sdW1uRGVmcy5wdXNoKFxyXG4gICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgIHRhcmdldHM6IHRhcmdldCsrLFxyXG4gICAgICAgICAgICAgICAgICAgIG5hbWU6ICdnb2Fsc19mb3InLFxyXG4gICAgICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1sYWRkZXItc3RhbmRpbmdzLXRhYmxlLWdvYWxzLWZvcicsXHJcbiAgICAgICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiByb3cuZ29hbHNfZm9yO1xyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgIHRhcmdldHM6IHRhcmdldCsrLFxyXG4gICAgICAgICAgICAgICAgICAgIG5hbWU6ICdnb2Fsc19hZ2FpbnN0JyxcclxuICAgICAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tbGFkZGVyLXN0YW5kaW5ncy10YWJsZS1nb2Fscy1hZ2FpbnN0JyxcclxuICAgICAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uIChkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvdy5nb2Fsc19hZ2FpbnN0O1xyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgIHRhcmdldHM6IHRhcmdldCsrLFxyXG4gICAgICAgICAgICAgICAgICAgIG5hbWU6ICdnb2Fsc19kaWZmZXJlbmNlJyxcclxuICAgICAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tbGFkZGVyLXN0YW5kaW5ncy10YWJsZS1nb2Fscy1kaWZmZXJlbmNlJyxcclxuICAgICAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uIChkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvdy5nb2Fsc19kZWx0YTtcclxuICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICApO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgY29sdW1uRGVmcy5wdXNoKFxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRzOiB0YXJnZXQrKyxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICd3aW5fcGVyY2VudCcsXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tbGFkZGVyLXN0YW5kaW5ncy10YWJsZS13aW4tcGVyY2VudCcsXHJcbiAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uIChkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gcm93Lndpbl9wZXJjZW50O1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogdGFyZ2V0KyssXHJcbiAgICAgICAgICAgICAgICBuYW1lOiAnc3RyZWFrJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1sYWRkZXItc3RhbmRpbmdzLXRhYmxlLXN0cmVhaycsXHJcbiAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uIChkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICBsZXQgc3RyZWFrQ2xhc3M7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKDAgPiByb3cuc3RyZWFrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHN0cmVha0NsYXNzID0gYG5lZ2F0aXZlLXN0cmVha2A7XHJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIGlmICgwIDwgcm93LnN0cmVhaykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBzdHJlYWtDbGFzcyA9IGBwb3NpdGl2ZS1zdHJlYWtgO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHN0cmVha0NsYXNzID0gYGA7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiBgPHNwYW4gY2xhc3M9XCIke3N0cmVha0NsYXNzfVwiPiR7cm93LnN0cmVha308L3NwYW4+YDtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IHRhcmdldCsrLFxyXG4gICAgICAgICAgICAgICAgbmFtZTogJ2lkbGUnLFxyXG4gICAgICAgICAgICAgICAgY2xhc3NOYW1lOiAndHJuLWxhZGRlci1zdGFuZGluZ3MtdGFibGUtaWRsZScsXHJcbiAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uIChkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICBsZXQgaWRsZUNsYXNzO1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICg3ID49IHJvdy5kYXlzX2lkbGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWRsZUNsYXNzID0gYHRybi1sYWRkZXItYWN0aXZlLWxhc3QtN2A7XHJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIGlmICgxNCA+PSByb3cuZGF5c19pZGxlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlkbGVDbGFzcyA9IGB0cm4tbGFkZGVyLWFjdGl2ZS1sYXN0LTE0YDtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2UgaWYgKDIxID49IHJvdy5kYXlzX2lkbGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWRsZUNsYXNzID0gYHRybi1sYWRkZXItYWN0aXZlLWxhc3QtMjFgO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlkbGVDbGFzcyA9IGB0cm4tbGFkZGVyLWluYWN0aXZlYDtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGA8c3BhbiBjbGFzcz1cIiR7aWRsZUNsYXNzfVwiPiR7cm93LmRheXNfaWRsZX08L3NwYW4+YDtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICApO1xyXG5cclxuICAgICAgICBpZiAob3B0aW9ucy5jYW5fY2hhbGxlbmdlIHx8IG9wdGlvbnMuaXNfYWRtaW4pIHtcclxuICAgICAgICAgICAgY29sdW1uRGVmcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IHRhcmdldCxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICdhY3Rpb25zJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1sYWRkZXItc3RhbmRpbmdzLXRhYmxlLWFjdGlvbnMnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IGxpbmtzID0gW107XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIGlmIChvcHRpb25zLmNhbl9jaGFsbGVuZ2UpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGlua3MucHVzaChgPGEgaHJlZj1cIiR7b3B0aW9ucy5jaGFsbGVuZ2VfdXJsfSR7cm93LmNvbXBldGl0b3JfaWR9XCIgdGl0bGU9XCIke29wdGlvbnMubGFuZ3VhZ2UuY2hhbGxlbmdlX2xpbmtfdGl0bGV9XCI+PGkgY2xhc3M9XCJmYSBmYS1jcm9zc2hhaXJzXCIgYXJpYS1oaWRkZW49XCJ0cnVlXCI+PC9pPjwvYT5gKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIGlmIChvcHRpb25zLmlzX2FkbWluKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGxpbmtzLnB1c2goYDxhIGhyZWY9XCIke3Jvdy5lZGl0X2xpbmt9XCIgdGl0bGU9XCIke29wdGlvbnMubGFuZ3VhZ2UuZWRpdF9saW5rX3RpdGxlfVwiPjxpIGNsYXNzPVwiZmEgZmEtZWRpdFwiIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPjwvaT48L2E+YCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCBjb21wZXRpdG9yX25hbWUgPSBgYDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCdwbGF5ZXInID09PSByb3cuY29tcGV0aXRvcl90eXBlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb21wZXRpdG9yX25hbWUgPSBvcHRpb25zLmxhbmd1YWdlLmNvbmZpcm1fZGVsZXRlX21lc3NhZ2UuZm9ybWF0KGVzY2FwZUhUTUwocm93Ll9lbWJlZGRlZC5jb21wZXRpdG9yWzBdLm5hbWUpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbXBldGl0b3JfbmFtZSA9IG9wdGlvbnMubGFuZ3VhZ2UuY29uZmlybV9kZWxldGVfbWVzc2FnZS5mb3JtYXQoZXNjYXBlSFRNTChyb3cuX2VtYmVkZGVkLmNvbXBldGl0b3JbMF0ubmFtZSkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGxpbmtzLnB1c2goYDxhIGNsYXNzPVwidHJuLXJlbW92ZS1jb21wZXRpdG9yLWxpbmsgdHJuLWNvbmZpcm0tYWN0aW9uLWxpbmtcIiBocmVmPVwiI1wiIHRpdGxlPVwiJHtvcHRpb25zLmxhbmd1YWdlLnJlbW92ZV9saW5rX3RpdGxlfVwiIGRhdGEtY29tcGV0aXRvci1pZD1cIiR7cm93LmxhZGRlcl9lbnRyeV9pZH1cIiBkYXRhLWNvbmZpcm0tdGl0bGU9XCIke29wdGlvbnMubGFuZ3VhZ2UuY29uZmlybV9kZWxldGVfdGl0bGV9XCIgZGF0YS1jb25maXJtLW1lc3NhZ2U9XCIke2VzY2FwZUhUTUwoY29tcGV0aXRvcl9uYW1lKX1cIiBkYXRhLW1vZGFsLWlkPVwiZGVsZXRlLWNvbXBldGl0b3JcIj48aSBjbGFzcz1cImZhIGZhLXRyYXNoXCIgYXJpYS1oaWRkZW49XCJ0cnVlXCI+PC9pPjwvYT5gKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKG9wdGlvbnMuY2FuX3Byb21vdGUgJiYgMSAhPT0gcm93LnJhbmspIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgbGlua3MucHVzaChgPGEgY2xhc3M9XCJ0cm4tcHJvbW90ZS1jb21wZXRpdG9yLWxpbmtcIiBocmVmPVwiI1wiIHRpdGxlPVwiJHtvcHRpb25zLmxhbmd1YWdlLnByb21vdGVfbGlua190aXRsZX1cIiBkYXRhLWNvbXBldGl0b3ItaWQ9XCIke3Jvdy5sYWRkZXJfY29tcGV0aXRvcl9pZH1cIj48aSBjbGFzcz1cImZhIGZhLWxvbmctYXJyb3ctYWx0LXVwXCIgYXJpYS1oaWRkZW49XCJ0cnVlXCI+PC9pPjwvYT5gKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKGxpbmtzLmxlbmd0aCA+IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGxpbmtzLmpvaW4oJyAnKTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gYGA7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIG9yZGVyYWJsZTogZmFsc2UsXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgY29uc3QgZGVmYXVsdF9kaXJlY3Rpb24gPSAnZGVzYyc7XHJcbiAgICAgICAgbGV0IHN0YW5kaW5ncyA9IGpRdWVyeSgnI2xhZGRlci1zdGFuZGluZ3MtdGFibGUnKVxyXG4gICAgICAgICAgICAub24oJ3hoci5kdCcsIGZ1bmN0aW9uIChlLCBzZXR0aW5ncywganNvbiwgeGhyKSB7XHJcbiAgICAgICAgICAgICAgICBqc29uLmRhdGEgPSBKU09OLnBhcnNlKEpTT04uc3RyaW5naWZ5KGpzb24pKTtcclxuICAgICAgICAgICAgICAgIGpzb24ucmVjb3Jkc1RvdGFsID0geGhyLmdldFJlc3BvbnNlSGVhZGVyKCdYLVdQLVRvdGFsJyk7XHJcbiAgICAgICAgICAgICAgICBqc29uLnJlY29yZHNGaWx0ZXJlZCA9IHhoci5nZXRSZXNwb25zZUhlYWRlcignVFJOLUZpbHRlcmVkJyk7XHJcbiAgICAgICAgICAgICAgICBqc29uLmxlbmd0aCA9IHhoci5nZXRSZXNwb25zZUhlYWRlcignWC1XUC1Ub3RhbFBhZ2VzJyk7XHJcbiAgICAgICAgICAgICAgICBqc29uLmRyYXcgPSB4aHIuZ2V0UmVzcG9uc2VIZWFkZXIoJ1RSTi1EcmF3Jyk7XHJcbiAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgIC5EYXRhVGFibGUoe1xyXG4gICAgICAgICAgICAgICAgcHJvY2Vzc2luZzogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIHNlcnZlclNpZGU6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBsZW5ndGhNZW51OiBbWzI1LCA1MCwgMTAwLCAtMV0sIFsyNSwgNTAsIDEwMCwgJ0FsbCddXSxcclxuICAgICAgICAgICAgICAgIGxhbmd1YWdlOiBvcHRpb25zLnRhYmxlX2xhbmd1YWdlLFxyXG4gICAgICAgICAgICAgICAgYXV0b1dpZHRoOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGFqYXg6IHtcclxuICAgICAgICAgICAgICAgICAgICB1cmw6IGAke29wdGlvbnMuYXBpX3VybH1sYWRkZXItY29tcGV0aXRvcnMvP193cG5vbmNlPSR7b3B0aW9ucy5yZXN0X25vbmNlfSZfZW1iZWQmbGFkZGVyX2lkPSR7b3B0aW9ucy5sYWRkZXJfaWR9YCxcclxuICAgICAgICAgICAgICAgICAgICB0eXBlOiAnR0VUJyxcclxuICAgICAgICAgICAgICAgICAgICBkYXRhOiBmdW5jdGlvbiAoZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4ge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZHJhdzogZGF0YS5kcmF3LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcGFnZTogTWF0aC5mbG9vcihkYXRhLnN0YXJ0IC8gZGF0YS5sZW5ndGgpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcGVyX3BhZ2U6IGRhdGEubGVuZ3RoLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VhcmNoOiBkYXRhLnNlYXJjaC52YWx1ZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9yZGVyYnk6IGAke2RhdGEuY29sdW1uc1tkYXRhLm9yZGVyWzBdLmNvbHVtbl0ubmFtZX0uJHtkYXRhLm9yZGVyWzBdLmRpcn1gXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIG9yZGVyOiBbWzIsIGRlZmF1bHRfZGlyZWN0aW9uXV0sXHJcbiAgICAgICAgICAgICAgICBjb2x1bW5EZWZzOiBjb2x1bW5EZWZzLFxyXG4gICAgICAgICAgICAgICAgZHJhd0NhbGxiYWNrOiBmdW5jdGlvbiggc2V0dGluZ3MgKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZG9jdW1lbnQuZGlzcGF0Y2hFdmVudCggbmV3IEN1c3RvbUV2ZW50KCAndHJuLWh0bWwtdXBkYXRlZCcsIHsgJ2RldGFpbCc6ICdUaGUgdGFibGUgaHRtbCBoYXMgdXBkYXRlZC4nIH0gKSk7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICB9KTtcclxuICAgIH0sIGZhbHNlKTtcclxufSkodHJuKTsiXSwibmFtZXMiOlsiX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuIiwidmFsdWUiLCJyZXBsYWNlIiwiUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUiLCJlc2NhcGVBbXBlcnNhbmQiLCJlc2NhcGVRdW90YXRpb25NYXJrIiwiZXNjYXBlTGVzc1RoYW4iLCJlc2NhcGVBdHRyaWJ1dGUiLCJlc2NhcGVIVE1MIiwiZXNjYXBlRWRpdGFibGVIVE1MIiwiaXNWYWxpZEF0dHJpYnV0ZU5hbWUiLCJuYW1lIiwidGVzdCIsIl90eXBlb2YiLCJvIiwiU3ltYm9sIiwiaXRlcmF0b3IiLCJjb25zdHJ1Y3RvciIsInByb3RvdHlwZSIsIl9jbGFzc0NhbGxDaGVjayIsImEiLCJuIiwiVHlwZUVycm9yIiwiX2RlZmluZVByb3BlcnRpZXMiLCJlIiwiciIsInQiLCJsZW5ndGgiLCJlbnVtZXJhYmxlIiwiY29uZmlndXJhYmxlIiwid3JpdGFibGUiLCJPYmplY3QiLCJkZWZpbmVQcm9wZXJ0eSIsIl90b1Byb3BlcnR5S2V5Iiwia2V5IiwiX2NyZWF0ZUNsYXNzIiwiaSIsIl90b1ByaW1pdGl2ZSIsInRvUHJpbWl0aXZlIiwiY2FsbCIsIlN0cmluZyIsIk51bWJlciIsIlRvdXJuYW1hdGNoIiwiZXZlbnRzIiwicGFyYW0iLCJvYmplY3QiLCJwcmVmaXgiLCJzdHIiLCJwcm9wIiwiaGFzT3duUHJvcGVydHkiLCJrIiwidiIsInB1c2giLCJlbmNvZGVVUklDb21wb25lbnQiLCJqb2luIiwiZXZlbnQiLCJldmVudE5hbWUiLCJFdmVudFRhcmdldCIsImF1dG9jb21wbGV0ZSIsImlucHV0IiwiZGF0YUNhbGxiYWNrIiwiVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlIiwidWNmaXJzdCIsInMiLCJjaGFyQXQiLCJ0b1VwcGVyQ2FzZSIsInNsaWNlIiwib3JkaW5hbF9zdWZmaXgiLCJudW1iZXIiLCJyZW1haW5kZXIiLCJ0YWJzIiwiZWxlbWVudCIsImdldEVsZW1lbnRzQnlDbGFzc05hbWUiLCJwYW5lcyIsImRvY3VtZW50IiwiY2xlYXJBY3RpdmUiLCJBcnJheSIsImZvckVhY2giLCJ0YWIiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJhcmlhU2VsZWN0ZWQiLCJwYW5lIiwic2V0QWN0aXZlIiwidGFyZ2V0SWQiLCJ0YXJnZXRUYWIiLCJxdWVyeVNlbGVjdG9yIiwidGFyZ2V0UGFuZUlkIiwiZGF0YXNldCIsInRhcmdldCIsImFkZCIsImdldEVsZW1lbnRCeUlkIiwidGFiQ2xpY2siLCJjdXJyZW50VGFyZ2V0IiwicHJldmVudERlZmF1bHQiLCJhZGRFdmVudExpc3RlbmVyIiwibG9jYXRpb24iLCJoYXNoIiwic3Vic3RyIiwid2luZG93IiwidHJuX29ial9pbnN0YW5jZSIsInRhYlZpZXdzIiwiZnJvbSIsInRybiIsImRyb3Bkb3ducyIsImhhbmRsZURyb3Bkb3duQ2xvc2UiLCJkcm9wZG93biIsIm5leHRFbGVtZW50U2libGluZyIsInJlbW92ZUV2ZW50TGlzdGVuZXIiLCJzdG9wUHJvcGFnYXRpb24iLCJfdGhpcyIsIm5hbWVJbnB1dCIsImIiLCJ2YWwiLCJwYXJlbnQiLCJwYXJlbnROb2RlIiwidGhlbiIsImRhdGEiLCJjb25zb2xlIiwibG9nIiwiY2xvc2VBbGxMaXN0cyIsImN1cnJlbnRGb2N1cyIsImNyZWF0ZUVsZW1lbnQiLCJzZXRBdHRyaWJ1dGUiLCJpZCIsImFwcGVuZENoaWxkIiwidGV4dCIsImlubmVySFRNTCIsImNvbmNhdCIsInNlbGVjdGVkSWQiLCJkaXNwYXRjaEV2ZW50IiwiRXZlbnQiLCJ4IiwiZ2V0RWxlbWVudHNCeVRhZ05hbWUiLCJrZXlDb2RlIiwiYWRkQWN0aXZlIiwiY2xpY2siLCJyZW1vdmVBY3RpdmUiLCJyZW1vdmVDaGlsZCIsImZvcm1hdCIsImFyZ3MiLCJhcmd1bWVudHMiLCJtYXRjaCIsIiQiLCJvcHRpb25zIiwidHJuX2xhZGRlcl9zdGFuZGluZ3Nfb3B0aW9ucyIsImhhbmRsZVByb21vdGVMaW5rIiwicHJvbW90ZUxpbmtzIiwicHJvbW90ZUxpbmsiLCJ4aHIiLCJYTUxIdHRwUmVxdWVzdCIsIm9wZW4iLCJhcGlfdXJsIiwiY29tcGV0aXRvcklkIiwic2V0UmVxdWVzdEhlYWRlciIsInJlc3Rfbm9uY2UiLCJvbmxvYWQiLCJzdGF0dXMiLCJyZWxvYWQiLCJyZXNwb25zZSIsIkpTT04iLCJwYXJzZSIsImxhbmd1YWdlIiwiZmFpbHVyZSIsIm1lc3NhZ2UiLCJzZW5kIiwiaGFuZGxlRGVsZXRlQ29uZmlybSIsImxpbmtzIiwibGluayIsImRlZmF1bHRfdGFyZ2V0IiwiY29sdW1uRGVmcyIsInRhcmdldHMiLCJjbGFzc05hbWUiLCJyZW5kZXIiLCJ0eXBlIiwicm93IiwibWV0YSIsInNldHRpbmdzIiwiX2lEaXNwbGF5U3RhcnQiLCJvcmRlcmFibGUiLCJmbGFnX3BhdGgiLCJfZW1iZWRkZWQiLCJjb21wZXRpdG9yIiwiZmxhZyIsImdhbWVzX3BsYXllZCIsIndpbnMiLCJsb3NzZXMiLCJ1c2VzX2RyYXdzIiwiZHJhd3MiLCJ1c2VzX3Njb3JlcyIsImdvYWxzX2ZvciIsImdvYWxzX2FnYWluc3QiLCJnb2Fsc19kZWx0YSIsIndpbl9wZXJjZW50Iiwic3RyZWFrQ2xhc3MiLCJzdHJlYWsiLCJpZGxlQ2xhc3MiLCJkYXlzX2lkbGUiLCJjYW5fY2hhbGxlbmdlIiwiaXNfYWRtaW4iLCJjaGFsbGVuZ2VfdXJsIiwiY29tcGV0aXRvcl9pZCIsImNoYWxsZW5nZV9saW5rX3RpdGxlIiwiZWRpdF9saW5rIiwiZWRpdF9saW5rX3RpdGxlIiwiY29tcGV0aXRvcl9uYW1lIiwiY29tcGV0aXRvcl90eXBlIiwiY29uZmlybV9kZWxldGVfbWVzc2FnZSIsInJlbW92ZV9saW5rX3RpdGxlIiwibGFkZGVyX2VudHJ5X2lkIiwiY29uZmlybV9kZWxldGVfdGl0bGUiLCJjYW5fcHJvbW90ZSIsInJhbmsiLCJwcm9tb3RlX2xpbmtfdGl0bGUiLCJsYWRkZXJfY29tcGV0aXRvcl9pZCIsImRlZmF1bHRfZGlyZWN0aW9uIiwic3RhbmRpbmdzIiwialF1ZXJ5Iiwib24iLCJqc29uIiwic3RyaW5naWZ5IiwicmVjb3Jkc1RvdGFsIiwiZ2V0UmVzcG9uc2VIZWFkZXIiLCJyZWNvcmRzRmlsdGVyZWQiLCJkcmF3IiwiRGF0YVRhYmxlIiwicHJvY2Vzc2luZyIsInNlcnZlclNpZGUiLCJsZW5ndGhNZW51IiwidGFibGVfbGFuZ3VhZ2UiLCJhdXRvV2lkdGgiLCJhamF4IiwidXJsIiwibGFkZGVyX2lkIiwicGFnZSIsIk1hdGgiLCJmbG9vciIsInN0YXJ0IiwicGVyX3BhZ2UiLCJzZWFyY2giLCJvcmRlcmJ5IiwiY29sdW1ucyIsIm9yZGVyIiwiY29sdW1uIiwiZGlyIiwiZHJhd0NhbGxiYWNrIiwiQ3VzdG9tRXZlbnQiXSwic291cmNlUm9vdCI6IiJ9
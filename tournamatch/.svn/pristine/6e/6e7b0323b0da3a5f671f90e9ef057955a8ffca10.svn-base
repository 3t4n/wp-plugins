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
/*!***************************!*\
  !*** ./src/js/players.js ***!
  \***************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
/**
 * Player list page.
 *
 * @link       https://www.tournamatch.com
 * @since      3.21.0
 *
 * @package    Tournamatch
 *
 */


(function (jQuery, $) {
  'use strict';

  var options = trn_table_options;
  window.addEventListener('load', function () {
    var columnDefs = [{
      targets: 0,
      name: 'display_name',
      className: 'trn-players-table-name',
      render: function render(data, type, row) {
        return "<a href=\"".concat(row.link, "\">").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row.name), "</a>");
      }
    }, {
      targets: 1,
      name: 'joined_date',
      className: 'trn-players-table-joined',
      render: function render(data, type, row) {
        return row.joined_date.rendered;
      }
    }, {
      targets: 2,
      name: 'location',
      className: 'trn-players-table-location',
      render: function render(data, type, row) {
        return (0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row.location);
      }
    }, {
      targets: 3,
      name: 'teams',
      className: 'trn-players-table-teams',
      render: function render(data, type, row) {
        return row.teams;
      }
    }];
    if (options.user_capability) {
      columnDefs.push({
        targets: 4,
        name: 'actions',
        className: 'trn-players-table-admin',
        render: function render(data, type, row) {
          return "<a href=\"".concat(row.link, "/edit\" title=\"").concat(options.language.edit_player, "\"><i class=\"fa fa-edit\"></i></a>");
        },
        orderable: false
      });
    }
    jQuery('#trn_players_list_table').on('xhr.dt', function (e, settings, json, xhr) {
      json.data = JSON.parse(JSON.stringify(json));
      json.recordsTotal = xhr.getResponseHeader('X-WP-Total');
      json.recordsFiltered = xhr.getResponseHeader('TRN-Filtered');
      json.length = xhr.getResponseHeader('X-WP-TotalPages');
      json.draw = xhr.getResponseHeader('TRN-Draw');
    }).DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'All']],
      language: options['table_language'],
      autoWidth: false,
      ajax: {
        url: "".concat(options.api_url, "players/?_wpnonce=").concat(options.rest_nonce),
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
      order: [[0, 'asc']],
      columnDefs: columnDefs
    });
  }, false);
})(jQuery, _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QU8sQ0FBQ3ZFLEtBQUksQ0FBQ3dFLEtBQUssQ0FBQyxDQUFDLENBQUMsQ0FBQ0MsTUFBTSxDQUFDLENBQUNuTCxJQUFJLE9BQUFxSCxNQUFBLENBQUlYLEtBQUksQ0FBQ3dFLEtBQUssQ0FBQyxDQUFDLENBQUMsQ0FBQ0UsR0FBRztVQUM1RSxDQUFDO1FBQ0w7TUFDSixDQUFDO01BQ0RGLEtBQUssRUFBRSxDQUFDLENBQUMsQ0FBQyxFQUFFLEtBQUssQ0FBQyxDQUFDO01BQ25CMUMsVUFBVSxFQUFFQTtJQUNoQixDQUFDLENBQUM7RUFFVixDQUFDLEVBQUUsS0FBSyxDQUFDO0FBQ2IsQ0FBQyxFQUFFSixNQUFNLEVBQUV4QyxnREFBSSxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly90b3VybmFtYXRjaC9Ad29yZHByZXNzL2VzY2FwZS1odG1sL3NyYy9lc2NhcGUtZ3JlYXRlci5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC9Ad29yZHByZXNzL2VzY2FwZS1odG1sL3NyYy9pbmRleC5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC8uL3NyYy9qcy90b3VybmFtYXRjaC5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL2Jvb3RzdHJhcCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvZGVmaW5lIHByb3BlcnR5IGdldHRlcnMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2hhc093blByb3BlcnR5IHNob3J0aGFuZCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvbWFrZSBuYW1lc3BhY2Ugb2JqZWN0Iiwid2VicGFjazovL3RvdXJuYW1hdGNoLy4vc3JjL2pzL3BsYXllcnMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggZ3JlYXRlci10aGFuIHNpZ24gcmVwbGFjZWQuXG4gKlxuICogTm90ZSB0aGF0IGlmIGEgcmVzb2x1dGlvbiBmb3IgVHJhYyM0NTM4NyBjb21lcyB0byBmcnVpdGlvbiwgaXQgaXMgbm8gbG9uZ2VyXG4gKiBuZWNlc3NhcnkgZm9yIGBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW5gIHRvIGV4aXN0LlxuICpcbiAqIFNlZTogaHR0cHM6Ly9jb3JlLnRyYWMud29yZHByZXNzLm9yZy90aWNrZXQvNDUzODdcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbiggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvPi9nLCAnJmd0OycgKTtcbn1cbiIsIi8qKlxuICogSW50ZXJuYWwgZGVwZW5kZW5jaWVzXG4gKi9cbmltcG9ydCBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4gZnJvbSAnLi9lc2NhcGUtZ3JlYXRlcic7XG5cbi8qKlxuICogUmVndWxhciBleHByZXNzaW9uIG1hdGNoaW5nIGludmFsaWQgYXR0cmlidXRlIG5hbWVzLlxuICpcbiAqIFwiQXR0cmlidXRlIG5hbWVzIG11c3QgY29uc2lzdCBvZiBvbmUgb3IgbW9yZSBjaGFyYWN0ZXJzIG90aGVyIHRoYW4gY29udHJvbHMsXG4gKiBVKzAwMjAgU1BBQ0UsIFUrMDAyMiAoXCIpLCBVKzAwMjcgKCcpLCBVKzAwM0UgKD4pLCBVKzAwMkYgKC8pLCBVKzAwM0QgKD0pLFxuICogYW5kIG5vbmNoYXJhY3RlcnMuXCJcbiAqXG4gKiBAc2VlIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3N5bnRheC5odG1sI2F0dHJpYnV0ZXMtMlxuICpcbiAqIEB0eXBlIHtSZWdFeHB9XG4gKi9cbmNvbnN0IFJFR0VYUF9JTlZBTElEX0FUVFJJQlVURV9OQU1FID0gL1tcXHUwMDdGLVxcdTAwOUYgXCInPi89XCJcXHVGREQwLVxcdUZERUZdLztcblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggYW1wZXJzYW5kcyBlc2NhcGVkLiBOb3RlIHRoYXQgdGhpcyBpcyBhbiBpbXBlcmZlY3RcbiAqIGltcGxlbWVudGF0aW9uLCB3aGVyZSBvbmx5IGFtcGVyc2FuZHMgd2hpY2ggZG8gbm90IGFwcGVhciBhcyBhIHBhdHRlcm4gb2ZcbiAqIG5hbWVkLCBkZWNpbWFsLCBvciBoZXhhZGVjaW1hbCBjaGFyYWN0ZXIgcmVmZXJlbmNlcyBhcmUgZXNjYXBlZC4gSW52YWxpZFxuICogbmFtZWQgcmVmZXJlbmNlcyAoaS5lLiBhbWJpZ3VvdXMgYW1wZXJzYW5kKSBhcmUgc3RpbGwgcGVybWl0dGVkLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjY2hhcmFjdGVyLXJlZmVyZW5jZXNcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjYW1iaWd1b3VzLWFtcGVyc2FuZFxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNuYW1lZC1jaGFyYWN0ZXItcmVmZXJlbmNlc1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvJig/IShbYS16MC05XSt8I1swLTldK3wjeFthLWYwLTldKyk7KS9naSwgJyZhbXA7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBxdW90YXRpb24gbWFya3MgcmVwbGFjZWQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlUXVvdGF0aW9uTWFyayggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvXCIvZywgJyZxdW90OycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggbGVzcy10aGFuIHNpZ24gcmVwbGFjZWQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlTGVzc1RoYW4oIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLzwvZywgJyZsdDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIGF0dHJpYnV0ZSB2YWx1ZS5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2VsZW1lbnRzLWF0dHJpYnV0ZXNcbiAqXG4gKiBcIlsuLi5dIHRoZSB0ZXh0IGNhbm5vdCBjb250YWluIGFuIGFtYmlndW91cyBhbXBlcnNhbmQgWy4uLl0gbXVzdCBub3QgY29udGFpblxuICogYW55IGxpdGVyYWwgVSswMDIyIFFVT1RBVElPTiBNQVJLIGNoYXJhY3RlcnMgKFwiKVwiXG4gKlxuICogTm90ZSB3ZSBhbHNvIGVzY2FwZSB0aGUgZ3JlYXRlciB0aGFuIHN5bWJvbCwgYXMgdGhpcyBpcyB1c2VkIGJ5IHdwdGV4dHVyaXplIHRvXG4gKiBzcGxpdCBIVE1MIHN0cmluZ3MuIFRoaXMgaXMgYSBXb3JkUHJlc3Mgc3BlY2lmaWMgZml4XG4gKlxuICogTm90ZSB0aGF0IGlmIGEgcmVzb2x1dGlvbiBmb3IgVHJhYyM0NTM4NyBjb21lcyB0byBmcnVpdGlvbiwgaXQgaXMgbm8gbG9uZ2VyXG4gKiBuZWNlc3NhcnkgZm9yIGBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW5gIHRvIGJlIHVzZWQuXG4gKlxuICogU2VlOiBodHRwczovL2NvcmUudHJhYy53b3JkcHJlc3Mub3JnL3RpY2tldC80NTM4N1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBBdHRyaWJ1dGUgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIGF0dHJpYnV0ZSB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUF0dHJpYnV0ZSggdmFsdWUgKSB7XG5cdHJldHVybiBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4oXG5cdFx0ZXNjYXBlUXVvdGF0aW9uTWFyayggZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApIClcblx0KTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGFuIGVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjd3JpdGluZy1odG1sLWRvY3VtZW50cy1lbGVtZW50c1xuICpcbiAqIFwidGhlIHRleHQgbXVzdCBub3QgY29udGFpbiB0aGUgY2hhcmFjdGVyIFUrMDAzQyBMRVNTLVRIQU4gU0lHTiAoPCkgb3IgYW5cbiAqIGFtYmlndW91cyBhbXBlcnNhbmQuXCJcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgRWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlSFRNTCggdmFsdWUgKSB7XG5cdHJldHVybiBlc2NhcGVMZXNzVGhhbiggZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIEVkaXRhYmxlIEhUTUwgZWxlbWVudCB2YWx1ZS4gVGhpcyBpcyBkaWZmZXJlbnQgZnJvbVxuICogYGVzY2FwZUhUTUxgLCBiZWNhdXNlIGZvciBlZGl0YWJsZSBIVE1MLCBBTEwgYW1wZXJzYW5kcyBtdXN0IGJlIGVzY2FwZWQgaW5cbiAqIG9yZGVyIHRvIHJlbmRlciB0aGUgY29udGVudCBjb3JyZWN0bHkgb24gdGhlIHBhZ2UuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUVkaXRhYmxlSFRNTCggdmFsdWUgKSB7XG5cdHJldHVybiBlc2NhcGVMZXNzVGhhbiggdmFsdWUucmVwbGFjZSggLyYvZywgJyZhbXA7JyApICk7XG59XG5cbi8qKlxuICogUmV0dXJucyB0cnVlIGlmIHRoZSBnaXZlbiBhdHRyaWJ1dGUgbmFtZSBpcyB2YWxpZCwgb3IgZmFsc2Ugb3RoZXJ3aXNlLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSBuYW1lIEF0dHJpYnV0ZSBuYW1lIHRvIHRlc3QuXG4gKlxuICogQHJldHVybiB7Ym9vbGVhbn0gV2hldGhlciBhdHRyaWJ1dGUgaXMgdmFsaWQuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBpc1ZhbGlkQXR0cmlidXRlTmFtZSggbmFtZSApIHtcblx0cmV0dXJuICEgUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUudGVzdCggbmFtZSApO1xufVxuIiwiJ3VzZSBzdHJpY3QnO1xyXG5jbGFzcyBUb3VybmFtYXRjaCB7XHJcblxyXG4gICAgY29uc3RydWN0b3IoKSB7XHJcbiAgICAgICAgdGhpcy5ldmVudHMgPSB7fTtcclxuICAgIH1cclxuXHJcbiAgICBwYXJhbShvYmplY3QsIHByZWZpeCkge1xyXG4gICAgICAgIGxldCBzdHIgPSBbXTtcclxuICAgICAgICBmb3IgKGxldCBwcm9wIGluIG9iamVjdCkge1xyXG4gICAgICAgICAgICBpZiAob2JqZWN0Lmhhc093blByb3BlcnR5KHByb3ApKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgayA9IHByZWZpeCA/IHByZWZpeCArIFwiW1wiICsgcHJvcCArIFwiXVwiIDogcHJvcDtcclxuICAgICAgICAgICAgICAgIGxldCB2ID0gb2JqZWN0W3Byb3BdO1xyXG4gICAgICAgICAgICAgICAgc3RyLnB1c2goKHYgIT09IG51bGwgJiYgdHlwZW9mIHYgPT09IFwib2JqZWN0XCIpID8gdGhpcy5wYXJhbSh2LCBrKSA6IGVuY29kZVVSSUNvbXBvbmVudChrKSArIFwiPVwiICsgZW5jb2RlVVJJQ29tcG9uZW50KHYpKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gc3RyLmpvaW4oXCImXCIpO1xyXG4gICAgfVxyXG5cclxuICAgIGV2ZW50KGV2ZW50TmFtZSkge1xyXG4gICAgICAgIGlmICghKGV2ZW50TmFtZSBpbiB0aGlzLmV2ZW50cykpIHtcclxuICAgICAgICAgICAgdGhpcy5ldmVudHNbZXZlbnROYW1lXSA9IG5ldyBFdmVudFRhcmdldChldmVudE5hbWUpO1xyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gdGhpcy5ldmVudHNbZXZlbnROYW1lXTtcclxuICAgIH1cclxuXHJcbiAgICBhdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIG5ldyBUb3VybmFtYXRjaF9BdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjayk7XHJcbiAgICB9XHJcblxyXG4gICAgdWNmaXJzdChzKSB7XHJcbiAgICAgICAgaWYgKHR5cGVvZiBzICE9PSAnc3RyaW5nJykgcmV0dXJuICcnO1xyXG4gICAgICAgIHJldHVybiBzLmNoYXJBdCgwKS50b1VwcGVyQ2FzZSgpICsgcy5zbGljZSgxKTtcclxuICAgIH1cclxuXHJcbiAgICBvcmRpbmFsX3N1ZmZpeChudW1iZXIpIHtcclxuICAgICAgICBjb25zdCByZW1haW5kZXIgPSBudW1iZXIgJSAxMDA7XHJcblxyXG4gICAgICAgIGlmICgocmVtYWluZGVyIDwgMTEpIHx8IChyZW1haW5kZXIgPiAxMykpIHtcclxuICAgICAgICAgICAgc3dpdGNoIChyZW1haW5kZXIgJSAxMCkge1xyXG4gICAgICAgICAgICAgICAgY2FzZSAxOiByZXR1cm4gJ3N0JztcclxuICAgICAgICAgICAgICAgIGNhc2UgMjogcmV0dXJuICduZCc7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDM6IHJldHVybiAncmQnO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiAndGgnO1xyXG4gICAgfVxyXG5cclxuICAgIHRhYnMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnN0IHRhYnMgPSBlbGVtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1uYXYtbGluaycpO1xyXG4gICAgICAgIGNvbnN0IHBhbmVzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLXRhYi1wYW5lJyk7XHJcbiAgICAgICAgY29uc3QgY2xlYXJBY3RpdmUgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwodGFicywgKHRhYikgPT4ge1xyXG4gICAgICAgICAgICAgICAgdGFiLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YWIuYXJpYVNlbGVjdGVkID0gZmFsc2U7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHBhbmVzLCBwYW5lID0+IHBhbmUuY2xhc3NMaXN0LnJlbW92ZSgndHJuLXRhYi1hY3RpdmUnKSk7XHJcbiAgICAgICAgfTtcclxuICAgICAgICBjb25zdCBzZXRBY3RpdmUgPSAodGFyZ2V0SWQpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0VGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignYVtocmVmPVwiIycgKyB0YXJnZXRJZCArICdcIl0udHJuLW5hdi1saW5rJyk7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBjbGVhckFjdGl2ZSgpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0VGFiLmNsYXNzTGlzdC5hZGQoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRUYWIuYXJpYVNlbGVjdGVkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0YXJnZXRQYW5lSWQpLmNsYXNzTGlzdC5hZGQoJ3Rybi10YWItYWN0aXZlJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG4gICAgICAgIGNvbnN0IHRhYkNsaWNrID0gKGV2ZW50KSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFRhYiA9IGV2ZW50LmN1cnJlbnRUYXJnZXQ7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBzZXRBY3RpdmUodGFyZ2V0UGFuZUlkKTtcclxuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhYnMsICh0YWIpID0+IHtcclxuICAgICAgICAgICAgdGFiLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGFiQ2xpY2spO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBpZiAobG9jYXRpb24uaGFzaCkge1xyXG4gICAgICAgICAgICBzZXRBY3RpdmUobG9jYXRpb24uaGFzaC5zdWJzdHIoMSkpO1xyXG4gICAgICAgIH0gZWxzZSBpZiAodGFicy5sZW5ndGggPiAwKSB7XHJcbiAgICAgICAgICAgIHNldEFjdGl2ZSh0YWJzWzBdLmRhdGFzZXQudGFyZ2V0KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG59XHJcblxyXG4vL3Rybi5pbml0aWFsaXplKCk7XHJcbmlmICghd2luZG93LnRybl9vYmpfaW5zdGFuY2UpIHtcclxuICAgIHdpbmRvdy50cm5fb2JqX2luc3RhbmNlID0gbmV3IFRvdXJuYW1hdGNoKCk7XHJcblxyXG4gICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgIGNvbnN0IHRhYlZpZXdzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLW5hdicpO1xyXG5cclxuICAgICAgICBBcnJheS5mcm9tKHRhYlZpZXdzKS5mb3JFYWNoKCh0YWIpID0+IHtcclxuICAgICAgICAgICAgdHJuLnRhYnModGFiKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgY29uc3QgZHJvcGRvd25zID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLWRyb3Bkb3duLXRvZ2dsZScpO1xyXG4gICAgICAgIGNvbnN0IGhhbmRsZURyb3Bkb3duQ2xvc2UgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICAgICAgZHJvcGRvd24ubmV4dEVsZW1lbnRTaWJsaW5nLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1zaG93Jyk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgaGFuZGxlRHJvcGRvd25DbG9zZSwgZmFsc2UpO1xyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICBkcm9wZG93bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICAgICAgICAgICAgICB0aGlzLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QuYWRkKCd0cm4tc2hvdycpO1xyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhhbmRsZURyb3Bkb3duQ2xvc2UsIGZhbHNlKTtcclxuICAgICAgICAgICAgfSwgZmFsc2UpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH0sIGZhbHNlKTtcclxufVxyXG5leHBvcnQgbGV0IHRybiA9IHdpbmRvdy50cm5fb2JqX2luc3RhbmNlO1xyXG5cclxuY2xhc3MgVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlIHtcclxuXHJcbiAgICAvLyBjdXJyZW50Rm9jdXM7XHJcbiAgICAvL1xyXG4gICAgLy8gbmFtZUlucHV0O1xyXG4gICAgLy9cclxuICAgIC8vIHNlbGY7XHJcblxyXG4gICAgY29uc3RydWN0b3IoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIC8vIHRoaXMuc2VsZiA9IHRoaXM7XHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQgPSBpbnB1dDtcclxuXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImlucHV0XCIsICgpID0+IHtcclxuICAgICAgICAgICAgbGV0IGEsIGIsIGksIHZhbCA9IHRoaXMubmFtZUlucHV0LnZhbHVlOy8vdGhpcy52YWx1ZTtcclxuICAgICAgICAgICAgbGV0IHBhcmVudCA9IHRoaXMubmFtZUlucHV0LnBhcmVudE5vZGU7Ly90aGlzLnBhcmVudE5vZGU7XHJcblxyXG4gICAgICAgICAgICAvLyBsZXQgcCA9IG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcclxuICAgICAgICAgICAgLy8gICAgIC8qIG5lZWQgdG8gcXVlcnkgc2VydmVyIGZvciBuYW1lcyBoZXJlLiAqL1xyXG4gICAgICAgICAgICAvLyAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLm9wZW4oJ0dFVCcsIG9wdGlvbnMuYXBpX3VybCArICdwbGF5ZXJzLz9zZWFyY2g9JyArIHZhbCArICcmcGVyX3BhZ2U9NScpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICAvLyByZXNvbHZlKEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tYXAoKHBsYXllcikgPT4ge3JldHVybiB7ICd2YWx1ZSc6IHBsYXllci5pZCwgJ3RleHQnOiBwbGF5ZXIubmFtZSB9O30pKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4gcGxheWVyLm5hbWU7fSkpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJlamVjdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH1cclxuICAgICAgICAgICAgLy8gICAgIH07XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2VuZCgpO1xyXG4gICAgICAgICAgICAvLyB9KTtcclxuICAgICAgICAgICAgZGF0YUNhbGxiYWNrKHZhbCkudGhlbigoZGF0YSkgPT4gey8vcC50aGVuKChkYXRhKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmNsb3NlIGFueSBhbHJlYWR5IG9wZW4gbGlzdHMgb2YgYXV0by1jb21wbGV0ZWQgdmFsdWVzKi9cclxuICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG4gICAgICAgICAgICAgICAgaWYgKCF2YWwpIHsgcmV0dXJuIGZhbHNlO31cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzID0gLTE7XHJcblxyXG4gICAgICAgICAgICAgICAgLypjcmVhdGUgYSBESVYgZWxlbWVudCB0aGF0IHdpbGwgY29udGFpbiB0aGUgaXRlbXMgKHZhbHVlcyk6Ki9cclxuICAgICAgICAgICAgICAgIGEgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgYS5zZXRBdHRyaWJ1dGUoXCJpZFwiLCB0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiY2xhc3NcIiwgXCJ0cm4tYXV0by1jb21wbGV0ZS1pdGVtc1wiKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmFwcGVuZCB0aGUgRElWIGVsZW1lbnQgYXMgYSBjaGlsZCBvZiB0aGUgYXV0by1jb21wbGV0ZSBjb250YWluZXI6Ki9cclxuICAgICAgICAgICAgICAgIHBhcmVudC5hcHBlbmRDaGlsZChhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmZvciBlYWNoIGl0ZW0gaW4gdGhlIGFycmF5Li4uKi9cclxuICAgICAgICAgICAgICAgIGZvciAoaSA9IDA7IGkgPCBkYXRhLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHRleHQsIHZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKiBXaGljaCBmb3JtYXQgZGlkIHRoZXkgZ2l2ZSB1cy4gKi9cclxuICAgICAgICAgICAgICAgICAgICBpZiAodHlwZW9mIGRhdGFbaV0gPT09ICdvYmplY3QnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldWyd0ZXh0J107XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXVsndmFsdWUnXTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0ID0gZGF0YVtpXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLypjaGVjayBpZiB0aGUgaXRlbSBzdGFydHMgd2l0aCB0aGUgc2FtZSBsZXR0ZXJzIGFzIHRoZSB0ZXh0IGZpZWxkIHZhbHVlOiovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpLnRvVXBwZXJDYXNlKCkgPT09IHZhbC50b1VwcGVyQ2FzZSgpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qY3JlYXRlIGEgRElWIGVsZW1lbnQgZm9yIGVhY2ggbWF0Y2hpbmcgZWxlbWVudDoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcIkRJVlwiKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLyptYWtlIHRoZSBtYXRjaGluZyBsZXR0ZXJzIGJvbGQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgPSBcIjxzdHJvbmc+XCIgKyB0ZXh0LnN1YnN0cigwLCB2YWwubGVuZ3RoKSArIFwiPC9zdHJvbmc+XCI7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IHRleHQuc3Vic3RyKHZhbC5sZW5ndGgpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLyppbnNlcnQgYSBpbnB1dCBmaWVsZCB0aGF0IHdpbGwgaG9sZCB0aGUgY3VycmVudCBhcnJheSBpdGVtJ3MgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gXCI8aW5wdXQgdHlwZT0naGlkZGVuJyB2YWx1ZT0nXCIgKyB2YWx1ZSArIFwiJz5cIjtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuZGF0YXNldC52YWx1ZSA9IHZhbHVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudGV4dCA9IHRleHQ7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIG9uIHRoZSBpdGVtIHZhbHVlIChESVYgZWxlbWVudCk6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGBpdGVtIGNsaWNrZWQgd2l0aCB2YWx1ZSAke2UuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlfWApO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGluc2VydCB0aGUgdmFsdWUgZm9yIHRoZSBhdXRvY29tcGxldGUgdGV4dCBmaWVsZDogKi9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LnZhbHVlID0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudGV4dDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRhdGFzZXQuc2VsZWN0ZWRJZCA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGNsb3NlIHRoZSBsaXN0IG9mIGF1dG9jb21wbGV0ZWQgdmFsdWVzLCAob3IgYW55IG90aGVyIG9wZW4gbGlzdHMgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXM6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRpc3BhdGNoRXZlbnQobmV3IEV2ZW50KCdjaGFuZ2UnKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBhLmFwcGVuZENoaWxkKGIpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHByZXNzZXMgYSBrZXkgb24gdGhlIGtleWJvYXJkOiovXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImtleWRvd25cIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgbGV0IHggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgaWYgKHgpIHggPSB4LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiZGl2XCIpO1xyXG4gICAgICAgICAgICBpZiAoZS5rZXlDb2RlID09PSA0MCkge1xyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgRE9XTiBrZXkgaXMgcHJlc3NlZCxcclxuICAgICAgICAgICAgICAgICBpbmNyZWFzZSB0aGUgY3VycmVudEZvY3VzIHZhcmlhYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cysrO1xyXG4gICAgICAgICAgICAgICAgLyphbmQgYW5kIG1ha2UgdGhlIGN1cnJlbnQgaXRlbSBtb3JlIHZpc2libGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuYWRkQWN0aXZlKHgpO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKGUua2V5Q29kZSA9PT0gMzgpIHsgLy91cFxyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgVVAga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgZGVjcmVhc2UgdGhlIGN1cnJlbnRGb2N1cyB2YXJpYWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMtLTtcclxuICAgICAgICAgICAgICAgIC8qYW5kIGFuZCBtYWtlIHRoZSBjdXJyZW50IGl0ZW0gbW9yZSB2aXNpYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT09IDEzKSB7XHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBFTlRFUiBrZXkgaXMgcHJlc3NlZCwgcHJldmVudCB0aGUgZm9ybSBmcm9tIGJlaW5nIHN1Ym1pdHRlZCwqL1xyXG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID4gLTEpIHtcclxuICAgICAgICAgICAgICAgICAgICAvKmFuZCBzaW11bGF0ZSBhIGNsaWNrIG9uIHRoZSBcImFjdGl2ZVwiIGl0ZW06Ki9cclxuICAgICAgICAgICAgICAgICAgICBpZiAoeCkgeFt0aGlzLmN1cnJlbnRGb2N1c10uY2xpY2soKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIGluIHRoZSBkb2N1bWVudDoqL1xyXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoZS50YXJnZXQpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIGFkZEFjdGl2ZSh4KSB7XHJcbiAgICAgICAgLyphIGZ1bmN0aW9uIHRvIGNsYXNzaWZ5IGFuIGl0ZW0gYXMgXCJhY3RpdmVcIjoqL1xyXG4gICAgICAgIGlmICgheCkgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIC8qc3RhcnQgYnkgcmVtb3ZpbmcgdGhlIFwiYWN0aXZlXCIgY2xhc3Mgb24gYWxsIGl0ZW1zOiovXHJcbiAgICAgICAgdGhpcy5yZW1vdmVBY3RpdmUoeCk7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID49IHgubGVuZ3RoKSB0aGlzLmN1cnJlbnRGb2N1cyA9IDA7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzIDwgMCkgdGhpcy5jdXJyZW50Rm9jdXMgPSAoeC5sZW5ndGggLSAxKTtcclxuICAgICAgICAvKmFkZCBjbGFzcyBcImF1dG9jb21wbGV0ZS1hY3RpdmVcIjoqL1xyXG4gICAgICAgIHhbdGhpcy5jdXJyZW50Rm9jdXNdLmNsYXNzTGlzdC5hZGQoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICB9XHJcblxyXG4gICAgcmVtb3ZlQWN0aXZlKHgpIHtcclxuICAgICAgICAvKmEgZnVuY3Rpb24gdG8gcmVtb3ZlIHRoZSBcImFjdGl2ZVwiIGNsYXNzIGZyb20gYWxsIGF1dG9jb21wbGV0ZSBpdGVtczoqL1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICB4W2ldLmNsYXNzTGlzdC5yZW1vdmUoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIGNsb3NlQWxsTGlzdHMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnNvbGUubG9nKFwiY2xvc2UgYWxsIGxpc3RzXCIpO1xyXG4gICAgICAgIC8qY2xvc2UgYWxsIGF1dG9jb21wbGV0ZSBsaXN0cyBpbiB0aGUgZG9jdW1lbnQsXHJcbiAgICAgICAgIGV4Y2VwdCB0aGUgb25lIHBhc3NlZCBhcyBhbiBhcmd1bWVudDoqL1xyXG4gICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICBpZiAoZWxlbWVudCAhPT0geFtpXSAmJiBlbGVtZW50ICE9PSB0aGlzLm5hbWVJbnB1dCkge1xyXG4gICAgICAgICAgICAgICAgeFtpXS5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHhbaV0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59XHJcblxyXG4vLyBGaXJzdCwgY2hlY2tzIGlmIGl0IGlzbid0IGltcGxlbWVudGVkIHlldC5cclxuaWYgKCFTdHJpbmcucHJvdG90eXBlLmZvcm1hdCkge1xyXG4gICAgU3RyaW5nLnByb3RvdHlwZS5mb3JtYXQgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICBjb25zdCBhcmdzID0gYXJndW1lbnRzO1xyXG4gICAgICAgIHJldHVybiB0aGlzLnJlcGxhY2UoL3soXFxkKyl9L2csIGZ1bmN0aW9uKG1hdGNoLCBudW1iZXIpIHtcclxuICAgICAgICAgICAgcmV0dXJuIHR5cGVvZiBhcmdzW251bWJlcl0gIT09ICd1bmRlZmluZWQnXHJcbiAgICAgICAgICAgICAgICA/IGFyZ3NbbnVtYmVyXVxyXG4gICAgICAgICAgICAgICAgOiBtYXRjaFxyXG4gICAgICAgICAgICAgICAgO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfTtcclxufSIsIi8vIFRoZSBtb2R1bGUgY2FjaGVcbnZhciBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX18gPSB7fTtcblxuLy8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbmZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG5cdHZhciBjYWNoZWRNb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdO1xuXHRpZiAoY2FjaGVkTW9kdWxlICE9PSB1bmRlZmluZWQpIHtcblx0XHRyZXR1cm4gY2FjaGVkTW9kdWxlLmV4cG9ydHM7XG5cdH1cblx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcblx0dmFyIG1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF0gPSB7XG5cdFx0Ly8gbm8gbW9kdWxlLmlkIG5lZWRlZFxuXHRcdC8vIG5vIG1vZHVsZS5sb2FkZWQgbmVlZGVkXG5cdFx0ZXhwb3J0czoge31cblx0fTtcblxuXHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cblx0X193ZWJwYWNrX21vZHVsZXNfX1ttb2R1bGVJZF0obW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cblx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcblx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xufVxuXG4iLCIvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9ucyBmb3IgaGFybW9ueSBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSAoZXhwb3J0cywgZGVmaW5pdGlvbikgPT4ge1xuXHRmb3IodmFyIGtleSBpbiBkZWZpbml0aW9uKSB7XG5cdFx0aWYoX193ZWJwYWNrX3JlcXVpcmVfXy5vKGRlZmluaXRpb24sIGtleSkgJiYgIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBrZXkpKSB7XG5cdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywga2V5LCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZGVmaW5pdGlvbltrZXldIH0pO1xuXHRcdH1cblx0fVxufTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSAob2JqLCBwcm9wKSA9PiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iaiwgcHJvcCkpIiwiLy8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5yID0gKGV4cG9ydHMpID0+IHtcblx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG5cdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG5cdH1cblx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbn07IiwiLyoqXHJcbiAqIFBsYXllciBsaXN0IHBhZ2UuXHJcbiAqXHJcbiAqIEBsaW5rICAgICAgIGh0dHBzOi8vd3d3LnRvdXJuYW1hdGNoLmNvbVxyXG4gKiBAc2luY2UgICAgICAzLjIxLjBcclxuICpcclxuICogQHBhY2thZ2UgICAgVG91cm5hbWF0Y2hcclxuICpcclxuICovXHJcbmltcG9ydCB7IHRybiB9IGZyb20gJy4vdG91cm5hbWF0Y2guanMnO1xyXG5pbXBvcnQgeyBlc2NhcGVIVE1MIH0gZnJvbSAnQHdvcmRwcmVzcy9lc2NhcGUtaHRtbCc7XHJcblxyXG4oZnVuY3Rpb24oalF1ZXJ5LCAkKXtcclxuICAgICd1c2Ugc3RyaWN0JztcclxuXHJcbiAgICBjb25zdCBvcHRpb25zID0gdHJuX3RhYmxlX29wdGlvbnM7XHJcblxyXG4gICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgbGV0IGNvbHVtbkRlZnMgPSBbXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IDAsXHJcbiAgICAgICAgICAgICAgICBuYW1lOiAnZGlzcGxheV9uYW1lJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1wbGF5ZXJzLXRhYmxlLW5hbWUnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGA8YSBocmVmPVwiJHtyb3cubGlua31cIj4ke2VzY2FwZUhUTUwocm93Lm5hbWUpfTwvYT5gO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMSxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICdqb2luZWRfZGF0ZScsXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tcGxheWVycy10YWJsZS1qb2luZWQnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvdy5qb2luZWRfZGF0ZS5yZW5kZXJlZFxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMixcclxuICAgICAgICAgICAgICAgIG5hbWU6ICdsb2NhdGlvbicsXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tcGxheWVycy10YWJsZS1sb2NhdGlvbicsXHJcbiAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uIChkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gZXNjYXBlSFRNTChyb3cubG9jYXRpb24pO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMyxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICd0ZWFtcycsXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tcGxheWVycy10YWJsZS10ZWFtcycsXHJcbiAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uIChkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gcm93LnRlYW1zO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICBdO1xyXG4gICAgICAgIGlmIChvcHRpb25zLnVzZXJfY2FwYWJpbGl0eSkge1xyXG4gICAgICAgICAgICBjb2x1bW5EZWZzLnB1c2goXHJcbiAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGFyZ2V0czogNCxcclxuICAgICAgICAgICAgICAgICAgICBuYW1lOiAnYWN0aW9ucycsXHJcbiAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lOiAndHJuLXBsYXllcnMtdGFibGUtYWRtaW4nLFxyXG4gICAgICAgICAgICAgICAgICAgIHJlbmRlcjogZnVuY3Rpb24gKGRhdGEsIHR5cGUsIHJvdykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gYDxhIGhyZWY9XCIke3Jvdy5saW5rfS9lZGl0XCIgdGl0bGU9XCIke29wdGlvbnMubGFuZ3VhZ2UuZWRpdF9wbGF5ZXJ9XCI+PGkgY2xhc3M9XCJmYSBmYS1lZGl0XCI+PC9pPjwvYT5gO1xyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgb3JkZXJhYmxlOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGpRdWVyeSgnI3Rybl9wbGF5ZXJzX2xpc3RfdGFibGUnKVxyXG4gICAgICAgICAgICAub24oJ3hoci5kdCcsIGZ1bmN0aW9uIChlLCBzZXR0aW5ncywganNvbiwgeGhyKSB7XHJcbiAgICAgICAgICAgICAgICBqc29uLmRhdGEgPSBKU09OLnBhcnNlKEpTT04uc3RyaW5naWZ5KGpzb24pKTtcclxuICAgICAgICAgICAgICAgIGpzb24ucmVjb3Jkc1RvdGFsID0geGhyLmdldFJlc3BvbnNlSGVhZGVyKCdYLVdQLVRvdGFsJyk7XHJcbiAgICAgICAgICAgICAgICBqc29uLnJlY29yZHNGaWx0ZXJlZCA9IHhoci5nZXRSZXNwb25zZUhlYWRlcignVFJOLUZpbHRlcmVkJyk7XHJcbiAgICAgICAgICAgICAgICBqc29uLmxlbmd0aCA9IHhoci5nZXRSZXNwb25zZUhlYWRlcignWC1XUC1Ub3RhbFBhZ2VzJyk7XHJcbiAgICAgICAgICAgICAgICBqc29uLmRyYXcgPSB4aHIuZ2V0UmVzcG9uc2VIZWFkZXIoJ1RSTi1EcmF3Jyk7XHJcbiAgICAgICAgICAgIH0pXHJcbiAgICAgICAgICAgIC5EYXRhVGFibGUoe1xyXG4gICAgICAgICAgICAgICAgcHJvY2Vzc2luZzogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIHNlcnZlclNpZGU6IHRydWUsXHJcbiAgICAgICAgICAgICAgICBsZW5ndGhNZW51OiBbWzI1LCA1MCwgMTAwLCAtMV0sIFsyNSwgNTAsIDEwMCwgJ0FsbCddXSxcclxuICAgICAgICAgICAgICAgIGxhbmd1YWdlOiBvcHRpb25zWyd0YWJsZV9sYW5ndWFnZSddLFxyXG4gICAgICAgICAgICAgICAgYXV0b1dpZHRoOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGFqYXg6IHtcclxuICAgICAgICAgICAgICAgICAgICB1cmw6IGAke29wdGlvbnMuYXBpX3VybH1wbGF5ZXJzLz9fd3Bub25jZT0ke29wdGlvbnMucmVzdF9ub25jZX1gLFxyXG4gICAgICAgICAgICAgICAgICAgIHR5cGU6ICdHRVQnLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBkcmF3OiBkYXRhLmRyYXcsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwYWdlOiBNYXRoLmZsb29yKGRhdGEuc3RhcnQgLyBkYXRhLmxlbmd0aCksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwZXJfcGFnZTogZGF0YS5sZW5ndGgsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzZWFyY2g6IGRhdGEuc2VhcmNoLnZhbHVlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgb3JkZXJieTogYCR7ZGF0YS5jb2x1bW5zW2RhdGEub3JkZXJbMF0uY29sdW1uXS5uYW1lfS4ke2RhdGEub3JkZXJbMF0uZGlyfWBcclxuICAgICAgICAgICAgICAgICAgICAgICAgfTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgb3JkZXI6IFtbMCwgJ2FzYyddXSxcclxuICAgICAgICAgICAgICAgIGNvbHVtbkRlZnM6IGNvbHVtbkRlZnMsXHJcbiAgICAgICAgICAgIH0pO1xyXG5cclxuICAgIH0sIGZhbHNlKTtcclxufSggalF1ZXJ5LCB0cm4gKSk7XHJcbiJdLCJuYW1lcyI6WyJfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4iLCJ2YWx1ZSIsInJlcGxhY2UiLCJSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRSIsImVzY2FwZUFtcGVyc2FuZCIsImVzY2FwZVF1b3RhdGlvbk1hcmsiLCJlc2NhcGVMZXNzVGhhbiIsImVzY2FwZUF0dHJpYnV0ZSIsImVzY2FwZUhUTUwiLCJlc2NhcGVFZGl0YWJsZUhUTUwiLCJpc1ZhbGlkQXR0cmlidXRlTmFtZSIsIm5hbWUiLCJ0ZXN0IiwiX3R5cGVvZiIsIm8iLCJTeW1ib2wiLCJpdGVyYXRvciIsImNvbnN0cnVjdG9yIiwicHJvdG90eXBlIiwiX2NsYXNzQ2FsbENoZWNrIiwiYSIsIm4iLCJUeXBlRXJyb3IiLCJfZGVmaW5lUHJvcGVydGllcyIsImUiLCJyIiwidCIsImxlbmd0aCIsImVudW1lcmFibGUiLCJjb25maWd1cmFibGUiLCJ3cml0YWJsZSIsIk9iamVjdCIsImRlZmluZVByb3BlcnR5IiwiX3RvUHJvcGVydHlLZXkiLCJrZXkiLCJfY3JlYXRlQ2xhc3MiLCJpIiwiX3RvUHJpbWl0aXZlIiwidG9QcmltaXRpdmUiLCJjYWxsIiwiU3RyaW5nIiwiTnVtYmVyIiwiVG91cm5hbWF0Y2giLCJldmVudHMiLCJwYXJhbSIsIm9iamVjdCIsInByZWZpeCIsInN0ciIsInByb3AiLCJoYXNPd25Qcm9wZXJ0eSIsImsiLCJ2IiwicHVzaCIsImVuY29kZVVSSUNvbXBvbmVudCIsImpvaW4iLCJldmVudCIsImV2ZW50TmFtZSIsIkV2ZW50VGFyZ2V0IiwiYXV0b2NvbXBsZXRlIiwiaW5wdXQiLCJkYXRhQ2FsbGJhY2siLCJUb3VybmFtYXRjaF9BdXRvY29tcGxldGUiLCJ1Y2ZpcnN0IiwicyIsImNoYXJBdCIsInRvVXBwZXJDYXNlIiwic2xpY2UiLCJvcmRpbmFsX3N1ZmZpeCIsIm51bWJlciIsInJlbWFpbmRlciIsInRhYnMiLCJlbGVtZW50IiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsInBhbmVzIiwiZG9jdW1lbnQiLCJjbGVhckFjdGl2ZSIsIkFycmF5IiwiZm9yRWFjaCIsInRhYiIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFyaWFTZWxlY3RlZCIsInBhbmUiLCJzZXRBY3RpdmUiLCJ0YXJnZXRJZCIsInRhcmdldFRhYiIsInF1ZXJ5U2VsZWN0b3IiLCJ0YXJnZXRQYW5lSWQiLCJkYXRhc2V0IiwidGFyZ2V0IiwiYWRkIiwiZ2V0RWxlbWVudEJ5SWQiLCJ0YWJDbGljayIsImN1cnJlbnRUYXJnZXQiLCJwcmV2ZW50RGVmYXVsdCIsImFkZEV2ZW50TGlzdGVuZXIiLCJsb2NhdGlvbiIsImhhc2giLCJzdWJzdHIiLCJ3aW5kb3ciLCJ0cm5fb2JqX2luc3RhbmNlIiwidGFiVmlld3MiLCJmcm9tIiwidHJuIiwiZHJvcGRvd25zIiwiaGFuZGxlRHJvcGRvd25DbG9zZSIsImRyb3Bkb3duIiwibmV4dEVsZW1lbnRTaWJsaW5nIiwicmVtb3ZlRXZlbnRMaXN0ZW5lciIsInN0b3BQcm9wYWdhdGlvbiIsIl90aGlzIiwibmFtZUlucHV0IiwiYiIsInZhbCIsInBhcmVudCIsInBhcmVudE5vZGUiLCJ0aGVuIiwiZGF0YSIsImNvbnNvbGUiLCJsb2ciLCJjbG9zZUFsbExpc3RzIiwiY3VycmVudEZvY3VzIiwiY3JlYXRlRWxlbWVudCIsInNldEF0dHJpYnV0ZSIsImlkIiwiYXBwZW5kQ2hpbGQiLCJ0ZXh0IiwiaW5uZXJIVE1MIiwiY29uY2F0Iiwic2VsZWN0ZWRJZCIsImRpc3BhdGNoRXZlbnQiLCJFdmVudCIsIngiLCJnZXRFbGVtZW50c0J5VGFnTmFtZSIsImtleUNvZGUiLCJhZGRBY3RpdmUiLCJjbGljayIsInJlbW92ZUFjdGl2ZSIsInJlbW92ZUNoaWxkIiwiZm9ybWF0IiwiYXJncyIsImFyZ3VtZW50cyIsIm1hdGNoIiwialF1ZXJ5IiwiJCIsIm9wdGlvbnMiLCJ0cm5fdGFibGVfb3B0aW9ucyIsImNvbHVtbkRlZnMiLCJ0YXJnZXRzIiwiY2xhc3NOYW1lIiwicmVuZGVyIiwidHlwZSIsInJvdyIsImxpbmsiLCJqb2luZWRfZGF0ZSIsInJlbmRlcmVkIiwidGVhbXMiLCJ1c2VyX2NhcGFiaWxpdHkiLCJsYW5ndWFnZSIsImVkaXRfcGxheWVyIiwib3JkZXJhYmxlIiwib24iLCJzZXR0aW5ncyIsImpzb24iLCJ4aHIiLCJKU09OIiwicGFyc2UiLCJzdHJpbmdpZnkiLCJyZWNvcmRzVG90YWwiLCJnZXRSZXNwb25zZUhlYWRlciIsInJlY29yZHNGaWx0ZXJlZCIsImRyYXciLCJEYXRhVGFibGUiLCJwcm9jZXNzaW5nIiwic2VydmVyU2lkZSIsImxlbmd0aE1lbnUiLCJhdXRvV2lkdGgiLCJhamF4IiwidXJsIiwiYXBpX3VybCIsInJlc3Rfbm9uY2UiLCJwYWdlIiwiTWF0aCIsImZsb29yIiwic3RhcnQiLCJwZXJfcGFnZSIsInNlYXJjaCIsIm9yZGVyYnkiLCJjb2x1bW5zIiwib3JkZXIiLCJjb2x1bW4iLCJkaXIiXSwic291cmNlUm9vdCI6IiJ9
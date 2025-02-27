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
  !*** ./src/js/player-teams.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
/**
 * Player teams list page.
 *
 * @link       https://www.tournamatch.com
 * @since      3.25.0
 *
 * @package    Tournamatch
 *
 */


(function (jQuery, $) {
  'use strict';

  var options = trn_player_teams_list_table_options;
  window.addEventListener('load', function () {
    var columnDefs = [{
      targets: 0,
      name: 'name',
      className: 'trn-player-team-table-name',
      render: function render(data, type, row) {
        return "<a href=\"".concat(row._embedded.team[0].link, "\">").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.team[0].name), "</a>");
      }
    }, {
      targets: 1,
      name: 'rank',
      className: 'trn-player-team-table-contact',
      render: function render(data, type, row) {
        console.log(row);
        return (0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.rank[0].title);
      }
    }, {
      targets: 2,
      name: 'joined_date',
      className: 'trn-player-team-table-created',
      render: function render(data, type, row) {
        return row.joined_date.rendered;
      }
    }, {
      targets: 3,
      name: 'members',
      className: 'trn-player-team-table-members',
      render: function render(data, type, row) {
        return row._embedded.team[0].members;
      }
    }];
    jQuery('#trn-player-teams-table').on('xhr.dt', function (e, settings, json, xhr) {
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
      searching: false,
      lengthChange: false,
      ajax: {
        url: "".concat(options.api_url, "team-members/?player_id=").concat(options.player_id, "&_wpnonce=").concat(options.rest_nonce, "&_embed"),
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
      order: [[1, 'asc']],
      columnDefs: columnDefs,
      drawCallback: function drawCallback(settings) {
        document.dispatchEvent(new CustomEvent('trn-html-updated', {
          'detail': 'The table html has updated.'
        }));
      }
    });
  }, false);
})(jQuery, _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUFDLENBQUN2TCxJQUFJLE9BQUFxSCxNQUFBLENBQUlYLEtBQUksQ0FBQzRFLEtBQUssQ0FBQyxDQUFDLENBQUMsQ0FBQ0UsR0FBRztVQUM1RSxDQUFDO1FBQ0w7TUFDSixDQUFDO01BQ0RGLEtBQUssRUFBRSxDQUFDLENBQUUsQ0FBQyxFQUFFLEtBQUssQ0FBRSxDQUFDO01BQ3JCOUMsVUFBVSxFQUFFQSxVQUFVO01BQ3RCaUQsWUFBWSxFQUFFLFNBQUFBLGFBQVVsQyxRQUFRLEVBQUc7UUFDL0J4RixRQUFRLENBQUN3RCxhQUFhLENBQUUsSUFBSW1FLFdBQVcsQ0FBRSxrQkFBa0IsRUFBRTtVQUFFLFFBQVEsRUFBRTtRQUE4QixDQUFFLENBQUMsQ0FBQztNQUMvRztJQUNKLENBQUMsQ0FBQztFQUVWLENBQUMsRUFBRSxLQUFLLENBQUM7QUFDYixDQUFDLEVBQUV0RCxNQUFNLEVBQUV4QyxnREFBRyxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly90b3VybmFtYXRjaC9Ad29yZHByZXNzL2VzY2FwZS1odG1sL3NyYy9lc2NhcGUtZ3JlYXRlci5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC9Ad29yZHByZXNzL2VzY2FwZS1odG1sL3NyYy9pbmRleC5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC8uL3NyYy9qcy90b3VybmFtYXRjaC5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL2Jvb3RzdHJhcCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvZGVmaW5lIHByb3BlcnR5IGdldHRlcnMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2hhc093blByb3BlcnR5IHNob3J0aGFuZCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvbWFrZSBuYW1lc3BhY2Ugb2JqZWN0Iiwid2VicGFjazovL3RvdXJuYW1hdGNoLy4vc3JjL2pzL3BsYXllci10ZWFtcy5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBncmVhdGVyLXRoYW4gc2lnbiByZXBsYWNlZC5cbiAqXG4gKiBOb3RlIHRoYXQgaWYgYSByZXNvbHV0aW9uIGZvciBUcmFjIzQ1Mzg3IGNvbWVzIHRvIGZydWl0aW9uLCBpdCBpcyBubyBsb25nZXJcbiAqIG5lY2Vzc2FyeSBmb3IgYF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbmAgdG8gZXhpc3QuXG4gKlxuICogU2VlOiBodHRwczovL2NvcmUudHJhYy53b3JkcHJlc3Mub3JnL3RpY2tldC80NTM4N1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC8+L2csICcmZ3Q7JyApO1xufVxuIiwiLyoqXG4gKiBJbnRlcm5hbCBkZXBlbmRlbmNpZXNcbiAqL1xuaW1wb3J0IF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbiBmcm9tICcuL2VzY2FwZS1ncmVhdGVyJztcblxuLyoqXG4gKiBSZWd1bGFyIGV4cHJlc3Npb24gbWF0Y2hpbmcgaW52YWxpZCBhdHRyaWJ1dGUgbmFtZXMuXG4gKlxuICogXCJBdHRyaWJ1dGUgbmFtZXMgbXVzdCBjb25zaXN0IG9mIG9uZSBvciBtb3JlIGNoYXJhY3RlcnMgb3RoZXIgdGhhbiBjb250cm9scyxcbiAqIFUrMDAyMCBTUEFDRSwgVSswMDIyIChcIiksIFUrMDAyNyAoJyksIFUrMDAzRSAoPiksIFUrMDAyRiAoLyksIFUrMDAzRCAoPSksXG4gKiBhbmQgbm9uY2hhcmFjdGVycy5cIlxuICpcbiAqIEBzZWUgaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2Uvc3ludGF4Lmh0bWwjYXR0cmlidXRlcy0yXG4gKlxuICogQHR5cGUge1JlZ0V4cH1cbiAqL1xuY29uc3QgUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUgPSAvW1xcdTAwN0YtXFx1MDA5RiBcIic+Lz1cIlxcdUZERDAtXFx1RkRFRl0vO1xuXG4vKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBhbXBlcnNhbmRzIGVzY2FwZWQuIE5vdGUgdGhhdCB0aGlzIGlzIGFuIGltcGVyZmVjdFxuICogaW1wbGVtZW50YXRpb24sIHdoZXJlIG9ubHkgYW1wZXJzYW5kcyB3aGljaCBkbyBub3QgYXBwZWFyIGFzIGEgcGF0dGVybiBvZlxuICogbmFtZWQsIGRlY2ltYWwsIG9yIGhleGFkZWNpbWFsIGNoYXJhY3RlciByZWZlcmVuY2VzIGFyZSBlc2NhcGVkLiBJbnZhbGlkXG4gKiBuYW1lZCByZWZlcmVuY2VzIChpLmUuIGFtYmlndW91cyBhbXBlcnNhbmQpIGFyZSBzdGlsbCBwZXJtaXR0ZWQuXG4gKlxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNjaGFyYWN0ZXItcmVmZXJlbmNlc1xuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNhbWJpZ3VvdXMtYW1wZXJzYW5kXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI25hbWVkLWNoYXJhY3Rlci1yZWZlcmVuY2VzXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC8mKD8hKFthLXowLTldK3wjWzAtOV0rfCN4W2EtZjAtOV0rKTspL2dpLCAnJmFtcDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIHF1b3RhdGlvbiBtYXJrcyByZXBsYWNlZC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVRdW90YXRpb25NYXJrKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC9cIi9nLCAnJnF1b3Q7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBsZXNzLXRoYW4gc2lnbiByZXBsYWNlZC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVMZXNzVGhhbiggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvPC9nLCAnJmx0OycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGFuIGVzY2FwZWQgYXR0cmlidXRlIHZhbHVlLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjZWxlbWVudHMtYXR0cmlidXRlc1xuICpcbiAqIFwiWy4uLl0gdGhlIHRleHQgY2Fubm90IGNvbnRhaW4gYW4gYW1iaWd1b3VzIGFtcGVyc2FuZCBbLi4uXSBtdXN0IG5vdCBjb250YWluXG4gKiBhbnkgbGl0ZXJhbCBVKzAwMjIgUVVPVEFUSU9OIE1BUksgY2hhcmFjdGVycyAoXCIpXCJcbiAqXG4gKiBOb3RlIHdlIGFsc28gZXNjYXBlIHRoZSBncmVhdGVyIHRoYW4gc3ltYm9sLCBhcyB0aGlzIGlzIHVzZWQgYnkgd3B0ZXh0dXJpemUgdG9cbiAqIHNwbGl0IEhUTUwgc3RyaW5ncy4gVGhpcyBpcyBhIFdvcmRQcmVzcyBzcGVjaWZpYyBmaXhcbiAqXG4gKiBOb3RlIHRoYXQgaWYgYSByZXNvbHV0aW9uIGZvciBUcmFjIzQ1Mzg3IGNvbWVzIHRvIGZydWl0aW9uLCBpdCBpcyBubyBsb25nZXJcbiAqIG5lY2Vzc2FyeSBmb3IgYF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbmAgdG8gYmUgdXNlZC5cbiAqXG4gKiBTZWU6IGh0dHBzOi8vY29yZS50cmFjLndvcmRwcmVzcy5vcmcvdGlja2V0LzQ1Mzg3XG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEF0dHJpYnV0ZSB2YWx1ZS5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgYXR0cmlidXRlIHZhbHVlLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlQXR0cmlidXRlKCB2YWx1ZSApIHtcblx0cmV0dXJuIF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbihcblx0XHRlc2NhcGVRdW90YXRpb25NYXJrKCBlc2NhcGVBbXBlcnNhbmQoIHZhbHVlICkgKVxuXHQpO1xufVxuXG4vKipcbiAqIFJldHVybnMgYW4gZXNjYXBlZCBIVE1MIGVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCN3cml0aW5nLWh0bWwtZG9jdW1lbnRzLWVsZW1lbnRzXG4gKlxuICogXCJ0aGUgdGV4dCBtdXN0IG5vdCBjb250YWluIHRoZSBjaGFyYWN0ZXIgVSswMDNDIExFU1MtVEhBTiBTSUdOICg8KSBvciBhblxuICogYW1iaWd1b3VzIGFtcGVyc2FuZC5cIlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBFbGVtZW50IHZhbHVlLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBIVE1MIGVsZW1lbnQgdmFsdWUuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVIVE1MKCB2YWx1ZSApIHtcblx0cmV0dXJuIGVzY2FwZUxlc3NUaGFuKCBlc2NhcGVBbXBlcnNhbmQoIHZhbHVlICkgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGFuIGVzY2FwZWQgRWRpdGFibGUgSFRNTCBlbGVtZW50IHZhbHVlLiBUaGlzIGlzIGRpZmZlcmVudCBmcm9tXG4gKiBgZXNjYXBlSFRNTGAsIGJlY2F1c2UgZm9yIGVkaXRhYmxlIEhUTUwsIEFMTCBhbXBlcnNhbmRzIG11c3QgYmUgZXNjYXBlZCBpblxuICogb3JkZXIgdG8gcmVuZGVyIHRoZSBjb250ZW50IGNvcnJlY3RseSBvbiB0aGUgcGFnZS5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgRWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlRWRpdGFibGVIVE1MKCB2YWx1ZSApIHtcblx0cmV0dXJuIGVzY2FwZUxlc3NUaGFuKCB2YWx1ZS5yZXBsYWNlKCAvJi9nLCAnJmFtcDsnICkgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIHRydWUgaWYgdGhlIGdpdmVuIGF0dHJpYnV0ZSBuYW1lIGlzIHZhbGlkLCBvciBmYWxzZSBvdGhlcndpc2UuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IG5hbWUgQXR0cmlidXRlIG5hbWUgdG8gdGVzdC5cbiAqXG4gKiBAcmV0dXJuIHtib29sZWFufSBXaGV0aGVyIGF0dHJpYnV0ZSBpcyB2YWxpZC5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGlzVmFsaWRBdHRyaWJ1dGVOYW1lKCBuYW1lICkge1xuXHRyZXR1cm4gISBSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRS50ZXN0KCBuYW1lICk7XG59XG4iLCIndXNlIHN0cmljdCc7XHJcbmNsYXNzIFRvdXJuYW1hdGNoIHtcclxuXHJcbiAgICBjb25zdHJ1Y3RvcigpIHtcclxuICAgICAgICB0aGlzLmV2ZW50cyA9IHt9O1xyXG4gICAgfVxyXG5cclxuICAgIHBhcmFtKG9iamVjdCwgcHJlZml4KSB7XHJcbiAgICAgICAgbGV0IHN0ciA9IFtdO1xyXG4gICAgICAgIGZvciAobGV0IHByb3AgaW4gb2JqZWN0KSB7XHJcbiAgICAgICAgICAgIGlmIChvYmplY3QuaGFzT3duUHJvcGVydHkocHJvcCkpIHtcclxuICAgICAgICAgICAgICAgIGxldCBrID0gcHJlZml4ID8gcHJlZml4ICsgXCJbXCIgKyBwcm9wICsgXCJdXCIgOiBwcm9wO1xyXG4gICAgICAgICAgICAgICAgbGV0IHYgPSBvYmplY3RbcHJvcF07XHJcbiAgICAgICAgICAgICAgICBzdHIucHVzaCgodiAhPT0gbnVsbCAmJiB0eXBlb2YgdiA9PT0gXCJvYmplY3RcIikgPyB0aGlzLnBhcmFtKHYsIGspIDogZW5jb2RlVVJJQ29tcG9uZW50KGspICsgXCI9XCIgKyBlbmNvZGVVUklDb21wb25lbnQodikpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiBzdHIuam9pbihcIiZcIik7XHJcbiAgICB9XHJcblxyXG4gICAgZXZlbnQoZXZlbnROYW1lKSB7XHJcbiAgICAgICAgaWYgKCEoZXZlbnROYW1lIGluIHRoaXMuZXZlbnRzKSkge1xyXG4gICAgICAgICAgICB0aGlzLmV2ZW50c1tldmVudE5hbWVdID0gbmV3IEV2ZW50VGFyZ2V0KGV2ZW50TmFtZSk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiB0aGlzLmV2ZW50c1tldmVudE5hbWVdO1xyXG4gICAgfVxyXG5cclxuICAgIGF1dG9jb21wbGV0ZShpbnB1dCwgZGF0YUNhbGxiYWNrKSB7XHJcbiAgICAgICAgbmV3IFRvdXJuYW1hdGNoX0F1dG9jb21wbGV0ZShpbnB1dCwgZGF0YUNhbGxiYWNrKTtcclxuICAgIH1cclxuXHJcbiAgICB1Y2ZpcnN0KHMpIHtcclxuICAgICAgICBpZiAodHlwZW9mIHMgIT09ICdzdHJpbmcnKSByZXR1cm4gJyc7XHJcbiAgICAgICAgcmV0dXJuIHMuY2hhckF0KDApLnRvVXBwZXJDYXNlKCkgKyBzLnNsaWNlKDEpO1xyXG4gICAgfVxyXG5cclxuICAgIG9yZGluYWxfc3VmZml4KG51bWJlcikge1xyXG4gICAgICAgIGNvbnN0IHJlbWFpbmRlciA9IG51bWJlciAlIDEwMDtcclxuXHJcbiAgICAgICAgaWYgKChyZW1haW5kZXIgPCAxMSkgfHwgKHJlbWFpbmRlciA+IDEzKSkge1xyXG4gICAgICAgICAgICBzd2l0Y2ggKHJlbWFpbmRlciAlIDEwKSB7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDE6IHJldHVybiAnc3QnO1xyXG4gICAgICAgICAgICAgICAgY2FzZSAyOiByZXR1cm4gJ25kJztcclxuICAgICAgICAgICAgICAgIGNhc2UgMzogcmV0dXJuICdyZCc7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuICd0aCc7XHJcbiAgICB9XHJcblxyXG4gICAgdGFicyhlbGVtZW50KSB7XHJcbiAgICAgICAgY29uc3QgdGFicyA9IGVsZW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLW5hdi1saW5rJyk7XHJcbiAgICAgICAgY29uc3QgcGFuZXMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tdGFiLXBhbmUnKTtcclxuICAgICAgICBjb25zdCBjbGVhckFjdGl2ZSA9ICgpID0+IHtcclxuICAgICAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbCh0YWJzLCAodGFiKSA9PiB7XHJcbiAgICAgICAgICAgICAgICB0YWIuY2xhc3NMaXN0LnJlbW92ZSgndHJuLW5hdi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgIHRhYi5hcmlhU2VsZWN0ZWQgPSBmYWxzZTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwocGFuZXMsIHBhbmUgPT4gcGFuZS5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tdGFiLWFjdGl2ZScpKTtcclxuICAgICAgICB9O1xyXG4gICAgICAgIGNvbnN0IHNldEFjdGl2ZSA9ICh0YXJnZXRJZCkgPT4ge1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRUYWIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdhW2hyZWY9XCIjJyArIHRhcmdldElkICsgJ1wiXS50cm4tbmF2LWxpbmsnKTtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0UGFuZUlkID0gdGFyZ2V0VGFiICYmIHRhcmdldFRhYi5kYXRhc2V0ICYmIHRhcmdldFRhYi5kYXRhc2V0LnRhcmdldCB8fCBmYWxzZTtcclxuXHJcbiAgICAgICAgICAgIGlmICh0YXJnZXRQYW5lSWQpIHtcclxuICAgICAgICAgICAgICAgIGNsZWFyQWN0aXZlKCk7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRUYWIuY2xhc3NMaXN0LmFkZCgndHJuLW5hdi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgIHRhcmdldFRhYi5hcmlhU2VsZWN0ZWQgPSB0cnVlO1xyXG5cclxuICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRhcmdldFBhbmVJZCkuY2xhc3NMaXN0LmFkZCgndHJuLXRhYi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcbiAgICAgICAgY29uc3QgdGFiQ2xpY2sgPSAoZXZlbnQpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0VGFiID0gZXZlbnQuY3VycmVudFRhcmdldDtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0UGFuZUlkID0gdGFyZ2V0VGFiICYmIHRhcmdldFRhYi5kYXRhc2V0ICYmIHRhcmdldFRhYi5kYXRhc2V0LnRhcmdldCB8fCBmYWxzZTtcclxuXHJcbiAgICAgICAgICAgIGlmICh0YXJnZXRQYW5lSWQpIHtcclxuICAgICAgICAgICAgICAgIHNldEFjdGl2ZSh0YXJnZXRQYW5lSWQpO1xyXG4gICAgICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwodGFicywgKHRhYikgPT4ge1xyXG4gICAgICAgICAgICB0YWIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCB0YWJDbGljayk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGlmIChsb2NhdGlvbi5oYXNoKSB7XHJcbiAgICAgICAgICAgIHNldEFjdGl2ZShsb2NhdGlvbi5oYXNoLnN1YnN0cigxKSk7XHJcbiAgICAgICAgfSBlbHNlIGlmICh0YWJzLmxlbmd0aCA+IDApIHtcclxuICAgICAgICAgICAgc2V0QWN0aXZlKHRhYnNbMF0uZGF0YXNldC50YXJnZXQpO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbn1cclxuXHJcbi8vdHJuLmluaXRpYWxpemUoKTtcclxuaWYgKCF3aW5kb3cudHJuX29ial9pbnN0YW5jZSkge1xyXG4gICAgd2luZG93LnRybl9vYmpfaW5zdGFuY2UgPSBuZXcgVG91cm5hbWF0Y2goKTtcclxuXHJcbiAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignbG9hZCcsIGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICAgICAgY29uc3QgdGFiVmlld3MgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tbmF2Jyk7XHJcblxyXG4gICAgICAgIEFycmF5LmZyb20odGFiVmlld3MpLmZvckVhY2goKHRhYikgPT4ge1xyXG4gICAgICAgICAgICB0cm4udGFicyh0YWIpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBjb25zdCBkcm9wZG93bnMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tZHJvcGRvd24tdG9nZ2xlJyk7XHJcbiAgICAgICAgY29uc3QgaGFuZGxlRHJvcGRvd25DbG9zZSA9ICgpID0+IHtcclxuICAgICAgICAgICAgQXJyYXkuZnJvbShkcm9wZG93bnMpLmZvckVhY2goKGRyb3Bkb3duKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBkcm9wZG93bi5uZXh0RWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LnJlbW92ZSgndHJuLXNob3cnKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIGRvY3VtZW50LnJlbW92ZUV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBoYW5kbGVEcm9wZG93bkNsb3NlLCBmYWxzZSk7XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgQXJyYXkuZnJvbShkcm9wZG93bnMpLmZvckVhY2goKGRyb3Bkb3duKSA9PiB7XHJcbiAgICAgICAgICAgIGRyb3Bkb3duLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xyXG4gICAgICAgICAgICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcclxuICAgICAgICAgICAgICAgIHRoaXMubmV4dEVsZW1lbnRTaWJsaW5nLmNsYXNzTGlzdC5hZGQoJ3Rybi1zaG93Jyk7XHJcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgaGFuZGxlRHJvcGRvd25DbG9zZSwgZmFsc2UpO1xyXG4gICAgICAgICAgICB9LCBmYWxzZSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgfSwgZmFsc2UpO1xyXG59XHJcbmV4cG9ydCBsZXQgdHJuID0gd2luZG93LnRybl9vYmpfaW5zdGFuY2U7XHJcblxyXG5jbGFzcyBUb3VybmFtYXRjaF9BdXRvY29tcGxldGUge1xyXG5cclxuICAgIC8vIGN1cnJlbnRGb2N1cztcclxuICAgIC8vXHJcbiAgICAvLyBuYW1lSW5wdXQ7XHJcbiAgICAvL1xyXG4gICAgLy8gc2VsZjtcclxuXHJcbiAgICBjb25zdHJ1Y3RvcihpbnB1dCwgZGF0YUNhbGxiYWNrKSB7XHJcbiAgICAgICAgLy8gdGhpcy5zZWxmID0gdGhpcztcclxuICAgICAgICB0aGlzLm5hbWVJbnB1dCA9IGlucHV0O1xyXG5cclxuICAgICAgICB0aGlzLm5hbWVJbnB1dC5hZGRFdmVudExpc3RlbmVyKFwiaW5wdXRcIiwgKCkgPT4ge1xyXG4gICAgICAgICAgICBsZXQgYSwgYiwgaSwgdmFsID0gdGhpcy5uYW1lSW5wdXQudmFsdWU7Ly90aGlzLnZhbHVlO1xyXG4gICAgICAgICAgICBsZXQgcGFyZW50ID0gdGhpcy5uYW1lSW5wdXQucGFyZW50Tm9kZTsvL3RoaXMucGFyZW50Tm9kZTtcclxuXHJcbiAgICAgICAgICAgIC8vIGxldCBwID0gbmV3IFByb21pc2UoKHJlc29sdmUsIHJlamVjdCkgPT4ge1xyXG4gICAgICAgICAgICAvLyAgICAgLyogbmVlZCB0byBxdWVyeSBzZXJ2ZXIgZm9yIG5hbWVzIGhlcmUuICovXHJcbiAgICAgICAgICAgIC8vICAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIub3BlbignR0VUJywgb3B0aW9ucy5hcGlfdXJsICsgJ3BsYXllcnMvP3NlYXJjaD0nICsgdmFsICsgJyZwZXJfcGFnZT01Jyk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQ29udGVudC1UeXBlJywgJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtV1AtTm9uY2UnLCBvcHRpb25zLnJlc3Rfbm9uY2UpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICBpZiAoeGhyLnN0YXR1cyA9PT0gMjAwKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIC8vIHJlc29sdmUoSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpLm1hcCgocGxheWVyKSA9PiB7cmV0dXJuIHsgJ3ZhbHVlJzogcGxheWVyLmlkLCAndGV4dCc6IHBsYXllci5uYW1lIH07fSkpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICByZXNvbHZlKEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tYXAoKHBsYXllcikgPT4ge3JldHVybiBwbGF5ZXIubmFtZTt9KSk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgcmVqZWN0KCk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgfVxyXG4gICAgICAgICAgICAvLyAgICAgfTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZW5kKCk7XHJcbiAgICAgICAgICAgIC8vIH0pO1xyXG4gICAgICAgICAgICBkYXRhQ2FsbGJhY2sodmFsKS50aGVuKChkYXRhKSA9PiB7Ly9wLnRoZW4oKGRhdGEpID0+IHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qY2xvc2UgYW55IGFscmVhZHkgb3BlbiBsaXN0cyBvZiBhdXRvLWNvbXBsZXRlZCB2YWx1ZXMqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKCk7XHJcbiAgICAgICAgICAgICAgICBpZiAoIXZhbCkgeyByZXR1cm4gZmFsc2U7fVxyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMgPSAtMTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmNyZWF0ZSBhIERJViBlbGVtZW50IHRoYXQgd2lsbCBjb250YWluIHRoZSBpdGVtcyAodmFsdWVzKToqL1xyXG4gICAgICAgICAgICAgICAgYSA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJESVZcIik7XHJcbiAgICAgICAgICAgICAgICBhLnNldEF0dHJpYnV0ZShcImlkXCIsIHRoaXMubmFtZUlucHV0LmlkICsgXCItYXV0by1jb21wbGV0ZS1saXN0XCIpO1xyXG4gICAgICAgICAgICAgICAgYS5zZXRBdHRyaWJ1dGUoXCJjbGFzc1wiLCBcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qYXBwZW5kIHRoZSBESVYgZWxlbWVudCBhcyBhIGNoaWxkIG9mIHRoZSBhdXRvLWNvbXBsZXRlIGNvbnRhaW5lcjoqL1xyXG4gICAgICAgICAgICAgICAgcGFyZW50LmFwcGVuZENoaWxkKGEpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qZm9yIGVhY2ggaXRlbSBpbiB0aGUgYXJyYXkuLi4qL1xyXG4gICAgICAgICAgICAgICAgZm9yIChpID0gMDsgaSA8IGRhdGEubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgICAgICAgICBsZXQgdGV4dCwgdmFsdWU7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8qIFdoaWNoIGZvcm1hdCBkaWQgdGhleSBnaXZlIHVzLiAqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh0eXBlb2YgZGF0YVtpXSA9PT0gJ29iamVjdCcpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dCA9IGRhdGFbaV1bJ3RleHQnXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldWyd2YWx1ZSddO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IGRhdGFbaV07XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKmNoZWNrIGlmIHRoZSBpdGVtIHN0YXJ0cyB3aXRoIHRoZSBzYW1lIGxldHRlcnMgYXMgdGhlIHRleHQgZmllbGQgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICBpZiAodGV4dC5zdWJzdHIoMCwgdmFsLmxlbmd0aCkudG9VcHBlckNhc2UoKSA9PT0gdmFsLnRvVXBwZXJDYXNlKCkpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLypjcmVhdGUgYSBESVYgZWxlbWVudCBmb3IgZWFjaCBtYXRjaGluZyBlbGVtZW50OiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKm1ha2UgdGhlIG1hdGNoaW5nIGxldHRlcnMgYm9sZDoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCA9IFwiPHN0cm9uZz5cIiArIHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpICsgXCI8L3N0cm9uZz5cIjtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gdGV4dC5zdWJzdHIodmFsLmxlbmd0aCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmluc2VydCBhIGlucHV0IGZpZWxkIHRoYXQgd2lsbCBob2xkIHRoZSBjdXJyZW50IGFycmF5IGl0ZW0ncyB2YWx1ZToqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCArPSBcIjxpbnB1dCB0eXBlPSdoaWRkZW4nIHZhbHVlPSdcIiArIHZhbHVlICsgXCInPlwiO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5kYXRhc2V0LnZhbHVlID0gdmFsdWU7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuZGF0YXNldC50ZXh0ID0gdGV4dDtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHdoZW4gc29tZW9uZSBjbGlja3Mgb24gdGhlIGl0ZW0gdmFsdWUgKERJViBlbGVtZW50KToqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coYGl0ZW0gY2xpY2tlZCB3aXRoIHZhbHVlICR7ZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudmFsdWV9YCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLyogaW5zZXJ0IHRoZSB2YWx1ZSBmb3IgdGhlIGF1dG9jb21wbGV0ZSB0ZXh0IGZpZWxkOiAqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQudmFsdWUgPSBlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC50ZXh0O1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQuZGF0YXNldC5zZWxlY3RlZElkID0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudmFsdWU7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLyogY2xvc2UgdGhlIGxpc3Qgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXMsIChvciBhbnkgb3RoZXIgb3BlbiBsaXN0cyBvZiBhdXRvY29tcGxldGVkIHZhbHVlczoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQuZGlzcGF0Y2hFdmVudChuZXcgRXZlbnQoJ2NoYW5nZScpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGEuYXBwZW5kQ2hpbGQoYik7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gcHJlc3NlcyBhIGtleSBvbiB0aGUga2V5Ym9hcmQ6Ki9cclxuICAgICAgICB0aGlzLm5hbWVJbnB1dC5hZGRFdmVudExpc3RlbmVyKFwia2V5ZG93blwiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICBsZXQgeCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRoaXMubmFtZUlucHV0LmlkICsgXCItYXV0by1jb21wbGV0ZS1saXN0XCIpO1xyXG4gICAgICAgICAgICBpZiAoeCkgeCA9IHguZ2V0RWxlbWVudHNCeVRhZ05hbWUoXCJkaXZcIik7XHJcbiAgICAgICAgICAgIGlmIChlLmtleUNvZGUgPT09IDQwKSB7XHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBhcnJvdyBET1dOIGtleSBpcyBwcmVzc2VkLFxyXG4gICAgICAgICAgICAgICAgIGluY3JlYXNlIHRoZSBjdXJyZW50Rm9jdXMgdmFyaWFibGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzKys7XHJcbiAgICAgICAgICAgICAgICAvKmFuZCBhbmQgbWFrZSB0aGUgY3VycmVudCBpdGVtIG1vcmUgdmlzaWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5hZGRBY3RpdmUoeCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09PSAzOCkgeyAvL3VwXHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBhcnJvdyBVUCBrZXkgaXMgcHJlc3NlZCxcclxuICAgICAgICAgICAgICAgICBkZWNyZWFzZSB0aGUgY3VycmVudEZvY3VzIHZhcmlhYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cy0tO1xyXG4gICAgICAgICAgICAgICAgLyphbmQgYW5kIG1ha2UgdGhlIGN1cnJlbnQgaXRlbSBtb3JlIHZpc2libGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuYWRkQWN0aXZlKHgpO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKGUua2V5Q29kZSA9PT0gMTMpIHtcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIEVOVEVSIGtleSBpcyBwcmVzc2VkLCBwcmV2ZW50IHRoZSBmb3JtIGZyb20gYmVpbmcgc3VibWl0dGVkLCovXHJcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPiAtMSkge1xyXG4gICAgICAgICAgICAgICAgICAgIC8qYW5kIHNpbXVsYXRlIGEgY2xpY2sgb24gdGhlIFwiYWN0aXZlXCIgaXRlbToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh4KSB4W3RoaXMuY3VycmVudEZvY3VzXS5jbGljaygpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHdoZW4gc29tZW9uZSBjbGlja3MgaW4gdGhlIGRvY3VtZW50OiovXHJcbiAgICAgICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cyhlLnRhcmdldCk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgYWRkQWN0aXZlKHgpIHtcclxuICAgICAgICAvKmEgZnVuY3Rpb24gdG8gY2xhc3NpZnkgYW4gaXRlbSBhcyBcImFjdGl2ZVwiOiovXHJcbiAgICAgICAgaWYgKCF4KSByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgLypzdGFydCBieSByZW1vdmluZyB0aGUgXCJhY3RpdmVcIiBjbGFzcyBvbiBhbGwgaXRlbXM6Ki9cclxuICAgICAgICB0aGlzLnJlbW92ZUFjdGl2ZSh4KTtcclxuICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPj0geC5sZW5ndGgpIHRoaXMuY3VycmVudEZvY3VzID0gMDtcclxuICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPCAwKSB0aGlzLmN1cnJlbnRGb2N1cyA9ICh4Lmxlbmd0aCAtIDEpO1xyXG4gICAgICAgIC8qYWRkIGNsYXNzIFwiYXV0b2NvbXBsZXRlLWFjdGl2ZVwiOiovXHJcbiAgICAgICAgeFt0aGlzLmN1cnJlbnRGb2N1c10uY2xhc3NMaXN0LmFkZChcInRybi1hdXRvLWNvbXBsZXRlLWFjdGl2ZVwiKTtcclxuICAgIH1cclxuXHJcbiAgICByZW1vdmVBY3RpdmUoeCkge1xyXG4gICAgICAgIC8qYSBmdW5jdGlvbiB0byByZW1vdmUgdGhlIFwiYWN0aXZlXCIgY2xhc3MgZnJvbSBhbGwgYXV0b2NvbXBsZXRlIGl0ZW1zOiovXHJcbiAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCB4Lmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgIHhbaV0uY2xhc3NMaXN0LnJlbW92ZShcInRybi1hdXRvLWNvbXBsZXRlLWFjdGl2ZVwiKTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG4gICAgY2xvc2VBbGxMaXN0cyhlbGVtZW50KSB7XHJcbiAgICAgICAgY29uc29sZS5sb2coXCJjbG9zZSBhbGwgbGlzdHNcIik7XHJcbiAgICAgICAgLypjbG9zZSBhbGwgYXV0b2NvbXBsZXRlIGxpc3RzIGluIHRoZSBkb2N1bWVudCxcclxuICAgICAgICAgZXhjZXB0IHRoZSBvbmUgcGFzc2VkIGFzIGFuIGFyZ3VtZW50OiovXHJcbiAgICAgICAgbGV0IHggPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKFwidHJuLWF1dG8tY29tcGxldGUtaXRlbXNcIik7XHJcbiAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCB4Lmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgIGlmIChlbGVtZW50ICE9PSB4W2ldICYmIGVsZW1lbnQgIT09IHRoaXMubmFtZUlucHV0KSB7XHJcbiAgICAgICAgICAgICAgICB4W2ldLnBhcmVudE5vZGUucmVtb3ZlQ2hpbGQoeFtpXSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9XHJcbn1cclxuXHJcbi8vIEZpcnN0LCBjaGVja3MgaWYgaXQgaXNuJ3QgaW1wbGVtZW50ZWQgeWV0LlxyXG5pZiAoIVN0cmluZy5wcm90b3R5cGUuZm9ybWF0KSB7XHJcbiAgICBTdHJpbmcucHJvdG90eXBlLmZvcm1hdCA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIGNvbnN0IGFyZ3MgPSBhcmd1bWVudHM7XHJcbiAgICAgICAgcmV0dXJuIHRoaXMucmVwbGFjZSgveyhcXGQrKX0vZywgZnVuY3Rpb24obWF0Y2gsIG51bWJlcikge1xyXG4gICAgICAgICAgICByZXR1cm4gdHlwZW9mIGFyZ3NbbnVtYmVyXSAhPT0gJ3VuZGVmaW5lZCdcclxuICAgICAgICAgICAgICAgID8gYXJnc1tudW1iZXJdXHJcbiAgICAgICAgICAgICAgICA6IG1hdGNoXHJcbiAgICAgICAgICAgICAgICA7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9O1xyXG59IiwiLy8gVGhlIG1vZHVsZSBjYWNoZVxudmFyIF9fd2VicGFja19tb2R1bGVfY2FjaGVfXyA9IHt9O1xuXG4vLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcblx0dmFyIGNhY2hlZE1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF07XG5cdGlmIChjYWNoZWRNb2R1bGUgIT09IHVuZGVmaW5lZCkge1xuXHRcdHJldHVybiBjYWNoZWRNb2R1bGUuZXhwb3J0cztcblx0fVxuXHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuXHR2YXIgbW9kdWxlID0gX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fW21vZHVsZUlkXSA9IHtcblx0XHQvLyBubyBtb2R1bGUuaWQgbmVlZGVkXG5cdFx0Ly8gbm8gbW9kdWxlLmxvYWRlZCBuZWVkZWRcblx0XHRleHBvcnRzOiB7fVxuXHR9O1xuXG5cdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuXHRfX3dlYnBhY2tfbW9kdWxlc19fW21vZHVsZUlkXShtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuXHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuXHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG59XG5cbiIsIi8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb25zIGZvciBoYXJtb255IGV4cG9ydHNcbl9fd2VicGFja19yZXF1aXJlX18uZCA9IChleHBvcnRzLCBkZWZpbml0aW9uKSA9PiB7XG5cdGZvcih2YXIga2V5IGluIGRlZmluaXRpb24pIHtcblx0XHRpZihfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZGVmaW5pdGlvbiwga2V5KSAmJiAhX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIGtleSkpIHtcblx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBrZXksIHsgZW51bWVyYWJsZTogdHJ1ZSwgZ2V0OiBkZWZpbml0aW9uW2tleV0gfSk7XG5cdFx0fVxuXHR9XG59OyIsIl9fd2VicGFja19yZXF1aXJlX18ubyA9IChvYmosIHByb3ApID0+IChPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqLCBwcm9wKSkiLCIvLyBkZWZpbmUgX19lc01vZHVsZSBvbiBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLnIgPSAoZXhwb3J0cykgPT4ge1xuXHRpZih0eXBlb2YgU3ltYm9sICE9PSAndW5kZWZpbmVkJyAmJiBTeW1ib2wudG9TdHJpbmdUYWcpIHtcblx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgU3ltYm9sLnRvU3RyaW5nVGFnLCB7IHZhbHVlOiAnTW9kdWxlJyB9KTtcblx0fVxuXHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgJ19fZXNNb2R1bGUnLCB7IHZhbHVlOiB0cnVlIH0pO1xufTsiLCIvKipcclxuICogUGxheWVyIHRlYW1zIGxpc3QgcGFnZS5cclxuICpcclxuICogQGxpbmsgICAgICAgaHR0cHM6Ly93d3cudG91cm5hbWF0Y2guY29tXHJcbiAqIEBzaW5jZSAgICAgIDMuMjUuMFxyXG4gKlxyXG4gKiBAcGFja2FnZSAgICBUb3VybmFtYXRjaFxyXG4gKlxyXG4gKi9cclxuaW1wb3J0IHsgdHJuIH0gZnJvbSAnLi90b3VybmFtYXRjaC5qcyc7XHJcbmltcG9ydCB7IGVzY2FwZUhUTUwgfSBmcm9tICdAd29yZHByZXNzL2VzY2FwZS1odG1sJztcclxuXHJcbihmdW5jdGlvbiAoalF1ZXJ5LCAkKSB7XHJcbiAgICAndXNlIHN0cmljdCc7XHJcblxyXG4gICAgbGV0IG9wdGlvbnMgPSB0cm5fcGxheWVyX3RlYW1zX2xpc3RfdGFibGVfb3B0aW9ucztcclxuXHJcbiAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignbG9hZCcsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBsZXQgY29sdW1uRGVmcyA9IFtcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMCxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICduYW1lJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1wbGF5ZXItdGVhbS10YWJsZS1uYW1lJyxcclxuICAgICAgICAgICAgICAgIHJlbmRlcjogZnVuY3Rpb24oZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGA8YSBocmVmPVwiJHtyb3cuX2VtYmVkZGVkLnRlYW1bMF0ubGlua31cIj4ke2VzY2FwZUhUTUwocm93Ll9lbWJlZGRlZC50ZWFtWzBdLm5hbWUpfTwvYT5gO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMSxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICdyYW5rJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1wbGF5ZXItdGVhbS10YWJsZS1jb250YWN0JyxcclxuICAgICAgICAgICAgICAgIHJlbmRlcjogZnVuY3Rpb24gKGRhdGEsIHR5cGUsIHJvdykge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJvdyk7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGVzY2FwZUhUTUwocm93Ll9lbWJlZGRlZC5yYW5rWzBdLnRpdGxlKTtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IDIsXHJcbiAgICAgICAgICAgICAgICBuYW1lOiAnam9pbmVkX2RhdGUnLFxyXG4gICAgICAgICAgICAgICAgY2xhc3NOYW1lOiAndHJuLXBsYXllci10ZWFtLXRhYmxlLWNyZWF0ZWQnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbihkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gcm93LmpvaW5lZF9kYXRlLnJlbmRlcmVkO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMyxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICdtZW1iZXJzJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi1wbGF5ZXItdGVhbS10YWJsZS1tZW1iZXJzJyxcclxuICAgICAgICAgICAgICAgIHJlbmRlcjogZnVuY3Rpb24oZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvdy5fZW1iZWRkZWQudGVhbVswXS5tZW1iZXJzO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICBdO1xyXG5cclxuICAgICAgICBqUXVlcnkoJyN0cm4tcGxheWVyLXRlYW1zLXRhYmxlJylcclxuICAgICAgICAgICAgLm9uKCd4aHIuZHQnLCBmdW5jdGlvbiggZSwgc2V0dGluZ3MsIGpzb24sIHhociApIHtcclxuICAgICAgICAgICAgICAgIGpzb24uZGF0YSA9IEpTT04ucGFyc2UoSlNPTi5zdHJpbmdpZnkoanNvbikpO1xyXG4gICAgICAgICAgICAgICAganNvbi5yZWNvcmRzVG90YWwgPSB4aHIuZ2V0UmVzcG9uc2VIZWFkZXIoJ1gtV1AtVG90YWwnKTtcclxuICAgICAgICAgICAgICAgIGpzb24ucmVjb3Jkc0ZpbHRlcmVkID0geGhyLmdldFJlc3BvbnNlSGVhZGVyKCdUUk4tRmlsdGVyZWQnKTtcclxuICAgICAgICAgICAgICAgIGpzb24ubGVuZ3RoID0geGhyLmdldFJlc3BvbnNlSGVhZGVyKCdYLVdQLVRvdGFsUGFnZXMnKTtcclxuICAgICAgICAgICAgICAgIGpzb24uZHJhdyA9IHhoci5nZXRSZXNwb25zZUhlYWRlcignVFJOLURyYXcnKTtcclxuICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgLkRhdGFUYWJsZSh7XHJcbiAgICAgICAgICAgICAgICBwcm9jZXNzaW5nOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgc2VydmVyU2lkZTogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIGxlbmd0aE1lbnU6IFtbMjUsIDUwLCAxMDAsIC0xXSwgWzI1LCA1MCwgMTAwLCAnQWxsJ11dLFxyXG4gICAgICAgICAgICAgICAgbGFuZ3VhZ2U6IG9wdGlvbnNbJ3RhYmxlX2xhbmd1YWdlJ10sXHJcbiAgICAgICAgICAgICAgICBhdXRvV2lkdGg6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgc2VhcmNoaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgIGxlbmd0aENoYW5nZTogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBhamF4OiB7XHJcbiAgICAgICAgICAgICAgICAgICAgdXJsOiBgJHtvcHRpb25zLmFwaV91cmx9dGVhbS1tZW1iZXJzLz9wbGF5ZXJfaWQ9JHtvcHRpb25zLnBsYXllcl9pZH0mX3dwbm9uY2U9JHtvcHRpb25zLnJlc3Rfbm9uY2V9Jl9lbWJlZGAsXHJcbiAgICAgICAgICAgICAgICAgICAgdHlwZTogJ0dFVCcsXHJcbiAgICAgICAgICAgICAgICAgICAgZGF0YTogZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4ge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZHJhdzogZGF0YS5kcmF3LFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcGFnZTogTWF0aC5mbG9vcihkYXRhLnN0YXJ0IC8gZGF0YS5sZW5ndGgpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcGVyX3BhZ2U6IGRhdGEubGVuZ3RoLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VhcmNoOiBkYXRhLnNlYXJjaC52YWx1ZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9yZGVyYnk6IGAke2RhdGEuY29sdW1uc1tkYXRhLm9yZGVyWzBdLmNvbHVtbl0ubmFtZX0uJHtkYXRhLm9yZGVyWzBdLmRpcn1gXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIG9yZGVyOiBbWyAxLCAnYXNjJyBdXSxcclxuICAgICAgICAgICAgICAgIGNvbHVtbkRlZnM6IGNvbHVtbkRlZnMsXHJcbiAgICAgICAgICAgICAgICBkcmF3Q2FsbGJhY2s6IGZ1bmN0aW9uKCBzZXR0aW5ncyApIHtcclxuICAgICAgICAgICAgICAgICAgICBkb2N1bWVudC5kaXNwYXRjaEV2ZW50KCBuZXcgQ3VzdG9tRXZlbnQoICd0cm4taHRtbC11cGRhdGVkJywgeyAnZGV0YWlsJzogJ1RoZSB0YWJsZSBodG1sIGhhcyB1cGRhdGVkLicgfSApKTtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIH0pO1xyXG5cclxuICAgIH0sIGZhbHNlKTtcclxufSkoalF1ZXJ5LCB0cm4pOyJdLCJuYW1lcyI6WyJfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4iLCJ2YWx1ZSIsInJlcGxhY2UiLCJSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRSIsImVzY2FwZUFtcGVyc2FuZCIsImVzY2FwZVF1b3RhdGlvbk1hcmsiLCJlc2NhcGVMZXNzVGhhbiIsImVzY2FwZUF0dHJpYnV0ZSIsImVzY2FwZUhUTUwiLCJlc2NhcGVFZGl0YWJsZUhUTUwiLCJpc1ZhbGlkQXR0cmlidXRlTmFtZSIsIm5hbWUiLCJ0ZXN0IiwiX3R5cGVvZiIsIm8iLCJTeW1ib2wiLCJpdGVyYXRvciIsImNvbnN0cnVjdG9yIiwicHJvdG90eXBlIiwiX2NsYXNzQ2FsbENoZWNrIiwiYSIsIm4iLCJUeXBlRXJyb3IiLCJfZGVmaW5lUHJvcGVydGllcyIsImUiLCJyIiwidCIsImxlbmd0aCIsImVudW1lcmFibGUiLCJjb25maWd1cmFibGUiLCJ3cml0YWJsZSIsIk9iamVjdCIsImRlZmluZVByb3BlcnR5IiwiX3RvUHJvcGVydHlLZXkiLCJrZXkiLCJfY3JlYXRlQ2xhc3MiLCJpIiwiX3RvUHJpbWl0aXZlIiwidG9QcmltaXRpdmUiLCJjYWxsIiwiU3RyaW5nIiwiTnVtYmVyIiwiVG91cm5hbWF0Y2giLCJldmVudHMiLCJwYXJhbSIsIm9iamVjdCIsInByZWZpeCIsInN0ciIsInByb3AiLCJoYXNPd25Qcm9wZXJ0eSIsImsiLCJ2IiwicHVzaCIsImVuY29kZVVSSUNvbXBvbmVudCIsImpvaW4iLCJldmVudCIsImV2ZW50TmFtZSIsIkV2ZW50VGFyZ2V0IiwiYXV0b2NvbXBsZXRlIiwiaW5wdXQiLCJkYXRhQ2FsbGJhY2siLCJUb3VybmFtYXRjaF9BdXRvY29tcGxldGUiLCJ1Y2ZpcnN0IiwicyIsImNoYXJBdCIsInRvVXBwZXJDYXNlIiwic2xpY2UiLCJvcmRpbmFsX3N1ZmZpeCIsIm51bWJlciIsInJlbWFpbmRlciIsInRhYnMiLCJlbGVtZW50IiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsInBhbmVzIiwiZG9jdW1lbnQiLCJjbGVhckFjdGl2ZSIsIkFycmF5IiwiZm9yRWFjaCIsInRhYiIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFyaWFTZWxlY3RlZCIsInBhbmUiLCJzZXRBY3RpdmUiLCJ0YXJnZXRJZCIsInRhcmdldFRhYiIsInF1ZXJ5U2VsZWN0b3IiLCJ0YXJnZXRQYW5lSWQiLCJkYXRhc2V0IiwidGFyZ2V0IiwiYWRkIiwiZ2V0RWxlbWVudEJ5SWQiLCJ0YWJDbGljayIsImN1cnJlbnRUYXJnZXQiLCJwcmV2ZW50RGVmYXVsdCIsImFkZEV2ZW50TGlzdGVuZXIiLCJsb2NhdGlvbiIsImhhc2giLCJzdWJzdHIiLCJ3aW5kb3ciLCJ0cm5fb2JqX2luc3RhbmNlIiwidGFiVmlld3MiLCJmcm9tIiwidHJuIiwiZHJvcGRvd25zIiwiaGFuZGxlRHJvcGRvd25DbG9zZSIsImRyb3Bkb3duIiwibmV4dEVsZW1lbnRTaWJsaW5nIiwicmVtb3ZlRXZlbnRMaXN0ZW5lciIsInN0b3BQcm9wYWdhdGlvbiIsIl90aGlzIiwibmFtZUlucHV0IiwiYiIsInZhbCIsInBhcmVudCIsInBhcmVudE5vZGUiLCJ0aGVuIiwiZGF0YSIsImNvbnNvbGUiLCJsb2ciLCJjbG9zZUFsbExpc3RzIiwiY3VycmVudEZvY3VzIiwiY3JlYXRlRWxlbWVudCIsInNldEF0dHJpYnV0ZSIsImlkIiwiYXBwZW5kQ2hpbGQiLCJ0ZXh0IiwiaW5uZXJIVE1MIiwiY29uY2F0Iiwic2VsZWN0ZWRJZCIsImRpc3BhdGNoRXZlbnQiLCJFdmVudCIsIngiLCJnZXRFbGVtZW50c0J5VGFnTmFtZSIsImtleUNvZGUiLCJhZGRBY3RpdmUiLCJjbGljayIsInJlbW92ZUFjdGl2ZSIsInJlbW92ZUNoaWxkIiwiZm9ybWF0IiwiYXJncyIsImFyZ3VtZW50cyIsIm1hdGNoIiwialF1ZXJ5IiwiJCIsIm9wdGlvbnMiLCJ0cm5fcGxheWVyX3RlYW1zX2xpc3RfdGFibGVfb3B0aW9ucyIsImNvbHVtbkRlZnMiLCJ0YXJnZXRzIiwiY2xhc3NOYW1lIiwicmVuZGVyIiwidHlwZSIsInJvdyIsIl9lbWJlZGRlZCIsInRlYW0iLCJsaW5rIiwicmFuayIsInRpdGxlIiwiam9pbmVkX2RhdGUiLCJyZW5kZXJlZCIsIm1lbWJlcnMiLCJvbiIsInNldHRpbmdzIiwianNvbiIsInhociIsIkpTT04iLCJwYXJzZSIsInN0cmluZ2lmeSIsInJlY29yZHNUb3RhbCIsImdldFJlc3BvbnNlSGVhZGVyIiwicmVjb3Jkc0ZpbHRlcmVkIiwiZHJhdyIsIkRhdGFUYWJsZSIsInByb2Nlc3NpbmciLCJzZXJ2ZXJTaWRlIiwibGVuZ3RoTWVudSIsImxhbmd1YWdlIiwiYXV0b1dpZHRoIiwic2VhcmNoaW5nIiwibGVuZ3RoQ2hhbmdlIiwiYWpheCIsInVybCIsImFwaV91cmwiLCJwbGF5ZXJfaWQiLCJyZXN0X25vbmNlIiwicGFnZSIsIk1hdGgiLCJmbG9vciIsInN0YXJ0IiwicGVyX3BhZ2UiLCJzZWFyY2giLCJvcmRlcmJ5IiwiY29sdW1ucyIsIm9yZGVyIiwiY29sdW1uIiwiZGlyIiwiZHJhd0NhbGxiYWNrIiwiQ3VzdG9tRXZlbnQiXSwic291cmNlUm9vdCI6IiJ9
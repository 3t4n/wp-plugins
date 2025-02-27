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
/*!**************************************!*\
  !*** ./src/js/tournament-matches.js ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
/**
 * Handles client scripting for the tournament matches page.
 *
 * @link       https://www.tournamatch.com
 * @since      3.17.0
 * @since      3.21.0 Added support for server side DataTables.
 *
 * @package    Tournamatch
 *
 */


(function ($, trn) {
  var options = trn_tournament_matches_options;
  window.addEventListener('load', function () {
    var columnDefs = [{
      targets: 0,
      name: 'name',
      className: 'trn-tournament-matches-table-competitors',
      render: function render(data, type, row) {
        var html = " vs ";
        if (row._embedded.one_competitor[0].name) {
          html = "<a href=\"".concat(row._embedded.one_competitor[0].link, "\">").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.one_competitor[0].name), "</a>") + html;
        }
        if (row._embedded.two_competitor[0].name) {
          html += "<a href=\"".concat(row._embedded.two_competitor[0].link, "\">").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(row._embedded.two_competitor[0].name), "</a>");
        } else {
          html += options.undecided;
        }
        return html;
      },
      orderable: false
    }, {
      targets: 1,
      name: 'result',
      className: 'trn-tournament-matches-table-result',
      render: function render(data, type, row) {
        return row.match_result;
      },
      orderable: false
    }, {
      targets: 2,
      name: 'match_date',
      className: 'trn-tournament-matches-table-date',
      render: function render(data, type, row) {
        return row.match_date.rendered;
      }
    }, {
      targets: 3,
      name: 'details',
      className: 'trn-tournament-matches-table-link',
      render: function render(data, type, row) {
        return "<a href=\"".concat(row.link, "\" title=\"").concat(options.language.view_match_details, "\"><i class=\"fa fa-info\"></i></a>");
      },
      orderable: false
    }];
    $('#trn-tournament-matches-table').on('xhr.dt', function (e, settings, json, xhr) {
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
        url: "".concat(options.api_url, "matches/?competition_type=tournaments&competition_id=").concat(options.tournament_id, "&_wpnonce=").concat(options.rest_nonce, "&_embed"),
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
      order: [[2, 'desc']],
      columnDefs: columnDefs
    });
  }, false);
})(jQuery, _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUFTO1FBQzVJbkMsSUFBSSxFQUFFLEtBQUs7UUFDWGpDLElBQUksRUFBRSxTQUFBQSxLQUFVQSxLQUFJLEVBQUU7VUFDbEIsT0FBTztZQUNIeUQsSUFBSSxFQUFFekQsS0FBSSxDQUFDeUQsSUFBSTtZQUNmWSxJQUFJLEVBQUVDLElBQUksQ0FBQ0MsS0FBSyxDQUFDdkUsS0FBSSxDQUFDd0UsS0FBSyxHQUFHeEUsS0FBSSxDQUFDMUYsTUFBTSxDQUFDO1lBQzFDbUssUUFBUSxFQUFFekUsS0FBSSxDQUFDMUYsTUFBTTtZQUNyQm9LLE1BQU0sRUFBRTFFLEtBQUksQ0FBQzBFLE1BQU0sQ0FBQzlMLEtBQUs7WUFDekIrTCxPQUFPLEtBQUFoRSxNQUFBLENBQUtYLEtBQUksQ0FBQzRFLE9BQU8sQ0FBQzVFLEtBQUksQ0FBQzZFLEtBQUssQ0FBQyxDQUFDLENBQUMsQ0FBQ0MsTUFBTSxDQUFDLENBQUN4TCxJQUFJLE9BQUFxSCxNQUFBLENBQUlYLEtBQUksQ0FBQzZFLEtBQUssQ0FBQyxDQUFDLENBQUMsQ0FBQ0UsR0FBRztVQUM1RSxDQUFDO1FBQ0w7TUFDSixDQUFDO01BQ0RGLEtBQUssRUFBRSxDQUFDLENBQUMsQ0FBQyxFQUFFLE1BQU0sQ0FBQyxDQUFDO01BQ3BCaEQsVUFBVSxFQUFFQTtJQUNoQixDQUFDLENBQUM7RUFDVixDQUFDLEVBQUUsS0FBSyxDQUFDO0FBQ2IsQ0FBQyxFQUFDbUQsTUFBTSxFQUFFOUYsZ0RBQUcsQ0FBQyxDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvQHdvcmRwcmVzcy9lc2NhcGUtaHRtbC9zcmMvZXNjYXBlLWdyZWF0ZXIuanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvQHdvcmRwcmVzcy9lc2NhcGUtaHRtbC9zcmMvaW5kZXguanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvLi9zcmMvanMvdG91cm5hbWF0Y2guanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2RlZmluZSBwcm9wZXJ0eSBnZXR0ZXJzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9oYXNPd25Qcm9wZXJ0eSBzaG9ydGhhbmQiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL21ha2UgbmFtZXNwYWNlIG9iamVjdCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC8uL3NyYy9qcy90b3VybmFtZW50LW1hdGNoZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggZ3JlYXRlci10aGFuIHNpZ24gcmVwbGFjZWQuXG4gKlxuICogTm90ZSB0aGF0IGlmIGEgcmVzb2x1dGlvbiBmb3IgVHJhYyM0NTM4NyBjb21lcyB0byBmcnVpdGlvbiwgaXQgaXMgbm8gbG9uZ2VyXG4gKiBuZWNlc3NhcnkgZm9yIGBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW5gIHRvIGV4aXN0LlxuICpcbiAqIFNlZTogaHR0cHM6Ly9jb3JlLnRyYWMud29yZHByZXNzLm9yZy90aWNrZXQvNDUzODdcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbiggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvPi9nLCAnJmd0OycgKTtcbn1cbiIsIi8qKlxuICogSW50ZXJuYWwgZGVwZW5kZW5jaWVzXG4gKi9cbmltcG9ydCBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4gZnJvbSAnLi9lc2NhcGUtZ3JlYXRlcic7XG5cbi8qKlxuICogUmVndWxhciBleHByZXNzaW9uIG1hdGNoaW5nIGludmFsaWQgYXR0cmlidXRlIG5hbWVzLlxuICpcbiAqIFwiQXR0cmlidXRlIG5hbWVzIG11c3QgY29uc2lzdCBvZiBvbmUgb3IgbW9yZSBjaGFyYWN0ZXJzIG90aGVyIHRoYW4gY29udHJvbHMsXG4gKiBVKzAwMjAgU1BBQ0UsIFUrMDAyMiAoXCIpLCBVKzAwMjcgKCcpLCBVKzAwM0UgKD4pLCBVKzAwMkYgKC8pLCBVKzAwM0QgKD0pLFxuICogYW5kIG5vbmNoYXJhY3RlcnMuXCJcbiAqXG4gKiBAc2VlIGh0dHBzOi8vaHRtbC5zcGVjLndoYXR3Zy5vcmcvbXVsdGlwYWdlL3N5bnRheC5odG1sI2F0dHJpYnV0ZXMtMlxuICpcbiAqIEB0eXBlIHtSZWdFeHB9XG4gKi9cbmNvbnN0IFJFR0VYUF9JTlZBTElEX0FUVFJJQlVURV9OQU1FID0gL1tcXHUwMDdGLVxcdTAwOUYgXCInPi89XCJcXHVGREQwLVxcdUZERUZdLztcblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggYW1wZXJzYW5kcyBlc2NhcGVkLiBOb3RlIHRoYXQgdGhpcyBpcyBhbiBpbXBlcmZlY3RcbiAqIGltcGxlbWVudGF0aW9uLCB3aGVyZSBvbmx5IGFtcGVyc2FuZHMgd2hpY2ggZG8gbm90IGFwcGVhciBhcyBhIHBhdHRlcm4gb2ZcbiAqIG5hbWVkLCBkZWNpbWFsLCBvciBoZXhhZGVjaW1hbCBjaGFyYWN0ZXIgcmVmZXJlbmNlcyBhcmUgZXNjYXBlZC4gSW52YWxpZFxuICogbmFtZWQgcmVmZXJlbmNlcyAoaS5lLiBhbWJpZ3VvdXMgYW1wZXJzYW5kKSBhcmUgc3RpbGwgcGVybWl0dGVkLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjY2hhcmFjdGVyLXJlZmVyZW5jZXNcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjYW1iaWd1b3VzLWFtcGVyc2FuZFxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNuYW1lZC1jaGFyYWN0ZXItcmVmZXJlbmNlc1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvJig/IShbYS16MC05XSt8I1swLTldK3wjeFthLWYwLTldKyk7KS9naSwgJyZhbXA7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBxdW90YXRpb24gbWFya3MgcmVwbGFjZWQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlUXVvdGF0aW9uTWFyayggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvXCIvZywgJyZxdW90OycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggbGVzcy10aGFuIHNpZ24gcmVwbGFjZWQuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlTGVzc1RoYW4oIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLzwvZywgJyZsdDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIGF0dHJpYnV0ZSB2YWx1ZS5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2VsZW1lbnRzLWF0dHJpYnV0ZXNcbiAqXG4gKiBcIlsuLi5dIHRoZSB0ZXh0IGNhbm5vdCBjb250YWluIGFuIGFtYmlndW91cyBhbXBlcnNhbmQgWy4uLl0gbXVzdCBub3QgY29udGFpblxuICogYW55IGxpdGVyYWwgVSswMDIyIFFVT1RBVElPTiBNQVJLIGNoYXJhY3RlcnMgKFwiKVwiXG4gKlxuICogTm90ZSB3ZSBhbHNvIGVzY2FwZSB0aGUgZ3JlYXRlciB0aGFuIHN5bWJvbCwgYXMgdGhpcyBpcyB1c2VkIGJ5IHdwdGV4dHVyaXplIHRvXG4gKiBzcGxpdCBIVE1MIHN0cmluZ3MuIFRoaXMgaXMgYSBXb3JkUHJlc3Mgc3BlY2lmaWMgZml4XG4gKlxuICogTm90ZSB0aGF0IGlmIGEgcmVzb2x1dGlvbiBmb3IgVHJhYyM0NTM4NyBjb21lcyB0byBmcnVpdGlvbiwgaXQgaXMgbm8gbG9uZ2VyXG4gKiBuZWNlc3NhcnkgZm9yIGBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW5gIHRvIGJlIHVzZWQuXG4gKlxuICogU2VlOiBodHRwczovL2NvcmUudHJhYy53b3JkcHJlc3Mub3JnL3RpY2tldC80NTM4N1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBBdHRyaWJ1dGUgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIGF0dHJpYnV0ZSB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUF0dHJpYnV0ZSggdmFsdWUgKSB7XG5cdHJldHVybiBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4oXG5cdFx0ZXNjYXBlUXVvdGF0aW9uTWFyayggZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApIClcblx0KTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGFuIGVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjd3JpdGluZy1odG1sLWRvY3VtZW50cy1lbGVtZW50c1xuICpcbiAqIFwidGhlIHRleHQgbXVzdCBub3QgY29udGFpbiB0aGUgY2hhcmFjdGVyIFUrMDAzQyBMRVNTLVRIQU4gU0lHTiAoPCkgb3IgYW5cbiAqIGFtYmlndW91cyBhbXBlcnNhbmQuXCJcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgRWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlSFRNTCggdmFsdWUgKSB7XG5cdHJldHVybiBlc2NhcGVMZXNzVGhhbiggZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIEVkaXRhYmxlIEhUTUwgZWxlbWVudCB2YWx1ZS4gVGhpcyBpcyBkaWZmZXJlbnQgZnJvbVxuICogYGVzY2FwZUhUTUxgLCBiZWNhdXNlIGZvciBlZGl0YWJsZSBIVE1MLCBBTEwgYW1wZXJzYW5kcyBtdXN0IGJlIGVzY2FwZWQgaW5cbiAqIG9yZGVyIHRvIHJlbmRlciB0aGUgY29udGVudCBjb3JyZWN0bHkgb24gdGhlIHBhZ2UuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUVkaXRhYmxlSFRNTCggdmFsdWUgKSB7XG5cdHJldHVybiBlc2NhcGVMZXNzVGhhbiggdmFsdWUucmVwbGFjZSggLyYvZywgJyZhbXA7JyApICk7XG59XG5cbi8qKlxuICogUmV0dXJucyB0cnVlIGlmIHRoZSBnaXZlbiBhdHRyaWJ1dGUgbmFtZSBpcyB2YWxpZCwgb3IgZmFsc2Ugb3RoZXJ3aXNlLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSBuYW1lIEF0dHJpYnV0ZSBuYW1lIHRvIHRlc3QuXG4gKlxuICogQHJldHVybiB7Ym9vbGVhbn0gV2hldGhlciBhdHRyaWJ1dGUgaXMgdmFsaWQuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBpc1ZhbGlkQXR0cmlidXRlTmFtZSggbmFtZSApIHtcblx0cmV0dXJuICEgUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUudGVzdCggbmFtZSApO1xufVxuIiwiJ3VzZSBzdHJpY3QnO1xyXG5jbGFzcyBUb3VybmFtYXRjaCB7XHJcblxyXG4gICAgY29uc3RydWN0b3IoKSB7XHJcbiAgICAgICAgdGhpcy5ldmVudHMgPSB7fTtcclxuICAgIH1cclxuXHJcbiAgICBwYXJhbShvYmplY3QsIHByZWZpeCkge1xyXG4gICAgICAgIGxldCBzdHIgPSBbXTtcclxuICAgICAgICBmb3IgKGxldCBwcm9wIGluIG9iamVjdCkge1xyXG4gICAgICAgICAgICBpZiAob2JqZWN0Lmhhc093blByb3BlcnR5KHByb3ApKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgayA9IHByZWZpeCA/IHByZWZpeCArIFwiW1wiICsgcHJvcCArIFwiXVwiIDogcHJvcDtcclxuICAgICAgICAgICAgICAgIGxldCB2ID0gb2JqZWN0W3Byb3BdO1xyXG4gICAgICAgICAgICAgICAgc3RyLnB1c2goKHYgIT09IG51bGwgJiYgdHlwZW9mIHYgPT09IFwib2JqZWN0XCIpID8gdGhpcy5wYXJhbSh2LCBrKSA6IGVuY29kZVVSSUNvbXBvbmVudChrKSArIFwiPVwiICsgZW5jb2RlVVJJQ29tcG9uZW50KHYpKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gc3RyLmpvaW4oXCImXCIpO1xyXG4gICAgfVxyXG5cclxuICAgIGV2ZW50KGV2ZW50TmFtZSkge1xyXG4gICAgICAgIGlmICghKGV2ZW50TmFtZSBpbiB0aGlzLmV2ZW50cykpIHtcclxuICAgICAgICAgICAgdGhpcy5ldmVudHNbZXZlbnROYW1lXSA9IG5ldyBFdmVudFRhcmdldChldmVudE5hbWUpO1xyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gdGhpcy5ldmVudHNbZXZlbnROYW1lXTtcclxuICAgIH1cclxuXHJcbiAgICBhdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIG5ldyBUb3VybmFtYXRjaF9BdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjayk7XHJcbiAgICB9XHJcblxyXG4gICAgdWNmaXJzdChzKSB7XHJcbiAgICAgICAgaWYgKHR5cGVvZiBzICE9PSAnc3RyaW5nJykgcmV0dXJuICcnO1xyXG4gICAgICAgIHJldHVybiBzLmNoYXJBdCgwKS50b1VwcGVyQ2FzZSgpICsgcy5zbGljZSgxKTtcclxuICAgIH1cclxuXHJcbiAgICBvcmRpbmFsX3N1ZmZpeChudW1iZXIpIHtcclxuICAgICAgICBjb25zdCByZW1haW5kZXIgPSBudW1iZXIgJSAxMDA7XHJcblxyXG4gICAgICAgIGlmICgocmVtYWluZGVyIDwgMTEpIHx8IChyZW1haW5kZXIgPiAxMykpIHtcclxuICAgICAgICAgICAgc3dpdGNoIChyZW1haW5kZXIgJSAxMCkge1xyXG4gICAgICAgICAgICAgICAgY2FzZSAxOiByZXR1cm4gJ3N0JztcclxuICAgICAgICAgICAgICAgIGNhc2UgMjogcmV0dXJuICduZCc7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDM6IHJldHVybiAncmQnO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiAndGgnO1xyXG4gICAgfVxyXG5cclxuICAgIHRhYnMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnN0IHRhYnMgPSBlbGVtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1uYXYtbGluaycpO1xyXG4gICAgICAgIGNvbnN0IHBhbmVzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLXRhYi1wYW5lJyk7XHJcbiAgICAgICAgY29uc3QgY2xlYXJBY3RpdmUgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwodGFicywgKHRhYikgPT4ge1xyXG4gICAgICAgICAgICAgICAgdGFiLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YWIuYXJpYVNlbGVjdGVkID0gZmFsc2U7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHBhbmVzLCBwYW5lID0+IHBhbmUuY2xhc3NMaXN0LnJlbW92ZSgndHJuLXRhYi1hY3RpdmUnKSk7XHJcbiAgICAgICAgfTtcclxuICAgICAgICBjb25zdCBzZXRBY3RpdmUgPSAodGFyZ2V0SWQpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0VGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignYVtocmVmPVwiIycgKyB0YXJnZXRJZCArICdcIl0udHJuLW5hdi1saW5rJyk7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBjbGVhckFjdGl2ZSgpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0VGFiLmNsYXNzTGlzdC5hZGQoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRUYWIuYXJpYVNlbGVjdGVkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0YXJnZXRQYW5lSWQpLmNsYXNzTGlzdC5hZGQoJ3Rybi10YWItYWN0aXZlJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG4gICAgICAgIGNvbnN0IHRhYkNsaWNrID0gKGV2ZW50KSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFRhYiA9IGV2ZW50LmN1cnJlbnRUYXJnZXQ7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBzZXRBY3RpdmUodGFyZ2V0UGFuZUlkKTtcclxuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhYnMsICh0YWIpID0+IHtcclxuICAgICAgICAgICAgdGFiLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGFiQ2xpY2spO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBpZiAobG9jYXRpb24uaGFzaCkge1xyXG4gICAgICAgICAgICBzZXRBY3RpdmUobG9jYXRpb24uaGFzaC5zdWJzdHIoMSkpO1xyXG4gICAgICAgIH0gZWxzZSBpZiAodGFicy5sZW5ndGggPiAwKSB7XHJcbiAgICAgICAgICAgIHNldEFjdGl2ZSh0YWJzWzBdLmRhdGFzZXQudGFyZ2V0KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG59XHJcblxyXG4vL3Rybi5pbml0aWFsaXplKCk7XHJcbmlmICghd2luZG93LnRybl9vYmpfaW5zdGFuY2UpIHtcclxuICAgIHdpbmRvdy50cm5fb2JqX2luc3RhbmNlID0gbmV3IFRvdXJuYW1hdGNoKCk7XHJcblxyXG4gICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgIGNvbnN0IHRhYlZpZXdzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLW5hdicpO1xyXG5cclxuICAgICAgICBBcnJheS5mcm9tKHRhYlZpZXdzKS5mb3JFYWNoKCh0YWIpID0+IHtcclxuICAgICAgICAgICAgdHJuLnRhYnModGFiKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgY29uc3QgZHJvcGRvd25zID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLWRyb3Bkb3duLXRvZ2dsZScpO1xyXG4gICAgICAgIGNvbnN0IGhhbmRsZURyb3Bkb3duQ2xvc2UgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICAgICAgZHJvcGRvd24ubmV4dEVsZW1lbnRTaWJsaW5nLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1zaG93Jyk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgaGFuZGxlRHJvcGRvd25DbG9zZSwgZmFsc2UpO1xyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICBkcm9wZG93bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICAgICAgICAgICAgICB0aGlzLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QuYWRkKCd0cm4tc2hvdycpO1xyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhhbmRsZURyb3Bkb3duQ2xvc2UsIGZhbHNlKTtcclxuICAgICAgICAgICAgfSwgZmFsc2UpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH0sIGZhbHNlKTtcclxufVxyXG5leHBvcnQgbGV0IHRybiA9IHdpbmRvdy50cm5fb2JqX2luc3RhbmNlO1xyXG5cclxuY2xhc3MgVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlIHtcclxuXHJcbiAgICAvLyBjdXJyZW50Rm9jdXM7XHJcbiAgICAvL1xyXG4gICAgLy8gbmFtZUlucHV0O1xyXG4gICAgLy9cclxuICAgIC8vIHNlbGY7XHJcblxyXG4gICAgY29uc3RydWN0b3IoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIC8vIHRoaXMuc2VsZiA9IHRoaXM7XHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQgPSBpbnB1dDtcclxuXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImlucHV0XCIsICgpID0+IHtcclxuICAgICAgICAgICAgbGV0IGEsIGIsIGksIHZhbCA9IHRoaXMubmFtZUlucHV0LnZhbHVlOy8vdGhpcy52YWx1ZTtcclxuICAgICAgICAgICAgbGV0IHBhcmVudCA9IHRoaXMubmFtZUlucHV0LnBhcmVudE5vZGU7Ly90aGlzLnBhcmVudE5vZGU7XHJcblxyXG4gICAgICAgICAgICAvLyBsZXQgcCA9IG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcclxuICAgICAgICAgICAgLy8gICAgIC8qIG5lZWQgdG8gcXVlcnkgc2VydmVyIGZvciBuYW1lcyBoZXJlLiAqL1xyXG4gICAgICAgICAgICAvLyAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLm9wZW4oJ0dFVCcsIG9wdGlvbnMuYXBpX3VybCArICdwbGF5ZXJzLz9zZWFyY2g9JyArIHZhbCArICcmcGVyX3BhZ2U9NScpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICAvLyByZXNvbHZlKEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tYXAoKHBsYXllcikgPT4ge3JldHVybiB7ICd2YWx1ZSc6IHBsYXllci5pZCwgJ3RleHQnOiBwbGF5ZXIubmFtZSB9O30pKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4gcGxheWVyLm5hbWU7fSkpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJlamVjdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH1cclxuICAgICAgICAgICAgLy8gICAgIH07XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2VuZCgpO1xyXG4gICAgICAgICAgICAvLyB9KTtcclxuICAgICAgICAgICAgZGF0YUNhbGxiYWNrKHZhbCkudGhlbigoZGF0YSkgPT4gey8vcC50aGVuKChkYXRhKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmNsb3NlIGFueSBhbHJlYWR5IG9wZW4gbGlzdHMgb2YgYXV0by1jb21wbGV0ZWQgdmFsdWVzKi9cclxuICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG4gICAgICAgICAgICAgICAgaWYgKCF2YWwpIHsgcmV0dXJuIGZhbHNlO31cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzID0gLTE7XHJcblxyXG4gICAgICAgICAgICAgICAgLypjcmVhdGUgYSBESVYgZWxlbWVudCB0aGF0IHdpbGwgY29udGFpbiB0aGUgaXRlbXMgKHZhbHVlcyk6Ki9cclxuICAgICAgICAgICAgICAgIGEgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgYS5zZXRBdHRyaWJ1dGUoXCJpZFwiLCB0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiY2xhc3NcIiwgXCJ0cm4tYXV0by1jb21wbGV0ZS1pdGVtc1wiKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmFwcGVuZCB0aGUgRElWIGVsZW1lbnQgYXMgYSBjaGlsZCBvZiB0aGUgYXV0by1jb21wbGV0ZSBjb250YWluZXI6Ki9cclxuICAgICAgICAgICAgICAgIHBhcmVudC5hcHBlbmRDaGlsZChhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmZvciBlYWNoIGl0ZW0gaW4gdGhlIGFycmF5Li4uKi9cclxuICAgICAgICAgICAgICAgIGZvciAoaSA9IDA7IGkgPCBkYXRhLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHRleHQsIHZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKiBXaGljaCBmb3JtYXQgZGlkIHRoZXkgZ2l2ZSB1cy4gKi9cclxuICAgICAgICAgICAgICAgICAgICBpZiAodHlwZW9mIGRhdGFbaV0gPT09ICdvYmplY3QnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldWyd0ZXh0J107XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXVsndmFsdWUnXTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0ID0gZGF0YVtpXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLypjaGVjayBpZiB0aGUgaXRlbSBzdGFydHMgd2l0aCB0aGUgc2FtZSBsZXR0ZXJzIGFzIHRoZSB0ZXh0IGZpZWxkIHZhbHVlOiovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpLnRvVXBwZXJDYXNlKCkgPT09IHZhbC50b1VwcGVyQ2FzZSgpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qY3JlYXRlIGEgRElWIGVsZW1lbnQgZm9yIGVhY2ggbWF0Y2hpbmcgZWxlbWVudDoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcIkRJVlwiKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLyptYWtlIHRoZSBtYXRjaGluZyBsZXR0ZXJzIGJvbGQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgPSBcIjxzdHJvbmc+XCIgKyB0ZXh0LnN1YnN0cigwLCB2YWwubGVuZ3RoKSArIFwiPC9zdHJvbmc+XCI7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IHRleHQuc3Vic3RyKHZhbC5sZW5ndGgpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLyppbnNlcnQgYSBpbnB1dCBmaWVsZCB0aGF0IHdpbGwgaG9sZCB0aGUgY3VycmVudCBhcnJheSBpdGVtJ3MgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gXCI8aW5wdXQgdHlwZT0naGlkZGVuJyB2YWx1ZT0nXCIgKyB2YWx1ZSArIFwiJz5cIjtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuZGF0YXNldC52YWx1ZSA9IHZhbHVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudGV4dCA9IHRleHQ7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIG9uIHRoZSBpdGVtIHZhbHVlIChESVYgZWxlbWVudCk6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGBpdGVtIGNsaWNrZWQgd2l0aCB2YWx1ZSAke2UuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlfWApO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGluc2VydCB0aGUgdmFsdWUgZm9yIHRoZSBhdXRvY29tcGxldGUgdGV4dCBmaWVsZDogKi9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LnZhbHVlID0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudGV4dDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRhdGFzZXQuc2VsZWN0ZWRJZCA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGNsb3NlIHRoZSBsaXN0IG9mIGF1dG9jb21wbGV0ZWQgdmFsdWVzLCAob3IgYW55IG90aGVyIG9wZW4gbGlzdHMgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXM6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRpc3BhdGNoRXZlbnQobmV3IEV2ZW50KCdjaGFuZ2UnKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBhLmFwcGVuZENoaWxkKGIpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHByZXNzZXMgYSBrZXkgb24gdGhlIGtleWJvYXJkOiovXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImtleWRvd25cIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgbGV0IHggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgaWYgKHgpIHggPSB4LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiZGl2XCIpO1xyXG4gICAgICAgICAgICBpZiAoZS5rZXlDb2RlID09PSA0MCkge1xyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgRE9XTiBrZXkgaXMgcHJlc3NlZCxcclxuICAgICAgICAgICAgICAgICBpbmNyZWFzZSB0aGUgY3VycmVudEZvY3VzIHZhcmlhYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cysrO1xyXG4gICAgICAgICAgICAgICAgLyphbmQgYW5kIG1ha2UgdGhlIGN1cnJlbnQgaXRlbSBtb3JlIHZpc2libGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuYWRkQWN0aXZlKHgpO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKGUua2V5Q29kZSA9PT0gMzgpIHsgLy91cFxyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgVVAga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgZGVjcmVhc2UgdGhlIGN1cnJlbnRGb2N1cyB2YXJpYWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMtLTtcclxuICAgICAgICAgICAgICAgIC8qYW5kIGFuZCBtYWtlIHRoZSBjdXJyZW50IGl0ZW0gbW9yZSB2aXNpYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT09IDEzKSB7XHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBFTlRFUiBrZXkgaXMgcHJlc3NlZCwgcHJldmVudCB0aGUgZm9ybSBmcm9tIGJlaW5nIHN1Ym1pdHRlZCwqL1xyXG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID4gLTEpIHtcclxuICAgICAgICAgICAgICAgICAgICAvKmFuZCBzaW11bGF0ZSBhIGNsaWNrIG9uIHRoZSBcImFjdGl2ZVwiIGl0ZW06Ki9cclxuICAgICAgICAgICAgICAgICAgICBpZiAoeCkgeFt0aGlzLmN1cnJlbnRGb2N1c10uY2xpY2soKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIGluIHRoZSBkb2N1bWVudDoqL1xyXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoZS50YXJnZXQpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIGFkZEFjdGl2ZSh4KSB7XHJcbiAgICAgICAgLyphIGZ1bmN0aW9uIHRvIGNsYXNzaWZ5IGFuIGl0ZW0gYXMgXCJhY3RpdmVcIjoqL1xyXG4gICAgICAgIGlmICgheCkgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIC8qc3RhcnQgYnkgcmVtb3ZpbmcgdGhlIFwiYWN0aXZlXCIgY2xhc3Mgb24gYWxsIGl0ZW1zOiovXHJcbiAgICAgICAgdGhpcy5yZW1vdmVBY3RpdmUoeCk7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID49IHgubGVuZ3RoKSB0aGlzLmN1cnJlbnRGb2N1cyA9IDA7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzIDwgMCkgdGhpcy5jdXJyZW50Rm9jdXMgPSAoeC5sZW5ndGggLSAxKTtcclxuICAgICAgICAvKmFkZCBjbGFzcyBcImF1dG9jb21wbGV0ZS1hY3RpdmVcIjoqL1xyXG4gICAgICAgIHhbdGhpcy5jdXJyZW50Rm9jdXNdLmNsYXNzTGlzdC5hZGQoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICB9XHJcblxyXG4gICAgcmVtb3ZlQWN0aXZlKHgpIHtcclxuICAgICAgICAvKmEgZnVuY3Rpb24gdG8gcmVtb3ZlIHRoZSBcImFjdGl2ZVwiIGNsYXNzIGZyb20gYWxsIGF1dG9jb21wbGV0ZSBpdGVtczoqL1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICB4W2ldLmNsYXNzTGlzdC5yZW1vdmUoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIGNsb3NlQWxsTGlzdHMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnNvbGUubG9nKFwiY2xvc2UgYWxsIGxpc3RzXCIpO1xyXG4gICAgICAgIC8qY2xvc2UgYWxsIGF1dG9jb21wbGV0ZSBsaXN0cyBpbiB0aGUgZG9jdW1lbnQsXHJcbiAgICAgICAgIGV4Y2VwdCB0aGUgb25lIHBhc3NlZCBhcyBhbiBhcmd1bWVudDoqL1xyXG4gICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICBpZiAoZWxlbWVudCAhPT0geFtpXSAmJiBlbGVtZW50ICE9PSB0aGlzLm5hbWVJbnB1dCkge1xyXG4gICAgICAgICAgICAgICAgeFtpXS5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHhbaV0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59XHJcblxyXG4vLyBGaXJzdCwgY2hlY2tzIGlmIGl0IGlzbid0IGltcGxlbWVudGVkIHlldC5cclxuaWYgKCFTdHJpbmcucHJvdG90eXBlLmZvcm1hdCkge1xyXG4gICAgU3RyaW5nLnByb3RvdHlwZS5mb3JtYXQgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICBjb25zdCBhcmdzID0gYXJndW1lbnRzO1xyXG4gICAgICAgIHJldHVybiB0aGlzLnJlcGxhY2UoL3soXFxkKyl9L2csIGZ1bmN0aW9uKG1hdGNoLCBudW1iZXIpIHtcclxuICAgICAgICAgICAgcmV0dXJuIHR5cGVvZiBhcmdzW251bWJlcl0gIT09ICd1bmRlZmluZWQnXHJcbiAgICAgICAgICAgICAgICA/IGFyZ3NbbnVtYmVyXVxyXG4gICAgICAgICAgICAgICAgOiBtYXRjaFxyXG4gICAgICAgICAgICAgICAgO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfTtcclxufSIsIi8vIFRoZSBtb2R1bGUgY2FjaGVcbnZhciBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX18gPSB7fTtcblxuLy8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbmZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG5cdHZhciBjYWNoZWRNb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdO1xuXHRpZiAoY2FjaGVkTW9kdWxlICE9PSB1bmRlZmluZWQpIHtcblx0XHRyZXR1cm4gY2FjaGVkTW9kdWxlLmV4cG9ydHM7XG5cdH1cblx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcblx0dmFyIG1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF0gPSB7XG5cdFx0Ly8gbm8gbW9kdWxlLmlkIG5lZWRlZFxuXHRcdC8vIG5vIG1vZHVsZS5sb2FkZWQgbmVlZGVkXG5cdFx0ZXhwb3J0czoge31cblx0fTtcblxuXHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cblx0X193ZWJwYWNrX21vZHVsZXNfX1ttb2R1bGVJZF0obW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cblx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcblx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xufVxuXG4iLCIvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9ucyBmb3IgaGFybW9ueSBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSAoZXhwb3J0cywgZGVmaW5pdGlvbikgPT4ge1xuXHRmb3IodmFyIGtleSBpbiBkZWZpbml0aW9uKSB7XG5cdFx0aWYoX193ZWJwYWNrX3JlcXVpcmVfXy5vKGRlZmluaXRpb24sIGtleSkgJiYgIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBrZXkpKSB7XG5cdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywga2V5LCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZGVmaW5pdGlvbltrZXldIH0pO1xuXHRcdH1cblx0fVxufTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSAob2JqLCBwcm9wKSA9PiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iaiwgcHJvcCkpIiwiLy8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5yID0gKGV4cG9ydHMpID0+IHtcblx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG5cdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG5cdH1cblx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbn07IiwiLyoqXHJcbiAqIEhhbmRsZXMgY2xpZW50IHNjcmlwdGluZyBmb3IgdGhlIHRvdXJuYW1lbnQgbWF0Y2hlcyBwYWdlLlxyXG4gKlxyXG4gKiBAbGluayAgICAgICBodHRwczovL3d3dy50b3VybmFtYXRjaC5jb21cclxuICogQHNpbmNlICAgICAgMy4xNy4wXHJcbiAqIEBzaW5jZSAgICAgIDMuMjEuMCBBZGRlZCBzdXBwb3J0IGZvciBzZXJ2ZXIgc2lkZSBEYXRhVGFibGVzLlxyXG4gKlxyXG4gKiBAcGFja2FnZSAgICBUb3VybmFtYXRjaFxyXG4gKlxyXG4gKi9cclxuaW1wb3J0IHsgdHJuIH0gZnJvbSAnLi90b3VybmFtYXRjaC5qcyc7XHJcbmltcG9ydCB7IGVzY2FwZUhUTUwgfSBmcm9tICdAd29yZHByZXNzL2VzY2FwZS1odG1sJztcclxuXHJcbihmdW5jdGlvbiAoJCwgdHJuKSB7XHJcbiAgICBsZXQgb3B0aW9ucyA9IHRybl90b3VybmFtZW50X21hdGNoZXNfb3B0aW9ucztcclxuXHJcbiAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignbG9hZCcsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICBsZXQgY29sdW1uRGVmcyA9IFtcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMCxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICduYW1lJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi10b3VybmFtZW50LW1hdGNoZXMtdGFibGUtY29tcGV0aXRvcnMnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IGh0bWwgPSBgIHZzIGA7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHJvdy5fZW1iZWRkZWQub25lX2NvbXBldGl0b3JbMF0ubmFtZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBodG1sID0gYDxhIGhyZWY9XCIke3Jvdy5fZW1iZWRkZWQub25lX2NvbXBldGl0b3JbMF0ubGlua31cIj4ke2VzY2FwZUhUTUwocm93Ll9lbWJlZGRlZC5vbmVfY29tcGV0aXRvclswXS5uYW1lKX08L2E+YCArIGh0bWw7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIGlmIChyb3cuX2VtYmVkZGVkLnR3b19jb21wZXRpdG9yWzBdLm5hbWUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaHRtbCArPSBgPGEgaHJlZj1cIiR7cm93Ll9lbWJlZGRlZC50d29fY29tcGV0aXRvclswXS5saW5rfVwiPiR7ZXNjYXBlSFRNTChyb3cuX2VtYmVkZGVkLnR3b19jb21wZXRpdG9yWzBdLm5hbWUpfTwvYT5gO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGh0bWwgKz0gb3B0aW9ucy51bmRlY2lkZWQ7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiBodG1sO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIG9yZGVyYWJsZTogZmFsc2UsXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IDEsXHJcbiAgICAgICAgICAgICAgICBuYW1lOiAncmVzdWx0JyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi10b3VybmFtZW50LW1hdGNoZXMtdGFibGUtcmVzdWx0JyxcclxuICAgICAgICAgICAgICAgIHJlbmRlcjogZnVuY3Rpb24gKGRhdGEsIHR5cGUsIHJvdykge1xyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiByb3cubWF0Y2hfcmVzdWx0O1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIG9yZGVyYWJsZTogZmFsc2UsXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHRhcmdldHM6IDIsXHJcbiAgICAgICAgICAgICAgICBuYW1lOiAnbWF0Y2hfZGF0ZScsXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICd0cm4tdG91cm5hbWVudC1tYXRjaGVzLXRhYmxlLWRhdGUnLFxyXG4gICAgICAgICAgICAgICAgcmVuZGVyOiBmdW5jdGlvbiAoZGF0YSwgdHlwZSwgcm93KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIHJvdy5tYXRjaF9kYXRlLnJlbmRlcmVkO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0czogMyxcclxuICAgICAgICAgICAgICAgIG5hbWU6ICdkZXRhaWxzJyxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ3Rybi10b3VybmFtZW50LW1hdGNoZXMtdGFibGUtbGluaycsXHJcbiAgICAgICAgICAgICAgICByZW5kZXI6IGZ1bmN0aW9uIChkYXRhLCB0eXBlLCByb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gYDxhIGhyZWY9XCIke3Jvdy5saW5rfVwiIHRpdGxlPVwiJHtvcHRpb25zLmxhbmd1YWdlLnZpZXdfbWF0Y2hfZGV0YWlsc31cIj48aSBjbGFzcz1cImZhIGZhLWluZm9cIj48L2k+PC9hPmA7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgb3JkZXJhYmxlOiBmYWxzZSxcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICBdO1xyXG5cclxuICAgICAgICAkKCcjdHJuLXRvdXJuYW1lbnQtbWF0Y2hlcy10YWJsZScpXHJcbiAgICAgICAgICAgIC5vbigneGhyLmR0JywgZnVuY3Rpb24gKGUsIHNldHRpbmdzLCBqc29uLCB4aHIpIHtcclxuICAgICAgICAgICAgICAgIGpzb24uZGF0YSA9IEpTT04ucGFyc2UoSlNPTi5zdHJpbmdpZnkoanNvbikpO1xyXG4gICAgICAgICAgICAgICAganNvbi5yZWNvcmRzVG90YWwgPSB4aHIuZ2V0UmVzcG9uc2VIZWFkZXIoJ1gtV1AtVG90YWwnKTtcclxuICAgICAgICAgICAgICAgIGpzb24ucmVjb3Jkc0ZpbHRlcmVkID0geGhyLmdldFJlc3BvbnNlSGVhZGVyKCdUUk4tRmlsdGVyZWQnKTtcclxuICAgICAgICAgICAgICAgIGpzb24ubGVuZ3RoID0geGhyLmdldFJlc3BvbnNlSGVhZGVyKCdYLVdQLVRvdGFsUGFnZXMnKTtcclxuICAgICAgICAgICAgICAgIGpzb24uZHJhdyA9IHhoci5nZXRSZXNwb25zZUhlYWRlcignVFJOLURyYXcnKTtcclxuICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgLkRhdGFUYWJsZSh7XHJcbiAgICAgICAgICAgICAgICBwcm9jZXNzaW5nOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgc2VydmVyU2lkZTogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIGxlbmd0aE1lbnU6IFtbMjUsIDUwLCAxMDAsIC0xXSwgWzI1LCA1MCwgMTAwLCAnQWxsJ11dLFxyXG4gICAgICAgICAgICAgICAgbGFuZ3VhZ2U6IG9wdGlvbnMudGFibGVfbGFuZ3VhZ2UsXHJcbiAgICAgICAgICAgICAgICBhdXRvV2lkdGg6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgYWpheDoge1xyXG4gICAgICAgICAgICAgICAgICAgIHVybDogYCR7b3B0aW9ucy5hcGlfdXJsfW1hdGNoZXMvP2NvbXBldGl0aW9uX3R5cGU9dG91cm5hbWVudHMmY29tcGV0aXRpb25faWQ9JHtvcHRpb25zLnRvdXJuYW1lbnRfaWR9Jl93cG5vbmNlPSR7b3B0aW9ucy5yZXN0X25vbmNlfSZfZW1iZWRgLFxyXG4gICAgICAgICAgICAgICAgICAgIHR5cGU6ICdHRVQnLFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBkcmF3OiBkYXRhLmRyYXcsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwYWdlOiBNYXRoLmZsb29yKGRhdGEuc3RhcnQgLyBkYXRhLmxlbmd0aCksXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwZXJfcGFnZTogZGF0YS5sZW5ndGgsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzZWFyY2g6IGRhdGEuc2VhcmNoLnZhbHVlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgb3JkZXJieTogYCR7ZGF0YS5jb2x1bW5zW2RhdGEub3JkZXJbMF0uY29sdW1uXS5uYW1lfS4ke2RhdGEub3JkZXJbMF0uZGlyfWBcclxuICAgICAgICAgICAgICAgICAgICAgICAgfTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgb3JkZXI6IFtbMiwgJ2Rlc2MnXV0sXHJcbiAgICAgICAgICAgICAgICBjb2x1bW5EZWZzOiBjb2x1bW5EZWZzLFxyXG4gICAgICAgICAgICB9KTtcclxuICAgIH0sIGZhbHNlKTtcclxufShqUXVlcnksIHRybikpOyJdLCJuYW1lcyI6WyJfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4iLCJ2YWx1ZSIsInJlcGxhY2UiLCJSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRSIsImVzY2FwZUFtcGVyc2FuZCIsImVzY2FwZVF1b3RhdGlvbk1hcmsiLCJlc2NhcGVMZXNzVGhhbiIsImVzY2FwZUF0dHJpYnV0ZSIsImVzY2FwZUhUTUwiLCJlc2NhcGVFZGl0YWJsZUhUTUwiLCJpc1ZhbGlkQXR0cmlidXRlTmFtZSIsIm5hbWUiLCJ0ZXN0IiwiX3R5cGVvZiIsIm8iLCJTeW1ib2wiLCJpdGVyYXRvciIsImNvbnN0cnVjdG9yIiwicHJvdG90eXBlIiwiX2NsYXNzQ2FsbENoZWNrIiwiYSIsIm4iLCJUeXBlRXJyb3IiLCJfZGVmaW5lUHJvcGVydGllcyIsImUiLCJyIiwidCIsImxlbmd0aCIsImVudW1lcmFibGUiLCJjb25maWd1cmFibGUiLCJ3cml0YWJsZSIsIk9iamVjdCIsImRlZmluZVByb3BlcnR5IiwiX3RvUHJvcGVydHlLZXkiLCJrZXkiLCJfY3JlYXRlQ2xhc3MiLCJpIiwiX3RvUHJpbWl0aXZlIiwidG9QcmltaXRpdmUiLCJjYWxsIiwiU3RyaW5nIiwiTnVtYmVyIiwiVG91cm5hbWF0Y2giLCJldmVudHMiLCJwYXJhbSIsIm9iamVjdCIsInByZWZpeCIsInN0ciIsInByb3AiLCJoYXNPd25Qcm9wZXJ0eSIsImsiLCJ2IiwicHVzaCIsImVuY29kZVVSSUNvbXBvbmVudCIsImpvaW4iLCJldmVudCIsImV2ZW50TmFtZSIsIkV2ZW50VGFyZ2V0IiwiYXV0b2NvbXBsZXRlIiwiaW5wdXQiLCJkYXRhQ2FsbGJhY2siLCJUb3VybmFtYXRjaF9BdXRvY29tcGxldGUiLCJ1Y2ZpcnN0IiwicyIsImNoYXJBdCIsInRvVXBwZXJDYXNlIiwic2xpY2UiLCJvcmRpbmFsX3N1ZmZpeCIsIm51bWJlciIsInJlbWFpbmRlciIsInRhYnMiLCJlbGVtZW50IiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsInBhbmVzIiwiZG9jdW1lbnQiLCJjbGVhckFjdGl2ZSIsIkFycmF5IiwiZm9yRWFjaCIsInRhYiIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFyaWFTZWxlY3RlZCIsInBhbmUiLCJzZXRBY3RpdmUiLCJ0YXJnZXRJZCIsInRhcmdldFRhYiIsInF1ZXJ5U2VsZWN0b3IiLCJ0YXJnZXRQYW5lSWQiLCJkYXRhc2V0IiwidGFyZ2V0IiwiYWRkIiwiZ2V0RWxlbWVudEJ5SWQiLCJ0YWJDbGljayIsImN1cnJlbnRUYXJnZXQiLCJwcmV2ZW50RGVmYXVsdCIsImFkZEV2ZW50TGlzdGVuZXIiLCJsb2NhdGlvbiIsImhhc2giLCJzdWJzdHIiLCJ3aW5kb3ciLCJ0cm5fb2JqX2luc3RhbmNlIiwidGFiVmlld3MiLCJmcm9tIiwidHJuIiwiZHJvcGRvd25zIiwiaGFuZGxlRHJvcGRvd25DbG9zZSIsImRyb3Bkb3duIiwibmV4dEVsZW1lbnRTaWJsaW5nIiwicmVtb3ZlRXZlbnRMaXN0ZW5lciIsInN0b3BQcm9wYWdhdGlvbiIsIl90aGlzIiwibmFtZUlucHV0IiwiYiIsInZhbCIsInBhcmVudCIsInBhcmVudE5vZGUiLCJ0aGVuIiwiZGF0YSIsImNvbnNvbGUiLCJsb2ciLCJjbG9zZUFsbExpc3RzIiwiY3VycmVudEZvY3VzIiwiY3JlYXRlRWxlbWVudCIsInNldEF0dHJpYnV0ZSIsImlkIiwiYXBwZW5kQ2hpbGQiLCJ0ZXh0IiwiaW5uZXJIVE1MIiwiY29uY2F0Iiwic2VsZWN0ZWRJZCIsImRpc3BhdGNoRXZlbnQiLCJFdmVudCIsIngiLCJnZXRFbGVtZW50c0J5VGFnTmFtZSIsImtleUNvZGUiLCJhZGRBY3RpdmUiLCJjbGljayIsInJlbW92ZUFjdGl2ZSIsInJlbW92ZUNoaWxkIiwiZm9ybWF0IiwiYXJncyIsImFyZ3VtZW50cyIsIm1hdGNoIiwiJCIsIm9wdGlvbnMiLCJ0cm5fdG91cm5hbWVudF9tYXRjaGVzX29wdGlvbnMiLCJjb2x1bW5EZWZzIiwidGFyZ2V0cyIsImNsYXNzTmFtZSIsInJlbmRlciIsInR5cGUiLCJyb3ciLCJodG1sIiwiX2VtYmVkZGVkIiwib25lX2NvbXBldGl0b3IiLCJsaW5rIiwidHdvX2NvbXBldGl0b3IiLCJ1bmRlY2lkZWQiLCJvcmRlcmFibGUiLCJtYXRjaF9yZXN1bHQiLCJtYXRjaF9kYXRlIiwicmVuZGVyZWQiLCJsYW5ndWFnZSIsInZpZXdfbWF0Y2hfZGV0YWlscyIsIm9uIiwic2V0dGluZ3MiLCJqc29uIiwieGhyIiwiSlNPTiIsInBhcnNlIiwic3RyaW5naWZ5IiwicmVjb3Jkc1RvdGFsIiwiZ2V0UmVzcG9uc2VIZWFkZXIiLCJyZWNvcmRzRmlsdGVyZWQiLCJkcmF3IiwiRGF0YVRhYmxlIiwicHJvY2Vzc2luZyIsInNlcnZlclNpZGUiLCJsZW5ndGhNZW51IiwidGFibGVfbGFuZ3VhZ2UiLCJhdXRvV2lkdGgiLCJhamF4IiwidXJsIiwiYXBpX3VybCIsInRvdXJuYW1lbnRfaWQiLCJyZXN0X25vbmNlIiwicGFnZSIsIk1hdGgiLCJmbG9vciIsInN0YXJ0IiwicGVyX3BhZ2UiLCJzZWFyY2giLCJvcmRlcmJ5IiwiY29sdW1ucyIsIm9yZGVyIiwiY29sdW1uIiwiZGlyIiwialF1ZXJ5Il0sInNvdXJjZVJvb3QiOiIifQ==
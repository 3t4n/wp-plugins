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
  !*** ./src/js/team-profile.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
/**
 * Team profile page.
 *
 * @link       https://www.tournamatch.com
 * @since      3.8.0
 *
 * @package    Tournamatch
 *
 */


(function ($) {
  'use strict';

  // add listener for roster changed event
  window.addEventListener('load', function () {
    var options = trn_team_profile_options;
    var joinTeamButton = document.getElementById('trn-join-team-button');
    var leaveTeamButton = document.getElementById('trn-leave-team-button');
    var deleteTeamButton = document.getElementById('trn-delete-team-button');
    var editTeamButton = document.getElementById('trn-edit-team-button');
    function canJoin(userId, members) {
      var isMember = false;
      if (members !== null && members.length > 0) {
        members.forEach(function (member) {
          isMember = isMember || member.user_id === userId;
        });
      }
      return !isMember;
    }
    function canLeave(userId, members) {
      var isMember = false;
      var isOwner = false;
      if (members !== null && members.length > 0) {
        members.forEach(function (member) {
          if (member.user_id === userId) {
            isMember = true;
            if (member.team_rank_id === 1) {
              isOwner = true;
            }
          }
        });
      }
      return isMember && !isOwner;
    }
    function canDelete(userId, members) {
      var isMember = false;
      if (members !== null && members.length > 0) {
        members.forEach(function (member) {
          isMember = member.user_id === userId || isMember;
        });
      }
      return isMember && members.length === 1;
    }
    function canEdit(userId, members) {
      var isOwner = false;
      if (members !== null && members.length > 0) {
        members.forEach(function (member) {
          isOwner = member.user_id === userId && member.team_rank_id === 1 || isOwner;
        });
      }
      return isOwner;
    }
    function getCurrentUserTeamMemberId(userId, members) {
      var teamMemberId = null;
      if (members !== null && members.length > 0) {
        members.forEach(function (member) {
          if (member.user_id === userId) {
            teamMemberId = member.team_member_id;
          }
        });
      }
      return teamMemberId;
    }
    function evaluateButtonStates(members) {
      var userId = parseInt(options.current_user_id);
      if (canDelete(userId, members)) {
        deleteTeamButton.style.display = 'inline-block';
        deleteTeamButton.dataset.teamMemberId = getCurrentUserTeamMemberId(userId, members);
      } else {
        deleteTeamButton.style.display = 'none';
      }
      if (canJoin(userId, members)) {
        joinTeamButton.style.display = 'inline-block';
      } else {
        joinTeamButton.style.display = 'none';
      }
      if (canLeave(userId, members)) {
        leaveTeamButton.style.display = 'inline-block';
        leaveTeamButton.dataset.teamMemberId = getCurrentUserTeamMemberId(userId, members);
      } else {
        leaveTeamButton.style.display = 'none';
      }
      if (options.can_edit || canEdit(userId, members)) {
        editTeamButton.style.display = 'inline-block';
      } else {
        editTeamButton.style.display = 'none';
      }
    }
    function getMembers() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', options.api_url + 'team-members/?_embed&' + $.param({
        team_id: options.team_id
      }));
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
      xhr.onload = function () {
        var content = '';
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.response);
          // let memberLinks = [];

          // if (response !== null && response.length > 0) {
          //     Array.prototype.forEach.call(response, function (member) {
          //         memberLinks.push(`<a href="../players/${member.user_id}">${member._embedded.player[0].name}</a>`);
          //     });
          //
          //     content += memberLinks.join(', ');
          // } else {
          //     content += `<p class="trn-text-center">${options.language.zero_members}</p>`;
          // }
          if (options.is_logged_in) {
            evaluateButtonStates(response);
          }
        } else {
          content += "<p class=\"text-center\">".concat(options.language.error_members, "</p>");
        }
        var memberList = document.getElementById('trn-team-members-list');
        if (memberList) {
          memberList.innerHTML = content;
        }
      };
      xhr.send();
    }
    getMembers();
    $.event('team-members').addEventListener('changed', function () {
      getMembers();
    });
    function joinTeam() {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', options.api_url + 'team-requests');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
      xhr.onload = function () {
        var response = JSON.parse(xhr.response);
        if (xhr.status === 201) {
          document.getElementById('trn-join-team-response').innerHTML = "<div class=\"trn-alert trn-alert-success\"><strong>".concat(options.language.success, "!</strong> ").concat(options.language.success_message, "</div>");
        } else {
          document.getElementById('trn-join-team-response').innerHTML = "<div class=\"trn-alert trn-alert-danger\"><strong>".concat(options.language.failure, ":</strong> ").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(response.message), "</div>");
        }
      };
      xhr.send($.param({
        team_id: document.getElementById('trn-join-team-button').dataset.teamId,
        user_id: document.getElementById('trn-join-team-button').dataset.userId
      }));
    }
    function handleJoinTeam(event) {
      joinTeam();
    }
    function leaveTeam() {
      var xhr = new XMLHttpRequest();
      xhr.open('DELETE', options.api_url + 'team-members/' + leaveTeamButton.dataset.teamMemberId);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
      xhr.onload = function () {
        if (xhr.status === 204) {
          $.event('team-members').dispatchEvent(new CustomEvent('changed', {
            detail: {
              team_member_id: leaveTeamButton.dataset.teamMemberId
            }
          }));
        } else {
          var response = JSON.parse(xhr.response);
          document.getElementById('trn-leave-team-response').innerHTML = "<div class=\"trn-alert trn-alert-danger\"><strong>".concat(options.language.failure, ":</strong> ").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(response.message), "</div>");
        }
      };
      xhr.send();
    }
    function deleteTeam() {
      var xhr = new XMLHttpRequest();
      xhr.open('DELETE', options.api_url + 'team-members/' + deleteTeamButton.dataset.teamMemberId);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
      xhr.onload = function () {
        if (xhr.status === 204) {
          window.location.href = options.teams_url;
        } else {
          var response = JSON.parse(xhr.response);
          document.getElementById('trn-leave-team-response').innerHTML = "<div class=\"trn-alert trn-alert-danger\"><strong>".concat(options.language.failure, ":</strong> ").concat((0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(response.message), "</div>");
        }
      };
      xhr.send();
    }
    if (options.is_logged_in) {
      joinTeamButton.addEventListener('click', handleJoinTeam, false);
      leaveTeamButton.addEventListener('click', leaveTeam);
      deleteTeamButton.addEventListener('click', deleteTeam);
    }

    /*the autocomplete function takes two arguments,
     the text field element and an array of possible autocompleted values:*/
    var addForm = document.getElementById('trn-add-player-form');
    var nameInput = document.getElementById('trn-add-player-input');
    var currentFocus;
    if (options.can_add === '1') {
      addForm.addEventListener('submit', function (event) {
        event.preventDefault();
        console.log('submitted');
        var p = new Promise(function (resolve, reject) {
          var xhr = new XMLHttpRequest();
          xhr.open('GET', options.api_url + 'players/?name=' + nameInput.value);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
          xhr.onload = function () {
            console.log(JSON.parse(xhr.response)[0]['user_id']);
            if (xhr.status === 200) {
              resolve(JSON.parse(xhr.response)[0]['user_id']);
            } else {
              reject();
            }
          };
          xhr.send();
        });
        p.then(function (user_id) {
          var xhr = new XMLHttpRequest();
          xhr.open('POST', options.api_url + 'team-members/');
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
          xhr.onload = function () {
            console.log(xhr);
            if (xhr.status === 201) {
              $.event('team-members').dispatchEvent(new CustomEvent('changed', {}));
            } else {
              var message = xhr.status === 403 ? JSON.parse(xhr.response).message : options.language.failure_message;
              document.getElementById('trn-add-player-response').innerHTML = "<div class=\"trn-alert trn-alert-danger\"><strong>".concat(options.language.failure, ":</strong> ").concat(message, "</div>");
            }
          };
          xhr.send($.param({
            team_id: options.team_id,
            user_id: user_id
          }));
        });
      }, false);

      /*execute a function when someone writes in the text field:*/
      nameInput.addEventListener("input", function (e) {
        var _this = this;
        var a,
          b,
          i,
          val = this.value;
        var parent = this.parentNode;
        var p = new Promise(function (resolve, reject) {
          /* need to query server for names here. */
          var xhr = new XMLHttpRequest();
          xhr.open('GET', options.api_url + 'players/?search=' + val + '&per_page=5');
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
          xhr.onload = function () {
            if (xhr.status === 200) {
              // resolve(JSON.parse(xhr.response).map((player) => {return { 'value': player.id, 'text': player.name };}));
              resolve(JSON.parse(xhr.response).map(function (player) {
                return (0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_1__.escapeHTML)(player.name);
              }));
            } else {
              reject();
            }
          };
          xhr.send();
        });
        p.then(function (data) {
          console.log(data);

          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) {
            return false;
          }
          currentFocus = -1;

          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", _this.id + "-auto-complete-list");
          a.setAttribute("class", "trn-auto-complete-items");

          /*append the DIV element as a child of the autocomplete container:*/
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
                /* insert the value for the autocomplete text field: */
                nameInput.value = this.dataset.text;
                nameInput.dataset.selectedId = this.dataset.value;

                /* close the list of autocompleted values, (or any other open lists of autocompleted values:*/
                closeAllLists();
              });
              a.appendChild(b);
            }
          }
        });
      });

      /*execute a function presses a key on the keyboard:*/
      nameInput.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "-auto-complete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode === 40) {
          /*If the arrow DOWN key is pressed,
           increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode === 38) {
          //up
          /*If the arrow UP key is pressed,
           decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode === 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
      });

      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
        closeAllLists(e.target);
      });
    }
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = x.length - 1;
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("trn-auto-complete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("trn-auto-complete-active");
      }
    }
    function closeAllLists(elmnt) {
      console.log("close all lists");
      /*close all autocomplete lists in the document,
       except the one passed as an argument:*/
      var x = document.getElementsByClassName("trn-auto-complete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt !== x[i] && elmnt !== nameInput) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
  }, false);
})(_tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q0FBRTtNQUNuRDtNQUNBeUcsQ0FBQyxDQUFDWCxZQUFZLENBQUMsQ0FBQzFDLFNBQVMsQ0FBQ1csR0FBRyxDQUFDLDBCQUEwQixDQUFDO0lBQzdEO0lBRUEsU0FBUytDLFlBQVlBLENBQUNMLENBQUMsRUFBRTtNQUNyQjtNQUNBLEtBQUssSUFBSWhHLENBQUMsR0FBRyxDQUFDLEVBQUVBLENBQUMsR0FBR2dHLENBQUMsQ0FBQ3pHLE1BQU0sRUFBRVMsQ0FBQyxFQUFFLEVBQUU7UUFDL0JnRyxDQUFDLENBQUNoRyxDQUFDLENBQUMsQ0FBQzJDLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLDBCQUEwQixDQUFDO01BQ3JEO0lBQ0o7SUFFQSxTQUFTd0MsYUFBYUEsQ0FBQzJGLEtBQUssRUFBRTtNQUMxQjdGLE9BQU8sQ0FBQ0MsR0FBRyxDQUFDLGlCQUFpQixDQUFDO01BQzlCO0FBQ1o7TUFDWSxJQUFJYSxDQUFDLEdBQUcxRCxRQUFRLENBQUNGLHNCQUFzQixDQUFDLHlCQUF5QixDQUFDO01BQ2xFLEtBQUssSUFBSXBDLENBQUMsR0FBRyxDQUFDLEVBQUVBLENBQUMsR0FBR2dHLENBQUMsQ0FBQ3pHLE1BQU0sRUFBRVMsQ0FBQyxFQUFFLEVBQUU7UUFDL0IsSUFBSStLLEtBQUssS0FBSy9FLENBQUMsQ0FBQ2hHLENBQUMsQ0FBQyxJQUFJK0ssS0FBSyxLQUFLcEcsU0FBUyxFQUFFO1VBQ3ZDcUIsQ0FBQyxDQUFDaEcsQ0FBQyxDQUFDLENBQUMrRSxVQUFVLENBQUN1QixXQUFXLENBQUNOLENBQUMsQ0FBQ2hHLENBQUMsQ0FBQyxDQUFDO1FBQ3JDO01BQ0o7SUFDSjtFQUVKLENBQUMsRUFBRSxLQUFLLENBQUM7QUFDYixDQUFDLEVBQUVtRSxnREFBRyxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly90b3VybmFtYXRjaC9Ad29yZHByZXNzL2VzY2FwZS1odG1sL3NyYy9lc2NhcGUtZ3JlYXRlci5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC9Ad29yZHByZXNzL2VzY2FwZS1odG1sL3NyYy9pbmRleC5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC8uL3NyYy9qcy90b3VybmFtYXRjaC5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL2Jvb3RzdHJhcCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvZGVmaW5lIHByb3BlcnR5IGdldHRlcnMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2hhc093blByb3BlcnR5IHNob3J0aGFuZCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvbWFrZSBuYW1lc3BhY2Ugb2JqZWN0Iiwid2VicGFjazovL3RvdXJuYW1hdGNoLy4vc3JjL2pzL3RlYW0tcHJvZmlsZS5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBncmVhdGVyLXRoYW4gc2lnbiByZXBsYWNlZC5cbiAqXG4gKiBOb3RlIHRoYXQgaWYgYSByZXNvbHV0aW9uIGZvciBUcmFjIzQ1Mzg3IGNvbWVzIHRvIGZydWl0aW9uLCBpdCBpcyBubyBsb25nZXJcbiAqIG5lY2Vzc2FyeSBmb3IgYF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbmAgdG8gZXhpc3QuXG4gKlxuICogU2VlOiBodHRwczovL2NvcmUudHJhYy53b3JkcHJlc3Mub3JnL3RpY2tldC80NTM4N1xuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC8+L2csICcmZ3Q7JyApO1xufVxuIiwiLyoqXG4gKiBJbnRlcm5hbCBkZXBlbmRlbmNpZXNcbiAqL1xuaW1wb3J0IF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbiBmcm9tICcuL2VzY2FwZS1ncmVhdGVyJztcblxuLyoqXG4gKiBSZWd1bGFyIGV4cHJlc3Npb24gbWF0Y2hpbmcgaW52YWxpZCBhdHRyaWJ1dGUgbmFtZXMuXG4gKlxuICogXCJBdHRyaWJ1dGUgbmFtZXMgbXVzdCBjb25zaXN0IG9mIG9uZSBvciBtb3JlIGNoYXJhY3RlcnMgb3RoZXIgdGhhbiBjb250cm9scyxcbiAqIFUrMDAyMCBTUEFDRSwgVSswMDIyIChcIiksIFUrMDAyNyAoJyksIFUrMDAzRSAoPiksIFUrMDAyRiAoLyksIFUrMDAzRCAoPSksXG4gKiBhbmQgbm9uY2hhcmFjdGVycy5cIlxuICpcbiAqIEBzZWUgaHR0cHM6Ly9odG1sLnNwZWMud2hhdHdnLm9yZy9tdWx0aXBhZ2Uvc3ludGF4Lmh0bWwjYXR0cmlidXRlcy0yXG4gKlxuICogQHR5cGUge1JlZ0V4cH1cbiAqL1xuY29uc3QgUkVHRVhQX0lOVkFMSURfQVRUUklCVVRFX05BTUUgPSAvW1xcdTAwN0YtXFx1MDA5RiBcIic+Lz1cIlxcdUZERDAtXFx1RkRFRl0vO1xuXG4vKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBhbXBlcnNhbmRzIGVzY2FwZWQuIE5vdGUgdGhhdCB0aGlzIGlzIGFuIGltcGVyZmVjdFxuICogaW1wbGVtZW50YXRpb24sIHdoZXJlIG9ubHkgYW1wZXJzYW5kcyB3aGljaCBkbyBub3QgYXBwZWFyIGFzIGEgcGF0dGVybiBvZlxuICogbmFtZWQsIGRlY2ltYWwsIG9yIGhleGFkZWNpbWFsIGNoYXJhY3RlciByZWZlcmVuY2VzIGFyZSBlc2NhcGVkLiBJbnZhbGlkXG4gKiBuYW1lZCByZWZlcmVuY2VzIChpLmUuIGFtYmlndW91cyBhbXBlcnNhbmQpIGFyZSBzdGlsbCBwZXJtaXR0ZWQuXG4gKlxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNjaGFyYWN0ZXItcmVmZXJlbmNlc1xuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNhbWJpZ3VvdXMtYW1wZXJzYW5kXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI25hbWVkLWNoYXJhY3Rlci1yZWZlcmVuY2VzXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlQW1wZXJzYW5kKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC8mKD8hKFthLXowLTldK3wjWzAtOV0rfCN4W2EtZjAtOV0rKTspL2dpLCAnJmFtcDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIHF1b3RhdGlvbiBtYXJrcyByZXBsYWNlZC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVRdW90YXRpb25NYXJrKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC9cIi9nLCAnJnF1b3Q7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYSBzdHJpbmcgd2l0aCBsZXNzLXRoYW4gc2lnbiByZXBsYWNlZC5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVMZXNzVGhhbiggdmFsdWUgKSB7XG5cdHJldHVybiB2YWx1ZS5yZXBsYWNlKCAvPC9nLCAnJmx0OycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGFuIGVzY2FwZWQgYXR0cmlidXRlIHZhbHVlLlxuICpcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjZWxlbWVudHMtYXR0cmlidXRlc1xuICpcbiAqIFwiWy4uLl0gdGhlIHRleHQgY2Fubm90IGNvbnRhaW4gYW4gYW1iaWd1b3VzIGFtcGVyc2FuZCBbLi4uXSBtdXN0IG5vdCBjb250YWluXG4gKiBhbnkgbGl0ZXJhbCBVKzAwMjIgUVVPVEFUSU9OIE1BUksgY2hhcmFjdGVycyAoXCIpXCJcbiAqXG4gKiBOb3RlIHdlIGFsc28gZXNjYXBlIHRoZSBncmVhdGVyIHRoYW4gc3ltYm9sLCBhcyB0aGlzIGlzIHVzZWQgYnkgd3B0ZXh0dXJpemUgdG9cbiAqIHNwbGl0IEhUTUwgc3RyaW5ncy4gVGhpcyBpcyBhIFdvcmRQcmVzcyBzcGVjaWZpYyBmaXhcbiAqXG4gKiBOb3RlIHRoYXQgaWYgYSByZXNvbHV0aW9uIGZvciBUcmFjIzQ1Mzg3IGNvbWVzIHRvIGZydWl0aW9uLCBpdCBpcyBubyBsb25nZXJcbiAqIG5lY2Vzc2FyeSBmb3IgYF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbmAgdG8gYmUgdXNlZC5cbiAqXG4gKiBTZWU6IGh0dHBzOi8vY29yZS50cmFjLndvcmRwcmVzcy5vcmcvdGlja2V0LzQ1Mzg3XG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEF0dHJpYnV0ZSB2YWx1ZS5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgYXR0cmlidXRlIHZhbHVlLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlQXR0cmlidXRlKCB2YWx1ZSApIHtcblx0cmV0dXJuIF9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbihcblx0XHRlc2NhcGVRdW90YXRpb25NYXJrKCBlc2NhcGVBbXBlcnNhbmQoIHZhbHVlICkgKVxuXHQpO1xufVxuXG4vKipcbiAqIFJldHVybnMgYW4gZXNjYXBlZCBIVE1MIGVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCN3cml0aW5nLWh0bWwtZG9jdW1lbnRzLWVsZW1lbnRzXG4gKlxuICogXCJ0aGUgdGV4dCBtdXN0IG5vdCBjb250YWluIHRoZSBjaGFyYWN0ZXIgVSswMDNDIExFU1MtVEhBTiBTSUdOICg8KSBvciBhblxuICogYW1iaWd1b3VzIGFtcGVyc2FuZC5cIlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBFbGVtZW50IHZhbHVlLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBIVE1MIGVsZW1lbnQgdmFsdWUuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVIVE1MKCB2YWx1ZSApIHtcblx0cmV0dXJuIGVzY2FwZUxlc3NUaGFuKCBlc2NhcGVBbXBlcnNhbmQoIHZhbHVlICkgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGFuIGVzY2FwZWQgRWRpdGFibGUgSFRNTCBlbGVtZW50IHZhbHVlLiBUaGlzIGlzIGRpZmZlcmVudCBmcm9tXG4gKiBgZXNjYXBlSFRNTGAsIGJlY2F1c2UgZm9yIGVkaXRhYmxlIEhUTUwsIEFMTCBhbXBlcnNhbmRzIG11c3QgYmUgZXNjYXBlZCBpblxuICogb3JkZXIgdG8gcmVuZGVyIHRoZSBjb250ZW50IGNvcnJlY3RseSBvbiB0aGUgcGFnZS5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgRWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgSFRNTCBlbGVtZW50IHZhbHVlLlxuICovXG5leHBvcnQgZnVuY3Rpb24gZXNjYXBlRWRpdGFibGVIVE1MKCB2YWx1ZSApIHtcblx0cmV0dXJuIGVzY2FwZUxlc3NUaGFuKCB2YWx1ZS5yZXBsYWNlKCAvJi9nLCAnJmFtcDsnICkgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIHRydWUgaWYgdGhlIGdpdmVuIGF0dHJpYnV0ZSBuYW1lIGlzIHZhbGlkLCBvciBmYWxzZSBvdGhlcndpc2UuXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IG5hbWUgQXR0cmlidXRlIG5hbWUgdG8gdGVzdC5cbiAqXG4gKiBAcmV0dXJuIHtib29sZWFufSBXaGV0aGVyIGF0dHJpYnV0ZSBpcyB2YWxpZC5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGlzVmFsaWRBdHRyaWJ1dGVOYW1lKCBuYW1lICkge1xuXHRyZXR1cm4gISBSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRS50ZXN0KCBuYW1lICk7XG59XG4iLCIndXNlIHN0cmljdCc7XHJcbmNsYXNzIFRvdXJuYW1hdGNoIHtcclxuXHJcbiAgICBjb25zdHJ1Y3RvcigpIHtcclxuICAgICAgICB0aGlzLmV2ZW50cyA9IHt9O1xyXG4gICAgfVxyXG5cclxuICAgIHBhcmFtKG9iamVjdCwgcHJlZml4KSB7XHJcbiAgICAgICAgbGV0IHN0ciA9IFtdO1xyXG4gICAgICAgIGZvciAobGV0IHByb3AgaW4gb2JqZWN0KSB7XHJcbiAgICAgICAgICAgIGlmIChvYmplY3QuaGFzT3duUHJvcGVydHkocHJvcCkpIHtcclxuICAgICAgICAgICAgICAgIGxldCBrID0gcHJlZml4ID8gcHJlZml4ICsgXCJbXCIgKyBwcm9wICsgXCJdXCIgOiBwcm9wO1xyXG4gICAgICAgICAgICAgICAgbGV0IHYgPSBvYmplY3RbcHJvcF07XHJcbiAgICAgICAgICAgICAgICBzdHIucHVzaCgodiAhPT0gbnVsbCAmJiB0eXBlb2YgdiA9PT0gXCJvYmplY3RcIikgPyB0aGlzLnBhcmFtKHYsIGspIDogZW5jb2RlVVJJQ29tcG9uZW50KGspICsgXCI9XCIgKyBlbmNvZGVVUklDb21wb25lbnQodikpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiBzdHIuam9pbihcIiZcIik7XHJcbiAgICB9XHJcblxyXG4gICAgZXZlbnQoZXZlbnROYW1lKSB7XHJcbiAgICAgICAgaWYgKCEoZXZlbnROYW1lIGluIHRoaXMuZXZlbnRzKSkge1xyXG4gICAgICAgICAgICB0aGlzLmV2ZW50c1tldmVudE5hbWVdID0gbmV3IEV2ZW50VGFyZ2V0KGV2ZW50TmFtZSk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiB0aGlzLmV2ZW50c1tldmVudE5hbWVdO1xyXG4gICAgfVxyXG5cclxuICAgIGF1dG9jb21wbGV0ZShpbnB1dCwgZGF0YUNhbGxiYWNrKSB7XHJcbiAgICAgICAgbmV3IFRvdXJuYW1hdGNoX0F1dG9jb21wbGV0ZShpbnB1dCwgZGF0YUNhbGxiYWNrKTtcclxuICAgIH1cclxuXHJcbiAgICB1Y2ZpcnN0KHMpIHtcclxuICAgICAgICBpZiAodHlwZW9mIHMgIT09ICdzdHJpbmcnKSByZXR1cm4gJyc7XHJcbiAgICAgICAgcmV0dXJuIHMuY2hhckF0KDApLnRvVXBwZXJDYXNlKCkgKyBzLnNsaWNlKDEpO1xyXG4gICAgfVxyXG5cclxuICAgIG9yZGluYWxfc3VmZml4KG51bWJlcikge1xyXG4gICAgICAgIGNvbnN0IHJlbWFpbmRlciA9IG51bWJlciAlIDEwMDtcclxuXHJcbiAgICAgICAgaWYgKChyZW1haW5kZXIgPCAxMSkgfHwgKHJlbWFpbmRlciA+IDEzKSkge1xyXG4gICAgICAgICAgICBzd2l0Y2ggKHJlbWFpbmRlciAlIDEwKSB7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDE6IHJldHVybiAnc3QnO1xyXG4gICAgICAgICAgICAgICAgY2FzZSAyOiByZXR1cm4gJ25kJztcclxuICAgICAgICAgICAgICAgIGNhc2UgMzogcmV0dXJuICdyZCc7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuICd0aCc7XHJcbiAgICB9XHJcblxyXG4gICAgdGFicyhlbGVtZW50KSB7XHJcbiAgICAgICAgY29uc3QgdGFicyA9IGVsZW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLW5hdi1saW5rJyk7XHJcbiAgICAgICAgY29uc3QgcGFuZXMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tdGFiLXBhbmUnKTtcclxuICAgICAgICBjb25zdCBjbGVhckFjdGl2ZSA9ICgpID0+IHtcclxuICAgICAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbCh0YWJzLCAodGFiKSA9PiB7XHJcbiAgICAgICAgICAgICAgICB0YWIuY2xhc3NMaXN0LnJlbW92ZSgndHJuLW5hdi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgIHRhYi5hcmlhU2VsZWN0ZWQgPSBmYWxzZTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwocGFuZXMsIHBhbmUgPT4gcGFuZS5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tdGFiLWFjdGl2ZScpKTtcclxuICAgICAgICB9O1xyXG4gICAgICAgIGNvbnN0IHNldEFjdGl2ZSA9ICh0YXJnZXRJZCkgPT4ge1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRUYWIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdhW2hyZWY9XCIjJyArIHRhcmdldElkICsgJ1wiXS50cm4tbmF2LWxpbmsnKTtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0UGFuZUlkID0gdGFyZ2V0VGFiICYmIHRhcmdldFRhYi5kYXRhc2V0ICYmIHRhcmdldFRhYi5kYXRhc2V0LnRhcmdldCB8fCBmYWxzZTtcclxuXHJcbiAgICAgICAgICAgIGlmICh0YXJnZXRQYW5lSWQpIHtcclxuICAgICAgICAgICAgICAgIGNsZWFyQWN0aXZlKCk7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRUYWIuY2xhc3NMaXN0LmFkZCgndHJuLW5hdi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgIHRhcmdldFRhYi5hcmlhU2VsZWN0ZWQgPSB0cnVlO1xyXG5cclxuICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRhcmdldFBhbmVJZCkuY2xhc3NMaXN0LmFkZCgndHJuLXRhYi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcbiAgICAgICAgY29uc3QgdGFiQ2xpY2sgPSAoZXZlbnQpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0VGFiID0gZXZlbnQuY3VycmVudFRhcmdldDtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0UGFuZUlkID0gdGFyZ2V0VGFiICYmIHRhcmdldFRhYi5kYXRhc2V0ICYmIHRhcmdldFRhYi5kYXRhc2V0LnRhcmdldCB8fCBmYWxzZTtcclxuXHJcbiAgICAgICAgICAgIGlmICh0YXJnZXRQYW5lSWQpIHtcclxuICAgICAgICAgICAgICAgIHNldEFjdGl2ZSh0YXJnZXRQYW5lSWQpO1xyXG4gICAgICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwodGFicywgKHRhYikgPT4ge1xyXG4gICAgICAgICAgICB0YWIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCB0YWJDbGljayk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGlmIChsb2NhdGlvbi5oYXNoKSB7XHJcbiAgICAgICAgICAgIHNldEFjdGl2ZShsb2NhdGlvbi5oYXNoLnN1YnN0cigxKSk7XHJcbiAgICAgICAgfSBlbHNlIGlmICh0YWJzLmxlbmd0aCA+IDApIHtcclxuICAgICAgICAgICAgc2V0QWN0aXZlKHRhYnNbMF0uZGF0YXNldC50YXJnZXQpO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbn1cclxuXHJcbi8vdHJuLmluaXRpYWxpemUoKTtcclxuaWYgKCF3aW5kb3cudHJuX29ial9pbnN0YW5jZSkge1xyXG4gICAgd2luZG93LnRybl9vYmpfaW5zdGFuY2UgPSBuZXcgVG91cm5hbWF0Y2goKTtcclxuXHJcbiAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignbG9hZCcsIGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICAgICAgY29uc3QgdGFiVmlld3MgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tbmF2Jyk7XHJcblxyXG4gICAgICAgIEFycmF5LmZyb20odGFiVmlld3MpLmZvckVhY2goKHRhYikgPT4ge1xyXG4gICAgICAgICAgICB0cm4udGFicyh0YWIpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBjb25zdCBkcm9wZG93bnMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tZHJvcGRvd24tdG9nZ2xlJyk7XHJcbiAgICAgICAgY29uc3QgaGFuZGxlRHJvcGRvd25DbG9zZSA9ICgpID0+IHtcclxuICAgICAgICAgICAgQXJyYXkuZnJvbShkcm9wZG93bnMpLmZvckVhY2goKGRyb3Bkb3duKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBkcm9wZG93bi5uZXh0RWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LnJlbW92ZSgndHJuLXNob3cnKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIGRvY3VtZW50LnJlbW92ZUV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBoYW5kbGVEcm9wZG93bkNsb3NlLCBmYWxzZSk7XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgQXJyYXkuZnJvbShkcm9wZG93bnMpLmZvckVhY2goKGRyb3Bkb3duKSA9PiB7XHJcbiAgICAgICAgICAgIGRyb3Bkb3duLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xyXG4gICAgICAgICAgICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcclxuICAgICAgICAgICAgICAgIHRoaXMubmV4dEVsZW1lbnRTaWJsaW5nLmNsYXNzTGlzdC5hZGQoJ3Rybi1zaG93Jyk7XHJcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgaGFuZGxlRHJvcGRvd25DbG9zZSwgZmFsc2UpO1xyXG4gICAgICAgICAgICB9LCBmYWxzZSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgfSwgZmFsc2UpO1xyXG59XHJcbmV4cG9ydCBsZXQgdHJuID0gd2luZG93LnRybl9vYmpfaW5zdGFuY2U7XHJcblxyXG5jbGFzcyBUb3VybmFtYXRjaF9BdXRvY29tcGxldGUge1xyXG5cclxuICAgIC8vIGN1cnJlbnRGb2N1cztcclxuICAgIC8vXHJcbiAgICAvLyBuYW1lSW5wdXQ7XHJcbiAgICAvL1xyXG4gICAgLy8gc2VsZjtcclxuXHJcbiAgICBjb25zdHJ1Y3RvcihpbnB1dCwgZGF0YUNhbGxiYWNrKSB7XHJcbiAgICAgICAgLy8gdGhpcy5zZWxmID0gdGhpcztcclxuICAgICAgICB0aGlzLm5hbWVJbnB1dCA9IGlucHV0O1xyXG5cclxuICAgICAgICB0aGlzLm5hbWVJbnB1dC5hZGRFdmVudExpc3RlbmVyKFwiaW5wdXRcIiwgKCkgPT4ge1xyXG4gICAgICAgICAgICBsZXQgYSwgYiwgaSwgdmFsID0gdGhpcy5uYW1lSW5wdXQudmFsdWU7Ly90aGlzLnZhbHVlO1xyXG4gICAgICAgICAgICBsZXQgcGFyZW50ID0gdGhpcy5uYW1lSW5wdXQucGFyZW50Tm9kZTsvL3RoaXMucGFyZW50Tm9kZTtcclxuXHJcbiAgICAgICAgICAgIC8vIGxldCBwID0gbmV3IFByb21pc2UoKHJlc29sdmUsIHJlamVjdCkgPT4ge1xyXG4gICAgICAgICAgICAvLyAgICAgLyogbmVlZCB0byBxdWVyeSBzZXJ2ZXIgZm9yIG5hbWVzIGhlcmUuICovXHJcbiAgICAgICAgICAgIC8vICAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIub3BlbignR0VUJywgb3B0aW9ucy5hcGlfdXJsICsgJ3BsYXllcnMvP3NlYXJjaD0nICsgdmFsICsgJyZwZXJfcGFnZT01Jyk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQ29udGVudC1UeXBlJywgJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtV1AtTm9uY2UnLCBvcHRpb25zLnJlc3Rfbm9uY2UpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICBpZiAoeGhyLnN0YXR1cyA9PT0gMjAwKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIC8vIHJlc29sdmUoSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpLm1hcCgocGxheWVyKSA9PiB7cmV0dXJuIHsgJ3ZhbHVlJzogcGxheWVyLmlkLCAndGV4dCc6IHBsYXllci5uYW1lIH07fSkpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICByZXNvbHZlKEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tYXAoKHBsYXllcikgPT4ge3JldHVybiBwbGF5ZXIubmFtZTt9KSk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgcmVqZWN0KCk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgfVxyXG4gICAgICAgICAgICAvLyAgICAgfTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZW5kKCk7XHJcbiAgICAgICAgICAgIC8vIH0pO1xyXG4gICAgICAgICAgICBkYXRhQ2FsbGJhY2sodmFsKS50aGVuKChkYXRhKSA9PiB7Ly9wLnRoZW4oKGRhdGEpID0+IHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qY2xvc2UgYW55IGFscmVhZHkgb3BlbiBsaXN0cyBvZiBhdXRvLWNvbXBsZXRlZCB2YWx1ZXMqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKCk7XHJcbiAgICAgICAgICAgICAgICBpZiAoIXZhbCkgeyByZXR1cm4gZmFsc2U7fVxyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMgPSAtMTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmNyZWF0ZSBhIERJViBlbGVtZW50IHRoYXQgd2lsbCBjb250YWluIHRoZSBpdGVtcyAodmFsdWVzKToqL1xyXG4gICAgICAgICAgICAgICAgYSA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJESVZcIik7XHJcbiAgICAgICAgICAgICAgICBhLnNldEF0dHJpYnV0ZShcImlkXCIsIHRoaXMubmFtZUlucHV0LmlkICsgXCItYXV0by1jb21wbGV0ZS1saXN0XCIpO1xyXG4gICAgICAgICAgICAgICAgYS5zZXRBdHRyaWJ1dGUoXCJjbGFzc1wiLCBcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qYXBwZW5kIHRoZSBESVYgZWxlbWVudCBhcyBhIGNoaWxkIG9mIHRoZSBhdXRvLWNvbXBsZXRlIGNvbnRhaW5lcjoqL1xyXG4gICAgICAgICAgICAgICAgcGFyZW50LmFwcGVuZENoaWxkKGEpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qZm9yIGVhY2ggaXRlbSBpbiB0aGUgYXJyYXkuLi4qL1xyXG4gICAgICAgICAgICAgICAgZm9yIChpID0gMDsgaSA8IGRhdGEubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgICAgICAgICBsZXQgdGV4dCwgdmFsdWU7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8qIFdoaWNoIGZvcm1hdCBkaWQgdGhleSBnaXZlIHVzLiAqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh0eXBlb2YgZGF0YVtpXSA9PT0gJ29iamVjdCcpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dCA9IGRhdGFbaV1bJ3RleHQnXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldWyd2YWx1ZSddO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IGRhdGFbaV07XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKmNoZWNrIGlmIHRoZSBpdGVtIHN0YXJ0cyB3aXRoIHRoZSBzYW1lIGxldHRlcnMgYXMgdGhlIHRleHQgZmllbGQgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICBpZiAodGV4dC5zdWJzdHIoMCwgdmFsLmxlbmd0aCkudG9VcHBlckNhc2UoKSA9PT0gdmFsLnRvVXBwZXJDYXNlKCkpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLypjcmVhdGUgYSBESVYgZWxlbWVudCBmb3IgZWFjaCBtYXRjaGluZyBlbGVtZW50OiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKm1ha2UgdGhlIG1hdGNoaW5nIGxldHRlcnMgYm9sZDoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCA9IFwiPHN0cm9uZz5cIiArIHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpICsgXCI8L3N0cm9uZz5cIjtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gdGV4dC5zdWJzdHIodmFsLmxlbmd0aCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmluc2VydCBhIGlucHV0IGZpZWxkIHRoYXQgd2lsbCBob2xkIHRoZSBjdXJyZW50IGFycmF5IGl0ZW0ncyB2YWx1ZToqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCArPSBcIjxpbnB1dCB0eXBlPSdoaWRkZW4nIHZhbHVlPSdcIiArIHZhbHVlICsgXCInPlwiO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5kYXRhc2V0LnZhbHVlID0gdmFsdWU7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuZGF0YXNldC50ZXh0ID0gdGV4dDtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHdoZW4gc29tZW9uZSBjbGlja3Mgb24gdGhlIGl0ZW0gdmFsdWUgKERJViBlbGVtZW50KToqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coYGl0ZW0gY2xpY2tlZCB3aXRoIHZhbHVlICR7ZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudmFsdWV9YCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLyogaW5zZXJ0IHRoZSB2YWx1ZSBmb3IgdGhlIGF1dG9jb21wbGV0ZSB0ZXh0IGZpZWxkOiAqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQudmFsdWUgPSBlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC50ZXh0O1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQuZGF0YXNldC5zZWxlY3RlZElkID0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudmFsdWU7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLyogY2xvc2UgdGhlIGxpc3Qgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXMsIChvciBhbnkgb3RoZXIgb3BlbiBsaXN0cyBvZiBhdXRvY29tcGxldGVkIHZhbHVlczoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQuZGlzcGF0Y2hFdmVudChuZXcgRXZlbnQoJ2NoYW5nZScpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGEuYXBwZW5kQ2hpbGQoYik7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gcHJlc3NlcyBhIGtleSBvbiB0aGUga2V5Ym9hcmQ6Ki9cclxuICAgICAgICB0aGlzLm5hbWVJbnB1dC5hZGRFdmVudExpc3RlbmVyKFwia2V5ZG93blwiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICBsZXQgeCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRoaXMubmFtZUlucHV0LmlkICsgXCItYXV0by1jb21wbGV0ZS1saXN0XCIpO1xyXG4gICAgICAgICAgICBpZiAoeCkgeCA9IHguZ2V0RWxlbWVudHNCeVRhZ05hbWUoXCJkaXZcIik7XHJcbiAgICAgICAgICAgIGlmIChlLmtleUNvZGUgPT09IDQwKSB7XHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBhcnJvdyBET1dOIGtleSBpcyBwcmVzc2VkLFxyXG4gICAgICAgICAgICAgICAgIGluY3JlYXNlIHRoZSBjdXJyZW50Rm9jdXMgdmFyaWFibGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzKys7XHJcbiAgICAgICAgICAgICAgICAvKmFuZCBhbmQgbWFrZSB0aGUgY3VycmVudCBpdGVtIG1vcmUgdmlzaWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5hZGRBY3RpdmUoeCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09PSAzOCkgeyAvL3VwXHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBhcnJvdyBVUCBrZXkgaXMgcHJlc3NlZCxcclxuICAgICAgICAgICAgICAgICBkZWNyZWFzZSB0aGUgY3VycmVudEZvY3VzIHZhcmlhYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cy0tO1xyXG4gICAgICAgICAgICAgICAgLyphbmQgYW5kIG1ha2UgdGhlIGN1cnJlbnQgaXRlbSBtb3JlIHZpc2libGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuYWRkQWN0aXZlKHgpO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKGUua2V5Q29kZSA9PT0gMTMpIHtcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIEVOVEVSIGtleSBpcyBwcmVzc2VkLCBwcmV2ZW50IHRoZSBmb3JtIGZyb20gYmVpbmcgc3VibWl0dGVkLCovXHJcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPiAtMSkge1xyXG4gICAgICAgICAgICAgICAgICAgIC8qYW5kIHNpbXVsYXRlIGEgY2xpY2sgb24gdGhlIFwiYWN0aXZlXCIgaXRlbToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh4KSB4W3RoaXMuY3VycmVudEZvY3VzXS5jbGljaygpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHdoZW4gc29tZW9uZSBjbGlja3MgaW4gdGhlIGRvY3VtZW50OiovXHJcbiAgICAgICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cyhlLnRhcmdldCk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgYWRkQWN0aXZlKHgpIHtcclxuICAgICAgICAvKmEgZnVuY3Rpb24gdG8gY2xhc3NpZnkgYW4gaXRlbSBhcyBcImFjdGl2ZVwiOiovXHJcbiAgICAgICAgaWYgKCF4KSByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgLypzdGFydCBieSByZW1vdmluZyB0aGUgXCJhY3RpdmVcIiBjbGFzcyBvbiBhbGwgaXRlbXM6Ki9cclxuICAgICAgICB0aGlzLnJlbW92ZUFjdGl2ZSh4KTtcclxuICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPj0geC5sZW5ndGgpIHRoaXMuY3VycmVudEZvY3VzID0gMDtcclxuICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPCAwKSB0aGlzLmN1cnJlbnRGb2N1cyA9ICh4Lmxlbmd0aCAtIDEpO1xyXG4gICAgICAgIC8qYWRkIGNsYXNzIFwiYXV0b2NvbXBsZXRlLWFjdGl2ZVwiOiovXHJcbiAgICAgICAgeFt0aGlzLmN1cnJlbnRGb2N1c10uY2xhc3NMaXN0LmFkZChcInRybi1hdXRvLWNvbXBsZXRlLWFjdGl2ZVwiKTtcclxuICAgIH1cclxuXHJcbiAgICByZW1vdmVBY3RpdmUoeCkge1xyXG4gICAgICAgIC8qYSBmdW5jdGlvbiB0byByZW1vdmUgdGhlIFwiYWN0aXZlXCIgY2xhc3MgZnJvbSBhbGwgYXV0b2NvbXBsZXRlIGl0ZW1zOiovXHJcbiAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCB4Lmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgIHhbaV0uY2xhc3NMaXN0LnJlbW92ZShcInRybi1hdXRvLWNvbXBsZXRlLWFjdGl2ZVwiKTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG4gICAgY2xvc2VBbGxMaXN0cyhlbGVtZW50KSB7XHJcbiAgICAgICAgY29uc29sZS5sb2coXCJjbG9zZSBhbGwgbGlzdHNcIik7XHJcbiAgICAgICAgLypjbG9zZSBhbGwgYXV0b2NvbXBsZXRlIGxpc3RzIGluIHRoZSBkb2N1bWVudCxcclxuICAgICAgICAgZXhjZXB0IHRoZSBvbmUgcGFzc2VkIGFzIGFuIGFyZ3VtZW50OiovXHJcbiAgICAgICAgbGV0IHggPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKFwidHJuLWF1dG8tY29tcGxldGUtaXRlbXNcIik7XHJcbiAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCB4Lmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgIGlmIChlbGVtZW50ICE9PSB4W2ldICYmIGVsZW1lbnQgIT09IHRoaXMubmFtZUlucHV0KSB7XHJcbiAgICAgICAgICAgICAgICB4W2ldLnBhcmVudE5vZGUucmVtb3ZlQ2hpbGQoeFtpXSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9XHJcbn1cclxuXHJcbi8vIEZpcnN0LCBjaGVja3MgaWYgaXQgaXNuJ3QgaW1wbGVtZW50ZWQgeWV0LlxyXG5pZiAoIVN0cmluZy5wcm90b3R5cGUuZm9ybWF0KSB7XHJcbiAgICBTdHJpbmcucHJvdG90eXBlLmZvcm1hdCA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIGNvbnN0IGFyZ3MgPSBhcmd1bWVudHM7XHJcbiAgICAgICAgcmV0dXJuIHRoaXMucmVwbGFjZSgveyhcXGQrKX0vZywgZnVuY3Rpb24obWF0Y2gsIG51bWJlcikge1xyXG4gICAgICAgICAgICByZXR1cm4gdHlwZW9mIGFyZ3NbbnVtYmVyXSAhPT0gJ3VuZGVmaW5lZCdcclxuICAgICAgICAgICAgICAgID8gYXJnc1tudW1iZXJdXHJcbiAgICAgICAgICAgICAgICA6IG1hdGNoXHJcbiAgICAgICAgICAgICAgICA7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9O1xyXG59IiwiLy8gVGhlIG1vZHVsZSBjYWNoZVxudmFyIF9fd2VicGFja19tb2R1bGVfY2FjaGVfXyA9IHt9O1xuXG4vLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcblx0dmFyIGNhY2hlZE1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF07XG5cdGlmIChjYWNoZWRNb2R1bGUgIT09IHVuZGVmaW5lZCkge1xuXHRcdHJldHVybiBjYWNoZWRNb2R1bGUuZXhwb3J0cztcblx0fVxuXHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuXHR2YXIgbW9kdWxlID0gX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fW21vZHVsZUlkXSA9IHtcblx0XHQvLyBubyBtb2R1bGUuaWQgbmVlZGVkXG5cdFx0Ly8gbm8gbW9kdWxlLmxvYWRlZCBuZWVkZWRcblx0XHRleHBvcnRzOiB7fVxuXHR9O1xuXG5cdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuXHRfX3dlYnBhY2tfbW9kdWxlc19fW21vZHVsZUlkXShtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuXHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuXHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG59XG5cbiIsIi8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb25zIGZvciBoYXJtb255IGV4cG9ydHNcbl9fd2VicGFja19yZXF1aXJlX18uZCA9IChleHBvcnRzLCBkZWZpbml0aW9uKSA9PiB7XG5cdGZvcih2YXIga2V5IGluIGRlZmluaXRpb24pIHtcblx0XHRpZihfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZGVmaW5pdGlvbiwga2V5KSAmJiAhX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIGtleSkpIHtcblx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBrZXksIHsgZW51bWVyYWJsZTogdHJ1ZSwgZ2V0OiBkZWZpbml0aW9uW2tleV0gfSk7XG5cdFx0fVxuXHR9XG59OyIsIl9fd2VicGFja19yZXF1aXJlX18ubyA9IChvYmosIHByb3ApID0+IChPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqLCBwcm9wKSkiLCIvLyBkZWZpbmUgX19lc01vZHVsZSBvbiBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLnIgPSAoZXhwb3J0cykgPT4ge1xuXHRpZih0eXBlb2YgU3ltYm9sICE9PSAndW5kZWZpbmVkJyAmJiBTeW1ib2wudG9TdHJpbmdUYWcpIHtcblx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgU3ltYm9sLnRvU3RyaW5nVGFnLCB7IHZhbHVlOiAnTW9kdWxlJyB9KTtcblx0fVxuXHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgJ19fZXNNb2R1bGUnLCB7IHZhbHVlOiB0cnVlIH0pO1xufTsiLCIvKipcclxuICogVGVhbSBwcm9maWxlIHBhZ2UuXHJcbiAqXHJcbiAqIEBsaW5rICAgICAgIGh0dHBzOi8vd3d3LnRvdXJuYW1hdGNoLmNvbVxyXG4gKiBAc2luY2UgICAgICAzLjguMFxyXG4gKlxyXG4gKiBAcGFja2FnZSAgICBUb3VybmFtYXRjaFxyXG4gKlxyXG4gKi9cclxuaW1wb3J0IHsgdHJuIH0gZnJvbSAnLi90b3VybmFtYXRjaC5qcyc7XHJcbmltcG9ydCB7IGVzY2FwZUhUTUwgfSBmcm9tICdAd29yZHByZXNzL2VzY2FwZS1odG1sJztcclxuXHJcbihmdW5jdGlvbiAoJCkge1xyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICAgIC8vIGFkZCBsaXN0ZW5lciBmb3Igcm9zdGVyIGNoYW5nZWQgZXZlbnRcclxuICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGxldCBvcHRpb25zID0gdHJuX3RlYW1fcHJvZmlsZV9vcHRpb25zO1xyXG4gICAgICAgIGNvbnN0IGpvaW5UZWFtQnV0dG9uID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1qb2luLXRlYW0tYnV0dG9uJyk7XHJcbiAgICAgICAgY29uc3QgbGVhdmVUZWFtQnV0dG9uID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1sZWF2ZS10ZWFtLWJ1dHRvbicpO1xyXG4gICAgICAgIGNvbnN0IGRlbGV0ZVRlYW1CdXR0b24gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLWRlbGV0ZS10ZWFtLWJ1dHRvbicpO1xyXG4gICAgICAgIGNvbnN0IGVkaXRUZWFtQnV0dG9uID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1lZGl0LXRlYW0tYnV0dG9uJyk7XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIGNhbkpvaW4odXNlcklkLCBtZW1iZXJzKSB7XHJcbiAgICAgICAgICAgIGxldCBpc01lbWJlciA9IGZhbHNlO1xyXG4gICAgICAgICAgICBpZiAoKG1lbWJlcnMgIT09IG51bGwpICYmIChtZW1iZXJzLmxlbmd0aCA+IDApKSB7XHJcbiAgICAgICAgICAgICAgICBtZW1iZXJzLmZvckVhY2goKG1lbWJlcikgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgIGlzTWVtYmVyID0gaXNNZW1iZXIgfHwgKG1lbWJlci51c2VyX2lkID09PSB1c2VySWQpO1xyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgcmV0dXJuICFpc01lbWJlcjtcclxuICAgICAgICB9XHJcblxyXG5cclxuICAgICAgICBmdW5jdGlvbiBjYW5MZWF2ZSh1c2VySWQsIG1lbWJlcnMpIHtcclxuICAgICAgICAgICAgbGV0IGlzTWVtYmVyID0gZmFsc2U7XHJcbiAgICAgICAgICAgIGxldCBpc093bmVyID0gZmFsc2U7XHJcbiAgICAgICAgICAgIGlmICgobWVtYmVycyAhPT0gbnVsbCkgJiYgKG1lbWJlcnMubGVuZ3RoID4gMCkpIHtcclxuICAgICAgICAgICAgICAgIG1lbWJlcnMuZm9yRWFjaCgobWVtYmVyKSA9PiB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKG1lbWJlci51c2VyX2lkID09PSB1c2VySWQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaXNNZW1iZXIgPSB0cnVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAobWVtYmVyLnRlYW1fcmFua19pZCA9PT0gMSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaXNPd25lciA9IHRydWU7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICByZXR1cm4gaXNNZW1iZXIgJiYgIWlzT3duZXI7XHJcbiAgICAgICAgfVxyXG5cclxuXHJcbiAgICAgICAgZnVuY3Rpb24gY2FuRGVsZXRlKHVzZXJJZCwgbWVtYmVycykge1xyXG4gICAgICAgICAgICBsZXQgaXNNZW1iZXIgPSBmYWxzZTtcclxuICAgICAgICAgICAgaWYgKChtZW1iZXJzICE9PSBudWxsKSAmJiAobWVtYmVycy5sZW5ndGggPiAwKSkge1xyXG4gICAgICAgICAgICAgICAgbWVtYmVycy5mb3JFYWNoKChtZW1iZXIpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICBpc01lbWJlciA9IChtZW1iZXIudXNlcl9pZCA9PT0gdXNlcklkKSB8fCBpc01lbWJlcjtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIHJldHVybiBpc01lbWJlciAmJiAobWVtYmVycy5sZW5ndGggPT09IDEpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgZnVuY3Rpb24gY2FuRWRpdCh1c2VySWQsIG1lbWJlcnMpIHtcclxuICAgICAgICAgICAgbGV0IGlzT3duZXIgPSBmYWxzZTtcclxuICAgICAgICAgICAgaWYgKChtZW1iZXJzICE9PSBudWxsKSAmJiAobWVtYmVycy5sZW5ndGggPiAwKSkge1xyXG4gICAgICAgICAgICAgICAgbWVtYmVycy5mb3JFYWNoKChtZW1iZXIpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICBpc093bmVyID0gKChtZW1iZXIudXNlcl9pZCA9PT0gdXNlcklkKSAmJiAobWVtYmVyLnRlYW1fcmFua19pZCA9PT0gMSkpIHx8IGlzT3duZXI7XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICByZXR1cm4gaXNPd25lcjtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIGdldEN1cnJlbnRVc2VyVGVhbU1lbWJlcklkKHVzZXJJZCwgbWVtYmVycykge1xyXG4gICAgICAgICAgICBsZXQgdGVhbU1lbWJlcklkID0gbnVsbDtcclxuICAgICAgICAgICAgaWYgKChtZW1iZXJzICE9PSBudWxsKSAmJiAobWVtYmVycy5sZW5ndGggPiAwKSkge1xyXG4gICAgICAgICAgICAgICAgbWVtYmVycy5mb3JFYWNoKChtZW1iZXIpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAobWVtYmVyLnVzZXJfaWQgPT09IHVzZXJJZCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZWFtTWVtYmVySWQgPSBtZW1iZXIudGVhbV9tZW1iZXJfaWQ7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgcmV0dXJuIHRlYW1NZW1iZXJJZDtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIGV2YWx1YXRlQnV0dG9uU3RhdGVzKG1lbWJlcnMpIHtcclxuICAgICAgICAgICAgY29uc3QgdXNlcklkID0gcGFyc2VJbnQob3B0aW9ucy5jdXJyZW50X3VzZXJfaWQpO1xyXG5cclxuICAgICAgICAgICAgaWYgKGNhbkRlbGV0ZSh1c2VySWQsIG1lbWJlcnMpKSB7XHJcbiAgICAgICAgICAgICAgICBkZWxldGVUZWFtQnV0dG9uLnN0eWxlLmRpc3BsYXkgPSAnaW5saW5lLWJsb2NrJztcclxuICAgICAgICAgICAgICAgIGRlbGV0ZVRlYW1CdXR0b24uZGF0YXNldC50ZWFtTWVtYmVySWQgPSBnZXRDdXJyZW50VXNlclRlYW1NZW1iZXJJZCh1c2VySWQsIG1lbWJlcnMpO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgZGVsZXRlVGVhbUJ1dHRvbi5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBpZiAoY2FuSm9pbih1c2VySWQsIG1lbWJlcnMpKSB7XHJcbiAgICAgICAgICAgICAgICBqb2luVGVhbUJ1dHRvbi5zdHlsZS5kaXNwbGF5ID0gJ2lubGluZS1ibG9jayc7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICBqb2luVGVhbUJ1dHRvbi5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBpZiAoY2FuTGVhdmUodXNlcklkLCBtZW1iZXJzKSkge1xyXG4gICAgICAgICAgICAgICAgbGVhdmVUZWFtQnV0dG9uLnN0eWxlLmRpc3BsYXkgPSAnaW5saW5lLWJsb2NrJztcclxuICAgICAgICAgICAgICAgIGxlYXZlVGVhbUJ1dHRvbi5kYXRhc2V0LnRlYW1NZW1iZXJJZCA9IGdldEN1cnJlbnRVc2VyVGVhbU1lbWJlcklkKHVzZXJJZCwgbWVtYmVycyk7XHJcbiAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICBsZWF2ZVRlYW1CdXR0b24uc3R5bGUuZGlzcGxheSA9ICdub25lJztcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgaWYgKG9wdGlvbnMuY2FuX2VkaXQgfHwgY2FuRWRpdCh1c2VySWQsIG1lbWJlcnMpKSB7XHJcbiAgICAgICAgICAgICAgICBlZGl0VGVhbUJ1dHRvbi5zdHlsZS5kaXNwbGF5ID0gJ2lubGluZS1ibG9jayc7XHJcbiAgICAgICAgICAgIH0gZWxzZXtcclxuICAgICAgICAgICAgICAgIGVkaXRUZWFtQnV0dG9uLnN0eWxlLmRpc3BsYXkgPSAnbm9uZSc7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIGdldE1lbWJlcnMoKSB7XHJcbiAgICAgICAgICAgIGxldCB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgeGhyLm9wZW4oJ0dFVCcsIG9wdGlvbnMuYXBpX3VybCArICd0ZWFtLW1lbWJlcnMvP19lbWJlZCYnICsgJC5wYXJhbSh7dGVhbV9pZDogb3B0aW9ucy50ZWFtX2lkfSkpO1xyXG4gICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQ29udGVudC1UeXBlJywgJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcpO1xyXG4gICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1XUC1Ob25jZScsIG9wdGlvbnMucmVzdF9ub25jZSk7XHJcbiAgICAgICAgICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgY29udGVudCA9ICcnO1xyXG4gICAgICAgICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCByZXNwb25zZSA9IEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKTtcclxuICAgICAgICAgICAgICAgICAgICAvLyBsZXQgbWVtYmVyTGlua3MgPSBbXTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gaWYgKHJlc3BvbnNlICE9PSBudWxsICYmIHJlc3BvbnNlLmxlbmd0aCA+IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAvLyAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChyZXNwb25zZSwgZnVuY3Rpb24gKG1lbWJlcikge1xyXG4gICAgICAgICAgICAgICAgICAgIC8vICAgICAgICAgbWVtYmVyTGlua3MucHVzaChgPGEgaHJlZj1cIi4uL3BsYXllcnMvJHttZW1iZXIudXNlcl9pZH1cIj4ke21lbWJlci5fZW1iZWRkZWQucGxheWVyWzBdLm5hbWV9PC9hPmApO1xyXG4gICAgICAgICAgICAgICAgICAgIC8vICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAvL1xyXG4gICAgICAgICAgICAgICAgICAgIC8vICAgICBjb250ZW50ICs9IG1lbWJlckxpbmtzLmpvaW4oJywgJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAvLyAgICAgY29udGVudCArPSBgPHAgY2xhc3M9XCJ0cm4tdGV4dC1jZW50ZXJcIj4ke29wdGlvbnMubGFuZ3VhZ2UuemVyb19tZW1iZXJzfTwvcD5gO1xyXG4gICAgICAgICAgICAgICAgICAgIC8vIH1cclxuICAgICAgICAgICAgICAgICAgICBpZiAob3B0aW9ucy5pc19sb2dnZWRfaW4pIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgZXZhbHVhdGVCdXR0b25TdGF0ZXMocmVzcG9uc2UpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPHAgY2xhc3M9XCJ0ZXh0LWNlbnRlclwiPiR7b3B0aW9ucy5sYW5ndWFnZS5lcnJvcl9tZW1iZXJzfTwvcD5gO1xyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIGNvbnN0IG1lbWJlckxpc3QgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLXRlYW0tbWVtYmVycy1saXN0Jyk7XHJcbiAgICAgICAgICAgICAgICBpZiAobWVtYmVyTGlzdCkge1xyXG4gICAgICAgICAgICAgICAgICAgIG1lbWJlckxpc3QuaW5uZXJIVE1MID0gY29udGVudDtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfTtcclxuXHJcbiAgICAgICAgICAgIHhoci5zZW5kKCk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIGdldE1lbWJlcnMoKTtcclxuXHJcbiAgICAgICAgJC5ldmVudCgndGVhbS1tZW1iZXJzJykuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlZCcsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICBnZXRNZW1iZXJzKCk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIGpvaW5UZWFtKCkge1xyXG4gICAgICAgICAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgIHhoci5vcGVuKCdQT1NUJywgb3B0aW9ucy5hcGlfdXJsICsgJ3RlYW0tcmVxdWVzdHMnKTtcclxuICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtV1AtTm9uY2UnLCBvcHRpb25zLnJlc3Rfbm9uY2UpO1xyXG4gICAgICAgICAgICB4aHIub25sb2FkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgbGV0IHJlc3BvbnNlID0gSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMSkge1xyXG4gICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tam9pbi10ZWFtLXJlc3BvbnNlJykuaW5uZXJIVE1MID0gYDxkaXYgY2xhc3M9XCJ0cm4tYWxlcnQgdHJuLWFsZXJ0LXN1Y2Nlc3NcIj48c3Ryb25nPiR7b3B0aW9ucy5sYW5ndWFnZS5zdWNjZXNzfSE8L3N0cm9uZz4gJHtvcHRpb25zLmxhbmd1YWdlLnN1Y2Nlc3NfbWVzc2FnZX08L2Rpdj5gO1xyXG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLWpvaW4tdGVhbS1yZXNwb25zZScpLmlubmVySFRNTCA9IGA8ZGl2IGNsYXNzPVwidHJuLWFsZXJ0IHRybi1hbGVydC1kYW5nZXJcIj48c3Ryb25nPiR7b3B0aW9ucy5sYW5ndWFnZS5mYWlsdXJlfTo8L3N0cm9uZz4gJHtlc2NhcGVIVE1MKHJlc3BvbnNlLm1lc3NhZ2UpfTwvZGl2PmA7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgICAgICB4aHIuc2VuZCgkLnBhcmFtKHtcclxuICAgICAgICAgICAgICAgIHRlYW1faWQ6IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tam9pbi10ZWFtLWJ1dHRvbicpLmRhdGFzZXQudGVhbUlkLFxyXG4gICAgICAgICAgICAgICAgdXNlcl9pZDogZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1qb2luLXRlYW0tYnV0dG9uJykuZGF0YXNldC51c2VySWQsXHJcbiAgICAgICAgICAgIH0pKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIGhhbmRsZUpvaW5UZWFtKGV2ZW50KSB7XHJcbiAgICAgICAgICAgIGpvaW5UZWFtKCk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBmdW5jdGlvbiBsZWF2ZVRlYW0oKSB7XHJcbiAgICAgICAgICAgIGxldCB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgeGhyLm9wZW4oJ0RFTEVURScsIG9wdGlvbnMuYXBpX3VybCArICd0ZWFtLW1lbWJlcnMvJyArIGxlYXZlVGVhbUJ1dHRvbi5kYXRhc2V0LnRlYW1NZW1iZXJJZCk7XHJcbiAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdDb250ZW50LVR5cGUnLCAnYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkJyk7XHJcbiAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDQpIHtcclxuICAgICAgICAgICAgICAgICAgICAkLmV2ZW50KCd0ZWFtLW1lbWJlcnMnKS5kaXNwYXRjaEV2ZW50KG5ldyBDdXN0b21FdmVudCgnY2hhbmdlZCcsIHsgZGV0YWlsOiB7IHRlYW1fbWVtYmVyX2lkOiBsZWF2ZVRlYW1CdXR0b24uZGF0YXNldC50ZWFtTWVtYmVySWQgfSB9ICkpO1xyXG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICBsZXQgcmVzcG9uc2UgPSBKU09OLnBhcnNlKHhoci5yZXNwb25zZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1sZWF2ZS10ZWFtLXJlc3BvbnNlJykuaW5uZXJIVE1MID0gYDxkaXYgY2xhc3M9XCJ0cm4tYWxlcnQgdHJuLWFsZXJ0LWRhbmdlclwiPjxzdHJvbmc+JHtvcHRpb25zLmxhbmd1YWdlLmZhaWx1cmV9Ojwvc3Ryb25nPiAke2VzY2FwZUhUTUwocmVzcG9uc2UubWVzc2FnZSl9PC9kaXY+YDtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfTtcclxuXHJcbiAgICAgICAgICAgIHhoci5zZW5kKCk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBmdW5jdGlvbiBkZWxldGVUZWFtKCkge1xyXG4gICAgICAgICAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgIHhoci5vcGVuKCdERUxFVEUnLCBvcHRpb25zLmFwaV91cmwgKyAndGVhbS1tZW1iZXJzLycgKyBkZWxldGVUZWFtQnV0dG9uLmRhdGFzZXQudGVhbU1lbWJlcklkKTtcclxuICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtV1AtTm9uY2UnLCBvcHRpb25zLnJlc3Rfbm9uY2UpO1xyXG4gICAgICAgICAgICB4aHIub25sb2FkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwNCkge1xyXG4gICAgICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gb3B0aW9ucy50ZWFtc191cmw7XHJcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCByZXNwb25zZSA9IEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKTtcclxuICAgICAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLWxlYXZlLXRlYW0tcmVzcG9uc2UnKS5pbm5lckhUTUwgPSBgPGRpdiBjbGFzcz1cInRybi1hbGVydCB0cm4tYWxlcnQtZGFuZ2VyXCI+PHN0cm9uZz4ke29wdGlvbnMubGFuZ3VhZ2UuZmFpbHVyZX06PC9zdHJvbmc+ICR7ZXNjYXBlSFRNTChyZXNwb25zZS5tZXNzYWdlKX08L2Rpdj5gO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgeGhyLnNlbmQoKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGlmIChvcHRpb25zLmlzX2xvZ2dlZF9pbikge1xyXG4gICAgICAgICAgICBqb2luVGVhbUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGhhbmRsZUpvaW5UZWFtLCBmYWxzZSk7XHJcbiAgICAgICAgICAgIGxlYXZlVGVhbUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGxlYXZlVGVhbSk7XHJcbiAgICAgICAgICAgIGRlbGV0ZVRlYW1CdXR0b24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBkZWxldGVUZWFtKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIC8qdGhlIGF1dG9jb21wbGV0ZSBmdW5jdGlvbiB0YWtlcyB0d28gYXJndW1lbnRzLFxyXG4gICAgICAgICB0aGUgdGV4dCBmaWVsZCBlbGVtZW50IGFuZCBhbiBhcnJheSBvZiBwb3NzaWJsZSBhdXRvY29tcGxldGVkIHZhbHVlczoqL1xyXG4gICAgICAgIGNvbnN0IGFkZEZvcm0gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLWFkZC1wbGF5ZXItZm9ybScpO1xyXG4gICAgICAgIGNvbnN0IG5hbWVJbnB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tYWRkLXBsYXllci1pbnB1dCcpO1xyXG5cclxuICAgICAgICBsZXQgY3VycmVudEZvY3VzO1xyXG5cclxuICAgICAgICBpZiAob3B0aW9ucy5jYW5fYWRkID09PSAnMScpIHtcclxuICAgICAgICAgICAgYWRkRm9ybS5hZGRFdmVudExpc3RlbmVyKCdzdWJtaXQnLCBmdW5jdGlvbihldmVudCkge1xyXG4gICAgICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnc3VibWl0dGVkJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgbGV0IHAgPSBuZXcgUHJvbWlzZSgocmVzb2x2ZSwgcmVqZWN0KSA9PiB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAgICAgICAgIHhoci5vcGVuKCdHRVQnLCBvcHRpb25zLmFwaV91cmwgKyAncGxheWVycy8/bmFtZT0nICsgbmFtZUlucHV0LnZhbHVlKTtcclxuICAgICAgICAgICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQ29udGVudC1UeXBlJywgJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcpO1xyXG4gICAgICAgICAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgICAgICAgICB4aHIub25sb2FkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhKU09OLnBhcnNlKHhoci5yZXNwb25zZSlbMF1bJ3VzZXJfaWQnXSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJlc29sdmUoSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpWzBdWyd1c2VyX2lkJ10pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVqZWN0KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9O1xyXG4gICAgICAgICAgICAgICAgICAgIHhoci5zZW5kKCk7XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgIHAudGhlbigodXNlcl9pZCkgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgICAgICAgICB4aHIub3BlbignUE9TVCcsIG9wdGlvbnMuYXBpX3VybCArICd0ZWFtLW1lbWJlcnMvJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1XUC1Ob25jZScsIG9wdGlvbnMucmVzdF9ub25jZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coeGhyKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJC5ldmVudCgndGVhbS1tZW1iZXJzJykuZGlzcGF0Y2hFdmVudChuZXcgQ3VzdG9tRXZlbnQoJ2NoYW5nZWQnLCB7IH0gKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zdCBtZXNzYWdlID0gKCB4aHIuc3RhdHVzID09PSA0MDMgKSA/IEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tZXNzYWdlIDogb3B0aW9ucy5sYW5ndWFnZS5mYWlsdXJlX21lc3NhZ2U7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLWFkZC1wbGF5ZXItcmVzcG9uc2UnKS5pbm5lckhUTUwgPSBgPGRpdiBjbGFzcz1cInRybi1hbGVydCB0cm4tYWxlcnQtZGFuZ2VyXCI+PHN0cm9uZz4ke29wdGlvbnMubGFuZ3VhZ2UuZmFpbHVyZX06PC9zdHJvbmc+ICR7bWVzc2FnZX08L2Rpdj5gO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfTtcclxuICAgICAgICAgICAgICAgICAgICB4aHIuc2VuZCgkLnBhcmFtKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGVhbV9pZDogb3B0aW9ucy50ZWFtX2lkLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB1c2VyX2lkOiB1c2VyX2lkLFxyXG4gICAgICAgICAgICAgICAgICAgIH0pKTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgfSwgZmFsc2UpO1xyXG5cclxuICAgICAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gd2hlbiBzb21lb25lIHdyaXRlcyBpbiB0aGUgdGV4dCBmaWVsZDoqL1xyXG4gICAgICAgICAgICBuYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImlucHV0XCIsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgIGxldCBhLCBiLCBpLCB2YWwgPSB0aGlzLnZhbHVlO1xyXG4gICAgICAgICAgICAgICAgbGV0IHBhcmVudCA9IHRoaXMucGFyZW50Tm9kZTtcclxuXHJcbiAgICAgICAgICAgICAgICBsZXQgcCA9IG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAvKiBuZWVkIHRvIHF1ZXJ5IHNlcnZlciBmb3IgbmFtZXMgaGVyZS4gKi9cclxuICAgICAgICAgICAgICAgICAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgeGhyLm9wZW4oJ0dFVCcsIG9wdGlvbnMuYXBpX3VybCArICdwbGF5ZXJzLz9zZWFyY2g9JyArIHZhbCArICcmcGVyX3BhZ2U9NScpO1xyXG4gICAgICAgICAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdDb250ZW50LVR5cGUnLCAnYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtV1AtTm9uY2UnLCBvcHRpb25zLnJlc3Rfbm9uY2UpO1xyXG4gICAgICAgICAgICAgICAgICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIHJlc29sdmUoSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpLm1hcCgocGxheWVyKSA9PiB7cmV0dXJuIHsgJ3ZhbHVlJzogcGxheWVyLmlkLCAndGV4dCc6IHBsYXllci5uYW1lIH07fSkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4gZXNjYXBlSFRNTChwbGF5ZXIubmFtZSk7fSkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVqZWN0KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9O1xyXG4gICAgICAgICAgICAgICAgICAgIHhoci5zZW5kKCk7XHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgIHAudGhlbigoZGF0YSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKmNsb3NlIGFueSBhbHJlYWR5IG9wZW4gbGlzdHMgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXMqL1xyXG4gICAgICAgICAgICAgICAgICAgIGNsb3NlQWxsTGlzdHMoKTtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoIXZhbCkgeyByZXR1cm4gZmFsc2U7fVxyXG4gICAgICAgICAgICAgICAgICAgIGN1cnJlbnRGb2N1cyA9IC0xO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKmNyZWF0ZSBhIERJViBlbGVtZW50IHRoYXQgd2lsbCBjb250YWluIHRoZSBpdGVtcyAodmFsdWVzKToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGEgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiaWRcIiwgdGhpcy5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgICAgICAgICBhLnNldEF0dHJpYnV0ZShcImNsYXNzXCIsIFwidHJuLWF1dG8tY29tcGxldGUtaXRlbXNcIik7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8qYXBwZW5kIHRoZSBESVYgZWxlbWVudCBhcyBhIGNoaWxkIG9mIHRoZSBhdXRvY29tcGxldGUgY29udGFpbmVyOiovXHJcbiAgICAgICAgICAgICAgICAgICAgcGFyZW50LmFwcGVuZENoaWxkKGEpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKmZvciBlYWNoIGl0ZW0gaW4gdGhlIGFycmF5Li4uKi9cclxuICAgICAgICAgICAgICAgICAgICBmb3IgKGkgPSAwOyBpIDwgZGF0YS5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBsZXQgdGV4dCwgdmFsdWU7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKiBXaGljaCBmb3JtYXQgZGlkIHRoZXkgZ2l2ZSB1cy4gKi9cclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHR5cGVvZiBkYXRhW2ldID09PSAnb2JqZWN0Jykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGV4dCA9IGRhdGFbaV1bJ3RleHQnXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXVsndmFsdWUnXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmNoZWNrIGlmIHRoZSBpdGVtIHN0YXJ0cyB3aXRoIHRoZSBzYW1lIGxldHRlcnMgYXMgdGhlIHRleHQgZmllbGQgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpLnRvVXBwZXJDYXNlKCkgPT09IHZhbC50b1VwcGVyQ2FzZSgpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvKmNyZWF0ZSBhIERJViBlbGVtZW50IGZvciBlYWNoIG1hdGNoaW5nIGVsZW1lbnQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGIgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLyptYWtlIHRoZSBtYXRjaGluZyBsZXR0ZXJzIGJvbGQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MID0gXCI8c3Ryb25nPlwiICsgdGV4dC5zdWJzdHIoMCwgdmFsLmxlbmd0aCkgKyBcIjwvc3Ryb25nPlwiO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gdGV4dC5zdWJzdHIodmFsLmxlbmd0aCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLyppbnNlcnQgYSBpbnB1dCBmaWVsZCB0aGF0IHdpbGwgaG9sZCB0aGUgY3VycmVudCBhcnJheSBpdGVtJ3MgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IFwiPGlucHV0IHR5cGU9J2hpZGRlbicgdmFsdWU9J1wiICsgdmFsdWUgKyBcIic+XCI7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYi5kYXRhc2V0LnZhbHVlID0gdmFsdWU7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudGV4dCA9IHRleHQ7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gd2hlbiBzb21lb25lIGNsaWNrcyBvbiB0aGUgaXRlbSB2YWx1ZSAoRElWIGVsZW1lbnQpOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBiLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbiAoZSkge1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvKiBpbnNlcnQgdGhlIHZhbHVlIGZvciB0aGUgYXV0b2NvbXBsZXRlIHRleHQgZmllbGQ6ICovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbmFtZUlucHV0LnZhbHVlID0gdGhpcy5kYXRhc2V0LnRleHQ7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbmFtZUlucHV0LmRhdGFzZXQuc2VsZWN0ZWRJZCA9IHRoaXMuZGF0YXNldC52YWx1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLyogY2xvc2UgdGhlIGxpc3Qgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXMsIChvciBhbnkgb3RoZXIgb3BlbiBsaXN0cyBvZiBhdXRvY29tcGxldGVkIHZhbHVlczoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNsb3NlQWxsTGlzdHMoKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYS5hcHBlbmRDaGlsZChiKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHByZXNzZXMgYSBrZXkgb24gdGhlIGtleWJvYXJkOiovXHJcbiAgICAgICAgICAgIG5hbWVJbnB1dC5hZGRFdmVudExpc3RlbmVyKFwia2V5ZG93blwiLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgeCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRoaXMuaWQgKyBcIi1hdXRvLWNvbXBsZXRlLWxpc3RcIik7XHJcbiAgICAgICAgICAgICAgICBpZiAoeCkgeCA9IHguZ2V0RWxlbWVudHNCeVRhZ05hbWUoXCJkaXZcIik7XHJcbiAgICAgICAgICAgICAgICBpZiAoZS5rZXlDb2RlID09PSA0MCkge1xyXG4gICAgICAgICAgICAgICAgICAgIC8qSWYgdGhlIGFycm93IERPV04ga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgICAgIGluY3JlYXNlIHRoZSBjdXJyZW50Rm9jdXMgdmFyaWFibGU6Ki9cclxuICAgICAgICAgICAgICAgICAgICBjdXJyZW50Rm9jdXMrKztcclxuICAgICAgICAgICAgICAgICAgICAvKmFuZCBhbmQgbWFrZSB0aGUgY3VycmVudCBpdGVtIG1vcmUgdmlzaWJsZToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09PSAzOCkgeyAvL3VwXHJcbiAgICAgICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgVVAga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgICAgIGRlY3JlYXNlIHRoZSBjdXJyZW50Rm9jdXMgdmFyaWFibGU6Ki9cclxuICAgICAgICAgICAgICAgICAgICBjdXJyZW50Rm9jdXMtLTtcclxuICAgICAgICAgICAgICAgICAgICAvKmFuZCBhbmQgbWFrZSB0aGUgY3VycmVudCBpdGVtIG1vcmUgdmlzaWJsZToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09PSAxMykge1xyXG4gICAgICAgICAgICAgICAgICAgIC8qSWYgdGhlIEVOVEVSIGtleSBpcyBwcmVzc2VkLCBwcmV2ZW50IHRoZSBmb3JtIGZyb20gYmVpbmcgc3VibWl0dGVkLCovXHJcbiAgICAgICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgICAgIGlmIChjdXJyZW50Rm9jdXMgPiAtMSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmFuZCBzaW11bGF0ZSBhIGNsaWNrIG9uIHRoZSBcImFjdGl2ZVwiIGl0ZW06Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHgpIHhbY3VycmVudEZvY3VzXS5jbGljaygpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIGluIHRoZSBkb2N1bWVudDoqL1xyXG4gICAgICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgICAgIGNsb3NlQWxsTGlzdHMoZS50YXJnZXQpO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIGFkZEFjdGl2ZSh4KSB7XHJcbiAgICAgICAgICAgIC8qYSBmdW5jdGlvbiB0byBjbGFzc2lmeSBhbiBpdGVtIGFzIFwiYWN0aXZlXCI6Ki9cclxuICAgICAgICAgICAgaWYgKCF4KSByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgICAgIC8qc3RhcnQgYnkgcmVtb3ZpbmcgdGhlIFwiYWN0aXZlXCIgY2xhc3Mgb24gYWxsIGl0ZW1zOiovXHJcbiAgICAgICAgICAgIHJlbW92ZUFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgaWYgKGN1cnJlbnRGb2N1cyA+PSB4Lmxlbmd0aCkgY3VycmVudEZvY3VzID0gMDtcclxuICAgICAgICAgICAgaWYgKGN1cnJlbnRGb2N1cyA8IDApIGN1cnJlbnRGb2N1cyA9ICh4Lmxlbmd0aCAtIDEpO1xyXG4gICAgICAgICAgICAvKmFkZCBjbGFzcyBcImF1dG9jb21wbGV0ZS1hY3RpdmVcIjoqL1xyXG4gICAgICAgICAgICB4W2N1cnJlbnRGb2N1c10uY2xhc3NMaXN0LmFkZChcInRybi1hdXRvLWNvbXBsZXRlLWFjdGl2ZVwiKTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGZ1bmN0aW9uIHJlbW92ZUFjdGl2ZSh4KSB7XHJcbiAgICAgICAgICAgIC8qYSBmdW5jdGlvbiB0byByZW1vdmUgdGhlIFwiYWN0aXZlXCIgY2xhc3MgZnJvbSBhbGwgYXV0b2NvbXBsZXRlIGl0ZW1zOiovXHJcbiAgICAgICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICAgICAgeFtpXS5jbGFzc0xpc3QucmVtb3ZlKFwidHJuLWF1dG8tY29tcGxldGUtYWN0aXZlXCIpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBmdW5jdGlvbiBjbG9zZUFsbExpc3RzKGVsbW50KSB7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKFwiY2xvc2UgYWxsIGxpc3RzXCIpO1xyXG4gICAgICAgICAgICAvKmNsb3NlIGFsbCBhdXRvY29tcGxldGUgbGlzdHMgaW4gdGhlIGRvY3VtZW50LFxyXG4gICAgICAgICAgICAgZXhjZXB0IHRoZSBvbmUgcGFzc2VkIGFzIGFuIGFyZ3VtZW50OiovXHJcbiAgICAgICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG4gICAgICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IHgubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgICAgIGlmIChlbG1udCAhPT0geFtpXSAmJiBlbG1udCAhPT0gbmFtZUlucHV0KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgeFtpXS5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHhbaV0pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG5cclxuICAgIH0sIGZhbHNlKTtcclxufSkodHJuKTtcclxuIl0sIm5hbWVzIjpbIl9fdW5zdGFibGVFc2NhcGVHcmVhdGVyVGhhbiIsInZhbHVlIiwicmVwbGFjZSIsIlJFR0VYUF9JTlZBTElEX0FUVFJJQlVURV9OQU1FIiwiZXNjYXBlQW1wZXJzYW5kIiwiZXNjYXBlUXVvdGF0aW9uTWFyayIsImVzY2FwZUxlc3NUaGFuIiwiZXNjYXBlQXR0cmlidXRlIiwiZXNjYXBlSFRNTCIsImVzY2FwZUVkaXRhYmxlSFRNTCIsImlzVmFsaWRBdHRyaWJ1dGVOYW1lIiwibmFtZSIsInRlc3QiLCJfdHlwZW9mIiwibyIsIlN5bWJvbCIsIml0ZXJhdG9yIiwiY29uc3RydWN0b3IiLCJwcm90b3R5cGUiLCJfY2xhc3NDYWxsQ2hlY2siLCJhIiwibiIsIlR5cGVFcnJvciIsIl9kZWZpbmVQcm9wZXJ0aWVzIiwiZSIsInIiLCJ0IiwibGVuZ3RoIiwiZW51bWVyYWJsZSIsImNvbmZpZ3VyYWJsZSIsIndyaXRhYmxlIiwiT2JqZWN0IiwiZGVmaW5lUHJvcGVydHkiLCJfdG9Qcm9wZXJ0eUtleSIsImtleSIsIl9jcmVhdGVDbGFzcyIsImkiLCJfdG9QcmltaXRpdmUiLCJ0b1ByaW1pdGl2ZSIsImNhbGwiLCJTdHJpbmciLCJOdW1iZXIiLCJUb3VybmFtYXRjaCIsImV2ZW50cyIsInBhcmFtIiwib2JqZWN0IiwicHJlZml4Iiwic3RyIiwicHJvcCIsImhhc093blByb3BlcnR5IiwiayIsInYiLCJwdXNoIiwiZW5jb2RlVVJJQ29tcG9uZW50Iiwiam9pbiIsImV2ZW50IiwiZXZlbnROYW1lIiwiRXZlbnRUYXJnZXQiLCJhdXRvY29tcGxldGUiLCJpbnB1dCIsImRhdGFDYWxsYmFjayIsIlRvdXJuYW1hdGNoX0F1dG9jb21wbGV0ZSIsInVjZmlyc3QiLCJzIiwiY2hhckF0IiwidG9VcHBlckNhc2UiLCJzbGljZSIsIm9yZGluYWxfc3VmZml4IiwibnVtYmVyIiwicmVtYWluZGVyIiwidGFicyIsImVsZW1lbnQiLCJnZXRFbGVtZW50c0J5Q2xhc3NOYW1lIiwicGFuZXMiLCJkb2N1bWVudCIsImNsZWFyQWN0aXZlIiwiQXJyYXkiLCJmb3JFYWNoIiwidGFiIiwiY2xhc3NMaXN0IiwicmVtb3ZlIiwiYXJpYVNlbGVjdGVkIiwicGFuZSIsInNldEFjdGl2ZSIsInRhcmdldElkIiwidGFyZ2V0VGFiIiwicXVlcnlTZWxlY3RvciIsInRhcmdldFBhbmVJZCIsImRhdGFzZXQiLCJ0YXJnZXQiLCJhZGQiLCJnZXRFbGVtZW50QnlJZCIsInRhYkNsaWNrIiwiY3VycmVudFRhcmdldCIsInByZXZlbnREZWZhdWx0IiwiYWRkRXZlbnRMaXN0ZW5lciIsImxvY2F0aW9uIiwiaGFzaCIsInN1YnN0ciIsIndpbmRvdyIsInRybl9vYmpfaW5zdGFuY2UiLCJ0YWJWaWV3cyIsImZyb20iLCJ0cm4iLCJkcm9wZG93bnMiLCJoYW5kbGVEcm9wZG93bkNsb3NlIiwiZHJvcGRvd24iLCJuZXh0RWxlbWVudFNpYmxpbmciLCJyZW1vdmVFdmVudExpc3RlbmVyIiwic3RvcFByb3BhZ2F0aW9uIiwiX3RoaXMiLCJuYW1lSW5wdXQiLCJiIiwidmFsIiwicGFyZW50IiwicGFyZW50Tm9kZSIsInRoZW4iLCJkYXRhIiwiY29uc29sZSIsImxvZyIsImNsb3NlQWxsTGlzdHMiLCJjdXJyZW50Rm9jdXMiLCJjcmVhdGVFbGVtZW50Iiwic2V0QXR0cmlidXRlIiwiaWQiLCJhcHBlbmRDaGlsZCIsInRleHQiLCJpbm5lckhUTUwiLCJjb25jYXQiLCJzZWxlY3RlZElkIiwiZGlzcGF0Y2hFdmVudCIsIkV2ZW50IiwieCIsImdldEVsZW1lbnRzQnlUYWdOYW1lIiwia2V5Q29kZSIsImFkZEFjdGl2ZSIsImNsaWNrIiwicmVtb3ZlQWN0aXZlIiwicmVtb3ZlQ2hpbGQiLCJmb3JtYXQiLCJhcmdzIiwiYXJndW1lbnRzIiwibWF0Y2giLCIkIiwib3B0aW9ucyIsInRybl90ZWFtX3Byb2ZpbGVfb3B0aW9ucyIsImpvaW5UZWFtQnV0dG9uIiwibGVhdmVUZWFtQnV0dG9uIiwiZGVsZXRlVGVhbUJ1dHRvbiIsImVkaXRUZWFtQnV0dG9uIiwiY2FuSm9pbiIsInVzZXJJZCIsIm1lbWJlcnMiLCJpc01lbWJlciIsIm1lbWJlciIsInVzZXJfaWQiLCJjYW5MZWF2ZSIsImlzT3duZXIiLCJ0ZWFtX3JhbmtfaWQiLCJjYW5EZWxldGUiLCJjYW5FZGl0IiwiZ2V0Q3VycmVudFVzZXJUZWFtTWVtYmVySWQiLCJ0ZWFtTWVtYmVySWQiLCJ0ZWFtX21lbWJlcl9pZCIsImV2YWx1YXRlQnV0dG9uU3RhdGVzIiwicGFyc2VJbnQiLCJjdXJyZW50X3VzZXJfaWQiLCJzdHlsZSIsImRpc3BsYXkiLCJjYW5fZWRpdCIsImdldE1lbWJlcnMiLCJ4aHIiLCJYTUxIdHRwUmVxdWVzdCIsIm9wZW4iLCJhcGlfdXJsIiwidGVhbV9pZCIsInNldFJlcXVlc3RIZWFkZXIiLCJyZXN0X25vbmNlIiwib25sb2FkIiwiY29udGVudCIsInN0YXR1cyIsInJlc3BvbnNlIiwiSlNPTiIsInBhcnNlIiwiaXNfbG9nZ2VkX2luIiwibGFuZ3VhZ2UiLCJlcnJvcl9tZW1iZXJzIiwibWVtYmVyTGlzdCIsInNlbmQiLCJqb2luVGVhbSIsInN1Y2Nlc3MiLCJzdWNjZXNzX21lc3NhZ2UiLCJmYWlsdXJlIiwibWVzc2FnZSIsInRlYW1JZCIsImhhbmRsZUpvaW5UZWFtIiwibGVhdmVUZWFtIiwiQ3VzdG9tRXZlbnQiLCJkZXRhaWwiLCJkZWxldGVUZWFtIiwiaHJlZiIsInRlYW1zX3VybCIsImFkZEZvcm0iLCJjYW5fYWRkIiwicCIsIlByb21pc2UiLCJyZXNvbHZlIiwicmVqZWN0IiwiZmFpbHVyZV9tZXNzYWdlIiwibWFwIiwicGxheWVyIiwiZWxtbnQiXSwic291cmNlUm9vdCI6IiJ9
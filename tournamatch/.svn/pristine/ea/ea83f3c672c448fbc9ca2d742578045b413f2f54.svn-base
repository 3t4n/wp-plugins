/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

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
/*!*******************************************!*\
  !*** ./src/js/accept-challenge-button.js ***!
  \*******************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/**
 * Handles the click event for accepting a challenge.
 *
 * @link       https://www.tournamatch.com
 * @since      3.15.0
 *
 * @package    Tournamatch
 *
 */

(function ($) {
  'use strict';

  window.addEventListener('load', function () {
    var options = trn_accept_challenge_button_options;
    var targets = document.getElementsByClassName('trn-accept-challenge-button');
    Array.prototype.forEach.call(targets, function (target) {
      target.addEventListener('click', function (event) {
        event.preventDefault();
        console.log("accept challenge was clicked for link ".concat(target.dataset.challengeId));
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "".concat(options.api_url, "challenges/").concat(target.dataset.challengeId, "/accept"));
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-WP-Nonce', options.rest_nonce);
        xhr.onload = function () {
          if (xhr.status === 200) {
            $.event('challenge').dispatchEvent(new CustomEvent('accepted', {
              detail: target.dataset.challengeId
            }));
          } else {
            $.event('challenge').dispatchEvent(new CustomEvent('error', {
              detail: xhr.response
            }));
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUFDLENBQUM7TUFDZCxDQUFDLENBQUM7SUFDTixDQUFDLEVBQUUsS0FBSyxDQUFDO0VBQ2IsQ0FBQyxFQUFFLEtBQUssQ0FBQztBQUNiLENBQUMsRUFBRXpELGdEQUFHLENBQUMsQyIsInNvdXJjZXMiOlsid2VicGFjazovL3RvdXJuYW1hdGNoLy4vc3JjL2pzL3RvdXJuYW1hdGNoLmpzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svYm9vdHN0cmFwIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9kZWZpbmUgcHJvcGVydHkgZ2V0dGVycyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvaGFzT3duUHJvcGVydHkgc2hvcnRoYW5kIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9tYWtlIG5hbWVzcGFjZSBvYmplY3QiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvLi9zcmMvanMvYWNjZXB0LWNoYWxsZW5nZS1idXR0b24uanMiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xyXG5jbGFzcyBUb3VybmFtYXRjaCB7XHJcblxyXG4gICAgY29uc3RydWN0b3IoKSB7XHJcbiAgICAgICAgdGhpcy5ldmVudHMgPSB7fTtcclxuICAgIH1cclxuXHJcbiAgICBwYXJhbShvYmplY3QsIHByZWZpeCkge1xyXG4gICAgICAgIGxldCBzdHIgPSBbXTtcclxuICAgICAgICBmb3IgKGxldCBwcm9wIGluIG9iamVjdCkge1xyXG4gICAgICAgICAgICBpZiAob2JqZWN0Lmhhc093blByb3BlcnR5KHByb3ApKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgayA9IHByZWZpeCA/IHByZWZpeCArIFwiW1wiICsgcHJvcCArIFwiXVwiIDogcHJvcDtcclxuICAgICAgICAgICAgICAgIGxldCB2ID0gb2JqZWN0W3Byb3BdO1xyXG4gICAgICAgICAgICAgICAgc3RyLnB1c2goKHYgIT09IG51bGwgJiYgdHlwZW9mIHYgPT09IFwib2JqZWN0XCIpID8gdGhpcy5wYXJhbSh2LCBrKSA6IGVuY29kZVVSSUNvbXBvbmVudChrKSArIFwiPVwiICsgZW5jb2RlVVJJQ29tcG9uZW50KHYpKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gc3RyLmpvaW4oXCImXCIpO1xyXG4gICAgfVxyXG5cclxuICAgIGV2ZW50KGV2ZW50TmFtZSkge1xyXG4gICAgICAgIGlmICghKGV2ZW50TmFtZSBpbiB0aGlzLmV2ZW50cykpIHtcclxuICAgICAgICAgICAgdGhpcy5ldmVudHNbZXZlbnROYW1lXSA9IG5ldyBFdmVudFRhcmdldChldmVudE5hbWUpO1xyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gdGhpcy5ldmVudHNbZXZlbnROYW1lXTtcclxuICAgIH1cclxuXHJcbiAgICBhdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIG5ldyBUb3VybmFtYXRjaF9BdXRvY29tcGxldGUoaW5wdXQsIGRhdGFDYWxsYmFjayk7XHJcbiAgICB9XHJcblxyXG4gICAgdWNmaXJzdChzKSB7XHJcbiAgICAgICAgaWYgKHR5cGVvZiBzICE9PSAnc3RyaW5nJykgcmV0dXJuICcnO1xyXG4gICAgICAgIHJldHVybiBzLmNoYXJBdCgwKS50b1VwcGVyQ2FzZSgpICsgcy5zbGljZSgxKTtcclxuICAgIH1cclxuXHJcbiAgICBvcmRpbmFsX3N1ZmZpeChudW1iZXIpIHtcclxuICAgICAgICBjb25zdCByZW1haW5kZXIgPSBudW1iZXIgJSAxMDA7XHJcblxyXG4gICAgICAgIGlmICgocmVtYWluZGVyIDwgMTEpIHx8IChyZW1haW5kZXIgPiAxMykpIHtcclxuICAgICAgICAgICAgc3dpdGNoIChyZW1haW5kZXIgJSAxMCkge1xyXG4gICAgICAgICAgICAgICAgY2FzZSAxOiByZXR1cm4gJ3N0JztcclxuICAgICAgICAgICAgICAgIGNhc2UgMjogcmV0dXJuICduZCc7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDM6IHJldHVybiAncmQnO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiAndGgnO1xyXG4gICAgfVxyXG5cclxuICAgIHRhYnMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnN0IHRhYnMgPSBlbGVtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1uYXYtbGluaycpO1xyXG4gICAgICAgIGNvbnN0IHBhbmVzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLXRhYi1wYW5lJyk7XHJcbiAgICAgICAgY29uc3QgY2xlYXJBY3RpdmUgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwodGFicywgKHRhYikgPT4ge1xyXG4gICAgICAgICAgICAgICAgdGFiLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YWIuYXJpYVNlbGVjdGVkID0gZmFsc2U7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHBhbmVzLCBwYW5lID0+IHBhbmUuY2xhc3NMaXN0LnJlbW92ZSgndHJuLXRhYi1hY3RpdmUnKSk7XHJcbiAgICAgICAgfTtcclxuICAgICAgICBjb25zdCBzZXRBY3RpdmUgPSAodGFyZ2V0SWQpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0VGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignYVtocmVmPVwiIycgKyB0YXJnZXRJZCArICdcIl0udHJuLW5hdi1saW5rJyk7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBjbGVhckFjdGl2ZSgpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0VGFiLmNsYXNzTGlzdC5hZGQoJ3Rybi1uYXYtYWN0aXZlJyk7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRUYWIuYXJpYVNlbGVjdGVkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0YXJnZXRQYW5lSWQpLmNsYXNzTGlzdC5hZGQoJ3Rybi10YWItYWN0aXZlJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG4gICAgICAgIGNvbnN0IHRhYkNsaWNrID0gKGV2ZW50KSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFRhYiA9IGV2ZW50LmN1cnJlbnRUYXJnZXQ7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFBhbmVJZCA9IHRhcmdldFRhYiAmJiB0YXJnZXRUYWIuZGF0YXNldCAmJiB0YXJnZXRUYWIuZGF0YXNldC50YXJnZXQgfHwgZmFsc2U7XHJcblxyXG4gICAgICAgICAgICBpZiAodGFyZ2V0UGFuZUlkKSB7XHJcbiAgICAgICAgICAgICAgICBzZXRBY3RpdmUodGFyZ2V0UGFuZUlkKTtcclxuICAgICAgICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhYnMsICh0YWIpID0+IHtcclxuICAgICAgICAgICAgdGFiLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGFiQ2xpY2spO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBpZiAobG9jYXRpb24uaGFzaCkge1xyXG4gICAgICAgICAgICBzZXRBY3RpdmUobG9jYXRpb24uaGFzaC5zdWJzdHIoMSkpO1xyXG4gICAgICAgIH0gZWxzZSBpZiAodGFicy5sZW5ndGggPiAwKSB7XHJcbiAgICAgICAgICAgIHNldEFjdGl2ZSh0YWJzWzBdLmRhdGFzZXQudGFyZ2V0KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG59XHJcblxyXG4vL3Rybi5pbml0aWFsaXplKCk7XHJcbmlmICghd2luZG93LnRybl9vYmpfaW5zdGFuY2UpIHtcclxuICAgIHdpbmRvdy50cm5fb2JqX2luc3RhbmNlID0gbmV3IFRvdXJuYW1hdGNoKCk7XHJcblxyXG4gICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcblxyXG4gICAgICAgIGNvbnN0IHRhYlZpZXdzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLW5hdicpO1xyXG5cclxuICAgICAgICBBcnJheS5mcm9tKHRhYlZpZXdzKS5mb3JFYWNoKCh0YWIpID0+IHtcclxuICAgICAgICAgICAgdHJuLnRhYnModGFiKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgY29uc3QgZHJvcGRvd25zID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLWRyb3Bkb3duLXRvZ2dsZScpO1xyXG4gICAgICAgIGNvbnN0IGhhbmRsZURyb3Bkb3duQ2xvc2UgPSAoKSA9PiB7XHJcbiAgICAgICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICAgICAgZHJvcGRvd24ubmV4dEVsZW1lbnRTaWJsaW5nLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi1zaG93Jyk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICBkb2N1bWVudC5yZW1vdmVFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgaGFuZGxlRHJvcGRvd25DbG9zZSwgZmFsc2UpO1xyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIEFycmF5LmZyb20oZHJvcGRvd25zKS5mb3JFYWNoKChkcm9wZG93bikgPT4ge1xyXG4gICAgICAgICAgICBkcm9wZG93bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICAgICAgICAgICAgICB0aGlzLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QuYWRkKCd0cm4tc2hvdycpO1xyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhhbmRsZURyb3Bkb3duQ2xvc2UsIGZhbHNlKTtcclxuICAgICAgICAgICAgfSwgZmFsc2UpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH0sIGZhbHNlKTtcclxufVxyXG5leHBvcnQgbGV0IHRybiA9IHdpbmRvdy50cm5fb2JqX2luc3RhbmNlO1xyXG5cclxuY2xhc3MgVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlIHtcclxuXHJcbiAgICAvLyBjdXJyZW50Rm9jdXM7XHJcbiAgICAvL1xyXG4gICAgLy8gbmFtZUlucHV0O1xyXG4gICAgLy9cclxuICAgIC8vIHNlbGY7XHJcblxyXG4gICAgY29uc3RydWN0b3IoaW5wdXQsIGRhdGFDYWxsYmFjaykge1xyXG4gICAgICAgIC8vIHRoaXMuc2VsZiA9IHRoaXM7XHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQgPSBpbnB1dDtcclxuXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImlucHV0XCIsICgpID0+IHtcclxuICAgICAgICAgICAgbGV0IGEsIGIsIGksIHZhbCA9IHRoaXMubmFtZUlucHV0LnZhbHVlOy8vdGhpcy52YWx1ZTtcclxuICAgICAgICAgICAgbGV0IHBhcmVudCA9IHRoaXMubmFtZUlucHV0LnBhcmVudE5vZGU7Ly90aGlzLnBhcmVudE5vZGU7XHJcblxyXG4gICAgICAgICAgICAvLyBsZXQgcCA9IG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcclxuICAgICAgICAgICAgLy8gICAgIC8qIG5lZWQgdG8gcXVlcnkgc2VydmVyIGZvciBuYW1lcyBoZXJlLiAqL1xyXG4gICAgICAgICAgICAvLyAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLm9wZW4oJ0dFVCcsIG9wdGlvbnMuYXBpX3VybCArICdwbGF5ZXJzLz9zZWFyY2g9JyArIHZhbCArICcmcGVyX3BhZ2U9NScpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICAvLyByZXNvbHZlKEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tYXAoKHBsYXllcikgPT4ge3JldHVybiB7ICd2YWx1ZSc6IHBsYXllci5pZCwgJ3RleHQnOiBwbGF5ZXIubmFtZSB9O30pKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4gcGxheWVyLm5hbWU7fSkpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJlamVjdCgpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIH1cclxuICAgICAgICAgICAgLy8gICAgIH07XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2VuZCgpO1xyXG4gICAgICAgICAgICAvLyB9KTtcclxuICAgICAgICAgICAgZGF0YUNhbGxiYWNrKHZhbCkudGhlbigoZGF0YSkgPT4gey8vcC50aGVuKChkYXRhKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhkYXRhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmNsb3NlIGFueSBhbHJlYWR5IG9wZW4gbGlzdHMgb2YgYXV0by1jb21wbGV0ZWQgdmFsdWVzKi9cclxuICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG4gICAgICAgICAgICAgICAgaWYgKCF2YWwpIHsgcmV0dXJuIGZhbHNlO31cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzID0gLTE7XHJcblxyXG4gICAgICAgICAgICAgICAgLypjcmVhdGUgYSBESVYgZWxlbWVudCB0aGF0IHdpbGwgY29udGFpbiB0aGUgaXRlbXMgKHZhbHVlcyk6Ki9cclxuICAgICAgICAgICAgICAgIGEgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgYS5zZXRBdHRyaWJ1dGUoXCJpZFwiLCB0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiY2xhc3NcIiwgXCJ0cm4tYXV0by1jb21wbGV0ZS1pdGVtc1wiKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmFwcGVuZCB0aGUgRElWIGVsZW1lbnQgYXMgYSBjaGlsZCBvZiB0aGUgYXV0by1jb21wbGV0ZSBjb250YWluZXI6Ki9cclxuICAgICAgICAgICAgICAgIHBhcmVudC5hcHBlbmRDaGlsZChhKTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmZvciBlYWNoIGl0ZW0gaW4gdGhlIGFycmF5Li4uKi9cclxuICAgICAgICAgICAgICAgIGZvciAoaSA9IDA7IGkgPCBkYXRhLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbGV0IHRleHQsIHZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKiBXaGljaCBmb3JtYXQgZGlkIHRoZXkgZ2l2ZSB1cy4gKi9cclxuICAgICAgICAgICAgICAgICAgICBpZiAodHlwZW9mIGRhdGFbaV0gPT09ICdvYmplY3QnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldWyd0ZXh0J107XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXVsndmFsdWUnXTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0ID0gZGF0YVtpXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLypjaGVjayBpZiB0aGUgaXRlbSBzdGFydHMgd2l0aCB0aGUgc2FtZSBsZXR0ZXJzIGFzIHRoZSB0ZXh0IGZpZWxkIHZhbHVlOiovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpLnRvVXBwZXJDYXNlKCkgPT09IHZhbC50b1VwcGVyQ2FzZSgpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qY3JlYXRlIGEgRElWIGVsZW1lbnQgZm9yIGVhY2ggbWF0Y2hpbmcgZWxlbWVudDoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcIkRJVlwiKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLyptYWtlIHRoZSBtYXRjaGluZyBsZXR0ZXJzIGJvbGQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgPSBcIjxzdHJvbmc+XCIgKyB0ZXh0LnN1YnN0cigwLCB2YWwubGVuZ3RoKSArIFwiPC9zdHJvbmc+XCI7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IHRleHQuc3Vic3RyKHZhbC5sZW5ndGgpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLyppbnNlcnQgYSBpbnB1dCBmaWVsZCB0aGF0IHdpbGwgaG9sZCB0aGUgY3VycmVudCBhcnJheSBpdGVtJ3MgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gXCI8aW5wdXQgdHlwZT0naGlkZGVuJyB2YWx1ZT0nXCIgKyB2YWx1ZSArIFwiJz5cIjtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuZGF0YXNldC52YWx1ZSA9IHZhbHVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudGV4dCA9IHRleHQ7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIG9uIHRoZSBpdGVtIHZhbHVlIChESVYgZWxlbWVudCk6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGBpdGVtIGNsaWNrZWQgd2l0aCB2YWx1ZSAke2UuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlfWApO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGluc2VydCB0aGUgdmFsdWUgZm9yIHRoZSBhdXRvY29tcGxldGUgdGV4dCBmaWVsZDogKi9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LnZhbHVlID0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudGV4dDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRhdGFzZXQuc2VsZWN0ZWRJZCA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0LnZhbHVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8qIGNsb3NlIHRoZSBsaXN0IG9mIGF1dG9jb21wbGV0ZWQgdmFsdWVzLCAob3IgYW55IG90aGVyIG9wZW4gbGlzdHMgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXM6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cygpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMubmFtZUlucHV0LmRpc3BhdGNoRXZlbnQobmV3IEV2ZW50KCdjaGFuZ2UnKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBhLmFwcGVuZENoaWxkKGIpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHByZXNzZXMgYSBrZXkgb24gdGhlIGtleWJvYXJkOiovXHJcbiAgICAgICAgdGhpcy5uYW1lSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcihcImtleWRvd25cIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgbGV0IHggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0aGlzLm5hbWVJbnB1dC5pZCArIFwiLWF1dG8tY29tcGxldGUtbGlzdFwiKTtcclxuICAgICAgICAgICAgaWYgKHgpIHggPSB4LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiZGl2XCIpO1xyXG4gICAgICAgICAgICBpZiAoZS5rZXlDb2RlID09PSA0MCkge1xyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgRE9XTiBrZXkgaXMgcHJlc3NlZCxcclxuICAgICAgICAgICAgICAgICBpbmNyZWFzZSB0aGUgY3VycmVudEZvY3VzIHZhcmlhYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cysrO1xyXG4gICAgICAgICAgICAgICAgLyphbmQgYW5kIG1ha2UgdGhlIGN1cnJlbnQgaXRlbSBtb3JlIHZpc2libGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuYWRkQWN0aXZlKHgpO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKGUua2V5Q29kZSA9PT0gMzgpIHsgLy91cFxyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgYXJyb3cgVVAga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgZGVjcmVhc2UgdGhlIGN1cnJlbnRGb2N1cyB2YXJpYWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMtLTtcclxuICAgICAgICAgICAgICAgIC8qYW5kIGFuZCBtYWtlIHRoZSBjdXJyZW50IGl0ZW0gbW9yZSB2aXNpYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT09IDEzKSB7XHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBFTlRFUiBrZXkgaXMgcHJlc3NlZCwgcHJldmVudCB0aGUgZm9ybSBmcm9tIGJlaW5nIHN1Ym1pdHRlZCwqL1xyXG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID4gLTEpIHtcclxuICAgICAgICAgICAgICAgICAgICAvKmFuZCBzaW11bGF0ZSBhIGNsaWNrIG9uIHRoZSBcImFjdGl2ZVwiIGl0ZW06Ki9cclxuICAgICAgICAgICAgICAgICAgICBpZiAoeCkgeFt0aGlzLmN1cnJlbnRGb2N1c10uY2xpY2soKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiB3aGVuIHNvbWVvbmUgY2xpY2tzIGluIHRoZSBkb2N1bWVudDoqL1xyXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoZS50YXJnZXQpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIGFkZEFjdGl2ZSh4KSB7XHJcbiAgICAgICAgLyphIGZ1bmN0aW9uIHRvIGNsYXNzaWZ5IGFuIGl0ZW0gYXMgXCJhY3RpdmVcIjoqL1xyXG4gICAgICAgIGlmICgheCkgcmV0dXJuIGZhbHNlO1xyXG4gICAgICAgIC8qc3RhcnQgYnkgcmVtb3ZpbmcgdGhlIFwiYWN0aXZlXCIgY2xhc3Mgb24gYWxsIGl0ZW1zOiovXHJcbiAgICAgICAgdGhpcy5yZW1vdmVBY3RpdmUoeCk7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzID49IHgubGVuZ3RoKSB0aGlzLmN1cnJlbnRGb2N1cyA9IDA7XHJcbiAgICAgICAgaWYgKHRoaXMuY3VycmVudEZvY3VzIDwgMCkgdGhpcy5jdXJyZW50Rm9jdXMgPSAoeC5sZW5ndGggLSAxKTtcclxuICAgICAgICAvKmFkZCBjbGFzcyBcImF1dG9jb21wbGV0ZS1hY3RpdmVcIjoqL1xyXG4gICAgICAgIHhbdGhpcy5jdXJyZW50Rm9jdXNdLmNsYXNzTGlzdC5hZGQoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICB9XHJcblxyXG4gICAgcmVtb3ZlQWN0aXZlKHgpIHtcclxuICAgICAgICAvKmEgZnVuY3Rpb24gdG8gcmVtb3ZlIHRoZSBcImFjdGl2ZVwiIGNsYXNzIGZyb20gYWxsIGF1dG9jb21wbGV0ZSBpdGVtczoqL1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICB4W2ldLmNsYXNzTGlzdC5yZW1vdmUoXCJ0cm4tYXV0by1jb21wbGV0ZS1hY3RpdmVcIik7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIGNsb3NlQWxsTGlzdHMoZWxlbWVudCkge1xyXG4gICAgICAgIGNvbnNvbGUubG9nKFwiY2xvc2UgYWxsIGxpc3RzXCIpO1xyXG4gICAgICAgIC8qY2xvc2UgYWxsIGF1dG9jb21wbGV0ZSBsaXN0cyBpbiB0aGUgZG9jdW1lbnQsXHJcbiAgICAgICAgIGV4Y2VwdCB0aGUgb25lIHBhc3NlZCBhcyBhbiBhcmd1bWVudDoqL1xyXG4gICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG4gICAgICAgIGZvciAobGV0IGkgPSAwOyBpIDwgeC5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICBpZiAoZWxlbWVudCAhPT0geFtpXSAmJiBlbGVtZW50ICE9PSB0aGlzLm5hbWVJbnB1dCkge1xyXG4gICAgICAgICAgICAgICAgeFtpXS5wYXJlbnROb2RlLnJlbW92ZUNoaWxkKHhbaV0pO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG59XHJcblxyXG4vLyBGaXJzdCwgY2hlY2tzIGlmIGl0IGlzbid0IGltcGxlbWVudGVkIHlldC5cclxuaWYgKCFTdHJpbmcucHJvdG90eXBlLmZvcm1hdCkge1xyXG4gICAgU3RyaW5nLnByb3RvdHlwZS5mb3JtYXQgPSBmdW5jdGlvbigpIHtcclxuICAgICAgICBjb25zdCBhcmdzID0gYXJndW1lbnRzO1xyXG4gICAgICAgIHJldHVybiB0aGlzLnJlcGxhY2UoL3soXFxkKyl9L2csIGZ1bmN0aW9uKG1hdGNoLCBudW1iZXIpIHtcclxuICAgICAgICAgICAgcmV0dXJuIHR5cGVvZiBhcmdzW251bWJlcl0gIT09ICd1bmRlZmluZWQnXHJcbiAgICAgICAgICAgICAgICA/IGFyZ3NbbnVtYmVyXVxyXG4gICAgICAgICAgICAgICAgOiBtYXRjaFxyXG4gICAgICAgICAgICAgICAgO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfTtcclxufSIsIi8vIFRoZSBtb2R1bGUgY2FjaGVcbnZhciBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX18gPSB7fTtcblxuLy8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbmZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG5cdHZhciBjYWNoZWRNb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdO1xuXHRpZiAoY2FjaGVkTW9kdWxlICE9PSB1bmRlZmluZWQpIHtcblx0XHRyZXR1cm4gY2FjaGVkTW9kdWxlLmV4cG9ydHM7XG5cdH1cblx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcblx0dmFyIG1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF0gPSB7XG5cdFx0Ly8gbm8gbW9kdWxlLmlkIG5lZWRlZFxuXHRcdC8vIG5vIG1vZHVsZS5sb2FkZWQgbmVlZGVkXG5cdFx0ZXhwb3J0czoge31cblx0fTtcblxuXHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cblx0X193ZWJwYWNrX21vZHVsZXNfX1ttb2R1bGVJZF0obW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cblx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcblx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xufVxuXG4iLCIvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9ucyBmb3IgaGFybW9ueSBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSAoZXhwb3J0cywgZGVmaW5pdGlvbikgPT4ge1xuXHRmb3IodmFyIGtleSBpbiBkZWZpbml0aW9uKSB7XG5cdFx0aWYoX193ZWJwYWNrX3JlcXVpcmVfXy5vKGRlZmluaXRpb24sIGtleSkgJiYgIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBrZXkpKSB7XG5cdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywga2V5LCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZGVmaW5pdGlvbltrZXldIH0pO1xuXHRcdH1cblx0fVxufTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSAob2JqLCBwcm9wKSA9PiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iaiwgcHJvcCkpIiwiLy8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5yID0gKGV4cG9ydHMpID0+IHtcblx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG5cdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG5cdH1cblx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbn07IiwiLyoqXHJcbiAqIEhhbmRsZXMgdGhlIGNsaWNrIGV2ZW50IGZvciBhY2NlcHRpbmcgYSBjaGFsbGVuZ2UuXHJcbiAqXHJcbiAqIEBsaW5rICAgICAgIGh0dHBzOi8vd3d3LnRvdXJuYW1hdGNoLmNvbVxyXG4gKiBAc2luY2UgICAgICAzLjE1LjBcclxuICpcclxuICogQHBhY2thZ2UgICAgVG91cm5hbWF0Y2hcclxuICpcclxuICovXHJcbmltcG9ydCB7IHRybiB9IGZyb20gJy4vdG91cm5hbWF0Y2guanMnO1xyXG5cclxuKGZ1bmN0aW9uICgkKSB7XHJcbiAgICAndXNlIHN0cmljdCc7XHJcblxyXG4gICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgbGV0IG9wdGlvbnMgPSB0cm5fYWNjZXB0X2NoYWxsZW5nZV9idXR0b25fb3B0aW9ucztcclxuXHJcbiAgICAgICAgbGV0IHRhcmdldHMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tYWNjZXB0LWNoYWxsZW5nZS1idXR0b24nKTtcclxuICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhcmdldHMsIGZ1bmN0aW9uICh0YXJnZXQpIHtcclxuICAgICAgICAgICAgdGFyZ2V0LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGBhY2NlcHQgY2hhbGxlbmdlIHdhcyBjbGlja2VkIGZvciBsaW5rICR7dGFyZ2V0LmRhdGFzZXQuY2hhbGxlbmdlSWR9YCk7XHJcbiAgICAgICAgICAgICAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgICAgICB4aHIub3BlbignUE9TVCcsIGAke29wdGlvbnMuYXBpX3VybH1jaGFsbGVuZ2VzLyR7dGFyZ2V0LmRhdGFzZXQuY2hhbGxlbmdlSWR9L2FjY2VwdGApO1xyXG4gICAgICAgICAgICAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTtcclxuICAgICAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLVdQLU5vbmNlJywgb3B0aW9ucy5yZXN0X25vbmNlKTtcclxuICAgICAgICAgICAgICAgIHhoci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHhoci5zdGF0dXMgPT09IDIwMCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkLmV2ZW50KCdjaGFsbGVuZ2UnKS5kaXNwYXRjaEV2ZW50KG5ldyBDdXN0b21FdmVudCgnYWNjZXB0ZWQnLCB7IGRldGFpbDogdGFyZ2V0LmRhdGFzZXQuY2hhbGxlbmdlSWQgfSApKTtcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkLmV2ZW50KCdjaGFsbGVuZ2UnKS5kaXNwYXRjaEV2ZW50KG5ldyBDdXN0b21FdmVudCgnZXJyb3InLCB7IGRldGFpbDogeGhyLnJlc3BvbnNlIH0gKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfTtcclxuXHJcbiAgICAgICAgICAgICAgICB4aHIuc2VuZCgpO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9LCBmYWxzZSk7XHJcbiAgICB9LCBmYWxzZSk7XHJcbn0pKHRybik7Il0sIm5hbWVzIjpbIl90eXBlb2YiLCJvIiwiU3ltYm9sIiwiaXRlcmF0b3IiLCJjb25zdHJ1Y3RvciIsInByb3RvdHlwZSIsIl9jbGFzc0NhbGxDaGVjayIsImEiLCJuIiwiVHlwZUVycm9yIiwiX2RlZmluZVByb3BlcnRpZXMiLCJlIiwiciIsInQiLCJsZW5ndGgiLCJlbnVtZXJhYmxlIiwiY29uZmlndXJhYmxlIiwid3JpdGFibGUiLCJPYmplY3QiLCJkZWZpbmVQcm9wZXJ0eSIsIl90b1Byb3BlcnR5S2V5Iiwia2V5IiwiX2NyZWF0ZUNsYXNzIiwiaSIsIl90b1ByaW1pdGl2ZSIsInRvUHJpbWl0aXZlIiwiY2FsbCIsIlN0cmluZyIsIk51bWJlciIsIlRvdXJuYW1hdGNoIiwiZXZlbnRzIiwidmFsdWUiLCJwYXJhbSIsIm9iamVjdCIsInByZWZpeCIsInN0ciIsInByb3AiLCJoYXNPd25Qcm9wZXJ0eSIsImsiLCJ2IiwicHVzaCIsImVuY29kZVVSSUNvbXBvbmVudCIsImpvaW4iLCJldmVudCIsImV2ZW50TmFtZSIsIkV2ZW50VGFyZ2V0IiwiYXV0b2NvbXBsZXRlIiwiaW5wdXQiLCJkYXRhQ2FsbGJhY2siLCJUb3VybmFtYXRjaF9BdXRvY29tcGxldGUiLCJ1Y2ZpcnN0IiwicyIsImNoYXJBdCIsInRvVXBwZXJDYXNlIiwic2xpY2UiLCJvcmRpbmFsX3N1ZmZpeCIsIm51bWJlciIsInJlbWFpbmRlciIsInRhYnMiLCJlbGVtZW50IiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsInBhbmVzIiwiZG9jdW1lbnQiLCJjbGVhckFjdGl2ZSIsIkFycmF5IiwiZm9yRWFjaCIsInRhYiIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFyaWFTZWxlY3RlZCIsInBhbmUiLCJzZXRBY3RpdmUiLCJ0YXJnZXRJZCIsInRhcmdldFRhYiIsInF1ZXJ5U2VsZWN0b3IiLCJ0YXJnZXRQYW5lSWQiLCJkYXRhc2V0IiwidGFyZ2V0IiwiYWRkIiwiZ2V0RWxlbWVudEJ5SWQiLCJ0YWJDbGljayIsImN1cnJlbnRUYXJnZXQiLCJwcmV2ZW50RGVmYXVsdCIsImFkZEV2ZW50TGlzdGVuZXIiLCJsb2NhdGlvbiIsImhhc2giLCJzdWJzdHIiLCJ3aW5kb3ciLCJ0cm5fb2JqX2luc3RhbmNlIiwidGFiVmlld3MiLCJmcm9tIiwidHJuIiwiZHJvcGRvd25zIiwiaGFuZGxlRHJvcGRvd25DbG9zZSIsImRyb3Bkb3duIiwibmV4dEVsZW1lbnRTaWJsaW5nIiwicmVtb3ZlRXZlbnRMaXN0ZW5lciIsInN0b3BQcm9wYWdhdGlvbiIsIl90aGlzIiwibmFtZUlucHV0IiwiYiIsInZhbCIsInBhcmVudCIsInBhcmVudE5vZGUiLCJ0aGVuIiwiZGF0YSIsImNvbnNvbGUiLCJsb2ciLCJjbG9zZUFsbExpc3RzIiwiY3VycmVudEZvY3VzIiwiY3JlYXRlRWxlbWVudCIsInNldEF0dHJpYnV0ZSIsImlkIiwiYXBwZW5kQ2hpbGQiLCJ0ZXh0IiwiaW5uZXJIVE1MIiwiY29uY2F0Iiwic2VsZWN0ZWRJZCIsImRpc3BhdGNoRXZlbnQiLCJFdmVudCIsIngiLCJnZXRFbGVtZW50c0J5VGFnTmFtZSIsImtleUNvZGUiLCJhZGRBY3RpdmUiLCJjbGljayIsInJlbW92ZUFjdGl2ZSIsInJlbW92ZUNoaWxkIiwiZm9ybWF0IiwiYXJncyIsImFyZ3VtZW50cyIsInJlcGxhY2UiLCJtYXRjaCIsIiQiLCJvcHRpb25zIiwidHJuX2FjY2VwdF9jaGFsbGVuZ2VfYnV0dG9uX29wdGlvbnMiLCJ0YXJnZXRzIiwiY2hhbGxlbmdlSWQiLCJ4aHIiLCJYTUxIdHRwUmVxdWVzdCIsIm9wZW4iLCJhcGlfdXJsIiwic2V0UmVxdWVzdEhlYWRlciIsInJlc3Rfbm9uY2UiLCJvbmxvYWQiLCJzdGF0dXMiLCJDdXN0b21FdmVudCIsImRldGFpbCIsInJlc3BvbnNlIiwic2VuZCJdLCJzb3VyY2VSb290IjoiIn0=
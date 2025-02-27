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
/*!*******************************!*\
  !*** ./src/js/create-team.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tournamatch_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tournamatch.js */ "./src/js/tournamatch.js");
/**
 * Create team form.
 *
 * @link       https://www.tournamatch.com
 * @since      3.8.0
 *
 * @package    Tournamatch
 *
 */

(function ($) {
  'use strict';

  window.addEventListener('load', function () {
    var form = document.getElementById('trn-create-team-form');
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      event.stopPropagation();

      // Reset this on each submit.
      document.getElementById('trn-team-name').setCustomValidity('');
      document.getElementById('trn-team-name-error').innerText = trn_create_team_options.team_name_required_message;
      if (form.checkValidity() === true) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', trn_create_team_options.api_url);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-WP-Nonce', trn_create_team_options.rest_nonce);
        xhr.onload = function () {
          if (xhr.status === 200) {
            window.location.href = JSON.parse(xhr.response).data.redirect_link;
          } else {
            console.log(xhr.response);
            document.getElementById('trn-team-name').setCustomValidity(trn_create_team_options.team_name_duplicate_message);
            document.getElementById('trn-team-name-error').innerText = trn_create_team_options.team_name_duplicate_message;
          }
        };
        xhr.send($.param({
          name: document.getElementById('trn-team-name').value,
          tag: document.getElementById('trn-team-tag').value
        }));
      }
      form.classList.add('trn-was-validated');
    }, false);
  }, false);
})(_tournamatch_js__WEBPACK_IMPORTED_MODULE_0__.trn);
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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LENBQUM7UUFFRGIsR0FBRyxDQUFDYyxJQUFJLENBQUNyQixDQUFDLENBQUNwRyxLQUFLLENBQUM7VUFDYjBILElBQUksRUFBRTVGLFFBQVEsQ0FBQ2lCLGNBQWMsQ0FBQyxlQUFlLENBQUMsQ0FBQ2hELEtBQUs7VUFDcEQ0SCxHQUFHLEVBQUU3RixRQUFRLENBQUNpQixjQUFjLENBQUMsY0FBYyxDQUFDLENBQUNoRDtRQUNqRCxDQUFDLENBQUMsQ0FBQztNQUNQO01BQ0FzRyxJQUFJLENBQUNsRSxTQUFTLENBQUNXLEdBQUcsQ0FBQyxtQkFBbUIsQ0FBQztJQUMzQyxDQUFDLEVBQUUsS0FBSyxDQUFDO0VBQ2IsQ0FBQyxFQUFFLEtBQUssQ0FBQztBQUNiLENBQUMsRUFBRWEsZ0RBQUcsQ0FBQyxDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvLi9zcmMvanMvdG91cm5hbWF0Y2guanMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2RlZmluZSBwcm9wZXJ0eSBnZXR0ZXJzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9oYXNPd25Qcm9wZXJ0eSBzaG9ydGhhbmQiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL21ha2UgbmFtZXNwYWNlIG9iamVjdCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC8uL3NyYy9qcy9jcmVhdGUtdGVhbS5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIndXNlIHN0cmljdCc7XHJcbmNsYXNzIFRvdXJuYW1hdGNoIHtcclxuXHJcbiAgICBjb25zdHJ1Y3RvcigpIHtcclxuICAgICAgICB0aGlzLmV2ZW50cyA9IHt9O1xyXG4gICAgfVxyXG5cclxuICAgIHBhcmFtKG9iamVjdCwgcHJlZml4KSB7XHJcbiAgICAgICAgbGV0IHN0ciA9IFtdO1xyXG4gICAgICAgIGZvciAobGV0IHByb3AgaW4gb2JqZWN0KSB7XHJcbiAgICAgICAgICAgIGlmIChvYmplY3QuaGFzT3duUHJvcGVydHkocHJvcCkpIHtcclxuICAgICAgICAgICAgICAgIGxldCBrID0gcHJlZml4ID8gcHJlZml4ICsgXCJbXCIgKyBwcm9wICsgXCJdXCIgOiBwcm9wO1xyXG4gICAgICAgICAgICAgICAgbGV0IHYgPSBvYmplY3RbcHJvcF07XHJcbiAgICAgICAgICAgICAgICBzdHIucHVzaCgodiAhPT0gbnVsbCAmJiB0eXBlb2YgdiA9PT0gXCJvYmplY3RcIikgPyB0aGlzLnBhcmFtKHYsIGspIDogZW5jb2RlVVJJQ29tcG9uZW50KGspICsgXCI9XCIgKyBlbmNvZGVVUklDb21wb25lbnQodikpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiBzdHIuam9pbihcIiZcIik7XHJcbiAgICB9XHJcblxyXG4gICAgZXZlbnQoZXZlbnROYW1lKSB7XHJcbiAgICAgICAgaWYgKCEoZXZlbnROYW1lIGluIHRoaXMuZXZlbnRzKSkge1xyXG4gICAgICAgICAgICB0aGlzLmV2ZW50c1tldmVudE5hbWVdID0gbmV3IEV2ZW50VGFyZ2V0KGV2ZW50TmFtZSk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHJldHVybiB0aGlzLmV2ZW50c1tldmVudE5hbWVdO1xyXG4gICAgfVxyXG5cclxuICAgIGF1dG9jb21wbGV0ZShpbnB1dCwgZGF0YUNhbGxiYWNrKSB7XHJcbiAgICAgICAgbmV3IFRvdXJuYW1hdGNoX0F1dG9jb21wbGV0ZShpbnB1dCwgZGF0YUNhbGxiYWNrKTtcclxuICAgIH1cclxuXHJcbiAgICB1Y2ZpcnN0KHMpIHtcclxuICAgICAgICBpZiAodHlwZW9mIHMgIT09ICdzdHJpbmcnKSByZXR1cm4gJyc7XHJcbiAgICAgICAgcmV0dXJuIHMuY2hhckF0KDApLnRvVXBwZXJDYXNlKCkgKyBzLnNsaWNlKDEpO1xyXG4gICAgfVxyXG5cclxuICAgIG9yZGluYWxfc3VmZml4KG51bWJlcikge1xyXG4gICAgICAgIGNvbnN0IHJlbWFpbmRlciA9IG51bWJlciAlIDEwMDtcclxuXHJcbiAgICAgICAgaWYgKChyZW1haW5kZXIgPCAxMSkgfHwgKHJlbWFpbmRlciA+IDEzKSkge1xyXG4gICAgICAgICAgICBzd2l0Y2ggKHJlbWFpbmRlciAlIDEwKSB7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDE6IHJldHVybiAnc3QnO1xyXG4gICAgICAgICAgICAgICAgY2FzZSAyOiByZXR1cm4gJ25kJztcclxuICAgICAgICAgICAgICAgIGNhc2UgMzogcmV0dXJuICdyZCc7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuICd0aCc7XHJcbiAgICB9XHJcblxyXG4gICAgdGFicyhlbGVtZW50KSB7XHJcbiAgICAgICAgY29uc3QgdGFicyA9IGVsZW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLW5hdi1saW5rJyk7XHJcbiAgICAgICAgY29uc3QgcGFuZXMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tdGFiLXBhbmUnKTtcclxuICAgICAgICBjb25zdCBjbGVhckFjdGl2ZSA9ICgpID0+IHtcclxuICAgICAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbCh0YWJzLCAodGFiKSA9PiB7XHJcbiAgICAgICAgICAgICAgICB0YWIuY2xhc3NMaXN0LnJlbW92ZSgndHJuLW5hdi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgIHRhYi5hcmlhU2VsZWN0ZWQgPSBmYWxzZTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwocGFuZXMsIHBhbmUgPT4gcGFuZS5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tdGFiLWFjdGl2ZScpKTtcclxuICAgICAgICB9O1xyXG4gICAgICAgIGNvbnN0IHNldEFjdGl2ZSA9ICh0YXJnZXRJZCkgPT4ge1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRUYWIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdhW2hyZWY9XCIjJyArIHRhcmdldElkICsgJ1wiXS50cm4tbmF2LWxpbmsnKTtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0UGFuZUlkID0gdGFyZ2V0VGFiICYmIHRhcmdldFRhYi5kYXRhc2V0ICYmIHRhcmdldFRhYi5kYXRhc2V0LnRhcmdldCB8fCBmYWxzZTtcclxuXHJcbiAgICAgICAgICAgIGlmICh0YXJnZXRQYW5lSWQpIHtcclxuICAgICAgICAgICAgICAgIGNsZWFyQWN0aXZlKCk7XHJcbiAgICAgICAgICAgICAgICB0YXJnZXRUYWIuY2xhc3NMaXN0LmFkZCgndHJuLW5hdi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgICAgIHRhcmdldFRhYi5hcmlhU2VsZWN0ZWQgPSB0cnVlO1xyXG5cclxuICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRhcmdldFBhbmVJZCkuY2xhc3NMaXN0LmFkZCgndHJuLXRhYi1hY3RpdmUnKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcbiAgICAgICAgY29uc3QgdGFiQ2xpY2sgPSAoZXZlbnQpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0VGFiID0gZXZlbnQuY3VycmVudFRhcmdldDtcclxuICAgICAgICAgICAgY29uc3QgdGFyZ2V0UGFuZUlkID0gdGFyZ2V0VGFiICYmIHRhcmdldFRhYi5kYXRhc2V0ICYmIHRhcmdldFRhYi5kYXRhc2V0LnRhcmdldCB8fCBmYWxzZTtcclxuXHJcbiAgICAgICAgICAgIGlmICh0YXJnZXRQYW5lSWQpIHtcclxuICAgICAgICAgICAgICAgIHNldEFjdGl2ZSh0YXJnZXRQYW5lSWQpO1xyXG4gICAgICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwodGFicywgKHRhYikgPT4ge1xyXG4gICAgICAgICAgICB0YWIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCB0YWJDbGljayk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGlmIChsb2NhdGlvbi5oYXNoKSB7XHJcbiAgICAgICAgICAgIHNldEFjdGl2ZShsb2NhdGlvbi5oYXNoLnN1YnN0cigxKSk7XHJcbiAgICAgICAgfSBlbHNlIGlmICh0YWJzLmxlbmd0aCA+IDApIHtcclxuICAgICAgICAgICAgc2V0QWN0aXZlKHRhYnNbMF0uZGF0YXNldC50YXJnZXQpO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbn1cclxuXHJcbi8vdHJuLmluaXRpYWxpemUoKTtcclxuaWYgKCF3aW5kb3cudHJuX29ial9pbnN0YW5jZSkge1xyXG4gICAgd2luZG93LnRybl9vYmpfaW5zdGFuY2UgPSBuZXcgVG91cm5hbWF0Y2goKTtcclxuXHJcbiAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignbG9hZCcsIGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICAgICAgY29uc3QgdGFiVmlld3MgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tbmF2Jyk7XHJcblxyXG4gICAgICAgIEFycmF5LmZyb20odGFiVmlld3MpLmZvckVhY2goKHRhYikgPT4ge1xyXG4gICAgICAgICAgICB0cm4udGFicyh0YWIpO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBjb25zdCBkcm9wZG93bnMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tZHJvcGRvd24tdG9nZ2xlJyk7XHJcbiAgICAgICAgY29uc3QgaGFuZGxlRHJvcGRvd25DbG9zZSA9ICgpID0+IHtcclxuICAgICAgICAgICAgQXJyYXkuZnJvbShkcm9wZG93bnMpLmZvckVhY2goKGRyb3Bkb3duKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBkcm9wZG93bi5uZXh0RWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LnJlbW92ZSgndHJuLXNob3cnKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIGRvY3VtZW50LnJlbW92ZUV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBoYW5kbGVEcm9wZG93bkNsb3NlLCBmYWxzZSk7XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgQXJyYXkuZnJvbShkcm9wZG93bnMpLmZvckVhY2goKGRyb3Bkb3duKSA9PiB7XHJcbiAgICAgICAgICAgIGRyb3Bkb3duLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSkge1xyXG4gICAgICAgICAgICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcclxuICAgICAgICAgICAgICAgIHRoaXMubmV4dEVsZW1lbnRTaWJsaW5nLmNsYXNzTGlzdC5hZGQoJ3Rybi1zaG93Jyk7XHJcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgaGFuZGxlRHJvcGRvd25DbG9zZSwgZmFsc2UpO1xyXG4gICAgICAgICAgICB9LCBmYWxzZSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgfSwgZmFsc2UpO1xyXG59XHJcbmV4cG9ydCBsZXQgdHJuID0gd2luZG93LnRybl9vYmpfaW5zdGFuY2U7XHJcblxyXG5jbGFzcyBUb3VybmFtYXRjaF9BdXRvY29tcGxldGUge1xyXG5cclxuICAgIC8vIGN1cnJlbnRGb2N1cztcclxuICAgIC8vXHJcbiAgICAvLyBuYW1lSW5wdXQ7XHJcbiAgICAvL1xyXG4gICAgLy8gc2VsZjtcclxuXHJcbiAgICBjb25zdHJ1Y3RvcihpbnB1dCwgZGF0YUNhbGxiYWNrKSB7XHJcbiAgICAgICAgLy8gdGhpcy5zZWxmID0gdGhpcztcclxuICAgICAgICB0aGlzLm5hbWVJbnB1dCA9IGlucHV0O1xyXG5cclxuICAgICAgICB0aGlzLm5hbWVJbnB1dC5hZGRFdmVudExpc3RlbmVyKFwiaW5wdXRcIiwgKCkgPT4ge1xyXG4gICAgICAgICAgICBsZXQgYSwgYiwgaSwgdmFsID0gdGhpcy5uYW1lSW5wdXQudmFsdWU7Ly90aGlzLnZhbHVlO1xyXG4gICAgICAgICAgICBsZXQgcGFyZW50ID0gdGhpcy5uYW1lSW5wdXQucGFyZW50Tm9kZTsvL3RoaXMucGFyZW50Tm9kZTtcclxuXHJcbiAgICAgICAgICAgIC8vIGxldCBwID0gbmV3IFByb21pc2UoKHJlc29sdmUsIHJlamVjdCkgPT4ge1xyXG4gICAgICAgICAgICAvLyAgICAgLyogbmVlZCB0byBxdWVyeSBzZXJ2ZXIgZm9yIG5hbWVzIGhlcmUuICovXHJcbiAgICAgICAgICAgIC8vICAgICBsZXQgeGhyID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIub3BlbignR0VUJywgb3B0aW9ucy5hcGlfdXJsICsgJ3BsYXllcnMvP3NlYXJjaD0nICsgdmFsICsgJyZwZXJfcGFnZT01Jyk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignQ29udGVudC1UeXBlJywgJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNldFJlcXVlc3RIZWFkZXIoJ1gtV1AtTm9uY2UnLCBvcHRpb25zLnJlc3Rfbm9uY2UpO1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICBpZiAoeGhyLnN0YXR1cyA9PT0gMjAwKSB7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIC8vIHJlc29sdmUoSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpLm1hcCgocGxheWVyKSA9PiB7cmV0dXJuIHsgJ3ZhbHVlJzogcGxheWVyLmlkLCAndGV4dCc6IHBsYXllci5uYW1lIH07fSkpO1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICByZXNvbHZlKEpTT04ucGFyc2UoeGhyLnJlc3BvbnNlKS5tYXAoKHBsYXllcikgPT4ge3JldHVybiBwbGF5ZXIubmFtZTt9KSk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgcmVqZWN0KCk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgfVxyXG4gICAgICAgICAgICAvLyAgICAgfTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZW5kKCk7XHJcbiAgICAgICAgICAgIC8vIH0pO1xyXG4gICAgICAgICAgICBkYXRhQ2FsbGJhY2sodmFsKS50aGVuKChkYXRhKSA9PiB7Ly9wLnRoZW4oKGRhdGEpID0+IHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGRhdGEpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qY2xvc2UgYW55IGFscmVhZHkgb3BlbiBsaXN0cyBvZiBhdXRvLWNvbXBsZXRlZCB2YWx1ZXMqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKCk7XHJcbiAgICAgICAgICAgICAgICBpZiAoIXZhbCkgeyByZXR1cm4gZmFsc2U7fVxyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMgPSAtMTtcclxuXHJcbiAgICAgICAgICAgICAgICAvKmNyZWF0ZSBhIERJViBlbGVtZW50IHRoYXQgd2lsbCBjb250YWluIHRoZSBpdGVtcyAodmFsdWVzKToqL1xyXG4gICAgICAgICAgICAgICAgYSA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJESVZcIik7XHJcbiAgICAgICAgICAgICAgICBhLnNldEF0dHJpYnV0ZShcImlkXCIsIHRoaXMubmFtZUlucHV0LmlkICsgXCItYXV0by1jb21wbGV0ZS1saXN0XCIpO1xyXG4gICAgICAgICAgICAgICAgYS5zZXRBdHRyaWJ1dGUoXCJjbGFzc1wiLCBcInRybi1hdXRvLWNvbXBsZXRlLWl0ZW1zXCIpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qYXBwZW5kIHRoZSBESVYgZWxlbWVudCBhcyBhIGNoaWxkIG9mIHRoZSBhdXRvLWNvbXBsZXRlIGNvbnRhaW5lcjoqL1xyXG4gICAgICAgICAgICAgICAgcGFyZW50LmFwcGVuZENoaWxkKGEpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qZm9yIGVhY2ggaXRlbSBpbiB0aGUgYXJyYXkuLi4qL1xyXG4gICAgICAgICAgICAgICAgZm9yIChpID0gMDsgaSA8IGRhdGEubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgICAgICAgICBsZXQgdGV4dCwgdmFsdWU7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8qIFdoaWNoIGZvcm1hdCBkaWQgdGhleSBnaXZlIHVzLiAqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh0eXBlb2YgZGF0YVtpXSA9PT0gJ29iamVjdCcpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dCA9IGRhdGFbaV1bJ3RleHQnXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBkYXRhW2ldWyd2YWx1ZSddO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQgPSBkYXRhW2ldO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IGRhdGFbaV07XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgICAgICAvKmNoZWNrIGlmIHRoZSBpdGVtIHN0YXJ0cyB3aXRoIHRoZSBzYW1lIGxldHRlcnMgYXMgdGhlIHRleHQgZmllbGQgdmFsdWU6Ki9cclxuICAgICAgICAgICAgICAgICAgICBpZiAodGV4dC5zdWJzdHIoMCwgdmFsLmxlbmd0aCkudG9VcHBlckNhc2UoKSA9PT0gdmFsLnRvVXBwZXJDYXNlKCkpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLypjcmVhdGUgYSBESVYgZWxlbWVudCBmb3IgZWFjaCBtYXRjaGluZyBlbGVtZW50OiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwiRElWXCIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKm1ha2UgdGhlIG1hdGNoaW5nIGxldHRlcnMgYm9sZDoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCA9IFwiPHN0cm9uZz5cIiArIHRleHQuc3Vic3RyKDAsIHZhbC5sZW5ndGgpICsgXCI8L3N0cm9uZz5cIjtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5pbm5lckhUTUwgKz0gdGV4dC5zdWJzdHIodmFsLmxlbmd0aCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmluc2VydCBhIGlucHV0IGZpZWxkIHRoYXQgd2lsbCBob2xkIHRoZSBjdXJyZW50IGFycmF5IGl0ZW0ncyB2YWx1ZToqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCArPSBcIjxpbnB1dCB0eXBlPSdoaWRkZW4nIHZhbHVlPSdcIiArIHZhbHVlICsgXCInPlwiO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5kYXRhc2V0LnZhbHVlID0gdmFsdWU7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuZGF0YXNldC50ZXh0ID0gdGV4dDtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHdoZW4gc29tZW9uZSBjbGlja3Mgb24gdGhlIGl0ZW0gdmFsdWUgKERJViBlbGVtZW50KToqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coYGl0ZW0gY2xpY2tlZCB3aXRoIHZhbHVlICR7ZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudmFsdWV9YCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLyogaW5zZXJ0IHRoZSB2YWx1ZSBmb3IgdGhlIGF1dG9jb21wbGV0ZSB0ZXh0IGZpZWxkOiAqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQudmFsdWUgPSBlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC50ZXh0O1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQuZGF0YXNldC5zZWxlY3RlZElkID0gZS5jdXJyZW50VGFyZ2V0LmRhdGFzZXQudmFsdWU7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLyogY2xvc2UgdGhlIGxpc3Qgb2YgYXV0b2NvbXBsZXRlZCB2YWx1ZXMsIChvciBhbnkgb3RoZXIgb3BlbiBsaXN0cyBvZiBhdXRvY29tcGxldGVkIHZhbHVlczoqL1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5uYW1lSW5wdXQuZGlzcGF0Y2hFdmVudChuZXcgRXZlbnQoJ2NoYW5nZScpKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGEuYXBwZW5kQ2hpbGQoYik7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gcHJlc3NlcyBhIGtleSBvbiB0aGUga2V5Ym9hcmQ6Ki9cclxuICAgICAgICB0aGlzLm5hbWVJbnB1dC5hZGRFdmVudExpc3RlbmVyKFwia2V5ZG93blwiLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICBsZXQgeCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRoaXMubmFtZUlucHV0LmlkICsgXCItYXV0by1jb21wbGV0ZS1saXN0XCIpO1xyXG4gICAgICAgICAgICBpZiAoeCkgeCA9IHguZ2V0RWxlbWVudHNCeVRhZ05hbWUoXCJkaXZcIik7XHJcbiAgICAgICAgICAgIGlmIChlLmtleUNvZGUgPT09IDQwKSB7XHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBhcnJvdyBET1dOIGtleSBpcyBwcmVzc2VkLFxyXG4gICAgICAgICAgICAgICAgIGluY3JlYXNlIHRoZSBjdXJyZW50Rm9jdXMgdmFyaWFibGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzKys7XHJcbiAgICAgICAgICAgICAgICAvKmFuZCBhbmQgbWFrZSB0aGUgY3VycmVudCBpdGVtIG1vcmUgdmlzaWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5hZGRBY3RpdmUoeCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09PSAzOCkgeyAvL3VwXHJcbiAgICAgICAgICAgICAgICAvKklmIHRoZSBhcnJvdyBVUCBrZXkgaXMgcHJlc3NlZCxcclxuICAgICAgICAgICAgICAgICBkZWNyZWFzZSB0aGUgY3VycmVudEZvY3VzIHZhcmlhYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cy0tO1xyXG4gICAgICAgICAgICAgICAgLyphbmQgYW5kIG1ha2UgdGhlIGN1cnJlbnQgaXRlbSBtb3JlIHZpc2libGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuYWRkQWN0aXZlKHgpO1xyXG4gICAgICAgICAgICB9IGVsc2UgaWYgKGUua2V5Q29kZSA9PT0gMTMpIHtcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIEVOVEVSIGtleSBpcyBwcmVzc2VkLCBwcmV2ZW50IHRoZSBmb3JtIGZyb20gYmVpbmcgc3VibWl0dGVkLCovXHJcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPiAtMSkge1xyXG4gICAgICAgICAgICAgICAgICAgIC8qYW5kIHNpbXVsYXRlIGEgY2xpY2sgb24gdGhlIFwiYWN0aXZlXCIgaXRlbToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh4KSB4W3RoaXMuY3VycmVudEZvY3VzXS5jbGljaygpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8qZXhlY3V0ZSBhIGZ1bmN0aW9uIHdoZW4gc29tZW9uZSBjbGlja3MgaW4gdGhlIGRvY3VtZW50OiovXHJcbiAgICAgICAgZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgIHRoaXMuY2xvc2VBbGxMaXN0cyhlLnRhcmdldCk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgYWRkQWN0aXZlKHgpIHtcclxuICAgICAgICAvKmEgZnVuY3Rpb24gdG8gY2xhc3NpZnkgYW4gaXRlbSBhcyBcImFjdGl2ZVwiOiovXHJcbiAgICAgICAgaWYgKCF4KSByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgLypzdGFydCBieSByZW1vdmluZyB0aGUgXCJhY3RpdmVcIiBjbGFzcyBvbiBhbGwgaXRlbXM6Ki9cclxuICAgICAgICB0aGlzLnJlbW92ZUFjdGl2ZSh4KTtcclxuICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPj0geC5sZW5ndGgpIHRoaXMuY3VycmVudEZvY3VzID0gMDtcclxuICAgICAgICBpZiAodGhpcy5jdXJyZW50Rm9jdXMgPCAwKSB0aGlzLmN1cnJlbnRGb2N1cyA9ICh4Lmxlbmd0aCAtIDEpO1xyXG4gICAgICAgIC8qYWRkIGNsYXNzIFwiYXV0b2NvbXBsZXRlLWFjdGl2ZVwiOiovXHJcbiAgICAgICAgeFt0aGlzLmN1cnJlbnRGb2N1c10uY2xhc3NMaXN0LmFkZChcInRybi1hdXRvLWNvbXBsZXRlLWFjdGl2ZVwiKTtcclxuICAgIH1cclxuXHJcbiAgICByZW1vdmVBY3RpdmUoeCkge1xyXG4gICAgICAgIC8qYSBmdW5jdGlvbiB0byByZW1vdmUgdGhlIFwiYWN0aXZlXCIgY2xhc3MgZnJvbSBhbGwgYXV0b2NvbXBsZXRlIGl0ZW1zOiovXHJcbiAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCB4Lmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgIHhbaV0uY2xhc3NMaXN0LnJlbW92ZShcInRybi1hdXRvLWNvbXBsZXRlLWFjdGl2ZVwiKTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG4gICAgY2xvc2VBbGxMaXN0cyhlbGVtZW50KSB7XHJcbiAgICAgICAgY29uc29sZS5sb2coXCJjbG9zZSBhbGwgbGlzdHNcIik7XHJcbiAgICAgICAgLypjbG9zZSBhbGwgYXV0b2NvbXBsZXRlIGxpc3RzIGluIHRoZSBkb2N1bWVudCxcclxuICAgICAgICAgZXhjZXB0IHRoZSBvbmUgcGFzc2VkIGFzIGFuIGFyZ3VtZW50OiovXHJcbiAgICAgICAgbGV0IHggPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKFwidHJuLWF1dG8tY29tcGxldGUtaXRlbXNcIik7XHJcbiAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCB4Lmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgICAgIGlmIChlbGVtZW50ICE9PSB4W2ldICYmIGVsZW1lbnQgIT09IHRoaXMubmFtZUlucHV0KSB7XHJcbiAgICAgICAgICAgICAgICB4W2ldLnBhcmVudE5vZGUucmVtb3ZlQ2hpbGQoeFtpXSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9XHJcbn1cclxuXHJcbi8vIEZpcnN0LCBjaGVja3MgaWYgaXQgaXNuJ3QgaW1wbGVtZW50ZWQgeWV0LlxyXG5pZiAoIVN0cmluZy5wcm90b3R5cGUuZm9ybWF0KSB7XHJcbiAgICBTdHJpbmcucHJvdG90eXBlLmZvcm1hdCA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIGNvbnN0IGFyZ3MgPSBhcmd1bWVudHM7XHJcbiAgICAgICAgcmV0dXJuIHRoaXMucmVwbGFjZSgveyhcXGQrKX0vZywgZnVuY3Rpb24obWF0Y2gsIG51bWJlcikge1xyXG4gICAgICAgICAgICByZXR1cm4gdHlwZW9mIGFyZ3NbbnVtYmVyXSAhPT0gJ3VuZGVmaW5lZCdcclxuICAgICAgICAgICAgICAgID8gYXJnc1tudW1iZXJdXHJcbiAgICAgICAgICAgICAgICA6IG1hdGNoXHJcbiAgICAgICAgICAgICAgICA7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9O1xyXG59IiwiLy8gVGhlIG1vZHVsZSBjYWNoZVxudmFyIF9fd2VicGFja19tb2R1bGVfY2FjaGVfXyA9IHt9O1xuXG4vLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcblx0dmFyIGNhY2hlZE1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF07XG5cdGlmIChjYWNoZWRNb2R1bGUgIT09IHVuZGVmaW5lZCkge1xuXHRcdHJldHVybiBjYWNoZWRNb2R1bGUuZXhwb3J0cztcblx0fVxuXHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuXHR2YXIgbW9kdWxlID0gX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fW21vZHVsZUlkXSA9IHtcblx0XHQvLyBubyBtb2R1bGUuaWQgbmVlZGVkXG5cdFx0Ly8gbm8gbW9kdWxlLmxvYWRlZCBuZWVkZWRcblx0XHRleHBvcnRzOiB7fVxuXHR9O1xuXG5cdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuXHRfX3dlYnBhY2tfbW9kdWxlc19fW21vZHVsZUlkXShtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuXHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuXHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG59XG5cbiIsIi8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb25zIGZvciBoYXJtb255IGV4cG9ydHNcbl9fd2VicGFja19yZXF1aXJlX18uZCA9IChleHBvcnRzLCBkZWZpbml0aW9uKSA9PiB7XG5cdGZvcih2YXIga2V5IGluIGRlZmluaXRpb24pIHtcblx0XHRpZihfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZGVmaW5pdGlvbiwga2V5KSAmJiAhX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIGtleSkpIHtcblx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBrZXksIHsgZW51bWVyYWJsZTogdHJ1ZSwgZ2V0OiBkZWZpbml0aW9uW2tleV0gfSk7XG5cdFx0fVxuXHR9XG59OyIsIl9fd2VicGFja19yZXF1aXJlX18ubyA9IChvYmosIHByb3ApID0+IChPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqLCBwcm9wKSkiLCIvLyBkZWZpbmUgX19lc01vZHVsZSBvbiBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLnIgPSAoZXhwb3J0cykgPT4ge1xuXHRpZih0eXBlb2YgU3ltYm9sICE9PSAndW5kZWZpbmVkJyAmJiBTeW1ib2wudG9TdHJpbmdUYWcpIHtcblx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgU3ltYm9sLnRvU3RyaW5nVGFnLCB7IHZhbHVlOiAnTW9kdWxlJyB9KTtcblx0fVxuXHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgJ19fZXNNb2R1bGUnLCB7IHZhbHVlOiB0cnVlIH0pO1xufTsiLCIvKipcclxuICogQ3JlYXRlIHRlYW0gZm9ybS5cclxuICpcclxuICogQGxpbmsgICAgICAgaHR0cHM6Ly93d3cudG91cm5hbWF0Y2guY29tXHJcbiAqIEBzaW5jZSAgICAgIDMuOC4wXHJcbiAqXHJcbiAqIEBwYWNrYWdlICAgIFRvdXJuYW1hdGNoXHJcbiAqXHJcbiAqL1xyXG5pbXBvcnQgeyB0cm4gfSBmcm9tICcuL3RvdXJuYW1hdGNoLmpzJztcclxuXHJcbihmdW5jdGlvbiAoJCkge1xyXG4gICAgJ3VzZSBzdHJpY3QnO1xyXG5cclxuICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGxldCBmb3JtID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi1jcmVhdGUtdGVhbS1mb3JtJyk7XHJcbiAgICAgICAgZm9ybS5hZGRFdmVudExpc3RlbmVyKCdzdWJtaXQnLCBmdW5jdGlvbiAoZXZlbnQpIHtcclxuICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XHJcblxyXG4gICAgICAgICAgICAvLyBSZXNldCB0aGlzIG9uIGVhY2ggc3VibWl0LlxyXG4gICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLXRlYW0tbmFtZScpLnNldEN1c3RvbVZhbGlkaXR5KCcnKTtcclxuICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi10ZWFtLW5hbWUtZXJyb3InKS5pbm5lclRleHQgPSB0cm5fY3JlYXRlX3RlYW1fb3B0aW9ucy50ZWFtX25hbWVfcmVxdWlyZWRfbWVzc2FnZTtcclxuXHJcbiAgICAgICAgICAgIGlmIChmb3JtLmNoZWNrVmFsaWRpdHkoKSA9PT0gdHJ1ZSkge1xyXG4gICAgICAgICAgICAgICAgbGV0IHhociA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAgICAgeGhyLm9wZW4oJ1BPU1QnLCB0cm5fY3JlYXRlX3RlYW1fb3B0aW9ucy5hcGlfdXJsKTtcclxuICAgICAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdDb250ZW50LVR5cGUnLCAnYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkJyk7XHJcbiAgICAgICAgICAgICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1XUC1Ob25jZScsIHRybl9jcmVhdGVfdGVhbV9vcHRpb25zLnJlc3Rfbm9uY2UpO1xyXG4gICAgICAgICAgICAgICAgeGhyLm9ubG9hZCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoeGhyLnN0YXR1cyA9PT0gMjAwKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpLmRhdGEucmVkaXJlY3RfbGluaztcclxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyh4aHIucmVzcG9uc2UpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndHJuLXRlYW0tbmFtZScpLnNldEN1c3RvbVZhbGlkaXR5KHRybl9jcmVhdGVfdGVhbV9vcHRpb25zLnRlYW1fbmFtZV9kdXBsaWNhdGVfbWVzc2FnZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tdGVhbS1uYW1lLWVycm9yJykuaW5uZXJUZXh0ID0gdHJuX2NyZWF0ZV90ZWFtX29wdGlvbnMudGVhbV9uYW1lX2R1cGxpY2F0ZV9tZXNzYWdlO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH07XHJcblxyXG4gICAgICAgICAgICAgICAgeGhyLnNlbmQoJC5wYXJhbSh7XHJcbiAgICAgICAgICAgICAgICAgICAgbmFtZTogZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Rybi10ZWFtLW5hbWUnKS52YWx1ZSxcclxuICAgICAgICAgICAgICAgICAgICB0YWc6IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0cm4tdGVhbS10YWcnKS52YWx1ZVxyXG4gICAgICAgICAgICAgICAgfSkpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIGZvcm0uY2xhc3NMaXN0LmFkZCgndHJuLXdhcy12YWxpZGF0ZWQnKTtcclxuICAgICAgICB9LCBmYWxzZSk7XHJcbiAgICB9LCBmYWxzZSk7XHJcbn0pKHRybik7Il0sIm5hbWVzIjpbIl90eXBlb2YiLCJvIiwiU3ltYm9sIiwiaXRlcmF0b3IiLCJjb25zdHJ1Y3RvciIsInByb3RvdHlwZSIsIl9jbGFzc0NhbGxDaGVjayIsImEiLCJuIiwiVHlwZUVycm9yIiwiX2RlZmluZVByb3BlcnRpZXMiLCJlIiwiciIsInQiLCJsZW5ndGgiLCJlbnVtZXJhYmxlIiwiY29uZmlndXJhYmxlIiwid3JpdGFibGUiLCJPYmplY3QiLCJkZWZpbmVQcm9wZXJ0eSIsIl90b1Byb3BlcnR5S2V5Iiwia2V5IiwiX2NyZWF0ZUNsYXNzIiwiaSIsIl90b1ByaW1pdGl2ZSIsInRvUHJpbWl0aXZlIiwiY2FsbCIsIlN0cmluZyIsIk51bWJlciIsIlRvdXJuYW1hdGNoIiwiZXZlbnRzIiwidmFsdWUiLCJwYXJhbSIsIm9iamVjdCIsInByZWZpeCIsInN0ciIsInByb3AiLCJoYXNPd25Qcm9wZXJ0eSIsImsiLCJ2IiwicHVzaCIsImVuY29kZVVSSUNvbXBvbmVudCIsImpvaW4iLCJldmVudCIsImV2ZW50TmFtZSIsIkV2ZW50VGFyZ2V0IiwiYXV0b2NvbXBsZXRlIiwiaW5wdXQiLCJkYXRhQ2FsbGJhY2siLCJUb3VybmFtYXRjaF9BdXRvY29tcGxldGUiLCJ1Y2ZpcnN0IiwicyIsImNoYXJBdCIsInRvVXBwZXJDYXNlIiwic2xpY2UiLCJvcmRpbmFsX3N1ZmZpeCIsIm51bWJlciIsInJlbWFpbmRlciIsInRhYnMiLCJlbGVtZW50IiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsInBhbmVzIiwiZG9jdW1lbnQiLCJjbGVhckFjdGl2ZSIsIkFycmF5IiwiZm9yRWFjaCIsInRhYiIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFyaWFTZWxlY3RlZCIsInBhbmUiLCJzZXRBY3RpdmUiLCJ0YXJnZXRJZCIsInRhcmdldFRhYiIsInF1ZXJ5U2VsZWN0b3IiLCJ0YXJnZXRQYW5lSWQiLCJkYXRhc2V0IiwidGFyZ2V0IiwiYWRkIiwiZ2V0RWxlbWVudEJ5SWQiLCJ0YWJDbGljayIsImN1cnJlbnRUYXJnZXQiLCJwcmV2ZW50RGVmYXVsdCIsImFkZEV2ZW50TGlzdGVuZXIiLCJsb2NhdGlvbiIsImhhc2giLCJzdWJzdHIiLCJ3aW5kb3ciLCJ0cm5fb2JqX2luc3RhbmNlIiwidGFiVmlld3MiLCJmcm9tIiwidHJuIiwiZHJvcGRvd25zIiwiaGFuZGxlRHJvcGRvd25DbG9zZSIsImRyb3Bkb3duIiwibmV4dEVsZW1lbnRTaWJsaW5nIiwicmVtb3ZlRXZlbnRMaXN0ZW5lciIsInN0b3BQcm9wYWdhdGlvbiIsIl90aGlzIiwibmFtZUlucHV0IiwiYiIsInZhbCIsInBhcmVudCIsInBhcmVudE5vZGUiLCJ0aGVuIiwiZGF0YSIsImNvbnNvbGUiLCJsb2ciLCJjbG9zZUFsbExpc3RzIiwiY3VycmVudEZvY3VzIiwiY3JlYXRlRWxlbWVudCIsInNldEF0dHJpYnV0ZSIsImlkIiwiYXBwZW5kQ2hpbGQiLCJ0ZXh0IiwiaW5uZXJIVE1MIiwiY29uY2F0Iiwic2VsZWN0ZWRJZCIsImRpc3BhdGNoRXZlbnQiLCJFdmVudCIsIngiLCJnZXRFbGVtZW50c0J5VGFnTmFtZSIsImtleUNvZGUiLCJhZGRBY3RpdmUiLCJjbGljayIsInJlbW92ZUFjdGl2ZSIsInJlbW92ZUNoaWxkIiwiZm9ybWF0IiwiYXJncyIsImFyZ3VtZW50cyIsInJlcGxhY2UiLCJtYXRjaCIsIiQiLCJmb3JtIiwic2V0Q3VzdG9tVmFsaWRpdHkiLCJpbm5lclRleHQiLCJ0cm5fY3JlYXRlX3RlYW1fb3B0aW9ucyIsInRlYW1fbmFtZV9yZXF1aXJlZF9tZXNzYWdlIiwiY2hlY2tWYWxpZGl0eSIsInhociIsIlhNTEh0dHBSZXF1ZXN0Iiwib3BlbiIsImFwaV91cmwiLCJzZXRSZXF1ZXN0SGVhZGVyIiwicmVzdF9ub25jZSIsIm9ubG9hZCIsInN0YXR1cyIsImhyZWYiLCJKU09OIiwicGFyc2UiLCJyZXNwb25zZSIsInJlZGlyZWN0X2xpbmsiLCJ0ZWFtX25hbWVfZHVwbGljYXRlX21lc3NhZ2UiLCJzZW5kIiwibmFtZSIsInRhZyJdLCJzb3VyY2VSb290IjoiIn0=
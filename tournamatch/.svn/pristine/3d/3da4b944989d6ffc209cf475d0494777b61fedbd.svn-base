/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
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
/*!*******************************!*\
  !*** ./src/js/tournamatch.js ***!
  \*******************************/
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
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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LE9BQU8sS0FBSzZELENBQUMsQ0FBQ2pHLENBQUMsQ0FBQyxJQUFJb0MsT0FBTyxLQUFLLElBQUksQ0FBQ3dDLFNBQVMsRUFBRTtVQUNoRHFCLENBQUMsQ0FBQ2pHLENBQUMsQ0FBQyxDQUFDZ0YsVUFBVSxDQUFDdUIsV0FBVyxDQUFDTixDQUFDLENBQUNqRyxDQUFDLENBQUMsQ0FBQztRQUNyQztNQUNKO0lBQ0o7RUFBQztBQUFBLEtBR0w7QUFDQSxJQUFJLENBQUNJLE1BQU0sQ0FBQ3RCLFNBQVMsQ0FBQzBILE1BQU0sRUFBRTtFQUMxQnBHLE1BQU0sQ0FBQ3RCLFNBQVMsQ0FBQzBILE1BQU0sR0FBRyxZQUFXO0lBQ2pDLElBQU1DLElBQUksR0FBR0MsU0FBUztJQUN0QixPQUFPLElBQUksQ0FBQ0MsT0FBTyxDQUFDLFVBQVUsRUFBRSxVQUFTQyxLQUFLLEVBQUUzRSxNQUFNLEVBQUU7TUFDcEQsT0FBTyxPQUFPd0UsSUFBSSxDQUFDeEUsTUFBTSxDQUFDLEtBQUssV0FBVyxHQUNwQ3dFLElBQUksQ0FBQ3hFLE1BQU0sQ0FBQyxHQUNaMkUsS0FBSztJQUVmLENBQUMsQ0FBQztFQUNOLENBQUM7QUFDTCxDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2RlZmluZSBwcm9wZXJ0eSBnZXR0ZXJzIiwid2VicGFjazovL3RvdXJuYW1hdGNoL3dlYnBhY2svcnVudGltZS9oYXNPd25Qcm9wZXJ0eSBzaG9ydGhhbmQiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL21ha2UgbmFtZXNwYWNlIG9iamVjdCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC8uL3NyYy9qcy90b3VybmFtYXRjaC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyBUaGUgcmVxdWlyZSBzY29wZVxudmFyIF9fd2VicGFja19yZXF1aXJlX18gPSB7fTtcblxuIiwiLy8gZGVmaW5lIGdldHRlciBmdW5jdGlvbnMgZm9yIGhhcm1vbnkgZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5kID0gKGV4cG9ydHMsIGRlZmluaXRpb24pID0+IHtcblx0Zm9yKHZhciBrZXkgaW4gZGVmaW5pdGlvbikge1xuXHRcdGlmKF9fd2VicGFja19yZXF1aXJlX18ubyhkZWZpbml0aW9uLCBrZXkpICYmICFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywga2V5KSkge1xuXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIGtleSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGRlZmluaXRpb25ba2V5XSB9KTtcblx0XHR9XG5cdH1cbn07IiwiX193ZWJwYWNrX3JlcXVpcmVfXy5vID0gKG9iaiwgcHJvcCkgPT4gKE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmosIHByb3ApKSIsIi8vIGRlZmluZSBfX2VzTW9kdWxlIG9uIGV4cG9ydHNcbl9fd2VicGFja19yZXF1aXJlX18uciA9IChleHBvcnRzKSA9PiB7XG5cdGlmKHR5cGVvZiBTeW1ib2wgIT09ICd1bmRlZmluZWQnICYmIFN5bWJvbC50b1N0cmluZ1RhZykge1xuXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBTeW1ib2wudG9TdHJpbmdUYWcsIHsgdmFsdWU6ICdNb2R1bGUnIH0pO1xuXHR9XG5cdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCAnX19lc01vZHVsZScsIHsgdmFsdWU6IHRydWUgfSk7XG59OyIsIid1c2Ugc3RyaWN0JztcclxuY2xhc3MgVG91cm5hbWF0Y2gge1xyXG5cclxuICAgIGNvbnN0cnVjdG9yKCkge1xyXG4gICAgICAgIHRoaXMuZXZlbnRzID0ge307XHJcbiAgICB9XHJcblxyXG4gICAgcGFyYW0ob2JqZWN0LCBwcmVmaXgpIHtcclxuICAgICAgICBsZXQgc3RyID0gW107XHJcbiAgICAgICAgZm9yIChsZXQgcHJvcCBpbiBvYmplY3QpIHtcclxuICAgICAgICAgICAgaWYgKG9iamVjdC5oYXNPd25Qcm9wZXJ0eShwcm9wKSkge1xyXG4gICAgICAgICAgICAgICAgbGV0IGsgPSBwcmVmaXggPyBwcmVmaXggKyBcIltcIiArIHByb3AgKyBcIl1cIiA6IHByb3A7XHJcbiAgICAgICAgICAgICAgICBsZXQgdiA9IG9iamVjdFtwcm9wXTtcclxuICAgICAgICAgICAgICAgIHN0ci5wdXNoKCh2ICE9PSBudWxsICYmIHR5cGVvZiB2ID09PSBcIm9iamVjdFwiKSA/IHRoaXMucGFyYW0odiwgaykgOiBlbmNvZGVVUklDb21wb25lbnQoaykgKyBcIj1cIiArIGVuY29kZVVSSUNvbXBvbmVudCh2KSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuIHN0ci5qb2luKFwiJlwiKTtcclxuICAgIH1cclxuXHJcbiAgICBldmVudChldmVudE5hbWUpIHtcclxuICAgICAgICBpZiAoIShldmVudE5hbWUgaW4gdGhpcy5ldmVudHMpKSB7XHJcbiAgICAgICAgICAgIHRoaXMuZXZlbnRzW2V2ZW50TmFtZV0gPSBuZXcgRXZlbnRUYXJnZXQoZXZlbnROYW1lKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgcmV0dXJuIHRoaXMuZXZlbnRzW2V2ZW50TmFtZV07XHJcbiAgICB9XHJcblxyXG4gICAgYXV0b2NvbXBsZXRlKGlucHV0LCBkYXRhQ2FsbGJhY2spIHtcclxuICAgICAgICBuZXcgVG91cm5hbWF0Y2hfQXV0b2NvbXBsZXRlKGlucHV0LCBkYXRhQ2FsbGJhY2spO1xyXG4gICAgfVxyXG5cclxuICAgIHVjZmlyc3Qocykge1xyXG4gICAgICAgIGlmICh0eXBlb2YgcyAhPT0gJ3N0cmluZycpIHJldHVybiAnJztcclxuICAgICAgICByZXR1cm4gcy5jaGFyQXQoMCkudG9VcHBlckNhc2UoKSArIHMuc2xpY2UoMSk7XHJcbiAgICB9XHJcblxyXG4gICAgb3JkaW5hbF9zdWZmaXgobnVtYmVyKSB7XHJcbiAgICAgICAgY29uc3QgcmVtYWluZGVyID0gbnVtYmVyICUgMTAwO1xyXG5cclxuICAgICAgICBpZiAoKHJlbWFpbmRlciA8IDExKSB8fCAocmVtYWluZGVyID4gMTMpKSB7XHJcbiAgICAgICAgICAgIHN3aXRjaCAocmVtYWluZGVyICUgMTApIHtcclxuICAgICAgICAgICAgICAgIGNhc2UgMTogcmV0dXJuICdzdCc7XHJcbiAgICAgICAgICAgICAgICBjYXNlIDI6IHJldHVybiAnbmQnO1xyXG4gICAgICAgICAgICAgICAgY2FzZSAzOiByZXR1cm4gJ3JkJztcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgICAgICByZXR1cm4gJ3RoJztcclxuICAgIH1cclxuXHJcbiAgICB0YWJzKGVsZW1lbnQpIHtcclxuICAgICAgICBjb25zdCB0YWJzID0gZWxlbWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCd0cm4tbmF2LWxpbmsnKTtcclxuICAgICAgICBjb25zdCBwYW5lcyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi10YWItcGFuZScpO1xyXG4gICAgICAgIGNvbnN0IGNsZWFyQWN0aXZlID0gKCkgPT4ge1xyXG4gICAgICAgICAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKHRhYnMsICh0YWIpID0+IHtcclxuICAgICAgICAgICAgICAgIHRhYi5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tbmF2LWFjdGl2ZScpO1xyXG4gICAgICAgICAgICAgICAgdGFiLmFyaWFTZWxlY3RlZCA9IGZhbHNlO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChwYW5lcywgcGFuZSA9PiBwYW5lLmNsYXNzTGlzdC5yZW1vdmUoJ3Rybi10YWItYWN0aXZlJykpO1xyXG4gICAgICAgIH07XHJcbiAgICAgICAgY29uc3Qgc2V0QWN0aXZlID0gKHRhcmdldElkKSA9PiB7XHJcbiAgICAgICAgICAgIGNvbnN0IHRhcmdldFRhYiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ2FbaHJlZj1cIiMnICsgdGFyZ2V0SWQgKyAnXCJdLnRybi1uYXYtbGluaycpO1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRQYW5lSWQgPSB0YXJnZXRUYWIgJiYgdGFyZ2V0VGFiLmRhdGFzZXQgJiYgdGFyZ2V0VGFiLmRhdGFzZXQudGFyZ2V0IHx8IGZhbHNlO1xyXG5cclxuICAgICAgICAgICAgaWYgKHRhcmdldFBhbmVJZCkge1xyXG4gICAgICAgICAgICAgICAgY2xlYXJBY3RpdmUoKTtcclxuICAgICAgICAgICAgICAgIHRhcmdldFRhYi5jbGFzc0xpc3QuYWRkKCd0cm4tbmF2LWFjdGl2ZScpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0VGFiLmFyaWFTZWxlY3RlZCA9IHRydWU7XHJcblxyXG4gICAgICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQodGFyZ2V0UGFuZUlkKS5jbGFzc0xpc3QuYWRkKCd0cm4tdGFiLWFjdGl2ZScpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuICAgICAgICBjb25zdCB0YWJDbGljayA9IChldmVudCkgPT4ge1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRUYWIgPSBldmVudC5jdXJyZW50VGFyZ2V0O1xyXG4gICAgICAgICAgICBjb25zdCB0YXJnZXRQYW5lSWQgPSB0YXJnZXRUYWIgJiYgdGFyZ2V0VGFiLmRhdGFzZXQgJiYgdGFyZ2V0VGFiLmRhdGFzZXQudGFyZ2V0IHx8IGZhbHNlO1xyXG5cclxuICAgICAgICAgICAgaWYgKHRhcmdldFBhbmVJZCkge1xyXG4gICAgICAgICAgICAgICAgc2V0QWN0aXZlKHRhcmdldFBhbmVJZCk7XHJcbiAgICAgICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuXHJcbiAgICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbCh0YWJzLCAodGFiKSA9PiB7XHJcbiAgICAgICAgICAgIHRhYi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHRhYkNsaWNrKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgaWYgKGxvY2F0aW9uLmhhc2gpIHtcclxuICAgICAgICAgICAgc2V0QWN0aXZlKGxvY2F0aW9uLmhhc2guc3Vic3RyKDEpKTtcclxuICAgICAgICB9IGVsc2UgaWYgKHRhYnMubGVuZ3RoID4gMCkge1xyXG4gICAgICAgICAgICBzZXRBY3RpdmUodGFic1swXS5kYXRhc2V0LnRhcmdldCk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxufVxyXG5cclxuLy90cm4uaW5pdGlhbGl6ZSgpO1xyXG5pZiAoIXdpbmRvdy50cm5fb2JqX2luc3RhbmNlKSB7XHJcbiAgICB3aW5kb3cudHJuX29ial9pbnN0YW5jZSA9IG5ldyBUb3VybmFtYXRjaCgpO1xyXG5cclxuICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZnVuY3Rpb24gKCkge1xyXG5cclxuICAgICAgICBjb25zdCB0YWJWaWV3cyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1uYXYnKTtcclxuXHJcbiAgICAgICAgQXJyYXkuZnJvbSh0YWJWaWV3cykuZm9yRWFjaCgodGFiKSA9PiB7XHJcbiAgICAgICAgICAgIHRybi50YWJzKHRhYik7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIGNvbnN0IGRyb3Bkb3ducyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3Rybi1kcm9wZG93bi10b2dnbGUnKTtcclxuICAgICAgICBjb25zdCBoYW5kbGVEcm9wZG93bkNsb3NlID0gKCkgPT4ge1xyXG4gICAgICAgICAgICBBcnJheS5mcm9tKGRyb3Bkb3ducykuZm9yRWFjaCgoZHJvcGRvd24pID0+IHtcclxuICAgICAgICAgICAgICAgIGRyb3Bkb3duLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tc2hvdycpO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgZG9jdW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGhhbmRsZURyb3Bkb3duQ2xvc2UsIGZhbHNlKTtcclxuICAgICAgICB9O1xyXG5cclxuICAgICAgICBBcnJheS5mcm9tKGRyb3Bkb3ducykuZm9yRWFjaCgoZHJvcGRvd24pID0+IHtcclxuICAgICAgICAgICAgZHJvcGRvd24uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgICAgICAgICAgICAgdGhpcy5uZXh0RWxlbWVudFNpYmxpbmcuY2xhc3NMaXN0LmFkZCgndHJuLXNob3cnKTtcclxuICAgICAgICAgICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBoYW5kbGVEcm9wZG93bkNsb3NlLCBmYWxzZSk7XHJcbiAgICAgICAgICAgIH0sIGZhbHNlKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICB9LCBmYWxzZSk7XHJcbn1cclxuZXhwb3J0IGxldCB0cm4gPSB3aW5kb3cudHJuX29ial9pbnN0YW5jZTtcclxuXHJcbmNsYXNzIFRvdXJuYW1hdGNoX0F1dG9jb21wbGV0ZSB7XHJcblxyXG4gICAgLy8gY3VycmVudEZvY3VzO1xyXG4gICAgLy9cclxuICAgIC8vIG5hbWVJbnB1dDtcclxuICAgIC8vXHJcbiAgICAvLyBzZWxmO1xyXG5cclxuICAgIGNvbnN0cnVjdG9yKGlucHV0LCBkYXRhQ2FsbGJhY2spIHtcclxuICAgICAgICAvLyB0aGlzLnNlbGYgPSB0aGlzO1xyXG4gICAgICAgIHRoaXMubmFtZUlucHV0ID0gaW5wdXQ7XHJcblxyXG4gICAgICAgIHRoaXMubmFtZUlucHV0LmFkZEV2ZW50TGlzdGVuZXIoXCJpbnB1dFwiLCAoKSA9PiB7XHJcbiAgICAgICAgICAgIGxldCBhLCBiLCBpLCB2YWwgPSB0aGlzLm5hbWVJbnB1dC52YWx1ZTsvL3RoaXMudmFsdWU7XHJcbiAgICAgICAgICAgIGxldCBwYXJlbnQgPSB0aGlzLm5hbWVJbnB1dC5wYXJlbnROb2RlOy8vdGhpcy5wYXJlbnROb2RlO1xyXG5cclxuICAgICAgICAgICAgLy8gbGV0IHAgPSBuZXcgUHJvbWlzZSgocmVzb2x2ZSwgcmVqZWN0KSA9PiB7XHJcbiAgICAgICAgICAgIC8vICAgICAvKiBuZWVkIHRvIHF1ZXJ5IHNlcnZlciBmb3IgbmFtZXMgaGVyZS4gKi9cclxuICAgICAgICAgICAgLy8gICAgIGxldCB4aHIgPSBuZXcgWE1MSHR0cFJlcXVlc3QoKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5vcGVuKCdHRVQnLCBvcHRpb25zLmFwaV91cmwgKyAncGxheWVycy8/c2VhcmNoPScgKyB2YWwgKyAnJnBlcl9wYWdlPTUnKTtcclxuICAgICAgICAgICAgLy8gICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdDb250ZW50LVR5cGUnLCAnYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkJyk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIuc2V0UmVxdWVzdEhlYWRlcignWC1XUC1Ob25jZScsIG9wdGlvbnMucmVzdF9ub25jZSk7XHJcbiAgICAgICAgICAgIC8vICAgICB4aHIub25sb2FkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgIGlmICh4aHIuc3RhdHVzID09PSAyMDApIHtcclxuICAgICAgICAgICAgLy8gICAgICAgICAgICAgLy8gcmVzb2x2ZShKU09OLnBhcnNlKHhoci5yZXNwb25zZSkubWFwKChwbGF5ZXIpID0+IHtyZXR1cm4geyAndmFsdWUnOiBwbGF5ZXIuaWQsICd0ZXh0JzogcGxheWVyLm5hbWUgfTt9KSk7XHJcbiAgICAgICAgICAgIC8vICAgICAgICAgICAgIHJlc29sdmUoSlNPTi5wYXJzZSh4aHIucmVzcG9uc2UpLm1hcCgocGxheWVyKSA9PiB7cmV0dXJuIHBsYXllci5uYW1lO30pKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAvLyAgICAgICAgICAgICByZWplY3QoKTtcclxuICAgICAgICAgICAgLy8gICAgICAgICB9XHJcbiAgICAgICAgICAgIC8vICAgICB9O1xyXG4gICAgICAgICAgICAvLyAgICAgeGhyLnNlbmQoKTtcclxuICAgICAgICAgICAgLy8gfSk7XHJcbiAgICAgICAgICAgIGRhdGFDYWxsYmFjayh2YWwpLnRoZW4oKGRhdGEpID0+IHsvL3AudGhlbigoZGF0YSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XHJcblxyXG4gICAgICAgICAgICAgICAgLypjbG9zZSBhbnkgYWxyZWFkeSBvcGVuIGxpc3RzIG9mIGF1dG8tY29tcGxldGVkIHZhbHVlcyovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoKTtcclxuICAgICAgICAgICAgICAgIGlmICghdmFsKSB7IHJldHVybiBmYWxzZTt9XHJcbiAgICAgICAgICAgICAgICB0aGlzLmN1cnJlbnRGb2N1cyA9IC0xO1xyXG5cclxuICAgICAgICAgICAgICAgIC8qY3JlYXRlIGEgRElWIGVsZW1lbnQgdGhhdCB3aWxsIGNvbnRhaW4gdGhlIGl0ZW1zICh2YWx1ZXMpOiovXHJcbiAgICAgICAgICAgICAgICBhID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcIkRJVlwiKTtcclxuICAgICAgICAgICAgICAgIGEuc2V0QXR0cmlidXRlKFwiaWRcIiwgdGhpcy5uYW1lSW5wdXQuaWQgKyBcIi1hdXRvLWNvbXBsZXRlLWxpc3RcIik7XHJcbiAgICAgICAgICAgICAgICBhLnNldEF0dHJpYnV0ZShcImNsYXNzXCIsIFwidHJuLWF1dG8tY29tcGxldGUtaXRlbXNcIik7XHJcblxyXG4gICAgICAgICAgICAgICAgLyphcHBlbmQgdGhlIERJViBlbGVtZW50IGFzIGEgY2hpbGQgb2YgdGhlIGF1dG8tY29tcGxldGUgY29udGFpbmVyOiovXHJcbiAgICAgICAgICAgICAgICBwYXJlbnQuYXBwZW5kQ2hpbGQoYSk7XHJcblxyXG4gICAgICAgICAgICAgICAgLypmb3IgZWFjaCBpdGVtIGluIHRoZSBhcnJheS4uLiovXHJcbiAgICAgICAgICAgICAgICBmb3IgKGkgPSAwOyBpIDwgZGF0YS5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgICAgICAgICAgICAgIGxldCB0ZXh0LCB2YWx1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLyogV2hpY2ggZm9ybWF0IGRpZCB0aGV5IGdpdmUgdXMuICovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHR5cGVvZiBkYXRhW2ldID09PSAnb2JqZWN0Jykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0ZXh0ID0gZGF0YVtpXVsndGV4dCddO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IGRhdGFbaV1bJ3ZhbHVlJ107XHJcbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGV4dCA9IGRhdGFbaV07XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbHVlID0gZGF0YVtpXTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIC8qY2hlY2sgaWYgdGhlIGl0ZW0gc3RhcnRzIHdpdGggdGhlIHNhbWUgbGV0dGVycyBhcyB0aGUgdGV4dCBmaWVsZCB2YWx1ZToqL1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh0ZXh0LnN1YnN0cigwLCB2YWwubGVuZ3RoKS50b1VwcGVyQ2FzZSgpID09PSB2YWwudG9VcHBlckNhc2UoKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvKmNyZWF0ZSBhIERJViBlbGVtZW50IGZvciBlYWNoIG1hdGNoaW5nIGVsZW1lbnQ6Ki9cclxuICAgICAgICAgICAgICAgICAgICAgICAgYiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJESVZcIik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qbWFrZSB0aGUgbWF0Y2hpbmcgbGV0dGVycyBib2xkOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MID0gXCI8c3Ryb25nPlwiICsgdGV4dC5zdWJzdHIoMCwgdmFsLmxlbmd0aCkgKyBcIjwvc3Ryb25nPlwiO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmlubmVySFRNTCArPSB0ZXh0LnN1YnN0cih2YWwubGVuZ3RoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC8qaW5zZXJ0IGEgaW5wdXQgZmllbGQgdGhhdCB3aWxsIGhvbGQgdGhlIGN1cnJlbnQgYXJyYXkgaXRlbSdzIHZhbHVlOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuaW5uZXJIVE1MICs9IFwiPGlucHV0IHR5cGU9J2hpZGRlbicgdmFsdWU9J1wiICsgdmFsdWUgKyBcIic+XCI7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICBiLmRhdGFzZXQudmFsdWUgPSB2YWx1ZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYi5kYXRhc2V0LnRleHQgPSB0ZXh0O1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gd2hlbiBzb21lb25lIGNsaWNrcyBvbiB0aGUgaXRlbSB2YWx1ZSAoRElWIGVsZW1lbnQpOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGIuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhgaXRlbSBjbGlja2VkIHdpdGggdmFsdWUgJHtlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC52YWx1ZX1gKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvKiBpbnNlcnQgdGhlIHZhbHVlIGZvciB0aGUgYXV0b2NvbXBsZXRlIHRleHQgZmllbGQ6ICovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC52YWx1ZSA9IGUuY3VycmVudFRhcmdldC5kYXRhc2V0LnRleHQ7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC5kYXRhc2V0LnNlbGVjdGVkSWQgPSBlLmN1cnJlbnRUYXJnZXQuZGF0YXNldC52YWx1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvKiBjbG9zZSB0aGUgbGlzdCBvZiBhdXRvY29tcGxldGVkIHZhbHVlcywgKG9yIGFueSBvdGhlciBvcGVuIGxpc3RzIG9mIGF1dG9jb21wbGV0ZWQgdmFsdWVzOiovXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLmNsb3NlQWxsTGlzdHMoKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLm5hbWVJbnB1dC5kaXNwYXRjaEV2ZW50KG5ldyBFdmVudCgnY2hhbmdlJykpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYS5hcHBlbmRDaGlsZChiKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvKmV4ZWN1dGUgYSBmdW5jdGlvbiBwcmVzc2VzIGEga2V5IG9uIHRoZSBrZXlib2FyZDoqL1xyXG4gICAgICAgIHRoaXMubmFtZUlucHV0LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXlkb3duXCIsIChlKSA9PiB7XHJcbiAgICAgICAgICAgIGxldCB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQodGhpcy5uYW1lSW5wdXQuaWQgKyBcIi1hdXRvLWNvbXBsZXRlLWxpc3RcIik7XHJcbiAgICAgICAgICAgIGlmICh4KSB4ID0geC5nZXRFbGVtZW50c0J5VGFnTmFtZShcImRpdlwiKTtcclxuICAgICAgICAgICAgaWYgKGUua2V5Q29kZSA9PT0gNDApIHtcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIGFycm93IERPV04ga2V5IGlzIHByZXNzZWQsXHJcbiAgICAgICAgICAgICAgICAgaW5jcmVhc2UgdGhlIGN1cnJlbnRGb2N1cyB2YXJpYWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5jdXJyZW50Rm9jdXMrKztcclxuICAgICAgICAgICAgICAgIC8qYW5kIGFuZCBtYWtlIHRoZSBjdXJyZW50IGl0ZW0gbW9yZSB2aXNpYmxlOiovXHJcbiAgICAgICAgICAgICAgICB0aGlzLmFkZEFjdGl2ZSh4KTtcclxuICAgICAgICAgICAgfSBlbHNlIGlmIChlLmtleUNvZGUgPT09IDM4KSB7IC8vdXBcclxuICAgICAgICAgICAgICAgIC8qSWYgdGhlIGFycm93IFVQIGtleSBpcyBwcmVzc2VkLFxyXG4gICAgICAgICAgICAgICAgIGRlY3JlYXNlIHRoZSBjdXJyZW50Rm9jdXMgdmFyaWFibGU6Ki9cclxuICAgICAgICAgICAgICAgIHRoaXMuY3VycmVudEZvY3VzLS07XHJcbiAgICAgICAgICAgICAgICAvKmFuZCBhbmQgbWFrZSB0aGUgY3VycmVudCBpdGVtIG1vcmUgdmlzaWJsZToqL1xyXG4gICAgICAgICAgICAgICAgdGhpcy5hZGRBY3RpdmUoeCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoZS5rZXlDb2RlID09PSAxMykge1xyXG4gICAgICAgICAgICAgICAgLypJZiB0aGUgRU5URVIga2V5IGlzIHByZXNzZWQsIHByZXZlbnQgdGhlIGZvcm0gZnJvbSBiZWluZyBzdWJtaXR0ZWQsKi9cclxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA+IC0xKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgLyphbmQgc2ltdWxhdGUgYSBjbGljayBvbiB0aGUgXCJhY3RpdmVcIiBpdGVtOiovXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHgpIHhbdGhpcy5jdXJyZW50Rm9jdXNdLmNsaWNrKCk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgLypleGVjdXRlIGEgZnVuY3Rpb24gd2hlbiBzb21lb25lIGNsaWNrcyBpbiB0aGUgZG9jdW1lbnQ6Ki9cclxuICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcclxuICAgICAgICAgICAgdGhpcy5jbG9zZUFsbExpc3RzKGUudGFyZ2V0KTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICBhZGRBY3RpdmUoeCkge1xyXG4gICAgICAgIC8qYSBmdW5jdGlvbiB0byBjbGFzc2lmeSBhbiBpdGVtIGFzIFwiYWN0aXZlXCI6Ki9cclxuICAgICAgICBpZiAoIXgpIHJldHVybiBmYWxzZTtcclxuICAgICAgICAvKnN0YXJ0IGJ5IHJlbW92aW5nIHRoZSBcImFjdGl2ZVwiIGNsYXNzIG9uIGFsbCBpdGVtczoqL1xyXG4gICAgICAgIHRoaXMucmVtb3ZlQWN0aXZlKHgpO1xyXG4gICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA+PSB4Lmxlbmd0aCkgdGhpcy5jdXJyZW50Rm9jdXMgPSAwO1xyXG4gICAgICAgIGlmICh0aGlzLmN1cnJlbnRGb2N1cyA8IDApIHRoaXMuY3VycmVudEZvY3VzID0gKHgubGVuZ3RoIC0gMSk7XHJcbiAgICAgICAgLyphZGQgY2xhc3MgXCJhdXRvY29tcGxldGUtYWN0aXZlXCI6Ki9cclxuICAgICAgICB4W3RoaXMuY3VycmVudEZvY3VzXS5jbGFzc0xpc3QuYWRkKFwidHJuLWF1dG8tY29tcGxldGUtYWN0aXZlXCIpO1xyXG4gICAgfVxyXG5cclxuICAgIHJlbW92ZUFjdGl2ZSh4KSB7XHJcbiAgICAgICAgLyphIGZ1bmN0aW9uIHRvIHJlbW92ZSB0aGUgXCJhY3RpdmVcIiBjbGFzcyBmcm9tIGFsbCBhdXRvY29tcGxldGUgaXRlbXM6Ki9cclxuICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IHgubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgeFtpXS5jbGFzc0xpc3QucmVtb3ZlKFwidHJuLWF1dG8tY29tcGxldGUtYWN0aXZlXCIpO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxuXHJcbiAgICBjbG9zZUFsbExpc3RzKGVsZW1lbnQpIHtcclxuICAgICAgICBjb25zb2xlLmxvZyhcImNsb3NlIGFsbCBsaXN0c1wiKTtcclxuICAgICAgICAvKmNsb3NlIGFsbCBhdXRvY29tcGxldGUgbGlzdHMgaW4gdGhlIGRvY3VtZW50LFxyXG4gICAgICAgICBleGNlcHQgdGhlIG9uZSBwYXNzZWQgYXMgYW4gYXJndW1lbnQ6Ki9cclxuICAgICAgICBsZXQgeCA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoXCJ0cm4tYXV0by1jb21wbGV0ZS1pdGVtc1wiKTtcclxuICAgICAgICBmb3IgKGxldCBpID0gMDsgaSA8IHgubGVuZ3RoOyBpKyspIHtcclxuICAgICAgICAgICAgaWYgKGVsZW1lbnQgIT09IHhbaV0gJiYgZWxlbWVudCAhPT0gdGhpcy5uYW1lSW5wdXQpIHtcclxuICAgICAgICAgICAgICAgIHhbaV0ucGFyZW50Tm9kZS5yZW1vdmVDaGlsZCh4W2ldKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgIH1cclxufVxyXG5cclxuLy8gRmlyc3QsIGNoZWNrcyBpZiBpdCBpc24ndCBpbXBsZW1lbnRlZCB5ZXQuXHJcbmlmICghU3RyaW5nLnByb3RvdHlwZS5mb3JtYXQpIHtcclxuICAgIFN0cmluZy5wcm90b3R5cGUuZm9ybWF0ID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgY29uc3QgYXJncyA9IGFyZ3VtZW50cztcclxuICAgICAgICByZXR1cm4gdGhpcy5yZXBsYWNlKC97KFxcZCspfS9nLCBmdW5jdGlvbihtYXRjaCwgbnVtYmVyKSB7XHJcbiAgICAgICAgICAgIHJldHVybiB0eXBlb2YgYXJnc1tudW1iZXJdICE9PSAndW5kZWZpbmVkJ1xyXG4gICAgICAgICAgICAgICAgPyBhcmdzW251bWJlcl1cclxuICAgICAgICAgICAgICAgIDogbWF0Y2hcclxuICAgICAgICAgICAgICAgIDtcclxuICAgICAgICB9KTtcclxuICAgIH07XHJcbn0iXSwibmFtZXMiOlsiX3R5cGVvZiIsIm8iLCJTeW1ib2wiLCJpdGVyYXRvciIsImNvbnN0cnVjdG9yIiwicHJvdG90eXBlIiwiX2NsYXNzQ2FsbENoZWNrIiwiYSIsIm4iLCJUeXBlRXJyb3IiLCJfZGVmaW5lUHJvcGVydGllcyIsImUiLCJyIiwidCIsImxlbmd0aCIsImVudW1lcmFibGUiLCJjb25maWd1cmFibGUiLCJ3cml0YWJsZSIsIk9iamVjdCIsImRlZmluZVByb3BlcnR5IiwiX3RvUHJvcGVydHlLZXkiLCJrZXkiLCJfY3JlYXRlQ2xhc3MiLCJpIiwiX3RvUHJpbWl0aXZlIiwidG9QcmltaXRpdmUiLCJjYWxsIiwiU3RyaW5nIiwiTnVtYmVyIiwiVG91cm5hbWF0Y2giLCJldmVudHMiLCJ2YWx1ZSIsInBhcmFtIiwib2JqZWN0IiwicHJlZml4Iiwic3RyIiwicHJvcCIsImhhc093blByb3BlcnR5IiwiayIsInYiLCJwdXNoIiwiZW5jb2RlVVJJQ29tcG9uZW50Iiwiam9pbiIsImV2ZW50IiwiZXZlbnROYW1lIiwiRXZlbnRUYXJnZXQiLCJhdXRvY29tcGxldGUiLCJpbnB1dCIsImRhdGFDYWxsYmFjayIsIlRvdXJuYW1hdGNoX0F1dG9jb21wbGV0ZSIsInVjZmlyc3QiLCJzIiwiY2hhckF0IiwidG9VcHBlckNhc2UiLCJzbGljZSIsIm9yZGluYWxfc3VmZml4IiwibnVtYmVyIiwicmVtYWluZGVyIiwidGFicyIsImVsZW1lbnQiLCJnZXRFbGVtZW50c0J5Q2xhc3NOYW1lIiwicGFuZXMiLCJkb2N1bWVudCIsImNsZWFyQWN0aXZlIiwiQXJyYXkiLCJmb3JFYWNoIiwidGFiIiwiY2xhc3NMaXN0IiwicmVtb3ZlIiwiYXJpYVNlbGVjdGVkIiwicGFuZSIsInNldEFjdGl2ZSIsInRhcmdldElkIiwidGFyZ2V0VGFiIiwicXVlcnlTZWxlY3RvciIsInRhcmdldFBhbmVJZCIsImRhdGFzZXQiLCJ0YXJnZXQiLCJhZGQiLCJnZXRFbGVtZW50QnlJZCIsInRhYkNsaWNrIiwiY3VycmVudFRhcmdldCIsInByZXZlbnREZWZhdWx0IiwiYWRkRXZlbnRMaXN0ZW5lciIsImxvY2F0aW9uIiwiaGFzaCIsInN1YnN0ciIsIndpbmRvdyIsInRybl9vYmpfaW5zdGFuY2UiLCJ0YWJWaWV3cyIsImZyb20iLCJ0cm4iLCJkcm9wZG93bnMiLCJoYW5kbGVEcm9wZG93bkNsb3NlIiwiZHJvcGRvd24iLCJuZXh0RWxlbWVudFNpYmxpbmciLCJyZW1vdmVFdmVudExpc3RlbmVyIiwic3RvcFByb3BhZ2F0aW9uIiwiX3RoaXMiLCJuYW1lSW5wdXQiLCJiIiwidmFsIiwicGFyZW50IiwicGFyZW50Tm9kZSIsInRoZW4iLCJkYXRhIiwiY29uc29sZSIsImxvZyIsImNsb3NlQWxsTGlzdHMiLCJjdXJyZW50Rm9jdXMiLCJjcmVhdGVFbGVtZW50Iiwic2V0QXR0cmlidXRlIiwiaWQiLCJhcHBlbmRDaGlsZCIsInRleHQiLCJpbm5lckhUTUwiLCJjb25jYXQiLCJzZWxlY3RlZElkIiwiZGlzcGF0Y2hFdmVudCIsIkV2ZW50IiwieCIsImdldEVsZW1lbnRzQnlUYWdOYW1lIiwia2V5Q29kZSIsImFkZEFjdGl2ZSIsImNsaWNrIiwicmVtb3ZlQWN0aXZlIiwicmVtb3ZlQ2hpbGQiLCJmb3JtYXQiLCJhcmdzIiwiYXJndW1lbnRzIiwicmVwbGFjZSIsIm1hdGNoIl0sInNvdXJjZVJvb3QiOiIifQ==
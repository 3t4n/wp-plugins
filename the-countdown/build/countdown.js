/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/attributes.js":
/*!***************************!*\
  !*** ./src/attributes.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   attributes: () => (/* binding */ attributes),
/* harmony export */   templateStyles: () => (/* binding */ templateStyles)
/* harmony export */ });
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils */ "./src/utils.js");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
const {
  __
} = wp.i18n;
const {
  applyFilters
} = wp.hooks;

/**
 * Internal dependencies
 */

const templateStyles = applyFilters('tc_template_styles', {
  'default': {
    digitSize: '2.5rem',
    labelSize: '1.2rem',
    digitPad: '0.3rem',
    labelPad: '0.2rem',
    gap: '1rem',
    minWidth: '18%',
    digitColor: '#ffffff',
    digitBgColor: '#487ea8',
    labelColor: '',
    labelBgColor: ''
  },
  'minimal': {
    separator: ' : ',
    fontSize: '',
    fontWeight: '400',
    fontColor: ''
  },
  'flip': {
    digitSize: '2.7rem',
    labelSize: '1rem',
    width: '5rem',
    height: '7rem',
    gap: '1rem',
    digitColor: '#eeeeee',
    digitBgColor: '#272727',
    labelColor: '',
    labelBgColor: '',
    backgroundColor: ''
  },
  'scoreboard': {
    labelSize: '0.8rem',
    digitSize: '3rem',
    gap: '0rem',
    width: '90%',
    digitColor: '#ffffff',
    digitBgColor: '#40acda',
    labelColor: '#ffffff',
    labelBgColor: '#286189'
  },
  'circular': {
    digitSize: '4rem',
    labelSize: '1.8rem',
    digitTop: '40%',
    labelTop: '60%',
    gap: '1rem',
    width: '100%',
    baseSize: '16px',
    progressSize: '16px',
    baseColor: '#e0e0e0',
    progressColor: '#54b342',
    digitColor: '#111111',
    labelColor: '#a4a4a4',
    labelBgColor: '',
    backgroundColor: ''
  }
});

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
const attributes = {
  clientId: {
    type: 'string',
    default: ''
  },
  mode: {
    type: 'string',
    default: 'until'
  },
  // the time
  dateTime: {
    type: 'string',
    default: (0,_utils__WEBPACK_IMPORTED_MODULE_0__.daysFromNow)(30)
  },
  // the time
  format: {
    type: 'array',
    default: ['days', 'hours', 'minutes', 'seconds']
  },
  labels1: {
    type: 'array',
    default: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second']
  },
  labels: {
    type: 'array',
    default: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds']
  },
  padZeroes: {
    type: 'boolean',
    default: true
  },
  hideonExpiry: {
    type: 'boolean',
    default: false
  },
  onExpiry: {
    type: 'string',
    default: 'show_message'
  },
  expiryText: {
    type: 'string',
    default: __('Expired', 'the-countdown')
  },
  expiryURL: {
    type: 'string',
    default: ''
  },
  expiryFunction: {
    type: 'string',
    default: ''
  },
  onTick: {
    type: 'string',
    default: ''
  },
  tickInterval: {
    type: 'integer',
    default: 1
  },
  relative: {
    type: 'string',
    default: '+5d'
  },
  template: {
    type: 'string',
    default: 'default'
  },
  styles: {
    type: 'object',
    default: templateStyles.default
  }
};

/***/ }),

/***/ "./src/countdown.js":
/*!**************************!*\
  !*** ./src/countdown.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/dom-ready */ "@wordpress/dom-ready");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _attributes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./attributes */ "./src/attributes.js");
/* harmony import */ var _lib_rAF_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./lib/rAF.js */ "./src/lib/rAF.js");
/* harmony import */ var _lib_rAF_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_lib_rAF_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _timer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./timer.js */ "./src/timer.js");

const {
  createRoot,
  createElement
} = wp.element;



_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0___default()(function () {
  console.log('DOM is ready.');

  // Adjust default attributes by value only
  Object.keys(_attributes__WEBPACK_IMPORTED_MODULE_1__.attributes).forEach(function (key, index) {
    _attributes__WEBPACK_IMPORTED_MODULE_1__.attributes[key] = _attributes__WEBPACK_IMPORTED_MODULE_1__.attributes[key].default;
  });
  const domElements = document.getElementsByClassName("the-countdown");
  for (let i = 0; i < domElements.length; i++) {
    let getDomID = domElements[i].id.replaceAll('-', ''); // Adjust the var name
    let varName = window['tc_' + getDomID];
    const atts = {
      ..._attributes__WEBPACK_IMPORTED_MODULE_1__.attributes,
      ...varName
    }; // merge with default

    const domElement = domElements[i];
    const uiElement = createElement(_timer_js__WEBPACK_IMPORTED_MODULE_3__["default"], atts);
    if (createRoot) {
      createRoot(domElement).render(uiElement);
    } else {
      render(uiElement, domElement);
    }
  }
});

/***/ }),

/***/ "./src/lib/countdown.min.js":
/*!**********************************!*\
  !*** ./src/lib/countdown.min.js ***!
  \**********************************/
/***/ ((module) => {

/*
 countdown.js v2.6.1 http://countdownjs.org
 Copyright (c)2006-2014 Stephen M. McKamey.
 Licensed under The MIT License.
*/
var countdown = function () {
  function z(a, b) {
    var c = a.getTime();
    a.setMonth(a.getMonth() + b);
    return Math.round((a.getTime() - c) / 864E5);
  }
  function v(a) {
    var b = a.getTime(),
      c = new Date(b);
    c.setMonth(a.getMonth() + 1);
    return Math.round((c.getTime() - b) / 864E5);
  }
  function w(a, b) {
    b = b instanceof Date || null !== b && isFinite(b) ? new Date(+b) : new Date();
    if (!a) return b;
    var c = +a.value || 0;
    if (c) return b.setTime(b.getTime() + c), b;
    (c = +a.milliseconds || 0) && b.setMilliseconds(b.getMilliseconds() + c);
    (c = +a.seconds || 0) && b.setSeconds(b.getSeconds() + c);
    (c = +a.minutes || 0) && b.setMinutes(b.getMinutes() + c);
    (c = +a.hours || 0) && b.setHours(b.getHours() + c);
    (c = +a.weeks || 0) && (c *= 7);
    (c += +a.days || 0) && b.setDate(b.getDate() + c);
    (c = +a.months || 0) && b.setMonth(b.getMonth() + c);
    (c = +a.millennia || 0) && (c *= 10);
    (c += +a.centuries || 0) && (c *= 10);
    (c += +a.decades || 0) && (c *= 10);
    (c += +a.years || 0) && b.setFullYear(b.getFullYear() + c);
    return b;
  }
  function C(a, b) {
    return x(a) + (1 === a ? p[b] : q[b]);
  }
  function n() {}
  function k(a, b, c, e, l, d) {
    0 <= a[c] && (b += a[c], delete a[c]);
    b /= l;
    if (1 >= b + 1) return 0;
    if (0 <= a[e]) {
      a[e] = +(a[e] + b).toFixed(d);
      switch (e) {
        case "seconds":
          if (60 !== a.seconds || isNaN(a.minutes)) break;
          a.minutes++;
          a.seconds = 0;
        case "minutes":
          if (60 !== a.minutes || isNaN(a.hours)) break;
          a.hours++;
          a.minutes = 0;
        case "hours":
          if (24 !== a.hours || isNaN(a.days)) break;
          a.days++;
          a.hours = 0;
        case "days":
          if (7 !== a.days || isNaN(a.weeks)) break;
          a.weeks++;
          a.days = 0;
        case "weeks":
          if (a.weeks !== v(a.refMonth) / 7 || isNaN(a.months)) break;
          a.months++;
          a.weeks = 0;
        case "months":
          if (12 !== a.months || isNaN(a.years)) break;
          a.years++;
          a.months = 0;
        case "years":
          if (10 !== a.years || isNaN(a.decades)) break;
          a.decades++;
          a.years = 0;
        case "decades":
          if (10 !== a.decades || isNaN(a.centuries)) break;
          a.centuries++;
          a.decades = 0;
        case "centuries":
          if (10 !== a.centuries || isNaN(a.millennia)) break;
          a.millennia++;
          a.centuries = 0;
      }
      return 0;
    }
    return b;
  }
  function A(a, b, c, e, l, d) {
    var f = new Date();
    a.start = b = b || f;
    a.end = c = c || f;
    a.units = e;
    a.value = c.getTime() - b.getTime();
    0 > a.value && (f = c, c = b, b = f);
    a.refMonth = new Date(b.getFullYear(), b.getMonth(), 15, 12, 0, 0);
    try {
      a.millennia = 0;
      a.centuries = 0;
      a.decades = 0;
      a.years = c.getFullYear() - b.getFullYear();
      a.months = c.getMonth() - b.getMonth();
      a.weeks = 0;
      a.days = c.getDate() - b.getDate();
      a.hours = c.getHours() - b.getHours();
      a.minutes = c.getMinutes() - b.getMinutes();
      a.seconds = c.getSeconds() - b.getSeconds();
      a.milliseconds = c.getMilliseconds() - b.getMilliseconds();
      var g;
      0 > a.milliseconds ? (g = s(-a.milliseconds / 1E3), a.seconds -= g, a.milliseconds += 1E3 * g) : 1E3 <= a.milliseconds && (a.seconds += m(a.milliseconds / 1E3), a.milliseconds %= 1E3);
      0 > a.seconds ? (g = s(-a.seconds / 60), a.minutes -= g, a.seconds += 60 * g) : 60 <= a.seconds && (a.minutes += m(a.seconds / 60), a.seconds %= 60);
      0 > a.minutes ? (g = s(-a.minutes / 60), a.hours -= g, a.minutes += 60 * g) : 60 <= a.minutes && (a.hours += m(a.minutes / 60), a.minutes %= 60);
      0 > a.hours ? (g = s(-a.hours / 24), a.days -= g, a.hours += 24 * g) : 24 <= a.hours && (a.days += m(a.hours / 24), a.hours %= 24);
      for (; 0 > a.days;) a.months--, a.days += z(a.refMonth, 1);
      7 <= a.days && (a.weeks += m(a.days / 7), a.days %= 7);
      0 > a.months ? (g = s(-a.months / 12), a.years -= g, a.months += 12 * g) : 12 <= a.months && (a.years += m(a.months / 12), a.months %= 12);
      10 <= a.years && (a.decades += m(a.years / 10), a.years %= 10, 10 <= a.decades && (a.centuries += m(a.decades / 10), a.decades %= 10, 10 <= a.centuries && (a.millennia += m(a.centuries / 10), a.centuries %= 10)));
      b = 0;
      !(e & 1024) || b >= l ? (a.centuries += 10 * a.millennia, delete a.millennia) : a.millennia && b++;
      !(e & 512) || b >= l ? (a.decades += 10 * a.centuries, delete a.centuries) : a.centuries && b++;
      !(e & 256) || b >= l ? (a.years += 10 * a.decades, delete a.decades) : a.decades && b++;
      !(e & 128) || b >= l ? (a.months += 12 * a.years, delete a.years) : a.years && b++;
      !(e & 64) || b >= l ? (a.months && (a.days += z(a.refMonth, a.months)), delete a.months, 7 <= a.days && (a.weeks += m(a.days / 7), a.days %= 7)) : a.months && b++;
      !(e & 32) || b >= l ? (a.days += 7 * a.weeks, delete a.weeks) : a.weeks && b++;
      !(e & 16) || b >= l ? (a.hours += 24 * a.days, delete a.days) : a.days && b++;
      !(e & 8) || b >= l ? (a.minutes += 60 * a.hours, delete a.hours) : a.hours && b++;
      !(e & 4) || b >= l ? (a.seconds += 60 * a.minutes, delete a.minutes) : a.minutes && b++;
      !(e & 2) || b >= l ? (a.milliseconds += 1E3 * a.seconds, delete a.seconds) : a.seconds && b++;
      if (!(e & 1) || b >= l) {
        var h = k(a, 0, "milliseconds", "seconds", 1E3, d);
        if (h && (h = k(a, h, "seconds", "minutes", 60, d)) && (h = k(a, h, "minutes", "hours", 60, d)) && (h = k(a, h, "hours", "days", 24, d)) && (h = k(a, h, "days", "weeks", 7, d)) && (h = k(a, h, "weeks", "months", v(a.refMonth) / 7, d))) {
          e = h;
          var n,
            p = a.refMonth,
            q = p.getTime(),
            r = new Date(q);
          r.setFullYear(p.getFullYear() + 1);
          n = Math.round((r.getTime() - q) / 864E5);
          if (h = k(a, e, "months", "years", n / v(a.refMonth), d)) if (h = k(a, h, "years", "decades", 10, d)) if (h = k(a, h, "decades", "centuries", 10, d)) if (h = k(a, h, "centuries", "millennia", 10, d)) throw Error("Fractional unit overflow");
        }
      }
    } finally {
      delete a.refMonth;
    }
    return a;
  }
  function d(a, b, c, e, d) {
    var f;
    c = +c || 222;
    e = 0 < e ? e : NaN;
    d = 0 < d ? 20 > d ? Math.round(d) : 20 : 0;
    var k = null;
    "function" === typeof a ? (f = a, a = null) : a instanceof Date || (null !== a && isFinite(a) ? a = new Date(+a) : ("object" === typeof k && (k = a), a = null));
    var g = null;
    "function" === typeof b ? (f = b, b = null) : b instanceof Date || (null !== b && isFinite(b) ? b = new Date(+b) : ("object" === typeof b && (g = b), b = null));
    k && (a = w(k, b));
    g && (b = w(g, a));
    if (!a && !b) return new n();
    if (!f) return A(new n(), a, b, c, e, d);
    var k = c & 1 ? 1E3 / 30 : c & 2 ? 1E3 : c & 4 ? 6E4 : c & 8 ? 36E5 : c & 16 ? 864E5 : 6048E5,
      h,
      g = function () {
        f(A(new n(), a, b, c, e, d), h);
      };
    g();
    return h = setInterval(g, k);
  }
  var s = Math.ceil,
    m = Math.floor,
    p,
    q,
    r,
    t,
    u,
    f,
    x,
    y;
  n.prototype.toString = function (a) {
    var b = y(this),
      c = b.length;
    if (!c) return a ? "" + a : u;
    if (1 === c) return b[0];
    a = r + b.pop();
    return b.join(t) + a;
  };
  n.prototype.toHTML = function (a, b) {
    a = a || "span";
    var c = y(this),
      e = c.length;
    if (!e) return (b = b || u) ? "\x3c" + a + "\x3e" + b + "\x3c/" + a + "\x3e" : b;
    for (var d = 0; d < e; d++) c[d] = "\x3c" + a + "\x3e" + c[d] + "\x3c/" + a + "\x3e";
    if (1 === e) return c[0];
    e = r + c.pop();
    return c.join(t) + e;
  };
  n.prototype.addTo = function (a) {
    return w(this, a);
  };
  y = function (a) {
    var b = [],
      c = a.millennia;
    c && b.push(f(c, 10));
    (c = a.centuries) && b.push(f(c, 9));
    (c = a.decades) && b.push(f(c, 8));
    (c = a.years) && b.push(f(c, 7));
    (c = a.months) && b.push(f(c, 6));
    (c = a.weeks) && b.push(f(c, 5));
    (c = a.days) && b.push(f(c, 4));
    (c = a.hours) && b.push(f(c, 3));
    (c = a.minutes) && b.push(f(c, 2));
    (c = a.seconds) && b.push(f(c, 1));
    (c = a.milliseconds) && b.push(f(c, 0));
    return b;
  };
  d.MILLISECONDS = 1;
  d.SECONDS = 2;
  d.MINUTES = 4;
  d.HOURS = 8;
  d.DAYS = 16;
  d.WEEKS = 32;
  d.MONTHS = 64;
  d.YEARS = 128;
  d.DECADES = 256;
  d.CENTURIES = 512;
  d.MILLENNIA = 1024;
  d.DEFAULTS = 222;
  d.ALL = 2047;
  var D = d.setFormat = function (a) {
      if (a) {
        if ("singular" in a || "plural" in a) {
          var b = a.singular || [];
          b.split && (b = b.split("|"));
          var c = a.plural || [];
          c.split && (c = c.split("|"));
          for (var d = 0; 10 >= d; d++) p[d] = b[d] || p[d], q[d] = c[d] || q[d];
        }
        "string" === typeof a.last && (r = a.last);
        "string" === typeof a.delim && (t = a.delim);
        "string" === typeof a.empty && (u = a.empty);
        "function" === typeof a.formatNumber && (x = a.formatNumber);
        "function" === typeof a.formatter && (f = a.formatter);
      }
    },
    B = d.resetFormat = function () {
      p = " millisecond; second; minute; hour; day; week; month; year; decade; century; millennium".split(";");
      q = " milliseconds; seconds; minutes; hours; days; weeks; months; years; decades; centuries; millennia".split(";");
      r = " and ";
      t = ", ";
      u = "";
      x = function (a) {
        return a;
      };
      f = C;
    };
  d.setLabels = function (a, b, c, d, f, k, m) {
    D({
      singular: a,
      plural: b,
      last: c,
      delim: d,
      empty: f,
      formatNumber: k,
      formatter: m
    });
  };
  d.resetLabels = B;
  B();
   true && module.exports ? module.exports = d : "undefined" !== typeof window && "function" === typeof window.define && "undefined" !== typeof window.define.amd && window.define("countdown", [], function () {
    return d;
  });
  return d;
}();

/***/ }),

/***/ "./src/lib/rAF.js":
/*!************************!*\
  !*** ./src/lib/rAF.js ***!
  \************************/
/***/ (() => {

// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
// http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating

// requestAnimationFrame polyfill by Erik Möller. fixes from Paul Irish and Tino Zijdel

// MIT license

(function () {
  var lastTime = 0;
  var vendors = ['ms', 'moz', 'webkit', 'o'];
  for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
    window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
    window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
  }
  if (!window.requestAnimationFrame) window.requestAnimationFrame = function (callback, element) {
    var currTime = new Date().getTime();
    var timeToCall = Math.max(0, 16 - (currTime - lastTime));
    var id = window.setTimeout(function () {
      callback(currTime + timeToCall);
    }, timeToCall);
    lastTime = currTime + timeToCall;
    return id;
  };
  if (!window.cancelAnimationFrame) window.cancelAnimationFrame = function (id) {
    clearTimeout(id);
  };
})();

/***/ }),

/***/ "./src/relative.js":
/*!*************************!*\
  !*** ./src/relative.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   convertRelativeTime: () => (/* binding */ convertRelativeTime)
/* harmony export */ });
// https://github.com/kbwood/countdown/blob/master/src/js/jquery.countdown.js#L606

var Y = 0; // Years
var O = 1; // Months
var W = 2; // Weeks
var D = 3; // Days
var H = 4; // Hours
var M = 5; // Minutes
var S = 6; // Seconds

const currentDate = new Date();
const _getDaysInMonth = (year, month) => {
  return 32 - new Date(year, month, 32).getDate();
};
const offsetNumeric = offset => {
  // e.g. +300, -2
  var time = new Date();
  time.setTime(time.getTime() + offset * 1000);
  return time;
};
const offsetString = offset => {
  // e.g. '+2d', '-4w', '+3h +30m'
  offset = offset.toLowerCase();
  var time = new Date();
  var year = time.getFullYear();
  var month = time.getMonth();
  var day = time.getDate();
  var hour = time.getHours();
  var minute = time.getMinutes();
  var second = time.getSeconds();
  var pattern = /([+-]?[0-9]+)\s*(s|m|h|d|w|o|y)?/g;
  var matches = pattern.exec(offset);
  while (matches) {
    switch (matches[2] || 's') {
      case 's':
        second += parseInt(matches[1], 10);
        break;
      case 'm':
        minute += parseInt(matches[1], 10);
        break;
      case 'h':
        hour += parseInt(matches[1], 10);
        break;
      case 'd':
        day += parseInt(matches[1], 10);
        break;
      case 'w':
        day += parseInt(matches[1], 10) * 7;
        break;
      case 'o':
        month += parseInt(matches[1], 10);
        day = Math.min(day, _getDaysInMonth(year, month));
        break;
      case 'y':
        year += parseInt(matches[1], 10);
        day = Math.min(day, _getDaysInMonth(year, month));
        break;
    }
    matches = pattern.exec(offset); // repeat to avoid stuck
  }
  return new Date(year, month, day, hour, minute, second, 0);
};
function convertRelativeTime(relative) {
  // e.g. '+2d', '-4w', '+3h +30m'
  return typeof relative === 'string' ? offsetString(relative) : offsetNumeric(relative);
}
;

/***/ }),

/***/ "./src/templates.js":
/*!**************************!*\
  !*** ./src/templates.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Templates)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _utils_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./utils.js */ "./src/utils.js");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
const {
  useEffect,
  useState
} = wp.element;

const {
  applyFilters
} = wp.hooks;


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


function Templates({
  _countdown,
  attributes
}) {
  const {
    expired = false
  } = {
    ..._countdown
  };
  const {
    clientId,
    labels1,
    labels,
    expiryText,
    onExpiry,
    expiryURL,
    hideonExpiry = false,
    format,
    padZeroes,
    styles
  } = {
    ...attributes
  };
  const {
    lineHeight,
    gap
  } = {
    ...styles
  };
  const digits = Object.assign({}, _countdown);
  const defaultFormats = ['years', 'months', 'weeks', 'days', 'hours', 'minutes', 'seconds'];
  if (!!padZeroes) {
    Object.keys(digits).forEach(function (key, index) {
      if (defaultFormats.indexOf(key) > -1) {
        digits[key] = digits[key] < 10 ? '0' + digits[key] : digits[key];
        digits.prevs[key] = digits.prevs[key] < 10 ? '0' + digits.prevs[key] : digits.prevs[key];
      }
      ;
    });
  }
  const getLabel = lbl => {
    const lblPos = defaultFormats.indexOf(lbl.toLowerCase());

    // See countdown sprite { ..._countdown } above
    // Make sure _countdown is ready first
    const isSingle = _countdown && digits[lbl] <= 1 ? true : false;
    return isSingle ? labels1[lblPos] : labels[lblPos];
  };
  const renderDefaultSection = () => {
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    const {
      digitSize,
      labelSize,
      minWidth,
      digitPad,
      labelPad,
      digitColor,
      digitBgColor,
      labelColor,
      labelBgColor
    } = {
      ...styles
    };
    return format.map(unit => {
      const unitStyle = {};
      if (!!minWidth) unitStyle.minWidth = minWidth;
      const amountStyle = {};
      if (!!digitColor) amountStyle.color = digitColor;
      if (!!digitBgColor) amountStyle.backgroundColor = digitBgColor;
      if (!!digitSize) amountStyle.fontSize = digitSize;
      if (!!digitPad) {
        amountStyle.paddingTop = digitPad;
        amountStyle.paddingBottom = digitPad;
      }
      const labelStyle = {};
      if (!!labelColor) labelStyle.color = labelColor;
      if (!!labelBgColor) labelStyle.backgroundColor = labelBgColor;
      if (!!labelSize) labelStyle.fontSize = labelSize;
      if (!!labelPad) {
        labelStyle.paddingTop = labelPad;
        labelStyle.paddingBottom = labelPad;
      }
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        style: unitStyle
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "amount",
        style: amountStyle
      }, digits[unit.toLowerCase()]), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "label",
        style: labelStyle
      }, getLabel(unit)));
    });
  };
  const renderScoreboardSection = () => {
    const {
      digitColor,
      digitSize,
      digitBgColor,
      labelColor,
      labelSize,
      labelBgColor
    } = {
      ...styles
    };
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    const labelStyle = {};
    if (!!labelColor) labelStyle.color = labelColor;
    if (!!labelSize) labelStyle.fontSize = labelSize;
    if (!!labelBgColor) labelStyle.backgroundColor = labelBgColor;
    const digitStyle = {};
    if (!!digitColor) digitStyle.color = digitColor;
    if (!!digitSize) digitStyle.fontSize = digitSize;
    if (!!digitBgColor) digitStyle.backgroundColor = digitBgColor;
    return format.map(unit => {
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "label",
        style: labelStyle
      }, getLabel(unit)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "amount",
        style: digitStyle
      }, digits[unit.toLowerCase()]));
    });
  };
  const renderFlipSection = () => {
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    const {
      width,
      height,
      digitColor,
      digitSize,
      digitBgColor,
      labelColor,
      labelSize,
      labelBgColor
    } = {
      ...styles
    };
    const digitStyle = {};
    if (!!height) digitStyle.height = height;
    if (!!digitSize) digitStyle.fontSize = digitSize;
    if (!!digitColor) digitStyle.color = digitColor;
    const labelStyle = {};
    if (!!labelSize) labelStyle.fontSize = labelSize;
    if (!!labelColor) labelStyle.color = labelColor;
    if (!!labelBgColor) labelStyle.backgroundColor = labelBgColor;
    return format.map(_unit => {
      let unit = _unit.toLowerCase();
      let currentDigit = digits[unit];
      let previousDigit = digits.prevs[unit];
      let shuffle = digits.hasOwnProperty('shuffles') && digits.shuffles.hasOwnProperty(unit) ? digits.shuffles[unit] : true;

      // shuffle digits
      const digit1 = shuffle ? previousDigit : currentDigit;
      const digit2 = !shuffle ? previousDigit : currentDigit;

      // shuffle animations
      const animation1 = shuffle ? 'fold' : 'unfold';
      const animation2 = !shuffle ? 'fold' : 'unfold';
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: 'flipClock',
        style: {
          width
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: 'flipUnitContainer',
        style: digitStyle
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "upperCard",
        style: {
          backgroundColor: digitBgColor
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, currentDigit)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "lowerCard",
        style: {
          backgroundColor: digitBgColor
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, previousDigit)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: `flipCard ${animation1}`,
        style: {
          backgroundColor: digitBgColor
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, digit1)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: `flipCard ${animation2}`,
        style: {
          backgroundColor: digitBgColor
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, digit2))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "label",
        style: labelStyle
      }, getLabel(unit)));
    });
  };
  const renderMinimalSection = () => {
    const {
      separator,
      fontSize,
      fontWeight,
      fontColor
    } = {
      ...styles
    };
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    const arr = format.map(unit => {
      return digits[unit.toLowerCase()] + ' ' + getLabel(unit);
    });
    const spanStyle = {};
    if (!!fontSize) spanStyle.fontSize = fontSize;
    if (!!fontColor) spanStyle.color = fontColor;
    if (!!fontWeight) spanStyle.fontWeight = fontWeight;
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      style: spanStyle
    }, arr.join(separator));
  };
  const renderCircularSection = () => {
    const {
      baseColor,
      progressColor,
      digitColor,
      labelColor,
      digitSize,
      labelSize,
      baseSize,
      progressSize,
      digitTop,
      labelTop
    } = {
      ...styles
    };
    let cirleId = 'tc' + clientId.replaceAll('-', '');

    // Create temporary reminder in the window and check if it is not expired
    if (!window[cirleId] && !digits.expired) {
      window[cirleId] = digits;
    }
    format.sort((a, b) => defaultFormats.indexOf(a) - defaultFormats.indexOf(b));
    return format.map(unit => {
      const fullAmount = {
        year: 10,
        // decade
        months: 12,
        days: 30,
        hours: 24,
        minutes: 60,
        seconds: 60
      };
      const unitLowerCase = unit.toLowerCase();
      const max = fullAmount[unitLowerCase];
      const value = digits[unit.toLowerCase()];
      const size = 200;
      const vBox = '-' + size * 0 + ' -' + size * 0 + ' ' + size + ' ' + size; // display: +- stroke width/2
      const radius = size / 2 - 10;
      const circumference = 3.14159 * radius * 2;
      const percentage = Math.round(circumference * ((max - value) / max)) + 'px';
      const cx = size / 2;
      const cy = size / 2;

      //unitLowerCase === 'minutes' && console.log( 'digit, duration, remaining', digits[ unit.toLowerCase() ], duration, remaining);	

      const progressStroke = _countdown[unit.toLowerCase()] === 0 ? baseColor : progressColor;
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
        width: size,
        height: size,
        viewBox: vBox,
        style: {
          transform: 'rotate(-90deg)'
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
        r: cx - 10,
        cx: cx,
        cy: cy,
        fill: "transparent",
        stroke: baseColor,
        "stroke-width": baseSize
      }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
        r: cx - 10,
        cx: cx,
        cy: cy,
        stroke: progressStroke,
        "stroke-width": progressSize,
        "stroke-linecap": "round",
        "stroke-dashoffset": percentage,
        "stroke-dasharray": circumference,
        fill: "transparent"
      }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("text", {
        x: "100",
        y: "50",
        "font-size": digitSize,
        "text-anchor": "middle",
        "dominant-baseline": "middle",
        style: {
          transform: 'rotate(90deg) translate(0px, -196px)'
        }
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("tspan", {
        x: "100",
        y: digitTop,
        "font-weight": "bold",
        fill: digitColor
      }, value), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("tspan", {
        x: "100",
        y: labelTop,
        "font-weight": "normal",
        fill: labelColor,
        "font-size": labelSize
      }, getLabel(unit))));
    });
  };
  let inlineStyles = {};
  const renderExpiryText = () => {
    switch (onExpiry) {
      case "redirect_url":
        // Redirect to URL is is set to and if expired
        if ('post-php' !== window.adminpage) {
          // if not in admin

          window.setTimeout(() => {
            location.href = expiryURL;
          }, 2000);
          return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
            className: "tc-textCenter"
          }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Redirecting...', 'the-countdown'));
        } else {
          return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
            className: "tc-textCenter"
          }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Redirecting on hold because you are not in front page.', 'the-countdown'));
        }
      default:
        return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
          className: "tc-textCenter"
        }, expiryText);
    }
  };
  const hideIfExpired = () => {
    return !!expired && !!hideonExpiry ? true : false;
  };
  const {
    width
  } = {
    ...styles
  };
  let margin = '0 ' + (100 - parseInt(width)) / 2 + '%';
  switch (attributes.template) {
    case "minimal":
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-minimal"
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderMinimalSection()), !!expired && renderExpiryText());
    case "scoreboard":
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-scoreboard",
        style: {
          width,
          gap
        }
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderScoreboardSection()), !!expired && renderExpiryText());
    case "flip":
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-flip",
        style: {
          lineHeight,
          gap
        }
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderFlipSection()), !!expired && renderExpiryText());
    case "circular":
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-circular",
        style: {
          width,
          gap,
          margin
        }
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderCircularSection()), !!expired && renderExpiryText());
    case "default":
    default:
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, !hideIfExpired() && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "the-countdown tc-template-default",
        style: {
          gap
        }
      }, !(0,_utils_js__WEBPACK_IMPORTED_MODULE_2__.isEmpty)(_countdown) && renderDefaultSection()), !!expired && renderExpiryText());
  }
}

/***/ }),

/***/ "./src/timer.js":
/*!**********************!*\
  !*** ./src/timer.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ CountDownTimer)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _lib_rAF_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./lib/rAF.js */ "./src/lib/rAF.js");
/* harmony import */ var _lib_rAF_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_lib_rAF_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./lib/countdown.min.js */ "./src/lib/countdown.min.js");
/* harmony import */ var _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _relative__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./relative */ "./src/relative.js");
/* harmony import */ var _templates__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./templates */ "./src/templates.js");


const {
  useEffect,
  useState,
  useRef
} = wp.element;
const apiFetch = wp.apiFetch;





// https://codesandbox.io/s/x908rkw8yq?fontsize=14&file=/src/index.js
const fetchServerDateTime = attributes => {
  const [currentDate, setcurrentDate] = useState(null);
  const [loading, setLoading] = useState(true);
  const fetchDateTime = async () => {
    const response = await apiFetch({
      path: 'the-countdown/v1/get-datetime'
    });
    const date = await response;
    setcurrentDate(new Date(date));
    setLoading(false);
  };
  useEffect(() => {
    fetchDateTime();
  }, [attributes.mode, attributes.dateTime, attributes.relative]); // update if dateTime or relative time changed

  return {
    currentDate,
    loading
  };
};
function CountDownTimer(attributes) {
  const {
    dateTime,
    mode,
    tickInterval,
    format,
    onTick,
    onExpiry,
    expiryURL,
    relative
  } = {
    ...attributes
  };
  let units = 0;
  let zeroUnits = {};
  let trueShuffles = {};
  for (let i = 0; i < format.length; i++) {
    units = units + (_lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default())[format[i].toUpperCase()]; // for countdown parameter
    zeroUnits[format[i]] = 0;
    trueShuffles[format[i]] = true;
  }
  const targetDate = 'relative' === mode ? (0,_relative__WEBPACK_IMPORTED_MODULE_4__.convertRelativeTime)(relative) : new Date(dateTime);
  const {
    currentDate,
    loading
  } = fetchServerDateTime(attributes); // update current server date time

  const initialState = {
    ...zeroUnits,
    init: false,
    prevs: Object.assign({}, zeroUnits),
    shuffles: Object.assign({}, trueShuffles),
    expired: false,
    error: false
  };
  const [_countdown, _setCountdown] = useState(initialState);
  const prevCountddownRef = useRef(initialState);

  // https://stackoverflow.com/a/69771433/806875
  // https://stackoverflow.com/a/69340268/806875
  useEffect(() => {
    if (loading) {
      return;
    }

    // Do quick redirect if expired right after calculation.
    const doExpiryAction = () => {
      // Redirect to URL is is set to and if expired
      if ('post-php' !== window.adminpage && 'redirect_url' === onExpiry) {
        window.location = expiryURL;
        return;
      }
      _setCountdown(initialState);
    };
    if ('until' === mode || 'relative' === mode && targetDate.getTime() > currentDate.getTime()) {
      // expired
      if (targetDate.getTime() < currentDate.getTime()) {
        // expired
        doExpiryAction();
      } else {
        let ticks = tickInterval;
        const interval = setInterval(() => {
          let countdownObj = _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default()(targetDate, currentDate.getTime() + ticks, units);
          if (countdownObj.start.toString() === countdownObj.end.toString()) {
            // this -1 second
            clearInterval(interval);
            initialState.expired = true;
            _setCountdown(initialState); // expired					
          } else {
            countdownObj.init = _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default()(targetDate, currentDate.getTime() + tickInterval, units);
            countdownObj.expired = false;
            countdownObj.shuffles = prevCountddownRef.current.shuffles;
            for (let i = 0; i < format.length; i++) {
              let unit = format[i];
              if (countdownObj[unit] !== prevCountddownRef.current[unit]) {
                countdownObj.shuffles[unit] = !Boolean(prevCountddownRef.current.shuffles[unit]);
              }
            }
            countdownObj.prevs = prevCountddownRef.current;
            _setCountdown(countdownObj);
            let fn = window[onTick]; // onTick callback						
            typeof fn === "function" && fn(); // is a function?

            ticks = ticks + tickInterval * 1000;
          }
        }, parseInt(tickInterval * 1000));
        return () => clearInterval(interval);
      }
    }
    if ('since' === mode || 'relative' === mode && targetDate.getTime() < currentDate.getTime()) {
      // expired
      if (targetDate.getTime() > currentDate.getTime()) {
        // expired
        doExpiryAction();
      } else {
        let ticks = tickInterval;
        const interval = setInterval(() => {
          let countdownObj = _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default()(currentDate.getTime() + ticks, targetDate, units);
          if (countdownObj.start.toString() === countdownObj.end.toString()) {
            // this -1 second
            clearInterval(interval);
            initialState.expired = true;
            _setCountdown(initialState); // expired
          } else {
            countdownObj.init = _lib_countdown_min_js__WEBPACK_IMPORTED_MODULE_3___default()(targetDate, currentDate.getTime() + tickInterval, units);
            countdownObj.expired = false;
            countdownObj.shuffles = prevCountddownRef.current.shuffles;
            for (let i = 0; i < format.length; i++) {
              let unit = format[i];
              if (countdownObj[unit] !== prevCountddownRef.current[unit]) {
                countdownObj.shuffles[unit] = !Boolean(prevCountddownRef.current.shuffles[unit]);
              }
            }
            countdownObj.prevs = prevCountddownRef.current;
            _setCountdown(countdownObj);
            let fn = window[onTick]; // onTick callback						
            typeof fn === "function" && fn(); // is a function?

            ticks = ticks + tickInterval * 1000;
          }
        }, parseInt(tickInterval * 1000));
        return () => clearInterval(interval);
      }
    }
  }, [currentDate, format, loading]);
  if (!loading) {
    // Return error if target date is not valid for since and until
    if ('since' === mode && targetDate.getTime() > currentDate.getTime()) {
      // expired
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "tc-error"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Target date cannot be in the future for "since" mode, please check the date time setting.'), " ");
    }
    if ('until' === mode && targetDate.getTime() < currentDate.getTime()) {
      // expired
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "tc-error"
      }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Target date cannot be in the past for "until" mode, please check the date time setting.'), " ");
    }
    prevCountddownRef.current = _countdown;
    return (0,_templates__WEBPACK_IMPORTED_MODULE_5__["default"])({
      _countdown,
      attributes
    });
  } else {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "tc-textCenter"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Rendering timer...', 'the-countdown'));
  }
}
;

/***/ }),

/***/ "./src/utils.js":
/*!**********************!*\
  !*** ./src/utils.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   daysFromNow: () => (/* binding */ daysFromNow),
/* harmony export */   is12HourTime: () => (/* binding */ is12HourTime),
/* harmony export */   isEmpty: () => (/* binding */ isEmpty),
/* harmony export */   isWeekend: () => (/* binding */ isWeekend)
/* harmony export */ });
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_0__);


// gutenberg/packages/components/src/date-time/stories/utils.ts 
function daysFromNow(days) {
  const date = new Date();
  date.setDate(date.getDate() + days);
  return date;
}
function isWeekend(date) {
  return date.getDay() === 0 || date.getDay() === 6;
}
function isEmpty(value) {
  return value === undefined || value === null || typeof value === "object" && Object.keys(value).length === 0 || typeof value === "string" && value.trim().length === 0;
}

// https://github.com/WordPress/gutenberg/blob/41a30232f5d9ad57246e9843c40cae4ca62acda4/packages/editor/src/components/post-schedule/index.js#L62
const is12HourTime = /a(?!\\)/i.test((0,_wordpress_date__WEBPACK_IMPORTED_MODULE_0__.getSettings)().formats.time.toLowerCase() // Test only the lower case a.
.replace(/\\\\/g, '') // Replace "//" with empty strings.
.split('').reverse().join('') // Reverse the string and test for "a" not followed by a slash.
);

/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = window["React"];

/***/ }),

/***/ "@wordpress/date":
/*!******************************!*\
  !*** external ["wp","date"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["date"];

/***/ }),

/***/ "@wordpress/dom-ready":
/*!**********************************!*\
  !*** external ["wp","domReady"] ***!
  \**********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["domReady"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"countdown": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkthe_countdown"] = globalThis["webpackChunkthe_countdown"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./src/countdown.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=countdown.js.map
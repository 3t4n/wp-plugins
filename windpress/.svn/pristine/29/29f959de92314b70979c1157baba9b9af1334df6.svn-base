import { g as Gt } from "./module-oN1JnOJ9.js";
import { r as Vt } from "./postcss-CMxDEYNb.js";
import { r as jt } from "./index-DYEcFSWi.js";
var ve = { exports: {} }, _e = { exports: {} }, ge = { exports: {} }, Se = { exports: {} }, Te = { exports: {} }, ye = { exports: {} }, Oe = { exports: {} }, ie = {}, me = { exports: {} }, je;
function Et() {
  return je || (je = 1, function(w, r) {
    r.__esModule = true, r.default = S;
    function x(P) {
      for (var y = P.toLowerCase(), E = "", e = false, n = 0; n < 6 && y[n] !== void 0; n++) {
        var a = y.charCodeAt(n), o = a >= 97 && a <= 102 || a >= 48 && a <= 57;
        if (e = a === 32, !o) break;
        E += y[n];
      }
      if (E.length !== 0) {
        var h = parseInt(E, 16), k = h >= 55296 && h <= 57343;
        return k || h === 0 || h > 1114111 ? ["\uFFFD", E.length + (e ? 1 : 0)] : [String.fromCodePoint(h), E.length + (e ? 1 : 0)];
      }
    }
    var v = /\\/;
    function S(P) {
      var y = v.test(P);
      if (!y) return P;
      for (var E = "", e = 0; e < P.length; e++) {
        if (P[e] === "\\") {
          var n = x(P.slice(e + 1, e + 7));
          if (n !== void 0) {
            E += n[0], e += n[1];
            continue;
          }
          if (P[e + 1] === "\\") {
            E += "\\", e++;
            continue;
          }
          P.length === e + 1 && (E += P[e]);
          continue;
        }
        E += P[e];
      }
      return E;
    }
    w.exports = r.default;
  }(me, me.exports)), me.exports;
}
var we = { exports: {} }, ze;
function zt() {
  return ze || (ze = 1, function(w, r) {
    r.__esModule = true, r.default = x;
    function x(v) {
      for (var S = arguments.length, P = new Array(S > 1 ? S - 1 : 0), y = 1; y < S; y++) P[y - 1] = arguments[y];
      for (; P.length > 0; ) {
        var E = P.shift();
        if (!v[E]) return;
        v = v[E];
      }
      return v;
    }
    w.exports = r.default;
  }(we, we.exports)), we.exports;
}
var Ee = { exports: {} }, $e;
function $t() {
  return $e || ($e = 1, function(w, r) {
    r.__esModule = true, r.default = x;
    function x(v) {
      for (var S = arguments.length, P = new Array(S > 1 ? S - 1 : 0), y = 1; y < S; y++) P[y - 1] = arguments[y];
      for (; P.length > 0; ) {
        var E = P.shift();
        v[E] || (v[E] = {}), v = v[E];
      }
    }
    w.exports = r.default;
  }(Ee, Ee.exports)), Ee.exports;
}
var Pe = { exports: {} }, He;
function Ht() {
  return He || (He = 1, function(w, r) {
    r.__esModule = true, r.default = x;
    function x(v) {
      for (var S = "", P = v.indexOf("/*"), y = 0; P >= 0; ) {
        S = S + v.slice(y, P);
        var E = v.indexOf("*/", P + 2);
        if (E < 0) return S;
        y = E + 2, P = v.indexOf("/*", y);
      }
      return S = S + v.slice(y), S;
    }
    w.exports = r.default;
  }(Pe, Pe.exports)), Pe.exports;
}
var Ke;
function Ce() {
  if (Ke) return ie;
  Ke = 1, ie.__esModule = true, ie.unesc = ie.stripComments = ie.getProp = ie.ensureObject = void 0;
  var w = S(Et());
  ie.unesc = w.default;
  var r = S(zt());
  ie.getProp = r.default;
  var x = S($t());
  ie.ensureObject = x.default;
  var v = S(Ht());
  ie.stripComments = v.default;
  function S(P) {
    return P && P.__esModule ? P : { default: P };
  }
  return ie;
}
var Je;
function ce() {
  return Je || (Je = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = Ce();
    function v(E, e) {
      for (var n = 0; n < e.length; n++) {
        var a = e[n];
        a.enumerable = a.enumerable || false, a.configurable = true, "value" in a && (a.writable = true), Object.defineProperty(E, a.key, a);
      }
    }
    function S(E, e, n) {
      return e && v(E.prototype, e), Object.defineProperty(E, "prototype", { writable: false }), E;
    }
    var P = function E(e, n) {
      if (typeof e != "object" || e === null) return e;
      var a = new e.constructor();
      for (var o in e) if (e.hasOwnProperty(o)) {
        var h = e[o], k = typeof h;
        o === "parent" && k === "object" ? n && (a[o] = n) : h instanceof Array ? a[o] = h.map(function(I) {
          return E(I, a);
        }) : a[o] = E(h, a);
      }
      return a;
    }, y = function() {
      function E(n) {
        n === void 0 && (n = {}), Object.assign(this, n), this.spaces = this.spaces || {}, this.spaces.before = this.spaces.before || "", this.spaces.after = this.spaces.after || "";
      }
      var e = E.prototype;
      return e.remove = function() {
        return this.parent && this.parent.removeChild(this), this.parent = void 0, this;
      }, e.replaceWith = function() {
        if (this.parent) {
          for (var a in arguments) this.parent.insertBefore(this, arguments[a]);
          this.remove();
        }
        return this;
      }, e.next = function() {
        return this.parent.at(this.parent.index(this) + 1);
      }, e.prev = function() {
        return this.parent.at(this.parent.index(this) - 1);
      }, e.clone = function(a) {
        a === void 0 && (a = {});
        var o = P(this);
        for (var h in a) o[h] = a[h];
        return o;
      }, e.appendToPropertyAndEscape = function(a, o, h) {
        this.raws || (this.raws = {});
        var k = this[a], I = this.raws[a];
        this[a] = k + o, I || h !== o ? this.raws[a] = (I || k) + h : delete this.raws[a];
      }, e.setPropertyAndEscape = function(a, o, h) {
        this.raws || (this.raws = {}), this[a] = o, this.raws[a] = h;
      }, e.setPropertyWithoutEscape = function(a, o) {
        this[a] = o, this.raws && delete this.raws[a];
      }, e.isAtPosition = function(a, o) {
        if (this.source && this.source.start && this.source.end) return !(this.source.start.line > a || this.source.end.line < a || this.source.start.line === a && this.source.start.column > o || this.source.end.line === a && this.source.end.column < o);
      }, e.stringifyProperty = function(a) {
        return this.raws && this.raws[a] || this[a];
      }, e.valueToString = function() {
        return String(this.stringifyProperty("value"));
      }, e.toString = function() {
        return [this.rawSpaceBefore, this.valueToString(), this.rawSpaceAfter].join("");
      }, S(E, [{ key: "rawSpaceBefore", get: function() {
        var a = this.raws && this.raws.spaces && this.raws.spaces.before;
        return a === void 0 && (a = this.spaces && this.spaces.before), a || "";
      }, set: function(a) {
        (0, x.ensureObject)(this, "raws", "spaces"), this.raws.spaces.before = a;
      } }, { key: "rawSpaceAfter", get: function() {
        var a = this.raws && this.raws.spaces && this.raws.spaces.after;
        return a === void 0 && (a = this.spaces.after), a || "";
      }, set: function(a) {
        (0, x.ensureObject)(this, "raws", "spaces"), this.raws.spaces.after = a;
      } }]), E;
    }();
    r.default = y, w.exports = r.default;
  }(Oe, Oe.exports)), Oe.exports;
}
var G = {}, Xe;
function ee() {
  if (Xe) return G;
  Xe = 1, G.__esModule = true, G.UNIVERSAL = G.TAG = G.STRING = G.SELECTOR = G.ROOT = G.PSEUDO = G.NESTING = G.ID = G.COMMENT = G.COMBINATOR = G.CLASS = G.ATTRIBUTE = void 0;
  var w = "tag";
  G.TAG = w;
  var r = "string";
  G.STRING = r;
  var x = "selector";
  G.SELECTOR = x;
  var v = "root";
  G.ROOT = v;
  var S = "pseudo";
  G.PSEUDO = S;
  var P = "nesting";
  G.NESTING = P;
  var y = "id";
  G.ID = y;
  var E = "comment";
  G.COMMENT = E;
  var e = "combinator";
  G.COMBINATOR = e;
  var n = "class";
  G.CLASS = n;
  var a = "attribute";
  G.ATTRIBUTE = a;
  var o = "universal";
  return G.UNIVERSAL = o, G;
}
var Ze;
function Ye() {
  return Ze || (Ze = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = y(ce()), v = P(ee());
    function S(t) {
      if (typeof WeakMap != "function") return null;
      var c = /* @__PURE__ */ new WeakMap(), s = /* @__PURE__ */ new WeakMap();
      return (S = function(f) {
        return f ? s : c;
      })(t);
    }
    function P(t, c) {
      if (t && t.__esModule) return t;
      if (t === null || typeof t != "object" && typeof t != "function") return { default: t };
      var s = S(c);
      if (s && s.has(t)) return s.get(t);
      var u = {}, f = Object.defineProperty && Object.getOwnPropertyDescriptor;
      for (var l in t) if (l !== "default" && Object.prototype.hasOwnProperty.call(t, l)) {
        var i = f ? Object.getOwnPropertyDescriptor(t, l) : null;
        i && (i.get || i.set) ? Object.defineProperty(u, l, i) : u[l] = t[l];
      }
      return u.default = t, s && s.set(t, u), u;
    }
    function y(t) {
      return t && t.__esModule ? t : { default: t };
    }
    function E(t, c) {
      var s = typeof Symbol < "u" && t[Symbol.iterator] || t["@@iterator"];
      if (s) return (s = s.call(t)).next.bind(s);
      if (Array.isArray(t) || (s = e(t)) || c) {
        s && (t = s);
        var u = 0;
        return function() {
          return u >= t.length ? { done: true } : { done: false, value: t[u++] };
        };
      }
      throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
    }
    function e(t, c) {
      if (t) {
        if (typeof t == "string") return n(t, c);
        var s = Object.prototype.toString.call(t).slice(8, -1);
        if (s === "Object" && t.constructor && (s = t.constructor.name), s === "Map" || s === "Set") return Array.from(t);
        if (s === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s)) return n(t, c);
      }
    }
    function n(t, c) {
      (c == null || c > t.length) && (c = t.length);
      for (var s = 0, u = new Array(c); s < c; s++) u[s] = t[s];
      return u;
    }
    function a(t, c) {
      for (var s = 0; s < c.length; s++) {
        var u = c[s];
        u.enumerable = u.enumerable || false, u.configurable = true, "value" in u && (u.writable = true), Object.defineProperty(t, u.key, u);
      }
    }
    function o(t, c, s) {
      return c && a(t.prototype, c), Object.defineProperty(t, "prototype", { writable: false }), t;
    }
    function h(t, c) {
      t.prototype = Object.create(c.prototype), t.prototype.constructor = t, k(t, c);
    }
    function k(t, c) {
      return k = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(u, f) {
        return u.__proto__ = f, u;
      }, k(t, c);
    }
    var I = function(t) {
      h(c, t);
      function c(u) {
        var f;
        return f = t.call(this, u) || this, f.nodes || (f.nodes = []), f;
      }
      var s = c.prototype;
      return s.append = function(f) {
        return f.parent = this, this.nodes.push(f), this;
      }, s.prepend = function(f) {
        return f.parent = this, this.nodes.unshift(f), this;
      }, s.at = function(f) {
        return this.nodes[f];
      }, s.index = function(f) {
        return typeof f == "number" ? f : this.nodes.indexOf(f);
      }, s.removeChild = function(f) {
        f = this.index(f), this.at(f).parent = void 0, this.nodes.splice(f, 1);
        var l;
        for (var i in this.indexes) l = this.indexes[i], l >= f && (this.indexes[i] = l - 1);
        return this;
      }, s.removeAll = function() {
        for (var f = E(this.nodes), l; !(l = f()).done; ) {
          var i = l.value;
          i.parent = void 0;
        }
        return this.nodes = [], this;
      }, s.empty = function() {
        return this.removeAll();
      }, s.insertAfter = function(f, l) {
        l.parent = this;
        var i = this.index(f);
        this.nodes.splice(i + 1, 0, l), l.parent = this;
        var T;
        for (var m in this.indexes) T = this.indexes[m], i <= T && (this.indexes[m] = T + 1);
        return this;
      }, s.insertBefore = function(f, l) {
        l.parent = this;
        var i = this.index(f);
        this.nodes.splice(i, 0, l), l.parent = this;
        var T;
        for (var m in this.indexes) T = this.indexes[m], T <= i && (this.indexes[m] = T + 1);
        return this;
      }, s._findChildAtPosition = function(f, l) {
        var i = void 0;
        return this.each(function(T) {
          if (T.atPosition) {
            var m = T.atPosition(f, l);
            if (m) return i = m, false;
          } else if (T.isAtPosition(f, l)) return i = T, false;
        }), i;
      }, s.atPosition = function(f, l) {
        if (this.isAtPosition(f, l)) return this._findChildAtPosition(f, l) || this;
      }, s._inferEndPosition = function() {
        this.last && this.last.source && this.last.source.end && (this.source = this.source || {}, this.source.end = this.source.end || {}, Object.assign(this.source.end, this.last.source.end));
      }, s.each = function(f) {
        this.lastEach || (this.lastEach = 0), this.indexes || (this.indexes = {}), this.lastEach++;
        var l = this.lastEach;
        if (this.indexes[l] = 0, !!this.length) {
          for (var i, T; this.indexes[l] < this.length && (i = this.indexes[l], T = f(this.at(i), i), T !== false); ) this.indexes[l] += 1;
          if (delete this.indexes[l], T === false) return false;
        }
      }, s.walk = function(f) {
        return this.each(function(l, i) {
          var T = f(l, i);
          if (T !== false && l.length && (T = l.walk(f)), T === false) return false;
        });
      }, s.walkAttributes = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.ATTRIBUTE) return f.call(l, i);
        });
      }, s.walkClasses = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.CLASS) return f.call(l, i);
        });
      }, s.walkCombinators = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.COMBINATOR) return f.call(l, i);
        });
      }, s.walkComments = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.COMMENT) return f.call(l, i);
        });
      }, s.walkIds = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.ID) return f.call(l, i);
        });
      }, s.walkNesting = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.NESTING) return f.call(l, i);
        });
      }, s.walkPseudos = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.PSEUDO) return f.call(l, i);
        });
      }, s.walkTags = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.TAG) return f.call(l, i);
        });
      }, s.walkUniversals = function(f) {
        var l = this;
        return this.walk(function(i) {
          if (i.type === v.UNIVERSAL) return f.call(l, i);
        });
      }, s.split = function(f) {
        var l = this, i = [];
        return this.reduce(function(T, m, O) {
          var d = f.call(l, m);
          return i.push(m), d ? (T.push(i), i = []) : O === l.length - 1 && T.push(i), T;
        }, []);
      }, s.map = function(f) {
        return this.nodes.map(f);
      }, s.reduce = function(f, l) {
        return this.nodes.reduce(f, l);
      }, s.every = function(f) {
        return this.nodes.every(f);
      }, s.some = function(f) {
        return this.nodes.some(f);
      }, s.filter = function(f) {
        return this.nodes.filter(f);
      }, s.sort = function(f) {
        return this.nodes.sort(f);
      }, s.toString = function() {
        return this.map(String).join("");
      }, o(c, [{ key: "first", get: function() {
        return this.at(0);
      } }, { key: "last", get: function() {
        return this.at(this.length - 1);
      } }, { key: "length", get: function() {
        return this.nodes.length;
      } }]), c;
    }(x.default);
    r.default = I, w.exports = r.default;
  }(ye, ye.exports)), ye.exports;
}
var et;
function Pt() {
  return et || (et = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(Ye()), v = ee();
    function S(a) {
      return a && a.__esModule ? a : { default: a };
    }
    function P(a, o) {
      for (var h = 0; h < o.length; h++) {
        var k = o[h];
        k.enumerable = k.enumerable || false, k.configurable = true, "value" in k && (k.writable = true), Object.defineProperty(a, k.key, k);
      }
    }
    function y(a, o, h) {
      return o && P(a.prototype, o), Object.defineProperty(a, "prototype", { writable: false }), a;
    }
    function E(a, o) {
      a.prototype = Object.create(o.prototype), a.prototype.constructor = a, e(a, o);
    }
    function e(a, o) {
      return e = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(k, I) {
        return k.__proto__ = I, k;
      }, e(a, o);
    }
    var n = function(a) {
      E(o, a);
      function o(k) {
        var I;
        return I = a.call(this, k) || this, I.type = v.ROOT, I;
      }
      var h = o.prototype;
      return h.toString = function() {
        var I = this.reduce(function(t, c) {
          return t.push(String(c)), t;
        }, []).join(",");
        return this.trailingComma ? I + "," : I;
      }, h.error = function(I, t) {
        return this._error ? this._error(I, t) : new Error(I);
      }, y(o, [{ key: "errorGenerator", set: function(I) {
        this._error = I;
      } }]), o;
    }(x.default);
    r.default = n, w.exports = r.default;
  }(Te, Te.exports)), Te.exports;
}
var ke = { exports: {} }, tt;
function kt() {
  return tt || (tt = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(Ye()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(a) {
        var o;
        return o = e.call(this, a) || this, o.type = v.SELECTOR, o;
      }
      return n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(ke, ke.exports)), ke.exports;
}
var be = { exports: {} };
/*! https://mths.be/cssesc v3.0.0 by @mathias */
var Ue, rt;
function Ge() {
  if (rt) return Ue;
  rt = 1;
  var w = {}, r = w.hasOwnProperty, x = function(e, n) {
    if (!e) return n;
    var a = {};
    for (var o in n) a[o] = r.call(e, o) ? e[o] : n[o];
    return a;
  }, v = /[ -,\.\/:-@\[-\^`\{-~]/, S = /[ -,\.\/:-@\[\]\^`\{-~]/, P = /(^|\\+)?(\\[A-F0-9]{1,6})\x20(?![a-fA-F0-9\x20])/g, y = function E(e, n) {
    n = x(n, E.options), n.quotes != "single" && n.quotes != "double" && (n.quotes = "single");
    for (var a = n.quotes == "double" ? '"' : "'", o = n.isIdentifier, h = e.charAt(0), k = "", I = 0, t = e.length; I < t; ) {
      var c = e.charAt(I++), s = c.charCodeAt(), u = void 0;
      if (s < 32 || s > 126) {
        if (s >= 55296 && s <= 56319 && I < t) {
          var f = e.charCodeAt(I++);
          (f & 64512) == 56320 ? s = ((s & 1023) << 10) + (f & 1023) + 65536 : I--;
        }
        u = "\\" + s.toString(16).toUpperCase() + " ";
      } else n.escapeEverything ? v.test(c) ? u = "\\" + c : u = "\\" + s.toString(16).toUpperCase() + " " : /[\t\n\f\r\x0B]/.test(c) ? u = "\\" + s.toString(16).toUpperCase() + " " : c == "\\" || !o && (c == '"' && a == c || c == "'" && a == c) || o && S.test(c) ? u = "\\" + c : u = c;
      k += u;
    }
    return o && (/^-[-\d]/.test(k) ? k = "\\-" + k.slice(1) : /\d/.test(h) && (k = "\\3" + h + " " + k.slice(1))), k = k.replace(P, function(l, i, T) {
      return i && i.length % 2 ? l : (i || "") + T;
    }), !o && n.wrap ? a + k + a : k;
  };
  return y.options = { escapeEverything: false, isIdentifier: false, quotes: "single", wrap: false }, y.version = "3.0.0", Ue = y, Ue;
}
var nt;
function bt() {
  return nt || (nt = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = y(Ge()), v = Ce(), S = y(ce()), P = ee();
    function y(h) {
      return h && h.__esModule ? h : { default: h };
    }
    function E(h, k) {
      for (var I = 0; I < k.length; I++) {
        var t = k[I];
        t.enumerable = t.enumerable || false, t.configurable = true, "value" in t && (t.writable = true), Object.defineProperty(h, t.key, t);
      }
    }
    function e(h, k, I) {
      return k && E(h.prototype, k), Object.defineProperty(h, "prototype", { writable: false }), h;
    }
    function n(h, k) {
      h.prototype = Object.create(k.prototype), h.prototype.constructor = h, a(h, k);
    }
    function a(h, k) {
      return a = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(t, c) {
        return t.__proto__ = c, t;
      }, a(h, k);
    }
    var o = function(h) {
      n(k, h);
      function k(t) {
        var c;
        return c = h.call(this, t) || this, c.type = P.CLASS, c._constructed = true, c;
      }
      var I = k.prototype;
      return I.valueToString = function() {
        return "." + h.prototype.valueToString.call(this);
      }, e(k, [{ key: "value", get: function() {
        return this._value;
      }, set: function(c) {
        if (this._constructed) {
          var s = (0, x.default)(c, { isIdentifier: true });
          s !== c ? ((0, v.ensureObject)(this, "raws"), this.raws.value = s) : this.raws && delete this.raws.value;
        }
        this._value = c;
      } }]), k;
    }(S.default);
    r.default = o, w.exports = r.default;
  }(be, be.exports)), be.exports;
}
var Ie = { exports: {} }, it;
function It() {
  return it || (it = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(ce()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(a) {
        var o;
        return o = e.call(this, a) || this, o.type = v.COMMENT, o;
      }
      return n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(Ie, Ie.exports)), Ie.exports;
}
var xe = { exports: {} }, st;
function xt() {
  return st || (st = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(ce()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(o) {
        var h;
        return h = e.call(this, o) || this, h.type = v.ID, h;
      }
      var a = n.prototype;
      return a.valueToString = function() {
        return "#" + e.prototype.valueToString.call(this);
      }, n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(xe, xe.exports)), xe.exports;
}
var qe = { exports: {} }, De = { exports: {} }, at;
function Ve() {
  return at || (at = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = P(Ge()), v = Ce(), S = P(ce());
    function P(o) {
      return o && o.__esModule ? o : { default: o };
    }
    function y(o, h) {
      for (var k = 0; k < h.length; k++) {
        var I = h[k];
        I.enumerable = I.enumerable || false, I.configurable = true, "value" in I && (I.writable = true), Object.defineProperty(o, I.key, I);
      }
    }
    function E(o, h, k) {
      return h && y(o.prototype, h), Object.defineProperty(o, "prototype", { writable: false }), o;
    }
    function e(o, h) {
      o.prototype = Object.create(h.prototype), o.prototype.constructor = o, n(o, h);
    }
    function n(o, h) {
      return n = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(I, t) {
        return I.__proto__ = t, I;
      }, n(o, h);
    }
    var a = function(o) {
      e(h, o);
      function h() {
        return o.apply(this, arguments) || this;
      }
      var k = h.prototype;
      return k.qualifiedName = function(t) {
        return this.namespace ? this.namespaceString + "|" + t : t;
      }, k.valueToString = function() {
        return this.qualifiedName(o.prototype.valueToString.call(this));
      }, E(h, [{ key: "namespace", get: function() {
        return this._namespace;
      }, set: function(t) {
        if (t === true || t === "*" || t === "&") {
          this._namespace = t, this.raws && delete this.raws.namespace;
          return;
        }
        var c = (0, x.default)(t, { isIdentifier: true });
        this._namespace = t, c !== t ? ((0, v.ensureObject)(this, "raws"), this.raws.namespace = c) : this.raws && delete this.raws.namespace;
      } }, { key: "ns", get: function() {
        return this._namespace;
      }, set: function(t) {
        this.namespace = t;
      } }, { key: "namespaceString", get: function() {
        if (this.namespace) {
          var t = this.stringifyProperty("namespace");
          return t === true ? "" : t;
        } else return "";
      } }]), h;
    }(S.default);
    r.default = a, w.exports = r.default;
  }(De, De.exports)), De.exports;
}
var ot;
function qt() {
  return ot || (ot = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(Ve()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(a) {
        var o;
        return o = e.call(this, a) || this, o.type = v.TAG, o;
      }
      return n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(qe, qe.exports)), qe.exports;
}
var Re = { exports: {} }, ut;
function Dt() {
  return ut || (ut = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(ce()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(a) {
        var o;
        return o = e.call(this, a) || this, o.type = v.STRING, o;
      }
      return n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(Re, Re.exports)), Re.exports;
}
var Le = { exports: {} }, ft;
function Rt() {
  return ft || (ft = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(Ye()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(o) {
        var h;
        return h = e.call(this, o) || this, h.type = v.PSEUDO, h;
      }
      var a = n.prototype;
      return a.toString = function() {
        var h = this.length ? "(" + this.map(String).join(",") + ")" : "";
        return [this.rawSpaceBefore, this.stringifyProperty("value"), h, this.rawSpaceAfter].join("");
      }, n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(Le, Le.exports)), Le.exports;
}
var We = {}, ct;
function Lt() {
  return ct || (ct = 1, function(w) {
    w.__esModule = true, w.default = void 0, w.unescapeValue = c;
    var r = y(Ge()), x = y(Et()), v = y(Ve()), S = ee(), P;
    function y(i) {
      return i && i.__esModule ? i : { default: i };
    }
    function E(i, T) {
      for (var m = 0; m < T.length; m++) {
        var O = T[m];
        O.enumerable = O.enumerable || false, O.configurable = true, "value" in O && (O.writable = true), Object.defineProperty(i, O.key, O);
      }
    }
    function e(i, T, m) {
      return T && E(i.prototype, T), Object.defineProperty(i, "prototype", { writable: false }), i;
    }
    function n(i, T) {
      i.prototype = Object.create(T.prototype), i.prototype.constructor = i, a(i, T);
    }
    function a(i, T) {
      return a = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(O, d) {
        return O.__proto__ = d, O;
      }, a(i, T);
    }
    var o = jt(), h = /^('|")([^]*)\1$/, k = o(function() {
    }, "Assigning an attribute a value containing characters that might need to be escaped is deprecated. Call attribute.setValue() instead."), I = o(function() {
    }, "Assigning attr.quoted is deprecated and has no effect. Assign to attr.quoteMark instead."), t = o(function() {
    }, "Constructing an Attribute selector with a value without specifying quoteMark is deprecated. Note: The value should be unescaped now.");
    function c(i) {
      var T = false, m = null, O = i, d = O.match(h);
      return d && (m = d[1], O = d[2]), O = (0, x.default)(O), O !== i && (T = true), { deprecatedUsage: T, unescaped: O, quoteMark: m };
    }
    function s(i) {
      if (i.quoteMark !== void 0 || i.value === void 0) return i;
      t();
      var T = c(i.value), m = T.quoteMark, O = T.unescaped;
      return i.raws || (i.raws = {}), i.raws.value === void 0 && (i.raws.value = i.value), i.value = O, i.quoteMark = m, i;
    }
    var u = function(i) {
      n(T, i);
      function T(O) {
        var d;
        return O === void 0 && (O = {}), d = i.call(this, s(O)) || this, d.type = S.ATTRIBUTE, d.raws = d.raws || {}, Object.defineProperty(d.raws, "unquoted", { get: o(function() {
          return d.value;
        }, "attr.raws.unquoted is deprecated. Call attr.value instead."), set: o(function() {
          return d.value;
        }, "Setting attr.raws.unquoted is deprecated and has no effect. attr.value is unescaped by default now.") }), d._constructed = true, d;
      }
      var m = T.prototype;
      return m.getQuotedValue = function(d) {
        d === void 0 && (d = {});
        var g = this._determineQuoteMark(d), N = f[g], A = (0, r.default)(this._value, N);
        return A;
      }, m._determineQuoteMark = function(d) {
        return d.smart ? this.smartQuoteMark(d) : this.preferredQuoteMark(d);
      }, m.setValue = function(d, g) {
        g === void 0 && (g = {}), this._value = d, this._quoteMark = this._determineQuoteMark(g), this._syncRawValue();
      }, m.smartQuoteMark = function(d) {
        var g = this.value, N = g.replace(/[^']/g, "").length, A = g.replace(/[^"]/g, "").length;
        if (N + A === 0) {
          var H = (0, r.default)(g, { isIdentifier: true });
          if (H === g) return T.NO_QUOTE;
          var z = this.preferredQuoteMark(d);
          if (z === T.NO_QUOTE) {
            var K = this.quoteMark || d.quoteMark || T.DOUBLE_QUOTE, W = f[K], J = (0, r.default)(g, W);
            if (J.length < H.length) return K;
          }
          return z;
        } else return A === N ? this.preferredQuoteMark(d) : A < N ? T.DOUBLE_QUOTE : T.SINGLE_QUOTE;
      }, m.preferredQuoteMark = function(d) {
        var g = d.preferCurrentQuoteMark ? this.quoteMark : d.quoteMark;
        return g === void 0 && (g = d.preferCurrentQuoteMark ? d.quoteMark : this.quoteMark), g === void 0 && (g = T.DOUBLE_QUOTE), g;
      }, m._syncRawValue = function() {
        var d = (0, r.default)(this._value, f[this.quoteMark]);
        d === this._value ? this.raws && delete this.raws.value : this.raws.value = d;
      }, m._handleEscapes = function(d, g) {
        if (this._constructed) {
          var N = (0, r.default)(g, { isIdentifier: true });
          N !== g ? this.raws[d] = N : delete this.raws[d];
        }
      }, m._spacesFor = function(d) {
        var g = { before: "", after: "" }, N = this.spaces[d] || {}, A = this.raws.spaces && this.raws.spaces[d] || {};
        return Object.assign(g, N, A);
      }, m._stringFor = function(d, g, N) {
        g === void 0 && (g = d), N === void 0 && (N = l);
        var A = this._spacesFor(g);
        return N(this.stringifyProperty(d), A);
      }, m.offsetOf = function(d) {
        var g = 1, N = this._spacesFor("attribute");
        if (g += N.before.length, d === "namespace" || d === "ns") return this.namespace ? g : -1;
        if (d === "attributeNS" || (g += this.namespaceString.length, this.namespace && (g += 1), d === "attribute")) return g;
        g += this.stringifyProperty("attribute").length, g += N.after.length;
        var A = this._spacesFor("operator");
        g += A.before.length;
        var H = this.stringifyProperty("operator");
        if (d === "operator") return H ? g : -1;
        g += H.length, g += A.after.length;
        var z = this._spacesFor("value");
        g += z.before.length;
        var K = this.stringifyProperty("value");
        if (d === "value") return K ? g : -1;
        g += K.length, g += z.after.length;
        var W = this._spacesFor("insensitive");
        return g += W.before.length, d === "insensitive" && this.insensitive ? g : -1;
      }, m.toString = function() {
        var d = this, g = [this.rawSpaceBefore, "["];
        return g.push(this._stringFor("qualifiedAttribute", "attribute")), this.operator && (this.value || this.value === "") && (g.push(this._stringFor("operator")), g.push(this._stringFor("value")), g.push(this._stringFor("insensitiveFlag", "insensitive", function(N, A) {
          return N.length > 0 && !d.quoted && A.before.length === 0 && !(d.spaces.value && d.spaces.value.after) && (A.before = " "), l(N, A);
        }))), g.push("]"), g.push(this.rawSpaceAfter), g.join("");
      }, e(T, [{ key: "quoted", get: function() {
        var d = this.quoteMark;
        return d === "'" || d === '"';
      }, set: function(d) {
        I();
      } }, { key: "quoteMark", get: function() {
        return this._quoteMark;
      }, set: function(d) {
        if (!this._constructed) {
          this._quoteMark = d;
          return;
        }
        this._quoteMark !== d && (this._quoteMark = d, this._syncRawValue());
      } }, { key: "qualifiedAttribute", get: function() {
        return this.qualifiedName(this.raws.attribute || this.attribute);
      } }, { key: "insensitiveFlag", get: function() {
        return this.insensitive ? "i" : "";
      } }, { key: "value", get: function() {
        return this._value;
      }, set: function(d) {
        if (this._constructed) {
          var g = c(d), N = g.deprecatedUsage, A = g.unescaped, H = g.quoteMark;
          if (N && k(), A === this._value && H === this._quoteMark) return;
          this._value = A, this._quoteMark = H, this._syncRawValue();
        } else this._value = d;
      } }, { key: "insensitive", get: function() {
        return this._insensitive;
      }, set: function(d) {
        d || (this._insensitive = false, this.raws && (this.raws.insensitiveFlag === "I" || this.raws.insensitiveFlag === "i") && (this.raws.insensitiveFlag = void 0)), this._insensitive = d;
      } }, { key: "attribute", get: function() {
        return this._attribute;
      }, set: function(d) {
        this._handleEscapes("attribute", d), this._attribute = d;
      } }]), T;
    }(v.default);
    w.default = u, u.NO_QUOTE = null, u.SINGLE_QUOTE = "'", u.DOUBLE_QUOTE = '"';
    var f = (P = { "'": { quotes: "single", wrap: true }, '"': { quotes: "double", wrap: true } }, P[null] = { isIdentifier: true }, P);
    function l(i, T) {
      return "" + T.before + i + T.after;
    }
  }(We)), We;
}
var Ae = { exports: {} }, lt;
function At() {
  return lt || (lt = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(Ve()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(a) {
        var o;
        return o = e.call(this, a) || this, o.type = v.UNIVERSAL, o.value = "*", o;
      }
      return n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(Ae, Ae.exports)), Ae.exports;
}
var Ne = { exports: {} }, ht;
function Nt() {
  return ht || (ht = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(ce()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(a) {
        var o;
        return o = e.call(this, a) || this, o.type = v.COMBINATOR, o;
      }
      return n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(Ne, Ne.exports)), Ne.exports;
}
var Me = { exports: {} }, pt;
function Mt() {
  return pt || (pt = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = S(ce()), v = ee();
    function S(e) {
      return e && e.__esModule ? e : { default: e };
    }
    function P(e, n) {
      e.prototype = Object.create(n.prototype), e.prototype.constructor = e, y(e, n);
    }
    function y(e, n) {
      return y = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(o, h) {
        return o.__proto__ = h, o;
      }, y(e, n);
    }
    var E = function(e) {
      P(n, e);
      function n(a) {
        var o;
        return o = e.call(this, a) || this, o.type = v.NESTING, o.value = "&", o;
      }
      return n;
    }(x.default);
    r.default = E, w.exports = r.default;
  }(Me, Me.exports)), Me.exports;
}
var Fe = { exports: {} }, dt;
function Kt() {
  return dt || (dt = 1, function(w, r) {
    r.__esModule = true, r.default = x;
    function x(v) {
      return v.sort(function(S, P) {
        return S - P;
      });
    }
    w.exports = r.default;
  }(Fe, Fe.exports)), Fe.exports;
}
var Be = {}, D = {}, vt;
function Ft() {
  if (vt) return D;
  vt = 1, D.__esModule = true, D.word = D.tilde = D.tab = D.str = D.space = D.slash = D.singleQuote = D.semicolon = D.plus = D.pipe = D.openSquare = D.openParenthesis = D.newline = D.greaterThan = D.feed = D.equals = D.doubleQuote = D.dollar = D.cr = D.comment = D.comma = D.combinator = D.colon = D.closeSquare = D.closeParenthesis = D.caret = D.bang = D.backslash = D.at = D.asterisk = D.ampersand = void 0;
  var w = 38;
  D.ampersand = w;
  var r = 42;
  D.asterisk = r;
  var x = 64;
  D.at = x;
  var v = 44;
  D.comma = v;
  var S = 58;
  D.colon = S;
  var P = 59;
  D.semicolon = P;
  var y = 40;
  D.openParenthesis = y;
  var E = 41;
  D.closeParenthesis = E;
  var e = 91;
  D.openSquare = e;
  var n = 93;
  D.closeSquare = n;
  var a = 36;
  D.dollar = a;
  var o = 126;
  D.tilde = o;
  var h = 94;
  D.caret = h;
  var k = 43;
  D.plus = k;
  var I = 61;
  D.equals = I;
  var t = 124;
  D.pipe = t;
  var c = 62;
  D.greaterThan = c;
  var s = 32;
  D.space = s;
  var u = 39;
  D.singleQuote = u;
  var f = 34;
  D.doubleQuote = f;
  var l = 47;
  D.slash = l;
  var i = 33;
  D.bang = i;
  var T = 92;
  D.backslash = T;
  var m = 13;
  D.cr = m;
  var O = 12;
  D.feed = O;
  var d = 10;
  D.newline = d;
  var g = 9;
  D.tab = g;
  var N = u;
  D.str = N;
  var A = -1;
  D.comment = A;
  var H = -2;
  D.word = H;
  var z = -3;
  return D.combinator = z, D;
}
var _t;
function Jt() {
  return _t || (_t = 1, function(w) {
    w.__esModule = true, w.FIELDS = void 0, w.default = I;
    var r = P(Ft()), x, v;
    function S(t) {
      if (typeof WeakMap != "function") return null;
      var c = /* @__PURE__ */ new WeakMap(), s = /* @__PURE__ */ new WeakMap();
      return (S = function(f) {
        return f ? s : c;
      })(t);
    }
    function P(t, c) {
      if (t && t.__esModule) return t;
      if (t === null || typeof t != "object" && typeof t != "function") return { default: t };
      var s = S(c);
      if (s && s.has(t)) return s.get(t);
      var u = {}, f = Object.defineProperty && Object.getOwnPropertyDescriptor;
      for (var l in t) if (l !== "default" && Object.prototype.hasOwnProperty.call(t, l)) {
        var i = f ? Object.getOwnPropertyDescriptor(t, l) : null;
        i && (i.get || i.set) ? Object.defineProperty(u, l, i) : u[l] = t[l];
      }
      return u.default = t, s && s.set(t, u), u;
    }
    for (var y = (x = {}, x[r.tab] = true, x[r.newline] = true, x[r.cr] = true, x[r.feed] = true, x), E = (v = {}, v[r.space] = true, v[r.tab] = true, v[r.newline] = true, v[r.cr] = true, v[r.feed] = true, v[r.ampersand] = true, v[r.asterisk] = true, v[r.bang] = true, v[r.comma] = true, v[r.colon] = true, v[r.semicolon] = true, v[r.openParenthesis] = true, v[r.closeParenthesis] = true, v[r.openSquare] = true, v[r.closeSquare] = true, v[r.singleQuote] = true, v[r.doubleQuote] = true, v[r.plus] = true, v[r.pipe] = true, v[r.tilde] = true, v[r.greaterThan] = true, v[r.equals] = true, v[r.dollar] = true, v[r.caret] = true, v[r.slash] = true, v), e = {}, n = "0123456789abcdefABCDEF", a = 0; a < n.length; a++) e[n.charCodeAt(a)] = true;
    function o(t, c) {
      var s = c, u;
      do {
        if (u = t.charCodeAt(s), E[u]) return s - 1;
        u === r.backslash ? s = h(t, s) + 1 : s++;
      } while (s < t.length);
      return s - 1;
    }
    function h(t, c) {
      var s = c, u = t.charCodeAt(s + 1);
      if (!y[u]) if (e[u]) {
        var f = 0;
        do
          s++, f++, u = t.charCodeAt(s + 1);
        while (e[u] && f < 6);
        f < 6 && u === r.space && s++;
      } else s++;
      return s;
    }
    var k = { TYPE: 0, START_LINE: 1, START_COL: 2, END_LINE: 3, END_COL: 4, START_POS: 5, END_POS: 6 };
    w.FIELDS = k;
    function I(t) {
      var c = [], s = t.css.valueOf(), u = s, f = u.length, l = -1, i = 1, T = 0, m = 0, O, d, g, N, A, H, z, K, W, J, se, le, ae;
      function R(L, q) {
        if (t.safe) s += q, W = s.length - 1;
        else throw t.error("Unclosed " + L, i, T - l, T);
      }
      for (; T < f; ) {
        switch (O = s.charCodeAt(T), O === r.newline && (l = T, i += 1), O) {
          case r.space:
          case r.tab:
          case r.newline:
          case r.cr:
          case r.feed:
            W = T;
            do
              W += 1, O = s.charCodeAt(W), O === r.newline && (l = W, i += 1);
            while (O === r.space || O === r.newline || O === r.tab || O === r.cr || O === r.feed);
            ae = r.space, N = i, g = W - l - 1, m = W;
            break;
          case r.plus:
          case r.greaterThan:
          case r.tilde:
          case r.pipe:
            W = T;
            do
              W += 1, O = s.charCodeAt(W);
            while (O === r.plus || O === r.greaterThan || O === r.tilde || O === r.pipe);
            ae = r.combinator, N = i, g = T - l, m = W;
            break;
          case r.asterisk:
          case r.ampersand:
          case r.bang:
          case r.comma:
          case r.equals:
          case r.dollar:
          case r.caret:
          case r.openSquare:
          case r.closeSquare:
          case r.colon:
          case r.semicolon:
          case r.openParenthesis:
          case r.closeParenthesis:
            W = T, ae = O, N = i, g = T - l, m = W + 1;
            break;
          case r.singleQuote:
          case r.doubleQuote:
            le = O === r.singleQuote ? "'" : '"', W = T;
            do
              for (A = false, W = s.indexOf(le, W + 1), W === -1 && R("quote", le), H = W; s.charCodeAt(H - 1) === r.backslash; ) H -= 1, A = !A;
            while (A);
            ae = r.str, N = i, g = T - l, m = W + 1;
            break;
          default:
            O === r.slash && s.charCodeAt(T + 1) === r.asterisk ? (W = s.indexOf("*/", T + 2) + 1, W === 0 && R("comment", "*/"), d = s.slice(T, W + 1), K = d.split(`
`), z = K.length - 1, z > 0 ? (J = i + z, se = W - K[z].length) : (J = i, se = l), ae = r.comment, i = J, N = J, g = W - se) : O === r.slash ? (W = T, ae = O, N = i, g = T - l, m = W + 1) : (W = o(s, T), ae = r.word, N = i, g = W - l), m = W + 1;
            break;
        }
        c.push([ae, i, T - l, N, g, T, m]), se && (l = se, se = null), T = m;
      }
      return c;
    }
  }(Be)), Be;
}
var gt;
function Xt() {
  return gt || (gt = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = m(Pt()), v = m(kt()), S = m(bt()), P = m(It()), y = m(xt()), E = m(qt()), e = m(Dt()), n = m(Rt()), a = T(Lt()), o = m(At()), h = m(Nt()), k = m(Mt()), I = m(Kt()), t = T(Jt()), c = T(Ft()), s = T(ee()), u = Ce(), f, l;
    function i(R) {
      if (typeof WeakMap != "function") return null;
      var L = /* @__PURE__ */ new WeakMap(), q = /* @__PURE__ */ new WeakMap();
      return (i = function(b) {
        return b ? q : L;
      })(R);
    }
    function T(R, L) {
      if (R && R.__esModule) return R;
      if (R === null || typeof R != "object" && typeof R != "function") return { default: R };
      var q = i(L);
      if (q && q.has(R)) return q.get(R);
      var p = {}, b = Object.defineProperty && Object.getOwnPropertyDescriptor;
      for (var M in R) if (M !== "default" && Object.prototype.hasOwnProperty.call(R, M)) {
        var _ = b ? Object.getOwnPropertyDescriptor(R, M) : null;
        _ && (_.get || _.set) ? Object.defineProperty(p, M, _) : p[M] = R[M];
      }
      return p.default = R, q && q.set(R, p), p;
    }
    function m(R) {
      return R && R.__esModule ? R : { default: R };
    }
    function O(R, L) {
      for (var q = 0; q < L.length; q++) {
        var p = L[q];
        p.enumerable = p.enumerable || false, p.configurable = true, "value" in p && (p.writable = true), Object.defineProperty(R, p.key, p);
      }
    }
    function d(R, L, q) {
      return L && O(R.prototype, L), Object.defineProperty(R, "prototype", { writable: false }), R;
    }
    var g = (f = {}, f[c.space] = true, f[c.cr] = true, f[c.feed] = true, f[c.newline] = true, f[c.tab] = true, f), N = Object.assign({}, g, (l = {}, l[c.comment] = true, l));
    function A(R) {
      return { line: R[t.FIELDS.START_LINE], column: R[t.FIELDS.START_COL] };
    }
    function H(R) {
      return { line: R[t.FIELDS.END_LINE], column: R[t.FIELDS.END_COL] };
    }
    function z(R, L, q, p) {
      return { start: { line: R, column: L }, end: { line: q, column: p } };
    }
    function K(R) {
      return z(R[t.FIELDS.START_LINE], R[t.FIELDS.START_COL], R[t.FIELDS.END_LINE], R[t.FIELDS.END_COL]);
    }
    function W(R, L) {
      if (R) return z(R[t.FIELDS.START_LINE], R[t.FIELDS.START_COL], L[t.FIELDS.END_LINE], L[t.FIELDS.END_COL]);
    }
    function J(R, L) {
      var q = R[L];
      if (typeof q == "string") return q.indexOf("\\") !== -1 && ((0, u.ensureObject)(R, "raws"), R[L] = (0, u.unesc)(q), R.raws[L] === void 0 && (R.raws[L] = q)), R;
    }
    function se(R, L) {
      for (var q = -1, p = []; (q = R.indexOf(L, q + 1)) !== -1; ) p.push(q);
      return p;
    }
    function le() {
      var R = Array.prototype.concat.apply([], arguments);
      return R.filter(function(L, q) {
        return q === R.indexOf(L);
      });
    }
    var ae = function() {
      function R(q, p) {
        p === void 0 && (p = {}), this.rule = q, this.options = Object.assign({ lossy: false, safe: false }, p), this.position = 0, this.css = typeof this.rule == "string" ? this.rule : this.rule.selector, this.tokens = (0, t.default)({ css: this.css, error: this._errorGenerator(), safe: this.options.safe });
        var b = W(this.tokens[0], this.tokens[this.tokens.length - 1]);
        this.root = new x.default({ source: b }), this.root.errorGenerator = this._errorGenerator();
        var M = new v.default({ source: { start: { line: 1, column: 1 } }, sourceIndex: 0 });
        this.root.append(M), this.current = M, this.loop();
      }
      var L = R.prototype;
      return L._errorGenerator = function() {
        var p = this;
        return function(b, M) {
          return typeof p.rule == "string" ? new Error(b) : p.rule.error(b, M);
        };
      }, L.attribute = function() {
        var p = [], b = this.currToken;
        for (this.position++; this.position < this.tokens.length && this.currToken[t.FIELDS.TYPE] !== c.closeSquare; ) p.push(this.currToken), this.position++;
        if (this.currToken[t.FIELDS.TYPE] !== c.closeSquare) return this.expected("closing square bracket", this.currToken[t.FIELDS.START_POS]);
        var M = p.length, _ = { source: z(b[1], b[2], this.currToken[3], this.currToken[4]), sourceIndex: b[t.FIELDS.START_POS] };
        if (M === 1 && !~[c.word].indexOf(p[0][t.FIELDS.TYPE])) return this.expected("attribute", p[0][t.FIELDS.START_POS]);
        for (var U = 0, Y = "", B = "", F = null, j = false; U < M; ) {
          var X = p[U], C = this.content(X), $ = p[U + 1];
          switch (X[t.FIELDS.TYPE]) {
            case c.space:
              if (j = true, this.options.lossy) break;
              if (F) {
                (0, u.ensureObject)(_, "spaces", F);
                var ue = _.spaces[F].after || "";
                _.spaces[F].after = ue + C;
                var oe = (0, u.getProp)(_, "raws", "spaces", F, "after") || null;
                oe && (_.raws.spaces[F].after = oe + C);
              } else Y = Y + C, B = B + C;
              break;
            case c.asterisk:
              if ($[t.FIELDS.TYPE] === c.equals) _.operator = C, F = "operator";
              else if ((!_.namespace || F === "namespace" && !j) && $) {
                Y && ((0, u.ensureObject)(_, "spaces", "attribute"), _.spaces.attribute.before = Y, Y = ""), B && ((0, u.ensureObject)(_, "raws", "spaces", "attribute"), _.raws.spaces.attribute.before = Y, B = ""), _.namespace = (_.namespace || "") + C;
                var te = (0, u.getProp)(_, "raws", "namespace") || null;
                te && (_.raws.namespace += C), F = "namespace";
              }
              j = false;
              break;
            case c.dollar:
              if (F === "value") {
                var Z = (0, u.getProp)(_, "raws", "value");
                _.value += "$", Z && (_.raws.value = Z + "$");
                break;
              }
            case c.caret:
              $[t.FIELDS.TYPE] === c.equals && (_.operator = C, F = "operator"), j = false;
              break;
            case c.combinator:
              if (C === "~" && $[t.FIELDS.TYPE] === c.equals && (_.operator = C, F = "operator"), C !== "|") {
                j = false;
                break;
              }
              $[t.FIELDS.TYPE] === c.equals ? (_.operator = C, F = "operator") : !_.namespace && !_.attribute && (_.namespace = true), j = false;
              break;
            case c.word:
              if ($ && this.content($) === "|" && p[U + 2] && p[U + 2][t.FIELDS.TYPE] !== c.equals && !_.operator && !_.namespace) _.namespace = C, F = "namespace";
              else if (!_.attribute || F === "attribute" && !j) {
                Y && ((0, u.ensureObject)(_, "spaces", "attribute"), _.spaces.attribute.before = Y, Y = ""), B && ((0, u.ensureObject)(_, "raws", "spaces", "attribute"), _.raws.spaces.attribute.before = B, B = ""), _.attribute = (_.attribute || "") + C;
                var re = (0, u.getProp)(_, "raws", "attribute") || null;
                re && (_.raws.attribute += C), F = "attribute";
              } else if (!_.value && _.value !== "" || F === "value" && !(j || _.quoteMark)) {
                var ne = (0, u.unesc)(C), fe = (0, u.getProp)(_, "raws", "value") || "", pe = _.value || "";
                _.value = pe + ne, _.quoteMark = null, (ne !== C || fe) && ((0, u.ensureObject)(_, "raws"), _.raws.value = (fe || pe) + C), F = "value";
              } else {
                var de = C === "i" || C === "I";
                (_.value || _.value === "") && (_.quoteMark || j) ? (_.insensitive = de, (!de || C === "I") && ((0, u.ensureObject)(_, "raws"), _.raws.insensitiveFlag = C), F = "insensitive", Y && ((0, u.ensureObject)(_, "spaces", "insensitive"), _.spaces.insensitive.before = Y, Y = ""), B && ((0, u.ensureObject)(_, "raws", "spaces", "insensitive"), _.raws.spaces.insensitive.before = B, B = "")) : (_.value || _.value === "") && (F = "value", _.value += C, _.raws.value && (_.raws.value += C));
              }
              j = false;
              break;
            case c.str:
              if (!_.attribute || !_.operator) return this.error("Expected an attribute followed by an operator preceding the string.", { index: X[t.FIELDS.START_POS] });
              var he = (0, a.unescapeValue)(C), Ct = he.unescaped, Ut = he.quoteMark;
              _.value = Ct, _.quoteMark = Ut, F = "value", (0, u.ensureObject)(_, "raws"), _.raws.value = C, j = false;
              break;
            case c.equals:
              if (!_.attribute) return this.expected("attribute", X[t.FIELDS.START_POS], C);
              if (_.value) return this.error('Unexpected "=" found; an operator was already defined.', { index: X[t.FIELDS.START_POS] });
              _.operator = _.operator ? _.operator + C : C, F = "operator", j = false;
              break;
            case c.comment:
              if (F) if (j || $ && $[t.FIELDS.TYPE] === c.space || F === "insensitive") {
                var Wt = (0, u.getProp)(_, "spaces", F, "after") || "", Bt = (0, u.getProp)(_, "raws", "spaces", F, "after") || Wt;
                (0, u.ensureObject)(_, "raws", "spaces", F), _.raws.spaces[F].after = Bt + C;
              } else {
                var Qt = _[F] || "", Yt = (0, u.getProp)(_, "raws", F) || Qt;
                (0, u.ensureObject)(_, "raws"), _.raws[F] = Yt + C;
              }
              else B = B + C;
              break;
            default:
              return this.error('Unexpected "' + C + '" found.', { index: X[t.FIELDS.START_POS] });
          }
          U++;
        }
        J(_, "attribute"), J(_, "namespace"), this.newNode(new a.default(_)), this.position++;
      }, L.parseWhitespaceEquivalentTokens = function(p) {
        p < 0 && (p = this.tokens.length);
        var b = this.position, M = [], _ = "", U = void 0;
        do
          if (g[this.currToken[t.FIELDS.TYPE]]) this.options.lossy || (_ += this.content());
          else if (this.currToken[t.FIELDS.TYPE] === c.comment) {
            var Y = {};
            _ && (Y.before = _, _ = ""), U = new P.default({ value: this.content(), source: K(this.currToken), sourceIndex: this.currToken[t.FIELDS.START_POS], spaces: Y }), M.push(U);
          }
        while (++this.position < p);
        if (_) {
          if (U) U.spaces.after = _;
          else if (!this.options.lossy) {
            var B = this.tokens[b], F = this.tokens[this.position - 1];
            M.push(new e.default({ value: "", source: z(B[t.FIELDS.START_LINE], B[t.FIELDS.START_COL], F[t.FIELDS.END_LINE], F[t.FIELDS.END_COL]), sourceIndex: B[t.FIELDS.START_POS], spaces: { before: _, after: "" } }));
          }
        }
        return M;
      }, L.convertWhitespaceNodesToSpace = function(p, b) {
        var M = this;
        b === void 0 && (b = false);
        var _ = "", U = "";
        p.forEach(function(B) {
          var F = M.lossySpace(B.spaces.before, b), j = M.lossySpace(B.rawSpaceBefore, b);
          _ += F + M.lossySpace(B.spaces.after, b && F.length === 0), U += F + B.value + M.lossySpace(B.rawSpaceAfter, b && j.length === 0);
        }), U === _ && (U = void 0);
        var Y = { space: _, rawSpace: U };
        return Y;
      }, L.isNamedCombinator = function(p) {
        return p === void 0 && (p = this.position), this.tokens[p + 0] && this.tokens[p + 0][t.FIELDS.TYPE] === c.slash && this.tokens[p + 1] && this.tokens[p + 1][t.FIELDS.TYPE] === c.word && this.tokens[p + 2] && this.tokens[p + 2][t.FIELDS.TYPE] === c.slash;
      }, L.namedCombinator = function() {
        if (this.isNamedCombinator()) {
          var p = this.content(this.tokens[this.position + 1]), b = (0, u.unesc)(p).toLowerCase(), M = {};
          b !== p && (M.value = "/" + p + "/");
          var _ = new h.default({ value: "/" + b + "/", source: z(this.currToken[t.FIELDS.START_LINE], this.currToken[t.FIELDS.START_COL], this.tokens[this.position + 2][t.FIELDS.END_LINE], this.tokens[this.position + 2][t.FIELDS.END_COL]), sourceIndex: this.currToken[t.FIELDS.START_POS], raws: M });
          return this.position = this.position + 3, _;
        } else this.unexpected();
      }, L.combinator = function() {
        var p = this;
        if (this.content() === "|") return this.namespace();
        var b = this.locateNextMeaningfulToken(this.position);
        if (b < 0 || this.tokens[b][t.FIELDS.TYPE] === c.comma || this.tokens[b][t.FIELDS.TYPE] === c.closeParenthesis) {
          var M = this.parseWhitespaceEquivalentTokens(b);
          if (M.length > 0) {
            var _ = this.current.last;
            if (_) {
              var U = this.convertWhitespaceNodesToSpace(M), Y = U.space, B = U.rawSpace;
              B !== void 0 && (_.rawSpaceAfter += B), _.spaces.after += Y;
            } else M.forEach(function(fe) {
              return p.newNode(fe);
            });
          }
          return;
        }
        var F = this.currToken, j = void 0;
        b > this.position && (j = this.parseWhitespaceEquivalentTokens(b));
        var X;
        if (this.isNamedCombinator() ? X = this.namedCombinator() : this.currToken[t.FIELDS.TYPE] === c.combinator ? (X = new h.default({ value: this.content(), source: K(this.currToken), sourceIndex: this.currToken[t.FIELDS.START_POS] }), this.position++) : g[this.currToken[t.FIELDS.TYPE]] || j || this.unexpected(), X) {
          if (j) {
            var C = this.convertWhitespaceNodesToSpace(j), $ = C.space, ue = C.rawSpace;
            X.spaces.before = $, X.rawSpaceBefore = ue;
          }
        } else {
          var oe = this.convertWhitespaceNodesToSpace(j, true), te = oe.space, Z = oe.rawSpace;
          Z || (Z = te);
          var re = {}, ne = { spaces: {} };
          te.endsWith(" ") && Z.endsWith(" ") ? (re.before = te.slice(0, te.length - 1), ne.spaces.before = Z.slice(0, Z.length - 1)) : te.startsWith(" ") && Z.startsWith(" ") ? (re.after = te.slice(1), ne.spaces.after = Z.slice(1)) : ne.value = Z, X = new h.default({ value: " ", source: W(F, this.tokens[this.position - 1]), sourceIndex: F[t.FIELDS.START_POS], spaces: re, raws: ne });
        }
        return this.currToken && this.currToken[t.FIELDS.TYPE] === c.space && (X.spaces.after = this.optionalSpace(this.content()), this.position++), this.newNode(X);
      }, L.comma = function() {
        if (this.position === this.tokens.length - 1) {
          this.root.trailingComma = true, this.position++;
          return;
        }
        this.current._inferEndPosition();
        var p = new v.default({ source: { start: A(this.tokens[this.position + 1]) }, sourceIndex: this.tokens[this.position + 1][t.FIELDS.START_POS] });
        this.current.parent.append(p), this.current = p, this.position++;
      }, L.comment = function() {
        var p = this.currToken;
        this.newNode(new P.default({ value: this.content(), source: K(p), sourceIndex: p[t.FIELDS.START_POS] })), this.position++;
      }, L.error = function(p, b) {
        throw this.root.error(p, b);
      }, L.missingBackslash = function() {
        return this.error("Expected a backslash preceding the semicolon.", { index: this.currToken[t.FIELDS.START_POS] });
      }, L.missingParenthesis = function() {
        return this.expected("opening parenthesis", this.currToken[t.FIELDS.START_POS]);
      }, L.missingSquareBracket = function() {
        return this.expected("opening square bracket", this.currToken[t.FIELDS.START_POS]);
      }, L.unexpected = function() {
        return this.error("Unexpected '" + this.content() + "'. Escaping special characters with \\ may help.", this.currToken[t.FIELDS.START_POS]);
      }, L.unexpectedPipe = function() {
        return this.error("Unexpected '|'.", this.currToken[t.FIELDS.START_POS]);
      }, L.namespace = function() {
        var p = this.prevToken && this.content(this.prevToken) || true;
        if (this.nextToken[t.FIELDS.TYPE] === c.word) return this.position++, this.word(p);
        if (this.nextToken[t.FIELDS.TYPE] === c.asterisk) return this.position++, this.universal(p);
        this.unexpectedPipe();
      }, L.nesting = function() {
        if (this.nextToken) {
          var p = this.content(this.nextToken);
          if (p === "|") {
            this.position++;
            return;
          }
        }
        var b = this.currToken;
        this.newNode(new k.default({ value: this.content(), source: K(b), sourceIndex: b[t.FIELDS.START_POS] })), this.position++;
      }, L.parentheses = function() {
        var p = this.current.last, b = 1;
        if (this.position++, p && p.type === s.PSEUDO) {
          var M = new v.default({ source: { start: A(this.tokens[this.position]) }, sourceIndex: this.tokens[this.position][t.FIELDS.START_POS] }), _ = this.current;
          for (p.append(M), this.current = M; this.position < this.tokens.length && b; ) this.currToken[t.FIELDS.TYPE] === c.openParenthesis && b++, this.currToken[t.FIELDS.TYPE] === c.closeParenthesis && b--, b ? this.parse() : (this.current.source.end = H(this.currToken), this.current.parent.source.end = H(this.currToken), this.position++);
          this.current = _;
        } else {
          for (var U = this.currToken, Y = "(", B; this.position < this.tokens.length && b; ) this.currToken[t.FIELDS.TYPE] === c.openParenthesis && b++, this.currToken[t.FIELDS.TYPE] === c.closeParenthesis && b--, B = this.currToken, Y += this.parseParenthesisToken(this.currToken), this.position++;
          p ? p.appendToPropertyAndEscape("value", Y, Y) : this.newNode(new e.default({ value: Y, source: z(U[t.FIELDS.START_LINE], U[t.FIELDS.START_COL], B[t.FIELDS.END_LINE], B[t.FIELDS.END_COL]), sourceIndex: U[t.FIELDS.START_POS] }));
        }
        if (b) return this.expected("closing parenthesis", this.currToken[t.FIELDS.START_POS]);
      }, L.pseudo = function() {
        for (var p = this, b = "", M = this.currToken; this.currToken && this.currToken[t.FIELDS.TYPE] === c.colon; ) b += this.content(), this.position++;
        if (!this.currToken) return this.expected(["pseudo-class", "pseudo-element"], this.position - 1);
        if (this.currToken[t.FIELDS.TYPE] === c.word) this.splitWord(false, function(_, U) {
          b += _, p.newNode(new n.default({ value: b, source: W(M, p.currToken), sourceIndex: M[t.FIELDS.START_POS] })), U > 1 && p.nextToken && p.nextToken[t.FIELDS.TYPE] === c.openParenthesis && p.error("Misplaced parenthesis.", { index: p.nextToken[t.FIELDS.START_POS] });
        });
        else return this.expected(["pseudo-class", "pseudo-element"], this.currToken[t.FIELDS.START_POS]);
      }, L.space = function() {
        var p = this.content();
        this.position === 0 || this.prevToken[t.FIELDS.TYPE] === c.comma || this.prevToken[t.FIELDS.TYPE] === c.openParenthesis || this.current.nodes.every(function(b) {
          return b.type === "comment";
        }) ? (this.spaces = this.optionalSpace(p), this.position++) : this.position === this.tokens.length - 1 || this.nextToken[t.FIELDS.TYPE] === c.comma || this.nextToken[t.FIELDS.TYPE] === c.closeParenthesis ? (this.current.last.spaces.after = this.optionalSpace(p), this.position++) : this.combinator();
      }, L.string = function() {
        var p = this.currToken;
        this.newNode(new e.default({ value: this.content(), source: K(p), sourceIndex: p[t.FIELDS.START_POS] })), this.position++;
      }, L.universal = function(p) {
        var b = this.nextToken;
        if (b && this.content(b) === "|") return this.position++, this.namespace();
        var M = this.currToken;
        this.newNode(new o.default({ value: this.content(), source: K(M), sourceIndex: M[t.FIELDS.START_POS] }), p), this.position++;
      }, L.splitWord = function(p, b) {
        for (var M = this, _ = this.nextToken, U = this.content(); _ && ~[c.dollar, c.caret, c.equals, c.word].indexOf(_[t.FIELDS.TYPE]); ) {
          this.position++;
          var Y = this.content();
          if (U += Y, Y.lastIndexOf("\\") === Y.length - 1) {
            var B = this.nextToken;
            B && B[t.FIELDS.TYPE] === c.space && (U += this.requiredSpace(this.content(B)), this.position++);
          }
          _ = this.nextToken;
        }
        var F = se(U, ".").filter(function($) {
          var ue = U[$ - 1] === "\\", oe = /^\d+\.\d+%$/.test(U);
          return !ue && !oe;
        }), j = se(U, "#").filter(function($) {
          return U[$ - 1] !== "\\";
        }), X = se(U, "#{");
        X.length && (j = j.filter(function($) {
          return !~X.indexOf($);
        }));
        var C = (0, I.default)(le([0].concat(F, j)));
        C.forEach(function($, ue) {
          var oe = C[ue + 1] || U.length, te = U.slice($, oe);
          if (ue === 0 && b) return b.call(M, te, C.length);
          var Z, re = M.currToken, ne = re[t.FIELDS.START_POS] + C[ue], fe = z(re[1], re[2] + $, re[3], re[2] + (oe - 1));
          if (~F.indexOf($)) {
            var pe = { value: te.slice(1), source: fe, sourceIndex: ne };
            Z = new S.default(J(pe, "value"));
          } else if (~j.indexOf($)) {
            var de = { value: te.slice(1), source: fe, sourceIndex: ne };
            Z = new y.default(J(de, "value"));
          } else {
            var he = { value: te, source: fe, sourceIndex: ne };
            J(he, "value"), Z = new E.default(he);
          }
          M.newNode(Z, p), p = null;
        }), this.position++;
      }, L.word = function(p) {
        var b = this.nextToken;
        return b && this.content(b) === "|" ? (this.position++, this.namespace()) : this.splitWord(p);
      }, L.loop = function() {
        for (; this.position < this.tokens.length; ) this.parse(true);
        return this.current._inferEndPosition(), this.root;
      }, L.parse = function(p) {
        switch (this.currToken[t.FIELDS.TYPE]) {
          case c.space:
            this.space();
            break;
          case c.comment:
            this.comment();
            break;
          case c.openParenthesis:
            this.parentheses();
            break;
          case c.closeParenthesis:
            p && this.missingParenthesis();
            break;
          case c.openSquare:
            this.attribute();
            break;
          case c.dollar:
          case c.caret:
          case c.equals:
          case c.word:
            this.word();
            break;
          case c.colon:
            this.pseudo();
            break;
          case c.comma:
            this.comma();
            break;
          case c.asterisk:
            this.universal();
            break;
          case c.ampersand:
            this.nesting();
            break;
          case c.slash:
          case c.combinator:
            this.combinator();
            break;
          case c.str:
            this.string();
            break;
          case c.closeSquare:
            this.missingSquareBracket();
          case c.semicolon:
            this.missingBackslash();
          default:
            this.unexpected();
        }
      }, L.expected = function(p, b, M) {
        if (Array.isArray(p)) {
          var _ = p.pop();
          p = p.join(", ") + " or " + _;
        }
        var U = /^[aeiou]/.test(p[0]) ? "an" : "a";
        return M ? this.error("Expected " + U + " " + p + ', found "' + M + '" instead.', { index: b }) : this.error("Expected " + U + " " + p + ".", { index: b });
      }, L.requiredSpace = function(p) {
        return this.options.lossy ? " " : p;
      }, L.optionalSpace = function(p) {
        return this.options.lossy ? "" : p;
      }, L.lossySpace = function(p, b) {
        return this.options.lossy ? b ? " " : "" : p;
      }, L.parseParenthesisToken = function(p) {
        var b = this.content(p);
        return p[t.FIELDS.TYPE] === c.space ? this.requiredSpace(b) : b;
      }, L.newNode = function(p, b) {
        return b && (/^ +$/.test(b) && (this.options.lossy || (this.spaces = (this.spaces || "") + b), b = true), p.namespace = b, J(p, "namespace")), this.spaces && (p.spaces.before = this.spaces, this.spaces = ""), this.current.append(p);
      }, L.content = function(p) {
        return p === void 0 && (p = this.currToken), this.css.slice(p[t.FIELDS.START_POS], p[t.FIELDS.END_POS]);
      }, L.locateNextMeaningfulToken = function(p) {
        p === void 0 && (p = this.position + 1);
        for (var b = p; b < this.tokens.length; ) if (N[this.tokens[b][t.FIELDS.TYPE]]) {
          b++;
          continue;
        } else return b;
        return -1;
      }, d(R, [{ key: "currToken", get: function() {
        return this.tokens[this.position];
      } }, { key: "nextToken", get: function() {
        return this.tokens[this.position + 1];
      } }, { key: "prevToken", get: function() {
        return this.tokens[this.position - 1];
      } }]), R;
    }();
    r.default = ae, w.exports = r.default;
  }(Se, Se.exports)), Se.exports;
}
var St;
function Zt() {
  return St || (St = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = v(Xt());
    function v(P) {
      return P && P.__esModule ? P : { default: P };
    }
    var S = function() {
      function P(E, e) {
        this.func = E || function() {
        }, this.funcRes = null, this.options = e;
      }
      var y = P.prototype;
      return y._shouldUpdateSelector = function(e, n) {
        n === void 0 && (n = {});
        var a = Object.assign({}, this.options, n);
        return a.updateSelector === false ? false : typeof e != "string";
      }, y._isLossy = function(e) {
        e === void 0 && (e = {});
        var n = Object.assign({}, this.options, e);
        return n.lossless === false;
      }, y._root = function(e, n) {
        n === void 0 && (n = {});
        var a = new x.default(e, this._parseOptions(n));
        return a.root;
      }, y._parseOptions = function(e) {
        return { lossy: this._isLossy(e) };
      }, y._run = function(e, n) {
        var a = this;
        return n === void 0 && (n = {}), new Promise(function(o, h) {
          try {
            var k = a._root(e, n);
            Promise.resolve(a.func(k)).then(function(I) {
              var t = void 0;
              return a._shouldUpdateSelector(e, n) && (t = k.toString(), e.selector = t), { transform: I, root: k, string: t };
            }).then(o, h);
          } catch (I) {
            h(I);
            return;
          }
        });
      }, y._runSync = function(e, n) {
        n === void 0 && (n = {});
        var a = this._root(e, n), o = this.func(a);
        if (o && typeof o.then == "function") throw new Error("Selector processor returned a promise to a synchronous call.");
        var h = void 0;
        return n.updateSelector && typeof e != "string" && (h = a.toString(), e.selector = h), { transform: o, root: a, string: h };
      }, y.ast = function(e, n) {
        return this._run(e, n).then(function(a) {
          return a.root;
        });
      }, y.astSync = function(e, n) {
        return this._runSync(e, n).root;
      }, y.transform = function(e, n) {
        return this._run(e, n).then(function(a) {
          return a.transform;
        });
      }, y.transformSync = function(e, n) {
        return this._runSync(e, n).transform;
      }, y.process = function(e, n) {
        return this._run(e, n).then(function(a) {
          return a.string || a.root.toString();
        });
      }, y.processSync = function(e, n) {
        var a = this._runSync(e, n);
        return a.string || a.root.toString();
      }, P;
    }();
    r.default = S, w.exports = r.default;
  }(ge, ge.exports)), ge.exports;
}
var Qe = {}, V = {}, Tt;
function er() {
  if (Tt) return V;
  Tt = 1, V.__esModule = true, V.universal = V.tag = V.string = V.selector = V.root = V.pseudo = V.nesting = V.id = V.comment = V.combinator = V.className = V.attribute = void 0;
  var w = h(Lt()), r = h(bt()), x = h(Nt()), v = h(It()), S = h(xt()), P = h(Mt()), y = h(Rt()), E = h(Pt()), e = h(kt()), n = h(Dt()), a = h(qt()), o = h(At());
  function h(d) {
    return d && d.__esModule ? d : { default: d };
  }
  var k = function(g) {
    return new w.default(g);
  };
  V.attribute = k;
  var I = function(g) {
    return new r.default(g);
  };
  V.className = I;
  var t = function(g) {
    return new x.default(g);
  };
  V.combinator = t;
  var c = function(g) {
    return new v.default(g);
  };
  V.comment = c;
  var s = function(g) {
    return new S.default(g);
  };
  V.id = s;
  var u = function(g) {
    return new P.default(g);
  };
  V.nesting = u;
  var f = function(g) {
    return new y.default(g);
  };
  V.pseudo = f;
  var l = function(g) {
    return new E.default(g);
  };
  V.root = l;
  var i = function(g) {
    return new e.default(g);
  };
  V.selector = i;
  var T = function(g) {
    return new n.default(g);
  };
  V.string = T;
  var m = function(g) {
    return new a.default(g);
  };
  V.tag = m;
  var O = function(g) {
    return new o.default(g);
  };
  return V.universal = O, V;
}
var Q = {}, yt;
function tr() {
  if (yt) return Q;
  yt = 1, Q.__esModule = true, Q.isComment = Q.isCombinator = Q.isClassName = Q.isAttribute = void 0, Q.isContainer = f, Q.isIdentifier = void 0, Q.isNamespace = l, Q.isNesting = void 0, Q.isNode = v, Q.isPseudo = void 0, Q.isPseudoClass = u, Q.isPseudoElement = s, Q.isUniversal = Q.isTag = Q.isString = Q.isSelector = Q.isRoot = void 0;
  var w = ee(), r, x = (r = {}, r[w.ATTRIBUTE] = true, r[w.CLASS] = true, r[w.COMBINATOR] = true, r[w.COMMENT] = true, r[w.ID] = true, r[w.NESTING] = true, r[w.PSEUDO] = true, r[w.ROOT] = true, r[w.SELECTOR] = true, r[w.STRING] = true, r[w.TAG] = true, r[w.UNIVERSAL] = true, r);
  function v(i) {
    return typeof i == "object" && x[i.type];
  }
  function S(i, T) {
    return v(T) && T.type === i;
  }
  var P = S.bind(null, w.ATTRIBUTE);
  Q.isAttribute = P;
  var y = S.bind(null, w.CLASS);
  Q.isClassName = y;
  var E = S.bind(null, w.COMBINATOR);
  Q.isCombinator = E;
  var e = S.bind(null, w.COMMENT);
  Q.isComment = e;
  var n = S.bind(null, w.ID);
  Q.isIdentifier = n;
  var a = S.bind(null, w.NESTING);
  Q.isNesting = a;
  var o = S.bind(null, w.PSEUDO);
  Q.isPseudo = o;
  var h = S.bind(null, w.ROOT);
  Q.isRoot = h;
  var k = S.bind(null, w.SELECTOR);
  Q.isSelector = k;
  var I = S.bind(null, w.STRING);
  Q.isString = I;
  var t = S.bind(null, w.TAG);
  Q.isTag = t;
  var c = S.bind(null, w.UNIVERSAL);
  Q.isUniversal = c;
  function s(i) {
    return o(i) && i.value && (i.value.startsWith("::") || i.value.toLowerCase() === ":before" || i.value.toLowerCase() === ":after" || i.value.toLowerCase() === ":first-letter" || i.value.toLowerCase() === ":first-line");
  }
  function u(i) {
    return o(i) && !s(i);
  }
  function f(i) {
    return !!(v(i) && i.walk);
  }
  function l(i) {
    return P(i) || t(i);
  }
  return Q;
}
var Ot;
function rr() {
  return Ot || (Ot = 1, function(w) {
    w.__esModule = true;
    var r = ee();
    Object.keys(r).forEach(function(S) {
      S === "default" || S === "__esModule" || S in w && w[S] === r[S] || (w[S] = r[S]);
    });
    var x = er();
    Object.keys(x).forEach(function(S) {
      S === "default" || S === "__esModule" || S in w && w[S] === x[S] || (w[S] = x[S]);
    });
    var v = tr();
    Object.keys(v).forEach(function(S) {
      S === "default" || S === "__esModule" || S in w && w[S] === v[S] || (w[S] = v[S]);
    });
  }(Qe)), Qe;
}
var mt;
function nr() {
  return mt || (mt = 1, function(w, r) {
    r.__esModule = true, r.default = void 0;
    var x = y(Zt()), v = P(rr());
    function S(n) {
      if (typeof WeakMap != "function") return null;
      var a = /* @__PURE__ */ new WeakMap(), o = /* @__PURE__ */ new WeakMap();
      return (S = function(k) {
        return k ? o : a;
      })(n);
    }
    function P(n, a) {
      if (n && n.__esModule) return n;
      if (n === null || typeof n != "object" && typeof n != "function") return { default: n };
      var o = S(a);
      if (o && o.has(n)) return o.get(n);
      var h = {}, k = Object.defineProperty && Object.getOwnPropertyDescriptor;
      for (var I in n) if (I !== "default" && Object.prototype.hasOwnProperty.call(n, I)) {
        var t = k ? Object.getOwnPropertyDescriptor(n, I) : null;
        t && (t.get || t.set) ? Object.defineProperty(h, I, t) : h[I] = n[I];
      }
      return h.default = n, o && o.set(n, h), h;
    }
    function y(n) {
      return n && n.__esModule ? n : { default: n };
    }
    var E = function(a) {
      return new x.default(a);
    };
    Object.assign(E, v), delete E.__esModule;
    var e = E;
    r.default = e, w.exports = r.default;
  }(_e, _e.exports)), _e.exports;
}
var wt;
function ir() {
  if (wt) return ve.exports;
  wt = 1;
  const { AtRule: w, Rule: r } = Vt();
  let x = nr();
  function v(s, u) {
    let f;
    try {
      x((l) => {
        f = l;
      }).processSync(s);
    } catch (l) {
      throw s.includes(":") ? u ? u.error("Missed semicolon") : l : u ? u.error(l.message) : l;
    }
    return f.at(0);
  }
  function S(s, u) {
    let f = false;
    return s.each((l) => {
      if (l.type === "nesting") {
        let i = u.clone({});
        l.value !== "&" ? l.replaceWith(v(l.value.replace("&", i.toString()))) : l.replaceWith(i), f = true;
      } else "nodes" in l && l.nodes && S(l, u) && (f = true);
    }), f;
  }
  function P(s, u) {
    let f = [];
    return s.selectors.forEach((l) => {
      let i = v(l, s);
      u.selectors.forEach((T) => {
        if (!T) return;
        let m = v(T, u);
        S(m, i) || (m.prepend(x.combinator({ value: " " })), m.prepend(i.clone({}))), f.push(m.toString());
      });
    }), f;
  }
  function y(s, u) {
    let f = s.prev();
    for (u.after(s); f && f.type === "comment"; ) {
      let l = f.prev();
      u.after(f), f = l;
    }
    return s;
  }
  function E(s) {
    return function u(f, l, i, T = i) {
      let m = [];
      if (l.each((O) => {
        O.type === "rule" && i ? T && (O.selectors = P(f, O)) : O.type === "atrule" && O.nodes ? s[O.name] ? u(f, O, T) : l[k] !== false && m.push(O) : m.push(O);
      }), i && m.length) {
        let O = f.clone({ nodes: [] });
        for (let d of m) O.append(d);
        l.prepend(O);
      }
    };
  }
  function e(s, u, f) {
    let l = new r({ nodes: [], selector: s });
    return l.append(u), f.after(l), l;
  }
  function n(s, u) {
    let f = {};
    for (let l of s) f[l] = true;
    if (u) for (let l of u) f[l.replace(/^@/, "")] = true;
    return f;
  }
  function a(s) {
    s = s.trim();
    let u = s.match(/^\((.*)\)$/);
    if (!u) return { selector: s, type: "basic" };
    let f = u[1].match(/^(with(?:out)?):(.+)$/);
    if (f) {
      let l = f[1] === "with", i = Object.fromEntries(f[2].trim().split(/\s+/).map((m) => [m, true]));
      if (l && i.all) return { type: "noop" };
      let T = (m) => !!i[m];
      return i.all ? T = () => true : l && (T = (m) => m === "all" ? false : !i[m]), { escapes: T, type: "withrules" };
    }
    return { type: "unknown" };
  }
  function o(s) {
    let u = [], f = s.parent;
    for (; f && f instanceof w; ) u.push(f), f = f.parent;
    return u;
  }
  function h(s) {
    let u = s[I];
    if (!u) s.after(s.nodes);
    else {
      let f = s.nodes, l, i = -1, T, m, O, d = o(s);
      if (d.forEach((g, N) => {
        if (u(g.name)) l = g, i = N, m = O;
        else {
          let A = O;
          O = g.clone({ nodes: [] }), A && O.append(A), T = T || O;
        }
      }), l ? m ? (T.append(f), l.after(m)) : l.after(f) : s.after(f), s.next() && l) {
        let g;
        d.slice(0, i + 1).forEach((N, A, H) => {
          let z = g;
          g = N.clone({ nodes: [] }), z && g.append(z);
          let K = [], J = (H[A - 1] || s).next();
          for (; J; ) K.push(J), J = J.next();
          g.append(K);
        }), g && (m || f[f.length - 1]).after(g);
      }
    }
    s.remove();
  }
  const k = Symbol("rootRuleMergeSel"), I = Symbol("rootRuleEscapes");
  function t(s) {
    let { params: u } = s, { escapes: f, selector: l, type: i } = a(u);
    if (i === "unknown") throw s.error(`Unknown @${s.name} parameter ${JSON.stringify(u)}`);
    if (i === "basic" && l) {
      let T = new r({ nodes: s.nodes, selector: l });
      s.removeAll(), s.append(T);
    }
    s[I] = f, s[k] = f ? !f("all") : i === "noop";
  }
  const c = Symbol("hasRootRule");
  return ve.exports = (s = {}) => {
    let u = n(["media", "supports", "layer", "container", "starting-style"], s.bubble), f = E(u), l = n(["document", "font-face", "keyframes", "-webkit-keyframes", "-moz-keyframes"], s.unwrap), i = (s.rootRuleName || "at-root").replace(/^@/, ""), T = s.preserveEmpty;
    return { Once(m) {
      m.walkAtRules(i, (O) => {
        t(O), m[c] = true;
      });
    }, postcssPlugin: "postcss-nested", RootExit(m) {
      m[c] && (m.walkAtRules(i, h), m[c] = false);
    }, Rule(m) {
      let O = false, d = m, g = false, N = [];
      m.each((A) => {
        A.type === "rule" ? (N.length && (d = e(m.selector, N, d), N = []), g = true, O = true, A.selectors = P(m, A), d = y(A, d)) : A.type === "atrule" ? (N.length && (d = e(m.selector, N, d), N = []), A.name === i ? (O = true, f(m, A, true, A[k]), d = y(A, d)) : u[A.name] ? (g = true, O = true, f(m, A, true), d = y(A, d)) : l[A.name] ? (g = true, O = true, f(m, A, false), d = y(A, d)) : g && N.push(A)) : A.type === "decl" && g && N.push(A);
      }), N.length && (d = e(m.selector, N, d)), O && T !== true && (m.raws.semicolon = true, m.nodes.length === 0 && m.remove());
    } };
  }, ve.exports.postcss = true, ve.exports;
}
var sr = ir();
const fr = Gt(sr);
export {
  nr as a,
  Et as b,
  fr as p,
  Ge as r
};

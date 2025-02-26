var __defProp = Object.defineProperty;
var __typeError = (msg) => {
  throw TypeError(msg);
};
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __publicField = (obj, key, value) => __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
var __accessCheck = (obj, member, msg) => member.has(obj) || __typeError("Cannot " + msg);
var __privateGet = (obj, member, getter) => (__accessCheck(obj, member, "read from private field"), getter ? getter.call(obj) : member.get(obj));
var __privateAdd = (obj, member, value) => member.has(obj) ? __typeError("Cannot add the same private member more than once") : member instanceof WeakSet ? member.add(obj) : member.set(obj, value);
var __privateSet = (obj, member, value, setter) => (__accessCheck(obj, member, "write to private field"), setter ? setter.call(obj, value) : member.set(obj, value), value);
var __privateMethod = (obj, member, method) => (__accessCheck(obj, member, "access private method"), method);
import { B as I } from "./index-CgqXENQe.js";
import { p as F } from "./index-BAMY2Nnw.js";
import { g as Mt, __tla as __tla_0 } from "./module-oN1JnOJ9.js";
let ze, Be, x;
let __tla = Promise.all([
  (() => {
    try {
      return __tla_0;
    } catch {
    }
  })()
]).then(async () => {
  var _s, _n, _r, _t, _e2, _o, _c, _a, _i, _h, _u, _v_instances, p_fn, _v_static, l_fn, f_fn, d_fn;
  let Tt, Ot;
  ze = function r(t) {
    function e(n, i, o) {
      var a, c = {};
      if (Array.isArray(n)) return n.concat(i);
      for (a in n) c[o ? a.toLowerCase() : a] = n[a];
      for (a in i) {
        var l = o ? a.toLowerCase() : a, u = i[a];
        c[l] = l in c && typeof u == "object" ? e(c[l], u, l == "headers") : u;
      }
      return c;
    }
    function s(n, i, o, a, c) {
      var l = typeof n != "string" ? (i = n).url : n, u = {
        config: i
      }, h = e(t, i), p = {};
      a = a || h.data, (h.transformRequest || []).map(function(f) {
        a = f(a, h.headers) || a;
      }), h.auth && (p.authorization = h.auth), a && typeof a == "object" && typeof a.append != "function" && typeof a.text != "function" && (a = JSON.stringify(a), p["content-type"] = "application/json");
      try {
        p[h.xsrfHeaderName] = decodeURIComponent(document.cookie.match(RegExp("(^|; )" + h.xsrfCookieName + "=([^;]*)"))[2]);
      } catch {
      }
      return h.baseURL && (l = l.replace(/^(?!.*\/\/)\/?/, h.baseURL + "/")), h.params && (l += (~l.indexOf("?") ? "&" : "?") + (h.paramsSerializer ? h.paramsSerializer(h.params) : new URLSearchParams(h.params))), (h.fetch || fetch)(l, {
        method: (o || h.method || "get").toUpperCase(),
        body: a,
        headers: e(h.headers, p, true),
        credentials: h.withCredentials ? "include" : c
      }).then(function(f) {
        for (var m in f) typeof f[m] != "function" && (u[m] = f[m]);
        return h.responseType == "stream" ? (u.data = f.body, u) : f[h.responseType || "text"]().then(function(d) {
          u.data = d, u.data = JSON.parse(d);
        }).catch(Object).then(function() {
          return (h.validateStatus ? h.validateStatus(f.status) : f.ok) ? u : Promise.reject(u);
        });
      });
    }
    return t = t || {}, s.request = s, s.get = function(n, i) {
      return s(n, i, "get");
    }, s.delete = function(n, i) {
      return s(n, i, "delete");
    }, s.head = function(n, i) {
      return s(n, i, "head");
    }, s.options = function(n, i) {
      return s(n, i, "options");
    }, s.post = function(n, i, o) {
      return s(n, o, "post", i);
    }, s.put = function(n, i, o) {
      return s(n, o, "put", i);
    }, s.patch = function(n, i, o) {
      return s(n, o, "patch", i);
    }, s.all = Promise.all.bind(Promise), s.spread = function(n) {
      return n.apply.bind(n, n);
    }, s.CancelToken = typeof AbortController == "function" ? AbortController : Object, s.defaults = t, s.create = r, s;
  }();
  Tt = "" + new URL("oxide_parser_wasm_bg-DqbpSEG6.wasm", import.meta.url).href;
  Ot = async (r = {}, t) => {
    let e;
    if (t.startsWith("data:")) {
      const s = t.replace(/^data:.*?base64,/, "");
      let n;
      if (typeof I == "function" && typeof I.from == "function") n = I.from(s, "base64");
      else if (typeof atob == "function") {
        const i = atob(s);
        n = new Uint8Array(i.length);
        for (let o = 0; o < i.length; o++) n[o] = i.charCodeAt(o);
      } else throw new Error("Cannot decode base64-encoded data URL");
      e = await WebAssembly.instantiate(n, r);
    } else {
      const s = await fetch(t), n = s.headers.get("Content-Type") || "";
      if ("instantiateStreaming" in WebAssembly && n.startsWith("application/wasm")) e = await WebAssembly.instantiateStreaming(s, r);
      else {
        const i = await s.arrayBuffer();
        e = await WebAssembly.instantiate(i, r);
      }
    }
    return e.instance.exports;
  };
  let $;
  function $t(r) {
    $ = r;
  }
  const At = typeof TextDecoder > "u" ? (0, module.require)("util").TextDecoder : TextDecoder;
  let pt = new At("utf-8", {
    ignoreBOM: true,
    fatal: true
  });
  pt.decode();
  let U = null;
  function z() {
    return (U === null || U.byteLength === 0) && (U = new Uint8Array($.memory.buffer)), U;
  }
  function Rt(r, t) {
    return r = r >>> 0, pt.decode(z().subarray(r, r + t));
  }
  let X = 0;
  const Ct = typeof TextEncoder > "u" ? (0, module.require)("util").TextEncoder : TextEncoder;
  let B = new Ct("utf-8");
  const Nt = typeof B.encodeInto == "function" ? function(r, t) {
    return B.encodeInto(r, t);
  } : function(r, t) {
    const e = B.encode(r);
    return t.set(e), {
      read: r.length,
      written: e.length
    };
  };
  function jt(r, t, e) {
    if (e === void 0) {
      const a = B.encode(r), c = t(a.length, 1) >>> 0;
      return z().subarray(c, c + a.length).set(a), X = a.length, c;
    }
    let s = r.length, n = t(s, 1) >>> 0;
    const i = z();
    let o = 0;
    for (; o < s; o++) {
      const a = r.charCodeAt(o);
      if (a > 127) break;
      i[n + o] = a;
    }
    if (o !== s) {
      o !== 0 && (r = r.slice(o)), n = e(n, s, s = o + r.length * 3, 1) >>> 0;
      const a = z().subarray(n + o, n + s), c = Nt(r, a);
      o += c.written, n = e(n, s, o, 1) >>> 0;
    }
    return X = o, n;
  }
  let W = null;
  function Wt() {
    return (W === null || W.buffer.detached === true || W.buffer.detached === void 0 && W.buffer !== $.memory.buffer) && (W = new DataView($.memory.buffer)), W;
  }
  function Lt(r, t) {
    r = r >>> 0;
    const e = Wt(), s = [];
    for (let n = r; n < r + 4 * t; n += 4) s.push($.__wbindgen_export_0.get(e.getUint32(n, true)));
    return $.__externref_drop_slice(r, t), s;
  }
  Be = function(r, t) {
    const e = jt(r, $.__wbindgen_malloc, $.__wbindgen_realloc), s = X, n = $.find_tw_candidates(e, s, t);
    var i = Lt(n[0], n[1]).slice();
    return $.__wbindgen_free(n[0], n[1] * 4, 4), i;
  };
  function Dt() {
    const r = $.__wbindgen_export_0, t = r.grow(4);
    r.set(0, void 0), r.set(t + 0, void 0), r.set(t + 1, null), r.set(t + 2, true), r.set(t + 3, false);
  }
  function kt(r, t) {
    return Rt(r, t);
  }
  URL = globalThis.URL;
  const R = await Ot({
    "./oxide_parser_wasm_bg.js": {
      __wbindgen_string_new: kt,
      __wbindgen_init_externref_table: Dt
    }
  }, Tt), Pt = R.memory, Ut = R.find_tw_candidates_ffi, zt = R.free_candidates, Bt = R.find_tw_candidates, qt = R.__wbindgen_export_0, Gt = R.__wbindgen_malloc, It = R.__wbindgen_realloc, Ft = R.__externref_drop_slice, Jt = R.__wbindgen_free, dt = R.__wbindgen_start, Vt = Object.freeze(Object.defineProperty({
    __proto__: null,
    __externref_drop_slice: Ft,
    __wbindgen_export_0: qt,
    __wbindgen_free: Jt,
    __wbindgen_malloc: Gt,
    __wbindgen_realloc: It,
    __wbindgen_start: dt,
    find_tw_candidates: Bt,
    find_tw_candidates_ffi: Ut,
    free_candidates: zt,
    memory: Pt
  }, Symbol.toStringTag, {
    value: "Module"
  }));
  $t(Vt);
  dt();
  var J, rt;
  function Zt() {
    if (rt) return J;
    rt = 1, J = r;
    function r(s, n, i) {
      s instanceof RegExp && (s = t(s, i)), n instanceof RegExp && (n = t(n, i));
      var o = e(s, n, i);
      return o && {
        start: o[0],
        end: o[1],
        pre: i.slice(0, o[0]),
        body: i.slice(o[0] + s.length, o[1]),
        post: i.slice(o[1] + n.length)
      };
    }
    function t(s, n) {
      var i = n.match(s);
      return i ? i[0] : null;
    }
    r.range = e;
    function e(s, n, i) {
      var o, a, c, l, u, h = i.indexOf(s), p = i.indexOf(n, h + 1), f = h;
      if (h >= 0 && p > 0) {
        if (s === n) return [
          h,
          p
        ];
        for (o = [], c = i.length; f >= 0 && !u; ) f == h ? (o.push(f), h = i.indexOf(s, f + 1)) : o.length == 1 ? u = [
          o.pop(),
          p
        ] : (a = o.pop(), a < c && (c = a, l = p), p = i.indexOf(n, f + 1)), f = h < p && h >= 0 ? h : p;
        o.length && (u = [
          c,
          l
        ]);
      }
      return u;
    }
    return J;
  }
  var V, ot;
  function Ht() {
    if (ot) return V;
    ot = 1;
    var r = Zt();
    V = u;
    var t = "\0SLASH" + Math.random() + "\0", e = "\0OPEN" + Math.random() + "\0", s = "\0CLOSE" + Math.random() + "\0", n = "\0COMMA" + Math.random() + "\0", i = "\0PERIOD" + Math.random() + "\0";
    function o(g) {
      return parseInt(g, 10) == g ? parseInt(g, 10) : g.charCodeAt(0);
    }
    function a(g) {
      return g.split("\\\\").join(t).split("\\{").join(e).split("\\}").join(s).split("\\,").join(n).split("\\.").join(i);
    }
    function c(g) {
      return g.split(t).join("\\").split(e).join("{").split(s).join("}").split(n).join(",").split(i).join(".");
    }
    function l(g) {
      if (!g) return [
        ""
      ];
      var y = [], E = r("{", "}", g);
      if (!E) return g.split(",");
      var w = E.pre, T = E.body, O = E.post, b = w.split(",");
      b[b.length - 1] += "{" + T + "}";
      var C = l(O);
      return O.length && (b[b.length - 1] += C.shift(), b.push.apply(b, C)), y.push.apply(y, b), y;
    }
    function u(g) {
      return g ? (g.substr(0, 2) === "{}" && (g = "\\{\\}" + g.substr(2)), d(a(g), true).map(c)) : [];
    }
    function h(g) {
      return "{" + g + "}";
    }
    function p(g) {
      return /^-?0\d/.test(g);
    }
    function f(g, y) {
      return g <= y;
    }
    function m(g, y) {
      return g >= y;
    }
    function d(g, y) {
      var E = [], w = r("{", "}", g);
      if (!w) return [
        g
      ];
      var T = w.pre, O = w.post.length ? d(w.post, false) : [
        ""
      ];
      if (/\$$/.test(w.pre)) for (var b = 0; b < O.length; b++) {
        var C = T + "{" + w.body + "}" + O[b];
        E.push(C);
      }
      else {
        var bt = /^-?\d+\.\.-?\d+(?:\.\.-?\d+)?$/.test(w.body), Q = /^[a-zA-Z]\.\.[a-zA-Z](?:\.\.-?\d+)?$/.test(w.body), P = bt || Q, _t2 = w.body.indexOf(",") >= 0;
        if (!P && !_t2) return w.post.match(/,.*\}/) ? (g = w.pre + "{" + w.body + s + w.post, d(g)) : [
          g
        ];
        var _;
        if (P) _ = w.body.split(/\.\./);
        else if (_ = l(w.body), _.length === 1 && (_ = d(_[0], false).map(h), _.length === 1)) return O.map(function(St) {
          return w.pre + _[0] + St;
        });
        var N;
        if (P) {
          var Y = o(_[0]), tt = o(_[1]), vt = Math.max(_[0].length, _[1].length), et = _.length == 3 ? Math.abs(o(_[2])) : 1, st = f, xt = tt < Y;
          xt && (et *= -1, st = m);
          var Et = _.some(p);
          N = [];
          for (var L = Y; st(L, tt); L += et) {
            var A;
            if (Q) A = String.fromCharCode(L), A === "\\" && (A = "");
            else if (A = String(L), Et) {
              var nt = vt - A.length;
              if (nt > 0) {
                var it = new Array(nt + 1).join("0");
                L < 0 ? A = "-" + it + A.slice(1) : A = it + A;
              }
            }
            N.push(A);
          }
        } else {
          N = [];
          for (var j = 0; j < _.length; j++) N.push.apply(N, d(_[j], false));
        }
        for (var j = 0; j < N.length; j++) for (var b = 0; b < O.length; b++) {
          var C = T + N[j] + O[b];
          (!y || P || C) && E.push(C);
        }
      }
      return E;
    }
    return V;
  }
  var Xt = Ht();
  const Kt = Mt(Xt), Qt = 1024 * 64, q = (r) => {
    if (typeof r != "string") throw new TypeError("invalid pattern");
    if (r.length > Qt) throw new TypeError("pattern is too long");
  }, Yt = {
    "[:alnum:]": [
      "\\p{L}\\p{Nl}\\p{Nd}",
      true
    ],
    "[:alpha:]": [
      "\\p{L}\\p{Nl}",
      true
    ],
    "[:ascii:]": [
      "\\x00-\\x7f",
      false
    ],
    "[:blank:]": [
      "\\p{Zs}\\t",
      true
    ],
    "[:cntrl:]": [
      "\\p{Cc}",
      true
    ],
    "[:digit:]": [
      "\\p{Nd}",
      true
    ],
    "[:graph:]": [
      "\\p{Z}\\p{C}",
      true,
      true
    ],
    "[:lower:]": [
      "\\p{Ll}",
      true
    ],
    "[:print:]": [
      "\\p{C}",
      true
    ],
    "[:punct:]": [
      "\\p{P}",
      true
    ],
    "[:space:]": [
      "\\p{Z}\\t\\r\\n\\v\\f",
      true
    ],
    "[:upper:]": [
      "\\p{Lu}",
      true
    ],
    "[:word:]": [
      "\\p{L}\\p{Nl}\\p{Nd}\\p{Pc}",
      true
    ],
    "[:xdigit:]": [
      "A-Fa-f0-9",
      false
    ]
  }, D = (r) => r.replace(/[[\]\\-]/g, "\\$&"), te = (r) => r.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&"), at = (r) => r.join(""), ee = (r, t) => {
    const e = t;
    if (r.charAt(e) !== "[") throw new Error("not in a brace expression");
    const s = [], n = [];
    let i = e + 1, o = false, a = false, c = false, l = false, u = e, h = "";
    t: for (; i < r.length; ) {
      const d = r.charAt(i);
      if ((d === "!" || d === "^") && i === e + 1) {
        l = true, i++;
        continue;
      }
      if (d === "]" && o && !c) {
        u = i + 1;
        break;
      }
      if (o = true, d === "\\" && !c) {
        c = true, i++;
        continue;
      }
      if (d === "[" && !c) {
        for (const [g, [y, E, w]] of Object.entries(Yt)) if (r.startsWith(g, i)) {
          if (h) return [
            "$.",
            false,
            r.length - e,
            true
          ];
          i += g.length, w ? n.push(y) : s.push(y), a = a || E;
          continue t;
        }
      }
      if (c = false, h) {
        d > h ? s.push(D(h) + "-" + D(d)) : d === h && s.push(D(d)), h = "", i++;
        continue;
      }
      if (r.startsWith("-]", i + 1)) {
        s.push(D(d + "-")), i += 2;
        continue;
      }
      if (r.startsWith("-", i + 1)) {
        h = d, i += 2;
        continue;
      }
      s.push(D(d)), i++;
    }
    if (u < i) return [
      "",
      false,
      0,
      false
    ];
    if (!s.length && !n.length) return [
      "$.",
      false,
      r.length - e,
      true
    ];
    if (n.length === 0 && s.length === 1 && /^\\?.$/.test(s[0]) && !l) {
      const d = s[0].length === 2 ? s[0].slice(-1) : s[0];
      return [
        te(d),
        false,
        u - e,
        false
      ];
    }
    const p = "[" + (l ? "^" : "") + at(s) + "]", f = "[" + (l ? "" : "^") + at(n) + "]";
    return [
      s.length && n.length ? "(" + p + "|" + f + ")" : s.length ? p : f,
      a,
      u - e,
      true
    ];
  }, k = (r, { windowsPathsNoEscape: t = false } = {}) => t ? r.replace(/\[([^\/\\])\]/g, "$1") : r.replace(/((?!\\).|^)\[([^\/\\])\]/g, "$1$2").replace(/\\([^\/])/g, "$1"), se = /* @__PURE__ */ new Set([
    "!",
    "?",
    "+",
    "*",
    "@"
  ]), ct = (r) => se.has(r), ne = "(?!(?:^|/)\\.\\.?(?:$|/))", Z = "(?!\\.)", ie = /* @__PURE__ */ new Set([
    "[",
    "."
  ]), re = /* @__PURE__ */ new Set([
    "..",
    "."
  ]), oe = new Set("().*{}+?[]^$\\!"), ae = (r) => r.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&"), K = "[^/]", ht = K + "*?", lt = K + "+?";
  const _v = class _v {
    constructor(t, e, s = {}) {
      __privateAdd(this, _v_instances);
      __publicField(this, "type");
      __privateAdd(this, _s);
      __privateAdd(this, _n);
      __privateAdd(this, _r, false);
      __privateAdd(this, _t, []);
      __privateAdd(this, _e2);
      __privateAdd(this, _o);
      __privateAdd(this, _c);
      __privateAdd(this, _a, false);
      __privateAdd(this, _i);
      __privateAdd(this, _h);
      __privateAdd(this, _u, false);
      this.type = t, t && __privateSet(this, _n, true), __privateSet(this, _e2, e), __privateSet(this, _s, __privateGet(this, _e2) ? __privateGet(__privateGet(this, _e2), _s) : this), __privateSet(this, _i, __privateGet(this, _s) === this ? s : __privateGet(__privateGet(this, _s), _i)), __privateSet(this, _c, __privateGet(this, _s) === this ? [] : __privateGet(__privateGet(this, _s), _c)), t === "!" && !__privateGet(__privateGet(this, _s), _a) && __privateGet(this, _c).push(this), __privateSet(this, _o, __privateGet(this, _e2) ? __privateGet(__privateGet(this, _e2), _t).length : 0);
    }
    get hasMagic() {
      if (__privateGet(this, _n) !== void 0) return __privateGet(this, _n);
      for (const t of __privateGet(this, _t)) if (typeof t != "string" && (t.type || t.hasMagic)) return __privateSet(this, _n, true);
      return __privateGet(this, _n);
    }
    toString() {
      return __privateGet(this, _h) !== void 0 ? __privateGet(this, _h) : this.type ? __privateSet(this, _h, this.type + "(" + __privateGet(this, _t).map((t) => String(t)).join("|") + ")") : __privateSet(this, _h, __privateGet(this, _t).map((t) => String(t)).join(""));
    }
    push(...t) {
      for (const e of t) if (e !== "") {
        if (typeof e != "string" && !(e instanceof _v && __privateGet(e, _e2) === this)) throw new Error("invalid part: " + e);
        __privateGet(this, _t).push(e);
      }
    }
    toJSON() {
      var _a2;
      const t = this.type === null ? __privateGet(this, _t).slice().map((e) => typeof e == "string" ? e : e.toJSON()) : [
        this.type,
        ...__privateGet(this, _t).map((e) => e.toJSON())
      ];
      return this.isStart() && !this.type && t.unshift([]), this.isEnd() && (this === __privateGet(this, _s) || __privateGet(__privateGet(this, _s), _a) && ((_a2 = __privateGet(this, _e2)) == null ? void 0 : _a2.type) === "!") && t.push({}), t;
    }
    isStart() {
      var _a2;
      if (__privateGet(this, _s) === this) return true;
      if (!((_a2 = __privateGet(this, _e2)) == null ? void 0 : _a2.isStart())) return false;
      if (__privateGet(this, _o) === 0) return true;
      const t = __privateGet(this, _e2);
      for (let e = 0; e < __privateGet(this, _o); e++) {
        const s = __privateGet(t, _t)[e];
        if (!(s instanceof _v && s.type === "!")) return false;
      }
      return true;
    }
    isEnd() {
      var _a2, _b, _c2;
      if (__privateGet(this, _s) === this || ((_a2 = __privateGet(this, _e2)) == null ? void 0 : _a2.type) === "!") return true;
      if (!((_b = __privateGet(this, _e2)) == null ? void 0 : _b.isEnd())) return false;
      if (!this.type) return (_c2 = __privateGet(this, _e2)) == null ? void 0 : _c2.isEnd();
      const t = __privateGet(this, _e2) ? __privateGet(__privateGet(this, _e2), _t).length : 0;
      return __privateGet(this, _o) === t - 1;
    }
    copyIn(t) {
      typeof t == "string" ? this.push(t) : this.push(t.clone(this));
    }
    clone(t) {
      const e = new _v(this.type, t);
      for (const s of __privateGet(this, _t)) e.copyIn(s);
      return e;
    }
    static fromGlob(t, e = {}) {
      var _a2;
      const s = new _v(null, void 0, e);
      return __privateMethod(_a2 = _v, _v_static, l_fn).call(_a2, t, s, 0, e), s;
    }
    toMMPattern() {
      if (this !== __privateGet(this, _s)) return __privateGet(this, _s).toMMPattern();
      const t = this.toString(), [e, s, n, i] = this.toRegExpSource();
      if (!(n || __privateGet(this, _n) || __privateGet(this, _i).nocase && !__privateGet(this, _i).nocaseMagicOnly && t.toUpperCase() !== t.toLowerCase())) return s;
      const a = (__privateGet(this, _i).nocase ? "i" : "") + (i ? "u" : "");
      return Object.assign(new RegExp(`^${e}$`, a), {
        _src: e,
        _glob: t
      });
    }
    get options() {
      return __privateGet(this, _i);
    }
    toRegExpSource(t) {
      var _a2;
      const e = t ?? !!__privateGet(this, _i).dot;
      if (__privateGet(this, _s) === this && __privateMethod(this, _v_instances, p_fn).call(this), !this.type) {
        const c = this.isStart() && this.isEnd(), l = __privateGet(this, _t).map((f) => {
          var _a3;
          const [m, d, g, y] = typeof f == "string" ? __privateMethod(_a3 = _v, _v_static, d_fn).call(_a3, f, __privateGet(this, _n), c) : f.toRegExpSource(t);
          return __privateSet(this, _n, __privateGet(this, _n) || g), __privateSet(this, _r, __privateGet(this, _r) || y), m;
        }).join("");
        let u = "";
        if (this.isStart() && typeof __privateGet(this, _t)[0] == "string" && !(__privateGet(this, _t).length === 1 && re.has(__privateGet(this, _t)[0]))) {
          const m = ie, d = e && m.has(l.charAt(0)) || l.startsWith("\\.") && m.has(l.charAt(2)) || l.startsWith("\\.\\.") && m.has(l.charAt(4)), g = !e && !t && m.has(l.charAt(0));
          u = d ? ne : g ? Z : "";
        }
        let h = "";
        return this.isEnd() && __privateGet(__privateGet(this, _s), _a) && ((_a2 = __privateGet(this, _e2)) == null ? void 0 : _a2.type) === "!" && (h = "(?:$|\\/)"), [
          u + l + h,
          k(l),
          __privateSet(this, _n, !!__privateGet(this, _n)),
          __privateGet(this, _r)
        ];
      }
      const s = this.type === "*" || this.type === "+", n = this.type === "!" ? "(?:(?!(?:" : "(?:";
      let i = __privateMethod(this, _v_instances, f_fn).call(this, e);
      if (this.isStart() && this.isEnd() && !i && this.type !== "!") {
        const c = this.toString();
        return __privateSet(this, _t, [
          c
        ]), this.type = null, __privateSet(this, _n, void 0), [
          c,
          k(this.toString()),
          false,
          false
        ];
      }
      let o = !s || t || e ? "" : __privateMethod(this, _v_instances, f_fn).call(this, true);
      o === i && (o = ""), o && (i = `(?:${i})(?:${o})*?`);
      let a = "";
      if (this.type === "!" && __privateGet(this, _u)) a = (this.isStart() && !e ? Z : "") + lt;
      else {
        const c = this.type === "!" ? "))" + (this.isStart() && !e && !t ? Z : "") + ht + ")" : this.type === "@" ? ")" : this.type === "?" ? ")?" : this.type === "+" && o ? ")" : this.type === "*" && o ? ")?" : `)${this.type}`;
        a = n + i + c;
      }
      return [
        a,
        k(i),
        __privateSet(this, _n, !!__privateGet(this, _n)),
        __privateGet(this, _r)
      ];
    }
  };
  _s = new WeakMap();
  _n = new WeakMap();
  _r = new WeakMap();
  _t = new WeakMap();
  _e2 = new WeakMap();
  _o = new WeakMap();
  _c = new WeakMap();
  _a = new WeakMap();
  _i = new WeakMap();
  _h = new WeakMap();
  _u = new WeakMap();
  _v_instances = new WeakSet();
  p_fn = function() {
    if (this !== __privateGet(this, _s)) throw new Error("should only call on root");
    if (__privateGet(this, _a)) return this;
    this.toString(), __privateSet(this, _a, true);
    let t;
    for (; t = __privateGet(this, _c).pop(); ) {
      if (t.type !== "!") continue;
      let e = t, s = __privateGet(e, _e2);
      for (; s; ) {
        for (let n = __privateGet(e, _o) + 1; !s.type && n < __privateGet(s, _t).length; n++) for (const i of __privateGet(t, _t)) {
          if (typeof i == "string") throw new Error("string part in extglob AST??");
          i.copyIn(__privateGet(s, _t)[n]);
        }
        e = s, s = __privateGet(e, _e2);
      }
    }
    return this;
  };
  _v_static = new WeakSet();
  l_fn = function(t, e, s, n) {
    var _a2, _b;
    let i = false, o = false, a = -1, c = false;
    if (e.type === null) {
      let f = s, m = "";
      for (; f < t.length; ) {
        const d = t.charAt(f++);
        if (i || d === "\\") {
          i = !i, m += d;
          continue;
        }
        if (o) {
          f === a + 1 ? (d === "^" || d === "!") && (c = true) : d === "]" && !(f === a + 2 && c) && (o = false), m += d;
          continue;
        } else if (d === "[") {
          o = true, a = f, c = false, m += d;
          continue;
        }
        if (!n.noext && ct(d) && t.charAt(f) === "(") {
          e.push(m), m = "";
          const g = new _v(d, e);
          f = __privateMethod(_a2 = _v, _v_static, l_fn).call(_a2, t, g, f, n), e.push(g);
          continue;
        }
        m += d;
      }
      return e.push(m), f;
    }
    let l = s + 1, u = new _v(null, e);
    const h = [];
    let p = "";
    for (; l < t.length; ) {
      const f = t.charAt(l++);
      if (i || f === "\\") {
        i = !i, p += f;
        continue;
      }
      if (o) {
        l === a + 1 ? (f === "^" || f === "!") && (c = true) : f === "]" && !(l === a + 2 && c) && (o = false), p += f;
        continue;
      } else if (f === "[") {
        o = true, a = l, c = false, p += f;
        continue;
      }
      if (ct(f) && t.charAt(l) === "(") {
        u.push(p), p = "";
        const m = new _v(f, u);
        u.push(m), l = __privateMethod(_b = _v, _v_static, l_fn).call(_b, t, m, l, n);
        continue;
      }
      if (f === "|") {
        u.push(p), p = "", h.push(u), u = new _v(null, e);
        continue;
      }
      if (f === ")") return p === "" && __privateGet(e, _t).length === 0 && __privateSet(e, _u, true), u.push(p), p = "", e.push(...h, u), l;
      p += f;
    }
    return e.type = null, __privateSet(e, _n, void 0), __privateSet(e, _t, [
      t.substring(s - 1)
    ]), l;
  };
  f_fn = function(t) {
    return __privateGet(this, _t).map((e) => {
      if (typeof e == "string") throw new Error("string type in extglob ast??");
      const [s, n, i, o] = e.toRegExpSource(t);
      return __privateSet(this, _r, __privateGet(this, _r) || o), s;
    }).filter((e) => !(this.isStart() && this.isEnd()) || !!e).join("|");
  };
  d_fn = function(t, e, s = false) {
    let n = false, i = "", o = false;
    for (let a = 0; a < t.length; a++) {
      const c = t.charAt(a);
      if (n) {
        n = false, i += (oe.has(c) ? "\\" : "") + c;
        continue;
      }
      if (c === "\\") {
        a === t.length - 1 ? i += "\\\\" : n = true;
        continue;
      }
      if (c === "[") {
        const [l, u, h, p] = ee(t, a);
        if (h) {
          i += l, o = o || u, a += h - 1, e = e || p;
          continue;
        }
      }
      if (c === "*") {
        s && t === "*" ? i += lt : i += ht, e = true;
        continue;
      }
      if (c === "?") {
        i += K, e = true;
        continue;
      }
      i += ae(c);
    }
    return [
      i,
      k(t),
      !!e,
      o
    ];
  };
  __privateAdd(_v, _v_static);
  let v = _v;
  const ce = (r, { windowsPathsNoEscape: t = false } = {}) => t ? r.replace(/[?*()[\]]/g, "[$&]") : r.replace(/[?*()[\]\\]/g, "\\$&");
  var H = {};
  let he, le, ue, fe, pe, de, ge, me, we, ye, be, _e, ve, xe, Ee, Se, Me, Te, gt, mt, wt, ut, Oe;
  x = (r, t, e = {}) => (q(t), !e.nocomment && t.charAt(0) === "#" ? false : new G(t, e).match(r));
  he = /^\*+([^+@!?\*\[\(]*)$/;
  le = (r) => (t) => !t.startsWith(".") && t.endsWith(r);
  ue = (r) => (t) => t.endsWith(r);
  fe = (r) => (r = r.toLowerCase(), (t) => !t.startsWith(".") && t.toLowerCase().endsWith(r));
  pe = (r) => (r = r.toLowerCase(), (t) => t.toLowerCase().endsWith(r));
  de = /^\*+\.\*+$/;
  ge = (r) => !r.startsWith(".") && r.includes(".");
  me = (r) => r !== "." && r !== ".." && r.includes(".");
  we = /^\.\*+$/;
  ye = (r) => r !== "." && r !== ".." && r.startsWith(".");
  be = /^\*+$/;
  _e = (r) => r.length !== 0 && !r.startsWith(".");
  ve = (r) => r.length !== 0 && r !== "." && r !== "..";
  xe = /^\?+([^+@!?\*\[\(]*)?$/;
  Ee = ([r, t = ""]) => {
    const e = gt([
      r
    ]);
    return t ? (t = t.toLowerCase(), (s) => e(s) && s.toLowerCase().endsWith(t)) : e;
  };
  Se = ([r, t = ""]) => {
    const e = mt([
      r
    ]);
    return t ? (t = t.toLowerCase(), (s) => e(s) && s.toLowerCase().endsWith(t)) : e;
  };
  Me = ([r, t = ""]) => {
    const e = mt([
      r
    ]);
    return t ? (s) => e(s) && s.endsWith(t) : e;
  };
  Te = ([r, t = ""]) => {
    const e = gt([
      r
    ]);
    return t ? (s) => e(s) && s.endsWith(t) : e;
  };
  gt = ([r]) => {
    const t = r.length;
    return (e) => e.length === t && !e.startsWith(".");
  };
  mt = ([r]) => {
    const t = r.length;
    return (e) => e.length === t && e !== "." && e !== "..";
  };
  wt = typeof F == "object" && F ? typeof H == "object" && H && H.__MINIMATCH_TESTING_PLATFORM__ || F.platform : "posix";
  ut = {
    win32: {
      sep: "\\"
    },
    posix: {
      sep: "/"
    }
  };
  Oe = wt === "win32" ? ut.win32.sep : ut.posix.sep;
  x.sep = Oe;
  const M = Symbol("globstar **");
  x.GLOBSTAR = M;
  const $e = "[^/]", Ae = $e + "*?", Re = "(?:(?!(?:\\/|^)(?:\\.{1,2})($|\\/)).)*?", Ce = "(?:(?!(?:\\/|^)\\.).)*?", Ne = (r, t = {}) => (e) => x(e, r, t);
  x.filter = Ne;
  const S = (r, t = {}) => Object.assign({}, r, t), je = (r) => {
    if (!r || typeof r != "object" || !Object.keys(r).length) return x;
    const t = x;
    return Object.assign((s, n, i = {}) => t(s, n, S(r, i)), {
      Minimatch: class extends t.Minimatch {
        constructor(n, i = {}) {
          super(n, S(r, i));
        }
        static defaults(n) {
          return t.defaults(S(r, n)).Minimatch;
        }
      },
      AST: class extends t.AST {
        constructor(n, i, o = {}) {
          super(n, i, S(r, o));
        }
        static fromGlob(n, i = {}) {
          return t.AST.fromGlob(n, S(r, i));
        }
      },
      unescape: (s, n = {}) => t.unescape(s, S(r, n)),
      escape: (s, n = {}) => t.escape(s, S(r, n)),
      filter: (s, n = {}) => t.filter(s, S(r, n)),
      defaults: (s) => t.defaults(S(r, s)),
      makeRe: (s, n = {}) => t.makeRe(s, S(r, n)),
      braceExpand: (s, n = {}) => t.braceExpand(s, S(r, n)),
      match: (s, n, i = {}) => t.match(s, n, S(r, i)),
      sep: t.sep,
      GLOBSTAR: M
    });
  };
  x.defaults = je;
  const yt = (r, t = {}) => (q(r), t.nobrace || !/\{(?:(?!\{).)*\}/.test(r) ? [
    r
  ] : Kt(r));
  x.braceExpand = yt;
  const We = (r, t = {}) => new G(r, t).makeRe();
  x.makeRe = We;
  const Le = (r, t, e = {}) => {
    const s = new G(t, e);
    return r = r.filter((n) => s.match(n)), s.options.nonull && !r.length && r.push(t), r;
  };
  x.match = Le;
  const ft = /[?*]|[+@!]\(.*?\)|\[|\]/, De = (r) => r.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
  class G {
    constructor(t, e = {}) {
      __publicField(this, "options");
      __publicField(this, "set");
      __publicField(this, "pattern");
      __publicField(this, "windowsPathsNoEscape");
      __publicField(this, "nonegate");
      __publicField(this, "negate");
      __publicField(this, "comment");
      __publicField(this, "empty");
      __publicField(this, "preserveMultipleSlashes");
      __publicField(this, "partial");
      __publicField(this, "globSet");
      __publicField(this, "globParts");
      __publicField(this, "nocase");
      __publicField(this, "isWindows");
      __publicField(this, "platform");
      __publicField(this, "windowsNoMagicRoot");
      __publicField(this, "regexp");
      q(t), e = e || {}, this.options = e, this.pattern = t, this.platform = e.platform || wt, this.isWindows = this.platform === "win32", this.windowsPathsNoEscape = !!e.windowsPathsNoEscape || e.allowWindowsEscape === false, this.windowsPathsNoEscape && (this.pattern = this.pattern.replace(/\\/g, "/")), this.preserveMultipleSlashes = !!e.preserveMultipleSlashes, this.regexp = null, this.negate = false, this.nonegate = !!e.nonegate, this.comment = false, this.empty = false, this.partial = !!e.partial, this.nocase = !!this.options.nocase, this.windowsNoMagicRoot = e.windowsNoMagicRoot !== void 0 ? e.windowsNoMagicRoot : !!(this.isWindows && this.nocase), this.globSet = [], this.globParts = [], this.set = [], this.make();
    }
    hasMagic() {
      if (this.options.magicalBraces && this.set.length > 1) return true;
      for (const t of this.set) for (const e of t) if (typeof e != "string") return true;
      return false;
    }
    debug(...t) {
    }
    make() {
      const t = this.pattern, e = this.options;
      if (!e.nocomment && t.charAt(0) === "#") {
        this.comment = true;
        return;
      }
      if (!t) {
        this.empty = true;
        return;
      }
      this.parseNegate(), this.globSet = [
        ...new Set(this.braceExpand())
      ], e.debug && (this.debug = (...i) => console.error(...i)), this.debug(this.pattern, this.globSet);
      const s = this.globSet.map((i) => this.slashSplit(i));
      this.globParts = this.preprocess(s), this.debug(this.pattern, this.globParts);
      let n = this.globParts.map((i, o, a) => {
        if (this.isWindows && this.windowsNoMagicRoot) {
          const c = i[0] === "" && i[1] === "" && (i[2] === "?" || !ft.test(i[2])) && !ft.test(i[3]), l = /^[a-z]:/i.test(i[0]);
          if (c) return [
            ...i.slice(0, 4),
            ...i.slice(4).map((u) => this.parse(u))
          ];
          if (l) return [
            i[0],
            ...i.slice(1).map((u) => this.parse(u))
          ];
        }
        return i.map((c) => this.parse(c));
      });
      if (this.debug(this.pattern, n), this.set = n.filter((i) => i.indexOf(false) === -1), this.isWindows) for (let i = 0; i < this.set.length; i++) {
        const o = this.set[i];
        o[0] === "" && o[1] === "" && this.globParts[i][2] === "?" && typeof o[3] == "string" && /^[a-z]:$/i.test(o[3]) && (o[2] = "?");
      }
      this.debug(this.pattern, this.set);
    }
    preprocess(t) {
      if (this.options.noglobstar) for (let s = 0; s < t.length; s++) for (let n = 0; n < t[s].length; n++) t[s][n] === "**" && (t[s][n] = "*");
      const { optimizationLevel: e = 1 } = this.options;
      return e >= 2 ? (t = this.firstPhasePreProcess(t), t = this.secondPhasePreProcess(t)) : e >= 1 ? t = this.levelOneOptimize(t) : t = this.adjascentGlobstarOptimize(t), t;
    }
    adjascentGlobstarOptimize(t) {
      return t.map((e) => {
        let s = -1;
        for (; (s = e.indexOf("**", s + 1)) !== -1; ) {
          let n = s;
          for (; e[n + 1] === "**"; ) n++;
          n !== s && e.splice(s, n - s);
        }
        return e;
      });
    }
    levelOneOptimize(t) {
      return t.map((e) => (e = e.reduce((s, n) => {
        const i = s[s.length - 1];
        return n === "**" && i === "**" ? s : n === ".." && i && i !== ".." && i !== "." && i !== "**" ? (s.pop(), s) : (s.push(n), s);
      }, []), e.length === 0 ? [
        ""
      ] : e));
    }
    levelTwoFileOptimize(t) {
      Array.isArray(t) || (t = this.slashSplit(t));
      let e = false;
      do {
        if (e = false, !this.preserveMultipleSlashes) {
          for (let n = 1; n < t.length - 1; n++) {
            const i = t[n];
            n === 1 && i === "" && t[0] === "" || (i === "." || i === "") && (e = true, t.splice(n, 1), n--);
          }
          t[0] === "." && t.length === 2 && (t[1] === "." || t[1] === "") && (e = true, t.pop());
        }
        let s = 0;
        for (; (s = t.indexOf("..", s + 1)) !== -1; ) {
          const n = t[s - 1];
          n && n !== "." && n !== ".." && n !== "**" && (e = true, t.splice(s - 1, 2), s -= 2);
        }
      } while (e);
      return t.length === 0 ? [
        ""
      ] : t;
    }
    firstPhasePreProcess(t) {
      let e = false;
      do {
        e = false;
        for (let s of t) {
          let n = -1;
          for (; (n = s.indexOf("**", n + 1)) !== -1; ) {
            let o = n;
            for (; s[o + 1] === "**"; ) o++;
            o > n && s.splice(n + 1, o - n);
            let a = s[n + 1];
            const c = s[n + 2], l = s[n + 3];
            if (a !== ".." || !c || c === "." || c === ".." || !l || l === "." || l === "..") continue;
            e = true, s.splice(n, 1);
            const u = s.slice(0);
            u[n] = "**", t.push(u), n--;
          }
          if (!this.preserveMultipleSlashes) {
            for (let o = 1; o < s.length - 1; o++) {
              const a = s[o];
              o === 1 && a === "" && s[0] === "" || (a === "." || a === "") && (e = true, s.splice(o, 1), o--);
            }
            s[0] === "." && s.length === 2 && (s[1] === "." || s[1] === "") && (e = true, s.pop());
          }
          let i = 0;
          for (; (i = s.indexOf("..", i + 1)) !== -1; ) {
            const o = s[i - 1];
            if (o && o !== "." && o !== ".." && o !== "**") {
              e = true;
              const c = i === 1 && s[i + 1] === "**" ? [
                "."
              ] : [];
              s.splice(i - 1, 2, ...c), s.length === 0 && s.push(""), i -= 2;
            }
          }
        }
      } while (e);
      return t;
    }
    secondPhasePreProcess(t) {
      for (let e = 0; e < t.length - 1; e++) for (let s = e + 1; s < t.length; s++) {
        const n = this.partsMatch(t[e], t[s], !this.preserveMultipleSlashes);
        if (n) {
          t[e] = [], t[s] = n;
          break;
        }
      }
      return t.filter((e) => e.length);
    }
    partsMatch(t, e, s = false) {
      let n = 0, i = 0, o = [], a = "";
      for (; n < t.length && i < e.length; ) if (t[n] === e[i]) o.push(a === "b" ? e[i] : t[n]), n++, i++;
      else if (s && t[n] === "**" && e[i] === t[n + 1]) o.push(t[n]), n++;
      else if (s && e[i] === "**" && t[n] === e[i + 1]) o.push(e[i]), i++;
      else if (t[n] === "*" && e[i] && (this.options.dot || !e[i].startsWith(".")) && e[i] !== "**") {
        if (a === "b") return false;
        a = "a", o.push(t[n]), n++, i++;
      } else if (e[i] === "*" && t[n] && (this.options.dot || !t[n].startsWith(".")) && t[n] !== "**") {
        if (a === "a") return false;
        a = "b", o.push(e[i]), n++, i++;
      } else return false;
      return t.length === e.length && o;
    }
    parseNegate() {
      if (this.nonegate) return;
      const t = this.pattern;
      let e = false, s = 0;
      for (let n = 0; n < t.length && t.charAt(n) === "!"; n++) e = !e, s++;
      s && (this.pattern = t.slice(s)), this.negate = e;
    }
    matchOne(t, e, s = false) {
      const n = this.options;
      if (this.isWindows) {
        const d = typeof t[0] == "string" && /^[a-z]:$/i.test(t[0]), g = !d && t[0] === "" && t[1] === "" && t[2] === "?" && /^[a-z]:$/i.test(t[3]), y = typeof e[0] == "string" && /^[a-z]:$/i.test(e[0]), E = !y && e[0] === "" && e[1] === "" && e[2] === "?" && typeof e[3] == "string" && /^[a-z]:$/i.test(e[3]), w = g ? 3 : d ? 0 : void 0, T = E ? 3 : y ? 0 : void 0;
        if (typeof w == "number" && typeof T == "number") {
          const [O, b] = [
            t[w],
            e[T]
          ];
          O.toLowerCase() === b.toLowerCase() && (e[T] = O, T > w ? e = e.slice(T) : w > T && (t = t.slice(w)));
        }
      }
      const { optimizationLevel: i = 1 } = this.options;
      i >= 2 && (t = this.levelTwoFileOptimize(t)), this.debug("matchOne", this, {
        file: t,
        pattern: e
      }), this.debug("matchOne", t.length, e.length);
      for (var o = 0, a = 0, c = t.length, l = e.length; o < c && a < l; o++, a++) {
        this.debug("matchOne loop");
        var u = e[a], h = t[o];
        if (this.debug(e, u, h), u === false) return false;
        if (u === M) {
          this.debug("GLOBSTAR", [
            e,
            u,
            h
          ]);
          var p = o, f = a + 1;
          if (f === l) {
            for (this.debug("** at the end"); o < c; o++) if (t[o] === "." || t[o] === ".." || !n.dot && t[o].charAt(0) === ".") return false;
            return true;
          }
          for (; p < c; ) {
            var m = t[p];
            if (this.debug(`
globstar while`, t, p, e, f, m), this.matchOne(t.slice(p), e.slice(f), s)) return this.debug("globstar found match!", p, c, m), true;
            if (m === "." || m === ".." || !n.dot && m.charAt(0) === ".") {
              this.debug("dot detected!", t, p, e, f);
              break;
            }
            this.debug("globstar swallow a segment, and continue"), p++;
          }
          return !!(s && (this.debug(`
>>> no match, partial?`, t, p, e, f), p === c));
        }
        let d;
        if (typeof u == "string" ? (d = h === u, this.debug("string match", u, h, d)) : (d = u.test(h), this.debug("pattern match", u, h, d)), !d) return false;
      }
      if (o === c && a === l) return true;
      if (o === c) return s;
      if (a === l) return o === c - 1 && t[o] === "";
      throw new Error("wtf?");
    }
    braceExpand() {
      return yt(this.pattern, this.options);
    }
    parse(t) {
      q(t);
      const e = this.options;
      if (t === "**") return M;
      if (t === "") return "";
      let s, n = null;
      (s = t.match(be)) ? n = e.dot ? ve : _e : (s = t.match(he)) ? n = (e.nocase ? e.dot ? pe : fe : e.dot ? ue : le)(s[1]) : (s = t.match(xe)) ? n = (e.nocase ? e.dot ? Se : Ee : e.dot ? Me : Te)(s) : (s = t.match(de)) ? n = e.dot ? me : ge : (s = t.match(we)) && (n = ye);
      const i = v.fromGlob(t, this.options).toMMPattern();
      return n && typeof i == "object" && Reflect.defineProperty(i, "test", {
        value: n
      }), i;
    }
    makeRe() {
      if (this.regexp || this.regexp === false) return this.regexp;
      const t = this.set;
      if (!t.length) return this.regexp = false, this.regexp;
      const e = this.options, s = e.noglobstar ? Ae : e.dot ? Re : Ce, n = new Set(e.nocase ? [
        "i"
      ] : []);
      let i = t.map((c) => {
        const l = c.map((u) => {
          if (u instanceof RegExp) for (const h of u.flags.split("")) n.add(h);
          return typeof u == "string" ? De(u) : u === M ? M : u._src;
        });
        return l.forEach((u, h) => {
          const p = l[h + 1], f = l[h - 1];
          u !== M || f === M || (f === void 0 ? p !== void 0 && p !== M ? l[h + 1] = "(?:\\/|" + s + "\\/)?" + p : l[h] = s : p === void 0 ? l[h - 1] = f + "(?:\\/|" + s + ")?" : p !== M && (l[h - 1] = f + "(?:\\/|\\/" + s + "\\/)" + p, l[h + 1] = M));
        }), l.filter((u) => u !== M).join("/");
      }).join("|");
      const [o, a] = t.length > 1 ? [
        "(?:",
        ")"
      ] : [
        "",
        ""
      ];
      i = "^" + o + i + a + "$", this.negate && (i = "^(?!" + i + ").+$");
      try {
        this.regexp = new RegExp(i, [
          ...n
        ].join(""));
      } catch {
        this.regexp = false;
      }
      return this.regexp;
    }
    slashSplit(t) {
      return this.preserveMultipleSlashes ? t.split("/") : this.isWindows && /^\/\/[^\/]+/.test(t) ? [
        "",
        ...t.split(/\/+/)
      ] : t.split(/\/+/);
    }
    match(t, e = this.partial) {
      if (this.debug("match", t, this.pattern), this.comment) return false;
      if (this.empty) return t === "";
      if (t === "/" && e) return true;
      const s = this.options;
      this.isWindows && (t = t.split("\\").join("/"));
      const n = this.slashSplit(t);
      this.debug(this.pattern, "split", n);
      const i = this.set;
      this.debug(this.pattern, "set", i);
      let o = n[n.length - 1];
      if (!o) for (let a = n.length - 2; !o && a >= 0; a--) o = n[a];
      for (let a = 0; a < i.length; a++) {
        const c = i[a];
        let l = n;
        if (s.matchBase && c.length === 1 && (l = [
          o
        ]), this.matchOne(l, c, e)) return s.flipNegate ? true : !this.negate;
      }
      return s.flipNegate ? false : this.negate;
    }
    static defaults(t) {
      return x.defaults(t).Minimatch;
    }
  }
  x.AST = v;
  x.Minimatch = G;
  x.escape = ce;
  x.unescape = k;
});
export {
  __tla,
  ze as a,
  Be as f,
  x as m
};

import { _ as hr } from "./preload-helper-DH9yCMdR.js";
import { i as mr, l as gr, t as br, __tla as __tla_0 } from "./index-CcO2jMy2.js";
import { p as be } from "./postcss-CMxDEYNb.js";
import { p as st } from "./index-iAEQxtNR.js";
import { N as yr } from "./didyoumean-DVWXwy9y.js";
import { x as ue, P as D, F as I, n as ae, s as wr, _ as vr, a as ce, V as xr, w as kr, r as Cr } from "./resolve-config-D_K0LwYp.js";
let Ci, $i, gi;
let __tla = Promise.all([
  (() => {
    try {
      return __tla_0;
    } catch {
    }
  })()
]).then(async () => {
  const $r = {
    and_chr: "chrome",
    and_ff: "firefox",
    ie_mob: "ie",
    op_mob: "opera",
    and_qq: null,
    and_uc: null,
    baidu: null,
    bb: null,
    kaios: null,
    op_mini: null
  };
  function Ar(e) {
    let t = {};
    for (let r of e) {
      let [a, n] = r.split(" ");
      if ($r[a] === null) continue;
      let i = Sr(n);
      i != null && (t[a] == null || i < t[a]) && (t[a] = i);
    }
    return t;
  }
  function Sr(e) {
    let [t, r = 0, a = 0] = e.split("-")[0].split(".").map((n) => parseInt(n, 10));
    return isNaN(t) || isNaN(r) || isNaN(a) ? null : t << 16 | r << 8 | a;
  }
  function Ur(e = st) {
    return (t, r) => {
      t.walkAtRules("screen", (i) => {
        i.name = "media", i.params = `screen(${i.params})`;
      }), t.walkAtRules("apply", (i) => {
        i.before(be.decl({
          prop: "__apply",
          value: i.params,
          source: i.source
        })), i.remove();
      });
      let a = (() => {
        var _a2;
        if (typeof e == "function" || typeof e == "object" && ((_a2 = e == null ? void 0 : e.hasOwnProperty) == null ? void 0 : _a2.call(e, "postcssPlugin"))) return e;
        if (typeof e == "string") return require(e);
        if (Object.keys(e).length <= 0) return st;
        throw new Error("tailwindcss/nesting should be loaded with a nesting plugin.");
      })();
      be([
        a
      ]).process(t, r.opts).sync(), t.walkDecls("__apply", (i) => {
        i.before(be.atRule({
          name: "apply",
          params: i.value,
          source: i.source
        })), i.remove();
      });
      function n(i) {
        "markDirty" in i && (i.nodes && i.nodes.forEach((o) => n(o)), i.nodes || i.markDirty());
      }
      return n(t), t;
    };
  }
  const Or = Object.assign(function(e) {
    return {
      postcssPlugin: "tailwindcss/nesting",
      Once(t, { result: r }) {
        return Ur(e)(t, r);
      }
    };
  }, {
    postcss: true
  });
  var jr = Object.create, Mt = Object.defineProperty, Er = Object.getOwnPropertyDescriptor, Dr = Object.getOwnPropertyNames, Rr = Object.getPrototypeOf, Ir = Object.prototype.hasOwnProperty, Mr = (e, t) => () => (t || e((t = {
    exports: {}
  }).exports, t), t.exports), zr = (e, t, r, a) => {
    if (t && typeof t == "object" || typeof t == "function") for (let n of Dr(t)) !Ir.call(e, n) && n !== r && Mt(e, n, {
      get: () => t[n],
      enumerable: !(a = Er(t, n)) || a.enumerable
    });
    return e;
  }, Vr = (e, t, r) => (r = e != null ? jr(Rr(e)) : {}, zr(!e || !e.__esModule ? Mt(r, "default", {
    value: e,
    enumerable: true
  }) : r, e)), _r = Mr((e, t) => {
    var r = class {
      constructor(a = {}) {
        if (!(a.maxSize && a.maxSize > 0)) throw new TypeError("`maxSize` must be a number greater than 0");
        if (typeof a.maxAge == "number" && a.maxAge === 0) throw new TypeError("`maxAge` must be a number greater than 0");
        this.maxSize = a.maxSize, this.maxAge = a.maxAge || 1 / 0, this.onEviction = a.onEviction, this.cache = /* @__PURE__ */ new Map(), this.oldCache = /* @__PURE__ */ new Map(), this._size = 0;
      }
      _emitEvictions(a) {
        if (typeof this.onEviction == "function") for (let [n, i] of a) this.onEviction(n, i.value);
      }
      _deleteIfExpired(a, n) {
        return typeof n.expiry == "number" && n.expiry <= Date.now() ? (typeof this.onEviction == "function" && this.onEviction(a, n.value), this.delete(a)) : false;
      }
      _getOrDeleteIfExpired(a, n) {
        if (this._deleteIfExpired(a, n) === false) return n.value;
      }
      _getItemValue(a, n) {
        return n.expiry ? this._getOrDeleteIfExpired(a, n) : n.value;
      }
      _peek(a, n) {
        let i = n.get(a);
        return this._getItemValue(a, i);
      }
      _set(a, n) {
        this.cache.set(a, n), this._size++, this._size >= this.maxSize && (this._size = 0, this._emitEvictions(this.oldCache), this.oldCache = this.cache, this.cache = /* @__PURE__ */ new Map());
      }
      _moveToRecent(a, n) {
        this.oldCache.delete(a), this._set(a, n);
      }
      *_entriesAscending() {
        for (let a of this.oldCache) {
          let [n, i] = a;
          this.cache.has(n) || this._deleteIfExpired(n, i) === false && (yield a);
        }
        for (let a of this.cache) {
          let [n, i] = a;
          this._deleteIfExpired(n, i) === false && (yield a);
        }
      }
      get(a) {
        if (this.cache.has(a)) {
          let n = this.cache.get(a);
          return this._getItemValue(a, n);
        }
        if (this.oldCache.has(a)) {
          let n = this.oldCache.get(a);
          if (this._deleteIfExpired(a, n) === false) return this._moveToRecent(a, n), n.value;
        }
      }
      set(a, n, { maxAge: i = this.maxAge === 1 / 0 ? void 0 : Date.now() + this.maxAge } = {}) {
        this.cache.has(a) ? this.cache.set(a, {
          value: n,
          maxAge: i
        }) : this._set(a, {
          value: n,
          expiry: i
        });
      }
      has(a) {
        return this.cache.has(a) ? !this._deleteIfExpired(a, this.cache.get(a)) : this.oldCache.has(a) ? !this._deleteIfExpired(a, this.oldCache.get(a)) : false;
      }
      peek(a) {
        if (this.cache.has(a)) return this._peek(a, this.cache);
        if (this.oldCache.has(a)) return this._peek(a, this.oldCache);
      }
      delete(a) {
        let n = this.cache.delete(a);
        return n && this._size--, this.oldCache.delete(a) || n;
      }
      clear() {
        this.cache.clear(), this.oldCache.clear(), this._size = 0;
      }
      resize(a) {
        if (!(a && a > 0)) throw new TypeError("`maxSize` must be a number greater than 0");
        let n = [
          ...this._entriesAscending()
        ], i = n.length - a;
        i < 0 ? (this.cache = new Map(n), this.oldCache = /* @__PURE__ */ new Map(), this._size = n.length) : (i > 0 && this._emitEvictions(n.slice(0, i)), this.oldCache = new Map(n.slice(i)), this.cache = /* @__PURE__ */ new Map(), this._size = 0), this.maxSize = a;
      }
      *keys() {
        for (let [a] of this) yield a;
      }
      *values() {
        for (let [, a] of this) yield a;
      }
      *[Symbol.iterator]() {
        for (let a of this.cache) {
          let [n, i] = a;
          this._deleteIfExpired(n, i) === false && (yield [
            n,
            i.value
          ]);
        }
        for (let a of this.oldCache) {
          let [n, i] = a;
          this.cache.has(n) || this._deleteIfExpired(n, i) === false && (yield [
            n,
            i.value
          ]);
        }
      }
      *entriesDescending() {
        let a = [
          ...this.cache
        ];
        for (let n = a.length - 1; n >= 0; --n) {
          let i = a[n], [o, s] = i;
          this._deleteIfExpired(o, s) === false && (yield [
            o,
            s.value
          ]);
        }
        a = [
          ...this.oldCache
        ];
        for (let n = a.length - 1; n >= 0; --n) {
          let i = a[n], [o, s] = i;
          this.cache.has(o) || this._deleteIfExpired(o, s) === false && (yield [
            o,
            s.value
          ]);
        }
      }
      *entriesAscending() {
        for (let [a, n] of this._entriesAscending()) yield [
          a,
          n.value
        ];
      }
      get size() {
        if (!this._size) return this.oldCache.size;
        let a = 0;
        for (let n of this.oldCache.keys()) this.cache.has(n) || a++;
        return Math.min(this._size + a, this.maxSize);
      }
    };
    t.exports = r;
  }), lt = Vr(_r()), Tr = lt.default ?? lt, Pr = Object.create, zt = Object.defineProperty, Fr = Object.getOwnPropertyDescriptor, Nr = Object.getOwnPropertyNames, Wr = Object.getPrototypeOf, Lr = Object.prototype.hasOwnProperty, he = (e, t) => () => (t || e((t = {
    exports: {}
  }).exports, t), t.exports), Br = (e, t, r, a) => {
    if (t && typeof t == "object" || typeof t == "function") for (let n of Nr(t)) !Lr.call(e, n) && n !== r && zt(e, n, {
      get: () => t[n],
      enumerable: !(a = Fr(t, n)) || a.enumerable
    });
    return e;
  }, qr = (e, t, r) => (r = e != null ? Pr(Wr(e)) : {}, Br(!e || !e.__esModule ? zt(r, "default", {
    value: e,
    enumerable: true
  }) : r, e)), Gr = he((e, t) => {
    var r = 40, a = 41, n = 39, i = 34, o = 92, s = 47, l = 44, f = 58, p = 42, g = 117, u = 85, m = 43, w = /^[a-f0-9?-]+$/i;
    t.exports = function(y) {
      for (var h = [], d = y, c, v, $, b, x, S, U, F, k = 0, A = d.charCodeAt(k), se = d.length, R = [
        {
          nodes: h
        }
      ], M = 0, V, G = "", _ = "", X = ""; k < se; ) if (A <= 32) {
        c = k;
        do
          c += 1, A = d.charCodeAt(c);
        while (A <= 32);
        b = d.slice(k, c), $ = h[h.length - 1], A === a && M ? X = b : $ && $.type === "div" ? ($.after = b, $.sourceEndIndex += b.length) : A === l || A === f || A === s && d.charCodeAt(c + 1) !== p && (!V || V && V.type === "function" && false) ? _ = b : h.push({
          type: "space",
          sourceIndex: k,
          sourceEndIndex: c,
          value: b
        }), k = c;
      } else if (A === n || A === i) {
        c = k, v = A === n ? "'" : '"', b = {
          type: "string",
          sourceIndex: k,
          quote: v
        };
        do
          if (x = false, c = d.indexOf(v, c + 1), ~c) for (S = c; d.charCodeAt(S - 1) === o; ) S -= 1, x = !x;
          else d += v, c = d.length - 1, b.unclosed = true;
        while (x);
        b.value = d.slice(k + 1, c), b.sourceEndIndex = b.unclosed ? c : c + 1, h.push(b), k = c + 1, A = d.charCodeAt(k);
      } else if (A === s && d.charCodeAt(k + 1) === p) c = d.indexOf("*/", k), b = {
        type: "comment",
        sourceIndex: k,
        sourceEndIndex: c + 2
      }, c === -1 && (b.unclosed = true, c = d.length, b.sourceEndIndex = c), b.value = d.slice(k + 2, c), h.push(b), k = c + 2, A = d.charCodeAt(k);
      else if ((A === s || A === p) && V && V.type === "function") b = d[k], h.push({
        type: "word",
        sourceIndex: k - _.length,
        sourceEndIndex: k + b.length,
        value: b
      }), k += 1, A = d.charCodeAt(k);
      else if (A === s || A === l || A === f) b = d[k], h.push({
        type: "div",
        sourceIndex: k - _.length,
        sourceEndIndex: k + b.length,
        value: b,
        before: _,
        after: ""
      }), _ = "", k += 1, A = d.charCodeAt(k);
      else if (r === A) {
        c = k;
        do
          c += 1, A = d.charCodeAt(c);
        while (A <= 32);
        if (F = k, b = {
          type: "function",
          sourceIndex: k - G.length,
          value: G,
          before: d.slice(F + 1, c)
        }, k = c, G === "url" && A !== n && A !== i) {
          c -= 1;
          do
            if (x = false, c = d.indexOf(")", c + 1), ~c) for (S = c; d.charCodeAt(S - 1) === o; ) S -= 1, x = !x;
            else d += ")", c = d.length - 1, b.unclosed = true;
          while (x);
          U = c;
          do
            U -= 1, A = d.charCodeAt(U);
          while (A <= 32);
          F < U ? (k !== U + 1 ? b.nodes = [
            {
              type: "word",
              sourceIndex: k,
              sourceEndIndex: U + 1,
              value: d.slice(k, U + 1)
            }
          ] : b.nodes = [], b.unclosed && U + 1 !== c ? (b.after = "", b.nodes.push({
            type: "space",
            sourceIndex: U + 1,
            sourceEndIndex: c,
            value: d.slice(U + 1, c)
          })) : (b.after = d.slice(U + 1, c), b.sourceEndIndex = c)) : (b.after = "", b.nodes = []), k = c + 1, b.sourceEndIndex = b.unclosed ? c : k, A = d.charCodeAt(k), h.push(b);
        } else M += 1, b.after = "", b.sourceEndIndex = k + 1, h.push(b), R.push(b), h = b.nodes = [], V = b;
        G = "";
      } else if (a === A && M) k += 1, A = d.charCodeAt(k), V.after = X, V.sourceEndIndex += X.length, X = "", M -= 1, R[R.length - 1].sourceEndIndex = k, R.pop(), V = R[M], h = V.nodes;
      else {
        c = k;
        do
          A === o && (c += 1), c += 1, A = d.charCodeAt(c);
        while (c < se && !(A <= 32 || A === n || A === i || A === l || A === f || A === s || A === r || A === p && V && V.type === "function" || A === s && V.type === "function" || A === a && M));
        b = d.slice(k, c), r === A ? G = b : (g === b.charCodeAt(0) || u === b.charCodeAt(0)) && m === b.charCodeAt(1) && w.test(b.slice(2)) ? h.push({
          type: "unicode-range",
          sourceIndex: k,
          sourceEndIndex: c,
          value: b
        }) : h.push({
          type: "word",
          sourceIndex: k,
          sourceEndIndex: c,
          value: b
        }), k = c;
      }
      for (k = R.length - 1; k; k -= 1) R[k].unclosed = true, R[k].sourceEndIndex = d.length;
      return R[0].nodes;
    };
  }), Yr = he((e, t) => {
    t.exports = function r(a, n, i) {
      var o, s, l, f;
      for (o = 0, s = a.length; o < s; o += 1) l = a[o], i || (f = n(l, o, a)), f !== false && l.type === "function" && Array.isArray(l.nodes) && r(l.nodes, n, i), i && n(l, o, a);
    };
  }), Hr = he((e, t) => {
    function r(n, i) {
      var o = n.type, s = n.value, l, f;
      return i && (f = i(n)) !== void 0 ? f : o === "word" || o === "space" ? s : o === "string" ? (l = n.quote || "", l + s + (n.unclosed ? "" : l)) : o === "comment" ? "/*" + s + (n.unclosed ? "" : "*/") : o === "div" ? (n.before || "") + s + (n.after || "") : Array.isArray(n.nodes) ? (l = a(n.nodes, i), o !== "function" ? l : s + "(" + (n.before || "") + l + (n.after || "") + (n.unclosed ? "" : ")")) : s;
    }
    function a(n, i) {
      var o, s;
      if (Array.isArray(n)) {
        for (o = "", s = n.length - 1; ~s; s -= 1) o = r(n[s], i) + o;
        return o;
      }
      return r(n, i);
    }
    t.exports = a;
  }), Kr = he((e, t) => {
    var r = 45, a = 43, n = 46, i = 101, o = 69;
    function s(l) {
      var f = l.charCodeAt(0), p;
      if (f === a || f === r) {
        if (p = l.charCodeAt(1), p >= 48 && p <= 57) return true;
        var g = l.charCodeAt(2);
        return p === n && g >= 48 && g <= 57;
      }
      return f === n ? (p = l.charCodeAt(1), p >= 48 && p <= 57) : f >= 48 && f <= 57;
    }
    t.exports = function(l) {
      var f = 0, p = l.length, g, u, m;
      if (p === 0 || !s(l)) return false;
      for (g = l.charCodeAt(f), (g === a || g === r) && f++; f < p && (g = l.charCodeAt(f), !(g < 48 || g > 57)); ) f += 1;
      if (g = l.charCodeAt(f), u = l.charCodeAt(f + 1), g === n && u >= 48 && u <= 57) for (f += 2; f < p && (g = l.charCodeAt(f), !(g < 48 || g > 57)); ) f += 1;
      if (g = l.charCodeAt(f), u = l.charCodeAt(f + 1), m = l.charCodeAt(f + 2), (g === i || g === o) && (u >= 48 && u <= 57 || (u === a || u === r) && m >= 48 && m <= 57)) for (f += u === a || u === r ? 3 : 2; f < p && (g = l.charCodeAt(f), !(g < 48 || g > 57)); ) f += 1;
      return {
        number: l.slice(0, f),
        unit: l.slice(f)
      };
    };
  }), Jr = he((e, t) => {
    var r = Gr(), a = Yr(), n = Hr();
    function i(o) {
      return this instanceof i ? (this.nodes = r(o), this) : new i(o);
    }
    i.prototype.toString = function() {
      return Array.isArray(this.nodes) ? n(this.nodes) : "";
    }, i.prototype.walk = function(o, s) {
      return a(this.nodes, o, s), this;
    }, i.unit = Kr(), i.walk = a, i.stringify = n, t.exports = i;
  }), dt = /* @__PURE__ */ new Set();
  function Oe(e, t, r) {
    typeof ue < "u" && ue.env.JEST_WORKER_ID || r && dt.has(r) || (r && dt.add(r), console.warn(""), t.forEach((a) => console.warn(e, "-", a)));
  }
  var P = {
    info(e, t) {
      Oe(ae.bold(ae.cyan("info")), ...Array.isArray(e) ? [
        e
      ] : [
        t,
        e
      ]);
    },
    warn(e, t) {
      Oe(ae.bold(ae.yellow("warn")), ...Array.isArray(e) ? [
        e
      ] : [
        t,
        e
      ]);
    },
    risk(e, t) {
      Oe(ae.bold(ae.magenta("risk")), ...Array.isArray(e) ? [
        e
      ] : [
        t,
        e
      ]);
    }
  };
  function Xr(e) {
    let t = /* @__PURE__ */ new Set(), r = /* @__PURE__ */ new Set(), a = /* @__PURE__ */ new Set();
    if (e.walkAtRules((n) => {
      n.name === "apply" && a.add(n), n.name === "import" && (n.params === '"tailwindcss/base"' || n.params === "'tailwindcss/base'" ? (n.name = "tailwind", n.params = "base") : n.params === '"tailwindcss/components"' || n.params === "'tailwindcss/components'" ? (n.name = "tailwind", n.params = "components") : n.params === '"tailwindcss/utilities"' || n.params === "'tailwindcss/utilities'" ? (n.name = "tailwind", n.params = "utilities") : (n.params === '"tailwindcss/screens"' || n.params === "'tailwindcss/screens'" || n.params === '"tailwindcss/variants"' || n.params === "'tailwindcss/variants'") && (n.name = "tailwind", n.params = "variants")), n.name === "tailwind" && (n.params === "screens" && (n.params = "variants"), t.add(n.params)), [
        "layer",
        "responsive",
        "variants"
      ].includes(n.name) && ([
        "responsive",
        "variants"
      ].includes(n.name) && P.warn(`${n.name}-at-rule-deprecated`, [
        `The \`@${n.name}\` directive has been deprecated in Tailwind CSS v3.0.`,
        "Use `@layer utilities` or `@layer components` instead.",
        "https://tailwindcss.com/docs/upgrade-guide#replace-variants-with-layer"
      ]), r.add(n));
    }), !t.has("base") || !t.has("components") || !t.has("utilities")) {
      for (let n of r) if (n.name === "layer" && [
        "base",
        "components",
        "utilities"
      ].includes(n.params)) {
        if (!t.has(n.params)) throw n.error(`\`@layer ${n.params}\` is used but no matching \`@tailwind ${n.params}\` directive is present.`);
      } else if (n.name === "responsive") {
        if (!t.has("utilities")) throw n.error("`@responsive` is used but `@tailwind utilities` is missing.");
      } else if (n.name === "variants" && !t.has("utilities")) throw n.error("`@variants` is used but `@tailwind utilities` is missing.");
    }
    return {
      tailwindDirectives: t,
      applyDirectives: a
    };
  }
  var Qr = typeof ue < "u" ? {
    DEBUG: ea(ue.env.DEBUG)
  } : {
    DEBUG: false
  }, Zr = /* @__PURE__ */ new Map(), oe = new String("*"), ze = Symbol("__NONE__");
  function ea(e) {
    if (e === void 0) return false;
    if (e === "true" || e === "1") return true;
    if (e === "false" || e === "0") return false;
    if (e === "*") return true;
    let t = e.split(",").map((r) => r.split(":")[0]);
    return t.includes("-tailwindcss") ? false : !!t.includes("tailwindcss");
  }
  function He(e) {
    return Array.isArray(e) ? e.flatMap((t) => I([
      xr({
        bubble: [
          "screen"
        ]
      })
    ]).process(t, {
      parser: kr
    }).root.nodes) : He([
      e
    ]);
  }
  function fe(e) {
    if (Object.prototype.toString.call(e) !== "[object Object]") return false;
    let t = Object.getPrototypeOf(e);
    return t === null || Object.getPrototypeOf(t) === null;
  }
  function Ke(e, t, r = false) {
    if (e === "") return t;
    let a = typeof t == "string" ? D().astSync(t) : t;
    return a.walkClasses((n) => {
      let i = n.value, o = r && i.startsWith("-");
      n.value = o ? `-${e}${i.slice(1)}` : `${e}${i}`;
    }), typeof t == "string" ? a.toString() : a;
  }
  function Je(e) {
    return e.replace(/\\,/g, "\\2c ");
  }
  var ct = {
    aliceblue: [
      240,
      248,
      255
    ],
    antiquewhite: [
      250,
      235,
      215
    ],
    aqua: [
      0,
      255,
      255
    ],
    aquamarine: [
      127,
      255,
      212
    ],
    azure: [
      240,
      255,
      255
    ],
    beige: [
      245,
      245,
      220
    ],
    bisque: [
      255,
      228,
      196
    ],
    black: [
      0,
      0,
      0
    ],
    blanchedalmond: [
      255,
      235,
      205
    ],
    blue: [
      0,
      0,
      255
    ],
    blueviolet: [
      138,
      43,
      226
    ],
    brown: [
      165,
      42,
      42
    ],
    burlywood: [
      222,
      184,
      135
    ],
    cadetblue: [
      95,
      158,
      160
    ],
    chartreuse: [
      127,
      255,
      0
    ],
    chocolate: [
      210,
      105,
      30
    ],
    coral: [
      255,
      127,
      80
    ],
    cornflowerblue: [
      100,
      149,
      237
    ],
    cornsilk: [
      255,
      248,
      220
    ],
    crimson: [
      220,
      20,
      60
    ],
    cyan: [
      0,
      255,
      255
    ],
    darkblue: [
      0,
      0,
      139
    ],
    darkcyan: [
      0,
      139,
      139
    ],
    darkgoldenrod: [
      184,
      134,
      11
    ],
    darkgray: [
      169,
      169,
      169
    ],
    darkgreen: [
      0,
      100,
      0
    ],
    darkgrey: [
      169,
      169,
      169
    ],
    darkkhaki: [
      189,
      183,
      107
    ],
    darkmagenta: [
      139,
      0,
      139
    ],
    darkolivegreen: [
      85,
      107,
      47
    ],
    darkorange: [
      255,
      140,
      0
    ],
    darkorchid: [
      153,
      50,
      204
    ],
    darkred: [
      139,
      0,
      0
    ],
    darksalmon: [
      233,
      150,
      122
    ],
    darkseagreen: [
      143,
      188,
      143
    ],
    darkslateblue: [
      72,
      61,
      139
    ],
    darkslategray: [
      47,
      79,
      79
    ],
    darkslategrey: [
      47,
      79,
      79
    ],
    darkturquoise: [
      0,
      206,
      209
    ],
    darkviolet: [
      148,
      0,
      211
    ],
    deeppink: [
      255,
      20,
      147
    ],
    deepskyblue: [
      0,
      191,
      255
    ],
    dimgray: [
      105,
      105,
      105
    ],
    dimgrey: [
      105,
      105,
      105
    ],
    dodgerblue: [
      30,
      144,
      255
    ],
    firebrick: [
      178,
      34,
      34
    ],
    floralwhite: [
      255,
      250,
      240
    ],
    forestgreen: [
      34,
      139,
      34
    ],
    fuchsia: [
      255,
      0,
      255
    ],
    gainsboro: [
      220,
      220,
      220
    ],
    ghostwhite: [
      248,
      248,
      255
    ],
    gold: [
      255,
      215,
      0
    ],
    goldenrod: [
      218,
      165,
      32
    ],
    gray: [
      128,
      128,
      128
    ],
    green: [
      0,
      128,
      0
    ],
    greenyellow: [
      173,
      255,
      47
    ],
    grey: [
      128,
      128,
      128
    ],
    honeydew: [
      240,
      255,
      240
    ],
    hotpink: [
      255,
      105,
      180
    ],
    indianred: [
      205,
      92,
      92
    ],
    indigo: [
      75,
      0,
      130
    ],
    ivory: [
      255,
      255,
      240
    ],
    khaki: [
      240,
      230,
      140
    ],
    lavender: [
      230,
      230,
      250
    ],
    lavenderblush: [
      255,
      240,
      245
    ],
    lawngreen: [
      124,
      252,
      0
    ],
    lemonchiffon: [
      255,
      250,
      205
    ],
    lightblue: [
      173,
      216,
      230
    ],
    lightcoral: [
      240,
      128,
      128
    ],
    lightcyan: [
      224,
      255,
      255
    ],
    lightgoldenrodyellow: [
      250,
      250,
      210
    ],
    lightgray: [
      211,
      211,
      211
    ],
    lightgreen: [
      144,
      238,
      144
    ],
    lightgrey: [
      211,
      211,
      211
    ],
    lightpink: [
      255,
      182,
      193
    ],
    lightsalmon: [
      255,
      160,
      122
    ],
    lightseagreen: [
      32,
      178,
      170
    ],
    lightskyblue: [
      135,
      206,
      250
    ],
    lightslategray: [
      119,
      136,
      153
    ],
    lightslategrey: [
      119,
      136,
      153
    ],
    lightsteelblue: [
      176,
      196,
      222
    ],
    lightyellow: [
      255,
      255,
      224
    ],
    lime: [
      0,
      255,
      0
    ],
    limegreen: [
      50,
      205,
      50
    ],
    linen: [
      250,
      240,
      230
    ],
    magenta: [
      255,
      0,
      255
    ],
    maroon: [
      128,
      0,
      0
    ],
    mediumaquamarine: [
      102,
      205,
      170
    ],
    mediumblue: [
      0,
      0,
      205
    ],
    mediumorchid: [
      186,
      85,
      211
    ],
    mediumpurple: [
      147,
      112,
      219
    ],
    mediumseagreen: [
      60,
      179,
      113
    ],
    mediumslateblue: [
      123,
      104,
      238
    ],
    mediumspringgreen: [
      0,
      250,
      154
    ],
    mediumturquoise: [
      72,
      209,
      204
    ],
    mediumvioletred: [
      199,
      21,
      133
    ],
    midnightblue: [
      25,
      25,
      112
    ],
    mintcream: [
      245,
      255,
      250
    ],
    mistyrose: [
      255,
      228,
      225
    ],
    moccasin: [
      255,
      228,
      181
    ],
    navajowhite: [
      255,
      222,
      173
    ],
    navy: [
      0,
      0,
      128
    ],
    oldlace: [
      253,
      245,
      230
    ],
    olive: [
      128,
      128,
      0
    ],
    olivedrab: [
      107,
      142,
      35
    ],
    orange: [
      255,
      165,
      0
    ],
    orangered: [
      255,
      69,
      0
    ],
    orchid: [
      218,
      112,
      214
    ],
    palegoldenrod: [
      238,
      232,
      170
    ],
    palegreen: [
      152,
      251,
      152
    ],
    paleturquoise: [
      175,
      238,
      238
    ],
    palevioletred: [
      219,
      112,
      147
    ],
    papayawhip: [
      255,
      239,
      213
    ],
    peachpuff: [
      255,
      218,
      185
    ],
    peru: [
      205,
      133,
      63
    ],
    pink: [
      255,
      192,
      203
    ],
    plum: [
      221,
      160,
      221
    ],
    powderblue: [
      176,
      224,
      230
    ],
    purple: [
      128,
      0,
      128
    ],
    rebeccapurple: [
      102,
      51,
      153
    ],
    red: [
      255,
      0,
      0
    ],
    rosybrown: [
      188,
      143,
      143
    ],
    royalblue: [
      65,
      105,
      225
    ],
    saddlebrown: [
      139,
      69,
      19
    ],
    salmon: [
      250,
      128,
      114
    ],
    sandybrown: [
      244,
      164,
      96
    ],
    seagreen: [
      46,
      139,
      87
    ],
    seashell: [
      255,
      245,
      238
    ],
    sienna: [
      160,
      82,
      45
    ],
    silver: [
      192,
      192,
      192
    ],
    skyblue: [
      135,
      206,
      235
    ],
    slateblue: [
      106,
      90,
      205
    ],
    slategray: [
      112,
      128,
      144
    ],
    slategrey: [
      112,
      128,
      144
    ],
    snow: [
      255,
      250,
      250
    ],
    springgreen: [
      0,
      255,
      127
    ],
    steelblue: [
      70,
      130,
      180
    ],
    tan: [
      210,
      180,
      140
    ],
    teal: [
      0,
      128,
      128
    ],
    thistle: [
      216,
      191,
      216
    ],
    tomato: [
      255,
      99,
      71
    ],
    turquoise: [
      64,
      224,
      208
    ],
    violet: [
      238,
      130,
      238
    ],
    wheat: [
      245,
      222,
      179
    ],
    white: [
      255,
      255,
      255
    ],
    whitesmoke: [
      245,
      245,
      245
    ],
    yellow: [
      255,
      255,
      0
    ],
    yellowgreen: [
      154,
      205,
      50
    ]
  }, ta = /^#([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})?$/i, ra = /^#([a-f\d])([a-f\d])([a-f\d])([a-f\d])?$/i, Q = /(?:\d+|\d*\.\d+)%?/, ke = /(?:\s*,\s*|\s+)/, Vt = /\s*[,/]\s*/, Z = /var\(--(?:[^ )]*?)(?:,(?:[^ )]*?|var\(--[^ )]*?\)))?\)/, aa = new RegExp(`^(rgba?)\\(\\s*(${Q.source}|${Z.source})(?:${ke.source}(${Q.source}|${Z.source}))?(?:${ke.source}(${Q.source}|${Z.source}))?(?:${Vt.source}(${Q.source}|${Z.source}))?\\s*\\)$`), na = new RegExp(`^(hsla?)\\(\\s*((?:${Q.source})(?:deg|rad|grad|turn)?|${Z.source})(?:${ke.source}(${Q.source}|${Z.source}))?(?:${ke.source}(${Q.source}|${Z.source}))?(?:${Vt.source}(${Q.source}|${Z.source}))?\\s*\\)$`);
  function Xe(e, { loose: t = false } = {}) {
    var _a2, _b;
    if (typeof e != "string") return null;
    if (e = e.trim(), e === "transparent") return {
      mode: "rgb",
      color: [
        "0",
        "0",
        "0"
      ],
      alpha: "0"
    };
    if (e in ct) return {
      mode: "rgb",
      color: ct[e].map((i) => i.toString())
    };
    let r = e.replace(ra, (i, o, s, l, f) => [
      "#",
      o,
      o,
      s,
      s,
      l,
      l,
      f ? f + f : ""
    ].join("")).match(ta);
    if (r !== null) return {
      mode: "rgb",
      color: [
        parseInt(r[1], 16),
        parseInt(r[2], 16),
        parseInt(r[3], 16)
      ].map((i) => i.toString()),
      alpha: r[4] ? (parseInt(r[4], 16) / 255).toString() : void 0
    };
    let a = e.match(aa) ?? e.match(na);
    if (a === null) return null;
    let n = [
      a[2],
      a[3],
      a[4]
    ].filter(Boolean).map((i) => i.toString());
    return n.length === 2 && n[0].startsWith("var(") ? {
      mode: a[1],
      color: [
        n[0]
      ],
      alpha: n[1]
    } : !t && n.length !== 3 || n.length < 3 && !n.some((i) => /^var\(.*?\)$/.test(i)) ? null : {
      mode: a[1],
      color: n,
      alpha: (_b = (_a2 = a[5]) == null ? void 0 : _a2.toString) == null ? void 0 : _b.call(_a2)
    };
  }
  function _t({ mode: e, color: t, alpha: r }) {
    let a = r !== void 0;
    return e === "rgba" || e === "hsla" ? `${e}(${t.join(", ")}${a ? `, ${r}` : ""})` : `${e}(${t.join(" ")}${a ? ` / ${r}` : ""})`;
  }
  function pe(e, t, r) {
    if (typeof e == "function") return e({
      opacityValue: t
    });
    let a = Xe(e, {
      loose: true
    });
    return a === null ? r : _t({
      ...a,
      alpha: t
    });
  }
  function N({ color: e, property: t, variable: r }) {
    let a = [].concat(t);
    if (typeof e == "function") return {
      [r]: "1",
      ...Object.fromEntries(a.map((i) => [
        i,
        e({
          opacityVariable: r,
          opacityValue: `var(${r}, 1)`
        })
      ]))
    };
    let n = Xe(e);
    return n === null ? Object.fromEntries(a.map((i) => [
      i,
      e
    ])) : n.alpha !== void 0 ? Object.fromEntries(a.map((i) => [
      i,
      e
    ])) : {
      [r]: "1",
      ...Object.fromEntries(a.map((i) => [
        i,
        _t({
          ...n,
          alpha: `var(${r}, 1)`
        })
      ]))
    };
  }
  function B(e, t) {
    let r = [], a = [], n = 0, i = false;
    for (let o = 0; o < e.length; o++) {
      let s = e[o];
      r.length === 0 && s === t[0] && !i && (t.length === 1 || e.slice(o, o + t.length) === t) && (a.push(e.slice(n, o)), n = o + t.length), i = i ? false : s === "\\", s === "(" || s === "[" || s === "{" ? r.push(s) : (s === ")" && r[r.length - 1] === "(" || s === "]" && r[r.length - 1] === "[" || s === "}" && r[r.length - 1] === "{") && r.pop();
    }
    return a.push(e.slice(n)), a;
  }
  var ia = /* @__PURE__ */ new Set([
    "inset",
    "inherit",
    "initial",
    "revert",
    "unset"
  ]), oa = /\ +(?![^(]*\))/g, ut = /^-?(\d+|\.\d+)(.*?)$/g;
  function Tt(e) {
    return B(e, ",").map((t) => {
      let r = t.trim(), a = {
        raw: r
      }, n = r.split(oa), i = /* @__PURE__ */ new Set();
      for (let o of n) ut.lastIndex = 0, !i.has("KEYWORD") && ia.has(o) ? (a.keyword = o, i.add("KEYWORD")) : ut.test(o) ? i.has("X") ? i.has("Y") ? i.has("BLUR") ? i.has("SPREAD") || (a.spread = o, i.add("SPREAD")) : (a.blur = o, i.add("BLUR")) : (a.y = o, i.add("Y")) : (a.x = o, i.add("X")) : a.color ? (a.unknown || (a.unknown = []), a.unknown.push(o)) : a.color = o;
      return a.valid = a.x !== void 0 && a.y !== void 0, a;
    });
  }
  function sa(e) {
    return e.map((t) => t.valid ? [
      t.keyword,
      t.x,
      t.y,
      t.blur,
      t.spread,
      t.color
    ].filter(Boolean).join(" ") : t.raw).join(", ");
  }
  var la = [
    "min",
    "max",
    "clamp",
    "calc"
  ];
  function Qe(e) {
    return la.some((t) => new RegExp(`^${t}\\(.*\\)`).test(e));
  }
  var da = /* @__PURE__ */ new Set([
    "scroll-timeline-name",
    "timeline-scope",
    "view-timeline-name",
    "font-palette",
    "anchor-name",
    "anchor-scope",
    "position-anchor",
    "position-try-options",
    "scroll-timeline",
    "animation-timeline",
    "view-timeline",
    "position-try"
  ]);
  function O(e, t = null, r = true) {
    let a = t && da.has(t.property);
    return e.startsWith("--") && !a ? `var(${e})` : e.includes("url(") ? e.split(/(url\(.*?\))/g).filter(Boolean).map((n) => /^url\(.*?\)$/.test(n) ? n : O(n, t, false)).join("") : (e = e.replace(/([^\\])_+/g, (n, i) => i + " ".repeat(n.length - 1)).replace(/^_/g, " ").replace(/\\_/g, "_"), r && (e = e.trim()), e = ca(e), e);
  }
  function Y(e) {
    return e.includes("=") && (e = e.replace(/(=.*)/g, (t, r) => {
      if (r[1] === "'" || r[1] === '"') return r;
      if (r.length > 2) {
        let a = r[r.length - 1];
        if (r[r.length - 2] === " " && (a === "i" || a === "I" || a === "s" || a === "S")) return `="${r.slice(1, -2)}" ${r[r.length - 1]}`;
      }
      return `="${r.slice(1)}"`;
    })), e;
  }
  function ca(e) {
    let t = [
      "theme"
    ], r = [
      "min-content",
      "max-content",
      "fit-content",
      "safe-area-inset-top",
      "safe-area-inset-right",
      "safe-area-inset-bottom",
      "safe-area-inset-left",
      "titlebar-area-x",
      "titlebar-area-y",
      "titlebar-area-width",
      "titlebar-area-height",
      "keyboard-inset-top",
      "keyboard-inset-right",
      "keyboard-inset-bottom",
      "keyboard-inset-left",
      "keyboard-inset-width",
      "keyboard-inset-height",
      "radial-gradient",
      "linear-gradient",
      "conic-gradient",
      "repeating-radial-gradient",
      "repeating-linear-gradient",
      "repeating-conic-gradient",
      "anchor-size"
    ];
    return e.replace(/(calc|min|max|clamp)\(.+\)/g, (a) => {
      let n = "";
      function i() {
        let o = n.trimEnd();
        return o[o.length - 1];
      }
      for (let o = 0; o < a.length; o++) {
        let s = function(p) {
          return p.split("").every((g, u) => a[o + u] === g);
        }, l = function(p) {
          let g = 1 / 0;
          for (let m of p) {
            let w = a.indexOf(m, o);
            w !== -1 && w < g && (g = w);
          }
          let u = a.slice(o, g);
          return o += u.length - 1, u;
        }, f = a[o];
        if (s("var")) n += l([
          ")",
          ","
        ]);
        else if (r.some((p) => s(p))) {
          let p = r.find((g) => s(g));
          n += p, o += p.length - 1;
        } else t.some((p) => s(p)) ? n += l([
          ")"
        ]) : s("[") ? n += l([
          "]"
        ]) : [
          "+",
          "-",
          "*",
          "/"
        ].includes(f) && ![
          "(",
          "+",
          "-",
          "*",
          "/",
          ","
        ].includes(i()) ? n += ` ${f} ` : n += f;
      }
      return n.replace(/\s+/g, " ");
    });
  }
  function Pt(e) {
    return e.startsWith("url(");
  }
  function Ft(e) {
    return !isNaN(Number(e)) || Qe(e);
  }
  function Ze(e) {
    return e.endsWith("%") && Ft(e.slice(0, -1)) || Qe(e);
  }
  var ua = [
    "cm",
    "mm",
    "Q",
    "in",
    "pc",
    "pt",
    "px",
    "em",
    "ex",
    "ch",
    "rem",
    "lh",
    "rlh",
    "vw",
    "vh",
    "vmin",
    "vmax",
    "vb",
    "vi",
    "svw",
    "svh",
    "lvw",
    "lvh",
    "dvw",
    "dvh",
    "cqw",
    "cqh",
    "cqi",
    "cqb",
    "cqmin",
    "cqmax"
  ], fa = `(?:${ua.join("|")})`;
  function et(e) {
    return e === "0" || new RegExp(`^[+-]?[0-9]*.?[0-9]+(?:[eE][+-]?[0-9]+)?${fa}$`).test(e) || Qe(e);
  }
  var pa = /* @__PURE__ */ new Set([
    "thin",
    "medium",
    "thick"
  ]);
  function ha(e) {
    return pa.has(e);
  }
  function ma(e) {
    let t = Tt(O(e));
    for (let r of t) if (!r.valid) return false;
    return true;
  }
  function ga(e) {
    let t = 0;
    return B(e, "_").every((r) => (r = O(r), r.startsWith("var(") ? true : Xe(r, {
      loose: true
    }) !== null ? (t++, true) : false)) ? t > 0 : false;
  }
  function ba(e) {
    let t = 0;
    return B(e, ",").every((r) => (r = O(r), r.startsWith("var(") ? true : Pt(r) || wa(r) || [
      "element(",
      "image(",
      "cross-fade(",
      "image-set("
    ].some((a) => r.startsWith(a)) ? (t++, true) : false)) ? t > 0 : false;
  }
  var ya = /* @__PURE__ */ new Set([
    "conic-gradient",
    "linear-gradient",
    "radial-gradient",
    "repeating-conic-gradient",
    "repeating-linear-gradient",
    "repeating-radial-gradient"
  ]);
  function wa(e) {
    e = O(e);
    for (let t of ya) if (e.startsWith(`${t}(`)) return true;
    return false;
  }
  var va = /* @__PURE__ */ new Set([
    "center",
    "top",
    "right",
    "bottom",
    "left"
  ]);
  function xa(e) {
    let t = 0;
    return B(e, "_").every((r) => (r = O(r), r.startsWith("var(") ? true : va.has(r) || et(r) || Ze(r) ? (t++, true) : false)) ? t > 0 : false;
  }
  function ka(e) {
    let t = 0;
    return B(e, ",").every((r) => (r = O(r), r.startsWith("var(") ? true : r.includes(" ") && !/(['"])([^"']+)\1/g.test(r) || /^\d/g.test(r) ? false : (t++, true))) ? t > 0 : false;
  }
  var Ca = /* @__PURE__ */ new Set([
    "serif",
    "sans-serif",
    "monospace",
    "cursive",
    "fantasy",
    "system-ui",
    "ui-serif",
    "ui-sans-serif",
    "ui-monospace",
    "ui-rounded",
    "math",
    "emoji",
    "fangsong"
  ]);
  function $a(e) {
    return Ca.has(e);
  }
  var Aa = /* @__PURE__ */ new Set([
    "xx-small",
    "x-small",
    "small",
    "medium",
    "large",
    "x-large",
    "xx-large",
    "xxx-large"
  ]);
  function Sa(e) {
    return Aa.has(e);
  }
  var Ua = /* @__PURE__ */ new Set([
    "larger",
    "smaller"
  ]);
  function Oa(e) {
    return Ua.has(e);
  }
  function Ve(e) {
    if (e = `${e}`, e === "0") return "0";
    if (/^[+-]?(\d+|\d*\.\d+)(e[+-]?\d+)?(%|\w+)?$/.test(e)) return e.replace(/^[+-]?/, (r) => r === "-" ? "" : "-");
    let t = [
      "var",
      "calc",
      "min",
      "max",
      "clamp"
    ];
    for (let r of t) if (e.includes(`${r}(`)) return `calc(${e} * -1)`;
  }
  function ja(e) {
    let t = [
      "cover",
      "contain"
    ];
    return B(e, ",").every((r) => {
      let a = B(r, "_").filter(Boolean);
      return a.length === 1 && t.includes(a[0]) ? true : a.length !== 1 && a.length !== 2 ? false : a.every((n) => et(n) || Ze(n) || n === "auto");
    });
  }
  var ft = {
    optimizeUniversalDefaults: false,
    generalizedModifiers: true,
    disableColorOpacityUtilitiesByDefault: false,
    relativeContentPathsByDefault: false
  }, Ce = {
    future: [
      "hoverOnlyWhenSupported",
      "respectDefaultRingColorOpacity",
      "disableColorOpacityUtilitiesByDefault",
      "relativeContentPathsByDefault"
    ],
    experimental: [
      "optimizeUniversalDefaults",
      "generalizedModifiers"
    ]
  };
  function J(e, t) {
    var _a2, _b;
    return Ce.future.includes(t) ? e.future === "all" || (((_a2 = e == null ? void 0 : e.future) == null ? void 0 : _a2[t]) ?? ft[t] ?? false) : Ce.experimental.includes(t) ? e.experimental === "all" || (((_b = e == null ? void 0 : e.experimental) == null ? void 0 : _b[t]) ?? ft[t] ?? false) : false;
  }
  function pt(e) {
    return e.experimental === "all" ? Ce.experimental : Object.keys((e == null ? void 0 : e.experimental) ?? {}).filter((t) => Ce.experimental.includes(t) && e.experimental[t]);
  }
  function Ea(e) {
    if (ue.env.JEST_WORKER_ID === void 0 && pt(e).length > 0) {
      let t = pt(e).map((r) => ae.yellow(r)).join(", ");
      P.warn("experimental-flags-enabled", [
        `You have enabled experimental features: ${t}`,
        "Experimental features in Tailwind CSS are not covered by semver, may introduce breaking changes, and can change at any time."
      ]);
    }
  }
  function Da(e, t) {
    e.walkClasses((r) => {
      r.value = t(r.value), r.raws && r.raws.value && (r.raws.value = Je(r.raws.value));
    });
  }
  function Nt(e, t) {
    if (!ee(e)) return;
    let r = e.slice(1, -1);
    if (t(r)) return O(r);
  }
  function Ra(e, t = {}, r) {
    let a = t[e];
    if (a !== void 0) return Ve(a);
    if (ee(e)) {
      let n = Nt(e, r);
      return n === void 0 ? void 0 : Ve(n);
    }
  }
  function Se(e, t = {}, { validate: r = () => true } = {}) {
    var _a2;
    let a = (_a2 = t.values) == null ? void 0 : _a2[e];
    return a !== void 0 ? a : t.supportsNegativeValues && e.startsWith("-") ? Ra(e.slice(1), t.values, r) : Nt(e, r);
  }
  function ee(e) {
    return e.startsWith("[") && e.endsWith("]");
  }
  function Wt(e) {
    let t = e.lastIndexOf("/"), r = e.lastIndexOf("[", t), a = e.indexOf("]", t);
    return e[t - 1] === "]" || e[t + 1] === "[" || r !== -1 && a !== -1 && r < t && t < a && (t = e.lastIndexOf("/", r)), t === -1 || t === e.length - 1 ? [
      e,
      void 0
    ] : ee(e) && !e.includes("]/[") ? [
      e,
      void 0
    ] : [
      e.slice(0, t),
      e.slice(t + 1)
    ];
  }
  function _e(e) {
    if (typeof e == "string" && e.includes("<alpha-value>")) {
      let t = e;
      return ({ opacityValue: r = 1 }) => t.replace(/<alpha-value>/g, r);
    }
    return e;
  }
  function Lt(e) {
    return O(e.slice(1, -1));
  }
  function Ia(e, t = {}, { tailwindConfig: r = {} } = {}) {
    var _a2, _b, _c, _d, _e2;
    if (((_a2 = t.values) == null ? void 0 : _a2[e]) !== void 0) return _e((_b = t.values) == null ? void 0 : _b[e]);
    let [a, n] = Wt(e);
    if (n !== void 0) {
      let i = ((_c = t.values) == null ? void 0 : _c[a]) ?? (ee(a) ? a.slice(1, -1) : void 0);
      return i === void 0 ? void 0 : (i = _e(i), ee(n) ? pe(i, Lt(n)) : ((_e2 = (_d = r.theme) == null ? void 0 : _d.opacity) == null ? void 0 : _e2[n]) === void 0 ? void 0 : pe(i, r.theme.opacity[n]));
    }
    return Se(e, t, {
      validate: ga
    });
  }
  function Ma(e, t = {}) {
    var _a2;
    return (_a2 = t.values) == null ? void 0 : _a2[e];
  }
  function W(e) {
    return (t, r) => Se(t, r, {
      validate: e
    });
  }
  var tt = {
    any: Se,
    color: Ia,
    url: W(Pt),
    image: W(ba),
    length: W(et),
    percentage: W(Ze),
    position: W(xa),
    lookup: Ma,
    "generic-name": W($a),
    "family-name": W(ka),
    number: W(Ft),
    "line-width": W(ha),
    "absolute-size": W(Sa),
    "relative-size": W(Oa),
    shadow: W(ma),
    size: W(ja)
  }, ht = Object.keys(tt);
  function za(e, t) {
    let r = e.indexOf(t);
    return r === -1 ? [
      void 0,
      e
    ] : [
      e.slice(0, r),
      e.slice(r + 1)
    ];
  }
  function mt(e, t, r, a) {
    if (r.values && t in r.values) for (let { type: i } of e ?? []) {
      let o = tt[i](t, r, {
        tailwindConfig: a
      });
      if (o !== void 0) return [
        o,
        i,
        null
      ];
    }
    if (ee(t)) {
      let i = t.slice(1, -1), [o, s] = za(i, ":");
      if (!/^[\w-_]+$/g.test(o)) s = i;
      else if (o !== void 0 && !ht.includes(o)) return [];
      if (s.length > 0 && ht.includes(o)) return [
        Se(`[${s}]`, r),
        o,
        null
      ];
    }
    let n = Bt(e, t, r, a);
    for (let i of n) return i;
    return [];
  }
  function* Bt(e, t, r, a) {
    var _a2;
    let n = J(a, "generalizedModifiers"), [i, o] = Wt(t);
    if (n && r.modifiers != null && (r.modifiers === "any" || typeof r.modifiers == "object" && (o && ee(o) || o in r.modifiers)) || (i = t, o = void 0), o !== void 0 && i === "" && (i = "DEFAULT"), o !== void 0 && typeof r.modifiers == "object") {
      let s = ((_a2 = r.modifiers) == null ? void 0 : _a2[o]) ?? null;
      s !== null ? o = s : ee(o) && (o = Lt(o));
    }
    for (let { type: s } of e ?? []) {
      let l = tt[s](i, r, {
        tailwindConfig: a
      });
      l !== void 0 && (yield [
        l,
        s,
        o ?? null
      ]);
    }
  }
  function te(e) {
    var _a2;
    let t = D.className();
    return t.value = e, Je(((_a2 = t == null ? void 0 : t.raws) == null ? void 0 : _a2.value) ?? t.value);
  }
  var Te = {
    "::after": [
      "terminal",
      "jumpable"
    ],
    "::backdrop": [
      "terminal",
      "jumpable"
    ],
    "::before": [
      "terminal",
      "jumpable"
    ],
    "::cue": [
      "terminal"
    ],
    "::cue-region": [
      "terminal"
    ],
    "::first-letter": [
      "terminal",
      "jumpable"
    ],
    "::first-line": [
      "terminal",
      "jumpable"
    ],
    "::grammar-error": [
      "terminal"
    ],
    "::marker": [
      "terminal",
      "jumpable"
    ],
    "::part": [
      "terminal",
      "actionable"
    ],
    "::placeholder": [
      "terminal",
      "jumpable"
    ],
    "::selection": [
      "terminal",
      "jumpable"
    ],
    "::slotted": [
      "terminal"
    ],
    "::spelling-error": [
      "terminal"
    ],
    "::target-text": [
      "terminal"
    ],
    "::file-selector-button": [
      "terminal",
      "actionable"
    ],
    "::deep": [
      "actionable"
    ],
    "::v-deep": [
      "actionable"
    ],
    "::ng-deep": [
      "actionable"
    ],
    ":after": [
      "terminal",
      "jumpable"
    ],
    ":before": [
      "terminal",
      "jumpable"
    ],
    ":first-letter": [
      "terminal",
      "jumpable"
    ],
    ":first-line": [
      "terminal",
      "jumpable"
    ],
    ":where": [],
    ":is": [],
    ":has": [],
    __default__: [
      "terminal",
      "actionable"
    ]
  };
  function rt(e) {
    let [t] = qt(e);
    return t.forEach(([r, a]) => r.removeChild(a)), e.nodes.push(...t.map(([, r]) => r)), e;
  }
  function qt(e) {
    let t = [], r = null;
    for (let a of e.nodes) if (a.type === "combinator") t = t.filter(([, n]) => at(n).includes("jumpable")), r = null;
    else if (a.type === "pseudo") {
      Va(a) ? (r = a, t.push([
        e,
        a,
        null
      ])) : r && _a(a, r) ? t.push([
        e,
        a,
        r
      ]) : r = null;
      for (let n of a.nodes ?? []) {
        let [i, o] = qt(n);
        r = o || r, t.push(...i);
      }
    }
    return [
      t,
      r
    ];
  }
  function Gt(e) {
    return e.value.startsWith("::") || Te[e.value] !== void 0;
  }
  function Va(e) {
    return Gt(e) && at(e).includes("terminal");
  }
  function _a(e, t) {
    return e.type !== "pseudo" || Gt(e) ? false : at(t).includes("actionable");
  }
  function at(e) {
    return Te[e.value] ?? Te.__default__;
  }
  var Pe = ":merge";
  function $e(e, { context: t, candidate: r }) {
    let a = (t == null ? void 0 : t.tailwindConfig.prefix) ?? "", n = e.map((o) => {
      let s = D().astSync(o.format);
      return {
        ...o,
        ast: o.respectPrefix ? Ke(a, s) : s
      };
    }), i = D.root({
      nodes: [
        D.selector({
          nodes: [
            D.className({
              value: te(r)
            })
          ]
        })
      ]
    });
    for (let { ast: o } of n) [i, o] = Pa(i, o), o.walkNesting((s) => s.replaceWith(...i.nodes[0].nodes)), i = o;
    return i;
  }
  function gt(e) {
    let t = [];
    for (; e.prev() && e.prev().type !== "combinator"; ) e = e.prev();
    for (; e && e.type !== "combinator"; ) t.push(e), e = e.next();
    return t;
  }
  function Ta(e) {
    return e.sort((t, r) => t.type === "tag" && r.type === "class" ? -1 : t.type === "class" && r.type === "tag" ? 1 : t.type === "class" && r.type === "pseudo" && r.value.startsWith("::") ? -1 : t.type === "pseudo" && t.value.startsWith("::") && r.type === "class" ? 1 : e.index(t) - e.index(r)), e;
  }
  function Yt(e, t) {
    let r = false;
    e.walk((a) => {
      if (a.type === "class" && a.value === t) return r = true, false;
    }), r || e.remove();
  }
  function Ht(e, t, { context: r, candidate: a, base: n }) {
    var _a2;
    let i = ((_a2 = r == null ? void 0 : r.tailwindConfig) == null ? void 0 : _a2.separator) ?? ":";
    n = n ?? B(a, i).pop();
    let o = D().astSync(e);
    if (o.walkClasses((p) => {
      p.raws && p.value.includes(n) && (p.raws.value = te(vr(p.raws.value)));
    }), o.each((p) => Yt(p, n)), o.length === 0) return null;
    let s = Array.isArray(t) ? $e(t, {
      context: r,
      candidate: a
    }) : t;
    if (s === null) return o.toString();
    let l = D.comment({
      value: "/*__simple__*/"
    }), f = D.comment({
      value: "/*__simple__*/"
    });
    return o.walkClasses((p) => {
      if (p.value !== n) return;
      let g = p.parent, u = s.nodes[0].nodes;
      if (g.nodes.length === 1) {
        p.replaceWith(...u);
        return;
      }
      let m = gt(p);
      g.insertBefore(m[0], l), g.insertAfter(m[m.length - 1], f);
      for (let y of u) g.insertBefore(m[0], y.clone());
      p.remove(), m = gt(l);
      let w = g.index(l);
      g.nodes.splice(w, m.length, ...Ta(D.selector({
        nodes: m
      })).nodes), l.remove(), f.remove();
    }), o.walkPseudos((p) => {
      p.value === Pe && p.replaceWith(p.nodes);
    }), o.each((p) => rt(p)), o.toString();
  }
  function Pa(e, t) {
    let r = [];
    return e.walkPseudos((a) => {
      a.value === Pe && r.push({
        pseudo: a,
        value: a.nodes[0].toString()
      });
    }), t.walkPseudos((a) => {
      if (a.value !== Pe) return;
      let n = a.nodes[0].toString(), i = r.find((f) => f.value === n);
      if (!i) return;
      let o = [], s = a.next();
      for (; s && s.type !== "combinator"; ) o.push(s), s = s.next();
      let l = s;
      i.pseudo.parent.insertAfter(i.pseudo, D.selector({
        nodes: o.map((f) => f.clone())
      })), a.remove(), o.forEach((f) => f.remove()), l && l.type === "combinator" && l.remove();
    }), [
      e,
      t
    ];
  }
  function Kt(e) {
    return Je(`.${te(e)}`);
  }
  function bt(e, t) {
    return Kt(ye(e, t));
  }
  function ye(e, t) {
    return t === "DEFAULT" ? e : t === "-" || t === "-DEFAULT" ? `-${e}` : t.startsWith("-") ? `-${e}${t}` : t.startsWith("/") ? `${e}${t}` : `${e}-${t}`;
  }
  function Ue(e) {
    return [
      "fontSize",
      "outline"
    ].includes(e) ? (t) => (typeof t == "function" && (t = t({})), Array.isArray(t) && (t = t[0]), t) : e === "fontFamily" ? (t) => {
      typeof t == "function" && (t = t({}));
      let r = Array.isArray(t) && fe(t[1]) ? t[0] : t;
      return Array.isArray(r) ? r.join(", ") : r;
    } : [
      "boxShadow",
      "transitionProperty",
      "transitionDuration",
      "transitionDelay",
      "transitionTimingFunction",
      "backgroundImage",
      "backgroundSize",
      "backgroundColor",
      "cursor",
      "animation"
    ].includes(e) ? (t) => (typeof t == "function" && (t = t({})), Array.isArray(t) && (t = t.join(", ")), t) : [
      "gridTemplateColumns",
      "gridTemplateRows",
      "objectPosition"
    ].includes(e) ? (t) => (typeof t == "function" && (t = t({})), typeof t == "string" && (t = I.list.comma(t).join(" ")), t) : (t, r = {}) => (typeof t == "function" && (t = t(r)), t);
  }
  function C(e, t = [
    [
      e,
      [
        e
      ]
    ]
  ], { filterDefault: r = false, ...a } = {}) {
    let n = Ue(e);
    return function({ matchUtilities: i, theme: o }) {
      for (let s of t) {
        let l = Array.isArray(s[0]) ? s : [
          s
        ];
        i(l.reduce((f, [p, g]) => Object.assign(f, {
          [p]: (u) => g.reduce((m, w) => Array.isArray(w) ? Object.assign(m, {
            [w[0]]: w[1]
          }) : Object.assign(m, {
            [w]: n(u)
          }), {})
        }), {}), {
          ...a,
          values: r ? Object.fromEntries(Object.entries(o(e) ?? {}).filter(([f]) => f !== "DEFAULT")) : o(e)
        });
      }
    };
  }
  function Ae(e) {
    return e = Array.isArray(e) ? e : [
      e
    ], e.map((t) => {
      let r = t.values.map((a) => a.raw !== void 0 ? a.raw : [
        a.min && `(min-width: ${a.min})`,
        a.max && `(max-width: ${a.max})`
      ].filter(Boolean).join(" and "));
      return t.not ? `not all and ${r}` : r;
    }).join(", ");
  }
  var Fa = /* @__PURE__ */ new Set([
    "normal",
    "reverse",
    "alternate",
    "alternate-reverse"
  ]), Na = /* @__PURE__ */ new Set([
    "running",
    "paused"
  ]), Wa = /* @__PURE__ */ new Set([
    "none",
    "forwards",
    "backwards",
    "both"
  ]), La = /* @__PURE__ */ new Set([
    "infinite"
  ]), Ba = /* @__PURE__ */ new Set([
    "linear",
    "ease",
    "ease-in",
    "ease-out",
    "ease-in-out",
    "step-start",
    "step-end"
  ]), qa = [
    "cubic-bezier",
    "steps"
  ], Ga = /\,(?![^(]*\))/g, Ya = /\ +(?![^(]*\))/g, yt = /^(-?[\d.]+m?s)$/, Ha = /^(\d+)$/;
  function Ka(e) {
    return e.split(Ga).map((t) => {
      let r = t.trim(), a = {
        value: r
      }, n = r.split(Ya), i = /* @__PURE__ */ new Set();
      for (let o of n) !i.has("DIRECTIONS") && Fa.has(o) ? (a.direction = o, i.add("DIRECTIONS")) : !i.has("PLAY_STATES") && Na.has(o) ? (a.playState = o, i.add("PLAY_STATES")) : !i.has("FILL_MODES") && Wa.has(o) ? (a.fillMode = o, i.add("FILL_MODES")) : !i.has("ITERATION_COUNTS") && (La.has(o) || Ha.test(o)) ? (a.iterationCount = o, i.add("ITERATION_COUNTS")) : !i.has("TIMING_FUNCTION") && Ba.has(o) || !i.has("TIMING_FUNCTION") && qa.some((s) => o.startsWith(`${s}(`)) ? (a.timingFunction = o, i.add("TIMING_FUNCTION")) : !i.has("DURATION") && yt.test(o) ? (a.duration = o, i.add("DURATION")) : !i.has("DELAY") && yt.test(o) ? (a.delay = o, i.add("DELAY")) : i.has("NAME") ? (a.unknown || (a.unknown = []), a.unknown.push(o)) : (a.name = o, i.add("NAME"));
      return a;
    });
  }
  var Jt = (e) => Object.assign({}, ...Object.entries(e ?? {}).flatMap(([t, r]) => typeof r == "object" ? Object.entries(Jt(r)).map(([a, n]) => ({
    [t + (a === "DEFAULT" ? "" : `-${a}`)]: n
  })) : [
    {
      [`${t}`]: r
    }
  ])), T = Jt;
  function j(e) {
    return typeof e == "function" ? e({}) : e;
  }
  var Ja = "3.4.17";
  function me(e, t = true) {
    return Array.isArray(e) ? e.map((r) => {
      if (t && Array.isArray(r)) throw new Error("The tuple syntax is not supported for `screens`.");
      if (typeof r == "string") return {
        name: r.toString(),
        not: false,
        values: [
          {
            min: r,
            max: void 0
          }
        ]
      };
      let [a, n] = r;
      return a = a.toString(), typeof n == "string" ? {
        name: a,
        not: false,
        values: [
          {
            min: n,
            max: void 0
          }
        ]
      } : Array.isArray(n) ? {
        name: a,
        not: false,
        values: n.map((i) => wt(i))
      } : {
        name: a,
        not: false,
        values: [
          wt(n)
        ]
      };
    }) : me(Object.entries(e ?? {}), false);
  }
  function Fe(e) {
    return e.values.length !== 1 ? {
      result: false,
      reason: "multiple-values"
    } : e.values[0].raw !== void 0 ? {
      result: false,
      reason: "raw-values"
    } : e.values[0].min !== void 0 && e.values[0].max !== void 0 ? {
      result: false,
      reason: "min-and-max"
    } : {
      result: true,
      reason: null
    };
  }
  function Xa(e, t, r) {
    let a = Ne(t, e), n = Ne(r, e), i = Fe(a), o = Fe(n);
    if (i.reason === "multiple-values" || o.reason === "multiple-values") throw new Error("Attempted to sort a screen with multiple values. This should never happen. Please open a bug report.");
    if (i.reason === "raw-values" || o.reason === "raw-values") throw new Error("Attempted to sort a screen with raw values. This should never happen. Please open a bug report.");
    if (i.reason === "min-and-max" || o.reason === "min-and-max") throw new Error("Attempted to sort a screen with both min and max values. This should never happen. Please open a bug report.");
    let { min: s, max: l } = a.values[0], { min: f, max: p } = n.values[0];
    t.not && ([s, l] = [
      l,
      s
    ]), r.not && ([f, p] = [
      p,
      f
    ]), s = s === void 0 ? s : parseFloat(s), l = l === void 0 ? l : parseFloat(l), f = f === void 0 ? f : parseFloat(f), p = p === void 0 ? p : parseFloat(p);
    let [g, u] = e === "min" ? [
      s,
      f
    ] : [
      p,
      l
    ];
    return g - u;
  }
  function Ne(e, t) {
    return typeof e == "object" ? e : {
      name: "arbitrary-screen",
      values: [
        {
          [t]: e
        }
      ]
    };
  }
  function wt({ "min-width": e, min: t = e, max: r, raw: a } = {}) {
    return {
      min: t,
      max: r,
      raw: a
    };
  }
  function je(e, t) {
    e.walkDecls((r) => {
      if (t.includes(r.prop)) {
        r.remove();
        return;
      }
      for (let a of t) r.value.includes(`/ var(${a})`) ? r.value = r.value.replace(`/ var(${a})`, "") : r.value.includes(`/ var(${a}, 1)`) && (r.value = r.value.replace(`/ var(${a}, 1)`, ""));
    });
  }
  var E = {
    childVariant: ({ addVariant: e }) => {
      e("*", "& > *");
    },
    pseudoElementVariants: ({ addVariant: e }) => {
      e("first-letter", "&::first-letter"), e("first-line", "&::first-line"), e("marker", [
        ({ container: t }) => (je(t, [
          "--tw-text-opacity"
        ]), "& *::marker"),
        ({ container: t }) => (je(t, [
          "--tw-text-opacity"
        ]), "&::marker")
      ]), e("selection", [
        "& *::selection",
        "&::selection"
      ]), e("file", "&::file-selector-button"), e("placeholder", "&::placeholder"), e("backdrop", "&::backdrop"), e("before", ({ container: t }) => (t.walkRules((r) => {
        let a = false;
        r.walkDecls("content", () => {
          a = true;
        }), a || r.prepend(I.decl({
          prop: "content",
          value: "var(--tw-content)"
        }));
      }), "&::before")), e("after", ({ container: t }) => (t.walkRules((r) => {
        let a = false;
        r.walkDecls("content", () => {
          a = true;
        }), a || r.prepend(I.decl({
          prop: "content",
          value: "var(--tw-content)"
        }));
      }), "&::after"));
    },
    pseudoClassVariants: ({ addVariant: e, matchVariant: t, config: r, prefix: a }) => {
      let n = [
        [
          "first",
          "&:first-child"
        ],
        [
          "last",
          "&:last-child"
        ],
        [
          "only",
          "&:only-child"
        ],
        [
          "odd",
          "&:nth-child(odd)"
        ],
        [
          "even",
          "&:nth-child(even)"
        ],
        "first-of-type",
        "last-of-type",
        "only-of-type",
        [
          "visited",
          ({ container: o }) => (je(o, [
            "--tw-text-opacity",
            "--tw-border-opacity",
            "--tw-bg-opacity"
          ]), "&:visited")
        ],
        "target",
        [
          "open",
          "&[open]"
        ],
        "default",
        "checked",
        "indeterminate",
        "placeholder-shown",
        "autofill",
        "optional",
        "required",
        "valid",
        "invalid",
        "in-range",
        "out-of-range",
        "read-only",
        "empty",
        "focus-within",
        [
          "hover",
          J(r(), "hoverOnlyWhenSupported") ? "@media (hover: hover) and (pointer: fine) { &:hover }" : "&:hover"
        ],
        "focus",
        "focus-visible",
        "active",
        "enabled",
        "disabled"
      ].map((o) => Array.isArray(o) ? o : [
        o,
        `&:${o}`
      ]);
      for (let [o, s] of n) e(o, (l) => typeof s == "function" ? s(l) : s);
      let i = {
        group: (o, { modifier: s }) => s ? [
          `:merge(${a(".group")}\\/${te(s)})`,
          " &"
        ] : [
          `:merge(${a(".group")})`,
          " &"
        ],
        peer: (o, { modifier: s }) => s ? [
          `:merge(${a(".peer")}\\/${te(s)})`,
          " ~ &"
        ] : [
          `:merge(${a(".peer")})`,
          " ~ &"
        ]
      };
      for (let [o, s] of Object.entries(i)) t(o, (l = "", f) => {
        let p = O(typeof l == "function" ? l(f) : l);
        p.includes("&") || (p = "&" + p);
        let [g, u] = s("", f), m = null, w = null, y = 0;
        for (let h = 0; h < p.length; ++h) {
          let d = p[h];
          d === "&" ? m = h : d === "'" || d === '"' ? y += 1 : m !== null && d === " " && !y && (w = h);
        }
        return m !== null && w === null && (w = p.length), p.slice(0, m) + g + p.slice(m + 1, w) + u + p.slice(w);
      }, {
        values: Object.fromEntries(n),
        [ie]: {
          respectPrefix: false
        }
      });
    },
    directionVariants: ({ addVariant: e }) => {
      e("ltr", '&:where([dir="ltr"], [dir="ltr"] *)'), e("rtl", '&:where([dir="rtl"], [dir="rtl"] *)');
    },
    reducedMotionVariants: ({ addVariant: e }) => {
      e("motion-safe", "@media (prefers-reduced-motion: no-preference)"), e("motion-reduce", "@media (prefers-reduced-motion: reduce)");
    },
    darkVariants: ({ config: e, addVariant: t }) => {
      let [r, a = ".dark"] = [].concat(e("darkMode", "media"));
      if (r === false && (r = "media", P.warn("darkmode-false", [
        "The `darkMode` option in your Tailwind CSS configuration is set to `false`, which now behaves the same as `media`.",
        "Change `darkMode` to `media` or remove it entirely.",
        "https://tailwindcss.com/docs/upgrade-guide#remove-dark-mode-configuration"
      ])), r === "variant") {
        let n;
        if (Array.isArray(a) || typeof a == "function" ? n = a : typeof a == "string" && (n = [
          a
        ]), Array.isArray(n)) for (let i of n) i === ".dark" ? (r = false, P.warn("darkmode-variant-without-selector", [
          "When using `variant` for `darkMode`, you must provide a selector.",
          'Example: `darkMode: ["variant", ".your-selector &"]`'
        ])) : i.includes("&") || (r = false, P.warn("darkmode-variant-without-ampersand", [
          "When using `variant` for `darkMode`, your selector must contain `&`.",
          'Example `darkMode: ["variant", ".your-selector &"]`'
        ]));
        a = n;
      }
      r === "selector" ? t("dark", `&:where(${a}, ${a} *)`) : r === "media" ? t("dark", "@media (prefers-color-scheme: dark)") : r === "variant" ? t("dark", a) : r === "class" && t("dark", `&:is(${a} *)`);
    },
    printVariant: ({ addVariant: e }) => {
      e("print", "@media print");
    },
    screenVariants: ({ theme: e, addVariant: t, matchVariant: r }) => {
      let a = e("screens") ?? {}, n = Object.values(a).every((d) => typeof d == "string"), i = me(e("screens")), o = /* @__PURE__ */ new Set([]);
      function s(d) {
        var _a2;
        return ((_a2 = d.match(/(\D+)$/)) == null ? void 0 : _a2[1]) ?? "(none)";
      }
      function l(d) {
        d !== void 0 && o.add(s(d));
      }
      function f(d) {
        return l(d), o.size === 1;
      }
      for (let d of i) for (let c of d.values) l(c.min), l(c.max);
      let p = o.size <= 1;
      function g(d) {
        return Object.fromEntries(i.filter((c) => Fe(c).result).map((c) => {
          let { min: v, max: $ } = c.values[0];
          if ($ !== void 0) return c;
          if (v !== void 0) return {
            ...c,
            not: !c.not
          };
        }).map((c) => [
          c.name,
          c
        ]));
      }
      function u(d) {
        return (c, v) => Xa(d, c.value, v.value);
      }
      let m = u("max"), w = u("min");
      function y(d) {
        return (c) => {
          if (n) if (p) {
            if (typeof c == "string" && !f(c)) return P.warn("minmax-have-mixed-units", [
              "The `min-*` and `max-*` variants are not supported with a `screens` configuration containing mixed units."
            ]), [];
          } else return P.warn("mixed-screen-units", [
            "The `min-*` and `max-*` variants are not supported with a `screens` configuration containing mixed units."
          ]), [];
          else return P.warn("complex-screen-config", [
            "The `min-*` and `max-*` variants are not supported with a `screens` configuration containing objects."
          ]), [];
          return [
            `@media ${Ae(Ne(c, d))}`
          ];
        };
      }
      r("max", y("max"), {
        sort: m,
        values: n ? g() : {}
      });
      let h = "min-screens";
      for (let d of i) t(d.name, `@media ${Ae(d)}`, {
        id: h,
        sort: n && p ? w : void 0,
        value: d
      });
      r("min", y("min"), {
        id: h,
        sort: w
      });
    },
    supportsVariants: ({ matchVariant: e, theme: t }) => {
      e("supports", (r = "") => {
        let a = O(r), n = /^\w*\s*\(/.test(a);
        return a = n ? a.replace(/\b(and|or|not)\b/g, " $1 ") : a, n ? `@supports ${a}` : (a.includes(":") || (a = `${a}: var(--tw)`), a.startsWith("(") && a.endsWith(")") || (a = `(${a})`), `@supports ${a}`);
      }, {
        values: t("supports") ?? {}
      });
    },
    hasVariants: ({ matchVariant: e, prefix: t }) => {
      e("has", (r) => `&:has(${O(r)})`, {
        values: {},
        [ie]: {
          respectPrefix: false
        }
      }), e("group-has", (r, { modifier: a }) => a ? `:merge(${t(".group")}\\/${a}):has(${O(r)}) &` : `:merge(${t(".group")}):has(${O(r)}) &`, {
        values: {},
        [ie]: {
          respectPrefix: false
        }
      }), e("peer-has", (r, { modifier: a }) => a ? `:merge(${t(".peer")}\\/${a}):has(${O(r)}) ~ &` : `:merge(${t(".peer")}):has(${O(r)}) ~ &`, {
        values: {},
        [ie]: {
          respectPrefix: false
        }
      });
    },
    ariaVariants: ({ matchVariant: e, theme: t }) => {
      e("aria", (r) => `&[aria-${Y(O(r))}]`, {
        values: t("aria") ?? {}
      }), e("group-aria", (r, { modifier: a }) => a ? `:merge(.group\\/${a})[aria-${Y(O(r))}] &` : `:merge(.group)[aria-${Y(O(r))}] &`, {
        values: t("aria") ?? {}
      }), e("peer-aria", (r, { modifier: a }) => a ? `:merge(.peer\\/${a})[aria-${Y(O(r))}] ~ &` : `:merge(.peer)[aria-${Y(O(r))}] ~ &`, {
        values: t("aria") ?? {}
      });
    },
    dataVariants: ({ matchVariant: e, theme: t }) => {
      e("data", (r) => `&[data-${Y(O(r))}]`, {
        values: t("data") ?? {}
      }), e("group-data", (r, { modifier: a }) => a ? `:merge(.group\\/${a})[data-${Y(O(r))}] &` : `:merge(.group)[data-${Y(O(r))}] &`, {
        values: t("data") ?? {}
      }), e("peer-data", (r, { modifier: a }) => a ? `:merge(.peer\\/${a})[data-${Y(O(r))}] ~ &` : `:merge(.peer)[data-${Y(O(r))}] ~ &`, {
        values: t("data") ?? {}
      });
    },
    orientationVariants: ({ addVariant: e }) => {
      e("portrait", "@media (orientation: portrait)"), e("landscape", "@media (orientation: landscape)");
    },
    prefersContrastVariants: ({ addVariant: e }) => {
      e("contrast-more", "@media (prefers-contrast: more)"), e("contrast-less", "@media (prefers-contrast: less)");
    },
    forcedColorsVariants: ({ addVariant: e }) => {
      e("forced-colors", "@media (forced-colors: active)");
    }
  }, q = [
    "translate(var(--tw-translate-x), var(--tw-translate-y))",
    "rotate(var(--tw-rotate))",
    "skewX(var(--tw-skew-x))",
    "skewY(var(--tw-skew-y))",
    "scaleX(var(--tw-scale-x))",
    "scaleY(var(--tw-scale-y))"
  ].join(" "), H = [
    "var(--tw-blur)",
    "var(--tw-brightness)",
    "var(--tw-contrast)",
    "var(--tw-grayscale)",
    "var(--tw-hue-rotate)",
    "var(--tw-invert)",
    "var(--tw-saturate)",
    "var(--tw-sepia)",
    "var(--tw-drop-shadow)"
  ].join(" "), z = [
    "var(--tw-backdrop-blur)",
    "var(--tw-backdrop-brightness)",
    "var(--tw-backdrop-contrast)",
    "var(--tw-backdrop-grayscale)",
    "var(--tw-backdrop-hue-rotate)",
    "var(--tw-backdrop-invert)",
    "var(--tw-backdrop-opacity)",
    "var(--tw-backdrop-saturate)",
    "var(--tw-backdrop-sepia)"
  ].join(" "), Qa = {
    preflight: ({ addBase: e }) => {
      let t = I.parse(`/*
1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
*/

*,
::before,
::after {
  box-sizing: border-box; /* 1 */
  border-width: 0; /* 2 */
  border-style: solid; /* 2 */
  border-color: theme('borderColor.DEFAULT', currentColor); /* 2 */
}

::before,
::after {
  --tw-content: '';
}

/*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured \`sans\` font-family by default.
5. Use the user's configured \`sans\` font-feature-settings by default.
6. Use the user's configured \`sans\` font-variation-settings by default.
7. Disable tap highlights on iOS
*/

html,
:host {
  line-height: 1.5; /* 1 */
  -webkit-text-size-adjust: 100%; /* 2 */
  -moz-tab-size: 4; /* 3 */
  tab-size: 4; /* 3 */
  font-family: theme('fontFamily.sans', ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"); /* 4 */
  font-feature-settings: theme('fontFamily.sans[1].fontFeatureSettings', normal); /* 5 */
  font-variation-settings: theme('fontFamily.sans[1].fontVariationSettings', normal); /* 6 */
  -webkit-tap-highlight-color: transparent; /* 7 */
}

/*
1. Remove the margin in all browsers.
2. Inherit line-height from \`html\` so users can set them as a class directly on the \`html\` element.
*/

body {
  margin: 0; /* 1 */
  line-height: inherit; /* 2 */
}

/*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

hr {
  height: 0; /* 1 */
  color: inherit; /* 2 */
  border-top-width: 1px; /* 3 */
}

/*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

abbr:where([title]) {
  text-decoration: underline dotted;
}

/*
Remove the default font size and weight for headings.
*/

h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}

/*
Reset links to optimize for opt-in styling instead of opt-out.
*/

a {
  color: inherit;
  text-decoration: inherit;
}

/*
Add the correct font weight in Edge and Safari.
*/

b,
strong {
  font-weight: bolder;
}

/*
1. Use the user's configured \`mono\` font-family by default.
2. Use the user's configured \`mono\` font-feature-settings by default.
3. Use the user's configured \`mono\` font-variation-settings by default.
4. Correct the odd \`em\` font sizing in all browsers.
*/

code,
kbd,
samp,
pre {
  font-family: theme('fontFamily.mono', ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace); /* 1 */
  font-feature-settings: theme('fontFamily.mono[1].fontFeatureSettings', normal); /* 2 */
  font-variation-settings: theme('fontFamily.mono[1].fontVariationSettings', normal); /* 3 */
  font-size: 1em; /* 4 */
}

/*
Add the correct font size in all browsers.
*/

small {
  font-size: 80%;
}

/*
Prevent \`sub\` and \`sup\` elements from affecting the line height in all browsers.
*/

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

table {
  text-indent: 0; /* 1 */
  border-color: inherit; /* 2 */
  border-collapse: collapse; /* 3 */
}

/*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

button,
input,
optgroup,
select,
textarea {
  font-family: inherit; /* 1 */
  font-feature-settings: inherit; /* 1 */
  font-variation-settings: inherit; /* 1 */
  font-size: 100%; /* 1 */
  font-weight: inherit; /* 1 */
  line-height: inherit; /* 1 */
  letter-spacing: inherit; /* 1 */
  color: inherit; /* 1 */
  margin: 0; /* 2 */
  padding: 0; /* 3 */
}

/*
Remove the inheritance of text transform in Edge and Firefox.
*/

button,
select {
  text-transform: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

button,
input:where([type='button']),
input:where([type='reset']),
input:where([type='submit']) {
  -webkit-appearance: button; /* 1 */
  background-color: transparent; /* 2 */
  background-image: none; /* 2 */
}

/*
Use the modern Firefox focus style for all focusable elements.
*/

:-moz-focusring {
  outline: auto;
}

/*
Remove the additional \`:invalid\` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

:-moz-ui-invalid {
  box-shadow: none;
}

/*
Add the correct vertical alignment in Chrome and Firefox.
*/

progress {
  vertical-align: baseline;
}

/*
Correct the cursor style of increment and decrement buttons in Safari.
*/

::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
  height: auto;
}

/*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

[type='search'] {
  -webkit-appearance: textfield; /* 1 */
  outline-offset: -2px; /* 2 */
}

/*
Remove the inner padding in Chrome and Safari on macOS.
*/

::-webkit-search-decoration {
  -webkit-appearance: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to \`inherit\` in Safari.
*/

::-webkit-file-upload-button {
  -webkit-appearance: button; /* 1 */
  font: inherit; /* 2 */
}

/*
Add the correct display in Chrome and Safari.
*/

summary {
  display: list-item;
}

/*
Removes the default spacing and border for appropriate elements.
*/

blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin: 0;
}

fieldset {
  margin: 0;
  padding: 0;
}

legend {
  padding: 0;
}

ol,
ul,
menu {
  list-style: none;
  margin: 0;
  padding: 0;
}

/*
Reset default styling for dialogs.
*/
dialog {
  padding: 0;
}

/*
Prevent resizing textareas horizontally by default.
*/

textarea {
  resize: vertical;
}

/*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

input::placeholder,
textarea::placeholder {
  opacity: 1; /* 1 */
  color: theme('colors.gray.400', #9ca3af); /* 2 */
}

/*
Set the default cursor for buttons.
*/

button,
[role="button"] {
  cursor: pointer;
}

/*
Make sure disabled buttons don't get the pointer cursor.
*/
:disabled {
  cursor: default;
}

/*
1. Make replaced elements \`display: block\` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add \`vertical-align: middle\` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display: block; /* 1 */
  vertical-align: middle; /* 2 */
}

/*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

img,
video {
  max-width: 100%;
  height: auto;
}

/* Make elements with the HTML hidden attribute stay hidden by default */
[hidden]:where(:not([hidden="until-found"])) {
  display: none;
}
`);
      e([
        I.comment({
          text: `! tailwindcss v${Ja} | MIT License | https://tailwindcss.com`
        }),
        ...t.nodes
      ]);
    },
    container: /* @__PURE__ */ (() => {
      function e(r = []) {
        return r.flatMap((a) => a.values.map((n) => n.min)).filter((a) => a !== void 0);
      }
      function t(r, a, n) {
        if (typeof n > "u") return [];
        if (!(typeof n == "object" && n !== null)) return [
          {
            screen: "DEFAULT",
            minWidth: 0,
            padding: n
          }
        ];
        let i = [];
        n.DEFAULT && i.push({
          screen: "DEFAULT",
          minWidth: 0,
          padding: n.DEFAULT
        });
        for (let o of r) for (let s of a) for (let { min: l } of s.values) l === o && i.push({
          minWidth: o,
          padding: n[s.name]
        });
        return i;
      }
      return function({ addComponents: r, theme: a }) {
        let n = me(a("container.screens", a("screens"))), i = e(n), o = t(i, n, a("container.padding")), s = (f) => {
          let p = o.find((g) => g.minWidth === f);
          return p ? {
            paddingRight: p.padding,
            paddingLeft: p.padding
          } : {};
        }, l = Array.from(new Set(i.slice().sort((f, p) => parseInt(f) - parseInt(p)))).map((f) => ({
          [`@media (min-width: ${f})`]: {
            ".container": {
              "max-width": f,
              ...s(f)
            }
          }
        }));
        r([
          {
            ".container": Object.assign({
              width: "100%"
            }, a("container.center", false) ? {
              marginRight: "auto",
              marginLeft: "auto"
            } : {}, s(0))
          },
          ...l
        ]);
      };
    })(),
    accessibility: ({ addUtilities: e }) => {
      e({
        ".sr-only": {
          position: "absolute",
          width: "1px",
          height: "1px",
          padding: "0",
          margin: "-1px",
          overflow: "hidden",
          clip: "rect(0, 0, 0, 0)",
          whiteSpace: "nowrap",
          borderWidth: "0"
        },
        ".not-sr-only": {
          position: "static",
          width: "auto",
          height: "auto",
          padding: "0",
          margin: "0",
          overflow: "visible",
          clip: "auto",
          whiteSpace: "normal"
        }
      });
    },
    pointerEvents: ({ addUtilities: e }) => {
      e({
        ".pointer-events-none": {
          "pointer-events": "none"
        },
        ".pointer-events-auto": {
          "pointer-events": "auto"
        }
      });
    },
    visibility: ({ addUtilities: e }) => {
      e({
        ".visible": {
          visibility: "visible"
        },
        ".invisible": {
          visibility: "hidden"
        },
        ".collapse": {
          visibility: "collapse"
        }
      });
    },
    position: ({ addUtilities: e }) => {
      e({
        ".static": {
          position: "static"
        },
        ".fixed": {
          position: "fixed"
        },
        ".absolute": {
          position: "absolute"
        },
        ".relative": {
          position: "relative"
        },
        ".sticky": {
          position: "sticky"
        }
      });
    },
    inset: C("inset", [
      [
        "inset",
        [
          "inset"
        ]
      ],
      [
        [
          "inset-x",
          [
            "left",
            "right"
          ]
        ],
        [
          "inset-y",
          [
            "top",
            "bottom"
          ]
        ]
      ],
      [
        [
          "start",
          [
            "inset-inline-start"
          ]
        ],
        [
          "end",
          [
            "inset-inline-end"
          ]
        ],
        [
          "top",
          [
            "top"
          ]
        ],
        [
          "right",
          [
            "right"
          ]
        ],
        [
          "bottom",
          [
            "bottom"
          ]
        ],
        [
          "left",
          [
            "left"
          ]
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    isolation: ({ addUtilities: e }) => {
      e({
        ".isolate": {
          isolation: "isolate"
        },
        ".isolation-auto": {
          isolation: "auto"
        }
      });
    },
    zIndex: C("zIndex", [
      [
        "z",
        [
          "zIndex"
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    order: C("order", void 0, {
      supportsNegativeValues: true
    }),
    gridColumn: C("gridColumn", [
      [
        "col",
        [
          "gridColumn"
        ]
      ]
    ]),
    gridColumnStart: C("gridColumnStart", [
      [
        "col-start",
        [
          "gridColumnStart"
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    gridColumnEnd: C("gridColumnEnd", [
      [
        "col-end",
        [
          "gridColumnEnd"
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    gridRow: C("gridRow", [
      [
        "row",
        [
          "gridRow"
        ]
      ]
    ]),
    gridRowStart: C("gridRowStart", [
      [
        "row-start",
        [
          "gridRowStart"
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    gridRowEnd: C("gridRowEnd", [
      [
        "row-end",
        [
          "gridRowEnd"
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    float: ({ addUtilities: e }) => {
      e({
        ".float-start": {
          float: "inline-start"
        },
        ".float-end": {
          float: "inline-end"
        },
        ".float-right": {
          float: "right"
        },
        ".float-left": {
          float: "left"
        },
        ".float-none": {
          float: "none"
        }
      });
    },
    clear: ({ addUtilities: e }) => {
      e({
        ".clear-start": {
          clear: "inline-start"
        },
        ".clear-end": {
          clear: "inline-end"
        },
        ".clear-left": {
          clear: "left"
        },
        ".clear-right": {
          clear: "right"
        },
        ".clear-both": {
          clear: "both"
        },
        ".clear-none": {
          clear: "none"
        }
      });
    },
    margin: C("margin", [
      [
        "m",
        [
          "margin"
        ]
      ],
      [
        [
          "mx",
          [
            "margin-left",
            "margin-right"
          ]
        ],
        [
          "my",
          [
            "margin-top",
            "margin-bottom"
          ]
        ]
      ],
      [
        [
          "ms",
          [
            "margin-inline-start"
          ]
        ],
        [
          "me",
          [
            "margin-inline-end"
          ]
        ],
        [
          "mt",
          [
            "margin-top"
          ]
        ],
        [
          "mr",
          [
            "margin-right"
          ]
        ],
        [
          "mb",
          [
            "margin-bottom"
          ]
        ],
        [
          "ml",
          [
            "margin-left"
          ]
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    boxSizing: ({ addUtilities: e }) => {
      e({
        ".box-border": {
          "box-sizing": "border-box"
        },
        ".box-content": {
          "box-sizing": "content-box"
        }
      });
    },
    lineClamp: ({ matchUtilities: e, addUtilities: t, theme: r }) => {
      e({
        "line-clamp": (a) => ({
          overflow: "hidden",
          display: "-webkit-box",
          "-webkit-box-orient": "vertical",
          "-webkit-line-clamp": `${a}`
        })
      }, {
        values: r("lineClamp")
      }), t({
        ".line-clamp-none": {
          overflow: "visible",
          display: "block",
          "-webkit-box-orient": "horizontal",
          "-webkit-line-clamp": "none"
        }
      });
    },
    display: ({ addUtilities: e }) => {
      e({
        ".block": {
          display: "block"
        },
        ".inline-block": {
          display: "inline-block"
        },
        ".inline": {
          display: "inline"
        },
        ".flex": {
          display: "flex"
        },
        ".inline-flex": {
          display: "inline-flex"
        },
        ".table": {
          display: "table"
        },
        ".inline-table": {
          display: "inline-table"
        },
        ".table-caption": {
          display: "table-caption"
        },
        ".table-cell": {
          display: "table-cell"
        },
        ".table-column": {
          display: "table-column"
        },
        ".table-column-group": {
          display: "table-column-group"
        },
        ".table-footer-group": {
          display: "table-footer-group"
        },
        ".table-header-group": {
          display: "table-header-group"
        },
        ".table-row-group": {
          display: "table-row-group"
        },
        ".table-row": {
          display: "table-row"
        },
        ".flow-root": {
          display: "flow-root"
        },
        ".grid": {
          display: "grid"
        },
        ".inline-grid": {
          display: "inline-grid"
        },
        ".contents": {
          display: "contents"
        },
        ".list-item": {
          display: "list-item"
        },
        ".hidden": {
          display: "none"
        }
      });
    },
    aspectRatio: C("aspectRatio", [
      [
        "aspect",
        [
          "aspect-ratio"
        ]
      ]
    ]),
    size: C("size", [
      [
        "size",
        [
          "width",
          "height"
        ]
      ]
    ]),
    height: C("height", [
      [
        "h",
        [
          "height"
        ]
      ]
    ]),
    maxHeight: C("maxHeight", [
      [
        "max-h",
        [
          "maxHeight"
        ]
      ]
    ]),
    minHeight: C("minHeight", [
      [
        "min-h",
        [
          "minHeight"
        ]
      ]
    ]),
    width: C("width", [
      [
        "w",
        [
          "width"
        ]
      ]
    ]),
    minWidth: C("minWidth", [
      [
        "min-w",
        [
          "minWidth"
        ]
      ]
    ]),
    maxWidth: C("maxWidth", [
      [
        "max-w",
        [
          "maxWidth"
        ]
      ]
    ]),
    flex: C("flex"),
    flexShrink: C("flexShrink", [
      [
        "flex-shrink",
        [
          "flex-shrink"
        ]
      ],
      [
        "shrink",
        [
          "flex-shrink"
        ]
      ]
    ]),
    flexGrow: C("flexGrow", [
      [
        "flex-grow",
        [
          "flex-grow"
        ]
      ],
      [
        "grow",
        [
          "flex-grow"
        ]
      ]
    ]),
    flexBasis: C("flexBasis", [
      [
        "basis",
        [
          "flex-basis"
        ]
      ]
    ]),
    tableLayout: ({ addUtilities: e }) => {
      e({
        ".table-auto": {
          "table-layout": "auto"
        },
        ".table-fixed": {
          "table-layout": "fixed"
        }
      });
    },
    captionSide: ({ addUtilities: e }) => {
      e({
        ".caption-top": {
          "caption-side": "top"
        },
        ".caption-bottom": {
          "caption-side": "bottom"
        }
      });
    },
    borderCollapse: ({ addUtilities: e }) => {
      e({
        ".border-collapse": {
          "border-collapse": "collapse"
        },
        ".border-separate": {
          "border-collapse": "separate"
        }
      });
    },
    borderSpacing: ({ addDefaults: e, matchUtilities: t, theme: r }) => {
      e("border-spacing", {
        "--tw-border-spacing-x": 0,
        "--tw-border-spacing-y": 0
      }), t({
        "border-spacing": (a) => ({
          "--tw-border-spacing-x": a,
          "--tw-border-spacing-y": a,
          "@defaults border-spacing": {},
          "border-spacing": "var(--tw-border-spacing-x) var(--tw-border-spacing-y)"
        }),
        "border-spacing-x": (a) => ({
          "--tw-border-spacing-x": a,
          "@defaults border-spacing": {},
          "border-spacing": "var(--tw-border-spacing-x) var(--tw-border-spacing-y)"
        }),
        "border-spacing-y": (a) => ({
          "--tw-border-spacing-y": a,
          "@defaults border-spacing": {},
          "border-spacing": "var(--tw-border-spacing-x) var(--tw-border-spacing-y)"
        })
      }, {
        values: r("borderSpacing")
      });
    },
    transformOrigin: C("transformOrigin", [
      [
        "origin",
        [
          "transformOrigin"
        ]
      ]
    ]),
    translate: C("translate", [
      [
        [
          "translate-x",
          [
            [
              "@defaults transform",
              {}
            ],
            "--tw-translate-x",
            [
              "transform",
              q
            ]
          ]
        ],
        [
          "translate-y",
          [
            [
              "@defaults transform",
              {}
            ],
            "--tw-translate-y",
            [
              "transform",
              q
            ]
          ]
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    rotate: C("rotate", [
      [
        "rotate",
        [
          [
            "@defaults transform",
            {}
          ],
          "--tw-rotate",
          [
            "transform",
            q
          ]
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    skew: C("skew", [
      [
        [
          "skew-x",
          [
            [
              "@defaults transform",
              {}
            ],
            "--tw-skew-x",
            [
              "transform",
              q
            ]
          ]
        ],
        [
          "skew-y",
          [
            [
              "@defaults transform",
              {}
            ],
            "--tw-skew-y",
            [
              "transform",
              q
            ]
          ]
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    scale: C("scale", [
      [
        "scale",
        [
          [
            "@defaults transform",
            {}
          ],
          "--tw-scale-x",
          "--tw-scale-y",
          [
            "transform",
            q
          ]
        ]
      ],
      [
        [
          "scale-x",
          [
            [
              "@defaults transform",
              {}
            ],
            "--tw-scale-x",
            [
              "transform",
              q
            ]
          ]
        ],
        [
          "scale-y",
          [
            [
              "@defaults transform",
              {}
            ],
            "--tw-scale-y",
            [
              "transform",
              q
            ]
          ]
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    transform: ({ addDefaults: e, addUtilities: t }) => {
      e("transform", {
        "--tw-translate-x": "0",
        "--tw-translate-y": "0",
        "--tw-rotate": "0",
        "--tw-skew-x": "0",
        "--tw-skew-y": "0",
        "--tw-scale-x": "1",
        "--tw-scale-y": "1"
      }), t({
        ".transform": {
          "@defaults transform": {},
          transform: q
        },
        ".transform-cpu": {
          transform: q
        },
        ".transform-gpu": {
          transform: q.replace("translate(var(--tw-translate-x), var(--tw-translate-y))", "translate3d(var(--tw-translate-x), var(--tw-translate-y), 0)")
        },
        ".transform-none": {
          transform: "none"
        }
      });
    },
    animation: ({ matchUtilities: e, theme: t, config: r }) => {
      let a = (i) => te(r("prefix") + i), n = Object.fromEntries(Object.entries(t("keyframes") ?? {}).map(([i, o]) => [
        i,
        {
          [`@keyframes ${a(i)}`]: o
        }
      ]));
      e({
        animate: (i) => {
          let o = Ka(i);
          return [
            ...o.flatMap((s) => n[s.name]),
            {
              animation: o.map(({ name: s, value: l }) => s === void 0 || n[s] === void 0 ? l : l.replace(s, a(s))).join(", ")
            }
          ];
        }
      }, {
        values: t("animation")
      });
    },
    cursor: C("cursor"),
    touchAction: ({ addDefaults: e, addUtilities: t }) => {
      e("touch-action", {
        "--tw-pan-x": " ",
        "--tw-pan-y": " ",
        "--tw-pinch-zoom": " "
      });
      let r = "var(--tw-pan-x) var(--tw-pan-y) var(--tw-pinch-zoom)";
      t({
        ".touch-auto": {
          "touch-action": "auto"
        },
        ".touch-none": {
          "touch-action": "none"
        },
        ".touch-pan-x": {
          "@defaults touch-action": {},
          "--tw-pan-x": "pan-x",
          "touch-action": r
        },
        ".touch-pan-left": {
          "@defaults touch-action": {},
          "--tw-pan-x": "pan-left",
          "touch-action": r
        },
        ".touch-pan-right": {
          "@defaults touch-action": {},
          "--tw-pan-x": "pan-right",
          "touch-action": r
        },
        ".touch-pan-y": {
          "@defaults touch-action": {},
          "--tw-pan-y": "pan-y",
          "touch-action": r
        },
        ".touch-pan-up": {
          "@defaults touch-action": {},
          "--tw-pan-y": "pan-up",
          "touch-action": r
        },
        ".touch-pan-down": {
          "@defaults touch-action": {},
          "--tw-pan-y": "pan-down",
          "touch-action": r
        },
        ".touch-pinch-zoom": {
          "@defaults touch-action": {},
          "--tw-pinch-zoom": "pinch-zoom",
          "touch-action": r
        },
        ".touch-manipulation": {
          "touch-action": "manipulation"
        }
      });
    },
    userSelect: ({ addUtilities: e }) => {
      e({
        ".select-none": {
          "user-select": "none"
        },
        ".select-text": {
          "user-select": "text"
        },
        ".select-all": {
          "user-select": "all"
        },
        ".select-auto": {
          "user-select": "auto"
        }
      });
    },
    resize: ({ addUtilities: e }) => {
      e({
        ".resize-none": {
          resize: "none"
        },
        ".resize-y": {
          resize: "vertical"
        },
        ".resize-x": {
          resize: "horizontal"
        },
        ".resize": {
          resize: "both"
        }
      });
    },
    scrollSnapType: ({ addDefaults: e, addUtilities: t }) => {
      e("scroll-snap-type", {
        "--tw-scroll-snap-strictness": "proximity"
      }), t({
        ".snap-none": {
          "scroll-snap-type": "none"
        },
        ".snap-x": {
          "@defaults scroll-snap-type": {},
          "scroll-snap-type": "x var(--tw-scroll-snap-strictness)"
        },
        ".snap-y": {
          "@defaults scroll-snap-type": {},
          "scroll-snap-type": "y var(--tw-scroll-snap-strictness)"
        },
        ".snap-both": {
          "@defaults scroll-snap-type": {},
          "scroll-snap-type": "both var(--tw-scroll-snap-strictness)"
        },
        ".snap-mandatory": {
          "--tw-scroll-snap-strictness": "mandatory"
        },
        ".snap-proximity": {
          "--tw-scroll-snap-strictness": "proximity"
        }
      });
    },
    scrollSnapAlign: ({ addUtilities: e }) => {
      e({
        ".snap-start": {
          "scroll-snap-align": "start"
        },
        ".snap-end": {
          "scroll-snap-align": "end"
        },
        ".snap-center": {
          "scroll-snap-align": "center"
        },
        ".snap-align-none": {
          "scroll-snap-align": "none"
        }
      });
    },
    scrollSnapStop: ({ addUtilities: e }) => {
      e({
        ".snap-normal": {
          "scroll-snap-stop": "normal"
        },
        ".snap-always": {
          "scroll-snap-stop": "always"
        }
      });
    },
    scrollMargin: C("scrollMargin", [
      [
        "scroll-m",
        [
          "scroll-margin"
        ]
      ],
      [
        [
          "scroll-mx",
          [
            "scroll-margin-left",
            "scroll-margin-right"
          ]
        ],
        [
          "scroll-my",
          [
            "scroll-margin-top",
            "scroll-margin-bottom"
          ]
        ]
      ],
      [
        [
          "scroll-ms",
          [
            "scroll-margin-inline-start"
          ]
        ],
        [
          "scroll-me",
          [
            "scroll-margin-inline-end"
          ]
        ],
        [
          "scroll-mt",
          [
            "scroll-margin-top"
          ]
        ],
        [
          "scroll-mr",
          [
            "scroll-margin-right"
          ]
        ],
        [
          "scroll-mb",
          [
            "scroll-margin-bottom"
          ]
        ],
        [
          "scroll-ml",
          [
            "scroll-margin-left"
          ]
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    scrollPadding: C("scrollPadding", [
      [
        "scroll-p",
        [
          "scroll-padding"
        ]
      ],
      [
        [
          "scroll-px",
          [
            "scroll-padding-left",
            "scroll-padding-right"
          ]
        ],
        [
          "scroll-py",
          [
            "scroll-padding-top",
            "scroll-padding-bottom"
          ]
        ]
      ],
      [
        [
          "scroll-ps",
          [
            "scroll-padding-inline-start"
          ]
        ],
        [
          "scroll-pe",
          [
            "scroll-padding-inline-end"
          ]
        ],
        [
          "scroll-pt",
          [
            "scroll-padding-top"
          ]
        ],
        [
          "scroll-pr",
          [
            "scroll-padding-right"
          ]
        ],
        [
          "scroll-pb",
          [
            "scroll-padding-bottom"
          ]
        ],
        [
          "scroll-pl",
          [
            "scroll-padding-left"
          ]
        ]
      ]
    ]),
    listStylePosition: ({ addUtilities: e }) => {
      e({
        ".list-inside": {
          "list-style-position": "inside"
        },
        ".list-outside": {
          "list-style-position": "outside"
        }
      });
    },
    listStyleType: C("listStyleType", [
      [
        "list",
        [
          "listStyleType"
        ]
      ]
    ]),
    listStyleImage: C("listStyleImage", [
      [
        "list-image",
        [
          "listStyleImage"
        ]
      ]
    ]),
    appearance: ({ addUtilities: e }) => {
      e({
        ".appearance-none": {
          appearance: "none"
        },
        ".appearance-auto": {
          appearance: "auto"
        }
      });
    },
    columns: C("columns", [
      [
        "columns",
        [
          "columns"
        ]
      ]
    ]),
    breakBefore: ({ addUtilities: e }) => {
      e({
        ".break-before-auto": {
          "break-before": "auto"
        },
        ".break-before-avoid": {
          "break-before": "avoid"
        },
        ".break-before-all": {
          "break-before": "all"
        },
        ".break-before-avoid-page": {
          "break-before": "avoid-page"
        },
        ".break-before-page": {
          "break-before": "page"
        },
        ".break-before-left": {
          "break-before": "left"
        },
        ".break-before-right": {
          "break-before": "right"
        },
        ".break-before-column": {
          "break-before": "column"
        }
      });
    },
    breakInside: ({ addUtilities: e }) => {
      e({
        ".break-inside-auto": {
          "break-inside": "auto"
        },
        ".break-inside-avoid": {
          "break-inside": "avoid"
        },
        ".break-inside-avoid-page": {
          "break-inside": "avoid-page"
        },
        ".break-inside-avoid-column": {
          "break-inside": "avoid-column"
        }
      });
    },
    breakAfter: ({ addUtilities: e }) => {
      e({
        ".break-after-auto": {
          "break-after": "auto"
        },
        ".break-after-avoid": {
          "break-after": "avoid"
        },
        ".break-after-all": {
          "break-after": "all"
        },
        ".break-after-avoid-page": {
          "break-after": "avoid-page"
        },
        ".break-after-page": {
          "break-after": "page"
        },
        ".break-after-left": {
          "break-after": "left"
        },
        ".break-after-right": {
          "break-after": "right"
        },
        ".break-after-column": {
          "break-after": "column"
        }
      });
    },
    gridAutoColumns: C("gridAutoColumns", [
      [
        "auto-cols",
        [
          "gridAutoColumns"
        ]
      ]
    ]),
    gridAutoFlow: ({ addUtilities: e }) => {
      e({
        ".grid-flow-row": {
          gridAutoFlow: "row"
        },
        ".grid-flow-col": {
          gridAutoFlow: "column"
        },
        ".grid-flow-dense": {
          gridAutoFlow: "dense"
        },
        ".grid-flow-row-dense": {
          gridAutoFlow: "row dense"
        },
        ".grid-flow-col-dense": {
          gridAutoFlow: "column dense"
        }
      });
    },
    gridAutoRows: C("gridAutoRows", [
      [
        "auto-rows",
        [
          "gridAutoRows"
        ]
      ]
    ]),
    gridTemplateColumns: C("gridTemplateColumns", [
      [
        "grid-cols",
        [
          "gridTemplateColumns"
        ]
      ]
    ]),
    gridTemplateRows: C("gridTemplateRows", [
      [
        "grid-rows",
        [
          "gridTemplateRows"
        ]
      ]
    ]),
    flexDirection: ({ addUtilities: e }) => {
      e({
        ".flex-row": {
          "flex-direction": "row"
        },
        ".flex-row-reverse": {
          "flex-direction": "row-reverse"
        },
        ".flex-col": {
          "flex-direction": "column"
        },
        ".flex-col-reverse": {
          "flex-direction": "column-reverse"
        }
      });
    },
    flexWrap: ({ addUtilities: e }) => {
      e({
        ".flex-wrap": {
          "flex-wrap": "wrap"
        },
        ".flex-wrap-reverse": {
          "flex-wrap": "wrap-reverse"
        },
        ".flex-nowrap": {
          "flex-wrap": "nowrap"
        }
      });
    },
    placeContent: ({ addUtilities: e }) => {
      e({
        ".place-content-center": {
          "place-content": "center"
        },
        ".place-content-start": {
          "place-content": "start"
        },
        ".place-content-end": {
          "place-content": "end"
        },
        ".place-content-between": {
          "place-content": "space-between"
        },
        ".place-content-around": {
          "place-content": "space-around"
        },
        ".place-content-evenly": {
          "place-content": "space-evenly"
        },
        ".place-content-baseline": {
          "place-content": "baseline"
        },
        ".place-content-stretch": {
          "place-content": "stretch"
        }
      });
    },
    placeItems: ({ addUtilities: e }) => {
      e({
        ".place-items-start": {
          "place-items": "start"
        },
        ".place-items-end": {
          "place-items": "end"
        },
        ".place-items-center": {
          "place-items": "center"
        },
        ".place-items-baseline": {
          "place-items": "baseline"
        },
        ".place-items-stretch": {
          "place-items": "stretch"
        }
      });
    },
    alignContent: ({ addUtilities: e }) => {
      e({
        ".content-normal": {
          "align-content": "normal"
        },
        ".content-center": {
          "align-content": "center"
        },
        ".content-start": {
          "align-content": "flex-start"
        },
        ".content-end": {
          "align-content": "flex-end"
        },
        ".content-between": {
          "align-content": "space-between"
        },
        ".content-around": {
          "align-content": "space-around"
        },
        ".content-evenly": {
          "align-content": "space-evenly"
        },
        ".content-baseline": {
          "align-content": "baseline"
        },
        ".content-stretch": {
          "align-content": "stretch"
        }
      });
    },
    alignItems: ({ addUtilities: e }) => {
      e({
        ".items-start": {
          "align-items": "flex-start"
        },
        ".items-end": {
          "align-items": "flex-end"
        },
        ".items-center": {
          "align-items": "center"
        },
        ".items-baseline": {
          "align-items": "baseline"
        },
        ".items-stretch": {
          "align-items": "stretch"
        }
      });
    },
    justifyContent: ({ addUtilities: e }) => {
      e({
        ".justify-normal": {
          "justify-content": "normal"
        },
        ".justify-start": {
          "justify-content": "flex-start"
        },
        ".justify-end": {
          "justify-content": "flex-end"
        },
        ".justify-center": {
          "justify-content": "center"
        },
        ".justify-between": {
          "justify-content": "space-between"
        },
        ".justify-around": {
          "justify-content": "space-around"
        },
        ".justify-evenly": {
          "justify-content": "space-evenly"
        },
        ".justify-stretch": {
          "justify-content": "stretch"
        }
      });
    },
    justifyItems: ({ addUtilities: e }) => {
      e({
        ".justify-items-start": {
          "justify-items": "start"
        },
        ".justify-items-end": {
          "justify-items": "end"
        },
        ".justify-items-center": {
          "justify-items": "center"
        },
        ".justify-items-stretch": {
          "justify-items": "stretch"
        }
      });
    },
    gap: C("gap", [
      [
        "gap",
        [
          "gap"
        ]
      ],
      [
        [
          "gap-x",
          [
            "columnGap"
          ]
        ],
        [
          "gap-y",
          [
            "rowGap"
          ]
        ]
      ]
    ]),
    space: ({ matchUtilities: e, addUtilities: t, theme: r }) => {
      e({
        "space-x": (a) => (a = a === "0" ? "0px" : a, {
          "& > :not([hidden]) ~ :not([hidden])": {
            "--tw-space-x-reverse": "0",
            "margin-right": `calc(${a} * var(--tw-space-x-reverse))`,
            "margin-left": `calc(${a} * calc(1 - var(--tw-space-x-reverse)))`
          }
        }),
        "space-y": (a) => (a = a === "0" ? "0px" : a, {
          "& > :not([hidden]) ~ :not([hidden])": {
            "--tw-space-y-reverse": "0",
            "margin-top": `calc(${a} * calc(1 - var(--tw-space-y-reverse)))`,
            "margin-bottom": `calc(${a} * var(--tw-space-y-reverse))`
          }
        })
      }, {
        values: r("space"),
        supportsNegativeValues: true
      }), t({
        ".space-y-reverse > :not([hidden]) ~ :not([hidden])": {
          "--tw-space-y-reverse": "1"
        },
        ".space-x-reverse > :not([hidden]) ~ :not([hidden])": {
          "--tw-space-x-reverse": "1"
        }
      });
    },
    divideWidth: ({ matchUtilities: e, addUtilities: t, theme: r }) => {
      e({
        "divide-x": (a) => (a = a === "0" ? "0px" : a, {
          "& > :not([hidden]) ~ :not([hidden])": {
            "@defaults border-width": {},
            "--tw-divide-x-reverse": "0",
            "border-right-width": `calc(${a} * var(--tw-divide-x-reverse))`,
            "border-left-width": `calc(${a} * calc(1 - var(--tw-divide-x-reverse)))`
          }
        }),
        "divide-y": (a) => (a = a === "0" ? "0px" : a, {
          "& > :not([hidden]) ~ :not([hidden])": {
            "@defaults border-width": {},
            "--tw-divide-y-reverse": "0",
            "border-top-width": `calc(${a} * calc(1 - var(--tw-divide-y-reverse)))`,
            "border-bottom-width": `calc(${a} * var(--tw-divide-y-reverse))`
          }
        })
      }, {
        values: r("divideWidth"),
        type: [
          "line-width",
          "length",
          "any"
        ]
      }), t({
        ".divide-y-reverse > :not([hidden]) ~ :not([hidden])": {
          "@defaults border-width": {},
          "--tw-divide-y-reverse": "1"
        },
        ".divide-x-reverse > :not([hidden]) ~ :not([hidden])": {
          "@defaults border-width": {},
          "--tw-divide-x-reverse": "1"
        }
      });
    },
    divideStyle: ({ addUtilities: e }) => {
      e({
        ".divide-solid > :not([hidden]) ~ :not([hidden])": {
          "border-style": "solid"
        },
        ".divide-dashed > :not([hidden]) ~ :not([hidden])": {
          "border-style": "dashed"
        },
        ".divide-dotted > :not([hidden]) ~ :not([hidden])": {
          "border-style": "dotted"
        },
        ".divide-double > :not([hidden]) ~ :not([hidden])": {
          "border-style": "double"
        },
        ".divide-none > :not([hidden]) ~ :not([hidden])": {
          "border-style": "none"
        }
      });
    },
    divideColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
      e({
        divide: (a) => r("divideOpacity") ? {
          "& > :not([hidden]) ~ :not([hidden])": N({
            color: a,
            property: "border-color",
            variable: "--tw-divide-opacity"
          })
        } : {
          "& > :not([hidden]) ~ :not([hidden])": {
            "border-color": j(a)
          }
        }
      }, {
        values: (({ DEFAULT: a, ...n }) => n)(T(t("divideColor"))),
        type: [
          "color",
          "any"
        ]
      });
    },
    divideOpacity: ({ matchUtilities: e, theme: t }) => {
      e({
        "divide-opacity": (r) => ({
          "& > :not([hidden]) ~ :not([hidden])": {
            "--tw-divide-opacity": r
          }
        })
      }, {
        values: t("divideOpacity")
      });
    },
    placeSelf: ({ addUtilities: e }) => {
      e({
        ".place-self-auto": {
          "place-self": "auto"
        },
        ".place-self-start": {
          "place-self": "start"
        },
        ".place-self-end": {
          "place-self": "end"
        },
        ".place-self-center": {
          "place-self": "center"
        },
        ".place-self-stretch": {
          "place-self": "stretch"
        }
      });
    },
    alignSelf: ({ addUtilities: e }) => {
      e({
        ".self-auto": {
          "align-self": "auto"
        },
        ".self-start": {
          "align-self": "flex-start"
        },
        ".self-end": {
          "align-self": "flex-end"
        },
        ".self-center": {
          "align-self": "center"
        },
        ".self-stretch": {
          "align-self": "stretch"
        },
        ".self-baseline": {
          "align-self": "baseline"
        }
      });
    },
    justifySelf: ({ addUtilities: e }) => {
      e({
        ".justify-self-auto": {
          "justify-self": "auto"
        },
        ".justify-self-start": {
          "justify-self": "start"
        },
        ".justify-self-end": {
          "justify-self": "end"
        },
        ".justify-self-center": {
          "justify-self": "center"
        },
        ".justify-self-stretch": {
          "justify-self": "stretch"
        }
      });
    },
    overflow: ({ addUtilities: e }) => {
      e({
        ".overflow-auto": {
          overflow: "auto"
        },
        ".overflow-hidden": {
          overflow: "hidden"
        },
        ".overflow-clip": {
          overflow: "clip"
        },
        ".overflow-visible": {
          overflow: "visible"
        },
        ".overflow-scroll": {
          overflow: "scroll"
        },
        ".overflow-x-auto": {
          "overflow-x": "auto"
        },
        ".overflow-y-auto": {
          "overflow-y": "auto"
        },
        ".overflow-x-hidden": {
          "overflow-x": "hidden"
        },
        ".overflow-y-hidden": {
          "overflow-y": "hidden"
        },
        ".overflow-x-clip": {
          "overflow-x": "clip"
        },
        ".overflow-y-clip": {
          "overflow-y": "clip"
        },
        ".overflow-x-visible": {
          "overflow-x": "visible"
        },
        ".overflow-y-visible": {
          "overflow-y": "visible"
        },
        ".overflow-x-scroll": {
          "overflow-x": "scroll"
        },
        ".overflow-y-scroll": {
          "overflow-y": "scroll"
        }
      });
    },
    overscrollBehavior: ({ addUtilities: e }) => {
      e({
        ".overscroll-auto": {
          "overscroll-behavior": "auto"
        },
        ".overscroll-contain": {
          "overscroll-behavior": "contain"
        },
        ".overscroll-none": {
          "overscroll-behavior": "none"
        },
        ".overscroll-y-auto": {
          "overscroll-behavior-y": "auto"
        },
        ".overscroll-y-contain": {
          "overscroll-behavior-y": "contain"
        },
        ".overscroll-y-none": {
          "overscroll-behavior-y": "none"
        },
        ".overscroll-x-auto": {
          "overscroll-behavior-x": "auto"
        },
        ".overscroll-x-contain": {
          "overscroll-behavior-x": "contain"
        },
        ".overscroll-x-none": {
          "overscroll-behavior-x": "none"
        }
      });
    },
    scrollBehavior: ({ addUtilities: e }) => {
      e({
        ".scroll-auto": {
          "scroll-behavior": "auto"
        },
        ".scroll-smooth": {
          "scroll-behavior": "smooth"
        }
      });
    },
    textOverflow: ({ addUtilities: e }) => {
      e({
        ".truncate": {
          overflow: "hidden",
          "text-overflow": "ellipsis",
          "white-space": "nowrap"
        },
        ".overflow-ellipsis": {
          "text-overflow": "ellipsis"
        },
        ".text-ellipsis": {
          "text-overflow": "ellipsis"
        },
        ".text-clip": {
          "text-overflow": "clip"
        }
      });
    },
    hyphens: ({ addUtilities: e }) => {
      e({
        ".hyphens-none": {
          hyphens: "none"
        },
        ".hyphens-manual": {
          hyphens: "manual"
        },
        ".hyphens-auto": {
          hyphens: "auto"
        }
      });
    },
    whitespace: ({ addUtilities: e }) => {
      e({
        ".whitespace-normal": {
          "white-space": "normal"
        },
        ".whitespace-nowrap": {
          "white-space": "nowrap"
        },
        ".whitespace-pre": {
          "white-space": "pre"
        },
        ".whitespace-pre-line": {
          "white-space": "pre-line"
        },
        ".whitespace-pre-wrap": {
          "white-space": "pre-wrap"
        },
        ".whitespace-break-spaces": {
          "white-space": "break-spaces"
        }
      });
    },
    textWrap: ({ addUtilities: e }) => {
      e({
        ".text-wrap": {
          "text-wrap": "wrap"
        },
        ".text-nowrap": {
          "text-wrap": "nowrap"
        },
        ".text-balance": {
          "text-wrap": "balance"
        },
        ".text-pretty": {
          "text-wrap": "pretty"
        }
      });
    },
    wordBreak: ({ addUtilities: e }) => {
      e({
        ".break-normal": {
          "overflow-wrap": "normal",
          "word-break": "normal"
        },
        ".break-words": {
          "overflow-wrap": "break-word"
        },
        ".break-all": {
          "word-break": "break-all"
        },
        ".break-keep": {
          "word-break": "keep-all"
        }
      });
    },
    borderRadius: C("borderRadius", [
      [
        "rounded",
        [
          "border-radius"
        ]
      ],
      [
        [
          "rounded-s",
          [
            "border-start-start-radius",
            "border-end-start-radius"
          ]
        ],
        [
          "rounded-e",
          [
            "border-start-end-radius",
            "border-end-end-radius"
          ]
        ],
        [
          "rounded-t",
          [
            "border-top-left-radius",
            "border-top-right-radius"
          ]
        ],
        [
          "rounded-r",
          [
            "border-top-right-radius",
            "border-bottom-right-radius"
          ]
        ],
        [
          "rounded-b",
          [
            "border-bottom-right-radius",
            "border-bottom-left-radius"
          ]
        ],
        [
          "rounded-l",
          [
            "border-top-left-radius",
            "border-bottom-left-radius"
          ]
        ]
      ],
      [
        [
          "rounded-ss",
          [
            "border-start-start-radius"
          ]
        ],
        [
          "rounded-se",
          [
            "border-start-end-radius"
          ]
        ],
        [
          "rounded-ee",
          [
            "border-end-end-radius"
          ]
        ],
        [
          "rounded-es",
          [
            "border-end-start-radius"
          ]
        ],
        [
          "rounded-tl",
          [
            "border-top-left-radius"
          ]
        ],
        [
          "rounded-tr",
          [
            "border-top-right-radius"
          ]
        ],
        [
          "rounded-br",
          [
            "border-bottom-right-radius"
          ]
        ],
        [
          "rounded-bl",
          [
            "border-bottom-left-radius"
          ]
        ]
      ]
    ]),
    borderWidth: C("borderWidth", [
      [
        "border",
        [
          [
            "@defaults border-width",
            {}
          ],
          "border-width"
        ]
      ],
      [
        [
          "border-x",
          [
            [
              "@defaults border-width",
              {}
            ],
            "border-left-width",
            "border-right-width"
          ]
        ],
        [
          "border-y",
          [
            [
              "@defaults border-width",
              {}
            ],
            "border-top-width",
            "border-bottom-width"
          ]
        ]
      ],
      [
        [
          "border-s",
          [
            [
              "@defaults border-width",
              {}
            ],
            "border-inline-start-width"
          ]
        ],
        [
          "border-e",
          [
            [
              "@defaults border-width",
              {}
            ],
            "border-inline-end-width"
          ]
        ],
        [
          "border-t",
          [
            [
              "@defaults border-width",
              {}
            ],
            "border-top-width"
          ]
        ],
        [
          "border-r",
          [
            [
              "@defaults border-width",
              {}
            ],
            "border-right-width"
          ]
        ],
        [
          "border-b",
          [
            [
              "@defaults border-width",
              {}
            ],
            "border-bottom-width"
          ]
        ],
        [
          "border-l",
          [
            [
              "@defaults border-width",
              {}
            ],
            "border-left-width"
          ]
        ]
      ]
    ], {
      type: [
        "line-width",
        "length"
      ]
    }),
    borderStyle: ({ addUtilities: e }) => {
      e({
        ".border-solid": {
          "border-style": "solid"
        },
        ".border-dashed": {
          "border-style": "dashed"
        },
        ".border-dotted": {
          "border-style": "dotted"
        },
        ".border-double": {
          "border-style": "double"
        },
        ".border-hidden": {
          "border-style": "hidden"
        },
        ".border-none": {
          "border-style": "none"
        }
      });
    },
    borderColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
      e({
        border: (a) => r("borderOpacity") ? N({
          color: a,
          property: "border-color",
          variable: "--tw-border-opacity"
        }) : {
          "border-color": j(a)
        }
      }, {
        values: (({ DEFAULT: a, ...n }) => n)(T(t("borderColor"))),
        type: [
          "color",
          "any"
        ]
      }), e({
        "border-x": (a) => r("borderOpacity") ? N({
          color: a,
          property: [
            "border-left-color",
            "border-right-color"
          ],
          variable: "--tw-border-opacity"
        }) : {
          "border-left-color": j(a),
          "border-right-color": j(a)
        },
        "border-y": (a) => r("borderOpacity") ? N({
          color: a,
          property: [
            "border-top-color",
            "border-bottom-color"
          ],
          variable: "--tw-border-opacity"
        }) : {
          "border-top-color": j(a),
          "border-bottom-color": j(a)
        }
      }, {
        values: (({ DEFAULT: a, ...n }) => n)(T(t("borderColor"))),
        type: [
          "color",
          "any"
        ]
      }), e({
        "border-s": (a) => r("borderOpacity") ? N({
          color: a,
          property: "border-inline-start-color",
          variable: "--tw-border-opacity"
        }) : {
          "border-inline-start-color": j(a)
        },
        "border-e": (a) => r("borderOpacity") ? N({
          color: a,
          property: "border-inline-end-color",
          variable: "--tw-border-opacity"
        }) : {
          "border-inline-end-color": j(a)
        },
        "border-t": (a) => r("borderOpacity") ? N({
          color: a,
          property: "border-top-color",
          variable: "--tw-border-opacity"
        }) : {
          "border-top-color": j(a)
        },
        "border-r": (a) => r("borderOpacity") ? N({
          color: a,
          property: "border-right-color",
          variable: "--tw-border-opacity"
        }) : {
          "border-right-color": j(a)
        },
        "border-b": (a) => r("borderOpacity") ? N({
          color: a,
          property: "border-bottom-color",
          variable: "--tw-border-opacity"
        }) : {
          "border-bottom-color": j(a)
        },
        "border-l": (a) => r("borderOpacity") ? N({
          color: a,
          property: "border-left-color",
          variable: "--tw-border-opacity"
        }) : {
          "border-left-color": j(a)
        }
      }, {
        values: (({ DEFAULT: a, ...n }) => n)(T(t("borderColor"))),
        type: [
          "color",
          "any"
        ]
      });
    },
    borderOpacity: C("borderOpacity", [
      [
        "border-opacity",
        [
          "--tw-border-opacity"
        ]
      ]
    ]),
    backgroundColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
      e({
        bg: (a) => r("backgroundOpacity") ? N({
          color: a,
          property: "background-color",
          variable: "--tw-bg-opacity"
        }) : {
          "background-color": j(a)
        }
      }, {
        values: T(t("backgroundColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    backgroundOpacity: C("backgroundOpacity", [
      [
        "bg-opacity",
        [
          "--tw-bg-opacity"
        ]
      ]
    ]),
    backgroundImage: C("backgroundImage", [
      [
        "bg",
        [
          "background-image"
        ]
      ]
    ], {
      type: [
        "lookup",
        "image",
        "url"
      ]
    }),
    gradientColorStops: /* @__PURE__ */ (() => {
      function e(t) {
        return pe(t, 0, "rgb(255 255 255 / 0)");
      }
      return function({ matchUtilities: t, theme: r, addDefaults: a }) {
        a("gradient-color-stops", {
          "--tw-gradient-from-position": " ",
          "--tw-gradient-via-position": " ",
          "--tw-gradient-to-position": " "
        });
        let n = {
          values: T(r("gradientColorStops")),
          type: [
            "color",
            "any"
          ]
        }, i = {
          values: r("gradientColorStopPositions"),
          type: [
            "length",
            "percentage"
          ]
        };
        t({
          from: (o) => {
            let s = e(o);
            return {
              "@defaults gradient-color-stops": {},
              "--tw-gradient-from": `${j(o)} var(--tw-gradient-from-position)`,
              "--tw-gradient-to": `${s} var(--tw-gradient-to-position)`,
              "--tw-gradient-stops": "var(--tw-gradient-from), var(--tw-gradient-to)"
            };
          }
        }, n), t({
          from: (o) => ({
            "--tw-gradient-from-position": o
          })
        }, i), t({
          via: (o) => {
            let s = e(o);
            return {
              "@defaults gradient-color-stops": {},
              "--tw-gradient-to": `${s}  var(--tw-gradient-to-position)`,
              "--tw-gradient-stops": `var(--tw-gradient-from), ${j(o)} var(--tw-gradient-via-position), var(--tw-gradient-to)`
            };
          }
        }, n), t({
          via: (o) => ({
            "--tw-gradient-via-position": o
          })
        }, i), t({
          to: (o) => ({
            "@defaults gradient-color-stops": {},
            "--tw-gradient-to": `${j(o)} var(--tw-gradient-to-position)`
          })
        }, n), t({
          to: (o) => ({
            "--tw-gradient-to-position": o
          })
        }, i);
      };
    })(),
    boxDecorationBreak: ({ addUtilities: e }) => {
      e({
        ".decoration-slice": {
          "box-decoration-break": "slice"
        },
        ".decoration-clone": {
          "box-decoration-break": "clone"
        },
        ".box-decoration-slice": {
          "box-decoration-break": "slice"
        },
        ".box-decoration-clone": {
          "box-decoration-break": "clone"
        }
      });
    },
    backgroundSize: C("backgroundSize", [
      [
        "bg",
        [
          "background-size"
        ]
      ]
    ], {
      type: [
        "lookup",
        "length",
        "percentage",
        "size"
      ]
    }),
    backgroundAttachment: ({ addUtilities: e }) => {
      e({
        ".bg-fixed": {
          "background-attachment": "fixed"
        },
        ".bg-local": {
          "background-attachment": "local"
        },
        ".bg-scroll": {
          "background-attachment": "scroll"
        }
      });
    },
    backgroundClip: ({ addUtilities: e }) => {
      e({
        ".bg-clip-border": {
          "background-clip": "border-box"
        },
        ".bg-clip-padding": {
          "background-clip": "padding-box"
        },
        ".bg-clip-content": {
          "background-clip": "content-box"
        },
        ".bg-clip-text": {
          "background-clip": "text"
        }
      });
    },
    backgroundPosition: C("backgroundPosition", [
      [
        "bg",
        [
          "background-position"
        ]
      ]
    ], {
      type: [
        "lookup",
        [
          "position",
          {
            preferOnConflict: true
          }
        ]
      ]
    }),
    backgroundRepeat: ({ addUtilities: e }) => {
      e({
        ".bg-repeat": {
          "background-repeat": "repeat"
        },
        ".bg-no-repeat": {
          "background-repeat": "no-repeat"
        },
        ".bg-repeat-x": {
          "background-repeat": "repeat-x"
        },
        ".bg-repeat-y": {
          "background-repeat": "repeat-y"
        },
        ".bg-repeat-round": {
          "background-repeat": "round"
        },
        ".bg-repeat-space": {
          "background-repeat": "space"
        }
      });
    },
    backgroundOrigin: ({ addUtilities: e }) => {
      e({
        ".bg-origin-border": {
          "background-origin": "border-box"
        },
        ".bg-origin-padding": {
          "background-origin": "padding-box"
        },
        ".bg-origin-content": {
          "background-origin": "content-box"
        }
      });
    },
    fill: ({ matchUtilities: e, theme: t }) => {
      e({
        fill: (r) => ({
          fill: j(r)
        })
      }, {
        values: T(t("fill")),
        type: [
          "color",
          "any"
        ]
      });
    },
    stroke: ({ matchUtilities: e, theme: t }) => {
      e({
        stroke: (r) => ({
          stroke: j(r)
        })
      }, {
        values: T(t("stroke")),
        type: [
          "color",
          "url",
          "any"
        ]
      });
    },
    strokeWidth: C("strokeWidth", [
      [
        "stroke",
        [
          "stroke-width"
        ]
      ]
    ], {
      type: [
        "length",
        "number",
        "percentage"
      ]
    }),
    objectFit: ({ addUtilities: e }) => {
      e({
        ".object-contain": {
          "object-fit": "contain"
        },
        ".object-cover": {
          "object-fit": "cover"
        },
        ".object-fill": {
          "object-fit": "fill"
        },
        ".object-none": {
          "object-fit": "none"
        },
        ".object-scale-down": {
          "object-fit": "scale-down"
        }
      });
    },
    objectPosition: C("objectPosition", [
      [
        "object",
        [
          "object-position"
        ]
      ]
    ]),
    padding: C("padding", [
      [
        "p",
        [
          "padding"
        ]
      ],
      [
        [
          "px",
          [
            "padding-left",
            "padding-right"
          ]
        ],
        [
          "py",
          [
            "padding-top",
            "padding-bottom"
          ]
        ]
      ],
      [
        [
          "ps",
          [
            "padding-inline-start"
          ]
        ],
        [
          "pe",
          [
            "padding-inline-end"
          ]
        ],
        [
          "pt",
          [
            "padding-top"
          ]
        ],
        [
          "pr",
          [
            "padding-right"
          ]
        ],
        [
          "pb",
          [
            "padding-bottom"
          ]
        ],
        [
          "pl",
          [
            "padding-left"
          ]
        ]
      ]
    ]),
    textAlign: ({ addUtilities: e }) => {
      e({
        ".text-left": {
          "text-align": "left"
        },
        ".text-center": {
          "text-align": "center"
        },
        ".text-right": {
          "text-align": "right"
        },
        ".text-justify": {
          "text-align": "justify"
        },
        ".text-start": {
          "text-align": "start"
        },
        ".text-end": {
          "text-align": "end"
        }
      });
    },
    textIndent: C("textIndent", [
      [
        "indent",
        [
          "text-indent"
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    verticalAlign: ({ addUtilities: e, matchUtilities: t }) => {
      e({
        ".align-baseline": {
          "vertical-align": "baseline"
        },
        ".align-top": {
          "vertical-align": "top"
        },
        ".align-middle": {
          "vertical-align": "middle"
        },
        ".align-bottom": {
          "vertical-align": "bottom"
        },
        ".align-text-top": {
          "vertical-align": "text-top"
        },
        ".align-text-bottom": {
          "vertical-align": "text-bottom"
        },
        ".align-sub": {
          "vertical-align": "sub"
        },
        ".align-super": {
          "vertical-align": "super"
        }
      }), t({
        align: (r) => ({
          "vertical-align": r
        })
      });
    },
    fontFamily: ({ matchUtilities: e, theme: t }) => {
      e({
        font: (r) => {
          let [a, n = {}] = Array.isArray(r) && fe(r[1]) ? r : [
            r
          ], { fontFeatureSettings: i, fontVariationSettings: o } = n;
          return {
            "font-family": Array.isArray(a) ? a.join(", ") : a,
            ...i === void 0 ? {} : {
              "font-feature-settings": i
            },
            ...o === void 0 ? {} : {
              "font-variation-settings": o
            }
          };
        }
      }, {
        values: t("fontFamily"),
        type: [
          "lookup",
          "generic-name",
          "family-name"
        ]
      });
    },
    fontSize: ({ matchUtilities: e, theme: t }) => {
      e({
        text: (r, { modifier: a }) => {
          let [n, i] = Array.isArray(r) ? r : [
            r
          ];
          if (a) return {
            "font-size": n,
            "line-height": a
          };
          let { lineHeight: o, letterSpacing: s, fontWeight: l } = fe(i) ? i : {
            lineHeight: i
          };
          return {
            "font-size": n,
            ...o === void 0 ? {} : {
              "line-height": o
            },
            ...s === void 0 ? {} : {
              "letter-spacing": s
            },
            ...l === void 0 ? {} : {
              "font-weight": l
            }
          };
        }
      }, {
        values: t("fontSize"),
        modifiers: t("lineHeight"),
        type: [
          "absolute-size",
          "relative-size",
          "length",
          "percentage"
        ]
      });
    },
    fontWeight: C("fontWeight", [
      [
        "font",
        [
          "fontWeight"
        ]
      ]
    ], {
      type: [
        "lookup",
        "number",
        "any"
      ]
    }),
    textTransform: ({ addUtilities: e }) => {
      e({
        ".uppercase": {
          "text-transform": "uppercase"
        },
        ".lowercase": {
          "text-transform": "lowercase"
        },
        ".capitalize": {
          "text-transform": "capitalize"
        },
        ".normal-case": {
          "text-transform": "none"
        }
      });
    },
    fontStyle: ({ addUtilities: e }) => {
      e({
        ".italic": {
          "font-style": "italic"
        },
        ".not-italic": {
          "font-style": "normal"
        }
      });
    },
    fontVariantNumeric: ({ addDefaults: e, addUtilities: t }) => {
      let r = "var(--tw-ordinal) var(--tw-slashed-zero) var(--tw-numeric-figure) var(--tw-numeric-spacing) var(--tw-numeric-fraction)";
      e("font-variant-numeric", {
        "--tw-ordinal": " ",
        "--tw-slashed-zero": " ",
        "--tw-numeric-figure": " ",
        "--tw-numeric-spacing": " ",
        "--tw-numeric-fraction": " "
      }), t({
        ".normal-nums": {
          "font-variant-numeric": "normal"
        },
        ".ordinal": {
          "@defaults font-variant-numeric": {},
          "--tw-ordinal": "ordinal",
          "font-variant-numeric": r
        },
        ".slashed-zero": {
          "@defaults font-variant-numeric": {},
          "--tw-slashed-zero": "slashed-zero",
          "font-variant-numeric": r
        },
        ".lining-nums": {
          "@defaults font-variant-numeric": {},
          "--tw-numeric-figure": "lining-nums",
          "font-variant-numeric": r
        },
        ".oldstyle-nums": {
          "@defaults font-variant-numeric": {},
          "--tw-numeric-figure": "oldstyle-nums",
          "font-variant-numeric": r
        },
        ".proportional-nums": {
          "@defaults font-variant-numeric": {},
          "--tw-numeric-spacing": "proportional-nums",
          "font-variant-numeric": r
        },
        ".tabular-nums": {
          "@defaults font-variant-numeric": {},
          "--tw-numeric-spacing": "tabular-nums",
          "font-variant-numeric": r
        },
        ".diagonal-fractions": {
          "@defaults font-variant-numeric": {},
          "--tw-numeric-fraction": "diagonal-fractions",
          "font-variant-numeric": r
        },
        ".stacked-fractions": {
          "@defaults font-variant-numeric": {},
          "--tw-numeric-fraction": "stacked-fractions",
          "font-variant-numeric": r
        }
      });
    },
    lineHeight: C("lineHeight", [
      [
        "leading",
        [
          "lineHeight"
        ]
      ]
    ]),
    letterSpacing: C("letterSpacing", [
      [
        "tracking",
        [
          "letterSpacing"
        ]
      ]
    ], {
      supportsNegativeValues: true
    }),
    textColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
      e({
        text: (a) => r("textOpacity") ? N({
          color: a,
          property: "color",
          variable: "--tw-text-opacity"
        }) : {
          color: j(a)
        }
      }, {
        values: T(t("textColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    textOpacity: C("textOpacity", [
      [
        "text-opacity",
        [
          "--tw-text-opacity"
        ]
      ]
    ]),
    textDecoration: ({ addUtilities: e }) => {
      e({
        ".underline": {
          "text-decoration-line": "underline"
        },
        ".overline": {
          "text-decoration-line": "overline"
        },
        ".line-through": {
          "text-decoration-line": "line-through"
        },
        ".no-underline": {
          "text-decoration-line": "none"
        }
      });
    },
    textDecorationColor: ({ matchUtilities: e, theme: t }) => {
      e({
        decoration: (r) => ({
          "text-decoration-color": j(r)
        })
      }, {
        values: T(t("textDecorationColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    textDecorationStyle: ({ addUtilities: e }) => {
      e({
        ".decoration-solid": {
          "text-decoration-style": "solid"
        },
        ".decoration-double": {
          "text-decoration-style": "double"
        },
        ".decoration-dotted": {
          "text-decoration-style": "dotted"
        },
        ".decoration-dashed": {
          "text-decoration-style": "dashed"
        },
        ".decoration-wavy": {
          "text-decoration-style": "wavy"
        }
      });
    },
    textDecorationThickness: C("textDecorationThickness", [
      [
        "decoration",
        [
          "text-decoration-thickness"
        ]
      ]
    ], {
      type: [
        "length",
        "percentage"
      ]
    }),
    textUnderlineOffset: C("textUnderlineOffset", [
      [
        "underline-offset",
        [
          "text-underline-offset"
        ]
      ]
    ], {
      type: [
        "length",
        "percentage",
        "any"
      ]
    }),
    fontSmoothing: ({ addUtilities: e }) => {
      e({
        ".antialiased": {
          "-webkit-font-smoothing": "antialiased",
          "-moz-osx-font-smoothing": "grayscale"
        },
        ".subpixel-antialiased": {
          "-webkit-font-smoothing": "auto",
          "-moz-osx-font-smoothing": "auto"
        }
      });
    },
    placeholderColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
      e({
        placeholder: (a) => r("placeholderOpacity") ? {
          "&::placeholder": N({
            color: a,
            property: "color",
            variable: "--tw-placeholder-opacity"
          })
        } : {
          "&::placeholder": {
            color: j(a)
          }
        }
      }, {
        values: T(t("placeholderColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    placeholderOpacity: ({ matchUtilities: e, theme: t }) => {
      e({
        "placeholder-opacity": (r) => ({
          "&::placeholder": {
            "--tw-placeholder-opacity": r
          }
        })
      }, {
        values: t("placeholderOpacity")
      });
    },
    caretColor: ({ matchUtilities: e, theme: t }) => {
      e({
        caret: (r) => ({
          "caret-color": j(r)
        })
      }, {
        values: T(t("caretColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    accentColor: ({ matchUtilities: e, theme: t }) => {
      e({
        accent: (r) => ({
          "accent-color": j(r)
        })
      }, {
        values: T(t("accentColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    opacity: C("opacity", [
      [
        "opacity",
        [
          "opacity"
        ]
      ]
    ]),
    backgroundBlendMode: ({ addUtilities: e }) => {
      e({
        ".bg-blend-normal": {
          "background-blend-mode": "normal"
        },
        ".bg-blend-multiply": {
          "background-blend-mode": "multiply"
        },
        ".bg-blend-screen": {
          "background-blend-mode": "screen"
        },
        ".bg-blend-overlay": {
          "background-blend-mode": "overlay"
        },
        ".bg-blend-darken": {
          "background-blend-mode": "darken"
        },
        ".bg-blend-lighten": {
          "background-blend-mode": "lighten"
        },
        ".bg-blend-color-dodge": {
          "background-blend-mode": "color-dodge"
        },
        ".bg-blend-color-burn": {
          "background-blend-mode": "color-burn"
        },
        ".bg-blend-hard-light": {
          "background-blend-mode": "hard-light"
        },
        ".bg-blend-soft-light": {
          "background-blend-mode": "soft-light"
        },
        ".bg-blend-difference": {
          "background-blend-mode": "difference"
        },
        ".bg-blend-exclusion": {
          "background-blend-mode": "exclusion"
        },
        ".bg-blend-hue": {
          "background-blend-mode": "hue"
        },
        ".bg-blend-saturation": {
          "background-blend-mode": "saturation"
        },
        ".bg-blend-color": {
          "background-blend-mode": "color"
        },
        ".bg-blend-luminosity": {
          "background-blend-mode": "luminosity"
        }
      });
    },
    mixBlendMode: ({ addUtilities: e }) => {
      e({
        ".mix-blend-normal": {
          "mix-blend-mode": "normal"
        },
        ".mix-blend-multiply": {
          "mix-blend-mode": "multiply"
        },
        ".mix-blend-screen": {
          "mix-blend-mode": "screen"
        },
        ".mix-blend-overlay": {
          "mix-blend-mode": "overlay"
        },
        ".mix-blend-darken": {
          "mix-blend-mode": "darken"
        },
        ".mix-blend-lighten": {
          "mix-blend-mode": "lighten"
        },
        ".mix-blend-color-dodge": {
          "mix-blend-mode": "color-dodge"
        },
        ".mix-blend-color-burn": {
          "mix-blend-mode": "color-burn"
        },
        ".mix-blend-hard-light": {
          "mix-blend-mode": "hard-light"
        },
        ".mix-blend-soft-light": {
          "mix-blend-mode": "soft-light"
        },
        ".mix-blend-difference": {
          "mix-blend-mode": "difference"
        },
        ".mix-blend-exclusion": {
          "mix-blend-mode": "exclusion"
        },
        ".mix-blend-hue": {
          "mix-blend-mode": "hue"
        },
        ".mix-blend-saturation": {
          "mix-blend-mode": "saturation"
        },
        ".mix-blend-color": {
          "mix-blend-mode": "color"
        },
        ".mix-blend-luminosity": {
          "mix-blend-mode": "luminosity"
        },
        ".mix-blend-plus-darker": {
          "mix-blend-mode": "plus-darker"
        },
        ".mix-blend-plus-lighter": {
          "mix-blend-mode": "plus-lighter"
        }
      });
    },
    boxShadow: (() => {
      let e = Ue("boxShadow"), t = [
        "var(--tw-ring-offset-shadow, 0 0 #0000)",
        "var(--tw-ring-shadow, 0 0 #0000)",
        "var(--tw-shadow)"
      ].join(", ");
      return function({ matchUtilities: r, addDefaults: a, theme: n }) {
        a("box-shadow", {
          "--tw-ring-offset-shadow": "0 0 #0000",
          "--tw-ring-shadow": "0 0 #0000",
          "--tw-shadow": "0 0 #0000",
          "--tw-shadow-colored": "0 0 #0000"
        }), r({
          shadow: (i) => {
            i = e(i);
            let o = Tt(i);
            for (let s of o) s.valid && (s.color = "var(--tw-shadow-color)");
            return {
              "@defaults box-shadow": {},
              "--tw-shadow": i === "none" ? "0 0 #0000" : i,
              "--tw-shadow-colored": i === "none" ? "0 0 #0000" : sa(o),
              "box-shadow": t
            };
          }
        }, {
          values: n("boxShadow"),
          type: [
            "shadow"
          ]
        });
      };
    })(),
    boxShadowColor: ({ matchUtilities: e, theme: t }) => {
      e({
        shadow: (r) => ({
          "--tw-shadow-color": j(r),
          "--tw-shadow": "var(--tw-shadow-colored)"
        })
      }, {
        values: T(t("boxShadowColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    outlineStyle: ({ addUtilities: e }) => {
      e({
        ".outline-none": {
          outline: "2px solid transparent",
          "outline-offset": "2px"
        },
        ".outline": {
          "outline-style": "solid"
        },
        ".outline-dashed": {
          "outline-style": "dashed"
        },
        ".outline-dotted": {
          "outline-style": "dotted"
        },
        ".outline-double": {
          "outline-style": "double"
        }
      });
    },
    outlineWidth: C("outlineWidth", [
      [
        "outline",
        [
          "outline-width"
        ]
      ]
    ], {
      type: [
        "length",
        "number",
        "percentage"
      ]
    }),
    outlineOffset: C("outlineOffset", [
      [
        "outline-offset",
        [
          "outline-offset"
        ]
      ]
    ], {
      type: [
        "length",
        "number",
        "percentage",
        "any"
      ],
      supportsNegativeValues: true
    }),
    outlineColor: ({ matchUtilities: e, theme: t }) => {
      e({
        outline: (r) => ({
          "outline-color": j(r)
        })
      }, {
        values: T(t("outlineColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    ringWidth: ({ matchUtilities: e, addDefaults: t, addUtilities: r, theme: a, config: n }) => {
      let i = (() => {
        var _a2, _b;
        if (J(n(), "respectDefaultRingColorOpacity")) return a("ringColor.DEFAULT");
        let o = a("ringOpacity.DEFAULT", "0.5");
        return ((_a2 = a("ringColor")) == null ? void 0 : _a2.DEFAULT) ? pe((_b = a("ringColor")) == null ? void 0 : _b.DEFAULT, o, `rgb(147 197 253 / ${o})`) : `rgb(147 197 253 / ${o})`;
      })();
      t("ring-width", {
        "--tw-ring-inset": " ",
        "--tw-ring-offset-width": a("ringOffsetWidth.DEFAULT", "0px"),
        "--tw-ring-offset-color": a("ringOffsetColor.DEFAULT", "#fff"),
        "--tw-ring-color": i,
        "--tw-ring-offset-shadow": "0 0 #0000",
        "--tw-ring-shadow": "0 0 #0000",
        "--tw-shadow": "0 0 #0000",
        "--tw-shadow-colored": "0 0 #0000"
      }), e({
        ring: (o) => ({
          "@defaults ring-width": {},
          "--tw-ring-offset-shadow": "var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color)",
          "--tw-ring-shadow": `var(--tw-ring-inset) 0 0 0 calc(${o} + var(--tw-ring-offset-width)) var(--tw-ring-color)`,
          "box-shadow": [
            "var(--tw-ring-offset-shadow)",
            "var(--tw-ring-shadow)",
            "var(--tw-shadow, 0 0 #0000)"
          ].join(", ")
        })
      }, {
        values: a("ringWidth"),
        type: "length"
      }), r({
        ".ring-inset": {
          "@defaults ring-width": {},
          "--tw-ring-inset": "inset"
        }
      });
    },
    ringColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
      e({
        ring: (a) => r("ringOpacity") ? N({
          color: a,
          property: "--tw-ring-color",
          variable: "--tw-ring-opacity"
        }) : {
          "--tw-ring-color": j(a)
        }
      }, {
        values: Object.fromEntries(Object.entries(T(t("ringColor"))).filter(([a]) => a !== "DEFAULT")),
        type: [
          "color",
          "any"
        ]
      });
    },
    ringOpacity: (e) => {
      let { config: t } = e;
      return C("ringOpacity", [
        [
          "ring-opacity",
          [
            "--tw-ring-opacity"
          ]
        ]
      ], {
        filterDefault: !J(t(), "respectDefaultRingColorOpacity")
      })(e);
    },
    ringOffsetWidth: C("ringOffsetWidth", [
      [
        "ring-offset",
        [
          "--tw-ring-offset-width"
        ]
      ]
    ], {
      type: "length"
    }),
    ringOffsetColor: ({ matchUtilities: e, theme: t }) => {
      e({
        "ring-offset": (r) => ({
          "--tw-ring-offset-color": j(r)
        })
      }, {
        values: T(t("ringOffsetColor")),
        type: [
          "color",
          "any"
        ]
      });
    },
    blur: ({ matchUtilities: e, theme: t }) => {
      e({
        blur: (r) => ({
          "--tw-blur": r.trim() === "" ? " " : `blur(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("blur")
      });
    },
    brightness: ({ matchUtilities: e, theme: t }) => {
      e({
        brightness: (r) => ({
          "--tw-brightness": `brightness(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("brightness")
      });
    },
    contrast: ({ matchUtilities: e, theme: t }) => {
      e({
        contrast: (r) => ({
          "--tw-contrast": `contrast(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("contrast")
      });
    },
    dropShadow: ({ matchUtilities: e, theme: t }) => {
      e({
        "drop-shadow": (r) => ({
          "--tw-drop-shadow": Array.isArray(r) ? r.map((a) => `drop-shadow(${a})`).join(" ") : `drop-shadow(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("dropShadow")
      });
    },
    grayscale: ({ matchUtilities: e, theme: t }) => {
      e({
        grayscale: (r) => ({
          "--tw-grayscale": `grayscale(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("grayscale")
      });
    },
    hueRotate: ({ matchUtilities: e, theme: t }) => {
      e({
        "hue-rotate": (r) => ({
          "--tw-hue-rotate": `hue-rotate(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("hueRotate"),
        supportsNegativeValues: true
      });
    },
    invert: ({ matchUtilities: e, theme: t }) => {
      e({
        invert: (r) => ({
          "--tw-invert": `invert(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("invert")
      });
    },
    saturate: ({ matchUtilities: e, theme: t }) => {
      e({
        saturate: (r) => ({
          "--tw-saturate": `saturate(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("saturate")
      });
    },
    sepia: ({ matchUtilities: e, theme: t }) => {
      e({
        sepia: (r) => ({
          "--tw-sepia": `sepia(${r})`,
          "@defaults filter": {},
          filter: H
        })
      }, {
        values: t("sepia")
      });
    },
    filter: ({ addDefaults: e, addUtilities: t }) => {
      e("filter", {
        "--tw-blur": " ",
        "--tw-brightness": " ",
        "--tw-contrast": " ",
        "--tw-grayscale": " ",
        "--tw-hue-rotate": " ",
        "--tw-invert": " ",
        "--tw-saturate": " ",
        "--tw-sepia": " ",
        "--tw-drop-shadow": " "
      }), t({
        ".filter": {
          "@defaults filter": {},
          filter: H
        },
        ".filter-none": {
          filter: "none"
        }
      });
    },
    backdropBlur: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-blur": (r) => ({
          "--tw-backdrop-blur": r.trim() === "" ? " " : `blur(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropBlur")
      });
    },
    backdropBrightness: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-brightness": (r) => ({
          "--tw-backdrop-brightness": `brightness(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropBrightness")
      });
    },
    backdropContrast: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-contrast": (r) => ({
          "--tw-backdrop-contrast": `contrast(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropContrast")
      });
    },
    backdropGrayscale: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-grayscale": (r) => ({
          "--tw-backdrop-grayscale": `grayscale(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropGrayscale")
      });
    },
    backdropHueRotate: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-hue-rotate": (r) => ({
          "--tw-backdrop-hue-rotate": `hue-rotate(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropHueRotate"),
        supportsNegativeValues: true
      });
    },
    backdropInvert: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-invert": (r) => ({
          "--tw-backdrop-invert": `invert(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropInvert")
      });
    },
    backdropOpacity: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-opacity": (r) => ({
          "--tw-backdrop-opacity": `opacity(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropOpacity")
      });
    },
    backdropSaturate: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-saturate": (r) => ({
          "--tw-backdrop-saturate": `saturate(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropSaturate")
      });
    },
    backdropSepia: ({ matchUtilities: e, theme: t }) => {
      e({
        "backdrop-sepia": (r) => ({
          "--tw-backdrop-sepia": `sepia(${r})`,
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        })
      }, {
        values: t("backdropSepia")
      });
    },
    backdropFilter: ({ addDefaults: e, addUtilities: t }) => {
      e("backdrop-filter", {
        "--tw-backdrop-blur": " ",
        "--tw-backdrop-brightness": " ",
        "--tw-backdrop-contrast": " ",
        "--tw-backdrop-grayscale": " ",
        "--tw-backdrop-hue-rotate": " ",
        "--tw-backdrop-invert": " ",
        "--tw-backdrop-opacity": " ",
        "--tw-backdrop-saturate": " ",
        "--tw-backdrop-sepia": " "
      }), t({
        ".backdrop-filter": {
          "@defaults backdrop-filter": {},
          "-webkit-backdrop-filter": z,
          "backdrop-filter": z
        },
        ".backdrop-filter-none": {
          "-webkit-backdrop-filter": "none",
          "backdrop-filter": "none"
        }
      });
    },
    transitionProperty: ({ matchUtilities: e, theme: t }) => {
      let r = t("transitionTimingFunction.DEFAULT"), a = t("transitionDuration.DEFAULT");
      e({
        transition: (n) => ({
          "transition-property": n,
          ...n === "none" ? {} : {
            "transition-timing-function": r,
            "transition-duration": a
          }
        })
      }, {
        values: t("transitionProperty")
      });
    },
    transitionDelay: C("transitionDelay", [
      [
        "delay",
        [
          "transitionDelay"
        ]
      ]
    ]),
    transitionDuration: C("transitionDuration", [
      [
        "duration",
        [
          "transitionDuration"
        ]
      ]
    ], {
      filterDefault: true
    }),
    transitionTimingFunction: C("transitionTimingFunction", [
      [
        "ease",
        [
          "transitionTimingFunction"
        ]
      ]
    ], {
      filterDefault: true
    }),
    willChange: C("willChange", [
      [
        "will-change",
        [
          "will-change"
        ]
      ]
    ]),
    contain: ({ addDefaults: e, addUtilities: t }) => {
      let r = "var(--tw-contain-size) var(--tw-contain-layout) var(--tw-contain-paint) var(--tw-contain-style)";
      e("contain", {
        "--tw-contain-size": " ",
        "--tw-contain-layout": " ",
        "--tw-contain-paint": " ",
        "--tw-contain-style": " "
      }), t({
        ".contain-none": {
          contain: "none"
        },
        ".contain-content": {
          contain: "content"
        },
        ".contain-strict": {
          contain: "strict"
        },
        ".contain-size": {
          "@defaults contain": {},
          "--tw-contain-size": "size",
          contain: r
        },
        ".contain-inline-size": {
          "@defaults contain": {},
          "--tw-contain-size": "inline-size",
          contain: r
        },
        ".contain-layout": {
          "@defaults contain": {},
          "--tw-contain-layout": "layout",
          contain: r
        },
        ".contain-paint": {
          "@defaults contain": {},
          "--tw-contain-paint": "paint",
          contain: r
        },
        ".contain-style": {
          "@defaults contain": {},
          "--tw-contain-style": "style",
          contain: r
        }
      });
    },
    content: C("content", [
      [
        "content",
        [
          "--tw-content",
          [
            "content",
            "var(--tw-content)"
          ]
        ]
      ]
    ]),
    forcedColorAdjust: ({ addUtilities: e }) => {
      e({
        ".forced-color-adjust-auto": {
          "forced-color-adjust": "auto"
        },
        ".forced-color-adjust-none": {
          "forced-color-adjust": "none"
        }
      });
    }
  };
  function nt(e) {
    if (Array.isArray(e)) return e;
    let t = e.split("[").length - 1, r = e.split("]").length - 1;
    if (t !== r) throw new Error(`Path is invalid. Has unbalanced brackets: ${e}`);
    return e.split(/\.(?![^\[]*\])|[\[\]]/g).filter(Boolean);
  }
  var Xt = /* @__PURE__ */ new Map([
    [
      "{",
      "}"
    ],
    [
      "[",
      "]"
    ],
    [
      "(",
      ")"
    ]
  ]), vt = new Map(Array.from(Xt.entries()).map(([e, t]) => [
    t,
    e
  ])), Za = /* @__PURE__ */ new Set([
    '"',
    "'",
    "`"
  ]);
  function We(e) {
    let t = [], r = false;
    for (let a = 0; a < e.length; a++) {
      let n = e[a];
      if (n === ":" && !r && t.length === 0) return false;
      if (Za.has(n) && e[a - 1] !== "\\" && (r = !r), !r && e[a - 1] !== "\\") {
        if (Xt.has(n)) t.push(n);
        else if (vt.has(n)) {
          let i = vt.get(n);
          if (t.length <= 0 || t.pop() !== i) return false;
        }
      }
    }
    return !(t.length > 0);
  }
  function xt(e) {
    return (e > 0n) - (e < 0n);
  }
  function en(e, t) {
    let r = 0n, a = 0n;
    for (let [n, i] of t) e & n && (r = r | n, a = a | i);
    return e & ~r | a;
  }
  var tn = class {
    constructor() {
      this.offsets = {
        defaults: 0n,
        base: 0n,
        components: 0n,
        utilities: 0n,
        variants: 0n,
        user: 0n
      }, this.layerPositions = {
        defaults: 0n,
        base: 1n,
        components: 2n,
        utilities: 3n,
        user: 4n,
        variants: 5n
      }, this.reservedVariantBits = 0n, this.variantOffsets = /* @__PURE__ */ new Map();
    }
    create(e) {
      return {
        layer: e,
        parentLayer: e,
        arbitrary: 0n,
        variants: 0n,
        parallelIndex: 0n,
        index: this.offsets[e]++,
        propertyOffset: 0n,
        property: "",
        options: []
      };
    }
    arbitraryProperty(e) {
      return {
        ...this.create("utilities"),
        arbitrary: 1n,
        property: e
      };
    }
    forVariant(e, t = 0) {
      let r = this.variantOffsets.get(e);
      if (r === void 0) throw new Error(`Cannot find offset for unknown variant ${e}`);
      return {
        ...this.create("variants"),
        variants: r << BigInt(t)
      };
    }
    applyVariantOffset(e, t, r) {
      return r.variant = t.variants, {
        ...e,
        layer: "variants",
        parentLayer: e.layer === "variants" ? e.parentLayer : e.layer,
        variants: e.variants | t.variants,
        options: r.sort ? [].concat(r, e.options) : e.options,
        parallelIndex: kt([
          e.parallelIndex,
          t.parallelIndex
        ])
      };
    }
    applyParallelOffset(e, t) {
      return {
        ...e,
        parallelIndex: BigInt(t)
      };
    }
    recordVariants(e, t) {
      for (let r of e) this.recordVariant(r, t(r));
    }
    recordVariant(e, t = 1) {
      return this.variantOffsets.set(e, 1n << this.reservedVariantBits), this.reservedVariantBits += BigInt(t), {
        ...this.create("variants"),
        variants: this.variantOffsets.get(e)
      };
    }
    compare(e, t) {
      if (e.layer !== t.layer) return this.layerPositions[e.layer] - this.layerPositions[t.layer];
      if (e.parentLayer !== t.parentLayer) return this.layerPositions[e.parentLayer] - this.layerPositions[t.parentLayer];
      for (let r of e.options) for (let a of t.options) {
        if (r.id !== a.id || !r.sort || !a.sort) continue;
        let n = kt([
          r.variant,
          a.variant
        ]) ?? 0n, i = ~(n | n - 1n), o = e.variants & i, s = t.variants & i;
        if (o !== s) continue;
        let l = r.sort({
          value: r.value,
          modifier: r.modifier
        }, {
          value: a.value,
          modifier: a.modifier
        });
        if (l !== 0) return l;
      }
      return e.variants !== t.variants ? e.variants - t.variants : e.parallelIndex !== t.parallelIndex ? e.parallelIndex - t.parallelIndex : e.arbitrary !== t.arbitrary ? e.arbitrary - t.arbitrary : e.propertyOffset !== t.propertyOffset ? e.propertyOffset - t.propertyOffset : e.index - t.index;
    }
    recalculateVariantOffsets() {
      let e = Array.from(this.variantOffsets.entries()).filter(([r]) => r.startsWith("[")).sort(([r], [a]) => rn(r, a)), t = e.map(([, r]) => r).sort((r, a) => xt(r - a));
      return e.map(([, r], a) => [
        r,
        t[a]
      ]).filter(([r, a]) => r !== a);
    }
    remapArbitraryVariantOffsets(e) {
      let t = this.recalculateVariantOffsets();
      return t.length === 0 ? e : e.map((r) => {
        let [a, n] = r;
        return a = {
          ...a,
          variants: en(a.variants, t)
        }, [
          a,
          n
        ];
      });
    }
    sortArbitraryProperties(e) {
      let t = /* @__PURE__ */ new Set();
      for (let [i] of e) i.arbitrary === 1n && t.add(i.property);
      if (t.size === 0) return e;
      let r = Array.from(t).sort(), a = /* @__PURE__ */ new Map(), n = 1n;
      for (let i of r) a.set(i, n++);
      return e.map((i) => {
        let [o, s] = i;
        return o = {
          ...o,
          propertyOffset: a.get(o.property) ?? 0n
        }, [
          o,
          s
        ];
      });
    }
    sort(e) {
      return e = this.remapArbitraryVariantOffsets(e), e = this.sortArbitraryProperties(e), e.sort(([t], [r]) => xt(this.compare(t, r)));
    }
  };
  function kt(e) {
    let t = null;
    for (let r of e) t = t ?? r, t = t > r ? t : r;
    return t;
  }
  function rn(e, t) {
    let r = e.length, a = t.length, n = r < a ? r : a;
    for (let i = 0; i < n; i++) {
      let o = e.charCodeAt(i) - t.charCodeAt(i);
      if (o !== 0) return o;
    }
    return r - a;
  }
  var ie = Symbol(), Ee = {
    MatchVariant: Symbol.for("MATCH_VARIANT")
  }, Le = {
    Base: 1,
    Dynamic: 2
  };
  function De(e, t) {
    let r = e.tailwindConfig.prefix;
    return typeof r == "function" ? r(t) : r + t;
  }
  function Ct({ type: e = "any", ...t }) {
    let r = [].concat(e);
    return {
      ...t,
      types: r.map((a) => Array.isArray(a) ? {
        type: a[0],
        ...a[1]
      } : {
        type: a,
        preferOnConflict: false
      })
    };
  }
  function an(e) {
    let t = [], r = "", a = 0;
    for (let n = 0; n < e.length; n++) {
      let i = e[n];
      if (i === "\\") r += "\\" + e[++n];
      else if (i === "{") ++a, t.push(r.trim()), r = "";
      else if (i === "}") {
        if (--a < 0) throw new Error("Your { and } are unbalanced.");
        t.push(r.trim()), r = "";
      } else r += i;
    }
    return r.length > 0 && t.push(r.trim()), t = t.filter((n) => n !== ""), t;
  }
  function nn(e, t, { before: r = [] } = {}) {
    if (r = [].concat(r), r.length <= 0) {
      e.push(t);
      return;
    }
    let a = e.length - 1;
    for (let n of r) {
      let i = e.indexOf(n);
      i !== -1 && (a = Math.min(a, i));
    }
    e.splice(a, 0, t);
  }
  function Qt(e) {
    return Array.isArray(e) ? e.flatMap((t) => !Array.isArray(t) && !fe(t) ? t : He(t)) : Qt([
      e
    ]);
  }
  function on(e, t) {
    return D((r) => {
      let a = [];
      return t && t(r), r.walkClasses((n) => {
        a.push(n.value);
      }), a;
    }).transformSync(e);
  }
  function sn(e) {
    e.walkPseudos((t) => {
      t.value === ":not" && t.remove();
    });
  }
  function ln(e, t = {
    containsNonOnDemandable: false
  }, r = 0) {
    let a = [], n = [];
    e.type === "rule" ? n.push(...e.selectors) : e.type === "atrule" && e.walkRules((i) => n.push(...i.selectors));
    for (let i of n) {
      let o = on(i, sn);
      o.length === 0 && (t.containsNonOnDemandable = true);
      for (let s of o) a.push(s);
    }
    return r === 0 ? [
      t.containsNonOnDemandable || a.length === 0,
      a
    ] : a;
  }
  function ge(e) {
    return Qt(e).flatMap((t) => {
      let r = /* @__PURE__ */ new Map(), [a, n] = ln(t);
      return a && n.unshift(oe), n.map((i) => (r.has(t) || r.set(t, t), [
        i,
        r.get(t)
      ]));
    });
  }
  function Be(e) {
    return e.startsWith("@") || e.includes("&");
  }
  function we(e) {
    e = e.replace(/\n+/g, "").replace(/\s{1,}/g, " ").trim();
    let t = an(e).map((r) => {
      if (!r.startsWith("@")) return ({ format: i }) => i(r);
      let [, a, n] = /@(\S*)( .+|[({].*)?/g.exec(r);
      return ({ wrap: i }) => i(I.atRule({
        name: a,
        params: (n == null ? void 0 : n.trim()) ?? ""
      }));
    }).reverse();
    return (r) => {
      for (let a of t) a(r);
    };
  }
  function dn(e, t, { variantList: r, variantMap: a, offsets: n, classList: i }) {
    function o(u, m) {
      return u ? ce(e, u, m) : e;
    }
    function s(u) {
      return Ke(e.prefix, u);
    }
    function l(u, m) {
      return u === oe ? oe : m.respectPrefix ? t.tailwindConfig.prefix + u : u;
    }
    function f(u, m, w = {}) {
      let y = nt(u), h = o([
        "theme",
        ...y
      ], m);
      return Ue(y[0])(h, w);
    }
    let p = 0, g = {
      postcss: I,
      prefix: s,
      e: te,
      config: o,
      theme: f,
      corePlugins: (u) => Array.isArray(e.corePlugins) ? e.corePlugins.includes(u) : o([
        "corePlugins",
        u
      ], true),
      variants: () => [],
      addBase(u) {
        for (let [m, w] of ge(u)) {
          let y = l(m, {}), h = n.create("base");
          t.candidateRuleMap.has(y) || t.candidateRuleMap.set(y, []), t.candidateRuleMap.get(y).push([
            {
              sort: h,
              layer: "base"
            },
            w
          ]);
        }
      },
      addDefaults(u, m) {
        let w = {
          [`@defaults ${u}`]: m
        };
        for (let [y, h] of ge(w)) {
          let d = l(y, {});
          t.candidateRuleMap.has(d) || t.candidateRuleMap.set(d, []), t.candidateRuleMap.get(d).push([
            {
              sort: n.create("defaults"),
              layer: "defaults"
            },
            h
          ]);
        }
      },
      addComponents(u, m) {
        m = Object.assign({}, {
          preserveSource: false,
          respectPrefix: true,
          respectImportant: false
        }, Array.isArray(m) ? {} : m);
        for (let [w, y] of ge(u)) {
          let h = l(w, m);
          i.add(h), t.candidateRuleMap.has(h) || t.candidateRuleMap.set(h, []), t.candidateRuleMap.get(h).push([
            {
              sort: n.create("components"),
              layer: "components",
              options: m
            },
            y
          ]);
        }
      },
      addUtilities(u, m) {
        m = Object.assign({}, {
          preserveSource: false,
          respectPrefix: true,
          respectImportant: true
        }, Array.isArray(m) ? {} : m);
        for (let [w, y] of ge(u)) {
          let h = l(w, m);
          i.add(h), t.candidateRuleMap.has(h) || t.candidateRuleMap.set(h, []), t.candidateRuleMap.get(h).push([
            {
              sort: n.create("utilities"),
              layer: "utilities",
              options: m
            },
            y
          ]);
        }
      },
      matchUtilities: function(u, m) {
        m = Ct({
          respectPrefix: true,
          respectImportant: true,
          modifiers: false,
          ...m
        });
        let w = n.create("utilities");
        for (let y in u) {
          let h = function($, { isOnlyPlugin: b }) {
            let [x, S, U] = mt(m.types, $, m, e);
            if (x === void 0) return [];
            if (!m.types.some(({ type: A }) => A === S)) if (b) P.warn([
              `Unnecessary typehint \`${S}\` in \`${y}-${$}\`.`,
              `You can safely update it to \`${y}-${$.replace(S + ":", "")}\`.`
            ]);
            else return [];
            if (!We(x)) return [];
            let F = {
              get modifier() {
                return m.modifiers || P.warn(`modifier-used-without-options-for-${y}`, [
                  "Your plugin must set `modifiers: true` in its options to support modifiers."
                ]), U;
              }
            }, k = J(e, "generalizedModifiers");
            return [].concat(k ? c(x, F) : c(x)).filter(Boolean).map((A) => ({
              [bt(y, $)]: A
            }));
          }, d = l(y, m), c = u[y];
          i.add([
            d,
            m
          ]);
          let v = [
            {
              sort: w,
              layer: "utilities",
              options: m
            },
            h
          ];
          t.candidateRuleMap.has(d) || t.candidateRuleMap.set(d, []), t.candidateRuleMap.get(d).push(v);
        }
      },
      matchComponents: function(u, m) {
        m = Ct({
          respectPrefix: true,
          respectImportant: false,
          modifiers: false,
          ...m
        });
        let w = n.create("components");
        for (let y in u) {
          let h = function($, { isOnlyPlugin: b }) {
            let [x, S, U] = mt(m.types, $, m, e);
            if (x === void 0) return [];
            if (!m.types.some(({ type: A }) => A === S)) if (b) P.warn([
              `Unnecessary typehint \`${S}\` in \`${y}-${$}\`.`,
              `You can safely update it to \`${y}-${$.replace(S + ":", "")}\`.`
            ]);
            else return [];
            if (!We(x)) return [];
            let F = {
              get modifier() {
                return m.modifiers || P.warn(`modifier-used-without-options-for-${y}`, [
                  "Your plugin must set `modifiers: true` in its options to support modifiers."
                ]), U;
              }
            }, k = J(e, "generalizedModifiers");
            return [].concat(k ? c(x, F) : c(x)).filter(Boolean).map((A) => ({
              [bt(y, $)]: A
            }));
          }, d = l(y, m), c = u[y];
          i.add([
            d,
            m
          ]);
          let v = [
            {
              sort: w,
              layer: "components",
              options: m
            },
            h
          ];
          t.candidateRuleMap.has(d) || t.candidateRuleMap.set(d, []), t.candidateRuleMap.get(d).push(v);
        }
      },
      addVariant(u, m, w = {}) {
        m = [].concat(m).map((y) => {
          if (typeof y != "string") return (h = {}) => {
            let { args: d, modifySelectors: c, container: v, separator: $, wrap: b, format: x } = h, S = y(Object.assign({
              modifySelectors: c,
              container: v,
              separator: $
            }, w.type === Ee.MatchVariant && {
              args: d,
              wrap: b,
              format: x
            }));
            if (typeof S == "string" && !Be(S)) throw new Error(`Your custom variant \`${u}\` has an invalid format string. Make sure it's an at-rule or contains a \`&\` placeholder.`);
            return Array.isArray(S) ? S.filter((U) => typeof U == "string").map((U) => we(U)) : S && typeof S == "string" && we(S)(h);
          };
          if (!Be(y)) throw new Error(`Your custom variant \`${u}\` has an invalid format string. Make sure it's an at-rule or contains a \`&\` placeholder.`);
          return we(y);
        }), nn(r, u, w), a.set(u, m), t.variantOptions.set(u, w);
      },
      matchVariant(u, m, w) {
        let y = (w == null ? void 0 : w.id) ?? ++p, h = u === "@", d = J(e, "generalizedModifiers");
        for (let [v, $] of Object.entries((w == null ? void 0 : w.values) ?? {})) v !== "DEFAULT" && g.addVariant(h ? `${u}${v}` : `${u}-${v}`, ({ args: b, container: x }) => m($, d ? {
          modifier: b == null ? void 0 : b.modifier,
          container: x
        } : {
          container: x
        }), {
          ...w,
          value: $,
          id: y,
          type: Ee.MatchVariant,
          variantInfo: Le.Base
        });
        let c = "DEFAULT" in ((w == null ? void 0 : w.values) ?? {});
        g.addVariant(u, ({ args: v, container: $ }) => (v == null ? void 0 : v.value) === ze && !c ? null : m((v == null ? void 0 : v.value) === ze ? w.values.DEFAULT : (v == null ? void 0 : v.value) ?? (typeof v == "string" ? v : ""), d ? {
          modifier: v == null ? void 0 : v.modifier,
          container: $
        } : {
          container: $
        }), {
          ...w,
          id: y,
          type: Ee.MatchVariant,
          variantInfo: Le.Dynamic
        });
      }
    };
    return g;
  }
  function Zt(e) {
    e.walkAtRules((t) => {
      [
        "responsive",
        "variants"
      ].includes(t.name) && (Zt(t), t.before(t.nodes), t.remove());
    });
  }
  function cn(e) {
    let t = [];
    return e.each((r) => {
      r.type === "atrule" && [
        "responsive",
        "variants"
      ].includes(r.name) && (r.name = "layer", r.params = "utilities");
    }), e.walkAtRules("layer", (r) => {
      if (Zt(r), r.params === "base") {
        for (let a of r.nodes) t.push(function({ addBase: n }) {
          n(a, {
            respectPrefix: false
          });
        });
        r.remove();
      } else if (r.params === "components") {
        for (let a of r.nodes) t.push(function({ addComponents: n }) {
          n(a, {
            respectPrefix: false,
            preserveSource: true
          });
        });
        r.remove();
      } else if (r.params === "utilities") {
        for (let a of r.nodes) t.push(function({ addUtilities: n }) {
          n(a, {
            respectPrefix: false,
            preserveSource: true
          });
        });
        r.remove();
      }
    }), t;
  }
  function un(e, t) {
    let r = Object.entries({
      ...E,
      ...Qa
    }).map(([s, l]) => e.tailwindConfig.corePlugins.includes(s) ? l : null).filter(Boolean), a = e.tailwindConfig.plugins.map((s) => (s.__isOptionsFunction && (s = s()), typeof s == "function" ? s : s.handler)), n = cn(t), i = [
      E.childVariant,
      E.pseudoElementVariants,
      E.pseudoClassVariants,
      E.hasVariants,
      E.ariaVariants,
      E.dataVariants
    ], o = [
      E.supportsVariants,
      E.reducedMotionVariants,
      E.prefersContrastVariants,
      E.screenVariants,
      E.orientationVariants,
      E.directionVariants,
      E.darkVariants,
      E.forcedColorsVariants,
      E.printVariant
    ];
    return (e.tailwindConfig.darkMode === "class" || Array.isArray(e.tailwindConfig.darkMode) && e.tailwindConfig.darkMode[0] === "class") && (o = [
      E.supportsVariants,
      E.reducedMotionVariants,
      E.prefersContrastVariants,
      E.darkVariants,
      E.screenVariants,
      E.orientationVariants,
      E.directionVariants,
      E.forcedColorsVariants,
      E.printVariant
    ]), [
      ...r,
      ...i,
      ...a,
      ...o,
      ...n
    ];
  }
  function fn(e, t) {
    let r = [], a = /* @__PURE__ */ new Map();
    t.variantMap = a;
    let n = new tn();
    t.offsets = n;
    let i = /* @__PURE__ */ new Set(), o = dn(t.tailwindConfig, t, {
      variantList: r,
      variantMap: a,
      offsets: n,
      classList: i
    });
    for (let p of e) if (Array.isArray(p)) for (let g of p) g(o);
    else p == null ? void 0 : p(o);
    n.recordVariants(r, (p) => a.get(p).length);
    for (let [p, g] of a.entries()) t.variantMap.set(p, g.map((u, m) => [
      n.forVariant(p, m),
      u
    ]));
    let s = (t.tailwindConfig.safelist ?? []).filter(Boolean);
    if (s.length > 0) {
      let p = [];
      for (let g of s) {
        if (typeof g == "string") {
          t.changedContent.push({
            content: g,
            extension: "html"
          });
          continue;
        }
        if (g instanceof RegExp) {
          P.warn("root-regex", [
            "Regular expressions in `safelist` work differently in Tailwind CSS v3.0.",
            "Update your `safelist` configuration to eliminate this warning.",
            "https://tailwindcss.com/docs/content-configuration#safelisting-classes"
          ]);
          continue;
        }
        p.push(g);
      }
      if (p.length > 0) {
        let g = /* @__PURE__ */ new Map(), u = t.tailwindConfig.prefix.length, m = p.some((w) => w.pattern.source.includes("!"));
        for (let w of i) {
          let y = Array.isArray(w) ? (() => {
            let [h, d] = w, c = Object.keys((d == null ? void 0 : d.values) ?? {}).map((v) => ye(h, v));
            return (d == null ? void 0 : d.supportsNegativeValues) && (c = [
              ...c,
              ...c.map((v) => "-" + v)
            ], c = [
              ...c,
              ...c.map((v) => v.slice(0, u) + "-" + v.slice(u))
            ]), d.types.some(({ type: v }) => v === "color") && (c = [
              ...c,
              ...c.flatMap((v) => Object.keys(t.tailwindConfig.theme.opacity).map(($) => `${v}/${$}`))
            ]), m && (d == null ? void 0 : d.respectImportant) && (c = [
              ...c,
              ...c.map((v) => "!" + v)
            ]), c;
          })() : [
            w
          ];
          for (let h of y) for (let { pattern: d, variants: c = [] } of p) if (d.lastIndex = 0, g.has(d) || g.set(d, 0), !!d.test(h)) {
            g.set(d, g.get(d) + 1), t.changedContent.push({
              content: h,
              extension: "html"
            });
            for (let v of c) t.changedContent.push({
              content: v + t.tailwindConfig.separator + h,
              extension: "html"
            });
          }
        }
        for (let [w, y] of g.entries()) y === 0 && P.warn([
          `The safelist pattern \`${w}\` doesn't match any Tailwind CSS classes.`,
          "Fix this pattern or remove it from your `safelist` configuration.",
          "https://tailwindcss.com/docs/content-configuration#safelisting-classes"
        ]);
      }
    }
    let l = [].concat(t.tailwindConfig.darkMode ?? "media")[1] ?? "dark", f = [
      De(t, l),
      De(t, "group"),
      De(t, "peer")
    ];
    t.getClassOrder = function(p) {
      let g = [
        ...p
      ].sort((y, h) => y === h ? 0 : y < h ? -1 : 1), u = new Map(g.map((y) => [
        y,
        null
      ])), m = ir(new Set(g), t, true);
      m = t.offsets.sort(m);
      let w = BigInt(f.length);
      for (let [, y] of m) {
        let h = y.raws.tailwind.candidate;
        u.set(h, u.get(h) ?? w++);
      }
      return p.map((y) => {
        let h = u.get(y) ?? null, d = f.indexOf(y);
        return h === null && d !== -1 && (h = BigInt(d)), [
          y,
          h
        ];
      });
    }, t.getClassList = function(p = {}) {
      var _a2;
      let g = [];
      for (let u of i) if (Array.isArray(u)) {
        let [m, w] = u, y = [], h = Object.keys((w == null ? void 0 : w.modifiers) ?? {});
        ((_a2 = w == null ? void 0 : w.types) == null ? void 0 : _a2.some(({ type: v }) => v === "color")) && h.push(...Object.keys(t.tailwindConfig.theme.opacity ?? {}));
        let d = {
          modifiers: h
        }, c = p.includeMetadata && h.length > 0;
        for (let [v, $] of Object.entries((w == null ? void 0 : w.values) ?? {})) {
          if ($ == null) continue;
          let b = ye(m, v);
          if (g.push(c ? [
            b,
            d
          ] : b), (w == null ? void 0 : w.supportsNegativeValues) && Ve($)) {
            let x = ye(m, `-${v}`);
            y.push(c ? [
              x,
              d
            ] : x);
          }
        }
        g.push(...y);
      } else g.push(u);
      return g;
    }, t.getVariants = function() {
      let p = Math.random().toString(36).substring(7).toUpperCase(), g = [];
      for (let [u, m] of t.variantOptions.entries()) m.variantInfo !== Le.Base && g.push({
        name: u,
        isArbitrary: m.type === Symbol.for("MATCH_VARIANT"),
        values: Object.keys(m.values ?? {}),
        hasDash: u !== "@",
        selectors({ modifier: w, value: y } = {}) {
          var _a2;
          let h = `TAILWINDPLACEHOLDER${p}`, d = I.rule({
            selector: `.${h}`
          }), c = I.root({
            nodes: [
              d.clone()
            ]
          }), v = c.toString(), $ = (t.variantMap.get(u) ?? []).flatMap(([R, M]) => M), b = [];
          for (let R of $) {
            let M = [], V = {
              args: {
                modifier: w,
                value: ((_a2 = m.values) == null ? void 0 : _a2[y]) ?? y
              },
              separator: t.tailwindConfig.separator,
              modifySelectors(_) {
                return c.each((X) => {
                  X.type === "rule" && (X.selectors = X.selectors.map((ot) => _({
                    get className() {
                      return rr(ot);
                    },
                    selector: ot
                  })));
                }), c;
              },
              format(_) {
                M.push(_);
              },
              wrap(_) {
                M.push(`@${_.name} ${_.params} { & }`);
              },
              container: c
            }, G = R(V);
            if (M.length > 0 && b.push(M), Array.isArray(G)) for (let _ of G) M = [], _(V), b.push(M);
          }
          let x = [], S = c.toString();
          v !== S && (c.walkRules((R) => {
            let M = R.selector, V = D((G) => {
              G.walkClasses((_) => {
                _.value = `${u}${t.tailwindConfig.separator}${_.value}`;
              });
            }).processSync(M);
            x.push(M.replace(V, "&").replace(h, "&"));
          }), c.walkAtRules((R) => {
            x.push(`@${R.name} (${R.params}) { & }`);
          }));
          let U = !(y in (m.values ?? {})), F = m[ie] ?? {}, k = !(U || F.respectPrefix === false);
          b = b.map((R) => R.map((M) => ({
            format: M,
            respectPrefix: k
          }))), x = x.map((R) => ({
            format: R,
            respectPrefix: k
          }));
          let A = {
            candidate: h,
            context: t
          }, se = b.map((R) => Ht(`.${h}`, $e(R, A), A).replace(`.${h}`, "&").replace("{ & }", "").trim());
          return x.length > 0 && se.push($e(x, A).toString().replace(`.${h}`, "&")), se;
        }
      });
      return g;
    };
  }
  function er(e, t) {
    e.classCache.has(t) && (e.notClassCache.add(t), e.classCache.delete(t), e.applyClassCache.delete(t), e.candidateRuleMap.delete(t), e.candidateRuleCache.delete(t), e.stylesheetCache = null);
  }
  function pn(e, t) {
    let r = t.raws.tailwind.candidate;
    if (r) {
      for (let a of e.ruleCache) a[1].raws.tailwind.candidate === r && e.ruleCache.delete(a);
      er(e, r);
    }
  }
  function hn(e, t = [], r = I.root()) {
    let a = {
      disposables: [],
      ruleCache: /* @__PURE__ */ new Set(),
      candidateRuleCache: /* @__PURE__ */ new Map(),
      classCache: /* @__PURE__ */ new Map(),
      applyClassCache: /* @__PURE__ */ new Map(),
      notClassCache: new Set(e.blocklist ?? []),
      postCssNodeCache: /* @__PURE__ */ new Map(),
      candidateRuleMap: /* @__PURE__ */ new Map(),
      tailwindConfig: e,
      changedContent: t,
      variantMap: /* @__PURE__ */ new Map(),
      stylesheetCache: null,
      variantOptions: /* @__PURE__ */ new Map(),
      markInvalidUtilityCandidate: (i) => er(a, i),
      markInvalidUtilityNode: (i) => pn(a, i)
    }, n = un(a, r);
    return fn(n, a), a;
  }
  function tr(e, t) {
    let r = D().astSync(e);
    return r.each((a) => {
      a.nodes.some((n) => n.type === "combinator") && (a.nodes = [
        D.pseudo({
          value: ":is",
          nodes: [
            a.clone()
          ]
        })
      ]), rt(a);
    }), `${t} ${r.toString()}`;
  }
  var mn = D((e) => e.first.filter(({ type: t }) => t === "class").pop().value);
  function rr(e) {
    return mn.transformSync(e);
  }
  function* gn(e) {
    let t = 1 / 0;
    for (; t >= 0; ) {
      let r, a = false;
      if (t === 1 / 0 && e.endsWith("]")) {
        let o = e.indexOf("[");
        e[o - 1] === "-" ? r = o - 1 : e[o - 1] === "/" ? (r = o - 1, a = true) : r = -1;
      } else t === 1 / 0 && e.includes("/") ? (r = e.lastIndexOf("/"), a = true) : r = e.lastIndexOf("-", t);
      if (r < 0) break;
      let n = e.slice(0, r), i = e.slice(a ? r : r + 1);
      t = r - 1, !(n === "" || i === "/") && (yield [
        n,
        i
      ]);
    }
  }
  function bn(e, t) {
    if (e.length === 0 || t.tailwindConfig.prefix === "") return e;
    for (let r of e) {
      let [a] = r;
      if (a.options.respectPrefix) {
        let n = I.root({
          nodes: [
            r[1].clone()
          ]
        }), i = r[1].raws.tailwind.classCandidate;
        n.walkRules((o) => {
          let s = i.startsWith("-");
          o.selector = Ke(t.tailwindConfig.prefix, o.selector, s);
        }), r[1] = n.nodes[0];
      }
    }
    return e;
  }
  function yn(e, t) {
    if (e.length === 0) return e;
    let r = [];
    function a(n) {
      return n.parent && n.parent.type === "atrule" && n.parent.name === "keyframes";
    }
    for (let [n, i] of e) {
      let o = I.root({
        nodes: [
          i.clone()
        ]
      });
      o.walkRules((s) => {
        if (a(s)) return;
        let l = D().astSync(s.selector);
        l.each((f) => Yt(f, t)), Da(l, (f) => f === t ? `!${f}` : f), s.selector = l.toString(), s.walkDecls((f) => f.important = true);
      }), r.push([
        {
          ...n,
          important: true
        },
        o.nodes[0]
      ]);
    }
    return r;
  }
  function wn(e, t, r) {
    var _a2;
    if (t.length === 0) return t;
    let a = {
      modifier: null,
      value: ze
    };
    {
      let [n, ...i] = B(e, "/");
      if (i.length > 1 && (n = n + "/" + i.slice(0, -1).join("/"), i = i.slice(-1)), i.length && !r.variantMap.has(e) && (e = n, a.modifier = i[0], !J(r.tailwindConfig, "generalizedModifiers"))) return [];
    }
    if (e.endsWith("]") && !e.startsWith("[")) {
      let n = /(.)(-?)\[(.*)\]/g.exec(e);
      if (n) {
        let [, i, o, s] = n;
        if (i === "@" && o === "-") return [];
        if (i !== "@" && o === "") return [];
        e = e.replace(`${o}[${s}]`, ""), a.value = s;
      }
    }
    if (Ge(e) && !r.variantMap.has(e)) {
      let n = r.offsets.recordVariant(e), i = O(e.slice(1, -1)), o = B(i, ",");
      if (o.length > 1) return [];
      if (!o.every(Be)) return [];
      let s = o.map((l, f) => [
        r.offsets.applyParallelOffset(n, f),
        we(l.trim())
      ]);
      r.variantMap.set(e, s);
    }
    if (r.variantMap.has(e)) {
      let n = Ge(e), i = ((_a2 = r.variantOptions.get(e)) == null ? void 0 : _a2[ie]) ?? {}, o = r.variantMap.get(e).slice(), s = [], l = !(n || i.respectPrefix === false);
      for (let [f, p] of t) {
        if (f.layer === "user") continue;
        let g = I.root({
          nodes: [
            p.clone()
          ]
        });
        for (let [u, m, w] of o) {
          let y = function() {
            d.raws.neededBackup || (d.raws.neededBackup = true, d.walkRules((b) => b.raws.originalSelector = b.selector));
          }, h = function(b) {
            return y(), d.each((x) => {
              x.type === "rule" && (x.selectors = x.selectors.map((S) => b({
                get className() {
                  return rr(S);
                },
                selector: S
              })));
            }), d;
          }, d = (w ?? g).clone(), c = [], v = m({
            get container() {
              return y(), d;
            },
            separator: r.tailwindConfig.separator,
            modifySelectors: h,
            wrap(b) {
              let x = d.nodes;
              d.removeAll(), b.append(x), d.append(b);
            },
            format(b) {
              c.push({
                format: b,
                respectPrefix: l
              });
            },
            args: a
          });
          if (Array.isArray(v)) {
            for (let [b, x] of v.entries()) o.push([
              r.offsets.applyParallelOffset(u, b),
              x,
              d.clone()
            ]);
            continue;
          }
          if (typeof v == "string" && c.push({
            format: v,
            respectPrefix: l
          }), v === null) continue;
          d.raws.neededBackup && (delete d.raws.neededBackup, d.walkRules((b) => {
            let x = b.raws.originalSelector;
            if (!x || (delete b.raws.originalSelector, x === b.selector)) return;
            let S = b.selector, U = D((F) => {
              F.walkClasses((k) => {
                k.value = `${e}${r.tailwindConfig.separator}${k.value}`;
              });
            }).processSync(x);
            c.push({
              format: S.replace(U, "&"),
              respectPrefix: l
            }), b.selector = x;
          })), d.nodes[0].raws.tailwind = {
            ...d.nodes[0].raws.tailwind,
            parentLayer: f.layer
          };
          let $ = [
            {
              ...f,
              sort: r.offsets.applyVariantOffset(f.sort, u, Object.assign(a, r.variantOptions.get(e))),
              collectedFormats: (f.collectedFormats ?? []).concat(c)
            },
            d.nodes[0]
          ];
          s.push($);
        }
      }
      return s;
    }
    return [];
  }
  function qe(e, t, r = {}) {
    return !fe(e) && !Array.isArray(e) ? [
      [
        e
      ],
      r
    ] : Array.isArray(e) ? qe(e[0], t, e[1]) : (t.has(e) || t.set(e, He(e)), [
      t.get(e),
      r
    ]);
  }
  var vn = /^[a-z_-]/;
  function xn(e) {
    return vn.test(e);
  }
  function kn(e) {
    if (!e.includes("://")) return false;
    try {
      let t = new URL(e);
      return t.scheme !== "" && t.host !== "";
    } catch {
      return false;
    }
  }
  function $t(e) {
    let t = true;
    return e.walkDecls((r) => {
      if (!ar(r.prop, r.value)) return t = false, false;
    }), t;
  }
  function ar(e, t) {
    if (kn(`${e}:${t}`)) return false;
    try {
      return I.parse(`a{${e}:${t}}`).toResult(), true;
    } catch {
      return false;
    }
  }
  function Cn(e, t) {
    let [, r, a] = e.match(/^\[([a-zA-Z0-9-_]+):(\S+)\]$/) ?? [];
    if (a === void 0 || !xn(r) || !We(a)) return null;
    let n = O(a, {
      property: r
    });
    return ar(r, n) ? [
      [
        {
          sort: t.offsets.arbitraryProperty(e),
          layer: "utilities",
          options: {
            respectImportant: true
          }
        },
        () => ({
          [Kt(e)]: {
            [r]: n
          }
        })
      ]
    ] : null;
  }
  function* $n(e, t) {
    t.candidateRuleMap.has(e) && (yield [
      t.candidateRuleMap.get(e),
      "DEFAULT"
    ]), yield* function* (s) {
      s !== null && (yield [
        s,
        "DEFAULT"
      ]);
    }(Cn(e, t));
    let r = e, a = false, n = t.tailwindConfig.prefix, i = n.length, o = r.startsWith(n) || r.startsWith(`-${n}`);
    r[i] === "-" && o && (a = true, r = n + r.slice(i + 1)), a && t.candidateRuleMap.has(r) && (yield [
      t.candidateRuleMap.get(r),
      "-DEFAULT"
    ]);
    for (let [s, l] of gn(r)) t.candidateRuleMap.has(s) && (yield [
      t.candidateRuleMap.get(s),
      a ? `-${l}` : l
    ]);
  }
  function An(e, t) {
    return e === oe ? [
      oe
    ] : B(e, t);
  }
  function* Sn(e, t) {
    var _a2;
    for (let r of e) r[1].raws.tailwind = {
      ...r[1].raws.tailwind,
      classCandidate: t,
      preserveSource: ((_a2 = r[0].options) == null ? void 0 : _a2.preserveSource) ?? false
    }, yield r;
  }
  function* nr(e, t) {
    var _a2;
    let r = t.tailwindConfig.separator, [a, ...n] = An(e, r).reverse(), i = false;
    a.startsWith("!") && (i = true, a = a.slice(1));
    for (let o of $n(a, t)) {
      let s = [], l = /* @__PURE__ */ new Map(), [f, p] = o, g = f.length === 1;
      for (let [u, m] of f) {
        let w = [];
        if (typeof m == "function") for (let y of [].concat(m(p, {
          isOnlyPlugin: g
        }))) {
          let [h, d] = qe(y, t.postCssNodeCache);
          for (let c of h) w.push([
            {
              ...u,
              options: {
                ...u.options,
                ...d
              }
            },
            c
          ]);
        }
        else if (p === "DEFAULT" || p === "-DEFAULT") {
          let y = m, [h, d] = qe(y, t.postCssNodeCache);
          for (let c of h) w.push([
            {
              ...u,
              options: {
                ...u.options,
                ...d
              }
            },
            c
          ]);
        }
        if (w.length > 0) {
          let y = Array.from(Bt(((_a2 = u.options) == null ? void 0 : _a2.types) ?? [], p, u.options ?? {}, t.tailwindConfig)).map(([h, d]) => d);
          y.length > 0 && l.set(w, y), s.push(w);
        }
      }
      if (Ge(p)) {
        if (s.length > 1) {
          let u = function(h) {
            return h.length === 1 ? h[0] : h.find((d) => {
              let c = l.get(d);
              return d.some(([{ options: v }, $]) => $t($) ? v.types.some(({ type: b, preferOnConflict: x }) => c.includes(b) && x) : false);
            });
          }, [m, w] = s.reduce((h, d) => (d.some(([{ options: c }]) => c.types.some(({ type: v }) => v === "any")) ? h[0].push(d) : h[1].push(d), h), [
            [],
            []
          ]), y = u(w) ?? u(m);
          if (y) s = [
            y
          ];
          else {
            let h = s.map((c) => /* @__PURE__ */ new Set([
              ...l.get(c) ?? []
            ]));
            for (let c of h) for (let v of c) {
              let $ = false;
              for (let b of h) c !== b && b.has(v) && (b.delete(v), $ = true);
              $ && c.delete(v);
            }
            let d = [];
            for (let [c, v] of h.entries()) for (let $ of v) {
              let b = s[c].map(([, x]) => x).flat().map((x) => x.toString().split(`
`).slice(1, -1).map((S) => S.trim()).map((S) => `      ${S}`).join(`
`)).join(`

`);
              d.push(`  Use \`${e.replace("[", `[${$}:`)}\` for \`${b.trim()}\``);
              break;
            }
            P.warn([
              `The class \`${e}\` is ambiguous and matches multiple utilities.`,
              ...d,
              `If this is content and not a class, replace it with \`${e.replace("[", "&lsqb;").replace("]", "&rsqb;")}\` to silence this warning.`
            ]);
            continue;
          }
        }
        s = s.map((u) => u.filter((m) => $t(m[1])));
      }
      s = s.flat(), s = Array.from(Sn(s, a)), s = bn(s, t), i && (s = yn(s, a));
      for (let u of n) s = wn(u, s, t);
      for (let u of s) u[1].raws.tailwind = {
        ...u[1].raws.tailwind,
        candidate: e
      }, u = Un(u, {
        context: t,
        candidate: e
      }), u !== null && (yield u);
    }
  }
  function Un(e, { context: t, candidate: r }) {
    if (!e[0].collectedFormats) return e;
    let a = true, n;
    try {
      n = $e(e[0].collectedFormats, {
        context: t,
        candidate: r
      });
    } catch {
      return null;
    }
    let i = I.root({
      nodes: [
        e[1].clone()
      ]
    });
    return i.walkRules((o) => {
      if (!ve(o)) try {
        let s = Ht(o.selector, n, {
          candidate: r,
          context: t
        });
        if (s === null) {
          o.remove();
          return;
        }
        o.selector = s;
      } catch {
        return a = false, false;
      }
    }), !a || i.nodes.length === 0 ? null : (e[1] = i.nodes[0], e);
  }
  function ve(e) {
    return e.parent && e.parent.type === "atrule" && e.parent.name === "keyframes";
  }
  function On(e) {
    if (e === true) return (t) => {
      ve(t) || t.walkDecls((r) => {
        r.parent.type === "rule" && !ve(r.parent) && (r.important = true);
      });
    };
    if (typeof e == "string") return (t) => {
      ve(t) || (t.selectors = t.selectors.map((r) => tr(r, e)));
    };
  }
  function ir(e, t, r = false) {
    let a = [], n = On(t.tailwindConfig.important);
    for (let i of e) {
      if (t.notClassCache.has(i)) continue;
      if (t.candidateRuleCache.has(i)) {
        a = a.concat(Array.from(t.candidateRuleCache.get(i)));
        continue;
      }
      let o = Array.from(nr(i, t));
      if (o.length === 0) {
        t.notClassCache.add(i);
        continue;
      }
      t.classCache.set(i, o);
      let s = t.candidateRuleCache.get(i) ?? /* @__PURE__ */ new Set();
      t.candidateRuleCache.set(i, s);
      for (let l of o) {
        let [{ sort: f, options: p }, g] = l;
        if (p.respectImportant && n) {
          let m = I.root({
            nodes: [
              g.clone()
            ]
          });
          m.walkRules(n), g = m.nodes[0];
        }
        let u = [
          f,
          r ? g.clone() : g
        ];
        s.add(u), t.ruleCache.add(u), a.push(u);
      }
    }
    return a;
  }
  function Ge(e) {
    return e.startsWith("[") && e.endsWith("]");
  }
  function le(e, t = void 0, r = void 0) {
    return e.map((a) => {
      let n = a.clone();
      return r !== void 0 && (n.raws.tailwind = {
        ...n.raws.tailwind,
        ...r
      }), t !== void 0 && or(n, (i) => {
        var _a2;
        if (((_a2 = i.raws.tailwind) == null ? void 0 : _a2.preserveSource) === true && i.source) return false;
        i.source = t;
      }), n;
    });
  }
  function or(e, t) {
    var _a2;
    t(e) !== false && ((_a2 = e.each) == null ? void 0 : _a2.call(e, (r) => or(r, t)));
  }
  var sr = /[\\^$.*+?()[\]{}|]/g, jn = RegExp(sr.source);
  function it(e) {
    return e = Array.isArray(e) ? e : [
      e
    ], e = e.map((t) => t instanceof RegExp ? t.source : t), e.join("");
  }
  function L(e) {
    return new RegExp(it(e), "g");
  }
  function re(e) {
    return `(?:${e.map(it).join("|")})`;
  }
  function At(e) {
    return `(?:${it(e)})?`;
  }
  function En(e) {
    return e && jn.test(e) ? e.replace(sr, "\\$&") : e || "";
  }
  function Dn(e) {
    let t = Array.from(Rn(e));
    return (r) => {
      let a = [];
      for (let n of t) for (let i of r.match(n) ?? []) a.push(zn(i));
      for (let n of a.slice()) {
        let i = B(n, ".");
        for (let o = 0; o < i.length; o++) {
          let s = i[o];
          if (o >= i.length - 1) {
            a.push(s);
            continue;
          }
          let l = Number(i[o + 1]);
          isNaN(l) ? a.push(s) : o++;
        }
      }
      return a;
    };
  }
  function* Rn(e) {
    let t = e.tailwindConfig.separator, r = e.tailwindConfig.prefix !== "" ? At(L([
      /-?/,
      En(e.tailwindConfig.prefix)
    ])) : "", a = re([
      /\[[^\s:'"`]+:[^\s\[\]]+\]/,
      /\[[^\s:'"`\]]+:[^\s]+?\[[^\s]+\][^\s]+?\]/,
      L([
        re([
          /-?(?:\w+)/,
          /@(?:\w+)/
        ]),
        At(re([
          L([
            re([
              /-(?:\w+-)*\['[^\s]+'\]/,
              /-(?:\w+-)*\["[^\s]+"\]/,
              /-(?:\w+-)*\[`[^\s]+`\]/,
              /-(?:\w+-)*\[(?:[^\s\[\]]+\[[^\s\[\]]+\])*[^\s:\[\]]+\]/
            ]),
            /(?![{([]])/,
            /(?:\/[^\s'"`\\><$]*)?/
          ]),
          L([
            re([
              /-(?:\w+-)*\['[^\s]+'\]/,
              /-(?:\w+-)*\["[^\s]+"\]/,
              /-(?:\w+-)*\[`[^\s]+`\]/,
              /-(?:\w+-)*\[(?:[^\s\[\]]+\[[^\s\[\]]+\])*[^\s\[\]]+\]/
            ]),
            /(?![{([]])/,
            /(?:\/[^\s'"`\\$]*)?/
          ]),
          /[-\/][^\s'"`\\$={><]*/
        ]))
      ])
    ]), n = [
      re([
        L([
          /@\[[^\s"'`]+\](\/[^\s"'`]+)?/,
          t
        ]),
        L([
          /([^\s"'`\[\\]+-)?\[[^\s"'`]+\]\/[\w_-]+/,
          t
        ]),
        L([
          /([^\s"'`\[\\]+-)?\[[^\s"'`]+\]/,
          t
        ]),
        L([
          /[^\s"'`\[\\]+/,
          t
        ])
      ]),
      re([
        L([
          /([^\s"'`\[\\]+-)?\[[^\s`]+\]\/[\w_-]+/,
          t
        ]),
        L([
          /([^\s"'`\[\\]+-)?\[[^\s`]+\]/,
          t
        ]),
        L([
          /[^\s`\[\\]+/,
          t
        ])
      ])
    ];
    for (let i of n) yield L([
      "((?=((",
      i,
      ")+))\\2)?",
      /!?/,
      r,
      a
    ]);
    yield /[^<>"'`\s.(){}[\]#=%$][^<>"'`\s(){}[\]#=%$]*[^<>"'`\s.(){}[\]#=%:$]/g;
  }
  var In = /([\[\]'"`])([^\[\]'"`])?/g, Mn = /[^"'`\s<>\]]+/;
  function zn(e) {
    if (!e.includes("-[")) return e;
    let t = 0, r = [], a = e.matchAll(In);
    a = Array.from(a).flatMap((n) => {
      let [, ...i] = n;
      return i.map((o, s) => Object.assign([], n, {
        index: n.index + s,
        0: o
      }));
    });
    for (let n of a) {
      let i = n[0], o = r[r.length - 1];
      if (i === o ? r.pop() : (i === "'" || i === '"' || i === "`") && r.push(i), !o) {
        if (i === "[") {
          t++;
          continue;
        } else if (i === "]") {
          t--;
          continue;
        }
        if (t < 0) return e.substring(0, n.index - 1);
        if (t === 0 && !Mn.test(i)) return e.substring(0, n.index);
      }
    }
    return e;
  }
  var K = Qr, St = {
    DEFAULT: Dn
  }, Ut = {
    DEFAULT: (e) => e,
    svelte: (e) => e.replace(/(?:^|\s)class:/g, " ")
  };
  function Vn(e, t) {
    let r = e.tailwindConfig.content.extract;
    return r[t] || r.DEFAULT || St[t] || St.DEFAULT(e);
  }
  function _n(e, t) {
    let r = e.content.transform;
    return r[t] || r.DEFAULT || Ut[t] || Ut.DEFAULT;
  }
  var de = /* @__PURE__ */ new WeakMap();
  function Tn(e, t, r, a) {
    de.has(t) || de.set(t, new Tr({
      maxSize: 25e3
    }));
    for (let n of e.split(`
`)) if (n = n.trim(), !a.has(n)) if (a.add(n), de.get(t).has(n)) for (let i of de.get(t).get(n)) r.add(i);
    else {
      let i = t(n).filter((s) => s !== "!*"), o = new Set(i);
      for (let s of o) r.add(s);
      de.get(t).set(n, o);
    }
  }
  function Pn(e, t) {
    let r = t.offsets.sort(e), a = {
      base: /* @__PURE__ */ new Set(),
      defaults: /* @__PURE__ */ new Set(),
      components: /* @__PURE__ */ new Set(),
      utilities: /* @__PURE__ */ new Set(),
      variants: /* @__PURE__ */ new Set()
    };
    for (let [n, i] of r) a[n.layer].add(i);
    return a;
  }
  function Fn(e) {
    return async (t) => {
      let r = {
        base: null,
        components: null,
        utilities: null,
        variants: null
      };
      if (t.walkAtRules((h) => {
        h.name === "tailwind" && Object.keys(r).includes(h.params) && (r[h.params] = h);
      }), Object.values(r).every((h) => h === null)) return t;
      let a = /* @__PURE__ */ new Set([
        ...e.candidates ?? [],
        oe
      ]), n = /* @__PURE__ */ new Set();
      K.DEBUG && console.time("Reading changed files");
      let i = [];
      for (let h of e.changedContent) {
        let d = _n(e.tailwindConfig, h.extension), c = Vn(e, h.extension);
        i.push([
          h,
          {
            transformer: d,
            extractor: c
          }
        ]);
      }
      let o = 500;
      for (let h = 0; h < i.length; h += o) {
        let d = i.slice(h, h + o);
        await Promise.all(d.map(async ([{ file: c, content: v }, { transformer: $, extractor: b }]) => {
          v = c ? await wr.promises.readFile(c, "utf8") : v, Tn($(v), b, a, n);
        }));
      }
      K.DEBUG && console.timeEnd("Reading changed files");
      let s = e.classCache.size;
      K.DEBUG && console.time("Generate rules"), K.DEBUG && console.time("Sorting candidates");
      let l = new Set([
        ...a
      ].sort((h, d) => h === d ? 0 : h < d ? -1 : 1));
      K.DEBUG && console.timeEnd("Sorting candidates"), ir(l, e), K.DEBUG && console.timeEnd("Generate rules"), K.DEBUG && console.time("Build stylesheet"), (e.stylesheetCache === null || e.classCache.size !== s) && (e.stylesheetCache = Pn([
        ...e.ruleCache
      ], e)), K.DEBUG && console.timeEnd("Build stylesheet");
      let { defaults: f, base: p, components: g, utilities: u, variants: m } = e.stylesheetCache;
      r.base && (r.base.before(le([
        ...f,
        ...p
      ], r.base.source, {
        layer: "base"
      })), r.base.remove()), r.components && (r.components.before(le([
        ...g
      ], r.components.source, {
        layer: "components"
      })), r.components.remove()), r.utilities && (r.utilities.before(le([
        ...u
      ], r.utilities.source, {
        layer: "utilities"
      })), r.utilities.remove());
      let w = Array.from(m).filter((h) => {
        var _a2;
        let d = (_a2 = h.raws.tailwind) == null ? void 0 : _a2.parentLayer;
        return d === "components" ? r.components !== null : d === "utilities" ? r.utilities !== null : true;
      });
      r.variants ? (r.variants.before(le(w, r.variants.source, {
        layer: "variants"
      })), r.variants.remove()) : w.length > 0 && t.append(le(w, t.source, {
        layer: "variants"
      })), t.source.end = t.source.end ?? t.source.start;
      let y = w.some((h) => {
        var _a2;
        return ((_a2 = h.raws.tailwind) == null ? void 0 : _a2.parentLayer) === "utilities";
      });
      r.utilities && u.size === 0 && !y && P.warn("content-problems", [
        "No utility classes were detected in your source files. If this is unexpected, double-check the `content` option in your Tailwind CSS configuration.",
        "https://tailwindcss.com/docs/content-configuration"
      ]), K.DEBUG && (console.log("Potential classes: ", a.size), console.log("Active contexts: ", Zr.size)), e.changedContent = [], t.walkAtRules("layer", (h) => {
        Object.keys(r).includes(h.params) && h.remove();
      });
    };
  }
  function xe(e) {
    let t = /* @__PURE__ */ new Map();
    I.root({
      nodes: [
        e.clone()
      ]
    }).walkRules((n) => {
      D((i) => {
        i.walkClasses((o) => {
          let s = o.parent.toString(), l = t.get(s);
          l || t.set(s, l = /* @__PURE__ */ new Set()), l.add(o.value);
        });
      }).processSync(n.selector);
    });
    let r = Array.from(t.values(), (n) => Array.from(n)), a = r.flat();
    return Object.assign(a, {
      groups: r
    });
  }
  var Nn = D();
  function Re(e) {
    return Nn.astSync(e);
  }
  function Ot(e, t) {
    let r = /* @__PURE__ */ new Set();
    for (let a of e) r.add(a.split(t).pop());
    return Array.from(r);
  }
  function jt(e, t) {
    let r = e.tailwindConfig.prefix;
    return typeof r == "function" ? r(t) : r + t;
  }
  function* lr(e) {
    for (yield e; e.parent; ) yield e.parent, e = e.parent;
  }
  function Wn(e, t = {}) {
    let r = e.nodes;
    e.nodes = [];
    let a = e.clone(t);
    return e.nodes = r, a;
  }
  function Ln(e) {
    for (let t of lr(e)) if (e !== t) {
      if (t.type === "root") break;
      e = Wn(t, {
        nodes: [
          e
        ]
      });
    }
    return e;
  }
  function Bn(e, t) {
    let r = /* @__PURE__ */ new Map();
    return e.walkRules((a) => {
      var _a2;
      for (let o of lr(a)) if (((_a2 = o.raws.tailwind) == null ? void 0 : _a2.layer) !== void 0) return;
      let n = Ln(a), i = t.offsets.create("user");
      for (let o of xe(a)) {
        let s = r.get(o) || [];
        r.set(o, s), s.push([
          {
            layer: "user",
            sort: i,
            important: false
          },
          n
        ]);
      }
    }), r;
  }
  function qn(e, t) {
    for (let r of e) {
      if (t.notClassCache.has(r) || t.applyClassCache.has(r)) continue;
      if (t.classCache.has(r)) {
        t.applyClassCache.set(r, t.classCache.get(r).map(([n, i]) => [
          n,
          i.clone()
        ]));
        continue;
      }
      let a = Array.from(nr(r, t));
      if (a.length === 0) {
        t.notClassCache.add(r);
        continue;
      }
      t.applyClassCache.set(r, a);
    }
    return t.applyClassCache;
  }
  function Gn(e) {
    let t = null;
    return {
      get: (r) => (t = t || e(), t.get(r)),
      has: (r) => (t = t || e(), t.has(r))
    };
  }
  function Yn(e) {
    return {
      get: (t) => e.flatMap((r) => r.get(t) || []),
      has: (t) => e.some((r) => r.has(t))
    };
  }
  function Et(e) {
    let t = e.split(/[\s\t\n]+/g);
    return t[t.length - 1] === "!important" ? [
      t.slice(0, -1),
      true
    ] : [
      t,
      false
    ];
  }
  function dr(e, t, r) {
    let a = /* @__PURE__ */ new Set(), n = [];
    if (e.walkAtRules("apply", (l) => {
      let [f] = Et(l.params);
      for (let p of f) a.add(p);
      n.push(l);
    }), n.length === 0) return;
    let i = Yn([
      r,
      qn(a, t)
    ]);
    function o(l, f, p) {
      let g = Re(l), u = Re(f), m = Re(`.${te(p)}`).nodes[0].nodes[0];
      return g.each((w) => {
        let y = /* @__PURE__ */ new Set();
        u.each((h) => {
          let d = false;
          h = h.clone(), h.walkClasses((c) => {
            c.value === m.value && (d || (c.replaceWith(...w.nodes.map((v) => v.clone())), y.add(h), d = true));
          });
        });
        for (let h of y) {
          let d = [
            []
          ];
          for (let c of h.nodes) c.type === "combinator" ? (d.push(c), d.push([])) : d[d.length - 1].push(c);
          h.nodes = [];
          for (let c of d) Array.isArray(c) && c.sort((v, $) => v.type === "tag" && $.type === "class" ? -1 : v.type === "class" && $.type === "tag" ? 1 : v.type === "class" && $.type === "pseudo" && $.value.startsWith("::") ? -1 : v.type === "pseudo" && v.value.startsWith("::") && $.type === "class" ? 1 : 0), h.nodes = h.nodes.concat(c);
        }
        w.replaceWith(...y);
      }), g.toString();
    }
    let s = /* @__PURE__ */ new Map();
    for (let l of n) {
      let [f] = s.get(l.parent) || [
        [],
        l.source
      ];
      s.set(l.parent, [
        f,
        l.source
      ]);
      let [p, g] = Et(l.params);
      if (l.parent.type === "atrule") {
        if (l.parent.name === "screen") {
          let u = l.parent.params;
          throw l.error(`@apply is not supported within nested at-rules like @screen. We suggest you write this as @apply ${p.map((m) => `${u}:${m}`).join(" ")} instead.`);
        }
        throw l.error(`@apply is not supported within nested at-rules like @${l.parent.name}. You can fix this by un-nesting @${l.parent.name}.`);
      }
      for (let u of p) {
        if ([
          jt(t, "group"),
          jt(t, "peer")
        ].includes(u)) throw l.error(`@apply should not be used with the '${u}' utility`);
        if (!i.has(u)) throw l.error(`The \`${u}\` class does not exist. If \`${u}\` is a custom class, make sure it is defined within a \`@layer\` directive.`);
        let m = i.get(u);
        for (let [, w] of m) w.type !== "atrule" && w.walkRules(() => {
          throw l.error([
            `The \`${u}\` class cannot be used with \`@apply\` because \`@apply\` does not currently support nested CSS.`,
            "Rewrite the selector without nesting or configure the `tailwindcss/nesting` plugin:",
            "https://tailwindcss.com/docs/using-with-preprocessors#nesting"
          ].join(`
`));
        });
        f.push([
          u,
          g,
          m
        ]);
      }
    }
    for (let [l, [f, p]] of s) {
      let g = [];
      for (let [m, w, y] of f) {
        let h = [
          m,
          ...Ot([
            m
          ], t.tailwindConfig.separator)
        ];
        for (let [d, c] of y) {
          let v = xe(l), $ = xe(c);
          if ($ = $.groups.filter((x) => x.some((S) => h.includes(S))).flat(), $ = $.concat(Ot($, t.tailwindConfig.separator)), v.some((x) => $.includes(x))) throw c.error(`You cannot \`@apply\` the \`${m}\` utility here because it creates a circular dependency.`);
          let b = I.root({
            nodes: [
              c.clone()
            ]
          });
          b.walk((x) => {
            x.source = p;
          }), (c.type !== "atrule" || c.type === "atrule" && c.name !== "keyframes") && b.walkRules((x) => {
            if (!xe(x).some((k) => k === m)) {
              x.remove();
              return;
            }
            let S = typeof t.tailwindConfig.important == "string" ? t.tailwindConfig.important : null, U = l.raws.tailwind !== void 0 && S && l.selector.indexOf(S) === 0 ? l.selector.slice(S.length) : l.selector;
            U === "" && (U = l.selector), x.selector = o(U, x.selector, m), S && U !== l.selector && (x.selector = tr(x.selector, S)), x.walkDecls((k) => {
              k.important = d.important || w;
            });
            let F = D().astSync(x.selector);
            F.each((k) => rt(k)), x.selector = F.toString();
          }), b.nodes[0] && g.push([
            d.sort,
            b.nodes[0]
          ]);
        }
      }
      let u = t.offsets.sort(g).map((m) => m[1]);
      l.after(u);
    }
    for (let l of n) l.parent.nodes.length > 1 ? l.remove() : l.parent.remove();
    dr(e, t, r);
  }
  function Hn(e) {
    return (t) => {
      let r = Gn(() => Bn(t, e));
      dr(t, e, r);
    };
  }
  var cr = qr(Jr());
  function Ie(e) {
    return typeof e == "object" && e !== null;
  }
  function Kn(e, t) {
    let r = nt(t);
    do
      if (r.pop(), ce(e, r) !== void 0) break;
    while (r.length);
    return r.length ? r : void 0;
  }
  function ne(e) {
    return typeof e == "string" ? e : e.reduce((t, r, a) => r.includes(".") ? `${t}[${r}]` : a === 0 ? r : `${t}.${r}`, "");
  }
  function ur(e) {
    return e.map((t) => `'${t}'`).join(", ");
  }
  function Dt(e) {
    return ur(Object.keys(e));
  }
  function Ye(e, t, r, a = {}) {
    let n = Array.isArray(t) ? ne(t) : t.replace(/^['"]+|['"]+$/g, ""), i = Array.isArray(t) ? t : nt(n), o = ce(e.theme, i, r);
    if (o === void 0) {
      let l = `'${n}' does not exist in your theme config.`, f = i.slice(0, -1), p = ce(e.theme, f);
      if (Ie(p)) {
        let g = Object.keys(p).filter((m) => Ye(e, [
          ...f,
          m
        ]).isValid), u = yr(i[i.length - 1], g);
        u ? l += ` Did you mean '${ne([
          ...f,
          u
        ])}'?` : g.length > 0 && (l += ` '${ne(f)}' has the following valid keys: ${ur(g)}`);
      } else {
        let g = Kn(e.theme, n);
        if (g) {
          let u = ce(e.theme, g);
          Ie(u) ? l += ` '${ne(g)}' has the following keys: ${Dt(u)}` : l += ` '${ne(g)}' is not an object.`;
        } else l += ` Your theme has the following top-level keys: ${Dt(e.theme)}`;
      }
      return {
        isValid: false,
        error: l
      };
    }
    if (!(typeof o == "string" || typeof o == "number" || typeof o == "function" || o instanceof String || o instanceof Number || Array.isArray(o))) {
      let l = `'${n}' was found but does not resolve to a string.`;
      if (Ie(o)) {
        let f = Object.keys(o).filter((p) => Ye(e, [
          ...i,
          p
        ]).isValid);
        f.length && (l += ` Did you mean something like '${ne([
          ...i,
          f[0]
        ])}'?`);
      }
      return {
        isValid: false,
        error: l
      };
    }
    let [s] = i;
    return {
      isValid: true,
      value: Ue(s)(o, a)
    };
  }
  function Jn(e, t, r) {
    t = t.map((n) => fr(e, n, r));
    let a = [
      ""
    ];
    for (let n of t) n.type === "div" && n.value === "," ? a.push("") : a[a.length - 1] += cr.default.stringify(n);
    return a;
  }
  function fr(e, t, r) {
    if (t.type === "function" && r[t.value] !== void 0) {
      let a = Jn(e, t.nodes, r);
      t.type = "word", t.value = r[t.value](e, ...a);
    }
    return t;
  }
  function Xn(e, t, r) {
    return Object.keys(r).some((a) => t.includes(`${a}(`)) ? (0, cr.default)(t).walk((a) => {
      fr(e, a, r);
    }).toString() : t;
  }
  var Qn = {
    atrule: "params",
    decl: "value"
  };
  function* Zn(e) {
    e = e.replace(/^['"]+|['"]+$/g, "");
    let t = e.match(/^([^\s]+)(?![^\[]*\])(?:\s*\/\s*([^\/\s]+))$/), r;
    yield [
      e,
      void 0
    ], t && (e = t[1], r = t[2], yield [
      e,
      r
    ]);
  }
  function ei(e, t, r) {
    let a = Array.from(Zn(t)).map(([n, i]) => Object.assign(Ye(e, n, r, {
      opacityValue: i
    }), {
      resolvedPath: n,
      alpha: i
    }));
    return a.find((n) => n.isValid) ?? a[0];
  }
  function ti(e) {
    let t = e.tailwindConfig, r = {
      theme: (a, n, ...i) => {
        var _a2;
        let { isValid: o, value: s, error: l, alpha: f } = ei(t, n, i.length ? i : void 0);
        if (!o) {
          let g = a.parent, u = (_a2 = g == null ? void 0 : g.raws.tailwind) == null ? void 0 : _a2.candidate;
          if (g && u !== void 0) {
            e.markInvalidUtilityNode(g), g.remove(), P.warn("invalid-theme-key-in-class", [
              `The utility \`${u}\` contains an invalid theme value and was not generated.`
            ]);
            return;
          }
          throw a.error(l);
        }
        let p = _e(s);
        return (f !== void 0 || p !== void 0 && typeof p == "function") && (f === void 0 && (f = 1), s = pe(p, f, p)), s;
      },
      screen: (a, n) => {
        n = n.replace(/^['"]+/g, "").replace(/['"]+$/g, "");
        let i = me(t.theme.screens).find(({ name: o }) => o === n);
        if (!i) throw a.error(`The '${n}' screen does not exist in your theme.`);
        return Ae(i);
      }
    };
    return (a) => {
      a.walk((n) => {
        let i = Qn[n.type];
        i !== void 0 && (n[i] = Xn(n, n[i], r));
      });
    };
  }
  function ri({ tailwindConfig: { theme: e } }) {
    return function(t) {
      t.walkAtRules("screen", (r) => {
        let a = r.params, n = me(e.screens).find(({ name: i }) => i === a);
        if (!n) throw r.error(`No \`${a}\` screen found.`);
        r.name = "media", r.params = Ae(n);
      });
    };
  }
  var Rt = {
    id(e) {
      return D.attribute({
        attribute: "id",
        operator: "=",
        value: e.value,
        quoteMark: '"'
      });
    }
  };
  function ai(e) {
    let t = e.filter((s) => s.type !== "pseudo" || s.nodes.length > 0 ? true : s.value.startsWith("::") || [
      ":before",
      ":after",
      ":first-line",
      ":first-letter"
    ].includes(s.value)).reverse(), r = /* @__PURE__ */ new Set([
      "tag",
      "class",
      "id",
      "attribute"
    ]), a = t.findIndex((s) => r.has(s.type));
    if (a === -1) return t.reverse().join("").trim();
    let n = t[a], i = Rt[n.type] ? Rt[n.type](n) : n;
    t = t.slice(0, a);
    let o = t.findIndex((s) => s.type === "combinator" && s.value === ">");
    return o !== -1 && (t.splice(0, o), t.unshift(D.universal())), [
      i,
      ...t.reverse()
    ].join("").trim();
  }
  var ni = D((e) => e.map((t) => {
    let r = t.split((a) => a.type === "combinator" && a.value === " ").pop();
    return ai(r);
  })), Me = /* @__PURE__ */ new Map();
  function ii(e) {
    return Me.has(e) || Me.set(e, ni.transformSync(e)), Me.get(e);
  }
  function oi({ tailwindConfig: e }) {
    return (t) => {
      let r = /* @__PURE__ */ new Map(), a = /* @__PURE__ */ new Set();
      if (t.walkAtRules("defaults", (n) => {
        if (n.nodes && n.nodes.length > 0) {
          a.add(n);
          return;
        }
        let i = n.params;
        r.has(i) || r.set(i, /* @__PURE__ */ new Set()), r.get(i).add(n.parent), n.remove();
      }), J(e, "optimizeUniversalDefaults")) for (let n of a) {
        let i = /* @__PURE__ */ new Map(), o = r.get(n.params) ?? [];
        for (let s of o) for (let l of ii(s.selector)) {
          let f = l.includes(":-") || l.includes("::-") || l.includes(":has") ? l : "__DEFAULT__", p = i.get(f) ?? /* @__PURE__ */ new Set();
          i.set(f, p), p.add(l);
        }
        if (i.size === 0) {
          n.remove();
          continue;
        }
        for (let [, s] of i) {
          let l = I.rule({
            source: n.source
          });
          l.selectors = [
            ...s
          ], l.append(n.nodes.map((f) => f.clone())), n.before(l);
        }
        n.remove();
      }
      else if (a.size) {
        let n = I.rule({
          selectors: [
            "*",
            "::before",
            "::after"
          ]
        });
        for (let o of a) n.append(o.nodes), n.parent || o.before(n), n.source || (n.source = o.source), o.remove();
        let i = n.clone({
          selectors: [
            "::backdrop"
          ]
        });
        n.after(i);
      }
    };
  }
  var pr = {
    atrule: [
      "name",
      "params"
    ],
    rule: [
      "selector"
    ]
  }, si = new Set(Object.keys(pr));
  function li() {
    function e(t) {
      let r = null;
      t.each((a) => {
        if (!si.has(a.type)) {
          r = null;
          return;
        }
        if (r === null) {
          r = a;
          return;
        }
        let n = pr[a.type];
        a.type === "atrule" && a.name === "font-face" ? r = a : n.every((i) => (a[i] ?? "").replace(/\s+/g, " ") === (r[i] ?? "").replace(/\s+/g, " ")) ? (a.nodes && r.append(a.nodes), a.remove()) : r = a;
      }), t.each((a) => {
        a.type === "atrule" && e(a);
      });
    }
    return (t) => {
      e(t);
    };
  }
  function di() {
    return (e) => {
      e.walkRules((t) => {
        let r = /* @__PURE__ */ new Map(), a = /* @__PURE__ */ new Set([]), n = /* @__PURE__ */ new Map();
        t.walkDecls((i) => {
          if (i.parent === t) {
            if (r.has(i.prop)) {
              if (r.get(i.prop).value === i.value) {
                a.add(r.get(i.prop)), r.set(i.prop, i);
                return;
              }
              n.has(i.prop) || n.set(i.prop, /* @__PURE__ */ new Set()), n.get(i.prop).add(r.get(i.prop)), n.get(i.prop).add(i);
            }
            r.set(i.prop, i);
          }
        });
        for (let i of a) i.remove();
        for (let i of n.values()) {
          let o = /* @__PURE__ */ new Map();
          for (let s of i) {
            let l = ui(s.value);
            l !== null && (o.has(l) || o.set(l, /* @__PURE__ */ new Set()), o.get(l).add(s));
          }
          for (let s of o.values()) {
            let l = Array.from(s).slice(0, -1);
            for (let f of l) f.remove();
          }
        }
      });
    };
  }
  var ci = Symbol("unitless-number");
  function ui(e) {
    let t = /^-?\d*.?\d+([\w%]+)?$/g.exec(e);
    return t ? t[1] ?? ci : null;
  }
  function fi(e) {
    if (!e.walkAtRules) return;
    let t = /* @__PURE__ */ new Set();
    if (e.walkAtRules("apply", (r) => {
      t.add(r.parent);
    }), t.size !== 0) for (let r of t) {
      let a = [], n = [];
      for (let i of r.nodes) i.type === "atrule" && i.name === "apply" ? (n.length > 0 && (a.push(n), n = []), a.push([
        i
      ])) : n.push(i);
      if (n.length > 0 && a.push(n), a.length !== 1) {
        for (let i of [
          ...a
        ].reverse()) {
          let o = r.clone({
            nodes: []
          });
          o.append(i), r.after(o);
        }
        r.remove();
      }
    }
  }
  function It() {
    return (e) => {
      fi(e);
    };
  }
  function pi(e) {
    return async function(t, r) {
      let { tailwindDirectives: a, applyDirectives: n } = Xr(t);
      It()(t, r);
      let i = e({
        tailwindDirectives: a,
        applyDirectives: n,
        registerDependency(o) {
          r.messages.push({
            plugin: "tailwindcss",
            parent: r.opts.from,
            ...o
          });
        },
        createContext(o, s) {
          return hn(o, s, t);
        }
      })(t, r);
      if (i.tailwindConfig.separator === "-") throw new Error("The '-' character cannot be used as a custom separator in JIT mode due to parsing ambiguity. Please use another character like '_' instead.");
      Ea(i.tailwindConfig), await Fn(i)(t, r), It()(t, r), Hn(i)(t, r), ti(i)(t, r), ri(i)(t, r), oi(i)(t, r), li()(t, r), di()(t, r);
    };
  }
  const hi = Object.assign(function(e, t) {
    return {
      postcssPlugin: "tailwindcss",
      async Once(r, { result: a }) {
        await pi(({ createContext: n }) => () => n(e, t))(r, a);
      }
    };
  }, {
    postcss: true
  });
  async function mi(e) {
    var _a2;
    const t = ((_a2 = e.options) == null ? void 0 : _a2.resolvedConfig) || await Cr(e.volume), r = e.contents.map((n) => typeof n == "string" ? {
      content: n
    } : n);
    return await be().use(hi(t, r)).use(Or()).process(e.volume[e.entrypoint.css], {
      from: void 0
    }).then((n) => n.css);
  }
  gi = "3.4.17";
  Ci = async function({ contents: e = [], entrypoint: t = {}, volume: r = {}, ...a } = {}) {
    a = {
      contents: e,
      entrypoint: t,
      volume: r,
      ...a
    };
    let n = await mi(a);
    return `/*! tailwindcss v${gi} | MIT License | https://tailwindcss.com */
${n}`;
  };
  $i = async function(e, t = false) {
    await mr(gr);
    const { default: r } = await hr(async () => {
      const { default: n } = await import("./index-CCZ24cva.js").then((i) => i.i);
      return {
        default: n
      };
    }, [], import.meta.url), a = br({
      filename: "main.css",
      code: new TextEncoder().encode(e),
      minify: t,
      sourceMap: false,
      targets: Ar(r("defaults")),
      errorRecovery: true
    });
    return {
      code: a.code,
      css: new TextDecoder().decode(a.code),
      warnings: a.warnings
    };
  };
});
export {
  __tla,
  Ci as b,
  $i as o,
  gi as v
};

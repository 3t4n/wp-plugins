import { p as ie } from "../../../../postcss-CMxDEYNb.js";
import { N as ae } from "../../../../didyoumean-DVWXwy9y.js";
import { n as O, a as D, x as K, F as le, r as se } from "../../../../resolve-config-D_K0LwYp.js";
import { R as ue } from "../../../../setupContextUtils-DmnPFBZ3.js";
import { c as de } from "../../../../generateRules-DUY2cBXN.js";
import { d as ce } from "../../../../vfs-DmzitRvm.js";
import { __tla as __tla_0 } from "../../../../module-oN1JnOJ9.js";
import { __tla as __tla_1 } from "../../../../index-BmQd5Vrd.js";
import { d as fe, b as pe } from "../../../../intellisense-Nf6mwf2_.js";
import { s as U } from "../../../../set-DvizEivO.js";
import "../../../../index-DYEcFSWi.js";
import "../../../../index-BAMY2Nnw.js";
import "../../../../index-CgqXENQe.js";
import "../../../../preload-helper-DH9yCMdR.js";
import "../../../../stylesheet-B98yp78w.js";
import "../../../../index-xtxc-82G.js";
import "../../../../isObject-CRxghtyK.js";
Promise.all([
  (() => {
    try {
      return __tla_0;
    } catch {
    }
  })(),
  (() => {
    try {
      return __tla_1;
    } catch {
    }
  })()
]).then(async () => {
  var _a;
  var he = Object.create, W = Object.defineProperty, ge = Object.getOwnPropertyDescriptor, me = Object.getOwnPropertyNames, ye = Object.getPrototypeOf, ve = Object.prototype.hasOwnProperty, P = (r, e) => () => (e || r((e = {
    exports: {}
  }).exports, e), e.exports), we = (r, e, t, n) => {
    if (e && typeof e == "object" || typeof e == "function") for (let o of me(e)) !ve.call(r, o) && o !== t && W(r, o, {
      get: () => e[o],
      enumerable: !(n = ge(e, o)) || n.enumerable
    });
    return r;
  }, be = (r, e, t) => (t = r != null ? he(ye(r)) : {}, we(!r || !r.__esModule ? W(t, "default", {
    value: r,
    enumerable: true
  }) : t, r)), Ae = P((r, e) => {
    var t = 40, n = 41, o = 39, i = 34, a = 92, p = 47, u = 44, l = 58, m = 42, h = 117, y = 85, C = 43, oe = /^[a-f0-9?-]+$/i;
    e.exports = function(ne) {
      for (var v = [], g = ne, s, V, S, d, $, I, b, N, c = 0, f = g.charCodeAt(c), H = g.length, A = [
        {
          nodes: v
        }
      ], j = 0, w, q = "", R = "", T = ""; c < H; ) if (f <= 32) {
        s = c;
        do
          s += 1, f = g.charCodeAt(s);
        while (f <= 32);
        d = g.slice(c, s), S = v[v.length - 1], f === n && j ? T = d : S && S.type === "div" ? (S.after = d, S.sourceEndIndex += d.length) : f === u || f === l || f === p && g.charCodeAt(s + 1) !== m && (!w || w && w.type === "function" && false) ? R = d : v.push({
          type: "space",
          sourceIndex: c,
          sourceEndIndex: s,
          value: d
        }), c = s;
      } else if (f === o || f === i) {
        s = c, V = f === o ? "'" : '"', d = {
          type: "string",
          sourceIndex: c,
          quote: V
        };
        do
          if ($ = false, s = g.indexOf(V, s + 1), ~s) for (I = s; g.charCodeAt(I - 1) === a; ) I -= 1, $ = !$;
          else g += V, s = g.length - 1, d.unclosed = true;
        while ($);
        d.value = g.slice(c + 1, s), d.sourceEndIndex = d.unclosed ? s : s + 1, v.push(d), c = s + 1, f = g.charCodeAt(c);
      } else if (f === p && g.charCodeAt(c + 1) === m) s = g.indexOf("*/", c), d = {
        type: "comment",
        sourceIndex: c,
        sourceEndIndex: s + 2
      }, s === -1 && (d.unclosed = true, s = g.length, d.sourceEndIndex = s), d.value = g.slice(c + 2, s), v.push(d), c = s + 2, f = g.charCodeAt(c);
      else if ((f === p || f === m) && w && w.type === "function") d = g[c], v.push({
        type: "word",
        sourceIndex: c - R.length,
        sourceEndIndex: c + d.length,
        value: d
      }), c += 1, f = g.charCodeAt(c);
      else if (f === p || f === u || f === l) d = g[c], v.push({
        type: "div",
        sourceIndex: c - R.length,
        sourceEndIndex: c + d.length,
        value: d,
        before: R,
        after: ""
      }), R = "", c += 1, f = g.charCodeAt(c);
      else if (t === f) {
        s = c;
        do
          s += 1, f = g.charCodeAt(s);
        while (f <= 32);
        if (N = c, d = {
          type: "function",
          sourceIndex: c - q.length,
          value: q,
          before: g.slice(N + 1, s)
        }, c = s, q === "url" && f !== o && f !== i) {
          s -= 1;
          do
            if ($ = false, s = g.indexOf(")", s + 1), ~s) for (I = s; g.charCodeAt(I - 1) === a; ) I -= 1, $ = !$;
            else g += ")", s = g.length - 1, d.unclosed = true;
          while ($);
          b = s;
          do
            b -= 1, f = g.charCodeAt(b);
          while (f <= 32);
          N < b ? (c !== b + 1 ? d.nodes = [
            {
              type: "word",
              sourceIndex: c,
              sourceEndIndex: b + 1,
              value: g.slice(c, b + 1)
            }
          ] : d.nodes = [], d.unclosed && b + 1 !== s ? (d.after = "", d.nodes.push({
            type: "space",
            sourceIndex: b + 1,
            sourceEndIndex: s,
            value: g.slice(b + 1, s)
          })) : (d.after = g.slice(b + 1, s), d.sourceEndIndex = s)) : (d.after = "", d.nodes = []), c = s + 1, d.sourceEndIndex = d.unclosed ? s : c, f = g.charCodeAt(c), v.push(d);
        } else j += 1, d.after = "", d.sourceEndIndex = c + 1, v.push(d), A.push(d), v = d.nodes = [], w = d;
        q = "";
      } else if (n === f && j) c += 1, f = g.charCodeAt(c), w.after = T, w.sourceEndIndex += T.length, T = "", j -= 1, A[A.length - 1].sourceEndIndex = c, A.pop(), w = A[j], v = w.nodes;
      else {
        s = c;
        do
          f === a && (s += 1), s += 1, f = g.charCodeAt(s);
        while (s < H && !(f <= 32 || f === o || f === i || f === u || f === l || f === p || f === t || f === m && w && w.type === "function" || f === p && w.type === "function" || f === n && j));
        d = g.slice(c, s), t === f ? q = d : (h === d.charCodeAt(0) || y === d.charCodeAt(0)) && C === d.charCodeAt(1) && oe.test(d.slice(2)) ? v.push({
          type: "unicode-range",
          sourceIndex: c,
          sourceEndIndex: s,
          value: d
        }) : v.push({
          type: "word",
          sourceIndex: c,
          sourceEndIndex: s,
          value: d
        }), c = s;
      }
      for (c = A.length - 1; c; c -= 1) A[c].unclosed = true, A[c].sourceEndIndex = g.length;
      return A[0].nodes;
    };
  }), $e = P((r, e) => {
    e.exports = function t(n, o, i) {
      var a, p, u, l;
      for (a = 0, p = n.length; a < p; a += 1) u = n[a], i || (l = o(u, a, n)), l !== false && u.type === "function" && Array.isArray(u.nodes) && t(u.nodes, o, i), i && o(u, a, n);
    };
  }), ke = P((r, e) => {
    function t(o, i) {
      var a = o.type, p = o.value, u, l;
      return i && (l = i(o)) !== void 0 ? l : a === "word" || a === "space" ? p : a === "string" ? (u = o.quote || "", u + p + (o.unclosed ? "" : u)) : a === "comment" ? "/*" + p + (o.unclosed ? "" : "*/") : a === "div" ? (o.before || "") + p + (o.after || "") : Array.isArray(o.nodes) ? (u = n(o.nodes, i), a !== "function" ? u : p + "(" + (o.before || "") + u + (o.after || "") + (o.unclosed ? "" : ")")) : p;
    }
    function n(o, i) {
      var a, p;
      if (Array.isArray(o)) {
        for (a = "", p = o.length - 1; ~p; p -= 1) a = t(o[p], i) + a;
        return a;
      }
      return t(o, i);
    }
    e.exports = n;
  }), xe = P((r, e) => {
    var t = 45, n = 43, o = 46, i = 101, a = 69;
    function p(u) {
      var l = u.charCodeAt(0), m;
      if (l === n || l === t) {
        if (m = u.charCodeAt(1), m >= 48 && m <= 57) return true;
        var h = u.charCodeAt(2);
        return m === o && h >= 48 && h <= 57;
      }
      return l === o ? (m = u.charCodeAt(1), m >= 48 && m <= 57) : l >= 48 && l <= 57;
    }
    e.exports = function(u) {
      var l = 0, m = u.length, h, y, C;
      if (m === 0 || !p(u)) return false;
      for (h = u.charCodeAt(l), (h === n || h === t) && l++; l < m && (h = u.charCodeAt(l), !(h < 48 || h > 57)); ) l += 1;
      if (h = u.charCodeAt(l), y = u.charCodeAt(l + 1), h === o && y >= 48 && y <= 57) for (l += 2; l < m && (h = u.charCodeAt(l), !(h < 48 || h > 57)); ) l += 1;
      if (h = u.charCodeAt(l), y = u.charCodeAt(l + 1), C = u.charCodeAt(l + 2), (h === i || h === a) && (y >= 48 && y <= 57 || (y === n || y === t) && C >= 48 && C <= 57)) for (l += y === n || y === t ? 3 : 2; l < m && (h = u.charCodeAt(l), !(h < 48 || h > 57)); ) l += 1;
      return {
        number: u.slice(0, l),
        unit: u.slice(l)
      };
    };
  }), Ce = P((r, e) => {
    var t = Ae(), n = $e(), o = ke();
    function i(a) {
      return this instanceof i ? (this.nodes = t(a), this) : new i(a);
    }
    i.prototype.toString = function() {
      return Array.isArray(this.nodes) ? o(this.nodes) : "";
    }, i.prototype.walk = function(a, p) {
      return n(this.nodes, a, p), this;
    }, i.unit = xe(), i.walk = n, i.stringify = o, e.exports = i;
  });
  function Ie(r) {
    if (Object.prototype.toString.call(r) !== "[object Object]") return false;
    let e = Object.getPrototypeOf(r);
    return e === null || Object.getPrototypeOf(e) === null;
  }
  function je(r) {
    return [
      "fontSize",
      "outline"
    ].includes(r) ? (e) => (typeof e == "function" && (e = e({})), Array.isArray(e) && (e = e[0]), e) : r === "fontFamily" ? (e) => {
      typeof e == "function" && (e = e({}));
      let t = Array.isArray(e) && Ie(e[1]) ? e[0] : e;
      return Array.isArray(t) ? t.join(", ") : t;
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
    ].includes(r) ? (e) => (typeof e == "function" && (e = e({})), Array.isArray(e) && (e = e.join(", ")), e) : [
      "gridTemplateColumns",
      "gridTemplateRows",
      "objectPosition"
    ].includes(r) ? (e) => (typeof e == "function" && (e = e({})), typeof e == "string" && (e = le.list.comma(e).join(" ")), e) : (e, t = {}) => (typeof e == "function" && (e = e(t)), e);
  }
  var G = be(Ce());
  function Q(r, e = true) {
    return Array.isArray(r) ? r.map((t) => {
      if (e && Array.isArray(t)) throw new Error("The tuple syntax is not supported for `screens`.");
      if (typeof t == "string") return {
        name: t.toString(),
        not: false,
        values: [
          {
            min: t,
            max: void 0
          }
        ]
      };
      let [n, o] = t;
      return n = n.toString(), typeof o == "string" ? {
        name: n,
        not: false,
        values: [
          {
            min: o,
            max: void 0
          }
        ]
      } : Array.isArray(o) ? {
        name: n,
        not: false,
        values: o.map((i) => Y(i))
      } : {
        name: n,
        not: false,
        values: [
          Y(o)
        ]
      };
    }) : Q(Object.entries(r ?? {}), false);
  }
  function Y({ "min-width": r, min: e = r, max: t, raw: n } = {}) {
    return {
      min: e,
      max: t,
      raw: n
    };
  }
  function Oe(r) {
    return r = Array.isArray(r) ? r : [
      r
    ], r.map((e) => {
      let t = e.values.map((n) => n.raw !== void 0 ? n.raw : [
        n.min && `(min-width: ${n.min})`,
        n.max && `(max-width: ${n.max})`
      ].filter(Boolean).join(" and "));
      return e.not ? `not all and ${t}` : t;
    }).join(", ");
  }
  function X(r) {
    if (Array.isArray(r)) return r;
    let e = r.split("[").length - 1, t = r.split("]").length - 1;
    if (e !== t) throw new Error(`Path is invalid. Has unbalanced brackets: ${r}`);
    return r.split(/\.(?![^\[]*\])|[\[\]]/g).filter(Boolean);
  }
  var J = {
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
  }, Ee = /^#([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})?$/i, Se = /^#([a-f\d])([a-f\d])([a-f\d])([a-f\d])?$/i, k = /(?:\d+|\d*\.\d+)%?/, F = /(?:\s*,\s*|\s+)/, Z = /\s*[,/]\s*/, x = /var\(--(?:[^ )]*?)(?:,(?:[^ )]*?|var\(--[^ )]*?\)))?\)/, qe = new RegExp(`^(rgba?)\\(\\s*(${k.source}|${x.source})(?:${F.source}(${k.source}|${x.source}))?(?:${F.source}(${k.source}|${x.source}))?(?:${Z.source}(${k.source}|${x.source}))?\\s*\\)$`), Re = new RegExp(`^(hsla?)\\(\\s*((?:${k.source})(?:deg|rad|grad|turn)?|${x.source})(?:${F.source}(${k.source}|${x.source}))?(?:${F.source}(${k.source}|${x.source}))?(?:${Z.source}(${k.source}|${x.source}))?\\s*\\)$`);
  function Pe(r, { loose: e = false } = {}) {
    var _a2, _b;
    if (typeof r != "string") return null;
    if (r = r.trim(), r === "transparent") return {
      mode: "rgb",
      color: [
        "0",
        "0",
        "0"
      ],
      alpha: "0"
    };
    if (r in J) return {
      mode: "rgb",
      color: J[r].map((i) => i.toString())
    };
    let t = r.replace(Se, (i, a, p, u, l) => [
      "#",
      a,
      a,
      p,
      p,
      u,
      u,
      l ? l + l : ""
    ].join("")).match(Ee);
    if (t !== null) return {
      mode: "rgb",
      color: [
        parseInt(t[1], 16),
        parseInt(t[2], 16),
        parseInt(t[3], 16)
      ].map((i) => i.toString()),
      alpha: t[4] ? (parseInt(t[4], 16) / 255).toString() : void 0
    };
    let n = r.match(qe) ?? r.match(Re);
    if (n === null) return null;
    let o = [
      n[2],
      n[3],
      n[4]
    ].filter(Boolean).map((i) => i.toString());
    return o.length === 2 && o[0].startsWith("var(") ? {
      mode: n[1],
      color: [
        o[0]
      ],
      alpha: o[1]
    } : !e && o.length !== 3 || o.length < 3 && !o.some((i) => /^var\(.*?\)$/.test(i)) ? null : {
      mode: n[1],
      color: o,
      alpha: (_b = (_a2 = n[5]) == null ? void 0 : _a2.toString) == null ? void 0 : _b.call(_a2)
    };
  }
  function Ve({ mode: r, color: e, alpha: t }) {
    let n = t !== void 0;
    return r === "rgba" || r === "hsla" ? `${r}(${e.join(", ")}${n ? `, ${t}` : ""})` : `${r}(${e.join(" ")}${n ? ` / ${t}` : ""})`;
  }
  function Te(r, e, t) {
    if (typeof r == "function") return r({
      opacityValue: e
    });
    let n = Pe(r, {
      loose: true
    });
    return n === null ? t : Ve({
      ...n,
      alpha: e
    });
  }
  var L = /* @__PURE__ */ new Set();
  function z(r, e, t) {
    typeof K < "u" && K.env.JEST_WORKER_ID || t && L.has(t) || (t && L.add(t), console.warn(""), e.forEach((n) => console.warn(r, "-", n)));
  }
  var De = {
    info(r, e) {
      z(O.bold(O.cyan("info")), ...Array.isArray(r) ? [
        r
      ] : [
        e,
        r
      ]);
    },
    warn(r, e) {
      z(O.bold(O.yellow("warn")), ...Array.isArray(r) ? [
        r
      ] : [
        e,
        r
      ]);
    },
    risk(r, e) {
      z(O.bold(O.magenta("risk")), ...Array.isArray(r) ? [
        r
      ] : [
        e,
        r
      ]);
    }
  };
  function Fe(r) {
    if (typeof r == "string" && r.includes("<alpha-value>")) {
      let e = r;
      return ({ opacityValue: t = 1 }) => e.replace(/<alpha-value>/g, t);
    }
    return r;
  }
  function B(r) {
    return typeof r == "object" && r !== null;
  }
  function Ne(r, e) {
    let t = X(e);
    do
      if (t.pop(), D(r, t) !== void 0) break;
    while (t.length);
    return t.length ? t : void 0;
  }
  function E(r) {
    return typeof r == "string" ? r : r.reduce((e, t, n) => t.includes(".") ? `${e}[${t}]` : n === 0 ? t : `${e}.${t}`, "");
  }
  function ee(r) {
    return r.map((e) => `'${e}'`).join(", ");
  }
  function M(r) {
    return ee(Object.keys(r));
  }
  function _(r, e, t, n = {}) {
    let o = Array.isArray(e) ? E(e) : e.replace(/^['"]+|['"]+$/g, ""), i = Array.isArray(e) ? e : X(o), a = D(r.theme, i, t);
    if (a === void 0) {
      let u = `'${o}' does not exist in your theme config.`, l = i.slice(0, -1), m = D(r.theme, l);
      if (B(m)) {
        let h = Object.keys(m).filter((C) => _(r, [
          ...l,
          C
        ]).isValid), y = ae(i[i.length - 1], h);
        y ? u += ` Did you mean '${E([
          ...l,
          y
        ])}'?` : h.length > 0 && (u += ` '${E(l)}' has the following valid keys: ${ee(h)}`);
      } else {
        let h = Ne(r.theme, o);
        if (h) {
          let y = D(r.theme, h);
          B(y) ? u += ` '${E(h)}' has the following keys: ${M(y)}` : u += ` '${E(h)}' is not an object.`;
        } else u += ` Your theme has the following top-level keys: ${M(r.theme)}`;
      }
      return {
        isValid: false,
        error: u
      };
    }
    if (!(typeof a == "string" || typeof a == "number" || typeof a == "function" || a instanceof String || a instanceof Number || Array.isArray(a))) {
      let u = `'${o}' was found but does not resolve to a string.`;
      if (B(a)) {
        let l = Object.keys(a).filter((m) => _(r, [
          ...i,
          m
        ]).isValid);
        l.length && (u += ` Did you mean something like '${E([
          ...i,
          l[0]
        ])}'?`);
      }
      return {
        isValid: false,
        error: u
      };
    }
    let [p] = i;
    return {
      isValid: true,
      value: je(p)(a, n)
    };
  }
  function ze(r, e, t) {
    e = e.map((o) => re(r, o, t));
    let n = [
      ""
    ];
    for (let o of e) o.type === "div" && o.value === "," ? n.push("") : n[n.length - 1] += G.default.stringify(o);
    return n;
  }
  function re(r, e, t) {
    if (e.type === "function" && t[e.value] !== void 0) {
      let n = ze(r, e.nodes, t);
      e.type = "word", e.value = t[e.value](r, ...n);
    }
    return e;
  }
  function Be(r, e, t) {
    return Object.keys(t).some((n) => e.includes(`${n}(`)) ? (0, G.default)(e).walk((n) => {
      re(r, n, t);
    }).toString() : e;
  }
  var _e = {
    atrule: "params",
    decl: "value"
  };
  function* He(r) {
    r = r.replace(/^['"]+|['"]+$/g, "");
    let e = r.match(/^([^\s]+)(?![^\[]*\])(?:\s*\/\s*([^\/\s]+))$/), t;
    yield [
      r,
      void 0
    ], e && (r = e[1], t = e[2], yield [
      r,
      t
    ]);
  }
  function Ke(r, e, t) {
    let n = Array.from(He(e)).map(([o, i]) => Object.assign(_(r, o, t, {
      opacityValue: i
    }), {
      resolvedPath: o,
      alpha: i
    }));
    return n.find((o) => o.isValid) ?? n[0];
  }
  function Ye(r) {
    let e = r.tailwindConfig, t = {
      theme: (n, o, ...i) => {
        var _a2;
        let { isValid: a, value: p, error: u, alpha: l } = Ke(e, o, i.length ? i : void 0);
        if (!a) {
          let h = n.parent, y = (_a2 = h == null ? void 0 : h.raws.tailwind) == null ? void 0 : _a2.candidate;
          if (h && y !== void 0) {
            r.markInvalidUtilityNode(h), h.remove(), De.warn("invalid-theme-key-in-class", [
              `The utility \`${y}\` contains an invalid theme value and was not generated.`
            ]);
            return;
          }
          throw n.error(u);
        }
        let m = Fe(p);
        return (l !== void 0 || m !== void 0 && typeof m == "function") && (l === void 0 && (l = 1), p = Te(m, l, m)), p;
      },
      screen: (n, o) => {
        o = o.replace(/^['"]+/g, "").replace(/['"]+$/g, "");
        let i = Q(e.theme.screens).find(({ name: a }) => a === o);
        if (!i) throw n.error(`The '${o}' screen does not exist in your theme.`);
        return Oe(i);
      }
    };
    return (n) => {
      n.walk((o) => {
        let i = _e[o.type];
        i !== void 0 && (o[i] = Be(o, o[i], t));
      });
    };
  }
  const Je = document.querySelector('script#windpress\\:vfs[type="text/plain"]');
  async function te(r) {
    let e = r.split(/\s+/).filter((a) => a !== "" && a !== "|");
    const t = ce(Je.textContent), n = await se(t), o = ue(n);
    let i = e.map((a) => Le(a, o)).filter((a) => a !== null).map((a) => fe(a, 16));
    return Array.isArray(i) ? i.join(" ") : i;
  }
  function Le(r, e) {
    if (r === null) return null;
    let { root: t, rules: n } = Me([
      r
    ], e);
    return n.length === 0 ? null : Ue(t);
  }
  function Me(r, e, t = () => true) {
    let n = de(new Set(r), e).sort(([a], [p]) => pe(a - p)), o = ie.root({
      nodes: n.map(([, a]) => a)
    });
    Ye(e)(o);
    let i = [];
    return o.walkRules((a) => {
      t(a) && i.push(a);
    }), {
      root: o,
      rules: i
    };
  }
  function Ue(r) {
    let e = r.clone();
    return e.walkAtRules("defaults", (t) => {
      t.remove();
    }), e.toString().replace(/([^;{}\s])(\n\s*})/g, (t, n, o) => `${n};${o}`);
  }
  ((_a = window.wp) == null ? void 0 : _a.hooks) && window.wp.hooks.addFilter("windpress.module.classname-to-css", "windpress", te);
  U(window, "windpress.loaded.module.classnameToCss", true);
  U(window, "windpress.module.classnameToCss.generate", async (r) => te(r));
});

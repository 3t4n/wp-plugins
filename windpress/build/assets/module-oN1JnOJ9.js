var __defProp = Object.defineProperty;
var __typeError = (msg) => {
  throw TypeError(msg);
};
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __publicField = (obj, key, value) => __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
var __accessCheck = (obj, member, msg) => member.has(obj) || __typeError("Cannot " + msg);
var __privateAdd = (obj, member, value) => member.has(obj) ? __typeError("Cannot add the same private member more than once") : member instanceof WeakSet ? member.add(obj) : member.set(obj, value);
var __privateMethod = (obj, member, method) => (__accessCheck(obj, member, "access private method"), method);
import { _ as ur } from "./preload-helper-DH9yCMdR.js";
import { p as cr } from "./index-BAMY2Nnw.js";
let Ki, Vi, Ei, ki, Ci, ji, hr, mr, $i, Si, ue, bi;
let __tla = (async () => {
  var _Pr_instances, r_fn, n_fn, e_fn, t_fn, _a;
  const dr = new TextEncoder();
  function fr(e) {
    var _a2;
    const r = typeof e;
    return r !== "object" ? r : e === null ? "null" : ((_a2 = e == null ? void 0 : e.constructor) == null ? void 0 : _a2.name) ?? "object";
  }
  function pr(e) {
    if (typeof e == "string") return dr.encode(e);
    if (e instanceof Uint8Array) return e;
    if (e instanceof ArrayBuffer) return new Uint8Array(e);
    throw new TypeError(`Cannot validate the input as it must be a Uint8Array, a string, or an ArrayBuffer: received a value of the type ${fr(e)}`);
  }
  const R = [
    "A",
    "B",
    "C",
    "D",
    "E",
    "F",
    "G",
    "H",
    "I",
    "J",
    "K",
    "L",
    "M",
    "N",
    "O",
    "P",
    "Q",
    "R",
    "S",
    "T",
    "U",
    "V",
    "W",
    "X",
    "Y",
    "Z",
    "a",
    "b",
    "c",
    "d",
    "e",
    "f",
    "g",
    "h",
    "i",
    "j",
    "k",
    "l",
    "m",
    "n",
    "o",
    "p",
    "q",
    "r",
    "s",
    "t",
    "u",
    "v",
    "w",
    "x",
    "y",
    "z",
    "0",
    "1",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "+",
    "/"
  ];
  hr = function(e) {
    const r = pr(e);
    let n = "", t;
    const o = r.length;
    for (t = 2; t < o; t += 3) n += R[r[t - 2] >> 2], n += R[(r[t - 2] & 3) << 4 | r[t - 1] >> 4], n += R[(r[t - 1] & 15) << 2 | r[t] >> 6], n += R[r[t] & 63];
    return t === o + 1 && (n += R[r[t - 2] >> 2], n += R[(r[t - 2] & 3) << 4], n += "=="), t === o && (n += R[r[t - 2] >> 2], n += R[(r[t - 2] & 3) << 4 | r[t - 1] >> 4], n += R[(r[t - 1] & 15) << 2], n += "="), n;
  };
  ji = function(e) {
    const r = atob(e), n = r.length, t = new Uint8Array(n);
    for (let o = 0; o < n; o++) t[o] = r.charCodeAt(o);
    return t;
  };
  Ci = typeof globalThis < "u" ? globalThis : typeof window < "u" ? window : typeof global < "u" ? global : typeof self < "u" ? self : {};
  mr = function(e) {
    return e && e.__esModule && Object.prototype.hasOwnProperty.call(e, "default") ? e.default : e;
  };
  Ei = function(e) {
    if (e.__esModule) return e;
    var r = e.default;
    if (typeof r == "function") {
      var n = function t() {
        return this instanceof t ? Reflect.construct(r, arguments, this.constructor) : r.apply(this, arguments);
      };
      n.prototype = r.prototype;
    } else n = {};
    return Object.defineProperty(n, "__esModule", {
      value: true
    }), Object.keys(e).forEach(function(t) {
      var o = Object.getOwnPropertyDescriptor(e, t);
      Object.defineProperty(n, t, o.get ? o : {
        enumerable: true,
        get: function() {
          return e[t];
        }
      });
    }), n;
  };
  var It = {
    inherit: "inherit",
    current: "currentColor",
    transparent: "transparent",
    black: "#000",
    white: "#fff",
    slate: {
      50: "oklch(0.984 0.003 247.858)",
      100: "oklch(0.968 0.007 247.896)",
      200: "oklch(0.929 0.013 255.508)",
      300: "oklch(0.869 0.022 252.894)",
      400: "oklch(0.704 0.04 256.788)",
      500: "oklch(0.554 0.046 257.417)",
      600: "oklch(0.446 0.043 257.281)",
      700: "oklch(0.372 0.044 257.287)",
      800: "oklch(0.279 0.041 260.031)",
      900: "oklch(0.208 0.042 265.755)",
      950: "oklch(0.129 0.042 264.695)"
    },
    gray: {
      50: "oklch(0.985 0.002 247.839)",
      100: "oklch(0.967 0.003 264.542)",
      200: "oklch(0.928 0.006 264.531)",
      300: "oklch(0.872 0.01 258.338)",
      400: "oklch(0.707 0.022 261.325)",
      500: "oklch(0.551 0.027 264.364)",
      600: "oklch(0.446 0.03 256.802)",
      700: "oklch(0.373 0.034 259.733)",
      800: "oklch(0.278 0.033 256.848)",
      900: "oklch(0.21 0.034 264.665)",
      950: "oklch(0.13 0.028 261.692)"
    },
    zinc: {
      50: "oklch(0.985 0 0)",
      100: "oklch(0.967 0.001 286.375)",
      200: "oklch(0.92 0.004 286.32)",
      300: "oklch(0.871 0.006 286.286)",
      400: "oklch(0.705 0.015 286.067)",
      500: "oklch(0.552 0.016 285.938)",
      600: "oklch(0.442 0.017 285.786)",
      700: "oklch(0.37 0.013 285.805)",
      800: "oklch(0.274 0.006 286.033)",
      900: "oklch(0.21 0.006 285.885)",
      950: "oklch(0.141 0.005 285.823)"
    },
    neutral: {
      50: "oklch(0.985 0 0)",
      100: "oklch(0.97 0 0)",
      200: "oklch(0.922 0 0)",
      300: "oklch(0.87 0 0)",
      400: "oklch(0.708 0 0)",
      500: "oklch(0.556 0 0)",
      600: "oklch(0.439 0 0)",
      700: "oklch(0.371 0 0)",
      800: "oklch(0.269 0 0)",
      900: "oklch(0.205 0 0)",
      950: "oklch(0.145 0 0)"
    },
    stone: {
      50: "oklch(0.985 0.001 106.423)",
      100: "oklch(0.97 0.001 106.424)",
      200: "oklch(0.923 0.003 48.717)",
      300: "oklch(0.869 0.005 56.366)",
      400: "oklch(0.709 0.01 56.259)",
      500: "oklch(0.553 0.013 58.071)",
      600: "oklch(0.444 0.011 73.639)",
      700: "oklch(0.374 0.01 67.558)",
      800: "oklch(0.268 0.007 34.298)",
      900: "oklch(0.216 0.006 56.043)",
      950: "oklch(0.147 0.004 49.25)"
    },
    red: {
      50: "oklch(0.971 0.013 17.38)",
      100: "oklch(0.936 0.032 17.717)",
      200: "oklch(0.885 0.062 18.334)",
      300: "oklch(0.808 0.114 19.571)",
      400: "oklch(0.704 0.191 22.216)",
      500: "oklch(0.637 0.237 25.331)",
      600: "oklch(0.577 0.245 27.325)",
      700: "oklch(0.505 0.213 27.518)",
      800: "oklch(0.444 0.177 26.899)",
      900: "oklch(0.396 0.141 25.723)",
      950: "oklch(0.258 0.092 26.042)"
    },
    orange: {
      50: "oklch(0.98 0.016 73.684)",
      100: "oklch(0.954 0.038 75.164)",
      200: "oklch(0.901 0.076 70.697)",
      300: "oklch(0.837 0.128 66.29)",
      400: "oklch(0.75 0.183 55.934)",
      500: "oklch(0.705 0.213 47.604)",
      600: "oklch(0.646 0.222 41.116)",
      700: "oklch(0.553 0.195 38.402)",
      800: "oklch(0.47 0.157 37.304)",
      900: "oklch(0.408 0.123 38.172)",
      950: "oklch(0.266 0.079 36.259)"
    },
    amber: {
      50: "oklch(0.987 0.022 95.277)",
      100: "oklch(0.962 0.059 95.617)",
      200: "oklch(0.924 0.12 95.746)",
      300: "oklch(0.879 0.169 91.605)",
      400: "oklch(0.828 0.189 84.429)",
      500: "oklch(0.769 0.188 70.08)",
      600: "oklch(0.666 0.179 58.318)",
      700: "oklch(0.555 0.163 48.998)",
      800: "oklch(0.473 0.137 46.201)",
      900: "oklch(0.414 0.112 45.904)",
      950: "oklch(0.279 0.077 45.635)"
    },
    yellow: {
      50: "oklch(0.987 0.026 102.212)",
      100: "oklch(0.973 0.071 103.193)",
      200: "oklch(0.945 0.129 101.54)",
      300: "oklch(0.905 0.182 98.111)",
      400: "oklch(0.852 0.199 91.936)",
      500: "oklch(0.795 0.184 86.047)",
      600: "oklch(0.681 0.162 75.834)",
      700: "oklch(0.554 0.135 66.442)",
      800: "oklch(0.476 0.114 61.907)",
      900: "oklch(0.421 0.095 57.708)",
      950: "oklch(0.286 0.066 53.813)"
    },
    lime: {
      50: "oklch(0.986 0.031 120.757)",
      100: "oklch(0.967 0.067 122.328)",
      200: "oklch(0.938 0.127 124.321)",
      300: "oklch(0.897 0.196 126.665)",
      400: "oklch(0.841 0.238 128.85)",
      500: "oklch(0.768 0.233 130.85)",
      600: "oklch(0.648 0.2 131.684)",
      700: "oklch(0.532 0.157 131.589)",
      800: "oklch(0.453 0.124 130.933)",
      900: "oklch(0.405 0.101 131.063)",
      950: "oklch(0.274 0.072 132.109)"
    },
    green: {
      50: "oklch(0.982 0.018 155.826)",
      100: "oklch(0.962 0.044 156.743)",
      200: "oklch(0.925 0.084 155.995)",
      300: "oklch(0.871 0.15 154.449)",
      400: "oklch(0.792 0.209 151.711)",
      500: "oklch(0.723 0.219 149.579)",
      600: "oklch(0.627 0.194 149.214)",
      700: "oklch(0.527 0.154 150.069)",
      800: "oklch(0.448 0.119 151.328)",
      900: "oklch(0.393 0.095 152.535)",
      950: "oklch(0.266 0.065 152.934)"
    },
    emerald: {
      50: "oklch(0.979 0.021 166.113)",
      100: "oklch(0.95 0.052 163.051)",
      200: "oklch(0.905 0.093 164.15)",
      300: "oklch(0.845 0.143 164.978)",
      400: "oklch(0.765 0.177 163.223)",
      500: "oklch(0.696 0.17 162.48)",
      600: "oklch(0.596 0.145 163.225)",
      700: "oklch(0.508 0.118 165.612)",
      800: "oklch(0.432 0.095 166.913)",
      900: "oklch(0.378 0.077 168.94)",
      950: "oklch(0.262 0.051 172.552)"
    },
    teal: {
      50: "oklch(0.984 0.014 180.72)",
      100: "oklch(0.953 0.051 180.801)",
      200: "oklch(0.91 0.096 180.426)",
      300: "oklch(0.855 0.138 181.071)",
      400: "oklch(0.777 0.152 181.912)",
      500: "oklch(0.704 0.14 182.503)",
      600: "oklch(0.6 0.118 184.704)",
      700: "oklch(0.511 0.096 186.391)",
      800: "oklch(0.437 0.078 188.216)",
      900: "oklch(0.386 0.063 188.416)",
      950: "oklch(0.277 0.046 192.524)"
    },
    cyan: {
      50: "oklch(0.984 0.019 200.873)",
      100: "oklch(0.956 0.045 203.388)",
      200: "oklch(0.917 0.08 205.041)",
      300: "oklch(0.865 0.127 207.078)",
      400: "oklch(0.789 0.154 211.53)",
      500: "oklch(0.715 0.143 215.221)",
      600: "oklch(0.609 0.126 221.723)",
      700: "oklch(0.52 0.105 223.128)",
      800: "oklch(0.45 0.085 224.283)",
      900: "oklch(0.398 0.07 227.392)",
      950: "oklch(0.302 0.056 229.695)"
    },
    sky: {
      50: "oklch(0.977 0.013 236.62)",
      100: "oklch(0.951 0.026 236.824)",
      200: "oklch(0.901 0.058 230.902)",
      300: "oklch(0.828 0.111 230.318)",
      400: "oklch(0.746 0.16 232.661)",
      500: "oklch(0.685 0.169 237.323)",
      600: "oklch(0.588 0.158 241.966)",
      700: "oklch(0.5 0.134 242.749)",
      800: "oklch(0.443 0.11 240.79)",
      900: "oklch(0.391 0.09 240.876)",
      950: "oklch(0.293 0.066 243.157)"
    },
    blue: {
      50: "oklch(0.97 0.014 254.604)",
      100: "oklch(0.932 0.032 255.585)",
      200: "oklch(0.882 0.059 254.128)",
      300: "oklch(0.809 0.105 251.813)",
      400: "oklch(0.707 0.165 254.624)",
      500: "oklch(0.623 0.214 259.815)",
      600: "oklch(0.546 0.245 262.881)",
      700: "oklch(0.488 0.243 264.376)",
      800: "oklch(0.424 0.199 265.638)",
      900: "oklch(0.379 0.146 265.522)",
      950: "oklch(0.282 0.091 267.935)"
    },
    indigo: {
      50: "oklch(0.962 0.018 272.314)",
      100: "oklch(0.93 0.034 272.788)",
      200: "oklch(0.87 0.065 274.039)",
      300: "oklch(0.785 0.115 274.713)",
      400: "oklch(0.673 0.182 276.935)",
      500: "oklch(0.585 0.233 277.117)",
      600: "oklch(0.511 0.262 276.966)",
      700: "oklch(0.457 0.24 277.023)",
      800: "oklch(0.398 0.195 277.366)",
      900: "oklch(0.359 0.144 278.697)",
      950: "oklch(0.257 0.09 281.288)"
    },
    violet: {
      50: "oklch(0.969 0.016 293.756)",
      100: "oklch(0.943 0.029 294.588)",
      200: "oklch(0.894 0.057 293.283)",
      300: "oklch(0.811 0.111 293.571)",
      400: "oklch(0.702 0.183 293.541)",
      500: "oklch(0.606 0.25 292.717)",
      600: "oklch(0.541 0.281 293.009)",
      700: "oklch(0.491 0.27 292.581)",
      800: "oklch(0.432 0.232 292.759)",
      900: "oklch(0.38 0.189 293.745)",
      950: "oklch(0.283 0.141 291.089)"
    },
    purple: {
      50: "oklch(0.977 0.014 308.299)",
      100: "oklch(0.946 0.033 307.174)",
      200: "oklch(0.902 0.063 306.703)",
      300: "oklch(0.827 0.119 306.383)",
      400: "oklch(0.714 0.203 305.504)",
      500: "oklch(0.627 0.265 303.9)",
      600: "oklch(0.558 0.288 302.321)",
      700: "oklch(0.496 0.265 301.924)",
      800: "oklch(0.438 0.218 303.724)",
      900: "oklch(0.381 0.176 304.987)",
      950: "oklch(0.291 0.149 302.717)"
    },
    fuchsia: {
      50: "oklch(0.977 0.017 320.058)",
      100: "oklch(0.952 0.037 318.852)",
      200: "oklch(0.903 0.076 319.62)",
      300: "oklch(0.833 0.145 321.434)",
      400: "oklch(0.74 0.238 322.16)",
      500: "oklch(0.667 0.295 322.15)",
      600: "oklch(0.591 0.293 322.896)",
      700: "oklch(0.518 0.253 323.949)",
      800: "oklch(0.452 0.211 324.591)",
      900: "oklch(0.401 0.17 325.612)",
      950: "oklch(0.293 0.136 325.661)"
    },
    pink: {
      50: "oklch(0.971 0.014 343.198)",
      100: "oklch(0.948 0.028 342.258)",
      200: "oklch(0.899 0.061 343.231)",
      300: "oklch(0.823 0.12 346.018)",
      400: "oklch(0.718 0.202 349.761)",
      500: "oklch(0.656 0.241 354.308)",
      600: "oklch(0.592 0.249 0.584)",
      700: "oklch(0.525 0.223 3.958)",
      800: "oklch(0.459 0.187 3.815)",
      900: "oklch(0.408 0.153 2.432)",
      950: "oklch(0.284 0.109 3.907)"
    },
    rose: {
      50: "oklch(0.969 0.015 12.422)",
      100: "oklch(0.941 0.03 12.58)",
      200: "oklch(0.892 0.058 10.001)",
      300: "oklch(0.81 0.117 11.638)",
      400: "oklch(0.712 0.194 13.428)",
      500: "oklch(0.645 0.246 16.439)",
      600: "oklch(0.586 0.253 17.585)",
      700: "oklch(0.514 0.222 16.935)",
      800: "oklch(0.455 0.188 13.697)",
      900: "oklch(0.41 0.159 10.272)",
      950: "oklch(0.271 0.105 12.094)"
    }
  }, gr = /* @__PURE__ */ new Set([
    "black",
    "silver",
    "gray",
    "white",
    "maroon",
    "red",
    "purple",
    "fuchsia",
    "green",
    "lime",
    "olive",
    "yellow",
    "navy",
    "blue",
    "teal",
    "aqua",
    "aliceblue",
    "antiquewhite",
    "aqua",
    "aquamarine",
    "azure",
    "beige",
    "bisque",
    "black",
    "blanchedalmond",
    "blue",
    "blueviolet",
    "brown",
    "burlywood",
    "cadetblue",
    "chartreuse",
    "chocolate",
    "coral",
    "cornflowerblue",
    "cornsilk",
    "crimson",
    "cyan",
    "darkblue",
    "darkcyan",
    "darkgoldenrod",
    "darkgray",
    "darkgreen",
    "darkgrey",
    "darkkhaki",
    "darkmagenta",
    "darkolivegreen",
    "darkorange",
    "darkorchid",
    "darkred",
    "darksalmon",
    "darkseagreen",
    "darkslateblue",
    "darkslategray",
    "darkslategrey",
    "darkturquoise",
    "darkviolet",
    "deeppink",
    "deepskyblue",
    "dimgray",
    "dimgrey",
    "dodgerblue",
    "firebrick",
    "floralwhite",
    "forestgreen",
    "fuchsia",
    "gainsboro",
    "ghostwhite",
    "gold",
    "goldenrod",
    "gray",
    "green",
    "greenyellow",
    "grey",
    "honeydew",
    "hotpink",
    "indianred",
    "indigo",
    "ivory",
    "khaki",
    "lavender",
    "lavenderblush",
    "lawngreen",
    "lemonchiffon",
    "lightblue",
    "lightcoral",
    "lightcyan",
    "lightgoldenrodyellow",
    "lightgray",
    "lightgreen",
    "lightgrey",
    "lightpink",
    "lightsalmon",
    "lightseagreen",
    "lightskyblue",
    "lightslategray",
    "lightslategrey",
    "lightsteelblue",
    "lightyellow",
    "lime",
    "limegreen",
    "linen",
    "magenta",
    "maroon",
    "mediumaquamarine",
    "mediumblue",
    "mediumorchid",
    "mediumpurple",
    "mediumseagreen",
    "mediumslateblue",
    "mediumspringgreen",
    "mediumturquoise",
    "mediumvioletred",
    "midnightblue",
    "mintcream",
    "mistyrose",
    "moccasin",
    "navajowhite",
    "navy",
    "oldlace",
    "olive",
    "olivedrab",
    "orange",
    "orangered",
    "orchid",
    "palegoldenrod",
    "palegreen",
    "paleturquoise",
    "palevioletred",
    "papayawhip",
    "peachpuff",
    "peru",
    "pink",
    "plum",
    "powderblue",
    "purple",
    "rebeccapurple",
    "red",
    "rosybrown",
    "royalblue",
    "saddlebrown",
    "salmon",
    "sandybrown",
    "seagreen",
    "seashell",
    "sienna",
    "silver",
    "skyblue",
    "slateblue",
    "slategray",
    "slategrey",
    "snow",
    "springgreen",
    "steelblue",
    "tan",
    "teal",
    "thistle",
    "tomato",
    "turquoise",
    "violet",
    "wheat",
    "white",
    "whitesmoke",
    "yellow",
    "yellowgreen",
    "transparent",
    "currentcolor",
    "canvas",
    "canvastext",
    "linktext",
    "visitedtext",
    "activetext",
    "buttonface",
    "buttontext",
    "buttonborder",
    "field",
    "fieldtext",
    "highlight",
    "highlighttext",
    "selecteditem",
    "selecteditemtext",
    "mark",
    "marktext",
    "graytext",
    "accentcolor",
    "accentcolortext"
  ]), vr = /^(rgba?|hsla?|hwb|color|(ok)?(lab|lch)|light-dark|color-mix)\(/i;
  function wr(e) {
    return e.charCodeAt(0) === 35 || vr.test(e) || gr.has(e.toLowerCase());
  }
  var Ne = [
    "calc",
    "min",
    "max",
    "clamp",
    "mod",
    "rem",
    "sin",
    "cos",
    "tan",
    "asin",
    "acos",
    "atan",
    "atan2",
    "pow",
    "sqrt",
    "hypot",
    "log",
    "exp",
    "round"
  ], ve = [
    "anchor-size"
  ], Ye = new RegExp(`(${ve.join("|")})\\(`, "g");
  function $e(e) {
    return e.indexOf("(") !== -1 && Ne.some((r) => e.includes(`${r}(`));
  }
  function br(e) {
    if (!Ne.some((o) => e.includes(o))) return e;
    let r = false;
    ve.some((o) => e.includes(o)) && (Ye.lastIndex = 0, e = e.replace(Ye, (o, l) => (r = true, `$${ve.indexOf(l)}$(`)));
    let n = "", t = [];
    for (let o = 0; o < e.length; o++) {
      let l = e[o];
      if (l === "(") {
        n += l;
        let a = o;
        for (let s = o - 1; s >= 0; s--) {
          let h = e.charCodeAt(s);
          if (h >= 48 && h <= 57) a = s;
          else if (h >= 97 && h <= 122) a = s;
          else break;
        }
        let u = e.slice(a, o);
        if (Ne.includes(u)) {
          t.unshift(true);
          continue;
        } else if (t[0] && u === "") {
          t.unshift(true);
          continue;
        }
        t.unshift(false);
        continue;
      } else if (l === ")") n += l, t.shift();
      else if (l === "," && t[0]) {
        n += ", ";
        continue;
      } else {
        if (l === " " && t[0] && n[n.length - 1] === " ") continue;
        if ((l === "+" || l === "*" || l === "/" || l === "-") && t[0]) {
          let a = n.trimEnd(), u = a[a.length - 1];
          if (u === "+" || u === "*" || u === "/" || u === "-") {
            n += l;
            continue;
          } else if (u === "(" || u === ",") {
            n += l;
            continue;
          } else e[o - 1] === " " ? n += `${l} ` : n += ` ${l} `;
        } else if (t[0] && e.startsWith("to-zero", o)) {
          let a = o;
          o += 7, n += e.slice(a, o + 1);
        } else n += l;
      }
    }
    return r ? n.replace(/\$(\d+)\$/g, (o, l) => ve[l] ?? o) : n;
  }
  var de = new Uint8Array(256);
  function C(e, r) {
    let n = 0, t = [], o = 0, l = e.length, a = r.charCodeAt(0);
    for (let u = 0; u < l; u++) {
      let s = e.charCodeAt(u);
      if (n === 0 && s === a) {
        t.push(e.slice(o, u)), o = u + 1;
        continue;
      }
      switch (s) {
        case 92:
          u += 1;
          break;
        case 39:
        case 34:
          for (; ++u < l; ) {
            let h = e.charCodeAt(u);
            if (h === 92) {
              u += 1;
              continue;
            }
            if (h === s) break;
          }
          break;
        case 40:
          de[n] = 41, n++;
          break;
        case 91:
          de[n] = 93, n++;
          break;
        case 123:
          de[n] = 125, n++;
          break;
        case 93:
        case 125:
        case 41:
          n > 0 && s === de[n - 1] && n--;
          break;
      }
    }
    return t.push(e.slice(o)), t;
  }
  var yr = {
    color: wr,
    length: Pe,
    percentage: qe,
    ratio: Nr,
    number: Vr,
    integer: j,
    url: qt,
    position: _r,
    "bg-size": Ur,
    "line-width": xr,
    image: Tr,
    "family-name": jr,
    "generic-name": zr,
    "absolute-size": Cr,
    "relative-size": Er,
    angle: Lr,
    vector: Rr
  };
  function N(e, r) {
    var _a2;
    if (e.startsWith("var(")) return null;
    for (let n of r) if ((_a2 = yr[n]) == null ? void 0 : _a2.call(yr, e)) return n;
    return null;
  }
  var kr = /^url\(.*\)$/;
  function qt(e) {
    return kr.test(e);
  }
  function xr(e) {
    return e === "thin" || e === "medium" || e === "thick";
  }
  var $r = /^(?:element|image|cross-fade|image-set)\(/, Ar = /^(repeating-)?(conic|linear|radial)-gradient\(/;
  function Tr(e) {
    let r = 0;
    for (let n of C(e, ",")) if (!n.startsWith("var(")) {
      if (qt(n)) {
        r += 1;
        continue;
      }
      if (Ar.test(n)) {
        r += 1;
        continue;
      }
      if ($r.test(n)) {
        r += 1;
        continue;
      }
      return false;
    }
    return r > 0;
  }
  function zr(e) {
    return e === "serif" || e === "sans-serif" || e === "monospace" || e === "cursive" || e === "fantasy" || e === "system-ui" || e === "ui-serif" || e === "ui-sans-serif" || e === "ui-monospace" || e === "ui-rounded" || e === "math" || e === "emoji" || e === "fangsong";
  }
  function jr(e) {
    let r = 0;
    for (let n of C(e, ",")) {
      let t = n.charCodeAt(0);
      if (t >= 48 && t <= 57) return false;
      n.startsWith("var(") || (r += 1);
    }
    return r > 0;
  }
  function Cr(e) {
    return e === "xx-small" || e === "x-small" || e === "small" || e === "medium" || e === "large" || e === "x-large" || e === "xx-large" || e === "xxx-large";
  }
  function Er(e) {
    return e === "larger" || e === "smaller";
  }
  var q = /[+-]?\d*\.?\d+(?:[eE][+-]?\d+)?/, Kr = new RegExp(`^${q.source}$`);
  function Vr(e) {
    return Kr.test(e) || $e(e);
  }
  var Sr = new RegExp(`^${q.source}%$`);
  function qe(e) {
    return Sr.test(e) || $e(e);
  }
  var Or = new RegExp(`^${q.source}s*/s*${q.source}$`);
  function Nr(e) {
    return Or.test(e) || $e(e);
  }
  var Fr = [
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
  ], Wr = new RegExp(`^${q.source}(${Fr.join("|")})$`);
  function Pe(e) {
    return Wr.test(e) || $e(e);
  }
  function _r(e) {
    let r = 0;
    for (let n of C(e, " ")) {
      if (n === "center" || n === "top" || n === "right" || n === "bottom" || n === "left") {
        r += 1;
        continue;
      }
      if (!n.startsWith("var(")) {
        if (Pe(n) || qe(n)) {
          r += 1;
          continue;
        }
        return false;
      }
    }
    return r > 0;
  }
  function Ur(e) {
    let r = 0;
    for (let n of C(e, ",")) {
      if (n === "cover" || n === "contain") {
        r += 1;
        continue;
      }
      let t = C(n, " ");
      if (t.length !== 1 && t.length !== 2) return false;
      if (t.every((o) => o === "auto" || Pe(o) || qe(o))) {
        r += 1;
        continue;
      }
    }
    return r > 0;
  }
  var Dr = [
    "deg",
    "rad",
    "grad",
    "turn"
  ], Br = new RegExp(`^${q.source}(${Dr.join("|")})$`);
  function Lr(e) {
    return Br.test(e);
  }
  var Mr = new RegExp(`^${q.source} +${q.source} +${q.source}$`);
  function Rr(e) {
    return Mr.test(e);
  }
  function j(e) {
    let r = Number(e);
    return Number.isInteger(r) && r >= 0 && String(r) === String(e);
  }
  function Ge(e) {
    let r = Number(e);
    return Number.isInteger(r) && r > 0 && String(r) === String(e);
  }
  function oe(e) {
    return Pt(e, 0.25);
  }
  function Fe(e) {
    return Pt(e, 0.25);
  }
  function Pt(e, r) {
    let n = Number(e);
    return n >= 0 && n % r === 0 && String(n) === String(e);
  }
  function X(e) {
    return {
      __BARE_VALUE__: e
    };
  }
  var B = X((e) => {
    if (j(e.value)) return e.value;
  }), F = X((e) => {
    if (j(e.value)) return `${e.value}%`;
  }), P = X((e) => {
    if (j(e.value)) return `${e.value}px`;
  }), Je = X((e) => {
    if (j(e.value)) return `${e.value}ms`;
  }), fe = X((e) => {
    if (j(e.value)) return `${e.value}deg`;
  }), Ir = X((e) => {
    if (e.fraction === null) return;
    let [r, n] = C(e.fraction, "/");
    if (!(!j(r) || !j(n))) return e.fraction;
  }), Xe = X((e) => {
    if (j(Number(e.value))) return `repeat(${e.value}, minmax(0, 1fr))`;
  }), qr = {
    accentColor: ({ theme: e }) => e("colors"),
    animation: {
      none: "none",
      spin: "spin 1s linear infinite",
      ping: "ping 1s cubic-bezier(0, 0, 0.2, 1) infinite",
      pulse: "pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite",
      bounce: "bounce 1s infinite"
    },
    aria: {
      busy: 'busy="true"',
      checked: 'checked="true"',
      disabled: 'disabled="true"',
      expanded: 'expanded="true"',
      hidden: 'hidden="true"',
      pressed: 'pressed="true"',
      readonly: 'readonly="true"',
      required: 'required="true"',
      selected: 'selected="true"'
    },
    aspectRatio: {
      auto: "auto",
      square: "1 / 1",
      video: "16 / 9",
      ...Ir
    },
    backdropBlur: ({ theme: e }) => e("blur"),
    backdropBrightness: ({ theme: e }) => ({
      ...e("brightness"),
      ...F
    }),
    backdropContrast: ({ theme: e }) => ({
      ...e("contrast"),
      ...F
    }),
    backdropGrayscale: ({ theme: e }) => ({
      ...e("grayscale"),
      ...F
    }),
    backdropHueRotate: ({ theme: e }) => ({
      ...e("hueRotate"),
      ...fe
    }),
    backdropInvert: ({ theme: e }) => ({
      ...e("invert"),
      ...F
    }),
    backdropOpacity: ({ theme: e }) => ({
      ...e("opacity"),
      ...F
    }),
    backdropSaturate: ({ theme: e }) => ({
      ...e("saturate"),
      ...F
    }),
    backdropSepia: ({ theme: e }) => ({
      ...e("sepia"),
      ...F
    }),
    backgroundColor: ({ theme: e }) => e("colors"),
    backgroundImage: {
      none: "none",
      "gradient-to-t": "linear-gradient(to top, var(--tw-gradient-stops))",
      "gradient-to-tr": "linear-gradient(to top right, var(--tw-gradient-stops))",
      "gradient-to-r": "linear-gradient(to right, var(--tw-gradient-stops))",
      "gradient-to-br": "linear-gradient(to bottom right, var(--tw-gradient-stops))",
      "gradient-to-b": "linear-gradient(to bottom, var(--tw-gradient-stops))",
      "gradient-to-bl": "linear-gradient(to bottom left, var(--tw-gradient-stops))",
      "gradient-to-l": "linear-gradient(to left, var(--tw-gradient-stops))",
      "gradient-to-tl": "linear-gradient(to top left, var(--tw-gradient-stops))"
    },
    backgroundOpacity: ({ theme: e }) => e("opacity"),
    backgroundPosition: {
      bottom: "bottom",
      center: "center",
      left: "left",
      "left-bottom": "left bottom",
      "left-top": "left top",
      right: "right",
      "right-bottom": "right bottom",
      "right-top": "right top",
      top: "top"
    },
    backgroundSize: {
      auto: "auto",
      cover: "cover",
      contain: "contain"
    },
    blur: {
      0: "0",
      none: "",
      sm: "4px",
      DEFAULT: "8px",
      md: "12px",
      lg: "16px",
      xl: "24px",
      "2xl": "40px",
      "3xl": "64px"
    },
    borderColor: ({ theme: e }) => ({
      DEFAULT: "currentColor",
      ...e("colors")
    }),
    borderOpacity: ({ theme: e }) => e("opacity"),
    borderRadius: {
      none: "0px",
      sm: "0.125rem",
      DEFAULT: "0.25rem",
      md: "0.375rem",
      lg: "0.5rem",
      xl: "0.75rem",
      "2xl": "1rem",
      "3xl": "1.5rem",
      full: "9999px"
    },
    borderSpacing: ({ theme: e }) => e("spacing"),
    borderWidth: {
      DEFAULT: "1px",
      0: "0px",
      2: "2px",
      4: "4px",
      8: "8px",
      ...P
    },
    boxShadow: {
      sm: "0 1px 2px 0 rgb(0 0 0 / 0.05)",
      DEFAULT: "0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)",
      md: "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)",
      lg: "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)",
      xl: "0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)",
      "2xl": "0 25px 50px -12px rgb(0 0 0 / 0.25)",
      inner: "inset 0 2px 4px 0 rgb(0 0 0 / 0.05)",
      none: "none"
    },
    boxShadowColor: ({ theme: e }) => e("colors"),
    brightness: {
      0: "0",
      50: ".5",
      75: ".75",
      90: ".9",
      95: ".95",
      100: "1",
      105: "1.05",
      110: "1.1",
      125: "1.25",
      150: "1.5",
      200: "2",
      ...F
    },
    caretColor: ({ theme: e }) => e("colors"),
    colors: () => ({
      ...It
    }),
    columns: {
      auto: "auto",
      1: "1",
      2: "2",
      3: "3",
      4: "4",
      5: "5",
      6: "6",
      7: "7",
      8: "8",
      9: "9",
      10: "10",
      11: "11",
      12: "12",
      "3xs": "16rem",
      "2xs": "18rem",
      xs: "20rem",
      sm: "24rem",
      md: "28rem",
      lg: "32rem",
      xl: "36rem",
      "2xl": "42rem",
      "3xl": "48rem",
      "4xl": "56rem",
      "5xl": "64rem",
      "6xl": "72rem",
      "7xl": "80rem",
      ...B
    },
    container: {},
    content: {
      none: "none"
    },
    contrast: {
      0: "0",
      50: ".5",
      75: ".75",
      100: "1",
      125: "1.25",
      150: "1.5",
      200: "2",
      ...F
    },
    cursor: {
      auto: "auto",
      default: "default",
      pointer: "pointer",
      wait: "wait",
      text: "text",
      move: "move",
      help: "help",
      "not-allowed": "not-allowed",
      none: "none",
      "context-menu": "context-menu",
      progress: "progress",
      cell: "cell",
      crosshair: "crosshair",
      "vertical-text": "vertical-text",
      alias: "alias",
      copy: "copy",
      "no-drop": "no-drop",
      grab: "grab",
      grabbing: "grabbing",
      "all-scroll": "all-scroll",
      "col-resize": "col-resize",
      "row-resize": "row-resize",
      "n-resize": "n-resize",
      "e-resize": "e-resize",
      "s-resize": "s-resize",
      "w-resize": "w-resize",
      "ne-resize": "ne-resize",
      "nw-resize": "nw-resize",
      "se-resize": "se-resize",
      "sw-resize": "sw-resize",
      "ew-resize": "ew-resize",
      "ns-resize": "ns-resize",
      "nesw-resize": "nesw-resize",
      "nwse-resize": "nwse-resize",
      "zoom-in": "zoom-in",
      "zoom-out": "zoom-out"
    },
    divideColor: ({ theme: e }) => e("borderColor"),
    divideOpacity: ({ theme: e }) => e("borderOpacity"),
    divideWidth: ({ theme: e }) => ({
      ...e("borderWidth"),
      ...P
    }),
    dropShadow: {
      sm: "0 1px 1px rgb(0 0 0 / 0.05)",
      DEFAULT: [
        "0 1px 2px rgb(0 0 0 / 0.1)",
        "0 1px 1px rgb(0 0 0 / 0.06)"
      ],
      md: [
        "0 4px 3px rgb(0 0 0 / 0.07)",
        "0 2px 2px rgb(0 0 0 / 0.06)"
      ],
      lg: [
        "0 10px 8px rgb(0 0 0 / 0.04)",
        "0 4px 3px rgb(0 0 0 / 0.1)"
      ],
      xl: [
        "0 20px 13px rgb(0 0 0 / 0.03)",
        "0 8px 5px rgb(0 0 0 / 0.08)"
      ],
      "2xl": "0 25px 25px rgb(0 0 0 / 0.15)",
      none: "0 0 #0000"
    },
    fill: ({ theme: e }) => e("colors"),
    flex: {
      1: "1 1 0%",
      auto: "1 1 auto",
      initial: "0 1 auto",
      none: "none"
    },
    flexBasis: ({ theme: e }) => ({
      auto: "auto",
      "1/2": "50%",
      "1/3": "33.333333%",
      "2/3": "66.666667%",
      "1/4": "25%",
      "2/4": "50%",
      "3/4": "75%",
      "1/5": "20%",
      "2/5": "40%",
      "3/5": "60%",
      "4/5": "80%",
      "1/6": "16.666667%",
      "2/6": "33.333333%",
      "3/6": "50%",
      "4/6": "66.666667%",
      "5/6": "83.333333%",
      "1/12": "8.333333%",
      "2/12": "16.666667%",
      "3/12": "25%",
      "4/12": "33.333333%",
      "5/12": "41.666667%",
      "6/12": "50%",
      "7/12": "58.333333%",
      "8/12": "66.666667%",
      "9/12": "75%",
      "10/12": "83.333333%",
      "11/12": "91.666667%",
      full: "100%",
      ...e("spacing")
    }),
    flexGrow: {
      0: "0",
      DEFAULT: "1",
      ...B
    },
    flexShrink: {
      0: "0",
      DEFAULT: "1",
      ...B
    },
    fontFamily: {
      sans: [
        "ui-sans-serif",
        "system-ui",
        "sans-serif",
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"'
      ],
      serif: [
        "ui-serif",
        "Georgia",
        "Cambria",
        '"Times New Roman"',
        "Times",
        "serif"
      ],
      mono: [
        "ui-monospace",
        "SFMono-Regular",
        "Menlo",
        "Monaco",
        "Consolas",
        '"Liberation Mono"',
        '"Courier New"',
        "monospace"
      ]
    },
    fontSize: {
      xs: [
        "0.75rem",
        {
          lineHeight: "1rem"
        }
      ],
      sm: [
        "0.875rem",
        {
          lineHeight: "1.25rem"
        }
      ],
      base: [
        "1rem",
        {
          lineHeight: "1.5rem"
        }
      ],
      lg: [
        "1.125rem",
        {
          lineHeight: "1.75rem"
        }
      ],
      xl: [
        "1.25rem",
        {
          lineHeight: "1.75rem"
        }
      ],
      "2xl": [
        "1.5rem",
        {
          lineHeight: "2rem"
        }
      ],
      "3xl": [
        "1.875rem",
        {
          lineHeight: "2.25rem"
        }
      ],
      "4xl": [
        "2.25rem",
        {
          lineHeight: "2.5rem"
        }
      ],
      "5xl": [
        "3rem",
        {
          lineHeight: "1"
        }
      ],
      "6xl": [
        "3.75rem",
        {
          lineHeight: "1"
        }
      ],
      "7xl": [
        "4.5rem",
        {
          lineHeight: "1"
        }
      ],
      "8xl": [
        "6rem",
        {
          lineHeight: "1"
        }
      ],
      "9xl": [
        "8rem",
        {
          lineHeight: "1"
        }
      ]
    },
    fontWeight: {
      thin: "100",
      extralight: "200",
      light: "300",
      normal: "400",
      medium: "500",
      semibold: "600",
      bold: "700",
      extrabold: "800",
      black: "900"
    },
    gap: ({ theme: e }) => e("spacing"),
    gradientColorStops: ({ theme: e }) => e("colors"),
    gradientColorStopPositions: {
      "0%": "0%",
      "5%": "5%",
      "10%": "10%",
      "15%": "15%",
      "20%": "20%",
      "25%": "25%",
      "30%": "30%",
      "35%": "35%",
      "40%": "40%",
      "45%": "45%",
      "50%": "50%",
      "55%": "55%",
      "60%": "60%",
      "65%": "65%",
      "70%": "70%",
      "75%": "75%",
      "80%": "80%",
      "85%": "85%",
      "90%": "90%",
      "95%": "95%",
      "100%": "100%",
      ...F
    },
    grayscale: {
      0: "0",
      DEFAULT: "100%",
      ...F
    },
    gridAutoColumns: {
      auto: "auto",
      min: "min-content",
      max: "max-content",
      fr: "minmax(0, 1fr)"
    },
    gridAutoRows: {
      auto: "auto",
      min: "min-content",
      max: "max-content",
      fr: "minmax(0, 1fr)"
    },
    gridColumn: {
      auto: "auto",
      "span-1": "span 1 / span 1",
      "span-2": "span 2 / span 2",
      "span-3": "span 3 / span 3",
      "span-4": "span 4 / span 4",
      "span-5": "span 5 / span 5",
      "span-6": "span 6 / span 6",
      "span-7": "span 7 / span 7",
      "span-8": "span 8 / span 8",
      "span-9": "span 9 / span 9",
      "span-10": "span 10 / span 10",
      "span-11": "span 11 / span 11",
      "span-12": "span 12 / span 12",
      "span-full": "1 / -1"
    },
    gridColumnEnd: {
      auto: "auto",
      1: "1",
      2: "2",
      3: "3",
      4: "4",
      5: "5",
      6: "6",
      7: "7",
      8: "8",
      9: "9",
      10: "10",
      11: "11",
      12: "12",
      13: "13",
      ...B
    },
    gridColumnStart: {
      auto: "auto",
      1: "1",
      2: "2",
      3: "3",
      4: "4",
      5: "5",
      6: "6",
      7: "7",
      8: "8",
      9: "9",
      10: "10",
      11: "11",
      12: "12",
      13: "13",
      ...B
    },
    gridRow: {
      auto: "auto",
      "span-1": "span 1 / span 1",
      "span-2": "span 2 / span 2",
      "span-3": "span 3 / span 3",
      "span-4": "span 4 / span 4",
      "span-5": "span 5 / span 5",
      "span-6": "span 6 / span 6",
      "span-7": "span 7 / span 7",
      "span-8": "span 8 / span 8",
      "span-9": "span 9 / span 9",
      "span-10": "span 10 / span 10",
      "span-11": "span 11 / span 11",
      "span-12": "span 12 / span 12",
      "span-full": "1 / -1"
    },
    gridRowEnd: {
      auto: "auto",
      1: "1",
      2: "2",
      3: "3",
      4: "4",
      5: "5",
      6: "6",
      7: "7",
      8: "8",
      9: "9",
      10: "10",
      11: "11",
      12: "12",
      13: "13",
      ...B
    },
    gridRowStart: {
      auto: "auto",
      1: "1",
      2: "2",
      3: "3",
      4: "4",
      5: "5",
      6: "6",
      7: "7",
      8: "8",
      9: "9",
      10: "10",
      11: "11",
      12: "12",
      13: "13",
      ...B
    },
    gridTemplateColumns: {
      none: "none",
      subgrid: "subgrid",
      1: "repeat(1, minmax(0, 1fr))",
      2: "repeat(2, minmax(0, 1fr))",
      3: "repeat(3, minmax(0, 1fr))",
      4: "repeat(4, minmax(0, 1fr))",
      5: "repeat(5, minmax(0, 1fr))",
      6: "repeat(6, minmax(0, 1fr))",
      7: "repeat(7, minmax(0, 1fr))",
      8: "repeat(8, minmax(0, 1fr))",
      9: "repeat(9, minmax(0, 1fr))",
      10: "repeat(10, minmax(0, 1fr))",
      11: "repeat(11, minmax(0, 1fr))",
      12: "repeat(12, minmax(0, 1fr))",
      ...Xe
    },
    gridTemplateRows: {
      none: "none",
      subgrid: "subgrid",
      1: "repeat(1, minmax(0, 1fr))",
      2: "repeat(2, minmax(0, 1fr))",
      3: "repeat(3, minmax(0, 1fr))",
      4: "repeat(4, minmax(0, 1fr))",
      5: "repeat(5, minmax(0, 1fr))",
      6: "repeat(6, minmax(0, 1fr))",
      7: "repeat(7, minmax(0, 1fr))",
      8: "repeat(8, minmax(0, 1fr))",
      9: "repeat(9, minmax(0, 1fr))",
      10: "repeat(10, minmax(0, 1fr))",
      11: "repeat(11, minmax(0, 1fr))",
      12: "repeat(12, minmax(0, 1fr))",
      ...Xe
    },
    height: ({ theme: e }) => ({
      auto: "auto",
      "1/2": "50%",
      "1/3": "33.333333%",
      "2/3": "66.666667%",
      "1/4": "25%",
      "2/4": "50%",
      "3/4": "75%",
      "1/5": "20%",
      "2/5": "40%",
      "3/5": "60%",
      "4/5": "80%",
      "1/6": "16.666667%",
      "2/6": "33.333333%",
      "3/6": "50%",
      "4/6": "66.666667%",
      "5/6": "83.333333%",
      full: "100%",
      screen: "100vh",
      svh: "100svh",
      lvh: "100lvh",
      dvh: "100dvh",
      min: "min-content",
      max: "max-content",
      fit: "fit-content",
      ...e("spacing")
    }),
    hueRotate: {
      0: "0deg",
      15: "15deg",
      30: "30deg",
      60: "60deg",
      90: "90deg",
      180: "180deg",
      ...fe
    },
    inset: ({ theme: e }) => ({
      auto: "auto",
      "1/2": "50%",
      "1/3": "33.333333%",
      "2/3": "66.666667%",
      "1/4": "25%",
      "2/4": "50%",
      "3/4": "75%",
      full: "100%",
      ...e("spacing")
    }),
    invert: {
      0: "0",
      DEFAULT: "100%",
      ...F
    },
    keyframes: {
      spin: {
        to: {
          transform: "rotate(360deg)"
        }
      },
      ping: {
        "75%, 100%": {
          transform: "scale(2)",
          opacity: "0"
        }
      },
      pulse: {
        "50%": {
          opacity: ".5"
        }
      },
      bounce: {
        "0%, 100%": {
          transform: "translateY(-25%)",
          animationTimingFunction: "cubic-bezier(0.8,0,1,1)"
        },
        "50%": {
          transform: "none",
          animationTimingFunction: "cubic-bezier(0,0,0.2,1)"
        }
      }
    },
    letterSpacing: {
      tighter: "-0.05em",
      tight: "-0.025em",
      normal: "0em",
      wide: "0.025em",
      wider: "0.05em",
      widest: "0.1em"
    },
    lineHeight: {
      none: "1",
      tight: "1.25",
      snug: "1.375",
      normal: "1.5",
      relaxed: "1.625",
      loose: "2",
      3: ".75rem",
      4: "1rem",
      5: "1.25rem",
      6: "1.5rem",
      7: "1.75rem",
      8: "2rem",
      9: "2.25rem",
      10: "2.5rem"
    },
    listStyleType: {
      none: "none",
      disc: "disc",
      decimal: "decimal"
    },
    listStyleImage: {
      none: "none"
    },
    margin: ({ theme: e }) => ({
      auto: "auto",
      ...e("spacing")
    }),
    lineClamp: {
      1: "1",
      2: "2",
      3: "3",
      4: "4",
      5: "5",
      6: "6",
      ...B
    },
    maxHeight: ({ theme: e }) => ({
      none: "none",
      full: "100%",
      screen: "100vh",
      svh: "100svh",
      lvh: "100lvh",
      dvh: "100dvh",
      min: "min-content",
      max: "max-content",
      fit: "fit-content",
      ...e("spacing")
    }),
    maxWidth: ({ theme: e }) => ({
      none: "none",
      xs: "20rem",
      sm: "24rem",
      md: "28rem",
      lg: "32rem",
      xl: "36rem",
      "2xl": "42rem",
      "3xl": "48rem",
      "4xl": "56rem",
      "5xl": "64rem",
      "6xl": "72rem",
      "7xl": "80rem",
      full: "100%",
      min: "min-content",
      max: "max-content",
      fit: "fit-content",
      prose: "65ch",
      ...e("spacing")
    }),
    minHeight: ({ theme: e }) => ({
      full: "100%",
      screen: "100vh",
      svh: "100svh",
      lvh: "100lvh",
      dvh: "100dvh",
      min: "min-content",
      max: "max-content",
      fit: "fit-content",
      ...e("spacing")
    }),
    minWidth: ({ theme: e }) => ({
      full: "100%",
      min: "min-content",
      max: "max-content",
      fit: "fit-content",
      ...e("spacing")
    }),
    objectPosition: {
      bottom: "bottom",
      center: "center",
      left: "left",
      "left-bottom": "left bottom",
      "left-top": "left top",
      right: "right",
      "right-bottom": "right bottom",
      "right-top": "right top",
      top: "top"
    },
    opacity: {
      0: "0",
      5: "0.05",
      10: "0.1",
      15: "0.15",
      20: "0.2",
      25: "0.25",
      30: "0.3",
      35: "0.35",
      40: "0.4",
      45: "0.45",
      50: "0.5",
      55: "0.55",
      60: "0.6",
      65: "0.65",
      70: "0.7",
      75: "0.75",
      80: "0.8",
      85: "0.85",
      90: "0.9",
      95: "0.95",
      100: "1",
      ...F
    },
    order: {
      first: "-9999",
      last: "9999",
      none: "0",
      1: "1",
      2: "2",
      3: "3",
      4: "4",
      5: "5",
      6: "6",
      7: "7",
      8: "8",
      9: "9",
      10: "10",
      11: "11",
      12: "12",
      ...B
    },
    outlineColor: ({ theme: e }) => e("colors"),
    outlineOffset: {
      0: "0px",
      1: "1px",
      2: "2px",
      4: "4px",
      8: "8px",
      ...P
    },
    outlineWidth: {
      0: "0px",
      1: "1px",
      2: "2px",
      4: "4px",
      8: "8px",
      ...P
    },
    padding: ({ theme: e }) => e("spacing"),
    placeholderColor: ({ theme: e }) => e("colors"),
    placeholderOpacity: ({ theme: e }) => e("opacity"),
    ringColor: ({ theme: e }) => ({
      DEFAULT: "currentColor",
      ...e("colors")
    }),
    ringOffsetColor: ({ theme: e }) => e("colors"),
    ringOffsetWidth: {
      0: "0px",
      1: "1px",
      2: "2px",
      4: "4px",
      8: "8px",
      ...P
    },
    ringOpacity: ({ theme: e }) => ({
      DEFAULT: "0.5",
      ...e("opacity")
    }),
    ringWidth: {
      DEFAULT: "3px",
      0: "0px",
      1: "1px",
      2: "2px",
      4: "4px",
      8: "8px",
      ...P
    },
    rotate: {
      0: "0deg",
      1: "1deg",
      2: "2deg",
      3: "3deg",
      6: "6deg",
      12: "12deg",
      45: "45deg",
      90: "90deg",
      180: "180deg",
      ...fe
    },
    saturate: {
      0: "0",
      50: ".5",
      100: "1",
      150: "1.5",
      200: "2",
      ...F
    },
    scale: {
      0: "0",
      50: ".5",
      75: ".75",
      90: ".9",
      95: ".95",
      100: "1",
      105: "1.05",
      110: "1.1",
      125: "1.25",
      150: "1.5",
      ...F
    },
    screens: {
      sm: "40rem",
      md: "48rem",
      lg: "64rem",
      xl: "80rem",
      "2xl": "96rem"
    },
    scrollMargin: ({ theme: e }) => e("spacing"),
    scrollPadding: ({ theme: e }) => e("spacing"),
    sepia: {
      0: "0",
      DEFAULT: "100%",
      ...F
    },
    skew: {
      0: "0deg",
      1: "1deg",
      2: "2deg",
      3: "3deg",
      6: "6deg",
      12: "12deg",
      ...fe
    },
    space: ({ theme: e }) => e("spacing"),
    spacing: {
      px: "1px",
      0: "0px",
      0.5: "0.125rem",
      1: "0.25rem",
      1.5: "0.375rem",
      2: "0.5rem",
      2.5: "0.625rem",
      3: "0.75rem",
      3.5: "0.875rem",
      4: "1rem",
      5: "1.25rem",
      6: "1.5rem",
      7: "1.75rem",
      8: "2rem",
      9: "2.25rem",
      10: "2.5rem",
      11: "2.75rem",
      12: "3rem",
      14: "3.5rem",
      16: "4rem",
      20: "5rem",
      24: "6rem",
      28: "7rem",
      32: "8rem",
      36: "9rem",
      40: "10rem",
      44: "11rem",
      48: "12rem",
      52: "13rem",
      56: "14rem",
      60: "15rem",
      64: "16rem",
      72: "18rem",
      80: "20rem",
      96: "24rem"
    },
    stroke: ({ theme: e }) => ({
      none: "none",
      ...e("colors")
    }),
    strokeWidth: {
      0: "0",
      1: "1",
      2: "2",
      ...B
    },
    supports: {},
    data: {},
    textColor: ({ theme: e }) => e("colors"),
    textDecorationColor: ({ theme: e }) => e("colors"),
    textDecorationThickness: {
      auto: "auto",
      "from-font": "from-font",
      0: "0px",
      1: "1px",
      2: "2px",
      4: "4px",
      8: "8px",
      ...P
    },
    textIndent: ({ theme: e }) => e("spacing"),
    textOpacity: ({ theme: e }) => e("opacity"),
    textUnderlineOffset: {
      auto: "auto",
      0: "0px",
      1: "1px",
      2: "2px",
      4: "4px",
      8: "8px",
      ...P
    },
    transformOrigin: {
      center: "center",
      top: "top",
      "top-right": "top right",
      right: "right",
      "bottom-right": "bottom right",
      bottom: "bottom",
      "bottom-left": "bottom left",
      left: "left",
      "top-left": "top left"
    },
    transitionDelay: {
      0: "0s",
      75: "75ms",
      100: "100ms",
      150: "150ms",
      200: "200ms",
      300: "300ms",
      500: "500ms",
      700: "700ms",
      1e3: "1000ms",
      ...Je
    },
    transitionDuration: {
      DEFAULT: "150ms",
      0: "0s",
      75: "75ms",
      100: "100ms",
      150: "150ms",
      200: "200ms",
      300: "300ms",
      500: "500ms",
      700: "700ms",
      1e3: "1000ms",
      ...Je
    },
    transitionProperty: {
      none: "none",
      all: "all",
      DEFAULT: "color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter",
      colors: "color, background-color, border-color, outline-color, text-decoration-color, fill, stroke",
      opacity: "opacity",
      shadow: "box-shadow",
      transform: "transform"
    },
    transitionTimingFunction: {
      DEFAULT: "cubic-bezier(0.4, 0, 0.2, 1)",
      linear: "linear",
      in: "cubic-bezier(0.4, 0, 1, 1)",
      out: "cubic-bezier(0, 0, 0.2, 1)",
      "in-out": "cubic-bezier(0.4, 0, 0.2, 1)"
    },
    translate: ({ theme: e }) => ({
      "1/2": "50%",
      "1/3": "33.333333%",
      "2/3": "66.666667%",
      "1/4": "25%",
      "2/4": "50%",
      "3/4": "75%",
      full: "100%",
      ...e("spacing")
    }),
    size: ({ theme: e }) => ({
      auto: "auto",
      "1/2": "50%",
      "1/3": "33.333333%",
      "2/3": "66.666667%",
      "1/4": "25%",
      "2/4": "50%",
      "3/4": "75%",
      "1/5": "20%",
      "2/5": "40%",
      "3/5": "60%",
      "4/5": "80%",
      "1/6": "16.666667%",
      "2/6": "33.333333%",
      "3/6": "50%",
      "4/6": "66.666667%",
      "5/6": "83.333333%",
      "1/12": "8.333333%",
      "2/12": "16.666667%",
      "3/12": "25%",
      "4/12": "33.333333%",
      "5/12": "41.666667%",
      "6/12": "50%",
      "7/12": "58.333333%",
      "8/12": "66.666667%",
      "9/12": "75%",
      "10/12": "83.333333%",
      "11/12": "91.666667%",
      full: "100%",
      min: "min-content",
      max: "max-content",
      fit: "fit-content",
      ...e("spacing")
    }),
    width: ({ theme: e }) => ({
      auto: "auto",
      "1/2": "50%",
      "1/3": "33.333333%",
      "2/3": "66.666667%",
      "1/4": "25%",
      "2/4": "50%",
      "3/4": "75%",
      "1/5": "20%",
      "2/5": "40%",
      "3/5": "60%",
      "4/5": "80%",
      "1/6": "16.666667%",
      "2/6": "33.333333%",
      "3/6": "50%",
      "4/6": "66.666667%",
      "5/6": "83.333333%",
      "1/12": "8.333333%",
      "2/12": "16.666667%",
      "3/12": "25%",
      "4/12": "33.333333%",
      "5/12": "41.666667%",
      "6/12": "50%",
      "7/12": "58.333333%",
      "8/12": "66.666667%",
      "9/12": "75%",
      "10/12": "83.333333%",
      "11/12": "91.666667%",
      full: "100%",
      screen: "100vw",
      svw: "100svw",
      lvw: "100lvw",
      dvw: "100dvw",
      min: "min-content",
      max: "max-content",
      fit: "fit-content",
      ...e("spacing")
    }),
    willChange: {
      auto: "auto",
      scroll: "scroll-position",
      contents: "contents",
      transform: "transform"
    },
    zIndex: {
      auto: "auto",
      0: "0",
      10: "10",
      20: "20",
      30: "30",
      40: "40",
      50: "50",
      ...B
    }
  };
  function Ae(e) {
    if (arguments.length === 0) throw new TypeError("`CSS.escape` requires an argument.");
    let r = String(e), n = r.length, t = -1, o, l = "", a = r.charCodeAt(0);
    if (n === 1 && a === 45) return "\\" + r;
    for (; ++t < n; ) {
      if (o = r.charCodeAt(t), o === 0) {
        l += "\uFFFD";
        continue;
      }
      if (o >= 1 && o <= 31 || o === 127 || t === 0 && o >= 48 && o <= 57 || t === 1 && o >= 48 && o <= 57 && a === 45) {
        l += "\\" + o.toString(16) + " ";
        continue;
      }
      if (o >= 128 || o === 45 || o === 95 || o >= 48 && o <= 57 || o >= 65 && o <= 90 || o >= 97 && o <= 122) {
        l += r.charAt(t);
        continue;
      }
      l += "\\" + r.charAt(t);
    }
    return l;
  }
  function be(e) {
    return e.replace(/\\([\dA-Fa-f]{1,6}[\t\n\f\r ]?|[\S\s])/g, (r) => r.length > 2 ? String.fromCodePoint(Number.parseInt(r.slice(1).trim(), 16)) : r[1]);
  }
  var Ht = /* @__PURE__ */ new Map([
    [
      "--font",
      [
        "--font-weight",
        "--font-size"
      ]
    ],
    [
      "--inset",
      [
        "--inset-shadow",
        "--inset-ring"
      ]
    ],
    [
      "--text",
      [
        "--text-color",
        "--text-underline-offset",
        "--text-indent",
        "--text-decoration-thickness",
        "--text-decoration-color"
      ]
    ]
  ]);
  function Qe(e, r) {
    return (Ht.get(r) ?? []).some((n) => e === n || e.startsWith(`${n}-`));
  }
  var Pr = (_a = class {
    constructor(e = /* @__PURE__ */ new Map(), r = /* @__PURE__ */ new Set([])) {
      __privateAdd(this, _Pr_instances);
      __publicField(this, "prefix", null);
      this.values = e, this.keyframes = r;
    }
    add(e, r, n = 0) {
      if (e.endsWith("-*")) {
        if (r !== "initial") throw new Error(`Invalid theme value \`${r}\` for namespace \`${e}\``);
        e === "--*" ? this.values.clear() : this.clearNamespace(e.slice(0, -2), 0);
      }
      if (n & 4) {
        let t = this.values.get(e);
        if (t && !(t.options & 4)) return;
      }
      r === "initial" ? this.values.delete(e) : this.values.set(e, {
        value: r,
        options: n
      });
    }
    keysInNamespaces(e) {
      let r = [];
      for (let n of e) {
        let t = `${n}-`;
        for (let o of this.values.keys()) o.startsWith(t) && o.indexOf("--", 2) === -1 && (Qe(o, n) || r.push(o.slice(t.length)));
      }
      return r;
    }
    get(e) {
      for (let r of e) {
        let n = this.values.get(r);
        if (n) return n.value;
      }
      return null;
    }
    hasDefault(e) {
      return (this.getOptions(e) & 4) === 4;
    }
    getOptions(e) {
      var _a2;
      return e = be(__privateMethod(this, _Pr_instances, n_fn).call(this, e)), ((_a2 = this.values.get(e)) == null ? void 0 : _a2.options) ?? 0;
    }
    entries() {
      return this.prefix ? Array.from(this.values, (e) => (e[0] = __privateMethod(this, _Pr_instances, r_fn).call(this, e[0]), e)) : this.values.entries();
    }
    clearNamespace(e, r) {
      let n = Ht.get(e) ?? [];
      e: for (let t of this.values.keys()) if (t.startsWith(e)) {
        if (r !== 0 && (this.getOptions(t) & r) !== r) continue;
        for (let o of n) if (t.startsWith(o)) continue e;
        this.values.delete(t);
      }
    }
    markUsedVariable(e) {
      let r = be(__privateMethod(this, _Pr_instances, n_fn).call(this, e)), n = this.values.get(r);
      n && (n.options |= 16);
    }
    resolve(e, r) {
      let n = __privateMethod(this, _Pr_instances, e_fn).call(this, e, r);
      if (!n) return null;
      let t = this.values.get(n);
      return t.options & 1 ? t.value : __privateMethod(this, _Pr_instances, t_fn).call(this, n);
    }
    resolveValue(e, r) {
      let n = __privateMethod(this, _Pr_instances, e_fn).call(this, e, r);
      return n ? this.values.get(n).value : null;
    }
    resolveWith(e, r, n = []) {
      let t = __privateMethod(this, _Pr_instances, e_fn).call(this, e, r);
      if (!t) return null;
      let o = {};
      for (let a of n) {
        let u = `${t}${a}`, s = this.values.get(u);
        s && (s.options & 1 ? o[a] = s.value : o[a] = __privateMethod(this, _Pr_instances, t_fn).call(this, u));
      }
      let l = this.values.get(t);
      return l.options & 1 ? [
        l.value,
        o
      ] : [
        __privateMethod(this, _Pr_instances, t_fn).call(this, t),
        o
      ];
    }
    namespace(e) {
      let r = /* @__PURE__ */ new Map(), n = `${e}-`;
      for (let [t, o] of this.values) t === e ? r.set(null, o.value) : t.startsWith(`${n}-`) ? r.set(t.slice(e.length), o.value) : t.startsWith(n) && r.set(t.slice(n.length), o.value);
      return r;
    }
    addKeyframes(e) {
      this.keyframes.add(e);
    }
    getKeyframes() {
      return Array.from(this.keyframes);
    }
  }, _Pr_instances = new WeakSet(), r_fn = function(e) {
    return this.prefix ? `--${this.prefix}-${e.slice(2)}` : e;
  }, n_fn = function(e) {
    return this.prefix ? `--${e.slice(3 + this.prefix.length)}` : e;
  }, e_fn = function(e, r) {
    for (let n of r) {
      let t = e !== null ? `${n}-${e}` : n;
      if (!this.values.has(t)) if (e !== null && e.includes(".")) {
        if (t = `${n}-${e.replaceAll(".", "_")}`, !this.values.has(t)) continue;
      } else continue;
      if (!Qe(t, n)) return t;
    }
    return null;
  }, t_fn = function(e) {
    let r = this.values.get(e);
    if (!r) return null;
    let n = null;
    return r.options & 2 && (n = r.value), `var(${Ae(__privateMethod(this, _Pr_instances, r_fn).call(this, e))}${n ? `, ${n}` : ""})`;
  }, _a), D = class extends Map {
    constructor(e) {
      super(), this.factory = e;
    }
    get(e) {
      let r = super.get(e);
      return r === void 0 && (r = this.factory(e, this), this.set(e, r)), r;
    }
  };
  function Ee(e) {
    return {
      kind: "word",
      value: e
    };
  }
  function Hr(e, r) {
    return {
      kind: "function",
      value: e,
      nodes: r
    };
  }
  function Zr(e) {
    return {
      kind: "separator",
      value: e
    };
  }
  function re(e, r, n = null) {
    for (let t = 0; t < e.length; t++) {
      let o = e[t], l = false, a = 0, u = r(o, {
        parent: n,
        replaceWith(s) {
          l = true, Array.isArray(s) ? s.length === 0 ? (e.splice(t, 1), a = 0) : s.length === 1 ? (e[t] = s[0], a = 1) : (e.splice(t, 1, ...s), a = s.length) : e[t] = s;
        }
      }) ?? 0;
      if (l) {
        u === 0 ? t-- : t += a - 1;
        continue;
      }
      if (u === 2 || u !== 1 && o.kind === "function" && re(o.nodes, r, o) === 2) return 2;
    }
  }
  function M(e) {
    let r = "";
    for (let n of e) switch (n.kind) {
      case "word":
      case "separator": {
        r += n.value;
        break;
      }
      case "function":
        r += n.value + "(" + M(n.nodes) + ")";
    }
    return r;
  }
  var et = 92, Yr = 41, tt = 58, rt = 44, Gr = 34, nt = 61, it = 62, ot = 60, at = 10, Jr = 40, Xr = 39, lt = 47, st = 32, ut = 9;
  function U(e) {
    e = e.replaceAll(`\r
`, `
`);
    let r = [], n = [], t = null, o = "", l;
    for (let a = 0; a < e.length; a++) {
      let u = e.charCodeAt(a);
      switch (u) {
        case et: {
          o += e[a] + e[a + 1], a++;
          break;
        }
        case tt:
        case rt:
        case nt:
        case it:
        case ot:
        case at:
        case lt:
        case st:
        case ut: {
          if (o.length > 0) {
            let p = Ee(o);
            t ? t.nodes.push(p) : r.push(p), o = "";
          }
          let s = a, h = a + 1;
          for (; h < e.length && (l = e.charCodeAt(h), !(l !== tt && l !== rt && l !== nt && l !== it && l !== ot && l !== at && l !== lt && l !== st && l !== ut)); h++) ;
          a = h - 1;
          let c = Zr(e.slice(s, h));
          t ? t.nodes.push(c) : r.push(c);
          break;
        }
        case Xr:
        case Gr: {
          let s = a;
          for (let h = a + 1; h < e.length; h++) if (l = e.charCodeAt(h), l === et) h += 1;
          else if (l === u) {
            a = h;
            break;
          }
          o += e.slice(s, a + 1);
          break;
        }
        case Jr: {
          let s = Hr(o, []);
          o = "", t ? t.nodes.push(s) : r.push(s), n.push(s), t = s;
          break;
        }
        case Yr: {
          let s = n.pop();
          if (o.length > 0) {
            let h = Ee(o);
            s.nodes.push(h), o = "";
          }
          n.length > 0 ? t = n[n.length - 1] : t = null;
          break;
        }
        default:
          o += String.fromCharCode(u);
      }
    }
    return o.length > 0 && r.push(Ee(o)), r;
  }
  function Zt(e) {
    let r = [];
    return re(U(e), (n) => {
      if (!(n.kind !== "function" || n.value !== "var")) return re(n.nodes, (t) => {
        t.kind !== "word" || t.value[0] !== "-" || t.value[1] !== "-" || r.push(t.value);
      }), 1;
    }), r;
  }
  var Qr = 64;
  function S(e, r = []) {
    return {
      kind: "rule",
      selector: e,
      nodes: r
    };
  }
  function O(e, r = "", n = []) {
    return {
      kind: "at-rule",
      name: e,
      params: r,
      nodes: n
    };
  }
  function L(e, r = []) {
    return e.charCodeAt(0) === Qr ? we(e, r) : S(e, r);
  }
  function d(e, r, n = false) {
    return {
      kind: "declaration",
      property: e,
      value: r,
      important: n
    };
  }
  function Yt(e) {
    return {
      kind: "comment",
      value: e
    };
  }
  function Z(e, r) {
    return {
      kind: "context",
      context: e,
      nodes: r
    };
  }
  function E(e) {
    return {
      kind: "at-root",
      nodes: e
    };
  }
  function V(e, r, n = [], t = {}) {
    for (let o = 0; o < e.length; o++) {
      let l = e[o], a = n[n.length - 1] ?? null;
      if (l.kind === "context") {
        if (V(l.nodes, r, n, {
          ...t,
          ...l.context
        }) === 2) return 2;
        continue;
      }
      n.push(l);
      let u = false, s = 0, h = r(l, {
        parent: a,
        context: t,
        path: n,
        replaceWith(c) {
          u = true, Array.isArray(c) ? c.length === 0 ? (e.splice(o, 1), s = 0) : c.length === 1 ? (e[o] = c[0], s = 1) : (e.splice(o, 1, ...c), s = c.length) : (e[o] = c, s = 1);
        }
      }) ?? 0;
      if (n.pop(), u) {
        h === 0 ? o-- : o += s - 1;
        continue;
      }
      if (h === 2) return 2;
      if (h !== 1 && "nodes" in l) {
        n.push(l);
        let c = V(l.nodes, r, n, t);
        if (n.pop(), c === 2) return 2;
      }
    }
  }
  function We(e, r, n = [], t = {}) {
    for (let o = 0; o < e.length; o++) {
      let l = e[o], a = n[n.length - 1] ?? null;
      if (l.kind === "rule" || l.kind === "at-rule") n.push(l), We(l.nodes, r, n, t), n.pop();
      else if (l.kind === "context") {
        We(l.nodes, r, n, {
          ...t,
          ...l.context
        });
        continue;
      }
      n.push(l), r(l, {
        parent: a,
        context: t,
        path: n,
        replaceWith(u) {
          Array.isArray(u) ? u.length === 0 ? e.splice(o, 1) : u.length === 1 ? e[o] = u[0] : e.splice(o, 1, ...u) : e[o] = u, o += u.length - 1;
        }
      }), n.pop();
    }
  }
  function ae(e, r) {
    let n = [], t = /* @__PURE__ */ new Set(), o = new D(() => /* @__PURE__ */ new Set()), l = /* @__PURE__ */ new Set(), a = /* @__PURE__ */ new Set(), u = new D(() => /* @__PURE__ */ new Set());
    function s(c, p, g = {}, b = 0) {
      if (c.kind === "declaration") {
        if (c.property === "--tw-sort" || c.value === void 0 || c.value === null) return;
        if (g.theme && c.property[0] === "-" && c.property[1] === "-" && (g.keyframes || o.get(p).add(c)), c.value.includes("var(")) if (g.theme && c.property[0] === "-" && c.property[1] === "-") for (let y of Zt(c.value)) u.get(y).add(c.property);
        else r.trackUsedVariables(c.value);
        if (c.property === "animation") {
          let y = c.value.split(/\s+/);
          for (let v of y) a.add(v);
        }
        p.push(c);
      } else if (c.kind === "rule") if (c.selector === "&") for (let y of c.nodes) {
        let v = [];
        s(y, v, g, b + 1), v.length > 0 && p.push(...v);
      }
      else {
        let y = {
          ...c,
          nodes: []
        };
        for (let v of c.nodes) s(v, y.nodes, g, b + 1);
        y.nodes.length > 0 && p.push(y);
      }
      else if (c.kind === "at-rule" && c.name === "@property" && b === 0) {
        if (t.has(c.params)) return;
        t.add(c.params);
        let y = {
          ...c,
          nodes: []
        };
        for (let v of c.nodes) s(v, y.nodes, g, b + 1);
        p.push(y);
      } else if (c.kind === "at-rule") {
        c.name === "@keyframes" && (g = {
          ...g,
          keyframes: true
        });
        let y = {
          ...c,
          nodes: []
        };
        for (let v of c.nodes) s(v, y.nodes, g, b + 1);
        c.name === "@keyframes" && g.theme && l.add(y), (y.nodes.length > 0 || y.name === "@layer" || y.name === "@charset" || y.name === "@custom-media" || y.name === "@namespace" || y.name === "@import") && p.push(y);
      } else if (c.kind === "at-root") for (let y of c.nodes) {
        let v = [];
        s(y, v, g, 0);
        for (let i of v) n.push(i);
      }
      else if (c.kind === "context") {
        if (c.context.reference) return;
        for (let y of c.nodes) s(y, p, {
          ...g,
          ...c.context
        }, b);
      } else c.kind === "comment" && p.push(c);
    }
    let h = [];
    for (let c of e) s(c, h, {}, 0);
    e: for (let [c, p] of o) for (let g of p) {
      if (Gt(g.property, r.theme, u)) {
        if (g.property.startsWith("--animate-")) {
          let y = g.value.split(/\s+/);
          for (let v of y) a.add(v);
        }
        continue;
      }
      let b = c.indexOf(g);
      if (c.splice(b, 1), c.length === 0) {
        let y = en(h, (v) => v.kind === "rule" && v.nodes === c);
        if (!y || y.length === 0) continue e;
        y.unshift({
          kind: "at-root",
          nodes: h
        });
        do {
          let v = y.pop();
          if (!v) break;
          let i = y[y.length - 1];
          if (!i || i.kind !== "at-root" && i.kind !== "at-rule") break;
          let f = i.nodes.indexOf(v);
          if (f === -1) break;
          i.nodes.splice(f, 1);
        } while (true);
        continue e;
      }
    }
    for (let c of l) if (!a.has(c.params)) {
      let p = n.indexOf(c);
      n.splice(p, 1);
    }
    return h.concat(n);
  }
  function J(e) {
    function r(t, o = 0) {
      let l = "", a = "  ".repeat(o);
      if (t.kind === "declaration") l += `${a}${t.property}: ${t.value}${t.important ? " !important" : ""};
`;
      else if (t.kind === "rule") {
        l += `${a}${t.selector} {
`;
        for (let u of t.nodes) l += r(u, o + 1);
        l += `${a}}
`;
      } else if (t.kind === "at-rule") {
        if (t.nodes.length === 0) return `${a}${t.name} ${t.params};
`;
        l += `${a}${t.name}${t.params ? ` ${t.params} ` : " "}{
`;
        for (let u of t.nodes) l += r(u, o + 1);
        l += `${a}}
`;
      } else if (t.kind === "comment") l += `${a}/*${t.value}*/
`;
      else if (t.kind === "context" || t.kind === "at-root") return "";
      return l;
    }
    let n = "";
    for (let t of e) {
      let o = r(t);
      o !== "" && (n += o);
    }
    return n;
  }
  function en(e, r) {
    let n = [];
    return V(e, (t, { path: o }) => {
      if (r(t)) return n = [
        ...o
      ], 2;
    }), n;
  }
  function Gt(e, r, n, t = /* @__PURE__ */ new Set()) {
    if (t.has(e) || (t.add(e), r.getOptions(e) & 24)) return true;
    {
      let o = n.get(e) ?? [];
      for (let l of o) if (Gt(l, r, n, t)) return true;
    }
    return false;
  }
  var ne = 92, pe = 47, he = 42, tn = 34, rn = 39, nn = 58, me = 59, H = 10, le = 32, ge = 9, ct = 123, Ke = 125, _e = 40, dt = 41, on = 91, an = 93, ft = 45, Ve = 64, ln = 33;
  function Te(e) {
    e[0] === "\uFEFF" && (e = e.slice(1)), e = e.replaceAll(`\r
`, `
`);
    let r = [], n = [], t = [], o = null, l = null, a = "", u = "", s;
    for (let h = 0; h < e.length; h++) {
      let c = e.charCodeAt(h);
      if (c === ne) a += e.slice(h, h + 2), h += 1;
      else if (c === pe && e.charCodeAt(h + 1) === he) {
        let p = h;
        for (let b = h + 2; b < e.length; b++) if (s = e.charCodeAt(b), s === ne) b += 1;
        else if (s === he && e.charCodeAt(b + 1) === pe) {
          h = b + 1;
          break;
        }
        let g = e.slice(p, h + 1);
        g.charCodeAt(2) === ln && n.push(Yt(g.slice(2, -2)));
      } else if (c === rn || c === tn) {
        let p = h;
        for (let g = h + 1; g < e.length; g++) if (s = e.charCodeAt(g), s === ne) g += 1;
        else if (s === c) {
          h = g;
          break;
        } else {
          if (s === me && e.charCodeAt(g + 1) === H) throw new Error(`Unterminated string: ${e.slice(p, g + 1) + String.fromCharCode(c)}`);
          if (s === H) throw new Error(`Unterminated string: ${e.slice(p, g) + String.fromCharCode(c)}`);
        }
        a += e.slice(p, h + 1);
      } else {
        if ((c === le || c === H || c === ge) && (s = e.charCodeAt(h + 1)) && (s === le || s === H || s === ge)) continue;
        if (c === H) {
          if (a.length === 0) continue;
          s = a.charCodeAt(a.length - 1), s !== le && s !== H && s !== ge && (a += " ");
        } else if (c === ft && e.charCodeAt(h + 1) === ft && a.length === 0) {
          let p = "", g = h, b = -1;
          for (let v = h + 2; v < e.length; v++) if (s = e.charCodeAt(v), s === ne) v += 1;
          else if (s === pe && e.charCodeAt(v + 1) === he) {
            for (let i = v + 2; i < e.length; i++) if (s = e.charCodeAt(i), s === ne) i += 1;
            else if (s === he && e.charCodeAt(i + 1) === pe) {
              v = i + 1;
              break;
            }
          } else if (b === -1 && s === nn) b = a.length + v - g;
          else if (s === me && p.length === 0) {
            a += e.slice(g, v), h = v;
            break;
          } else if (s === _e) p += ")";
          else if (s === on) p += "]";
          else if (s === ct) p += "}";
          else if ((s === Ke || e.length - 1 === v) && p.length === 0) {
            h = v - 1, a += e.slice(g, v);
            break;
          } else (s === dt || s === an || s === Ke) && p.length > 0 && e[v] === p[p.length - 1] && (p = p.slice(0, -1));
          let y = Se(a, b);
          if (!y) throw new Error("Invalid custom property, expected a value");
          o ? o.nodes.push(y) : r.push(y), a = "";
        } else if (c === me && a.charCodeAt(0) === Ve) l = we(a), o ? o.nodes.push(l) : r.push(l), a = "", l = null;
        else if (c === me && u[u.length - 1] !== ")") {
          let p = Se(a);
          if (!p) throw a.length === 0 ? new Error("Unexpected semicolon") : new Error(`Invalid declaration: \`${a.trim()}\``);
          o ? o.nodes.push(p) : r.push(p), a = "";
        } else if (c === ct && u[u.length - 1] !== ")") u += "}", l = L(a.trim()), o && o.nodes.push(l), t.push(o), o = l, a = "", l = null;
        else if (c === Ke && u[u.length - 1] !== ")") {
          if (u === "") throw new Error("Missing opening {");
          if (u = u.slice(0, -1), a.length > 0) if (a.charCodeAt(0) === Ve) l = we(a), o ? o.nodes.push(l) : r.push(l), a = "", l = null;
          else {
            let g = a.indexOf(":");
            if (o) {
              let b = Se(a, g);
              if (!b) throw new Error(`Invalid declaration: \`${a.trim()}\``);
              o.nodes.push(b);
            }
          }
          let p = t.pop() ?? null;
          p === null && o && r.push(o), o = p, a = "", l = null;
        } else if (c === _e) u += ")", a += "(";
        else if (c === dt) {
          if (u[u.length - 1] !== ")") throw new Error("Missing opening (");
          u = u.slice(0, -1), a += ")";
        } else {
          if (a.length === 0 && (c === le || c === H || c === ge)) continue;
          a += String.fromCharCode(c);
        }
      }
    }
    if (a.charCodeAt(0) === Ve && r.push(we(a)), u.length > 0 && o) {
      if (o.kind === "rule") throw new Error(`Missing closing } at ${o.selector}`);
      if (o.kind === "at-rule") throw new Error(`Missing closing } at ${o.name} ${o.params}`);
    }
    return n.length > 0 ? n.concat(r) : r;
  }
  function we(e, r = []) {
    for (let n = 5; n < e.length; n++) {
      let t = e.charCodeAt(n);
      if (t === le || t === _e) {
        let o = e.slice(0, n).trim(), l = e.slice(n).trim();
        return O(o, l, r);
      }
    }
    return O(e.trim(), "", r);
  }
  function Se(e, r = e.indexOf(":")) {
    if (r === -1) return null;
    let n = e.indexOf("!important", r + 1);
    return d(e.slice(0, r).trim(), e.slice(r + 1, n === -1 ? e.length : n).trim(), n !== -1);
  }
  var sn = "4.0.9";
  function Y(e) {
    if (e.indexOf("(") === -1) return te(e);
    let r = U(e);
    return Ue(r), e = M(r), e = br(e), e;
  }
  function te(e, r = false) {
    let n = "";
    for (let t = 0; t < e.length; t++) {
      let o = e[t];
      o === "\\" && e[t + 1] === "_" ? (n += "_", t += 1) : o === "_" && !r ? n += " " : n += o;
    }
    return n;
  }
  function Ue(e) {
    for (let r of e) switch (r.kind) {
      case "function": {
        if (r.value === "url" || r.value.endsWith("_url")) {
          r.value = te(r.value);
          break;
        }
        if (r.value === "var" || r.value.endsWith("_var") || r.value === "theme" || r.value.endsWith("_theme")) {
          r.value = te(r.value);
          for (let n = 0; n < r.nodes.length; n++) {
            if (n == 0 && r.nodes[n].kind === "word") {
              r.nodes[n].value = te(r.nodes[n].value, true);
              continue;
            }
            Ue([
              r.nodes[n]
            ]);
          }
          break;
        }
        r.value = te(r.value), Ue(r.nodes);
        break;
      }
      case "separator":
      case "word": {
        r.value = te(r.value);
        break;
      }
      default:
        un(r);
    }
  }
  function un(e) {
    throw new Error(`Unexpected value: ${e}`);
  }
  var cn = 58, pt = 45, ht = 97, mt = 122;
  function* dn(e, r) {
    var _a2;
    let n = C(e, ":");
    if (r.theme.prefix) {
      if (n.length === 1 || n[0] !== r.theme.prefix) return null;
      n.shift();
    }
    let t = n.pop(), o = [];
    for (let p = n.length - 1; p >= 0; --p) {
      let g = r.parseVariant(n[p]);
      if (g === null) return;
      o.push(g);
    }
    let l = false;
    t[t.length - 1] === "!" ? (l = true, t = t.slice(0, -1)) : t[0] === "!" && (l = true, t = t.slice(1)), r.utilities.has(t, "static") && !t.includes("[") && (yield {
      kind: "static",
      root: t,
      variants: o,
      important: l,
      raw: e
    });
    let [a, u = null, s] = C(t, "/");
    if (s) return;
    let h = u === null ? null : De(u);
    if (u !== null && h === null) return;
    if (a[0] === "[") {
      if (a[a.length - 1] !== "]") return;
      let p = a.charCodeAt(1);
      if (p !== pt && !(p >= ht && p <= mt)) return;
      a = a.slice(1, -1);
      let g = a.indexOf(":");
      if (g === -1 || g === 0 || g === a.length - 1) return;
      let b = a.slice(0, g), y = Y(a.slice(g + 1));
      yield {
        kind: "arbitrary",
        property: b,
        value: y,
        modifier: h,
        variants: o,
        important: l,
        raw: e
      };
      return;
    }
    let c;
    if (a[a.length - 1] === "]") {
      let p = a.indexOf("-[");
      if (p === -1) return;
      let g = a.slice(0, p);
      if (!r.utilities.has(g, "functional")) return;
      let b = a.slice(p + 1);
      c = [
        [
          g,
          b
        ]
      ];
    } else if (a[a.length - 1] === ")") {
      let p = a.indexOf("-(");
      if (p === -1) return;
      let g = a.slice(0, p);
      if (!r.utilities.has(g, "functional")) return;
      let b = a.slice(p + 2, -1), y = C(b, ":"), v = null;
      if (y.length === 2 && (v = y[0], b = y[1]), b[0] !== "-" && b[1] !== "-") return;
      c = [
        [
          g,
          v === null ? `[var(${b})]` : `[${v}:var(${b})]`
        ]
      ];
    } else c = Jt(a, (p) => r.utilities.has(p, "functional"));
    for (let [p, g] of c) {
      let b = {
        kind: "functional",
        root: p,
        modifier: h,
        value: null,
        variants: o,
        important: l,
        raw: e
      };
      if (g === null) {
        yield b;
        continue;
      }
      {
        let y = g.indexOf("[");
        if (y !== -1) {
          if (g[g.length - 1] !== "]") return;
          let v = Y(g.slice(y + 1, -1)), i = "";
          for (let f = 0; f < v.length; f++) {
            let m = v.charCodeAt(f);
            if (m === cn) {
              i = v.slice(0, f), v = v.slice(f + 1);
              break;
            }
            if (!(m === pt || m >= ht && m <= mt)) break;
          }
          if (v.length === 0 || v.trim().length === 0) continue;
          b.value = {
            kind: "arbitrary",
            dataType: i || null,
            value: v
          };
        } else {
          let v = u === null || ((_a2 = b.modifier) == null ? void 0 : _a2.kind) === "arbitrary" ? null : `${g}/${u}`;
          b.value = {
            kind: "named",
            value: g,
            fraction: v
          };
        }
      }
      yield b;
    }
  }
  function De(e) {
    if (e[0] === "[" && e[e.length - 1] === "]") {
      let r = Y(e.slice(1, -1));
      return r.length === 0 || r.trim().length === 0 ? null : {
        kind: "arbitrary",
        value: r
      };
    }
    if (e[0] === "(" && e[e.length - 1] === ")") {
      let r = Y(e.slice(1, -1));
      return r.length === 0 || r.trim().length === 0 || r[0] !== "-" && r[1] !== "-" ? null : {
        kind: "arbitrary",
        value: `var(${r})`
      };
    }
    return {
      kind: "named",
      value: e
    };
  }
  function fn(e, r) {
    if (e[0] === "[" && e[e.length - 1] === "]") {
      if (e[1] === "@" && e.includes("&")) return null;
      let n = Y(e.slice(1, -1));
      if (n.length === 0 || n.trim().length === 0) return null;
      let t = n[0] === ">" || n[0] === "+" || n[0] === "~";
      return !t && n[0] !== "@" && !n.includes("&") && (n = `&:is(${n})`), {
        kind: "arbitrary",
        selector: n,
        relative: t
      };
    }
    {
      let [n, t = null, o] = C(e, "/");
      if (o) return null;
      let l = Jt(n, (a) => r.variants.has(a));
      for (let [a, u] of l) switch (r.variants.kind(a)) {
        case "static":
          return u !== null || t !== null ? null : {
            kind: "static",
            root: a
          };
        case "functional": {
          let s = t === null ? null : De(t);
          if (t !== null && s === null) return null;
          if (u === null) return {
            kind: "functional",
            root: a,
            modifier: s,
            value: null
          };
          if (u[u.length - 1] === "]") {
            if (u[0] !== "[") continue;
            let h = Y(u.slice(1, -1));
            return h.length === 0 || h.trim().length === 0 ? null : {
              kind: "functional",
              root: a,
              modifier: s,
              value: {
                kind: "arbitrary",
                value: h
              }
            };
          }
          if (u[u.length - 1] === ")") {
            if (u[0] !== "(") continue;
            let h = Y(u.slice(1, -1));
            return h.length === 0 || h.trim().length === 0 || h[0] !== "-" && h[1] !== "-" ? null : {
              kind: "functional",
              root: a,
              modifier: s,
              value: {
                kind: "arbitrary",
                value: `var(${h})`
              }
            };
          }
          return {
            kind: "functional",
            root: a,
            modifier: s,
            value: {
              kind: "named",
              value: u
            }
          };
        }
        case "compound": {
          if (u === null) return null;
          let s = r.parseVariant(u);
          if (s === null || !r.variants.compoundsWith(a, s)) return null;
          let h = t === null ? null : De(t);
          return t !== null && h === null ? null : {
            kind: "compound",
            root: a,
            modifier: h,
            variant: s
          };
        }
      }
    }
    return null;
  }
  function* Jt(e, r) {
    r(e) && (yield [
      e,
      null
    ]);
    let n = e.lastIndexOf("-");
    if (n === -1) {
      e[0] === "@" && r("@") && (yield [
        "@",
        e.slice(1)
      ]);
      return;
    }
    do {
      let t = e.slice(0, n);
      if (r(t)) {
        let o = [
          t,
          e.slice(n + 1)
        ];
        if (o[1] === "") break;
        yield o;
      }
      n = e.lastIndexOf("-", n - 1);
    } while (n > 0);
  }
  function ye(e, r, n) {
    if (e === r) return 0;
    let t = e.indexOf("("), o = r.indexOf("("), l = t === -1 ? e.replace(/[\d.]+/g, "") : e.slice(0, t), a = o === -1 ? r.replace(/[\d.]+/g, "") : r.slice(0, o), u = (l === a ? 0 : l < a ? -1 : 1) || (n === "asc" ? parseInt(e) - parseInt(r) : parseInt(r) - parseInt(e));
    return Number.isNaN(u) ? e < r ? -1 : 1 : u;
  }
  var pn = /* @__PURE__ */ new Set([
    "inset",
    "inherit",
    "initial",
    "revert",
    "unset"
  ]), gt = /^-?(\d+|\.\d+)(.*?)$/g;
  function Q(e, r) {
    return C(e, ",").map((n) => {
      n = n.trim();
      let t = C(n, " ").filter((s) => s.trim() !== ""), o = null, l = null, a = null;
      for (let s of t) pn.has(s) || (gt.test(s) ? (l === null ? l = s : a === null && (a = s), gt.lastIndex = 0) : o === null && (o = s));
      if (l === null || a === null) return n;
      let u = r(o ?? "currentcolor");
      return o !== null ? n.replace(o, u) : `${n} ${u}`;
    }).join(", ");
  }
  var hn = /^-?[a-z][a-zA-Z0-9/%._-]*$/, mn = /^-?[a-z][a-zA-Z0-9/%._-]*-\*$/, gn = class {
    constructor() {
      __publicField(this, "utilities", new D(() => []));
      __publicField(this, "completions", /* @__PURE__ */ new Map());
    }
    static(e, r) {
      this.utilities.get(e).push({
        kind: "static",
        compileFn: r
      });
    }
    functional(e, r, n) {
      this.utilities.get(e).push({
        kind: "functional",
        compileFn: r,
        options: n
      });
    }
    has(e, r) {
      return this.utilities.has(e) && this.utilities.get(e).some((n) => n.kind === r);
    }
    get(e) {
      return this.utilities.has(e) ? this.utilities.get(e) : [];
    }
    getCompletions(e) {
      var _a2;
      return ((_a2 = this.completions.get(e)) == null ? void 0 : _a2()) ?? [];
    }
    suggest(e, r) {
      this.completions.set(e, r);
    }
    keys(e) {
      let r = [];
      for (let [n, t] of this.utilities.entries()) for (let o of t) if (o.kind === e) {
        r.push(n);
        break;
      }
      return r;
    }
  };
  function T(e, r, n) {
    return O("@property", e, [
      d("syntax", n ? `"${n}"` : '"*"'),
      d("inherits", "false"),
      ...r ? [
        d("initial-value", r)
      ] : []
    ]);
  }
  function G(e, r) {
    if (r === null) return e;
    let n = Number(r);
    return Number.isNaN(n) || (r = `${n * 100}%`), `color-mix(in oklab, ${e} ${r}, transparent)`;
  }
  function W(e, r, n) {
    if (!r) return e;
    if (r.kind === "arbitrary") return G(e, r.value);
    let t = n.resolve(r.value, [
      "--opacity"
    ]);
    return t ? G(e, t) : Fe(r.value) ? G(e, `${r.value}%`) : null;
  }
  function _(e, r, n) {
    let t = null;
    switch (e.value.value) {
      case "inherit": {
        t = "inherit";
        break;
      }
      case "transparent": {
        t = "transparent";
        break;
      }
      case "current": {
        t = "currentColor";
        break;
      }
      default: {
        t = r.resolve(e.value.value, n);
        break;
      }
    }
    return t ? W(t, e.modifier, r) : null;
  }
  function vn(e) {
    let r = new gn();
    function n(i, f) {
      let m = /(\d+)_(\d+)/g;
      function* k(x) {
        for (let z of e.keysInNamespaces(x)) yield z.replace(m, (A, $, K) => `${$}.${K}`);
      }
      let w = [
        "1/2",
        "1/3",
        "2/3",
        "1/4",
        "2/4",
        "3/4",
        "1/5",
        "2/5",
        "3/5",
        "4/5",
        "1/6",
        "2/6",
        "3/6",
        "4/6",
        "5/6",
        "1/12",
        "2/12",
        "3/12",
        "4/12",
        "5/12",
        "6/12",
        "7/12",
        "8/12",
        "9/12",
        "10/12",
        "11/12"
      ];
      r.suggest(i, () => {
        let x = [];
        for (let z of f()) {
          if (typeof z == "string") {
            x.push({
              values: [
                z
              ],
              modifiers: []
            });
            continue;
          }
          let A = [
            ...z.values ?? [],
            ...k(z.valueThemeKeys ?? [])
          ], $ = [
            ...z.modifiers ?? [],
            ...k(z.modifierThemeKeys ?? [])
          ];
          z.supportsFractions && A.push(...w), z.hasDefaultValue && A.unshift(null), x.push({
            supportsNegative: z.supportsNegative,
            values: A,
            modifiers: $
          });
        }
        return x;
      });
    }
    function t(i, f) {
      r.static(i, () => f.map((m) => typeof m == "function" ? m() : d(m[0], m[1])));
    }
    function o(i, f) {
      function m({ negative: k }) {
        return (w) => {
          let x = null;
          if (w.value) if (w.value.kind === "arbitrary") {
            if (w.modifier) return;
            x = w.value.value;
          } else {
            if (x = e.resolve(w.value.fraction ?? w.value.value, f.themeKeys ?? []), x === null && f.supportsFractions && w.value.fraction) {
              let [z, A] = C(w.value.fraction, "/");
              if (!j(z) || !j(A)) return;
              x = `calc(${w.value.fraction} * 100%)`;
            }
            if (x === null && k && f.handleNegativeBareValue) {
              if (x = f.handleNegativeBareValue(w.value), !(x == null ? void 0 : x.includes("/")) && w.modifier) return;
              if (x !== null) return f.handle(x);
            }
            if (x === null && f.handleBareValue && (x = f.handleBareValue(w.value), !(x == null ? void 0 : x.includes("/")) && w.modifier)) return;
          }
          else {
            if (w.modifier) return;
            x = f.defaultValue !== void 0 ? f.defaultValue : e.resolve(null, f.themeKeys ?? []);
          }
          if (x !== null) return f.handle(k ? `calc(${x} * -1)` : x);
        };
      }
      f.supportsNegative && r.functional(`-${i}`, m({
        negative: true
      })), r.functional(i, m({
        negative: false
      })), n(i, () => [
        {
          supportsNegative: f.supportsNegative,
          valueThemeKeys: f.themeKeys ?? [],
          hasDefaultValue: f.defaultValue !== void 0 && f.defaultValue !== null,
          supportsFractions: f.supportsFractions
        }
      ]);
    }
    function l(i, f) {
      r.functional(i, (m) => {
        if (!m.value) return;
        let k = null;
        if (m.value.kind === "arbitrary" ? (k = m.value.value, k = W(k, m.modifier, e)) : k = _(m, e, f.themeKeys), k !== null) return f.handle(k);
      }), n(i, () => [
        {
          values: [
            "current",
            "inherit",
            "transparent"
          ],
          valueThemeKeys: f.themeKeys,
          modifiers: Array.from({
            length: 21
          }, (m, k) => `${k * 5}`)
        }
      ]);
    }
    function a(i, f, m, { supportsNegative: k = false, supportsFractions: w = false } = {}) {
      k && r.static(`-${i}-px`, () => m("-1px")), r.static(`${i}-px`, () => m("1px")), o(i, {
        themeKeys: f,
        supportsFractions: w,
        supportsNegative: k,
        defaultValue: null,
        handleBareValue: ({ value: x }) => {
          let z = e.resolve(null, [
            "--spacing"
          ]);
          return !z || !oe(x) ? null : `calc(${z} * ${x})`;
        },
        handleNegativeBareValue: ({ value: x }) => {
          let z = e.resolve(null, [
            "--spacing"
          ]);
          return !z || !oe(x) ? null : `calc(${z} * -${x})`;
        },
        handle: m
      }), n(i, () => [
        {
          values: e.get([
            "--spacing"
          ]) ? [
            "0",
            "0.5",
            "1",
            "1.5",
            "2",
            "2.5",
            "3",
            "3.5",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
            "11",
            "12",
            "14",
            "16",
            "20",
            "24",
            "28",
            "32",
            "36",
            "40",
            "44",
            "48",
            "52",
            "56",
            "60",
            "64",
            "72",
            "80",
            "96"
          ] : [],
          supportsNegative: k,
          supportsFractions: w,
          valueThemeKeys: f
        }
      ]);
    }
    t("sr-only", [
      [
        "position",
        "absolute"
      ],
      [
        "width",
        "1px"
      ],
      [
        "height",
        "1px"
      ],
      [
        "padding",
        "0"
      ],
      [
        "margin",
        "-1px"
      ],
      [
        "overflow",
        "hidden"
      ],
      [
        "clip",
        "rect(0, 0, 0, 0)"
      ],
      [
        "white-space",
        "nowrap"
      ],
      [
        "border-width",
        "0"
      ]
    ]), t("not-sr-only", [
      [
        "position",
        "static"
      ],
      [
        "width",
        "auto"
      ],
      [
        "height",
        "auto"
      ],
      [
        "padding",
        "0"
      ],
      [
        "margin",
        "0"
      ],
      [
        "overflow",
        "visible"
      ],
      [
        "clip",
        "auto"
      ],
      [
        "white-space",
        "normal"
      ]
    ]), t("pointer-events-none", [
      [
        "pointer-events",
        "none"
      ]
    ]), t("pointer-events-auto", [
      [
        "pointer-events",
        "auto"
      ]
    ]), t("visible", [
      [
        "visibility",
        "visible"
      ]
    ]), t("invisible", [
      [
        "visibility",
        "hidden"
      ]
    ]), t("collapse", [
      [
        "visibility",
        "collapse"
      ]
    ]), t("static", [
      [
        "position",
        "static"
      ]
    ]), t("fixed", [
      [
        "position",
        "fixed"
      ]
    ]), t("absolute", [
      [
        "position",
        "absolute"
      ]
    ]), t("relative", [
      [
        "position",
        "relative"
      ]
    ]), t("sticky", [
      [
        "position",
        "sticky"
      ]
    ]);
    for (let [i, f] of [
      [
        "inset",
        "inset"
      ],
      [
        "inset-x",
        "inset-inline"
      ],
      [
        "inset-y",
        "inset-block"
      ],
      [
        "start",
        "inset-inline-start"
      ],
      [
        "end",
        "inset-inline-end"
      ],
      [
        "top",
        "top"
      ],
      [
        "right",
        "right"
      ],
      [
        "bottom",
        "bottom"
      ],
      [
        "left",
        "left"
      ]
    ]) t(`${i}-auto`, [
      [
        f,
        "auto"
      ]
    ]), t(`${i}-full`, [
      [
        f,
        "100%"
      ]
    ]), t(`-${i}-full`, [
      [
        f,
        "-100%"
      ]
    ]), a(i, [
      "--inset",
      "--spacing"
    ], (m) => [
      d(f, m)
    ], {
      supportsNegative: true,
      supportsFractions: true
    });
    t("isolate", [
      [
        "isolation",
        "isolate"
      ]
    ]), t("isolation-auto", [
      [
        "isolation",
        "auto"
      ]
    ]), t("z-auto", [
      [
        "z-index",
        "auto"
      ]
    ]), o("z", {
      supportsNegative: true,
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      themeKeys: [
        "--z-index"
      ],
      handle: (i) => [
        d("z-index", i)
      ]
    }), n("z", () => [
      {
        supportsNegative: true,
        values: [
          "0",
          "10",
          "20",
          "30",
          "40",
          "50"
        ],
        valueThemeKeys: [
          "--z-index"
        ]
      }
    ]), t("order-first", [
      [
        "order",
        "-9999"
      ]
    ]), t("order-last", [
      [
        "order",
        "9999"
      ]
    ]), t("order-none", [
      [
        "order",
        "0"
      ]
    ]), o("order", {
      supportsNegative: true,
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      themeKeys: [
        "--order"
      ],
      handle: (i) => [
        d("order", i)
      ]
    }), n("order", () => [
      {
        supportsNegative: true,
        values: Array.from({
          length: 12
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: [
          "--order"
        ]
      }
    ]), t("col-auto", [
      [
        "grid-column",
        "auto"
      ]
    ]), o("col", {
      themeKeys: [
        "--grid-column"
      ],
      handle: (i) => [
        d("grid-column", i)
      ]
    }), t("col-span-full", [
      [
        "grid-column",
        "1 / -1"
      ]
    ]), o("col-span", {
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      handle: (i) => [
        d("grid-column", `span ${i} / span ${i}`)
      ]
    }), t("col-start-auto", [
      [
        "grid-column-start",
        "auto"
      ]
    ]), o("col-start", {
      supportsNegative: true,
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      themeKeys: [
        "--grid-column-start"
      ],
      handle: (i) => [
        d("grid-column-start", i)
      ]
    }), t("col-end-auto", [
      [
        "grid-column-end",
        "auto"
      ]
    ]), o("col-end", {
      supportsNegative: true,
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      themeKeys: [
        "--grid-column-end"
      ],
      handle: (i) => [
        d("grid-column-end", i)
      ]
    }), n("col-span", () => [
      {
        values: Array.from({
          length: 12
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: []
      }
    ]), n("col-start", () => [
      {
        supportsNegative: true,
        values: Array.from({
          length: 13
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: [
          "--grid-column-start"
        ]
      }
    ]), n("col-end", () => [
      {
        supportsNegative: true,
        values: Array.from({
          length: 13
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: [
          "--grid-column-end"
        ]
      }
    ]), t("row-auto", [
      [
        "grid-row",
        "auto"
      ]
    ]), o("row", {
      themeKeys: [
        "--grid-row"
      ],
      handle: (i) => [
        d("grid-row", i)
      ]
    }), t("row-span-full", [
      [
        "grid-row",
        "1 / -1"
      ]
    ]), o("row-span", {
      themeKeys: [],
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      handle: (i) => [
        d("grid-row", `span ${i} / span ${i}`)
      ]
    }), t("row-start-auto", [
      [
        "grid-row-start",
        "auto"
      ]
    ]), o("row-start", {
      supportsNegative: true,
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      themeKeys: [
        "--grid-row-start"
      ],
      handle: (i) => [
        d("grid-row-start", i)
      ]
    }), t("row-end-auto", [
      [
        "grid-row-end",
        "auto"
      ]
    ]), o("row-end", {
      supportsNegative: true,
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      themeKeys: [
        "--grid-row-end"
      ],
      handle: (i) => [
        d("grid-row-end", i)
      ]
    }), n("row-span", () => [
      {
        values: Array.from({
          length: 12
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: []
      }
    ]), n("row-start", () => [
      {
        supportsNegative: true,
        values: Array.from({
          length: 13
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: [
          "--grid-row-start"
        ]
      }
    ]), n("row-end", () => [
      {
        supportsNegative: true,
        values: Array.from({
          length: 13
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: [
          "--grid-row-end"
        ]
      }
    ]), t("float-start", [
      [
        "float",
        "inline-start"
      ]
    ]), t("float-end", [
      [
        "float",
        "inline-end"
      ]
    ]), t("float-right", [
      [
        "float",
        "right"
      ]
    ]), t("float-left", [
      [
        "float",
        "left"
      ]
    ]), t("float-none", [
      [
        "float",
        "none"
      ]
    ]), t("clear-start", [
      [
        "clear",
        "inline-start"
      ]
    ]), t("clear-end", [
      [
        "clear",
        "inline-end"
      ]
    ]), t("clear-right", [
      [
        "clear",
        "right"
      ]
    ]), t("clear-left", [
      [
        "clear",
        "left"
      ]
    ]), t("clear-both", [
      [
        "clear",
        "both"
      ]
    ]), t("clear-none", [
      [
        "clear",
        "none"
      ]
    ]);
    for (let [i, f] of [
      [
        "m",
        "margin"
      ],
      [
        "mx",
        "margin-inline"
      ],
      [
        "my",
        "margin-block"
      ],
      [
        "ms",
        "margin-inline-start"
      ],
      [
        "me",
        "margin-inline-end"
      ],
      [
        "mt",
        "margin-top"
      ],
      [
        "mr",
        "margin-right"
      ],
      [
        "mb",
        "margin-bottom"
      ],
      [
        "ml",
        "margin-left"
      ]
    ]) t(`${i}-auto`, [
      [
        f,
        "auto"
      ]
    ]), a(i, [
      "--margin",
      "--spacing"
    ], (m) => [
      d(f, m)
    ], {
      supportsNegative: true
    });
    t("box-border", [
      [
        "box-sizing",
        "border-box"
      ]
    ]), t("box-content", [
      [
        "box-sizing",
        "content-box"
      ]
    ]), t("line-clamp-none", [
      [
        "overflow",
        "visible"
      ],
      [
        "display",
        "block"
      ],
      [
        "-webkit-box-orient",
        "horizontal"
      ],
      [
        "-webkit-line-clamp",
        "unset"
      ]
    ]), o("line-clamp", {
      themeKeys: [
        "--line-clamp"
      ],
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      handle: (i) => [
        d("overflow", "hidden"),
        d("display", "-webkit-box"),
        d("-webkit-box-orient", "vertical"),
        d("-webkit-line-clamp", i)
      ]
    }), n("line-clamp", () => [
      {
        values: [
          "1",
          "2",
          "3",
          "4",
          "5",
          "6"
        ],
        valueThemeKeys: [
          "--line-clamp"
        ]
      }
    ]), t("block", [
      [
        "display",
        "block"
      ]
    ]), t("inline-block", [
      [
        "display",
        "inline-block"
      ]
    ]), t("inline", [
      [
        "display",
        "inline"
      ]
    ]), t("hidden", [
      [
        "display",
        "none"
      ]
    ]), t("inline-flex", [
      [
        "display",
        "inline-flex"
      ]
    ]), t("table", [
      [
        "display",
        "table"
      ]
    ]), t("inline-table", [
      [
        "display",
        "inline-table"
      ]
    ]), t("table-caption", [
      [
        "display",
        "table-caption"
      ]
    ]), t("table-cell", [
      [
        "display",
        "table-cell"
      ]
    ]), t("table-column", [
      [
        "display",
        "table-column"
      ]
    ]), t("table-column-group", [
      [
        "display",
        "table-column-group"
      ]
    ]), t("table-footer-group", [
      [
        "display",
        "table-footer-group"
      ]
    ]), t("table-header-group", [
      [
        "display",
        "table-header-group"
      ]
    ]), t("table-row-group", [
      [
        "display",
        "table-row-group"
      ]
    ]), t("table-row", [
      [
        "display",
        "table-row"
      ]
    ]), t("flow-root", [
      [
        "display",
        "flow-root"
      ]
    ]), t("flex", [
      [
        "display",
        "flex"
      ]
    ]), t("grid", [
      [
        "display",
        "grid"
      ]
    ]), t("inline-grid", [
      [
        "display",
        "inline-grid"
      ]
    ]), t("contents", [
      [
        "display",
        "contents"
      ]
    ]), t("list-item", [
      [
        "display",
        "list-item"
      ]
    ]), t("field-sizing-content", [
      [
        "field-sizing",
        "content"
      ]
    ]), t("field-sizing-fixed", [
      [
        "field-sizing",
        "fixed"
      ]
    ]), t("aspect-auto", [
      [
        "aspect-ratio",
        "auto"
      ]
    ]), t("aspect-square", [
      [
        "aspect-ratio",
        "1 / 1"
      ]
    ]), o("aspect", {
      themeKeys: [
        "--aspect"
      ],
      handleBareValue: ({ fraction: i }) => {
        if (i === null) return null;
        let [f, m] = C(i, "/");
        return !j(f) || !j(m) ? null : i;
      },
      handle: (i) => [
        d("aspect-ratio", i)
      ]
    });
    for (let [i, f] of [
      [
        "auto",
        "auto"
      ],
      [
        "full",
        "100%"
      ],
      [
        "svw",
        "100svw"
      ],
      [
        "lvw",
        "100lvw"
      ],
      [
        "dvw",
        "100dvw"
      ],
      [
        "svh",
        "100svh"
      ],
      [
        "lvh",
        "100lvh"
      ],
      [
        "dvh",
        "100dvh"
      ],
      [
        "min",
        "min-content"
      ],
      [
        "max",
        "max-content"
      ],
      [
        "fit",
        "fit-content"
      ]
    ]) t(`size-${i}`, [
      [
        "--tw-sort",
        "size"
      ],
      [
        "width",
        f
      ],
      [
        "height",
        f
      ]
    ]), t(`w-${i}`, [
      [
        "width",
        f
      ]
    ]), t(`min-w-${i}`, [
      [
        "min-width",
        f
      ]
    ]), t(`max-w-${i}`, [
      [
        "max-width",
        f
      ]
    ]), t(`h-${i}`, [
      [
        "height",
        f
      ]
    ]), t(`min-h-${i}`, [
      [
        "min-height",
        f
      ]
    ]), t(`max-h-${i}`, [
      [
        "max-height",
        f
      ]
    ]);
    t("w-screen", [
      [
        "width",
        "100vw"
      ]
    ]), t("min-w-screen", [
      [
        "min-width",
        "100vw"
      ]
    ]), t("max-w-screen", [
      [
        "max-width",
        "100vw"
      ]
    ]), t("h-screen", [
      [
        "height",
        "100vh"
      ]
    ]), t("min-h-screen", [
      [
        "min-height",
        "100vh"
      ]
    ]), t("max-h-screen", [
      [
        "max-height",
        "100vh"
      ]
    ]), t("max-w-none", [
      [
        "max-width",
        "none"
      ]
    ]), t("max-h-none", [
      [
        "max-height",
        "none"
      ]
    ]), a("size", [
      "--size",
      "--spacing"
    ], (i) => [
      d("--tw-sort", "size"),
      d("width", i),
      d("height", i)
    ], {
      supportsFractions: true
    });
    for (let [i, f, m] of [
      [
        "w",
        [
          "--width",
          "--spacing",
          "--container"
        ],
        "width"
      ],
      [
        "min-w",
        [
          "--min-width",
          "--spacing",
          "--container"
        ],
        "min-width"
      ],
      [
        "max-w",
        [
          "--max-width",
          "--spacing",
          "--container"
        ],
        "max-width"
      ],
      [
        "h",
        [
          "--height",
          "--spacing"
        ],
        "height"
      ],
      [
        "min-h",
        [
          "--min-height",
          "--height",
          "--spacing"
        ],
        "min-height"
      ],
      [
        "max-h",
        [
          "--max-height",
          "--height",
          "--spacing"
        ],
        "max-height"
      ]
    ]) a(i, f, (k) => [
      d(m, k)
    ], {
      supportsFractions: true
    });
    r.static("container", () => {
      let i = [
        ...e.namespace("--breakpoint").values()
      ];
      i.sort((m, k) => ye(m, k, "asc"));
      let f = [
        d("--tw-sort", "--tw-container-component"),
        d("width", "100%")
      ];
      for (let m of i) f.push(O("@media", `(width >= ${m})`, [
        d("max-width", m)
      ]));
      return f;
    }), t("flex-auto", [
      [
        "flex",
        "auto"
      ]
    ]), t("flex-initial", [
      [
        "flex",
        "0 auto"
      ]
    ]), t("flex-none", [
      [
        "flex",
        "none"
      ]
    ]), r.functional("flex", (i) => {
      if (i.value) {
        if (i.value.kind === "arbitrary") return i.modifier ? void 0 : [
          d("flex", i.value.value)
        ];
        if (i.value.fraction) {
          let [f, m] = C(i.value.fraction, "/");
          return !j(f) || !j(m) ? void 0 : [
            d("flex", `calc(${i.value.fraction} * 100%)`)
          ];
        }
        if (j(i.value.value)) return i.modifier ? void 0 : [
          d("flex", i.value.value)
        ];
      }
    }), n("flex", () => [
      {
        supportsFractions: true
      }
    ]), o("shrink", {
      defaultValue: "1",
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      handle: (i) => [
        d("flex-shrink", i)
      ]
    }), o("grow", {
      defaultValue: "1",
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      handle: (i) => [
        d("flex-grow", i)
      ]
    }), n("shrink", () => [
      {
        values: [
          "0"
        ],
        valueThemeKeys: [],
        hasDefaultValue: true
      }
    ]), n("grow", () => [
      {
        values: [
          "0"
        ],
        valueThemeKeys: [],
        hasDefaultValue: true
      }
    ]), t("basis-auto", [
      [
        "flex-basis",
        "auto"
      ]
    ]), t("basis-full", [
      [
        "flex-basis",
        "100%"
      ]
    ]), a("basis", [
      "--flex-basis",
      "--spacing",
      "--container"
    ], (i) => [
      d("flex-basis", i)
    ], {
      supportsFractions: true
    }), t("table-auto", [
      [
        "table-layout",
        "auto"
      ]
    ]), t("table-fixed", [
      [
        "table-layout",
        "fixed"
      ]
    ]), t("caption-top", [
      [
        "caption-side",
        "top"
      ]
    ]), t("caption-bottom", [
      [
        "caption-side",
        "bottom"
      ]
    ]), t("border-collapse", [
      [
        "border-collapse",
        "collapse"
      ]
    ]), t("border-separate", [
      [
        "border-collapse",
        "separate"
      ]
    ]);
    let u = () => E([
      T("--tw-border-spacing-x", "0", "<length>"),
      T("--tw-border-spacing-y", "0", "<length>")
    ]);
    a("border-spacing", [
      "--border-spacing",
      "--spacing"
    ], (i) => [
      u(),
      d("--tw-border-spacing-x", i),
      d("--tw-border-spacing-y", i),
      d("border-spacing", "var(--tw-border-spacing-x) var(--tw-border-spacing-y)")
    ]), a("border-spacing-x", [
      "--border-spacing",
      "--spacing"
    ], (i) => [
      u(),
      d("--tw-border-spacing-x", i),
      d("border-spacing", "var(--tw-border-spacing-x) var(--tw-border-spacing-y)")
    ]), a("border-spacing-y", [
      "--border-spacing",
      "--spacing"
    ], (i) => [
      u(),
      d("--tw-border-spacing-y", i),
      d("border-spacing", "var(--tw-border-spacing-x) var(--tw-border-spacing-y)")
    ]), t("origin-center", [
      [
        "transform-origin",
        "center"
      ]
    ]), t("origin-top", [
      [
        "transform-origin",
        "top"
      ]
    ]), t("origin-top-right", [
      [
        "transform-origin",
        "top right"
      ]
    ]), t("origin-right", [
      [
        "transform-origin",
        "right"
      ]
    ]), t("origin-bottom-right", [
      [
        "transform-origin",
        "bottom right"
      ]
    ]), t("origin-bottom", [
      [
        "transform-origin",
        "bottom"
      ]
    ]), t("origin-bottom-left", [
      [
        "transform-origin",
        "bottom left"
      ]
    ]), t("origin-left", [
      [
        "transform-origin",
        "left"
      ]
    ]), t("origin-top-left", [
      [
        "transform-origin",
        "top left"
      ]
    ]), o("origin", {
      themeKeys: [
        "--transform-origin"
      ],
      handle: (i) => [
        d("transform-origin", i)
      ]
    }), t("perspective-origin-center", [
      [
        "perspective-origin",
        "center"
      ]
    ]), t("perspective-origin-top", [
      [
        "perspective-origin",
        "top"
      ]
    ]), t("perspective-origin-top-right", [
      [
        "perspective-origin",
        "top right"
      ]
    ]), t("perspective-origin-right", [
      [
        "perspective-origin",
        "right"
      ]
    ]), t("perspective-origin-bottom-right", [
      [
        "perspective-origin",
        "bottom right"
      ]
    ]), t("perspective-origin-bottom", [
      [
        "perspective-origin",
        "bottom"
      ]
    ]), t("perspective-origin-bottom-left", [
      [
        "perspective-origin",
        "bottom left"
      ]
    ]), t("perspective-origin-left", [
      [
        "perspective-origin",
        "left"
      ]
    ]), t("perspective-origin-top-left", [
      [
        "perspective-origin",
        "top left"
      ]
    ]), o("perspective-origin", {
      themeKeys: [
        "--perspective-origin"
      ],
      handle: (i) => [
        d("perspective-origin", i)
      ]
    }), t("perspective-none", [
      [
        "perspective",
        "none"
      ]
    ]), o("perspective", {
      themeKeys: [
        "--perspective"
      ],
      handle: (i) => [
        d("perspective", i)
      ]
    });
    let s = () => E([
      T("--tw-translate-x", "0"),
      T("--tw-translate-y", "0"),
      T("--tw-translate-z", "0")
    ]);
    t("translate-none", [
      [
        "translate",
        "none"
      ]
    ]), t("-translate-full", [
      s,
      [
        "--tw-translate-x",
        "-100%"
      ],
      [
        "--tw-translate-y",
        "-100%"
      ],
      [
        "translate",
        "var(--tw-translate-x) var(--tw-translate-y)"
      ]
    ]), t("translate-full", [
      s,
      [
        "--tw-translate-x",
        "100%"
      ],
      [
        "--tw-translate-y",
        "100%"
      ],
      [
        "translate",
        "var(--tw-translate-x) var(--tw-translate-y)"
      ]
    ]), a("translate", [
      "--translate",
      "--spacing"
    ], (i) => [
      s(),
      d("--tw-translate-x", i),
      d("--tw-translate-y", i),
      d("translate", "var(--tw-translate-x) var(--tw-translate-y)")
    ], {
      supportsNegative: true,
      supportsFractions: true
    });
    for (let i of [
      "x",
      "y"
    ]) t(`-translate-${i}-full`, [
      s,
      [
        `--tw-translate-${i}`,
        "-100%"
      ],
      [
        "translate",
        "var(--tw-translate-x) var(--tw-translate-y)"
      ]
    ]), t(`translate-${i}-full`, [
      s,
      [
        `--tw-translate-${i}`,
        "100%"
      ],
      [
        "translate",
        "var(--tw-translate-x) var(--tw-translate-y)"
      ]
    ]), a(`translate-${i}`, [
      "--translate",
      "--spacing"
    ], (f) => [
      s(),
      d(`--tw-translate-${i}`, f),
      d("translate", "var(--tw-translate-x) var(--tw-translate-y)")
    ], {
      supportsNegative: true,
      supportsFractions: true
    });
    a("translate-z", [
      "--translate",
      "--spacing"
    ], (i) => [
      s(),
      d("--tw-translate-z", i),
      d("translate", "var(--tw-translate-x) var(--tw-translate-y) var(--tw-translate-z)")
    ], {
      supportsNegative: true
    }), t("translate-3d", [
      s,
      [
        "translate",
        "var(--tw-translate-x) var(--tw-translate-y) var(--tw-translate-z)"
      ]
    ]);
    let h = () => E([
      T("--tw-scale-x", "1"),
      T("--tw-scale-y", "1"),
      T("--tw-scale-z", "1")
    ]);
    t("scale-none", [
      [
        "scale",
        "none"
      ]
    ]);
    function c({ negative: i }) {
      return (f) => {
        if (!f.value || f.modifier) return;
        let m;
        return f.value.kind === "arbitrary" ? (m = f.value.value, [
          d("scale", m)
        ]) : (m = e.resolve(f.value.value, [
          "--scale"
        ]), !m && j(f.value.value) && (m = `${f.value.value}%`), m ? (m = i ? `calc(${m} * -1)` : m, [
          h(),
          d("--tw-scale-x", m),
          d("--tw-scale-y", m),
          d("--tw-scale-z", m),
          d("scale", "var(--tw-scale-x) var(--tw-scale-y)")
        ]) : void 0);
      };
    }
    r.functional("-scale", c({
      negative: true
    })), r.functional("scale", c({
      negative: false
    })), n("scale", () => [
      {
        supportsNegative: true,
        values: [
          "0",
          "50",
          "75",
          "90",
          "95",
          "100",
          "105",
          "110",
          "125",
          "150",
          "200"
        ],
        valueThemeKeys: [
          "--scale"
        ]
      }
    ]);
    for (let i of [
      "x",
      "y",
      "z"
    ]) o(`scale-${i}`, {
      supportsNegative: true,
      themeKeys: [
        "--scale"
      ],
      handleBareValue: ({ value: f }) => j(f) ? `${f}%` : null,
      handle: (f) => [
        h(),
        d(`--tw-scale-${i}`, f),
        d("scale", `var(--tw-scale-x) var(--tw-scale-y)${i === "z" ? " var(--tw-scale-z)" : ""}`)
      ]
    }), n(`scale-${i}`, () => [
      {
        supportsNegative: true,
        values: [
          "0",
          "50",
          "75",
          "90",
          "95",
          "100",
          "105",
          "110",
          "125",
          "150",
          "200"
        ],
        valueThemeKeys: [
          "--scale"
        ]
      }
    ]);
    t("scale-3d", [
      h,
      [
        "scale",
        "var(--tw-scale-x) var(--tw-scale-y) var(--tw-scale-z)"
      ]
    ]), t("rotate-none", [
      [
        "rotate",
        "none"
      ]
    ]);
    function p({ negative: i }) {
      return (f) => {
        if (!f.value || f.modifier) return;
        let m;
        if (f.value.kind === "arbitrary") {
          m = f.value.value;
          let k = f.value.dataType ?? N(m, [
            "angle",
            "vector"
          ]);
          if (k === "vector") return [
            d("rotate", `${m} var(--tw-rotate)`)
          ];
          if (k !== "angle") return [
            d("rotate", m)
          ];
        } else if (m = e.resolve(f.value.value, [
          "--rotate"
        ]), !m && j(f.value.value) && (m = `${f.value.value}deg`), !m) return;
        return [
          d("rotate", i ? `calc(${m} * -1)` : m)
        ];
      };
    }
    r.functional("-rotate", p({
      negative: true
    })), r.functional("rotate", p({
      negative: false
    })), n("rotate", () => [
      {
        supportsNegative: true,
        values: [
          "0",
          "1",
          "2",
          "3",
          "6",
          "12",
          "45",
          "90",
          "180"
        ],
        valueThemeKeys: [
          "--rotate"
        ]
      }
    ]);
    {
      let i = [
        "var(--tw-rotate-x)",
        "var(--tw-rotate-y)",
        "var(--tw-rotate-z)",
        "var(--tw-skew-x)",
        "var(--tw-skew-y)"
      ].join(" "), f = () => E([
        T("--tw-rotate-x", "rotateX(0)"),
        T("--tw-rotate-y", "rotateY(0)"),
        T("--tw-rotate-z", "rotateZ(0)"),
        T("--tw-skew-x", "skewX(0)"),
        T("--tw-skew-y", "skewY(0)")
      ]);
      for (let m of [
        "x",
        "y",
        "z"
      ]) o(`rotate-${m}`, {
        supportsNegative: true,
        themeKeys: [
          "--rotate"
        ],
        handleBareValue: ({ value: k }) => j(k) ? `${k}deg` : null,
        handle: (k) => [
          f(),
          d(`--tw-rotate-${m}`, `rotate${m.toUpperCase()}(${k})`),
          d("transform", i)
        ]
      }), n(`rotate-${m}`, () => [
        {
          supportsNegative: true,
          values: [
            "0",
            "1",
            "2",
            "3",
            "6",
            "12",
            "45",
            "90",
            "180"
          ],
          valueThemeKeys: [
            "--rotate"
          ]
        }
      ]);
      o("skew", {
        supportsNegative: true,
        themeKeys: [
          "--skew"
        ],
        handleBareValue: ({ value: m }) => j(m) ? `${m}deg` : null,
        handle: (m) => [
          f(),
          d("--tw-skew-x", `skewX(${m})`),
          d("--tw-skew-y", `skewY(${m})`),
          d("transform", i)
        ]
      }), o("skew-x", {
        supportsNegative: true,
        themeKeys: [
          "--skew"
        ],
        handleBareValue: ({ value: m }) => j(m) ? `${m}deg` : null,
        handle: (m) => [
          f(),
          d("--tw-skew-x", `skewX(${m})`),
          d("transform", i)
        ]
      }), o("skew-y", {
        supportsNegative: true,
        themeKeys: [
          "--skew"
        ],
        handleBareValue: ({ value: m }) => j(m) ? `${m}deg` : null,
        handle: (m) => [
          f(),
          d("--tw-skew-y", `skewY(${m})`),
          d("transform", i)
        ]
      }), n("skew", () => [
        {
          supportsNegative: true,
          values: [
            "0",
            "1",
            "2",
            "3",
            "6",
            "12"
          ],
          valueThemeKeys: [
            "--skew"
          ]
        }
      ]), n("skew-x", () => [
        {
          supportsNegative: true,
          values: [
            "0",
            "1",
            "2",
            "3",
            "6",
            "12"
          ],
          valueThemeKeys: [
            "--skew"
          ]
        }
      ]), n("skew-y", () => [
        {
          supportsNegative: true,
          values: [
            "0",
            "1",
            "2",
            "3",
            "6",
            "12"
          ],
          valueThemeKeys: [
            "--skew"
          ]
        }
      ]), r.functional("transform", (m) => {
        if (m.modifier) return;
        let k = null;
        if (m.value ? m.value.kind === "arbitrary" && (k = m.value.value) : k = i, k !== null) return [
          f(),
          d("transform", k)
        ];
      }), n("transform", () => [
        {
          hasDefaultValue: true
        }
      ]), t("transform-cpu", [
        [
          "transform",
          i
        ]
      ]), t("transform-gpu", [
        [
          "transform",
          `translateZ(0) ${i}`
        ]
      ]), t("transform-none", [
        [
          "transform",
          "none"
        ]
      ]);
    }
    t("transform-flat", [
      [
        "transform-style",
        "flat"
      ]
    ]), t("transform-3d", [
      [
        "transform-style",
        "preserve-3d"
      ]
    ]), t("transform-content", [
      [
        "transform-box",
        "content-box"
      ]
    ]), t("transform-border", [
      [
        "transform-box",
        "border-box"
      ]
    ]), t("transform-fill", [
      [
        "transform-box",
        "fill-box"
      ]
    ]), t("transform-stroke", [
      [
        "transform-box",
        "stroke-box"
      ]
    ]), t("transform-view", [
      [
        "transform-box",
        "view-box"
      ]
    ]), t("backface-visible", [
      [
        "backface-visibility",
        "visible"
      ]
    ]), t("backface-hidden", [
      [
        "backface-visibility",
        "hidden"
      ]
    ]);
    for (let i of [
      "auto",
      "default",
      "pointer",
      "wait",
      "text",
      "move",
      "help",
      "not-allowed",
      "none",
      "context-menu",
      "progress",
      "cell",
      "crosshair",
      "vertical-text",
      "alias",
      "copy",
      "no-drop",
      "grab",
      "grabbing",
      "all-scroll",
      "col-resize",
      "row-resize",
      "n-resize",
      "e-resize",
      "s-resize",
      "w-resize",
      "ne-resize",
      "nw-resize",
      "se-resize",
      "sw-resize",
      "ew-resize",
      "ns-resize",
      "nesw-resize",
      "nwse-resize",
      "zoom-in",
      "zoom-out"
    ]) t(`cursor-${i}`, [
      [
        "cursor",
        i
      ]
    ]);
    o("cursor", {
      themeKeys: [
        "--cursor"
      ],
      handle: (i) => [
        d("cursor", i)
      ]
    });
    for (let i of [
      "auto",
      "none",
      "manipulation"
    ]) t(`touch-${i}`, [
      [
        "touch-action",
        i
      ]
    ]);
    let g = () => E([
      T("--tw-pan-x"),
      T("--tw-pan-y"),
      T("--tw-pinch-zoom")
    ]);
    for (let i of [
      "x",
      "left",
      "right"
    ]) t(`touch-pan-${i}`, [
      g,
      [
        "--tw-pan-x",
        `pan-${i}`
      ],
      [
        "touch-action",
        "var(--tw-pan-x,) var(--tw-pan-y,) var(--tw-pinch-zoom,)"
      ]
    ]);
    for (let i of [
      "y",
      "up",
      "down"
    ]) t(`touch-pan-${i}`, [
      g,
      [
        "--tw-pan-y",
        `pan-${i}`
      ],
      [
        "touch-action",
        "var(--tw-pan-x,) var(--tw-pan-y,) var(--tw-pinch-zoom,)"
      ]
    ]);
    t("touch-pinch-zoom", [
      g,
      [
        "--tw-pinch-zoom",
        "pinch-zoom"
      ],
      [
        "touch-action",
        "var(--tw-pan-x,) var(--tw-pan-y,) var(--tw-pinch-zoom,)"
      ]
    ]);
    for (let i of [
      "none",
      "text",
      "all",
      "auto"
    ]) t(`select-${i}`, [
      [
        "-webkit-user-select",
        i
      ],
      [
        "user-select",
        i
      ]
    ]);
    t("resize-none", [
      [
        "resize",
        "none"
      ]
    ]), t("resize-x", [
      [
        "resize",
        "horizontal"
      ]
    ]), t("resize-y", [
      [
        "resize",
        "vertical"
      ]
    ]), t("resize", [
      [
        "resize",
        "both"
      ]
    ]), t("snap-none", [
      [
        "scroll-snap-type",
        "none"
      ]
    ]);
    let b = () => E([
      T("--tw-scroll-snap-strictness", "proximity", "*")
    ]);
    for (let i of [
      "x",
      "y",
      "both"
    ]) t(`snap-${i}`, [
      b,
      [
        "scroll-snap-type",
        `${i} var(--tw-scroll-snap-strictness)`
      ]
    ]);
    t("snap-mandatory", [
      b,
      [
        "--tw-scroll-snap-strictness",
        "mandatory"
      ]
    ]), t("snap-proximity", [
      b,
      [
        "--tw-scroll-snap-strictness",
        "proximity"
      ]
    ]), t("snap-align-none", [
      [
        "scroll-snap-align",
        "none"
      ]
    ]), t("snap-start", [
      [
        "scroll-snap-align",
        "start"
      ]
    ]), t("snap-end", [
      [
        "scroll-snap-align",
        "end"
      ]
    ]), t("snap-center", [
      [
        "scroll-snap-align",
        "center"
      ]
    ]), t("snap-normal", [
      [
        "scroll-snap-stop",
        "normal"
      ]
    ]), t("snap-always", [
      [
        "scroll-snap-stop",
        "always"
      ]
    ]);
    for (let [i, f] of [
      [
        "scroll-m",
        "scroll-margin"
      ],
      [
        "scroll-mx",
        "scroll-margin-inline"
      ],
      [
        "scroll-my",
        "scroll-margin-block"
      ],
      [
        "scroll-ms",
        "scroll-margin-inline-start"
      ],
      [
        "scroll-me",
        "scroll-margin-inline-end"
      ],
      [
        "scroll-mt",
        "scroll-margin-top"
      ],
      [
        "scroll-mr",
        "scroll-margin-right"
      ],
      [
        "scroll-mb",
        "scroll-margin-bottom"
      ],
      [
        "scroll-ml",
        "scroll-margin-left"
      ]
    ]) a(i, [
      "--scroll-margin",
      "--spacing"
    ], (m) => [
      d(f, m)
    ], {
      supportsNegative: true
    });
    for (let [i, f] of [
      [
        "scroll-p",
        "scroll-padding"
      ],
      [
        "scroll-px",
        "scroll-padding-inline"
      ],
      [
        "scroll-py",
        "scroll-padding-block"
      ],
      [
        "scroll-ps",
        "scroll-padding-inline-start"
      ],
      [
        "scroll-pe",
        "scroll-padding-inline-end"
      ],
      [
        "scroll-pt",
        "scroll-padding-top"
      ],
      [
        "scroll-pr",
        "scroll-padding-right"
      ],
      [
        "scroll-pb",
        "scroll-padding-bottom"
      ],
      [
        "scroll-pl",
        "scroll-padding-left"
      ]
    ]) a(i, [
      "--scroll-padding",
      "--spacing"
    ], (m) => [
      d(f, m)
    ]);
    t("list-inside", [
      [
        "list-style-position",
        "inside"
      ]
    ]), t("list-outside", [
      [
        "list-style-position",
        "outside"
      ]
    ]), t("list-none", [
      [
        "list-style-type",
        "none"
      ]
    ]), t("list-disc", [
      [
        "list-style-type",
        "disc"
      ]
    ]), t("list-decimal", [
      [
        "list-style-type",
        "decimal"
      ]
    ]), o("list", {
      themeKeys: [
        "--list-style-type"
      ],
      handle: (i) => [
        d("list-style-type", i)
      ]
    }), t("list-image-none", [
      [
        "list-style-image",
        "none"
      ]
    ]), o("list-image", {
      themeKeys: [
        "--list-style-image"
      ],
      handle: (i) => [
        d("list-style-image", i)
      ]
    }), t("appearance-none", [
      [
        "appearance",
        "none"
      ]
    ]), t("appearance-auto", [
      [
        "appearance",
        "auto"
      ]
    ]), t("scheme-normal", [
      [
        "color-scheme",
        "normal"
      ]
    ]), t("scheme-dark", [
      [
        "color-scheme",
        "dark"
      ]
    ]), t("scheme-light", [
      [
        "color-scheme",
        "light"
      ]
    ]), t("scheme-light-dark", [
      [
        "color-scheme",
        "light dark"
      ]
    ]), t("scheme-only-dark", [
      [
        "color-scheme",
        "only dark"
      ]
    ]), t("scheme-only-light", [
      [
        "color-scheme",
        "only light"
      ]
    ]), t("columns-auto", [
      [
        "columns",
        "auto"
      ]
    ]), o("columns", {
      themeKeys: [
        "--columns",
        "--container"
      ],
      handleBareValue: ({ value: i }) => j(i) ? i : null,
      handle: (i) => [
        d("columns", i)
      ]
    }), n("columns", () => [
      {
        values: Array.from({
          length: 12
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: [
          "--columns",
          "--container"
        ]
      }
    ]);
    for (let i of [
      "auto",
      "avoid",
      "all",
      "avoid-page",
      "page",
      "left",
      "right",
      "column"
    ]) t(`break-before-${i}`, [
      [
        "break-before",
        i
      ]
    ]);
    for (let i of [
      "auto",
      "avoid",
      "avoid-page",
      "avoid-column"
    ]) t(`break-inside-${i}`, [
      [
        "break-inside",
        i
      ]
    ]);
    for (let i of [
      "auto",
      "avoid",
      "all",
      "avoid-page",
      "page",
      "left",
      "right",
      "column"
    ]) t(`break-after-${i}`, [
      [
        "break-after",
        i
      ]
    ]);
    t("grid-flow-row", [
      [
        "grid-auto-flow",
        "row"
      ]
    ]), t("grid-flow-col", [
      [
        "grid-auto-flow",
        "column"
      ]
    ]), t("grid-flow-dense", [
      [
        "grid-auto-flow",
        "dense"
      ]
    ]), t("grid-flow-row-dense", [
      [
        "grid-auto-flow",
        "row dense"
      ]
    ]), t("grid-flow-col-dense", [
      [
        "grid-auto-flow",
        "column dense"
      ]
    ]), t("auto-cols-auto", [
      [
        "grid-auto-columns",
        "auto"
      ]
    ]), t("auto-cols-min", [
      [
        "grid-auto-columns",
        "min-content"
      ]
    ]), t("auto-cols-max", [
      [
        "grid-auto-columns",
        "max-content"
      ]
    ]), t("auto-cols-fr", [
      [
        "grid-auto-columns",
        "minmax(0, 1fr)"
      ]
    ]), o("auto-cols", {
      themeKeys: [
        "--grid-auto-columns"
      ],
      handle: (i) => [
        d("grid-auto-columns", i)
      ]
    }), t("auto-rows-auto", [
      [
        "grid-auto-rows",
        "auto"
      ]
    ]), t("auto-rows-min", [
      [
        "grid-auto-rows",
        "min-content"
      ]
    ]), t("auto-rows-max", [
      [
        "grid-auto-rows",
        "max-content"
      ]
    ]), t("auto-rows-fr", [
      [
        "grid-auto-rows",
        "minmax(0, 1fr)"
      ]
    ]), o("auto-rows", {
      themeKeys: [
        "--grid-auto-rows"
      ],
      handle: (i) => [
        d("grid-auto-rows", i)
      ]
    }), t("grid-cols-none", [
      [
        "grid-template-columns",
        "none"
      ]
    ]), t("grid-cols-subgrid", [
      [
        "grid-template-columns",
        "subgrid"
      ]
    ]), o("grid-cols", {
      themeKeys: [
        "--grid-template-columns"
      ],
      handleBareValue: ({ value: i }) => Ge(i) ? `repeat(${i}, minmax(0, 1fr))` : null,
      handle: (i) => [
        d("grid-template-columns", i)
      ]
    }), t("grid-rows-none", [
      [
        "grid-template-rows",
        "none"
      ]
    ]), t("grid-rows-subgrid", [
      [
        "grid-template-rows",
        "subgrid"
      ]
    ]), o("grid-rows", {
      themeKeys: [
        "--grid-template-rows"
      ],
      handleBareValue: ({ value: i }) => Ge(i) ? `repeat(${i}, minmax(0, 1fr))` : null,
      handle: (i) => [
        d("grid-template-rows", i)
      ]
    }), n("grid-cols", () => [
      {
        values: Array.from({
          length: 12
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: [
          "--grid-template-columns"
        ]
      }
    ]), n("grid-rows", () => [
      {
        values: Array.from({
          length: 12
        }, (i, f) => `${f + 1}`),
        valueThemeKeys: [
          "--grid-template-rows"
        ]
      }
    ]), t("flex-row", [
      [
        "flex-direction",
        "row"
      ]
    ]), t("flex-row-reverse", [
      [
        "flex-direction",
        "row-reverse"
      ]
    ]), t("flex-col", [
      [
        "flex-direction",
        "column"
      ]
    ]), t("flex-col-reverse", [
      [
        "flex-direction",
        "column-reverse"
      ]
    ]), t("flex-wrap", [
      [
        "flex-wrap",
        "wrap"
      ]
    ]), t("flex-nowrap", [
      [
        "flex-wrap",
        "nowrap"
      ]
    ]), t("flex-wrap-reverse", [
      [
        "flex-wrap",
        "wrap-reverse"
      ]
    ]), t("place-content-center", [
      [
        "place-content",
        "center"
      ]
    ]), t("place-content-start", [
      [
        "place-content",
        "start"
      ]
    ]), t("place-content-end", [
      [
        "place-content",
        "end"
      ]
    ]), t("place-content-between", [
      [
        "place-content",
        "space-between"
      ]
    ]), t("place-content-around", [
      [
        "place-content",
        "space-around"
      ]
    ]), t("place-content-evenly", [
      [
        "place-content",
        "space-evenly"
      ]
    ]), t("place-content-baseline", [
      [
        "place-content",
        "baseline"
      ]
    ]), t("place-content-stretch", [
      [
        "place-content",
        "stretch"
      ]
    ]), t("place-items-center", [
      [
        "place-items",
        "center"
      ]
    ]), t("place-items-start", [
      [
        "place-items",
        "start"
      ]
    ]), t("place-items-end", [
      [
        "place-items",
        "end"
      ]
    ]), t("place-items-baseline", [
      [
        "place-items",
        "baseline"
      ]
    ]), t("place-items-stretch", [
      [
        "place-items",
        "stretch"
      ]
    ]), t("content-normal", [
      [
        "align-content",
        "normal"
      ]
    ]), t("content-center", [
      [
        "align-content",
        "center"
      ]
    ]), t("content-start", [
      [
        "align-content",
        "flex-start"
      ]
    ]), t("content-end", [
      [
        "align-content",
        "flex-end"
      ]
    ]), t("content-between", [
      [
        "align-content",
        "space-between"
      ]
    ]), t("content-around", [
      [
        "align-content",
        "space-around"
      ]
    ]), t("content-evenly", [
      [
        "align-content",
        "space-evenly"
      ]
    ]), t("content-baseline", [
      [
        "align-content",
        "baseline"
      ]
    ]), t("content-stretch", [
      [
        "align-content",
        "stretch"
      ]
    ]), t("items-center", [
      [
        "align-items",
        "center"
      ]
    ]), t("items-start", [
      [
        "align-items",
        "flex-start"
      ]
    ]), t("items-end", [
      [
        "align-items",
        "flex-end"
      ]
    ]), t("items-baseline", [
      [
        "align-items",
        "baseline"
      ]
    ]), t("items-stretch", [
      [
        "align-items",
        "stretch"
      ]
    ]), t("justify-normal", [
      [
        "justify-content",
        "normal"
      ]
    ]), t("justify-center", [
      [
        "justify-content",
        "center"
      ]
    ]), t("justify-start", [
      [
        "justify-content",
        "flex-start"
      ]
    ]), t("justify-end", [
      [
        "justify-content",
        "flex-end"
      ]
    ]), t("justify-between", [
      [
        "justify-content",
        "space-between"
      ]
    ]), t("justify-around", [
      [
        "justify-content",
        "space-around"
      ]
    ]), t("justify-evenly", [
      [
        "justify-content",
        "space-evenly"
      ]
    ]), t("justify-baseline", [
      [
        "justify-content",
        "baseline"
      ]
    ]), t("justify-stretch", [
      [
        "justify-content",
        "stretch"
      ]
    ]), t("justify-items-normal", [
      [
        "justify-items",
        "normal"
      ]
    ]), t("justify-items-center", [
      [
        "justify-items",
        "center"
      ]
    ]), t("justify-items-start", [
      [
        "justify-items",
        "start"
      ]
    ]), t("justify-items-end", [
      [
        "justify-items",
        "end"
      ]
    ]), t("justify-items-stretch", [
      [
        "justify-items",
        "stretch"
      ]
    ]), a("gap", [
      "--gap",
      "--spacing"
    ], (i) => [
      d("gap", i)
    ]), a("gap-x", [
      "--gap",
      "--spacing"
    ], (i) => [
      d("column-gap", i)
    ]), a("gap-y", [
      "--gap",
      "--spacing"
    ], (i) => [
      d("row-gap", i)
    ]), a("space-x", [
      "--space",
      "--spacing"
    ], (i) => [
      E([
        T("--tw-space-x-reverse", "0")
      ]),
      S(":where(& > :not(:last-child))", [
        d("--tw-sort", "row-gap"),
        d("--tw-space-x-reverse", "0"),
        d("margin-inline-start", `calc(${i} * var(--tw-space-x-reverse))`),
        d("margin-inline-end", `calc(${i} * calc(1 - var(--tw-space-x-reverse)))`)
      ])
    ], {
      supportsNegative: true
    }), a("space-y", [
      "--space",
      "--spacing"
    ], (i) => [
      E([
        T("--tw-space-y-reverse", "0")
      ]),
      S(":where(& > :not(:last-child))", [
        d("--tw-sort", "column-gap"),
        d("--tw-space-y-reverse", "0"),
        d("margin-block-start", `calc(${i} * var(--tw-space-y-reverse))`),
        d("margin-block-end", `calc(${i} * calc(1 - var(--tw-space-y-reverse)))`)
      ])
    ], {
      supportsNegative: true
    }), t("space-x-reverse", [
      () => E([
        T("--tw-space-x-reverse", "0")
      ]),
      () => S(":where(& > :not(:last-child))", [
        d("--tw-sort", "row-gap"),
        d("--tw-space-x-reverse", "1")
      ])
    ]), t("space-y-reverse", [
      () => E([
        T("--tw-space-y-reverse", "0")
      ]),
      () => S(":where(& > :not(:last-child))", [
        d("--tw-sort", "column-gap"),
        d("--tw-space-y-reverse", "1")
      ])
    ]), t("accent-auto", [
      [
        "accent-color",
        "auto"
      ]
    ]), l("accent", {
      themeKeys: [
        "--accent-color",
        "--color"
      ],
      handle: (i) => [
        d("accent-color", i)
      ]
    }), l("caret", {
      themeKeys: [
        "--caret-color",
        "--color"
      ],
      handle: (i) => [
        d("caret-color", i)
      ]
    }), l("divide", {
      themeKeys: [
        "--divide-color",
        "--color"
      ],
      handle: (i) => [
        S(":where(& > :not(:last-child))", [
          d("--tw-sort", "divide-color"),
          d("border-color", i)
        ])
      ]
    }), t("place-self-auto", [
      [
        "place-self",
        "auto"
      ]
    ]), t("place-self-start", [
      [
        "place-self",
        "start"
      ]
    ]), t("place-self-end", [
      [
        "place-self",
        "end"
      ]
    ]), t("place-self-center", [
      [
        "place-self",
        "center"
      ]
    ]), t("place-self-stretch", [
      [
        "place-self",
        "stretch"
      ]
    ]), t("self-auto", [
      [
        "align-self",
        "auto"
      ]
    ]), t("self-start", [
      [
        "align-self",
        "flex-start"
      ]
    ]), t("self-end", [
      [
        "align-self",
        "flex-end"
      ]
    ]), t("self-center", [
      [
        "align-self",
        "center"
      ]
    ]), t("self-stretch", [
      [
        "align-self",
        "stretch"
      ]
    ]), t("self-baseline", [
      [
        "align-self",
        "baseline"
      ]
    ]), t("justify-self-auto", [
      [
        "justify-self",
        "auto"
      ]
    ]), t("justify-self-start", [
      [
        "justify-self",
        "flex-start"
      ]
    ]), t("justify-self-end", [
      [
        "justify-self",
        "flex-end"
      ]
    ]), t("justify-self-center", [
      [
        "justify-self",
        "center"
      ]
    ]), t("justify-self-stretch", [
      [
        "justify-self",
        "stretch"
      ]
    ]);
    for (let i of [
      "auto",
      "hidden",
      "clip",
      "visible",
      "scroll"
    ]) t(`overflow-${i}`, [
      [
        "overflow",
        i
      ]
    ]), t(`overflow-x-${i}`, [
      [
        "overflow-x",
        i
      ]
    ]), t(`overflow-y-${i}`, [
      [
        "overflow-y",
        i
      ]
    ]);
    for (let i of [
      "auto",
      "contain",
      "none"
    ]) t(`overscroll-${i}`, [
      [
        "overscroll-behavior",
        i
      ]
    ]), t(`overscroll-x-${i}`, [
      [
        "overscroll-behavior-x",
        i
      ]
    ]), t(`overscroll-y-${i}`, [
      [
        "overscroll-behavior-y",
        i
      ]
    ]);
    t("scroll-auto", [
      [
        "scroll-behavior",
        "auto"
      ]
    ]), t("scroll-smooth", [
      [
        "scroll-behavior",
        "smooth"
      ]
    ]), t("truncate", [
      [
        "overflow",
        "hidden"
      ],
      [
        "text-overflow",
        "ellipsis"
      ],
      [
        "white-space",
        "nowrap"
      ]
    ]), t("text-ellipsis", [
      [
        "text-overflow",
        "ellipsis"
      ]
    ]), t("text-clip", [
      [
        "text-overflow",
        "clip"
      ]
    ]), t("hyphens-none", [
      [
        "-webkit-hyphens",
        "none"
      ],
      [
        "hyphens",
        "none"
      ]
    ]), t("hyphens-manual", [
      [
        "-webkit-hyphens",
        "manual"
      ],
      [
        "hyphens",
        "manual"
      ]
    ]), t("hyphens-auto", [
      [
        "-webkit-hyphens",
        "auto"
      ],
      [
        "hyphens",
        "auto"
      ]
    ]), t("whitespace-normal", [
      [
        "white-space",
        "normal"
      ]
    ]), t("whitespace-nowrap", [
      [
        "white-space",
        "nowrap"
      ]
    ]), t("whitespace-pre", [
      [
        "white-space",
        "pre"
      ]
    ]), t("whitespace-pre-line", [
      [
        "white-space",
        "pre-line"
      ]
    ]), t("whitespace-pre-wrap", [
      [
        "white-space",
        "pre-wrap"
      ]
    ]), t("whitespace-break-spaces", [
      [
        "white-space",
        "break-spaces"
      ]
    ]), t("text-wrap", [
      [
        "text-wrap",
        "wrap"
      ]
    ]), t("text-nowrap", [
      [
        "text-wrap",
        "nowrap"
      ]
    ]), t("text-balance", [
      [
        "text-wrap",
        "balance"
      ]
    ]), t("text-pretty", [
      [
        "text-wrap",
        "pretty"
      ]
    ]), t("break-normal", [
      [
        "overflow-wrap",
        "normal"
      ],
      [
        "word-break",
        "normal"
      ]
    ]), t("break-words", [
      [
        "overflow-wrap",
        "break-word"
      ]
    ]), t("break-all", [
      [
        "word-break",
        "break-all"
      ]
    ]), t("break-keep", [
      [
        "word-break",
        "keep-all"
      ]
    ]);
    for (let [i, f] of [
      [
        "rounded",
        [
          "border-radius"
        ]
      ],
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
      ],
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
    ]) t(`${i}-none`, f.map((m) => [
      m,
      "0"
    ])), t(`${i}-full`, f.map((m) => [
      m,
      "calc(infinity * 1px)"
    ])), o(i, {
      themeKeys: [
        "--radius"
      ],
      handle: (m) => f.map((k) => d(k, m))
    });
    t("border-solid", [
      [
        "--tw-border-style",
        "solid"
      ],
      [
        "border-style",
        "solid"
      ]
    ]), t("border-dashed", [
      [
        "--tw-border-style",
        "dashed"
      ],
      [
        "border-style",
        "dashed"
      ]
    ]), t("border-dotted", [
      [
        "--tw-border-style",
        "dotted"
      ],
      [
        "border-style",
        "dotted"
      ]
    ]), t("border-double", [
      [
        "--tw-border-style",
        "double"
      ],
      [
        "border-style",
        "double"
      ]
    ]), t("border-hidden", [
      [
        "--tw-border-style",
        "hidden"
      ],
      [
        "border-style",
        "hidden"
      ]
    ]), t("border-none", [
      [
        "--tw-border-style",
        "none"
      ],
      [
        "border-style",
        "none"
      ]
    ]);
    {
      let i = function(m, k) {
        r.functional(m, (w) => {
          if (!w.value) {
            if (w.modifier) return;
            let x = e.get([
              "--default-border-width"
            ]) ?? "1px", z = k.width(x);
            return z ? [
              f(),
              ...z
            ] : void 0;
          }
          if (w.value.kind === "arbitrary") {
            let x = w.value.value;
            switch (w.value.dataType ?? N(x, [
              "color",
              "line-width",
              "length"
            ])) {
              case "line-width":
              case "length": {
                if (w.modifier) return;
                let z = k.width(x);
                return z ? [
                  f(),
                  ...z
                ] : void 0;
              }
              default:
                return x = W(x, w.modifier, e), x === null ? void 0 : k.color(x);
            }
          }
          {
            let x = _(w, e, [
              "--border-color",
              "--color"
            ]);
            if (x) return k.color(x);
          }
          {
            if (w.modifier) return;
            let x = e.resolve(w.value.value, [
              "--border-width"
            ]);
            if (x) {
              let z = k.width(x);
              return z ? [
                f(),
                ...z
              ] : void 0;
            }
            if (j(w.value.value)) {
              let z = k.width(`${w.value.value}px`);
              return z ? [
                f(),
                ...z
              ] : void 0;
            }
          }
        }), n(m, () => [
          {
            values: [
              "current",
              "inherit",
              "transparent"
            ],
            valueThemeKeys: [
              "--border-color",
              "--color"
            ],
            modifiers: Array.from({
              length: 21
            }, (w, x) => `${x * 5}`),
            hasDefaultValue: true
          },
          {
            values: [
              "0",
              "2",
              "4",
              "8"
            ],
            valueThemeKeys: [
              "--border-width"
            ]
          }
        ]);
      }, f = () => E([
        T("--tw-border-style", "solid")
      ]);
      i("border", {
        width: (m) => [
          d("border-style", "var(--tw-border-style)"),
          d("border-width", m)
        ],
        color: (m) => [
          d("border-color", m)
        ]
      }), i("border-x", {
        width: (m) => [
          d("border-inline-style", "var(--tw-border-style)"),
          d("border-inline-width", m)
        ],
        color: (m) => [
          d("border-inline-color", m)
        ]
      }), i("border-y", {
        width: (m) => [
          d("border-block-style", "var(--tw-border-style)"),
          d("border-block-width", m)
        ],
        color: (m) => [
          d("border-block-color", m)
        ]
      }), i("border-s", {
        width: (m) => [
          d("border-inline-start-style", "var(--tw-border-style)"),
          d("border-inline-start-width", m)
        ],
        color: (m) => [
          d("border-inline-start-color", m)
        ]
      }), i("border-e", {
        width: (m) => [
          d("border-inline-end-style", "var(--tw-border-style)"),
          d("border-inline-end-width", m)
        ],
        color: (m) => [
          d("border-inline-end-color", m)
        ]
      }), i("border-t", {
        width: (m) => [
          d("border-top-style", "var(--tw-border-style)"),
          d("border-top-width", m)
        ],
        color: (m) => [
          d("border-top-color", m)
        ]
      }), i("border-r", {
        width: (m) => [
          d("border-right-style", "var(--tw-border-style)"),
          d("border-right-width", m)
        ],
        color: (m) => [
          d("border-right-color", m)
        ]
      }), i("border-b", {
        width: (m) => [
          d("border-bottom-style", "var(--tw-border-style)"),
          d("border-bottom-width", m)
        ],
        color: (m) => [
          d("border-bottom-color", m)
        ]
      }), i("border-l", {
        width: (m) => [
          d("border-left-style", "var(--tw-border-style)"),
          d("border-left-width", m)
        ],
        color: (m) => [
          d("border-left-color", m)
        ]
      }), o("divide-x", {
        defaultValue: e.get([
          "--default-border-width"
        ]) ?? "1px",
        themeKeys: [
          "--divide-width",
          "--border-width"
        ],
        handleBareValue: ({ value: m }) => j(m) ? `${m}px` : null,
        handle: (m) => [
          E([
            T("--tw-divide-x-reverse", "0")
          ]),
          S(":where(& > :not(:last-child))", [
            d("--tw-sort", "divide-x-width"),
            f(),
            d("--tw-divide-x-reverse", "0"),
            d("border-inline-style", "var(--tw-border-style)"),
            d("border-inline-start-width", `calc(${m} * var(--tw-divide-x-reverse))`),
            d("border-inline-end-width", `calc(${m} * calc(1 - var(--tw-divide-x-reverse)))`)
          ])
        ]
      }), o("divide-y", {
        defaultValue: e.get([
          "--default-border-width"
        ]) ?? "1px",
        themeKeys: [
          "--divide-width",
          "--border-width"
        ],
        handleBareValue: ({ value: m }) => j(m) ? `${m}px` : null,
        handle: (m) => [
          E([
            T("--tw-divide-y-reverse", "0")
          ]),
          S(":where(& > :not(:last-child))", [
            d("--tw-sort", "divide-y-width"),
            f(),
            d("--tw-divide-y-reverse", "0"),
            d("border-bottom-style", "var(--tw-border-style)"),
            d("border-top-style", "var(--tw-border-style)"),
            d("border-top-width", `calc(${m} * var(--tw-divide-y-reverse))`),
            d("border-bottom-width", `calc(${m} * calc(1 - var(--tw-divide-y-reverse)))`)
          ])
        ]
      }), n("divide-x", () => [
        {
          values: [
            "0",
            "2",
            "4",
            "8"
          ],
          valueThemeKeys: [
            "--divide-width",
            "--border-width"
          ],
          hasDefaultValue: true
        }
      ]), n("divide-y", () => [
        {
          values: [
            "0",
            "2",
            "4",
            "8"
          ],
          valueThemeKeys: [
            "--divide-width",
            "--border-width"
          ],
          hasDefaultValue: true
        }
      ]), t("divide-x-reverse", [
        () => E([
          T("--tw-divide-x-reverse", "0")
        ]),
        () => S(":where(& > :not(:last-child))", [
          d("--tw-divide-x-reverse", "1")
        ])
      ]), t("divide-y-reverse", [
        () => E([
          T("--tw-divide-y-reverse", "0")
        ]),
        () => S(":where(& > :not(:last-child))", [
          d("--tw-divide-y-reverse", "1")
        ])
      ]);
      for (let m of [
        "solid",
        "dashed",
        "dotted",
        "double",
        "none"
      ]) t(`divide-${m}`, [
        () => S(":where(& > :not(:last-child))", [
          d("--tw-sort", "divide-style"),
          d("--tw-border-style", m),
          d("border-style", m)
        ])
      ]);
    }
    t("bg-auto", [
      [
        "background-size",
        "auto"
      ]
    ]), t("bg-cover", [
      [
        "background-size",
        "cover"
      ]
    ]), t("bg-contain", [
      [
        "background-size",
        "contain"
      ]
    ]), t("bg-fixed", [
      [
        "background-attachment",
        "fixed"
      ]
    ]), t("bg-local", [
      [
        "background-attachment",
        "local"
      ]
    ]), t("bg-scroll", [
      [
        "background-attachment",
        "scroll"
      ]
    ]), t("bg-center", [
      [
        "background-position",
        "center"
      ]
    ]), t("bg-top", [
      [
        "background-position",
        "top"
      ]
    ]), t("bg-right-top", [
      [
        "background-position",
        "right top"
      ]
    ]), t("bg-right", [
      [
        "background-position",
        "right"
      ]
    ]), t("bg-right-bottom", [
      [
        "background-position",
        "right bottom"
      ]
    ]), t("bg-bottom", [
      [
        "background-position",
        "bottom"
      ]
    ]), t("bg-left-bottom", [
      [
        "background-position",
        "left bottom"
      ]
    ]), t("bg-left", [
      [
        "background-position",
        "left"
      ]
    ]), t("bg-left-top", [
      [
        "background-position",
        "left top"
      ]
    ]), t("bg-repeat", [
      [
        "background-repeat",
        "repeat"
      ]
    ]), t("bg-no-repeat", [
      [
        "background-repeat",
        "no-repeat"
      ]
    ]), t("bg-repeat-x", [
      [
        "background-repeat",
        "repeat-x"
      ]
    ]), t("bg-repeat-y", [
      [
        "background-repeat",
        "repeat-y"
      ]
    ]), t("bg-repeat-round", [
      [
        "background-repeat",
        "round"
      ]
    ]), t("bg-repeat-space", [
      [
        "background-repeat",
        "space"
      ]
    ]), t("bg-none", [
      [
        "background-image",
        "none"
      ]
    ]);
    {
      let i = function(x) {
        let z = "in oklab";
        if ((x == null ? void 0 : x.kind) === "named") switch (x.value) {
          case "longer":
          case "shorter":
          case "increasing":
          case "decreasing":
            z = `in oklch ${x.value} hue`;
            break;
          default:
            z = `in ${x.value}`;
        }
        else (x == null ? void 0 : x.kind) === "arbitrary" && (z = x.value);
        return z;
      }, f = function({ negative: x }) {
        return (z) => {
          if (!z.value) return;
          if (z.value.kind === "arbitrary") {
            if (z.modifier) return;
            let K = z.value.value;
            switch (z.value.dataType ?? N(K, [
              "angle"
            ])) {
              case "angle":
                return K = x ? `calc(${K} * -1)` : `${K}`, [
                  d("--tw-gradient-position", K),
                  d("background-image", `linear-gradient(var(--tw-gradient-stops,${K}))`)
                ];
              default:
                return x ? void 0 : [
                  d("--tw-gradient-position", K),
                  d("background-image", `linear-gradient(var(--tw-gradient-stops,${K}))`)
                ];
            }
          }
          let A = z.value.value;
          if (!x && w.has(A)) A = w.get(A);
          else if (j(A)) A = x ? `calc(${A}deg * -1)` : `${A}deg`;
          else return;
          let $ = i(z.modifier);
          return [
            d("--tw-gradient-position", `${A} ${$}`),
            d("background-image", "linear-gradient(var(--tw-gradient-stops))")
          ];
        };
      }, m = function({ negative: x }) {
        return (z) => {
          var _a2;
          if (((_a2 = z.value) == null ? void 0 : _a2.kind) === "arbitrary") {
            if (z.modifier) return;
            let K = z.value.value;
            return [
              d("--tw-gradient-position", K),
              d("background-image", `conic-gradient(var(--tw-gradient-stops,${K}))`)
            ];
          }
          let A = i(z.modifier);
          if (!z.value) return [
            d("--tw-gradient-position", A),
            d("background-image", "conic-gradient(var(--tw-gradient-stops))")
          ];
          let $ = z.value.value;
          if (j($)) return $ = x ? `calc(${$} * -1)` : `${$}deg`, [
            d("--tw-gradient-position", `from ${$} ${A}`),
            d("background-image", "conic-gradient(var(--tw-gradient-stops))")
          ];
        };
      }, k = [
        "oklab",
        "oklch",
        "srgb",
        "hsl",
        "longer",
        "shorter",
        "increasing",
        "decreasing"
      ], w = /* @__PURE__ */ new Map([
        [
          "to-t",
          "to top"
        ],
        [
          "to-tr",
          "to top right"
        ],
        [
          "to-r",
          "to right"
        ],
        [
          "to-br",
          "to bottom right"
        ],
        [
          "to-b",
          "to bottom"
        ],
        [
          "to-bl",
          "to bottom left"
        ],
        [
          "to-l",
          "to left"
        ],
        [
          "to-tl",
          "to top left"
        ]
      ]);
      r.functional("-bg-linear", f({
        negative: true
      })), r.functional("bg-linear", f({
        negative: false
      })), n("bg-linear", () => [
        {
          values: [
            ...w.keys()
          ],
          modifiers: k
        },
        {
          values: [
            "0",
            "30",
            "60",
            "90",
            "120",
            "150",
            "180",
            "210",
            "240",
            "270",
            "300",
            "330"
          ],
          supportsNegative: true,
          modifiers: k
        }
      ]), r.functional("-bg-conic", m({
        negative: true
      })), r.functional("bg-conic", m({
        negative: false
      })), n("bg-conic", () => [
        {
          hasDefaultValue: true,
          modifiers: k
        },
        {
          values: [
            "0",
            "30",
            "60",
            "90",
            "120",
            "150",
            "180",
            "210",
            "240",
            "270",
            "300",
            "330"
          ],
          supportsNegative: true,
          modifiers: k
        }
      ]), r.functional("bg-radial", (x) => {
        if (!x.value) {
          let z = i(x.modifier);
          return [
            d("--tw-gradient-position", z),
            d("background-image", "radial-gradient(var(--tw-gradient-stops))")
          ];
        }
        if (x.value.kind === "arbitrary") {
          if (x.modifier) return;
          let z = x.value.value;
          return [
            d("--tw-gradient-position", z),
            d("background-image", `radial-gradient(var(--tw-gradient-stops,${z}))`)
          ];
        }
      }), n("bg-radial", () => [
        {
          hasDefaultValue: true,
          modifiers: k
        }
      ]);
    }
    r.functional("bg", (i) => {
      if (i.value) {
        if (i.value.kind === "arbitrary") {
          let f = i.value.value;
          switch (i.value.dataType ?? N(f, [
            "image",
            "color",
            "percentage",
            "position",
            "bg-size",
            "length",
            "url"
          ])) {
            case "percentage":
            case "position":
              return i.modifier ? void 0 : [
                d("background-position", f)
              ];
            case "bg-size":
            case "length":
            case "size":
              return i.modifier ? void 0 : [
                d("background-size", f)
              ];
            case "image":
            case "url":
              return i.modifier ? void 0 : [
                d("background-image", f)
              ];
            default:
              return f = W(f, i.modifier, e), f === null ? void 0 : [
                d("background-color", f)
              ];
          }
        }
        {
          let f = _(i, e, [
            "--background-color",
            "--color"
          ]);
          if (f) return [
            d("background-color", f)
          ];
        }
        {
          if (i.modifier) return;
          let f = e.resolve(i.value.value, [
            "--background-image"
          ]);
          if (f) return [
            d("background-image", f)
          ];
        }
      }
    }), n("bg", () => [
      {
        values: [
          "current",
          "inherit",
          "transparent"
        ],
        valueThemeKeys: [
          "--background-color",
          "--color"
        ],
        modifiers: Array.from({
          length: 21
        }, (i, f) => `${f * 5}`)
      },
      {
        values: [],
        valueThemeKeys: [
          "--background-image"
        ]
      }
    ]);
    let y = () => E([
      T("--tw-gradient-position"),
      T("--tw-gradient-from", "#0000", "<color>"),
      T("--tw-gradient-via", "#0000", "<color>"),
      T("--tw-gradient-to", "#0000", "<color>"),
      T("--tw-gradient-stops"),
      T("--tw-gradient-via-stops"),
      T("--tw-gradient-from-position", "0%", "<length-percentage>"),
      T("--tw-gradient-via-position", "50%", "<length-percentage>"),
      T("--tw-gradient-to-position", "100%", "<length-percentage>")
    ]);
    function v(i, f) {
      r.functional(i, (m) => {
        if (m.value) {
          if (m.value.kind === "arbitrary") {
            let k = m.value.value;
            switch (m.value.dataType ?? N(k, [
              "color",
              "length",
              "percentage"
            ])) {
              case "length":
              case "percentage":
                return m.modifier ? void 0 : f.position(k);
              default:
                return k = W(k, m.modifier, e), k === null ? void 0 : f.color(k);
            }
          }
          {
            let k = _(m, e, [
              "--background-color",
              "--color"
            ]);
            if (k) return f.color(k);
          }
          {
            if (m.modifier) return;
            let k = e.resolve(m.value.value, [
              "--gradient-color-stop-positions"
            ]);
            if (k) return f.position(k);
            if (m.value.value[m.value.value.length - 1] === "%" && j(m.value.value.slice(0, -1))) return f.position(m.value.value);
          }
        }
      }), n(i, () => [
        {
          values: [
            "current",
            "inherit",
            "transparent"
          ],
          valueThemeKeys: [
            "--background-color",
            "--color"
          ],
          modifiers: Array.from({
            length: 21
          }, (m, k) => `${k * 5}`)
        },
        {
          values: Array.from({
            length: 21
          }, (m, k) => `${k * 5}%`),
          valueThemeKeys: [
            "--gradient-color-stop-positions"
          ]
        }
      ]);
    }
    v("from", {
      color: (i) => [
        y(),
        d("--tw-sort", "--tw-gradient-from"),
        d("--tw-gradient-from", i),
        d("--tw-gradient-stops", "var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position))")
      ],
      position: (i) => [
        y(),
        d("--tw-gradient-from-position", i)
      ]
    }), t("via-none", [
      [
        "--tw-gradient-via-stops",
        "initial"
      ]
    ]), v("via", {
      color: (i) => [
        y(),
        d("--tw-sort", "--tw-gradient-via"),
        d("--tw-gradient-via", i),
        d("--tw-gradient-via-stops", "var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-via) var(--tw-gradient-via-position), var(--tw-gradient-to) var(--tw-gradient-to-position)"),
        d("--tw-gradient-stops", "var(--tw-gradient-via-stops)")
      ],
      position: (i) => [
        y(),
        d("--tw-gradient-via-position", i)
      ]
    }), v("to", {
      color: (i) => [
        y(),
        d("--tw-sort", "--tw-gradient-to"),
        d("--tw-gradient-to", i),
        d("--tw-gradient-stops", "var(--tw-gradient-via-stops, var(--tw-gradient-position), var(--tw-gradient-from) var(--tw-gradient-from-position), var(--tw-gradient-to) var(--tw-gradient-to-position))")
      ],
      position: (i) => [
        y(),
        d("--tw-gradient-to-position", i)
      ]
    }), t("box-decoration-slice", [
      [
        "-webkit-box-decoration-break",
        "slice"
      ],
      [
        "box-decoration-break",
        "slice"
      ]
    ]), t("box-decoration-clone", [
      [
        "-webkit-box-decoration-break",
        "clone"
      ],
      [
        "box-decoration-break",
        "clone"
      ]
    ]), t("bg-clip-text", [
      [
        "background-clip",
        "text"
      ]
    ]), t("bg-clip-border", [
      [
        "background-clip",
        "border-box"
      ]
    ]), t("bg-clip-padding", [
      [
        "background-clip",
        "padding-box"
      ]
    ]), t("bg-clip-content", [
      [
        "background-clip",
        "content-box"
      ]
    ]), t("bg-origin-border", [
      [
        "background-origin",
        "border-box"
      ]
    ]), t("bg-origin-padding", [
      [
        "background-origin",
        "padding-box"
      ]
    ]), t("bg-origin-content", [
      [
        "background-origin",
        "content-box"
      ]
    ]);
    for (let i of [
      "normal",
      "multiply",
      "screen",
      "overlay",
      "darken",
      "lighten",
      "color-dodge",
      "color-burn",
      "hard-light",
      "soft-light",
      "difference",
      "exclusion",
      "hue",
      "saturation",
      "color",
      "luminosity"
    ]) t(`bg-blend-${i}`, [
      [
        "background-blend-mode",
        i
      ]
    ]), t(`mix-blend-${i}`, [
      [
        "mix-blend-mode",
        i
      ]
    ]);
    t("mix-blend-plus-darker", [
      [
        "mix-blend-mode",
        "plus-darker"
      ]
    ]), t("mix-blend-plus-lighter", [
      [
        "mix-blend-mode",
        "plus-lighter"
      ]
    ]), t("fill-none", [
      [
        "fill",
        "none"
      ]
    ]), r.functional("fill", (i) => {
      if (!i.value) return;
      if (i.value.kind === "arbitrary") {
        let m = W(i.value.value, i.modifier, e);
        return m === null ? void 0 : [
          d("fill", m)
        ];
      }
      let f = _(i, e, [
        "--fill",
        "--color"
      ]);
      if (f) return [
        d("fill", f)
      ];
    }), n("fill", () => [
      {
        values: [
          "current",
          "inherit",
          "transparent"
        ],
        valueThemeKeys: [
          "--fill",
          "--color"
        ],
        modifiers: Array.from({
          length: 21
        }, (i, f) => `${f * 5}`)
      }
    ]), t("stroke-none", [
      [
        "stroke",
        "none"
      ]
    ]), r.functional("stroke", (i) => {
      if (i.value) {
        if (i.value.kind === "arbitrary") {
          let f = i.value.value;
          switch (i.value.dataType ?? N(f, [
            "color",
            "number",
            "length",
            "percentage"
          ])) {
            case "number":
            case "length":
            case "percentage":
              return i.modifier ? void 0 : [
                d("stroke-width", f)
              ];
            default:
              return f = W(i.value.value, i.modifier, e), f === null ? void 0 : [
                d("stroke", f)
              ];
          }
        }
        {
          let f = _(i, e, [
            "--stroke",
            "--color"
          ]);
          if (f) return [
            d("stroke", f)
          ];
        }
        {
          let f = e.resolve(i.value.value, [
            "--stroke-width"
          ]);
          if (f) return [
            d("stroke-width", f)
          ];
          if (j(i.value.value)) return [
            d("stroke-width", i.value.value)
          ];
        }
      }
    }), n("stroke", () => [
      {
        values: [
          "current",
          "inherit",
          "transparent"
        ],
        valueThemeKeys: [
          "--stroke",
          "--color"
        ],
        modifiers: Array.from({
          length: 21
        }, (i, f) => `${f * 5}`)
      },
      {
        values: [
          "0",
          "1",
          "2",
          "3"
        ],
        valueThemeKeys: [
          "--stroke-width"
        ]
      }
    ]), t("object-contain", [
      [
        "object-fit",
        "contain"
      ]
    ]), t("object-cover", [
      [
        "object-fit",
        "cover"
      ]
    ]), t("object-fill", [
      [
        "object-fit",
        "fill"
      ]
    ]), t("object-none", [
      [
        "object-fit",
        "none"
      ]
    ]), t("object-scale-down", [
      [
        "object-fit",
        "scale-down"
      ]
    ]), t("object-bottom", [
      [
        "object-position",
        "bottom"
      ]
    ]), t("object-center", [
      [
        "object-position",
        "center"
      ]
    ]), t("object-left", [
      [
        "object-position",
        "left"
      ]
    ]), t("object-left-bottom", [
      [
        "object-position",
        "left bottom"
      ]
    ]), t("object-left-top", [
      [
        "object-position",
        "left top"
      ]
    ]), t("object-right", [
      [
        "object-position",
        "right"
      ]
    ]), t("object-right-bottom", [
      [
        "object-position",
        "right bottom"
      ]
    ]), t("object-right-top", [
      [
        "object-position",
        "right top"
      ]
    ]), t("object-top", [
      [
        "object-position",
        "top"
      ]
    ]), o("object", {
      themeKeys: [
        "--object-position"
      ],
      handle: (i) => [
        d("object-position", i)
      ]
    });
    for (let [i, f] of [
      [
        "p",
        "padding"
      ],
      [
        "px",
        "padding-inline"
      ],
      [
        "py",
        "padding-block"
      ],
      [
        "ps",
        "padding-inline-start"
      ],
      [
        "pe",
        "padding-inline-end"
      ],
      [
        "pt",
        "padding-top"
      ],
      [
        "pr",
        "padding-right"
      ],
      [
        "pb",
        "padding-bottom"
      ],
      [
        "pl",
        "padding-left"
      ]
    ]) a(i, [
      "--padding",
      "--spacing"
    ], (m) => [
      d(f, m)
    ]);
    t("text-left", [
      [
        "text-align",
        "left"
      ]
    ]), t("text-center", [
      [
        "text-align",
        "center"
      ]
    ]), t("text-right", [
      [
        "text-align",
        "right"
      ]
    ]), t("text-justify", [
      [
        "text-align",
        "justify"
      ]
    ]), t("text-start", [
      [
        "text-align",
        "start"
      ]
    ]), t("text-end", [
      [
        "text-align",
        "end"
      ]
    ]), a("indent", [
      "--text-indent",
      "--spacing"
    ], (i) => [
      d("text-indent", i)
    ], {
      supportsNegative: true
    }), t("align-baseline", [
      [
        "vertical-align",
        "baseline"
      ]
    ]), t("align-top", [
      [
        "vertical-align",
        "top"
      ]
    ]), t("align-middle", [
      [
        "vertical-align",
        "middle"
      ]
    ]), t("align-bottom", [
      [
        "vertical-align",
        "bottom"
      ]
    ]), t("align-text-top", [
      [
        "vertical-align",
        "text-top"
      ]
    ]), t("align-text-bottom", [
      [
        "vertical-align",
        "text-bottom"
      ]
    ]), t("align-sub", [
      [
        "vertical-align",
        "sub"
      ]
    ]), t("align-super", [
      [
        "vertical-align",
        "super"
      ]
    ]), o("align", {
      themeKeys: [],
      handle: (i) => [
        d("vertical-align", i)
      ]
    }), r.functional("font", (i) => {
      if (!(!i.value || i.modifier)) {
        if (i.value.kind === "arbitrary") {
          let f = i.value.value;
          switch (i.value.dataType ?? N(f, [
            "number",
            "generic-name",
            "family-name"
          ])) {
            case "generic-name":
            case "family-name":
              return [
                d("font-family", f)
              ];
            default:
              return [
                E([
                  T("--tw-font-weight")
                ]),
                d("--tw-font-weight", f),
                d("font-weight", f)
              ];
          }
        }
        {
          let f = e.resolveWith(i.value.value, [
            "--font"
          ], [
            "--font-feature-settings",
            "--font-variation-settings"
          ]);
          if (f) {
            let [m, k = {}] = f;
            return [
              d("font-family", m),
              d("font-feature-settings", k["--font-feature-settings"]),
              d("font-variation-settings", k["--font-variation-settings"])
            ];
          }
        }
        {
          let f = e.resolve(i.value.value, [
            "--font-weight"
          ]);
          if (f) return [
            E([
              T("--tw-font-weight")
            ]),
            d("--tw-font-weight", f),
            d("font-weight", f)
          ];
        }
      }
    }), n("font", () => [
      {
        values: [],
        valueThemeKeys: [
          "--font"
        ]
      },
      {
        values: [],
        valueThemeKeys: [
          "--font-weight"
        ]
      }
    ]), t("uppercase", [
      [
        "text-transform",
        "uppercase"
      ]
    ]), t("lowercase", [
      [
        "text-transform",
        "lowercase"
      ]
    ]), t("capitalize", [
      [
        "text-transform",
        "capitalize"
      ]
    ]), t("normal-case", [
      [
        "text-transform",
        "none"
      ]
    ]), t("italic", [
      [
        "font-style",
        "italic"
      ]
    ]), t("not-italic", [
      [
        "font-style",
        "normal"
      ]
    ]), t("underline", [
      [
        "text-decoration-line",
        "underline"
      ]
    ]), t("overline", [
      [
        "text-decoration-line",
        "overline"
      ]
    ]), t("line-through", [
      [
        "text-decoration-line",
        "line-through"
      ]
    ]), t("no-underline", [
      [
        "text-decoration-line",
        "none"
      ]
    ]), t("font-stretch-normal", [
      [
        "font-stretch",
        "normal"
      ]
    ]), t("font-stretch-ultra-condensed", [
      [
        "font-stretch",
        "ultra-condensed"
      ]
    ]), t("font-stretch-extra-condensed", [
      [
        "font-stretch",
        "extra-condensed"
      ]
    ]), t("font-stretch-condensed", [
      [
        "font-stretch",
        "condensed"
      ]
    ]), t("font-stretch-semi-condensed", [
      [
        "font-stretch",
        "semi-condensed"
      ]
    ]), t("font-stretch-semi-expanded", [
      [
        "font-stretch",
        "semi-expanded"
      ]
    ]), t("font-stretch-expanded", [
      [
        "font-stretch",
        "expanded"
      ]
    ]), t("font-stretch-extra-expanded", [
      [
        "font-stretch",
        "extra-expanded"
      ]
    ]), t("font-stretch-ultra-expanded", [
      [
        "font-stretch",
        "ultra-expanded"
      ]
    ]), o("font-stretch", {
      handleBareValue: ({ value: i }) => {
        if (!i.endsWith("%")) return null;
        let f = Number(i.slice(0, -1));
        return !j(f) || Number.isNaN(f) || f < 50 || f > 200 ? null : i;
      },
      handle: (i) => [
        d("font-stretch", i)
      ]
    }), n("font-stretch", () => [
      {
        values: [
          "50%",
          "75%",
          "90%",
          "95%",
          "100%",
          "105%",
          "110%",
          "125%",
          "150%",
          "200%"
        ]
      }
    ]), l("placeholder", {
      themeKeys: [
        "--background-color",
        "--color"
      ],
      handle: (i) => [
        S("&::placeholder", [
          d("--tw-sort", "placeholder-color"),
          d("color", i)
        ])
      ]
    }), t("decoration-solid", [
      [
        "text-decoration-style",
        "solid"
      ]
    ]), t("decoration-double", [
      [
        "text-decoration-style",
        "double"
      ]
    ]), t("decoration-dotted", [
      [
        "text-decoration-style",
        "dotted"
      ]
    ]), t("decoration-dashed", [
      [
        "text-decoration-style",
        "dashed"
      ]
    ]), t("decoration-wavy", [
      [
        "text-decoration-style",
        "wavy"
      ]
    ]), t("decoration-auto", [
      [
        "text-decoration-thickness",
        "auto"
      ]
    ]), t("decoration-from-font", [
      [
        "text-decoration-thickness",
        "from-font"
      ]
    ]), r.functional("decoration", (i) => {
      if (i.value) {
        if (i.value.kind === "arbitrary") {
          let f = i.value.value;
          switch (i.value.dataType ?? N(f, [
            "color",
            "length",
            "percentage"
          ])) {
            case "length":
            case "percentage":
              return i.modifier ? void 0 : [
                d("text-decoration-thickness", f)
              ];
            default:
              return f = W(f, i.modifier, e), f === null ? void 0 : [
                d("text-decoration-color", f)
              ];
          }
        }
        {
          let f = e.resolve(i.value.value, [
            "--text-decoration-thickness"
          ]);
          if (f) return i.modifier ? void 0 : [
            d("text-decoration-thickness", f)
          ];
          if (j(i.value.value)) return i.modifier ? void 0 : [
            d("text-decoration-thickness", `${i.value.value}px`)
          ];
        }
        {
          let f = _(i, e, [
            "--text-decoration-color",
            "--color"
          ]);
          if (f) return [
            d("text-decoration-color", f)
          ];
        }
      }
    }), n("decoration", () => [
      {
        values: [
          "current",
          "inherit",
          "transparent"
        ],
        valueThemeKeys: [
          "--text-decoration-color",
          "--color"
        ],
        modifiers: Array.from({
          length: 21
        }, (i, f) => `${f * 5}`)
      },
      {
        values: [
          "0",
          "1",
          "2"
        ],
        valueThemeKeys: [
          "--text-decoration-thickness"
        ]
      }
    ]), t("animate-none", [
      [
        "animation",
        "none"
      ]
    ]), o("animate", {
      themeKeys: [
        "--animate"
      ],
      handle: (i) => [
        d("animation", i)
      ]
    });
    {
      let i = [
        "var(--tw-blur,)",
        "var(--tw-brightness,)",
        "var(--tw-contrast,)",
        "var(--tw-grayscale,)",
        "var(--tw-hue-rotate,)",
        "var(--tw-invert,)",
        "var(--tw-saturate,)",
        "var(--tw-sepia,)",
        "var(--tw-drop-shadow,)"
      ].join(" "), f = [
        "var(--tw-backdrop-blur,)",
        "var(--tw-backdrop-brightness,)",
        "var(--tw-backdrop-contrast,)",
        "var(--tw-backdrop-grayscale,)",
        "var(--tw-backdrop-hue-rotate,)",
        "var(--tw-backdrop-invert,)",
        "var(--tw-backdrop-opacity,)",
        "var(--tw-backdrop-saturate,)",
        "var(--tw-backdrop-sepia,)"
      ].join(" "), m = () => E([
        T("--tw-blur"),
        T("--tw-brightness"),
        T("--tw-contrast"),
        T("--tw-grayscale"),
        T("--tw-hue-rotate"),
        T("--tw-invert"),
        T("--tw-opacity"),
        T("--tw-saturate"),
        T("--tw-sepia"),
        T("--tw-drop-shadow")
      ]), k = () => E([
        T("--tw-backdrop-blur"),
        T("--tw-backdrop-brightness"),
        T("--tw-backdrop-contrast"),
        T("--tw-backdrop-grayscale"),
        T("--tw-backdrop-hue-rotate"),
        T("--tw-backdrop-invert"),
        T("--tw-backdrop-opacity"),
        T("--tw-backdrop-saturate"),
        T("--tw-backdrop-sepia")
      ]);
      r.functional("filter", (w) => {
        if (!w.modifier) {
          if (w.value === null) return [
            m(),
            d("filter", i)
          ];
          if (w.value.kind === "arbitrary") return [
            d("filter", w.value.value)
          ];
          switch (w.value.value) {
            case "none":
              return [
                d("filter", "none")
              ];
          }
        }
      }), r.functional("backdrop-filter", (w) => {
        if (!w.modifier) {
          if (w.value === null) return [
            k(),
            d("-webkit-backdrop-filter", f),
            d("backdrop-filter", f)
          ];
          if (w.value.kind === "arbitrary") return [
            d("-webkit-backdrop-filter", w.value.value),
            d("backdrop-filter", w.value.value)
          ];
          switch (w.value.value) {
            case "none":
              return [
                d("-webkit-backdrop-filter", "none"),
                d("backdrop-filter", "none")
              ];
          }
        }
      }), o("blur", {
        themeKeys: [
          "--blur"
        ],
        handle: (w) => [
          m(),
          d("--tw-blur", `blur(${w})`),
          d("filter", i)
        ]
      }), t("blur-none", [
        m,
        [
          "--tw-blur",
          " "
        ],
        [
          "filter",
          i
        ]
      ]), o("backdrop-blur", {
        themeKeys: [
          "--backdrop-blur",
          "--blur"
        ],
        handle: (w) => [
          k(),
          d("--tw-backdrop-blur", `blur(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), t("backdrop-blur-none", [
        k,
        [
          "--tw-backdrop-blur",
          " "
        ],
        [
          "-webkit-backdrop-filter",
          f
        ],
        [
          "backdrop-filter",
          f
        ]
      ]), o("brightness", {
        themeKeys: [
          "--brightness"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        handle: (w) => [
          m(),
          d("--tw-brightness", `brightness(${w})`),
          d("filter", i)
        ]
      }), o("backdrop-brightness", {
        themeKeys: [
          "--backdrop-brightness",
          "--brightness"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        handle: (w) => [
          k(),
          d("--tw-backdrop-brightness", `brightness(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), n("brightness", () => [
        {
          values: [
            "0",
            "50",
            "75",
            "90",
            "95",
            "100",
            "105",
            "110",
            "125",
            "150",
            "200"
          ],
          valueThemeKeys: [
            "--brightness"
          ]
        }
      ]), n("backdrop-brightness", () => [
        {
          values: [
            "0",
            "50",
            "75",
            "90",
            "95",
            "100",
            "105",
            "110",
            "125",
            "150",
            "200"
          ],
          valueThemeKeys: [
            "--backdrop-brightness",
            "--brightness"
          ]
        }
      ]), o("contrast", {
        themeKeys: [
          "--contrast"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        handle: (w) => [
          m(),
          d("--tw-contrast", `contrast(${w})`),
          d("filter", i)
        ]
      }), o("backdrop-contrast", {
        themeKeys: [
          "--backdrop-contrast",
          "--contrast"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        handle: (w) => [
          k(),
          d("--tw-backdrop-contrast", `contrast(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), n("contrast", () => [
        {
          values: [
            "0",
            "50",
            "75",
            "100",
            "125",
            "150",
            "200"
          ],
          valueThemeKeys: [
            "--contrast"
          ]
        }
      ]), n("backdrop-contrast", () => [
        {
          values: [
            "0",
            "50",
            "75",
            "100",
            "125",
            "150",
            "200"
          ],
          valueThemeKeys: [
            "--backdrop-contrast",
            "--contrast"
          ]
        }
      ]), o("grayscale", {
        themeKeys: [
          "--grayscale"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        defaultValue: "100%",
        handle: (w) => [
          m(),
          d("--tw-grayscale", `grayscale(${w})`),
          d("filter", i)
        ]
      }), o("backdrop-grayscale", {
        themeKeys: [
          "--backdrop-grayscale",
          "--grayscale"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        defaultValue: "100%",
        handle: (w) => [
          k(),
          d("--tw-backdrop-grayscale", `grayscale(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), n("grayscale", () => [
        {
          values: [
            "0",
            "25",
            "50",
            "75",
            "100"
          ],
          valueThemeKeys: [
            "--grayscale"
          ],
          hasDefaultValue: true
        }
      ]), n("backdrop-grayscale", () => [
        {
          values: [
            "0",
            "25",
            "50",
            "75",
            "100"
          ],
          valueThemeKeys: [
            "--backdrop-grayscale",
            "--grayscale"
          ],
          hasDefaultValue: true
        }
      ]), o("hue-rotate", {
        supportsNegative: true,
        themeKeys: [
          "--hue-rotate"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}deg` : null,
        handle: (w) => [
          m(),
          d("--tw-hue-rotate", `hue-rotate(${w})`),
          d("filter", i)
        ]
      }), o("backdrop-hue-rotate", {
        supportsNegative: true,
        themeKeys: [
          "--backdrop-hue-rotate",
          "--hue-rotate"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}deg` : null,
        handle: (w) => [
          k(),
          d("--tw-backdrop-hue-rotate", `hue-rotate(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), n("hue-rotate", () => [
        {
          values: [
            "0",
            "15",
            "30",
            "60",
            "90",
            "180"
          ],
          valueThemeKeys: [
            "--hue-rotate"
          ]
        }
      ]), n("backdrop-hue-rotate", () => [
        {
          values: [
            "0",
            "15",
            "30",
            "60",
            "90",
            "180"
          ],
          valueThemeKeys: [
            "--backdrop-hue-rotate",
            "--hue-rotate"
          ]
        }
      ]), o("invert", {
        themeKeys: [
          "--invert"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        defaultValue: "100%",
        handle: (w) => [
          m(),
          d("--tw-invert", `invert(${w})`),
          d("filter", i)
        ]
      }), o("backdrop-invert", {
        themeKeys: [
          "--backdrop-invert",
          "--invert"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        defaultValue: "100%",
        handle: (w) => [
          k(),
          d("--tw-backdrop-invert", `invert(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), n("invert", () => [
        {
          values: [
            "0",
            "25",
            "50",
            "75",
            "100"
          ],
          valueThemeKeys: [
            "--invert"
          ],
          hasDefaultValue: true
        }
      ]), n("backdrop-invert", () => [
        {
          values: [
            "0",
            "25",
            "50",
            "75",
            "100"
          ],
          valueThemeKeys: [
            "--backdrop-invert",
            "--invert"
          ],
          hasDefaultValue: true
        }
      ]), o("saturate", {
        themeKeys: [
          "--saturate"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        handle: (w) => [
          m(),
          d("--tw-saturate", `saturate(${w})`),
          d("filter", i)
        ]
      }), o("backdrop-saturate", {
        themeKeys: [
          "--backdrop-saturate",
          "--saturate"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        handle: (w) => [
          k(),
          d("--tw-backdrop-saturate", `saturate(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), n("saturate", () => [
        {
          values: [
            "0",
            "50",
            "100",
            "150",
            "200"
          ],
          valueThemeKeys: [
            "--saturate"
          ]
        }
      ]), n("backdrop-saturate", () => [
        {
          values: [
            "0",
            "50",
            "100",
            "150",
            "200"
          ],
          valueThemeKeys: [
            "--backdrop-saturate",
            "--saturate"
          ]
        }
      ]), o("sepia", {
        themeKeys: [
          "--sepia"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        defaultValue: "100%",
        handle: (w) => [
          m(),
          d("--tw-sepia", `sepia(${w})`),
          d("filter", i)
        ]
      }), o("backdrop-sepia", {
        themeKeys: [
          "--backdrop-sepia",
          "--sepia"
        ],
        handleBareValue: ({ value: w }) => j(w) ? `${w}%` : null,
        defaultValue: "100%",
        handle: (w) => [
          k(),
          d("--tw-backdrop-sepia", `sepia(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), n("sepia", () => [
        {
          values: [
            "0",
            "50",
            "100"
          ],
          valueThemeKeys: [
            "--sepia"
          ],
          hasDefaultValue: true
        }
      ]), n("backdrop-sepia", () => [
        {
          values: [
            "0",
            "50",
            "100"
          ],
          valueThemeKeys: [
            "--backdrop-sepia",
            "--sepia"
          ],
          hasDefaultValue: true
        }
      ]), t("drop-shadow-none", [
        m,
        [
          "--tw-drop-shadow",
          " "
        ],
        [
          "filter",
          i
        ]
      ]), o("drop-shadow", {
        themeKeys: [
          "--drop-shadow"
        ],
        handle: (w) => [
          m(),
          d("--tw-drop-shadow", C(w, ",").map((x) => `drop-shadow(${x})`).join(" ")),
          d("filter", i)
        ]
      }), o("backdrop-opacity", {
        themeKeys: [
          "--backdrop-opacity",
          "--opacity"
        ],
        handleBareValue: ({ value: w }) => Fe(w) ? `${w}%` : null,
        handle: (w) => [
          k(),
          d("--tw-backdrop-opacity", `opacity(${w})`),
          d("-webkit-backdrop-filter", f),
          d("backdrop-filter", f)
        ]
      }), n("backdrop-opacity", () => [
        {
          values: Array.from({
            length: 21
          }, (w, x) => `${x * 5}`),
          valueThemeKeys: [
            "--backdrop-opacity",
            "--opacity"
          ]
        }
      ]);
    }
    {
      let i = `var(--tw-ease, ${e.resolve(null, [
        "--default-transition-timing-function"
      ]) ?? "ease"})`, f = `var(--tw-duration, ${e.resolve(null, [
        "--default-transition-duration"
      ]) ?? "0s"})`;
      t("transition-none", [
        [
          "transition-property",
          "none"
        ]
      ]), t("transition-all", [
        [
          "transition-property",
          "all"
        ],
        [
          "transition-timing-function",
          i
        ],
        [
          "transition-duration",
          f
        ]
      ]), t("transition-colors", [
        [
          "transition-property",
          "color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, --tw-gradient-from, --tw-gradient-via, --tw-gradient-to"
        ],
        [
          "transition-timing-function",
          i
        ],
        [
          "transition-duration",
          f
        ]
      ]), t("transition-opacity", [
        [
          "transition-property",
          "opacity"
        ],
        [
          "transition-timing-function",
          i
        ],
        [
          "transition-duration",
          f
        ]
      ]), t("transition-shadow", [
        [
          "transition-property",
          "box-shadow"
        ],
        [
          "transition-timing-function",
          i
        ],
        [
          "transition-duration",
          f
        ]
      ]), t("transition-transform", [
        [
          "transition-property",
          "transform, translate, scale, rotate"
        ],
        [
          "transition-timing-function",
          i
        ],
        [
          "transition-duration",
          f
        ]
      ]), o("transition", {
        defaultValue: "color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, --tw-gradient-from, --tw-gradient-via, --tw-gradient-to, opacity, box-shadow, transform, translate, scale, rotate, filter, -webkit-backdrop-filter, backdrop-filter",
        themeKeys: [
          "--transition-property"
        ],
        handle: (m) => [
          d("transition-property", m),
          d("transition-timing-function", i),
          d("transition-duration", f)
        ]
      }), t("transition-discrete", [
        [
          "transition-behavior",
          "allow-discrete"
        ]
      ]), t("transition-normal", [
        [
          "transition-behavior",
          "normal"
        ]
      ]), o("delay", {
        handleBareValue: ({ value: m }) => j(m) ? `${m}ms` : null,
        themeKeys: [
          "--transition-delay"
        ],
        handle: (m) => [
          d("transition-delay", m)
        ]
      });
      {
        let m = () => E([
          T("--tw-duration")
        ]);
        t("duration-initial", [
          m,
          [
            "--tw-duration",
            "initial"
          ]
        ]), r.functional("duration", (k) => {
          if (k.modifier || !k.value) return;
          let w = null;
          if (k.value.kind === "arbitrary" ? w = k.value.value : (w = e.resolve(k.value.fraction ?? k.value.value, [
            "--transition-duration"
          ]), w === null && j(k.value.value) && (w = `${k.value.value}ms`)), w !== null) return [
            m(),
            d("--tw-duration", w),
            d("transition-duration", w)
          ];
        });
      }
      n("delay", () => [
        {
          values: [
            "75",
            "100",
            "150",
            "200",
            "300",
            "500",
            "700",
            "1000"
          ],
          valueThemeKeys: [
            "--transition-delay"
          ]
        }
      ]), n("duration", () => [
        {
          values: [
            "75",
            "100",
            "150",
            "200",
            "300",
            "500",
            "700",
            "1000"
          ],
          valueThemeKeys: [
            "--transition-duration"
          ]
        }
      ]);
    }
    {
      let i = () => E([
        T("--tw-ease")
      ]);
      t("ease-initial", [
        i,
        [
          "--tw-ease",
          "initial"
        ]
      ]), t("ease-linear", [
        i,
        [
          "--tw-ease",
          "linear"
        ],
        [
          "transition-timing-function",
          "linear"
        ]
      ]), o("ease", {
        themeKeys: [
          "--ease"
        ],
        handle: (f) => [
          i(),
          d("--tw-ease", f),
          d("transition-timing-function", f)
        ]
      });
    }
    t("will-change-auto", [
      [
        "will-change",
        "auto"
      ]
    ]), t("will-change-scroll", [
      [
        "will-change",
        "scroll-position"
      ]
    ]), t("will-change-contents", [
      [
        "will-change",
        "contents"
      ]
    ]), t("will-change-transform", [
      [
        "will-change",
        "transform"
      ]
    ]), o("will-change", {
      themeKeys: [],
      handle: (i) => [
        d("will-change", i)
      ]
    }), t("content-none", [
      [
        "--tw-content",
        "none"
      ],
      [
        "content",
        "none"
      ]
    ]), o("content", {
      themeKeys: [],
      handle: (i) => [
        E([
          T("--tw-content", '""')
        ]),
        d("--tw-content", i),
        d("content", "var(--tw-content)")
      ]
    });
    {
      let i = "var(--tw-contain-size,) var(--tw-contain-layout,) var(--tw-contain-paint,) var(--tw-contain-style,)", f = () => E([
        T("--tw-contain-size"),
        T("--tw-contain-layout"),
        T("--tw-contain-paint"),
        T("--tw-contain-style")
      ]);
      t("contain-none", [
        [
          "contain",
          "none"
        ]
      ]), t("contain-content", [
        [
          "contain",
          "content"
        ]
      ]), t("contain-strict", [
        [
          "contain",
          "strict"
        ]
      ]), t("contain-size", [
        f,
        [
          "--tw-contain-size",
          "size"
        ],
        [
          "contain",
          i
        ]
      ]), t("contain-inline-size", [
        f,
        [
          "--tw-contain-size",
          "inline-size"
        ],
        [
          "contain",
          i
        ]
      ]), t("contain-layout", [
        f,
        [
          "--tw-contain-layout",
          "layout"
        ],
        [
          "contain",
          i
        ]
      ]), t("contain-paint", [
        f,
        [
          "--tw-contain-paint",
          "paint"
        ],
        [
          "contain",
          i
        ]
      ]), t("contain-style", [
        f,
        [
          "--tw-contain-style",
          "style"
        ],
        [
          "contain",
          i
        ]
      ]), o("contain", {
        themeKeys: [],
        handle: (m) => [
          d("contain", m)
        ]
      });
    }
    t("forced-color-adjust-none", [
      [
        "forced-color-adjust",
        "none"
      ]
    ]), t("forced-color-adjust-auto", [
      [
        "forced-color-adjust",
        "auto"
      ]
    ]), t("leading-none", [
      () => E([
        T("--tw-leading")
      ]),
      [
        "--tw-leading",
        "1"
      ],
      [
        "line-height",
        "1"
      ]
    ]), a("leading", [
      "--leading",
      "--spacing"
    ], (i) => [
      E([
        T("--tw-leading")
      ]),
      d("--tw-leading", i),
      d("line-height", i)
    ]), o("tracking", {
      supportsNegative: true,
      themeKeys: [
        "--tracking"
      ],
      handle: (i) => [
        E([
          T("--tw-tracking")
        ]),
        d("--tw-tracking", i),
        d("letter-spacing", i)
      ]
    }), t("antialiased", [
      [
        "-webkit-font-smoothing",
        "antialiased"
      ],
      [
        "-moz-osx-font-smoothing",
        "grayscale"
      ]
    ]), t("subpixel-antialiased", [
      [
        "-webkit-font-smoothing",
        "auto"
      ],
      [
        "-moz-osx-font-smoothing",
        "auto"
      ]
    ]);
    {
      let i = "var(--tw-ordinal,) var(--tw-slashed-zero,) var(--tw-numeric-figure,) var(--tw-numeric-spacing,) var(--tw-numeric-fraction,)", f = () => E([
        T("--tw-ordinal"),
        T("--tw-slashed-zero"),
        T("--tw-numeric-figure"),
        T("--tw-numeric-spacing"),
        T("--tw-numeric-fraction")
      ]);
      t("normal-nums", [
        [
          "font-variant-numeric",
          "normal"
        ]
      ]), t("ordinal", [
        f,
        [
          "--tw-ordinal",
          "ordinal"
        ],
        [
          "font-variant-numeric",
          i
        ]
      ]), t("slashed-zero", [
        f,
        [
          "--tw-slashed-zero",
          "slashed-zero"
        ],
        [
          "font-variant-numeric",
          i
        ]
      ]), t("lining-nums", [
        f,
        [
          "--tw-numeric-figure",
          "lining-nums"
        ],
        [
          "font-variant-numeric",
          i
        ]
      ]), t("oldstyle-nums", [
        f,
        [
          "--tw-numeric-figure",
          "oldstyle-nums"
        ],
        [
          "font-variant-numeric",
          i
        ]
      ]), t("proportional-nums", [
        f,
        [
          "--tw-numeric-spacing",
          "proportional-nums"
        ],
        [
          "font-variant-numeric",
          i
        ]
      ]), t("tabular-nums", [
        f,
        [
          "--tw-numeric-spacing",
          "tabular-nums"
        ],
        [
          "font-variant-numeric",
          i
        ]
      ]), t("diagonal-fractions", [
        f,
        [
          "--tw-numeric-fraction",
          "diagonal-fractions"
        ],
        [
          "font-variant-numeric",
          i
        ]
      ]), t("stacked-fractions", [
        f,
        [
          "--tw-numeric-fraction",
          "stacked-fractions"
        ],
        [
          "font-variant-numeric",
          i
        ]
      ]);
    }
    {
      let i = () => E([
        T("--tw-outline-style", "solid")
      ]);
      r.static("outline-hidden", () => [
        d("outline-style", "none"),
        O("@media", "(forced-colors: active)", [
          d("outline", "2px solid transparent"),
          d("outline-offset", "2px")
        ])
      ]), t("outline-none", [
        [
          "--tw-outline-style",
          "none"
        ],
        [
          "outline-style",
          "none"
        ]
      ]), t("outline-solid", [
        [
          "--tw-outline-style",
          "solid"
        ],
        [
          "outline-style",
          "solid"
        ]
      ]), t("outline-dashed", [
        [
          "--tw-outline-style",
          "dashed"
        ],
        [
          "outline-style",
          "dashed"
        ]
      ]), t("outline-dotted", [
        [
          "--tw-outline-style",
          "dotted"
        ],
        [
          "outline-style",
          "dotted"
        ]
      ]), t("outline-double", [
        [
          "--tw-outline-style",
          "double"
        ],
        [
          "outline-style",
          "double"
        ]
      ]), r.functional("outline", (f) => {
        if (f.value === null) {
          if (f.modifier) return;
          let m = e.get([
            "--default-outline-width"
          ]) ?? "1px";
          return [
            i(),
            d("outline-style", "var(--tw-outline-style)"),
            d("outline-width", m)
          ];
        }
        if (f.value.kind === "arbitrary") {
          let m = f.value.value;
          switch (f.value.dataType ?? N(m, [
            "color",
            "length",
            "number",
            "percentage"
          ])) {
            case "length":
            case "number":
            case "percentage":
              return f.modifier ? void 0 : [
                i(),
                d("outline-style", "var(--tw-outline-style)"),
                d("outline-width", m)
              ];
            default:
              return m = W(m, f.modifier, e), m === null ? void 0 : [
                d("outline-color", m)
              ];
          }
        }
        {
          let m = _(f, e, [
            "--outline-color",
            "--color"
          ]);
          if (m) return [
            d("outline-color", m)
          ];
        }
        {
          if (f.modifier) return;
          let m = e.resolve(f.value.value, [
            "--outline-width"
          ]);
          if (m) return [
            i(),
            d("outline-style", "var(--tw-outline-style)"),
            d("outline-width", m)
          ];
          if (j(f.value.value)) return [
            i(),
            d("outline-style", "var(--tw-outline-style)"),
            d("outline-width", `${f.value.value}px`)
          ];
        }
      }), n("outline", () => [
        {
          values: [
            "current",
            "inherit",
            "transparent"
          ],
          valueThemeKeys: [
            "--outline-color",
            "--color"
          ],
          modifiers: Array.from({
            length: 21
          }, (f, m) => `${m * 5}`),
          hasDefaultValue: true
        },
        {
          values: [
            "0",
            "1",
            "2",
            "4",
            "8"
          ],
          valueThemeKeys: [
            "--outline-width"
          ]
        }
      ]), o("outline-offset", {
        supportsNegative: true,
        themeKeys: [
          "--outline-offset"
        ],
        handleBareValue: ({ value: f }) => j(f) ? `${f}px` : null,
        handle: (f) => [
          d("outline-offset", f)
        ]
      }), n("outline-offset", () => [
        {
          supportsNegative: true,
          values: [
            "0",
            "1",
            "2",
            "4",
            "8"
          ],
          valueThemeKeys: [
            "--outline-offset"
          ]
        }
      ]);
    }
    o("opacity", {
      themeKeys: [
        "--opacity"
      ],
      handleBareValue: ({ value: i }) => Fe(i) ? `${i}%` : null,
      handle: (i) => [
        d("opacity", i)
      ]
    }), n("opacity", () => [
      {
        values: Array.from({
          length: 21
        }, (i, f) => `${f * 5}`),
        valueThemeKeys: [
          "--opacity"
        ]
      }
    ]), t("underline-offset-auto", [
      [
        "text-underline-offset",
        "auto"
      ]
    ]), o("underline-offset", {
      supportsNegative: true,
      themeKeys: [
        "--text-underline-offset"
      ],
      handleBareValue: ({ value: i }) => j(i) ? `${i}px` : null,
      handle: (i) => [
        d("text-underline-offset", i)
      ]
    }), n("underline-offset", () => [
      {
        supportsNegative: true,
        values: [
          "0",
          "1",
          "2",
          "4",
          "8"
        ],
        valueThemeKeys: [
          "--text-underline-offset"
        ]
      }
    ]), r.functional("text", (i) => {
      if (i.value) {
        if (i.value.kind === "arbitrary") {
          let f = i.value.value;
          switch (i.value.dataType ?? N(f, [
            "color",
            "length",
            "percentage",
            "absolute-size",
            "relative-size"
          ])) {
            case "size":
            case "length":
            case "percentage":
            case "absolute-size":
            case "relative-size": {
              if (i.modifier) {
                let m = i.modifier.kind === "arbitrary" ? i.modifier.value : e.resolve(i.modifier.value, [
                  "--leading"
                ]);
                if (!m && oe(i.modifier.value)) {
                  let k = e.resolve(null, [
                    "--spacing"
                  ]);
                  if (!k) return null;
                  m = `calc(${k} * ${i.modifier.value})`;
                }
                return !m && i.modifier.value === "none" && (m = "1"), m ? [
                  d("font-size", f),
                  d("line-height", m)
                ] : null;
              }
              return [
                d("font-size", f)
              ];
            }
            default:
              return f = W(f, i.modifier, e), f === null ? void 0 : [
                d("color", f)
              ];
          }
        }
        {
          let f = _(i, e, [
            "--text-color",
            "--color"
          ]);
          if (f) return [
            d("color", f)
          ];
        }
        {
          let f = e.resolveWith(i.value.value, [
            "--text"
          ], [
            "--line-height",
            "--letter-spacing",
            "--font-weight"
          ]);
          if (f) {
            let [m, k = {}] = Array.isArray(f) ? f : [
              f
            ];
            if (i.modifier) {
              let w = i.modifier.kind === "arbitrary" ? i.modifier.value : e.resolve(i.modifier.value, [
                "--leading"
              ]);
              if (!w && oe(i.modifier.value)) {
                let z = e.resolve(null, [
                  "--spacing"
                ]);
                if (!z) return null;
                w = `calc(${z} * ${i.modifier.value})`;
              }
              if (!w && i.modifier.value === "none" && (w = "1"), !w) return null;
              let x = [
                d("font-size", m)
              ];
              return w && x.push(d("line-height", w)), x;
            }
            return typeof k == "string" ? [
              d("font-size", m),
              d("line-height", k)
            ] : [
              d("font-size", m),
              d("line-height", k["--line-height"] ? `var(--tw-leading, ${k["--line-height"]})` : void 0),
              d("letter-spacing", k["--letter-spacing"] ? `var(--tw-tracking, ${k["--letter-spacing"]})` : void 0),
              d("font-weight", k["--font-weight"] ? `var(--tw-font-weight, ${k["--font-weight"]})` : void 0)
            ];
          }
        }
      }
    }), n("text", () => [
      {
        values: [
          "current",
          "inherit",
          "transparent"
        ],
        valueThemeKeys: [
          "--text-color",
          "--color"
        ],
        modifiers: Array.from({
          length: 21
        }, (i, f) => `${f * 5}`)
      },
      {
        values: [],
        valueThemeKeys: [
          "--text"
        ],
        modifiers: [],
        modifierThemeKeys: [
          "--leading"
        ]
      }
    ]);
    {
      let i = function(A) {
        return `var(--tw-ring-inset,) 0 0 0 calc(${A} + var(--tw-ring-offset-width)) var(--tw-ring-color, ${x})`;
      }, f = function(A) {
        return `inset 0 0 0 ${A} var(--tw-inset-ring-color, currentColor)`;
      }, m = [
        "var(--tw-inset-shadow)",
        "var(--tw-inset-ring-shadow)",
        "var(--tw-ring-offset-shadow)",
        "var(--tw-ring-shadow)",
        "var(--tw-shadow)"
      ].join(", "), k = "0 0 #0000", w = () => E([
        T("--tw-shadow", k),
        T("--tw-shadow-color"),
        T("--tw-inset-shadow", k),
        T("--tw-inset-shadow-color"),
        T("--tw-ring-color"),
        T("--tw-ring-shadow", k),
        T("--tw-inset-ring-color"),
        T("--tw-inset-ring-shadow", k),
        T("--tw-ring-inset"),
        T("--tw-ring-offset-width", "0px", "<length>"),
        T("--tw-ring-offset-color", "#fff"),
        T("--tw-ring-offset-shadow", k)
      ]);
      t("shadow-initial", [
        w,
        [
          "--tw-shadow-color",
          "initial"
        ]
      ]), r.functional("shadow", (A) => {
        if (!A.value) {
          let $ = e.get([
            "--shadow"
          ]);
          return $ === null ? void 0 : [
            w(),
            d("--tw-shadow", Q($, (K) => `var(--tw-shadow-color, ${K})`)),
            d("box-shadow", m)
          ];
        }
        if (A.value.kind === "arbitrary") {
          let $ = A.value.value;
          switch (A.value.dataType ?? N($, [
            "color"
          ])) {
            case "color":
              return $ = W($, A.modifier, e), $ === null ? void 0 : [
                w(),
                d("--tw-shadow-color", $)
              ];
            default:
              return [
                w(),
                d("--tw-shadow", Q($, (K) => `var(--tw-shadow-color, ${K})`)),
                d("box-shadow", m)
              ];
          }
        }
        switch (A.value.value) {
          case "none":
            return A.modifier ? void 0 : [
              w(),
              d("--tw-shadow", k),
              d("box-shadow", m)
            ];
        }
        {
          let $ = e.get([
            `--shadow-${A.value.value}`
          ]);
          if ($) return A.modifier ? void 0 : [
            w(),
            d("--tw-shadow", Q($, (K) => `var(--tw-shadow-color, ${K})`)),
            d("box-shadow", m)
          ];
        }
        {
          let $ = _(A, e, [
            "--box-shadow-color",
            "--color"
          ]);
          if ($) return [
            w(),
            d("--tw-shadow-color", $)
          ];
        }
      }), n("shadow", () => [
        {
          values: [
            "current",
            "inherit",
            "transparent"
          ],
          valueThemeKeys: [
            "--box-shadow-color",
            "--color"
          ],
          modifiers: Array.from({
            length: 21
          }, (A, $) => `${$ * 5}`)
        },
        {
          values: [
            "none"
          ],
          valueThemeKeys: [
            "--shadow"
          ],
          hasDefaultValue: true
        }
      ]), t("inset-shadow-initial", [
        w,
        [
          "--tw-inset-shadow-color",
          "initial"
        ]
      ]), r.functional("inset-shadow", (A) => {
        if (!A.value) {
          let $ = e.get([
            "--inset-shadow"
          ]);
          return $ === null ? void 0 : [
            w(),
            d("--tw-inset-shadow", Q($, (K) => `var(--tw-inset-shadow-color, ${K})`)),
            d("box-shadow", m)
          ];
        }
        if (A.value.kind === "arbitrary") {
          let $ = A.value.value;
          switch (A.value.dataType ?? N($, [
            "color"
          ])) {
            case "color":
              return $ = W($, A.modifier, e), $ === null ? void 0 : [
                w(),
                d("--tw-inset-shadow-color", $)
              ];
            default:
              return [
                w(),
                d("--tw-inset-shadow", `inset ${Q($, (K) => `var(--tw-inset-shadow-color, ${K})`)}`),
                d("box-shadow", m)
              ];
          }
        }
        switch (A.value.value) {
          case "none":
            return A.modifier ? void 0 : [
              w(),
              d("--tw-inset-shadow", k),
              d("box-shadow", m)
            ];
        }
        {
          let $ = e.get([
            `--inset-shadow-${A.value.value}`
          ]);
          if ($) return A.modifier ? void 0 : [
            w(),
            d("--tw-inset-shadow", Q($, (K) => `var(--tw-inset-shadow-color, ${K})`)),
            d("box-shadow", m)
          ];
        }
        {
          let $ = _(A, e, [
            "--box-shadow-color",
            "--color"
          ]);
          if ($) return [
            w(),
            d("--tw-inset-shadow-color", $)
          ];
        }
      }), n("inset-shadow", () => [
        {
          values: [
            "current",
            "inherit",
            "transparent"
          ],
          valueThemeKeys: [
            "--box-shadow-color",
            "--color"
          ],
          modifiers: Array.from({
            length: 21
          }, (A, $) => `${$ * 5}`)
        },
        {
          values: [],
          valueThemeKeys: [
            "--inset-shadow"
          ],
          hasDefaultValue: true
        }
      ]), t("ring-inset", [
        w,
        [
          "--tw-ring-inset",
          "inset"
        ]
      ]);
      let x = e.get([
        "--default-ring-color"
      ]) ?? "currentColor";
      r.functional("ring", (A) => {
        if (!A.value) {
          if (A.modifier) return;
          let $ = e.get([
            "--default-ring-width"
          ]) ?? "1px";
          return [
            w(),
            d("--tw-ring-shadow", i($)),
            d("box-shadow", m)
          ];
        }
        if (A.value.kind === "arbitrary") {
          let $ = A.value.value;
          switch (A.value.dataType ?? N($, [
            "color",
            "length"
          ])) {
            case "length":
              return A.modifier ? void 0 : [
                w(),
                d("--tw-ring-shadow", i($)),
                d("box-shadow", m)
              ];
            default:
              return $ = W($, A.modifier, e), $ === null ? void 0 : [
                d("--tw-ring-color", $)
              ];
          }
        }
        {
          let $ = _(A, e, [
            "--ring-color",
            "--color"
          ]);
          if ($) return [
            d("--tw-ring-color", $)
          ];
        }
        {
          if (A.modifier) return;
          let $ = e.resolve(A.value.value, [
            "--ring-width"
          ]);
          if ($ === null && j(A.value.value) && ($ = `${A.value.value}px`), $) return [
            w(),
            d("--tw-ring-shadow", i($)),
            d("box-shadow", m)
          ];
        }
      }), n("ring", () => [
        {
          values: [
            "current",
            "inherit",
            "transparent"
          ],
          valueThemeKeys: [
            "--ring-color",
            "--color"
          ],
          modifiers: Array.from({
            length: 21
          }, (A, $) => `${$ * 5}`)
        },
        {
          values: [
            "0",
            "1",
            "2",
            "4",
            "8"
          ],
          valueThemeKeys: [
            "--ring-width"
          ],
          hasDefaultValue: true
        }
      ]), r.functional("inset-ring", (A) => {
        if (!A.value) return A.modifier ? void 0 : [
          w(),
          d("--tw-inset-ring-shadow", f("1px")),
          d("box-shadow", m)
        ];
        if (A.value.kind === "arbitrary") {
          let $ = A.value.value;
          switch (A.value.dataType ?? N($, [
            "color",
            "length"
          ])) {
            case "length":
              return A.modifier ? void 0 : [
                w(),
                d("--tw-inset-ring-shadow", f($)),
                d("box-shadow", m)
              ];
            default:
              return $ = W($, A.modifier, e), $ === null ? void 0 : [
                d("--tw-inset-ring-color", $)
              ];
          }
        }
        {
          let $ = _(A, e, [
            "--ring-color",
            "--color"
          ]);
          if ($) return [
            d("--tw-inset-ring-color", $)
          ];
        }
        {
          if (A.modifier) return;
          let $ = e.resolve(A.value.value, [
            "--ring-width"
          ]);
          if ($ === null && j(A.value.value) && ($ = `${A.value.value}px`), $) return [
            w(),
            d("--tw-inset-ring-shadow", f($)),
            d("box-shadow", m)
          ];
        }
      }), n("inset-ring", () => [
        {
          values: [
            "current",
            "inherit",
            "transparent"
          ],
          valueThemeKeys: [
            "--ring-color",
            "--color"
          ],
          modifiers: Array.from({
            length: 21
          }, (A, $) => `${$ * 5}`)
        },
        {
          values: [
            "0",
            "1",
            "2",
            "4",
            "8"
          ],
          valueThemeKeys: [
            "--ring-width"
          ],
          hasDefaultValue: true
        }
      ]);
      let z = "var(--tw-ring-inset,) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color)";
      r.functional("ring-offset", (A) => {
        if (A.value) {
          if (A.value.kind === "arbitrary") {
            let $ = A.value.value;
            switch (A.value.dataType ?? N($, [
              "color",
              "length"
            ])) {
              case "length":
                return A.modifier ? void 0 : [
                  d("--tw-ring-offset-width", $),
                  d("--tw-ring-offset-shadow", z)
                ];
              default:
                return $ = W($, A.modifier, e), $ === null ? void 0 : [
                  d("--tw-ring-offset-color", $)
                ];
            }
          }
          {
            let $ = e.resolve(A.value.value, [
              "--ring-offset-width"
            ]);
            if ($) return A.modifier ? void 0 : [
              d("--tw-ring-offset-width", $),
              d("--tw-ring-offset-shadow", z)
            ];
            if (j(A.value.value)) return A.modifier ? void 0 : [
              d("--tw-ring-offset-width", `${A.value.value}px`),
              d("--tw-ring-offset-shadow", z)
            ];
          }
          {
            let $ = _(A, e, [
              "--ring-offset-color",
              "--color"
            ]);
            if ($) return [
              d("--tw-ring-offset-color", $)
            ];
          }
        }
      });
    }
    return n("ring-offset", () => [
      {
        values: [
          "current",
          "inherit",
          "transparent"
        ],
        valueThemeKeys: [
          "--ring-offset-color",
          "--color"
        ],
        modifiers: Array.from({
          length: 21
        }, (i, f) => `${f * 5}`)
      },
      {
        values: [
          "0",
          "1",
          "2",
          "4",
          "8"
        ],
        valueThemeKeys: [
          "--ring-offset-width"
        ]
      }
    ]), r.functional("@container", (i) => {
      let f = null;
      if (i.value === null ? f = "inline-size" : i.value.kind === "arbitrary" ? f = i.value.value : i.value.kind === "named" && i.value.value === "normal" && (f = "normal"), f !== null) return i.modifier ? [
        d("container-type", f),
        d("container-name", i.modifier.value)
      ] : [
        d("container-type", f)
      ];
    }), n("@container", () => [
      {
        values: [
          "normal"
        ],
        valueThemeKeys: [],
        hasDefaultValue: true
      }
    ]), r;
  }
  function wn(e) {
    let r = e.params;
    return mn.test(r) ? (n) => {
      let t = /* @__PURE__ */ new Set(), o = /* @__PURE__ */ new Set();
      V(e.nodes, (l) => {
        if (l.kind !== "declaration" || !l.value || !l.value.includes("--value(") && !l.value.includes("--modifier(")) return;
        let a = U(l.value);
        re(a, (u) => {
          if (u.kind !== "function" || u.value !== "--value" && u.value !== "--modifier") return;
          let s = C(M(u.nodes), ",");
          for (let [h, c] of s.entries()) c = c.replace(/\\\*/g, "*"), c = c.replace(/--(.*?)\s--(.*?)/g, "--$1-*--$2"), c = c.replace(/\s+/g, ""), c = c.replace(/(-\*){2,}/g, "-*"), c[0] === "-" && c[1] === "-" && !c.includes("-*") && (c += "-*"), s[h] = c;
          u.nodes = U(s.join(","));
          for (let h of u.nodes) if (h.kind === "word" && h.value[0] === "-" && h.value[1] === "-") {
            let c = h.value.replace(/-\*.*$/g, "");
            u.value === "--value" ? t.add(c) : u.value === "--modifier" && o.add(c);
          }
        }), l.value = M(a);
      }), n.utilities.functional(r.slice(0, -2), (l) => {
        let a = structuredClone(e), u = l.value, s = l.modifier;
        if (u === null) return;
        let h = false, c = false, p = false, g = false, b = /* @__PURE__ */ new Map(), y = false;
        if (V([
          a
        ], (v, { parent: i, replaceWith: f }) => {
          if ((i == null ? void 0 : i.kind) !== "rule" && (i == null ? void 0 : i.kind) !== "at-rule" || v.kind !== "declaration" || !v.value) return;
          let m = U(v.value);
          (re(m, (k, { replaceWith: w }) => {
            if (k.kind === "function") {
              if (k.value === "--value") {
                h = true;
                let x = vt(u, k, n);
                return x ? (c = true, x.ratio ? y = true : b.set(v, i), w(x.nodes), 1) : (h || (h = false), f([]), 2);
              } else if (k.value === "--modifier") {
                if (s === null) return f([]), 1;
                p = true;
                let x = vt(s, k, n);
                return x ? (g = true, w(x.nodes), 1) : (p || (p = false), f([]), 2);
              }
            }
          }) ?? 0) === 0 && (v.value = M(m));
        }), h && !c || p && !g || y && g || s && !y && !g) return null;
        if (y) for (let [v, i] of b) {
          let f = i.nodes.indexOf(v);
          f !== -1 && i.nodes.splice(f, 1);
        }
        return a.nodes;
      }), n.utilities.suggest(r.slice(0, -2), () => [
        {
          values: n.theme.keysInNamespaces(t).map((l) => l.replaceAll("_", ".")),
          modifiers: n.theme.keysInNamespaces(o).map((l) => l.replaceAll("_", "."))
        }
      ]);
    } : hn.test(r) ? (n) => {
      n.utilities.static(r, () => structuredClone(e.nodes));
    } : null;
  }
  function vt(e, r, n) {
    for (let t of r.nodes) if (e.kind === "named" && t.kind === "word" && t.value[0] === "-" && t.value[1] === "-") {
      let o = t.value;
      if (o.endsWith("-*")) {
        o = o.slice(0, -2);
        let l = n.theme.resolve(e.value, [
          o
        ]);
        if (l) return {
          nodes: U(l)
        };
      } else {
        let l = o.split("-*");
        if (l.length <= 1) continue;
        let a = [
          l.shift()
        ], u = n.theme.resolveWith(e.value, a, l);
        if (u) {
          let [, s = {}] = u;
          {
            let h = s[l.pop()];
            if (h) return {
              nodes: U(h)
            };
          }
        }
      }
    } else if (e.kind === "named" && t.kind === "word") {
      if (t.value !== "number" && t.value !== "integer" && t.value !== "ratio" && t.value !== "percentage") continue;
      let o = t.value === "ratio" && "fraction" in e ? e.fraction : e.value;
      if (!o) continue;
      let l = N(o, [
        t.value
      ]);
      if (l === null) continue;
      if (l === "ratio") {
        let [a, u] = C(o, "/");
        if (!j(a) || !j(u)) continue;
      } else if (l === "number" && !oe(o) || l === "percentage" && !j(o.slice(0, -1))) continue;
      return {
        nodes: U(o),
        ratio: l === "ratio"
      };
    } else if (e.kind === "arbitrary" && t.kind === "word" && t.value[0] === "[" && t.value[t.value.length - 1] === "]") {
      let o = t.value.slice(1, -1);
      if (o === "*") return {
        nodes: U(e.value)
      };
      if ("dataType" in e && e.dataType && e.dataType !== o) continue;
      if ("dataType" in e && e.dataType) return {
        nodes: U(e.value)
      };
      if (N(e.value, [
        o
      ]) !== null) return {
        nodes: U(e.value)
      };
    }
  }
  var Be = {
    "--alpha": bn,
    "--spacing": yn,
    "--theme": kn,
    theme: Xt
  };
  function bn(e, r, ...n) {
    let [t, o] = C(r, "/").map((l) => l.trim());
    if (!t || !o) throw new Error(`The --alpha(\u2026) function requires a color and an alpha value, e.g.: \`--alpha(${t || "var(--my-color)"} / ${o || "50%"})\``);
    if (n.length > 0) throw new Error(`The --alpha(\u2026) function only accepts one argument, e.g.: \`--alpha(${t || "var(--my-color)"} / ${o || "50%"})\``);
    return G(t, o);
  }
  function yn(e, r, ...n) {
    if (!r) throw new Error("The --spacing(\u2026) function requires an argument, but received none.");
    if (n.length > 0) throw new Error(`The --spacing(\u2026) function only accepts a single argument, but received ${n.length + 1}.`);
    let t = e.theme.resolve(null, [
      "--spacing"
    ]);
    if (!t) throw new Error("The --spacing(\u2026) function requires that the `--spacing` theme variable exists, but it was not found.");
    return `calc(${t} * ${r})`;
  }
  function kn(e, r, ...n) {
    if (!r.startsWith("--")) throw new Error("The --theme(\u2026) function can only be used with CSS variables from your theme.");
    return Xt(e, r, ...n);
  }
  function Xt(e, r, ...n) {
    r = xn(r);
    let t = e.resolveThemeValue(r);
    if (!t && n.length > 0) return n.join(", ");
    if (!t) throw new Error(`Could not resolve value for theme function: \`theme(${r})\`. Consider checking if the path is correct or provide a fallback value to silence this error.`);
    return t;
  }
  var wt = new RegExp(Object.keys(Be).map((e) => `${e}\\(`).join("|"));
  function He(e, r) {
    let n = 0;
    return V(e, (t) => {
      if (t.kind === "declaration" && t.value && wt.test(t.value)) {
        n |= 8, t.value = bt(t.value, r);
        return;
      }
      t.kind === "at-rule" && (t.name === "@media" || t.name === "@custom-media" || t.name === "@container" || t.name === "@supports") && wt.test(t.params) && (n |= 8, t.params = bt(t.params, r));
    }), n;
  }
  function bt(e, r) {
    let n = U(e);
    return re(n, (t, { replaceWith: o }) => {
      if (t.kind === "function" && t.value in Be) {
        let l = C(M(t.nodes).trim(), ",").map((u) => u.trim()), a = Be[t.value](r, ...l);
        return o(U(a));
      }
    }), M(n);
  }
  function xn(e) {
    if (e[0] !== "'" && e[0] !== '"') return e;
    let r = "", n = e[0];
    for (let t = 1; t < e.length - 1; t++) {
      let o = e[t], l = e[t + 1];
      o === "\\" && (l === n || l === "\\") ? (r += l, t++) : r += o;
    }
    return r;
  }
  function Qt(e, r) {
    let n = e.length, t = r.length, o = n < t ? n : t;
    for (let l = 0; l < o; l++) {
      let a = e.charCodeAt(l), u = r.charCodeAt(l);
      if (a >= 48 && a <= 57 && u >= 48 && u <= 57) {
        let s = l, h = l + 1, c = l, p = l + 1;
        for (a = e.charCodeAt(h); a >= 48 && a <= 57; ) a = e.charCodeAt(++h);
        for (u = r.charCodeAt(p); u >= 48 && u <= 57; ) u = r.charCodeAt(++p);
        let g = e.slice(s, h), b = r.slice(c, p), y = Number(g) - Number(b);
        if (y) return y;
        if (g < b) return -1;
        if (g > b) return 1;
        continue;
      }
      if (a !== u) return a - u;
    }
    return e.length - r.length;
  }
  var $n = /^\d+\/\d+$/;
  function An(e) {
    let r = [];
    for (let n of e.utilities.keys("static")) r.push({
      name: n,
      utility: n,
      fraction: false,
      modifiers: []
    });
    for (let n of e.utilities.keys("functional")) {
      let t = e.utilities.getCompletions(n);
      for (let o of t) for (let l of o.values) {
        let a = l !== null && $n.test(l), u = l === null ? n : `${n}-${l}`;
        r.push({
          name: u,
          utility: n,
          fraction: a,
          modifiers: o.modifiers
        }), o.supportsNegative && r.push({
          name: `-${u}`,
          utility: `-${n}`,
          fraction: a,
          modifiers: o.modifiers
        });
      }
    }
    return r.length === 0 ? [] : (r.sort((n, t) => Qt(n.name, t.name)), Tn(r));
  }
  function Tn(e) {
    let r = [], n = null, t = /* @__PURE__ */ new Map(), o = new D(() => []);
    for (let a of e) {
      let { utility: u, fraction: s } = a;
      n || (n = {
        utility: u,
        items: []
      }, t.set(u, n)), u !== n.utility && (r.push(n), n = {
        utility: u,
        items: []
      }, t.set(u, n)), s ? o.get(u).push(a) : n.items.push(a);
    }
    n && r[r.length - 1] !== n && r.push(n);
    for (let [a, u] of o) {
      let s = t.get(a);
      s && s.items.push(...u);
    }
    let l = [];
    for (let a of r) for (let u of a.items) l.push([
      u.name,
      {
        modifiers: u.modifiers
      }
    ]);
    return l;
  }
  function zn(e) {
    let r = [];
    for (let [n, t] of e.variants.entries()) {
      let o = function({ value: u, modifier: s } = {}) {
        let h = n;
        u && (h += l ? `-${u}` : u), s && (h += `/${s}`);
        let c = e.parseVariant(h);
        if (!c) return [];
        let p = S(".__placeholder__", []);
        if (je(p, c, e.variants) === null) return [];
        let g = [];
        return We(p.nodes, (b, { path: y }) => {
          if (b.kind !== "rule" && b.kind !== "at-rule" || b.nodes.length > 0) return;
          y.sort((f, m) => {
            let k = f.kind === "at-rule", w = m.kind === "at-rule";
            return k && !w ? -1 : !k && w ? 1 : 0;
          });
          let v = y.flatMap((f) => f.kind === "rule" ? f.selector === "&" ? [] : [
            f.selector
          ] : f.kind === "at-rule" ? [
            `${f.name} ${f.params}`
          ] : []), i = "";
          for (let f = v.length - 1; f >= 0; f--) i = i === "" ? v[f] : `${v[f]} { ${i} }`;
          g.push(i);
        }), g;
      };
      if (t.kind === "arbitrary") continue;
      let l = n !== "@", a = e.variants.getCompletions(n);
      switch (t.kind) {
        case "static": {
          r.push({
            name: n,
            values: a,
            isArbitrary: false,
            hasDash: l,
            selectors: o
          });
          break;
        }
        case "functional": {
          r.push({
            name: n,
            values: a,
            isArbitrary: true,
            hasDash: l,
            selectors: o
          });
          break;
        }
        case "compound": {
          r.push({
            name: n,
            values: a,
            isArbitrary: true,
            hasDash: l,
            selectors: o
          });
          break;
        }
      }
    }
    return r;
  }
  function jn(e, r) {
    var _a2;
    let { astNodes: n, nodeSorting: t } = ze(Array.from(r), e), o = new Map(r.map((a) => [
      a,
      null
    ])), l = 0n;
    for (let a of n) {
      let u = (_a2 = t.get(a)) == null ? void 0 : _a2.candidate;
      u && o.set(u, o.get(u) ?? l++);
    }
    return r.map((a) => [
      a,
      o.get(a) ?? null
    ]);
  }
  var er = /^@?[a-zA-Z0-9_-]*$/, Cn = class {
    constructor() {
      __publicField(this, "compareFns", /* @__PURE__ */ new Map());
      __publicField(this, "variants", /* @__PURE__ */ new Map());
      __publicField(this, "completions", /* @__PURE__ */ new Map());
      __publicField(this, "groupOrder", null);
      __publicField(this, "lastOrder", 0);
    }
    static(e, r, { compounds: n, order: t } = {}) {
      this.set(e, {
        kind: "static",
        applyFn: r,
        compoundsWith: 0,
        compounds: n ?? 2,
        order: t
      });
    }
    fromAst(e, r) {
      let n = [];
      V(r, (t) => {
        t.kind === "rule" ? n.push(t.selector) : t.kind === "at-rule" && t.name !== "@slot" && n.push(`${t.name} ${t.params}`);
      }), this.static(e, (t) => {
        let o = structuredClone(r);
        tr(o, t.nodes), t.nodes = o;
      }, {
        compounds: ce(n)
      });
    }
    functional(e, r, { compounds: n, order: t } = {}) {
      this.set(e, {
        kind: "functional",
        applyFn: r,
        compoundsWith: 0,
        compounds: n ?? 2,
        order: t
      });
    }
    compound(e, r, n, { compounds: t, order: o } = {}) {
      this.set(e, {
        kind: "compound",
        applyFn: n,
        compoundsWith: r,
        compounds: t ?? 2,
        order: o
      });
    }
    group(e, r) {
      this.groupOrder = this.nextOrder(), r && this.compareFns.set(this.groupOrder, r), e(), this.groupOrder = null;
    }
    has(e) {
      return this.variants.has(e);
    }
    get(e) {
      return this.variants.get(e);
    }
    kind(e) {
      var _a2;
      return (_a2 = this.variants.get(e)) == null ? void 0 : _a2.kind;
    }
    compoundsWith(e, r) {
      let n = this.variants.get(e), t = typeof r == "string" ? this.variants.get(r) : r.kind === "arbitrary" ? {
        compounds: ce([
          r.selector
        ])
      } : this.variants.get(r.root);
      return !(!n || !t || n.kind !== "compound" || t.compounds === 0 || n.compoundsWith === 0 || !(n.compoundsWith & t.compounds));
    }
    suggest(e, r) {
      this.completions.set(e, r);
    }
    getCompletions(e) {
      var _a2;
      return ((_a2 = this.completions.get(e)) == null ? void 0 : _a2()) ?? [];
    }
    compare(e, r) {
      if (e === r) return 0;
      if (e === null) return -1;
      if (r === null) return 1;
      if (e.kind === "arbitrary" && r.kind === "arbitrary") return e.selector < r.selector ? -1 : 1;
      if (e.kind === "arbitrary") return 1;
      if (r.kind === "arbitrary") return -1;
      let n = this.variants.get(e.root).order, t = this.variants.get(r.root).order, o = n - t;
      if (o !== 0) return o;
      if (e.kind === "compound" && r.kind === "compound") {
        let s = this.compare(e.variant, r.variant);
        return s !== 0 ? s : e.modifier && r.modifier ? e.modifier.value < r.modifier.value ? -1 : 1 : e.modifier ? 1 : r.modifier ? -1 : 0;
      }
      let l = this.compareFns.get(n);
      if (l !== void 0) return l(e, r);
      if (e.root !== r.root) return e.root < r.root ? -1 : 1;
      let a = e.value, u = r.value;
      return a === null ? -1 : u === null || a.kind === "arbitrary" && u.kind !== "arbitrary" ? 1 : a.kind !== "arbitrary" && u.kind === "arbitrary" || a.value < u.value ? -1 : 1;
    }
    keys() {
      return this.variants.keys();
    }
    entries() {
      return this.variants.entries();
    }
    set(e, { kind: r, applyFn: n, compounds: t, compoundsWith: o, order: l }) {
      let a = this.variants.get(e);
      a ? Object.assign(a, {
        kind: r,
        applyFn: n,
        compounds: t
      }) : (l === void 0 && (this.lastOrder = this.nextOrder(), l = this.lastOrder), this.variants.set(e, {
        kind: r,
        applyFn: n,
        order: l,
        compoundsWith: o,
        compounds: t
      }));
    }
    nextOrder() {
      return this.groupOrder ?? this.lastOrder + 1;
    }
  };
  function ce(e) {
    let r = 0;
    for (let n of e) {
      if (n[0] === "@") {
        if (!n.startsWith("@media") && !n.startsWith("@supports") && !n.startsWith("@container")) return 0;
        r |= 1;
        continue;
      }
      if (n.includes("::")) return 0;
      r |= 2;
    }
    return r;
  }
  function En(e) {
    let r = new Cn();
    function n(u, s, { compounds: h } = {}) {
      h = h ?? ce(s), r.static(u, (c) => {
        c.nodes = s.map((p) => L(p, c.nodes));
      }, {
        compounds: h
      });
    }
    n("*", [
      ":is(& > *)"
    ], {
      compounds: 0
    }), n("**", [
      ":is(& *)"
    ], {
      compounds: 0
    });
    function t(u, s) {
      return s.map((h) => {
        h = h.trim();
        let c = C(h, " ");
        return c[0] === "not" ? c.slice(1).join(" ") : u === "@container" ? c[0][0] === "(" ? `not ${h}` : c[1] === "not" ? `${c[0]} ${c.slice(2).join(" ")}` : `${c[0]} not ${c.slice(1).join(" ")}` : `not ${h}`;
      });
    }
    let o = [
      "@media",
      "@supports",
      "@container"
    ];
    function l(u) {
      for (let s of o) {
        if (s !== u.name) continue;
        let h = C(u.params, ",");
        return h.length > 1 ? null : (h = t(u.name, h), O(u.name, h.join(", ")));
      }
      return null;
    }
    function a(u) {
      return u.includes("::") ? null : `&:not(${C(u, ",").map((s) => (s.startsWith("&:is(") && s.endsWith(")") && (s = s.slice(5, -1)), s = s.replaceAll("&", "*"), s)).join(", ")})`;
    }
    r.compound("not", 3, (u, s) => {
      if (s.variant.kind === "arbitrary" && s.variant.relative || s.modifier) return null;
      let h = false;
      if (V([
        u
      ], (c, { path: p }) => {
        if (c.kind !== "rule" && c.kind !== "at-rule" || c.nodes.length > 0) return 0;
        let g = [], b = [];
        for (let v of p) v.kind === "at-rule" ? g.push(v) : v.kind === "rule" && b.push(v);
        if (g.length > 1 || b.length > 1) return 2;
        let y = [];
        for (let v of b) {
          let i = a(v.selector);
          if (!i) return h = false, 2;
          y.push(S(i, []));
        }
        for (let v of g) {
          let i = l(v);
          if (!i) return h = false, 2;
          y.push(i);
        }
        return Object.assign(u, S("&", y)), h = true, 1;
      }), u.kind === "rule" && u.selector === "&" && u.nodes.length === 1 && Object.assign(u, u.nodes[0]), !h) return null;
    }), r.suggest("not", () => Array.from(r.keys()).filter((u) => r.compoundsWith("not", u))), r.compound("group", 2, (u, s) => {
      if (s.variant.kind === "arbitrary" && s.variant.relative) return null;
      let h = s.modifier ? `:where(.${e.prefix ? `${e.prefix}\\:` : ""}group\\/${s.modifier.value})` : `:where(.${e.prefix ? `${e.prefix}\\:` : ""}group)`, c = false;
      if (V([
        u
      ], (p, { path: g }) => {
        if (p.kind !== "rule") return 0;
        for (let y of g.slice(0, -1)) if (y.kind === "rule") return c = false, 2;
        let b = p.selector.replaceAll("&", h);
        C(b, ",").length > 1 && (b = `:is(${b})`), p.selector = `&:is(${b} *)`, c = true;
      }), !c) return null;
    }), r.suggest("group", () => Array.from(r.keys()).filter((u) => r.compoundsWith("group", u))), r.compound("peer", 2, (u, s) => {
      if (s.variant.kind === "arbitrary" && s.variant.relative) return null;
      let h = s.modifier ? `:where(.${e.prefix ? `${e.prefix}\\:` : ""}peer\\/${s.modifier.value})` : `:where(.${e.prefix ? `${e.prefix}\\:` : ""}peer)`, c = false;
      if (V([
        u
      ], (p, { path: g }) => {
        if (p.kind !== "rule") return 0;
        for (let y of g.slice(0, -1)) if (y.kind === "rule") return c = false, 2;
        let b = p.selector.replaceAll("&", h);
        C(b, ",").length > 1 && (b = `:is(${b})`), p.selector = `&:is(${b} ~ *)`, c = true;
      }), !c) return null;
    }), r.suggest("peer", () => Array.from(r.keys()).filter((u) => r.compoundsWith("peer", u))), n("first-letter", [
      "&::first-letter"
    ]), n("first-line", [
      "&::first-line"
    ]), n("marker", [
      "& *::marker",
      "&::marker"
    ]), n("selection", [
      "& *::selection",
      "&::selection"
    ]), n("file", [
      "&::file-selector-button"
    ]), n("placeholder", [
      "&::placeholder"
    ]), n("backdrop", [
      "&::backdrop"
    ]);
    {
      let u = function() {
        return E([
          O("@property", "--tw-content", [
            d("syntax", '"*"'),
            d("initial-value", '""'),
            d("inherits", "false")
          ])
        ]);
      };
      r.static("before", (s) => {
        s.nodes = [
          S("&::before", [
            u(),
            d("content", "var(--tw-content)"),
            ...s.nodes
          ])
        ];
      }, {
        compounds: 0
      }), r.static("after", (s) => {
        s.nodes = [
          S("&::after", [
            u(),
            d("content", "var(--tw-content)"),
            ...s.nodes
          ])
        ];
      }, {
        compounds: 0
      });
    }
    n("first", [
      "&:first-child"
    ]), n("last", [
      "&:last-child"
    ]), n("only", [
      "&:only-child"
    ]), n("odd", [
      "&:nth-child(odd)"
    ]), n("even", [
      "&:nth-child(even)"
    ]), n("first-of-type", [
      "&:first-of-type"
    ]), n("last-of-type", [
      "&:last-of-type"
    ]), n("only-of-type", [
      "&:only-of-type"
    ]), n("visited", [
      "&:visited"
    ]), n("target", [
      "&:target"
    ]), n("open", [
      "&:is([open], :popover-open, :open)"
    ]), n("default", [
      "&:default"
    ]), n("checked", [
      "&:checked"
    ]), n("indeterminate", [
      "&:indeterminate"
    ]), n("placeholder-shown", [
      "&:placeholder-shown"
    ]), n("autofill", [
      "&:autofill"
    ]), n("optional", [
      "&:optional"
    ]), n("required", [
      "&:required"
    ]), n("valid", [
      "&:valid"
    ]), n("invalid", [
      "&:invalid"
    ]), n("in-range", [
      "&:in-range"
    ]), n("out-of-range", [
      "&:out-of-range"
    ]), n("read-only", [
      "&:read-only"
    ]), n("empty", [
      "&:empty"
    ]), n("focus-within", [
      "&:focus-within"
    ]), r.static("hover", (u) => {
      u.nodes = [
        S("&:hover", [
          O("@media", "(hover: hover)", u.nodes)
        ])
      ];
    }), n("focus", [
      "&:focus"
    ]), n("focus-visible", [
      "&:focus-visible"
    ]), n("active", [
      "&:active"
    ]), n("enabled", [
      "&:enabled"
    ]), n("disabled", [
      "&:disabled"
    ]), n("inert", [
      "&:is([inert], [inert] *)"
    ]), r.compound("in", 2, (u, s) => {
      if (s.modifier) return null;
      let h = false;
      if (V([
        u
      ], (c, { path: p }) => {
        if (c.kind !== "rule") return 0;
        for (let g of p.slice(0, -1)) if (g.kind === "rule") return h = false, 2;
        c.selector = `:where(${c.selector.replaceAll("&", "*")}) &`, h = true;
      }), !h) return null;
    }), r.suggest("in", () => Array.from(r.keys()).filter((u) => r.compoundsWith("in", u))), r.compound("has", 2, (u, s) => {
      if (s.modifier) return null;
      let h = false;
      if (V([
        u
      ], (c, { path: p }) => {
        if (c.kind !== "rule") return 0;
        for (let g of p.slice(0, -1)) if (g.kind === "rule") return h = false, 2;
        c.selector = `&:has(${c.selector.replaceAll("&", "*")})`, h = true;
      }), !h) return null;
    }), r.suggest("has", () => Array.from(r.keys()).filter((u) => r.compoundsWith("has", u))), r.functional("aria", (u, s) => {
      if (!s.value || s.modifier) return null;
      s.value.kind === "arbitrary" ? u.nodes = [
        S(`&[aria-${yt(s.value.value)}]`, u.nodes)
      ] : u.nodes = [
        S(`&[aria-${s.value.value}="true"]`, u.nodes)
      ];
    }), r.suggest("aria", () => [
      "busy",
      "checked",
      "disabled",
      "expanded",
      "hidden",
      "pressed",
      "readonly",
      "required",
      "selected"
    ]), r.functional("data", (u, s) => {
      if (!s.value || s.modifier) return null;
      u.nodes = [
        S(`&[data-${yt(s.value.value)}]`, u.nodes)
      ];
    }), r.functional("nth", (u, s) => {
      if (!s.value || s.modifier || s.value.kind === "named" && !j(s.value.value)) return null;
      u.nodes = [
        S(`&:nth-child(${s.value.value})`, u.nodes)
      ];
    }), r.functional("nth-last", (u, s) => {
      if (!s.value || s.modifier || s.value.kind === "named" && !j(s.value.value)) return null;
      u.nodes = [
        S(`&:nth-last-child(${s.value.value})`, u.nodes)
      ];
    }), r.functional("nth-of-type", (u, s) => {
      if (!s.value || s.modifier || s.value.kind === "named" && !j(s.value.value)) return null;
      u.nodes = [
        S(`&:nth-of-type(${s.value.value})`, u.nodes)
      ];
    }), r.functional("nth-last-of-type", (u, s) => {
      if (!s.value || s.modifier || s.value.kind === "named" && !j(s.value.value)) return null;
      u.nodes = [
        S(`&:nth-last-of-type(${s.value.value})`, u.nodes)
      ];
    }), r.functional("supports", (u, s) => {
      if (!s.value || s.modifier) return null;
      let h = s.value.value;
      if (h === null) return null;
      if (/^[\w-]*\s*\(/.test(h)) {
        let c = h.replace(/\b(and|or|not)\b/g, " $1 ");
        u.nodes = [
          O("@supports", c, u.nodes)
        ];
        return;
      }
      h.includes(":") || (h = `${h}: var(--tw)`), (h[0] !== "(" || h[h.length - 1] !== ")") && (h = `(${h})`), u.nodes = [
        O("@supports", h, u.nodes)
      ];
    }, {
      compounds: 1
    }), n("motion-safe", [
      "@media (prefers-reduced-motion: no-preference)"
    ]), n("motion-reduce", [
      "@media (prefers-reduced-motion: reduce)"
    ]), n("contrast-more", [
      "@media (prefers-contrast: more)"
    ]), n("contrast-less", [
      "@media (prefers-contrast: less)"
    ]);
    {
      let u = function(s, h, c, p) {
        if (s === h) return 0;
        let g = p.get(s);
        if (g === null) return c === "asc" ? -1 : 1;
        let b = p.get(h);
        return b === null ? c === "asc" ? 1 : -1 : ye(g, b, c);
      };
      {
        let s = e.namespace("--breakpoint"), h = new D((c) => {
          switch (c.kind) {
            case "static":
              return e.resolveValue(c.root, [
                "--breakpoint"
              ]) ?? null;
            case "functional": {
              if (!c.value || c.modifier) return null;
              let p = null;
              return c.value.kind === "arbitrary" ? p = c.value.value : c.value.kind === "named" && (p = e.resolveValue(c.value.value, [
                "--breakpoint"
              ])), !p || p.includes("var(") ? null : p;
            }
            case "arbitrary":
            case "compound":
              return null;
          }
        });
        r.group(() => {
          r.functional("max", (c, p) => {
            if (p.modifier) return null;
            let g = h.get(p);
            if (g === null) return null;
            c.nodes = [
              O("@media", `(width < ${g})`, c.nodes)
            ];
          }, {
            compounds: 1
          });
        }, (c, p) => u(c, p, "desc", h)), r.suggest("max", () => Array.from(s.keys()).filter((c) => c !== null)), r.group(() => {
          for (let [c, p] of e.namespace("--breakpoint")) c !== null && r.static(c, (g) => {
            g.nodes = [
              O("@media", `(width >= ${p})`, g.nodes)
            ];
          }, {
            compounds: 1
          });
          r.functional("min", (c, p) => {
            if (p.modifier) return null;
            let g = h.get(p);
            if (g === null) return null;
            c.nodes = [
              O("@media", `(width >= ${g})`, c.nodes)
            ];
          }, {
            compounds: 1
          });
        }, (c, p) => u(c, p, "asc", h)), r.suggest("min", () => Array.from(s.keys()).filter((c) => c !== null));
      }
      {
        let s = e.namespace("--container"), h = new D((c) => {
          switch (c.kind) {
            case "functional": {
              if (c.value === null) return null;
              let p = null;
              return c.value.kind === "arbitrary" ? p = c.value.value : c.value.kind === "named" && (p = e.resolveValue(c.value.value, [
                "--container"
              ])), !p || p.includes("var(") ? null : p;
            }
            case "static":
            case "arbitrary":
            case "compound":
              return null;
          }
        });
        r.group(() => {
          r.functional("@max", (c, p) => {
            let g = h.get(p);
            if (g === null) return null;
            c.nodes = [
              O("@container", p.modifier ? `${p.modifier.value} (width < ${g})` : `(width < ${g})`, c.nodes)
            ];
          }, {
            compounds: 1
          });
        }, (c, p) => u(c, p, "desc", h)), r.suggest("@max", () => Array.from(s.keys()).filter((c) => c !== null)), r.group(() => {
          r.functional("@", (c, p) => {
            let g = h.get(p);
            if (g === null) return null;
            c.nodes = [
              O("@container", p.modifier ? `${p.modifier.value} (width >= ${g})` : `(width >= ${g})`, c.nodes)
            ];
          }, {
            compounds: 1
          }), r.functional("@min", (c, p) => {
            let g = h.get(p);
            if (g === null) return null;
            c.nodes = [
              O("@container", p.modifier ? `${p.modifier.value} (width >= ${g})` : `(width >= ${g})`, c.nodes)
            ];
          }, {
            compounds: 1
          });
        }, (c, p) => u(c, p, "asc", h)), r.suggest("@min", () => Array.from(s.keys()).filter((c) => c !== null)), r.suggest("@", () => Array.from(s.keys()).filter((c) => c !== null));
      }
    }
    return n("portrait", [
      "@media (orientation: portrait)"
    ]), n("landscape", [
      "@media (orientation: landscape)"
    ]), n("ltr", [
      '&:where(:dir(ltr), [dir="ltr"], [dir="ltr"] *)'
    ]), n("rtl", [
      '&:where(:dir(rtl), [dir="rtl"], [dir="rtl"] *)'
    ]), n("dark", [
      "@media (prefers-color-scheme: dark)"
    ]), n("starting", [
      "@starting-style"
    ]), n("print", [
      "@media print"
    ]), n("forced-colors", [
      "@media (forced-colors: active)"
    ]), r;
  }
  function yt(e) {
    if (e.includes("=")) {
      let [r, ...n] = C(e, "="), t = n.join("=").trim();
      if (t[0] === "'" || t[0] === '"') return e;
      if (t.length > 1) {
        let o = t[t.length - 1];
        if (t[t.length - 2] === " " && (o === "i" || o === "I" || o === "s" || o === "S")) return `${r}="${t.slice(0, -2)}" ${o}`;
      }
      return `${r}="${t}"`;
    }
    return e;
  }
  function tr(e, r) {
    V(e, (n, { replaceWith: t }) => {
      if (n.kind === "at-rule" && n.name === "@slot") t(r);
      else if (n.kind === "at-rule" && (n.name === "@keyframes" || n.name === "@property")) return Object.assign(n, E([
        O(n.name, n.params, n.nodes)
      ])), 1;
    });
  }
  function Kn(e) {
    let r = vn(e), n = En(e), t = new D((s) => fn(s, u)), o = new D((s) => Array.from(dn(s, u))), l = new D((s) => {
      let h = Vn(s, u);
      try {
        He(h.map(({ node: c }) => c), u);
      } catch {
        return [];
      }
      return h;
    }), a = new D((s) => {
      for (let h of Zt(s)) e.markUsedVariable(h);
    }), u = {
      theme: e,
      utilities: r,
      variants: n,
      invalidCandidates: /* @__PURE__ */ new Set(),
      important: false,
      candidatesToCss(s) {
        let h = [];
        for (let c of s) {
          let p = false, { astNodes: g } = ze([
            c
          ], this, {
            onInvalidCandidate() {
              p = true;
            }
          });
          g = ae(g, u), g.length === 0 || p ? h.push(null) : h.push(J(g));
        }
        return h;
      },
      getClassOrder(s) {
        return jn(this, s);
      },
      getClassList() {
        return An(this);
      },
      getVariants() {
        return zn(this);
      },
      parseCandidate(s) {
        return o.get(s);
      },
      parseVariant(s) {
        return t.get(s);
      },
      compileAstNodes(s) {
        return l.get(s);
      },
      getVariantOrder() {
        let s = Array.from(t.values());
        s.sort((g, b) => this.variants.compare(g, b));
        let h = /* @__PURE__ */ new Map(), c, p = 0;
        for (let g of s) g !== null && (c !== void 0 && this.variants.compare(c, g) !== 0 && p++, h.set(g, p), c = g);
        return h;
      },
      resolveThemeValue(s) {
        let h = s.lastIndexOf("/"), c = null;
        h !== -1 && (c = s.slice(h + 1).trim(), s = s.slice(0, h).trim());
        let p = e.get([
          s
        ]) ?? void 0;
        return c && p ? G(p, c) : p;
      },
      trackUsedVariables(s) {
        a.get(s);
      }
    };
    return u;
  }
  var kt = [
    "container-type",
    "pointer-events",
    "visibility",
    "position",
    "inset",
    "inset-inline",
    "inset-block",
    "inset-inline-start",
    "inset-inline-end",
    "top",
    "right",
    "bottom",
    "left",
    "isolation",
    "z-index",
    "order",
    "grid-column",
    "grid-column-start",
    "grid-column-end",
    "grid-row",
    "grid-row-start",
    "grid-row-end",
    "float",
    "clear",
    "--tw-container-component",
    "margin",
    "margin-inline",
    "margin-block",
    "margin-inline-start",
    "margin-inline-end",
    "margin-top",
    "margin-right",
    "margin-bottom",
    "margin-left",
    "box-sizing",
    "display",
    "field-sizing",
    "aspect-ratio",
    "height",
    "max-height",
    "min-height",
    "width",
    "max-width",
    "min-width",
    "flex",
    "flex-shrink",
    "flex-grow",
    "flex-basis",
    "table-layout",
    "caption-side",
    "border-collapse",
    "border-spacing",
    "transform-origin",
    "translate",
    "--tw-translate-x",
    "--tw-translate-y",
    "--tw-translate-z",
    "scale",
    "--tw-scale-x",
    "--tw-scale-y",
    "--tw-scale-z",
    "rotate",
    "--tw-rotate-x",
    "--tw-rotate-y",
    "--tw-rotate-z",
    "--tw-skew-x",
    "--tw-skew-y",
    "transform",
    "animation",
    "cursor",
    "touch-action",
    "--tw-pan-x",
    "--tw-pan-y",
    "--tw-pinch-zoom",
    "resize",
    "scroll-snap-type",
    "--tw-scroll-snap-strictness",
    "scroll-snap-align",
    "scroll-snap-stop",
    "scroll-margin",
    "scroll-margin-inline",
    "scroll-margin-block",
    "scroll-margin-inline-start",
    "scroll-margin-inline-end",
    "scroll-margin-top",
    "scroll-margin-right",
    "scroll-margin-bottom",
    "scroll-margin-left",
    "scroll-padding",
    "scroll-padding-inline",
    "scroll-padding-block",
    "scroll-padding-inline-start",
    "scroll-padding-inline-end",
    "scroll-padding-top",
    "scroll-padding-right",
    "scroll-padding-bottom",
    "scroll-padding-left",
    "list-style-position",
    "list-style-type",
    "list-style-image",
    "appearance",
    "columns",
    "break-before",
    "break-inside",
    "break-after",
    "grid-auto-columns",
    "grid-auto-flow",
    "grid-auto-rows",
    "grid-template-columns",
    "grid-template-rows",
    "flex-direction",
    "flex-wrap",
    "place-content",
    "place-items",
    "align-content",
    "align-items",
    "justify-content",
    "justify-items",
    "gap",
    "column-gap",
    "row-gap",
    "--tw-space-x-reverse",
    "--tw-space-y-reverse",
    "divide-x-width",
    "divide-y-width",
    "--tw-divide-y-reverse",
    "divide-style",
    "divide-color",
    "place-self",
    "align-self",
    "justify-self",
    "overflow",
    "overflow-x",
    "overflow-y",
    "overscroll-behavior",
    "overscroll-behavior-x",
    "overscroll-behavior-y",
    "scroll-behavior",
    "border-radius",
    "border-start-radius",
    "border-end-radius",
    "border-top-radius",
    "border-right-radius",
    "border-bottom-radius",
    "border-left-radius",
    "border-start-start-radius",
    "border-start-end-radius",
    "border-end-end-radius",
    "border-end-start-radius",
    "border-top-left-radius",
    "border-top-right-radius",
    "border-bottom-right-radius",
    "border-bottom-left-radius",
    "border-width",
    "border-inline-width",
    "border-block-width",
    "border-inline-start-width",
    "border-inline-end-width",
    "border-top-width",
    "border-right-width",
    "border-bottom-width",
    "border-left-width",
    "border-style",
    "border-inline-style",
    "border-block-style",
    "border-inline-start-style",
    "border-inline-end-style",
    "border-top-style",
    "border-right-style",
    "border-bottom-style",
    "border-left-style",
    "border-color",
    "border-inline-color",
    "border-block-color",
    "border-inline-start-color",
    "border-inline-end-color",
    "border-top-color",
    "border-right-color",
    "border-bottom-color",
    "border-left-color",
    "background-color",
    "background-image",
    "--tw-gradient-position",
    "--tw-gradient-stops",
    "--tw-gradient-via-stops",
    "--tw-gradient-from",
    "--tw-gradient-from-position",
    "--tw-gradient-via",
    "--tw-gradient-via-position",
    "--tw-gradient-to",
    "--tw-gradient-to-position",
    "box-decoration-break",
    "background-size",
    "background-attachment",
    "background-clip",
    "background-position",
    "background-repeat",
    "background-origin",
    "fill",
    "stroke",
    "stroke-width",
    "object-fit",
    "object-position",
    "padding",
    "padding-inline",
    "padding-block",
    "padding-inline-start",
    "padding-inline-end",
    "padding-top",
    "padding-right",
    "padding-bottom",
    "padding-left",
    "text-align",
    "text-indent",
    "vertical-align",
    "font-family",
    "font-size",
    "line-height",
    "font-weight",
    "letter-spacing",
    "text-wrap",
    "overflow-wrap",
    "word-break",
    "text-overflow",
    "hyphens",
    "white-space",
    "color",
    "text-transform",
    "font-style",
    "font-stretch",
    "font-variant-numeric",
    "text-decoration-line",
    "text-decoration-color",
    "text-decoration-style",
    "text-decoration-thickness",
    "text-underline-offset",
    "-webkit-font-smoothing",
    "placeholder-color",
    "caret-color",
    "accent-color",
    "color-scheme",
    "opacity",
    "background-blend-mode",
    "mix-blend-mode",
    "box-shadow",
    "--tw-shadow",
    "--tw-shadow-color",
    "--tw-ring-shadow",
    "--tw-ring-color",
    "--tw-inset-shadow",
    "--tw-inset-shadow-color",
    "--tw-inset-ring-shadow",
    "--tw-inset-ring-color",
    "--tw-ring-offset-width",
    "--tw-ring-offset-color",
    "outline",
    "outline-width",
    "outline-offset",
    "outline-color",
    "--tw-blur",
    "--tw-brightness",
    "--tw-contrast",
    "--tw-drop-shadow",
    "--tw-grayscale",
    "--tw-hue-rotate",
    "--tw-invert",
    "--tw-saturate",
    "--tw-sepia",
    "filter",
    "--tw-backdrop-blur",
    "--tw-backdrop-brightness",
    "--tw-backdrop-contrast",
    "--tw-backdrop-grayscale",
    "--tw-backdrop-hue-rotate",
    "--tw-backdrop-invert",
    "--tw-backdrop-opacity",
    "--tw-backdrop-saturate",
    "--tw-backdrop-sepia",
    "backdrop-filter",
    "transition-property",
    "transition-behavior",
    "transition-delay",
    "transition-duration",
    "transition-timing-function",
    "will-change",
    "contain",
    "content",
    "forced-color-adjust"
  ];
  function ze(e, r, { onInvalidCandidate: n } = {}) {
    let t = /* @__PURE__ */ new Map(), o = [], l = /* @__PURE__ */ new Map();
    for (let u of e) {
      if (r.invalidCandidates.has(u)) {
        n == null ? void 0 : n(u);
        continue;
      }
      let s = r.parseCandidate(u);
      if (s.length === 0) {
        n == null ? void 0 : n(u);
        continue;
      }
      l.set(u, s);
    }
    let a = r.getVariantOrder();
    for (let [u, s] of l) {
      let h = false;
      for (let c of s) {
        let p = r.compileAstNodes(c);
        if (p.length !== 0) {
          h = true;
          for (let { node: g, propertySort: b } of p) {
            let y = 0n;
            for (let v of c.variants) y |= 1n << BigInt(a.get(v));
            t.set(g, {
              properties: b,
              variants: y,
              candidate: u
            }), o.push(g);
          }
        }
      }
      h || (n == null ? void 0 : n(u));
    }
    return o.sort((u, s) => {
      let h = t.get(u), c = t.get(s);
      if (h.variants - c.variants !== 0n) return Number(h.variants - c.variants);
      let p = 0;
      for (; p < h.properties.order.length && p < c.properties.order.length && h.properties.order[p] === c.properties.order[p]; ) p += 1;
      return (h.properties.order[p] ?? 1 / 0) - (c.properties.order[p] ?? 1 / 0) || c.properties.count - h.properties.count || Qt(h.candidate, c.candidate);
    }), {
      astNodes: o,
      nodeSorting: t
    };
  }
  function Vn(e, r) {
    let n = Sn(e, r);
    if (n.length === 0) return [];
    let t = [], o = `.${Ae(e.raw)}`;
    for (let l of n) {
      let a = On(l);
      (e.important || r.important) && rr(l);
      let u = {
        kind: "rule",
        selector: o,
        nodes: l
      };
      for (let s of e.variants) if (je(u, s, r.variants) === null) return [];
      t.push({
        node: u,
        propertySort: a
      });
    }
    return t;
  }
  function je(e, r, n, t = 0) {
    if (r.kind === "arbitrary") {
      if (r.relative && t === 0) return null;
      e.nodes = [
        L(r.selector, e.nodes)
      ];
      return;
    }
    let { applyFn: o } = n.get(r.root);
    if (r.kind === "compound") {
      let l = O("@slot");
      if (je(l, r.variant, n, t + 1) === null || r.root === "not" && l.nodes.length > 1) return null;
      for (let a of l.nodes) if (a.kind !== "rule" && a.kind !== "at-rule" || o(a, r) === null) return null;
      V(l.nodes, (a) => {
        if ((a.kind === "rule" || a.kind === "at-rule") && a.nodes.length <= 0) return a.nodes = e.nodes, 1;
      }), e.nodes = l.nodes;
      return;
    }
    if (o(e, r) === null) return null;
  }
  function xt(e) {
    var _a2;
    let r = ((_a2 = e.options) == null ? void 0 : _a2.types) ?? [];
    return r.length > 1 && r.includes("any");
  }
  function Sn(e, r) {
    if (e.kind === "arbitrary") {
      let a = e.value;
      return e.modifier && (a = W(a, e.modifier, r.theme)), a === null ? [] : [
        [
          d(e.property, a)
        ]
      ];
    }
    let n = r.utilities.get(e.root) ?? [], t = [], o = n.filter((a) => !xt(a));
    for (let a of o) {
      if (a.kind !== e.kind) continue;
      let u = a.compileFn(e);
      if (u !== void 0) {
        if (u === null) return t;
        t.push(u);
      }
    }
    if (t.length > 0) return t;
    let l = n.filter((a) => xt(a));
    for (let a of l) {
      if (a.kind !== e.kind) continue;
      let u = a.compileFn(e);
      if (u !== void 0) {
        if (u === null) return t;
        t.push(u);
      }
    }
    return t;
  }
  function rr(e) {
    for (let r of e) r.kind !== "at-root" && (r.kind === "declaration" && !(r.property[0] === "-" && r.property[1] === "-") ? r.important = true : (r.kind === "rule" || r.kind === "at-rule") && rr(r.nodes));
  }
  function On(e) {
    let r = /* @__PURE__ */ new Set(), n = 0, t = e.slice(), o = false;
    for (; t.length > 0; ) {
      let l = t.shift();
      if (l.kind === "declaration") {
        if (l.value !== void 0 && n++, o) continue;
        if (l.property === "--tw-sort") {
          let u = kt.indexOf(l.value ?? "");
          if (u !== -1) {
            r.add(u), o = true;
            continue;
          }
        }
        let a = kt.indexOf(l.property);
        a !== -1 && r.add(a);
      } else if (l.kind === "rule" || l.kind === "at-rule") for (let a of l.nodes) t.push(a);
    }
    return {
      order: Array.from(r).sort((l, a) => l - a),
      count: n
    };
  }
  function Le(e, r) {
    let n = 0, t = L("&", e), o = /* @__PURE__ */ new Set(), l = new D(() => /* @__PURE__ */ new Set()), a = new D(() => /* @__PURE__ */ new Set());
    V([
      t
    ], (p, { parent: g }) => {
      if (p.kind === "at-rule") {
        if (p.name === "@keyframes") return V(p.nodes, (b) => {
          if (b.kind === "at-rule" && b.name === "@apply") throw new Error("You cannot use `@apply` inside `@keyframes`.");
        }), 1;
        if (p.name === "@utility") {
          let b = p.params.replace(/-\*$/, "");
          a.get(b).add(p), V(p.nodes, (y) => {
            if (!(y.kind !== "at-rule" || y.name !== "@apply")) {
              o.add(p);
              for (let v of $t(y, r)) l.get(p).add(v);
            }
          });
          return;
        }
        if (p.name === "@apply") {
          if (g === null) return;
          n |= 1, o.add(g);
          for (let b of $t(p, r)) l.get(g).add(b);
        }
      }
    });
    let u = /* @__PURE__ */ new Set(), s = [], h = /* @__PURE__ */ new Set();
    function c(p, g = []) {
      if (!u.has(p)) {
        if (h.has(p)) {
          let b = g[(g.indexOf(p) + 1) % g.length];
          throw p.kind === "at-rule" && p.name === "@utility" && b.kind === "at-rule" && b.name === "@utility" && V(p.nodes, (y) => {
            if (y.kind !== "at-rule" || y.name !== "@apply") return;
            let v = y.params.split(/\s+/g);
            for (let i of v) for (let f of r.parseCandidate(i)) switch (f.kind) {
              case "arbitrary":
                break;
              case "static":
              case "functional":
                if (b.params.replace(/-\*$/, "") === f.root) throw new Error(`You cannot \`@apply\` the \`${i}\` utility here because it creates a circular dependency.`);
                break;
            }
          }), new Error(`Circular dependency detected:

${J([
            p
          ])}
Relies on:

${J([
            b
          ])}`);
        }
        h.add(p);
        for (let b of l.get(p)) for (let y of a.get(b)) g.push(p), c(y, g), g.pop();
        u.add(p), h.delete(p), s.push(p);
      }
    }
    for (let p of o) c(p);
    return V(s, (p, { replaceWith: g }) => {
      if (p.kind !== "at-rule" || p.name !== "@apply") return;
      let b = p.params.split(/\s+/g);
      {
        let y = ze(b, r, {
          onInvalidCandidate: (i) => {
            throw new Error(`Cannot apply unknown utility class: ${i}`);
          }
        }).astNodes, v = [];
        for (let i of y) if (i.kind === "rule") for (let f of i.nodes) v.push(f);
        else v.push(i);
        g(v);
      }
    }), n;
  }
  function* $t(e, r) {
    for (let n of e.params.split(/\s+/g)) for (let t of r.parseCandidate(n)) switch (t.kind) {
      case "arbitrary":
        break;
      case "static":
      case "functional":
        yield t.root;
        break;
    }
  }
  async function nr(e, r, n, t = 0) {
    let o = 0, l = [];
    return V(e, (a, { replaceWith: u }) => {
      if (a.kind === "at-rule" && (a.name === "@import" || a.name === "@reference")) {
        let s = Nn(U(a.params));
        if (s === null) return;
        a.name === "@reference" && (s.media = "reference"), o |= 2;
        let { uri: h, layer: c, media: p, supports: g } = s;
        if (h.startsWith("data:") || h.startsWith("http://") || h.startsWith("https://")) return;
        let b = Z({}, []);
        return l.push((async () => {
          if (t > 100) throw new Error(`Exceeded maximum recursion depth while resolving \`${h}\` in \`${r}\`)`);
          let y = await n(h, r), v = Te(y.content);
          await nr(v, y.base, n, t + 1), b.nodes = Fn([
            Z({
              base: y.base
            }, v)
          ], c, p, g);
        })()), u(b), 1;
      }
    }), l.length > 0 && await Promise.all(l), o;
  }
  function Nn(e) {
    let r, n = null, t = null, o = null;
    for (let l = 0; l < e.length; l++) {
      let a = e[l];
      if (a.kind !== "separator") {
        if (a.kind === "word" && !r) {
          if (!a.value || a.value[0] !== '"' && a.value[0] !== "'") return null;
          r = a.value.slice(1, -1);
          continue;
        }
        if (a.kind === "function" && a.value.toLowerCase() === "url" || !r) return null;
        if ((a.kind === "word" || a.kind === "function") && a.value.toLowerCase() === "layer") {
          if (n) return null;
          if (o) throw new Error("`layer(\u2026)` in an `@import` should come before any other functions or conditions");
          "nodes" in a ? n = M(a.nodes) : n = "";
          continue;
        }
        if (a.kind === "function" && a.value.toLowerCase() === "supports") {
          if (o) return null;
          o = M(a.nodes);
          continue;
        }
        t = M(e.slice(l));
        break;
      }
    }
    return r ? {
      uri: r,
      layer: n,
      media: t,
      supports: o
    } : null;
  }
  function Fn(e, r, n, t) {
    let o = e;
    return r !== null && (o = [
      O("@layer", r, o)
    ]), n !== null && (o = [
      O("@media", n, o)
    ]), t !== null && (o = [
      O("@supports", t[0] === "(" ? t : `(${t})`, o)
    ]), o;
  }
  function ee(e, r = null) {
    return Array.isArray(e) && e.length === 2 && typeof e[1] == "object" && typeof e[1] !== null ? r ? e[1][r] ?? null : e[0] : Array.isArray(e) && r === null ? e.join(", ") : typeof e == "string" && r === null ? e : null;
  }
  function Wn(e, { theme: r }, n) {
    for (let t of n) {
      let o = Me([
        t
      ]);
      o && e.theme.clearNamespace(`--${o}`, 4);
    }
    for (let [t, o] of _n(r)) {
      if (typeof o != "string" && typeof o != "number") continue;
      if (typeof o == "string" && (o = o.replace(/<alpha-value>/g, "1")), t[0] === "opacity" && (typeof o == "number" || typeof o == "string")) {
        let a = typeof o == "string" ? parseFloat(o) : o;
        a >= 0 && a <= 1 && (o = a * 100 + "%");
      }
      let l = Me(t);
      l && e.theme.add(`--${l}`, "" + o, 7);
    }
    if (Object.hasOwn(r, "fontFamily")) {
      let t = 5;
      {
        let o = ee(r.fontFamily.sans);
        o && e.theme.hasDefault("--font-sans") && (e.theme.add("--default-font-family", o, t), e.theme.add("--default-font-feature-settings", ee(r.fontFamily.sans, "fontFeatureSettings") ?? "normal", t), e.theme.add("--default-font-variation-settings", ee(r.fontFamily.sans, "fontVariationSettings") ?? "normal", t));
      }
      {
        let o = ee(r.fontFamily.mono);
        o && e.theme.hasDefault("--font-mono") && (e.theme.add("--default-mono-font-family", o, t), e.theme.add("--default-mono-font-feature-settings", ee(r.fontFamily.mono, "fontFeatureSettings") ?? "normal", t), e.theme.add("--default-mono-font-variation-settings", ee(r.fontFamily.mono, "fontVariationSettings") ?? "normal", t));
      }
    }
    return r;
  }
  function _n(e) {
    let r = [];
    return ir(e, [], (n, t) => {
      if (Dn(n)) return r.push([
        t,
        n
      ]), 1;
      if (Bn(n)) {
        r.push([
          t,
          n[0]
        ]);
        for (let o of Reflect.ownKeys(n[1])) r.push([
          [
            ...t,
            `-${o}`
          ],
          n[1][o]
        ]);
        return 1;
      }
      if (Array.isArray(n) && n.every((o) => typeof o == "string")) return r.push([
        t,
        n.join(", ")
      ]), 1;
    }), r;
  }
  var Un = /^[a-zA-Z0-9-_%/\.]+$/;
  function Me(e) {
    if (e[0] === "container") return null;
    e = structuredClone(e), e[0] === "animation" && (e[0] = "animate"), e[0] === "aspectRatio" && (e[0] = "aspect"), e[0] === "borderRadius" && (e[0] = "radius"), e[0] === "boxShadow" && (e[0] = "shadow"), e[0] === "colors" && (e[0] = "color"), e[0] === "containers" && (e[0] = "container"), e[0] === "fontFamily" && (e[0] = "font"), e[0] === "fontSize" && (e[0] = "text"), e[0] === "letterSpacing" && (e[0] = "tracking"), e[0] === "lineHeight" && (e[0] = "leading"), e[0] === "maxWidth" && (e[0] = "container"), e[0] === "screens" && (e[0] = "breakpoint"), e[0] === "transitionTimingFunction" && (e[0] = "ease");
    for (let r of e) if (!Un.test(r)) return null;
    return e.map((r, n, t) => r === "1" && n !== t.length - 1 ? "" : r).map((r) => r.replaceAll(".", "_").replace(/([a-z])([A-Z])/g, (n, t, o) => `${t}-${o.toLowerCase()}`)).filter((r, n) => r !== "DEFAULT" || n !== e.length - 1).join("-");
  }
  function Dn(e) {
    return typeof e == "number" || typeof e == "string";
  }
  function Bn(e) {
    if (!Array.isArray(e) || e.length !== 2 || typeof e[0] != "string" && typeof e[0] != "number" || e[1] === void 0 || e[1] === null || typeof e[1] != "object") return false;
    for (let r of Reflect.ownKeys(e[1])) if (typeof r != "string" || typeof e[1][r] != "string" && typeof e[1][r] != "number") return false;
    return true;
  }
  function ir(e, r = [], n) {
    for (let t of Reflect.ownKeys(e)) {
      let o = e[t];
      if (o == null) continue;
      let l = [
        ...r,
        t
      ], a = n(o, l) ?? 0;
      if (a !== 1 && (a === 2 || !(!Array.isArray(o) && typeof o != "object") && ir(o, l, n) === 2)) return 2;
    }
  }
  function or(e) {
    let r = [];
    for (let n of C(e, ".")) {
      if (!n.includes("[")) {
        r.push(n);
        continue;
      }
      let t = 0;
      for (; ; ) {
        let o = n.indexOf("[", t), l = n.indexOf("]", o);
        if (o === -1 || l === -1) break;
        o > t && r.push(n.slice(t, o)), r.push(n.slice(o + 1, l)), t = l + 1;
      }
      t <= n.length - 1 && r.push(n.slice(t));
    }
    return r;
  }
  function se(e) {
    if (Object.prototype.toString.call(e) !== "[object Object]") return false;
    let r = Object.getPrototypeOf(e);
    return r === null || Object.getPrototypeOf(r) === null;
  }
  function Ze(e, r, n, t = []) {
    for (let o of r) if (o != null) for (let l of Reflect.ownKeys(o)) {
      t.push(l);
      let a = n(e[l], o[l], t);
      a !== void 0 ? e[l] = a : !se(e[l]) || !se(o[l]) ? e[l] = o[l] : e[l] = Ze({}, [
        e[l],
        o[l]
      ], n, t), t.pop();
    }
    return e;
  }
  function ar(e, r, n) {
    return function(t, o) {
      let l = t.lastIndexOf("/"), a = null;
      l !== -1 && (a = t.slice(l + 1).trim(), t = t.slice(0, l).trim());
      let u = (() => {
        var _a2;
        let s = or(t), [h, c] = Ln(e.theme, s), p = n(At(r() ?? {}, s) ?? null);
        if (typeof p == "string" && (p = p.replace("<alpha-value>", "1")), typeof h != "object") return typeof c != "object" && c & 4 ? p ?? h : h;
        if (p !== null && typeof p == "object" && !Array.isArray(p)) {
          let g = Ze({}, [
            p
          ], (b, y) => y);
          if (h === null && Object.hasOwn(p, "__CSS_VALUES__")) {
            let b = {};
            for (let y in p.__CSS_VALUES__) b[y] = p[y], delete g[y];
            h = b;
          }
          for (let b in h) b !== "__CSS_VALUES__" && (((_a2 = p == null ? void 0 : p.__CSS_VALUES__) == null ? void 0 : _a2[b]) & 4 && At(g, b.split("-")) !== void 0 || (g[be(b)] = h[b]));
          return g;
        }
        if (Array.isArray(h) && Array.isArray(c) && Array.isArray(p)) {
          let g = h[0], b = h[1];
          c[0] & 4 && (g = p[0] ?? g);
          for (let y of Object.keys(b)) c[1][y] & 4 && (b[y] = p[1][y] ?? b[y]);
          return [
            g,
            b
          ];
        }
        return h ?? p;
      })();
      return a && typeof u == "string" && (u = G(u, a)), u ?? o;
    };
  }
  function Ln(e, r) {
    if (r.length === 1 && r[0].startsWith("--")) return [
      e.get([
        r[0]
      ]),
      e.getOptions(r[0])
    ];
    let n = Me(r), t = /* @__PURE__ */ new Map(), o = new D(() => /* @__PURE__ */ new Map()), l = e.namespace(`--${n}`);
    if (l.size === 0) return [
      null,
      0
    ];
    let a = /* @__PURE__ */ new Map();
    for (let [c, p] of l) {
      if (!c || !c.includes("--")) {
        t.set(c, p), a.set(c, e.getOptions(c ? `--${n}-${c}` : `--${n}`));
        continue;
      }
      let g = c.indexOf("--"), b = c.slice(0, g), y = c.slice(g + 2);
      y = y.replace(/-([a-z])/g, (v, i) => i.toUpperCase()), o.get(b === "" ? null : b).set(y, [
        p,
        e.getOptions(`--${n}${c}`)
      ]);
    }
    let u = e.getOptions(`--${n}`);
    for (let [c, p] of o) {
      let g = t.get(c);
      if (typeof g != "string") continue;
      let b = {}, y = {};
      for (let [v, [i, f]] of p) b[v] = i, y[v] = f;
      t.set(c, [
        g,
        b
      ]), a.set(c, [
        u,
        y
      ]);
    }
    let s = {}, h = {};
    for (let [c, p] of t) Tt(s, [
      c ?? "DEFAULT"
    ], p);
    for (let [c, p] of a) Tt(h, [
      c ?? "DEFAULT"
    ], p);
    return r[r.length - 1] === "DEFAULT" ? [
      (s == null ? void 0 : s.DEFAULT) ?? null,
      h.DEFAULT ?? 0
    ] : "DEFAULT" in s && Object.keys(s).length === 1 ? [
      s.DEFAULT,
      h.DEFAULT ?? 0
    ] : (s.__CSS_VALUES__ = h, [
      s,
      h
    ]);
  }
  function At(e, r) {
    for (let n = 0; n < r.length; ++n) {
      let t = r[n];
      if ((e == null ? void 0 : e[t]) === void 0) {
        if (r[n + 1] === void 0) return;
        r[n + 1] = `${t}-${r[n + 1]}`;
        continue;
      }
      e = e[t];
    }
    return e;
  }
  function Tt(e, r, n) {
    for (let t of r.slice(0, -1)) e[t] === void 0 && (e[t] = {}), e = e[t];
    e[r[r.length - 1]] = n;
  }
  function Mn(e) {
    return {
      kind: "combinator",
      value: e
    };
  }
  function Rn(e, r) {
    return {
      kind: "function",
      value: e,
      nodes: r
    };
  }
  function ie(e) {
    return {
      kind: "selector",
      value: e
    };
  }
  function In(e) {
    return {
      kind: "separator",
      value: e
    };
  }
  function qn(e) {
    return {
      kind: "value",
      value: e
    };
  }
  function ke(e, r, n = null) {
    for (let t = 0; t < e.length; t++) {
      let o = e[t], l = false, a = 0, u = r(o, {
        parent: n,
        replaceWith(s) {
          l = true, Array.isArray(s) ? s.length === 0 ? (e.splice(t, 1), a = 0) : s.length === 1 ? (e[t] = s[0], a = 1) : (e.splice(t, 1, ...s), a = s.length) : (e[t] = s, a = 1);
        }
      }) ?? 0;
      if (l) {
        u === 0 ? t-- : t += a - 1;
        continue;
      }
      if (u === 2 || u !== 1 && o.kind === "function" && ke(o.nodes, r, o) === 2) return 2;
    }
  }
  function xe(e) {
    let r = "";
    for (let n of e) switch (n.kind) {
      case "combinator":
      case "selector":
      case "separator":
      case "value": {
        r += n.value;
        break;
      }
      case "function":
        r += n.value + "(" + xe(n.nodes) + ")";
    }
    return r;
  }
  var zt = 92, Pn = 93, jt = 41, Hn = 58, Ct = 44, Zn = 34, Yn = 46, Et = 62, Kt = 10, Gn = 35, Vt = 91, St = 40, Ot = 43, Jn = 39, Nt = 32, Ft = 9, Wt = 126;
  function Re(e) {
    e = e.replaceAll(`\r
`, `
`);
    let r = [], n = [], t = null, o = "", l;
    for (let a = 0; a < e.length; a++) {
      let u = e.charCodeAt(a);
      switch (u) {
        case Ct:
        case Et:
        case Kt:
        case Nt:
        case Ot:
        case Ft:
        case Wt: {
          if (o.length > 0) {
            let g = ie(o);
            t ? t.nodes.push(g) : r.push(g), o = "";
          }
          let s = a, h = a + 1;
          for (; h < e.length && (l = e.charCodeAt(h), !(l !== Ct && l !== Et && l !== Kt && l !== Nt && l !== Ot && l !== Ft && l !== Wt)); h++) ;
          a = h - 1;
          let c = e.slice(s, h), p = c.trim() === "," ? In(c) : Mn(c);
          t ? t.nodes.push(p) : r.push(p);
          break;
        }
        case St: {
          let s = Rn(o, []);
          if (o = "", s.value !== ":not" && s.value !== ":where" && s.value !== ":has" && s.value !== ":is") {
            let h = a + 1, c = 0;
            for (let g = a + 1; g < e.length; g++) {
              if (l = e.charCodeAt(g), l === St) {
                c++;
                continue;
              }
              if (l === jt) {
                if (c === 0) {
                  a = g;
                  break;
                }
                c--;
              }
            }
            let p = a;
            s.nodes.push(qn(e.slice(h, p))), o = "", a = p, t ? t.nodes.push(s) : r.push(s);
            break;
          }
          t ? t.nodes.push(s) : r.push(s), n.push(s), t = s;
          break;
        }
        case jt: {
          let s = n.pop();
          if (o.length > 0) {
            let h = ie(o);
            s.nodes.push(h), o = "";
          }
          n.length > 0 ? t = n[n.length - 1] : t = null;
          break;
        }
        case Yn:
        case Hn:
        case Gn: {
          if (o.length > 0) {
            let s = ie(o);
            t ? t.nodes.push(s) : r.push(s);
          }
          o = String.fromCharCode(u);
          break;
        }
        case Vt: {
          if (o.length > 0) {
            let c = ie(o);
            t ? t.nodes.push(c) : r.push(c);
          }
          o = "";
          let s = a, h = 0;
          for (let c = a + 1; c < e.length; c++) {
            if (l = e.charCodeAt(c), l === Vt) {
              h++;
              continue;
            }
            if (l === Pn) {
              if (h === 0) {
                a = c;
                break;
              }
              h--;
            }
          }
          o += e.slice(s, a + 1);
          break;
        }
        case Jn:
        case Zn: {
          let s = a;
          for (let h = a + 1; h < e.length; h++) if (l = e.charCodeAt(h), l === zt) h += 1;
          else if (l === u) {
            a = h;
            break;
          }
          o += e.slice(s, a + 1);
          break;
        }
        case zt: {
          let s = e.charCodeAt(a + 1);
          o += String.fromCharCode(u) + String.fromCharCode(s), a += 1;
          break;
        }
        default:
          o += String.fromCharCode(u);
      }
    }
    return o.length > 0 && r.push(ie(o)), r;
  }
  var _t = /^[a-z@][a-zA-Z0-9/%._-]*$/;
  function Ut({ designSystem: e, ast: r, resolvedConfig: n, featuresRef: t, referenceMode: o }) {
    let l = {
      addBase(a) {
        if (o) return;
        let u = I(a);
        t.current |= He(u, e), r.push(O("@layer", "base", u));
      },
      addVariant(a, u) {
        if (!er.test(a)) throw new Error(`\`addVariant('${a}')\` defines an invalid variant name. Variants should only contain alphanumeric, dashes or underscore characters.`);
        typeof u == "string" || Array.isArray(u) ? e.variants.static(a, (s) => {
          s.nodes = Dt(u, s.nodes);
        }, {
          compounds: ce(typeof u == "string" ? [
            u
          ] : u)
        }) : typeof u == "object" && e.variants.fromAst(a, I(u));
      },
      matchVariant(a, u, s) {
        function h(p, g, b) {
          let y = u(p, {
            modifier: (g == null ? void 0 : g.value) ?? null
          });
          return Dt(y, b);
        }
        let c = Object.keys((s == null ? void 0 : s.values) ?? {});
        e.variants.group(() => {
          e.variants.functional(a, (p, g) => {
            if (!g.value) {
              if ((s == null ? void 0 : s.values) && "DEFAULT" in s.values) {
                p.nodes = h(s.values.DEFAULT, g.modifier, p.nodes);
                return;
              }
              return null;
            }
            if (g.value.kind === "arbitrary") p.nodes = h(g.value.value, g.modifier, p.nodes);
            else if (g.value.kind === "named" && (s == null ? void 0 : s.values)) {
              let b = s.values[g.value.value];
              if (typeof b != "string") return;
              p.nodes = h(b, g.modifier, p.nodes);
            }
          });
        }, (p, g) => {
          var _a2, _b, _c, _d;
          if (p.kind !== "functional" || g.kind !== "functional") return 0;
          let b = p.value ? p.value.value : "DEFAULT", y = g.value ? g.value.value : "DEFAULT", v = ((_a2 = s == null ? void 0 : s.values) == null ? void 0 : _a2[b]) ?? b, i = ((_b = s == null ? void 0 : s.values) == null ? void 0 : _b[y]) ?? y;
          if (s && typeof s.sort == "function") return s.sort({
            value: v,
            modifier: ((_c = p.modifier) == null ? void 0 : _c.value) ?? null
          }, {
            value: i,
            modifier: ((_d = g.modifier) == null ? void 0 : _d.value) ?? null
          });
          let f = c.indexOf(b), m = c.indexOf(y);
          return f = f === -1 ? c.length : f, m = m === -1 ? c.length : m, f !== m ? f - m : v < i ? -1 : 1;
        });
      },
      addUtilities(a) {
        a = Array.isArray(a) ? a : [
          a
        ];
        let u = a.flatMap((h) => Object.entries(h));
        u = u.flatMap(([h, c]) => C(h, ",").map((p) => [
          p.trim(),
          c
        ]));
        let s = new D(() => []);
        for (let [h, c] of u) {
          if (h.startsWith("@keyframes ")) {
            o || r.push(L(h, I(c)));
            continue;
          }
          let p = Re(h), g = false;
          if (ke(p, (b) => {
            if (b.kind === "selector" && b.value[0] === "." && _t.test(b.value.slice(1))) {
              let y = b.value;
              b.value = "&";
              let v = xe(p), i = y.slice(1), f = v === "&" ? I(c) : [
                L(v, I(c))
              ];
              s.get(i).push(...f), g = true, b.value = y;
              return;
            }
            if (b.kind === "function" && b.value === ":not") return 1;
          }), !g) throw new Error(`\`addUtilities({ '${h}' : \u2026 })\` defines an invalid utility selector. Utilities must be a single class name and start with a lowercase letter, eg. \`.scrollbar-none\`.`);
        }
        for (let [h, c] of s) e.theme.prefix && V(c, (p) => {
          if (p.kind === "rule") {
            let g = Re(p.selector);
            ke(g, (b) => {
              b.kind === "selector" && b.value[0] === "." && (b.value = `.${e.theme.prefix}\\:${b.value.slice(1)}`);
            }), p.selector = xe(g);
          }
        }), e.utilities.static(h, (p) => {
          let g = structuredClone(c);
          return Bt(g, h, p.raw), t.current |= Le(g, e), g;
        });
      },
      matchUtilities(a, u) {
        let s = (u == null ? void 0 : u.type) ? Array.isArray(u == null ? void 0 : u.type) ? u.type : [
          u.type
        ] : [
          "any"
        ];
        for (let [h, c] of Object.entries(a)) {
          let p = function({ negative: g }) {
            return (b) => {
              var _a2, _b;
              if (((_a2 = b.value) == null ? void 0 : _a2.kind) === "arbitrary" && s.length > 0 && !s.includes("any") && (b.value.dataType && !s.includes(b.value.dataType) || !b.value.dataType && !N(b.value.value, s))) return;
              let y = s.includes("color"), v = null, i = false;
              {
                let k = (u == null ? void 0 : u.values) ?? {};
                y && (k = Object.assign({
                  inherit: "inherit",
                  transparent: "transparent",
                  current: "currentColor"
                }, k)), b.value ? b.value.kind === "arbitrary" ? v = b.value.value : b.value.fraction && k[b.value.fraction] ? (v = k[b.value.fraction], i = true) : k[b.value.value] ? v = k[b.value.value] : k.__BARE_VALUE__ && (v = k.__BARE_VALUE__(b.value) ?? null, i = (b.value.fraction !== null && (v == null ? void 0 : v.includes("/"))) ?? false) : v = k.DEFAULT ?? null;
              }
              if (v === null) return;
              let f;
              {
                let k = (u == null ? void 0 : u.modifiers) ?? null;
                b.modifier ? k === "any" || b.modifier.kind === "arbitrary" ? f = b.modifier.value : (k == null ? void 0 : k[b.modifier.value]) ? f = k[b.modifier.value] : y && !Number.isNaN(Number(b.modifier.value)) ? f = `${b.modifier.value}%` : f = null : f = null;
              }
              if (b.modifier && f === null && !i) return ((_b = b.value) == null ? void 0 : _b.kind) === "arbitrary" ? null : void 0;
              y && f !== null && (v = G(v, f)), g && (v = `calc(${v} * -1)`);
              let m = I(c(v, {
                modifier: f
              }));
              return Bt(m, h, b.raw), t.current |= Le(m, e), m;
            };
          };
          if (!_t.test(h)) throw new Error(`\`matchUtilities({ '${h}' : \u2026 })\` defines an invalid utility name. Utilities should be alphanumeric and start with a lowercase letter, eg. \`scrollbar\`.`);
          (u == null ? void 0 : u.supportsNegativeValues) && e.utilities.functional(`-${h}`, p({
            negative: true
          }), {
            types: s
          }), e.utilities.functional(h, p({
            negative: false
          }), {
            types: s
          }), e.utilities.suggest(h, () => {
            let g = (u == null ? void 0 : u.values) ?? {}, b = new Set(Object.keys(g));
            b.delete("__BARE_VALUE__"), b.has("DEFAULT") && (b.delete("DEFAULT"), b.add(null));
            let y = (u == null ? void 0 : u.modifiers) ?? {}, v = y === "any" ? [] : Object.keys(y);
            return [
              {
                supportsNegative: (u == null ? void 0 : u.supportsNegativeValues) ?? false,
                values: Array.from(b),
                modifiers: v
              }
            ];
          });
        }
      },
      addComponents(a, u) {
        this.addUtilities(a, u);
      },
      matchComponents(a, u) {
        this.matchUtilities(a, u);
      },
      theme: ar(e, () => n.theme ?? {}, (a) => a),
      prefix(a) {
        return a;
      },
      config(a, u) {
        let s = n;
        if (!a) return s;
        let h = or(a);
        for (let c = 0; c < h.length; ++c) {
          let p = h[c];
          if (s[p] === void 0) return u;
          s = s[p];
        }
        return s ?? u;
      }
    };
    return l.addComponents = l.addComponents.bind(l), l.matchComponents = l.matchComponents.bind(l), l;
  }
  function I(e) {
    let r = [];
    e = Array.isArray(e) ? e : [
      e
    ];
    let n = e.flatMap((t) => Object.entries(t));
    for (let [t, o] of n) if (typeof o != "object") {
      if (!t.startsWith("--")) {
        if (o === "@slot") {
          r.push(L(t, [
            O("@slot")
          ]));
          continue;
        }
        t = t.replace(/([A-Z])/g, "-$1").toLowerCase();
      }
      r.push(d(t, String(o)));
    } else if (Array.isArray(o)) for (let l of o) typeof l == "string" ? r.push(d(t, l)) : r.push(L(t, I(l)));
    else o !== null && r.push(L(t, I(o)));
    return r;
  }
  function Dt(e, r) {
    return (typeof e == "string" ? [
      e
    ] : e).flatMap((n) => {
      if (n.trim().endsWith("}")) {
        let t = n.replace("}", "{@slot}}"), o = Te(t);
        return tr(o, r), o;
      } else return L(n, r);
    });
  }
  function Bt(e, r, n) {
    V(e, (t) => {
      if (t.kind === "rule") {
        let o = Re(t.selector);
        ke(o, (l) => {
          l.kind === "selector" && l.value === `.${r}` && (l.value = `.${Ae(n)}`);
        }), t.selector = xe(o);
      }
    });
  }
  function Xn(e, r, n) {
    for (let t of Qn(r)) e.theme.addKeyframes(t);
  }
  function Qn(e) {
    let r = [];
    if ("keyframes" in e.theme) for (let [n, t] of Object.entries(e.theme.keyframes)) r.push(O("@keyframes", n, I(t)));
    return r;
  }
  function ei(e) {
    return {
      theme: {
        ...qr,
        colors: ({ theme: r }) => r("color", {}),
        extend: {
          fontSize: ({ theme: r }) => ({
            ...r("text", {})
          }),
          boxShadow: ({ theme: r }) => ({
            ...r("shadow", {})
          }),
          animation: ({ theme: r }) => ({
            ...r("animate", {})
          }),
          aspectRatio: ({ theme: r }) => ({
            ...r("aspect", {})
          }),
          borderRadius: ({ theme: r }) => ({
            ...r("radius", {})
          }),
          screens: ({ theme: r }) => ({
            ...r("breakpoint", {})
          }),
          letterSpacing: ({ theme: r }) => ({
            ...r("tracking", {})
          }),
          lineHeight: ({ theme: r }) => ({
            ...r("leading", {})
          }),
          transitionDuration: {
            DEFAULT: e.get([
              "--default-transition-duration"
            ]) ?? null
          },
          transitionTimingFunction: {
            DEFAULT: e.get([
              "--default-transition-timing-function"
            ]) ?? null
          },
          maxWidth: ({ theme: r }) => ({
            ...r("container", {})
          })
        }
      }
    };
  }
  var ti = {
    blocklist: [],
    future: {},
    prefix: "",
    important: false,
    darkMode: null,
    theme: {},
    plugins: [],
    content: {
      files: []
    }
  };
  function Lt(e, r) {
    let n = {
      design: e,
      configs: [],
      plugins: [],
      content: {
        files: []
      },
      theme: {},
      extend: {},
      result: structuredClone(ti)
    };
    for (let o of r) Ie(n, o);
    for (let o of n.configs) "darkMode" in o && o.darkMode !== void 0 && (n.result.darkMode = o.darkMode ?? null), "prefix" in o && o.prefix !== void 0 && (n.result.prefix = o.prefix ?? ""), "blocklist" in o && o.blocklist !== void 0 && (n.result.blocklist = o.blocklist ?? []), "important" in o && o.important !== void 0 && (n.result.important = o.important ?? false);
    let t = ni(n);
    return {
      resolvedConfig: {
        ...n.result,
        content: n.content,
        theme: n.theme,
        plugins: n.plugins
      },
      replacedThemeKeys: t
    };
  }
  function ri(e, r) {
    if (Array.isArray(e) && se(e[0])) return e.concat(r);
    if (Array.isArray(r) && se(r[0]) && se(e)) return [
      e,
      ...r
    ];
    if (Array.isArray(r)) return r;
  }
  function Ie(e, { config: r, base: n, path: t, reference: o }) {
    let l = [];
    for (let s of r.plugins ?? []) "__isOptionsFunction" in s ? l.push({
      ...s(),
      reference: o
    }) : "handler" in s ? l.push({
      ...s,
      reference: o
    }) : l.push({
      handler: s,
      reference: o
    });
    if (Array.isArray(r.presets) && r.presets.length === 0) throw new Error("Error in the config file/plugin/preset. An empty preset (`preset: []`) is not currently supported.");
    for (let s of r.presets ?? []) Ie(e, {
      path: t,
      base: n,
      config: s,
      reference: o
    });
    for (let s of l) e.plugins.push(s), s.config && Ie(e, {
      path: t,
      base: n,
      config: s.config,
      reference: !!s.reference
    });
    let a = r.content ?? [], u = Array.isArray(a) ? a : a.files;
    for (let s of u) e.content.files.push(typeof s == "object" ? s : {
      base: n,
      pattern: s
    });
    e.configs.push(r);
  }
  function ni(e) {
    var _a2;
    let r = /* @__PURE__ */ new Set(), n = ar(e.design, () => e.theme, o), t = Object.assign(n, {
      theme: n,
      colors: It
    });
    function o(l) {
      return typeof l == "function" ? l(t) ?? null : l ?? null;
    }
    for (let l of e.configs) {
      let a = l.theme ?? {}, u = a.extend ?? {};
      for (let s in a) s !== "extend" && r.add(s);
      Object.assign(e.theme, a);
      for (let s in u) (_a2 = e.extend)[s] ?? (_a2[s] = []), e.extend[s].push(u[s]);
    }
    delete e.theme.extend;
    for (let l in e.extend) {
      let a = [
        e.theme[l],
        ...e.extend[l]
      ];
      e.theme[l] = () => {
        let u = a.map(o);
        return Ze({}, u, ri);
      };
    }
    for (let l in e.theme) e.theme[l] = o(e.theme[l]);
    if (e.theme.screens && typeof e.theme.screens == "object") for (let l of Object.keys(e.theme.screens)) {
      let a = e.theme.screens[l];
      a && typeof a == "object" && ("raw" in a || "max" in a || "min" in a && (e.theme.screens[l] = a.min));
    }
    return r;
  }
  function ii(e, r) {
    let n = e.theme.container || {};
    if (typeof n != "object" || n === null) return;
    let t = oi(n, r);
    t.length !== 0 && r.utilities.static("container", () => structuredClone(t));
  }
  function oi({ center: e, padding: r, screens: n }, t) {
    let o = [], l = null;
    if (e && o.push(d("margin-inline", "auto")), (typeof r == "string" || typeof r == "object" && r !== null && "DEFAULT" in r) && o.push(d("padding-inline", typeof r == "string" ? r : r.DEFAULT)), typeof n == "object" && n !== null) {
      l = /* @__PURE__ */ new Map();
      let a = Array.from(t.theme.namespace("--breakpoint").entries());
      if (a.sort((u, s) => ye(u[1], s[1], "asc")), a.length > 0) {
        let [u] = a[0];
        o.push(O("@media", `(width >= --theme(--breakpoint-${u}))`, [
          d("max-width", "none")
        ]));
      }
      for (let [u, s] of Object.entries(n)) {
        if (typeof s == "object") if ("min" in s) s = s.min;
        else continue;
        l.set(u, O("@media", `(width >= ${s})`, [
          d("max-width", s)
        ]));
      }
    }
    if (typeof r == "object" && r !== null) {
      let a = Object.entries(r).filter(([u]) => u !== "DEFAULT").map(([u, s]) => [
        u,
        t.theme.resolveValue(u, [
          "--breakpoint"
        ]),
        s
      ]).filter(Boolean);
      a.sort((u, s) => ye(u[1], s[1], "asc"));
      for (let [u, , s] of a) if (l && l.has(u)) l.get(u).nodes.push(d("padding-inline", s));
      else {
        if (l) continue;
        o.push(O("@media", `(width >= theme(--breakpoint-${u}))`, [
          d("padding-inline", s)
        ]));
      }
    }
    if (l) for (let [, a] of l) o.push(a);
    return o;
  }
  function ai({ addVariant: e, config: r }) {
    let n = r("darkMode", null), [t, o = ".dark"] = Array.isArray(n) ? n : [
      n
    ];
    if (t === "variant") {
      let l;
      if (Array.isArray(o) || typeof o == "function" ? l = o : typeof o == "string" && (l = [
        o
      ]), Array.isArray(l)) for (let a of l) a === ".dark" ? (t = false, console.warn('When using `variant` for `darkMode`, you must provide a selector.\nExample: `darkMode: ["variant", ".your-selector &"]`')) : a.includes("&") || (t = false, console.warn('When using `variant` for `darkMode`, your selector must contain `&`.\nExample `darkMode: ["variant", ".your-selector &"]`'));
      o = l;
    }
    t === null || (t === "selector" ? e("dark", `&:where(${o}, ${o} *)`) : t === "media" ? e("dark", "@media (prefers-color-scheme: dark)") : t === "variant" ? e("dark", o) : t === "class" && e("dark", `&:is(${o} *)`));
  }
  function li(e) {
    for (let [r, n] of [
      [
        "t",
        "top"
      ],
      [
        "tr",
        "top right"
      ],
      [
        "r",
        "right"
      ],
      [
        "br",
        "bottom right"
      ],
      [
        "b",
        "bottom"
      ],
      [
        "bl",
        "bottom left"
      ],
      [
        "l",
        "left"
      ],
      [
        "tl",
        "top left"
      ]
    ]) e.utilities.static(`bg-gradient-to-${r}`, () => [
      d("--tw-gradient-position", `to ${n} in oklab`),
      d("background-image", "linear-gradient(var(--tw-gradient-stops))")
    ]);
    e.utilities.functional("max-w-screen", (r) => {
      if (!r.value || r.value.kind === "arbitrary") return;
      let n = e.theme.resolve(r.value.value, [
        "--breakpoint"
      ]);
      if (n) return [
        d("max-width", n)
      ];
    }), e.utilities.static("overflow-ellipsis", () => [
      d("text-overflow", "ellipsis")
    ]), e.utilities.static("decoration-slice", () => [
      d("-webkit-box-decoration-break", "slice"),
      d("box-decoration-break", "slice")
    ]), e.utilities.static("decoration-clone", () => [
      d("-webkit-box-decoration-break", "clone"),
      d("box-decoration-break", "clone")
    ]), e.utilities.functional("flex-shrink", (r) => {
      if (!r.modifier) {
        if (!r.value) return [
          d("flex-shrink", "1")
        ];
        if (r.value.kind === "arbitrary") return [
          d("flex-shrink", r.value.value)
        ];
        if (j(r.value.value)) return [
          d("flex-shrink", r.value.value)
        ];
      }
    }), e.utilities.functional("flex-grow", (r) => {
      if (!r.modifier) {
        if (!r.value) return [
          d("flex-grow", "1")
        ];
        if (r.value.kind === "arbitrary") return [
          d("flex-grow", r.value.value)
        ];
        if (j(r.value.value)) return [
          d("flex-grow", r.value.value)
        ];
      }
    });
  }
  function si(e, r) {
    var _a2;
    let n = e.theme.screens || {}, t = ((_a2 = r.variants.get("min")) == null ? void 0 : _a2.order) ?? 0, o = [];
    for (let [l, a] of Object.entries(n)) {
      let u = function(g) {
        r.variants.static(l, (b) => {
          b.nodes = [
            O("@media", p, b.nodes)
          ];
        }, {
          order: g
        });
      }, s = r.variants.get(l), h = r.theme.resolveValue(l, [
        "--breakpoint"
      ]);
      if (s && h && !r.theme.hasDefault(`--breakpoint-${l}`)) continue;
      let c = true;
      typeof a == "string" && (c = false);
      let p = ui(a);
      c ? o.push(u) : u(t);
    }
    if (o.length !== 0) {
      for (let [, l] of r.variants.variants) l.order > t && (l.order += o.length);
      r.variants.compareFns = new Map(Array.from(r.variants.compareFns).map(([l, a]) => (l > t && (l += o.length), [
        l,
        a
      ])));
      for (let [l, a] of o.entries()) a(t + l + 1);
    }
  }
  function ui(e) {
    return (Array.isArray(e) ? e : [
      e
    ]).map((r) => typeof r == "string" ? {
      min: r
    } : r && typeof r == "object" ? r : null).map((r) => {
      if (r === null) return null;
      if ("raw" in r) return r.raw;
      let n = "";
      return r.max !== void 0 && (n += `${r.max} >= `), n += "width", r.min !== void 0 && (n += ` >= ${r.min}`), `(${n})`;
    }).filter(Boolean).join(", ");
  }
  function ci(e, r) {
    let n = e.theme.aria || {}, t = e.theme.supports || {}, o = e.theme.data || {};
    if (Object.keys(n).length > 0) {
      let l = r.variants.get("aria"), a = l == null ? void 0 : l.applyFn, u = l == null ? void 0 : l.compounds;
      r.variants.functional("aria", (s, h) => {
        let c = h.value;
        return c && c.kind === "named" && c.value in n ? a == null ? void 0 : a(s, {
          ...h,
          value: {
            kind: "arbitrary",
            value: n[c.value]
          }
        }) : a == null ? void 0 : a(s, h);
      }, {
        compounds: u
      });
    }
    if (Object.keys(t).length > 0) {
      let l = r.variants.get("supports"), a = l == null ? void 0 : l.applyFn, u = l == null ? void 0 : l.compounds;
      r.variants.functional("supports", (s, h) => {
        let c = h.value;
        return c && c.kind === "named" && c.value in t ? a == null ? void 0 : a(s, {
          ...h,
          value: {
            kind: "arbitrary",
            value: t[c.value]
          }
        }) : a == null ? void 0 : a(s, h);
      }, {
        compounds: u
      });
    }
    if (Object.keys(o).length > 0) {
      let l = r.variants.get("data"), a = l == null ? void 0 : l.applyFn, u = l == null ? void 0 : l.compounds;
      r.variants.functional("data", (s, h) => {
        let c = h.value;
        return c && c.kind === "named" && c.value in o ? a == null ? void 0 : a(s, {
          ...h,
          value: {
            kind: "arbitrary",
            value: o[c.value]
          }
        }) : a == null ? void 0 : a(s, h);
      }, {
        compounds: u
      });
    }
  }
  var di = /^[a-z]+$/;
  async function fi({ designSystem: e, base: r, ast: n, loadModule: t, globs: o }) {
    let l = 0, a = [], u = [];
    V(n, (p, { parent: g, replaceWith: b, context: y }) => {
      if (p.kind === "at-rule") {
        if (p.name === "@plugin") {
          if (g !== null) throw new Error("`@plugin` cannot be nested.");
          let v = p.params.slice(1, -1);
          if (v.length === 0) throw new Error("`@plugin` must have a path.");
          let i = {};
          for (let f of p.nodes ?? []) {
            if (f.kind !== "declaration") throw new Error(`Unexpected \`@plugin\` option:

${J([
              f
            ])}

\`@plugin\` options must be a flat list of declarations.`);
            if (f.value === void 0) continue;
            let m = f.value, k = C(m, ",").map((w) => {
              if (w = w.trim(), w === "null") return null;
              if (w === "true") return true;
              if (w === "false") return false;
              if (Number.isNaN(Number(w))) {
                if (w[0] === '"' && w[w.length - 1] === '"' || w[0] === "'" && w[w.length - 1] === "'") return w.slice(1, -1);
                if (w[0] === "{" && w[w.length - 1] === "}") throw new Error(`Unexpected \`@plugin\` option: Value of declaration \`${J([
                  f
                ]).trim()}\` is not supported.

Using an object as a plugin option is currently only supported in JavaScript configuration files.`);
              } else return Number(w);
              return w;
            });
            i[f.property] = k.length === 1 ? k[0] : k;
          }
          a.push([
            {
              id: v,
              base: y.base,
              reference: !!y.reference
            },
            Object.keys(i).length > 0 ? i : null
          ]), b([]), l |= 4;
          return;
        }
        if (p.name === "@config") {
          if (p.nodes.length > 0) throw new Error("`@config` cannot have a body.");
          if (g !== null) throw new Error("`@config` cannot be nested.");
          u.push({
            id: p.params.slice(1, -1),
            base: y.base,
            reference: !!y.reference
          }), b([]), l |= 4;
          return;
        }
      }
    }), li(e);
    let s = e.resolveThemeValue;
    if (e.resolveThemeValue = function(p) {
      return p.startsWith("--") ? s(p) : (l |= Mt({
        designSystem: e,
        base: r,
        ast: n,
        globs: o,
        configs: [],
        pluginDetails: []
      }), e.resolveThemeValue(p));
    }, !a.length && !u.length) return 0;
    let [h, c] = await Promise.all([
      Promise.all(u.map(async ({ id: p, base: g, reference: b }) => {
        let y = await t(p, g, "config");
        return {
          path: p,
          base: y.base,
          config: y.module,
          reference: b
        };
      })),
      Promise.all(a.map(async ([{ id: p, base: g, reference: b }, y]) => {
        let v = await t(p, g, "plugin");
        return {
          path: p,
          base: v.base,
          plugin: v.module,
          options: y,
          reference: b
        };
      }))
    ]);
    return l |= Mt({
      designSystem: e,
      base: r,
      ast: n,
      globs: o,
      configs: h,
      pluginDetails: c
    }), l;
  }
  function Mt({ designSystem: e, base: r, ast: n, globs: t, configs: o, pluginDetails: l }) {
    let a = 0, u = [
      ...l.map((y) => {
        if (!y.options) return {
          config: {
            plugins: [
              y.plugin
            ]
          },
          base: y.base,
          reference: y.reference
        };
        if ("__isOptionsFunction" in y.plugin) return {
          config: {
            plugins: [
              y.plugin(y.options)
            ]
          },
          base: y.base,
          reference: y.reference
        };
        throw new Error(`The plugin "${y.path}" does not accept options`);
      }),
      ...o
    ], { resolvedConfig: s } = Lt(e, [
      {
        config: ei(e.theme),
        base: r,
        reference: true
      },
      ...u,
      {
        config: {
          plugins: [
            ai
          ]
        },
        base: r,
        reference: true
      }
    ]), { resolvedConfig: h, replacedThemeKeys: c } = Lt(e, u);
    e.resolveThemeValue = function(y, v) {
      let i = g.theme(y, v);
      if (Array.isArray(i) && i.length === 2) return i[0];
      if (Array.isArray(i)) return i.join(", ");
      if (typeof i == "string") return i;
    };
    let p = {
      designSystem: e,
      ast: n,
      resolvedConfig: s,
      featuresRef: {
        set current(y) {
          a |= y;
        }
      }
    }, g = Ut({
      ...p,
      referenceMode: false
    }), b;
    for (let { handler: y, reference: v } of s.plugins) v ? (b || (b = Ut({
      ...p,
      referenceMode: true
    })), y(b)) : y(g);
    if (Wn(e, h, c), Xn(e, h), ci(h, e), si(h, e), ii(h, e), !e.theme.prefix && s.prefix) {
      if (s.prefix.endsWith("-") && (s.prefix = s.prefix.slice(0, -1), console.warn(`The prefix "${s.prefix}" is invalid. Prefixes must be lowercase ASCII letters (a-z) only and is written as a variant before all utilities. We have fixed up the prefix for you. Remove the trailing \`-\` to silence this warning.`)), !di.test(s.prefix)) throw new Error(`The prefix "${s.prefix}" is invalid. Prefixes must be lowercase ASCII letters (a-z) only.`);
      e.theme.prefix = s.prefix;
    }
    if (!e.important && s.important === true && (e.important = true), typeof s.important == "string") {
      let y = s.important;
      V(n, (v, { replaceWith: i, parent: f }) => {
        if (v.kind === "at-rule" && !(v.name !== "@tailwind" || v.params !== "utilities")) return (f == null ? void 0 : f.kind) === "rule" && f.selector === y || i(S(y, [
          v
        ])), 2;
      });
    }
    for (let y of s.blocklist) e.invalidCandidates.add(y);
    for (let y of s.content.files) {
      if ("raw" in y) throw new Error(`Error in the config file/plugin/preset. The \`content\` key contains a \`raw\` entry:

${JSON.stringify(y, null, 2)}

This feature is not currently supported.`);
      t.push(y);
    }
    return a;
  }
  var pi = /^[a-z]+$/;
  function hi() {
    throw new Error("No `loadModule` function provided to `compile`");
  }
  function mi() {
    throw new Error("No `loadStylesheet` function provided to `compile`");
  }
  function gi(e) {
    let r = 0, n = null;
    for (let t of C(e, " ")) t === "reference" ? r |= 2 : t === "inline" ? r |= 1 : t === "default" ? r |= 4 : t === "static" ? r |= 8 : t.startsWith("prefix(") && t.endsWith(")") && (n = t.slice(7, -1));
    return [
      r,
      n
    ];
  }
  var vi = ((e) => (e[e.None = 0] = "None", e[e.AtApply = 1] = "AtApply", e[e.AtImport = 2] = "AtImport", e[e.JsPluginCompat = 4] = "JsPluginCompat", e[e.ThemeFunction = 8] = "ThemeFunction", e[e.Utilities = 16] = "Utilities", e[e.Variants = 32] = "Variants", e))(vi || {});
  async function lr(e, { base: r = "", loadModule: n = hi, loadStylesheet: t = mi } = {}) {
    let o = 0;
    e = [
      Z({
        base: r
      }, e)
    ], o |= await nr(e, r, t);
    let l = null, a = new Pr(), u = [], s = [], h = null, c = null, p = [], g = [], b = null;
    V(e, (v, { parent: i, replaceWith: f, context: m }) => {
      if (v.kind === "at-rule") {
        if (v.name === "@tailwind" && (v.params === "utilities" || v.params.startsWith("utilities"))) {
          if (c !== null) {
            f([]);
            return;
          }
          let k = C(v.params, " ");
          for (let w of k) if (w.startsWith("source(")) {
            let x = w.slice(7, -1);
            if (x === "none") {
              b = x;
              continue;
            }
            if (x[0] === '"' && x[x.length - 1] !== '"' || x[0] === "'" && x[x.length - 1] !== "'" || x[0] !== "'" && x[0] !== '"') throw new Error("`source(\u2026)` paths must be quoted.");
            b = {
              base: m.sourceBase ?? m.base,
              pattern: x.slice(1, -1)
            };
          }
          c = v, o |= 16;
        }
        if (v.name === "@utility") {
          if (i !== null) throw new Error("`@utility` cannot be nested.");
          if (v.nodes.length === 0) throw new Error(`\`@utility ${v.params}\` is empty. Utilities should include at least one property.`);
          let k = wn(v);
          if (k === null) throw new Error(`\`@utility ${v.params}\` defines an invalid utility name. Utilities should be alphanumeric and start with a lowercase letter.`);
          s.push(k);
        }
        if (v.name === "@source") {
          if (v.nodes.length > 0) throw new Error("`@source` cannot have a body.");
          if (i !== null) throw new Error("`@source` cannot be nested.");
          let k = v.params;
          if (k[0] === '"' && k[k.length - 1] !== '"' || k[0] === "'" && k[k.length - 1] !== "'" || k[0] !== "'" && k[0] !== '"') throw new Error("`@source` paths must be quoted.");
          g.push({
            base: m.base,
            pattern: k.slice(1, -1)
          }), f([]);
          return;
        }
        if (v.name === "@variant" && (i === null ? v.nodes.length === 0 ? v.name = "@custom-variant" : (V(v.nodes, (k) => {
          if (k.kind === "at-rule" && k.name === "@slot") return v.name = "@custom-variant", 2;
        }), v.name === "@variant" && p.push(v)) : p.push(v)), v.name === "@custom-variant") {
          if (i !== null) throw new Error("`@custom-variant` cannot be nested.");
          f([]);
          let [k, w] = C(v.params, " ");
          if (!er.test(k)) throw new Error(`\`@custom-variant ${k}\` defines an invalid variant name. Variants should only contain alphanumeric, dashes or underscore characters.`);
          if (v.nodes.length > 0 && w) throw new Error(`\`@custom-variant ${k}\` cannot have both a selector and a body.`);
          if (v.nodes.length === 0) {
            if (!w) throw new Error(`\`@custom-variant ${k}\` has no selector or body.`);
            let x = C(w.slice(1, -1), ",");
            if (x.length === 0 || x.some(($) => $.trim() === "")) throw new Error(`\`@custom-variant ${k} (${x.join(",")})\` selector is invalid.`);
            let z = [], A = [];
            for (let $ of x) $ = $.trim(), $[0] === "@" ? z.push($) : A.push($);
            u.push(($) => {
              $.variants.static(k, (K) => {
                let Ce = [];
                A.length > 0 && Ce.push(S(A.join(", "), K.nodes));
                for (let sr of z) Ce.push(L(sr, K.nodes));
                K.nodes = Ce;
              }, {
                compounds: ce([
                  ...A,
                  ...z
                ])
              });
            });
            return;
          } else {
            u.push((x) => {
              x.variants.fromAst(k, v.nodes);
            });
            return;
          }
        }
        if (v.name === "@media") {
          let k = C(v.params, " "), w = [];
          for (let x of k) if (x.startsWith("source(")) {
            let z = x.slice(7, -1);
            V(v.nodes, (A, { replaceWith: $ }) => {
              if (A.kind === "at-rule" && A.name === "@tailwind" && A.params === "utilities") return A.params += ` source(${z})`, $([
                Z({
                  sourceBase: m.base
                }, [
                  A
                ])
              ]), 2;
            });
          } else if (x.startsWith("theme(")) {
            let z = x.slice(6, -1), A = z.includes("reference");
            V(v.nodes, ($) => {
              if ($.kind !== "at-rule") {
                if (A) throw new Error('Files imported with `@import "\u2026" theme(reference)` must only contain `@theme` blocks.\nUse `@reference "\u2026";` instead.');
                return 0;
              }
              if ($.name === "@theme") return $.params += " " + z, 1;
            });
          } else if (x.startsWith("prefix(")) {
            let z = x.slice(7, -1);
            V(v.nodes, (A) => {
              if (A.kind === "at-rule" && A.name === "@theme") return A.params += ` prefix(${z})`, 1;
            });
          } else x === "important" ? l = true : x === "reference" ? v.nodes = [
            Z({
              reference: true
            }, v.nodes)
          ] : w.push(x);
          w.length > 0 ? v.params = w.join(" ") : k.length > 0 && f(v.nodes);
        }
        if (v.name === "@theme") {
          let [k, w] = gi(v.params);
          if (m.reference && (k |= 2), w) {
            if (!pi.test(w)) throw new Error(`The prefix "${w}" is invalid. Prefixes must be lowercase ASCII letters (a-z) only.`);
            a.prefix = w;
          }
          return V(v.nodes, (x) => {
            if (x.kind === "at-rule" && x.name === "@keyframes") return a.addKeyframes(x), 1;
            if (x.kind === "comment") return;
            if (x.kind === "declaration" && x.property.startsWith("--")) {
              a.add(be(x.property), x.value ?? "", k);
              return;
            }
            let z = J([
              O(v.name, v.params, [
                x
              ])
            ]).split(`
`).map((A, $, K) => `${$ === 0 || $ >= K.length - 2 ? " " : ">"} ${A}`).join(`
`);
            throw new Error(`\`@theme\` blocks must only contain custom properties or \`@keyframes\`.

${z}`);
          }), h ? f([]) : (h = S(":root, :host", []), f([
            h
          ])), 1;
        }
      }
    });
    let y = Kn(a);
    l && (y.important = l), o |= await fi({
      designSystem: y,
      base: r,
      ast: e,
      loadModule: n,
      globs: g
    });
    for (let v of u) v(y);
    for (let v of s) v(y);
    if (h) {
      let v = [];
      for (let [f, m] of y.theme.entries()) m.options & 2 || v.push(d(Ae(f), m.value));
      let i = y.theme.getKeyframes();
      for (let f of i) e.push(Z({
        theme: true
      }, [
        E([
          f
        ])
      ]));
      h.nodes = [
        Z({
          theme: true
        }, v)
      ];
    }
    if (c) {
      let v = c;
      v.kind = "context", v.context = {};
    }
    if (p.length > 0) {
      for (let v of p) {
        let i = S("&", v.nodes), f = v.params, m = y.parseVariant(f);
        if (m === null) throw new Error(`Cannot use \`@variant\` with unknown variant: ${f}`);
        if (je(i, m, y.variants) === null) throw new Error(`Cannot use \`@variant\` with variant: ${f}`);
        Object.assign(v, i);
      }
      o |= 32;
    }
    return o |= He(e, y), o |= Le(e, y), V(e, (v, { replaceWith: i }) => {
      if (v.kind === "at-rule") return v.name === "@utility" && i([]), 1;
    }), {
      designSystem: y,
      ast: e,
      globs: g,
      root: b,
      utilitiesNode: c,
      features: o
    };
  }
  async function wi(e, r = {}) {
    let { designSystem: n, ast: t, globs: o, root: l, utilitiesNode: a, features: u } = await lr(e, r);
    t.unshift(Yt(`! tailwindcss v${sn} | MIT License | https://tailwindcss.com `));
    function s(g) {
      n.invalidCandidates.add(g);
    }
    let h = /* @__PURE__ */ new Set(), c = null, p = 0;
    return {
      globs: o,
      root: l,
      features: u,
      build(g) {
        if (u === 0) return e;
        if (!a) return c ?? (c = ae(t, n)), c;
        let b = false, y = h.size;
        for (let i of g) n.invalidCandidates.has(i) || (i[0] === "-" && i[1] === "-" ? n.theme.markUsedVariable(i) : h.add(i), b || (b = h.size !== y));
        if (!b) return c ?? (c = ae(t, n)), c;
        let v = ze(h, n, {
          onInvalidCandidate: s
        }).astNodes;
        return p === v.length ? (c ?? (c = ae(t, n)), c) : (p = v.length, a.nodes = v, c = ae(t, n), c);
      }
    };
  }
  Ki = async function(e, r = {}) {
    let n = Te(e), t = await wi(n, r), o = n, l = e;
    return {
      ...t,
      build(a) {
        let u = t.build(a);
        return u === o || (l = J(u), o = u), l;
      }
    };
  };
  Vi = async function(e, r = {}) {
    return (await lr(Te(e), r)).designSystem;
  };
  var Oe, Rt;
  bi = function() {
    if (Rt) return Oe;
    Rt = 1;
    function e(o) {
      if (typeof o != "string") throw new TypeError("Path must be a string. Received " + JSON.stringify(o));
    }
    function r(o, l) {
      for (var a = "", u = 0, s = -1, h = 0, c, p = 0; p <= o.length; ++p) {
        if (p < o.length) c = o.charCodeAt(p);
        else {
          if (c === 47) break;
          c = 47;
        }
        if (c === 47) {
          if (!(s === p - 1 || h === 1)) if (s !== p - 1 && h === 2) {
            if (a.length < 2 || u !== 2 || a.charCodeAt(a.length - 1) !== 46 || a.charCodeAt(a.length - 2) !== 46) {
              if (a.length > 2) {
                var g = a.lastIndexOf("/");
                if (g !== a.length - 1) {
                  g === -1 ? (a = "", u = 0) : (a = a.slice(0, g), u = a.length - 1 - a.lastIndexOf("/")), s = p, h = 0;
                  continue;
                }
              } else if (a.length === 2 || a.length === 1) {
                a = "", u = 0, s = p, h = 0;
                continue;
              }
            }
            l && (a.length > 0 ? a += "/.." : a = "..", u = 2);
          } else a.length > 0 ? a += "/" + o.slice(s + 1, p) : a = o.slice(s + 1, p), u = p - s - 1;
          s = p, h = 0;
        } else c === 46 && h !== -1 ? ++h : h = -1;
      }
      return a;
    }
    function n(o, l) {
      var a = l.dir || l.root, u = l.base || (l.name || "") + (l.ext || "");
      return a ? a === l.root ? a + u : a + o + u : u;
    }
    var t = {
      resolve: function() {
        for (var l = "", a = false, u, s = arguments.length - 1; s >= -1 && !a; s--) {
          var h;
          s >= 0 ? h = arguments[s] : (u === void 0 && (u = cr.cwd()), h = u), e(h), h.length !== 0 && (l = h + "/" + l, a = h.charCodeAt(0) === 47);
        }
        return l = r(l, !a), a ? l.length > 0 ? "/" + l : "/" : l.length > 0 ? l : ".";
      },
      normalize: function(l) {
        if (e(l), l.length === 0) return ".";
        var a = l.charCodeAt(0) === 47, u = l.charCodeAt(l.length - 1) === 47;
        return l = r(l, !a), l.length === 0 && !a && (l = "."), l.length > 0 && u && (l += "/"), a ? "/" + l : l;
      },
      isAbsolute: function(l) {
        return e(l), l.length > 0 && l.charCodeAt(0) === 47;
      },
      join: function() {
        if (arguments.length === 0) return ".";
        for (var l, a = 0; a < arguments.length; ++a) {
          var u = arguments[a];
          e(u), u.length > 0 && (l === void 0 ? l = u : l += "/" + u);
        }
        return l === void 0 ? "." : t.normalize(l);
      },
      relative: function(l, a) {
        if (e(l), e(a), l === a || (l = t.resolve(l), a = t.resolve(a), l === a)) return "";
        for (var u = 1; u < l.length && l.charCodeAt(u) === 47; ++u) ;
        for (var s = l.length, h = s - u, c = 1; c < a.length && a.charCodeAt(c) === 47; ++c) ;
        for (var p = a.length, g = p - c, b = h < g ? h : g, y = -1, v = 0; v <= b; ++v) {
          if (v === b) {
            if (g > b) {
              if (a.charCodeAt(c + v) === 47) return a.slice(c + v + 1);
              if (v === 0) return a.slice(c + v);
            } else h > b && (l.charCodeAt(u + v) === 47 ? y = v : v === 0 && (y = 0));
            break;
          }
          var i = l.charCodeAt(u + v), f = a.charCodeAt(c + v);
          if (i !== f) break;
          i === 47 && (y = v);
        }
        var m = "";
        for (v = u + y + 1; v <= s; ++v) (v === s || l.charCodeAt(v) === 47) && (m.length === 0 ? m += ".." : m += "/..");
        return m.length > 0 ? m + a.slice(c + y) : (c += y, a.charCodeAt(c) === 47 && ++c, a.slice(c));
      },
      _makeLong: function(l) {
        return l;
      },
      dirname: function(l) {
        if (e(l), l.length === 0) return ".";
        for (var a = l.charCodeAt(0), u = a === 47, s = -1, h = true, c = l.length - 1; c >= 1; --c) if (a = l.charCodeAt(c), a === 47) {
          if (!h) {
            s = c;
            break;
          }
        } else h = false;
        return s === -1 ? u ? "/" : "." : u && s === 1 ? "//" : l.slice(0, s);
      },
      basename: function(l, a) {
        if (a !== void 0 && typeof a != "string") throw new TypeError('"ext" argument must be a string');
        e(l);
        var u = 0, s = -1, h = true, c;
        if (a !== void 0 && a.length > 0 && a.length <= l.length) {
          if (a.length === l.length && a === l) return "";
          var p = a.length - 1, g = -1;
          for (c = l.length - 1; c >= 0; --c) {
            var b = l.charCodeAt(c);
            if (b === 47) {
              if (!h) {
                u = c + 1;
                break;
              }
            } else g === -1 && (h = false, g = c + 1), p >= 0 && (b === a.charCodeAt(p) ? --p === -1 && (s = c) : (p = -1, s = g));
          }
          return u === s ? s = g : s === -1 && (s = l.length), l.slice(u, s);
        } else {
          for (c = l.length - 1; c >= 0; --c) if (l.charCodeAt(c) === 47) {
            if (!h) {
              u = c + 1;
              break;
            }
          } else s === -1 && (h = false, s = c + 1);
          return s === -1 ? "" : l.slice(u, s);
        }
      },
      extname: function(l) {
        e(l);
        for (var a = -1, u = 0, s = -1, h = true, c = 0, p = l.length - 1; p >= 0; --p) {
          var g = l.charCodeAt(p);
          if (g === 47) {
            if (!h) {
              u = p + 1;
              break;
            }
            continue;
          }
          s === -1 && (h = false, s = p + 1), g === 46 ? a === -1 ? a = p : c !== 1 && (c = 1) : a !== -1 && (c = -1);
        }
        return a === -1 || s === -1 || c === 0 || c === 1 && a === s - 1 && a === u + 1 ? "" : l.slice(a, s);
      },
      format: function(l) {
        if (l === null || typeof l != "object") throw new TypeError('The "pathObject" argument must be of type Object. Received type ' + typeof l);
        return n("/", l);
      },
      parse: function(l) {
        e(l);
        var a = {
          root: "",
          dir: "",
          base: "",
          ext: "",
          name: ""
        };
        if (l.length === 0) return a;
        var u = l.charCodeAt(0), s = u === 47, h;
        s ? (a.root = "/", h = 1) : h = 0;
        for (var c = -1, p = 0, g = -1, b = true, y = l.length - 1, v = 0; y >= h; --y) {
          if (u = l.charCodeAt(y), u === 47) {
            if (!b) {
              p = y + 1;
              break;
            }
            continue;
          }
          g === -1 && (b = false, g = y + 1), u === 46 ? c === -1 ? c = y : v !== 1 && (v = 1) : c !== -1 && (v = -1);
        }
        return c === -1 || g === -1 || v === 0 || v === 1 && c === g - 1 && c === p + 1 ? g !== -1 && (p === 0 && s ? a.base = a.name = l.slice(1, g) : a.base = a.name = l.slice(p, g)) : (p === 0 && s ? (a.name = l.slice(1, c), a.base = l.slice(1, g)) : (a.name = l.slice(p, c), a.base = l.slice(p, g)), a.ext = l.slice(c, g)), p > 0 ? a.dir = l.slice(0, p - 1) : s && (a.dir = "/"), a;
      },
      sep: "/",
      delimiter: ":",
      win32: null,
      posix: null
    };
    return t.posix = t, Oe = t, Oe;
  };
  var yi = bi();
  ue = mr(yi);
  ki = function(e) {
    try {
      const r = new URL(e);
      return r.protocol === "http:" || r.protocol === "https:";
    } catch {
      return false;
    }
  };
  Si = async function(e, r, n, t = {}) {
    let o;
    if (e.startsWith(".") || e.startsWith("/")) return $i(e, r, n, t);
    if (n === "plugin") {
      e.startsWith("http") || (e = `https://esm.sh/${e}`);
      try {
        o = await xi(e, r, n);
      } catch (l) {
        throw new Error(`The ${n} file "${e}" could not be loaded. ${l.message}`);
      }
    }
    if (!o) throw new Error(`The ${n} file "${e}" is not a valid module.`);
    return {
      module: o,
      base: r
    };
  };
  async function xi(e, r, n) {
    return await import(e).then(async (m) => {
      await m.__tla;
      return m;
    }).then((o) => o.default ?? o);
  }
  $i = async function(e, r = "/", n, t = {}) {
    r = r ?? "/";
    let o = ue.resolve(r, e);
    if (!t[o]) throw new Error(`The ${n} file "${ue.resolve("/", e)}" does not exist in the volume.`);
    let l = Ai(t[o], e, t);
    return {
      module: await ur(() => import(`data:text/javascript;base64,${hr(l)}`).then(async (m) => {
        await m.__tla;
        return m;
      }), [], import.meta.url).then((a) => a.default ?? a),
      base: ue.dirname(e)
    };
  };
  function Ai(e, r, n = {}) {
    let t = e.replace(/module.exports\s*=\s*/, "export default ").replace(/import\s+({[^}]+})\s+from\s+['"](.+)['"]/g, (s, h, c) => `import ${h.replace(/\n/g, "")} from '${c}'`).split(`
`).map((s) => s.replace(/\bimport\s+(.+)\s+from\s+['"](.+)['"]/g, (h, c, p) => (!p.startsWith("http") && !p.startsWith(".") && !p.startsWith("/") && (p = `https://esm.sh/${p}`), `const ${c.indexOf("{") === -1 ? `{default: ${c}}` : c.replace(/\s+as\s+/, ": ")} = await import('${p}')`)).replace(/\brequire\(['"]([^'"]*)['"]\)/g, (h, c) => (!c.startsWith("http") && !c.startsWith(".") && !c.startsWith("/") && (c = `https://esm.sh/${c}`), `(await import('${c}')).default`))).join(`
`);
    const o = /import\s*(?:[^'"]*\s*from\s*)?['"]([^'"]+)['"]|import\(\s*['"]([^'"]+)['"]\s*\)/g;
    let l = [], a, u = 0;
    for (; (a = o.exec(t)) !== null; ) {
      const [s, h, c] = a, p = h || c;
      if (ki(p) || !p.startsWith(".") && !p.startsWith("/")) continue;
      let g = ue.resolve(ue.dirname(r), p);
      if (!n[g]) throw new Error(`${r}: The module file "${g}" does not exist in the volume.`);
      l.push({
        start: a.index + s.indexOf(p),
        end: a.index + s.indexOf(p) + p.length,
        replacement: new URL(p, windpress.user_data.data_dir.url).href
      });
    }
    return l.forEach(({ start: s, end: h, replacement: c }) => {
      t = t.slice(0, s + u) + c + t.slice(h + u), u += c.length - (h - s);
    }), t;
  }
})();
export {
  Ki as $,
  Vi as V,
  __tla,
  Ei as a,
  ki as b,
  Ci as c,
  ji as d,
  hr as e,
  mr as g,
  $i as i,
  Si as l,
  ue as p,
  bi as r
};

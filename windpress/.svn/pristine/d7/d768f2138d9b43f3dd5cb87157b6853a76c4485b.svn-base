import { x as le, P as j, F as V, n as Q, _ as At, a as Ot, V as jt, w as Rt } from "./resolve-config-D_K0LwYp.js";
function Z(e) {
  if (Object.prototype.toString.call(e) !== "[object Object]") return false;
  let t = Object.getPrototypeOf(e);
  return t === null || Object.getPrototypeOf(t) === null;
}
function Oe(e) {
  return ["fontSize", "outline"].includes(e) ? (t) => (typeof t == "function" && (t = t({})), Array.isArray(t) && (t = t[0]), t) : e === "fontFamily" ? (t) => {
    typeof t == "function" && (t = t({}));
    let r = Array.isArray(t) && Z(t[1]) ? t[0] : t;
    return Array.isArray(r) ? r.join(", ") : r;
  } : ["boxShadow", "transitionProperty", "transitionDuration", "transitionDelay", "transitionTimingFunction", "backgroundImage", "backgroundSize", "backgroundColor", "cursor", "animation"].includes(e) ? (t) => (typeof t == "function" && (t = t({})), Array.isArray(t) && (t = t.join(", ")), t) : ["gridTemplateColumns", "gridTemplateRows", "objectPosition"].includes(e) ? (t) => (typeof t == "function" && (t = t({})), typeof t == "string" && (t = V.list.comma(t).join(" ")), t) : (t, r = {}) => (typeof t == "function" && (t = t(r)), t);
}
function je(e) {
  return Array.isArray(e) ? e.flatMap((t) => V([jt({ bubble: ["screen"] })]).process(t, { parser: Rt }).root.nodes) : je([e]);
}
function Re(e, t, r = false) {
  if (e === "") return t;
  let a = typeof t == "string" ? j().astSync(t) : t;
  return a.walkClasses((n) => {
    let i = n.value, o = r && i.startsWith("-");
    n.value = o ? `-${e}${i.slice(1)}` : `${e}${i}`;
  }), typeof t == "string" ? a.toString() : a;
}
function Ve(e) {
  return e.replace(/\\,/g, "\\2c ");
}
function K(e) {
  var _a;
  let t = j.className();
  return t.value = e, Ve(((_a = t == null ? void 0 : t.raws) == null ? void 0 : _a.value) ?? t.value);
}
function it(e) {
  return Ve(`.${K(e)}`);
}
function Le(e, t) {
  return it(ne(e, t));
}
function ne(e, t) {
  return t === "DEFAULT" ? e : t === "-" || t === "-DEFAULT" ? `-${e}` : t.startsWith("-") ? `-${e}${t}` : t.startsWith("/") ? `${e}${t}` : `${e}-${t}`;
}
var Ne = { aliceblue: [240, 248, 255], antiquewhite: [250, 235, 215], aqua: [0, 255, 255], aquamarine: [127, 255, 212], azure: [240, 255, 255], beige: [245, 245, 220], bisque: [255, 228, 196], black: [0, 0, 0], blanchedalmond: [255, 235, 205], blue: [0, 0, 255], blueviolet: [138, 43, 226], brown: [165, 42, 42], burlywood: [222, 184, 135], cadetblue: [95, 158, 160], chartreuse: [127, 255, 0], chocolate: [210, 105, 30], coral: [255, 127, 80], cornflowerblue: [100, 149, 237], cornsilk: [255, 248, 220], crimson: [220, 20, 60], cyan: [0, 255, 255], darkblue: [0, 0, 139], darkcyan: [0, 139, 139], darkgoldenrod: [184, 134, 11], darkgray: [169, 169, 169], darkgreen: [0, 100, 0], darkgrey: [169, 169, 169], darkkhaki: [189, 183, 107], darkmagenta: [139, 0, 139], darkolivegreen: [85, 107, 47], darkorange: [255, 140, 0], darkorchid: [153, 50, 204], darkred: [139, 0, 0], darksalmon: [233, 150, 122], darkseagreen: [143, 188, 143], darkslateblue: [72, 61, 139], darkslategray: [47, 79, 79], darkslategrey: [47, 79, 79], darkturquoise: [0, 206, 209], darkviolet: [148, 0, 211], deeppink: [255, 20, 147], deepskyblue: [0, 191, 255], dimgray: [105, 105, 105], dimgrey: [105, 105, 105], dodgerblue: [30, 144, 255], firebrick: [178, 34, 34], floralwhite: [255, 250, 240], forestgreen: [34, 139, 34], fuchsia: [255, 0, 255], gainsboro: [220, 220, 220], ghostwhite: [248, 248, 255], gold: [255, 215, 0], goldenrod: [218, 165, 32], gray: [128, 128, 128], green: [0, 128, 0], greenyellow: [173, 255, 47], grey: [128, 128, 128], honeydew: [240, 255, 240], hotpink: [255, 105, 180], indianred: [205, 92, 92], indigo: [75, 0, 130], ivory: [255, 255, 240], khaki: [240, 230, 140], lavender: [230, 230, 250], lavenderblush: [255, 240, 245], lawngreen: [124, 252, 0], lemonchiffon: [255, 250, 205], lightblue: [173, 216, 230], lightcoral: [240, 128, 128], lightcyan: [224, 255, 255], lightgoldenrodyellow: [250, 250, 210], lightgray: [211, 211, 211], lightgreen: [144, 238, 144], lightgrey: [211, 211, 211], lightpink: [255, 182, 193], lightsalmon: [255, 160, 122], lightseagreen: [32, 178, 170], lightskyblue: [135, 206, 250], lightslategray: [119, 136, 153], lightslategrey: [119, 136, 153], lightsteelblue: [176, 196, 222], lightyellow: [255, 255, 224], lime: [0, 255, 0], limegreen: [50, 205, 50], linen: [250, 240, 230], magenta: [255, 0, 255], maroon: [128, 0, 0], mediumaquamarine: [102, 205, 170], mediumblue: [0, 0, 205], mediumorchid: [186, 85, 211], mediumpurple: [147, 112, 219], mediumseagreen: [60, 179, 113], mediumslateblue: [123, 104, 238], mediumspringgreen: [0, 250, 154], mediumturquoise: [72, 209, 204], mediumvioletred: [199, 21, 133], midnightblue: [25, 25, 112], mintcream: [245, 255, 250], mistyrose: [255, 228, 225], moccasin: [255, 228, 181], navajowhite: [255, 222, 173], navy: [0, 0, 128], oldlace: [253, 245, 230], olive: [128, 128, 0], olivedrab: [107, 142, 35], orange: [255, 165, 0], orangered: [255, 69, 0], orchid: [218, 112, 214], palegoldenrod: [238, 232, 170], palegreen: [152, 251, 152], paleturquoise: [175, 238, 238], palevioletred: [219, 112, 147], papayawhip: [255, 239, 213], peachpuff: [255, 218, 185], peru: [205, 133, 63], pink: [255, 192, 203], plum: [221, 160, 221], powderblue: [176, 224, 230], purple: [128, 0, 128], rebeccapurple: [102, 51, 153], red: [255, 0, 0], rosybrown: [188, 143, 143], royalblue: [65, 105, 225], saddlebrown: [139, 69, 19], salmon: [250, 128, 114], sandybrown: [244, 164, 96], seagreen: [46, 139, 87], seashell: [255, 245, 238], sienna: [160, 82, 45], silver: [192, 192, 192], skyblue: [135, 206, 235], slateblue: [106, 90, 205], slategray: [112, 128, 144], slategrey: [112, 128, 144], snow: [255, 250, 250], springgreen: [0, 255, 127], steelblue: [70, 130, 180], tan: [210, 180, 140], teal: [0, 128, 128], thistle: [216, 191, 216], tomato: [255, 99, 71], turquoise: [64, 224, 208], violet: [238, 130, 238], wheat: [245, 222, 179], white: [255, 255, 255], whitesmoke: [245, 245, 245], yellow: [255, 255, 0], yellowgreen: [154, 205, 50] }, Vt = /^#([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})?$/i, Mt = /^#([a-f\d])([a-f\d])([a-f\d])([a-f\d])?$/i, q = /(?:\d+|\d*\.\d+)%?/, se = /(?:\s*,\s*|\s+)/, ot = /\s*[,/]\s*/, H = /var\(--(?:[^ )]*?)(?:,(?:[^ )]*?|var\(--[^ )]*?\)))?\)/, Dt = new RegExp(`^(rgba?)\\(\\s*(${q.source}|${H.source})(?:${se.source}(${q.source}|${H.source}))?(?:${se.source}(${q.source}|${H.source}))?(?:${ot.source}(${q.source}|${H.source}))?\\s*\\)$`), zt = new RegExp(`^(hsla?)\\(\\s*((?:${q.source})(?:deg|rad|grad|turn)?|${H.source})(?:${se.source}(${q.source}|${H.source}))?(?:${se.source}(${q.source}|${H.source}))?(?:${ot.source}(${q.source}|${H.source}))?\\s*\\)$`);
function Me(e, { loose: t = false } = {}) {
  var _a, _b;
  if (typeof e != "string") return null;
  if (e = e.trim(), e === "transparent") return { mode: "rgb", color: ["0", "0", "0"], alpha: "0" };
  if (e in Ne) return { mode: "rgb", color: Ne[e].map((i) => i.toString()) };
  let r = e.replace(Mt, (i, o, l, p, b) => ["#", o, o, l, l, p, p, b ? b + b : ""].join("")).match(Vt);
  if (r !== null) return { mode: "rgb", color: [parseInt(r[1], 16), parseInt(r[2], 16), parseInt(r[3], 16)].map((i) => i.toString()), alpha: r[4] ? (parseInt(r[4], 16) / 255).toString() : void 0 };
  let a = e.match(Dt) ?? e.match(zt);
  if (a === null) return null;
  let n = [a[2], a[3], a[4]].filter(Boolean).map((i) => i.toString());
  return n.length === 2 && n[0].startsWith("var(") ? { mode: a[1], color: [n[0]], alpha: n[1] } : !t && n.length !== 3 || n.length < 3 && !n.some((i) => /^var\(.*?\)$/.test(i)) ? null : { mode: a[1], color: n, alpha: (_b = (_a = a[5]) == null ? void 0 : _a.toString) == null ? void 0 : _b.call(_a) };
}
function lt({ mode: e, color: t, alpha: r }) {
  let a = r !== void 0;
  return e === "rgba" || e === "hsla" ? `${e}(${t.join(", ")}${a ? `, ${r}` : ""})` : `${e}(${t.join(" ")}${a ? ` / ${r}` : ""})`;
}
function de(e, t, r) {
  if (typeof e == "function") return e({ opacityValue: t });
  let a = Me(e, { loose: true });
  return a === null ? r : lt({ ...a, alpha: t });
}
function M({ color: e, property: t, variable: r }) {
  let a = [].concat(t);
  if (typeof e == "function") return { [r]: "1", ...Object.fromEntries(a.map((i) => [i, e({ opacityVariable: r, opacityValue: `var(${r}, 1)` })])) };
  let n = Me(e);
  return n === null ? Object.fromEntries(a.map((i) => [i, e])) : n.alpha !== void 0 ? Object.fromEntries(a.map((i) => [i, e])) : { [r]: "1", ...Object.fromEntries(a.map((i) => [i, lt({ ...n, alpha: `var(${r}, 1)` })])) };
}
function L(e, t) {
  let r = [], a = [], n = 0, i = false;
  for (let o = 0; o < e.length; o++) {
    let l = e[o];
    r.length === 0 && l === t[0] && !i && (t.length === 1 || e.slice(o, o + t.length) === t) && (a.push(e.slice(n, o)), n = o + t.length), i = i ? false : l === "\\", l === "(" || l === "[" || l === "{" ? r.push(l) : (l === ")" && r[r.length - 1] === "(" || l === "]" && r[r.length - 1] === "[" || l === "}" && r[r.length - 1] === "{") && r.pop();
  }
  return a.push(e.slice(n)), a;
}
var Et = /* @__PURE__ */ new Set(["inset", "inherit", "initial", "revert", "unset"]), Tt = /\ +(?![^(]*\))/g, Be = /^-?(\d+|\.\d+)(.*?)$/g;
function st(e) {
  return L(e, ",").map((t) => {
    let r = t.trim(), a = { raw: r }, n = r.split(Tt), i = /* @__PURE__ */ new Set();
    for (let o of n) Be.lastIndex = 0, !i.has("KEYWORD") && Et.has(o) ? (a.keyword = o, i.add("KEYWORD")) : Be.test(o) ? i.has("X") ? i.has("Y") ? i.has("BLUR") ? i.has("SPREAD") || (a.spread = o, i.add("SPREAD")) : (a.blur = o, i.add("BLUR")) : (a.y = o, i.add("Y")) : (a.x = o, i.add("X")) : a.color ? (a.unknown || (a.unknown = []), a.unknown.push(o)) : a.color = o;
    return a.valid = a.x !== void 0 && a.y !== void 0, a;
  });
}
function It(e) {
  return e.map((t) => t.valid ? [t.keyword, t.x, t.y, t.blur, t.spread, t.color].filter(Boolean).join(" ") : t.raw).join(", ");
}
var Pt = ["min", "max", "clamp", "calc"];
function De(e) {
  return Pt.some((t) => new RegExp(`^${t}\\(.*\\)`).test(e));
}
var Ft = /* @__PURE__ */ new Set(["scroll-timeline-name", "timeline-scope", "view-timeline-name", "font-palette", "anchor-name", "anchor-scope", "position-anchor", "position-try-options", "scroll-timeline", "animation-timeline", "view-timeline", "position-try"]);
function C(e, t = null, r = true) {
  let a = t && Ft.has(t.property);
  return e.startsWith("--") && !a ? `var(${e})` : e.includes("url(") ? e.split(/(url\(.*?\))/g).filter(Boolean).map((n) => /^url\(.*?\)$/.test(n) ? n : C(n, t, false)).join("") : (e = e.replace(/([^\\])_+/g, (n, i) => i + " ".repeat(n.length - 1)).replace(/^_/g, " ").replace(/\\_/g, "_"), r && (e = e.trim()), e = Wt(e), e);
}
function N(e) {
  return e.includes("=") && (e = e.replace(/(=.*)/g, (t, r) => {
    if (r[1] === "'" || r[1] === '"') return r;
    if (r.length > 2) {
      let a = r[r.length - 1];
      if (r[r.length - 2] === " " && (a === "i" || a === "I" || a === "s" || a === "S")) return `="${r.slice(1, -2)}" ${r[r.length - 1]}`;
    }
    return `="${r.slice(1)}"`;
  })), e;
}
function Wt(e) {
  let t = ["theme"], r = ["min-content", "max-content", "fit-content", "safe-area-inset-top", "safe-area-inset-right", "safe-area-inset-bottom", "safe-area-inset-left", "titlebar-area-x", "titlebar-area-y", "titlebar-area-width", "titlebar-area-height", "keyboard-inset-top", "keyboard-inset-right", "keyboard-inset-bottom", "keyboard-inset-left", "keyboard-inset-width", "keyboard-inset-height", "radial-gradient", "linear-gradient", "conic-gradient", "repeating-radial-gradient", "repeating-linear-gradient", "repeating-conic-gradient", "anchor-size"];
  return e.replace(/(calc|min|max|clamp)\(.+\)/g, (a) => {
    let n = "";
    function i() {
      let o = n.trimEnd();
      return o[o.length - 1];
    }
    for (let o = 0; o < a.length; o++) {
      let l = function(u) {
        return u.split("").every((w, s) => a[o + s] === w);
      }, p = function(u) {
        let w = 1 / 0;
        for (let d of u) {
          let g = a.indexOf(d, o);
          g !== -1 && g < w && (w = g);
        }
        let s = a.slice(o, w);
        return o += s.length - 1, s;
      }, b = a[o];
      if (l("var")) n += p([")", ","]);
      else if (r.some((u) => l(u))) {
        let u = r.find((w) => l(w));
        n += u, o += u.length - 1;
      } else t.some((u) => l(u)) ? n += p([")"]) : l("[") ? n += p(["]"]) : ["+", "-", "*", "/"].includes(b) && !["(", "+", "-", "*", "/", ","].includes(i()) ? n += ` ${b} ` : n += b;
    }
    return n.replace(/\s+/g, " ");
  });
}
function dt(e) {
  return e.startsWith("url(");
}
function ct(e) {
  return !isNaN(Number(e)) || De(e);
}
function ze(e) {
  return e.endsWith("%") && ct(e.slice(0, -1)) || De(e);
}
var Lt = ["cm", "mm", "Q", "in", "pc", "pt", "px", "em", "ex", "ch", "rem", "lh", "rlh", "vw", "vh", "vmin", "vmax", "vb", "vi", "svw", "svh", "lvw", "lvh", "dvw", "dvh", "cqw", "cqh", "cqi", "cqb", "cqmin", "cqmax"], Nt = `(?:${Lt.join("|")})`;
function Ee(e) {
  return e === "0" || new RegExp(`^[+-]?[0-9]*.?[0-9]+(?:[eE][+-]?[0-9]+)?${Nt}$`).test(e) || De(e);
}
var Bt = /* @__PURE__ */ new Set(["thin", "medium", "thick"]);
function _t(e) {
  return Bt.has(e);
}
function qt(e) {
  let t = st(C(e));
  for (let r of t) if (!r.valid) return false;
  return true;
}
function Ht(e) {
  let t = 0;
  return L(e, "_").every((r) => (r = C(r), r.startsWith("var(") ? true : Me(r, { loose: true }) !== null ? (t++, true) : false)) ? t > 0 : false;
}
function Yt(e) {
  let t = 0;
  return L(e, ",").every((r) => (r = C(r), r.startsWith("var(") ? true : dt(r) || Xt(r) || ["element(", "image(", "cross-fade(", "image-set("].some((a) => r.startsWith(a)) ? (t++, true) : false)) ? t > 0 : false;
}
var Gt = /* @__PURE__ */ new Set(["conic-gradient", "linear-gradient", "radial-gradient", "repeating-conic-gradient", "repeating-linear-gradient", "repeating-radial-gradient"]);
function Xt(e) {
  e = C(e);
  for (let t of Gt) if (e.startsWith(`${t}(`)) return true;
  return false;
}
var Kt = /* @__PURE__ */ new Set(["center", "top", "right", "bottom", "left"]);
function Qt(e) {
  let t = 0;
  return L(e, "_").every((r) => (r = C(r), r.startsWith("var(") ? true : Kt.has(r) || Ee(r) || ze(r) ? (t++, true) : false)) ? t > 0 : false;
}
function Jt(e) {
  let t = 0;
  return L(e, ",").every((r) => (r = C(r), r.startsWith("var(") ? true : r.includes(" ") && !/(['"])([^"']+)\1/g.test(r) || /^\d/g.test(r) ? false : (t++, true))) ? t > 0 : false;
}
var Zt = /* @__PURE__ */ new Set(["serif", "sans-serif", "monospace", "cursive", "fantasy", "system-ui", "ui-serif", "ui-sans-serif", "ui-monospace", "ui-rounded", "math", "emoji", "fangsong"]);
function er(e) {
  return Zt.has(e);
}
var tr = /* @__PURE__ */ new Set(["xx-small", "x-small", "small", "medium", "large", "x-large", "xx-large", "xxx-large"]);
function rr(e) {
  return tr.has(e);
}
var ar = /* @__PURE__ */ new Set(["larger", "smaller"]);
function nr(e) {
  return ar.has(e);
}
function be(e) {
  if (e = `${e}`, e === "0") return "0";
  if (/^[+-]?(\d+|\d*\.\d+)(e[+-]?\d+)?(%|\w+)?$/.test(e)) return e.replace(/^[+-]?/, (r) => r === "-" ? "" : "-");
  let t = ["var", "calc", "min", "max", "clamp"];
  for (let r of t) if (e.includes(`${r}(`)) return `calc(${e} * -1)`;
}
function ir(e) {
  let t = ["cover", "contain"];
  return L(e, ",").every((r) => {
    let a = L(r, "_").filter(Boolean);
    return a.length === 1 && t.includes(a[0]) ? true : a.length !== 1 && a.length !== 2 ? false : a.every((n) => Ee(n) || ze(n) || n === "auto");
  });
}
var _e = /* @__PURE__ */ new Set();
function fe(e, t, r) {
  typeof le < "u" && le.env.JEST_WORKER_ID || r && _e.has(r) || (r && _e.add(r), console.warn(""), t.forEach((a) => console.warn(e, "-", a)));
}
var T = { info(e, t) {
  fe(Q.bold(Q.cyan("info")), ...Array.isArray(e) ? [e] : [t, e]);
}, warn(e, t) {
  fe(Q.bold(Q.yellow("warn")), ...Array.isArray(e) ? [e] : [t, e]);
}, risk(e, t) {
  fe(Q.bold(Q.magenta("risk")), ...Array.isArray(e) ? [e] : [t, e]);
} }, qe = { optimizeUniversalDefaults: false, generalizedModifiers: true, disableColorOpacityUtilitiesByDefault: false, relativeContentPathsByDefault: false }, He = { future: ["hoverOnlyWhenSupported", "respectDefaultRingColorOpacity", "disableColorOpacityUtilitiesByDefault", "relativeContentPathsByDefault"], experimental: ["optimizeUniversalDefaults", "generalizedModifiers"] };
function Y(e, t) {
  var _a, _b;
  return He.future.includes(t) ? e.future === "all" || (((_a = e == null ? void 0 : e.future) == null ? void 0 : _a[t]) ?? qe[t] ?? false) : He.experimental.includes(t) ? e.experimental === "all" || (((_b = e == null ? void 0 : e.experimental) == null ? void 0 : _b[t]) ?? qe[t] ?? false) : false;
}
function or(e, t) {
  e.walkClasses((r) => {
    r.value = t(r.value), r.raws && r.raws.value && (r.raws.value = Ve(r.raws.value));
  });
}
function ut(e, t) {
  if (!G(e)) return;
  let r = e.slice(1, -1);
  if (t(r)) return C(r);
}
function lr(e, t = {}, r) {
  let a = t[e];
  if (a !== void 0) return be(a);
  if (G(e)) {
    let n = ut(e, r);
    return n === void 0 ? void 0 : be(n);
  }
}
function ue(e, t = {}, { validate: r = () => true } = {}) {
  var _a;
  let a = (_a = t.values) == null ? void 0 : _a[e];
  return a !== void 0 ? a : t.supportsNegativeValues && e.startsWith("-") ? lr(e.slice(1), t.values, r) : ut(e, r);
}
function G(e) {
  return e.startsWith("[") && e.endsWith("]");
}
function pt(e) {
  let t = e.lastIndexOf("/"), r = e.lastIndexOf("[", t), a = e.indexOf("]", t);
  return e[t - 1] === "]" || e[t + 1] === "[" || r !== -1 && a !== -1 && r < t && t < a && (t = e.lastIndexOf("/", r)), t === -1 || t === e.length - 1 ? [e, void 0] : G(e) && !e.includes("]/[") ? [e, void 0] : [e.slice(0, t), e.slice(t + 1)];
}
function Ye(e) {
  if (typeof e == "string" && e.includes("<alpha-value>")) {
    let t = e;
    return ({ opacityValue: r = 1 }) => t.replace(/<alpha-value>/g, r);
  }
  return e;
}
function ft(e) {
  return C(e.slice(1, -1));
}
function sr(e, t = {}, { tailwindConfig: r = {} } = {}) {
  var _a, _b, _c, _d, _e2;
  if (((_a = t.values) == null ? void 0 : _a[e]) !== void 0) return Ye((_b = t.values) == null ? void 0 : _b[e]);
  let [a, n] = pt(e);
  if (n !== void 0) {
    let i = ((_c = t.values) == null ? void 0 : _c[a]) ?? (G(a) ? a.slice(1, -1) : void 0);
    return i === void 0 ? void 0 : (i = Ye(i), G(n) ? de(i, ft(n)) : ((_e2 = (_d = r.theme) == null ? void 0 : _d.opacity) == null ? void 0 : _e2[n]) === void 0 ? void 0 : de(i, r.theme.opacity[n]));
  }
  return ue(e, t, { validate: Ht });
}
function dr(e, t = {}) {
  var _a;
  return (_a = t.values) == null ? void 0 : _a[e];
}
function E(e) {
  return (t, r) => ue(t, r, { validate: e });
}
var Te = { any: ue, color: sr, url: E(dt), image: E(Yt), length: E(Ee), percentage: E(ze), position: E(Qt), lookup: dr, "generic-name": E(er), "family-name": E(Jt), number: E(ct), "line-width": E(_t), "absolute-size": E(rr), "relative-size": E(nr), shadow: E(qt), size: E(ir) }, Ge = Object.keys(Te);
function cr(e, t) {
  let r = e.indexOf(t);
  return r === -1 ? [void 0, e] : [e.slice(0, r), e.slice(r + 1)];
}
function Xe(e, t, r, a) {
  if (r.values && t in r.values) for (let { type: i } of e ?? []) {
    let o = Te[i](t, r, { tailwindConfig: a });
    if (o !== void 0) return [o, i, null];
  }
  if (G(t)) {
    let i = t.slice(1, -1), [o, l] = cr(i, ":");
    if (!/^[\w-_]+$/g.test(o)) l = i;
    else if (o !== void 0 && !Ge.includes(o)) return [];
    if (l.length > 0 && Ge.includes(o)) return [ue(`[${l}]`, r), o, null];
  }
  let n = mt(e, t, r, a);
  for (let i of n) return i;
  return [];
}
function* mt(e, t, r, a) {
  var _a;
  let n = Y(a, "generalizedModifiers"), [i, o] = pt(t);
  if (n && r.modifiers != null && (r.modifiers === "any" || typeof r.modifiers == "object" && (o && G(o) || o in r.modifiers)) || (i = t, o = void 0), o !== void 0 && i === "" && (i = "DEFAULT"), o !== void 0 && typeof r.modifiers == "object") {
    let l = ((_a = r.modifiers) == null ? void 0 : _a[o]) ?? null;
    l !== null ? o = l : G(o) && (o = ft(o));
  }
  for (let { type: l } of e ?? []) {
    let p = Te[l](i, r, { tailwindConfig: a });
    p !== void 0 && (yield [p, l, o ?? null]);
  }
}
function y(e, t = [[e, [e]]], { filterDefault: r = false, ...a } = {}) {
  let n = Oe(e);
  return function({ matchUtilities: i, theme: o }) {
    for (let l of t) {
      let p = Array.isArray(l[0]) ? l : [l];
      i(p.reduce((b, [u, w]) => Object.assign(b, { [u]: (s) => w.reduce((d, g) => Array.isArray(g) ? Object.assign(d, { [g[0]]: g[1] }) : Object.assign(d, { [g]: n(s) }), {}) }), {}), { ...a, values: r ? Object.fromEntries(Object.entries(o(e) ?? {}).filter(([b]) => b !== "DEFAULT")) : o(e) });
    }
  };
}
function Ke(e) {
  return e = Array.isArray(e) ? e : [e], e.map((t) => {
    let r = t.values.map((a) => a.raw !== void 0 ? a.raw : [a.min && `(min-width: ${a.min})`, a.max && `(max-width: ${a.max})`].filter(Boolean).join(" and "));
    return t.not ? `not all and ${r}` : r;
  }).join(", ");
}
var ur = /* @__PURE__ */ new Set(["normal", "reverse", "alternate", "alternate-reverse"]), pr = /* @__PURE__ */ new Set(["running", "paused"]), fr = /* @__PURE__ */ new Set(["none", "forwards", "backwards", "both"]), mr = /* @__PURE__ */ new Set(["infinite"]), hr = /* @__PURE__ */ new Set(["linear", "ease", "ease-in", "ease-out", "ease-in-out", "step-start", "step-end"]), gr = ["cubic-bezier", "steps"], br = /\,(?![^(]*\))/g, yr = /\ +(?![^(]*\))/g, Qe = /^(-?[\d.]+m?s)$/, wr = /^(\d+)$/;
function vr(e) {
  return e.split(br).map((t) => {
    let r = t.trim(), a = { value: r }, n = r.split(yr), i = /* @__PURE__ */ new Set();
    for (let o of n) !i.has("DIRECTIONS") && ur.has(o) ? (a.direction = o, i.add("DIRECTIONS")) : !i.has("PLAY_STATES") && pr.has(o) ? (a.playState = o, i.add("PLAY_STATES")) : !i.has("FILL_MODES") && fr.has(o) ? (a.fillMode = o, i.add("FILL_MODES")) : !i.has("ITERATION_COUNTS") && (mr.has(o) || wr.test(o)) ? (a.iterationCount = o, i.add("ITERATION_COUNTS")) : !i.has("TIMING_FUNCTION") && hr.has(o) || !i.has("TIMING_FUNCTION") && gr.some((l) => o.startsWith(`${l}(`)) ? (a.timingFunction = o, i.add("TIMING_FUNCTION")) : !i.has("DURATION") && Qe.test(o) ? (a.duration = o, i.add("DURATION")) : !i.has("DELAY") && Qe.test(o) ? (a.delay = o, i.add("DELAY")) : i.has("NAME") ? (a.unknown || (a.unknown = []), a.unknown.push(o)) : (a.name = o, i.add("NAME"));
    return a;
  });
}
var ht = (e) => Object.assign({}, ...Object.entries(e ?? {}).flatMap(([t, r]) => typeof r == "object" ? Object.entries(ht(r)).map(([a, n]) => ({ [t + (a === "DEFAULT" ? "" : `-${a}`)]: n })) : [{ [`${t}`]: r }])), R = ht;
function S(e) {
  return typeof e == "function" ? e({}) : e;
}
var xr = "3.4.17";
function Ie(e, t = true) {
  return Array.isArray(e) ? e.map((r) => {
    if (t && Array.isArray(r)) throw new Error("The tuple syntax is not supported for `screens`.");
    if (typeof r == "string") return { name: r.toString(), not: false, values: [{ min: r, max: void 0 }] };
    let [a, n] = r;
    return a = a.toString(), typeof n == "string" ? { name: a, not: false, values: [{ min: n, max: void 0 }] } : Array.isArray(n) ? { name: a, not: false, values: n.map((i) => Je(i)) } : { name: a, not: false, values: [Je(n)] };
  }) : Ie(Object.entries(e ?? {}), false);
}
function ye(e) {
  return e.values.length !== 1 ? { result: false, reason: "multiple-values" } : e.values[0].raw !== void 0 ? { result: false, reason: "raw-values" } : e.values[0].min !== void 0 && e.values[0].max !== void 0 ? { result: false, reason: "min-and-max" } : { result: true, reason: null };
}
function kr(e, t, r) {
  let a = we(t, e), n = we(r, e), i = ye(a), o = ye(n);
  if (i.reason === "multiple-values" || o.reason === "multiple-values") throw new Error("Attempted to sort a screen with multiple values. This should never happen. Please open a bug report.");
  if (i.reason === "raw-values" || o.reason === "raw-values") throw new Error("Attempted to sort a screen with raw values. This should never happen. Please open a bug report.");
  if (i.reason === "min-and-max" || o.reason === "min-and-max") throw new Error("Attempted to sort a screen with both min and max values. This should never happen. Please open a bug report.");
  let { min: l, max: p } = a.values[0], { min: b, max: u } = n.values[0];
  t.not && ([l, p] = [p, l]), r.not && ([b, u] = [u, b]), l = l === void 0 ? l : parseFloat(l), p = p === void 0 ? p : parseFloat(p), b = b === void 0 ? b : parseFloat(b), u = u === void 0 ? u : parseFloat(u);
  let [w, s] = e === "min" ? [l, b] : [u, p];
  return w - s;
}
function we(e, t) {
  return typeof e == "object" ? e : { name: "arbitrary-screen", values: [{ [t]: e }] };
}
function Je({ "min-width": e, min: t = e, max: r, raw: a } = {}) {
  return { min: t, max: r, raw: a };
}
function me(e, t) {
  e.walkDecls((r) => {
    if (t.includes(r.prop)) {
      r.remove();
      return;
    }
    for (let a of t) r.value.includes(`/ var(${a})`) ? r.value = r.value.replace(`/ var(${a})`, "") : r.value.includes(`/ var(${a}, 1)`) && (r.value = r.value.replace(`/ var(${a}, 1)`, ""));
  });
}
var A = { childVariant: ({ addVariant: e }) => {
  e("*", "& > *");
}, pseudoElementVariants: ({ addVariant: e }) => {
  e("first-letter", "&::first-letter"), e("first-line", "&::first-line"), e("marker", [({ container: t }) => (me(t, ["--tw-text-opacity"]), "& *::marker"), ({ container: t }) => (me(t, ["--tw-text-opacity"]), "&::marker")]), e("selection", ["& *::selection", "&::selection"]), e("file", "&::file-selector-button"), e("placeholder", "&::placeholder"), e("backdrop", "&::backdrop"), e("before", ({ container: t }) => (t.walkRules((r) => {
    let a = false;
    r.walkDecls("content", () => {
      a = true;
    }), a || r.prepend(V.decl({ prop: "content", value: "var(--tw-content)" }));
  }), "&::before")), e("after", ({ container: t }) => (t.walkRules((r) => {
    let a = false;
    r.walkDecls("content", () => {
      a = true;
    }), a || r.prepend(V.decl({ prop: "content", value: "var(--tw-content)" }));
  }), "&::after"));
}, pseudoClassVariants: ({ addVariant: e, matchVariant: t, config: r, prefix: a }) => {
  let n = [["first", "&:first-child"], ["last", "&:last-child"], ["only", "&:only-child"], ["odd", "&:nth-child(odd)"], ["even", "&:nth-child(even)"], "first-of-type", "last-of-type", "only-of-type", ["visited", ({ container: o }) => (me(o, ["--tw-text-opacity", "--tw-border-opacity", "--tw-bg-opacity"]), "&:visited")], "target", ["open", "&[open]"], "default", "checked", "indeterminate", "placeholder-shown", "autofill", "optional", "required", "valid", "invalid", "in-range", "out-of-range", "read-only", "empty", "focus-within", ["hover", Y(r(), "hoverOnlyWhenSupported") ? "@media (hover: hover) and (pointer: fine) { &:hover }" : "&:hover"], "focus", "focus-visible", "active", "enabled", "disabled"].map((o) => Array.isArray(o) ? o : [o, `&:${o}`]);
  for (let [o, l] of n) e(o, (p) => typeof l == "function" ? l(p) : l);
  let i = { group: (o, { modifier: l }) => l ? [`:merge(${a(".group")}\\/${K(l)})`, " &"] : [`:merge(${a(".group")})`, " &"], peer: (o, { modifier: l }) => l ? [`:merge(${a(".peer")}\\/${K(l)})`, " ~ &"] : [`:merge(${a(".peer")})`, " ~ &"] };
  for (let [o, l] of Object.entries(i)) t(o, (p = "", b) => {
    let u = C(typeof p == "function" ? p(b) : p);
    u.includes("&") || (u = "&" + u);
    let [w, s] = l("", b), d = null, g = null, m = 0;
    for (let f = 0; f < u.length; ++f) {
      let c = u[f];
      c === "&" ? d = f : c === "'" || c === '"' ? m += 1 : d !== null && c === " " && !m && (g = f);
    }
    return d !== null && g === null && (g = u.length), u.slice(0, d) + w + u.slice(d + 1, g) + s + u.slice(g);
  }, { values: Object.fromEntries(n), [J]: { respectPrefix: false } });
}, directionVariants: ({ addVariant: e }) => {
  e("ltr", '&:where([dir="ltr"], [dir="ltr"] *)'), e("rtl", '&:where([dir="rtl"], [dir="rtl"] *)');
}, reducedMotionVariants: ({ addVariant: e }) => {
  e("motion-safe", "@media (prefers-reduced-motion: no-preference)"), e("motion-reduce", "@media (prefers-reduced-motion: reduce)");
}, darkVariants: ({ config: e, addVariant: t }) => {
  let [r, a = ".dark"] = [].concat(e("darkMode", "media"));
  if (r === false && (r = "media", T.warn("darkmode-false", ["The `darkMode` option in your Tailwind CSS configuration is set to `false`, which now behaves the same as `media`.", "Change `darkMode` to `media` or remove it entirely.", "https://tailwindcss.com/docs/upgrade-guide#remove-dark-mode-configuration"])), r === "variant") {
    let n;
    if (Array.isArray(a) || typeof a == "function" ? n = a : typeof a == "string" && (n = [a]), Array.isArray(n)) for (let i of n) i === ".dark" ? (r = false, T.warn("darkmode-variant-without-selector", ["When using `variant` for `darkMode`, you must provide a selector.", 'Example: `darkMode: ["variant", ".your-selector &"]`'])) : i.includes("&") || (r = false, T.warn("darkmode-variant-without-ampersand", ["When using `variant` for `darkMode`, your selector must contain `&`.", 'Example `darkMode: ["variant", ".your-selector &"]`']));
    a = n;
  }
  r === "selector" ? t("dark", `&:where(${a}, ${a} *)`) : r === "media" ? t("dark", "@media (prefers-color-scheme: dark)") : r === "variant" ? t("dark", a) : r === "class" && t("dark", `&:is(${a} *)`);
}, printVariant: ({ addVariant: e }) => {
  e("print", "@media print");
}, screenVariants: ({ theme: e, addVariant: t, matchVariant: r }) => {
  let a = e("screens") ?? {}, n = Object.values(a).every((c) => typeof c == "string"), i = Ie(e("screens")), o = /* @__PURE__ */ new Set([]);
  function l(c) {
    var _a;
    return ((_a = c.match(/(\D+)$/)) == null ? void 0 : _a[1]) ?? "(none)";
  }
  function p(c) {
    c !== void 0 && o.add(l(c));
  }
  function b(c) {
    return p(c), o.size === 1;
  }
  for (let c of i) for (let h of c.values) p(h.min), p(h.max);
  let u = o.size <= 1;
  function w(c) {
    return Object.fromEntries(i.filter((h) => ye(h).result).map((h) => {
      let { min: v, max: $ } = h.values[0];
      if ($ !== void 0) return h;
      if (v !== void 0) return { ...h, not: !h.not };
    }).map((h) => [h.name, h]));
  }
  function s(c) {
    return (h, v) => kr(c, h.value, v.value);
  }
  let d = s("max"), g = s("min");
  function m(c) {
    return (h) => {
      if (n) if (u) {
        if (typeof h == "string" && !b(h)) return T.warn("minmax-have-mixed-units", ["The `min-*` and `max-*` variants are not supported with a `screens` configuration containing mixed units."]), [];
      } else return T.warn("mixed-screen-units", ["The `min-*` and `max-*` variants are not supported with a `screens` configuration containing mixed units."]), [];
      else return T.warn("complex-screen-config", ["The `min-*` and `max-*` variants are not supported with a `screens` configuration containing objects."]), [];
      return [`@media ${Ke(we(h, c))}`];
    };
  }
  r("max", m("max"), { sort: d, values: n ? w() : {} });
  let f = "min-screens";
  for (let c of i) t(c.name, `@media ${Ke(c)}`, { id: f, sort: n && u ? g : void 0, value: c });
  r("min", m("min"), { id: f, sort: g });
}, supportsVariants: ({ matchVariant: e, theme: t }) => {
  e("supports", (r = "") => {
    let a = C(r), n = /^\w*\s*\(/.test(a);
    return a = n ? a.replace(/\b(and|or|not)\b/g, " $1 ") : a, n ? `@supports ${a}` : (a.includes(":") || (a = `${a}: var(--tw)`), a.startsWith("(") && a.endsWith(")") || (a = `(${a})`), `@supports ${a}`);
  }, { values: t("supports") ?? {} });
}, hasVariants: ({ matchVariant: e, prefix: t }) => {
  e("has", (r) => `&:has(${C(r)})`, { values: {}, [J]: { respectPrefix: false } }), e("group-has", (r, { modifier: a }) => a ? `:merge(${t(".group")}\\/${a}):has(${C(r)}) &` : `:merge(${t(".group")}):has(${C(r)}) &`, { values: {}, [J]: { respectPrefix: false } }), e("peer-has", (r, { modifier: a }) => a ? `:merge(${t(".peer")}\\/${a}):has(${C(r)}) ~ &` : `:merge(${t(".peer")}):has(${C(r)}) ~ &`, { values: {}, [J]: { respectPrefix: false } });
}, ariaVariants: ({ matchVariant: e, theme: t }) => {
  e("aria", (r) => `&[aria-${N(C(r))}]`, { values: t("aria") ?? {} }), e("group-aria", (r, { modifier: a }) => a ? `:merge(.group\\/${a})[aria-${N(C(r))}] &` : `:merge(.group)[aria-${N(C(r))}] &`, { values: t("aria") ?? {} }), e("peer-aria", (r, { modifier: a }) => a ? `:merge(.peer\\/${a})[aria-${N(C(r))}] ~ &` : `:merge(.peer)[aria-${N(C(r))}] ~ &`, { values: t("aria") ?? {} });
}, dataVariants: ({ matchVariant: e, theme: t }) => {
  e("data", (r) => `&[data-${N(C(r))}]`, { values: t("data") ?? {} }), e("group-data", (r, { modifier: a }) => a ? `:merge(.group\\/${a})[data-${N(C(r))}] &` : `:merge(.group)[data-${N(C(r))}] &`, { values: t("data") ?? {} }), e("peer-data", (r, { modifier: a }) => a ? `:merge(.peer\\/${a})[data-${N(C(r))}] ~ &` : `:merge(.peer)[data-${N(C(r))}] ~ &`, { values: t("data") ?? {} });
}, orientationVariants: ({ addVariant: e }) => {
  e("portrait", "@media (orientation: portrait)"), e("landscape", "@media (orientation: landscape)");
}, prefersContrastVariants: ({ addVariant: e }) => {
  e("contrast-more", "@media (prefers-contrast: more)"), e("contrast-less", "@media (prefers-contrast: less)");
}, forcedColorsVariants: ({ addVariant: e }) => {
  e("forced-colors", "@media (forced-colors: active)");
} }, W = ["translate(var(--tw-translate-x), var(--tw-translate-y))", "rotate(var(--tw-rotate))", "skewX(var(--tw-skew-x))", "skewY(var(--tw-skew-y))", "scaleX(var(--tw-scale-x))", "scaleY(var(--tw-scale-y))"].join(" "), B = ["var(--tw-blur)", "var(--tw-brightness)", "var(--tw-contrast)", "var(--tw-grayscale)", "var(--tw-hue-rotate)", "var(--tw-invert)", "var(--tw-saturate)", "var(--tw-sepia)", "var(--tw-drop-shadow)"].join(" "), O = ["var(--tw-backdrop-blur)", "var(--tw-backdrop-brightness)", "var(--tw-backdrop-contrast)", "var(--tw-backdrop-grayscale)", "var(--tw-backdrop-hue-rotate)", "var(--tw-backdrop-invert)", "var(--tw-backdrop-opacity)", "var(--tw-backdrop-saturate)", "var(--tw-backdrop-sepia)"].join(" "), $r = { preflight: ({ addBase: e }) => {
  let t = V.parse(`/*
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
  e([V.comment({ text: `! tailwindcss v${xr} | MIT License | https://tailwindcss.com` }), ...t.nodes]);
}, container: /* @__PURE__ */ (() => {
  function e(r = []) {
    return r.flatMap((a) => a.values.map((n) => n.min)).filter((a) => a !== void 0);
  }
  function t(r, a, n) {
    if (typeof n > "u") return [];
    if (!(typeof n == "object" && n !== null)) return [{ screen: "DEFAULT", minWidth: 0, padding: n }];
    let i = [];
    n.DEFAULT && i.push({ screen: "DEFAULT", minWidth: 0, padding: n.DEFAULT });
    for (let o of r) for (let l of a) for (let { min: p } of l.values) p === o && i.push({ minWidth: o, padding: n[l.name] });
    return i;
  }
  return function({ addComponents: r, theme: a }) {
    let n = Ie(a("container.screens", a("screens"))), i = e(n), o = t(i, n, a("container.padding")), l = (b) => {
      let u = o.find((w) => w.minWidth === b);
      return u ? { paddingRight: u.padding, paddingLeft: u.padding } : {};
    }, p = Array.from(new Set(i.slice().sort((b, u) => parseInt(b) - parseInt(u)))).map((b) => ({ [`@media (min-width: ${b})`]: { ".container": { "max-width": b, ...l(b) } } }));
    r([{ ".container": Object.assign({ width: "100%" }, a("container.center", false) ? { marginRight: "auto", marginLeft: "auto" } : {}, l(0)) }, ...p]);
  };
})(), accessibility: ({ addUtilities: e }) => {
  e({ ".sr-only": { position: "absolute", width: "1px", height: "1px", padding: "0", margin: "-1px", overflow: "hidden", clip: "rect(0, 0, 0, 0)", whiteSpace: "nowrap", borderWidth: "0" }, ".not-sr-only": { position: "static", width: "auto", height: "auto", padding: "0", margin: "0", overflow: "visible", clip: "auto", whiteSpace: "normal" } });
}, pointerEvents: ({ addUtilities: e }) => {
  e({ ".pointer-events-none": { "pointer-events": "none" }, ".pointer-events-auto": { "pointer-events": "auto" } });
}, visibility: ({ addUtilities: e }) => {
  e({ ".visible": { visibility: "visible" }, ".invisible": { visibility: "hidden" }, ".collapse": { visibility: "collapse" } });
}, position: ({ addUtilities: e }) => {
  e({ ".static": { position: "static" }, ".fixed": { position: "fixed" }, ".absolute": { position: "absolute" }, ".relative": { position: "relative" }, ".sticky": { position: "sticky" } });
}, inset: y("inset", [["inset", ["inset"]], [["inset-x", ["left", "right"]], ["inset-y", ["top", "bottom"]]], [["start", ["inset-inline-start"]], ["end", ["inset-inline-end"]], ["top", ["top"]], ["right", ["right"]], ["bottom", ["bottom"]], ["left", ["left"]]]], { supportsNegativeValues: true }), isolation: ({ addUtilities: e }) => {
  e({ ".isolate": { isolation: "isolate" }, ".isolation-auto": { isolation: "auto" } });
}, zIndex: y("zIndex", [["z", ["zIndex"]]], { supportsNegativeValues: true }), order: y("order", void 0, { supportsNegativeValues: true }), gridColumn: y("gridColumn", [["col", ["gridColumn"]]]), gridColumnStart: y("gridColumnStart", [["col-start", ["gridColumnStart"]]], { supportsNegativeValues: true }), gridColumnEnd: y("gridColumnEnd", [["col-end", ["gridColumnEnd"]]], { supportsNegativeValues: true }), gridRow: y("gridRow", [["row", ["gridRow"]]]), gridRowStart: y("gridRowStart", [["row-start", ["gridRowStart"]]], { supportsNegativeValues: true }), gridRowEnd: y("gridRowEnd", [["row-end", ["gridRowEnd"]]], { supportsNegativeValues: true }), float: ({ addUtilities: e }) => {
  e({ ".float-start": { float: "inline-start" }, ".float-end": { float: "inline-end" }, ".float-right": { float: "right" }, ".float-left": { float: "left" }, ".float-none": { float: "none" } });
}, clear: ({ addUtilities: e }) => {
  e({ ".clear-start": { clear: "inline-start" }, ".clear-end": { clear: "inline-end" }, ".clear-left": { clear: "left" }, ".clear-right": { clear: "right" }, ".clear-both": { clear: "both" }, ".clear-none": { clear: "none" } });
}, margin: y("margin", [["m", ["margin"]], [["mx", ["margin-left", "margin-right"]], ["my", ["margin-top", "margin-bottom"]]], [["ms", ["margin-inline-start"]], ["me", ["margin-inline-end"]], ["mt", ["margin-top"]], ["mr", ["margin-right"]], ["mb", ["margin-bottom"]], ["ml", ["margin-left"]]]], { supportsNegativeValues: true }), boxSizing: ({ addUtilities: e }) => {
  e({ ".box-border": { "box-sizing": "border-box" }, ".box-content": { "box-sizing": "content-box" } });
}, lineClamp: ({ matchUtilities: e, addUtilities: t, theme: r }) => {
  e({ "line-clamp": (a) => ({ overflow: "hidden", display: "-webkit-box", "-webkit-box-orient": "vertical", "-webkit-line-clamp": `${a}` }) }, { values: r("lineClamp") }), t({ ".line-clamp-none": { overflow: "visible", display: "block", "-webkit-box-orient": "horizontal", "-webkit-line-clamp": "none" } });
}, display: ({ addUtilities: e }) => {
  e({ ".block": { display: "block" }, ".inline-block": { display: "inline-block" }, ".inline": { display: "inline" }, ".flex": { display: "flex" }, ".inline-flex": { display: "inline-flex" }, ".table": { display: "table" }, ".inline-table": { display: "inline-table" }, ".table-caption": { display: "table-caption" }, ".table-cell": { display: "table-cell" }, ".table-column": { display: "table-column" }, ".table-column-group": { display: "table-column-group" }, ".table-footer-group": { display: "table-footer-group" }, ".table-header-group": { display: "table-header-group" }, ".table-row-group": { display: "table-row-group" }, ".table-row": { display: "table-row" }, ".flow-root": { display: "flow-root" }, ".grid": { display: "grid" }, ".inline-grid": { display: "inline-grid" }, ".contents": { display: "contents" }, ".list-item": { display: "list-item" }, ".hidden": { display: "none" } });
}, aspectRatio: y("aspectRatio", [["aspect", ["aspect-ratio"]]]), size: y("size", [["size", ["width", "height"]]]), height: y("height", [["h", ["height"]]]), maxHeight: y("maxHeight", [["max-h", ["maxHeight"]]]), minHeight: y("minHeight", [["min-h", ["minHeight"]]]), width: y("width", [["w", ["width"]]]), minWidth: y("minWidth", [["min-w", ["minWidth"]]]), maxWidth: y("maxWidth", [["max-w", ["maxWidth"]]]), flex: y("flex"), flexShrink: y("flexShrink", [["flex-shrink", ["flex-shrink"]], ["shrink", ["flex-shrink"]]]), flexGrow: y("flexGrow", [["flex-grow", ["flex-grow"]], ["grow", ["flex-grow"]]]), flexBasis: y("flexBasis", [["basis", ["flex-basis"]]]), tableLayout: ({ addUtilities: e }) => {
  e({ ".table-auto": { "table-layout": "auto" }, ".table-fixed": { "table-layout": "fixed" } });
}, captionSide: ({ addUtilities: e }) => {
  e({ ".caption-top": { "caption-side": "top" }, ".caption-bottom": { "caption-side": "bottom" } });
}, borderCollapse: ({ addUtilities: e }) => {
  e({ ".border-collapse": { "border-collapse": "collapse" }, ".border-separate": { "border-collapse": "separate" } });
}, borderSpacing: ({ addDefaults: e, matchUtilities: t, theme: r }) => {
  e("border-spacing", { "--tw-border-spacing-x": 0, "--tw-border-spacing-y": 0 }), t({ "border-spacing": (a) => ({ "--tw-border-spacing-x": a, "--tw-border-spacing-y": a, "@defaults border-spacing": {}, "border-spacing": "var(--tw-border-spacing-x) var(--tw-border-spacing-y)" }), "border-spacing-x": (a) => ({ "--tw-border-spacing-x": a, "@defaults border-spacing": {}, "border-spacing": "var(--tw-border-spacing-x) var(--tw-border-spacing-y)" }), "border-spacing-y": (a) => ({ "--tw-border-spacing-y": a, "@defaults border-spacing": {}, "border-spacing": "var(--tw-border-spacing-x) var(--tw-border-spacing-y)" }) }, { values: r("borderSpacing") });
}, transformOrigin: y("transformOrigin", [["origin", ["transformOrigin"]]]), translate: y("translate", [[["translate-x", [["@defaults transform", {}], "--tw-translate-x", ["transform", W]]], ["translate-y", [["@defaults transform", {}], "--tw-translate-y", ["transform", W]]]]], { supportsNegativeValues: true }), rotate: y("rotate", [["rotate", [["@defaults transform", {}], "--tw-rotate", ["transform", W]]]], { supportsNegativeValues: true }), skew: y("skew", [[["skew-x", [["@defaults transform", {}], "--tw-skew-x", ["transform", W]]], ["skew-y", [["@defaults transform", {}], "--tw-skew-y", ["transform", W]]]]], { supportsNegativeValues: true }), scale: y("scale", [["scale", [["@defaults transform", {}], "--tw-scale-x", "--tw-scale-y", ["transform", W]]], [["scale-x", [["@defaults transform", {}], "--tw-scale-x", ["transform", W]]], ["scale-y", [["@defaults transform", {}], "--tw-scale-y", ["transform", W]]]]], { supportsNegativeValues: true }), transform: ({ addDefaults: e, addUtilities: t }) => {
  e("transform", { "--tw-translate-x": "0", "--tw-translate-y": "0", "--tw-rotate": "0", "--tw-skew-x": "0", "--tw-skew-y": "0", "--tw-scale-x": "1", "--tw-scale-y": "1" }), t({ ".transform": { "@defaults transform": {}, transform: W }, ".transform-cpu": { transform: W }, ".transform-gpu": { transform: W.replace("translate(var(--tw-translate-x), var(--tw-translate-y))", "translate3d(var(--tw-translate-x), var(--tw-translate-y), 0)") }, ".transform-none": { transform: "none" } });
}, animation: ({ matchUtilities: e, theme: t, config: r }) => {
  let a = (i) => K(r("prefix") + i), n = Object.fromEntries(Object.entries(t("keyframes") ?? {}).map(([i, o]) => [i, { [`@keyframes ${a(i)}`]: o }]));
  e({ animate: (i) => {
    let o = vr(i);
    return [...o.flatMap((l) => n[l.name]), { animation: o.map(({ name: l, value: p }) => l === void 0 || n[l] === void 0 ? p : p.replace(l, a(l))).join(", ") }];
  } }, { values: t("animation") });
}, cursor: y("cursor"), touchAction: ({ addDefaults: e, addUtilities: t }) => {
  e("touch-action", { "--tw-pan-x": " ", "--tw-pan-y": " ", "--tw-pinch-zoom": " " });
  let r = "var(--tw-pan-x) var(--tw-pan-y) var(--tw-pinch-zoom)";
  t({ ".touch-auto": { "touch-action": "auto" }, ".touch-none": { "touch-action": "none" }, ".touch-pan-x": { "@defaults touch-action": {}, "--tw-pan-x": "pan-x", "touch-action": r }, ".touch-pan-left": { "@defaults touch-action": {}, "--tw-pan-x": "pan-left", "touch-action": r }, ".touch-pan-right": { "@defaults touch-action": {}, "--tw-pan-x": "pan-right", "touch-action": r }, ".touch-pan-y": { "@defaults touch-action": {}, "--tw-pan-y": "pan-y", "touch-action": r }, ".touch-pan-up": { "@defaults touch-action": {}, "--tw-pan-y": "pan-up", "touch-action": r }, ".touch-pan-down": { "@defaults touch-action": {}, "--tw-pan-y": "pan-down", "touch-action": r }, ".touch-pinch-zoom": { "@defaults touch-action": {}, "--tw-pinch-zoom": "pinch-zoom", "touch-action": r }, ".touch-manipulation": { "touch-action": "manipulation" } });
}, userSelect: ({ addUtilities: e }) => {
  e({ ".select-none": { "user-select": "none" }, ".select-text": { "user-select": "text" }, ".select-all": { "user-select": "all" }, ".select-auto": { "user-select": "auto" } });
}, resize: ({ addUtilities: e }) => {
  e({ ".resize-none": { resize: "none" }, ".resize-y": { resize: "vertical" }, ".resize-x": { resize: "horizontal" }, ".resize": { resize: "both" } });
}, scrollSnapType: ({ addDefaults: e, addUtilities: t }) => {
  e("scroll-snap-type", { "--tw-scroll-snap-strictness": "proximity" }), t({ ".snap-none": { "scroll-snap-type": "none" }, ".snap-x": { "@defaults scroll-snap-type": {}, "scroll-snap-type": "x var(--tw-scroll-snap-strictness)" }, ".snap-y": { "@defaults scroll-snap-type": {}, "scroll-snap-type": "y var(--tw-scroll-snap-strictness)" }, ".snap-both": { "@defaults scroll-snap-type": {}, "scroll-snap-type": "both var(--tw-scroll-snap-strictness)" }, ".snap-mandatory": { "--tw-scroll-snap-strictness": "mandatory" }, ".snap-proximity": { "--tw-scroll-snap-strictness": "proximity" } });
}, scrollSnapAlign: ({ addUtilities: e }) => {
  e({ ".snap-start": { "scroll-snap-align": "start" }, ".snap-end": { "scroll-snap-align": "end" }, ".snap-center": { "scroll-snap-align": "center" }, ".snap-align-none": { "scroll-snap-align": "none" } });
}, scrollSnapStop: ({ addUtilities: e }) => {
  e({ ".snap-normal": { "scroll-snap-stop": "normal" }, ".snap-always": { "scroll-snap-stop": "always" } });
}, scrollMargin: y("scrollMargin", [["scroll-m", ["scroll-margin"]], [["scroll-mx", ["scroll-margin-left", "scroll-margin-right"]], ["scroll-my", ["scroll-margin-top", "scroll-margin-bottom"]]], [["scroll-ms", ["scroll-margin-inline-start"]], ["scroll-me", ["scroll-margin-inline-end"]], ["scroll-mt", ["scroll-margin-top"]], ["scroll-mr", ["scroll-margin-right"]], ["scroll-mb", ["scroll-margin-bottom"]], ["scroll-ml", ["scroll-margin-left"]]]], { supportsNegativeValues: true }), scrollPadding: y("scrollPadding", [["scroll-p", ["scroll-padding"]], [["scroll-px", ["scroll-padding-left", "scroll-padding-right"]], ["scroll-py", ["scroll-padding-top", "scroll-padding-bottom"]]], [["scroll-ps", ["scroll-padding-inline-start"]], ["scroll-pe", ["scroll-padding-inline-end"]], ["scroll-pt", ["scroll-padding-top"]], ["scroll-pr", ["scroll-padding-right"]], ["scroll-pb", ["scroll-padding-bottom"]], ["scroll-pl", ["scroll-padding-left"]]]]), listStylePosition: ({ addUtilities: e }) => {
  e({ ".list-inside": { "list-style-position": "inside" }, ".list-outside": { "list-style-position": "outside" } });
}, listStyleType: y("listStyleType", [["list", ["listStyleType"]]]), listStyleImage: y("listStyleImage", [["list-image", ["listStyleImage"]]]), appearance: ({ addUtilities: e }) => {
  e({ ".appearance-none": { appearance: "none" }, ".appearance-auto": { appearance: "auto" } });
}, columns: y("columns", [["columns", ["columns"]]]), breakBefore: ({ addUtilities: e }) => {
  e({ ".break-before-auto": { "break-before": "auto" }, ".break-before-avoid": { "break-before": "avoid" }, ".break-before-all": { "break-before": "all" }, ".break-before-avoid-page": { "break-before": "avoid-page" }, ".break-before-page": { "break-before": "page" }, ".break-before-left": { "break-before": "left" }, ".break-before-right": { "break-before": "right" }, ".break-before-column": { "break-before": "column" } });
}, breakInside: ({ addUtilities: e }) => {
  e({ ".break-inside-auto": { "break-inside": "auto" }, ".break-inside-avoid": { "break-inside": "avoid" }, ".break-inside-avoid-page": { "break-inside": "avoid-page" }, ".break-inside-avoid-column": { "break-inside": "avoid-column" } });
}, breakAfter: ({ addUtilities: e }) => {
  e({ ".break-after-auto": { "break-after": "auto" }, ".break-after-avoid": { "break-after": "avoid" }, ".break-after-all": { "break-after": "all" }, ".break-after-avoid-page": { "break-after": "avoid-page" }, ".break-after-page": { "break-after": "page" }, ".break-after-left": { "break-after": "left" }, ".break-after-right": { "break-after": "right" }, ".break-after-column": { "break-after": "column" } });
}, gridAutoColumns: y("gridAutoColumns", [["auto-cols", ["gridAutoColumns"]]]), gridAutoFlow: ({ addUtilities: e }) => {
  e({ ".grid-flow-row": { gridAutoFlow: "row" }, ".grid-flow-col": { gridAutoFlow: "column" }, ".grid-flow-dense": { gridAutoFlow: "dense" }, ".grid-flow-row-dense": { gridAutoFlow: "row dense" }, ".grid-flow-col-dense": { gridAutoFlow: "column dense" } });
}, gridAutoRows: y("gridAutoRows", [["auto-rows", ["gridAutoRows"]]]), gridTemplateColumns: y("gridTemplateColumns", [["grid-cols", ["gridTemplateColumns"]]]), gridTemplateRows: y("gridTemplateRows", [["grid-rows", ["gridTemplateRows"]]]), flexDirection: ({ addUtilities: e }) => {
  e({ ".flex-row": { "flex-direction": "row" }, ".flex-row-reverse": { "flex-direction": "row-reverse" }, ".flex-col": { "flex-direction": "column" }, ".flex-col-reverse": { "flex-direction": "column-reverse" } });
}, flexWrap: ({ addUtilities: e }) => {
  e({ ".flex-wrap": { "flex-wrap": "wrap" }, ".flex-wrap-reverse": { "flex-wrap": "wrap-reverse" }, ".flex-nowrap": { "flex-wrap": "nowrap" } });
}, placeContent: ({ addUtilities: e }) => {
  e({ ".place-content-center": { "place-content": "center" }, ".place-content-start": { "place-content": "start" }, ".place-content-end": { "place-content": "end" }, ".place-content-between": { "place-content": "space-between" }, ".place-content-around": { "place-content": "space-around" }, ".place-content-evenly": { "place-content": "space-evenly" }, ".place-content-baseline": { "place-content": "baseline" }, ".place-content-stretch": { "place-content": "stretch" } });
}, placeItems: ({ addUtilities: e }) => {
  e({ ".place-items-start": { "place-items": "start" }, ".place-items-end": { "place-items": "end" }, ".place-items-center": { "place-items": "center" }, ".place-items-baseline": { "place-items": "baseline" }, ".place-items-stretch": { "place-items": "stretch" } });
}, alignContent: ({ addUtilities: e }) => {
  e({ ".content-normal": { "align-content": "normal" }, ".content-center": { "align-content": "center" }, ".content-start": { "align-content": "flex-start" }, ".content-end": { "align-content": "flex-end" }, ".content-between": { "align-content": "space-between" }, ".content-around": { "align-content": "space-around" }, ".content-evenly": { "align-content": "space-evenly" }, ".content-baseline": { "align-content": "baseline" }, ".content-stretch": { "align-content": "stretch" } });
}, alignItems: ({ addUtilities: e }) => {
  e({ ".items-start": { "align-items": "flex-start" }, ".items-end": { "align-items": "flex-end" }, ".items-center": { "align-items": "center" }, ".items-baseline": { "align-items": "baseline" }, ".items-stretch": { "align-items": "stretch" } });
}, justifyContent: ({ addUtilities: e }) => {
  e({ ".justify-normal": { "justify-content": "normal" }, ".justify-start": { "justify-content": "flex-start" }, ".justify-end": { "justify-content": "flex-end" }, ".justify-center": { "justify-content": "center" }, ".justify-between": { "justify-content": "space-between" }, ".justify-around": { "justify-content": "space-around" }, ".justify-evenly": { "justify-content": "space-evenly" }, ".justify-stretch": { "justify-content": "stretch" } });
}, justifyItems: ({ addUtilities: e }) => {
  e({ ".justify-items-start": { "justify-items": "start" }, ".justify-items-end": { "justify-items": "end" }, ".justify-items-center": { "justify-items": "center" }, ".justify-items-stretch": { "justify-items": "stretch" } });
}, gap: y("gap", [["gap", ["gap"]], [["gap-x", ["columnGap"]], ["gap-y", ["rowGap"]]]]), space: ({ matchUtilities: e, addUtilities: t, theme: r }) => {
  e({ "space-x": (a) => (a = a === "0" ? "0px" : a, { "& > :not([hidden]) ~ :not([hidden])": { "--tw-space-x-reverse": "0", "margin-right": `calc(${a} * var(--tw-space-x-reverse))`, "margin-left": `calc(${a} * calc(1 - var(--tw-space-x-reverse)))` } }), "space-y": (a) => (a = a === "0" ? "0px" : a, { "& > :not([hidden]) ~ :not([hidden])": { "--tw-space-y-reverse": "0", "margin-top": `calc(${a} * calc(1 - var(--tw-space-y-reverse)))`, "margin-bottom": `calc(${a} * var(--tw-space-y-reverse))` } }) }, { values: r("space"), supportsNegativeValues: true }), t({ ".space-y-reverse > :not([hidden]) ~ :not([hidden])": { "--tw-space-y-reverse": "1" }, ".space-x-reverse > :not([hidden]) ~ :not([hidden])": { "--tw-space-x-reverse": "1" } });
}, divideWidth: ({ matchUtilities: e, addUtilities: t, theme: r }) => {
  e({ "divide-x": (a) => (a = a === "0" ? "0px" : a, { "& > :not([hidden]) ~ :not([hidden])": { "@defaults border-width": {}, "--tw-divide-x-reverse": "0", "border-right-width": `calc(${a} * var(--tw-divide-x-reverse))`, "border-left-width": `calc(${a} * calc(1 - var(--tw-divide-x-reverse)))` } }), "divide-y": (a) => (a = a === "0" ? "0px" : a, { "& > :not([hidden]) ~ :not([hidden])": { "@defaults border-width": {}, "--tw-divide-y-reverse": "0", "border-top-width": `calc(${a} * calc(1 - var(--tw-divide-y-reverse)))`, "border-bottom-width": `calc(${a} * var(--tw-divide-y-reverse))` } }) }, { values: r("divideWidth"), type: ["line-width", "length", "any"] }), t({ ".divide-y-reverse > :not([hidden]) ~ :not([hidden])": { "@defaults border-width": {}, "--tw-divide-y-reverse": "1" }, ".divide-x-reverse > :not([hidden]) ~ :not([hidden])": { "@defaults border-width": {}, "--tw-divide-x-reverse": "1" } });
}, divideStyle: ({ addUtilities: e }) => {
  e({ ".divide-solid > :not([hidden]) ~ :not([hidden])": { "border-style": "solid" }, ".divide-dashed > :not([hidden]) ~ :not([hidden])": { "border-style": "dashed" }, ".divide-dotted > :not([hidden]) ~ :not([hidden])": { "border-style": "dotted" }, ".divide-double > :not([hidden]) ~ :not([hidden])": { "border-style": "double" }, ".divide-none > :not([hidden]) ~ :not([hidden])": { "border-style": "none" } });
}, divideColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
  e({ divide: (a) => r("divideOpacity") ? { "& > :not([hidden]) ~ :not([hidden])": M({ color: a, property: "border-color", variable: "--tw-divide-opacity" }) } : { "& > :not([hidden]) ~ :not([hidden])": { "border-color": S(a) } } }, { values: (({ DEFAULT: a, ...n }) => n)(R(t("divideColor"))), type: ["color", "any"] });
}, divideOpacity: ({ matchUtilities: e, theme: t }) => {
  e({ "divide-opacity": (r) => ({ "& > :not([hidden]) ~ :not([hidden])": { "--tw-divide-opacity": r } }) }, { values: t("divideOpacity") });
}, placeSelf: ({ addUtilities: e }) => {
  e({ ".place-self-auto": { "place-self": "auto" }, ".place-self-start": { "place-self": "start" }, ".place-self-end": { "place-self": "end" }, ".place-self-center": { "place-self": "center" }, ".place-self-stretch": { "place-self": "stretch" } });
}, alignSelf: ({ addUtilities: e }) => {
  e({ ".self-auto": { "align-self": "auto" }, ".self-start": { "align-self": "flex-start" }, ".self-end": { "align-self": "flex-end" }, ".self-center": { "align-self": "center" }, ".self-stretch": { "align-self": "stretch" }, ".self-baseline": { "align-self": "baseline" } });
}, justifySelf: ({ addUtilities: e }) => {
  e({ ".justify-self-auto": { "justify-self": "auto" }, ".justify-self-start": { "justify-self": "start" }, ".justify-self-end": { "justify-self": "end" }, ".justify-self-center": { "justify-self": "center" }, ".justify-self-stretch": { "justify-self": "stretch" } });
}, overflow: ({ addUtilities: e }) => {
  e({ ".overflow-auto": { overflow: "auto" }, ".overflow-hidden": { overflow: "hidden" }, ".overflow-clip": { overflow: "clip" }, ".overflow-visible": { overflow: "visible" }, ".overflow-scroll": { overflow: "scroll" }, ".overflow-x-auto": { "overflow-x": "auto" }, ".overflow-y-auto": { "overflow-y": "auto" }, ".overflow-x-hidden": { "overflow-x": "hidden" }, ".overflow-y-hidden": { "overflow-y": "hidden" }, ".overflow-x-clip": { "overflow-x": "clip" }, ".overflow-y-clip": { "overflow-y": "clip" }, ".overflow-x-visible": { "overflow-x": "visible" }, ".overflow-y-visible": { "overflow-y": "visible" }, ".overflow-x-scroll": { "overflow-x": "scroll" }, ".overflow-y-scroll": { "overflow-y": "scroll" } });
}, overscrollBehavior: ({ addUtilities: e }) => {
  e({ ".overscroll-auto": { "overscroll-behavior": "auto" }, ".overscroll-contain": { "overscroll-behavior": "contain" }, ".overscroll-none": { "overscroll-behavior": "none" }, ".overscroll-y-auto": { "overscroll-behavior-y": "auto" }, ".overscroll-y-contain": { "overscroll-behavior-y": "contain" }, ".overscroll-y-none": { "overscroll-behavior-y": "none" }, ".overscroll-x-auto": { "overscroll-behavior-x": "auto" }, ".overscroll-x-contain": { "overscroll-behavior-x": "contain" }, ".overscroll-x-none": { "overscroll-behavior-x": "none" } });
}, scrollBehavior: ({ addUtilities: e }) => {
  e({ ".scroll-auto": { "scroll-behavior": "auto" }, ".scroll-smooth": { "scroll-behavior": "smooth" } });
}, textOverflow: ({ addUtilities: e }) => {
  e({ ".truncate": { overflow: "hidden", "text-overflow": "ellipsis", "white-space": "nowrap" }, ".overflow-ellipsis": { "text-overflow": "ellipsis" }, ".text-ellipsis": { "text-overflow": "ellipsis" }, ".text-clip": { "text-overflow": "clip" } });
}, hyphens: ({ addUtilities: e }) => {
  e({ ".hyphens-none": { hyphens: "none" }, ".hyphens-manual": { hyphens: "manual" }, ".hyphens-auto": { hyphens: "auto" } });
}, whitespace: ({ addUtilities: e }) => {
  e({ ".whitespace-normal": { "white-space": "normal" }, ".whitespace-nowrap": { "white-space": "nowrap" }, ".whitespace-pre": { "white-space": "pre" }, ".whitespace-pre-line": { "white-space": "pre-line" }, ".whitespace-pre-wrap": { "white-space": "pre-wrap" }, ".whitespace-break-spaces": { "white-space": "break-spaces" } });
}, textWrap: ({ addUtilities: e }) => {
  e({ ".text-wrap": { "text-wrap": "wrap" }, ".text-nowrap": { "text-wrap": "nowrap" }, ".text-balance": { "text-wrap": "balance" }, ".text-pretty": { "text-wrap": "pretty" } });
}, wordBreak: ({ addUtilities: e }) => {
  e({ ".break-normal": { "overflow-wrap": "normal", "word-break": "normal" }, ".break-words": { "overflow-wrap": "break-word" }, ".break-all": { "word-break": "break-all" }, ".break-keep": { "word-break": "keep-all" } });
}, borderRadius: y("borderRadius", [["rounded", ["border-radius"]], [["rounded-s", ["border-start-start-radius", "border-end-start-radius"]], ["rounded-e", ["border-start-end-radius", "border-end-end-radius"]], ["rounded-t", ["border-top-left-radius", "border-top-right-radius"]], ["rounded-r", ["border-top-right-radius", "border-bottom-right-radius"]], ["rounded-b", ["border-bottom-right-radius", "border-bottom-left-radius"]], ["rounded-l", ["border-top-left-radius", "border-bottom-left-radius"]]], [["rounded-ss", ["border-start-start-radius"]], ["rounded-se", ["border-start-end-radius"]], ["rounded-ee", ["border-end-end-radius"]], ["rounded-es", ["border-end-start-radius"]], ["rounded-tl", ["border-top-left-radius"]], ["rounded-tr", ["border-top-right-radius"]], ["rounded-br", ["border-bottom-right-radius"]], ["rounded-bl", ["border-bottom-left-radius"]]]]), borderWidth: y("borderWidth", [["border", [["@defaults border-width", {}], "border-width"]], [["border-x", [["@defaults border-width", {}], "border-left-width", "border-right-width"]], ["border-y", [["@defaults border-width", {}], "border-top-width", "border-bottom-width"]]], [["border-s", [["@defaults border-width", {}], "border-inline-start-width"]], ["border-e", [["@defaults border-width", {}], "border-inline-end-width"]], ["border-t", [["@defaults border-width", {}], "border-top-width"]], ["border-r", [["@defaults border-width", {}], "border-right-width"]], ["border-b", [["@defaults border-width", {}], "border-bottom-width"]], ["border-l", [["@defaults border-width", {}], "border-left-width"]]]], { type: ["line-width", "length"] }), borderStyle: ({ addUtilities: e }) => {
  e({ ".border-solid": { "border-style": "solid" }, ".border-dashed": { "border-style": "dashed" }, ".border-dotted": { "border-style": "dotted" }, ".border-double": { "border-style": "double" }, ".border-hidden": { "border-style": "hidden" }, ".border-none": { "border-style": "none" } });
}, borderColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
  e({ border: (a) => r("borderOpacity") ? M({ color: a, property: "border-color", variable: "--tw-border-opacity" }) : { "border-color": S(a) } }, { values: (({ DEFAULT: a, ...n }) => n)(R(t("borderColor"))), type: ["color", "any"] }), e({ "border-x": (a) => r("borderOpacity") ? M({ color: a, property: ["border-left-color", "border-right-color"], variable: "--tw-border-opacity" }) : { "border-left-color": S(a), "border-right-color": S(a) }, "border-y": (a) => r("borderOpacity") ? M({ color: a, property: ["border-top-color", "border-bottom-color"], variable: "--tw-border-opacity" }) : { "border-top-color": S(a), "border-bottom-color": S(a) } }, { values: (({ DEFAULT: a, ...n }) => n)(R(t("borderColor"))), type: ["color", "any"] }), e({ "border-s": (a) => r("borderOpacity") ? M({ color: a, property: "border-inline-start-color", variable: "--tw-border-opacity" }) : { "border-inline-start-color": S(a) }, "border-e": (a) => r("borderOpacity") ? M({ color: a, property: "border-inline-end-color", variable: "--tw-border-opacity" }) : { "border-inline-end-color": S(a) }, "border-t": (a) => r("borderOpacity") ? M({ color: a, property: "border-top-color", variable: "--tw-border-opacity" }) : { "border-top-color": S(a) }, "border-r": (a) => r("borderOpacity") ? M({ color: a, property: "border-right-color", variable: "--tw-border-opacity" }) : { "border-right-color": S(a) }, "border-b": (a) => r("borderOpacity") ? M({ color: a, property: "border-bottom-color", variable: "--tw-border-opacity" }) : { "border-bottom-color": S(a) }, "border-l": (a) => r("borderOpacity") ? M({ color: a, property: "border-left-color", variable: "--tw-border-opacity" }) : { "border-left-color": S(a) } }, { values: (({ DEFAULT: a, ...n }) => n)(R(t("borderColor"))), type: ["color", "any"] });
}, borderOpacity: y("borderOpacity", [["border-opacity", ["--tw-border-opacity"]]]), backgroundColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
  e({ bg: (a) => r("backgroundOpacity") ? M({ color: a, property: "background-color", variable: "--tw-bg-opacity" }) : { "background-color": S(a) } }, { values: R(t("backgroundColor")), type: ["color", "any"] });
}, backgroundOpacity: y("backgroundOpacity", [["bg-opacity", ["--tw-bg-opacity"]]]), backgroundImage: y("backgroundImage", [["bg", ["background-image"]]], { type: ["lookup", "image", "url"] }), gradientColorStops: /* @__PURE__ */ (() => {
  function e(t) {
    return de(t, 0, "rgb(255 255 255 / 0)");
  }
  return function({ matchUtilities: t, theme: r, addDefaults: a }) {
    a("gradient-color-stops", { "--tw-gradient-from-position": " ", "--tw-gradient-via-position": " ", "--tw-gradient-to-position": " " });
    let n = { values: R(r("gradientColorStops")), type: ["color", "any"] }, i = { values: r("gradientColorStopPositions"), type: ["length", "percentage"] };
    t({ from: (o) => {
      let l = e(o);
      return { "@defaults gradient-color-stops": {}, "--tw-gradient-from": `${S(o)} var(--tw-gradient-from-position)`, "--tw-gradient-to": `${l} var(--tw-gradient-to-position)`, "--tw-gradient-stops": "var(--tw-gradient-from), var(--tw-gradient-to)" };
    } }, n), t({ from: (o) => ({ "--tw-gradient-from-position": o }) }, i), t({ via: (o) => {
      let l = e(o);
      return { "@defaults gradient-color-stops": {}, "--tw-gradient-to": `${l}  var(--tw-gradient-to-position)`, "--tw-gradient-stops": `var(--tw-gradient-from), ${S(o)} var(--tw-gradient-via-position), var(--tw-gradient-to)` };
    } }, n), t({ via: (o) => ({ "--tw-gradient-via-position": o }) }, i), t({ to: (o) => ({ "@defaults gradient-color-stops": {}, "--tw-gradient-to": `${S(o)} var(--tw-gradient-to-position)` }) }, n), t({ to: (o) => ({ "--tw-gradient-to-position": o }) }, i);
  };
})(), boxDecorationBreak: ({ addUtilities: e }) => {
  e({ ".decoration-slice": { "box-decoration-break": "slice" }, ".decoration-clone": { "box-decoration-break": "clone" }, ".box-decoration-slice": { "box-decoration-break": "slice" }, ".box-decoration-clone": { "box-decoration-break": "clone" } });
}, backgroundSize: y("backgroundSize", [["bg", ["background-size"]]], { type: ["lookup", "length", "percentage", "size"] }), backgroundAttachment: ({ addUtilities: e }) => {
  e({ ".bg-fixed": { "background-attachment": "fixed" }, ".bg-local": { "background-attachment": "local" }, ".bg-scroll": { "background-attachment": "scroll" } });
}, backgroundClip: ({ addUtilities: e }) => {
  e({ ".bg-clip-border": { "background-clip": "border-box" }, ".bg-clip-padding": { "background-clip": "padding-box" }, ".bg-clip-content": { "background-clip": "content-box" }, ".bg-clip-text": { "background-clip": "text" } });
}, backgroundPosition: y("backgroundPosition", [["bg", ["background-position"]]], { type: ["lookup", ["position", { preferOnConflict: true }]] }), backgroundRepeat: ({ addUtilities: e }) => {
  e({ ".bg-repeat": { "background-repeat": "repeat" }, ".bg-no-repeat": { "background-repeat": "no-repeat" }, ".bg-repeat-x": { "background-repeat": "repeat-x" }, ".bg-repeat-y": { "background-repeat": "repeat-y" }, ".bg-repeat-round": { "background-repeat": "round" }, ".bg-repeat-space": { "background-repeat": "space" } });
}, backgroundOrigin: ({ addUtilities: e }) => {
  e({ ".bg-origin-border": { "background-origin": "border-box" }, ".bg-origin-padding": { "background-origin": "padding-box" }, ".bg-origin-content": { "background-origin": "content-box" } });
}, fill: ({ matchUtilities: e, theme: t }) => {
  e({ fill: (r) => ({ fill: S(r) }) }, { values: R(t("fill")), type: ["color", "any"] });
}, stroke: ({ matchUtilities: e, theme: t }) => {
  e({ stroke: (r) => ({ stroke: S(r) }) }, { values: R(t("stroke")), type: ["color", "url", "any"] });
}, strokeWidth: y("strokeWidth", [["stroke", ["stroke-width"]]], { type: ["length", "number", "percentage"] }), objectFit: ({ addUtilities: e }) => {
  e({ ".object-contain": { "object-fit": "contain" }, ".object-cover": { "object-fit": "cover" }, ".object-fill": { "object-fit": "fill" }, ".object-none": { "object-fit": "none" }, ".object-scale-down": { "object-fit": "scale-down" } });
}, objectPosition: y("objectPosition", [["object", ["object-position"]]]), padding: y("padding", [["p", ["padding"]], [["px", ["padding-left", "padding-right"]], ["py", ["padding-top", "padding-bottom"]]], [["ps", ["padding-inline-start"]], ["pe", ["padding-inline-end"]], ["pt", ["padding-top"]], ["pr", ["padding-right"]], ["pb", ["padding-bottom"]], ["pl", ["padding-left"]]]]), textAlign: ({ addUtilities: e }) => {
  e({ ".text-left": { "text-align": "left" }, ".text-center": { "text-align": "center" }, ".text-right": { "text-align": "right" }, ".text-justify": { "text-align": "justify" }, ".text-start": { "text-align": "start" }, ".text-end": { "text-align": "end" } });
}, textIndent: y("textIndent", [["indent", ["text-indent"]]], { supportsNegativeValues: true }), verticalAlign: ({ addUtilities: e, matchUtilities: t }) => {
  e({ ".align-baseline": { "vertical-align": "baseline" }, ".align-top": { "vertical-align": "top" }, ".align-middle": { "vertical-align": "middle" }, ".align-bottom": { "vertical-align": "bottom" }, ".align-text-top": { "vertical-align": "text-top" }, ".align-text-bottom": { "vertical-align": "text-bottom" }, ".align-sub": { "vertical-align": "sub" }, ".align-super": { "vertical-align": "super" } }), t({ align: (r) => ({ "vertical-align": r }) });
}, fontFamily: ({ matchUtilities: e, theme: t }) => {
  e({ font: (r) => {
    let [a, n = {}] = Array.isArray(r) && Z(r[1]) ? r : [r], { fontFeatureSettings: i, fontVariationSettings: o } = n;
    return { "font-family": Array.isArray(a) ? a.join(", ") : a, ...i === void 0 ? {} : { "font-feature-settings": i }, ...o === void 0 ? {} : { "font-variation-settings": o } };
  } }, { values: t("fontFamily"), type: ["lookup", "generic-name", "family-name"] });
}, fontSize: ({ matchUtilities: e, theme: t }) => {
  e({ text: (r, { modifier: a }) => {
    let [n, i] = Array.isArray(r) ? r : [r];
    if (a) return { "font-size": n, "line-height": a };
    let { lineHeight: o, letterSpacing: l, fontWeight: p } = Z(i) ? i : { lineHeight: i };
    return { "font-size": n, ...o === void 0 ? {} : { "line-height": o }, ...l === void 0 ? {} : { "letter-spacing": l }, ...p === void 0 ? {} : { "font-weight": p } };
  } }, { values: t("fontSize"), modifiers: t("lineHeight"), type: ["absolute-size", "relative-size", "length", "percentage"] });
}, fontWeight: y("fontWeight", [["font", ["fontWeight"]]], { type: ["lookup", "number", "any"] }), textTransform: ({ addUtilities: e }) => {
  e({ ".uppercase": { "text-transform": "uppercase" }, ".lowercase": { "text-transform": "lowercase" }, ".capitalize": { "text-transform": "capitalize" }, ".normal-case": { "text-transform": "none" } });
}, fontStyle: ({ addUtilities: e }) => {
  e({ ".italic": { "font-style": "italic" }, ".not-italic": { "font-style": "normal" } });
}, fontVariantNumeric: ({ addDefaults: e, addUtilities: t }) => {
  let r = "var(--tw-ordinal) var(--tw-slashed-zero) var(--tw-numeric-figure) var(--tw-numeric-spacing) var(--tw-numeric-fraction)";
  e("font-variant-numeric", { "--tw-ordinal": " ", "--tw-slashed-zero": " ", "--tw-numeric-figure": " ", "--tw-numeric-spacing": " ", "--tw-numeric-fraction": " " }), t({ ".normal-nums": { "font-variant-numeric": "normal" }, ".ordinal": { "@defaults font-variant-numeric": {}, "--tw-ordinal": "ordinal", "font-variant-numeric": r }, ".slashed-zero": { "@defaults font-variant-numeric": {}, "--tw-slashed-zero": "slashed-zero", "font-variant-numeric": r }, ".lining-nums": { "@defaults font-variant-numeric": {}, "--tw-numeric-figure": "lining-nums", "font-variant-numeric": r }, ".oldstyle-nums": { "@defaults font-variant-numeric": {}, "--tw-numeric-figure": "oldstyle-nums", "font-variant-numeric": r }, ".proportional-nums": { "@defaults font-variant-numeric": {}, "--tw-numeric-spacing": "proportional-nums", "font-variant-numeric": r }, ".tabular-nums": { "@defaults font-variant-numeric": {}, "--tw-numeric-spacing": "tabular-nums", "font-variant-numeric": r }, ".diagonal-fractions": { "@defaults font-variant-numeric": {}, "--tw-numeric-fraction": "diagonal-fractions", "font-variant-numeric": r }, ".stacked-fractions": { "@defaults font-variant-numeric": {}, "--tw-numeric-fraction": "stacked-fractions", "font-variant-numeric": r } });
}, lineHeight: y("lineHeight", [["leading", ["lineHeight"]]]), letterSpacing: y("letterSpacing", [["tracking", ["letterSpacing"]]], { supportsNegativeValues: true }), textColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
  e({ text: (a) => r("textOpacity") ? M({ color: a, property: "color", variable: "--tw-text-opacity" }) : { color: S(a) } }, { values: R(t("textColor")), type: ["color", "any"] });
}, textOpacity: y("textOpacity", [["text-opacity", ["--tw-text-opacity"]]]), textDecoration: ({ addUtilities: e }) => {
  e({ ".underline": { "text-decoration-line": "underline" }, ".overline": { "text-decoration-line": "overline" }, ".line-through": { "text-decoration-line": "line-through" }, ".no-underline": { "text-decoration-line": "none" } });
}, textDecorationColor: ({ matchUtilities: e, theme: t }) => {
  e({ decoration: (r) => ({ "text-decoration-color": S(r) }) }, { values: R(t("textDecorationColor")), type: ["color", "any"] });
}, textDecorationStyle: ({ addUtilities: e }) => {
  e({ ".decoration-solid": { "text-decoration-style": "solid" }, ".decoration-double": { "text-decoration-style": "double" }, ".decoration-dotted": { "text-decoration-style": "dotted" }, ".decoration-dashed": { "text-decoration-style": "dashed" }, ".decoration-wavy": { "text-decoration-style": "wavy" } });
}, textDecorationThickness: y("textDecorationThickness", [["decoration", ["text-decoration-thickness"]]], { type: ["length", "percentage"] }), textUnderlineOffset: y("textUnderlineOffset", [["underline-offset", ["text-underline-offset"]]], { type: ["length", "percentage", "any"] }), fontSmoothing: ({ addUtilities: e }) => {
  e({ ".antialiased": { "-webkit-font-smoothing": "antialiased", "-moz-osx-font-smoothing": "grayscale" }, ".subpixel-antialiased": { "-webkit-font-smoothing": "auto", "-moz-osx-font-smoothing": "auto" } });
}, placeholderColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
  e({ placeholder: (a) => r("placeholderOpacity") ? { "&::placeholder": M({ color: a, property: "color", variable: "--tw-placeholder-opacity" }) } : { "&::placeholder": { color: S(a) } } }, { values: R(t("placeholderColor")), type: ["color", "any"] });
}, placeholderOpacity: ({ matchUtilities: e, theme: t }) => {
  e({ "placeholder-opacity": (r) => ({ "&::placeholder": { "--tw-placeholder-opacity": r } }) }, { values: t("placeholderOpacity") });
}, caretColor: ({ matchUtilities: e, theme: t }) => {
  e({ caret: (r) => ({ "caret-color": S(r) }) }, { values: R(t("caretColor")), type: ["color", "any"] });
}, accentColor: ({ matchUtilities: e, theme: t }) => {
  e({ accent: (r) => ({ "accent-color": S(r) }) }, { values: R(t("accentColor")), type: ["color", "any"] });
}, opacity: y("opacity", [["opacity", ["opacity"]]]), backgroundBlendMode: ({ addUtilities: e }) => {
  e({ ".bg-blend-normal": { "background-blend-mode": "normal" }, ".bg-blend-multiply": { "background-blend-mode": "multiply" }, ".bg-blend-screen": { "background-blend-mode": "screen" }, ".bg-blend-overlay": { "background-blend-mode": "overlay" }, ".bg-blend-darken": { "background-blend-mode": "darken" }, ".bg-blend-lighten": { "background-blend-mode": "lighten" }, ".bg-blend-color-dodge": { "background-blend-mode": "color-dodge" }, ".bg-blend-color-burn": { "background-blend-mode": "color-burn" }, ".bg-blend-hard-light": { "background-blend-mode": "hard-light" }, ".bg-blend-soft-light": { "background-blend-mode": "soft-light" }, ".bg-blend-difference": { "background-blend-mode": "difference" }, ".bg-blend-exclusion": { "background-blend-mode": "exclusion" }, ".bg-blend-hue": { "background-blend-mode": "hue" }, ".bg-blend-saturation": { "background-blend-mode": "saturation" }, ".bg-blend-color": { "background-blend-mode": "color" }, ".bg-blend-luminosity": { "background-blend-mode": "luminosity" } });
}, mixBlendMode: ({ addUtilities: e }) => {
  e({ ".mix-blend-normal": { "mix-blend-mode": "normal" }, ".mix-blend-multiply": { "mix-blend-mode": "multiply" }, ".mix-blend-screen": { "mix-blend-mode": "screen" }, ".mix-blend-overlay": { "mix-blend-mode": "overlay" }, ".mix-blend-darken": { "mix-blend-mode": "darken" }, ".mix-blend-lighten": { "mix-blend-mode": "lighten" }, ".mix-blend-color-dodge": { "mix-blend-mode": "color-dodge" }, ".mix-blend-color-burn": { "mix-blend-mode": "color-burn" }, ".mix-blend-hard-light": { "mix-blend-mode": "hard-light" }, ".mix-blend-soft-light": { "mix-blend-mode": "soft-light" }, ".mix-blend-difference": { "mix-blend-mode": "difference" }, ".mix-blend-exclusion": { "mix-blend-mode": "exclusion" }, ".mix-blend-hue": { "mix-blend-mode": "hue" }, ".mix-blend-saturation": { "mix-blend-mode": "saturation" }, ".mix-blend-color": { "mix-blend-mode": "color" }, ".mix-blend-luminosity": { "mix-blend-mode": "luminosity" }, ".mix-blend-plus-darker": { "mix-blend-mode": "plus-darker" }, ".mix-blend-plus-lighter": { "mix-blend-mode": "plus-lighter" } });
}, boxShadow: (() => {
  let e = Oe("boxShadow"), t = ["var(--tw-ring-offset-shadow, 0 0 #0000)", "var(--tw-ring-shadow, 0 0 #0000)", "var(--tw-shadow)"].join(", ");
  return function({ matchUtilities: r, addDefaults: a, theme: n }) {
    a("box-shadow", { "--tw-ring-offset-shadow": "0 0 #0000", "--tw-ring-shadow": "0 0 #0000", "--tw-shadow": "0 0 #0000", "--tw-shadow-colored": "0 0 #0000" }), r({ shadow: (i) => {
      i = e(i);
      let o = st(i);
      for (let l of o) l.valid && (l.color = "var(--tw-shadow-color)");
      return { "@defaults box-shadow": {}, "--tw-shadow": i === "none" ? "0 0 #0000" : i, "--tw-shadow-colored": i === "none" ? "0 0 #0000" : It(o), "box-shadow": t };
    } }, { values: n("boxShadow"), type: ["shadow"] });
  };
})(), boxShadowColor: ({ matchUtilities: e, theme: t }) => {
  e({ shadow: (r) => ({ "--tw-shadow-color": S(r), "--tw-shadow": "var(--tw-shadow-colored)" }) }, { values: R(t("boxShadowColor")), type: ["color", "any"] });
}, outlineStyle: ({ addUtilities: e }) => {
  e({ ".outline-none": { outline: "2px solid transparent", "outline-offset": "2px" }, ".outline": { "outline-style": "solid" }, ".outline-dashed": { "outline-style": "dashed" }, ".outline-dotted": { "outline-style": "dotted" }, ".outline-double": { "outline-style": "double" } });
}, outlineWidth: y("outlineWidth", [["outline", ["outline-width"]]], { type: ["length", "number", "percentage"] }), outlineOffset: y("outlineOffset", [["outline-offset", ["outline-offset"]]], { type: ["length", "number", "percentage", "any"], supportsNegativeValues: true }), outlineColor: ({ matchUtilities: e, theme: t }) => {
  e({ outline: (r) => ({ "outline-color": S(r) }) }, { values: R(t("outlineColor")), type: ["color", "any"] });
}, ringWidth: ({ matchUtilities: e, addDefaults: t, addUtilities: r, theme: a, config: n }) => {
  let i = (() => {
    var _a, _b;
    if (Y(n(), "respectDefaultRingColorOpacity")) return a("ringColor.DEFAULT");
    let o = a("ringOpacity.DEFAULT", "0.5");
    return ((_a = a("ringColor")) == null ? void 0 : _a.DEFAULT) ? de((_b = a("ringColor")) == null ? void 0 : _b.DEFAULT, o, `rgb(147 197 253 / ${o})`) : `rgb(147 197 253 / ${o})`;
  })();
  t("ring-width", { "--tw-ring-inset": " ", "--tw-ring-offset-width": a("ringOffsetWidth.DEFAULT", "0px"), "--tw-ring-offset-color": a("ringOffsetColor.DEFAULT", "#fff"), "--tw-ring-color": i, "--tw-ring-offset-shadow": "0 0 #0000", "--tw-ring-shadow": "0 0 #0000", "--tw-shadow": "0 0 #0000", "--tw-shadow-colored": "0 0 #0000" }), e({ ring: (o) => ({ "@defaults ring-width": {}, "--tw-ring-offset-shadow": "var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color)", "--tw-ring-shadow": `var(--tw-ring-inset) 0 0 0 calc(${o} + var(--tw-ring-offset-width)) var(--tw-ring-color)`, "box-shadow": ["var(--tw-ring-offset-shadow)", "var(--tw-ring-shadow)", "var(--tw-shadow, 0 0 #0000)"].join(", ") }) }, { values: a("ringWidth"), type: "length" }), r({ ".ring-inset": { "@defaults ring-width": {}, "--tw-ring-inset": "inset" } });
}, ringColor: ({ matchUtilities: e, theme: t, corePlugins: r }) => {
  e({ ring: (a) => r("ringOpacity") ? M({ color: a, property: "--tw-ring-color", variable: "--tw-ring-opacity" }) : { "--tw-ring-color": S(a) } }, { values: Object.fromEntries(Object.entries(R(t("ringColor"))).filter(([a]) => a !== "DEFAULT")), type: ["color", "any"] });
}, ringOpacity: (e) => {
  let { config: t } = e;
  return y("ringOpacity", [["ring-opacity", ["--tw-ring-opacity"]]], { filterDefault: !Y(t(), "respectDefaultRingColorOpacity") })(e);
}, ringOffsetWidth: y("ringOffsetWidth", [["ring-offset", ["--tw-ring-offset-width"]]], { type: "length" }), ringOffsetColor: ({ matchUtilities: e, theme: t }) => {
  e({ "ring-offset": (r) => ({ "--tw-ring-offset-color": S(r) }) }, { values: R(t("ringOffsetColor")), type: ["color", "any"] });
}, blur: ({ matchUtilities: e, theme: t }) => {
  e({ blur: (r) => ({ "--tw-blur": r.trim() === "" ? " " : `blur(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("blur") });
}, brightness: ({ matchUtilities: e, theme: t }) => {
  e({ brightness: (r) => ({ "--tw-brightness": `brightness(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("brightness") });
}, contrast: ({ matchUtilities: e, theme: t }) => {
  e({ contrast: (r) => ({ "--tw-contrast": `contrast(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("contrast") });
}, dropShadow: ({ matchUtilities: e, theme: t }) => {
  e({ "drop-shadow": (r) => ({ "--tw-drop-shadow": Array.isArray(r) ? r.map((a) => `drop-shadow(${a})`).join(" ") : `drop-shadow(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("dropShadow") });
}, grayscale: ({ matchUtilities: e, theme: t }) => {
  e({ grayscale: (r) => ({ "--tw-grayscale": `grayscale(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("grayscale") });
}, hueRotate: ({ matchUtilities: e, theme: t }) => {
  e({ "hue-rotate": (r) => ({ "--tw-hue-rotate": `hue-rotate(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("hueRotate"), supportsNegativeValues: true });
}, invert: ({ matchUtilities: e, theme: t }) => {
  e({ invert: (r) => ({ "--tw-invert": `invert(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("invert") });
}, saturate: ({ matchUtilities: e, theme: t }) => {
  e({ saturate: (r) => ({ "--tw-saturate": `saturate(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("saturate") });
}, sepia: ({ matchUtilities: e, theme: t }) => {
  e({ sepia: (r) => ({ "--tw-sepia": `sepia(${r})`, "@defaults filter": {}, filter: B }) }, { values: t("sepia") });
}, filter: ({ addDefaults: e, addUtilities: t }) => {
  e("filter", { "--tw-blur": " ", "--tw-brightness": " ", "--tw-contrast": " ", "--tw-grayscale": " ", "--tw-hue-rotate": " ", "--tw-invert": " ", "--tw-saturate": " ", "--tw-sepia": " ", "--tw-drop-shadow": " " }), t({ ".filter": { "@defaults filter": {}, filter: B }, ".filter-none": { filter: "none" } });
}, backdropBlur: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-blur": (r) => ({ "--tw-backdrop-blur": r.trim() === "" ? " " : `blur(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropBlur") });
}, backdropBrightness: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-brightness": (r) => ({ "--tw-backdrop-brightness": `brightness(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropBrightness") });
}, backdropContrast: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-contrast": (r) => ({ "--tw-backdrop-contrast": `contrast(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropContrast") });
}, backdropGrayscale: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-grayscale": (r) => ({ "--tw-backdrop-grayscale": `grayscale(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropGrayscale") });
}, backdropHueRotate: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-hue-rotate": (r) => ({ "--tw-backdrop-hue-rotate": `hue-rotate(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropHueRotate"), supportsNegativeValues: true });
}, backdropInvert: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-invert": (r) => ({ "--tw-backdrop-invert": `invert(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropInvert") });
}, backdropOpacity: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-opacity": (r) => ({ "--tw-backdrop-opacity": `opacity(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropOpacity") });
}, backdropSaturate: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-saturate": (r) => ({ "--tw-backdrop-saturate": `saturate(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropSaturate") });
}, backdropSepia: ({ matchUtilities: e, theme: t }) => {
  e({ "backdrop-sepia": (r) => ({ "--tw-backdrop-sepia": `sepia(${r})`, "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }) }, { values: t("backdropSepia") });
}, backdropFilter: ({ addDefaults: e, addUtilities: t }) => {
  e("backdrop-filter", { "--tw-backdrop-blur": " ", "--tw-backdrop-brightness": " ", "--tw-backdrop-contrast": " ", "--tw-backdrop-grayscale": " ", "--tw-backdrop-hue-rotate": " ", "--tw-backdrop-invert": " ", "--tw-backdrop-opacity": " ", "--tw-backdrop-saturate": " ", "--tw-backdrop-sepia": " " }), t({ ".backdrop-filter": { "@defaults backdrop-filter": {}, "-webkit-backdrop-filter": O, "backdrop-filter": O }, ".backdrop-filter-none": { "-webkit-backdrop-filter": "none", "backdrop-filter": "none" } });
}, transitionProperty: ({ matchUtilities: e, theme: t }) => {
  let r = t("transitionTimingFunction.DEFAULT"), a = t("transitionDuration.DEFAULT");
  e({ transition: (n) => ({ "transition-property": n, ...n === "none" ? {} : { "transition-timing-function": r, "transition-duration": a } }) }, { values: t("transitionProperty") });
}, transitionDelay: y("transitionDelay", [["delay", ["transitionDelay"]]]), transitionDuration: y("transitionDuration", [["duration", ["transitionDuration"]]], { filterDefault: true }), transitionTimingFunction: y("transitionTimingFunction", [["ease", ["transitionTimingFunction"]]], { filterDefault: true }), willChange: y("willChange", [["will-change", ["will-change"]]]), contain: ({ addDefaults: e, addUtilities: t }) => {
  let r = "var(--tw-contain-size) var(--tw-contain-layout) var(--tw-contain-paint) var(--tw-contain-style)";
  e("contain", { "--tw-contain-size": " ", "--tw-contain-layout": " ", "--tw-contain-paint": " ", "--tw-contain-style": " " }), t({ ".contain-none": { contain: "none" }, ".contain-content": { contain: "content" }, ".contain-strict": { contain: "strict" }, ".contain-size": { "@defaults contain": {}, "--tw-contain-size": "size", contain: r }, ".contain-inline-size": { "@defaults contain": {}, "--tw-contain-size": "inline-size", contain: r }, ".contain-layout": { "@defaults contain": {}, "--tw-contain-layout": "layout", contain: r }, ".contain-paint": { "@defaults contain": {}, "--tw-contain-paint": "paint", contain: r }, ".contain-style": { "@defaults contain": {}, "--tw-contain-style": "style", contain: r } });
}, content: y("content", [["content", ["--tw-content", ["content", "var(--tw-content)"]]]]), forcedColorAdjust: ({ addUtilities: e }) => {
  e({ ".forced-color-adjust-auto": { "forced-color-adjust": "auto" }, ".forced-color-adjust-none": { "forced-color-adjust": "none" } });
} };
typeof le < "u" && Cr(le.env.DEBUG);
var ee = new String("*"), ve = Symbol("__NONE__");
function Cr(e) {
  if (e === void 0) return false;
  if (e === "true" || e === "1") return true;
  if (e === "false" || e === "0") return false;
  if (e === "*") return true;
  let t = e.split(",").map((r) => r.split(":")[0]);
  return t.includes("-tailwindcss") ? false : !!t.includes("tailwindcss");
}
function Sr(e) {
  if (Array.isArray(e)) return e;
  let t = e.split("[").length - 1, r = e.split("]").length - 1;
  if (t !== r) throw new Error(`Path is invalid. Has unbalanced brackets: ${e}`);
  return e.split(/\.(?![^\[]*\])|[\[\]]/g).filter(Boolean);
}
var gt = /* @__PURE__ */ new Map([["{", "}"], ["[", "]"], ["(", ")"]]), Ze = new Map(Array.from(gt.entries()).map(([e, t]) => [t, e])), Ur = /* @__PURE__ */ new Set(['"', "'", "`"]);
function xe(e) {
  let t = [], r = false;
  for (let a = 0; a < e.length; a++) {
    let n = e[a];
    if (n === ":" && !r && t.length === 0) return false;
    if (Ur.has(n) && e[a - 1] !== "\\" && (r = !r), !r && e[a - 1] !== "\\") {
      if (gt.has(n)) t.push(n);
      else if (Ze.has(n)) {
        let i = Ze.get(n);
        if (t.length <= 0 || t.pop() !== i) return false;
      }
    }
  }
  return !(t.length > 0);
}
var ke = { "::after": ["terminal", "jumpable"], "::backdrop": ["terminal", "jumpable"], "::before": ["terminal", "jumpable"], "::cue": ["terminal"], "::cue-region": ["terminal"], "::first-letter": ["terminal", "jumpable"], "::first-line": ["terminal", "jumpable"], "::grammar-error": ["terminal"], "::marker": ["terminal", "jumpable"], "::part": ["terminal", "actionable"], "::placeholder": ["terminal", "jumpable"], "::selection": ["terminal", "jumpable"], "::slotted": ["terminal"], "::spelling-error": ["terminal"], "::target-text": ["terminal"], "::file-selector-button": ["terminal", "actionable"], "::deep": ["actionable"], "::v-deep": ["actionable"], "::ng-deep": ["actionable"], ":after": ["terminal", "jumpable"], ":before": ["terminal", "jumpable"], ":first-letter": ["terminal", "jumpable"], ":first-line": ["terminal", "jumpable"], ":where": [], ":is": [], ":has": [], __default__: ["terminal", "actionable"] };
function bt(e) {
  let [t] = yt(e);
  return t.forEach(([r, a]) => r.removeChild(a)), e.nodes.push(...t.map(([, r]) => r)), e;
}
function yt(e) {
  let t = [], r = null;
  for (let a of e.nodes) if (a.type === "combinator") t = t.filter(([, n]) => Pe(n).includes("jumpable")), r = null;
  else if (a.type === "pseudo") {
    Ar(a) ? (r = a, t.push([e, a, null])) : r && Or(a, r) ? t.push([e, a, r]) : r = null;
    for (let n of a.nodes ?? []) {
      let [i, o] = yt(n);
      r = o || r, t.push(...i);
    }
  }
  return [t, r];
}
function wt(e) {
  return e.value.startsWith("::") || ke[e.value] !== void 0;
}
function Ar(e) {
  return wt(e) && Pe(e).includes("terminal");
}
function Or(e, t) {
  return e.type !== "pseudo" || wt(e) ? false : Pe(t).includes("actionable");
}
function Pe(e) {
  return ke[e.value] ?? ke.__default__;
}
var $e = ":merge";
function ce(e, { context: t, candidate: r }) {
  let a = (t == null ? void 0 : t.tailwindConfig.prefix) ?? "", n = e.map((o) => {
    let l = j().astSync(o.format);
    return { ...o, ast: o.respectPrefix ? Re(a, l) : l };
  }), i = j.root({ nodes: [j.selector({ nodes: [j.className({ value: K(r) })] })] });
  for (let { ast: o } of n) [i, o] = Rr(i, o), o.walkNesting((l) => l.replaceWith(...i.nodes[0].nodes)), i = o;
  return i;
}
function et(e) {
  let t = [];
  for (; e.prev() && e.prev().type !== "combinator"; ) e = e.prev();
  for (; e && e.type !== "combinator"; ) t.push(e), e = e.next();
  return t;
}
function jr(e) {
  return e.sort((t, r) => t.type === "tag" && r.type === "class" ? -1 : t.type === "class" && r.type === "tag" ? 1 : t.type === "class" && r.type === "pseudo" && r.value.startsWith("::") ? -1 : t.type === "pseudo" && t.value.startsWith("::") && r.type === "class" ? 1 : e.index(t) - e.index(r)), e;
}
function vt(e, t) {
  let r = false;
  e.walk((a) => {
    if (a.type === "class" && a.value === t) return r = true, false;
  }), r || e.remove();
}
function xt(e, t, { context: r, candidate: a, base: n }) {
  var _a;
  let i = ((_a = r == null ? void 0 : r.tailwindConfig) == null ? void 0 : _a.separator) ?? ":";
  n = n ?? L(a, i).pop();
  let o = j().astSync(e);
  if (o.walkClasses((u) => {
    u.raws && u.value.includes(n) && (u.raws.value = K(At(u.raws.value)));
  }), o.each((u) => vt(u, n)), o.length === 0) return null;
  let l = Array.isArray(t) ? ce(t, { context: r, candidate: a }) : t;
  if (l === null) return o.toString();
  let p = j.comment({ value: "/*__simple__*/" }), b = j.comment({ value: "/*__simple__*/" });
  return o.walkClasses((u) => {
    if (u.value !== n) return;
    let w = u.parent, s = l.nodes[0].nodes;
    if (w.nodes.length === 1) {
      u.replaceWith(...s);
      return;
    }
    let d = et(u);
    w.insertBefore(d[0], p), w.insertAfter(d[d.length - 1], b);
    for (let m of s) w.insertBefore(d[0], m.clone());
    u.remove(), d = et(p);
    let g = w.index(p);
    w.nodes.splice(g, d.length, ...jr(j.selector({ nodes: d })).nodes), p.remove(), b.remove();
  }), o.walkPseudos((u) => {
    u.value === $e && u.replaceWith(u.nodes);
  }), o.each((u) => bt(u)), o.toString();
}
function Rr(e, t) {
  let r = [];
  return e.walkPseudos((a) => {
    a.value === $e && r.push({ pseudo: a, value: a.nodes[0].toString() });
  }), t.walkPseudos((a) => {
    if (a.value !== $e) return;
    let n = a.nodes[0].toString(), i = r.find((b) => b.value === n);
    if (!i) return;
    let o = [], l = a.next();
    for (; l && l.type !== "combinator"; ) o.push(l), l = l.next();
    let p = l;
    i.pseudo.parent.insertAfter(i.pseudo, j.selector({ nodes: o.map((b) => b.clone()) })), a.remove(), o.forEach((b) => b.remove()), p && p.type === "combinator" && p.remove();
  }), [e, t];
}
function Vr(e, t) {
  let r = j().astSync(e);
  return r.each((a) => {
    a.nodes.some((n) => n.type === "combinator") && (a.nodes = [j.pseudo({ value: ":is", nodes: [a.clone()] })]), bt(a);
  }), `${t} ${r.toString()}`;
}
var Mr = j((e) => e.first.filter(({ type: t }) => t === "class").pop().value);
function kt(e) {
  return Mr.transformSync(e);
}
function* Dr(e) {
  let t = 1 / 0;
  for (; t >= 0; ) {
    let r, a = false;
    if (t === 1 / 0 && e.endsWith("]")) {
      let o = e.indexOf("[");
      e[o - 1] === "-" ? r = o - 1 : e[o - 1] === "/" ? (r = o - 1, a = true) : r = -1;
    } else t === 1 / 0 && e.includes("/") ? (r = e.lastIndexOf("/"), a = true) : r = e.lastIndexOf("-", t);
    if (r < 0) break;
    let n = e.slice(0, r), i = e.slice(a ? r : r + 1);
    t = r - 1, !(n === "" || i === "/") && (yield [n, i]);
  }
}
function zr(e, t) {
  if (e.length === 0 || t.tailwindConfig.prefix === "") return e;
  for (let r of e) {
    let [a] = r;
    if (a.options.respectPrefix) {
      let n = V.root({ nodes: [r[1].clone()] }), i = r[1].raws.tailwind.classCandidate;
      n.walkRules((o) => {
        let l = i.startsWith("-");
        o.selector = Re(t.tailwindConfig.prefix, o.selector, l);
      }), r[1] = n.nodes[0];
    }
  }
  return e;
}
function Er(e, t) {
  if (e.length === 0) return e;
  let r = [];
  function a(n) {
    return n.parent && n.parent.type === "atrule" && n.parent.name === "keyframes";
  }
  for (let [n, i] of e) {
    let o = V.root({ nodes: [i.clone()] });
    o.walkRules((l) => {
      if (a(l)) return;
      let p = j().astSync(l.selector);
      p.each((b) => vt(b, t)), or(p, (b) => b === t ? `!${b}` : b), l.selector = p.toString(), l.walkDecls((b) => b.important = true);
    }), r.push([{ ...n, important: true }, o.nodes[0]]);
  }
  return r;
}
function Tr(e, t, r) {
  var _a;
  if (t.length === 0) return t;
  let a = { modifier: null, value: ve };
  {
    let [n, ...i] = L(e, "/");
    if (i.length > 1 && (n = n + "/" + i.slice(0, -1).join("/"), i = i.slice(-1)), i.length && !r.variantMap.has(e) && (e = n, a.modifier = i[0], !Y(r.tailwindConfig, "generalizedModifiers"))) return [];
  }
  if (e.endsWith("]") && !e.startsWith("[")) {
    let n = /(.)(-?)\[(.*)\]/g.exec(e);
    if (n) {
      let [, i, o, l] = n;
      if (i === "@" && o === "-") return [];
      if (i !== "@" && o === "") return [];
      e = e.replace(`${o}[${l}]`, ""), a.value = l;
    }
  }
  if (Se(e) && !r.variantMap.has(e)) {
    let n = r.offsets.recordVariant(e), i = C(e.slice(1, -1)), o = L(i, ",");
    if (o.length > 1) return [];
    if (!o.every(Ae)) return [];
    let l = o.map((p, b) => [r.offsets.applyParallelOffset(n, b), oe(p.trim())]);
    r.variantMap.set(e, l);
  }
  if (r.variantMap.has(e)) {
    let n = Se(e), i = ((_a = r.variantOptions.get(e)) == null ? void 0 : _a[J]) ?? {}, o = r.variantMap.get(e).slice(), l = [], p = !(n || i.respectPrefix === false);
    for (let [b, u] of t) {
      if (b.layer === "user") continue;
      let w = V.root({ nodes: [u.clone()] });
      for (let [s, d, g] of o) {
        let m = function() {
          c.raws.neededBackup || (c.raws.neededBackup = true, c.walkRules((k) => k.raws.originalSelector = k.selector));
        }, f = function(k) {
          return m(), c.each((x) => {
            x.type === "rule" && (x.selectors = x.selectors.map((U) => k({ get className() {
              return kt(U);
            }, selector: U })));
          }), c;
        }, c = (g ?? w).clone(), h = [], v = d({ get container() {
          return m(), c;
        }, separator: r.tailwindConfig.separator, modifySelectors: f, wrap(k) {
          let x = c.nodes;
          c.removeAll(), k.append(x), c.append(k);
        }, format(k) {
          h.push({ format: k, respectPrefix: p });
        }, args: a });
        if (Array.isArray(v)) {
          for (let [k, x] of v.entries()) o.push([r.offsets.applyParallelOffset(s, k), x, c.clone()]);
          continue;
        }
        if (typeof v == "string" && h.push({ format: v, respectPrefix: p }), v === null) continue;
        c.raws.neededBackup && (delete c.raws.neededBackup, c.walkRules((k) => {
          let x = k.raws.originalSelector;
          if (!x || (delete k.raws.originalSelector, x === k.selector)) return;
          let U = k.selector, I = j((X) => {
            X.walkClasses((_) => {
              _.value = `${e}${r.tailwindConfig.separator}${_.value}`;
            });
          }).processSync(x);
          h.push({ format: U.replace(I, "&"), respectPrefix: p }), k.selector = x;
        })), c.nodes[0].raws.tailwind = { ...c.nodes[0].raws.tailwind, parentLayer: b.layer };
        let $ = [{ ...b, sort: r.offsets.applyVariantOffset(b.sort, s, Object.assign(a, r.variantOptions.get(e))), collectedFormats: (b.collectedFormats ?? []).concat(h) }, c.nodes[0]];
        l.push($);
      }
    }
    return l;
  }
  return [];
}
function Ce(e, t, r = {}) {
  return !Z(e) && !Array.isArray(e) ? [[e], r] : Array.isArray(e) ? Ce(e[0], t, e[1]) : (t.has(e) || t.set(e, je(e)), [t.get(e), r]);
}
var Ir = /^[a-z_-]/;
function Pr(e) {
  return Ir.test(e);
}
function Fr(e) {
  if (!e.includes("://")) return false;
  try {
    let t = new URL(e);
    return t.scheme !== "" && t.host !== "";
  } catch {
    return false;
  }
}
function tt(e) {
  let t = true;
  return e.walkDecls((r) => {
    if (!$t(r.prop, r.value)) return t = false, false;
  }), t;
}
function $t(e, t) {
  if (Fr(`${e}:${t}`)) return false;
  try {
    return V.parse(`a{${e}:${t}}`).toResult(), true;
  } catch {
    return false;
  }
}
function Wr(e, t) {
  let [, r, a] = e.match(/^\[([a-zA-Z0-9-_]+):(\S+)\]$/) ?? [];
  if (a === void 0 || !Pr(r) || !xe(a)) return null;
  let n = C(a, { property: r });
  return $t(r, n) ? [[{ sort: t.offsets.arbitraryProperty(e), layer: "utilities", options: { respectImportant: true } }, () => ({ [it(e)]: { [r]: n } })]] : null;
}
function* Lr(e, t) {
  t.candidateRuleMap.has(e) && (yield [t.candidateRuleMap.get(e), "DEFAULT"]), yield* function* (l) {
    l !== null && (yield [l, "DEFAULT"]);
  }(Wr(e, t));
  let r = e, a = false, n = t.tailwindConfig.prefix, i = n.length, o = r.startsWith(n) || r.startsWith(`-${n}`);
  r[i] === "-" && o && (a = true, r = n + r.slice(i + 1)), a && t.candidateRuleMap.has(r) && (yield [t.candidateRuleMap.get(r), "-DEFAULT"]);
  for (let [l, p] of Dr(r)) t.candidateRuleMap.has(l) && (yield [t.candidateRuleMap.get(l), a ? `-${p}` : p]);
}
function Nr(e, t) {
  return e === ee ? [ee] : L(e, t);
}
function* Br(e, t) {
  var _a;
  for (let r of e) r[1].raws.tailwind = { ...r[1].raws.tailwind, classCandidate: t, preserveSource: ((_a = r[0].options) == null ? void 0 : _a.preserveSource) ?? false }, yield r;
}
function* _r(e, t) {
  var _a;
  let r = t.tailwindConfig.separator, [a, ...n] = Nr(e, r).reverse(), i = false;
  a.startsWith("!") && (i = true, a = a.slice(1));
  for (let o of Lr(a, t)) {
    let l = [], p = /* @__PURE__ */ new Map(), [b, u] = o, w = b.length === 1;
    for (let [s, d] of b) {
      let g = [];
      if (typeof d == "function") for (let m of [].concat(d(u, { isOnlyPlugin: w }))) {
        let [f, c] = Ce(m, t.postCssNodeCache);
        for (let h of f) g.push([{ ...s, options: { ...s.options, ...c } }, h]);
      }
      else if (u === "DEFAULT" || u === "-DEFAULT") {
        let m = d, [f, c] = Ce(m, t.postCssNodeCache);
        for (let h of f) g.push([{ ...s, options: { ...s.options, ...c } }, h]);
      }
      if (g.length > 0) {
        let m = Array.from(mt(((_a = s.options) == null ? void 0 : _a.types) ?? [], u, s.options ?? {}, t.tailwindConfig)).map(([f, c]) => c);
        m.length > 0 && p.set(g, m), l.push(g);
      }
    }
    if (Se(u)) {
      if (l.length > 1) {
        let s = function(f) {
          return f.length === 1 ? f[0] : f.find((c) => {
            let h = p.get(c);
            return c.some(([{ options: v }, $]) => tt($) ? v.types.some(({ type: k, preferOnConflict: x }) => h.includes(k) && x) : false);
          });
        }, [d, g] = l.reduce((f, c) => (c.some(([{ options: h }]) => h.types.some(({ type: v }) => v === "any")) ? f[0].push(c) : f[1].push(c), f), [[], []]), m = s(g) ?? s(d);
        if (m) l = [m];
        else {
          let f = l.map((h) => /* @__PURE__ */ new Set([...p.get(h) ?? []]));
          for (let h of f) for (let v of h) {
            let $ = false;
            for (let k of f) h !== k && k.has(v) && (k.delete(v), $ = true);
            $ && h.delete(v);
          }
          let c = [];
          for (let [h, v] of f.entries()) for (let $ of v) {
            let k = l[h].map(([, x]) => x).flat().map((x) => x.toString().split(`
`).slice(1, -1).map((U) => U.trim()).map((U) => `      ${U}`).join(`
`)).join(`

`);
            c.push(`  Use \`${e.replace("[", `[${$}:`)}\` for \`${k.trim()}\``);
            break;
          }
          T.warn([`The class \`${e}\` is ambiguous and matches multiple utilities.`, ...c, `If this is content and not a class, replace it with \`${e.replace("[", "&lsqb;").replace("]", "&rsqb;")}\` to silence this warning.`]);
          continue;
        }
      }
      l = l.map((s) => s.filter((d) => tt(d[1])));
    }
    l = l.flat(), l = Array.from(Br(l, a)), l = zr(l, t), i && (l = Er(l, a));
    for (let s of n) l = Tr(s, l, t);
    for (let s of l) s[1].raws.tailwind = { ...s[1].raws.tailwind, candidate: e }, s = qr(s, { context: t, candidate: e }), s !== null && (yield s);
  }
}
function qr(e, { context: t, candidate: r }) {
  if (!e[0].collectedFormats) return e;
  let a = true, n;
  try {
    n = ce(e[0].collectedFormats, { context: t, candidate: r });
  } catch {
    return null;
  }
  let i = V.root({ nodes: [e[1].clone()] });
  return i.walkRules((o) => {
    if (!ie(o)) try {
      let l = xt(o.selector, n, { candidate: r, context: t });
      if (l === null) {
        o.remove();
        return;
      }
      o.selector = l;
    } catch {
      return a = false, false;
    }
  }), !a || i.nodes.length === 0 ? null : (e[1] = i.nodes[0], e);
}
function ie(e) {
  return e.parent && e.parent.type === "atrule" && e.parent.name === "keyframes";
}
function Hr(e) {
  if (e === true) return (t) => {
    ie(t) || t.walkDecls((r) => {
      r.parent.type === "rule" && !ie(r.parent) && (r.important = true);
    });
  };
  if (typeof e == "string") return (t) => {
    ie(t) || (t.selectors = t.selectors.map((r) => Vr(r, e)));
  };
}
function Yr(e, t, r = false) {
  let a = [], n = Hr(t.tailwindConfig.important);
  for (let i of e) {
    if (t.notClassCache.has(i)) continue;
    if (t.candidateRuleCache.has(i)) {
      a = a.concat(Array.from(t.candidateRuleCache.get(i)));
      continue;
    }
    let o = Array.from(_r(i, t));
    if (o.length === 0) {
      t.notClassCache.add(i);
      continue;
    }
    t.classCache.set(i, o);
    let l = t.candidateRuleCache.get(i) ?? /* @__PURE__ */ new Set();
    t.candidateRuleCache.set(i, l);
    for (let p of o) {
      let [{ sort: b, options: u }, w] = p;
      if (u.respectImportant && n) {
        let d = V.root({ nodes: [w.clone()] });
        d.walkRules(n), w = d.nodes[0];
      }
      let s = [b, r ? w.clone() : w];
      l.add(s), t.ruleCache.add(s), a.push(s);
    }
  }
  return a;
}
function Se(e) {
  return e.startsWith("[") && e.endsWith("]");
}
function rt(e) {
  return (e > 0n) - (e < 0n);
}
function Gr(e, t) {
  let r = 0n, a = 0n;
  for (let [n, i] of t) e & n && (r = r | n, a = a | i);
  return e & ~r | a;
}
var Xr = class {
  constructor() {
    this.offsets = { defaults: 0n, base: 0n, components: 0n, utilities: 0n, variants: 0n, user: 0n }, this.layerPositions = { defaults: 0n, base: 1n, components: 2n, utilities: 3n, user: 4n, variants: 5n }, this.reservedVariantBits = 0n, this.variantOffsets = /* @__PURE__ */ new Map();
  }
  create(e) {
    return { layer: e, parentLayer: e, arbitrary: 0n, variants: 0n, parallelIndex: 0n, index: this.offsets[e]++, propertyOffset: 0n, property: "", options: [] };
  }
  arbitraryProperty(e) {
    return { ...this.create("utilities"), arbitrary: 1n, property: e };
  }
  forVariant(e, t = 0) {
    let r = this.variantOffsets.get(e);
    if (r === void 0) throw new Error(`Cannot find offset for unknown variant ${e}`);
    return { ...this.create("variants"), variants: r << BigInt(t) };
  }
  applyVariantOffset(e, t, r) {
    return r.variant = t.variants, { ...e, layer: "variants", parentLayer: e.layer === "variants" ? e.parentLayer : e.layer, variants: e.variants | t.variants, options: r.sort ? [].concat(r, e.options) : e.options, parallelIndex: at([e.parallelIndex, t.parallelIndex]) };
  }
  applyParallelOffset(e, t) {
    return { ...e, parallelIndex: BigInt(t) };
  }
  recordVariants(e, t) {
    for (let r of e) this.recordVariant(r, t(r));
  }
  recordVariant(e, t = 1) {
    return this.variantOffsets.set(e, 1n << this.reservedVariantBits), this.reservedVariantBits += BigInt(t), { ...this.create("variants"), variants: this.variantOffsets.get(e) };
  }
  compare(e, t) {
    if (e.layer !== t.layer) return this.layerPositions[e.layer] - this.layerPositions[t.layer];
    if (e.parentLayer !== t.parentLayer) return this.layerPositions[e.parentLayer] - this.layerPositions[t.parentLayer];
    for (let r of e.options) for (let a of t.options) {
      if (r.id !== a.id || !r.sort || !a.sort) continue;
      let n = at([r.variant, a.variant]) ?? 0n, i = ~(n | n - 1n), o = e.variants & i, l = t.variants & i;
      if (o !== l) continue;
      let p = r.sort({ value: r.value, modifier: r.modifier }, { value: a.value, modifier: a.modifier });
      if (p !== 0) return p;
    }
    return e.variants !== t.variants ? e.variants - t.variants : e.parallelIndex !== t.parallelIndex ? e.parallelIndex - t.parallelIndex : e.arbitrary !== t.arbitrary ? e.arbitrary - t.arbitrary : e.propertyOffset !== t.propertyOffset ? e.propertyOffset - t.propertyOffset : e.index - t.index;
  }
  recalculateVariantOffsets() {
    let e = Array.from(this.variantOffsets.entries()).filter(([r]) => r.startsWith("[")).sort(([r], [a]) => Kr(r, a)), t = e.map(([, r]) => r).sort((r, a) => rt(r - a));
    return e.map(([, r], a) => [r, t[a]]).filter(([r, a]) => r !== a);
  }
  remapArbitraryVariantOffsets(e) {
    let t = this.recalculateVariantOffsets();
    return t.length === 0 ? e : e.map((r) => {
      let [a, n] = r;
      return a = { ...a, variants: Gr(a.variants, t) }, [a, n];
    });
  }
  sortArbitraryProperties(e) {
    let t = /* @__PURE__ */ new Set();
    for (let [i] of e) i.arbitrary === 1n && t.add(i.property);
    if (t.size === 0) return e;
    let r = Array.from(t).sort(), a = /* @__PURE__ */ new Map(), n = 1n;
    for (let i of r) a.set(i, n++);
    return e.map((i) => {
      let [o, l] = i;
      return o = { ...o, propertyOffset: a.get(o.property) ?? 0n }, [o, l];
    });
  }
  sort(e) {
    return e = this.remapArbitraryVariantOffsets(e), e = this.sortArbitraryProperties(e), e.sort(([t], [r]) => rt(this.compare(t, r)));
  }
};
function at(e) {
  let t = null;
  for (let r of e) t = t ?? r, t = t > r ? t : r;
  return t;
}
function Kr(e, t) {
  let r = e.length, a = t.length, n = r < a ? r : a;
  for (let i = 0; i < n; i++) {
    let o = e.charCodeAt(i) - t.charCodeAt(i);
    if (o !== 0) return o;
  }
  return r - a;
}
var J = Symbol(), he = { MatchVariant: Symbol.for("MATCH_VARIANT") }, Ue = { Base: 1, Dynamic: 2 };
function ge(e, t) {
  let r = e.tailwindConfig.prefix;
  return typeof r == "function" ? r(t) : r + t;
}
function nt({ type: e = "any", ...t }) {
  let r = [].concat(e);
  return { ...t, types: r.map((a) => Array.isArray(a) ? { type: a[0], ...a[1] } : { type: a, preferOnConflict: false }) };
}
function Qr(e) {
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
function Jr(e, t, { before: r = [] } = {}) {
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
function Ct(e) {
  return Array.isArray(e) ? e.flatMap((t) => !Array.isArray(t) && !Z(t) ? t : je(t)) : Ct([e]);
}
function Zr(e, t) {
  return j((r) => {
    let a = [];
    return t && t(r), r.walkClasses((n) => {
      a.push(n.value);
    }), a;
  }).transformSync(e);
}
function ea(e) {
  e.walkPseudos((t) => {
    t.value === ":not" && t.remove();
  });
}
function ta(e, t = { containsNonOnDemandable: false }, r = 0) {
  let a = [], n = [];
  e.type === "rule" ? n.push(...e.selectors) : e.type === "atrule" && e.walkRules((i) => n.push(...i.selectors));
  for (let i of n) {
    let o = Zr(i, ea);
    o.length === 0 && (t.containsNonOnDemandable = true);
    for (let l of o) a.push(l);
  }
  return r === 0 ? [t.containsNonOnDemandable || a.length === 0, a] : a;
}
function ae(e) {
  return Ct(e).flatMap((t) => {
    let r = /* @__PURE__ */ new Map(), [a, n] = ta(t);
    return a && n.unshift(ee), n.map((i) => (r.has(t) || r.set(t, t), [i, r.get(t)]));
  });
}
function Ae(e) {
  return e.startsWith("@") || e.includes("&");
}
function oe(e) {
  e = e.replace(/\n+/g, "").replace(/\s{1,}/g, " ").trim();
  let t = Qr(e).map((r) => {
    if (!r.startsWith("@")) return ({ format: i }) => i(r);
    let [, a, n] = /@(\S*)( .+|[({].*)?/g.exec(r);
    return ({ wrap: i }) => i(V.atRule({ name: a, params: (n == null ? void 0 : n.trim()) ?? "" }));
  }).reverse();
  return (r) => {
    for (let a of t) a(r);
  };
}
function ra(e, t, { variantList: r, variantMap: a, offsets: n, classList: i }) {
  function o(s, d) {
    return s ? Ot(e, s, d) : e;
  }
  function l(s) {
    return Re(e.prefix, s);
  }
  function p(s, d) {
    return s === ee ? ee : d.respectPrefix ? t.tailwindConfig.prefix + s : s;
  }
  function b(s, d, g = {}) {
    let m = Sr(s), f = o(["theme", ...m], d);
    return Oe(m[0])(f, g);
  }
  let u = 0, w = { postcss: V, prefix: l, e: K, config: o, theme: b, corePlugins: (s) => Array.isArray(e.corePlugins) ? e.corePlugins.includes(s) : o(["corePlugins", s], true), variants: () => [], addBase(s) {
    for (let [d, g] of ae(s)) {
      let m = p(d, {}), f = n.create("base");
      t.candidateRuleMap.has(m) || t.candidateRuleMap.set(m, []), t.candidateRuleMap.get(m).push([{ sort: f, layer: "base" }, g]);
    }
  }, addDefaults(s, d) {
    let g = { [`@defaults ${s}`]: d };
    for (let [m, f] of ae(g)) {
      let c = p(m, {});
      t.candidateRuleMap.has(c) || t.candidateRuleMap.set(c, []), t.candidateRuleMap.get(c).push([{ sort: n.create("defaults"), layer: "defaults" }, f]);
    }
  }, addComponents(s, d) {
    d = Object.assign({}, { preserveSource: false, respectPrefix: true, respectImportant: false }, Array.isArray(d) ? {} : d);
    for (let [g, m] of ae(s)) {
      let f = p(g, d);
      i.add(f), t.candidateRuleMap.has(f) || t.candidateRuleMap.set(f, []), t.candidateRuleMap.get(f).push([{ sort: n.create("components"), layer: "components", options: d }, m]);
    }
  }, addUtilities(s, d) {
    d = Object.assign({}, { preserveSource: false, respectPrefix: true, respectImportant: true }, Array.isArray(d) ? {} : d);
    for (let [g, m] of ae(s)) {
      let f = p(g, d);
      i.add(f), t.candidateRuleMap.has(f) || t.candidateRuleMap.set(f, []), t.candidateRuleMap.get(f).push([{ sort: n.create("utilities"), layer: "utilities", options: d }, m]);
    }
  }, matchUtilities: function(s, d) {
    d = nt({ respectPrefix: true, respectImportant: true, modifiers: false, ...d });
    let g = n.create("utilities");
    for (let m in s) {
      let f = function($, { isOnlyPlugin: k }) {
        let [x, U, I] = Xe(d.types, $, d, e);
        if (x === void 0) return [];
        if (!d.types.some(({ type: P }) => P === U)) if (k) T.warn([`Unnecessary typehint \`${U}\` in \`${m}-${$}\`.`, `You can safely update it to \`${m}-${$.replace(U + ":", "")}\`.`]);
        else return [];
        if (!xe(x)) return [];
        let X = { get modifier() {
          return d.modifiers || T.warn(`modifier-used-without-options-for-${m}`, ["Your plugin must set `modifiers: true` in its options to support modifiers."]), I;
        } }, _ = Y(e, "generalizedModifiers");
        return [].concat(_ ? h(x, X) : h(x)).filter(Boolean).map((P) => ({ [Le(m, $)]: P }));
      }, c = p(m, d), h = s[m];
      i.add([c, d]);
      let v = [{ sort: g, layer: "utilities", options: d }, f];
      t.candidateRuleMap.has(c) || t.candidateRuleMap.set(c, []), t.candidateRuleMap.get(c).push(v);
    }
  }, matchComponents: function(s, d) {
    d = nt({ respectPrefix: true, respectImportant: false, modifiers: false, ...d });
    let g = n.create("components");
    for (let m in s) {
      let f = function($, { isOnlyPlugin: k }) {
        let [x, U, I] = Xe(d.types, $, d, e);
        if (x === void 0) return [];
        if (!d.types.some(({ type: P }) => P === U)) if (k) T.warn([`Unnecessary typehint \`${U}\` in \`${m}-${$}\`.`, `You can safely update it to \`${m}-${$.replace(U + ":", "")}\`.`]);
        else return [];
        if (!xe(x)) return [];
        let X = { get modifier() {
          return d.modifiers || T.warn(`modifier-used-without-options-for-${m}`, ["Your plugin must set `modifiers: true` in its options to support modifiers."]), I;
        } }, _ = Y(e, "generalizedModifiers");
        return [].concat(_ ? h(x, X) : h(x)).filter(Boolean).map((P) => ({ [Le(m, $)]: P }));
      }, c = p(m, d), h = s[m];
      i.add([c, d]);
      let v = [{ sort: g, layer: "components", options: d }, f];
      t.candidateRuleMap.has(c) || t.candidateRuleMap.set(c, []), t.candidateRuleMap.get(c).push(v);
    }
  }, addVariant(s, d, g = {}) {
    d = [].concat(d).map((m) => {
      if (typeof m != "string") return (f = {}) => {
        let { args: c, modifySelectors: h, container: v, separator: $, wrap: k, format: x } = f, U = m(Object.assign({ modifySelectors: h, container: v, separator: $ }, g.type === he.MatchVariant && { args: c, wrap: k, format: x }));
        if (typeof U == "string" && !Ae(U)) throw new Error(`Your custom variant \`${s}\` has an invalid format string. Make sure it's an at-rule or contains a \`&\` placeholder.`);
        return Array.isArray(U) ? U.filter((I) => typeof I == "string").map((I) => oe(I)) : U && typeof U == "string" && oe(U)(f);
      };
      if (!Ae(m)) throw new Error(`Your custom variant \`${s}\` has an invalid format string. Make sure it's an at-rule or contains a \`&\` placeholder.`);
      return oe(m);
    }), Jr(r, s, g), a.set(s, d), t.variantOptions.set(s, g);
  }, matchVariant(s, d, g) {
    let m = (g == null ? void 0 : g.id) ?? ++u, f = s === "@", c = Y(e, "generalizedModifiers");
    for (let [v, $] of Object.entries((g == null ? void 0 : g.values) ?? {})) v !== "DEFAULT" && w.addVariant(f ? `${s}${v}` : `${s}-${v}`, ({ args: k, container: x }) => d($, c ? { modifier: k == null ? void 0 : k.modifier, container: x } : { container: x }), { ...g, value: $, id: m, type: he.MatchVariant, variantInfo: Ue.Base });
    let h = "DEFAULT" in ((g == null ? void 0 : g.values) ?? {});
    w.addVariant(s, ({ args: v, container: $ }) => (v == null ? void 0 : v.value) === ve && !h ? null : d((v == null ? void 0 : v.value) === ve ? g.values.DEFAULT : (v == null ? void 0 : v.value) ?? (typeof v == "string" ? v : ""), c ? { modifier: v == null ? void 0 : v.modifier, container: $ } : { container: $ }), { ...g, id: m, type: he.MatchVariant, variantInfo: Ue.Dynamic });
  } };
  return w;
}
function St(e) {
  e.walkAtRules((t) => {
    ["responsive", "variants"].includes(t.name) && (St(t), t.before(t.nodes), t.remove());
  });
}
function aa(e) {
  let t = [];
  return e.each((r) => {
    r.type === "atrule" && ["responsive", "variants"].includes(r.name) && (r.name = "layer", r.params = "utilities");
  }), e.walkAtRules("layer", (r) => {
    if (St(r), r.params === "base") {
      for (let a of r.nodes) t.push(function({ addBase: n }) {
        n(a, { respectPrefix: false });
      });
      r.remove();
    } else if (r.params === "components") {
      for (let a of r.nodes) t.push(function({ addComponents: n }) {
        n(a, { respectPrefix: false, preserveSource: true });
      });
      r.remove();
    } else if (r.params === "utilities") {
      for (let a of r.nodes) t.push(function({ addUtilities: n }) {
        n(a, { respectPrefix: false, preserveSource: true });
      });
      r.remove();
    }
  }), t;
}
function na(e, t) {
  let r = Object.entries({ ...A, ...$r }).map(([l, p]) => e.tailwindConfig.corePlugins.includes(l) ? p : null).filter(Boolean), a = e.tailwindConfig.plugins.map((l) => (l.__isOptionsFunction && (l = l()), typeof l == "function" ? l : l.handler)), n = aa(t), i = [A.childVariant, A.pseudoElementVariants, A.pseudoClassVariants, A.hasVariants, A.ariaVariants, A.dataVariants], o = [A.supportsVariants, A.reducedMotionVariants, A.prefersContrastVariants, A.screenVariants, A.orientationVariants, A.directionVariants, A.darkVariants, A.forcedColorsVariants, A.printVariant];
  return (e.tailwindConfig.darkMode === "class" || Array.isArray(e.tailwindConfig.darkMode) && e.tailwindConfig.darkMode[0] === "class") && (o = [A.supportsVariants, A.reducedMotionVariants, A.prefersContrastVariants, A.darkVariants, A.screenVariants, A.orientationVariants, A.directionVariants, A.forcedColorsVariants, A.printVariant]), [...r, ...i, ...a, ...o, ...n];
}
function ia(e, t) {
  let r = [], a = /* @__PURE__ */ new Map();
  t.variantMap = a;
  let n = new Xr();
  t.offsets = n;
  let i = /* @__PURE__ */ new Set(), o = ra(t.tailwindConfig, t, { variantList: r, variantMap: a, offsets: n, classList: i });
  for (let u of e) if (Array.isArray(u)) for (let w of u) w(o);
  else u == null ? void 0 : u(o);
  n.recordVariants(r, (u) => a.get(u).length);
  for (let [u, w] of a.entries()) t.variantMap.set(u, w.map((s, d) => [n.forVariant(u, d), s]));
  let l = (t.tailwindConfig.safelist ?? []).filter(Boolean);
  if (l.length > 0) {
    let u = [];
    for (let w of l) {
      if (typeof w == "string") {
        t.changedContent.push({ content: w, extension: "html" });
        continue;
      }
      if (w instanceof RegExp) {
        T.warn("root-regex", ["Regular expressions in `safelist` work differently in Tailwind CSS v3.0.", "Update your `safelist` configuration to eliminate this warning.", "https://tailwindcss.com/docs/content-configuration#safelisting-classes"]);
        continue;
      }
      u.push(w);
    }
    if (u.length > 0) {
      let w = /* @__PURE__ */ new Map(), s = t.tailwindConfig.prefix.length, d = u.some((g) => g.pattern.source.includes("!"));
      for (let g of i) {
        let m = Array.isArray(g) ? (() => {
          let [f, c] = g, h = Object.keys((c == null ? void 0 : c.values) ?? {}).map((v) => ne(f, v));
          return (c == null ? void 0 : c.supportsNegativeValues) && (h = [...h, ...h.map((v) => "-" + v)], h = [...h, ...h.map((v) => v.slice(0, s) + "-" + v.slice(s))]), c.types.some(({ type: v }) => v === "color") && (h = [...h, ...h.flatMap((v) => Object.keys(t.tailwindConfig.theme.opacity).map(($) => `${v}/${$}`))]), d && (c == null ? void 0 : c.respectImportant) && (h = [...h, ...h.map((v) => "!" + v)]), h;
        })() : [g];
        for (let f of m) for (let { pattern: c, variants: h = [] } of u) if (c.lastIndex = 0, w.has(c) || w.set(c, 0), !!c.test(f)) {
          w.set(c, w.get(c) + 1), t.changedContent.push({ content: f, extension: "html" });
          for (let v of h) t.changedContent.push({ content: v + t.tailwindConfig.separator + f, extension: "html" });
        }
      }
      for (let [g, m] of w.entries()) m === 0 && T.warn([`The safelist pattern \`${g}\` doesn't match any Tailwind CSS classes.`, "Fix this pattern or remove it from your `safelist` configuration.", "https://tailwindcss.com/docs/content-configuration#safelisting-classes"]);
    }
  }
  let p = [].concat(t.tailwindConfig.darkMode ?? "media")[1] ?? "dark", b = [ge(t, p), ge(t, "group"), ge(t, "peer")];
  t.getClassOrder = function(u) {
    let w = [...u].sort((m, f) => m === f ? 0 : m < f ? -1 : 1), s = new Map(w.map((m) => [m, null])), d = Yr(new Set(w), t, true);
    d = t.offsets.sort(d);
    let g = BigInt(b.length);
    for (let [, m] of d) {
      let f = m.raws.tailwind.candidate;
      s.set(f, s.get(f) ?? g++);
    }
    return u.map((m) => {
      let f = s.get(m) ?? null, c = b.indexOf(m);
      return f === null && c !== -1 && (f = BigInt(c)), [m, f];
    });
  }, t.getClassList = function(u = {}) {
    var _a;
    let w = [];
    for (let s of i) if (Array.isArray(s)) {
      let [d, g] = s, m = [], f = Object.keys((g == null ? void 0 : g.modifiers) ?? {});
      ((_a = g == null ? void 0 : g.types) == null ? void 0 : _a.some(({ type: v }) => v === "color")) && f.push(...Object.keys(t.tailwindConfig.theme.opacity ?? {}));
      let c = { modifiers: f }, h = u.includeMetadata && f.length > 0;
      for (let [v, $] of Object.entries((g == null ? void 0 : g.values) ?? {})) {
        if ($ == null) continue;
        let k = ne(d, v);
        if (w.push(h ? [k, c] : k), (g == null ? void 0 : g.supportsNegativeValues) && be($)) {
          let x = ne(d, `-${v}`);
          m.push(h ? [x, c] : x);
        }
      }
      w.push(...m);
    } else w.push(s);
    return w;
  }, t.getVariants = function() {
    let u = Math.random().toString(36).substring(7).toUpperCase(), w = [];
    for (let [s, d] of t.variantOptions.entries()) d.variantInfo !== Ue.Base && w.push({ name: s, isArbitrary: d.type === Symbol.for("MATCH_VARIANT"), values: Object.keys(d.values ?? {}), hasDash: s !== "@", selectors({ modifier: g, value: m } = {}) {
      var _a;
      let f = `TAILWINDPLACEHOLDER${u}`, c = V.rule({ selector: `.${f}` }), h = V.root({ nodes: [c.clone()] }), v = h.toString(), $ = (t.variantMap.get(s) ?? []).flatMap(([D, z]) => z), k = [];
      for (let D of $) {
        let z = [], te = { args: { modifier: g, value: ((_a = d.values) == null ? void 0 : _a[m]) ?? m }, separator: t.tailwindConfig.separator, modifySelectors(F) {
          return h.each((pe) => {
            pe.type === "rule" && (pe.selectors = pe.selectors.map((We) => F({ get className() {
              return kt(We);
            }, selector: We })));
          }), h;
        }, format(F) {
          z.push(F);
        }, wrap(F) {
          z.push(`@${F.name} ${F.params} { & }`);
        }, container: h }, re = D(te);
        if (z.length > 0 && k.push(z), Array.isArray(re)) for (let F of re) z = [], F(te), k.push(z);
      }
      let x = [], U = h.toString();
      v !== U && (h.walkRules((D) => {
        let z = D.selector, te = j((re) => {
          re.walkClasses((F) => {
            F.value = `${s}${t.tailwindConfig.separator}${F.value}`;
          });
        }).processSync(z);
        x.push(z.replace(te, "&").replace(f, "&"));
      }), h.walkAtRules((D) => {
        x.push(`@${D.name} (${D.params}) { & }`);
      }));
      let I = !(m in (d.values ?? {})), X = d[J] ?? {}, _ = !(I || X.respectPrefix === false);
      k = k.map((D) => D.map((z) => ({ format: z, respectPrefix: _ }))), x = x.map((D) => ({ format: D, respectPrefix: _ }));
      let P = { candidate: f, context: t }, Fe = k.map((D) => xt(`.${f}`, ce(D, P), P).replace(`.${f}`, "&").replace("{ & }", "").trim());
      return x.length > 0 && Fe.push(ce(x, P).toString().replace(`.${f}`, "&")), Fe;
    } });
    return w;
  };
}
function Ut(e, t) {
  e.classCache.has(t) && (e.notClassCache.add(t), e.classCache.delete(t), e.applyClassCache.delete(t), e.candidateRuleMap.delete(t), e.candidateRuleCache.delete(t), e.stylesheetCache = null);
}
function oa(e, t) {
  let r = t.raws.tailwind.candidate;
  if (r) {
    for (let a of e.ruleCache) a[1].raws.tailwind.candidate === r && e.ruleCache.delete(a);
    Ut(e, r);
  }
}
function sa(e, t = [], r = V.root()) {
  let a = { disposables: [], ruleCache: /* @__PURE__ */ new Set(), candidateRuleCache: /* @__PURE__ */ new Map(), classCache: /* @__PURE__ */ new Map(), applyClassCache: /* @__PURE__ */ new Map(), notClassCache: new Set(e.blocklist ?? []), postCssNodeCache: /* @__PURE__ */ new Map(), candidateRuleMap: /* @__PURE__ */ new Map(), tailwindConfig: e, changedContent: t, variantMap: /* @__PURE__ */ new Map(), stylesheetCache: null, variantOptions: /* @__PURE__ */ new Map(), markInvalidUtilityCandidate: (i) => Ut(a, i), markInvalidUtilityNode: (i) => oa(a, i) }, n = na(a, r);
  return ia(n, a), a;
}
export {
  sa as R
};

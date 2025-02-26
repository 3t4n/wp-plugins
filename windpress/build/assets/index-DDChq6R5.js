var __defProp = Object.defineProperty;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __publicField = (obj, key, value) => __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
import { B as te } from "./index-CgqXENQe.js";
const we = { all: "media all", print: "media print", screen: "media screen", speech: "media speech", landscape: "media (orientation:landscape)", portrait: "media (orientation:portrait)", motion: "media (prefers-reduced-motion:no-preference)", "reduced-motion": "media (prefers-reduced-motion:reduce)" }, $e = { "::scrollbar": "::-webkit-scrollbar", "::scrollbar-button": "::-webkit-scrollbar-button", "::scrollbar-thumb": "::-webkit-scrollbar-thumb", "::scrollbar-track": "::-webkit-scrollbar-track", "::scrollbar-track-piece": "::-webkit-scrollbar-track-piece", "::scrollbar-corner": "::-webkit-scrollbar-corner", "::slider-thumb": ["::-webkit-slider-thumb", "::-moz-range-thumb"], "::slider-runnable-track": ["::-webkit-slider-runnable-track", "::-moz-range-track"], "::resizer": "::-webkit-resizer", "::progress": "::-webkit-progress", ":first": ":first-child", ":last": ":last-child", ":even": ":nth-child(2n)", ":odd": ":nth-child(odd)", ":nth(": ":nth-child(", ":only": ":only-child" }, Se = { square: { "aspect-ratio": "1/1" }, video: { "aspect-ratio": "16/9" }, rounded: { "border-radius": "1e9em" }, round: { "border-radius": "50%", "aspect-ratio": "1/1" }, hidden: { display: "none" }, block: { display: "block" }, table: { display: "table" }, flex: { display: "flex" }, grid: { display: "grid" }, contents: { display: "contents" }, inline: { display: "inline" }, "inline-block": { display: "inline-block" }, "inline-flex": { display: "inline-flex" }, "inline-grid": { display: "inline-grid" }, "inline-table": { display: "inline-table" }, "table-cell": { display: "table-cell" }, "table-caption": { display: "table-caption" }, "flow-root": { display: "flow-root" }, "list-item": { display: "list-item" }, "table-row": { display: "table-row" }, "table-column": { display: "table-column" }, "table-row-group": { display: "table-row-group" }, "table-column-group": { display: "table-column-group" }, "table-header-group": { display: "table-header-group" }, "table-footer-group": { display: "table-footer-group" }, italic: { "font-style": "italic" }, oblique: { "font-style": "oblique" }, isolate: { isolation: "isolate" }, overflowed: { overflow: "visible" }, untouchable: { "pointer-events": "none" }, static: { position: "static" }, fixed: { position: "fixed" }, abs: { position: "absolute" }, rel: { position: "relative" }, sticky: { position: "sticky" }, uppercase: { "text-transform": "uppercase" }, lowercase: { "text-transform": "lowercase" }, capitalize: { "text-transform": "capitalize" }, visible: { visibility: "visible" }, invisible: { visibility: "hidden" }, vw: { width: "100vw" }, vh: { height: "100vh" }, "max-vw": { "max-width": "100vw" }, "max-vh": { "max-height": "100vh" }, "min-vw": { "min-width": "100vw" }, "min-vh": { "min-height": "100vh" }, "center-content": { "justify-content": "center", "align-items": "center" }, "sr-only": { position: "absolute", width: "1px", height: "1px", padding: "0", margin: "-1px", overflow: "hidden", clip: "rect(0,0,0,0)", "white-space": "nowrap", "border-width": "0" }, full: { width: "100%", height: "100%" }, top: { top: 0 }, left: { left: 0 }, right: { right: 0 }, bottom: { bottom: 0 }, center: { left: 0, right: 0, "margin-left": "auto", "margin-right": "auto" }, middle: { top: 0, bottom: 0, "margin-top": "auto", "margin-bottom": "auto" }, "break-spaces": { "white-space": "break-spaces" }, "break-word": { "overflow-wrap": "break-word", overflow: "hidden" }, "gradient-text": { "-webkit-text-fill-color": "transparent", "-webkit-background-clip": "text", "background-clip": "text" }, fit: { width: "fit-content", height: "fit-content" } }, Re = { fade: { "0%": { opacity: 0 }, to: { opacity: 1 } }, flash: { "0%,50%,to": { opacity: 1 }, "25%,75%": { opacity: 0 } }, float: { "0%": { transform: "none" }, "50%": { transform: "translateY(-1.25rem)" }, to: { transform: "none" } }, heart: { "0%": { transform: "scale(1)" }, "14%": { transform: "scale(1.3)" }, "28%": { transform: "scale(1)" }, "42%": { transform: "scale(1.3)" }, "70%": { transform: "scale(1)" } }, jump: { "0%,to": { transform: "translateY(-25%)", "animation-timing-function": "cubic-bezier(.8,0,1,1)" }, "50%": { transform: "translateY(0)", "animation-timing-function": "cubic-bezier(0,0,.2,1)" } }, ping: { "75%,to": { transform: "scale(2)", opacity: 0 } }, pulse: { "0%": { transform: "none" }, "50%": { transform: "scale(1.05)" }, to: { transform: "none" } }, rotate: { "0%": { transform: "rotate(-360deg)" }, to: { transform: "none" } }, shake: { "0%": { transform: "none" }, "6.5%": { transform: "translateX(-6px) rotateY(-9deg)" }, "18.5%": { transform: "translateX(5px) rotateY(7deg)" }, "31.5%": { transform: "translateX(-3px) rotateY(-5deg)" }, "43.5%": { transform: "translateX(2px) rotateY(3deg)" }, "50%": { transform: "none" } }, zoom: { "0%": { transform: "scale(0)" }, to: { transform: "none" } } }, Ve = { gray: { 5: "#f6f5f7", 10: "#efeef0", 20: "#cdccce", 30: "#a2a1a3", 40: "#89888a", 50: "#737274", 60: "#585759", 70: "#444345", 80: "#323133", 90: "#29282a", 95: "#222123" }, slate: { 5: "#f8f9fb", 10: "#eff2f9", 20: "#c8d0e3", 30: "#9fabc6", 40: "#7c8cab", 50: "#5f7395", 60: "#455572", 70: "#37455d", 80: "#283348", 90: "#1d273a", 95: "#182030" }, brown: { 5: "#fff6f0", 10: "#feefe3", 20: "#f3bea4", 30: "#e7976e", 40: "#da7c4d", 50: "#cc6633", 60: "#b65325", 70: "#9d4119", 80: "#833111", 90: "#692007", 95: "#431304" }, orange: { 5: "#fff5ea", 10: "#fff5df", 20: "#ffcb9e", 30: "#ff9b47", 40: "#ff8528", 50: "#ff6c0a", 60: "#e05200", 70: "#bc3e00", 80: "#992d00", 90: "#701d00", 95: "#471100" }, amber: { 5: "#fff9eb", 10: "#fff4db", 20: "#ffe099", 30: "#ffc133", 40: "#ffb10a", 50: "#f99e00", 60: "#e57e00", 70: "#c15d00", 80: "#a34900", 90: "#753200", 95: "#4c1f00" }, yellow: { 5: "#fffae5", 10: "#fffed1", 20: "#ffe993", 30: "#ffd233", 40: "#ffc300", 50: "#efaf00", 60: "#d69200", 70: "#b77400", 80: "#9e5c00", 90: "#753c00", 95: "#4c2600" }, lime: { 5: "#f5ffe5", 10: "#f5ffd6", 20: "#d1fb8d", 30: "#acec46", 40: "#91d91a", 50: "#77c012", 60: "#61a60c", 70: "#4c8d07", 80: "#367604", 90: "#256000", 95: "#1b3d00" }, green: { 5: "#e7fdea", 10: "#dbfee4", 20: "#a5f7b8", 30: "#35ed66", 40: "#00d655", 50: "#00c147", 60: "#00ad3f", 70: "#008e34", 80: "#007a2c", 90: "#006023", 95: "#003d16" }, beryl: { 5: "#e0fef2", 10: "#d2fff7", 20: "#6cffd4", 30: "#0fefa4", 40: "#04e09e", 50: "#04cb8f", 60: "#00b277", 70: "#009360", 80: "#007f50", 90: "#00663e", 95: "#003d24" }, teal: { 5: "#dbfefd", 10: "#cfffff", 20: "#7ffff6", 30: "#00f4e4", 40: "#00e4d4", 50: "#00ccc8", 60: "#00aeb7", 70: "#0092a3", 80: "#00798e", 90: "#005d75", 95: "#003747" }, cyan: { 5: "#e0ffff", 10: "#d1ffff", 20: "#7ff6ff", 30: "#1ee1ff", 40: "#00ccf9", 50: "#00b3ea", 60: "#0099d6", 70: "#007dbc", 80: "#0067a8", 90: "#005089", 95: "#003156" }, sky: { 5: "#e5f5ff", 10: "#d9f8ff", 20: "#a3deff", 30: "#6bc6ff", 40: "#34b2fd", 50: "#059fff", 60: "#008df9", 70: "#0073e0", 80: "#005cc6", 90: "#0041a3", 95: "#002566" }, blue: { 5: "#e5f3fe", 10: "#dbf2fe", 20: "#add7ff", 30: "#70b0ff", 40: "#4c93fd", 50: "#3a7cff", 60: "#2563fd", 70: "#1b53ec", 80: "#1947d1", 90: "#1735a2", 95: "#102069" }, indigo: { 5: "#f0f1fe", 10: "#e9ecfe", 20: "#c8cdfe", 30: "#939eff", 40: "#7e81fe", 50: "#7068ff", 60: "#5b4cfd", 70: "#4e39ed", 80: "#4732d2", 90: "#3623a3", 95: "#26176c" }, violet: { 5: "#f2efff", 10: "#efe8ff", 20: "#d7c5ff", 30: "#b198fe", 40: "#9a70ff", 50: "#8e56fe", 60: "#812fff", 70: "#7407f2", 80: "#6405d1", 90: "#4f05a3", 95: "#35036e" }, purple: { 5: "#f6f0ff", 10: "#f6e8fe", 20: "#e2bffe", 30: "#c492fd", 40: "#b266ff", 50: "#a849fe", 60: "#9514ff", 70: "#8200e5", 80: "#7100c1", 90: "#58008e", 95: "#3e0060" }, fuchsia: { 5: "#faf0ff", 10: "#fde8fe", 20: "#f0baff", 30: "#dd89fe", 40: "#d760fe", 50: "#cf33ff", 60: "#b700e5", 70: "#a200c6", 80: "#8700a3", 90: "#660175", 95: "#480051" }, pink: { 5: "#fef1f9", 10: "#fee9f8", 20: "#ffb8df", 30: "#f986c1", 40: "#fa65b2", 50: "#f747a2", 60: "#ef2188", 70: "#d61673", 80: "#b80c5c", 90: "#8f0543", 95: "#64032f" }, crimson: { 5: "#ffeff2", 10: "#ffe8ec", 20: "#ffbac7", 30: "#ff849d", 40: "#ff6684", 50: "#fc4065", 60: "#ed2a51", 70: "#d7173e", 80: "#bb1536", 90: "#8f132c", 95: "#620e1f" }, red: { 5: "#ffefef", 10: "#fee8e8", 20: "#ffbcbc", 30: "#ff8787", 40: "#fd5f5f", 50: "#f73f3f", 60: "#e52e2e", 70: "#d01b1b", 80: "#b81919", 90: "#921515", 95: "#650f0f" } };
function ge(t) {
  const i = typeof te < "u" ? te : null;
  return !!(i && t instanceof i || t instanceof Date || t instanceof RegExp);
}
function pe(t) {
  if ((typeof te < "u" ? te : null) && t instanceof te) {
    const s = te.alloc(t.length);
    return t.copy(s), s;
  } else {
    if (t instanceof Date) return new Date(t.getTime());
    if (t instanceof RegExp) return new RegExp(t);
    throw new Error("Unexpected situation");
  }
}
function ve(t) {
  const i = [];
  return t.forEach(function(s, o) {
    typeof s == "object" && s !== null ? Array.isArray(s) ? i[o] = ve(s) : ge(s) ? i[o] = pe(s) : i[o] = ie({}, s) : i[o] = s;
  }), i;
}
function be(t, i) {
  return i === "__proto__" ? void 0 : t[i];
}
function ie(...t) {
  const i = {};
  let s, o;
  return t.forEach(function(n) {
    typeof n != "object" || n === null || Array.isArray(n) || Object.keys(n).forEach(function(r) {
      if (o = be(i, r), s = be(n, r), s !== i) if (typeof s != "object" || s === null) {
        i[r] = s;
        return;
      } else if (Array.isArray(s)) {
        i[r] = ve(s);
        return;
      } else if (ge(s)) {
        i[r] = pe(s);
        return;
      } else if (typeof o != "object" || o === null || Array.isArray(o)) {
        i[r] = ie({}, s);
        return;
      } else {
        i[r] = ie(o, s);
        return;
      }
    });
  }), i;
}
const Oe = { full: "100%", fit: "fit-content", max: "max-content", min: "min-content", screen: { "4xs": 360, "3xs": 480, "2xs": 600, xs: 768, sm: 834, md: 1024, lg: 1280, xl: 1440, "2xl": 1600, "3xl": 1920, "4xl": 2560 }, "font-family": { mono: ["ui-monospace", "SFMono-Regular", "Menlo", "Monaco", "Consolas", "Liberation Mono", "Courier New", "monospace"], sans: ["ui-sans-serif", "system-ui", "-apple-system", "BlinkMacSystemFont", "Segoe UI", "Roboto", "Helvetica Neue", "Arial", "Noto Sans", "sans-serif", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"], serif: ["ui-serif", "Georgia", "Cambria", "Times New Roman", "Times", "serif"] }, "font-weight": { thin: 100, extralight: 200, light: 300, regular: 400, medium: 500, semibold: 600, bold: 700, extrabold: 800, heavy: 900 }, "flex-direction": { col: "column", "col-reverse": "column-reverse" }, "box-sizing": { content: "content-box", border: "border-box" }, position: { abs: "absolute", rel: "relative" }, "transform-box": { content: "content-box", border: "border-box", padding: "padding-box", fill: "fill-box", stroke: "stroke-box", view: "view-box" }, "animation-direction": { alt: "alternate", "alt-reverse": "alternate-reverse" }, "background-clip": { content: "content-box", border: "border-box", padding: "padding-box" }, "background-origin": { content: "content-box", border: "border-box", padding: "padding-box" }, order: { first: -999999, last: 999999 }, "shape-outside": { content: "content-box", border: "border-box", padding: "padding-box", margin: "margin-box" }, "clip-path": { content: "content-box", border: "border-box", padding: "padding-box", margin: "margin-box", fill: "fill-box", stroke: "stroke-box", view: "view-box" }, current: "currentColor", frame: { neutral: { "@light": "$(slate-60)", "@dark": "$(gray-30)" }, light: { "@light": "$(slate-60)/.2", "@dark": "$(gray-30)/.2" }, lighter: { "@light": "$(slate-60)/.16", "@dark": "$(gray-30)/.16" }, lightest: { "@light": "$(slate-60)/.12", "@dark": "$(gray-30)/.12" } }, white: "#ffffff", black: "#000000", base: { "@light": "$(white)", "@dark": "$(gray-95)" }, canvas: { "@light": "$(slate-5)", "@dark": "$(gray-90)" }, surface: { "@light": "$(white)", "@dark": "$(gray-80)" }, invert: { "@light": "$(black)", "@dark": "$(white)" }, gray: { "@light": "$(gray-30)", "@dark": "$(gray-40)", active: { "@light": "$(gray-40)", "@dark": "$(gray-30)" }, text: { "@light": "$(gray-90)", "@dark": "$(gray-95)" } }, slate: { "@light": "$(slate-30)", "@dark": "$(slate-40)", active: { "@light": "$(slate-40)", "@dark": "$(slate-30)" }, text: { "@light": "$(slate-90)", "@dark": "$(slate-95)" } }, brown: { "@light": "$(brown-40)", "@dark": "$(brown-50)", active: { "@light": "$(brown-50)", "@dark": "$(brown-40)" }, text: { "@light": "$(brown-90)", "@dark": "$(brown-95)" } }, orange: { "@light": "$(orange-40)", "@dark": "$(orange-50)", active: { "@light": "$(orange-50)", "@dark": "$(orange-40)" }, text: { "@light": "$(orange-90)", "@dark": "$(orange-95)" } }, amber: { "@light": "$(amber-40)", "@dark": "$(amber-50)", active: { "@light": "$(amber-50)", "@dark": "$(amber-30)" }, text: { "@light": "$(amber-90)", "@dark": "$(amber-95)" } }, yellow: { "@light": "$(yellow-40)", "@dark": "$(yellow-50)", active: { "@light": "$(yellow-50)", "@dark": "$(yellow-30)" }, text: { "@light": "$(yellow-90)", "@dark": "$(yellow-95)" } }, lime: { "@light": "$(lime-40)", "@dark": "$(lime-50)", active: { "@light": "$(lime-50)", "@dark": "$(lime-30)" }, text: { "@light": "$(lime-90)", "@dark": "$(lime-95)" } }, green: { "@light": "$(green-40)", "@dark": "$(green-50)", active: { "@light": "$(green-50)", "@dark": "$(green-30)" }, text: { "@light": "$(green-90)", "@dark": "$(green-95)" } }, beryl: { "@light": "$(beryl-40)", "@dark": "$(beryl-50)", active: { "@light": "$(beryl-50)", "@dark": "$(beryl-30)" }, text: { "@light": "$(beryl-90)", "@dark": "$(beryl-95)" } }, teal: { "@light": "$(teal-40)", "@dark": "$(teal-50)", active: { "@light": "$(teal-50)", "@dark": "$(teal-30)" }, text: { "@light": "$(teal-90)", "@dark": "$(teal-95)" } }, cyan: { "@light": "$(cyan-40)", "@dark": "$(cyan-50)", active: { "@light": "$(cyan-50)", "@dark": "$(cyan-30)" }, text: { "@light": "$(cyan-90)", "@dark": "$(cyan-95)" } }, sky: { "@light": "$(sky-60)", "@dark": "$(sky-50)", active: { "@light": "$(sky-70)", "@dark": "$(sky-40)" }, text: "$(white)" }, blue: { "@light": "$(blue-60)", "@dark": "$(blue-50)", active: { "@light": "$(blue-70)", "@dark": "$(blue-40)" }, text: "$(white)" }, indigo: { "@light": "$(indigo-60)", "@dark": "$(indigo-50)", active: { "@light": "$(indigo-70)", "@dark": "$(indigo-40)" }, text: "$(white)" }, violet: { "@light": "$(violet-60)", "@dark": "$(violet-50)", active: { "@light": "$(violet-70)", "@dark": "$(violet-40)" }, text: "$(white)" }, purple: { "@light": "$(purple-60)", "@dark": "$(purple-50)", active: { "@light": "$(purple-70)", "@dark": "$(purple-40)" }, text: "$(white)" }, fuchsia: { "@light": "$(fuchsia-60)", "@dark": "$(fuchsia-50)", active: { "@light": "$(fuchsia-70)", "@dark": "$(fuchsia-40)" }, text: "$(white)" }, pink: { "@light": "$(pink-60)", "@dark": "$(pink-50)", active: { "@light": "$(pink-70)", "@dark": "$(pink-40)" }, text: "$(white)" }, crimson: { "@light": "$(crimson-60)", "@dark": "$(crimson-50)", active: { "@light": "$(crimson-70)", "@dark": "$(crimson-40)" }, text: "$(white)" }, red: { "@light": "$(red-60)", "@dark": "$(red-50)", active: { "@light": "$(red-70)", "@dark": "$(red-40)" }, text: "$(white)" }, text: { invert: { "@light": "$(white)", "@dark": "$(black)" }, strong: { "@light": "$(slate-95)", "@dark": "$(gray-10)" }, neutral: { "@light": "$(slate-70)", "@dark": "$(gray-30)" }, lightest: { "@light": "$(slate-30)", "@dark": "$(gray-60)" }, lighter: { "@light": "$(slate-40)", "@dark": "$(gray-50)" }, light: { "@light": "$(slate-50)", "@dark": "$(gray-40)" }, gray: { "@light": "$(gray-60)", "@dark": "$(gray-30)" }, slate: { "@light": "$(slate-60)", "@dark": "$(slate-30)" }, brown: { "@light": "$(brown-60)", "@dark": "$(brown-30)" }, orange: { "@light": "$(orange-60)", "@dark": "$(orange-30)" }, amber: { "@light": "$(amber-60)", "@dark": "$(amber-40)" }, yellow: { "@light": "$(yellow-60)", "@dark": "$(yellow-40)" }, lime: { "@light": "$(lime-70)", "@dark": "$(lime-40)" }, green: { "@light": "$(green-70)", "@dark": "$(green-40)" }, beryl: { "@light": "$(beryl-70)", "@dark": "$(beryl-40)" }, teal: { "@light": "$(teal-70)", "@dark": "$(teal-40)" }, cyan: { "@light": "$(cyan-70)", "@dark": "$(cyan-40)" }, sky: { "@light": "$(sky-70)", "@dark": "$(sky-30)" }, blue: { "@light": "$(blue-60)", "@dark": "$(blue-30)" }, indigo: { "@light": "$(indigo-60)", "@dark": "$(indigo-30)" }, violet: { "@light": "$(violet-60)", "@dark": "$(violet-30)" }, purple: { "@light": "$(purple-60)", "@dark": "$(purple-30)" }, fuchsia: { "@light": "$(fuchsia-60)", "@dark": "$(fuchsia-30)" }, pink: { "@light": "$(pink-60)", "@dark": "$(pink-30)" }, crimson: { "@light": "$(crimson-60)", "@dark": "$(crimson-30)" }, red: { "@light": "$(red-60)", "@dark": "$(red-30)" } } }, je = ie(Ve, Oe);
function ke(t) {
  if (typeof CSS < "u") return CSS.escape(t);
  if (arguments.length == 0) throw new TypeError("`CSS.escape` requires an argument.");
  const i = String(t), s = i.length;
  let o = -1, n = "", r;
  const y = i.charCodeAt(0);
  if (s == 1 && y == 45) return "\\" + i;
  for (; ++o < s; ) {
    if (r = i.charCodeAt(o), r == 0) {
      n += "\uFFFD";
      continue;
    }
    if (r >= 1 && r <= 31 || r == 127 || o == 0 && r >= 48 && r <= 57 || o == 1 && r >= 48 && r <= 57 && y == 45) {
      n += "\\" + r.toString(16) + " ";
      continue;
    }
    if (r >= 128 || r == 45 || r == 95 || r >= 48 && r <= 57 || r >= 65 && r <= 90 || r >= 97 && r <= 122) {
      n += i.charAt(o);
      continue;
    }
    n += "\\" + i.charAt(o);
  }
  return n;
}
var de;
(function(t) {
  t[t.Utility = -4] = "Utility", t[t.NativeShorthand = -3] = "NativeShorthand", t[t.Shorthand = -2] = "Shorthand", t[t.Native = -1] = "Native", t[t.Normal = 0] = "Normal";
})(de || (de = {}));
var e = de;
const se = { "(": ")", "'": "'", '"': '"', "{": "}" }, xe = /^([+-]?(?:\d+(?:\.?\d+)?|\.\d+))x$/m, Ke = /^([+-.]?\d+(\.?\d+)?)(%|cm|mm|q|in|pt|pc|px|em|rem|ex|rex|cap|rcap|ch|rch|ic|ric|lh|rlh|vw|svw|lvw|dvw|vh|svh|lvh|dvh|vi|svi|lvi|dvi|vb|svb|lvb|dvb|vmin|svmin|lvmin|dvmin|vmax|svmax|lvmax|dvmax|cqw|cqh|cqi|cqb|cqmin|cqmax|deg|grad|rad|turn|s|ms|hz|khz|dpi|dpcm|dppx|x|fr|db|st)?$/, fe = /(?:url|linear-gradient|radial-gradient|repeating-linear-gradient|repeating-radial-gradient|conic-gradient)\(.*\)/, G = /(?:#|(?:color|color-contrast|color-mix|hwb|lab|lch|oklab|oklch|rgb|rgba|hsl|hsla)\(.*\)|(?:\$colors)(?![a-zA-Z0-9-]))/, q = /(?:[\d.]|(?:max|min|calc|clamp)\([^|]*\))/;
new URL("https://rc.css.master.co");
const H = ["none", "auto", "hidden", "dotted", "dashed", "solid", "double", "groove", "ridge", "inset", "outset"], D = function(t) {
  var _a;
  if (t.length < 2) return t;
  let i = false, s = false;
  for (const o of t) (o.type === "string" && H.includes(o.value) || o.type === "variable" && H.includes(String((_a = o.variable) == null ? void 0 : _a.value))) && (i = true), o.type === "function" && o.name === "var" && (s = true);
  return !i && !s && t.push({ type: "separator", value: " ", token: "|" }, { type: "string", value: "solid", token: "solid" }), t;
}, Ee = { group: { matcher: /^(?:.+?[*_>~+])?\{.+?\}/, layer: e.Shorthand, analyze(t) {
  let i = 0;
  for (; i < t.length && !(t[i] === "{" && t[i - 1] !== "\\"); i++) ;
  return [t.slice(i), t.slice(0, i)];
}, declare(t) {
  const i = {}, s = (p) => {
    const g = p.indexOf(":");
    if (g !== -1) {
      const b = p.slice(0, g);
      i[b] = p.slice(g + 1);
    }
  }, o = (p) => {
    const g = (b) => {
      var _a;
      const k = (_a = b.slice(ke(p.className).length).match(/\{(.*)\}/)) == null ? void 0 : _a[1].split(";");
      if (k) for (const d of k) s(d);
    };
    for (const b of p.natives) g(b.text);
    if (p.animationNames) {
      this.animationNames || (this.animationNames = []);
      for (const b of p.animationNames) this.animationNames.includes(b) || this.animationNames.push(b);
    }
    if (p.variableNames) {
      this.variableNames || (this.variableNames = []);
      for (const b of p.variableNames) this.variableNames.includes(b) || this.variableNames.push(b);
    }
  }, n = [];
  let r = "";
  const y = () => {
    r && (n.push(r.replace(/ /g, "|")), r = "");
  };
  let h = 1;
  (function p(g) {
    for (; h < t.length; h++) {
      const b = t[h];
      if (!g) {
        if (b === ";") {
          y();
          continue;
        }
        if (b === "}") break;
      }
      if (r += b, g === b) {
        if (g === "'" || g === '"') {
          let k = 0;
          for (let d = r.length - 2; r[d] === "\\"; d--) k++;
          if (k % 2) continue;
        }
        break;
      } else b in se && g !== "'" && g !== '"' && (h++, p(se[b]));
    }
  })(""), y();
  for (const p of n) {
    const g = this.css.generate(p);
    if (g.length) for (const b of g) o(b);
    else s(p);
  }
  return i;
} }, variable: { matcher: /^\$[\w-]+:/, layer: e.Shorthand, declare(t) {
  return { ["--" + this.keyToken.slice(1, -1)]: t };
} }, "font-size": { ambiguousKeys: ["font", "f"], ambiguousValues: [q], unit: "rem", layer: e.Native }, "font-weight": { ambiguousKeys: ["font", "f"], ambiguousValues: ["bolder"], layer: e.Native }, "font-family": { ambiguousKeys: ["font", "f"], layer: e.Native }, "font-smoothing": { ambiguousKeys: ["font", "f"], ambiguousValues: ["antialiased", "subpixel-antialiased"], layer: e.Native, declare(t) {
  switch (t) {
    case "subpixel-antialiased":
      return { "-webkit-font-smoothing": "auto", "-moz-osx-font-smoothing": "auto" };
    case "antialiased":
      return { "-webkit-font-smoothing": "antialiased", "-moz-osx-font-smoothing": "grayscale" };
  }
} }, "font-style": { ambiguousKeys: ["font", "f"], ambiguousValues: ["normal", "italic", "oblique"], layer: e.Native, unit: "deg" }, "font-variant-numeric": { ambiguousKeys: ["font", "f"], ambiguousValues: ["ordinal", "slashed-zero", "lining-nums", "oldstyle-nums", "proportional-nums", "tabular-nums", "diagonal-fractions", "stacked-fractions"], layer: e.Native }, "font-variant": { ambiguousKeys: ["font", "f"], layer: e.NativeShorthand }, font: { subkey: "f", layer: e.NativeShorthand, variables: ["font-family", "font-variant", "font-weight", "font-size", "font-style", "line-height"] }, "font-feature-settings": { key: "font-feature", layer: e.Native }, color: { key: "fg", layer: e.Native, variables: ["text"] }, "margin-left": { key: "ml", layer: e.Native, unit: "rem", variables: ["spacing"] }, "margin-right": { key: "mr", layer: e.Native, unit: "rem", variables: ["spacing"] }, "margin-top": { key: "mt", layer: e.Native, unit: "rem", variables: ["spacing"] }, "margin-bottom": { key: "mb", layer: e.Native, unit: "rem", variables: ["spacing"] }, "margin-x": { key: "mx", subkey: "margin-x", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "margin-left": t, "margin-right": t };
}, variables: ["spacing"] }, "margin-y": { key: "my", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "margin-top": t, "margin-bottom": t };
}, variables: ["spacing"] }, margin: { key: "m", unit: "rem", layer: e.NativeShorthand, variables: ["spacing"] }, "margin-inline-start": { key: "mis", layer: e.Native, unit: "rem", variables: ["spacing"] }, "margin-inline-end": { key: "mie", layer: e.Native, unit: "rem", variables: ["spacing"] }, "margin-inline": { key: "mi", unit: "rem", layer: e.NativeShorthand, variables: ["spacing"] }, "padding-left": { key: "pl", layer: e.Native, unit: "rem", variables: ["spacing"] }, "padding-right": { key: "pr", layer: e.Native, unit: "rem", variables: ["spacing"] }, "padding-top": { key: "pt", layer: e.Native, unit: "rem", variables: ["spacing"] }, "padding-bottom": { key: "pb", layer: e.Native, unit: "rem", variables: ["spacing"] }, "padding-x": { key: "px", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "padding-left": t, "padding-right": t };
}, variables: ["spacing"] }, "padding-y": { key: "py", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "padding-top": t, "padding-bottom": t };
}, variables: ["spacing"] }, padding: { key: "p", unit: "rem", layer: e.NativeShorthand, variables: ["spacing"] }, "padding-inline-start": { key: "pis", layer: e.Native, unit: "rem", variables: ["spacing"] }, "padding-inline-end": { key: "pie", layer: e.Native, unit: "rem", variables: ["spacing"] }, "padding-inline": { key: "pi", unit: "rem", layer: e.NativeShorthand, variables: ["spacing"] }, "flex-basis": { ambiguousKeys: ["flex"], unit: "rem", layer: e.Native }, "flex-wrap": { ambiguousKeys: ["flex"], ambiguousValues: ["wrap", "nowrap", "wrap-reverse"], layer: e.Native }, "flex-grow": { ambiguousKeys: ["flex"], layer: e.Native }, "flex-shrink": { ambiguousKeys: ["flex"], layer: e.Native }, "flex-direction": { ambiguousKeys: ["flex"], ambiguousValues: ["row", "row-reverse", "column", "column-reverse"], layer: e.Native }, flex: { layer: e.NativeShorthand }, display: { key: "d", layer: e.Native }, width: { key: "w", unit: "rem", layer: e.Native }, height: { key: "h", unit: "rem", layer: e.Native }, "min-width": { key: "min-w", unit: "rem", layer: e.Native }, "min-height": { key: "min-h", unit: "rem", layer: e.Native }, size: { layer: e.Shorthand, unit: "rem", declare(t, i) {
  const s = i.length;
  return { width: i[0].text, height: s === 1 ? i[0].text : i[2].text };
} }, "min-size": { key: "min", layer: e.Shorthand, unit: "rem", declare(t, i) {
  const s = i.length;
  return { "min-width": i[0].text, "min-height": s === 1 ? i[0].text : i[2].text };
} }, "max-size": { key: "max", layer: e.Shorthand, unit: "rem", declare(t, i) {
  const s = i.length;
  return { "max-width": i[0].text, "max-height": s === 1 ? i[0].text : i[2].text };
} }, "box-sizing": { ambiguousKeys: ["box"], layer: e.Native }, "box-decoration-break": { key: "box-decoration", layer: e.Native, declare(t) {
  return { "-webkit-box-decoration-break": t, "box-decoration-break": t };
} }, contain: { layer: e.Native }, content: { layer: e.Native }, "counter-increment": { layer: e.Native }, "counter-reset": { layer: e.Native }, "letter-spacing": { key: "tracking", subkey: "ls", layer: e.Native, unit: "em" }, "line-height": { key: "leading", subkey: "line-h", layer: e.Native }, "object-fit": { ambiguousKeys: ["object", "obj"], ambiguousValues: ["contain", "cover", "fill", "scale-down"], layer: e.Native }, "object-position": { ambiguousKeys: ["object", "obj"], ambiguousValues: ["top", "bottom", "right", "left", "center"], layer: e.Native }, "text-align": { ambiguousKeys: ["text", "t"], ambiguousValues: ["justify", "center", "left", "right", "start", "end"], layer: e.Native }, "text-decoration-color": { ambiguousKeys: ["text-decoration"], ambiguousValues: [G], layer: e.Native, variables: ["text"] }, "text-decoration-style": { ambiguousKeys: ["text-decoration"], ambiguousValues: ["solid", "double", "dotted", "dashed", "wavy"], layer: e.Native }, "text-decoration-thickness": { ambiguousKeys: ["text-decoration"], ambiguousValues: ["from-font", q], layer: e.Native, unit: "em" }, "text-decoration-line": { ambiguousKeys: ["text-decoration"], ambiguousValues: ["underline", "overline", "line-through"], layer: e.Native }, "text-decoration": { ambiguousKeys: ["text", "t"], ambiguousValues: ["underline", "overline", "line-through"], unit: "rem", layer: e.NativeShorthand, variables: ["text"], declare(t) {
  return { "-webkit-text-decoration": t, "text-decoration": t };
} }, "text-underline-offset": { ambiguousKeys: ["text-underline"], unit: "rem", layer: e.Native, variables: ["spacing"] }, "text-underline-position": { ambiguousKeys: ["text-underline"], ambiguousValues: ["front-font", "under", "left", "right"], layer: e.Native }, "text-overflow": { ambiguousKeys: ["text", "t"], ambiguousValues: ["ellipsis", "clip"], layer: e.Native }, "text-orientation": { ambiguousKeys: ["text", "t"], ambiguousValues: ["mixed", "upright", "sideways-right", "sideways", "use-glyph-orientation"], layer: e.Native }, "text-transform": { ambiguousKeys: ["text", "t"], ambiguousValues: ["uppercase", "lowercase", "capitalize"], layer: e.Native }, "text-rendering": { ambiguousKeys: ["text", "t"], ambiguousValues: ["optimizeSpeed", "optimizeLegibility", "geometricPrecision"], layer: e.Native }, "text-wrap": { ambiguousKeys: ["text", "t"], ambiguousValues: ["wrap", "nowrap", "balance", "pretty"], layer: e.NativeShorthand }, "text-indent": { unit: "rem", layer: e.Native }, "vertical-align": { key: "v", subkey: "vertical", layer: e.Native }, columns: { key: "cols", layer: e.NativeShorthand }, "white-space": { layer: e.Native }, top: { layer: e.Native, unit: "rem", variables: ["spacing"] }, bottom: { layer: e.Native, unit: "rem", variables: ["spacing"] }, left: { layer: e.Native, unit: "rem", variables: ["spacing"] }, right: { layer: e.Native, unit: "rem", variables: ["spacing"] }, inset: { unit: "rem", layer: e.NativeShorthand, variables: ["spacing"] }, "max-height": { key: "max-h", unit: "rem", layer: e.Native }, "max-width": { key: "max-w", unit: "rem", layer: e.Native }, opacity: { layer: e.Native }, visibility: { layer: e.Native }, clear: { layer: e.Native }, float: { layer: e.Native }, isolation: { layer: e.Native }, "overflow-x": { layer: e.Native, declare(t) {
  return t === "overlay" ? { "overflow-x": ["auto", t] } : { "overflow-x": t };
} }, "overflow-y": { layer: e.Native, declare(t) {
  return t === "overlay" ? { "overflow-y": ["auto", t] } : { "overflow-y": t };
} }, overflow: { layer: e.NativeShorthand, declare(t) {
  return t === "overlay" ? { overflow: ["auto", t] } : { overflow: t };
} }, "overscroll-behavior-x": { layer: e.Native }, "overscroll-behavior-y": { layer: e.Native }, "overscroll-behavior": { layer: e.NativeShorthand }, "z-index": { key: "z", layer: e.Native }, position: { layer: e.Native }, cursor: { layer: e.Native }, "pointer-events": { layer: e.Native }, resize: { layer: e.Native }, "touch-action": { layer: e.Native }, "word-break": { layer: e.Native }, "word-spacing": { layer: e.Native, unit: "em" }, "user-drag": { layer: e.Native, declare(t) {
  return { "-webkit-user-drag": t, "user-drag": t };
} }, "user-select": { layer: e.Native, declare(t) {
  return { "-webkit-user-select": t, "user-select": t };
} }, "text-shadow": { unit: "rem", layer: e.Native }, "text-size": { ambiguousKeys: ["text", "t"], ambiguousValues: [q], unit: "rem", declare(t) {
  return { "font-size": t, "line-height": `calc(${t} + ${0.875}em)` };
}, layer: e.Shorthand }, "text-fill-color": { ambiguousKeys: ["text", "t"], ambiguousValues: [G], layer: e.Native, variables: ["text"], declare(t) {
  return { "-webkit-text-fill-color": t };
} }, "text-stroke-width": { ambiguousKeys: ["text-stroke"], ambiguousValues: ["thin", "medium", "thick", q], unit: "rem", layer: e.Native, declare(t) {
  return { "-webkit-text-stroke-width": t };
} }, "text-stroke-color": { ambiguousKeys: ["text-stroke"], ambiguousValues: [G], layer: e.Native, declare(t) {
  return { "-webkit-text-stroke-color": t };
} }, "text-stroke": { unit: "rem", layer: e.Native, declare(t) {
  return { "-webkit-text-stroke": t };
} }, "text-truncate": { subkey: "lines", declare(t) {
  return { display: "-webkit-box", "-webkit-box-orient": "vertical", "-webkit-line-clamp": t, overflow: "hidden", "overflow-wrap": "break-word", "text-overflow": "ellipsis" };
}, layer: e.Shorthand }, "box-shadow": { key: "shadow", subkey: "s", unit: "rem", layer: e.Native }, "table-layout": { layer: e.Native }, "transform-box": { ambiguousKeys: ["transform"], layer: e.Native }, "transform-style": { ambiguousKeys: ["transform"], ambiguousValues: ["flat", "preserve-3d"], layer: e.Native }, "transform-origin": { ambiguousKeys: ["transform"], ambiguousValues: ["top", "bottom", "right", "left", "center", q], unit: "px", layer: e.Native }, transform: { matcher: /^(?:translate|scale|skew|rotate|perspective|matrix)(?:3d|[XYZ])?\(/, layer: e.Native, analyze(t) {
  return [t.startsWith("transform") ? t.slice(10) : t];
}, unit: "px", variables: ["spacing"] }, "transition-property": { key: "~property", layer: e.Native }, "transition-timing-function": { key: "~easing", layer: e.Native }, "transition-duration": { key: "~duration", layer: e.Native, unit: "ms" }, "transition-delay": { key: "~delay", layer: e.Native, unit: "ms" }, transition: { sign: "~", analyze(t) {
  if (t.startsWith("~")) return [t.slice(1)];
  {
    const i = t.indexOf(":");
    return this.keyToken = t.slice(0, i + 1), [t.slice(i + 1)];
  }
}, layer: e.NativeShorthand }, "animation-delay": { key: "@delay", layer: e.Native, unit: "ms" }, "animation-direction": { key: "@direction", layer: e.Native }, "animation-duration": { key: "@duration", layer: e.Native, unit: "ms" }, "animation-fill-mode": { key: "@fill", layer: e.Native }, "animation-iteration-count": { key: "@iteration", layer: e.Native }, "animation-name": { key: "@name", layer: e.Native, includeAnimations: true }, "animation-play-state": { key: "@play", layer: e.Native }, "animation-timing-function": { key: "@easing", layer: e.Native }, animation: { sign: "@", layer: e.NativeShorthand, includeAnimations: true, analyze(t) {
  if (t.startsWith("@")) return [t.slice(1)];
  {
    const i = t.indexOf(":");
    return this.keyToken = t.slice(0, i + 1), [t.slice(i + 1)];
  }
} }, "border-collapse": { ambiguousKeys: ["b", "border"], ambiguousValues: ["collapse", "separate"], layer: e.Native }, "border-spacing": { unit: "rem", layer: e.Native, variables: ["spacing"] }, "border-top-color": { ambiguousKeys: ["bt", "border-top"], ambiguousValues: [G], layer: e.Native, variables: ["frame"] }, "border-bottom-color": { ambiguousKeys: ["bb", "border-bottom"], ambiguousValues: [G], layer: e.Native, variables: ["frame"] }, "border-left-color": { ambiguousKeys: ["bl", "border-left"], ambiguousValues: [G], layer: e.Native, variables: ["frame"] }, "border-right-color": { ambiguousKeys: ["br", "border-right"], ambiguousValues: [G], layer: e.Native, variables: ["frame"] }, "border-x-color": { ambiguousKeys: ["bx", "border-x"], ambiguousValues: [G], layer: e.Shorthand, variables: ["frame"], declare(t) {
  return { "border-left-color": t, "border-right-color": t };
} }, "border-y-color": { ambiguousKeys: ["by", "border-y"], ambiguousValues: [G], layer: e.Shorthand, variables: ["frame"], declare(t) {
  return { "border-top-color": t, "border-bottom-color": t };
} }, "border-color": { ambiguousKeys: ["b", "border"], ambiguousValues: [G], layer: e.NativeShorthand, variables: ["frame"] }, "border-top-left-radius": { key: "rtl", unit: "rem", layer: e.Native }, "border-top-right-radius": { key: "rtr", unit: "rem", layer: e.Native }, "border-bottom-left-radius": { key: "rbl", unit: "rem", layer: e.Native }, "border-bottom-right-radius": { key: "rbr", unit: "rem", layer: e.Native }, "border-top-radius": { key: "rt", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "border-top-left-radius": t, "border-top-right-radius": t };
} }, "border-bottom-radius": { key: "rb", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "border-bottom-left-radius": t, "border-bottom-right-radius": t };
} }, "border-left-radius": { key: "rl", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "border-top-left-radius": t, "border-bottom-left-radius": t };
} }, "border-right-radius": { key: "rr", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "border-top-right-radius": t, "border-bottom-right-radius": t };
} }, "border-radius": { key: "r", unit: "rem", layer: e.NativeShorthand }, "border-top-style": { ambiguousKeys: ["bt", "border-top"], ambiguousValues: H, layer: e.Native }, "border-bottom-style": { ambiguousKeys: ["bb", "border-bottom"], ambiguousValues: H, layer: e.Native }, "border-left-style": { ambiguousKeys: ["bl", "border-left"], ambiguousValues: H, layer: e.Native }, "border-right-style": { ambiguousKeys: ["br", "border-right"], ambiguousValues: H, layer: e.Native }, "border-x-style": { ambiguousKeys: ["bx", "border-x"], ambiguousValues: H, layer: e.Shorthand, declare(t) {
  return { "border-left-style": t, "border-right-style": t };
} }, "border-y-style": { ambiguousKeys: ["by", "border-y"], ambiguousValues: H, layer: e.Shorthand, declare(t) {
  return { "border-top-style": t, "border-bottom-style": t };
} }, "border-style": { ambiguousKeys: ["b", "border"], ambiguousValues: H, layer: e.NativeShorthand }, "border-top-width": { ambiguousKeys: ["bt", "border-top"], ambiguousValues: [q], unit: "rem", layer: e.Native }, "border-bottom-width": { ambiguousKeys: ["bb", "border-bottom"], ambiguousValues: [q], unit: "rem", layer: e.Native }, "border-left-width": { ambiguousKeys: ["bl", "border-left"], ambiguousValues: [q], unit: "rem", layer: e.Native }, "border-right-width": { ambiguousKeys: ["br", "border-right"], ambiguousValues: [q], unit: "rem", layer: e.Native }, "border-x-width": { ambiguousKeys: ["bx", "border-x"], ambiguousValues: [q], unit: "rem", layer: e.Shorthand, declare(t) {
  return { "border-left-width": t, "border-right-width": t };
} }, "border-y-width": { ambiguousKeys: ["by", "border-y"], ambiguousValues: [q], unit: "rem", layer: e.Shorthand, declare(t) {
  return { "border-top-width": t, "border-bottom-width": t };
} }, "border-width": { ambiguousKeys: ["b", "border"], ambiguousValues: [q], unit: "rem", layer: e.NativeShorthand }, "border-image-repeat": { ambiguousKeys: ["border-image"], ambiguousValues: ["stretch", "repeat", "round", "space"], layer: e.Native }, "border-image-slice": { ambiguousKeys: ["border-image"], layer: e.Native }, "border-image-source": { ambiguousKeys: ["border-image"], ambiguousValues: [fe], layer: e.Native }, "border-image-width": { ambiguousKeys: ["border-image"], ambiguousValues: ["auto", q], unit: "rem", layer: e.Native }, "border-image-outset": { ambiguousKeys: ["border-image"], ambiguousValues: [q], unit: "rem", layer: e.Native }, "border-image": { layer: e.NativeShorthand }, "border-top": { key: "bt", layer: e.NativeShorthand, unit: "rem", transformValueComponents: D, variables: ["frame"] }, "border-bottom": { key: "bb", layer: e.NativeShorthand, unit: "rem", transformValueComponents: D, variables: ["frame"] }, "border-left": { key: "bl", layer: e.NativeShorthand, unit: "rem", transformValueComponents: D, variables: ["frame"] }, "border-right": { key: "br", layer: e.NativeShorthand, unit: "rem", transformValueComponents: D, variables: ["frame"] }, "border-x": { key: "bx", unit: "rem", layer: e.Shorthand, transformValueComponents: D, variables: ["frame"], declare(t) {
  return { "border-left": t, "border-right": t };
} }, "border-y": { key: "by", unit: "rem", layer: e.Shorthand, transformValueComponents: D, variables: ["frame"], declare(t) {
  return { "border-top": t, "border-bottom": t };
} }, border: { key: "b", unit: "rem", layer: e.NativeShorthand, transformValueComponents: D, variables: ["frame"] }, "background-attachment": { ambiguousKeys: ["bg"], ambiguousValues: ["fixed", "local", "scroll"], layer: e.Native }, "background-blend-mode": { key: "bg-blend", layer: e.Native }, "background-color": { ambiguousKeys: ["bg"], ambiguousValues: [G], layer: e.Native }, "background-clip": { key: "bg-clip", layer: e.Native, declare(t) {
  return { "-webkit-background-clip": t, "background-clip": t };
} }, "background-origin": { key: "bg-origin", layer: e.Native }, "background-position": { ambiguousKeys: ["bg"], ambiguousValues: ["top", "bottom", "right", "left", "center"], layer: e.Native, unit: "px" }, "background-repeat": { ambiguousKeys: ["bg"], ambiguousValues: ["space", "round", "repeat", "no-repeat", "repeat-x", "repeat-y"], layer: e.Native }, "background-size": { ambiguousKeys: ["bg"], ambiguousValues: ["auto", "cover", "contain", q], unit: "rem", layer: e.Native }, "background-image": { ambiguousKeys: ["bg"], ambiguousValues: [fe], layer: e.Native }, background: { key: "bg", layer: e.NativeShorthand }, gradient: { matcher: /^gradient\(/, layer: e.Shorthand, declare(t) {
  return { "background-image": "linear-" + t };
} }, "mix-blend-mode": { key: "blend", layer: e.Native }, "backdrop-filter": { key: "bd", layer: e.Native, declare(t) {
  return { "-webkit-backdrop-filter": t, "backdrop-filter": t };
} }, filter: { matcher: /^(?:blur|brightness|contrast|drop-shadow|grayscale|hue-rotate|invert|opacity|saturate|sepia)\(/, layer: e.Native }, fill: { layer: e.Native }, "stroke-dasharray": { layer: e.Native }, "stroke-dashoffset": { layer: e.Native, variables: ["spacing"] }, "stroke-width": { ambiguousKeys: ["stroke"], ambiguousValues: [q], layer: e.Native }, stroke: { layer: e.Native }, x: { layer: e.Native, variables: ["spacing"] }, y: { layer: e.Native, variables: ["spacing"] }, cx: { layer: e.Native, variables: ["spacing"] }, cy: { layer: e.Native, variables: ["spacing"] }, rx: { layer: e.Native }, ry: { layer: e.Native }, "grid-column-start": { key: "grid-col-start", layer: e.Native }, "grid-column-end": { key: "grid-col-end", layer: e.Native }, "grid-column-span": { key: "grid-col-span", layer: e.Shorthand, transformValue(t) {
  return "span " + t + "/span " + t;
}, declare(t) {
  return { "grid-column": t };
} }, "grid-column": { key: "grid-col", layer: e.NativeShorthand }, "grid-columns": { key: "grid-cols", declare(t) {
  return { display: "grid", "grid-template-columns": "repeat(" + t + ",minmax(0,1fr))" };
}, layer: e.Shorthand }, "grid-row-start": { layer: e.Native }, "grid-row-end": { layer: e.Native }, "grid-row-span": { layer: e.Shorthand, transformValue(t) {
  return "span " + t + "/span " + t;
}, declare(t) {
  return { "grid-row": t };
} }, "grid-row": { layer: e.NativeShorthand }, "grid-rows": { declare(t) {
  return { display: "grid", "grid-auto-flow": "column", "grid-template-rows": "repeat(" + t + ",minmax(0,1fr))" };
}, layer: e.Shorthand }, "grid-auto-columns": { key: "grid-auto-cols", layer: e.Native }, "grid-auto-flow": { key: "grid-flow", layer: e.Native }, "grid-auto-rows": { layer: e.Native }, "grid-template-areas": { layer: e.Native }, "grid-template-columns": { key: "grid-template-cols", layer: e.Native, unit: "rem" }, "grid-template-rows": { layer: e.Native, unit: "rem" }, "grid-template": { layer: e.NativeShorthand }, "grid-area": { layer: e.NativeShorthand }, grid: { layer: e.NativeShorthand }, "column-gap": { key: "gap-x", unit: "rem", layer: e.Native, variables: ["spacing"] }, "row-gap": { key: "gap-y", unit: "rem", layer: e.Native, variables: ["spacing"] }, gap: { unit: "rem", layer: e.NativeShorthand, variables: ["spacing"] }, order: { key: "o", layer: e.Native }, "break-inside": { layer: e.Native }, "break-before": { layer: e.Native }, "break-after": { layer: e.Native }, "aspect-ratio": { key: "aspect", layer: e.Native }, "column-span": { key: "col-span", layer: e.Native }, "align-content": { subkey: "ac", layer: e.Native }, "align-items": { subkey: "ai", layer: e.Native }, "align-self": { subkey: "as", layer: e.Native }, "justify-content": { subkey: "jc", layer: e.Native }, "justify-items": { subkey: "ji", layer: e.Native }, "justify-self": { subkey: "js", layer: e.Native }, "place-content": { layer: e.NativeShorthand }, "place-items": { layer: e.NativeShorthand }, "place-self": { layer: e.NativeShorthand }, "list-style-position": { ambiguousKeys: ["list-style"], ambiguousValues: ["inside", "outside"], layer: e.Native }, "list-style-type": { ambiguousKeys: ["list-style"], ambiguousValues: ["disc", "decimal"], layer: e.Native }, "list-style-image": { ambiguousKeys: ["list-style"], ambiguousValues: [fe], layer: e.Native }, "list-style": { layer: e.NativeShorthand }, "outline-color": { ambiguousKeys: ["outline"], ambiguousValues: [G], layer: e.Native, variables: ["frame"] }, "outline-offset": { unit: "rem", layer: e.Native, variables: ["spacing"] }, "outline-style": { ambiguousKeys: ["outline"], ambiguousValues: H, layer: e.Native }, "outline-width": { ambiguousKeys: ["outline"], ambiguousValues: ["medium", "thick", "thin", q], unit: "rem", layer: e.Native }, outline: { unit: "rem", layer: e.NativeShorthand, variables: ["outline-width", "outline-style", "outline-offset", "outline-color", "frame"], transformValueComponents: D }, "accent-color": { key: "accent", layer: e.Native }, appearance: { layer: e.Native }, "caret-color": { key: "caret", layer: e.Native, variables: ["text"] }, "scroll-behavior": { layer: e.Native }, "scroll-margin-left": { key: "scroll-ml", layer: e.Native, unit: "rem", variables: ["spacing"] }, "scroll-margin-right": { key: "scroll-mr", layer: e.Native, unit: "rem", variables: ["spacing"] }, "scroll-margin-top": { key: "scroll-mt", layer: e.Native, unit: "rem", variables: ["spacing"] }, "scroll-margin-bottom": { key: "scroll-mb", layer: e.Native, unit: "rem", variables: ["spacing"] }, "scroll-margin-x": { key: "scroll-mx", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "scroll-margin-left": t, "scroll-margin-right": t };
}, variables: ["spacing"] }, "scroll-margin-y": { key: "scroll-my", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "scroll-margin-top": t, "scroll-margin-bottom": t };
}, variables: ["spacing"] }, "scroll-margin": { key: "scroll-m", unit: "rem", layer: e.NativeShorthand, variables: ["spacing"] }, "scroll-padding-left": { key: "scroll-pl", layer: e.Native, unit: "rem", variables: ["spacing"] }, "scroll-padding-right": { key: "scroll-pr", layer: e.Native, unit: "rem", variables: ["spacing"] }, "scroll-padding-top": { key: "scroll-pt", layer: e.Native, unit: "rem", variables: ["spacing"] }, "scroll-padding-bottom": { key: "scroll-pb", layer: e.Native, unit: "rem", variables: ["spacing"] }, "scroll-padding-x": { key: "scroll-px", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "scroll-padding-left": t, "scroll-padding-right": t };
}, variables: ["spacing"] }, "scroll-padding-y": { key: "scroll-py", unit: "rem", layer: e.Shorthand, declare(t) {
  return { "scroll-padding-top": t, "scroll-padding-bottom": t };
}, variables: ["spacing"] }, "scroll-padding": { key: "scroll-p", unit: "rem", layer: e.NativeShorthand, variables: ["spacing"] }, "scroll-snap-align": { ambiguousKeys: ["scroll-snap"], ambiguousValues: ["start", "end", "center"], layer: e.Native }, "scroll-snap-stop": { ambiguousKeys: ["scroll-snap"], ambiguousValues: ["normal", "always"], layer: e.Native }, "scroll-snap-type": { ambiguousKeys: ["scroll-snap"], ambiguousValues: ["x", "y", "block", "inline", "both"], layer: e.Native }, "will-change": { layer: e.Native }, "writing-mode": { key: "writing", layer: e.Native }, direction: { layer: e.Native }, "shape-outside": { ambiguousKeys: ["shape"], ambiguousValues: [/(?:inset|circle|ellipse|polygon|url|linear-gradient)\(.*\)/], layer: e.Native }, "shape-margin": { ambiguousKeys: ["shape"], ambiguousValues: [q], unit: "rem", layer: e.Native, variables: ["spacing"] }, "shape-image-threshold": { layer: e.Native }, "clip-path": { key: "clip", layer: e.Native }, quotes: { layer: e.Native }, "mask-image": { layer: e.Native, declare(t) {
  return { "-webkit-mask-image": t, "mask-image": t };
} } }, Te = { dark: "class", light: "class" }, he = { $: { transform(t) {
  let i, s;
  const o = t.indexOf(",");
  return o !== -1 ? (i = t.slice(0, o), s = t.slice(o + 1)) : i = t, [{ type: "variable", name: i, fallback: s, token: t }];
} }, calc: { transform(t, i) {
  const s = [];
  let o = 0;
  const n = (r, y, h, p, g) => {
    var _a;
    const b = s !== r, k = [];
    let d = false, c = false, m = false, f = false, l, a = "";
    const u = (N, V = "", R = "") => {
      if (l === false && N !== " " && this.definition.unit && (l = void 0, f || w()), a) {
        if (!g) {
          const A = xe.exec(a);
          A && (a = (+A[1] * (this.css.config.baseUnit ?? 1)).toString());
        }
        if (!d && !h) {
          const A = { ...this.parseValue(a), token: a };
          if (!c && isNaN(+a) && A.type === "number" && (c = true), f) isNaN(+a) ? A.type === "number" ? (r.push(A), m = true) : r.push(A) : r.push({ type: "number", value: +a, token: a });
          else if (b) {
            const _ = { type: "string", value: a, token: a };
            k.push(_), r.push(_);
          } else r.push(A);
        } else r.push({ type: "string", value: a, token: a });
        a = "";
      }
      N && ((N === "+" || N === "-") && v(), V && t[o - 1] === " " && (V = ""), R && t[o + 1] === " " && (R = ""), y ? r.push({ type: "separator", value: N, text: N, token: N }) : r.push({ type: "separator", value: N, text: V + N + R, token: N })), d = false;
    }, w = () => {
      (this.definition.unit === "rem" || this.definition.unit === "em") && r.push({ type: "separator", value: "/", text: " / ", token: "/" }, { type: "number", value: this.css.config.rootSize, token: String(this.css.config.rootSize) }), r.push({ type: "separator", value: "*", text: " * ", token: "*" }, { type: "number", value: 1, unit: this.definition.unit, token: this.definition.unit });
    }, v = () => {
      f && !m && !p && (!b || c) && w(), f = false, m = false;
    };
    for (; o < t.length; o++) {
      const N = t[o];
      if (N === "(") {
        const V = /^([+-])/.exec(a);
        V && r.push({ type: "string", value: V[1], token: V[1] });
        const R = V ? a.slice(1) : a, A = { type: "function", name: R, symbol: N, children: [], bypassTransform: R === "calc", token: a };
        r.push(A), a = "", o++;
        const _ = R === "$" || R === "var";
        if (l = n(A.children, R !== "" && R !== "calc" && (_ || Object.prototype.hasOwnProperty.call(he, R)), d || _ || f && m, f, _) || R === "var", !l && R === "$") {
          const L = (_a = this.css.variables[A.children[0].value]) == null ? void 0 : _a.type;
          l = !L || L === "string";
        }
        l && (c = true, m = true);
      } else if (N === ")") {
        if (u(""), c) for (const V of k) Object.assign(V, this.parseValue(V.value));
        return c;
      } else if (N === ",") u(N, "", " ");
      else if (N === " ") u(N);
      else {
        const V = t[o - 1];
        switch (N) {
          case "+":
            !a && V !== ")" ? a += N : u(N, " ", " ");
            break;
          case "-":
            !a && V !== ")" ? a += N : u(N, " ", " ");
            break;
          case "*":
            this.definition.unit && (f = true), u(N, " ", " ");
            break;
          case "/":
            this.definition.unit && (f = true), u(N, " ", " "), d = true;
            break;
          default:
            a += N;
            break;
        }
      }
    }
    u(""), v();
  };
  return n(s, false, false, false, false), "calc(" + this.resolveValue(s, he.calc.unit ?? this.definition.unit, i, true) + ")";
} }, translate: { unit: "rem" }, translateX: { unit: "rem" }, translateY: { unit: "rem" }, translateZ: { unit: "rem" }, translate3d: { unit: "rem" }, skew: { unit: "deg" }, skewX: { unit: "deg" }, skewY: { unit: "deg" }, skewZ: { unit: "deg" }, skew3d: { unit: "deg" }, rotate: { unit: "deg" }, rotateX: { unit: "deg" }, rotateY: { unit: "deg" }, rotateZ: { unit: "deg" }, rotate3d: { unit: "deg" }, blur: { unit: "rem" }, "drop-shadow": { unit: "rem" }, "hue-rotate": { unit: "deg" }, rgb: { unit: "" }, rgba: { unit: "" }, hsl: { unit: "" }, hsla: { unit: "" }, color: { unit: "" }, "color-contrast": { unit: "" }, "color-mix": { unit: "" }, hwb: { unit: "" }, lab: { unit: "" }, lch: { unit: "" }, oklab: { unit: "" }, oklch: { unit: "" }, clamp: { unit: "" }, repeat: { unit: "" }, "linear-gradient": {}, "radial-gradient": {}, "conic-gradient": {}, "repeating-linear-gradient": {}, "repeating-radial-gradient": {}, "repeating-conic-gradient": {}, matrix: { unit: "" }, matrix3d: { unit: "" }, scale: { unit: "" }, scale3d: { unit: "" }, scaleX: { unit: "" }, scaleY: { unit: "" }, scaleZ: { unit: "" } }, oe = { at: we, selectors: $e, utilities: Se, syntaxes: Ee, functions: he, animations: Re, variables: je, modes: Te, scope: "", rootSize: 16, baseUnit: 4, override: false, important: false, defaultMode: "light" };
class Ae {
  constructor(i, s, o) {
    __publicField(this, "className");
    __publicField(this, "RegisteredRule");
    __publicField(this, "css");
    __publicField(this, "at");
    __publicField(this, "priority");
    __publicField(this, "natives");
    __publicField(this, "order");
    __publicField(this, "layer");
    __publicField(this, "declarations");
    __publicField(this, "animationNames");
    __publicField(this, "variableNames");
    __publicField(this, "resolveValue");
    __publicField(this, "parseValues");
    this.className = i, this.RegisteredRule = s, this.css = o, this.at = {}, this.priority = -1, this.natives = [], this.order = 0, this.layer = 0, this.resolveValue = (O, $, j, P) => {
      const { functions: B } = this.css.config;
      let U = "";
      for (const x of O) switch (x.type) {
        case "function":
          const M = B && B[x.name];
          if ((M == null ? void 0 : M.transform) && !x.bypassTransform) {
            const K = M.transform.call(this, this.resolveValue(x.children, M.unit ?? $, j, P || x.name === "calc"), j);
            U += x.token = x.text = typeof K == "string" ? K : this.resolveValue(K, (M == null ? void 0 : M.unit) ?? $, j, P);
          } else U += x.token = x.text = x.name + x.symbol + this.resolveValue(x.children, (M == null ? void 0 : M.unit) ?? $, j, P) + se[x.symbol];
          break;
        case "variable":
          const S = this.css.variables[x.name];
          if (S) {
            const K = (E, T) => {
              if (S.modes) if (this.mode) {
                const W = S.modes[this.mode] ?? S;
                (W == null ? void 0 : W.value) && E(W);
              } else this.variableNames || (this.variableNames = []), this.variableNames.includes(x.name) || this.variableNames.push(x.name), T();
              else E(S);
            };
            switch (S.type) {
              case "string":
                K((T) => {
                  const W = [];
                  this.parseValues(W, 0, T.value, $, "", void 0, P, [...j, x.name]), U += x.text = this.resolveValue(W, $, [...j, x.name], P);
                }, () => {
                  U += x.text = `var(--${x.name})`;
                });
                break;
              case "number":
                K((T) => {
                  if (P) U += x.text = String(T.value);
                  else {
                    const W = this.parseValue(T.value, $);
                    U += x.text = W.value + (W.unit ?? "");
                  }
                }, () => {
                  U += x.text = $ ? `calc(var(--${x.name}) / 16 * 1rem)` : `var(--${x.name})`;
                });
                break;
              case "color":
                const E = x.alpha ? "/" + x.alpha : "";
                K((T) => {
                  U += x.text = `${T.space}(${T.value}${E})`;
                }, () => {
                  U += x.text = `${S.space}(var(--${x.name})${E})`;
                });
                break;
            }
          } else U += x.text = `var(--${x.name}${x.fallback ? "," + x.fallback : ""})`;
          break;
        case "separator":
          U += x.text ? x.text : x.text = x.value;
          break;
        case "number":
          U += x.text = x.value + (x.unit || "");
          break;
        default:
          U += x.text = x.value;
          break;
      }
      return U;
    }, this.parseValues = (O, $, j, P, B, U, x = false, M = []) => {
      var _a, _b;
      const S = U === void 0, K = !S && (U.endsWith("$") || U.endsWith("var")), T = /* @__PURE__ */ ((z) => z === "'" || z === '"')(B), W = [","];
      ((_a = this.definition.separators) == null ? void 0 : _a.length) && W.push(...this.definition.separators);
      let C = "";
      const F = () => {
        if (C) {
          let z = false;
          if (!K || O.length) {
            const X = (Y, ee) => {
              const ye = Object.prototype.hasOwnProperty.call(this.variables, Y) ? this.variables[Y] : Object.prototype.hasOwnProperty.call(this.css.variables, Y) ? this.css.variables[Y] : void 0;
              if (ye) {
                const ue = ye.name ?? Y;
                if (!M.includes(ue)) {
                  z = true;
                  const me = { type: "variable", name: ue, variable: this.css.variables[ue], token: C };
                  ee && (me.alpha = ee), O.push(me);
                }
              }
            };
            if (X(C), !z) {
              const [Y, ee] = C.split("/");
              X(Y, ee);
            }
          }
          if (!z) {
            if (!K) {
              const X = xe.exec(C);
              X && (C = String(+X[1] * (this.css.config.baseUnit ?? 1)));
            }
            x ? O.push({ type: "string", value: C, token: C }) : O.push({ ...this.parseValue(C, P), token: C });
          }
          C = "";
        }
      };
      for (; $ < j.length; $++) {
        const z = j[$];
        if (z === B) {
          if (T) {
            let X = 0;
            for (let Y = C.length - 1; C[Y] === "\\"; Y--) X++;
            if (X % 2) {
              C += z;
              continue;
            } else F();
          } else F();
          return $;
        } else if (!T && z in se) {
          const X = C, Y = { type: "function", name: X, symbol: z, children: [], token: "" };
          O.push(Y), C = "";
          const ee = z === "(" ? (_b = this.css.config.functions) == null ? void 0 : _b[X] : void 0;
          $ = this.parseValues(Y.children, ++$, j, (ee == null ? void 0 : ee.unit) ?? P, se[z], X || U || "", x || X === "calc");
        } else if ((z === "|" || z === " ") && B !== "}" && (!T || U === "path")) F(), O.push({ type: "separator", value: " ", token: z });
        else {
          if (!T) {
            if (z === ".") if (isNaN(+j[$ + 1])) {
              if (S) break;
            } else j[$ - 1] === "-" && (C += "0");
            else if (W.includes(z)) {
              F(), O.push({ type: "separator", value: z, text: (z === "," ? "" : " ") + z + (z === "," ? "" : " "), token: z });
              continue;
            } else if (S && (z === "#" && (C || O.length && O[O.length - 1].type !== "separator") || ["!", "*", ">", "+", "~", ":", "[", "@", "_"].includes(z))) break;
          }
          C += z;
        }
      }
      return F(), $;
    }, Object.assign(this, s);
    const { id: n, definition: r } = s, { analyze: y, transformValue: h, declare: p, transformValueComponents: g, create: b, layer: k, unit: d } = r;
    this.layer = k, r.unit || (r.unit = ""), r.separators || (r.separators = [","]);
    const { scope: c, important: m, modes: f } = o.config, { selectors: l, at: a, stylesBy: u, animations: w } = o, v = u[i];
    b && b.call(this, i), this.declarations = r.declarations;
    let N, V;
    if (k === e.Utility) N = i.slice(n.length - 1);
    else {
      let O;
      if (y) [O, V] = y.call(this, i);
      else {
        const j = i.indexOf(":");
        this.keyToken = i.slice(0, j + 1), O = i.slice(j + 1);
      }
      this.valueComponents = [];
      const $ = this.parseValues(this.valueComponents, 0, O, d, "", void 0, false, r.includeAnimations ? Object.keys(this.css.animations) : []);
      this.valueToken = O.slice(0, $), N = O.slice($);
    }
    N[0] === "!" && (this.important = true, N = N.slice(1)), this.stateToken = N;
    const R = (O, $) => {
      const j = (S, K, E, T) => {
        for (const [W, C] of K) if (W.test(S)) {
          for (const F of C) j(S.replace(W, F), K, E, true);
          return;
        }
        T && E.push(S);
      }, P = (S) => {
        const K = S.split(/(\\'(?:.*?)[^\\]\\')(?=[*_>~+,)])|(\[[^=]+='(?:.*?)[^\\]'\])/).map((C, F) => F % 3 ? C : C.replace(/(^|[^_])_(?!_)/g, "$1 ")).join(""), E = [];
        let T = "", W = 0;
        for (let C = 0; C < K.length; C++) {
          const F = K[C];
          if (F === "\\") {
            T += F + K[++C];
            continue;
          }
          !W && F === "," ? (E.push(T), T = "") : (T += F, W && F === ")" ? W-- : F === "(" && W++);
        }
        return T && E.push(T), E;
      }, B = [];
      "" in l ? j(O, l[""], B, true) : B.push(O);
      const U = {};
      for (const [S, K] of Object.entries(l)) {
        if (!S) continue;
        const E = [];
        for (const T of B) j(T, K, E, false);
        E.length && (U[S] = E);
      }
      const x = (S, K) => {
        const E = K.reduce((T, W) => (T.push(...P(W)), T), []);
        S in $ ? $[S].push(...E) : $[S] = E;
      }, M = Object.keys(U);
      if (M.length) for (const S of M) x(S, U[S]);
      else x("", B);
    };
    V ? (this.vendorPrefixSelectors = {}, R(V, this.vendorPrefixSelectors)) : this.vendorPrefixSelectors = { "": [""] };
    const A = N.split("@"), _ = A[0];
    if (_) {
      this.vendorSuffixSelectors = {}, R(_, this.vendorSuffixSelectors);
      for (const O of Object.values(this.vendorSuffixSelectors)) for (const $ of O) {
        this.hasWhere !== false && (this.hasWhere = $.includes(":where("));
        const j = [":disabled", ":active", ":focus", ":hover"];
        for (let P = 0; P < j.length; P++) if ($.includes(j[P])) {
          (this.priority === -1 || this.priority > P) && (this.priority = P);
          break;
        }
      }
    } else this.vendorSuffixSelectors = { "": [""] };
    const L = {}, I = Object.prototype.hasOwnProperty.call(this.vendorPrefixSelectors, ""), J = Object.prototype.hasOwnProperty.call(this.vendorSuffixSelectors, "");
    if (I) L[""] = J ? [""] : Object.keys(this.vendorSuffixSelectors);
    else if (J) for (const O in this.vendorPrefixSelectors) L[O] = [""];
    else for (const O in this.vendorPrefixSelectors) {
      const $ = L[O] = [];
      if (Object.prototype.hasOwnProperty.call(this.vendorSuffixSelectors, O)) $.push(O);
      else for (const j in this.vendorSuffixSelectors) $.push(j);
    }
    for (let O = 1; O < A.length; O++) {
      const $ = A[O];
      if (this.atToken = (this.atToken || "") + "@" + $, $) if ($ === "rtl" || $ === "ltr") this.direction = $;
      else {
        let j;
        const P = [], B = /^(media|supports|container|layer)/, U = B.exec($);
        if (U) j = U[1], P.push({ type: "arbitrary", token: $, value: $.slice(j.length).replace(/\|/g, " ") });
        else {
          const x = (S) => {
            if (S === "&") P.push({ type: "operator", token: S, value: "and" });
            else if (S.startsWith("")) {
              const K = a[S];
              if (K && typeof K == "string") {
                const E = K.match(B);
                if (j = E ? E[1] : "", !j) throw new Error(`Invalid query '${S}': '${K}'`);
                P.push({ type: "arbitrary", value: K.slice(E ? E[1].length + 1 : 0) });
              } else {
                j = "media";
                let E = "", T = "", W = 0;
                S.startsWith("<=") ? (T = "<=", E = "max-width") : S.startsWith(">") && !S.startsWith(">=") ? (T = ">", E = "min-width", W = 0.02) : S.startsWith("<") ? (T = "<", E = "max-width", W = -0.02) : (S.startsWith(">=") || K) && (T = ">=", E = "min-width");
                const C = T ? S.replace(T, "") : S, F = a[C];
                switch (E) {
                  case "max-width":
                  case "min-width":
                    if (typeof F == "number") P.push({ type: "feature", name: E, valueType: "number", value: F + W, unit: "px" });
                    else {
                      const z = this.parseValue(C, "px");
                      z.type === "number" ? P.push({ type: "feature", name: E, valueType: "number", value: z.value + W, unit: z.unit }) : P.push({ type: "feature", name: E, valueType: "string", value: C });
                    }
                    break;
                }
              }
            }
          }, M = $.includes("&");
          if (M) {
            const S = $.split(/(&|,)/);
            for (const K of S) x(K);
          } else x($);
          if (!P.length && !M && (f == null ? void 0 : f[$])) {
            this.mode = $;
            continue;
          }
        }
        j && (this.at[j] = P);
      }
    }
    let Z;
    this.valueComponents && (g && (this.valueComponents = g.call(this, this.valueComponents)), Z = this.resolveValue(this.valueComponents, d, [], false), h && (Z = h.call(this, Z)), p ? this.declarations = p.call(this, Z, this.valueComponents) : n && (this.declarations = { [n]: Z }));
    const Q = [];
    for (const O in this.declarations) {
      const $ = (B) => {
        if (w && (B.startsWith("animation") || B.startsWith("animation-name"))) {
          const U = B.split(":")[1].split("!important")[0].split(" ").filter((x) => x in this.css.animations && (!this.animationNames || !this.animationNames.includes(x)));
          U.length && (this.animationNames || (this.animationNames = []), this.animationNames = U);
        }
        Q.push(B + ((this.important || m) && !B.endsWith("!important") ? "!important" : ""));
      }, j = O + ":", P = this.declarations[O];
      if (Array.isArray(P)) for (const B of P) $(j + String(B));
      else $(j + String(P));
    }
    if (Q.length) for (const O in L) for (const $ of L[O]) {
      let j = "";
      this.direction && (j += "[dir=" + this.direction + "] ");
      const P = this.vendorPrefixSelectors[O], B = this.vendorSuffixSelectors[$], U = P.map((S) => S + j), x = (S) => U.map((K) => (this.mode && (f == null ? void 0 : f[this.mode]) !== "media" ? (f == null ? void 0 : f[this.mode]) === "host" ? `:host(.${this.mode}) ` : `.${this.mode} ` : "") + (c ? c + " " : "") + K).reduce((K, E) => (K.push(B.reduce((T, W) => (T.push(E + "." + ke(S) + W), T), []).join(",")), K), []).join(",");
      let M = x(i) + (v ? v.reduce((S, K) => S + "," + x(K), "") : "") + "{" + Q.join(";") + "}";
      for (const S of Object.keys(this.at).sort((K, E) => E === "supports" ? -1 : 1)) M = "@" + S + (S.includes(" ") ? "" : " ") + this.at[S].map((K) => this.resolveAtComponent(K)).join(" ") + "{" + M + "}";
      this.mode && (f == null ? void 0 : f[this.mode]) === "media" && (M = `@media(prefers-color-scheme:${this.mode}){` + M + "}"), this.natives.push({ text: M });
    }
  }
  resolveAtComponent(i) {
    switch (i.type) {
      case "arbitrary":
        return i.value;
      case "feature":
        return "(" + i.name + ":" + i.value + (i.unit || "") + ")";
      case "operator":
        return i.value;
    }
  }
  get text() {
    return this.natives.map((i) => i.text).join("");
  }
  parseValue(i, s = this.definition.unit) {
    const o = s ?? this.definition.unit;
    let n = "", r;
    if (typeof i == "number") return o && !n ? ((o === "rem" || o === "em") && (r = i / (this.css.config.rootSize || 1)), n = o || "") : r = i, { value: r, unit: n, type: "number" };
    if (o) {
      if (/^\d+\/\d+/.test(i)) {
        const [h, p] = i.split("/");
        return { value: +h / +p * 100, unit: "%", type: "number" };
      }
      const y = i.match(Ke);
      if (y) return r = +y[1], n = y[3] || "", n || ((o === "rem" || o === "em") && (r = r / (this.css.config.rootSize || 1)), n = o || ""), { value: r, unit: n, type: "number" };
    }
    return { value: i, type: "string" };
  }
}
function Ce(t) {
  t.startsWith("#") && (t = t.slice(1));
  let i, s, o, n;
  return t.length === 3 || t.length === 4 ? (i = parseInt(t[0] + t[0], 16), s = parseInt(t[1] + t[1], 16), o = parseInt(t[2] + t[2], 16), n = t.length === 4 ? Math.round(parseInt(t[3] + t[3], 16) / 255 * 100) / 100 : 1) : (t.length === 6 || t.length === 8) && (i = parseInt(t.slice(0, 2), 16), s = parseInt(t.slice(2, 4), 16), o = parseInt(t.slice(4, 6), 16), n = t.length === 8 ? Math.round(parseInt(t.slice(6, 8), 16) / 255 * 100) / 100 : 1), [i, s, o, n];
}
function ne(t, i = "") {
  return Object.entries(t).reduce((s, [o, n]) => {
    const r = i ? `${i}${o ? "-" + o : ""}` : o;
    return typeof n == "object" && !Array.isArray(n) ? Object.assign(s, ne(n, r)) : s[r] = n, s;
  }, {});
}
function re(...t) {
  const i = (n) => {
    const r = ie({}, n), y = (h) => {
      for (const p in h) {
        const g = h[p];
        typeof g == "object" && !Array.isArray(g) ? y(g) : p && !p.startsWith("@") && (h[p] = { "": g });
      }
    };
    return r.styles && y(r.styles), r.at && y(r.at), r.variables && y(r.variables), r;
  }, s = [];
  for (const n of t) n && function r(y) {
    var _a;
    if ((_a = y.extends) == null ? void 0 : _a.length) for (const h of y.extends) r("config" in h ? h.config : h);
    s.push(i(y));
  }(n);
  let o = { animations: {}, styles: {}, at: {}, variables: {} };
  for (let n = 0; n < s.length; n++) {
    const r = s[n];
    for (const y in r) switch (y) {
      case "animations":
        r.animations && Object.assign(o.animations, r.animations);
        break;
      default:
        r[y] && (o = ie(o, { [y]: r[y] }));
    }
  }
  return o;
}
const _ce = class _ce {
  constructor(i) {
    __publicField(this, "customConfig");
    __publicField(this, "syntaxes");
    __publicField(this, "ruleBy");
    __publicField(this, "classesUsage");
    __publicField(this, "config");
    __publicField(this, "Rules");
    this.customConfig = i, this.syntaxes = [], this.ruleBy = {}, this.classesUsage = {}, this.Rules = [], (i == null ? void 0 : i.override) ? this.config = re(i) : this.config = re(oe, i), this.resolve(), this.constructor === _ce && le.push(this);
  }
  resolve() {
    var _a, _b, _c;
    this.styles = {}, this.stylesBy = {}, this.selectors = {}, this.variables = {}, this.at = {}, this.animations = {}, this.Rules.length = 0, this.variablesNativeRules = {}, this.hasKeyframesRule = false;
    const i = { current: void 0, currentColor: void 0, transparent: void 0 }, { styles: s, selectors: o, variables: n, utilities: r, at: y, syntaxes: h, animations: p } = this.config;
    function g(c) {
      return c.replace(/[-/\\^$*+?.()|[\]{}]/g, "\\$&");
    }
    if (o) {
      const c = ne(o);
      for (const m in c) {
        const f = c[m], l = new RegExp(g(m) + "(?![a-z-])");
        for (const a of Array.isArray(f) ? f : [f]) {
          const u = ((_a = a.match(/^::-[a-z]+-/m)) == null ? void 0 : _a[0]) ?? "";
          let w = this.selectors[u];
          w || (w = this.selectors[u] = []);
          let v = w.find(([N]) => N === l);
          v || (v = [l, []], w.push(v)), v[1].push(a);
        }
      }
    }
    if (n) {
      const c = {}, m = (f, l, a) => {
        if (!f === void 0 || f === null) return;
        const u = (w, v, N, V) => {
          if (v === void 0) return;
          const R = w.join("-"), A = w.slice(0, -1).filter(Boolean), _ = (w[0] === "" ? "-" : "") + w[w.length - 1];
          if (v.key = _, v.name = R, A.length && (v.group = A.join(".")), v.type === "color") {
            if (V) {
              const I = v.value.indexOf("/");
              v = { ...v, value: I === -1 ? v.value + " / " + (V.startsWith("0.") ? V.slice(1) : V) : v.value.slice(0, I + 2) + String(+v.value.slice(I + 2) * +V).slice(1) };
            }
            i[R] = void 0;
          }
          v.name.startsWith("screen-") && v.type === "number" && (this.at[v.name.slice(7)] = v.value);
          const L = N ?? a;
          if (L !== void 0) if (Object.prototype.hasOwnProperty.call(this.variables, R)) {
            const I = this.variables[R];
            L ? (I.modes || (I.modes = {}), I.modes[L] = v) : (I.value = v.value, v.type === "color" && (I.space = v.space));
          } else if (L) {
            const I = { key: v.key, name: v.name, group: v.group, type: v.type, modes: { [L]: v } };
            v.type === "color" && (I.space = v.space), this.variables[R] = I;
          } else this.variables[R] = v;
          else this.variables[R] = v;
        };
        if (typeof f == "object") if (Array.isArray(f)) u(l, { type: "string", value: f.join(",") });
        else {
          const w = Object.keys(f);
          for (const v of w) v === "" || v.startsWith("@") ? m(f[v], l, v || w.some((N) => N.startsWith("@")) ? v.slice(1) : void 0) : m(f[v], [...l, v]);
        }
        else if (typeof f == "number") u(l, { type: "number", value: f }), u(["", ...l], { type: "number", value: f * -1 });
        else if (typeof f == "string") {
          const w = /^\$\((.*?)\)(?: ?\/ ?(.+?))?$/.exec(f), v = l.join("-");
          if (w) Object.prototype.hasOwnProperty.call(c, v) || (c[v] = {}), c[v][a] = () => {
            var _a2, _b2, _c2;
            delete c[v][a];
            const [N, V] = w[1].split("@");
            if (N) {
              if (Object.prototype.hasOwnProperty.call(c, N)) for (const A of Object.keys(c[N])) (_b2 = (_a2 = c[N])[A]) == null ? void 0 : _b2.call(_a2);
              const R = this.variables[N];
              if (R) if (V === void 0 && R.modes) {
                u(l, { type: R.type, value: R.value, space: R.space }, "", w[2]);
                for (const A in R.modes) u(l, R.modes[A], A, w[2]);
              } else {
                const A = V !== void 0 ? (_c2 = R.modes) == null ? void 0 : _c2[V] : R;
                if (A) {
                  const _ = { type: A.type, value: A.value };
                  A.type === "color" && (_.space = A.space), u(l, _, void 0, w[2]);
                }
              }
            }
          };
          else {
            const N = /^#([A-Fa-f0-9]{3,4}|[A-Fa-f0-9]{6}|[A-Fa-f0-9]{8})$/.exec(f);
            if (N) {
              const [V, R, A, _] = Ce(N[1]);
              u(l, { type: "color", value: `${V} ${R} ${A}${_ === 1 ? "" : " / " + _}`, space: "rgb" });
            } else {
              const V = /^rgb\( *([0-9]{1,3})(?: *, *| +)([0-9]{1,3})(?: *, *| +)([0-9]{1,3}) *(?:(?:,|\/) *(.*?) *)?\)$/.exec(f);
              if (V) u(l, { type: "color", value: V[1] + " " + V[2] + " " + V[3] + (V[4] ? " / " + (V[4].startsWith("0.") ? V[4].slice(1) : V[4]) : ""), space: "rgb" });
              else {
                const R = /^hsl\((.*?)\)$/.exec(f);
                R ? u(l, { type: "color", value: R[1], space: "hsl" }) : u(l, { type: "string", value: f });
              }
            }
          }
        }
      };
      for (const f in n) m(n[f], [f]);
      for (const f of Object.keys(c)) for (const l of Object.keys(c[f])) (_c = (_b = c[f])[l]) == null ? void 0 : _c.call(_b);
    }
    if (y && Object.assign(this.at, ne(y)), p) for (const c in p) {
      const m = this.animations[c] = {}, f = p[c];
      for (const l in f) {
        const a = m[l] = {}, u = f[l];
        for (const w in u) a[w] = u[w];
      }
    }
    const b = s ? ne(s) : {}, k = Object.keys(b), d = (c) => {
      if (Object.prototype.hasOwnProperty.call(this.styles, c)) return;
      const m = this.styles[c] = [], f = b[c];
      if (!f) return;
      const l = f.replace(/(?:\n(?:\s*))+/g, " ").trim().split(" ");
      for (const a of l) {
        const u = (w) => {
          if (Object.prototype.hasOwnProperty.call(this.stylesBy, w)) {
            const v = this.stylesBy[w];
            v.includes(c) || v.push(c);
          } else this.stylesBy[w] = [c];
          m.includes(w) || m.push(w);
        };
        if (k.includes(a)) {
          d(a);
          for (const w of this.styles[a]) u(w);
        } else u(a);
      }
    };
    for (const c of k) d(c);
    if (h || r) {
      const c = [];
      if (r) for (const l in r) {
        const a = r[l];
        c.push([l, { declarations: a, layer: e.Utility }]);
      }
      h && c.push(...Object.entries(h));
      const m = c.length, f = Object.keys(i);
      c.sort((l, a) => l[1].layer !== a[1].layer ? (a[1].layer || 0) - (l[1].layer || 0) : a[0].localeCompare(l[0])).forEach(([l, a], u) => {
        const w = { id: l, keys: [], variables: {}, matchers: {}, order: m - 1 - u, definition: a };
        this.Rules.push(w);
        const { matcher: v, layer: N, subkey: V, ambiguousKeys: R, ambiguousValues: A, sign: _ } = a;
        N === e.Utility && (w.id = "." + l, w.matchers.arbitrary = new RegExp("^" + g(l) + "(?=!|\\*|>|\\+|~|:|\\[|@|_|\\.|$)", "m"));
        const L = (Z) => {
          for (const Q in this.variables) {
            const O = this.variables[Q];
            O.group === Z && (w.variables[O.key] = O);
          }
        };
        if (a.variables) for (const Z of a.variables) L(Z);
        L(l);
        const I = [];
        let { key: J } = a;
        if ((N === e.NativeShorthand || N === e.Native) && (J || (a.key = J = l), I.push(l)), _) w.matchers.arbitrary = new RegExp(`^${_}[^!*>+~:[@_]+\\|`);
        else if (v) w.matchers.arbitrary = v;
        else {
          const Z = f.join("|");
          if (!J && !V ? I.push(l) : (J && !I.includes(J) && I.push(J), V && I.push(V), N === e.Shorthand && I.push(l)), R == null ? void 0 : R.length) {
            const Q = R.length > 1 ? `(?:${R.join("|")})` : R[0], O = Object.keys(w.variables);
            if (A == null ? void 0 : A.length) {
              const $ = [];
              for (const j of A) j instanceof RegExp ? $.push(j.source.replace("\\$colors", Z)) : $.unshift(`${j}(?:\\b|_)`);
              w.matchers.value = new RegExp(`^${Q}:(?:${$.join("|")})[^|]*?(?:@|$)`);
            }
            O.length && (w.matchers.variable = new RegExp(`^${Q}:(?:${O.join("|")}(?![a-zA-Z0-9-]))[^|]*?(?:@|$)`));
          }
        }
        I.length && (w.keys = I, w.matchers.key = new RegExp(`^${I.length > 1 ? `(${I.join("|")})` : I[0]}:.`));
      });
    }
  }
  match(i) {
    var _a, _b, _c, _d;
    for (const s of this.Rules) if ((_a = s.matchers.variable) == null ? void 0 : _a.test(i)) return s;
    for (const s of this.Rules) if ((_b = s.matchers.value) == null ? void 0 : _b.test(i)) return s;
    for (const s of this.Rules) if ((_c = s.matchers.key) == null ? void 0 : _c.test(i)) return s;
    for (const s of this.Rules) if ((_d = s.matchers.arbitrary) == null ? void 0 : _d.test(i)) return s;
  }
  generate(i) {
    return (Object.prototype.hasOwnProperty.call(this.styles, i) ? this.styles[i].map((s) => this.create(s)) : [this.create(i)]).filter((s) => s && (s == null ? void 0 : s.text));
  }
  create(i) {
    if (Object.prototype.hasOwnProperty.call(this.ruleBy, i)) return this.ruleBy[i];
    const s = this.match(i);
    if (s) return new Ae(i, s, this);
  }
  refresh(i) {
    i ? this.customConfig = i : i = this.customConfig, (i == null ? void 0 : i.override) ? this.config = re(i) : this.config = re(oe, i), this.resolve(), this.syntaxes.length = 0, this.ruleBy = {};
    for (const s in this.classesUsage) this.add(s);
    return this;
  }
  reset() {
    this.ruleBy = {}, this.classesUsage = {}, this.syntaxes.length = 0, this.hasKeyframesRule = false, this.variablesNativeRules = {};
    for (const i in this.animations) {
      const s = this.animations[i];
      s.usage = 0, s.native = void 0;
    }
    for (const i in this.variables) {
      const s = this.variables[i];
      s.usage = 0;
    }
    return this;
  }
  destroy() {
    return this.reset(), le.splice(le.indexOf(this), 1), this;
  }
  add(...i) {
    for (const s of i) {
      const o = this.generate(s);
      if (o.length) for (const n of o) this.insert(n);
    }
    return this;
  }
  delete(...i) {
    var _a;
    const s = (_a = this.style) == null ? void 0 : _a.sheet, o = (n) => {
      var _a2;
      const r = this.ruleBy[n];
      if (!(!r || Object.prototype.hasOwnProperty.call(this.stylesBy, n) && this.stylesBy[n].some((y) => Object.prototype.hasOwnProperty.call(this.classesUsage, y)))) {
        if (s && r.natives.length) {
          const y = r.natives[0];
          for (let h = 0; h < s.cssRules.length; h++) if (s.cssRules[h] === y.cssRule) {
            for (let g = 0; g < r.natives.length; g++) s.deleteRule(h);
            break;
          }
        }
        if (this.syntaxes.splice(this.syntaxes.indexOf(r), 1), delete this.ruleBy[n], r.variableNames) for (const y of r.variableNames) {
          const h = this.variables[y];
          if (h.usage || (h.usage = 0), !--h.usage) {
            const p = (g) => {
              const b = this.variablesNativeRules[g];
              if (b.cssRule.style.removeProperty("--" + y), !b.cssRule.style.length) {
                const k = this.syntaxes[0], d = k.natives.indexOf(b);
                s == null ? void 0 : s.deleteRule(d), k.natives.splice(d, 1), delete this.variablesNativeRules[g], k.natives.length || (this.syntaxes.splice(0, 1), this.variablesNativeRules = {});
              }
            };
            if (h.value && p(""), h.modes) for (const g in h.modes) p(g);
          }
        }
        if (r.animationNames) {
          const y = Object.keys(this.variablesNativeRules).length ? 1 : 0, h = this.syntaxes[y];
          for (const p of r.animationNames) {
            const g = this.animations[p];
            if (g.usage || (g.usage = 0), !--g.usage && g.native) {
              const b = h.natives.indexOf(g.native);
              s == null ? void 0 : s.deleteRule(Object.keys(this.variablesNativeRules).length + b), h.natives.splice(b, 1), g.native = void 0;
            }
          }
          h.natives.length || (this.syntaxes.splice(y, 1), this.hasKeyframesRule = false);
        }
        (_a2 = r.definition.delete) == null ? void 0 : _a2.call(r, n);
      }
    };
    for (const n of i) if (Object.prototype.hasOwnProperty.call(this.styles, n)) {
      for (const r of this.styles[n]) Object.prototype.hasOwnProperty.call(this.classesUsage, r) || o(r);
      delete this.ruleBy[n];
    } else o(n);
  }
  insert(i) {
    var _a, _b, _c, _d, _e, _f, _g;
    if (this.ruleBy[i.className]) return;
    let s;
    const o = this.syntaxes.length - 1, { at: n, atToken: r, order: y, priority: h, hasWhere: p, className: g } = i, b = (c, m, f) => {
      let l = c;
      for (; l <= o; l++) {
        const a = this.syntaxes[l];
        if (m == null ? void 0 : m(a)) return f ? -1 : l - 1;
        if (f == null ? void 0 : f(a)) return l;
      }
      return f ? -1 : l - 1;
    };
    let k, d;
    if (r) {
      const c = this.syntaxes.findIndex((m) => {
        var _a2;
        return (_a2 = m.at) == null ? void 0 : _a2.media;
      });
      if (c === -1) s = o + 1;
      else {
        const m = (_a = n.media) == null ? void 0 : _a.find(({ name: l }) => l === "max-width"), f = (_b = n.media) == null ? void 0 : _b.find(({ name: l }) => l === "min-width");
        if (m || f) {
          const l = this.syntaxes.findIndex((a) => {
            var _a2, _b2;
            return (_b2 = (_a2 = a.at) == null ? void 0 : _a2.media) == null ? void 0 : _b2.find(({ name: u }) => u === "max-width" || u === "min-width");
          });
          if (l === -1) s = o + 1;
          else if (m && f) {
            if (h === -1 ? (k = b(l, (a) => a.priority !== -1, (a) => {
              var _a2, _b2;
              return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && ((_b2 = a.at.media) == null ? void 0 : _b2.find(({ name: u }) => u === "min-width"));
            }), d = b(l, (a) => a.priority !== -1)) : (k = b(l, void 0, (a) => {
              var _a2, _b2;
              return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && ((_b2 = a.at.media) == null ? void 0 : _b2.find(({ name: u }) => u === "min-width")) && a.priority !== -1;
            }), d = o), k !== -1) {
              const a = m.value - f.value;
              let u = d;
              const w = k;
              for (k = d + 1; u >= w; u--) {
                const v = this.syntaxes[u], N = (_c = v.at.media) == null ? void 0 : _c.find(({ name: R }) => R === "max-width"), V = (_d = v.at.media) == null ? void 0 : _d.find(({ name: R }) => R === "min-width");
                if (!N || !V) break;
                {
                  const R = N.value - V.value;
                  if (R < a) d = u - 1;
                  else if (R === a) k = u;
                  else break;
                }
              }
            }
          } else if (f) {
            if (h === -1 ? (k = b(l, (a) => {
              var _a2, _b2;
              return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && ((_b2 = a.at.media) == null ? void 0 : _b2.find(({ name: u }) => u === "min-width")) || a.priority !== -1;
            }, (a) => {
              var _a2, _b2;
              return !((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && ((_b2 = a.at.media) == null ? void 0 : _b2.find(({ name: u }) => u === "min-width"));
            }), d = b(l, (a) => {
              var _a2, _b2;
              return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && ((_b2 = a.at.media) == null ? void 0 : _b2.find(({ name: u }) => u === "min-width")) || a.priority !== -1;
            })) : (k = b(l, (a) => {
              var _a2, _b2;
              return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && ((_b2 = a.at.media) == null ? void 0 : _b2.find(({ name: u }) => u === "min-width")) && a.priority !== -1;
            }, (a) => {
              var _a2, _b2;
              return !((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && ((_b2 = a.at.media) == null ? void 0 : _b2.find(({ name: u }) => u === "min-width")) && a.priority !== -1;
            }), d = b(l, (a) => {
              var _a2, _b2;
              return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && ((_b2 = a.at.media) == null ? void 0 : _b2.find(({ name: u }) => u === "min-width")) && a.priority !== -1;
            })), k !== -1) for (let a = d; a >= k; a--) {
              const u = ((_e = this.syntaxes[a].at.media) == null ? void 0 : _e.find(({ name: w }) => w === "min-width")).value;
              if (u > f.value) d = a - 1;
              else if (u < f.value) {
                k = a + 1;
                break;
              }
            }
          } else if (h === -1 ? (k = b(l, (a) => {
            var _a2;
            return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "min-width")) || a.priority !== -1;
          }, (a) => {
            var _a2;
            return (_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width");
          }), d = b(l, (a) => {
            var _a2;
            return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "min-width")) || a.priority !== -1;
          })) : (k = b(l, (a) => {
            var _a2;
            return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "min-width")) && a.priority !== -1;
          }, (a) => {
            var _a2;
            return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "max-width")) && a.priority !== -1;
          }), d = b(l, (a) => {
            var _a2;
            return ((_a2 = a.at.media) == null ? void 0 : _a2.find(({ name: u }) => u === "min-width")) && a.priority !== -1;
          })), k !== -1) for (let a = d; a >= k; a--) {
            const u = ((_f = this.syntaxes[a].at.media) == null ? void 0 : _f.find(({ name: w }) => w === "max-width")).value;
            if (u < m.value) d = a - 1;
            else if (u > m.value) {
              k = a + 1;
              break;
            }
          }
        } else h === -1 ? (k = c, d = b(c, (l) => {
          var _a2;
          return ((_a2 = l.at.media) == null ? void 0 : _a2.find(({ name: a }) => a === "max-width" || a === "min-width")) || l.priority !== -1;
        })) : (k = b(c, (l) => {
          var _a2;
          return (_a2 = l.at.media) == null ? void 0 : _a2.find(({ name: a }) => a === "max-width" || a === "min-width");
        }, (l) => l.priority !== -1), d = b(c, (l) => {
          var _a2;
          return (_a2 = l.at.media) == null ? void 0 : _a2.find(({ name: a }) => a === "max-width" || a === "min-width");
        }));
      }
    } else {
      const c = Object.keys(this.variablesNativeRules).length ? this.hasKeyframesRule ? 2 : 1 : this.hasKeyframesRule ? 1 : 0;
      h === -1 ? (k = c, d = b(c, (m) => m.atToken || m.priority !== -1)) : (k = b(c, (m) => m.atToken, (m) => m.priority !== -1), d = b(c, (m) => m.atToken));
    }
    if (s === void 0 && d !== void 0 && k !== void 0) if (k === -1) s = d + 1;
    else {
      if (h === -1) for (let c = k; c <= d; c++) {
        const m = this.syntaxes[c];
        if (!(!p && m.hasWhere) && (p && !m.hasWhere || m.order >= y)) {
          s = c;
          break;
        }
      }
      else for (let c = k; c <= d; c++) {
        const m = this.syntaxes[c];
        if (!(!p && m.hasWhere)) {
          if (p && !m.hasWhere) {
            s = c;
            break;
          }
          if (m.priority < h) {
            s = c;
            break;
          } else if (m.priority === h) {
            if (m.order >= y) {
              s = c;
              break;
            }
          } else s = c + 1;
        }
      }
      s === void 0 && (s = d + 1);
    }
    if (this.syntaxes.splice(s, 0, i), this.ruleBy[g] = i, this.style) {
      const c = this.style.sheet;
      let m = 0;
      const f = (l) => {
        var _a2;
        const a = this.syntaxes[l];
        if (a) {
          if (!a.natives.length) return f(l - 1);
          const u = a.natives[a.natives.length - 1], w = ((_a2 = u.cssRule) == null ? void 0 : _a2.parentRule) ?? u.cssRule;
          if (c) {
            for (let v = 0; v < c.cssRules.length; v++) if (c.cssRules[v] === w) {
              m = v + 1;
              break;
            }
          }
        }
      };
      f(s - 1);
      for (let l = 0; l < i.natives.length; ) try {
        const a = i.natives[l];
        c == null ? void 0 : c.insertRule(a.text, m), a.cssRule = c == null ? void 0 : c.cssRules[m++], l++;
      } catch (a) {
        console.error(a), i.natives.splice(l, 1);
      }
    }
    return this.handleRuleWithVariableNames(i), this.handleRuleWithAnimationNames(i), (_g = i.definition.insert) == null ? void 0 : _g.call(i), s;
  }
  get text() {
    return this.syntaxes.map((i) => i.text).join("");
  }
  handleRuleWithAnimationNames(i, s = false) {
    var _a;
    if (i.animationNames) {
      const o = (_a = this.style) == null ? void 0 : _a.sheet;
      for (const n of i.animationNames) {
        const r = this.animations[n];
        if (r.usage) r.usage++;
        else {
          const y = { text: `@keyframes ${n}{` + Object.entries(r).filter(([g]) => g !== "usage" && g !== "native").map(([g, b]) => `${g}{${Object.entries(b).map(([k, d]) => k + ":" + d).join(";")}}`).join("") + "}" }, h = Object.keys(this.variablesNativeRules).length ? 1 : 0;
          let p;
          if (this.hasKeyframesRule ? (p = this.syntaxes[h]).natives.push(y) : (this.syntaxes.splice(h, 0, p = { natives: [y], get text() {
            return this.natives.map((g) => g.text).join("");
          } }), this.hasKeyframesRule = true), o) {
            let g;
            if (s) for (let b = 0; b < o.cssRules.length; b++) {
              const k = o.cssRules[b];
              if (k.constructor.name === "CSSKeyframesRule" && k.name === n) {
                g = k;
                break;
              }
            }
            if (g) y.cssRule = g;
            else {
              const b = Object.keys(this.variablesNativeRules).length + p.natives.length - 1;
              o.insertRule(y.text, b), y.cssRule = o.cssRules[b];
            }
          }
          r.usage = 1, r.native = y;
        }
      }
    }
  }
  handleRuleWithVariableNames(i, s = false) {
    var _a;
    if (i.variableNames) {
      const o = (_a = this.style) == null ? void 0 : _a.sheet;
      for (const n of i.variableNames) {
        const r = this.variables[n];
        if (r.usage) r.usage++;
        else {
          const y = (h, p) => {
            var _a2;
            let g = this.variablesNativeRules[h];
            if (!g) {
              let k, d, c;
              if (h) switch ((_a2 = this.config.modes) == null ? void 0 : _a2[h]) {
                case "media":
                  d = `@media(prefers-color-scheme:${h})`, c = ":root";
                  break;
                case "host":
                  c = `:host(.${h})`, this.config.defaultMode === h && (c += ",:host");
                  break;
                case "class":
                  c = "." + h, this.config.defaultMode === h && (c += ",:root");
                  break;
                default:
                  return;
              }
              else c = ":root";
              if (o) {
                const m = Object.keys(this.variablesNativeRules).length ? this.syntaxes[0].natives.length : 0;
                o.insertRule((d ? d + "{" : "") + c + "{}" + (d ? d + "}" : ""), m), k = d ? o.cssRules[m].cssRules[0] : o.cssRules[m];
              } else {
                const m = /* @__PURE__ */ new Map(), f = Object.defineProperties({}, { getPropertyValue: { value: (l) => m.get(l) }, removeProperty: { value: (l) => {
                  m.delete(l);
                  for (let a = 0; a < f.length; a++) f[a] === l && delete f[a];
                } }, setProperty: { value: (l, a) => {
                  f[f.length] = l, m.set(l, a);
                } }, length: { get() {
                  return Object.keys(f).length;
                } } });
                k = { selectorText: c, style: f, styleMap: m }, d && (k.parentRule = { conditionText: d });
              }
              g = this.pushVariableNativeRule(h, k);
            }
            const b = "--" + n;
            (!s || !g.cssRule.style.getPropertyValue(b)) && g.cssRule.style.setProperty(b, String(p.value));
          };
          if (r.value && y("", r), r.modes) for (const h in r.modes) y(h, r.modes[h]);
          r.usage = 1;
        }
      }
    }
  }
  pushVariableNativeRule(i, s) {
    if (!Object.keys(this.variablesNativeRules).length) {
      this.variablesNativeRules = {};
      const y = { natives: [], get text() {
        return this.natives.map((h) => h.text).join("");
      } };
      this.syntaxes.splice(0, 0, y);
    }
    let o = "", n = "}";
    s.parentRule && (o += "@media" + s.parentRule.conditionText.replace(/ /g, "") + "{", n += "}"), o += s.selectorText + "{";
    const r = { cssRule: s, get text() {
      const y = [];
      for (let h = 0; h < s.style.length; h++) {
        const p = s.style[h];
        y.push(p + ":" + s.style.getPropertyValue(p));
      }
      return o + y.join(";") + n;
    } };
    return this.syntaxes[0].natives.push(this.variablesNativeRules[i] = r), r;
  }
};
__publicField(_ce, "config", oe);
let ce = _ce;
const le = [];
globalThis.MasterCSS = ce, globalThis.masterCSSs = le;
class Ne extends ce {
  constructor(i = document, s = oe) {
    var _a;
    super(s);
    __publicField(this, "root");
    __publicField(this, "customConfig");
    __publicField(this, "host");
    __publicField(this, "observing");
    __publicField(this, "progressive");
    __publicField(this, "container");
    __publicField(this, "observer");
    this.root = i, this.customConfig = s, this.observing = false, this.progressive = false, i || (this.root = document);
    const o = (_a = this.root) == null ? void 0 : _a.constructor.name;
    o === "HTMLDocument" || o === "Document" ? (this.root.defaultView.globalThis.runtimeCSS = this, this.container = this.root.head, this.host = this.root.documentElement) : (this.container = this.root, this.host = this.root.host), ae.push(this);
  }
  observe(i = { subtree: true, childList: true }) {
    var _a, _b, _c, _d;
    if (this.observing || !this.root) return this;
    if (ae.find((o) => o !== this && o.root === this.root)) return console.warn("Cannot observe the same root element repeatedly."), this;
    if ((_a = this.root) == null ? void 0 : _a.styleSheets) for (const o of this.root.styleSheets) {
      const { ownerNode: n } = o;
      if (n && n.id === "master") {
        this.style = n, this.progressive = true;
        break;
      }
    }
    if ((_b = this.style) == null ? void 0 : _b.sheet) {
      let o = 0;
      for (; o < this.style.sheet.cssRules.length; o++) {
        const n = this.style.sheet.cssRules[o];
        switch (n.constructor.name) {
          case "CSSKeyframesRule":
            continue;
          case "CSSMediaRule":
            const r = /\(prefers-color-scheme: ?(.*?)\)/.exec(n.conditionText);
            if (r) {
              const h = n.cssRules[0];
              if ((h == null ? void 0 : h.constructor.name) === "CSSStyleRule" && h.selectorText === ":root") {
                this.pushVariableNativeRule(r[1], h);
                continue;
              }
            }
            break;
          case "CSSStyleRule":
            const y = n.selectorText;
            if (n.style.length) {
              let h = true;
              for (let p = 0; p < n.style.length; p++) if (!((_c = n.style[p]) == null ? void 0 : _c.startsWith("--"))) {
                h = false;
                break;
              }
              if (h) if (y === ":root") {
                this.pushVariableNativeRule("", n);
                continue;
              } else {
                const p = /:host(.*?)/.exec(y);
                if (p) {
                  this.pushVariableNativeRule(p[1], n);
                  continue;
                } else if (!y.startsWith(".\\$")) {
                  const [g] = y.split(",");
                  this.pushVariableNativeRule(g.slice(1), n);
                  continue;
                }
              }
            }
            break;
        }
        break;
      }
      for (; o < this.style.sheet.cssRules.length; o++) {
        const n = (y) => {
          if (y.selectorText) {
            const p = y.selectorText.split(", ")[0].split(" ");
            for (let g = 0; g < p.length; g++) {
              const b = p[g];
              if (b[0] === ".") {
                const k = b.slice(1);
                let d = "";
                for (let c = 0; c < k.length; c++) {
                  const m = k[c], f = k[c + 1];
                  if (m === "\\") {
                    if (c++, f !== "\\") {
                      d += f;
                      continue;
                    }
                  } else if ([",", ".", "#", "[", "!", "*", ">", "+", "~", ":", "@"].includes(m)) break;
                  d += m;
                }
                if (!Object.prototype.hasOwnProperty.call(this.ruleBy, d) && !Object.prototype.hasOwnProperty.call(this.styles, d)) {
                  const c = this.generate(d)[0];
                  if (c) return c;
                }
              }
            }
          } else if (y.cssRules) for (let h = 0; h < y.cssRules.length; h++) {
            const p = n(y.cssRules[h]);
            if (p) return p;
          }
        }, r = n(this.style.sheet.cssRules[o]);
        if (r) {
          this.syntaxes.push(r), this.ruleBy[r.className] = r;
          for (let y = 0; y < r.natives.length; y++) r.natives[y].cssRule = this.style.sheet.cssRules[o + y];
          o += r.natives.length - 1, this.handleRuleWithVariableNames(r, true), this.handleRuleWithAnimationNames(r, true), (_d = r.definition.insert) == null ? void 0 : _d.call(r);
        }
      }
    } else this.style = document.createElement("style"), this.style.id = "master", this.container.append(this.style);
    const s = (o) => {
      o.forEach((n) => {
        Object.prototype.hasOwnProperty.call(this.classesUsage, n) ? this.classesUsage[n]++ : (this.classesUsage[n] = 1, this.add(n));
      });
    };
    return s(this.host.classList), i.subtree && (this.root.constructor.name === "HTMLDocument" ? this.host : this.container).querySelectorAll("[class]").forEach((o) => s(o.classList)), this.observer = new MutationObserver((o) => {
      const n = {}, r = [], y = [], h = [], p = (d, c) => {
        c ? d.classList.forEach(b) : d.classList.forEach(g);
        const m = d.children;
        for (let f = 0; f < m.length; f++) {
          const l = m[f];
          l.classList && !y.includes(l) && (y.push(l), p(l, c));
        }
      }, g = (d) => {
        Object.prototype.hasOwnProperty.call(n, d) ? n[d]++ : n[d] = 1;
      }, b = (d) => {
        Object.prototype.hasOwnProperty.call(n, d) ? n[d]-- : Object.prototype.hasOwnProperty.call(this.classesUsage, d) && (n[d] = -1);
      }, k = (d, c) => {
        for (let m = 0; m < d.length; m++) {
          const f = d[m];
          f.classList && !y.includes(f) && !h.includes(f) && (f.isConnected !== c ? (y.push(f), p(f, c)) : h.push(f));
        }
      };
      for (let d = 0; d < o.length; d++) {
        const c = o[d], { addedNodes: m, removedNodes: f, type: l, target: a } = c;
        if (l === "attributes") {
          if (r.find((u) => u.target === a)) continue;
          r.push(c);
        } else k(m, false), (!a.isConnected || !y.includes(a)) && k(f, true);
      }
      if (!(!r.length && !Object.keys(n).length)) {
        for (const { oldValue: d, target: c } of r) {
          const m = y.includes(c), f = c.classList, l = d ? d.split(" ") : [];
          if (m) {
            if (c.isConnected) continue;
            for (const a of l) f.contains(a) || b(a);
          } else if (c.isConnected) {
            f.forEach((a) => {
              l.includes(a) || g(a);
            });
            for (const a of l) f.contains(a) || b(a);
          }
        }
        for (const d in n) {
          const c = n[d], m = (this.classesUsage[d] || 0) + c;
          m === 0 ? (delete this.classesUsage[d], this.delete(d)) : (Object.prototype.hasOwnProperty.call(this.classesUsage, d) || this.add(d), this.classesUsage[d] = m);
        }
      }
    }), this.observer.observe(this.root, { ...i, attributes: true, attributeOldValue: true, attributeFilter: ["class"] }), this.host.style.removeProperty("display"), this.observing = true, this;
  }
  refresh(i = this.customConfig) {
    var _a;
    const s = (_a = this.style) == null ? void 0 : _a.sheet;
    if (s == null ? void 0 : s.cssRules) for (let o = s.cssRules.length - 1; o >= 0; o--) s.deleteRule(o);
    return super.refresh(i), this;
  }
  reset() {
    var _a, _b;
    super.reset();
    const i = (_a = this.style) == null ? void 0 : _a.sheet;
    if (i == null ? void 0 : i.cssRules) for (let s = i.cssRules.length - 1; s >= 0; s--) i.deleteRule(s);
    return this.progressive || ((_b = this.style) == null ? void 0 : _b.remove(), this.style = null), this;
  }
  disconnect() {
    return this.observer && (this.observer.disconnect(), this.observer = null), this.observing = false, this.reset(), this;
  }
  destroy() {
    return this.disconnect(), ae.splice(ae.indexOf(this), 1), this;
  }
}
const ae = [];
globalThis.RuntimeCSS = Ne, globalThis.runtimeCSSs = ae;
function Ue(t) {
  return new Ne(document, t).observe();
}
export {
  Ue as i
};

import { settingsState as A, brxGlobalProp as g } from "./constant-D6K4uIdy.js";
import { l as d } from "./logger-BTW-zIW3.js";
import { c as W } from "./index.browser-B0na17u1.js";
import { b as O, i as U, a as B, k as V, f as z, j as J, g as X, d as Q, l as C, h as Y, S as Z } from "./_initCloneObject-D8oIiuqH.js";
import { d as E, c as _, a as j, f as ee, e as H, i as k, h as te } from "./set-DvizEivO.js";
import { a as h, i as q, b as re } from "./isObject-CRxghtyK.js";
import { w as ne } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./virtual-Cakm3k_V.js";
import "./index-Dgh2qPwk.js";
function D(e) {
  return e;
}
function ie(e, r, t) {
  switch (t.length) {
    case 0:
      return e.call(r);
    case 1:
      return e.call(r, t[0]);
    case 2:
      return e.call(r, t[0], t[1]);
    case 3:
      return e.call(r, t[0], t[1], t[2]);
  }
  return e.apply(r, t);
}
function ae(e, r) {
  var t = -1, n = e.length;
  for (r || (r = Array(n)); ++t < n; ) r[t] = e[t];
  return r;
}
var se = 800, oe = 16, le = Date.now;
function ue(e) {
  var r = 0, t = 0;
  return function() {
    var n = le(), a = oe - (n - t);
    if (t = n, a > 0) {
      if (++r >= se) return arguments[0];
    } else r = 0;
    return e.apply(void 0, arguments);
  };
}
function ce(e) {
  return function() {
    return e;
  };
}
var de = E ? function(e, r) {
  return E(e, "toString", { configurable: true, enumerable: false, value: ce(r), writable: true });
} : D, fe = ue(de);
function pe(e, r, t, n) {
  var a = !t;
  t || (t = {});
  for (var i = -1, s = r.length; ++i < s; ) {
    var o = r[i], l = void 0;
    l === void 0 && (l = e[o]), a ? _(t, o, l) : j(t, o, l);
  }
  return t;
}
var N = Math.max;
function me(e, r, t) {
  return r = N(r === void 0 ? e.length - 1 : r, 0), function() {
    for (var n = arguments, a = -1, i = N(n.length - r, 0), s = Array(i); ++a < i; ) s[a] = n[r + a];
    a = -1;
    for (var o = Array(r + 1); ++a < r; ) o[a] = n[a];
    return o[r] = t(s), ie(e, this, o);
  };
}
function ge(e, r) {
  return fe(me(e, r, D), e + "");
}
function he(e, r, t) {
  if (!h(t)) return false;
  var n = typeof r;
  return (n == "number" ? O(t) && ee(r, t.length) : n == "string" && r in t) ? H(t[r], e) : false;
}
function be(e) {
  return ge(function(r, t) {
    var n = -1, a = t.length, i = a > 1 ? t[a - 1] : void 0, s = a > 2 ? t[2] : void 0;
    for (i = e.length > 3 && typeof i == "function" ? (a--, i) : void 0, s && he(t[0], t[1], s) && (i = a < 3 ? void 0 : i, a = 1), r = Object(r); ++n < a; ) {
      var o = t[n];
      o && e(r, o, n, i);
    }
    return r;
  });
}
function ve(e) {
  var r = [];
  if (e != null) for (var t in Object(e)) r.push(t);
  return r;
}
var we = Object.prototype, ye = we.hasOwnProperty;
function Te(e) {
  if (!h(e)) return ve(e);
  var r = U(e), t = [];
  for (var n in e) n == "constructor" && (r || !ye.call(e, n)) || t.push(n);
  return t;
}
function I(e) {
  return O(e) ? B(e, true) : Te(e);
}
var xe = "[object Object]", Ae = Function.prototype, Oe = Object.prototype, R = Ae.toString, Pe = Oe.hasOwnProperty, Le = R.call(Object);
function Me(e) {
  if (!q(e) || re(e) != xe) return false;
  var r = V(e);
  if (r === null) return true;
  var t = Pe.call(r, "constructor") && r.constructor;
  return typeof t == "function" && t instanceof t && R.call(t) == Le;
}
function Ce(e) {
  return function(r, t, n) {
    for (var a = -1, i = Object(r), s = n(r), o = s.length; o--; ) {
      var l = s[++a];
      if (t(i[l], l, i) === false) break;
    }
    return r;
  };
}
var Ee = Ce();
function w(e, r, t) {
  (t !== void 0 && !H(e[r], t) || t === void 0 && !(r in e)) && _(e, r, t);
}
function ke(e) {
  return q(e) && O(e);
}
function y(e, r) {
  if (!(r === "constructor" && typeof e[r] == "function") && r != "__proto__") return e[r];
}
function Ne(e) {
  return pe(e, I(e));
}
function Se(e, r, t, n, a, i, s) {
  var o = y(e, t), l = y(r, t), L = s.get(l);
  if (L) {
    w(e, t, L);
    return;
  }
  var u = i ? i(o, l, t + "", e, r, s) : void 0, m = u === void 0;
  if (m) {
    var b = k(l), v = !b && z(l), M = !b && !v && J(l);
    u = l, b || v || M ? k(o) ? u = o : ke(o) ? u = ae(o) : v ? (m = false, u = X(l, true)) : M ? (m = false, u = Q(l, true)) : u = [] : Me(l) || C(l) ? (u = o, C(o) ? u = Ne(o) : (!h(o) || te(o)) && (u = Y(l))) : m = false;
  }
  m && (s.set(l, u), a(u, l, n, i, s), s.delete(l)), w(e, t, u);
}
function $(e, r, t, n, a) {
  e !== r && Ee(r, function(i, s) {
    if (a || (a = new Z()), h(i)) Se(e, r, s, t, $, n, a);
    else {
      var o = n ? n(y(e, s), i, s + "", e, r, a) : void 0;
      o === void 0 && (o = i), w(e, s, o);
    }
  }, I);
}
var c = be(function(e, r, t) {
  $(e, r, t);
});
const S = () => W("1234567890abcdefghijklmnopqrstuvwxyz", 6)();
function T() {
  let e = S();
  for (; e.match(/^\d/); ) e = S();
  return `windpress${e}`;
}
function _e(e) {
  const r = [];
  return e.childNodes.forEach((t) => {
    const n = F(t);
    n && r.push(n);
  }), K(r, 0);
}
function He(e) {
  const r = e.tagName.toLowerCase(), t = { id: T(), name: "div", settings: { tag: r }, children: [] }, n = [], a = ["id", "class", "href", "src"];
  if (Object.keys(e.attributes).forEach((i) => {
    const s = e.attributes[i].name;
    a.includes(s) ? (s === "class" && e.attributes[i].value.trim() !== "" && c(t.settings, { _cssClasses: e.attributes[i].value }), s === "id" && e.id.trim() !== "" && c(t.settings, { _cssId: e.id }), s === "href" && e.tagName.toLowerCase() === "a" && c(t.settings, { link: { url: e.getAttribute("href") } })) : n.push({ id: T(), name: s, value: e.attributes[i].value });
  }), c(t.settings, { _attributes: n }), r === "svg") return t.name = "svg", c(t.settings, { source: "code", code: e.outerHTML }), t.settings._attributes = [], t;
  if (r === "img") {
    let i = e.getAttribute("src");
    return t.name = "image", c(t.settings, { image: { external: true, url: i || "", full: i || "", filename: i.split("/").pop() || "" }, altText: e.getAttribute("alt") || "" }), delete t.settings.tag, t;
  }
  if (r.match(/h[1-6]/) && (t.name = "heading", c(t.settings, { text: e.innerText, tag: r })), r === "video" || r === "iframe" && (e.getAttribute("src").includes("youtube.com") || e.getAttribute("src").includes("vimeo.com"))) return t.name = "video", c(t.settings, { source: "url", url: r === "video" ? e.getAttribute("src") : e.getAttribute("src").split("?")[0] }), delete t.settings.tag, t;
  if (r === "a") {
    if (c(t.settings, { link: { type: "external", url: e.getAttribute("href") || "", newTab: e.getAttribute("target") === "_blank", ariaLabel: e.getAttribute("aria-label") || "", title: e.getAttribute("title") || "", rel: e.getAttribute("rel") || "" } }), e.children.length === 0) return t.name = "text-basic", c(t.settings, { text: e.innerText }), t;
    c(t.settings, { text: e.innerText });
  }
  return e.childNodes.forEach((i) => {
    const s = F(i);
    s && t.children.push(s);
  }), t;
}
function F(e) {
  return e.nodeType === Node.ELEMENT_NODE ? He(e) : e.nodeType === Node.TEXT_NODE && e.nodeValue.trim() !== "" ? { id: T(), name: "text-basic", settings: { tag: "span", text: e.nodeValue }, children: [] } : null;
}
function K(e, r) {
  const t = [];
  return e.forEach((n) => {
    n.parent = r, n._children = n.children.map((a) => a.id), t.push(n), t.push(...K(n.children, n.id)), n.children = n._children, delete n._children;
  }), t;
}
async function qe() {
  if (!navigator.permissions) return d("Clipboard permissions not supported", { module: "html2bricks", type: "error" }), false;
  let e = "";
  const r = await navigator.permissions.query({ name: "clipboard-read", allowWithoutGesture: false });
  if (r.state === "prompt" && (d("Requesting clipboard-read permission", { module: "html2bricks" }), e = await navigator.clipboard.readText(), r.state !== "granted")) return d("Clipboard-read permission denied", { module: "html2bricks", type: "error" }), false;
  e = await navigator.clipboard.readText();
  const t = await navigator.permissions.query({ name: "clipboard-write" });
  return t.state === "prompt" && (d("Requesting clipboard-write permission", { module: "html2bricks" }), await navigator.clipboard.writeText(e), t.state !== "granted") ? (d("Clipboard-write permission denied", { module: "html2bricks", type: "error" }), false) : true;
}
async function P() {
  if (!await qe()) {
    g.$_showMessage("[WindPress] Clipboard access not available");
    return;
  }
  const e = (await navigator.clipboard.readText()).trim();
  if (!e || e.charAt(0) !== "<") {
    d("Pasted content is not HTML", { module: "html2bricks", type: "error" }), g.$_showMessage("[WindPress] Pasted content is not HTML");
    return;
  }
  const r = new DOMParser().parseFromString(e, "text/html").body, n = { content: _e(r), source: "bricksCopiedElements", sourceUrl: window.bricksData.siteUrl, version: window.bricksData.version, globalClasses: [], globalElements: [] };
  await navigator.clipboard.writeText(JSON.stringify(n, null)), g.$_pasteElements(), g.$_showMessage("[WindPress] HTML pasted"), await navigator.clipboard.writeText(e);
}
document.addEventListener("keydown", (e) => {
  A("module.html2bricks.copy-paste", true).value && (e.target.id === "bricks-toolbar" || e.target.id === "bricks-panel" || !(e.ctrlKey || e.metaKey) || !e.shiftKey || e.key.toLowerCase() !== "v" || P());
});
const x = document.querySelector("#bricks-builder-context-menu li:nth-child(2)"), f = document.createElement("li");
f.id = "windpressbricks-html2bricks-context-menu";
f.classList.add("sep");
f.innerHTML = '<span class="label">Paste HTML</span><span class="shortcut">CTRL + SHIFT + V</span>';
f.addEventListener("click", P);
const De = document.querySelector('#bricks-panel-header>ul.actions>li[data-balloon="Paste (All)"]'), p = document.createElement("li");
p.dataset.balloon = "Paste HTML";
p.dataset.balloonPos = "bottom-right";
p.innerHTML = `
    <span class="bricks-svg-wrapper">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-html5" fill="none" stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 4l-2 14.5l-6 2l-6 -2l-2 -14.5z" /><path d="M15.5 8h-7l.5 4h6l-.5 3.5l-2.5 .75l-2.5 -.75l-.1 -.5" /></svg>
    </span>
`;
p.addEventListener("click", P);
const G = () => {
  x.classList.remove("sep"), x.insertAdjacentElement("afterend", f), De.insertAdjacentElement("afterend", p);
}, Ie = () => {
  x.classList.add("sep"), f.remove(), p.remove();
};
A("module.html2bricks.copy-paste", true).value && G();
ne(() => A("module.html2bricks.copy-paste", true).value, (e) => {
  e ? G() : Ie();
});
d("Module loaded!", { module: "html2bricks" });

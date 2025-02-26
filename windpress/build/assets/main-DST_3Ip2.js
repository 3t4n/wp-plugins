var _a;
import { _, e as V, b as c, d as B } from "./_plugin-vue_export-helper-Ds8ZmEpB.js";
import { c as C } from "./virtual-Cakm3k_V.js";
import { l as E } from "./logger-BTW-zIW3.js";
import { L as P } from "./windpress-a09-ZfRP.js";
import { settingsState as o, brxIframe as S } from "./constant-D6K4uIdy.js";
import { f as g, r as m, w as h, z as a, C as l, u as M, v as O, x as e } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./index-Dgh2qPwk.js";
import "./isObject-CRxghtyK.js";
import "./set-DvizEivO.js";
const A = { class: "w:full" }, U = { class: "buttons" }, q = { "data-control": "checkbox", type: "checkbox" }, z = { class: "buttons" }, I = { "data-control": "checkbox", type: "checkbox" }, D = { class: "buttons" }, H = { "data-control": "checkbox", type: "checkbox" }, R = { class: "buttons" }, T = { "data-control": "checkbox", type: "checkbox" }, $ = { class: "buttons" }, F = { "data-control": "checkbox", type: "checkbox" }, j = { __name: "App", setup(t) {
  const r = g("isOpen"), i = g("mousePosition"), d = m(null);
  return h(r, (k) => {
    k && (d.value.style.top = `${i.value.y}px`, d.value.style.left = `${i.value.x}px`);
  }), (k, s) => a((O(), M("div", { ref_key: "containerEl", ref: d, id: "windpressbricks-settings-app-container", class: "flex flex:column" }, [e("ul", A, [s[10] || (s[10] = e("li", { class: "disabled", style: { color: "var(--bricks-text-dark)" } }, " Module: Plain Classes ", -1)), e("li", null, [s[5] || (s[5] = e("span", { class: "label" }, [e("label", { for: "cb-settings-plain-classes-input-field" }, "Input Field")], -1)), e("span", U, [e("div", null, [e("div", q, [a(e("input", { type: "checkbox", "onUpdate:modelValue": s[0] || (s[0] = (n) => l(o)("module.plain-classes.input-field", true).value = n), id: "cb-settings-plain-classes-input-field" }, null, 512), [[c, l(o)("module.plain-classes.input-field", true).value]])])])])]), e("li", null, [s[6] || (s[6] = e("span", { class: "label" }, [e("label", { for: "cb-settings-plain-classes-autocomplete" }, "Autocomplete")], -1)), e("span", z, [e("div", null, [e("div", I, [a(e("input", { type: "checkbox", "onUpdate:modelValue": s[1] || (s[1] = (n) => l(o)("module.plain-classes.autocomplete", true).value = n), id: "cb-settings-plain-classes-autocomplete" }, null, 512), [[c, l(o)("module.plain-classes.autocomplete", true).value]])])])])]), e("li", null, [s[7] || (s[7] = e("span", { class: "label" }, [e("label", { for: "cb-settings-plain-classes-hover-preview-classes" }, "Hover Preview")], -1)), e("span", D, [e("div", null, [e("div", H, [a(e("input", { type: "checkbox", "onUpdate:modelValue": s[2] || (s[2] = (n) => l(o)("module.plain-classes.hover-preview-classes", true).value = n), id: "cb-settings-plain-classes-hover-preview-classes" }, null, 512), [[c, l(o)("module.plain-classes.hover-preview-classes", true).value]])])])])]), s[11] || (s[11] = e("li", { class: "disabled sep-t", style: { color: "var(--bricks-text-dark)" } }, " Module: Generate Cache ", -1)), e("li", null, [s[8] || (s[8] = e("span", { class: "label" }, [e("label", { for: "cb-settings-generate-cache-on-save" }, "On Save")], -1)), e("span", R, [e("div", null, [e("div", T, [a(e("input", { type: "checkbox", "onUpdate:modelValue": s[3] || (s[3] = (n) => l(o)("module.generate-cache.on-save", true).value = n), id: "cb-settings-generate-cache-on-save" }, null, 512), [[c, l(o)("module.generate-cache.on-save", true).value]])])])])]), s[12] || (s[12] = e("li", { class: "disabled sep-t", style: { color: "var(--bricks-text-dark)" } }, " Module: HTML2Bricks ", -1)), e("li", null, [s[9] || (s[9] = e("span", { class: "label" }, [e("label", { for: "cb-settings-html2bricks-copy-paste" }, "Copy-Paste")], -1)), e("span", $, [e("div", null, [e("div", F, [a(e("input", { type: "checkbox", "onUpdate:modelValue": s[4] || (s[4] = (n) => l(o)("module.html2bricks.copy-paste", true).value = n), id: "cb-settings-html2bricks-copy-paste" }, null, 512), [[c, l(o)("module.html2bricks.copy-paste", true).value]])])])])])])], 512)), [[V, l(r)]]);
} }, G = _(j, [["__scopeId", "data-v-ba96feb3"]]), N = "#bricks-toolbar ul.group-wrapper.right", W = document.createRange().createContextualFragment(`
    <li id="windpressbricks-settings-navbar" data-balloon="WindPress \u2014 Bricks settings" data-balloon-pos="bottom">
        <span class="bricks-svg-wrapper">
            ${P}
        </span>
    </li>
`), { getVirtualRef: x } = C({}, { persist: "windpress.ui.state" }), y = document.querySelector(N);
y.insertBefore(W, y.firstChild);
const p = document.querySelector("#windpressbricks-settings-navbar"), b = (_a = S) == null ? void 0 : _a.contentDocument.querySelector("#windpress-iframe");
if (b) {
  let t = function(r = true) {
    let i = x("window.minimized", false).value;
    r ? x("window.minimized", false).value = !i : i = !i, i ? p.classList.add("active") : p.classList.remove("active"), b && (b.style.display = i ? "block" : "none");
  };
  p.addEventListener("click", (r) => {
    t();
  }), t(false);
}
const u = m(false), L = m({ x: null, y: null }), v = document.createElement("windpressbricks-settings-app");
v.id = "windpressbricks-settings-app";
v.classList.add("master-css");
document.querySelector("div.brx-body.main").appendChild(v);
p.addEventListener("contextmenu", (t) => {
  t.preventDefault(), u.value = true, L.value = { x: t.clientX, y: t.clientY };
});
function w(t) {
  t.target.closest("#windpressbricks-settings-app") || (u.value = false);
}
h(u, (t) => {
  t ? document.addEventListener("click", w) : document.removeEventListener("click", w);
});
const f = B(G);
f.provide("isOpen", u);
f.provide("mousePosition", L);
f.mount("#windpressbricks-settings-app");
E("Module loaded!", { module: "settings" });

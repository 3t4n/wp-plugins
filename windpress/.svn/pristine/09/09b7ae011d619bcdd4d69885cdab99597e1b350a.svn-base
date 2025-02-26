import { brxGlobalProp as c, brxIframe as E } from "./constant-D6K4uIdy.js";
import { d as _ } from "./vfs-DmzitRvm.js";
import { __tla as __tla_0 } from "./module-oN1JnOJ9.js";
import { __tla as __tla_1 } from "./index-BmQd5Vrd.js";
import { g as O } from "./intellisense-Nf6mwf2_.js";
import { c as P } from "./index.browser-B0na17u1.js";
import { l as k } from "./logger-BTW-zIW3.js";
import "./virtual-Cakm3k_V.js";
import "./index-Dgh2qPwk.js";
import "./isObject-CRxghtyK.js";
import "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./set-DvizEivO.js";
import "./preload-helper-DH9yCMdR.js";
import "./index-BAMY2Nnw.js";
import "./index-CgqXENQe.js";
import "./stylesheet-B98yp78w.js";
import "./index-xtxc-82G.js";
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
  const y = () => P("1234567890abcdefghijklmnopqrstuvwxyz", 6)();
  function A() {
    let s = y();
    for (; s.match(/^\d/); ) s = y();
    return `windpress${s}`;
  }
  async function L() {
    c.$_state.globalVariables = c.$_state.globalVariables.filter((t) => t.category !== "windpress"), c.$_state.globalVariablesCategories.find((t) => t.id === "windpress") || c.$_state.globalVariablesCategories.push({
      id: "windpress",
      name: "WindPress"
    });
    const s = E.contentWindow.document.querySelector('script#windpress\\:vfs[type="text/plain"]'), l = _(s.textContent);
    (await O({
      volume: l
    })).forEach((t) => {
      c.$_state.globalVariables.push({
        id: A(),
        name: t.key.substring(2),
        value: t.value,
        category: "windpress"
      });
    });
  }
  const M = new BroadcastChannel("windpress");
  M.addEventListener("message", async (s) => {
    const l = s.data;
    l.source === "windpress/autocomplete" && l.task === "windpress.code-editor.saved.done" && setTimeout(() => {
      L();
    }, 1e3);
  });
  L();
  function W() {
    var _a, _b, _c, _d;
    if (c.$_state.activePanel !== "element" || !((_b = (_a = c.$_state) == null ? void 0 : _a.activeElement) == null ? void 0 : _b.id) || !((_c = E) == null ? void 0 : _c.contentWindow)) return;
    const t = document.querySelector(".expand .options-wrapper"), p = t == null ? void 0 : t.querySelector(".searchable"), d = t == null ? void 0 : t.querySelector(".dropdown"), m = d == null ? void 0 : d.querySelectorAll(".variable-picker-item:not(.title)"), r = (_d = document.querySelector(".variable-picker-button.open")) == null ? void 0 : _d.previousElementSibling;
    if (!r || !(m == null ? void 0 : m.length) || !t || !d || !p) return;
    const C = (e) => {
      var _a2;
      const n = ((_a2 = e.querySelector("span:first-of-type")) == null ? void 0 : _a2.textContent) ?? "";
      !r || !n || w(g(n));
    }, S = (e) => {
      var _a2;
      const n = ((_a2 = e.querySelector("span:first-of-type")) == null ? void 0 : _a2.textContent) ?? "";
      if (!r || !n) return;
      const o = g(n);
      r.value = o, r.click();
    }, q = (e, n) => {
      e.forEach((o) => {
        o.isIntersecting && !o.target.classList.contains("open") && o.target.click();
      });
    }, b = () => {
      w(x);
      const e = r.nextElementSibling;
      h.observe(e), t.removeEventListener("mouseleave", b);
    }, f = (e, n) => {
      e.forEach((a) => {
        const [V, $] = Object.entries(a)[0] || [];
        n.insertAdjacentHTML("beforeend", `
                <li class="variable-picker-item">
                    <span>${V}</span>
                    <span class="option-value">${$}</span>
                </li>
            `);
      }), i.querySelectorAll(".variable-picker-item").forEach((a) => {
        a.addEventListener("mouseenter", () => C(a)), a.addEventListener("click", () => S(a));
      });
    }, w = (e) => {
      r.value = e, r.dispatchEvent(new Event("input")), r.focus();
    }, g = (e) => `var(--${e})`, u = [];
    d.remove(), m.forEach((e) => {
      var _a2, _b2;
      const n = ((_a2 = e.querySelector("span:first-of-type")) == null ? void 0 : _a2.textContent) ?? "", o = ((_b2 = e.querySelector("span.option-value")) == null ? void 0 : _b2.textContent) ?? "";
      u.push({
        [n]: o
      });
    });
    const i = document.createElement("ul");
    i.classList.add("custom-dropdown"), i.setAttribute("style", `
        max-height: calc(32px * 10);
        overflow: hidden;
        overflow-y: auto;
        position: relative;
        scrollbar-color: rgba(0, 0, 0, .4) rgba(0, 0, 0, .2);
        scrollbar-width: thin;
    `), f(u, i), t.appendChild(i), p.addEventListener("click", (e) => {
      e.preventDefault(), e.stopPropagation();
    }), p.addEventListener("input", (e) => {
      const n = u.filter((o) => {
        var _a2;
        return (((_a2 = Object.keys(o)[0]) == null ? void 0 : _a2.toLowerCase()) ?? "").includes(p.value.toLowerCase());
      });
      i.innerHTML = "", f(n, i);
    });
    let x = (r == null ? void 0 : r.value) ?? " ";
    const h = new IntersectionObserver(q, {
      root: r.parentElement
    });
    t.addEventListener("mouseleave", b), h.disconnect();
  }
  const I = document.querySelector("#bricks-panel-inner:not(div.bricks-control-popup *)");
  if (!I) throw k("Inner panel not found, can't initialize preview of variables on hover", {
    module: "variables",
    type: "error"
  }), new Error("Inner panel not found, can't initialize preview of variables on hover");
  const j = new MutationObserver(W);
  j.observe(I, {
    subtree: true,
    childList: true,
    attributes: true
  });
  k("Module loaded!", {
    module: "variables"
  });
});

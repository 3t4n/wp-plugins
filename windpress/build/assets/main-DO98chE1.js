import { _ as p } from "./preload-helper-DH9yCMdR.js";
import { l as M } from "./logger-BTW-zIW3.js";
import { c as x, a as P, n as b, T as q, t as H, f as F, H as O } from "./highlight-in-textarea-BVs7KfxB.js";
import { settingsState as w, brxGlobalProp as u, brxIframe as v, brxIframeGlobalProp as r } from "./constant-D6K4uIdy.js";
import { d as R } from "./debounce-mLPa8vJU.js";
import { r as k, n as d, w as y } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./index-BAMY2Nnw.js";
import "./index-CgqXENQe.js";
import "./virtual-Cakm3k_V.js";
import "./index-Dgh2qPwk.js";
import "./isObject-CRxghtyK.js";
import "./set-DvizEivO.js";
(async () => {
  let L = null;
  (async () => L = await x({
    themes: [
      p(() => import("./dark-plus-C3mMm8J8.js"), [], import.meta.url),
      p(() => import("./light-plus-B7mTdjB0.js"), [], import.meta.url)
    ],
    langs: [
      p(() => import("./css-BPhBrDlE.js"), [], import.meta.url)
    ],
    engine: P(p(() => import("./wasm-CG6Dc4jp.js"), [], import.meta.url))
  }))();
  const n = document.createRange().createContextualFragment(`
    <textarea id="windpressbricks-plc-input" class="windpressbricks-plc-input" rows="2" spellcheck="false"></textarea>
`).querySelector("#windpressbricks-plc-input"), S = document.createRange().createContextualFragment(`
    <div class="windpressbricks-plc-action-container">
        <div class="actions">
        </div>
    </div>
`).querySelector(".windpressbricks-plc-action-container"), W = S.querySelector(".actions"), I = document.createRange().createContextualFragment(`
    <span id="windpressbricks-plc-class-sort" class="bricks-svg-wrapper windpressbricks-plc-class-sort" data-balloon="Automatic Class Sorting" data-balloon-pos="bottom-right">
        <svg  xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="bricks-svg icon icon-tabler icons-tabler-outline icon-tabler-reorder"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M10 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M17 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M5 11v-3a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v3" /><path d="M16.5 8.5l2.5 2.5l2.5 -2.5" /></svg>    
    </span>
`).querySelector("#windpressbricks-plc-class-sort");
  W.appendChild(I);
  const f = k(false), g = k(null);
  let N = null;
  b(n);
  let T = [];
  wp.hooks.addAction("windpressbricks-autocomplete-items-refresh", "windpressbricks", () => {
    T = wp.hooks.applyFilters("windpressbricks-autocomplete-items", [], n.value);
  });
  wp.hooks.doAction("windpressbricks-autocomplete-items-refresh");
  const a = new q({
    containerClass: "windpressbricks-tribute-container",
    autocompleteMode: true,
    menuItemLimit: 50,
    noMatchTemplate: "",
    values: async function(e, t) {
      if (!w("module.plain-classes.autocomplete", true).value) {
        t([]);
        return;
      }
      const s = await wp.hooks.applyFilters("windpressbricks-autocomplete-items-query", T, e);
      t(s);
    },
    lookup: "value",
    itemClass: "class-item",
    menuItemTemplate: function(e) {
      let t = "";
      return e.original.color !== void 0 && (t += `background-color: ${e.original.color};`), e.original.fontWeight !== void 0 && (t += `font-weight: ${e.original.fontWeight};`), `
            <span class="class-name" data-tribute-class-name="${e.original.value}">${e.string}</span>
            <span class="class-hint" style="${t}"></span>
        `;
    }
  });
  a.setMenuContainer = function(e) {
    this.menuContainer = e;
  };
  const D = a.events.callbacks;
  a.events.callbacks = function() {
    return {
      ...D.call(this),
      up: (e, t) => {
        if (this.tribute.isActive && this.tribute.current.filteredItems) {
          e.preventDefault(), e.stopPropagation();
          let s = this.tribute.current.filteredItems.length, i = this.tribute.menuSelected;
          s > i && i > 0 ? (this.tribute.menuSelected--, this.setActiveLi()) : i === 0 && (this.tribute.menuSelected = s - 1, this.setActiveLi(), this.tribute.menu.scrollTop = this.tribute.menu.scrollHeight), C();
        }
      },
      down: (e, t) => {
        if (this.tribute.isActive && this.tribute.current.filteredItems) {
          e.preventDefault(), e.stopPropagation();
          let s = this.tribute.current.filteredItems.length - 1, i = this.tribute.menuSelected;
          s > i ? (this.tribute.menuSelected++, this.setActiveLi()) : s === i && (this.tribute.menuSelected = 0, this.setActiveLi(), this.tribute.menu.scrollTop = 0), C();
        }
      }
    };
  };
  a.attach(n);
  const z = new MutationObserver(function(e) {
    e.forEach(function(t) {
      t.type === "attributes" ? t.target.id === "bricks-panel-element" && t.attributeName === "style" ? t.target.style.display !== "none" ? f.value = true : f.value = false : t.attributeName === "placeholder" && t.target.tagName === "INPUT" && t.target.classList.contains("placeholder") && (g.value = u.$_activeElement.value.id) : t.type === "childList" && t.addedNodes.length > 0 && (t.target.id === "bricks-panel-sticky" && t.addedNodes[0].id === "bricks-panel-element-classes" ? g.value = u.$_activeElement.value.id : t.target.dataset && t.target.dataset.controlkey === "_cssClasses" && t.addedNodes[0].childNodes.length > 0 && document.querySelector("#_cssClasses").addEventListener("input", function(s) {
        d(() => {
          n.value = s.target.value, E();
        });
      }));
    });
  });
  z.observe(document.getElementById("bricks-panel-element"), {
    subtree: true,
    attributes: true,
    childList: true
  });
  y([
    g,
    f
  ], (e, t) => {
    e[0] !== t[0] && d(() => {
      var _a, _b;
      n.value = ((_b = (_a = u.$_activeElement.value) == null ? void 0 : _a.settings) == null ? void 0 : _b._cssClasses) || "", E();
    }), e[0] && e[1] && d(() => {
      const s = document.querySelector("#bricks-panel-element-classes");
      w("module.plain-classes.input-field", true).value && s.querySelector(".windpressbricks-plc-input") === null && (s.appendChild(S), s.appendChild(n), N = new O(n, {
        highlight: [
          {
            highlight: new RegExp("(?<=\\s|^)(?:(?!\\s).)+(?=\\s|$)", "g"),
            className: "word"
          },
          {
            highlight: new RegExp("(?<=\\s)\\s", "g"),
            className: "multispace",
            blank: true
          }
        ]
      }), b.update(n));
    });
  });
  n.addEventListener("input", function(e) {
    u.$_activeElement.value.settings._cssClasses = e.target.value;
  });
  function E() {
    d(() => {
      try {
        N.handleInput();
      } catch {
      }
      b.update(n), a.hideMenu();
    });
  }
  n.addEventListener("highlights-updated", function(e) {
    B();
  });
  let m = H(document.createElement("div"), {
    plugins: [
      F
    ],
    allowHTML: true,
    arrow: false,
    duration: [
      500,
      0
    ],
    followCursor: true,
    trigger: "manual"
  });
  function B() {
    var _a, _b, _c;
    if (((_c = (_b = (_a = v.contentWindow.windpress) == null ? void 0 : _a.loaded) == null ? void 0 : _b.module) == null ? void 0 : _c.classnameToCss) !== true) return;
    const e = document.querySelector(".hit-container");
    if (e === null) return;
    m.reference = e;
    async function t(l) {
      const o = l.textContent, c = await v.contentWindow.windpress.module.classnameToCss.generate(o);
      if (c === null || c.trim() === "") return null;
      m.setContent(L.codeToHtml(c, {
        lang: "css",
        theme: "dark-plus"
      })), m.show();
    }
    const s = k(null), i = R(function(l) {
      if (!w("module.plain-classes.hover-preview-classes", true).value) return;
      const o = l.clientX, c = l.clientY, $ = document.elementsFromPoint(o, c).find((A) => A.matches('mark[class="word"]'));
      s.value = $ || null;
    }, 10);
    e.addEventListener("mousemove", i), e.addEventListener("mouseleave", function(l) {
      i.cancel(), s.value = null;
    }), y(s, (l, o) => {
      l && l !== o ? t(l) : m.hide();
    });
  }
  const j = new MutationObserver(function(e) {
    e.forEach(function(t) {
      t.type === "childList" && t.addedNodes.length > 0 && t.addedNodes.forEach((s) => {
        const i = s.querySelector(".class-name").dataset.tributeClassName;
        s.addEventListener("mouseenter", (l) => {
          G(i);
        }), s.addEventListener("mouseleave", (l) => {
          _();
        }), s.addEventListener("click", (l) => {
          _();
        });
      });
    });
  });
  let h = null;
  n.addEventListener("tribute-active-true", function(e) {
    h === null && (h = document.querySelector(".windpressbricks-tribute-container>ul")), d(() => {
      h && j.observe(h, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: [
          "class"
        ]
      });
    });
  });
  I.addEventListener("click", async function(e) {
    var _a, _b, _c;
    ((_c = (_b = (_a = v.contentWindow.windpress) == null ? void 0 : _a.loaded) == null ? void 0 : _b.module) == null ? void 0 : _c.classSorter) === true && (n.value = await v.contentWindow.windpress.module.classSorter.sort(n.value), u.$_activeElement.value.settings._cssClasses = n.value, E());
  });
  function G(e) {
    r.$_getElementNode(r.$_activeElement.value).classList.add(e);
  }
  function _() {
    const e = r.$_activeElement.value, t = r.$_getElementNode(e), s = r.$_getElementClasses(e);
    t.classList.value = s.join(" ");
  }
  function C() {
    let e = a.menu.querySelector("li.highlight>span.class-name");
    const t = r.$_activeElement.value, s = r.$_getElementNode(t), i = r.$_getElementClasses(t);
    s.classList.value = i.join(" ") + " " + e.dataset.tributeClassName;
  }
  M("Module loaded!", {
    module: "plain-classes"
  });
})();

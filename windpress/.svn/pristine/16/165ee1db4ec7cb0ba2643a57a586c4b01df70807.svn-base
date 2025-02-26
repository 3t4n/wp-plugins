import { _ as p } from "./preload-helper-DH9yCMdR.js";
import { l as F } from "./logger-BTW-zIW3.js";
import { c as H, a as N, n as g, T as O, t as W, f as R, H as D } from "./highlight-in-textarea-BVs7KfxB.js";
import { iframeScope as r, oxyIframe as u, oxygenScope as y } from "./constant-DFowkQsk.js";
import { d as $ } from "./debounce-mLPa8vJU.js";
import { r as f, w as C, n as d } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./index-BAMY2Nnw.js";
import "./index-CgqXENQe.js";
import "./isObject-CRxghtyK.js";
(async () => {
  let x = null;
  (async () => x = await H({
    themes: [
      p(() => import("./dark-plus-C3mMm8J8.js"), [], import.meta.url),
      p(() => import("./light-plus-B7mTdjB0.js"), [], import.meta.url)
    ],
    langs: [
      p(() => import("./css-BPhBrDlE.js"), [], import.meta.url)
    ],
    engine: N(p(() => import("./wasm-CG6Dc4jp.js"), [], import.meta.url))
  }))();
  const i = document.createRange().createContextualFragment(`
    <textarea id="windpressoxygen-plc-input" class="windpressoxygen-plc-input" rows="2" spellcheck="false"></textarea>
`).querySelector("#windpressoxygen-plc-input"), E = document.createRange().createContextualFragment(`
    <div class="windpressoxygen-plc-action-container">
        <div class="actions">
        </div>
    </div>
`).querySelector(".windpressoxygen-plc-action-container"), z = E.querySelector(".actions"), A = document.createRange().createContextualFragment(`
        <span id="windpressoxygen-plc-class-sort" class="oxygen-svg-wrapper windpressoxygen-plc-class-sort">
            <svg  xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="oxygen-svg icon icon-tabler icons-tabler-outline icon-tabler-reorder"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M10 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M17 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M5 11v-3a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v3" /><path d="M16.5 8.5l2.5 2.5l2.5 -2.5" /></svg>    
        </span>
`).querySelector("#windpressoxygen-plc-class-sort");
  z.appendChild(A);
  const k = f(false), v = f(null);
  let S = null;
  g(i);
  let I = [];
  wp.hooks.addAction("windpressoxygen-autocomplete-items-refresh", "windpressoxygen", () => {
    I = wp.hooks.applyFilters("windpressoxygen-autocomplete-items", [], i.value);
  });
  wp.hooks.doAction("windpressoxygen-autocomplete-items-refresh");
  const c = new O({
    containerClass: "windpressoxygen-tribute-container",
    autocompleteMode: true,
    menuItemLimit: 40,
    noMatchTemplate: "",
    values: async function(e, n) {
      const t = await wp.hooks.applyFilters("windpressoxygen-autocomplete-items-query", I, e);
      n(t);
    },
    lookup: "value",
    itemClass: "class-item",
    menuItemTemplate: function(e) {
      let n = "";
      return e.original.color !== void 0 && (n += `background-color: ${e.original.color};`), e.original.fontWeight !== void 0 && (n += `font-weight: ${e.original.fontWeight};`), `
            <span class="class-name" data-tribute-class-name="${e.original.value}">${e.string}</span>
            <span class="class-hint" style="${n}"></span>
        `;
    }
  });
  c.setMenuContainer = function(e) {
    this.menuContainer = e;
  };
  const B = c.events.callbacks;
  c.events.callbacks = function() {
    return {
      ...B.call(this),
      up: (e, n) => {
        if (this.tribute.isActive && this.tribute.current.filteredItems) {
          e.preventDefault(), e.stopPropagation();
          let t = this.tribute.current.filteredItems.length, s = this.tribute.menuSelected;
          t > s && s > 0 ? (this.tribute.menuSelected--, this.setActiveLi()) : s === 0 && (this.tribute.menuSelected = t - 1, this.setActiveLi(), this.tribute.menu.scrollTop = this.tribute.menu.scrollHeight), b();
        }
      },
      down: (e, n) => {
        if (this.tribute.isActive && this.tribute.current.filteredItems) {
          e.preventDefault(), e.stopPropagation();
          let t = this.tribute.current.filteredItems.length - 1, s = this.tribute.menuSelected;
          t > s ? (this.tribute.menuSelected++, this.setActiveLi()) : t === s && (this.tribute.menuSelected = 0, this.setActiveLi(), this.tribute.menu.scrollTop = 0), b();
        }
      }
    };
  };
  c.attach(i);
  const j = new MutationObserver(function(e) {
    k.value = !e[0].target.classList.contains("ng-hide");
  });
  j.observe(document.querySelector(".oxygen-sidebar-currently-editing"), {
    attributes: true,
    attributeFilter: [
      "class"
    ]
  });
  const U = r.activateComponent;
  r.activateComponent = function(e, n, t) {
    U(e, n, t), v.value = r.component.active.id;
  };
  function _(e) {
    const n = r.component.active.id, t = r.component.active.name;
    if (n === 0) return;
    const s = r.component.options[n];
    if (s.model === void 0) return;
    s.model["custom-attributes"] === void 0 && y.addCustomAttribute("plainclass", e);
    const o = s.model["custom-attributes"], a = o.find((l) => l.name === "plainclass");
    a ? a.value = e : o.push({
      name: "plainclass",
      value: e
    }), r.component.options[n].model["custom-attributes"] = o, r.setOption(n, t, "custom-attributes"), r.applyCustomAttributes(n);
  }
  C([
    v,
    k
  ], (e, n) => {
    e[0] !== n[0] && d(() => {
      var _a;
      const t = r.component.active.id;
      if (t === 0) return;
      const s = r.component.options[t];
      if (s.model === void 0) return;
      s.model["custom-attributes"] === void 0 && y.addCustomAttribute("plainclass", "");
      const o = s.model["custom-attributes"];
      i.value = ((_a = o == null ? void 0 : o.find((a) => a.name === "plainclass")) == null ? void 0 : _a.value) || "", L();
    }), e[0] && e[1] && d(() => {
      const t = document.querySelector(".oxygen-sidebar-currently-editing");
      t.querySelector(".windpressoxygen-plc-input") === null && (t.appendChild(E), window.tippy(".windpressoxygen-plc-class-sort", {
        content: "Automatic Class Sorting",
        animation: "shift-toward",
        placement: "right"
      }), t.appendChild(i), S = new D(i, {
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
      }), g.update(i));
    });
  });
  i.addEventListener("input", function(e) {
    _(e.target.value);
  });
  function L() {
    d(() => {
      try {
        S.handleInput();
      } catch {
      }
      g.update(i), c.hideMenu();
    });
  }
  i.addEventListener("highlights-updated", function(e) {
    X();
  });
  let m = W(document.createElement("div"), {
    plugins: [
      R
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
  function X() {
    var _a, _b, _c;
    if (((_c = (_b = (_a = u.contentWindow.windpress) == null ? void 0 : _a.loaded) == null ? void 0 : _b.module) == null ? void 0 : _c.classnameToCss) !== true) return;
    const e = document.querySelector(".hit-container");
    if (e === null) return;
    m.reference = e;
    async function n(o) {
      const a = o.textContent, l = await u.contentWindow.windpress.module.classnameToCss.generate(a);
      if (l === null || l.trim() === "") return null;
      m.setContent(x.codeToHtml(l, {
        lang: "css",
        theme: "dark-plus"
      })), m.show();
    }
    const t = f(null), s = $(function(o) {
      const a = o.clientX, l = o.clientY, P = document.elementsFromPoint(a, l).find((q) => q.matches('mark[class="word"]'));
      t.value = P || null;
    }, 10);
    e.addEventListener("mousemove", s), e.addEventListener("mouseleave", function(o) {
      s.cancel(), t.value = null;
    }), C(t, (o, a) => {
      o && o !== a ? n(o) : m.hide();
    });
  }
  const Y = new MutationObserver(function(e) {
    e.forEach(function(n) {
      n.type === "childList" && n.addedNodes.length > 0 && n.addedNodes.forEach((t) => {
        t.addEventListener("mouseenter", (s) => {
          const o = t.querySelector(".class-name").dataset.tributeClassName;
          T(o);
        }), t.addEventListener("mouseleave", (s) => {
          w();
        }), t.addEventListener("click", (s) => {
          w();
        });
      });
    });
  });
  let h = null;
  i.addEventListener("tribute-active-true", function(e) {
    h === null && (h = document.querySelector(".windpressoxygen-tribute-container>ul")), d(() => {
      h && Y.observe(h, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: [
          "class"
        ]
      });
    });
  });
  A.addEventListener("click", async function(e) {
    var _a, _b, _c;
    ((_c = (_b = (_a = u.contentWindow.windpress) == null ? void 0 : _a.loaded) == null ? void 0 : _b.module) == null ? void 0 : _c.classSorter) === true && (i.value = await u.contentWindow.windpress.module.classSorter.sort(i.value), _(i.value), L());
  });
  function T(e) {
    M({
      action: "windpressoxygen-preview-class",
      do: "add",
      elementId: v.value,
      className: e
    });
  }
  function w() {
    M({
      action: "windpressoxygen-preview-class",
      do: "remove"
    });
  }
  function b() {
    d(() => {
      let e = c.menu.querySelector("li.highlight>span.class-name");
      T(e.dataset.tributeClassName);
    });
  }
  function M(e) {
    u.contentWindow.postMessage(e, "*");
  }
  F("Module loaded!", {
    module: "plain-classes"
  });
})();

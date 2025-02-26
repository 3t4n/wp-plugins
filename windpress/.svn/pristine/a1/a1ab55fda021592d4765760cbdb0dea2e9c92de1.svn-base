import { _ as c } from "./preload-helper-DH9yCMdR.js";
import { l as k } from "./logger-BTW-zIW3.js";
import { c as P, a as $, n as y, T as N, H, t as D, f as F } from "./highlight-in-textarea-BVs7KfxB.js";
import { bdeV as m, bdeIframeV as E, bdeIframeCanvas as C, bdeIframe as g } from "./constant-BZV3uY6b.js";
import { d as S } from "./debounce-mLPa8vJU.js";
import { s as R } from "./set-DvizEivO.js";
import { r as v, w as L, n as p } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./index-BAMY2Nnw.js";
import "./index-CgqXENQe.js";
import "./isObject-CRxghtyK.js";
(async () => {
  let T = null;
  (async () => T = await P({
    themes: [
      c(() => import("./dark-plus-C3mMm8J8.js"), [], import.meta.url),
      c(() => import("./light-plus-B7mTdjB0.js"), [], import.meta.url)
    ],
    langs: [
      c(() => import("./css-BPhBrDlE.js"), [], import.meta.url)
    ],
    engine: $(c(() => import("./wasm-CG6Dc4jp.js"), [], import.meta.url))
  }))();
  const r = document.createRange().createContextualFragment(`
    <textarea id="windpressbreakdance-plc-input" class="windpressbreakdance-plc-input" rows="2" spellcheck="false"></textarea>
`).querySelector("#windpressbreakdance-plc-input"), f = document.createElement("div");
  f.classList.add("windpressbreakdance-plc-input-container");
  f.appendChild(r);
  const O = document.createRange().createContextualFragment(`
    <div class="windpressbreakdance-plc-action-container">
        <div class="actions">
        </div>
    </div>
`).querySelector(".windpressbreakdance-plc-action-container"), W = O.querySelector(".actions"), U = document.createRange().createContextualFragment(`
    <span id="windpressbreakdance-plc-class-sort" class="bricks-svg-wrapper windpressbreakdance-plc-class-sort" data-balloon="Automatic Class Sorting" data-balloon-pos="bottom-right">
        <svg  xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="bricks-svg icon icon-tabler icons-tabler-outline icon-tabler-reorder"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M10 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M17 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" /><path d="M5 11v-3a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v3" /><path d="M16.5 8.5l2.5 2.5l2.5 -2.5" /></svg>    
    </span>
`).querySelector("#windpressbreakdance-plc-class-sort");
  W.appendChild(U);
  const _ = v(false), I = v(null);
  let q = null;
  y(r);
  let A = [];
  wp.hooks.addAction("windpressbreakdance-autocomplete-items-refresh", "windpressbreakdance", () => {
    A = wp.hooks.applyFilters("windpressbreakdance-autocomplete-items", [], r.value);
  });
  wp.hooks.doAction("windpressbreakdance-autocomplete-items-refresh");
  const o = new N({
    menuContainer: document.querySelector("#app"),
    containerClass: "windpressbreakdance-tribute-container",
    autocompleteMode: true,
    menuItemLimit: 50,
    noMatchTemplate: "",
    values: async function(e, s) {
      const t = await wp.hooks.applyFilters("windpressbreakdance-autocomplete-items-query", A, e);
      s(t);
    },
    lookup: "value",
    itemClass: "class-item",
    menuItemTemplate: function(e) {
      let s = "";
      return e.original.color !== void 0 && (s += `background-color: ${e.original.color};`), e.original.fontWeight !== void 0 && (s += `font-weight: ${e.original.fontWeight};`), `
            <span class="class-name" data-tribute-class-name="${e.original.value}">${e.string}</span>
            <span class="class-hint" style="${s}"></span>
        `;
    }
  });
  o.setMenuContainer = function(e) {
    this.menuContainer = e;
  };
  const z = o.events.callbacks;
  o.events.callbacks = function() {
    return {
      ...z.call(this),
      up: (e, s) => {
        if (this.tribute.isActive && this.tribute.current.filteredItems) {
          e.preventDefault(), e.stopPropagation();
          let t = this.tribute.current.filteredItems.length, n = this.tribute.menuSelected;
          t > n && n > 0 ? (this.tribute.menuSelected--, this.setActiveLi()) : n === 0 && (this.tribute.menuSelected = t - 1, this.setActiveLi(), this.tribute.menu.scrollTop = this.tribute.menu.scrollHeight), w();
        }
      },
      down: (e, s) => {
        if (this.tribute.isActive && this.tribute.current.filteredItems) {
          e.preventDefault(), e.stopPropagation();
          let t = this.tribute.current.filteredItems.length - 1, n = this.tribute.menuSelected;
          t > n ? (this.tribute.menuSelected++, this.setActiveLi()) : t === n && (this.tribute.menuSelected = 0, this.setActiveLi(), this.tribute.menu.scrollTop = 0), w();
        }
      }
    };
  };
  o.attach(r);
  m.$store.subscribeAction((e, s) => {
    e.type === "ui/activateElement" && (I.value = e.payload), e.type === "ui/setLeftSidebarState" && (_.value = e.payload === "elementproperties");
  });
  L([
    I,
    _
  ], (e, s) => {
    e[0] !== s[0] && p(() => {
      B(), Y();
    }), e[0] && e[1] && p(() => {
      const t = document.querySelector(".breakdance-element-properties-panel .vscroll-scroll .vscroll-scroll");
      t && t.querySelector(".windpressbreakdance-plc-input") === null && t.insertBefore(f, t.firstChild);
    });
  });
  q = new H(r, {
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
  });
  async function B() {
    var _a, _b, _c, _d, _e;
    r.value = ((_e = (_d = (_c = (_b = (_a = m.$store.getters["ui/activeElement"].data) == null ? void 0 : _a.properties) == null ? void 0 : _b.settings) == null ? void 0 : _c.advanced) == null ? void 0 : _d.classes) == null ? void 0 : _e.join(" ")) || "";
  }
  async function j() {
    var _a, _b, _c, _d;
    if ((_d = (_c = (_b = (_a = m.$store.getters["ui/activeElement"].data) == null ? void 0 : _a.properties) == null ? void 0 : _b.settings) == null ? void 0 : _c.advanced) == null ? void 0 : _d.classes) return true;
    document.querySelector(".properties-panel-tab.breakdance-tab.breakdance-tab--id-settings").click();
    let s = document.querySelector("#settings .properties-panel-accordion.conditional-control-display-visible>div");
    for (; s === null; ) s = document.querySelector("#settings .properties-panel-accordion.conditional-control-display-visible>div"), await new Promise((i) => setTimeout(i, 100));
    s.parentElement.classList.contains("expanded") || s.click();
    let t = document.querySelector('#breakdance-class-input-search input[placeholder=".my-cool-class"]');
    for (; t === null; ) t = document.querySelector('#breakdance-class-input-search input[placeholder=".my-cool-class"]'), await new Promise((i) => setTimeout(i, 100));
    t.focus();
    const n = "windpressbreakdance";
    return t.value = n, t.dispatchEvent(new Event("input", {
      bubbles: true
    })), await new Promise((i) => setTimeout(i, 100)), document.querySelector("#breakdance-class-input-search>button").click(), true;
  }
  const V = S(X, 50);
  async function X() {
    if (!await j()) {
      k("Upstream path not found!", {
        module: "plain-classes",
        type: "error"
      });
      return;
    }
    r.focus(), R(m.$store.getters["ui/activeElement"].data, "properties.settings.advanced.classes", r.value.trim().split(" ").filter((e) => e.trim() !== "") || []);
  }
  r.addEventListener("input", function(e) {
    V();
  });
  function Y() {
    p(() => {
      try {
        q.handleInput();
      } catch {
      }
      y.update(r), o.hideMenu();
    });
  }
  const G = new MutationObserver(function(e) {
    e.forEach(function(s) {
      s.type === "childList" && s.addedNodes.length > 0 && s.addedNodes.forEach((t) => {
        const n = t.querySelector(".class-name").dataset.tributeClassName;
        t.addEventListener("mouseenter", (a) => {
          h(n);
        }), t.addEventListener("mouseleave", (a) => {
          b();
        }), t.addEventListener("click", (a) => {
          b(), h(n);
        });
      });
    });
  });
  let u = null;
  r.addEventListener("tribute-active-true", function(e) {
    u === null && (u = document.querySelector(".windpressbreakdance-tribute-container>ul")), p(() => {
      u && G.observe(u, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: [
          "class"
        ]
      });
    });
  });
  function h(e) {
    const s = E.$store.getters["ui/activeElement"].id, t = C.querySelector(`[data-node-id="${s}"]`);
    t.classList.add(e), t.dataset.tributeClassName = e;
  }
  function b() {
    J();
  }
  function w() {
    let e = o.menu.querySelector("li.highlight>span.class-name");
    b(), h(e.dataset.tributeClassName);
  }
  function J() {
    const e = E.$store.getters["ui/activeElement"].id, s = C.querySelector(`[data-node-id="${e}"]`);
    s.dataset.tributeClassName && (s.classList.remove(s.dataset.tributeClassName), s.dataset.tributeClassName = "");
  }
  r.addEventListener("highlights-updated", function(e) {
    K();
  });
  let d = D(document.createElement("div"), {
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
  function K() {
    var _a, _b, _c;
    if (((_c = (_b = (_a = g.contentWindow.windpress) == null ? void 0 : _a.loaded) == null ? void 0 : _b.module) == null ? void 0 : _c.classnameToCss) !== true) return;
    const e = document.querySelector(".hit-container");
    if (e === null) return;
    d.reference = e;
    async function s(a) {
      const i = a.textContent, l = await g.contentWindow.windpress.module.classnameToCss.generate(i);
      if (l === null || l.trim() === "") return null;
      d.setContent(T.codeToHtml(l, {
        lang: "css",
        theme: document.querySelector("div#app.theme--light") !== null ? "light-plus" : "dark-plus"
      })), d.show();
    }
    const t = v(null), n = S(function(a) {
      const i = a.clientX, l = a.clientY, x = document.elementsFromPoint(i, l).find((M) => M.matches('mark[class="word"]'));
      t.value = x || null;
    }, 10);
    e.addEventListener("mousemove", n), e.addEventListener("mouseleave", function(a) {
      n.cancel(), t.value = null;
    }), L(t, (a, i) => {
      a && a !== i ? s(a) : d.hide();
    });
  }
  k("Module loaded!", {
    module: "plain-classes"
  });
})();

import { _ as p } from "../../preload-helper-DH9yCMdR.js";
import { c as A, a as x, T as M, t as N, n as k, f as P, H as D } from "../../highlight-in-textarea-BVs7KfxB.js";
import { d as W } from "../../debounce-mLPa8vJU.js";
import { r as d, w as R, n as g } from "../../runtime-core.esm-bundler-CxI1Hi6i.js";
import "../../index-BAMY2Nnw.js";
import "../../index-CgqXENQe.js";
import "../../isObject-CRxghtyK.js";
(async () => {
  const B = (e) => React.createElement("svg", {
    id: "Capa_1",
    xmlns: "http://www.w3.org/2000/svg",
    xmlnsXlink: "http://www.w3.org/1999/xlink",
    x: "0px",
    y: "0px",
    viewBox: "0 0 512 512",
    style: {
      enableBackground: "new 0 0 512 512"
    },
    xmlSpace: "preserve",
    ...e
  }, React.createElement("g", null, React.createElement("path", {
    d: "M176,384H16c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h160c8.832,0,16,7.2,16,16s-7.168,16-16,16 c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c26.464,0,48-21.536,48-48S202.464,384,176,384z"
  })), React.createElement("g", null, React.createElement("path", {
    d: "M240,256c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c8.832,0,16,7.2,16,16s-7.168,16-16,16H16 c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h224c26.464,0,48-21.536,48-48S266.464,256,240,256z"
  })), React.createElement("g", null, React.createElement("path", {
    d: "M288,32C164.288,32,64,132.288,64,256c0,10.88,1.056,21.536,2.56,32h128.192c-1.792-4.992-2.752-10.4-2.752-16 c0-26.464,21.536-48,48-48c44.096,0,80,35.904,80,80c0,44.128-35.904,80-80,80h-0.416C249.76,397.408,256,413.92,256,432 c0,16.032-4.864,30.944-13.024,43.456c14.56,2.976,29.6,4.544,45.024,4.544c123.712,0,224-100.288,224-224S411.712,32,288,32z"
  })));
  let _ = null;
  const H = (e) => React.createElement(B, {
    ...e,
    width: 20,
    height: 20,
    "aria-hidden": "true",
    focusable: "false"
  });
  (async () => _ = await A({
    themes: [
      p(() => import("../../dark-plus-C3mMm8J8.js"), [], import.meta.url),
      p(() => import("../../light-plus-B7mTdjB0.js"), [], import.meta.url)
    ],
    langs: [
      p(() => import("../../css-BPhBrDlE.js"), [], import.meta.url)
    ],
    engine: x(p(() => import("../../wasm-CG6Dc4jp.js"), [], import.meta.url))
  }))();
  const l = d(null);
  let y = null, I = [];
  wp.hooks.addAction("windpressgutenberg-autocomplete-items-refresh", "windpressgutenberg", () => {
    I = wp.hooks.applyFilters("windpressgutenberg-autocomplete-items", [], "");
  });
  wp.hooks.doAction("windpressgutenberg-autocomplete-items-refresh");
  const c = new M({
    containerClass: "windpressgutenberg-tribute-container",
    autocompleteMode: true,
    menuItemLimit: 50,
    noMatchTemplate: "",
    values: async function(e, t) {
      const n = await wp.hooks.applyFilters("windpressgutenberg-autocomplete-items-query", I, e);
      t(n);
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
  c.setMenuContainer = function(e) {
    this.menuContainer = e;
  };
  const O = c.events.callbacks;
  c.events.callbacks = function() {
    return {
      ...O.call(this),
      up: (e, t) => {
        if (this.tribute.isActive && this.tribute.current.filteredItems) {
          e.preventDefault(), e.stopPropagation();
          let n = this.tribute.current.filteredItems.length, s = this.tribute.menuSelected;
          n > s && s > 0 ? (this.tribute.menuSelected--, this.setActiveLi()) : s === 0 && (this.tribute.menuSelected = n - 1, this.setActiveLi(), this.tribute.menu.scrollTop = this.tribute.menu.scrollHeight), C();
        }
      },
      down: (e, t) => {
        if (this.tribute.isActive && this.tribute.current.filteredItems) {
          e.preventDefault(), e.stopPropagation();
          let n = this.tribute.current.filteredItems.length - 1, s = this.tribute.menuSelected;
          n > s ? (this.tribute.menuSelected++, this.setActiveLi()) : n === s && (this.tribute.menuSelected = 0, this.setActiveLi(), this.tribute.menu.scrollTop = 0), C();
        }
      }
    };
  };
  let h = N(document.createElement("div"), {
    plugins: [
      P
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
  function E() {
    var _a, _b, _c;
    if (((_c = (_b = (_a = window.windpress) == null ? void 0 : _a.loaded) == null ? void 0 : _b.module) == null ? void 0 : _c.classnameToCss) !== true) return;
    const e = document.querySelector(".hit-container");
    if (e === null) return;
    h.reference = e;
    async function t(a) {
      const o = a.textContent, i = await window.windpress.module.classnameToCss.generate(o);
      if (i === null || i.trim() === "") return null;
      h.setContent(_.codeToHtml(i, {
        lang: "css",
        theme: "dark-plus"
      })), h.show();
    }
    const n = d(null), s = W(function(a) {
      const o = a.clientX, i = a.clientY, r = document.elementsFromPoint(o, i).find((S) => S.matches('mark[class="word"]'));
      n.value = r || null;
    }, 10);
    e.addEventListener("mousemove", s), e.addEventListener("mouseleave", function(a) {
      s.cancel(), n.value = null;
    }), R(n, (a, o) => {
      a && a !== o ? t(a) : h.hide();
    });
  }
  const w = d(null), u = d(null), m = d(null);
  function C() {
    let e = c.menu.querySelector("li.highlight>span.class-name");
    m.value && f(m.value), m.value = e.dataset.tributeClassName, T(e.dataset.tributeClassName);
  }
  let v = null;
  const $ = new MutationObserver(function(e) {
    e.forEach(function(t) {
      t.type === "childList" && t.addedNodes.length > 0 && t.addedNodes.forEach((n) => {
        const s = n.querySelector(".class-name").dataset.tributeClassName;
        n.addEventListener("mouseenter", (a) => {
          T(s);
        }), n.addEventListener("mouseleave", (a) => {
          f(s);
        }), n.addEventListener("click", (a) => {
        }, {
          capture: true
        });
      });
    });
  });
  function T(e) {
    const t = document.querySelector('iframe[name="editor-canvas"]'), n = t.contentWindow || t, a = (t.contentDocument || n.document).getElementById(`block-${w.value}`);
    a && a.classList.add(e);
  }
  function f(e) {
    const t = document.querySelector('iframe[name="editor-canvas"]'), n = t.contentWindow || t, a = (t.contentDocument || n.document).getElementById(`block-${w.value}`);
    a && u.value && !u.value.includes(e) && a.classList.remove(e);
  }
  R(l, (e, t) => {
    e && (k(l.value), c.attach(l.value), setTimeout(() => {
      y = new D(l.value, {
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
      }), E(), l.value.addEventListener("highlights-updated", function(n) {
        E();
      }), l.value.addEventListener("tribute-active-true", function(n) {
        v === null && (v = document.querySelector(".windpressgutenberg-tribute-container>ul")), g(() => {
          v && $.observe(v, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: [
              "class"
            ]
          });
        });
      }), l.value.addEventListener("tribute-active-false", function(n) {
        m.value && f(m.value);
      }), g(() => {
        L();
      });
    }, 10));
  });
  function L() {
    g(() => {
      try {
        y.handleInput();
      } catch {
      }
      k.update(l.value), c.hideMenu();
    });
  }
  function q(e) {
    return (t) => {
      const { name: n, clientId: s, attributes: a, setAttributes: o } = t;
      React.useEffect(() => {
        w.value = s, u.value = a.className;
      });
      function i(r) {
        o({
          className: r
        }), u.value = r;
      }
      async function b() {
        var _a, _b;
        if (((_b = (_a = windpress == null ? void 0 : windpress.loaded) == null ? void 0 : _a.module) == null ? void 0 : _b.classSorter) !== true) return;
        const r = await windpress.module.classSorter.sort(a.className);
        o({
          className: r
        }), u.value = r, L();
      }
      return React.createElement(React.Fragment, null, React.createElement(e, {
        ...t
      }), React.createElement(wp.blockEditor.InspectorControls, null, React.createElement(wp.components.PanelBody, {
        title: wp.i18n.__("WindPress", "windpress"),
        icon: H,
        initialOpen: true
      }, React.createElement(wp.components.PanelRow, {
        className: "windpressgutenberg-actions"
      }, React.createElement(wp.components.ButtonGroup, null, React.createElement(wp.components.Button, {
        showTooltip: true,
        label: wp.i18n.__("Automatic Class Sorting", "windpress"),
        onClick: b
      }, React.createElement("svg", {
        xmlns: "http://www.w3.org/2000/svg",
        width: "24",
        height: "24",
        viewBox: "0 0 24 24",
        fill: "none",
        stroke: "currentColor",
        "stroke-width": "2",
        "stroke-linecap": "round",
        "stroke-linejoin": "round",
        class: "tabler-icon tabler-icon-reorder icon icon-tabler icons-tabler-outline icon-tabler-reorder"
      }, React.createElement("path", {
        d: "M3 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z"
      }), React.createElement("path", {
        d: "M10 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z"
      }), React.createElement("path", {
        d: "M17 15m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z"
      }), React.createElement("path", {
        d: "M5 11v-3a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v3"
      }), React.createElement("path", {
        d: "M16.5 8.5l2.5 2.5l2.5 -2.5"
      }))))), React.createElement(wp.components.TextareaControl, {
        value: a.className,
        onChange: (r) => i(r),
        onInput: (r) => i(r.target.value),
        ref: (r) => l.value = r
      }))));
    };
  }
  wp.hooks.addFilter("editor.BlockEdit", "windpress/add-class-inspector-controls", q);
})();

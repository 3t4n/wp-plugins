import { _ as z, T as oe, e as ne, d as re } from "./_plugin-vue_export-helper-Ds8ZmEpB.js";
import { l as L } from "./logger-BTW-zIW3.js";
import { L as se, _ as ae, G as le, F as ie } from "./xmark-CRWel2Xe.js";
import { brx as H, brxGlobalProp as M, brxIframe as ce } from "./constant-D6K4uIdy.js";
import { f as _, q as J, D as ue, A as N, u as b, v as m, x as k, z as T, B as h, C as I, H as pe, r as $, w as V, T as G, L as P, M as x, G as D, J as O, K as q, E as j, F as de, S as ve, n as fe } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import { d as me } from "./vfs-DmzitRvm.js";
import { __tla as __tla_0 } from "./module-oN1JnOJ9.js";
import { __tla as __tla_1 } from "./index-BmQd5Vrd.js";
import { g as be } from "./intellisense-Nf6mwf2_.js";
import { _ as ge } from "./chevron-right-B3dVAQk8.js";
import { a as ye } from "./index-Dgh2qPwk.js";
import { s as ke } from "./set-DvizEivO.js";
import "./virtual-Cakm3k_V.js";
import "./isObject-CRxghtyK.js";
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
  const he = {
    id: "windpressbricks-variable-app-header",
    class: "bg:$(builder-bg) cursor:grab bb:1|solid|$(builder-border-color)"
  }, _e = {
    class: "flex gap:10 align-items:center"
  }, we = {
    class: "flex align-items:center px:12 py:2"
  }, Ee = {
    class: "font:bold gap:10 text:center flex-grow:1 align-items:center cursor:default px:12 py:2"
  }, $e = {
    __name: "PanelHeader",
    setup(l) {
      const t = _("variableApp"), i = _("isOpen");
      function v() {
        const o = t.querySelector("#windpressbricks-variable-app-header");
        let c = $(false), y = 0, u = 0;
        V(c, (s) => {
          s ? (document.body.style.userSelect = "none", H.style.pointerEvents = "none", o.style.cursor = "grabbing") : (document.body.style.removeProperty("user-select"), H.style.removeProperty("pointer-events"), o.style.cursor = "grab");
        });
        const g = (s) => {
          c.value = true;
          const n = o.getBoundingClientRect();
          y = s.clientX - n.left, u = s.clientY - n.top;
        };
        o.removeEventListener("mousedown", g), o.addEventListener("mousedown", g);
        const f = (s) => {
          if (!c.value) return;
          const n = o.getBoundingClientRect(), d = s.clientX, a = s.clientY, e = d - y, r = a - u, w = e < 0 ? 0 : e > window.innerWidth - n.width ? window.innerWidth - n.width : e, E = r < 0 ? 0 : r > window.innerHeight - n.height ? window.innerHeight - n.height : r;
          t.style.left = `${w}px`, t.style.top = `${E}px`;
        };
        document.removeEventListener("mousemove", f), document.addEventListener("mousemove", f);
        const p = (s) => {
          c.value = false;
        };
        document.removeEventListener("mouseup", p), document.addEventListener("mouseup", p);
      }
      return J(() => {
        v();
      }), (o, c) => {
        const y = ue("inline-svg"), u = ae, g = N("tooltip");
        return m(), b("div", he, [
          k("div", _e, [
            k("div", we, [
              h(y, {
                src: I(se),
                class: "inline-svg fill:current font:24"
              }, null, 8, [
                "src"
              ])
            ]),
            T((m(), b("div", Ee, c[1] || (c[1] = [
              pe(" WindPress ")
            ]))), [
              [
                g,
                {
                  placement: "top",
                  content: `v${o.windpressbricks._version}`
                }
              ]
            ]),
            T((m(), b("button", {
              onClick: c[0] || (c[0] = (f) => i.value = !I(i)),
              class: "flex align-items:center py:10 px:12 bg:transparent bg:$(builder-bg-accent):hover"
            }, [
              h(u, {
                class: "iconify fg:$(builder-color)"
              })
            ])), [
              [
                g,
                {
                  placement: "top",
                  content: "Close"
                }
              ]
            ])
          ])
        ]);
      };
    }
  }, Ce = {
    class: "flex-grow:1"
  }, xe = {
    key: 0,
    class: "expansion-panel__body"
  }, Ie = {
    __name: "ExpansionPanel",
    props: {
      namespace: {
        type: String,
        required: true
      },
      name: {
        type: String,
        required: true
      }
    },
    setup(l, { expose: t }) {
      const i = l, v = $(null), o = ye(`windpressbricks-variable-app.ui.expansion-panels.${i.namespace}`, {
        [`${i.name}`]: false
      }, void 0, {
        mergeDefaults: true
      });
      function c(u) {
        o.value[i.name] = u === null ? !o.value[i.name] : u;
      }
      function y() {
        v.value.scrollIntoView();
      }
      return t({
        togglePanel: c,
        scrollIntoView: y
      }), (u, g) => {
        const f = ge;
        return m(), b("div", {
          ref_key: "sectionRef",
          ref: v,
          class: "expansion-panel mx:10 py:8 mr:4"
        }, [
          k("div", {
            onClick: g[0] || (g[0] = (p) => I(o)[l.name] = !I(o)[l.name]),
            class: P([
              {},
              "expansion-panel__header flex justify-content:space-between p:10 r:8 cursor:pointer"
            ])
          }, [
            k("div", Ce, [
              G(u.$slots, "header", {}, void 0, true)
            ]),
            k("div", null, [
              h(f, {
                class: P([
                  {
                    "rotate(-90)": I(o)[l.name]
                  },
                  "iconify ~duration:300 font:18"
                ])
              }, null, 8, [
                "class"
              ])
            ])
          ]),
          h(oe, null, {
            default: x(() => [
              I(o)[l.name] ? (m(), b("div", xe, [
                G(u.$slots, "default", {}, void 0, true)
              ])) : D("", true)
            ]),
            _: 3
          })
        ], 512);
      };
    }
  }, W = z(Ie, [
    [
      "__scopeId",
      "data-v-520ff9a7"
    ]
  ]), Te = {
    class: "{m:10;pb:15}>div"
  }, Se = {
    class: "variable-section-title font:14 my:10"
  }, Pe = {
    class: "variable-section-items flex flex:row gap:8 flex-wrap:wrap"
  }, Ae = [
    "onClick",
    "onMouseenter"
  ], Le = {
    class: "font:14"
  }, Ve = 1e3, X = {
    __name: "CommonVariableItems",
    props: {
      variableItems: {
        type: Object,
        required: true
      }
    },
    setup(l) {
      const t = _("focusedInput"), i = _("recentVariableSelectionTimestamp"), v = _("tempInputValue");
      function o(u, g) {
        performance.now() - i.value < Ve || t.value && (t.value.value = `var(${g})`, t.value.dispatchEvent(new Event("input")), t.value.focus());
      }
      function c(u) {
        !t.value || v.value === null || (t.value.value = v.value, t.value.dispatchEvent(new Event("input")), t.value.focus());
      }
      function y(u, g) {
        t.value && (t.value.value = `var(${g})`, t.value.dispatchEvent(new Event("input")), t.value.focus(), v.value = `var(${g})`, i.value = performance.now());
      }
      return (u, g) => {
        const f = N("tooltip");
        return m(), b("div", Te, [
          (m(true), b(O, null, q(l.variableItems, (p, s) => (m(), b("div", {
            key: s,
            class: ""
          }, [
            k("div", Se, j(s.replace("_", "-")), 1),
            k("div", Pe, [
              p.length > 0 ? (m(true), b(O, {
                key: 0
              }, q(p, (n, d) => T((m(), b("button", {
                key: d,
                onClick: (a) => y(a, n.key),
                onMouseenter: (a) => o(a, n.key),
                onMouseleave: c,
                class: "px:12 py:8 r:$(builder-border-radius) fg:$(builder-color) bg:$(builder-bg-2) bg:$(builder-bg-3):hover b:0 flex-grow:1 flex-shrink:1 flex-basis:30% text:center {opacity:.5;font:semibold}>span opacity:100:hover>span"
              }, [
                k("span", Le, j(n.label), 1)
              ], 40, Ae)), [
                [
                  f,
                  {
                    placement: "top",
                    content: `var(${n.key}, ${n.value})`
                  }
                ]
              ])), 128)) : D("", true)
            ])
          ]))), 128))
        ]);
      };
    }
  };
  function F() {
    var _a, _b;
    if (M.$_state.activePanel !== "element") return null;
    const l = (_a = M.$_state) == null ? void 0 : _a.activeElement.id;
    return (_b = M.$_getIframeDoc()) == null ? void 0 : _b.getElementById(`brxe-${l}`);
  }
  function De({ selector: l, callback: t, options: i }) {
    const v = new MutationObserver(t), o = document.querySelector(l);
    if (!o) {
      L(`Target not found for selector: ${l}`, {
        module: "variable-picker",
        type: "error"
      });
      return;
    }
    const c = {
      childList: true,
      subtree: true
    };
    v.observe(o, Object.assign(Object.assign({}, c), i));
  }
  const Oe = {
    class: "{m:10;pb:15}>div"
  }, qe = {
    class: "variable-section-title font:14 my:10"
  }, Be = {
    key: 0,
    class: "variable-section-items"
  }, Me = [
    "onClick",
    "onMouseenter"
  ], We = [
    "onClick",
    "onMouseenter"
  ], Fe = 1e3, Re = {
    __name: "ColorVariableItems",
    props: {
      variableItems: {
        type: Object,
        required: true
      }
    },
    setup(l) {
      const t = _("focusedInput"), i = _("recentColorPickerTarget"), v = _("recentVariableSelectionTimestamp"), o = _("tempInputValue");
      function c(s, n) {
        var _a;
        if (!(performance.now() - v.value < Fe)) {
          if (!t.value) {
            const e = F();
            if (!e) return;
            const r = [
              {
                property: "color",
                control: "typography"
              },
              {
                property: "backgroundColor",
                control: "background"
              },
              {
                property: "borderColor",
                control: "border"
              }
            ];
            for (const { property: w, control: E } of r) ((_a = i.value) == null ? void 0 : _a.closest(`[data-control="${E}"]`)) && (e.style[w] = `var(${n})`);
            return;
          }
          t.value.value = `var(${n})`, t.value.dispatchEvent(new Event("input")), t.value.focus();
        }
      }
      function y(s) {
        var _a;
        if (!t.value || o.value === null) {
          const n = F();
          if (!n) return;
          const d = [
            {
              property: "color",
              control: "typography"
            },
            {
              property: "backgroundColor",
              control: "background"
            },
            {
              property: "borderColor",
              control: "border"
            }
          ];
          for (const { property: a, control: e } of d) ((_a = i.value) == null ? void 0 : _a.closest(`[data-control="${e}"]`)) && (n.style[a] = "");
          return;
        }
        t.value.value = o.value, t.value.dispatchEvent(new Event("input")), t.value.focus();
      }
      function u(s, n) {
        if (s.stopPropagation(), s.preventDefault(), !t.value) {
          const d = i.value;
          p(n), v.value = performance.now(), setTimeout(() => {
            const a = F();
            if (!a) return;
            const e = [
              {
                property: "color",
                control: "typography"
              },
              {
                property: "backgroundColor",
                control: "background"
              },
              {
                property: "borderColor",
                control: "border"
              }
            ];
            for (const { property: r, control: w } of e) (d == null ? void 0 : d.closest(`[data-control="${w}"]`)) && (a.style[r] = "");
          }, 5);
          return;
        }
        t.value.value = `var(${n})`, t.value.dispatchEvent(new Event("input")), t.value.focus(), o.value = `var(${n})`, v.value = performance.now();
      }
      function g() {
        document.querySelectorAll(".windpressbricks-variable-app-colorpopup").forEach((s) => {
          s.remove();
        });
      }
      function f() {
        if (document.querySelector(".windpressbricks-variable-app-colorpopup")) return;
        const s = ".bricks-control-popup { display: none !important; }", n = document.createElement("style");
        n.id = "windpressbricks-variable-app-bricks-popup", n.appendChild(document.createTextNode(s)), n.classList.add("windpressbricks-variable-app-colorpopup"), document.head.appendChild(n);
      }
      async function p(s) {
        var _a, _b, _c, _d, _e2;
        f(), document.querySelector(".bricks-control-popup .color-palette.grid") || ((_b = (_a = i.value) == null ? void 0 : _a.closest(".bricks-control-preview")) == null ? void 0 : _b.click(), await new Promise((a) => setTimeout(a, 25)));
        const d = document.querySelector(".bricks-control-popup .color-palette.grid");
        d ? (_d = (_c = d.querySelector(`[data-balloon="var(${s})"]`)) == null ? void 0 : _c.parentElement) == null ? void 0 : _d.click() : L("Failed to select color. Color grid not found.", {
          module: "variable-picker",
          type: "error"
        }), (_e2 = document.querySelector("body")) == null ? void 0 : _e2.click(), await new Promise((a) => setTimeout(a, 2)), document.querySelector(".bricks-control-popup") ? (setTimeout(() => {
          var _a2;
          (_a2 = document.querySelector("body")) == null ? void 0 : _a2.click(), setTimeout(() => {
            g();
          }, 5);
        }, 5), L("Failed to close color picker. Delaying close.", {
          module: "variable-picker",
          type: "error"
        })) : g();
      }
      return (s, n) => {
        const d = N("tooltip");
        return m(), b("div", Oe, [
          (m(true), b(O, null, q(l.variableItems, (a, e) => (m(), b("div", {
            key: e,
            class: ""
          }, [
            k("div", qe, j(e), 1),
            a.DEFAULT ? (m(), b("div", Be, [
              T(k("button", {
                onClick: (r) => u(r, a.DEFAULT.key),
                onMouseenter: (r) => c(r, a.DEFAULT.key),
                onMouseleave: y,
                class: P([
                  `bg:$(${a.DEFAULT.key.slice(2)})`,
                  "w:full r:4 h:24 border:1|solid|transparent border:white:hover"
                ])
              }, null, 42, Me), [
                [
                  d,
                  {
                    placement: "top",
                    content: `var(${a.DEFAULT.key}, ${a.DEFAULT.value})`
                  }
                ]
              ])
            ])) : D("", true),
            a.shades && Object.keys(a.shades).length > 0 ? (m(), b("div", {
              key: 1,
              class: P([
                [
                  {},
                  Object.keys(a.shades).length > 1 ? "rl:4>div:first-child>button rr:4>div:last-child>button" : "",
                  `grid-template-cols:repeat(${Object.keys(a.shades).length},auto)`
                ],
                "variable-section-items grid r:4 overflow:hidden"
              ])
            }, [
              (m(true), b(O, null, q(a.shades, (r, w) => (m(), b("div", {
                key: w,
                class: "flex gap:10"
              }, [
                T(k("button", {
                  onClick: (E) => u(E, r.key),
                  onMouseenter: (E) => c(E, r.key),
                  onMouseleave: y,
                  class: P([
                    `bg:$(${r.key.slice(2)})`,
                    "w:full h:24 border:1|solid|transparent border:white:hover"
                  ])
                }, null, 42, We), [
                  [
                    d,
                    {
                      placement: "top",
                      content: `var(${r.key}, ${r.value})`
                    }
                  ]
                ])
              ]))), 128))
            ], 2)) : D("", true)
          ]))), 128))
        ]);
      };
    }
  }, je = {
    id: "windpressbricks-variable-app-body",
    class: "rel w:full h:full overflow-y:scroll! bb:1|solid|$(builder-border-color)>div:not(:last-child)"
  }, Ue = {
    __name: "PanelBody",
    setup(l) {
      const t = $({
        colors: {},
        typography: {},
        sizing: {}
      }), i = _("focusedInput"), v = _("recentColorPickerTarget");
      async function o() {
        const f = ce.contentWindow.document.querySelector('script#windpress\\:vfs[type="text/plain"]'), p = me(f.textContent), s = await be({
          volume: p
        }), n = {};
        s.filter((e) => e.key.startsWith("--color")).forEach((e) => {
          const r = e.key.slice(8), w = r.split("-");
          let E = "";
          if (w.length > 1) {
            const ee = w[0], te = w.slice(1).join("-");
            E = `${ee}.shades.'${te}'`;
          } else E = `${r}.DEFAULT`;
          ke(n, E, e);
        }), t.value.colors = Object.keys(n).sort().reduce((e, r) => (e[r] = n[r], e), {});
        const d = {
          font_size: [],
          line_height: [],
          letter_spacing: []
        };
        s.filter((e) => e.key.startsWith("--text-") && !e.key.endsWith("--line-height")).forEach((e) => {
          const r = e.key.slice(7);
          d.font_size.push({
            key: e.key,
            label: r,
            value: e.value
          });
        }), s.filter((e) => e.key.startsWith("--leading-") || e.key.endsWith("--leading")).forEach((e) => {
          const r = e.key.startsWith("--leading-") ? e.key.slice(10) : e.key.slice(2, -9);
          d.line_height.push({
            key: e.key,
            label: r,
            value: e.value
          });
        }), d.line_height.sort((e, r) => e.label.startsWith("font-size-") && !r.label.startsWith("font-size-") ? 1 : !e.label.startsWith("font-size-") && r.label.startsWith("font-size-") ? -1 : 0), s.filter((e) => e.key.startsWith("--tracking-")).forEach((e) => {
          const r = e.key.slice(11);
          d.letter_spacing.push({
            key: e.key,
            label: r,
            value: e.value
          });
        }), t.value.typography = d;
        const a = {
          container: [],
          breakpoint: []
        };
        s.filter((e) => e.key.startsWith("--container-")).forEach((e) => {
          const r = e.key.slice(12);
          a.container.push({
            key: e.key,
            label: r,
            value: e.value
          });
        }), s.filter((e) => e.key.startsWith("--breakpoint-")).forEach((e) => {
          const r = e.key.slice(13);
          a.breakpoint.push({
            key: e.key,
            label: r,
            value: e.value
          });
        }), t.value.sizing = a;
      }
      const c = $(null), y = $(null), u = $(null);
      return V(i, (f) => {
        var _a, _b, _c, _d;
        if (f) {
          const s = ((_b = (_a = f.closest("[data-controlkey]")) == null ? void 0 : _a.dataset.controlkey) == null ? void 0 : _b.toLocaleLowerCase()) ?? "", n = [
            "typography",
            "font"
          ].some((e) => s.includes(e)), d = [
            "padding",
            "margin",
            "gap",
            "width",
            "height"
          ].some((e) => s.includes(e)), a = (_d = (_c = f.parentElement) == null ? void 0 : _c.parentElement) == null ? void 0 : _d.classList.contains("color-input");
          y.value.togglePanel(false), u.value.togglePanel(false), c.value.togglePanel(false), a ? (c.value.togglePanel(true), c.value.scrollIntoView()) : n ? (y.value.togglePanel(true), y.value.scrollIntoView()) : d && (u.value.togglePanel(true), u.value.scrollIntoView());
        }
      }), V(v, (f) => {
        f && (c.value.togglePanel(true), c.value.scrollIntoView());
      }), J(() => {
        o();
      }), new BroadcastChannel("windpress").addEventListener("message", async (f) => {
        const p = f.data;
        p.source === "windpress/autocomplete" && p.task === "windpress.code-editor.saved.done" && setTimeout(() => {
          o();
        }, 1e3);
      }), (f, p) => (m(), b("div", je, [
        h(W, {
          namespace: "variable",
          name: "color",
          ref_key: "sectionColor",
          ref: c
        }, {
          header: x(() => p[0] || (p[0] = [
            k("span", {
              class: "font:semibold"
            }, "Color", -1)
          ])),
          default: x(() => [
            h(Re, {
              variableItems: t.value.colors
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512),
        h(W, {
          namespace: "variable",
          name: "typography",
          ref_key: "sectionTypography",
          ref: y
        }, {
          header: x(() => p[1] || (p[1] = [
            k("span", {
              class: "font:semibold"
            }, "Typography", -1)
          ])),
          default: x(() => [
            h(X, {
              variableItems: t.value.typography
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512),
        h(W, {
          namespace: "variable",
          name: "spacing",
          ref_key: "sectionSpacing",
          ref: u,
          class: ""
        }, {
          header: x(() => p[2] || (p[2] = [
            k("span", {
              class: "font:semibold"
            }, "Sizing", -1)
          ])),
          default: x(() => [
            h(X, {
              variableItems: t.value.sizing
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512)
      ]));
    }
  }, ze = z(Ue, [
    [
      "__scopeId",
      "data-v-ecf09da6"
    ]
  ]), Ne = {
    id: "windpressbricks-variable-app-container",
    class: "flex flex:column w:full h:full fg:$(builder-color) bg:$(builder-bg)"
  }, He = {
    __name: "App",
    setup(l) {
      const t = _("isOpen");
      return (i, v) => T((m(), b("div", Ne, [
        h($e),
        (m(), de(ve, null, {
          default: x(() => [
            h(ze)
          ]),
          _: 1
        }))
      ], 512)), [
        [
          ne,
          I(t)
        ]
      ]);
    }
  }, Ge = z(He, [
    [
      "__scopeId",
      "data-v-382f3901"
    ]
  ]), A = document.createElement("windpressbricks-variable-app");
  A.id = "windpressbricks-variable-app";
  A.classList.add("master-css");
  document.body.appendChild(A);
  const S = $(false), B = $(null), Q = $(null), U = $(null), Xe = $(0), C = re(Ge);
  C.config.globalProperties.windpressbricks = window.windpressbricks;
  C.provide("variableApp", A);
  C.provide("isOpen", S);
  C.provide("focusedInput", B);
  C.provide("tempInputValue", Q);
  C.provide("recentColorPickerTarget", U);
  C.provide("recentVariableSelectionTimestamp", Xe);
  C.use(le, {
    container: "#windpressbricks-variable-app"
  });
  C.component("inline-svg", ie);
  C.mount("#windpressbricks-variable-app");
  function Y(l) {
    var _a;
    !l.shiftKey || !l.target || ((_a = document == null ? void 0 : document.getSelection()) == null ? void 0 : _a.removeAllRanges(), l.preventDefault(), l.stopPropagation(), B.value = l.target, Q.value = l.target.value, S.value = true);
  }
  function K(l) {
    B.value = l.target;
  }
  const Ye = [
    'div[data-control="number"]',
    {
      selector: 'div[data-control="text"]',
      hasChild: [
        "#_flexBasis",
        "#_overflow",
        "#_gridTemplateColumns",
        "#_gridTemplateRows",
        "#_gridAutoColumns",
        "#_gridAutoRows",
        "#_objectPosition",
        '[id^="raw-"]'
      ]
    }
  ];
  function Z() {
    setTimeout(() => {
      Ye.forEach((t) => {
        (typeof t == "string" ? [
          ...document.querySelectorAll(t)
        ] : [
          ...document.querySelectorAll(t.selector)
        ].filter((v) => t.hasChild.some((o) => v.querySelector(o)))).forEach((v) => {
          const o = v.querySelector("input[type='text']");
          (o == null ? void 0 : o.getAttribute("windpressbricks-variable-app")) !== "listened" && (o == null ? void 0 : o.removeEventListener("click", Y), o == null ? void 0 : o.addEventListener("click", Y), o == null ? void 0 : o.removeEventListener("focus", K), o == null ? void 0 : o.addEventListener("focus", K), o == null ? void 0 : o.setAttribute("windpressbricks-variable-app", "listened"), o == null ? void 0 : o.parentNode.setAttribute("data-balloon", "Shift + click to open the Variable Picker"), o == null ? void 0 : o.parentNode.setAttribute("data-balloon-pos", "bottom-right"));
        });
      }), [
        ...document.querySelectorAll(".bricks-control-preview")
      ].filter((t) => {
        var _a, _b;
        return ((_b = (_a = t.closest(".control-inner")) == null ? void 0 : _a.querySelector("label")) == null ? void 0 : _b.getAttribute("for")) === "color";
      }).forEach((t) => {
        t.addEventListener("contextmenu", (i) => {
          var _a;
          !i.shiftKey || !i.target || (i.preventDefault(), i.stopPropagation(), (_a = document == null ? void 0 : document.getSelection()) == null ? void 0 : _a.removeAllRanges(), B.value = null, S.value = true, U.value = null, fe(() => {
            U.value = i.target;
          }));
        });
      });
    }, 100);
  }
  let R = false;
  De({
    selector: "#bricks-panel-inner",
    options: {
      subtree: true,
      childList: true
    },
    callback() {
      R || (R = true, Z(), setTimeout(() => {
        R = false;
      }, 100));
    }
  });
  Z();
  document.addEventListener("keydown", (l) => {
    l.key === "Escape" && S.value && (S.value = false);
  });
  V(S, (l) => {
    A.style.zIndex = l ? "calc(Infinity)" : "-1";
  });
  L("Module loaded!", {
    module: "variable-picker"
  });
});

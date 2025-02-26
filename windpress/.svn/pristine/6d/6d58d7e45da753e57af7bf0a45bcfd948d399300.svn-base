import { _ as Q, T as se, e as ie, d as re } from "./_plugin-vue_export-helper-Ds8ZmEpB.js";
import { i as ae } from "./index-DDChq6R5.js";
import { l as Z } from "./logger-BTW-zIW3.js";
import { L as le, _ as ce, G as pe, F as ue } from "./xmark-CRWel2Xe.js";
import { oxyIframe as de } from "./constant-DFowkQsk.js";
import { f as I, q as ee, D as me, A as U, u, v as c, x as g, z as T, B as b, C as P, H as ve, r as w, w as N, T as Y, L as V, M as E, G as D, J as O, K as W, E as R, F as fe, S as ge } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import { d as ye } from "./vfs-DmzitRvm.js";
import { __tla as __tla_0 } from "./module-oN1JnOJ9.js";
import { __tla as __tla_1 } from "./index-BmQd5Vrd.js";
import { g as be } from "./intellisense-Nf6mwf2_.js";
import { _ as he } from "./chevron-right-B3dVAQk8.js";
import { a as _e } from "./index-Dgh2qPwk.js";
import { s as ke } from "./set-DvizEivO.js";
import "./index-CgqXENQe.js";
import "./isObject-CRxghtyK.js";
import "./preload-helper-DH9yCMdR.js";
import "./index-BAMY2Nnw.js";
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
  const we = {
    scope: "#windpressoxygen-variable-app"
  };
  ae(we);
  const xe = {
    id: "windpressoxygen-variable-app-header",
    class: "bg:$(oxy-dark) cursor:grab bb:1|solid|gray-60"
  }, $e = {
    class: "flex gap:10 align-items:center fg:$(oxy-light-text)"
  }, Ee = {
    class: "flex align-items:center px:12 py:2"
  }, Se = {
    class: "text-transform:none font:medium text:center flex-grow:1 gap:10 align-items:center cursor:default px:12 py:2"
  }, Ce = {
    __name: "PanelHeader",
    setup(n) {
      const s = I("variableApp"), t = I("isOpen");
      function v() {
        const o = s.querySelector("#windpressoxygen-variable-app-header");
        let l = w(false), i = 0, p = 0;
        N(l, (y) => {
          y ? (document.body.style.userSelect = "none", document.body.querySelector("#ct-viewport-container").style.pointerEvents = "none", o.style.cursor = "grabbing") : (document.body.style.removeProperty("user-select"), document.body.querySelector("#ct-viewport-container").style.removeProperty("pointer-events"), o.style.cursor = "grab");
        });
        const a = (y) => {
          l.value = true;
          const h = o.getBoundingClientRect();
          i = y.clientX - h.left, p = y.clientY - h.top;
        };
        o.removeEventListener("mousedown", a), o.addEventListener("mousedown", a);
        const k = (y) => {
          if (!l.value) return;
          const h = o.getBoundingClientRect(), X = y.clientX, f = y.clientY, r = X - i, m = f - p, _ = r < 0 ? 0 : r > window.innerWidth - h.width ? window.innerWidth - h.width : r, C = m < 0 ? 0 : m > window.innerHeight - h.height ? window.innerHeight - h.height : m;
          s.style.left = `${_}px`, s.style.top = `${C}px`;
        };
        document.removeEventListener("mousemove", k), document.addEventListener("mousemove", k);
        const S = (y) => {
          l.value = false;
        };
        document.removeEventListener("mouseup", S), document.addEventListener("mouseup", S);
      }
      return ee(() => {
        v();
      }), (o, l) => {
        const i = me("inline-svg"), p = ce, a = U("tooltip");
        return c(), u("div", xe, [
          g("div", $e, [
            g("div", Ee, [
              b(i, {
                src: P(le),
                class: "inline-svg fill:current font:24"
              }, null, 8, [
                "src"
              ])
            ]),
            T((c(), u("div", Se, l[1] || (l[1] = [
              ve(" WindPress ")
            ]))), [
              [
                a,
                {
                  placement: "top",
                  content: `v${o.windpressoxygen._version}`
                }
              ]
            ]),
            T((c(), u("button", {
              onClick: l[0] || (l[0] = (k) => t.value = !P(t)),
              class: "flex align-items:center py:10 px:12 b:none fg:$(oxy-light-text) bg:transparent bg:$(oxy-hover):hover cursor:pointer"
            }, [
              b(p, {
                class: "iconify font:16"
              })
            ])), [
              [
                a,
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
  }, Le = {
    class: "flex-grow:1"
  }, Ie = {
    key: 0,
    class: "expansion-panel__body"
  }, Pe = {
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
    setup(n, { expose: s }) {
      const t = n, v = w(null), o = _e(`windpressoxygen-variable-app.ui.expansion-panels.${t.namespace}`, {
        [`${t.name}`]: false
      }, void 0, {
        mergeDefaults: true
      });
      function l(p) {
        o.value[t.name] = p === null ? !o.value[t.name] : p;
      }
      function i() {
        v.value.scrollIntoView();
      }
      return s({
        togglePanel: l,
        scrollIntoView: i
      }), (p, a) => {
        const k = he;
        return c(), u("div", {
          ref_key: "sectionRef",
          ref: v,
          class: "expansion-panel mx:10 py:8 mr:4"
        }, [
          g("div", {
            onClick: a[0] || (a[0] = (S) => P(o)[n.name] = !P(o)[n.name]),
            class: V([
              {},
              "expansion-panel__header flex justify-content:space-between p:10 r:8 cursor:pointer"
            ])
          }, [
            g("div", Le, [
              Y(p.$slots, "header", {}, void 0, true)
            ]),
            g("div", null, [
              b(k, {
                class: V([
                  {
                    "rotate(-90)": P(o)[n.name]
                  },
                  "iconify ~duration:300 font:18"
                ])
              }, null, 8, [
                "class"
              ])
            ])
          ]),
          b(se, null, {
            default: E(() => [
              P(o)[n.name] ? (c(), u("div", Ie, [
                Y(p.$slots, "default", {}, void 0, true)
              ])) : D("", true)
            ]),
            _: 3
          })
        ], 512);
      };
    }
  }, j = Q(Pe, [
    [
      "__scopeId",
      "data-v-da5a74a7"
    ]
  ]), Te = {
    class: "{m:10;pb:15}>div"
  }, Ve = {
    class: "variable-section-title font:14 my:10"
  }, Ae = {
    class: "variable-section-items flex flex:row gap:8 flex-wrap:wrap"
  }, De = [
    "onClick",
    "onMouseenter"
  ], Oe = {
    class: "font:14"
  }, G = {
    __name: "CommonVariableItems",
    props: {
      variableItems: {
        type: Object,
        required: true
      }
    },
    setup(n) {
      return (s, t) => {
        const v = U("tooltip");
        return c(), u("div", Te, [
          (c(true), u(O, null, W(n.variableItems, (o, l) => (c(), u("div", {
            key: l,
            class: ""
          }, [
            g("div", Ve, R(l.replace("_", "-")), 1),
            g("div", Ae, [
              o.length > 0 ? (c(true), u(O, {
                key: 0
              }, W(o, (i, p) => T((c(), u("button", {
                key: p,
                onClick: (a) => s.$emit("previewChose", a, i.key),
                onMouseenter: (a) => s.$emit("previewEnter", a, i.key),
                onMouseleave: t[0] || (t[0] = (a) => s.$emit("previewLeave")),
                class: "px:12 py:8 r:8 font:medium fg:$(oxy-light-text) bg:$(oxy-mid) bg:$(oxy-hover):hover b:0 flex-grow:1 flex-shrink:1 flex-basis:30% cursor:pointer {opacity:.5}>span opacity:100:hover>span"
              }, [
                g("span", Oe, R(i.label), 1)
              ], 40, De)), [
                [
                  v,
                  {
                    placement: "top",
                    content: `var(${i.key}, ${i.value})`
                  }
                ]
              ])), 128)) : D("", true)
            ])
          ]))), 128))
        ]);
      };
    }
  }, We = {
    class: "{m:10;pb:15}>div"
  }, Me = {
    class: "variable-section-title font:14 my:10"
  }, Fe = {
    key: 0,
    class: "variable-section-items"
  }, qe = [
    "onClick",
    "onMouseenter"
  ], ze = [
    "onClick",
    "onMouseenter"
  ], je = {
    __name: "ColorVariableItems",
    props: {
      variableItems: {
        type: Object,
        required: true
      }
    },
    setup(n) {
      return (s, t) => {
        const v = U("tooltip");
        return c(), u("div", We, [
          (c(true), u(O, null, W(n.variableItems, (o, l) => (c(), u("div", {
            key: l,
            class: ""
          }, [
            g("div", Me, R(l), 1),
            o.DEFAULT ? (c(), u("div", Fe, [
              T(g("button", {
                onClick: (i) => s.$emit("previewChose", i, o.DEFAULT.key),
                onMouseenter: (i) => s.$emit("previewEnter", i, o.DEFAULT.key),
                onMouseleave: t[0] || (t[0] = (i) => s.$emit("previewLeave")),
                class: V([
                  `bg:$(${o.DEFAULT.key.slice(2)})`,
                  "w:full r:4 h:24 border:1|solid|transparent border:white:hover cursor:pointer"
                ])
              }, null, 42, qe), [
                [
                  v,
                  {
                    placement: "top",
                    content: `var(${o.DEFAULT.key}, ${o.DEFAULT.value})`
                  }
                ]
              ])
            ])) : D("", true),
            o.shades && Object.keys(o.shades).length > 0 ? (c(), u("div", {
              key: 1,
              class: V([
                [
                  {},
                  Object.keys(o.shades).length > 1 ? "rl:4>div:first-child>button rr:4>div:last-child>button" : "",
                  `grid-template-cols:repeat(${Object.keys(o.shades).length},auto)`
                ],
                "variable-section-items grid r:4 overflow:hidden"
              ])
            }, [
              (c(true), u(O, null, W(o.shades, (i, p) => (c(), u("div", {
                key: p,
                class: "flex gap:10"
              }, [
                T(g("button", {
                  onClick: (a) => s.$emit("previewChose", a, i.key),
                  onMouseenter: (a) => s.$emit("previewEnter", a, i.key),
                  onMouseleave: t[1] || (t[1] = (a) => s.$emit("previewLeave")),
                  class: V([
                    `bg:$(${i.key.slice(2)})`,
                    "w:full h:24 border:1|solid|transparent border:white:hover cursor:pointer"
                  ])
                }, null, 42, ze), [
                  [
                    v,
                    {
                      placement: "top",
                      content: `var(${i.key}, ${i.value})`
                    }
                  ]
                ])
              ]))), 128))
            ], 2)) : D("", true)
          ]))), 128))
        ]);
      };
    }
  }, Be = {
    id: "windpressoxygen-variable-app-body",
    class: "bg:$(oxy-dark) fg:$(oxy-light-text) rel w:full h:full overflow-y:scroll! bb:1|solid|gray-60>div:not(:last-child)"
  }, Re = 1e3, Ue = {
    __name: "PanelBody",
    setup(n) {
      const s = w({
        colors: {},
        typography: {},
        sizing: {}
      }), t = I("focusedInput"), v = I("recentVariableSelectionTimestamp"), o = I("tempInputValue"), l = I("variableApp");
      async function i() {
        const f = de.contentWindow.document.querySelector('script#windpress\\:vfs[type="text/plain"]'), r = ye(f.textContent), m = await be({
          volume: r
        });
        let _ = l.querySelector("style#windpressoxygen-variable-app-body-style");
        _ || (_ = document.createElement("style"), _.id = "windpressoxygen-variable-app-body-style", l.appendChild(_)), _.innerHTML = `
        #windpressoxygen-variable-app-body, #oxygen-sidebar {
            ${m.map((e) => `${e.key}:${e.value};`).join("")}
        }
    `;
        const C = {};
        m.filter((e) => e.key.startsWith("--color")).forEach((e) => {
          const d = e.key.slice(8), q = d.split("-");
          let z = "";
          if (q.length > 1) {
            const ne = q[0], oe = q.slice(1).join("-");
            z = `${ne}.shades.'${oe}'`;
          } else z = `${d}.DEFAULT`;
          ke(C, z, e);
        }), s.value.colors = Object.keys(C).sort().reduce((e, d) => (e[d] = C[d], e), {});
        const $ = {
          font_size: [],
          line_height: [],
          letter_spacing: []
        };
        m.filter((e) => e.key.startsWith("--text-") && !e.key.endsWith("--line-height")).forEach((e) => {
          const d = e.key.slice(7);
          $.font_size.push({
            key: e.key,
            label: d,
            value: e.value
          });
        }), m.filter((e) => e.key.startsWith("--leading-") || e.key.endsWith("--leading")).forEach((e) => {
          const d = e.key.startsWith("--leading-") ? e.key.slice(10) : e.key.slice(2, -9);
          $.line_height.push({
            key: e.key,
            label: d,
            value: e.value
          });
        }), $.line_height.sort((e, d) => e.label.startsWith("font-size-") && !d.label.startsWith("font-size-") ? 1 : !e.label.startsWith("font-size-") && d.label.startsWith("font-size-") ? -1 : 0), m.filter((e) => e.key.startsWith("--tracking-")).forEach((e) => {
          const d = e.key.slice(11);
          $.letter_spacing.push({
            key: e.key,
            label: d,
            value: e.value
          });
        }), s.value.typography = $;
        const L = {
          container: [],
          breakpoint: []
        };
        m.filter((e) => e.key.startsWith("--container-")).forEach((e) => {
          const d = e.key.slice(12);
          L.container.push({
            key: e.key,
            label: d,
            value: e.value
          });
        }), m.filter((e) => e.key.startsWith("--breakpoint-")).forEach((e) => {
          const d = e.key.slice(13);
          L.breakpoint.push({
            key: e.key,
            label: d,
            value: e.value
          });
        }), s.value.sizing = L;
      }
      const p = w(null), a = w(null), k = w(null);
      N(t, (f) => {
        var _a;
        if (f) {
          const r = f, m = (_a = r == null ? void 0 : r.parentElement) == null ? void 0 : _a.classList.contains("oxygen-color-picker"), _ = [
            "font-size"
          ].some((L) => {
            var _a2;
            return (_a2 = r == null ? void 0 : r.getAttribute("data-option")) == null ? void 0 : _a2.includes(L);
          }), C = [
            "padding",
            "margin",
            "gap",
            "width",
            "height"
          ].some((L) => {
            var _a2;
            return (_a2 = r == null ? void 0 : r.getAttribute("data-option")) == null ? void 0 : _a2.includes(L);
          });
          a.value.togglePanel(false), k.value.togglePanel(false), p.value.togglePanel(false);
          async function $() {
            f.parentElement.querySelector(".oxygen-measure-box-unit-selector .oxygen-measure-box-units .oxygen-measure-box-unit:last-child").click(), setTimeout(() => {
              f.focus();
            }, 100);
          }
          m ? (p.value.togglePanel(true), p.value.scrollIntoView()) : _ ? (a.value.togglePanel(true), a.value.scrollIntoView(), $()) : C && (k.value.togglePanel(true), k.value.scrollIntoView(), $());
        }
      });
      function S(f, r) {
        performance.now() - v.value < Re || t.value && (t.value.value = `var(${r})`, t.value.dispatchEvent(new Event("input")), t.value.focus());
      }
      function y(f) {
        !t.value || o.value === null || (t.value.value = o.value, t.value.dispatchEvent(new Event("input")), t.value.focus());
      }
      function h(f, r) {
        var _a, _b;
        if (!t.value) return;
        t.value.value = `var(${r})`, t.value.dispatchEvent(new Event("input")), t.value.focus(), o.value = `var(${r})`, v.value = performance.now(), ((_b = (_a = t.value) == null ? void 0 : _a.parentElement) == null ? void 0 : _b.classList.contains("oxygen-color-picker")) && t.value.parentElement.querySelector(".oxygen-color-picker-color button") && (t.value.parentElement.querySelector(".oxygen-color-picker-color button").style.backgroundColor = `var(${r})`);
      }
      return ee(() => {
        i();
      }), new BroadcastChannel("windpress").addEventListener("message", async (f) => {
        const r = f.data;
        r.source === "windpress/autocomplete" && r.task === "windpress.code-editor.saved.done" && setTimeout(() => {
          i();
        }, 1e3);
      }), (f, r) => (c(), u("div", Be, [
        b(j, {
          namespace: "variable",
          name: "color",
          ref_key: "sectionColor",
          ref: p
        }, {
          header: E(() => r[0] || (r[0] = [
            g("span", {
              class: "font:semibold"
            }, "Color", -1)
          ])),
          default: E(() => [
            b(je, {
              variableItems: s.value.colors,
              onPreviewEnter: S,
              onPreviewLeave: y,
              onPreviewChose: h
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512),
        b(j, {
          namespace: "variable",
          name: "typography",
          ref_key: "sectionTypography",
          ref: a
        }, {
          header: E(() => r[1] || (r[1] = [
            g("span", {
              class: "font:semibold"
            }, "Typography", -1)
          ])),
          default: E(() => [
            b(G, {
              variableItems: s.value.typography,
              onPreviewEnter: S,
              onPreviewLeave: y,
              onPreviewChose: h
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512),
        b(j, {
          namespace: "variable",
          name: "spacing",
          ref_key: "sectionSpacing",
          ref: k,
          class: ""
        }, {
          header: E(() => r[2] || (r[2] = [
            g("span", {
              class: "font:semibold"
            }, "Sizing", -1)
          ])),
          default: E(() => [
            b(G, {
              variableItems: s.value.sizing,
              onPreviewEnter: S,
              onPreviewLeave: y,
              onPreviewChose: h
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512)
      ]));
    }
  }, Ne = Q(Ue, [
    [
      "__scopeId",
      "data-v-a8cfe85c"
    ]
  ]), He = {
    id: "windpressoxygen-variable-app-container",
    class: "flex flex:column w:full h:full"
  }, Xe = {
    __name: "App",
    setup(n) {
      const s = I("isOpen");
      return (t, v) => T((c(), u("div", He, [
        b(Ce),
        (c(), fe(ge, null, {
          default: E(() => [
            b(Ne)
          ]),
          _: 1
        }))
      ], 512)), [
        [
          ie,
          P(s)
        ]
      ]);
    }
  };
  function Ye({ selector: n, callback: s, options: t }) {
    const v = new MutationObserver(s), o = document.querySelector(n);
    if (!o) {
      Z(`Target not found for selector: ${n}`, {
        module: "variable-picker",
        type: "error"
      });
      return;
    }
    const l = {
      childList: true,
      subtree: true
    };
    v.observe(o, Object.assign(Object.assign({}, l), t));
  }
  const M = document.createElement("windpressoxygen-variable-app");
  M.id = "windpressoxygen-variable-app";
  document.body.appendChild(M);
  const A = w(false), F = w(null), H = w(null), Ge = w(0), x = re(Xe);
  x.config.globalProperties.windpressoxygen = window.windpressoxygen;
  x.provide("variableApp", M);
  x.provide("isOpen", A);
  x.provide("focusedInput", F);
  x.provide("tempInputValue", H);
  x.provide("recentVariableSelectionTimestamp", Ge);
  x.use(pe, {
    container: "#windpressoxygen-variable-app"
  });
  x.component("inline-svg", ue);
  x.mount("#windpressoxygen-variable-app");
  function J(n) {
    var _a;
    !n.shiftKey || !n.target || ((_a = document == null ? void 0 : document.getSelection()) == null ? void 0 : _a.removeAllRanges(), n.preventDefault(), n.stopPropagation(), F.value = n.target, H.value = n.target.value, A.value = true);
  }
  function K(n) {
    F.value = n.target;
  }
  const Je = [
    "iframeScope.component.options[iframeScope.component.active.id]['model']['background-image']",
    "iframeScope.component.options[iframeScope.component.active.id]['model']['icon-size']",
    "iframeScope.fontsFilter",
    "postsFilter",
    "currentlyEditingFilter",
    "iframeScope.iconFilter.title",
    "iframeScope.component.options[iframeScope.component.active.id]['model']['z-index']",
    "iframeScope.component.options[iframeScope.component.active.id]['model']['src']",
    "iframeScope.component.options[iframeScope.component.active.id]['model']['rel']",
    "iframeScope.component.options[iframeScope.component.active.id]['model']['url']",
    "iframeScope.component.options[iframeScope.component.active.id]['model']['testimonial_photo']",
    "iframeScope.component.options[iframeScope.component.active.id]['model']['pricing_box_price"
  ], Ke = [
    "iframeScope.component.options[iframeScope.component.active.id]['model']['title-*']",
    "iframeScope.component.options[iframeScope.component.active.id]['model']['icon-*']",
    "duration",
    "url",
    "speed",
    "time",
    "address",
    "zoom"
  ].map((n) => n.replace("*']", "")), Qe = `.oxygen-control input[type="text"]:not(.ct-iris-colorpicker):not([ng-model*="shortcode"])${Je.map((n) => `:not([ng-model="${n}"])`).join("")}${Ke.map((n) => `:not([ng-model*="${n}"])`).join("")}`;
  function te() {
    setTimeout(() => {
      let n = false;
      [
        ...document.querySelectorAll(Qe)
      ].forEach((t) => {
        (t == null ? void 0 : t.getAttribute("windpressoxygen-variable-app")) !== "listened" && (t == null ? void 0 : t.removeEventListener("click", J), t == null ? void 0 : t.addEventListener("click", J), t == null ? void 0 : t.removeEventListener("focus", K), t == null ? void 0 : t.addEventListener("focus", K), t == null ? void 0 : t.setAttribute("windpressoxygen-variable-app", "listened"), n = true);
      }), n && (F.value = null, H.value = null);
    }, 100);
  }
  let B = false;
  Ye({
    selector: "#oxygen-sidebar",
    options: {
      subtree: true,
      childList: true
    },
    callback(n) {
      B || (B = true, te(), setTimeout(() => {
        B = false;
      }, 100));
    }
  });
  te();
  document.addEventListener("keydown", (n) => {
    n.key === "Escape" && A.value && (A.value = false);
  });
  N(A, (n) => {
    M.style.zIndex = n ? "calc(Infinity)" : "-1";
  });
  Z("Module loaded!", {
    module: "variable-picker"
  });
});

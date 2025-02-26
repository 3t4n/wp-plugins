import { _ as te, T as ae, e as le, d as ce } from "./_plugin-vue_export-helper-Ds8ZmEpB.js";
import { i as ue } from "./index-DDChq6R5.js";
import { l as ne } from "./logger-BTW-zIW3.js";
import { L as pe, _ as de, G as ve, F as me } from "./xmark-CRWel2Xe.js";
import { uni as K, uniIframe as fe } from "./constant-V9Qf7smn.js";
import { f as x, q as se, D as ye, A as Y, u as d, v as u, x as y, z as P, B as _, C as L, H as be, r as k, w as q, T as J, L as D, M as S, G as W, J as M, K as j, E as N, F as ge, S as he } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import { d as _e } from "./vfs-DmzitRvm.js";
import { __tla as __tla_0 } from "./module-oN1JnOJ9.js";
import { __tla as __tla_1 } from "./index-BmQd5Vrd.js";
import { g as we } from "./intellisense-Nf6mwf2_.js";
import { _ as ke } from "./chevron-right-B3dVAQk8.js";
import { a as $e } from "./index-Dgh2qPwk.js";
import { s as Ee } from "./set-DvizEivO.js";
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
  const Ce = {
    scope: "#windpressbuilderius-variable-app"
  };
  ue(Ce);
  const Se = {
    id: "windpressbuilderius-variable-app-header",
    class: "bg:$(primary-1) cursor:grab bb:1|solid|$(primary-3)"
  }, Ie = {
    class: "flex gap:10 align-items:center fg:$(base-2)"
  }, xe = {
    class: "flex px:12 py:2 align-items:center"
  }, Le = {
    class: "text-transform:none font:medium text:center flex-grow:1 gap:10 align-items:center cursor:default px:12 py:2"
  }, Pe = {
    __name: "PanelHeader",
    setup(n) {
      const s = x("variableApp"), r = x("isOpen");
      function f() {
        const t = s.querySelector("#windpressbuilderius-variable-app-header");
        let i = k(false), a = 0, p = 0;
        q(i, (h) => {
          h ? (document.body.style.userSelect = "none", K.style.pointerEvents = "none", t.style.cursor = "grabbing") : (document.body.style.removeProperty("user-select"), K.style.removeProperty("pointer-events"), t.style.cursor = "grab");
        });
        const l = (h) => {
          i.value = true;
          const w = t.getBoundingClientRect();
          a = h.clientX - w.left, p = h.clientY - w.top;
        };
        t.removeEventListener("mousedown", l), t.addEventListener("mousedown", l);
        const $ = (h) => {
          if (!i.value) return;
          const w = t.getBoundingClientRect(), T = h.clientX, G = h.clientY, c = T - a, o = G - p, m = c < 0 ? 0 : c > window.innerWidth - w.width ? window.innerWidth - w.width : c, b = o < 0 ? 0 : o > window.innerHeight - w.height ? window.innerHeight - w.height : o;
          s.style.left = `${m}px`, s.style.top = `${b}px`;
        };
        document.removeEventListener("mousemove", $), document.addEventListener("mousemove", $);
        const I = (h) => {
          i.value = false;
        };
        document.removeEventListener("mouseup", I), document.addEventListener("mouseup", I);
      }
      return se(() => {
        f();
      }), (t, i) => {
        const a = ye("inline-svg"), p = de, l = Y("tooltip");
        return u(), d("div", Se, [
          y("div", Ie, [
            y("div", xe, [
              _(a, {
                src: L(pe),
                class: "inline-svg fill:current font:24"
              }, null, 8, [
                "src"
              ])
            ]),
            P((u(), d("div", Le, i[1] || (i[1] = [
              be(" WindPress ")
            ]))), [
              [
                l,
                {
                  placement: "top",
                  content: `v${t.windpressbuilderius._version}`
                }
              ]
            ]),
            P((u(), d("button", {
              onClick: i[0] || (i[0] = ($) => r.value = !L(r)),
              class: "uniPanelIconButton r:0 bg:$(primary-3):hover py:10 px:12"
            }, [
              _(p, {
                class: "iconify fg:$(base-2) font:16"
              })
            ])), [
              [
                l,
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
  }, Te = {
    class: "flex-grow:1"
  }, Ve = {
    key: 0,
    class: "expansion-panel__body"
  }, Oe = {
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
      const r = n, f = k(null), t = $e(`windpressbuilderius-variable-app.ui.expansion-panels.${r.namespace}`, {
        [`${r.name}`]: false
      }, void 0, {
        mergeDefaults: true
      });
      function i(p) {
        t.value[r.name] = p === null ? !t.value[r.name] : p;
      }
      function a() {
        f.value.scrollIntoView();
      }
      return s({
        togglePanel: i,
        scrollIntoView: a
      }), (p, l) => {
        const $ = ke;
        return u(), d("div", {
          ref_key: "sectionRef",
          ref: f,
          class: "expansion-panel mx:10 py:8"
        }, [
          y("div", {
            onClick: l[0] || (l[0] = (I) => L(t)[n.name] = !L(t)[n.name]),
            class: "expansion-panel__header flex justify-content:space-between p:10 r:8 cursor:pointer"
          }, [
            y("div", Te, [
              J(p.$slots, "header", {}, void 0, true)
            ]),
            y("div", null, [
              _($, {
                class: D([
                  {
                    "rotate(-90)": L(t)[n.name]
                  },
                  "iconify ~duration:300 font:18"
                ])
              }, null, 8, [
                "class"
              ])
            ])
          ]),
          _(ae, null, {
            default: S(() => [
              L(t)[n.name] ? (u(), d("div", Ve, [
                J(p.$slots, "default", {}, void 0, true)
              ])) : W("", true)
            ]),
            _: 3
          })
        ], 512);
      };
    }
  }, U = te(Oe, [
    [
      "__scopeId",
      "data-v-1c652df4"
    ]
  ]), Ae = {
    class: "{m:10;pb:15}>div"
  }, De = {
    class: "variable-section-title font:14 my:10"
  }, We = {
    class: "variable-section-items flex flex:row gap:8 flex-wrap:wrap"
  }, Me = [
    "onClick",
    "onMouseenter"
  ], je = {
    class: "font:14"
  }, Q = {
    __name: "CommonVariableItems",
    props: {
      variableItems: {
        type: Object,
        required: true
      }
    },
    setup(n) {
      return (s, r) => {
        const f = Y("tooltip");
        return u(), d("div", Ae, [
          (u(true), d(M, null, j(n.variableItems, (t, i) => (u(), d("div", {
            key: i,
            class: ""
          }, [
            y("div", De, N(i.replace("_", "-")), 1),
            y("div", We, [
              t.length > 0 ? (u(true), d(M, {
                key: 0
              }, j(t, (a, p) => P((u(), d("button", {
                key: p,
                onClick: (l) => s.$emit("previewChose", l, a.key),
                onMouseenter: (l) => s.$emit("previewEnter", l, a.key),
                onMouseleave: r[0] || (r[0] = (l) => s.$emit("previewLeave")),
                class: "px:12 py:8 r:8 fg:$(base-1) fg:$(accent-normal):hover bg:$(primary-3) bg:$(primary-2):hover b:0 flex-grow:1 flex-shrink:1 flex-basis:30% cursor:pointer {opacity:.5}>span opacity:100:hover>span"
              }, [
                y("span", je, N(a.label), 1)
              ], 40, Me)), [
                [
                  f,
                  {
                    placement: "top",
                    content: `var(${a.key}, ${a.value})`
                  }
                ]
              ])), 128)) : W("", true)
            ])
          ]))), 128))
        ]);
      };
    }
  }, qe = {
    class: "{m:10;pb:15}>div"
  }, Be = {
    class: "variable-section-title font:14 my:10"
  }, Fe = {
    key: 0,
    class: "variable-section-items"
  }, ze = [
    "onClick",
    "onMouseenter"
  ], Re = [
    "onClick",
    "onMouseenter"
  ], Ue = {
    __name: "ColorVariableItems",
    props: {
      variableItems: {
        type: Object,
        required: true
      }
    },
    setup(n) {
      return (s, r) => {
        const f = Y("tooltip");
        return u(), d("div", qe, [
          (u(true), d(M, null, j(n.variableItems, (t, i) => (u(), d("div", {
            key: i,
            class: ""
          }, [
            y("div", Be, N(i), 1),
            t.DEFAULT ? (u(), d("div", Fe, [
              P(y("button", {
                onClick: (a) => s.$emit("previewChose", a, t.DEFAULT.key),
                onMouseenter: (a) => s.$emit("previewEnter", a, t.DEFAULT.key),
                onMouseleave: r[0] || (r[0] = (a) => s.$emit("previewLeave")),
                class: D([
                  `bg:$(${t.DEFAULT.key.slice(2)})`,
                  "w:full r:4 h:24 border:1|solid|transparent border:white:hover cursor:pointer"
                ])
              }, null, 42, ze), [
                [
                  f,
                  {
                    placement: "top",
                    content: `var(${t.DEFAULT.key}, ${t.DEFAULT.value})`
                  }
                ]
              ])
            ])) : W("", true),
            t.shades && Object.keys(t.shades).length > 0 ? (u(), d("div", {
              key: 1,
              class: D([
                [
                  {},
                  Object.keys(t.shades).length > 1 ? "rl:4>div:first-child>button rr:4>div:last-child>button" : "",
                  `grid-template-cols:repeat(${Object.keys(t.shades).length},auto)`
                ],
                "variable-section-items grid r:4 overflow:hidden"
              ])
            }, [
              (u(true), d(M, null, j(t.shades, (a, p) => (u(), d("div", {
                key: p,
                class: "flex gap:10"
              }, [
                P(y("button", {
                  onClick: (l) => s.$emit("previewChose", l, a.key),
                  onMouseenter: (l) => s.$emit("previewEnter", l, a.key),
                  onMouseleave: r[1] || (r[1] = (l) => s.$emit("previewLeave")),
                  class: D([
                    `bg:$(${a.key.slice(2)})`,
                    "w:full h:24 border:1|solid|transparent border:white:hover cursor:pointer"
                  ])
                }, null, 42, Re), [
                  [
                    f,
                    {
                      placement: "top",
                      content: `var(${a.key}, ${a.value})`
                    }
                  ]
                ])
              ]))), 128))
            ], 2)) : W("", true)
          ]))), 128))
        ]);
      };
    }
  }, He = {
    id: "windpressbuilderius-variable-app-body",
    class: "rel w:full h:full overflow-y:scroll! bb:1|solid|$(primary-3)>div:not(:last-child)"
  }, Ne = 1e3, Xe = {
    __name: "PanelBody",
    setup(n) {
      const s = k({
        colors: {},
        typography: {},
        sizing: {}
      }), r = x("focusedInput"), f = x("recentVariableSelectionTimestamp"), t = x("tempInputValue"), i = x("variableApp");
      async function a() {
        const c = fe.contentWindow.document.querySelector('script#windpress\\:vfs[type="text/plain"]'), o = _e(c.textContent), m = await we({
          volume: o
        });
        let b = i.querySelector("style#windpressbuilderius-variable-app-body-style");
        b || (b = document.createElement("style"), b.id = "windpressbuilderius-variable-app-body-style", i.appendChild(b)), b.innerHTML = `
        #windpressbuilderius-variable-app-body {
            ${m.map((e) => `${e.key}:${e.value};`).join("")}
        }
    `;
        const C = {};
        m.filter((e) => e.key.startsWith("--color")).forEach((e) => {
          const v = e.key.slice(8), z = v.split("-");
          let R = "";
          if (z.length > 1) {
            const ie = z[0], oe = z.slice(1).join("-");
            R = `${ie}.shades.'${oe}'`;
          } else R = `${v}.DEFAULT`;
          Ee(C, R, e);
        }), s.value.colors = Object.keys(C).sort().reduce((e, v) => (e[v] = C[v], e), {});
        const g = {
          font_size: [],
          line_height: [],
          letter_spacing: []
        };
        m.filter((e) => e.key.startsWith("--text-") && !e.key.endsWith("--line-height")).forEach((e) => {
          const v = e.key.slice(7);
          g.font_size.push({
            key: e.key,
            label: v,
            value: e.value
          });
        }), m.filter((e) => e.key.startsWith("--leading-") || e.key.endsWith("--leading")).forEach((e) => {
          const v = e.key.startsWith("--leading-") ? e.key.slice(10) : e.key.slice(2, -9);
          g.line_height.push({
            key: e.key,
            label: v,
            value: e.value
          });
        }), g.line_height.sort((e, v) => e.label.startsWith("font-size-") && !v.label.startsWith("font-size-") ? 1 : !e.label.startsWith("font-size-") && v.label.startsWith("font-size-") ? -1 : 0), m.filter((e) => e.key.startsWith("--tracking-")).forEach((e) => {
          const v = e.key.slice(11);
          g.letter_spacing.push({
            key: e.key,
            label: v,
            value: e.value
          });
        }), s.value.typography = g;
        const F = {
          container: [],
          breakpoint: []
        };
        m.filter((e) => e.key.startsWith("--container-")).forEach((e) => {
          const v = e.key.slice(12);
          F.container.push({
            key: e.key,
            label: v,
            value: e.value
          });
        }), m.filter((e) => e.key.startsWith("--breakpoint-")).forEach((e) => {
          const v = e.key.slice(13);
          F.breakpoint.push({
            key: e.key,
            label: v,
            value: e.value
          });
        }), s.value.sizing = F;
      }
      const p = k(null), l = k(null), $ = k(null);
      q(r, (c) => {
        if (c) {
          const o = c.getAttribute("name"), m = [
            "color",
            "backgroundColor"
          ].some((g) => o.includes(g)), b = [
            "fontSize"
          ].some((g) => o.includes(g)), C = [
            "padding",
            "margin",
            "gap",
            "width",
            "height"
          ].some((g) => o.includes(g));
          l.value.togglePanel(false), $.value.togglePanel(false), p.value.togglePanel(false), m ? (p.value.togglePanel(true), p.value.scrollIntoView()) : b ? (l.value.togglePanel(true), l.value.scrollIntoView()) : C && ($.value.togglePanel(true), $.value.scrollIntoView());
        }
      });
      function I(c, o) {
        const m = Object.getOwnPropertyDescriptor(c, "value").set, b = Object.getPrototypeOf(c), C = Object.getOwnPropertyDescriptor(b, "value").set;
        m && m !== C ? C.call(c, o) : m.call(c, o);
        const g = new Event("input", {
          bubbles: true
        });
        c.dispatchEvent(g);
      }
      function h(c, o) {
        performance.now() - f.value < Ne || r.value && I(r.value, `var(${o})`);
      }
      function w(c) {
        !r.value || t.value === null || I(r.value, t.value);
      }
      function T(c, o) {
        r.value && (I(r.value, `var(${o})`), t.value = `var(${o})`, f.value = performance.now());
      }
      return se(() => {
        a();
      }), new BroadcastChannel("windpress").addEventListener("message", async (c) => {
        const o = c.data;
        o.source === "windpress/autocomplete" && o.task === "windpress.code-editor.saved.done" && setTimeout(() => {
          a();
        }, 1e3);
      }), (c, o) => (u(), d("div", He, [
        _(U, {
          namespace: "variable",
          name: "color",
          ref_key: "sectionColor",
          ref: p
        }, {
          header: S(() => o[0] || (o[0] = [
            y("span", {
              class: "font:semibold"
            }, "Color", -1)
          ])),
          default: S(() => [
            _(Ue, {
              variableItems: s.value.colors,
              onPreviewEnter: h,
              onPreviewLeave: w,
              onPreviewChose: T
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512),
        _(U, {
          namespace: "variable",
          name: "typography",
          ref_key: "sectionTypography",
          ref: l
        }, {
          header: S(() => o[1] || (o[1] = [
            y("span", {
              class: "font:semibold"
            }, "Typography", -1)
          ])),
          default: S(() => [
            _(Q, {
              variableItems: s.value.typography,
              onPreviewEnter: h,
              onPreviewLeave: w,
              onPreviewChose: T
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512),
        _(U, {
          namespace: "variable",
          name: "spacing",
          ref_key: "sectionSpacing",
          ref: $,
          class: ""
        }, {
          header: S(() => o[2] || (o[2] = [
            y("span", {
              class: "font:semibold"
            }, "Sizing", -1)
          ])),
          default: S(() => [
            _(Q, {
              variableItems: s.value.sizing,
              onPreviewEnter: h,
              onPreviewLeave: w,
              onPreviewChose: T
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512)
      ]));
    }
  }, Ye = te(Xe, [
    [
      "__scopeId",
      "data-v-ef80dd79"
    ]
  ]), Ge = {
    id: "windpressbuilderius-variable-app-container",
    class: "flex flex:column w:full h:full fg:$(base-2) bg:$(primary-1)"
  }, Ke = {
    __name: "App",
    setup(n) {
      const s = x("isOpen");
      return (r, f) => P((u(), d("div", Ge, [
        _(Pe),
        (u(), ge(he, null, {
          default: S(() => [
            _(Ye)
          ]),
          _: 1
        }))
      ], 512)), [
        [
          le,
          L(s)
        ]
      ]);
    }
  };
  function Je({ selector: n, callback: s, options: r }) {
    const f = new MutationObserver(s), t = document.querySelector(n);
    if (!t) {
      ne(`Target not found for selector: ${n}`, {
        module: "variable-picker",
        type: "error"
      });
      return;
    }
    const i = {
      childList: true,
      subtree: true
    };
    f.observe(t, Object.assign(Object.assign({}, i), r));
  }
  const O = document.createElement("windpressbuilderius-variable-app");
  O.id = "windpressbuilderius-variable-app";
  document.body.appendChild(O);
  for (const n of document.getElementById("builderius-builder-css").sheet.cssRules) if (n.selectorText && n.selectorText.includes("#builderiusPanel")) for (let s = 0; s < n.style.length; s++) {
    const r = n.style[s];
    r.startsWith("--") && O.style.setProperty(r, n.style.getPropertyValue(r).trim());
  }
  const V = k(false), A = k(null), B = k(null), Qe = k(0), X = k(null), E = ce(Ke);
  E.config.globalProperties.windpressbuilderius = window.windpressbuilderius;
  E.provide("variableApp", O);
  E.provide("isOpen", V);
  E.provide("focusedInput", A);
  E.provide("tempInputValue", B);
  E.provide("recentVariableSelectionTimestamp", Qe);
  E.use(ve, {
    container: "#windpressbuilderius-variable-app"
  });
  E.component("inline-svg", me);
  E.mount("#windpressbuilderius-variable-app");
  function Z(n) {
    var _a;
    !n.shiftKey || !n.target || ((_a = document == null ? void 0 : document.getSelection()) == null ? void 0 : _a.removeAllRanges(), n.preventDefault(), n.stopPropagation(), A.value = n.target, B.value = n.target.value, V.value = true);
  }
  function ee(n) {
    A.value = n.target;
  }
  const Ze = [
    "div.uniCssInput",
    "div.uniCssColorpicker"
  ];
  function re() {
    setTimeout(() => {
      var _a;
      let n = false;
      Ze.forEach((r) => {
        (typeof r == "string" ? [
          ...document.querySelectorAll(r)
        ] : [
          ...document.querySelectorAll(r.selector)
        ].filter((t) => r.hasChild.some((i) => t.querySelector(i)))).forEach((t) => {
          const i = t.querySelector("input[type='text']");
          (i == null ? void 0 : i.getAttribute("windpressbuilderius-variable-app")) !== "listened" && (i == null ? void 0 : i.removeEventListener("click", Z), i == null ? void 0 : i.addEventListener("click", Z), i == null ? void 0 : i.removeEventListener("focus", ee), i == null ? void 0 : i.addEventListener("focus", ee), i == null ? void 0 : i.setAttribute("windpressbuilderius-variable-app", "listened"), n = true);
        });
      });
      const s = document.querySelector("div.uniSystemSelectClasses__valueWrapper span.uniSystemSelectClasses__placeholder") ? "%root%" : (_a = document.querySelector("div.uniSystemSelectClasses__valueWrapper div.uniModuleCssSelectorItemSelected span")) == null ? void 0 : _a.innerText;
      X.value !== s && (X.value = s), n && (A.value = null, B.value = null);
    }, 100);
  }
  let H = false;
  Je({
    selector: ".uniLeftPanelOuter",
    options: {
      subtree: true,
      childList: true
    },
    callback() {
      H || (H = true, re(), setTimeout(() => {
        H = false;
      }, 100));
    }
  });
  re();
  document.addEventListener("keydown", (n) => {
    n.key === "Escape" && V.value && (V.value = false);
  });
  q(V, (n) => {
    O.style.zIndex = n ? "calc(Infinity)" : "-1";
  });
  q(X, (n, s) => {
    n !== s && (A.value = null, B.value = null);
  });
  ne("Module loaded!", {
    module: "variable-picker"
  });
});

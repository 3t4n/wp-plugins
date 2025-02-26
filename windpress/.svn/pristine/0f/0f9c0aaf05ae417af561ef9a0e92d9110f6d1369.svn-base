import { _ as ee, T as re, e as ie, d as oe } from "./_plugin-vue_export-helper-Ds8ZmEpB.js";
import { i as le } from "./index-DDChq6R5.js";
import { l as te } from "./logger-BTW-zIW3.js";
import { L as ce, _ as ue, G as pe, F as de } from "./xmark-CRWel2Xe.js";
import { bde as T, bdeIframe as ve } from "./constant-BZV3uY6b.js";
import { f as I, q as H, D as me, A as N, u as d, v as u, x as b, z as A, B as h, C as P, H as fe, r as w, w as X, T as K, L as V, M as C, G as O, J as q, K as M, E as U, F as be, S as ge } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import { d as ye } from "./vfs-DmzitRvm.js";
import { __tla as __tla_0 } from "./module-oN1JnOJ9.js";
import { __tla as __tla_1 } from "./index-BmQd5Vrd.js";
import { g as he } from "./intellisense-Nf6mwf2_.js";
import { _ as ke } from "./chevron-right-B3dVAQk8.js";
import { a as _e } from "./index-Dgh2qPwk.js";
import { s as we } from "./set-DvizEivO.js";
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
  const $e = {
    scope: "#windpressbreakdance-variable-app"
  };
  le($e);
  const Ee = {
    id: "windpressbreakdance-variable-app-header",
    class: "cursor:grab bb:1|solid|$(gray200)"
  }, Le = {
    class: "flex gap:10 align-items:center fg:var(dark)"
  }, Ce = {
    class: "flex align-items:center px:12 py:2"
  }, Se = {
    class: "text-transform:none font:medium text:center flex-grow:1 gap:10 align-items:center cursor:default px:12 py:2"
  }, xe = {
    __name: "PanelHeader",
    setup(a) {
      const s = I("variableApp"), n = I("isOpen");
      function c() {
        const e = s.querySelector("#windpressbreakdance-variable-app-header");
        let i = w(false), r = 0, p = 0;
        X(i, (y) => {
          y ? (document.body.style.userSelect = "none", T.querySelector("div.v-application--wrap").style.pointerEvents = "none", e.style.cursor = "grabbing") : (document.body.style.removeProperty("user-select"), T.querySelector("div.v-application--wrap").style.removeProperty("pointer-events"), e.style.cursor = "grab");
        });
        const l = (y) => {
          i.value = true;
          const k = e.getBoundingClientRect();
          r = y.clientX - k.left, p = y.clientY - k.top;
        };
        e.removeEventListener("mousedown", l), e.addEventListener("mousedown", l);
        const $ = (y) => {
          if (!i.value) return;
          const k = e.getBoundingClientRect(), G = y.clientX, m = y.clientY, o = G - r, f = m - p, _ = o < 0 ? 0 : o > window.innerWidth - k.width ? window.innerWidth - k.width : o, x = f < 0 ? 0 : f > window.innerHeight - k.height ? window.innerHeight - k.height : f;
          s.style.left = `${_}px`, s.style.top = `${x}px`;
        };
        document.removeEventListener("mousemove", $), document.addEventListener("mousemove", $);
        const S = (y) => {
          i.value = false;
        };
        document.removeEventListener("mouseup", S), document.addEventListener("mouseup", S);
      }
      return H(() => {
        c();
      }), (e, i) => {
        const r = me("inline-svg"), p = ue, l = N("tooltip");
        return u(), d("div", Ee, [
          b("div", Le, [
            b("div", Ce, [
              h(r, {
                src: P(ce),
                class: "inline-svg fill:current font:24"
              }, null, 8, [
                "src"
              ])
            ]),
            A((u(), d("div", Se, i[1] || (i[1] = [
              fe(" WindPress ")
            ]))), [
              [
                l,
                {
                  placement: "top",
                  content: `v${e.windpressbreakdance._version}`
                }
              ]
            ]),
            A((u(), d("button", {
              onClick: i[0] || (i[0] = ($) => n.value = !P(n)),
              class: "flex align-items:center py:10 px:12 fg:$(blue600):hover bg:$(blue50):hover"
            }, [
              h(p, {
                class: "iconify font:16"
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
  }, Ie = {
    class: "flex-grow:1"
  }, Pe = {
    key: 0,
    class: "expansion-panel__body"
  }, Te = {
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
    setup(a, { expose: s }) {
      const n = a, c = w(null), e = _e(`windpressbreakdance-variable-app.ui.expansion-panels.${n.namespace}`, {
        [`${n.name}`]: false
      }, void 0, {
        mergeDefaults: true
      });
      function i(p) {
        e.value[n.name] = p === null ? !e.value[n.name] : p;
      }
      function r() {
        c.value.scrollIntoView();
      }
      return s({
        togglePanel: i,
        scrollIntoView: r
      }), (p, l) => {
        const $ = ke;
        return u(), d("div", {
          ref_key: "sectionRef",
          ref: c,
          class: "expansion-panel mx:10 py:8 mr:4"
        }, [
          b("div", {
            onClick: l[0] || (l[0] = (S) => P(e)[a.name] = !P(e)[a.name]),
            class: V([
              {},
              "expansion-panel__header flex justify-content:space-between p:10 r:8 cursor:pointer"
            ])
          }, [
            b("div", Ie, [
              K(p.$slots, "header", {}, void 0, true)
            ]),
            b("div", null, [
              h($, {
                class: V([
                  {
                    "rotate(-90)": P(e)[a.name]
                  },
                  "iconify ~duration:300 font:18"
                ])
              }, null, 8, [
                "class"
              ])
            ])
          ]),
          h(re, null, {
            default: C(() => [
              P(e)[a.name] ? (u(), d("div", Pe, [
                K(p.$slots, "default", {}, void 0, true)
              ])) : O("", true)
            ]),
            _: 3
          })
        ], 512);
      };
    }
  }, R = ee(Te, [
    [
      "__scopeId",
      "data-v-8d2d37da"
    ]
  ]), Ae = {
    class: "{m:10;pb:15}>div"
  }, Ve = {
    class: "variable-section-title font:14 my:10"
  }, De = {
    class: "variable-section-items flex flex:row gap:8 flex-wrap:wrap"
  }, Oe = [
    "onClick",
    "onMouseenter"
  ], qe = {
    class: "font:14"
  }, J = {
    __name: "CommonVariableItems",
    props: {
      variableItems: {
        type: Object,
        required: true
      }
    },
    setup(a) {
      return (s, n) => {
        const c = N("tooltip");
        return u(), d("div", Ae, [
          (u(true), d(q, null, M(a.variableItems, (e, i) => (u(), d("div", {
            key: i,
            class: ""
          }, [
            b("div", Ve, U(i.replace("_", "-")), 1),
            b("div", De, [
              e.length > 0 ? (u(true), d(q, {
                key: 0
              }, M(e, (r, p) => A((u(), d("button", {
                key: p,
                onClick: (l) => s.$emit("previewChose", l, r.key),
                onMouseenter: (l) => s.$emit("previewEnter", l, r.key),
                onMouseleave: n[0] || (n[0] = (l) => s.$emit("previewLeave")),
                class: "px:12 py:8 r:8 font:medium fg:$(dark) fg:$(accent-normal):hover bg:$(gray150) bg:$(gray300):hover b:0 flex-grow:1 flex-shrink:1 flex-basis:30% cursor:pointer {opacity:.5}>span opacity:100:hover>span"
              }, [
                b("span", qe, U(r.label), 1)
              ], 40, Oe)), [
                [
                  c,
                  {
                    placement: "top",
                    content: `var(${r.key}, ${r.value})`
                  }
                ]
              ])), 128)) : O("", true)
            ])
          ]))), 128))
        ]);
      };
    }
  }, Me = {
    class: "{m:10;pb:15}>div"
  }, We = {
    class: "variable-section-title font:14 my:10"
  }, Fe = {
    key: 0,
    class: "variable-section-items"
  }, ze = [
    "onClick",
    "onMouseenter"
  ], Be = [
    "onClick",
    "onMouseenter"
  ], Re = {
    __name: "ColorVariableItems",
    props: {
      variableItems: {
        type: Object,
        required: true
      }
    },
    setup(a) {
      return (s, n) => {
        const c = N("tooltip");
        return u(), d("div", Me, [
          (u(true), d(q, null, M(a.variableItems, (e, i) => (u(), d("div", {
            key: i,
            class: ""
          }, [
            b("div", We, U(i), 1),
            e.DEFAULT ? (u(), d("div", Fe, [
              A(b("button", {
                onClick: (r) => s.$emit("previewChose", r, e.DEFAULT.key),
                onMouseenter: (r) => s.$emit("previewEnter", r, e.DEFAULT.key),
                onMouseleave: n[0] || (n[0] = (r) => s.$emit("previewLeave")),
                class: V([
                  `bg:$(${e.DEFAULT.key.slice(2)})`,
                  "w:full r:4 h:24 border:1|solid|transparent border:white:hover cursor:pointer"
                ])
              }, null, 42, ze), [
                [
                  c,
                  {
                    placement: "top",
                    content: `var(${e.DEFAULT.key}, ${e.DEFAULT.value})`
                  }
                ]
              ])
            ])) : O("", true),
            e.shades && Object.keys(e.shades).length > 0 ? (u(), d("div", {
              key: 1,
              class: V([
                [
                  {},
                  Object.keys(e.shades).length > 1 ? "rl:4>div:first-child>button rr:4>div:last-child>button" : "",
                  `grid-template-cols:repeat(${Object.keys(e.shades).length},auto)`
                ],
                "variable-section-items grid r:4 overflow:hidden"
              ])
            }, [
              (u(true), d(q, null, M(e.shades, (r, p) => (u(), d("div", {
                key: p,
                class: "flex gap:10"
              }, [
                A(b("button", {
                  onClick: (l) => s.$emit("previewChose", l, r.key),
                  onMouseenter: (l) => s.$emit("previewEnter", l, r.key),
                  onMouseleave: n[1] || (n[1] = (l) => s.$emit("previewLeave")),
                  class: V([
                    `bg:$(${r.key.slice(2)})`,
                    "w:full h:24 border:1|solid|transparent border:white:hover cursor:pointer"
                  ])
                }, null, 42, Be), [
                  [
                    c,
                    {
                      placement: "top",
                      content: `var(${r.key}, ${r.value})`
                    }
                  ]
                ])
              ]))), 128))
            ], 2)) : O("", true)
          ]))), 128))
        ]);
      };
    }
  }, je = {
    id: "windpressbreakdance-variable-app-body",
    class: "rel w:full h:full overflow-y:scroll! bb:1|solid|$(gray200)>div:not(:last-child)"
  }, Ue = 1e3, He = {
    __name: "PanelBody",
    setup(a) {
      const s = w({
        colors: {},
        typography: {},
        sizing: {}
      }), n = I("focusedInput"), c = I("recentVariableSelectionTimestamp"), e = I("tempInputValue"), i = I("variableApp");
      async function r() {
        const m = ve.contentWindow.document.querySelector('script#windpress\\:vfs[type="text/plain"]'), o = ye(m.textContent), f = await he({
          volume: o
        });
        let _ = i.querySelector("style#windpressbreakdance-variable-app-body-style");
        _ || (_ = document.createElement("style"), _.id = "windpressbreakdance-variable-app-body-style", i.appendChild(_)), _.innerHTML = `
        #windpressbreakdance-variable-app-body {
            ${f.map((t) => `${t.key}:${t.value};`).join("")}
        }
    `;
        const x = {};
        f.filter((t) => t.key.startsWith("--color")).forEach((t) => {
          const v = t.key.slice(8), z = v.split("-");
          let B = "";
          if (z.length > 1) {
            const se = z[0], ae = z.slice(1).join("-");
            B = `${se}.shades.'${ae}'`;
          } else B = `${v}.DEFAULT`;
          we(x, B, t);
        }), s.value.colors = Object.keys(x).sort().reduce((t, v) => (t[v] = x[v], t), {});
        const L = {
          font_size: [],
          line_height: [],
          letter_spacing: []
        };
        f.filter((t) => t.key.startsWith("--text-") && !t.key.endsWith("--line-height")).forEach((t) => {
          const v = t.key.slice(7);
          L.font_size.push({
            key: t.key,
            label: v,
            value: t.value
          });
        }), f.filter((t) => t.key.startsWith("--leading-") || t.key.endsWith("--leading")).forEach((t) => {
          const v = t.key.startsWith("--leading-") ? t.key.slice(10) : t.key.slice(2, -9);
          L.line_height.push({
            key: t.key,
            label: v,
            value: t.value
          });
        }), L.line_height.sort((t, v) => t.label.startsWith("font-size-") && !v.label.startsWith("font-size-") ? 1 : !t.label.startsWith("font-size-") && v.label.startsWith("font-size-") ? -1 : 0), f.filter((t) => t.key.startsWith("--tracking-")).forEach((t) => {
          const v = t.key.slice(11);
          L.letter_spacing.push({
            key: t.key,
            label: v,
            value: t.value
          });
        }), s.value.typography = L;
        const g = {
          container: [],
          breakpoint: []
        };
        f.filter((t) => t.key.startsWith("--container-")).forEach((t) => {
          const v = t.key.slice(12);
          g.container.push({
            key: t.key,
            label: v,
            value: t.value
          });
        }), f.filter((t) => t.key.startsWith("--breakpoint-")).forEach((t) => {
          const v = t.key.slice(13);
          g.breakpoint.push({
            key: t.key,
            label: v,
            value: t.value
          });
        }), s.value.sizing = g;
      }
      const p = w(null), l = w(null), $ = w(null);
      X(n, (m) => {
        if (m) {
          const o = m.closest("[data-test-id]"), f = [
            "color"
          ].some((g) => o.getAttribute("data-test-id").includes(g)), _ = [
            "fontSize"
          ].some((g) => o.getAttribute("data-test-id").includes(g)), x = [
            "spacing",
            "size-width"
          ].some((g) => o.getAttribute("data-test-id").includes(g));
          l.value.togglePanel(false), $.value.togglePanel(false), p.value.togglePanel(false);
          async function L() {
            for (; m.parentElement.parentElement.parentElement.querySelector("div.dropdown>button.breakdance-unit-input-unit") === null; ) await new Promise((g) => setTimeout(g, 10));
            for (m.parentElement.parentElement.parentElement.querySelector("div.dropdown>button.breakdance-unit-input-unit").click(); document.querySelector(".v-menu__content.menuable__content__active .dropdown-content .v-list .v-list-item:last-child .v-list-item__title") === null; ) await new Promise((g) => setTimeout(g, 10));
            document.querySelector(".v-menu__content.menuable__content__active .dropdown-content .v-list .v-list-item:last-child .v-list-item__title").click(), setTimeout(() => {
              m.focus();
            }, 100);
          }
          f ? (p.value.togglePanel(true), p.value.scrollIntoView()) : _ ? (l.value.togglePanel(true), l.value.scrollIntoView(), L()) : x && ($.value.togglePanel(true), $.value.scrollIntoView(), L());
        }
      });
      function S(m, o) {
        performance.now() - c.value < Ue || n.value && (n.value.value = `var(${o})`, n.value.dispatchEvent(new Event("input")), n.value.focus());
      }
      function y(m) {
        !n.value || e.value === null || (n.value.value = e.value, n.value.dispatchEvent(new Event("input")), n.value.focus());
      }
      function k(m, o) {
        n.value && (n.value.value = `var(${o})`, n.value.dispatchEvent(new Event("input")), n.value.focus(), e.value = `var(${o})`, c.value = performance.now());
      }
      return H(() => {
        r();
      }), new BroadcastChannel("windpress").addEventListener("message", async (m) => {
        const o = m.data;
        o.source === "windpress/autocomplete" && o.task === "windpress.code-editor.saved.done" && setTimeout(() => {
          r();
        }, 1e3);
      }), (m, o) => (u(), d("div", je, [
        h(R, {
          namespace: "variable",
          name: "color",
          ref_key: "sectionColor",
          ref: p
        }, {
          header: C(() => o[0] || (o[0] = [
            b("span", {
              class: "font:semibold"
            }, "Color", -1)
          ])),
          default: C(() => [
            h(Re, {
              variableItems: s.value.colors,
              onPreviewEnter: S,
              onPreviewLeave: y,
              onPreviewChose: k
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512),
        h(R, {
          namespace: "variable",
          name: "typography",
          ref_key: "sectionTypography",
          ref: l
        }, {
          header: C(() => o[1] || (o[1] = [
            b("span", {
              class: "font:semibold"
            }, "Typography", -1)
          ])),
          default: C(() => [
            h(J, {
              variableItems: s.value.typography,
              onPreviewEnter: S,
              onPreviewLeave: y,
              onPreviewChose: k
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512),
        h(R, {
          namespace: "variable",
          name: "spacing",
          ref_key: "sectionSpacing",
          ref: $,
          class: ""
        }, {
          header: C(() => o[2] || (o[2] = [
            b("span", {
              class: "font:semibold"
            }, "Sizing", -1)
          ])),
          default: C(() => [
            h(J, {
              variableItems: s.value.sizing,
              onPreviewEnter: S,
              onPreviewLeave: y,
              onPreviewChose: k
            }, null, 8, [
              "variableItems"
            ])
          ]),
          _: 1
        }, 512)
      ]));
    }
  }, Ne = ee(He, [
    [
      "__scopeId",
      "data-v-446a34f9"
    ]
  ]), Xe = {
    __name: "App",
    setup(a) {
      const s = I("isOpen"), n = w(null);
      function c() {
        T.classList.contains("theme--light") ? (n.value.classList.add("theme--light"), n.value.classList.remove("theme--dark")) : T.classList.contains("theme--dark") && (n.value.classList.add("theme--dark"), n.value.classList.remove("theme--light"));
      }
      return new MutationObserver((i) => {
        i.forEach((r) => {
          r.attributeName === "class" && c();
        });
      }).observe(T, {
        attributes: true,
        attributeFilter: [
          "class"
        ],
        childList: false,
        subtree: false
      }), H(() => {
        c();
      }), (i, r) => A((u(), d("div", {
        id: "windpressbreakdance-variable-app-container",
        ref_key: "containerRef",
        ref: n,
        class: "v-application flex flex:column w:full h:full"
      }, [
        h(xe),
        (u(), be(ge, null, {
          default: C(() => [
            h(Ne)
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
  function Ye({ selector: a, callback: s, options: n }) {
    const c = new MutationObserver(s), e = document.querySelector(a);
    if (!e) {
      te(`Target not found for selector: ${a}`, {
        module: "variable-picker",
        type: "error"
      });
      return;
    }
    const i = {
      childList: true,
      subtree: true
    };
    c.observe(e, Object.assign(Object.assign({}, i), n));
  }
  const W = document.createElement("windpressbreakdance-variable-app");
  W.id = "windpressbreakdance-variable-app";
  T.appendChild(W);
  const D = w(false), F = w(null), Y = w(null), Ge = w(0), E = oe(Xe);
  E.config.globalProperties.windpressbreakdance = window.windpressbreakdance;
  E.provide("variableApp", W);
  E.provide("isOpen", D);
  E.provide("focusedInput", F);
  E.provide("tempInputValue", Y);
  E.provide("recentVariableSelectionTimestamp", Ge);
  E.use(pe, {
    container: "#windpressbreakdance-variable-app"
  });
  E.component("inline-svg", de);
  E.mount("#windpressbreakdance-variable-app");
  function Q(a) {
    var _a;
    !a.shiftKey || !a.target || ((_a = document == null ? void 0 : document.getSelection()) == null ? void 0 : _a.removeAllRanges(), a.preventDefault(), a.stopPropagation(), F.value = a.target, Y.value = a.target.value, D.value = true);
  }
  function Z(a) {
    F.value = a.target;
  }
  const Ke = {
    includedFields: [
      "div.breakdance-control-wrapper-input-wrapper div.breakdance-text-input-wrapper"
    ]
  };
  function ne() {
    setTimeout(() => {
      let a = false;
      Ke.includedFields.forEach((s) => {
        (typeof s == "string" ? [
          ...document.querySelectorAll(s)
        ] : [
          ...document.querySelectorAll(s.selector)
        ].filter((c) => s.hasChild.some((e) => c.querySelector(e)))).forEach((c) => {
          const e = c.querySelector("input[type='text']");
          (e == null ? void 0 : e.getAttribute("windpressbreakdance-variable-app")) !== "listened" && (e == null ? void 0 : e.removeEventListener("click", Q), e == null ? void 0 : e.addEventListener("click", Q), e == null ? void 0 : e.removeEventListener("focus", Z), e == null ? void 0 : e.addEventListener("focus", Z), e == null ? void 0 : e.setAttribute("windpressbreakdance-variable-app", "listened"), a = true);
        });
      }), a && (F.value = null, Y.value = null);
    }, 100);
  }
  let j = false;
  Ye({
    selector: "div:has(>div.breakdance-add-panel)",
    options: {
      subtree: true,
      childList: true
    },
    callback() {
      j || (j = true, ne(), setTimeout(() => {
        j = false;
      }, 100));
    }
  });
  ne();
  document.addEventListener("keydown", (a) => {
    a.key === "Escape" && D.value && (D.value = false);
  });
  X(D, (a) => {
    W.style.zIndex = a ? "calc(Infinity)" : "-1";
  });
  te("Module loaded!", {
    module: "variable-picker"
  });
});

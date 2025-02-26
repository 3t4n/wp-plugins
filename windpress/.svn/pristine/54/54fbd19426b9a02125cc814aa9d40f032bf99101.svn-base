import { r as u } from "../../../../resolve-config-D_K0LwYp.js";
import { R as w } from "../../../../setupContextUtils-DmnPFBZ3.js";
import { c as C } from "../../../../generateRules-DUY2cBXN.js";
import { d as g } from "../../../../vfs-DmzitRvm.js";
import { __tla as __tla_0 } from "../../../../module-oN1JnOJ9.js";
import { __tla as __tla_1 } from "../../../../index-BmQd5Vrd.js";
import { b as d } from "../../../../intellisense-Nf6mwf2_.js";
import { s as c } from "../../../../set-DvizEivO.js";
import "../../../../index-CgqXENQe.js";
import "../../../../index-BAMY2Nnw.js";
import "../../../../preload-helper-DH9yCMdR.js";
import "../../../../stylesheet-B98yp78w.js";
import "../../../../index-xtxc-82G.js";
import "../../../../isObject-CRxghtyK.js";
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
  var _a;
  const S = document.querySelector('script#windpress\\:vfs[type="text/plain"]');
  function m(t, r) {
    const s = t.tailwindConfig.prefix;
    return typeof s == "function" ? s(r) : s + r;
  }
  function h(t, r) {
    var _a2;
    const s = /* @__PURE__ */ new Set([
      m(r, "group"),
      m(r, "peer")
    ]), i = [];
    for (const n of t) {
      let e = ((_a2 = C(/* @__PURE__ */ new Set([
        n
      ]), r).sort(([p], [a]) => d(a - p))[0]) == null ? void 0 : _a2[0]) ?? null;
      e === null && s.has(n) && (e = r.layerOrder.components), i.push([
        n,
        e
      ]);
    }
    return i;
  }
  async function f(t) {
    const r = g(S.textContent), s = t.split(/\s+/).filter((o) => o !== "" && o !== "|"), i = [], n = await u(r), e = w(n), a = (e.getClassOrder ? e.getClassOrder(s) : h(s, e)).sort(([, o], [, l]) => o === l ? 0 : o === null ? -1 : l === null ? 1 : d(o - l)).map(([o]) => o);
    return [
      ...i,
      ...a
    ].join(" ");
  }
  ((_a = window.wp) == null ? void 0 : _a.hooks) && window.wp.hooks.addFilter("windpress.module.class-sorter", "windpress", f);
  c(window, "windpress.loaded.module.classSorter", true);
  c(window, "windpress.module.classSorter.sort", async (t) => f(t));
});

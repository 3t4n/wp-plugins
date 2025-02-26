import { F as C } from "../../../../fuse-Ch1WBRTM.js";
import { a as b, l as k } from "../../../../intellisense-Nf6mwf2_.js";
import { d as M } from "../../../../vfs-DmzitRvm.js";
import { s as w } from "../../../../set-DvizEivO.js";
import { __tla as __tla_0 } from "../../../../module-oN1JnOJ9.js";
import "../../../../preload-helper-DH9yCMdR.js";
import "../../../../index-BAMY2Nnw.js";
import "../../../../stylesheet-B98yp78w.js";
import "../../../../index-xtxc-82G.js";
import "../../../../isObject-CRxghtyK.js";
Promise.all([
  (() => {
    try {
      return __tla_0;
    } catch {
    }
  })()
]).then(async () => {
  var _a;
  let d = [];
  const v = new BroadcastChannel("windpress"), p = document.querySelector('script#windpress\\:vfs[type="text/plain"]');
  p && (F(), new MutationObserver(async () => {
    await u();
  }).observe(p, {
    characterData: true,
    subtree: true
  }));
  async function u() {
    const t = M(p.textContent);
    d = await b(await k({
      volume: t
    })), v.postMessage({
      source: "windpress/autocomplete",
      target: "any",
      task: "windpress.code-editor.saved.done"
    });
  }
  await u();
  function F() {
    v.addEventListener("message", async (t) => {
      const i = t.data;
      i.source === "windpress/dashboard" && i.target === "windpress/observer" && i.task === "windpress.code-editor.saved" && await u();
    });
  }
  function m(t) {
    var _a2;
    return ((_a2 = t == null ? void 0 : t.find((a) => a.property.includes("color"))) == null ? void 0 : _a2.value) || null;
  }
  function h(t) {
    if (t === "") return d.map((e) => ({
      value: e.selector,
      color: m(e.declarations)
    }));
    let i = t.split(":"), a = i.slice(0, -1).join(":"), s = i.pop(), n = "";
    s.startsWith("!") && (s = s.slice(1), n = "!");
    let o = false;
    if (s.includes("/")) {
      let [e, r] = s.split("/");
      r === "" ? (s = e, o = r) : isNaN(r) || r < 0 || r > 100 ? s = [
        e,
        r
      ].join("/") : (s = e, o = parseInt(r));
    }
    let l = d.filter((e) => e.selector.includes(s));
    if (o !== false) {
      let e = [];
      const r = o === "" ? 5 : 1, y = o === "" || o > 9 ? 0 : Math.floor((o * 10 + 1) / 10) * 10, g = o === "" || o > 9 ? 100 : Math.ceil((o * 10 + 1) / 10) * 10;
      l.forEach((f) => {
        for (let c = y; c <= g; c += r) e.push({
          ...f,
          selector: f.selector + "/" + c
        });
      }), l = e;
    }
    return new C(l, {
      keys: [
        "selector"
      ],
      threshold: 0.4
    }).search(s).map(({ item: e }) => ({
      value: [
        a,
        (n ? "!" : "") + e.selector
      ].filter(Boolean).join(":"),
      color: m(e.declarations)
    }));
  }
  ((_a = window.wp) == null ? void 0 : _a.hooks) && window.wp.hooks.addFilter("windpress.module.autocomplete", "windpress", h);
  w(window, "windpress.loaded.module.autocomplete", true);
  w(window, "windpress.module.autocomplete.query", (t) => h(t));
});

import { e as p, __tla as __tla_0 } from "../../../../module-oN1JnOJ9.js";
import { b as y, __tla as __tla_1 } from "../../../../build-C39uKkyY.js";
import { d as f } from "../../../../vfs-DmzitRvm.js";
import { __tla as __tla_2 } from "../../../../index-BmQd5Vrd.js";
import "../../../../index-xtxc-82G.js";
import { r as v } from "../../../../resolve-config-D_K0LwYp.js";
import "../../../../preload-helper-DH9yCMdR.js";
import "../../../../index-BAMY2Nnw.js";
import { __tla as __tla_3 } from "../../../../index-CcO2jMy2.js";
import "../../../../postcss-CMxDEYNb.js";
import "../../../../index-DYEcFSWi.js";
import "../../../../index-CgqXENQe.js";
import "../../../../index-iAEQxtNR.js";
import "../../../../didyoumean-DVWXwy9y.js";
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
  })(),
  (() => {
    try {
      return __tla_2;
    } catch {
    }
  })(),
  (() => {
    try {
      return __tla_3;
    } catch {
    }
  })()
]).then(async () => {
  let s, m = null, i = /* @__PURE__ */ new Set();
  const o = document.querySelector('script#windpress\\:vfs[type="text/plain"]');
  o && (b(), new MutationObserver(async () => {
    await c();
  }).observe(o, {
    characterData: true,
    subtree: true
  }));
  async function c() {
    const e = f(o.textContent);
    m = await v(e), await u();
  }
  const w = new MutationObserver(async (e) => {
    const n = [
      "STYLE",
      "SCRIPT"
    ];
    let t = true;
    for (let a of e) {
      const r = a.target;
      r.nodeType === 1 && n.includes(r.tagName) && (t = false);
      for (let d of a.addedNodes) {
        const l = d;
        l.nodeType === 1 && n.includes(l.tagName) && (t = false);
      }
    }
    t && await u();
  });
  w.observe(document.documentElement, {
    attributes: true,
    attributeFilter: [
      "class"
    ],
    subtree: true,
    childList: true
  });
  async function u() {
    const e = /* @__PURE__ */ new Set();
    if (document.querySelectorAll("[class]").forEach((n) => {
      n.classList.forEach((t) => e.add(t));
    }), document.body && e.size > 0) {
      if ((!s || !s.isConnected) && (s = document.createElement("style"), document.head.append(s)), i.size === e.size) {
        let n = false;
        for (let t of e) if (!i.has(t)) {
          n = true;
          break;
        }
        if (!n) return;
      }
      i = e, s.textContent = await y({
        entrypoint: {
          css: "/main.css",
          config: "/tailwind.config.js"
        },
        contents: Array.from(e),
        volume: f(o.textContent),
        options: {
          resolvedConfig: m
        }
      });
    }
  }
  await c();
  function b() {
    new BroadcastChannel("windpress").addEventListener("message", async (n) => {
      const t = n.data;
      t.source === "windpress/dashboard" && t.target === "windpress/observer" && t.task === "windpress.code-editor.saved" && (o.textContent = p(JSON.stringify(t.payload.volume)), await c());
    });
  }
});

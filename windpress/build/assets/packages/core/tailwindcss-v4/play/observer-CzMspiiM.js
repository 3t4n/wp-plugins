import { e as f, __tla as __tla_0 } from "../../../../module-oN1JnOJ9.js";
import { b as u } from "../../../../build-BEB5OvHV.js";
import { d as m } from "../../../../vfs-DmzitRvm.js";
import "../../../../preload-helper-DH9yCMdR.js";
import "../../../../index-BAMY2Nnw.js";
import { __tla as __tla_1 } from "../../../../index-CcO2jMy2.js";
import "../../../../stylesheet-B98yp78w.js";
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
  let a, d = /* @__PURE__ */ new Set();
  const n = document.querySelector('script#windpress\\:vfs[type="text/plain"]');
  n && (y(), new MutationObserver(async () => {
    await r();
  }).observe(n, {
    characterData: true,
    subtree: true
  }));
  const p = new MutationObserver(async (t) => {
    const s = [
      "STYLE",
      "SCRIPT"
    ];
    let e = true;
    for (let o of t) {
      const i = o.target;
      i.nodeType === 1 && s.includes(i.tagName) && (e = false);
      for (let c of o.addedNodes) {
        const l = c;
        l.nodeType === 1 && s.includes(l.tagName) && (e = false);
      }
    }
    e && await r();
  });
  p.observe(document.documentElement, {
    attributes: true,
    attributeFilter: [
      "class"
    ],
    subtree: true,
    childList: true
  });
  async function r() {
    const t = /* @__PURE__ */ new Set();
    if (document.querySelectorAll("[class]").forEach((s) => {
      s.classList.forEach((e) => t.add(e));
    }), document.body && t.size > 0) {
      if ((!a || !a.isConnected) && (a = document.createElement("style"), document.head.append(a)), d.size === t.size) {
        let s = false;
        for (let e of t) if (!d.has(e)) {
          s = true;
          break;
        }
        if (!s) return;
      }
      d = t, a.textContent = await u({
        candidates: Array.from(t),
        entrypoint: "/main.css",
        volume: m(n.textContent)
      });
    }
  }
  await r();
  function y() {
    new BroadcastChannel("windpress").addEventListener("message", async (s) => {
      const e = s.data;
      e.source === "windpress/dashboard" && e.target === "windpress/observer" && e.task === "windpress.code-editor.saved" && (n.textContent = f(JSON.stringify(e.payload.volume)), await r());
    });
  }
});

import { l as e } from "../../logger-BTW-zIW3.js";
import { d as w } from "../../debounce-mLPa8vJU.js";
import "../../isObject-CRxghtyK.js";
e("Loading...");
(async () => {
  let n, o;
  for (e("waiting for the rootContainer..."); !n; ) n = document.querySelector("div#site-editor"), await new Promise((t) => setTimeout(t, 100));
  e("finding WindPress script...");
  let s = false, d = setTimeout(() => {
    s = true;
  }, 45e3);
  for (; !s; ) {
    if (o = document.querySelectorAll("script"), o = Array.from(o).filter((t) => {
      let r = t.getAttribute("id");
      return r && (r.startsWith("windpress:") || r.startsWith("vite-client")) && !r.startsWith("windpress:integration-");
    }), o.length > 0) {
      clearTimeout(d);
      break;
    }
    await new Promise((t) => setTimeout(t, 100));
  }
  if (s) {
    e("time out! failed to find WindPress script");
    return;
  }
  e("found WindPress script");
  async function u() {
    let t, r = false, m = setTimeout(() => {
      r = true;
    }, 45e3);
    for (; !r; ) {
      if (t = document.querySelector("iframe.edit-site-visual-editor__editor-canvas"), t) {
        clearTimeout(m);
        break;
      }
      await new Promise((i) => setTimeout(i, 100));
    }
    if (r) {
      e("time out! failed to find editor canvas");
      return;
    }
    for (e("found editor canvas"), e("waiting for the canvas loader to be removed..."); document.querySelector("div.edit-site-canvas-loader") !== null; ) await new Promise((i) => setTimeout(i, 200));
    e("canvas loader removed");
    let f = t.contentWindow || t, a = t.contentDocument || f.document;
    for (; !a.head; ) await new Promise((i) => setTimeout(i, 300));
    e("injecting WindPress script into the root container");
    let p = a.querySelectorAll("script");
    Array.from(p).some((i) => {
      let c = i.getAttribute("id");
      return c && c.startsWith("windpress:");
    }) ? e("WindPress script is already injected, skipping the injection process...") : (e("starting the root injection process..."), o.forEach((i) => {
      a.head.appendChild(document.createRange().createContextualFragment(i.outerHTML));
    }));
  }
  const l = w(u, 1e3);
  new MutationObserver(() => {
    l();
  }).observe(n, { subtree: true, childList: true });
})();

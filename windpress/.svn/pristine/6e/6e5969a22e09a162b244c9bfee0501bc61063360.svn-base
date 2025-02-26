import { l as s } from "./logger-BTW-zIW3.js";
import { uniIframe as d } from "./constant-V9Qf7smn.js";
const p = new BroadcastChannel("windpress");
(function() {
  const r = window.XMLHttpRequest;
  function o() {
    const e = new r(), a = e.open;
    return e.open = function(i, c) {
      if (i === "POST" && c.includes("v2/builderius")) {
        const n = e.onreadystatechange;
        e.onreadystatechange = function() {
          var _a, _b, _c, _d, _e;
          if (e.readyState === 4 && e.status === 200) try {
            const t = JSON.parse(e.responseText);
            (((_b = (_a = t.commit_entity) == null ? void 0 : _a.errors) == null ? void 0 : _b.length) === 0 || ((_d = (_c = t.commit_global) == null ? void 0 : _c.errors) == null ? void 0 : _d.length) === 0) && p.postMessage({ source: "windpress/integration", target: "windpress/dashboard", task: "windpress.generate-cache", payload: { force_pull: true, tailwindcss_version: Number((_e = d.contentWindow.windpress) == null ? void 0 : _e._tailwindcss_version) } });
          } catch (t) {
            s("Failed to intercept the response.", t, { module: "generate-cache" });
          }
          n && n.apply(this, arguments);
        };
      }
      a.apply(this, arguments);
    }, e;
  }
  window.XMLHttpRequest = o;
})();
s("Module loaded!", { module: "generate-cache" });

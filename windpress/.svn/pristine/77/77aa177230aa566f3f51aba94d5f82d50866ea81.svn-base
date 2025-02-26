import { l as p } from "./logger-BTW-zIW3.js";
import { settingsState as c, brxIframe as d } from "./constant-D6K4uIdy.js";
import "./virtual-Cakm3k_V.js";
import "./index-Dgh2qPwk.js";
import "./isObject-CRxghtyK.js";
import "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./set-DvizEivO.js";
const u = new BroadcastChannel("windpress");
(function() {
  const a = window.XMLHttpRequest;
  function s() {
    const e = new a();
    if (!c("module.generate-cache.on-save", true).value) return e;
    const o = e.open;
    return e.open = function(r, i) {
      if (r === "POST" && i.includes("admin-ajax.php")) {
        const n = e.onreadystatechange;
        e.onreadystatechange = function() {
          var _a;
          if (e.readyState === 4 && e.status === 200) {
            const t = JSON.parse(e.responseText);
            t.data && t.data.action && t.data.action === "bricks_save_post" && u.postMessage({ source: "windpress/integration", target: "windpress/dashboard", task: "windpress.generate-cache", payload: { force_pull: true, tailwindcss_version: Number((_a = d.contentWindow.windpress) == null ? void 0 : _a._tailwindcss_version) } });
          }
          n && n.apply(this, arguments);
        };
      }
      o.apply(this, arguments);
    }, e;
  }
  window.XMLHttpRequest = s;
})();
p("Module loaded!", { module: "generate-cache" });

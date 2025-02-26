import { l as i } from "./logger-BTW-zIW3.js";
const c = document.getElementById("previewiframe"), d = new BroadcastChannel("windpress");
(function() {
  const t = window.XMLHttpRequest;
  function s() {
    const e = new t(), a = e.open;
    return e.open = function(o, r) {
      if (o === "POST" && r.includes("admin-ajax.php")) {
        const n = e.onreadystatechange;
        e.onreadystatechange = function() {
          var _a;
          e.readyState === 4 && e.status === 200 && e.responseText === "Save" && d.postMessage({ source: "windpress/integration", target: "windpress/dashboard", task: "windpress.generate-cache", payload: { force_pull: true, tailwindcss_version: Number((_a = c.contentWindow.windpress) == null ? void 0 : _a._tailwindcss_version) } }), n && n.apply(this, arguments);
        };
      }
      a.apply(this, arguments);
    }, e;
  }
  window.XMLHttpRequest = s;
})();
i("Module loaded!", { module: "generate-cache" });

import { l as o } from "./logger-BTW-zIW3.js";
import { bdeIframe as t } from "./constant-BZV3uY6b.js";
const r = new BroadcastChannel("windpress");
(function() {
  const { fetch: a } = window;
  window.fetch = async (...e) => {
    var _a;
    const n = await a(...e);
    if (new URL(e[0]).searchParams.get("_breakdance_doing_ajax") === "yes") {
      const s = Object.fromEntries(e[1].body.entries());
      n.ok && n.status === 200 && s.action === "breakdance_save" && r.postMessage({ source: "windpress/integration", target: "windpress/dashboard", task: "windpress.generate-cache", payload: { force_pull: true, tailwindcss_version: Number((_a = t.contentWindow.windpress) == null ? void 0 : _a._tailwindcss_version) } });
    }
    return n;
  };
})();
o("Module loaded!", { module: "generate-cache" });

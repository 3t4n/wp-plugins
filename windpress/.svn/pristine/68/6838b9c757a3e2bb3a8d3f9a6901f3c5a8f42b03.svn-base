import { l as a } from "./logger-BTW-zIW3.js";
import { iframeScope as e, oxyIframe as s } from "./constant-DFowkQsk.js";
const n = new BroadcastChannel("windpress"), r = e.allSaved;
e.allSaved = function() {
  var _a;
  r.apply(this, arguments), n.postMessage({ source: "windpress/integration", target: "windpress/dashboard", task: "windpress.generate-cache", payload: { force_pull: true, tailwindcss_version: Number((_a = s.contentWindow.windpress) == null ? void 0 : _a._tailwindcss_version) } });
};
a("Module loaded!", { module: "generate-cache" });

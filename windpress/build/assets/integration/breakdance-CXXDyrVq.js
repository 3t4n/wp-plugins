const __vite__mapDeps=(i,m=__vite__mapDeps,d=(m.f||(m.f=["../main-DcNsKP8H.css","../main-ChYedutB.css"])))=>i.map(i=>d[i]);
import { _ as t } from "../preload-helper-DH9yCMdR.js";
import { l as i } from "../logger-BTW-zIW3.js";
(async () => {
  i("Loading...");
  (async () => {
    var _a, _b, _c, _d;
    for (; !((_a = document.querySelector("#app")) == null ? void 0 : _a.__vue__); ) await new Promise((e) => setTimeout(e, 100));
    for (; !((_b = document.querySelector("#app #iframe")) == null ? void 0 : _b.contentDocument.querySelector("#breakdance_canvas")); ) await new Promise((e) => setTimeout(e, 100));
    const { bdeIframe: o } = await t(async () => {
      const { bdeIframe: e } = await import("../constant-BZV3uY6b.js");
      return {
        bdeIframe: e
      };
    }, [], import.meta.url);
    i("Loading modules..."), await t(() => import("../main-D71niMo-.js").then(async (m) => {
      await m.__tla;
      return m;
    }), __vite__mapDeps([0]), import.meta.url), await t(() => import("../main-CWjEuD5Y.js"), [], import.meta.url), Number((_c = o.contentWindow.windpress) == null ? void 0 : _c._tailwindcss_version) === 4 && await t(() => import("../main-DMlb8Tfy.js").then(async (m) => {
      await m.__tla;
      return m;
    }), __vite__mapDeps([1]), import.meta.url), ((_d = o.contentWindow.windpress) == null ? void 0 : _d.is_ubiquitous) && await t(() => import("../main-CZQobcr_.js"), [], import.meta.url), i("Modules loaded!");
  })();
})();

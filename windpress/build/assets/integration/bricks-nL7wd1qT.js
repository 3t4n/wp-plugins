const __vite__mapDeps=(i,m=__vite__mapDeps,d=(m.f||(m.f=["../main-A84v0XuZ.css","../main-D0BLsOxp.css","../main-DqEjpNsB.css"])))=>i.map(i=>d[i]);
import { _ as t } from "../preload-helper-DH9yCMdR.js";
import { l as i } from "../logger-BTW-zIW3.js";
import { i as o } from "../index-DDChq6R5.js";
import "../index-CgqXENQe.js";
(async () => {
  const _ = {
    scope: "body .master-css",
    rootSize: 10
  };
  o(_);
  i("Loading...");
  (async () => {
    var _a, _b, _c, _d;
    for (; !((_a = document.querySelector(".brx-body")) == null ? void 0 : _a.__vue_app__); ) await new Promise((e) => setTimeout(e, 100));
    for (; document.getElementById("bricks-preloader"); ) await new Promise((e) => setTimeout(e, 100));
    for (; !((_c = (_b = document.getElementById("bricks-builder-iframe")) == null ? void 0 : _b.contentDocument.querySelector(".brx-body")) == null ? void 0 : _c.__vue_app__); ) await new Promise((e) => setTimeout(e, 100));
    const { brxIframe: r } = await t(async () => {
      const { brxIframe: e } = await import("../constant-D6K4uIdy.js");
      return {
        brxIframe: e
      };
    }, [], import.meta.url);
    i("Loading modules..."), await t(() => import("../main-DST_3Ip2.js"), __vite__mapDeps([0]), import.meta.url), await t(() => import("../main-DO98chE1.js").then(async (m) => {
      await m.__tla;
      return m;
    }), __vite__mapDeps([1]), import.meta.url), await t(() => import("../main-D-8v3iYz.js"), [], import.meta.url), await t(() => import("../main-DPEk-AT1.js"), [], import.meta.url), Number((_d = r.contentWindow.windpress) == null ? void 0 : _d._tailwindcss_version) === 4 && (await t(() => import("../main-D9kpzB0j.js").then(async (m) => {
      await m.__tla;
      return m;
    }), [], import.meta.url), await t(() => import("../main-BWttW_0n.js").then(async (m) => {
      await m.__tla;
      return m;
    }), [], import.meta.url), await t(() => import("../main-C00TLkuB.js").then(async (m) => {
      await m.__tla;
      return m;
    }), __vite__mapDeps([2]), import.meta.url)), i("Modules loaded!");
  })();
})();

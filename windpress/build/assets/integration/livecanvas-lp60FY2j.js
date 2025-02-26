import { _ as t } from "../preload-helper-DH9yCMdR.js";
import { l as e } from "../logger-BTW-zIW3.js";
(async () => {
  e("Loading...");
  (async () => {
    var _a;
    for (; !((_a = document.getElementById("previewiframe")) == null ? void 0 : _a.contentDocument.querySelector("#theme-main")); ) await new Promise((o) => setTimeout(o, 100));
    e("Loading modules..."), await t(() => import("../main-U1emTgnl.js"), [], import.meta.url), e("Modules loaded!");
  })();
})();

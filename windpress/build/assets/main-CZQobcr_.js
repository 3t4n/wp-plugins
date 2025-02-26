var _a;
import { c as s } from "./virtual-Cakm3k_V.js";
import { l as r } from "./logger-BTW-zIW3.js";
import { L as c } from "./windpress-a09-ZfRP.js";
import { bdeIframe as d } from "./constant-BZV3uY6b.js";
import { w as l } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./index-Dgh2qPwk.js";
import "./isObject-CRxghtyK.js";
import "./set-DvizEivO.js";
const m = ".topbar-section.undo-redo-top-bar-section", u = document.createRange().createContextualFragment(`
    <div class="topbar-section topbar-section-bl">
        <div id="windpressbreakdance-settings-button" class="breakdance-toolbar-icon-button">
            <div class="breakdance-icon" style="width: 18px; height: 18px;">
                ${c}
            </div>
        </div>
    </div>
`), { getVirtualRef: t } = s({}, { persist: "windpress.ui.state" }), i = document.querySelector(m);
i.parentNode.insertBefore(u, i.previousElementSibling);
const o = document.querySelector("#windpressbreakdance-settings-button"), n = (_a = d) == null ? void 0 : _a.contentDocument.querySelector("#windpress-iframe");
function b() {
  const e = t("window.minimized", false).value;
  t("window.minimized", false).value = !e;
}
function a(e) {
  e ? o.classList.add("breakdance-toolbar-icon-button-active") : o.classList.remove("breakdance-toolbar-icon-button-active"), n && (n.style.display = e ? "block" : "none");
}
o.addEventListener("click", (e) => {
  b();
});
l(() => t("window.minimized", false).value, (e) => {
  a(!e);
});
a(!t("window.minimized", false).value);
r("Module loaded!", { module: "settings" });

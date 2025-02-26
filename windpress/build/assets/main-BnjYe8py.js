import { c as i } from "./virtual-Cakm3k_V.js";
import { l as s } from "./logger-BTW-zIW3.js";
import { L as r } from "./windpress-a09-ZfRP.js";
import "./index-Dgh2qPwk.js";
import "./isObject-CRxghtyK.js";
import "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./set-DvizEivO.js";
const a = "#oxygen-topbar .oxygen-toolbar-menus:has(.oxygen-dom-tree-button)", l = document.createRange().createContextualFragment(`
    <div class="windpressoxygen-settings-button">
        ${r}
    </div>
`), { getVirtualRef: o } = i({}, { persist: "windpress.ui.state" }), n = document.querySelector(a);
n.insertBefore(l, n.firstChild);
window.tippy(".windpressoxygen-settings-button", { content: "WindPress \u2014 Oxygen settings", animation: "shift-toward", placement: "bottom" });
const e = document.querySelector(".windpressoxygen-settings-button");
function c() {
  const t = o("window.minimized", false).value;
  o("window.minimized", false).value = !t, t ? e.classList.add("active") : e.classList.remove("active");
}
e.addEventListener("click", (t) => {
  c();
});
s("Module loaded!", { module: "settings" });

import { c as s } from "./virtual-Cakm3k_V.js";
import { l as n } from "./logger-BTW-zIW3.js";
import { L as o } from "./windpress-a09-ZfRP.js";
import "./index-Dgh2qPwk.js";
import "./isObject-CRxghtyK.js";
import "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./set-DvizEivO.js";
const a = document.createRange().createContextualFragment(`
    <button id="windpressbuilderius-settings-navbar" data-tooltip-content="WindPress \u2014 Builderius settings" data-tooltip-place="bottom" class="uniPanelButton">
        <span class="">
            ${o}
        </span>
    </button>
`), { getVirtualRef: i } = s({}, { persist: "windpress.ui.state" }), r = document.querySelector(".uniTopPanel__rightCol");
r.prepend(a);
const e = document.querySelector("#windpressbuilderius-settings-navbar");
function l() {
  const t = i("window.minimized", false).value;
  i("window.minimized", false).value = !t, t ? e.classList.add("active") : e.classList.remove("active");
}
e.addEventListener("click", (t) => {
  l();
});
n("Module loaded!", { module: "settings" });

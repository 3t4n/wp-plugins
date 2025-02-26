var _a;
import { l as d, c as m } from "../../../../intellisense-Nf6mwf2_.js";
import { d as p } from "../../../../vfs-DmzitRvm.js";
import { s as t } from "../../../../set-DvizEivO.js";
import "../../../../module-oN1JnOJ9.js";
import "../../../../preload-helper-DH9yCMdR.js";
import "../../../../index-BAMY2Nnw.js";
import "../../../../stylesheet-B98yp78w.js";
import "../../../../index-xtxc-82G.js";
import "../../../../isObject-CRxghtyK.js";
const c = document.querySelector('script#windpress\\:vfs[type="text/plain"]');
async function i(s) {
  let n = s.split(/\s+/).filter((e) => e !== "" && e !== "|");
  const r = p(c.textContent), a = await d({ volume: r });
  let o = await m(a, n);
  return Array.isArray(o) ? o.join(" ") : o;
}
((_a = window.wp) == null ? void 0 : _a.hooks) && window.wp.hooks.addFilter("windpress.module.classname-to-css", "windpress", i);
t(window, "windpress.loaded.module.classnameToCss", true);
t(window, "windpress.module.classnameToCss.generate", async (s) => i(s));

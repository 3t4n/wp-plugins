var _a;
import { l as a, s as d } from "../../../../intellisense-Nf6mwf2_.js";
import { d as p } from "../../../../vfs-DmzitRvm.js";
import { s as t } from "../../../../set-DvizEivO.js";
import "../../../../module-oN1JnOJ9.js";
import "../../../../preload-helper-DH9yCMdR.js";
import "../../../../index-BAMY2Nnw.js";
import "../../../../stylesheet-B98yp78w.js";
import "../../../../index-xtxc-82G.js";
import "../../../../isObject-CRxghtyK.js";
const l = document.querySelector('script#windpress\\:vfs[type="text/plain"]');
async function e(s) {
  let r = s.split(/\s+/).filter((o) => o !== "" && o !== "|");
  const i = p(l.textContent), n = await a({ volume: i });
  return (await d(n, r)).join(" ");
}
((_a = window.wp) == null ? void 0 : _a.hooks) && window.wp.hooks.addFilter("windpress.module.class-sorter", "windpress", e);
t(window, "windpress.loaded.module.classSorter", true);
t(window, "windpress.module.classSorter.sort", async (s) => e(s));

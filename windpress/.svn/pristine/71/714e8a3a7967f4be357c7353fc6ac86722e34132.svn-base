import { $ as c, l } from "./module-oN1JnOJ9.js";
import { i as d, l as m, t as u } from "./index-CcO2jMy2.js";
import { l as f } from "./stylesheet-B98yp78w.js";
const t = { Nesting: 1, DirSelector: 4, LogicalProperties: 524288, LightDark: 1048576 };
async function h({ candidates: r = [], entrypoint: a = "/main.css", volume: o = {}, ...e } = {}) {
  return (await g({ candidates: r, entrypoint: a, volume: o, ...e })).build(r);
}
async function g({ candidates: r = [], entrypoint: a = "/main.css", volume: o = {}, ...e } = {}) {
  return e = { candidates: r, entrypoint: a, volume: o, ...e }, await c(e.volume[e.entrypoint], { loadModule: async (i, s, n) => l(i, s, n, e.volume), loadStylesheet: async (i, s) => f(i, s, e.volume) });
}
async function S(r, a = false) {
  await d(m);
  const o = u({ filename: "main.css", code: new TextEncoder().encode(r), minify: a, sourceMap: false, drafts: { customMedia: true }, nonStandard: { deepSelectorCombinator: true }, include: t.Nesting, exclude: t.LogicalProperties | t.DirSelector | t.LightDark, targets: { safari: 16 << 16 | 1024, ios_saf: 16 << 16 | 1024, firefox: 8388608, chrome: 7274496 }, errorRecovery: true });
  return { code: o.code, css: new TextDecoder().decode(o.code), warnings: o.warnings };
}
export {
  h as b,
  g as c,
  S as o
};

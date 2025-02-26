import { a as o } from "./index-Dgh2qPwk.js";
import { j as m, k as d, s as g } from "./set-DvizEivO.js";
import { r as c, at as v } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
function R(e, n) {
  n = m(n, e);
  for (var r = 0, s = n.length; e != null && r < s; ) e = e[d(n[r++])];
  return r && r == s ? e : void 0;
}
function x(e, n, r) {
  var s = e == null ? void 0 : R(e, n);
  return s === void 0 ? r : s;
}
function y(e, n) {
  const r = (n == null ? void 0 : n.persist) ? o(n.persist, e) : c(e), s = {};
  function u(t, f) {
    return s[t] || (s[t] = v((a, i) => ({ get() {
      return a(), x(r.value, t, f);
    }, set(l) {
      g(r.value, t, l), i();
    } }))), s[t];
  }
  return { state: r, getVirtualRef: u };
}
export {
  y as c,
  x as g
};

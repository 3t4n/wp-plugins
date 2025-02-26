const n = globalThis || void 0 || self;
var s = typeof n == "object" && n && n.Object === Object && n, l = typeof self == "object" && self && self.Object === Object && self, g = s || l || Function("return this")(), o = g.Symbol, a = Object.prototype, j = a.hasOwnProperty, y = a.toString, e = o ? o.toStringTag : void 0;
function u(t) {
  var r = j.call(t, e), c = t[e];
  try {
    t[e] = void 0;
    var b = true;
  } catch {
  }
  var f = y.call(t);
  return b && (r ? t[e] = c : delete t[e]), f;
}
var S = Object.prototype, T = S.toString;
function d(t) {
  return T.call(t);
}
var O = "[object Null]", p = "[object Undefined]", i = o ? o.toStringTag : void 0;
function m(t) {
  return t == null ? t === void 0 ? p : O : i && i in Object(t) ? u(t) : d(t);
}
function v(t) {
  return t != null && typeof t == "object";
}
var h = "[object Symbol]";
function P(t) {
  return typeof t == "symbol" || v(t) && m(t) == h;
}
function $(t) {
  var r = typeof t;
  return t != null && (r == "object" || r == "function");
}
export {
  o as S,
  $ as a,
  m as b,
  P as c,
  s as f,
  n as g,
  v as i,
  g as r
};

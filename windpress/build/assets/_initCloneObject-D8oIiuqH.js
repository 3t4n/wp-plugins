import { h as M, f as z, i as C, L as p, M as L, b as S } from "./set-DvizEivO.js";
import { a as F, i as b, b as O, r as d, f as G } from "./isObject-CRxghtyK.js";
var y = Object.create, R = /* @__PURE__ */ function() {
  function e() {
  }
  return function(t) {
    if (!F(t)) return {};
    if (y) return y(t);
    e.prototype = t;
    var r = new e();
    return e.prototype = void 0, r;
  };
}(), k = 9007199254740991;
function E(e) {
  return typeof e == "number" && e > -1 && e % 1 == 0 && e <= k;
}
function ke(e) {
  return e != null && E(e.length) && !M(e);
}
var D = Object.prototype;
function q(e) {
  var t = e && e.constructor, r = typeof t == "function" && t.prototype || D;
  return e === r;
}
function N(e, t) {
  for (var r = -1, a = Array(e); ++r < e; ) a[r] = t(r);
  return a;
}
var V = "[object Arguments]";
function j(e) {
  return b(e) && O(e) == V;
}
var I = Object.prototype, H = I.hasOwnProperty, K = I.propertyIsEnumerable, W = j(/* @__PURE__ */ function() {
  return arguments;
}()) ? j : function(e) {
  return b(e) && H.call(e, "callee") && !K.call(e, "callee");
};
function X() {
  return false;
}
var B = typeof exports == "object" && exports && !exports.nodeType && exports, h = B && typeof module == "object" && module && !module.nodeType && module, Y = h && h.exports === B, T = Y ? d.Buffer : void 0, Z = T ? T.isBuffer : void 0, J = Z || X, Q = "[object Arguments]", ee = "[object Array]", te = "[object Boolean]", re = "[object Date]", oe = "[object Error]", ae = "[object Function]", ne = "[object Map]", se = "[object Number]", ie = "[object Object]", ce = "[object RegExp]", ue = "[object Set]", fe = "[object String]", pe = "[object WeakMap]", be = "[object ArrayBuffer]", de = "[object DataView]", ge = "[object Float32Array]", le = "[object Float64Array]", ye = "[object Int8Array]", je = "[object Int16Array]", he = "[object Int32Array]", Te = "[object Uint8Array]", _e = "[object Uint8ClampedArray]", me = "[object Uint16Array]", Ae = "[object Uint32Array]", o = {};
o[ge] = o[le] = o[ye] = o[je] = o[he] = o[Te] = o[_e] = o[me] = o[Ae] = true;
o[Q] = o[ee] = o[be] = o[te] = o[de] = o[re] = o[oe] = o[ae] = o[ne] = o[se] = o[ie] = o[ce] = o[ue] = o[fe] = o[pe] = false;
function ve(e) {
  return b(e) && E(e.length) && !!o[O(e)];
}
function xe(e) {
  return function(t) {
    return e(t);
  };
}
var P = typeof exports == "object" && exports && !exports.nodeType && exports, s = P && typeof module == "object" && module && !module.nodeType && module, we = s && s.exports === P, f = we && G.process, _ = function() {
  try {
    var e = s && s.require && s.require("util").types;
    return e || f && f.binding && f.binding("util");
  } catch {
  }
}(), m = _ && _.isTypedArray, Oe = m ? xe(m) : ve, Ee = Object.prototype, Ie = Ee.hasOwnProperty;
function De(e, t) {
  var r = C(e), a = !r && W(e), c = !r && !a && J(e), g = !r && !a && !c && Oe(e), l = r || a || c || g, u = l ? N(e.length, String) : [], $ = u.length;
  for (var n in e) (t || Ie.call(e, n)) && !(l && (n == "length" || c && (n == "offset" || n == "parent") || g && (n == "buffer" || n == "byteLength" || n == "byteOffset") || z(n, $))) && u.push(n);
  return u;
}
function Be(e, t) {
  return function(r) {
    return e(t(r));
  };
}
var Pe = Be(Object.getPrototypeOf, Object);
function Ue() {
  this.__data__ = new p(), this.size = 0;
}
function $e(e) {
  var t = this.__data__, r = t.delete(e);
  return this.size = t.size, r;
}
function Me(e) {
  return this.__data__.get(e);
}
function ze(e) {
  return this.__data__.has(e);
}
var Ce = 200;
function Le(e, t) {
  var r = this.__data__;
  if (r instanceof p) {
    var a = r.__data__;
    if (!L || a.length < Ce - 1) return a.push([e, t]), this.size = ++r.size, this;
    r = this.__data__ = new S(a);
  }
  return r.set(e, t), this.size = r.size, this;
}
function i(e) {
  var t = this.__data__ = new p(e);
  this.size = t.size;
}
i.prototype.clear = Ue;
i.prototype.delete = $e;
i.prototype.get = Me;
i.prototype.has = ze;
i.prototype.set = Le;
var U = typeof exports == "object" && exports && !exports.nodeType && exports, A = U && typeof module == "object" && module && !module.nodeType && module, Se = A && A.exports === U, v = Se ? d.Buffer : void 0, x = v ? v.allocUnsafe : void 0;
function qe(e, t) {
  if (t) return e.slice();
  var r = e.length, a = x ? x(r) : new e.constructor(r);
  return e.copy(a), a;
}
var w = d.Uint8Array;
function Fe(e) {
  var t = new e.constructor(e.byteLength);
  return new w(t).set(new w(e)), t;
}
function Ne(e, t) {
  var r = t ? Fe(e.buffer) : e.buffer;
  return new e.constructor(r, e.byteOffset, e.length);
}
function Ve(e) {
  return typeof e.constructor == "function" && !q(e) ? R(Pe(e)) : {};
}
export {
  i as S,
  w as U,
  De as a,
  ke as b,
  Fe as c,
  Ne as d,
  xe as e,
  J as f,
  qe as g,
  Ve as h,
  q as i,
  Oe as j,
  Pe as k,
  W as l,
  _ as n,
  Be as o
};

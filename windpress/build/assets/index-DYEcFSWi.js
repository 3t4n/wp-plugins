import { a as Zn, c as Ve, g as Va, r as af } from "./module-oN1JnOJ9.js";
import { p as Oe } from "./index-BAMY2Nnw.js";
const sf = {}, ff = Object.freeze(Object.defineProperty({ __proto__: null, default: sf }, Symbol.toStringTag, { value: "Module" })), uf = Zn(ff);
var mt = { exports: {} };
/*! https://mths.be/punycode v1.4.1 by @mathias */
var lf = mt.exports, yi;
function cf() {
  return yi || (yi = 1, function(e, a) {
    (function(t) {
      var s = a && !a.nodeType && a, h = e && !e.nodeType && e, c = typeof Ve == "object" && Ve;
      (c.global === c || c.window === c || c.self === c) && (t = c);
      var b, d = 2147483647, v = 36, g = 1, R = 26, L = 38, I = 700, A = 72, T = 128, j = "-", O = /^xn--/, y = /[^\x20-\x7E]/, o = /[\x2E\u3002\uFF0E\uFF61]/g, n = { overflow: "Overflow: input needs wider integers to process", "not-basic": "Illegal input >= 0x80 (not a basic code point)", "invalid-input": "Invalid input" }, p = v - g, w = Math.floor, F = String.fromCharCode, q;
      function V(J) {
        throw new RangeError(n[J]);
      }
      function K(J, oe) {
        for (var ne = J.length, W = []; ne--; ) W[ne] = oe(J[ne]);
        return W;
      }
      function ee(J, oe) {
        var ne = J.split("@"), W = "";
        ne.length > 1 && (W = ne[0] + "@", J = ne[1]), J = J.replace(o, ".");
        var P = J.split("."), M = K(P, oe).join(".");
        return W + M;
      }
      function ue(J) {
        for (var oe = [], ne = 0, W = J.length, P, M; ne < W; ) P = J.charCodeAt(ne++), P >= 55296 && P <= 56319 && ne < W ? (M = J.charCodeAt(ne++), (M & 64512) == 56320 ? oe.push(((P & 1023) << 10) + (M & 1023) + 65536) : (oe.push(P), ne--)) : oe.push(P);
        return oe;
      }
      function k(J) {
        return K(J, function(oe) {
          var ne = "";
          return oe > 65535 && (oe -= 65536, ne += F(oe >>> 10 & 1023 | 55296), oe = 56320 | oe & 1023), ne += F(oe), ne;
        }).join("");
      }
      function de(J) {
        return J - 48 < 10 ? J - 22 : J - 65 < 26 ? J - 65 : J - 97 < 26 ? J - 97 : v;
      }
      function be(J, oe) {
        return J + 22 + 75 * (J < 26) - ((oe != 0) << 5);
      }
      function Ee(J, oe, ne) {
        var W = 0;
        for (J = ne ? w(J / I) : J >> 1, J += w(J / oe); J > p * R >> 1; W += v) J = w(J / p);
        return w(W + (p + 1) * J / (J + L));
      }
      function _e(J) {
        var oe = [], ne = J.length, W, P = 0, M = T, _ = A, D, $, B, x, m, S, Y, ie, ge;
        for (D = J.lastIndexOf(j), D < 0 && (D = 0), $ = 0; $ < D; ++$) J.charCodeAt($) >= 128 && V("not-basic"), oe.push(J.charCodeAt($));
        for (B = D > 0 ? D + 1 : 0; B < ne; ) {
          for (x = P, m = 1, S = v; B >= ne && V("invalid-input"), Y = de(J.charCodeAt(B++)), (Y >= v || Y > w((d - P) / m)) && V("overflow"), P += Y * m, ie = S <= _ ? g : S >= _ + R ? R : S - _, !(Y < ie); S += v) ge = v - ie, m > w(d / ge) && V("overflow"), m *= ge;
          W = oe.length + 1, _ = Ee(P - x, W, x == 0), w(P / W) > d - M && V("overflow"), M += w(P / W), P %= W, oe.splice(P++, 0, M);
        }
        return k(oe);
      }
      function Fe(J) {
        var oe, ne, W, P, M, _, D, $, B, x, m, S = [], Y, ie, ge, ce;
        for (J = ue(J), Y = J.length, oe = T, ne = 0, M = A, _ = 0; _ < Y; ++_) m = J[_], m < 128 && S.push(F(m));
        for (W = P = S.length, P && S.push(j); W < Y; ) {
          for (D = d, _ = 0; _ < Y; ++_) m = J[_], m >= oe && m < D && (D = m);
          for (ie = W + 1, D - oe > w((d - ne) / ie) && V("overflow"), ne += (D - oe) * ie, oe = D, _ = 0; _ < Y; ++_) if (m = J[_], m < oe && ++ne > d && V("overflow"), m == oe) {
            for ($ = ne, B = v; x = B <= M ? g : B >= M + R ? R : B - M, !($ < x); B += v) ce = $ - x, ge = v - x, S.push(F(be(x + ce % ge, 0))), $ = w(ce / ge);
            S.push(F(be($, 0))), M = Ee(ne, ie, W == P), ne = 0, ++W;
          }
          ++ne, ++oe;
        }
        return S.join("");
      }
      function ye(J) {
        return ee(J, function(oe) {
          return O.test(oe) ? _e(oe.slice(4).toLowerCase()) : oe;
        });
      }
      function re(J) {
        return ee(J, function(oe) {
          return y.test(oe) ? "xn--" + Fe(oe) : oe;
        });
      }
      if (b = { version: "1.4.1", ucs2: { decode: ue, encode: k }, decode: _e, encode: Fe, toASCII: re, toUnicode: ye }, s && h) if (e.exports == s) h.exports = b;
      else for (q in b) b.hasOwnProperty(q) && (s[q] = b[q]);
      else t.punycode = b;
    })(lf);
  }(mt, mt.exports)), mt.exports;
}
var hf = cf();
const df = Va(hf);
var Vt, gi;
function ze() {
  return gi || (gi = 1, Vt = TypeError), Vt;
}
var Ht, mi;
function Ct() {
  if (mi) return Ht;
  mi = 1;
  var e = typeof Map == "function" && Map.prototype, a = Object.getOwnPropertyDescriptor && e ? Object.getOwnPropertyDescriptor(Map.prototype, "size") : null, t = e && a && typeof a.get == "function" ? a.get : null, s = e && Map.prototype.forEach, h = typeof Set == "function" && Set.prototype, c = Object.getOwnPropertyDescriptor && h ? Object.getOwnPropertyDescriptor(Set.prototype, "size") : null, b = h && c && typeof c.get == "function" ? c.get : null, d = h && Set.prototype.forEach, v = typeof WeakMap == "function" && WeakMap.prototype, g = v ? WeakMap.prototype.has : null, R = typeof WeakSet == "function" && WeakSet.prototype, L = R ? WeakSet.prototype.has : null, I = typeof WeakRef == "function" && WeakRef.prototype, A = I ? WeakRef.prototype.deref : null, T = Boolean.prototype.valueOf, j = Object.prototype.toString, O = Function.prototype.toString, y = String.prototype.match, o = String.prototype.slice, n = String.prototype.replace, p = String.prototype.toUpperCase, w = String.prototype.toLowerCase, F = RegExp.prototype.test, q = Array.prototype.concat, V = Array.prototype.join, K = Array.prototype.slice, ee = Math.floor, ue = typeof BigInt == "function" ? BigInt.prototype.valueOf : null, k = Object.getOwnPropertySymbols, de = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? Symbol.prototype.toString : null, be = typeof Symbol == "function" && typeof Symbol.iterator == "object", Ee = typeof Symbol == "function" && Symbol.toStringTag && (typeof Symbol.toStringTag === be || true) ? Symbol.toStringTag : null, _e = Object.prototype.propertyIsEnumerable, Fe = (typeof Reflect == "function" ? Reflect.getPrototypeOf : Object.getPrototypeOf) || ([].__proto__ === Array.prototype ? function(r) {
    return r.__proto__;
  } : null);
  function ye(r, l) {
    if (r === 1 / 0 || r === -1 / 0 || r !== r || r && r > -1e3 && r < 1e3 || F.call(/e/, l)) return l;
    var N = /[0-9](?=(?:[0-9]{3})+(?![0-9]))/g;
    if (typeof r == "number") {
      var U = r < 0 ? -ee(-r) : ee(r);
      if (U !== r) {
        var z = String(U), Q = o.call(l, z.length + 1);
        return n.call(z, N, "$&_") + "." + n.call(n.call(Q, /([0-9]{3})/g, "$&_"), /_$/, "");
      }
    }
    return n.call(l, N, "$&_");
  }
  var re = uf, J = re.custom, oe = ie(J) ? J : null, ne = { __proto__: null, double: '"', single: "'" }, W = { __proto__: null, double: /(["\\])/g, single: /(['\\])/g };
  Ht = function r(l, N, U, z) {
    var Q = N || {};
    if (me(Q, "quoteStyle") && !me(ne, Q.quoteStyle)) throw new TypeError('option "quoteStyle" must be "single" or "double"');
    if (me(Q, "maxStringLength") && (typeof Q.maxStringLength == "number" ? Q.maxStringLength < 0 && Q.maxStringLength !== 1 / 0 : Q.maxStringLength !== null)) throw new TypeError('option "maxStringLength", if provided, must be a positive integer, Infinity, or `null`');
    var se = me(Q, "customInspect") ? Q.customInspect : true;
    if (typeof se != "boolean" && se !== "symbol") throw new TypeError("option \"customInspect\", if provided, must be `true`, `false`, or `'symbol'`");
    if (me(Q, "indent") && Q.indent !== null && Q.indent !== "	" && !(parseInt(Q.indent, 10) === Q.indent && Q.indent > 0)) throw new TypeError('option "indent" must be "\\t", an integer > 0, or `null`');
    if (me(Q, "numericSeparator") && typeof Q.numericSeparator != "boolean") throw new TypeError('option "numericSeparator", if provided, must be `true` or `false`');
    var le = Q.numericSeparator;
    if (typeof l > "u") return "undefined";
    if (l === null) return "null";
    if (typeof l == "boolean") return l ? "true" : "false";
    if (typeof l == "string") return ve(l, Q);
    if (typeof l == "number") {
      if (l === 0) return 1 / 0 / l > 0 ? "0" : "-0";
      var Re = String(l);
      return le ? ye(l, Re) : Re;
    }
    if (typeof l == "bigint") {
      var Ce = String(l) + "n";
      return le ? ye(l, Ce) : Ce;
    }
    var Ue = typeof Q.depth > "u" ? 5 : Q.depth;
    if (typeof U > "u" && (U = 0), U >= Ue && Ue > 0 && typeof l == "object") return D(l) ? "[Array]" : "[Object]";
    var $e = ke(Q, U);
    if (typeof z > "u") z = [];
    else if (Le(z, l) >= 0) return "[Circular]";
    function E(et, Ot, of) {
      if (Ot && (z = K.call(z), z.push(Ot)), of) {
        var pi = { depth: Q.depth };
        return me(Q, "quoteStyle") && (pi.quoteStyle = Q.quoteStyle), r(et, pi, U + 1, z);
      }
      return r(et, Q, U + 1, z);
    }
    if (typeof l == "function" && !B(l)) {
      var i = te(l), f = u(l, E);
      return "[Function" + (i ? ": " + i : " (anonymous)") + "]" + (f.length > 0 ? " { " + V.call(f, ", ") + " }" : "");
    }
    if (ie(l)) {
      var C = be ? n.call(String(l), /^(Symbol\(.*\))_[^)]*$/, "$1") : de.call(l);
      return typeof l == "object" && !be ? Se(C) : C;
    }
    if (he(l)) {
      for (var G = "<" + w.call(String(l.nodeName)), Z = l.attributes || [], ae = 0; ae < Z.length; ae++) G += " " + Z[ae].name + "=" + P(M(Z[ae].value), "double", Q);
      return G += ">", l.childNodes && l.childNodes.length && (G += "..."), G += "</" + w.call(String(l.nodeName)) + ">", G;
    }
    if (D(l)) {
      if (l.length === 0) return "[]";
      var Pe = u(l, E);
      return $e && !Te(Pe) ? "[" + fe(Pe, $e) + "]" : "[ " + V.call(Pe, ", ") + " ]";
    }
    if (x(l)) {
      var qe = u(l, E);
      return !("cause" in Error.prototype) && "cause" in l && !_e.call(l, "cause") ? "{ [" + String(l) + "] " + V.call(q.call("[cause]: " + E(l.cause), qe), ", ") + " }" : qe.length === 0 ? "[" + String(l) + "]" : "{ [" + String(l) + "] " + V.call(qe, ", ") + " }";
    }
    if (typeof l == "object" && se) {
      if (oe && typeof l[oe] == "function" && re) return re(l, { depth: Ue - U });
      if (se !== "symbol" && typeof l.inspect == "function") return l.inspect();
    }
    if (De(l)) {
      var je = [];
      return s && s.call(l, function(et, Ot) {
        je.push(E(Ot, l, true) + " => " + E(et, l));
      }), Be("Map", t.call(l), je, $e);
    }
    if (H(l)) {
      var xe = [];
      return d && d.call(l, function(et) {
        xe.push(E(et, l));
      }), Be("Set", b.call(l), xe, $e);
    }
    if (Ae(l)) return we("WeakMap");
    if (X(l)) return we("WeakSet");
    if (Ne(l)) return we("WeakRef");
    if (S(l)) return Se(E(Number(l)));
    if (ge(l)) return Se(E(ue.call(l)));
    if (Y(l)) return Se(T.call(l));
    if (m(l)) return Se(E(String(l)));
    if (typeof window < "u" && l === window) return "{ [object Window] }";
    if (typeof globalThis < "u" && l === globalThis || typeof Ve < "u" && l === Ve) return "{ [object globalThis] }";
    if (!$(l) && !B(l)) {
      var Me = u(l, E), hi = Fe ? Fe(l) === Object.prototype : l instanceof Object || l.constructor === Object, $t = l instanceof Object ? "" : "null prototype", di = !hi && Ee && Object(l) === l && Ee in l ? o.call(Ie(l), 8, -1) : $t ? "Object" : "", nf = hi || typeof l.constructor != "function" ? "" : l.constructor.name ? l.constructor.name + " " : "", Wt = nf + (di || $t ? "[" + V.call(q.call([], di || [], $t || []), ": ") + "] " : "");
      return Me.length === 0 ? Wt + "{}" : $e ? Wt + "{" + fe(Me, $e) + "}" : Wt + "{ " + V.call(Me, ", ") + " }";
    }
    return String(l);
  };
  function P(r, l, N) {
    var U = N.quoteStyle || l, z = ne[U];
    return z + r + z;
  }
  function M(r) {
    return n.call(String(r), /"/g, "&quot;");
  }
  function _(r) {
    return !Ee || !(typeof r == "object" && (Ee in r || typeof r[Ee] < "u"));
  }
  function D(r) {
    return Ie(r) === "[object Array]" && _(r);
  }
  function $(r) {
    return Ie(r) === "[object Date]" && _(r);
  }
  function B(r) {
    return Ie(r) === "[object RegExp]" && _(r);
  }
  function x(r) {
    return Ie(r) === "[object Error]" && _(r);
  }
  function m(r) {
    return Ie(r) === "[object String]" && _(r);
  }
  function S(r) {
    return Ie(r) === "[object Number]" && _(r);
  }
  function Y(r) {
    return Ie(r) === "[object Boolean]" && _(r);
  }
  function ie(r) {
    if (be) return r && typeof r == "object" && r instanceof Symbol;
    if (typeof r == "symbol") return true;
    if (!r || typeof r != "object" || !de) return false;
    try {
      return de.call(r), true;
    } catch {
    }
    return false;
  }
  function ge(r) {
    if (!r || typeof r != "object" || !ue) return false;
    try {
      return ue.call(r), true;
    } catch {
    }
    return false;
  }
  var ce = Object.prototype.hasOwnProperty || function(r) {
    return r in this;
  };
  function me(r, l) {
    return ce.call(r, l);
  }
  function Ie(r) {
    return j.call(r);
  }
  function te(r) {
    if (r.name) return r.name;
    var l = y.call(O.call(r), /^function\s*([\w$]+)/);
    return l ? l[1] : null;
  }
  function Le(r, l) {
    if (r.indexOf) return r.indexOf(l);
    for (var N = 0, U = r.length; N < U; N++) if (r[N] === l) return N;
    return -1;
  }
  function De(r) {
    if (!t || !r || typeof r != "object") return false;
    try {
      t.call(r);
      try {
        b.call(r);
      } catch {
        return true;
      }
      return r instanceof Map;
    } catch {
    }
    return false;
  }
  function Ae(r) {
    if (!g || !r || typeof r != "object") return false;
    try {
      g.call(r, g);
      try {
        L.call(r, L);
      } catch {
        return true;
      }
      return r instanceof WeakMap;
    } catch {
    }
    return false;
  }
  function Ne(r) {
    if (!A || !r || typeof r != "object") return false;
    try {
      return A.call(r), true;
    } catch {
    }
    return false;
  }
  function H(r) {
    if (!b || !r || typeof r != "object") return false;
    try {
      b.call(r);
      try {
        t.call(r);
      } catch {
        return true;
      }
      return r instanceof Set;
    } catch {
    }
    return false;
  }
  function X(r) {
    if (!L || !r || typeof r != "object") return false;
    try {
      L.call(r, L);
      try {
        g.call(r, g);
      } catch {
        return true;
      }
      return r instanceof WeakSet;
    } catch {
    }
    return false;
  }
  function he(r) {
    return !r || typeof r != "object" ? false : typeof HTMLElement < "u" && r instanceof HTMLElement ? true : typeof r.nodeName == "string" && typeof r.getAttribute == "function";
  }
  function ve(r, l) {
    if (r.length > l.maxStringLength) {
      var N = r.length - l.maxStringLength, U = "... " + N + " more character" + (N > 1 ? "s" : "");
      return ve(o.call(r, 0, l.maxStringLength), l) + U;
    }
    var z = W[l.quoteStyle || "single"];
    z.lastIndex = 0;
    var Q = n.call(n.call(r, z, "\\$1"), /[\x00-\x1f]/g, pe);
    return P(Q, "single", l);
  }
  function pe(r) {
    var l = r.charCodeAt(0), N = { 8: "b", 9: "t", 10: "n", 12: "f", 13: "r" }[l];
    return N ? "\\" + N : "\\x" + (l < 16 ? "0" : "") + p.call(l.toString(16));
  }
  function Se(r) {
    return "Object(" + r + ")";
  }
  function we(r) {
    return r + " { ? }";
  }
  function Be(r, l, N, U) {
    var z = U ? fe(N, U) : V.call(N, ", ");
    return r + " (" + l + ") {" + z + "}";
  }
  function Te(r) {
    for (var l = 0; l < r.length; l++) if (Le(r[l], `
`) >= 0) return false;
    return true;
  }
  function ke(r, l) {
    var N;
    if (r.indent === "	") N = "	";
    else if (typeof r.indent == "number" && r.indent > 0) N = V.call(Array(r.indent + 1), " ");
    else return null;
    return { base: N, prev: V.call(Array(l + 1), N) };
  }
  function fe(r, l) {
    if (r.length === 0) return "";
    var N = `
` + l.prev + l.base;
    return N + V.call(r, "," + N) + `
` + l.prev;
  }
  function u(r, l) {
    var N = D(r), U = [];
    if (N) {
      U.length = r.length;
      for (var z = 0; z < r.length; z++) U[z] = me(r, z) ? l(r[z], r) : "";
    }
    var Q = typeof k == "function" ? k(r) : [], se;
    if (be) {
      se = {};
      for (var le = 0; le < Q.length; le++) se["$" + Q[le]] = Q[le];
    }
    for (var Re in r) me(r, Re) && (N && String(Number(Re)) === Re && Re < r.length || be && se["$" + Re] instanceof Symbol || (F.call(/[^\w$]/, Re) ? U.push(l(Re, r) + ": " + l(r[Re], r)) : U.push(Re + ": " + l(r[Re], r))));
    if (typeof k == "function") for (var Ce = 0; Ce < Q.length; Ce++) _e.call(r, Q[Ce]) && U.push("[" + l(Q[Ce]) + "]: " + l(r[Q[Ce]], r));
    return U;
  }
  return Ht;
}
var Gt, vi;
function pf() {
  if (vi) return Gt;
  vi = 1;
  var e = Ct(), a = ze(), t = function(d, v, g) {
    for (var R = d, L; (L = R.next) != null; R = L) if (L.key === v) return R.next = L.next, g || (L.next = d.next, d.next = L), L;
  }, s = function(d, v) {
    if (d) {
      var g = t(d, v);
      return g && g.value;
    }
  }, h = function(d, v, g) {
    var R = t(d, v);
    R ? R.value = g : d.next = { key: v, next: d.next, value: g };
  }, c = function(d, v) {
    return d ? !!t(d, v) : false;
  }, b = function(d, v) {
    if (d) return t(d, v, true);
  };
  return Gt = function() {
    var v, g = { assert: function(R) {
      if (!g.has(R)) throw new a("Side channel does not contain " + e(R));
    }, delete: function(R) {
      var L = v && v.next, I = b(v, R);
      return I && L && L === I && (v = void 0), !!I;
    }, get: function(R) {
      return s(v, R);
    }, has: function(R) {
      return c(v, R);
    }, set: function(R, L) {
      v || (v = { next: void 0 }), h(v, R, L);
    } };
    return g;
  }, Gt;
}
var Yt, bi;
function ei() {
  return bi || (bi = 1, Yt = Object), Yt;
}
var zt, wi;
function yf() {
  return wi || (wi = 1, zt = Error), zt;
}
var Kt, Ei;
function gf() {
  return Ei || (Ei = 1, Kt = EvalError), Kt;
}
var Jt, _i;
function mf() {
  return _i || (_i = 1, Jt = RangeError), Jt;
}
var Xt, Si;
function vf() {
  return Si || (Si = 1, Xt = ReferenceError), Xt;
}
var Qt, Ri;
function Ha() {
  return Ri || (Ri = 1, Qt = SyntaxError), Qt;
}
var Zt, Oi;
function bf() {
  return Oi || (Oi = 1, Zt = URIError), Zt;
}
var er, Ti;
function wf() {
  return Ti || (Ti = 1, er = Math.abs), er;
}
var tr, Ai;
function Ef() {
  return Ai || (Ai = 1, tr = Math.floor), tr;
}
var rr, Ii;
function _f() {
  return Ii || (Ii = 1, rr = Math.max), rr;
}
var nr, Fi;
function Sf() {
  return Fi || (Fi = 1, nr = Math.min), nr;
}
var ir, Pi;
function Rf() {
  return Pi || (Pi = 1, ir = Math.pow), ir;
}
var or, Ni;
function Of() {
  return Ni || (Ni = 1, or = Math.round), or;
}
var ar, Bi;
function Tf() {
  return Bi || (Bi = 1, ar = Number.isNaN || function(a) {
    return a !== a;
  }), ar;
}
var sr, Di;
function Af() {
  if (Di) return sr;
  Di = 1;
  var e = Tf();
  return sr = function(t) {
    return e(t) || t === 0 ? t : t < 0 ? -1 : 1;
  }, sr;
}
var fr, Li;
function If() {
  return Li || (Li = 1, fr = Object.getOwnPropertyDescriptor), fr;
}
var ur, Ci;
function at() {
  if (Ci) return ur;
  Ci = 1;
  var e = If();
  if (e) try {
    e([], "length");
  } catch {
    e = null;
  }
  return ur = e, ur;
}
var lr, Mi;
function Mt() {
  if (Mi) return lr;
  Mi = 1;
  var e = Object.defineProperty || false;
  if (e) try {
    e({}, "a", { value: 1 });
  } catch {
    e = false;
  }
  return lr = e, lr;
}
var cr, ji;
function ti() {
  return ji || (ji = 1, cr = function() {
    if (typeof Symbol != "function" || typeof Object.getOwnPropertySymbols != "function") return false;
    if (typeof Symbol.iterator == "symbol") return true;
    var a = {}, t = Symbol("test"), s = Object(t);
    if (typeof t == "string" || Object.prototype.toString.call(t) !== "[object Symbol]" || Object.prototype.toString.call(s) !== "[object Symbol]") return false;
    var h = 42;
    a[t] = h;
    for (var c in a) return false;
    if (typeof Object.keys == "function" && Object.keys(a).length !== 0 || typeof Object.getOwnPropertyNames == "function" && Object.getOwnPropertyNames(a).length !== 0) return false;
    var b = Object.getOwnPropertySymbols(a);
    if (b.length !== 1 || b[0] !== t || !Object.prototype.propertyIsEnumerable.call(a, t)) return false;
    if (typeof Object.getOwnPropertyDescriptor == "function") {
      var d = Object.getOwnPropertyDescriptor(a, t);
      if (d.value !== h || d.enumerable !== true) return false;
    }
    return true;
  }), cr;
}
var hr, qi;
function Ff() {
  if (qi) return hr;
  qi = 1;
  var e = typeof Symbol < "u" && Symbol, a = ti();
  return hr = function() {
    return typeof e != "function" || typeof Symbol != "function" || typeof e("foo") != "symbol" || typeof Symbol("bar") != "symbol" ? false : a();
  }, hr;
}
var dr, ki;
function Ga() {
  return ki || (ki = 1, dr = typeof Reflect < "u" && Reflect.getPrototypeOf || null), dr;
}
var pr, xi;
function Ya() {
  if (xi) return pr;
  xi = 1;
  var e = ei();
  return pr = e.getPrototypeOf || null, pr;
}
var yr, Ui;
function Pf() {
  if (Ui) return yr;
  Ui = 1;
  var e = "Function.prototype.bind called on incompatible ", a = Object.prototype.toString, t = Math.max, s = "[object Function]", h = function(v, g) {
    for (var R = [], L = 0; L < v.length; L += 1) R[L] = v[L];
    for (var I = 0; I < g.length; I += 1) R[I + v.length] = g[I];
    return R;
  }, c = function(v, g) {
    for (var R = [], L = g, I = 0; L < v.length; L += 1, I += 1) R[I] = v[L];
    return R;
  }, b = function(d, v) {
    for (var g = "", R = 0; R < d.length; R += 1) g += d[R], R + 1 < d.length && (g += v);
    return g;
  };
  return yr = function(v) {
    var g = this;
    if (typeof g != "function" || a.apply(g) !== s) throw new TypeError(e + g);
    for (var R = c(arguments, 1), L, I = function() {
      if (this instanceof L) {
        var y = g.apply(this, h(R, arguments));
        return Object(y) === y ? y : this;
      }
      return g.apply(v, h(R, arguments));
    }, A = t(0, g.length - R.length), T = [], j = 0; j < A; j++) T[j] = "$" + j;
    if (L = Function("binder", "return function (" + b(T, ",") + "){ return binder.apply(this,arguments); }")(I), g.prototype) {
      var O = function() {
      };
      O.prototype = g.prototype, L.prototype = new O(), O.prototype = null;
    }
    return L;
  }, yr;
}
var gr, $i;
function bt() {
  if ($i) return gr;
  $i = 1;
  var e = Pf();
  return gr = Function.prototype.bind || e, gr;
}
var mr, Wi;
function ri() {
  return Wi || (Wi = 1, mr = Function.prototype.call), mr;
}
var vr, Vi;
function ni() {
  return Vi || (Vi = 1, vr = Function.prototype.apply), vr;
}
var br, Hi;
function Nf() {
  return Hi || (Hi = 1, br = typeof Reflect < "u" && Reflect && Reflect.apply), br;
}
var wr, Gi;
function za() {
  if (Gi) return wr;
  Gi = 1;
  var e = bt(), a = ni(), t = ri(), s = Nf();
  return wr = s || e.call(t, a), wr;
}
var Er, Yi;
function ii() {
  if (Yi) return Er;
  Yi = 1;
  var e = bt(), a = ze(), t = ri(), s = za();
  return Er = function(c) {
    if (c.length < 1 || typeof c[0] != "function") throw new a("a function is required");
    return s(e, t, c);
  }, Er;
}
var _r, zi;
function Bf() {
  if (zi) return _r;
  zi = 1;
  var e = ii(), a = at(), t;
  try {
    t = [].__proto__ === Array.prototype;
  } catch (b) {
    if (!b || typeof b != "object" || !("code" in b) || b.code !== "ERR_PROTO_ACCESS") throw b;
  }
  var s = !!t && a && a(Object.prototype, "__proto__"), h = Object, c = h.getPrototypeOf;
  return _r = s && typeof s.get == "function" ? e([s.get]) : typeof c == "function" ? function(d) {
    return c(d == null ? d : h(d));
  } : false, _r;
}
var Sr, Ki;
function Ka() {
  if (Ki) return Sr;
  Ki = 1;
  var e = Ga(), a = Ya(), t = Bf();
  return Sr = e ? function(h) {
    return e(h);
  } : a ? function(h) {
    if (!h || typeof h != "object" && typeof h != "function") throw new TypeError("getProto: not an object");
    return a(h);
  } : t ? function(h) {
    return t(h);
  } : null, Sr;
}
var Rr, Ji;
function Ja() {
  if (Ji) return Rr;
  Ji = 1;
  var e = Function.prototype.call, a = Object.prototype.hasOwnProperty, t = bt();
  return Rr = t.call(e, a), Rr;
}
var Or, Xi;
function wt() {
  if (Xi) return Or;
  Xi = 1;
  var e, a = ei(), t = yf(), s = gf(), h = mf(), c = vf(), b = Ha(), d = ze(), v = bf(), g = wf(), R = Ef(), L = _f(), I = Sf(), A = Rf(), T = Of(), j = Af(), O = Function, y = function(B) {
    try {
      return O('"use strict"; return (' + B + ").constructor;")();
    } catch {
    }
  }, o = at(), n = Mt(), p = function() {
    throw new d();
  }, w = o ? function() {
    try {
      return arguments.callee, p;
    } catch {
      try {
        return o(arguments, "callee").get;
      } catch {
        return p;
      }
    }
  }() : p, F = Ff()(), q = Ka(), V = Ya(), K = Ga(), ee = ni(), ue = ri(), k = {}, de = typeof Uint8Array > "u" || !q ? e : q(Uint8Array), be = { __proto__: null, "%AggregateError%": typeof AggregateError > "u" ? e : AggregateError, "%Array%": Array, "%ArrayBuffer%": typeof ArrayBuffer > "u" ? e : ArrayBuffer, "%ArrayIteratorPrototype%": F && q ? q([][Symbol.iterator]()) : e, "%AsyncFromSyncIteratorPrototype%": e, "%AsyncFunction%": k, "%AsyncGenerator%": k, "%AsyncGeneratorFunction%": k, "%AsyncIteratorPrototype%": k, "%Atomics%": typeof Atomics > "u" ? e : Atomics, "%BigInt%": typeof BigInt > "u" ? e : BigInt, "%BigInt64Array%": typeof BigInt64Array > "u" ? e : BigInt64Array, "%BigUint64Array%": typeof BigUint64Array > "u" ? e : BigUint64Array, "%Boolean%": Boolean, "%DataView%": typeof DataView > "u" ? e : DataView, "%Date%": Date, "%decodeURI%": decodeURI, "%decodeURIComponent%": decodeURIComponent, "%encodeURI%": encodeURI, "%encodeURIComponent%": encodeURIComponent, "%Error%": t, "%eval%": eval, "%EvalError%": s, "%Float16Array%": typeof Float16Array > "u" ? e : Float16Array, "%Float32Array%": typeof Float32Array > "u" ? e : Float32Array, "%Float64Array%": typeof Float64Array > "u" ? e : Float64Array, "%FinalizationRegistry%": typeof FinalizationRegistry > "u" ? e : FinalizationRegistry, "%Function%": O, "%GeneratorFunction%": k, "%Int8Array%": typeof Int8Array > "u" ? e : Int8Array, "%Int16Array%": typeof Int16Array > "u" ? e : Int16Array, "%Int32Array%": typeof Int32Array > "u" ? e : Int32Array, "%isFinite%": isFinite, "%isNaN%": isNaN, "%IteratorPrototype%": F && q ? q(q([][Symbol.iterator]())) : e, "%JSON%": typeof JSON == "object" ? JSON : e, "%Map%": typeof Map > "u" ? e : Map, "%MapIteratorPrototype%": typeof Map > "u" || !F || !q ? e : q((/* @__PURE__ */ new Map())[Symbol.iterator]()), "%Math%": Math, "%Number%": Number, "%Object%": a, "%Object.getOwnPropertyDescriptor%": o, "%parseFloat%": parseFloat, "%parseInt%": parseInt, "%Promise%": typeof Promise > "u" ? e : Promise, "%Proxy%": typeof Proxy > "u" ? e : Proxy, "%RangeError%": h, "%ReferenceError%": c, "%Reflect%": typeof Reflect > "u" ? e : Reflect, "%RegExp%": RegExp, "%Set%": typeof Set > "u" ? e : Set, "%SetIteratorPrototype%": typeof Set > "u" || !F || !q ? e : q((/* @__PURE__ */ new Set())[Symbol.iterator]()), "%SharedArrayBuffer%": typeof SharedArrayBuffer > "u" ? e : SharedArrayBuffer, "%String%": String, "%StringIteratorPrototype%": F && q ? q(""[Symbol.iterator]()) : e, "%Symbol%": F ? Symbol : e, "%SyntaxError%": b, "%ThrowTypeError%": w, "%TypedArray%": de, "%TypeError%": d, "%Uint8Array%": typeof Uint8Array > "u" ? e : Uint8Array, "%Uint8ClampedArray%": typeof Uint8ClampedArray > "u" ? e : Uint8ClampedArray, "%Uint16Array%": typeof Uint16Array > "u" ? e : Uint16Array, "%Uint32Array%": typeof Uint32Array > "u" ? e : Uint32Array, "%URIError%": v, "%WeakMap%": typeof WeakMap > "u" ? e : WeakMap, "%WeakRef%": typeof WeakRef > "u" ? e : WeakRef, "%WeakSet%": typeof WeakSet > "u" ? e : WeakSet, "%Function.prototype.call%": ue, "%Function.prototype.apply%": ee, "%Object.defineProperty%": n, "%Object.getPrototypeOf%": V, "%Math.abs%": g, "%Math.floor%": R, "%Math.max%": L, "%Math.min%": I, "%Math.pow%": A, "%Math.round%": T, "%Math.sign%": j, "%Reflect.getPrototypeOf%": K };
  if (q) try {
    null.error;
  } catch (B) {
    var Ee = q(q(B));
    be["%Error.prototype%"] = Ee;
  }
  var _e = function B(x) {
    var m;
    if (x === "%AsyncFunction%") m = y("async function () {}");
    else if (x === "%GeneratorFunction%") m = y("function* () {}");
    else if (x === "%AsyncGeneratorFunction%") m = y("async function* () {}");
    else if (x === "%AsyncGenerator%") {
      var S = B("%AsyncGeneratorFunction%");
      S && (m = S.prototype);
    } else if (x === "%AsyncIteratorPrototype%") {
      var Y = B("%AsyncGenerator%");
      Y && q && (m = q(Y.prototype));
    }
    return be[x] = m, m;
  }, Fe = { __proto__: null, "%ArrayBufferPrototype%": ["ArrayBuffer", "prototype"], "%ArrayPrototype%": ["Array", "prototype"], "%ArrayProto_entries%": ["Array", "prototype", "entries"], "%ArrayProto_forEach%": ["Array", "prototype", "forEach"], "%ArrayProto_keys%": ["Array", "prototype", "keys"], "%ArrayProto_values%": ["Array", "prototype", "values"], "%AsyncFunctionPrototype%": ["AsyncFunction", "prototype"], "%AsyncGenerator%": ["AsyncGeneratorFunction", "prototype"], "%AsyncGeneratorPrototype%": ["AsyncGeneratorFunction", "prototype", "prototype"], "%BooleanPrototype%": ["Boolean", "prototype"], "%DataViewPrototype%": ["DataView", "prototype"], "%DatePrototype%": ["Date", "prototype"], "%ErrorPrototype%": ["Error", "prototype"], "%EvalErrorPrototype%": ["EvalError", "prototype"], "%Float32ArrayPrototype%": ["Float32Array", "prototype"], "%Float64ArrayPrototype%": ["Float64Array", "prototype"], "%FunctionPrototype%": ["Function", "prototype"], "%Generator%": ["GeneratorFunction", "prototype"], "%GeneratorPrototype%": ["GeneratorFunction", "prototype", "prototype"], "%Int8ArrayPrototype%": ["Int8Array", "prototype"], "%Int16ArrayPrototype%": ["Int16Array", "prototype"], "%Int32ArrayPrototype%": ["Int32Array", "prototype"], "%JSONParse%": ["JSON", "parse"], "%JSONStringify%": ["JSON", "stringify"], "%MapPrototype%": ["Map", "prototype"], "%NumberPrototype%": ["Number", "prototype"], "%ObjectPrototype%": ["Object", "prototype"], "%ObjProto_toString%": ["Object", "prototype", "toString"], "%ObjProto_valueOf%": ["Object", "prototype", "valueOf"], "%PromisePrototype%": ["Promise", "prototype"], "%PromiseProto_then%": ["Promise", "prototype", "then"], "%Promise_all%": ["Promise", "all"], "%Promise_reject%": ["Promise", "reject"], "%Promise_resolve%": ["Promise", "resolve"], "%RangeErrorPrototype%": ["RangeError", "prototype"], "%ReferenceErrorPrototype%": ["ReferenceError", "prototype"], "%RegExpPrototype%": ["RegExp", "prototype"], "%SetPrototype%": ["Set", "prototype"], "%SharedArrayBufferPrototype%": ["SharedArrayBuffer", "prototype"], "%StringPrototype%": ["String", "prototype"], "%SymbolPrototype%": ["Symbol", "prototype"], "%SyntaxErrorPrototype%": ["SyntaxError", "prototype"], "%TypedArrayPrototype%": ["TypedArray", "prototype"], "%TypeErrorPrototype%": ["TypeError", "prototype"], "%Uint8ArrayPrototype%": ["Uint8Array", "prototype"], "%Uint8ClampedArrayPrototype%": ["Uint8ClampedArray", "prototype"], "%Uint16ArrayPrototype%": ["Uint16Array", "prototype"], "%Uint32ArrayPrototype%": ["Uint32Array", "prototype"], "%URIErrorPrototype%": ["URIError", "prototype"], "%WeakMapPrototype%": ["WeakMap", "prototype"], "%WeakSetPrototype%": ["WeakSet", "prototype"] }, ye = bt(), re = Ja(), J = ye.call(ue, Array.prototype.concat), oe = ye.call(ee, Array.prototype.splice), ne = ye.call(ue, String.prototype.replace), W = ye.call(ue, String.prototype.slice), P = ye.call(ue, RegExp.prototype.exec), M = /[^%.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|%$))/g, _ = /\\(\\)?/g, D = function(x) {
    var m = W(x, 0, 1), S = W(x, -1);
    if (m === "%" && S !== "%") throw new b("invalid intrinsic syntax, expected closing `%`");
    if (S === "%" && m !== "%") throw new b("invalid intrinsic syntax, expected opening `%`");
    var Y = [];
    return ne(x, M, function(ie, ge, ce, me) {
      Y[Y.length] = ce ? ne(me, _, "$1") : ge || ie;
    }), Y;
  }, $ = function(x, m) {
    var S = x, Y;
    if (re(Fe, S) && (Y = Fe[S], S = "%" + Y[0] + "%"), re(be, S)) {
      var ie = be[S];
      if (ie === k && (ie = _e(S)), typeof ie > "u" && !m) throw new d("intrinsic " + x + " exists, but is not available. Please file an issue!");
      return { alias: Y, name: S, value: ie };
    }
    throw new b("intrinsic " + x + " does not exist!");
  };
  return Or = function(x, m) {
    if (typeof x != "string" || x.length === 0) throw new d("intrinsic name must be a non-empty string");
    if (arguments.length > 1 && typeof m != "boolean") throw new d('"allowMissing" argument must be a boolean');
    if (P(/^%?[^%]*%?$/, x) === null) throw new b("`%` may not be present anywhere but at the beginning and end of the intrinsic name");
    var S = D(x), Y = S.length > 0 ? S[0] : "", ie = $("%" + Y + "%", m), ge = ie.name, ce = ie.value, me = false, Ie = ie.alias;
    Ie && (Y = Ie[0], oe(S, J([0, 1], Ie)));
    for (var te = 1, Le = true; te < S.length; te += 1) {
      var De = S[te], Ae = W(De, 0, 1), Ne = W(De, -1);
      if ((Ae === '"' || Ae === "'" || Ae === "`" || Ne === '"' || Ne === "'" || Ne === "`") && Ae !== Ne) throw new b("property names with quotes must have matching quotes");
      if ((De === "constructor" || !Le) && (me = true), Y += "." + De, ge = "%" + Y + "%", re(be, ge)) ce = be[ge];
      else if (ce != null) {
        if (!(De in ce)) {
          if (!m) throw new d("base intrinsic for " + x + " exists, but the property is not available.");
          return;
        }
        if (o && te + 1 >= S.length) {
          var H = o(ce, De);
          Le = !!H, Le && "get" in H && !("originalValue" in H.get) ? ce = H.get : ce = ce[De];
        } else Le = re(ce, De), ce = ce[De];
        Le && !me && (be[ge] = ce);
      }
    }
    return ce;
  }, Or;
}
var Tr, Qi;
function Je() {
  if (Qi) return Tr;
  Qi = 1;
  var e = wt(), a = ii(), t = a([e("%String.prototype.indexOf%")]);
  return Tr = function(h, c) {
    var b = e(h, !!c);
    return typeof b == "function" && t(h, ".prototype.") > -1 ? a([b]) : b;
  }, Tr;
}
var Ar, Zi;
function Xa() {
  if (Zi) return Ar;
  Zi = 1;
  var e = wt(), a = Je(), t = Ct(), s = ze(), h = e("%Map%", true), c = a("Map.prototype.get", true), b = a("Map.prototype.set", true), d = a("Map.prototype.has", true), v = a("Map.prototype.delete", true), g = a("Map.prototype.size", true);
  return Ar = !!h && function() {
    var L, I = { assert: function(A) {
      if (!I.has(A)) throw new s("Side channel does not contain " + t(A));
    }, delete: function(A) {
      if (L) {
        var T = v(L, A);
        return g(L) === 0 && (L = void 0), T;
      }
      return false;
    }, get: function(A) {
      if (L) return c(L, A);
    }, has: function(A) {
      return L ? d(L, A) : false;
    }, set: function(A, T) {
      L || (L = new h()), b(L, A, T);
    } };
    return I;
  }, Ar;
}
var Ir, eo;
function Df() {
  if (eo) return Ir;
  eo = 1;
  var e = wt(), a = Je(), t = Ct(), s = Xa(), h = ze(), c = e("%WeakMap%", true), b = a("WeakMap.prototype.get", true), d = a("WeakMap.prototype.set", true), v = a("WeakMap.prototype.has", true), g = a("WeakMap.prototype.delete", true);
  return Ir = c ? function() {
    var L, I, A = { assert: function(T) {
      if (!A.has(T)) throw new h("Side channel does not contain " + t(T));
    }, delete: function(T) {
      if (c && T && (typeof T == "object" || typeof T == "function")) {
        if (L) return g(L, T);
      } else if (s && I) return I.delete(T);
      return false;
    }, get: function(T) {
      return c && T && (typeof T == "object" || typeof T == "function") && L ? b(L, T) : I && I.get(T);
    }, has: function(T) {
      return c && T && (typeof T == "object" || typeof T == "function") && L ? v(L, T) : !!I && I.has(T);
    }, set: function(T, j) {
      c && T && (typeof T == "object" || typeof T == "function") ? (L || (L = new c()), d(L, T, j)) : s && (I || (I = s()), I.set(T, j));
    } };
    return A;
  } : s, Ir;
}
var Fr, to;
function Lf() {
  if (to) return Fr;
  to = 1;
  var e = ze(), a = Ct(), t = pf(), s = Xa(), h = Df(), c = h || s || t;
  return Fr = function() {
    var d, v = { assert: function(g) {
      if (!v.has(g)) throw new e("Side channel does not contain " + a(g));
    }, delete: function(g) {
      return !!d && d.delete(g);
    }, get: function(g) {
      return d && d.get(g);
    }, has: function(g) {
      return !!d && d.has(g);
    }, set: function(g, R) {
      d || (d = c()), d.set(g, R);
    } };
    return v;
  }, Fr;
}
var Pr, ro;
function oi() {
  if (ro) return Pr;
  ro = 1;
  var e = String.prototype.replace, a = /%20/g, t = { RFC1738: "RFC1738", RFC3986: "RFC3986" };
  return Pr = { default: t.RFC3986, formatters: { RFC1738: function(s) {
    return e.call(s, a, "+");
  }, RFC3986: function(s) {
    return String(s);
  } }, RFC1738: t.RFC1738, RFC3986: t.RFC3986 }, Pr;
}
var Nr, no;
function Qa() {
  if (no) return Nr;
  no = 1;
  var e = oi(), a = Object.prototype.hasOwnProperty, t = Array.isArray, s = function() {
    for (var O = [], y = 0; y < 256; ++y) O.push("%" + ((y < 16 ? "0" : "") + y.toString(16)).toUpperCase());
    return O;
  }(), h = function(y) {
    for (; y.length > 1; ) {
      var o = y.pop(), n = o.obj[o.prop];
      if (t(n)) {
        for (var p = [], w = 0; w < n.length; ++w) typeof n[w] < "u" && p.push(n[w]);
        o.obj[o.prop] = p;
      }
    }
  }, c = function(y, o) {
    for (var n = o && o.plainObjects ? { __proto__: null } : {}, p = 0; p < y.length; ++p) typeof y[p] < "u" && (n[p] = y[p]);
    return n;
  }, b = function O(y, o, n) {
    if (!o) return y;
    if (typeof o != "object" && typeof o != "function") {
      if (t(y)) y.push(o);
      else if (y && typeof y == "object") (n && (n.plainObjects || n.allowPrototypes) || !a.call(Object.prototype, o)) && (y[o] = true);
      else return [y, o];
      return y;
    }
    if (!y || typeof y != "object") return [y].concat(o);
    var p = y;
    return t(y) && !t(o) && (p = c(y, n)), t(y) && t(o) ? (o.forEach(function(w, F) {
      if (a.call(y, F)) {
        var q = y[F];
        q && typeof q == "object" && w && typeof w == "object" ? y[F] = O(q, w, n) : y.push(w);
      } else y[F] = w;
    }), y) : Object.keys(o).reduce(function(w, F) {
      var q = o[F];
      return a.call(w, F) ? w[F] = O(w[F], q, n) : w[F] = q, w;
    }, p);
  }, d = function(y, o) {
    return Object.keys(o).reduce(function(n, p) {
      return n[p] = o[p], n;
    }, y);
  }, v = function(O, y, o) {
    var n = O.replace(/\+/g, " ");
    if (o === "iso-8859-1") return n.replace(/%[0-9a-f]{2}/gi, unescape);
    try {
      return decodeURIComponent(n);
    } catch {
      return n;
    }
  }, g = 1024, R = function(y, o, n, p, w) {
    if (y.length === 0) return y;
    var F = y;
    if (typeof y == "symbol" ? F = Symbol.prototype.toString.call(y) : typeof y != "string" && (F = String(y)), n === "iso-8859-1") return escape(F).replace(/%u[0-9a-f]{4}/gi, function(de) {
      return "%26%23" + parseInt(de.slice(2), 16) + "%3B";
    });
    for (var q = "", V = 0; V < F.length; V += g) {
      for (var K = F.length >= g ? F.slice(V, V + g) : F, ee = [], ue = 0; ue < K.length; ++ue) {
        var k = K.charCodeAt(ue);
        if (k === 45 || k === 46 || k === 95 || k === 126 || k >= 48 && k <= 57 || k >= 65 && k <= 90 || k >= 97 && k <= 122 || w === e.RFC1738 && (k === 40 || k === 41)) {
          ee[ee.length] = K.charAt(ue);
          continue;
        }
        if (k < 128) {
          ee[ee.length] = s[k];
          continue;
        }
        if (k < 2048) {
          ee[ee.length] = s[192 | k >> 6] + s[128 | k & 63];
          continue;
        }
        if (k < 55296 || k >= 57344) {
          ee[ee.length] = s[224 | k >> 12] + s[128 | k >> 6 & 63] + s[128 | k & 63];
          continue;
        }
        ue += 1, k = 65536 + ((k & 1023) << 10 | K.charCodeAt(ue) & 1023), ee[ee.length] = s[240 | k >> 18] + s[128 | k >> 12 & 63] + s[128 | k >> 6 & 63] + s[128 | k & 63];
      }
      q += ee.join("");
    }
    return q;
  }, L = function(y) {
    for (var o = [{ obj: { o: y }, prop: "o" }], n = [], p = 0; p < o.length; ++p) for (var w = o[p], F = w.obj[w.prop], q = Object.keys(F), V = 0; V < q.length; ++V) {
      var K = q[V], ee = F[K];
      typeof ee == "object" && ee !== null && n.indexOf(ee) === -1 && (o.push({ obj: F, prop: K }), n.push(ee));
    }
    return h(o), y;
  }, I = function(y) {
    return Object.prototype.toString.call(y) === "[object RegExp]";
  }, A = function(y) {
    return !y || typeof y != "object" ? false : !!(y.constructor && y.constructor.isBuffer && y.constructor.isBuffer(y));
  }, T = function(y, o) {
    return [].concat(y, o);
  }, j = function(y, o) {
    if (t(y)) {
      for (var n = [], p = 0; p < y.length; p += 1) n.push(o(y[p]));
      return n;
    }
    return o(y);
  };
  return Nr = { arrayToObject: c, assign: d, combine: T, compact: L, decode: v, encode: R, isBuffer: A, isRegExp: I, maybeMap: j, merge: b }, Nr;
}
var Br, io;
function Cf() {
  if (io) return Br;
  io = 1;
  var e = Lf(), a = Qa(), t = oi(), s = Object.prototype.hasOwnProperty, h = { brackets: function(O) {
    return O + "[]";
  }, comma: "comma", indices: function(O, y) {
    return O + "[" + y + "]";
  }, repeat: function(O) {
    return O;
  } }, c = Array.isArray, b = Array.prototype.push, d = function(j, O) {
    b.apply(j, c(O) ? O : [O]);
  }, v = Date.prototype.toISOString, g = t.default, R = { addQueryPrefix: false, allowDots: false, allowEmptyArrays: false, arrayFormat: "indices", charset: "utf-8", charsetSentinel: false, commaRoundTrip: false, delimiter: "&", encode: true, encodeDotInKeys: false, encoder: a.encode, encodeValuesOnly: false, filter: void 0, format: g, formatter: t.formatters[g], indices: false, serializeDate: function(O) {
    return v.call(O);
  }, skipNulls: false, strictNullHandling: false }, L = function(O) {
    return typeof O == "string" || typeof O == "number" || typeof O == "boolean" || typeof O == "symbol" || typeof O == "bigint";
  }, I = {}, A = function j(O, y, o, n, p, w, F, q, V, K, ee, ue, k, de, be, Ee, _e, Fe) {
    for (var ye = O, re = Fe, J = 0, oe = false; (re = re.get(I)) !== void 0 && !oe; ) {
      var ne = re.get(O);
      if (J += 1, typeof ne < "u") {
        if (ne === J) throw new RangeError("Cyclic object value");
        oe = true;
      }
      typeof re.get(I) > "u" && (J = 0);
    }
    if (typeof K == "function" ? ye = K(y, ye) : ye instanceof Date ? ye = k(ye) : o === "comma" && c(ye) && (ye = a.maybeMap(ye, function(ge) {
      return ge instanceof Date ? k(ge) : ge;
    })), ye === null) {
      if (w) return V && !Ee ? V(y, R.encoder, _e, "key", de) : y;
      ye = "";
    }
    if (L(ye) || a.isBuffer(ye)) {
      if (V) {
        var W = Ee ? y : V(y, R.encoder, _e, "key", de);
        return [be(W) + "=" + be(V(ye, R.encoder, _e, "value", de))];
      }
      return [be(y) + "=" + be(String(ye))];
    }
    var P = [];
    if (typeof ye > "u") return P;
    var M;
    if (o === "comma" && c(ye)) Ee && V && (ye = a.maybeMap(ye, V)), M = [{ value: ye.length > 0 ? ye.join(",") || null : void 0 }];
    else if (c(K)) M = K;
    else {
      var _ = Object.keys(ye);
      M = ee ? _.sort(ee) : _;
    }
    var D = q ? String(y).replace(/\./g, "%2E") : String(y), $ = n && c(ye) && ye.length === 1 ? D + "[]" : D;
    if (p && c(ye) && ye.length === 0) return $ + "[]";
    for (var B = 0; B < M.length; ++B) {
      var x = M[B], m = typeof x == "object" && x && typeof x.value < "u" ? x.value : ye[x];
      if (!(F && m === null)) {
        var S = ue && q ? String(x).replace(/\./g, "%2E") : String(x), Y = c(ye) ? typeof o == "function" ? o($, S) : $ : $ + (ue ? "." + S : "[" + S + "]");
        Fe.set(O, J);
        var ie = e();
        ie.set(I, Fe), d(P, j(m, Y, o, n, p, w, F, q, o === "comma" && Ee && c(ye) ? null : V, K, ee, ue, k, de, be, Ee, _e, ie));
      }
    }
    return P;
  }, T = function(O) {
    if (!O) return R;
    if (typeof O.allowEmptyArrays < "u" && typeof O.allowEmptyArrays != "boolean") throw new TypeError("`allowEmptyArrays` option can only be `true` or `false`, when provided");
    if (typeof O.encodeDotInKeys < "u" && typeof O.encodeDotInKeys != "boolean") throw new TypeError("`encodeDotInKeys` option can only be `true` or `false`, when provided");
    if (O.encoder !== null && typeof O.encoder < "u" && typeof O.encoder != "function") throw new TypeError("Encoder has to be a function.");
    var y = O.charset || R.charset;
    if (typeof O.charset < "u" && O.charset !== "utf-8" && O.charset !== "iso-8859-1") throw new TypeError("The charset option must be either utf-8, iso-8859-1, or undefined");
    var o = t.default;
    if (typeof O.format < "u") {
      if (!s.call(t.formatters, O.format)) throw new TypeError("Unknown format option provided.");
      o = O.format;
    }
    var n = t.formatters[o], p = R.filter;
    (typeof O.filter == "function" || c(O.filter)) && (p = O.filter);
    var w;
    if (O.arrayFormat in h ? w = O.arrayFormat : "indices" in O ? w = O.indices ? "indices" : "repeat" : w = R.arrayFormat, "commaRoundTrip" in O && typeof O.commaRoundTrip != "boolean") throw new TypeError("`commaRoundTrip` must be a boolean, or absent");
    var F = typeof O.allowDots > "u" ? O.encodeDotInKeys === true ? true : R.allowDots : !!O.allowDots;
    return { addQueryPrefix: typeof O.addQueryPrefix == "boolean" ? O.addQueryPrefix : R.addQueryPrefix, allowDots: F, allowEmptyArrays: typeof O.allowEmptyArrays == "boolean" ? !!O.allowEmptyArrays : R.allowEmptyArrays, arrayFormat: w, charset: y, charsetSentinel: typeof O.charsetSentinel == "boolean" ? O.charsetSentinel : R.charsetSentinel, commaRoundTrip: !!O.commaRoundTrip, delimiter: typeof O.delimiter > "u" ? R.delimiter : O.delimiter, encode: typeof O.encode == "boolean" ? O.encode : R.encode, encodeDotInKeys: typeof O.encodeDotInKeys == "boolean" ? O.encodeDotInKeys : R.encodeDotInKeys, encoder: typeof O.encoder == "function" ? O.encoder : R.encoder, encodeValuesOnly: typeof O.encodeValuesOnly == "boolean" ? O.encodeValuesOnly : R.encodeValuesOnly, filter: p, format: o, formatter: n, serializeDate: typeof O.serializeDate == "function" ? O.serializeDate : R.serializeDate, skipNulls: typeof O.skipNulls == "boolean" ? O.skipNulls : R.skipNulls, sort: typeof O.sort == "function" ? O.sort : null, strictNullHandling: typeof O.strictNullHandling == "boolean" ? O.strictNullHandling : R.strictNullHandling };
  };
  return Br = function(j, O) {
    var y = j, o = T(O), n, p;
    typeof o.filter == "function" ? (p = o.filter, y = p("", y)) : c(o.filter) && (p = o.filter, n = p);
    var w = [];
    if (typeof y != "object" || y === null) return "";
    var F = h[o.arrayFormat], q = F === "comma" && o.commaRoundTrip;
    n || (n = Object.keys(y)), o.sort && n.sort(o.sort);
    for (var V = e(), K = 0; K < n.length; ++K) {
      var ee = n[K], ue = y[ee];
      o.skipNulls && ue === null || d(w, A(ue, ee, F, q, o.allowEmptyArrays, o.strictNullHandling, o.skipNulls, o.encodeDotInKeys, o.encode ? o.encoder : null, o.filter, o.sort, o.allowDots, o.serializeDate, o.format, o.formatter, o.encodeValuesOnly, o.charset, V));
    }
    var k = w.join(o.delimiter), de = o.addQueryPrefix === true ? "?" : "";
    return o.charsetSentinel && (o.charset === "iso-8859-1" ? de += "utf8=%26%2310003%3B&" : de += "utf8=%E2%9C%93&"), k.length > 0 ? de + k : "";
  }, Br;
}
var Dr, oo;
function Mf() {
  if (oo) return Dr;
  oo = 1;
  var e = Qa(), a = Object.prototype.hasOwnProperty, t = Array.isArray, s = { allowDots: false, allowEmptyArrays: false, allowPrototypes: false, allowSparse: false, arrayLimit: 20, charset: "utf-8", charsetSentinel: false, comma: false, decodeDotInKeys: false, decoder: e.decode, delimiter: "&", depth: 5, duplicates: "combine", ignoreQueryPrefix: false, interpretNumericEntities: false, parameterLimit: 1e3, parseArrays: true, plainObjects: false, strictDepth: false, strictNullHandling: false, throwOnLimitExceeded: false }, h = function(I) {
    return I.replace(/&#(\d+);/g, function(A, T) {
      return String.fromCharCode(parseInt(T, 10));
    });
  }, c = function(I, A, T) {
    if (I && typeof I == "string" && A.comma && I.indexOf(",") > -1) return I.split(",");
    if (A.throwOnLimitExceeded && T >= A.arrayLimit) throw new RangeError("Array limit exceeded. Only " + A.arrayLimit + " element" + (A.arrayLimit === 1 ? "" : "s") + " allowed in an array.");
    return I;
  }, b = "utf8=%26%2310003%3B", d = "utf8=%E2%9C%93", v = function(A, T) {
    var j = { __proto__: null }, O = T.ignoreQueryPrefix ? A.replace(/^\?/, "") : A;
    O = O.replace(/%5B/gi, "[").replace(/%5D/gi, "]");
    var y = T.parameterLimit === 1 / 0 ? void 0 : T.parameterLimit, o = O.split(T.delimiter, T.throwOnLimitExceeded ? y + 1 : y);
    if (T.throwOnLimitExceeded && o.length > y) throw new RangeError("Parameter limit exceeded. Only " + y + " parameter" + (y === 1 ? "" : "s") + " allowed.");
    var n = -1, p, w = T.charset;
    if (T.charsetSentinel) for (p = 0; p < o.length; ++p) o[p].indexOf("utf8=") === 0 && (o[p] === d ? w = "utf-8" : o[p] === b && (w = "iso-8859-1"), n = p, p = o.length);
    for (p = 0; p < o.length; ++p) if (p !== n) {
      var F = o[p], q = F.indexOf("]="), V = q === -1 ? F.indexOf("=") : q + 1, K, ee;
      V === -1 ? (K = T.decoder(F, s.decoder, w, "key"), ee = T.strictNullHandling ? null : "") : (K = T.decoder(F.slice(0, V), s.decoder, w, "key"), ee = e.maybeMap(c(F.slice(V + 1), T, t(j[K]) ? j[K].length : 0), function(k) {
        return T.decoder(k, s.decoder, w, "value");
      })), ee && T.interpretNumericEntities && w === "iso-8859-1" && (ee = h(String(ee))), F.indexOf("[]=") > -1 && (ee = t(ee) ? [ee] : ee);
      var ue = a.call(j, K);
      ue && T.duplicates === "combine" ? j[K] = e.combine(j[K], ee) : (!ue || T.duplicates === "last") && (j[K] = ee);
    }
    return j;
  }, g = function(I, A, T, j) {
    var O = 0;
    if (I.length > 0 && I[I.length - 1] === "[]") {
      var y = I.slice(0, -1).join("");
      O = Array.isArray(A) && A[y] ? A[y].length : 0;
    }
    for (var o = j ? A : c(A, T, O), n = I.length - 1; n >= 0; --n) {
      var p, w = I[n];
      if (w === "[]" && T.parseArrays) p = T.allowEmptyArrays && (o === "" || T.strictNullHandling && o === null) ? [] : e.combine([], o);
      else {
        p = T.plainObjects ? { __proto__: null } : {};
        var F = w.charAt(0) === "[" && w.charAt(w.length - 1) === "]" ? w.slice(1, -1) : w, q = T.decodeDotInKeys ? F.replace(/%2E/g, ".") : F, V = parseInt(q, 10);
        !T.parseArrays && q === "" ? p = { 0: o } : !isNaN(V) && w !== q && String(V) === q && V >= 0 && T.parseArrays && V <= T.arrayLimit ? (p = [], p[V] = o) : q !== "__proto__" && (p[q] = o);
      }
      o = p;
    }
    return o;
  }, R = function(A, T, j, O) {
    if (A) {
      var y = j.allowDots ? A.replace(/\.([^.[]+)/g, "[$1]") : A, o = /(\[[^[\]]*])/, n = /(\[[^[\]]*])/g, p = j.depth > 0 && o.exec(y), w = p ? y.slice(0, p.index) : y, F = [];
      if (w) {
        if (!j.plainObjects && a.call(Object.prototype, w) && !j.allowPrototypes) return;
        F.push(w);
      }
      for (var q = 0; j.depth > 0 && (p = n.exec(y)) !== null && q < j.depth; ) {
        if (q += 1, !j.plainObjects && a.call(Object.prototype, p[1].slice(1, -1)) && !j.allowPrototypes) return;
        F.push(p[1]);
      }
      if (p) {
        if (j.strictDepth === true) throw new RangeError("Input depth exceeded depth option of " + j.depth + " and strictDepth is true");
        F.push("[" + y.slice(p.index) + "]");
      }
      return g(F, T, j, O);
    }
  }, L = function(A) {
    if (!A) return s;
    if (typeof A.allowEmptyArrays < "u" && typeof A.allowEmptyArrays != "boolean") throw new TypeError("`allowEmptyArrays` option can only be `true` or `false`, when provided");
    if (typeof A.decodeDotInKeys < "u" && typeof A.decodeDotInKeys != "boolean") throw new TypeError("`decodeDotInKeys` option can only be `true` or `false`, when provided");
    if (A.decoder !== null && typeof A.decoder < "u" && typeof A.decoder != "function") throw new TypeError("Decoder has to be a function.");
    if (typeof A.charset < "u" && A.charset !== "utf-8" && A.charset !== "iso-8859-1") throw new TypeError("The charset option must be either utf-8, iso-8859-1, or undefined");
    if (typeof A.throwOnLimitExceeded < "u" && typeof A.throwOnLimitExceeded != "boolean") throw new TypeError("`throwOnLimitExceeded` option must be a boolean");
    var T = typeof A.charset > "u" ? s.charset : A.charset, j = typeof A.duplicates > "u" ? s.duplicates : A.duplicates;
    if (j !== "combine" && j !== "first" && j !== "last") throw new TypeError("The duplicates option must be either combine, first, or last");
    var O = typeof A.allowDots > "u" ? A.decodeDotInKeys === true ? true : s.allowDots : !!A.allowDots;
    return { allowDots: O, allowEmptyArrays: typeof A.allowEmptyArrays == "boolean" ? !!A.allowEmptyArrays : s.allowEmptyArrays, allowPrototypes: typeof A.allowPrototypes == "boolean" ? A.allowPrototypes : s.allowPrototypes, allowSparse: typeof A.allowSparse == "boolean" ? A.allowSparse : s.allowSparse, arrayLimit: typeof A.arrayLimit == "number" ? A.arrayLimit : s.arrayLimit, charset: T, charsetSentinel: typeof A.charsetSentinel == "boolean" ? A.charsetSentinel : s.charsetSentinel, comma: typeof A.comma == "boolean" ? A.comma : s.comma, decodeDotInKeys: typeof A.decodeDotInKeys == "boolean" ? A.decodeDotInKeys : s.decodeDotInKeys, decoder: typeof A.decoder == "function" ? A.decoder : s.decoder, delimiter: typeof A.delimiter == "string" || e.isRegExp(A.delimiter) ? A.delimiter : s.delimiter, depth: typeof A.depth == "number" || A.depth === false ? +A.depth : s.depth, duplicates: j, ignoreQueryPrefix: A.ignoreQueryPrefix === true, interpretNumericEntities: typeof A.interpretNumericEntities == "boolean" ? A.interpretNumericEntities : s.interpretNumericEntities, parameterLimit: typeof A.parameterLimit == "number" ? A.parameterLimit : s.parameterLimit, parseArrays: A.parseArrays !== false, plainObjects: typeof A.plainObjects == "boolean" ? A.plainObjects : s.plainObjects, strictDepth: typeof A.strictDepth == "boolean" ? !!A.strictDepth : s.strictDepth, strictNullHandling: typeof A.strictNullHandling == "boolean" ? A.strictNullHandling : s.strictNullHandling, throwOnLimitExceeded: typeof A.throwOnLimitExceeded == "boolean" ? A.throwOnLimitExceeded : false };
  };
  return Dr = function(I, A) {
    var T = L(A);
    if (I === "" || I === null || typeof I > "u") return T.plainObjects ? { __proto__: null } : {};
    for (var j = typeof I == "string" ? v(I, T) : I, O = T.plainObjects ? { __proto__: null } : {}, y = Object.keys(j), o = 0; o < y.length; ++o) {
      var n = y[o], p = R(n, j[n], T, typeof I == "string");
      O = e.merge(O, p, T);
    }
    return T.allowSparse === true ? O : e.compact(O);
  }, Dr;
}
var Lr, ao;
function jf() {
  if (ao) return Lr;
  ao = 1;
  var e = Cf(), a = Mf(), t = oi();
  return Lr = { formats: t, parse: a, stringify: e }, Lr;
}
var qf = jf();
const kf = Va(qf);
var xf = df;
function Ge() {
  this.protocol = null, this.slashes = null, this.auth = null, this.host = null, this.port = null, this.hostname = null, this.hash = null, this.search = null, this.query = null, this.pathname = null, this.path = null, this.href = null;
}
var Uf = /^([a-z0-9.+-]+:)/i, $f = /:[0-9]*$/, Wf = /^(\/\/?(?!\/)[^?\s]*)(\?[^\s]*)?$/, Vf = ["<", ">", '"', "`", " ", "\r", `
`, "	"], Hf = ["{", "}", "|", "\\", "^", "`"].concat(Vf), Yn = ["'"].concat(Hf), so = ["%", "/", "?", ";", "#"].concat(Yn), fo = ["/", "?", "#"], Gf = 255, uo = /^[+a-z0-9A-Z_-]{0,63}$/, Yf = /^([+a-z0-9A-Z_-]{0,63})(.*)$/, zf = { javascript: true, "javascript:": true }, zn = { javascript: true, "javascript:": true }, nt = { http: true, https: true, ftp: true, gopher: true, file: true, "http:": true, "https:": true, "ftp:": true, "gopher:": true, "file:": true }, Kn = kf;
function Et(e, a, t) {
  if (e && typeof e == "object" && e instanceof Ge) return e;
  var s = new Ge();
  return s.parse(e, a, t), s;
}
Ge.prototype.parse = function(e, a, t) {
  if (typeof e != "string") throw new TypeError("Parameter 'url' must be a string, not " + typeof e);
  var s = e.indexOf("?"), h = s !== -1 && s < e.indexOf("#") ? "?" : "#", c = e.split(h), b = /\\/g;
  c[0] = c[0].replace(b, "/"), e = c.join(h);
  var d = e;
  if (d = d.trim(), !t && e.split("#").length === 1) {
    var v = Wf.exec(d);
    if (v) return this.path = d, this.href = d, this.pathname = v[1], v[2] ? (this.search = v[2], a ? this.query = Kn.parse(this.search.substr(1)) : this.query = this.search.substr(1)) : a && (this.search = "", this.query = {}), this;
  }
  var g = Uf.exec(d);
  if (g) {
    g = g[0];
    var R = g.toLowerCase();
    this.protocol = R, d = d.substr(g.length);
  }
  if (t || g || d.match(/^\/\/[^@/]+@[^@/]+/)) {
    var L = d.substr(0, 2) === "//";
    L && !(g && zn[g]) && (d = d.substr(2), this.slashes = true);
  }
  if (!zn[g] && (L || g && !nt[g])) {
    for (var I = -1, A = 0; A < fo.length; A++) {
      var T = d.indexOf(fo[A]);
      T !== -1 && (I === -1 || T < I) && (I = T);
    }
    var j, O;
    I === -1 ? O = d.lastIndexOf("@") : O = d.lastIndexOf("@", I), O !== -1 && (j = d.slice(0, O), d = d.slice(O + 1), this.auth = decodeURIComponent(j)), I = -1;
    for (var A = 0; A < so.length; A++) {
      var T = d.indexOf(so[A]);
      T !== -1 && (I === -1 || T < I) && (I = T);
    }
    I === -1 && (I = d.length), this.host = d.slice(0, I), d = d.slice(I), this.parseHost(), this.hostname = this.hostname || "";
    var y = this.hostname[0] === "[" && this.hostname[this.hostname.length - 1] === "]";
    if (!y) for (var o = this.hostname.split(/\./), A = 0, n = o.length; A < n; A++) {
      var p = o[A];
      if (p && !p.match(uo)) {
        for (var w = "", F = 0, q = p.length; F < q; F++) p.charCodeAt(F) > 127 ? w += "x" : w += p[F];
        if (!w.match(uo)) {
          var V = o.slice(0, A), K = o.slice(A + 1), ee = p.match(Yf);
          ee && (V.push(ee[1]), K.unshift(ee[2])), K.length && (d = "/" + K.join(".") + d), this.hostname = V.join(".");
          break;
        }
      }
    }
    this.hostname.length > Gf ? this.hostname = "" : this.hostname = this.hostname.toLowerCase(), y || (this.hostname = xf.toASCII(this.hostname));
    var ue = this.port ? ":" + this.port : "", k = this.hostname || "";
    this.host = k + ue, this.href += this.host, y && (this.hostname = this.hostname.substr(1, this.hostname.length - 2), d[0] !== "/" && (d = "/" + d));
  }
  if (!zf[R]) for (var A = 0, n = Yn.length; A < n; A++) {
    var de = Yn[A];
    if (d.indexOf(de) !== -1) {
      var be = encodeURIComponent(de);
      be === de && (be = escape(de)), d = d.split(de).join(be);
    }
  }
  var Ee = d.indexOf("#");
  Ee !== -1 && (this.hash = d.substr(Ee), d = d.slice(0, Ee));
  var _e = d.indexOf("?");
  if (_e !== -1 ? (this.search = d.substr(_e), this.query = d.substr(_e + 1), a && (this.query = Kn.parse(this.query)), d = d.slice(0, _e)) : a && (this.search = "", this.query = {}), d && (this.pathname = d), nt[R] && this.hostname && !this.pathname && (this.pathname = "/"), this.pathname || this.search) {
    var ue = this.pathname || "", Fe = this.search || "";
    this.path = ue + Fe;
  }
  return this.href = this.format(), this;
};
function Kf(e) {
  return typeof e == "string" && (e = Et(e)), e instanceof Ge ? e.format() : Ge.prototype.format.call(e);
}
Ge.prototype.format = function() {
  var e = this.auth || "";
  e && (e = encodeURIComponent(e), e = e.replace(/%3A/i, ":"), e += "@");
  var a = this.protocol || "", t = this.pathname || "", s = this.hash || "", h = false, c = "";
  this.host ? h = e + this.host : this.hostname && (h = e + (this.hostname.indexOf(":") === -1 ? this.hostname : "[" + this.hostname + "]"), this.port && (h += ":" + this.port)), this.query && typeof this.query == "object" && Object.keys(this.query).length && (c = Kn.stringify(this.query, { arrayFormat: "repeat", addQueryPrefix: false }));
  var b = this.search || c && "?" + c || "";
  return a && a.substr(-1) !== ":" && (a += ":"), this.slashes || (!a || nt[a]) && h !== false ? (h = "//" + (h || ""), t && t.charAt(0) !== "/" && (t = "/" + t)) : h || (h = ""), s && s.charAt(0) !== "#" && (s = "#" + s), b && b.charAt(0) !== "?" && (b = "?" + b), t = t.replace(/[?#]/g, function(d) {
    return encodeURIComponent(d);
  }), b = b.replace("#", "%23"), a + h + t + b + s;
};
function Jf(e, a) {
  return Et(e, false, true).resolve(a);
}
Ge.prototype.resolve = function(e) {
  return this.resolveObject(Et(e, false, true)).format();
};
function Xf(e, a) {
  return e ? Et(e, false, true).resolveObject(a) : a;
}
Ge.prototype.resolveObject = function(e) {
  if (typeof e == "string") {
    var a = new Ge();
    a.parse(e, false, true), e = a;
  }
  for (var t = new Ge(), s = Object.keys(this), h = 0; h < s.length; h++) {
    var c = s[h];
    t[c] = this[c];
  }
  if (t.hash = e.hash, e.href === "") return t.href = t.format(), t;
  if (e.slashes && !e.protocol) {
    for (var b = Object.keys(e), d = 0; d < b.length; d++) {
      var v = b[d];
      v !== "protocol" && (t[v] = e[v]);
    }
    return nt[t.protocol] && t.hostname && !t.pathname && (t.pathname = "/", t.path = t.pathname), t.href = t.format(), t;
  }
  if (e.protocol && e.protocol !== t.protocol) {
    if (!nt[e.protocol]) {
      for (var g = Object.keys(e), R = 0; R < g.length; R++) {
        var L = g[R];
        t[L] = e[L];
      }
      return t.href = t.format(), t;
    }
    if (t.protocol = e.protocol, !e.host && !zn[e.protocol]) {
      for (var n = (e.pathname || "").split("/"); n.length && !(e.host = n.shift()); ) ;
      e.host || (e.host = ""), e.hostname || (e.hostname = ""), n[0] !== "" && n.unshift(""), n.length < 2 && n.unshift(""), t.pathname = n.join("/");
    } else t.pathname = e.pathname;
    if (t.search = e.search, t.query = e.query, t.host = e.host || "", t.auth = e.auth, t.hostname = e.hostname || e.host, t.port = e.port, t.pathname || t.search) {
      var I = t.pathname || "", A = t.search || "";
      t.path = I + A;
    }
    return t.slashes = t.slashes || e.slashes, t.href = t.format(), t;
  }
  var T = t.pathname && t.pathname.charAt(0) === "/", j = e.host || e.pathname && e.pathname.charAt(0) === "/", O = j || T || t.host && e.pathname, y = O, o = t.pathname && t.pathname.split("/") || [], n = e.pathname && e.pathname.split("/") || [], p = t.protocol && !nt[t.protocol];
  if (p && (t.hostname = "", t.port = null, t.host && (o[0] === "" ? o[0] = t.host : o.unshift(t.host)), t.host = "", e.protocol && (e.hostname = null, e.port = null, e.host && (n[0] === "" ? n[0] = e.host : n.unshift(e.host)), e.host = null), O = O && (n[0] === "" || o[0] === "")), j) t.host = e.host || e.host === "" ? e.host : t.host, t.hostname = e.hostname || e.hostname === "" ? e.hostname : t.hostname, t.search = e.search, t.query = e.query, o = n;
  else if (n.length) o || (o = []), o.pop(), o = o.concat(n), t.search = e.search, t.query = e.query;
  else if (e.search != null) {
    if (p) {
      t.host = o.shift(), t.hostname = t.host;
      var w = t.host && t.host.indexOf("@") > 0 ? t.host.split("@") : false;
      w && (t.auth = w.shift(), t.hostname = w.shift(), t.host = t.hostname);
    }
    return t.search = e.search, t.query = e.query, (t.pathname !== null || t.search !== null) && (t.path = (t.pathname ? t.pathname : "") + (t.search ? t.search : "")), t.href = t.format(), t;
  }
  if (!o.length) return t.pathname = null, t.search ? t.path = "/" + t.search : t.path = null, t.href = t.format(), t;
  for (var F = o.slice(-1)[0], q = (t.host || e.host || o.length > 1) && (F === "." || F === "..") || F === "", V = 0, K = o.length; K >= 0; K--) F = o[K], F === "." ? o.splice(K, 1) : F === ".." ? (o.splice(K, 1), V++) : V && (o.splice(K, 1), V--);
  if (!O && !y) for (; V--; V) o.unshift("..");
  O && o[0] !== "" && (!o[0] || o[0].charAt(0) !== "/") && o.unshift(""), q && o.join("/").substr(-1) !== "/" && o.push("");
  var ee = o[0] === "" || o[0] && o[0].charAt(0) === "/";
  if (p) {
    t.hostname = ee ? "" : o.length ? o.shift() : "", t.host = t.hostname;
    var w = t.host && t.host.indexOf("@") > 0 ? t.host.split("@") : false;
    w && (t.auth = w.shift(), t.hostname = w.shift(), t.host = t.hostname);
  }
  return O = O || t.host && o.length, O && !ee && o.unshift(""), o.length > 0 ? t.pathname = o.join("/") : (t.pathname = null, t.path = null), (t.pathname !== null || t.search !== null) && (t.path = (t.pathname ? t.pathname : "") + (t.search ? t.search : "")), t.auth = e.auth || t.auth, t.slashes = t.slashes || e.slashes, t.href = t.format(), t;
};
Ge.prototype.parseHost = function() {
  var e = this.host, a = $f.exec(e);
  a && (a = a[0], a !== ":" && (this.port = a.substr(1)), e = e.substr(0, e.length - a.length)), e && (this.hostname = e);
};
var Qf = Et, Zf = Jf, Za = Xf, eu = Kf, tu = Ge;
function ru(e, a) {
  for (var t = 0, s = e.length - 1; s >= 0; s--) {
    var h = e[s];
    h === "." ? e.splice(s, 1) : h === ".." ? (e.splice(s, 1), t++) : t && (e.splice(s, 1), t--);
  }
  if (a) for (; t--; t) e.unshift("..");
  return e;
}
function nu() {
  for (var e = "", a = false, t = arguments.length - 1; t >= -1 && !a; t--) {
    var s = t >= 0 ? arguments[t] : "/";
    if (typeof s != "string") throw new TypeError("Arguments to path.resolve must be strings");
    if (!s) continue;
    e = s + "/" + e, a = s.charAt(0) === "/";
  }
  return e = ru(iu(e.split("/"), function(h) {
    return !!h;
  }), !a).join("/"), (a ? "/" : "") + e || ".";
}
function iu(e, a) {
  if (e.filter) return e.filter(a);
  for (var t = [], s = 0; s < e.length; s++) a(e[s], s, e) && t.push(e[s]);
  return t;
}
var es = function(e) {
  function a() {
    var s = this || self;
    return delete e.prototype.__magic__, s;
  }
  if (typeof globalThis == "object") return globalThis;
  if (this) return a();
  e.defineProperty(e.prototype, "__magic__", { configurable: true, get: a });
  var t = __magic__;
  return t;
}(Object), ou = eu, ts = Qf, rs = Zf, ns = tu, Ke = es.URL, is = es.URLSearchParams, au = /%/g, su = /\\/g, fu = /\n/g, uu = /\r/g, lu = /\t/g, cu = 47;
function hu(e) {
  var a = e ?? null;
  return !!(a !== null && (a == null ? void 0 : a.href) && (a == null ? void 0 : a.origin));
}
function du(e) {
  if (e.hostname !== "") throw new TypeError('File URL host must be "localhost" or empty on browser');
  for (var a = e.pathname, t = 0; t < a.length; t++) if (a[t] === "%") {
    var s = a.codePointAt(t + 2) | 32;
    if (a[t + 1] === "2" && s === 102) throw new TypeError("File URL path must not include encoded / characters");
  }
  return decodeURIComponent(a);
}
function pu(e) {
  return e.includes("%") && (e = e.replace(au, "%25")), e.includes("\\") && (e = e.replace(su, "%5C")), e.includes(`
`) && (e = e.replace(fu, "%0A")), e.includes("\r") && (e = e.replace(uu, "%0D")), e.includes("	") && (e = e.replace(lu, "%09")), e;
}
var os = function(a) {
  if (typeof a > "u") throw new TypeError('The "domain" argument must be specified');
  return new Ke("http://" + a).hostname;
}, as = function(a) {
  if (typeof a > "u") throw new TypeError('The "domain" argument must be specified');
  return new Ke("http://" + a).hostname;
}, ss = function(a) {
  var t = new Ke("file://"), s = nu(a), h = a.charCodeAt(a.length - 1);
  return h === cu && s[s.length - 1] !== "/" && (s += "/"), t.pathname = pu(s), t;
}, fs = function(a) {
  if (!hu(a) && typeof a != "string") throw new TypeError('The "path" argument must be of type string or an instance of URL. Received type ' + typeof a + " (" + a + ")");
  var t = new Ke(a);
  if (t.protocol !== "file:") throw new TypeError("The URL must be of scheme file");
  return du(t);
}, us = function(a, t) {
  var s, h, c, b;
  if (t === void 0 && (t = {}), !(a instanceof Ke)) return ou(a);
  if (typeof t != "object" || t === null) throw new TypeError('The "options" argument must be of type object.');
  var d = (s = t.auth) != null ? s : true, v = (h = t.fragment) != null ? h : true, g = (c = t.search) != null ? c : true;
  (b = t.unicode) != null;
  var R = new Ke(a.toString());
  return d || (R.username = "", R.password = ""), v || (R.hash = ""), g || (R.search = ""), R.toString();
}, yu = { format: us, parse: ts, resolve: rs, resolveObject: Za, Url: ns, URL: Ke, URLSearchParams: is, domainToASCII: os, domainToUnicode: as, pathToFileURL: ss, fileURLToPath: fs };
const gu = Object.freeze(Object.defineProperty({ __proto__: null, URL: Ke, URLSearchParams: is, Url: ns, default: yu, domainToASCII: os, domainToUnicode: as, fileURLToPath: fs, format: us, parse: ts, pathToFileURL: ss, resolve: rs, resolveObject: Za }, Symbol.toStringTag, { value: "Module" })), mu = Zn(gu);
var Tt = { exports: {} }, tt = {}, ft = {}, lo;
function Qe() {
  return lo || (lo = 1, Object.defineProperty(ft, "__esModule", { value: true }), ft.constants = void 0, ft.constants = { O_RDONLY: 0, O_WRONLY: 1, O_RDWR: 2, S_IFMT: 61440, S_IFREG: 32768, S_IFDIR: 16384, S_IFCHR: 8192, S_IFBLK: 24576, S_IFIFO: 4096, S_IFLNK: 40960, S_IFSOCK: 49152, O_CREAT: 64, O_EXCL: 128, O_NOCTTY: 256, O_TRUNC: 512, O_APPEND: 1024, O_DIRECTORY: 65536, O_NOATIME: 262144, O_NOFOLLOW: 131072, O_SYNC: 1052672, O_SYMLINK: 2097152, O_DIRECT: 16384, O_NONBLOCK: 2048, S_IRWXU: 448, S_IRUSR: 256, S_IWUSR: 128, S_IXUSR: 64, S_IRWXG: 56, S_IRGRP: 32, S_IWGRP: 16, S_IXGRP: 8, S_IRWXO: 7, S_IROTH: 4, S_IWOTH: 2, S_IXOTH: 1, F_OK: 0, R_OK: 4, W_OK: 2, X_OK: 1, UV_FS_SYMLINK_DIR: 1, UV_FS_SYMLINK_JUNCTION: 2, UV_FS_COPYFILE_EXCL: 1, UV_FS_COPYFILE_FICLONE: 2, UV_FS_COPYFILE_FICLONE_FORCE: 4, COPYFILE_EXCL: 1, COPYFILE_FICLONE: 2, COPYFILE_FICLONE_FORCE: 4 }), ft;
}
var co;
function ai() {
  if (co) return tt;
  co = 1, Object.defineProperty(tt, "__esModule", { value: true }), tt.Stats = void 0;
  const e = Qe(), { S_IFMT: a, S_IFDIR: t, S_IFREG: s, S_IFBLK: h, S_IFCHR: c, S_IFLNK: b, S_IFIFO: d, S_IFSOCK: v } = e.constants;
  let g = class ls {
    static build(L, I = false) {
      const A = new ls(), { uid: T, gid: j, atime: O, mtime: y, ctime: o } = L, n = I ? (w) => BigInt(w) : (w) => w;
      A.uid = n(T), A.gid = n(j), A.rdev = n(L.rdev), A.blksize = n(4096), A.ino = n(L.ino), A.size = n(L.getSize()), A.blocks = n(1), A.atime = O, A.mtime = y, A.ctime = o, A.birthtime = o, A.atimeMs = n(O.getTime()), A.mtimeMs = n(y.getTime());
      const p = n(o.getTime());
      if (A.ctimeMs = p, A.birthtimeMs = p, I) {
        A.atimeNs = BigInt(O.getTime()) * BigInt(1e6), A.mtimeNs = BigInt(y.getTime()) * BigInt(1e6);
        const w = BigInt(o.getTime()) * BigInt(1e6);
        A.ctimeNs = w, A.birthtimeNs = w;
      }
      return A.dev = n(0), A.mode = n(L.mode), A.nlink = n(L.nlink), A;
    }
    _checkModeProperty(L) {
      return (Number(this.mode) & a) === L;
    }
    isDirectory() {
      return this._checkModeProperty(t);
    }
    isFile() {
      return this._checkModeProperty(s);
    }
    isBlockDevice() {
      return this._checkModeProperty(h);
    }
    isCharacterDevice() {
      return this._checkModeProperty(c);
    }
    isSymbolicLink() {
      return this._checkModeProperty(b);
    }
    isFIFO() {
      return this._checkModeProperty(d);
    }
    isSocket() {
      return this._checkModeProperty(v);
    }
  };
  return tt.Stats = g, tt.default = g, tt;
}
var rt = {}, Cr = {}, Mr = {}, jr = {}, ho;
function _t() {
  return ho || (ho = 1, function(e) {
    Object.defineProperties(e, { __esModule: { value: true }, [Symbol.toStringTag]: { value: "Module" } });
    var a = {}, t = {};
    t.byteLength = R, t.toByteArray = I, t.fromByteArray = j;
    for (var s = [], h = [], c = typeof Uint8Array < "u" ? Uint8Array : Array, b = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/", d = 0, v = b.length; d < v; ++d) s[d] = b[d], h[b.charCodeAt(d)] = d;
    h[45] = 62, h[95] = 63;
    function g(o) {
      var n = o.length;
      if (n % 4 > 0) throw new Error("Invalid string. Length must be a multiple of 4");
      var p = o.indexOf("=");
      p === -1 && (p = n);
      var w = p === n ? 0 : 4 - p % 4;
      return [p, w];
    }
    function R(o) {
      var n = g(o), p = n[0], w = n[1];
      return (p + w) * 3 / 4 - w;
    }
    function L(o, n, p) {
      return (n + p) * 3 / 4 - p;
    }
    function I(o) {
      var n, p = g(o), w = p[0], F = p[1], q = new c(L(o, w, F)), V = 0, K = F > 0 ? w - 4 : w, ee;
      for (ee = 0; ee < K; ee += 4) n = h[o.charCodeAt(ee)] << 18 | h[o.charCodeAt(ee + 1)] << 12 | h[o.charCodeAt(ee + 2)] << 6 | h[o.charCodeAt(ee + 3)], q[V++] = n >> 16 & 255, q[V++] = n >> 8 & 255, q[V++] = n & 255;
      return F === 2 && (n = h[o.charCodeAt(ee)] << 2 | h[o.charCodeAt(ee + 1)] >> 4, q[V++] = n & 255), F === 1 && (n = h[o.charCodeAt(ee)] << 10 | h[o.charCodeAt(ee + 1)] << 4 | h[o.charCodeAt(ee + 2)] >> 2, q[V++] = n >> 8 & 255, q[V++] = n & 255), q;
    }
    function A(o) {
      return s[o >> 18 & 63] + s[o >> 12 & 63] + s[o >> 6 & 63] + s[o & 63];
    }
    function T(o, n, p) {
      for (var w, F = [], q = n; q < p; q += 3) w = (o[q] << 16 & 16711680) + (o[q + 1] << 8 & 65280) + (o[q + 2] & 255), F.push(A(w));
      return F.join("");
    }
    function j(o) {
      for (var n, p = o.length, w = p % 3, F = [], q = 16383, V = 0, K = p - w; V < K; V += q) F.push(T(o, V, V + q > K ? K : V + q));
      return w === 1 ? (n = o[p - 1], F.push(s[n >> 2] + s[n << 4 & 63] + "==")) : w === 2 && (n = (o[p - 2] << 8) + o[p - 1], F.push(s[n >> 10] + s[n >> 4 & 63] + s[n << 2 & 63] + "=")), F.join("");
    }
    var O = {};
    /*! ieee754. BSD-3-Clause License. Feross Aboukhadijeh <https://feross.org/opensource> */
    O.read = function(o, n, p, w, F) {
      var q, V, K = F * 8 - w - 1, ee = (1 << K) - 1, ue = ee >> 1, k = -7, de = p ? F - 1 : 0, be = p ? -1 : 1, Ee = o[n + de];
      for (de += be, q = Ee & (1 << -k) - 1, Ee >>= -k, k += K; k > 0; q = q * 256 + o[n + de], de += be, k -= 8) ;
      for (V = q & (1 << -k) - 1, q >>= -k, k += w; k > 0; V = V * 256 + o[n + de], de += be, k -= 8) ;
      if (q === 0) q = 1 - ue;
      else {
        if (q === ee) return V ? NaN : (Ee ? -1 : 1) * (1 / 0);
        V = V + Math.pow(2, w), q = q - ue;
      }
      return (Ee ? -1 : 1) * V * Math.pow(2, q - w);
    }, O.write = function(o, n, p, w, F, q) {
      var V, K, ee, ue = q * 8 - F - 1, k = (1 << ue) - 1, de = k >> 1, be = F === 23 ? Math.pow(2, -24) - Math.pow(2, -77) : 0, Ee = w ? 0 : q - 1, _e = w ? 1 : -1, Fe = n < 0 || n === 0 && 1 / n < 0 ? 1 : 0;
      for (n = Math.abs(n), isNaN(n) || n === 1 / 0 ? (K = isNaN(n) ? 1 : 0, V = k) : (V = Math.floor(Math.log(n) / Math.LN2), n * (ee = Math.pow(2, -V)) < 1 && (V--, ee *= 2), V + de >= 1 ? n += be / ee : n += be * Math.pow(2, 1 - de), n * ee >= 2 && (V++, ee /= 2), V + de >= k ? (K = 0, V = k) : V + de >= 1 ? (K = (n * ee - 1) * Math.pow(2, F), V = V + de) : (K = n * Math.pow(2, de - 1) * Math.pow(2, F), V = 0)); F >= 8; o[p + Ee] = K & 255, Ee += _e, K /= 256, F -= 8) ;
      for (V = V << F | K, ue += F; ue > 0; o[p + Ee] = V & 255, Ee += _e, V /= 256, ue -= 8) ;
      o[p + Ee - _e] |= Fe * 128;
    };
    /*!
    * The buffer module from node.js, for the browser.
    *
    * @author   Feross Aboukhadijeh <https://feross.org>
    * @license  MIT
    */
    (function(o) {
      const n = t, p = O, w = typeof Symbol == "function" && typeof Symbol.for == "function" ? Symbol.for("nodejs.util.inspect.custom") : null;
      o.Buffer = k, o.SlowBuffer = W, o.INSPECT_MAX_BYTES = 50;
      const F = 2147483647;
      o.kMaxLength = F;
      const { Uint8Array: q, ArrayBuffer: V, SharedArrayBuffer: K } = globalThis;
      k.TYPED_ARRAY_SUPPORT = ee(), !k.TYPED_ARRAY_SUPPORT && typeof console < "u" && typeof console.error == "function" && console.error("This browser lacks typed array (Uint8Array) support which is required by `buffer` v5.x. Use `buffer` v4.x if you require old browser support.");
      function ee() {
        try {
          const E = new q(1), i = { foo: function() {
            return 42;
          } };
          return Object.setPrototypeOf(i, q.prototype), Object.setPrototypeOf(E, i), E.foo() === 42;
        } catch {
          return false;
        }
      }
      Object.defineProperty(k.prototype, "parent", { enumerable: true, get: function() {
        if (k.isBuffer(this)) return this.buffer;
      } }), Object.defineProperty(k.prototype, "offset", { enumerable: true, get: function() {
        if (k.isBuffer(this)) return this.byteOffset;
      } });
      function ue(E) {
        if (E > F) throw new RangeError('The value "' + E + '" is invalid for option "size"');
        const i = new q(E);
        return Object.setPrototypeOf(i, k.prototype), i;
      }
      function k(E, i, f) {
        if (typeof E == "number") {
          if (typeof i == "string") throw new TypeError('The "string" argument must be of type string. Received type number');
          return _e(E);
        }
        return de(E, i, f);
      }
      k.poolSize = 8192;
      function de(E, i, f) {
        if (typeof E == "string") return Fe(E, i);
        if (V.isView(E)) return re(E);
        if (E == null) throw new TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object. Received type " + typeof E);
        if (le(E, V) || E && le(E.buffer, V) || typeof K < "u" && (le(E, K) || E && le(E.buffer, K))) return J(E, i, f);
        if (typeof E == "number") throw new TypeError('The "value" argument must not be of type number. Received type number');
        const C = E.valueOf && E.valueOf();
        if (C != null && C !== E) return k.from(C, i, f);
        const G = oe(E);
        if (G) return G;
        if (typeof Symbol < "u" && Symbol.toPrimitive != null && typeof E[Symbol.toPrimitive] == "function") return k.from(E[Symbol.toPrimitive]("string"), i, f);
        throw new TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object. Received type " + typeof E);
      }
      k.from = function(E, i, f) {
        return de(E, i, f);
      }, Object.setPrototypeOf(k.prototype, q.prototype), Object.setPrototypeOf(k, q);
      function be(E) {
        if (typeof E != "number") throw new TypeError('"size" argument must be of type number');
        if (E < 0) throw new RangeError('The value "' + E + '" is invalid for option "size"');
      }
      function Ee(E, i, f) {
        return be(E), E <= 0 ? ue(E) : i !== void 0 ? typeof f == "string" ? ue(E).fill(i, f) : ue(E).fill(i) : ue(E);
      }
      k.alloc = function(E, i, f) {
        return Ee(E, i, f);
      };
      function _e(E) {
        return be(E), ue(E < 0 ? 0 : ne(E) | 0);
      }
      k.allocUnsafe = function(E) {
        return _e(E);
      }, k.allocUnsafeSlow = function(E) {
        return _e(E);
      };
      function Fe(E, i) {
        if ((typeof i != "string" || i === "") && (i = "utf8"), !k.isEncoding(i)) throw new TypeError("Unknown encoding: " + i);
        const f = P(E, i) | 0;
        let C = ue(f);
        const G = C.write(E, i);
        return G !== f && (C = C.slice(0, G)), C;
      }
      function ye(E) {
        const i = E.length < 0 ? 0 : ne(E.length) | 0, f = ue(i);
        for (let C = 0; C < i; C += 1) f[C] = E[C] & 255;
        return f;
      }
      function re(E) {
        if (le(E, q)) {
          const i = new q(E);
          return J(i.buffer, i.byteOffset, i.byteLength);
        }
        return ye(E);
      }
      function J(E, i, f) {
        if (i < 0 || E.byteLength < i) throw new RangeError('"offset" is outside of buffer bounds');
        if (E.byteLength < i + (f || 0)) throw new RangeError('"length" is outside of buffer bounds');
        let C;
        return i === void 0 && f === void 0 ? C = new q(E) : f === void 0 ? C = new q(E, i) : C = new q(E, i, f), Object.setPrototypeOf(C, k.prototype), C;
      }
      function oe(E) {
        if (k.isBuffer(E)) {
          const i = ne(E.length) | 0, f = ue(i);
          return f.length === 0 || E.copy(f, 0, 0, i), f;
        }
        if (E.length !== void 0) return typeof E.length != "number" || Re(E.length) ? ue(0) : ye(E);
        if (E.type === "Buffer" && Array.isArray(E.data)) return ye(E.data);
      }
      function ne(E) {
        if (E >= F) throw new RangeError("Attempt to allocate Buffer larger than maximum size: 0x" + F.toString(16) + " bytes");
        return E | 0;
      }
      function W(E) {
        return +E != E && (E = 0), k.alloc(+E);
      }
      k.isBuffer = function(i) {
        return i != null && i._isBuffer === true && i !== k.prototype;
      }, k.compare = function(i, f) {
        if (le(i, q) && (i = k.from(i, i.offset, i.byteLength)), le(f, q) && (f = k.from(f, f.offset, f.byteLength)), !k.isBuffer(i) || !k.isBuffer(f)) throw new TypeError('The "buf1", "buf2" arguments must be one of type Buffer or Uint8Array');
        if (i === f) return 0;
        let C = i.length, G = f.length;
        for (let Z = 0, ae = Math.min(C, G); Z < ae; ++Z) if (i[Z] !== f[Z]) {
          C = i[Z], G = f[Z];
          break;
        }
        return C < G ? -1 : G < C ? 1 : 0;
      }, k.isEncoding = function(i) {
        switch (String(i).toLowerCase()) {
          case "hex":
          case "utf8":
          case "utf-8":
          case "ascii":
          case "latin1":
          case "binary":
          case "base64":
          case "ucs2":
          case "ucs-2":
          case "utf16le":
          case "utf-16le":
            return true;
          default:
            return false;
        }
      }, k.concat = function(i, f) {
        if (!Array.isArray(i)) throw new TypeError('"list" argument must be an Array of Buffers');
        if (i.length === 0) return k.alloc(0);
        let C;
        if (f === void 0) for (f = 0, C = 0; C < i.length; ++C) f += i[C].length;
        const G = k.allocUnsafe(f);
        let Z = 0;
        for (C = 0; C < i.length; ++C) {
          let ae = i[C];
          if (le(ae, q)) Z + ae.length > G.length ? (k.isBuffer(ae) || (ae = k.from(ae)), ae.copy(G, Z)) : q.prototype.set.call(G, ae, Z);
          else if (k.isBuffer(ae)) ae.copy(G, Z);
          else throw new TypeError('"list" argument must be an Array of Buffers');
          Z += ae.length;
        }
        return G;
      };
      function P(E, i) {
        if (k.isBuffer(E)) return E.length;
        if (V.isView(E) || le(E, V)) return E.byteLength;
        if (typeof E != "string") throw new TypeError('The "string" argument must be one of type string, Buffer, or ArrayBuffer. Received type ' + typeof E);
        const f = E.length, C = arguments.length > 2 && arguments[2] === true;
        if (!C && f === 0) return 0;
        let G = false;
        for (; ; ) switch (i) {
          case "ascii":
          case "latin1":
          case "binary":
            return f;
          case "utf8":
          case "utf-8":
            return N(E).length;
          case "ucs2":
          case "ucs-2":
          case "utf16le":
          case "utf-16le":
            return f * 2;
          case "hex":
            return f >>> 1;
          case "base64":
            return Q(E).length;
          default:
            if (G) return C ? -1 : N(E).length;
            i = ("" + i).toLowerCase(), G = true;
        }
      }
      k.byteLength = P;
      function M(E, i, f) {
        let C = false;
        if ((i === void 0 || i < 0) && (i = 0), i > this.length || ((f === void 0 || f > this.length) && (f = this.length), f <= 0) || (f >>>= 0, i >>>= 0, f <= i)) return "";
        for (E || (E = "utf8"); ; ) switch (E) {
          case "hex":
            return Le(this, i, f);
          case "utf8":
          case "utf-8":
            return ge(this, i, f);
          case "ascii":
            return Ie(this, i, f);
          case "latin1":
          case "binary":
            return te(this, i, f);
          case "base64":
            return ie(this, i, f);
          case "ucs2":
          case "ucs-2":
          case "utf16le":
          case "utf-16le":
            return De(this, i, f);
          default:
            if (C) throw new TypeError("Unknown encoding: " + E);
            E = (E + "").toLowerCase(), C = true;
        }
      }
      k.prototype._isBuffer = true;
      function _(E, i, f) {
        const C = E[i];
        E[i] = E[f], E[f] = C;
      }
      k.prototype.swap16 = function() {
        const i = this.length;
        if (i % 2 !== 0) throw new RangeError("Buffer size must be a multiple of 16-bits");
        for (let f = 0; f < i; f += 2) _(this, f, f + 1);
        return this;
      }, k.prototype.swap32 = function() {
        const i = this.length;
        if (i % 4 !== 0) throw new RangeError("Buffer size must be a multiple of 32-bits");
        for (let f = 0; f < i; f += 4) _(this, f, f + 3), _(this, f + 1, f + 2);
        return this;
      }, k.prototype.swap64 = function() {
        const i = this.length;
        if (i % 8 !== 0) throw new RangeError("Buffer size must be a multiple of 64-bits");
        for (let f = 0; f < i; f += 8) _(this, f, f + 7), _(this, f + 1, f + 6), _(this, f + 2, f + 5), _(this, f + 3, f + 4);
        return this;
      }, k.prototype.toString = function() {
        const i = this.length;
        return i === 0 ? "" : arguments.length === 0 ? ge(this, 0, i) : M.apply(this, arguments);
      }, k.prototype.toLocaleString = k.prototype.toString, k.prototype.equals = function(i) {
        if (!k.isBuffer(i)) throw new TypeError("Argument must be a Buffer");
        return this === i ? true : k.compare(this, i) === 0;
      }, k.prototype.inspect = function() {
        let i = "";
        const f = o.INSPECT_MAX_BYTES;
        return i = this.toString("hex", 0, f).replace(/(.{2})/g, "$1 ").trim(), this.length > f && (i += " ... "), "<Buffer " + i + ">";
      }, w && (k.prototype[w] = k.prototype.inspect), k.prototype.compare = function(i, f, C, G, Z) {
        if (le(i, q) && (i = k.from(i, i.offset, i.byteLength)), !k.isBuffer(i)) throw new TypeError('The "target" argument must be one of type Buffer or Uint8Array. Received type ' + typeof i);
        if (f === void 0 && (f = 0), C === void 0 && (C = i ? i.length : 0), G === void 0 && (G = 0), Z === void 0 && (Z = this.length), f < 0 || C > i.length || G < 0 || Z > this.length) throw new RangeError("out of range index");
        if (G >= Z && f >= C) return 0;
        if (G >= Z) return -1;
        if (f >= C) return 1;
        if (f >>>= 0, C >>>= 0, G >>>= 0, Z >>>= 0, this === i) return 0;
        let ae = Z - G, Pe = C - f;
        const qe = Math.min(ae, Pe), je = this.slice(G, Z), xe = i.slice(f, C);
        for (let Me = 0; Me < qe; ++Me) if (je[Me] !== xe[Me]) {
          ae = je[Me], Pe = xe[Me];
          break;
        }
        return ae < Pe ? -1 : Pe < ae ? 1 : 0;
      };
      function D(E, i, f, C, G) {
        if (E.length === 0) return -1;
        if (typeof f == "string" ? (C = f, f = 0) : f > 2147483647 ? f = 2147483647 : f < -2147483648 && (f = -2147483648), f = +f, Re(f) && (f = G ? 0 : E.length - 1), f < 0 && (f = E.length + f), f >= E.length) {
          if (G) return -1;
          f = E.length - 1;
        } else if (f < 0) if (G) f = 0;
        else return -1;
        if (typeof i == "string" && (i = k.from(i, C)), k.isBuffer(i)) return i.length === 0 ? -1 : $(E, i, f, C, G);
        if (typeof i == "number") return i = i & 255, typeof q.prototype.indexOf == "function" ? G ? q.prototype.indexOf.call(E, i, f) : q.prototype.lastIndexOf.call(E, i, f) : $(E, [i], f, C, G);
        throw new TypeError("val must be string, number or Buffer");
      }
      function $(E, i, f, C, G) {
        let Z = 1, ae = E.length, Pe = i.length;
        if (C !== void 0 && (C = String(C).toLowerCase(), C === "ucs2" || C === "ucs-2" || C === "utf16le" || C === "utf-16le")) {
          if (E.length < 2 || i.length < 2) return -1;
          Z = 2, ae /= 2, Pe /= 2, f /= 2;
        }
        function qe(xe, Me) {
          return Z === 1 ? xe[Me] : xe.readUInt16BE(Me * Z);
        }
        let je;
        if (G) {
          let xe = -1;
          for (je = f; je < ae; je++) if (qe(E, je) === qe(i, xe === -1 ? 0 : je - xe)) {
            if (xe === -1 && (xe = je), je - xe + 1 === Pe) return xe * Z;
          } else xe !== -1 && (je -= je - xe), xe = -1;
        } else for (f + Pe > ae && (f = ae - Pe), je = f; je >= 0; je--) {
          let xe = true;
          for (let Me = 0; Me < Pe; Me++) if (qe(E, je + Me) !== qe(i, Me)) {
            xe = false;
            break;
          }
          if (xe) return je;
        }
        return -1;
      }
      k.prototype.includes = function(i, f, C) {
        return this.indexOf(i, f, C) !== -1;
      }, k.prototype.indexOf = function(i, f, C) {
        return D(this, i, f, C, true);
      }, k.prototype.lastIndexOf = function(i, f, C) {
        return D(this, i, f, C, false);
      };
      function B(E, i, f, C) {
        f = Number(f) || 0;
        const G = E.length - f;
        C ? (C = Number(C), C > G && (C = G)) : C = G;
        const Z = i.length;
        C > Z / 2 && (C = Z / 2);
        let ae;
        for (ae = 0; ae < C; ++ae) {
          const Pe = parseInt(i.substr(ae * 2, 2), 16);
          if (Re(Pe)) return ae;
          E[f + ae] = Pe;
        }
        return ae;
      }
      function x(E, i, f, C) {
        return se(N(i, E.length - f), E, f, C);
      }
      function m(E, i, f, C) {
        return se(U(i), E, f, C);
      }
      function S(E, i, f, C) {
        return se(Q(i), E, f, C);
      }
      function Y(E, i, f, C) {
        return se(z(i, E.length - f), E, f, C);
      }
      k.prototype.write = function(i, f, C, G) {
        if (f === void 0) G = "utf8", C = this.length, f = 0;
        else if (C === void 0 && typeof f == "string") G = f, C = this.length, f = 0;
        else if (isFinite(f)) f = f >>> 0, isFinite(C) ? (C = C >>> 0, G === void 0 && (G = "utf8")) : (G = C, C = void 0);
        else throw new Error("Buffer.write(string, encoding, offset[, length]) is no longer supported");
        const Z = this.length - f;
        if ((C === void 0 || C > Z) && (C = Z), i.length > 0 && (C < 0 || f < 0) || f > this.length) throw new RangeError("Attempt to write outside buffer bounds");
        G || (G = "utf8");
        let ae = false;
        for (; ; ) switch (G) {
          case "hex":
            return B(this, i, f, C);
          case "utf8":
          case "utf-8":
            return x(this, i, f, C);
          case "ascii":
          case "latin1":
          case "binary":
            return m(this, i, f, C);
          case "base64":
            return S(this, i, f, C);
          case "ucs2":
          case "ucs-2":
          case "utf16le":
          case "utf-16le":
            return Y(this, i, f, C);
          default:
            if (ae) throw new TypeError("Unknown encoding: " + G);
            G = ("" + G).toLowerCase(), ae = true;
        }
      }, k.prototype.toJSON = function() {
        return { type: "Buffer", data: Array.prototype.slice.call(this._arr || this, 0) };
      };
      function ie(E, i, f) {
        return i === 0 && f === E.length ? n.fromByteArray(E) : n.fromByteArray(E.slice(i, f));
      }
      function ge(E, i, f) {
        f = Math.min(E.length, f);
        const C = [];
        let G = i;
        for (; G < f; ) {
          const Z = E[G];
          let ae = null, Pe = Z > 239 ? 4 : Z > 223 ? 3 : Z > 191 ? 2 : 1;
          if (G + Pe <= f) {
            let qe, je, xe, Me;
            switch (Pe) {
              case 1:
                Z < 128 && (ae = Z);
                break;
              case 2:
                qe = E[G + 1], (qe & 192) === 128 && (Me = (Z & 31) << 6 | qe & 63, Me > 127 && (ae = Me));
                break;
              case 3:
                qe = E[G + 1], je = E[G + 2], (qe & 192) === 128 && (je & 192) === 128 && (Me = (Z & 15) << 12 | (qe & 63) << 6 | je & 63, Me > 2047 && (Me < 55296 || Me > 57343) && (ae = Me));
                break;
              case 4:
                qe = E[G + 1], je = E[G + 2], xe = E[G + 3], (qe & 192) === 128 && (je & 192) === 128 && (xe & 192) === 128 && (Me = (Z & 15) << 18 | (qe & 63) << 12 | (je & 63) << 6 | xe & 63, Me > 65535 && Me < 1114112 && (ae = Me));
            }
          }
          ae === null ? (ae = 65533, Pe = 1) : ae > 65535 && (ae -= 65536, C.push(ae >>> 10 & 1023 | 55296), ae = 56320 | ae & 1023), C.push(ae), G += Pe;
        }
        return me(C);
      }
      const ce = 4096;
      function me(E) {
        const i = E.length;
        if (i <= ce) return String.fromCharCode.apply(String, E);
        let f = "", C = 0;
        for (; C < i; ) f += String.fromCharCode.apply(String, E.slice(C, C += ce));
        return f;
      }
      function Ie(E, i, f) {
        let C = "";
        f = Math.min(E.length, f);
        for (let G = i; G < f; ++G) C += String.fromCharCode(E[G] & 127);
        return C;
      }
      function te(E, i, f) {
        let C = "";
        f = Math.min(E.length, f);
        for (let G = i; G < f; ++G) C += String.fromCharCode(E[G]);
        return C;
      }
      function Le(E, i, f) {
        const C = E.length;
        (!i || i < 0) && (i = 0), (!f || f < 0 || f > C) && (f = C);
        let G = "";
        for (let Z = i; Z < f; ++Z) G += Ce[E[Z]];
        return G;
      }
      function De(E, i, f) {
        const C = E.slice(i, f);
        let G = "";
        for (let Z = 0; Z < C.length - 1; Z += 2) G += String.fromCharCode(C[Z] + C[Z + 1] * 256);
        return G;
      }
      k.prototype.slice = function(i, f) {
        const C = this.length;
        i = ~~i, f = f === void 0 ? C : ~~f, i < 0 ? (i += C, i < 0 && (i = 0)) : i > C && (i = C), f < 0 ? (f += C, f < 0 && (f = 0)) : f > C && (f = C), f < i && (f = i);
        const G = this.subarray(i, f);
        return Object.setPrototypeOf(G, k.prototype), G;
      };
      function Ae(E, i, f) {
        if (E % 1 !== 0 || E < 0) throw new RangeError("offset is not uint");
        if (E + i > f) throw new RangeError("Trying to access beyond buffer length");
      }
      k.prototype.readUintLE = k.prototype.readUIntLE = function(i, f, C) {
        i = i >>> 0, f = f >>> 0, C || Ae(i, f, this.length);
        let G = this[i], Z = 1, ae = 0;
        for (; ++ae < f && (Z *= 256); ) G += this[i + ae] * Z;
        return G;
      }, k.prototype.readUintBE = k.prototype.readUIntBE = function(i, f, C) {
        i = i >>> 0, f = f >>> 0, C || Ae(i, f, this.length);
        let G = this[i + --f], Z = 1;
        for (; f > 0 && (Z *= 256); ) G += this[i + --f] * Z;
        return G;
      }, k.prototype.readUint8 = k.prototype.readUInt8 = function(i, f) {
        return i = i >>> 0, f || Ae(i, 1, this.length), this[i];
      }, k.prototype.readUint16LE = k.prototype.readUInt16LE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 2, this.length), this[i] | this[i + 1] << 8;
      }, k.prototype.readUint16BE = k.prototype.readUInt16BE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 2, this.length), this[i] << 8 | this[i + 1];
      }, k.prototype.readUint32LE = k.prototype.readUInt32LE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 4, this.length), (this[i] | this[i + 1] << 8 | this[i + 2] << 16) + this[i + 3] * 16777216;
      }, k.prototype.readUint32BE = k.prototype.readUInt32BE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 4, this.length), this[i] * 16777216 + (this[i + 1] << 16 | this[i + 2] << 8 | this[i + 3]);
      }, k.prototype.readBigUInt64LE = Ue(function(i) {
        i = i >>> 0, fe(i, "offset");
        const f = this[i], C = this[i + 7];
        (f === void 0 || C === void 0) && u(i, this.length - 8);
        const G = f + this[++i] * 2 ** 8 + this[++i] * 2 ** 16 + this[++i] * 2 ** 24, Z = this[++i] + this[++i] * 2 ** 8 + this[++i] * 2 ** 16 + C * 2 ** 24;
        return BigInt(G) + (BigInt(Z) << BigInt(32));
      }), k.prototype.readBigUInt64BE = Ue(function(i) {
        i = i >>> 0, fe(i, "offset");
        const f = this[i], C = this[i + 7];
        (f === void 0 || C === void 0) && u(i, this.length - 8);
        const G = f * 2 ** 24 + this[++i] * 2 ** 16 + this[++i] * 2 ** 8 + this[++i], Z = this[++i] * 2 ** 24 + this[++i] * 2 ** 16 + this[++i] * 2 ** 8 + C;
        return (BigInt(G) << BigInt(32)) + BigInt(Z);
      }), k.prototype.readIntLE = function(i, f, C) {
        i = i >>> 0, f = f >>> 0, C || Ae(i, f, this.length);
        let G = this[i], Z = 1, ae = 0;
        for (; ++ae < f && (Z *= 256); ) G += this[i + ae] * Z;
        return Z *= 128, G >= Z && (G -= Math.pow(2, 8 * f)), G;
      }, k.prototype.readIntBE = function(i, f, C) {
        i = i >>> 0, f = f >>> 0, C || Ae(i, f, this.length);
        let G = f, Z = 1, ae = this[i + --G];
        for (; G > 0 && (Z *= 256); ) ae += this[i + --G] * Z;
        return Z *= 128, ae >= Z && (ae -= Math.pow(2, 8 * f)), ae;
      }, k.prototype.readInt8 = function(i, f) {
        return i = i >>> 0, f || Ae(i, 1, this.length), this[i] & 128 ? (255 - this[i] + 1) * -1 : this[i];
      }, k.prototype.readInt16LE = function(i, f) {
        i = i >>> 0, f || Ae(i, 2, this.length);
        const C = this[i] | this[i + 1] << 8;
        return C & 32768 ? C | 4294901760 : C;
      }, k.prototype.readInt16BE = function(i, f) {
        i = i >>> 0, f || Ae(i, 2, this.length);
        const C = this[i + 1] | this[i] << 8;
        return C & 32768 ? C | 4294901760 : C;
      }, k.prototype.readInt32LE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 4, this.length), this[i] | this[i + 1] << 8 | this[i + 2] << 16 | this[i + 3] << 24;
      }, k.prototype.readInt32BE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 4, this.length), this[i] << 24 | this[i + 1] << 16 | this[i + 2] << 8 | this[i + 3];
      }, k.prototype.readBigInt64LE = Ue(function(i) {
        i = i >>> 0, fe(i, "offset");
        const f = this[i], C = this[i + 7];
        (f === void 0 || C === void 0) && u(i, this.length - 8);
        const G = this[i + 4] + this[i + 5] * 2 ** 8 + this[i + 6] * 2 ** 16 + (C << 24);
        return (BigInt(G) << BigInt(32)) + BigInt(f + this[++i] * 2 ** 8 + this[++i] * 2 ** 16 + this[++i] * 2 ** 24);
      }), k.prototype.readBigInt64BE = Ue(function(i) {
        i = i >>> 0, fe(i, "offset");
        const f = this[i], C = this[i + 7];
        (f === void 0 || C === void 0) && u(i, this.length - 8);
        const G = (f << 24) + this[++i] * 2 ** 16 + this[++i] * 2 ** 8 + this[++i];
        return (BigInt(G) << BigInt(32)) + BigInt(this[++i] * 2 ** 24 + this[++i] * 2 ** 16 + this[++i] * 2 ** 8 + C);
      }), k.prototype.readFloatLE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 4, this.length), p.read(this, i, true, 23, 4);
      }, k.prototype.readFloatBE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 4, this.length), p.read(this, i, false, 23, 4);
      }, k.prototype.readDoubleLE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 8, this.length), p.read(this, i, true, 52, 8);
      }, k.prototype.readDoubleBE = function(i, f) {
        return i = i >>> 0, f || Ae(i, 8, this.length), p.read(this, i, false, 52, 8);
      };
      function Ne(E, i, f, C, G, Z) {
        if (!k.isBuffer(E)) throw new TypeError('"buffer" argument must be a Buffer instance');
        if (i > G || i < Z) throw new RangeError('"value" argument is out of bounds');
        if (f + C > E.length) throw new RangeError("Index out of range");
      }
      k.prototype.writeUintLE = k.prototype.writeUIntLE = function(i, f, C, G) {
        if (i = +i, f = f >>> 0, C = C >>> 0, !G) {
          const Pe = Math.pow(2, 8 * C) - 1;
          Ne(this, i, f, C, Pe, 0);
        }
        let Z = 1, ae = 0;
        for (this[f] = i & 255; ++ae < C && (Z *= 256); ) this[f + ae] = i / Z & 255;
        return f + C;
      }, k.prototype.writeUintBE = k.prototype.writeUIntBE = function(i, f, C, G) {
        if (i = +i, f = f >>> 0, C = C >>> 0, !G) {
          const Pe = Math.pow(2, 8 * C) - 1;
          Ne(this, i, f, C, Pe, 0);
        }
        let Z = C - 1, ae = 1;
        for (this[f + Z] = i & 255; --Z >= 0 && (ae *= 256); ) this[f + Z] = i / ae & 255;
        return f + C;
      }, k.prototype.writeUint8 = k.prototype.writeUInt8 = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 1, 255, 0), this[f] = i & 255, f + 1;
      }, k.prototype.writeUint16LE = k.prototype.writeUInt16LE = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 2, 65535, 0), this[f] = i & 255, this[f + 1] = i >>> 8, f + 2;
      }, k.prototype.writeUint16BE = k.prototype.writeUInt16BE = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 2, 65535, 0), this[f] = i >>> 8, this[f + 1] = i & 255, f + 2;
      }, k.prototype.writeUint32LE = k.prototype.writeUInt32LE = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 4, 4294967295, 0), this[f + 3] = i >>> 24, this[f + 2] = i >>> 16, this[f + 1] = i >>> 8, this[f] = i & 255, f + 4;
      }, k.prototype.writeUint32BE = k.prototype.writeUInt32BE = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 4, 4294967295, 0), this[f] = i >>> 24, this[f + 1] = i >>> 16, this[f + 2] = i >>> 8, this[f + 3] = i & 255, f + 4;
      };
      function H(E, i, f, C, G) {
        ke(i, C, G, E, f, 7);
        let Z = Number(i & BigInt(4294967295));
        E[f++] = Z, Z = Z >> 8, E[f++] = Z, Z = Z >> 8, E[f++] = Z, Z = Z >> 8, E[f++] = Z;
        let ae = Number(i >> BigInt(32) & BigInt(4294967295));
        return E[f++] = ae, ae = ae >> 8, E[f++] = ae, ae = ae >> 8, E[f++] = ae, ae = ae >> 8, E[f++] = ae, f;
      }
      function X(E, i, f, C, G) {
        ke(i, C, G, E, f, 7);
        let Z = Number(i & BigInt(4294967295));
        E[f + 7] = Z, Z = Z >> 8, E[f + 6] = Z, Z = Z >> 8, E[f + 5] = Z, Z = Z >> 8, E[f + 4] = Z;
        let ae = Number(i >> BigInt(32) & BigInt(4294967295));
        return E[f + 3] = ae, ae = ae >> 8, E[f + 2] = ae, ae = ae >> 8, E[f + 1] = ae, ae = ae >> 8, E[f] = ae, f + 8;
      }
      k.prototype.writeBigUInt64LE = Ue(function(i, f = 0) {
        return H(this, i, f, BigInt(0), BigInt("0xffffffffffffffff"));
      }), k.prototype.writeBigUInt64BE = Ue(function(i, f = 0) {
        return X(this, i, f, BigInt(0), BigInt("0xffffffffffffffff"));
      }), k.prototype.writeIntLE = function(i, f, C, G) {
        if (i = +i, f = f >>> 0, !G) {
          const qe = Math.pow(2, 8 * C - 1);
          Ne(this, i, f, C, qe - 1, -qe);
        }
        let Z = 0, ae = 1, Pe = 0;
        for (this[f] = i & 255; ++Z < C && (ae *= 256); ) i < 0 && Pe === 0 && this[f + Z - 1] !== 0 && (Pe = 1), this[f + Z] = (i / ae >> 0) - Pe & 255;
        return f + C;
      }, k.prototype.writeIntBE = function(i, f, C, G) {
        if (i = +i, f = f >>> 0, !G) {
          const qe = Math.pow(2, 8 * C - 1);
          Ne(this, i, f, C, qe - 1, -qe);
        }
        let Z = C - 1, ae = 1, Pe = 0;
        for (this[f + Z] = i & 255; --Z >= 0 && (ae *= 256); ) i < 0 && Pe === 0 && this[f + Z + 1] !== 0 && (Pe = 1), this[f + Z] = (i / ae >> 0) - Pe & 255;
        return f + C;
      }, k.prototype.writeInt8 = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 1, 127, -128), i < 0 && (i = 255 + i + 1), this[f] = i & 255, f + 1;
      }, k.prototype.writeInt16LE = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 2, 32767, -32768), this[f] = i & 255, this[f + 1] = i >>> 8, f + 2;
      }, k.prototype.writeInt16BE = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 2, 32767, -32768), this[f] = i >>> 8, this[f + 1] = i & 255, f + 2;
      }, k.prototype.writeInt32LE = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 4, 2147483647, -2147483648), this[f] = i & 255, this[f + 1] = i >>> 8, this[f + 2] = i >>> 16, this[f + 3] = i >>> 24, f + 4;
      }, k.prototype.writeInt32BE = function(i, f, C) {
        return i = +i, f = f >>> 0, C || Ne(this, i, f, 4, 2147483647, -2147483648), i < 0 && (i = 4294967295 + i + 1), this[f] = i >>> 24, this[f + 1] = i >>> 16, this[f + 2] = i >>> 8, this[f + 3] = i & 255, f + 4;
      }, k.prototype.writeBigInt64LE = Ue(function(i, f = 0) {
        return H(this, i, f, -BigInt("0x8000000000000000"), BigInt("0x7fffffffffffffff"));
      }), k.prototype.writeBigInt64BE = Ue(function(i, f = 0) {
        return X(this, i, f, -BigInt("0x8000000000000000"), BigInt("0x7fffffffffffffff"));
      });
      function he(E, i, f, C, G, Z) {
        if (f + C > E.length) throw new RangeError("Index out of range");
        if (f < 0) throw new RangeError("Index out of range");
      }
      function ve(E, i, f, C, G) {
        return i = +i, f = f >>> 0, G || he(E, i, f, 4), p.write(E, i, f, C, 23, 4), f + 4;
      }
      k.prototype.writeFloatLE = function(i, f, C) {
        return ve(this, i, f, true, C);
      }, k.prototype.writeFloatBE = function(i, f, C) {
        return ve(this, i, f, false, C);
      };
      function pe(E, i, f, C, G) {
        return i = +i, f = f >>> 0, G || he(E, i, f, 8), p.write(E, i, f, C, 52, 8), f + 8;
      }
      k.prototype.writeDoubleLE = function(i, f, C) {
        return pe(this, i, f, true, C);
      }, k.prototype.writeDoubleBE = function(i, f, C) {
        return pe(this, i, f, false, C);
      }, k.prototype.copy = function(i, f, C, G) {
        if (!k.isBuffer(i)) throw new TypeError("argument should be a Buffer");
        if (C || (C = 0), !G && G !== 0 && (G = this.length), f >= i.length && (f = i.length), f || (f = 0), G > 0 && G < C && (G = C), G === C || i.length === 0 || this.length === 0) return 0;
        if (f < 0) throw new RangeError("targetStart out of bounds");
        if (C < 0 || C >= this.length) throw new RangeError("Index out of range");
        if (G < 0) throw new RangeError("sourceEnd out of bounds");
        G > this.length && (G = this.length), i.length - f < G - C && (G = i.length - f + C);
        const Z = G - C;
        return this === i && typeof q.prototype.copyWithin == "function" ? this.copyWithin(f, C, G) : q.prototype.set.call(i, this.subarray(C, G), f), Z;
      }, k.prototype.fill = function(i, f, C, G) {
        if (typeof i == "string") {
          if (typeof f == "string" ? (G = f, f = 0, C = this.length) : typeof C == "string" && (G = C, C = this.length), G !== void 0 && typeof G != "string") throw new TypeError("encoding must be a string");
          if (typeof G == "string" && !k.isEncoding(G)) throw new TypeError("Unknown encoding: " + G);
          if (i.length === 1) {
            const ae = i.charCodeAt(0);
            (G === "utf8" && ae < 128 || G === "latin1") && (i = ae);
          }
        } else typeof i == "number" ? i = i & 255 : typeof i == "boolean" && (i = Number(i));
        if (f < 0 || this.length < f || this.length < C) throw new RangeError("Out of range index");
        if (C <= f) return this;
        f = f >>> 0, C = C === void 0 ? this.length : C >>> 0, i || (i = 0);
        let Z;
        if (typeof i == "number") for (Z = f; Z < C; ++Z) this[Z] = i;
        else {
          const ae = k.isBuffer(i) ? i : k.from(i, G), Pe = ae.length;
          if (Pe === 0) throw new TypeError('The value "' + i + '" is invalid for argument "value"');
          for (Z = 0; Z < C - f; ++Z) this[Z + f] = ae[Z % Pe];
        }
        return this;
      };
      const Se = {};
      function we(E, i, f) {
        Se[E] = class extends f {
          constructor() {
            super(), Object.defineProperty(this, "message", { value: i.apply(this, arguments), writable: true, configurable: true }), this.name = `${this.name} [${E}]`, this.stack, delete this.name;
          }
          get code() {
            return E;
          }
          set code(G) {
            Object.defineProperty(this, "code", { configurable: true, enumerable: true, value: G, writable: true });
          }
          toString() {
            return `${this.name} [${E}]: ${this.message}`;
          }
        };
      }
      we("ERR_BUFFER_OUT_OF_BOUNDS", function(E) {
        return E ? `${E} is outside of buffer bounds` : "Attempt to access memory outside buffer bounds";
      }, RangeError), we("ERR_INVALID_ARG_TYPE", function(E, i) {
        return `The "${E}" argument must be of type number. Received type ${typeof i}`;
      }, TypeError), we("ERR_OUT_OF_RANGE", function(E, i, f) {
        let C = `The value of "${E}" is out of range.`, G = f;
        return Number.isInteger(f) && Math.abs(f) > 2 ** 32 ? G = Be(String(f)) : typeof f == "bigint" && (G = String(f), (f > BigInt(2) ** BigInt(32) || f < -(BigInt(2) ** BigInt(32))) && (G = Be(G)), G += "n"), C += ` It must be ${i}. Received ${G}`, C;
      }, RangeError);
      function Be(E) {
        let i = "", f = E.length;
        const C = E[0] === "-" ? 1 : 0;
        for (; f >= C + 4; f -= 3) i = `_${E.slice(f - 3, f)}${i}`;
        return `${E.slice(0, f)}${i}`;
      }
      function Te(E, i, f) {
        fe(i, "offset"), (E[i] === void 0 || E[i + f] === void 0) && u(i, E.length - (f + 1));
      }
      function ke(E, i, f, C, G, Z) {
        if (E > f || E < i) {
          const ae = typeof i == "bigint" ? "n" : "";
          let Pe;
          throw i === 0 || i === BigInt(0) ? Pe = `>= 0${ae} and < 2${ae} ** ${(Z + 1) * 8}${ae}` : Pe = `>= -(2${ae} ** ${(Z + 1) * 8 - 1}${ae}) and < 2 ** ${(Z + 1) * 8 - 1}${ae}`, new Se.ERR_OUT_OF_RANGE("value", Pe, E);
        }
        Te(C, G, Z);
      }
      function fe(E, i) {
        if (typeof E != "number") throw new Se.ERR_INVALID_ARG_TYPE(i, "number", E);
      }
      function u(E, i, f) {
        throw Math.floor(E) !== E ? (fe(E, f), new Se.ERR_OUT_OF_RANGE("offset", "an integer", E)) : i < 0 ? new Se.ERR_BUFFER_OUT_OF_BOUNDS() : new Se.ERR_OUT_OF_RANGE("offset", `>= 0 and <= ${i}`, E);
      }
      const r = /[^+/0-9A-Za-z-_]/g;
      function l(E) {
        if (E = E.split("=")[0], E = E.trim().replace(r, ""), E.length < 2) return "";
        for (; E.length % 4 !== 0; ) E = E + "=";
        return E;
      }
      function N(E, i) {
        i = i || 1 / 0;
        let f;
        const C = E.length;
        let G = null;
        const Z = [];
        for (let ae = 0; ae < C; ++ae) {
          if (f = E.charCodeAt(ae), f > 55295 && f < 57344) {
            if (!G) {
              if (f > 56319) {
                (i -= 3) > -1 && Z.push(239, 191, 189);
                continue;
              } else if (ae + 1 === C) {
                (i -= 3) > -1 && Z.push(239, 191, 189);
                continue;
              }
              G = f;
              continue;
            }
            if (f < 56320) {
              (i -= 3) > -1 && Z.push(239, 191, 189), G = f;
              continue;
            }
            f = (G - 55296 << 10 | f - 56320) + 65536;
          } else G && (i -= 3) > -1 && Z.push(239, 191, 189);
          if (G = null, f < 128) {
            if ((i -= 1) < 0) break;
            Z.push(f);
          } else if (f < 2048) {
            if ((i -= 2) < 0) break;
            Z.push(f >> 6 | 192, f & 63 | 128);
          } else if (f < 65536) {
            if ((i -= 3) < 0) break;
            Z.push(f >> 12 | 224, f >> 6 & 63 | 128, f & 63 | 128);
          } else if (f < 1114112) {
            if ((i -= 4) < 0) break;
            Z.push(f >> 18 | 240, f >> 12 & 63 | 128, f >> 6 & 63 | 128, f & 63 | 128);
          } else throw new Error("Invalid code point");
        }
        return Z;
      }
      function U(E) {
        const i = [];
        for (let f = 0; f < E.length; ++f) i.push(E.charCodeAt(f) & 255);
        return i;
      }
      function z(E, i) {
        let f, C, G;
        const Z = [];
        for (let ae = 0; ae < E.length && !((i -= 2) < 0); ++ae) f = E.charCodeAt(ae), C = f >> 8, G = f % 256, Z.push(G), Z.push(C);
        return Z;
      }
      function Q(E) {
        return n.toByteArray(l(E));
      }
      function se(E, i, f, C) {
        let G;
        for (G = 0; G < C && !(G + f >= i.length || G >= E.length); ++G) i[G + f] = E[G];
        return G;
      }
      function le(E, i) {
        return E instanceof i || E != null && E.constructor != null && E.constructor.name != null && E.constructor.name === i.name;
      }
      function Re(E) {
        return E !== E;
      }
      const Ce = function() {
        const E = "0123456789abcdef", i = new Array(256);
        for (let f = 0; f < 16; ++f) {
          const C = f * 16;
          for (let G = 0; G < 16; ++G) i[C + G] = E[f] + E[G];
        }
        return i;
      }();
      function Ue(E) {
        return typeof BigInt > "u" ? $e : E;
      }
      function $e() {
        throw new Error("BigInt not supported");
      }
    })(a);
    const y = a.Buffer;
    e.Blob = a.Blob, e.BlobOptions = a.BlobOptions, e.Buffer = a.Buffer, e.File = a.File, e.FileOptions = a.FileOptions, e.INSPECT_MAX_BYTES = a.INSPECT_MAX_BYTES, e.SlowBuffer = a.SlowBuffer, e.TranscodeEncoding = a.TranscodeEncoding, e.atob = a.atob, e.btoa = a.btoa, e.constants = a.constants, e.default = y, e.isAscii = a.isAscii, e.isUtf8 = a.isUtf8, e.kMaxLength = a.kMaxLength, e.kStringMaxLength = a.kStringMaxLength, e.resolveObjectURL = a.resolveObjectURL, e.transcode = a.transcode;
  }(jr)), jr;
}
var po;
function vt() {
  return po || (po = 1, function(e) {
    Object.defineProperty(e, "__esModule", { value: true }), e.bufferFrom = e.bufferAllocUnsafe = e.Buffer = void 0;
    const a = _t();
    Object.defineProperty(e, "Buffer", { enumerable: true, get: function() {
      return a.Buffer;
    } });
    function t(c, ...b) {
      return new a.Buffer(c, ...b);
    }
    const s = a.Buffer.allocUnsafe || t;
    e.bufferAllocUnsafe = s;
    const h = a.Buffer.from || t;
    e.bufferFrom = h;
  }(Mr)), Mr;
}
var qr = {}, kr = { exports: {} }, xr = {}, Ur = {}, $r = {}, Wr, yo;
function jt() {
  if (yo) return Wr;
  yo = 1;
  var e = ti();
  return Wr = function() {
    return e() && !!Symbol.toStringTag;
  }, Wr;
}
var Vr, go;
function vu() {
  if (go) return Vr;
  go = 1;
  var e = jt()(), a = Je(), t = a("Object.prototype.toString"), s = function(d) {
    return e && d && typeof d == "object" && Symbol.toStringTag in d ? false : t(d) === "[object Arguments]";
  }, h = function(d) {
    return s(d) ? true : d !== null && typeof d == "object" && "length" in d && typeof d.length == "number" && d.length >= 0 && t(d) !== "[object Array]" && "callee" in d && t(d.callee) === "[object Function]";
  }, c = function() {
    return s(arguments);
  }();
  return s.isLegacyArguments = h, Vr = c ? s : h, Vr;
}
var Hr, mo;
function bu() {
  if (mo) return Hr;
  mo = 1;
  var e = Je(), a = jt()(), t = Ja(), s = at(), h;
  if (a) {
    var c = e("RegExp.prototype.exec"), b = {}, d = function() {
      throw b;
    }, v = { toString: d, valueOf: d };
    typeof Symbol.toPrimitive == "symbol" && (v[Symbol.toPrimitive] = d), h = function(I) {
      if (!I || typeof I != "object") return false;
      var A = s(I, "lastIndex"), T = A && t(A, "value");
      if (!T) return false;
      try {
        c(I, v);
      } catch (j) {
        return j === b;
      }
    };
  } else {
    var g = e("Object.prototype.toString"), R = "[object RegExp]";
    h = function(I) {
      return !I || typeof I != "object" && typeof I != "function" ? false : g(I) === R;
    };
  }
  return Hr = h, Hr;
}
var Gr, vo;
function wu() {
  if (vo) return Gr;
  vo = 1;
  var e = Je(), a = bu(), t = e("RegExp.prototype.exec"), s = ze();
  return Gr = function(c) {
    if (!a(c)) throw new s("`regex` must be a RegExp");
    return function(d) {
      return t(c, d) !== null;
    };
  }, Gr;
}
var Yr, bo;
function Eu() {
  if (bo) return Yr;
  bo = 1;
  var e = Je(), a = wu(), t = a(/^\s*(?:function)?\*/), s = jt()(), h = Ka(), c = e("Object.prototype.toString"), b = e("Function.prototype.toString"), d = function() {
    if (!s) return false;
    try {
      return Function("return function*() {}")();
    } catch {
    }
  }, v;
  return Yr = function(R) {
    if (typeof R != "function") return false;
    if (t(b(R))) return true;
    if (!s) {
      var L = c(R);
      return L === "[object GeneratorFunction]";
    }
    if (!h) return false;
    if (typeof v > "u") {
      var I = d();
      v = I ? h(I) : false;
    }
    return h(R) === v;
  }, Yr;
}
var zr, wo;
function _u() {
  if (wo) return zr;
  wo = 1;
  var e = Function.prototype.toString, a = typeof Reflect == "object" && Reflect !== null && Reflect.apply, t, s;
  if (typeof a == "function" && typeof Object.defineProperty == "function") try {
    t = Object.defineProperty({}, "length", { get: function() {
      throw s;
    } }), s = {}, a(function() {
      throw 42;
    }, null, t);
  } catch (o) {
    o !== s && (a = null);
  }
  else a = null;
  var h = /^\s*class\b/, c = function(n) {
    try {
      var p = e.call(n);
      return h.test(p);
    } catch {
      return false;
    }
  }, b = function(n) {
    try {
      return c(n) ? false : (e.call(n), true);
    } catch {
      return false;
    }
  }, d = Object.prototype.toString, v = "[object Object]", g = "[object Function]", R = "[object GeneratorFunction]", L = "[object HTMLAllCollection]", I = "[object HTML document.all class]", A = "[object HTMLCollection]", T = typeof Symbol == "function" && !!Symbol.toStringTag, j = !(0 in [,]), O = function() {
    return false;
  };
  if (typeof document == "object") {
    var y = document.all;
    d.call(y) === d.call(document.all) && (O = function(n) {
      if ((j || !n) && (typeof n > "u" || typeof n == "object")) try {
        var p = d.call(n);
        return (p === L || p === I || p === A || p === v) && n("") == null;
      } catch {
      }
      return false;
    });
  }
  return zr = a ? function(n) {
    if (O(n)) return true;
    if (!n || typeof n != "function" && typeof n != "object") return false;
    try {
      a(n, null, t);
    } catch (p) {
      if (p !== s) return false;
    }
    return !c(n) && b(n);
  } : function(n) {
    if (O(n)) return true;
    if (!n || typeof n != "function" && typeof n != "object") return false;
    if (T) return b(n);
    if (c(n)) return false;
    var p = d.call(n);
    return p !== g && p !== R && !/^\[object HTML/.test(p) ? false : b(n);
  }, zr;
}
var Kr, Eo;
function Su() {
  if (Eo) return Kr;
  Eo = 1;
  var e = _u(), a = Object.prototype.toString, t = Object.prototype.hasOwnProperty, s = function(v, g, R) {
    for (var L = 0, I = v.length; L < I; L++) t.call(v, L) && (R == null ? g(v[L], L, v) : g.call(R, v[L], L, v));
  }, h = function(v, g, R) {
    for (var L = 0, I = v.length; L < I; L++) R == null ? g(v.charAt(L), L, v) : g.call(R, v.charAt(L), L, v);
  }, c = function(v, g, R) {
    for (var L in v) t.call(v, L) && (R == null ? g(v[L], L, v) : g.call(R, v[L], L, v));
  };
  function b(d) {
    return a.call(d) === "[object Array]";
  }
  return Kr = function(v, g, R) {
    if (!e(g)) throw new TypeError("iterator must be a function");
    var L;
    arguments.length >= 3 && (L = R), b(v) ? s(v, g, L) : typeof v == "string" ? h(v, g, L) : c(v, g, L);
  }, Kr;
}
var Jr, _o;
function Ru() {
  return _o || (_o = 1, Jr = ["Float16Array", "Float32Array", "Float64Array", "Int8Array", "Int16Array", "Int32Array", "Uint8Array", "Uint8ClampedArray", "Uint16Array", "Uint32Array", "BigInt64Array", "BigUint64Array"]), Jr;
}
var Xr, So;
function Ou() {
  if (So) return Xr;
  So = 1;
  var e = Ru(), a = typeof globalThis > "u" ? Ve : globalThis;
  return Xr = function() {
    for (var s = [], h = 0; h < e.length; h++) typeof a[e[h]] == "function" && (s[s.length] = e[h]);
    return s;
  }, Xr;
}
var Qr = { exports: {} }, Zr, Ro;
function cs() {
  if (Ro) return Zr;
  Ro = 1;
  var e = Mt(), a = Ha(), t = ze(), s = at();
  return Zr = function(c, b, d) {
    if (!c || typeof c != "object" && typeof c != "function") throw new t("`obj` must be an object or a function`");
    if (typeof b != "string" && typeof b != "symbol") throw new t("`property` must be a string or a symbol`");
    if (arguments.length > 3 && typeof arguments[3] != "boolean" && arguments[3] !== null) throw new t("`nonEnumerable`, if provided, must be a boolean or null");
    if (arguments.length > 4 && typeof arguments[4] != "boolean" && arguments[4] !== null) throw new t("`nonWritable`, if provided, must be a boolean or null");
    if (arguments.length > 5 && typeof arguments[5] != "boolean" && arguments[5] !== null) throw new t("`nonConfigurable`, if provided, must be a boolean or null");
    if (arguments.length > 6 && typeof arguments[6] != "boolean") throw new t("`loose`, if provided, must be a boolean");
    var v = arguments.length > 3 ? arguments[3] : null, g = arguments.length > 4 ? arguments[4] : null, R = arguments.length > 5 ? arguments[5] : null, L = arguments.length > 6 ? arguments[6] : false, I = !!s && s(c, b);
    if (e) e(c, b, { configurable: R === null && I ? I.configurable : !R, enumerable: v === null && I ? I.enumerable : !v, value: d, writable: g === null && I ? I.writable : !g });
    else if (L || !v && !g && !R) c[b] = d;
    else throw new a("This environment does not support defining a property as non-configurable, non-writable, or non-enumerable.");
  }, Zr;
}
var en, Oo;
function hs() {
  if (Oo) return en;
  Oo = 1;
  var e = Mt(), a = function() {
    return !!e;
  };
  return a.hasArrayLengthDefineBug = function() {
    if (!e) return null;
    try {
      return e([], "length", { value: 1 }).length !== 1;
    } catch {
      return true;
    }
  }, en = a, en;
}
var tn, To;
function Tu() {
  if (To) return tn;
  To = 1;
  var e = wt(), a = cs(), t = hs()(), s = at(), h = ze(), c = e("%Math.floor%");
  return tn = function(d, v) {
    if (typeof d != "function") throw new h("`fn` is not a function");
    if (typeof v != "number" || v < 0 || v > 4294967295 || c(v) !== v) throw new h("`length` must be a positive 32-bit integer");
    var g = arguments.length > 2 && !!arguments[2], R = true, L = true;
    if ("length" in d && s) {
      var I = s(d, "length");
      I && !I.configurable && (R = false), I && !I.writable && (L = false);
    }
    return (R || L || !g) && (t ? a(d, "length", v, true, true) : a(d, "length", v)), d;
  }, tn;
}
var rn, Ao;
function Au() {
  if (Ao) return rn;
  Ao = 1;
  var e = bt(), a = ni(), t = za();
  return rn = function() {
    return t(e, a, arguments);
  }, rn;
}
var Io;
function qt() {
  return Io || (Io = 1, function(e) {
    var a = Tu(), t = Mt(), s = ii(), h = Au();
    e.exports = function(b) {
      var d = s(arguments), v = b.length - (arguments.length - 1);
      return a(d, 1 + (v > 0 ? v : 0), true);
    }, t ? t(e.exports, "apply", { value: h }) : e.exports.apply = h;
  }(Qr)), Qr.exports;
}
var nn, Fo;
function ds() {
  if (Fo) return nn;
  Fo = 1;
  var e = Su(), a = Ou(), t = qt(), s = Je(), h = at(), c = s("Object.prototype.toString"), b = jt()(), d = typeof globalThis > "u" ? Ve : globalThis, v = a(), g = s("String.prototype.slice"), R = Object.getPrototypeOf, L = s("Array.prototype.indexOf", true) || function(O, y) {
    for (var o = 0; o < O.length; o += 1) if (O[o] === y) return o;
    return -1;
  }, I = { __proto__: null };
  b && h && R ? e(v, function(j) {
    var O = new d[j]();
    if (Symbol.toStringTag in O) {
      var y = R(O), o = h(y, Symbol.toStringTag);
      if (!o) {
        var n = R(y);
        o = h(n, Symbol.toStringTag);
      }
      I["$" + j] = t(o.get);
    }
  }) : e(v, function(j) {
    var O = new d[j](), y = O.slice || O.set;
    y && (I["$" + j] = t(y));
  });
  var A = function(O) {
    var y = false;
    return e(I, function(o, n) {
      if (!y) try {
        "$" + o(O) === n && (y = g(n, 1));
      } catch {
      }
    }), y;
  }, T = function(O) {
    var y = false;
    return e(I, function(o, n) {
      if (!y) try {
        o(O), y = g(n, 1);
      } catch {
      }
    }), y;
  };
  return nn = function(O) {
    if (!O || typeof O != "object") return false;
    if (!b) {
      var y = g(c(O), 8, -1);
      return L(v, y) > -1 ? y : y !== "Object" ? false : T(O);
    }
    return h ? A(O) : null;
  }, nn;
}
var on, Po;
function Iu() {
  if (Po) return on;
  Po = 1;
  var e = ds();
  return on = function(t) {
    return !!e(t);
  }, on;
}
var No;
function Fu() {
  return No || (No = 1, function(e) {
    var a = vu(), t = Eu(), s = ds(), h = Iu();
    function c(te) {
      return te.call.bind(te);
    }
    var b = typeof BigInt < "u", d = typeof Symbol < "u", v = c(Object.prototype.toString), g = c(Number.prototype.valueOf), R = c(String.prototype.valueOf), L = c(Boolean.prototype.valueOf);
    if (b) var I = c(BigInt.prototype.valueOf);
    if (d) var A = c(Symbol.prototype.valueOf);
    function T(te, Le) {
      if (typeof te != "object") return false;
      try {
        return Le(te), true;
      } catch {
        return false;
      }
    }
    e.isArgumentsObject = a, e.isGeneratorFunction = t, e.isTypedArray = h;
    function j(te) {
      return typeof Promise < "u" && te instanceof Promise || te !== null && typeof te == "object" && typeof te.then == "function" && typeof te.catch == "function";
    }
    e.isPromise = j;
    function O(te) {
      return typeof ArrayBuffer < "u" && ArrayBuffer.isView ? ArrayBuffer.isView(te) : h(te) || W(te);
    }
    e.isArrayBufferView = O;
    function y(te) {
      return s(te) === "Uint8Array";
    }
    e.isUint8Array = y;
    function o(te) {
      return s(te) === "Uint8ClampedArray";
    }
    e.isUint8ClampedArray = o;
    function n(te) {
      return s(te) === "Uint16Array";
    }
    e.isUint16Array = n;
    function p(te) {
      return s(te) === "Uint32Array";
    }
    e.isUint32Array = p;
    function w(te) {
      return s(te) === "Int8Array";
    }
    e.isInt8Array = w;
    function F(te) {
      return s(te) === "Int16Array";
    }
    e.isInt16Array = F;
    function q(te) {
      return s(te) === "Int32Array";
    }
    e.isInt32Array = q;
    function V(te) {
      return s(te) === "Float32Array";
    }
    e.isFloat32Array = V;
    function K(te) {
      return s(te) === "Float64Array";
    }
    e.isFloat64Array = K;
    function ee(te) {
      return s(te) === "BigInt64Array";
    }
    e.isBigInt64Array = ee;
    function ue(te) {
      return s(te) === "BigUint64Array";
    }
    e.isBigUint64Array = ue;
    function k(te) {
      return v(te) === "[object Map]";
    }
    k.working = typeof Map < "u" && k(/* @__PURE__ */ new Map());
    function de(te) {
      return typeof Map > "u" ? false : k.working ? k(te) : te instanceof Map;
    }
    e.isMap = de;
    function be(te) {
      return v(te) === "[object Set]";
    }
    be.working = typeof Set < "u" && be(/* @__PURE__ */ new Set());
    function Ee(te) {
      return typeof Set > "u" ? false : be.working ? be(te) : te instanceof Set;
    }
    e.isSet = Ee;
    function _e(te) {
      return v(te) === "[object WeakMap]";
    }
    _e.working = typeof WeakMap < "u" && _e(/* @__PURE__ */ new WeakMap());
    function Fe(te) {
      return typeof WeakMap > "u" ? false : _e.working ? _e(te) : te instanceof WeakMap;
    }
    e.isWeakMap = Fe;
    function ye(te) {
      return v(te) === "[object WeakSet]";
    }
    ye.working = typeof WeakSet < "u" && ye(/* @__PURE__ */ new WeakSet());
    function re(te) {
      return ye(te);
    }
    e.isWeakSet = re;
    function J(te) {
      return v(te) === "[object ArrayBuffer]";
    }
    J.working = typeof ArrayBuffer < "u" && J(new ArrayBuffer());
    function oe(te) {
      return typeof ArrayBuffer > "u" ? false : J.working ? J(te) : te instanceof ArrayBuffer;
    }
    e.isArrayBuffer = oe;
    function ne(te) {
      return v(te) === "[object DataView]";
    }
    ne.working = typeof ArrayBuffer < "u" && typeof DataView < "u" && ne(new DataView(new ArrayBuffer(1), 0, 1));
    function W(te) {
      return typeof DataView > "u" ? false : ne.working ? ne(te) : te instanceof DataView;
    }
    e.isDataView = W;
    var P = typeof SharedArrayBuffer < "u" ? SharedArrayBuffer : void 0;
    function M(te) {
      return v(te) === "[object SharedArrayBuffer]";
    }
    function _(te) {
      return typeof P > "u" ? false : (typeof M.working > "u" && (M.working = M(new P())), M.working ? M(te) : te instanceof P);
    }
    e.isSharedArrayBuffer = _;
    function D(te) {
      return v(te) === "[object AsyncFunction]";
    }
    e.isAsyncFunction = D;
    function $(te) {
      return v(te) === "[object Map Iterator]";
    }
    e.isMapIterator = $;
    function B(te) {
      return v(te) === "[object Set Iterator]";
    }
    e.isSetIterator = B;
    function x(te) {
      return v(te) === "[object Generator]";
    }
    e.isGeneratorObject = x;
    function m(te) {
      return v(te) === "[object WebAssembly.Module]";
    }
    e.isWebAssemblyCompiledModule = m;
    function S(te) {
      return T(te, g);
    }
    e.isNumberObject = S;
    function Y(te) {
      return T(te, R);
    }
    e.isStringObject = Y;
    function ie(te) {
      return T(te, L);
    }
    e.isBooleanObject = ie;
    function ge(te) {
      return b && T(te, I);
    }
    e.isBigIntObject = ge;
    function ce(te) {
      return d && T(te, A);
    }
    e.isSymbolObject = ce;
    function me(te) {
      return S(te) || Y(te) || ie(te) || ge(te) || ce(te);
    }
    e.isBoxedPrimitive = me;
    function Ie(te) {
      return typeof Uint8Array < "u" && (oe(te) || _(te));
    }
    e.isAnyArrayBuffer = Ie, ["isProxy", "isExternal", "isModuleNamespaceObject"].forEach(function(te) {
      Object.defineProperty(e, te, { enumerable: false, value: function() {
        throw new Error(te + " is not supported in userland");
      } });
    });
  }($r)), $r;
}
var an, Bo;
function Pu() {
  return Bo || (Bo = 1, an = function(a) {
    return a && typeof a == "object" && typeof a.copy == "function" && typeof a.fill == "function" && typeof a.readUInt8 == "function";
  }), an;
}
var At = { exports: {} }, Do;
function Ze() {
  return Do || (Do = 1, typeof Object.create == "function" ? At.exports = function(a, t) {
    t && (a.super_ = t, a.prototype = Object.create(t.prototype, { constructor: { value: a, enumerable: false, writable: true, configurable: true } }));
  } : At.exports = function(a, t) {
    if (t) {
      a.super_ = t;
      var s = function() {
      };
      s.prototype = t.prototype, a.prototype = new s(), a.prototype.constructor = a;
    }
  }), At.exports;
}
var Lo;
function Ye() {
  return Lo || (Lo = 1, function(e) {
    var a = {}, t = Object.getOwnPropertyDescriptors || function(P) {
      for (var M = Object.keys(P), _ = {}, D = 0; D < M.length; D++) _[M[D]] = Object.getOwnPropertyDescriptor(P, M[D]);
      return _;
    }, s = /%[sdj%]/g;
    e.format = function(W) {
      if (!F(W)) {
        for (var P = [], M = 0; M < arguments.length; M++) P.push(d(arguments[M]));
        return P.join(" ");
      }
      for (var M = 1, _ = arguments, D = _.length, $ = String(W).replace(s, function(x) {
        if (x === "%%") return "%";
        if (M >= D) return x;
        switch (x) {
          case "%s":
            return String(_[M++]);
          case "%d":
            return Number(_[M++]);
          case "%j":
            try {
              return JSON.stringify(_[M++]);
            } catch {
              return "[Circular]";
            }
          default:
            return x;
        }
      }), B = _[M]; M < D; B = _[++M]) n(B) || !ee(B) ? $ += " " + B : $ += " " + d(B);
      return $;
    }, e.deprecate = function(W, P) {
      if (typeof Oe < "u" && Oe.noDeprecation === true) return W;
      if (typeof Oe > "u") return function() {
        return e.deprecate(W, P).apply(this, arguments);
      };
      var M = false;
      function _() {
        if (!M) {
          if (Oe.throwDeprecation) throw new Error(P);
          Oe.traceDeprecation ? console.trace(P) : console.error(P), M = true;
        }
        return W.apply(this, arguments);
      }
      return _;
    };
    var h = {}, c = /^$/;
    if (a.NODE_DEBUG) {
      var b = a.NODE_DEBUG;
      b = b.replace(/[|\\{}()[\]^$+?.]/g, "\\$&").replace(/\*/g, ".*").replace(/,/g, "$|^").toUpperCase(), c = new RegExp("^" + b + "$", "i");
    }
    e.debuglog = function(W) {
      if (W = W.toUpperCase(), !h[W]) if (c.test(W)) {
        var P = Oe.pid;
        h[W] = function() {
          var M = e.format.apply(e, arguments);
          console.error("%s %d: %s", W, P, M);
        };
      } else h[W] = function() {
      };
      return h[W];
    };
    function d(W, P) {
      var M = { seen: [], stylize: g };
      return arguments.length >= 3 && (M.depth = arguments[2]), arguments.length >= 4 && (M.colors = arguments[3]), o(P) ? M.showHidden = P : P && e._extend(M, P), V(M.showHidden) && (M.showHidden = false), V(M.depth) && (M.depth = 2), V(M.colors) && (M.colors = false), V(M.customInspect) && (M.customInspect = true), M.colors && (M.stylize = v), L(M, W, M.depth);
    }
    e.inspect = d, d.colors = { bold: [1, 22], italic: [3, 23], underline: [4, 24], inverse: [7, 27], white: [37, 39], grey: [90, 39], black: [30, 39], blue: [34, 39], cyan: [36, 39], green: [32, 39], magenta: [35, 39], red: [31, 39], yellow: [33, 39] }, d.styles = { special: "cyan", number: "yellow", boolean: "yellow", undefined: "grey", null: "bold", string: "green", date: "magenta", regexp: "red" };
    function v(W, P) {
      var M = d.styles[P];
      return M ? "\x1B[" + d.colors[M][0] + "m" + W + "\x1B[" + d.colors[M][1] + "m" : W;
    }
    function g(W, P) {
      return W;
    }
    function R(W) {
      var P = {};
      return W.forEach(function(M, _) {
        P[M] = true;
      }), P;
    }
    function L(W, P, M) {
      if (W.customInspect && P && de(P.inspect) && P.inspect !== e.inspect && !(P.constructor && P.constructor.prototype === P)) {
        var _ = P.inspect(M, W);
        return F(_) || (_ = L(W, _, M)), _;
      }
      var D = I(W, P);
      if (D) return D;
      var $ = Object.keys(P), B = R($);
      if (W.showHidden && ($ = Object.getOwnPropertyNames(P)), k(P) && ($.indexOf("message") >= 0 || $.indexOf("description") >= 0)) return A(P);
      if ($.length === 0) {
        if (de(P)) {
          var x = P.name ? ": " + P.name : "";
          return W.stylize("[Function" + x + "]", "special");
        }
        if (K(P)) return W.stylize(RegExp.prototype.toString.call(P), "regexp");
        if (ue(P)) return W.stylize(Date.prototype.toString.call(P), "date");
        if (k(P)) return A(P);
      }
      var m = "", S = false, Y = ["{", "}"];
      if (y(P) && (S = true, Y = ["[", "]"]), de(P)) {
        var ie = P.name ? ": " + P.name : "";
        m = " [Function" + ie + "]";
      }
      if (K(P) && (m = " " + RegExp.prototype.toString.call(P)), ue(P) && (m = " " + Date.prototype.toUTCString.call(P)), k(P) && (m = " " + A(P)), $.length === 0 && (!S || P.length == 0)) return Y[0] + m + Y[1];
      if (M < 0) return K(P) ? W.stylize(RegExp.prototype.toString.call(P), "regexp") : W.stylize("[Object]", "special");
      W.seen.push(P);
      var ge;
      return S ? ge = T(W, P, M, B, $) : ge = $.map(function(ce) {
        return j(W, P, M, B, ce, S);
      }), W.seen.pop(), O(ge, m, Y);
    }
    function I(W, P) {
      if (V(P)) return W.stylize("undefined", "undefined");
      if (F(P)) {
        var M = "'" + JSON.stringify(P).replace(/^"|"$/g, "").replace(/'/g, "\\'").replace(/\\"/g, '"') + "'";
        return W.stylize(M, "string");
      }
      if (w(P)) return W.stylize("" + P, "number");
      if (o(P)) return W.stylize("" + P, "boolean");
      if (n(P)) return W.stylize("null", "null");
    }
    function A(W) {
      return "[" + Error.prototype.toString.call(W) + "]";
    }
    function T(W, P, M, _, D) {
      for (var $ = [], B = 0, x = P.length; B < x; ++B) re(P, String(B)) ? $.push(j(W, P, M, _, String(B), true)) : $.push("");
      return D.forEach(function(m) {
        m.match(/^\d+$/) || $.push(j(W, P, M, _, m, true));
      }), $;
    }
    function j(W, P, M, _, D, $) {
      var B, x, m;
      if (m = Object.getOwnPropertyDescriptor(P, D) || { value: P[D] }, m.get ? m.set ? x = W.stylize("[Getter/Setter]", "special") : x = W.stylize("[Getter]", "special") : m.set && (x = W.stylize("[Setter]", "special")), re(_, D) || (B = "[" + D + "]"), x || (W.seen.indexOf(m.value) < 0 ? (n(M) ? x = L(W, m.value, null) : x = L(W, m.value, M - 1), x.indexOf(`
`) > -1 && ($ ? x = x.split(`
`).map(function(S) {
        return "  " + S;
      }).join(`
`).slice(2) : x = `
` + x.split(`
`).map(function(S) {
        return "   " + S;
      }).join(`
`))) : x = W.stylize("[Circular]", "special")), V(B)) {
        if ($ && D.match(/^\d+$/)) return x;
        B = JSON.stringify("" + D), B.match(/^"([a-zA-Z_][a-zA-Z_0-9]*)"$/) ? (B = B.slice(1, -1), B = W.stylize(B, "name")) : (B = B.replace(/'/g, "\\'").replace(/\\"/g, '"').replace(/(^"|"$)/g, "'"), B = W.stylize(B, "string"));
      }
      return B + ": " + x;
    }
    function O(W, P, M) {
      var _ = W.reduce(function(D, $) {
        return $.indexOf(`
`) >= 0, D + $.replace(/\u001b\[\d\d?m/g, "").length + 1;
      }, 0);
      return _ > 60 ? M[0] + (P === "" ? "" : P + `
 `) + " " + W.join(`,
  `) + " " + M[1] : M[0] + P + " " + W.join(", ") + " " + M[1];
    }
    e.types = Fu();
    function y(W) {
      return Array.isArray(W);
    }
    e.isArray = y;
    function o(W) {
      return typeof W == "boolean";
    }
    e.isBoolean = o;
    function n(W) {
      return W === null;
    }
    e.isNull = n;
    function p(W) {
      return W == null;
    }
    e.isNullOrUndefined = p;
    function w(W) {
      return typeof W == "number";
    }
    e.isNumber = w;
    function F(W) {
      return typeof W == "string";
    }
    e.isString = F;
    function q(W) {
      return typeof W == "symbol";
    }
    e.isSymbol = q;
    function V(W) {
      return W === void 0;
    }
    e.isUndefined = V;
    function K(W) {
      return ee(W) && Ee(W) === "[object RegExp]";
    }
    e.isRegExp = K, e.types.isRegExp = K;
    function ee(W) {
      return typeof W == "object" && W !== null;
    }
    e.isObject = ee;
    function ue(W) {
      return ee(W) && Ee(W) === "[object Date]";
    }
    e.isDate = ue, e.types.isDate = ue;
    function k(W) {
      return ee(W) && (Ee(W) === "[object Error]" || W instanceof Error);
    }
    e.isError = k, e.types.isNativeError = k;
    function de(W) {
      return typeof W == "function";
    }
    e.isFunction = de;
    function be(W) {
      return W === null || typeof W == "boolean" || typeof W == "number" || typeof W == "string" || typeof W == "symbol" || typeof W > "u";
    }
    e.isPrimitive = be, e.isBuffer = Pu();
    function Ee(W) {
      return Object.prototype.toString.call(W);
    }
    function _e(W) {
      return W < 10 ? "0" + W.toString(10) : W.toString(10);
    }
    var Fe = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    function ye() {
      var W = /* @__PURE__ */ new Date(), P = [_e(W.getHours()), _e(W.getMinutes()), _e(W.getSeconds())].join(":");
      return [W.getDate(), Fe[W.getMonth()], P].join(" ");
    }
    e.log = function() {
      console.log("%s - %s", ye(), e.format.apply(e, arguments));
    }, e.inherits = Ze(), e._extend = function(W, P) {
      if (!P || !ee(P)) return W;
      for (var M = Object.keys(P), _ = M.length; _--; ) W[M[_]] = P[M[_]];
      return W;
    };
    function re(W, P) {
      return Object.prototype.hasOwnProperty.call(W, P);
    }
    var J = typeof Symbol < "u" ? Symbol("util.promisify.custom") : void 0;
    e.promisify = function(P) {
      if (typeof P != "function") throw new TypeError('The "original" argument must be of type Function');
      if (J && P[J]) {
        var M = P[J];
        if (typeof M != "function") throw new TypeError('The "util.promisify.custom" argument must be of type Function');
        return Object.defineProperty(M, J, { value: M, enumerable: false, writable: false, configurable: true }), M;
      }
      function M() {
        for (var _, D, $ = new Promise(function(m, S) {
          _ = m, D = S;
        }), B = [], x = 0; x < arguments.length; x++) B.push(arguments[x]);
        B.push(function(m, S) {
          m ? D(m) : _(S);
        });
        try {
          P.apply(this, B);
        } catch (m) {
          D(m);
        }
        return $;
      }
      return Object.setPrototypeOf(M, Object.getPrototypeOf(P)), J && Object.defineProperty(M, J, { value: M, enumerable: false, writable: false, configurable: true }), Object.defineProperties(M, t(P));
    }, e.promisify.custom = J;
    function oe(W, P) {
      if (!W) {
        var M = new Error("Promise was rejected with a falsy value");
        M.reason = W, W = M;
      }
      return P(W);
    }
    function ne(W) {
      if (typeof W != "function") throw new TypeError('The "original" argument must be of type Function');
      function P() {
        for (var M = [], _ = 0; _ < arguments.length; _++) M.push(arguments[_]);
        var D = M.pop();
        if (typeof D != "function") throw new TypeError("The last argument must be of type Function");
        var $ = this, B = function() {
          return D.apply($, arguments);
        };
        W.apply(this, M).then(function(x) {
          Oe.nextTick(B.bind(null, null, x));
        }, function(x) {
          Oe.nextTick(oe.bind(null, x, B));
        });
      }
      return Object.setPrototypeOf(P, Object.getPrototypeOf(W)), Object.defineProperties(P, t(W)), P;
    }
    e.callbackify = ne;
  }(Ur)), Ur;
}
var Co;
function ps() {
  if (Co) return xr;
  Co = 1;
  function e(o) {
    "@babel/helpers - typeof";
    return e = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(n) {
      return typeof n;
    } : function(n) {
      return n && typeof Symbol == "function" && n.constructor === Symbol && n !== Symbol.prototype ? "symbol" : typeof n;
    }, e(o);
  }
  function a(o, n, p) {
    return Object.defineProperty(o, "prototype", { writable: false }), o;
  }
  function t(o, n) {
    if (!(o instanceof n)) throw new TypeError("Cannot call a class as a function");
  }
  function s(o, n) {
    if (typeof n != "function" && n !== null) throw new TypeError("Super expression must either be null or a function");
    o.prototype = Object.create(n && n.prototype, { constructor: { value: o, writable: true, configurable: true } }), Object.defineProperty(o, "prototype", { writable: false }), n && h(o, n);
  }
  function h(o, n) {
    return h = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(w, F) {
      return w.__proto__ = F, w;
    }, h(o, n);
  }
  function c(o) {
    var n = v();
    return function() {
      var w = g(o), F;
      if (n) {
        var q = g(this).constructor;
        F = Reflect.construct(w, arguments, q);
      } else F = w.apply(this, arguments);
      return b(this, F);
    };
  }
  function b(o, n) {
    if (n && (e(n) === "object" || typeof n == "function")) return n;
    if (n !== void 0) throw new TypeError("Derived constructors may only return object or undefined");
    return d(o);
  }
  function d(o) {
    if (o === void 0) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
    return o;
  }
  function v() {
    if (typeof Reflect > "u" || !Reflect.construct || Reflect.construct.sham) return false;
    if (typeof Proxy == "function") return true;
    try {
      return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function() {
      })), true;
    } catch {
      return false;
    }
  }
  function g(o) {
    return g = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function(p) {
      return p.__proto__ || Object.getPrototypeOf(p);
    }, g(o);
  }
  var R = {}, L, I;
  function A(o, n, p) {
    p || (p = Error);
    function w(q, V, K) {
      return typeof n == "string" ? n : n(q, V, K);
    }
    var F = function(q) {
      s(K, q);
      var V = c(K);
      function K(ee, ue, k) {
        var de;
        return t(this, K), de = V.call(this, w(ee, ue, k)), de.code = o, de;
      }
      return a(K);
    }(p);
    R[o] = F;
  }
  function T(o, n) {
    if (Array.isArray(o)) {
      var p = o.length;
      return o = o.map(function(w) {
        return String(w);
      }), p > 2 ? "one of ".concat(n, " ").concat(o.slice(0, p - 1).join(", "), ", or ") + o[p - 1] : p === 2 ? "one of ".concat(n, " ").concat(o[0], " or ").concat(o[1]) : "of ".concat(n, " ").concat(o[0]);
    } else return "of ".concat(n, " ").concat(String(o));
  }
  function j(o, n, p) {
    return o.substr(0, n.length) === n;
  }
  function O(o, n, p) {
    return (p === void 0 || p > o.length) && (p = o.length), o.substring(p - n.length, p) === n;
  }
  function y(o, n, p) {
    return typeof p != "number" && (p = 0), p + n.length > o.length ? false : o.indexOf(n, p) !== -1;
  }
  return A("ERR_AMBIGUOUS_ARGUMENT", 'The "%s" argument is ambiguous. %s', TypeError), A("ERR_INVALID_ARG_TYPE", function(o, n, p) {
    L === void 0 && (L = Jn()), L(typeof o == "string", "'name' must be a string");
    var w;
    typeof n == "string" && j(n, "not ") ? (w = "must not be", n = n.replace(/^not /, "")) : w = "must be";
    var F;
    if (O(o, " argument")) F = "The ".concat(o, " ").concat(w, " ").concat(T(n, "type"));
    else {
      var q = y(o, ".") ? "property" : "argument";
      F = 'The "'.concat(o, '" ').concat(q, " ").concat(w, " ").concat(T(n, "type"));
    }
    return F += ". Received type ".concat(e(p)), F;
  }, TypeError), A("ERR_INVALID_ARG_VALUE", function(o, n) {
    var p = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : "is invalid";
    I === void 0 && (I = Ye());
    var w = I.inspect(n);
    return w.length > 128 && (w = "".concat(w.slice(0, 128), "...")), "The argument '".concat(o, "' ").concat(p, ". Received ").concat(w);
  }, TypeError), A("ERR_INVALID_RETURN_VALUE", function(o, n, p) {
    var w;
    return p && p.constructor && p.constructor.name ? w = "instance of ".concat(p.constructor.name) : w = "type ".concat(e(p)), "Expected ".concat(o, ' to be returned from the "').concat(n, '"') + " function but got ".concat(w, ".");
  }, TypeError), A("ERR_MISSING_ARGS", function() {
    for (var o = arguments.length, n = new Array(o), p = 0; p < o; p++) n[p] = arguments[p];
    L === void 0 && (L = Jn()), L(n.length > 0, "At least one arg needs to be specified");
    var w = "The ", F = n.length;
    switch (n = n.map(function(q) {
      return '"'.concat(q, '"');
    }), F) {
      case 1:
        w += "".concat(n[0], " argument");
        break;
      case 2:
        w += "".concat(n[0], " and ").concat(n[1], " arguments");
        break;
      default:
        w += n.slice(0, F - 1).join(", "), w += ", and ".concat(n[F - 1], " arguments");
        break;
    }
    return "".concat(w, " must be specified");
  }, TypeError), xr.codes = R, xr;
}
var sn, Mo;
function Nu() {
  if (Mo) return sn;
  Mo = 1;
  function e(re, J) {
    var oe = Object.keys(re);
    if (Object.getOwnPropertySymbols) {
      var ne = Object.getOwnPropertySymbols(re);
      J && (ne = ne.filter(function(W) {
        return Object.getOwnPropertyDescriptor(re, W).enumerable;
      })), oe.push.apply(oe, ne);
    }
    return oe;
  }
  function a(re) {
    for (var J = 1; J < arguments.length; J++) {
      var oe = arguments[J] != null ? arguments[J] : {};
      J % 2 ? e(Object(oe), true).forEach(function(ne) {
        t(re, ne, oe[ne]);
      }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(re, Object.getOwnPropertyDescriptors(oe)) : e(Object(oe)).forEach(function(ne) {
        Object.defineProperty(re, ne, Object.getOwnPropertyDescriptor(oe, ne));
      });
    }
    return re;
  }
  function t(re, J, oe) {
    return J = b(J), J in re ? Object.defineProperty(re, J, { value: oe, enumerable: true, configurable: true, writable: true }) : re[J] = oe, re;
  }
  function s(re, J) {
    if (!(re instanceof J)) throw new TypeError("Cannot call a class as a function");
  }
  function h(re, J) {
    for (var oe = 0; oe < J.length; oe++) {
      var ne = J[oe];
      ne.enumerable = ne.enumerable || false, ne.configurable = true, "value" in ne && (ne.writable = true), Object.defineProperty(re, b(ne.key), ne);
    }
  }
  function c(re, J, oe) {
    return J && h(re.prototype, J), Object.defineProperty(re, "prototype", { writable: false }), re;
  }
  function b(re) {
    var J = d(re, "string");
    return o(J) === "symbol" ? J : String(J);
  }
  function d(re, J) {
    if (o(re) !== "object" || re === null) return re;
    var oe = re[Symbol.toPrimitive];
    if (oe !== void 0) {
      var ne = oe.call(re, J);
      if (o(ne) !== "object") return ne;
      throw new TypeError("@@toPrimitive must return a primitive value.");
    }
    return String(re);
  }
  function v(re, J) {
    if (typeof J != "function" && J !== null) throw new TypeError("Super expression must either be null or a function");
    re.prototype = Object.create(J && J.prototype, { constructor: { value: re, writable: true, configurable: true } }), Object.defineProperty(re, "prototype", { writable: false }), J && O(re, J);
  }
  function g(re) {
    var J = T();
    return function() {
      var ne = y(re), W;
      if (J) {
        var P = y(this).constructor;
        W = Reflect.construct(ne, arguments, P);
      } else W = ne.apply(this, arguments);
      return R(this, W);
    };
  }
  function R(re, J) {
    if (J && (o(J) === "object" || typeof J == "function")) return J;
    if (J !== void 0) throw new TypeError("Derived constructors may only return object or undefined");
    return L(re);
  }
  function L(re) {
    if (re === void 0) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
    return re;
  }
  function I(re) {
    var J = typeof Map == "function" ? /* @__PURE__ */ new Map() : void 0;
    return I = function(ne) {
      if (ne === null || !j(ne)) return ne;
      if (typeof ne != "function") throw new TypeError("Super expression must either be null or a function");
      if (typeof J < "u") {
        if (J.has(ne)) return J.get(ne);
        J.set(ne, W);
      }
      function W() {
        return A(ne, arguments, y(this).constructor);
      }
      return W.prototype = Object.create(ne.prototype, { constructor: { value: W, enumerable: false, writable: true, configurable: true } }), O(W, ne);
    }, I(re);
  }
  function A(re, J, oe) {
    return T() ? A = Reflect.construct.bind() : A = function(W, P, M) {
      var _ = [null];
      _.push.apply(_, P);
      var D = Function.bind.apply(W, _), $ = new D();
      return M && O($, M.prototype), $;
    }, A.apply(null, arguments);
  }
  function T() {
    if (typeof Reflect > "u" || !Reflect.construct || Reflect.construct.sham) return false;
    if (typeof Proxy == "function") return true;
    try {
      return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function() {
      })), true;
    } catch {
      return false;
    }
  }
  function j(re) {
    return Function.toString.call(re).indexOf("[native code]") !== -1;
  }
  function O(re, J) {
    return O = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(ne, W) {
      return ne.__proto__ = W, ne;
    }, O(re, J);
  }
  function y(re) {
    return y = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function(oe) {
      return oe.__proto__ || Object.getPrototypeOf(oe);
    }, y(re);
  }
  function o(re) {
    "@babel/helpers - typeof";
    return o = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(J) {
      return typeof J;
    } : function(J) {
      return J && typeof Symbol == "function" && J.constructor === Symbol && J !== Symbol.prototype ? "symbol" : typeof J;
    }, o(re);
  }
  var n = Ye(), p = n.inspect, w = ps(), F = w.codes.ERR_INVALID_ARG_TYPE;
  function q(re, J, oe) {
    return (oe === void 0 || oe > re.length) && (oe = re.length), re.substring(oe - J.length, oe) === J;
  }
  function V(re, J) {
    if (J = Math.floor(J), re.length == 0 || J == 0) return "";
    var oe = re.length * J;
    for (J = Math.floor(Math.log(J) / Math.log(2)); J; ) re += re, J--;
    return re += re.substring(0, oe - re.length), re;
  }
  var K = "", ee = "", ue = "", k = "", de = { deepStrictEqual: "Expected values to be strictly deep-equal:", strictEqual: "Expected values to be strictly equal:", strictEqualObject: 'Expected "actual" to be reference-equal to "expected":', deepEqual: "Expected values to be loosely deep-equal:", equal: "Expected values to be loosely equal:", notDeepStrictEqual: 'Expected "actual" not to be strictly deep-equal to:', notStrictEqual: 'Expected "actual" to be strictly unequal to:', notStrictEqualObject: 'Expected "actual" not to be reference-equal to "expected":', notDeepEqual: 'Expected "actual" not to be loosely deep-equal to:', notEqual: 'Expected "actual" to be loosely unequal to:', notIdentical: "Values identical but not reference-equal:" }, be = 10;
  function Ee(re) {
    var J = Object.keys(re), oe = Object.create(Object.getPrototypeOf(re));
    return J.forEach(function(ne) {
      oe[ne] = re[ne];
    }), Object.defineProperty(oe, "message", { value: re.message }), oe;
  }
  function _e(re) {
    return p(re, { compact: false, customInspect: false, depth: 1e3, maxArrayLength: 1 / 0, showHidden: false, breakLength: 1 / 0, showProxy: false, sorted: true, getters: true });
  }
  function Fe(re, J, oe) {
    var ne = "", W = "", P = 0, M = "", _ = false, D = _e(re), $ = D.split(`
`), B = _e(J).split(`
`), x = 0, m = "";
    if (oe === "strictEqual" && o(re) === "object" && o(J) === "object" && re !== null && J !== null && (oe = "strictEqualObject"), $.length === 1 && B.length === 1 && $[0] !== B[0]) {
      var S = $[0].length + B[0].length;
      if (S <= be) {
        if ((o(re) !== "object" || re === null) && (o(J) !== "object" || J === null) && (re !== 0 || J !== 0)) return "".concat(de[oe], `

`) + "".concat($[0], " !== ").concat(B[0], `
`);
      } else if (oe !== "strictEqualObject") {
        var Y = Oe.stderr && Oe.stderr.isTTY ? Oe.stderr.columns : 80;
        if (S < Y) {
          for (; $[0][x] === B[0][x]; ) x++;
          x > 2 && (m = `
  `.concat(V(" ", x), "^"), x = 0);
        }
      }
    }
    for (var ie = $[$.length - 1], ge = B[B.length - 1]; ie === ge && (x++ < 2 ? M = `
  `.concat(ie).concat(M) : ne = ie, $.pop(), B.pop(), !($.length === 0 || B.length === 0)); ) ie = $[$.length - 1], ge = B[B.length - 1];
    var ce = Math.max($.length, B.length);
    if (ce === 0) {
      var me = D.split(`
`);
      if (me.length > 30) for (me[26] = "".concat(K, "...").concat(k); me.length > 27; ) me.pop();
      return "".concat(de.notIdentical, `

`).concat(me.join(`
`), `
`);
    }
    x > 3 && (M = `
`.concat(K, "...").concat(k).concat(M), _ = true), ne !== "" && (M = `
  `.concat(ne).concat(M), ne = "");
    var Ie = 0, te = de[oe] + `
`.concat(ee, "+ actual").concat(k, " ").concat(ue, "- expected").concat(k), Le = " ".concat(K, "...").concat(k, " Lines skipped");
    for (x = 0; x < ce; x++) {
      var De = x - P;
      if ($.length < x + 1) De > 1 && x > 2 && (De > 4 ? (W += `
`.concat(K, "...").concat(k), _ = true) : De > 3 && (W += `
  `.concat(B[x - 2]), Ie++), W += `
  `.concat(B[x - 1]), Ie++), P = x, ne += `
`.concat(ue, "-").concat(k, " ").concat(B[x]), Ie++;
      else if (B.length < x + 1) De > 1 && x > 2 && (De > 4 ? (W += `
`.concat(K, "...").concat(k), _ = true) : De > 3 && (W += `
  `.concat($[x - 2]), Ie++), W += `
  `.concat($[x - 1]), Ie++), P = x, W += `
`.concat(ee, "+").concat(k, " ").concat($[x]), Ie++;
      else {
        var Ae = B[x], Ne = $[x], H = Ne !== Ae && (!q(Ne, ",") || Ne.slice(0, -1) !== Ae);
        H && q(Ae, ",") && Ae.slice(0, -1) === Ne && (H = false, Ne += ","), H ? (De > 1 && x > 2 && (De > 4 ? (W += `
`.concat(K, "...").concat(k), _ = true) : De > 3 && (W += `
  `.concat($[x - 2]), Ie++), W += `
  `.concat($[x - 1]), Ie++), P = x, W += `
`.concat(ee, "+").concat(k, " ").concat(Ne), ne += `
`.concat(ue, "-").concat(k, " ").concat(Ae), Ie += 2) : (W += ne, ne = "", (De === 1 || x === 0) && (W += `
  `.concat(Ne), Ie++));
      }
      if (Ie > 20 && x < ce - 2) return "".concat(te).concat(Le, `
`).concat(W, `
`).concat(K, "...").concat(k).concat(ne, `
`) + "".concat(K, "...").concat(k);
    }
    return "".concat(te).concat(_ ? Le : "", `
`).concat(W).concat(ne).concat(M).concat(m);
  }
  var ye = function(re, J) {
    v(ne, re);
    var oe = g(ne);
    function ne(W) {
      var P;
      if (s(this, ne), o(W) !== "object" || W === null) throw new F("options", "Object", W);
      var M = W.message, _ = W.operator, D = W.stackStartFn, $ = W.actual, B = W.expected, x = Error.stackTraceLimit;
      if (Error.stackTraceLimit = 0, M != null) P = oe.call(this, String(M));
      else if (Oe.stderr && Oe.stderr.isTTY && (Oe.stderr && Oe.stderr.getColorDepth && Oe.stderr.getColorDepth() !== 1 ? (K = "\x1B[34m", ee = "\x1B[32m", k = "\x1B[39m", ue = "\x1B[31m") : (K = "", ee = "", k = "", ue = "")), o($) === "object" && $ !== null && o(B) === "object" && B !== null && "stack" in $ && $ instanceof Error && "stack" in B && B instanceof Error && ($ = Ee($), B = Ee(B)), _ === "deepStrictEqual" || _ === "strictEqual") P = oe.call(this, Fe($, B, _));
      else if (_ === "notDeepStrictEqual" || _ === "notStrictEqual") {
        var m = de[_], S = _e($).split(`
`);
        if (_ === "notStrictEqual" && o($) === "object" && $ !== null && (m = de.notStrictEqualObject), S.length > 30) for (S[26] = "".concat(K, "...").concat(k); S.length > 27; ) S.pop();
        S.length === 1 ? P = oe.call(this, "".concat(m, " ").concat(S[0])) : P = oe.call(this, "".concat(m, `

`).concat(S.join(`
`), `
`));
      } else {
        var Y = _e($), ie = "", ge = de[_];
        _ === "notDeepEqual" || _ === "notEqual" ? (Y = "".concat(de[_], `

`).concat(Y), Y.length > 1024 && (Y = "".concat(Y.slice(0, 1021), "..."))) : (ie = "".concat(_e(B)), Y.length > 512 && (Y = "".concat(Y.slice(0, 509), "...")), ie.length > 512 && (ie = "".concat(ie.slice(0, 509), "...")), _ === "deepEqual" || _ === "equal" ? Y = "".concat(ge, `

`).concat(Y, `

should equal

`) : ie = " ".concat(_, " ").concat(ie)), P = oe.call(this, "".concat(Y).concat(ie));
      }
      return Error.stackTraceLimit = x, P.generatedMessage = !M, Object.defineProperty(L(P), "name", { value: "AssertionError [ERR_ASSERTION]", enumerable: false, writable: true, configurable: true }), P.code = "ERR_ASSERTION", P.actual = $, P.expected = B, P.operator = _, Error.captureStackTrace && Error.captureStackTrace(L(P), D), P.stack, P.name = "AssertionError", R(P);
    }
    return c(ne, [{ key: "toString", value: function() {
      return "".concat(this.name, " [").concat(this.code, "]: ").concat(this.message);
    } }, { key: J, value: function(P, M) {
      return p(this, a(a({}, M), {}, { customInspect: false, depth: 0 }));
    } }]), ne;
  }(I(Error), p.custom);
  return sn = ye, sn;
}
var fn, jo;
function ys() {
  if (jo) return fn;
  jo = 1;
  var e = Object.prototype.toString;
  return fn = function(t) {
    var s = e.call(t), h = s === "[object Arguments]";
    return h || (h = s !== "[object Array]" && t !== null && typeof t == "object" && typeof t.length == "number" && t.length >= 0 && e.call(t.callee) === "[object Function]"), h;
  }, fn;
}
var un, qo;
function Bu() {
  if (qo) return un;
  qo = 1;
  var e;
  if (!Object.keys) {
    var a = Object.prototype.hasOwnProperty, t = Object.prototype.toString, s = ys(), h = Object.prototype.propertyIsEnumerable, c = !h.call({ toString: null }, "toString"), b = h.call(function() {
    }, "prototype"), d = ["toString", "toLocaleString", "valueOf", "hasOwnProperty", "isPrototypeOf", "propertyIsEnumerable", "constructor"], v = function(I) {
      var A = I.constructor;
      return A && A.prototype === I;
    }, g = { $applicationCache: true, $console: true, $external: true, $frame: true, $frameElement: true, $frames: true, $innerHeight: true, $innerWidth: true, $onmozfullscreenchange: true, $onmozfullscreenerror: true, $outerHeight: true, $outerWidth: true, $pageXOffset: true, $pageYOffset: true, $parent: true, $scrollLeft: true, $scrollTop: true, $scrollX: true, $scrollY: true, $self: true, $webkitIndexedDB: true, $webkitStorageInfo: true, $window: true }, R = function() {
      if (typeof window > "u") return false;
      for (var I in window) try {
        if (!g["$" + I] && a.call(window, I) && window[I] !== null && typeof window[I] == "object") try {
          v(window[I]);
        } catch {
          return true;
        }
      } catch {
        return true;
      }
      return false;
    }(), L = function(I) {
      if (typeof window > "u" || !R) return v(I);
      try {
        return v(I);
      } catch {
        return false;
      }
    };
    e = function(A) {
      var T = A !== null && typeof A == "object", j = t.call(A) === "[object Function]", O = s(A), y = T && t.call(A) === "[object String]", o = [];
      if (!T && !j && !O) throw new TypeError("Object.keys called on a non-object");
      var n = b && j;
      if (y && A.length > 0 && !a.call(A, 0)) for (var p = 0; p < A.length; ++p) o.push(String(p));
      if (O && A.length > 0) for (var w = 0; w < A.length; ++w) o.push(String(w));
      else for (var F in A) !(n && F === "prototype") && a.call(A, F) && o.push(String(F));
      if (c) for (var q = L(A), V = 0; V < d.length; ++V) !(q && d[V] === "constructor") && a.call(A, d[V]) && o.push(d[V]);
      return o;
    };
  }
  return un = e, un;
}
var ln, ko;
function gs() {
  if (ko) return ln;
  ko = 1;
  var e = Array.prototype.slice, a = ys(), t = Object.keys, s = t ? function(b) {
    return t(b);
  } : Bu(), h = Object.keys;
  return s.shim = function() {
    if (Object.keys) {
      var b = function() {
        var d = Object.keys(arguments);
        return d && d.length === arguments.length;
      }(1, 2);
      b || (Object.keys = function(v) {
        return a(v) ? h(e.call(v)) : h(v);
      });
    } else Object.keys = s;
    return Object.keys || s;
  }, ln = s, ln;
}
var cn, xo;
function Du() {
  if (xo) return cn;
  xo = 1;
  var e = gs(), a = ti()(), t = Je(), s = ei(), h = t("Array.prototype.push"), c = t("Object.prototype.propertyIsEnumerable"), b = a ? s.getOwnPropertySymbols : null;
  return cn = function(v, g) {
    if (v == null) throw new TypeError("target must be an object");
    var R = s(v);
    if (arguments.length === 1) return R;
    for (var L = 1; L < arguments.length; ++L) {
      var I = s(arguments[L]), A = e(I), T = a && (s.getOwnPropertySymbols || b);
      if (T) for (var j = T(I), O = 0; O < j.length; ++O) {
        var y = j[O];
        c(I, y) && h(A, y);
      }
      for (var o = 0; o < A.length; ++o) {
        var n = A[o];
        if (c(I, n)) {
          var p = I[n];
          R[n] = p;
        }
      }
    }
    return R;
  }, cn;
}
var hn, Uo;
function Lu() {
  if (Uo) return hn;
  Uo = 1;
  var e = Du(), a = function() {
    if (!Object.assign) return false;
    for (var s = "abcdefghijklmnopqrst", h = s.split(""), c = {}, b = 0; b < h.length; ++b) c[h[b]] = h[b];
    var d = Object.assign({}, c), v = "";
    for (var g in d) v += g;
    return s !== v;
  }, t = function() {
    if (!Object.assign || !Object.preventExtensions) return false;
    var s = Object.preventExtensions({ 1: 2 });
    try {
      Object.assign(s, "xy");
    } catch {
      return s[1] === "y";
    }
    return false;
  };
  return hn = function() {
    return !Object.assign || a() || t() ? e : Object.assign;
  }, hn;
}
var dn, $o;
function ms() {
  if ($o) return dn;
  $o = 1;
  var e = function(a) {
    return a !== a;
  };
  return dn = function(t, s) {
    return t === 0 && s === 0 ? 1 / t === 1 / s : !!(t === s || e(t) && e(s));
  }, dn;
}
var pn, Wo;
function si() {
  if (Wo) return pn;
  Wo = 1;
  var e = ms();
  return pn = function() {
    return typeof Object.is == "function" ? Object.is : e;
  }, pn;
}
var yn, Vo;
function Cu() {
  if (Vo) return yn;
  Vo = 1;
  var e = wt(), a = qt(), t = a(e("String.prototype.indexOf"));
  return yn = function(h, c) {
    var b = e(h, !!c);
    return typeof b == "function" && t(h, ".prototype.") > -1 ? a(b) : b;
  }, yn;
}
var gn, Ho;
function kt() {
  if (Ho) return gn;
  Ho = 1;
  var e = gs(), a = typeof Symbol == "function" && typeof Symbol("foo") == "symbol", t = Object.prototype.toString, s = Array.prototype.concat, h = cs(), c = function(g) {
    return typeof g == "function" && t.call(g) === "[object Function]";
  }, b = hs()(), d = function(g, R, L, I) {
    if (R in g) {
      if (I === true) {
        if (g[R] === L) return;
      } else if (!c(I) || !I()) return;
    }
    b ? h(g, R, L, true) : h(g, R, L);
  }, v = function(g, R) {
    var L = arguments.length > 2 ? arguments[2] : {}, I = e(R);
    a && (I = s.call(I, Object.getOwnPropertySymbols(R)));
    for (var A = 0; A < I.length; A += 1) d(g, I[A], R[I[A]], L[I[A]]);
  };
  return v.supportsDescriptors = !!b, gn = v, gn;
}
var mn, Go;
function Mu() {
  if (Go) return mn;
  Go = 1;
  var e = si(), a = kt();
  return mn = function() {
    var s = e();
    return a(Object, { is: s }, { is: function() {
      return Object.is !== s;
    } }), s;
  }, mn;
}
var vn, Yo;
function ju() {
  if (Yo) return vn;
  Yo = 1;
  var e = kt(), a = qt(), t = ms(), s = si(), h = Mu(), c = a(s(), Object);
  return e(c, { getPolyfill: s, implementation: t, shim: h }), vn = c, vn;
}
var bn, zo;
function vs() {
  return zo || (zo = 1, bn = function(a) {
    return a !== a;
  }), bn;
}
var wn, Ko;
function bs() {
  if (Ko) return wn;
  Ko = 1;
  var e = vs();
  return wn = function() {
    return Number.isNaN && Number.isNaN(NaN) && !Number.isNaN("a") ? Number.isNaN : e;
  }, wn;
}
var En, Jo;
function qu() {
  if (Jo) return En;
  Jo = 1;
  var e = kt(), a = bs();
  return En = function() {
    var s = a();
    return e(Number, { isNaN: s }, { isNaN: function() {
      return Number.isNaN !== s;
    } }), s;
  }, En;
}
var _n, Xo;
function ku() {
  if (Xo) return _n;
  Xo = 1;
  var e = qt(), a = kt(), t = vs(), s = bs(), h = qu(), c = e(s(), Number);
  return a(c, { getPolyfill: s, implementation: t, shim: h }), _n = c, _n;
}
var Sn, Qo;
function xu() {
  if (Qo) return Sn;
  Qo = 1;
  function e(H, X) {
    return c(H) || h(H, X) || t(H, X) || a();
  }
  function a() {
    throw new TypeError(`Invalid attempt to destructure non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
  }
  function t(H, X) {
    if (H) {
      if (typeof H == "string") return s(H, X);
      var he = Object.prototype.toString.call(H).slice(8, -1);
      if (he === "Object" && H.constructor && (he = H.constructor.name), he === "Map" || he === "Set") return Array.from(H);
      if (he === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(he)) return s(H, X);
    }
  }
  function s(H, X) {
    (X == null || X > H.length) && (X = H.length);
    for (var he = 0, ve = new Array(X); he < X; he++) ve[he] = H[he];
    return ve;
  }
  function h(H, X) {
    var he = H == null ? null : typeof Symbol < "u" && H[Symbol.iterator] || H["@@iterator"];
    if (he != null) {
      var ve, pe, Se, we, Be = [], Te = true, ke = false;
      try {
        if (Se = (he = he.call(H)).next, X !== 0) for (; !(Te = (ve = Se.call(he)).done) && (Be.push(ve.value), Be.length !== X); Te = true) ;
      } catch (fe) {
        ke = true, pe = fe;
      } finally {
        try {
          if (!Te && he.return != null && (we = he.return(), Object(we) !== we)) return;
        } finally {
          if (ke) throw pe;
        }
      }
      return Be;
    }
  }
  function c(H) {
    if (Array.isArray(H)) return H;
  }
  function b(H) {
    "@babel/helpers - typeof";
    return b = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(X) {
      return typeof X;
    } : function(X) {
      return X && typeof Symbol == "function" && X.constructor === Symbol && X !== Symbol.prototype ? "symbol" : typeof X;
    }, b(H);
  }
  var d = /a/g.flags !== void 0, v = function(X) {
    var he = [];
    return X.forEach(function(ve) {
      return he.push(ve);
    }), he;
  }, g = function(X) {
    var he = [];
    return X.forEach(function(ve, pe) {
      return he.push([pe, ve]);
    }), he;
  }, R = Object.is ? Object.is : ju(), L = Object.getOwnPropertySymbols ? Object.getOwnPropertySymbols : function() {
    return [];
  }, I = Number.isNaN ? Number.isNaN : ku();
  function A(H) {
    return H.call.bind(H);
  }
  var T = A(Object.prototype.hasOwnProperty), j = A(Object.prototype.propertyIsEnumerable), O = A(Object.prototype.toString), y = Ye().types, o = y.isAnyArrayBuffer, n = y.isArrayBufferView, p = y.isDate, w = y.isMap, F = y.isRegExp, q = y.isSet, V = y.isNativeError, K = y.isBoxedPrimitive, ee = y.isNumberObject, ue = y.isStringObject, k = y.isBooleanObject, de = y.isBigIntObject, be = y.isSymbolObject, Ee = y.isFloat32Array, _e = y.isFloat64Array;
  function Fe(H) {
    if (H.length === 0 || H.length > 10) return true;
    for (var X = 0; X < H.length; X++) {
      var he = H.charCodeAt(X);
      if (he < 48 || he > 57) return true;
    }
    return H.length === 10 && H >= Math.pow(2, 32);
  }
  function ye(H) {
    return Object.keys(H).filter(Fe).concat(L(H).filter(Object.prototype.propertyIsEnumerable.bind(H)));
  }
  /*!
  * The buffer module from node.js, for the browser.
  *
  * @author   Feross Aboukhadijeh <feross@feross.org> <http://feross.org>
  * @license  MIT
  */
  function re(H, X) {
    if (H === X) return 0;
    for (var he = H.length, ve = X.length, pe = 0, Se = Math.min(he, ve); pe < Se; ++pe) if (H[pe] !== X[pe]) {
      he = H[pe], ve = X[pe];
      break;
    }
    return he < ve ? -1 : ve < he ? 1 : 0;
  }
  var J = true, oe = false, ne = 0, W = 1, P = 2, M = 3;
  function _(H, X) {
    return d ? H.source === X.source && H.flags === X.flags : RegExp.prototype.toString.call(H) === RegExp.prototype.toString.call(X);
  }
  function D(H, X) {
    if (H.byteLength !== X.byteLength) return false;
    for (var he = 0; he < H.byteLength; he++) if (H[he] !== X[he]) return false;
    return true;
  }
  function $(H, X) {
    return H.byteLength !== X.byteLength ? false : re(new Uint8Array(H.buffer, H.byteOffset, H.byteLength), new Uint8Array(X.buffer, X.byteOffset, X.byteLength)) === 0;
  }
  function B(H, X) {
    return H.byteLength === X.byteLength && re(new Uint8Array(H), new Uint8Array(X)) === 0;
  }
  function x(H, X) {
    return ee(H) ? ee(X) && R(Number.prototype.valueOf.call(H), Number.prototype.valueOf.call(X)) : ue(H) ? ue(X) && String.prototype.valueOf.call(H) === String.prototype.valueOf.call(X) : k(H) ? k(X) && Boolean.prototype.valueOf.call(H) === Boolean.prototype.valueOf.call(X) : de(H) ? de(X) && BigInt.prototype.valueOf.call(H) === BigInt.prototype.valueOf.call(X) : be(X) && Symbol.prototype.valueOf.call(H) === Symbol.prototype.valueOf.call(X);
  }
  function m(H, X, he, ve) {
    if (H === X) return H !== 0 ? true : he ? R(H, X) : true;
    if (he) {
      if (b(H) !== "object") return typeof H == "number" && I(H) && I(X);
      if (b(X) !== "object" || H === null || X === null || Object.getPrototypeOf(H) !== Object.getPrototypeOf(X)) return false;
    } else {
      if (H === null || b(H) !== "object") return X === null || b(X) !== "object" ? H == X : false;
      if (X === null || b(X) !== "object") return false;
    }
    var pe = O(H), Se = O(X);
    if (pe !== Se) return false;
    if (Array.isArray(H)) {
      if (H.length !== X.length) return false;
      var we = ye(H), Be = ye(X);
      return we.length !== Be.length ? false : Y(H, X, he, ve, W, we);
    }
    if (pe === "[object Object]" && (!w(H) && w(X) || !q(H) && q(X))) return false;
    if (p(H)) {
      if (!p(X) || Date.prototype.getTime.call(H) !== Date.prototype.getTime.call(X)) return false;
    } else if (F(H)) {
      if (!F(X) || !_(H, X)) return false;
    } else if (V(H) || H instanceof Error) {
      if (H.message !== X.message || H.name !== X.name) return false;
    } else if (n(H)) {
      if (!he && (Ee(H) || _e(H))) {
        if (!D(H, X)) return false;
      } else if (!$(H, X)) return false;
      var Te = ye(H), ke = ye(X);
      return Te.length !== ke.length ? false : Y(H, X, he, ve, ne, Te);
    } else {
      if (q(H)) return !q(X) || H.size !== X.size ? false : Y(H, X, he, ve, P);
      if (w(H)) return !w(X) || H.size !== X.size ? false : Y(H, X, he, ve, M);
      if (o(H)) {
        if (!B(H, X)) return false;
      } else if (K(H) && !x(H, X)) return false;
    }
    return Y(H, X, he, ve, ne);
  }
  function S(H, X) {
    return X.filter(function(he) {
      return j(H, he);
    });
  }
  function Y(H, X, he, ve, pe, Se) {
    if (arguments.length === 5) {
      Se = Object.keys(H);
      var we = Object.keys(X);
      if (Se.length !== we.length) return false;
    }
    for (var Be = 0; Be < Se.length; Be++) if (!T(X, Se[Be])) return false;
    if (he && arguments.length === 5) {
      var Te = L(H);
      if (Te.length !== 0) {
        var ke = 0;
        for (Be = 0; Be < Te.length; Be++) {
          var fe = Te[Be];
          if (j(H, fe)) {
            if (!j(X, fe)) return false;
            Se.push(fe), ke++;
          } else if (j(X, fe)) return false;
        }
        var u = L(X);
        if (Te.length !== u.length && S(X, u).length !== ke) return false;
      } else {
        var r = L(X);
        if (r.length !== 0 && S(X, r).length !== 0) return false;
      }
    }
    if (Se.length === 0 && (pe === ne || pe === W && H.length === 0 || H.size === 0)) return true;
    if (ve === void 0) ve = { val1: /* @__PURE__ */ new Map(), val2: /* @__PURE__ */ new Map(), position: 0 };
    else {
      var l = ve.val1.get(H);
      if (l !== void 0) {
        var N = ve.val2.get(X);
        if (N !== void 0) return l === N;
      }
      ve.position++;
    }
    ve.val1.set(H, ve.position), ve.val2.set(X, ve.position);
    var U = De(H, X, he, Se, ve, pe);
    return ve.val1.delete(H), ve.val2.delete(X), U;
  }
  function ie(H, X, he, ve) {
    for (var pe = v(H), Se = 0; Se < pe.length; Se++) {
      var we = pe[Se];
      if (m(X, we, he, ve)) return H.delete(we), true;
    }
    return false;
  }
  function ge(H) {
    switch (b(H)) {
      case "undefined":
        return null;
      case "object":
        return;
      case "symbol":
        return false;
      case "string":
        H = +H;
      case "number":
        if (I(H)) return false;
    }
    return true;
  }
  function ce(H, X, he) {
    var ve = ge(he);
    return ve ?? (X.has(ve) && !H.has(ve));
  }
  function me(H, X, he, ve, pe) {
    var Se = ge(he);
    if (Se != null) return Se;
    var we = X.get(Se);
    return we === void 0 && !X.has(Se) || !m(ve, we, false, pe) ? false : !H.has(Se) && m(ve, we, false, pe);
  }
  function Ie(H, X, he, ve) {
    for (var pe = null, Se = v(H), we = 0; we < Se.length; we++) {
      var Be = Se[we];
      if (b(Be) === "object" && Be !== null) pe === null && (pe = /* @__PURE__ */ new Set()), pe.add(Be);
      else if (!X.has(Be)) {
        if (he || !ce(H, X, Be)) return false;
        pe === null && (pe = /* @__PURE__ */ new Set()), pe.add(Be);
      }
    }
    if (pe !== null) {
      for (var Te = v(X), ke = 0; ke < Te.length; ke++) {
        var fe = Te[ke];
        if (b(fe) === "object" && fe !== null) {
          if (!ie(pe, fe, he, ve)) return false;
        } else if (!he && !H.has(fe) && !ie(pe, fe, he, ve)) return false;
      }
      return pe.size === 0;
    }
    return true;
  }
  function te(H, X, he, ve, pe, Se) {
    for (var we = v(H), Be = 0; Be < we.length; Be++) {
      var Te = we[Be];
      if (m(he, Te, pe, Se) && m(ve, X.get(Te), pe, Se)) return H.delete(Te), true;
    }
    return false;
  }
  function Le(H, X, he, ve) {
    for (var pe = null, Se = g(H), we = 0; we < Se.length; we++) {
      var Be = e(Se[we], 2), Te = Be[0], ke = Be[1];
      if (b(Te) === "object" && Te !== null) pe === null && (pe = /* @__PURE__ */ new Set()), pe.add(Te);
      else {
        var fe = X.get(Te);
        if (fe === void 0 && !X.has(Te) || !m(ke, fe, he, ve)) {
          if (he || !me(H, X, Te, ke, ve)) return false;
          pe === null && (pe = /* @__PURE__ */ new Set()), pe.add(Te);
        }
      }
    }
    if (pe !== null) {
      for (var u = g(X), r = 0; r < u.length; r++) {
        var l = e(u[r], 2), N = l[0], U = l[1];
        if (b(N) === "object" && N !== null) {
          if (!te(pe, H, N, U, he, ve)) return false;
        } else if (!he && (!H.has(N) || !m(H.get(N), U, false, ve)) && !te(pe, H, N, U, false, ve)) return false;
      }
      return pe.size === 0;
    }
    return true;
  }
  function De(H, X, he, ve, pe, Se) {
    var we = 0;
    if (Se === P) {
      if (!Ie(H, X, he, pe)) return false;
    } else if (Se === M) {
      if (!Le(H, X, he, pe)) return false;
    } else if (Se === W) for (; we < H.length; we++) if (T(H, we)) {
      if (!T(X, we) || !m(H[we], X[we], he, pe)) return false;
    } else {
      if (T(X, we)) return false;
      for (var Be = Object.keys(H); we < Be.length; we++) {
        var Te = Be[we];
        if (!T(X, Te) || !m(H[Te], X[Te], he, pe)) return false;
      }
      return Be.length === Object.keys(X).length;
    }
    for (we = 0; we < ve.length; we++) {
      var ke = ve[we];
      if (!m(H[ke], X[ke], he, pe)) return false;
    }
    return true;
  }
  function Ae(H, X) {
    return m(H, X, oe);
  }
  function Ne(H, X) {
    return m(H, X, J);
  }
  return Sn = { isDeepEqual: Ae, isDeepStrictEqual: Ne }, Sn;
}
var Zo;
function Jn() {
  if (Zo) return kr.exports;
  Zo = 1;
  function e(P) {
    "@babel/helpers - typeof";
    return e = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(M) {
      return typeof M;
    } : function(M) {
      return M && typeof Symbol == "function" && M.constructor === Symbol && M !== Symbol.prototype ? "symbol" : typeof M;
    }, e(P);
  }
  function a(P, M, _) {
    return Object.defineProperty(P, "prototype", { writable: false }), P;
  }
  function t(P, M) {
    if (!(P instanceof M)) throw new TypeError("Cannot call a class as a function");
  }
  var s = ps(), h = s.codes, c = h.ERR_AMBIGUOUS_ARGUMENT, b = h.ERR_INVALID_ARG_TYPE, d = h.ERR_INVALID_ARG_VALUE, v = h.ERR_INVALID_RETURN_VALUE, g = h.ERR_MISSING_ARGS, R = Nu(), L = Ye(), I = L.inspect, A = Ye().types, T = A.isPromise, j = A.isRegExp, O = Lu()(), y = si()(), o = Cu()("RegExp.prototype.test"), n, p;
  function w() {
    var P = xu();
    n = P.isDeepEqual, p = P.isDeepStrictEqual;
  }
  var F = false, q = kr.exports = k, V = {};
  function K(P) {
    throw P.message instanceof Error ? P.message : new R(P);
  }
  function ee(P, M, _, D, $) {
    var B = arguments.length, x;
    if (B === 0) x = "Failed";
    else if (B === 1) _ = P, P = void 0;
    else {
      if (F === false) {
        F = true;
        var m = Oe.emitWarning ? Oe.emitWarning : console.warn.bind(console);
        m("assert.fail() with more than one argument is deprecated. Please use assert.strictEqual() instead or only pass a message.", "DeprecationWarning", "DEP0094");
      }
      B === 2 && (D = "!=");
    }
    if (_ instanceof Error) throw _;
    var S = { actual: P, expected: M, operator: D === void 0 ? "fail" : D, stackStartFn: $ || ee };
    _ !== void 0 && (S.message = _);
    var Y = new R(S);
    throw x && (Y.message = x, Y.generatedMessage = true), Y;
  }
  q.fail = ee, q.AssertionError = R;
  function ue(P, M, _, D) {
    if (!_) {
      var $ = false;
      if (M === 0) $ = true, D = "No value argument passed to `assert.ok()`";
      else if (D instanceof Error) throw D;
      var B = new R({ actual: _, expected: true, message: D, operator: "==", stackStartFn: P });
      throw B.generatedMessage = $, B;
    }
  }
  function k() {
    for (var P = arguments.length, M = new Array(P), _ = 0; _ < P; _++) M[_] = arguments[_];
    ue.apply(void 0, [k, M.length].concat(M));
  }
  q.ok = k, q.equal = function P(M, _, D) {
    if (arguments.length < 2) throw new g("actual", "expected");
    M != _ && K({ actual: M, expected: _, message: D, operator: "==", stackStartFn: P });
  }, q.notEqual = function P(M, _, D) {
    if (arguments.length < 2) throw new g("actual", "expected");
    M == _ && K({ actual: M, expected: _, message: D, operator: "!=", stackStartFn: P });
  }, q.deepEqual = function P(M, _, D) {
    if (arguments.length < 2) throw new g("actual", "expected");
    n === void 0 && w(), n(M, _) || K({ actual: M, expected: _, message: D, operator: "deepEqual", stackStartFn: P });
  }, q.notDeepEqual = function P(M, _, D) {
    if (arguments.length < 2) throw new g("actual", "expected");
    n === void 0 && w(), n(M, _) && K({ actual: M, expected: _, message: D, operator: "notDeepEqual", stackStartFn: P });
  }, q.deepStrictEqual = function P(M, _, D) {
    if (arguments.length < 2) throw new g("actual", "expected");
    n === void 0 && w(), p(M, _) || K({ actual: M, expected: _, message: D, operator: "deepStrictEqual", stackStartFn: P });
  }, q.notDeepStrictEqual = de;
  function de(P, M, _) {
    if (arguments.length < 2) throw new g("actual", "expected");
    n === void 0 && w(), p(P, M) && K({ actual: P, expected: M, message: _, operator: "notDeepStrictEqual", stackStartFn: de });
  }
  q.strictEqual = function P(M, _, D) {
    if (arguments.length < 2) throw new g("actual", "expected");
    y(M, _) || K({ actual: M, expected: _, message: D, operator: "strictEqual", stackStartFn: P });
  }, q.notStrictEqual = function P(M, _, D) {
    if (arguments.length < 2) throw new g("actual", "expected");
    y(M, _) && K({ actual: M, expected: _, message: D, operator: "notStrictEqual", stackStartFn: P });
  };
  var be = a(function P(M, _, D) {
    var $ = this;
    t(this, P), _.forEach(function(B) {
      B in M && (D !== void 0 && typeof D[B] == "string" && j(M[B]) && o(M[B], D[B]) ? $[B] = D[B] : $[B] = M[B]);
    });
  });
  function Ee(P, M, _, D, $, B) {
    if (!(_ in P) || !p(P[_], M[_])) {
      if (!D) {
        var x = new be(P, $), m = new be(M, $, P), S = new R({ actual: x, expected: m, operator: "deepStrictEqual", stackStartFn: B });
        throw S.actual = P, S.expected = M, S.operator = B.name, S;
      }
      K({ actual: P, expected: M, message: D, operator: B.name, stackStartFn: B });
    }
  }
  function _e(P, M, _, D) {
    if (typeof M != "function") {
      if (j(M)) return o(M, P);
      if (arguments.length === 2) throw new b("expected", ["Function", "RegExp"], M);
      if (e(P) !== "object" || P === null) {
        var $ = new R({ actual: P, expected: M, message: _, operator: "deepStrictEqual", stackStartFn: D });
        throw $.operator = D.name, $;
      }
      var B = Object.keys(M);
      if (M instanceof Error) B.push("name", "message");
      else if (B.length === 0) throw new d("error", M, "may not be an empty object");
      return n === void 0 && w(), B.forEach(function(x) {
        typeof P[x] == "string" && j(M[x]) && o(M[x], P[x]) || Ee(P, M, x, _, B, D);
      }), true;
    }
    return M.prototype !== void 0 && P instanceof M ? true : Error.isPrototypeOf(M) ? false : M.call({}, P) === true;
  }
  function Fe(P) {
    if (typeof P != "function") throw new b("fn", "Function", P);
    try {
      P();
    } catch (M) {
      return M;
    }
    return V;
  }
  function ye(P) {
    return T(P) || P !== null && e(P) === "object" && typeof P.then == "function" && typeof P.catch == "function";
  }
  function re(P) {
    return Promise.resolve().then(function() {
      var M;
      if (typeof P == "function") {
        if (M = P(), !ye(M)) throw new v("instance of Promise", "promiseFn", M);
      } else if (ye(P)) M = P;
      else throw new b("promiseFn", ["Function", "Promise"], P);
      return Promise.resolve().then(function() {
        return M;
      }).then(function() {
        return V;
      }).catch(function(_) {
        return _;
      });
    });
  }
  function J(P, M, _, D) {
    if (typeof _ == "string") {
      if (arguments.length === 4) throw new b("error", ["Object", "Error", "Function", "RegExp"], _);
      if (e(M) === "object" && M !== null) {
        if (M.message === _) throw new c("error/message", 'The error message "'.concat(M.message, '" is identical to the message.'));
      } else if (M === _) throw new c("error/message", 'The error "'.concat(M, '" is identical to the message.'));
      D = _, _ = void 0;
    } else if (_ != null && e(_) !== "object" && typeof _ != "function") throw new b("error", ["Object", "Error", "Function", "RegExp"], _);
    if (M === V) {
      var $ = "";
      _ && _.name && ($ += " (".concat(_.name, ")")), $ += D ? ": ".concat(D) : ".";
      var B = P.name === "rejects" ? "rejection" : "exception";
      K({ actual: void 0, expected: _, operator: P.name, message: "Missing expected ".concat(B).concat($), stackStartFn: P });
    }
    if (_ && !_e(M, _, D, P)) throw M;
  }
  function oe(P, M, _, D) {
    if (M !== V) {
      if (typeof _ == "string" && (D = _, _ = void 0), !_ || _e(M, _)) {
        var $ = D ? ": ".concat(D) : ".", B = P.name === "doesNotReject" ? "rejection" : "exception";
        K({ actual: M, expected: _, operator: P.name, message: "Got unwanted ".concat(B).concat($, `
`) + 'Actual message: "'.concat(M && M.message, '"'), stackStartFn: P });
      }
      throw M;
    }
  }
  q.throws = function P(M) {
    for (var _ = arguments.length, D = new Array(_ > 1 ? _ - 1 : 0), $ = 1; $ < _; $++) D[$ - 1] = arguments[$];
    J.apply(void 0, [P, Fe(M)].concat(D));
  }, q.rejects = function P(M) {
    for (var _ = arguments.length, D = new Array(_ > 1 ? _ - 1 : 0), $ = 1; $ < _; $++) D[$ - 1] = arguments[$];
    return re(M).then(function(B) {
      return J.apply(void 0, [P, B].concat(D));
    });
  }, q.doesNotThrow = function P(M) {
    for (var _ = arguments.length, D = new Array(_ > 1 ? _ - 1 : 0), $ = 1; $ < _; $++) D[$ - 1] = arguments[$];
    oe.apply(void 0, [P, Fe(M)].concat(D));
  }, q.doesNotReject = function P(M) {
    for (var _ = arguments.length, D = new Array(_ > 1 ? _ - 1 : 0), $ = 1; $ < _; $++) D[$ - 1] = arguments[$];
    return re(M).then(function(B) {
      return oe.apply(void 0, [P, B].concat(D));
    });
  }, q.ifError = function P(M) {
    if (M != null) {
      var _ = "ifError got unwanted exception: ";
      e(M) === "object" && typeof M.message == "string" ? M.message.length === 0 && M.constructor ? _ += M.constructor.name : _ += M.message : _ += I(M);
      var D = new R({ actual: M, expected: null, operator: "ifError", message: _, stackStartFn: P }), $ = M.stack;
      if (typeof $ == "string") {
        var B = $.split(`
`);
        B.shift();
        for (var x = D.stack.split(`
`), m = 0; m < B.length; m++) {
          var S = x.indexOf(B[m]);
          if (S !== -1) {
            x = x.slice(0, S);
            break;
          }
        }
        D.stack = "".concat(x.join(`
`), `
`).concat(B.join(`
`));
      }
      throw D;
    }
  };
  function ne(P, M, _, D, $) {
    if (!j(M)) throw new b("regexp", "RegExp", M);
    var B = $ === "match";
    if (typeof P != "string" || o(M, P) !== B) {
      if (_ instanceof Error) throw _;
      var x = !_;
      _ = _ || (typeof P != "string" ? 'The "string" argument must be of type string. Received type ' + "".concat(e(P), " (").concat(I(P), ")") : (B ? "The input did not match the regular expression " : "The input was expected to not match the regular expression ") + "".concat(I(M), `. Input:

`).concat(I(P), `
`));
      var m = new R({ actual: P, expected: M, message: _, operator: $, stackStartFn: D });
      throw m.generatedMessage = x, m;
    }
  }
  q.match = function P(M, _, D) {
    ne(M, _, D, P, "match");
  }, q.doesNotMatch = function P(M, _, D) {
    ne(M, _, D, P, "doesNotMatch");
  };
  function W() {
    for (var P = arguments.length, M = new Array(P), _ = 0; _ < P; _++) M[_] = arguments[_];
    ue.apply(void 0, [W, M.length].concat(M));
  }
  return q.strict = O(W, q, { equal: q.strictEqual, deepEqual: q.deepStrictEqual, notEqual: q.notStrictEqual, notDeepEqual: q.notDeepStrictEqual }), q.strict.strict = q.strict, kr.exports;
}
var ea;
function ws() {
  return ea || (ea = 1, function(e) {
    Object.defineProperty(e, "__esModule", { value: true }), e.AssertionError = e.RangeError = e.TypeError = e.Error = void 0, e.message = v, e.E = g;
    const a = Jn(), t = Ye(), s = typeof Symbol > "u" ? "_kCode" : Symbol("code"), h = {};
    function c(T) {
      return class extends T {
        constructor(O, ...y) {
          super(v(O, y)), this.code = O, this[s] = O, this.name = `${super.name} [${this[s]}]`;
        }
      };
    }
    const b = typeof globalThis < "u" ? globalThis : Ve;
    class d extends b.Error {
      constructor(j) {
        if (typeof j != "object" || j === null) throw new e.TypeError("ERR_INVALID_ARG_TYPE", "options", "object");
        j.message ? super(j.message) : super(`${t.inspect(j.actual).slice(0, 128)} ${j.operator} ${t.inspect(j.expected).slice(0, 128)}`), this.generatedMessage = !j.message, this.name = "AssertionError [ERR_ASSERTION]", this.code = "ERR_ASSERTION", this.actual = j.actual, this.expected = j.expected, this.operator = j.operator, e.Error.captureStackTrace(this, j.stackStartFunction);
      }
    }
    e.AssertionError = d;
    function v(T, j) {
      a.strictEqual(typeof T, "string");
      const O = h[T];
      a(O, `An invalid error message key was used: ${T}.`);
      let y;
      if (typeof O == "function") y = O;
      else {
        if (y = t.format, j === void 0 || j.length === 0) return O;
        j.unshift(O);
      }
      return String(y.apply(null, j));
    }
    function g(T, j) {
      h[T] = typeof j == "function" ? j : String(j);
    }
    e.Error = c(b.Error), e.TypeError = c(b.TypeError), e.RangeError = c(b.RangeError), g("ERR_ARG_NOT_ITERABLE", "%s must be iterable"), g("ERR_ASSERTION", "%s"), g("ERR_BUFFER_OUT_OF_BOUNDS", A), g("ERR_CHILD_CLOSED_BEFORE_REPLY", "Child closed before reply received"), g("ERR_CONSOLE_WRITABLE_STREAM", "Console expects a writable stream instance for %s"), g("ERR_CPU_USAGE", "Unable to obtain cpu usage %s"), g("ERR_DNS_SET_SERVERS_FAILED", (T, j) => `c-ares failed to set servers: "${T}" [${j}]`), g("ERR_FALSY_VALUE_REJECTION", "Promise was rejected with falsy value"), g("ERR_ENCODING_NOT_SUPPORTED", (T) => `The "${T}" encoding is not supported`), g("ERR_ENCODING_INVALID_ENCODED_DATA", (T) => `The encoded data was not valid for encoding ${T}`), g("ERR_HTTP_HEADERS_SENT", "Cannot render headers after they are sent to the client"), g("ERR_HTTP_INVALID_STATUS_CODE", "Invalid status code: %s"), g("ERR_HTTP_TRAILER_INVALID", "Trailers are invalid with this transfer encoding"), g("ERR_INDEX_OUT_OF_RANGE", "Index out of range"), g("ERR_INVALID_ARG_TYPE", R), g("ERR_INVALID_ARRAY_LENGTH", (T, j, O) => (a.strictEqual(typeof O, "number"), `The array "${T}" (length ${O}) must be of length ${j}.`)), g("ERR_INVALID_BUFFER_SIZE", "Buffer size must be a multiple of %s"), g("ERR_INVALID_CALLBACK", "Callback must be a function"), g("ERR_INVALID_CHAR", "Invalid character in %s"), g("ERR_INVALID_CURSOR_POS", "Cannot set cursor row without setting its column"), g("ERR_INVALID_FD", '"fd" must be a positive integer: %s'), g("ERR_INVALID_FILE_URL_HOST", 'File URL host must be "localhost" or empty on %s'), g("ERR_INVALID_FILE_URL_PATH", "File URL path %s"), g("ERR_INVALID_HANDLE_TYPE", "This handle type cannot be sent"), g("ERR_INVALID_IP_ADDRESS", "Invalid IP address: %s"), g("ERR_INVALID_OPT_VALUE", (T, j) => `The value "${String(j)}" is invalid for option "${T}"`), g("ERR_INVALID_OPT_VALUE_ENCODING", (T) => `The value "${String(T)}" is invalid for option "encoding"`), g("ERR_INVALID_REPL_EVAL_CONFIG", 'Cannot specify both "breakEvalOnSigint" and "eval" for REPL'), g("ERR_INVALID_SYNC_FORK_INPUT", "Asynchronous forks do not support Buffer, Uint8Array or string input: %s"), g("ERR_INVALID_THIS", 'Value of "this" must be of type %s'), g("ERR_INVALID_TUPLE", "%s must be an iterable %s tuple"), g("ERR_INVALID_URL", "Invalid URL: %s"), g("ERR_INVALID_URL_SCHEME", (T) => `The URL must be ${I(T, "scheme")}`), g("ERR_IPC_CHANNEL_CLOSED", "Channel closed"), g("ERR_IPC_DISCONNECTED", "IPC channel is already disconnected"), g("ERR_IPC_ONE_PIPE", "Child process can have only one IPC pipe"), g("ERR_IPC_SYNC_FORK", "IPC cannot be used with synchronous forks"), g("ERR_MISSING_ARGS", L), g("ERR_MULTIPLE_CALLBACK", "Callback called multiple times"), g("ERR_NAPI_CONS_FUNCTION", "Constructor must be a function"), g("ERR_NAPI_CONS_PROTOTYPE_OBJECT", "Constructor.prototype must be an object"), g("ERR_NO_CRYPTO", "Node.js is not compiled with OpenSSL crypto support"), g("ERR_NO_LONGER_SUPPORTED", "%s is no longer supported"), g("ERR_PARSE_HISTORY_DATA", "Could not parse history data in %s"), g("ERR_SOCKET_ALREADY_BOUND", "Socket is already bound"), g("ERR_SOCKET_BAD_PORT", "Port should be > 0 and < 65536"), g("ERR_SOCKET_BAD_TYPE", "Bad socket type specified. Valid types are: udp4, udp6"), g("ERR_SOCKET_CANNOT_SEND", "Unable to send data"), g("ERR_SOCKET_CLOSED", "Socket is closed"), g("ERR_SOCKET_DGRAM_NOT_RUNNING", "Not running"), g("ERR_STDERR_CLOSE", "process.stderr cannot be closed"), g("ERR_STDOUT_CLOSE", "process.stdout cannot be closed"), g("ERR_STREAM_WRAP", "Stream has StringDecoder set or is in objectMode"), g("ERR_TLS_CERT_ALTNAME_INVALID", "Hostname/IP does not match certificate's altnames: %s"), g("ERR_TLS_DH_PARAM_SIZE", (T) => `DH parameter size ${T} is less than 2048`), g("ERR_TLS_HANDSHAKE_TIMEOUT", "TLS handshake timeout"), g("ERR_TLS_RENEGOTIATION_FAILED", "Failed to renegotiate"), g("ERR_TLS_REQUIRED_SERVER_NAME", '"servername" is required parameter for Server.addContext'), g("ERR_TLS_SESSION_ATTACK", "TSL session renegotiation attack detected"), g("ERR_TRANSFORM_ALREADY_TRANSFORMING", "Calling transform done when still transforming"), g("ERR_TRANSFORM_WITH_LENGTH_0", "Calling transform done when writableState.length != 0"), g("ERR_UNKNOWN_ENCODING", "Unknown encoding: %s"), g("ERR_UNKNOWN_SIGNAL", "Unknown signal: %s"), g("ERR_UNKNOWN_STDIN_TYPE", "Unknown stdin file type"), g("ERR_UNKNOWN_STREAM_TYPE", "Unknown stream file type"), g("ERR_V8BREAKITERATOR", "Full ICU data not installed. See https://github.com/nodejs/node/wiki/Intl");
    function R(T, j, O) {
      a(T, "name is required");
      let y;
      j.includes("not ") ? (y = "must not be", j = j.split("not ")[1]) : y = "must be";
      let o;
      if (Array.isArray(T)) o = `The ${T.map((p) => `"${p}"`).join(", ")} arguments ${y} ${I(j, "type")}`;
      else if (T.includes(" argument")) o = `The ${T} ${y} ${I(j, "type")}`;
      else {
        const n = T.includes(".") ? "property" : "argument";
        o = `The "${T}" ${n} ${y} ${I(j, "type")}`;
      }
      return arguments.length >= 3 && (o += `. Received type ${O !== null ? typeof O : "null"}`), o;
    }
    function L(...T) {
      a(T.length > 0, "At least one arg needs to be specified");
      let j = "The ";
      const O = T.length;
      switch (T = T.map((y) => `"${y}"`), O) {
        case 1:
          j += `${T[0]} argument`;
          break;
        case 2:
          j += `${T[0]} and ${T[1]} arguments`;
          break;
        default:
          j += T.slice(0, O - 1).join(", "), j += `, and ${T[O - 1]} arguments`;
          break;
      }
      return `${j} must be specified`;
    }
    function I(T, j) {
      if (a(T, "expected is required"), a(typeof j == "string", "thing is required"), Array.isArray(T)) {
        const O = T.length;
        return a(O > 0, "At least one expected value needs to be specified"), T = T.map((y) => String(y)), O > 2 ? `one of ${j} ${T.slice(0, O - 1).join(", ")}, or ` + T[O - 1] : O === 2 ? `one of ${j} ${T[0]} or ${T[1]}` : `of ${j} ${T[0]}`;
      } else return `of ${j} ${String(T)}`;
    }
    function A(T, j) {
      return j ? "Attempt to write outside buffer bounds" : `"${T}" is outside of buffer bounds`;
    }
  }(qr)), qr;
}
var ta;
function xt() {
  return ta || (ta = 1, function(e) {
    Object.defineProperty(e, "__esModule", { value: true }), e.ENCODING_UTF8 = void 0, e.assertEncoding = s, e.strToEncoding = h;
    const a = vt(), t = ws();
    e.ENCODING_UTF8 = "utf8";
    function s(c) {
      if (c && !a.Buffer.isEncoding(c)) throw new t.TypeError("ERR_INVALID_OPT_VALUE_ENCODING", c);
    }
    function h(c, b) {
      return !b || b === e.ENCODING_UTF8 ? c : b === "buffer" ? new a.Buffer(c) : new a.Buffer(c).toString(b);
    }
  }(Cr)), Cr;
}
var ra;
function fi() {
  if (ra) return rt;
  ra = 1, Object.defineProperty(rt, "__esModule", { value: true }), rt.Dirent = void 0;
  const e = Qe(), a = xt(), { S_IFMT: t, S_IFDIR: s, S_IFREG: h, S_IFBLK: c, S_IFCHR: b, S_IFLNK: d, S_IFIFO: v, S_IFSOCK: g } = e.constants;
  let R = class Es {
    constructor() {
      this.name = "", this.path = "", this.parentPath = "", this.mode = 0;
    }
    static build(I, A) {
      const T = new Es(), { mode: j } = I.getNode();
      return T.name = (0, a.strToEncoding)(I.getName(), A), T.mode = j, T.path = I.getParentPath(), T.parentPath = T.path, T;
    }
    _checkModeProperty(I) {
      return (this.mode & t) === I;
    }
    isDirectory() {
      return this._checkModeProperty(s);
    }
    isFile() {
      return this._checkModeProperty(h);
    }
    isBlockDevice() {
      return this._checkModeProperty(c);
    }
    isCharacterDevice() {
      return this._checkModeProperty(b);
    }
    isSymbolicLink() {
      return this._checkModeProperty(d);
    }
    isFIFO() {
      return this._checkModeProperty(v);
    }
    isSocket() {
      return this._checkModeProperty(g);
    }
  };
  return rt.Dirent = R, rt.default = R, rt;
}
var He = {}, Rn = {}, ut = {}, On = {}, na;
function Uu() {
  return na || (na = 1, function(e) {
    Object.defineProperties(e, { __esModule: { value: true }, [Symbol.toStringTag]: { value: "Module" } });
    function a(p) {
      return p && p.__esModule && Object.prototype.hasOwnProperty.call(p, "default") ? p.default : p;
    }
    var t = { exports: {} }, s = t.exports = {}, h, c;
    function b() {
      throw new Error("setTimeout has not been defined");
    }
    function d() {
      throw new Error("clearTimeout has not been defined");
    }
    (function() {
      try {
        typeof setTimeout == "function" ? h = setTimeout : h = b;
      } catch {
        h = b;
      }
      try {
        typeof clearTimeout == "function" ? c = clearTimeout : c = d;
      } catch {
        c = d;
      }
    })();
    function v(p) {
      if (h === setTimeout) return setTimeout(p, 0);
      if ((h === b || !h) && setTimeout) return h = setTimeout, setTimeout(p, 0);
      try {
        return h(p, 0);
      } catch {
        try {
          return h.call(null, p, 0);
        } catch {
          return h.call(this, p, 0);
        }
      }
    }
    function g(p) {
      if (c === clearTimeout) return clearTimeout(p);
      if ((c === d || !c) && clearTimeout) return c = clearTimeout, clearTimeout(p);
      try {
        return c(p);
      } catch {
        try {
          return c.call(null, p);
        } catch {
          return c.call(this, p);
        }
      }
    }
    var R = [], L = false, I, A = -1;
    function T() {
      !L || !I || (L = false, I.length ? R = I.concat(R) : A = -1, R.length && j());
    }
    function j() {
      if (!L) {
        var p = v(T);
        L = true;
        for (var w = R.length; w; ) {
          for (I = R, R = []; ++A < w; ) I && I[A].run();
          A = -1, w = R.length;
        }
        I = null, L = false, g(p);
      }
    }
    s.nextTick = function(p) {
      var w = new Array(arguments.length - 1);
      if (arguments.length > 1) for (var F = 1; F < arguments.length; F++) w[F - 1] = arguments[F];
      R.push(new O(p, w)), R.length === 1 && !L && v(j);
    };
    function O(p, w) {
      this.fun = p, this.array = w;
    }
    O.prototype.run = function() {
      this.fun.apply(null, this.array);
    }, s.title = "browser", s.browser = true, s.env = {}, s.argv = [], s.version = "", s.versions = {};
    function y() {
    }
    s.on = y, s.addListener = y, s.once = y, s.off = y, s.removeListener = y, s.removeAllListeners = y, s.emit = y, s.prependListener = y, s.prependOnceListener = y, s.listeners = function(p) {
      return [];
    }, s.binding = function(p) {
      throw new Error("process.binding is not supported");
    }, s.cwd = function() {
      return "/";
    }, s.chdir = function(p) {
      throw new Error("process.chdir is not supported");
    }, s.umask = function() {
      return 0;
    };
    var o = t.exports;
    const n = a(o);
    e.default = n, e.process = n;
  }(On)), On;
}
var ia;
function _s() {
  if (ia) return ut;
  ia = 1, Object.defineProperty(ut, "__esModule", { value: true }), ut.createProcess = a;
  const e = () => {
    if (typeof Oe < "u") return Oe;
    try {
      return Uu();
    } catch {
      return;
    }
  };
  function a() {
    const t = e() || {};
    return t.cwd || (t.cwd = () => "/"), t.emitWarning || (t.emitWarning = (s, h) => {
      console.warn(`${h}${h ? ": " : ""}${s}`);
    }), t.env || (t.env = {}), t;
  }
  return ut.default = a(), ut;
}
var It = { exports: {} }, oa;
function St() {
  if (oa) return It.exports;
  oa = 1;
  var e = typeof Reflect == "object" ? Reflect : null, a = e && typeof e.apply == "function" ? e.apply : function(w, F, q) {
    return Function.prototype.apply.call(w, F, q);
  }, t;
  e && typeof e.ownKeys == "function" ? t = e.ownKeys : Object.getOwnPropertySymbols ? t = function(w) {
    return Object.getOwnPropertyNames(w).concat(Object.getOwnPropertySymbols(w));
  } : t = function(w) {
    return Object.getOwnPropertyNames(w);
  };
  function s(p) {
    console && console.warn && console.warn(p);
  }
  var h = Number.isNaN || function(w) {
    return w !== w;
  };
  function c() {
    c.init.call(this);
  }
  It.exports = c, It.exports.once = y, c.EventEmitter = c, c.prototype._events = void 0, c.prototype._eventsCount = 0, c.prototype._maxListeners = void 0;
  var b = 10;
  function d(p) {
    if (typeof p != "function") throw new TypeError('The "listener" argument must be of type Function. Received type ' + typeof p);
  }
  Object.defineProperty(c, "defaultMaxListeners", { enumerable: true, get: function() {
    return b;
  }, set: function(p) {
    if (typeof p != "number" || p < 0 || h(p)) throw new RangeError('The value of "defaultMaxListeners" is out of range. It must be a non-negative number. Received ' + p + ".");
    b = p;
  } }), c.init = function() {
    (this._events === void 0 || this._events === Object.getPrototypeOf(this)._events) && (this._events = /* @__PURE__ */ Object.create(null), this._eventsCount = 0), this._maxListeners = this._maxListeners || void 0;
  }, c.prototype.setMaxListeners = function(w) {
    if (typeof w != "number" || w < 0 || h(w)) throw new RangeError('The value of "n" is out of range. It must be a non-negative number. Received ' + w + ".");
    return this._maxListeners = w, this;
  };
  function v(p) {
    return p._maxListeners === void 0 ? c.defaultMaxListeners : p._maxListeners;
  }
  c.prototype.getMaxListeners = function() {
    return v(this);
  }, c.prototype.emit = function(w) {
    for (var F = [], q = 1; q < arguments.length; q++) F.push(arguments[q]);
    var V = w === "error", K = this._events;
    if (K !== void 0) V = V && K.error === void 0;
    else if (!V) return false;
    if (V) {
      var ee;
      if (F.length > 0 && (ee = F[0]), ee instanceof Error) throw ee;
      var ue = new Error("Unhandled error." + (ee ? " (" + ee.message + ")" : ""));
      throw ue.context = ee, ue;
    }
    var k = K[w];
    if (k === void 0) return false;
    if (typeof k == "function") a(k, this, F);
    else for (var de = k.length, be = T(k, de), q = 0; q < de; ++q) a(be[q], this, F);
    return true;
  };
  function g(p, w, F, q) {
    var V, K, ee;
    if (d(F), K = p._events, K === void 0 ? (K = p._events = /* @__PURE__ */ Object.create(null), p._eventsCount = 0) : (K.newListener !== void 0 && (p.emit("newListener", w, F.listener ? F.listener : F), K = p._events), ee = K[w]), ee === void 0) ee = K[w] = F, ++p._eventsCount;
    else if (typeof ee == "function" ? ee = K[w] = q ? [F, ee] : [ee, F] : q ? ee.unshift(F) : ee.push(F), V = v(p), V > 0 && ee.length > V && !ee.warned) {
      ee.warned = true;
      var ue = new Error("Possible EventEmitter memory leak detected. " + ee.length + " " + String(w) + " listeners added. Use emitter.setMaxListeners() to increase limit");
      ue.name = "MaxListenersExceededWarning", ue.emitter = p, ue.type = w, ue.count = ee.length, s(ue);
    }
    return p;
  }
  c.prototype.addListener = function(w, F) {
    return g(this, w, F, false);
  }, c.prototype.on = c.prototype.addListener, c.prototype.prependListener = function(w, F) {
    return g(this, w, F, true);
  };
  function R() {
    if (!this.fired) return this.target.removeListener(this.type, this.wrapFn), this.fired = true, arguments.length === 0 ? this.listener.call(this.target) : this.listener.apply(this.target, arguments);
  }
  function L(p, w, F) {
    var q = { fired: false, wrapFn: void 0, target: p, type: w, listener: F }, V = R.bind(q);
    return V.listener = F, q.wrapFn = V, V;
  }
  c.prototype.once = function(w, F) {
    return d(F), this.on(w, L(this, w, F)), this;
  }, c.prototype.prependOnceListener = function(w, F) {
    return d(F), this.prependListener(w, L(this, w, F)), this;
  }, c.prototype.removeListener = function(w, F) {
    var q, V, K, ee, ue;
    if (d(F), V = this._events, V === void 0) return this;
    if (q = V[w], q === void 0) return this;
    if (q === F || q.listener === F) --this._eventsCount === 0 ? this._events = /* @__PURE__ */ Object.create(null) : (delete V[w], V.removeListener && this.emit("removeListener", w, q.listener || F));
    else if (typeof q != "function") {
      for (K = -1, ee = q.length - 1; ee >= 0; ee--) if (q[ee] === F || q[ee].listener === F) {
        ue = q[ee].listener, K = ee;
        break;
      }
      if (K < 0) return this;
      K === 0 ? q.shift() : j(q, K), q.length === 1 && (V[w] = q[0]), V.removeListener !== void 0 && this.emit("removeListener", w, ue || F);
    }
    return this;
  }, c.prototype.off = c.prototype.removeListener, c.prototype.removeAllListeners = function(w) {
    var F, q, V;
    if (q = this._events, q === void 0) return this;
    if (q.removeListener === void 0) return arguments.length === 0 ? (this._events = /* @__PURE__ */ Object.create(null), this._eventsCount = 0) : q[w] !== void 0 && (--this._eventsCount === 0 ? this._events = /* @__PURE__ */ Object.create(null) : delete q[w]), this;
    if (arguments.length === 0) {
      var K = Object.keys(q), ee;
      for (V = 0; V < K.length; ++V) ee = K[V], ee !== "removeListener" && this.removeAllListeners(ee);
      return this.removeAllListeners("removeListener"), this._events = /* @__PURE__ */ Object.create(null), this._eventsCount = 0, this;
    }
    if (F = q[w], typeof F == "function") this.removeListener(w, F);
    else if (F !== void 0) for (V = F.length - 1; V >= 0; V--) this.removeListener(w, F[V]);
    return this;
  };
  function I(p, w, F) {
    var q = p._events;
    if (q === void 0) return [];
    var V = q[w];
    return V === void 0 ? [] : typeof V == "function" ? F ? [V.listener || V] : [V] : F ? O(V) : T(V, V.length);
  }
  c.prototype.listeners = function(w) {
    return I(this, w, true);
  }, c.prototype.rawListeners = function(w) {
    return I(this, w, false);
  }, c.listenerCount = function(p, w) {
    return typeof p.listenerCount == "function" ? p.listenerCount(w) : A.call(p, w);
  }, c.prototype.listenerCount = A;
  function A(p) {
    var w = this._events;
    if (w !== void 0) {
      var F = w[p];
      if (typeof F == "function") return 1;
      if (F !== void 0) return F.length;
    }
    return 0;
  }
  c.prototype.eventNames = function() {
    return this._eventsCount > 0 ? t(this._events) : [];
  };
  function T(p, w) {
    for (var F = new Array(w), q = 0; q < w; ++q) F[q] = p[q];
    return F;
  }
  function j(p, w) {
    for (; w + 1 < p.length; w++) p[w] = p[w + 1];
    p.pop();
  }
  function O(p) {
    for (var w = new Array(p.length), F = 0; F < w.length; ++F) w[F] = p[F].listener || p[F];
    return w;
  }
  function y(p, w) {
    return new Promise(function(F, q) {
      function V(ee) {
        p.removeListener(w, K), q(ee);
      }
      function K() {
        typeof p.removeListener == "function" && p.removeListener("error", V), F([].slice.call(arguments));
      }
      n(p, w, K, { once: true }), w !== "error" && o(p, V, { once: true });
    });
  }
  function o(p, w, F) {
    typeof p.on == "function" && n(p, "error", w, F);
  }
  function n(p, w, F, q) {
    if (typeof p.on == "function") q.once ? p.once(w, F) : p.on(w, F);
    else if (typeof p.addEventListener == "function") p.addEventListener(w, function V(K) {
      q.once && p.removeEventListener(w, V), F(K);
    });
    else throw new TypeError('The "emitter" argument must be of type EventEmitter. Received type ' + typeof p);
  }
  return It.exports;
}
var aa;
function $u() {
  return aa || (aa = 1, function(e) {
    Object.defineProperty(e, "__esModule", { value: true }), e.File = e.Link = e.Node = e.SEP = void 0;
    const a = _s(), t = vt(), s = Qe(), h = St(), c = ai(), { S_IFMT: b, S_IFDIR: d, S_IFREG: v, S_IFLNK: g, S_IFCHR: R, O_APPEND: L } = s.constants, I = () => {
      var y, o;
      return (o = (y = a.default.getuid) === null || y === void 0 ? void 0 : y.call(a.default)) !== null && o !== void 0 ? o : 0;
    }, A = () => {
      var y, o;
      return (o = (y = a.default.getgid) === null || y === void 0 ? void 0 : y.call(a.default)) !== null && o !== void 0 ? o : 0;
    };
    e.SEP = "/";
    class T extends h.EventEmitter {
      constructor(o, n = 438) {
        super(), this._uid = I(), this._gid = A(), this._atime = /* @__PURE__ */ new Date(), this._mtime = /* @__PURE__ */ new Date(), this._ctime = /* @__PURE__ */ new Date(), this.rdev = 0, this._nlink = 1, this.mode = n, this.ino = o;
      }
      set ctime(o) {
        this._ctime = o;
      }
      get ctime() {
        return this._ctime;
      }
      set uid(o) {
        this._uid = o, this.ctime = /* @__PURE__ */ new Date();
      }
      get uid() {
        return this._uid;
      }
      set gid(o) {
        this._gid = o, this.ctime = /* @__PURE__ */ new Date();
      }
      get gid() {
        return this._gid;
      }
      set atime(o) {
        this._atime = o, this.ctime = /* @__PURE__ */ new Date();
      }
      get atime() {
        return this._atime;
      }
      set mtime(o) {
        this._mtime = o, this.ctime = /* @__PURE__ */ new Date();
      }
      get mtime() {
        return this._mtime;
      }
      get perm() {
        return this.mode & ~b;
      }
      set perm(o) {
        this.mode = this.mode & b | o & ~b, this.ctime = /* @__PURE__ */ new Date();
      }
      set nlink(o) {
        this._nlink = o, this.ctime = /* @__PURE__ */ new Date();
      }
      get nlink() {
        return this._nlink;
      }
      getString(o = "utf8") {
        return this.atime = /* @__PURE__ */ new Date(), this.getBuffer().toString(o);
      }
      setString(o) {
        this.buf = (0, t.bufferFrom)(o, "utf8"), this.touch();
      }
      getBuffer() {
        return this.atime = /* @__PURE__ */ new Date(), this.buf || this.setBuffer((0, t.bufferAllocUnsafe)(0)), (0, t.bufferFrom)(this.buf);
      }
      setBuffer(o) {
        this.buf = (0, t.bufferFrom)(o), this.touch();
      }
      getSize() {
        return this.buf ? this.buf.length : 0;
      }
      setModeProperty(o) {
        this.mode = o;
      }
      isFile() {
        return (this.mode & b) === v;
      }
      isDirectory() {
        return (this.mode & b) === d;
      }
      isSymlink() {
        return (this.mode & b) === g;
      }
      isCharacterDevice() {
        return (this.mode & b) === R;
      }
      makeSymlink(o) {
        this.mode = g | 438, this.symlink = o;
      }
      write(o, n = 0, p = o.length, w = 0) {
        if (this.buf || (this.buf = (0, t.bufferAllocUnsafe)(0)), w + p > this.buf.length) {
          const F = (0, t.bufferAllocUnsafe)(w + p);
          this.buf.copy(F, 0, 0, this.buf.length), this.buf = F;
        }
        return o.copy(this.buf, w, n, n + p), this.touch(), p;
      }
      read(o, n = 0, p = o.byteLength, w = 0) {
        this.atime = /* @__PURE__ */ new Date(), this.buf || (this.buf = (0, t.bufferAllocUnsafe)(0));
        let F = p;
        F > o.byteLength && (F = o.byteLength), F + w > this.buf.length && (F = this.buf.length - w);
        const q = o instanceof t.Buffer ? o : t.Buffer.from(o.buffer);
        return this.buf.copy(q, n, w, w + F), F;
      }
      truncate(o = 0) {
        if (!o) this.buf = (0, t.bufferAllocUnsafe)(0);
        else if (this.buf || (this.buf = (0, t.bufferAllocUnsafe)(0)), o <= this.buf.length) this.buf = this.buf.slice(0, o);
        else {
          const n = (0, t.bufferAllocUnsafe)(o);
          this.buf.copy(n), n.fill(0, this.buf.length), this.buf = n;
        }
        this.touch();
      }
      chmod(o) {
        this.mode = this.mode & b | o & ~b, this.touch();
      }
      chown(o, n) {
        this.uid = o, this.gid = n, this.touch();
      }
      touch() {
        this.mtime = /* @__PURE__ */ new Date(), this.emit("change", this);
      }
      canRead(o = I(), n = A()) {
        return !!(this.perm & 4 || n === this.gid && this.perm & 32 || o === this.uid && this.perm & 256);
      }
      canWrite(o = I(), n = A()) {
        return !!(this.perm & 2 || n === this.gid && this.perm & 16 || o === this.uid && this.perm & 128);
      }
      canExecute(o = I(), n = A()) {
        return !!(this.perm & 1 || n === this.gid && this.perm & 8 || o === this.uid && this.perm & 64);
      }
      del() {
        this.emit("delete", this);
      }
      toJSON() {
        return { ino: this.ino, uid: this.uid, gid: this.gid, atime: this.atime.getTime(), mtime: this.mtime.getTime(), ctime: this.ctime.getTime(), perm: this.perm, mode: this.mode, nlink: this.nlink, symlink: this.symlink, data: this.getString() };
      }
    }
    e.Node = T;
    class j extends h.EventEmitter {
      get steps() {
        return this._steps;
      }
      set steps(o) {
        this._steps = o;
        for (const [n, p] of this.children.entries()) n === "." || n === ".." || (p == null ? void 0 : p.syncSteps());
      }
      constructor(o, n, p) {
        super(), this.children = /* @__PURE__ */ new Map(), this._steps = [], this.ino = 0, this.length = 0, this.vol = o, this.parent = n, this.name = p, this.syncSteps();
      }
      setNode(o) {
        this.node = o, this.ino = o.ino;
      }
      getNode() {
        return this.node;
      }
      createChild(o, n = this.vol.createNode(v | 438)) {
        const p = new j(this.vol, this, o);
        return p.setNode(n), n.isDirectory() && (p.children.set(".", p), p.getNode().nlink++), this.setChild(o, p), p;
      }
      setChild(o, n = new j(this.vol, this, o)) {
        return this.children.set(o, n), n.parent = this, this.length++, n.getNode().isDirectory() && (n.children.set("..", this), this.getNode().nlink++), this.getNode().mtime = /* @__PURE__ */ new Date(), this.emit("child:add", n, this), n;
      }
      deleteChild(o) {
        o.getNode().isDirectory() && (o.children.delete(".."), this.getNode().nlink--), this.children.delete(o.getName()), this.length--, this.getNode().mtime = /* @__PURE__ */ new Date(), this.emit("child:delete", o, this);
      }
      getChild(o) {
        return this.getNode().mtime = /* @__PURE__ */ new Date(), this.children.get(o);
      }
      getPath() {
        return this.steps.join(e.SEP);
      }
      getParentPath() {
        return this.steps.slice(0, -1).join(e.SEP);
      }
      getName() {
        return this.steps[this.steps.length - 1];
      }
      toJSON() {
        return { steps: this.steps, ino: this.ino, children: Array.from(this.children.keys()) };
      }
      syncSteps() {
        this.steps = this.parent ? this.parent.steps.concat([this.name]) : [this.name];
      }
    }
    e.Link = j;
    class O {
      constructor(o, n, p, w) {
        this.link = o, this.node = n, this.flags = p, this.fd = w, this.position = 0, this.flags & L && (this.position = this.getSize());
      }
      getString(o = "utf8") {
        return this.node.getString();
      }
      setString(o) {
        this.node.setString(o);
      }
      getBuffer() {
        return this.node.getBuffer();
      }
      setBuffer(o) {
        this.node.setBuffer(o);
      }
      getSize() {
        return this.node.getSize();
      }
      truncate(o) {
        this.node.truncate(o);
      }
      seekTo(o) {
        this.position = o;
      }
      stats() {
        return c.default.build(this.node);
      }
      write(o, n = 0, p = o.length, w) {
        typeof w != "number" && (w = this.position);
        const F = this.node.write(o, n, p, w);
        return this.position = w + F, F;
      }
      read(o, n = 0, p = o.byteLength, w) {
        typeof w != "number" && (w = this.position);
        const F = this.node.read(o, n, p, w);
        return this.position = w + F, F;
      }
      chmod(o) {
        this.node.chmod(o);
      }
      chown(o, n) {
        this.node.chown(o, n);
      }
    }
    e.File = O;
  }(Rn)), Rn;
}
var Ft = {}, sa;
function Wu() {
  if (sa) return Ft;
  sa = 1, Object.defineProperty(Ft, "__esModule", { value: true });
  let e;
  return typeof setImmediate == "function" ? e = setImmediate.bind(typeof globalThis < "u" ? globalThis : Ve) : e = setTimeout.bind(typeof globalThis < "u" ? globalThis : Ve), Ft.default = e, Ft;
}
var Pt = {}, fa;
function Ss() {
  return fa || (fa = 1, Object.defineProperty(Pt, "__esModule", { value: true }), Pt.default = typeof queueMicrotask == "function" ? queueMicrotask : (e) => Promise.resolve().then(() => e()).catch(() => {
  })), Pt;
}
var Nt = {}, ua;
function Vu() {
  if (ua) return Nt;
  ua = 1, Object.defineProperty(Nt, "__esModule", { value: true });
  function e(a, t, s) {
    const h = setTimeout.apply(typeof globalThis < "u" ? globalThis : Ve, arguments);
    return h && typeof h == "object" && typeof h.unref == "function" && h.unref(), h;
  }
  return Nt.default = e, Nt;
}
var Tn, la;
function Rs() {
  return la || (la = 1, Tn = St().EventEmitter), Tn;
}
var An, ca;
function Hu() {
  if (ca) return An;
  ca = 1;
  function e(T, j) {
    var O = Object.keys(T);
    if (Object.getOwnPropertySymbols) {
      var y = Object.getOwnPropertySymbols(T);
      j && (y = y.filter(function(o) {
        return Object.getOwnPropertyDescriptor(T, o).enumerable;
      })), O.push.apply(O, y);
    }
    return O;
  }
  function a(T) {
    for (var j = 1; j < arguments.length; j++) {
      var O = arguments[j] != null ? arguments[j] : {};
      j % 2 ? e(Object(O), true).forEach(function(y) {
        t(T, y, O[y]);
      }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(T, Object.getOwnPropertyDescriptors(O)) : e(Object(O)).forEach(function(y) {
        Object.defineProperty(T, y, Object.getOwnPropertyDescriptor(O, y));
      });
    }
    return T;
  }
  function t(T, j, O) {
    return j = b(j), j in T ? Object.defineProperty(T, j, { value: O, enumerable: true, configurable: true, writable: true }) : T[j] = O, T;
  }
  function s(T, j) {
    if (!(T instanceof j)) throw new TypeError("Cannot call a class as a function");
  }
  function h(T, j) {
    for (var O = 0; O < j.length; O++) {
      var y = j[O];
      y.enumerable = y.enumerable || false, y.configurable = true, "value" in y && (y.writable = true), Object.defineProperty(T, b(y.key), y);
    }
  }
  function c(T, j, O) {
    return j && h(T.prototype, j), Object.defineProperty(T, "prototype", { writable: false }), T;
  }
  function b(T) {
    var j = d(T, "string");
    return typeof j == "symbol" ? j : String(j);
  }
  function d(T, j) {
    if (typeof T != "object" || T === null) return T;
    var O = T[Symbol.toPrimitive];
    if (O !== void 0) {
      var y = O.call(T, j);
      if (typeof y != "object") return y;
      throw new TypeError("@@toPrimitive must return a primitive value.");
    }
    return String(T);
  }
  var v = _t(), g = v.Buffer, R = Ye(), L = R.inspect, I = L && L.custom || "inspect";
  function A(T, j, O) {
    g.prototype.copy.call(T, j, O);
  }
  return An = function() {
    function T() {
      s(this, T), this.head = null, this.tail = null, this.length = 0;
    }
    return c(T, [{ key: "push", value: function(O) {
      var y = { data: O, next: null };
      this.length > 0 ? this.tail.next = y : this.head = y, this.tail = y, ++this.length;
    } }, { key: "unshift", value: function(O) {
      var y = { data: O, next: this.head };
      this.length === 0 && (this.tail = y), this.head = y, ++this.length;
    } }, { key: "shift", value: function() {
      if (this.length !== 0) {
        var O = this.head.data;
        return this.length === 1 ? this.head = this.tail = null : this.head = this.head.next, --this.length, O;
      }
    } }, { key: "clear", value: function() {
      this.head = this.tail = null, this.length = 0;
    } }, { key: "join", value: function(O) {
      if (this.length === 0) return "";
      for (var y = this.head, o = "" + y.data; y = y.next; ) o += O + y.data;
      return o;
    } }, { key: "concat", value: function(O) {
      if (this.length === 0) return g.alloc(0);
      for (var y = g.allocUnsafe(O >>> 0), o = this.head, n = 0; o; ) A(o.data, y, n), n += o.data.length, o = o.next;
      return y;
    } }, { key: "consume", value: function(O, y) {
      var o;
      return O < this.head.data.length ? (o = this.head.data.slice(0, O), this.head.data = this.head.data.slice(O)) : O === this.head.data.length ? o = this.shift() : o = y ? this._getString(O) : this._getBuffer(O), o;
    } }, { key: "first", value: function() {
      return this.head.data;
    } }, { key: "_getString", value: function(O) {
      var y = this.head, o = 1, n = y.data;
      for (O -= n.length; y = y.next; ) {
        var p = y.data, w = O > p.length ? p.length : O;
        if (w === p.length ? n += p : n += p.slice(0, O), O -= w, O === 0) {
          w === p.length ? (++o, y.next ? this.head = y.next : this.head = this.tail = null) : (this.head = y, y.data = p.slice(w));
          break;
        }
        ++o;
      }
      return this.length -= o, n;
    } }, { key: "_getBuffer", value: function(O) {
      var y = g.allocUnsafe(O), o = this.head, n = 1;
      for (o.data.copy(y), O -= o.data.length; o = o.next; ) {
        var p = o.data, w = O > p.length ? p.length : O;
        if (p.copy(y, y.length - O, 0, w), O -= w, O === 0) {
          w === p.length ? (++n, o.next ? this.head = o.next : this.head = this.tail = null) : (this.head = o, o.data = p.slice(w));
          break;
        }
        ++n;
      }
      return this.length -= n, y;
    } }, { key: I, value: function(O, y) {
      return L(this, a(a({}, y), {}, { depth: 0, customInspect: false }));
    } }]), T;
  }(), An;
}
var In, ha;
function Os() {
  if (ha) return In;
  ha = 1;
  function e(b, d) {
    var v = this, g = this._readableState && this._readableState.destroyed, R = this._writableState && this._writableState.destroyed;
    return g || R ? (d ? d(b) : b && (this._writableState ? this._writableState.errorEmitted || (this._writableState.errorEmitted = true, Oe.nextTick(h, this, b)) : Oe.nextTick(h, this, b)), this) : (this._readableState && (this._readableState.destroyed = true), this._writableState && (this._writableState.destroyed = true), this._destroy(b || null, function(L) {
      !d && L ? v._writableState ? v._writableState.errorEmitted ? Oe.nextTick(t, v) : (v._writableState.errorEmitted = true, Oe.nextTick(a, v, L)) : Oe.nextTick(a, v, L) : d ? (Oe.nextTick(t, v), d(L)) : Oe.nextTick(t, v);
    }), this);
  }
  function a(b, d) {
    h(b, d), t(b);
  }
  function t(b) {
    b._writableState && !b._writableState.emitClose || b._readableState && !b._readableState.emitClose || b.emit("close");
  }
  function s() {
    this._readableState && (this._readableState.destroyed = false, this._readableState.reading = false, this._readableState.ended = false, this._readableState.endEmitted = false), this._writableState && (this._writableState.destroyed = false, this._writableState.ended = false, this._writableState.ending = false, this._writableState.finalCalled = false, this._writableState.prefinished = false, this._writableState.finished = false, this._writableState.errorEmitted = false);
  }
  function h(b, d) {
    b.emit("error", d);
  }
  function c(b, d) {
    var v = b._readableState, g = b._writableState;
    v && v.autoDestroy || g && g.autoDestroy ? b.destroy(d) : b.emit("error", d);
  }
  return In = { destroy: e, undestroy: s, errorOrDestroy: c }, In;
}
var Fn = {}, da;
function st() {
  if (da) return Fn;
  da = 1;
  function e(d, v) {
    d.prototype = Object.create(v.prototype), d.prototype.constructor = d, d.__proto__ = v;
  }
  var a = {};
  function t(d, v, g) {
    g || (g = Error);
    function R(I, A, T) {
      return typeof v == "string" ? v : v(I, A, T);
    }
    var L = function(I) {
      e(A, I);
      function A(T, j, O) {
        return I.call(this, R(T, j, O)) || this;
      }
      return A;
    }(g);
    L.prototype.name = g.name, L.prototype.code = d, a[d] = L;
  }
  function s(d, v) {
    if (Array.isArray(d)) {
      var g = d.length;
      return d = d.map(function(R) {
        return String(R);
      }), g > 2 ? "one of ".concat(v, " ").concat(d.slice(0, g - 1).join(", "), ", or ") + d[g - 1] : g === 2 ? "one of ".concat(v, " ").concat(d[0], " or ").concat(d[1]) : "of ".concat(v, " ").concat(d[0]);
    } else return "of ".concat(v, " ").concat(String(d));
  }
  function h(d, v, g) {
    return d.substr(0, v.length) === v;
  }
  function c(d, v, g) {
    return (g === void 0 || g > d.length) && (g = d.length), d.substring(g - v.length, g) === v;
  }
  function b(d, v, g) {
    return typeof g != "number" && (g = 0), g + v.length > d.length ? false : d.indexOf(v, g) !== -1;
  }
  return t("ERR_INVALID_OPT_VALUE", function(d, v) {
    return 'The value "' + v + '" is invalid for option "' + d + '"';
  }, TypeError), t("ERR_INVALID_ARG_TYPE", function(d, v, g) {
    var R;
    typeof v == "string" && h(v, "not ") ? (R = "must not be", v = v.replace(/^not /, "")) : R = "must be";
    var L;
    if (c(d, " argument")) L = "The ".concat(d, " ").concat(R, " ").concat(s(v, "type"));
    else {
      var I = b(d, ".") ? "property" : "argument";
      L = 'The "'.concat(d, '" ').concat(I, " ").concat(R, " ").concat(s(v, "type"));
    }
    return L += ". Received type ".concat(typeof g), L;
  }, TypeError), t("ERR_STREAM_PUSH_AFTER_EOF", "stream.push() after EOF"), t("ERR_METHOD_NOT_IMPLEMENTED", function(d) {
    return "The " + d + " method is not implemented";
  }), t("ERR_STREAM_PREMATURE_CLOSE", "Premature close"), t("ERR_STREAM_DESTROYED", function(d) {
    return "Cannot call " + d + " after a stream was destroyed";
  }), t("ERR_MULTIPLE_CALLBACK", "Callback called multiple times"), t("ERR_STREAM_CANNOT_PIPE", "Cannot pipe, not readable"), t("ERR_STREAM_WRITE_AFTER_END", "write after end"), t("ERR_STREAM_NULL_VALUES", "May not write null values to stream", TypeError), t("ERR_UNKNOWN_ENCODING", function(d) {
    return "Unknown encoding: " + d;
  }, TypeError), t("ERR_STREAM_UNSHIFT_AFTER_END_EVENT", "stream.unshift() after end event"), Fn.codes = a, Fn;
}
var Pn, pa;
function Ts() {
  if (pa) return Pn;
  pa = 1;
  var e = st().codes.ERR_INVALID_OPT_VALUE;
  function a(s, h, c) {
    return s.highWaterMark != null ? s.highWaterMark : h ? s[c] : null;
  }
  function t(s, h, c, b) {
    var d = a(h, b, c);
    if (d != null) {
      if (!(isFinite(d) && Math.floor(d) === d) || d < 0) {
        var v = b ? c : "highWaterMark";
        throw new e(v, d);
      }
      return Math.floor(d);
    }
    return s.objectMode ? 16 : 16 * 1024;
  }
  return Pn = { getHighWaterMark: t }, Pn;
}
var Nn, ya;
function Gu() {
  if (ya) return Nn;
  ya = 1, Nn = e;
  function e(t, s) {
    if (a("noDeprecation")) return t;
    var h = false;
    function c() {
      if (!h) {
        if (a("throwDeprecation")) throw new Error(s);
        a("traceDeprecation") ? console.trace(s) : console.warn(s), h = true;
      }
      return t.apply(this, arguments);
    }
    return c;
  }
  function a(t) {
    try {
      if (!Ve.localStorage) return false;
    } catch {
      return false;
    }
    var s = Ve.localStorage[t];
    return s == null ? false : String(s).toLowerCase() === "true";
  }
  return Nn;
}
var Bn, ga;
function As() {
  if (ga) return Bn;
  ga = 1, Bn = V;
  function e(_) {
    var D = this;
    this.next = null, this.entry = null, this.finish = function() {
      M(D, _);
    };
  }
  var a;
  V.WritableState = F;
  var t = { deprecate: Gu() }, s = Rs(), h = _t().Buffer, c = (typeof Ve < "u" ? Ve : typeof window < "u" ? window : typeof self < "u" ? self : {}).Uint8Array || function() {
  };
  function b(_) {
    return h.from(_);
  }
  function d(_) {
    return h.isBuffer(_) || _ instanceof c;
  }
  var v = Os(), g = Ts(), R = g.getHighWaterMark, L = st().codes, I = L.ERR_INVALID_ARG_TYPE, A = L.ERR_METHOD_NOT_IMPLEMENTED, T = L.ERR_MULTIPLE_CALLBACK, j = L.ERR_STREAM_CANNOT_PIPE, O = L.ERR_STREAM_DESTROYED, y = L.ERR_STREAM_NULL_VALUES, o = L.ERR_STREAM_WRITE_AFTER_END, n = L.ERR_UNKNOWN_ENCODING, p = v.errorOrDestroy;
  Ze()(V, s);
  function w() {
  }
  function F(_, D, $) {
    a = a || it(), _ = _ || {}, typeof $ != "boolean" && ($ = D instanceof a), this.objectMode = !!_.objectMode, $ && (this.objectMode = this.objectMode || !!_.writableObjectMode), this.highWaterMark = R(this, _, "writableHighWaterMark", $), this.finalCalled = false, this.needDrain = false, this.ending = false, this.ended = false, this.finished = false, this.destroyed = false;
    var B = _.decodeStrings === false;
    this.decodeStrings = !B, this.defaultEncoding = _.defaultEncoding || "utf8", this.length = 0, this.writing = false, this.corked = 0, this.sync = true, this.bufferProcessing = false, this.onwrite = function(x) {
      _e(D, x);
    }, this.writecb = null, this.writelen = 0, this.bufferedRequest = null, this.lastBufferedRequest = null, this.pendingcb = 0, this.prefinished = false, this.errorEmitted = false, this.emitClose = _.emitClose !== false, this.autoDestroy = !!_.autoDestroy, this.bufferedRequestCount = 0, this.corkedRequestsFree = new e(this);
  }
  F.prototype.getBuffer = function() {
    for (var D = this.bufferedRequest, $ = []; D; ) $.push(D), D = D.next;
    return $;
  }, function() {
    try {
      Object.defineProperty(F.prototype, "buffer", { get: t.deprecate(function() {
        return this.getBuffer();
      }, "_writableState.buffer is deprecated. Use _writableState.getBuffer instead.", "DEP0003") });
    } catch {
    }
  }();
  var q;
  typeof Symbol == "function" && Symbol.hasInstance && typeof Function.prototype[Symbol.hasInstance] == "function" ? (q = Function.prototype[Symbol.hasInstance], Object.defineProperty(V, Symbol.hasInstance, { value: function(D) {
    return q.call(this, D) ? true : this !== V ? false : D && D._writableState instanceof F;
  } })) : q = function(D) {
    return D instanceof this;
  };
  function V(_) {
    a = a || it();
    var D = this instanceof a;
    if (!D && !q.call(V, this)) return new V(_);
    this._writableState = new F(_, this, D), this.writable = true, _ && (typeof _.write == "function" && (this._write = _.write), typeof _.writev == "function" && (this._writev = _.writev), typeof _.destroy == "function" && (this._destroy = _.destroy), typeof _.final == "function" && (this._final = _.final)), s.call(this);
  }
  V.prototype.pipe = function() {
    p(this, new j());
  };
  function K(_, D) {
    var $ = new o();
    p(_, $), Oe.nextTick(D, $);
  }
  function ee(_, D, $, B) {
    var x;
    return $ === null ? x = new y() : typeof $ != "string" && !D.objectMode && (x = new I("chunk", ["string", "Buffer"], $)), x ? (p(_, x), Oe.nextTick(B, x), false) : true;
  }
  V.prototype.write = function(_, D, $) {
    var B = this._writableState, x = false, m = !B.objectMode && d(_);
    return m && !h.isBuffer(_) && (_ = b(_)), typeof D == "function" && ($ = D, D = null), m ? D = "buffer" : D || (D = B.defaultEncoding), typeof $ != "function" && ($ = w), B.ending ? K(this, $) : (m || ee(this, B, _, $)) && (B.pendingcb++, x = k(this, B, m, _, D, $)), x;
  }, V.prototype.cork = function() {
    this._writableState.corked++;
  }, V.prototype.uncork = function() {
    var _ = this._writableState;
    _.corked && (_.corked--, !_.writing && !_.corked && !_.bufferProcessing && _.bufferedRequest && re(this, _));
  }, V.prototype.setDefaultEncoding = function(D) {
    if (typeof D == "string" && (D = D.toLowerCase()), !(["hex", "utf8", "utf-8", "ascii", "binary", "base64", "ucs2", "ucs-2", "utf16le", "utf-16le", "raw"].indexOf((D + "").toLowerCase()) > -1)) throw new n(D);
    return this._writableState.defaultEncoding = D, this;
  }, Object.defineProperty(V.prototype, "writableBuffer", { enumerable: false, get: function() {
    return this._writableState && this._writableState.getBuffer();
  } });
  function ue(_, D, $) {
    return !_.objectMode && _.decodeStrings !== false && typeof D == "string" && (D = h.from(D, $)), D;
  }
  Object.defineProperty(V.prototype, "writableHighWaterMark", { enumerable: false, get: function() {
    return this._writableState.highWaterMark;
  } });
  function k(_, D, $, B, x, m) {
    if (!$) {
      var S = ue(D, B, x);
      B !== S && ($ = true, x = "buffer", B = S);
    }
    var Y = D.objectMode ? 1 : B.length;
    D.length += Y;
    var ie = D.length < D.highWaterMark;
    if (ie || (D.needDrain = true), D.writing || D.corked) {
      var ge = D.lastBufferedRequest;
      D.lastBufferedRequest = { chunk: B, encoding: x, isBuf: $, callback: m, next: null }, ge ? ge.next = D.lastBufferedRequest : D.bufferedRequest = D.lastBufferedRequest, D.bufferedRequestCount += 1;
    } else de(_, D, false, Y, B, x, m);
    return ie;
  }
  function de(_, D, $, B, x, m, S) {
    D.writelen = B, D.writecb = S, D.writing = true, D.sync = true, D.destroyed ? D.onwrite(new O("write")) : $ ? _._writev(x, D.onwrite) : _._write(x, m, D.onwrite), D.sync = false;
  }
  function be(_, D, $, B, x) {
    --D.pendingcb, $ ? (Oe.nextTick(x, B), Oe.nextTick(W, _, D), _._writableState.errorEmitted = true, p(_, B)) : (x(B), _._writableState.errorEmitted = true, p(_, B), W(_, D));
  }
  function Ee(_) {
    _.writing = false, _.writecb = null, _.length -= _.writelen, _.writelen = 0;
  }
  function _e(_, D) {
    var $ = _._writableState, B = $.sync, x = $.writecb;
    if (typeof x != "function") throw new T();
    if (Ee($), D) be(_, $, B, D, x);
    else {
      var m = J($) || _.destroyed;
      !m && !$.corked && !$.bufferProcessing && $.bufferedRequest && re(_, $), B ? Oe.nextTick(Fe, _, $, m, x) : Fe(_, $, m, x);
    }
  }
  function Fe(_, D, $, B) {
    $ || ye(_, D), D.pendingcb--, B(), W(_, D);
  }
  function ye(_, D) {
    D.length === 0 && D.needDrain && (D.needDrain = false, _.emit("drain"));
  }
  function re(_, D) {
    D.bufferProcessing = true;
    var $ = D.bufferedRequest;
    if (_._writev && $ && $.next) {
      var B = D.bufferedRequestCount, x = new Array(B), m = D.corkedRequestsFree;
      m.entry = $;
      for (var S = 0, Y = true; $; ) x[S] = $, $.isBuf || (Y = false), $ = $.next, S += 1;
      x.allBuffers = Y, de(_, D, true, D.length, x, "", m.finish), D.pendingcb++, D.lastBufferedRequest = null, m.next ? (D.corkedRequestsFree = m.next, m.next = null) : D.corkedRequestsFree = new e(D), D.bufferedRequestCount = 0;
    } else {
      for (; $; ) {
        var ie = $.chunk, ge = $.encoding, ce = $.callback, me = D.objectMode ? 1 : ie.length;
        if (de(_, D, false, me, ie, ge, ce), $ = $.next, D.bufferedRequestCount--, D.writing) break;
      }
      $ === null && (D.lastBufferedRequest = null);
    }
    D.bufferedRequest = $, D.bufferProcessing = false;
  }
  V.prototype._write = function(_, D, $) {
    $(new A("_write()"));
  }, V.prototype._writev = null, V.prototype.end = function(_, D, $) {
    var B = this._writableState;
    return typeof _ == "function" ? ($ = _, _ = null, D = null) : typeof D == "function" && ($ = D, D = null), _ != null && this.write(_, D), B.corked && (B.corked = 1, this.uncork()), B.ending || P(this, B, $), this;
  }, Object.defineProperty(V.prototype, "writableLength", { enumerable: false, get: function() {
    return this._writableState.length;
  } });
  function J(_) {
    return _.ending && _.length === 0 && _.bufferedRequest === null && !_.finished && !_.writing;
  }
  function oe(_, D) {
    _._final(function($) {
      D.pendingcb--, $ && p(_, $), D.prefinished = true, _.emit("prefinish"), W(_, D);
    });
  }
  function ne(_, D) {
    !D.prefinished && !D.finalCalled && (typeof _._final == "function" && !D.destroyed ? (D.pendingcb++, D.finalCalled = true, Oe.nextTick(oe, _, D)) : (D.prefinished = true, _.emit("prefinish")));
  }
  function W(_, D) {
    var $ = J(D);
    if ($ && (ne(_, D), D.pendingcb === 0 && (D.finished = true, _.emit("finish"), D.autoDestroy))) {
      var B = _._readableState;
      (!B || B.autoDestroy && B.endEmitted) && _.destroy();
    }
    return $;
  }
  function P(_, D, $) {
    D.ending = true, W(_, D), $ && (D.finished ? Oe.nextTick($) : _.once("finish", $)), D.ended = true, _.writable = false;
  }
  function M(_, D, $) {
    var B = _.entry;
    for (_.entry = null; B; ) {
      var x = B.callback;
      D.pendingcb--, x($), B = B.next;
    }
    D.corkedRequestsFree.next = _;
  }
  return Object.defineProperty(V.prototype, "destroyed", { enumerable: false, get: function() {
    return this._writableState === void 0 ? false : this._writableState.destroyed;
  }, set: function(D) {
    this._writableState && (this._writableState.destroyed = D);
  } }), V.prototype.destroy = v.destroy, V.prototype._undestroy = v.undestroy, V.prototype._destroy = function(_, D) {
    D(_);
  }, Bn;
}
var Dn, ma;
function it() {
  if (ma) return Dn;
  ma = 1;
  var e = Object.keys || function(g) {
    var R = [];
    for (var L in g) R.push(L);
    return R;
  };
  Dn = b;
  var a = Is(), t = As();
  Ze()(b, a);
  for (var s = e(t.prototype), h = 0; h < s.length; h++) {
    var c = s[h];
    b.prototype[c] || (b.prototype[c] = t.prototype[c]);
  }
  function b(g) {
    if (!(this instanceof b)) return new b(g);
    a.call(this, g), t.call(this, g), this.allowHalfOpen = true, g && (g.readable === false && (this.readable = false), g.writable === false && (this.writable = false), g.allowHalfOpen === false && (this.allowHalfOpen = false, this.once("end", d)));
  }
  Object.defineProperty(b.prototype, "writableHighWaterMark", { enumerable: false, get: function() {
    return this._writableState.highWaterMark;
  } }), Object.defineProperty(b.prototype, "writableBuffer", { enumerable: false, get: function() {
    return this._writableState && this._writableState.getBuffer();
  } }), Object.defineProperty(b.prototype, "writableLength", { enumerable: false, get: function() {
    return this._writableState.length;
  } });
  function d() {
    this._writableState.ended || Oe.nextTick(v, this);
  }
  function v(g) {
    g.end();
  }
  return Object.defineProperty(b.prototype, "destroyed", { enumerable: false, get: function() {
    return this._readableState === void 0 || this._writableState === void 0 ? false : this._readableState.destroyed && this._writableState.destroyed;
  }, set: function(R) {
    this._readableState === void 0 || this._writableState === void 0 || (this._readableState.destroyed = R, this._writableState.destroyed = R);
  } }), Dn;
}
var Ln = {}, Bt = { exports: {} };
/*! safe-buffer. MIT License. Feross Aboukhadijeh <https://feross.org/opensource> */
var va;
function Yu() {
  return va || (va = 1, function(e, a) {
    var t = _t(), s = t.Buffer;
    function h(b, d) {
      for (var v in b) d[v] = b[v];
    }
    s.from && s.alloc && s.allocUnsafe && s.allocUnsafeSlow ? e.exports = t : (h(t, a), a.Buffer = c);
    function c(b, d, v) {
      return s(b, d, v);
    }
    c.prototype = Object.create(s.prototype), h(s, c), c.from = function(b, d, v) {
      if (typeof b == "number") throw new TypeError("Argument must not be a number");
      return s(b, d, v);
    }, c.alloc = function(b, d, v) {
      if (typeof b != "number") throw new TypeError("Argument must be a number");
      var g = s(b);
      return d !== void 0 ? typeof v == "string" ? g.fill(d, v) : g.fill(d) : g.fill(0), g;
    }, c.allocUnsafe = function(b) {
      if (typeof b != "number") throw new TypeError("Argument must be a number");
      return s(b);
    }, c.allocUnsafeSlow = function(b) {
      if (typeof b != "number") throw new TypeError("Argument must be a number");
      return t.SlowBuffer(b);
    };
  }(Bt, Bt.exports)), Bt.exports;
}
var ba;
function wa() {
  if (ba) return Ln;
  ba = 1;
  var e = Yu().Buffer, a = e.isEncoding || function(y) {
    switch (y = "" + y, y && y.toLowerCase()) {
      case "hex":
      case "utf8":
      case "utf-8":
      case "ascii":
      case "binary":
      case "base64":
      case "ucs2":
      case "ucs-2":
      case "utf16le":
      case "utf-16le":
      case "raw":
        return true;
      default:
        return false;
    }
  };
  function t(y) {
    if (!y) return "utf8";
    for (var o; ; ) switch (y) {
      case "utf8":
      case "utf-8":
        return "utf8";
      case "ucs2":
      case "ucs-2":
      case "utf16le":
      case "utf-16le":
        return "utf16le";
      case "latin1":
      case "binary":
        return "latin1";
      case "base64":
      case "ascii":
      case "hex":
        return y;
      default:
        if (o) return;
        y = ("" + y).toLowerCase(), o = true;
    }
  }
  function s(y) {
    var o = t(y);
    if (typeof o != "string" && (e.isEncoding === a || !a(y))) throw new Error("Unknown encoding: " + y);
    return o || y;
  }
  Ln.StringDecoder = h;
  function h(y) {
    this.encoding = s(y);
    var o;
    switch (this.encoding) {
      case "utf16le":
        this.text = L, this.end = I, o = 4;
        break;
      case "utf8":
        this.fillLast = v, o = 4;
        break;
      case "base64":
        this.text = A, this.end = T, o = 3;
        break;
      default:
        this.write = j, this.end = O;
        return;
    }
    this.lastNeed = 0, this.lastTotal = 0, this.lastChar = e.allocUnsafe(o);
  }
  h.prototype.write = function(y) {
    if (y.length === 0) return "";
    var o, n;
    if (this.lastNeed) {
      if (o = this.fillLast(y), o === void 0) return "";
      n = this.lastNeed, this.lastNeed = 0;
    } else n = 0;
    return n < y.length ? o ? o + this.text(y, n) : this.text(y, n) : o || "";
  }, h.prototype.end = R, h.prototype.text = g, h.prototype.fillLast = function(y) {
    if (this.lastNeed <= y.length) return y.copy(this.lastChar, this.lastTotal - this.lastNeed, 0, this.lastNeed), this.lastChar.toString(this.encoding, 0, this.lastTotal);
    y.copy(this.lastChar, this.lastTotal - this.lastNeed, 0, y.length), this.lastNeed -= y.length;
  };
  function c(y) {
    return y <= 127 ? 0 : y >> 5 === 6 ? 2 : y >> 4 === 14 ? 3 : y >> 3 === 30 ? 4 : y >> 6 === 2 ? -1 : -2;
  }
  function b(y, o, n) {
    var p = o.length - 1;
    if (p < n) return 0;
    var w = c(o[p]);
    return w >= 0 ? (w > 0 && (y.lastNeed = w - 1), w) : --p < n || w === -2 ? 0 : (w = c(o[p]), w >= 0 ? (w > 0 && (y.lastNeed = w - 2), w) : --p < n || w === -2 ? 0 : (w = c(o[p]), w >= 0 ? (w > 0 && (w === 2 ? w = 0 : y.lastNeed = w - 3), w) : 0));
  }
  function d(y, o, n) {
    if ((o[0] & 192) !== 128) return y.lastNeed = 0, "\uFFFD";
    if (y.lastNeed > 1 && o.length > 1) {
      if ((o[1] & 192) !== 128) return y.lastNeed = 1, "\uFFFD";
      if (y.lastNeed > 2 && o.length > 2 && (o[2] & 192) !== 128) return y.lastNeed = 2, "\uFFFD";
    }
  }
  function v(y) {
    var o = this.lastTotal - this.lastNeed, n = d(this, y);
    if (n !== void 0) return n;
    if (this.lastNeed <= y.length) return y.copy(this.lastChar, o, 0, this.lastNeed), this.lastChar.toString(this.encoding, 0, this.lastTotal);
    y.copy(this.lastChar, o, 0, y.length), this.lastNeed -= y.length;
  }
  function g(y, o) {
    var n = b(this, y, o);
    if (!this.lastNeed) return y.toString("utf8", o);
    this.lastTotal = n;
    var p = y.length - (n - this.lastNeed);
    return y.copy(this.lastChar, 0, p), y.toString("utf8", o, p);
  }
  function R(y) {
    var o = y && y.length ? this.write(y) : "";
    return this.lastNeed ? o + "\uFFFD" : o;
  }
  function L(y, o) {
    if ((y.length - o) % 2 === 0) {
      var n = y.toString("utf16le", o);
      if (n) {
        var p = n.charCodeAt(n.length - 1);
        if (p >= 55296 && p <= 56319) return this.lastNeed = 2, this.lastTotal = 4, this.lastChar[0] = y[y.length - 2], this.lastChar[1] = y[y.length - 1], n.slice(0, -1);
      }
      return n;
    }
    return this.lastNeed = 1, this.lastTotal = 2, this.lastChar[0] = y[y.length - 1], y.toString("utf16le", o, y.length - 1);
  }
  function I(y) {
    var o = y && y.length ? this.write(y) : "";
    if (this.lastNeed) {
      var n = this.lastTotal - this.lastNeed;
      return o + this.lastChar.toString("utf16le", 0, n);
    }
    return o;
  }
  function A(y, o) {
    var n = (y.length - o) % 3;
    return n === 0 ? y.toString("base64", o) : (this.lastNeed = 3 - n, this.lastTotal = 3, n === 1 ? this.lastChar[0] = y[y.length - 1] : (this.lastChar[0] = y[y.length - 2], this.lastChar[1] = y[y.length - 1]), y.toString("base64", o, y.length - n));
  }
  function T(y) {
    var o = y && y.length ? this.write(y) : "";
    return this.lastNeed ? o + this.lastChar.toString("base64", 0, 3 - this.lastNeed) : o;
  }
  function j(y) {
    return y.toString(this.encoding);
  }
  function O(y) {
    return y && y.length ? this.write(y) : "";
  }
  return Ln;
}
var Cn, Ea;
function ui() {
  if (Ea) return Cn;
  Ea = 1;
  var e = st().codes.ERR_STREAM_PREMATURE_CLOSE;
  function a(c) {
    var b = false;
    return function() {
      if (!b) {
        b = true;
        for (var d = arguments.length, v = new Array(d), g = 0; g < d; g++) v[g] = arguments[g];
        c.apply(this, v);
      }
    };
  }
  function t() {
  }
  function s(c) {
    return c.setHeader && typeof c.abort == "function";
  }
  function h(c, b, d) {
    if (typeof b == "function") return h(c, null, b);
    b || (b = {}), d = a(d || t);
    var v = b.readable || b.readable !== false && c.readable, g = b.writable || b.writable !== false && c.writable, R = function() {
      c.writable || I();
    }, L = c._writableState && c._writableState.finished, I = function() {
      g = false, L = true, v || d.call(c);
    }, A = c._readableState && c._readableState.endEmitted, T = function() {
      v = false, A = true, g || d.call(c);
    }, j = function(n) {
      d.call(c, n);
    }, O = function() {
      var n;
      if (v && !A) return (!c._readableState || !c._readableState.ended) && (n = new e()), d.call(c, n);
      if (g && !L) return (!c._writableState || !c._writableState.ended) && (n = new e()), d.call(c, n);
    }, y = function() {
      c.req.on("finish", I);
    };
    return s(c) ? (c.on("complete", I), c.on("abort", O), c.req ? y() : c.on("request", y)) : g && !c._writableState && (c.on("end", R), c.on("close", R)), c.on("end", T), c.on("finish", I), b.error !== false && c.on("error", j), c.on("close", O), function() {
      c.removeListener("complete", I), c.removeListener("abort", O), c.removeListener("request", y), c.req && c.req.removeListener("finish", I), c.removeListener("end", R), c.removeListener("close", R), c.removeListener("finish", I), c.removeListener("end", T), c.removeListener("error", j), c.removeListener("close", O);
    };
  }
  return Cn = h, Cn;
}
var Mn, _a;
function zu() {
  if (_a) return Mn;
  _a = 1;
  var e;
  function a(n, p, w) {
    return p = t(p), p in n ? Object.defineProperty(n, p, { value: w, enumerable: true, configurable: true, writable: true }) : n[p] = w, n;
  }
  function t(n) {
    var p = s(n, "string");
    return typeof p == "symbol" ? p : String(p);
  }
  function s(n, p) {
    if (typeof n != "object" || n === null) return n;
    var w = n[Symbol.toPrimitive];
    if (w !== void 0) {
      var F = w.call(n, p);
      if (typeof F != "object") return F;
      throw new TypeError("@@toPrimitive must return a primitive value.");
    }
    return (p === "string" ? String : Number)(n);
  }
  var h = ui(), c = Symbol("lastResolve"), b = Symbol("lastReject"), d = Symbol("error"), v = Symbol("ended"), g = Symbol("lastPromise"), R = Symbol("handlePromise"), L = Symbol("stream");
  function I(n, p) {
    return { value: n, done: p };
  }
  function A(n) {
    var p = n[c];
    if (p !== null) {
      var w = n[L].read();
      w !== null && (n[g] = null, n[c] = null, n[b] = null, p(I(w, false)));
    }
  }
  function T(n) {
    Oe.nextTick(A, n);
  }
  function j(n, p) {
    return function(w, F) {
      n.then(function() {
        if (p[v]) {
          w(I(void 0, true));
          return;
        }
        p[R](w, F);
      }, F);
    };
  }
  var O = Object.getPrototypeOf(function() {
  }), y = Object.setPrototypeOf((e = { get stream() {
    return this[L];
  }, next: function() {
    var p = this, w = this[d];
    if (w !== null) return Promise.reject(w);
    if (this[v]) return Promise.resolve(I(void 0, true));
    if (this[L].destroyed) return new Promise(function(K, ee) {
      Oe.nextTick(function() {
        p[d] ? ee(p[d]) : K(I(void 0, true));
      });
    });
    var F = this[g], q;
    if (F) q = new Promise(j(F, this));
    else {
      var V = this[L].read();
      if (V !== null) return Promise.resolve(I(V, false));
      q = new Promise(this[R]);
    }
    return this[g] = q, q;
  } }, a(e, Symbol.asyncIterator, function() {
    return this;
  }), a(e, "return", function() {
    var p = this;
    return new Promise(function(w, F) {
      p[L].destroy(null, function(q) {
        if (q) {
          F(q);
          return;
        }
        w(I(void 0, true));
      });
    });
  }), e), O), o = function(p) {
    var w, F = Object.create(y, (w = {}, a(w, L, { value: p, writable: true }), a(w, c, { value: null, writable: true }), a(w, b, { value: null, writable: true }), a(w, d, { value: null, writable: true }), a(w, v, { value: p._readableState.endEmitted, writable: true }), a(w, R, { value: function(V, K) {
      var ee = F[L].read();
      ee ? (F[g] = null, F[c] = null, F[b] = null, V(I(ee, false))) : (F[c] = V, F[b] = K);
    }, writable: true }), w));
    return F[g] = null, h(p, function(q) {
      if (q && q.code !== "ERR_STREAM_PREMATURE_CLOSE") {
        var V = F[b];
        V !== null && (F[g] = null, F[c] = null, F[b] = null, V(q)), F[d] = q;
        return;
      }
      var K = F[c];
      K !== null && (F[g] = null, F[c] = null, F[b] = null, K(I(void 0, true))), F[v] = true;
    }), p.on("readable", T.bind(null, F)), F;
  };
  return Mn = o, Mn;
}
var jn, Sa;
function Ku() {
  return Sa || (Sa = 1, jn = function() {
    throw new Error("Readable.from is not available in the browser");
  }), jn;
}
var qn, Ra;
function Is() {
  if (Ra) return qn;
  Ra = 1, qn = K;
  var e;
  K.ReadableState = V, St().EventEmitter;
  var a = function(S, Y) {
    return S.listeners(Y).length;
  }, t = Rs(), s = _t().Buffer, h = (typeof Ve < "u" ? Ve : typeof window < "u" ? window : typeof self < "u" ? self : {}).Uint8Array || function() {
  };
  function c(m) {
    return s.from(m);
  }
  function b(m) {
    return s.isBuffer(m) || m instanceof h;
  }
  var d = Ye(), v;
  d && d.debuglog ? v = d.debuglog("stream") : v = function() {
  };
  var g = Hu(), R = Os(), L = Ts(), I = L.getHighWaterMark, A = st().codes, T = A.ERR_INVALID_ARG_TYPE, j = A.ERR_STREAM_PUSH_AFTER_EOF, O = A.ERR_METHOD_NOT_IMPLEMENTED, y = A.ERR_STREAM_UNSHIFT_AFTER_END_EVENT, o, n, p;
  Ze()(K, t);
  var w = R.errorOrDestroy, F = ["error", "close", "destroy", "pause", "resume"];
  function q(m, S, Y) {
    if (typeof m.prependListener == "function") return m.prependListener(S, Y);
    !m._events || !m._events[S] ? m.on(S, Y) : Array.isArray(m._events[S]) ? m._events[S].unshift(Y) : m._events[S] = [Y, m._events[S]];
  }
  function V(m, S, Y) {
    e = e || it(), m = m || {}, typeof Y != "boolean" && (Y = S instanceof e), this.objectMode = !!m.objectMode, Y && (this.objectMode = this.objectMode || !!m.readableObjectMode), this.highWaterMark = I(this, m, "readableHighWaterMark", Y), this.buffer = new g(), this.length = 0, this.pipes = null, this.pipesCount = 0, this.flowing = null, this.ended = false, this.endEmitted = false, this.reading = false, this.sync = true, this.needReadable = false, this.emittedReadable = false, this.readableListening = false, this.resumeScheduled = false, this.paused = true, this.emitClose = m.emitClose !== false, this.autoDestroy = !!m.autoDestroy, this.destroyed = false, this.defaultEncoding = m.defaultEncoding || "utf8", this.awaitDrain = 0, this.readingMore = false, this.decoder = null, this.encoding = null, m.encoding && (o || (o = wa().StringDecoder), this.decoder = new o(m.encoding), this.encoding = m.encoding);
  }
  function K(m) {
    if (e = e || it(), !(this instanceof K)) return new K(m);
    var S = this instanceof e;
    this._readableState = new V(m, this, S), this.readable = true, m && (typeof m.read == "function" && (this._read = m.read), typeof m.destroy == "function" && (this._destroy = m.destroy)), t.call(this);
  }
  Object.defineProperty(K.prototype, "destroyed", { enumerable: false, get: function() {
    return this._readableState === void 0 ? false : this._readableState.destroyed;
  }, set: function(S) {
    this._readableState && (this._readableState.destroyed = S);
  } }), K.prototype.destroy = R.destroy, K.prototype._undestroy = R.undestroy, K.prototype._destroy = function(m, S) {
    S(m);
  }, K.prototype.push = function(m, S) {
    var Y = this._readableState, ie;
    return Y.objectMode ? ie = true : typeof m == "string" && (S = S || Y.defaultEncoding, S !== Y.encoding && (m = s.from(m, S), S = ""), ie = true), ee(this, m, S, false, ie);
  }, K.prototype.unshift = function(m) {
    return ee(this, m, null, true, false);
  };
  function ee(m, S, Y, ie, ge) {
    v("readableAddChunk", S);
    var ce = m._readableState;
    if (S === null) ce.reading = false, _e(m, ce);
    else {
      var me;
      if (ge || (me = k(ce, S)), me) w(m, me);
      else if (ce.objectMode || S && S.length > 0) if (typeof S != "string" && !ce.objectMode && Object.getPrototypeOf(S) !== s.prototype && (S = c(S)), ie) ce.endEmitted ? w(m, new y()) : ue(m, ce, S, true);
      else if (ce.ended) w(m, new j());
      else {
        if (ce.destroyed) return false;
        ce.reading = false, ce.decoder && !Y ? (S = ce.decoder.write(S), ce.objectMode || S.length !== 0 ? ue(m, ce, S, false) : re(m, ce)) : ue(m, ce, S, false);
      }
      else ie || (ce.reading = false, re(m, ce));
    }
    return !ce.ended && (ce.length < ce.highWaterMark || ce.length === 0);
  }
  function ue(m, S, Y, ie) {
    S.flowing && S.length === 0 && !S.sync ? (S.awaitDrain = 0, m.emit("data", Y)) : (S.length += S.objectMode ? 1 : Y.length, ie ? S.buffer.unshift(Y) : S.buffer.push(Y), S.needReadable && Fe(m)), re(m, S);
  }
  function k(m, S) {
    var Y;
    return !b(S) && typeof S != "string" && S !== void 0 && !m.objectMode && (Y = new T("chunk", ["string", "Buffer", "Uint8Array"], S)), Y;
  }
  K.prototype.isPaused = function() {
    return this._readableState.flowing === false;
  }, K.prototype.setEncoding = function(m) {
    o || (o = wa().StringDecoder);
    var S = new o(m);
    this._readableState.decoder = S, this._readableState.encoding = this._readableState.decoder.encoding;
    for (var Y = this._readableState.buffer.head, ie = ""; Y !== null; ) ie += S.write(Y.data), Y = Y.next;
    return this._readableState.buffer.clear(), ie !== "" && this._readableState.buffer.push(ie), this._readableState.length = ie.length, this;
  };
  var de = 1073741824;
  function be(m) {
    return m >= de ? m = de : (m--, m |= m >>> 1, m |= m >>> 2, m |= m >>> 4, m |= m >>> 8, m |= m >>> 16, m++), m;
  }
  function Ee(m, S) {
    return m <= 0 || S.length === 0 && S.ended ? 0 : S.objectMode ? 1 : m !== m ? S.flowing && S.length ? S.buffer.head.data.length : S.length : (m > S.highWaterMark && (S.highWaterMark = be(m)), m <= S.length ? m : S.ended ? S.length : (S.needReadable = true, 0));
  }
  K.prototype.read = function(m) {
    v("read", m), m = parseInt(m, 10);
    var S = this._readableState, Y = m;
    if (m !== 0 && (S.emittedReadable = false), m === 0 && S.needReadable && ((S.highWaterMark !== 0 ? S.length >= S.highWaterMark : S.length > 0) || S.ended)) return v("read: emitReadable", S.length, S.ended), S.length === 0 && S.ended ? $(this) : Fe(this), null;
    if (m = Ee(m, S), m === 0 && S.ended) return S.length === 0 && $(this), null;
    var ie = S.needReadable;
    v("need readable", ie), (S.length === 0 || S.length - m < S.highWaterMark) && (ie = true, v("length less than watermark", ie)), S.ended || S.reading ? (ie = false, v("reading or ended", ie)) : ie && (v("do read"), S.reading = true, S.sync = true, S.length === 0 && (S.needReadable = true), this._read(S.highWaterMark), S.sync = false, S.reading || (m = Ee(Y, S)));
    var ge;
    return m > 0 ? ge = D(m, S) : ge = null, ge === null ? (S.needReadable = S.length <= S.highWaterMark, m = 0) : (S.length -= m, S.awaitDrain = 0), S.length === 0 && (S.ended || (S.needReadable = true), Y !== m && S.ended && $(this)), ge !== null && this.emit("data", ge), ge;
  };
  function _e(m, S) {
    if (v("onEofChunk"), !S.ended) {
      if (S.decoder) {
        var Y = S.decoder.end();
        Y && Y.length && (S.buffer.push(Y), S.length += S.objectMode ? 1 : Y.length);
      }
      S.ended = true, S.sync ? Fe(m) : (S.needReadable = false, S.emittedReadable || (S.emittedReadable = true, ye(m)));
    }
  }
  function Fe(m) {
    var S = m._readableState;
    v("emitReadable", S.needReadable, S.emittedReadable), S.needReadable = false, S.emittedReadable || (v("emitReadable", S.flowing), S.emittedReadable = true, Oe.nextTick(ye, m));
  }
  function ye(m) {
    var S = m._readableState;
    v("emitReadable_", S.destroyed, S.length, S.ended), !S.destroyed && (S.length || S.ended) && (m.emit("readable"), S.emittedReadable = false), S.needReadable = !S.flowing && !S.ended && S.length <= S.highWaterMark, _(m);
  }
  function re(m, S) {
    S.readingMore || (S.readingMore = true, Oe.nextTick(J, m, S));
  }
  function J(m, S) {
    for (; !S.reading && !S.ended && (S.length < S.highWaterMark || S.flowing && S.length === 0); ) {
      var Y = S.length;
      if (v("maybeReadMore read 0"), m.read(0), Y === S.length) break;
    }
    S.readingMore = false;
  }
  K.prototype._read = function(m) {
    w(this, new O("_read()"));
  }, K.prototype.pipe = function(m, S) {
    var Y = this, ie = this._readableState;
    switch (ie.pipesCount) {
      case 0:
        ie.pipes = m;
        break;
      case 1:
        ie.pipes = [ie.pipes, m];
        break;
      default:
        ie.pipes.push(m);
        break;
    }
    ie.pipesCount += 1, v("pipe count=%d opts=%j", ie.pipesCount, S);
    var ge = (!S || S.end !== false) && m !== Oe.stdout && m !== Oe.stderr, ce = ge ? Ie : he;
    ie.endEmitted ? Oe.nextTick(ce) : Y.once("end", ce), m.on("unpipe", me);
    function me(ve, pe) {
      v("onunpipe"), ve === Y && pe && pe.hasUnpiped === false && (pe.hasUnpiped = true, De());
    }
    function Ie() {
      v("onend"), m.end();
    }
    var te = oe(Y);
    m.on("drain", te);
    var Le = false;
    function De() {
      v("cleanup"), m.removeListener("close", H), m.removeListener("finish", X), m.removeListener("drain", te), m.removeListener("error", Ne), m.removeListener("unpipe", me), Y.removeListener("end", Ie), Y.removeListener("end", he), Y.removeListener("data", Ae), Le = true, ie.awaitDrain && (!m._writableState || m._writableState.needDrain) && te();
    }
    Y.on("data", Ae);
    function Ae(ve) {
      v("ondata");
      var pe = m.write(ve);
      v("dest.write", pe), pe === false && ((ie.pipesCount === 1 && ie.pipes === m || ie.pipesCount > 1 && x(ie.pipes, m) !== -1) && !Le && (v("false write response, pause", ie.awaitDrain), ie.awaitDrain++), Y.pause());
    }
    function Ne(ve) {
      v("onerror", ve), he(), m.removeListener("error", Ne), a(m, "error") === 0 && w(m, ve);
    }
    q(m, "error", Ne);
    function H() {
      m.removeListener("finish", X), he();
    }
    m.once("close", H);
    function X() {
      v("onfinish"), m.removeListener("close", H), he();
    }
    m.once("finish", X);
    function he() {
      v("unpipe"), Y.unpipe(m);
    }
    return m.emit("pipe", Y), ie.flowing || (v("pipe resume"), Y.resume()), m;
  };
  function oe(m) {
    return function() {
      var Y = m._readableState;
      v("pipeOnDrain", Y.awaitDrain), Y.awaitDrain && Y.awaitDrain--, Y.awaitDrain === 0 && a(m, "data") && (Y.flowing = true, _(m));
    };
  }
  K.prototype.unpipe = function(m) {
    var S = this._readableState, Y = { hasUnpiped: false };
    if (S.pipesCount === 0) return this;
    if (S.pipesCount === 1) return m && m !== S.pipes ? this : (m || (m = S.pipes), S.pipes = null, S.pipesCount = 0, S.flowing = false, m && m.emit("unpipe", this, Y), this);
    if (!m) {
      var ie = S.pipes, ge = S.pipesCount;
      S.pipes = null, S.pipesCount = 0, S.flowing = false;
      for (var ce = 0; ce < ge; ce++) ie[ce].emit("unpipe", this, { hasUnpiped: false });
      return this;
    }
    var me = x(S.pipes, m);
    return me === -1 ? this : (S.pipes.splice(me, 1), S.pipesCount -= 1, S.pipesCount === 1 && (S.pipes = S.pipes[0]), m.emit("unpipe", this, Y), this);
  }, K.prototype.on = function(m, S) {
    var Y = t.prototype.on.call(this, m, S), ie = this._readableState;
    return m === "data" ? (ie.readableListening = this.listenerCount("readable") > 0, ie.flowing !== false && this.resume()) : m === "readable" && !ie.endEmitted && !ie.readableListening && (ie.readableListening = ie.needReadable = true, ie.flowing = false, ie.emittedReadable = false, v("on readable", ie.length, ie.reading), ie.length ? Fe(this) : ie.reading || Oe.nextTick(W, this)), Y;
  }, K.prototype.addListener = K.prototype.on, K.prototype.removeListener = function(m, S) {
    var Y = t.prototype.removeListener.call(this, m, S);
    return m === "readable" && Oe.nextTick(ne, this), Y;
  }, K.prototype.removeAllListeners = function(m) {
    var S = t.prototype.removeAllListeners.apply(this, arguments);
    return (m === "readable" || m === void 0) && Oe.nextTick(ne, this), S;
  };
  function ne(m) {
    var S = m._readableState;
    S.readableListening = m.listenerCount("readable") > 0, S.resumeScheduled && !S.paused ? S.flowing = true : m.listenerCount("data") > 0 && m.resume();
  }
  function W(m) {
    v("readable nexttick read 0"), m.read(0);
  }
  K.prototype.resume = function() {
    var m = this._readableState;
    return m.flowing || (v("resume"), m.flowing = !m.readableListening, P(this, m)), m.paused = false, this;
  };
  function P(m, S) {
    S.resumeScheduled || (S.resumeScheduled = true, Oe.nextTick(M, m, S));
  }
  function M(m, S) {
    v("resume", S.reading), S.reading || m.read(0), S.resumeScheduled = false, m.emit("resume"), _(m), S.flowing && !S.reading && m.read(0);
  }
  K.prototype.pause = function() {
    return v("call pause flowing=%j", this._readableState.flowing), this._readableState.flowing !== false && (v("pause"), this._readableState.flowing = false, this.emit("pause")), this._readableState.paused = true, this;
  };
  function _(m) {
    var S = m._readableState;
    for (v("flow", S.flowing); S.flowing && m.read() !== null; ) ;
  }
  K.prototype.wrap = function(m) {
    var S = this, Y = this._readableState, ie = false;
    m.on("end", function() {
      if (v("wrapped end"), Y.decoder && !Y.ended) {
        var me = Y.decoder.end();
        me && me.length && S.push(me);
      }
      S.push(null);
    }), m.on("data", function(me) {
      if (v("wrapped data"), Y.decoder && (me = Y.decoder.write(me)), !(Y.objectMode && me == null) && !(!Y.objectMode && (!me || !me.length))) {
        var Ie = S.push(me);
        Ie || (ie = true, m.pause());
      }
    });
    for (var ge in m) this[ge] === void 0 && typeof m[ge] == "function" && (this[ge] = /* @__PURE__ */ function(Ie) {
      return function() {
        return m[Ie].apply(m, arguments);
      };
    }(ge));
    for (var ce = 0; ce < F.length; ce++) m.on(F[ce], this.emit.bind(this, F[ce]));
    return this._read = function(me) {
      v("wrapped _read", me), ie && (ie = false, m.resume());
    }, this;
  }, typeof Symbol == "function" && (K.prototype[Symbol.asyncIterator] = function() {
    return n === void 0 && (n = zu()), n(this);
  }), Object.defineProperty(K.prototype, "readableHighWaterMark", { enumerable: false, get: function() {
    return this._readableState.highWaterMark;
  } }), Object.defineProperty(K.prototype, "readableBuffer", { enumerable: false, get: function() {
    return this._readableState && this._readableState.buffer;
  } }), Object.defineProperty(K.prototype, "readableFlowing", { enumerable: false, get: function() {
    return this._readableState.flowing;
  }, set: function(S) {
    this._readableState && (this._readableState.flowing = S);
  } }), K._fromList = D, Object.defineProperty(K.prototype, "readableLength", { enumerable: false, get: function() {
    return this._readableState.length;
  } });
  function D(m, S) {
    if (S.length === 0) return null;
    var Y;
    return S.objectMode ? Y = S.buffer.shift() : !m || m >= S.length ? (S.decoder ? Y = S.buffer.join("") : S.buffer.length === 1 ? Y = S.buffer.first() : Y = S.buffer.concat(S.length), S.buffer.clear()) : Y = S.buffer.consume(m, S.decoder), Y;
  }
  function $(m) {
    var S = m._readableState;
    v("endReadable", S.endEmitted), S.endEmitted || (S.ended = true, Oe.nextTick(B, S, m));
  }
  function B(m, S) {
    if (v("endReadableNT", m.endEmitted, m.length), !m.endEmitted && m.length === 0 && (m.endEmitted = true, S.readable = false, S.emit("end"), m.autoDestroy)) {
      var Y = S._writableState;
      (!Y || Y.autoDestroy && Y.finished) && S.destroy();
    }
  }
  typeof Symbol == "function" && (K.from = function(m, S) {
    return p === void 0 && (p = Ku()), p(K, m, S);
  });
  function x(m, S) {
    for (var Y = 0, ie = m.length; Y < ie; Y++) if (m[Y] === S) return Y;
    return -1;
  }
  return qn;
}
var kn, Oa;
function Fs() {
  if (Oa) return kn;
  Oa = 1, kn = d;
  var e = st().codes, a = e.ERR_METHOD_NOT_IMPLEMENTED, t = e.ERR_MULTIPLE_CALLBACK, s = e.ERR_TRANSFORM_ALREADY_TRANSFORMING, h = e.ERR_TRANSFORM_WITH_LENGTH_0, c = it();
  Ze()(d, c);
  function b(R, L) {
    var I = this._transformState;
    I.transforming = false;
    var A = I.writecb;
    if (A === null) return this.emit("error", new t());
    I.writechunk = null, I.writecb = null, L != null && this.push(L), A(R);
    var T = this._readableState;
    T.reading = false, (T.needReadable || T.length < T.highWaterMark) && this._read(T.highWaterMark);
  }
  function d(R) {
    if (!(this instanceof d)) return new d(R);
    c.call(this, R), this._transformState = { afterTransform: b.bind(this), needTransform: false, transforming: false, writecb: null, writechunk: null, writeencoding: null }, this._readableState.needReadable = true, this._readableState.sync = false, R && (typeof R.transform == "function" && (this._transform = R.transform), typeof R.flush == "function" && (this._flush = R.flush)), this.on("prefinish", v);
  }
  function v() {
    var R = this;
    typeof this._flush == "function" && !this._readableState.destroyed ? this._flush(function(L, I) {
      g(R, L, I);
    }) : g(this, null, null);
  }
  d.prototype.push = function(R, L) {
    return this._transformState.needTransform = false, c.prototype.push.call(this, R, L);
  }, d.prototype._transform = function(R, L, I) {
    I(new a("_transform()"));
  }, d.prototype._write = function(R, L, I) {
    var A = this._transformState;
    if (A.writecb = I, A.writechunk = R, A.writeencoding = L, !A.transforming) {
      var T = this._readableState;
      (A.needTransform || T.needReadable || T.length < T.highWaterMark) && this._read(T.highWaterMark);
    }
  }, d.prototype._read = function(R) {
    var L = this._transformState;
    L.writechunk !== null && !L.transforming ? (L.transforming = true, this._transform(L.writechunk, L.writeencoding, L.afterTransform)) : L.needTransform = true;
  }, d.prototype._destroy = function(R, L) {
    c.prototype._destroy.call(this, R, function(I) {
      L(I);
    });
  };
  function g(R, L, I) {
    if (L) return R.emit("error", L);
    if (I != null && R.push(I), R._writableState.length) throw new h();
    if (R._transformState.transforming) throw new s();
    return R.push(null);
  }
  return kn;
}
var xn, Ta;
function Ju() {
  if (Ta) return xn;
  Ta = 1, xn = a;
  var e = Fs();
  Ze()(a, e);
  function a(t) {
    if (!(this instanceof a)) return new a(t);
    e.call(this, t);
  }
  return a.prototype._transform = function(t, s, h) {
    h(null, t);
  }, xn;
}
var Un, Aa;
function Xu() {
  if (Aa) return Un;
  Aa = 1;
  var e;
  function a(I) {
    var A = false;
    return function() {
      A || (A = true, I.apply(void 0, arguments));
    };
  }
  var t = st().codes, s = t.ERR_MISSING_ARGS, h = t.ERR_STREAM_DESTROYED;
  function c(I) {
    if (I) throw I;
  }
  function b(I) {
    return I.setHeader && typeof I.abort == "function";
  }
  function d(I, A, T, j) {
    j = a(j);
    var O = false;
    I.on("close", function() {
      O = true;
    }), e === void 0 && (e = ui()), e(I, { readable: A, writable: T }, function(o) {
      if (o) return j(o);
      O = true, j();
    });
    var y = false;
    return function(o) {
      if (!O && !y) {
        if (y = true, b(I)) return I.abort();
        if (typeof I.destroy == "function") return I.destroy();
        j(o || new h("pipe"));
      }
    };
  }
  function v(I) {
    I();
  }
  function g(I, A) {
    return I.pipe(A);
  }
  function R(I) {
    return !I.length || typeof I[I.length - 1] != "function" ? c : I.pop();
  }
  function L() {
    for (var I = arguments.length, A = new Array(I), T = 0; T < I; T++) A[T] = arguments[T];
    var j = R(A);
    if (Array.isArray(A[0]) && (A = A[0]), A.length < 2) throw new s("streams");
    var O, y = A.map(function(o, n) {
      var p = n < A.length - 1, w = n > 0;
      return d(o, p, w, function(F) {
        O || (O = F), F && y.forEach(v), !p && (y.forEach(v), j(O));
      });
    });
    return A.reduce(g);
  }
  return Un = L, Un;
}
var $n, Ia;
function Qu() {
  if (Ia) return $n;
  Ia = 1, $n = t;
  var e = St().EventEmitter, a = Ze();
  a(t, e), t.Readable = Is(), t.Writable = As(), t.Duplex = it(), t.Transform = Fs(), t.PassThrough = Ju(), t.finished = ui(), t.pipeline = Xu(), t.Stream = t;
  function t() {
    e.call(this);
  }
  return t.prototype.pipe = function(s, h) {
    var c = this;
    function b(A) {
      s.writable && s.write(A) === false && c.pause && c.pause();
    }
    c.on("data", b);
    function d() {
      c.readable && c.resume && c.resume();
    }
    s.on("drain", d), !s._isStdio && (!h || h.end !== false) && (c.on("end", g), c.on("close", R));
    var v = false;
    function g() {
      v || (v = true, s.end());
    }
    function R() {
      v || (v = true, typeof s.destroy == "function" && s.destroy());
    }
    function L(A) {
      if (I(), e.listenerCount(this, "error") === 0) throw A;
    }
    c.on("error", L), s.on("error", L);
    function I() {
      c.removeListener("data", b), s.removeListener("drain", d), c.removeListener("end", g), c.removeListener("close", R), c.removeListener("error", L), s.removeListener("error", L), c.removeListener("end", I), c.removeListener("close", I), s.removeListener("close", I);
    }
    return c.on("end", I), c.on("close", I), s.on("close", I), s.emit("pipe", c), s;
  }, $n;
}
var lt = {}, Wn = {}, Xe = {}, Fa;
function li() {
  if (Fa) return Xe;
  Fa = 1, Object.defineProperty(Xe, "__esModule", { value: true }), Xe.FLAGS = Xe.ERRSTR = void 0;
  const e = Qe();
  Xe.ERRSTR = { PATH_STR: "path must be a string, Buffer, or Uint8Array", FD: "fd must be a file descriptor", MODE_INT: "mode must be an int", CB: "callback must be a function", UID: "uid must be an unsigned int", GID: "gid must be an unsigned int", LEN: "len must be an integer", ATIME: "atime must be an integer", MTIME: "mtime must be an integer", PREFIX: "filename prefix is required", BUFFER: "buffer must be an instance of Buffer or StaticBuffer", OFFSET: "offset must be an integer", LENGTH: "length must be an integer", POSITION: "position must be an integer" };
  const { O_RDONLY: a, O_WRONLY: t, O_RDWR: s, O_CREAT: h, O_EXCL: c, O_TRUNC: b, O_APPEND: d, O_SYNC: v } = e.constants;
  var g;
  return function(R) {
    R[R.r = a] = "r", R[R["r+"] = s] = "r+", R[R.rs = a | v] = "rs", R[R.sr = R.rs] = "sr", R[R["rs+"] = s | v] = "rs+", R[R["sr+"] = R["rs+"]] = "sr+", R[R.w = t | h | b] = "w", R[R.wx = t | h | b | c] = "wx", R[R.xw = R.wx] = "xw", R[R["w+"] = s | h | b] = "w+", R[R["wx+"] = s | h | b | c] = "wx+", R[R["xw+"] = R["wx+"]] = "xw+", R[R.a = t | d | h] = "a", R[R.ax = t | d | h | c] = "ax", R[R.xa = R.ax] = "xa", R[R["a+"] = s | d | h] = "a+", R[R["ax+"] = s | d | h | c] = "ax+", R[R["xa+"] = R["ax+"]] = "xa+";
  }(g || (Xe.FLAGS = g = {})), Xe;
}
var Pa;
function Rt() {
  return Pa || (Pa = 1, function(e) {
    Object.defineProperty(e, "__esModule", { value: true }), e.unixify = e.getWriteSyncArgs = e.getWriteArgs = e.bufToUint8 = e.isWin = void 0, e.promisify = d, e.validateCallback = v, e.modeToNumber = R, e.nullCheck = L, e.pathToFilename = A, e.createError = de, e.genRndStr6 = be, e.flagsToNumber = Ee, e.isFd = _e, e.validateFd = Fe, e.streamToBuffer = ye, e.dataToBuffer = re, e.bufferToEncoding = W, e.isReadableStream = P;
    const a = li(), t = ws(), s = vt(), h = xt(), c = vt(), b = Ss();
    e.isWin = Oe.platform === "win32";
    function d(B, x, m = (S) => S) {
      return (...S) => new Promise((Y, ie) => {
        B[x].bind(B)(...S, (ge, ce) => ge ? ie(ge) : Y(m(ce)));
      });
    }
    function v(B) {
      if (typeof B != "function") throw TypeError(a.ERRSTR.CB);
      return B;
    }
    function g(B, x) {
      if (typeof B == "number") return B;
      if (typeof B == "string") return parseInt(B, 8);
      if (x) return R(x);
    }
    function R(B, x) {
      const m = g(B, x);
      if (typeof m != "number" || isNaN(m)) throw new TypeError(a.ERRSTR.MODE_INT);
      return m;
    }
    function L(B, x) {
      if (("" + B).indexOf("\0") !== -1) {
        const m = new Error("Path must be a string without null bytes");
        if (m.code = "ENOENT", typeof x != "function") throw m;
        return (0, b.default)(() => {
          x(m);
        }), false;
      }
      return true;
    }
    function I(B) {
      if (B.hostname !== "") throw new t.TypeError("ERR_INVALID_FILE_URL_HOST", Oe.platform);
      const x = B.pathname;
      for (let m = 0; m < x.length; m++) if (x[m] === "%") {
        const S = x.codePointAt(m + 2) | 32;
        if (x[m + 1] === "2" && S === 102) throw new t.TypeError("ERR_INVALID_FILE_URL_PATH", "must not include encoded / characters");
      }
      return decodeURIComponent(x);
    }
    function A(B) {
      if (B instanceof Uint8Array && (B = (0, c.bufferFrom)(B)), typeof B != "string" && !s.Buffer.isBuffer(B)) {
        try {
          if (!(B instanceof mu.URL)) throw new TypeError(a.ERRSTR.PATH_STR);
        } catch {
          throw new TypeError(a.ERRSTR.PATH_STR);
        }
        B = I(B);
      }
      const x = String(B);
      return L(x), x;
    }
    const T = "ENOENT", j = "EBADF", O = "EINVAL", y = "EPERM", o = "EPROTO", n = "EEXIST", p = "ENOTDIR", w = "EMFILE", F = "EACCES", q = "EISDIR", V = "ENOTEMPTY", K = "ENOSYS", ee = "ERR_FS_EISDIR", ue = "ERR_OUT_OF_RANGE";
    function k(B, x = "", m = "", S = "") {
      let Y = "";
      switch (m && (Y = ` '${m}'`), S && (Y += ` -> '${S}'`), B) {
        case T:
          return `ENOENT: no such file or directory, ${x}${Y}`;
        case j:
          return `EBADF: bad file descriptor, ${x}${Y}`;
        case O:
          return `EINVAL: invalid argument, ${x}${Y}`;
        case y:
          return `EPERM: operation not permitted, ${x}${Y}`;
        case o:
          return `EPROTO: protocol error, ${x}${Y}`;
        case n:
          return `EEXIST: file already exists, ${x}${Y}`;
        case p:
          return `ENOTDIR: not a directory, ${x}${Y}`;
        case q:
          return `EISDIR: illegal operation on a directory, ${x}${Y}`;
        case F:
          return `EACCES: permission denied, ${x}${Y}`;
        case V:
          return `ENOTEMPTY: directory not empty, ${x}${Y}`;
        case w:
          return `EMFILE: too many open files, ${x}${Y}`;
        case K:
          return `ENOSYS: function not implemented, ${x}${Y}`;
        case ee:
          return `[ERR_FS_EISDIR]: Path is a directory: ${x} returned EISDIR (is a directory) ${m}`;
        case ue:
          return `[ERR_OUT_OF_RANGE]: value out of range, ${x}${Y}`;
        default:
          return `${B}: error occurred, ${x}${Y}`;
      }
    }
    function de(B, x = "", m = "", S = "", Y = Error) {
      const ie = new Y(k(B, x, m, S));
      return ie.code = B, m && (ie.path = m), ie;
    }
    function be() {
      const B = (Math.random() + 1).toString(36).substring(2, 8);
      return B.length === 6 ? B : be();
    }
    function Ee(B) {
      if (typeof B == "number") return B;
      if (typeof B == "string") {
        const x = a.FLAGS[B];
        if (typeof x < "u") return x;
      }
      throw new t.TypeError("ERR_INVALID_OPT_VALUE", "flags", B);
    }
    function _e(B) {
      return B >>> 0 === B;
    }
    function Fe(B) {
      if (!_e(B)) throw TypeError(a.ERRSTR.FD);
    }
    function ye(B) {
      const x = [];
      return new Promise((m, S) => {
        B.on("data", (Y) => x.push(Y)), B.on("end", () => m(s.Buffer.concat(x))), B.on("error", S);
      });
    }
    function re(B, x = h.ENCODING_UTF8) {
      return s.Buffer.isBuffer(B) ? B : B instanceof Uint8Array ? (0, c.bufferFrom)(B) : (0, c.bufferFrom)(String(B), x);
    }
    const J = (B) => new Uint8Array(B.buffer, B.byteOffset, B.byteLength);
    e.bufToUint8 = J;
    const oe = (B, x, m, S, Y, ie) => {
      Fe(B);
      let ge = 0, ce, me = null, Ie, te;
      const Le = typeof x, De = typeof m, Ae = typeof S, Ne = typeof Y;
      Le !== "string" ? De === "function" ? te = m : Ae === "function" ? (ge = m | 0, te = S) : Ne === "function" ? (ge = m | 0, ce = S, te = Y) : (ge = m | 0, ce = S, me = Y, te = ie) : De === "function" ? te = m : Ae === "function" ? (me = m, te = S) : Ne === "function" && (me = m, Ie = S, te = Y);
      const H = re(x, Ie);
      Le !== "string" ? typeof ce > "u" && (ce = H.length) : (ge = 0, ce = H.length);
      const X = v(te);
      return [B, Le === "string", H, ge, ce, me, X];
    };
    e.getWriteArgs = oe;
    const ne = (B, x, m, S, Y) => {
      Fe(B);
      let ie, ge, ce, me;
      const Ie = typeof x != "string";
      Ie ? (ge = (m || 0) | 0, ce = S, me = Y) : (me = m, ie = S);
      const te = re(x, ie);
      return Ie ? typeof ce > "u" && (ce = te.length) : (ge = 0, ce = te.length), [B, te, ge || 0, ce, me];
    };
    e.getWriteSyncArgs = ne;
    function W(B, x) {
      return !x || x === "buffer" ? B : B.toString(x);
    }
    function P(B) {
      return B !== null && typeof B == "object" && typeof B.pipe == "function" && typeof B.on == "function" && B.readable === true;
    }
    const M = (B, x) => {
      let m = B[x];
      return x > 0 && (m === "/" || e.isWin && m === "\\");
    }, _ = (B) => {
      let x = B.length - 1;
      if (x < 2) return B;
      for (; M(B, x); ) x--;
      return B.substr(0, x + 1);
    }, D = (B, x) => {
      if (typeof B != "string") throw new TypeError("expected a string");
      return B = B.replace(/[\\\/]+/g, "/"), x !== false && (B = _(B)), B;
    }, $ = (B, x = true) => e.isWin ? (B = D(B, x), B.replace(/^([a-zA-Z]+:|\.\/)/, "")) : B;
    e.unixify = $;
  }(Wn)), Wn;
}
var Na;
function Zu() {
  if (Na) return lt;
  Na = 1, Object.defineProperty(lt, "__esModule", { value: true }), lt.FileHandle = void 0;
  const e = Rt();
  let a = class {
    constructor(s, h) {
      this.fs = s, this.fd = h;
    }
    appendFile(s, h) {
      return (0, e.promisify)(this.fs, "appendFile")(this.fd, s, h);
    }
    chmod(s) {
      return (0, e.promisify)(this.fs, "fchmod")(this.fd, s);
    }
    chown(s, h) {
      return (0, e.promisify)(this.fs, "fchown")(this.fd, s, h);
    }
    close() {
      return (0, e.promisify)(this.fs, "close")(this.fd);
    }
    datasync() {
      return (0, e.promisify)(this.fs, "fdatasync")(this.fd);
    }
    createReadStream(s) {
      return this.fs.createReadStream("", Object.assign(Object.assign({}, s), { fd: this }));
    }
    createWriteStream(s) {
      return this.fs.createWriteStream("", Object.assign(Object.assign({}, s), { fd: this }));
    }
    readableWebStream(s) {
      return new ReadableStream({ pull: async (h) => {
        const c = await this.readFile();
        h.enqueue(c), h.close();
      } });
    }
    read(s, h, c, b) {
      return (0, e.promisify)(this.fs, "read", (d) => ({ bytesRead: d, buffer: s }))(this.fd, s, h, c, b);
    }
    readv(s, h) {
      return (0, e.promisify)(this.fs, "readv", (c) => ({ bytesRead: c, buffers: s }))(this.fd, s, h);
    }
    readFile(s) {
      return (0, e.promisify)(this.fs, "readFile")(this.fd, s);
    }
    stat(s) {
      return (0, e.promisify)(this.fs, "fstat")(this.fd, s);
    }
    sync() {
      return (0, e.promisify)(this.fs, "fsync")(this.fd);
    }
    truncate(s) {
      return (0, e.promisify)(this.fs, "ftruncate")(this.fd, s);
    }
    utimes(s, h) {
      return (0, e.promisify)(this.fs, "futimes")(this.fd, s, h);
    }
    write(s, h, c, b) {
      return (0, e.promisify)(this.fs, "write", (d) => ({ bytesWritten: d, buffer: s }))(this.fd, s, h, c, b);
    }
    writev(s, h) {
      return (0, e.promisify)(this.fs, "writev", (c) => ({ bytesWritten: c, buffers: s }))(this.fd, s, h);
    }
    writeFile(s, h) {
      return (0, e.promisify)(this.fs, "writeFile")(this.fd, s, h);
    }
  };
  return lt.FileHandle = a, lt;
}
var ct = {}, Ba;
function el() {
  if (Ba) return ct;
  Ba = 1, Object.defineProperty(ct, "__esModule", { value: true }), ct.FsPromises = void 0;
  const e = Rt(), a = Qe();
  let t = class {
    constructor(h, c) {
      this.fs = h, this.FileHandle = c, this.constants = a.constants, this.cp = (0, e.promisify)(this.fs, "cp"), this.opendir = (0, e.promisify)(this.fs, "opendir"), this.statfs = (0, e.promisify)(this.fs, "statfs"), this.lutimes = (0, e.promisify)(this.fs, "lutimes"), this.access = (0, e.promisify)(this.fs, "access"), this.chmod = (0, e.promisify)(this.fs, "chmod"), this.chown = (0, e.promisify)(this.fs, "chown"), this.copyFile = (0, e.promisify)(this.fs, "copyFile"), this.lchmod = (0, e.promisify)(this.fs, "lchmod"), this.lchown = (0, e.promisify)(this.fs, "lchown"), this.link = (0, e.promisify)(this.fs, "link"), this.lstat = (0, e.promisify)(this.fs, "lstat"), this.mkdir = (0, e.promisify)(this.fs, "mkdir"), this.mkdtemp = (0, e.promisify)(this.fs, "mkdtemp"), this.readdir = (0, e.promisify)(this.fs, "readdir"), this.readlink = (0, e.promisify)(this.fs, "readlink"), this.realpath = (0, e.promisify)(this.fs, "realpath"), this.rename = (0, e.promisify)(this.fs, "rename"), this.rmdir = (0, e.promisify)(this.fs, "rmdir"), this.rm = (0, e.promisify)(this.fs, "rm"), this.stat = (0, e.promisify)(this.fs, "stat"), this.symlink = (0, e.promisify)(this.fs, "symlink"), this.truncate = (0, e.promisify)(this.fs, "truncate"), this.unlink = (0, e.promisify)(this.fs, "unlink"), this.utimes = (0, e.promisify)(this.fs, "utimes"), this.readFile = (b, d) => (0, e.promisify)(this.fs, "readFile")(b instanceof this.FileHandle ? b.fd : b, d), this.appendFile = (b, d, v) => (0, e.promisify)(this.fs, "appendFile")(b instanceof this.FileHandle ? b.fd : b, d, v), this.open = (b, d = "r", v) => (0, e.promisify)(this.fs, "open", (g) => new this.FileHandle(this.fs, g))(b, d, v), this.writeFile = (b, d, v) => ((0, e.isReadableStream)(d) ? (0, e.streamToBuffer)(d) : Promise.resolve(d)).then((R) => (0, e.promisify)(this.fs, "writeFile")(b instanceof this.FileHandle ? b.fd : b, R, v)), this.watch = () => {
        throw new Error("Not implemented");
      };
    }
  };
  return ct.FsPromises = t, ct;
}
var Vn = {}, Hn = {}, Xn = function(e, a) {
  return Xn = Object.setPrototypeOf || { __proto__: [] } instanceof Array && function(t, s) {
    t.__proto__ = s;
  } || function(t, s) {
    for (var h in s) Object.prototype.hasOwnProperty.call(s, h) && (t[h] = s[h]);
  }, Xn(e, a);
};
function Ps(e, a) {
  if (typeof a != "function" && a !== null) throw new TypeError("Class extends value " + String(a) + " is not a constructor or null");
  Xn(e, a);
  function t() {
    this.constructor = e;
  }
  e.prototype = a === null ? Object.create(a) : (t.prototype = a.prototype, new t());
}
var Dt = function() {
  return Dt = Object.assign || function(a) {
    for (var t, s = 1, h = arguments.length; s < h; s++) {
      t = arguments[s];
      for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && (a[c] = t[c]);
    }
    return a;
  }, Dt.apply(this, arguments);
};
function Ns(e, a) {
  var t = {};
  for (var s in e) Object.prototype.hasOwnProperty.call(e, s) && a.indexOf(s) < 0 && (t[s] = e[s]);
  if (e != null && typeof Object.getOwnPropertySymbols == "function") for (var h = 0, s = Object.getOwnPropertySymbols(e); h < s.length; h++) a.indexOf(s[h]) < 0 && Object.prototype.propertyIsEnumerable.call(e, s[h]) && (t[s[h]] = e[s[h]]);
  return t;
}
function Bs(e, a, t, s) {
  var h = arguments.length, c = h < 3 ? a : s === null ? s = Object.getOwnPropertyDescriptor(a, t) : s, b;
  if (typeof Reflect == "object" && typeof Reflect.decorate == "function") c = Reflect.decorate(e, a, t, s);
  else for (var d = e.length - 1; d >= 0; d--) (b = e[d]) && (c = (h < 3 ? b(c) : h > 3 ? b(a, t, c) : b(a, t)) || c);
  return h > 3 && c && Object.defineProperty(a, t, c), c;
}
function Ds(e, a) {
  return function(t, s) {
    a(t, s, e);
  };
}
function Ls(e, a, t, s, h, c) {
  function b(y) {
    if (y !== void 0 && typeof y != "function") throw new TypeError("Function expected");
    return y;
  }
  for (var d = s.kind, v = d === "getter" ? "get" : d === "setter" ? "set" : "value", g = !a && e ? s.static ? e : e.prototype : null, R = a || (g ? Object.getOwnPropertyDescriptor(g, s.name) : {}), L, I = false, A = t.length - 1; A >= 0; A--) {
    var T = {};
    for (var j in s) T[j] = j === "access" ? {} : s[j];
    for (var j in s.access) T.access[j] = s.access[j];
    T.addInitializer = function(y) {
      if (I) throw new TypeError("Cannot add initializers after decoration has completed");
      c.push(b(y || null));
    };
    var O = (0, t[A])(d === "accessor" ? { get: R.get, set: R.set } : R[v], T);
    if (d === "accessor") {
      if (O === void 0) continue;
      if (O === null || typeof O != "object") throw new TypeError("Object expected");
      (L = b(O.get)) && (R.get = L), (L = b(O.set)) && (R.set = L), (L = b(O.init)) && h.unshift(L);
    } else (L = b(O)) && (d === "field" ? h.unshift(L) : R[v] = L);
  }
  g && Object.defineProperty(g, s.name, R), I = true;
}
function Cs(e, a, t) {
  for (var s = arguments.length > 2, h = 0; h < a.length; h++) t = s ? a[h].call(e, t) : a[h].call(e);
  return s ? t : void 0;
}
function Ms(e) {
  return typeof e == "symbol" ? e : "".concat(e);
}
function js(e, a, t) {
  return typeof a == "symbol" && (a = a.description ? "[".concat(a.description, "]") : ""), Object.defineProperty(e, "name", { configurable: true, value: t ? "".concat(t, " ", a) : a });
}
function qs(e, a) {
  if (typeof Reflect == "object" && typeof Reflect.metadata == "function") return Reflect.metadata(e, a);
}
function ks(e, a, t, s) {
  function h(c) {
    return c instanceof t ? c : new t(function(b) {
      b(c);
    });
  }
  return new (t || (t = Promise))(function(c, b) {
    function d(R) {
      try {
        g(s.next(R));
      } catch (L) {
        b(L);
      }
    }
    function v(R) {
      try {
        g(s.throw(R));
      } catch (L) {
        b(L);
      }
    }
    function g(R) {
      R.done ? c(R.value) : h(R.value).then(d, v);
    }
    g((s = s.apply(e, a || [])).next());
  });
}
function xs(e, a) {
  var t = { label: 0, sent: function() {
    if (c[0] & 1) throw c[1];
    return c[1];
  }, trys: [], ops: [] }, s, h, c, b = Object.create((typeof Iterator == "function" ? Iterator : Object).prototype);
  return b.next = d(0), b.throw = d(1), b.return = d(2), typeof Symbol == "function" && (b[Symbol.iterator] = function() {
    return this;
  }), b;
  function d(g) {
    return function(R) {
      return v([g, R]);
    };
  }
  function v(g) {
    if (s) throw new TypeError("Generator is already executing.");
    for (; b && (b = 0, g[0] && (t = 0)), t; ) try {
      if (s = 1, h && (c = g[0] & 2 ? h.return : g[0] ? h.throw || ((c = h.return) && c.call(h), 0) : h.next) && !(c = c.call(h, g[1])).done) return c;
      switch (h = 0, c && (g = [g[0] & 2, c.value]), g[0]) {
        case 0:
        case 1:
          c = g;
          break;
        case 4:
          return t.label++, { value: g[1], done: false };
        case 5:
          t.label++, h = g[1], g = [0];
          continue;
        case 7:
          g = t.ops.pop(), t.trys.pop();
          continue;
        default:
          if (c = t.trys, !(c = c.length > 0 && c[c.length - 1]) && (g[0] === 6 || g[0] === 2)) {
            t = 0;
            continue;
          }
          if (g[0] === 3 && (!c || g[1] > c[0] && g[1] < c[3])) {
            t.label = g[1];
            break;
          }
          if (g[0] === 6 && t.label < c[1]) {
            t.label = c[1], c = g;
            break;
          }
          if (c && t.label < c[2]) {
            t.label = c[2], t.ops.push(g);
            break;
          }
          c[2] && t.ops.pop(), t.trys.pop();
          continue;
      }
      g = a.call(e, t);
    } catch (R) {
      g = [6, R], h = 0;
    } finally {
      s = c = 0;
    }
    if (g[0] & 5) throw g[1];
    return { value: g[0] ? g[1] : void 0, done: true };
  }
}
var Ut = Object.create ? function(e, a, t, s) {
  s === void 0 && (s = t);
  var h = Object.getOwnPropertyDescriptor(a, t);
  (!h || ("get" in h ? !a.__esModule : h.writable || h.configurable)) && (h = { enumerable: true, get: function() {
    return a[t];
  } }), Object.defineProperty(e, s, h);
} : function(e, a, t, s) {
  s === void 0 && (s = t), e[s] = a[t];
};
function Us(e, a) {
  for (var t in e) t !== "default" && !Object.prototype.hasOwnProperty.call(a, t) && Ut(a, e, t);
}
function Lt(e) {
  var a = typeof Symbol == "function" && Symbol.iterator, t = a && e[a], s = 0;
  if (t) return t.call(e);
  if (e && typeof e.length == "number") return { next: function() {
    return e && s >= e.length && (e = void 0), { value: e && e[s++], done: !e };
  } };
  throw new TypeError(a ? "Object is not iterable." : "Symbol.iterator is not defined.");
}
function ci(e, a) {
  var t = typeof Symbol == "function" && e[Symbol.iterator];
  if (!t) return e;
  var s = t.call(e), h, c = [], b;
  try {
    for (; (a === void 0 || a-- > 0) && !(h = s.next()).done; ) c.push(h.value);
  } catch (d) {
    b = { error: d };
  } finally {
    try {
      h && !h.done && (t = s.return) && t.call(s);
    } finally {
      if (b) throw b.error;
    }
  }
  return c;
}
function $s() {
  for (var e = [], a = 0; a < arguments.length; a++) e = e.concat(ci(arguments[a]));
  return e;
}
function Ws() {
  for (var e = 0, a = 0, t = arguments.length; a < t; a++) e += arguments[a].length;
  for (var s = Array(e), h = 0, a = 0; a < t; a++) for (var c = arguments[a], b = 0, d = c.length; b < d; b++, h++) s[h] = c[b];
  return s;
}
function Vs(e, a, t) {
  if (t || arguments.length === 2) for (var s = 0, h = a.length, c; s < h; s++) (c || !(s in a)) && (c || (c = Array.prototype.slice.call(a, 0, s)), c[s] = a[s]);
  return e.concat(c || Array.prototype.slice.call(a));
}
function ot(e) {
  return this instanceof ot ? (this.v = e, this) : new ot(e);
}
function Hs(e, a, t) {
  if (!Symbol.asyncIterator) throw new TypeError("Symbol.asyncIterator is not defined.");
  var s = t.apply(e, a || []), h, c = [];
  return h = Object.create((typeof AsyncIterator == "function" ? AsyncIterator : Object).prototype), d("next"), d("throw"), d("return", b), h[Symbol.asyncIterator] = function() {
    return this;
  }, h;
  function b(A) {
    return function(T) {
      return Promise.resolve(T).then(A, L);
    };
  }
  function d(A, T) {
    s[A] && (h[A] = function(j) {
      return new Promise(function(O, y) {
        c.push([A, j, O, y]) > 1 || v(A, j);
      });
    }, T && (h[A] = T(h[A])));
  }
  function v(A, T) {
    try {
      g(s[A](T));
    } catch (j) {
      I(c[0][3], j);
    }
  }
  function g(A) {
    A.value instanceof ot ? Promise.resolve(A.value.v).then(R, L) : I(c[0][2], A);
  }
  function R(A) {
    v("next", A);
  }
  function L(A) {
    v("throw", A);
  }
  function I(A, T) {
    A(T), c.shift(), c.length && v(c[0][0], c[0][1]);
  }
}
function Gs(e) {
  var a, t;
  return a = {}, s("next"), s("throw", function(h) {
    throw h;
  }), s("return"), a[Symbol.iterator] = function() {
    return this;
  }, a;
  function s(h, c) {
    a[h] = e[h] ? function(b) {
      return (t = !t) ? { value: ot(e[h](b)), done: false } : c ? c(b) : b;
    } : c;
  }
}
function Ys(e) {
  if (!Symbol.asyncIterator) throw new TypeError("Symbol.asyncIterator is not defined.");
  var a = e[Symbol.asyncIterator], t;
  return a ? a.call(e) : (e = typeof Lt == "function" ? Lt(e) : e[Symbol.iterator](), t = {}, s("next"), s("throw"), s("return"), t[Symbol.asyncIterator] = function() {
    return this;
  }, t);
  function s(c) {
    t[c] = e[c] && function(b) {
      return new Promise(function(d, v) {
        b = e[c](b), h(d, v, b.done, b.value);
      });
    };
  }
  function h(c, b, d, v) {
    Promise.resolve(v).then(function(g) {
      c({ value: g, done: d });
    }, b);
  }
}
function zs(e, a) {
  return Object.defineProperty ? Object.defineProperty(e, "raw", { value: a }) : e.raw = a, e;
}
var tl = Object.create ? function(e, a) {
  Object.defineProperty(e, "default", { enumerable: true, value: a });
} : function(e, a) {
  e.default = a;
}, Qn = function(e) {
  return Qn = Object.getOwnPropertyNames || function(a) {
    var t = [];
    for (var s in a) Object.prototype.hasOwnProperty.call(a, s) && (t[t.length] = s);
    return t;
  }, Qn(e);
};
function Ks(e) {
  if (e && e.__esModule) return e;
  var a = {};
  if (e != null) for (var t = Qn(e), s = 0; s < t.length; s++) t[s] !== "default" && Ut(a, e, t[s]);
  return tl(a, e), a;
}
function Js(e) {
  return e && e.__esModule ? e : { default: e };
}
function Xs(e, a, t, s) {
  if (t === "a" && !s) throw new TypeError("Private accessor was defined without a getter");
  if (typeof a == "function" ? e !== a || !s : !a.has(e)) throw new TypeError("Cannot read private member from an object whose class did not declare it");
  return t === "m" ? s : t === "a" ? s.call(e) : s ? s.value : a.get(e);
}
function Qs(e, a, t, s, h) {
  if (s === "m") throw new TypeError("Private method is not writable");
  if (s === "a" && !h) throw new TypeError("Private accessor was defined without a setter");
  if (typeof a == "function" ? e !== a || !h : !a.has(e)) throw new TypeError("Cannot write private member to an object whose class did not declare it");
  return s === "a" ? h.call(e, t) : h ? h.value = t : a.set(e, t), t;
}
function Zs(e, a) {
  if (a === null || typeof a != "object" && typeof a != "function") throw new TypeError("Cannot use 'in' operator on non-object");
  return typeof e == "function" ? a === e : e.has(a);
}
function ef(e, a, t) {
  if (a != null) {
    if (typeof a != "object" && typeof a != "function") throw new TypeError("Object expected.");
    var s, h;
    if (t) {
      if (!Symbol.asyncDispose) throw new TypeError("Symbol.asyncDispose is not defined.");
      s = a[Symbol.asyncDispose];
    }
    if (s === void 0) {
      if (!Symbol.dispose) throw new TypeError("Symbol.dispose is not defined.");
      s = a[Symbol.dispose], t && (h = s);
    }
    if (typeof s != "function") throw new TypeError("Object not disposable.");
    h && (s = function() {
      try {
        h.call(this);
      } catch (c) {
        return Promise.reject(c);
      }
    }), e.stack.push({ value: a, dispose: s, async: t });
  } else t && e.stack.push({ async: true });
  return a;
}
var rl = typeof SuppressedError == "function" ? SuppressedError : function(e, a, t) {
  var s = new Error(t);
  return s.name = "SuppressedError", s.error = e, s.suppressed = a, s;
};
function tf(e) {
  function a(c) {
    e.error = e.hasError ? new rl(c, e.error, "An error was suppressed during disposal.") : c, e.hasError = true;
  }
  var t, s = 0;
  function h() {
    for (; t = e.stack.pop(); ) try {
      if (!t.async && s === 1) return s = 0, e.stack.push(t), Promise.resolve().then(h);
      if (t.dispose) {
        var c = t.dispose.call(t.value);
        if (t.async) return s |= 2, Promise.resolve(c).then(h, function(b) {
          return a(b), h();
        });
      } else s |= 1;
    } catch (b) {
      a(b);
    }
    if (s === 1) return e.hasError ? Promise.reject(e.error) : Promise.resolve();
    if (e.hasError) throw e.error;
  }
  return h();
}
function rf(e, a) {
  return typeof e == "string" && /^\.\.?\//.test(e) ? e.replace(/\.(tsx)$|((?:\.d)?)((?:\.[^./]+?)?)\.([cm]?)ts$/i, function(t, s, h, c, b) {
    return s ? a ? ".jsx" : ".js" : h && (!c || !b) ? t : h + c + "." + b.toLowerCase() + "js";
  }) : e;
}
const nl = { __extends: Ps, __assign: Dt, __rest: Ns, __decorate: Bs, __param: Ds, __esDecorate: Ls, __runInitializers: Cs, __propKey: Ms, __setFunctionName: js, __metadata: qs, __awaiter: ks, __generator: xs, __createBinding: Ut, __exportStar: Us, __values: Lt, __read: ci, __spread: $s, __spreadArrays: Ws, __spreadArray: Vs, __await: ot, __asyncGenerator: Hs, __asyncDelegator: Gs, __asyncValues: Ys, __makeTemplateObject: zs, __importStar: Ks, __importDefault: Js, __classPrivateFieldGet: Xs, __classPrivateFieldSet: Qs, __classPrivateFieldIn: Zs, __addDisposableResource: ef, __disposeResources: tf, __rewriteRelativeImportExtension: rf }, il = Object.freeze(Object.defineProperty({ __proto__: null, __addDisposableResource: ef, get __assign() {
  return Dt;
}, __asyncDelegator: Gs, __asyncGenerator: Hs, __asyncValues: Ys, __await: ot, __awaiter: ks, __classPrivateFieldGet: Xs, __classPrivateFieldIn: Zs, __classPrivateFieldSet: Qs, __createBinding: Ut, __decorate: Bs, __disposeResources: tf, __esDecorate: Ls, __exportStar: Us, __extends: Ps, __generator: xs, __importDefault: Js, __importStar: Ks, __makeTemplateObject: zs, __metadata: qs, __param: Ds, __propKey: Ms, __read: ci, __rest: Ns, __rewriteRelativeImportExtension: rf, __runInitializers: Cs, __setFunctionName: js, __spread: $s, __spreadArray: Vs, __spreadArrays: Ws, __values: Lt, default: nl }, Symbol.toStringTag, { value: "Module" })), ol = Zn(il);
var ht = {}, Da;
function al() {
  if (Da) return ht;
  Da = 1, Object.defineProperty(ht, "__esModule", { value: true }), ht.printTree = void 0;
  const e = (a = "", t) => {
    let s = "", h = t.length - 1;
    for (; h >= 0 && !t[h]; h--) ;
    for (let c = 0; c <= h; c++) {
      const b = t[c];
      if (!b) continue;
      const d = c === h, v = b(a + (d ? " " : "\u2502") + "  "), g = v ? d ? "\u2514\u2500" : "\u251C\u2500" : "\u2502";
      s += `
` + a + g + (v ? " " + v : "");
    }
    return s;
  };
  return ht.printTree = e, ht;
}
var dt = {}, La;
function sl() {
  if (La) return dt;
  La = 1, Object.defineProperty(dt, "__esModule", { value: true }), dt.printBinary = void 0;
  const e = (a = "", t) => {
    const s = t[0], h = t[1];
    let c = "";
    return s && (c += `
` + a + "\u2190 " + s(a + "  ")), h && (c += `
` + a + "\u2192 " + h(a + "  ")), c;
  };
  return dt.printBinary = e, dt;
}
var Ca;
function fl() {
  return Ca || (Ca = 1, function(e) {
    Object.defineProperty(e, "__esModule", { value: true });
    const a = ol;
    a.__exportStar(al(), e), a.__exportStar(sl(), e);
  }(Hn)), Hn;
}
var We = {}, Ma;
function ul() {
  if (Ma) return We;
  Ma = 1, Object.defineProperty(We, "__esModule", { value: true }), We.newNotAllowedError = We.newTypeMismatchError = We.newNotFoundError = We.assertCanWrite = We.assertName = We.basename = We.ctx = void 0;
  const e = (v = {}) => Object.assign({ separator: "/", syncHandleAllowed: false, mode: "read" }, v);
  We.ctx = e;
  const a = (v, g) => {
    v[v.length - 1] === g && (v = v.slice(0, -1));
    const R = v.lastIndexOf(g);
    return R === -1 ? v : v.slice(R + 1);
  };
  We.basename = a;
  const t = /^(\.{1,2})$|^(.*([\/\\]).*)$/, s = (v, g, R) => {
    if (!v || t.test(v)) throw new TypeError(`Failed to execute '${g}' on '${R}': Name is not allowed.`);
  };
  We.assertName = s;
  const h = (v) => {
    if (v !== "readwrite") throw new DOMException("The request is not allowed by the user agent or the platform in the current context.", "NotAllowedError");
  };
  We.assertCanWrite = h;
  const c = () => new DOMException("A requested file or directory could not be found at the time an operation was processed.", "NotFoundError");
  We.newNotFoundError = c;
  const b = () => new DOMException("The path supplied exists, but was not an entry of requested type.", "TypeMismatchError");
  We.newTypeMismatchError = b;
  const d = () => new DOMException("Permission not granted.", "NotAllowedError");
  return We.newNotAllowedError = d, We;
}
var ja;
function ll() {
  return ja || (ja = 1, function(e) {
    Object.defineProperty(e, "__esModule", { value: true }), e.toTreeSync = void 0;
    const a = fl(), t = ul(), s = (h, c = {}) => {
      var b;
      const d = c.separator || "/";
      let v = c.dir || d;
      v[v.length - 1] !== d && (v += d);
      const g = c.tab || "", R = (b = c.depth) !== null && b !== void 0 ? b : 10;
      let L = " (...)";
      if (R > 0) {
        const A = h.readdirSync(v, { withFileTypes: true });
        L = (0, a.printTree)(g, A.map((T) => (j) => T.isDirectory() ? (0, e.toTreeSync)(h, { dir: v + T.name, depth: R - 1, tab: j }) : T.isSymbolicLink() ? "" + T.name + " \u2192 " + h.readlinkSync(v + T.name) : "" + T.name));
      }
      return (0, t.basename)(v, d) + d + L;
    };
    e.toTreeSync = s;
  }(Vn)), Vn;
}
var Gn = {}, qa;
function cl() {
  return qa || (qa = 1, function(e) {
    Object.defineProperty(e, "__esModule", { value: true }), e.getWriteFileOptions = e.writeFileDefaults = e.getRealpathOptsAndCb = e.getRealpathOptions = e.getStatOptsAndCb = e.getStatOptions = e.getAppendFileOptsAndCb = e.getAppendFileOpts = e.getOpendirOptsAndCb = e.getOpendirOptions = e.getReaddirOptsAndCb = e.getReaddirOptions = e.getReadFileOptions = e.getRmOptsAndCb = e.getRmdirOptions = e.getDefaultOptsAndCb = e.getDefaultOpts = e.optsDefaults = e.getMkdirOptions = void 0, e.getOptions = d, e.optsGenerator = v, e.optsAndCbGenerator = g;
    const a = li(), t = xt(), s = Rt(), h = { mode: 511, recursive: false }, c = (w) => typeof w == "number" ? Object.assign({}, h, { mode: w }) : Object.assign({}, h, w);
    e.getMkdirOptions = c;
    const b = (w) => `Expected options to be either an object or a string, but got ${w} instead`;
    function d(w, F) {
      let q;
      if (F) {
        const V = typeof F;
        switch (V) {
          case "string":
            q = Object.assign({}, w, { encoding: F });
            break;
          case "object":
            q = Object.assign({}, w, F);
            break;
          default:
            throw TypeError(b(V));
        }
      } else return w;
      return q.encoding !== "buffer" && (0, t.assertEncoding)(q.encoding), q;
    }
    function v(w) {
      return (F) => d(w, F);
    }
    function g(w) {
      return (F, q) => typeof F == "function" ? [w(), F] : [w(F), (0, s.validateCallback)(q)];
    }
    e.optsDefaults = { encoding: "utf8" }, e.getDefaultOpts = v(e.optsDefaults), e.getDefaultOptsAndCb = g(e.getDefaultOpts);
    const R = { recursive: false }, L = (w) => Object.assign({}, R, w);
    e.getRmdirOptions = L;
    const I = v(e.optsDefaults);
    e.getRmOptsAndCb = g(I);
    const A = { flag: "r" };
    e.getReadFileOptions = v(A);
    const T = { encoding: "utf8", recursive: false, withFileTypes: false };
    e.getReaddirOptions = v(T), e.getReaddirOptsAndCb = g(e.getReaddirOptions);
    const j = { encoding: "utf8", bufferSize: 32, recursive: false };
    e.getOpendirOptions = v(j), e.getOpendirOptsAndCb = g(e.getOpendirOptions);
    const O = { encoding: "utf8", mode: 438, flag: a.FLAGS[a.FLAGS.a] };
    e.getAppendFileOpts = v(O), e.getAppendFileOptsAndCb = g(e.getAppendFileOpts);
    const y = { bigint: false }, o = (w = {}) => Object.assign({}, y, w);
    e.getStatOptions = o;
    const n = (w, F) => typeof w == "function" ? [(0, e.getStatOptions)(), w] : [(0, e.getStatOptions)(w), (0, s.validateCallback)(F)];
    e.getStatOptsAndCb = n;
    const p = e.optsDefaults;
    e.getRealpathOptions = v(p), e.getRealpathOptsAndCb = g(e.getRealpathOptions), e.writeFileDefaults = { encoding: "utf8", mode: 438, flag: a.FLAGS[a.FLAGS.w] }, e.getWriteFileOptions = v(e.writeFileDefaults);
  }(Gn)), Gn;
}
var pt = {}, ka;
function hl() {
  if (ka) return pt;
  ka = 1, Object.defineProperty(pt, "__esModule", { value: true }), pt.Dir = void 0;
  const e = Rt(), a = fi();
  let t = class {
    constructor(h, c) {
      this.link = h, this.options = c, this.iteratorInfo = [], this.path = h.getParentPath(), this.iteratorInfo.push(h.children[Symbol.iterator]());
    }
    wrapAsync(h, c, b) {
      (0, e.validateCallback)(b), setImmediate(() => {
        let d;
        try {
          d = h.apply(this, c);
        } catch (v) {
          b(v);
          return;
        }
        b(null, d);
      });
    }
    isFunction(h) {
      return typeof h == "function";
    }
    promisify(h, c) {
      return (...b) => new Promise((d, v) => {
        this.isFunction(h[c]) ? h[c].bind(h)(...b, (g, R) => {
          g && v(g), d(R);
        }) : v("Not a function");
      });
    }
    closeBase() {
    }
    readBase(h) {
      let c, b, d, v;
      do {
        do
          if ({ done: c, value: b } = h[h.length - 1].next(), !c) [d, v] = b;
          else break;
        while (d === "." || d === "..");
        if (c) {
          if (h.pop(), h.length === 0) break;
          c = false;
        } else return this.options.recursive && v.children.size && h.push(v.children[Symbol.iterator]()), a.default.build(v, this.options.encoding);
      } while (!c);
      return null;
    }
    closeBaseAsync(h) {
      this.wrapAsync(this.closeBase, [], h);
    }
    close(h) {
      if (typeof h == "function") this.closeBaseAsync(h);
      else return this.promisify(this, "closeBaseAsync")();
    }
    closeSync() {
      this.closeBase();
    }
    readBaseAsync(h) {
      this.wrapAsync(this.readBase, [this.iteratorInfo], h);
    }
    read(h) {
      if (typeof h == "function") this.readBaseAsync(h);
      else return this.promisify(this, "readBaseAsync")();
    }
    readSync() {
      return this.readBase(this.iteratorInfo);
    }
    [Symbol.asyncIterator]() {
      const h = [], c = this;
      h.push(c.link.children[Symbol.iterator]());
      const b = { readBaseAsync(d) {
        c.wrapAsync(c.readBase, [h], d);
      } };
      return { async next() {
        const d = await c.promisify(b, "readBaseAsync")();
        return d !== null ? { done: false, value: d } : { done: true, value: void 0 };
      }, [Symbol.asyncIterator]() {
        throw new Error("Not implemented");
      } };
    }
  };
  return pt.Dir = t, pt;
}
var xa;
function dl() {
  if (xa) return He;
  xa = 1, Object.defineProperty(He, "__esModule", { value: true }), He.FSWatcher = He.StatWatcher = He.Volume = void 0, He.filenameToSteps = me, He.pathToSteps = Ie, He.dataToStr = te, He.toUnixTimestamp = Le;
  const e = af(), a = $u(), t = ai(), s = fi(), h = vt(), c = Wu(), b = Ss(), d = _s(), v = Vu(), g = Qu(), R = Qe(), L = St(), I = xt(), A = Zu(), T = Ye(), j = el(), O = ll(), y = li(), o = cl(), n = Rt(), p = hl(), w = e.resolve, { O_RDONLY: F, O_WRONLY: q, O_RDWR: V, O_CREAT: K, O_EXCL: ee, O_TRUNC: ue, O_APPEND: k, O_DIRECTORY: de, O_SYMLINK: be, F_OK: Ee, COPYFILE_EXCL: _e, COPYFILE_FICLONE_FORCE: Fe } = R.constants, { sep: ye, relative: re, join: J, dirname: oe } = e.posix ? e.posix : e, ne = 128, W = "EPERM", P = "ENOENT", M = "EBADF", _ = "EINVAL", D = "EEXIST", $ = "ENOTDIR", B = "EMFILE", x = "EACCES", m = "EISDIR", S = "ENOTEMPTY", Y = "ENOSYS", ie = "ERR_FS_EISDIR", ge = "ERR_OUT_OF_RANGE";
  let ce = (fe, u = d.default.cwd()) => w(u, fe);
  if (n.isWin) {
    const fe = ce;
    ce = (u, r) => (0, n.unixify)(fe(u, r));
  }
  function me(fe, u) {
    const l = ce(fe, u).substring(1);
    return l ? l.split(ye) : [];
  }
  function Ie(fe) {
    return me((0, n.pathToFilename)(fe));
  }
  function te(fe, u = I.ENCODING_UTF8) {
    return h.Buffer.isBuffer(fe) ? fe.toString(u) : fe instanceof Uint8Array ? (0, h.bufferFrom)(fe).toString(u) : String(fe);
  }
  function Le(fe) {
    if (typeof fe == "string" && +fe == fe) return +fe;
    if (fe instanceof Date) return fe.getTime() / 1e3;
    if (isFinite(fe)) return fe < 0 ? Date.now() / 1e3 : fe;
    throw new Error("Cannot parse time: " + fe);
  }
  function De(fe) {
    if (typeof fe != "number") throw TypeError(y.ERRSTR.UID);
  }
  function Ae(fe) {
    if (typeof fe != "number") throw TypeError(y.ERRSTR.GID);
  }
  function Ne(fe) {
    const u = {};
    function r(l, N) {
      for (const U in N) {
        const z = N[U], Q = J(l, U);
        typeof z == "string" || z instanceof h.Buffer ? u[Q] = z : typeof z == "object" && z !== null && Object.keys(z).length > 0 ? r(Q, z) : u[Q] = null;
      }
    }
    return r("", fe), u;
  }
  const H = () => {
    throw new Error("Not implemented");
  };
  class X {
    static fromJSON(u, r) {
      const l = new X();
      return l.fromJSON(u, r), l;
    }
    static fromNestedJSON(u, r) {
      const l = new X();
      return l.fromNestedJSON(u, r), l;
    }
    get promises() {
      if (this.promisesApi === null) throw new Error("Promise is not supported in this environment.");
      return this.promisesApi;
    }
    constructor(u = {}) {
      this.ino = 0, this.inodes = {}, this.releasedInos = [], this.fds = {}, this.releasedFds = [], this.maxFiles = 1e4, this.openFiles = 0, this.promisesApi = new j.FsPromises(this, A.FileHandle), this.statWatchers = {}, this.cpSync = H, this.statfsSync = H, this.cp = H, this.statfs = H, this.openAsBlob = H, this.props = Object.assign({ Node: a.Node, Link: a.Link, File: a.File }, u);
      const r = this.createLink();
      r.setNode(this.createNode(R.constants.S_IFDIR | 511));
      const l = this;
      this.StatWatcher = class extends ve {
        constructor() {
          super(l);
        }
      };
      const N = we;
      this.ReadStream = class extends N {
        constructor(...z) {
          super(l, ...z);
        }
      };
      const U = Te;
      this.WriteStream = class extends U {
        constructor(...z) {
          super(l, ...z);
        }
      }, this.FSWatcher = class extends ke {
        constructor() {
          super(l);
        }
      }, r.setChild(".", r), r.getNode().nlink++, r.setChild("..", r), r.getNode().nlink++, this.root = r;
    }
    createLink(u, r, l = false, N) {
      if (!u) return new this.props.Link(this, null, "");
      if (!r) throw new Error("createLink: name cannot be empty");
      const U = N ?? (l ? 511 : 438), Q = N && N & R.constants.S_IFMT ? N & R.constants.S_IFMT : l ? R.constants.S_IFDIR : R.constants.S_IFREG, se = U & ~R.constants.S_IFMT | Q;
      return u.createChild(r, this.createNode(se));
    }
    deleteLink(u) {
      const r = u.parent;
      return r ? (r.deleteChild(u), true) : false;
    }
    newInoNumber() {
      const u = this.releasedInos.pop();
      return u || (this.ino = (this.ino + 1) % 4294967295, this.ino);
    }
    newFdNumber() {
      const u = this.releasedFds.pop();
      return typeof u == "number" ? u : X.fd--;
    }
    createNode(u) {
      const r = new this.props.Node(this.newInoNumber(), u);
      return this.inodes[r.ino] = r, r;
    }
    deleteNode(u) {
      u.del(), delete this.inodes[u.ino], this.releasedInos.push(u.ino);
    }
    walk(u, r = false, l = false, N = false, U) {
      var z;
      let Q, se;
      u instanceof a.Link ? (Q = u.steps, se = ye + Q.join(ye)) : typeof u == "string" ? (Q = me(u), se = u) : (Q = u, se = ye + Q.join(ye));
      let le = this.root, Re = 0;
      for (; Re < Q.length; ) {
        let Ce = le.getNode();
        if (Ce.isDirectory()) {
          if (N && !Ce.canExecute()) throw (0, n.createError)(x, U, se);
        } else if (Re < Q.length - 1) throw (0, n.createError)($, U, se);
        if (le = (z = le.getChild(Q[Re])) !== null && z !== void 0 ? z : null, !le) {
          if (l) throw (0, n.createError)(P, U, se);
          return null;
        }
        if (Ce = le == null ? void 0 : le.getNode(), r && Ce.isSymlink()) {
          const Ue = e.isAbsolute(Ce.symlink) ? Ce.symlink : J(e.dirname(le.getPath()), Ce.symlink);
          Q = me(Ue).concat(Q.slice(Re + 1)), le = this.root, Re = 0;
          continue;
        }
        Re++;
      }
      return le;
    }
    getLink(u) {
      return this.walk(u, false, false, false);
    }
    getLinkOrThrow(u, r) {
      return this.walk(u, false, true, true, r);
    }
    getResolvedLink(u) {
      return this.walk(u, true, false, false);
    }
    getResolvedLinkOrThrow(u, r) {
      return this.walk(u, true, true, true, r);
    }
    resolveSymlinks(u) {
      return this.getResolvedLink(u.steps.slice(1));
    }
    getLinkAsDirOrThrow(u, r) {
      const l = this.getLinkOrThrow(u, r);
      if (!l.getNode().isDirectory()) throw (0, n.createError)($, r, u);
      return l;
    }
    getLinkParent(u) {
      return this.getLink(u.slice(0, -1));
    }
    getLinkParentAsDirOrThrow(u, r) {
      const l = (u instanceof Array ? u : me(u)).slice(0, -1), N = ye + l.join(ye), U = this.getLinkOrThrow(N, r);
      if (!U.getNode().isDirectory()) throw (0, n.createError)($, r, N);
      return U;
    }
    getFileByFd(u) {
      return this.fds[String(u)];
    }
    getFileByFdOrThrow(u, r) {
      if (!(0, n.isFd)(u)) throw TypeError(y.ERRSTR.FD);
      const l = this.getFileByFd(u);
      if (!l) throw (0, n.createError)(M, r);
      return l;
    }
    wrapAsync(u, r, l) {
      (0, n.validateCallback)(l), (0, c.default)(() => {
        let N;
        try {
          N = u.apply(this, r);
        } catch (U) {
          l(U);
          return;
        }
        l(null, N);
      });
    }
    _toJSON(u = this.root, r = {}, l, N) {
      let U = true, z = u.children;
      u.getNode().isFile() && (z = /* @__PURE__ */ new Map([[u.getName(), u.parent.getChild(u.getName())]]), u = u.parent);
      for (const se of z.keys()) {
        if (se === "." || se === "..") continue;
        U = false;
        const le = u.getChild(se);
        if (!le) throw new Error("_toJSON: unexpected undefined");
        const Re = le.getNode();
        if (Re.isFile()) {
          let Ce = le.getPath();
          l && (Ce = re(l, Ce)), r[Ce] = N ? Re.getBuffer() : Re.getString();
        } else Re.isDirectory() && this._toJSON(le, r, l, N);
      }
      let Q = u.getPath();
      return l && (Q = re(l, Q)), Q && U && (r[Q] = null), r;
    }
    toJSON(u, r = {}, l = false, N = false) {
      const U = [];
      if (u) {
        Array.isArray(u) || (u = [u]);
        for (const z of u) {
          const Q = (0, n.pathToFilename)(z), se = this.getResolvedLink(Q);
          se && U.push(se);
        }
      } else U.push(this.root);
      if (!U.length) return r;
      for (const z of U) this._toJSON(z, r, l ? z.getPath() : "", N);
      return r;
    }
    fromJSON(u, r = d.default.cwd()) {
      for (let l in u) {
        const N = u[l];
        if (l = ce(l, r), typeof N == "string" || N instanceof h.Buffer) {
          const U = oe(l);
          this.mkdirpBase(U, 511), this.writeFileSync(l, N);
        } else this.mkdirpBase(l, 511);
      }
    }
    fromNestedJSON(u, r) {
      this.fromJSON(Ne(u), r);
    }
    toTree(u = { separator: ye }) {
      return (0, O.toTreeSync)(this, u);
    }
    reset() {
      this.ino = 0, this.inodes = {}, this.releasedInos = [], this.fds = {}, this.releasedFds = [], this.openFiles = 0, this.root = this.createLink(), this.root.setNode(this.createNode(R.constants.S_IFDIR | 511));
    }
    mountSync(u, r) {
      this.fromJSON(r, u);
    }
    openLink(u, r, l = true) {
      if (this.openFiles >= this.maxFiles) throw (0, n.createError)(B, "open", u.getPath());
      let N = u;
      l && (N = this.getResolvedLinkOrThrow(u.getPath(), "open"));
      const U = N.getNode();
      if (U.isDirectory()) {
        if ((r & (F | V | q)) !== F) throw (0, n.createError)(m, "open", u.getPath());
      } else if (r & de) throw (0, n.createError)($, "open", u.getPath());
      if (!(r & q) && !U.canRead() || !(r & F) && !U.canWrite()) throw (0, n.createError)(x, "open", u.getPath());
      const z = new this.props.File(u, U, r, this.newFdNumber());
      return this.fds[z.fd] = z, this.openFiles++, r & ue && z.truncate(), z;
    }
    openFile(u, r, l, N = true) {
      const U = me(u);
      let z;
      try {
        if (z = N ? this.getResolvedLinkOrThrow(u, "open") : this.getLinkOrThrow(u, "open"), z && r & K && r & ee) throw (0, n.createError)(D, "open", u);
      } catch (Q) {
        if (Q.code === P && r & K) {
          const se = e.dirname(u), le = this.getResolvedLinkOrThrow(se), Re = le.getNode();
          if (!Re.isDirectory()) throw (0, n.createError)($, "open", u);
          if (!Re.canExecute() || !Re.canWrite()) throw (0, n.createError)(x, "open", u);
          l ?? (l = 438), z = this.createLink(le, U[U.length - 1], false, l);
        } else throw Q;
      }
      if (z) return this.openLink(z, r, N);
      throw (0, n.createError)(P, "open", u);
    }
    openBase(u, r, l, N = true) {
      const U = this.openFile(u, r, l, N);
      if (!U) throw (0, n.createError)(P, "open", u);
      return U.fd;
    }
    openSync(u, r, l = 438) {
      const N = (0, n.modeToNumber)(l), U = (0, n.pathToFilename)(u), z = (0, n.flagsToNumber)(r);
      return this.openBase(U, z, N, !(z & be));
    }
    open(u, r, l, N) {
      let U = l, z = N;
      typeof l == "function" && (U = 438, z = l), U = U || 438;
      const Q = (0, n.modeToNumber)(U), se = (0, n.pathToFilename)(u), le = (0, n.flagsToNumber)(r);
      this.wrapAsync(this.openBase, [se, le, Q, !(le & be)], z);
    }
    closeFile(u) {
      this.fds[u.fd] && (this.openFiles--, delete this.fds[u.fd], this.releasedFds.push(u.fd));
    }
    closeSync(u) {
      (0, n.validateFd)(u);
      const r = this.getFileByFdOrThrow(u, "close");
      this.closeFile(r);
    }
    close(u, r) {
      (0, n.validateFd)(u);
      const l = this.getFileByFdOrThrow(u, "close");
      this.wrapAsync(this.closeFile, [l], r);
    }
    openFileOrGetById(u, r, l) {
      if (typeof u == "number") {
        const N = this.fds[u];
        if (!N) throw (0, n.createError)(P);
        return N;
      } else return this.openFile((0, n.pathToFilename)(u), r, l);
    }
    readBase(u, r, l, N, U) {
      if (r.byteLength < N) throw (0, n.createError)(ge, "read", void 0, void 0, RangeError);
      const z = this.getFileByFdOrThrow(u);
      if (z.node.isSymlink()) throw (0, n.createError)(W, "read", z.link.getPath());
      return z.read(r, Number(l), Number(N), U === -1 || typeof U != "number" ? void 0 : U);
    }
    readSync(u, r, l, N, U) {
      return (0, n.validateFd)(u), this.readBase(u, r, l, N, U);
    }
    read(u, r, l, N, U, z) {
      if ((0, n.validateCallback)(z), N === 0) return (0, b.default)(() => {
        z && z(null, 0, r);
      });
      (0, c.default)(() => {
        try {
          const Q = this.readBase(u, r, l, N, U);
          z(null, Q, r);
        } catch (Q) {
          z(Q);
        }
      });
    }
    readvBase(u, r, l) {
      const N = this.getFileByFdOrThrow(u);
      let U = l ?? void 0;
      U === -1 && (U = void 0);
      let z = 0;
      for (const Q of r) {
        const se = N.read(Q, 0, Q.byteLength, U);
        if (U = void 0, z += se, se < Q.byteLength) break;
      }
      return z;
    }
    readv(u, r, l, N) {
      let U = l, z = N;
      typeof l == "function" && (U = null, z = l), (0, n.validateCallback)(z), (0, c.default)(() => {
        try {
          const Q = this.readvBase(u, r, U);
          z(null, Q, r);
        } catch (Q) {
          z(Q);
        }
      });
    }
    readvSync(u, r, l) {
      return (0, n.validateFd)(u), this.readvBase(u, r, l);
    }
    readFileBase(u, r, l) {
      let N;
      const z = typeof u == "number" && (0, n.isFd)(u);
      let Q;
      if (z) Q = u;
      else {
        const se = (0, n.pathToFilename)(u), le = this.getResolvedLinkOrThrow(se, "open");
        if (le.getNode().isDirectory()) throw (0, n.createError)(m, "open", le.getPath());
        Q = this.openSync(u, r);
      }
      try {
        N = (0, n.bufferToEncoding)(this.getFileByFdOrThrow(Q).getBuffer(), l);
      } finally {
        z || this.closeSync(Q);
      }
      return N;
    }
    readFileSync(u, r) {
      const l = (0, o.getReadFileOptions)(r), N = (0, n.flagsToNumber)(l.flag);
      return this.readFileBase(u, N, l.encoding);
    }
    readFile(u, r, l) {
      const [N, U] = (0, o.optsAndCbGenerator)(o.getReadFileOptions)(r, l), z = (0, n.flagsToNumber)(N.flag);
      this.wrapAsync(this.readFileBase, [u, z, N.encoding], U);
    }
    writeBase(u, r, l, N, U) {
      const z = this.getFileByFdOrThrow(u, "write");
      if (z.node.isSymlink()) throw (0, n.createError)(M, "write", z.link.getPath());
      return z.write(r, l, N, U === -1 || typeof U != "number" ? void 0 : U);
    }
    writeSync(u, r, l, N, U) {
      const [, z, Q, se, le] = (0, n.getWriteSyncArgs)(u, r, l, N, U);
      return this.writeBase(u, z, Q, se, le);
    }
    write(u, r, l, N, U, z) {
      const [, Q, se, le, Re, Ce, Ue] = (0, n.getWriteArgs)(u, r, l, N, U, z);
      (0, c.default)(() => {
        try {
          const $e = this.writeBase(u, se, le, Re, Ce);
          Q ? Ue(null, $e, r) : Ue(null, $e, se);
        } catch ($e) {
          Ue($e);
        }
      });
    }
    writevBase(u, r, l) {
      const N = this.getFileByFdOrThrow(u);
      let U = l ?? void 0;
      U === -1 && (U = void 0);
      let z = 0;
      for (const Q of r) {
        const se = h.Buffer.from(Q.buffer, Q.byteOffset, Q.byteLength), le = N.write(se, 0, se.byteLength, U);
        if (U = void 0, z += le, le < se.byteLength) break;
      }
      return z;
    }
    writev(u, r, l, N) {
      let U = l, z = N;
      typeof l == "function" && (U = null, z = l), (0, n.validateCallback)(z), (0, c.default)(() => {
        try {
          const Q = this.writevBase(u, r, U);
          z(null, Q, r);
        } catch (Q) {
          z(Q);
        }
      });
    }
    writevSync(u, r, l) {
      return (0, n.validateFd)(u), this.writevBase(u, r, l);
    }
    writeFileBase(u, r, l, N) {
      const U = typeof u == "number";
      let z;
      U ? z = u : z = this.openBase((0, n.pathToFilename)(u), l, N);
      let Q = 0, se = r.length, le = l & k ? void 0 : 0;
      try {
        for (; se > 0; ) {
          const Re = this.writeSync(z, r, Q, se, le);
          Q += Re, se -= Re, le !== void 0 && (le += Re);
        }
      } finally {
        U || this.closeSync(z);
      }
    }
    writeFileSync(u, r, l) {
      const N = (0, o.getWriteFileOptions)(l), U = (0, n.flagsToNumber)(N.flag), z = (0, n.modeToNumber)(N.mode), Q = (0, n.dataToBuffer)(r, N.encoding);
      this.writeFileBase(u, Q, U, z);
    }
    writeFile(u, r, l, N) {
      let U = l, z = N;
      typeof l == "function" && (U = o.writeFileDefaults, z = l);
      const Q = (0, n.validateCallback)(z), se = (0, o.getWriteFileOptions)(U), le = (0, n.flagsToNumber)(se.flag), Re = (0, n.modeToNumber)(se.mode), Ce = (0, n.dataToBuffer)(r, se.encoding);
      this.wrapAsync(this.writeFileBase, [u, Ce, le, Re], Q);
    }
    linkBase(u, r) {
      let l;
      try {
        l = this.getLinkOrThrow(u, "link");
      } catch (se) {
        throw se.code && (se = (0, n.createError)(se.code, "link", u, r)), se;
      }
      const N = e.dirname(r);
      let U;
      try {
        U = this.getLinkOrThrow(N, "link");
      } catch (se) {
        throw se.code && (se = (0, n.createError)(se.code, "link", u, r)), se;
      }
      const z = e.basename(r);
      if (U.getChild(z)) throw (0, n.createError)(D, "link", u, r);
      const Q = l.getNode();
      Q.nlink++, U.createChild(z, Q);
    }
    copyFileBase(u, r, l) {
      const N = this.readFileSync(u);
      if (l & _e && this.existsSync(r)) throw (0, n.createError)(D, "copyFile", u, r);
      if (l & Fe) throw (0, n.createError)(Y, "copyFile", u, r);
      this.writeFileBase(r, N, y.FLAGS.w, 438);
    }
    copyFileSync(u, r, l) {
      const N = (0, n.pathToFilename)(u), U = (0, n.pathToFilename)(r);
      return this.copyFileBase(N, U, (l || 0) | 0);
    }
    copyFile(u, r, l, N) {
      const U = (0, n.pathToFilename)(u), z = (0, n.pathToFilename)(r);
      let Q, se;
      typeof l == "function" ? (Q = 0, se = l) : (Q = l, se = N), (0, n.validateCallback)(se), this.wrapAsync(this.copyFileBase, [U, z, Q], se);
    }
    linkSync(u, r) {
      const l = (0, n.pathToFilename)(u), N = (0, n.pathToFilename)(r);
      this.linkBase(l, N);
    }
    link(u, r, l) {
      const N = (0, n.pathToFilename)(u), U = (0, n.pathToFilename)(r);
      this.wrapAsync(this.linkBase, [N, U], l);
    }
    unlinkBase(u) {
      const r = this.getLinkOrThrow(u, "unlink");
      if (r.length) throw Error("Dir not empty...");
      this.deleteLink(r);
      const l = r.getNode();
      l.nlink--, l.nlink <= 0 && this.deleteNode(l);
    }
    unlinkSync(u) {
      const r = (0, n.pathToFilename)(u);
      this.unlinkBase(r);
    }
    unlink(u, r) {
      const l = (0, n.pathToFilename)(u);
      this.wrapAsync(this.unlinkBase, [l], r);
    }
    symlinkBase(u, r) {
      const l = me(r);
      let N;
      try {
        N = this.getLinkParentAsDirOrThrow(l);
      } catch (se) {
        throw se.code && (se = (0, n.createError)(se.code, "symlink", u, r)), se;
      }
      const U = l[l.length - 1];
      if (N.getChild(U)) throw (0, n.createError)(D, "symlink", u, r);
      const z = N.getNode();
      if (!z.canExecute() || !z.canWrite()) throw (0, n.createError)(x, "symlink", u, r);
      const Q = N.createChild(U);
      return Q.getNode().makeSymlink(u), Q;
    }
    symlinkSync(u, r, l) {
      const N = (0, n.pathToFilename)(u), U = (0, n.pathToFilename)(r);
      this.symlinkBase(N, U);
    }
    symlink(u, r, l, N) {
      const U = (0, n.validateCallback)(typeof l == "function" ? l : N), z = (0, n.pathToFilename)(u), Q = (0, n.pathToFilename)(r);
      this.wrapAsync(this.symlinkBase, [z, Q], U);
    }
    realpathBase(u, r) {
      const l = this.getResolvedLinkOrThrow(u, "realpath");
      return (0, I.strToEncoding)(l.getPath() || "/", r);
    }
    realpathSync(u, r) {
      return this.realpathBase((0, n.pathToFilename)(u), (0, o.getRealpathOptions)(r).encoding);
    }
    realpath(u, r, l) {
      const [N, U] = (0, o.getRealpathOptsAndCb)(r, l), z = (0, n.pathToFilename)(u);
      this.wrapAsync(this.realpathBase, [z, N.encoding], U);
    }
    lstatBase(u, r = false, l = false) {
      let N;
      try {
        N = this.getLinkOrThrow(u, "lstat");
      } catch (U) {
        if (U.code === P && !l) return;
        throw U;
      }
      return t.default.build(N.getNode(), r);
    }
    lstatSync(u, r) {
      const { throwIfNoEntry: l = true, bigint: N = false } = (0, o.getStatOptions)(r);
      return this.lstatBase((0, n.pathToFilename)(u), N, l);
    }
    lstat(u, r, l) {
      const [{ throwIfNoEntry: N = true, bigint: U = false }, z] = (0, o.getStatOptsAndCb)(r, l);
      this.wrapAsync(this.lstatBase, [(0, n.pathToFilename)(u), U, N], z);
    }
    statBase(u, r = false, l = true) {
      let N;
      try {
        N = this.getResolvedLinkOrThrow(u, "stat");
      } catch (U) {
        if (U.code === P && !l) return;
        throw U;
      }
      return t.default.build(N.getNode(), r);
    }
    statSync(u, r) {
      const { bigint: l = true, throwIfNoEntry: N = true } = (0, o.getStatOptions)(r);
      return this.statBase((0, n.pathToFilename)(u), l, N);
    }
    stat(u, r, l) {
      const [{ bigint: N = false, throwIfNoEntry: U = true }, z] = (0, o.getStatOptsAndCb)(r, l);
      this.wrapAsync(this.statBase, [(0, n.pathToFilename)(u), N, U], z);
    }
    fstatBase(u, r = false) {
      const l = this.getFileByFd(u);
      if (!l) throw (0, n.createError)(M, "fstat");
      return t.default.build(l.node, r);
    }
    fstatSync(u, r) {
      return this.fstatBase(u, (0, o.getStatOptions)(r).bigint);
    }
    fstat(u, r, l) {
      const [N, U] = (0, o.getStatOptsAndCb)(r, l);
      this.wrapAsync(this.fstatBase, [u, N.bigint], U);
    }
    renameBase(u, r) {
      let l;
      try {
        l = this.getResolvedLinkOrThrow(u);
      } catch (le) {
        throw le.code && (le = (0, n.createError)(le.code, "rename", u, r)), le;
      }
      let N;
      try {
        N = this.getLinkParentAsDirOrThrow(r);
      } catch (le) {
        throw le.code && (le = (0, n.createError)(le.code, "rename", u, r)), le;
      }
      const U = l.parent, z = U.getNode(), Q = N.getNode();
      if (!z.canExecute() || !z.canWrite() || !Q.canExecute() || !Q.canWrite()) throw (0, n.createError)(x, "rename", u, r);
      U.deleteChild(l);
      const se = e.basename(r);
      l.name = se, l.steps = [...N.steps, se], N.setChild(l.getName(), l);
    }
    renameSync(u, r) {
      const l = (0, n.pathToFilename)(u), N = (0, n.pathToFilename)(r);
      this.renameBase(l, N);
    }
    rename(u, r, l) {
      const N = (0, n.pathToFilename)(u), U = (0, n.pathToFilename)(r);
      this.wrapAsync(this.renameBase, [N, U], l);
    }
    existsBase(u) {
      return !!this.statBase(u);
    }
    existsSync(u) {
      try {
        return this.existsBase((0, n.pathToFilename)(u));
      } catch {
        return false;
      }
    }
    exists(u, r) {
      const l = (0, n.pathToFilename)(u);
      if (typeof r != "function") throw Error(y.ERRSTR.CB);
      (0, c.default)(() => {
        try {
          r(this.existsBase(l));
        } catch {
          r(false);
        }
      });
    }
    accessBase(u, r) {
      this.getLinkOrThrow(u, "access");
    }
    accessSync(u, r = Ee) {
      const l = (0, n.pathToFilename)(u);
      r = r | 0, this.accessBase(l, r);
    }
    access(u, r, l) {
      let N = Ee, U;
      typeof r != "function" ? (N = r | 0, U = (0, n.validateCallback)(l)) : U = r;
      const z = (0, n.pathToFilename)(u);
      this.wrapAsync(this.accessBase, [z, N], U);
    }
    appendFileSync(u, r, l) {
      const N = (0, o.getAppendFileOpts)(l);
      (!N.flag || (0, n.isFd)(u)) && (N.flag = "a"), this.writeFileSync(u, r, N);
    }
    appendFile(u, r, l, N) {
      const [U, z] = (0, o.getAppendFileOptsAndCb)(l, N);
      (!U.flag || (0, n.isFd)(u)) && (U.flag = "a"), this.writeFile(u, r, U, z);
    }
    readdirBase(u, r) {
      me(u);
      const l = this.getResolvedLinkOrThrow(u, "scandir"), N = l.getNode();
      if (!N.isDirectory()) throw (0, n.createError)($, "scandir", u);
      if (!N.canRead()) throw (0, n.createError)(x, "scandir", u);
      const U = [];
      for (const Q of l.children.keys()) {
        const se = l.getChild(Q);
        if (!(!se || Q === "." || Q === "..") && (U.push(s.default.build(se, r.encoding)), r.recursive && se.children.size)) {
          const le = Object.assign(Object.assign({}, r), { recursive: true, withFileTypes: true }), Re = this.readdirBase(se.getPath(), le);
          U.push(...Re);
        }
      }
      if (!n.isWin && r.encoding !== "buffer" && U.sort((Q, se) => Q.name < se.name ? -1 : Q.name > se.name ? 1 : 0), r.withFileTypes) return U;
      let z = u;
      return n.isWin && (z = z.replace(/\\/g, "/")), U.map((Q) => {
        if (r.recursive) {
          let se = e.join(Q.parentPath, Q.name.toString());
          return n.isWin && (se = se.replace(/\\/g, "/")), se.replace(z + e.posix.sep, "");
        }
        return Q.name;
      });
    }
    readdirSync(u, r) {
      const l = (0, o.getReaddirOptions)(r), N = (0, n.pathToFilename)(u);
      return this.readdirBase(N, l);
    }
    readdir(u, r, l) {
      const [N, U] = (0, o.getReaddirOptsAndCb)(r, l), z = (0, n.pathToFilename)(u);
      this.wrapAsync(this.readdirBase, [z, N], U);
    }
    readlinkBase(u, r) {
      const N = this.getLinkOrThrow(u, "readlink").getNode();
      if (!N.isSymlink()) throw (0, n.createError)(_, "readlink", u);
      return (0, I.strToEncoding)(N.symlink, r);
    }
    readlinkSync(u, r) {
      const l = (0, o.getDefaultOpts)(r), N = (0, n.pathToFilename)(u);
      return this.readlinkBase(N, l.encoding);
    }
    readlink(u, r, l) {
      const [N, U] = (0, o.getDefaultOptsAndCb)(r, l), z = (0, n.pathToFilename)(u);
      this.wrapAsync(this.readlinkBase, [z, N.encoding], U);
    }
    fsyncBase(u) {
      this.getFileByFdOrThrow(u, "fsync");
    }
    fsyncSync(u) {
      this.fsyncBase(u);
    }
    fsync(u, r) {
      this.wrapAsync(this.fsyncBase, [u], r);
    }
    fdatasyncBase(u) {
      this.getFileByFdOrThrow(u, "fdatasync");
    }
    fdatasyncSync(u) {
      this.fdatasyncBase(u);
    }
    fdatasync(u, r) {
      this.wrapAsync(this.fdatasyncBase, [u], r);
    }
    ftruncateBase(u, r) {
      this.getFileByFdOrThrow(u, "ftruncate").truncate(r);
    }
    ftruncateSync(u, r) {
      this.ftruncateBase(u, r);
    }
    ftruncate(u, r, l) {
      const N = typeof r == "number" ? r : 0, U = (0, n.validateCallback)(typeof r == "number" ? l : r);
      this.wrapAsync(this.ftruncateBase, [u, N], U);
    }
    truncateBase(u, r) {
      const l = this.openSync(u, "r+");
      try {
        this.ftruncateSync(l, r);
      } finally {
        this.closeSync(l);
      }
    }
    truncateSync(u, r) {
      if ((0, n.isFd)(u)) return this.ftruncateSync(u, r);
      this.truncateBase(u, r);
    }
    truncate(u, r, l) {
      const N = typeof r == "number" ? r : 0, U = (0, n.validateCallback)(typeof r == "number" ? l : r);
      if ((0, n.isFd)(u)) return this.ftruncate(u, N, U);
      this.wrapAsync(this.truncateBase, [u, N], U);
    }
    futimesBase(u, r, l) {
      const U = this.getFileByFdOrThrow(u, "futimes").node;
      U.atime = new Date(r * 1e3), U.mtime = new Date(l * 1e3);
    }
    futimesSync(u, r, l) {
      this.futimesBase(u, Le(r), Le(l));
    }
    futimes(u, r, l, N) {
      this.wrapAsync(this.futimesBase, [u, Le(r), Le(l)], N);
    }
    utimesBase(u, r, l, N = true) {
      const z = (N ? this.getResolvedLinkOrThrow(u, "utimes") : this.getLinkOrThrow(u, "lutimes")).getNode();
      z.atime = new Date(r * 1e3), z.mtime = new Date(l * 1e3);
    }
    utimesSync(u, r, l) {
      this.utimesBase((0, n.pathToFilename)(u), Le(r), Le(l), true);
    }
    utimes(u, r, l, N) {
      this.wrapAsync(this.utimesBase, [(0, n.pathToFilename)(u), Le(r), Le(l), true], N);
    }
    lutimesSync(u, r, l) {
      this.utimesBase((0, n.pathToFilename)(u), Le(r), Le(l), false);
    }
    lutimes(u, r, l, N) {
      this.wrapAsync(this.utimesBase, [(0, n.pathToFilename)(u), Le(r), Le(l), false], N);
    }
    mkdirBase(u, r) {
      const l = me(u);
      if (!l.length) throw (0, n.createError)(D, "mkdir", u);
      const N = this.getLinkParentAsDirOrThrow(u, "mkdir"), U = l[l.length - 1];
      if (N.getChild(U)) throw (0, n.createError)(D, "mkdir", u);
      const z = N.getNode();
      if (!z.canWrite() || !z.canExecute()) throw (0, n.createError)(x, "mkdir", u);
      N.createChild(U, this.createNode(R.constants.S_IFDIR | r));
    }
    mkdirpBase(u, r) {
      let l = false;
      const N = me(u);
      let U = null, z = N.length;
      for (z = N.length; z >= 0 && (U = this.getResolvedLink(N.slice(0, z)), !U); z--) ;
      for (U || (U = this.root, z = 0), U = this.getResolvedLinkOrThrow(ye + N.slice(0, z).join(ye), "mkdir"), z; z < N.length; z++) {
        const Q = U.getNode();
        if (Q.isDirectory()) {
          if (!Q.canExecute() || !Q.canWrite()) throw (0, n.createError)(x, "mkdir", u);
        } else throw (0, n.createError)($, "mkdir", u);
        l = true, U = U.createChild(N[z], this.createNode(R.constants.S_IFDIR | r));
      }
      return l ? u : void 0;
    }
    mkdirSync(u, r) {
      const l = (0, o.getMkdirOptions)(r), N = (0, n.modeToNumber)(l.mode, 511), U = (0, n.pathToFilename)(u);
      if (l.recursive) return this.mkdirpBase(U, N);
      this.mkdirBase(U, N);
    }
    mkdir(u, r, l) {
      const N = (0, o.getMkdirOptions)(r), U = (0, n.validateCallback)(typeof r == "function" ? r : l), z = (0, n.modeToNumber)(N.mode, 511), Q = (0, n.pathToFilename)(u);
      N.recursive ? this.wrapAsync(this.mkdirpBase, [Q, z], U) : this.wrapAsync(this.mkdirBase, [Q, z], U);
    }
    mkdtempBase(u, r, l = 5) {
      const N = u + (0, n.genRndStr6)();
      try {
        return this.mkdirBase(N, 511), (0, I.strToEncoding)(N, r);
      } catch (U) {
        if (U.code === D) {
          if (l > 1) return this.mkdtempBase(u, r, l - 1);
          throw Error("Could not create temp dir.");
        } else throw U;
      }
    }
    mkdtempSync(u, r) {
      const { encoding: l } = (0, o.getDefaultOpts)(r);
      if (!u || typeof u != "string") throw new TypeError("filename prefix is required");
      return (0, n.nullCheck)(u), this.mkdtempBase(u, l);
    }
    mkdtemp(u, r, l) {
      const [{ encoding: N }, U] = (0, o.getDefaultOptsAndCb)(r, l);
      if (!u || typeof u != "string") throw new TypeError("filename prefix is required");
      (0, n.nullCheck)(u) && this.wrapAsync(this.mkdtempBase, [u, N], U);
    }
    rmdirBase(u, r) {
      const l = (0, o.getRmdirOptions)(r), N = this.getLinkAsDirOrThrow(u, "rmdir");
      if (N.length && !l.recursive) throw (0, n.createError)(S, "rmdir", u);
      this.deleteLink(N);
    }
    rmdirSync(u, r) {
      this.rmdirBase((0, n.pathToFilename)(u), r);
    }
    rmdir(u, r, l) {
      const N = (0, o.getRmdirOptions)(r), U = (0, n.validateCallback)(typeof r == "function" ? r : l);
      this.wrapAsync(this.rmdirBase, [(0, n.pathToFilename)(u), N], U);
    }
    rmBase(u, r = {}) {
      let l;
      try {
        l = this.getResolvedLinkOrThrow(u, "stat");
      } catch (N) {
        if (N.code === P && r.force) return;
        throw N;
      }
      if (l.getNode().isDirectory() && !r.recursive) throw (0, n.createError)(ie, "rm", u);
      if (!l.parent.getNode().canWrite()) throw (0, n.createError)(x, "rm", u);
      this.deleteLink(l);
    }
    rmSync(u, r) {
      this.rmBase((0, n.pathToFilename)(u), r);
    }
    rm(u, r, l) {
      const [N, U] = (0, o.getRmOptsAndCb)(r, l);
      this.wrapAsync(this.rmBase, [(0, n.pathToFilename)(u), N], U);
    }
    fchmodBase(u, r) {
      this.getFileByFdOrThrow(u, "fchmod").chmod(r);
    }
    fchmodSync(u, r) {
      this.fchmodBase(u, (0, n.modeToNumber)(r));
    }
    fchmod(u, r, l) {
      this.wrapAsync(this.fchmodBase, [u, (0, n.modeToNumber)(r)], l);
    }
    chmodBase(u, r, l = true) {
      (l ? this.getResolvedLinkOrThrow(u, "chmod") : this.getLinkOrThrow(u, "chmod")).getNode().chmod(r);
    }
    chmodSync(u, r) {
      const l = (0, n.modeToNumber)(r), N = (0, n.pathToFilename)(u);
      this.chmodBase(N, l, true);
    }
    chmod(u, r, l) {
      const N = (0, n.modeToNumber)(r), U = (0, n.pathToFilename)(u);
      this.wrapAsync(this.chmodBase, [U, N], l);
    }
    lchmodBase(u, r) {
      this.chmodBase(u, r, false);
    }
    lchmodSync(u, r) {
      const l = (0, n.modeToNumber)(r), N = (0, n.pathToFilename)(u);
      this.lchmodBase(N, l);
    }
    lchmod(u, r, l) {
      const N = (0, n.modeToNumber)(r), U = (0, n.pathToFilename)(u);
      this.wrapAsync(this.lchmodBase, [U, N], l);
    }
    fchownBase(u, r, l) {
      this.getFileByFdOrThrow(u, "fchown").chown(r, l);
    }
    fchownSync(u, r, l) {
      De(r), Ae(l), this.fchownBase(u, r, l);
    }
    fchown(u, r, l, N) {
      De(r), Ae(l), this.wrapAsync(this.fchownBase, [u, r, l], N);
    }
    chownBase(u, r, l) {
      this.getResolvedLinkOrThrow(u, "chown").getNode().chown(r, l);
    }
    chownSync(u, r, l) {
      De(r), Ae(l), this.chownBase((0, n.pathToFilename)(u), r, l);
    }
    chown(u, r, l, N) {
      De(r), Ae(l), this.wrapAsync(this.chownBase, [(0, n.pathToFilename)(u), r, l], N);
    }
    lchownBase(u, r, l) {
      this.getLinkOrThrow(u, "lchown").getNode().chown(r, l);
    }
    lchownSync(u, r, l) {
      De(r), Ae(l), this.lchownBase((0, n.pathToFilename)(u), r, l);
    }
    lchown(u, r, l, N) {
      De(r), Ae(l), this.wrapAsync(this.lchownBase, [(0, n.pathToFilename)(u), r, l], N);
    }
    watchFile(u, r, l) {
      const N = (0, n.pathToFilename)(u);
      let U = r, z = l;
      if (typeof U == "function" && (z = r, U = null), typeof z != "function") throw Error('"watchFile()" requires a listener function');
      let Q = 5007, se = true;
      U && typeof U == "object" && (typeof U.interval == "number" && (Q = U.interval), typeof U.persistent == "boolean" && (se = U.persistent));
      let le = this.statWatchers[N];
      return le || (le = new this.StatWatcher(), le.start(N, se, Q), this.statWatchers[N] = le), le.addListener("change", z), le;
    }
    unwatchFile(u, r) {
      const l = (0, n.pathToFilename)(u), N = this.statWatchers[l];
      N && (typeof r == "function" ? N.removeListener("change", r) : N.removeAllListeners("change"), N.listenerCount("change") === 0 && (N.stop(), delete this.statWatchers[l]));
    }
    createReadStream(u, r) {
      return new this.ReadStream(u, r);
    }
    createWriteStream(u, r) {
      return new this.WriteStream(u, r);
    }
    watch(u, r, l) {
      const N = (0, n.pathToFilename)(u);
      let U = r;
      typeof r == "function" && (l = r, U = null);
      let { persistent: z, recursive: Q, encoding: se } = (0, o.getDefaultOpts)(U);
      z === void 0 && (z = true), Q === void 0 && (Q = false);
      const le = new this.FSWatcher();
      return le.start(N, z, Q, se), l && le.addListener("change", l), le;
    }
    opendirBase(u, r) {
      const l = this.getResolvedLinkOrThrow(u, "scandir");
      if (!l.getNode().isDirectory()) throw (0, n.createError)($, "scandir", u);
      return new p.Dir(l, r);
    }
    opendirSync(u, r) {
      const l = (0, o.getOpendirOptions)(r), N = (0, n.pathToFilename)(u);
      return this.opendirBase(N, l);
    }
    opendir(u, r, l) {
      const [N, U] = (0, o.getOpendirOptsAndCb)(r, l), z = (0, n.pathToFilename)(u);
      this.wrapAsync(this.opendirBase, [z, N], U);
    }
  }
  He.Volume = X, X.fd = 2147483647;
  function he(fe) {
    fe.emit("stop");
  }
  class ve extends L.EventEmitter {
    constructor(u) {
      super(), this.onInterval = () => {
        try {
          const r = this.vol.statSync(this.filename);
          this.hasChanged(r) && (this.emit("change", r, this.prev), this.prev = r);
        } finally {
          this.loop();
        }
      }, this.vol = u;
    }
    loop() {
      this.timeoutRef = this.setTimeout(this.onInterval, this.interval);
    }
    hasChanged(u) {
      return u.mtimeMs > this.prev.mtimeMs || u.nlink !== this.prev.nlink;
    }
    start(u, r = true, l = 5007) {
      this.filename = (0, n.pathToFilename)(u), this.setTimeout = r ? setTimeout.bind(typeof globalThis < "u" ? globalThis : Ve) : v.default, this.interval = l, this.prev = this.vol.statSync(this.filename), this.loop();
    }
    stop() {
      clearTimeout(this.timeoutRef), (0, b.default)(() => {
        he.call(this, this);
      });
    }
  }
  He.StatWatcher = ve;
  var pe;
  function Se(fe) {
    pe = (0, h.bufferAllocUnsafe)(fe), pe.used = 0;
  }
  T.inherits(we, g.Readable), He.ReadStream = we;
  function we(fe, u, r) {
    if (!(this instanceof we)) return new we(fe, u, r);
    if (this._vol = fe, r = Object.assign({}, (0, o.getOptions)(r, {})), r.highWaterMark === void 0 && (r.highWaterMark = 64 * 1024), g.Readable.call(this, r), this.path = (0, n.pathToFilename)(u), this.fd = r.fd === void 0 ? null : typeof r.fd != "number" ? r.fd.fd : r.fd, this.flags = r.flags === void 0 ? "r" : r.flags, this.mode = r.mode === void 0 ? 438 : r.mode, this.start = r.start, this.end = r.end, this.autoClose = r.autoClose === void 0 ? true : r.autoClose, this.pos = void 0, this.bytesRead = 0, this.start !== void 0) {
      if (typeof this.start != "number") throw new TypeError('"start" option must be a Number');
      if (this.end === void 0) this.end = 1 / 0;
      else if (typeof this.end != "number") throw new TypeError('"end" option must be a Number');
      if (this.start > this.end) throw new Error('"start" option must be <= "end" option');
      this.pos = this.start;
    }
    typeof this.fd != "number" && this.open(), this.on("end", function() {
      this.autoClose && this.destroy && this.destroy();
    });
  }
  we.prototype.open = function() {
    var fe = this;
    this._vol.open(this.path, this.flags, this.mode, (u, r) => {
      if (u) {
        fe.autoClose && fe.destroy && fe.destroy(), fe.emit("error", u);
        return;
      }
      fe.fd = r, fe.emit("open", r), fe.read();
    });
  }, we.prototype._read = function(fe) {
    if (typeof this.fd != "number") return this.once("open", function() {
      this._read(fe);
    });
    if (this.destroyed) return;
    (!pe || pe.length - pe.used < ne) && Se(this._readableState.highWaterMark);
    var u = pe, r = Math.min(pe.length - pe.used, fe), l = pe.used;
    if (this.pos !== void 0 && (r = Math.min(this.end - this.pos + 1, r)), r <= 0) return this.push(null);
    var N = this;
    this._vol.read(this.fd, pe, pe.used, r, this.pos, U), this.pos !== void 0 && (this.pos += r), pe.used += r;
    function U(z, Q) {
      if (z) N.autoClose && N.destroy && N.destroy(), N.emit("error", z);
      else {
        var se = null;
        Q > 0 && (N.bytesRead += Q, se = u.slice(l, l + Q)), N.push(se);
      }
    }
  }, we.prototype._destroy = function(fe, u) {
    this.close((r) => {
      u(fe || r);
    });
  }, we.prototype.close = function(fe) {
    var u;
    if (fe && this.once("close", fe), this.closed || typeof this.fd != "number") {
      if (typeof this.fd != "number") {
        this.once("open", Be);
        return;
      }
      return (0, b.default)(() => this.emit("close"));
    }
    typeof ((u = this._readableState) === null || u === void 0 ? void 0 : u.closed) == "boolean" ? this._readableState.closed = true : this.closed = true, this._vol.close(this.fd, (r) => {
      r ? this.emit("error", r) : this.emit("close");
    }), this.fd = null;
  };
  function Be(fe) {
    this.close();
  }
  T.inherits(Te, g.Writable), He.WriteStream = Te;
  function Te(fe, u, r) {
    if (!(this instanceof Te)) return new Te(fe, u, r);
    if (this._vol = fe, r = Object.assign({}, (0, o.getOptions)(r, {})), g.Writable.call(this, r), this.path = (0, n.pathToFilename)(u), this.fd = r.fd === void 0 ? null : typeof r.fd != "number" ? r.fd.fd : r.fd, this.flags = r.flags === void 0 ? "w" : r.flags, this.mode = r.mode === void 0 ? 438 : r.mode, this.start = r.start, this.autoClose = r.autoClose === void 0 ? true : !!r.autoClose, this.pos = void 0, this.bytesWritten = 0, this.pending = true, this.start !== void 0) {
      if (typeof this.start != "number") throw new TypeError('"start" option must be a Number');
      if (this.start < 0) throw new Error('"start" must be >= zero');
      this.pos = this.start;
    }
    r.encoding && this.setDefaultEncoding(r.encoding), typeof this.fd != "number" && this.open(), this.once("finish", function() {
      this.autoClose && this.close();
    });
  }
  Te.prototype.open = function() {
    this._vol.open(this.path, this.flags, this.mode, (function(fe, u) {
      if (fe) {
        this.autoClose && this.destroy && this.destroy(), this.emit("error", fe);
        return;
      }
      this.fd = u, this.pending = false, this.emit("open", u);
    }).bind(this));
  }, Te.prototype._write = function(fe, u, r) {
    if (!(fe instanceof h.Buffer || fe instanceof Uint8Array)) return this.emit("error", new Error("Invalid data"));
    if (typeof this.fd != "number") return this.once("open", function() {
      this._write(fe, u, r);
    });
    var l = this;
    this._vol.write(this.fd, fe, 0, fe.length, this.pos, (N, U) => {
      if (N) return l.autoClose && l.destroy && l.destroy(), r(N);
      l.bytesWritten += U, r();
    }), this.pos !== void 0 && (this.pos += fe.length);
  }, Te.prototype._writev = function(fe, u) {
    if (typeof this.fd != "number") return this.once("open", function() {
      this._writev(fe, u);
    });
    const r = this, l = fe.length, N = new Array(l);
    for (var U = 0, z = 0; z < l; z++) {
      var Q = fe[z].chunk;
      N[z] = Q, U += Q.length;
    }
    const se = h.Buffer.concat(N);
    this._vol.write(this.fd, se, 0, se.length, this.pos, (le, Re) => {
      if (le) return r.destroy && r.destroy(), u(le);
      r.bytesWritten += Re, u();
    }), this.pos !== void 0 && (this.pos += U);
  }, Te.prototype.close = function(fe) {
    var u;
    if (fe && this.once("close", fe), this.closed || typeof this.fd != "number") {
      if (typeof this.fd != "number") {
        this.once("open", Be);
        return;
      }
      return (0, b.default)(() => this.emit("close"));
    }
    typeof ((u = this._writableState) === null || u === void 0 ? void 0 : u.closed) == "boolean" ? this._writableState.closed = true : this.closed = true, this._vol.close(this.fd, (r) => {
      r ? this.emit("error", r) : this.emit("close");
    }), this.fd = null;
  }, Te.prototype._destroy = we.prototype._destroy, Te.prototype.destroySoon = Te.prototype.end;
  class ke extends L.EventEmitter {
    constructor(u) {
      super(), this._filename = "", this._filenameEncoded = "", this._recursive = false, this._encoding = I.ENCODING_UTF8, this._listenerRemovers = /* @__PURE__ */ new Map(), this._onParentChild = (r) => {
        r.getName() === this._getName() && this._emit("rename");
      }, this._emit = (r) => {
        this.emit("change", r, this._filenameEncoded);
      }, this._persist = () => {
        this._timer = setTimeout(this._persist, 1e6);
      }, this._vol = u;
    }
    _getName() {
      return this._steps[this._steps.length - 1];
    }
    start(u, r = true, l = false, N = I.ENCODING_UTF8) {
      this._filename = (0, n.pathToFilename)(u), this._steps = me(this._filename), this._filenameEncoded = (0, I.strToEncoding)(this._filename), this._recursive = l, this._encoding = N;
      try {
        this._link = this._vol.getLinkOrThrow(this._filename, "FSWatcher");
      } catch (se) {
        const le = new Error(`watch ${this._filename} ${se.code}`);
        throw le.code = se.code, le.errno = se.code, le;
      }
      const U = (se) => {
        var le;
        const Re = se.getPath(), Ce = se.getNode(), Ue = () => {
          let E = re(this._filename, Re);
          return E || (E = this._getName()), this.emit("change", "change", E);
        };
        Ce.on("change", Ue);
        const $e = (le = this._listenerRemovers.get(Ce.ino)) !== null && le !== void 0 ? le : [];
        $e.push(() => Ce.removeListener("change", Ue)), this._listenerRemovers.set(Ce.ino, $e);
      }, z = (se) => {
        var le;
        const Re = se.getNode(), Ce = (E) => {
          this.emit("change", "rename", re(this._filename, E.getPath())), setTimeout(() => {
            U(E), z(E);
          });
        }, Ue = (E) => {
          const i = (f) => {
            const C = f.getNode().ino, G = this._listenerRemovers.get(C);
            G && (G.forEach((Z) => Z()), this._listenerRemovers.delete(C));
            for (const [Z, ae] of f.children.entries()) ae && Z !== "." && Z !== ".." && i(ae);
          };
          i(E), this.emit("change", "rename", re(this._filename, E.getPath()));
        };
        for (const [E, i] of se.children.entries()) i && E !== "." && E !== ".." && U(i);
        if (se.on("child:add", Ce), se.on("child:delete", Ue), ((le = this._listenerRemovers.get(Re.ino)) !== null && le !== void 0 ? le : []).push(() => {
          se.removeListener("child:add", Ce), se.removeListener("child:delete", Ue);
        }), l) for (const [E, i] of se.children.entries()) i && E !== "." && E !== ".." && z(i);
      };
      U(this._link), z(this._link);
      const Q = this._link.parent;
      Q && (Q.setMaxListeners(Q.getMaxListeners() + 1), Q.on("child:delete", this._onParentChild)), r && this._persist();
    }
    close() {
      clearTimeout(this._timer), this._listenerRemovers.forEach((r) => {
        r.forEach((l) => l());
      }), this._listenerRemovers.clear();
      const u = this._link.parent;
      u && u.removeListener("child:delete", this._onParentChild);
    }
  }
  return He.FSWatcher = ke, He;
}
var yt = {}, Ua;
function pl() {
  return Ua || (Ua = 1, Object.defineProperty(yt, "__esModule", { value: true }), yt.fsSynchronousApiList = void 0, yt.fsSynchronousApiList = ["accessSync", "appendFileSync", "chmodSync", "chownSync", "closeSync", "copyFileSync", "existsSync", "fchmodSync", "fchownSync", "fdatasyncSync", "fstatSync", "fsyncSync", "ftruncateSync", "futimesSync", "lchmodSync", "lchownSync", "linkSync", "lstatSync", "mkdirSync", "mkdtempSync", "openSync", "readdirSync", "readFileSync", "readlinkSync", "readSync", "readvSync", "realpathSync", "renameSync", "rmdirSync", "rmSync", "statSync", "symlinkSync", "truncateSync", "unlinkSync", "utimesSync", "lutimesSync", "writeFileSync", "writeSync", "writevSync"]), yt;
}
var gt = {}, $a;
function yl() {
  return $a || ($a = 1, Object.defineProperty(gt, "__esModule", { value: true }), gt.fsCallbackApiList = void 0, gt.fsCallbackApiList = ["access", "appendFile", "chmod", "chown", "close", "copyFile", "createReadStream", "createWriteStream", "exists", "fchmod", "fchown", "fdatasync", "fstat", "fsync", "ftruncate", "futimes", "lchmod", "lchown", "link", "lstat", "mkdir", "mkdtemp", "open", "read", "readv", "readdir", "readFile", "readlink", "realpath", "rename", "rm", "rmdir", "stat", "symlink", "truncate", "unlink", "unwatchFile", "utimes", "lutimes", "watch", "watchFile", "write", "writev", "writeFile"]), gt;
}
var Wa;
function Sl() {
  return Wa || (Wa = 1, function(e, a) {
    Object.defineProperty(a, "__esModule", { value: true }), a.memfs = a.fs = a.vol = a.Volume = void 0, a.createFsFromVolume = I;
    const t = ai(), s = fi(), h = dl(), c = Qe(), b = pl(), d = yl(), { F_OK: v, R_OK: g, W_OK: R, X_OK: L } = c.constants;
    a.Volume = h.Volume, a.vol = new h.Volume();
    function I(T) {
      const j = { F_OK: v, R_OK: g, W_OK: R, X_OK: L, constants: c.constants, Stats: t.default, Dirent: s.default };
      for (const O of b.fsSynchronousApiList) typeof T[O] == "function" && (j[O] = T[O].bind(T));
      for (const O of d.fsCallbackApiList) typeof T[O] == "function" && (j[O] = T[O].bind(T));
      return j.StatWatcher = T.StatWatcher, j.FSWatcher = T.FSWatcher, j.WriteStream = T.WriteStream, j.ReadStream = T.ReadStream, j.promises = T.promises, j._toUnixTimestamp = h.toUnixTimestamp, j.__vol = T, j;
    }
    a.fs = I(a.vol);
    const A = (T = {}, j = "/") => {
      const O = a.Volume.fromNestedJSON(T, j);
      return { fs: I(O), vol: O };
    };
    a.memfs = A, e.exports = Object.assign(Object.assign({}, e.exports), a.fs), e.exports.semantic = true;
  }(Tt, Tt.exports)), Tt.exports;
}
export {
  Yu as a,
  Qu as b,
  Ze as c,
  _t as d,
  wa as e,
  St as f,
  Ye as g,
  uf as h,
  Sl as i,
  mu as j,
  Gu as r
};

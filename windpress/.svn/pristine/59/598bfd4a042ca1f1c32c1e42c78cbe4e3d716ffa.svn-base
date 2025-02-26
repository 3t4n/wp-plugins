var __defProp = Object.defineProperty;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __publicField = (obj, key, value) => __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
var _a, _b;
import "./index-BAMY2Nnw.js";
import { B as or } from "./index-CgqXENQe.js";
var X = "top", ie = "bottom", oe = "right", J = "left", Wn = "auto", bt = [X, ie, oe, J], qe = "start", dt = "end", to = "clippingParents", zr = "viewport", it = "popper", no = "reference", sr = bt.reduce(function(n, e) {
  return n.concat([e + "-" + qe, e + "-" + dt]);
}, []), qr = [].concat(bt, [Wn]).reduce(function(n, e) {
  return n.concat([e, e + "-" + qe, e + "-" + dt]);
}, []), ro = "beforeRead", io = "read", oo = "afterRead", so = "beforeMain", ao = "main", lo = "afterMain", co = "beforeWrite", uo = "write", fo = "afterWrite", ho = [ro, io, oo, so, ao, lo, co, uo, fo];
function ge(n) {
  return n ? (n.nodeName || "").toLowerCase() : null;
}
function ee(n) {
  if (n == null) return window;
  if (n.toString() !== "[object Window]") {
    var e = n.ownerDocument;
    return e && e.defaultView || window;
  }
  return n;
}
function Ie(n) {
  var e = ee(n).Element;
  return n instanceof e || n instanceof Element;
}
function re(n) {
  var e = ee(n).HTMLElement;
  return n instanceof e || n instanceof HTMLElement;
}
function Gn(n) {
  if (typeof ShadowRoot > "u") return false;
  var e = ee(n).ShadowRoot;
  return n instanceof e || n instanceof ShadowRoot;
}
function po(n) {
  var e = n.state;
  Object.keys(e.elements).forEach(function(t) {
    var r = e.styles[t] || {}, i = e.attributes[t] || {}, o = e.elements[t];
    !re(o) || !ge(o) || (Object.assign(o.style, r), Object.keys(i).forEach(function(s) {
      var l = i[s];
      l === false ? o.removeAttribute(s) : o.setAttribute(s, l === true ? "" : l);
    }));
  });
}
function go(n) {
  var e = n.state, t = { popper: { position: e.options.strategy, left: "0", top: "0", margin: "0" }, arrow: { position: "absolute" }, reference: {} };
  return Object.assign(e.elements.popper.style, t.popper), e.styles = t, e.elements.arrow && Object.assign(e.elements.arrow.style, t.arrow), function() {
    Object.keys(e.elements).forEach(function(r) {
      var i = e.elements[r], o = e.attributes[r] || {}, s = Object.keys(e.styles.hasOwnProperty(r) ? e.styles[r] : t[r]), l = s.reduce(function(a, c) {
        return a[c] = "", a;
      }, {});
      !re(i) || !ge(i) || (Object.assign(i.style, l), Object.keys(o).forEach(function(a) {
        i.removeAttribute(a);
      }));
    });
  };
}
const Vr = { name: "applyStyles", enabled: true, phase: "write", fn: po, effect: go, requires: ["computeStyles"] };
function pe(n) {
  return n.split("-")[0];
}
var Ne = Math.max, zt = Math.min, Ve = Math.round;
function Tn() {
  var n = navigator.userAgentData;
  return n != null && n.brands && Array.isArray(n.brands) ? n.brands.map(function(e) {
    return e.brand + "/" + e.version;
  }).join(" ") : navigator.userAgent;
}
function Yr() {
  return !/^((?!chrome|android).)*safari/i.test(Tn());
}
function Ye(n, e, t) {
  e === void 0 && (e = false), t === void 0 && (t = false);
  var r = n.getBoundingClientRect(), i = 1, o = 1;
  e && re(n) && (i = n.offsetWidth > 0 && Ve(r.width) / n.offsetWidth || 1, o = n.offsetHeight > 0 && Ve(r.height) / n.offsetHeight || 1);
  var s = Ie(n) ? ee(n) : window, l = s.visualViewport, a = !Yr() && t, c = (r.left + (a && l ? l.offsetLeft : 0)) / i, u = (r.top + (a && l ? l.offsetTop : 0)) / o, f = r.width / i, g = r.height / o;
  return { width: f, height: g, top: u, right: c + f, bottom: u + g, left: c, x: c, y: u };
}
function Hn(n) {
  var e = Ye(n), t = n.offsetWidth, r = n.offsetHeight;
  return Math.abs(e.width - t) <= 1 && (t = e.width), Math.abs(e.height - r) <= 1 && (r = e.height), { x: n.offsetLeft, y: n.offsetTop, width: t, height: r };
}
function Kr(n, e) {
  var t = e.getRootNode && e.getRootNode();
  if (n.contains(e)) return true;
  if (t && Gn(t)) {
    var r = e;
    do {
      if (r && n.isSameNode(r)) return true;
      r = r.parentNode || r.host;
    } while (r);
  }
  return false;
}
function Se(n) {
  return ee(n).getComputedStyle(n);
}
function mo(n) {
  return ["table", "td", "th"].indexOf(ge(n)) >= 0;
}
function xe(n) {
  return ((Ie(n) ? n.ownerDocument : n.document) || window.document).documentElement;
}
function on(n) {
  return ge(n) === "html" ? n : n.assignedSlot || n.parentNode || (Gn(n) ? n.host : null) || xe(n);
}
function ar(n) {
  return !re(n) || Se(n).position === "fixed" ? null : n.offsetParent;
}
function vo(n) {
  var e = /firefox/i.test(Tn()), t = /Trident/i.test(Tn());
  if (t && re(n)) {
    var r = Se(n);
    if (r.position === "fixed") return null;
  }
  var i = on(n);
  for (Gn(i) && (i = i.host); re(i) && ["html", "body"].indexOf(ge(i)) < 0; ) {
    var o = Se(i);
    if (o.transform !== "none" || o.perspective !== "none" || o.contain === "paint" || ["transform", "perspective"].indexOf(o.willChange) !== -1 || e && o.willChange === "filter" || e && o.filter && o.filter !== "none") return i;
    i = i.parentNode;
  }
  return null;
}
function wt(n) {
  for (var e = ee(n), t = ar(n); t && mo(t) && Se(t).position === "static"; ) t = ar(t);
  return t && (ge(t) === "html" || ge(t) === "body" && Se(t).position === "static") ? e : t || vo(n) || e;
}
function Fn(n) {
  return ["top", "bottom"].indexOf(n) >= 0 ? "x" : "y";
}
function lt(n, e, t) {
  return Ne(n, zt(e, t));
}
function yo(n, e, t) {
  var r = lt(n, e, t);
  return r > t ? t : r;
}
function Xr() {
  return { top: 0, right: 0, bottom: 0, left: 0 };
}
function Jr(n) {
  return Object.assign({}, Xr(), n);
}
function Qr(n, e) {
  return e.reduce(function(t, r) {
    return t[r] = n, t;
  }, {});
}
var bo = function(e, t) {
  return e = typeof e == "function" ? e(Object.assign({}, t.rects, { placement: t.placement })) : e, Jr(typeof e != "number" ? e : Qr(e, bt));
};
function wo(n) {
  var e, t = n.state, r = n.name, i = n.options, o = t.elements.arrow, s = t.modifiersData.popperOffsets, l = pe(t.placement), a = Fn(l), c = [J, oe].indexOf(l) >= 0, u = c ? "height" : "width";
  if (!(!o || !s)) {
    var f = bo(i.padding, t), g = Hn(o), d = a === "y" ? X : J, p = a === "y" ? ie : oe, w = t.rects.reference[u] + t.rects.reference[a] - s[a] - t.rects.popper[u], m = s[a] - t.rects.reference[a], y = wt(o), b = y ? a === "y" ? y.clientHeight || 0 : y.clientWidth || 0 : 0, C = w / 2 - m / 2, h = f[d], x = b - g[u] - f[p], _ = b / 2 - g[u] / 2 + C, k = lt(h, _, x), L = a;
    t.modifiersData[r] = (e = {}, e[L] = k, e.centerOffset = k - _, e);
  }
}
function So(n) {
  var e = n.state, t = n.options, r = t.element, i = r === void 0 ? "[data-popper-arrow]" : r;
  i != null && (typeof i == "string" && (i = e.elements.popper.querySelector(i), !i) || Kr(e.elements.popper, i) && (e.elements.arrow = i));
}
const Co = { name: "arrow", enabled: true, phase: "main", fn: wo, effect: So, requires: ["popperOffsets"], requiresIfExists: ["preventOverflow"] };
function Ke(n) {
  return n.split("-")[1];
}
var _o = { top: "auto", right: "auto", bottom: "auto", left: "auto" };
function xo(n, e) {
  var t = n.x, r = n.y, i = e.devicePixelRatio || 1;
  return { x: Ve(t * i) / i || 0, y: Ve(r * i) / i || 0 };
}
function lr(n) {
  var e, t = n.popper, r = n.popperRect, i = n.placement, o = n.variation, s = n.offsets, l = n.position, a = n.gpuAcceleration, c = n.adaptive, u = n.roundOffsets, f = n.isFixed, g = s.x, d = g === void 0 ? 0 : g, p = s.y, w = p === void 0 ? 0 : p, m = typeof u == "function" ? u({ x: d, y: w }) : { x: d, y: w };
  d = m.x, w = m.y;
  var y = s.hasOwnProperty("x"), b = s.hasOwnProperty("y"), C = J, h = X, x = window;
  if (c) {
    var _ = wt(t), k = "clientHeight", L = "clientWidth";
    if (_ === ee(t) && (_ = xe(t), Se(_).position !== "static" && l === "absolute" && (k = "scrollHeight", L = "scrollWidth")), _ = _, i === X || (i === J || i === oe) && o === dt) {
      h = ie;
      var E = f && _ === x && x.visualViewport ? x.visualViewport.height : _[k];
      w -= E - r.height, w *= a ? 1 : -1;
    }
    if (i === J || (i === X || i === ie) && o === dt) {
      C = oe;
      var O = f && _ === x && x.visualViewport ? x.visualViewport.width : _[L];
      d -= O - r.width, d *= a ? 1 : -1;
    }
  }
  var D = Object.assign({ position: l }, c && _o), M = u === true ? xo({ x: d, y: w }, ee(t)) : { x: d, y: w };
  if (d = M.x, w = M.y, a) {
    var N;
    return Object.assign({}, D, (N = {}, N[h] = b ? "0" : "", N[C] = y ? "0" : "", N.transform = (x.devicePixelRatio || 1) <= 1 ? "translate(" + d + "px, " + w + "px)" : "translate3d(" + d + "px, " + w + "px, 0)", N));
  }
  return Object.assign({}, D, (e = {}, e[h] = b ? w + "px" : "", e[C] = y ? d + "px" : "", e.transform = "", e));
}
function To(n) {
  var e = n.state, t = n.options, r = t.gpuAcceleration, i = r === void 0 ? true : r, o = t.adaptive, s = o === void 0 ? true : o, l = t.roundOffsets, a = l === void 0 ? true : l, c = { placement: pe(e.placement), variation: Ke(e.placement), popper: e.elements.popper, popperRect: e.rects.popper, gpuAcceleration: i, isFixed: e.options.strategy === "fixed" };
  e.modifiersData.popperOffsets != null && (e.styles.popper = Object.assign({}, e.styles.popper, lr(Object.assign({}, c, { offsets: e.modifiersData.popperOffsets, position: e.options.strategy, adaptive: s, roundOffsets: a })))), e.modifiersData.arrow != null && (e.styles.arrow = Object.assign({}, e.styles.arrow, lr(Object.assign({}, c, { offsets: e.modifiersData.arrow, position: "absolute", adaptive: false, roundOffsets: a })))), e.attributes.popper = Object.assign({}, e.attributes.popper, { "data-popper-placement": e.placement });
}
const Eo = { name: "computeStyles", enabled: true, phase: "beforeWrite", fn: To, data: {} };
var Mt = { passive: true };
function Ao(n) {
  var e = n.state, t = n.instance, r = n.options, i = r.scroll, o = i === void 0 ? true : i, s = r.resize, l = s === void 0 ? true : s, a = ee(e.elements.popper), c = [].concat(e.scrollParents.reference, e.scrollParents.popper);
  return o && c.forEach(function(u) {
    u.addEventListener("scroll", t.update, Mt);
  }), l && a.addEventListener("resize", t.update, Mt), function() {
    o && c.forEach(function(u) {
      u.removeEventListener("scroll", t.update, Mt);
    }), l && a.removeEventListener("resize", t.update, Mt);
  };
}
const Ro = { name: "eventListeners", enabled: true, phase: "write", fn: function() {
}, effect: Ao, data: {} };
var ko = { left: "right", right: "left", bottom: "top", top: "bottom" };
function Gt(n) {
  return n.replace(/left|right|bottom|top/g, function(e) {
    return ko[e];
  });
}
var Lo = { start: "end", end: "start" };
function cr(n) {
  return n.replace(/start|end/g, function(e) {
    return Lo[e];
  });
}
function zn(n) {
  var e = ee(n), t = e.pageXOffset, r = e.pageYOffset;
  return { scrollLeft: t, scrollTop: r };
}
function qn(n) {
  return Ye(xe(n)).left + zn(n).scrollLeft;
}
function Oo(n, e) {
  var t = ee(n), r = xe(n), i = t.visualViewport, o = r.clientWidth, s = r.clientHeight, l = 0, a = 0;
  if (i) {
    o = i.width, s = i.height;
    var c = Yr();
    (c || !c && e === "fixed") && (l = i.offsetLeft, a = i.offsetTop);
  }
  return { width: o, height: s, x: l + qn(n), y: a };
}
function Po(n) {
  var e, t = xe(n), r = zn(n), i = (e = n.ownerDocument) == null ? void 0 : e.body, o = Ne(t.scrollWidth, t.clientWidth, i ? i.scrollWidth : 0, i ? i.clientWidth : 0), s = Ne(t.scrollHeight, t.clientHeight, i ? i.scrollHeight : 0, i ? i.clientHeight : 0), l = -r.scrollLeft + qn(n), a = -r.scrollTop;
  return Se(i || t).direction === "rtl" && (l += Ne(t.clientWidth, i ? i.clientWidth : 0) - o), { width: o, height: s, x: l, y: a };
}
function Vn(n) {
  var e = Se(n), t = e.overflow, r = e.overflowX, i = e.overflowY;
  return /auto|scroll|overlay|hidden/.test(t + i + r);
}
function Zr(n) {
  return ["html", "body", "#document"].indexOf(ge(n)) >= 0 ? n.ownerDocument.body : re(n) && Vn(n) ? n : Zr(on(n));
}
function ct(n, e) {
  var t;
  e === void 0 && (e = []);
  var r = Zr(n), i = r === ((t = n.ownerDocument) == null ? void 0 : t.body), o = ee(r), s = i ? [o].concat(o.visualViewport || [], Vn(r) ? r : []) : r, l = e.concat(s);
  return i ? l : l.concat(ct(on(s)));
}
function En(n) {
  return Object.assign({}, n, { left: n.x, top: n.y, right: n.x + n.width, bottom: n.y + n.height });
}
function No(n, e) {
  var t = Ye(n, false, e === "fixed");
  return t.top = t.top + n.clientTop, t.left = t.left + n.clientLeft, t.bottom = t.top + n.clientHeight, t.right = t.left + n.clientWidth, t.width = n.clientWidth, t.height = n.clientHeight, t.x = t.left, t.y = t.top, t;
}
function ur(n, e, t) {
  return e === zr ? En(Oo(n, t)) : Ie(e) ? No(e, t) : En(Po(xe(n)));
}
function Io(n) {
  var e = ct(on(n)), t = ["absolute", "fixed"].indexOf(Se(n).position) >= 0, r = t && re(n) ? wt(n) : n;
  return Ie(r) ? e.filter(function(i) {
    return Ie(i) && Kr(i, r) && ge(i) !== "body";
  }) : [];
}
function Mo(n, e, t, r) {
  var i = e === "clippingParents" ? Io(n) : [].concat(e), o = [].concat(i, [t]), s = o[0], l = o.reduce(function(a, c) {
    var u = ur(n, c, r);
    return a.top = Ne(u.top, a.top), a.right = zt(u.right, a.right), a.bottom = zt(u.bottom, a.bottom), a.left = Ne(u.left, a.left), a;
  }, ur(n, s, r));
  return l.width = l.right - l.left, l.height = l.bottom - l.top, l.x = l.left, l.y = l.top, l;
}
function ei(n) {
  var e = n.reference, t = n.element, r = n.placement, i = r ? pe(r) : null, o = r ? Ke(r) : null, s = e.x + e.width / 2 - t.width / 2, l = e.y + e.height / 2 - t.height / 2, a;
  switch (i) {
    case X:
      a = { x: s, y: e.y - t.height };
      break;
    case ie:
      a = { x: s, y: e.y + e.height };
      break;
    case oe:
      a = { x: e.x + e.width, y: l };
      break;
    case J:
      a = { x: e.x - t.width, y: l };
      break;
    default:
      a = { x: e.x, y: e.y };
  }
  var c = i ? Fn(i) : null;
  if (c != null) {
    var u = c === "y" ? "height" : "width";
    switch (o) {
      case qe:
        a[c] = a[c] - (e[u] / 2 - t[u] / 2);
        break;
      case dt:
        a[c] = a[c] + (e[u] / 2 - t[u] / 2);
        break;
    }
  }
  return a;
}
function pt(n, e) {
  e === void 0 && (e = {});
  var t = e, r = t.placement, i = r === void 0 ? n.placement : r, o = t.strategy, s = o === void 0 ? n.strategy : o, l = t.boundary, a = l === void 0 ? to : l, c = t.rootBoundary, u = c === void 0 ? zr : c, f = t.elementContext, g = f === void 0 ? it : f, d = t.altBoundary, p = d === void 0 ? false : d, w = t.padding, m = w === void 0 ? 0 : w, y = Jr(typeof m != "number" ? m : Qr(m, bt)), b = g === it ? no : it, C = n.rects.popper, h = n.elements[p ? b : g], x = Mo(Ie(h) ? h : h.contextElement || xe(n.elements.popper), a, u, s), _ = Ye(n.elements.reference), k = ei({ reference: _, element: C, placement: i }), L = En(Object.assign({}, C, k)), E = g === it ? L : _, O = { top: x.top - E.top + y.top, bottom: E.bottom - x.bottom + y.bottom, left: x.left - E.left + y.left, right: E.right - x.right + y.right }, D = n.modifiersData.offset;
  if (g === it && D) {
    var M = D[i];
    Object.keys(O).forEach(function(N) {
      var B = [oe, ie].indexOf(N) >= 0 ? 1 : -1, $ = [X, ie].indexOf(N) >= 0 ? "y" : "x";
      O[N] += M[$] * B;
    });
  }
  return O;
}
function Do(n, e) {
  e === void 0 && (e = {});
  var t = e, r = t.placement, i = t.boundary, o = t.rootBoundary, s = t.padding, l = t.flipVariations, a = t.allowedAutoPlacements, c = a === void 0 ? qr : a, u = Ke(r), f = u ? l ? sr : sr.filter(function(p) {
    return Ke(p) === u;
  }) : bt, g = f.filter(function(p) {
    return c.indexOf(p) >= 0;
  });
  g.length === 0 && (g = f);
  var d = g.reduce(function(p, w) {
    return p[w] = pt(n, { placement: w, boundary: i, rootBoundary: o, padding: s })[pe(w)], p;
  }, {});
  return Object.keys(d).sort(function(p, w) {
    return d[p] - d[w];
  });
}
function Bo(n) {
  if (pe(n) === Wn) return [];
  var e = Gt(n);
  return [cr(n), e, cr(e)];
}
function jo(n) {
  var e = n.state, t = n.options, r = n.name;
  if (!e.modifiersData[r]._skip) {
    for (var i = t.mainAxis, o = i === void 0 ? true : i, s = t.altAxis, l = s === void 0 ? true : s, a = t.fallbackPlacements, c = t.padding, u = t.boundary, f = t.rootBoundary, g = t.altBoundary, d = t.flipVariations, p = d === void 0 ? true : d, w = t.allowedAutoPlacements, m = e.options.placement, y = pe(m), b = y === m, C = a || (b || !p ? [Gt(m)] : Bo(m)), h = [m].concat(C).reduce(function(me, se) {
      return me.concat(pe(se) === Wn ? Do(e, { placement: se, boundary: u, rootBoundary: f, padding: c, flipVariations: p, allowedAutoPlacements: w }) : se);
    }, []), x = e.rects.reference, _ = e.rects.popper, k = /* @__PURE__ */ new Map(), L = true, E = h[0], O = 0; O < h.length; O++) {
      var D = h[O], M = pe(D), N = Ke(D) === qe, B = [X, ie].indexOf(M) >= 0, $ = B ? "width" : "height", U = pt(e, { placement: D, boundary: u, rootBoundary: f, altBoundary: g, padding: c }), q = B ? N ? oe : J : N ? ie : X;
      x[$] > _[$] && (q = Gt(q));
      var z = Gt(q), le = [];
      if (o && le.push(U[M] <= 0), l && le.push(U[q] <= 0, U[z] <= 0), le.every(function(me) {
        return me;
      })) {
        E = D, L = false;
        break;
      }
      k.set(D, le);
    }
    if (L) for (var ce = p ? 3 : 1, Te = function(se) {
      var ve = h.find(function(De) {
        var ye = k.get(De);
        if (ye) return ye.slice(0, se).every(function(Be) {
          return Be;
        });
      });
      if (ve) return E = ve, "break";
    }, ue = ce; ue > 0; ue--) {
      var Ee = Te(ue);
      if (Ee === "break") break;
    }
    e.placement !== E && (e.modifiersData[r]._skip = true, e.placement = E, e.reset = true);
  }
}
const $o = { name: "flip", enabled: true, phase: "main", fn: jo, requiresIfExists: ["offset"], data: { _skip: false } };
function fr(n, e, t) {
  return t === void 0 && (t = { x: 0, y: 0 }), { top: n.top - e.height - t.y, right: n.right - e.width + t.x, bottom: n.bottom - e.height + t.y, left: n.left - e.width - t.x };
}
function hr(n) {
  return [X, oe, ie, J].some(function(e) {
    return n[e] >= 0;
  });
}
function Uo(n) {
  var e = n.state, t = n.name, r = e.rects.reference, i = e.rects.popper, o = e.modifiersData.preventOverflow, s = pt(e, { elementContext: "reference" }), l = pt(e, { altBoundary: true }), a = fr(s, r), c = fr(l, i, o), u = hr(a), f = hr(c);
  e.modifiersData[t] = { referenceClippingOffsets: a, popperEscapeOffsets: c, isReferenceHidden: u, hasPopperEscaped: f }, e.attributes.popper = Object.assign({}, e.attributes.popper, { "data-popper-reference-hidden": u, "data-popper-escaped": f });
}
const Wo = { name: "hide", enabled: true, phase: "main", requiresIfExists: ["preventOverflow"], fn: Uo };
function Go(n, e, t) {
  var r = pe(n), i = [J, X].indexOf(r) >= 0 ? -1 : 1, o = typeof t == "function" ? t(Object.assign({}, e, { placement: n })) : t, s = o[0], l = o[1];
  return s = s || 0, l = (l || 0) * i, [J, oe].indexOf(r) >= 0 ? { x: l, y: s } : { x: s, y: l };
}
function Ho(n) {
  var e = n.state, t = n.options, r = n.name, i = t.offset, o = i === void 0 ? [0, 0] : i, s = qr.reduce(function(u, f) {
    return u[f] = Go(f, e.rects, o), u;
  }, {}), l = s[e.placement], a = l.x, c = l.y;
  e.modifiersData.popperOffsets != null && (e.modifiersData.popperOffsets.x += a, e.modifiersData.popperOffsets.y += c), e.modifiersData[r] = s;
}
const Fo = { name: "offset", enabled: true, phase: "main", requires: ["popperOffsets"], fn: Ho };
function zo(n) {
  var e = n.state, t = n.name;
  e.modifiersData[t] = ei({ reference: e.rects.reference, element: e.rects.popper, placement: e.placement });
}
const qo = { name: "popperOffsets", enabled: true, phase: "read", fn: zo, data: {} };
function Vo(n) {
  return n === "x" ? "y" : "x";
}
function Yo(n) {
  var e = n.state, t = n.options, r = n.name, i = t.mainAxis, o = i === void 0 ? true : i, s = t.altAxis, l = s === void 0 ? false : s, a = t.boundary, c = t.rootBoundary, u = t.altBoundary, f = t.padding, g = t.tether, d = g === void 0 ? true : g, p = t.tetherOffset, w = p === void 0 ? 0 : p, m = pt(e, { boundary: a, rootBoundary: c, padding: f, altBoundary: u }), y = pe(e.placement), b = Ke(e.placement), C = !b, h = Fn(y), x = Vo(h), _ = e.modifiersData.popperOffsets, k = e.rects.reference, L = e.rects.popper, E = typeof w == "function" ? w(Object.assign({}, e.rects, { placement: e.placement })) : w, O = typeof E == "number" ? { mainAxis: E, altAxis: E } : Object.assign({ mainAxis: 0, altAxis: 0 }, E), D = e.modifiersData.offset ? e.modifiersData.offset[e.placement] : null, M = { x: 0, y: 0 };
  if (_) {
    if (o) {
      var N, B = h === "y" ? X : J, $ = h === "y" ? ie : oe, U = h === "y" ? "height" : "width", q = _[h], z = q + m[B], le = q - m[$], ce = d ? -L[U] / 2 : 0, Te = b === qe ? k[U] : L[U], ue = b === qe ? -L[U] : -k[U], Ee = e.elements.arrow, me = d && Ee ? Hn(Ee) : { width: 0, height: 0 }, se = e.modifiersData["arrow#persistent"] ? e.modifiersData["arrow#persistent"].padding : Xr(), ve = se[B], De = se[$], ye = lt(0, k[U], me[U]), Be = C ? k[U] / 2 - ce - ye - ve - O.mainAxis : Te - ye - ve - O.mainAxis, Ce = C ? -k[U] / 2 + ce + ye + De + O.mainAxis : ue + ye + De + O.mainAxis, je = e.elements.arrow && wt(e.elements.arrow), xt = je ? h === "y" ? je.clientTop || 0 : je.clientLeft || 0 : 0, Ze = (N = D == null ? void 0 : D[h]) != null ? N : 0, Tt = q + Be - Ze - xt, Et = q + Ce - Ze, et = lt(d ? zt(z, Tt) : z, q, d ? Ne(le, Et) : le);
      _[h] = et, M[h] = et - q;
    }
    if (l) {
      var tt, At = h === "x" ? X : J, Rt = h === "x" ? ie : oe, be = _[x], _e = x === "y" ? "height" : "width", nt = be + m[At], Ae = be - m[Rt], rt = [X, J].indexOf(y) !== -1, kt = (tt = D == null ? void 0 : D[x]) != null ? tt : 0, Lt = rt ? nt : be - k[_e] - L[_e] - kt + O.altAxis, Ot = rt ? be + k[_e] + L[_e] - kt - O.altAxis : Ae, Pt = d && rt ? yo(Lt, be, Ot) : lt(d ? Lt : nt, be, d ? Ot : Ae);
      _[x] = Pt, M[x] = Pt - be;
    }
    e.modifiersData[r] = M;
  }
}
const Ko = { name: "preventOverflow", enabled: true, phase: "main", fn: Yo, requiresIfExists: ["offset"] };
function Xo(n) {
  return { scrollLeft: n.scrollLeft, scrollTop: n.scrollTop };
}
function Jo(n) {
  return n === ee(n) || !re(n) ? zn(n) : Xo(n);
}
function Qo(n) {
  var e = n.getBoundingClientRect(), t = Ve(e.width) / n.offsetWidth || 1, r = Ve(e.height) / n.offsetHeight || 1;
  return t !== 1 || r !== 1;
}
function Zo(n, e, t) {
  t === void 0 && (t = false);
  var r = re(e), i = re(e) && Qo(e), o = xe(e), s = Ye(n, i, t), l = { scrollLeft: 0, scrollTop: 0 }, a = { x: 0, y: 0 };
  return (r || !r && !t) && ((ge(e) !== "body" || Vn(o)) && (l = Jo(e)), re(e) ? (a = Ye(e, true), a.x += e.clientLeft, a.y += e.clientTop) : o && (a.x = qn(o))), { x: s.left + l.scrollLeft - a.x, y: s.top + l.scrollTop - a.y, width: s.width, height: s.height };
}
function es(n) {
  var e = /* @__PURE__ */ new Map(), t = /* @__PURE__ */ new Set(), r = [];
  n.forEach(function(o) {
    e.set(o.name, o);
  });
  function i(o) {
    t.add(o.name);
    var s = [].concat(o.requires || [], o.requiresIfExists || []);
    s.forEach(function(l) {
      if (!t.has(l)) {
        var a = e.get(l);
        a && i(a);
      }
    }), r.push(o);
  }
  return n.forEach(function(o) {
    t.has(o.name) || i(o);
  }), r;
}
function ts(n) {
  var e = es(n);
  return ho.reduce(function(t, r) {
    return t.concat(e.filter(function(i) {
      return i.phase === r;
    }));
  }, []);
}
function ns(n) {
  var e;
  return function() {
    return e || (e = new Promise(function(t) {
      Promise.resolve().then(function() {
        e = void 0, t(n());
      });
    })), e;
  };
}
function rs(n) {
  var e = n.reduce(function(t, r) {
    var i = t[r.name];
    return t[r.name] = i ? Object.assign({}, i, r, { options: Object.assign({}, i.options, r.options), data: Object.assign({}, i.data, r.data) }) : r, t;
  }, {});
  return Object.keys(e).map(function(t) {
    return e[t];
  });
}
var dr = { placement: "bottom", modifiers: [], strategy: "absolute" };
function pr() {
  for (var n = arguments.length, e = new Array(n), t = 0; t < n; t++) e[t] = arguments[t];
  return !e.some(function(r) {
    return !(r && typeof r.getBoundingClientRect == "function");
  });
}
function is(n) {
  n === void 0 && (n = {});
  var e = n, t = e.defaultModifiers, r = t === void 0 ? [] : t, i = e.defaultOptions, o = i === void 0 ? dr : i;
  return function(l, a, c) {
    c === void 0 && (c = o);
    var u = { placement: "bottom", orderedModifiers: [], options: Object.assign({}, dr, o), modifiersData: {}, elements: { reference: l, popper: a }, attributes: {}, styles: {} }, f = [], g = false, d = { state: u, setOptions: function(y) {
      var b = typeof y == "function" ? y(u.options) : y;
      w(), u.options = Object.assign({}, o, u.options, b), u.scrollParents = { reference: Ie(l) ? ct(l) : l.contextElement ? ct(l.contextElement) : [], popper: ct(a) };
      var C = ts(rs([].concat(r, u.options.modifiers)));
      return u.orderedModifiers = C.filter(function(h) {
        return h.enabled;
      }), p(), d.update();
    }, forceUpdate: function() {
      if (!g) {
        var y = u.elements, b = y.reference, C = y.popper;
        if (pr(b, C)) {
          u.rects = { reference: Zo(b, wt(C), u.options.strategy === "fixed"), popper: Hn(C) }, u.reset = false, u.placement = u.options.placement, u.orderedModifiers.forEach(function(O) {
            return u.modifiersData[O.name] = Object.assign({}, O.data);
          });
          for (var h = 0; h < u.orderedModifiers.length; h++) {
            if (u.reset === true) {
              u.reset = false, h = -1;
              continue;
            }
            var x = u.orderedModifiers[h], _ = x.fn, k = x.options, L = k === void 0 ? {} : k, E = x.name;
            typeof _ == "function" && (u = _({ state: u, options: L, name: E, instance: d }) || u);
          }
        }
      }
    }, update: ns(function() {
      return new Promise(function(m) {
        d.forceUpdate(), m(u);
      });
    }), destroy: function() {
      w(), g = true;
    } };
    if (!pr(l, a)) return d;
    d.setOptions(c).then(function(m) {
      !g && c.onFirstUpdate && c.onFirstUpdate(m);
    });
    function p() {
      u.orderedModifiers.forEach(function(m) {
        var y = m.name, b = m.options, C = b === void 0 ? {} : b, h = m.effect;
        if (typeof h == "function") {
          var x = h({ state: u, name: y, instance: d, options: C }), _ = function() {
          };
          f.push(x || _);
        }
      });
    }
    function w() {
      f.forEach(function(m) {
        return m();
      }), f = [];
    }
    return d;
  };
}
var os = [Ro, qo, Eo, Vr, Fo, $o, Ko, Co, Wo], ss = is({ defaultModifiers: os }), as = "tippy-box", ti = "tippy-content", ls = "tippy-backdrop", ni = "tippy-arrow", ri = "tippy-svg-arrow", ke = { passive: true, capture: true }, ii = function() {
  return document.body;
};
function dn(n, e, t) {
  if (Array.isArray(n)) {
    var r = n[e];
    return r ?? (Array.isArray(t) ? t[e] : t);
  }
  return n;
}
function Yn(n, e) {
  var t = {}.toString.call(n);
  return t.indexOf("[object") === 0 && t.indexOf(e + "]") > -1;
}
function oi(n, e) {
  return typeof n == "function" ? n.apply(void 0, e) : n;
}
function gr(n, e) {
  if (e === 0) return n;
  var t;
  return function(r) {
    clearTimeout(t), t = setTimeout(function() {
      n(r);
    }, e);
  };
}
function cs(n) {
  return n.split(/\s+/).filter(Boolean);
}
function We(n) {
  return [].concat(n);
}
function mr(n, e) {
  n.indexOf(e) === -1 && n.push(e);
}
function us(n) {
  return n.filter(function(e, t) {
    return n.indexOf(e) === t;
  });
}
function fs(n) {
  return n.split("-")[0];
}
function qt(n) {
  return [].slice.call(n);
}
function vr(n) {
  return Object.keys(n).reduce(function(e, t) {
    return n[t] !== void 0 && (e[t] = n[t]), e;
  }, {});
}
function ut() {
  return document.createElement("div");
}
function sn(n) {
  return ["Element", "Fragment"].some(function(e) {
    return Yn(n, e);
  });
}
function hs(n) {
  return Yn(n, "NodeList");
}
function si(n) {
  return Yn(n, "MouseEvent");
}
function ds(n) {
  return !!(n && n._tippy && n._tippy.reference === n);
}
function ps(n) {
  return sn(n) ? [n] : hs(n) ? qt(n) : Array.isArray(n) ? n : qt(document.querySelectorAll(n));
}
function pn(n, e) {
  n.forEach(function(t) {
    t && (t.style.transitionDuration = e + "ms");
  });
}
function yr(n, e) {
  n.forEach(function(t) {
    t && t.setAttribute("data-state", e);
  });
}
function ai(n) {
  var e, t = We(n), r = t[0];
  return r != null && (e = r.ownerDocument) != null && e.body ? r.ownerDocument : document;
}
function gs(n, e) {
  var t = e.clientX, r = e.clientY;
  return n.every(function(i) {
    var o = i.popperRect, s = i.popperState, l = i.props, a = l.interactiveBorder, c = fs(s.placement), u = s.modifiersData.offset;
    if (!u) return true;
    var f = c === "bottom" ? u.top.y : 0, g = c === "top" ? u.bottom.y : 0, d = c === "right" ? u.left.x : 0, p = c === "left" ? u.right.x : 0, w = o.top - r + f > a, m = r - o.bottom - g > a, y = o.left - t + d > a, b = t - o.right - p > a;
    return w || m || y || b;
  });
}
function gn(n, e, t) {
  var r = e + "EventListener";
  ["transitionend", "webkitTransitionEnd"].forEach(function(i) {
    n[r](i, t);
  });
}
function br(n, e) {
  for (var t = e; t; ) {
    var r;
    if (n.contains(t)) return true;
    t = t.getRootNode == null || (r = t.getRootNode()) == null ? void 0 : r.host;
  }
  return false;
}
var de = { isTouch: false }, wr = 0;
function ms() {
  de.isTouch || (de.isTouch = true, window.performance && document.addEventListener("mousemove", li));
}
function li() {
  var n = performance.now();
  n - wr < 20 && (de.isTouch = false, document.removeEventListener("mousemove", li)), wr = n;
}
function vs() {
  var n = document.activeElement;
  if (ds(n)) {
    var e = n._tippy;
    n.blur && !e.state.isVisible && n.blur();
  }
}
function ys() {
  document.addEventListener("touchstart", ms, ke), window.addEventListener("blur", vs);
}
var bs = typeof window < "u" && typeof document < "u", ws = bs ? !!window.msCrypto : false, Ss = { animateFill: false, followCursor: false, inlinePositioning: false, sticky: false }, Cs = { allowHTML: false, animation: "fade", arrow: true, content: "", inertia: false, maxWidth: 350, role: "tooltip", theme: "", zIndex: 9999 }, ae = Object.assign({ appendTo: ii, aria: { content: "auto", expanded: "auto" }, delay: 0, duration: [300, 250], getReferenceClientRect: null, hideOnClick: true, ignoreAttributes: false, interactive: false, interactiveBorder: 2, interactiveDebounce: 0, moveTransition: "", offset: [0, 10], onAfterUpdate: function() {
}, onBeforeUpdate: function() {
}, onCreate: function() {
}, onDestroy: function() {
}, onHidden: function() {
}, onHide: function() {
}, onMount: function() {
}, onShow: function() {
}, onShown: function() {
}, onTrigger: function() {
}, onUntrigger: function() {
}, onClickOutside: function() {
}, placement: "top", plugins: [], popperOptions: {}, render: null, showOnCreate: false, touch: true, trigger: "mouseenter focus", triggerTarget: null }, Ss, Cs), _s = Object.keys(ae), xs = function(e) {
  var t = Object.keys(e);
  t.forEach(function(r) {
    ae[r] = e[r];
  });
};
function ci(n) {
  var e = n.plugins || [], t = e.reduce(function(r, i) {
    var o = i.name, s = i.defaultValue;
    if (o) {
      var l;
      r[o] = n[o] !== void 0 ? n[o] : (l = ae[o]) != null ? l : s;
    }
    return r;
  }, {});
  return Object.assign({}, n, t);
}
function Ts(n, e) {
  var t = e ? Object.keys(ci(Object.assign({}, ae, { plugins: e }))) : _s, r = t.reduce(function(i, o) {
    var s = (n.getAttribute("data-tippy-" + o) || "").trim();
    if (!s) return i;
    if (o === "content") i[o] = s;
    else try {
      i[o] = JSON.parse(s);
    } catch {
      i[o] = s;
    }
    return i;
  }, {});
  return r;
}
function Sr(n, e) {
  var t = Object.assign({}, e, { content: oi(e.content, [n]) }, e.ignoreAttributes ? {} : Ts(n, e.plugins));
  return t.aria = Object.assign({}, ae.aria, t.aria), t.aria = { expanded: t.aria.expanded === "auto" ? e.interactive : t.aria.expanded, content: t.aria.content === "auto" ? e.interactive ? null : "describedby" : t.aria.content }, t;
}
var Es = function() {
  return "innerHTML";
};
function An(n, e) {
  n[Es()] = e;
}
function Cr(n) {
  var e = ut();
  return n === true ? e.className = ni : (e.className = ri, sn(n) ? e.appendChild(n) : An(e, n)), e;
}
function _r(n, e) {
  sn(e.content) ? (An(n, ""), n.appendChild(e.content)) : typeof e.content != "function" && (e.allowHTML ? An(n, e.content) : n.textContent = e.content);
}
function Rn(n) {
  var e = n.firstElementChild, t = qt(e.children);
  return { box: e, content: t.find(function(r) {
    return r.classList.contains(ti);
  }), arrow: t.find(function(r) {
    return r.classList.contains(ni) || r.classList.contains(ri);
  }), backdrop: t.find(function(r) {
    return r.classList.contains(ls);
  }) };
}
function ui(n) {
  var e = ut(), t = ut();
  t.className = as, t.setAttribute("data-state", "hidden"), t.setAttribute("tabindex", "-1");
  var r = ut();
  r.className = ti, r.setAttribute("data-state", "hidden"), _r(r, n.props), e.appendChild(t), t.appendChild(r), i(n.props, n.props);
  function i(o, s) {
    var l = Rn(e), a = l.box, c = l.content, u = l.arrow;
    s.theme ? a.setAttribute("data-theme", s.theme) : a.removeAttribute("data-theme"), typeof s.animation == "string" ? a.setAttribute("data-animation", s.animation) : a.removeAttribute("data-animation"), s.inertia ? a.setAttribute("data-inertia", "") : a.removeAttribute("data-inertia"), a.style.maxWidth = typeof s.maxWidth == "number" ? s.maxWidth + "px" : s.maxWidth, s.role ? a.setAttribute("role", s.role) : a.removeAttribute("role"), (o.content !== s.content || o.allowHTML !== s.allowHTML) && _r(c, n.props), s.arrow ? u ? o.arrow !== s.arrow && (a.removeChild(u), a.appendChild(Cr(s.arrow))) : a.appendChild(Cr(s.arrow)) : u && a.removeChild(u);
  }
  return { popper: e, onUpdate: i };
}
ui.$$tippy = true;
var As = 1, Dt = [], mn = [];
function Rs(n, e) {
  var t = Sr(n, Object.assign({}, ae, ci(vr(e)))), r, i, o, s = false, l = false, a = false, c = false, u, f, g, d = [], p = gr(Tt, t.interactiveDebounce), w, m = As++, y = null, b = us(t.plugins), C = { isEnabled: true, isVisible: false, isDestroyed: false, isMounted: false, isShown: false }, h = { id: m, reference: n, popper: ut(), popperInstance: y, props: t, state: C, plugins: b, clearDelayTimeouts: Lt, setProps: Ot, setContent: Pt, show: Ki, hide: Xi, hideWithInteractivity: Ji, enable: rt, disable: kt, unmount: Qi, destroy: Zi };
  if (!t.render) return h;
  var x = t.render(h), _ = x.popper, k = x.onUpdate;
  _.setAttribute("data-tippy-root", ""), _.id = "tippy-" + h.id, h.popper = _, n._tippy = h, _._tippy = h;
  var L = b.map(function(v) {
    return v.fn(h);
  }), E = n.hasAttribute("aria-expanded");
  return je(), ce(), q(), z("onCreate", [h]), t.showOnCreate && nt(), _.addEventListener("mouseenter", function() {
    h.props.interactive && h.state.isVisible && h.clearDelayTimeouts();
  }), _.addEventListener("mouseleave", function() {
    h.props.interactive && h.props.trigger.indexOf("mouseenter") >= 0 && B().addEventListener("mousemove", p);
  }), h;
  function O() {
    var v = h.props.touch;
    return Array.isArray(v) ? v : [v, 0];
  }
  function D() {
    return O()[0] === "hold";
  }
  function M() {
    var v;
    return !!((v = h.props.render) != null && v.$$tippy);
  }
  function N() {
    return w || n;
  }
  function B() {
    var v = N().parentNode;
    return v ? ai(v) : document;
  }
  function $() {
    return Rn(_);
  }
  function U(v) {
    return h.state.isMounted && !h.state.isVisible || de.isTouch || u && u.type === "focus" ? 0 : dn(h.props.delay, v ? 0 : 1, ae.delay);
  }
  function q(v) {
    v === void 0 && (v = false), _.style.pointerEvents = h.props.interactive && !v ? "" : "none", _.style.zIndex = "" + h.props.zIndex;
  }
  function z(v, T, A) {
    if (A === void 0 && (A = true), L.forEach(function(P) {
      P[v] && P[v].apply(P, T);
    }), A) {
      var I;
      (I = h.props)[v].apply(I, T);
    }
  }
  function le() {
    var v = h.props.aria;
    if (v.content) {
      var T = "aria-" + v.content, A = _.id, I = We(h.props.triggerTarget || n);
      I.forEach(function(P) {
        var K = P.getAttribute(T);
        if (h.state.isVisible) P.setAttribute(T, K ? K + " " + A : A);
        else {
          var te = K && K.replace(A, "").trim();
          te ? P.setAttribute(T, te) : P.removeAttribute(T);
        }
      });
    }
  }
  function ce() {
    if (!(E || !h.props.aria.expanded)) {
      var v = We(h.props.triggerTarget || n);
      v.forEach(function(T) {
        h.props.interactive ? T.setAttribute("aria-expanded", h.state.isVisible && T === N() ? "true" : "false") : T.removeAttribute("aria-expanded");
      });
    }
  }
  function Te() {
    B().removeEventListener("mousemove", p), Dt = Dt.filter(function(v) {
      return v !== p;
    });
  }
  function ue(v) {
    if (!(de.isTouch && (a || v.type === "mousedown"))) {
      var T = v.composedPath && v.composedPath()[0] || v.target;
      if (!(h.props.interactive && br(_, T))) {
        if (We(h.props.triggerTarget || n).some(function(A) {
          return br(A, T);
        })) {
          if (de.isTouch || h.state.isVisible && h.props.trigger.indexOf("click") >= 0) return;
        } else z("onClickOutside", [h, v]);
        h.props.hideOnClick === true && (h.clearDelayTimeouts(), h.hide(), l = true, setTimeout(function() {
          l = false;
        }), h.state.isMounted || ve());
      }
    }
  }
  function Ee() {
    a = true;
  }
  function me() {
    a = false;
  }
  function se() {
    var v = B();
    v.addEventListener("mousedown", ue, true), v.addEventListener("touchend", ue, ke), v.addEventListener("touchstart", me, ke), v.addEventListener("touchmove", Ee, ke);
  }
  function ve() {
    var v = B();
    v.removeEventListener("mousedown", ue, true), v.removeEventListener("touchend", ue, ke), v.removeEventListener("touchstart", me, ke), v.removeEventListener("touchmove", Ee, ke);
  }
  function De(v, T) {
    Be(v, function() {
      !h.state.isVisible && _.parentNode && _.parentNode.contains(_) && T();
    });
  }
  function ye(v, T) {
    Be(v, T);
  }
  function Be(v, T) {
    var A = $().box;
    function I(P) {
      P.target === A && (gn(A, "remove", I), T());
    }
    if (v === 0) return T();
    gn(A, "remove", f), gn(A, "add", I), f = I;
  }
  function Ce(v, T, A) {
    A === void 0 && (A = false);
    var I = We(h.props.triggerTarget || n);
    I.forEach(function(P) {
      P.addEventListener(v, T, A), d.push({ node: P, eventType: v, handler: T, options: A });
    });
  }
  function je() {
    D() && (Ce("touchstart", Ze, { passive: true }), Ce("touchend", Et, { passive: true })), cs(h.props.trigger).forEach(function(v) {
      if (v !== "manual") switch (Ce(v, Ze), v) {
        case "mouseenter":
          Ce("mouseleave", Et);
          break;
        case "focus":
          Ce(ws ? "focusout" : "blur", et);
          break;
        case "focusin":
          Ce("focusout", et);
          break;
      }
    });
  }
  function xt() {
    d.forEach(function(v) {
      var T = v.node, A = v.eventType, I = v.handler, P = v.options;
      T.removeEventListener(A, I, P);
    }), d = [];
  }
  function Ze(v) {
    var T, A = false;
    if (!(!h.state.isEnabled || tt(v) || l)) {
      var I = ((T = u) == null ? void 0 : T.type) === "focus";
      u = v, w = v.currentTarget, ce(), !h.state.isVisible && si(v) && Dt.forEach(function(P) {
        return P(v);
      }), v.type === "click" && (h.props.trigger.indexOf("mouseenter") < 0 || s) && h.props.hideOnClick !== false && h.state.isVisible ? A = true : nt(v), v.type === "click" && (s = !A), A && !I && Ae(v);
    }
  }
  function Tt(v) {
    var T = v.target, A = N().contains(T) || _.contains(T);
    if (!(v.type === "mousemove" && A)) {
      var I = _e().concat(_).map(function(P) {
        var K, te = P._tippy, $e = (K = te.popperInstance) == null ? void 0 : K.state;
        return $e ? { popperRect: P.getBoundingClientRect(), popperState: $e, props: t } : null;
      }).filter(Boolean);
      gs(I, v) && (Te(), Ae(v));
    }
  }
  function Et(v) {
    var T = tt(v) || h.props.trigger.indexOf("click") >= 0 && s;
    if (!T) {
      if (h.props.interactive) {
        h.hideWithInteractivity(v);
        return;
      }
      Ae(v);
    }
  }
  function et(v) {
    h.props.trigger.indexOf("focusin") < 0 && v.target !== N() || h.props.interactive && v.relatedTarget && _.contains(v.relatedTarget) || Ae(v);
  }
  function tt(v) {
    return de.isTouch ? D() !== v.type.indexOf("touch") >= 0 : false;
  }
  function At() {
    Rt();
    var v = h.props, T = v.popperOptions, A = v.placement, I = v.offset, P = v.getReferenceClientRect, K = v.moveTransition, te = M() ? Rn(_).arrow : null, $e = P ? { getBoundingClientRect: P, contextElement: P.contextElement || N() } : n, ir = { name: "$$tippy", enabled: true, phase: "beforeWrite", requires: ["computeStyles"], fn: function(Nt) {
      var Ue = Nt.state;
      if (M()) {
        var eo = $(), hn = eo.box;
        ["placement", "reference-hidden", "escaped"].forEach(function(It) {
          It === "placement" ? hn.setAttribute("data-placement", Ue.placement) : Ue.attributes.popper["data-popper-" + It] ? hn.setAttribute("data-" + It, "") : hn.removeAttribute("data-" + It);
        }), Ue.attributes.popper = {};
      }
    } }, Re = [{ name: "offset", options: { offset: I } }, { name: "preventOverflow", options: { padding: { top: 2, bottom: 2, left: 5, right: 5 } } }, { name: "flip", options: { padding: 5 } }, { name: "computeStyles", options: { adaptive: !K } }, ir];
    M() && te && Re.push({ name: "arrow", options: { element: te, padding: 3 } }), Re.push.apply(Re, (T == null ? void 0 : T.modifiers) || []), h.popperInstance = ss($e, _, Object.assign({}, T, { placement: A, onFirstUpdate: g, modifiers: Re }));
  }
  function Rt() {
    h.popperInstance && (h.popperInstance.destroy(), h.popperInstance = null);
  }
  function be() {
    var v = h.props.appendTo, T, A = N();
    h.props.interactive && v === ii || v === "parent" ? T = A.parentNode : T = oi(v, [A]), T.contains(_) || T.appendChild(_), h.state.isMounted = true, At();
  }
  function _e() {
    return qt(_.querySelectorAll("[data-tippy-root]"));
  }
  function nt(v) {
    h.clearDelayTimeouts(), v && z("onTrigger", [h, v]), se();
    var T = U(true), A = O(), I = A[0], P = A[1];
    de.isTouch && I === "hold" && P && (T = P), T ? r = setTimeout(function() {
      h.show();
    }, T) : h.show();
  }
  function Ae(v) {
    if (h.clearDelayTimeouts(), z("onUntrigger", [h, v]), !h.state.isVisible) {
      ve();
      return;
    }
    if (!(h.props.trigger.indexOf("mouseenter") >= 0 && h.props.trigger.indexOf("click") >= 0 && ["mouseleave", "mousemove"].indexOf(v.type) >= 0 && s)) {
      var T = U(false);
      T ? i = setTimeout(function() {
        h.state.isVisible && h.hide();
      }, T) : o = requestAnimationFrame(function() {
        h.hide();
      });
    }
  }
  function rt() {
    h.state.isEnabled = true;
  }
  function kt() {
    h.hide(), h.state.isEnabled = false;
  }
  function Lt() {
    clearTimeout(r), clearTimeout(i), cancelAnimationFrame(o);
  }
  function Ot(v) {
    if (!h.state.isDestroyed) {
      z("onBeforeUpdate", [h, v]), xt();
      var T = h.props, A = Sr(n, Object.assign({}, T, vr(v), { ignoreAttributes: true }));
      h.props = A, je(), T.interactiveDebounce !== A.interactiveDebounce && (Te(), p = gr(Tt, A.interactiveDebounce)), T.triggerTarget && !A.triggerTarget ? We(T.triggerTarget).forEach(function(I) {
        I.removeAttribute("aria-expanded");
      }) : A.triggerTarget && n.removeAttribute("aria-expanded"), ce(), q(), k && k(T, A), h.popperInstance && (At(), _e().forEach(function(I) {
        requestAnimationFrame(I._tippy.popperInstance.forceUpdate);
      })), z("onAfterUpdate", [h, v]);
    }
  }
  function Pt(v) {
    h.setProps({ content: v });
  }
  function Ki() {
    var v = h.state.isVisible, T = h.state.isDestroyed, A = !h.state.isEnabled, I = de.isTouch && !h.props.touch, P = dn(h.props.duration, 0, ae.duration);
    if (!(v || T || A || I) && !N().hasAttribute("disabled") && (z("onShow", [h], false), h.props.onShow(h) !== false)) {
      if (h.state.isVisible = true, M() && (_.style.visibility = "visible"), q(), se(), h.state.isMounted || (_.style.transition = "none"), M()) {
        var K = $(), te = K.box, $e = K.content;
        pn([te, $e], 0);
      }
      g = function() {
        var Re;
        if (!(!h.state.isVisible || c)) {
          if (c = true, _.offsetHeight, _.style.transition = h.props.moveTransition, M() && h.props.animation) {
            var fn = $(), Nt = fn.box, Ue = fn.content;
            pn([Nt, Ue], P), yr([Nt, Ue], "visible");
          }
          le(), ce(), mr(mn, h), (Re = h.popperInstance) == null || Re.forceUpdate(), z("onMount", [h]), h.props.animation && M() && ye(P, function() {
            h.state.isShown = true, z("onShown", [h]);
          });
        }
      }, be();
    }
  }
  function Xi() {
    var v = !h.state.isVisible, T = h.state.isDestroyed, A = !h.state.isEnabled, I = dn(h.props.duration, 1, ae.duration);
    if (!(v || T || A) && (z("onHide", [h], false), h.props.onHide(h) !== false)) {
      if (h.state.isVisible = false, h.state.isShown = false, c = false, s = false, M() && (_.style.visibility = "hidden"), Te(), ve(), q(true), M()) {
        var P = $(), K = P.box, te = P.content;
        h.props.animation && (pn([K, te], I), yr([K, te], "hidden"));
      }
      le(), ce(), h.props.animation ? M() && De(I, h.unmount) : h.unmount();
    }
  }
  function Ji(v) {
    B().addEventListener("mousemove", p), mr(Dt, p), p(v);
  }
  function Qi() {
    h.state.isVisible && h.hide(), h.state.isMounted && (Rt(), _e().forEach(function(v) {
      v._tippy.unmount();
    }), _.parentNode && _.parentNode.removeChild(_), mn = mn.filter(function(v) {
      return v !== h;
    }), h.state.isMounted = false, z("onHidden", [h]));
  }
  function Zi() {
    h.state.isDestroyed || (h.clearDelayTimeouts(), h.unmount(), xt(), delete n._tippy, h.state.isDestroyed = true, z("onDestroy", [h]));
  }
}
function an(n, e) {
  e === void 0 && (e = {});
  var t = ae.plugins.concat(e.plugins || []);
  ys();
  var r = Object.assign({}, e, { plugins: t }), i = ps(n), o = i.reduce(function(s, l) {
    var a = l && Rs(l, r);
    return a && s.push(a), s;
  }, []);
  return sn(n) ? o[0] : o;
}
an.defaultProps = ae;
an.setDefaultProps = xs;
an.currentInput = de;
Object.assign({}, Vr, { effect: function(e) {
  var t = e.state, r = { popper: { position: t.options.strategy, left: "0", top: "0", margin: "0" }, arrow: { position: "absolute" }, reference: {} };
  Object.assign(t.elements.popper.style, r.popper), t.styles = r, t.elements.arrow && Object.assign(t.elements.arrow.style, r.arrow);
} });
var kn = { clientX: 0, clientY: 0 }, Bt = [];
function fi(n) {
  var e = n.clientX, t = n.clientY;
  kn = { clientX: e, clientY: t };
}
function ks(n) {
  n.addEventListener("mousemove", fi);
}
function Ls(n) {
  n.removeEventListener("mousemove", fi);
}
var Uc = { name: "followCursor", defaultValue: false, fn: function(e) {
  var t = e.reference, r = ai(e.props.triggerTarget || t), i = false, o = false, s = true, l = e.props;
  function a() {
    return e.props.followCursor === "initial" && e.state.isVisible;
  }
  function c() {
    r.addEventListener("mousemove", g);
  }
  function u() {
    r.removeEventListener("mousemove", g);
  }
  function f() {
    i = true, e.setProps({ getReferenceClientRect: null }), i = false;
  }
  function g(w) {
    var m = w.target ? t.contains(w.target) : true, y = e.props.followCursor, b = w.clientX, C = w.clientY, h = t.getBoundingClientRect(), x = b - h.left, _ = C - h.top;
    (m || !e.props.interactive) && e.setProps({ getReferenceClientRect: function() {
      var L = t.getBoundingClientRect(), E = b, O = C;
      y === "initial" && (E = L.left + x, O = L.top + _);
      var D = y === "horizontal" ? L.top : O, M = y === "vertical" ? L.right : E, N = y === "horizontal" ? L.bottom : O, B = y === "vertical" ? L.left : E;
      return { width: M - B, height: N - D, top: D, right: M, bottom: N, left: B };
    } });
  }
  function d() {
    e.props.followCursor && (Bt.push({ instance: e, doc: r }), ks(r));
  }
  function p() {
    Bt = Bt.filter(function(w) {
      return w.instance !== e;
    }), Bt.filter(function(w) {
      return w.doc === r;
    }).length === 0 && Ls(r);
  }
  return { onCreate: d, onDestroy: p, onBeforeUpdate: function() {
    l = e.props;
  }, onAfterUpdate: function(m, y) {
    var b = y.followCursor;
    i || b !== void 0 && l.followCursor !== b && (p(), b ? (d(), e.state.isMounted && !o && !a() && c()) : (u(), f()));
  }, onMount: function() {
    e.props.followCursor && !o && (s && (g(kn), s = false), a() || c());
  }, onTrigger: function(m, y) {
    si(y) && (kn = { clientX: y.clientX, clientY: y.clientY }), o = y.type === "focus";
  }, onHidden: function() {
    e.props.followCursor && (f(), u(), s = true);
  } };
} };
an.setDefaultProps({ render: ui });
let Y = class extends Error {
  constructor(e) {
    super(e), this.name = "ShikiError";
  }
};
function Os(n) {
  return Kn(n);
}
function Kn(n) {
  return Array.isArray(n) ? Ps(n) : n instanceof RegExp ? n : typeof n == "object" ? Ns(n) : n;
}
function Ps(n) {
  let e = [];
  for (let t = 0, r = n.length; t < r; t++) e[t] = Kn(n[t]);
  return e;
}
function Ns(n) {
  let e = {};
  for (let t in n) e[t] = Kn(n[t]);
  return e;
}
function hi(n, ...e) {
  return e.forEach((t) => {
    for (let r in t) n[r] = t[r];
  }), n;
}
function di(n) {
  const e = ~n.lastIndexOf("/") || ~n.lastIndexOf("\\");
  return e === 0 ? n : ~e === n.length - 1 ? di(n.substring(0, n.length - 1)) : n.substr(~e + 1);
}
var vn = /\$(\d+)|\${(\d+):\/(downcase|upcase)}/g, jt = class {
  static hasCaptures(n) {
    return n === null ? false : (vn.lastIndex = 0, vn.test(n));
  }
  static replaceCaptures(n, e, t) {
    return n.replace(vn, (r, i, o, s) => {
      let l = t[parseInt(i || o, 10)];
      if (l) {
        let a = e.substring(l.start, l.end);
        for (; a[0] === "."; ) a = a.substring(1);
        switch (s) {
          case "downcase":
            return a.toLowerCase();
          case "upcase":
            return a.toUpperCase();
          default:
            return a;
        }
      } else return r;
    });
  }
};
function pi(n, e) {
  return n < e ? -1 : n > e ? 1 : 0;
}
function gi(n, e) {
  if (n === null && e === null) return 0;
  if (!n) return -1;
  if (!e) return 1;
  let t = n.length, r = e.length;
  if (t === r) {
    for (let i = 0; i < t; i++) {
      let o = pi(n[i], e[i]);
      if (o !== 0) return o;
    }
    return 0;
  }
  return t - r;
}
function xr(n) {
  return !!(/^#[0-9a-f]{6}$/i.test(n) || /^#[0-9a-f]{8}$/i.test(n) || /^#[0-9a-f]{3}$/i.test(n) || /^#[0-9a-f]{4}$/i.test(n));
}
function mi(n) {
  return n.replace(/[\-\\\{\}\*\+\?\|\^\$\.\,\[\]\(\)\#\s]/g, "\\$&");
}
var vi = class {
  constructor(n) {
    __publicField(this, "cache", /* @__PURE__ */ new Map());
    this.fn = n;
  }
  get(n) {
    if (this.cache.has(n)) return this.cache.get(n);
    const e = this.fn(n);
    return this.cache.set(n, e), e;
  }
}, Vt = class {
  constructor(n, e, t) {
    __publicField(this, "_cachedMatchRoot", new vi((n) => this._root.match(n)));
    this._colorMap = n, this._defaults = e, this._root = t;
  }
  static createFromRawTheme(n, e) {
    return this.createFromParsedTheme(Ds(n), e);
  }
  static createFromParsedTheme(n, e) {
    return js(n, e);
  }
  getColorMap() {
    return this._colorMap.getColorMap();
  }
  getDefaults() {
    return this._defaults;
  }
  match(n) {
    if (n === null) return this._defaults;
    const e = n.scopeName, r = this._cachedMatchRoot.get(e).find((i) => Is(n.parent, i.parentScopes));
    return r ? new yi(r.fontStyle, r.foreground, r.background) : null;
  }
}, yn = class Ht {
  constructor(e, t) {
    this.parent = e, this.scopeName = t;
  }
  static push(e, t) {
    for (const r of t) e = new Ht(e, r);
    return e;
  }
  static from(...e) {
    let t = null;
    for (let r = 0; r < e.length; r++) t = new Ht(t, e[r]);
    return t;
  }
  push(e) {
    return new Ht(this, e);
  }
  getSegments() {
    let e = this;
    const t = [];
    for (; e; ) t.push(e.scopeName), e = e.parent;
    return t.reverse(), t;
  }
  toString() {
    return this.getSegments().join(" ");
  }
  extends(e) {
    return this === e ? true : this.parent === null ? false : this.parent.extends(e);
  }
  getExtensionIfDefined(e) {
    const t = [];
    let r = this;
    for (; r && r !== e; ) t.push(r.scopeName), r = r.parent;
    return r === e ? t.reverse() : void 0;
  }
};
function Is(n, e) {
  if (e.length === 0) return true;
  for (let t = 0; t < e.length; t++) {
    let r = e[t], i = false;
    if (r === ">") {
      if (t === e.length - 1) return false;
      r = e[++t], i = true;
    }
    for (; n && !Ms(n.scopeName, r); ) {
      if (i) return false;
      n = n.parent;
    }
    if (!n) return false;
    n = n.parent;
  }
  return true;
}
function Ms(n, e) {
  return e === n || n.startsWith(e) && n[e.length] === ".";
}
var yi = class {
  constructor(n, e, t) {
    this.fontStyle = n, this.foregroundId = e, this.backgroundId = t;
  }
};
function Ds(n) {
  if (!n) return [];
  if (!n.settings || !Array.isArray(n.settings)) return [];
  let e = n.settings, t = [], r = 0;
  for (let i = 0, o = e.length; i < o; i++) {
    let s = e[i];
    if (!s.settings) continue;
    let l;
    if (typeof s.scope == "string") {
      let f = s.scope;
      f = f.replace(/^[,]+/, ""), f = f.replace(/[,]+$/, ""), l = f.split(",");
    } else Array.isArray(s.scope) ? l = s.scope : l = [""];
    let a = -1;
    if (typeof s.settings.fontStyle == "string") {
      a = 0;
      let f = s.settings.fontStyle.split(" ");
      for (let g = 0, d = f.length; g < d; g++) switch (f[g]) {
        case "italic":
          a = a | 1;
          break;
        case "bold":
          a = a | 2;
          break;
        case "underline":
          a = a | 4;
          break;
        case "strikethrough":
          a = a | 8;
          break;
      }
    }
    let c = null;
    typeof s.settings.foreground == "string" && xr(s.settings.foreground) && (c = s.settings.foreground);
    let u = null;
    typeof s.settings.background == "string" && xr(s.settings.background) && (u = s.settings.background);
    for (let f = 0, g = l.length; f < g; f++) {
      let p = l[f].trim().split(" "), w = p[p.length - 1], m = null;
      p.length > 1 && (m = p.slice(0, p.length - 1), m.reverse()), t[r++] = new Bs(w, m, i, a, c, u);
    }
  }
  return t;
}
var Bs = class {
  constructor(n, e, t, r, i, o) {
    this.scope = n, this.parentScopes = e, this.index = t, this.fontStyle = r, this.foreground = i, this.background = o;
  }
}, we = ((n) => (n[n.NotSet = -1] = "NotSet", n[n.None = 0] = "None", n[n.Italic = 1] = "Italic", n[n.Bold = 2] = "Bold", n[n.Underline = 4] = "Underline", n[n.Strikethrough = 8] = "Strikethrough", n))(we || {});
function js(n, e) {
  n.sort((a, c) => {
    let u = pi(a.scope, c.scope);
    return u !== 0 || (u = gi(a.parentScopes, c.parentScopes), u !== 0) ? u : a.index - c.index;
  });
  let t = 0, r = "#000000", i = "#ffffff";
  for (; n.length >= 1 && n[0].scope === ""; ) {
    let a = n.shift();
    a.fontStyle !== -1 && (t = a.fontStyle), a.foreground !== null && (r = a.foreground), a.background !== null && (i = a.background);
  }
  let o = new $s(e), s = new yi(t, o.getId(r), o.getId(i)), l = new Ws(new Ln(0, null, -1, 0, 0), []);
  for (let a = 0, c = n.length; a < c; a++) {
    let u = n[a];
    l.insert(0, u.scope, u.parentScopes, u.fontStyle, o.getId(u.foreground), o.getId(u.background));
  }
  return new Vt(o, s, l);
}
var $s = class {
  constructor(n) {
    __publicField(this, "_isFrozen");
    __publicField(this, "_lastColorId");
    __publicField(this, "_id2color");
    __publicField(this, "_color2id");
    if (this._lastColorId = 0, this._id2color = [], this._color2id = /* @__PURE__ */ Object.create(null), Array.isArray(n)) {
      this._isFrozen = true;
      for (let e = 0, t = n.length; e < t; e++) this._color2id[n[e]] = e, this._id2color[e] = n[e];
    } else this._isFrozen = false;
  }
  getId(n) {
    if (n === null) return 0;
    n = n.toUpperCase();
    let e = this._color2id[n];
    if (e) return e;
    if (this._isFrozen) throw new Error(`Missing color in color map - ${n}`);
    return e = ++this._lastColorId, this._color2id[n] = e, this._id2color[e] = n, e;
  }
  getColorMap() {
    return this._id2color.slice(0);
  }
}, Us = Object.freeze([]), Ln = class bi {
  constructor(e, t, r, i, o) {
    __publicField(this, "scopeDepth");
    __publicField(this, "parentScopes");
    __publicField(this, "fontStyle");
    __publicField(this, "foreground");
    __publicField(this, "background");
    this.scopeDepth = e, this.parentScopes = t || Us, this.fontStyle = r, this.foreground = i, this.background = o;
  }
  clone() {
    return new bi(this.scopeDepth, this.parentScopes, this.fontStyle, this.foreground, this.background);
  }
  static cloneArr(e) {
    let t = [];
    for (let r = 0, i = e.length; r < i; r++) t[r] = e[r].clone();
    return t;
  }
  acceptOverwrite(e, t, r, i) {
    this.scopeDepth > e ? console.log("how did this happen?") : this.scopeDepth = e, t !== -1 && (this.fontStyle = t), r !== 0 && (this.foreground = r), i !== 0 && (this.background = i);
  }
}, Ws = class On {
  constructor(e, t = [], r = {}) {
    __publicField(this, "_rulesWithParentScopes");
    this._mainRule = e, this._children = r, this._rulesWithParentScopes = t;
  }
  static _cmpBySpecificity(e, t) {
    if (e.scopeDepth !== t.scopeDepth) return t.scopeDepth - e.scopeDepth;
    let r = 0, i = 0;
    for (; e.parentScopes[r] === ">" && r++, t.parentScopes[i] === ">" && i++, !(r >= e.parentScopes.length || i >= t.parentScopes.length); ) {
      const o = t.parentScopes[i].length - e.parentScopes[r].length;
      if (o !== 0) return o;
      r++, i++;
    }
    return t.parentScopes.length - e.parentScopes.length;
  }
  match(e) {
    if (e !== "") {
      let r = e.indexOf("."), i, o;
      if (r === -1 ? (i = e, o = "") : (i = e.substring(0, r), o = e.substring(r + 1)), this._children.hasOwnProperty(i)) return this._children[i].match(o);
    }
    const t = this._rulesWithParentScopes.concat(this._mainRule);
    return t.sort(On._cmpBySpecificity), t;
  }
  insert(e, t, r, i, o, s) {
    if (t === "") {
      this._doInsertHere(e, r, i, o, s);
      return;
    }
    let l = t.indexOf("."), a, c;
    l === -1 ? (a = t, c = "") : (a = t.substring(0, l), c = t.substring(l + 1));
    let u;
    this._children.hasOwnProperty(a) ? u = this._children[a] : (u = new On(this._mainRule.clone(), Ln.cloneArr(this._rulesWithParentScopes)), this._children[a] = u), u.insert(e + 1, c, r, i, o, s);
  }
  _doInsertHere(e, t, r, i, o) {
    if (t === null) {
      this._mainRule.acceptOverwrite(e, r, i, o);
      return;
    }
    for (let s = 0, l = this._rulesWithParentScopes.length; s < l; s++) {
      let a = this._rulesWithParentScopes[s];
      if (gi(a.parentScopes, t) === 0) {
        a.acceptOverwrite(e, r, i, o);
        return;
      }
    }
    r === -1 && (r = this._mainRule.fontStyle), i === 0 && (i = this._mainRule.foreground), o === 0 && (o = this._mainRule.background), this._rulesWithParentScopes.push(new Ln(e, t, r, i, o));
  }
}, Xe = class ne {
  static toBinaryStr(e) {
    return e.toString(2).padStart(32, "0");
  }
  static print(e) {
    const t = ne.getLanguageId(e), r = ne.getTokenType(e), i = ne.getFontStyle(e), o = ne.getForeground(e), s = ne.getBackground(e);
    console.log({ languageId: t, tokenType: r, fontStyle: i, foreground: o, background: s });
  }
  static getLanguageId(e) {
    return (e & 255) >>> 0;
  }
  static getTokenType(e) {
    return (e & 768) >>> 8;
  }
  static containsBalancedBrackets(e) {
    return (e & 1024) !== 0;
  }
  static getFontStyle(e) {
    return (e & 30720) >>> 11;
  }
  static getForeground(e) {
    return (e & 16744448) >>> 15;
  }
  static getBackground(e) {
    return (e & 4278190080) >>> 24;
  }
  static set(e, t, r, i, o, s, l) {
    let a = ne.getLanguageId(e), c = ne.getTokenType(e), u = ne.containsBalancedBrackets(e) ? 1 : 0, f = ne.getFontStyle(e), g = ne.getForeground(e), d = ne.getBackground(e);
    return t !== 0 && (a = t), r !== 8 && (c = r), i !== null && (u = i ? 1 : 0), o !== -1 && (f = o), s !== 0 && (g = s), l !== 0 && (d = l), (a << 0 | c << 8 | u << 10 | f << 11 | g << 15 | d << 24) >>> 0;
  }
};
function Yt(n, e) {
  const t = [], r = Gs(n);
  let i = r.next();
  for (; i !== null; ) {
    let a = 0;
    if (i.length === 2 && i.charAt(1) === ":") {
      switch (i.charAt(0)) {
        case "R":
          a = 1;
          break;
        case "L":
          a = -1;
          break;
        default:
          console.log(`Unknown priority ${i} in scope selector`);
      }
      i = r.next();
    }
    let c = s();
    if (t.push({ matcher: c, priority: a }), i !== ",") break;
    i = r.next();
  }
  return t;
  function o() {
    if (i === "-") {
      i = r.next();
      const a = o();
      return (c) => !!a && !a(c);
    }
    if (i === "(") {
      i = r.next();
      const a = l();
      return i === ")" && (i = r.next()), a;
    }
    if (Tr(i)) {
      const a = [];
      do
        a.push(i), i = r.next();
      while (Tr(i));
      return (c) => e(a, c);
    }
    return null;
  }
  function s() {
    const a = [];
    let c = o();
    for (; c; ) a.push(c), c = o();
    return (u) => a.every((f) => f(u));
  }
  function l() {
    const a = [];
    let c = s();
    for (; c && (a.push(c), i === "|" || i === ","); ) {
      do
        i = r.next();
      while (i === "|" || i === ",");
      c = s();
    }
    return (u) => a.some((f) => f(u));
  }
}
function Tr(n) {
  return !!n && !!n.match(/[\w\.:]+/);
}
function Gs(n) {
  let e = /([LR]:|[\w\.:][\w\.:\-]*|[\,\|\-\(\)])/g, t = e.exec(n);
  return { next: () => {
    if (!t) return null;
    const r = t[0];
    return t = e.exec(n), r;
  } };
}
function wi(n) {
  typeof n.dispose == "function" && n.dispose();
}
var gt = class {
  constructor(n) {
    this.scopeName = n;
  }
  toKey() {
    return this.scopeName;
  }
}, Hs = class {
  constructor(n, e) {
    this.scopeName = n, this.ruleName = e;
  }
  toKey() {
    return `${this.scopeName}#${this.ruleName}`;
  }
}, Fs = class {
  constructor() {
    __publicField(this, "_references", []);
    __publicField(this, "_seenReferenceKeys", /* @__PURE__ */ new Set());
    __publicField(this, "visitedRule", /* @__PURE__ */ new Set());
  }
  get references() {
    return this._references;
  }
  add(n) {
    const e = n.toKey();
    this._seenReferenceKeys.has(e) || (this._seenReferenceKeys.add(e), this._references.push(n));
  }
}, zs = class {
  constructor(n, e) {
    __publicField(this, "seenFullScopeRequests", /* @__PURE__ */ new Set());
    __publicField(this, "seenPartialScopeRequests", /* @__PURE__ */ new Set());
    __publicField(this, "Q");
    this.repo = n, this.initialScopeName = e, this.seenFullScopeRequests.add(this.initialScopeName), this.Q = [new gt(this.initialScopeName)];
  }
  processQueue() {
    const n = this.Q;
    this.Q = [];
    const e = new Fs();
    for (const t of n) qs(t, this.initialScopeName, this.repo, e);
    for (const t of e.references) if (t instanceof gt) {
      if (this.seenFullScopeRequests.has(t.scopeName)) continue;
      this.seenFullScopeRequests.add(t.scopeName), this.Q.push(t);
    } else {
      if (this.seenFullScopeRequests.has(t.scopeName) || this.seenPartialScopeRequests.has(t.toKey())) continue;
      this.seenPartialScopeRequests.add(t.toKey()), this.Q.push(t);
    }
  }
};
function qs(n, e, t, r) {
  const i = t.lookup(n.scopeName);
  if (!i) {
    if (n.scopeName === e) throw new Error(`No grammar provided for <${e}>`);
    return;
  }
  const o = t.lookup(e);
  n instanceof gt ? Ft({ baseGrammar: o, selfGrammar: i }, r) : Pn(n.ruleName, { baseGrammar: o, selfGrammar: i, repository: i.repository }, r);
  const s = t.injections(n.scopeName);
  if (s) for (const l of s) r.add(new gt(l));
}
function Pn(n, e, t) {
  if (e.repository && e.repository[n]) {
    const r = e.repository[n];
    Kt([r], e, t);
  }
}
function Ft(n, e) {
  n.selfGrammar.patterns && Array.isArray(n.selfGrammar.patterns) && Kt(n.selfGrammar.patterns, { ...n, repository: n.selfGrammar.repository }, e), n.selfGrammar.injections && Kt(Object.values(n.selfGrammar.injections), { ...n, repository: n.selfGrammar.repository }, e);
}
function Kt(n, e, t) {
  for (const r of n) {
    if (t.visitedRule.has(r)) continue;
    t.visitedRule.add(r);
    const i = r.repository ? hi({}, e.repository, r.repository) : e.repository;
    Array.isArray(r.patterns) && Kt(r.patterns, { ...e, repository: i }, t);
    const o = r.include;
    if (!o) continue;
    const s = Si(o);
    switch (s.kind) {
      case 0:
        Ft({ ...e, selfGrammar: e.baseGrammar }, t);
        break;
      case 1:
        Ft(e, t);
        break;
      case 2:
        Pn(s.ruleName, { ...e, repository: i }, t);
        break;
      case 3:
      case 4:
        const l = s.scopeName === e.selfGrammar.scopeName ? e.selfGrammar : s.scopeName === e.baseGrammar.scopeName ? e.baseGrammar : void 0;
        if (l) {
          const a = { baseGrammar: e.baseGrammar, selfGrammar: l, repository: i };
          s.kind === 4 ? Pn(s.ruleName, a, t) : Ft(a, t);
        } else s.kind === 4 ? t.add(new Hs(s.scopeName, s.ruleName)) : t.add(new gt(s.scopeName));
        break;
    }
  }
}
var Vs = class {
  constructor() {
    __publicField(this, "kind", 0);
  }
}, Ys = class {
  constructor() {
    __publicField(this, "kind", 1);
  }
}, Ks = class {
  constructor(n) {
    __publicField(this, "kind", 2);
    this.ruleName = n;
  }
}, Xs = class {
  constructor(n) {
    __publicField(this, "kind", 3);
    this.scopeName = n;
  }
}, Js = class {
  constructor(n, e) {
    __publicField(this, "kind", 4);
    this.scopeName = n, this.ruleName = e;
  }
};
function Si(n) {
  if (n === "$base") return new Vs();
  if (n === "$self") return new Ys();
  const e = n.indexOf("#");
  if (e === -1) return new Xs(n);
  if (e === 0) return new Ks(n.substring(1));
  {
    const t = n.substring(0, e), r = n.substring(e + 1);
    return new Js(t, r);
  }
}
var Qs = /\\(\d+)/, Er = /\\(\d+)/g, Zs = -1, Ci = -2;
var St = class {
  constructor(n, e, t, r) {
    __publicField(this, "$location");
    __publicField(this, "id");
    __publicField(this, "_nameIsCapturing");
    __publicField(this, "_name");
    __publicField(this, "_contentNameIsCapturing");
    __publicField(this, "_contentName");
    this.$location = n, this.id = e, this._name = t || null, this._nameIsCapturing = jt.hasCaptures(this._name), this._contentName = r || null, this._contentNameIsCapturing = jt.hasCaptures(this._contentName);
  }
  get debugName() {
    const n = this.$location ? `${di(this.$location.filename)}:${this.$location.line}` : "unknown";
    return `${this.constructor.name}#${this.id} @ ${n}`;
  }
  getName(n, e) {
    return !this._nameIsCapturing || this._name === null || n === null || e === null ? this._name : jt.replaceCaptures(this._name, n, e);
  }
  getContentName(n, e) {
    return !this._contentNameIsCapturing || this._contentName === null ? this._contentName : jt.replaceCaptures(this._contentName, n, e);
  }
}, ea = class extends St {
  constructor(n, e, t, r, i) {
    super(n, e, t, r);
    __publicField(this, "retokenizeCapturedWithRuleId");
    this.retokenizeCapturedWithRuleId = i;
  }
  dispose() {
  }
  collectPatterns(n, e) {
    throw new Error("Not supported!");
  }
  compile(n, e) {
    throw new Error("Not supported!");
  }
  compileAG(n, e, t, r) {
    throw new Error("Not supported!");
  }
}, ta = class extends St {
  constructor(n, e, t, r, i) {
    super(n, e, t, null);
    __publicField(this, "_match");
    __publicField(this, "captures");
    __publicField(this, "_cachedCompiledPatterns");
    this._match = new mt(r, this.id), this.captures = i, this._cachedCompiledPatterns = null;
  }
  dispose() {
    this._cachedCompiledPatterns && (this._cachedCompiledPatterns.dispose(), this._cachedCompiledPatterns = null);
  }
  get debugMatchRegExp() {
    return `${this._match.source}`;
  }
  collectPatterns(n, e) {
    e.push(this._match);
  }
  compile(n, e) {
    return this._getCachedCompiledPatterns(n).compile(n);
  }
  compileAG(n, e, t, r) {
    return this._getCachedCompiledPatterns(n).compileAG(n, t, r);
  }
  _getCachedCompiledPatterns(n) {
    return this._cachedCompiledPatterns || (this._cachedCompiledPatterns = new vt(), this.collectPatterns(n, this._cachedCompiledPatterns)), this._cachedCompiledPatterns;
  }
}, Ar = class extends St {
  constructor(n, e, t, r, i) {
    super(n, e, t, r);
    __publicField(this, "hasMissingPatterns");
    __publicField(this, "patterns");
    __publicField(this, "_cachedCompiledPatterns");
    this.patterns = i.patterns, this.hasMissingPatterns = i.hasMissingPatterns, this._cachedCompiledPatterns = null;
  }
  dispose() {
    this._cachedCompiledPatterns && (this._cachedCompiledPatterns.dispose(), this._cachedCompiledPatterns = null);
  }
  collectPatterns(n, e) {
    for (const t of this.patterns) n.getRule(t).collectPatterns(n, e);
  }
  compile(n, e) {
    return this._getCachedCompiledPatterns(n).compile(n);
  }
  compileAG(n, e, t, r) {
    return this._getCachedCompiledPatterns(n).compileAG(n, t, r);
  }
  _getCachedCompiledPatterns(n) {
    return this._cachedCompiledPatterns || (this._cachedCompiledPatterns = new vt(), this.collectPatterns(n, this._cachedCompiledPatterns)), this._cachedCompiledPatterns;
  }
}, Nn = class extends St {
  constructor(n, e, t, r, i, o, s, l, a, c) {
    super(n, e, t, r);
    __publicField(this, "_begin");
    __publicField(this, "beginCaptures");
    __publicField(this, "_end");
    __publicField(this, "endHasBackReferences");
    __publicField(this, "endCaptures");
    __publicField(this, "applyEndPatternLast");
    __publicField(this, "hasMissingPatterns");
    __publicField(this, "patterns");
    __publicField(this, "_cachedCompiledPatterns");
    this._begin = new mt(i, this.id), this.beginCaptures = o, this._end = new mt(s || "\uFFFF", -1), this.endHasBackReferences = this._end.hasBackReferences, this.endCaptures = l, this.applyEndPatternLast = a || false, this.patterns = c.patterns, this.hasMissingPatterns = c.hasMissingPatterns, this._cachedCompiledPatterns = null;
  }
  dispose() {
    this._cachedCompiledPatterns && (this._cachedCompiledPatterns.dispose(), this._cachedCompiledPatterns = null);
  }
  get debugBeginRegExp() {
    return `${this._begin.source}`;
  }
  get debugEndRegExp() {
    return `${this._end.source}`;
  }
  getEndWithResolvedBackReferences(n, e) {
    return this._end.resolveBackReferences(n, e);
  }
  collectPatterns(n, e) {
    e.push(this._begin);
  }
  compile(n, e) {
    return this._getCachedCompiledPatterns(n, e).compile(n);
  }
  compileAG(n, e, t, r) {
    return this._getCachedCompiledPatterns(n, e).compileAG(n, t, r);
  }
  _getCachedCompiledPatterns(n, e) {
    if (!this._cachedCompiledPatterns) {
      this._cachedCompiledPatterns = new vt();
      for (const t of this.patterns) n.getRule(t).collectPatterns(n, this._cachedCompiledPatterns);
      this.applyEndPatternLast ? this._cachedCompiledPatterns.push(this._end.hasBackReferences ? this._end.clone() : this._end) : this._cachedCompiledPatterns.unshift(this._end.hasBackReferences ? this._end.clone() : this._end);
    }
    return this._end.hasBackReferences && (this.applyEndPatternLast ? this._cachedCompiledPatterns.setSource(this._cachedCompiledPatterns.length() - 1, e) : this._cachedCompiledPatterns.setSource(0, e)), this._cachedCompiledPatterns;
  }
}, Xt = class extends St {
  constructor(n, e, t, r, i, o, s, l, a) {
    super(n, e, t, r);
    __publicField(this, "_begin");
    __publicField(this, "beginCaptures");
    __publicField(this, "whileCaptures");
    __publicField(this, "_while");
    __publicField(this, "whileHasBackReferences");
    __publicField(this, "hasMissingPatterns");
    __publicField(this, "patterns");
    __publicField(this, "_cachedCompiledPatterns");
    __publicField(this, "_cachedCompiledWhilePatterns");
    this._begin = new mt(i, this.id), this.beginCaptures = o, this.whileCaptures = l, this._while = new mt(s, Ci), this.whileHasBackReferences = this._while.hasBackReferences, this.patterns = a.patterns, this.hasMissingPatterns = a.hasMissingPatterns, this._cachedCompiledPatterns = null, this._cachedCompiledWhilePatterns = null;
  }
  dispose() {
    this._cachedCompiledPatterns && (this._cachedCompiledPatterns.dispose(), this._cachedCompiledPatterns = null), this._cachedCompiledWhilePatterns && (this._cachedCompiledWhilePatterns.dispose(), this._cachedCompiledWhilePatterns = null);
  }
  get debugBeginRegExp() {
    return `${this._begin.source}`;
  }
  get debugWhileRegExp() {
    return `${this._while.source}`;
  }
  getWhileWithResolvedBackReferences(n, e) {
    return this._while.resolveBackReferences(n, e);
  }
  collectPatterns(n, e) {
    e.push(this._begin);
  }
  compile(n, e) {
    return this._getCachedCompiledPatterns(n).compile(n);
  }
  compileAG(n, e, t, r) {
    return this._getCachedCompiledPatterns(n).compileAG(n, t, r);
  }
  _getCachedCompiledPatterns(n) {
    if (!this._cachedCompiledPatterns) {
      this._cachedCompiledPatterns = new vt();
      for (const e of this.patterns) n.getRule(e).collectPatterns(n, this._cachedCompiledPatterns);
    }
    return this._cachedCompiledPatterns;
  }
  compileWhile(n, e) {
    return this._getCachedCompiledWhilePatterns(n, e).compile(n);
  }
  compileWhileAG(n, e, t, r) {
    return this._getCachedCompiledWhilePatterns(n, e).compileAG(n, t, r);
  }
  _getCachedCompiledWhilePatterns(n, e) {
    return this._cachedCompiledWhilePatterns || (this._cachedCompiledWhilePatterns = new vt(), this._cachedCompiledWhilePatterns.push(this._while.hasBackReferences ? this._while.clone() : this._while)), this._while.hasBackReferences && this._cachedCompiledWhilePatterns.setSource(0, e || "\uFFFF"), this._cachedCompiledWhilePatterns;
  }
}, _i = class V {
  static createCaptureRule(e, t, r, i, o) {
    return e.registerRule((s) => new ea(t, s, r, i, o));
  }
  static getCompiledRuleId(e, t, r) {
    return e.id || t.registerRule((i) => {
      if (e.id = i, e.match) return new ta(e.$vscodeTextmateLocation, e.id, e.name, e.match, V._compileCaptures(e.captures, t, r));
      if (typeof e.begin > "u") {
        e.repository && (r = hi({}, r, e.repository));
        let o = e.patterns;
        return typeof o > "u" && e.include && (o = [{ include: e.include }]), new Ar(e.$vscodeTextmateLocation, e.id, e.name, e.contentName, V._compilePatterns(o, t, r));
      }
      return e.while ? new Xt(e.$vscodeTextmateLocation, e.id, e.name, e.contentName, e.begin, V._compileCaptures(e.beginCaptures || e.captures, t, r), e.while, V._compileCaptures(e.whileCaptures || e.captures, t, r), V._compilePatterns(e.patterns, t, r)) : new Nn(e.$vscodeTextmateLocation, e.id, e.name, e.contentName, e.begin, V._compileCaptures(e.beginCaptures || e.captures, t, r), e.end, V._compileCaptures(e.endCaptures || e.captures, t, r), e.applyEndPatternLast, V._compilePatterns(e.patterns, t, r));
    }), e.id;
  }
  static _compileCaptures(e, t, r) {
    let i = [];
    if (e) {
      let o = 0;
      for (const s in e) {
        if (s === "$vscodeTextmateLocation") continue;
        const l = parseInt(s, 10);
        l > o && (o = l);
      }
      for (let s = 0; s <= o; s++) i[s] = null;
      for (const s in e) {
        if (s === "$vscodeTextmateLocation") continue;
        const l = parseInt(s, 10);
        let a = 0;
        e[s].patterns && (a = V.getCompiledRuleId(e[s], t, r)), i[l] = V.createCaptureRule(t, e[s].$vscodeTextmateLocation, e[s].name, e[s].contentName, a);
      }
    }
    return i;
  }
  static _compilePatterns(e, t, r) {
    let i = [];
    if (e) for (let o = 0, s = e.length; o < s; o++) {
      const l = e[o];
      let a = -1;
      if (l.include) {
        const c = Si(l.include);
        switch (c.kind) {
          case 0:
          case 1:
            a = V.getCompiledRuleId(r[l.include], t, r);
            break;
          case 2:
            let u = r[c.ruleName];
            u && (a = V.getCompiledRuleId(u, t, r));
            break;
          case 3:
          case 4:
            const f = c.scopeName, g = c.kind === 4 ? c.ruleName : null, d = t.getExternalGrammar(f, r);
            if (d) if (g) {
              let p = d.repository[g];
              p && (a = V.getCompiledRuleId(p, t, d.repository));
            } else a = V.getCompiledRuleId(d.repository.$self, t, d.repository);
            break;
        }
      } else a = V.getCompiledRuleId(l, t, r);
      if (a !== -1) {
        const c = t.getRule(a);
        let u = false;
        if ((c instanceof Ar || c instanceof Nn || c instanceof Xt) && c.hasMissingPatterns && c.patterns.length === 0 && (u = true), u) continue;
        i.push(a);
      }
    }
    return { patterns: i, hasMissingPatterns: (e ? e.length : 0) !== i.length };
  }
}, mt = class xi {
  constructor(e, t) {
    __publicField(this, "source");
    __publicField(this, "ruleId");
    __publicField(this, "hasAnchor");
    __publicField(this, "hasBackReferences");
    __publicField(this, "_anchorCache");
    if (e && typeof e == "string") {
      const r = e.length;
      let i = 0, o = [], s = false;
      for (let l = 0; l < r; l++) if (e.charAt(l) === "\\" && l + 1 < r) {
        const c = e.charAt(l + 1);
        c === "z" ? (o.push(e.substring(i, l)), o.push("$(?!\\n)(?<!\\n)"), i = l + 2) : (c === "A" || c === "G") && (s = true), l++;
      }
      this.hasAnchor = s, i === 0 ? this.source = e : (o.push(e.substring(i, r)), this.source = o.join(""));
    } else this.hasAnchor = false, this.source = e;
    this.hasAnchor ? this._anchorCache = this._buildAnchorCache() : this._anchorCache = null, this.ruleId = t, typeof this.source == "string" ? this.hasBackReferences = Qs.test(this.source) : this.hasBackReferences = false;
  }
  clone() {
    return new xi(this.source, this.ruleId);
  }
  setSource(e) {
    this.source !== e && (this.source = e, this.hasAnchor && (this._anchorCache = this._buildAnchorCache()));
  }
  resolveBackReferences(e, t) {
    if (typeof this.source != "string") throw new Error("This method should only be called if the source is a string");
    let r = t.map((i) => e.substring(i.start, i.end));
    return Er.lastIndex = 0, this.source.replace(Er, (i, o) => mi(r[parseInt(o, 10)] || ""));
  }
  _buildAnchorCache() {
    if (typeof this.source != "string") throw new Error("This method should only be called if the source is a string");
    let e = [], t = [], r = [], i = [], o, s, l, a;
    for (o = 0, s = this.source.length; o < s; o++) l = this.source.charAt(o), e[o] = l, t[o] = l, r[o] = l, i[o] = l, l === "\\" && o + 1 < s && (a = this.source.charAt(o + 1), a === "A" ? (e[o + 1] = "\uFFFF", t[o + 1] = "\uFFFF", r[o + 1] = "A", i[o + 1] = "A") : a === "G" ? (e[o + 1] = "\uFFFF", t[o + 1] = "G", r[o + 1] = "\uFFFF", i[o + 1] = "G") : (e[o + 1] = a, t[o + 1] = a, r[o + 1] = a, i[o + 1] = a), o++);
    return { A0_G0: e.join(""), A0_G1: t.join(""), A1_G0: r.join(""), A1_G1: i.join("") };
  }
  resolveAnchors(e, t) {
    return !this.hasAnchor || !this._anchorCache || typeof this.source != "string" ? this.source : e ? t ? this._anchorCache.A1_G1 : this._anchorCache.A1_G0 : t ? this._anchorCache.A0_G1 : this._anchorCache.A0_G0;
  }
}, vt = class {
  constructor() {
    __publicField(this, "_items");
    __publicField(this, "_hasAnchors");
    __publicField(this, "_cached");
    __publicField(this, "_anchorCache");
    this._items = [], this._hasAnchors = false, this._cached = null, this._anchorCache = { A0_G0: null, A0_G1: null, A1_G0: null, A1_G1: null };
  }
  dispose() {
    this._disposeCaches();
  }
  _disposeCaches() {
    this._cached && (this._cached.dispose(), this._cached = null), this._anchorCache.A0_G0 && (this._anchorCache.A0_G0.dispose(), this._anchorCache.A0_G0 = null), this._anchorCache.A0_G1 && (this._anchorCache.A0_G1.dispose(), this._anchorCache.A0_G1 = null), this._anchorCache.A1_G0 && (this._anchorCache.A1_G0.dispose(), this._anchorCache.A1_G0 = null), this._anchorCache.A1_G1 && (this._anchorCache.A1_G1.dispose(), this._anchorCache.A1_G1 = null);
  }
  push(n) {
    this._items.push(n), this._hasAnchors = this._hasAnchors || n.hasAnchor;
  }
  unshift(n) {
    this._items.unshift(n), this._hasAnchors = this._hasAnchors || n.hasAnchor;
  }
  length() {
    return this._items.length;
  }
  setSource(n, e) {
    this._items[n].source !== e && (this._disposeCaches(), this._items[n].setSource(e));
  }
  compile(n) {
    if (!this._cached) {
      let e = this._items.map((t) => t.source);
      this._cached = new Rr(n, e, this._items.map((t) => t.ruleId));
    }
    return this._cached;
  }
  compileAG(n, e, t) {
    return this._hasAnchors ? e ? t ? (this._anchorCache.A1_G1 || (this._anchorCache.A1_G1 = this._resolveAnchors(n, e, t)), this._anchorCache.A1_G1) : (this._anchorCache.A1_G0 || (this._anchorCache.A1_G0 = this._resolveAnchors(n, e, t)), this._anchorCache.A1_G0) : t ? (this._anchorCache.A0_G1 || (this._anchorCache.A0_G1 = this._resolveAnchors(n, e, t)), this._anchorCache.A0_G1) : (this._anchorCache.A0_G0 || (this._anchorCache.A0_G0 = this._resolveAnchors(n, e, t)), this._anchorCache.A0_G0) : this.compile(n);
  }
  _resolveAnchors(n, e, t) {
    let r = this._items.map((i) => i.resolveAnchors(e, t));
    return new Rr(n, r, this._items.map((i) => i.ruleId));
  }
}, Rr = class {
  constructor(n, e, t) {
    __publicField(this, "scanner");
    this.regExps = e, this.rules = t, this.scanner = n.createOnigScanner(e);
  }
  dispose() {
    typeof this.scanner.dispose == "function" && this.scanner.dispose();
  }
  toString() {
    const n = [];
    for (let e = 0, t = this.rules.length; e < t; e++) n.push("   - " + this.rules[e] + ": " + this.regExps[e]);
    return n.join(`
`);
  }
  findNextMatchSync(n, e, t) {
    const r = this.scanner.findNextMatchSync(n, e, t);
    return r ? { ruleId: this.rules[r.index], captureIndices: r.captureIndices } : null;
  }
}, bn = class {
  constructor(n, e) {
    this.languageId = n, this.tokenType = e;
  }
}, na = (_a = class {
  constructor(e, t) {
    __publicField(this, "_defaultAttributes");
    __publicField(this, "_embeddedLanguagesMatcher");
    __publicField(this, "_getBasicScopeAttributes", new vi((e) => {
      const t = this._scopeToLanguage(e), r = this._toStandardTokenType(e);
      return new bn(t, r);
    }));
    this._defaultAttributes = new bn(e, 8), this._embeddedLanguagesMatcher = new ra(Object.entries(t || {}));
  }
  getDefaultAttributes() {
    return this._defaultAttributes;
  }
  getBasicScopeAttributes(e) {
    return e === null ? _a._NULL_SCOPE_METADATA : this._getBasicScopeAttributes.get(e);
  }
  _scopeToLanguage(e) {
    return this._embeddedLanguagesMatcher.match(e) || 0;
  }
  _toStandardTokenType(e) {
    const t = e.match(_a.STANDARD_TOKEN_TYPE_REGEXP);
    if (!t) return 8;
    switch (t[1]) {
      case "comment":
        return 1;
      case "string":
        return 2;
      case "regex":
        return 3;
      case "meta.embedded":
        return 0;
    }
    throw new Error("Unexpected match for standard token type!");
  }
}, __publicField(_a, "_NULL_SCOPE_METADATA", new bn(0, 0)), __publicField(_a, "STANDARD_TOKEN_TYPE_REGEXP", /\b(comment|string|regex|meta\.embedded)\b/), _a), ra = class {
  constructor(n) {
    __publicField(this, "values");
    __publicField(this, "scopesRegExp");
    if (n.length === 0) this.values = null, this.scopesRegExp = null;
    else {
      this.values = new Map(n);
      const e = n.map(([t, r]) => mi(t));
      e.sort(), e.reverse(), this.scopesRegExp = new RegExp(`^((${e.join(")|(")}))($|\\.)`, "");
    }
  }
  match(n) {
    if (!this.scopesRegExp) return;
    const e = n.match(this.scopesRegExp);
    if (e) return this.values.get(e[1]);
  }
}, kr = class {
  constructor(n, e) {
    this.stack = n, this.stoppedEarly = e;
  }
};
function Ti(n, e, t, r, i, o, s, l) {
  const a = e.content.length;
  let c = false, u = -1;
  if (s) {
    const d = ia(n, e, t, r, i, o);
    i = d.stack, r = d.linePos, t = d.isFirstLine, u = d.anchorPosition;
  }
  const f = Date.now();
  for (; !c; ) {
    if (l !== 0 && Date.now() - f > l) return new kr(i, true);
    g();
  }
  return new kr(i, false);
  function g() {
    const d = oa(n, e, t, r, i, u);
    if (!d) {
      o.produce(i, a), c = true;
      return;
    }
    const p = d.captureIndices, w = d.matchedRuleId, m = p && p.length > 0 ? p[0].end > r : false;
    if (w === Zs) {
      const y = i.getRule(n);
      o.produce(i, p[0].start), i = i.withContentNameScopesList(i.nameScopesList), st(n, e, t, i, o, y.endCaptures, p), o.produce(i, p[0].end);
      const b = i;
      if (i = i.parent, u = b.getAnchorPos(), !m && b.getEnterPos() === r) {
        i = b, o.produce(i, a), c = true;
        return;
      }
    } else {
      const y = n.getRule(w);
      o.produce(i, p[0].start);
      const b = i, C = y.getName(e.content, p), h = i.contentNameScopesList.pushAttributed(C, n);
      if (i = i.push(w, r, u, p[0].end === a, null, h, h), y instanceof Nn) {
        const x = y;
        st(n, e, t, i, o, x.beginCaptures, p), o.produce(i, p[0].end), u = p[0].end;
        const _ = x.getContentName(e.content, p), k = h.pushAttributed(_, n);
        if (i = i.withContentNameScopesList(k), x.endHasBackReferences && (i = i.withEndRule(x.getEndWithResolvedBackReferences(e.content, p))), !m && b.hasSameRuleAs(i)) {
          i = i.pop(), o.produce(i, a), c = true;
          return;
        }
      } else if (y instanceof Xt) {
        const x = y;
        st(n, e, t, i, o, x.beginCaptures, p), o.produce(i, p[0].end), u = p[0].end;
        const _ = x.getContentName(e.content, p), k = h.pushAttributed(_, n);
        if (i = i.withContentNameScopesList(k), x.whileHasBackReferences && (i = i.withEndRule(x.getWhileWithResolvedBackReferences(e.content, p))), !m && b.hasSameRuleAs(i)) {
          i = i.pop(), o.produce(i, a), c = true;
          return;
        }
      } else if (st(n, e, t, i, o, y.captures, p), o.produce(i, p[0].end), i = i.pop(), !m) {
        i = i.safePop(), o.produce(i, a), c = true;
        return;
      }
    }
    p[0].end > r && (r = p[0].end, t = false);
  }
}
function ia(n, e, t, r, i, o) {
  let s = i.beginRuleCapturedEOL ? 0 : -1;
  const l = [];
  for (let a = i; a; a = a.pop()) {
    const c = a.getRule(n);
    c instanceof Xt && l.push({ rule: c, stack: a });
  }
  for (let a = l.pop(); a; a = l.pop()) {
    const { ruleScanner: c, findOptions: u } = la(a.rule, n, a.stack.endRule, t, r === s), f = c.findNextMatchSync(e, r, u);
    if (f) {
      if (f.ruleId !== Ci) {
        i = a.stack.pop();
        break;
      }
      f.captureIndices && f.captureIndices.length && (o.produce(a.stack, f.captureIndices[0].start), st(n, e, t, a.stack, o, a.rule.whileCaptures, f.captureIndices), o.produce(a.stack, f.captureIndices[0].end), s = f.captureIndices[0].end, f.captureIndices[0].end > r && (r = f.captureIndices[0].end, t = false));
    } else {
      i = a.stack.pop();
      break;
    }
  }
  return { stack: i, linePos: r, anchorPosition: s, isFirstLine: t };
}
function oa(n, e, t, r, i, o) {
  const s = sa(n, e, t, r, i, o), l = n.getInjections();
  if (l.length === 0) return s;
  const a = aa(l, n, e, t, r, i, o);
  if (!a) return s;
  if (!s) return a;
  const c = s.captureIndices[0].start, u = a.captureIndices[0].start;
  return u < c || a.priorityMatch && u === c ? a : s;
}
function sa(n, e, t, r, i, o) {
  const s = i.getRule(n), { ruleScanner: l, findOptions: a } = Ei(s, n, i.endRule, t, r === o), c = l.findNextMatchSync(e, r, a);
  return c ? { captureIndices: c.captureIndices, matchedRuleId: c.ruleId } : null;
}
function aa(n, e, t, r, i, o, s) {
  let l = Number.MAX_VALUE, a = null, c, u = 0;
  const f = o.contentNameScopesList.getScopeNames();
  for (let g = 0, d = n.length; g < d; g++) {
    const p = n[g];
    if (!p.matcher(f)) continue;
    const w = e.getRule(p.ruleId), { ruleScanner: m, findOptions: y } = Ei(w, e, null, r, i === s), b = m.findNextMatchSync(t, i, y);
    if (!b) continue;
    const C = b.captureIndices[0].start;
    if (!(C >= l) && (l = C, a = b.captureIndices, c = b.ruleId, u = p.priority, l === i)) break;
  }
  return a ? { priorityMatch: u === -1, captureIndices: a, matchedRuleId: c } : null;
}
function Ei(n, e, t, r, i) {
  return { ruleScanner: n.compileAG(e, t, r, i), findOptions: 0 };
}
function la(n, e, t, r, i) {
  return { ruleScanner: n.compileWhileAG(e, t, r, i), findOptions: 0 };
}
function st(n, e, t, r, i, o, s) {
  if (o.length === 0) return;
  const l = e.content, a = Math.min(o.length, s.length), c = [], u = s[0].end;
  for (let f = 0; f < a; f++) {
    const g = o[f];
    if (g === null) continue;
    const d = s[f];
    if (d.length === 0) continue;
    if (d.start > u) break;
    for (; c.length > 0 && c[c.length - 1].endPos <= d.start; ) i.produceFromScopes(c[c.length - 1].scopes, c[c.length - 1].endPos), c.pop();
    if (c.length > 0 ? i.produceFromScopes(c[c.length - 1].scopes, d.start) : i.produce(r, d.start), g.retokenizeCapturedWithRuleId) {
      const w = g.getName(l, s), m = r.contentNameScopesList.pushAttributed(w, n), y = g.getContentName(l, s), b = m.pushAttributed(y, n), C = r.push(g.retokenizeCapturedWithRuleId, d.start, -1, false, null, m, b), h = n.createOnigString(l.substring(0, d.end));
      Ti(n, h, t && d.start === 0, d.start, C, i, false, 0), wi(h);
      continue;
    }
    const p = g.getName(l, s);
    if (p !== null) {
      const m = (c.length > 0 ? c[c.length - 1].scopes : r.contentNameScopesList).pushAttributed(p, n);
      c.push(new ca(m, d.end));
    }
  }
  for (; c.length > 0; ) i.produceFromScopes(c[c.length - 1].scopes, c[c.length - 1].endPos), c.pop();
}
var ca = class {
  constructor(n, e) {
    __publicField(this, "scopes");
    __publicField(this, "endPos");
    this.scopes = n, this.endPos = e;
  }
};
function ua(n, e, t, r, i, o, s, l) {
  return new ha(n, e, t, r, i, o, s, l);
}
function Lr(n, e, t, r, i) {
  const o = Yt(e, Jt), s = _i.getCompiledRuleId(t, r, i.repository);
  for (const l of o) n.push({ debugSelector: e, matcher: l.matcher, ruleId: s, grammar: i, priority: l.priority });
}
function Jt(n, e) {
  if (e.length < n.length) return false;
  let t = 0;
  return n.every((r) => {
    for (let i = t; i < e.length; i++) if (fa(e[i], r)) return t = i + 1, true;
    return false;
  });
}
function fa(n, e) {
  if (!n) return false;
  if (n === e) return true;
  const t = e.length;
  return n.length > t && n.substr(0, t) === e && n[t] === ".";
}
var ha = class {
  constructor(n, e, t, r, i, o, s, l) {
    __publicField(this, "_rootId");
    __publicField(this, "_lastRuleId");
    __publicField(this, "_ruleId2desc");
    __publicField(this, "_includedGrammars");
    __publicField(this, "_grammarRepository");
    __publicField(this, "_grammar");
    __publicField(this, "_injections");
    __publicField(this, "_basicScopeAttributesProvider");
    __publicField(this, "_tokenTypeMatchers");
    if (this._rootScopeName = n, this.balancedBracketSelectors = o, this._onigLib = l, this._basicScopeAttributesProvider = new na(t, r), this._rootId = -1, this._lastRuleId = 0, this._ruleId2desc = [null], this._includedGrammars = {}, this._grammarRepository = s, this._grammar = Or(e, null), this._injections = null, this._tokenTypeMatchers = [], i) for (const a of Object.keys(i)) {
      const c = Yt(a, Jt);
      for (const u of c) this._tokenTypeMatchers.push({ matcher: u.matcher, type: i[a] });
    }
  }
  get themeProvider() {
    return this._grammarRepository;
  }
  dispose() {
    for (const n of this._ruleId2desc) n && n.dispose();
  }
  createOnigScanner(n) {
    return this._onigLib.createOnigScanner(n);
  }
  createOnigString(n) {
    return this._onigLib.createOnigString(n);
  }
  getMetadataForScope(n) {
    return this._basicScopeAttributesProvider.getBasicScopeAttributes(n);
  }
  _collectInjections() {
    const n = { lookup: (i) => i === this._rootScopeName ? this._grammar : this.getExternalGrammar(i), injections: (i) => this._grammarRepository.injections(i) }, e = [], t = this._rootScopeName, r = n.lookup(t);
    if (r) {
      const i = r.injections;
      if (i) for (let s in i) Lr(e, s, i[s], this, r);
      const o = this._grammarRepository.injections(t);
      o && o.forEach((s) => {
        const l = this.getExternalGrammar(s);
        if (l) {
          const a = l.injectionSelector;
          a && Lr(e, a, l, this, l);
        }
      });
    }
    return e.sort((i, o) => i.priority - o.priority), e;
  }
  getInjections() {
    return this._injections === null && (this._injections = this._collectInjections()), this._injections;
  }
  registerRule(n) {
    const e = ++this._lastRuleId, t = n(e);
    return this._ruleId2desc[e] = t, t;
  }
  getRule(n) {
    return this._ruleId2desc[n];
  }
  getExternalGrammar(n, e) {
    if (this._includedGrammars[n]) return this._includedGrammars[n];
    if (this._grammarRepository) {
      const t = this._grammarRepository.lookup(n);
      if (t) return this._includedGrammars[n] = Or(t, e && e.$base), this._includedGrammars[n];
    }
  }
  tokenizeLine(n, e, t = 0) {
    const r = this._tokenize(n, e, false, t);
    return { tokens: r.lineTokens.getResult(r.ruleStack, r.lineLength), ruleStack: r.ruleStack, stoppedEarly: r.stoppedEarly };
  }
  tokenizeLine2(n, e, t = 0) {
    const r = this._tokenize(n, e, true, t);
    return { tokens: r.lineTokens.getBinaryResult(r.ruleStack, r.lineLength), ruleStack: r.ruleStack, stoppedEarly: r.stoppedEarly };
  }
  _tokenize(n, e, t, r) {
    this._rootId === -1 && (this._rootId = _i.getCompiledRuleId(this._grammar.repository.$self, this, this._grammar.repository), this.getInjections());
    let i;
    if (!e || e === Mn.NULL) {
      i = true;
      const c = this._basicScopeAttributesProvider.getDefaultAttributes(), u = this.themeProvider.getDefaults(), f = Xe.set(0, c.languageId, c.tokenType, null, u.fontStyle, u.foregroundId, u.backgroundId), g = this.getRule(this._rootId).getName(null, null);
      let d;
      g ? d = ft.createRootAndLookUpScopeName(g, f, this) : d = ft.createRoot("unknown", f), e = new Mn(null, this._rootId, -1, -1, false, null, d, d);
    } else i = false, e.reset();
    n = n + `
`;
    const o = this.createOnigString(n), s = o.content.length, l = new pa(t, n, this._tokenTypeMatchers, this.balancedBracketSelectors), a = Ti(this, o, i, 0, e, l, true, r);
    return wi(o), { lineLength: s, lineTokens: l, ruleStack: a.stack, stoppedEarly: a.stoppedEarly };
  }
};
function Or(n, e) {
  return n = Os(n), n.repository = n.repository || {}, n.repository.$self = { $vscodeTextmateLocation: n.$vscodeTextmateLocation, patterns: n.patterns, name: n.scopeName }, n.repository.$base = e || n.repository.$self, n;
}
var ft = class fe {
  constructor(e, t, r) {
    this.parent = e, this.scopePath = t, this.tokenAttributes = r;
  }
  static fromExtension(e, t) {
    let r = e, i = (e == null ? void 0 : e.scopePath) ?? null;
    for (const o of t) i = yn.push(i, o.scopeNames), r = new fe(r, i, o.encodedTokenAttributes);
    return r;
  }
  static createRoot(e, t) {
    return new fe(null, new yn(null, e), t);
  }
  static createRootAndLookUpScopeName(e, t, r) {
    const i = r.getMetadataForScope(e), o = new yn(null, e), s = r.themeProvider.themeMatch(o), l = fe.mergeAttributes(t, i, s);
    return new fe(null, o, l);
  }
  get scopeName() {
    return this.scopePath.scopeName;
  }
  toString() {
    return this.getScopeNames().join(" ");
  }
  equals(e) {
    return fe.equals(this, e);
  }
  static equals(e, t) {
    do {
      if (e === t || !e && !t) return true;
      if (!e || !t || e.scopeName !== t.scopeName || e.tokenAttributes !== t.tokenAttributes) return false;
      e = e.parent, t = t.parent;
    } while (true);
  }
  static mergeAttributes(e, t, r) {
    let i = -1, o = 0, s = 0;
    return r !== null && (i = r.fontStyle, o = r.foregroundId, s = r.backgroundId), Xe.set(e, t.languageId, t.tokenType, null, i, o, s);
  }
  pushAttributed(e, t) {
    if (e === null) return this;
    if (e.indexOf(" ") === -1) return fe._pushAttributed(this, e, t);
    const r = e.split(/ /g);
    let i = this;
    for (const o of r) i = fe._pushAttributed(i, o, t);
    return i;
  }
  static _pushAttributed(e, t, r) {
    const i = r.getMetadataForScope(t), o = e.scopePath.push(t), s = r.themeProvider.themeMatch(o), l = fe.mergeAttributes(e.tokenAttributes, i, s);
    return new fe(e, o, l);
  }
  getScopeNames() {
    return this.scopePath.getSegments();
  }
  getExtensionIfDefined(e) {
    var _a3;
    const t = [];
    let r = this;
    for (; r && r !== e; ) t.push({ encodedTokenAttributes: r.tokenAttributes, scopeNames: r.scopePath.getExtensionIfDefined(((_a3 = r.parent) == null ? void 0 : _a3.scopePath) ?? null) }), r = r.parent;
    return r === e ? t.reverse() : void 0;
  }
}, Mn = (_b = class {
  constructor(e, t, r, i, o, s, l, a) {
    __publicField(this, "_stackElementBrand");
    __publicField(this, "_enterPos");
    __publicField(this, "_anchorPos");
    __publicField(this, "depth");
    this.parent = e, this.ruleId = t, this.beginRuleCapturedEOL = o, this.endRule = s, this.nameScopesList = l, this.contentNameScopesList = a, this.depth = this.parent ? this.parent.depth + 1 : 1, this._enterPos = r, this._anchorPos = i;
  }
  equals(e) {
    return e === null ? false : _b._equals(this, e);
  }
  static _equals(e, t) {
    return e === t ? true : this._structuralEquals(e, t) ? ft.equals(e.contentNameScopesList, t.contentNameScopesList) : false;
  }
  static _structuralEquals(e, t) {
    do {
      if (e === t || !e && !t) return true;
      if (!e || !t || e.depth !== t.depth || e.ruleId !== t.ruleId || e.endRule !== t.endRule) return false;
      e = e.parent, t = t.parent;
    } while (true);
  }
  clone() {
    return this;
  }
  static _reset(e) {
    for (; e; ) e._enterPos = -1, e._anchorPos = -1, e = e.parent;
  }
  reset() {
    _b._reset(this);
  }
  pop() {
    return this.parent;
  }
  safePop() {
    return this.parent ? this.parent : this;
  }
  push(e, t, r, i, o, s, l) {
    return new _b(this, e, t, r, i, o, s, l);
  }
  getEnterPos() {
    return this._enterPos;
  }
  getAnchorPos() {
    return this._anchorPos;
  }
  getRule(e) {
    return e.getRule(this.ruleId);
  }
  toString() {
    const e = [];
    return this._writeString(e, 0), "[" + e.join(",") + "]";
  }
  _writeString(e, t) {
    var _a3, _b2;
    return this.parent && (t = this.parent._writeString(e, t)), e[t++] = `(${this.ruleId}, ${(_a3 = this.nameScopesList) == null ? void 0 : _a3.toString()}, ${(_b2 = this.contentNameScopesList) == null ? void 0 : _b2.toString()})`, t;
  }
  withContentNameScopesList(e) {
    return this.contentNameScopesList === e ? this : this.parent.push(this.ruleId, this._enterPos, this._anchorPos, this.beginRuleCapturedEOL, this.endRule, this.nameScopesList, e);
  }
  withEndRule(e) {
    return this.endRule === e ? this : new _b(this.parent, this.ruleId, this._enterPos, this._anchorPos, this.beginRuleCapturedEOL, e, this.nameScopesList, this.contentNameScopesList);
  }
  hasSameRuleAs(e) {
    let t = this;
    for (; t && t._enterPos === e._enterPos; ) {
      if (t.ruleId === e.ruleId) return true;
      t = t.parent;
    }
    return false;
  }
  toStateStackFrame() {
    var _a3, _b2, _c2;
    return { ruleId: this.ruleId, beginRuleCapturedEOL: this.beginRuleCapturedEOL, endRule: this.endRule, nameScopesList: ((_b2 = this.nameScopesList) == null ? void 0 : _b2.getExtensionIfDefined(((_a3 = this.parent) == null ? void 0 : _a3.nameScopesList) ?? null)) ?? [], contentNameScopesList: ((_c2 = this.contentNameScopesList) == null ? void 0 : _c2.getExtensionIfDefined(this.nameScopesList)) ?? [] };
  }
  static pushFrame(e, t) {
    const r = ft.fromExtension((e == null ? void 0 : e.nameScopesList) ?? null, t.nameScopesList);
    return new _b(e, t.ruleId, t.enterPos ?? -1, t.anchorPos ?? -1, t.beginRuleCapturedEOL, t.endRule, r, ft.fromExtension(r, t.contentNameScopesList));
  }
}, __publicField(_b, "NULL", new _b(null, 0, 0, 0, false, null, null, null)), _b), da = class {
  constructor(n, e) {
    __publicField(this, "balancedBracketScopes");
    __publicField(this, "unbalancedBracketScopes");
    __publicField(this, "allowAny", false);
    this.balancedBracketScopes = n.flatMap((t) => t === "*" ? (this.allowAny = true, []) : Yt(t, Jt).map((r) => r.matcher)), this.unbalancedBracketScopes = e.flatMap((t) => Yt(t, Jt).map((r) => r.matcher));
  }
  get matchesAlways() {
    return this.allowAny && this.unbalancedBracketScopes.length === 0;
  }
  get matchesNever() {
    return this.balancedBracketScopes.length === 0 && !this.allowAny;
  }
  match(n) {
    for (const e of this.unbalancedBracketScopes) if (e(n)) return false;
    for (const e of this.balancedBracketScopes) if (e(n)) return true;
    return this.allowAny;
  }
}, pa = class {
  constructor(n, e, t, r) {
    __publicField(this, "_emitBinaryTokens");
    __publicField(this, "_lineText");
    __publicField(this, "_tokens");
    __publicField(this, "_binaryTokens");
    __publicField(this, "_lastTokenEndIndex");
    __publicField(this, "_tokenTypeOverrides");
    this.balancedBracketSelectors = r, this._emitBinaryTokens = n, this._tokenTypeOverrides = t, this._lineText = null, this._tokens = [], this._binaryTokens = [], this._lastTokenEndIndex = 0;
  }
  produce(n, e) {
    this.produceFromScopes(n.contentNameScopesList, e);
  }
  produceFromScopes(n, e) {
    var _a3;
    if (this._lastTokenEndIndex >= e) return;
    if (this._emitBinaryTokens) {
      let r = (n == null ? void 0 : n.tokenAttributes) ?? 0, i = false;
      if (((_a3 = this.balancedBracketSelectors) == null ? void 0 : _a3.matchesAlways) && (i = true), this._tokenTypeOverrides.length > 0 || this.balancedBracketSelectors && !this.balancedBracketSelectors.matchesAlways && !this.balancedBracketSelectors.matchesNever) {
        const o = (n == null ? void 0 : n.getScopeNames()) ?? [];
        for (const s of this._tokenTypeOverrides) s.matcher(o) && (r = Xe.set(r, 0, s.type, null, -1, 0, 0));
        this.balancedBracketSelectors && (i = this.balancedBracketSelectors.match(o));
      }
      if (i && (r = Xe.set(r, 0, 8, i, -1, 0, 0)), this._binaryTokens.length > 0 && this._binaryTokens[this._binaryTokens.length - 1] === r) {
        this._lastTokenEndIndex = e;
        return;
      }
      this._binaryTokens.push(this._lastTokenEndIndex), this._binaryTokens.push(r), this._lastTokenEndIndex = e;
      return;
    }
    const t = (n == null ? void 0 : n.getScopeNames()) ?? [];
    this._tokens.push({ startIndex: this._lastTokenEndIndex, endIndex: e, scopes: t }), this._lastTokenEndIndex = e;
  }
  getResult(n, e) {
    return this._tokens.length > 0 && this._tokens[this._tokens.length - 1].startIndex === e - 1 && this._tokens.pop(), this._tokens.length === 0 && (this._lastTokenEndIndex = -1, this.produce(n, e), this._tokens[this._tokens.length - 1].startIndex = 0), this._tokens;
  }
  getBinaryResult(n, e) {
    this._binaryTokens.length > 0 && this._binaryTokens[this._binaryTokens.length - 2] === e - 1 && (this._binaryTokens.pop(), this._binaryTokens.pop()), this._binaryTokens.length === 0 && (this._lastTokenEndIndex = -1, this.produce(n, e), this._binaryTokens[this._binaryTokens.length - 2] = 0);
    const t = new Uint32Array(this._binaryTokens.length);
    for (let r = 0, i = this._binaryTokens.length; r < i; r++) t[r] = this._binaryTokens[r];
    return t;
  }
}, ga = class {
  constructor(n, e) {
    __publicField(this, "_grammars", /* @__PURE__ */ new Map());
    __publicField(this, "_rawGrammars", /* @__PURE__ */ new Map());
    __publicField(this, "_injectionGrammars", /* @__PURE__ */ new Map());
    __publicField(this, "_theme");
    this._onigLib = e, this._theme = n;
  }
  dispose() {
    for (const n of this._grammars.values()) n.dispose();
  }
  setTheme(n) {
    this._theme = n;
  }
  getColorMap() {
    return this._theme.getColorMap();
  }
  addGrammar(n, e) {
    this._rawGrammars.set(n.scopeName, n), e && this._injectionGrammars.set(n.scopeName, e);
  }
  lookup(n) {
    return this._rawGrammars.get(n);
  }
  injections(n) {
    return this._injectionGrammars.get(n);
  }
  getDefaults() {
    return this._theme.getDefaults();
  }
  themeMatch(n) {
    return this._theme.match(n);
  }
  grammarForScopeName(n, e, t, r, i) {
    if (!this._grammars.has(n)) {
      let o = this._rawGrammars.get(n);
      if (!o) return null;
      this._grammars.set(n, ua(n, o, e, t, r, i, this, this._onigLib));
    }
    return this._grammars.get(n);
  }
}, ma = class {
  constructor(e) {
    __publicField(this, "_options");
    __publicField(this, "_syncRegistry");
    __publicField(this, "_ensureGrammarCache");
    this._options = e, this._syncRegistry = new ga(Vt.createFromRawTheme(e.theme, e.colorMap), e.onigLib), this._ensureGrammarCache = /* @__PURE__ */ new Map();
  }
  dispose() {
    this._syncRegistry.dispose();
  }
  setTheme(e, t) {
    this._syncRegistry.setTheme(Vt.createFromRawTheme(e, t));
  }
  getColorMap() {
    return this._syncRegistry.getColorMap();
  }
  loadGrammarWithEmbeddedLanguages(e, t, r) {
    return this.loadGrammarWithConfiguration(e, t, { embeddedLanguages: r });
  }
  loadGrammarWithConfiguration(e, t, r) {
    return this._loadGrammar(e, t, r.embeddedLanguages, r.tokenTypes, new da(r.balancedBracketSelectors || [], r.unbalancedBracketSelectors || []));
  }
  loadGrammar(e) {
    return this._loadGrammar(e, 0, null, null, null);
  }
  _loadGrammar(e, t, r, i, o) {
    const s = new zs(this._syncRegistry, e);
    for (; s.Q.length > 0; ) s.Q.map((l) => this._loadSingleGrammar(l.scopeName)), s.processQueue();
    return this._grammarForScopeName(e, t, r, i, o);
  }
  _loadSingleGrammar(e) {
    this._ensureGrammarCache.has(e) || (this._doLoadSingleGrammar(e), this._ensureGrammarCache.set(e, true));
  }
  _doLoadSingleGrammar(e) {
    const t = this._options.loadGrammar(e);
    if (t) {
      const r = typeof this._options.getInjections == "function" ? this._options.getInjections(e) : void 0;
      this._syncRegistry.addGrammar(t, r);
    }
  }
  addGrammar(e, t = [], r = 0, i = null) {
    return this._syncRegistry.addGrammar(e, t), this._grammarForScopeName(e.scopeName, r, i);
  }
  _grammarForScopeName(e, t = 0, r = null, i = null, o = null) {
    return this._syncRegistry.grammarForScopeName(e, t, r, i, o);
  }
}, Dn = Mn.NULL;
const va = ["area", "base", "basefont", "bgsound", "br", "col", "command", "embed", "frame", "hr", "image", "img", "input", "keygen", "link", "meta", "param", "source", "track", "wbr"];
class Ct {
  constructor(e, t, r) {
    this.normal = t, this.property = e, r && (this.space = r);
  }
}
Ct.prototype.normal = {};
Ct.prototype.property = {};
Ct.prototype.space = void 0;
function Ai(n, e) {
  const t = {}, r = {};
  for (const i of n) Object.assign(t, i.property), Object.assign(r, i.normal);
  return new Ct(t, r, e);
}
function Bn(n) {
  return n.toLowerCase();
}
class Q {
  constructor(e, t) {
    this.attribute = t, this.property = e;
  }
}
Q.prototype.attribute = "";
Q.prototype.booleanish = false;
Q.prototype.boolean = false;
Q.prototype.commaOrSpaceSeparated = false;
Q.prototype.commaSeparated = false;
Q.prototype.defined = false;
Q.prototype.mustUseProperty = false;
Q.prototype.number = false;
Q.prototype.overloadedBoolean = false;
Q.prototype.property = "";
Q.prototype.spaceSeparated = false;
Q.prototype.space = void 0;
let ya = 0;
const R = Me(), W = Me(), Ri = Me(), S = Me(), j = Me(), Fe = Me(), Z = Me();
function Me() {
  return 2 ** ++ya;
}
const jn = Object.freeze(Object.defineProperty({ __proto__: null, boolean: R, booleanish: W, commaOrSpaceSeparated: Z, commaSeparated: Fe, number: S, overloadedBoolean: Ri, spaceSeparated: j }, Symbol.toStringTag, { value: "Module" })), wn = Object.keys(jn);
class Xn extends Q {
  constructor(e, t, r, i) {
    let o = -1;
    if (super(e, t), Pr(this, "space", i), typeof r == "number") for (; ++o < wn.length; ) {
      const s = wn[o];
      Pr(this, wn[o], (r & jn[s]) === jn[s]);
    }
  }
}
Xn.prototype.defined = true;
function Pr(n, e, t) {
  t && (n[e] = t);
}
function Je(n) {
  const e = {}, t = {};
  for (const [r, i] of Object.entries(n.properties)) {
    const o = new Xn(r, n.transform(n.attributes || {}, r), i, n.space);
    n.mustUseProperty && n.mustUseProperty.includes(r) && (o.mustUseProperty = true), e[r] = o, t[Bn(r)] = r, t[Bn(o.attribute)] = r;
  }
  return new Ct(e, t, n.space);
}
const ki = Je({ properties: { ariaActiveDescendant: null, ariaAtomic: W, ariaAutoComplete: null, ariaBusy: W, ariaChecked: W, ariaColCount: S, ariaColIndex: S, ariaColSpan: S, ariaControls: j, ariaCurrent: null, ariaDescribedBy: j, ariaDetails: null, ariaDisabled: W, ariaDropEffect: j, ariaErrorMessage: null, ariaExpanded: W, ariaFlowTo: j, ariaGrabbed: W, ariaHasPopup: null, ariaHidden: W, ariaInvalid: null, ariaKeyShortcuts: null, ariaLabel: null, ariaLabelledBy: j, ariaLevel: S, ariaLive: null, ariaModal: W, ariaMultiLine: W, ariaMultiSelectable: W, ariaOrientation: null, ariaOwns: j, ariaPlaceholder: null, ariaPosInSet: S, ariaPressed: W, ariaReadOnly: W, ariaRelevant: null, ariaRequired: W, ariaRoleDescription: j, ariaRowCount: S, ariaRowIndex: S, ariaRowSpan: S, ariaSelected: W, ariaSetSize: S, ariaSort: null, ariaValueMax: S, ariaValueMin: S, ariaValueNow: S, ariaValueText: null, role: null }, transform(n, e) {
  return e === "role" ? e : "aria-" + e.slice(4).toLowerCase();
} });
function Li(n, e) {
  return e in n ? n[e] : e;
}
function Oi(n, e) {
  return Li(n, e.toLowerCase());
}
const ba = Je({ attributes: { acceptcharset: "accept-charset", classname: "class", htmlfor: "for", httpequiv: "http-equiv" }, mustUseProperty: ["checked", "multiple", "muted", "selected"], properties: { abbr: null, accept: Fe, acceptCharset: j, accessKey: j, action: null, allow: null, allowFullScreen: R, allowPaymentRequest: R, allowUserMedia: R, alt: null, as: null, async: R, autoCapitalize: null, autoComplete: j, autoFocus: R, autoPlay: R, blocking: j, capture: null, charSet: null, checked: R, cite: null, className: j, cols: S, colSpan: null, content: null, contentEditable: W, controls: R, controlsList: j, coords: S | Fe, crossOrigin: null, data: null, dateTime: null, decoding: null, default: R, defer: R, dir: null, dirName: null, disabled: R, download: Ri, draggable: W, encType: null, enterKeyHint: null, fetchPriority: null, form: null, formAction: null, formEncType: null, formMethod: null, formNoValidate: R, formTarget: null, headers: j, height: S, hidden: R, high: S, href: null, hrefLang: null, htmlFor: j, httpEquiv: j, id: null, imageSizes: null, imageSrcSet: null, inert: R, inputMode: null, integrity: null, is: null, isMap: R, itemId: null, itemProp: j, itemRef: j, itemScope: R, itemType: j, kind: null, label: null, lang: null, language: null, list: null, loading: null, loop: R, low: S, manifest: null, max: null, maxLength: S, media: null, method: null, min: null, minLength: S, multiple: R, muted: R, name: null, nonce: null, noModule: R, noValidate: R, onAbort: null, onAfterPrint: null, onAuxClick: null, onBeforeMatch: null, onBeforePrint: null, onBeforeToggle: null, onBeforeUnload: null, onBlur: null, onCancel: null, onCanPlay: null, onCanPlayThrough: null, onChange: null, onClick: null, onClose: null, onContextLost: null, onContextMenu: null, onContextRestored: null, onCopy: null, onCueChange: null, onCut: null, onDblClick: null, onDrag: null, onDragEnd: null, onDragEnter: null, onDragExit: null, onDragLeave: null, onDragOver: null, onDragStart: null, onDrop: null, onDurationChange: null, onEmptied: null, onEnded: null, onError: null, onFocus: null, onFormData: null, onHashChange: null, onInput: null, onInvalid: null, onKeyDown: null, onKeyPress: null, onKeyUp: null, onLanguageChange: null, onLoad: null, onLoadedData: null, onLoadedMetadata: null, onLoadEnd: null, onLoadStart: null, onMessage: null, onMessageError: null, onMouseDown: null, onMouseEnter: null, onMouseLeave: null, onMouseMove: null, onMouseOut: null, onMouseOver: null, onMouseUp: null, onOffline: null, onOnline: null, onPageHide: null, onPageShow: null, onPaste: null, onPause: null, onPlay: null, onPlaying: null, onPopState: null, onProgress: null, onRateChange: null, onRejectionHandled: null, onReset: null, onResize: null, onScroll: null, onScrollEnd: null, onSecurityPolicyViolation: null, onSeeked: null, onSeeking: null, onSelect: null, onSlotChange: null, onStalled: null, onStorage: null, onSubmit: null, onSuspend: null, onTimeUpdate: null, onToggle: null, onUnhandledRejection: null, onUnload: null, onVolumeChange: null, onWaiting: null, onWheel: null, open: R, optimum: S, pattern: null, ping: j, placeholder: null, playsInline: R, popover: null, popoverTarget: null, popoverTargetAction: null, poster: null, preload: null, readOnly: R, referrerPolicy: null, rel: j, required: R, reversed: R, rows: S, rowSpan: S, sandbox: j, scope: null, scoped: R, seamless: R, selected: R, shadowRootClonable: R, shadowRootDelegatesFocus: R, shadowRootMode: null, shape: null, size: S, sizes: null, slot: null, span: S, spellCheck: W, src: null, srcDoc: null, srcLang: null, srcSet: null, start: S, step: null, style: null, tabIndex: S, target: null, title: null, translate: null, type: null, typeMustMatch: R, useMap: null, value: W, width: S, wrap: null, writingSuggestions: null, align: null, aLink: null, archive: j, axis: null, background: null, bgColor: null, border: S, borderColor: null, bottomMargin: S, cellPadding: null, cellSpacing: null, char: null, charOff: null, classId: null, clear: null, code: null, codeBase: null, codeType: null, color: null, compact: R, declare: R, event: null, face: null, frame: null, frameBorder: null, hSpace: S, leftMargin: S, link: null, longDesc: null, lowSrc: null, marginHeight: S, marginWidth: S, noResize: R, noHref: R, noShade: R, noWrap: R, object: null, profile: null, prompt: null, rev: null, rightMargin: S, rules: null, scheme: null, scrolling: W, standby: null, summary: null, text: null, topMargin: S, valueType: null, version: null, vAlign: null, vLink: null, vSpace: S, allowTransparency: null, autoCorrect: null, autoSave: null, disablePictureInPicture: R, disableRemotePlayback: R, prefix: null, property: null, results: S, security: null, unselectable: null }, space: "html", transform: Oi }), wa = Je({ attributes: { accentHeight: "accent-height", alignmentBaseline: "alignment-baseline", arabicForm: "arabic-form", baselineShift: "baseline-shift", capHeight: "cap-height", className: "class", clipPath: "clip-path", clipRule: "clip-rule", colorInterpolation: "color-interpolation", colorInterpolationFilters: "color-interpolation-filters", colorProfile: "color-profile", colorRendering: "color-rendering", crossOrigin: "crossorigin", dataType: "datatype", dominantBaseline: "dominant-baseline", enableBackground: "enable-background", fillOpacity: "fill-opacity", fillRule: "fill-rule", floodColor: "flood-color", floodOpacity: "flood-opacity", fontFamily: "font-family", fontSize: "font-size", fontSizeAdjust: "font-size-adjust", fontStretch: "font-stretch", fontStyle: "font-style", fontVariant: "font-variant", fontWeight: "font-weight", glyphName: "glyph-name", glyphOrientationHorizontal: "glyph-orientation-horizontal", glyphOrientationVertical: "glyph-orientation-vertical", hrefLang: "hreflang", horizAdvX: "horiz-adv-x", horizOriginX: "horiz-origin-x", horizOriginY: "horiz-origin-y", imageRendering: "image-rendering", letterSpacing: "letter-spacing", lightingColor: "lighting-color", markerEnd: "marker-end", markerMid: "marker-mid", markerStart: "marker-start", navDown: "nav-down", navDownLeft: "nav-down-left", navDownRight: "nav-down-right", navLeft: "nav-left", navNext: "nav-next", navPrev: "nav-prev", navRight: "nav-right", navUp: "nav-up", navUpLeft: "nav-up-left", navUpRight: "nav-up-right", onAbort: "onabort", onActivate: "onactivate", onAfterPrint: "onafterprint", onBeforePrint: "onbeforeprint", onBegin: "onbegin", onCancel: "oncancel", onCanPlay: "oncanplay", onCanPlayThrough: "oncanplaythrough", onChange: "onchange", onClick: "onclick", onClose: "onclose", onCopy: "oncopy", onCueChange: "oncuechange", onCut: "oncut", onDblClick: "ondblclick", onDrag: "ondrag", onDragEnd: "ondragend", onDragEnter: "ondragenter", onDragExit: "ondragexit", onDragLeave: "ondragleave", onDragOver: "ondragover", onDragStart: "ondragstart", onDrop: "ondrop", onDurationChange: "ondurationchange", onEmptied: "onemptied", onEnd: "onend", onEnded: "onended", onError: "onerror", onFocus: "onfocus", onFocusIn: "onfocusin", onFocusOut: "onfocusout", onHashChange: "onhashchange", onInput: "oninput", onInvalid: "oninvalid", onKeyDown: "onkeydown", onKeyPress: "onkeypress", onKeyUp: "onkeyup", onLoad: "onload", onLoadedData: "onloadeddata", onLoadedMetadata: "onloadedmetadata", onLoadStart: "onloadstart", onMessage: "onmessage", onMouseDown: "onmousedown", onMouseEnter: "onmouseenter", onMouseLeave: "onmouseleave", onMouseMove: "onmousemove", onMouseOut: "onmouseout", onMouseOver: "onmouseover", onMouseUp: "onmouseup", onMouseWheel: "onmousewheel", onOffline: "onoffline", onOnline: "ononline", onPageHide: "onpagehide", onPageShow: "onpageshow", onPaste: "onpaste", onPause: "onpause", onPlay: "onplay", onPlaying: "onplaying", onPopState: "onpopstate", onProgress: "onprogress", onRateChange: "onratechange", onRepeat: "onrepeat", onReset: "onreset", onResize: "onresize", onScroll: "onscroll", onSeeked: "onseeked", onSeeking: "onseeking", onSelect: "onselect", onShow: "onshow", onStalled: "onstalled", onStorage: "onstorage", onSubmit: "onsubmit", onSuspend: "onsuspend", onTimeUpdate: "ontimeupdate", onToggle: "ontoggle", onUnload: "onunload", onVolumeChange: "onvolumechange", onWaiting: "onwaiting", onZoom: "onzoom", overlinePosition: "overline-position", overlineThickness: "overline-thickness", paintOrder: "paint-order", panose1: "panose-1", pointerEvents: "pointer-events", referrerPolicy: "referrerpolicy", renderingIntent: "rendering-intent", shapeRendering: "shape-rendering", stopColor: "stop-color", stopOpacity: "stop-opacity", strikethroughPosition: "strikethrough-position", strikethroughThickness: "strikethrough-thickness", strokeDashArray: "stroke-dasharray", strokeDashOffset: "stroke-dashoffset", strokeLineCap: "stroke-linecap", strokeLineJoin: "stroke-linejoin", strokeMiterLimit: "stroke-miterlimit", strokeOpacity: "stroke-opacity", strokeWidth: "stroke-width", tabIndex: "tabindex", textAnchor: "text-anchor", textDecoration: "text-decoration", textRendering: "text-rendering", transformOrigin: "transform-origin", typeOf: "typeof", underlinePosition: "underline-position", underlineThickness: "underline-thickness", unicodeBidi: "unicode-bidi", unicodeRange: "unicode-range", unitsPerEm: "units-per-em", vAlphabetic: "v-alphabetic", vHanging: "v-hanging", vIdeographic: "v-ideographic", vMathematical: "v-mathematical", vectorEffect: "vector-effect", vertAdvY: "vert-adv-y", vertOriginX: "vert-origin-x", vertOriginY: "vert-origin-y", wordSpacing: "word-spacing", writingMode: "writing-mode", xHeight: "x-height", playbackOrder: "playbackorder", timelineBegin: "timelinebegin" }, properties: { about: Z, accentHeight: S, accumulate: null, additive: null, alignmentBaseline: null, alphabetic: S, amplitude: S, arabicForm: null, ascent: S, attributeName: null, attributeType: null, azimuth: S, bandwidth: null, baselineShift: null, baseFrequency: null, baseProfile: null, bbox: null, begin: null, bias: S, by: null, calcMode: null, capHeight: S, className: j, clip: null, clipPath: null, clipPathUnits: null, clipRule: null, color: null, colorInterpolation: null, colorInterpolationFilters: null, colorProfile: null, colorRendering: null, content: null, contentScriptType: null, contentStyleType: null, crossOrigin: null, cursor: null, cx: null, cy: null, d: null, dataType: null, defaultAction: null, descent: S, diffuseConstant: S, direction: null, display: null, dur: null, divisor: S, dominantBaseline: null, download: R, dx: null, dy: null, edgeMode: null, editable: null, elevation: S, enableBackground: null, end: null, event: null, exponent: S, externalResourcesRequired: null, fill: null, fillOpacity: S, fillRule: null, filter: null, filterRes: null, filterUnits: null, floodColor: null, floodOpacity: null, focusable: null, focusHighlight: null, fontFamily: null, fontSize: null, fontSizeAdjust: null, fontStretch: null, fontStyle: null, fontVariant: null, fontWeight: null, format: null, fr: null, from: null, fx: null, fy: null, g1: Fe, g2: Fe, glyphName: Fe, glyphOrientationHorizontal: null, glyphOrientationVertical: null, glyphRef: null, gradientTransform: null, gradientUnits: null, handler: null, hanging: S, hatchContentUnits: null, hatchUnits: null, height: null, href: null, hrefLang: null, horizAdvX: S, horizOriginX: S, horizOriginY: S, id: null, ideographic: S, imageRendering: null, initialVisibility: null, in: null, in2: null, intercept: S, k: S, k1: S, k2: S, k3: S, k4: S, kernelMatrix: Z, kernelUnitLength: null, keyPoints: null, keySplines: null, keyTimes: null, kerning: null, lang: null, lengthAdjust: null, letterSpacing: null, lightingColor: null, limitingConeAngle: S, local: null, markerEnd: null, markerMid: null, markerStart: null, markerHeight: null, markerUnits: null, markerWidth: null, mask: null, maskContentUnits: null, maskUnits: null, mathematical: null, max: null, media: null, mediaCharacterEncoding: null, mediaContentEncodings: null, mediaSize: S, mediaTime: null, method: null, min: null, mode: null, name: null, navDown: null, navDownLeft: null, navDownRight: null, navLeft: null, navNext: null, navPrev: null, navRight: null, navUp: null, navUpLeft: null, navUpRight: null, numOctaves: null, observer: null, offset: null, onAbort: null, onActivate: null, onAfterPrint: null, onBeforePrint: null, onBegin: null, onCancel: null, onCanPlay: null, onCanPlayThrough: null, onChange: null, onClick: null, onClose: null, onCopy: null, onCueChange: null, onCut: null, onDblClick: null, onDrag: null, onDragEnd: null, onDragEnter: null, onDragExit: null, onDragLeave: null, onDragOver: null, onDragStart: null, onDrop: null, onDurationChange: null, onEmptied: null, onEnd: null, onEnded: null, onError: null, onFocus: null, onFocusIn: null, onFocusOut: null, onHashChange: null, onInput: null, onInvalid: null, onKeyDown: null, onKeyPress: null, onKeyUp: null, onLoad: null, onLoadedData: null, onLoadedMetadata: null, onLoadStart: null, onMessage: null, onMouseDown: null, onMouseEnter: null, onMouseLeave: null, onMouseMove: null, onMouseOut: null, onMouseOver: null, onMouseUp: null, onMouseWheel: null, onOffline: null, onOnline: null, onPageHide: null, onPageShow: null, onPaste: null, onPause: null, onPlay: null, onPlaying: null, onPopState: null, onProgress: null, onRateChange: null, onRepeat: null, onReset: null, onResize: null, onScroll: null, onSeeked: null, onSeeking: null, onSelect: null, onShow: null, onStalled: null, onStorage: null, onSubmit: null, onSuspend: null, onTimeUpdate: null, onToggle: null, onUnload: null, onVolumeChange: null, onWaiting: null, onZoom: null, opacity: null, operator: null, order: null, orient: null, orientation: null, origin: null, overflow: null, overlay: null, overlinePosition: S, overlineThickness: S, paintOrder: null, panose1: null, path: null, pathLength: S, patternContentUnits: null, patternTransform: null, patternUnits: null, phase: null, ping: j, pitch: null, playbackOrder: null, pointerEvents: null, points: null, pointsAtX: S, pointsAtY: S, pointsAtZ: S, preserveAlpha: null, preserveAspectRatio: null, primitiveUnits: null, propagate: null, property: Z, r: null, radius: null, referrerPolicy: null, refX: null, refY: null, rel: Z, rev: Z, renderingIntent: null, repeatCount: null, repeatDur: null, requiredExtensions: Z, requiredFeatures: Z, requiredFonts: Z, requiredFormats: Z, resource: null, restart: null, result: null, rotate: null, rx: null, ry: null, scale: null, seed: null, shapeRendering: null, side: null, slope: null, snapshotTime: null, specularConstant: S, specularExponent: S, spreadMethod: null, spacing: null, startOffset: null, stdDeviation: null, stemh: null, stemv: null, stitchTiles: null, stopColor: null, stopOpacity: null, strikethroughPosition: S, strikethroughThickness: S, string: null, stroke: null, strokeDashArray: Z, strokeDashOffset: null, strokeLineCap: null, strokeLineJoin: null, strokeMiterLimit: S, strokeOpacity: S, strokeWidth: null, style: null, surfaceScale: S, syncBehavior: null, syncBehaviorDefault: null, syncMaster: null, syncTolerance: null, syncToleranceDefault: null, systemLanguage: Z, tabIndex: S, tableValues: null, target: null, targetX: S, targetY: S, textAnchor: null, textDecoration: null, textRendering: null, textLength: null, timelineBegin: null, title: null, transformBehavior: null, type: null, typeOf: Z, to: null, transform: null, transformOrigin: null, u1: null, u2: null, underlinePosition: S, underlineThickness: S, unicode: null, unicodeBidi: null, unicodeRange: null, unitsPerEm: S, values: null, vAlphabetic: S, vMathematical: S, vectorEffect: null, vHanging: S, vIdeographic: S, version: null, vertAdvY: S, vertOriginX: S, vertOriginY: S, viewBox: null, viewTarget: null, visibility: null, width: null, widths: null, wordSpacing: null, writingMode: null, x: null, x1: null, x2: null, xChannelSelector: null, xHeight: S, y: null, y1: null, y2: null, yChannelSelector: null, z: null, zoomAndPan: null }, space: "svg", transform: Li }), Pi = Je({ properties: { xLinkActuate: null, xLinkArcRole: null, xLinkHref: null, xLinkRole: null, xLinkShow: null, xLinkTitle: null, xLinkType: null }, space: "xlink", transform(n, e) {
  return "xlink:" + e.slice(5).toLowerCase();
} }), Ni = Je({ attributes: { xmlnsxlink: "xmlns:xlink" }, properties: { xmlnsXLink: null, xmlns: null }, space: "xmlns", transform: Oi }), Ii = Je({ properties: { xmlBase: null, xmlLang: null, xmlSpace: null }, space: "xml", transform(n, e) {
  return "xml:" + e.slice(3).toLowerCase();
} }), Sa = /[A-Z]/g, Nr = /-[a-z]/g, Ca = /^data[-\w.:]+$/i;
function _a2(n, e) {
  const t = Bn(e);
  let r = e, i = Q;
  if (t in n.normal) return n.property[n.normal[t]];
  if (t.length > 4 && t.slice(0, 4) === "data" && Ca.test(e)) {
    if (e.charAt(4) === "-") {
      const o = e.slice(5).replace(Nr, Ta);
      r = "data" + o.charAt(0).toUpperCase() + o.slice(1);
    } else {
      const o = e.slice(4);
      if (!Nr.test(o)) {
        let s = o.replace(Sa, xa);
        s.charAt(0) !== "-" && (s = "-" + s), e = "data" + s;
      }
    }
    i = Xn;
  }
  return new i(r, e);
}
function xa(n) {
  return "-" + n.toLowerCase();
}
function Ta(n) {
  return n.charAt(1).toUpperCase();
}
const Ea = Ai([ki, ba, Pi, Ni, Ii], "html"), Mi = Ai([ki, wa, Pi, Ni, Ii], "svg"), Ir = {}.hasOwnProperty;
function Aa(n, e) {
  const t = e || {};
  function r(i, ...o) {
    let s = r.invalid;
    const l = r.handlers;
    if (i && Ir.call(i, n)) {
      const a = String(i[n]);
      s = Ir.call(l, a) ? l[a] : r.unknown;
    }
    if (s) return s.call(this, i, ...o);
  }
  return r.handlers = t.handlers || {}, r.invalid = t.invalid, r.unknown = t.unknown, r;
}
const Ra = /["&'<>`]/g, ka = /[\uD800-\uDBFF][\uDC00-\uDFFF]/g, La = /[\x01-\t\v\f\x0E-\x1F\x7F\x81\x8D\x8F\x90\x9D\xA0-\uFFFF]/g, Oa = /[|\\{}()[\]^$+*?.]/g, Mr = /* @__PURE__ */ new WeakMap();
function Pa(n, e) {
  if (n = n.replace(e.subset ? Na(e.subset) : Ra, r), e.subset || e.escapeOnly) return n;
  return n.replace(ka, t).replace(La, r);
  function t(i, o, s) {
    return e.format((i.charCodeAt(0) - 55296) * 1024 + i.charCodeAt(1) - 56320 + 65536, s.charCodeAt(o + 2), e);
  }
  function r(i, o, s) {
    return e.format(i.charCodeAt(0), s.charCodeAt(o + 1), e);
  }
}
function Na(n) {
  let e = Mr.get(n);
  return e || (e = Ia(n), Mr.set(n, e)), e;
}
function Ia(n) {
  const e = [];
  let t = -1;
  for (; ++t < n.length; ) e.push(n[t].replace(Oa, "\\$&"));
  return new RegExp("(?:" + e.join("|") + ")", "g");
}
const Ma = /[\dA-Fa-f]/;
function Da(n, e, t) {
  const r = "&#x" + n.toString(16).toUpperCase();
  return t && e && !Ma.test(String.fromCharCode(e)) ? r : r + ";";
}
const Ba = /\d/;
function ja(n, e, t) {
  const r = "&#" + String(n);
  return t && e && !Ba.test(String.fromCharCode(e)) ? r : r + ";";
}
const $a = ["AElig", "AMP", "Aacute", "Acirc", "Agrave", "Aring", "Atilde", "Auml", "COPY", "Ccedil", "ETH", "Eacute", "Ecirc", "Egrave", "Euml", "GT", "Iacute", "Icirc", "Igrave", "Iuml", "LT", "Ntilde", "Oacute", "Ocirc", "Ograve", "Oslash", "Otilde", "Ouml", "QUOT", "REG", "THORN", "Uacute", "Ucirc", "Ugrave", "Uuml", "Yacute", "aacute", "acirc", "acute", "aelig", "agrave", "amp", "aring", "atilde", "auml", "brvbar", "ccedil", "cedil", "cent", "copy", "curren", "deg", "divide", "eacute", "ecirc", "egrave", "eth", "euml", "frac12", "frac14", "frac34", "gt", "iacute", "icirc", "iexcl", "igrave", "iquest", "iuml", "laquo", "lt", "macr", "micro", "middot", "nbsp", "not", "ntilde", "oacute", "ocirc", "ograve", "ordf", "ordm", "oslash", "otilde", "ouml", "para", "plusmn", "pound", "quot", "raquo", "reg", "sect", "shy", "sup1", "sup2", "sup3", "szlig", "thorn", "times", "uacute", "ucirc", "ugrave", "uml", "uuml", "yacute", "yen", "yuml"], Sn = { nbsp: "\xA0", iexcl: "\xA1", cent: "\xA2", pound: "\xA3", curren: "\xA4", yen: "\xA5", brvbar: "\xA6", sect: "\xA7", uml: "\xA8", copy: "\xA9", ordf: "\xAA", laquo: "\xAB", not: "\xAC", shy: "\xAD", reg: "\xAE", macr: "\xAF", deg: "\xB0", plusmn: "\xB1", sup2: "\xB2", sup3: "\xB3", acute: "\xB4", micro: "\xB5", para: "\xB6", middot: "\xB7", cedil: "\xB8", sup1: "\xB9", ordm: "\xBA", raquo: "\xBB", frac14: "\xBC", frac12: "\xBD", frac34: "\xBE", iquest: "\xBF", Agrave: "\xC0", Aacute: "\xC1", Acirc: "\xC2", Atilde: "\xC3", Auml: "\xC4", Aring: "\xC5", AElig: "\xC6", Ccedil: "\xC7", Egrave: "\xC8", Eacute: "\xC9", Ecirc: "\xCA", Euml: "\xCB", Igrave: "\xCC", Iacute: "\xCD", Icirc: "\xCE", Iuml: "\xCF", ETH: "\xD0", Ntilde: "\xD1", Ograve: "\xD2", Oacute: "\xD3", Ocirc: "\xD4", Otilde: "\xD5", Ouml: "\xD6", times: "\xD7", Oslash: "\xD8", Ugrave: "\xD9", Uacute: "\xDA", Ucirc: "\xDB", Uuml: "\xDC", Yacute: "\xDD", THORN: "\xDE", szlig: "\xDF", agrave: "\xE0", aacute: "\xE1", acirc: "\xE2", atilde: "\xE3", auml: "\xE4", aring: "\xE5", aelig: "\xE6", ccedil: "\xE7", egrave: "\xE8", eacute: "\xE9", ecirc: "\xEA", euml: "\xEB", igrave: "\xEC", iacute: "\xED", icirc: "\xEE", iuml: "\xEF", eth: "\xF0", ntilde: "\xF1", ograve: "\xF2", oacute: "\xF3", ocirc: "\xF4", otilde: "\xF5", ouml: "\xF6", divide: "\xF7", oslash: "\xF8", ugrave: "\xF9", uacute: "\xFA", ucirc: "\xFB", uuml: "\xFC", yacute: "\xFD", thorn: "\xFE", yuml: "\xFF", fnof: "\u0192", Alpha: "\u0391", Beta: "\u0392", Gamma: "\u0393", Delta: "\u0394", Epsilon: "\u0395", Zeta: "\u0396", Eta: "\u0397", Theta: "\u0398", Iota: "\u0399", Kappa: "\u039A", Lambda: "\u039B", Mu: "\u039C", Nu: "\u039D", Xi: "\u039E", Omicron: "\u039F", Pi: "\u03A0", Rho: "\u03A1", Sigma: "\u03A3", Tau: "\u03A4", Upsilon: "\u03A5", Phi: "\u03A6", Chi: "\u03A7", Psi: "\u03A8", Omega: "\u03A9", alpha: "\u03B1", beta: "\u03B2", gamma: "\u03B3", delta: "\u03B4", epsilon: "\u03B5", zeta: "\u03B6", eta: "\u03B7", theta: "\u03B8", iota: "\u03B9", kappa: "\u03BA", lambda: "\u03BB", mu: "\u03BC", nu: "\u03BD", xi: "\u03BE", omicron: "\u03BF", pi: "\u03C0", rho: "\u03C1", sigmaf: "\u03C2", sigma: "\u03C3", tau: "\u03C4", upsilon: "\u03C5", phi: "\u03C6", chi: "\u03C7", psi: "\u03C8", omega: "\u03C9", thetasym: "\u03D1", upsih: "\u03D2", piv: "\u03D6", bull: "\u2022", hellip: "\u2026", prime: "\u2032", Prime: "\u2033", oline: "\u203E", frasl: "\u2044", weierp: "\u2118", image: "\u2111", real: "\u211C", trade: "\u2122", alefsym: "\u2135", larr: "\u2190", uarr: "\u2191", rarr: "\u2192", darr: "\u2193", harr: "\u2194", crarr: "\u21B5", lArr: "\u21D0", uArr: "\u21D1", rArr: "\u21D2", dArr: "\u21D3", hArr: "\u21D4", forall: "\u2200", part: "\u2202", exist: "\u2203", empty: "\u2205", nabla: "\u2207", isin: "\u2208", notin: "\u2209", ni: "\u220B", prod: "\u220F", sum: "\u2211", minus: "\u2212", lowast: "\u2217", radic: "\u221A", prop: "\u221D", infin: "\u221E", ang: "\u2220", and: "\u2227", or: "\u2228", cap: "\u2229", cup: "\u222A", int: "\u222B", there4: "\u2234", sim: "\u223C", cong: "\u2245", asymp: "\u2248", ne: "\u2260", equiv: "\u2261", le: "\u2264", ge: "\u2265", sub: "\u2282", sup: "\u2283", nsub: "\u2284", sube: "\u2286", supe: "\u2287", oplus: "\u2295", otimes: "\u2297", perp: "\u22A5", sdot: "\u22C5", lceil: "\u2308", rceil: "\u2309", lfloor: "\u230A", rfloor: "\u230B", lang: "\u2329", rang: "\u232A", loz: "\u25CA", spades: "\u2660", clubs: "\u2663", hearts: "\u2665", diams: "\u2666", quot: '"', amp: "&", lt: "<", gt: ">", OElig: "\u0152", oelig: "\u0153", Scaron: "\u0160", scaron: "\u0161", Yuml: "\u0178", circ: "\u02C6", tilde: "\u02DC", ensp: "\u2002", emsp: "\u2003", thinsp: "\u2009", zwnj: "\u200C", zwj: "\u200D", lrm: "\u200E", rlm: "\u200F", ndash: "\u2013", mdash: "\u2014", lsquo: "\u2018", rsquo: "\u2019", sbquo: "\u201A", ldquo: "\u201C", rdquo: "\u201D", bdquo: "\u201E", dagger: "\u2020", Dagger: "\u2021", permil: "\u2030", lsaquo: "\u2039", rsaquo: "\u203A", euro: "\u20AC" }, Ua = ["cent", "copy", "divide", "gt", "lt", "not", "para", "times"], Di = {}.hasOwnProperty, $n = {};
let $t;
for ($t in Sn) Di.call(Sn, $t) && ($n[Sn[$t]] = $t);
const Wa = /[^\dA-Za-z]/;
function Ga(n, e, t, r) {
  const i = String.fromCharCode(n);
  if (Di.call($n, i)) {
    const o = $n[i], s = "&" + o;
    return t && $a.includes(o) && !Ua.includes(o) && (!r || e && e !== 61 && Wa.test(String.fromCharCode(e))) ? s : s + ";";
  }
  return "";
}
function Ha(n, e, t) {
  let r = Da(n, e, t.omitOptionalSemicolons), i;
  if ((t.useNamedReferences || t.useShortestReferences) && (i = Ga(n, e, t.omitOptionalSemicolons, t.attribute)), (t.useShortestReferences || !i) && t.useShortestReferences) {
    const o = ja(n, e, t.omitOptionalSemicolons);
    o.length < r.length && (r = o);
  }
  return i && (!t.useShortestReferences || i.length < r.length) ? i : r;
}
function ze(n, e) {
  return Pa(n, Object.assign({ format: Ha }, e));
}
const Fa = /^>|^->|<!--|-->|--!>|<!-$/g, za = [">"], qa = ["<", ">"];
function Va(n, e, t, r) {
  return r.settings.bogusComments ? "<?" + ze(n.value, Object.assign({}, r.settings.characterReferences, { subset: za })) + ">" : "<!--" + n.value.replace(Fa, i) + "-->";
  function i(o) {
    return ze(o, Object.assign({}, r.settings.characterReferences, { subset: qa }));
  }
}
function Ya(n, e, t, r) {
  return "<!" + (r.settings.upperDoctype ? "DOCTYPE" : "doctype") + (r.settings.tightDoctype ? "" : " ") + "html>";
}
function Dr(n, e) {
  const t = String(n);
  if (typeof e != "string") throw new TypeError("Expected character");
  let r = 0, i = t.indexOf(e);
  for (; i !== -1; ) r++, i = t.indexOf(e, i + e.length);
  return r;
}
function Ka(n, e) {
  const t = e || {};
  return (n[n.length - 1] === "" ? [...n, ""] : n).join((t.padRight ? " " : "") + "," + (t.padLeft === false ? "" : " ")).trim();
}
function Xa(n) {
  return n.join(" ").trim();
}
const Ja = /[ \t\n\f\r]/g;
function Jn(n) {
  return typeof n == "object" ? n.type === "text" ? Br(n.value) : false : Br(n);
}
function Br(n) {
  return n.replace(Ja, "") === "";
}
const H = ji(1), Bi = ji(-1), Qa = [];
function ji(n) {
  return e;
  function e(t, r, i) {
    const o = t ? t.children : Qa;
    let s = (r || 0) + n, l = o[s];
    if (!i) for (; l && Jn(l); ) s += n, l = o[s];
    return l;
  }
}
const Za = {}.hasOwnProperty;
function $i(n) {
  return e;
  function e(t, r, i) {
    return Za.call(n, t.tagName) && n[t.tagName](t, r, i);
  }
}
const Qn = $i({ body: tl, caption: Cn, colgroup: Cn, dd: ol, dt: il, head: Cn, html: el, li: rl, optgroup: sl, option: al, p: nl, rp: jr, rt: jr, tbody: cl, td: $r, tfoot: ul, th: $r, thead: ll, tr: fl });
function Cn(n, e, t) {
  const r = H(t, e, true);
  return !r || r.type !== "comment" && !(r.type === "text" && Jn(r.value.charAt(0)));
}
function el(n, e, t) {
  const r = H(t, e);
  return !r || r.type !== "comment";
}
function tl(n, e, t) {
  const r = H(t, e);
  return !r || r.type !== "comment";
}
function nl(n, e, t) {
  const r = H(t, e);
  return r ? r.type === "element" && (r.tagName === "address" || r.tagName === "article" || r.tagName === "aside" || r.tagName === "blockquote" || r.tagName === "details" || r.tagName === "div" || r.tagName === "dl" || r.tagName === "fieldset" || r.tagName === "figcaption" || r.tagName === "figure" || r.tagName === "footer" || r.tagName === "form" || r.tagName === "h1" || r.tagName === "h2" || r.tagName === "h3" || r.tagName === "h4" || r.tagName === "h5" || r.tagName === "h6" || r.tagName === "header" || r.tagName === "hgroup" || r.tagName === "hr" || r.tagName === "main" || r.tagName === "menu" || r.tagName === "nav" || r.tagName === "ol" || r.tagName === "p" || r.tagName === "pre" || r.tagName === "section" || r.tagName === "table" || r.tagName === "ul") : !t || !(t.type === "element" && (t.tagName === "a" || t.tagName === "audio" || t.tagName === "del" || t.tagName === "ins" || t.tagName === "map" || t.tagName === "noscript" || t.tagName === "video"));
}
function rl(n, e, t) {
  const r = H(t, e);
  return !r || r.type === "element" && r.tagName === "li";
}
function il(n, e, t) {
  const r = H(t, e);
  return !!(r && r.type === "element" && (r.tagName === "dt" || r.tagName === "dd"));
}
function ol(n, e, t) {
  const r = H(t, e);
  return !r || r.type === "element" && (r.tagName === "dt" || r.tagName === "dd");
}
function jr(n, e, t) {
  const r = H(t, e);
  return !r || r.type === "element" && (r.tagName === "rp" || r.tagName === "rt");
}
function sl(n, e, t) {
  const r = H(t, e);
  return !r || r.type === "element" && r.tagName === "optgroup";
}
function al(n, e, t) {
  const r = H(t, e);
  return !r || r.type === "element" && (r.tagName === "option" || r.tagName === "optgroup");
}
function ll(n, e, t) {
  const r = H(t, e);
  return !!(r && r.type === "element" && (r.tagName === "tbody" || r.tagName === "tfoot"));
}
function cl(n, e, t) {
  const r = H(t, e);
  return !r || r.type === "element" && (r.tagName === "tbody" || r.tagName === "tfoot");
}
function ul(n, e, t) {
  return !H(t, e);
}
function fl(n, e, t) {
  const r = H(t, e);
  return !r || r.type === "element" && r.tagName === "tr";
}
function $r(n, e, t) {
  const r = H(t, e);
  return !r || r.type === "element" && (r.tagName === "td" || r.tagName === "th");
}
const hl = $i({ body: gl, colgroup: ml, head: pl, html: dl, tbody: vl });
function dl(n) {
  const e = H(n, -1);
  return !e || e.type !== "comment";
}
function pl(n) {
  const e = /* @__PURE__ */ new Set();
  for (const r of n.children) if (r.type === "element" && (r.tagName === "base" || r.tagName === "title")) {
    if (e.has(r.tagName)) return false;
    e.add(r.tagName);
  }
  const t = n.children[0];
  return !t || t.type === "element";
}
function gl(n) {
  const e = H(n, -1, true);
  return !e || e.type !== "comment" && !(e.type === "text" && Jn(e.value.charAt(0))) && !(e.type === "element" && (e.tagName === "meta" || e.tagName === "link" || e.tagName === "script" || e.tagName === "style" || e.tagName === "template"));
}
function ml(n, e, t) {
  const r = Bi(t, e), i = H(n, -1, true);
  return t && r && r.type === "element" && r.tagName === "colgroup" && Qn(r, t.children.indexOf(r), t) ? false : !!(i && i.type === "element" && i.tagName === "col");
}
function vl(n, e, t) {
  const r = Bi(t, e), i = H(n, -1);
  return t && r && r.type === "element" && (r.tagName === "thead" || r.tagName === "tbody") && Qn(r, t.children.indexOf(r), t) ? false : !!(i && i.type === "element" && i.tagName === "tr");
}
const Ut = { name: [[`	
\f\r &/=>`.split(""), `	
\f\r "&'/=>\``.split("")], [`\0	
\f\r "&'/<=>`.split(""), `\0	
\f\r "&'/<=>\``.split("")]], unquoted: [[`	
\f\r &>`.split(""), `\0	
\f\r "&'<=>\``.split("")], [`\0	
\f\r "&'<=>\``.split(""), `\0	
\f\r "&'<=>\``.split("")]], single: [["&'".split(""), "\"&'`".split("")], ["\0&'".split(""), "\0\"&'`".split("")]], double: [['"&'.split(""), "\"&'`".split("")], ['\0"&'.split(""), "\0\"&'`".split("")]] };
function yl(n, e, t, r) {
  const i = r.schema, o = i.space === "svg" ? false : r.settings.omitOptionalTags;
  let s = i.space === "svg" ? r.settings.closeEmptyElements : r.settings.voids.includes(n.tagName.toLowerCase());
  const l = [];
  let a;
  i.space === "html" && n.tagName === "svg" && (r.schema = Mi);
  const c = bl(r, n.properties), u = r.all(i.space === "html" && n.tagName === "template" ? n.content : n);
  return r.schema = i, u && (s = false), (c || !o || !hl(n, e, t)) && (l.push("<", n.tagName, c ? " " + c : ""), s && (i.space === "svg" || r.settings.closeSelfClosing) && (a = c.charAt(c.length - 1), (!r.settings.tightSelfClosing || a === "/" || a && a !== '"' && a !== "'") && l.push(" "), l.push("/")), l.push(">")), l.push(u), !s && (!o || !Qn(n, e, t)) && l.push("</" + n.tagName + ">"), l.join("");
}
function bl(n, e) {
  const t = [];
  let r = -1, i;
  if (e) {
    for (i in e) if (e[i] !== null && e[i] !== void 0) {
      const o = wl(n, i, e[i]);
      o && t.push(o);
    }
  }
  for (; ++r < t.length; ) {
    const o = n.settings.tightAttributes ? t[r].charAt(t[r].length - 1) : void 0;
    r !== t.length - 1 && o !== '"' && o !== "'" && (t[r] += " ");
  }
  return t.join("");
}
function wl(n, e, t) {
  const r = _a2(n.schema, e), i = n.settings.allowParseErrors && n.schema.space === "html" ? 0 : 1, o = n.settings.allowDangerousCharacters ? 0 : 1;
  let s = n.quote, l;
  if (r.overloadedBoolean && (t === r.attribute || t === "") ? t = true : (r.boolean || r.overloadedBoolean) && (typeof t != "string" || t === r.attribute || t === "") && (t = !!t), t == null || t === false || typeof t == "number" && Number.isNaN(t)) return "";
  const a = ze(r.attribute, Object.assign({}, n.settings.characterReferences, { subset: Ut.name[i][o] }));
  return t === true || (t = Array.isArray(t) ? (r.commaSeparated ? Ka : Xa)(t, { padLeft: !n.settings.tightCommaSeparatedLists }) : String(t), n.settings.collapseEmptyAttributes && !t) ? a : (n.settings.preferUnquoted && (l = ze(t, Object.assign({}, n.settings.characterReferences, { attribute: true, subset: Ut.unquoted[i][o] }))), l !== t && (n.settings.quoteSmart && Dr(t, s) > Dr(t, n.alternative) && (s = n.alternative), l = s + ze(t, Object.assign({}, n.settings.characterReferences, { subset: (s === "'" ? Ut.single : Ut.double)[i][o], attribute: true })) + s), a + (l && "=" + l));
}
const Sl = ["<", "&"];
function Ui(n, e, t, r) {
  return t && t.type === "element" && (t.tagName === "script" || t.tagName === "style") ? n.value : ze(n.value, Object.assign({}, r.settings.characterReferences, { subset: Sl }));
}
function Cl(n, e, t, r) {
  return r.settings.allowDangerousHtml ? n.value : Ui(n, e, t, r);
}
function _l(n, e, t, r) {
  return r.all(n);
}
const xl = Aa("type", { invalid: Tl, unknown: El, handlers: { comment: Va, doctype: Ya, element: yl, raw: Cl, root: _l, text: Ui } });
function Tl(n) {
  throw new Error("Expected node, not `" + n + "`");
}
function El(n) {
  const e = n;
  throw new Error("Cannot compile unknown node `" + e.type + "`");
}
const Al = {}, Rl = {}, kl = [];
function Ll(n, e) {
  const t = e || Al, r = t.quote || '"', i = r === '"' ? "'" : '"';
  if (r !== '"' && r !== "'") throw new Error("Invalid quote `" + r + "`, expected `'` or `\"`");
  return { one: Ol, all: Pl, settings: { omitOptionalTags: t.omitOptionalTags || false, allowParseErrors: t.allowParseErrors || false, allowDangerousCharacters: t.allowDangerousCharacters || false, quoteSmart: t.quoteSmart || false, preferUnquoted: t.preferUnquoted || false, tightAttributes: t.tightAttributes || false, upperDoctype: t.upperDoctype || false, tightDoctype: t.tightDoctype || false, bogusComments: t.bogusComments || false, tightCommaSeparatedLists: t.tightCommaSeparatedLists || false, tightSelfClosing: t.tightSelfClosing || false, collapseEmptyAttributes: t.collapseEmptyAttributes || false, allowDangerousHtml: t.allowDangerousHtml || false, voids: t.voids || va, characterReferences: t.characterReferences || Rl, closeSelfClosing: t.closeSelfClosing || false, closeEmptyElements: t.closeEmptyElements || false }, schema: t.space === "svg" ? Mi : Ea, quote: r, alternative: i }.one(Array.isArray(n) ? { type: "root", children: n } : n, void 0, void 0);
}
function Ol(n, e, t) {
  return xl(n, e, t, this);
}
function Pl(n) {
  const e = [], t = n && n.children || kl;
  let r = -1;
  for (; ++r < t.length; ) e[r] = this.one(t[r], r, n);
  return e.join("");
}
function Qt(n, e) {
  const t = typeof n == "string" ? {} : { ...n.colorReplacements }, r = typeof n == "string" ? n : n.name;
  for (const [i, o] of Object.entries((e == null ? void 0 : e.colorReplacements) || {})) typeof o == "string" ? t[i] = o : i === r && Object.assign(t, o);
  return t;
}
function Oe(n, e) {
  return n && ((e == null ? void 0 : e[n == null ? void 0 : n.toLowerCase()]) || n);
}
function Nl(n) {
  return Array.isArray(n) ? n : [n];
}
async function Wi(n) {
  return Promise.resolve(typeof n == "function" ? n() : n).then((e) => e.default || e);
}
function Zn(n) {
  return !n || ["plaintext", "txt", "text", "plain"].includes(n);
}
function Il(n) {
  return n === "ansi" || Zn(n);
}
function er(n) {
  return n === "none";
}
function Ml(n) {
  return er(n);
}
function Gi(n, e) {
  var _a3;
  if (!e) return n;
  n.properties || (n.properties = {}), (_a3 = n.properties).class || (_a3.class = []), typeof n.properties.class == "string" && (n.properties.class = n.properties.class.split(/\s+/g)), Array.isArray(n.properties.class) || (n.properties.class = []);
  const t = Array.isArray(e) ? e : e.split(/\s+/g);
  for (const r of t) r && !n.properties.class.includes(r) && n.properties.class.push(r);
  return n;
}
function ln(n, e = false) {
  var _a3;
  const t = n.split(/(\r?\n)/g);
  let r = 0;
  const i = [];
  for (let o = 0; o < t.length; o += 2) {
    const s = e ? t[o] + (t[o + 1] || "") : t[o];
    i.push([s, r]), r += t[o].length, r += ((_a3 = t[o + 1]) == null ? void 0 : _a3.length) || 0;
  }
  return i;
}
function Dl(n) {
  const e = ln(n, true).map(([i]) => i);
  function t(i) {
    if (i === n.length) return { line: e.length - 1, character: e[e.length - 1].length };
    let o = i, s = 0;
    for (const l of e) {
      if (o < l.length) break;
      o -= l.length, s++;
    }
    return { line: s, character: o };
  }
  function r(i, o) {
    let s = 0;
    for (let l = 0; l < i; l++) s += e[l].length;
    return s += o, s;
  }
  return { lines: e, indexToPos: t, posToIndex: r };
}
function Bl(n, e) {
  let t = 0;
  const r = [];
  for (const i of e) i > t && r.push({ ...n, content: n.content.slice(t, i), offset: n.offset + t }), t = i;
  return t < n.content.length && r.push({ ...n, content: n.content.slice(t), offset: n.offset + t }), r;
}
function jl(n, e) {
  const t = Array.from(e instanceof Set ? e : new Set(e)).sort((r, i) => r - i);
  return t.length ? n.map((r) => r.flatMap((i) => {
    const o = t.filter((s) => i.offset < s && s < i.offset + i.content.length).map((s) => s - i.offset).sort((s, l) => s - l);
    return o.length ? Bl(i, o) : i;
  })) : n;
}
function $l(n, e, t, r) {
  const i = { content: n.content, explanation: n.explanation, offset: n.offset }, o = e.map((a) => Hi(n.variants[a])), s = new Set(o.flatMap((a) => Object.keys(a))), l = {};
  return o.forEach((a, c) => {
    for (const u of s) {
      const f = a[u] || "inherit";
      if (c === 0 && r) l[u] = f;
      else {
        const g = u === "color" ? "" : u === "background-color" ? "-bg" : `-${u}`, d = t + e[c] + (u === "color" ? "" : g);
        l[d] = f;
      }
    }
  }), i.htmlStyle = l, i;
}
function Hi(n) {
  const e = {};
  return n.color && (e.color = n.color), n.bgColor && (e["background-color"] = n.bgColor), n.fontStyle && (n.fontStyle & we.Italic && (e["font-style"] = "italic"), n.fontStyle & we.Bold && (e["font-weight"] = "bold"), n.fontStyle & we.Underline && (e["text-decoration"] = "underline")), e;
}
function Ul(n) {
  return typeof n == "string" ? n : Object.entries(n).map(([e, t]) => `${e}:${t}`).join(";");
}
const Fi = /* @__PURE__ */ new WeakMap();
function cn(n, e) {
  Fi.set(n, e);
}
function yt(n) {
  return Fi.get(n);
}
class Qe {
  constructor(...e) {
    __publicField(this, "_stacks", {});
    __publicField(this, "lang");
    if (e.length === 2) {
      const [t, r] = e;
      this.lang = r, this._stacks = t;
    } else {
      const [t, r, i] = e;
      this.lang = r, this._stacks = { [i]: t };
    }
  }
  get themes() {
    return Object.keys(this._stacks);
  }
  get theme() {
    return this.themes[0];
  }
  get _stack() {
    return this._stacks[this.theme];
  }
  static initial(e, t) {
    return new Qe(Object.fromEntries(Nl(t).map((r) => [r, Dn])), e);
  }
  getInternalStack(e = this.theme) {
    return this._stacks[e];
  }
  getScopes(e = this.theme) {
    return Wl(this._stacks[e]);
  }
  toJSON() {
    return { lang: this.lang, theme: this.theme, themes: this.themes, scopes: this.getScopes() };
  }
}
function Wl(n) {
  const e = [], t = /* @__PURE__ */ new Set();
  function r(i) {
    var _a3;
    if (t.has(i)) return;
    t.add(i);
    const o = (_a3 = i == null ? void 0 : i.nameScopesList) == null ? void 0 : _a3.scopeName;
    o && e.push(o), i.parent && r(i.parent);
  }
  return r(n), e;
}
function Gl(n, e) {
  if (!(n instanceof Qe)) throw new Y("Invalid grammar state");
  return n.getInternalStack(e);
}
function Hl() {
  const n = /* @__PURE__ */ new WeakMap();
  function e(t) {
    if (!n.has(t.meta)) {
      let r = function(s) {
        if (typeof s == "number") {
          if (s < 0 || s > t.source.length) throw new Y(`Invalid decoration offset: ${s}. Code length: ${t.source.length}`);
          return { ...i.indexToPos(s), offset: s };
        } else {
          const l = i.lines[s.line];
          if (l === void 0) throw new Y(`Invalid decoration position ${JSON.stringify(s)}. Lines length: ${i.lines.length}`);
          if (s.character < 0 || s.character > l.length) throw new Y(`Invalid decoration position ${JSON.stringify(s)}. Line ${s.line} length: ${l.length}`);
          return { ...s, offset: i.posToIndex(s.line, s.character) };
        }
      };
      const i = Dl(t.source), o = (t.options.decorations || []).map((s) => ({ ...s, start: r(s.start), end: r(s.end) }));
      Fl(o), n.set(t.meta, { decorations: o, converter: i, source: t.source });
    }
    return n.get(t.meta);
  }
  return { name: "shiki:decorations", tokens(t) {
    var _a3;
    if (!((_a3 = this.options.decorations) == null ? void 0 : _a3.length)) return;
    const i = e(this).decorations.flatMap((s) => [s.start.offset, s.end.offset]);
    return jl(t, i);
  }, code(t) {
    var _a3;
    if (!((_a3 = this.options.decorations) == null ? void 0 : _a3.length)) return;
    const r = e(this), i = Array.from(t.children).filter((u) => u.type === "element" && u.tagName === "span");
    if (i.length !== r.converter.lines.length) throw new Y(`Number of lines in code element (${i.length}) does not match the number of lines in the source (${r.converter.lines.length}). Failed to apply decorations.`);
    function o(u, f, g, d) {
      const p = i[u];
      let w = "", m = -1, y = -1;
      if (f === 0 && (m = 0), g === 0 && (y = 0), g === Number.POSITIVE_INFINITY && (y = p.children.length), m === -1 || y === -1) for (let C = 0; C < p.children.length; C++) w += zi(p.children[C]), m === -1 && w.length === f && (m = C + 1), y === -1 && w.length === g && (y = C + 1);
      if (m === -1) throw new Y(`Failed to find start index for decoration ${JSON.stringify(d.start)}`);
      if (y === -1) throw new Y(`Failed to find end index for decoration ${JSON.stringify(d.end)}`);
      const b = p.children.slice(m, y);
      if (!d.alwaysWrap && b.length === p.children.length) l(p, d, "line");
      else if (!d.alwaysWrap && b.length === 1 && b[0].type === "element") l(b[0], d, "token");
      else {
        const C = { type: "element", tagName: "span", properties: {}, children: b };
        l(C, d, "wrapper"), p.children.splice(m, b.length, C);
      }
    }
    function s(u, f) {
      i[u] = l(i[u], f, "line");
    }
    function l(u, f, g) {
      var _a4;
      const d = f.properties || {}, p = f.transform || ((w) => w);
      return u.tagName = f.tagName || "span", u.properties = { ...u.properties, ...d, class: u.properties.class }, ((_a4 = f.properties) == null ? void 0 : _a4.class) && Gi(u, f.properties.class), u = p(u, g) || u, u;
    }
    const a = [], c = r.decorations.sort((u, f) => f.start.offset - u.start.offset || u.end.offset - f.end.offset);
    for (const u of c) {
      const { start: f, end: g } = u;
      if (f.line === g.line) o(f.line, f.character, g.character, u);
      else if (f.line < g.line) {
        o(f.line, f.character, Number.POSITIVE_INFINITY, u);
        for (let d = f.line + 1; d < g.line; d++) a.unshift(() => s(d, u));
        o(g.line, 0, g.character, u);
      }
    }
    a.forEach((u) => u());
  } };
}
function Fl(n) {
  for (let e = 0; e < n.length; e++) {
    const t = n[e];
    if (t.start.offset > t.end.offset) throw new Y(`Invalid decoration range: ${JSON.stringify(t.start)} - ${JSON.stringify(t.end)}`);
    for (let r = e + 1; r < n.length; r++) {
      const i = n[r], o = t.start.offset <= i.start.offset && i.start.offset < t.end.offset, s = t.start.offset < i.end.offset && i.end.offset <= t.end.offset, l = i.start.offset <= t.start.offset && t.start.offset < i.end.offset, a = i.start.offset < t.end.offset && t.end.offset <= i.end.offset;
      if (o || s || l || a) {
        if (o && s || l && a) continue;
        throw new Y(`Decorations ${JSON.stringify(t.start)} and ${JSON.stringify(i.start)} intersect.`);
      }
    }
  }
}
function zi(n) {
  return n.type === "text" ? n.value : n.type === "element" ? n.children.map(zi).join("") : "";
}
const zl = [Hl()];
function Zt(n) {
  return [...n.transformers || [], ...zl];
}
var Pe = ["black", "red", "green", "yellow", "blue", "magenta", "cyan", "white", "brightBlack", "brightRed", "brightGreen", "brightYellow", "brightBlue", "brightMagenta", "brightCyan", "brightWhite"], _n = { 1: "bold", 2: "dim", 3: "italic", 4: "underline", 7: "reverse", 8: "hidden", 9: "strikethrough" };
function ql(n, e) {
  const t = n.indexOf("\x1B", e);
  if (t !== -1 && n[t + 1] === "[") {
    const r = n.indexOf("m", t);
    if (r !== -1) return { sequence: n.substring(t + 2, r).split(";"), startPosition: t, position: r + 1 };
  }
  return { position: n.length };
}
function Ur(n) {
  const e = n.shift();
  if (e === "2") {
    const t = n.splice(0, 3).map((r) => Number.parseInt(r));
    return t.length !== 3 || t.some((r) => Number.isNaN(r)) ? void 0 : { type: "rgb", rgb: t };
  } else if (e === "5") {
    const t = n.shift();
    if (t) return { type: "table", index: Number(t) };
  }
}
function Vl(n) {
  const e = [];
  for (; n.length > 0; ) {
    const t = n.shift();
    if (!t) continue;
    const r = Number.parseInt(t);
    if (!Number.isNaN(r)) if (r === 0) e.push({ type: "resetAll" });
    else if (r <= 9) _n[r] && e.push({ type: "setDecoration", value: _n[r] });
    else if (r <= 29) {
      const i = _n[r - 20];
      i && (e.push({ type: "resetDecoration", value: i }), i === "dim" && e.push({ type: "resetDecoration", value: "bold" }));
    } else if (r <= 37) e.push({ type: "setForegroundColor", value: { type: "named", name: Pe[r - 30] } });
    else if (r === 38) {
      const i = Ur(n);
      i && e.push({ type: "setForegroundColor", value: i });
    } else if (r === 39) e.push({ type: "resetForegroundColor" });
    else if (r <= 47) e.push({ type: "setBackgroundColor", value: { type: "named", name: Pe[r - 40] } });
    else if (r === 48) {
      const i = Ur(n);
      i && e.push({ type: "setBackgroundColor", value: i });
    } else r === 49 ? e.push({ type: "resetBackgroundColor" }) : r === 53 ? e.push({ type: "setDecoration", value: "overline" }) : r === 55 ? e.push({ type: "resetDecoration", value: "overline" }) : r >= 90 && r <= 97 ? e.push({ type: "setForegroundColor", value: { type: "named", name: Pe[r - 90 + 8] } }) : r >= 100 && r <= 107 && e.push({ type: "setBackgroundColor", value: { type: "named", name: Pe[r - 100 + 8] } });
  }
  return e;
}
function Yl() {
  let n = null, e = null, t = /* @__PURE__ */ new Set();
  return { parse(r) {
    const i = [];
    let o = 0;
    do {
      const s = ql(r, o), l = s.sequence ? r.substring(o, s.startPosition) : r.substring(o);
      if (l.length > 0 && i.push({ value: l, foreground: n, background: e, decorations: new Set(t) }), s.sequence) {
        const a = Vl(s.sequence);
        for (const c of a) c.type === "resetAll" ? (n = null, e = null, t.clear()) : c.type === "resetForegroundColor" ? n = null : c.type === "resetBackgroundColor" ? e = null : c.type === "resetDecoration" && t.delete(c.value);
        for (const c of a) c.type === "setForegroundColor" ? n = c.value : c.type === "setBackgroundColor" ? e = c.value : c.type === "setDecoration" && t.add(c.value);
      }
      o = s.position;
    } while (o < r.length);
    return i;
  } };
}
var Kl = { black: "#000000", red: "#bb0000", green: "#00bb00", yellow: "#bbbb00", blue: "#0000bb", magenta: "#ff00ff", cyan: "#00bbbb", white: "#eeeeee", brightBlack: "#555555", brightRed: "#ff5555", brightGreen: "#00ff00", brightYellow: "#ffff55", brightBlue: "#5555ff", brightMagenta: "#ff55ff", brightCyan: "#55ffff", brightWhite: "#ffffff" };
function Xl(n = Kl) {
  function e(l) {
    return n[l];
  }
  function t(l) {
    return `#${l.map((a) => Math.max(0, Math.min(a, 255)).toString(16).padStart(2, "0")).join("")}`;
  }
  let r;
  function i() {
    if (r) return r;
    r = [];
    for (let c = 0; c < Pe.length; c++) r.push(e(Pe[c]));
    let l = [0, 95, 135, 175, 215, 255];
    for (let c = 0; c < 6; c++) for (let u = 0; u < 6; u++) for (let f = 0; f < 6; f++) r.push(t([l[c], l[u], l[f]]));
    let a = 8;
    for (let c = 0; c < 24; c++, a += 10) r.push(t([a, a, a]));
    return r;
  }
  function o(l) {
    return i()[l];
  }
  function s(l) {
    switch (l.type) {
      case "named":
        return e(l.name);
      case "rgb":
        return t(l.rgb);
      case "table":
        return o(l.index);
    }
  }
  return { value: s };
}
function Jl(n, e, t) {
  const r = Qt(n, t), i = ln(e), o = Xl(Object.fromEntries(Pe.map((l) => {
    var _a3;
    return [l, (_a3 = n.colors) == null ? void 0 : _a3[`terminal.ansi${l[0].toUpperCase()}${l.substring(1)}`]];
  }))), s = Yl();
  return i.map((l) => s.parse(l[0]).map((a) => {
    let c, u;
    a.decorations.has("reverse") ? (c = a.background ? o.value(a.background) : n.bg, u = a.foreground ? o.value(a.foreground) : n.fg) : (c = a.foreground ? o.value(a.foreground) : n.fg, u = a.background ? o.value(a.background) : void 0), c = Oe(c, r), u = Oe(u, r), a.decorations.has("dim") && (c = Ql(c));
    let f = we.None;
    return a.decorations.has("bold") && (f |= we.Bold), a.decorations.has("italic") && (f |= we.Italic), a.decorations.has("underline") && (f |= we.Underline), { content: a.value, offset: l[1], color: c, bgColor: u, fontStyle: f };
  }));
}
function Ql(n) {
  const e = n.match(/#([0-9a-f]{3})([0-9a-f]{3})?([0-9a-f]{2})?/);
  if (e) if (e[3]) {
    const r = Math.round(Number.parseInt(e[3], 16) / 2).toString(16).padStart(2, "0");
    return `#${e[1]}${e[2]}${r}`;
  } else return e[2] ? `#${e[1]}${e[2]}80` : `#${Array.from(e[1]).map((r) => `${r}${r}`).join("")}80`;
  const t = n.match(/var\((--[\w-]+-ansi-[\w-]+)\)/);
  return t ? `var(${t[1]}-dim)` : n;
}
function tr(n, e, t = {}) {
  const { lang: r = "text", theme: i = n.getLoadedThemes()[0] } = t;
  if (Zn(r) || er(i)) return ln(e).map((a) => [{ content: a[0], offset: a[1] }]);
  const { theme: o, colorMap: s } = n.setTheme(i);
  if (r === "ansi") return Jl(o, e, t);
  const l = n.getLanguage(r);
  if (t.grammarState) {
    if (t.grammarState.lang !== l.name) throw new Y(`Grammar state language "${t.grammarState.lang}" does not match highlight language "${l.name}"`);
    if (!t.grammarState.themes.includes(o.name)) throw new Y(`Grammar state themes "${t.grammarState.themes}" do not contain highlight theme "${o.name}"`);
  }
  return ec(e, l, o, s, t);
}
function Zl(...n) {
  if (n.length === 2) return yt(n[1]);
  const [e, t, r = {}] = n, { lang: i = "text", theme: o = e.getLoadedThemes()[0] } = r;
  if (Zn(i) || er(o)) throw new Y("Plain language does not have grammar state");
  if (i === "ansi") throw new Y("ANSI language does not have grammar state");
  const { theme: s, colorMap: l } = e.setTheme(o), a = e.getLanguage(i);
  return new Qe(en(t, a, s, l, r).stateStack, a.name, s.name);
}
function ec(n, e, t, r, i) {
  const o = en(n, e, t, r, i), s = new Qe(en(n, e, t, r, i).stateStack, e.name, t.name);
  return cn(o.tokens, s), o.tokens;
}
function en(n, e, t, r, i) {
  const o = Qt(t, i), { tokenizeMaxLineLength: s = 0, tokenizeTimeLimit: l = 500 } = i, a = ln(n);
  let c = i.grammarState ? Gl(i.grammarState, t.name) ?? Dn : i.grammarContextCode != null ? en(i.grammarContextCode, e, t, r, { ...i, grammarState: void 0, grammarContextCode: void 0 }).stateStack : Dn, u = [];
  const f = [];
  for (let g = 0, d = a.length; g < d; g++) {
    const [p, w] = a[g];
    if (p === "") {
      u = [], f.push([]);
      continue;
    }
    if (s > 0 && p.length >= s) {
      u = [], f.push([{ content: p, offset: w, color: "", fontStyle: 0 }]);
      continue;
    }
    let m, y, b;
    i.includeExplanation && (m = e.tokenizeLine(p, c, l), y = m.tokens, b = 0);
    const C = e.tokenizeLine2(p, c, l), h = C.tokens.length / 2;
    for (let x = 0; x < h; x++) {
      const _ = C.tokens[2 * x], k = x + 1 < h ? C.tokens[2 * x + 2] : p.length;
      if (_ === k) continue;
      const L = C.tokens[2 * x + 1], E = Oe(r[Xe.getForeground(L)], o), O = Xe.getFontStyle(L), D = { content: p.substring(_, k), offset: w + _, color: E, fontStyle: O };
      if (i.includeExplanation) {
        const M = [];
        if (i.includeExplanation !== "scopeName") for (const B of t.settings) {
          let $;
          switch (typeof B.scope) {
            case "string":
              $ = B.scope.split(/,/).map((U) => U.trim());
              break;
            case "object":
              $ = B.scope;
              break;
            default:
              continue;
          }
          M.push({ settings: B, selectors: $.map((U) => U.split(/ /)) });
        }
        D.explanation = [];
        let N = 0;
        for (; _ + N < k; ) {
          const B = y[b], $ = p.substring(B.startIndex, B.endIndex);
          N += $.length, D.explanation.push({ content: $, scopes: i.includeExplanation === "scopeName" ? tc(B.scopes) : nc(M, B.scopes) }), b += 1;
        }
      }
      u.push(D);
    }
    f.push(u), u = [], c = C.ruleStack;
  }
  return { tokens: f, stateStack: c };
}
function tc(n) {
  return n.map((e) => ({ scopeName: e }));
}
function nc(n, e) {
  const t = [];
  for (let r = 0, i = e.length; r < i; r++) {
    const o = e[r];
    t[r] = { scopeName: o, themeMatches: ic(n, o, e.slice(0, r)) };
  }
  return t;
}
function Wr(n, e) {
  return n === e || e.substring(0, n.length) === n && e[n.length] === ".";
}
function rc(n, e, t) {
  if (!Wr(n[n.length - 1], e)) return false;
  let r = n.length - 2, i = t.length - 1;
  for (; r >= 0 && i >= 0; ) Wr(n[r], t[i]) && (r -= 1), i -= 1;
  return r === -1;
}
function ic(n, e, t) {
  const r = [];
  for (const { selectors: i, settings: o } of n) for (const s of i) if (rc(s, e, t)) {
    r.push(o);
    break;
  }
  return r;
}
function qi(n, e, t) {
  const r = Object.entries(t.themes).filter((a) => a[1]).map((a) => ({ color: a[0], theme: a[1] })), i = r.map((a) => {
    const c = tr(n, e, { ...t, theme: a.theme }), u = yt(c), f = typeof a.theme == "string" ? a.theme : a.theme.name;
    return { tokens: c, state: u, theme: f };
  }), o = oc(...i.map((a) => a.tokens)), s = o[0].map((a, c) => a.map((u, f) => {
    const g = { content: u.content, variants: {}, offset: u.offset };
    return "includeExplanation" in t && t.includeExplanation && (g.explanation = u.explanation), o.forEach((d, p) => {
      const { content: w, explanation: m, offset: y, ...b } = d[c][f];
      g.variants[r[p].color] = b;
    }), g;
  })), l = i[0].state ? new Qe(Object.fromEntries(i.map((a) => {
    var _a3;
    return [a.theme, (_a3 = a.state) == null ? void 0 : _a3.getInternalStack(a.theme)];
  })), i[0].state.lang) : void 0;
  return l && cn(s, l), s;
}
function oc(...n) {
  const e = n.map(() => []), t = n.length;
  for (let r = 0; r < n[0].length; r++) {
    const i = n.map((a) => a[r]), o = e.map(() => []);
    e.forEach((a, c) => a.push(o[c]));
    const s = i.map(() => 0), l = i.map((a) => a[0]);
    for (; l.every((a) => a); ) {
      const a = Math.min(...l.map((c) => c.content.length));
      for (let c = 0; c < t; c++) {
        const u = l[c];
        u.content.length === a ? (o[c].push(u), s[c] += 1, l[c] = i[c][s[c]]) : (o[c].push({ ...u, content: u.content.slice(0, a) }), l[c] = { ...u, content: u.content.slice(a), offset: u.offset + a });
      }
    }
  }
  return e;
}
function tn(n, e, t) {
  let r, i, o, s, l, a;
  if ("themes" in t) {
    const { defaultColor: c = "light", cssVariablePrefix: u = "--shiki-" } = t, f = Object.entries(t.themes).filter((m) => m[1]).map((m) => ({ color: m[0], theme: m[1] })).sort((m, y) => m.color === c ? -1 : y.color === c ? 1 : 0);
    if (f.length === 0) throw new Y("`themes` option must not be empty");
    const g = qi(n, e, t);
    if (a = yt(g), c && !f.find((m) => m.color === c)) throw new Y(`\`themes\` option must contain the defaultColor key \`${c}\``);
    const d = f.map((m) => n.getTheme(m.theme)), p = f.map((m) => m.color);
    o = g.map((m) => m.map((y) => $l(y, p, u, c))), a && cn(o, a);
    const w = f.map((m) => Qt(m.theme, t));
    i = f.map((m, y) => (y === 0 && c ? "" : `${u + m.color}:`) + (Oe(d[y].fg, w[y]) || "inherit")).join(";"), r = f.map((m, y) => (y === 0 && c ? "" : `${u + m.color}-bg:`) + (Oe(d[y].bg, w[y]) || "inherit")).join(";"), s = `shiki-themes ${d.map((m) => m.name).join(" ")}`, l = c ? void 0 : [i, r].join(";");
  } else if ("theme" in t) {
    const c = Qt(t.theme, t);
    o = tr(n, e, t);
    const u = n.getTheme(t.theme);
    r = Oe(u.bg, c), i = Oe(u.fg, c), s = u.name, a = yt(o);
  } else throw new Y("Invalid options, either `theme` or `themes` must be provided");
  return { tokens: o, fg: i, bg: r, themeName: s, rootStyle: l, grammarState: a };
}
function nn(n, e, t, r = { meta: {}, options: t, codeToHast: (i, o) => nn(n, i, o), codeToTokens: (i, o) => tn(n, i, o) }) {
  var _a3, _b2;
  let i = e;
  for (const d of Zt(t)) i = ((_a3 = d.preprocess) == null ? void 0 : _a3.call(r, i, t)) || i;
  let { tokens: o, fg: s, bg: l, themeName: a, rootStyle: c, grammarState: u } = tn(n, i, t);
  const { mergeWhitespaces: f = true } = t;
  f === true ? o = ac(o) : f === "never" && (o = lc(o));
  const g = { ...r, get source() {
    return i;
  } };
  for (const d of Zt(t)) o = ((_b2 = d.tokens) == null ? void 0 : _b2.call(g, o)) || o;
  return sc(o, { ...t, fg: s, bg: l, themeName: a, rootStyle: c }, g, u);
}
function sc(n, e, t, r = yt(n)) {
  var _a3, _b2, _c2;
  const i = Zt(e), o = [], s = { type: "root", children: [] }, { structure: l = "classic", tabindex: a = "0" } = e;
  let c = { type: "element", tagName: "pre", properties: { class: `shiki ${e.themeName || ""}`, style: e.rootStyle || `background-color:${e.bg};color:${e.fg}`, ...a !== false && a != null ? { tabindex: a.toString() } : {}, ...Object.fromEntries(Array.from(Object.entries(e.meta || {})).filter(([p]) => !p.startsWith("_"))) }, children: [] }, u = { type: "element", tagName: "code", properties: {}, children: o };
  const f = [], g = { ...t, structure: l, addClassToHast: Gi, get source() {
    return t.source;
  }, get tokens() {
    return n;
  }, get options() {
    return e;
  }, get root() {
    return s;
  }, get pre() {
    return c;
  }, get code() {
    return u;
  }, get lines() {
    return f;
  } };
  if (n.forEach((p, w) => {
    var _a4, _b3;
    w && (l === "inline" ? s.children.push({ type: "element", tagName: "br", properties: {}, children: [] }) : l === "classic" && o.push({ type: "text", value: `
` }));
    let m = { type: "element", tagName: "span", properties: { class: "line" }, children: [] }, y = 0;
    for (const b of p) {
      let C = { type: "element", tagName: "span", properties: { ...b.htmlAttrs }, children: [{ type: "text", value: b.content }] };
      const h = Ul(b.htmlStyle || Hi(b));
      h && (C.properties.style = h);
      for (const x of i) C = ((_a4 = x == null ? void 0 : x.span) == null ? void 0 : _a4.call(g, C, w + 1, y, m, b)) || C;
      l === "inline" ? s.children.push(C) : l === "classic" && m.children.push(C), y += b.content.length;
    }
    if (l === "classic") {
      for (const b of i) m = ((_b3 = b == null ? void 0 : b.line) == null ? void 0 : _b3.call(g, m, w + 1)) || m;
      f.push(m), o.push(m);
    }
  }), l === "classic") {
    for (const p of i) u = ((_a3 = p == null ? void 0 : p.code) == null ? void 0 : _a3.call(g, u)) || u;
    c.children.push(u);
    for (const p of i) c = ((_b2 = p == null ? void 0 : p.pre) == null ? void 0 : _b2.call(g, c)) || c;
    s.children.push(c);
  }
  let d = s;
  for (const p of i) d = ((_c2 = p == null ? void 0 : p.root) == null ? void 0 : _c2.call(g, d)) || d;
  return r && cn(d, r), d;
}
function ac(n) {
  return n.map((e) => {
    const t = [];
    let r = "", i = 0;
    return e.forEach((o, s) => {
      const a = !(o.fontStyle && o.fontStyle & we.Underline);
      a && o.content.match(/^\s+$/) && e[s + 1] ? (i || (i = o.offset), r += o.content) : r ? (a ? t.push({ ...o, offset: i, content: r + o.content }) : t.push({ content: r, offset: i }, o), i = 0, r = "") : t.push(o);
    }), t;
  });
}
function lc(n) {
  return n.map((e) => e.flatMap((t) => {
    if (t.content.match(/^\s+$/)) return t;
    const r = t.content.match(/^(\s*)(.*?)(\s*)$/);
    if (!r) return t;
    const [, i, o, s] = r;
    if (!i && !s) return t;
    const l = [{ ...t, offset: t.offset + i.length, content: o }];
    return i && l.unshift({ content: i, offset: t.offset }), s && l.push({ content: s, offset: t.offset + i.length + o.length }), l;
  }));
}
const cc = Ll;
function uc(n, e, t) {
  var _a3;
  const r = { meta: {}, options: t, codeToHast: (o, s) => nn(n, o, s), codeToTokens: (o, s) => tn(n, o, s) };
  let i = cc(nn(n, e, t, r));
  for (const o of Zt(t)) i = ((_a3 = o.postprocess) == null ? void 0 : _a3.call(r, i, t)) || i;
  return i;
}
const Gr = { light: "#333333", dark: "#bbbbbb" }, Hr = { light: "#fffffe", dark: "#1e1e1e" }, Fr = "__shiki_resolved";
function nr(n) {
  var _a3, _b2, _c2, _d, _e;
  if (n == null ? void 0 : n[Fr]) return n;
  const e = { ...n };
  e.tokenColors && !e.settings && (e.settings = e.tokenColors, delete e.tokenColors), e.type || (e.type = "dark"), e.colorReplacements = { ...e.colorReplacements }, e.settings || (e.settings = []);
  let { bg: t, fg: r } = e;
  if (!t || !r) {
    const l = e.settings ? e.settings.find((a) => !a.name && !a.scope) : void 0;
    ((_a3 = l == null ? void 0 : l.settings) == null ? void 0 : _a3.foreground) && (r = l.settings.foreground), ((_b2 = l == null ? void 0 : l.settings) == null ? void 0 : _b2.background) && (t = l.settings.background), !r && ((_c2 = e == null ? void 0 : e.colors) == null ? void 0 : _c2["editor.foreground"]) && (r = e.colors["editor.foreground"]), !t && ((_d = e == null ? void 0 : e.colors) == null ? void 0 : _d["editor.background"]) && (t = e.colors["editor.background"]), r || (r = e.type === "light" ? Gr.light : Gr.dark), t || (t = e.type === "light" ? Hr.light : Hr.dark), e.fg = r, e.bg = t;
  }
  e.settings[0] && e.settings[0].settings && !e.settings[0].scope || e.settings.unshift({ settings: { foreground: e.fg, background: e.bg } });
  let i = 0;
  const o = /* @__PURE__ */ new Map();
  function s(l) {
    var _a4;
    if (o.has(l)) return o.get(l);
    i += 1;
    const a = `#${i.toString(16).padStart(8, "0").toLowerCase()}`;
    return ((_a4 = e.colorReplacements) == null ? void 0 : _a4[`#${a}`]) ? s(l) : (o.set(l, a), a);
  }
  e.settings = e.settings.map((l) => {
    var _a4, _b3;
    const a = ((_a4 = l.settings) == null ? void 0 : _a4.foreground) && !l.settings.foreground.startsWith("#"), c = ((_b3 = l.settings) == null ? void 0 : _b3.background) && !l.settings.background.startsWith("#");
    if (!a && !c) return l;
    const u = { ...l, settings: { ...l.settings } };
    if (a) {
      const f = s(l.settings.foreground);
      e.colorReplacements[f] = l.settings.foreground, u.settings.foreground = f;
    }
    if (c) {
      const f = s(l.settings.background);
      e.colorReplacements[f] = l.settings.background, u.settings.background = f;
    }
    return u;
  });
  for (const l of Object.keys(e.colors || {})) if ((l === "editor.foreground" || l === "editor.background" || l.startsWith("terminal.ansi")) && !((_e = e.colors[l]) == null ? void 0 : _e.startsWith("#"))) {
    const a = s(e.colors[l]);
    e.colorReplacements[a] = e.colors[l], e.colors[l] = a;
  }
  return Object.defineProperty(e, Fr, { enumerable: false, writable: false, value: true }), e;
}
async function Vi(n) {
  return Array.from(new Set((await Promise.all(n.filter((e) => !Il(e)).map(async (e) => await Wi(e).then((t) => Array.isArray(t) ? t : [t])))).flat()));
}
async function Yi(n) {
  return (await Promise.all(n.map(async (t) => Ml(t) ? null : nr(await Wi(t))))).filter((t) => !!t);
}
let fc = 3;
function hc(n, e = 3) {
  e > fc || console.trace(`[SHIKI DEPRECATE]: ${n}`);
}
let He = class extends Error {
  constructor(e) {
    super(e), this.name = "ShikiError";
  }
};
class dc extends ma {
  constructor(e, t, r, i = {}) {
    super(e);
    __publicField(this, "_resolvedThemes", /* @__PURE__ */ new Map());
    __publicField(this, "_resolvedGrammars", /* @__PURE__ */ new Map());
    __publicField(this, "_langMap", /* @__PURE__ */ new Map());
    __publicField(this, "_langGraph", /* @__PURE__ */ new Map());
    __publicField(this, "_textmateThemeCache", /* @__PURE__ */ new WeakMap());
    __publicField(this, "_loadedThemesCache", null);
    __publicField(this, "_loadedLanguagesCache", null);
    this._resolver = e, this._themes = t, this._langs = r, this._alias = i, this._themes.map((o) => this.loadTheme(o)), this.loadLanguages(this._langs);
  }
  getTheme(e) {
    return typeof e == "string" ? this._resolvedThemes.get(e) : this.loadTheme(e);
  }
  loadTheme(e) {
    const t = nr(e);
    return t.name && (this._resolvedThemes.set(t.name, t), this._loadedThemesCache = null), t;
  }
  getLoadedThemes() {
    return this._loadedThemesCache || (this._loadedThemesCache = [...this._resolvedThemes.keys()]), this._loadedThemesCache;
  }
  setTheme(e) {
    let t = this._textmateThemeCache.get(e);
    t || (t = Vt.createFromRawTheme(e), this._textmateThemeCache.set(e, t)), this._syncRegistry.setTheme(t);
  }
  getGrammar(e) {
    if (this._alias[e]) {
      const t = /* @__PURE__ */ new Set([e]);
      for (; this._alias[e]; ) {
        if (e = this._alias[e], t.has(e)) throw new He(`Circular alias \`${Array.from(t).join(" -> ")} -> ${e}\``);
        t.add(e);
      }
    }
    return this._resolvedGrammars.get(e);
  }
  loadLanguage(e) {
    var _a3, _b2, _c2, _d;
    if (this.getGrammar(e.name)) return;
    const t = new Set([...this._langMap.values()].filter((o) => {
      var _a4;
      return (_a4 = o.embeddedLangsLazy) == null ? void 0 : _a4.includes(e.name);
    }));
    this._resolver.addLanguage(e);
    const r = { balancedBracketSelectors: e.balancedBracketSelectors || ["*"], unbalancedBracketSelectors: e.unbalancedBracketSelectors || [] };
    this._syncRegistry._rawGrammars.set(e.scopeName, e);
    const i = this.loadGrammarWithConfiguration(e.scopeName, 1, r);
    if (i.name = e.name, this._resolvedGrammars.set(e.name, i), e.aliases && e.aliases.forEach((o) => {
      this._alias[o] = e.name;
    }), this._loadedLanguagesCache = null, t.size) for (const o of t) this._resolvedGrammars.delete(o.name), this._loadedLanguagesCache = null, (_b2 = (_a3 = this._syncRegistry) == null ? void 0 : _a3._injectionGrammars) == null ? void 0 : _b2.delete(o.scopeName), (_d = (_c2 = this._syncRegistry) == null ? void 0 : _c2._grammars) == null ? void 0 : _d.delete(o.scopeName), this.loadLanguage(this._langMap.get(o.name));
  }
  dispose() {
    super.dispose(), this._resolvedThemes.clear(), this._resolvedGrammars.clear(), this._langMap.clear(), this._langGraph.clear(), this._loadedThemesCache = null;
  }
  loadLanguages(e) {
    for (const i of e) this.resolveEmbeddedLanguages(i);
    const t = Array.from(this._langGraph.entries()), r = t.filter(([i, o]) => !o);
    if (r.length) {
      const i = t.filter(([o, s]) => {
        var _a3;
        return s && ((_a3 = s.embeddedLangs) == null ? void 0 : _a3.some((l) => r.map(([a]) => a).includes(l)));
      }).filter((o) => !r.includes(o));
      throw new He(`Missing languages ${r.map(([o]) => `\`${o}\``).join(", ")}, required by ${i.map(([o]) => `\`${o}\``).join(", ")}`);
    }
    for (const [i, o] of t) this._resolver.addLanguage(o);
    for (const [i, o] of t) this.loadLanguage(o);
  }
  getLoadedLanguages() {
    return this._loadedLanguagesCache || (this._loadedLanguagesCache = [.../* @__PURE__ */ new Set([...this._resolvedGrammars.keys(), ...Object.keys(this._alias)])]), this._loadedLanguagesCache;
  }
  resolveEmbeddedLanguages(e) {
    if (this._langMap.set(e.name, e), this._langGraph.set(e.name, e), e.embeddedLangs) for (const t of e.embeddedLangs) this._langGraph.set(t, this._langMap.get(t));
  }
}
class pc {
  constructor(e, t) {
    __publicField(this, "_langs", /* @__PURE__ */ new Map());
    __publicField(this, "_scopeToLang", /* @__PURE__ */ new Map());
    __publicField(this, "_injections", /* @__PURE__ */ new Map());
    __publicField(this, "_onigLib");
    this._onigLib = { createOnigScanner: (r) => e.createScanner(r), createOnigString: (r) => e.createString(r) }, t.forEach((r) => this.addLanguage(r));
  }
  get onigLib() {
    return this._onigLib;
  }
  getLangRegistration(e) {
    return this._langs.get(e);
  }
  loadGrammar(e) {
    return this._scopeToLang.get(e);
  }
  addLanguage(e) {
    this._langs.set(e.name, e), e.aliases && e.aliases.forEach((t) => {
      this._langs.set(t, e);
    }), this._scopeToLang.set(e.scopeName, e), e.injectTo && e.injectTo.forEach((t) => {
      this._injections.get(t) || this._injections.set(t, []), this._injections.get(t).push(e.scopeName);
    });
  }
  getInjections(e) {
    const t = e.split(".");
    let r = [];
    for (let i = 1; i <= t.length; i++) {
      const o = t.slice(0, i).join(".");
      r = [...r, ...this._injections.get(o) || []];
    }
    return r;
  }
}
let ot = 0;
function gc(n) {
  ot += 1, n.warnings !== false && ot >= 10 && ot % 10 === 0 && console.warn(`[Shiki] ${ot} instances have been created. Shiki is supposed to be used as a singleton, consider refactoring your code to cache your highlighter instance; Or call \`highlighter.dispose()\` to release unused instances.`);
  let e = false;
  if (!n.engine) throw new He("`engine` option is required for synchronous mode");
  const t = (n.langs || []).flat(1), r = (n.themes || []).flat(1).map(nr), i = new pc(n.engine, t), o = new dc(i, r, t, n.langAlias);
  let s;
  function l(b) {
    m();
    const C = o.getGrammar(typeof b == "string" ? b : b.name);
    if (!C) throw new He(`Language \`${b}\` not found, you may need to load it first`);
    return C;
  }
  function a(b) {
    if (b === "none") return { bg: "", fg: "", name: "none", settings: [], type: "dark" };
    m();
    const C = o.getTheme(b);
    if (!C) throw new He(`Theme \`${b}\` not found, you may need to load it first`);
    return C;
  }
  function c(b) {
    m();
    const C = a(b);
    s !== b && (o.setTheme(C), s = b);
    const h = o.getColorMap();
    return { theme: C, colorMap: h };
  }
  function u() {
    return m(), o.getLoadedThemes();
  }
  function f() {
    return m(), o.getLoadedLanguages();
  }
  function g(...b) {
    m(), o.loadLanguages(b.flat(1));
  }
  async function d(...b) {
    return g(await Vi(b));
  }
  function p(...b) {
    m();
    for (const C of b.flat(1)) o.loadTheme(C);
  }
  async function w(...b) {
    return m(), p(await Yi(b));
  }
  function m() {
    if (e) throw new He("Shiki instance has been disposed");
  }
  function y() {
    e || (e = true, o.dispose(), ot -= 1);
  }
  return { setTheme: c, getTheme: a, getLanguage: l, getLoadedThemes: u, getLoadedLanguages: f, loadLanguage: d, loadLanguageSync: g, loadTheme: w, loadThemeSync: p, dispose: y, [Symbol.dispose]: y };
}
async function mc(n) {
  n.engine || hc("`engine` option is required. Use `createOnigurumaEngine` or `createJavaScriptRegexEngine` to create an engine.");
  const [e, t, r] = await Promise.all([Yi(n.themes || []), Vi(n.langs || []), n.engine]);
  return gc({ ...n, themes: e, langs: t, engine: r });
}
async function Fc(n) {
  const e = await mc(n);
  return { getLastGrammarState: (...t) => Zl(e, ...t), codeToTokensBase: (t, r) => tr(e, t, r), codeToTokensWithThemes: (t, r) => qi(e, t, r), codeToTokens: (t, r) => tn(e, t, r), codeToHast: (t, r) => nn(e, t, r), codeToHtml: (t, r) => uc(e, t, r), getBundledLanguages: () => ({}), getBundledThemes: () => ({}), ...e, getInternalContext: () => e };
}
class rr extends Error {
  constructor(e) {
    super(e), this.name = "ShikiError";
  }
}
function vc() {
  return 2147483648;
}
function yc() {
  return typeof performance < "u" ? performance.now() : Date.now();
}
const bc = (n, e) => n + (e - n % e) % e;
async function wc(n) {
  let e, t;
  const r = {};
  function i(d) {
    t = d, r.HEAPU8 = new Uint8Array(d), r.HEAPU32 = new Uint32Array(d);
  }
  function o(d, p, w) {
    r.HEAPU8.copyWithin(d, p, p + w);
  }
  function s(d) {
    try {
      return e.grow(d - t.byteLength + 65535 >>> 16), i(e.buffer), 1;
    } catch {
    }
  }
  function l(d) {
    const p = r.HEAPU8.length;
    d = d >>> 0;
    const w = vc();
    if (d > w) return false;
    for (let m = 1; m <= 4; m *= 2) {
      let y = p * (1 + 0.2 / m);
      y = Math.min(y, d + 100663296);
      const b = Math.min(w, bc(Math.max(d, y), 65536));
      if (s(b)) return true;
    }
    return false;
  }
  const a = typeof TextDecoder < "u" ? new TextDecoder("utf8") : void 0;
  function c(d, p, w = 1024) {
    const m = p + w;
    let y = p;
    for (; d[y] && !(y >= m); ) ++y;
    if (y - p > 16 && d.buffer && a) return a.decode(d.subarray(p, y));
    let b = "";
    for (; p < y; ) {
      let C = d[p++];
      if (!(C & 128)) {
        b += String.fromCharCode(C);
        continue;
      }
      const h = d[p++] & 63;
      if ((C & 224) === 192) {
        b += String.fromCharCode((C & 31) << 6 | h);
        continue;
      }
      const x = d[p++] & 63;
      if ((C & 240) === 224 ? C = (C & 15) << 12 | h << 6 | x : C = (C & 7) << 18 | h << 12 | x << 6 | d[p++] & 63, C < 65536) b += String.fromCharCode(C);
      else {
        const _ = C - 65536;
        b += String.fromCharCode(55296 | _ >> 10, 56320 | _ & 1023);
      }
    }
    return b;
  }
  function u(d, p) {
    return d ? c(r.HEAPU8, d, p) : "";
  }
  const f = { emscripten_get_now: yc, emscripten_memcpy_big: o, emscripten_resize_heap: l, fd_write: () => 0 };
  async function g() {
    const p = await n({ env: f, wasi_snapshot_preview1: f });
    e = p.memory, i(e.buffer), Object.assign(r, p), r.UTF8ToString = u;
  }
  return await g(), r;
}
var Sc = Object.defineProperty, Cc = (n, e, t) => e in n ? Sc(n, e, { enumerable: true, configurable: true, writable: true, value: t }) : n[e] = t, G = (n, e, t) => (Cc(n, typeof e != "symbol" ? e + "" : e, t), t);
let F = null;
function _c(n) {
  throw new rr(n.UTF8ToString(n.getLastOnigError()));
}
class un {
  constructor(e) {
    G(this, "utf16Length"), G(this, "utf8Length"), G(this, "utf16Value"), G(this, "utf8Value"), G(this, "utf16OffsetToUtf8"), G(this, "utf8OffsetToUtf16");
    const t = e.length, r = un._utf8ByteLength(e), i = r !== t, o = i ? new Uint32Array(t + 1) : null;
    i && (o[t] = r);
    const s = i ? new Uint32Array(r + 1) : null;
    i && (s[r] = t);
    const l = new Uint8Array(r);
    let a = 0;
    for (let c = 0; c < t; c++) {
      const u = e.charCodeAt(c);
      let f = u, g = false;
      if (u >= 55296 && u <= 56319 && c + 1 < t) {
        const d = e.charCodeAt(c + 1);
        d >= 56320 && d <= 57343 && (f = (u - 55296 << 10) + 65536 | d - 56320, g = true);
      }
      i && (o[c] = a, g && (o[c + 1] = a), f <= 127 ? s[a + 0] = c : f <= 2047 ? (s[a + 0] = c, s[a + 1] = c) : f <= 65535 ? (s[a + 0] = c, s[a + 1] = c, s[a + 2] = c) : (s[a + 0] = c, s[a + 1] = c, s[a + 2] = c, s[a + 3] = c)), f <= 127 ? l[a++] = f : f <= 2047 ? (l[a++] = 192 | (f & 1984) >>> 6, l[a++] = 128 | (f & 63) >>> 0) : f <= 65535 ? (l[a++] = 224 | (f & 61440) >>> 12, l[a++] = 128 | (f & 4032) >>> 6, l[a++] = 128 | (f & 63) >>> 0) : (l[a++] = 240 | (f & 1835008) >>> 18, l[a++] = 128 | (f & 258048) >>> 12, l[a++] = 128 | (f & 4032) >>> 6, l[a++] = 128 | (f & 63) >>> 0), g && c++;
    }
    this.utf16Length = t, this.utf8Length = r, this.utf16Value = e, this.utf8Value = l, this.utf16OffsetToUtf8 = o, this.utf8OffsetToUtf16 = s;
  }
  static _utf8ByteLength(e) {
    let t = 0;
    for (let r = 0, i = e.length; r < i; r++) {
      const o = e.charCodeAt(r);
      let s = o, l = false;
      if (o >= 55296 && o <= 56319 && r + 1 < i) {
        const a = e.charCodeAt(r + 1);
        a >= 56320 && a <= 57343 && (s = (o - 55296 << 10) + 65536 | a - 56320, l = true);
      }
      s <= 127 ? t += 1 : s <= 2047 ? t += 2 : s <= 65535 ? t += 3 : t += 4, l && r++;
    }
    return t;
  }
  createString(e) {
    const t = e.omalloc(this.utf8Length);
    return e.HEAPU8.set(this.utf8Value, t), t;
  }
}
const he = class {
  constructor(n) {
    if (G(this, "id", ++he.LAST_ID), G(this, "_onigBinding"), G(this, "content"), G(this, "utf16Length"), G(this, "utf8Length"), G(this, "utf16OffsetToUtf8"), G(this, "utf8OffsetToUtf16"), G(this, "ptr"), !F) throw new rr("Must invoke loadWasm first.");
    this._onigBinding = F, this.content = n;
    const e = new un(n);
    this.utf16Length = e.utf16Length, this.utf8Length = e.utf8Length, this.utf16OffsetToUtf8 = e.utf16OffsetToUtf8, this.utf8OffsetToUtf16 = e.utf8OffsetToUtf16, this.utf8Length < 1e4 && !he._sharedPtrInUse ? (he._sharedPtr || (he._sharedPtr = F.omalloc(1e4)), he._sharedPtrInUse = true, F.HEAPU8.set(e.utf8Value, he._sharedPtr), this.ptr = he._sharedPtr) : this.ptr = e.createString(F);
  }
  convertUtf8OffsetToUtf16(n) {
    return this.utf8OffsetToUtf16 ? n < 0 ? 0 : n > this.utf8Length ? this.utf16Length : this.utf8OffsetToUtf16[n] : n;
  }
  convertUtf16OffsetToUtf8(n) {
    return this.utf16OffsetToUtf8 ? n < 0 ? 0 : n > this.utf16Length ? this.utf8Length : this.utf16OffsetToUtf8[n] : n;
  }
  dispose() {
    this.ptr === he._sharedPtr ? he._sharedPtrInUse = false : this._onigBinding.ofree(this.ptr);
  }
};
let _t = he;
G(_t, "LAST_ID", 0);
G(_t, "_sharedPtr", 0);
G(_t, "_sharedPtrInUse", false);
class xc {
  constructor(e) {
    if (G(this, "_onigBinding"), G(this, "_ptr"), !F) throw new rr("Must invoke loadWasm first.");
    const t = [], r = [];
    for (let l = 0, a = e.length; l < a; l++) {
      const c = new un(e[l]);
      t[l] = c.createString(F), r[l] = c.utf8Length;
    }
    const i = F.omalloc(4 * e.length);
    F.HEAPU32.set(t, i / 4);
    const o = F.omalloc(4 * e.length);
    F.HEAPU32.set(r, o / 4);
    const s = F.createOnigScanner(i, o, e.length);
    for (let l = 0, a = e.length; l < a; l++) F.ofree(t[l]);
    F.ofree(o), F.ofree(i), s === 0 && _c(F), this._onigBinding = F, this._ptr = s;
  }
  dispose() {
    this._onigBinding.freeOnigScanner(this._ptr);
  }
  findNextMatchSync(e, t, r) {
    let i = 0;
    if (typeof r == "number" && (i = r), typeof e == "string") {
      e = new _t(e);
      const o = this._findNextMatchSync(e, t, false, i);
      return e.dispose(), o;
    }
    return this._findNextMatchSync(e, t, false, i);
  }
  _findNextMatchSync(e, t, r, i) {
    const o = this._onigBinding, s = o.findNextOnigScannerMatch(this._ptr, e.id, e.ptr, e.utf8Length, e.convertUtf16OffsetToUtf8(t), i);
    if (s === 0) return null;
    const l = o.HEAPU32;
    let a = s / 4;
    const c = l[a++], u = l[a++], f = [];
    for (let g = 0; g < u; g++) {
      const d = e.convertUtf8OffsetToUtf16(l[a++]), p = e.convertUtf8OffsetToUtf16(l[a++]);
      f[g] = { start: d, end: p, length: p - d };
    }
    return { index: c, captureIndices: f };
  }
}
function Tc(n) {
  return typeof n.instantiator == "function";
}
function Ec(n) {
  return typeof n.default == "function";
}
function Ac(n) {
  return typeof n.data < "u";
}
function Rc(n) {
  return typeof Response < "u" && n instanceof Response;
}
function kc(n) {
  var _a3, _b2;
  return typeof ArrayBuffer < "u" && (n instanceof ArrayBuffer || ArrayBuffer.isView(n)) || typeof or < "u" && ((_b2 = (_a3 = or).isBuffer) == null ? void 0 : _b2.call(_a3, n)) || typeof SharedArrayBuffer < "u" && n instanceof SharedArrayBuffer || typeof Uint32Array < "u" && n instanceof Uint32Array;
}
let Wt;
function Lc(n) {
  if (Wt) return Wt;
  async function e() {
    F = await wc(async (t) => {
      let r = n;
      return r = await r, typeof r == "function" && (r = await r(t)), typeof r == "function" && (r = await r(t)), Tc(r) ? r = await r.instantiator(t) : Ec(r) ? r = await r.default(t) : (Ac(r) && (r = r.data), Rc(r) ? typeof WebAssembly.instantiateStreaming == "function" ? r = await Oc(r)(t) : r = await Pc(r)(t) : kc(r) ? r = await xn(r)(t) : r instanceof WebAssembly.Module ? r = await xn(r)(t) : "default" in r && r.default instanceof WebAssembly.Module && (r = await xn(r.default)(t))), "instance" in r && (r = r.instance), "exports" in r && (r = r.exports), r;
    });
  }
  return Wt = e(), Wt;
}
function xn(n) {
  return (e) => WebAssembly.instantiate(n, e);
}
function Oc(n) {
  return (e) => WebAssembly.instantiateStreaming(n, e);
}
function Pc(n) {
  return async (e) => {
    const t = await n.arrayBuffer();
    return WebAssembly.instantiate(t, e);
  };
}
async function zc(n) {
  return n && await Lc(n), { createScanner(e) {
    return new xc(e.map((t) => typeof t == "string" ? t : t.source));
  }, createString(e) {
    return new _t(e);
  } };
}
var ht = /* @__PURE__ */ new Map();
function Nc(n) {
  var e = ht.get(n);
  e && e.destroy();
}
function Ic(n) {
  var e = ht.get(n);
  e && e.update();
}
var at = null;
typeof window > "u" ? ((at = function(n) {
  return n;
}).destroy = function(n) {
  return n;
}, at.update = function(n) {
  return n;
}) : ((at = function(n, e) {
  return n && Array.prototype.forEach.call(n.length ? n : [n], function(t) {
    return function(r) {
      if (r && r.nodeName && r.nodeName === "TEXTAREA" && !ht.has(r)) {
        var i, o = null, s = window.getComputedStyle(r), l = (i = r.value, function() {
          c({ testForHeightReduction: i === "" || !r.value.startsWith(i), restoreTextAlign: null }), i = r.value;
        }), a = (function(f) {
          r.removeEventListener("autosize:destroy", a), r.removeEventListener("autosize:update", u), r.removeEventListener("input", l), window.removeEventListener("resize", u), Object.keys(f).forEach(function(g) {
            return r.style[g] = f[g];
          }), ht.delete(r);
        }).bind(r, { height: r.style.height, resize: r.style.resize, textAlign: r.style.textAlign, overflowY: r.style.overflowY, overflowX: r.style.overflowX, wordWrap: r.style.wordWrap });
        r.addEventListener("autosize:destroy", a), r.addEventListener("autosize:update", u), r.addEventListener("input", l), window.addEventListener("resize", u), r.style.overflowX = "hidden", r.style.wordWrap = "break-word", ht.set(r, { destroy: a, update: u }), u();
      }
      function c(f) {
        var g, d, p = f.restoreTextAlign, w = p === void 0 ? null : p, m = f.testForHeightReduction, y = m === void 0 || m, b = s.overflowY;
        if (r.scrollHeight !== 0 && (s.resize === "vertical" ? r.style.resize = "none" : s.resize === "both" && (r.style.resize = "horizontal"), y && (g = function(h) {
          for (var x = []; h && h.parentNode && h.parentNode instanceof Element; ) h.parentNode.scrollTop && x.push([h.parentNode, h.parentNode.scrollTop]), h = h.parentNode;
          return function() {
            return x.forEach(function(_) {
              var k = _[0], L = _[1];
              k.style.scrollBehavior = "auto", k.scrollTop = L, k.style.scrollBehavior = null;
            });
          };
        }(r), r.style.height = ""), d = s.boxSizing === "content-box" ? r.scrollHeight - (parseFloat(s.paddingTop) + parseFloat(s.paddingBottom)) : r.scrollHeight + parseFloat(s.borderTopWidth) + parseFloat(s.borderBottomWidth), s.maxHeight !== "none" && d > parseFloat(s.maxHeight) ? (s.overflowY === "hidden" && (r.style.overflow = "scroll"), d = parseFloat(s.maxHeight)) : s.overflowY !== "hidden" && (r.style.overflow = "hidden"), r.style.height = d + "px", w && (r.style.textAlign = w), g && g(), o !== d && (r.dispatchEvent(new Event("autosize:resized", { bubbles: true })), o = d), b !== s.overflow && !w)) {
          var C = s.textAlign;
          s.overflow === "hidden" && (r.style.textAlign = C === "start" ? "end" : "start"), c({ restoreTextAlign: C, testForHeightReduction: true });
        }
      }
      function u() {
        c({ testForHeightReduction: true, restoreTextAlign: null });
      }
    }(t);
  }), n;
}).destroy = function(n) {
  return n && Array.prototype.forEach.call(n.length ? n : [n], Nc), n;
}, at.update = function(n) {
  return n && Array.prototype.forEach.call(n.length ? n : [n], Ic), n;
});
var qc = at;
Array.prototype.find || (Array.prototype.find = function(n) {
  if (this === null) throw new TypeError("Array.prototype.find called on null or undefined");
  if (typeof n != "function") throw new TypeError("predicate must be a function");
  for (var e = Object(this), t = e.length >>> 0, r = arguments[1], i, o = 0; o < t; o++) if (i = e[o], n.call(r, i, o, e)) return i;
});
if (window && typeof window.CustomEvent != "function") {
  let n = function(e, t) {
    t = t || { bubbles: false, cancelable: false, detail: void 0 };
    var r = document.createEvent("CustomEvent");
    return r.initCustomEvent(e, t.bubbles, t.cancelable, t.detail), r;
  };
  typeof window.Event < "u" && (n.prototype = window.Event.prototype), window.CustomEvent = n;
}
class rn {
  constructor(e) {
    this.tribute = e, this.tribute.events = this;
  }
  static keys() {
    return [{ key: 9, value: "TAB" }, { key: 8, value: "DELETE" }, { key: 13, value: "ENTER" }, { key: 27, value: "ESCAPE" }, { key: 32, value: "SPACE" }, { key: 38, value: "UP" }, { key: 40, value: "DOWN" }];
  }
  bind(e) {
    e.boundKeydown = this.keydown.bind(e, this), e.boundKeyup = this.keyup.bind(e, this), e.boundInput = this.input.bind(e, this), e.addEventListener("keydown", e.boundKeydown, false), e.addEventListener("keyup", e.boundKeyup, false), e.addEventListener("input", e.boundInput, false);
  }
  unbind(e) {
    e.removeEventListener("keydown", e.boundKeydown, false), e.removeEventListener("keyup", e.boundKeyup, false), e.removeEventListener("input", e.boundInput, false), delete e.boundKeydown, delete e.boundKeyup, delete e.boundInput;
  }
  keydown(e, t) {
    e.shouldDeactivate(t) && (e.tribute.isActive = false, e.tribute.hideMenu());
    let r = this;
    e.commandEvent = false, rn.keys().forEach((i) => {
      i.key === t.keyCode && (e.commandEvent = true, e.callbacks()[i.value.toLowerCase()](t, r));
    });
  }
  input(e, t) {
    e.inputEvent = true, e.keyup.call(this, e, t);
  }
  click(e, t) {
    let r = e.tribute;
    if (r.menu && r.menu.contains(t.target)) {
      let i = t.target;
      for (t.preventDefault(), t.stopPropagation(); i.nodeName.toLowerCase() !== "li"; ) if (i = i.parentNode, !i || i === r.menu) throw new Error("cannot find the <li> container for the click");
      r.selectItemAtIndex(i.getAttribute("data-index"), t), r.hideMenu();
    } else r.current.element && !r.current.externalTrigger && (r.current.externalTrigger = false, setTimeout(() => r.hideMenu()));
  }
  keyup(e, t) {
    if (e.inputEvent && (e.inputEvent = false), e.updateSelection(this), t.keyCode !== 27) {
      if (!e.tribute.allowSpaces && e.tribute.hasTrailingSpace) {
        e.tribute.hasTrailingSpace = false, e.commandEvent = true, e.callbacks().space(t, this);
        return;
      }
      if (!e.tribute.isActive) if (e.tribute.autocompleteMode) e.callbacks().triggerChar(t, this, "");
      else {
        let r = e.getKeyCode(e, this, t);
        if (isNaN(r) || !r) return;
        let i = e.tribute.triggers().find((o) => o.charCodeAt(0) === r);
        typeof i < "u" && e.callbacks().triggerChar(t, this, i);
      }
      e.tribute.current.mentionText.length < e.tribute.current.collection.menuShowMinLength || ((e.tribute.current.trigger || e.tribute.autocompleteMode) && e.commandEvent === false || e.tribute.isActive && t.keyCode === 8) && e.tribute.showMenuFor(this, true);
    }
  }
  shouldDeactivate(e) {
    if (!this.tribute.isActive) return false;
    if (this.tribute.current.mentionText.length === 0) {
      let t = false;
      return rn.keys().forEach((r) => {
        e.keyCode === r.key && (t = true);
      }), !t;
    }
    return false;
  }
  getKeyCode(e, t, r) {
    let i = e.tribute, o = i.range.getTriggerInfo(false, i.hasTrailingSpace, true, i.allowSpaces, i.autocompleteMode);
    return o ? o.mentionTriggerChar.charCodeAt(0) : false;
  }
  updateSelection(e) {
    this.tribute.current.element = e;
    let t = this.tribute.range.getTriggerInfo(false, this.tribute.hasTrailingSpace, true, this.tribute.allowSpaces, this.tribute.autocompleteMode);
    t && (this.tribute.current.selectedPath = t.mentionSelectedPath, this.tribute.current.mentionText = t.mentionText, this.tribute.current.selectedOffset = t.mentionSelectedOffset);
  }
  callbacks() {
    return { triggerChar: (e, t, r) => {
      let i = this.tribute;
      i.current.trigger = r;
      let o = i.collection.find((s) => s.trigger === r);
      i.current.collection = o, i.current.mentionText.length >= i.current.collection.menuShowMinLength && i.inputEvent && i.showMenuFor(t, true);
    }, enter: (e, t) => {
      this.tribute.isActive && this.tribute.current.filteredItems && (e.preventDefault(), e.stopPropagation(), setTimeout(() => {
        this.tribute.selectItemAtIndex(this.tribute.menuSelected, e), this.tribute.hideMenu();
      }, 0));
    }, escape: (e, t) => {
      this.tribute.isActive && (e.preventDefault(), e.stopPropagation(), this.tribute.isActive = false, this.tribute.hideMenu());
    }, tab: (e, t) => {
      this.callbacks().enter(e, t);
    }, space: (e, t) => {
      this.tribute.isActive && (this.tribute.spaceSelectsMatch ? this.callbacks().enter(e, t) : this.tribute.allowSpaces || (e.stopPropagation(), setTimeout(() => {
        this.tribute.hideMenu(), this.tribute.isActive = false;
      }, 0)));
    }, up: (e, t) => {
      if (this.tribute.isActive && this.tribute.current.filteredItems) {
        e.preventDefault(), e.stopPropagation();
        let r = this.tribute.current.filteredItems.length, i = this.tribute.menuSelected;
        r > i && i > 0 ? (this.tribute.menuSelected--, this.setActiveLi()) : i === 0 && (this.tribute.menuSelected = r - 1, this.setActiveLi(), this.tribute.menu.scrollTop = this.tribute.menu.scrollHeight);
      }
    }, down: (e, t) => {
      if (this.tribute.isActive && this.tribute.current.filteredItems) {
        e.preventDefault(), e.stopPropagation();
        let r = this.tribute.current.filteredItems.length - 1, i = this.tribute.menuSelected;
        r > i ? (this.tribute.menuSelected++, this.setActiveLi()) : r === i && (this.tribute.menuSelected = 0, this.setActiveLi(), this.tribute.menu.scrollTop = 0);
      }
    }, delete: (e, t) => {
      this.tribute.isActive && this.tribute.current.mentionText.length < 1 ? this.tribute.hideMenu() : this.tribute.isActive && this.tribute.showMenuFor(t);
    } };
  }
  setActiveLi(e) {
    let t = this.tribute.menu.querySelectorAll("li"), r = t.length >>> 0;
    e && (this.tribute.menuSelected = parseInt(e));
    for (let i = 0; i < r; i++) {
      let o = t[i];
      if (i === this.tribute.menuSelected) {
        o.classList.add(this.tribute.current.collection.selectClass);
        let s = o.getBoundingClientRect(), l = this.tribute.menu.getBoundingClientRect();
        if (s.bottom > l.bottom) {
          let a = s.bottom - l.bottom;
          this.tribute.menu.scrollTop += a;
        } else if (s.top < l.top) {
          let a = l.top - s.top;
          this.tribute.menu.scrollTop -= a;
        }
      } else o.classList.remove(this.tribute.current.collection.selectClass);
    }
  }
  getFullHeight(e, t) {
    let r = e.getBoundingClientRect().height;
    if (t) {
      let i = e.currentStyle || window.getComputedStyle(e);
      return r + parseFloat(i.marginTop) + parseFloat(i.marginBottom);
    }
    return r;
  }
}
class Mc {
  constructor(e) {
    this.tribute = e, this.tribute.menuEvents = this, this.menu = this.tribute.menu;
  }
  bind(e) {
    this.menuClickEvent = this.tribute.events.click.bind(null, this), this.menuContainerScrollEvent = this.debounce(() => {
      this.tribute.isActive && this.tribute.hideMenu();
    }, 10, false), this.windowResizeEvent = this.debounce(() => {
      this.tribute.isActive && this.tribute.hideMenu();
    }, 10, false), this.tribute.range.getDocument().addEventListener("MSPointerDown", this.menuClickEvent, false), this.tribute.range.getDocument().addEventListener("mousedown", this.menuClickEvent, false), window.addEventListener("resize", this.windowResizeEvent), this.menuContainer ? this.menuContainer.addEventListener("scroll", this.menuContainerScrollEvent, false) : window.addEventListener("scroll", this.menuContainerScrollEvent);
  }
  unbind(e) {
    this.tribute.range.getDocument().removeEventListener("mousedown", this.menuClickEvent, false), this.tribute.range.getDocument().removeEventListener("MSPointerDown", this.menuClickEvent, false), window.removeEventListener("resize", this.windowResizeEvent), this.menuContainer ? this.menuContainer.removeEventListener("scroll", this.menuContainerScrollEvent, false) : window.removeEventListener("scroll", this.menuContainerScrollEvent);
  }
  debounce(e, t, r) {
    var i;
    return () => {
      var o = this, s = arguments, l = () => {
        i = null, r || e.apply(o, s);
      }, a = r && !i;
      clearTimeout(i), i = setTimeout(l, t), a && e.apply(o, s);
    };
  }
}
class Dc {
  constructor(e) {
    this.tribute = e, this.tribute.range = this;
  }
  getDocument() {
    let e;
    return this.tribute.current.collection && (e = this.tribute.current.collection.iframe), e ? e.contentWindow.document : document;
  }
  positionMenuAtCaret(e) {
    let t = this.tribute.current, r, i = this.getTriggerInfo(false, this.tribute.hasTrailingSpace, true, this.tribute.allowSpaces, this.tribute.autocompleteMode);
    if (typeof i < "u") {
      if (!this.tribute.positionMenu) {
        this.tribute.menu.style.cssText = "display: block;";
        return;
      }
      this.isContentEditable(t.element) ? r = this.getContentEditableCaretPosition(i.mentionPosition) : r = this.getTextAreaOrInputUnderlinePosition(this.tribute.current.element, i.mentionPosition), this.tribute.menu.style.cssText = `top: ${r.top}px;
                                     left: ${r.left}px;
                                     right: ${r.right}px;
                                     bottom: ${r.bottom}px;
                                     max-height: ${r.maxHeight || 500}px;
                                     max-width: ${r.maxWidth || 300}px;
                                     position: ${r.position || "absolute"};
                                     display: block;`, r.left === "auto" && (this.tribute.menu.style.left = "auto"), r.top === "auto" && (this.tribute.menu.style.top = "auto"), e && this.scrollIntoView();
    } else this.tribute.menu.style.cssText = "display: none";
  }
  get menuContainerIsBody() {
    return this.tribute.menuContainer === document.body || !this.tribute.menuContainer;
  }
  selectElement(e, t, r) {
    let i, o = e;
    if (t) for (var s = 0; s < t.length; s++) {
      if (o = o.childNodes[t[s]], o === void 0) return;
      for (; o.length < r; ) r -= o.length, o = o.nextSibling;
      o.childNodes.length === 0 && !o.length && (o = o.previousSibling);
    }
    let l = this.getWindowSelection();
    i = this.getDocument().createRange(), i.setStart(o, r), i.setEnd(o, r), i.collapse(true);
    try {
      l.removeAllRanges();
    } catch {
    }
    l.addRange(i), e.focus();
  }
  replaceTriggerText(e, t, r, i, o) {
    let s = this.getTriggerInfo(true, r, t, this.tribute.allowSpaces, this.tribute.autocompleteMode);
    if (s !== void 0) {
      let l = this.tribute.current, a = new CustomEvent("tribute-replaced", { detail: { item: o, instance: l, context: s, event: i } });
      if (this.isContentEditable(l.element)) {
        let c = typeof this.tribute.replaceTextSuffix == "string" ? this.tribute.replaceTextSuffix : "\xA0";
        e += c;
        let u = s.mentionPosition + s.mentionText.length;
        this.tribute.autocompleteMode || (u += s.mentionTriggerChar.length), this.pasteHtml(e, s.mentionPosition, u);
      } else {
        let c = this.tribute.current.element, u = typeof this.tribute.replaceTextSuffix == "string" ? this.tribute.replaceTextSuffix : " ";
        e += u;
        let f = s.mentionPosition, g = s.mentionPosition + s.mentionText.length + u.length;
        this.tribute.autocompleteMode || (g += s.mentionTriggerChar.length - 1), c.value = c.value.substring(0, f) + e + c.value.substring(g, c.value.length), c.selectionStart = f + e.length, c.selectionEnd = f + e.length;
      }
      l.element.dispatchEvent(new CustomEvent("input", { bubbles: true })), l.element.dispatchEvent(a);
    }
  }
  pasteHtml(e, t, r) {
    let i, o;
    o = this.getWindowSelection(), i = this.getDocument().createRange(), i.setStart(o.anchorNode, t), i.setEnd(o.anchorNode, r), i.deleteContents();
    let s = this.getDocument().createElement("div");
    s.innerHTML = e;
    let l = this.getDocument().createDocumentFragment(), a, c;
    for (; a = s.firstChild; ) c = l.appendChild(a);
    i.insertNode(l), c && (i = i.cloneRange(), i.setStartAfter(c), i.collapse(true), o.removeAllRanges(), o.addRange(i));
  }
  getWindowSelection() {
    return this.tribute.collection.iframe ? this.tribute.collection.iframe.contentWindow.getSelection() : window.getSelection();
  }
  getNodePositionInParent(e) {
    if (e.parentNode === null) return 0;
    for (var t = 0; t < e.parentNode.childNodes.length; t++) if (e.parentNode.childNodes[t] === e) return t;
  }
  getContentEditableSelectedPath(e) {
    let t = this.getWindowSelection(), r = t.anchorNode, i = [], o;
    if (r != null) {
      let s, l = r.contentEditable;
      for (; r !== null && l !== "true"; ) s = this.getNodePositionInParent(r), i.push(s), r = r.parentNode, r !== null && (l = r.contentEditable);
      return i.reverse(), o = t.getRangeAt(0).startOffset, { selected: r, path: i, offset: o };
    }
  }
  getTextPrecedingCurrentSelection() {
    let e = this.tribute.current, t = "";
    if (this.isContentEditable(e.element)) {
      let r = this.getWindowSelection().anchorNode;
      if (r != null) {
        let i = r.textContent, o = this.getWindowSelection().getRangeAt(0).startOffset;
        i && o >= 0 && (t = i.substring(0, o));
      }
    } else {
      let r = this.tribute.current.element;
      if (r) {
        let i = r.selectionStart;
        r.value && i >= 0 && (t = r.value.substring(0, i));
      }
    }
    return t;
  }
  getLastWordInText(e) {
    e = e.replace(/\u00A0/g, " ");
    var t;
    this.tribute.autocompleteSeparator ? t = e.split(this.tribute.autocompleteSeparator) : t = e.split(/\s+/);
    var r = t.length - 1;
    return t[r].trim();
  }
  getTriggerInfo(e, t, r, i, o) {
    let s = this.tribute.current, l, a, c;
    if (!this.isContentEditable(s.element)) l = this.tribute.current.element;
    else {
      let g = this.getContentEditableSelectedPath(s);
      g && (l = g.selected, a = g.path, c = g.offset);
    }
    let u = this.getTextPrecedingCurrentSelection(), f = this.getLastWordInText(u);
    if (o) return { mentionPosition: u.length - f.length, mentionText: f, mentionSelectedElement: l, mentionSelectedPath: a, mentionSelectedOffset: c };
    if (u != null) {
      let g = -1, d;
      if (this.tribute.collection.forEach((p) => {
        let w = p.trigger, m = p.requireLeadingSpace ? this.lastIndexWithLeadingSpace(u, w) : u.lastIndexOf(w);
        m > g && (g = m, d = w, r = p.requireLeadingSpace);
      }), g >= 0 && (g === 0 || !r || /[\xA0\s]/g.test(u.substring(g - 1, g)))) {
        let p = u.substring(g + d.length, u.length);
        d = u.substring(g, g + d.length);
        let w = p.substring(0, 1), m = p.length > 0 && (w === " " || w === "\xA0");
        t && (p = p.trim());
        let y = i ? /[^\S ]/g : /[\xA0\s]/g;
        if (this.tribute.hasTrailingSpace = y.test(p), !m && (e || !y.test(p))) return { mentionPosition: g, mentionText: p, mentionSelectedElement: l, mentionSelectedPath: a, mentionSelectedOffset: c, mentionTriggerChar: d };
      }
    }
  }
  lastIndexWithLeadingSpace(e, t) {
    let r = e.split("").reverse().join(""), i = -1;
    for (let o = 0, s = e.length; o < s; o++) {
      let l = o === e.length - 1, a = /\s/.test(r[o + 1]), c = true;
      for (let u = t.length - 1; u >= 0; u--) if (t[u] !== r[o - u]) {
        c = false;
        break;
      }
      if (c && (l || a)) {
        i = e.length - 1 - o;
        break;
      }
    }
    return i;
  }
  isContentEditable(e) {
    return e.nodeName !== "INPUT" && e.nodeName !== "TEXTAREA";
  }
  isMenuOffScreen(e, t) {
    let r = window.innerWidth, i = window.innerHeight, o = document.documentElement, s = (window.pageXOffset || o.scrollLeft) - (o.clientLeft || 0), l = (window.pageYOffset || o.scrollTop) - (o.clientTop || 0), a = typeof e.top == "number" ? e.top : l + i - e.bottom - t.height, c = typeof e.right == "number" ? e.right : e.left + t.width, u = typeof e.bottom == "number" ? e.bottom : e.top + t.height, f = typeof e.left == "number" ? e.left : s + r - e.right - t.width;
    return { top: a < Math.floor(l), right: c > Math.ceil(s + r), bottom: u > Math.ceil(l + i), left: f < Math.floor(s) };
  }
  getMenuDimensions() {
    let e = { width: null, height: null };
    return this.tribute.menu.style.cssText = `top: 0px;
                                 left: 0px;
                                 position: fixed;
                                 display: block;
                                 visibility; hidden;
                                 max-height:500px;`, e.width = this.tribute.menu.offsetWidth, e.height = this.tribute.menu.offsetHeight, this.tribute.menu.style.cssText = "display: none;", e;
  }
  getTextAreaOrInputUnderlinePosition(e, t, r) {
    let i = ["direction", "boxSizing", "width", "height", "overflowX", "overflowY", "borderTopWidth", "borderRightWidth", "borderBottomWidth", "borderLeftWidth", "borderStyle", "paddingTop", "paddingRight", "paddingBottom", "paddingLeft", "fontStyle", "fontVariant", "fontWeight", "fontStretch", "fontSize", "fontSizeAdjust", "lineHeight", "fontFamily", "textAlign", "textTransform", "textIndent", "textDecoration", "letterSpacing", "wordSpacing"], o = this.getDocument().createElement("div");
    o.id = "input-textarea-caret-position-mirror-div", this.getDocument().body.appendChild(o);
    let s = o.style, l = window.getComputedStyle ? getComputedStyle(e) : e.currentStyle;
    s.whiteSpace = "pre-wrap", e.nodeName !== "INPUT" && (s.wordWrap = "break-word"), s.position = "absolute", s.visibility = "hidden", i.forEach((d) => {
      s[d] = l[d];
    });
    let a = document.createElement("span");
    a.textContent = e.value.substring(0, t), o.appendChild(a), e.nodeName === "INPUT" && (o.textContent = o.textContent.replace(/\s/g, "\xA0"));
    let c = this.getDocument().createElement("span");
    c.textContent = "&#x200B;", o.appendChild(c);
    let u = this.getDocument().createElement("span");
    u.textContent = e.value.substring(t), o.appendChild(u);
    let f = e.getBoundingClientRect();
    o.style.position = "fixed", o.style.left = f.left + "px", o.style.top = f.top + "px", o.style.width = f.width + "px", o.style.height = f.height + "px", o.scrollTop = e.scrollTop;
    var g = c.getBoundingClientRect();
    return this.getDocument().body.removeChild(o), this.getFixedCoordinatesRelativeToRect(g);
  }
  getContentEditableCaretPosition(e) {
    let t, r = this.getWindowSelection();
    t = this.getDocument().createRange(), t.setStart(r.anchorNode, e), t.setEnd(r.anchorNode, e), t.collapse(false);
    let i = t.getBoundingClientRect();
    return this.getFixedCoordinatesRelativeToRect(i);
  }
  getFixedCoordinatesRelativeToRect(e) {
    let t = { position: "fixed", left: e.left, top: e.top + e.height }, r = this.getMenuDimensions();
    var i = e.top, o = window.innerHeight - (e.top + e.height);
    o < r.height && (i >= r.height || i > o ? (t.top = "auto", t.bottom = window.innerHeight - e.top, o < r.height && (t.maxHeight = i)) : i < r.height && (t.maxHeight = o));
    var s = e.left, l = window.innerWidth - e.left;
    return l < r.width && (s >= r.width || s > l ? (t.left = "auto", t.right = window.innerWidth - e.left, l < r.width && (t.maxWidth = s)) : s < r.width && (t.maxWidth = l)), t;
  }
  scrollIntoView(e) {
    let t = 20, r, i = 100, o = this.menu;
    if (typeof o > "u") return;
    for (; r === void 0 || r.height === 0; ) if (r = o.getBoundingClientRect(), r.height === 0 && (o = o.childNodes[0], o === void 0 || !o.getBoundingClientRect)) return;
    let s = r.top, l = s + r.height;
    if (s < 0) window.scrollTo(0, window.pageYOffset + r.top - t);
    else if (l > window.innerHeight) {
      let a = window.pageYOffset + r.top - t;
      a - window.pageYOffset > i && (a = window.pageYOffset + i);
      let c = window.pageYOffset - (window.innerHeight - l);
      c > a && (c = a), window.scrollTo(0, c);
    }
  }
}
class Bc {
  constructor(e) {
    this.tribute = e, this.tribute.search = this;
  }
  simpleFilter(e, t) {
    return t.filter((r) => this.test(e, r));
  }
  test(e, t) {
    return this.match(e, t) !== null;
  }
  match(e, t, r) {
    r = r || {}, t.length;
    let i = r.pre || "", o = r.post || "", s = r.caseSensitive && t || t.toLowerCase();
    if (r.skip) return { rendered: t, score: 0 };
    e = r.caseSensitive && e || e.toLowerCase();
    let l = this.traverse(s, e, 0, 0, []);
    return l ? { rendered: this.render(t, l.cache, i, o), score: l.score } : null;
  }
  traverse(e, t, r, i, o) {
    if (this.tribute.autocompleteSeparator && (t = t.split(this.tribute.autocompleteSeparator).splice(-1)[0]), t.length === i) return { score: this.calculateScore(o), cache: o.slice() };
    if (e.length === r || t.length - i > e.length - r) return;
    let s = t[i], l = e.indexOf(s, r), a, c;
    for (; l > -1; ) {
      if (o.push(l), c = this.traverse(e, t, l + 1, i + 1, o), o.pop(), !c) return a;
      (!a || a.score < c.score) && (a = c), l = e.indexOf(s, l + 1);
    }
    return a;
  }
  calculateScore(e) {
    let t = 0, r = 1;
    return e.forEach((i, o) => {
      o > 0 && (e[o - 1] + 1 === i ? r += r + 1 : r = 1), t += r;
    }), t;
  }
  render(e, t, r, i) {
    var o = e.substring(0, t[0]);
    return t.forEach((s, l) => {
      o += r + e[s] + i + e.substring(s + 1, t[l + 1] ? t[l + 1] : e.length);
    }), o;
  }
  filter(e, t, r) {
    return r = r || {}, t.reduce((i, o, s, l) => {
      let a = o;
      r.extract && (a = r.extract(o), a || (a = ""));
      let c = this.match(e, a, r);
      return c != null && (i[i.length] = { string: c.rendered, score: c.score, index: s, original: o }), i;
    }, []).sort((i, o) => {
      let s = o.score - i.score;
      return s || i.index - o.index;
    });
  }
}
class Ge {
  constructor({ values: e = null, loadingItemTemplate: t = null, iframe: r = null, selectClass: i = "highlight", containerClass: o = "tribute-container", itemClass: s = "", trigger: l = "@", autocompleteMode: a = false, autocompleteSeparator: c = null, selectTemplate: u = null, menuItemTemplate: f = null, lookup: g = "key", fillAttr: d = "value", collection: p = null, menuContainer: w = null, noMatchTemplate: m = null, requireLeadingSpace: y = true, allowSpaces: b = false, replaceTextSuffix: C = null, positionMenu: h = true, spaceSelectsMatch: x = false, searchOpts: _ = {}, menuItemLimit: k = null, menuShowMinLength: L = 0 }) {
    if (this.autocompleteMode = a, this.autocompleteSeparator = c, this.menuSelected = 0, this.current = {}, this.inputEvent = false, this.isActive = false, this.menuContainer = w, this.allowSpaces = b, this.replaceTextSuffix = C, this.positionMenu = h, this.hasTrailingSpace = false, this.spaceSelectsMatch = x, this.autocompleteMode && (l = "", b = false), e) this.collection = [{ trigger: l, iframe: r, selectClass: i, containerClass: o, itemClass: s, selectTemplate: (u || Ge.defaultSelectTemplate).bind(this), menuItemTemplate: (f || Ge.defaultMenuItemTemplate).bind(this), noMatchTemplate: ((E) => typeof E == "string" ? E.trim() === "" ? null : E : typeof E == "function" ? E.bind(this) : m || (function() {
      return "<li>No Match Found!</li>";
    }).bind(this))(m), lookup: g, fillAttr: d, values: e, loadingItemTemplate: t, requireLeadingSpace: y, searchOpts: _, menuItemLimit: k, menuShowMinLength: L }];
    else if (p) this.autocompleteMode && console.warn("Tribute in autocomplete mode does not work for collections"), this.collection = p.map((E) => ({ trigger: E.trigger || l, iframe: E.iframe || r, selectClass: E.selectClass || i, containerClass: E.containerClass || o, itemClass: E.itemClass || s, selectTemplate: (E.selectTemplate || Ge.defaultSelectTemplate).bind(this), menuItemTemplate: (E.menuItemTemplate || Ge.defaultMenuItemTemplate).bind(this), noMatchTemplate: ((O) => typeof O == "string" ? O.trim() === "" ? null : O : typeof O == "function" ? O.bind(this) : m || (function() {
      return "<li>No Match Found!</li>";
    }).bind(this))(m), lookup: E.lookup || g, fillAttr: E.fillAttr || d, values: E.values, loadingItemTemplate: E.loadingItemTemplate, requireLeadingSpace: E.requireLeadingSpace, searchOpts: E.searchOpts || _, menuItemLimit: E.menuItemLimit || k, menuShowMinLength: E.menuShowMinLength || L }));
    else throw new Error("[Tribute] No collection specified.");
    new Dc(this), new rn(this), new Mc(this), new Bc(this);
  }
  get isActive() {
    return this._isActive;
  }
  set isActive(e) {
    if (this._isActive != e && (this._isActive = e, this.current.element)) {
      let t = new CustomEvent(`tribute-active-${e}`);
      this.current.element.dispatchEvent(t);
    }
  }
  static defaultSelectTemplate(e) {
    return typeof e > "u" ? `${this.current.collection.trigger}${this.current.mentionText}` : this.range.isContentEditable(this.current.element) ? '<span class="tribute-mention">' + (this.current.collection.trigger + e.original[this.current.collection.fillAttr]) + "</span>" : this.current.collection.trigger + e.original[this.current.collection.fillAttr];
  }
  static defaultMenuItemTemplate(e) {
    return e.string;
  }
  static inputTypes() {
    return ["TEXTAREA", "INPUT"];
  }
  triggers() {
    return this.collection.map((e) => e.trigger);
  }
  attach(e) {
    if (!e) throw new Error("[Tribute] Must pass in a DOM node or NodeList.");
    if (typeof jQuery < "u" && e instanceof jQuery && (e = e.get()), e.constructor === NodeList || e.constructor === HTMLCollection || e.constructor === Array) {
      let r = e.length;
      for (var t = 0; t < r; ++t) this._attach(e[t]);
    } else this._attach(e);
  }
  _attach(e) {
    e.hasAttribute("data-tribute") && console.warn("Tribute was already bound to " + e.nodeName), this.ensureEditable(e), this.events.bind(e), e.setAttribute("data-tribute", true);
  }
  ensureEditable(e) {
    if (Ge.inputTypes().indexOf(e.nodeName) === -1) if (e.contentEditable) e.contentEditable = true;
    else throw new Error("[Tribute] Cannot bind to " + e.nodeName);
  }
  createMenu(e) {
    let t = this.range.getDocument().createElement("div"), r = this.range.getDocument().createElement("ul");
    return t.className = e, t.appendChild(r), this.menuContainer ? this.menuContainer.appendChild(t) : this.range.getDocument().body.appendChild(t);
  }
  showMenuFor(e, t) {
    if (this.isActive && this.current.element === e && this.current.mentionText === this.currentMentionTextSnapshot) return;
    this.currentMentionTextSnapshot = this.current.mentionText, this.menu || (this.menu = this.createMenu(this.current.collection.containerClass), e.tributeMenu = this.menu, this.menuEvents.bind(this.menu)), this.isActive = true, this.menuSelected = 0, this.current.mentionText || (this.current.mentionText = "");
    const r = (i) => {
      if (!this.isActive) return;
      let o = this.search.filter(this.current.mentionText, i, { pre: this.current.collection.searchOpts.pre || "<span>", post: this.current.collection.searchOpts.post || "</span>", skip: this.current.collection.searchOpts.skip, extract: (a) => {
        if (typeof this.current.collection.lookup == "string") return a[this.current.collection.lookup];
        if (typeof this.current.collection.lookup == "function") return this.current.collection.lookup(a, this.current.mentionText);
        throw new Error("Invalid lookup attribute, lookup must be string or function.");
      } });
      this.current.collection.menuItemLimit && (o = o.slice(0, this.current.collection.menuItemLimit)), this.current.filteredItems = o;
      let s = this.menu.querySelector("ul");
      if (!o.length) {
        let a = new CustomEvent("tribute-no-match", { detail: this.menu });
        this.current.element.dispatchEvent(a), typeof this.current.collection.noMatchTemplate == "function" && !this.current.collection.noMatchTemplate() || !this.current.collection.noMatchTemplate ? this.hideMenu() : (typeof this.current.collection.noMatchTemplate == "function" ? s.innerHTML = this.current.collection.noMatchTemplate() : s.innerHTML = this.current.collection.noMatchTemplate, this.range.positionMenuAtCaret(t));
        return;
      }
      s.innerHTML = "";
      let l = this.range.getDocument().createDocumentFragment();
      o.forEach((a, c) => {
        let u = this.range.getDocument().createElement("li");
        u.setAttribute("data-index", c), u.className = this.current.collection.itemClass, u.addEventListener("mousemove", (f) => {
          let [g, d] = this._findLiTarget(f.target);
          f.movementY !== 0 && this.events.setActiveLi(d);
        }), this.menuSelected === c && u.classList.add(this.current.collection.selectClass), u.innerHTML = this.current.collection.menuItemTemplate(a), l.appendChild(u);
      }), s.appendChild(l), this.range.positionMenuAtCaret(t);
    };
    typeof this.current.collection.values == "function" ? (this.current.collection.loadingItemTemplate && (this.menu.querySelector("ul").innerHTML = this.current.collection.loadingItemTemplate, this.range.positionMenuAtCaret(t)), this.current.collection.values(this.current.mentionText, r)) : r(this.current.collection.values);
  }
  _findLiTarget(e) {
    if (!e) return [];
    const t = e.getAttribute("data-index");
    return t ? [e, t] : this._findLiTarget(e.parentNode);
  }
  showMenuForCollection(e, t) {
    e !== document.activeElement && this.placeCaretAtEnd(e), this.current.collection = this.collection[t || 0], this.current.externalTrigger = true, this.current.element = e, e.isContentEditable ? this.insertTextAtCursor(this.current.collection.trigger) : this.insertAtCaret(e, this.current.collection.trigger), this.showMenuFor(e);
  }
  placeCaretAtEnd(e) {
    if (e.focus(), typeof window.getSelection < "u" && typeof document.createRange < "u") {
      var t = document.createRange();
      t.selectNodeContents(e), t.collapse(false);
      var r = window.getSelection();
      r.removeAllRanges(), r.addRange(t);
    } else if (typeof document.body.createTextRange < "u") {
      var i = document.body.createTextRange();
      i.moveToElementText(e), i.collapse(false), i.select();
    }
  }
  insertTextAtCursor(e) {
    var t, r;
    t = window.getSelection(), r = t.getRangeAt(0), r.deleteContents();
    var i = document.createTextNode(e);
    r.insertNode(i), r.selectNodeContents(i), r.collapse(false), t.removeAllRanges(), t.addRange(r);
  }
  insertAtCaret(e, t) {
    var r = e.scrollTop, i = e.selectionStart, o = e.value.substring(0, i), s = e.value.substring(e.selectionEnd, e.value.length);
    e.value = o + t + s, i = i + t.length, e.selectionStart = i, e.selectionEnd = i, e.focus(), e.scrollTop = r;
  }
  hideMenu() {
    this.menu && (this.menu.style.cssText = "display: none;", this.isActive = false, this.menuSelected = 0, this.current = {});
  }
  selectItemAtIndex(e, t) {
    if (e = parseInt(e), typeof e != "number" || isNaN(e)) return;
    let r = this.current.filteredItems[e], i = this.current.collection.selectTemplate(r);
    i !== null && this.replaceText(i, t, r);
  }
  replaceText(e, t, r) {
    this.range.replaceTriggerText(e, true, true, t, r);
  }
  _append(e, t, r) {
    if (typeof e.values == "function") throw new Error("Unable to append to values, as it is a function.");
    r ? e.values = t : e.values = e.values.concat(t);
  }
  append(e, t, r) {
    let i = parseInt(e);
    if (typeof i != "number") throw new Error("please provide an index for the collection to update.");
    let o = this.collection[i];
    this._append(o, t, r);
  }
  appendCurrent(e, t) {
    if (this.isActive) this._append(this.current.collection, e, t);
    else throw new Error("No active state. Please use append instead and pass an index.");
  }
  detach(e) {
    if (!e) throw new Error("[Tribute] Must pass in a DOM node or NodeList.");
    if (typeof jQuery < "u" && e instanceof jQuery && (e = e.get()), e.constructor === NodeList || e.constructor === HTMLCollection || e.constructor === Array) {
      let r = e.length;
      for (var t = 0; t < r; ++t) this._detach(e[t]);
    } else this._detach(e);
  }
  _detach(e) {
    this.events.unbind(e), e.tributeMenu && this.menuEvents.unbind(e.tributeMenu), setTimeout(() => {
      e.removeAttribute("data-tribute"), this.isActive = false, e.tributeMenu && e.tributeMenu.remove();
    });
  }
}
function Un(n, e) {
  this.init(n, e);
}
Un.instance = function(n, e) {
  return new Un(n, e);
};
Un.prototype = { ID: "hit", init: function(n, e) {
  typeof n == "string" ? this.el = document.querySelector(n) : this.el = n, this.getType(e) === "custom" ? (this.highlight = e, this.generate()) : console.error("valid config object not provided");
}, getType: function(n) {
  let e = typeof n;
  if (n) {
    if (Array.isArray(n)) return n.length === 2 && typeof n[0] == "number" && typeof n[1] == "number" ? "range" : "array";
    if (e === "object") {
      if (n instanceof RegExp) return "regexp";
      if (n.hasOwnProperty("highlight")) return "custom";
    } else if (e === "function" || e === "string") return e;
  } else return "falsey";
  return "other";
}, generate: function() {
  this.el.classList.add(this.ID + "-input", this.ID + "-content"), this.el.addEventListener("input", this.handleInput.bind(this)), this.el.addEventListener("scroll", this.handleScroll.bind(this)), this.highlights = document.createElement("div"), this.highlights.classList.add(this.ID + "-highlights", this.ID + "-content"), this.backdrop = document.createElement("div"), this.backdrop.classList.add(this.ID + "-backdrop"), this.backdrop.append(this.highlights), this.container = document.createElement("div"), this.container.classList.add(this.ID + "-container"), this.el.parentNode.insertBefore(this.container, this.el.nextSibling), this.container.append(this.backdrop), this.container.append(this.el), this.container.addEventListener("scroll", this.blockContainerScroll.bind(this)), this.handleInput();
}, handleInput: function() {
  let n = this.el.value, e = this.getRanges(n, this.highlight), t = this.removeStaggeredRanges(e), r = this.getBoundaries(t);
  this.renderMarks(r);
}, getRanges: function(n, e) {
  switch (this.getType(e)) {
    case "array":
      return this.getArrayRanges(n, e);
    case "function":
      return this.getFunctionRanges(n, e);
    case "regexp":
      return this.getRegExpRanges(n, e);
    case "string":
      return this.getStringRanges(n, e);
    case "range":
      return this.getRangeRanges(n, e);
    case "custom":
      return this.getCustomRanges(n, e);
    default:
      if (e) console.error("unrecognized highlight type");
      else return [];
  }
}, getArrayRanges: function(n, e) {
  let t = e.map(this.getRanges.bind(this, n));
  return Array.prototype.concat.apply([], t);
}, getFunctionRanges: function(n, e) {
  return this.getRanges(n, e(n));
}, getRegExpRanges: function(n, e) {
  let t = [], r;
  for (; (r = e.exec(n), r !== null) && (t.push([r.index, r.index + r[0].length]), !!e.global); ) ;
  return t;
}, getStringRanges: function(n, e) {
  let t = [], r = n.toLowerCase(), i = e.toLowerCase(), o = 0;
  for (; o = r.indexOf(i, o), o !== -1; ) t.push([o, o + i.length]), o += i.length;
  return t;
}, getRangeRanges: function(n, e) {
  return [e];
}, getCustomRanges: function(n, e) {
  let t = this.getRanges(n, e.highlight);
  return e.className && t.forEach(function(r) {
    r.className ? r.className = e.className + " " + r.className : r.className = e.className;
  }), e.blank && t.forEach(function(r) {
    r.blank = e.blank;
  }), t;
}, removeStaggeredRanges: function(n) {
  let e = [];
  return n.forEach(function(t) {
    e.some(function(i) {
      let o = t[0] > i[0] && t[0] < i[1], s = t[1] > i[0] && t[1] < i[1];
      return o !== s;
    }) || e.push(t);
  }), e;
}, getBoundaries: function(n) {
  let e = [];
  return n.forEach(function(t) {
    e.push({ type: "start", index: t[0], className: t.className, blank: t.blank }), e.push({ type: "stop", index: t[1] });
  }), this.sortBoundaries(e), e;
}, sortBoundaries: function(n) {
  n.sort(function(e, t) {
    return e.index !== t.index ? t.index - e.index : e.type === "stop" && t.type === "start" ? 1 : e.type === "start" && t.type === "stop" ? -1 : 0;
  });
}, renderMarks: function(n) {
  let e = this.el.value;
  const t = e;
  n.forEach(function(r, i) {
    let o;
    r.type === "start" ? o = "{{hit-mark-start|" + i + "}}" : o = "{{hit-mark-stop}}", e = e.slice(0, r.index) + o + e.slice(r.index);
  }), e = e.replace(/\n({{hit-mark-stop}})?$/, `
$1`), e = e.replace(/</g, "&lt;").replace(/>/g, "&gt;"), e = e.replace(/{{hit-mark-start\|(\d+)}}/g, function(r, i) {
    const o = n[+i].className;
    if (o) {
      let s = '<mark class="' + o + '"';
      if (o === "word") {
        let l = t.slice(n[+i].index, n[+i - 1].index);
        l = l.replace(/"/g, "&quot;"), s += ' data-word="' + l + '"';
      }
      return s + ">";
    } else return "<mark>";
  }), e = e.replace(/{{hit-mark-stop}}/g, "</mark>"), e += '<mark class="placeholder"> \u26A1 </mark>', this.highlights.innerHTML = e, this.el.dispatchEvent(new CustomEvent("highlights-updated"));
}, handleScroll: function() {
  this.backdrop.scrollTop = this.el.scrollTop;
  let n = this.el.scrollLeft;
  n > 0 ? this.backdrop.style.transform = "translateX(" + -n + "px)" : this.backdrop.style.transform = "";
}, blockContainerScroll: function() {
  this.container.scrollLeft = 0;
}, destroy: function() {
  this.container.parentElement.replaceChild(this.el, this.container), this.el.classList.remove(this.ID + "-content", this.ID + "-input");
} };
export {
  Un as H,
  Ge as T,
  zc as a,
  Fc as c,
  Uc as f,
  qc as n,
  an as t
};

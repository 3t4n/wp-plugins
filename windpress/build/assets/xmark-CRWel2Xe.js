import { d as Wt, f as qt } from "./_plugin-vue_export-helper-Ds8ZmEpB.js";
import { k as ge, r as de, l as ft, D as ce, F as we, v as N, M as _e, B as mt, L as Ve, u as oe, E as Gt, al as gt, x as G, G as Ye, J as Yt, T as xe, am as Ne, n as wt, an as Xt, ao as Ut, ap as Kt, aq as Zt, ar as Jt, as as Qt, w as eo, m as to } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
const oo = ["top", "right", "bottom", "left"], Xe = ["start", "end"], Ue = oo.reduce((e, t) => e.concat(t, t + "-" + Xe[0], t + "-" + Xe[1]), []), pe = Math.min, Z = Math.max, no = { left: "right", right: "left", bottom: "top", top: "bottom" }, io = { start: "end", end: "start" };
function Ee(e, t, o) {
  return Z(e, pe(t, o));
}
function Q(e, t) {
  return typeof e == "function" ? e(t) : e;
}
function F(e) {
  return e.split("-")[0];
}
function M(e) {
  return e.split("-")[1];
}
function vt(e) {
  return e === "x" ? "y" : "x";
}
function je(e) {
  return e === "y" ? "height" : "width";
}
function J(e) {
  return ["top", "bottom"].includes(F(e)) ? "y" : "x";
}
function We(e) {
  return vt(J(e));
}
function yt(e, t, o) {
  o === void 0 && (o = false);
  const n = M(e), i = We(e), s = je(i);
  let r = i === "x" ? n === (o ? "end" : "start") ? "right" : "left" : n === "start" ? "bottom" : "top";
  return t.reference[s] > t.floating[s] && (r = Se(r)), [r, Se(r)];
}
function so(e) {
  const t = Se(e);
  return [be(e), t, be(t)];
}
function be(e) {
  return e.replace(/start|end/g, (t) => io[t]);
}
function ro(e, t, o) {
  const n = ["left", "right"], i = ["right", "left"], s = ["top", "bottom"], r = ["bottom", "top"];
  switch (e) {
    case "top":
    case "bottom":
      return o ? t ? i : n : t ? n : i;
    case "left":
    case "right":
      return t ? s : r;
    default:
      return [];
  }
}
function ao(e, t, o, n) {
  const i = M(e);
  let s = ro(F(e), o === "start", n);
  return i && (s = s.map((r) => r + "-" + i), t && (s = s.concat(s.map(be)))), s;
}
function Se(e) {
  return e.replace(/left|right|bottom|top/g, (t) => no[t]);
}
function lo(e) {
  return { top: 0, right: 0, bottom: 0, left: 0, ...e };
}
function $t(e) {
  return typeof e != "number" ? lo(e) : { top: e, right: e, bottom: e, left: e };
}
function se(e) {
  const { x: t, y: o, width: n, height: i } = e;
  return { width: n, height: i, top: o, left: t, right: t + n, bottom: o + i, x: t, y: o };
}
function Ke(e, t, o) {
  let { reference: n, floating: i } = e;
  const s = J(t), r = We(t), a = je(r), l = F(t), d = s === "y", u = n.x + n.width / 2 - i.width / 2, p = n.y + n.height / 2 - i.height / 2, m = n[a] / 2 - i[a] / 2;
  let h;
  switch (l) {
    case "top":
      h = { x: u, y: n.y - i.height };
      break;
    case "bottom":
      h = { x: u, y: n.y + n.height };
      break;
    case "right":
      h = { x: n.x + n.width, y: p };
      break;
    case "left":
      h = { x: n.x - i.width, y: p };
      break;
    default:
      h = { x: n.x, y: n.y };
  }
  switch (M(t)) {
    case "start":
      h[r] -= m * (o && d ? -1 : 1);
      break;
    case "end":
      h[r] += m * (o && d ? -1 : 1);
      break;
  }
  return h;
}
const co = async (e, t, o) => {
  const { placement: n = "bottom", strategy: i = "absolute", middleware: s = [], platform: r } = o, a = s.filter(Boolean), l = await (r.isRTL == null ? void 0 : r.isRTL(t));
  let d = await r.getElementRects({ reference: e, floating: t, strategy: i }), { x: u, y: p } = Ke(d, n, l), m = n, h = {}, g = 0;
  for (let c = 0; c < a.length; c++) {
    const { name: f, fn: w } = a[c], { x: v, y: $, data: S, reset: _ } = await w({ x: u, y: p, initialPlacement: n, placement: m, strategy: i, middlewareData: h, rects: d, platform: r, elements: { reference: e, floating: t } });
    u = v ?? u, p = $ ?? p, h = { ...h, [f]: { ...h[f], ...S } }, _ && g <= 50 && (g++, typeof _ == "object" && (_.placement && (m = _.placement), _.rects && (d = _.rects === true ? await r.getElementRects({ reference: e, floating: t, strategy: i }) : _.rects), { x: u, y: p } = Ke(d, m, l)), c = -1);
  }
  return { x: u, y: p, placement: m, strategy: i, middlewareData: h };
};
async function Ce(e, t) {
  var o;
  t === void 0 && (t = {});
  const { x: n, y: i, platform: s, rects: r, elements: a, strategy: l } = e, { boundary: d = "clippingAncestors", rootBoundary: u = "viewport", elementContext: p = "floating", altBoundary: m = false, padding: h = 0 } = Q(t, e), g = $t(h), f = a[m ? p === "floating" ? "reference" : "floating" : p], w = se(await s.getClippingRect({ element: (o = await (s.isElement == null ? void 0 : s.isElement(f))) == null || o ? f : f.contextElement || await (s.getDocumentElement == null ? void 0 : s.getDocumentElement(a.floating)), boundary: d, rootBoundary: u, strategy: l })), v = p === "floating" ? { x: n, y: i, width: r.floating.width, height: r.floating.height } : r.reference, $ = await (s.getOffsetParent == null ? void 0 : s.getOffsetParent(a.floating)), S = await (s.isElement == null ? void 0 : s.isElement($)) ? await (s.getScale == null ? void 0 : s.getScale($)) || { x: 1, y: 1 } : { x: 1, y: 1 }, _ = se(s.convertOffsetParentRelativeRectToViewportRelativeRect ? await s.convertOffsetParentRelativeRectToViewportRelativeRect({ elements: a, rect: v, offsetParent: $, strategy: l }) : v);
  return { top: (w.top - _.top + g.top) / S.y, bottom: (_.bottom - w.bottom + g.bottom) / S.y, left: (w.left - _.left + g.left) / S.x, right: (_.right - w.right + g.right) / S.x };
}
const po = (e) => ({ name: "arrow", options: e, async fn(t) {
  const { x: o, y: n, placement: i, rects: s, platform: r, elements: a, middlewareData: l } = t, { element: d, padding: u = 0 } = Q(e, t) || {};
  if (d == null) return {};
  const p = $t(u), m = { x: o, y: n }, h = We(i), g = je(h), c = await r.getDimensions(d), f = h === "y", w = f ? "top" : "left", v = f ? "bottom" : "right", $ = f ? "clientHeight" : "clientWidth", S = s.reference[g] + s.reference[h] - m[h] - s.floating[g], _ = m[h] - s.reference[h], P = await (r.getOffsetParent == null ? void 0 : r.getOffsetParent(d));
  let A = P ? P[$] : 0;
  (!A || !await (r.isElement == null ? void 0 : r.isElement(P))) && (A = a.floating[$] || s.floating[g]);
  const T = S / 2 - _ / 2, b = A / 2 - c[g] / 2 - 1, x = pe(p[w], b), O = pe(p[v], b), L = x, B = A - c[g] - O, C = A / 2 - c[g] / 2 + T, ee = Ee(L, C, B), I = !l.arrow && M(i) != null && C !== ee && s.reference[g] / 2 - (C < L ? x : O) - c[g] / 2 < 0, E = I ? C < L ? C - L : C - B : 0;
  return { [h]: m[h] + E, data: { [h]: ee, centerOffset: C - ee - E, ...I && { alignmentOffset: E } }, reset: I };
} });
function uo(e, t, o) {
  return (e ? [...o.filter((i) => M(i) === e), ...o.filter((i) => M(i) !== e)] : o.filter((i) => F(i) === i)).filter((i) => e ? M(i) === e || (t ? be(i) !== i : false) : true);
}
const ho = function(e) {
  return e === void 0 && (e = {}), { name: "autoPlacement", options: e, async fn(t) {
    var o, n, i;
    const { rects: s, middlewareData: r, placement: a, platform: l, elements: d } = t, { crossAxis: u = false, alignment: p, allowedPlacements: m = Ue, autoAlignment: h = true, ...g } = Q(e, t), c = p !== void 0 || m === Ue ? uo(p || null, h, m) : m, f = await Ce(t, g), w = ((o = r.autoPlacement) == null ? void 0 : o.index) || 0, v = c[w];
    if (v == null) return {};
    const $ = yt(v, s, await (l.isRTL == null ? void 0 : l.isRTL(d.floating)));
    if (a !== v) return { reset: { placement: c[0] } };
    const S = [f[F(v)], f[$[0]], f[$[1]]], _ = [...((n = r.autoPlacement) == null ? void 0 : n.overflows) || [], { placement: v, overflows: S }], P = c[w + 1];
    if (P) return { data: { index: w + 1, overflows: _ }, reset: { placement: P } };
    const A = _.map((x) => {
      const O = M(x.placement);
      return [x.placement, O && u ? x.overflows.slice(0, 2).reduce((L, B) => L + B, 0) : x.overflows[0], x.overflows];
    }).sort((x, O) => x[1] - O[1]), b = ((i = A.filter((x) => x[2].slice(0, M(x[0]) ? 2 : 3).every((O) => O <= 0))[0]) == null ? void 0 : i[0]) || A[0][0];
    return b !== a ? { data: { index: w + 1, overflows: _ }, reset: { placement: b } } : {};
  } };
}, fo = function(e) {
  return e === void 0 && (e = {}), { name: "flip", options: e, async fn(t) {
    var o, n;
    const { placement: i, middlewareData: s, rects: r, initialPlacement: a, platform: l, elements: d } = t, { mainAxis: u = true, crossAxis: p = true, fallbackPlacements: m, fallbackStrategy: h = "bestFit", fallbackAxisSideDirection: g = "none", flipAlignment: c = true, ...f } = Q(e, t);
    if ((o = s.arrow) != null && o.alignmentOffset) return {};
    const w = F(i), v = J(a), $ = F(a) === a, S = await (l.isRTL == null ? void 0 : l.isRTL(d.floating)), _ = m || ($ || !c ? [Se(a)] : so(a)), P = g !== "none";
    !m && P && _.push(...ao(a, c, g, S));
    const A = [a, ..._], T = await Ce(t, f), b = [];
    let x = ((n = s.flip) == null ? void 0 : n.overflows) || [];
    if (u && b.push(T[w]), p) {
      const C = yt(i, r, S);
      b.push(T[C[0]], T[C[1]]);
    }
    if (x = [...x, { placement: i, overflows: b }], !b.every((C) => C <= 0)) {
      var O, L;
      const C = (((O = s.flip) == null ? void 0 : O.index) || 0) + 1, ee = A[C];
      if (ee) return { data: { index: C, overflows: x }, reset: { placement: ee } };
      let I = (L = x.filter((E) => E.overflows[0] <= 0).sort((E, V) => E.overflows[1] - V.overflows[1])[0]) == null ? void 0 : L.placement;
      if (!I) switch (h) {
        case "bestFit": {
          var B;
          const E = (B = x.filter((V) => {
            if (P) {
              const j = J(V.placement);
              return j === v || j === "y";
            }
            return true;
          }).map((V) => [V.placement, V.overflows.filter((j) => j > 0).reduce((j, jt) => j + jt, 0)]).sort((V, j) => V[1] - j[1])[0]) == null ? void 0 : B[0];
          E && (I = E);
          break;
        }
        case "initialPlacement":
          I = a;
          break;
      }
      if (i !== I) return { reset: { placement: I } };
    }
    return {};
  } };
};
async function mo(e, t) {
  const { placement: o, platform: n, elements: i } = e, s = await (n.isRTL == null ? void 0 : n.isRTL(i.floating)), r = F(o), a = M(o), l = J(o) === "y", d = ["left", "top"].includes(r) ? -1 : 1, u = s && l ? -1 : 1, p = Q(t, e);
  let { mainAxis: m, crossAxis: h, alignmentAxis: g } = typeof p == "number" ? { mainAxis: p, crossAxis: 0, alignmentAxis: null } : { mainAxis: p.mainAxis || 0, crossAxis: p.crossAxis || 0, alignmentAxis: p.alignmentAxis };
  return a && typeof g == "number" && (h = a === "end" ? g * -1 : g), l ? { x: h * u, y: m * d } : { x: m * d, y: h * u };
}
const go = function(e) {
  return e === void 0 && (e = 0), { name: "offset", options: e, async fn(t) {
    var o, n;
    const { x: i, y: s, placement: r, middlewareData: a } = t, l = await mo(t, e);
    return r === ((o = a.offset) == null ? void 0 : o.placement) && (n = a.arrow) != null && n.alignmentOffset ? {} : { x: i + l.x, y: s + l.y, data: { ...l, placement: r } };
  } };
}, wo = function(e) {
  return e === void 0 && (e = {}), { name: "shift", options: e, async fn(t) {
    const { x: o, y: n, placement: i } = t, { mainAxis: s = true, crossAxis: r = false, limiter: a = { fn: (f) => {
      let { x: w, y: v } = f;
      return { x: w, y: v };
    } }, ...l } = Q(e, t), d = { x: o, y: n }, u = await Ce(t, l), p = J(F(i)), m = vt(p);
    let h = d[m], g = d[p];
    if (s) {
      const f = m === "y" ? "top" : "left", w = m === "y" ? "bottom" : "right", v = h + u[f], $ = h - u[w];
      h = Ee(v, h, $);
    }
    if (r) {
      const f = p === "y" ? "top" : "left", w = p === "y" ? "bottom" : "right", v = g + u[f], $ = g - u[w];
      g = Ee(v, g, $);
    }
    const c = a.fn({ ...t, [m]: h, [p]: g });
    return { ...c, data: { x: c.x - o, y: c.y - n, enabled: { [m]: s, [p]: r } } };
  } };
}, vo = function(e) {
  return e === void 0 && (e = {}), { name: "size", options: e, async fn(t) {
    var o, n;
    const { placement: i, rects: s, platform: r, elements: a } = t, { apply: l = () => {
    }, ...d } = Q(e, t), u = await Ce(t, d), p = F(i), m = M(i), h = J(i) === "y", { width: g, height: c } = s.floating;
    let f, w;
    p === "top" || p === "bottom" ? (f = p, w = m === (await (r.isRTL == null ? void 0 : r.isRTL(a.floating)) ? "start" : "end") ? "left" : "right") : (w = p, f = m === "end" ? "top" : "bottom");
    const v = c - u.top - u.bottom, $ = g - u.left - u.right, S = pe(c - u[f], v), _ = pe(g - u[w], $), P = !t.middlewareData.shift;
    let A = S, T = _;
    if ((o = t.middlewareData.shift) != null && o.enabled.x && (T = $), (n = t.middlewareData.shift) != null && n.enabled.y && (A = v), P && !m) {
      const x = Z(u.left, 0), O = Z(u.right, 0), L = Z(u.top, 0), B = Z(u.bottom, 0);
      h ? T = g - 2 * (x !== 0 || O !== 0 ? x + O : Z(u.left, u.right)) : A = c - 2 * (L !== 0 || B !== 0 ? L + B : Z(u.top, u.bottom));
    }
    await l({ ...t, availableWidth: T, availableHeight: A });
    const b = await r.getDimensions(a.floating);
    return g !== b.width || c !== b.height ? { reset: { rects: true } } : {};
  } };
};
function k(e) {
  var t;
  return ((t = e.ownerDocument) == null ? void 0 : t.defaultView) || window;
}
function R(e) {
  return k(e).getComputedStyle(e);
}
const Ze = Math.min, re = Math.max, Te = Math.round;
function _t(e) {
  const t = R(e);
  let o = parseFloat(t.width), n = parseFloat(t.height);
  const i = e.offsetWidth, s = e.offsetHeight, r = Te(o) !== i || Te(n) !== s;
  return r && (o = i, n = s), { width: o, height: n, fallback: r };
}
function U(e) {
  return bt(e) ? (e.nodeName || "").toLowerCase() : "";
}
let ve;
function xt() {
  if (ve) return ve;
  const e = navigator.userAgentData;
  return e && Array.isArray(e.brands) ? (ve = e.brands.map((t) => t.brand + "/" + t.version).join(" "), ve) : navigator.userAgent;
}
function D(e) {
  return e instanceof k(e).HTMLElement;
}
function Y(e) {
  return e instanceof k(e).Element;
}
function bt(e) {
  return e instanceof k(e).Node;
}
function Je(e) {
  return typeof ShadowRoot > "u" ? false : e instanceof k(e).ShadowRoot || e instanceof ShadowRoot;
}
function Oe(e) {
  const { overflow: t, overflowX: o, overflowY: n, display: i } = R(e);
  return /auto|scroll|overlay|hidden|clip/.test(t + n + o) && !["inline", "contents"].includes(i);
}
function yo(e) {
  return ["table", "td", "th"].includes(U(e));
}
function Re(e) {
  const t = /firefox/i.test(xt()), o = R(e), n = o.backdropFilter || o.WebkitBackdropFilter;
  return o.transform !== "none" || o.perspective !== "none" || !!n && n !== "none" || t && o.willChange === "filter" || t && !!o.filter && o.filter !== "none" || ["transform", "perspective"].some((i) => o.willChange.includes(i)) || ["paint", "layout", "strict", "content"].some((i) => {
    const s = o.contain;
    return s != null && s.includes(i);
  });
}
function St() {
  return !/^((?!chrome|android).)*safari/i.test(xt());
}
function qe(e) {
  return ["html", "body", "#document"].includes(U(e));
}
function Tt(e) {
  return Y(e) ? e : e.contextElement;
}
const Pt = { x: 1, y: 1 };
function te(e) {
  const t = Tt(e);
  if (!D(t)) return Pt;
  const o = t.getBoundingClientRect(), { width: n, height: i, fallback: s } = _t(t);
  let r = (s ? Te(o.width) : o.width) / n, a = (s ? Te(o.height) : o.height) / i;
  return r && Number.isFinite(r) || (r = 1), a && Number.isFinite(a) || (a = 1), { x: r, y: a };
}
function ue(e, t, o, n) {
  var i, s;
  t === void 0 && (t = false), o === void 0 && (o = false);
  const r = e.getBoundingClientRect(), a = Tt(e);
  let l = Pt;
  t && (n ? Y(n) && (l = te(n)) : l = te(e));
  const d = a ? k(a) : window, u = !St() && o;
  let p = (r.left + (u && ((i = d.visualViewport) == null ? void 0 : i.offsetLeft) || 0)) / l.x, m = (r.top + (u && ((s = d.visualViewport) == null ? void 0 : s.offsetTop) || 0)) / l.y, h = r.width / l.x, g = r.height / l.y;
  if (a) {
    const c = k(a), f = n && Y(n) ? k(n) : n;
    let w = c.frameElement;
    for (; w && n && f !== c; ) {
      const v = te(w), $ = w.getBoundingClientRect(), S = getComputedStyle(w);
      $.x += (w.clientLeft + parseFloat(S.paddingLeft)) * v.x, $.y += (w.clientTop + parseFloat(S.paddingTop)) * v.y, p *= v.x, m *= v.y, h *= v.x, g *= v.y, p += $.x, m += $.y, w = k(w).frameElement;
    }
  }
  return { width: h, height: g, top: m, right: p + h, bottom: m + g, left: p, x: p, y: m };
}
function X(e) {
  return ((bt(e) ? e.ownerDocument : e.document) || window.document).documentElement;
}
function Le(e) {
  return Y(e) ? { scrollLeft: e.scrollLeft, scrollTop: e.scrollTop } : { scrollLeft: e.pageXOffset, scrollTop: e.pageYOffset };
}
function At(e) {
  return ue(X(e)).left + Le(e).scrollLeft;
}
function he(e) {
  if (U(e) === "html") return e;
  const t = e.assignedSlot || e.parentNode || Je(e) && e.host || X(e);
  return Je(t) ? t.host : t;
}
function Ct(e) {
  const t = he(e);
  return qe(t) ? t.ownerDocument.body : D(t) && Oe(t) ? t : Ct(t);
}
function Pe(e, t) {
  var o;
  t === void 0 && (t = []);
  const n = Ct(e), i = n === ((o = e.ownerDocument) == null ? void 0 : o.body), s = k(n);
  return i ? t.concat(s, s.visualViewport || [], Oe(n) ? n : []) : t.concat(n, Pe(n));
}
function Qe(e, t, o) {
  return t === "viewport" ? se(function(n, i) {
    const s = k(n), r = X(n), a = s.visualViewport;
    let l = r.clientWidth, d = r.clientHeight, u = 0, p = 0;
    if (a) {
      l = a.width, d = a.height;
      const m = St();
      (m || !m && i === "fixed") && (u = a.offsetLeft, p = a.offsetTop);
    }
    return { width: l, height: d, x: u, y: p };
  }(e, o)) : Y(t) ? se(function(n, i) {
    const s = ue(n, true, i === "fixed"), r = s.top + n.clientTop, a = s.left + n.clientLeft, l = D(n) ? te(n) : { x: 1, y: 1 };
    return { width: n.clientWidth * l.x, height: n.clientHeight * l.y, x: a * l.x, y: r * l.y };
  }(t, o)) : se(function(n) {
    const i = X(n), s = Le(n), r = n.ownerDocument.body, a = re(i.scrollWidth, i.clientWidth, r.scrollWidth, r.clientWidth), l = re(i.scrollHeight, i.clientHeight, r.scrollHeight, r.clientHeight);
    let d = -s.scrollLeft + At(n);
    const u = -s.scrollTop;
    return R(r).direction === "rtl" && (d += re(i.clientWidth, r.clientWidth) - a), { width: a, height: l, x: d, y: u };
  }(X(e)));
}
function et(e) {
  return D(e) && R(e).position !== "fixed" ? e.offsetParent : null;
}
function tt(e) {
  const t = k(e);
  let o = et(e);
  for (; o && yo(o) && R(o).position === "static"; ) o = et(o);
  return o && (U(o) === "html" || U(o) === "body" && R(o).position === "static" && !Re(o)) ? t : o || function(n) {
    let i = he(n);
    for (; D(i) && !qe(i); ) {
      if (Re(i)) return i;
      i = he(i);
    }
    return null;
  }(e) || t;
}
function $o(e, t, o) {
  const n = D(t), i = X(t), s = ue(e, true, o === "fixed", t);
  let r = { scrollLeft: 0, scrollTop: 0 };
  const a = { x: 0, y: 0 };
  if (n || !n && o !== "fixed") if ((U(t) !== "body" || Oe(i)) && (r = Le(t)), D(t)) {
    const l = ue(t, true);
    a.x = l.x + t.clientLeft, a.y = l.y + t.clientTop;
  } else i && (a.x = At(i));
  return { x: s.left + r.scrollLeft - a.x, y: s.top + r.scrollTop - a.y, width: s.width, height: s.height };
}
const _o = { getClippingRect: function(e) {
  let { element: t, boundary: o, rootBoundary: n, strategy: i } = e;
  const s = o === "clippingAncestors" ? function(d, u) {
    const p = u.get(d);
    if (p) return p;
    let m = Pe(d).filter((f) => Y(f) && U(f) !== "body"), h = null;
    const g = R(d).position === "fixed";
    let c = g ? he(d) : d;
    for (; Y(c) && !qe(c); ) {
      const f = R(c), w = Re(c);
      (g ? w || h : w || f.position !== "static" || !h || !["absolute", "fixed"].includes(h.position)) ? h = f : m = m.filter((v) => v !== c), c = he(c);
    }
    return u.set(d, m), m;
  }(t, this._c) : [].concat(o), r = [...s, n], a = r[0], l = r.reduce((d, u) => {
    const p = Qe(t, u, i);
    return d.top = re(p.top, d.top), d.right = Ze(p.right, d.right), d.bottom = Ze(p.bottom, d.bottom), d.left = re(p.left, d.left), d;
  }, Qe(t, a, i));
  return { width: l.right - l.left, height: l.bottom - l.top, x: l.left, y: l.top };
}, convertOffsetParentRelativeRectToViewportRelativeRect: function(e) {
  let { rect: t, offsetParent: o, strategy: n } = e;
  const i = D(o), s = X(o);
  if (o === s) return t;
  let r = { scrollLeft: 0, scrollTop: 0 }, a = { x: 1, y: 1 };
  const l = { x: 0, y: 0 };
  if ((i || !i && n !== "fixed") && ((U(o) !== "body" || Oe(s)) && (r = Le(o)), D(o))) {
    const d = ue(o);
    a = te(o), l.x = d.x + o.clientLeft, l.y = d.y + o.clientTop;
  }
  return { width: t.width * a.x, height: t.height * a.y, x: t.x * a.x - r.scrollLeft * a.x + l.x, y: t.y * a.y - r.scrollTop * a.y + l.y };
}, isElement: Y, getDimensions: function(e) {
  return D(e) ? _t(e) : e.getBoundingClientRect();
}, getOffsetParent: tt, getDocumentElement: X, getScale: te, async getElementRects(e) {
  let { reference: t, floating: o, strategy: n } = e;
  const i = this.getOffsetParent || tt, s = this.getDimensions;
  return { reference: $o(t, await i(o), n), floating: { x: 0, y: 0, ...await s(o) } };
}, getClientRects: (e) => Array.from(e.getClientRects()), isRTL: (e) => R(e).direction === "rtl" }, xo = (e, t, o) => {
  const n = /* @__PURE__ */ new Map(), i = { platform: _o, ...o }, s = { ...i.platform, _c: n };
  return co(e, t, { ...i, platform: s });
};
function Ot(e, t) {
  for (const o in t) Object.prototype.hasOwnProperty.call(t, o) && (typeof t[o] == "object" && e[o] ? Ot(e[o], t[o]) : e[o] = t[o]);
}
const H = { disabled: false, distance: 5, skidding: 0, container: "body", boundary: void 0, instantMove: false, disposeTimeout: 150, popperTriggers: [], strategy: "absolute", preventOverflow: true, flip: true, shift: true, overflowPadding: 0, arrowPadding: 0, arrowOverflow: true, autoHideOnMousedown: false, themes: { tooltip: { placement: "top", triggers: ["hover", "focus", "touch"], hideTriggers: (e) => [...e, "click"], delay: { show: 200, hide: 0 }, handleResize: false, html: false, loadingContent: "..." }, dropdown: { placement: "bottom", triggers: ["click"], delay: 0, handleResize: true, autoHide: true }, menu: { $extend: "dropdown", triggers: ["hover", "focus"], popperTriggers: ["hover"], delay: { show: 0, hide: 400 } } } };
function fe(e, t) {
  let o = H.themes[e] || {}, n;
  do
    n = o[t], typeof n > "u" ? o.$extend ? o = H.themes[o.$extend] || {} : (o = null, n = H[t]) : o = null;
  while (o);
  return n;
}
function bo(e) {
  const t = [e];
  let o = H.themes[e] || {};
  do
    o.$extend && !o.$resetCss ? (t.push(o.$extend), o = H.themes[o.$extend] || {}) : o = null;
  while (o);
  return t.map((n) => `v-popper--theme-${n}`);
}
function ot(e) {
  const t = [e];
  let o = H.themes[e] || {};
  do
    o.$extend ? (t.push(o.$extend), o = H.themes[o.$extend] || {}) : o = null;
  while (o);
  return t;
}
let ne = false;
if (typeof window < "u") {
  ne = false;
  try {
    const e = Object.defineProperty({}, "passive", { get() {
      ne = true;
    } });
    window.addEventListener("test", null, e);
  } catch {
  }
}
let Lt = false;
typeof window < "u" && typeof navigator < "u" && (Lt = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream);
const kt = ["auto", "top", "bottom", "left", "right"].reduce((e, t) => e.concat([t, `${t}-start`, `${t}-end`]), []), nt = { hover: "mouseenter", focus: "focus", click: "click", touch: "touchstart", pointer: "pointerdown" }, it = { hover: "mouseleave", focus: "blur", click: "click", touch: "touchend", pointer: "pointerup" };
function st(e, t) {
  const o = e.indexOf(t);
  o !== -1 && e.splice(o, 1);
}
function Me() {
  return new Promise((e) => requestAnimationFrame(() => {
    requestAnimationFrame(e);
  }));
}
const z = [];
let K = null;
const rt = {};
function at(e) {
  let t = rt[e];
  return t || (t = rt[e] = []), t;
}
let De = function() {
};
typeof window < "u" && (De = window.Element);
function y(e) {
  return function(t) {
    return fe(t.theme, e);
  };
}
const He = "__floating-vue__popper", zt = () => ge({ name: "VPopper", provide() {
  return { [He]: { parentPopper: this } };
}, inject: { [He]: { default: null } }, props: { theme: { type: String, required: true }, targetNodes: { type: Function, required: true }, referenceNode: { type: Function, default: null }, popperNode: { type: Function, required: true }, shown: { type: Boolean, default: false }, showGroup: { type: String, default: null }, ariaId: { default: null }, disabled: { type: Boolean, default: y("disabled") }, positioningDisabled: { type: Boolean, default: y("positioningDisabled") }, placement: { type: String, default: y("placement"), validator: (e) => kt.includes(e) }, delay: { type: [String, Number, Object], default: y("delay") }, distance: { type: [Number, String], default: y("distance") }, skidding: { type: [Number, String], default: y("skidding") }, triggers: { type: Array, default: y("triggers") }, showTriggers: { type: [Array, Function], default: y("showTriggers") }, hideTriggers: { type: [Array, Function], default: y("hideTriggers") }, popperTriggers: { type: Array, default: y("popperTriggers") }, popperShowTriggers: { type: [Array, Function], default: y("popperShowTriggers") }, popperHideTriggers: { type: [Array, Function], default: y("popperHideTriggers") }, container: { type: [String, Object, De, Boolean], default: y("container") }, boundary: { type: [String, De], default: y("boundary") }, strategy: { type: String, validator: (e) => ["absolute", "fixed"].includes(e), default: y("strategy") }, autoHide: { type: [Boolean, Function], default: y("autoHide") }, handleResize: { type: Boolean, default: y("handleResize") }, instantMove: { type: Boolean, default: y("instantMove") }, eagerMount: { type: Boolean, default: y("eagerMount") }, popperClass: { type: [String, Array, Object], default: y("popperClass") }, computeTransformOrigin: { type: Boolean, default: y("computeTransformOrigin") }, autoMinSize: { type: Boolean, default: y("autoMinSize") }, autoSize: { type: [Boolean, String], default: y("autoSize") }, autoMaxSize: { type: Boolean, default: y("autoMaxSize") }, autoBoundaryMaxSize: { type: Boolean, default: y("autoBoundaryMaxSize") }, preventOverflow: { type: Boolean, default: y("preventOverflow") }, overflowPadding: { type: [Number, String], default: y("overflowPadding") }, arrowPadding: { type: [Number, String], default: y("arrowPadding") }, arrowOverflow: { type: Boolean, default: y("arrowOverflow") }, flip: { type: Boolean, default: y("flip") }, shift: { type: Boolean, default: y("shift") }, shiftCrossAxis: { type: Boolean, default: y("shiftCrossAxis") }, noAutoFocus: { type: Boolean, default: y("noAutoFocus") }, disposeTimeout: { type: Number, default: y("disposeTimeout") } }, emits: { show: () => true, hide: () => true, "update:shown": (e) => true, "apply-show": () => true, "apply-hide": () => true, "close-group": () => true, "close-directive": () => true, "auto-hide": () => true, resize: () => true }, data() {
  return { isShown: false, isMounted: false, skipTransition: false, classes: { showFrom: false, showTo: false, hideFrom: false, hideTo: true }, result: { x: 0, y: 0, placement: "", strategy: this.strategy, arrow: { x: 0, y: 0, centerOffset: 0 }, transformOrigin: null }, randomId: `popper_${[Math.random(), Date.now()].map((e) => e.toString(36).substring(2, 10)).join("_")}`, shownChildren: /* @__PURE__ */ new Set(), lastAutoHide: true, pendingHide: false, containsGlobalTarget: false, isDisposed: true, mouseDownContains: false };
}, computed: { popperId() {
  return this.ariaId != null ? this.ariaId : this.randomId;
}, shouldMountContent() {
  return this.eagerMount || this.isMounted;
}, slotData() {
  return { popperId: this.popperId, isShown: this.isShown, shouldMountContent: this.shouldMountContent, skipTransition: this.skipTransition, autoHide: typeof this.autoHide == "function" ? this.lastAutoHide : this.autoHide, show: this.show, hide: this.hide, handleResize: this.handleResize, onResize: this.onResize, classes: { ...this.classes, popperClass: this.popperClass }, result: this.positioningDisabled ? null : this.result, attrs: this.$attrs };
}, parentPopper() {
  var e;
  return (e = this[He]) == null ? void 0 : e.parentPopper;
}, hasPopperShowTriggerHover() {
  var e, t;
  return ((e = this.popperTriggers) == null ? void 0 : e.includes("hover")) || ((t = this.popperShowTriggers) == null ? void 0 : t.includes("hover"));
} }, watch: { shown: "$_autoShowHide", disabled(e) {
  e ? this.dispose() : this.init();
}, async container() {
  this.isShown && (this.$_ensureTeleport(), await this.$_computePosition());
}, triggers: { handler: "$_refreshListeners", deep: true }, positioningDisabled: "$_refreshListeners", ...["placement", "distance", "skidding", "boundary", "strategy", "overflowPadding", "arrowPadding", "preventOverflow", "shift", "shiftCrossAxis", "flip"].reduce((e, t) => (e[t] = "$_computePosition", e), {}) }, created() {
  this.autoMinSize && console.warn('[floating-vue] `autoMinSize` option is deprecated. Use `autoSize="min"` instead.'), this.autoMaxSize && console.warn("[floating-vue] `autoMaxSize` option is deprecated. Use `autoBoundaryMaxSize` instead.");
}, mounted() {
  this.init(), this.$_detachPopperNode();
}, activated() {
  this.$_autoShowHide();
}, deactivated() {
  this.hide();
}, beforeUnmount() {
  this.dispose();
}, methods: { show({ event: e = null, skipDelay: t = false, force: o = false } = {}) {
  var n, i;
  (n = this.parentPopper) != null && n.lockedChild && this.parentPopper.lockedChild !== this || (this.pendingHide = false, (o || !this.disabled) && (((i = this.parentPopper) == null ? void 0 : i.lockedChild) === this && (this.parentPopper.lockedChild = null), this.$_scheduleShow(e, t), this.$emit("show"), this.$_showFrameLocked = true, requestAnimationFrame(() => {
    this.$_showFrameLocked = false;
  })), this.$emit("update:shown", true));
}, hide({ event: e = null, skipDelay: t = false } = {}) {
  var o;
  if (!this.$_hideInProgress) {
    if (this.shownChildren.size > 0) {
      this.pendingHide = true;
      return;
    }
    if (this.hasPopperShowTriggerHover && this.$_isAimingPopper()) {
      this.parentPopper && (this.parentPopper.lockedChild = this, clearTimeout(this.parentPopper.lockedChildTimer), this.parentPopper.lockedChildTimer = setTimeout(() => {
        this.parentPopper.lockedChild === this && (this.parentPopper.lockedChild.hide({ skipDelay: t }), this.parentPopper.lockedChild = null);
      }, 1e3));
      return;
    }
    ((o = this.parentPopper) == null ? void 0 : o.lockedChild) === this && (this.parentPopper.lockedChild = null), this.pendingHide = false, this.$_scheduleHide(e, t), this.$emit("hide"), this.$emit("update:shown", false);
  }
}, init() {
  var e;
  this.isDisposed && (this.isDisposed = false, this.isMounted = false, this.$_events = [], this.$_preventShow = false, this.$_referenceNode = ((e = this.referenceNode) == null ? void 0 : e.call(this)) ?? this.$el, this.$_targetNodes = this.targetNodes().filter((t) => t.nodeType === t.ELEMENT_NODE), this.$_popperNode = this.popperNode(), this.$_innerNode = this.$_popperNode.querySelector(".v-popper__inner"), this.$_arrowNode = this.$_popperNode.querySelector(".v-popper__arrow-container"), this.$_swapTargetAttrs("title", "data-original-title"), this.$_detachPopperNode(), this.triggers.length && this.$_addEventListeners(), this.shown && this.show());
}, dispose() {
  this.isDisposed || (this.isDisposed = true, this.$_removeEventListeners(), this.hide({ skipDelay: true }), this.$_detachPopperNode(), this.isMounted = false, this.isShown = false, this.$_updateParentShownChildren(false), this.$_swapTargetAttrs("data-original-title", "title"));
}, async onResize() {
  this.isShown && (await this.$_computePosition(), this.$emit("resize"));
}, async $_computePosition() {
  if (this.isDisposed || this.positioningDisabled) return;
  const e = { strategy: this.strategy, middleware: [] };
  (this.distance || this.skidding) && e.middleware.push(go({ mainAxis: this.distance, crossAxis: this.skidding }));
  const t = this.placement.startsWith("auto");
  if (t ? e.middleware.push(ho({ alignment: this.placement.split("-")[1] ?? "" })) : e.placement = this.placement, this.preventOverflow && (this.shift && e.middleware.push(wo({ padding: this.overflowPadding, boundary: this.boundary, crossAxis: this.shiftCrossAxis })), !t && this.flip && e.middleware.push(fo({ padding: this.overflowPadding, boundary: this.boundary }))), e.middleware.push(po({ element: this.$_arrowNode, padding: this.arrowPadding })), this.arrowOverflow && e.middleware.push({ name: "arrowOverflow", fn: ({ placement: n, rects: i, middlewareData: s }) => {
    let r;
    const { centerOffset: a } = s.arrow;
    return n.startsWith("top") || n.startsWith("bottom") ? r = Math.abs(a) > i.reference.width / 2 : r = Math.abs(a) > i.reference.height / 2, { data: { overflow: r } };
  } }), this.autoMinSize || this.autoSize) {
    const n = this.autoSize ? this.autoSize : this.autoMinSize ? "min" : null;
    e.middleware.push({ name: "autoSize", fn: ({ rects: i, placement: s, middlewareData: r }) => {
      var a;
      if ((a = r.autoSize) != null && a.skip) return {};
      let l, d;
      return s.startsWith("top") || s.startsWith("bottom") ? l = i.reference.width : d = i.reference.height, this.$_innerNode.style[n === "min" ? "minWidth" : n === "max" ? "maxWidth" : "width"] = l != null ? `${l}px` : null, this.$_innerNode.style[n === "min" ? "minHeight" : n === "max" ? "maxHeight" : "height"] = d != null ? `${d}px` : null, { data: { skip: true }, reset: { rects: true } };
    } });
  }
  (this.autoMaxSize || this.autoBoundaryMaxSize) && (this.$_innerNode.style.maxWidth = null, this.$_innerNode.style.maxHeight = null, e.middleware.push(vo({ boundary: this.boundary, padding: this.overflowPadding, apply: ({ availableWidth: n, availableHeight: i }) => {
    this.$_innerNode.style.maxWidth = n != null ? `${n}px` : null, this.$_innerNode.style.maxHeight = i != null ? `${i}px` : null;
  } })));
  const o = await xo(this.$_referenceNode, this.$_popperNode, e);
  Object.assign(this.result, { x: o.x, y: o.y, placement: o.placement, strategy: o.strategy, arrow: { ...o.middlewareData.arrow, ...o.middlewareData.arrowOverflow } });
}, $_scheduleShow(e, t = false) {
  if (this.$_updateParentShownChildren(true), this.$_hideInProgress = false, clearTimeout(this.$_scheduleTimer), K && this.instantMove && K.instantMove && K !== this.parentPopper) {
    K.$_applyHide(true), this.$_applyShow(true);
    return;
  }
  t ? this.$_applyShow() : this.$_scheduleTimer = setTimeout(this.$_applyShow.bind(this), this.$_computeDelay("show"));
}, $_scheduleHide(e, t = false) {
  if (this.shownChildren.size > 0) {
    this.pendingHide = true;
    return;
  }
  this.$_updateParentShownChildren(false), this.$_hideInProgress = true, clearTimeout(this.$_scheduleTimer), this.isShown && (K = this), t ? this.$_applyHide() : this.$_scheduleTimer = setTimeout(this.$_applyHide.bind(this), this.$_computeDelay("hide"));
}, $_computeDelay(e) {
  const t = this.delay;
  return parseInt(t && t[e] || t || 0);
}, async $_applyShow(e = false) {
  clearTimeout(this.$_disposeTimer), clearTimeout(this.$_scheduleTimer), this.skipTransition = e, !this.isShown && (this.$_ensureTeleport(), await Me(), await this.$_computePosition(), await this.$_applyShowEffect(), this.positioningDisabled || this.$_registerEventListeners([...Pe(this.$_referenceNode), ...Pe(this.$_popperNode)], "scroll", () => {
    this.$_computePosition();
  }));
}, async $_applyShowEffect() {
  if (this.$_hideInProgress) return;
  if (this.computeTransformOrigin) {
    const t = this.$_referenceNode.getBoundingClientRect(), o = this.$_popperNode.querySelector(".v-popper__wrapper"), n = o.parentNode.getBoundingClientRect(), i = t.x + t.width / 2 - (n.left + o.offsetLeft), s = t.y + t.height / 2 - (n.top + o.offsetTop);
    this.result.transformOrigin = `${i}px ${s}px`;
  }
  this.isShown = true, this.$_applyAttrsToTarget({ "aria-describedby": this.popperId, "data-popper-shown": "" });
  const e = this.showGroup;
  if (e) {
    let t;
    for (let o = 0; o < z.length; o++) t = z[o], t.showGroup !== e && (t.hide(), t.$emit("close-group"));
  }
  z.push(this), document.body.classList.add("v-popper--some-open");
  for (const t of ot(this.theme)) at(t).push(this), document.body.classList.add(`v-popper--some-open--${t}`);
  this.$emit("apply-show"), this.classes.showFrom = true, this.classes.showTo = false, this.classes.hideFrom = false, this.classes.hideTo = false, await Me(), this.classes.showFrom = false, this.classes.showTo = true, this.noAutoFocus || this.$_popperNode.focus();
}, async $_applyHide(e = false) {
  if (this.shownChildren.size > 0) {
    this.pendingHide = true, this.$_hideInProgress = false;
    return;
  }
  if (clearTimeout(this.$_scheduleTimer), !this.isShown) return;
  this.skipTransition = e, st(z, this), z.length === 0 && document.body.classList.remove("v-popper--some-open");
  for (const o of ot(this.theme)) {
    const n = at(o);
    st(n, this), n.length === 0 && document.body.classList.remove(`v-popper--some-open--${o}`);
  }
  K === this && (K = null), this.isShown = false, this.$_applyAttrsToTarget({ "aria-describedby": void 0, "data-popper-shown": void 0 }), clearTimeout(this.$_disposeTimer);
  const t = this.disposeTimeout;
  t !== null && (this.$_disposeTimer = setTimeout(() => {
    this.$_popperNode && (this.$_detachPopperNode(), this.isMounted = false);
  }, t)), this.$_removeEventListeners("scroll"), this.$emit("apply-hide"), this.classes.showFrom = false, this.classes.showTo = false, this.classes.hideFrom = true, this.classes.hideTo = false, await Me(), this.classes.hideFrom = false, this.classes.hideTo = true;
}, $_autoShowHide() {
  this.shown ? this.show() : this.hide();
}, $_ensureTeleport() {
  if (this.isDisposed) return;
  let e = this.container;
  if (typeof e == "string" ? e = window.document.querySelector(e) : e === false && (e = this.$_targetNodes[0].parentNode), !e) throw new Error("No container for popover: " + this.container);
  e.appendChild(this.$_popperNode), this.isMounted = true;
}, $_addEventListeners() {
  const e = (o) => {
    this.isShown && !this.$_hideInProgress || (o.usedByTooltip = true, !this.$_preventShow && this.show({ event: o }));
  };
  this.$_registerTriggerListeners(this.$_targetNodes, nt, this.triggers, this.showTriggers, e), this.$_registerTriggerListeners([this.$_popperNode], nt, this.popperTriggers, this.popperShowTriggers, e);
  const t = (o) => {
    o.usedByTooltip || this.hide({ event: o });
  };
  this.$_registerTriggerListeners(this.$_targetNodes, it, this.triggers, this.hideTriggers, t), this.$_registerTriggerListeners([this.$_popperNode], it, this.popperTriggers, this.popperHideTriggers, t);
}, $_registerEventListeners(e, t, o) {
  this.$_events.push({ targetNodes: e, eventType: t, handler: o }), e.forEach((n) => n.addEventListener(t, o, ne ? { passive: true } : void 0));
}, $_registerTriggerListeners(e, t, o, n, i) {
  let s = o;
  n != null && (s = typeof n == "function" ? n(s) : n), s.forEach((r) => {
    const a = t[r];
    a && this.$_registerEventListeners(e, a, i);
  });
}, $_removeEventListeners(e) {
  const t = [];
  this.$_events.forEach((o) => {
    const { targetNodes: n, eventType: i, handler: s } = o;
    !e || e === i ? n.forEach((r) => r.removeEventListener(i, s)) : t.push(o);
  }), this.$_events = t;
}, $_refreshListeners() {
  this.isDisposed || (this.$_removeEventListeners(), this.$_addEventListeners());
}, $_handleGlobalClose(e, t = false) {
  this.$_showFrameLocked || (this.hide({ event: e }), e.closePopover ? this.$emit("close-directive") : this.$emit("auto-hide"), t && (this.$_preventShow = true, setTimeout(() => {
    this.$_preventShow = false;
  }, 300)));
}, $_detachPopperNode() {
  this.$_popperNode.parentNode && this.$_popperNode.parentNode.removeChild(this.$_popperNode);
}, $_swapTargetAttrs(e, t) {
  for (const o of this.$_targetNodes) {
    const n = o.getAttribute(e);
    n && (o.removeAttribute(e), o.setAttribute(t, n));
  }
}, $_applyAttrsToTarget(e) {
  for (const t of this.$_targetNodes) for (const o in e) {
    const n = e[o];
    n == null ? t.removeAttribute(o) : t.setAttribute(o, n);
  }
}, $_updateParentShownChildren(e) {
  let t = this.parentPopper;
  for (; t; ) e ? t.shownChildren.add(this.randomId) : (t.shownChildren.delete(this.randomId), t.pendingHide && t.hide()), t = t.parentPopper;
}, $_isAimingPopper() {
  const e = this.$_referenceNode.getBoundingClientRect();
  if (ae >= e.left && ae <= e.right && le >= e.top && le <= e.bottom) {
    const t = this.$_popperNode.getBoundingClientRect(), o = ae - W, n = le - q, i = t.left + t.width / 2 - W + (t.top + t.height / 2) - q + t.width + t.height, s = W + o * i, r = q + n * i;
    return ye(W, q, s, r, t.left, t.top, t.left, t.bottom) || ye(W, q, s, r, t.left, t.top, t.right, t.top) || ye(W, q, s, r, t.right, t.top, t.right, t.bottom) || ye(W, q, s, r, t.left, t.bottom, t.right, t.bottom);
  }
  return false;
} }, render() {
  return this.$slots.default(this.slotData);
} });
if (typeof document < "u" && typeof window < "u") {
  if (Lt) {
    const e = ne ? { passive: true, capture: true } : true;
    document.addEventListener("touchstart", (t) => lt(t, true), e), document.addEventListener("touchend", (t) => dt(t, true), e);
  } else window.addEventListener("mousedown", (e) => lt(e, false), true), window.addEventListener("click", (e) => dt(e, false), true);
  window.addEventListener("resize", To);
}
function lt(e, t) {
  if (H.autoHideOnMousedown) Nt(e, t);
  else for (let o = 0; o < z.length; o++) {
    const n = z[o];
    try {
      n.mouseDownContains = n.popperNode().contains(e.target);
    } catch {
    }
  }
}
function dt(e, t) {
  H.autoHideOnMousedown || Nt(e, t);
}
function Nt(e, t) {
  const o = {};
  for (let n = z.length - 1; n >= 0; n--) {
    const i = z[n];
    try {
      const s = i.containsGlobalTarget = i.mouseDownContains || i.popperNode().contains(e.target);
      i.pendingHide = false, requestAnimationFrame(() => {
        if (i.pendingHide = false, !o[i.randomId] && ct(i, s, e)) {
          if (i.$_handleGlobalClose(e, t), !e.closeAllPopover && e.closePopover && s) {
            let a = i.parentPopper;
            for (; a; ) o[a.randomId] = true, a = a.parentPopper;
            return;
          }
          let r = i.parentPopper;
          for (; r && ct(r, r.containsGlobalTarget, e); ) r.$_handleGlobalClose(e, t), r = r.parentPopper;
        }
      });
    } catch {
    }
  }
}
function ct(e, t, o) {
  return o.closeAllPopover || o.closePopover && t || So(e, o) && !t;
}
function So(e, t) {
  if (typeof e.autoHide == "function") {
    const o = e.autoHide(t);
    return e.lastAutoHide = o, o;
  }
  return e.autoHide;
}
function To() {
  for (let e = 0; e < z.length; e++) z[e].$_computePosition();
}
let W = 0, q = 0, ae = 0, le = 0;
typeof window < "u" && window.addEventListener("mousemove", (e) => {
  W = ae, q = le, ae = e.clientX, le = e.clientY;
}, ne ? { passive: true } : void 0);
function ye(e, t, o, n, i, s, r, a) {
  const l = ((r - i) * (t - s) - (a - s) * (e - i)) / ((a - s) * (o - e) - (r - i) * (n - t)), d = ((o - e) * (t - s) - (n - t) * (e - i)) / ((a - s) * (o - e) - (r - i) * (n - t));
  return l >= 0 && l <= 1 && d >= 0 && d <= 1;
}
const Po = { extends: zt() }, ke = (e, t) => {
  const o = e.__vccOpts || e;
  for (const [n, i] of t) o[n] = i;
  return o;
};
function Ao(e, t, o, n, i, s) {
  return N(), oe("div", { ref: "reference", class: Ve(["v-popper", { "v-popper--shown": e.slotData.isShown }]) }, [xe(e.$slots, "default", Zt(Jt(e.slotData)))], 2);
}
const Co = ke(Po, [["render", Ao]]);
function Oo() {
  var e = window.navigator.userAgent, t = e.indexOf("MSIE ");
  if (t > 0) return parseInt(e.substring(t + 5, e.indexOf(".", t)), 10);
  var o = e.indexOf("Trident/");
  if (o > 0) {
    var n = e.indexOf("rv:");
    return parseInt(e.substring(n + 3, e.indexOf(".", n)), 10);
  }
  var i = e.indexOf("Edge/");
  return i > 0 ? parseInt(e.substring(i + 5, e.indexOf(".", i)), 10) : -1;
}
let $e;
function Fe() {
  Fe.init || (Fe.init = true, $e = Oo() !== -1);
}
var ze = { name: "ResizeObserver", props: { emitOnMount: { type: Boolean, default: false }, ignoreWidth: { type: Boolean, default: false }, ignoreHeight: { type: Boolean, default: false } }, emits: ["notify"], mounted() {
  Fe(), wt(() => {
    this._w = this.$el.offsetWidth, this._h = this.$el.offsetHeight, this.emitOnMount && this.emitSize();
  });
  const e = document.createElement("object");
  this._resizeObject = e, e.setAttribute("aria-hidden", "true"), e.setAttribute("tabindex", -1), e.onload = this.addResizeHandlers, e.type = "text/html", $e && this.$el.appendChild(e), e.data = "about:blank", $e || this.$el.appendChild(e);
}, beforeUnmount() {
  this.removeResizeHandlers();
}, methods: { compareAndNotify() {
  (!this.ignoreWidth && this._w !== this.$el.offsetWidth || !this.ignoreHeight && this._h !== this.$el.offsetHeight) && (this._w = this.$el.offsetWidth, this._h = this.$el.offsetHeight, this.emitSize());
}, emitSize() {
  this.$emit("notify", { width: this._w, height: this._h });
}, addResizeHandlers() {
  this._resizeObject.contentDocument.defaultView.addEventListener("resize", this.compareAndNotify), this.compareAndNotify();
}, removeResizeHandlers() {
  this._resizeObject && this._resizeObject.onload && (!$e && this._resizeObject.contentDocument && this._resizeObject.contentDocument.defaultView.removeEventListener("resize", this.compareAndNotify), this.$el.removeChild(this._resizeObject), this._resizeObject.onload = null, this._resizeObject = null);
} } };
const Lo = Kt();
Xt("data-v-b329ee4c");
const ko = { class: "resize-observer", tabindex: "-1" };
Ut();
const zo = Lo((e, t, o, n, i, s) => (N(), we("div", ko)));
ze.render = zo;
ze.__scopeId = "data-v-b329ee4c";
ze.__file = "src/components/ResizeObserver.vue";
const Mt = (e = "theme") => ({ computed: { themeClass() {
  return bo(this[e]);
} } }), No = ge({ name: "VPopperContent", components: { ResizeObserver: ze }, mixins: [Mt()], props: { popperId: String, theme: String, shown: Boolean, mounted: Boolean, skipTransition: Boolean, autoHide: Boolean, handleResize: Boolean, classes: Object, result: Object }, emits: ["hide", "resize"], methods: { toPx(e) {
  return e != null && !isNaN(e) ? `${e}px` : null;
} } }), Mo = ["id", "aria-hidden", "tabindex", "data-popper-placement"], Ho = { ref: "inner", class: "v-popper__inner" }, Bo = G("div", { class: "v-popper__arrow-outer" }, null, -1), Eo = G("div", { class: "v-popper__arrow-inner" }, null, -1), Ro = [Bo, Eo];
function Do(e, t, o, n, i, s) {
  const r = ce("ResizeObserver");
  return N(), oe("div", { id: e.popperId, ref: "popover", class: Ve(["v-popper__popper", [e.themeClass, e.classes.popperClass, { "v-popper__popper--shown": e.shown, "v-popper__popper--hidden": !e.shown, "v-popper__popper--show-from": e.classes.showFrom, "v-popper__popper--show-to": e.classes.showTo, "v-popper__popper--hide-from": e.classes.hideFrom, "v-popper__popper--hide-to": e.classes.hideTo, "v-popper__popper--skip-transition": e.skipTransition, "v-popper__popper--arrow-overflow": e.result && e.result.arrow.overflow, "v-popper__popper--no-positioning": !e.result }]]), style: Ne(e.result ? { position: e.result.strategy, transform: `translate3d(${Math.round(e.result.x)}px,${Math.round(e.result.y)}px,0)` } : void 0), "aria-hidden": e.shown ? "false" : "true", tabindex: e.autoHide ? 0 : void 0, "data-popper-placement": e.result ? e.result.placement : void 0, onKeyup: t[2] || (t[2] = qt((a) => e.autoHide && e.$emit("hide"), ["esc"])) }, [G("div", { class: "v-popper__backdrop", onClick: t[0] || (t[0] = (a) => e.autoHide && e.$emit("hide")) }), G("div", { class: "v-popper__wrapper", style: Ne(e.result ? { transformOrigin: e.result.transformOrigin } : void 0) }, [G("div", Ho, [e.mounted ? (N(), oe(Yt, { key: 0 }, [G("div", null, [xe(e.$slots, "default")]), e.handleResize ? (N(), we(r, { key: 0, onNotify: t[1] || (t[1] = (a) => e.$emit("resize", a)) })) : Ye("", true)], 64)) : Ye("", true)], 512), G("div", { ref: "arrow", class: "v-popper__arrow-container", style: Ne(e.result ? { left: e.toPx(e.result.arrow.x), top: e.toPx(e.result.arrow.y) } : void 0) }, Ro, 4)], 4)], 46, Mo);
}
const Ht = ke(No, [["render", Do]]), Bt = { methods: { show(...e) {
  return this.$refs.popper.show(...e);
}, hide(...e) {
  return this.$refs.popper.hide(...e);
}, dispose(...e) {
  return this.$refs.popper.dispose(...e);
}, onResize(...e) {
  return this.$refs.popper.onResize(...e);
} } };
let Ie = function() {
};
typeof window < "u" && (Ie = window.Element);
const Fo = ge({ name: "VPopperWrapper", components: { Popper: Co, PopperContent: Ht }, mixins: [Bt, Mt("finalTheme")], props: { theme: { type: String, default: null }, referenceNode: { type: Function, default: null }, shown: { type: Boolean, default: false }, showGroup: { type: String, default: null }, ariaId: { default: null }, disabled: { type: Boolean, default: void 0 }, positioningDisabled: { type: Boolean, default: void 0 }, placement: { type: String, default: void 0 }, delay: { type: [String, Number, Object], default: void 0 }, distance: { type: [Number, String], default: void 0 }, skidding: { type: [Number, String], default: void 0 }, triggers: { type: Array, default: void 0 }, showTriggers: { type: [Array, Function], default: void 0 }, hideTriggers: { type: [Array, Function], default: void 0 }, popperTriggers: { type: Array, default: void 0 }, popperShowTriggers: { type: [Array, Function], default: void 0 }, popperHideTriggers: { type: [Array, Function], default: void 0 }, container: { type: [String, Object, Ie, Boolean], default: void 0 }, boundary: { type: [String, Ie], default: void 0 }, strategy: { type: String, default: void 0 }, autoHide: { type: [Boolean, Function], default: void 0 }, handleResize: { type: Boolean, default: void 0 }, instantMove: { type: Boolean, default: void 0 }, eagerMount: { type: Boolean, default: void 0 }, popperClass: { type: [String, Array, Object], default: void 0 }, computeTransformOrigin: { type: Boolean, default: void 0 }, autoMinSize: { type: Boolean, default: void 0 }, autoSize: { type: [Boolean, String], default: void 0 }, autoMaxSize: { type: Boolean, default: void 0 }, autoBoundaryMaxSize: { type: Boolean, default: void 0 }, preventOverflow: { type: Boolean, default: void 0 }, overflowPadding: { type: [Number, String], default: void 0 }, arrowPadding: { type: [Number, String], default: void 0 }, arrowOverflow: { type: Boolean, default: void 0 }, flip: { type: Boolean, default: void 0 }, shift: { type: Boolean, default: void 0 }, shiftCrossAxis: { type: Boolean, default: void 0 }, noAutoFocus: { type: Boolean, default: void 0 }, disposeTimeout: { type: Number, default: void 0 } }, emits: { show: () => true, hide: () => true, "update:shown": (e) => true, "apply-show": () => true, "apply-hide": () => true, "close-group": () => true, "close-directive": () => true, "auto-hide": () => true, resize: () => true }, computed: { finalTheme() {
  return this.theme ?? this.$options.vPopperTheme;
} }, methods: { getTargetNodes() {
  return Array.from(this.$el.children).filter((e) => e !== this.$refs.popperContent.$el);
} } });
function Io(e, t, o, n, i, s) {
  const r = ce("PopperContent"), a = ce("Popper");
  return N(), we(a, gt({ ref: "popper" }, e.$props, { theme: e.finalTheme, "target-nodes": e.getTargetNodes, "popper-node": () => e.$refs.popperContent.$el, class: [e.themeClass], onShow: t[0] || (t[0] = () => e.$emit("show")), onHide: t[1] || (t[1] = () => e.$emit("hide")), "onUpdate:shown": t[2] || (t[2] = (l) => e.$emit("update:shown", l)), onApplyShow: t[3] || (t[3] = () => e.$emit("apply-show")), onApplyHide: t[4] || (t[4] = () => e.$emit("apply-hide")), onCloseGroup: t[5] || (t[5] = () => e.$emit("close-group")), onCloseDirective: t[6] || (t[6] = () => e.$emit("close-directive")), onAutoHide: t[7] || (t[7] = () => e.$emit("auto-hide")), onResize: t[8] || (t[8] = () => e.$emit("resize")) }), { default: _e(({ popperId: l, isShown: d, shouldMountContent: u, skipTransition: p, autoHide: m, show: h, hide: g, handleResize: c, onResize: f, classes: w, result: v }) => [xe(e.$slots, "default", { shown: d, show: h, hide: g }), mt(r, { ref: "popperContent", "popper-id": l, theme: e.finalTheme, shown: d, mounted: u, "skip-transition": p, "auto-hide": m, "handle-resize": c, classes: w, result: v, onHide: g, onResize: f }, { default: _e(() => [xe(e.$slots, "popper", { shown: d, hide: g })]), _: 2 }, 1032, ["popper-id", "theme", "shown", "mounted", "skip-transition", "auto-hide", "handle-resize", "classes", "result", "onHide", "onResize"])]), _: 3 }, 16, ["theme", "target-nodes", "popper-node", "class"]);
}
const Ge = ke(Fo, [["render", Io]]), Vo = { ...Ge, name: "VDropdown", vPopperTheme: "dropdown" }, jo = { ...Ge, name: "VMenu", vPopperTheme: "menu" }, Wo = { ...Ge, name: "VTooltip", vPopperTheme: "tooltip" }, qo = ge({ name: "VTooltipDirective", components: { Popper: zt(), PopperContent: Ht }, mixins: [Bt], inheritAttrs: false, props: { theme: { type: String, default: "tooltip" }, html: { type: Boolean, default: (e) => fe(e.theme, "html") }, content: { type: [String, Number, Function], default: null }, loadingContent: { type: String, default: (e) => fe(e.theme, "loadingContent") }, targetNodes: { type: Function, required: true } }, data() {
  return { asyncContent: null };
}, computed: { isContentAsync() {
  return typeof this.content == "function";
}, loading() {
  return this.isContentAsync && this.asyncContent == null;
}, finalContent() {
  return this.isContentAsync ? this.loading ? this.loadingContent : this.asyncContent : this.content;
} }, watch: { content: { handler() {
  this.fetchContent(true);
}, immediate: true }, async finalContent() {
  await this.$nextTick(), this.$refs.popper.onResize();
} }, created() {
  this.$_fetchId = 0;
}, methods: { fetchContent(e) {
  if (typeof this.content == "function" && this.$_isShown && (e || !this.$_loading && this.asyncContent == null)) {
    this.asyncContent = null, this.$_loading = true;
    const t = ++this.$_fetchId, o = this.content(this);
    o.then ? o.then((n) => this.onResult(t, n)) : this.onResult(t, o);
  }
}, onResult(e, t) {
  e === this.$_fetchId && (this.$_loading = false, this.asyncContent = t);
}, onShow() {
  this.$_isShown = true, this.fetchContent();
}, onHide() {
  this.$_isShown = false;
} } }), Go = ["innerHTML"], Yo = ["textContent"];
function Xo(e, t, o, n, i, s) {
  const r = ce("PopperContent"), a = ce("Popper");
  return N(), we(a, gt({ ref: "popper" }, e.$attrs, { theme: e.theme, "target-nodes": e.targetNodes, "popper-node": () => e.$refs.popperContent.$el, onApplyShow: e.onShow, onApplyHide: e.onHide }), { default: _e(({ popperId: l, isShown: d, shouldMountContent: u, skipTransition: p, autoHide: m, hide: h, handleResize: g, onResize: c, classes: f, result: w }) => [mt(r, { ref: "popperContent", class: Ve({ "v-popper--tooltip-loading": e.loading }), "popper-id": l, theme: e.theme, shown: d, mounted: u, "skip-transition": p, "auto-hide": m, "handle-resize": g, classes: f, result: w, onHide: h, onResize: c }, { default: _e(() => [e.html ? (N(), oe("div", { key: 0, innerHTML: e.finalContent }, null, 8, Go)) : (N(), oe("div", { key: 1, textContent: Gt(e.finalContent) }, null, 8, Yo))]), _: 2 }, 1032, ["class", "popper-id", "theme", "shown", "mounted", "skip-transition", "auto-hide", "handle-resize", "classes", "result", "onHide", "onResize"])]), _: 1 }, 16, ["theme", "target-nodes", "popper-node", "onApplyShow", "onApplyHide"]);
}
const Uo = ke(qo, [["render", Xo]]), Et = "v-popper--has-tooltip";
function Ko(e, t) {
  let o = e.placement;
  if (!o && t) for (const n of kt) t[n] && (o = n);
  return o || (o = fe(e.theme || "tooltip", "placement")), o;
}
function Rt(e, t, o) {
  let n;
  const i = typeof t;
  return i === "string" ? n = { content: t } : t && i === "object" ? n = t : n = { content: false }, n.placement = Ko(n, o), n.targetNodes = () => [e], n.referenceNode = () => e, n;
}
let Be, me, Zo = 0;
function Jo() {
  if (Be) return;
  me = de([]), Be = Wt({ name: "VTooltipDirectiveApp", setup() {
    return { directives: me };
  }, render() {
    return this.directives.map((t) => ft(Uo, { ...t.options, shown: t.shown || t.options.shown, key: t.id }));
  }, devtools: { hide: true } });
  const e = document.createElement("div");
  document.body.appendChild(e), Be.mount(e);
}
function Qo(e, t, o) {
  Jo();
  const n = de(Rt(e, t, o)), i = de(false), s = { id: Zo++, options: n, shown: i };
  return me.value.push(s), e.classList && e.classList.add(Et), e.$_popper = { options: n, item: s, show() {
    i.value = true;
  }, hide() {
    i.value = false;
  } };
}
function Dt(e) {
  if (e.$_popper) {
    const t = me.value.indexOf(e.$_popper.item);
    t !== -1 && me.value.splice(t, 1), delete e.$_popper, delete e.$_popperOldShown, delete e.$_popperMountTarget;
  }
  e.classList && e.classList.remove(Et);
}
function pt(e, { value: t, modifiers: o }) {
  const n = Rt(e, t, o);
  if (!n.content || fe(n.theme || "tooltip", "disabled")) Dt(e);
  else {
    let i;
    e.$_popper ? (i = e.$_popper, i.options.value = n) : i = Qo(e, t, o), typeof t.shown < "u" && t.shown !== e.$_popperOldShown && (e.$_popperOldShown = t.shown, t.shown ? i.show() : i.hide());
  }
}
const en = { beforeMount: pt, updated: pt, beforeUnmount(e) {
  Dt(e);
} };
function ut(e) {
  e.addEventListener("mousedown", Ae), e.addEventListener("click", Ae), e.addEventListener("touchstart", Ft, ne ? { passive: true } : false);
}
function ht(e) {
  e.removeEventListener("mousedown", Ae), e.removeEventListener("click", Ae), e.removeEventListener("touchstart", Ft), e.removeEventListener("touchend", It), e.removeEventListener("touchcancel", Vt);
}
function Ae(e) {
  const t = e.currentTarget;
  e.closePopover = !t.$_vclosepopover_touch, e.closeAllPopover = t.$_closePopoverModifiers && !!t.$_closePopoverModifiers.all;
}
function Ft(e) {
  if (e.changedTouches.length === 1) {
    const t = e.currentTarget;
    t.$_vclosepopover_touch = true;
    const o = e.changedTouches[0];
    t.$_vclosepopover_touchPoint = o, t.addEventListener("touchend", It), t.addEventListener("touchcancel", Vt);
  }
}
function It(e) {
  const t = e.currentTarget;
  if (t.$_vclosepopover_touch = false, e.changedTouches.length === 1) {
    const o = e.changedTouches[0], n = t.$_vclosepopover_touchPoint;
    e.closePopover = Math.abs(o.screenY - n.screenY) < 20 && Math.abs(o.screenX - n.screenX) < 20, e.closeAllPopover = t.$_closePopoverModifiers && !!t.$_closePopoverModifiers.all;
  }
}
function Vt(e) {
  const t = e.currentTarget;
  t.$_vclosepopover_touch = false;
}
const tn = { beforeMount(e, { value: t, modifiers: o }) {
  e.$_closePopoverModifiers = o, (typeof t > "u" || t) && ut(e);
}, updated(e, { value: t, oldValue: o, modifiers: n }) {
  e.$_closePopoverModifiers = n, t !== o && (typeof t > "u" || t ? ut(e) : ht(e));
}, beforeUnmount(e) {
  ht(e);
} };
function on(e, t = {}) {
  e.$_vTooltipInstalled || (e.$_vTooltipInstalled = true, Ot(H, t), e.directive("tooltip", en), e.directive("close-popper", tn), e.component("VTooltip", Wo), e.component("VDropdown", Vo), e.component("VMenu", jo));
}
const hn = { version: "5.2.2", install: on, options: H }, ie = {};
function nn(e) {
  return e.getIsPending !== void 0;
}
function sn(e) {
  if (nn(e)) return e;
  let t = true, o = e.then((n) => (t = false, n), (n) => {
    throw t = false, n;
  });
  return o.getIsPending = function() {
    return t;
  }, o;
}
function rn(e) {
  let t = {};
  const o = e.attributes;
  if (!o) return t;
  for (let n = o.length - 1; n >= 0; n--) t[o[n].name] = o[n].value;
  return t;
}
function an(e) {
  return Object.keys(e).reduce((t, o) => (e[o] !== false && e[o] !== null && e[o] !== void 0 && (t[o] = e[o]), t), {});
}
function ln(e, t) {
  const { class: o, style: n, ...i } = rn(e), { class: s, style: r, ...a } = an(t);
  return { class: [o, s], style: [n, r], ...i, ...a };
}
const fn = ge({ inheritAttrs: false, __name: "InlineSvg", props: { src: {}, title: { default: void 0 }, transformSource: { type: Function, default: (e) => e }, keepDuringLoading: { type: Boolean, default: true }, uniqueIds: { type: [Boolean, String], default: false }, uniqueIdsBase: { default: "" } }, emits: ["loaded", "unloaded", "error"], setup(e, { expose: t, emit: o }) {
  const n = e, i = o, s = Qt(), r = de(), a = de(), l = Math.random().toString(36).substring(2);
  t({ svgElSource: r, request: a }), eo(() => n.src, (c) => {
    u(c);
  }), u(n.src);
  function d(c) {
    if (c = c.cloneNode(true), n.uniqueIds) {
      const f = typeof n.uniqueIds == "string" ? n.uniqueIds : l;
      c = g(c, f, n.uniqueIdsBase);
    }
    return c = n.transformSource(c), n.title && h(c, n.title), c.innerHTML;
  }
  function u(c) {
    ie[c] || (ie[c] = p(c)), r.value && ie[c].getIsPending() && !n.keepDuringLoading && (r.value = null, i("unloaded")), ie[c].then((f) => {
      r.value = f, wt(() => {
        i("loaded", document.querySelector("svg"));
      });
    }).catch((f) => {
      r.value && (r.value = void 0, i("unloaded")), delete ie[c], i("error", f);
    });
  }
  function p(c) {
    return sn(new Promise((f, w) => {
      const v = new XMLHttpRequest();
      v.open("GET", c, true), a.value = v, v.onload = () => {
        if (v.status >= 200 && v.status < 400) try {
          let $ = new DOMParser().parseFromString(v.responseText, "text/xml").getElementsByTagName("svg")[0];
          $ ? f($) : w(new Error('Loaded file is not valid SVG"'));
        } catch ($) {
          w($);
        }
        else w(new Error("Error loading SVG"));
      }, v.onerror = w, v.send();
    }));
  }
  const m = () => r.value ? ft("svg", { ...ln(r.value, s), innerHTML: d(r.value) }) : null;
  function h(c, f) {
    const w = c.getElementsByTagName("title");
    if (w.length) w[0].textContent = f;
    else {
      const v = document.createElementNS("http://www.w3.org/2000/svg", "title");
      v.textContent = f, c.insertBefore(v, c.firstChild);
    }
  }
  function g(c, f, w = "") {
    const v = ["id", "href", "xlink:href", "xlink:role", "xlink:arcrole"], $ = ["href", "xlink:href"], S = (_, P) => $.includes(_) && (P ? !P.includes("#") : false);
    return [...c.children].forEach((_) => {
      var P;
      if ((P = _.attributes) != null && P.length) {
        const A = Object.values(_.attributes).map((T) => {
          const b = /url\((.*?)\)/.exec(T.value);
          return b != null && b[1] && (T.value = T.value.replace(b[0], `url(${w}${b[1]}_${f})`)), T;
        });
        v.forEach((T) => {
          const b = A.find((x) => x.name === T);
          b && !S(T, b.value) && (b.value = `${b.value}_${f}`);
        });
      }
      return _.children.length ? g(_, f, w) : _;
    }), c;
  }
  return (c, f) => (N(), we(m));
} }), mn = "data:image/svg+xml,%3c?xml%20version='1.0'%20encoding='iso-8859-1'?%3e%3c!--%20Generator:%20Adobe%20Illustrator%2019.0.0,%20SVG%20Export%20Plug-In%20.%20SVG%20Version:%206.00%20Build%200)%20--%3e%3csvg%20version='1.1'%20id='Capa_1'%20xmlns='http://www.w3.org/2000/svg'%20xmlns:xlink='http://www.w3.org/1999/xlink'%20x='0px'%20y='0px'%20viewBox='0%200%20512%20512'%20style='enable-background:new%200%200%20512%20512;'%20xml:space='preserve'%3e%3cg%3e%3cpath%20d='M176,384H16c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h160c8.832,0,16,7.2,16,16s-7.168,16-16,16%20c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c26.464,0,48-21.536,48-48S202.464,384,176,384z'%20/%3e%3c/g%3e%3cg%3e%3cpath%20d='M240,256c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c8.832,0,16,7.2,16,16s-7.168,16-16,16H16%20c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h224c26.464,0,48-21.536,48-48S266.464,256,240,256z'%20/%3e%3c/g%3e%3cg%3e%3cpath%20d='M288,32C164.288,32,64,132.288,64,256c0,10.88,1.056,21.536,2.56,32h128.192c-1.792-4.992-2.752-10.4-2.752-16%20c0-26.464,21.536-48,48-48c44.096,0,80,35.904,80,80c0,44.128-35.904,80-80,80h-0.416C249.76,397.408,256,413.92,256,432%20c0,16.032-4.864,30.944-13.024,43.456c14.56,2.976,29.6,4.544,45.024,4.544c123.712,0,224-100.288,224-224S411.712,32,288,32z'%20/%3e%3c/g%3e%3c/svg%3e", dn = { viewBox: "0 0 384 512", width: "0.75em", height: "1em" };
function cn(e, t) {
  return N(), oe("svg", dn, t[0] || (t[0] = [G("path", { fill: "currentColor", d: "M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7L86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256L41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3l105.4 105.3c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256z" }, null, -1)]));
}
const gn = to({ name: "fa6-solid-xmark", render: cn });
export {
  fn as F,
  hn as G,
  mn as L,
  gn as _
};

import { U as bt, V as Bt, W as P, X as G, Y as w, Z as St, _ as Tt, $ as B, a0 as Ft, a1 as x, a2 as Ut, l as Gt, a3 as Wt, a4 as jt, a5 as qt, a6 as zt, a7 as Xt, a8 as Zt, a9 as Et, aa as wt, ab as Jt, ac as Yt, ad as Qt, ae as Y, af as kt, ag as te, ah as ee, t as ne, J as se, ai as oe, aj as Q, ak as k, B as ie } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
/**
* @vue/runtime-dom v3.5.13
* (c) 2018-present Yuxi (Evan) You and Vue contributors
* @license MIT
**/
let F;
const tt = typeof window < "u" && window.trustedTypes;
if (tt) try {
  F = tt.createPolicy("vue", { createHTML: (t) => t });
} catch {
}
const At = F ? (t) => F.createHTML(t) : (t) => t, re = "http://www.w3.org/2000/svg", ae = "http://www.w3.org/1998/Math/MathML", g = typeof document < "u" ? document : null, et = g && g.createElement("template"), ce = { insert: (t, e, n) => {
  e.insertBefore(t, n || null);
}, remove: (t) => {
  const e = t.parentNode;
  e && e.removeChild(t);
}, createElement: (t, e, n, s) => {
  const o = e === "svg" ? g.createElementNS(re, t) : e === "mathml" ? g.createElementNS(ae, t) : n ? g.createElement(t, { is: n }) : g.createElement(t);
  return t === "select" && s && s.multiple != null && o.setAttribute("multiple", s.multiple), o;
}, createText: (t) => g.createTextNode(t), createComment: (t) => g.createComment(t), setText: (t, e) => {
  t.nodeValue = e;
}, setElementText: (t, e) => {
  t.textContent = e;
}, parentNode: (t) => t.parentNode, nextSibling: (t) => t.nextSibling, querySelector: (t) => g.querySelector(t), setScopeId(t, e) {
  t.setAttribute(e, "");
}, insertStaticContent(t, e, n, s, o, i) {
  const r = n ? n.previousSibling : e.lastChild;
  if (o && (o === i || o.nextSibling)) for (; e.insertBefore(o.cloneNode(true), n), !(o === i || !(o = o.nextSibling)); ) ;
  else {
    et.innerHTML = At(s === "svg" ? `<svg>${t}</svg>` : s === "mathml" ? `<math>${t}</math>` : t);
    const a = et.content;
    if (s === "svg" || s === "mathml") {
      const l = a.firstChild;
      for (; l.firstChild; ) a.appendChild(l.firstChild);
      a.removeChild(l);
    }
    e.insertBefore(a, n);
  }
  return [r ? r.nextSibling : e.firstChild, n ? n.previousSibling : e.lastChild];
} }, C = "transition", N = "animation", y = Symbol("_vtc"), _t = { name: String, type: String, css: { type: Boolean, default: true }, duration: [String, Number, Object], enterFromClass: String, enterActiveClass: String, enterToClass: String, appearFromClass: String, appearActiveClass: String, appearToClass: String, leaveFromClass: String, leaveActiveClass: String, leaveToClass: String }, yt = x({}, Ut, _t), le = (t) => (t.displayName = "Transition", t.props = yt, t), Fe = le((t, { slots: e }) => Gt(Wt, Mt(t), e)), E = (t, e = []) => {
  w(t) ? t.forEach((n) => n(...e)) : t && t(...e);
}, nt = (t) => t ? w(t) ? t.some((e) => e.length > 1) : t.length > 1 : false;
function Mt(t) {
  const e = {};
  for (const c in t) c in _t || (e[c] = t[c]);
  if (t.css === false) return e;
  const { name: n = "v", type: s, duration: o, enterFromClass: i = `${n}-enter-from`, enterActiveClass: r = `${n}-enter-active`, enterToClass: a = `${n}-enter-to`, appearFromClass: l = i, appearActiveClass: f = r, appearToClass: u = a, leaveFromClass: p = `${n}-leave-from`, leaveActiveClass: d = `${n}-leave-active`, leaveToClass: A = `${n}-leave-to` } = t, _ = fe(o), Ot = _ && _[0], xt = _ && _[1], { onBeforeEnter: W, onEnter: j, onEnterCancelled: q, onLeave: z, onLeaveCancelled: Rt, onBeforeAppear: Kt = W, onAppear: Vt = j, onAppearCancelled: Ht = q } = e, R = (c, m, T, $) => {
    c._enterCancelled = $, b(c, m ? u : a), b(c, m ? f : r), T && T();
  }, X = (c, m) => {
    c._isLeaving = false, b(c, p), b(c, A), b(c, d), m && m();
  }, Z = (c) => (m, T) => {
    const $ = c ? Vt : j, J = () => R(m, c, T);
    E($, [m, J]), st(() => {
      b(m, c ? l : i), h(m, c ? u : a), nt($) || ot(m, s, Ot, J);
    });
  };
  return x(e, { onBeforeEnter(c) {
    E(W, [c]), h(c, i), h(c, r);
  }, onBeforeAppear(c) {
    E(Kt, [c]), h(c, l), h(c, f);
  }, onEnter: Z(false), onAppear: Z(true), onLeave(c, m) {
    c._isLeaving = true;
    const T = () => X(c, m);
    h(c, p), c._enterCancelled ? (h(c, d), U()) : (U(), h(c, d)), st(() => {
      c._isLeaving && (b(c, p), h(c, A), nt(z) || ot(c, s, xt, T));
    }), E(z, [c, T]);
  }, onEnterCancelled(c) {
    R(c, false, void 0, true), E(q, [c]);
  }, onAppearCancelled(c) {
    R(c, true, void 0, true), E(Ht, [c]);
  }, onLeaveCancelled(c) {
    X(c), E(Rt, [c]);
  } });
}
function fe(t) {
  if (t == null) return null;
  if (jt(t)) return [K(t.enter), K(t.leave)];
  {
    const e = K(t);
    return [e, e];
  }
}
function K(t) {
  return qt(t);
}
function h(t, e) {
  e.split(/\s+/).forEach((n) => n && t.classList.add(n)), (t[y] || (t[y] = /* @__PURE__ */ new Set())).add(e);
}
function b(t, e) {
  e.split(/\s+/).forEach((s) => s && t.classList.remove(s));
  const n = t[y];
  n && (n.delete(e), n.size || (t[y] = void 0));
}
function st(t) {
  requestAnimationFrame(() => {
    requestAnimationFrame(t);
  });
}
let ue = 0;
function ot(t, e, n, s) {
  const o = t._endId = ++ue, i = () => {
    o === t._endId && s();
  };
  if (n != null) return setTimeout(i, n);
  const { type: r, timeout: a, propCount: l } = Nt(t, e);
  if (!r) return s();
  const f = r + "end";
  let u = 0;
  const p = () => {
    t.removeEventListener(f, d), i();
  }, d = (A) => {
    A.target === t && ++u >= l && p();
  };
  setTimeout(() => {
    u < l && p();
  }, a + 1), t.addEventListener(f, d);
}
function Nt(t, e) {
  const n = window.getComputedStyle(t), s = (_) => (n[_] || "").split(", "), o = s(`${C}Delay`), i = s(`${C}Duration`), r = it(o, i), a = s(`${N}Delay`), l = s(`${N}Duration`), f = it(a, l);
  let u = null, p = 0, d = 0;
  e === C ? r > 0 && (u = C, p = r, d = i.length) : e === N ? f > 0 && (u = N, p = f, d = l.length) : (p = Math.max(r, f), u = p > 0 ? r > f ? C : N : null, d = u ? u === C ? i.length : l.length : 0);
  const A = u === C && /\b(transform|all)(,|$)/.test(s(`${C}Property`).toString());
  return { type: u, timeout: p, propCount: d, hasTransform: A };
}
function it(t, e) {
  for (; t.length < e.length; ) t = t.concat(t);
  return Math.max(...e.map((n, s) => rt(n) + rt(t[s])));
}
function rt(t) {
  return t === "auto" ? 0 : Number(t.slice(0, -1).replace(",", ".")) * 1e3;
}
function U() {
  return document.body.offsetHeight;
}
function de(t, e, n) {
  const s = t[y];
  s && (e = (e ? [e, ...s] : [...s]).join(" ")), e == null ? t.removeAttribute("class") : n ? t.setAttribute("class", e) : t.className = e;
}
const I = Symbol("_vod"), Lt = Symbol("_vsh"), Ue = { beforeMount(t, { value: e }, { transition: n }) {
  t[I] = t.style.display === "none" ? "" : t.style.display, n && e ? n.beforeEnter(t) : L(t, e);
}, mounted(t, { value: e }, { transition: n }) {
  n && e && n.enter(t);
}, updated(t, { value: e, oldValue: n }, { transition: s }) {
  !e != !n && (s ? e ? (s.beforeEnter(t), L(t, true), s.enter(t)) : s.leave(t, () => {
    L(t, false);
  }) : L(t, e));
}, beforeUnmount(t, { value: e }) {
  L(t, e);
} };
function L(t, e) {
  t.style.display = e ? t[I] : "none", t[Lt] = !e;
}
const pe = Symbol(""), me = /(^|;)\s*display\s*:/;
function he(t, e, n) {
  const s = t.style, o = P(n);
  let i = false;
  if (n && !o) {
    if (e) if (P(e)) for (const r of e.split(";")) {
      const a = r.slice(0, r.indexOf(":")).trim();
      n[a] == null && D(s, a, "");
    }
    else for (const r in e) n[r] == null && D(s, r, "");
    for (const r in n) r === "display" && (i = true), D(s, r, n[r]);
  } else if (o) {
    if (e !== n) {
      const r = s[pe];
      r && (n += ";" + r), s.cssText = n, i = me.test(n);
    }
  } else e && t.removeAttribute("style");
  I in t && (t[I] = i ? s.display : "", t[Lt] && (s.display = "none"));
}
const at = /\s*!important$/;
function D(t, e, n) {
  if (w(n)) n.forEach((s) => D(t, e, s));
  else if (n == null && (n = ""), e.startsWith("--")) t.setProperty(e, n);
  else {
    const s = ge(t, e);
    at.test(n) ? t.setProperty(G(s), n.replace(at, ""), "important") : t[s] = n;
  }
}
const ct = ["Webkit", "Moz", "ms"], V = {};
function ge(t, e) {
  const n = V[e];
  if (n) return n;
  let s = Et(e);
  if (s !== "filter" && s in t) return V[e] = s;
  s = Yt(s);
  for (let o = 0; o < ct.length; o++) {
    const i = ct[o] + s;
    if (i in t) return V[e] = i;
  }
  return e;
}
const lt = "http://www.w3.org/1999/xlink";
function ft(t, e, n, s, o, i = Zt(e)) {
  s && e.startsWith("xlink:") ? n == null ? t.removeAttributeNS(lt, e.slice(6, e.length)) : t.setAttributeNS(lt, e, n) : n == null || i && !wt(n) ? t.removeAttribute(e) : t.setAttribute(e, i ? "" : Jt(n) ? String(n) : n);
}
function ut(t, e, n, s, o) {
  if (e === "innerHTML" || e === "textContent") {
    n != null && (t[e] = e === "innerHTML" ? At(n) : n);
    return;
  }
  const i = t.tagName;
  if (e === "value" && i !== "PROGRESS" && !i.includes("-")) {
    const a = i === "OPTION" ? t.getAttribute("value") || "" : t.value, l = n == null ? t.type === "checkbox" ? "on" : "" : String(n);
    (a !== l || !("_value" in t)) && (t.value = l), n == null && t.removeAttribute(e), t._value = n;
    return;
  }
  let r = false;
  if (n === "" || n == null) {
    const a = typeof t[e];
    a === "boolean" ? n = wt(n) : n == null && a === "string" ? (n = "", r = true) : a === "number" && (n = 0, r = true);
  }
  try {
    t[e] = n;
  } catch {
  }
  r && t.removeAttribute(o || e);
}
function S(t, e, n, s) {
  t.addEventListener(e, n, s);
}
function ve(t, e, n, s) {
  t.removeEventListener(e, n, s);
}
const dt = Symbol("_vei");
function Ce(t, e, n, s, o = null) {
  const i = t[dt] || (t[dt] = {}), r = i[e];
  if (s && r) r.value = s;
  else {
    const [a, l] = be(e);
    if (s) {
      const f = i[e] = Ee(s, o);
      S(t, a, f, l);
    } else r && (ve(t, a, r, l), i[e] = void 0);
  }
}
const pt = /(?:Once|Passive|Capture)$/;
function be(t) {
  let e;
  if (pt.test(t)) {
    e = {};
    let s;
    for (; s = t.match(pt); ) t = t.slice(0, t.length - s[0].length), e[s[0].toLowerCase()] = true;
  }
  return [t[2] === ":" ? t.slice(3) : G(t.slice(2)), e];
}
let H = 0;
const Se = Promise.resolve(), Te = () => H || (Se.then(() => H = 0), H = Date.now());
function Ee(t, e) {
  const n = (s) => {
    if (!s._vts) s._vts = Date.now();
    else if (s._vts <= n.attached) return;
    Qt(we(s, n.value), e, 5, [s]);
  };
  return n.value = t, n.attached = Te(), n;
}
function we(t, e) {
  if (w(e)) {
    const n = t.stopImmediatePropagation;
    return t.stopImmediatePropagation = () => {
      n.call(t), t._stopped = true;
    }, e.map((s) => (o) => !o._stopped && s && s(o));
  } else return e;
}
const mt = (t) => t.charCodeAt(0) === 111 && t.charCodeAt(1) === 110 && t.charCodeAt(2) > 96 && t.charCodeAt(2) < 123, Ae = (t, e, n, s, o, i) => {
  const r = o === "svg";
  e === "class" ? de(t, s, r) : e === "style" ? he(t, n, s) : zt(e) ? Xt(e) || Ce(t, e, n, s, i) : (e[0] === "." ? (e = e.slice(1), true) : e[0] === "^" ? (e = e.slice(1), false) : _e(t, e, s, r)) ? (ut(t, e, s), !t.tagName.includes("-") && (e === "value" || e === "checked" || e === "selected") && ft(t, e, s, r, i, e !== "value")) : t._isVueCE && (/[A-Z]/.test(e) || !P(s)) ? ut(t, Et(e), s, i, e) : (e === "true-value" ? t._trueValue = s : e === "false-value" && (t._falseValue = s), ft(t, e, s, r));
};
function _e(t, e, n, s) {
  if (s) return !!(e === "innerHTML" || e === "textContent" || e in t && mt(e) && bt(n));
  if (e === "spellcheck" || e === "draggable" || e === "translate" || e === "form" || e === "list" && t.tagName === "INPUT" || e === "type" && t.tagName === "TEXTAREA") return false;
  if (e === "width" || e === "height") {
    const o = t.tagName;
    if (o === "IMG" || o === "VIDEO" || o === "CANVAS" || o === "SOURCE") return false;
  }
  return mt(e) && P(n) ? false : e in t;
}
const Pt = /* @__PURE__ */ new WeakMap(), $t = /* @__PURE__ */ new WeakMap(), O = Symbol("_moveCb"), ht = Symbol("_enterCb"), ye = (t) => (delete t.props.mode, t), Me = ye({ name: "TransitionGroup", props: x({}, yt, { tag: String, moveClass: String }), setup(t, { slots: e }) {
  const n = ee(), s = kt();
  let o, i;
  return te(() => {
    if (!o.length) return;
    const r = t.moveClass || `${t.name || "v"}-move`;
    if (!$e(o[0].el, n.vnode.el, r)) return;
    o.forEach(Ne), o.forEach(Le);
    const a = o.filter(Pe);
    U(), a.forEach((l) => {
      const f = l.el, u = f.style;
      h(f, r), u.transform = u.webkitTransform = u.transitionDuration = "";
      const p = f[O] = (d) => {
        d && d.target !== f || (!d || /transform$/.test(d.propertyName)) && (f.removeEventListener("transitionend", p), f[O] = null, b(f, r));
      };
      f.addEventListener("transitionend", p);
    });
  }), () => {
    const r = ne(t), a = Mt(r);
    let l = r.tag || se;
    if (o = [], i) for (let f = 0; f < i.length; f++) {
      const u = i[f];
      u.el && u.el instanceof Element && (o.push(u), Q(u, k(u, a, s, n)), Pt.set(u, u.el.getBoundingClientRect()));
    }
    i = e.default ? oe(e.default()) : [];
    for (let f = 0; f < i.length; f++) {
      const u = i[f];
      u.key != null && Q(u, k(u, a, s, n));
    }
    return ie(l, null, i);
  };
} }), Ge = Me;
function Ne(t) {
  const e = t.el;
  e[O] && e[O](), e[ht] && e[ht]();
}
function Le(t) {
  $t.set(t, t.el.getBoundingClientRect());
}
function Pe(t) {
  const e = Pt.get(t), n = $t.get(t), s = e.left - n.left, o = e.top - n.top;
  if (s || o) {
    const i = t.el.style;
    return i.transform = i.webkitTransform = `translate(${s}px,${o}px)`, i.transitionDuration = "0s", t;
  }
}
function $e(t, e, n) {
  const s = t.cloneNode(), o = t[y];
  o && o.forEach((a) => {
    a.split(/\s+/).forEach((l) => l && s.classList.remove(l));
  }), n.split(/\s+/).forEach((a) => a && s.classList.add(a)), s.style.display = "none";
  const i = e.nodeType === 1 ? e : e.parentNode;
  i.appendChild(s);
  const { hasTransform: r } = Nt(s);
  return i.removeChild(s), r;
}
const M = (t) => {
  const e = t.props["onUpdate:modelValue"] || false;
  return w(e) ? (n) => Ft(e, n) : e;
};
function De(t) {
  t.target.composing = true;
}
function gt(t) {
  const e = t.target;
  e.composing && (e.composing = false, e.dispatchEvent(new Event("input")));
}
const v = Symbol("_assign"), We = { created(t, { modifiers: { lazy: e, trim: n, number: s } }, o) {
  t[v] = M(o);
  const i = s || o.props && o.props.type === "number";
  S(t, e ? "change" : "input", (r) => {
    if (r.target.composing) return;
    let a = t.value;
    n && (a = a.trim()), i && (a = Y(a)), t[v](a);
  }), n && S(t, "change", () => {
    t.value = t.value.trim();
  }), e || (S(t, "compositionstart", De), S(t, "compositionend", gt), S(t, "change", gt));
}, mounted(t, { value: e }) {
  t.value = e ?? "";
}, beforeUpdate(t, { value: e, oldValue: n, modifiers: { lazy: s, trim: o, number: i } }, r) {
  if (t[v] = M(r), t.composing) return;
  const a = (i || t.type === "number") && !/^0\d/.test(t.value) ? Y(t.value) : t.value, l = e ?? "";
  a !== l && (document.activeElement === t && t.type !== "range" && (s && e === n || o && t.value.trim() === l) || (t.value = l));
} }, je = { deep: true, created(t, e, n) {
  t[v] = M(n), S(t, "change", () => {
    const s = t._modelValue, o = Dt(t), i = t.checked, r = t[v];
    if (w(s)) {
      const a = St(s, o), l = a !== -1;
      if (i && !l) r(s.concat(o));
      else if (!i && l) {
        const f = [...s];
        f.splice(a, 1), r(f);
      }
    } else if (Tt(s)) {
      const a = new Set(s);
      i ? a.add(o) : a.delete(o), r(a);
    } else r(It(t, i));
  });
}, mounted: vt, beforeUpdate(t, e, n) {
  t[v] = M(n), vt(t, e, n);
} };
function vt(t, { value: e, oldValue: n }, s) {
  t._modelValue = e;
  let o;
  if (w(e)) o = St(e, s.props.value) > -1;
  else if (Tt(e)) o = e.has(s.props.value);
  else {
    if (e === n) return;
    o = B(e, It(t, true));
  }
  t.checked !== o && (t.checked = o);
}
const qe = { created(t, { value: e }, n) {
  t.checked = B(e, n.props.value), t[v] = M(n), S(t, "change", () => {
    t[v](Dt(t));
  });
}, beforeUpdate(t, { value: e, oldValue: n }, s) {
  t[v] = M(s), e !== n && (t.checked = B(e, s.props.value));
} };
function Dt(t) {
  return "_value" in t ? t._value : t.value;
}
function It(t, e) {
  const n = e ? "_trueValue" : "_falseValue";
  return n in t ? t[n] : e;
}
const Ie = ["ctrl", "shift", "alt", "meta"], Oe = { stop: (t) => t.stopPropagation(), prevent: (t) => t.preventDefault(), self: (t) => t.target !== t.currentTarget, ctrl: (t) => !t.ctrlKey, shift: (t) => !t.shiftKey, alt: (t) => !t.altKey, meta: (t) => !t.metaKey, left: (t) => "button" in t && t.button !== 0, middle: (t) => "button" in t && t.button !== 1, right: (t) => "button" in t && t.button !== 2, exact: (t, e) => Ie.some((n) => t[`${n}Key`] && !e.includes(n)) }, ze = (t, e) => {
  const n = t._withMods || (t._withMods = {}), s = e.join(".");
  return n[s] || (n[s] = (o, ...i) => {
    for (let r = 0; r < e.length; r++) {
      const a = Oe[e[r]];
      if (a && a(o, e)) return;
    }
    return t(o, ...i);
  });
}, xe = { esc: "escape", space: " ", up: "arrow-up", left: "arrow-left", right: "arrow-right", down: "arrow-down", delete: "backspace" }, Xe = (t, e) => {
  const n = t._withKeys || (t._withKeys = {}), s = e.join(".");
  return n[s] || (n[s] = (o) => {
    if (!("key" in o)) return;
    const i = G(o.key);
    if (e.some((r) => r === i || xe[r] === i)) return t(o);
  });
}, Re = x({ patchProp: Ae }, ce);
let Ct;
function Ke() {
  return Ct || (Ct = Bt(Re));
}
const Ze = (...t) => {
  const e = Ke().createApp(...t), { mount: n } = e;
  return e.mount = (s) => {
    const o = He(s);
    if (!o) return;
    const i = e._component;
    !bt(i) && !i.render && !i.template && (i.template = o.innerHTML), o.nodeType === 1 && (o.textContent = "");
    const r = n(o, false, Ve(o));
    return o instanceof Element && (o.removeAttribute("v-cloak"), o.setAttribute("data-v-app", "")), r;
  }, e;
};
function Ve(t) {
  if (t instanceof SVGElement) return "svg";
  if (typeof MathMLElement == "function" && t instanceof MathMLElement) return "mathml";
}
function He(t) {
  return P(t) ? document.querySelector(t) : t;
}
const Je = (t, e) => {
  const n = t.__vccOpts || t;
  for (const [s, o] of e) n[s] = o;
  return n;
};
export {
  Fe as T,
  Je as _,
  qe as a,
  je as b,
  Ge as c,
  Ze as d,
  Ue as e,
  Xe as f,
  We as v,
  ze as w
};

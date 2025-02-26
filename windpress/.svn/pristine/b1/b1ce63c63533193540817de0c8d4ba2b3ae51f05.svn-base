import { g as B } from "./isObject-CRxghtyK.js";
import { j as ee, au as Q, r as J, at as te, n as G, w as R, ah as P, h as K, f as ne, g as oe, o as re, q as $, d as E, s as D, av as M, Q as ae, C as ie } from "./runtime-core.esm-bundler-CxI1Hi6i.js";
function se(e) {
  return oe() ? (re(e), true) : false;
}
const _ = /* @__PURE__ */ new WeakMap(), ue = (...e) => {
  var t;
  const n = e[0], r = (t = P()) == null ? void 0 : t.proxy;
  if (r == null && !K()) throw new Error("injectLocal must be called in setup");
  return r && _.has(r) && n in _.get(r) ? _.get(r)[n] : ne(...e);
}, le = typeof window < "u" && typeof document < "u";
typeof WorkerGlobalScope < "u" && globalThis instanceof WorkerGlobalScope;
const ce = Object.prototype.toString, fe = (e) => ce.call(e) === "[object Object]", de = () => {
};
function pe(e, t) {
  function n(...r) {
    return new Promise((i, p) => {
      Promise.resolve(e(() => t.apply(this, r), { fn: t, thisArg: this, args: r })).then(i).catch(p);
    });
  }
  return n;
}
const q = (e) => e();
function me(e = q, t = {}) {
  const { initialState: n = "active" } = t, r = U(n === "active");
  function i() {
    r.value = false;
  }
  function p() {
    r.value = true;
  }
  const m = (...a) => {
    r.value && e(...a);
  };
  return { isActive: Q(r), pause: i, resume: p, eventFilter: m };
}
function H(e) {
  return e.endsWith("rem") ? Number.parseFloat(e) * 16 : Number.parseFloat(e);
}
function he(e) {
  return P();
}
function V(e) {
  return Array.isArray(e) ? e : [e];
}
function U(...e) {
  if (e.length !== 1) return ee(...e);
  const t = e[0];
  return typeof t == "function" ? Q(te(() => ({ get: t, set: de }))) : J(t);
}
function ve(e, t, n = {}) {
  const { eventFilter: r = q, ...i } = n;
  return R(e, pe(r, t), i);
}
function ye(e, t, n = {}) {
  const { eventFilter: r, initialState: i = "active", ...p } = n, { eventFilter: m, pause: a, resume: u, isActive: s } = me(r, { initialState: i });
  return { stop: ve(e, t, { ...p, eventFilter: m }), pause: a, resume: u, isActive: s };
}
function X(e, t = true, n) {
  he() ? $(e, n) : t ? e() : G(e);
}
function ge(e, t, n) {
  return R(e, t, { ...n, immediate: true });
}
const F = le ? window : void 0;
function Y(e) {
  var t;
  const n = M(e);
  return (t = n == null ? void 0 : n.$el) != null ? t : n;
}
function x(...e) {
  const t = [], n = () => {
    t.forEach((a) => a()), t.length = 0;
  }, r = (a, u, s, d) => (a.addEventListener(u, s, d), () => a.removeEventListener(u, s, d)), i = E(() => {
    const a = V(M(e[0])).filter((u) => u != null);
    return a.every((u) => typeof u != "string") ? a : void 0;
  }), p = ge(() => {
    var a, u;
    return [(u = (a = i.value) == null ? void 0 : a.map((s) => Y(s))) != null ? u : [F].filter((s) => s != null), V(M(i.value ? e[1] : e[0])), V(ie(i.value ? e[2] : e[1])), M(i.value ? e[3] : e[2])];
  }, ([a, u, s, d]) => {
    if (n(), !(a == null ? void 0 : a.length) || !(u == null ? void 0 : u.length) || !(s == null ? void 0 : s.length)) return;
    const v = fe(d) ? { ...d } : d;
    t.push(...a.flatMap((b) => u.flatMap((y) => s.map((c) => r(b, y, c, v)))));
  }, { flush: "post" }), m = () => {
    p(), n();
  };
  return se(n), m;
}
function we() {
  const e = D(false), t = P();
  return t && $(() => {
    e.value = true;
  }, t), e;
}
function Se(e) {
  const t = we();
  return E(() => (t.value, !!e()));
}
const be = Symbol("vueuse-ssr-width");
function Ce() {
  const e = K() ? ue(be, null) : null;
  return typeof e == "number" ? e : void 0;
}
function Ae(e, t = {}) {
  const { window: n = F, ssrWidth: r = Ce() } = t, i = Se(() => n && "matchMedia" in n && typeof n.matchMedia == "function"), p = J(typeof r == "number"), m = D(), a = D(false), u = (s) => {
    a.value = s.matches;
  };
  return ae(() => {
    if (p.value) {
      p.value = !i.value;
      const s = M(e).split(",");
      a.value = s.some((d) => {
        const v = d.includes("not all"), b = d.match(/\(\s*min-width:\s*(-?\d+(?:\.\d*)?[a-z]+\s*)\)/), y = d.match(/\(\s*max-width:\s*(-?\d+(?:\.\d*)?[a-z]+\s*)\)/);
        let c = !!(b || y);
        return b && c && (c = r >= H(b[1])), y && c && (c = r <= H(y[1])), v ? !c : c;
      });
      return;
    }
    i.value && (m.value = n.matchMedia(M(e)), a.value = m.value.matches);
  }), x(m, "change", u, { passive: true }), E(() => a.value);
}
const L = typeof globalThis < "u" ? globalThis : typeof window < "u" ? window : typeof B < "u" ? B : typeof self < "u" ? self : {}, z = "__vueuse_ssr_handlers__", Me = ke();
function ke() {
  return z in L || (L[z] = L[z] || {}), L[z];
}
function Z(e, t) {
  return Me[e] || t;
}
function Oe(e) {
  return Ae("(prefers-color-scheme: dark)", e);
}
function Ee(e) {
  return e == null ? "any" : e instanceof Set ? "set" : e instanceof Map ? "map" : e instanceof Date ? "date" : typeof e == "boolean" ? "boolean" : typeof e == "string" ? "string" : typeof e == "object" ? "object" : Number.isNaN(e) ? "any" : "number";
}
const Te = { boolean: { read: (e) => e === "true", write: (e) => String(e) }, object: { read: (e) => JSON.parse(e), write: (e) => JSON.stringify(e) }, number: { read: (e) => Number.parseFloat(e), write: (e) => String(e) }, any: { read: (e) => e, write: (e) => String(e) }, string: { read: (e) => e, write: (e) => String(e) }, map: { read: (e) => new Map(JSON.parse(e)), write: (e) => JSON.stringify(Array.from(e.entries())) }, set: { read: (e) => new Set(JSON.parse(e)), write: (e) => JSON.stringify(Array.from(e)) }, date: { read: (e) => new Date(e), write: (e) => e.toISOString() } }, I = "vueuse-storage";
function We(e, t, n, r = {}) {
  var i;
  const { flush: p = "pre", deep: m = true, listenToStorageChanges: a = true, writeDefaults: u = true, mergeDefaults: s = false, shallow: d, window: v = F, eventFilter: b, onError: y = (o) => {
    console.error(o);
  }, initOnMounted: c } = r, g = (d ? D : J)(typeof t == "function" ? t() : t), w = E(() => M(e));
  if (!n) try {
    n = Z("getDefaultStorage", () => {
      var o;
      return (o = F) == null ? void 0 : o.localStorage;
    })();
  } catch (o) {
    y(o);
  }
  if (!n) return g;
  const S = M(t), W = Ee(S), k = (i = r.serializer) != null ? i : Te[W], { pause: h, resume: A } = ye(g, () => T(g.value), { flush: p, deep: m, eventFilter: b });
  R(w, () => C(), { flush: p }), v && a && X(() => {
    n instanceof Storage ? x(v, "storage", C, { passive: true }) : x(v, I, O), c && C();
  }), c || C();
  function j(o, l) {
    if (v) {
      const f = { key: w.value, oldValue: o, newValue: l, storageArea: n };
      v.dispatchEvent(n instanceof Storage ? new StorageEvent("storage", f) : new CustomEvent(I, { detail: f }));
    }
  }
  function T(o) {
    try {
      const l = n.getItem(w.value);
      if (o == null) j(l, null), n.removeItem(w.value);
      else {
        const f = k.write(o);
        l !== f && (n.setItem(w.value, f), j(l, f));
      }
    } catch (l) {
      y(l);
    }
  }
  function N(o) {
    const l = o ? o.newValue : n.getItem(w.value);
    if (l == null) return u && S != null && n.setItem(w.value, k.write(S)), S;
    if (!o && s) {
      const f = k.read(l);
      return typeof s == "function" ? s(f, S) : W === "object" && !Array.isArray(f) ? { ...S, ...f } : f;
    } else return typeof l != "string" ? l : k.read(l);
  }
  function C(o) {
    if (!(o && o.storageArea !== n)) {
      if (o && o.key == null) {
        g.value = S;
        return;
      }
      if (!(o && o.key !== w.value)) {
        h();
        try {
          (o == null ? void 0 : o.newValue) !== k.write(g.value) && (g.value = N(o));
        } catch (l) {
          y(l);
        } finally {
          o ? G(A) : A();
        }
      }
    }
  }
  function O(o) {
    C(o.detail);
  }
  return g;
}
const je = "*,*::before,*::after{-webkit-transition:none!important;-moz-transition:none!important;-o-transition:none!important;-ms-transition:none!important;transition:none!important}";
function Le(e = {}) {
  const { selector: t = "html", attribute: n = "class", initialValue: r = "auto", window: i = F, storage: p, storageKey: m = "vueuse-color-scheme", listenToStorageChanges: a = true, storageRef: u, emitAuto: s, disableTransition: d = true } = e, v = { auto: "", light: "light", dark: "dark", ...e.modes || {} }, b = Oe({ window: i }), y = E(() => b.value ? "dark" : "light"), c = u || (m == null ? U(r) : We(m, r, p, { window: i, listenToStorageChanges: a })), g = E(() => c.value === "auto" ? y.value : c.value), w = Z("updateHTMLAttrs", (h, A, j) => {
    const T = typeof h == "string" ? i == null ? void 0 : i.document.querySelector(h) : Y(h);
    if (!T) return;
    const N = /* @__PURE__ */ new Set(), C = /* @__PURE__ */ new Set();
    let O = null;
    if (A === "class") {
      const l = j.split(/\s/g);
      Object.values(v).flatMap((f) => (f || "").split(/\s/g)).filter(Boolean).forEach((f) => {
        l.includes(f) ? N.add(f) : C.add(f);
      });
    } else O = { key: A, value: j };
    if (N.size === 0 && C.size === 0 && O === null) return;
    let o;
    d && (o = i.document.createElement("style"), o.appendChild(document.createTextNode(je)), i.document.head.appendChild(o));
    for (const l of N) T.classList.add(l);
    for (const l of C) T.classList.remove(l);
    O && T.setAttribute(O.key, O.value), d && (i.getComputedStyle(o).opacity, document.head.removeChild(o));
  });
  function S(h) {
    var A;
    w(t, n, (A = v[h]) != null ? A : h);
  }
  function W(h) {
    e.onChanged ? e.onChanged(h, S) : S(h);
  }
  R(g, W, { flush: "post", immediate: true }), X(() => W(g.value));
  const k = E({ get() {
    return s ? c.value : g.value;
  }, set(h) {
    c.value = h;
  } });
  return Object.assign(k, { store: c, system: y, state: g });
}
export {
  We as a,
  Le as u
};

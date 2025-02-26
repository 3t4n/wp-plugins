import { V as N, l as b } from "./module-oN1JnOJ9.js";
import { l as v } from "./stylesheet-B98yp78w.js";
import { p as y } from "./index-xtxc-82G.js";
async function C({ entrypoint: e = "/main.css", volume: t = {}, ...n } = {}) {
  return n = { entrypoint: e, volume: t, ...n }, N(n.volume[n.entrypoint], { ...n, loadModule: async (a, s, l) => b(a, s, l, n.volume), loadStylesheet: async (a, s) => v(a, s, n.volume) });
}
const m = 48, g = 57;
function w(e, t) {
  let n = e.length, a = t.length, s = n < a ? n : a;
  for (let l = 0; l < s; l++) {
    let i = e.charCodeAt(l), r = t.charCodeAt(l);
    if (i >= m && i <= g && r >= m && r <= g) {
      let d = l, o = l + 1, u = l, c = l + 1;
      for (i = e.charCodeAt(o); i >= m && i <= g; ) i = e.charCodeAt(++o);
      for (r = t.charCodeAt(c); r >= m && r <= g; ) r = t.charCodeAt(++c);
      let f = e.slice(d, o), p = t.slice(u, c), h = Number(f) - Number(p);
      if (h) return h;
      if (f < p) return -1;
      if (f > p) return 1;
      continue;
    }
    if (i !== r) return i - r;
  }
  return e.length - t.length;
}
function A(e, t, { onInvalidCandidate: n } = {}) {
  let a = /* @__PURE__ */ new Map(), s = [], l = /* @__PURE__ */ new Map();
  for (let r of e) {
    if (t.invalidCandidates.has(r)) {
      n == null ? void 0 : n(r);
      continue;
    }
    let d = t.parseCandidate(r);
    if (d.length === 0) {
      n == null ? void 0 : n(r);
      continue;
    }
    l.set(r, d);
  }
  let i = t.getVariantOrder();
  for (let [r, d] of l) {
    let o = false;
    for (let u of d) {
      let c = t.compileAstNodes(u);
      if (c.length !== 0) {
        o = true;
        for (let { node: f, propertySort: p } of c) {
          let h = 0n;
          for (let x of u.variants) h |= 1n << BigInt(i.get(x));
          a.set(f, { properties: p, variants: h, candidate: r }), s.push(f);
        }
      }
    }
    o || (n == null ? void 0 : n(r));
  }
  return s.sort((r, d) => {
    let o = a.get(r), u = a.get(d);
    if (o.variants - u.variants !== 0n) return Number(o.variants - u.variants);
    let c = 0;
    for (; c < o.properties.order.length && c < u.properties.order.length && o.properties.order[c] === u.properties.order[c]; ) c += 1;
    return (o.properties.order[c] ?? 1 / 0) - (u.properties.order[c] ?? 1 / 0) || u.properties.count - o.properties.count || w(o.candidate, u.candidate);
  }), { astNodes: s, nodeSorting: a };
}
function L(e) {
  return e.getClassList().map((t) => ({ kind: "utility", selector: t[0] }));
}
function V(e) {
  return e.getVariants().map((t) => ({ kind: "variant", selector: t.name }));
}
function S() {
  return [{ kind: "utility", selector: "flex" }];
}
function E(e) {
  return e.sort(([, t], [, n]) => t === n ? 0 : t === null ? -1 : n === null ? 1 : k(t - n)).map(([t]) => t);
}
function k(e) {
  return e > 0n ? 1 : e === 0n ? 0 : -1;
}
async function W(e = {}) {
  let t = e.theme ? e : await C(e);
  return Array.from(t.theme.entries()).map((n, a) => {
    const s = n[0];
    let l = false, i = null;
    const r = n[1].value;
    return typeof r == "string" && r.includes("rem") && (i = `${parseFloat(r) * 16}px`, l = true), { key: s, value: l ? i : r, index: a };
  });
}
async function F(e = {}, t) {
  let n = e.theme ? e : await C(e);
  return E(n.getClassOrder(t));
}
function I(e, t) {
  if (!(e == null ? void 0 : e.includes("rem"))) return e;
  let n = [];
  y(e).walk((s) => {
    if (s.type !== "word") return true;
    let l = y.unit(s.value);
    if (!l || l.unit !== "rem" && l.unit !== "rem;") return false;
    let i = ` /* ${parseFloat(l.number) * t}px */`;
    return n.push({ content: i, sourceEndIndex: s.sourceEndIndex }), false;
  });
  let a = 0;
  return n.forEach((s) => {
    e = e.slice(0, s.sourceEndIndex + a) + s.content + e.slice(s.sourceEndIndex + a), a += s.content.length;
  }), e;
}
async function U(e = {}, t) {
  let a = (e.theme ? e : await C(e)).candidatesToCss(t);
  return a = a.map((s) => I(s, 16)), a;
}
async function $(e = {}) {
  let t = e.theme ? e : await C(e);
  const n = L(t).concat(V(t).concat(S())), a = (i) => i.selector !== "*", s = (i) => {
    const r = A([i.selector], t).astNodes, d = r.length > 0 ? r.reduce((u, c) => u.concat(c.nodes), []) : [];
    let o = t.candidatesToCss([i.selector]).at(0);
    return o && (o = o.replaceAll(/([0-9.]+)rem/g, (u, c) => `${parseFloat(c) * 16}px`)), o = o == null ? void 0 : o.replaceAll(/\\/g, ""), { ...i, declarations: d == null ? void 0 : d.filter((u) => u.kind === "declaration"), css: o };
  }, l = (i, r) => i.selector.startsWith("-") && !r.selector.startsWith("-") ? 1 : !i.selector.startsWith("-") && r.selector.startsWith("-") ? -1 : w(i.selector, r.selector);
  return n.filter(a).map(s).sort(l);
}
export {
  $ as a,
  k as b,
  U as c,
  I as d,
  W as g,
  C as l,
  F as s
};

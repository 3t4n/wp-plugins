import { r as Ae, g as Rt } from "./module-oN1JnOJ9.js";
import { h as z, i as St, j as ct } from "./index-DYEcFSWi.js";
import { B as $ } from "./index-CgqXENQe.js";
var W = { exports: {} }, ze;
function Ot() {
  if (ze) return W.exports;
  ze = 1;
  var d = String, v = function() {
    return { isColorSupported: false, reset: d, bold: d, dim: d, italic: d, underline: d, inverse: d, hidden: d, strikethrough: d, black: d, red: d, green: d, yellow: d, blue: d, magenta: d, cyan: d, white: d, gray: d, bgBlack: d, bgRed: d, bgGreen: d, bgYellow: d, bgBlue: d, bgMagenta: d, bgCyan: d, bgWhite: d, blackBright: d, redBright: d, greenBright: d, yellowBright: d, blueBright: d, magentaBright: d, cyanBright: d, whiteBright: d, bgBlackBright: d, bgRedBright: d, bgGreenBright: d, bgYellowBright: d, bgBlueBright: d, bgMagentaBright: d, bgCyanBright: d, bgWhiteBright: d };
  };
  return W.exports = v(), W.exports.createColors = v, W.exports;
}
var ee, Fe;
function Ee() {
  if (Fe) return ee;
  Fe = 1;
  let d = Ot(), v = z;
  class C extends Error {
    constructor(n, f, a, p, g, o) {
      super(n), this.name = "CssSyntaxError", this.reason = n, g && (this.file = g), p && (this.source = p), o && (this.plugin = o), typeof f < "u" && typeof a < "u" && (typeof f == "number" ? (this.line = f, this.column = a) : (this.line = f.line, this.column = f.column, this.endLine = a.line, this.endColumn = a.column)), this.setMessage(), Error.captureStackTrace && Error.captureStackTrace(this, C);
    }
    setMessage() {
      this.message = this.plugin ? this.plugin + ": " : "", this.message += this.file ? this.file : "<css input>", typeof this.line < "u" && (this.message += ":" + this.line + ":" + this.column), this.message += ": " + this.reason;
    }
    showSourceCode(n) {
      if (!this.source) return "";
      let f = this.source;
      n == null && (n = d.isColorSupported);
      let a = (t) => t, p = (t) => t, g = (t) => t;
      if (n) {
        let { bold: t, gray: l, red: s } = d.createColors(true);
        p = (u) => t(s(u)), a = (u) => l(u), v && (g = (u) => v(u));
      }
      let o = f.split(/\r?\n/), e = Math.max(this.line - 3, 0), i = Math.min(this.line + 2, o.length), r = String(i).length;
      return o.slice(e, i).map((t, l) => {
        let s = e + 1 + l, u = " " + (" " + s).slice(-r) + " | ";
        if (s === this.line) {
          if (t.length > 160) {
            let b = 20, m = Math.max(0, this.column - b), h = Math.max(this.column + b, this.endColumn + b), c = t.slice(m, h), w = a(u.replace(/\d/g, " ")) + t.slice(0, Math.min(this.column - 1, b - 1)).replace(/[^\t]/g, " ");
            return p(">") + a(u) + g(c) + `
 ` + w + p("^");
          }
          let x = a(u.replace(/\d/g, " ")) + t.slice(0, this.column - 1).replace(/[^\t]/g, " ");
          return p(">") + a(u) + g(t) + `
 ` + x + p("^");
        }
        return " " + a(u) + g(t);
      }).join(`
`);
    }
    toString() {
      let n = this.showSourceCode();
      return n && (n = `

` + n + `
`), this.name + ": " + this.message + n;
    }
  }
  return ee = C, C.default = C, ee;
}
var te, De;
function pt() {
  if (De) return te;
  De = 1;
  const d = { after: `
`, beforeClose: `
`, beforeComment: `
`, beforeDecl: `
`, beforeOpen: " ", beforeRule: `
`, colon: ": ", commentLeft: " ", commentRight: " ", emptyBody: "", indent: "    ", semicolon: false };
  function v(y) {
    return y[0].toUpperCase() + y.slice(1);
  }
  class C {
    constructor(n) {
      this.builder = n;
    }
    atrule(n, f) {
      let a = "@" + n.name, p = n.params ? this.rawValue(n, "params") : "";
      if (typeof n.raws.afterName < "u" ? a += n.raws.afterName : p && (a += " "), n.nodes) this.block(n, a + p);
      else {
        let g = (n.raws.between || "") + (f ? ";" : "");
        this.builder(a + p + g, n);
      }
    }
    beforeAfter(n, f) {
      let a;
      n.type === "decl" ? a = this.raw(n, null, "beforeDecl") : n.type === "comment" ? a = this.raw(n, null, "beforeComment") : f === "before" ? a = this.raw(n, null, "beforeRule") : a = this.raw(n, null, "beforeClose");
      let p = n.parent, g = 0;
      for (; p && p.type !== "root"; ) g += 1, p = p.parent;
      if (a.includes(`
`)) {
        let o = this.raw(n, null, "indent");
        if (o.length) for (let e = 0; e < g; e++) a += o;
      }
      return a;
    }
    block(n, f) {
      let a = this.raw(n, "between", "beforeOpen");
      this.builder(f + a + "{", n, "start");
      let p;
      n.nodes && n.nodes.length ? (this.body(n), p = this.raw(n, "after")) : p = this.raw(n, "after", "emptyBody"), p && this.builder(p), this.builder("}", n, "end");
    }
    body(n) {
      let f = n.nodes.length - 1;
      for (; f > 0 && n.nodes[f].type === "comment"; ) f -= 1;
      let a = this.raw(n, "semicolon");
      for (let p = 0; p < n.nodes.length; p++) {
        let g = n.nodes[p], o = this.raw(g, "before");
        o && this.builder(o), this.stringify(g, f !== p || a);
      }
    }
    comment(n) {
      let f = this.raw(n, "left", "commentLeft"), a = this.raw(n, "right", "commentRight");
      this.builder("/*" + f + n.text + a + "*/", n);
    }
    decl(n, f) {
      let a = this.raw(n, "between", "colon"), p = n.prop + a + this.rawValue(n, "value");
      n.important && (p += n.raws.important || " !important"), f && (p += ";"), this.builder(p, n);
    }
    document(n) {
      this.body(n);
    }
    raw(n, f, a) {
      let p;
      if (a || (a = f), f && (p = n.raws[f], typeof p < "u")) return p;
      let g = n.parent;
      if (a === "before" && (!g || g.type === "root" && g.first === n || g && g.type === "document")) return "";
      if (!g) return d[a];
      let o = n.root();
      if (o.rawCache || (o.rawCache = {}), typeof o.rawCache[a] < "u") return o.rawCache[a];
      if (a === "before" || a === "after") return this.beforeAfter(n, a);
      {
        let e = "raw" + v(a);
        this[e] ? p = this[e](o, n) : o.walk((i) => {
          if (p = i.raws[f], typeof p < "u") return false;
        });
      }
      return typeof p > "u" && (p = d[a]), o.rawCache[a] = p, p;
    }
    rawBeforeClose(n) {
      let f;
      return n.walk((a) => {
        if (a.nodes && a.nodes.length > 0 && typeof a.raws.after < "u") return f = a.raws.after, f.includes(`
`) && (f = f.replace(/[^\n]+$/, "")), false;
      }), f && (f = f.replace(/\S/g, "")), f;
    }
    rawBeforeComment(n, f) {
      let a;
      return n.walkComments((p) => {
        if (typeof p.raws.before < "u") return a = p.raws.before, a.includes(`
`) && (a = a.replace(/[^\n]+$/, "")), false;
      }), typeof a > "u" ? a = this.raw(f, null, "beforeDecl") : a && (a = a.replace(/\S/g, "")), a;
    }
    rawBeforeDecl(n, f) {
      let a;
      return n.walkDecls((p) => {
        if (typeof p.raws.before < "u") return a = p.raws.before, a.includes(`
`) && (a = a.replace(/[^\n]+$/, "")), false;
      }), typeof a > "u" ? a = this.raw(f, null, "beforeRule") : a && (a = a.replace(/\S/g, "")), a;
    }
    rawBeforeOpen(n) {
      let f;
      return n.walk((a) => {
        if (a.type !== "decl" && (f = a.raws.between, typeof f < "u")) return false;
      }), f;
    }
    rawBeforeRule(n) {
      let f;
      return n.walk((a) => {
        if (a.nodes && (a.parent !== n || n.first !== a) && typeof a.raws.before < "u") return f = a.raws.before, f.includes(`
`) && (f = f.replace(/[^\n]+$/, "")), false;
      }), f && (f = f.replace(/\S/g, "")), f;
    }
    rawColon(n) {
      let f;
      return n.walkDecls((a) => {
        if (typeof a.raws.between < "u") return f = a.raws.between.replace(/[^\s:]/g, ""), false;
      }), f;
    }
    rawEmptyBody(n) {
      let f;
      return n.walk((a) => {
        if (a.nodes && a.nodes.length === 0 && (f = a.raws.after, typeof f < "u")) return false;
      }), f;
    }
    rawIndent(n) {
      if (n.raws.indent) return n.raws.indent;
      let f;
      return n.walk((a) => {
        let p = a.parent;
        if (p && p !== n && p.parent && p.parent === n && typeof a.raws.before < "u") {
          let g = a.raws.before.split(`
`);
          return f = g[g.length - 1], f = f.replace(/\S/g, ""), false;
        }
      }), f;
    }
    rawSemicolon(n) {
      let f;
      return n.walk((a) => {
        if (a.nodes && a.nodes.length && a.last.type === "decl" && (f = a.raws.semicolon, typeof f < "u")) return false;
      }), f;
    }
    rawValue(n, f) {
      let a = n[f], p = n.raws[f];
      return p && p.value === a ? p.raw : a;
    }
    root(n) {
      this.body(n), n.raws.after && this.builder(n.raws.after);
    }
    rule(n) {
      this.block(n, this.rawValue(n, "selector")), n.raws.ownSemicolon && this.builder(n.raws.ownSemicolon, n, "end");
    }
    stringify(n, f) {
      if (!this[n.type]) throw new Error("Unknown AST node type " + n.type + ". Maybe you need to change PostCSS stringifier.");
      this[n.type](n, f);
    }
  }
  return te = C, C.default = C, te;
}
var re, Te;
function G() {
  if (Te) return re;
  Te = 1;
  let d = pt();
  function v(C, y) {
    new d(y).stringify(C);
  }
  return re = v, v.default = v, re;
}
var j = {}, We;
function Pe() {
  return We || (We = 1, j.isClean = Symbol("isClean"), j.my = Symbol("my")), j;
}
var ie, je;
function J() {
  if (je) return ie;
  je = 1;
  let d = Ee(), v = pt(), C = G(), { isClean: y, my: n } = Pe();
  function f(g, o) {
    let e = new g.constructor();
    for (let i in g) {
      if (!Object.prototype.hasOwnProperty.call(g, i) || i === "proxyCache") continue;
      let r = g[i], t = typeof r;
      i === "parent" && t === "object" ? o && (e[i] = o) : i === "source" ? e[i] = r : Array.isArray(r) ? e[i] = r.map((l) => f(l, e)) : (t === "object" && r !== null && (r = f(r)), e[i] = r);
    }
    return e;
  }
  function a(g, o) {
    if (o && typeof o.offset < "u") return o.offset;
    let e = 1, i = 1, r = 0;
    for (let t = 0; t < g.length; t++) {
      if (i === o.line && e === o.column) {
        r = t;
        break;
      }
      g[t] === `
` ? (e = 1, i += 1) : e += 1;
    }
    return r;
  }
  class p {
    get proxyOf() {
      return this;
    }
    constructor(o = {}) {
      this.raws = {}, this[y] = false, this[n] = true;
      for (let e in o) if (e === "nodes") {
        this.nodes = [];
        for (let i of o[e]) typeof i.clone == "function" ? this.append(i.clone()) : this.append(i);
      } else this[e] = o[e];
    }
    addToError(o) {
      if (o.postcssNode = this, o.stack && this.source && /\n\s{4}at /.test(o.stack)) {
        let e = this.source;
        o.stack = o.stack.replace(/\n\s{4}at /, `$&${e.input.from}:${e.start.line}:${e.start.column}$&`);
      }
      return o;
    }
    after(o) {
      return this.parent.insertAfter(this, o), this;
    }
    assign(o = {}) {
      for (let e in o) this[e] = o[e];
      return this;
    }
    before(o) {
      return this.parent.insertBefore(this, o), this;
    }
    cleanRaws(o) {
      delete this.raws.before, delete this.raws.after, o || delete this.raws.between;
    }
    clone(o = {}) {
      let e = f(this);
      for (let i in o) e[i] = o[i];
      return e;
    }
    cloneAfter(o = {}) {
      let e = this.clone(o);
      return this.parent.insertAfter(this, e), e;
    }
    cloneBefore(o = {}) {
      let e = this.clone(o);
      return this.parent.insertBefore(this, e), e;
    }
    error(o, e = {}) {
      if (this.source) {
        let { end: i, start: r } = this.rangeBy(e);
        return this.source.input.error(o, { column: r.column, line: r.line }, { column: i.column, line: i.line }, e);
      }
      return new d(o);
    }
    getProxyProcessor() {
      return { get(o, e) {
        return e === "proxyOf" ? o : e === "root" ? () => o.root().toProxy() : o[e];
      }, set(o, e, i) {
        return o[e] === i || (o[e] = i, (e === "prop" || e === "value" || e === "name" || e === "params" || e === "important" || e === "text") && o.markDirty()), true;
      } };
    }
    markClean() {
      this[y] = true;
    }
    markDirty() {
      if (this[y]) {
        this[y] = false;
        let o = this;
        for (; o = o.parent; ) o[y] = false;
      }
    }
    next() {
      if (!this.parent) return;
      let o = this.parent.index(this);
      return this.parent.nodes[o + 1];
    }
    positionBy(o) {
      let e = this.source.start;
      if (o.index) e = this.positionInside(o.index);
      else if (o.word) {
        let i = "document" in this.source.input ? this.source.input.document : this.source.input.css, t = i.slice(a(i, this.source.start), a(i, this.source.end)).indexOf(o.word);
        t !== -1 && (e = this.positionInside(t));
      }
      return e;
    }
    positionInside(o) {
      let e = this.source.start.column, i = this.source.start.line, r = "document" in this.source.input ? this.source.input.document : this.source.input.css, t = a(r, this.source.start), l = t + o;
      for (let s = t; s < l; s++) r[s] === `
` ? (e = 1, i += 1) : e += 1;
      return { column: e, line: i };
    }
    prev() {
      if (!this.parent) return;
      let o = this.parent.index(this);
      return this.parent.nodes[o - 1];
    }
    rangeBy(o) {
      let e = { column: this.source.start.column, line: this.source.start.line }, i = this.source.end ? { column: this.source.end.column + 1, line: this.source.end.line } : { column: e.column + 1, line: e.line };
      if (o.word) {
        let r = "document" in this.source.input ? this.source.input.document : this.source.input.css, l = r.slice(a(r, this.source.start), a(r, this.source.end)).indexOf(o.word);
        l !== -1 && (e = this.positionInside(l), i = this.positionInside(l + o.word.length));
      } else o.start ? e = { column: o.start.column, line: o.start.line } : o.index && (e = this.positionInside(o.index)), o.end ? i = { column: o.end.column, line: o.end.line } : typeof o.endIndex == "number" ? i = this.positionInside(o.endIndex) : o.index && (i = this.positionInside(o.index + 1));
      return (i.line < e.line || i.line === e.line && i.column <= e.column) && (i = { column: e.column + 1, line: e.line }), { end: i, start: e };
    }
    raw(o, e) {
      return new v().raw(this, o, e);
    }
    remove() {
      return this.parent && this.parent.removeChild(this), this.parent = void 0, this;
    }
    replaceWith(...o) {
      if (this.parent) {
        let e = this, i = false;
        for (let r of o) r === this ? i = true : i ? (this.parent.insertAfter(e, r), e = r) : this.parent.insertBefore(e, r);
        i || this.remove();
      }
      return this;
    }
    root() {
      let o = this;
      for (; o.parent && o.parent.type !== "document"; ) o = o.parent;
      return o;
    }
    toJSON(o, e) {
      let i = {}, r = e == null;
      e = e || /* @__PURE__ */ new Map();
      let t = 0;
      for (let l in this) {
        if (!Object.prototype.hasOwnProperty.call(this, l) || l === "parent" || l === "proxyCache") continue;
        let s = this[l];
        if (Array.isArray(s)) i[l] = s.map((u) => typeof u == "object" && u.toJSON ? u.toJSON(null, e) : u);
        else if (typeof s == "object" && s.toJSON) i[l] = s.toJSON(null, e);
        else if (l === "source") {
          let u = e.get(s.input);
          u == null && (u = t, e.set(s.input, t), t++), i[l] = { end: s.end, inputId: u, start: s.start };
        } else i[l] = s;
      }
      return r && (i.inputs = [...e.keys()].map((l) => l.toJSON())), i;
    }
    toProxy() {
      return this.proxyCache || (this.proxyCache = new Proxy(this, this.getProxyProcessor())), this.proxyCache;
    }
    toString(o = C) {
      o.stringify && (o = o.stringify);
      let e = "";
      return o(this, (i) => {
        e += i;
      }), e;
    }
    warn(o, e, i) {
      let r = { node: this };
      for (let t in i) r[t] = i[t];
      return o.warn(e, r);
    }
  }
  return ie = p, p.default = p, ie;
}
var se, $e;
function V() {
  if ($e) return se;
  $e = 1;
  let d = J();
  class v extends d {
    constructor(y) {
      super(y), this.type = "comment";
    }
  }
  return se = v, v.default = v, se;
}
var ne, Ge;
function H() {
  if (Ge) return ne;
  Ge = 1;
  let d = J();
  class v extends d {
    get variable() {
      return this.prop.startsWith("--") || this.prop[0] === "$";
    }
    constructor(y) {
      y && typeof y.value < "u" && typeof y.value != "string" && (y = { ...y, value: String(y.value) }), super(y), this.type = "decl";
    }
  }
  return ne = v, v.default = v, ne;
}
var oe, Je;
function B() {
  if (Je) return oe;
  Je = 1;
  let d = V(), v = H(), C = J(), { isClean: y, my: n } = Pe(), f, a, p, g;
  function o(r) {
    return r.map((t) => (t.nodes && (t.nodes = o(t.nodes)), delete t.source, t));
  }
  function e(r) {
    if (r[y] = false, r.proxyOf.nodes) for (let t of r.proxyOf.nodes) e(t);
  }
  class i extends C {
    get first() {
      if (this.proxyOf.nodes) return this.proxyOf.nodes[0];
    }
    get last() {
      if (this.proxyOf.nodes) return this.proxyOf.nodes[this.proxyOf.nodes.length - 1];
    }
    append(...t) {
      for (let l of t) {
        let s = this.normalize(l, this.last);
        for (let u of s) this.proxyOf.nodes.push(u);
      }
      return this.markDirty(), this;
    }
    cleanRaws(t) {
      if (super.cleanRaws(t), this.nodes) for (let l of this.nodes) l.cleanRaws(t);
    }
    each(t) {
      if (!this.proxyOf.nodes) return;
      let l = this.getIterator(), s, u;
      for (; this.indexes[l] < this.proxyOf.nodes.length && (s = this.indexes[l], u = t(this.proxyOf.nodes[s], s), u !== false); ) this.indexes[l] += 1;
      return delete this.indexes[l], u;
    }
    every(t) {
      return this.nodes.every(t);
    }
    getIterator() {
      this.lastEach || (this.lastEach = 0), this.indexes || (this.indexes = {}), this.lastEach += 1;
      let t = this.lastEach;
      return this.indexes[t] = 0, t;
    }
    getProxyProcessor() {
      return { get(t, l) {
        return l === "proxyOf" ? t : t[l] ? l === "each" || typeof l == "string" && l.startsWith("walk") ? (...s) => t[l](...s.map((u) => typeof u == "function" ? (x, b) => u(x.toProxy(), b) : u)) : l === "every" || l === "some" ? (s) => t[l]((u, ...x) => s(u.toProxy(), ...x)) : l === "root" ? () => t.root().toProxy() : l === "nodes" ? t.nodes.map((s) => s.toProxy()) : l === "first" || l === "last" ? t[l].toProxy() : t[l] : t[l];
      }, set(t, l, s) {
        return t[l] === s || (t[l] = s, (l === "name" || l === "params" || l === "selector") && t.markDirty()), true;
      } };
    }
    index(t) {
      return typeof t == "number" ? t : (t.proxyOf && (t = t.proxyOf), this.proxyOf.nodes.indexOf(t));
    }
    insertAfter(t, l) {
      let s = this.index(t), u = this.normalize(l, this.proxyOf.nodes[s]).reverse();
      s = this.index(t);
      for (let b of u) this.proxyOf.nodes.splice(s + 1, 0, b);
      let x;
      for (let b in this.indexes) x = this.indexes[b], s < x && (this.indexes[b] = x + u.length);
      return this.markDirty(), this;
    }
    insertBefore(t, l) {
      let s = this.index(t), u = s === 0 ? "prepend" : false, x = this.normalize(l, this.proxyOf.nodes[s], u).reverse();
      s = this.index(t);
      for (let m of x) this.proxyOf.nodes.splice(s, 0, m);
      let b;
      for (let m in this.indexes) b = this.indexes[m], s <= b && (this.indexes[m] = b + x.length);
      return this.markDirty(), this;
    }
    normalize(t, l) {
      if (typeof t == "string") t = o(a(t).nodes);
      else if (typeof t > "u") t = [];
      else if (Array.isArray(t)) {
        t = t.slice(0);
        for (let u of t) u.parent && u.parent.removeChild(u, "ignore");
      } else if (t.type === "root" && this.type !== "document") {
        t = t.nodes.slice(0);
        for (let u of t) u.parent && u.parent.removeChild(u, "ignore");
      } else if (t.type) t = [t];
      else if (t.prop) {
        if (typeof t.value > "u") throw new Error("Value field is missed in node creation");
        typeof t.value != "string" && (t.value = String(t.value)), t = [new v(t)];
      } else if (t.selector || t.selectors) t = [new g(t)];
      else if (t.name) t = [new f(t)];
      else if (t.text) t = [new d(t)];
      else throw new Error("Unknown node type in node creation");
      return t.map((u) => (u[n] || i.rebuild(u), u = u.proxyOf, u.parent && u.parent.removeChild(u), u[y] && e(u), u.raws || (u.raws = {}), typeof u.raws.before > "u" && l && typeof l.raws.before < "u" && (u.raws.before = l.raws.before.replace(/\S/g, "")), u.parent = this.proxyOf, u));
    }
    prepend(...t) {
      t = t.reverse();
      for (let l of t) {
        let s = this.normalize(l, this.first, "prepend").reverse();
        for (let u of s) this.proxyOf.nodes.unshift(u);
        for (let u in this.indexes) this.indexes[u] = this.indexes[u] + s.length;
      }
      return this.markDirty(), this;
    }
    push(t) {
      return t.parent = this, this.proxyOf.nodes.push(t), this;
    }
    removeAll() {
      for (let t of this.proxyOf.nodes) t.parent = void 0;
      return this.proxyOf.nodes = [], this.markDirty(), this;
    }
    removeChild(t) {
      t = this.index(t), this.proxyOf.nodes[t].parent = void 0, this.proxyOf.nodes.splice(t, 1);
      let l;
      for (let s in this.indexes) l = this.indexes[s], l >= t && (this.indexes[s] = l - 1);
      return this.markDirty(), this;
    }
    replaceValues(t, l, s) {
      return s || (s = l, l = {}), this.walkDecls((u) => {
        l.props && !l.props.includes(u.prop) || l.fast && !u.value.includes(l.fast) || (u.value = u.value.replace(t, s));
      }), this.markDirty(), this;
    }
    some(t) {
      return this.nodes.some(t);
    }
    walk(t) {
      return this.each((l, s) => {
        let u;
        try {
          u = t(l, s);
        } catch (x) {
          throw l.addToError(x);
        }
        return u !== false && l.walk && (u = l.walk(t)), u;
      });
    }
    walkAtRules(t, l) {
      return l ? t instanceof RegExp ? this.walk((s, u) => {
        if (s.type === "atrule" && t.test(s.name)) return l(s, u);
      }) : this.walk((s, u) => {
        if (s.type === "atrule" && s.name === t) return l(s, u);
      }) : (l = t, this.walk((s, u) => {
        if (s.type === "atrule") return l(s, u);
      }));
    }
    walkComments(t) {
      return this.walk((l, s) => {
        if (l.type === "comment") return t(l, s);
      });
    }
    walkDecls(t, l) {
      return l ? t instanceof RegExp ? this.walk((s, u) => {
        if (s.type === "decl" && t.test(s.prop)) return l(s, u);
      }) : this.walk((s, u) => {
        if (s.type === "decl" && s.prop === t) return l(s, u);
      }) : (l = t, this.walk((s, u) => {
        if (s.type === "decl") return l(s, u);
      }));
    }
    walkRules(t, l) {
      return l ? t instanceof RegExp ? this.walk((s, u) => {
        if (s.type === "rule" && t.test(s.selector)) return l(s, u);
      }) : this.walk((s, u) => {
        if (s.type === "rule" && s.selector === t) return l(s, u);
      }) : (l = t, this.walk((s, u) => {
        if (s.type === "rule") return l(s, u);
      }));
    }
  }
  return i.registerParse = (r) => {
    a = r;
  }, i.registerRule = (r) => {
    g = r;
  }, i.registerAtRule = (r) => {
    f = r;
  }, i.registerRoot = (r) => {
    p = r;
  }, oe = i, i.default = i, i.rebuild = (r) => {
    r.type === "atrule" ? Object.setPrototypeOf(r, f.prototype) : r.type === "rule" ? Object.setPrototypeOf(r, g.prototype) : r.type === "decl" ? Object.setPrototypeOf(r, v.prototype) : r.type === "comment" ? Object.setPrototypeOf(r, d.prototype) : r.type === "root" && Object.setPrototypeOf(r, p.prototype), r[n] = true, r.nodes && r.nodes.forEach((t) => {
      i.rebuild(t);
    });
  }, oe;
}
var le, Ve;
function Me() {
  if (Ve) return le;
  Ve = 1;
  let d = B();
  class v extends d {
    constructor(y) {
      super(y), this.type = "atrule";
    }
    append(...y) {
      return this.proxyOf.nodes || (this.nodes = []), super.append(...y);
    }
    prepend(...y) {
      return this.proxyOf.nodes || (this.nodes = []), super.prepend(...y);
    }
  }
  return le = v, v.default = v, d.registerAtRule(v), le;
}
var ae, He;
function ke() {
  if (He) return ae;
  He = 1;
  let d = B(), v, C;
  class y extends d {
    constructor(f) {
      super({ type: "document", ...f }), this.nodes || (this.nodes = []);
    }
    toResult(f = {}) {
      return new v(new C(), this, f).stringify();
    }
  }
  return y.registerLazyResult = (n) => {
    v = n;
  }, y.registerProcessor = (n) => {
    C = n;
  }, ae = y, y.default = y, ae;
}
var ue, Qe;
function At() {
  if (Qe) return ue;
  Qe = 1;
  let d = "useandom-26T198340PX75pxJACKVERYMINDBUSHWOLF_GQZbfghjklqvwyzrict";
  return ue = { nanoid: (y = 21) => {
    let n = "", f = y | 0;
    for (; f--; ) n += d[Math.random() * 64 | 0];
    return n;
  }, customAlphabet: (y, n = 21) => (f = n) => {
    let a = "", p = f | 0;
    for (; p--; ) a += y[Math.random() * y.length | 0];
    return a;
  } }, ue;
}
var he, Ye;
function mt() {
  if (Ye) return he;
  Ye = 1;
  let { existsSync: d, readFileSync: v } = St(), { dirname: C, join: y } = Ae(), { SourceMapConsumer: n, SourceMapGenerator: f } = z;
  function a(g) {
    return $ ? $.from(g, "base64").toString() : window.atob(g);
  }
  class p {
    constructor(o, e) {
      if (e.map === false) return;
      this.loadAnnotation(o), this.inline = this.startWith(this.annotation, "data:");
      let i = e.map ? e.map.prev : void 0, r = this.loadMap(e.from, i);
      !this.mapFile && e.from && (this.mapFile = e.from), this.mapFile && (this.root = C(this.mapFile)), r && (this.text = r);
    }
    consumer() {
      return this.consumerCache || (this.consumerCache = new n(this.text)), this.consumerCache;
    }
    decodeInline(o) {
      let e = /^data:application\/json;charset=utf-?8;base64,/, i = /^data:application\/json;base64,/, r = /^data:application\/json;charset=utf-?8,/, t = /^data:application\/json,/, l = o.match(r) || o.match(t);
      if (l) return decodeURIComponent(o.substr(l[0].length));
      let s = o.match(e) || o.match(i);
      if (s) return a(o.substr(s[0].length));
      let u = o.match(/data:application\/json;([^,]+),/)[1];
      throw new Error("Unsupported source map encoding " + u);
    }
    getAnnotationURL(o) {
      return o.replace(/^\/\*\s*# sourceMappingURL=/, "").trim();
    }
    isMap(o) {
      return typeof o != "object" ? false : typeof o.mappings == "string" || typeof o._mappings == "string" || Array.isArray(o.sections);
    }
    loadAnnotation(o) {
      let e = o.match(/\/\*\s*# sourceMappingURL=/g);
      if (!e) return;
      let i = o.lastIndexOf(e.pop()), r = o.indexOf("*/", i);
      i > -1 && r > -1 && (this.annotation = this.getAnnotationURL(o.substring(i, r)));
    }
    loadFile(o) {
      if (this.root = C(o), d(o)) return this.mapFile = o, v(o, "utf-8").toString().trim();
    }
    loadMap(o, e) {
      if (e === false) return false;
      if (e) {
        if (typeof e == "string") return e;
        if (typeof e == "function") {
          let i = e(o);
          if (i) {
            let r = this.loadFile(i);
            if (!r) throw new Error("Unable to load previous source map: " + i.toString());
            return r;
          }
        } else {
          if (e instanceof n) return f.fromSourceMap(e).toString();
          if (e instanceof f) return e.toString();
          if (this.isMap(e)) return JSON.stringify(e);
          throw new Error("Unsupported previous source map format: " + e.toString());
        }
      } else {
        if (this.inline) return this.decodeInline(this.annotation);
        if (this.annotation) {
          let i = this.annotation;
          return o && (i = y(C(o), i)), this.loadFile(i);
        }
      }
    }
    startWith(o, e) {
      return o ? o.substr(0, e.length) === e : false;
    }
    withContent() {
      return !!(this.consumer().sourcesContent && this.consumer().sourcesContent.length > 0);
    }
  }
  return he = p, p.default = p, he;
}
var fe, Ke;
function Q() {
  if (Ke) return fe;
  Ke = 1;
  let { nanoid: d } = At(), { isAbsolute: v, resolve: C } = Ae(), { SourceMapConsumer: y, SourceMapGenerator: n } = z, { fileURLToPath: f, pathToFileURL: a } = ct, p = Ee(), g = mt(), o = z, e = Symbol("fromOffsetCache"), i = !!(y && n), r = !!(C && v);
  class t {
    get from() {
      return this.file || this.id;
    }
    constructor(s, u = {}) {
      if (s === null || typeof s > "u" || typeof s == "object" && !s.toString) throw new Error(`PostCSS received ${s} instead of CSS string`);
      if (this.css = s.toString(), this.css[0] === "\uFEFF" || this.css[0] === "\uFFFE" ? (this.hasBOM = true, this.css = this.css.slice(1)) : this.hasBOM = false, this.document = this.css, u.document && (this.document = u.document.toString()), u.from && (!r || /^\w+:\/\//.test(u.from) || v(u.from) ? this.file = u.from : this.file = C(u.from)), r && i) {
        let x = new g(this.css, u);
        if (x.text) {
          this.map = x;
          let b = x.consumer().file;
          !this.file && b && (this.file = this.mapResolve(b));
        }
      }
      this.file || (this.id = "<input css " + d(6) + ">"), this.map && (this.map.file = this.from);
    }
    error(s, u, x, b = {}) {
      let m, h, c;
      if (u && typeof u == "object") {
        let R = u, E = x;
        if (typeof R.offset == "number") {
          let P = this.fromOffset(R.offset);
          u = P.line, x = P.col;
        } else u = R.line, x = R.column;
        if (typeof E.offset == "number") {
          let P = this.fromOffset(E.offset);
          h = P.line, m = P.col;
        } else h = E.line, m = E.column;
      } else if (!x) {
        let R = this.fromOffset(u);
        u = R.line, x = R.col;
      }
      let w = this.origin(u, x, h, m);
      return w ? c = new p(s, w.endLine === void 0 ? w.line : { column: w.column, line: w.line }, w.endLine === void 0 ? w.column : { column: w.endColumn, line: w.endLine }, w.source, w.file, b.plugin) : c = new p(s, h === void 0 ? u : { column: x, line: u }, h === void 0 ? x : { column: m, line: h }, this.css, this.file, b.plugin), c.input = { column: x, endColumn: m, endLine: h, line: u, source: this.css }, this.file && (a && (c.input.url = a(this.file).toString()), c.input.file = this.file), c;
    }
    fromOffset(s) {
      let u, x;
      if (this[e]) x = this[e];
      else {
        let m = this.css.split(`
`);
        x = new Array(m.length);
        let h = 0;
        for (let c = 0, w = m.length; c < w; c++) x[c] = h, h += m[c].length + 1;
        this[e] = x;
      }
      u = x[x.length - 1];
      let b = 0;
      if (s >= u) b = x.length - 1;
      else {
        let m = x.length - 2, h;
        for (; b < m; ) if (h = b + (m - b >> 1), s < x[h]) m = h - 1;
        else if (s >= x[h + 1]) b = h + 1;
        else {
          b = h;
          break;
        }
      }
      return { col: s - x[b] + 1, line: b + 1 };
    }
    mapResolve(s) {
      return /^\w+:\/\//.test(s) ? s : C(this.map.consumer().sourceRoot || this.map.root || ".", s);
    }
    origin(s, u, x, b) {
      if (!this.map) return false;
      let m = this.map.consumer(), h = m.originalPositionFor({ column: u, line: s });
      if (!h.source) return false;
      let c;
      typeof x == "number" && (c = m.originalPositionFor({ column: b, line: x }));
      let w;
      v(h.source) ? w = a(h.source) : w = new URL(h.source, this.map.consumer().sourceRoot || a(this.map.mapFile));
      let R = { column: h.column, endColumn: c && c.column, endLine: c && c.line, line: h.line, url: w.toString() };
      if (w.protocol === "file:") if (f) R.file = f(w);
      else throw new Error("file: protocol is not available in this PostCSS build");
      let E = m.sourceContentFor(h.source);
      return E && (R.source = E), R;
    }
    toJSON() {
      let s = {};
      for (let u of ["hasBOM", "css", "file", "id"]) this[u] != null && (s[u] = this[u]);
      return this.map && (s.map = { ...this.map }, s.map.consumerCache && (s.map.consumerCache = void 0)), s;
    }
  }
  return fe = t, t.default = t, o && o.registerInput && o.registerInput(t), fe;
}
var ce, Xe;
function F() {
  if (Xe) return ce;
  Xe = 1;
  let d = B(), v, C;
  class y extends d {
    constructor(f) {
      super(f), this.type = "root", this.nodes || (this.nodes = []);
    }
    normalize(f, a, p) {
      let g = super.normalize(f);
      if (a) {
        if (p === "prepend") this.nodes.length > 1 ? a.raws.before = this.nodes[1].raws.before : delete a.raws.before;
        else if (this.first !== a) for (let o of g) o.raws.before = a.raws.before;
      }
      return g;
    }
    removeChild(f, a) {
      let p = this.index(f);
      return !a && p === 0 && this.nodes.length > 1 && (this.nodes[1].raws.before = this.nodes[p].raws.before), super.removeChild(f);
    }
    toResult(f = {}) {
      return new v(new C(), this, f).stringify();
    }
  }
  return y.registerLazyResult = (n) => {
    v = n;
  }, y.registerProcessor = (n) => {
    C = n;
  }, ce = y, y.default = y, d.registerRoot(y), ce;
}
var pe, Ze;
function dt() {
  if (Ze) return pe;
  Ze = 1;
  let d = { comma(v) {
    return d.split(v, [","], true);
  }, space(v) {
    let C = [" ", `
`, "	"];
    return d.split(v, C);
  }, split(v, C, y) {
    let n = [], f = "", a = false, p = 0, g = false, o = "", e = false;
    for (let i of v) e ? e = false : i === "\\" ? e = true : g ? i === o && (g = false) : i === '"' || i === "'" ? (g = true, o = i) : i === "(" ? p += 1 : i === ")" ? p > 0 && (p -= 1) : p === 0 && C.includes(i) && (a = true), a ? (f !== "" && n.push(f.trim()), f = "", a = false) : f += i;
    return (y || f !== "") && n.push(f.trim()), n;
  } };
  return pe = d, d.default = d, pe;
}
var me, et;
function Ie() {
  if (et) return me;
  et = 1;
  let d = B(), v = dt();
  class C extends d {
    get selectors() {
      return v.comma(this.selector);
    }
    set selectors(n) {
      let f = this.selector ? this.selector.match(/,\s*/) : null, a = f ? f[0] : "," + this.raw("between", "beforeOpen");
      this.selector = n.join(a);
    }
    constructor(n) {
      super(n), this.type = "rule", this.nodes || (this.nodes = []);
    }
  }
  return me = C, C.default = C, d.registerRule(C), me;
}
var de, tt;
function Et() {
  if (tt) return de;
  tt = 1;
  let d = Me(), v = V(), C = H(), y = Q(), n = mt(), f = F(), a = Ie();
  function p(g, o) {
    if (Array.isArray(g)) return g.map((r) => p(r));
    let { inputs: e, ...i } = g;
    if (e) {
      o = [];
      for (let r of e) {
        let t = { ...r, __proto__: y.prototype };
        t.map && (t.map = { ...t.map, __proto__: n.prototype }), o.push(t);
      }
    }
    if (i.nodes && (i.nodes = g.nodes.map((r) => p(r, o))), i.source) {
      let { inputId: r, ...t } = i.source;
      i.source = t, r != null && (i.source.input = o[r]);
    }
    if (i.type === "root") return new f(i);
    if (i.type === "decl") return new C(i);
    if (i.type === "rule") return new a(i);
    if (i.type === "comment") return new v(i);
    if (i.type === "atrule") return new d(i);
    throw new Error("Unknown node type: " + g.type);
  }
  return de = p, p.default = p, de;
}
var ge, rt;
function gt() {
  if (rt) return ge;
  rt = 1;
  let { dirname: d, relative: v, resolve: C, sep: y } = Ae(), { SourceMapConsumer: n, SourceMapGenerator: f } = z, { pathToFileURL: a } = ct, p = Q(), g = !!(n && f), o = !!(d && C && v && y);
  class e {
    constructor(r, t, l, s) {
      this.stringify = r, this.mapOpts = l.map || {}, this.root = t, this.opts = l, this.css = s, this.originalCSS = s, this.usesFileUrls = !this.mapOpts.from && this.mapOpts.absolute, this.memoizedFileURLs = /* @__PURE__ */ new Map(), this.memoizedPaths = /* @__PURE__ */ new Map(), this.memoizedURLs = /* @__PURE__ */ new Map();
    }
    addAnnotation() {
      let r;
      this.isInline() ? r = "data:application/json;base64," + this.toBase64(this.map.toString()) : typeof this.mapOpts.annotation == "string" ? r = this.mapOpts.annotation : typeof this.mapOpts.annotation == "function" ? r = this.mapOpts.annotation(this.opts.to, this.root) : r = this.outputFile() + ".map";
      let t = `
`;
      this.css.includes(`\r
`) && (t = `\r
`), this.css += t + "/*# sourceMappingURL=" + r + " */";
    }
    applyPrevMaps() {
      for (let r of this.previous()) {
        let t = this.toUrl(this.path(r.file)), l = r.root || d(r.file), s;
        this.mapOpts.sourcesContent === false ? (s = new n(r.text), s.sourcesContent && (s.sourcesContent = null)) : s = r.consumer(), this.map.applySourceMap(s, t, this.toUrl(this.path(l)));
      }
    }
    clearAnnotation() {
      if (this.mapOpts.annotation !== false) if (this.root) {
        let r;
        for (let t = this.root.nodes.length - 1; t >= 0; t--) r = this.root.nodes[t], r.type === "comment" && r.text.startsWith("# sourceMappingURL=") && this.root.removeChild(t);
      } else this.css && (this.css = this.css.replace(/\n*\/\*#[\S\s]*?\*\/$/gm, ""));
    }
    generate() {
      if (this.clearAnnotation(), o && g && this.isMap()) return this.generateMap();
      {
        let r = "";
        return this.stringify(this.root, (t) => {
          r += t;
        }), [r];
      }
    }
    generateMap() {
      if (this.root) this.generateString();
      else if (this.previous().length === 1) {
        let r = this.previous()[0].consumer();
        r.file = this.outputFile(), this.map = f.fromSourceMap(r, { ignoreInvalidMapping: true });
      } else this.map = new f({ file: this.outputFile(), ignoreInvalidMapping: true }), this.map.addMapping({ generated: { column: 0, line: 1 }, original: { column: 0, line: 1 }, source: this.opts.from ? this.toUrl(this.path(this.opts.from)) : "<no source>" });
      return this.isSourcesContent() && this.setSourcesContent(), this.root && this.previous().length > 0 && this.applyPrevMaps(), this.isAnnotation() && this.addAnnotation(), this.isInline() ? [this.css] : [this.css, this.map];
    }
    generateString() {
      this.css = "", this.map = new f({ file: this.outputFile(), ignoreInvalidMapping: true });
      let r = 1, t = 1, l = "<no source>", s = { generated: { column: 0, line: 0 }, original: { column: 0, line: 0 }, source: "" }, u, x;
      this.stringify(this.root, (b, m, h) => {
        if (this.css += b, m && h !== "end" && (s.generated.line = r, s.generated.column = t - 1, m.source && m.source.start ? (s.source = this.sourcePath(m), s.original.line = m.source.start.line, s.original.column = m.source.start.column - 1, this.map.addMapping(s)) : (s.source = l, s.original.line = 1, s.original.column = 0, this.map.addMapping(s))), x = b.match(/\n/g), x ? (r += x.length, u = b.lastIndexOf(`
`), t = b.length - u) : t += b.length, m && h !== "start") {
          let c = m.parent || { raws: {} };
          (!(m.type === "decl" || m.type === "atrule" && !m.nodes) || m !== c.last || c.raws.semicolon) && (m.source && m.source.end ? (s.source = this.sourcePath(m), s.original.line = m.source.end.line, s.original.column = m.source.end.column - 1, s.generated.line = r, s.generated.column = t - 2, this.map.addMapping(s)) : (s.source = l, s.original.line = 1, s.original.column = 0, s.generated.line = r, s.generated.column = t - 1, this.map.addMapping(s)));
        }
      });
    }
    isAnnotation() {
      return this.isInline() ? true : typeof this.mapOpts.annotation < "u" ? this.mapOpts.annotation : this.previous().length ? this.previous().some((r) => r.annotation) : true;
    }
    isInline() {
      if (typeof this.mapOpts.inline < "u") return this.mapOpts.inline;
      let r = this.mapOpts.annotation;
      return typeof r < "u" && r !== true ? false : this.previous().length ? this.previous().some((t) => t.inline) : true;
    }
    isMap() {
      return typeof this.opts.map < "u" ? !!this.opts.map : this.previous().length > 0;
    }
    isSourcesContent() {
      return typeof this.mapOpts.sourcesContent < "u" ? this.mapOpts.sourcesContent : this.previous().length ? this.previous().some((r) => r.withContent()) : true;
    }
    outputFile() {
      return this.opts.to ? this.path(this.opts.to) : this.opts.from ? this.path(this.opts.from) : "to.css";
    }
    path(r) {
      if (this.mapOpts.absolute || r.charCodeAt(0) === 60 || /^\w+:\/\//.test(r)) return r;
      let t = this.memoizedPaths.get(r);
      if (t) return t;
      let l = this.opts.to ? d(this.opts.to) : ".";
      typeof this.mapOpts.annotation == "string" && (l = d(C(l, this.mapOpts.annotation)));
      let s = v(l, r);
      return this.memoizedPaths.set(r, s), s;
    }
    previous() {
      if (!this.previousMaps) if (this.previousMaps = [], this.root) this.root.walk((r) => {
        if (r.source && r.source.input.map) {
          let t = r.source.input.map;
          this.previousMaps.includes(t) || this.previousMaps.push(t);
        }
      });
      else {
        let r = new p(this.originalCSS, this.opts);
        r.map && this.previousMaps.push(r.map);
      }
      return this.previousMaps;
    }
    setSourcesContent() {
      let r = {};
      if (this.root) this.root.walk((t) => {
        if (t.source) {
          let l = t.source.input.from;
          if (l && !r[l]) {
            r[l] = true;
            let s = this.usesFileUrls ? this.toFileUrl(l) : this.toUrl(this.path(l));
            this.map.setSourceContent(s, t.source.input.css);
          }
        }
      });
      else if (this.css) {
        let t = this.opts.from ? this.toUrl(this.path(this.opts.from)) : "<no source>";
        this.map.setSourceContent(t, this.css);
      }
    }
    sourcePath(r) {
      return this.mapOpts.from ? this.toUrl(this.mapOpts.from) : this.usesFileUrls ? this.toFileUrl(r.source.input.from) : this.toUrl(this.path(r.source.input.from));
    }
    toBase64(r) {
      return $ ? $.from(r).toString("base64") : window.btoa(unescape(encodeURIComponent(r)));
    }
    toFileUrl(r) {
      let t = this.memoizedFileURLs.get(r);
      if (t) return t;
      if (a) {
        let l = a(r).toString();
        return this.memoizedFileURLs.set(r, l), l;
      } else throw new Error("`map.absolute` option is not available in this PostCSS build");
    }
    toUrl(r) {
      let t = this.memoizedURLs.get(r);
      if (t) return t;
      y === "\\" && (r = r.replace(/\\/g, "/"));
      let l = encodeURI(r).replace(/[#?]/g, encodeURIComponent);
      return this.memoizedURLs.set(r, l), l;
    }
  }
  return ge = e, ge;
}
var we, it;
function Pt() {
  if (it) return we;
  it = 1;
  const d = 39, v = 34, C = 92, y = 47, n = 10, f = 32, a = 12, p = 9, g = 13, o = 91, e = 93, i = 40, r = 41, t = 123, l = 125, s = 59, u = 42, x = 58, b = 64, m = /[\t\n\f\r "#'()/;[\\\]{}]/g, h = /[\t\n\f\r !"#'():;@[\\\]{}]|\/(?=\*)/g, c = /.[\r\n"'(/\\]/, w = /[\da-f]/i;
  return we = function(E, P = {}) {
    let A = E.css.valueOf(), L = P.ignoreErrors, k, Y, D, S, qe, I, U, N, q, Be, Ne = A.length, O = 0, K = [], T = [];
    function bt() {
      return O;
    }
    function X(_) {
      throw E.error("Unclosed " + _, O);
    }
    function xt() {
      return T.length === 0 && O >= Ne;
    }
    function vt(_) {
      if (T.length) return T.pop();
      if (O >= Ne) return;
      let Z = _ ? _.ignoreUnclosed : false;
      switch (k = A.charCodeAt(O), k) {
        case n:
        case f:
        case p:
        case g:
        case a: {
          S = O;
          do
            S += 1, k = A.charCodeAt(S);
          while (k === f || k === n || k === p || k === g || k === a);
          I = ["space", A.slice(O, S)], O = S - 1;
          break;
        }
        case o:
        case e:
        case t:
        case l:
        case x:
        case s:
        case r: {
          let _e = String.fromCharCode(k);
          I = [_e, _e, O];
          break;
        }
        case i: {
          if (Be = K.length ? K.pop()[1] : "", q = A.charCodeAt(O + 1), Be === "url" && q !== d && q !== v && q !== f && q !== n && q !== p && q !== a && q !== g) {
            S = O;
            do {
              if (U = false, S = A.indexOf(")", S + 1), S === -1) if (L || Z) {
                S = O;
                break;
              } else X("bracket");
              for (N = S; A.charCodeAt(N - 1) === C; ) N -= 1, U = !U;
            } while (U);
            I = ["brackets", A.slice(O, S + 1), O, S], O = S;
          } else S = A.indexOf(")", O + 1), Y = A.slice(O, S + 1), S === -1 || c.test(Y) ? I = ["(", "(", O] : (I = ["brackets", Y, O, S], O = S);
          break;
        }
        case d:
        case v: {
          qe = k === d ? "'" : '"', S = O;
          do {
            if (U = false, S = A.indexOf(qe, S + 1), S === -1) if (L || Z) {
              S = O + 1;
              break;
            } else X("string");
            for (N = S; A.charCodeAt(N - 1) === C; ) N -= 1, U = !U;
          } while (U);
          I = ["string", A.slice(O, S + 1), O, S], O = S;
          break;
        }
        case b: {
          m.lastIndex = O + 1, m.test(A), m.lastIndex === 0 ? S = A.length - 1 : S = m.lastIndex - 2, I = ["at-word", A.slice(O, S + 1), O, S], O = S;
          break;
        }
        case C: {
          for (S = O, D = true; A.charCodeAt(S + 1) === C; ) S += 1, D = !D;
          if (k = A.charCodeAt(S + 1), D && k !== y && k !== f && k !== n && k !== p && k !== g && k !== a && (S += 1, w.test(A.charAt(S)))) {
            for (; w.test(A.charAt(S + 1)); ) S += 1;
            A.charCodeAt(S + 1) === f && (S += 1);
          }
          I = ["word", A.slice(O, S + 1), O, S], O = S;
          break;
        }
        default: {
          k === y && A.charCodeAt(O + 1) === u ? (S = A.indexOf("*/", O + 2) + 1, S === 0 && (L || Z ? S = A.length : X("comment")), I = ["comment", A.slice(O, S + 1), O, S], O = S) : (h.lastIndex = O + 1, h.test(A), h.lastIndex === 0 ? S = A.length - 1 : S = h.lastIndex - 2, I = ["word", A.slice(O, S + 1), O, S], K.push(I), O = S);
          break;
        }
      }
      return O++, I;
    }
    function Ct(_) {
      T.push(_);
    }
    return { back: Ct, endOfFile: xt, nextToken: vt, position: bt };
  }, we;
}
var ye, st;
function Mt() {
  if (st) return ye;
  st = 1;
  let d = Me(), v = V(), C = H(), y = F(), n = Ie(), f = Pt();
  const a = { empty: true, space: true };
  function p(o) {
    for (let e = o.length - 1; e >= 0; e--) {
      let i = o[e], r = i[3] || i[2];
      if (r) return r;
    }
  }
  class g {
    constructor(e) {
      this.input = e, this.root = new y(), this.current = this.root, this.spaces = "", this.semicolon = false, this.createTokenizer(), this.root.source = { input: e, start: { column: 1, line: 1, offset: 0 } };
    }
    atrule(e) {
      let i = new d();
      i.name = e[1].slice(1), i.name === "" && this.unnamedAtrule(i, e), this.init(i, e[2]);
      let r, t, l, s = false, u = false, x = [], b = [];
      for (; !this.tokenizer.endOfFile(); ) {
        if (e = this.tokenizer.nextToken(), r = e[0], r === "(" || r === "[" ? b.push(r === "(" ? ")" : "]") : r === "{" && b.length > 0 ? b.push("}") : r === b[b.length - 1] && b.pop(), b.length === 0) if (r === ";") {
          i.source.end = this.getPosition(e[2]), i.source.end.offset++, this.semicolon = true;
          break;
        } else if (r === "{") {
          u = true;
          break;
        } else if (r === "}") {
          if (x.length > 0) {
            for (l = x.length - 1, t = x[l]; t && t[0] === "space"; ) t = x[--l];
            t && (i.source.end = this.getPosition(t[3] || t[2]), i.source.end.offset++);
          }
          this.end(e);
          break;
        } else x.push(e);
        else x.push(e);
        if (this.tokenizer.endOfFile()) {
          s = true;
          break;
        }
      }
      i.raws.between = this.spacesAndCommentsFromEnd(x), x.length ? (i.raws.afterName = this.spacesAndCommentsFromStart(x), this.raw(i, "params", x), s && (e = x[x.length - 1], i.source.end = this.getPosition(e[3] || e[2]), i.source.end.offset++, this.spaces = i.raws.between, i.raws.between = "")) : (i.raws.afterName = "", i.params = ""), u && (i.nodes = [], this.current = i);
    }
    checkMissedSemicolon(e) {
      let i = this.colon(e);
      if (i === false) return;
      let r = 0, t;
      for (let l = i - 1; l >= 0 && (t = e[l], !(t[0] !== "space" && (r += 1, r === 2))); l--) ;
      throw this.input.error("Missed semicolon", t[0] === "word" ? t[3] + 1 : t[2]);
    }
    colon(e) {
      let i = 0, r, t, l;
      for (let [s, u] of e.entries()) {
        if (t = u, l = t[0], l === "(" && (i += 1), l === ")" && (i -= 1), i === 0 && l === ":") if (!r) this.doubleColon(t);
        else {
          if (r[0] === "word" && r[1] === "progid") continue;
          return s;
        }
        r = t;
      }
      return false;
    }
    comment(e) {
      let i = new v();
      this.init(i, e[2]), i.source.end = this.getPosition(e[3] || e[2]), i.source.end.offset++;
      let r = e[1].slice(2, -2);
      if (/^\s*$/.test(r)) i.text = "", i.raws.left = r, i.raws.right = "";
      else {
        let t = r.match(/^(\s*)([^]*\S)(\s*)$/);
        i.text = t[2], i.raws.left = t[1], i.raws.right = t[3];
      }
    }
    createTokenizer() {
      this.tokenizer = f(this.input);
    }
    decl(e, i) {
      let r = new C();
      this.init(r, e[0][2]);
      let t = e[e.length - 1];
      for (t[0] === ";" && (this.semicolon = true, e.pop()), r.source.end = this.getPosition(t[3] || t[2] || p(e)), r.source.end.offset++; e[0][0] !== "word"; ) e.length === 1 && this.unknownWord(e), r.raws.before += e.shift()[1];
      for (r.source.start = this.getPosition(e[0][2]), r.prop = ""; e.length; ) {
        let b = e[0][0];
        if (b === ":" || b === "space" || b === "comment") break;
        r.prop += e.shift()[1];
      }
      r.raws.between = "";
      let l;
      for (; e.length; ) if (l = e.shift(), l[0] === ":") {
        r.raws.between += l[1];
        break;
      } else l[0] === "word" && /\w/.test(l[1]) && this.unknownWord([l]), r.raws.between += l[1];
      (r.prop[0] === "_" || r.prop[0] === "*") && (r.raws.before += r.prop[0], r.prop = r.prop.slice(1));
      let s = [], u;
      for (; e.length && (u = e[0][0], !(u !== "space" && u !== "comment")); ) s.push(e.shift());
      this.precheckMissedSemicolon(e);
      for (let b = e.length - 1; b >= 0; b--) {
        if (l = e[b], l[1].toLowerCase() === "!important") {
          r.important = true;
          let m = this.stringFrom(e, b);
          m = this.spacesFromEnd(e) + m, m !== " !important" && (r.raws.important = m);
          break;
        } else if (l[1].toLowerCase() === "important") {
          let m = e.slice(0), h = "";
          for (let c = b; c > 0; c--) {
            let w = m[c][0];
            if (h.trim().startsWith("!") && w !== "space") break;
            h = m.pop()[1] + h;
          }
          h.trim().startsWith("!") && (r.important = true, r.raws.important = h, e = m);
        }
        if (l[0] !== "space" && l[0] !== "comment") break;
      }
      e.some((b) => b[0] !== "space" && b[0] !== "comment") && (r.raws.between += s.map((b) => b[1]).join(""), s = []), this.raw(r, "value", s.concat(e), i), r.value.includes(":") && !i && this.checkMissedSemicolon(e);
    }
    doubleColon(e) {
      throw this.input.error("Double colon", { offset: e[2] }, { offset: e[2] + e[1].length });
    }
    emptyRule(e) {
      let i = new n();
      this.init(i, e[2]), i.selector = "", i.raws.between = "", this.current = i;
    }
    end(e) {
      this.current.nodes && this.current.nodes.length && (this.current.raws.semicolon = this.semicolon), this.semicolon = false, this.current.raws.after = (this.current.raws.after || "") + this.spaces, this.spaces = "", this.current.parent ? (this.current.source.end = this.getPosition(e[2]), this.current.source.end.offset++, this.current = this.current.parent) : this.unexpectedClose(e);
    }
    endFile() {
      this.current.parent && this.unclosedBlock(), this.current.nodes && this.current.nodes.length && (this.current.raws.semicolon = this.semicolon), this.current.raws.after = (this.current.raws.after || "") + this.spaces, this.root.source.end = this.getPosition(this.tokenizer.position());
    }
    freeSemicolon(e) {
      if (this.spaces += e[1], this.current.nodes) {
        let i = this.current.nodes[this.current.nodes.length - 1];
        i && i.type === "rule" && !i.raws.ownSemicolon && (i.raws.ownSemicolon = this.spaces, this.spaces = "", i.source.end = this.getPosition(e[2]), i.source.end.offset += i.raws.ownSemicolon.length);
      }
    }
    getPosition(e) {
      let i = this.input.fromOffset(e);
      return { column: i.col, line: i.line, offset: e };
    }
    init(e, i) {
      this.current.push(e), e.source = { input: this.input, start: this.getPosition(i) }, e.raws.before = this.spaces, this.spaces = "", e.type !== "comment" && (this.semicolon = false);
    }
    other(e) {
      let i = false, r = null, t = false, l = null, s = [], u = e[1].startsWith("--"), x = [], b = e;
      for (; b; ) {
        if (r = b[0], x.push(b), r === "(" || r === "[") l || (l = b), s.push(r === "(" ? ")" : "]");
        else if (u && t && r === "{") l || (l = b), s.push("}");
        else if (s.length === 0) if (r === ";") if (t) {
          this.decl(x, u);
          return;
        } else break;
        else if (r === "{") {
          this.rule(x);
          return;
        } else if (r === "}") {
          this.tokenizer.back(x.pop()), i = true;
          break;
        } else r === ":" && (t = true);
        else r === s[s.length - 1] && (s.pop(), s.length === 0 && (l = null));
        b = this.tokenizer.nextToken();
      }
      if (this.tokenizer.endOfFile() && (i = true), s.length > 0 && this.unclosedBracket(l), i && t) {
        if (!u) for (; x.length && (b = x[x.length - 1][0], !(b !== "space" && b !== "comment")); ) this.tokenizer.back(x.pop());
        this.decl(x, u);
      } else this.unknownWord(x);
    }
    parse() {
      let e;
      for (; !this.tokenizer.endOfFile(); ) switch (e = this.tokenizer.nextToken(), e[0]) {
        case "space":
          this.spaces += e[1];
          break;
        case ";":
          this.freeSemicolon(e);
          break;
        case "}":
          this.end(e);
          break;
        case "comment":
          this.comment(e);
          break;
        case "at-word":
          this.atrule(e);
          break;
        case "{":
          this.emptyRule(e);
          break;
        default:
          this.other(e);
          break;
      }
      this.endFile();
    }
    precheckMissedSemicolon() {
    }
    raw(e, i, r, t) {
      let l, s, u = r.length, x = "", b = true, m, h;
      for (let c = 0; c < u; c += 1) l = r[c], s = l[0], s === "space" && c === u - 1 && !t ? b = false : s === "comment" ? (h = r[c - 1] ? r[c - 1][0] : "empty", m = r[c + 1] ? r[c + 1][0] : "empty", !a[h] && !a[m] ? x.slice(-1) === "," ? b = false : x += l[1] : b = false) : x += l[1];
      if (!b) {
        let c = r.reduce((w, R) => w + R[1], "");
        e.raws[i] = { raw: c, value: x };
      }
      e[i] = x;
    }
    rule(e) {
      e.pop();
      let i = new n();
      this.init(i, e[0][2]), i.raws.between = this.spacesAndCommentsFromEnd(e), this.raw(i, "selector", e), this.current = i;
    }
    spacesAndCommentsFromEnd(e) {
      let i, r = "";
      for (; e.length && (i = e[e.length - 1][0], !(i !== "space" && i !== "comment")); ) r = e.pop()[1] + r;
      return r;
    }
    spacesAndCommentsFromStart(e) {
      let i, r = "";
      for (; e.length && (i = e[0][0], !(i !== "space" && i !== "comment")); ) r += e.shift()[1];
      return r;
    }
    spacesFromEnd(e) {
      let i, r = "";
      for (; e.length && (i = e[e.length - 1][0], i === "space"); ) r = e.pop()[1] + r;
      return r;
    }
    stringFrom(e, i) {
      let r = "";
      for (let t = i; t < e.length; t++) r += e[t][1];
      return e.splice(i, e.length - i), r;
    }
    unclosedBlock() {
      let e = this.current.source.start;
      throw this.input.error("Unclosed block", e.line, e.column);
    }
    unclosedBracket(e) {
      throw this.input.error("Unclosed bracket", { offset: e[2] }, { offset: e[2] + 1 });
    }
    unexpectedClose(e) {
      throw this.input.error("Unexpected }", { offset: e[2] }, { offset: e[2] + 1 });
    }
    unknownWord(e) {
      throw this.input.error("Unknown word " + e[0][1], { offset: e[0][2] }, { offset: e[0][2] + e[0][1].length });
    }
    unnamedAtrule(e, i) {
      throw this.input.error("At-rule without name", { offset: i[2] }, { offset: i[2] + i[1].length });
    }
  }
  return ye = g, ye;
}
var be, nt;
function Le() {
  if (nt) return be;
  nt = 1;
  let d = B(), v = Q(), C = Mt();
  function y(n, f) {
    let a = new v(n, f), p = new C(a);
    try {
      p.parse();
    } catch (g) {
      throw g;
    }
    return p.root;
  }
  return be = y, y.default = y, d.registerParse(y), be;
}
var xe, ot;
function wt() {
  if (ot) return xe;
  ot = 1;
  class d {
    constructor(C, y = {}) {
      if (this.type = "warning", this.text = C, y.node && y.node.source) {
        let n = y.node.rangeBy(y);
        this.line = n.start.line, this.column = n.start.column, this.endLine = n.end.line, this.endColumn = n.end.column;
      }
      for (let n in y) this[n] = y[n];
    }
    toString() {
      return this.node ? this.node.error(this.text, { index: this.index, plugin: this.plugin, word: this.word }).message : this.plugin ? this.plugin + ": " + this.text : this.text;
    }
  }
  return xe = d, d.default = d, xe;
}
var ve, lt;
function Ue() {
  if (lt) return ve;
  lt = 1;
  let d = wt();
  class v {
    get content() {
      return this.css;
    }
    constructor(y, n, f) {
      this.processor = y, this.messages = [], this.root = n, this.opts = f, this.css = void 0, this.map = void 0;
    }
    toString() {
      return this.css;
    }
    warn(y, n = {}) {
      n.plugin || this.lastPlugin && this.lastPlugin.postcssPlugin && (n.plugin = this.lastPlugin.postcssPlugin);
      let f = new d(y, n);
      return this.messages.push(f), f;
    }
    warnings() {
      return this.messages.filter((y) => y.type === "warning");
    }
  }
  return ve = v, v.default = v, ve;
}
var Ce, at;
function yt() {
  if (at) return Ce;
  at = 1;
  let d = B(), v = ke(), C = gt(), y = Le(), n = Ue(), f = F(), a = G(), { isClean: p, my: g } = Pe();
  const o = { atrule: "AtRule", comment: "Comment", decl: "Declaration", document: "Document", root: "Root", rule: "Rule" }, e = { AtRule: true, AtRuleExit: true, Comment: true, CommentExit: true, Declaration: true, DeclarationExit: true, Document: true, DocumentExit: true, Once: true, OnceExit: true, postcssPlugin: true, prepare: true, Root: true, RootExit: true, Rule: true, RuleExit: true }, i = { Once: true, postcssPlugin: true, prepare: true }, r = 0;
  function t(m) {
    return typeof m == "object" && typeof m.then == "function";
  }
  function l(m) {
    let h = false, c = o[m.type];
    return m.type === "decl" ? h = m.prop.toLowerCase() : m.type === "atrule" && (h = m.name.toLowerCase()), h && m.append ? [c, c + "-" + h, r, c + "Exit", c + "Exit-" + h] : h ? [c, c + "-" + h, c + "Exit", c + "Exit-" + h] : m.append ? [c, r, c + "Exit"] : [c, c + "Exit"];
  }
  function s(m) {
    let h;
    return m.type === "document" ? h = ["Document", r, "DocumentExit"] : m.type === "root" ? h = ["Root", r, "RootExit"] : h = l(m), { eventIndex: 0, events: h, iterator: 0, node: m, visitorIndex: 0, visitors: [] };
  }
  function u(m) {
    return m[p] = false, m.nodes && m.nodes.forEach((h) => u(h)), m;
  }
  let x = {};
  class b {
    get content() {
      return this.stringify().content;
    }
    get css() {
      return this.stringify().css;
    }
    get map() {
      return this.stringify().map;
    }
    get messages() {
      return this.sync().messages;
    }
    get opts() {
      return this.result.opts;
    }
    get processor() {
      return this.result.processor;
    }
    get root() {
      return this.sync().root;
    }
    get [Symbol.toStringTag]() {
      return "LazyResult";
    }
    constructor(h, c, w) {
      this.stringified = false, this.processed = false;
      let R;
      if (typeof c == "object" && c !== null && (c.type === "root" || c.type === "document")) R = u(c);
      else if (c instanceof b || c instanceof n) R = u(c.root), c.map && (typeof w.map > "u" && (w.map = {}), w.map.inline || (w.map.inline = false), w.map.prev = c.map);
      else {
        let E = y;
        w.syntax && (E = w.syntax.parse), w.parser && (E = w.parser), E.parse && (E = E.parse);
        try {
          R = E(c, w);
        } catch (P) {
          this.processed = true, this.error = P;
        }
        R && !R[g] && d.rebuild(R);
      }
      this.result = new n(h, R, w), this.helpers = { ...x, postcss: x, result: this.result }, this.plugins = this.processor.plugins.map((E) => typeof E == "object" && E.prepare ? { ...E, ...E.prepare(this.result) } : E);
    }
    async() {
      return this.error ? Promise.reject(this.error) : this.processed ? Promise.resolve(this.result) : (this.processing || (this.processing = this.runAsync()), this.processing);
    }
    catch(h) {
      return this.async().catch(h);
    }
    finally(h) {
      return this.async().then(h, h);
    }
    getAsyncError() {
      throw new Error("Use process(css).then(cb) to work with async plugins");
    }
    handleError(h, c) {
      let w = this.result.lastPlugin;
      try {
        c && c.addToError(h), this.error = h, h.name === "CssSyntaxError" && !h.plugin ? (h.plugin = w.postcssPlugin, h.setMessage()) : w.postcssVersion;
      } catch (R) {
        console && console.error && console.error(R);
      }
      return h;
    }
    prepareVisitors() {
      this.listeners = {};
      let h = (c, w, R) => {
        this.listeners[w] || (this.listeners[w] = []), this.listeners[w].push([c, R]);
      };
      for (let c of this.plugins) if (typeof c == "object") for (let w in c) {
        if (!e[w] && /^[A-Z]/.test(w)) throw new Error(`Unknown event ${w} in ${c.postcssPlugin}. Try to update PostCSS (${this.processor.version} now).`);
        if (!i[w]) if (typeof c[w] == "object") for (let R in c[w]) R === "*" ? h(c, w, c[w][R]) : h(c, w + "-" + R.toLowerCase(), c[w][R]);
        else typeof c[w] == "function" && h(c, w, c[w]);
      }
      this.hasListener = Object.keys(this.listeners).length > 0;
    }
    async runAsync() {
      this.plugin = 0;
      for (let h = 0; h < this.plugins.length; h++) {
        let c = this.plugins[h], w = this.runOnRoot(c);
        if (t(w)) try {
          await w;
        } catch (R) {
          throw this.handleError(R);
        }
      }
      if (this.prepareVisitors(), this.hasListener) {
        let h = this.result.root;
        for (; !h[p]; ) {
          h[p] = true;
          let c = [s(h)];
          for (; c.length > 0; ) {
            let w = this.visitTick(c);
            if (t(w)) try {
              await w;
            } catch (R) {
              let E = c[c.length - 1].node;
              throw this.handleError(R, E);
            }
          }
        }
        if (this.listeners.OnceExit) for (let [c, w] of this.listeners.OnceExit) {
          this.result.lastPlugin = c;
          try {
            if (h.type === "document") {
              let R = h.nodes.map((E) => w(E, this.helpers));
              await Promise.all(R);
            } else await w(h, this.helpers);
          } catch (R) {
            throw this.handleError(R);
          }
        }
      }
      return this.processed = true, this.stringify();
    }
    runOnRoot(h) {
      this.result.lastPlugin = h;
      try {
        if (typeof h == "object" && h.Once) {
          if (this.result.root.type === "document") {
            let c = this.result.root.nodes.map((w) => h.Once(w, this.helpers));
            return t(c[0]) ? Promise.all(c) : c;
          }
          return h.Once(this.result.root, this.helpers);
        } else if (typeof h == "function") return h(this.result.root, this.result);
      } catch (c) {
        throw this.handleError(c);
      }
    }
    stringify() {
      if (this.error) throw this.error;
      if (this.stringified) return this.result;
      this.stringified = true, this.sync();
      let h = this.result.opts, c = a;
      h.syntax && (c = h.syntax.stringify), h.stringifier && (c = h.stringifier), c.stringify && (c = c.stringify);
      let R = new C(c, this.result.root, this.result.opts).generate();
      return this.result.css = R[0], this.result.map = R[1], this.result;
    }
    sync() {
      if (this.error) throw this.error;
      if (this.processed) return this.result;
      if (this.processed = true, this.processing) throw this.getAsyncError();
      for (let h of this.plugins) {
        let c = this.runOnRoot(h);
        if (t(c)) throw this.getAsyncError();
      }
      if (this.prepareVisitors(), this.hasListener) {
        let h = this.result.root;
        for (; !h[p]; ) h[p] = true, this.walkSync(h);
        if (this.listeners.OnceExit) if (h.type === "document") for (let c of h.nodes) this.visitSync(this.listeners.OnceExit, c);
        else this.visitSync(this.listeners.OnceExit, h);
      }
      return this.result;
    }
    then(h, c) {
      return this.async().then(h, c);
    }
    toString() {
      return this.css;
    }
    visitSync(h, c) {
      for (let [w, R] of h) {
        this.result.lastPlugin = w;
        let E;
        try {
          E = R(c, this.helpers);
        } catch (P) {
          throw this.handleError(P, c.proxyOf);
        }
        if (c.type !== "root" && c.type !== "document" && !c.parent) return true;
        if (t(E)) throw this.getAsyncError();
      }
    }
    visitTick(h) {
      let c = h[h.length - 1], { node: w, visitors: R } = c;
      if (w.type !== "root" && w.type !== "document" && !w.parent) {
        h.pop();
        return;
      }
      if (R.length > 0 && c.visitorIndex < R.length) {
        let [P, A] = R[c.visitorIndex];
        c.visitorIndex += 1, c.visitorIndex === R.length && (c.visitors = [], c.visitorIndex = 0), this.result.lastPlugin = P;
        try {
          return A(w.toProxy(), this.helpers);
        } catch (L) {
          throw this.handleError(L, w);
        }
      }
      if (c.iterator !== 0) {
        let P = c.iterator, A;
        for (; A = w.nodes[w.indexes[P]]; ) if (w.indexes[P] += 1, !A[p]) {
          A[p] = true, h.push(s(A));
          return;
        }
        c.iterator = 0, delete w.indexes[P];
      }
      let E = c.events;
      for (; c.eventIndex < E.length; ) {
        let P = E[c.eventIndex];
        if (c.eventIndex += 1, P === r) {
          w.nodes && w.nodes.length && (w[p] = true, c.iterator = w.getIterator());
          return;
        } else if (this.listeners[P]) {
          c.visitors = this.listeners[P];
          return;
        }
      }
      h.pop();
    }
    walkSync(h) {
      h[p] = true;
      let c = l(h);
      for (let w of c) if (w === r) h.nodes && h.each((R) => {
        R[p] || this.walkSync(R);
      });
      else {
        let R = this.listeners[w];
        if (R && this.visitSync(R, h.toProxy())) return;
      }
    }
    warnings() {
      return this.sync().warnings();
    }
  }
  return b.registerPostcss = (m) => {
    x = m;
  }, Ce = b, b.default = b, f.registerLazyResult(b), v.registerLazyResult(b), Ce;
}
var Re, ut;
function kt() {
  if (ut) return Re;
  ut = 1;
  let d = gt(), v = Le();
  const C = Ue();
  let y = G();
  class n {
    get content() {
      return this.result.css;
    }
    get css() {
      return this.result.css;
    }
    get map() {
      return this.result.map;
    }
    get messages() {
      return [];
    }
    get opts() {
      return this.result.opts;
    }
    get processor() {
      return this.result.processor;
    }
    get root() {
      if (this._root) return this._root;
      let a, p = v;
      try {
        a = p(this._css, this._opts);
      } catch (g) {
        this.error = g;
      }
      if (this.error) throw this.error;
      return this._root = a, a;
    }
    get [Symbol.toStringTag]() {
      return "NoWorkResult";
    }
    constructor(a, p, g) {
      p = p.toString(), this.stringified = false, this._processor = a, this._css = p, this._opts = g, this._map = void 0;
      let o, e = y;
      this.result = new C(this._processor, o, this._opts), this.result.css = p;
      let i = this;
      Object.defineProperty(this.result, "root", { get() {
        return i.root;
      } });
      let r = new d(e, o, this._opts, p);
      if (r.isMap()) {
        let [t, l] = r.generate();
        t && (this.result.css = t), l && (this.result.map = l);
      } else r.clearAnnotation(), this.result.css = r.css;
    }
    async() {
      return this.error ? Promise.reject(this.error) : Promise.resolve(this.result);
    }
    catch(a) {
      return this.async().catch(a);
    }
    finally(a) {
      return this.async().then(a, a);
    }
    sync() {
      if (this.error) throw this.error;
      return this.result;
    }
    then(a, p) {
      return this.async().then(a, p);
    }
    toString() {
      return this._css;
    }
    warnings() {
      return [];
    }
  }
  return Re = n, n.default = n, Re;
}
var Se, ht;
function It() {
  if (ht) return Se;
  ht = 1;
  let d = ke(), v = yt(), C = kt(), y = F();
  class n {
    constructor(a = []) {
      this.version = "8.5.3", this.plugins = this.normalize(a);
    }
    normalize(a) {
      let p = [];
      for (let g of a) if (g.postcss === true ? g = g() : g.postcss && (g = g.postcss), typeof g == "object" && Array.isArray(g.plugins)) p = p.concat(g.plugins);
      else if (typeof g == "object" && g.postcssPlugin) p.push(g);
      else if (typeof g == "function") p.push(g);
      else if (!(typeof g == "object" && (g.parse || g.stringify))) throw new Error(g + " is not a PostCSS plugin");
      return p;
    }
    process(a, p = {}) {
      return !this.plugins.length && !p.parser && !p.stringifier && !p.syntax ? new C(this, a, p) : new v(this, a, p);
    }
    use(a) {
      return this.plugins = this.plugins.concat(this.normalize([a])), this;
    }
  }
  return Se = n, n.default = n, y.registerProcessor(n), d.registerProcessor(n), Se;
}
var Oe, ft;
function Lt() {
  if (ft) return Oe;
  ft = 1;
  var d = {};
  let v = Me(), C = V(), y = B(), n = Ee(), f = H(), a = ke(), p = Et(), g = Q(), o = yt(), e = dt(), i = J(), r = Le(), t = It(), l = Ue(), s = F(), u = Ie(), x = G(), b = wt();
  function m(...h) {
    return h.length === 1 && Array.isArray(h[0]) && (h = h[0]), new t(h);
  }
  return m.plugin = function(c, w) {
    let R = false;
    function E(...A) {
      console && console.warn && !R && (R = true, console.warn(c + `: postcss.plugin was deprecated. Migration guide:
https://evilmartians.com/chronicles/postcss-8-plugin-migration`), d.LANG && d.LANG.startsWith("cn") && console.warn(c + `: \u91CC\u9762 postcss.plugin \u88AB\u5F03\u7528. \u8FC1\u79FB\u6307\u5357:
https://www.w3ctech.com/topic/2226`));
      let L = w(...A);
      return L.postcssPlugin = c, L.postcssVersion = new t().version, L;
    }
    let P;
    return Object.defineProperty(E, "postcss", { get() {
      return P || (P = E()), P;
    } }), E.process = function(A, L, k) {
      return m([E(k)]).process(A, L);
    }, E;
  }, m.stringify = x, m.parse = r, m.fromJSON = p, m.list = e, m.comment = (h) => new C(h), m.atRule = (h) => new v(h), m.decl = (h) => new f(h), m.rule = (h) => new u(h), m.root = (h) => new s(h), m.document = (h) => new a(h), m.CssSyntaxError = n, m.Declaration = f, m.Container = y, m.Processor = t, m.Document = a, m.Comment = C, m.Warning = b, m.AtRule = v, m.Result = l, m.Input = g, m.Rule = u, m.Root = s, m.Node = i, o.registerPostcss(m), Oe = m, m.default = m, Oe;
}
var Ut = Lt();
const M = Rt(Ut);
M.stringify;
M.fromJSON;
M.plugin;
M.parse;
M.list;
M.document;
M.comment;
M.atRule;
M.rule;
M.decl;
M.root;
M.CssSyntaxError;
M.Declaration;
M.Container;
M.Processor;
M.Document;
M.Comment;
M.Warning;
M.AtRule;
M.Result;
M.Input;
M.Rule;
M.Root;
M.Node;
export {
  Ot as a,
  M as p,
  Lt as r
};

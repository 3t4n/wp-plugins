var __defProp = Object.defineProperty;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __publicField = (obj, key, value) => __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
import { _ as k } from "./preload-helper-DH9yCMdR.js";
let ue, oe, _e;
let __tla = (async () => {
  let _, C, j, V, W, M, T, z, L, B, q, G, X, H, K, D, s;
  oe = "" + new URL("lightningcss_node-Bg4WeB9r.wasm", import.meta.url).href;
  _ = 0;
  C = 1;
  j = 3;
  V = 6;
  W = 7;
  M = 9;
  T = 10;
  z = 11;
  L = 13;
  B = 17;
  q = 22;
  G = 1;
  X = 2;
  H = 4;
  K = 1024;
  D = [
    Int8Array,
    Uint8Array,
    Uint8ClampedArray,
    Int16Array,
    Uint16Array,
    Int32Array,
    Uint32Array,
    Float32Array,
    Float64Array,
    BigInt64Array,
    BigUint64Array
  ];
  s = [];
  class $ {
    constructor(e) {
      __publicField(this, "scopes", []);
      __publicField(this, "referenceId", 1);
      __publicField(this, "references", /* @__PURE__ */ new Map());
      __publicField(this, "deferred", [
        null
      ]);
      __publicField(this, "wrappedObjects", /* @__PURE__ */ new WeakMap());
      __publicField(this, "externalObjects", /* @__PURE__ */ new WeakMap());
      __publicField(this, "buffers", /* @__PURE__ */ new Map());
      __publicField(this, "instanceData", 0);
      __publicField(this, "pendingException", null);
      __publicField(this, "_u32", new Uint32Array());
      __publicField(this, "_i32", new Int32Array());
      __publicField(this, "_u16", new Uint16Array());
      __publicField(this, "_u64", new BigUint64Array());
      __publicField(this, "_i64", new BigInt64Array());
      __publicField(this, "_f64", new Float64Array());
      __publicField(this, "_buf", new Uint8Array());
      this.id = s.length, s.push(this), this.instance = e, this.table = e.exports.__indirect_function_table, this.exports = {}, this.pushScope();
      let t = this.scopes[this.scopes.length - 1], n = t.length;
      t.push(this.exports);
      try {
        this.instance.exports.napi_register_module_v1 && this.instance.exports.napi_register_module_v1(this.id, n), this.instance.exports.napi_register_wasm_v1 && this.instance.exports.napi_register_wasm_v1(this.id, n);
      } finally {
        if (this.popScope(), this.pendingException) {
          let i = this.pendingException;
          throw this.pendingException = null, i;
        }
      }
    }
    destroy() {
      s[this.id] = void 0;
    }
    getString(e, t = te(this.memory, e)) {
      return U.decode(this.memory.subarray(e, Math.max(0, e + t)));
    }
    pushScope() {
      let e = this.scopes.length;
      return this.scopes.push(e ? [
        ...this.scopes[e - 1]
      ] : [
        void 0,
        null,
        globalThis,
        true,
        false
      ]), e;
    }
    popScope() {
      this.scopes.pop();
      for (let [e, t] of this.buffers) e.byteLength && t.byteLength && e.set(t);
      this.buffers.clear();
    }
    get(e) {
      return this.scopes[this.scopes.length - 1][e];
    }
    set(e, t) {
      this.scopes[this.scopes.length - 1][e] = t;
    }
    pushValue(e, t = this.scopes.length - 1) {
      let n = this.scopes[t], i = n.length;
      return n.push(e), i;
    }
    createValue(e, t, n) {
      if (typeof e == "boolean") return this.setPointer(t, e ? 3 : 4), _;
      if (typeof e > "u") return this.setPointer(t, 0), _;
      if (e === null) return this.setPointer(t, 1), _;
      if (e === globalThis) return this.setPointer(t, 2), _;
      let i = this.pushValue(e, n);
      return this.setPointer(t, i), _;
    }
    setPointer(e, t) {
      return this.u32[e >> 2] = t, _;
    }
    get u32() {
      return this._u32.byteLength === 0 && (this._u32 = new Uint32Array(this.instance.exports.memory.buffer)), this._u32;
    }
    get i32() {
      return this._i32.byteLength === 0 && (this._i32 = new Int32Array(this.instance.exports.memory.buffer)), this._i32;
    }
    get u16() {
      return this._u16.byteLength === 0 && (this._u16 = new Uint16Array(this.instance.exports.memory.buffer)), this._u16;
    }
    get u64() {
      return this._u64.byteLength === 0 && (this._u64 = new BigUint64Array(this.instance.exports.memory.buffer)), this._u64;
    }
    get i64() {
      return this._i64.byteLength === 0 && (this._i64 = new BigInt64Array(this.instance.exports.memory.buffer)), this._i64;
    }
    get f64() {
      return this._f64.byteLength === 0 && (this._f64 = new Float64Array(this.instance.exports.memory.buffer)), this._f64;
    }
    get memory() {
      return this._buf.byteLength === 0 && (this._buf = new Uint8Array(this.instance.exports.memory.buffer)), this._buf;
    }
    getBufferInfo(e, t) {
      if (this.buffers.has(e)) {
        let i = this.buffers.get(e);
        return this.setPointer(t, i.byteOffset), i.byteLength;
      }
      if (e instanceof ArrayBuffer) {
        let i = this.copyBuffer(new Uint8Array(e));
        return this.setPointer(t, i.byteOffset), i.byteLength;
      }
      if (e.buffer === this.instance.exports.memory.buffer) return this.setPointer(t, e.byteOffset), e.byteLength;
      let n = this.copyBuffer(new Uint8Array(e.buffer, e.byteOffset, e.byteLength));
      return this.setPointer(t, n.byteOffset), n.byteLength;
    }
    copyBuffer(e) {
      let t = this.instance.exports.napi_wasm_malloc(e.byteLength), n = this.memory;
      n.set(e, t);
      let i = n.subarray(t, t + e.byteLength), a = (l, o) => {
        this.instance.exports.napi_wasm_free && this.instance.exports.napi_wasm_free(o);
      };
      return h.register(i, new m(this.id, a, 0, t)), this.buffers.set(e, i), i;
    }
    createFunction(e, t) {
      let n = this, i = n.table.get(e);
      return function(...l) {
        let o = n.pushScope();
        try {
          let u = n.scopes[o], c = u.length;
          u.push({
            thisArg: this,
            args: l,
            data: t,
            newTarget: new.target
          });
          let f = i(n.id, c);
          return n.get(f);
        } finally {
          if (n.popScope(), n.pendingException) {
            let u = n.pendingException;
            throw n.pendingException = null, u;
          }
        }
      };
    }
    readPropertyDescriptor(e) {
      let t = this.u32, n = t[e++], i = t[e++], a = t[e++], l = t[e++], o = t[e++], u = t[e++], c = t[e++], f = t[e++], p = n ? this.getString(n) : this.get(i), g = !!(c & G), d = !!(c & X), y = !!(c & H), w = !!(c & K), v = l ? this.createFunction(l, f) : void 0, b = o ? this.createFunction(o, f) : void 0, x = a ? this.createFunction(a, f) : u ? this.get(u) : void 0, P = {
        name: p,
        static: w,
        configurable: y,
        enumerable: d
      };
      return v || b ? (P.get = v, P.set = b) : x && (P.writable = g, P.value = x), P;
    }
  }
  const U = new TextDecoder("utf-8", {
    ignoreBOM: true,
    fatal: true
  }), J = new TextDecoder("latin1"), Q = new TextDecoder("utf-16"), Y = new TextEncoder();
  class m {
    constructor(e, t, n, i) {
      this.env = e, this.finalize = t, this.hint = n, this.data = i;
    }
  }
  const h = new FinalizationRegistry((r) => {
    r.finalize && r.finalize(r.env, r.data, r.hint);
  });
  class R {
  }
  const E = [];
  class Z {
    constructor(e, t, n, i) {
      this.env = e, this.fn = t, this.nativeFn = n, this.context = i, this.id = E.length, E.push(this);
    }
  }
  const A = [
    null
  ];
  class ee {
    constructor(e, t, n, i) {
      this.env = e, this.execute = t, this.complete = n, this.data = i, this.id = A.length, A.push(this);
    }
  }
  const N = {
    napi_open_handle_scope(r, e) {
      let t = s[r], n = t.pushScope();
      return t.setPointer(e, n);
    },
    napi_close_handle_scope(r, e) {
      let t = s[r];
      return e !== t.scopes.length - 1 ? L : (t.popScope(), _);
    },
    napi_open_escapable_handle_scope(r, e) {
      let t = s[r], n = t.pushScope();
      return t.setPointer(e, n);
    },
    napi_close_escapable_handle_scope(r, e) {
      let t = s[r];
      return e !== t.scopes.length - 1 ? L : (t.popScope(), _);
    },
    napi_escape_handle(r, e, t, n) {
      let i = s[r], a = i.get(t);
      return i.createValue(a, n, e - 1);
    },
    napi_create_object(r, e) {
      return s[r].createValue({}, e);
    },
    napi_set_property(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.get(t), o = i.get(n);
      return a[l] = o, _;
    },
    napi_get_property(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.get(t);
      return i.createValue(a[l], n);
    },
    napi_delete_property(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.get(t), o = false;
      try {
        o = delete a[l];
      } catch {
      }
      return n && (i.memory[n] = o ? 1 : 0), _;
    },
    napi_has_property(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.get(t);
      return i.memory[n] = l in a ? 1 : 0, _;
    },
    napi_has_own_property(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.get(t);
      return i.memory[n] = a.hasOwnProperty(l) ? 1 : 0, _;
    },
    napi_set_named_property(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.get(n), o = i.getString(t);
      return a[o] = l, _;
    },
    napi_get_named_property(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.getString(t);
      return i.createValue(a[l], n);
    },
    napi_has_named_property(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.getString(t);
      return i.memory[n] = l in a ? 1 : 0, _;
    },
    napi_get_property_names(r, e, t) {
      let n = s[r], i = n.get(e), a = Object.keys(i);
      return n.createValue(a, t);
    },
    napi_get_all_property_names(r, e, t, n, i, a) {
      throw new Error("not implemented");
    },
    napi_define_properties(r, e, t, n) {
      let i = s[r], a = i.get(e), l = n >> 2;
      for (let o = 0; o < t; o++) {
        let u = i.readPropertyDescriptor(l);
        Object.defineProperty(a, u.name, u), l += 8;
      }
      return _;
    },
    napi_object_freeze(r, e) {
      let n = s[r].get(e);
      return Object.freeze(n), _;
    },
    napi_object_seal(r, e) {
      let n = s[r].get(e);
      return Object.seal(n), _;
    },
    napi_get_prototype(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.createValue(Object.getPrototypeOf(i), t);
    },
    napi_define_class(r, e, t, n, i, a, l, o) {
      let u = s[r], c = u.createFunction(n, i);
      Object.defineProperty(c, "name", {
        value: u.getString(e, t),
        configurable: true
      });
      let f = l >> 2;
      for (let p = 0; p < a; p++) {
        let g = u.readPropertyDescriptor(f);
        g.static ? Object.defineProperty(c, g.name, g) : Object.defineProperty(c.prototype, g.name, g), f += 8;
      }
      return u.createValue(c, o);
    },
    napi_create_reference(r, e, t, n) {
      let i = s[r], a = i.referenceId++;
      return i.references.set(a, {
        value: i.get(e),
        refcount: t
      }), i.setPointer(n, a);
    },
    napi_delete_reference(r, e) {
      return s[r].references.delete(e), _;
    },
    napi_get_reference_value(r, e, t) {
      let n = s[r], i = n.references.get(e);
      return n.createValue(i.value, t);
    },
    napi_reference_ref(r, e, t) {
      let n = s[r], i = n.references.get(e);
      return i.refcount++, n.setPointer(t, i.refcount);
    },
    napi_reference_unref(r, e, t) {
      let n = s[r], i = n.references.get(e);
      return i.refcount === 0 ? M : (i.refcount--, n.setPointer(t, i.refcount));
    },
    napi_add_env_cleanup_hook() {
      return _;
    },
    napi_remove_env_cleanup_hook() {
      return _;
    },
    napi_add_async_cleanup_hook() {
      return _;
    },
    napi_remove_async_cleanup_hook() {
      return _;
    },
    napi_set_instance_data(r, e, t, n) {
      let i = s[r];
      return i.instanceData = e, _;
    },
    napi_get_instance_data(r, e) {
      let t = s[r];
      return t.setPointer(e, t.instanceData);
    },
    napi_get_boolean(r, e, t) {
      return s[r].setPointer(t, e ? 3 : 4);
    },
    napi_get_value_bool(r, e, t) {
      let n = s[r], i = n.get(e);
      return typeof i != "boolean" ? W : (n.memory[t] = i ? 1 : 0, _);
    },
    napi_create_int32(r, e, t) {
      return s[r].createValue(e, t);
    },
    napi_get_value_int32(r, e, t) {
      let n = s[r], i = n.get(e);
      return typeof i != "number" ? V : (n.i32[t >> 2] = i, _);
    },
    napi_create_uint32(r, e, t) {
      return s[r].createValue(e, t);
    },
    napi_get_value_uint32(r, e, t) {
      let n = s[r], i = n.get(e);
      return typeof i != "number" ? V : n.setPointer(t, i);
    },
    napi_create_int64(r, e, t) {
      return s[r].createValue(Number(e), t);
    },
    napi_get_value_int64(r, e, t) {
      let n = s[r], i = n.get(e);
      return typeof i != "number" ? V : (n.i64[t >> 3] = i, _);
    },
    napi_create_double(r, e, t) {
      return s[r].createValue(e, t);
    },
    napi_get_value_double(r, e, t) {
      let n = s[r], i = n.get(e);
      return typeof i != "number" ? V : (n.f64[t >> 3] = i, _);
    },
    napi_create_bigint_int64(r, e, t) {
      return s[r].createValue(BigInt.asIntN(64, e), t);
    },
    napi_get_value_bigint_int64(r, e, t, n) {
      let i = s[r], a = i.get(e);
      return typeof a != "bigint" ? B : (i.i64[t >> 3] = a, n && (i.memory[n] = BigInt.asIntN(64, a) === a ? 1 : 0), _);
    },
    napi_create_bigint_uint64(r, e, t) {
      return s[r].createValue(BigInt.asUintN(64, e), t);
    },
    napi_get_value_bigint_uint64(r, e, t, n) {
      let i = s[r], a = i.get(e);
      return typeof a != "bigint" ? B : (i.u64[t >> 3] = a, n && (i.memory[n] = BigInt.asUintN(64, a) === a ? 1 : 0), _);
    },
    napi_create_bigint_words(r, e, t, n, i) {
      let a = s[r], l = a.u64, o = n >> 3, u = 0n, c = 0n;
      for (let f = 0; f < t; f++) {
        let p = l[o++];
        u += p << c, c += 64n;
      }
      return u *= BigInt((-1) ** e), a.createValue(u, i);
    },
    napi_get_value_bigint_words(r, e, t, n, i) {
      let a = s[r], l = a.get(e);
      if (typeof l != "bigint") return B;
      let o = a.u32[n >> 2];
      t && (a.i32[t] = l < 0n ? 1 : 0);
      let u = 0;
      if (i) {
        let c = (1n << 64n) - 1n, f = a.u64, p = i >> 3;
        for (l < 0n && (l = -l); u < o && l !== 0n; u++) f[p++] = l & c, l >>= 64n;
      }
      for (; l > 0n; ) u++, l >>= 64n;
      return a.setPointer(n, u);
    },
    napi_get_null(r, e) {
      return s[r].setPointer(e, 1);
    },
    napi_create_array(r, e) {
      return s[r].createValue([], e);
    },
    napi_create_array_with_length(r, e, t) {
      return s[r].createValue(new Array(e), t);
    },
    napi_set_element(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.get(n);
      return a[t] = l, _;
    },
    napi_get_element(r, e, t, n) {
      let i = s[r], l = i.get(e)[t];
      return i.createValue(l, n);
    },
    napi_has_element(r, e, t, n) {
      let i = s[r], a = i.get(e);
      return i.memory[n] = a.hasOwnProperty(t) ? 1 : 0, _;
    },
    napi_delete_element(r, e, t, n) {
      let i = s[r], a = i.get(e), l = false;
      try {
        l = delete a[t];
      } catch {
      }
      return n && (i.memory[n] = l ? 1 : 0), _;
    },
    napi_get_array_length(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.setPointer(t, i.length);
    },
    napi_get_undefined(r, e) {
      return s[r].setPointer(e, 0);
    },
    napi_create_function(r, e, t, n, i, a) {
      let l = s[r], o = l.createFunction(n, i);
      return Object.defineProperty(o, "name", {
        value: l.getString(e, t),
        configurable: true
      }), l.createValue(o, a);
    },
    napi_call_function(r, e, t, n, i, a) {
      let l = s[r], o = l.get(e), u = l.get(t), c = new Array(n), f = l.u32;
      for (let p = 0; p < n; p++) c[p] = l.get(f[i >> 2]), i += 4;
      try {
        let p = u.apply(o, c);
        return l.createValue(p, a);
      } catch (p) {
        return l.pendingException = p, T;
      }
    },
    napi_new_instance(r, e, t, n, i) {
      let a = s[r], l = a.get(e), o = new Array(t), u = a.u32;
      for (let c = 0; c < t; c++) o[c] = a.get(u[n >> 2]), n += 4;
      try {
        let c = new l(...o);
        return a.createValue(c, i);
      } catch (c) {
        return a.pendingException = c, T;
      }
    },
    napi_get_cb_info(r, e, t, n, i, a) {
      let l = s[r], o = l.get(e);
      l.setPointer(t, o.args.length);
      for (let u = 0; u < o.args.length; u++) l.createValue(o.args[u], n), n += 4;
      return l.createValue(o.thisArg, i), l.setPointer(a, o.data), _;
    },
    napi_get_new_target(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.createValue(i.newTarget, t);
    },
    napi_create_threadsafe_function(r, e, t, n, i, a, l, o, u, c, f) {
      let p = s[r], g = e ? p.get(e) : void 0, d = c ? p.table.get(c) : void 0, y = new Z(p, g, d, u);
      if (o) {
        let w = p.table.get(o);
        h.register(y, new m(r, w, 0, y.id));
      }
      return p.setPointer(f, y.id), _;
    },
    napi_ref_threadsafe_function() {
      return _;
    },
    napi_unref_threadsafe_function() {
      return _;
    },
    napi_acquire_threadsafe_function() {
      return _;
    },
    napi_release_threadsafe_function(r, e) {
      return E[r] = void 0, _;
    },
    napi_call_threadsafe_function(r, e, t) {
      let n = E[r];
      n.env.pushScope();
      try {
        if (n.nativeFn) {
          let i = n.fn ? n.env.pushValue(n.fn) : 0;
          n.nativeFn(n.env.id, i, n.context, e);
        } else n.fn && n.fn();
      } finally {
        n.env.popScope();
      }
    },
    napi_get_threadsafe_function_context(r, e) {
      let t = E[r];
      return t.env.setPointer(e, t.context), _;
    },
    napi_create_async_work(r, e, t, n, i, a, l) {
      let o = s[r], u = n ? o.table.get(n) : void 0, c = i ? o.table.get(i) : void 0, f = new ee(o, u, c, a);
      return o.setPointer(l, f.id), _;
    },
    napi_delete_async_work(r, e) {
      return A[e] = void 0, _;
    },
    napi_queue_async_work(r, e) {
      return queueMicrotask(() => {
        let t = A[e];
        t && (t.execute(r, t.data), t.complete(r, _, t.data));
      }), _;
    },
    napi_cancel_async_work() {
      let r = A[work];
      return r.complete(env, z, r.data), A[work] = void 0, _;
    },
    napi_throw(r, e) {
      let t = s[r];
      return t.pendingException = t.get(e), _;
    },
    napi_throw_error(r, e, t) {
      let n = s[r], i = new Error(n.getString(t));
      return i.code = e, n.pendingException = i, _;
    },
    napi_throw_type_error(r, e, t) {
      let n = s[r], i = new TypeError(n.getString(t));
      return i.code = e, n.pendingException = i, _;
    },
    napi_throw_range_error(r, e, t) {
      let n = s[r], i = new RangeError(n.getString(t));
      return i.code = e, n.pendingException = i, _;
    },
    napi_create_error(r, e, t, n) {
      let i = s[r], a = new Error(i.get(t));
      return a.code = i.get(e), i.createValue(a, n);
    },
    napi_create_type_error(r, e, t, n) {
      let i = s[r], a = new TypeError(i.get(t));
      return a.code = i.get(e), i.createValue(a, n);
    },
    napi_create_range_error(r, e, t, n) {
      let i = s[r], a = new RangeError(i.get(t));
      return a.code = i.get(e), i.createValue(a, n);
    },
    napi_get_and_clear_last_exception(r, e) {
      let t = s[r], n = t.pendingException;
      return t.pendingException = null, t.createValue(n, e);
    },
    napi_is_exception_pending(r, e) {
      let t = s[r];
      return t.memory[e] = t.pendingException ? 1 : 0, _;
    },
    napi_fatal_exception(r, e) {
      throw new Error("not implemented");
    },
    napi_fatal_error(r, e, t, n) {
      throw new Error("not implemented");
    },
    napi_get_global(r, e) {
      return s[r].setPointer(e, 2);
    },
    napi_create_buffer(r, e, t, n) {
      let i = s[r], a = i.instance.exports.napi_wasm_malloc(e);
      t && i.setPointer(t, a);
      let l = typeof globalThis.Buffer < "u" ? globalThis.Buffer.from(i.memory.buffer, a, e) : i.memory.subarray(a, a + e), o = (u, c) => {
        i.instance.exports.napi_wasm_free && i.instance.exports.napi_wasm_free(c);
      };
      return h.register(l, new m(r, o, 0, a)), i.createValue(l, n);
    },
    napi_create_buffer_copy(r, e, t, n, i) {
      let a = s[r], l = a.instance.exports.napi_wasm_malloc(e);
      a.memory.set(a.memory.subarray(t, t + e), l), n && a.setPointer(n, l);
      let o = typeof globalThis.Buffer < "u" ? globalThis.Buffer.from(a.memory.buffer, l, e) : a.memory.subarray(l, l + e), u = (c, f) => {
        a.instance.exports.napi_wasm_free && a.instance.exports.napi_wasm_free(f);
      };
      return h.register(buf, new m(r, u, 0, l)), a.createValue(o, i);
    },
    napi_create_external_buffer(r, e, t, n, i, a) {
      let l = s[r], o = typeof globalThis.Buffer < "u" ? globalThis.Buffer.from(l.memory.buffer, t, e) : l.memory.subarray(t, t + e);
      if (n) {
        let u = l.table.get(n);
        h.register(o, new m(r, u, i, t));
      }
      return l.createValue(o, a);
    },
    napi_get_buffer_info(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.getBufferInfo(a, t);
      return i.setPointer(n, l);
    },
    napi_create_arraybuffer(r, e, t, n) {
      let i = s[r], a = new ArrayBuffer(e);
      return t && i.getBufferInfo(a, t), i.createValue(a, n);
    },
    napi_create_external_arraybuffer(r, e, t, n, i, a) {
      return q;
    },
    napi_get_arraybuffer_info(r, e, t, n) {
      let i = s[r], a = i.getBufferInfo(i.get(e), t);
      return i.setPointer(n, a);
    },
    napi_detach_arraybuffer(r, e) {
      let n = s[r].get(e);
      return typeof structuredClone == "function" && structuredClone(n, {
        transfer: [
          n
        ]
      }), _;
    },
    napi_is_detached_arraybuffer(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.memory[t] = i.byteLength === 0 ? 1 : 0, _;
    },
    napi_create_typedarray(r, e, t, n, i, a) {
      let l = s[r], o = D[e], u = l.get(n), c = new o(u, i, t);
      return l.createValue(c, a);
    },
    napi_create_dataview(r, e, t, n, i) {
      let a = s[r], l = a.get(t), o = new DataView(l, n, e);
      return a.createValue(o, i);
    },
    napi_get_typedarray_info(r, e, t, n, i, a, l) {
      let o = s[r], u = o.get(e);
      return o.setPointer(t, D.findIndex((c) => u instanceof c)), o.setPointer(n, u.length), o.getBufferInfo(u, i), o.createValue(u.buffer, a), o.setPointer(l, u.byteOffset);
    },
    napi_get_dataview_info(r, e, t, n, i, a) {
      let l = s[r], o = l.get(e);
      return l.setPointer(t, o.byteLength), l.getBufferInfo(o, n), l.createValue(o.buffer, i), l.setPointer(a, o.byteOffset);
    },
    napi_create_string_utf8(r, e, t, n) {
      let i = s[r], a = U.decode(i.memory.subarray(e, e + t));
      return i.createValue(a, n);
    },
    napi_get_value_string_utf8(r, e, t, n, i) {
      let a = s[r], l = a.get(e);
      if (typeof l != "string") return j;
      if (t == 0) return a.setPointer(i, ne(l));
      let o = Y.encodeInto(l, a.memory.subarray(t, t + n - 1));
      return a.memory[t + o.written] = 0, a.setPointer(i, o.written);
    },
    napi_create_string_latin1(r, e, t, n) {
      let i = s[r], a = J.decode(i.memory.subarray(e, e + t));
      return i.createValue(a, n);
    },
    napi_get_value_string_latin1(r, e, t, n, i) {
      let a = s[r], l = a.get(e);
      if (typeof l != "string") return j;
      if (t == 0) return a.setPointer(i, l.length);
      let o = a.memory, u = Math.min(l.length, n - 1);
      for (let c = 0; c < u; c++) {
        let f = l.charCodeAt(c);
        o[t++] = f;
      }
      return o[t] = 0, a.setPointer(i, u);
    },
    napi_create_string_utf16(r, e, t, n) {
      let i = s[r], a = Q.decode(i.memory.subarray(e, e + t * 2));
      return i.createValue(a, n);
    },
    napi_get_value_string_utf16(r, e, t, n, i) {
      let a = s[r], l = a.get(e);
      if (typeof l != "string") return j;
      if (t == 0) return a.setPointer(i, l.length);
      let o = a.u16, u = t >> 1, c = Math.min(l.length, n - 1);
      for (let f = 0; f < c; f++) {
        let p = l.charCodeAt(f);
        o[u++] = p;
      }
      return o[u] = 0, a.setPointer(i, c);
    },
    napi_create_date(r, e, t) {
      return s[r].createValue(new Date(e), t);
    },
    napi_get_date_value(r, e, t) {
      let n = s[r], i = n.get(e);
      n.f64[t >> 3] = i.valueOf();
    },
    napi_create_symbol(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.createValue(Symbol(i), t);
    },
    napi_coerce_to_bool(r, e, t) {
      let n = s[r];
      return n.createValue(!!n.get(e), t);
    },
    napi_coerce_to_number(r, e, t) {
      let n = s[r];
      return n.createValue(Number(n.get(e)), t);
    },
    napi_coerce_to_object(r, e, t) {
      let n = s[r];
      return n.createValue(Object(n.get(e)), t);
    },
    napi_coerce_to_string(r, e, t) {
      let n = s[r];
      return n.createValue(String(n.get(e)), t);
    },
    napi_typeof(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.setPointer(t, (() => {
        switch (typeof i) {
          case "undefined":
            return 0;
          case "boolean":
            return 2;
          case "number":
            return 3;
          case "string":
            return 4;
          case "symbol":
            return 5;
          case "object":
            return i === null ? 1 : i instanceof R ? 8 : 6;
          case "function":
            return 7;
          case "bigint":
            return 9;
        }
      })());
    },
    napi_instanceof(r, e, t, n) {
      let i = s[r], a = i.get(e), l = i.get(t);
      return i.memory[n] = a instanceof l ? 1 : 0, _;
    },
    napi_is_array(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.memory[t] = Array.isArray(i) ? 1 : 0, _;
    },
    napi_is_buffer(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.memory[t] = (typeof globalThis.Buffer < "u" ? globalThis.Buffer.isBuffer(i) : i instanceof Uint8Array) ? 1 : 0, _;
    },
    napi_is_date(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.memory[t] = i instanceof Date ? 1 : 0, _;
    },
    napi_is_error(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.memory[t] = i instanceof Error ? 1 : 0, _;
    },
    napi_is_typedarray(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.memory[t] = ArrayBuffer.isView(i) && !(i instanceof DataView) ? 1 : 0, _;
    },
    napi_is_dataview(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.memory[t] = i instanceof DataView ? 1 : 0, _;
    },
    napi_strict_equals(r, e, t, n) {
      let i = s[r];
      return i.memory[n] = i.get(e) === i.get(t) ? 1 : 0, _;
    },
    napi_wrap(r, e, t, n, i, a) {
      let l = s[r], o = l.get(e);
      if (l.wrappedObjects.set(o, t), n) {
        let u = l.table.get(n);
        h.register(o, new m(r, u, i, t));
      }
      return a ? N.napi_create_reference(r, e, 1, a) : _;
    },
    napi_unwrap(r, e, t) {
      let n = s[r], i = n.get(e), a = n.wrappedObjects.get(i);
      return n.setPointer(t, a), _;
    },
    napi_remove_wrap(r, e, t) {
      let n = s[r], i = n.get(e), a = n.wrappedObjects.get(i);
      return h.unregister(i), n.wrappedObjects.delete(i), n.setPointer(t, a);
    },
    napi_type_tag_object(r, e, t) {
      throw new Error("not implemented");
    },
    napi_check_object_type_tag(r, e, t) {
      throw new Error("not implemented");
    },
    napi_add_finalizer(r, e, t, n, i, a) {
      let l = s[r], o = l.get(e), u = l.table.get(n);
      return h.register(o, new m(r, u, i, t)), a ? N.napi_create_reference(r, e, 1, a) : _;
    },
    napi_create_promise(r, e, t) {
      let n = s[r], i = new Promise((a, l) => {
        let o = n.deferred.length;
        n.deferred.push({
          resolve: a,
          reject: l
        }), n.setPointer(e, o);
      });
      return n.createValue(i, t);
    },
    napi_resolve_deferred(r, e, t) {
      let n = s[r], { resolve: i } = n.deferred[e], a = n.get(t);
      return i(a), n.deferred[e] = void 0, _;
    },
    napi_reject_deferred(r, e, t) {
      let n = s[r], { reject: i } = n.deferred[e], a = n.get(t);
      return i(a), n.deferred[e] = void 0, _;
    },
    napi_is_promise(r, e, t) {
      let n = s[r], i = n.get(e);
      return n.memory[t] = i instanceof Promise ? 1 : 0, _;
    },
    napi_run_script(r, e, t) {
      let n = s[r], i = n.get(e), a = (0, eval)(i);
      return n.createValue(a, t);
    },
    napi_create_external(r, e, t, n, i) {
      let a = s[r], l = new R();
      if (a.externalObjects.set(l, e), t) {
        let o = a.table.get(t);
        h.register(l, new m(r, o, n, e));
      }
      return a.createValue(l, i);
    },
    napi_get_value_external(r, e, t) {
      let n = s[r], i = n.get(e), a = n.externalObjects.get(i);
      return a ? n.setPointer(t, a) : C;
    },
    napi_adjust_external_memory() {
      return _;
    }
  };
  function te(r, e) {
    let t = 0;
    for (; r[e] !== 0; ) t++, e++;
    return t;
  }
  function ne(r) {
    let e = 0;
    for (let t = 0; t < r.length; t++) {
      let n = r.charCodeAt(t);
      if (n >= 55296 && n <= 56319 && t < r.length - 1) {
        let i = r.charCodeAt(++t);
        (i & 64512) === 56320 ? n = ((n & 1023) << 10) + (i & 1023) + 65536 : t--;
      }
      (n & 4294967168) === 0 ? e++ : (n & 4294965248) === 0 ? e += 2 : (n & 4294901760) === 0 ? e += 3 : (n & 4292870144) === 0 && (e += 4);
    }
    return e;
  }
  let F;
  function re(r, e, t) {
    F(r, e, t);
  }
  const O = {
    None: 0,
    Unwinding: 1,
    Rewinding: 2
  };
  function ie(r) {
    let { instance: e, exports: t } = r, { asyncify_get_state: n, asyncify_start_unwind: i, asyncify_stop_unwind: a, asyncify_start_rewind: l, asyncify_stop_rewind: o } = e.exports, u = e.exports.napi_wasm_malloc(4104), c = u + 8, f = u + 8 + 4096;
    new Int32Array(r.memory.buffer, u).set([
      c,
      f
    ]);
    function p() {
      if (n() !== O.None) throw new Error(`Invalid async state ${n()}, expected 0.`);
    }
    let g, d, y;
    return F = (w, v, b) => {
      if (n() === O.Rewinding) {
        o(), d != null && r.createValue(d, v), y != null && r.createValue(y, b), g = d = y = null;
        return;
      }
      p(), g = r.get(w), i(u);
    }, async function(v) {
      p();
      let b = t.bundle(v);
      for (; n() === O.Unwinding; ) {
        a();
        try {
          d = await g;
        } catch (x) {
          y = x;
        }
        p(), l(u), b = t.bundle(v);
      }
      return p(), b;
    };
  }
  let S, I;
  ue = async function(r) {
    if (S) return;
    if (I) {
      await I;
      return;
    }
    r = r ?? new URL("" + new URL("lightningcss_node-Bg4WeB9r.wasm", import.meta.url).href, import.meta.url), (typeof r == "string" || typeof Request == "function" && r instanceof Request || typeof URL == "function" && r instanceof URL) && (r = le(r));
    let e;
    I = r.then((t) => ae(t, {
      env: {
        ...N,
        await_promise_sync: re,
        __getrandom_custom: (n, i) => {
          let a = e.memory.subarray(n, n + i);
          crypto.getRandomValues(a);
        }
      }
    })).then(({ instance: t }) => {
      t.exports.register_module(), e = new $(t), ie(e), S = e.exports;
    }), await I;
  };
  _e = function(r) {
    return S.transform(r);
  };
  async function ae(r, e) {
    if (typeof Response == "function" && r instanceof Response) {
      if (typeof WebAssembly.instantiateStreaming == "function") try {
        return await WebAssembly.instantiateStreaming(r, e);
      } catch (n) {
        if (r.headers.get("Content-Type") != "application/wasm") console.warn("`WebAssembly.instantiateStreaming` failed because your server does not serve wasm with `application/wasm` MIME type. Falling back to `WebAssembly.instantiate` which is slower. Original error:\n", n);
        else throw n;
      }
      const t = await r.arrayBuffer();
      return await WebAssembly.instantiate(t, e);
    } else {
      const t = await WebAssembly.instantiate(r, e);
      return t instanceof WebAssembly.Instance ? {
        instance: t,
        module: r
      } : t;
    }
  }
  async function le(r) {
    try {
      return (await k(() => import("./index-Dqc2aLRA.js").then((t) => t.i), [], import.meta.url)).readFileSync(r);
    } catch {
      return fetch(r);
    }
  }
})();
export {
  __tla,
  ue as i,
  oe as l,
  _e as t
};

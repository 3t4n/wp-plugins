var __defProp = Object.defineProperty;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __publicField = (obj, key, value) => __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
var _a2, _b2;
import { B as Hu } from "./index-CgqXENQe.js";
import { p as cr } from "./index-BAMY2Nnw.js";
import { i as Vu } from "./module-oN1JnOJ9.js";
var Ku = Object.create, Pn = Object.defineProperty, Qu = Object.getOwnPropertyDescriptor, Ju = Object.getOwnPropertyNames, Xu = Object.getPrototypeOf, Zu = Object.prototype.hasOwnProperty, ec = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), tc = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Ju(t)) !Zu.call(e, o) && o !== r && Pn(e, o, { get: () => t[o], enumerable: !(n = Qu(t, o)) || n.enumerable });
  return e;
}, rc = (e, t, r) => (r = e != null ? Ku(Xu(e)) : {}, tc(!e || !e.__esModule ? Pn(r, "default", { value: e, enumerable: true }) : r, e)), oc = ec((e, t) => {
  (function(r, n) {
    typeof e == "object" && typeof t < "u" ? t.exports = function(o, s, u, c, i) {
      for (s = s.split ? s.split(".") : s, c = 0; c < s.length; c++) o = o ? o[s[c]] : i;
      return o === i ? u : o;
    } : typeof define == "function" && define.amd ? define(function() {
      return function(o, s, u, c, i) {
        for (s = s.split ? s.split(".") : s, c = 0; c < s.length; c++) o = o ? o[s[c]] : i;
        return o === i ? u : o;
      };
    }) : r.dlv = function(o, s, u, c, i) {
      for (s = s.split ? s.split(".") : s, c = 0; c < s.length; c++) o = o ? o[s[c]] : i;
      return o === i ? u : o;
    };
  })(e);
}), fo = rc(oc()), nc = fo.default ?? fo;
const nO = Object.freeze(Object.defineProperty({ __proto__: null, default: nc }, Symbol.toStringTag, { value: "Module" }));
function sc(e) {
  return new Error(`[unenv] ${e} is not implemented yet!`);
}
function R(e) {
  return Object.assign(() => {
    throw sc(e);
  }, { __unenv__: true });
}
function le(e) {
  return class {
    constructor() {
      __publicField(this, "__unenv__", true);
      throw new Error(`[unenv] ${e} is not implemented yet!`);
    }
  };
}
var ic = Object.defineProperty, jn = (e, t) => {
  for (var r in t) ic(e, r, { get: t[r], enumerable: true });
}, kn = {};
jn(kn, { getRandomValues: () => En, randomUUID: () => lc, subtle: () => ac });
var ac = (_a2 = globalThis.crypto) == null ? void 0 : _a2.subtle, lc = () => {
  var _a3;
  return (_a3 = globalThis.crypto) == null ? void 0 : _a3.randomUUID();
}, En = (e) => {
  var _a3;
  return (_a3 = globalThis.crypto) == null ? void 0 : _a3.getRandomValues(e);
}, Tn = {};
jn(Tn, { Certificate: () => cf, Cipher: () => ff, Cipheriv: () => pf, Decipher: () => hf, Decipheriv: () => df, DiffieHellman: () => yf, DiffieHellmanGroup: () => gf, ECDH: () => mf, Hash: () => bf, Hmac: () => vf, KeyObject: () => wf, Sign: () => Of, Verify: () => $f, X509Certificate: () => xf, checkPrime: () => hc, checkPrimeSync: () => dc, constants: () => pc, createCipher: () => yc, createCipheriv: () => bc, createDecipher: () => gc, createDecipheriv: () => vc, createDiffieHellman: () => wc, createDiffieHellmanGroup: () => Oc, createECDH: () => $c, createHash: () => xc, createHmac: () => _c, createPrivateKey: () => Sc, createPublicKey: () => Pc, createSecretKey: () => jc, createSign: () => kc, createVerify: () => Ec, diffieHellman: () => Tc, fips: () => fc, generateKey: () => Wc, generateKeyPair: () => qc, generateKeyPairSync: () => zc, generateKeySync: () => Gc, generatePrime: () => Ac, generatePrimeSync: () => Cc, getCipherInfo: () => Rc, getCiphers: () => Ic, getCurves: () => Dc, getDiffieHellman: () => Mc, getFips: () => nf, getHashes: () => Lc, hash: () => uf, hkdf: () => Fc, hkdfSync: () => Uc, pbkdf2: () => Nc, pbkdf2Sync: () => Bc, privateDecrypt: () => Yc, privateEncrypt: () => Hc, pseudoRandomBytes: () => mc, publicDecrypt: () => Vc, publicEncrypt: () => Kc, randomBytes: () => cc, randomFill: () => Qc, randomFillSync: () => Jc, randomInt: () => Xc, scrypt: () => Zc, scryptSync: () => ef, secureHeapUsed: () => lf, setEngine: () => rf, setFips: () => sf, sign: () => tf, timingSafeEqual: () => of, verify: () => af, webcrypto: () => uc });
var po = 65536, uc = new Proxy(globalThis.crypto, { get(e, t) {
  return t === "CryptoKey" ? globalThis.CryptoKey : typeof globalThis.crypto[t] == "function" ? globalThis.crypto[t].bind(globalThis.crypto) : globalThis.crypto[t];
} }), cc = (e, t) => {
  let r = Hu.alloc(e, 0, void 0);
  for (let n = 0; n < e; n += po) En(Uint8Array.prototype.slice.call(r, n, n + po));
  if (typeof t == "function") {
    t(null, r);
    return;
  }
  return r;
}, fc = false, pc = {}, hc = R("crypto.checkPrime"), dc = R("crypto.checkPrimeSync"), yc = R("crypto.createCipher"), gc = R("crypto.createDecipher"), mc = R("crypto.pseudoRandomBytes"), bc = R("crypto.createCipheriv"), vc = R("crypto.createDecipheriv"), wc = R("crypto.createDiffieHellman"), Oc = R("crypto.createDiffieHellmanGroup"), $c = R("crypto.createECDH"), xc = R("crypto.createHash"), _c = R("crypto.createHmac"), Sc = R("crypto.createPrivateKey"), Pc = R("crypto.createPublicKey"), jc = R("crypto.createSecretKey"), kc = R("crypto.createSign"), Ec = R("crypto.createVerify"), Tc = R("crypto.diffieHellman"), Ac = R("crypto.generatePrime"), Cc = R("crypto.generatePrimeSync"), Ic = R("crypto.getCiphers"), Rc = R("crypto.getCipherInfo"), Dc = R("crypto.getCurves"), Mc = R("crypto.getDiffieHellman"), Lc = R("crypto.getHashes"), Fc = R("crypto.hkdf"), Uc = R("crypto.hkdfSync"), Nc = R("crypto.pbkdf2"), Bc = R("crypto.pbkdf2Sync"), qc = R("crypto.generateKeyPair"), zc = R("crypto.generateKeyPairSync"), Wc = R("crypto.generateKey"), Gc = R("crypto.generateKeySync"), Yc = R("crypto.privateDecrypt"), Hc = R("crypto.privateEncrypt"), Vc = R("crypto.publicDecrypt"), Kc = R("crypto.publicEncrypt"), Qc = R("crypto.randomFill"), Jc = R("crypto.randomFillSync"), Xc = R("crypto.randomInt"), Zc = R("crypto.scrypt"), ef = R("crypto.scryptSync"), tf = R("crypto.sign"), rf = R("crypto.setEngine"), of = R("crypto.timingSafeEqual"), nf = R("crypto.getFips"), sf = R("crypto.setFips"), af = R("crypto.verify"), lf = R("crypto.secureHeapUsed"), uf = R("crypto.hash"), cf = le("crypto.Certificate"), ff = le("crypto.Cipher"), pf = le("crypto.Cipheriv"), hf = le("crypto.Decipher"), df = le("crypto.Decipheriv"), yf = le("crypto.DiffieHellman"), gf = le("crypto.DiffieHellmanGroup"), mf = le("crypto.ECDH"), bf = le("crypto.Hash"), vf = le("crypto.Hmac"), wf = le("crypto.KeyObject"), Of = le("crypto.Sign"), $f = le("crypto.Verify"), xf = le("crypto.X509Certificate");
({ ...kn, ...Tn });
function _f(e) {
  return new Error(`[unenv] ${e} is not implemented yet!`);
}
function Y(e) {
  return Object.assign(() => {
    throw _f(e);
  }, { __unenv__: true });
}
var Sf = Object.defineProperty, An = (e, t) => {
  for (var r in t) Sf(e, r, { get: t[r], enumerable: true });
}, Cn = {};
An(Cn, { F_OK: () => In, R_OK: () => Rn, W_OK: () => Dn, X_OK: () => Mn, constants: () => Lr });
var In = 0, Rn = 4, Dn = 2, Mn = 1, Lr = /* @__PURE__ */ Object.create({ UV_FS_SYMLINK_DIR: 1, UV_FS_SYMLINK_JUNCTION: 2, O_RDONLY: 0, O_WRONLY: 1, O_RDWR: 2, UV_DIRENT_UNKNOWN: 0, UV_DIRENT_FILE: 1, UV_DIRENT_DIR: 2, UV_DIRENT_LINK: 3, UV_DIRENT_FIFO: 4, UV_DIRENT_SOCKET: 5, UV_DIRENT_CHAR: 6, UV_DIRENT_BLOCK: 7, S_IFMT: 61440, S_IFREG: 32768, S_IFDIR: 16384, S_IFCHR: 8192, S_IFBLK: 24576, S_IFIFO: 4096, S_IFLNK: 40960, S_IFSOCK: 49152, O_CREAT: 64, O_EXCL: 128, UV_FS_O_FILEMAP: 0, O_NOCTTY: 256, O_TRUNC: 512, O_APPEND: 1024, O_DIRECTORY: 65536, O_NOATIME: 262144, O_NOFOLLOW: 131072, O_SYNC: 1052672, O_DSYNC: 4096, O_DIRECT: 16384, O_NONBLOCK: 2048, S_IRWXU: 448, S_IRUSR: 256, S_IWUSR: 128, S_IXUSR: 64, S_IRWXG: 56, S_IRGRP: 32, S_IWGRP: 16, S_IXGRP: 8, S_IRWXO: 7, S_IROTH: 4, S_IWOTH: 2, S_IXOTH: 1, F_OK: 0, R_OK: 4, W_OK: 2, X_OK: 1, UV_FS_COPYFILE_EXCL: 1, COPYFILE_EXCL: 1, UV_FS_COPYFILE_FICLONE: 2, COPYFILE_FICLONE: 2, UV_FS_COPYFILE_FICLONE_FORCE: 4, COPYFILE_FICLONE_FORCE: 4 }), Ln = {};
An(Ln, { access: () => Fn, appendFile: () => cs, chmod: () => ts, chown: () => ns, constants: () => Lr, copyFile: () => Un, cp: () => Nn, default: () => kf, glob: () => jf, lchmod: () => rs, lchown: () => os, link: () => Zn, lstat: () => Jn, lutimes: () => is, mkdir: () => Hn, mkdtemp: () => ls, open: () => Bn, opendir: () => qn, readFile: () => fs, readdir: () => Vn, readlink: () => Kn, realpath: () => as, rename: () => zn, rm: () => Gn, rmdir: () => Yn, stat: () => Xn, statfs: () => ps, symlink: () => Qn, truncate: () => Wn, unlink: () => es, utimes: () => ss, watch: () => Pf, writeFile: () => us });
var Fn = Y("fs.access"), Un = Y("fs.copyFile"), Nn = Y("fs.cp"), Bn = Y("fs.open"), qn = Y("fs.opendir"), zn = Y("fs.rename"), Wn = Y("fs.truncate"), Gn = Y("fs.rm"), Yn = Y("fs.rmdir"), Hn = Y("fs.mkdir"), Vn = Y("fs.readdir"), Kn = Y("fs.readlink"), Qn = Y("fs.symlink"), Jn = Y("fs.lstat"), Xn = Y("fs.stat"), Zn = Y("fs.link"), es = Y("fs.unlink"), ts = Y("fs.chmod"), rs = Y("fs.lchmod"), os = Y("fs.lchown"), ns = Y("fs.chown"), ss = Y("fs.utimes"), is = Y("fs.lutimes"), as = Y("fs.realpath"), ls = Y("fs.mkdtemp"), us = Y("fs.writeFile"), cs = Y("fs.appendFile"), fs = Y("fs.readFile"), Pf = Y("fs.watch"), ps = Y("fs.statfs"), jf = Y("fs.glob"), kf = {}, ho = function() {
};
function jt(e, t = {}) {
  ho.prototype.name = e;
  let r = {};
  return new Proxy(ho, { get(n, o) {
    return o === "caller" ? null : o === "__createMock__" ? jt : o === "__unenv__" ? true : o in t ? t[o] : r[o] = r[o] || jt(`${e}.${o.toString()}`);
  }, apply(n, o, s) {
    return jt(`${e}()`);
  }, construct(n, o, s) {
    return jt(`[${e}]`);
  }, enumerate() {
    return [];
  } });
}
var Ee = jt("mock");
function Ef(e) {
  return new Error(`[unenv] ${e} is not implemented yet!`);
}
function N(e) {
  return Object.assign(() => {
    throw Ef(e);
  }, { __unenv__: true });
}
function X(e) {
  let t = N(e);
  return t.__promisify__ = () => N(e + ".__promisify__"), t.native = t, t;
}
var Tf = Object.defineProperty, hs = (e, t) => {
  for (var r in t) Tf(e, r, { get: t[r], enumerable: true });
}, ds = {};
hs(ds, { Dir: () => ys, Dirent: () => gs, FileReadStream: () => ws, FileWriteStream: () => Os, ReadStream: () => bs, Stats: () => ms, StatsFs: () => $s, WriteStream: () => vs });
var ys = Ee.__createMock__("fs.Dir"), gs = Ee.__createMock__("fs.Dirent"), ms = Ee.__createMock__("fs.Stats"), bs = Ee.__createMock__("fs.ReadStream"), vs = Ee.__createMock__("fs.WriteStream"), ws = Ee.__createMock__("fs.FileReadStream"), Os = Ee.__createMock__("fs.FileWriteStream"), $s = Ee.__createMock__("fs.StatsFs"), xs = {};
hs(xs, { _toUnixTimestamp: () => wi, access: () => _s, accessSync: () => _i, appendFile: () => Ss, appendFileSync: () => xi, chmod: () => js, chmodSync: () => Pi, chown: () => Ps, chownSync: () => Si, close: () => Zs, closeSync: () => ji, copyFile: () => ks, copyFileSync: () => ki, cp: () => Es, cpSync: () => Ei, createReadStream: () => ei, createWriteStream: () => ti, exists: () => ri, existsSync: () => Ti, fchmod: () => ni, fchmodSync: () => Ci, fchown: () => oi, fchownSync: () => Ai, fdatasync: () => si, fdatasyncSync: () => Ii, fstat: () => ii, fstatSync: () => Ri, fsync: () => ai, fsyncSync: () => Di, ftruncate: () => li, ftruncateSync: () => Mi, futimes: () => ui, futimesSync: () => Li, glob: () => $i, globSync: () => la, lchmod: () => As, lchmodSync: () => Ui, lchown: () => Ts, lchownSync: () => Fi, link: () => Cs, linkSync: () => Ni, lstat: () => Is, lstatSync: () => ci, lutimes: () => Rs, lutimesSync: () => Bi, mkdir: () => Ds, mkdirSync: () => qi, mkdtemp: () => Ms, mkdtempSync: () => zi, open: () => Fs, openAsBlob: () => Oi, openSync: () => Wi, opendir: () => Us, opendirSync: () => Gi, read: () => fi, readFile: () => Bs, readFileSync: () => Ki, readSync: () => Hi, readdir: () => Ns, readdirSync: () => Yi, readlink: () => qs, readlinkSync: () => Qi, readv: () => pi, readvSync: () => Vi, realpath: () => Ls, realpathSync: () => hi, rename: () => zs, renameSync: () => Ji, rm: () => Ws, rmSync: () => Xi, rmdir: () => Gs, rmdirSync: () => Zi, stat: () => Ys, statSync: () => di, statfs: () => Xs, statfsSync: () => aa, symlink: () => Hs, symlinkSync: () => ea, truncate: () => Vs, truncateSync: () => ta, unlink: () => Ks, unlinkSync: () => ra, unwatchFile: () => yi, utimes: () => Qs, utimesSync: () => oa, watch: () => gi, watchFile: () => mi, write: () => bi, writeFile: () => Js, writeFileSync: () => na, writeSync: () => sa, writev: () => vi, writevSync: () => ia });
function V(e) {
  let t = function(...r) {
    let n = r.pop();
    e().catch((o) => n(o)).then((o) => n(void 0, o));
  };
  return t.__promisify__ = e, t.native = t, t;
}
var _s = V(Fn), Ss = V(cs), Ps = V(ns), js = V(ts), ks = V(Un), Es = V(Nn), Ts = V(os), As = V(rs), Cs = V(Zn), Is = V(Jn), Rs = V(is), Ds = V(Hn), Ms = V(ls), Ls = V(as), Fs = V(Bn), Us = V(qn), Ns = V(Vn), Bs = V(fs), qs = V(Kn), zs = V(zn), Ws = V(Gn), Gs = V(Yn), Ys = V(Xn), Hs = V(Qn), Vs = V(Wn), Ks = V(es), Qs = V(ss), Js = V(us), Xs = V(ps), Zs = X("fs.close"), ei = X("fs.createReadStream"), ti = X("fs.createWriteStream"), ri = X("fs.exists"), oi = X("fs.fchown"), ni = X("fs.fchmod"), si = X("fs.fdatasync"), ii = X("fs.fstat"), ai = X("fs.fsync"), li = X("fs.ftruncate"), ui = X("fs.futimes"), ci = X("fs.lstatSync"), fi = X("fs.read"), pi = X("fs.readv"), hi = X("fs.realpathSync"), di = X("fs.statSync"), yi = X("fs.unwatchFile"), gi = X("fs.watch"), mi = X("fs.watchFile"), bi = X("fs.write"), vi = X("fs.writev"), wi = X("fs._toUnixTimestamp"), Oi = X("fs.openAsBlob"), $i = X("fs.glob"), xi = N("fs.appendFileSync"), _i = N("fs.accessSync"), Si = N("fs.chownSync"), Pi = N("fs.chmodSync"), ji = N("fs.closeSync"), ki = N("fs.copyFileSync"), Ei = N("fs.cpSync"), Ti = () => false, Ai = N("fs.fchownSync"), Ci = N("fs.fchmodSync"), Ii = N("fs.fdatasyncSync"), Ri = N("fs.fstatSync"), Di = N("fs.fsyncSync"), Mi = N("fs.ftruncateSync"), Li = N("fs.futimesSync"), Fi = N("fs.lchownSync"), Ui = N("fs.lchmodSync"), Ni = N("fs.linkSync"), Bi = N("fs.lutimesSync"), qi = N("fs.mkdirSync"), zi = N("fs.mkdtempSync"), Wi = N("fs.openSync"), Gi = N("fs.opendirSync"), Yi = N("fs.readdirSync"), Hi = N("fs.readSync"), Vi = N("fs.readvSync"), Ki = N("fs.readFileSync"), Qi = N("fs.readlinkSync"), Ji = N("fs.renameSync"), Xi = N("fs.rmSync"), Zi = N("fs.rmdirSync"), ea = N("fs.symlinkSync"), ta = N("fs.truncateSync"), ra = N("fs.unlinkSync"), oa = N("fs.utimesSync"), na = N("fs.writeFileSync"), sa = N("fs.writeSync"), ia = N("fs.writevSync"), aa = N("fs.statfsSync"), la = N("fs.globSync"), ua = Ln, Af = { ...ds, ...Cn, ...xs, promises: ua };
const Cf = Object.freeze(Object.defineProperty({ __proto__: null, Dir: ys, Dirent: gs, F_OK: In, FileReadStream: ws, FileWriteStream: Os, R_OK: Rn, ReadStream: bs, Stats: ms, StatsFs: $s, W_OK: Dn, WriteStream: vs, X_OK: Mn, _toUnixTimestamp: wi, access: _s, accessSync: _i, appendFile: Ss, appendFileSync: xi, chmod: js, chmodSync: Pi, chown: Ps, chownSync: Si, close: Zs, closeSync: ji, constants: Lr, copyFile: ks, copyFileSync: ki, cp: Es, cpSync: Ei, createReadStream: ei, createWriteStream: ti, default: Af, exists: ri, existsSync: Ti, fchmod: ni, fchmodSync: Ci, fchown: oi, fchownSync: Ai, fdatasync: si, fdatasyncSync: Ii, fstat: ii, fstatSync: Ri, fsync: ai, fsyncSync: Di, ftruncate: li, ftruncateSync: Mi, futimes: ui, futimesSync: Li, glob: $i, globSync: la, lchmod: As, lchmodSync: Ui, lchown: Ts, lchownSync: Fi, link: Cs, linkSync: Ni, lstat: Is, lstatSync: ci, lutimes: Rs, lutimesSync: Bi, mkdir: Ds, mkdirSync: qi, mkdtemp: Ms, mkdtempSync: zi, open: Fs, openAsBlob: Oi, openSync: Wi, opendir: Us, opendirSync: Gi, promises: ua, read: fi, readFile: Bs, readFileSync: Ki, readSync: Hi, readdir: Ns, readdirSync: Yi, readlink: qs, readlinkSync: Qi, readv: pi, readvSync: Vi, realpath: Ls, realpathSync: hi, rename: zs, renameSync: Ji, rm: Ws, rmSync: Xi, rmdir: Gs, rmdirSync: Zi, stat: Ys, statSync: di, statfs: Xs, statfsSync: aa, symlink: Hs, symlinkSync: ea, truncate: Vs, truncateSync: ta, unlink: Ks, unlinkSync: ra, unwatchFile: yi, utimes: Qs, utimesSync: oa, watch: gi, watchFile: mi, write: bi, writeFile: Js, writeFileSync: na, writeSync: sa, writev: vi, writevSync: ia }, Symbol.toStringTag, { value: "Module" }));
function If(e) {
  return new Error(`[unenv] ${e} is not implemented yet!`);
}
function Rf(e) {
  return Object.assign(() => {
    throw If(e);
  }, { __unenv__: true });
}
var Df = Object.defineProperty, Mf = (e, t) => {
  for (var r in t) Df(e, r, { get: t[r], enumerable: true });
}, ca = {};
Mf(ca, { basename: () => Jt, default: () => qf, delimiter: () => Ur, dirname: () => Qt, extname: () => Kt, format: () => zr, isAbsolute: () => ke, join: () => Nr, normalize: () => Vt, normalizeString: () => At, parse: () => Wr, relative: () => qr, resolve: () => mt, sep: () => Fr, toNamespacedPath: () => Br });
var Lf = /^[A-Za-z]:\//;
function Te(e = "") {
  return e && e.replace(/\\/g, "/").replace(Lf, (t) => t.toUpperCase());
}
var Ff = /^[/\\]{2}/, Uf = /^[/\\](?![/\\])|^[/\\]{2}(?!\.)|^[A-Za-z]:[/\\]/, fa = /^[A-Za-z]:$/, yo = /^\/([A-Za-z]:)?$/, Fr = "/", Ur = ":", Vt = function(e) {
  if (e.length === 0) return ".";
  e = Te(e);
  let t = e.match(Ff), r = ke(e), n = e[e.length - 1] === "/";
  return e = At(e, !r), e.length === 0 ? r ? "/" : n ? "./" : "." : (n && (e += "/"), fa.test(e) && (e += "/"), t ? r ? `//${e}` : `//./${e}` : r && !ke(e) ? `/${e}` : e);
}, Nr = function(...e) {
  if (e.length === 0) return ".";
  let t;
  for (let r of e) r && r.length > 0 && (t === void 0 ? t = r : t += `/${r}`);
  return t === void 0 ? "." : Vt(t.replace(/\/\/+/g, "/"));
};
function Nf() {
  return typeof cr < "u" && typeof cr.cwd == "function" ? cr.cwd().replace(/\\/g, "/") : "/";
}
var mt = function(...e) {
  e = e.map((n) => Te(n));
  let t = "", r = false;
  for (let n = e.length - 1; n >= -1 && !r; n--) {
    let o = n >= 0 ? e[n] : Nf();
    !o || o.length === 0 || (t = `${o}/${t}`, r = ke(o));
  }
  return t = At(t, !r), r && !ke(t) ? `/${t}` : t.length > 0 ? t : ".";
};
function At(e, t) {
  let r = "", n = 0, o = -1, s = 0, u = null;
  for (let c = 0; c <= e.length; ++c) {
    if (c < e.length) u = e[c];
    else {
      if (u === "/") break;
      u = "/";
    }
    if (u === "/") {
      if (!(o === c - 1 || s === 1)) if (s === 2) {
        if (r.length < 2 || n !== 2 || r[r.length - 1] !== "." || r[r.length - 2] !== ".") {
          if (r.length > 2) {
            let i = r.lastIndexOf("/");
            i === -1 ? (r = "", n = 0) : (r = r.slice(0, i), n = r.length - 1 - r.lastIndexOf("/")), o = c, s = 0;
            continue;
          } else if (r.length > 0) {
            r = "", n = 0, o = c, s = 0;
            continue;
          }
        }
        t && (r += r.length > 0 ? "/.." : "..", n = 2);
      } else r.length > 0 ? r += `/${e.slice(o + 1, c)}` : r = e.slice(o + 1, c), n = c - o - 1;
      o = c, s = 0;
    } else u === "." && s !== -1 ? ++s : s = -1;
  }
  return r;
}
var ke = function(e) {
  return Uf.test(e);
}, Br = function(e) {
  return Te(e);
}, Bf = /.(\.[^./]+)$/, Kt = function(e) {
  let t = Bf.exec(Te(e));
  return t && t[1] || "";
}, qr = function(e, t) {
  let r = mt(e).replace(yo, "$1").split("/"), n = mt(t).replace(yo, "$1").split("/");
  if (n[0][1] === ":" && r[0][1] === ":" && r[0] !== n[0]) return n.join("/");
  let o = [...r];
  for (let s of o) {
    if (n[0] !== s) break;
    r.shift(), n.shift();
  }
  return [...r.map(() => ".."), ...n].join("/");
}, Qt = function(e) {
  let t = Te(e).replace(/\/$/, "").split("/").slice(0, -1);
  return t.length === 1 && fa.test(t[0]) && (t[0] += "/"), t.join("/") || (ke(e) ? "/" : ".");
}, zr = function(e) {
  let t = [e.root, e.dir, e.base ?? e.name + e.ext].filter(Boolean);
  return Te(e.root ? mt(...t) : t.join("/"));
}, Jt = function(e, t) {
  let r = Te(e).split("/").pop();
  return t && r.endsWith(t) ? r.slice(0, -t.length) : r;
}, Wr = function(e) {
  let t = Te(e).split("/").shift() || "/", r = Jt(e), n = Kt(r);
  return { root: t, dir: Qt(e), base: r, ext: n, name: r.slice(0, r.length - n.length) };
}, qf = { __proto__: null, basename: Jt, delimiter: Ur, dirname: Qt, extname: Kt, format: zr, isAbsolute: ke, join: Nr, normalize: Vt, normalizeString: At, parse: Wr, relative: qr, resolve: mt, sep: Fr, toNamespacedPath: Br }, $e = { ...ca, platform: "posix", posix: void 0, win32: void 0, _makeLong: (e) => e, matchesGlob: Rf("path.matchesGlob") };
$e.posix = $e;
$e.win32 = $e;
var zf = $e, Wf = $e, Gf = "posix", Yf = $e._makeLong, Hf = $e.matchesGlob, Bt = $e;
const Gr = Object.freeze(Object.defineProperty({ __proto__: null, _makeLong: Yf, basename: Jt, default: Bt, delimiter: Ur, dirname: Qt, extname: Kt, format: zr, isAbsolute: ke, join: Nr, matchesGlob: Hf, normalize: Vt, normalizeString: At, parse: Wr, platform: Gf, posix: zf, relative: qr, resolve: mt, sep: Fr, toNamespacedPath: Br, win32: Wf }, Symbol.toStringTag, { value: "Module" }));
var go = function() {
};
function kt(e, t = {}) {
  go.prototype.name = e;
  let r = {};
  return new Proxy(go, { get(n, o) {
    return o === "caller" ? null : o === "__createMock__" ? kt : o === "__unenv__" ? true : o in t ? t[o] : r[o] = r[o] || kt(`${e}.${o.toString()}`);
  }, apply(n, o, s) {
    return kt(`${e}()`);
  }, construct(n, o, s) {
    return kt(`[${e}]`);
  }, enumerate() {
    return [];
  } });
}
var Yr = kt("mock");
function Vf(e) {
  return new Error(`[unenv] ${e} is not implemented yet!`);
}
function W(e) {
  return Object.assign(() => {
    throw Vf(e);
  }, { __unenv__: true });
}
Object.freeze(Object.create(null, { __unenv__: { get: () => true } }));
var qt = /* @__PURE__ */ Object.create(null), Kf = (_b2 = globalThis.process) == null ? void 0 : _b2.env, _t = (e) => Kf || globalThis.__env__ || (e ? qt : globalThis), Qf = new Proxy(qt, { get(e, t) {
  return _t()[t] ?? qt[t];
}, has(e, t) {
  let r = _t();
  return t in r || t in qt;
}, set(e, t, r) {
  let n = _t(true);
  return n[t] = r, true;
}, deleteProperty(e, t) {
  let r = _t(true);
  return delete r[t], true;
}, ownKeys() {
  let e = _t();
  return Object.keys(e);
} });
Object.assign(function(e) {
  let t = Date.now(), r = Math.trunc(t / 1e3), n = t % 1e3 * 1e6;
  if (e) {
    let o = r - e[0], s = n - e[0];
    return s < 0 && (o = o - 1, s = 1e9 + s), [o, s];
  }
  return [r, n];
}, { bigint: function() {
  return BigInt(Date.now() * 1e6);
} });
W("process.abort");
W("process.cpuUsage");
W("process.dlopen");
W("process.eventNames");
W("process.exit");
W("process.getMaxListeners");
W("process.kill");
Object.assign(() => ({ arrayBuffers: 0, rss: 0, external: 0, heapTotal: 0, heapUsed: 0 }), { rss: () => 0 });
W("process.rawListeners");
W("process.report.getReport"), W("process.report.writeReport");
W("process.resourceUsage");
W("process.setegid");
W("process.seteuid");
W("process.setgid");
W("process.setgroups");
W("process.setuid");
W("process.setMaxListeners");
W("process.setSourceMapsEnabled");
Yr.__createMock__("process.stdout");
Yr.__createMock__("process.stderr");
Yr.__createMock__("process.stdin");
W("process.setUncaughtExceptionCaptureCallback");
W("process.loadEnvFile");
W("process.assert");
W("process.openStdin");
W("process._debugEnd");
W("process._debugProcess");
W("process._fatalException");
W("process._getActiveHandles");
W("process._getActiveRequests");
W("process._kill");
W("process._rawDebug");
W("process._startProfilerIdleNotifier");
W("process.__stopProfilerIdleNotifier");
W("process._tickCallback");
W("process._linkedBinding");
W("process.initgroups");
var Jf = { env: Qf }, zt = Jf, pa = "-", Xf = /^xn--/, Zf = /[^\0-\u007F]/, ep = /[.\u3002\uFF0E\uFF61]/g, tp = { overflow: "Overflow: input needs wider integers to process", "not-basic": "Illegal input >= 0x80 (not a basic code point)", "invalid-input": "Invalid input" }, fr = 35, me = Math.floor, pr = String.fromCharCode;
function _e(e) {
  throw new RangeError(tp[e]);
}
function rp(e, t) {
  let r = [], n = e.length;
  for (; n--; ) r[n] = t(e[n]);
  return r;
}
function ha(e, t) {
  let r = e.split("@"), n = "";
  r.length > 1 && (n = r[0] + "@", e = r[1]), e = e.replace(ep, ".");
  let o = e.split("."), s = rp(o, t).join(".");
  return n + s;
}
function op(e) {
  let t = [], r = 0, n = e.length;
  for (; r < n; ) {
    let o = e.charCodeAt(r++);
    if (o >= 55296 && o <= 56319 && r < n) {
      let s = e.charCodeAt(r++);
      (s & 64512) == 56320 ? t.push(((o & 1023) << 10) + (s & 1023) + 65536) : (t.push(o), r--);
    } else t.push(o);
  }
  return t;
}
var np = function(e) {
  return e >= 48 && e < 58 ? 26 + (e - 48) : e >= 65 && e < 91 ? e - 65 : e >= 97 && e < 123 ? e - 97 : 36;
}, mo = function(e, t) {
  return e + 22 + 75 * (e < 26) - ((t != 0) << 5);
}, da = function(e, t, r) {
  let n = 0;
  for (e = r ? me(e / 700) : e >> 1, e += me(e / t); e > fr * 26 >> 1; n += 36) e = me(e / fr);
  return me(n + (fr + 1) * e / (e + 38));
}, sp = function(e) {
  let t = [], r = e.length, n = 0, o = 128, s = 72, u = e.lastIndexOf(pa);
  u < 0 && (u = 0);
  for (let c = 0; c < u; ++c) e.charCodeAt(c) >= 128 && _e("not-basic"), t.push(e.charCodeAt(c));
  for (let c = u > 0 ? u + 1 : 0; c < r; ) {
    let i = n;
    for (let f = 1, a = 36; ; a += 36) {
      c >= r && _e("invalid-input");
      let d = np(e.charCodeAt(c++));
      d >= 36 && _e("invalid-input"), d > me((2147483647 - n) / f) && _e("overflow"), n += d * f;
      let h = a <= s ? 1 : a >= s + 26 ? 26 : a - s;
      if (d < h) break;
      let b = 36 - h;
      f > me(2147483647 / b) && _e("overflow"), f *= b;
    }
    let p = t.length + 1;
    s = da(n - i, p, i === 0), me(n / p) > 2147483647 - o && _e("overflow"), o += me(n / p), n %= p, t.splice(n++, 0, o);
  }
  return String.fromCodePoint(...t);
}, ip = function(e) {
  let t = [], r = op(e), n = r.length, o = 128, s = 0, u = 72;
  for (let p of r) p < 128 && t.push(pr(p));
  let c = t.length, i = c;
  for (c && t.push(pa); i < n; ) {
    let p = 2147483647;
    for (let a of r) a >= o && a < p && (p = a);
    let f = i + 1;
    p - o > me((2147483647 - s) / f) && _e("overflow"), s += (p - o) * f, o = p;
    for (let a of r) if (a < o && ++s > 2147483647 && _e("overflow"), a === o) {
      let d = s;
      for (let h = 36; ; h += 36) {
        let b = h <= u ? 1 : h >= u + 26 ? 26 : h - u;
        if (d < b) break;
        let l = d - b, y = 36 - b;
        t.push(pr(mo(b + l % y, 0))), d = me(l / y);
      }
      t.push(pr(mo(d, 0))), u = da(s, f, i === c), s = 0, ++i;
    }
    ++s, ++o;
  }
  return t.join("");
}, ya = function(e) {
  return ha(e, function(t) {
    return Xf.test(t) ? sp(t.slice(4).toLowerCase()) : t;
  });
}, Hr = function(e) {
  return ha(e, function(t) {
    return Zf.test(t) ? "xn--" + ip(t) : t;
  });
}, ap = class extends URIError {
  constructor() {
    super("URI malformed");
    __publicField(this, "code", "ERR_INVALID_URI");
  }
}, Vr = Array.from({ length: 256 });
for (let e = 0; e < 256; ++e) Vr[e] = "%" + String.prototype.toUpperCase.call((e < 16 ? "0" : "") + Number.prototype.toString.call(e, 16));
var bo = new Int8Array([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]);
function ga(e, t, r) {
  let n = e.length;
  if (n === 0) return "";
  let o = "", s = 0, u = 0;
  e: for (; u < n; u++) {
    let c = String.prototype.charCodeAt.call(e, u);
    for (; c < 128; ) {
      if (t[c] !== 1 && (s < u && (o += String.prototype.slice.call(e, s, u)), s = u + 1, o += r[c]), ++u === n) break e;
      c = String.prototype.charCodeAt.call(e, u);
    }
    if (s < u && (o += String.prototype.slice.call(e, s, u)), c < 2048) {
      s = u + 1, o += r[192 | c >> 6] + r[128 | c & 63];
      continue;
    }
    if (c < 55296 || c >= 57344) {
      s = u + 1, o += r[224 | c >> 12] + r[128 | c >> 6 & 63] + r[128 | c & 63];
      continue;
    }
    if (++u, u >= n) throw new ap();
    let i = String.prototype.charCodeAt.call(e, u) & 1023;
    s = u + 1, c = 65536 + ((c & 1023) << 10 | i), o += r[240 | c >> 18] + r[128 | c >> 12 & 63] + r[128 | c >> 6 & 63] + r[128 | c & 63];
  }
  return s === 0 ? e : s < n ? o + String.prototype.slice.call(e, s) : o;
}
var vo = new Int8Array([-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, -1, -1, -1, -1, -1, -1, -1, 10, 11, 12, 13, 14, 15, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 10, 11, 12, 13, 14, 15, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1]);
function lp(e, t) {
  let r = globalThis.Buffer.allocUnsafe(e.length), n = 0, o = 0, s, u, c, i, p = e.length - 2, f = false;
  for (; n < e.length; ) {
    if (s = String.prototype.charCodeAt.call(e, n), s === 43 && t) {
      r[o++] = 32, n++;
      continue;
    }
    if (s === 37 && n < p) if (s = String.prototype.charCodeAt.call(e, ++n), c = vo[s], c >= 0) u = String.prototype.charCodeAt.call(e, ++n), i = vo[u], i >= 0 ? (f = true, s = c * 16 + i) : (r[o++] = 37, n--);
    else {
      r[o++] = 37;
      continue;
    }
    r[o++] = s, n++;
  }
  return f ? r.slice(0, o) : r;
}
function $r(e, t) {
  try {
    return decodeURIComponent(e);
  } catch {
    return lp(e, t).toString();
  }
}
var up = new Int8Array([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0]);
function wo(e) {
  return typeof e != "string" && (typeof e == "object" ? e = String(e) : e += ""), ga(e, up, Vr);
}
function cp(e) {
  return typeof e == "string" ? e : typeof e == "number" && Number.isFinite(e) || typeof e == "bigint" ? "" + e : typeof e == "boolean" ? e ? "true" : "false" : "";
}
function fp(e, t) {
  return typeof e == "string" ? e.length > 0 ? t(e) : "" : typeof e == "number" && Number.isFinite(e) ? Math.abs(e) < 1e21 ? "" + e : t("" + e) : typeof e == "bigint" ? "" + e : typeof e == "boolean" ? e ? "true" : "false" : "";
}
function pp(e, t) {
  return t(cp(e));
}
function hp(e, t, r, n) {
  t = t || "&", r = r || "=";
  let o = wo;
  n && typeof n.encodeURIComponent == "function" && (o = n.encodeURIComponent);
  let s = o === wo ? fp : pp;
  if (e !== null && typeof e == "object") {
    let u = Object.keys(e), c = u.length, i = "";
    for (let p = 0; p < c; ++p) {
      let f = u[p], a = e[f], d = s(f, o);
      if (d += r, Array.isArray(a)) {
        let h = a.length;
        if (h === 0) continue;
        i && (i += t);
        for (let b = 0; b < h; ++b) b && (i += t), i += d, i += s(a[b], o);
      } else i && (i += t), i += d, i += s(a, o);
    }
    return i;
  }
  return "";
}
function Oo(e) {
  if (e.length === 0) return [];
  if (e.length === 1) return [String.prototype.charCodeAt.call(e, 0)];
  let t = Array.from({ length: e.length });
  for (let r = 0; r < e.length; ++r) t[r] = String.prototype.charCodeAt.call(e, r);
  return t;
}
var dp = [38], yp = [61];
function $o(e, t, r, n, o, s) {
  if (t.length > 0 && n && (t = _o(t, s)), r.length > 0 && o && (r = _o(r, s)), e[t] === void 0) e[t] = r;
  else {
    let u = e[t];
    u.pop ? u[u.length] = r : e[t] = [u, r];
  }
}
function xo(e, t, r, n) {
  let o = { __proto__: null };
  if (typeof e != "string" || e.length === 0) return o;
  let s = t ? Oo(String(t)) : dp, u = r ? Oo(String(r)) : yp, c = s.length, i = u.length, p = 1e3;
  n && typeof n.maxKeys == "number" && (p = n.maxKeys > 0 ? n.maxKeys : -1);
  let f = $r;
  n && typeof n.decodeURIComponent == "function" && (f = n.decodeURIComponent);
  let a = f !== $r, d = 0, h = 0, b = 0, l = "", y = "", m = a, g = a, $ = a ? "%20" : " ", O = 0;
  for (let v = 0; v < e.length; ++v) {
    let w = String.prototype.charCodeAt.call(e, v);
    if (w === s[h]) {
      if (++h === c) {
        let _ = v - h + 1;
        if (b < i) {
          if (d < _) l += String.prototype.slice.call(e, d, _);
          else if (l.length === 0) {
            if (--p === 0) return o;
            d = v + 1, h = b = 0;
            continue;
          }
        } else d < _ && (y += String.prototype.slice.call(e, d, _));
        if ($o(o, l, y, m, g, f), --p === 0) return o;
        m = g = a, l = y = "", O = 0, d = v + 1, h = b = 0;
      }
    } else {
      if (h = 0, b < i) {
        if (w === u[b]) {
          if (++b === i) {
            let _ = v - b + 1;
            d < _ && (l += String.prototype.slice.call(e, d, _)), O = 0, d = v + 1;
          }
          continue;
        } else if (b = 0, !m) {
          if (w === 37) {
            O = 1;
            continue;
          } else if (O > 0) if (bo[w] === 1) {
            ++O === 3 && (m = true);
            continue;
          } else O = 0;
        }
        if (w === 43) {
          d < v && (l += String.prototype.slice.call(e, d, v)), l += $, d = v + 1;
          continue;
        }
      }
      w === 43 ? (d < v && (y += String.prototype.slice.call(e, d, v)), y += $, d = v + 1) : g || (w === 37 ? O = 1 : O > 0 && (bo[w] === 1 ? ++O === 3 && (g = true) : O = 0));
    }
  }
  if (d < e.length) b < i ? l += String.prototype.slice.call(e, d) : h < c && (y += String.prototype.slice.call(e, d));
  else if (b === 0 && l.length === 0) return o;
  return $o(o, l, y, m, g, f), o;
}
function _o(e, t) {
  try {
    return t(e);
  } catch {
    return $r(e, true);
  }
}
function hr(e, t) {
  for (; t + 1 < e.length; t++) e[t] = e[t + 1];
  e.pop();
}
function xr(e) {
  return Array.isArray(e) ? e.map((t) => xr(t)).join(" or ") : e ? e.toString() : "" + e;
}
var gp = class extends TypeError {
  constructor(t, r, n) {
    super(`The ${t.includes(".") ? "property" : "argument"} '${t}' ${n}. Received ${r}`);
    __publicField(this, "code", "ERR_INVALID_ARG_VALUE");
  }
}, Kr = class extends TypeError {
  constructor(t, r, n) {
    super(`The "${t}" argument must be of type ${xr(r)}. Received ${xr(n)}`);
    __publicField(this, "code", "ERR_INVALID_ARG_TYPE");
  }
}, So = class extends TypeError {
  constructor(t, r) {
    super("Invalid URL");
    __publicField(this, "code", "ERR_INVALID_URL");
    __publicField(this, "input");
    __publicField(this, "base");
    this.input = t, r != null && (this.base = r);
  }
}, mp = class extends TypeError {
  constructor(t) {
    super(`The URL must be of scheme ${t}`);
    __publicField(this, "code", "ERR_INVALID_URL_SCHEME");
  }
}, _r = class extends TypeError {
  constructor(t) {
    super(`Invalid ile URL path: ${t}`);
    __publicField(this, "code", "ERR_INVALID_FILE_URL_PATH");
  }
}, bp = class extends TypeError {
  constructor(t) {
    super(`File URL host must be "localhost" or empty on ${t}`);
    __publicField(this, "code", "ERR_INVALID_FILE_URL_HOST");
  }
}, vp = /* @__PURE__ */ new Set(["javascript", "javascript:"]), dr = /* @__PURE__ */ new Set(["javascript", "javascript:"]), Me = /* @__PURE__ */ new Set(["http", "http:", "https", "https:", "ftp", "ftp:", "gopher", "gopher:", "file", "file:", "ws", "ws:", "wss", "wss:"]), wp = /\//g;
function Op(e, t) {
  let r = t == null ? void 0 : t.windows;
  if (r && String.prototype.startsWith.call(e, "\\\\")) {
    let s = new URL("file://"), u = String.prototype.startsWith.call(e, "\\\\?\\UNC\\") ? 8 : 2, c = String.prototype.indexOf.call(e, "\\", u);
    if (c === -1) throw new gp("path", e, "Missing UNC resource path");
    let i = String.prototype.slice.call(e, u, c);
    return s.hostname = Hr(i), s.pathname = Po(e.slice(c).replace(va, "/"), { windows: r }), s;
  }
  let n = r ? Bt.win32.resolve(e) : Bt.posix.resolve(e), o = String.prototype.charCodeAt.call(e, e.length - 1);
  return (o === 47 || r && o === 92) && n.at(-1) !== Bt.sep && (n += "/"), n = Po(n, { windows: r }), String.prototype.indexOf.call(n, "?") !== -1 && (n = n.replace(Pp, "%3F")), String.prototype.indexOf.call(n, "#") !== -1 && (n = n.replace(jp, "%23")), new URL(`file://${n}`);
}
function ma(e, t) {
  let r = t == null ? void 0 : t.windows;
  if (typeof e == "string") e = new URL(e);
  else if (!Tp(e)) throw new Kr("path", ["string", "URL"], e);
  if (e.protocol !== "file:") throw new mp("file");
  return r ? kp(e) : Ep(e);
}
function ba(e) {
  let { hostname: t, pathname: r, port: n, username: o, password: s, search: u } = e;
  return { __proto__: null, ...e, protocol: e.protocol, hostname: t && String.prototype.startsWith.call(t, "[") ? String.prototype.slice.call(t, 1, -1) : t, hash: e.hash, search: u, pathname: r, path: `${r || ""}${u || ""}`, href: e.href, port: n === "" ? void 0 : Number(n), auth: o || s ? `${decodeURIComponent(o)}:${decodeURIComponent(s)}` : void 0 };
}
var $p = /%/g, va = /\\/g, xp = /\n/g, _p = /\r/g, Sp = /\t/g, Pp = /\?/g, jp = /#/g;
function Po(e, t) {
  let r = t == null ? void 0 : t.windows;
  return String.prototype.indexOf.call(e, "%") !== -1 && (e = e.replace($p, "%25")), !r && String.prototype.indexOf.call(e, "\\") !== -1 && (e = e.replace(va, "%5C")), String.prototype.indexOf.call(e, `
`) !== -1 && (e = e.replace(xp, "%0A")), String.prototype.indexOf.call(e, "\r") !== -1 && (e = e.replace(_p, "%0D")), String.prototype.indexOf.call(e, "	") !== -1 && (e = e.replace(Sp, "%09")), e;
}
function kp(e) {
  let t = e.hostname, r = e.pathname;
  for (let s = 0; s < r.length; s++) if (r[s] === "%") {
    let u = r.codePointAt(s + 2) | 32;
    if (r[s + 1] === "2" && u === 102 || r[s + 1] === "5" && u === 99) throw new _r(String.raw`must not include encoded \ or / characters`);
  }
  if (r = r.replace(wp, "\\"), r = decodeURIComponent(r), t !== "") return `\\\\${ya(t)}${r}`;
  let n = String.prototype.codePointAt.call(r, 1) | 32, o = String.prototype.charAt.call(r, 2);
  if (n < 97 || n > 122 || o !== ":") throw new _r("must be absolute");
  return String.prototype.slice.call(r, 1);
}
function Ep(e) {
  if (e.hostname !== "") throw new bp("??");
  let t = e.pathname;
  for (let r = 0; r < t.length; r++) if (t[r] === "%") {
    let n = String.prototype.codePointAt.call(t, r + 2) | 32;
    if (t[r + 1] === "2" && n === 102) throw new _r("must not include encoded / characters");
  }
  return decodeURIComponent(t);
}
function Tp(e) {
  return !!((e == null ? void 0 : e.href) && e.protocol && e.auth === void 0 && e.path === void 0);
}
var bt = class Sr {
  constructor() {
    __publicField(this, "auth", null);
    __publicField(this, "hash", null);
    __publicField(this, "host", null);
    __publicField(this, "hostname", null);
    __publicField(this, "href", null);
    __publicField(this, "path", null);
    __publicField(this, "pathname", null);
    __publicField(this, "protocol", null);
    __publicField(this, "search", null);
    __publicField(this, "slashes", null);
    __publicField(this, "port", null);
    __publicField(this, "query", null);
  }
  parse(t, r, n) {
    if (typeof t != "string") throw new Kr("url", "string", t);
    let o = false, s = false, u = -1, c = -1, i = "", p = 0;
    for (let m = 0, g = false, $ = false; m < t.length; ++m) {
      let O = t.charCodeAt(m), v = O < 33 || O === 160 || O === 65279;
      if (u === -1) {
        if (v) continue;
        p = u = m;
      } else g ? v || (c = -1, g = false) : v && (c = m, g = true);
      if ($) !o && O === 35 && (o = true);
      else switch (O) {
        case 64:
          s = true;
          break;
        case 35:
          o = true;
        case 63:
          $ = true;
          break;
        case 92:
          m - p > 0 && (i += t.slice(p, m)), i += "/", p = m + 1;
          break;
      }
    }
    if (u !== -1 && (p === u ? c === -1 ? u === 0 ? i = t : i = t.slice(u) : i = t.slice(u, c) : c === -1 && p < t.length ? i += t.slice(p) : c !== -1 && p < c && (i += t.slice(p, c))), !n && !o && !s) {
      let m = Rp.exec(i);
      if (m) return this.path = i, this.href = i, this.pathname = m[1], m[2] ? (this.search = m[2], r ? this.query = xo(this.search.slice(1)) : this.query = this.search.slice(1)) : r && (this.search = null, this.query = { __proto__: null }), this;
    }
    let f = Ap.exec(i), a, d;
    f && (a = f[0], d = a.toLowerCase(), this.protocol = d, i = i.slice(a.length));
    let h;
    if ((n || a || Ip.test(i)) && (h = i.charCodeAt(0) === 47 && i.charCodeAt(1) === 47, h && !(a && dr.has(d)) && (i = i.slice(2), this.slashes = true)), !dr.has(d) && (h || a && !Me.has(a))) {
      let m = -1, g = -1, $ = -1;
      for (let x = 0; x < i.length; ++x) {
        switch (i.charCodeAt(x)) {
          case 9:
          case 10:
          case 13:
            i = i.slice(0, x) + i.slice(x + 1), x -= 1;
            break;
          case 32:
          case 34:
          case 37:
          case 39:
          case 59:
          case 60:
          case 62:
          case 92:
          case 94:
          case 96:
          case 123:
          case 124:
          case 125:
            $ === -1 && ($ = x);
            break;
          case 35:
          case 47:
          case 63:
            $ === -1 && ($ = x), m = x;
            break;
          case 64:
            g = x, $ = -1;
            break;
        }
        if (m !== -1) break;
      }
      u = 0, g !== -1 && (this.auth = decodeURIComponent(i.slice(0, g)), u = g + 1), $ === -1 ? (this.host = i.slice(u), i = "") : (this.host = i.slice(u, $), i = i.slice($)), this.parseHost(), typeof this.hostname != "string" && (this.hostname = "");
      let O = this.hostname, v = ko(O);
      if (v || (i = Np(this, i, O, t)), this.hostname.length > Up ? this.hostname = "" : this.hostname = this.hostname.toLowerCase(), this.hostname !== "") {
        if (v) {
          if (Mp.test(this.hostname)) throw new So(t);
        } else if (this.hostname = Hr(this.hostname), this.hostname === "" || Dp.test(this.hostname)) throw new So(t);
      }
      let w = this.port ? ":" + this.port : "", _ = this.hostname || "";
      this.host = _ + w, v && (this.hostname = this.hostname.slice(1, -1), i[0] !== "/" && (i = "/" + i));
    }
    vp.has(d) || (i = Bp(i));
    let b = -1, l = -1;
    for (let m = 0; m < i.length; ++m) {
      let g = i.charCodeAt(m);
      if (g === 35) {
        this.hash = i.slice(m), l = m;
        break;
      } else g === 63 && b === -1 && (b = m);
    }
    b !== -1 ? (l === -1 ? (this.search = i.slice(b), this.query = i.slice(b + 1)) : (this.search = i.slice(b, l), this.query = i.slice(b + 1, l)), r && (this.query = xo(this.query))) : r && (this.search = null, this.query = { __proto__: null });
    let y = b !== -1 && (l === -1 || b < l) ? b : l;
    if (y === -1 ? i.length > 0 && (this.pathname = i) : y > 0 && (this.pathname = i.slice(0, y)), Me.has(d) && this.hostname && !this.pathname && (this.pathname = "/"), this.pathname || this.search) {
      let m = this.pathname || "", g = this.search || "";
      this.path = m + g;
    }
    return this.href = this.format(), this;
  }
  format() {
    let t = this.auth || "";
    t && (t = ga(t, Lp, Vr), t += "@");
    let r = this.protocol || "", n = this.pathname || "", o = this.hash || "", s = "", u = "";
    this.host ? s = t + this.host : this.hostname && (s = t + (this.hostname.includes(":") && !ko(this.hostname) ? "[" + this.hostname + "]" : this.hostname), this.port && (s += ":" + this.port)), this.query !== null && typeof this.query == "object" && (u = hp(this.query));
    let c = this.search || u && "?" + u || "";
    r && r.charCodeAt(r.length - 1) !== 58 && (r += ":");
    let i = "", p = 0;
    for (let f = 0; f < n.length; ++f) switch (n.charCodeAt(f)) {
      case 35:
        f - p > 0 && (i += n.slice(p, f)), i += "%23", p = f + 1;
        break;
      case 63:
        f - p > 0 && (i += n.slice(p, f)), i += "%3F", p = f + 1;
        break;
    }
    return p > 0 && (p === n.length ? n = i : n = i + n.slice(p)), (this.slashes || Me.has(r)) && (this.slashes || s ? (n && n.charCodeAt(0) !== 47 && (n = "/" + n), s = "//" + s) : r.length >= 4 && r.charCodeAt(0) === 102 && r.charCodeAt(1) === 105 && r.charCodeAt(2) === 108 && r.charCodeAt(3) === 101 && (s = "//")), c = c.replace(/#/g, "%23"), o && o.charCodeAt(0) !== 35 && (o = "#" + o), c && c.charCodeAt(0) !== 63 && (c = "?" + c), r + s + n + c + o;
  }
  resolve(t) {
    return this.resolveObject(wt(t, false, true)).format();
  }
  resolveObject(t) {
    if (typeof t == "string") {
      let b = new Sr();
      b.parse(t, false, true), t = b;
    }
    let r = new Sr();
    if (Object.assign(r, this), r.hash = t.hash, t.href === "") return r.href = r.format(), r;
    if (t.slashes && !t.protocol) {
      let b = Object.keys(t).reduce((l, y) => (y !== "protocol" && (l[y] = t[y]), l), {});
      return Object.assign(r, b), Me.has(r.protocol) && r.hostname && !r.pathname && (r.path = r.pathname = "/"), r.href = r.format(), r;
    }
    if (t.protocol && t.protocol !== r.protocol) {
      if (!Me.has(t.protocol)) return Object.assign(r, t), r.href = r.format(), r;
      if (r.protocol = t.protocol, !t.host && !/^file:?$/.test(t.protocol) && !dr.has(t.protocol)) {
        let b = (t.pathname || "").split("/");
        for (; b.length > 0 && !(t.host = b.shift()); ) ;
        t.host || (t.host = ""), t.hostname || (t.hostname = ""), b[0] !== "" && b.unshift(""), b.length < 2 && b.unshift(""), r.pathname = b.join("/");
      } else r.pathname = t.pathname;
      if (r.search = t.search, r.query = t.query, r.host = t.host || "", r.auth = t.auth, r.hostname = t.hostname || t.host, r.port = t.port, r.pathname || r.search) {
        let b = r.pathname || "", l = r.search || "";
        r.path = b + l;
      }
      return r.slashes = r.slashes || t.slashes, r.href = r.format(), r;
    }
    let n = r.pathname && r.pathname.charAt(0) === "/", o = t.host || t.pathname && t.pathname.charAt(0) === "/", s = o || n || r.host && t.pathname, u = s, c = r.pathname && r.pathname.split("/") || [], i = t.pathname && t.pathname.split("/") || [], p = r.protocol && !Me.has(r.protocol);
    if (p && (r.hostname = "", r.port = null, r.host && (c[0] === "" ? c[0] = r.host : c.unshift(r.host)), r.host = "", t.protocol && (t.hostname = null, t.port = null, r.auth = null, t.host && (i[0] === "" ? i[0] = t.host : i.unshift(t.host)), t.host = null), s = s && (i[0] === "" || c[0] === "")), o) (t.host || t.host === "") && (r.host !== t.host && (r.auth = null), r.host = t.host, r.port = t.port), (t.hostname || t.hostname === "") && (r.hostname !== t.hostname && (r.auth = null), r.hostname = t.hostname), r.search = t.search, r.query = t.query, c = i;
    else if (i.length > 0) c || (c = []), c.pop(), c = c.concat(i), r.search = t.search, r.query = t.query;
    else if (t.search !== null && t.search !== void 0) {
      if (p) {
        r.hostname = r.host = c.shift();
        let b = r.host && r.host.indexOf("@") > 0 && r.host.split("@");
        b && (r.auth = b.shift(), r.host = r.hostname = b.shift());
      }
      return r.search = t.search, r.query = t.query, (r.pathname !== null || r.search !== null) && (r.path = (r.pathname ? r.pathname : "") + (r.search ? r.search : "")), r.href = r.format(), r;
    }
    if (c.length === 0) return r.pathname = null, r.search ? r.path = "/" + r.search : r.path = null, r.href = r.format(), r;
    let f = c.at(-1), a = (r.host || t.host || c.length > 1) && (f === "." || f === "..") || f === "", d = 0;
    for (let b = c.length - 1; b >= 0; b--) f = c[b], f === "." ? hr(c, b) : f === ".." ? (hr(c, b), d++) : d && (hr(c, b), d--);
    if (!s && !u) for (; d--; ) c.unshift("..");
    s && c[0] !== "" && (!c[0] || c[0].charAt(0) !== "/") && c.unshift(""), a && c.join("/").slice(-1) !== "/" && c.push("");
    let h = c[0] === "" || c[0] && c[0].charAt(0) === "/";
    if (p) {
      r.hostname = r.host = h ? "" : c.length > 0 ? c.shift() : "";
      let b = r.host && r.host.indexOf("@") > 0 ? r.host.split("@") : false;
      b && (r.auth = b.shift(), r.host = r.hostname = b.shift());
    }
    return s = s || r.host && c.length, s && !h && c.unshift(""), c.length === 0 ? (r.pathname = null, r.path = null) : r.pathname = c.join("/"), (r.pathname !== null || r.search !== null) && (r.path = (r.pathname ? r.pathname : "") + (r.search ? r.search : "")), r.auth = t.auth || r.auth, r.slashes = r.slashes || t.slashes, r.href = r.format(), r;
  }
  parseHost() {
    let t = this.host, r = Cp.exec(t);
    if (r) {
      let n = r[0];
      n !== ":" && (this.port = n.slice(1)), t = t.slice(0, t.length - n.length);
    }
    t && (this.hostname = t);
  }
}, Ap = /^[\d+.a-z-]+:/i, Cp = /:\d*$/, Ip = /^\/\/[^/@]+@[^/@]+/, Rp = /^(\/\/?(?!\/)[^\s?]*)(\?\S*)?$/, Dp = /[\0\t\n\r #%/:<>?@[\\\]^|]/, Mp = /[\0\t\n\r #%/<>?@\\^|]/, Lp = new Int8Array([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0]), Fp = ["", "", "", "", "", "", "", "", "", "%09", "%0A", "", "", "%0D", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "%20", "", "%22", "", "", "", "", "%27", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "%3C", "", "%3E", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "%5C", "", "%5E", "", "%60", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "%7B", "%7C", "%7D"], Up = 255, jo = false;
function wt(e, t, r) {
  if (jo || (jo = true, console.warn("[DeprecationWarning] [unenv] [node:url] DEP0169: `url.parse()` behavior is not standardized and prone to errors that have security implications. Use the WHATWG URL API instead. CVEs are not issued for `url.parse()` vulnerabilities.")), e instanceof bt) return e;
  let n = new bt();
  return n.parse(e, t, r), n;
}
function ko(e) {
  return String.prototype.charCodeAt.call(e, 0) === 91 && String.prototype.charCodeAt.call(e, e.length - 1) === 93;
}
var Eo = true;
function Np(e, t, r, n) {
  for (let o = 0; o < r.length; ++o) {
    let s = r.charCodeAt(o);
    if (!(s !== 47 && s !== 92 && s !== 35 && s !== 63 && s !== 58)) return Eo && s === 58 && (console.warn(`[DeprecationWarning] [unenv] [node:url] DEP0170: The URL ${n} is invalid. Future versions of Node.js will throw an error.`), Eo = false), e.hostname = r.slice(0, o), `/${r.slice(o)}${t}`;
  }
  return t;
}
function Bp(e) {
  let t = "", r = 0;
  for (let n = 0; n < e.length; ++n) {
    let o = Fp[e.charCodeAt(n)];
    o && (n > r && (t += e.slice(r, n)), t += o, r = n + 1);
  }
  return r === 0 ? e : (r < e.length && (t += e.slice(r)), t);
}
function wa(e, t) {
  if (typeof e == "string") e = wt(e);
  else {
    if (typeof e != "object" || e === null) throw new Kr("urlObject", ["Object", "string"], e);
    if (e instanceof Wt) {
      let r = true, n = false, o = true, s = true;
      t && (t.fragment != null && (r = !!t.fragment), t.unicode != null && (n = !!t.unicode), t.search != null && (o = !!t.search), t.auth != null && (s = !!t.auth));
      let u = new Wt(e.href);
      return r || (u.hash = ""), o || (u.search = ""), s || (u.username = u.password = ""), n ? bt.prototype.format.call(u) : u.href;
    }
  }
  return bt.prototype.format.call(e);
}
function Oa(e, t) {
  return wt(e, false, true).resolve(t);
}
function $a(e, t) {
  return e ? wt(e, false, true).resolveObject(t) : t;
}
function xa(e, t) {
  return Op(e, t);
}
var Wt = globalThis.URL, _a = globalThis.URLSearchParams, Sa = Hr, Pa = ya, qp = { Url: bt, parse: wt, resolve: Oa, resolveObject: $a, format: wa, URL: Wt, URLSearchParams: _a, domainToASCII: Sa, domainToUnicode: Pa, pathToFileURL: xa, fileURLToPath: ma, urlToHttpOptions: ba };
const ja = Object.freeze(Object.defineProperty({ __proto__: null, URL: Wt, URLSearchParams: _a, Url: bt, default: qp, domainToASCII: Sa, domainToUnicode: Pa, fileURLToPath: ma, format: wa, parse: wt, pathToFileURL: xa, resolve: Oa, resolveObject: $a, urlToHttpOptions: ba }, Symbol.toStringTag, { value: "Module" }));
var zp = Object.create, ka = Object.defineProperty, Wp = Object.getOwnPropertyDescriptor, Gp = Object.getOwnPropertyNames, Yp = Object.getPrototypeOf, Hp = Object.prototype.hasOwnProperty, Vp = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Kp = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Gp(t)) !Hp.call(e, o) && o !== r && ka(e, o, { get: () => t[o], enumerable: !(n = Wp(t, o)) || n.enumerable });
  return e;
}, Qp = (e, t, r) => (r = e != null ? zp(Yp(e)) : {}, Kp(!e || !e.__esModule ? ka(r, "default", { value: e, enumerable: true }) : r, e)), Jp = Vp((e, t) => {
  var r = String, n = function() {
    return { isColorSupported: false, reset: r, bold: r, dim: r, italic: r, underline: r, inverse: r, hidden: r, strikethrough: r, black: r, red: r, green: r, yellow: r, blue: r, magenta: r, cyan: r, white: r, gray: r, bgBlack: r, bgRed: r, bgGreen: r, bgYellow: r, bgBlue: r, bgMagenta: r, bgCyan: r, bgWhite: r, blackBright: r, redBright: r, greenBright: r, yellowBright: r, blueBright: r, magentaBright: r, cyanBright: r, whiteBright: r, bgBlackBright: r, bgRedBright: r, bgGreenBright: r, bgYellowBright: r, bgBlueBright: r, bgMagentaBright: r, bgCyanBright: r, bgWhiteBright: r };
  };
  t.exports = n(), t.exports.createColors = n;
}), Pr = Qp(Jp()), { isColorSupported: Xp, reset: Zp, bold: eh, dim: th, italic: rh, underline: oh, inverse: nh, hidden: sh, strikethrough: ih, black: ah, red: lh, green: uh, yellow: ch, blue: fh, magenta: ph, cyan: hh, white: dh, gray: yh, bgBlack: gh, bgRed: mh, bgGreen: bh, bgYellow: vh, bgBlue: wh, bgMagenta: Oh, bgCyan: $h, bgWhite: xh, blackBright: _h, redBright: Sh, greenBright: Ph, yellowBright: jh, blueBright: kh, magentaBright: Eh, cyanBright: Th, whiteBright: Ah, bgBlackBright: Ch, bgRedBright: Ih, bgGreenBright: Rh, bgYellowBright: Dh, bgBlueBright: Mh, bgMagentaBright: Lh, bgCyanBright: Fh, bgWhiteBright: Uh, createColors: Nh } = Pr, Se = Pr.default ?? Pr;
const Ea = Object.freeze(Object.defineProperty({ __proto__: null, bgBlack: gh, bgBlackBright: Ch, bgBlue: wh, bgBlueBright: Mh, bgCyan: $h, bgCyanBright: Fh, bgGreen: bh, bgGreenBright: Rh, bgMagenta: Oh, bgMagentaBright: Lh, bgRed: mh, bgRedBright: Ih, bgWhite: xh, bgWhiteBright: Uh, bgYellow: vh, bgYellowBright: Dh, black: ah, blackBright: _h, blue: fh, blueBright: kh, bold: eh, createColors: Nh, cyan: hh, cyanBright: Th, default: Se, dim: th, gray: yh, green: uh, greenBright: Ph, hidden: sh, inverse: nh, isColorSupported: Xp, italic: rh, magenta: ph, magentaBright: Eh, red: lh, redBright: Sh, reset: Zp, strikethrough: ih, underline: oh, white: dh, whiteBright: Ah, yellow: ch, yellowBright: jh }, Symbol.toStringTag, { value: "Module" }));
var Bh = Object.create, Ta = Object.defineProperty, qh = Object.getOwnPropertyDescriptor, zh = Object.getOwnPropertyNames, Wh = Object.getPrototypeOf, Gh = Object.prototype.hasOwnProperty, Yh = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Hh = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of zh(t)) !Gh.call(e, o) && o !== r && Ta(e, o, { get: () => t[o], enumerable: !(n = qh(t, o)) || n.enumerable });
  return e;
}, Vh = (e, t, r) => (r = e != null ? Bh(Wh(e)) : {}, Hh(!e || !e.__esModule ? Ta(r, "default", { value: e, enumerable: true }) : r, e)), Kh = Yh((e, t) => {
  var r = /[\t\n\f\r "#'()/;[\\\]{}]/g, n = /[\t\n\f\r !"#'():;@[\\\]{}]|\/(?=\*)/g, o = /.[\r\n"'(/\\]/, s = /[\da-f]/i;
  t.exports = function(u, c = {}) {
    let i = u.css.valueOf(), p = c.ignoreErrors, f, a, d, h, b, l, y, m, g, $, O = i.length, v = 0, w = [], _ = [];
    function x() {
      return v;
    }
    function S(q) {
      throw u.error("Unclosed " + q, v);
    }
    function j() {
      return _.length === 0 && v >= O;
    }
    function A(q) {
      if (_.length) return _.pop();
      if (v >= O) return;
      let D = q ? q.ignoreUnclosed : false;
      switch (f = i.charCodeAt(v), f) {
        case 10:
        case 32:
        case 9:
        case 13:
        case 12: {
          h = v;
          do
            h += 1, f = i.charCodeAt(h);
          while (f === 32 || f === 10 || f === 9 || f === 13 || f === 12);
          l = ["space", i.slice(v, h)], v = h - 1;
          break;
        }
        case 91:
        case 93:
        case 123:
        case 125:
        case 58:
        case 59:
        case 41: {
          let ee = String.fromCharCode(f);
          l = [ee, ee, v];
          break;
        }
        case 40: {
          if ($ = w.length ? w.pop()[1] : "", g = i.charCodeAt(v + 1), $ === "url" && g !== 39 && g !== 34 && g !== 32 && g !== 10 && g !== 9 && g !== 12 && g !== 13) {
            h = v;
            do {
              if (y = false, h = i.indexOf(")", h + 1), h === -1) if (p || D) {
                h = v;
                break;
              } else S("bracket");
              for (m = h; i.charCodeAt(m - 1) === 92; ) m -= 1, y = !y;
            } while (y);
            l = ["brackets", i.slice(v, h + 1), v, h], v = h;
          } else h = i.indexOf(")", v + 1), a = i.slice(v, h + 1), h === -1 || o.test(a) ? l = ["(", "(", v] : (l = ["brackets", a, v, h], v = h);
          break;
        }
        case 39:
        case 34: {
          b = f === 39 ? "'" : '"', h = v;
          do {
            if (y = false, h = i.indexOf(b, h + 1), h === -1) if (p || D) {
              h = v + 1;
              break;
            } else S("string");
            for (m = h; i.charCodeAt(m - 1) === 92; ) m -= 1, y = !y;
          } while (y);
          l = ["string", i.slice(v, h + 1), v, h], v = h;
          break;
        }
        case 64: {
          r.lastIndex = v + 1, r.test(i), r.lastIndex === 0 ? h = i.length - 1 : h = r.lastIndex - 2, l = ["at-word", i.slice(v, h + 1), v, h], v = h;
          break;
        }
        case 92: {
          for (h = v, d = true; i.charCodeAt(h + 1) === 92; ) h += 1, d = !d;
          if (f = i.charCodeAt(h + 1), d && f !== 47 && f !== 32 && f !== 10 && f !== 9 && f !== 13 && f !== 12 && (h += 1, s.test(i.charAt(h)))) {
            for (; s.test(i.charAt(h + 1)); ) h += 1;
            i.charCodeAt(h + 1) === 32 && (h += 1);
          }
          l = ["word", i.slice(v, h + 1), v, h], v = h;
          break;
        }
        default: {
          f === 47 && i.charCodeAt(v + 1) === 42 ? (h = i.indexOf("*/", v + 2) + 1, h === 0 && (p || D ? h = i.length : S("comment")), l = ["comment", i.slice(v, h + 1), v, h], v = h) : (n.lastIndex = v + 1, n.test(i), n.lastIndex === 0 ? h = i.length - 1 : h = n.lastIndex - 2, l = ["word", i.slice(v, h + 1), v, h], w.push(l), v = h);
          break;
        }
      }
      return v++, l;
    }
    function M(q) {
      _.push(q);
    }
    return { back: M, endOfFile: j, nextToken: A, position: x };
  };
}), To = Vh(Kh()), Qh = To.default ?? To;
const Aa = Object.freeze(Object.defineProperty({ __proto__: null, default: Qh }, Symbol.toStringTag, { value: "Module" }));
var Le = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "picocolors":
      return t(Ea);
    case "postcss/lib/tokenize":
      return t(Aa);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Jh = Object.create, Ca = Object.defineProperty, Xh = Object.getOwnPropertyDescriptor, Zh = Object.getOwnPropertyNames, ed = Object.getPrototypeOf, td = Object.prototype.hasOwnProperty, Ao = ((e) => typeof Le < "u" ? Le : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Le < "u" ? Le : t)[r] }) : e)(function(e) {
  if (typeof Le < "u") return Le.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), rd = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), od = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Zh(t)) !td.call(e, o) && o !== r && Ca(e, o, { get: () => t[o], enumerable: !(n = Xh(t, o)) || n.enumerable });
  return e;
}, nd = (e, t, r) => (r = e != null ? Jh(ed(e)) : {}, od(!e || !e.__esModule ? Ca(r, "default", { value: e, enumerable: true }) : r, e)), sd = rd((e, t) => {
  var r = Ao("picocolors"), n = Ao("postcss/lib/tokenize"), o;
  function s(p) {
    o = p;
  }
  var u = { ";": r.yellow, ":": r.yellow, "(": r.cyan, ")": r.cyan, "[": r.yellow, "]": r.yellow, "{": r.yellow, "}": r.yellow, "at-word": r.cyan, brackets: r.cyan, call: r.cyan, class: r.yellow, comment: r.gray, hash: r.magenta, string: r.green };
  function c([p, f], a) {
    if (p === "word") {
      if (f[0] === ".") return "class";
      if (f[0] === "#") return "hash";
    }
    if (!a.endOfFile()) {
      let d = a.nextToken();
      if (a.back(d), d[0] === "brackets" || d[0] === "(") return "call";
    }
    return p;
  }
  function i(p) {
    let f = n(new o(p), { ignoreErrors: true }), a = "";
    for (; !f.endOfFile(); ) {
      let d = f.nextToken(), h = u[c(d, f)];
      h ? a += d[1].split(/\r?\n/).map((b) => h(b)).join(`
`) : a += d[1];
    }
    return a;
  }
  i.registerInput = s, t.exports = i;
}), jr = nd(sd()), { registerInput: id } = jr, ad = jr.default ?? jr;
const Ia = Object.freeze(Object.defineProperty({ __proto__: null, default: ad, registerInput: id }, Symbol.toStringTag, { value: "Module" }));
var Fe = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "picocolors":
      return t(Ea);
    case "postcss/lib/terminal-highlight":
      return t(Ia);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, ld = Object.create, Ra = Object.defineProperty, ud = Object.getOwnPropertyDescriptor, cd = Object.getOwnPropertyNames, fd = Object.getPrototypeOf, pd = Object.prototype.hasOwnProperty, Co = ((e) => typeof Fe < "u" ? Fe : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Fe < "u" ? Fe : t)[r] }) : e)(function(e) {
  if (typeof Fe < "u") return Fe.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), hd = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), dd = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of cd(t)) !pd.call(e, o) && o !== r && Ra(e, o, { get: () => t[o], enumerable: !(n = ud(t, o)) || n.enumerable });
  return e;
}, yd = (e, t, r) => (r = e != null ? ld(fd(e)) : {}, dd(!e || !e.__esModule ? Ra(r, "default", { value: e, enumerable: true }) : r, e)), gd = hd((e, t) => {
  var r = Co("picocolors"), n = Co("postcss/lib/terminal-highlight"), o = class Da extends Error {
    constructor(u, c, i, p, f, a) {
      super(u), this.name = "CssSyntaxError", this.reason = u, f && (this.file = f), p && (this.source = p), a && (this.plugin = a), typeof c < "u" && typeof i < "u" && (typeof c == "number" ? (this.line = c, this.column = i) : (this.line = c.line, this.column = c.column, this.endLine = i.line, this.endColumn = i.column)), this.setMessage(), Error.captureStackTrace && Error.captureStackTrace(this, Da);
    }
    setMessage() {
      this.message = this.plugin ? this.plugin + ": " : "", this.message += this.file ? this.file : "<css input>", typeof this.line < "u" && (this.message += ":" + this.line + ":" + this.column), this.message += ": " + this.reason;
    }
    showSourceCode(u) {
      if (!this.source) return "";
      let c = this.source;
      u == null && (u = r.isColorSupported);
      let i = (l) => l, p = (l) => l, f = (l) => l;
      if (u) {
        let { bold: l, gray: y, red: m } = r.createColors(true);
        p = (g) => l(m(g)), i = (g) => y(g), n && (f = (g) => n(g));
      }
      let a = c.split(/\r?\n/), d = Math.max(this.line - 3, 0), h = Math.min(this.line + 2, a.length), b = String(h).length;
      return a.slice(d, h).map((l, y) => {
        let m = d + 1 + y, g = " " + (" " + m).slice(-b) + " | ";
        if (m === this.line) {
          if (l.length > 160) {
            let O = 20, v = Math.max(0, this.column - O), w = Math.max(this.column + O, this.endColumn + O), _ = l.slice(v, w), x = i(g.replace(/\d/g, " ")) + l.slice(0, Math.min(this.column - 1, O - 1)).replace(/[^\t]/g, " ");
            return p(">") + i(g) + f(_) + `
 ` + x + p("^");
          }
          let $ = i(g.replace(/\d/g, " ")) + l.slice(0, this.column - 1).replace(/[^\t]/g, " ");
          return p(">") + i(g) + f(l) + `
 ` + $ + p("^");
        }
        return " " + i(g) + f(l);
      }).join(`
`);
    }
    toString() {
      let u = this.showSourceCode();
      return u && (u = `

` + u + `
`), this.name + ": " + this.message + u;
    }
  };
  t.exports = o, o.default = o;
}), Io = yd(gd()), md = Io.default ?? Io;
const Qr = Object.freeze(Object.defineProperty({ __proto__: null, default: md }, Symbol.toStringTag, { value: "Module" }));
var bd = Object.create, Ma = Object.defineProperty, vd = Object.getOwnPropertyDescriptor, wd = Object.getOwnPropertyNames, Od = Object.getPrototypeOf, $d = Object.prototype.hasOwnProperty, xd = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), _d = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of wd(t)) !$d.call(e, o) && o !== r && Ma(e, o, { get: () => t[o], enumerable: !(n = vd(t, o)) || n.enumerable });
  return e;
}, Sd = (e, t, r) => (r = e != null ? bd(Od(e)) : {}, _d(!e || !e.__esModule ? Ma(r, "default", { value: e, enumerable: true }) : r, e)), Pd = xd((e, t) => {
  var r = { after: `
`, beforeClose: `
`, beforeComment: `
`, beforeDecl: `
`, beforeOpen: " ", beforeRule: `
`, colon: ": ", commentLeft: " ", commentRight: " ", emptyBody: "", indent: "    ", semicolon: false };
  function n(s) {
    return s[0].toUpperCase() + s.slice(1);
  }
  var o = class {
    constructor(s) {
      this.builder = s;
    }
    atrule(s, u) {
      let c = "@" + s.name, i = s.params ? this.rawValue(s, "params") : "";
      if (typeof s.raws.afterName < "u" ? c += s.raws.afterName : i && (c += " "), s.nodes) this.block(s, c + i);
      else {
        let p = (s.raws.between || "") + (u ? ";" : "");
        this.builder(c + i + p, s);
      }
    }
    beforeAfter(s, u) {
      let c;
      s.type === "decl" ? c = this.raw(s, null, "beforeDecl") : s.type === "comment" ? c = this.raw(s, null, "beforeComment") : u === "before" ? c = this.raw(s, null, "beforeRule") : c = this.raw(s, null, "beforeClose");
      let i = s.parent, p = 0;
      for (; i && i.type !== "root"; ) p += 1, i = i.parent;
      if (c.includes(`
`)) {
        let f = this.raw(s, null, "indent");
        if (f.length) for (let a = 0; a < p; a++) c += f;
      }
      return c;
    }
    block(s, u) {
      let c = this.raw(s, "between", "beforeOpen");
      this.builder(u + c + "{", s, "start");
      let i;
      s.nodes && s.nodes.length ? (this.body(s), i = this.raw(s, "after")) : i = this.raw(s, "after", "emptyBody"), i && this.builder(i), this.builder("}", s, "end");
    }
    body(s) {
      let u = s.nodes.length - 1;
      for (; u > 0 && s.nodes[u].type === "comment"; ) u -= 1;
      let c = this.raw(s, "semicolon");
      for (let i = 0; i < s.nodes.length; i++) {
        let p = s.nodes[i], f = this.raw(p, "before");
        f && this.builder(f), this.stringify(p, u !== i || c);
      }
    }
    comment(s) {
      let u = this.raw(s, "left", "commentLeft"), c = this.raw(s, "right", "commentRight");
      this.builder("/*" + u + s.text + c + "*/", s);
    }
    decl(s, u) {
      let c = this.raw(s, "between", "colon"), i = s.prop + c + this.rawValue(s, "value");
      s.important && (i += s.raws.important || " !important"), u && (i += ";"), this.builder(i, s);
    }
    document(s) {
      this.body(s);
    }
    raw(s, u, c) {
      let i;
      if (c || (c = u), u && (i = s.raws[u], typeof i < "u")) return i;
      let p = s.parent;
      if (c === "before" && (!p || p.type === "root" && p.first === s || p && p.type === "document")) return "";
      if (!p) return r[c];
      let f = s.root();
      if (f.rawCache || (f.rawCache = {}), typeof f.rawCache[c] < "u") return f.rawCache[c];
      if (c === "before" || c === "after") return this.beforeAfter(s, c);
      {
        let a = "raw" + n(c);
        this[a] ? i = this[a](f, s) : f.walk((d) => {
          if (i = d.raws[u], typeof i < "u") return false;
        });
      }
      return typeof i > "u" && (i = r[c]), f.rawCache[c] = i, i;
    }
    rawBeforeClose(s) {
      let u;
      return s.walk((c) => {
        if (c.nodes && c.nodes.length > 0 && typeof c.raws.after < "u") return u = c.raws.after, u.includes(`
`) && (u = u.replace(/[^\n]+$/, "")), false;
      }), u && (u = u.replace(/\S/g, "")), u;
    }
    rawBeforeComment(s, u) {
      let c;
      return s.walkComments((i) => {
        if (typeof i.raws.before < "u") return c = i.raws.before, c.includes(`
`) && (c = c.replace(/[^\n]+$/, "")), false;
      }), typeof c > "u" ? c = this.raw(u, null, "beforeDecl") : c && (c = c.replace(/\S/g, "")), c;
    }
    rawBeforeDecl(s, u) {
      let c;
      return s.walkDecls((i) => {
        if (typeof i.raws.before < "u") return c = i.raws.before, c.includes(`
`) && (c = c.replace(/[^\n]+$/, "")), false;
      }), typeof c > "u" ? c = this.raw(u, null, "beforeRule") : c && (c = c.replace(/\S/g, "")), c;
    }
    rawBeforeOpen(s) {
      let u;
      return s.walk((c) => {
        if (c.type !== "decl" && (u = c.raws.between, typeof u < "u")) return false;
      }), u;
    }
    rawBeforeRule(s) {
      let u;
      return s.walk((c) => {
        if (c.nodes && (c.parent !== s || s.first !== c) && typeof c.raws.before < "u") return u = c.raws.before, u.includes(`
`) && (u = u.replace(/[^\n]+$/, "")), false;
      }), u && (u = u.replace(/\S/g, "")), u;
    }
    rawColon(s) {
      let u;
      return s.walkDecls((c) => {
        if (typeof c.raws.between < "u") return u = c.raws.between.replace(/[^\s:]/g, ""), false;
      }), u;
    }
    rawEmptyBody(s) {
      let u;
      return s.walk((c) => {
        if (c.nodes && c.nodes.length === 0 && (u = c.raws.after, typeof u < "u")) return false;
      }), u;
    }
    rawIndent(s) {
      if (s.raws.indent) return s.raws.indent;
      let u;
      return s.walk((c) => {
        let i = c.parent;
        if (i && i !== s && i.parent && i.parent === s && typeof c.raws.before < "u") {
          let p = c.raws.before.split(`
`);
          return u = p[p.length - 1], u = u.replace(/\S/g, ""), false;
        }
      }), u;
    }
    rawSemicolon(s) {
      let u;
      return s.walk((c) => {
        if (c.nodes && c.nodes.length && c.last.type === "decl" && (u = c.raws.semicolon, typeof u < "u")) return false;
      }), u;
    }
    rawValue(s, u) {
      let c = s[u], i = s.raws[u];
      return i && i.value === c ? i.raw : c;
    }
    root(s) {
      this.body(s), s.raws.after && this.builder(s.raws.after);
    }
    rule(s) {
      this.block(s, this.rawValue(s, "selector")), s.raws.ownSemicolon && this.builder(s.raws.ownSemicolon, s, "end");
    }
    stringify(s, u) {
      if (!this[s.type]) throw new Error("Unknown AST node type " + s.type + ". Maybe you need to change PostCSS stringifier.");
      this[s.type](s, u);
    }
  };
  t.exports = o, o.default = o;
}), Ro = Sd(Pd()), jd = Ro.default ?? Ro;
const La = Object.freeze(Object.defineProperty({ __proto__: null, default: jd }, Symbol.toStringTag, { value: "Module" }));
var Ue = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/stringifier":
      return t(La);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, kd = Object.create, Fa = Object.defineProperty, Ed = Object.getOwnPropertyDescriptor, Td = Object.getOwnPropertyNames, Ad = Object.getPrototypeOf, Cd = Object.prototype.hasOwnProperty, Id = ((e) => typeof Ue < "u" ? Ue : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Ue < "u" ? Ue : t)[r] }) : e)(function(e) {
  if (typeof Ue < "u") return Ue.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Rd = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Dd = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Td(t)) !Cd.call(e, o) && o !== r && Fa(e, o, { get: () => t[o], enumerable: !(n = Ed(t, o)) || n.enumerable });
  return e;
}, Md = (e, t, r) => (r = e != null ? kd(Ad(e)) : {}, Dd(!e || !e.__esModule ? Fa(r, "default", { value: e, enumerable: true }) : r, e)), Ld = Rd((e, t) => {
  var r = Id("postcss/lib/stringifier");
  function n(o, s) {
    new r(s).stringify(o);
  }
  t.exports = n, n.default = n;
}), Do = Md(Ld()), Fd = Do.default ?? Do;
const Xt = Object.freeze(Object.defineProperty({ __proto__: null, default: Fd }, Symbol.toStringTag, { value: "Module" }));
var Ud = Object.create, Ua = Object.defineProperty, Nd = Object.getOwnPropertyDescriptor, Bd = Object.getOwnPropertyNames, qd = Object.getPrototypeOf, zd = Object.prototype.hasOwnProperty, Wd = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Gd = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Bd(t)) !zd.call(e, o) && o !== r && Ua(e, o, { get: () => t[o], enumerable: !(n = Nd(t, o)) || n.enumerable });
  return e;
}, Yd = (e, t, r) => (r = e != null ? Ud(qd(e)) : {}, Gd(!e || !e.__esModule ? Ua(r, "default", { value: e, enumerable: true }) : r, e)), Hd = Wd((e, t) => {
  t.exports.isClean = Symbol("isClean"), t.exports.my = Symbol("my");
}), kr = Yd(Hd()), { isClean: Vd, my: Kd } = kr, Qd = kr.default ?? kr;
const Jr = Object.freeze(Object.defineProperty({ __proto__: null, default: Qd, isClean: Vd, my: Kd }, Symbol.toStringTag, { value: "Module" }));
var Ne = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/css-syntax-error":
      return t(Qr);
    case "postcss/lib/stringifier":
      return t(La);
    case "postcss/lib/stringify":
      return t(Xt);
    case "postcss/lib/symbols":
      return t(Jr);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Jd = Object.create, Na = Object.defineProperty, Xd = Object.getOwnPropertyDescriptor, Zd = Object.getOwnPropertyNames, e0 = Object.getPrototypeOf, t0 = Object.prototype.hasOwnProperty, Lt = ((e) => typeof Ne < "u" ? Ne : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Ne < "u" ? Ne : t)[r] }) : e)(function(e) {
  if (typeof Ne < "u") return Ne.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), r0 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), o0 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Zd(t)) !t0.call(e, o) && o !== r && Na(e, o, { get: () => t[o], enumerable: !(n = Xd(t, o)) || n.enumerable });
  return e;
}, n0 = (e, t, r) => (r = e != null ? Jd(e0(e)) : {}, o0(!e || !e.__esModule ? Na(r, "default", { value: e, enumerable: true }) : r, e)), s0 = r0((e, t) => {
  var r = Lt("postcss/lib/css-syntax-error"), n = Lt("postcss/lib/stringifier"), o = Lt("postcss/lib/stringify"), { isClean: s, my: u } = Lt("postcss/lib/symbols");
  function c(f, a) {
    let d = new f.constructor();
    for (let h in f) {
      if (!Object.prototype.hasOwnProperty.call(f, h) || h === "proxyCache") continue;
      let b = f[h], l = typeof b;
      h === "parent" && l === "object" ? a && (d[h] = a) : h === "source" ? d[h] = b : Array.isArray(b) ? d[h] = b.map((y) => c(y, d)) : (l === "object" && b !== null && (b = c(b)), d[h] = b);
    }
    return d;
  }
  function i(f, a) {
    if (a && typeof a.offset < "u") return a.offset;
    let d = 1, h = 1, b = 0;
    for (let l = 0; l < f.length; l++) {
      if (h === a.line && d === a.column) {
        b = l;
        break;
      }
      f[l] === `
` ? (d = 1, h += 1) : d += 1;
    }
    return b;
  }
  var p = class {
    get proxyOf() {
      return this;
    }
    constructor(f = {}) {
      this.raws = {}, this[s] = false, this[u] = true;
      for (let a in f) if (a === "nodes") {
        this.nodes = [];
        for (let d of f[a]) typeof d.clone == "function" ? this.append(d.clone()) : this.append(d);
      } else this[a] = f[a];
    }
    addToError(f) {
      if (f.postcssNode = this, f.stack && this.source && /\n\s{4}at /.test(f.stack)) {
        let a = this.source;
        f.stack = f.stack.replace(/\n\s{4}at /, `$&${a.input.from}:${a.start.line}:${a.start.column}$&`);
      }
      return f;
    }
    after(f) {
      return this.parent.insertAfter(this, f), this;
    }
    assign(f = {}) {
      for (let a in f) this[a] = f[a];
      return this;
    }
    before(f) {
      return this.parent.insertBefore(this, f), this;
    }
    cleanRaws(f) {
      delete this.raws.before, delete this.raws.after, f || delete this.raws.between;
    }
    clone(f = {}) {
      let a = c(this);
      for (let d in f) a[d] = f[d];
      return a;
    }
    cloneAfter(f = {}) {
      let a = this.clone(f);
      return this.parent.insertAfter(this, a), a;
    }
    cloneBefore(f = {}) {
      let a = this.clone(f);
      return this.parent.insertBefore(this, a), a;
    }
    error(f, a = {}) {
      if (this.source) {
        let { end: d, start: h } = this.rangeBy(a);
        return this.source.input.error(f, { column: h.column, line: h.line }, { column: d.column, line: d.line }, a);
      }
      return new r(f);
    }
    getProxyProcessor() {
      return { get(f, a) {
        return a === "proxyOf" ? f : a === "root" ? () => f.root().toProxy() : f[a];
      }, set(f, a, d) {
        return f[a] === d || (f[a] = d, (a === "prop" || a === "value" || a === "name" || a === "params" || a === "important" || a === "text") && f.markDirty()), true;
      } };
    }
    markClean() {
      this[s] = true;
    }
    markDirty() {
      if (this[s]) {
        this[s] = false;
        let f = this;
        for (; f = f.parent; ) f[s] = false;
      }
    }
    next() {
      if (!this.parent) return;
      let f = this.parent.index(this);
      return this.parent.nodes[f + 1];
    }
    positionBy(f) {
      let a = this.source.start;
      if (f.index) a = this.positionInside(f.index);
      else if (f.word) {
        let d = "document" in this.source.input ? this.source.input.document : this.source.input.css, h = d.slice(i(d, this.source.start), i(d, this.source.end)).indexOf(f.word);
        h !== -1 && (a = this.positionInside(h));
      }
      return a;
    }
    positionInside(f) {
      let a = this.source.start.column, d = this.source.start.line, h = "document" in this.source.input ? this.source.input.document : this.source.input.css, b = i(h, this.source.start), l = b + f;
      for (let y = b; y < l; y++) h[y] === `
` ? (a = 1, d += 1) : a += 1;
      return { column: a, line: d };
    }
    prev() {
      if (!this.parent) return;
      let f = this.parent.index(this);
      return this.parent.nodes[f - 1];
    }
    rangeBy(f) {
      let a = { column: this.source.start.column, line: this.source.start.line }, d = this.source.end ? { column: this.source.end.column + 1, line: this.source.end.line } : { column: a.column + 1, line: a.line };
      if (f.word) {
        let h = "document" in this.source.input ? this.source.input.document : this.source.input.css, b = h.slice(i(h, this.source.start), i(h, this.source.end)).indexOf(f.word);
        b !== -1 && (a = this.positionInside(b), d = this.positionInside(b + f.word.length));
      } else f.start ? a = { column: f.start.column, line: f.start.line } : f.index && (a = this.positionInside(f.index)), f.end ? d = { column: f.end.column, line: f.end.line } : typeof f.endIndex == "number" ? d = this.positionInside(f.endIndex) : f.index && (d = this.positionInside(f.index + 1));
      return (d.line < a.line || d.line === a.line && d.column <= a.column) && (d = { column: a.column + 1, line: a.line }), { end: d, start: a };
    }
    raw(f, a) {
      return new n().raw(this, f, a);
    }
    remove() {
      return this.parent && this.parent.removeChild(this), this.parent = void 0, this;
    }
    replaceWith(...f) {
      if (this.parent) {
        let a = this, d = false;
        for (let h of f) h === this ? d = true : d ? (this.parent.insertAfter(a, h), a = h) : this.parent.insertBefore(a, h);
        d || this.remove();
      }
      return this;
    }
    root() {
      let f = this;
      for (; f.parent && f.parent.type !== "document"; ) f = f.parent;
      return f;
    }
    toJSON(f, a) {
      let d = {}, h = a == null;
      a = a || /* @__PURE__ */ new Map();
      let b = 0;
      for (let l in this) {
        if (!Object.prototype.hasOwnProperty.call(this, l) || l === "parent" || l === "proxyCache") continue;
        let y = this[l];
        if (Array.isArray(y)) d[l] = y.map((m) => typeof m == "object" && m.toJSON ? m.toJSON(null, a) : m);
        else if (typeof y == "object" && y.toJSON) d[l] = y.toJSON(null, a);
        else if (l === "source") {
          let m = a.get(y.input);
          m == null && (m = b, a.set(y.input, b), b++), d[l] = { end: y.end, inputId: m, start: y.start };
        } else d[l] = y;
      }
      return h && (d.inputs = [...a.keys()].map((l) => l.toJSON())), d;
    }
    toProxy() {
      return this.proxyCache || (this.proxyCache = new Proxy(this, this.getProxyProcessor())), this.proxyCache;
    }
    toString(f = o) {
      f.stringify && (f = f.stringify);
      let a = "";
      return f(this, (d) => {
        a += d;
      }), a;
    }
    warn(f, a, d) {
      let h = { node: this };
      for (let b in d) h[b] = d[b];
      return f.warn(a, h);
    }
  };
  t.exports = p, p.default = p;
}), Mo = n0(s0()), i0 = Mo.default ?? Mo;
const Zt = Object.freeze(Object.defineProperty({ __proto__: null, default: i0 }, Symbol.toStringTag, { value: "Module" }));
var Be = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/node":
      return t(Zt);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, a0 = Object.create, Ba = Object.defineProperty, l0 = Object.getOwnPropertyDescriptor, u0 = Object.getOwnPropertyNames, c0 = Object.getPrototypeOf, f0 = Object.prototype.hasOwnProperty, p0 = ((e) => typeof Be < "u" ? Be : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Be < "u" ? Be : t)[r] }) : e)(function(e) {
  if (typeof Be < "u") return Be.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), h0 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), d0 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of u0(t)) !f0.call(e, o) && o !== r && Ba(e, o, { get: () => t[o], enumerable: !(n = l0(t, o)) || n.enumerable });
  return e;
}, y0 = (e, t, r) => (r = e != null ? a0(c0(e)) : {}, d0(!e || !e.__esModule ? Ba(r, "default", { value: e, enumerable: true }) : r, e)), g0 = h0((e, t) => {
  var r = p0("postcss/lib/node"), n = class extends r {
    constructor(o) {
      super(o), this.type = "comment";
    }
  };
  t.exports = n, n.default = n;
}), Lo = y0(g0()), m0 = Lo.default ?? Lo;
const er = Object.freeze(Object.defineProperty({ __proto__: null, default: m0 }, Symbol.toStringTag, { value: "Module" }));
var qe = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/node":
      return t(Zt);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, b0 = Object.create, qa = Object.defineProperty, v0 = Object.getOwnPropertyDescriptor, w0 = Object.getOwnPropertyNames, O0 = Object.getPrototypeOf, $0 = Object.prototype.hasOwnProperty, x0 = ((e) => typeof qe < "u" ? qe : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof qe < "u" ? qe : t)[r] }) : e)(function(e) {
  if (typeof qe < "u") return qe.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), _0 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), S0 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of w0(t)) !$0.call(e, o) && o !== r && qa(e, o, { get: () => t[o], enumerable: !(n = v0(t, o)) || n.enumerable });
  return e;
}, P0 = (e, t, r) => (r = e != null ? b0(O0(e)) : {}, S0(!e || !e.__esModule ? qa(r, "default", { value: e, enumerable: true }) : r, e)), j0 = _0((e, t) => {
  var r = x0("postcss/lib/node"), n = class extends r {
    get variable() {
      return this.prop.startsWith("--") || this.prop[0] === "$";
    }
    constructor(o) {
      o && typeof o.value < "u" && typeof o.value != "string" && (o = { ...o, value: String(o.value) }), super(o), this.type = "decl";
    }
  };
  t.exports = n, n.default = n;
}), Fo = P0(j0()), k0 = Fo.default ?? Fo;
const tr = Object.freeze(Object.defineProperty({ __proto__: null, default: k0 }, Symbol.toStringTag, { value: "Module" }));
var ze = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/comment":
      return t(er);
    case "postcss/lib/declaration":
      return t(tr);
    case "postcss/lib/node":
      return t(Zt);
    case "postcss/lib/symbols":
      return t(Jr);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, E0 = Object.create, za = Object.defineProperty, T0 = Object.getOwnPropertyDescriptor, A0 = Object.getOwnPropertyNames, C0 = Object.getPrototypeOf, I0 = Object.prototype.hasOwnProperty, Ft = ((e) => typeof ze < "u" ? ze : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof ze < "u" ? ze : t)[r] }) : e)(function(e) {
  if (typeof ze < "u") return ze.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), R0 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), D0 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of A0(t)) !I0.call(e, o) && o !== r && za(e, o, { get: () => t[o], enumerable: !(n = T0(t, o)) || n.enumerable });
  return e;
}, M0 = (e, t, r) => (r = e != null ? E0(C0(e)) : {}, D0(!e || !e.__esModule ? za(r, "default", { value: e, enumerable: true }) : r, e)), L0 = R0((e, t) => {
  var r = Ft("postcss/lib/comment"), n = Ft("postcss/lib/declaration"), o = Ft("postcss/lib/node"), { isClean: s, my: u } = Ft("postcss/lib/symbols"), c, i, p, f;
  function a(b) {
    return b.map((l) => (l.nodes && (l.nodes = a(l.nodes)), delete l.source, l));
  }
  function d(b) {
    if (b[s] = false, b.proxyOf.nodes) for (let l of b.proxyOf.nodes) d(l);
  }
  var h = class Wa extends o {
    get first() {
      if (this.proxyOf.nodes) return this.proxyOf.nodes[0];
    }
    get last() {
      if (this.proxyOf.nodes) return this.proxyOf.nodes[this.proxyOf.nodes.length - 1];
    }
    append(...l) {
      for (let y of l) {
        let m = this.normalize(y, this.last);
        for (let g of m) this.proxyOf.nodes.push(g);
      }
      return this.markDirty(), this;
    }
    cleanRaws(l) {
      if (super.cleanRaws(l), this.nodes) for (let y of this.nodes) y.cleanRaws(l);
    }
    each(l) {
      if (!this.proxyOf.nodes) return;
      let y = this.getIterator(), m, g;
      for (; this.indexes[y] < this.proxyOf.nodes.length && (m = this.indexes[y], g = l(this.proxyOf.nodes[m], m), g !== false); ) this.indexes[y] += 1;
      return delete this.indexes[y], g;
    }
    every(l) {
      return this.nodes.every(l);
    }
    getIterator() {
      this.lastEach || (this.lastEach = 0), this.indexes || (this.indexes = {}), this.lastEach += 1;
      let l = this.lastEach;
      return this.indexes[l] = 0, l;
    }
    getProxyProcessor() {
      return { get(l, y) {
        return y === "proxyOf" ? l : l[y] ? y === "each" || typeof y == "string" && y.startsWith("walk") ? (...m) => l[y](...m.map((g) => typeof g == "function" ? ($, O) => g($.toProxy(), O) : g)) : y === "every" || y === "some" ? (m) => l[y]((g, ...$) => m(g.toProxy(), ...$)) : y === "root" ? () => l.root().toProxy() : y === "nodes" ? l.nodes.map((m) => m.toProxy()) : y === "first" || y === "last" ? l[y].toProxy() : l[y] : l[y];
      }, set(l, y, m) {
        return l[y] === m || (l[y] = m, (y === "name" || y === "params" || y === "selector") && l.markDirty()), true;
      } };
    }
    index(l) {
      return typeof l == "number" ? l : (l.proxyOf && (l = l.proxyOf), this.proxyOf.nodes.indexOf(l));
    }
    insertAfter(l, y) {
      let m = this.index(l), g = this.normalize(y, this.proxyOf.nodes[m]).reverse();
      m = this.index(l);
      for (let O of g) this.proxyOf.nodes.splice(m + 1, 0, O);
      let $;
      for (let O in this.indexes) $ = this.indexes[O], m < $ && (this.indexes[O] = $ + g.length);
      return this.markDirty(), this;
    }
    insertBefore(l, y) {
      let m = this.index(l), g = m === 0 ? "prepend" : false, $ = this.normalize(y, this.proxyOf.nodes[m], g).reverse();
      m = this.index(l);
      for (let v of $) this.proxyOf.nodes.splice(m, 0, v);
      let O;
      for (let v in this.indexes) O = this.indexes[v], m <= O && (this.indexes[v] = O + $.length);
      return this.markDirty(), this;
    }
    normalize(l, y) {
      if (typeof l == "string") l = a(i(l).nodes);
      else if (typeof l > "u") l = [];
      else if (Array.isArray(l)) {
        l = l.slice(0);
        for (let m of l) m.parent && m.parent.removeChild(m, "ignore");
      } else if (l.type === "root" && this.type !== "document") {
        l = l.nodes.slice(0);
        for (let m of l) m.parent && m.parent.removeChild(m, "ignore");
      } else if (l.type) l = [l];
      else if (l.prop) {
        if (typeof l.value > "u") throw new Error("Value field is missed in node creation");
        typeof l.value != "string" && (l.value = String(l.value)), l = [new n(l)];
      } else if (l.selector || l.selectors) l = [new f(l)];
      else if (l.name) l = [new c(l)];
      else if (l.text) l = [new r(l)];
      else throw new Error("Unknown node type in node creation");
      return l.map((m) => (m[u] || Wa.rebuild(m), m = m.proxyOf, m.parent && m.parent.removeChild(m), m[s] && d(m), m.raws || (m.raws = {}), typeof m.raws.before > "u" && y && typeof y.raws.before < "u" && (m.raws.before = y.raws.before.replace(/\S/g, "")), m.parent = this.proxyOf, m));
    }
    prepend(...l) {
      l = l.reverse();
      for (let y of l) {
        let m = this.normalize(y, this.first, "prepend").reverse();
        for (let g of m) this.proxyOf.nodes.unshift(g);
        for (let g in this.indexes) this.indexes[g] = this.indexes[g] + m.length;
      }
      return this.markDirty(), this;
    }
    push(l) {
      return l.parent = this, this.proxyOf.nodes.push(l), this;
    }
    removeAll() {
      for (let l of this.proxyOf.nodes) l.parent = void 0;
      return this.proxyOf.nodes = [], this.markDirty(), this;
    }
    removeChild(l) {
      l = this.index(l), this.proxyOf.nodes[l].parent = void 0, this.proxyOf.nodes.splice(l, 1);
      let y;
      for (let m in this.indexes) y = this.indexes[m], y >= l && (this.indexes[m] = y - 1);
      return this.markDirty(), this;
    }
    replaceValues(l, y, m) {
      return m || (m = y, y = {}), this.walkDecls((g) => {
        y.props && !y.props.includes(g.prop) || y.fast && !g.value.includes(y.fast) || (g.value = g.value.replace(l, m));
      }), this.markDirty(), this;
    }
    some(l) {
      return this.nodes.some(l);
    }
    walk(l) {
      return this.each((y, m) => {
        let g;
        try {
          g = l(y, m);
        } catch ($) {
          throw y.addToError($);
        }
        return g !== false && y.walk && (g = y.walk(l)), g;
      });
    }
    walkAtRules(l, y) {
      return y ? l instanceof RegExp ? this.walk((m, g) => {
        if (m.type === "atrule" && l.test(m.name)) return y(m, g);
      }) : this.walk((m, g) => {
        if (m.type === "atrule" && m.name === l) return y(m, g);
      }) : (y = l, this.walk((m, g) => {
        if (m.type === "atrule") return y(m, g);
      }));
    }
    walkComments(l) {
      return this.walk((y, m) => {
        if (y.type === "comment") return l(y, m);
      });
    }
    walkDecls(l, y) {
      return y ? l instanceof RegExp ? this.walk((m, g) => {
        if (m.type === "decl" && l.test(m.prop)) return y(m, g);
      }) : this.walk((m, g) => {
        if (m.type === "decl" && m.prop === l) return y(m, g);
      }) : (y = l, this.walk((m, g) => {
        if (m.type === "decl") return y(m, g);
      }));
    }
    walkRules(l, y) {
      return y ? l instanceof RegExp ? this.walk((m, g) => {
        if (m.type === "rule" && l.test(m.selector)) return y(m, g);
      }) : this.walk((m, g) => {
        if (m.type === "rule" && m.selector === l) return y(m, g);
      }) : (y = l, this.walk((m, g) => {
        if (m.type === "rule") return y(m, g);
      }));
    }
  };
  h.registerParse = (b) => {
    i = b;
  }, h.registerRule = (b) => {
    f = b;
  }, h.registerAtRule = (b) => {
    c = b;
  }, h.registerRoot = (b) => {
    p = b;
  }, t.exports = h, h.default = h, h.rebuild = (b) => {
    b.type === "atrule" ? Object.setPrototypeOf(b, c.prototype) : b.type === "rule" ? Object.setPrototypeOf(b, f.prototype) : b.type === "decl" ? Object.setPrototypeOf(b, n.prototype) : b.type === "comment" ? Object.setPrototypeOf(b, r.prototype) : b.type === "root" && Object.setPrototypeOf(b, p.prototype), b[u] = true, b.nodes && b.nodes.forEach((l) => {
      h.rebuild(l);
    });
  };
}), Uo = M0(L0()), F0 = Uo.default ?? Uo;
const De = Object.freeze(Object.defineProperty({ __proto__: null, default: F0 }, Symbol.toStringTag, { value: "Module" }));
var We = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/container":
      return t(De);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, U0 = Object.create, Ga = Object.defineProperty, N0 = Object.getOwnPropertyDescriptor, B0 = Object.getOwnPropertyNames, q0 = Object.getPrototypeOf, z0 = Object.prototype.hasOwnProperty, W0 = ((e) => typeof We < "u" ? We : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof We < "u" ? We : t)[r] }) : e)(function(e) {
  if (typeof We < "u") return We.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), G0 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Y0 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of B0(t)) !z0.call(e, o) && o !== r && Ga(e, o, { get: () => t[o], enumerable: !(n = N0(t, o)) || n.enumerable });
  return e;
}, H0 = (e, t, r) => (r = e != null ? U0(q0(e)) : {}, Y0(!e || !e.__esModule ? Ga(r, "default", { value: e, enumerable: true }) : r, e)), V0 = G0((e, t) => {
  var r = W0("postcss/lib/container"), n = class extends r {
    constructor(o) {
      super(o), this.type = "atrule";
    }
    append(...o) {
      return this.proxyOf.nodes || (this.nodes = []), super.append(...o);
    }
    prepend(...o) {
      return this.proxyOf.nodes || (this.nodes = []), super.prepend(...o);
    }
  };
  t.exports = n, n.default = n, r.registerAtRule(n);
}), No = H0(V0()), K0 = No.default ?? No;
const Xr = Object.freeze(Object.defineProperty({ __proto__: null, default: K0 }, Symbol.toStringTag, { value: "Module" }));
var Ge = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/container":
      return t(De);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Q0 = Object.create, Ya = Object.defineProperty, J0 = Object.getOwnPropertyDescriptor, X0 = Object.getOwnPropertyNames, Z0 = Object.getPrototypeOf, ey = Object.prototype.hasOwnProperty, ty = ((e) => typeof Ge < "u" ? Ge : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Ge < "u" ? Ge : t)[r] }) : e)(function(e) {
  if (typeof Ge < "u") return Ge.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), ry = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), oy = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of X0(t)) !ey.call(e, o) && o !== r && Ya(e, o, { get: () => t[o], enumerable: !(n = J0(t, o)) || n.enumerable });
  return e;
}, ny = (e, t, r) => (r = e != null ? Q0(Z0(e)) : {}, oy(!e || !e.__esModule ? Ya(r, "default", { value: e, enumerable: true }) : r, e)), sy = ry((e, t) => {
  var r = ty("postcss/lib/container"), n, o, s = class extends r {
    constructor(u) {
      super({ type: "document", ...u }), this.nodes || (this.nodes = []);
    }
    toResult(u = {}) {
      return new n(new o(), this, u).stringify();
    }
  };
  s.registerLazyResult = (u) => {
    n = u;
  }, s.registerProcessor = (u) => {
    o = u;
  }, t.exports = s, s.default = s;
}), Bo = ny(sy()), iy = Bo.default ?? Bo;
const Zr = Object.freeze(Object.defineProperty({ __proto__: null, default: iy }, Symbol.toStringTag, { value: "Module" }));
var ay = "useandom-26T198340PX75pxJACKVERYMINDBUSHWOLF_GQZbfghjklqvwyzrict", ly = (e, t = 21) => (r = t) => {
  let n = "", o = r | 0;
  for (; o--; ) n += e[Math.random() * e.length | 0];
  return n;
}, uy = (e = 21) => {
  let t = "", r = e | 0;
  for (; r--; ) t += ay[Math.random() * 64 | 0];
  return t;
};
const cy = Object.freeze(Object.defineProperty({ __proto__: null, customAlphabet: ly, nanoid: uy }, Symbol.toStringTag, { value: "Module" }));
function fy(e) {
  return new Error(`[unenv] ${e} is not implemented yet!`);
}
function rr(e) {
  return Object.assign(() => {
    throw fy(e);
  }, { __unenv__: true });
}
var ge = [], fe = [], py = typeof Uint8Array > "u" ? Array : Uint8Array, yr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
for (let e = 0, t = yr.length; e < t; ++e) ge[e] = yr[e], fe[yr.charCodeAt(e)] = e;
fe[45] = 62;
fe[95] = 63;
function hy(e) {
  let t = e.length;
  if (t % 4 > 0) throw new Error("Invalid string. Length must be a multiple of 4");
  let r = e.indexOf("=");
  r === -1 && (r = t);
  let n = r === t ? 0 : 4 - r % 4;
  return [r, n];
}
function dy(e, t, r) {
  return (t + r) * 3 / 4 - r;
}
function yy(e) {
  let t, r = hy(e), n = r[0], o = r[1], s = new py(dy(e, n, o)), u = 0, c = o > 0 ? n - 4 : n, i;
  for (i = 0; i < c; i += 4) t = fe[e.charCodeAt(i)] << 18 | fe[e.charCodeAt(i + 1)] << 12 | fe[e.charCodeAt(i + 2)] << 6 | fe[e.charCodeAt(i + 3)], s[u++] = t >> 16 & 255, s[u++] = t >> 8 & 255, s[u++] = t & 255;
  return o === 2 && (t = fe[e.charCodeAt(i)] << 2 | fe[e.charCodeAt(i + 1)] >> 4, s[u++] = t & 255), o === 1 && (t = fe[e.charCodeAt(i)] << 10 | fe[e.charCodeAt(i + 1)] << 4 | fe[e.charCodeAt(i + 2)] >> 2, s[u++] = t >> 8 & 255, s[u++] = t & 255), s;
}
function gy(e) {
  return ge[e >> 18 & 63] + ge[e >> 12 & 63] + ge[e >> 6 & 63] + ge[e & 63];
}
function my(e, t, r) {
  let n, o = [];
  for (let s = t; s < r; s += 3) n = (e[s] << 16 & 16711680) + (e[s + 1] << 8 & 65280) + (e[s + 2] & 255), o.push(gy(n));
  return o.join("");
}
function qo(e) {
  let t, r = e.length, n = r % 3, o = [], s = 16383;
  for (let u = 0, c = r - n; u < c; u += s) o.push(my(e, u, u + s > c ? c : u + s));
  return n === 1 ? (t = e[r - 1], o.push(ge[t >> 2] + ge[t << 4 & 63] + "==")) : n === 2 && (t = (e[r - 2] << 8) + e[r - 1], o.push(ge[t >> 10] + ge[t >> 4 & 63] + ge[t << 2 & 63] + "=")), o.join("");
}
function or(e, t, r, n, o) {
  let s, u, c = o * 8 - n - 1, i = (1 << c) - 1, p = i >> 1, f = -7, a = r ? o - 1 : 0, d = r ? -1 : 1, h = e[t + a];
  for (a += d, s = h & (1 << -f) - 1, h >>= -f, f += c; f > 0; ) s = s * 256 + e[t + a], a += d, f -= 8;
  for (u = s & (1 << -f) - 1, s >>= -f, f += n; f > 0; ) u = u * 256 + e[t + a], a += d, f -= 8;
  if (s === 0) s = 1 - p;
  else {
    if (s === i) return u ? Number.NaN : (h ? -1 : 1) * Number.POSITIVE_INFINITY;
    u = u + Math.pow(2, n), s = s - p;
  }
  return (h ? -1 : 1) * u * Math.pow(2, s - n);
}
function Ha(e, t, r, n, o, s) {
  let u, c, i, p = s * 8 - o - 1, f = (1 << p) - 1, a = f >> 1, d = o === 23 ? Math.pow(2, -24) - Math.pow(2, -77) : 0, h = n ? 0 : s - 1, b = n ? 1 : -1, l = t < 0 || t === 0 && 1 / t < 0 ? 1 : 0;
  for (t = Math.abs(t), Number.isNaN(t) || t === Number.POSITIVE_INFINITY ? (c = Number.isNaN(t) ? 1 : 0, u = f) : (u = Math.floor(Math.log2(t)), t * (i = Math.pow(2, -u)) < 1 && (u--, i *= 2), t += u + a >= 1 ? d / i : d * Math.pow(2, 1 - a), t * i >= 2 && (u++, i /= 2), u + a >= f ? (c = 0, u = f) : u + a >= 1 ? (c = (t * i - 1) * Math.pow(2, o), u = u + a) : (c = t * Math.pow(2, a - 1) * Math.pow(2, o), u = 0)); o >= 8; ) e[r + h] = c & 255, h += b, c /= 256, o -= 8;
  for (u = u << o | c, p += o; p > 0; ) e[r + h] = u & 255, h += b, u /= 256, p -= 8;
  e[r + h - b] |= l * 128;
}
var zo = typeof Symbol == "function" && typeof Symbol.for == "function" ? Symbol.for("nodejs.util.inspect.custom") : null, by = 50, Er = 2147483647;
k.TYPED_ARRAY_SUPPORT = vy();
!k.TYPED_ARRAY_SUPPORT && typeof console < "u" && typeof console.error == "function" && console.error("This environment lacks typed array (Uint8Array) support which is required by `buffer` v5.x. Use `buffer` v4.x if you require old browser support.");
function vy() {
  try {
    let e = new Uint8Array(1), t = { foo: function() {
      return 42;
    } };
    return Object.setPrototypeOf(t, Uint8Array.prototype), Object.setPrototypeOf(e, t), e.foo() === 42;
  } catch {
    return false;
  }
}
Object.defineProperty(k.prototype, "parent", { enumerable: true, get: function() {
  if (k.isBuffer(this)) return this.buffer;
} });
Object.defineProperty(k.prototype, "offset", { enumerable: true, get: function() {
  if (k.isBuffer(this)) return this.byteOffset;
} });
function Oe(e) {
  if (e > Er) throw new RangeError('The value "' + e + '" is invalid for option "size"');
  let t = new Uint8Array(e);
  return Object.setPrototypeOf(t, k.prototype), t;
}
function k(e, t, r) {
  if (typeof e == "number") {
    if (typeof t == "string") throw new TypeError('The "string" argument must be of type string. Received type number');
    return eo(e);
  }
  return Va(e, t, r);
}
k.poolSize = 8192;
function Va(e, t, r) {
  if (typeof e == "string") return Oy(e, t);
  if (ArrayBuffer.isView(e)) return $y(e);
  if (e == null) throw new TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object. Received type " + typeof e);
  if (be(e, ArrayBuffer) || e && be(e.buffer, ArrayBuffer) || typeof SharedArrayBuffer < "u" && (be(e, SharedArrayBuffer) || e && be(e.buffer, SharedArrayBuffer))) return Qa(e, t, r);
  if (typeof e == "number") throw new TypeError('The "value" argument must not be of type number. Received type number');
  let n = e.valueOf && e.valueOf();
  if (n != null && n !== e) return k.from(n, t, r);
  let o = xy(e);
  if (o) return o;
  if (typeof Symbol < "u" && Symbol.toPrimitive != null && typeof e[Symbol.toPrimitive] == "function") return k.from(e[Symbol.toPrimitive]("string"), t, r);
  throw new TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object. Received type " + typeof e);
}
k.from = function(e, t, r) {
  return Va(e, t, r);
};
Object.setPrototypeOf(k.prototype, Uint8Array.prototype);
Object.setPrototypeOf(k, Uint8Array);
function Ka(e) {
  if (typeof e != "number") throw new TypeError('"size" argument must be of type number');
  if (e < 0) throw new RangeError('The value "' + e + '" is invalid for option "size"');
}
function wy(e, t, r) {
  return Ka(e), e <= 0 ? Oe(e) : t !== void 0 ? typeof r == "string" ? Oe(e).fill(t, r) : Oe(e).fill(t) : Oe(e);
}
k.alloc = function(e, t, r) {
  return wy(e, t, r);
};
function eo(e) {
  return Ka(e), Oe(e < 0 ? 0 : to(e) | 0);
}
k.allocUnsafe = function(e) {
  return eo(e);
};
k.allocUnsafeSlow = function(e) {
  return eo(e);
};
function Oy(e, t) {
  if ((typeof t != "string" || t === "") && (t = "utf8"), !k.isEncoding(t)) throw new TypeError("Unknown encoding: " + t);
  let r = Ja(e, t) | 0, n = Oe(r), o = n.write(e, t);
  return o !== r && (n = n.slice(0, o)), n;
}
function Tr(e) {
  let t = e.length < 0 ? 0 : to(e.length) | 0, r = Oe(t);
  for (let n = 0; n < t; n += 1) r[n] = e[n] & 255;
  return r;
}
function $y(e) {
  if (be(e, Uint8Array)) {
    let t = new Uint8Array(e);
    return Qa(t.buffer, t.byteOffset, t.byteLength);
  }
  return Tr(e);
}
function Qa(e, t, r) {
  if (t < 0 || e.byteLength < t) throw new RangeError('"offset" is outside of buffer bounds');
  if (e.byteLength < t + (r || 0)) throw new RangeError('"length" is outside of buffer bounds');
  let n;
  return t === void 0 && r === void 0 ? n = new Uint8Array(e) : r === void 0 ? n = new Uint8Array(e, t) : n = new Uint8Array(e, t, r), Object.setPrototypeOf(n, k.prototype), n;
}
function xy(e) {
  if (k.isBuffer(e)) {
    let t = to(e.length) | 0, r = Oe(t);
    return r.length === 0 || e.copy(r, 0, 0, t), r;
  }
  if (e.length !== void 0) return typeof e.length != "number" || oo(e.length) ? Oe(0) : Tr(e);
  if (e.type === "Buffer" && Array.isArray(e.data)) return Tr(e.data);
}
function to(e) {
  if (e >= Er) throw new RangeError("Attempt to allocate Buffer larger than maximum size: 0x" + Er.toString(16) + " bytes");
  return e | 0;
}
k.isBuffer = function(e) {
  return e != null && e._isBuffer === true && e !== k.prototype;
};
k.compare = function(e, t) {
  if (be(e, Uint8Array) && (e = k.from(e, e.offset, e.byteLength)), be(t, Uint8Array) && (t = k.from(t, t.offset, t.byteLength)), !k.isBuffer(e) || !k.isBuffer(t)) throw new TypeError('The "buf1", "buf2" arguments must be one of type Buffer or Uint8Array');
  if (e === t) return 0;
  let r = e.length, n = t.length;
  for (let o = 0, s = Math.min(r, n); o < s; ++o) if (e[o] !== t[o]) {
    r = e[o], n = t[o];
    break;
  }
  return r < n ? -1 : n < r ? 1 : 0;
};
k.isEncoding = function(e) {
  switch (String(e).toLowerCase()) {
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
};
k.concat = function(e, t) {
  if (!Array.isArray(e)) throw new TypeError('"list" argument must be an Array of Buffers');
  if (e.length === 0) return k.alloc(0);
  let r;
  if (t === void 0) for (t = 0, r = 0; r < e.length; ++r) t += e[r].length;
  let n = k.allocUnsafe(t), o = 0;
  for (r = 0; r < e.length; ++r) {
    let s = e[r];
    if (be(s, Uint8Array)) o + s.length > n.length ? (k.isBuffer(s) || (s = k.from(s.buffer, s.byteOffset, s.byteLength)), s.copy(n, o)) : Uint8Array.prototype.set.call(n, s, o);
    else if (k.isBuffer(s)) s.copy(n, o);
    else throw new TypeError('"list" argument must be an Array of Buffers');
    o += s.length;
  }
  return n;
};
function Ja(e, t) {
  if (k.isBuffer(e)) return e.length;
  if (ArrayBuffer.isView(e) || be(e, ArrayBuffer)) return e.byteLength;
  if (typeof e != "string") throw new TypeError('The "string" argument must be one of type string, Buffer, or ArrayBuffer. Received type ' + typeof e);
  let r = e.length, n = arguments.length > 2 && arguments[2] === true;
  if (!n && r === 0) return 0;
  let o = false;
  for (; ; ) switch (t) {
    case "ascii":
    case "latin1":
    case "binary":
      return r;
    case "utf8":
    case "utf-8":
      return Ar(e).length;
    case "ucs2":
    case "ucs-2":
    case "utf16le":
    case "utf-16le":
      return r * 2;
    case "hex":
      return r >>> 1;
    case "base64":
      return il(e).length;
    default:
      if (o) return n ? -1 : Ar(e).length;
      t = ("" + t).toLowerCase(), o = true;
  }
}
k.byteLength = Ja;
function _y(e, t, r) {
  let n = false;
  if ((t === void 0 || t < 0) && (t = 0), t > this.length || ((r === void 0 || r > this.length) && (r = this.length), r <= 0) || (r >>>= 0, t >>>= 0, r <= t)) return "";
  for (e || (e = "utf8"); ; ) switch (e) {
    case "hex":
      return Ry(this, t, r);
    case "utf8":
    case "utf-8":
      return Za(this, t, r);
    case "ascii":
      return Cy(this, t, r);
    case "latin1":
    case "binary":
      return Iy(this, t, r);
    case "base64":
      return Ty(this, t, r);
    case "ucs2":
    case "ucs-2":
    case "utf16le":
    case "utf-16le":
      return Dy(this, t, r);
    default:
      if (n) throw new TypeError("Unknown encoding: " + e);
      e = (e + "").toLowerCase(), n = true;
  }
}
k.prototype._isBuffer = true;
function Re(e, t, r) {
  let n = e[t];
  e[t] = e[r], e[r] = n;
}
k.prototype.swap16 = function() {
  let e = this.length;
  if (e % 2 !== 0) throw new RangeError("Buffer size must be a multiple of 16-bits");
  for (let t = 0; t < e; t += 2) Re(this, t, t + 1);
  return this;
};
k.prototype.swap32 = function() {
  let e = this.length;
  if (e % 4 !== 0) throw new RangeError("Buffer size must be a multiple of 32-bits");
  for (let t = 0; t < e; t += 4) Re(this, t, t + 3), Re(this, t + 1, t + 2);
  return this;
};
k.prototype.swap64 = function() {
  let e = this.length;
  if (e % 8 !== 0) throw new RangeError("Buffer size must be a multiple of 64-bits");
  for (let t = 0; t < e; t += 8) Re(this, t, t + 7), Re(this, t + 1, t + 6), Re(this, t + 2, t + 5), Re(this, t + 3, t + 4);
  return this;
};
k.prototype.toString = function() {
  let e = this.length;
  return e === 0 ? "" : arguments.length === 0 ? Za(this, 0, e) : Reflect.apply(_y, this, arguments);
};
k.prototype.toLocaleString = k.prototype.toString;
k.prototype.equals = function(e) {
  if (!k.isBuffer(e)) throw new TypeError("Argument must be a Buffer");
  return this === e ? true : k.compare(this, e) === 0;
};
k.prototype.inspect = function() {
  let e = "", t = by;
  return e = this.toString("hex", 0, t).replace(/(.{2})/g, "$1 ").trim(), this.length > t && (e += " ... "), "<Buffer " + e + ">";
};
zo && (k.prototype[zo] = k.prototype.inspect);
k.prototype.compare = function(e, t, r, n, o) {
  if (be(e, Uint8Array) && (e = k.from(e, e.offset, e.byteLength)), !k.isBuffer(e)) throw new TypeError('The "target" argument must be one of type Buffer or Uint8Array. Received type ' + typeof e);
  if (t === void 0 && (t = 0), r === void 0 && (r = e ? e.length : 0), n === void 0 && (n = 0), o === void 0 && (o = this.length), t < 0 || r > e.length || n < 0 || o > this.length) throw new RangeError("out of range index");
  if (n >= o && t >= r) return 0;
  if (n >= o) return -1;
  if (t >= r) return 1;
  if (t >>>= 0, r >>>= 0, n >>>= 0, o >>>= 0, this === e) return 0;
  let s = o - n, u = r - t, c = Math.min(s, u), i = this.slice(n, o), p = e.slice(t, r);
  for (let f = 0; f < c; ++f) if (i[f] !== p[f]) {
    s = i[f], u = p[f];
    break;
  }
  return s < u ? -1 : u < s ? 1 : 0;
};
function Xa(e, t, r, n, o) {
  if (e.length === 0) return -1;
  if (typeof r == "string" ? (n = r, r = 0) : r > 2147483647 ? r = 2147483647 : r < -2147483648 && (r = -2147483648), r = +r, oo(r) && (r = o ? 0 : e.length - 1), r < 0 && (r = e.length + r), r >= e.length) {
    if (o) return -1;
    r = e.length - 1;
  } else if (r < 0) if (o) r = 0;
  else return -1;
  if (typeof t == "string" && (t = k.from(t, n)), k.isBuffer(t)) return t.length === 0 ? -1 : Wo(e, t, r, n, o);
  if (typeof t == "number") return t = t & 255, typeof Uint8Array.prototype.indexOf == "function" ? o ? Uint8Array.prototype.indexOf.call(e, t, r) : Uint8Array.prototype.lastIndexOf.call(e, t, r) : Wo(e, [t], r, n, o);
  throw new TypeError("val must be string, number or Buffer");
}
function Wo(e, t, r, n, o) {
  let s = 1, u = e.length, c = t.length;
  if (n !== void 0 && (n = String(n).toLowerCase(), n === "ucs2" || n === "ucs-2" || n === "utf16le" || n === "utf-16le")) {
    if (e.length < 2 || t.length < 2) return -1;
    s = 2, u /= 2, c /= 2, r /= 2;
  }
  function i(f, a) {
    return s === 1 ? f[a] : f.readUInt16BE(a * s);
  }
  let p;
  if (o) {
    let f = -1;
    for (p = r; p < u; p++) if (i(e, p) === i(t, f === -1 ? 0 : p - f)) {
      if (f === -1 && (f = p), p - f + 1 === c) return f * s;
    } else f !== -1 && (p -= p - f), f = -1;
  } else for (r + c > u && (r = u - c), p = r; p >= 0; p--) {
    let f = true;
    for (let a = 0; a < c; a++) if (i(e, p + a) !== i(t, a)) {
      f = false;
      break;
    }
    if (f) return p;
  }
  return -1;
}
k.prototype.includes = function(e, t, r) {
  return this.indexOf(e, t, r) !== -1;
};
k.prototype.indexOf = function(e, t, r) {
  return Xa(this, e, t, r, true);
};
k.prototype.lastIndexOf = function(e, t, r) {
  return Xa(this, e, t, r, false);
};
function Sy(e, t, r, n) {
  r = Number(r) || 0;
  let o = e.length - r;
  n ? (n = Number(n), n > o && (n = o)) : n = o;
  let s = t.length;
  n > s / 2 && (n = s / 2);
  let u;
  for (u = 0; u < n; ++u) {
    let c = Number.parseInt(t.slice(u * 2, u * 2 + 2), 16);
    if (oo(c)) return u;
    e[r + u] = c;
  }
  return u;
}
function Py(e, t, r, n) {
  return nr(Ar(t, e.length - r), e, r, n);
}
function jy(e, t, r, n) {
  return nr(Uy(t), e, r, n);
}
function ky(e, t, r, n) {
  return nr(il(t), e, r, n);
}
function Ey(e, t, r, n) {
  return nr(Ny(t, e.length - r), e, r, n);
}
k.prototype.write = function(e, t, r, n) {
  if (t === void 0) n = "utf8", r = this.length, t = 0;
  else if (r === void 0 && typeof t == "string") n = t, r = this.length, t = 0;
  else if (Number.isFinite(t)) t = t >>> 0, Number.isFinite(r) ? (r = r >>> 0, n === void 0 && (n = "utf8")) : (n = r, r = void 0);
  else throw new TypeError("Buffer.write(string, encoding, offset[, length]) is no longer supported");
  let o = this.length - t;
  if ((r === void 0 || r > o) && (r = o), e.length > 0 && (r < 0 || t < 0) || t > this.length) throw new RangeError("Attempt to write outside buffer bounds");
  n || (n = "utf8");
  let s = false;
  for (; ; ) switch (n) {
    case "hex":
      return Sy(this, e, t, r);
    case "utf8":
    case "utf-8":
      return Py(this, e, t, r);
    case "ascii":
    case "latin1":
    case "binary":
      return jy(this, e, t, r);
    case "base64":
      return ky(this, e, t, r);
    case "ucs2":
    case "ucs-2":
    case "utf16le":
    case "utf-16le":
      return Ey(this, e, t, r);
    default:
      if (s) throw new TypeError("Unknown encoding: " + n);
      n = ("" + n).toLowerCase(), s = true;
  }
};
k.prototype.toJSON = function() {
  return { type: "Buffer", data: Array.prototype.slice.call(this._arr || this, 0) };
};
function Ty(e, t, r) {
  return t === 0 && r === e.length ? qo(e) : qo(e.slice(t, r));
}
function Za(e, t, r) {
  r = Math.min(e.length, r);
  let n = [], o = t;
  for (; o < r; ) {
    let s = e[o], u = null, c = s > 239 ? 4 : s > 223 ? 3 : s > 191 ? 2 : 1;
    if (o + c <= r) {
      let i, p, f, a;
      switch (c) {
        case 1:
          s < 128 && (u = s);
          break;
        case 2:
          i = e[o + 1], (i & 192) === 128 && (a = (s & 31) << 6 | i & 63, a > 127 && (u = a));
          break;
        case 3:
          i = e[o + 1], p = e[o + 2], (i & 192) === 128 && (p & 192) === 128 && (a = (s & 15) << 12 | (i & 63) << 6 | p & 63, a > 2047 && (a < 55296 || a > 57343) && (u = a));
          break;
        case 4:
          i = e[o + 1], p = e[o + 2], f = e[o + 3], (i & 192) === 128 && (p & 192) === 128 && (f & 192) === 128 && (a = (s & 15) << 18 | (i & 63) << 12 | (p & 63) << 6 | f & 63, a > 65535 && a < 1114112 && (u = a));
      }
    }
    u === null ? (u = 65533, c = 1) : u > 65535 && (u -= 65536, n.push(u >>> 10 & 1023 | 55296), u = 56320 | u & 1023), n.push(u), o += c;
  }
  return Ay(n);
}
var Go = 4096;
function Ay(e) {
  let t = e.length;
  if (t <= Go) return String.fromCharCode.apply(String, e);
  let r = "", n = 0;
  for (; n < t; ) r += String.fromCharCode.apply(String, e.slice(n, n += Go));
  return r;
}
function Cy(e, t, r) {
  let n = "";
  r = Math.min(e.length, r);
  for (let o = t; o < r; ++o) n += String.fromCharCode(e[o] & 127);
  return n;
}
function Iy(e, t, r) {
  let n = "";
  r = Math.min(e.length, r);
  for (let o = t; o < r; ++o) n += String.fromCharCode(e[o]);
  return n;
}
function Ry(e, t, r) {
  let n = e.length;
  (!t || t < 0) && (t = 0), (!r || r < 0 || r > n) && (r = n);
  let o = "";
  for (let s = t; s < r; ++s) o += By[e[s]];
  return o;
}
function Dy(e, t, r) {
  let n = e.slice(t, r), o = "";
  for (let s = 0; s < n.length - 1; s += 2) o += String.fromCharCode(n[s] + n[s + 1] * 256);
  return o;
}
k.prototype.slice = function(e, t) {
  let r = this.length;
  e = Math.trunc(e), t = t === void 0 ? r : Math.trunc(t), e < 0 ? (e += r, e < 0 && (e = 0)) : e > r && (e = r), t < 0 ? (t += r, t < 0 && (t = 0)) : t > r && (t = r), t < e && (t = e);
  let n = this.subarray(e, t);
  return Object.setPrototypeOf(n, k.prototype), n;
};
function oe(e, t, r) {
  if (e % 1 !== 0 || e < 0) throw new RangeError("offset is not uint");
  if (e + t > r) throw new RangeError("Trying to access beyond buffer length");
}
k.prototype.readUintLE = k.prototype.readUIntLE = function(e, t, r) {
  e = e >>> 0, t = t >>> 0, r || oe(e, t, this.length);
  let n = this[e], o = 1, s = 0;
  for (; ++s < t && (o *= 256); ) n += this[e + s] * o;
  return n;
};
k.prototype.readUintBE = k.prototype.readUIntBE = function(e, t, r) {
  e = e >>> 0, t = t >>> 0, r || oe(e, t, this.length);
  let n = this[e + --t], o = 1;
  for (; t > 0 && (o *= 256); ) n += this[e + --t] * o;
  return n;
};
k.prototype.readUint8 = k.prototype.readUInt8 = function(e, t) {
  return e = e >>> 0, t || oe(e, 1, this.length), this[e];
};
k.prototype.readUint16LE = k.prototype.readUInt16LE = function(e, t) {
  return e = e >>> 0, t || oe(e, 2, this.length), this[e] | this[e + 1] << 8;
};
k.prototype.readUint16BE = k.prototype.readUInt16BE = function(e, t) {
  return e = e >>> 0, t || oe(e, 2, this.length), this[e] << 8 | this[e + 1];
};
k.prototype.readUint32LE = k.prototype.readUInt32LE = function(e, t) {
  return e = e >>> 0, t || oe(e, 4, this.length), (this[e] | this[e + 1] << 8 | this[e + 2] << 16) + this[e + 3] * 16777216;
};
k.prototype.readUint32BE = k.prototype.readUInt32BE = function(e, t) {
  return e = e >>> 0, t || oe(e, 4, this.length), this[e] * 16777216 + (this[e + 1] << 16 | this[e + 2] << 8 | this[e + 3]);
};
k.prototype.readBigUInt64LE = Ae(function(e) {
  e = e >>> 0, Ot(e, "offset");
  let t = this[e], r = this[e + 7];
  (t === void 0 || r === void 0) && Ct(e, this.length - 8);
  let n = t + this[++e] * 2 ** 8 + this[++e] * 2 ** 16 + this[++e] * 2 ** 24, o = this[++e] + this[++e] * 2 ** 8 + this[++e] * 2 ** 16 + r * 2 ** 24;
  return BigInt(n) + (BigInt(o) << BigInt(32));
});
k.prototype.readBigUInt64BE = Ae(function(e) {
  e = e >>> 0, Ot(e, "offset");
  let t = this[e], r = this[e + 7];
  (t === void 0 || r === void 0) && Ct(e, this.length - 8);
  let n = t * 2 ** 24 + this[++e] * 2 ** 16 + this[++e] * 2 ** 8 + this[++e], o = this[++e] * 2 ** 24 + this[++e] * 2 ** 16 + this[++e] * 2 ** 8 + r;
  return (BigInt(n) << BigInt(32)) + BigInt(o);
});
k.prototype.readIntLE = function(e, t, r) {
  e = e >>> 0, t = t >>> 0, r || oe(e, t, this.length);
  let n = this[e], o = 1, s = 0;
  for (; ++s < t && (o *= 256); ) n += this[e + s] * o;
  return o *= 128, n >= o && (n -= Math.pow(2, 8 * t)), n;
};
k.prototype.readIntBE = function(e, t, r) {
  e = e >>> 0, t = t >>> 0, r || oe(e, t, this.length);
  let n = t, o = 1, s = this[e + --n];
  for (; n > 0 && (o *= 256); ) s += this[e + --n] * o;
  return o *= 128, s >= o && (s -= Math.pow(2, 8 * t)), s;
};
k.prototype.readInt8 = function(e, t) {
  return e = e >>> 0, t || oe(e, 1, this.length), this[e] & 128 ? (255 - this[e] + 1) * -1 : this[e];
};
k.prototype.readInt16LE = function(e, t) {
  e = e >>> 0, t || oe(e, 2, this.length);
  let r = this[e] | this[e + 1] << 8;
  return r & 32768 ? r | 4294901760 : r;
};
k.prototype.readInt16BE = function(e, t) {
  e = e >>> 0, t || oe(e, 2, this.length);
  let r = this[e + 1] | this[e] << 8;
  return r & 32768 ? r | 4294901760 : r;
};
k.prototype.readInt32LE = function(e, t) {
  return e = e >>> 0, t || oe(e, 4, this.length), this[e] | this[e + 1] << 8 | this[e + 2] << 16 | this[e + 3] << 24;
};
k.prototype.readInt32BE = function(e, t) {
  return e = e >>> 0, t || oe(e, 4, this.length), this[e] << 24 | this[e + 1] << 16 | this[e + 2] << 8 | this[e + 3];
};
k.prototype.readBigInt64LE = Ae(function(e) {
  e = e >>> 0, Ot(e, "offset");
  let t = this[e], r = this[e + 7];
  (t === void 0 || r === void 0) && Ct(e, this.length - 8);
  let n = this[e + 4] + this[e + 5] * 2 ** 8 + this[e + 6] * 2 ** 16 + (r << 24);
  return (BigInt(n) << BigInt(32)) + BigInt(t + this[++e] * 2 ** 8 + this[++e] * 2 ** 16 + this[++e] * 2 ** 24);
});
k.prototype.readBigInt64BE = Ae(function(e) {
  e = e >>> 0, Ot(e, "offset");
  let t = this[e], r = this[e + 7];
  (t === void 0 || r === void 0) && Ct(e, this.length - 8);
  let n = (t << 24) + this[++e] * 2 ** 16 + this[++e] * 2 ** 8 + this[++e];
  return (BigInt(n) << BigInt(32)) + BigInt(this[++e] * 2 ** 24 + this[++e] * 2 ** 16 + this[++e] * 2 ** 8 + r);
});
k.prototype.readFloatLE = function(e, t) {
  return e = e >>> 0, t || oe(e, 4, this.length), or(this, e, true, 23, 4);
};
k.prototype.readFloatBE = function(e, t) {
  return e = e >>> 0, t || oe(e, 4, this.length), or(this, e, false, 23, 4);
};
k.prototype.readDoubleLE = function(e, t) {
  return e = e >>> 0, t || oe(e, 8, this.length), or(this, e, true, 52, 8);
};
k.prototype.readDoubleBE = function(e, t) {
  return e = e >>> 0, t || oe(e, 8, this.length), or(this, e, false, 52, 8);
};
function ue(e, t, r, n, o, s) {
  if (!k.isBuffer(e)) throw new TypeError('"buffer" argument must be a Buffer instance');
  if (t > o || t < s) throw new RangeError('"value" argument is out of bounds');
  if (r + n > e.length) throw new RangeError("Index out of range");
}
k.prototype.writeUintLE = k.prototype.writeUIntLE = function(e, t, r, n) {
  if (e = +e, t = t >>> 0, r = r >>> 0, !n) {
    let u = Math.pow(2, 8 * r) - 1;
    ue(this, e, t, r, u, 0);
  }
  let o = 1, s = 0;
  for (this[t] = e & 255; ++s < r && (o *= 256); ) this[t + s] = e / o & 255;
  return t + r;
};
k.prototype.writeUintBE = k.prototype.writeUIntBE = function(e, t, r, n) {
  if (e = +e, t = t >>> 0, r = r >>> 0, !n) {
    let u = Math.pow(2, 8 * r) - 1;
    ue(this, e, t, r, u, 0);
  }
  let o = r - 1, s = 1;
  for (this[t + o] = e & 255; --o >= 0 && (s *= 256); ) this[t + o] = e / s & 255;
  return t + r;
};
k.prototype.writeUint8 = k.prototype.writeUInt8 = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 1, 255, 0), this[t] = e & 255, t + 1;
};
k.prototype.writeUint16LE = k.prototype.writeUInt16LE = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 2, 65535, 0), this[t] = e & 255, this[t + 1] = e >>> 8, t + 2;
};
k.prototype.writeUint16BE = k.prototype.writeUInt16BE = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 2, 65535, 0), this[t] = e >>> 8, this[t + 1] = e & 255, t + 2;
};
k.prototype.writeUint32LE = k.prototype.writeUInt32LE = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 4, 4294967295, 0), this[t + 3] = e >>> 24, this[t + 2] = e >>> 16, this[t + 1] = e >>> 8, this[t] = e & 255, t + 4;
};
k.prototype.writeUint32BE = k.prototype.writeUInt32BE = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 4, 4294967295, 0), this[t] = e >>> 24, this[t + 1] = e >>> 16, this[t + 2] = e >>> 8, this[t + 3] = e & 255, t + 4;
};
function el(e, t, r, n, o) {
  sl(t, n, o, e, r, 7);
  let s = Number(t & BigInt(4294967295));
  e[r++] = s, s = s >> 8, e[r++] = s, s = s >> 8, e[r++] = s, s = s >> 8, e[r++] = s;
  let u = Number(t >> BigInt(32) & BigInt(4294967295));
  return e[r++] = u, u = u >> 8, e[r++] = u, u = u >> 8, e[r++] = u, u = u >> 8, e[r++] = u, r;
}
function tl(e, t, r, n, o) {
  sl(t, n, o, e, r, 7);
  let s = Number(t & BigInt(4294967295));
  e[r + 7] = s, s = s >> 8, e[r + 6] = s, s = s >> 8, e[r + 5] = s, s = s >> 8, e[r + 4] = s;
  let u = Number(t >> BigInt(32) & BigInt(4294967295));
  return e[r + 3] = u, u = u >> 8, e[r + 2] = u, u = u >> 8, e[r + 1] = u, u = u >> 8, e[r] = u, r + 8;
}
k.prototype.writeBigUInt64LE = Ae(function(e, t = 0) {
  return el(this, e, t, BigInt(0), BigInt("0xffffffffffffffff"));
});
k.prototype.writeBigUInt64BE = Ae(function(e, t = 0) {
  return tl(this, e, t, BigInt(0), BigInt("0xffffffffffffffff"));
});
k.prototype.writeIntLE = function(e, t, r, n) {
  if (e = +e, t = t >>> 0, !n) {
    let c = Math.pow(2, 8 * r - 1);
    ue(this, e, t, r, c - 1, -c);
  }
  let o = 0, s = 1, u = 0;
  for (this[t] = e & 255; ++o < r && (s *= 256); ) e < 0 && u === 0 && this[t + o - 1] !== 0 && (u = 1), this[t + o] = Math.trunc(e / s) - u & 255;
  return t + r;
};
k.prototype.writeIntBE = function(e, t, r, n) {
  if (e = +e, t = t >>> 0, !n) {
    let c = Math.pow(2, 8 * r - 1);
    ue(this, e, t, r, c - 1, -c);
  }
  let o = r - 1, s = 1, u = 0;
  for (this[t + o] = e & 255; --o >= 0 && (s *= 256); ) e < 0 && u === 0 && this[t + o + 1] !== 0 && (u = 1), this[t + o] = Math.trunc(e / s) - u & 255;
  return t + r;
};
k.prototype.writeInt8 = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 1, 127, -128), e < 0 && (e = 255 + e + 1), this[t] = e & 255, t + 1;
};
k.prototype.writeInt16LE = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 2, 32767, -32768), this[t] = e & 255, this[t + 1] = e >>> 8, t + 2;
};
k.prototype.writeInt16BE = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 2, 32767, -32768), this[t] = e >>> 8, this[t + 1] = e & 255, t + 2;
};
k.prototype.writeInt32LE = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 4, 2147483647, -2147483648), this[t] = e & 255, this[t + 1] = e >>> 8, this[t + 2] = e >>> 16, this[t + 3] = e >>> 24, t + 4;
};
k.prototype.writeInt32BE = function(e, t, r) {
  return e = +e, t = t >>> 0, r || ue(this, e, t, 4, 2147483647, -2147483648), e < 0 && (e = 4294967295 + e + 1), this[t] = e >>> 24, this[t + 1] = e >>> 16, this[t + 2] = e >>> 8, this[t + 3] = e & 255, t + 4;
};
k.prototype.writeBigInt64LE = Ae(function(e, t = 0) {
  return el(this, e, t, -BigInt("0x8000000000000000"), BigInt("0x7fffffffffffffff"));
});
k.prototype.writeBigInt64BE = Ae(function(e, t = 0) {
  return tl(this, e, t, -BigInt("0x8000000000000000"), BigInt("0x7fffffffffffffff"));
});
function rl(e, t, r, n, o, s) {
  if (r + n > e.length) throw new RangeError("Index out of range");
  if (r < 0) throw new RangeError("Index out of range");
}
function ol(e, t, r, n, o) {
  return t = +t, r = r >>> 0, o || rl(e, t, r, 4), Ha(e, t, r, n, 23, 4), r + 4;
}
k.prototype.writeFloatLE = function(e, t, r) {
  return ol(this, e, t, true, r);
};
k.prototype.writeFloatBE = function(e, t, r) {
  return ol(this, e, t, false, r);
};
function nl(e, t, r, n, o) {
  return t = +t, r = r >>> 0, o || rl(e, t, r, 8), Ha(e, t, r, n, 52, 8), r + 8;
}
k.prototype.writeDoubleLE = function(e, t, r) {
  return nl(this, e, t, true, r);
};
k.prototype.writeDoubleBE = function(e, t, r) {
  return nl(this, e, t, false, r);
};
k.prototype.copy = function(e, t, r, n) {
  if (!k.isBuffer(e)) throw new TypeError("argument should be a Buffer");
  if (r || (r = 0), !n && n !== 0 && (n = this.length), t >= e.length && (t = e.length), t || (t = 0), n > 0 && n < r && (n = r), n === r || e.length === 0 || this.length === 0) return 0;
  if (t < 0) throw new RangeError("targetStart out of bounds");
  if (r < 0 || r >= this.length) throw new RangeError("Index out of range");
  if (n < 0) throw new RangeError("sourceEnd out of bounds");
  n > this.length && (n = this.length), e.length - t < n - r && (n = e.length - t + r);
  let o = n - r;
  return this === e && typeof Uint8Array.prototype.copyWithin == "function" ? this.copyWithin(t, r, n) : Uint8Array.prototype.set.call(e, this.subarray(r, n), t), o;
};
k.prototype.fill = function(e, t, r, n) {
  if (typeof e == "string") {
    if (typeof t == "string" ? (n = t, t = 0, r = this.length) : typeof r == "string" && (n = r, r = this.length), n !== void 0 && typeof n != "string") throw new TypeError("encoding must be a string");
    if (typeof n == "string" && !k.isEncoding(n)) throw new TypeError("Unknown encoding: " + n);
    if (e.length === 1) {
      let s = e.charCodeAt(0);
      (n === "utf8" && s < 128 || n === "latin1") && (e = s);
    }
  } else typeof e == "number" ? e = e & 255 : typeof e == "boolean" && (e = Number(e));
  if (t < 0 || this.length < t || this.length < r) throw new RangeError("Out of range index");
  if (r <= t) return this;
  t = t >>> 0, r = r === void 0 ? this.length : r >>> 0, e || (e = 0);
  let o;
  if (typeof e == "number") for (o = t; o < r; ++o) this[o] = e;
  else {
    let s = k.isBuffer(e) ? e : k.from(e, n), u = s.length;
    if (u === 0) throw new TypeError('The value "' + e + '" is invalid for argument "value"');
    for (o = 0; o < r - t; ++o) this[o + t] = s[o % u];
  }
  return this;
};
var yt = {};
function ro(e, t, r) {
  yt[e] = class extends r {
    constructor() {
      super(), Object.defineProperty(this, "message", { value: Reflect.apply(t, this, arguments), writable: true, configurable: true }), this.name = `${this.name} [${e}]`, this.stack, delete this.name;
    }
    get code() {
      return e;
    }
    set code(n) {
      Object.defineProperty(this, "code", { configurable: true, enumerable: true, value: n, writable: true });
    }
    toString() {
      return `${this.name} [${e}]: ${this.message}`;
    }
  };
}
ro("ERR_BUFFER_OUT_OF_BOUNDS", function(e) {
  return e ? `${e} is outside of buffer bounds` : "Attempt to access memory outside buffer bounds";
}, RangeError);
ro("ERR_INVALID_ARG_TYPE", function(e, t) {
  return `The "${e}" argument must be of type number. Received type ${typeof t}`;
}, TypeError);
ro("ERR_OUT_OF_RANGE", function(e, t, r) {
  let n = `The value of "${e}" is out of range.`, o = r;
  return Number.isInteger(r) && Math.abs(r) > 2 ** 32 ? o = Yo(String(r)) : typeof r == "bigint" && (o = String(r), (r > BigInt(2) ** BigInt(32) || r < -(BigInt(2) ** BigInt(32))) && (o = Yo(o)), o += "n"), n += ` It must be ${t}. Received ${o}`, n;
}, RangeError);
function Yo(e) {
  let t = "", r = e.length, n = e[0] === "-" ? 1 : 0;
  for (; r >= n + 4; r -= 3) t = `_${e.slice(r - 3, r)}${t}`;
  return `${e.slice(0, r)}${t}`;
}
function My(e, t, r) {
  Ot(t, "offset"), (e[t] === void 0 || e[t + r] === void 0) && Ct(t, e.length - (r + 1));
}
function sl(e, t, r, n, o, s) {
  if (e > r || e < t) {
    let u = typeof t == "bigint" ? "n" : "", c;
    throw c = t === 0 || t === BigInt(0) ? `>= 0${u} and < 2${u} ** ${(s + 1) * 8}${u}` : `>= -(2${u} ** ${(s + 1) * 8 - 1}${u}) and < 2 ** ${(s + 1) * 8 - 1}${u}`, new yt.ERR_OUT_OF_RANGE("value", c, e);
  }
  My(n, o, s);
}
function Ot(e, t) {
  if (typeof e != "number") throw new yt.ERR_INVALID_ARG_TYPE(t, "number", e);
}
function Ct(e, t, r) {
  throw Math.floor(e) !== e ? (Ot(e, r), new yt.ERR_OUT_OF_RANGE("offset", "an integer", e)) : t < 0 ? new yt.ERR_BUFFER_OUT_OF_BOUNDS() : new yt.ERR_OUT_OF_RANGE("offset", `>= 0 and <= ${t}`, e);
}
var Ly = /[^\w+/-]/g;
function Fy(e) {
  if (e = e.split("=")[0], e = e.trim().replace(Ly, ""), e.length < 2) return "";
  for (; e.length % 4 !== 0; ) e = e + "=";
  return e;
}
function Ar(e, t) {
  t = t || Number.POSITIVE_INFINITY;
  let r, n = e.length, o = null, s = [];
  for (let u = 0; u < n; ++u) {
    if (r = e.charCodeAt(u), r > 55295 && r < 57344) {
      if (!o) {
        if (r > 56319) {
          (t -= 3) > -1 && s.push(239, 191, 189);
          continue;
        } else if (u + 1 === n) {
          (t -= 3) > -1 && s.push(239, 191, 189);
          continue;
        }
        o = r;
        continue;
      }
      if (r < 56320) {
        (t -= 3) > -1 && s.push(239, 191, 189), o = r;
        continue;
      }
      r = (o - 55296 << 10 | r - 56320) + 65536;
    } else o && (t -= 3) > -1 && s.push(239, 191, 189);
    if (o = null, r < 128) {
      if ((t -= 1) < 0) break;
      s.push(r);
    } else if (r < 2048) {
      if ((t -= 2) < 0) break;
      s.push(r >> 6 | 192, r & 63 | 128);
    } else if (r < 65536) {
      if ((t -= 3) < 0) break;
      s.push(r >> 12 | 224, r >> 6 & 63 | 128, r & 63 | 128);
    } else if (r < 1114112) {
      if ((t -= 4) < 0) break;
      s.push(r >> 18 | 240, r >> 12 & 63 | 128, r >> 6 & 63 | 128, r & 63 | 128);
    } else throw new Error("Invalid code point");
  }
  return s;
}
function Uy(e) {
  let t = [];
  for (let r = 0; r < e.length; ++r) t.push(e.charCodeAt(r) & 255);
  return t;
}
function Ny(e, t) {
  let r, n, o, s = [];
  for (let u = 0; u < e.length && !((t -= 2) < 0); ++u) r = e.charCodeAt(u), n = r >> 8, o = r % 256, s.push(o, n);
  return s;
}
function il(e) {
  return yy(Fy(e));
}
function nr(e, t, r, n) {
  let o;
  for (o = 0; o < n && !(o + r >= t.length || o >= e.length); ++o) t[o + r] = e[o];
  return o;
}
function be(e, t) {
  return e instanceof t || e != null && e.constructor != null && e.constructor.name != null && e.constructor.name === t.name;
}
function oo(e) {
  return e !== e;
}
var By = function() {
  let e = "0123456789abcdef", t = Array.from({ length: 256 });
  for (let r = 0; r < 16; ++r) {
    let n = r * 16;
    for (let o = 0; o < 16; ++o) t[n + o] = e[r] + e[o];
  }
  return t;
}();
function Ae(e) {
  return typeof BigInt > "u" ? qy : e;
}
function qy() {
  throw new Error("BigInt not supported");
}
var Gt = globalThis.Buffer || k;
rr("buffer.resolveObjectURL");
rr("buffer.transcode");
rr("buffer.isUtf8");
rr("buffer.isAscii");
globalThis.btoa.bind(globalThis);
globalThis.atob.bind(globalThis);
/*! Bundled license information:

unenv-nightly/runtime/node/buffer/internal/ieee754.mjs:
  (*! ieee754. BSD-3-Clause License. Feross Aboukhadijeh <https://feross.org/opensource> *)

unenv-nightly/runtime/node/buffer/internal/buffer.mjs:
  (*!
   * The buffer module from node.js, for the browser.
   *
   * @author   Feross Aboukhadijeh <https://feross.org>
   * @license  MIT
   *)
*/
var Ye = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "node:fs":
      return t(Cf);
    case "node:path":
      return t(Gr);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, zy = Object.create, sr = Object.defineProperty, Wy = Object.getOwnPropertyDescriptor, Gy = Object.getOwnPropertyNames, Yy = Object.getPrototypeOf, Hy = Object.prototype.hasOwnProperty, Ho = ((e) => typeof Ye < "u" ? Ye : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Ye < "u" ? Ye : t)[r] }) : e)(function(e) {
  if (typeof Ye < "u") return Ye.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Vy = (e, t) => () => (e && (t = e(e = 0)), t), Ky = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Qy = (e, t) => {
  for (var r in t) sr(e, r, { get: t[r], enumerable: true });
}, al = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Gy(t)) !Hy.call(e, o) && o !== r && sr(e, o, { get: () => t[o], enumerable: !(n = Wy(t, o)) || n.enumerable });
  return e;
}, Jy = (e, t, r) => (r = e != null ? zy(Yy(e)) : {}, al(!e || !e.__esModule ? sr(r, "default", { value: e, enumerable: true }) : r, e)), Xy = (e) => al(sr({}, "__esModule", { value: true }), e), ll = {};
Qy(ll, { default: () => ul });
var ul, Zy = Vy(() => {
  ul = {};
}), eg = Ky((e, t) => {
  var { existsSync: r, readFileSync: n } = Ho("node:fs"), { dirname: o, join: s } = Ho("node:path"), { SourceMapConsumer: u, SourceMapGenerator: c } = (Zy(), Xy(ll));
  function i(f) {
    return Gt ? Gt.from(f, "base64").toString() : window.atob(f);
  }
  var p = class {
    constructor(f, a) {
      if (a.map === false) return;
      this.loadAnnotation(f), this.inline = this.startWith(this.annotation, "data:");
      let d = a.map ? a.map.prev : void 0, h = this.loadMap(a.from, d);
      !this.mapFile && a.from && (this.mapFile = a.from), this.mapFile && (this.root = o(this.mapFile)), h && (this.text = h);
    }
    consumer() {
      return this.consumerCache || (this.consumerCache = new u(this.text)), this.consumerCache;
    }
    decodeInline(f) {
      let a = /^data:application\/json;charset=utf-?8;base64,/, d = /^data:application\/json;base64,/, h = /^data:application\/json;charset=utf-?8,/, b = /^data:application\/json,/, l = f.match(h) || f.match(b);
      if (l) return decodeURIComponent(f.substr(l[0].length));
      let y = f.match(a) || f.match(d);
      if (y) return i(f.substr(y[0].length));
      let m = f.match(/data:application\/json;([^,]+),/)[1];
      throw new Error("Unsupported source map encoding " + m);
    }
    getAnnotationURL(f) {
      return f.replace(/^\/\*\s*# sourceMappingURL=/, "").trim();
    }
    isMap(f) {
      return typeof f != "object" ? false : typeof f.mappings == "string" || typeof f._mappings == "string" || Array.isArray(f.sections);
    }
    loadAnnotation(f) {
      let a = f.match(/\/\*\s*# sourceMappingURL=/g);
      if (!a) return;
      let d = f.lastIndexOf(a.pop()), h = f.indexOf("*/", d);
      d > -1 && h > -1 && (this.annotation = this.getAnnotationURL(f.substring(d, h)));
    }
    loadFile(f) {
      if (this.root = o(f), r(f)) return this.mapFile = f, n(f, "utf-8").toString().trim();
    }
    loadMap(f, a) {
      if (a === false) return false;
      if (a) {
        if (typeof a == "string") return a;
        if (typeof a == "function") {
          let d = a(f);
          if (d) {
            let h = this.loadFile(d);
            if (!h) throw new Error("Unable to load previous source map: " + d.toString());
            return h;
          }
        } else {
          if (a instanceof u) return c.fromSourceMap(a).toString();
          if (a instanceof c) return a.toString();
          if (this.isMap(a)) return JSON.stringify(a);
          throw new Error("Unsupported previous source map format: " + a.toString());
        }
      } else {
        if (this.inline) return this.decodeInline(this.annotation);
        if (this.annotation) {
          let d = this.annotation;
          return f && (d = s(o(f), d)), this.loadFile(d);
        }
      }
    }
    startWith(f, a) {
      return f ? f.substr(0, a.length) === a : false;
    }
    withContent() {
      return !!(this.consumer().sourcesContent && this.consumer().sourcesContent.length > 0);
    }
  };
  t.exports = p, p.default = p;
}), Vo = Jy(eg()), tg = Vo.default ?? Vo;
const cl = Object.freeze(Object.defineProperty({ __proto__: null, default: tg }, Symbol.toStringTag, { value: "Module" }));
var He = (e) => {
  const t = (n) => typeof n.default < "u" ? n.default : n, r = (n) => Object.assign({ __esModule: true }, n);
  switch (e) {
    case "nanoid/non-secure":
      return r(cy);
    case "node:path":
      return t(Gr);
    case "node:url":
      return t(ja);
    case "postcss/lib/css-syntax-error":
      return t(Qr);
    case "postcss/lib/previous-map":
      return t(cl);
    case "postcss/lib/terminal-highlight":
      return t(Ia);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, rg = Object.create, ir = Object.defineProperty, og = Object.getOwnPropertyDescriptor, ng = Object.getOwnPropertyNames, sg = Object.getPrototypeOf, ig = Object.prototype.hasOwnProperty, Ve = ((e) => typeof He < "u" ? He : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof He < "u" ? He : t)[r] }) : e)(function(e) {
  if (typeof He < "u") return He.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), ag = (e, t) => () => (e && (t = e(e = 0)), t), lg = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), ug = (e, t) => {
  for (var r in t) ir(e, r, { get: t[r], enumerable: true });
}, fl = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of ng(t)) !ig.call(e, o) && o !== r && ir(e, o, { get: () => t[o], enumerable: !(n = og(t, o)) || n.enumerable });
  return e;
}, cg = (e, t, r) => (r = e != null ? rg(sg(e)) : {}, fl(!e || !e.__esModule ? ir(r, "default", { value: e, enumerable: true }) : r, e)), fg = (e) => fl(ir({}, "__esModule", { value: true }), e), pl = {};
ug(pl, { default: () => hl });
var hl, pg = ag(() => {
  hl = {};
}), hg = lg((e, t) => {
  var { nanoid: r } = Ve("nanoid/non-secure"), { isAbsolute: n, resolve: o } = Ve("node:path"), { SourceMapConsumer: s, SourceMapGenerator: u } = (pg(), fg(pl)), { fileURLToPath: c, pathToFileURL: i } = Ve("node:url"), p = Ve("postcss/lib/css-syntax-error"), f = Ve("postcss/lib/previous-map"), a = Ve("postcss/lib/terminal-highlight"), d = Symbol("fromOffsetCache"), h = !!(s && u), b = !!(o && n), l = class {
    get from() {
      return this.file || this.id;
    }
    constructor(y, m = {}) {
      if (y === null || typeof y > "u" || typeof y == "object" && !y.toString) throw new Error(`PostCSS received ${y} instead of CSS string`);
      if (this.css = y.toString(), this.css[0] === "\uFEFF" || this.css[0] === "\uFFFE" ? (this.hasBOM = true, this.css = this.css.slice(1)) : this.hasBOM = false, this.document = this.css, m.document && (this.document = m.document.toString()), m.from && (!b || /^\w+:\/\//.test(m.from) || n(m.from) ? this.file = m.from : this.file = o(m.from)), b && h) {
        let g = new f(this.css, m);
        if (g.text) {
          this.map = g;
          let $ = g.consumer().file;
          !this.file && $ && (this.file = this.mapResolve($));
        }
      }
      this.file || (this.id = "<input css " + r(6) + ">"), this.map && (this.map.file = this.from);
    }
    error(y, m, g, $ = {}) {
      let O, v, w;
      if (m && typeof m == "object") {
        let x = m, S = g;
        if (typeof x.offset == "number") {
          let j = this.fromOffset(x.offset);
          m = j.line, g = j.col;
        } else m = x.line, g = x.column;
        if (typeof S.offset == "number") {
          let j = this.fromOffset(S.offset);
          v = j.line, O = j.col;
        } else v = S.line, O = S.column;
      } else if (!g) {
        let x = this.fromOffset(m);
        m = x.line, g = x.col;
      }
      let _ = this.origin(m, g, v, O);
      return _ ? w = new p(y, _.endLine === void 0 ? _.line : { column: _.column, line: _.line }, _.endLine === void 0 ? _.column : { column: _.endColumn, line: _.endLine }, _.source, _.file, $.plugin) : w = new p(y, v === void 0 ? m : { column: g, line: m }, v === void 0 ? g : { column: O, line: v }, this.css, this.file, $.plugin), w.input = { column: g, endColumn: O, endLine: v, line: m, source: this.css }, this.file && (i && (w.input.url = i(this.file).toString()), w.input.file = this.file), w;
    }
    fromOffset(y) {
      let m, g;
      if (this[d]) g = this[d];
      else {
        let O = this.css.split(`
`);
        g = new Array(O.length);
        let v = 0;
        for (let w = 0, _ = O.length; w < _; w++) g[w] = v, v += O[w].length + 1;
        this[d] = g;
      }
      m = g[g.length - 1];
      let $ = 0;
      if (y >= m) $ = g.length - 1;
      else {
        let O = g.length - 2, v;
        for (; $ < O; ) if (v = $ + (O - $ >> 1), y < g[v]) O = v - 1;
        else if (y >= g[v + 1]) $ = v + 1;
        else {
          $ = v;
          break;
        }
      }
      return { col: y - g[$] + 1, line: $ + 1 };
    }
    mapResolve(y) {
      return /^\w+:\/\//.test(y) ? y : o(this.map.consumer().sourceRoot || this.map.root || ".", y);
    }
    origin(y, m, g, $) {
      if (!this.map) return false;
      let O = this.map.consumer(), v = O.originalPositionFor({ column: m, line: y });
      if (!v.source) return false;
      let w;
      typeof g == "number" && (w = O.originalPositionFor({ column: $, line: g }));
      let _;
      n(v.source) ? _ = i(v.source) : _ = new URL(v.source, this.map.consumer().sourceRoot || i(this.map.mapFile));
      let x = { column: v.column, endColumn: w && w.column, endLine: w && w.line, line: v.line, url: _.toString() };
      if (_.protocol === "file:") if (c) x.file = c(_);
      else throw new Error("file: protocol is not available in this PostCSS build");
      let S = O.sourceContentFor(v.source);
      return S && (x.source = S), x;
    }
    toJSON() {
      let y = {};
      for (let m of ["hasBOM", "css", "file", "id"]) this[m] != null && (y[m] = this[m]);
      return this.map && (y.map = { ...this.map }, y.map.consumerCache && (y.map.consumerCache = void 0)), y;
    }
  };
  t.exports = l, l.default = l, a && a.registerInput && a.registerInput(l);
}), Ko = cg(hg()), dg = Ko.default ?? Ko;
const ar = Object.freeze(Object.defineProperty({ __proto__: null, default: dg }, Symbol.toStringTag, { value: "Module" }));
var Ke = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/container":
      return t(De);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, yg = Object.create, dl = Object.defineProperty, gg = Object.getOwnPropertyDescriptor, mg = Object.getOwnPropertyNames, bg = Object.getPrototypeOf, vg = Object.prototype.hasOwnProperty, wg = ((e) => typeof Ke < "u" ? Ke : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Ke < "u" ? Ke : t)[r] }) : e)(function(e) {
  if (typeof Ke < "u") return Ke.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Og = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), $g = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of mg(t)) !vg.call(e, o) && o !== r && dl(e, o, { get: () => t[o], enumerable: !(n = gg(t, o)) || n.enumerable });
  return e;
}, xg = (e, t, r) => (r = e != null ? yg(bg(e)) : {}, $g(!e || !e.__esModule ? dl(r, "default", { value: e, enumerable: true }) : r, e)), _g = Og((e, t) => {
  var r = wg("postcss/lib/container"), n, o, s = class extends r {
    constructor(u) {
      super(u), this.type = "root", this.nodes || (this.nodes = []);
    }
    normalize(u, c, i) {
      let p = super.normalize(u);
      if (c) {
        if (i === "prepend") this.nodes.length > 1 ? c.raws.before = this.nodes[1].raws.before : delete c.raws.before;
        else if (this.first !== c) for (let f of p) f.raws.before = c.raws.before;
      }
      return p;
    }
    removeChild(u, c) {
      let i = this.index(u);
      return !c && i === 0 && this.nodes.length > 1 && (this.nodes[1].raws.before = this.nodes[i].raws.before), super.removeChild(u);
    }
    toResult(u = {}) {
      return new n(new o(), this, u).stringify();
    }
  };
  s.registerLazyResult = (u) => {
    n = u;
  }, s.registerProcessor = (u) => {
    o = u;
  }, t.exports = s, s.default = s, r.registerRoot(s);
}), Qo = xg(_g()), Sg = Qo.default ?? Qo;
const It = Object.freeze(Object.defineProperty({ __proto__: null, default: Sg }, Symbol.toStringTag, { value: "Module" }));
var Pg = Object.create, yl = Object.defineProperty, jg = Object.getOwnPropertyDescriptor, kg = Object.getOwnPropertyNames, Eg = Object.getPrototypeOf, Tg = Object.prototype.hasOwnProperty, Ag = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Cg = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of kg(t)) !Tg.call(e, o) && o !== r && yl(e, o, { get: () => t[o], enumerable: !(n = jg(t, o)) || n.enumerable });
  return e;
}, Ig = (e, t, r) => (r = e != null ? Pg(Eg(e)) : {}, Cg(!e || !e.__esModule ? yl(r, "default", { value: e, enumerable: true }) : r, e)), Rg = Ag((e, t) => {
  var r = { comma(n) {
    return r.split(n, [","], true);
  }, space(n) {
    let o = [" ", `
`, "	"];
    return r.split(n, o);
  }, split(n, o, s) {
    let u = [], c = "", i = false, p = 0, f = false, a = "", d = false;
    for (let h of n) d ? d = false : h === "\\" ? d = true : f ? h === a && (f = false) : h === '"' || h === "'" ? (f = true, a = h) : h === "(" ? p += 1 : h === ")" ? p > 0 && (p -= 1) : p === 0 && o.includes(h) && (i = true), i ? (c !== "" && u.push(c.trim()), c = "", i = false) : c += h;
    return (s || c !== "") && u.push(c.trim()), u;
  } };
  t.exports = r, r.default = r;
}), Cr = Ig(Rg()), { comma: Dg, space: Mg, split: Lg } = Cr, Fg = Cr.default ?? Cr;
const gl = Object.freeze(Object.defineProperty({ __proto__: null, comma: Dg, default: Fg, space: Mg, split: Lg }, Symbol.toStringTag, { value: "Module" }));
var Qe = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/container":
      return t(De);
    case "postcss/lib/list":
      return t(gl);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Ug = Object.create, ml = Object.defineProperty, Ng = Object.getOwnPropertyDescriptor, Bg = Object.getOwnPropertyNames, qg = Object.getPrototypeOf, zg = Object.prototype.hasOwnProperty, Jo = ((e) => typeof Qe < "u" ? Qe : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Qe < "u" ? Qe : t)[r] }) : e)(function(e) {
  if (typeof Qe < "u") return Qe.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Wg = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Gg = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Bg(t)) !zg.call(e, o) && o !== r && ml(e, o, { get: () => t[o], enumerable: !(n = Ng(t, o)) || n.enumerable });
  return e;
}, Yg = (e, t, r) => (r = e != null ? Ug(qg(e)) : {}, Gg(!e || !e.__esModule ? ml(r, "default", { value: e, enumerable: true }) : r, e)), Hg = Wg((e, t) => {
  var r = Jo("postcss/lib/container"), n = Jo("postcss/lib/list"), o = class extends r {
    get selectors() {
      return n.comma(this.selector);
    }
    set selectors(s) {
      let u = this.selector ? this.selector.match(/,\s*/) : null, c = u ? u[0] : "," + this.raw("between", "beforeOpen");
      this.selector = s.join(c);
    }
    constructor(s) {
      super(s), this.type = "rule", this.nodes || (this.nodes = []);
    }
  };
  t.exports = o, o.default = o, r.registerRule(o);
}), Xo = Yg(Hg()), Vg = Xo.default ?? Xo;
const no = Object.freeze(Object.defineProperty({ __proto__: null, default: Vg }, Symbol.toStringTag, { value: "Module" }));
var Je = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/at-rule":
      return t(Xr);
    case "postcss/lib/comment":
      return t(er);
    case "postcss/lib/declaration":
      return t(tr);
    case "postcss/lib/input":
      return t(ar);
    case "postcss/lib/previous-map":
      return t(cl);
    case "postcss/lib/root":
      return t(It);
    case "postcss/lib/rule":
      return t(no);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Kg = Object.create, bl = Object.defineProperty, Qg = Object.getOwnPropertyDescriptor, Jg = Object.getOwnPropertyNames, Xg = Object.getPrototypeOf, Zg = Object.prototype.hasOwnProperty, Ie = ((e) => typeof Je < "u" ? Je : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Je < "u" ? Je : t)[r] }) : e)(function(e) {
  if (typeof Je < "u") return Je.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), em = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), tm = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Jg(t)) !Zg.call(e, o) && o !== r && bl(e, o, { get: () => t[o], enumerable: !(n = Qg(t, o)) || n.enumerable });
  return e;
}, rm = (e, t, r) => (r = e != null ? Kg(Xg(e)) : {}, tm(!e || !e.__esModule ? bl(r, "default", { value: e, enumerable: true }) : r, e)), om = em((e, t) => {
  var r = Ie("postcss/lib/at-rule"), n = Ie("postcss/lib/comment"), o = Ie("postcss/lib/declaration"), s = Ie("postcss/lib/input"), u = Ie("postcss/lib/previous-map"), c = Ie("postcss/lib/root"), i = Ie("postcss/lib/rule");
  function p(f, a) {
    if (Array.isArray(f)) return f.map((b) => p(b));
    let { inputs: d, ...h } = f;
    if (d) {
      a = [];
      for (let b of d) {
        let l = { ...b, __proto__: s.prototype };
        l.map && (l.map = { ...l.map, __proto__: u.prototype }), a.push(l);
      }
    }
    if (h.nodes && (h.nodes = f.nodes.map((b) => p(b, a))), h.source) {
      let { inputId: b, ...l } = h.source;
      h.source = l, b != null && (h.source.input = a[b]);
    }
    if (h.type === "root") return new c(h);
    if (h.type === "decl") return new o(h);
    if (h.type === "rule") return new i(h);
    if (h.type === "comment") return new n(h);
    if (h.type === "atrule") return new r(h);
    throw new Error("Unknown node type: " + f.type);
  }
  t.exports = p, p.default = p;
}), Zo = rm(om()), nm = Zo.default ?? Zo;
const sm = Object.freeze(Object.defineProperty({ __proto__: null, default: nm }, Symbol.toStringTag, { value: "Module" }));
var Xe = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "node:path":
      return t(Gr);
    case "node:url":
      return t(ja);
    case "postcss/lib/input":
      return t(ar);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, im = Object.create, lr = Object.defineProperty, am = Object.getOwnPropertyDescriptor, lm = Object.getOwnPropertyNames, um = Object.getPrototypeOf, cm = Object.prototype.hasOwnProperty, gr = ((e) => typeof Xe < "u" ? Xe : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Xe < "u" ? Xe : t)[r] }) : e)(function(e) {
  if (typeof Xe < "u") return Xe.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), fm = (e, t) => () => (e && (t = e(e = 0)), t), pm = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), hm = (e, t) => {
  for (var r in t) lr(e, r, { get: t[r], enumerable: true });
}, vl = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of lm(t)) !cm.call(e, o) && o !== r && lr(e, o, { get: () => t[o], enumerable: !(n = am(t, o)) || n.enumerable });
  return e;
}, dm = (e, t, r) => (r = e != null ? im(um(e)) : {}, vl(!e || !e.__esModule ? lr(r, "default", { value: e, enumerable: true }) : r, e)), ym = (e) => vl(lr({}, "__esModule", { value: true }), e), wl = {};
hm(wl, { default: () => Ol });
var Ol, gm = fm(() => {
  Ol = {};
}), mm = pm((e, t) => {
  var { dirname: r, relative: n, resolve: o, sep: s } = gr("node:path"), { SourceMapConsumer: u, SourceMapGenerator: c } = (gm(), ym(wl)), { pathToFileURL: i } = gr("node:url"), p = gr("postcss/lib/input"), f = !!(u && c), a = !!(r && o && n && s), d = class {
    constructor(h, b, l, y) {
      this.stringify = h, this.mapOpts = l.map || {}, this.root = b, this.opts = l, this.css = y, this.originalCSS = y, this.usesFileUrls = !this.mapOpts.from && this.mapOpts.absolute, this.memoizedFileURLs = /* @__PURE__ */ new Map(), this.memoizedPaths = /* @__PURE__ */ new Map(), this.memoizedURLs = /* @__PURE__ */ new Map();
    }
    addAnnotation() {
      let h;
      this.isInline() ? h = "data:application/json;base64," + this.toBase64(this.map.toString()) : typeof this.mapOpts.annotation == "string" ? h = this.mapOpts.annotation : typeof this.mapOpts.annotation == "function" ? h = this.mapOpts.annotation(this.opts.to, this.root) : h = this.outputFile() + ".map";
      let b = `
`;
      this.css.includes(`\r
`) && (b = `\r
`), this.css += b + "/*# sourceMappingURL=" + h + " */";
    }
    applyPrevMaps() {
      for (let h of this.previous()) {
        let b = this.toUrl(this.path(h.file)), l = h.root || r(h.file), y;
        this.mapOpts.sourcesContent === false ? (y = new u(h.text), y.sourcesContent && (y.sourcesContent = null)) : y = h.consumer(), this.map.applySourceMap(y, b, this.toUrl(this.path(l)));
      }
    }
    clearAnnotation() {
      if (this.mapOpts.annotation !== false) if (this.root) {
        let h;
        for (let b = this.root.nodes.length - 1; b >= 0; b--) h = this.root.nodes[b], h.type === "comment" && h.text.startsWith("# sourceMappingURL=") && this.root.removeChild(b);
      } else this.css && (this.css = this.css.replace(/\n*\/\*#[\S\s]*?\*\/$/gm, ""));
    }
    generate() {
      if (this.clearAnnotation(), a && f && this.isMap()) return this.generateMap();
      {
        let h = "";
        return this.stringify(this.root, (b) => {
          h += b;
        }), [h];
      }
    }
    generateMap() {
      if (this.root) this.generateString();
      else if (this.previous().length === 1) {
        let h = this.previous()[0].consumer();
        h.file = this.outputFile(), this.map = c.fromSourceMap(h, { ignoreInvalidMapping: true });
      } else this.map = new c({ file: this.outputFile(), ignoreInvalidMapping: true }), this.map.addMapping({ generated: { column: 0, line: 1 }, original: { column: 0, line: 1 }, source: this.opts.from ? this.toUrl(this.path(this.opts.from)) : "<no source>" });
      return this.isSourcesContent() && this.setSourcesContent(), this.root && this.previous().length > 0 && this.applyPrevMaps(), this.isAnnotation() && this.addAnnotation(), this.isInline() ? [this.css] : [this.css, this.map];
    }
    generateString() {
      this.css = "", this.map = new c({ file: this.outputFile(), ignoreInvalidMapping: true });
      let h = 1, b = 1, l = "<no source>", y = { generated: { column: 0, line: 0 }, original: { column: 0, line: 0 }, source: "" }, m, g;
      this.stringify(this.root, ($, O, v) => {
        if (this.css += $, O && v !== "end" && (y.generated.line = h, y.generated.column = b - 1, O.source && O.source.start ? (y.source = this.sourcePath(O), y.original.line = O.source.start.line, y.original.column = O.source.start.column - 1, this.map.addMapping(y)) : (y.source = l, y.original.line = 1, y.original.column = 0, this.map.addMapping(y))), g = $.match(/\n/g), g ? (h += g.length, m = $.lastIndexOf(`
`), b = $.length - m) : b += $.length, O && v !== "start") {
          let w = O.parent || { raws: {} };
          (!(O.type === "decl" || O.type === "atrule" && !O.nodes) || O !== w.last || w.raws.semicolon) && (O.source && O.source.end ? (y.source = this.sourcePath(O), y.original.line = O.source.end.line, y.original.column = O.source.end.column - 1, y.generated.line = h, y.generated.column = b - 2, this.map.addMapping(y)) : (y.source = l, y.original.line = 1, y.original.column = 0, y.generated.line = h, y.generated.column = b - 1, this.map.addMapping(y)));
        }
      });
    }
    isAnnotation() {
      return this.isInline() ? true : typeof this.mapOpts.annotation < "u" ? this.mapOpts.annotation : this.previous().length ? this.previous().some((h) => h.annotation) : true;
    }
    isInline() {
      if (typeof this.mapOpts.inline < "u") return this.mapOpts.inline;
      let h = this.mapOpts.annotation;
      return typeof h < "u" && h !== true ? false : this.previous().length ? this.previous().some((b) => b.inline) : true;
    }
    isMap() {
      return typeof this.opts.map < "u" ? !!this.opts.map : this.previous().length > 0;
    }
    isSourcesContent() {
      return typeof this.mapOpts.sourcesContent < "u" ? this.mapOpts.sourcesContent : this.previous().length ? this.previous().some((h) => h.withContent()) : true;
    }
    outputFile() {
      return this.opts.to ? this.path(this.opts.to) : this.opts.from ? this.path(this.opts.from) : "to.css";
    }
    path(h) {
      if (this.mapOpts.absolute || h.charCodeAt(0) === 60 || /^\w+:\/\//.test(h)) return h;
      let b = this.memoizedPaths.get(h);
      if (b) return b;
      let l = this.opts.to ? r(this.opts.to) : ".";
      typeof this.mapOpts.annotation == "string" && (l = r(o(l, this.mapOpts.annotation)));
      let y = n(l, h);
      return this.memoizedPaths.set(h, y), y;
    }
    previous() {
      if (!this.previousMaps) if (this.previousMaps = [], this.root) this.root.walk((h) => {
        if (h.source && h.source.input.map) {
          let b = h.source.input.map;
          this.previousMaps.includes(b) || this.previousMaps.push(b);
        }
      });
      else {
        let h = new p(this.originalCSS, this.opts);
        h.map && this.previousMaps.push(h.map);
      }
      return this.previousMaps;
    }
    setSourcesContent() {
      let h = {};
      if (this.root) this.root.walk((b) => {
        if (b.source) {
          let l = b.source.input.from;
          if (l && !h[l]) {
            h[l] = true;
            let y = this.usesFileUrls ? this.toFileUrl(l) : this.toUrl(this.path(l));
            this.map.setSourceContent(y, b.source.input.css);
          }
        }
      });
      else if (this.css) {
        let b = this.opts.from ? this.toUrl(this.path(this.opts.from)) : "<no source>";
        this.map.setSourceContent(b, this.css);
      }
    }
    sourcePath(h) {
      return this.mapOpts.from ? this.toUrl(this.mapOpts.from) : this.usesFileUrls ? this.toFileUrl(h.source.input.from) : this.toUrl(this.path(h.source.input.from));
    }
    toBase64(h) {
      return Gt ? Gt.from(h).toString("base64") : window.btoa(unescape(encodeURIComponent(h)));
    }
    toFileUrl(h) {
      let b = this.memoizedFileURLs.get(h);
      if (b) return b;
      if (i) {
        let l = i(h).toString();
        return this.memoizedFileURLs.set(h, l), l;
      } else throw new Error("`map.absolute` option is not available in this PostCSS build");
    }
    toUrl(h) {
      let b = this.memoizedURLs.get(h);
      if (b) return b;
      s === "\\" && (h = h.replace(/\\/g, "/"));
      let l = encodeURI(h).replace(/[#?]/g, encodeURIComponent);
      return this.memoizedURLs.set(h, l), l;
    }
  };
  t.exports = d;
}), en = dm(mm()), bm = en.default ?? en;
const $l = Object.freeze(Object.defineProperty({ __proto__: null, default: bm }, Symbol.toStringTag, { value: "Module" }));
var Ze = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/at-rule":
      return t(Xr);
    case "postcss/lib/comment":
      return t(er);
    case "postcss/lib/declaration":
      return t(tr);
    case "postcss/lib/root":
      return t(It);
    case "postcss/lib/rule":
      return t(no);
    case "postcss/lib/tokenize":
      return t(Aa);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, vm = Object.create, xl = Object.defineProperty, wm = Object.getOwnPropertyDescriptor, Om = Object.getOwnPropertyNames, $m = Object.getPrototypeOf, xm = Object.prototype.hasOwnProperty, et = ((e) => typeof Ze < "u" ? Ze : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof Ze < "u" ? Ze : t)[r] }) : e)(function(e) {
  if (typeof Ze < "u") return Ze.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), _m = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Sm = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Om(t)) !xm.call(e, o) && o !== r && xl(e, o, { get: () => t[o], enumerable: !(n = wm(t, o)) || n.enumerable });
  return e;
}, Pm = (e, t, r) => (r = e != null ? vm($m(e)) : {}, Sm(!e || !e.__esModule ? xl(r, "default", { value: e, enumerable: true }) : r, e)), jm = _m((e, t) => {
  var r = et("postcss/lib/at-rule"), n = et("postcss/lib/comment"), o = et("postcss/lib/declaration"), s = et("postcss/lib/root"), u = et("postcss/lib/rule"), c = et("postcss/lib/tokenize"), i = { empty: true, space: true };
  function p(a) {
    for (let d = a.length - 1; d >= 0; d--) {
      let h = a[d], b = h[3] || h[2];
      if (b) return b;
    }
  }
  var f = class {
    constructor(a) {
      this.input = a, this.root = new s(), this.current = this.root, this.spaces = "", this.semicolon = false, this.createTokenizer(), this.root.source = { input: a, start: { column: 1, line: 1, offset: 0 } };
    }
    atrule(a) {
      let d = new r();
      d.name = a[1].slice(1), d.name === "" && this.unnamedAtrule(d, a), this.init(d, a[2]);
      let h, b, l, y = false, m = false, g = [], $ = [];
      for (; !this.tokenizer.endOfFile(); ) {
        if (a = this.tokenizer.nextToken(), h = a[0], h === "(" || h === "[" ? $.push(h === "(" ? ")" : "]") : h === "{" && $.length > 0 ? $.push("}") : h === $[$.length - 1] && $.pop(), $.length === 0) if (h === ";") {
          d.source.end = this.getPosition(a[2]), d.source.end.offset++, this.semicolon = true;
          break;
        } else if (h === "{") {
          m = true;
          break;
        } else if (h === "}") {
          if (g.length > 0) {
            for (l = g.length - 1, b = g[l]; b && b[0] === "space"; ) b = g[--l];
            b && (d.source.end = this.getPosition(b[3] || b[2]), d.source.end.offset++);
          }
          this.end(a);
          break;
        } else g.push(a);
        else g.push(a);
        if (this.tokenizer.endOfFile()) {
          y = true;
          break;
        }
      }
      d.raws.between = this.spacesAndCommentsFromEnd(g), g.length ? (d.raws.afterName = this.spacesAndCommentsFromStart(g), this.raw(d, "params", g), y && (a = g[g.length - 1], d.source.end = this.getPosition(a[3] || a[2]), d.source.end.offset++, this.spaces = d.raws.between, d.raws.between = "")) : (d.raws.afterName = "", d.params = ""), m && (d.nodes = [], this.current = d);
    }
    checkMissedSemicolon(a) {
      let d = this.colon(a);
      if (d === false) return;
      let h = 0, b;
      for (let l = d - 1; l >= 0 && (b = a[l], !(b[0] !== "space" && (h += 1, h === 2))); l--) ;
      throw this.input.error("Missed semicolon", b[0] === "word" ? b[3] + 1 : b[2]);
    }
    colon(a) {
      let d = 0, h, b, l;
      for (let [y, m] of a.entries()) {
        if (b = m, l = b[0], l === "(" && (d += 1), l === ")" && (d -= 1), d === 0 && l === ":") if (!h) this.doubleColon(b);
        else {
          if (h[0] === "word" && h[1] === "progid") continue;
          return y;
        }
        h = b;
      }
      return false;
    }
    comment(a) {
      let d = new n();
      this.init(d, a[2]), d.source.end = this.getPosition(a[3] || a[2]), d.source.end.offset++;
      let h = a[1].slice(2, -2);
      if (/^\s*$/.test(h)) d.text = "", d.raws.left = h, d.raws.right = "";
      else {
        let b = h.match(/^(\s*)([^]*\S)(\s*)$/);
        d.text = b[2], d.raws.left = b[1], d.raws.right = b[3];
      }
    }
    createTokenizer() {
      this.tokenizer = c(this.input);
    }
    decl(a, d) {
      let h = new o();
      this.init(h, a[0][2]);
      let b = a[a.length - 1];
      for (b[0] === ";" && (this.semicolon = true, a.pop()), h.source.end = this.getPosition(b[3] || b[2] || p(a)), h.source.end.offset++; a[0][0] !== "word"; ) a.length === 1 && this.unknownWord(a), h.raws.before += a.shift()[1];
      for (h.source.start = this.getPosition(a[0][2]), h.prop = ""; a.length; ) {
        let g = a[0][0];
        if (g === ":" || g === "space" || g === "comment") break;
        h.prop += a.shift()[1];
      }
      h.raws.between = "";
      let l;
      for (; a.length; ) if (l = a.shift(), l[0] === ":") {
        h.raws.between += l[1];
        break;
      } else l[0] === "word" && /\w/.test(l[1]) && this.unknownWord([l]), h.raws.between += l[1];
      (h.prop[0] === "_" || h.prop[0] === "*") && (h.raws.before += h.prop[0], h.prop = h.prop.slice(1));
      let y = [], m;
      for (; a.length && (m = a[0][0], !(m !== "space" && m !== "comment")); ) y.push(a.shift());
      this.precheckMissedSemicolon(a);
      for (let g = a.length - 1; g >= 0; g--) {
        if (l = a[g], l[1].toLowerCase() === "!important") {
          h.important = true;
          let $ = this.stringFrom(a, g);
          $ = this.spacesFromEnd(a) + $, $ !== " !important" && (h.raws.important = $);
          break;
        } else if (l[1].toLowerCase() === "important") {
          let $ = a.slice(0), O = "";
          for (let v = g; v > 0; v--) {
            let w = $[v][0];
            if (O.trim().startsWith("!") && w !== "space") break;
            O = $.pop()[1] + O;
          }
          O.trim().startsWith("!") && (h.important = true, h.raws.important = O, a = $);
        }
        if (l[0] !== "space" && l[0] !== "comment") break;
      }
      a.some((g) => g[0] !== "space" && g[0] !== "comment") && (h.raws.between += y.map((g) => g[1]).join(""), y = []), this.raw(h, "value", y.concat(a), d), h.value.includes(":") && !d && this.checkMissedSemicolon(a);
    }
    doubleColon(a) {
      throw this.input.error("Double colon", { offset: a[2] }, { offset: a[2] + a[1].length });
    }
    emptyRule(a) {
      let d = new u();
      this.init(d, a[2]), d.selector = "", d.raws.between = "", this.current = d;
    }
    end(a) {
      this.current.nodes && this.current.nodes.length && (this.current.raws.semicolon = this.semicolon), this.semicolon = false, this.current.raws.after = (this.current.raws.after || "") + this.spaces, this.spaces = "", this.current.parent ? (this.current.source.end = this.getPosition(a[2]), this.current.source.end.offset++, this.current = this.current.parent) : this.unexpectedClose(a);
    }
    endFile() {
      this.current.parent && this.unclosedBlock(), this.current.nodes && this.current.nodes.length && (this.current.raws.semicolon = this.semicolon), this.current.raws.after = (this.current.raws.after || "") + this.spaces, this.root.source.end = this.getPosition(this.tokenizer.position());
    }
    freeSemicolon(a) {
      if (this.spaces += a[1], this.current.nodes) {
        let d = this.current.nodes[this.current.nodes.length - 1];
        d && d.type === "rule" && !d.raws.ownSemicolon && (d.raws.ownSemicolon = this.spaces, this.spaces = "", d.source.end = this.getPosition(a[2]), d.source.end.offset += d.raws.ownSemicolon.length);
      }
    }
    getPosition(a) {
      let d = this.input.fromOffset(a);
      return { column: d.col, line: d.line, offset: a };
    }
    init(a, d) {
      this.current.push(a), a.source = { input: this.input, start: this.getPosition(d) }, a.raws.before = this.spaces, this.spaces = "", a.type !== "comment" && (this.semicolon = false);
    }
    other(a) {
      let d = false, h = null, b = false, l = null, y = [], m = a[1].startsWith("--"), g = [], $ = a;
      for (; $; ) {
        if (h = $[0], g.push($), h === "(" || h === "[") l || (l = $), y.push(h === "(" ? ")" : "]");
        else if (m && b && h === "{") l || (l = $), y.push("}");
        else if (y.length === 0) if (h === ";") if (b) {
          this.decl(g, m);
          return;
        } else break;
        else if (h === "{") {
          this.rule(g);
          return;
        } else if (h === "}") {
          this.tokenizer.back(g.pop()), d = true;
          break;
        } else h === ":" && (b = true);
        else h === y[y.length - 1] && (y.pop(), y.length === 0 && (l = null));
        $ = this.tokenizer.nextToken();
      }
      if (this.tokenizer.endOfFile() && (d = true), y.length > 0 && this.unclosedBracket(l), d && b) {
        if (!m) for (; g.length && ($ = g[g.length - 1][0], !($ !== "space" && $ !== "comment")); ) this.tokenizer.back(g.pop());
        this.decl(g, m);
      } else this.unknownWord(g);
    }
    parse() {
      let a;
      for (; !this.tokenizer.endOfFile(); ) switch (a = this.tokenizer.nextToken(), a[0]) {
        case "space":
          this.spaces += a[1];
          break;
        case ";":
          this.freeSemicolon(a);
          break;
        case "}":
          this.end(a);
          break;
        case "comment":
          this.comment(a);
          break;
        case "at-word":
          this.atrule(a);
          break;
        case "{":
          this.emptyRule(a);
          break;
        default:
          this.other(a);
          break;
      }
      this.endFile();
    }
    precheckMissedSemicolon() {
    }
    raw(a, d, h, b) {
      let l, y, m = h.length, g = "", $ = true, O, v;
      for (let w = 0; w < m; w += 1) l = h[w], y = l[0], y === "space" && w === m - 1 && !b ? $ = false : y === "comment" ? (v = h[w - 1] ? h[w - 1][0] : "empty", O = h[w + 1] ? h[w + 1][0] : "empty", !i[v] && !i[O] ? g.slice(-1) === "," ? $ = false : g += l[1] : $ = false) : g += l[1];
      if (!$) {
        let w = h.reduce((_, x) => _ + x[1], "");
        a.raws[d] = { raw: w, value: g };
      }
      a[d] = g;
    }
    rule(a) {
      a.pop();
      let d = new u();
      this.init(d, a[0][2]), d.raws.between = this.spacesAndCommentsFromEnd(a), this.raw(d, "selector", a), this.current = d;
    }
    spacesAndCommentsFromEnd(a) {
      let d, h = "";
      for (; a.length && (d = a[a.length - 1][0], !(d !== "space" && d !== "comment")); ) h = a.pop()[1] + h;
      return h;
    }
    spacesAndCommentsFromStart(a) {
      let d, h = "";
      for (; a.length && (d = a[0][0], !(d !== "space" && d !== "comment")); ) h += a.shift()[1];
      return h;
    }
    spacesFromEnd(a) {
      let d, h = "";
      for (; a.length && (d = a[a.length - 1][0], d === "space"); ) h = a.pop()[1] + h;
      return h;
    }
    stringFrom(a, d) {
      let h = "";
      for (let b = d; b < a.length; b++) h += a[b][1];
      return a.splice(d, a.length - d), h;
    }
    unclosedBlock() {
      let a = this.current.source.start;
      throw this.input.error("Unclosed block", a.line, a.column);
    }
    unclosedBracket(a) {
      throw this.input.error("Unclosed bracket", { offset: a[2] }, { offset: a[2] + 1 });
    }
    unexpectedClose(a) {
      throw this.input.error("Unexpected }", { offset: a[2] }, { offset: a[2] + 1 });
    }
    unknownWord(a) {
      throw this.input.error("Unknown word " + a[0][1], { offset: a[0][2] }, { offset: a[0][2] + a[0][1].length });
    }
    unnamedAtrule(a, d) {
      throw this.input.error("At-rule without name", { offset: d[2] }, { offset: d[2] + d[1].length });
    }
  };
  t.exports = f;
}), tn = Pm(jm()), km = tn.default ?? tn;
const Em = Object.freeze(Object.defineProperty({ __proto__: null, default: km }, Symbol.toStringTag, { value: "Module" }));
var tt = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/container":
      return t(De);
    case "postcss/lib/input":
      return t(ar);
    case "postcss/lib/parser":
      return t(Em);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Tm = Object.create, _l = Object.defineProperty, Am = Object.getOwnPropertyDescriptor, Cm = Object.getOwnPropertyNames, Im = Object.getPrototypeOf, Rm = Object.prototype.hasOwnProperty, mr = ((e) => typeof tt < "u" ? tt : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof tt < "u" ? tt : t)[r] }) : e)(function(e) {
  if (typeof tt < "u") return tt.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Dm = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Mm = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Cm(t)) !Rm.call(e, o) && o !== r && _l(e, o, { get: () => t[o], enumerable: !(n = Am(t, o)) || n.enumerable });
  return e;
}, Lm = (e, t, r) => (r = e != null ? Tm(Im(e)) : {}, Mm(!e || !e.__esModule ? _l(r, "default", { value: e, enumerable: true }) : r, e)), Fm = Dm((e, t) => {
  var r = mr("postcss/lib/container"), n = mr("postcss/lib/input"), o = mr("postcss/lib/parser");
  function s(u, c) {
    let i = new n(u, c), p = new o(i);
    try {
      p.parse();
    } catch (f) {
      throw f;
    }
    return p.root;
  }
  t.exports = s, s.default = s, r.registerParse(s);
}), rn = Lm(Fm()), Um = rn.default ?? rn;
const so = Object.freeze(Object.defineProperty({ __proto__: null, default: Um }, Symbol.toStringTag, { value: "Module" }));
var Nm = Object.create, Sl = Object.defineProperty, Bm = Object.getOwnPropertyDescriptor, qm = Object.getOwnPropertyNames, zm = Object.getPrototypeOf, Wm = Object.prototype.hasOwnProperty, Gm = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Ym = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of qm(t)) !Wm.call(e, o) && o !== r && Sl(e, o, { get: () => t[o], enumerable: !(n = Bm(t, o)) || n.enumerable });
  return e;
}, Hm = (e, t, r) => (r = e != null ? Nm(zm(e)) : {}, Ym(!e || !e.__esModule ? Sl(r, "default", { value: e, enumerable: true }) : r, e)), Vm = Gm((e, t) => {
  var r = class {
    constructor(n, o = {}) {
      if (this.type = "warning", this.text = n, o.node && o.node.source) {
        let s = o.node.rangeBy(o);
        this.line = s.start.line, this.column = s.start.column, this.endLine = s.end.line, this.endColumn = s.end.column;
      }
      for (let s in o) this[s] = o[s];
    }
    toString() {
      return this.node ? this.node.error(this.text, { index: this.index, plugin: this.plugin, word: this.word }).message : this.plugin ? this.plugin + ": " + this.text : this.text;
    }
  };
  t.exports = r, r.default = r;
}), on = Hm(Vm()), Km = on.default ?? on;
const Pl = Object.freeze(Object.defineProperty({ __proto__: null, default: Km }, Symbol.toStringTag, { value: "Module" }));
var rt = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/warning":
      return t(Pl);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Qm = Object.create, jl = Object.defineProperty, Jm = Object.getOwnPropertyDescriptor, Xm = Object.getOwnPropertyNames, Zm = Object.getPrototypeOf, e1 = Object.prototype.hasOwnProperty, t1 = ((e) => typeof rt < "u" ? rt : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof rt < "u" ? rt : t)[r] }) : e)(function(e) {
  if (typeof rt < "u") return rt.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), r1 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), o1 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Xm(t)) !e1.call(e, o) && o !== r && jl(e, o, { get: () => t[o], enumerable: !(n = Jm(t, o)) || n.enumerable });
  return e;
}, n1 = (e, t, r) => (r = e != null ? Qm(Zm(e)) : {}, o1(!e || !e.__esModule ? jl(r, "default", { value: e, enumerable: true }) : r, e)), s1 = r1((e, t) => {
  var r = t1("postcss/lib/warning"), n = class {
    get content() {
      return this.css;
    }
    constructor(o, s, u) {
      this.processor = o, this.messages = [], this.root = s, this.opts = u, this.css = void 0, this.map = void 0;
    }
    toString() {
      return this.css;
    }
    warn(o, s = {}) {
      s.plugin || this.lastPlugin && this.lastPlugin.postcssPlugin && (s.plugin = this.lastPlugin.postcssPlugin);
      let u = new r(o, s);
      return this.messages.push(u), u;
    }
    warnings() {
      return this.messages.filter((o) => o.type === "warning");
    }
  };
  t.exports = n, n.default = n;
}), nn = n1(s1()), i1 = nn.default ?? nn;
const io = Object.freeze(Object.defineProperty({ __proto__: null, default: i1 }, Symbol.toStringTag, { value: "Module" }));
var a1 = Object.create, kl = Object.defineProperty, l1 = Object.getOwnPropertyDescriptor, u1 = Object.getOwnPropertyNames, c1 = Object.getPrototypeOf, f1 = Object.prototype.hasOwnProperty, p1 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), h1 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of u1(t)) !f1.call(e, o) && o !== r && kl(e, o, { get: () => t[o], enumerable: !(n = l1(t, o)) || n.enumerable });
  return e;
}, d1 = (e, t, r) => (r = e != null ? a1(c1(e)) : {}, h1(!e || !e.__esModule ? kl(r, "default", { value: e, enumerable: true }) : r, e)), y1 = p1((e, t) => {
  var r = {};
  t.exports = function(n) {
    r[n] || (r[n] = true, typeof console < "u" && console.warn && console.warn(n));
  };
}), sn = d1(y1()), g1 = sn.default ?? sn;
const El = Object.freeze(Object.defineProperty({ __proto__: null, default: g1 }, Symbol.toStringTag, { value: "Module" }));
var ot = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/container":
      return t(De);
    case "postcss/lib/document":
      return t(Zr);
    case "postcss/lib/map-generator":
      return t($l);
    case "postcss/lib/parse":
      return t(so);
    case "postcss/lib/result":
      return t(io);
    case "postcss/lib/root":
      return t(It);
    case "postcss/lib/stringify":
      return t(Xt);
    case "postcss/lib/symbols":
      return t(Jr);
    case "postcss/lib/warn-once":
      return t(El);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, m1 = Object.create, Tl = Object.defineProperty, b1 = Object.getOwnPropertyDescriptor, v1 = Object.getOwnPropertyNames, w1 = Object.getPrototypeOf, O1 = Object.prototype.hasOwnProperty, we = ((e) => typeof ot < "u" ? ot : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof ot < "u" ? ot : t)[r] }) : e)(function(e) {
  if (typeof ot < "u") return ot.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), $1 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), x1 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of v1(t)) !O1.call(e, o) && o !== r && Tl(e, o, { get: () => t[o], enumerable: !(n = b1(t, o)) || n.enumerable });
  return e;
}, _1 = (e, t, r) => (r = e != null ? m1(w1(e)) : {}, x1(!e || !e.__esModule ? Tl(r, "default", { value: e, enumerable: true }) : r, e)), S1 = $1((e, t) => {
  var r = we("postcss/lib/container"), n = we("postcss/lib/document"), o = we("postcss/lib/map-generator"), s = we("postcss/lib/parse"), u = we("postcss/lib/result"), c = we("postcss/lib/root"), i = we("postcss/lib/stringify"), { isClean: p, my: f } = we("postcss/lib/symbols");
  we("postcss/lib/warn-once");
  var a = { atrule: "AtRule", comment: "Comment", decl: "Declaration", document: "Document", root: "Root", rule: "Rule" }, d = { AtRule: true, AtRuleExit: true, Comment: true, CommentExit: true, Declaration: true, DeclarationExit: true, Document: true, DocumentExit: true, Once: true, OnceExit: true, postcssPlugin: true, prepare: true, Root: true, RootExit: true, Rule: true, RuleExit: true }, h = { Once: true, postcssPlugin: true, prepare: true }, b = 0;
  function l(v) {
    return typeof v == "object" && typeof v.then == "function";
  }
  function y(v) {
    let w = false, _ = a[v.type];
    return v.type === "decl" ? w = v.prop.toLowerCase() : v.type === "atrule" && (w = v.name.toLowerCase()), w && v.append ? [_, _ + "-" + w, b, _ + "Exit", _ + "Exit-" + w] : w ? [_, _ + "-" + w, _ + "Exit", _ + "Exit-" + w] : v.append ? [_, b, _ + "Exit"] : [_, _ + "Exit"];
  }
  function m(v) {
    let w;
    return v.type === "document" ? w = ["Document", b, "DocumentExit"] : v.type === "root" ? w = ["Root", b, "RootExit"] : w = y(v), { eventIndex: 0, events: w, iterator: 0, node: v, visitorIndex: 0, visitors: [] };
  }
  function g(v) {
    return v[p] = false, v.nodes && v.nodes.forEach((w) => g(w)), v;
  }
  var $ = {}, O = class Al {
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
    constructor(w, _, x) {
      this.stringified = false, this.processed = false;
      let S;
      if (typeof _ == "object" && _ !== null && (_.type === "root" || _.type === "document")) S = g(_);
      else if (_ instanceof Al || _ instanceof u) S = g(_.root), _.map && (typeof x.map > "u" && (x.map = {}), x.map.inline || (x.map.inline = false), x.map.prev = _.map);
      else {
        let j = s;
        x.syntax && (j = x.syntax.parse), x.parser && (j = x.parser), j.parse && (j = j.parse);
        try {
          S = j(_, x);
        } catch (A) {
          this.processed = true, this.error = A;
        }
        S && !S[f] && r.rebuild(S);
      }
      this.result = new u(w, S, x), this.helpers = { ...$, postcss: $, result: this.result }, this.plugins = this.processor.plugins.map((j) => typeof j == "object" && j.prepare ? { ...j, ...j.prepare(this.result) } : j);
    }
    async() {
      return this.error ? Promise.reject(this.error) : this.processed ? Promise.resolve(this.result) : (this.processing || (this.processing = this.runAsync()), this.processing);
    }
    catch(w) {
      return this.async().catch(w);
    }
    finally(w) {
      return this.async().then(w, w);
    }
    getAsyncError() {
      throw new Error("Use process(css).then(cb) to work with async plugins");
    }
    handleError(w, _) {
      let x = this.result.lastPlugin;
      try {
        _ && _.addToError(w), this.error = w, w.name === "CssSyntaxError" && !w.plugin ? (w.plugin = x.postcssPlugin, w.setMessage()) : x.postcssVersion;
      } catch (S) {
        console && console.error && console.error(S);
      }
      return w;
    }
    prepareVisitors() {
      this.listeners = {};
      let w = (_, x, S) => {
        this.listeners[x] || (this.listeners[x] = []), this.listeners[x].push([_, S]);
      };
      for (let _ of this.plugins) if (typeof _ == "object") for (let x in _) {
        if (!d[x] && /^[A-Z]/.test(x)) throw new Error(`Unknown event ${x} in ${_.postcssPlugin}. Try to update PostCSS (${this.processor.version} now).`);
        if (!h[x]) if (typeof _[x] == "object") for (let S in _[x]) S === "*" ? w(_, x, _[x][S]) : w(_, x + "-" + S.toLowerCase(), _[x][S]);
        else typeof _[x] == "function" && w(_, x, _[x]);
      }
      this.hasListener = Object.keys(this.listeners).length > 0;
    }
    async runAsync() {
      this.plugin = 0;
      for (let w = 0; w < this.plugins.length; w++) {
        let _ = this.plugins[w], x = this.runOnRoot(_);
        if (l(x)) try {
          await x;
        } catch (S) {
          throw this.handleError(S);
        }
      }
      if (this.prepareVisitors(), this.hasListener) {
        let w = this.result.root;
        for (; !w[p]; ) {
          w[p] = true;
          let _ = [m(w)];
          for (; _.length > 0; ) {
            let x = this.visitTick(_);
            if (l(x)) try {
              await x;
            } catch (S) {
              let j = _[_.length - 1].node;
              throw this.handleError(S, j);
            }
          }
        }
        if (this.listeners.OnceExit) for (let [_, x] of this.listeners.OnceExit) {
          this.result.lastPlugin = _;
          try {
            if (w.type === "document") {
              let S = w.nodes.map((j) => x(j, this.helpers));
              await Promise.all(S);
            } else await x(w, this.helpers);
          } catch (S) {
            throw this.handleError(S);
          }
        }
      }
      return this.processed = true, this.stringify();
    }
    runOnRoot(w) {
      this.result.lastPlugin = w;
      try {
        if (typeof w == "object" && w.Once) {
          if (this.result.root.type === "document") {
            let _ = this.result.root.nodes.map((x) => w.Once(x, this.helpers));
            return l(_[0]) ? Promise.all(_) : _;
          }
          return w.Once(this.result.root, this.helpers);
        } else if (typeof w == "function") return w(this.result.root, this.result);
      } catch (_) {
        throw this.handleError(_);
      }
    }
    stringify() {
      if (this.error) throw this.error;
      if (this.stringified) return this.result;
      this.stringified = true, this.sync();
      let w = this.result.opts, _ = i;
      w.syntax && (_ = w.syntax.stringify), w.stringifier && (_ = w.stringifier), _.stringify && (_ = _.stringify);
      let x = new o(_, this.result.root, this.result.opts).generate();
      return this.result.css = x[0], this.result.map = x[1], this.result;
    }
    sync() {
      if (this.error) throw this.error;
      if (this.processed) return this.result;
      if (this.processed = true, this.processing) throw this.getAsyncError();
      for (let w of this.plugins) {
        let _ = this.runOnRoot(w);
        if (l(_)) throw this.getAsyncError();
      }
      if (this.prepareVisitors(), this.hasListener) {
        let w = this.result.root;
        for (; !w[p]; ) w[p] = true, this.walkSync(w);
        if (this.listeners.OnceExit) if (w.type === "document") for (let _ of w.nodes) this.visitSync(this.listeners.OnceExit, _);
        else this.visitSync(this.listeners.OnceExit, w);
      }
      return this.result;
    }
    then(w, _) {
      return this.async().then(w, _);
    }
    toString() {
      return this.css;
    }
    visitSync(w, _) {
      for (let [x, S] of w) {
        this.result.lastPlugin = x;
        let j;
        try {
          j = S(_, this.helpers);
        } catch (A) {
          throw this.handleError(A, _.proxyOf);
        }
        if (_.type !== "root" && _.type !== "document" && !_.parent) return true;
        if (l(j)) throw this.getAsyncError();
      }
    }
    visitTick(w) {
      let _ = w[w.length - 1], { node: x, visitors: S } = _;
      if (x.type !== "root" && x.type !== "document" && !x.parent) {
        w.pop();
        return;
      }
      if (S.length > 0 && _.visitorIndex < S.length) {
        let [A, M] = S[_.visitorIndex];
        _.visitorIndex += 1, _.visitorIndex === S.length && (_.visitors = [], _.visitorIndex = 0), this.result.lastPlugin = A;
        try {
          return M(x.toProxy(), this.helpers);
        } catch (q) {
          throw this.handleError(q, x);
        }
      }
      if (_.iterator !== 0) {
        let A = _.iterator, M;
        for (; M = x.nodes[x.indexes[A]]; ) if (x.indexes[A] += 1, !M[p]) {
          M[p] = true, w.push(m(M));
          return;
        }
        _.iterator = 0, delete x.indexes[A];
      }
      let j = _.events;
      for (; _.eventIndex < j.length; ) {
        let A = j[_.eventIndex];
        if (_.eventIndex += 1, A === b) {
          x.nodes && x.nodes.length && (x[p] = true, _.iterator = x.getIterator());
          return;
        } else if (this.listeners[A]) {
          _.visitors = this.listeners[A];
          return;
        }
      }
      w.pop();
    }
    walkSync(w) {
      w[p] = true;
      let _ = y(w);
      for (let x of _) if (x === b) w.nodes && w.each((S) => {
        S[p] || this.walkSync(S);
      });
      else {
        let S = this.listeners[x];
        if (S && this.visitSync(S, w.toProxy())) return;
      }
    }
    warnings() {
      return this.sync().warnings();
    }
  };
  O.registerPostcss = (v) => {
    $ = v;
  }, t.exports = O, O.default = O, c.registerLazyResult(O), n.registerLazyResult(O);
}), an = _1(S1()), P1 = an.default ?? an;
const Cl = Object.freeze(Object.defineProperty({ __proto__: null, default: P1 }, Symbol.toStringTag, { value: "Module" }));
var nt = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/map-generator":
      return t($l);
    case "postcss/lib/parse":
      return t(so);
    case "postcss/lib/result":
      return t(io);
    case "postcss/lib/stringify":
      return t(Xt);
    case "postcss/lib/warn-once":
      return t(El);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, j1 = Object.create, Il = Object.defineProperty, k1 = Object.getOwnPropertyDescriptor, E1 = Object.getOwnPropertyNames, T1 = Object.getPrototypeOf, A1 = Object.prototype.hasOwnProperty, St = ((e) => typeof nt < "u" ? nt : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof nt < "u" ? nt : t)[r] }) : e)(function(e) {
  if (typeof nt < "u") return nt.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), C1 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), I1 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of E1(t)) !A1.call(e, o) && o !== r && Il(e, o, { get: () => t[o], enumerable: !(n = k1(t, o)) || n.enumerable });
  return e;
}, R1 = (e, t, r) => (r = e != null ? j1(T1(e)) : {}, I1(!e || !e.__esModule ? Il(r, "default", { value: e, enumerable: true }) : r, e)), D1 = C1((e, t) => {
  var r = St("postcss/lib/map-generator"), n = St("postcss/lib/parse"), o = St("postcss/lib/result"), s = St("postcss/lib/stringify");
  St("postcss/lib/warn-once");
  var u = class {
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
      let c, i = n;
      try {
        c = i(this._css, this._opts);
      } catch (p) {
        this.error = p;
      }
      if (this.error) throw this.error;
      return this._root = c, c;
    }
    get [Symbol.toStringTag]() {
      return "NoWorkResult";
    }
    constructor(c, i, p) {
      i = i.toString(), this.stringified = false, this._processor = c, this._css = i, this._opts = p, this._map = void 0;
      let f, a = s;
      this.result = new o(this._processor, f, this._opts), this.result.css = i;
      let d = this;
      Object.defineProperty(this.result, "root", { get() {
        return d.root;
      } });
      let h = new r(a, f, this._opts, i);
      if (h.isMap()) {
        let [b, l] = h.generate();
        b && (this.result.css = b), l && (this.result.map = l);
      } else h.clearAnnotation(), this.result.css = h.css;
    }
    async() {
      return this.error ? Promise.reject(this.error) : Promise.resolve(this.result);
    }
    catch(c) {
      return this.async().catch(c);
    }
    finally(c) {
      return this.async().then(c, c);
    }
    sync() {
      if (this.error) throw this.error;
      return this.result;
    }
    then(c, i) {
      return this.async().then(c, i);
    }
    toString() {
      return this._css;
    }
    warnings() {
      return [];
    }
  };
  t.exports = u, u.default = u;
}), ln = R1(D1()), M1 = ln.default ?? ln;
const L1 = Object.freeze(Object.defineProperty({ __proto__: null, default: M1 }, Symbol.toStringTag, { value: "Module" }));
var st = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/document":
      return t(Zr);
    case "postcss/lib/lazy-result":
      return t(Cl);
    case "postcss/lib/no-work-result":
      return t(L1);
    case "postcss/lib/root":
      return t(It);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, F1 = Object.create, Rl = Object.defineProperty, U1 = Object.getOwnPropertyDescriptor, N1 = Object.getOwnPropertyNames, B1 = Object.getPrototypeOf, q1 = Object.prototype.hasOwnProperty, Ut = ((e) => typeof st < "u" ? st : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof st < "u" ? st : t)[r] }) : e)(function(e) {
  if (typeof st < "u") return st.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), z1 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), W1 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of N1(t)) !q1.call(e, o) && o !== r && Rl(e, o, { get: () => t[o], enumerable: !(n = U1(t, o)) || n.enumerable });
  return e;
}, G1 = (e, t, r) => (r = e != null ? F1(B1(e)) : {}, W1(!e || !e.__esModule ? Rl(r, "default", { value: e, enumerable: true }) : r, e)), Y1 = z1((e, t) => {
  var r = Ut("postcss/lib/document"), n = Ut("postcss/lib/lazy-result"), o = Ut("postcss/lib/no-work-result"), s = Ut("postcss/lib/root"), u = class {
    constructor(c = []) {
      this.version = "8.5.3", this.plugins = this.normalize(c);
    }
    normalize(c) {
      let i = [];
      for (let p of c) if (p.postcss === true ? p = p() : p.postcss && (p = p.postcss), typeof p == "object" && Array.isArray(p.plugins)) i = i.concat(p.plugins);
      else if (typeof p == "object" && p.postcssPlugin) i.push(p);
      else if (typeof p == "function") i.push(p);
      else if (!(typeof p == "object" && (p.parse || p.stringify))) throw new Error(p + " is not a PostCSS plugin");
      return i;
    }
    process(c, i = {}) {
      return !this.plugins.length && !i.parser && !i.stringifier && !i.syntax ? new o(this, c, i) : new n(this, c, i);
    }
    use(c) {
      return this.plugins = this.plugins.concat(this.normalize([c])), this;
    }
  };
  t.exports = u, u.default = u, s.registerProcessor(u), r.registerProcessor(u);
}), un = G1(Y1()), H1 = un.default ?? un;
const V1 = Object.freeze(Object.defineProperty({ __proto__: null, default: H1 }, Symbol.toStringTag, { value: "Module" }));
var it = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss/lib/at-rule":
      return t(Xr);
    case "postcss/lib/comment":
      return t(er);
    case "postcss/lib/container":
      return t(De);
    case "postcss/lib/css-syntax-error":
      return t(Qr);
    case "postcss/lib/declaration":
      return t(tr);
    case "postcss/lib/document":
      return t(Zr);
    case "postcss/lib/fromJSON":
      return t(sm);
    case "postcss/lib/input":
      return t(ar);
    case "postcss/lib/lazy-result":
      return t(Cl);
    case "postcss/lib/list":
      return t(gl);
    case "postcss/lib/node":
      return t(Zt);
    case "postcss/lib/parse":
      return t(so);
    case "postcss/lib/processor":
      return t(V1);
    case "postcss/lib/result":
      return t(io);
    case "postcss/lib/root":
      return t(It);
    case "postcss/lib/rule":
      return t(no);
    case "postcss/lib/stringify":
      return t(Xt);
    case "postcss/lib/warning":
      return t(Pl);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, K1 = Object.create, Dl = Object.defineProperty, Q1 = Object.getOwnPropertyDescriptor, J1 = Object.getOwnPropertyNames, X1 = Object.getPrototypeOf, Z1 = Object.prototype.hasOwnProperty, re = ((e) => typeof it < "u" ? it : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof it < "u" ? it : t)[r] }) : e)(function(e) {
  if (typeof it < "u") return it.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), eb = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), tb = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of J1(t)) !Z1.call(e, o) && o !== r && Dl(e, o, { get: () => t[o], enumerable: !(n = Q1(t, o)) || n.enumerable });
  return e;
}, rb = (e, t, r) => (r = e != null ? K1(X1(e)) : {}, tb(Dl(r, "default", { value: e, enumerable: true }), e)), ob = eb((e, t) => {
  var r = re("postcss/lib/at-rule"), n = re("postcss/lib/comment"), o = re("postcss/lib/container"), s = re("postcss/lib/css-syntax-error"), u = re("postcss/lib/declaration"), c = re("postcss/lib/document"), i = re("postcss/lib/fromJSON"), p = re("postcss/lib/input"), f = re("postcss/lib/lazy-result"), a = re("postcss/lib/list"), d = re("postcss/lib/node"), h = re("postcss/lib/parse"), b = re("postcss/lib/processor"), l = re("postcss/lib/result"), y = re("postcss/lib/root"), m = re("postcss/lib/rule"), g = re("postcss/lib/stringify"), $ = re("postcss/lib/warning");
  function O(...v) {
    return v.length === 1 && Array.isArray(v[0]) && (v = v[0]), new b(v);
  }
  O.plugin = function(v, w) {
    let _ = false;
    function x(...j) {
      console && console.warn && !_ && (_ = true, console.warn(v + `: postcss.plugin was deprecated. Migration guide:
https://evilmartians.com/chronicles/postcss-8-plugin-migration`), zt.env.LANG && zt.env.LANG.startsWith("cn") && console.warn(v + `: \u91CC\u9762 postcss.plugin \u88AB\u5F03\u7528. \u8FC1\u79FB\u6307\u5357:
https://www.w3ctech.com/topic/2226`));
      let A = w(...j);
      return A.postcssPlugin = v, A.postcssVersion = new b().version, A;
    }
    let S;
    return Object.defineProperty(x, "postcss", { get() {
      return S || (S = x()), S;
    } }), x.process = function(j, A, M) {
      return O([x(M)]).process(j, A);
    }, x;
  }, O.stringify = g, O.parse = h, O.fromJSON = i, O.list = a, O.comment = (v) => new n(v), O.atRule = (v) => new r(v), O.decl = (v) => new u(v), O.rule = (v) => new m(v), O.root = (v) => new y(v), O.document = (v) => new c(v), O.CssSyntaxError = s, O.Declaration = u, O.Container = o, O.Processor = b, O.Document = c, O.Comment = n, O.Warning = $, O.AtRule = r, O.Result = l, O.Input = p, O.Rule = m, O.Root = y, O.Node = d, f.registerPostcss(O), t.exports = O, O.default = O;
}), J = rb(ob()), Ml = J.default, Ll = J.default.stringify, Fl = J.default.fromJSON, Ul = J.default.plugin, Nl = J.default.parse, Bl = J.default.list, ql = J.default.document, zl = J.default.comment, Wl = J.default.atRule, Gl = J.default.rule, Yl = J.default.decl, Hl = J.default.root, Vl = J.default.CssSyntaxError, Kl = J.default.Declaration, Ql = J.default.Container, Jl = J.default.Processor, Xl = J.default.Document, Zl = J.default.Comment, eu = J.default.Warning, tu = J.default.AtRule, ru = J.default.Result, ou = J.default.Input, nu = J.default.Rule, su = J.default.Root, iu = J.default.Node;
const ao = Object.freeze(Object.defineProperty({ __proto__: null, AtRule: tu, Comment: Zl, Container: Ql, CssSyntaxError: Vl, Declaration: Kl, Document: Xl, Input: ou, Node: iu, Processor: Jl, Result: ru, Root: su, Rule: nu, Warning: eu, atRule: Wl, comment: zl, decl: Yl, default: Ml, document: ql, fromJSON: Fl, list: Bl, parse: Nl, plugin: Ul, root: Hl, rule: Gl, stringify: Ll }, Symbol.toStringTag, { value: "Module" }));
var nb = Object.create, au = Object.defineProperty, sb = Object.getOwnPropertyDescriptor, ib = Object.getOwnPropertyNames, ab = Object.getPrototypeOf, lb = Object.prototype.hasOwnProperty, ub = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), cb = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of ib(t)) !lb.call(e, o) && o !== r && au(e, o, { get: () => t[o], enumerable: !(n = sb(t, o)) || n.enumerable });
  return e;
}, fb = (e, t, r) => (r = e != null ? nb(ab(e)) : {}, cb(!e || !e.__esModule ? au(r, "default", { value: e, enumerable: true }) : r, e)), pb = ub((e, t) => {
  var r = /-(\w|$)/g, n = function(s, u) {
    return u.toUpperCase();
  }, o = function(s) {
    return s = s.toLowerCase(), s === "float" ? "cssFloat" : s.charCodeAt(0) === 45 && s.charCodeAt(1) === 109 && s.charCodeAt(2) === 115 && s.charCodeAt(3) === 45 ? s.substr(1).replace(r, n) : s.replace(r, n);
  };
  t.exports = o;
}), cn = fb(pb()), hb = cn.default ?? cn;
const db = Object.freeze(Object.defineProperty({ __proto__: null, default: hb }, Symbol.toStringTag, { value: "Module" }));
var at = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "camelcase-css":
      return t(db);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, yb = Object.create, lu = Object.defineProperty, gb = Object.getOwnPropertyDescriptor, mb = Object.getOwnPropertyNames, bb = Object.getPrototypeOf, vb = Object.prototype.hasOwnProperty, wb = ((e) => typeof at < "u" ? at : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof at < "u" ? at : t)[r] }) : e)(function(e) {
  if (typeof at < "u") return at.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Ob = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), $b = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of mb(t)) !vb.call(e, o) && o !== r && lu(e, o, { get: () => t[o], enumerable: !(n = gb(t, o)) || n.enumerable });
  return e;
}, xb = (e, t, r) => (r = e != null ? yb(bb(e)) : {}, $b(!e || !e.__esModule ? lu(r, "default", { value: e, enumerable: true }) : r, e)), _b = Ob((e, t) => {
  var r = wb("camelcase-css"), n = { boxFlex: true, boxFlexGroup: true, columnCount: true, flex: true, flexGrow: true, flexPositive: true, flexShrink: true, flexNegative: true, fontWeight: true, lineClamp: true, lineHeight: true, opacity: true, order: true, orphans: true, tabSize: true, widows: true, zIndex: true, zoom: true, fillOpacity: true, strokeDashoffset: true, strokeOpacity: true, strokeWidth: true };
  function o(u) {
    return typeof u.nodes > "u" ? true : s(u);
  }
  function s(u) {
    let c, i = {};
    return u.each((p) => {
      if (p.type === "atrule") c = "@" + p.name, p.params && (c += " " + p.params), typeof i[c] > "u" ? i[c] = o(p) : Array.isArray(i[c]) ? i[c].push(o(p)) : i[c] = [i[c], o(p)];
      else if (p.type === "rule") {
        let f = s(p);
        if (i[p.selector]) for (let a in f) i[p.selector][a] = f[a];
        else i[p.selector] = f;
      } else if (p.type === "decl") {
        p.prop[0] === "-" && p.prop[1] === "-" || p.parent && p.parent.selector === ":export" ? c = p.prop : c = r(p.prop);
        let f = p.value;
        !isNaN(p.value) && n[c] && (f = parseFloat(p.value)), p.important && (f += " !important"), typeof i[c] > "u" ? i[c] = f : Array.isArray(i[c]) ? i[c].push(f) : i[c] = [i[c], f];
      }
    }), i;
  }
  t.exports = s;
}), fn = xb(_b()), Sb = fn.default ?? fn;
const uu = Object.freeze(Object.defineProperty({ __proto__: null, default: Sb }, Symbol.toStringTag, { value: "Module" }));
var lt = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss-js/objectifier":
      return t(uu);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Pb = Object.create, cu = Object.defineProperty, jb = Object.getOwnPropertyDescriptor, kb = Object.getOwnPropertyNames, Eb = Object.getPrototypeOf, Tb = Object.prototype.hasOwnProperty, Ab = ((e) => typeof lt < "u" ? lt : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof lt < "u" ? lt : t)[r] }) : e)(function(e) {
  if (typeof lt < "u") return lt.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Cb = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Ib = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of kb(t)) !Tb.call(e, o) && o !== r && cu(e, o, { get: () => t[o], enumerable: !(n = jb(t, o)) || n.enumerable });
  return e;
}, Rb = (e, t, r) => (r = e != null ? Pb(Eb(e)) : {}, Ib(!e || !e.__esModule ? cu(r, "default", { value: e, enumerable: true }) : r, e)), Db = Cb((e, t) => {
  var r = Ab("postcss-js/objectifier");
  t.exports = function(n) {
    return console && console.warn && n.warnings().forEach((o) => {
      let s = o.plugin || "PostCSS";
      console.warn(s + ": " + o.text);
    }), r(n.root);
  };
}), pn = Rb(Db()), Mb = pn.default ?? pn;
const fu = Object.freeze(Object.defineProperty({ __proto__: null, default: Mb }, Symbol.toStringTag, { value: "Module" }));
var ut = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss":
      return t(ao);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Lb = Object.create, pu = Object.defineProperty, Fb = Object.getOwnPropertyDescriptor, Ub = Object.getOwnPropertyNames, Nb = Object.getPrototypeOf, Bb = Object.prototype.hasOwnProperty, qb = ((e) => typeof ut < "u" ? ut : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof ut < "u" ? ut : t)[r] }) : e)(function(e) {
  if (typeof ut < "u") return ut.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), zb = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Wb = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Ub(t)) !Bb.call(e, o) && o !== r && pu(e, o, { get: () => t[o], enumerable: !(n = Fb(t, o)) || n.enumerable });
  return e;
}, Gb = (e, t, r) => (r = e != null ? Lb(Nb(e)) : {}, Wb(!e || !e.__esModule ? pu(r, "default", { value: e, enumerable: true }) : r, e)), Yb = zb((e, t) => {
  var r = qb("postcss"), n = /\s*!important\s*$/i, o = { "box-flex": true, "box-flex-group": true, "column-count": true, flex: true, "flex-grow": true, "flex-positive": true, "flex-shrink": true, "flex-negative": true, "font-weight": true, "line-clamp": true, "line-height": true, opacity: true, order: true, orphans: true, "tab-size": true, widows: true, "z-index": true, zoom: true, "fill-opacity": true, "stroke-dashoffset": true, "stroke-opacity": true, "stroke-width": true };
  function s(p) {
    return p.replace(/([A-Z])/g, "-$1").replace(/^ms-/, "-ms-").toLowerCase();
  }
  function u(p, f, a) {
    a === false || a === null || (f.startsWith("--") || (f = s(f)), typeof a == "number" && (a === 0 || o[f] ? a = a.toString() : a += "px"), f === "css-float" && (f = "float"), n.test(a) ? (a = a.replace(n, ""), p.push(r.decl({ prop: f, value: a, important: true }))) : p.push(r.decl({ prop: f, value: a })));
  }
  function c(p, f, a) {
    let d = r.atRule({ name: f[1], params: f[3] || "" });
    typeof a == "object" && (d.nodes = [], i(a, d)), p.push(d);
  }
  function i(p, f) {
    let a, d, h;
    for (a in p) if (d = p[a], !(d === null || typeof d > "u")) if (a[0] === "@") {
      let b = a.match(/@(\S+)(\s+([\W\w]*)\s*)?/);
      if (Array.isArray(d)) for (let l of d) c(f, b, l);
      else c(f, b, d);
    } else if (Array.isArray(d)) for (let b of d) u(f, a, b);
    else typeof d == "object" ? (h = r.rule({ selector: a }), i(d, h), f.push(h)) : u(f, a, d);
  }
  t.exports = function(p) {
    let f = r.root();
    return i(p, f), f;
  };
}), hn = Gb(Yb()), Hb = hn.default ?? hn;
const lo = Object.freeze(Object.defineProperty({ __proto__: null, default: Hb }, Symbol.toStringTag, { value: "Module" }));
var ct = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss":
      return t(ao);
    case "postcss-js/process-result":
      return t(fu);
    case "postcss-js/parser":
      return t(lo);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Vb = Object.create, hu = Object.defineProperty, Kb = Object.getOwnPropertyDescriptor, Qb = Object.getOwnPropertyNames, Jb = Object.getPrototypeOf, Xb = Object.prototype.hasOwnProperty, br = ((e) => typeof ct < "u" ? ct : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof ct < "u" ? ct : t)[r] }) : e)(function(e) {
  if (typeof ct < "u") return ct.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Zb = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), ev = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Qb(t)) !Xb.call(e, o) && o !== r && hu(e, o, { get: () => t[o], enumerable: !(n = Kb(t, o)) || n.enumerable });
  return e;
}, tv = (e, t, r) => (r = e != null ? Vb(Jb(e)) : {}, ev(!e || !e.__esModule ? hu(r, "default", { value: e, enumerable: true }) : r, e)), rv = Zb((e, t) => {
  var r = br("postcss"), n = br("postcss-js/process-result"), o = br("postcss-js/parser");
  t.exports = function(s) {
    let u = r(s);
    return async (c) => {
      let i = await u.process(c, { parser: o, from: void 0 });
      return n(i);
    };
  };
}), dn = tv(rv()), ov = dn.default ?? dn;
const nv = Object.freeze(Object.defineProperty({ __proto__: null, default: ov }, Symbol.toStringTag, { value: "Module" }));
var ft = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss":
      return t(ao);
    case "postcss-js/process-result":
      return t(fu);
    case "postcss-js/parser":
      return t(lo);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, sv = Object.create, du = Object.defineProperty, iv = Object.getOwnPropertyDescriptor, av = Object.getOwnPropertyNames, lv = Object.getPrototypeOf, uv = Object.prototype.hasOwnProperty, vr = ((e) => typeof ft < "u" ? ft : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof ft < "u" ? ft : t)[r] }) : e)(function(e) {
  if (typeof ft < "u") return ft.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), cv = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), fv = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of av(t)) !uv.call(e, o) && o !== r && du(e, o, { get: () => t[o], enumerable: !(n = iv(t, o)) || n.enumerable });
  return e;
}, pv = (e, t, r) => (r = e != null ? sv(lv(e)) : {}, fv(!e || !e.__esModule ? du(r, "default", { value: e, enumerable: true }) : r, e)), hv = cv((e, t) => {
  var r = vr("postcss"), n = vr("postcss-js/process-result"), o = vr("postcss-js/parser");
  t.exports = function(s) {
    let u = r(s);
    return (c) => {
      let i = u.process(c, { parser: o, from: void 0 });
      return n(i);
    };
  };
}), yn = pv(hv()), dv = yn.default ?? yn;
const yv = Object.freeze(Object.defineProperty({ __proto__: null, default: dv }, Symbol.toStringTag, { value: "Module" }));
var pt = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss-js/objectifier":
      return t(uu);
    case "postcss-js/parser":
      return t(lo);
    case "postcss-js/async":
      return t(nv);
    case "postcss-js/sync":
      return t(yv);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, gv = Object.create, yu = Object.defineProperty, mv = Object.getOwnPropertyDescriptor, bv = Object.getOwnPropertyNames, vv = Object.getPrototypeOf, wv = Object.prototype.hasOwnProperty, Nt = ((e) => typeof pt < "u" ? pt : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof pt < "u" ? pt : t)[r] }) : e)(function(e) {
  if (typeof pt < "u") return pt.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), Ov = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), $v = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of bv(t)) !wv.call(e, o) && o !== r && yu(e, o, { get: () => t[o], enumerable: !(n = mv(t, o)) || n.enumerable });
  return e;
}, xv = (e, t, r) => (r = e != null ? gv(vv(e)) : {}, $v(yu(r, "default", { value: e, enumerable: true }), e)), _v = Ov((e, t) => {
  var r = Nt("postcss-js/objectifier"), n = Nt("postcss-js/parser"), o = Nt("postcss-js/async"), s = Nt("postcss-js/sync");
  t.exports = { objectify: r, parse: n, async: o, sync: s };
}), Rt = xv(_v()), pO = Rt.default;
Rt.default.objectify;
Rt.default.parse;
Rt.default.async;
Rt.default.sync;
var Sv = Object.create, gu = Object.defineProperty, Pv = Object.getOwnPropertyDescriptor, jv = Object.getOwnPropertyNames, kv = Object.getPrototypeOf, Ev = Object.prototype.hasOwnProperty, Tv = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Av = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of jv(t)) !Ev.call(e, o) && o !== r && gu(e, o, { get: () => t[o], enumerable: !(n = Pv(t, o)) || n.enumerable });
  return e;
}, Cv = (e, t, r) => (r = e != null ? Sv(kv(e)) : {}, Av(!e || !e.__esModule ? gu(r, "default", { value: e, enumerable: true }) : r, e)), Iv = Tv((e, t) => {
  var r = {}, n = r.hasOwnProperty, o = function(p, f) {
    if (!p) return f;
    var a = {};
    for (var d in f) a[d] = n.call(p, d) ? p[d] : f[d];
    return a;
  }, s = /[ -,\.\/:-@\[-\^`\{-~]/, u = /[ -,\.\/:-@\[\]\^`\{-~]/, c = /(^|\\+)?(\\[A-F0-9]{1,6})\x20(?![a-fA-F0-9\x20])/g, i = function p(f, a) {
    a = o(a, p.options), a.quotes != "single" && a.quotes != "double" && (a.quotes = "single");
    for (var d = a.quotes == "double" ? '"' : "'", h = a.isIdentifier, b = f.charAt(0), l = "", y = 0, m = f.length; y < m; ) {
      var g = f.charAt(y++), $ = g.charCodeAt(), O = void 0;
      if ($ < 32 || $ > 126) {
        if ($ >= 55296 && $ <= 56319 && y < m) {
          var v = f.charCodeAt(y++);
          (v & 64512) == 56320 ? $ = (($ & 1023) << 10) + (v & 1023) + 65536 : y--;
        }
        O = "\\" + $.toString(16).toUpperCase() + " ";
      } else a.escapeEverything ? s.test(g) ? O = "\\" + g : O = "\\" + $.toString(16).toUpperCase() + " " : /[\t\n\f\r\x0B]/.test(g) ? O = "\\" + $.toString(16).toUpperCase() + " " : g == "\\" || !h && (g == '"' && d == g || g == "'" && d == g) || h && u.test(g) ? O = "\\" + g : O = g;
      l += O;
    }
    return h && (/^-[-\d]/.test(l) ? l = "\\-" + l.slice(1) : /\d/.test(b) && (l = "\\3" + b + " " + l.slice(1))), l = l.replace(c, function(w, _, x) {
      return _ && _.length % 2 ? w : (_ || "") + x;
    }), !h && a.wrap ? d + l + d : l;
  };
  i.options = { escapeEverything: false, isIdentifier: false, quotes: "single", wrap: false }, i.version = "3.0.0", t.exports = i;
}), Ir = Cv(Iv()), { options: Rv, version: Dv } = Ir, Mv = Ir.default ?? Ir;
/*! Bundled license information:

cssesc/cssesc.js:
  (*! https://mths.be/cssesc v3.0.0 by @mathias *)
*/
const Lv = Object.freeze(Object.defineProperty({ __proto__: null, default: Mv, options: Rv, version: Dv }, Symbol.toStringTag, { value: "Module" }));
var Fv = Object.create, mu = Object.defineProperty, Uv = Object.getOwnPropertyDescriptor, Nv = Object.getOwnPropertyNames, Bv = Object.getPrototypeOf, qv = Object.prototype.hasOwnProperty, zv = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), Wv = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Nv(t)) !qv.call(e, o) && o !== r && mu(e, o, { get: () => t[o], enumerable: !(n = Uv(t, o)) || n.enumerable });
  return e;
}, Gv = (e, t, r) => (r = e != null ? Fv(Bv(e)) : {}, Wv(!e || !e.__esModule ? mu(r, "default", { value: e, enumerable: true }) : r, e)), Yv = zv((e, t) => {
  t.exports = r;
  function r(o, s) {
    if (n("noDeprecation")) return o;
    var u = false;
    function c() {
      if (!u) {
        if (n("throwDeprecation")) throw new Error(s);
        n("traceDeprecation") ? console.trace(s) : console.warn(s), u = true;
      }
      return o.apply(this, arguments);
    }
    return c;
  }
  function n(o) {
    try {
      if (!globalThis.localStorage) return false;
    } catch {
      return false;
    }
    var s = globalThis.localStorage[o];
    return s == null ? false : String(s).toLowerCase() === "true";
  }
}), gn = Gv(Yv()), Hv = gn.default ?? gn;
const Vv = Object.freeze(Object.defineProperty({ __proto__: null, default: Hv }, Symbol.toStringTag, { value: "Module" }));
var ht = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "cssesc":
      return t(Lv);
    case "util-deprecate":
      return t(Vv);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, Kv = Object.create, bu = Object.defineProperty, Qv = Object.getOwnPropertyDescriptor, Jv = Object.getOwnPropertyNames, Xv = Object.getPrototypeOf, Zv = Object.prototype.hasOwnProperty, Yt = ((e) => typeof ht < "u" ? ht : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof ht < "u" ? ht : t)[r] }) : e)(function(e) {
  if (typeof ht < "u") return ht.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), H = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), ew = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of Jv(t)) !Zv.call(e, o) && o !== r && bu(e, o, { get: () => t[o], enumerable: !(n = Qv(t, o)) || n.enumerable });
  return e;
}, tw = (e, t, r) => (r = e != null ? Kv(Xv(e)) : {}, ew(!e || !e.__esModule ? bu(r, "default", { value: e, enumerable: true }) : r, e)), vu = H((e, t) => {
  e.__esModule = true, e.default = o;
  function r(s) {
    for (var u = s.toLowerCase(), c = "", i = false, p = 0; p < 6 && u[p] !== void 0; p++) {
      var f = u.charCodeAt(p), a = f >= 97 && f <= 102 || f >= 48 && f <= 57;
      if (i = f === 32, !a) break;
      c += u[p];
    }
    if (c.length !== 0) {
      var d = parseInt(c, 16), h = d >= 55296 && d <= 57343;
      return h || d === 0 || d > 1114111 ? ["\uFFFD", c.length + (i ? 1 : 0)] : [String.fromCodePoint(d), c.length + (i ? 1 : 0)];
    }
  }
  var n = /\\/;
  function o(s) {
    var u = n.test(s);
    if (!u) return s;
    for (var c = "", i = 0; i < s.length; i++) {
      if (s[i] === "\\") {
        var p = r(s.slice(i + 1, i + 7));
        if (p !== void 0) {
          c += p[0], i += p[1];
          continue;
        }
        if (s[i + 1] === "\\") {
          c += "\\", i++;
          continue;
        }
        s.length === i + 1 && (c += s[i]);
        continue;
      }
      c += s[i];
    }
    return c;
  }
  t.exports = e.default;
}), rw = H((e, t) => {
  e.__esModule = true, e.default = r;
  function r(n) {
    for (var o = arguments.length, s = new Array(o > 1 ? o - 1 : 0), u = 1; u < o; u++) s[u - 1] = arguments[u];
    for (; s.length > 0; ) {
      var c = s.shift();
      if (!n[c]) return;
      n = n[c];
    }
    return n;
  }
  t.exports = e.default;
}), ow = H((e, t) => {
  e.__esModule = true, e.default = r;
  function r(n) {
    for (var o = arguments.length, s = new Array(o > 1 ? o - 1 : 0), u = 1; u < o; u++) s[u - 1] = arguments[u];
    for (; s.length > 0; ) {
      var c = s.shift();
      n[c] || (n[c] = {}), n = n[c];
    }
  }
  t.exports = e.default;
}), nw = H((e, t) => {
  e.__esModule = true, e.default = r;
  function r(n) {
    for (var o = "", s = n.indexOf("/*"), u = 0; s >= 0; ) {
      o = o + n.slice(u, s);
      var c = n.indexOf("*/", s + 2);
      if (c < 0) return o;
      u = c + 2, s = n.indexOf("/*", u);
    }
    return o = o + n.slice(u), o;
  }
  t.exports = e.default;
}), ur = H((e) => {
  e.__esModule = true, e.unesc = e.stripComments = e.getProp = e.ensureObject = void 0;
  var t = s(vu());
  e.unesc = t.default;
  var r = s(rw());
  e.getProp = r.default;
  var n = s(ow());
  e.ensureObject = n.default;
  var o = s(nw());
  e.stripComments = o.default;
  function s(u) {
    return u && u.__esModule ? u : { default: u };
  }
}), Ce = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = ur();
  function n(c, i) {
    for (var p = 0; p < i.length; p++) {
      var f = i[p];
      f.enumerable = f.enumerable || false, f.configurable = true, "value" in f && (f.writable = true), Object.defineProperty(c, f.key, f);
    }
  }
  function o(c, i, p) {
    return i && n(c.prototype, i), Object.defineProperty(c, "prototype", { writable: false }), c;
  }
  var s = function c(i, p) {
    if (typeof i != "object" || i === null) return i;
    var f = new i.constructor();
    for (var a in i) if (i.hasOwnProperty(a)) {
      var d = i[a], h = typeof d;
      a === "parent" && h === "object" ? p && (f[a] = p) : d instanceof Array ? f[a] = d.map(function(b) {
        return c(b, f);
      }) : f[a] = c(d, f);
    }
    return f;
  }, u = function() {
    function c(p) {
      p === void 0 && (p = {}), Object.assign(this, p), this.spaces = this.spaces || {}, this.spaces.before = this.spaces.before || "", this.spaces.after = this.spaces.after || "";
    }
    var i = c.prototype;
    return i.remove = function() {
      return this.parent && this.parent.removeChild(this), this.parent = void 0, this;
    }, i.replaceWith = function() {
      if (this.parent) {
        for (var p in arguments) this.parent.insertBefore(this, arguments[p]);
        this.remove();
      }
      return this;
    }, i.next = function() {
      return this.parent.at(this.parent.index(this) + 1);
    }, i.prev = function() {
      return this.parent.at(this.parent.index(this) - 1);
    }, i.clone = function(p) {
      p === void 0 && (p = {});
      var f = s(this);
      for (var a in p) f[a] = p[a];
      return f;
    }, i.appendToPropertyAndEscape = function(p, f, a) {
      this.raws || (this.raws = {});
      var d = this[p], h = this.raws[p];
      this[p] = d + f, h || a !== f ? this.raws[p] = (h || d) + a : delete this.raws[p];
    }, i.setPropertyAndEscape = function(p, f, a) {
      this.raws || (this.raws = {}), this[p] = f, this.raws[p] = a;
    }, i.setPropertyWithoutEscape = function(p, f) {
      this[p] = f, this.raws && delete this.raws[p];
    }, i.isAtPosition = function(p, f) {
      if (this.source && this.source.start && this.source.end) return !(this.source.start.line > p || this.source.end.line < p || this.source.start.line === p && this.source.start.column > f || this.source.end.line === p && this.source.end.column < f);
    }, i.stringifyProperty = function(p) {
      return this.raws && this.raws[p] || this[p];
    }, i.valueToString = function() {
      return String(this.stringifyProperty("value"));
    }, i.toString = function() {
      return [this.rawSpaceBefore, this.valueToString(), this.rawSpaceAfter].join("");
    }, o(c, [{ key: "rawSpaceBefore", get: function() {
      var p = this.raws && this.raws.spaces && this.raws.spaces.before;
      return p === void 0 && (p = this.spaces && this.spaces.before), p || "";
    }, set: function(p) {
      (0, r.ensureObject)(this, "raws", "spaces"), this.raws.spaces.before = p;
    } }, { key: "rawSpaceAfter", get: function() {
      var p = this.raws && this.raws.spaces && this.raws.spaces.after;
      return p === void 0 && (p = this.spaces.after), p || "";
    }, set: function(p) {
      (0, r.ensureObject)(this, "raws", "spaces"), this.raws.spaces.after = p;
    } }]), c;
  }();
  e.default = u, t.exports = e.default;
}), se = H((e) => {
  e.__esModule = true, e.UNIVERSAL = e.TAG = e.STRING = e.SELECTOR = e.ROOT = e.PSEUDO = e.NESTING = e.ID = e.COMMENT = e.COMBINATOR = e.CLASS = e.ATTRIBUTE = void 0;
  var t = "tag";
  e.TAG = t;
  var r = "string";
  e.STRING = r;
  var n = "selector";
  e.SELECTOR = n;
  var o = "root";
  e.ROOT = o;
  var s = "pseudo";
  e.PSEUDO = s;
  var u = "nesting";
  e.NESTING = u;
  var c = "id";
  e.ID = c;
  var i = "comment";
  e.COMMENT = i;
  var p = "combinator";
  e.COMBINATOR = p;
  var f = "class";
  e.CLASS = f;
  var a = "attribute";
  e.ATTRIBUTE = a;
  var d = "universal";
  e.UNIVERSAL = d;
}), uo = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = u(Ce()), n = s(se());
  function o(l) {
    if (typeof WeakMap != "function") return null;
    var y = /* @__PURE__ */ new WeakMap(), m = /* @__PURE__ */ new WeakMap();
    return (o = function(g) {
      return g ? m : y;
    })(l);
  }
  function s(l, y) {
    if (l && l.__esModule) return l;
    if (l === null || typeof l != "object" && typeof l != "function") return { default: l };
    var m = o(y);
    if (m && m.has(l)) return m.get(l);
    var g = {}, $ = Object.defineProperty && Object.getOwnPropertyDescriptor;
    for (var O in l) if (O !== "default" && Object.prototype.hasOwnProperty.call(l, O)) {
      var v = $ ? Object.getOwnPropertyDescriptor(l, O) : null;
      v && (v.get || v.set) ? Object.defineProperty(g, O, v) : g[O] = l[O];
    }
    return g.default = l, m && m.set(l, g), g;
  }
  function u(l) {
    return l && l.__esModule ? l : { default: l };
  }
  function c(l, y) {
    var m = typeof Symbol < "u" && l[Symbol.iterator] || l["@@iterator"];
    if (m) return (m = m.call(l)).next.bind(m);
    if (Array.isArray(l) || (m = i(l)) || y) {
      m && (l = m);
      var g = 0;
      return function() {
        return g >= l.length ? { done: true } : { done: false, value: l[g++] };
      };
    }
    throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
  }
  function i(l, y) {
    if (l) {
      if (typeof l == "string") return p(l, y);
      var m = Object.prototype.toString.call(l).slice(8, -1);
      if (m === "Object" && l.constructor && (m = l.constructor.name), m === "Map" || m === "Set") return Array.from(l);
      if (m === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(m)) return p(l, y);
    }
  }
  function p(l, y) {
    (y == null || y > l.length) && (y = l.length);
    for (var m = 0, g = new Array(y); m < y; m++) g[m] = l[m];
    return g;
  }
  function f(l, y) {
    for (var m = 0; m < y.length; m++) {
      var g = y[m];
      g.enumerable = g.enumerable || false, g.configurable = true, "value" in g && (g.writable = true), Object.defineProperty(l, g.key, g);
    }
  }
  function a(l, y, m) {
    return y && f(l.prototype, y), Object.defineProperty(l, "prototype", { writable: false }), l;
  }
  function d(l, y) {
    l.prototype = Object.create(y.prototype), l.prototype.constructor = l, h(l, y);
  }
  function h(l, y) {
    return h = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(m, g) {
      return m.__proto__ = g, m;
    }, h(l, y);
  }
  var b = function(l) {
    d(y, l);
    function y(g) {
      var $;
      return $ = l.call(this, g) || this, $.nodes || ($.nodes = []), $;
    }
    var m = y.prototype;
    return m.append = function(g) {
      return g.parent = this, this.nodes.push(g), this;
    }, m.prepend = function(g) {
      return g.parent = this, this.nodes.unshift(g), this;
    }, m.at = function(g) {
      return this.nodes[g];
    }, m.index = function(g) {
      return typeof g == "number" ? g : this.nodes.indexOf(g);
    }, m.removeChild = function(g) {
      g = this.index(g), this.at(g).parent = void 0, this.nodes.splice(g, 1);
      var $;
      for (var O in this.indexes) $ = this.indexes[O], $ >= g && (this.indexes[O] = $ - 1);
      return this;
    }, m.removeAll = function() {
      for (var g = c(this.nodes), $; !($ = g()).done; ) {
        var O = $.value;
        O.parent = void 0;
      }
      return this.nodes = [], this;
    }, m.empty = function() {
      return this.removeAll();
    }, m.insertAfter = function(g, $) {
      $.parent = this;
      var O = this.index(g);
      this.nodes.splice(O + 1, 0, $), $.parent = this;
      var v;
      for (var w in this.indexes) v = this.indexes[w], O <= v && (this.indexes[w] = v + 1);
      return this;
    }, m.insertBefore = function(g, $) {
      $.parent = this;
      var O = this.index(g);
      this.nodes.splice(O, 0, $), $.parent = this;
      var v;
      for (var w in this.indexes) v = this.indexes[w], v <= O && (this.indexes[w] = v + 1);
      return this;
    }, m._findChildAtPosition = function(g, $) {
      var O = void 0;
      return this.each(function(v) {
        if (v.atPosition) {
          var w = v.atPosition(g, $);
          if (w) return O = w, false;
        } else if (v.isAtPosition(g, $)) return O = v, false;
      }), O;
    }, m.atPosition = function(g, $) {
      if (this.isAtPosition(g, $)) return this._findChildAtPosition(g, $) || this;
    }, m._inferEndPosition = function() {
      this.last && this.last.source && this.last.source.end && (this.source = this.source || {}, this.source.end = this.source.end || {}, Object.assign(this.source.end, this.last.source.end));
    }, m.each = function(g) {
      this.lastEach || (this.lastEach = 0), this.indexes || (this.indexes = {}), this.lastEach++;
      var $ = this.lastEach;
      if (this.indexes[$] = 0, !!this.length) {
        for (var O, v; this.indexes[$] < this.length && (O = this.indexes[$], v = g(this.at(O), O), v !== false); ) this.indexes[$] += 1;
        if (delete this.indexes[$], v === false) return false;
      }
    }, m.walk = function(g) {
      return this.each(function($, O) {
        var v = g($, O);
        if (v !== false && $.length && (v = $.walk(g)), v === false) return false;
      });
    }, m.walkAttributes = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.ATTRIBUTE) return g.call($, O);
      });
    }, m.walkClasses = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.CLASS) return g.call($, O);
      });
    }, m.walkCombinators = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.COMBINATOR) return g.call($, O);
      });
    }, m.walkComments = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.COMMENT) return g.call($, O);
      });
    }, m.walkIds = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.ID) return g.call($, O);
      });
    }, m.walkNesting = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.NESTING) return g.call($, O);
      });
    }, m.walkPseudos = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.PSEUDO) return g.call($, O);
      });
    }, m.walkTags = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.TAG) return g.call($, O);
      });
    }, m.walkUniversals = function(g) {
      var $ = this;
      return this.walk(function(O) {
        if (O.type === n.UNIVERSAL) return g.call($, O);
      });
    }, m.split = function(g) {
      var $ = this, O = [];
      return this.reduce(function(v, w, _) {
        var x = g.call($, w);
        return O.push(w), x ? (v.push(O), O = []) : _ === $.length - 1 && v.push(O), v;
      }, []);
    }, m.map = function(g) {
      return this.nodes.map(g);
    }, m.reduce = function(g, $) {
      return this.nodes.reduce(g, $);
    }, m.every = function(g) {
      return this.nodes.every(g);
    }, m.some = function(g) {
      return this.nodes.some(g);
    }, m.filter = function(g) {
      return this.nodes.filter(g);
    }, m.sort = function(g) {
      return this.nodes.sort(g);
    }, m.toString = function() {
      return this.map(String).join("");
    }, a(y, [{ key: "first", get: function() {
      return this.at(0);
    } }, { key: "last", get: function() {
      return this.at(this.length - 1);
    } }, { key: "length", get: function() {
      return this.nodes.length;
    } }]), y;
  }(r.default);
  e.default = b, t.exports = e.default;
}), wu = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(uo()), n = se();
  function o(f) {
    return f && f.__esModule ? f : { default: f };
  }
  function s(f, a) {
    for (var d = 0; d < a.length; d++) {
      var h = a[d];
      h.enumerable = h.enumerable || false, h.configurable = true, "value" in h && (h.writable = true), Object.defineProperty(f, h.key, h);
    }
  }
  function u(f, a, d) {
    return a && s(f.prototype, a), Object.defineProperty(f, "prototype", { writable: false }), f;
  }
  function c(f, a) {
    f.prototype = Object.create(a.prototype), f.prototype.constructor = f, i(f, a);
  }
  function i(f, a) {
    return i = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(d, h) {
      return d.__proto__ = h, d;
    }, i(f, a);
  }
  var p = function(f) {
    c(a, f);
    function a(h) {
      var b;
      return b = f.call(this, h) || this, b.type = n.ROOT, b;
    }
    var d = a.prototype;
    return d.toString = function() {
      var h = this.reduce(function(b, l) {
        return b.push(String(l)), b;
      }, []).join(",");
      return this.trailingComma ? h + "," : h;
    }, d.error = function(h, b) {
      return this._error ? this._error(h, b) : new Error(h);
    }, u(a, [{ key: "errorGenerator", set: function(h) {
      this._error = h;
    } }]), a;
  }(r.default);
  e.default = p, t.exports = e.default;
}), Ou = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(uo()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(f) {
      var a;
      return a = i.call(this, f) || this, a.type = n.SELECTOR, a;
    }
    return p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), $u = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = u(Yt("cssesc")), n = ur(), o = u(Ce()), s = se();
  function u(d) {
    return d && d.__esModule ? d : { default: d };
  }
  function c(d, h) {
    for (var b = 0; b < h.length; b++) {
      var l = h[b];
      l.enumerable = l.enumerable || false, l.configurable = true, "value" in l && (l.writable = true), Object.defineProperty(d, l.key, l);
    }
  }
  function i(d, h, b) {
    return h && c(d.prototype, h), Object.defineProperty(d, "prototype", { writable: false }), d;
  }
  function p(d, h) {
    d.prototype = Object.create(h.prototype), d.prototype.constructor = d, f(d, h);
  }
  function f(d, h) {
    return f = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(b, l) {
      return b.__proto__ = l, b;
    }, f(d, h);
  }
  var a = function(d) {
    p(h, d);
    function h(l) {
      var y;
      return y = d.call(this, l) || this, y.type = s.CLASS, y._constructed = true, y;
    }
    var b = h.prototype;
    return b.valueToString = function() {
      return "." + d.prototype.valueToString.call(this);
    }, i(h, [{ key: "value", get: function() {
      return this._value;
    }, set: function(l) {
      if (this._constructed) {
        var y = (0, r.default)(l, { isIdentifier: true });
        y !== l ? ((0, n.ensureObject)(this, "raws"), this.raws.value = y) : this.raws && delete this.raws.value;
      }
      this._value = l;
    } }]), h;
  }(o.default);
  e.default = a, t.exports = e.default;
}), xu = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(Ce()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(f) {
      var a;
      return a = i.call(this, f) || this, a.type = n.COMMENT, a;
    }
    return p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), _u = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(Ce()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(a) {
      var d;
      return d = i.call(this, a) || this, d.type = n.ID, d;
    }
    var f = p.prototype;
    return f.valueToString = function() {
      return "#" + i.prototype.valueToString.call(this);
    }, p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), co = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = s(Yt("cssesc")), n = ur(), o = s(Ce());
  function s(a) {
    return a && a.__esModule ? a : { default: a };
  }
  function u(a, d) {
    for (var h = 0; h < d.length; h++) {
      var b = d[h];
      b.enumerable = b.enumerable || false, b.configurable = true, "value" in b && (b.writable = true), Object.defineProperty(a, b.key, b);
    }
  }
  function c(a, d, h) {
    return d && u(a.prototype, d), Object.defineProperty(a, "prototype", { writable: false }), a;
  }
  function i(a, d) {
    a.prototype = Object.create(d.prototype), a.prototype.constructor = a, p(a, d);
  }
  function p(a, d) {
    return p = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(h, b) {
      return h.__proto__ = b, h;
    }, p(a, d);
  }
  var f = function(a) {
    i(d, a);
    function d() {
      return a.apply(this, arguments) || this;
    }
    var h = d.prototype;
    return h.qualifiedName = function(b) {
      return this.namespace ? this.namespaceString + "|" + b : b;
    }, h.valueToString = function() {
      return this.qualifiedName(a.prototype.valueToString.call(this));
    }, c(d, [{ key: "namespace", get: function() {
      return this._namespace;
    }, set: function(b) {
      if (b === true || b === "*" || b === "&") {
        this._namespace = b, this.raws && delete this.raws.namespace;
        return;
      }
      var l = (0, r.default)(b, { isIdentifier: true });
      this._namespace = b, l !== b ? ((0, n.ensureObject)(this, "raws"), this.raws.namespace = l) : this.raws && delete this.raws.namespace;
    } }, { key: "ns", get: function() {
      return this._namespace;
    }, set: function(b) {
      this.namespace = b;
    } }, { key: "namespaceString", get: function() {
      if (this.namespace) {
        var b = this.stringifyProperty("namespace");
        return b === true ? "" : b;
      } else return "";
    } }]), d;
  }(o.default);
  e.default = f, t.exports = e.default;
}), Su = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(co()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(f) {
      var a;
      return a = i.call(this, f) || this, a.type = n.TAG, a;
    }
    return p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), Pu = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(Ce()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(f) {
      var a;
      return a = i.call(this, f) || this, a.type = n.STRING, a;
    }
    return p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), ju = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(uo()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(a) {
      var d;
      return d = i.call(this, a) || this, d.type = n.PSEUDO, d;
    }
    var f = p.prototype;
    return f.toString = function() {
      var a = this.length ? "(" + this.map(String).join(",") + ")" : "";
      return [this.rawSpaceBefore, this.stringifyProperty("value"), a, this.rawSpaceAfter].join("");
    }, p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), ku = H((e) => {
  e.__esModule = true, e.default = void 0, e.unescapeValue = y;
  var t = u(Yt("cssesc")), r = u(vu()), n = u(co()), o = se(), s;
  function u(v) {
    return v && v.__esModule ? v : { default: v };
  }
  function c(v, w) {
    for (var _ = 0; _ < w.length; _++) {
      var x = w[_];
      x.enumerable = x.enumerable || false, x.configurable = true, "value" in x && (x.writable = true), Object.defineProperty(v, x.key, x);
    }
  }
  function i(v, w, _) {
    return w && c(v.prototype, w), Object.defineProperty(v, "prototype", { writable: false }), v;
  }
  function p(v, w) {
    v.prototype = Object.create(w.prototype), v.prototype.constructor = v, f(v, w);
  }
  function f(v, w) {
    return f = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(_, x) {
      return _.__proto__ = x, _;
    }, f(v, w);
  }
  var a = Yt("util-deprecate"), d = /^('|")([^]*)\1$/, h = a(function() {
  }, "Assigning an attribute a value containing characters that might need to be escaped is deprecated. Call attribute.setValue() instead."), b = a(function() {
  }, "Assigning attr.quoted is deprecated and has no effect. Assign to attr.quoteMark instead."), l = a(function() {
  }, "Constructing an Attribute selector with a value without specifying quoteMark is deprecated. Note: The value should be unescaped now.");
  function y(v) {
    var w = false, _ = null, x = v, S = x.match(d);
    return S && (_ = S[1], x = S[2]), x = (0, r.default)(x), x !== v && (w = true), { deprecatedUsage: w, unescaped: x, quoteMark: _ };
  }
  function m(v) {
    if (v.quoteMark !== void 0 || v.value === void 0) return v;
    l();
    var w = y(v.value), _ = w.quoteMark, x = w.unescaped;
    return v.raws || (v.raws = {}), v.raws.value === void 0 && (v.raws.value = v.value), v.value = x, v.quoteMark = _, v;
  }
  var g = function(v) {
    p(w, v);
    function w(x) {
      var S;
      return x === void 0 && (x = {}), S = v.call(this, m(x)) || this, S.type = o.ATTRIBUTE, S.raws = S.raws || {}, Object.defineProperty(S.raws, "unquoted", { get: a(function() {
        return S.value;
      }, "attr.raws.unquoted is deprecated. Call attr.value instead."), set: a(function() {
        return S.value;
      }, "Setting attr.raws.unquoted is deprecated and has no effect. attr.value is unescaped by default now.") }), S._constructed = true, S;
    }
    var _ = w.prototype;
    return _.getQuotedValue = function(x) {
      x === void 0 && (x = {});
      var S = this._determineQuoteMark(x), j = $[S], A = (0, t.default)(this._value, j);
      return A;
    }, _._determineQuoteMark = function(x) {
      return x.smart ? this.smartQuoteMark(x) : this.preferredQuoteMark(x);
    }, _.setValue = function(x, S) {
      S === void 0 && (S = {}), this._value = x, this._quoteMark = this._determineQuoteMark(S), this._syncRawValue();
    }, _.smartQuoteMark = function(x) {
      var S = this.value, j = S.replace(/[^']/g, "").length, A = S.replace(/[^"]/g, "").length;
      if (j + A === 0) {
        var M = (0, t.default)(S, { isIdentifier: true });
        if (M === S) return w.NO_QUOTE;
        var q = this.preferredQuoteMark(x);
        if (q === w.NO_QUOTE) {
          var D = this.quoteMark || x.quoteMark || w.DOUBLE_QUOTE, ee = $[D], z = (0, t.default)(S, ee);
          if (z.length < M.length) return D;
        }
        return q;
      } else return A === j ? this.preferredQuoteMark(x) : A < j ? w.DOUBLE_QUOTE : w.SINGLE_QUOTE;
    }, _.preferredQuoteMark = function(x) {
      var S = x.preferCurrentQuoteMark ? this.quoteMark : x.quoteMark;
      return S === void 0 && (S = x.preferCurrentQuoteMark ? x.quoteMark : this.quoteMark), S === void 0 && (S = w.DOUBLE_QUOTE), S;
    }, _._syncRawValue = function() {
      var x = (0, t.default)(this._value, $[this.quoteMark]);
      x === this._value ? this.raws && delete this.raws.value : this.raws.value = x;
    }, _._handleEscapes = function(x, S) {
      if (this._constructed) {
        var j = (0, t.default)(S, { isIdentifier: true });
        j !== S ? this.raws[x] = j : delete this.raws[x];
      }
    }, _._spacesFor = function(x) {
      var S = { before: "", after: "" }, j = this.spaces[x] || {}, A = this.raws.spaces && this.raws.spaces[x] || {};
      return Object.assign(S, j, A);
    }, _._stringFor = function(x, S, j) {
      S === void 0 && (S = x), j === void 0 && (j = O);
      var A = this._spacesFor(S);
      return j(this.stringifyProperty(x), A);
    }, _.offsetOf = function(x) {
      var S = 1, j = this._spacesFor("attribute");
      if (S += j.before.length, x === "namespace" || x === "ns") return this.namespace ? S : -1;
      if (x === "attributeNS" || (S += this.namespaceString.length, this.namespace && (S += 1), x === "attribute")) return S;
      S += this.stringifyProperty("attribute").length, S += j.after.length;
      var A = this._spacesFor("operator");
      S += A.before.length;
      var M = this.stringifyProperty("operator");
      if (x === "operator") return M ? S : -1;
      S += M.length, S += A.after.length;
      var q = this._spacesFor("value");
      S += q.before.length;
      var D = this.stringifyProperty("value");
      if (x === "value") return D ? S : -1;
      S += D.length, S += q.after.length;
      var ee = this._spacesFor("insensitive");
      return S += ee.before.length, x === "insensitive" && this.insensitive ? S : -1;
    }, _.toString = function() {
      var x = this, S = [this.rawSpaceBefore, "["];
      return S.push(this._stringFor("qualifiedAttribute", "attribute")), this.operator && (this.value || this.value === "") && (S.push(this._stringFor("operator")), S.push(this._stringFor("value")), S.push(this._stringFor("insensitiveFlag", "insensitive", function(j, A) {
        return j.length > 0 && !x.quoted && A.before.length === 0 && !(x.spaces.value && x.spaces.value.after) && (A.before = " "), O(j, A);
      }))), S.push("]"), S.push(this.rawSpaceAfter), S.join("");
    }, i(w, [{ key: "quoted", get: function() {
      var x = this.quoteMark;
      return x === "'" || x === '"';
    }, set: function(x) {
      b();
    } }, { key: "quoteMark", get: function() {
      return this._quoteMark;
    }, set: function(x) {
      if (!this._constructed) {
        this._quoteMark = x;
        return;
      }
      this._quoteMark !== x && (this._quoteMark = x, this._syncRawValue());
    } }, { key: "qualifiedAttribute", get: function() {
      return this.qualifiedName(this.raws.attribute || this.attribute);
    } }, { key: "insensitiveFlag", get: function() {
      return this.insensitive ? "i" : "";
    } }, { key: "value", get: function() {
      return this._value;
    }, set: function(x) {
      if (this._constructed) {
        var S = y(x), j = S.deprecatedUsage, A = S.unescaped, M = S.quoteMark;
        if (j && h(), A === this._value && M === this._quoteMark) return;
        this._value = A, this._quoteMark = M, this._syncRawValue();
      } else this._value = x;
    } }, { key: "insensitive", get: function() {
      return this._insensitive;
    }, set: function(x) {
      x || (this._insensitive = false, this.raws && (this.raws.insensitiveFlag === "I" || this.raws.insensitiveFlag === "i") && (this.raws.insensitiveFlag = void 0)), this._insensitive = x;
    } }, { key: "attribute", get: function() {
      return this._attribute;
    }, set: function(x) {
      this._handleEscapes("attribute", x), this._attribute = x;
    } }]), w;
  }(n.default);
  e.default = g, g.NO_QUOTE = null, g.SINGLE_QUOTE = "'", g.DOUBLE_QUOTE = '"';
  var $ = (s = { "'": { quotes: "single", wrap: true }, '"': { quotes: "double", wrap: true } }, s[null] = { isIdentifier: true }, s);
  function O(v, w) {
    return "" + w.before + v + w.after;
  }
}), Eu = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(co()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(f) {
      var a;
      return a = i.call(this, f) || this, a.type = n.UNIVERSAL, a.value = "*", a;
    }
    return p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), Tu = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(Ce()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(f) {
      var a;
      return a = i.call(this, f) || this, a.type = n.COMBINATOR, a;
    }
    return p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), Au = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = o(Ce()), n = se();
  function o(i) {
    return i && i.__esModule ? i : { default: i };
  }
  function s(i, p) {
    i.prototype = Object.create(p.prototype), i.prototype.constructor = i, u(i, p);
  }
  function u(i, p) {
    return u = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(f, a) {
      return f.__proto__ = a, f;
    }, u(i, p);
  }
  var c = function(i) {
    s(p, i);
    function p(f) {
      var a;
      return a = i.call(this, f) || this, a.type = n.NESTING, a.value = "&", a;
    }
    return p;
  }(r.default);
  e.default = c, t.exports = e.default;
}), sw = H((e, t) => {
  e.__esModule = true, e.default = r;
  function r(n) {
    return n.sort(function(o, s) {
      return o - s;
    });
  }
  t.exports = e.default;
}), Cu = H((e) => {
  e.__esModule = true, e.word = e.tilde = e.tab = e.str = e.space = e.slash = e.singleQuote = e.semicolon = e.plus = e.pipe = e.openSquare = e.openParenthesis = e.newline = e.greaterThan = e.feed = e.equals = e.doubleQuote = e.dollar = e.cr = e.comment = e.comma = e.combinator = e.colon = e.closeSquare = e.closeParenthesis = e.caret = e.bang = e.backslash = e.at = e.asterisk = e.ampersand = void 0;
  var t = 38;
  e.ampersand = t;
  var r = 42;
  e.asterisk = r;
  var n = 64;
  e.at = n;
  var o = 44;
  e.comma = o;
  var s = 58;
  e.colon = s;
  var u = 59;
  e.semicolon = u;
  var c = 40;
  e.openParenthesis = c;
  var i = 41;
  e.closeParenthesis = i;
  var p = 91;
  e.openSquare = p;
  var f = 93;
  e.closeSquare = f;
  var a = 36;
  e.dollar = a;
  var d = 126;
  e.tilde = d;
  var h = 94;
  e.caret = h;
  var b = 43;
  e.plus = b;
  var l = 61;
  e.equals = l;
  var y = 124;
  e.pipe = y;
  var m = 62;
  e.greaterThan = m;
  var g = 32;
  e.space = g;
  var $ = 39;
  e.singleQuote = $;
  var O = 34;
  e.doubleQuote = O;
  var v = 47;
  e.slash = v;
  var w = 33;
  e.bang = w;
  var _ = 92;
  e.backslash = _;
  var x = 13;
  e.cr = x;
  var S = 12;
  e.feed = S;
  var j = 10;
  e.newline = j;
  var A = 9;
  e.tab = A;
  var M = $;
  e.str = M;
  var q = -1;
  e.comment = q;
  var D = -2;
  e.word = D;
  var ee = -3;
  e.combinator = ee;
}), iw = H((e) => {
  e.__esModule = true, e.FIELDS = void 0, e.default = b;
  var t = s(Cu()), r, n;
  function o(l) {
    if (typeof WeakMap != "function") return null;
    var y = /* @__PURE__ */ new WeakMap(), m = /* @__PURE__ */ new WeakMap();
    return (o = function(g) {
      return g ? m : y;
    })(l);
  }
  function s(l, y) {
    if (l && l.__esModule) return l;
    if (l === null || typeof l != "object" && typeof l != "function") return { default: l };
    var m = o(y);
    if (m && m.has(l)) return m.get(l);
    var g = {}, $ = Object.defineProperty && Object.getOwnPropertyDescriptor;
    for (var O in l) if (O !== "default" && Object.prototype.hasOwnProperty.call(l, O)) {
      var v = $ ? Object.getOwnPropertyDescriptor(l, O) : null;
      v && (v.get || v.set) ? Object.defineProperty(g, O, v) : g[O] = l[O];
    }
    return g.default = l, m && m.set(l, g), g;
  }
  var u = (r = {}, r[t.tab] = true, r[t.newline] = true, r[t.cr] = true, r[t.feed] = true, r), c = (n = {}, n[t.space] = true, n[t.tab] = true, n[t.newline] = true, n[t.cr] = true, n[t.feed] = true, n[t.ampersand] = true, n[t.asterisk] = true, n[t.bang] = true, n[t.comma] = true, n[t.colon] = true, n[t.semicolon] = true, n[t.openParenthesis] = true, n[t.closeParenthesis] = true, n[t.openSquare] = true, n[t.closeSquare] = true, n[t.singleQuote] = true, n[t.doubleQuote] = true, n[t.plus] = true, n[t.pipe] = true, n[t.tilde] = true, n[t.greaterThan] = true, n[t.equals] = true, n[t.dollar] = true, n[t.caret] = true, n[t.slash] = true, n), i = {}, p = "0123456789abcdefABCDEF";
  for (f = 0; f < p.length; f++) i[p.charCodeAt(f)] = true;
  var f;
  function a(l, y) {
    var m = y, g;
    do {
      if (g = l.charCodeAt(m), c[g]) return m - 1;
      g === t.backslash ? m = d(l, m) + 1 : m++;
    } while (m < l.length);
    return m - 1;
  }
  function d(l, y) {
    var m = y, g = l.charCodeAt(m + 1);
    if (!u[g]) if (i[g]) {
      var $ = 0;
      do
        m++, $++, g = l.charCodeAt(m + 1);
      while (i[g] && $ < 6);
      $ < 6 && g === t.space && m++;
    } else m++;
    return m;
  }
  var h = { TYPE: 0, START_LINE: 1, START_COL: 2, END_LINE: 3, END_COL: 4, START_POS: 5, END_POS: 6 };
  e.FIELDS = h;
  function b(l) {
    var y = [], m = l.css.valueOf(), g = m, $ = g.length, O = -1, v = 1, w = 0, _ = 0, x, S, j, A, M, q, D, ee, z, ae, ie, $t, de;
    function C(I, P) {
      if (l.safe) m += P, z = m.length - 1;
      else throw l.error("Unclosed " + I, v, w - O, w);
    }
    for (; w < $; ) {
      switch (x = m.charCodeAt(w), x === t.newline && (O = w, v += 1), x) {
        case t.space:
        case t.tab:
        case t.newline:
        case t.cr:
        case t.feed:
          z = w;
          do
            z += 1, x = m.charCodeAt(z), x === t.newline && (O = z, v += 1);
          while (x === t.space || x === t.newline || x === t.tab || x === t.cr || x === t.feed);
          de = t.space, A = v, j = z - O - 1, _ = z;
          break;
        case t.plus:
        case t.greaterThan:
        case t.tilde:
        case t.pipe:
          z = w;
          do
            z += 1, x = m.charCodeAt(z);
          while (x === t.plus || x === t.greaterThan || x === t.tilde || x === t.pipe);
          de = t.combinator, A = v, j = w - O, _ = z;
          break;
        case t.asterisk:
        case t.ampersand:
        case t.bang:
        case t.comma:
        case t.equals:
        case t.dollar:
        case t.caret:
        case t.openSquare:
        case t.closeSquare:
        case t.colon:
        case t.semicolon:
        case t.openParenthesis:
        case t.closeParenthesis:
          z = w, de = x, A = v, j = w - O, _ = z + 1;
          break;
        case t.singleQuote:
        case t.doubleQuote:
          $t = x === t.singleQuote ? "'" : '"', z = w;
          do
            for (M = false, z = m.indexOf($t, z + 1), z === -1 && C("quote", $t), q = z; m.charCodeAt(q - 1) === t.backslash; ) q -= 1, M = !M;
          while (M);
          de = t.str, A = v, j = w - O, _ = z + 1;
          break;
        default:
          x === t.slash && m.charCodeAt(w + 1) === t.asterisk ? (z = m.indexOf("*/", w + 2) + 1, z === 0 && C("comment", "*/"), S = m.slice(w, z + 1), ee = S.split(`
`), D = ee.length - 1, D > 0 ? (ae = v + D, ie = z - ee[D].length) : (ae = v, ie = O), de = t.comment, v = ae, A = ae, j = z - ie) : x === t.slash ? (z = w, de = x, A = v, j = w - O, _ = z + 1) : (z = a(m, w), de = t.word, A = v, j = z - O), _ = z + 1;
          break;
      }
      y.push([de, v, w - O, A, j, w, _]), ie && (O = ie, ie = null), w = _;
    }
    return y;
  }
}), aw = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = _(wu()), n = _(Ou()), o = _($u()), s = _(xu()), u = _(_u()), c = _(Su()), i = _(Pu()), p = _(ju()), f = w(ku()), a = _(Eu()), d = _(Tu()), h = _(Au()), b = _(sw()), l = w(iw()), y = w(Cu()), m = w(se()), g = ur(), $, O;
  function v(C) {
    if (typeof WeakMap != "function") return null;
    var I = /* @__PURE__ */ new WeakMap(), P = /* @__PURE__ */ new WeakMap();
    return (v = function(T) {
      return T ? P : I;
    })(C);
  }
  function w(C, I) {
    if (C && C.__esModule) return C;
    if (C === null || typeof C != "object" && typeof C != "function") return { default: C };
    var P = v(I);
    if (P && P.has(C)) return P.get(C);
    var T = {}, B = Object.defineProperty && Object.getOwnPropertyDescriptor;
    for (var E in C) if (E !== "default" && Object.prototype.hasOwnProperty.call(C, E)) {
      var L = B ? Object.getOwnPropertyDescriptor(C, E) : null;
      L && (L.get || L.set) ? Object.defineProperty(T, E, L) : T[E] = C[E];
    }
    return T.default = C, P && P.set(C, T), T;
  }
  function _(C) {
    return C && C.__esModule ? C : { default: C };
  }
  function x(C, I) {
    for (var P = 0; P < I.length; P++) {
      var T = I[P];
      T.enumerable = T.enumerable || false, T.configurable = true, "value" in T && (T.writable = true), Object.defineProperty(C, T.key, T);
    }
  }
  function S(C, I, P) {
    return I && x(C.prototype, I), Object.defineProperty(C, "prototype", { writable: false }), C;
  }
  var j = ($ = {}, $[y.space] = true, $[y.cr] = true, $[y.feed] = true, $[y.newline] = true, $[y.tab] = true, $), A = Object.assign({}, j, (O = {}, O[y.comment] = true, O));
  function M(C) {
    return { line: C[l.FIELDS.START_LINE], column: C[l.FIELDS.START_COL] };
  }
  function q(C) {
    return { line: C[l.FIELDS.END_LINE], column: C[l.FIELDS.END_COL] };
  }
  function D(C, I, P, T) {
    return { start: { line: C, column: I }, end: { line: P, column: T } };
  }
  function ee(C) {
    return D(C[l.FIELDS.START_LINE], C[l.FIELDS.START_COL], C[l.FIELDS.END_LINE], C[l.FIELDS.END_COL]);
  }
  function z(C, I) {
    if (C) return D(C[l.FIELDS.START_LINE], C[l.FIELDS.START_COL], I[l.FIELDS.END_LINE], I[l.FIELDS.END_COL]);
  }
  function ae(C, I) {
    var P = C[I];
    if (typeof P == "string") return P.indexOf("\\") !== -1 && ((0, g.ensureObject)(C, "raws"), C[I] = (0, g.unesc)(P), C.raws[I] === void 0 && (C.raws[I] = P)), C;
  }
  function ie(C, I) {
    for (var P = -1, T = []; (P = C.indexOf(I, P + 1)) !== -1; ) T.push(P);
    return T;
  }
  function $t() {
    var C = Array.prototype.concat.apply([], arguments);
    return C.filter(function(I, P) {
      return P === C.indexOf(I);
    });
  }
  var de = function() {
    function C(P, T) {
      T === void 0 && (T = {}), this.rule = P, this.options = Object.assign({ lossy: false, safe: false }, T), this.position = 0, this.css = typeof this.rule == "string" ? this.rule : this.rule.selector, this.tokens = (0, l.default)({ css: this.css, error: this._errorGenerator(), safe: this.options.safe });
      var B = z(this.tokens[0], this.tokens[this.tokens.length - 1]);
      this.root = new r.default({ source: B }), this.root.errorGenerator = this._errorGenerator();
      var E = new n.default({ source: { start: { line: 1, column: 1 } }, sourceIndex: 0 });
      this.root.append(E), this.current = E, this.loop();
    }
    var I = C.prototype;
    return I._errorGenerator = function() {
      var P = this;
      return function(T, B) {
        return typeof P.rule == "string" ? new Error(T) : P.rule.error(T, B);
      };
    }, I.attribute = function() {
      var P = [], T = this.currToken;
      for (this.position++; this.position < this.tokens.length && this.currToken[l.FIELDS.TYPE] !== y.closeSquare; ) P.push(this.currToken), this.position++;
      if (this.currToken[l.FIELDS.TYPE] !== y.closeSquare) return this.expected("closing square bracket", this.currToken[l.FIELDS.START_POS]);
      var B = P.length, E = { source: D(T[1], T[2], this.currToken[3], this.currToken[4]), sourceIndex: T[l.FIELDS.START_POS] };
      if (B === 1 && !~[y.word].indexOf(P[0][l.FIELDS.TYPE])) return this.expected("attribute", P[0][l.FIELDS.START_POS]);
      for (var L = 0, K = "", G = "", F = null, Q = false; L < B; ) {
        var te = P[L], U = this.content(te), Z = P[L + 1];
        switch (te[l.FIELDS.TYPE]) {
          case y.space:
            if (Q = true, this.options.lossy) break;
            if (F) {
              (0, g.ensureObject)(E, "spaces", F);
              var ve = E.spaces[F].after || "";
              E.spaces[F].after = ve + U;
              var ye = (0, g.getProp)(E, "raws", "spaces", F, "after") || null;
              ye && (E.raws.spaces[F].after = ye + U);
            } else K = K + U, G = G + U;
            break;
          case y.asterisk:
            if (Z[l.FIELDS.TYPE] === y.equals) E.operator = U, F = "operator";
            else if ((!E.namespace || F === "namespace" && !Q) && Z) {
              K && ((0, g.ensureObject)(E, "spaces", "attribute"), E.spaces.attribute.before = K, K = ""), G && ((0, g.ensureObject)(E, "raws", "spaces", "attribute"), E.raws.spaces.attribute.before = K, G = ""), E.namespace = (E.namespace || "") + U;
              var ce = (0, g.getProp)(E, "raws", "namespace") || null;
              ce && (E.raws.namespace += U), F = "namespace";
            }
            Q = false;
            break;
          case y.dollar:
            if (F === "value") {
              var ne = (0, g.getProp)(E, "raws", "value");
              E.value += "$", ne && (E.raws.value = ne + "$");
              break;
            }
          case y.caret:
            Z[l.FIELDS.TYPE] === y.equals && (E.operator = U, F = "operator"), Q = false;
            break;
          case y.combinator:
            if (U === "~" && Z[l.FIELDS.TYPE] === y.equals && (E.operator = U, F = "operator"), U !== "|") {
              Q = false;
              break;
            }
            Z[l.FIELDS.TYPE] === y.equals ? (E.operator = U, F = "operator") : !E.namespace && !E.attribute && (E.namespace = true), Q = false;
            break;
          case y.word:
            if (Z && this.content(Z) === "|" && P[L + 2] && P[L + 2][l.FIELDS.TYPE] !== y.equals && !E.operator && !E.namespace) E.namespace = U, F = "namespace";
            else if (!E.attribute || F === "attribute" && !Q) {
              K && ((0, g.ensureObject)(E, "spaces", "attribute"), E.spaces.attribute.before = K, K = ""), G && ((0, g.ensureObject)(E, "raws", "spaces", "attribute"), E.raws.spaces.attribute.before = G, G = ""), E.attribute = (E.attribute || "") + U;
              var pe = (0, g.getProp)(E, "raws", "attribute") || null;
              pe && (E.raws.attribute += U), F = "attribute";
            } else if (!E.value && E.value !== "" || F === "value" && !(Q || E.quoteMark)) {
              var he = (0, g.unesc)(U), xe = (0, g.getProp)(E, "raws", "value") || "", Dt = E.value || "";
              E.value = Dt + he, E.quoteMark = null, (he !== U || xe) && ((0, g.ensureObject)(E, "raws"), E.raws.value = (xe || Dt) + U), F = "value";
            } else {
              var Mt = U === "i" || U === "I";
              (E.value || E.value === "") && (E.quoteMark || Q) ? (E.insensitive = Mt, (!Mt || U === "I") && ((0, g.ensureObject)(E, "raws"), E.raws.insensitiveFlag = U), F = "insensitive", K && ((0, g.ensureObject)(E, "spaces", "insensitive"), E.spaces.insensitive.before = K, K = ""), G && ((0, g.ensureObject)(E, "raws", "spaces", "insensitive"), E.raws.spaces.insensitive.before = G, G = "")) : (E.value || E.value === "") && (F = "value", E.value += U, E.raws.value && (E.raws.value += U));
            }
            Q = false;
            break;
          case y.str:
            if (!E.attribute || !E.operator) return this.error("Expected an attribute followed by an operator preceding the string.", { index: te[l.FIELDS.START_POS] });
            var xt = (0, f.unescapeValue)(U), Bu = xt.unescaped, qu = xt.quoteMark;
            E.value = Bu, E.quoteMark = qu, F = "value", (0, g.ensureObject)(E, "raws"), E.raws.value = U, Q = false;
            break;
          case y.equals:
            if (!E.attribute) return this.expected("attribute", te[l.FIELDS.START_POS], U);
            if (E.value) return this.error('Unexpected "=" found; an operator was already defined.', { index: te[l.FIELDS.START_POS] });
            E.operator = E.operator ? E.operator + U : U, F = "operator", Q = false;
            break;
          case y.comment:
            if (F) if (Q || Z && Z[l.FIELDS.TYPE] === y.space || F === "insensitive") {
              var zu = (0, g.getProp)(E, "spaces", F, "after") || "", Wu = (0, g.getProp)(E, "raws", "spaces", F, "after") || zu;
              (0, g.ensureObject)(E, "raws", "spaces", F), E.raws.spaces[F].after = Wu + U;
            } else {
              var Gu = E[F] || "", Yu = (0, g.getProp)(E, "raws", F) || Gu;
              (0, g.ensureObject)(E, "raws"), E.raws[F] = Yu + U;
            }
            else G = G + U;
            break;
          default:
            return this.error('Unexpected "' + U + '" found.', { index: te[l.FIELDS.START_POS] });
        }
        L++;
      }
      ae(E, "attribute"), ae(E, "namespace"), this.newNode(new f.default(E)), this.position++;
    }, I.parseWhitespaceEquivalentTokens = function(P) {
      P < 0 && (P = this.tokens.length);
      var T = this.position, B = [], E = "", L = void 0;
      do
        if (j[this.currToken[l.FIELDS.TYPE]]) this.options.lossy || (E += this.content());
        else if (this.currToken[l.FIELDS.TYPE] === y.comment) {
          var K = {};
          E && (K.before = E, E = ""), L = new s.default({ value: this.content(), source: ee(this.currToken), sourceIndex: this.currToken[l.FIELDS.START_POS], spaces: K }), B.push(L);
        }
      while (++this.position < P);
      if (E) {
        if (L) L.spaces.after = E;
        else if (!this.options.lossy) {
          var G = this.tokens[T], F = this.tokens[this.position - 1];
          B.push(new i.default({ value: "", source: D(G[l.FIELDS.START_LINE], G[l.FIELDS.START_COL], F[l.FIELDS.END_LINE], F[l.FIELDS.END_COL]), sourceIndex: G[l.FIELDS.START_POS], spaces: { before: E, after: "" } }));
        }
      }
      return B;
    }, I.convertWhitespaceNodesToSpace = function(P, T) {
      var B = this;
      T === void 0 && (T = false);
      var E = "", L = "";
      P.forEach(function(G) {
        var F = B.lossySpace(G.spaces.before, T), Q = B.lossySpace(G.rawSpaceBefore, T);
        E += F + B.lossySpace(G.spaces.after, T && F.length === 0), L += F + G.value + B.lossySpace(G.rawSpaceAfter, T && Q.length === 0);
      }), L === E && (L = void 0);
      var K = { space: E, rawSpace: L };
      return K;
    }, I.isNamedCombinator = function(P) {
      return P === void 0 && (P = this.position), this.tokens[P + 0] && this.tokens[P + 0][l.FIELDS.TYPE] === y.slash && this.tokens[P + 1] && this.tokens[P + 1][l.FIELDS.TYPE] === y.word && this.tokens[P + 2] && this.tokens[P + 2][l.FIELDS.TYPE] === y.slash;
    }, I.namedCombinator = function() {
      if (this.isNamedCombinator()) {
        var P = this.content(this.tokens[this.position + 1]), T = (0, g.unesc)(P).toLowerCase(), B = {};
        T !== P && (B.value = "/" + P + "/");
        var E = new d.default({ value: "/" + T + "/", source: D(this.currToken[l.FIELDS.START_LINE], this.currToken[l.FIELDS.START_COL], this.tokens[this.position + 2][l.FIELDS.END_LINE], this.tokens[this.position + 2][l.FIELDS.END_COL]), sourceIndex: this.currToken[l.FIELDS.START_POS], raws: B });
        return this.position = this.position + 3, E;
      } else this.unexpected();
    }, I.combinator = function() {
      var P = this;
      if (this.content() === "|") return this.namespace();
      var T = this.locateNextMeaningfulToken(this.position);
      if (T < 0 || this.tokens[T][l.FIELDS.TYPE] === y.comma || this.tokens[T][l.FIELDS.TYPE] === y.closeParenthesis) {
        var B = this.parseWhitespaceEquivalentTokens(T);
        if (B.length > 0) {
          var E = this.current.last;
          if (E) {
            var L = this.convertWhitespaceNodesToSpace(B), K = L.space, G = L.rawSpace;
            G !== void 0 && (E.rawSpaceAfter += G), E.spaces.after += K;
          } else B.forEach(function(xe) {
            return P.newNode(xe);
          });
        }
        return;
      }
      var F = this.currToken, Q = void 0;
      T > this.position && (Q = this.parseWhitespaceEquivalentTokens(T));
      var te;
      if (this.isNamedCombinator() ? te = this.namedCombinator() : this.currToken[l.FIELDS.TYPE] === y.combinator ? (te = new d.default({ value: this.content(), source: ee(this.currToken), sourceIndex: this.currToken[l.FIELDS.START_POS] }), this.position++) : j[this.currToken[l.FIELDS.TYPE]] || Q || this.unexpected(), te) {
        if (Q) {
          var U = this.convertWhitespaceNodesToSpace(Q), Z = U.space, ve = U.rawSpace;
          te.spaces.before = Z, te.rawSpaceBefore = ve;
        }
      } else {
        var ye = this.convertWhitespaceNodesToSpace(Q, true), ce = ye.space, ne = ye.rawSpace;
        ne || (ne = ce);
        var pe = {}, he = { spaces: {} };
        ce.endsWith(" ") && ne.endsWith(" ") ? (pe.before = ce.slice(0, ce.length - 1), he.spaces.before = ne.slice(0, ne.length - 1)) : ce.startsWith(" ") && ne.startsWith(" ") ? (pe.after = ce.slice(1), he.spaces.after = ne.slice(1)) : he.value = ne, te = new d.default({ value: " ", source: z(F, this.tokens[this.position - 1]), sourceIndex: F[l.FIELDS.START_POS], spaces: pe, raws: he });
      }
      return this.currToken && this.currToken[l.FIELDS.TYPE] === y.space && (te.spaces.after = this.optionalSpace(this.content()), this.position++), this.newNode(te);
    }, I.comma = function() {
      if (this.position === this.tokens.length - 1) {
        this.root.trailingComma = true, this.position++;
        return;
      }
      this.current._inferEndPosition();
      var P = new n.default({ source: { start: M(this.tokens[this.position + 1]) }, sourceIndex: this.tokens[this.position + 1][l.FIELDS.START_POS] });
      this.current.parent.append(P), this.current = P, this.position++;
    }, I.comment = function() {
      var P = this.currToken;
      this.newNode(new s.default({ value: this.content(), source: ee(P), sourceIndex: P[l.FIELDS.START_POS] })), this.position++;
    }, I.error = function(P, T) {
      throw this.root.error(P, T);
    }, I.missingBackslash = function() {
      return this.error("Expected a backslash preceding the semicolon.", { index: this.currToken[l.FIELDS.START_POS] });
    }, I.missingParenthesis = function() {
      return this.expected("opening parenthesis", this.currToken[l.FIELDS.START_POS]);
    }, I.missingSquareBracket = function() {
      return this.expected("opening square bracket", this.currToken[l.FIELDS.START_POS]);
    }, I.unexpected = function() {
      return this.error("Unexpected '" + this.content() + "'. Escaping special characters with \\ may help.", this.currToken[l.FIELDS.START_POS]);
    }, I.unexpectedPipe = function() {
      return this.error("Unexpected '|'.", this.currToken[l.FIELDS.START_POS]);
    }, I.namespace = function() {
      var P = this.prevToken && this.content(this.prevToken) || true;
      if (this.nextToken[l.FIELDS.TYPE] === y.word) return this.position++, this.word(P);
      if (this.nextToken[l.FIELDS.TYPE] === y.asterisk) return this.position++, this.universal(P);
      this.unexpectedPipe();
    }, I.nesting = function() {
      if (this.nextToken) {
        var P = this.content(this.nextToken);
        if (P === "|") {
          this.position++;
          return;
        }
      }
      var T = this.currToken;
      this.newNode(new h.default({ value: this.content(), source: ee(T), sourceIndex: T[l.FIELDS.START_POS] })), this.position++;
    }, I.parentheses = function() {
      var P = this.current.last, T = 1;
      if (this.position++, P && P.type === m.PSEUDO) {
        var B = new n.default({ source: { start: M(this.tokens[this.position]) }, sourceIndex: this.tokens[this.position][l.FIELDS.START_POS] }), E = this.current;
        for (P.append(B), this.current = B; this.position < this.tokens.length && T; ) this.currToken[l.FIELDS.TYPE] === y.openParenthesis && T++, this.currToken[l.FIELDS.TYPE] === y.closeParenthesis && T--, T ? this.parse() : (this.current.source.end = q(this.currToken), this.current.parent.source.end = q(this.currToken), this.position++);
        this.current = E;
      } else {
        for (var L = this.currToken, K = "(", G; this.position < this.tokens.length && T; ) this.currToken[l.FIELDS.TYPE] === y.openParenthesis && T++, this.currToken[l.FIELDS.TYPE] === y.closeParenthesis && T--, G = this.currToken, K += this.parseParenthesisToken(this.currToken), this.position++;
        P ? P.appendToPropertyAndEscape("value", K, K) : this.newNode(new i.default({ value: K, source: D(L[l.FIELDS.START_LINE], L[l.FIELDS.START_COL], G[l.FIELDS.END_LINE], G[l.FIELDS.END_COL]), sourceIndex: L[l.FIELDS.START_POS] }));
      }
      if (T) return this.expected("closing parenthesis", this.currToken[l.FIELDS.START_POS]);
    }, I.pseudo = function() {
      for (var P = this, T = "", B = this.currToken; this.currToken && this.currToken[l.FIELDS.TYPE] === y.colon; ) T += this.content(), this.position++;
      if (!this.currToken) return this.expected(["pseudo-class", "pseudo-element"], this.position - 1);
      if (this.currToken[l.FIELDS.TYPE] === y.word) this.splitWord(false, function(E, L) {
        T += E, P.newNode(new p.default({ value: T, source: z(B, P.currToken), sourceIndex: B[l.FIELDS.START_POS] })), L > 1 && P.nextToken && P.nextToken[l.FIELDS.TYPE] === y.openParenthesis && P.error("Misplaced parenthesis.", { index: P.nextToken[l.FIELDS.START_POS] });
      });
      else return this.expected(["pseudo-class", "pseudo-element"], this.currToken[l.FIELDS.START_POS]);
    }, I.space = function() {
      var P = this.content();
      this.position === 0 || this.prevToken[l.FIELDS.TYPE] === y.comma || this.prevToken[l.FIELDS.TYPE] === y.openParenthesis || this.current.nodes.every(function(T) {
        return T.type === "comment";
      }) ? (this.spaces = this.optionalSpace(P), this.position++) : this.position === this.tokens.length - 1 || this.nextToken[l.FIELDS.TYPE] === y.comma || this.nextToken[l.FIELDS.TYPE] === y.closeParenthesis ? (this.current.last.spaces.after = this.optionalSpace(P), this.position++) : this.combinator();
    }, I.string = function() {
      var P = this.currToken;
      this.newNode(new i.default({ value: this.content(), source: ee(P), sourceIndex: P[l.FIELDS.START_POS] })), this.position++;
    }, I.universal = function(P) {
      var T = this.nextToken;
      if (T && this.content(T) === "|") return this.position++, this.namespace();
      var B = this.currToken;
      this.newNode(new a.default({ value: this.content(), source: ee(B), sourceIndex: B[l.FIELDS.START_POS] }), P), this.position++;
    }, I.splitWord = function(P, T) {
      for (var B = this, E = this.nextToken, L = this.content(); E && ~[y.dollar, y.caret, y.equals, y.word].indexOf(E[l.FIELDS.TYPE]); ) {
        this.position++;
        var K = this.content();
        if (L += K, K.lastIndexOf("\\") === K.length - 1) {
          var G = this.nextToken;
          G && G[l.FIELDS.TYPE] === y.space && (L += this.requiredSpace(this.content(G)), this.position++);
        }
        E = this.nextToken;
      }
      var F = ie(L, ".").filter(function(Z) {
        var ve = L[Z - 1] === "\\", ye = /^\d+\.\d+%$/.test(L);
        return !ve && !ye;
      }), Q = ie(L, "#").filter(function(Z) {
        return L[Z - 1] !== "\\";
      }), te = ie(L, "#{");
      te.length && (Q = Q.filter(function(Z) {
        return !~te.indexOf(Z);
      }));
      var U = (0, b.default)($t([0].concat(F, Q)));
      U.forEach(function(Z, ve) {
        var ye = U[ve + 1] || L.length, ce = L.slice(Z, ye);
        if (ve === 0 && T) return T.call(B, ce, U.length);
        var ne, pe = B.currToken, he = pe[l.FIELDS.START_POS] + U[ve], xe = D(pe[1], pe[2] + Z, pe[3], pe[2] + (ye - 1));
        if (~F.indexOf(Z)) {
          var Dt = { value: ce.slice(1), source: xe, sourceIndex: he };
          ne = new o.default(ae(Dt, "value"));
        } else if (~Q.indexOf(Z)) {
          var Mt = { value: ce.slice(1), source: xe, sourceIndex: he };
          ne = new u.default(ae(Mt, "value"));
        } else {
          var xt = { value: ce, source: xe, sourceIndex: he };
          ae(xt, "value"), ne = new c.default(xt);
        }
        B.newNode(ne, P), P = null;
      }), this.position++;
    }, I.word = function(P) {
      var T = this.nextToken;
      return T && this.content(T) === "|" ? (this.position++, this.namespace()) : this.splitWord(P);
    }, I.loop = function() {
      for (; this.position < this.tokens.length; ) this.parse(true);
      return this.current._inferEndPosition(), this.root;
    }, I.parse = function(P) {
      switch (this.currToken[l.FIELDS.TYPE]) {
        case y.space:
          this.space();
          break;
        case y.comment:
          this.comment();
          break;
        case y.openParenthesis:
          this.parentheses();
          break;
        case y.closeParenthesis:
          P && this.missingParenthesis();
          break;
        case y.openSquare:
          this.attribute();
          break;
        case y.dollar:
        case y.caret:
        case y.equals:
        case y.word:
          this.word();
          break;
        case y.colon:
          this.pseudo();
          break;
        case y.comma:
          this.comma();
          break;
        case y.asterisk:
          this.universal();
          break;
        case y.ampersand:
          this.nesting();
          break;
        case y.slash:
        case y.combinator:
          this.combinator();
          break;
        case y.str:
          this.string();
          break;
        case y.closeSquare:
          this.missingSquareBracket();
        case y.semicolon:
          this.missingBackslash();
        default:
          this.unexpected();
      }
    }, I.expected = function(P, T, B) {
      if (Array.isArray(P)) {
        var E = P.pop();
        P = P.join(", ") + " or " + E;
      }
      var L = /^[aeiou]/.test(P[0]) ? "an" : "a";
      return B ? this.error("Expected " + L + " " + P + ', found "' + B + '" instead.', { index: T }) : this.error("Expected " + L + " " + P + ".", { index: T });
    }, I.requiredSpace = function(P) {
      return this.options.lossy ? " " : P;
    }, I.optionalSpace = function(P) {
      return this.options.lossy ? "" : P;
    }, I.lossySpace = function(P, T) {
      return this.options.lossy ? T ? " " : "" : P;
    }, I.parseParenthesisToken = function(P) {
      var T = this.content(P);
      return P[l.FIELDS.TYPE] === y.space ? this.requiredSpace(T) : T;
    }, I.newNode = function(P, T) {
      return T && (/^ +$/.test(T) && (this.options.lossy || (this.spaces = (this.spaces || "") + T), T = true), P.namespace = T, ae(P, "namespace")), this.spaces && (P.spaces.before = this.spaces, this.spaces = ""), this.current.append(P);
    }, I.content = function(P) {
      return P === void 0 && (P = this.currToken), this.css.slice(P[l.FIELDS.START_POS], P[l.FIELDS.END_POS]);
    }, I.locateNextMeaningfulToken = function(P) {
      P === void 0 && (P = this.position + 1);
      for (var T = P; T < this.tokens.length; ) if (A[this.tokens[T][l.FIELDS.TYPE]]) {
        T++;
        continue;
      } else return T;
      return -1;
    }, S(C, [{ key: "currToken", get: function() {
      return this.tokens[this.position];
    } }, { key: "nextToken", get: function() {
      return this.tokens[this.position + 1];
    } }, { key: "prevToken", get: function() {
      return this.tokens[this.position - 1];
    } }]), C;
  }();
  e.default = de, t.exports = e.default;
}), lw = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = n(aw());
  function n(s) {
    return s && s.__esModule ? s : { default: s };
  }
  var o = function() {
    function s(c, i) {
      this.func = c || function() {
      }, this.funcRes = null, this.options = i;
    }
    var u = s.prototype;
    return u._shouldUpdateSelector = function(c, i) {
      i === void 0 && (i = {});
      var p = Object.assign({}, this.options, i);
      return p.updateSelector === false ? false : typeof c != "string";
    }, u._isLossy = function(c) {
      c === void 0 && (c = {});
      var i = Object.assign({}, this.options, c);
      return i.lossless === false;
    }, u._root = function(c, i) {
      i === void 0 && (i = {});
      var p = new r.default(c, this._parseOptions(i));
      return p.root;
    }, u._parseOptions = function(c) {
      return { lossy: this._isLossy(c) };
    }, u._run = function(c, i) {
      var p = this;
      return i === void 0 && (i = {}), new Promise(function(f, a) {
        try {
          var d = p._root(c, i);
          Promise.resolve(p.func(d)).then(function(h) {
            var b = void 0;
            return p._shouldUpdateSelector(c, i) && (b = d.toString(), c.selector = b), { transform: h, root: d, string: b };
          }).then(f, a);
        } catch (h) {
          a(h);
          return;
        }
      });
    }, u._runSync = function(c, i) {
      i === void 0 && (i = {});
      var p = this._root(c, i), f = this.func(p);
      if (f && typeof f.then == "function") throw new Error("Selector processor returned a promise to a synchronous call.");
      var a = void 0;
      return i.updateSelector && typeof c != "string" && (a = p.toString(), c.selector = a), { transform: f, root: p, string: a };
    }, u.ast = function(c, i) {
      return this._run(c, i).then(function(p) {
        return p.root;
      });
    }, u.astSync = function(c, i) {
      return this._runSync(c, i).root;
    }, u.transform = function(c, i) {
      return this._run(c, i).then(function(p) {
        return p.transform;
      });
    }, u.transformSync = function(c, i) {
      return this._runSync(c, i).transform;
    }, u.process = function(c, i) {
      return this._run(c, i).then(function(p) {
        return p.string || p.root.toString();
      });
    }, u.processSync = function(c, i) {
      var p = this._runSync(c, i);
      return p.string || p.root.toString();
    }, s;
  }();
  e.default = o, t.exports = e.default;
}), uw = H((e) => {
  e.__esModule = true, e.universal = e.tag = e.string = e.selector = e.root = e.pseudo = e.nesting = e.id = e.comment = e.combinator = e.className = e.attribute = void 0;
  var t = h(ku()), r = h($u()), n = h(Tu()), o = h(xu()), s = h(_u()), u = h(Au()), c = h(ju()), i = h(wu()), p = h(Ou()), f = h(Pu()), a = h(Su()), d = h(Eu());
  function h(j) {
    return j && j.__esModule ? j : { default: j };
  }
  var b = function(j) {
    return new t.default(j);
  };
  e.attribute = b;
  var l = function(j) {
    return new r.default(j);
  };
  e.className = l;
  var y = function(j) {
    return new n.default(j);
  };
  e.combinator = y;
  var m = function(j) {
    return new o.default(j);
  };
  e.comment = m;
  var g = function(j) {
    return new s.default(j);
  };
  e.id = g;
  var $ = function(j) {
    return new u.default(j);
  };
  e.nesting = $;
  var O = function(j) {
    return new c.default(j);
  };
  e.pseudo = O;
  var v = function(j) {
    return new i.default(j);
  };
  e.root = v;
  var w = function(j) {
    return new p.default(j);
  };
  e.selector = w;
  var _ = function(j) {
    return new f.default(j);
  };
  e.string = _;
  var x = function(j) {
    return new a.default(j);
  };
  e.tag = x;
  var S = function(j) {
    return new d.default(j);
  };
  e.universal = S;
}), cw = H((e) => {
  e.__esModule = true, e.isComment = e.isCombinator = e.isClassName = e.isAttribute = void 0, e.isContainer = O, e.isIdentifier = void 0, e.isNamespace = v, e.isNesting = void 0, e.isNode = o, e.isPseudo = void 0, e.isPseudoClass = $, e.isPseudoElement = g, e.isUniversal = e.isTag = e.isString = e.isSelector = e.isRoot = void 0;
  var t = se(), r, n = (r = {}, r[t.ATTRIBUTE] = true, r[t.CLASS] = true, r[t.COMBINATOR] = true, r[t.COMMENT] = true, r[t.ID] = true, r[t.NESTING] = true, r[t.PSEUDO] = true, r[t.ROOT] = true, r[t.SELECTOR] = true, r[t.STRING] = true, r[t.TAG] = true, r[t.UNIVERSAL] = true, r);
  function o(w) {
    return typeof w == "object" && n[w.type];
  }
  function s(w, _) {
    return o(_) && _.type === w;
  }
  var u = s.bind(null, t.ATTRIBUTE);
  e.isAttribute = u;
  var c = s.bind(null, t.CLASS);
  e.isClassName = c;
  var i = s.bind(null, t.COMBINATOR);
  e.isCombinator = i;
  var p = s.bind(null, t.COMMENT);
  e.isComment = p;
  var f = s.bind(null, t.ID);
  e.isIdentifier = f;
  var a = s.bind(null, t.NESTING);
  e.isNesting = a;
  var d = s.bind(null, t.PSEUDO);
  e.isPseudo = d;
  var h = s.bind(null, t.ROOT);
  e.isRoot = h;
  var b = s.bind(null, t.SELECTOR);
  e.isSelector = b;
  var l = s.bind(null, t.STRING);
  e.isString = l;
  var y = s.bind(null, t.TAG);
  e.isTag = y;
  var m = s.bind(null, t.UNIVERSAL);
  e.isUniversal = m;
  function g(w) {
    return d(w) && w.value && (w.value.startsWith("::") || w.value.toLowerCase() === ":before" || w.value.toLowerCase() === ":after" || w.value.toLowerCase() === ":first-letter" || w.value.toLowerCase() === ":first-line");
  }
  function $(w) {
    return d(w) && !g(w);
  }
  function O(w) {
    return !!(o(w) && w.walk);
  }
  function v(w) {
    return u(w) || y(w);
  }
}), fw = H((e) => {
  e.__esModule = true;
  var t = se();
  Object.keys(t).forEach(function(o) {
    o === "default" || o === "__esModule" || o in e && e[o] === t[o] || (e[o] = t[o]);
  });
  var r = uw();
  Object.keys(r).forEach(function(o) {
    o === "default" || o === "__esModule" || o in e && e[o] === r[o] || (e[o] = r[o]);
  });
  var n = cw();
  Object.keys(n).forEach(function(o) {
    o === "default" || o === "__esModule" || o in e && e[o] === n[o] || (e[o] = n[o]);
  });
}), pw = H((e, t) => {
  e.__esModule = true, e.default = void 0;
  var r = u(lw()), n = s(fw());
  function o(p) {
    if (typeof WeakMap != "function") return null;
    var f = /* @__PURE__ */ new WeakMap(), a = /* @__PURE__ */ new WeakMap();
    return (o = function(d) {
      return d ? a : f;
    })(p);
  }
  function s(p, f) {
    if (p && p.__esModule) return p;
    if (p === null || typeof p != "object" && typeof p != "function") return { default: p };
    var a = o(f);
    if (a && a.has(p)) return a.get(p);
    var d = {}, h = Object.defineProperty && Object.getOwnPropertyDescriptor;
    for (var b in p) if (b !== "default" && Object.prototype.hasOwnProperty.call(p, b)) {
      var l = h ? Object.getOwnPropertyDescriptor(p, b) : null;
      l && (l.get || l.set) ? Object.defineProperty(d, b, l) : d[b] = p[b];
    }
    return d.default = p, a && a.set(p, d), d;
  }
  function u(p) {
    return p && p.__esModule ? p : { default: p };
  }
  var c = function(p) {
    return new r.default(p);
  };
  Object.assign(c, n), delete c.__esModule;
  var i = c;
  e.default = i, t.exports = e.default;
}), Rr = tw(pw()), { ATTRIBUTE: hw, CLASS: dw, COMBINATOR: yw, COMMENT: gw, ID: mw, NESTING: bw, PSEUDO: vw, ROOT: ww, SELECTOR: Ow, STRING: $w, TAG: xw, UNIVERSAL: _w, attribute: Sw, className: Pw, combinator: jw, comment: kw, id: Ew, nesting: Tw, pseudo: Aw, root: Cw, selector: Iw, string: Rw, tag: Dw, universal: Mw, isAttribute: Lw, isClassName: Fw, isCombinator: Uw, isComment: Nw, isContainer: Bw, isIdentifier: qw, isNamespace: zw, isNesting: Ww, isNode: Gw, isPseudo: Yw, isPseudoClass: Hw, isPseudoElement: Vw, isRoot: Kw, isSelector: Qw, isString: Jw, isTag: Xw, isUniversal: Zw } = Rr, e2 = Rr.default ?? Rr;
const t2 = Object.freeze(Object.defineProperty({ __proto__: null, ATTRIBUTE: hw, CLASS: dw, COMBINATOR: yw, COMMENT: gw, ID: mw, NESTING: bw, PSEUDO: vw, ROOT: ww, SELECTOR: Ow, STRING: $w, TAG: xw, UNIVERSAL: _w, attribute: Sw, className: Pw, combinator: jw, comment: kw, default: e2, id: Ew, isAttribute: Lw, isClassName: Fw, isCombinator: Uw, isComment: Nw, isContainer: Bw, isIdentifier: qw, isNamespace: zw, isNesting: Ww, isNode: Gw, isPseudo: Yw, isPseudoClass: Hw, isPseudoElement: Vw, isRoot: Kw, isSelector: Qw, isString: Jw, isTag: Xw, isUniversal: Zw, nesting: Tw, pseudo: Aw, root: Cw, selector: Iw, string: Rw, tag: Dw, universal: Mw }, Symbol.toStringTag, { value: "Module" })), r2 = Object.freeze(Object.defineProperty({ __proto__: null, AtRule: tu, Comment: Zl, Container: Ql, CssSyntaxError: Vl, Declaration: Kl, Document: Xl, Input: ou, Node: iu, Processor: Jl, Result: ru, Root: su, Rule: nu, Warning: eu, atRule: Wl, comment: zl, decl: Yl, default: Ml, document: ql, fromJSON: Fl, list: Bl, parse: Nl, plugin: Ul, root: Hl, rule: Gl, stringify: Ll }, Symbol.toStringTag, { value: "Module" }));
var dt = (e) => {
  const t = (r) => typeof r.default < "u" ? r.default : r;
  switch (e) {
    case "postcss":
      return t(r2);
    case "postcss-selector-parser":
      return t(t2);
    default:
      return console.error('module "' + e + '" not found'), null;
  }
}, o2 = Object.create, Iu = Object.defineProperty, n2 = Object.getOwnPropertyDescriptor, s2 = Object.getOwnPropertyNames, i2 = Object.getPrototypeOf, a2 = Object.prototype.hasOwnProperty, mn = ((e) => typeof dt < "u" ? dt : typeof Proxy < "u" ? new Proxy(e, { get: (t, r) => (typeof dt < "u" ? dt : t)[r] }) : e)(function(e) {
  if (typeof dt < "u") return dt.apply(this, arguments);
  throw Error('Dynamic require of "' + e + '" is not supported');
}), l2 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), u2 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of s2(t)) !a2.call(e, o) && o !== r && Iu(e, o, { get: () => t[o], enumerable: !(n = n2(t, o)) || n.enumerable });
  return e;
}, c2 = (e, t, r) => (r = e != null ? o2(i2(e)) : {}, u2(!e || !e.__esModule ? Iu(r, "default", { value: e, enumerable: true }) : r, e)), f2 = l2((e, t) => {
  var { AtRule: r, Rule: n } = mn("postcss"), o = mn("postcss-selector-parser");
  function s($, O) {
    let v;
    try {
      o((w) => {
        v = w;
      }).processSync($);
    } catch (w) {
      throw $.includes(":") ? O ? O.error("Missed semicolon") : w : O ? O.error(w.message) : w;
    }
    return v.at(0);
  }
  function u($, O) {
    let v = false;
    return $.each((w) => {
      if (w.type === "nesting") {
        let _ = O.clone({});
        w.value !== "&" ? w.replaceWith(s(w.value.replace("&", _.toString()))) : w.replaceWith(_), v = true;
      } else "nodes" in w && w.nodes && u(w, O) && (v = true);
    }), v;
  }
  function c($, O) {
    let v = [];
    return $.selectors.forEach((w) => {
      let _ = s(w, $);
      O.selectors.forEach((x) => {
        if (!x) return;
        let S = s(x, O);
        u(S, _) || (S.prepend(o.combinator({ value: " " })), S.prepend(_.clone({}))), v.push(S.toString());
      });
    }), v;
  }
  function i($, O) {
    let v = $.prev();
    for (O.after($); v && v.type === "comment"; ) {
      let w = v.prev();
      O.after(v), v = w;
    }
    return $;
  }
  function p($) {
    return function O(v, w, _, x = _) {
      let S = [];
      if (w.each((j) => {
        j.type === "rule" && _ ? x && (j.selectors = c(v, j)) : j.type === "atrule" && j.nodes ? $[j.name] ? O(v, j, x) : w[l] !== false && S.push(j) : S.push(j);
      }), _ && S.length) {
        let j = v.clone({ nodes: [] });
        for (let A of S) j.append(A);
        w.prepend(j);
      }
    };
  }
  function f($, O, v) {
    let w = new n({ nodes: [], selector: $ });
    return w.append(O), v.after(w), w;
  }
  function a($, O) {
    let v = {};
    for (let w of $) v[w] = true;
    if (O) for (let w of O) v[w.replace(/^@/, "")] = true;
    return v;
  }
  function d($) {
    $ = $.trim();
    let O = $.match(/^\((.*)\)$/);
    if (!O) return { selector: $, type: "basic" };
    let v = O[1].match(/^(with(?:out)?):(.+)$/);
    if (v) {
      let w = v[1] === "with", _ = Object.fromEntries(v[2].trim().split(/\s+/).map((S) => [S, true]));
      if (w && _.all) return { type: "noop" };
      let x = (S) => !!_[S];
      return _.all ? x = () => true : w && (x = (S) => S === "all" ? false : !_[S]), { escapes: x, type: "withrules" };
    }
    return { type: "unknown" };
  }
  function h($) {
    let O = [], v = $.parent;
    for (; v && v instanceof r; ) O.push(v), v = v.parent;
    return O;
  }
  function b($) {
    let O = $[y];
    if (!O) $.after($.nodes);
    else {
      let v = $.nodes, w, _ = -1, x, S, j, A = h($);
      if (A.forEach((M, q) => {
        if (O(M.name)) w = M, _ = q, S = j;
        else {
          let D = j;
          j = M.clone({ nodes: [] }), D && j.append(D), x = x || j;
        }
      }), w ? S ? (x.append(v), w.after(S)) : w.after(v) : $.after(v), $.next() && w) {
        let M;
        A.slice(0, _ + 1).forEach((q, D, ee) => {
          let z = M;
          M = q.clone({ nodes: [] }), z && M.append(z);
          let ae = [], ie = (ee[D - 1] || $).next();
          for (; ie; ) ae.push(ie), ie = ie.next();
          M.append(ae);
        }), M && (S || v[v.length - 1]).after(M);
      }
    }
    $.remove();
  }
  var l = Symbol("rootRuleMergeSel"), y = Symbol("rootRuleEscapes");
  function m($) {
    let { params: O } = $, { escapes: v, selector: w, type: _ } = d(O);
    if (_ === "unknown") throw $.error(`Unknown @${$.name} parameter ${JSON.stringify(O)}`);
    if (_ === "basic" && w) {
      let x = new n({ nodes: $.nodes, selector: w });
      $.removeAll(), $.append(x);
    }
    $[y] = v, $[l] = v ? !v("all") : _ === "noop";
  }
  var g = Symbol("hasRootRule");
  t.exports = ($ = {}) => {
    let O = a(["media", "supports", "layer", "container", "starting-style"], $.bubble), v = p(O), w = a(["document", "font-face", "keyframes", "-webkit-keyframes", "-moz-keyframes"], $.unwrap), _ = ($.rootRuleName || "at-root").replace(/^@/, ""), x = $.preserveEmpty;
    return { Once(S) {
      S.walkAtRules(_, (j) => {
        m(j), S[g] = true;
      });
    }, postcssPlugin: "postcss-nested", RootExit(S) {
      S[g] && (S.walkAtRules(_, b), S[g] = false);
    }, Rule(S) {
      let j = false, A = S, M = false, q = [];
      S.each((D) => {
        D.type === "rule" ? (q.length && (A = f(S.selector, q, A), q = []), M = true, j = true, D.selectors = c(S, D), A = i(D, A)) : D.type === "atrule" ? (q.length && (A = f(S.selector, q, A), q = []), D.name === _ ? (j = true, v(S, D, true, D[l]), A = i(D, A)) : O[D.name] ? (M = true, j = true, v(S, D, true), A = i(D, A)) : w[D.name] ? (M = true, j = true, v(S, D, false), A = i(D, A)) : M && q.push(D)) : D.type === "decl" && M && q.push(D);
      }), q.length && (A = f(S.selector, q, A)), j && x !== true && (S.raws.semicolon = true, S.nodes.length === 0 && S.remove());
    } };
  }, t.exports.postcss = true;
}), Dr = c2(f2()), { postcss: hO } = Dr, dO = Dr.default ?? Dr, p2 = Object.create, Ru = Object.defineProperty, h2 = Object.getOwnPropertyDescriptor, d2 = Object.getOwnPropertyNames, y2 = Object.getPrototypeOf, g2 = Object.prototype.hasOwnProperty, m2 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), b2 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of d2(t)) !g2.call(e, o) && o !== r && Ru(e, o, { get: () => t[o], enumerable: !(n = h2(t, o)) || n.enumerable });
  return e;
}, v2 = (e, t, r) => (r = e != null ? p2(y2(e)) : {}, b2(!e || !e.__esModule ? Ru(r, "default", { value: e, enumerable: true }) : r, e)), w2 = m2((e, t) => {
  e.__esModule = true, e.default = o;
  function r(s) {
    for (var u = s.toLowerCase(), c = "", i = false, p = 0; p < 6 && u[p] !== void 0; p++) {
      var f = u.charCodeAt(p), a = f >= 97 && f <= 102 || f >= 48 && f <= 57;
      if (i = f === 32, !a) break;
      c += u[p];
    }
    if (c.length !== 0) {
      var d = parseInt(c, 16), h = d >= 55296 && d <= 57343;
      return h || d === 0 || d > 1114111 ? ["\uFFFD", c.length + (i ? 1 : 0)] : [String.fromCodePoint(d), c.length + (i ? 1 : 0)];
    }
  }
  var n = /\\/;
  function o(s) {
    var u = n.test(s);
    if (!u) return s;
    for (var c = "", i = 0; i < s.length; i++) {
      if (s[i] === "\\") {
        var p = r(s.slice(i + 1, i + 7));
        if (p !== void 0) {
          c += p[0], i += p[1];
          continue;
        }
        if (s[i + 1] === "\\") {
          c += "\\", i++;
          continue;
        }
        s.length === i + 1 && (c += s[i]);
        continue;
      }
      c += s[i];
    }
    return c;
  }
  t.exports = e.default;
}), bn = v2(w2()), yO = bn.default ?? bn, O2 = Object.create, Du = Object.defineProperty, $2 = Object.getOwnPropertyDescriptor, x2 = Object.getOwnPropertyNames, _2 = Object.getPrototypeOf, S2 = Object.prototype.hasOwnProperty, P2 = (e, t) => () => (t || e((t = { exports: {} }).exports, t), t.exports), j2 = (e, t, r, n) => {
  if (t && typeof t == "object" || typeof t == "function") for (let o of x2(t)) !S2.call(e, o) && o !== r && Du(e, o, { get: () => t[o], enumerable: !(n = $2(t, o)) || n.enumerable });
  return e;
}, k2 = (e, t, r) => (r = e != null ? O2(_2(e)) : {}, j2(!e || !e.__esModule ? Du(r, "default", { value: e, enumerable: true }) : r, e)), E2 = P2((e, t) => {
  t.exports = { content: [], presets: [], darkMode: "media", theme: { accentColor: ({ theme: r }) => ({ ...r("colors"), auto: "auto" }), animation: { none: "none", spin: "spin 1s linear infinite", ping: "ping 1s cubic-bezier(0, 0, 0.2, 1) infinite", pulse: "pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite", bounce: "bounce 1s infinite" }, aria: { busy: 'busy="true"', checked: 'checked="true"', disabled: 'disabled="true"', expanded: 'expanded="true"', hidden: 'hidden="true"', pressed: 'pressed="true"', readonly: 'readonly="true"', required: 'required="true"', selected: 'selected="true"' }, aspectRatio: { auto: "auto", square: "1 / 1", video: "16 / 9" }, backdropBlur: ({ theme: r }) => r("blur"), backdropBrightness: ({ theme: r }) => r("brightness"), backdropContrast: ({ theme: r }) => r("contrast"), backdropGrayscale: ({ theme: r }) => r("grayscale"), backdropHueRotate: ({ theme: r }) => r("hueRotate"), backdropInvert: ({ theme: r }) => r("invert"), backdropOpacity: ({ theme: r }) => r("opacity"), backdropSaturate: ({ theme: r }) => r("saturate"), backdropSepia: ({ theme: r }) => r("sepia"), backgroundColor: ({ theme: r }) => r("colors"), backgroundImage: { none: "none", "gradient-to-t": "linear-gradient(to top, var(--tw-gradient-stops))", "gradient-to-tr": "linear-gradient(to top right, var(--tw-gradient-stops))", "gradient-to-r": "linear-gradient(to right, var(--tw-gradient-stops))", "gradient-to-br": "linear-gradient(to bottom right, var(--tw-gradient-stops))", "gradient-to-b": "linear-gradient(to bottom, var(--tw-gradient-stops))", "gradient-to-bl": "linear-gradient(to bottom left, var(--tw-gradient-stops))", "gradient-to-l": "linear-gradient(to left, var(--tw-gradient-stops))", "gradient-to-tl": "linear-gradient(to top left, var(--tw-gradient-stops))" }, backgroundOpacity: ({ theme: r }) => r("opacity"), backgroundPosition: { bottom: "bottom", center: "center", left: "left", "left-bottom": "left bottom", "left-top": "left top", right: "right", "right-bottom": "right bottom", "right-top": "right top", top: "top" }, backgroundSize: { auto: "auto", cover: "cover", contain: "contain" }, blur: { 0: "0", none: "", sm: "4px", DEFAULT: "8px", md: "12px", lg: "16px", xl: "24px", "2xl": "40px", "3xl": "64px" }, borderColor: ({ theme: r }) => ({ ...r("colors"), DEFAULT: r("colors.gray.200", "currentColor") }), borderOpacity: ({ theme: r }) => r("opacity"), borderRadius: { none: "0px", sm: "0.125rem", DEFAULT: "0.25rem", md: "0.375rem", lg: "0.5rem", xl: "0.75rem", "2xl": "1rem", "3xl": "1.5rem", full: "9999px" }, borderSpacing: ({ theme: r }) => ({ ...r("spacing") }), borderWidth: { DEFAULT: "1px", 0: "0px", 2: "2px", 4: "4px", 8: "8px" }, boxShadow: { sm: "0 1px 2px 0 rgb(0 0 0 / 0.05)", DEFAULT: "0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)", md: "0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)", lg: "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)", xl: "0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)", "2xl": "0 25px 50px -12px rgb(0 0 0 / 0.25)", inner: "inset 0 2px 4px 0 rgb(0 0 0 / 0.05)", none: "none" }, boxShadowColor: ({ theme: r }) => r("colors"), brightness: { 0: "0", 50: ".5", 75: ".75", 90: ".9", 95: ".95", 100: "1", 105: "1.05", 110: "1.1", 125: "1.25", 150: "1.5", 200: "2" }, caretColor: ({ theme: r }) => r("colors"), colors: ({ colors: r }) => ({ inherit: r.inherit, current: r.current, transparent: r.transparent, black: r.black, white: r.white, slate: r.slate, gray: r.gray, zinc: r.zinc, neutral: r.neutral, stone: r.stone, red: r.red, orange: r.orange, amber: r.amber, yellow: r.yellow, lime: r.lime, green: r.green, emerald: r.emerald, teal: r.teal, cyan: r.cyan, sky: r.sky, blue: r.blue, indigo: r.indigo, violet: r.violet, purple: r.purple, fuchsia: r.fuchsia, pink: r.pink, rose: r.rose }), columns: { auto: "auto", 1: "1", 2: "2", 3: "3", 4: "4", 5: "5", 6: "6", 7: "7", 8: "8", 9: "9", 10: "10", 11: "11", 12: "12", "3xs": "16rem", "2xs": "18rem", xs: "20rem", sm: "24rem", md: "28rem", lg: "32rem", xl: "36rem", "2xl": "42rem", "3xl": "48rem", "4xl": "56rem", "5xl": "64rem", "6xl": "72rem", "7xl": "80rem" }, container: {}, content: { none: "none" }, contrast: { 0: "0", 50: ".5", 75: ".75", 100: "1", 125: "1.25", 150: "1.5", 200: "2" }, cursor: { auto: "auto", default: "default", pointer: "pointer", wait: "wait", text: "text", move: "move", help: "help", "not-allowed": "not-allowed", none: "none", "context-menu": "context-menu", progress: "progress", cell: "cell", crosshair: "crosshair", "vertical-text": "vertical-text", alias: "alias", copy: "copy", "no-drop": "no-drop", grab: "grab", grabbing: "grabbing", "all-scroll": "all-scroll", "col-resize": "col-resize", "row-resize": "row-resize", "n-resize": "n-resize", "e-resize": "e-resize", "s-resize": "s-resize", "w-resize": "w-resize", "ne-resize": "ne-resize", "nw-resize": "nw-resize", "se-resize": "se-resize", "sw-resize": "sw-resize", "ew-resize": "ew-resize", "ns-resize": "ns-resize", "nesw-resize": "nesw-resize", "nwse-resize": "nwse-resize", "zoom-in": "zoom-in", "zoom-out": "zoom-out" }, divideColor: ({ theme: r }) => r("borderColor"), divideOpacity: ({ theme: r }) => r("borderOpacity"), divideWidth: ({ theme: r }) => r("borderWidth"), dropShadow: { sm: "0 1px 1px rgb(0 0 0 / 0.05)", DEFAULT: ["0 1px 2px rgb(0 0 0 / 0.1)", "0 1px 1px rgb(0 0 0 / 0.06)"], md: ["0 4px 3px rgb(0 0 0 / 0.07)", "0 2px 2px rgb(0 0 0 / 0.06)"], lg: ["0 10px 8px rgb(0 0 0 / 0.04)", "0 4px 3px rgb(0 0 0 / 0.1)"], xl: ["0 20px 13px rgb(0 0 0 / 0.03)", "0 8px 5px rgb(0 0 0 / 0.08)"], "2xl": "0 25px 25px rgb(0 0 0 / 0.15)", none: "0 0 #0000" }, fill: ({ theme: r }) => ({ none: "none", ...r("colors") }), flex: { 1: "1 1 0%", auto: "1 1 auto", initial: "0 1 auto", none: "none" }, flexBasis: ({ theme: r }) => ({ auto: "auto", ...r("spacing"), "1/2": "50%", "1/3": "33.333333%", "2/3": "66.666667%", "1/4": "25%", "2/4": "50%", "3/4": "75%", "1/5": "20%", "2/5": "40%", "3/5": "60%", "4/5": "80%", "1/6": "16.666667%", "2/6": "33.333333%", "3/6": "50%", "4/6": "66.666667%", "5/6": "83.333333%", "1/12": "8.333333%", "2/12": "16.666667%", "3/12": "25%", "4/12": "33.333333%", "5/12": "41.666667%", "6/12": "50%", "7/12": "58.333333%", "8/12": "66.666667%", "9/12": "75%", "10/12": "83.333333%", "11/12": "91.666667%", full: "100%" }), flexGrow: { 0: "0", DEFAULT: "1" }, flexShrink: { 0: "0", DEFAULT: "1" }, fontFamily: { sans: ["ui-sans-serif", "system-ui", "sans-serif", '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"'], serif: ["ui-serif", "Georgia", "Cambria", '"Times New Roman"', "Times", "serif"], mono: ["ui-monospace", "SFMono-Regular", "Menlo", "Monaco", "Consolas", '"Liberation Mono"', '"Courier New"', "monospace"] }, fontSize: { xs: ["0.75rem", { lineHeight: "1rem" }], sm: ["0.875rem", { lineHeight: "1.25rem" }], base: ["1rem", { lineHeight: "1.5rem" }], lg: ["1.125rem", { lineHeight: "1.75rem" }], xl: ["1.25rem", { lineHeight: "1.75rem" }], "2xl": ["1.5rem", { lineHeight: "2rem" }], "3xl": ["1.875rem", { lineHeight: "2.25rem" }], "4xl": ["2.25rem", { lineHeight: "2.5rem" }], "5xl": ["3rem", { lineHeight: "1" }], "6xl": ["3.75rem", { lineHeight: "1" }], "7xl": ["4.5rem", { lineHeight: "1" }], "8xl": ["6rem", { lineHeight: "1" }], "9xl": ["8rem", { lineHeight: "1" }] }, fontWeight: { thin: "100", extralight: "200", light: "300", normal: "400", medium: "500", semibold: "600", bold: "700", extrabold: "800", black: "900" }, gap: ({ theme: r }) => r("spacing"), gradientColorStops: ({ theme: r }) => r("colors"), gradientColorStopPositions: { "0%": "0%", "5%": "5%", "10%": "10%", "15%": "15%", "20%": "20%", "25%": "25%", "30%": "30%", "35%": "35%", "40%": "40%", "45%": "45%", "50%": "50%", "55%": "55%", "60%": "60%", "65%": "65%", "70%": "70%", "75%": "75%", "80%": "80%", "85%": "85%", "90%": "90%", "95%": "95%", "100%": "100%" }, grayscale: { 0: "0", DEFAULT: "100%" }, gridAutoColumns: { auto: "auto", min: "min-content", max: "max-content", fr: "minmax(0, 1fr)" }, gridAutoRows: { auto: "auto", min: "min-content", max: "max-content", fr: "minmax(0, 1fr)" }, gridColumn: { auto: "auto", "span-1": "span 1 / span 1", "span-2": "span 2 / span 2", "span-3": "span 3 / span 3", "span-4": "span 4 / span 4", "span-5": "span 5 / span 5", "span-6": "span 6 / span 6", "span-7": "span 7 / span 7", "span-8": "span 8 / span 8", "span-9": "span 9 / span 9", "span-10": "span 10 / span 10", "span-11": "span 11 / span 11", "span-12": "span 12 / span 12", "span-full": "1 / -1" }, gridColumnEnd: { auto: "auto", 1: "1", 2: "2", 3: "3", 4: "4", 5: "5", 6: "6", 7: "7", 8: "8", 9: "9", 10: "10", 11: "11", 12: "12", 13: "13" }, gridColumnStart: { auto: "auto", 1: "1", 2: "2", 3: "3", 4: "4", 5: "5", 6: "6", 7: "7", 8: "8", 9: "9", 10: "10", 11: "11", 12: "12", 13: "13" }, gridRow: { auto: "auto", "span-1": "span 1 / span 1", "span-2": "span 2 / span 2", "span-3": "span 3 / span 3", "span-4": "span 4 / span 4", "span-5": "span 5 / span 5", "span-6": "span 6 / span 6", "span-7": "span 7 / span 7", "span-8": "span 8 / span 8", "span-9": "span 9 / span 9", "span-10": "span 10 / span 10", "span-11": "span 11 / span 11", "span-12": "span 12 / span 12", "span-full": "1 / -1" }, gridRowEnd: { auto: "auto", 1: "1", 2: "2", 3: "3", 4: "4", 5: "5", 6: "6", 7: "7", 8: "8", 9: "9", 10: "10", 11: "11", 12: "12", 13: "13" }, gridRowStart: { auto: "auto", 1: "1", 2: "2", 3: "3", 4: "4", 5: "5", 6: "6", 7: "7", 8: "8", 9: "9", 10: "10", 11: "11", 12: "12", 13: "13" }, gridTemplateColumns: { none: "none", subgrid: "subgrid", 1: "repeat(1, minmax(0, 1fr))", 2: "repeat(2, minmax(0, 1fr))", 3: "repeat(3, minmax(0, 1fr))", 4: "repeat(4, minmax(0, 1fr))", 5: "repeat(5, minmax(0, 1fr))", 6: "repeat(6, minmax(0, 1fr))", 7: "repeat(7, minmax(0, 1fr))", 8: "repeat(8, minmax(0, 1fr))", 9: "repeat(9, minmax(0, 1fr))", 10: "repeat(10, minmax(0, 1fr))", 11: "repeat(11, minmax(0, 1fr))", 12: "repeat(12, minmax(0, 1fr))" }, gridTemplateRows: { none: "none", subgrid: "subgrid", 1: "repeat(1, minmax(0, 1fr))", 2: "repeat(2, minmax(0, 1fr))", 3: "repeat(3, minmax(0, 1fr))", 4: "repeat(4, minmax(0, 1fr))", 5: "repeat(5, minmax(0, 1fr))", 6: "repeat(6, minmax(0, 1fr))", 7: "repeat(7, minmax(0, 1fr))", 8: "repeat(8, minmax(0, 1fr))", 9: "repeat(9, minmax(0, 1fr))", 10: "repeat(10, minmax(0, 1fr))", 11: "repeat(11, minmax(0, 1fr))", 12: "repeat(12, minmax(0, 1fr))" }, height: ({ theme: r }) => ({ auto: "auto", ...r("spacing"), "1/2": "50%", "1/3": "33.333333%", "2/3": "66.666667%", "1/4": "25%", "2/4": "50%", "3/4": "75%", "1/5": "20%", "2/5": "40%", "3/5": "60%", "4/5": "80%", "1/6": "16.666667%", "2/6": "33.333333%", "3/6": "50%", "4/6": "66.666667%", "5/6": "83.333333%", full: "100%", screen: "100vh", svh: "100svh", lvh: "100lvh", dvh: "100dvh", min: "min-content", max: "max-content", fit: "fit-content" }), hueRotate: { 0: "0deg", 15: "15deg", 30: "30deg", 60: "60deg", 90: "90deg", 180: "180deg" }, inset: ({ theme: r }) => ({ auto: "auto", ...r("spacing"), "1/2": "50%", "1/3": "33.333333%", "2/3": "66.666667%", "1/4": "25%", "2/4": "50%", "3/4": "75%", full: "100%" }), invert: { 0: "0", DEFAULT: "100%" }, keyframes: { spin: { to: { transform: "rotate(360deg)" } }, ping: { "75%, 100%": { transform: "scale(2)", opacity: "0" } }, pulse: { "50%": { opacity: ".5" } }, bounce: { "0%, 100%": { transform: "translateY(-25%)", animationTimingFunction: "cubic-bezier(0.8,0,1,1)" }, "50%": { transform: "none", animationTimingFunction: "cubic-bezier(0,0,0.2,1)" } } }, letterSpacing: { tighter: "-0.05em", tight: "-0.025em", normal: "0em", wide: "0.025em", wider: "0.05em", widest: "0.1em" }, lineHeight: { none: "1", tight: "1.25", snug: "1.375", normal: "1.5", relaxed: "1.625", loose: "2", 3: ".75rem", 4: "1rem", 5: "1.25rem", 6: "1.5rem", 7: "1.75rem", 8: "2rem", 9: "2.25rem", 10: "2.5rem" }, listStyleType: { none: "none", disc: "disc", decimal: "decimal" }, listStyleImage: { none: "none" }, margin: ({ theme: r }) => ({ auto: "auto", ...r("spacing") }), lineClamp: { 1: "1", 2: "2", 3: "3", 4: "4", 5: "5", 6: "6" }, maxHeight: ({ theme: r }) => ({ ...r("spacing"), none: "none", full: "100%", screen: "100vh", svh: "100svh", lvh: "100lvh", dvh: "100dvh", min: "min-content", max: "max-content", fit: "fit-content" }), maxWidth: ({ theme: r, breakpoints: n }) => ({ ...r("spacing"), none: "none", xs: "20rem", sm: "24rem", md: "28rem", lg: "32rem", xl: "36rem", "2xl": "42rem", "3xl": "48rem", "4xl": "56rem", "5xl": "64rem", "6xl": "72rem", "7xl": "80rem", full: "100%", min: "min-content", max: "max-content", fit: "fit-content", prose: "65ch", ...n(r("screens")) }), minHeight: ({ theme: r }) => ({ ...r("spacing"), full: "100%", screen: "100vh", svh: "100svh", lvh: "100lvh", dvh: "100dvh", min: "min-content", max: "max-content", fit: "fit-content" }), minWidth: ({ theme: r }) => ({ ...r("spacing"), full: "100%", min: "min-content", max: "max-content", fit: "fit-content" }), objectPosition: { bottom: "bottom", center: "center", left: "left", "left-bottom": "left bottom", "left-top": "left top", right: "right", "right-bottom": "right bottom", "right-top": "right top", top: "top" }, opacity: { 0: "0", 5: "0.05", 10: "0.1", 15: "0.15", 20: "0.2", 25: "0.25", 30: "0.3", 35: "0.35", 40: "0.4", 45: "0.45", 50: "0.5", 55: "0.55", 60: "0.6", 65: "0.65", 70: "0.7", 75: "0.75", 80: "0.8", 85: "0.85", 90: "0.9", 95: "0.95", 100: "1" }, order: { first: "-9999", last: "9999", none: "0", 1: "1", 2: "2", 3: "3", 4: "4", 5: "5", 6: "6", 7: "7", 8: "8", 9: "9", 10: "10", 11: "11", 12: "12" }, outlineColor: ({ theme: r }) => r("colors"), outlineOffset: { 0: "0px", 1: "1px", 2: "2px", 4: "4px", 8: "8px" }, outlineWidth: { 0: "0px", 1: "1px", 2: "2px", 4: "4px", 8: "8px" }, padding: ({ theme: r }) => r("spacing"), placeholderColor: ({ theme: r }) => r("colors"), placeholderOpacity: ({ theme: r }) => r("opacity"), ringColor: ({ theme: r }) => ({ DEFAULT: r("colors.blue.500", "#3b82f6"), ...r("colors") }), ringOffsetColor: ({ theme: r }) => r("colors"), ringOffsetWidth: { 0: "0px", 1: "1px", 2: "2px", 4: "4px", 8: "8px" }, ringOpacity: ({ theme: r }) => ({ DEFAULT: "0.5", ...r("opacity") }), ringWidth: { DEFAULT: "3px", 0: "0px", 1: "1px", 2: "2px", 4: "4px", 8: "8px" }, rotate: { 0: "0deg", 1: "1deg", 2: "2deg", 3: "3deg", 6: "6deg", 12: "12deg", 45: "45deg", 90: "90deg", 180: "180deg" }, saturate: { 0: "0", 50: ".5", 100: "1", 150: "1.5", 200: "2" }, scale: { 0: "0", 50: ".5", 75: ".75", 90: ".9", 95: ".95", 100: "1", 105: "1.05", 110: "1.1", 125: "1.25", 150: "1.5" }, screens: { sm: "640px", md: "768px", lg: "1024px", xl: "1280px", "2xl": "1536px" }, scrollMargin: ({ theme: r }) => ({ ...r("spacing") }), scrollPadding: ({ theme: r }) => r("spacing"), sepia: { 0: "0", DEFAULT: "100%" }, skew: { 0: "0deg", 1: "1deg", 2: "2deg", 3: "3deg", 6: "6deg", 12: "12deg" }, space: ({ theme: r }) => ({ ...r("spacing") }), spacing: { px: "1px", 0: "0px", 0.5: "0.125rem", 1: "0.25rem", 1.5: "0.375rem", 2: "0.5rem", 2.5: "0.625rem", 3: "0.75rem", 3.5: "0.875rem", 4: "1rem", 5: "1.25rem", 6: "1.5rem", 7: "1.75rem", 8: "2rem", 9: "2.25rem", 10: "2.5rem", 11: "2.75rem", 12: "3rem", 14: "3.5rem", 16: "4rem", 20: "5rem", 24: "6rem", 28: "7rem", 32: "8rem", 36: "9rem", 40: "10rem", 44: "11rem", 48: "12rem", 52: "13rem", 56: "14rem", 60: "15rem", 64: "16rem", 72: "18rem", 80: "20rem", 96: "24rem" }, stroke: ({ theme: r }) => ({ none: "none", ...r("colors") }), strokeWidth: { 0: "0", 1: "1", 2: "2" }, supports: {}, data: {}, textColor: ({ theme: r }) => r("colors"), textDecorationColor: ({ theme: r }) => r("colors"), textDecorationThickness: { auto: "auto", "from-font": "from-font", 0: "0px", 1: "1px", 2: "2px", 4: "4px", 8: "8px" }, textIndent: ({ theme: r }) => ({ ...r("spacing") }), textOpacity: ({ theme: r }) => r("opacity"), textUnderlineOffset: { auto: "auto", 0: "0px", 1: "1px", 2: "2px", 4: "4px", 8: "8px" }, transformOrigin: { center: "center", top: "top", "top-right": "top right", right: "right", "bottom-right": "bottom right", bottom: "bottom", "bottom-left": "bottom left", left: "left", "top-left": "top left" }, transitionDelay: { 0: "0s", 75: "75ms", 100: "100ms", 150: "150ms", 200: "200ms", 300: "300ms", 500: "500ms", 700: "700ms", 1e3: "1000ms" }, transitionDuration: { DEFAULT: "150ms", 0: "0s", 75: "75ms", 100: "100ms", 150: "150ms", 200: "200ms", 300: "300ms", 500: "500ms", 700: "700ms", 1e3: "1000ms" }, transitionProperty: { none: "none", all: "all", DEFAULT: "color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter", colors: "color, background-color, border-color, text-decoration-color, fill, stroke", opacity: "opacity", shadow: "box-shadow", transform: "transform" }, transitionTimingFunction: { DEFAULT: "cubic-bezier(0.4, 0, 0.2, 1)", linear: "linear", in: "cubic-bezier(0.4, 0, 1, 1)", out: "cubic-bezier(0, 0, 0.2, 1)", "in-out": "cubic-bezier(0.4, 0, 0.2, 1)" }, translate: ({ theme: r }) => ({ ...r("spacing"), "1/2": "50%", "1/3": "33.333333%", "2/3": "66.666667%", "1/4": "25%", "2/4": "50%", "3/4": "75%", full: "100%" }), size: ({ theme: r }) => ({ auto: "auto", ...r("spacing"), "1/2": "50%", "1/3": "33.333333%", "2/3": "66.666667%", "1/4": "25%", "2/4": "50%", "3/4": "75%", "1/5": "20%", "2/5": "40%", "3/5": "60%", "4/5": "80%", "1/6": "16.666667%", "2/6": "33.333333%", "3/6": "50%", "4/6": "66.666667%", "5/6": "83.333333%", "1/12": "8.333333%", "2/12": "16.666667%", "3/12": "25%", "4/12": "33.333333%", "5/12": "41.666667%", "6/12": "50%", "7/12": "58.333333%", "8/12": "66.666667%", "9/12": "75%", "10/12": "83.333333%", "11/12": "91.666667%", full: "100%", min: "min-content", max: "max-content", fit: "fit-content" }), width: ({ theme: r }) => ({ auto: "auto", ...r("spacing"), "1/2": "50%", "1/3": "33.333333%", "2/3": "66.666667%", "1/4": "25%", "2/4": "50%", "3/4": "75%", "1/5": "20%", "2/5": "40%", "3/5": "60%", "4/5": "80%", "1/6": "16.666667%", "2/6": "33.333333%", "3/6": "50%", "4/6": "66.666667%", "5/6": "83.333333%", "1/12": "8.333333%", "2/12": "16.666667%", "3/12": "25%", "4/12": "33.333333%", "5/12": "41.666667%", "6/12": "50%", "7/12": "58.333333%", "8/12": "66.666667%", "9/12": "75%", "10/12": "83.333333%", "11/12": "91.666667%", full: "100%", screen: "100vw", svw: "100svw", lvw: "100lvw", dvw: "100dvw", min: "min-content", max: "max-content", fit: "fit-content" }), willChange: { auto: "auto", scroll: "scroll-position", contents: "contents", transform: "transform" }, zIndex: { auto: "auto", 0: "0", 10: "10", 20: "20", 30: "30", 40: "40", 50: "50" } }, plugins: [] };
});
function T2(e) {
  if (e = `${e}`, e === "0") return "0";
  if (/^[+-]?(\d+|\d*\.\d+)(e[+-]?\d+)?(%|\w+)?$/.test(e)) return e.replace(/^[+-]?/, (r) => r === "-" ? "" : "-");
  let t = ["var", "calc", "min", "max", "clamp"];
  for (let r of t) if (e.includes(`${r}(`)) return `calc(${e} * -1)`;
}
var A2 = ["preflight", "container", "accessibility", "pointerEvents", "visibility", "position", "inset", "isolation", "zIndex", "order", "gridColumn", "gridColumnStart", "gridColumnEnd", "gridRow", "gridRowStart", "gridRowEnd", "float", "clear", "margin", "boxSizing", "lineClamp", "display", "aspectRatio", "size", "height", "maxHeight", "minHeight", "width", "minWidth", "maxWidth", "flex", "flexShrink", "flexGrow", "flexBasis", "tableLayout", "captionSide", "borderCollapse", "borderSpacing", "transformOrigin", "translate", "rotate", "skew", "scale", "transform", "animation", "cursor", "touchAction", "userSelect", "resize", "scrollSnapType", "scrollSnapAlign", "scrollSnapStop", "scrollMargin", "scrollPadding", "listStylePosition", "listStyleType", "listStyleImage", "appearance", "columns", "breakBefore", "breakInside", "breakAfter", "gridAutoColumns", "gridAutoFlow", "gridAutoRows", "gridTemplateColumns", "gridTemplateRows", "flexDirection", "flexWrap", "placeContent", "placeItems", "alignContent", "alignItems", "justifyContent", "justifyItems", "gap", "space", "divideWidth", "divideStyle", "divideColor", "divideOpacity", "placeSelf", "alignSelf", "justifySelf", "overflow", "overscrollBehavior", "scrollBehavior", "textOverflow", "hyphens", "whitespace", "textWrap", "wordBreak", "borderRadius", "borderWidth", "borderStyle", "borderColor", "borderOpacity", "backgroundColor", "backgroundOpacity", "backgroundImage", "gradientColorStops", "boxDecorationBreak", "backgroundSize", "backgroundAttachment", "backgroundClip", "backgroundPosition", "backgroundRepeat", "backgroundOrigin", "fill", "stroke", "strokeWidth", "objectFit", "objectPosition", "padding", "textAlign", "textIndent", "verticalAlign", "fontFamily", "fontSize", "fontWeight", "textTransform", "fontStyle", "fontVariantNumeric", "lineHeight", "letterSpacing", "textColor", "textOpacity", "textDecoration", "textDecorationColor", "textDecorationStyle", "textDecorationThickness", "textUnderlineOffset", "fontSmoothing", "placeholderColor", "placeholderOpacity", "caretColor", "accentColor", "opacity", "backgroundBlendMode", "mixBlendMode", "boxShadow", "boxShadowColor", "outlineStyle", "outlineWidth", "outlineOffset", "outlineColor", "ringWidth", "ringColor", "ringOpacity", "ringOffsetWidth", "ringOffsetColor", "blur", "brightness", "contrast", "dropShadow", "grayscale", "hueRotate", "invert", "saturate", "sepia", "filter", "backdropBlur", "backdropBrightness", "backdropContrast", "backdropGrayscale", "backdropHueRotate", "backdropInvert", "backdropOpacity", "backdropSaturate", "backdropSepia", "backdropFilter", "transitionProperty", "transitionDelay", "transitionDuration", "transitionTimingFunction", "willChange", "contain", "content", "forcedColorAdjust"];
function C2(e, t) {
  return e === void 0 ? t : Array.isArray(e) ? e : [...new Set(t.filter((r) => e !== false && e[r] !== false).concat(Object.keys(e).filter((r) => e[r] !== false)))];
}
var vn = /* @__PURE__ */ new Set();
function wr(e, t, r) {
  typeof zt < "u" && zt.env.JEST_WORKER_ID || r && vn.has(r) || (r && vn.add(r), console.warn(""), t.forEach((n) => console.warn(e, "-", n)));
}
function wn(e) {
  return Se.dim(e);
}
var Et = { info(e, t) {
  wr(Se.bold(Se.cyan("info")), ...Array.isArray(e) ? [e] : [t, e]);
}, warn(e, t) {
  wr(Se.bold(Se.yellow("warn")), ...Array.isArray(e) ? [e] : [t, e]);
}, risk(e, t) {
  wr(Se.bold(Se.magenta("risk")), ...Array.isArray(e) ? [e] : [t, e]);
} };
function Pt({ version: e, from: t, to: r }) {
  Et.warn(`${t}-color-renamed`, [`As of Tailwind CSS ${e}, \`${t}\` has been renamed to \`${r}\`.`, "Update your configuration file to silence this warning."]);
}
var I2 = { inherit: "inherit", current: "currentColor", transparent: "transparent", black: "#000", white: "#fff", slate: { 50: "#f8fafc", 100: "#f1f5f9", 200: "#e2e8f0", 300: "#cbd5e1", 400: "#94a3b8", 500: "#64748b", 600: "#475569", 700: "#334155", 800: "#1e293b", 900: "#0f172a", 950: "#020617" }, gray: { 50: "#f9fafb", 100: "#f3f4f6", 200: "#e5e7eb", 300: "#d1d5db", 400: "#9ca3af", 500: "#6b7280", 600: "#4b5563", 700: "#374151", 800: "#1f2937", 900: "#111827", 950: "#030712" }, zinc: { 50: "#fafafa", 100: "#f4f4f5", 200: "#e4e4e7", 300: "#d4d4d8", 400: "#a1a1aa", 500: "#71717a", 600: "#52525b", 700: "#3f3f46", 800: "#27272a", 900: "#18181b", 950: "#09090b" }, neutral: { 50: "#fafafa", 100: "#f5f5f5", 200: "#e5e5e5", 300: "#d4d4d4", 400: "#a3a3a3", 500: "#737373", 600: "#525252", 700: "#404040", 800: "#262626", 900: "#171717", 950: "#0a0a0a" }, stone: { 50: "#fafaf9", 100: "#f5f5f4", 200: "#e7e5e4", 300: "#d6d3d1", 400: "#a8a29e", 500: "#78716c", 600: "#57534e", 700: "#44403c", 800: "#292524", 900: "#1c1917", 950: "#0c0a09" }, red: { 50: "#fef2f2", 100: "#fee2e2", 200: "#fecaca", 300: "#fca5a5", 400: "#f87171", 500: "#ef4444", 600: "#dc2626", 700: "#b91c1c", 800: "#991b1b", 900: "#7f1d1d", 950: "#450a0a" }, orange: { 50: "#fff7ed", 100: "#ffedd5", 200: "#fed7aa", 300: "#fdba74", 400: "#fb923c", 500: "#f97316", 600: "#ea580c", 700: "#c2410c", 800: "#9a3412", 900: "#7c2d12", 950: "#431407" }, amber: { 50: "#fffbeb", 100: "#fef3c7", 200: "#fde68a", 300: "#fcd34d", 400: "#fbbf24", 500: "#f59e0b", 600: "#d97706", 700: "#b45309", 800: "#92400e", 900: "#78350f", 950: "#451a03" }, yellow: { 50: "#fefce8", 100: "#fef9c3", 200: "#fef08a", 300: "#fde047", 400: "#facc15", 500: "#eab308", 600: "#ca8a04", 700: "#a16207", 800: "#854d0e", 900: "#713f12", 950: "#422006" }, lime: { 50: "#f7fee7", 100: "#ecfccb", 200: "#d9f99d", 300: "#bef264", 400: "#a3e635", 500: "#84cc16", 600: "#65a30d", 700: "#4d7c0f", 800: "#3f6212", 900: "#365314", 950: "#1a2e05" }, green: { 50: "#f0fdf4", 100: "#dcfce7", 200: "#bbf7d0", 300: "#86efac", 400: "#4ade80", 500: "#22c55e", 600: "#16a34a", 700: "#15803d", 800: "#166534", 900: "#14532d", 950: "#052e16" }, emerald: { 50: "#ecfdf5", 100: "#d1fae5", 200: "#a7f3d0", 300: "#6ee7b7", 400: "#34d399", 500: "#10b981", 600: "#059669", 700: "#047857", 800: "#065f46", 900: "#064e3b", 950: "#022c22" }, teal: { 50: "#f0fdfa", 100: "#ccfbf1", 200: "#99f6e4", 300: "#5eead4", 400: "#2dd4bf", 500: "#14b8a6", 600: "#0d9488", 700: "#0f766e", 800: "#115e59", 900: "#134e4a", 950: "#042f2e" }, cyan: { 50: "#ecfeff", 100: "#cffafe", 200: "#a5f3fc", 300: "#67e8f9", 400: "#22d3ee", 500: "#06b6d4", 600: "#0891b2", 700: "#0e7490", 800: "#155e75", 900: "#164e63", 950: "#083344" }, sky: { 50: "#f0f9ff", 100: "#e0f2fe", 200: "#bae6fd", 300: "#7dd3fc", 400: "#38bdf8", 500: "#0ea5e9", 600: "#0284c7", 700: "#0369a1", 800: "#075985", 900: "#0c4a6e", 950: "#082f49" }, blue: { 50: "#eff6ff", 100: "#dbeafe", 200: "#bfdbfe", 300: "#93c5fd", 400: "#60a5fa", 500: "#3b82f6", 600: "#2563eb", 700: "#1d4ed8", 800: "#1e40af", 900: "#1e3a8a", 950: "#172554" }, indigo: { 50: "#eef2ff", 100: "#e0e7ff", 200: "#c7d2fe", 300: "#a5b4fc", 400: "#818cf8", 500: "#6366f1", 600: "#4f46e5", 700: "#4338ca", 800: "#3730a3", 900: "#312e81", 950: "#1e1b4b" }, violet: { 50: "#f5f3ff", 100: "#ede9fe", 200: "#ddd6fe", 300: "#c4b5fd", 400: "#a78bfa", 500: "#8b5cf6", 600: "#7c3aed", 700: "#6d28d9", 800: "#5b21b6", 900: "#4c1d95", 950: "#2e1065" }, purple: { 50: "#faf5ff", 100: "#f3e8ff", 200: "#e9d5ff", 300: "#d8b4fe", 400: "#c084fc", 500: "#a855f7", 600: "#9333ea", 700: "#7e22ce", 800: "#6b21a8", 900: "#581c87", 950: "#3b0764" }, fuchsia: { 50: "#fdf4ff", 100: "#fae8ff", 200: "#f5d0fe", 300: "#f0abfc", 400: "#e879f9", 500: "#d946ef", 600: "#c026d3", 700: "#a21caf", 800: "#86198f", 900: "#701a75", 950: "#4a044e" }, pink: { 50: "#fdf2f8", 100: "#fce7f3", 200: "#fbcfe8", 300: "#f9a8d4", 400: "#f472b6", 500: "#ec4899", 600: "#db2777", 700: "#be185d", 800: "#9d174d", 900: "#831843", 950: "#500724" }, rose: { 50: "#fff1f2", 100: "#ffe4e6", 200: "#fecdd3", 300: "#fda4af", 400: "#fb7185", 500: "#f43f5e", 600: "#e11d48", 700: "#be123c", 800: "#9f1239", 900: "#881337", 950: "#4c0519" }, get lightBlue() {
  return Pt({ version: "v2.2", from: "lightBlue", to: "sky" }), this.sky;
}, get warmGray() {
  return Pt({ version: "v3.0", from: "warmGray", to: "stone" }), this.stone;
}, get trueGray() {
  return Pt({ version: "v3.0", from: "trueGray", to: "neutral" }), this.neutral;
}, get coolGray() {
  return Pt({ version: "v3.0", from: "coolGray", to: "gray" }), this.gray;
}, get blueGray() {
  return Pt({ version: "v3.0", from: "blueGray", to: "slate" }), this.slate;
} };
function Mu(e, ...t) {
  var _a3, _b3;
  for (let r of t) {
    for (let n in r) ((_a3 = e == null ? void 0 : e.hasOwnProperty) == null ? void 0 : _a3.call(e, n)) || (e[n] = r[n]);
    for (let n of Object.getOwnPropertySymbols(r)) ((_b3 = e == null ? void 0 : e.hasOwnProperty) == null ? void 0 : _b3.call(e, n)) || (e[n] = r[n]);
  }
  return e;
}
function On(e) {
  if (Array.isArray(e)) return e;
  let t = e.split("[").length - 1, r = e.split("]").length - 1;
  if (t !== r) throw new Error(`Path is invalid. Has unbalanced brackets: ${e}`);
  return e.split(/\.(?![^\[]*\])|[\[\]]/g).filter(Boolean);
}
var $n = { optimizeUniversalDefaults: false, generalizedModifiers: true, disableColorOpacityUtilitiesByDefault: false, relativeContentPathsByDefault: false }, xn = { future: ["hoverOnlyWhenSupported", "respectDefaultRingColorOpacity", "disableColorOpacityUtilitiesByDefault", "relativeContentPathsByDefault"], experimental: ["optimizeUniversalDefaults", "generalizedModifiers"] };
function Lu(e, t) {
  var _a3, _b3;
  return xn.future.includes(t) ? e.future === "all" || (((_a3 = e == null ? void 0 : e.future) == null ? void 0 : _a3[t]) ?? $n[t] ?? false) : xn.experimental.includes(t) ? e.experimental === "all" || (((_b3 = e == null ? void 0 : e.experimental) == null ? void 0 : _b3[t]) ?? $n[t] ?? false) : false;
}
function R2(e) {
  (() => {
    if (e.purge || !e.content || !Array.isArray(e.content) && !(typeof e.content == "object" && e.content !== null)) return false;
    if (Array.isArray(e.content)) return e.content.every((t) => typeof t == "string" ? true : !(typeof (t == null ? void 0 : t.raw) != "string" || (t == null ? void 0 : t.extension) && typeof (t == null ? void 0 : t.extension) != "string"));
    if (typeof e.content == "object" && e.content !== null) {
      if (Object.keys(e.content).some((t) => !["files", "relative", "extract", "transform"].includes(t))) return false;
      if (Array.isArray(e.content.files)) {
        if (!e.content.files.every((t) => typeof t == "string" ? true : !(typeof (t == null ? void 0 : t.raw) != "string" || (t == null ? void 0 : t.extension) && typeof (t == null ? void 0 : t.extension) != "string"))) return false;
        if (typeof e.content.extract == "object") {
          for (let t of Object.values(e.content.extract)) if (typeof t != "function") return false;
        } else if (!(e.content.extract === void 0 || typeof e.content.extract == "function")) return false;
        if (typeof e.content.transform == "object") {
          for (let t of Object.values(e.content.transform)) if (typeof t != "function") return false;
        } else if (!(e.content.transform === void 0 || typeof e.content.transform == "function")) return false;
        if (typeof e.content.relative != "boolean" && typeof e.content.relative < "u") return false;
      }
      return true;
    }
    return false;
  })() || Et.warn("purge-deprecation", ["The `purge`/`content` options have changed in Tailwind CSS v3.0.", "Update your configuration file to eliminate this warning.", "https://tailwindcss.com/docs/upgrade-guide#configure-content-sources"]), e.safelist = (() => {
    var _a3;
    let { content: t, purge: r, safelist: n } = e;
    return Array.isArray(n) ? n : Array.isArray(t == null ? void 0 : t.safelist) ? t.safelist : Array.isArray(r == null ? void 0 : r.safelist) ? r.safelist : Array.isArray((_a3 = r == null ? void 0 : r.options) == null ? void 0 : _a3.safelist) ? r.options.safelist : [];
  })(), e.blocklist = (() => {
    let { blocklist: t } = e;
    if (Array.isArray(t)) {
      if (t.every((r) => typeof r == "string")) return t;
      Et.warn("blocklist-invalid", ["The `blocklist` option must be an array of strings.", "https://tailwindcss.com/docs/content-configuration#discarding-classes"]);
    }
    return [];
  })(), typeof e.prefix == "function" ? (Et.warn("prefix-function", ["As of Tailwind CSS v3.0, `prefix` cannot be a function.", "Update `prefix` in your configuration to be a string to eliminate this warning.", "https://tailwindcss.com/docs/upgrade-guide#prefix-cannot-be-a-function"]), e.prefix = "") : e.prefix = e.prefix ?? "", e.content = { relative: (() => {
    let { content: t } = e;
    return (t == null ? void 0 : t.relative) ? t.relative : Lu(e, "relativeContentPathsByDefault");
  })(), files: (() => {
    let { content: t, purge: r } = e;
    return Array.isArray(r) ? r : Array.isArray(r == null ? void 0 : r.content) ? r.content : Array.isArray(t) ? t : Array.isArray(t == null ? void 0 : t.content) ? t.content : Array.isArray(t == null ? void 0 : t.files) ? t.files : [];
  })(), extract: (() => {
    var _a3, _b3, _c2, _d2, _e2, _f2, _g2, _h2, _i2, _j;
    let t = ((_a3 = e.purge) == null ? void 0 : _a3.extract) ? e.purge.extract : ((_b3 = e.content) == null ? void 0 : _b3.extract) ? e.content.extract : ((_d2 = (_c2 = e.purge) == null ? void 0 : _c2.extract) == null ? void 0 : _d2.DEFAULT) ? e.purge.extract.DEFAULT : ((_f2 = (_e2 = e.content) == null ? void 0 : _e2.extract) == null ? void 0 : _f2.DEFAULT) ? e.content.extract.DEFAULT : ((_h2 = (_g2 = e.purge) == null ? void 0 : _g2.options) == null ? void 0 : _h2.extractors) ? e.purge.options.extractors : ((_j = (_i2 = e.content) == null ? void 0 : _i2.options) == null ? void 0 : _j.extractors) ? e.content.options.extractors : {}, r = {}, n = (() => {
      var _a4, _b4, _c3, _d3;
      if ((_b4 = (_a4 = e.purge) == null ? void 0 : _a4.options) == null ? void 0 : _b4.defaultExtractor) return e.purge.options.defaultExtractor;
      if ((_d3 = (_c3 = e.content) == null ? void 0 : _c3.options) == null ? void 0 : _d3.defaultExtractor) return e.content.options.defaultExtractor;
    })();
    if (n !== void 0 && (r.DEFAULT = n), typeof t == "function") r.DEFAULT = t;
    else if (Array.isArray(t)) for (let { extensions: o, extractor: s } of t ?? []) for (let u of o) r[u] = s;
    else typeof t == "object" && t !== null && Object.assign(r, t);
    return r;
  })(), transform: (() => {
    var _a3, _b3, _c2, _d2, _e2, _f2;
    let t = ((_a3 = e.purge) == null ? void 0 : _a3.transform) ? e.purge.transform : ((_b3 = e.content) == null ? void 0 : _b3.transform) ? e.content.transform : ((_d2 = (_c2 = e.purge) == null ? void 0 : _c2.transform) == null ? void 0 : _d2.DEFAULT) ? e.purge.transform.DEFAULT : ((_f2 = (_e2 = e.content) == null ? void 0 : _e2.transform) == null ? void 0 : _f2.DEFAULT) ? e.content.transform.DEFAULT : {}, r = {};
    return typeof t == "function" ? r.DEFAULT = t : typeof t == "object" && t !== null && Object.assign(r, t), r;
  })() };
  for (let t of e.content.files) if (typeof t == "string" && /{([^,]*?)}/g.test(t)) {
    Et.warn("invalid-glob-braces", [`The glob pattern ${wn(t)} in your Tailwind CSS configuration is invalid.`, `Update it to ${wn(t.replace(/{([^,]*?)}/g, "$1"))} to silence this warning.`]);
    break;
  }
  return e;
}
function gt(e) {
  if (Object.prototype.toString.call(e) !== "[object Object]") return false;
  let t = Object.getPrototypeOf(e);
  return t === null || Object.getPrototypeOf(t) === null;
}
function Mr(e) {
  return Array.isArray(e) ? e.map((t) => Mr(t)) : typeof e == "object" && e !== null ? Object.fromEntries(Object.entries(e).map(([t, r]) => [t, Mr(r)])) : e;
}
var _n = { aliceblue: [240, 248, 255], antiquewhite: [250, 235, 215], aqua: [0, 255, 255], aquamarine: [127, 255, 212], azure: [240, 255, 255], beige: [245, 245, 220], bisque: [255, 228, 196], black: [0, 0, 0], blanchedalmond: [255, 235, 205], blue: [0, 0, 255], blueviolet: [138, 43, 226], brown: [165, 42, 42], burlywood: [222, 184, 135], cadetblue: [95, 158, 160], chartreuse: [127, 255, 0], chocolate: [210, 105, 30], coral: [255, 127, 80], cornflowerblue: [100, 149, 237], cornsilk: [255, 248, 220], crimson: [220, 20, 60], cyan: [0, 255, 255], darkblue: [0, 0, 139], darkcyan: [0, 139, 139], darkgoldenrod: [184, 134, 11], darkgray: [169, 169, 169], darkgreen: [0, 100, 0], darkgrey: [169, 169, 169], darkkhaki: [189, 183, 107], darkmagenta: [139, 0, 139], darkolivegreen: [85, 107, 47], darkorange: [255, 140, 0], darkorchid: [153, 50, 204], darkred: [139, 0, 0], darksalmon: [233, 150, 122], darkseagreen: [143, 188, 143], darkslateblue: [72, 61, 139], darkslategray: [47, 79, 79], darkslategrey: [47, 79, 79], darkturquoise: [0, 206, 209], darkviolet: [148, 0, 211], deeppink: [255, 20, 147], deepskyblue: [0, 191, 255], dimgray: [105, 105, 105], dimgrey: [105, 105, 105], dodgerblue: [30, 144, 255], firebrick: [178, 34, 34], floralwhite: [255, 250, 240], forestgreen: [34, 139, 34], fuchsia: [255, 0, 255], gainsboro: [220, 220, 220], ghostwhite: [248, 248, 255], gold: [255, 215, 0], goldenrod: [218, 165, 32], gray: [128, 128, 128], green: [0, 128, 0], greenyellow: [173, 255, 47], grey: [128, 128, 128], honeydew: [240, 255, 240], hotpink: [255, 105, 180], indianred: [205, 92, 92], indigo: [75, 0, 130], ivory: [255, 255, 240], khaki: [240, 230, 140], lavender: [230, 230, 250], lavenderblush: [255, 240, 245], lawngreen: [124, 252, 0], lemonchiffon: [255, 250, 205], lightblue: [173, 216, 230], lightcoral: [240, 128, 128], lightcyan: [224, 255, 255], lightgoldenrodyellow: [250, 250, 210], lightgray: [211, 211, 211], lightgreen: [144, 238, 144], lightgrey: [211, 211, 211], lightpink: [255, 182, 193], lightsalmon: [255, 160, 122], lightseagreen: [32, 178, 170], lightskyblue: [135, 206, 250], lightslategray: [119, 136, 153], lightslategrey: [119, 136, 153], lightsteelblue: [176, 196, 222], lightyellow: [255, 255, 224], lime: [0, 255, 0], limegreen: [50, 205, 50], linen: [250, 240, 230], magenta: [255, 0, 255], maroon: [128, 0, 0], mediumaquamarine: [102, 205, 170], mediumblue: [0, 0, 205], mediumorchid: [186, 85, 211], mediumpurple: [147, 112, 219], mediumseagreen: [60, 179, 113], mediumslateblue: [123, 104, 238], mediumspringgreen: [0, 250, 154], mediumturquoise: [72, 209, 204], mediumvioletred: [199, 21, 133], midnightblue: [25, 25, 112], mintcream: [245, 255, 250], mistyrose: [255, 228, 225], moccasin: [255, 228, 181], navajowhite: [255, 222, 173], navy: [0, 0, 128], oldlace: [253, 245, 230], olive: [128, 128, 0], olivedrab: [107, 142, 35], orange: [255, 165, 0], orangered: [255, 69, 0], orchid: [218, 112, 214], palegoldenrod: [238, 232, 170], palegreen: [152, 251, 152], paleturquoise: [175, 238, 238], palevioletred: [219, 112, 147], papayawhip: [255, 239, 213], peachpuff: [255, 218, 185], peru: [205, 133, 63], pink: [255, 192, 203], plum: [221, 160, 221], powderblue: [176, 224, 230], purple: [128, 0, 128], rebeccapurple: [102, 51, 153], red: [255, 0, 0], rosybrown: [188, 143, 143], royalblue: [65, 105, 225], saddlebrown: [139, 69, 19], salmon: [250, 128, 114], sandybrown: [244, 164, 96], seagreen: [46, 139, 87], seashell: [255, 245, 238], sienna: [160, 82, 45], silver: [192, 192, 192], skyblue: [135, 206, 235], slateblue: [106, 90, 205], slategray: [112, 128, 144], slategrey: [112, 128, 144], snow: [255, 250, 250], springgreen: [0, 255, 127], steelblue: [70, 130, 180], tan: [210, 180, 140], teal: [0, 128, 128], thistle: [216, 191, 216], tomato: [255, 99, 71], turquoise: [64, 224, 208], violet: [238, 130, 238], wheat: [245, 222, 179], white: [255, 255, 255], whitesmoke: [245, 245, 245], yellow: [255, 255, 0], yellowgreen: [154, 205, 50] }, D2 = /^#([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})?$/i, M2 = /^#([a-f\d])([a-f\d])([a-f\d])([a-f\d])?$/i, Pe = /(?:\d+|\d*\.\d+)%?/, Ht = /(?:\s*,\s*|\s+)/, Fu = /\s*[,/]\s*/, je = /var\(--(?:[^ )]*?)(?:,(?:[^ )]*?|var\(--[^ )]*?\)))?\)/, L2 = new RegExp(`^(rgba?)\\(\\s*(${Pe.source}|${je.source})(?:${Ht.source}(${Pe.source}|${je.source}))?(?:${Ht.source}(${Pe.source}|${je.source}))?(?:${Fu.source}(${Pe.source}|${je.source}))?\\s*\\)$`), F2 = new RegExp(`^(hsla?)\\(\\s*((?:${Pe.source})(?:deg|rad|grad|turn)?|${je.source})(?:${Ht.source}(${Pe.source}|${je.source}))?(?:${Ht.source}(${Pe.source}|${je.source}))?(?:${Fu.source}(${Pe.source}|${je.source}))?\\s*\\)$`);
function U2(e, { loose: t = false } = {}) {
  var _a3, _b3;
  if (typeof e != "string") return null;
  if (e = e.trim(), e === "transparent") return { mode: "rgb", color: ["0", "0", "0"], alpha: "0" };
  if (e in _n) return { mode: "rgb", color: _n[e].map((s) => s.toString()) };
  let r = e.replace(M2, (s, u, c, i, p) => ["#", u, u, c, c, i, i, p ? p + p : ""].join("")).match(D2);
  if (r !== null) return { mode: "rgb", color: [parseInt(r[1], 16), parseInt(r[2], 16), parseInt(r[3], 16)].map((s) => s.toString()), alpha: r[4] ? (parseInt(r[4], 16) / 255).toString() : void 0 };
  let n = e.match(L2) ?? e.match(F2);
  if (n === null) return null;
  let o = [n[2], n[3], n[4]].filter(Boolean).map((s) => s.toString());
  return o.length === 2 && o[0].startsWith("var(") ? { mode: n[1], color: [o[0]], alpha: o[1] } : !t && o.length !== 3 || o.length < 3 && !o.some((s) => /^var\(.*?\)$/.test(s)) ? null : { mode: n[1], color: o, alpha: (_b3 = (_a3 = n[5]) == null ? void 0 : _a3.toString) == null ? void 0 : _b3.call(_a3) };
}
function N2({ mode: e, color: t, alpha: r }) {
  let n = r !== void 0;
  return e === "rgba" || e === "hsla" ? `${e}(${t.join(", ")}${n ? `, ${r}` : ""})` : `${e}(${t.join(" ")}${n ? ` / ${r}` : ""})`;
}
function B2(e, t, r) {
  if (typeof e == "function") return e({ opacityValue: t });
  let n = U2(e, { loose: true });
  return n === null ? r : N2({ ...n, alpha: t });
}
function q2(e) {
  if (typeof e == "string" && e.includes("<alpha-value>")) {
    let t = e;
    return ({ opacityValue: r = 1 }) => t.replace(/<alpha-value>/g, r);
  }
  return e;
}
function z2(e) {
  return typeof e == "function" ? e({}) : e;
}
function vt(e) {
  return typeof e == "function";
}
function Tt(e, ...t) {
  let r = t.pop();
  for (let n of t) for (let o in n) {
    let s = r(e[o], n[o]);
    s === void 0 ? gt(e[o]) && gt(n[o]) ? e[o] = Tt({}, e[o], n[o], r) : e[o] = n[o] : e[o] = s;
  }
  return e;
}
var Or = { colors: I2, negative(e) {
  return Object.keys(e).filter((t) => e[t] !== "0").reduce((t, r) => {
    let n = T2(e[r]);
    return n !== void 0 && (t[`-${r}`] = n), t;
  }, {});
}, breakpoints(e) {
  return Object.keys(e).filter((t) => typeof e[t] == "string").reduce((t, r) => ({ ...t, [`screen-${r}`]: e[r] }), {});
} };
function W2(e, ...t) {
  return vt(e) ? e(...t) : e;
}
function G2(e) {
  return e.reduce((t, { extend: r }) => Tt(t, r, (n, o) => n === void 0 ? [o] : Array.isArray(n) ? [o, ...n] : [o, n]), {});
}
function Y2(e) {
  return { ...e.reduce((t, r) => Mu(t, r), {}), extend: G2(e) };
}
function Sn(e, t) {
  if (Array.isArray(e) && gt(e[0])) return e.concat(t);
  if (Array.isArray(t) && gt(t[0]) && gt(e)) return [e, ...t];
  if (Array.isArray(t)) return t;
}
function H2({ extend: e, ...t }) {
  return Tt(t, e, (r, n) => !vt(r) && !n.some(vt) ? Tt({}, r, ...n, Sn) : (o, s) => Tt({}, ...[r, ...n].map((u) => W2(u, o, s)), Sn));
}
function* V2(e) {
  let t = On(e);
  if (t.length === 0 || (yield t, Array.isArray(e))) return;
  let r = /^(.*?)\s*\/\s*([^/]+)$/, n = e.match(r);
  if (n !== null) {
    let [, o, s] = n, u = On(o);
    u.alpha = s, yield u;
  }
}
function K2(e) {
  let t = (r, n) => {
    for (let o of V2(r)) {
      let s = 0, u = e;
      for (; u != null && s < o.length; ) u = u[o[s++]], u = vt(u) && (o.alpha === void 0 || s <= o.length - 1) ? u(t, Or) : u;
      if (u !== void 0) {
        if (o.alpha !== void 0) {
          let c = q2(u);
          return B2(c, o.alpha, z2(c));
        }
        return gt(u) ? Mr(u) : u;
      }
    }
    return n;
  };
  return Object.assign(t, { theme: t, ...Or }), Object.keys(e).reduce((r, n) => (r[n] = vt(e[n]) ? e[n](t, Or) : e[n], r), {});
}
function Uu(e) {
  let t = [];
  return e.forEach((r) => {
    t = [...t, r];
    let n = (r == null ? void 0 : r.plugins) ?? [];
    n.length !== 0 && n.forEach((o) => {
      o.__isOptionsFunction && (o = o()), t = [...t, ...Uu([(o == null ? void 0 : o.config) ?? {}])];
    });
  }), t;
}
function Q2(e) {
  return [...e].reduceRight((t, r) => vt(r) ? r({ corePlugins: t }) : C2(r, t), A2);
}
function J2(e) {
  return [...e].reduceRight((t, r) => [...t, ...r], []);
}
function X2(e) {
  let t = [...Uu(e), { prefix: "", important: false, separator: ":" }];
  return R2(Mu({ theme: K2(H2(Y2(t.map((r) => (r == null ? void 0 : r.theme) ?? {})))), corePlugins: Q2(t.map((r) => r.corePlugins)), plugins: J2(e.map((r) => (r == null ? void 0 : r.plugins) ?? [])) }, ...t));
}
var Z2 = k2(E2());
function Nu(e) {
  let t = ((e == null ? void 0 : e.presets) ?? [Z2.default]).slice().reverse().flatMap((o) => Nu(o instanceof Function ? o() : o)), r = { respectDefaultRingColorOpacity: { theme: { ringColor: ({ theme: o }) => ({ DEFAULT: "#3b82f67f", ...o("colors") }) } }, disableColorOpacityUtilitiesByDefault: { corePlugins: { backgroundOpacity: false, borderOpacity: false, divideOpacity: false, placeholderOpacity: false, ringOpacity: false, textOpacity: false } } }, n = Object.keys(r).filter((o) => Lu(e, o)).map((o) => r[o]);
  return [e, ...n, ...t];
}
function eO(...e) {
  let [, ...t] = Nu(e[0]);
  return X2([...e, ...t]);
}
async function gO(e = {}) {
  const t = await Vu("./tailwind.config.js", null, "config", e);
  return eO(t);
}
export {
  Ml as F,
  e2 as P,
  dO as V,
  yO as _,
  nc as a,
  Lv as b,
  Cf as c,
  Gr as d,
  nO as e,
  Se as n,
  gO as r,
  Af as s,
  pO as w,
  zt as x
};

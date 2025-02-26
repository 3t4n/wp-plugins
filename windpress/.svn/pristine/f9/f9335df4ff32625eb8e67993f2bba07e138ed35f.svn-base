var j = Object.create, O = Object.defineProperty, M = Object.getOwnPropertyDescriptor, m = Object.getOwnPropertyNames, w = Object.getPrototypeOf, y = Object.prototype.hasOwnProperty, x = (u, a) => () => (a || u((a = { exports: {} }).exports, a), a.exports), A = (u, a, r, b) => {
  if (a && typeof a == "object" || typeof a == "function") for (let i of m(a)) !y.call(u, i) && i !== r && O(u, i, { get: () => a[i], enumerable: !(b = M(a, i)) || b.enumerable });
  return u;
}, P = (u, a, r) => (r = u != null ? j(w(u)) : {}, A(!u || !u.__esModule ? O(r, "default", { value: u, enumerable: true }) : r, u)), S = x((u, a) => {
  (function() {
    function r(f, p, l) {
      if (!f) return null;
      r.caseSensitive || (f = f.toLowerCase());
      var s = r.threshold === null ? null : r.threshold * f.length, o = r.thresholdAbsolute, n;
      s !== null && o !== null ? n = Math.min(s, o) : s !== null ? n = s : o !== null ? n = o : n = null;
      var t, e, c, v, h, g = p.length;
      for (h = 0; h < g; h++) if (e = p[h], l && (e = e[l]), !!e && (r.caseSensitive ? c = e : c = e.toLowerCase(), v = i(f, c, n), (n === null || v < n) && (n = v, l && r.returnWinningObject ? t = p[h] : t = e, r.returnFirstMatch))) return t;
      return t || r.nullResultValue;
    }
    r.threshold = 0.4, r.thresholdAbsolute = 20, r.caseSensitive = false, r.nullResultValue = null, r.returnWinningObject = null, r.returnFirstMatch = false, typeof a < "u" && a.exports ? a.exports = r : window.didYouMean = r;
    var b = Math.pow(2, 32) - 1;
    function i(f, p, l) {
      l = l || l === 0 ? l : b;
      var s = f.length, o = p.length;
      if (s === 0) return Math.min(l + 1, o);
      if (o === 0) return Math.min(l + 1, s);
      if (Math.abs(s - o) > l) return l + 1;
      var n = [], t, e, c, v, h;
      for (t = 0; t <= o; t++) n[t] = [t];
      for (e = 0; e <= s; e++) n[0][e] = e;
      for (t = 1; t <= o; t++) {
        for (c = b, v = 1, t > l && (v = t - l), h = o + 1, h > l + t && (h = l + t), e = 1; e <= s; e++) e < v || e > h ? n[t][e] = l + 1 : p.charAt(t - 1) === f.charAt(e - 1) ? n[t][e] = n[t - 1][e - 1] : n[t][e] = Math.min(n[t - 1][e - 1] + 1, Math.min(n[t][e - 1] + 1, n[t - 1][e] + 1)), n[t][e] < c && (c = n[t][e]);
        if (c > l) return l + 1;
      }
      return n[o][s];
    }
  })();
}), d = P(S()), { threshold: F, thresholdAbsolute: R, caseSensitive: V, nullResultValue: W, returnWinningObject: C, returnFirstMatch: L } = d, D = d.default ?? d;
export {
  D as N
};

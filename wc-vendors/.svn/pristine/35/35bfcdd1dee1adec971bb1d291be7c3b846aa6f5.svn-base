import {
  K as Xn,
  e as J,
  _ as u,
  P as te,
  h as Se,
  t as it,
  a as A,
  o as Pe,
  A as Ae,
  g as Tt,
  m as Ct,
  i as Kn,
  r as Pt,
  j as Ft,
  f as Wo,
  s as gt,
  k as Go,
  l as Vo,
  n as Xo,
  p as Ko,
  q as Uo,
  u as nt,
  C as Wt,
  v as Un,
  x as Yo,
  y as Zo,
  z as Qo,
  B as qo,
  D as je,
  E as Jo,
  F as Yn,
  G as Gt,
  H as Ue,
  I as ea,
  J as ta,
  L as na,
  M as oa,
  N as aa,
  O as ia,
  Q as ra,
  R as la,
  S as Bt,
  T as sa,
  U as ca,
  V as Zn,
  b as we,
  d as ua,
  c as da
} from '../main.4e11cfe3.js';
import {
  s as k,
  k as ut,
  d as Z,
  r as G,
  e as B,
  c as s,
  j as Ye,
  z as _e,
  g as ne,
  p as Qn,
  f as qn,
  Q as fa,
  R as Jn,
  S as eo,
  q as to,
  n as zt,
  m as Ke,
  F as ke,
  A as no,
  U as pa,
  D as sn,
  u as D,
  l as oo,
  V as va,
  I as ma,
  W as ga,
  E as ba,
  K as ao,
  X as ya,
  L as bt,
  w as ie,
  N as Te,
  Y as yt,
  a as rt,
  M as Je,
  o as Me,
  O as ha,
  Z as Fe,
  _ as cn,
  b as Ca
} from './vendor.e5025a5c.js';
import {
  a as xt,
  i as dt,
  b as Vt,
  g as xa,
  e as $a,
  M as io,
  c as ro,
  d as Sa,
  f as wa,
  h as lo,
  j as Ta,
  k as Pa,
  l as un,
  m as Oa,
  w as Oe,
  K as re,
  n as de,
  o as _a,
  E as Ia,
  p as Ea,
  q as Na,
  D as Ma,
  R as kt,
  r as Aa,
  s as dn,
  t as Be,
  v as Rt,
  x as Ba,
  y as ct,
  z as Ra,
  P as Da,
  A as La,
  B as Ge,
  C as so,
  F as co,
  L as za,
  G as ka,
  H as ja,
  I as Ha,
  J as et,
  N as Fa,
  O as uo,
  Q as Wa,
  T as Ga,
  U as fo,
  V as Dt,
  W as Va,
  u as Xa,
  S as lt
} from './VendorStore.76a5f248.js';
import { A as fn, P as Ka, T as Ua } from './index.26871545.js';
import {
  P as Ya,
  i as Za,
  j as Qa,
  k as qa,
  R as Ja,
  l as ei,
  S as ti,
  Z as ni,
  m as oi,
  T as tt,
  n as ai
} from './antd.e3fbf92b.js';
import { i as ot } from './initDefaultProps.d90010a5.js';
function ii(e, t) {
  for (var n = -1, o = e == null ? 0 : e.length, a = Array(o); ++n < o; )
    a[n] = t(e[n], n, e);
  return a;
}
var ri = 1 / 0,
  pn = xt ? xt.prototype : void 0,
  vn = pn ? pn.toString : void 0;
function po(e) {
  if (typeof e == 'string') return e;
  if (dt(e)) return ii(e, po) + '';
  if (Vt(e)) return vn ? vn.call(e) : '';
  var t = e + '';
  return t == '0' && 1 / e == -ri ? '-0' : t;
}
function li(e) {
  return e;
}
function si(e, t, n) {
  switch (n.length) {
    case 0:
      return e.call(t);
    case 1:
      return e.call(t, n[0]);
    case 2:
      return e.call(t, n[0], n[1]);
    case 3:
      return e.call(t, n[0], n[1], n[2]);
  }
  return e.apply(t, n);
}
var ci = 800,
  ui = 16,
  di = Date.now;
function fi(e) {
  var t = 0,
    n = 0;
  return function() {
    var o = di(),
      a = ui - (o - n);
    if (((n = o), a > 0)) {
      if (++t >= ci) return arguments[0];
    } else t = 0;
    return e.apply(void 0, arguments);
  };
}
function pi(e) {
  return function() {
    return e;
  };
}
var vi = (function() {
  try {
    var e = xa(Object, 'defineProperty');
    return e({}, '', {}), e;
  } catch {}
})();
const $t = vi;
var mi = $t
  ? function(e, t) {
      return $t(e, 'toString', {
        configurable: !0,
        enumerable: !1,
        value: pi(t),
        writable: !0
      });
    }
  : li;
const gi = mi;
var bi = fi(gi);
const yi = bi;
function hi(e, t, n) {
  t == '__proto__' && $t
    ? $t(e, t, { configurable: !0, enumerable: !0, value: n, writable: !0 })
    : (e[t] = n);
}
var Ci = Object.prototype,
  xi = Ci.hasOwnProperty;
function $i(e, t, n) {
  var o = e[t];
  (!(xi.call(e, t) && $a(o, n)) || (n === void 0 && !(t in e))) && hi(e, t, n);
}
var mn = Math.max;
function Si(e, t, n) {
  return (
    (t = mn(t === void 0 ? e.length - 1 : t, 0)),
    function() {
      for (
        var o = arguments, a = -1, r = mn(o.length - t, 0), i = Array(r);
        ++a < r;

      )
        i[a] = o[t + a];
      a = -1;
      for (var l = Array(t + 1); ++a < t; ) l[a] = o[a];
      return (l[t] = n(i)), si(e, this, l);
    }
  );
}
var wi = /\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/,
  Ti = /^\w*$/;
function Pi(e, t) {
  if (dt(e)) return !1;
  var n = typeof e;
  return n == 'number' || n == 'symbol' || n == 'boolean' || e == null || Vt(e)
    ? !0
    : Ti.test(e) || !wi.test(e) || (t != null && e in Object(t));
}
var Oi = 'Expected a function';
function Xt(e, t) {
  if (typeof e != 'function' || (t != null && typeof t != 'function'))
    throw new TypeError(Oi);
  var n = function() {
    var o = arguments,
      a = t ? t.apply(this, o) : o[0],
      r = n.cache;
    if (r.has(a)) return r.get(a);
    var i = e.apply(this, o);
    return (n.cache = r.set(a, i) || r), i;
  };
  return (n.cache = new (Xt.Cache || io)()), n;
}
Xt.Cache = io;
var _i = 500;
function Ii(e) {
  var t = Xt(e, function(o) {
      return n.size === _i && n.clear(), o;
    }),
    n = t.cache;
  return t;
}
var Ei = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g,
  Ni = /\\(\\)?/g,
  Mi = Ii(function(e) {
    var t = [];
    return (
      e.charCodeAt(0) === 46 && t.push(''),
      e.replace(Ei, function(n, o, a, r) {
        t.push(a ? r.replace(Ni, '$1') : o || n);
      }),
      t
    );
  });
const Ai = Mi;
function Bi(e) {
  return e == null ? '' : po(e);
}
function Ot(e, t) {
  return dt(e) ? e : Pi(e, t) ? [e] : Ai(Bi(e));
}
var Ri = 1 / 0;
function Kt(e) {
  if (typeof e == 'string' || Vt(e)) return e;
  var t = e + '';
  return t == '0' && 1 / e == -Ri ? '-0' : t;
}
function Di(e, t) {
  t = Ot(t, e);
  for (var n = 0, o = t.length; e != null && n < o; ) e = e[Kt(t[n++])];
  return n && n == o ? e : void 0;
}
var gn = xt ? xt.isConcatSpreadable : void 0;
function Li(e) {
  return dt(e) || ro(e) || !!(gn && e && e[gn]);
}
function vo(e, t, n, o, a) {
  var r = -1,
    i = e.length;
  for (n || (n = Li), a || (a = []); ++r < i; ) {
    var l = e[r];
    t > 0 && n(l)
      ? t > 1
        ? vo(l, t - 1, n, o, a)
        : Sa(a, l)
      : o || (a[a.length] = l);
  }
  return a;
}
function zi(e) {
  var t = e == null ? 0 : e.length;
  return t ? vo(e, 1) : [];
}
function ki(e) {
  return yi(Si(e, void 0, zi), e + '');
}
function ji(e, t) {
  return e != null && t in Object(e);
}
function Hi(e, t, n) {
  t = Ot(t, e);
  for (var o = -1, a = t.length, r = !1; ++o < a; ) {
    var i = Kt(t[o]);
    if (!(r = e != null && n(e, i))) break;
    e = e[i];
  }
  return r || ++o != a
    ? r
    : ((a = e == null ? 0 : e.length),
      !!a && wa(a) && lo(i, a) && (dt(e) || ro(e)));
}
function Fi(e, t) {
  return e != null && Hi(e, t, ji);
}
var Wi = '[object Number]';
function Gi(e) {
  return typeof e == 'number' || (Ta(e) && Pa(e) == Wi);
}
function Vi(e, t, n, o) {
  if (!un(e)) return e;
  t = Ot(t, e);
  for (var a = -1, r = t.length, i = r - 1, l = e; l != null && ++a < r; ) {
    var m = Kt(t[a]),
      d = n;
    if (m === '__proto__' || m === 'constructor' || m === 'prototype') return e;
    if (a != i) {
      var c = l[m];
      (d = o ? o(c, m, l) : void 0),
        d === void 0 && (d = un(c) ? c : lo(t[a + 1]) ? [] : {});
    }
    $i(l, m, d), (l = l[m]);
  }
  return e;
}
function Xi(e, t, n) {
  for (var o = -1, a = t.length, r = {}; ++o < a; ) {
    var i = t[o],
      l = Di(e, i);
    n(l, i) && Vi(r, Ot(i, e), l);
  }
  return r;
}
function Ki(e, t) {
  return Xi(e, t, function(n, o) {
    return Fi(e, o);
  });
}
var Ui = ki(function(e, t) {
  return e == null ? {} : Ki(e, t);
});
const mo = Ui,
  Yi = new Xn('antFadeIn', { '0%': { opacity: 0 }, '100%': { opacity: 1 } }),
  Zi = new Xn('antFadeOut', { '0%': { opacity: 1 }, '100%': { opacity: 0 } }),
  go = function(e) {
    let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1;
    const { antCls: n } = e,
      o = `${n}-fade`,
      a = t ? '&' : '';
    return [
      Oa(o, Yi, Zi, e.motionDurationMid, t),
      {
        [`
        ${a}${o}-enter,
        ${a}${o}-appear
      `]: { opacity: 0, animationTimingFunction: 'linear' },
        [`${a}${o}-leave`]: { animationTimingFunction: 'linear' }
      }
    ];
  };
function Qi(e) {
  const t = k(),
    n = k(!1);
  function o() {
    for (var a = arguments.length, r = new Array(a), i = 0; i < a; i++)
      r[i] = arguments[i];
    n.value ||
      (Oe.cancel(t.value),
      (t.value = Oe(() => {
        e(...r);
      })));
  }
  return (
    ut(() => {
      (n.value = !0), Oe.cancel(t.value);
    }),
    o
  );
}
function qi(e) {
  const t = k([]),
    n = k(typeof e == 'function' ? e() : e),
    o = Qi(() => {
      let r = n.value;
      t.value.forEach(i => {
        r = i(r);
      }),
        (t.value = []),
        (n.value = r);
    });
  function a(r) {
    t.value.push(r), o();
  }
  return [n, a];
}
const Ji = Z({
    compatConfig: { MODE: 3 },
    name: 'TabNode',
    props: {
      id: { type: String },
      prefixCls: { type: String },
      tab: { type: Object },
      active: { type: Boolean },
      closable: { type: Boolean },
      editable: { type: Object },
      onClick: { type: Function },
      onResize: { type: Function },
      renderWrapper: { type: Function },
      removeAriaLabel: { type: String },
      onFocus: { type: Function }
    },
    emits: ['click', 'resize', 'remove', 'focus'],
    setup(e, t) {
      let { expose: n, attrs: o } = t;
      const a = G();
      function r(m) {
        var d;
        (!((d = e.tab) === null || d === void 0) && d.disabled) || e.onClick(m);
      }
      n({ domRef: a });
      function i(m) {
        var d;
        m.preventDefault(),
          m.stopPropagation(),
          e.editable.onEdit('remove', {
            key: (d = e.tab) === null || d === void 0 ? void 0 : d.key,
            event: m
          });
      }
      const l = B(() => {
        var m;
        return (
          e.editable &&
          e.closable !== !1 &&
          !(!((m = e.tab) === null || m === void 0) && m.disabled)
        );
      });
      return () => {
        var m;
        const {
            prefixCls: d,
            id: c,
            active: v,
            tab: { key: g, tab: f, disabled: C, closeIcon: x },
            renderWrapper: $,
            removeAriaLabel: h,
            editable: S,
            onFocus: b
          } = e,
          _ = `${d}-tab`,
          p = s(
            'div',
            {
              key: g,
              ref: a,
              class: J(_, {
                [`${_}-with-remove`]: l.value,
                [`${_}-active`]: v,
                [`${_}-disabled`]: C
              }),
              style: o.style,
              onClick: r
            },
            [
              s(
                'div',
                {
                  role: 'tab',
                  'aria-selected': v,
                  id: c && `${c}-tab-${g}`,
                  class: `${_}-btn`,
                  'aria-controls': c && `${c}-panel-${g}`,
                  'aria-disabled': C,
                  tabindex: C ? null : 0,
                  onClick: P => {
                    P.stopPropagation(), r(P);
                  },
                  onKeydown: P => {
                    [re.SPACE, re.ENTER].includes(P.which) &&
                      (P.preventDefault(), r(P));
                  },
                  onFocus: b
                },
                [typeof f == 'function' ? f() : f]
              ),
              l.value &&
                s(
                  'button',
                  {
                    type: 'button',
                    'aria-label': h || 'remove',
                    tabindex: 0,
                    class: `${_}-remove`,
                    onClick: P => {
                      P.stopPropagation(), i(P);
                    }
                  },
                  [
                    (x == null ? void 0 : x()) ||
                      ((m = S.removeIcon) === null || m === void 0
                        ? void 0
                        : m.call(S)) ||
                      '×'
                  ]
                )
            ]
          );
        return $ ? $(p) : p;
      };
    }
  }),
  bn = { width: 0, height: 0, left: 0, top: 0 };
function er(e, t) {
  const n = G(new Map());
  return (
    Ye(() => {
      var o, a;
      const r = new Map(),
        i = e.value,
        l =
          t.value.get((o = i[0]) === null || o === void 0 ? void 0 : o.key) ||
          bn,
        m = l.left + l.width;
      for (let d = 0; d < i.length; d += 1) {
        const { key: c } = i[d];
        let v = t.value.get(c);
        v ||
          (v =
            t.value.get(
              (a = i[d - 1]) === null || a === void 0 ? void 0 : a.key
            ) || bn);
        const g = r.get(c) || u({}, v);
        (g.right = m - g.left - g.width), r.set(c, g);
      }
      n.value = new Map(r);
    }),
    n
  );
}
const bo = Z({
    compatConfig: { MODE: 3 },
    name: 'AddButton',
    inheritAttrs: !1,
    props: {
      prefixCls: String,
      editable: { type: Object },
      locale: { type: Object, default: void 0 }
    },
    setup(e, t) {
      let { expose: n, attrs: o } = t;
      const a = G();
      return (
        n({ domRef: a }),
        () => {
          const { prefixCls: r, editable: i, locale: l } = e;
          return !i || i.showAdd === !1
            ? null
            : s(
                'button',
                {
                  ref: a,
                  type: 'button',
                  class: `${r}-nav-add`,
                  style: o.style,
                  'aria-label':
                    (l == null ? void 0 : l.addAriaLabel) || 'Add tab',
                  onClick: m => {
                    i.onEdit('add', { event: m });
                  }
                },
                [i.addIcon ? i.addIcon() : '+']
              );
        }
      );
    }
  }),
  tr = {
    prefixCls: { type: String },
    id: { type: String },
    tabs: { type: Object },
    rtl: { type: Boolean },
    tabBarGutter: { type: Number },
    activeKey: { type: [String, Number] },
    mobile: { type: Boolean },
    moreIcon: te.any,
    moreTransitionName: { type: String },
    editable: { type: Object },
    locale: { type: Object, default: void 0 },
    removeAriaLabel: String,
    onTabClick: { type: Function },
    popupClassName: String,
    getPopupContainer: Se()
  },
  nr = Z({
    compatConfig: { MODE: 3 },
    name: 'OperationNode',
    inheritAttrs: !1,
    props: tr,
    emits: ['tabClick'],
    slots: Object,
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      const [a, r] = de(!1),
        [i, l] = de(null),
        m = f => {
          const C = e.tabs.filter(h => !h.disabled);
          let x = C.findIndex(h => h.key === i.value) || 0;
          const $ = C.length;
          for (let h = 0; h < $; h += 1) {
            x = (x + f + $) % $;
            const S = C[x];
            if (!S.disabled) {
              l(S.key);
              return;
            }
          }
        },
        d = f => {
          const { which: C } = f;
          if (!a.value) {
            [re.DOWN, re.SPACE, re.ENTER].includes(C) &&
              (r(!0), f.preventDefault());
            return;
          }
          switch (C) {
            case re.UP:
              m(-1), f.preventDefault();
              break;
            case re.DOWN:
              m(1), f.preventDefault();
              break;
            case re.ESC:
              r(!1);
              break;
            case re.SPACE:
            case re.ENTER:
              i.value !== null && e.onTabClick(i.value, f);
              break;
          }
        },
        c = B(() => `${e.id}-more-popup`),
        v = B(() => (i.value !== null ? `${c.value}-${i.value}` : null)),
        g = (f, C) => {
          f.preventDefault(),
            f.stopPropagation(),
            e.editable.onEdit('remove', { key: C, event: f });
        };
      return (
        _e(() => {
          ne(
            i,
            () => {
              const f = document.getElementById(v.value);
              f && f.scrollIntoView && f.scrollIntoView(!1);
            },
            { flush: 'post', immediate: !0 }
          );
        }),
        ne(a, () => {
          a.value || l(null);
        }),
        _a({}),
        () => {
          var f;
          const {
            prefixCls: C,
            id: x,
            tabs: $,
            locale: h,
            mobile: S,
            moreIcon: b = ((f = o.moreIcon) === null || f === void 0
              ? void 0
              : f.call(o)) || s(Ia, null, null),
            moreTransitionName: _,
            editable: p,
            tabBarGutter: P,
            rtl: T,
            onTabClick: N,
            popupClassName: z
          } = e;
          if (!$.length) return null;
          const R = `${C}-dropdown`,
            F = h == null ? void 0 : h.dropdownAriaLabel,
            Q = { [T ? 'marginRight' : 'marginLeft']: P };
          $.length || ((Q.visibility = 'hidden'), (Q.order = 1));
          const K = J({ [`${R}-rtl`]: T, [`${z}`]: !0 }),
            ee = S
              ? null
              : s(
                  Ma,
                  {
                    prefixCls: R,
                    trigger: ['hover'],
                    visible: a.value,
                    transitionName: _,
                    onVisibleChange: r,
                    overlayClassName: K,
                    mouseEnterDelay: 0.1,
                    mouseLeaveDelay: 0.1,
                    getPopupContainer: e.getPopupContainer
                  },
                  {
                    overlay: () =>
                      s(
                        Ea,
                        {
                          onClick: y => {
                            let { key: I, domEvent: E } = y;
                            N(I, E), r(!1);
                          },
                          id: c.value,
                          tabindex: -1,
                          role: 'listbox',
                          'aria-activedescendant': v.value,
                          selectedKeys: [i.value],
                          'aria-label': F !== void 0 ? F : 'expanded dropdown'
                        },
                        {
                          default: () => [
                            $.map(y => {
                              var I, E;
                              const O = p && y.closable !== !1 && !y.disabled;
                              return s(
                                Na,
                                {
                                  key: y.key,
                                  id: `${c.value}-${y.key}`,
                                  role: 'option',
                                  'aria-controls': x && `${x}-panel-${y.key}`,
                                  disabled: y.disabled
                                },
                                {
                                  default: () => [
                                    s('span', null, [
                                      typeof y.tab == 'function'
                                        ? y.tab()
                                        : y.tab
                                    ]),
                                    O &&
                                      s(
                                        'button',
                                        {
                                          type: 'button',
                                          'aria-label':
                                            e.removeAriaLabel || 'remove',
                                          tabindex: 0,
                                          class: `${R}-menu-item-remove`,
                                          onClick: L => {
                                            L.stopPropagation(), g(L, y.key);
                                          }
                                        },
                                        [
                                          ((I = y.closeIcon) === null ||
                                          I === void 0
                                            ? void 0
                                            : I.call(y)) ||
                                            ((E = p.removeIcon) === null ||
                                            E === void 0
                                              ? void 0
                                              : E.call(p)) ||
                                            '×'
                                        ]
                                      )
                                  ]
                                }
                              );
                            })
                          ]
                        }
                      ),
                    default: () =>
                      s(
                        'button',
                        {
                          type: 'button',
                          class: `${C}-nav-more`,
                          style: Q,
                          tabindex: -1,
                          'aria-hidden': 'true',
                          'aria-haspopup': 'listbox',
                          'aria-controls': c.value,
                          id: `${x}-more`,
                          'aria-expanded': a.value,
                          onKeydown: d
                        },
                        [b]
                      )
                  }
                );
          return s(
            'div',
            { class: J(`${C}-nav-operations`, n.class), style: n.style },
            [ee, s(bo, { prefixCls: C, locale: h, editable: p }, null)]
          );
        }
      );
    }
  }),
  yo = Symbol('tabsContextKey'),
  or = e => {
    Qn(yo, e);
  },
  ho = () => qn(yo, { tabs: G([]), prefixCls: G() }),
  ar = 0.1,
  yn = 0.01,
  ht = 20,
  hn = Math.pow(0.995, ht);
function ir(e, t) {
  const [n, o] = de(),
    [a, r] = de(0),
    [i, l] = de(0),
    [m, d] = de(),
    c = G();
  function v(p) {
    const { screenX: P, screenY: T } = p.touches[0];
    o({ x: P, y: T }), clearInterval(c.value);
  }
  function g(p) {
    if (!n.value) return;
    p.preventDefault();
    const { screenX: P, screenY: T } = p.touches[0],
      N = P - n.value.x,
      z = T - n.value.y;
    t(N, z), o({ x: P, y: T });
    const R = Date.now();
    l(R - a.value), r(R), d({ x: N, y: z });
  }
  function f() {
    if (!n.value) return;
    const p = m.value;
    if ((o(null), d(null), p)) {
      const P = p.x / i.value,
        T = p.y / i.value,
        N = Math.abs(P),
        z = Math.abs(T);
      if (Math.max(N, z) < ar) return;
      let R = P,
        F = T;
      c.value = setInterval(() => {
        if (Math.abs(R) < yn && Math.abs(F) < yn) {
          clearInterval(c.value);
          return;
        }
        (R *= hn), (F *= hn), t(R * ht, F * ht);
      }, ht);
    }
  }
  const C = G();
  function x(p) {
    const { deltaX: P, deltaY: T } = p;
    let N = 0;
    const z = Math.abs(P),
      R = Math.abs(T);
    z === R
      ? (N = C.value === 'x' ? P : T)
      : z > R
      ? ((N = P), (C.value = 'x'))
      : ((N = T), (C.value = 'y')),
      t(-N, -N) && p.preventDefault();
  }
  const $ = G({ onTouchStart: v, onTouchMove: g, onTouchEnd: f, onWheel: x });
  function h(p) {
    $.value.onTouchStart(p);
  }
  function S(p) {
    $.value.onTouchMove(p);
  }
  function b(p) {
    $.value.onTouchEnd(p);
  }
  function _(p) {
    $.value.onWheel(p);
  }
  _e(() => {
    var p, P;
    document.addEventListener('touchmove', S, { passive: !1 }),
      document.addEventListener('touchend', b, { passive: !1 }),
      (p = e.value) === null ||
        p === void 0 ||
        p.addEventListener('touchstart', h, { passive: !1 }),
      (P = e.value) === null ||
        P === void 0 ||
        P.addEventListener('wheel', _, { passive: !1 });
  }),
    ut(() => {
      document.removeEventListener('touchmove', S),
        document.removeEventListener('touchend', b);
    });
}
function Cn(e, t) {
  const n = G(e);
  function o(a) {
    const r = typeof a == 'function' ? a(n.value) : a;
    r !== n.value && t(r, n.value), (n.value = r);
  }
  return [n, o];
}
const rr = () => {
    const e = G(new Map()),
      t = n => o => {
        e.value.set(n, o);
      };
    return (
      fa(() => {
        e.value = new Map();
      }),
      [t, e]
    );
  },
  lr = rr,
  xn = { width: 0, height: 0, left: 0, top: 0, right: 0 },
  sr = () => ({
    id: { type: String },
    tabPosition: { type: String },
    activeKey: { type: [String, Number] },
    rtl: { type: Boolean },
    animated: Pe(),
    editable: Pe(),
    moreIcon: te.any,
    moreTransitionName: { type: String },
    mobile: { type: Boolean },
    tabBarGutter: { type: Number },
    renderTabBar: { type: Function },
    locale: Pe(),
    popupClassName: String,
    getPopupContainer: Se(),
    onTabClick: { type: Function },
    onTabScroll: { type: Function }
  }),
  $n = Z({
    compatConfig: { MODE: 3 },
    name: 'TabNavList',
    inheritAttrs: !1,
    props: sr(),
    slots: Object,
    emits: ['tabClick', 'tabScroll'],
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      const { tabs: a, prefixCls: r } = ho(),
        i = k(),
        l = k(),
        m = k(),
        d = k(),
        [c, v] = lr(),
        g = B(() => e.tabPosition === 'top' || e.tabPosition === 'bottom'),
        [f, C] = Cn(0, (w, M) => {
          g.value &&
            e.onTabScroll &&
            e.onTabScroll({ direction: w > M ? 'left' : 'right' });
        }),
        [x, $] = Cn(0, (w, M) => {
          !g.value &&
            e.onTabScroll &&
            e.onTabScroll({ direction: w > M ? 'top' : 'bottom' });
        }),
        [h, S] = de(0),
        [b, _] = de(0),
        [p, P] = de(null),
        [T, N] = de(null),
        [z, R] = de(0),
        [F, Q] = de(0),
        [K, ee] = qi(new Map()),
        y = er(a, K),
        I = B(() => `${r.value}-nav-operations-hidden`),
        E = k(0),
        O = k(0);
      Ye(() => {
        g.value
          ? e.rtl
            ? ((E.value = 0), (O.value = Math.max(0, h.value - p.value)))
            : ((E.value = Math.min(0, p.value - h.value)), (O.value = 0))
          : ((E.value = Math.min(0, T.value - b.value)), (O.value = 0));
      });
      const L = w => (w < E.value ? E.value : w > O.value ? O.value : w),
        W = k(),
        [H, oe] = de(),
        le = () => {
          oe(Date.now());
        },
        q = () => {
          clearTimeout(W.value);
        },
        ae = (w, M) => {
          w(j => L(j + M));
        };
      ir(i, (w, M) => {
        if (g.value) {
          if (p.value >= h.value) return !1;
          ae(C, w);
        } else {
          if (T.value >= b.value) return !1;
          ae($, M);
        }
        return q(), le(), !0;
      }),
        ne(H, () => {
          q(),
            H.value &&
              (W.value = setTimeout(() => {
                oe(0);
              }, 100));
        });
      const U = function() {
          let w =
            arguments.length > 0 && arguments[0] !== void 0
              ? arguments[0]
              : e.activeKey;
          const M = y.value.get(w) || {
            width: 0,
            height: 0,
            left: 0,
            right: 0,
            top: 0
          };
          if (g.value) {
            let j = f.value;
            e.rtl
              ? M.right < f.value
                ? (j = M.right)
                : M.right + M.width > f.value + p.value &&
                  (j = M.right + M.width - p.value)
              : M.left < -f.value
              ? (j = -M.left)
              : M.left + M.width > -f.value + p.value &&
                (j = -(M.left + M.width - p.value)),
              $(0),
              C(L(j));
          } else {
            let j = x.value;
            M.top < -x.value
              ? (j = -M.top)
              : M.top + M.height > -x.value + T.value &&
                (j = -(M.top + M.height - T.value)),
              C(0),
              $(L(j));
          }
        },
        ce = k(0),
        me = k(0);
      Ye(() => {
        let w, M, j, V, Y, X;
        const xe = y.value;
        ['top', 'bottom'].includes(e.tabPosition)
          ? ((w = 'width'),
            (V = p.value),
            (Y = h.value),
            (X = z.value),
            (M = e.rtl ? 'right' : 'left'),
            (j = Math.abs(f.value)))
          : ((w = 'height'),
            (V = T.value),
            (Y = h.value),
            (X = F.value),
            (M = 'top'),
            (j = -x.value));
        let se = V;
        Y + X > V && Y < V && (se = V - X);
        const Ne = a.value;
        if (!Ne.length) return ([ce.value, me.value] = [0, 0]);
        const De = Ne.length;
        let Ze = De;
        for (let fe = 0; fe < De; fe += 1) {
          const $e = xe.get(Ne[fe].key) || xn;
          if ($e[M] + $e[w] > j + se) {
            Ze = fe - 1;
            break;
          }
        }
        let ue = 0;
        for (let fe = De - 1; fe >= 0; fe -= 1)
          if ((xe.get(Ne[fe].key) || xn)[M] < j) {
            ue = fe + 1;
            break;
          }
        return ([ce.value, me.value] = [ue, Ze]);
      });
      const ye = () => {
          var w, M, j, V, Y;
          const X =
              ((w = i.value) === null || w === void 0
                ? void 0
                : w.offsetWidth) || 0,
            xe =
              ((M = i.value) === null || M === void 0
                ? void 0
                : M.offsetHeight) || 0,
            se =
              ((j = d.value) === null || j === void 0 ? void 0 : j.$el) || {},
            Ne = se.offsetWidth || 0,
            De = se.offsetHeight || 0;
          P(X), N(xe), R(Ne), Q(De);
          const Ze =
              (((V = l.value) === null || V === void 0
                ? void 0
                : V.offsetWidth) || 0) - Ne,
            ue =
              (((Y = l.value) === null || Y === void 0
                ? void 0
                : Y.offsetHeight) || 0) - De;
          S(Ze),
            _(ue),
            ee(() => {
              const fe = new Map();
              return (
                a.value.forEach($e => {
                  let { key: Qe } = $e;
                  const Le = v.value.get(Qe),
                    ze = (Le == null ? void 0 : Le.$el) || Le;
                  ze &&
                    fe.set(Qe, {
                      width: ze.offsetWidth,
                      height: ze.offsetHeight,
                      left: ze.offsetLeft,
                      top: ze.offsetTop
                    });
                }),
                fe
              );
            });
        },
        Ie = B(() => [
          ...a.value.slice(0, ce.value),
          ...a.value.slice(me.value + 1)
        ]),
        [He, Re] = de(),
        pe = B(() => y.value.get(e.activeKey)),
        Ce = k(),
        Ee = () => {
          Oe.cancel(Ce.value);
        };
      ne([pe, g, () => e.rtl], () => {
        const w = {};
        pe.value &&
          (g.value
            ? (e.rtl
                ? (w.right = it(pe.value.right))
                : (w.left = it(pe.value.left)),
              (w.width = it(pe.value.width)))
            : ((w.top = it(pe.value.top)), (w.height = it(pe.value.height)))),
          Ee(),
          (Ce.value = Oe(() => {
            Re(w);
          }));
      }),
        ne(
          [() => e.activeKey, pe, y, g],
          () => {
            U();
          },
          { flush: 'post' }
        ),
        ne(
          [() => e.rtl, () => e.tabBarGutter, () => e.activeKey, () => a.value],
          () => {
            ye();
          },
          { flush: 'post' }
        );
      const he = w => {
        let { position: M, prefixCls: j, extra: V } = w;
        if (!V) return null;
        const Y = V == null ? void 0 : V({ position: M });
        return Y ? s('div', { class: `${j}-extra-content` }, [Y]) : null;
      };
      return (
        ut(() => {
          q(), Ee();
        }),
        () => {
          const {
              id: w,
              animated: M,
              activeKey: j,
              rtl: V,
              editable: Y,
              locale: X,
              tabPosition: xe,
              tabBarGutter: se,
              onTabClick: Ne
            } = e,
            { class: De, style: Ze } = n,
            ue = r.value,
            fe = !!Ie.value.length,
            $e = `${ue}-nav-wrap`;
          let Qe, Le, ze, rn;
          g.value
            ? V
              ? ((Le = f.value > 0), (Qe = f.value + p.value < h.value))
              : ((Qe = f.value < 0), (Le = -f.value + p.value < h.value))
            : ((ze = x.value < 0), (rn = -x.value + T.value < b.value));
          const mt = {};
          xe === 'top' || xe === 'bottom'
            ? (mt[V ? 'marginRight' : 'marginLeft'] =
                typeof se == 'number' ? `${se}px` : se)
            : (mt.marginTop = typeof se == 'number' ? `${se}px` : se);
          const ln = a.value.map((At, Ho) => {
            const { key: at } = At;
            return s(
              Ji,
              {
                id: w,
                prefixCls: ue,
                key: at,
                tab: At,
                style: Ho === 0 ? void 0 : mt,
                closable: At.closable,
                editable: Y,
                active: at === j,
                removeAriaLabel: X == null ? void 0 : X.removeAriaLabel,
                ref: c(at),
                onClick: Fo => {
                  Ne(at, Fo);
                },
                onFocus: () => {
                  U(at),
                    le(),
                    i.value &&
                      (V || (i.value.scrollLeft = 0), (i.value.scrollTop = 0));
                }
              },
              o
            );
          });
          return s(
            'div',
            {
              role: 'tablist',
              class: J(`${ue}-nav`, De),
              style: Ze,
              onKeydown: () => {
                le();
              }
            },
            [
              s(
                he,
                { position: 'left', prefixCls: ue, extra: o.leftExtra },
                null
              ),
              s(
                kt,
                { onResize: ye },
                {
                  default: () => [
                    s(
                      'div',
                      {
                        class: J($e, {
                          [`${$e}-ping-left`]: Qe,
                          [`${$e}-ping-right`]: Le,
                          [`${$e}-ping-top`]: ze,
                          [`${$e}-ping-bottom`]: rn
                        }),
                        ref: i
                      },
                      [
                        s(
                          kt,
                          { onResize: ye },
                          {
                            default: () => [
                              s(
                                'div',
                                {
                                  ref: l,
                                  class: `${ue}-nav-list`,
                                  style: {
                                    transform: `translate(${f.value}px, ${x.value}px)`,
                                    transition: H.value ? 'none' : void 0
                                  }
                                },
                                [
                                  ln,
                                  s(
                                    bo,
                                    {
                                      ref: d,
                                      prefixCls: ue,
                                      locale: X,
                                      editable: Y,
                                      style: u(
                                        u({}, ln.length === 0 ? void 0 : mt),
                                        { visibility: fe ? 'hidden' : null }
                                      )
                                    },
                                    null
                                  ),
                                  s(
                                    'div',
                                    {
                                      class: J(`${ue}-ink-bar`, {
                                        [`${ue}-ink-bar-animated`]: M.inkBar
                                      }),
                                      style: He.value
                                    },
                                    null
                                  )
                                ]
                              )
                            ]
                          }
                        )
                      ]
                    )
                  ]
                }
              ),
              s(
                nr,
                A(
                  A({}, e),
                  {},
                  {
                    removeAriaLabel: X == null ? void 0 : X.removeAriaLabel,
                    ref: m,
                    prefixCls: ue,
                    tabs: Ie.value,
                    class: !fe && I.value
                  }
                ),
                mo(o, ['moreIcon'])
              ),
              s(
                he,
                { position: 'right', prefixCls: ue, extra: o.rightExtra },
                null
              ),
              s(
                he,
                {
                  position: 'right',
                  prefixCls: ue,
                  extra: o.tabBarExtraContent
                },
                null
              )
            ]
          );
        }
      );
    }
  }),
  cr = Z({
    compatConfig: { MODE: 3 },
    name: 'TabPanelList',
    inheritAttrs: !1,
    props: {
      activeKey: { type: [String, Number] },
      id: { type: String },
      rtl: { type: Boolean },
      animated: { type: Object, default: void 0 },
      tabPosition: { type: String },
      destroyInactiveTabPane: { type: Boolean }
    },
    setup(e) {
      const { tabs: t, prefixCls: n } = ho();
      return () => {
        const {
            id: o,
            activeKey: a,
            animated: r,
            tabPosition: i,
            rtl: l,
            destroyInactiveTabPane: m
          } = e,
          d = r.tabPane,
          c = n.value,
          v = t.value.findIndex(g => g.key === a);
        return s('div', { class: `${c}-content-holder` }, [
          s(
            'div',
            {
              class: [
                `${c}-content`,
                `${c}-content-${i}`,
                { [`${c}-content-animated`]: d }
              ],
              style:
                v && d
                  ? { [l ? 'marginRight' : 'marginLeft']: `-${v}00%` }
                  : null
            },
            [
              t.value.map(g =>
                Aa(g.node, {
                  key: g.key,
                  prefixCls: c,
                  tabKey: g.key,
                  id: o,
                  animated: d,
                  active: g.key === a,
                  destroyInactiveTabPane: m
                })
              )
            ]
          )
        ]);
      };
    }
  });
function Sn(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        ur(e, a, n[a]);
      });
  }
  return e;
}
function ur(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var Ut = function(t, n) {
  var o = Sn({}, t, n.attrs);
  return s(Ae, Sn({}, o, { icon: Ya }), null);
};
Ut.displayName = 'PlusOutlined';
Ut.inheritAttrs = !1;
const dr = Ut,
  fr = e => {
    const { componentCls: t, motionDurationSlow: n } = e;
    return [
      {
        [t]: {
          [`${t}-switch`]: {
            '&-appear, &-enter': {
              transition: 'none',
              '&-start': { opacity: 0 },
              '&-active': { opacity: 1, transition: `opacity ${n}` }
            },
            '&-leave': {
              position: 'absolute',
              transition: 'none',
              inset: 0,
              '&-start': { opacity: 1 },
              '&-active': { opacity: 0, transition: `opacity ${n}` }
            }
          }
        }
      },
      [dn(e, 'slide-up'), dn(e, 'slide-down')]
    ];
  },
  pr = fr,
  vr = e => {
    const {
      componentCls: t,
      tabsCardHorizontalPadding: n,
      tabsCardHeadBackground: o,
      tabsCardGutter: a,
      colorSplit: r
    } = e;
    return {
      [`${t}-card`]: {
        [`> ${t}-nav, > div > ${t}-nav`]: {
          [`${t}-tab`]: {
            margin: 0,
            padding: n,
            background: o,
            border: `${e.lineWidth}px ${e.lineType} ${r}`,
            transition: `all ${e.motionDurationSlow} ${e.motionEaseInOut}`
          },
          [`${t}-tab-active`]: {
            color: e.colorPrimary,
            background: e.colorBgContainer
          },
          [`${t}-ink-bar`]: { visibility: 'hidden' }
        },
        [`&${t}-top, &${t}-bottom`]: {
          [`> ${t}-nav, > div > ${t}-nav`]: {
            [`${t}-tab + ${t}-tab`]: {
              marginLeft: { _skip_check_: !0, value: `${a}px` }
            }
          }
        },
        [`&${t}-top`]: {
          [`> ${t}-nav, > div > ${t}-nav`]: {
            [`${t}-tab`]: {
              borderRadius: `${e.borderRadiusLG}px ${e.borderRadiusLG}px 0 0`
            },
            [`${t}-tab-active`]: { borderBottomColor: e.colorBgContainer }
          }
        },
        [`&${t}-bottom`]: {
          [`> ${t}-nav, > div > ${t}-nav`]: {
            [`${t}-tab`]: {
              borderRadius: `0 0 ${e.borderRadiusLG}px ${e.borderRadiusLG}px`
            },
            [`${t}-tab-active`]: { borderTopColor: e.colorBgContainer }
          }
        },
        [`&${t}-left, &${t}-right`]: {
          [`> ${t}-nav, > div > ${t}-nav`]: {
            [`${t}-tab + ${t}-tab`]: { marginTop: `${a}px` }
          }
        },
        [`&${t}-left`]: {
          [`> ${t}-nav, > div > ${t}-nav`]: {
            [`${t}-tab`]: {
              borderRadius: {
                _skip_check_: !0,
                value: `${e.borderRadiusLG}px 0 0 ${e.borderRadiusLG}px`
              }
            },
            [`${t}-tab-active`]: {
              borderRightColor: { _skip_check_: !0, value: e.colorBgContainer }
            }
          }
        },
        [`&${t}-right`]: {
          [`> ${t}-nav, > div > ${t}-nav`]: {
            [`${t}-tab`]: {
              borderRadius: {
                _skip_check_: !0,
                value: `0 ${e.borderRadiusLG}px ${e.borderRadiusLG}px 0`
              }
            },
            [`${t}-tab-active`]: {
              borderLeftColor: { _skip_check_: !0, value: e.colorBgContainer }
            }
          }
        }
      }
    };
  },
  mr = e => {
    const {
      componentCls: t,
      tabsHoverColor: n,
      dropdownEdgeChildVerticalPadding: o
    } = e;
    return {
      [`${t}-dropdown`]: u(u({}, Pt(e)), {
        position: 'absolute',
        top: -9999,
        left: { _skip_check_: !0, value: -9999 },
        zIndex: e.zIndexPopup,
        display: 'block',
        '&-hidden': { display: 'none' },
        [`${t}-dropdown-menu`]: {
          maxHeight: e.tabsDropdownHeight,
          margin: 0,
          padding: `${o}px 0`,
          overflowX: 'hidden',
          overflowY: 'auto',
          textAlign: { _skip_check_: !0, value: 'left' },
          listStyleType: 'none',
          backgroundColor: e.colorBgContainer,
          backgroundClip: 'padding-box',
          borderRadius: e.borderRadiusLG,
          outline: 'none',
          boxShadow: e.boxShadowSecondary,
          '&-item': u(u({}, Kn), {
            display: 'flex',
            alignItems: 'center',
            minWidth: e.tabsDropdownWidth,
            margin: 0,
            padding: `${e.paddingXXS}px ${e.paddingSM}px`,
            color: e.colorText,
            fontWeight: 'normal',
            fontSize: e.fontSize,
            lineHeight: e.lineHeight,
            cursor: 'pointer',
            transition: `all ${e.motionDurationSlow}`,
            '> span': { flex: 1, whiteSpace: 'nowrap' },
            '&-remove': {
              flex: 'none',
              marginLeft: { _skip_check_: !0, value: e.marginSM },
              color: e.colorTextDescription,
              fontSize: e.fontSizeSM,
              background: 'transparent',
              border: 0,
              cursor: 'pointer',
              '&:hover': { color: n }
            },
            '&:hover': { background: e.controlItemBgHover },
            '&-disabled': {
              '&, &:hover': {
                color: e.colorTextDisabled,
                background: 'transparent',
                cursor: 'not-allowed'
              }
            }
          })
        }
      })
    };
  },
  gr = e => {
    const { componentCls: t, margin: n, colorSplit: o } = e;
    return {
      [`${t}-top, ${t}-bottom`]: {
        flexDirection: 'column',
        [`> ${t}-nav, > div > ${t}-nav`]: {
          margin: `0 0 ${n}px 0`,
          '&::before': {
            position: 'absolute',
            right: { _skip_check_: !0, value: 0 },
            left: { _skip_check_: !0, value: 0 },
            borderBottom: `${e.lineWidth}px ${e.lineType} ${o}`,
            content: "''"
          },
          [`${t}-ink-bar`]: {
            height: e.lineWidthBold,
            '&-animated': {
              transition: `width ${e.motionDurationSlow}, left ${e.motionDurationSlow},
            right ${e.motionDurationSlow}`
            }
          },
          [`${t}-nav-wrap`]: {
            '&::before, &::after': {
              top: 0,
              bottom: 0,
              width: e.controlHeight
            },
            '&::before': {
              left: { _skip_check_: !0, value: 0 },
              boxShadow: e.boxShadowTabsOverflowLeft
            },
            '&::after': {
              right: { _skip_check_: !0, value: 0 },
              boxShadow: e.boxShadowTabsOverflowRight
            },
            [`&${t}-nav-wrap-ping-left::before`]: { opacity: 1 },
            [`&${t}-nav-wrap-ping-right::after`]: { opacity: 1 }
          }
        }
      },
      [`${t}-top`]: {
        [`> ${t}-nav,
        > div > ${t}-nav`]: {
          '&::before': { bottom: 0 },
          [`${t}-ink-bar`]: { bottom: 0 }
        }
      },
      [`${t}-bottom`]: {
        [`> ${t}-nav, > div > ${t}-nav`]: {
          order: 1,
          marginTop: `${n}px`,
          marginBottom: 0,
          '&::before': { top: 0 },
          [`${t}-ink-bar`]: { top: 0 }
        },
        [`> ${t}-content-holder, > div > ${t}-content-holder`]: { order: 0 }
      },
      [`${t}-left, ${t}-right`]: {
        [`> ${t}-nav, > div > ${t}-nav`]: {
          flexDirection: 'column',
          minWidth: e.controlHeight * 1.25,
          [`${t}-tab`]: {
            padding: `${e.paddingXS}px ${e.paddingLG}px`,
            textAlign: 'center'
          },
          [`${t}-tab + ${t}-tab`]: { margin: `${e.margin}px 0 0 0` },
          [`${t}-nav-wrap`]: {
            flexDirection: 'column',
            '&::before, &::after': {
              right: { _skip_check_: !0, value: 0 },
              left: { _skip_check_: !0, value: 0 },
              height: e.controlHeight
            },
            '&::before': { top: 0, boxShadow: e.boxShadowTabsOverflowTop },
            '&::after': { bottom: 0, boxShadow: e.boxShadowTabsOverflowBottom },
            [`&${t}-nav-wrap-ping-top::before`]: { opacity: 1 },
            [`&${t}-nav-wrap-ping-bottom::after`]: { opacity: 1 }
          },
          [`${t}-ink-bar`]: {
            width: e.lineWidthBold,
            '&-animated': {
              transition: `height ${e.motionDurationSlow}, top ${e.motionDurationSlow}`
            }
          },
          [`${t}-nav-list, ${t}-nav-operations`]: {
            flex: '1 0 auto',
            flexDirection: 'column'
          }
        }
      },
      [`${t}-left`]: {
        [`> ${t}-nav, > div > ${t}-nav`]: {
          [`${t}-ink-bar`]: { right: { _skip_check_: !0, value: 0 } }
        },
        [`> ${t}-content-holder, > div > ${t}-content-holder`]: {
          marginLeft: { _skip_check_: !0, value: `-${e.lineWidth}px` },
          borderLeft: {
            _skip_check_: !0,
            value: `${e.lineWidth}px ${e.lineType} ${e.colorBorder}`
          },
          [`> ${t}-content > ${t}-tabpane`]: {
            paddingLeft: { _skip_check_: !0, value: e.paddingLG }
          }
        }
      },
      [`${t}-right`]: {
        [`> ${t}-nav, > div > ${t}-nav`]: {
          order: 1,
          [`${t}-ink-bar`]: { left: { _skip_check_: !0, value: 0 } }
        },
        [`> ${t}-content-holder, > div > ${t}-content-holder`]: {
          order: 0,
          marginRight: { _skip_check_: !0, value: -e.lineWidth },
          borderRight: {
            _skip_check_: !0,
            value: `${e.lineWidth}px ${e.lineType} ${e.colorBorder}`
          },
          [`> ${t}-content > ${t}-tabpane`]: {
            paddingRight: { _skip_check_: !0, value: e.paddingLG }
          }
        }
      }
    };
  },
  br = e => {
    const { componentCls: t, padding: n } = e;
    return {
      [t]: {
        '&-small': {
          [`> ${t}-nav`]: {
            [`${t}-tab`]: {
              padding: `${e.paddingXS}px 0`,
              fontSize: e.fontSize
            }
          }
        },
        '&-large': {
          [`> ${t}-nav`]: {
            [`${t}-tab`]: { padding: `${n}px 0`, fontSize: e.fontSizeLG }
          }
        }
      },
      [`${t}-card`]: {
        [`&${t}-small`]: {
          [`> ${t}-nav`]: {
            [`${t}-tab`]: { padding: `${e.paddingXXS * 1.5}px ${n}px` }
          },
          [`&${t}-bottom`]: {
            [`> ${t}-nav ${t}-tab`]: {
              borderRadius: `0 0 ${e.borderRadius}px ${e.borderRadius}px`
            }
          },
          [`&${t}-top`]: {
            [`> ${t}-nav ${t}-tab`]: {
              borderRadius: `${e.borderRadius}px ${e.borderRadius}px 0 0`
            }
          },
          [`&${t}-right`]: {
            [`> ${t}-nav ${t}-tab`]: {
              borderRadius: {
                _skip_check_: !0,
                value: `0 ${e.borderRadius}px ${e.borderRadius}px 0`
              }
            }
          },
          [`&${t}-left`]: {
            [`> ${t}-nav ${t}-tab`]: {
              borderRadius: {
                _skip_check_: !0,
                value: `${e.borderRadius}px 0 0 ${e.borderRadius}px`
              }
            }
          }
        },
        [`&${t}-large`]: {
          [`> ${t}-nav`]: {
            [`${t}-tab`]: {
              padding: `${e.paddingXS}px ${n}px ${e.paddingXXS * 1.5}px`
            }
          }
        }
      }
    };
  },
  yr = e => {
    const {
        componentCls: t,
        tabsActiveColor: n,
        tabsHoverColor: o,
        iconCls: a,
        tabsHorizontalGutter: r
      } = e,
      i = `${t}-tab`;
    return {
      [i]: {
        position: 'relative',
        display: 'inline-flex',
        alignItems: 'center',
        padding: `${e.paddingSM}px 0`,
        fontSize: `${e.fontSize}px`,
        background: 'transparent',
        border: 0,
        outline: 'none',
        cursor: 'pointer',
        '&-btn, &-remove': u(
          { '&:focus:not(:focus-visible), &:active': { color: n } },
          Ft(e)
        ),
        '&-btn': { outline: 'none', transition: 'all 0.3s' },
        '&-remove': {
          flex: 'none',
          marginRight: { _skip_check_: !0, value: -e.marginXXS },
          marginLeft: { _skip_check_: !0, value: e.marginXS },
          color: e.colorTextDescription,
          fontSize: e.fontSizeSM,
          background: 'transparent',
          border: 'none',
          outline: 'none',
          cursor: 'pointer',
          transition: `all ${e.motionDurationSlow}`,
          '&:hover': { color: e.colorTextHeading }
        },
        '&:hover': { color: o },
        [`&${i}-active ${i}-btn`]: {
          color: e.colorPrimary,
          textShadow: e.tabsActiveTextShadow
        },
        [`&${i}-disabled`]: {
          color: e.colorTextDisabled,
          cursor: 'not-allowed'
        },
        [`&${i}-disabled ${i}-btn, &${i}-disabled ${t}-remove`]: {
          '&:focus, &:active': { color: e.colorTextDisabled }
        },
        [`& ${i}-remove ${a}`]: { margin: 0 },
        [a]: { marginRight: { _skip_check_: !0, value: e.marginSM } }
      },
      [`${i} + ${i}`]: { margin: { _skip_check_: !0, value: `0 0 0 ${r}px` } }
    };
  },
  hr = e => {
    const {
      componentCls: t,
      tabsHorizontalGutter: n,
      iconCls: o,
      tabsCardGutter: a
    } = e;
    return {
      [`${t}-rtl`]: {
        direction: 'rtl',
        [`${t}-nav`]: {
          [`${t}-tab`]: {
            margin: { _skip_check_: !0, value: `0 0 0 ${n}px` },
            [`${t}-tab:last-of-type`]: {
              marginLeft: { _skip_check_: !0, value: 0 }
            },
            [o]: {
              marginRight: { _skip_check_: !0, value: 0 },
              marginLeft: { _skip_check_: !0, value: `${e.marginSM}px` }
            },
            [`${t}-tab-remove`]: {
              marginRight: { _skip_check_: !0, value: `${e.marginXS}px` },
              marginLeft: { _skip_check_: !0, value: `-${e.marginXXS}px` },
              [o]: { margin: 0 }
            }
          }
        },
        [`&${t}-left`]: {
          [`> ${t}-nav`]: { order: 1 },
          [`> ${t}-content-holder`]: { order: 0 }
        },
        [`&${t}-right`]: {
          [`> ${t}-nav`]: { order: 0 },
          [`> ${t}-content-holder`]: { order: 1 }
        },
        [`&${t}-card${t}-top, &${t}-card${t}-bottom`]: {
          [`> ${t}-nav, > div > ${t}-nav`]: {
            [`${t}-tab + ${t}-tab`]: {
              marginRight: { _skip_check_: !0, value: `${a}px` },
              marginLeft: { _skip_check_: !0, value: 0 }
            }
          }
        }
      },
      [`${t}-dropdown-rtl`]: { direction: 'rtl' },
      [`${t}-menu-item`]: {
        [`${t}-dropdown-rtl`]: {
          textAlign: { _skip_check_: !0, value: 'right' }
        }
      }
    };
  },
  Cr = e => {
    const {
      componentCls: t,
      tabsCardHorizontalPadding: n,
      tabsCardHeight: o,
      tabsCardGutter: a,
      tabsHoverColor: r,
      tabsActiveColor: i,
      colorSplit: l
    } = e;
    return {
      [t]: u(
        u(
          u(u({}, Pt(e)), {
            display: 'flex',
            [`> ${t}-nav, > div > ${t}-nav`]: {
              position: 'relative',
              display: 'flex',
              flex: 'none',
              alignItems: 'center',
              [`${t}-nav-wrap`]: {
                position: 'relative',
                display: 'flex',
                flex: 'auto',
                alignSelf: 'stretch',
                overflow: 'hidden',
                whiteSpace: 'nowrap',
                transform: 'translate(0)',
                '&::before, &::after': {
                  position: 'absolute',
                  zIndex: 1,
                  opacity: 0,
                  transition: `opacity ${e.motionDurationSlow}`,
                  content: "''",
                  pointerEvents: 'none'
                }
              },
              [`${t}-nav-list`]: {
                position: 'relative',
                display: 'flex',
                transition: `opacity ${e.motionDurationSlow}`
              },
              [`${t}-nav-operations`]: {
                display: 'flex',
                alignSelf: 'stretch'
              },
              [`${t}-nav-operations-hidden`]: {
                position: 'absolute',
                visibility: 'hidden',
                pointerEvents: 'none'
              },
              [`${t}-nav-more`]: {
                position: 'relative',
                padding: n,
                background: 'transparent',
                border: 0,
                '&::after': {
                  position: 'absolute',
                  right: { _skip_check_: !0, value: 0 },
                  bottom: 0,
                  left: { _skip_check_: !0, value: 0 },
                  height: e.controlHeightLG / 8,
                  transform: 'translateY(100%)',
                  content: "''"
                }
              },
              [`${t}-nav-add`]: u(
                {
                  minWidth: `${o}px`,
                  marginLeft: { _skip_check_: !0, value: `${a}px` },
                  padding: `0 ${e.paddingXS}px`,
                  background: 'transparent',
                  border: `${e.lineWidth}px ${e.lineType} ${l}`,
                  borderRadius: `${e.borderRadiusLG}px ${e.borderRadiusLG}px 0 0`,
                  outline: 'none',
                  cursor: 'pointer',
                  color: e.colorText,
                  transition: `all ${e.motionDurationSlow} ${e.motionEaseInOut}`,
                  '&:hover': { color: r },
                  '&:active, &:focus:not(:focus-visible)': { color: i }
                },
                Ft(e)
              )
            },
            [`${t}-extra-content`]: { flex: 'none' },
            [`${t}-ink-bar`]: {
              position: 'absolute',
              background: e.colorPrimary,
              pointerEvents: 'none'
            }
          }),
          yr(e)
        ),
        {
          [`${t}-content`]: {
            position: 'relative',
            display: 'flex',
            width: '100%',
            '&-animated': { transition: 'margin 0.3s' }
          },
          [`${t}-content-holder`]: { flex: 'auto', minWidth: 0, minHeight: 0 },
          [`${t}-tabpane`]: { outline: 'none', flex: 'none', width: '100%' }
        }
      ),
      [`${t}-centered`]: {
        [`> ${t}-nav, > div > ${t}-nav`]: {
          [`${t}-nav-wrap`]: {
            [`&:not([class*='${t}-nav-wrap-ping'])`]: {
              justifyContent: 'center'
            }
          }
        }
      }
    };
  },
  xr = Tt(
    'Tabs',
    e => {
      const t = e.controlHeightLG,
        n = Ct(e, {
          tabsHoverColor: e.colorPrimaryHover,
          tabsActiveColor: e.colorPrimaryActive,
          tabsCardHorizontalPadding: `${(t -
            Math.round(e.fontSize * e.lineHeight)) /
            2 -
            e.lineWidth}px ${e.padding}px`,
          tabsCardHeight: t,
          tabsCardGutter: e.marginXXS / 2,
          tabsHorizontalGutter: 32,
          tabsCardHeadBackground: e.colorFillAlter,
          dropdownEdgeChildVerticalPadding: e.paddingXXS,
          tabsActiveTextShadow: '0 0 0.25px currentcolor',
          tabsDropdownHeight: 200,
          tabsDropdownWidth: 120
        });
      return [br(n), hr(n), gr(n), mr(n), vr(n), Cr(n), pr(n)];
    },
    e => ({ zIndexPopup: e.zIndexPopupBase + 50 })
  );
let wn = 0;
const Co = () => ({
  prefixCls: { type: String },
  id: { type: String },
  popupClassName: String,
  getPopupContainer: Se(),
  activeKey: { type: [String, Number] },
  defaultActiveKey: { type: [String, Number] },
  direction: gt(),
  animated: Go([Boolean, Object]),
  renderTabBar: Se(),
  tabBarGutter: { type: Number },
  tabBarStyle: Pe(),
  tabPosition: gt(),
  destroyInactiveTabPane: Vo(),
  hideAdd: Boolean,
  type: gt(),
  size: gt(),
  centered: Boolean,
  onEdit: Se(),
  onChange: Se(),
  onTabClick: Se(),
  onTabScroll: Se(),
  'onUpdate:activeKey': Se(),
  locale: Pe(),
  onPrevClick: Se(),
  onNextClick: Se(),
  tabBarExtraContent: te.any
});
function $r(e) {
  return e
    .map(t => {
      if (Xo(t)) {
        const n = u({}, t.props || {});
        for (const [g, f] of Object.entries(n)) delete n[g], (n[Ko(g)] = f);
        const o = t.children || {},
          a = t.key !== void 0 ? t.key : void 0,
          {
            tab: r = o.tab,
            disabled: i,
            forceRender: l,
            closable: m,
            animated: d,
            active: c,
            destroyInactiveTabPane: v
          } = n;
        return u(u({ key: a }, n), {
          node: t,
          closeIcon: o.closeIcon,
          tab: r,
          disabled: i === '' || i,
          forceRender: l === '' || l,
          closable: m === '' || m,
          animated: d === '' || d,
          active: c === '' || c,
          destroyInactiveTabPane: v === '' || v
        });
      }
      return null;
    })
    .filter(t => t);
}
const Sr = Z({
    compatConfig: { MODE: 3 },
    name: 'InternalTabs',
    inheritAttrs: !1,
    props: u(
      u(
        {},
        ot(Co(), { tabPosition: 'top', animated: { inkBar: !0, tabPane: !1 } })
      ),
      { tabs: Uo() }
    ),
    slots: Object,
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      Rt(
        e.onPrevClick === void 0 && e.onNextClick === void 0,
        'Tabs',
        '`onPrevClick / @prevClick` and `onNextClick / @nextClick` has been removed. Please use `onTabScroll / @tabScroll` instead.'
      ),
        Rt(
          e.tabBarExtraContent === void 0,
          'Tabs',
          '`tabBarExtraContent` prop has been removed. Please use `rightExtra` slot instead.'
        ),
        Rt(
          o.tabBarExtraContent === void 0,
          'Tabs',
          '`tabBarExtraContent` slot is deprecated. Please use `rightExtra` slot instead.'
        );
      const {
          prefixCls: a,
          direction: r,
          size: i,
          rootPrefixCls: l,
          getPopupContainer: m
        } = nt('tabs', e),
        [d, c] = xr(a),
        v = B(() => r.value === 'rtl'),
        g = B(() => {
          const { animated: T, tabPosition: N } = e;
          return T === !1 || ['left', 'right'].includes(N)
            ? { inkBar: !1, tabPane: !1 }
            : T === !0
            ? { inkBar: !0, tabPane: !0 }
            : u({ inkBar: !0, tabPane: !1 }, typeof T == 'object' ? T : {});
        }),
        [f, C] = de(!1);
      _e(() => {
        C(Ba());
      });
      const [x, $] = ct(
          () => {
            var T;
            return (T = e.tabs[0]) === null || T === void 0 ? void 0 : T.key;
          },
          { value: B(() => e.activeKey), defaultValue: e.defaultActiveKey }
        ),
        [h, S] = de(() => e.tabs.findIndex(T => T.key === x.value));
      Ye(() => {
        var T;
        let N = e.tabs.findIndex(z => z.key === x.value);
        N === -1 &&
          ((N = Math.max(0, Math.min(h.value, e.tabs.length - 1))),
          $((T = e.tabs[N]) === null || T === void 0 ? void 0 : T.key)),
          S(N);
      });
      const [b, _] = ct(null, { value: B(() => e.id) }),
        p = B(() =>
          f.value && !['left', 'right'].includes(e.tabPosition)
            ? 'top'
            : e.tabPosition
        );
      _e(() => {
        e.id || (_(`rc-tabs-${wn}`), (wn += 1));
      });
      const P = (T, N) => {
        var z, R;
        (z = e.onTabClick) === null || z === void 0 || z.call(e, T, N);
        const F = T !== x.value;
        $(T), F && ((R = e.onChange) === null || R === void 0 || R.call(e, T));
      };
      return (
        or({ tabs: B(() => e.tabs), prefixCls: a }),
        () => {
          const {
              id: T,
              type: N,
              tabBarGutter: z,
              tabBarStyle: R,
              locale: F,
              destroyInactiveTabPane: Q,
              renderTabBar: K = o.renderTabBar,
              onTabScroll: ee,
              hideAdd: y,
              centered: I
            } = e,
            E = {
              id: b.value,
              activeKey: x.value,
              animated: g.value,
              tabPosition: p.value,
              rtl: v.value,
              mobile: f.value
            };
          let O;
          N === 'editable-card' &&
            (O = {
              onEdit: (oe, le) => {
                let { key: q, event: ae } = le;
                var U;
                (U = e.onEdit) === null ||
                  U === void 0 ||
                  U.call(e, oe === 'add' ? ae : q, oe);
              },
              removeIcon: () => s(Wt, null, null),
              addIcon: o.addIcon ? o.addIcon : () => s(dr, null, null),
              showAdd: y !== !0
            });
          let L;
          const W = u(u({}, E), {
            moreTransitionName: `${l.value}-slide-up`,
            editable: O,
            locale: F,
            tabBarGutter: z,
            onTabClick: P,
            onTabScroll: ee,
            style: R,
            getPopupContainer: m.value,
            popupClassName: J(e.popupClassName, c.value)
          });
          K
            ? (L = K(u(u({}, W), { DefaultTabBar: $n })))
            : (L = s(
                $n,
                W,
                mo(o, [
                  'moreIcon',
                  'leftExtra',
                  'rightExtra',
                  'tabBarExtraContent'
                ])
              ));
          const H = a.value;
          return d(
            s(
              'div',
              A(
                A({}, n),
                {},
                {
                  id: T,
                  class: J(
                    H,
                    `${H}-${p.value}`,
                    {
                      [c.value]: !0,
                      [`${H}-${i.value}`]: i.value,
                      [`${H}-card`]: ['card', 'editable-card'].includes(N),
                      [`${H}-editable-card`]: N === 'editable-card',
                      [`${H}-centered`]: I,
                      [`${H}-mobile`]: f.value,
                      [`${H}-editable`]: N === 'editable-card',
                      [`${H}-rtl`]: v.value
                    },
                    n.class
                  )
                }
              ),
              [
                L,
                s(
                  cr,
                  A(
                    A({ destroyInactiveTabPane: Q }, E),
                    {},
                    { animated: g.value }
                  ),
                  null
                )
              ]
            )
          );
        }
      );
    }
  }),
  st = Z({
    compatConfig: { MODE: 3 },
    name: 'ATabs',
    inheritAttrs: !1,
    props: ot(Co(), {
      tabPosition: 'top',
      animated: { inkBar: !0, tabPane: !1 }
    }),
    slots: Object,
    setup(e, t) {
      let { attrs: n, slots: o, emit: a } = t;
      const r = i => {
        a('update:activeKey', i), a('change', i);
      };
      return () => {
        var i;
        const l = $r(
          Wo((i = o.default) === null || i === void 0 ? void 0 : i.call(o))
        );
        return s(
          Sr,
          A(
            A(A({}, Be(e, ['onUpdate:activeKey'])), n),
            {},
            { onChange: r, tabs: l }
          ),
          o
        );
      };
    }
  }),
  wr = () => ({
    tab: te.any,
    disabled: { type: Boolean },
    forceRender: { type: Boolean },
    closable: { type: Boolean },
    animated: { type: Boolean },
    active: { type: Boolean },
    destroyInactiveTabPane: { type: Boolean },
    prefixCls: { type: String },
    tabKey: { type: [String, Number] },
    id: { type: String }
  }),
  St = Z({
    compatConfig: { MODE: 3 },
    name: 'ATabPane',
    inheritAttrs: !1,
    __ANT_TAB_PANE: !0,
    props: wr(),
    slots: Object,
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      const a = G(e.forceRender);
      ne(
        [() => e.active, () => e.destroyInactiveTabPane],
        () => {
          e.active
            ? (a.value = !0)
            : e.destroyInactiveTabPane && (a.value = !1);
        },
        { immediate: !0 }
      );
      const r = B(() =>
        e.active
          ? {}
          : e.animated
          ? { visibility: 'hidden', height: 0, overflowY: 'hidden' }
          : { display: 'none' }
      );
      return () => {
        var i;
        const { prefixCls: l, forceRender: m, id: d, active: c, tabKey: v } = e;
        return s(
          'div',
          {
            id: d && `${d}-panel-${v}`,
            role: 'tabpanel',
            tabindex: c ? 0 : -1,
            'aria-labelledby': d && `${d}-tab-${v}`,
            'aria-hidden': !c,
            style: [r.value, n.style],
            class: [`${l}-tabpane`, c && `${l}-tabpane-active`, n.class]
          },
          [
            (c || a.value || m) &&
              ((i = o.default) === null || i === void 0 ? void 0 : i.call(o))
          ]
        );
      };
    }
  });
st.TabPane = St;
st.install = function(e) {
  return e.component(st.name, st), e.component(St.name, St), e;
};
function Tn(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        Tr(e, a, n[a]);
      });
  }
  return e;
}
function Tr(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var Yt = function(t, n) {
  var o = Tn({}, t, n.attrs);
  return s(Ae, Tn({}, o, { icon: Za }), null);
};
Yt.displayName = 'CopyOutlined';
Yt.inheritAttrs = !1;
const Pr = Yt;
function Pn(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        Or(e, a, n[a]);
      });
  }
  return e;
}
function Or(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var Zt = function(t, n) {
  var o = Pn({}, t, n.attrs);
  return s(Ae, Pn({}, o, { icon: Qa }), null);
};
Zt.displayName = 'EditOutlined';
Zt.inheritAttrs = !1;
const _r = Zt;
function On(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        Ir(e, a, n[a]);
      });
  }
  return e;
}
function Ir(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var Qt = function(t, n) {
  var o = On({}, t, n.attrs);
  return s(Ae, On({}, o, { icon: qa }), null);
};
Qt.displayName = 'EnterOutlined';
Qt.inheritAttrs = !1;
const Er = Qt;
function _n(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        Nr(e, a, n[a]);
      });
  }
  return e;
}
function Nr(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var qt = function(t, n) {
  var o = _n({}, t, n.attrs);
  return s(Ae, _n({}, o, { icon: Ja }), null);
};
qt.displayName = 'RotateLeftOutlined';
qt.inheritAttrs = !1;
const Mr = qt;
function In(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        Ar(e, a, n[a]);
      });
  }
  return e;
}
function Ar(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var Jt = function(t, n) {
  var o = In({}, t, n.attrs);
  return s(Ae, In({}, o, { icon: ei }), null);
};
Jt.displayName = 'RotateRightOutlined';
Jt.inheritAttrs = !1;
const Br = Jt;
function En(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        Rr(e, a, n[a]);
      });
  }
  return e;
}
function Rr(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var en = function(t, n) {
  var o = En({}, t, n.attrs);
  return s(Ae, En({}, o, { icon: ti }), null);
};
en.displayName = 'SwapOutlined';
en.inheritAttrs = !1;
const Nn = en;
function Mn(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        Dr(e, a, n[a]);
      });
  }
  return e;
}
function Dr(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var tn = function(t, n) {
  var o = Mn({}, t, n.attrs);
  return s(Ae, Mn({}, o, { icon: ni }), null);
};
tn.displayName = 'ZoomInOutlined';
tn.inheritAttrs = !1;
const Lr = tn;
function An(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(a) {
          return Object.getOwnPropertyDescriptor(n, a).enumerable;
        })
      )),
      o.forEach(function(a) {
        zr(e, a, n[a]);
      });
  }
  return e;
}
function zr(e, t, n) {
  return (
    t in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[t] = n),
    e
  );
}
var nn = function(t, n) {
  var o = An({}, t, n.attrs);
  return s(Ae, An({}, o, { icon: oi }), null);
};
nn.displayName = 'ZoomOutOutlined';
nn.inheritAttrs = !1;
const kr = nn;
function _t() {
  return {
    keyboard: { type: Boolean, default: void 0 },
    mask: { type: Boolean, default: void 0 },
    afterClose: Function,
    closable: { type: Boolean, default: void 0 },
    maskClosable: { type: Boolean, default: void 0 },
    visible: { type: Boolean, default: void 0 },
    destroyOnClose: { type: Boolean, default: void 0 },
    mousePosition: te.shape({ x: Number, y: Number }).loose,
    title: te.any,
    footer: te.any,
    transitionName: String,
    maskTransitionName: String,
    animation: te.any,
    maskAnimation: te.any,
    wrapStyle: { type: Object, default: void 0 },
    bodyStyle: { type: Object, default: void 0 },
    maskStyle: { type: Object, default: void 0 },
    prefixCls: String,
    wrapClassName: String,
    rootClassName: String,
    width: [String, Number],
    height: [String, Number],
    zIndex: Number,
    bodyProps: te.any,
    maskProps: te.any,
    wrapProps: te.any,
    getContainer: te.any,
    dialogStyle: { type: Object, default: void 0 },
    dialogClass: String,
    closeIcon: te.any,
    forceRender: { type: Boolean, default: void 0 },
    getOpenCount: Function,
    focusTriggerAfterClose: { type: Boolean, default: void 0 },
    onClose: Function,
    modalRender: Function
  };
}
function Bn(e, t, n) {
  let o = t;
  return !o && n && (o = `${e}-${n}`), o;
}
let Rn = -1;
function jr() {
  return (Rn += 1), Rn;
}
function Dn(e, t) {
  let n = e[`page${t ? 'Y' : 'X'}Offset`];
  const o = `scroll${t ? 'Top' : 'Left'}`;
  if (typeof n != 'number') {
    const a = e.document;
    (n = a.documentElement[o]), typeof n != 'number' && (n = a.body[o]);
  }
  return n;
}
function Hr(e) {
  const t = e.getBoundingClientRect(),
    n = { left: t.left, top: t.top },
    o = e.ownerDocument,
    a = o.defaultView || o.parentWindow;
  return (n.left += Dn(a)), (n.top += Dn(a, !0)), n;
}
const Ln = { width: 0, height: 0, overflow: 'hidden', outline: 'none' },
  Fr = Z({
    compatConfig: { MODE: 3 },
    name: 'DialogContent',
    inheritAttrs: !1,
    props: u(u({}, _t()), {
      motionName: String,
      ariaId: String,
      onVisibleChanged: Function,
      onMousedown: Function,
      onMouseup: Function
    }),
    setup(e, t) {
      let { expose: n, slots: o, attrs: a } = t;
      const r = G(),
        i = G(),
        l = G();
      n({
        focus: () => {
          var g;
          (g = r.value) === null || g === void 0 || g.focus();
        },
        changeActive: g => {
          const { activeElement: f } = document;
          g && f === i.value
            ? r.value.focus()
            : !g && f === r.value && i.value.focus();
        }
      });
      const m = G(),
        d = B(() => {
          const { width: g, height: f } = e,
            C = {};
          return (
            g !== void 0 && (C.width = typeof g == 'number' ? `${g}px` : g),
            f !== void 0 && (C.height = typeof f == 'number' ? `${f}px` : f),
            m.value && (C.transformOrigin = m.value),
            C
          );
        }),
        c = () => {
          zt(() => {
            if (l.value) {
              const g = Hr(l.value);
              m.value = e.mousePosition
                ? `${e.mousePosition.x - g.left}px ${e.mousePosition.y -
                    g.top}px`
                : '';
            }
          });
        },
        v = g => {
          e.onVisibleChanged(g);
        };
      return () => {
        var g, f, C, x;
        const {
          prefixCls: $,
          footer: h = (g = o.footer) === null || g === void 0
            ? void 0
            : g.call(o),
          title: S = (f = o.title) === null || f === void 0
            ? void 0
            : f.call(o),
          ariaId: b,
          closable: _,
          closeIcon: p = (C = o.closeIcon) === null || C === void 0
            ? void 0
            : C.call(o),
          onClose: P,
          bodyStyle: T,
          bodyProps: N,
          onMousedown: z,
          onMouseup: R,
          visible: F,
          modalRender: Q = o.modalRender,
          destroyOnClose: K,
          motionName: ee
        } = e;
        let y;
        h && (y = s('div', { class: `${$}-footer` }, [h]));
        let I;
        S &&
          (I = s('div', { class: `${$}-header` }, [
            s('div', { class: `${$}-title`, id: b }, [S])
          ]));
        let E;
        _ &&
          (E = s(
            'button',
            {
              type: 'button',
              onClick: P,
              'aria-label': 'Close',
              class: `${$}-close`
            },
            [p || s('span', { class: `${$}-close-x` }, null)]
          ));
        const O = s('div', { class: `${$}-content` }, [
            E,
            I,
            s('div', A({ class: `${$}-body`, style: T }, N), [
              (x = o.default) === null || x === void 0 ? void 0 : x.call(o)
            ]),
            y
          ]),
          L = Un(ee);
        return s(
          to,
          A(
            A({}, L),
            {},
            {
              onBeforeEnter: c,
              onAfterEnter: () => v(!0),
              onAfterLeave: () => v(!1)
            }
          ),
          {
            default: () => [
              F || !K
                ? Jn(
                    s(
                      'div',
                      A(
                        A({}, a),
                        {},
                        {
                          ref: l,
                          key: 'dialog-element',
                          role: 'document',
                          style: [d.value, a.style],
                          class: [$, a.class],
                          onMousedown: z,
                          onMouseup: R
                        }
                      ),
                      [
                        s(
                          'div',
                          {
                            tabindex: 0,
                            ref: r,
                            style: Ln,
                            'aria-hidden': 'true'
                          },
                          null
                        ),
                        Q ? Q({ originVNode: O }) : O,
                        s(
                          'div',
                          {
                            tabindex: 0,
                            ref: i,
                            style: Ln,
                            'aria-hidden': 'true'
                          },
                          null
                        )
                      ]
                    ),
                    [[eo, F]]
                  )
                : null
            ]
          }
        );
      };
    }
  }),
  Wr = Z({
    compatConfig: { MODE: 3 },
    name: 'DialogMask',
    props: {
      prefixCls: String,
      visible: Boolean,
      motionName: String,
      maskProps: Object
    },
    setup(e, t) {
      return () => {
        const { prefixCls: n, visible: o, maskProps: a, motionName: r } = e,
          i = Un(r);
        return s(to, i, {
          default: () => [
            Jn(s('div', A({ class: `${n}-mask` }, a), null), [[eo, o]])
          ]
        });
      };
    }
  }),
  zn = Z({
    compatConfig: { MODE: 3 },
    name: 'VcDialog',
    inheritAttrs: !1,
    props: ot(
      u(u({}, _t()), { getOpenCount: Function, scrollLocker: Object }),
      {
        mask: !0,
        visible: !1,
        keyboard: !0,
        closable: !0,
        maskClosable: !0,
        destroyOnClose: !1,
        prefixCls: 'rc-dialog',
        getOpenCount: () => null,
        focusTriggerAfterClose: !0
      }
    ),
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      const a = k(),
        r = k(),
        i = k(),
        l = k(e.visible),
        m = k(`vcDialogTitle${jr()}`),
        d = h => {
          var S, b;
          if (h)
            Yo(r.value, document.activeElement) ||
              ((a.value = document.activeElement),
              (S = i.value) === null || S === void 0 || S.focus());
          else {
            const _ = l.value;
            if (
              ((l.value = !1), e.mask && a.value && e.focusTriggerAfterClose)
            ) {
              try {
                a.value.focus({ preventScroll: !0 });
              } catch {}
              a.value = null;
            }
            _ && ((b = e.afterClose) === null || b === void 0 || b.call(e));
          }
        },
        c = h => {
          var S;
          (S = e.onClose) === null || S === void 0 || S.call(e, h);
        },
        v = k(!1),
        g = k(),
        f = () => {
          clearTimeout(g.value), (v.value = !0);
        },
        C = () => {
          g.value = setTimeout(() => {
            v.value = !1;
          });
        },
        x = h => {
          if (!e.maskClosable) return null;
          v.value ? (v.value = !1) : r.value === h.target && c(h);
        },
        $ = h => {
          if (e.keyboard && h.keyCode === re.ESC) {
            h.stopPropagation(), c(h);
            return;
          }
          e.visible &&
            h.keyCode === re.TAB &&
            i.value.changeActive(!h.shiftKey);
        };
      return (
        ne(
          () => e.visible,
          () => {
            e.visible && (l.value = !0);
          },
          { flush: 'post' }
        ),
        ut(() => {
          var h;
          clearTimeout(g.value),
            (h = e.scrollLocker) === null || h === void 0 || h.unLock();
        }),
        Ye(() => {
          var h, S;
          (h = e.scrollLocker) === null || h === void 0 || h.unLock(),
            l.value &&
              ((S = e.scrollLocker) === null || S === void 0 || S.lock());
        }),
        () => {
          const {
              prefixCls: h,
              mask: S,
              visible: b,
              maskTransitionName: _,
              maskAnimation: p,
              zIndex: P,
              wrapClassName: T,
              rootClassName: N,
              wrapStyle: z,
              closable: R,
              maskProps: F,
              maskStyle: Q,
              transitionName: K,
              animation: ee,
              wrapProps: y,
              title: I = o.title
            } = e,
            { style: E, class: O } = n;
          return s('div', A({ class: [`${h}-root`, N] }, Ra(e, { data: !0 })), [
            s(
              Wr,
              {
                prefixCls: h,
                visible: S && b,
                motionName: Bn(h, _, p),
                style: u({ zIndex: P }, Q),
                maskProps: F
              },
              null
            ),
            s(
              'div',
              A(
                {
                  tabIndex: -1,
                  onKeydown: $,
                  class: J(`${h}-wrap`, T),
                  ref: r,
                  onClick: x,
                  role: 'dialog',
                  'aria-labelledby': I ? m.value : null,
                  style: u(u({ zIndex: P }, z), {
                    display: l.value ? null : 'none'
                  })
                },
                y
              ),
              [
                s(
                  Fr,
                  A(
                    A({}, Be(e, ['scrollLocker'])),
                    {},
                    {
                      style: E,
                      class: O,
                      onMousedown: f,
                      onMouseup: C,
                      ref: i,
                      closable: R,
                      ariaId: m.value,
                      prefixCls: h,
                      visible: b,
                      onClose: c,
                      onVisibleChanged: d,
                      motionName: Bn(h, K, ee)
                    }
                  ),
                  o
                )
              ]
            )
          ]);
        }
      );
    }
  }),
  Gr = _t(),
  Vr = Z({
    compatConfig: { MODE: 3 },
    name: 'DialogWrap',
    inheritAttrs: !1,
    props: ot(Gr, { visible: !1 }),
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      const a = G(e.visible);
      return (
        Zo({}, { inTriggerContext: !1 }),
        ne(
          () => e.visible,
          () => {
            e.visible && (a.value = !0);
          },
          { flush: 'post' }
        ),
        () => {
          const {
            visible: r,
            getContainer: i,
            forceRender: l,
            destroyOnClose: m = !1,
            afterClose: d
          } = e;
          let c = u(u(u({}, e), n), { ref: '_component', key: 'dialog' });
          return i === !1
            ? s(zn, A(A({}, c), {}, { getOpenCount: () => 2 }), o)
            : !l && m && !a.value
            ? null
            : s(
                Da,
                { autoLock: !0, visible: r, forceRender: l, getContainer: i },
                {
                  default: v => (
                    (c = u(u(u({}, c), v), {
                      afterClose: () => {
                        d == null || d(), (a.value = !1);
                      }
                    })),
                    s(zn, c, o)
                  )
                }
              );
        }
      );
    }
  }),
  xo = Vr;
function Xr(e) {
  const t = G(null),
    n = Ke(u({}, e)),
    o = G([]),
    a = r => {
      t.value === null &&
        ((o.value = []),
        (t.value = Oe(() => {
          let i;
          o.value.forEach(l => {
            i = u(u({}, i), l);
          }),
            u(n, i),
            (t.value = null);
        }))),
        o.value.push(r);
    };
  return (
    _e(() => {
      t.value && Oe.cancel(t.value);
    }),
    [n, a]
  );
}
function kn(e, t, n, o) {
  const a = t + n,
    r = (n - o) / 2;
  if (n > o) {
    if (t > 0) return { [e]: r };
    if (t < 0 && a < o) return { [e]: -r };
  } else if (t < 0 || a > o) return { [e]: t < 0 ? r : -r };
  return {};
}
function Kr(e, t, n, o) {
  const { width: a, height: r } = La();
  let i = null;
  return (
    e <= a && t <= r
      ? (i = { x: 0, y: 0 })
      : (e > a || t > r) && (i = u(u({}, kn('x', n, e, a)), kn('y', o, t, r))),
    i
  );
}
var Ur =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var a = 0, o = Object.getOwnPropertySymbols(e); a < o.length; a++)
        t.indexOf(o[a]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[a]) &&
          (n[o[a]] = e[o[a]]);
    return n;
  };
const jn = Symbol('previewGroupContext'),
  on = {
    provide: e => {
      Qn(jn, e);
    },
    inject: () =>
      qn(jn, {
        isPreviewGroup: k(!1),
        previewUrls: B(() => new Map()),
        setPreviewUrls: () => {},
        current: G(null),
        setCurrent: () => {},
        setShowPreview: () => {},
        setMousePosition: () => {},
        registerImage: null,
        rootClassName: ''
      })
  },
  Yr = () => ({
    previewPrefixCls: String,
    preview: { type: [Boolean, Object], default: !0 },
    icons: { type: Object, default: () => ({}) }
  }),
  Zr = Z({
    compatConfig: { MODE: 3 },
    name: 'PreviewGroup',
    inheritAttrs: !1,
    props: Yr(),
    setup(e, t) {
      let { slots: n } = t;
      const o = B(() => {
          const p = {
            visible: void 0,
            onVisibleChange: () => {},
            getContainer: void 0,
            current: 0
          };
          return typeof e.preview == 'object' ? To(e.preview, p) : p;
        }),
        a = Ke(new Map()),
        r = G(),
        i = B(() => o.value.visible),
        l = B(() => o.value.getContainer),
        m = (p, P) => {
          var T, N;
          (N = (T = o.value).onVisibleChange) === null ||
            N === void 0 ||
            N.call(T, p, P);
        },
        [d, c] = ct(!!i.value, { value: i, onChange: m }),
        v = G(null),
        g = B(() => i.value !== void 0),
        f = B(() => Array.from(a.keys())),
        C = B(() => f.value[o.value.current]),
        x = B(
          () =>
            new Map(
              Array.from(a)
                .filter(p => {
                  let [, { canPreview: P }] = p;
                  return !!P;
                })
                .map(p => {
                  let [P, { url: T }] = p;
                  return [P, T];
                })
            )
        ),
        $ = function(p, P) {
          let T =
            arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !0;
          a.set(p, { url: P, canPreview: T });
        },
        h = p => {
          r.value = p;
        },
        S = p => {
          v.value = p;
        },
        b = function(p, P) {
          let T =
            arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !0;
          const N = () => {
            a.delete(p);
          };
          return a.set(p, { url: P, canPreview: T }), N;
        },
        _ = p => {
          p == null || p.stopPropagation(), c(!1), S(null);
        };
      return (
        ne(
          C,
          p => {
            h(p);
          },
          { immediate: !0, flush: 'post' }
        ),
        Ye(
          () => {
            d.value && g.value && h(C.value);
          },
          { flush: 'post' }
        ),
        on.provide({
          isPreviewGroup: k(!0),
          previewUrls: x,
          setPreviewUrls: $,
          current: r,
          setCurrent: h,
          setShowPreview: c,
          setMousePosition: S,
          registerImage: b
        }),
        () => {
          const p = Ur(o.value, []);
          return s(ke, null, [
            n.default && n.default(),
            s(
              So,
              A(
                A({}, p),
                {},
                {
                  'ria-hidden': !d.value,
                  visible: d.value,
                  prefixCls: e.previewPrefixCls,
                  onClose: _,
                  mousePosition: v.value,
                  src: x.value.get(r.value),
                  icons: e.icons,
                  getContainer: l.value
                }
              ),
              null
            )
          ]);
        }
      );
    }
  }),
  $o = Zr,
  We = { x: 0, y: 0 },
  Qr = u(u({}, _t()), {
    src: String,
    alt: String,
    rootClassName: String,
    icons: { type: Object, default: () => ({}) }
  }),
  qr = Z({
    compatConfig: { MODE: 3 },
    name: 'Preview',
    inheritAttrs: !1,
    props: Qr,
    emits: ['close', 'afterClose'],
    setup(e, t) {
      let { emit: n, attrs: o } = t;
      const {
          rotateLeft: a,
          rotateRight: r,
          zoomIn: i,
          zoomOut: l,
          close: m,
          left: d,
          right: c,
          flipX: v,
          flipY: g
        } = Ke(e.icons),
        f = k(1),
        C = k(0),
        x = Ke({ x: 1, y: 1 }),
        [$, h] = Xr(We),
        S = () => n('close'),
        b = k(),
        _ = Ke({ originX: 0, originY: 0, deltaX: 0, deltaY: 0 }),
        p = k(!1),
        P = on.inject(),
        { previewUrls: T, current: N, isPreviewGroup: z, setCurrent: R } = P,
        F = B(() => T.value.size),
        Q = B(() => Array.from(T.value.keys())),
        K = B(() => Q.value.indexOf(N.value)),
        ee = B(() => (z.value ? T.value.get(N.value) : e.src)),
        y = B(() => z.value && F.value > 1),
        I = k({ wheelDirection: 0 }),
        E = () => {
          (f.value = 1),
            (C.value = 0),
            (x.x = 1),
            (x.y = 1),
            h(We),
            n('afterClose');
        },
        O = w => {
          w ? (f.value += 0.5) : f.value++, h(We);
        },
        L = w => {
          f.value > 1 && (w ? (f.value -= 0.5) : f.value--), h(We);
        },
        W = () => {
          C.value += 90;
        },
        H = () => {
          C.value -= 90;
        },
        oe = () => {
          x.x = -x.x;
        },
        le = () => {
          x.y = -x.y;
        },
        q = w => {
          w.preventDefault(),
            w.stopPropagation(),
            K.value > 0 && R(Q.value[K.value - 1]);
        },
        ae = w => {
          w.preventDefault(),
            w.stopPropagation(),
            K.value < F.value - 1 && R(Q.value[K.value + 1]);
        },
        U = J({ [`${e.prefixCls}-moving`]: p.value }),
        ce = `${e.prefixCls}-operations-operation`,
        me = `${e.prefixCls}-operations-icon`,
        ye = [
          { icon: m, onClick: S, type: 'close' },
          { icon: i, onClick: () => O(), type: 'zoomIn' },
          {
            icon: l,
            onClick: () => L(),
            type: 'zoomOut',
            disabled: B(() => f.value === 1)
          },
          { icon: r, onClick: W, type: 'rotateRight' },
          { icon: a, onClick: H, type: 'rotateLeft' },
          { icon: v, onClick: oe, type: 'flipX' },
          { icon: g, onClick: le, type: 'flipY' }
        ],
        Ie = () => {
          if (e.visible && p.value) {
            const w = b.value.offsetWidth * f.value,
              M = b.value.offsetHeight * f.value,
              { left: j, top: V } = so(b.value),
              Y = C.value % 180 !== 0;
            p.value = !1;
            const X = Kr(Y ? M : w, Y ? w : M, j, V);
            X && h(u({}, X));
          }
        },
        He = w => {
          w.button === 0 &&
            (w.preventDefault(),
            w.stopPropagation(),
            (_.deltaX = w.pageX - $.x),
            (_.deltaY = w.pageY - $.y),
            (_.originX = $.x),
            (_.originY = $.y),
            (p.value = !0));
        },
        Re = w => {
          e.visible &&
            p.value &&
            h({ x: w.pageX - _.deltaX, y: w.pageY - _.deltaY });
        },
        pe = w => {
          if (!e.visible) return;
          w.preventDefault();
          const M = w.deltaY;
          I.value = { wheelDirection: M };
        },
        Ce = w => {
          !e.visible ||
            !y.value ||
            (w.preventDefault(),
            w.keyCode === re.LEFT
              ? K.value > 0 && R(Q.value[K.value - 1])
              : w.keyCode === re.RIGHT &&
                K.value < F.value - 1 &&
                R(Q.value[K.value + 1]));
        },
        Ee = () => {
          e.visible &&
            (f.value !== 1 && (f.value = 1),
            ($.x !== We.x || $.y !== We.y) && h(We));
        };
      let he = () => {};
      return (
        _e(() => {
          ne(
            [() => e.visible, p],
            () => {
              he();
              let w, M;
              const j = Ge(window, 'mouseup', Ie, !1),
                V = Ge(window, 'mousemove', Re, !1),
                Y = Ge(window, 'wheel', pe, { passive: !1 }),
                X = Ge(window, 'keydown', Ce, !1);
              try {
                window.top !== window.self &&
                  ((w = Ge(window.top, 'mouseup', Ie, !1)),
                  (M = Ge(window.top, 'mousemove', Re, !1)));
              } catch (xe) {
                Qo(!1, `[vc-image] ${xe}`);
              }
              he = () => {
                j.remove(),
                  V.remove(),
                  Y.remove(),
                  X.remove(),
                  w && w.remove(),
                  M && M.remove();
              };
            },
            { flush: 'post', immediate: !0 }
          ),
            ne([I], () => {
              const { wheelDirection: w } = I.value;
              w > 0 ? L(!0) : w < 0 && O(!0);
            });
        }),
        no(() => {
          he();
        }),
        () => {
          const { visible: w, prefixCls: M, rootClassName: j } = e;
          return s(
            xo,
            A(
              A({}, o),
              {},
              {
                transitionName: e.transitionName,
                maskTransitionName: e.maskTransitionName,
                closable: !1,
                keyboard: !0,
                prefixCls: M,
                onClose: S,
                afterClose: E,
                visible: w,
                wrapClassName: U,
                rootClassName: j,
                getContainer: e.getContainer
              }
            ),
            {
              default: () => [
                s('div', { class: [`${e.prefixCls}-operations-wrapper`, j] }, [
                  s('ul', { class: `${e.prefixCls}-operations` }, [
                    ye.map(V => {
                      let { icon: Y, onClick: X, type: xe, disabled: se } = V;
                      return s(
                        'li',
                        {
                          class: J(ce, {
                            [`${e.prefixCls}-operations-operation-disabled`]:
                              se && (se == null ? void 0 : se.value)
                          }),
                          onClick: X,
                          key: xe
                        },
                        [pa(Y, { class: me })]
                      );
                    })
                  ])
                ]),
                s(
                  'div',
                  {
                    class: `${e.prefixCls}-img-wrapper`,
                    style: { transform: `translate3d(${$.x}px, ${$.y}px, 0)` }
                  },
                  [
                    s(
                      'img',
                      {
                        onMousedown: He,
                        onDblclick: Ee,
                        ref: b,
                        class: `${e.prefixCls}-img`,
                        src: ee.value,
                        alt: e.alt,
                        style: {
                          transform: `scale3d(${x.x * f.value}, ${x.y *
                            f.value}, 1) rotate(${C.value}deg)`
                        }
                      },
                      null
                    )
                  ]
                ),
                y.value &&
                  s(
                    'div',
                    {
                      class: J(`${e.prefixCls}-switch-left`, {
                        [`${e.prefixCls}-switch-left-disabled`]: K.value <= 0
                      }),
                      onClick: q
                    },
                    [d]
                  ),
                y.value &&
                  s(
                    'div',
                    {
                      class: J(`${e.prefixCls}-switch-right`, {
                        [`${e.prefixCls}-switch-right-disabled`]:
                          K.value >= F.value - 1
                      }),
                      onClick: ae
                    },
                    [c]
                  )
              ]
            }
          );
        }
      );
    }
  }),
  So = qr;
var Jr =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var a = 0, o = Object.getOwnPropertySymbols(e); a < o.length; a++)
        t.indexOf(o[a]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[a]) &&
          (n[o[a]] = e[o[a]]);
    return n;
  };
const wo = () => ({
    src: String,
    wrapperClassName: String,
    wrapperStyle: { type: Object, default: void 0 },
    rootClassName: String,
    prefixCls: String,
    previewPrefixCls: String,
    previewMask: { type: [Boolean, Function], default: void 0 },
    placeholder: te.any,
    fallback: String,
    preview: { type: [Boolean, Object], default: !0 },
    onClick: { type: Function },
    onError: { type: Function }
  }),
  To = (e, t) => {
    const n = u({}, e);
    return (
      Object.keys(t).forEach(o => {
        e[o] === void 0 && (n[o] = t[o]);
      }),
      n
    );
  };
let el = 0;
const Po = Z({
  compatConfig: { MODE: 3 },
  name: 'VcImage',
  inheritAttrs: !1,
  props: wo(),
  emits: ['click', 'error'],
  setup(e, t) {
    let { attrs: n, slots: o, emit: a } = t;
    const r = B(() => e.prefixCls),
      i = B(() => `${r.value}-preview`),
      l = B(() => {
        const O = {
          visible: void 0,
          onVisibleChange: () => {},
          getContainer: void 0
        };
        return typeof e.preview == 'object' ? To(e.preview, O) : O;
      }),
      m = B(() => {
        var O;
        return (O = l.value.src) !== null && O !== void 0 ? O : e.src;
      }),
      d = B(() => (e.placeholder && e.placeholder !== !0) || o.placeholder),
      c = B(() => l.value.visible),
      v = B(() => l.value.getContainer),
      g = B(() => c.value !== void 0),
      f = (O, L) => {
        var W, H;
        (H = (W = l.value).onVisibleChange) === null ||
          H === void 0 ||
          H.call(W, O, L);
      },
      [C, x] = ct(!!c.value, { value: c, onChange: f });
    ne(C, (O, L) => {
      f(O, L);
    });
    const $ = G(d.value ? 'loading' : 'normal');
    ne(
      () => e.src,
      () => {
        $.value = d.value ? 'loading' : 'normal';
      }
    );
    const h = G(null),
      S = B(() => $.value === 'error'),
      b = on.inject(),
      {
        isPreviewGroup: _,
        setCurrent: p,
        setShowPreview: P,
        setMousePosition: T,
        registerImage: N
      } = b,
      z = G(el++),
      R = B(() => e.preview && !S.value),
      F = () => {
        $.value = 'normal';
      },
      Q = O => {
        ($.value = 'error'), a('error', O);
      },
      K = O => {
        if (!g.value) {
          const { left: L, top: W } = so(O.target);
          _.value
            ? (p(z.value), T({ x: L, y: W }))
            : (h.value = { x: L, y: W });
        }
        _.value ? P(!0) : x(!0), a('click', O);
      },
      ee = () => {
        x(!1), g.value || (h.value = null);
      },
      y = G(null);
    ne(
      () => y,
      () => {
        $.value === 'loading' &&
          y.value.complete &&
          (y.value.naturalWidth || y.value.naturalHeight) &&
          F();
      }
    );
    let I = () => {};
    _e(() => {
      ne(
        [m, R],
        () => {
          if ((I(), !_.value)) return () => {};
          (I = N(z.value, m.value, R.value)), R.value || I();
        },
        { flush: 'post', immediate: !0 }
      );
    }),
      no(() => {
        I();
      });
    const E = O => (Gi(O) ? O + 'px' : O);
    return () => {
      const {
          prefixCls: O,
          wrapperClassName: L,
          fallback: W,
          src: H,
          placeholder: oe,
          wrapperStyle: le,
          rootClassName: q
        } = e,
        {
          width: ae,
          height: U,
          crossorigin: ce,
          decoding: me,
          alt: ye,
          sizes: Ie,
          srcset: He,
          usemap: Re,
          class: pe,
          style: Ce
        } = n,
        Ee = l.value,
        { icons: he, maskClassName: w } = Ee,
        M = Jr(Ee, ['icons', 'maskClassName']),
        j = J(O, L, q, { [`${O}-error`]: S.value }),
        V = S.value && W ? W : m.value,
        Y = {
          crossorigin: ce,
          decoding: me,
          alt: ye,
          sizes: Ie,
          srcset: He,
          usemap: Re,
          width: ae,
          height: U,
          class: J(`${O}-img`, { [`${O}-img-placeholder`]: oe === !0 }, pe),
          style: u({ height: E(U) }, Ce)
        };
      return s(ke, null, [
        s(
          'div',
          {
            class: j,
            onClick: R.value
              ? K
              : X => {
                  a('click', X);
                },
            style: u({ width: E(ae), height: E(U) }, le)
          },
          [
            s(
              'img',
              A(
                A(
                  A({}, Y),
                  S.value && W ? { src: W } : { onLoad: F, onError: Q, src: H }
                ),
                {},
                { ref: y }
              ),
              null
            ),
            $.value === 'loading' &&
              s('div', { 'aria-hidden': 'true', class: `${O}-placeholder` }, [
                oe || (o.placeholder && o.placeholder())
              ]),
            o.previewMask &&
              R.value &&
              s('div', { class: [`${O}-mask`, w] }, [o.previewMask()])
          ]
        ),
        !_.value &&
          R.value &&
          s(
            So,
            A(
              A({}, M),
              {},
              {
                'aria-hidden': !C.value,
                visible: C.value,
                prefixCls: i.value,
                onClose: ee,
                mousePosition: h.value,
                src: V,
                alt: ye,
                getContainer: v.value,
                icons: he,
                rootClassName: q
              }
            ),
            null
          )
      ]);
    };
  }
});
Po.PreviewGroup = $o;
const tl = Po;
function Hn(e) {
  return {
    position: e,
    top: 0,
    insetInlineEnd: 0,
    bottom: 0,
    insetInlineStart: 0
  };
}
const Oo = e => {
    const { componentCls: t } = e;
    return [
      {
        [`${t}-root`]: {
          [`${t}${e.antCls}-zoom-enter, ${t}${e.antCls}-zoom-appear`]: {
            transform: 'none',
            opacity: 0,
            animationDuration: e.motionDurationSlow,
            userSelect: 'none'
          },
          [`${t}${e.antCls}-zoom-leave ${t}-content`]: {
            pointerEvents: 'none'
          },
          [`${t}-mask`]: u(u({}, Hn('fixed')), {
            zIndex: e.zIndexPopupBase,
            height: '100%',
            backgroundColor: e.colorBgMask,
            [`${t}-hidden`]: { display: 'none' }
          }),
          [`${t}-wrap`]: u(u({}, Hn('fixed')), {
            overflow: 'auto',
            outline: 0,
            WebkitOverflowScrolling: 'touch'
          })
        }
      },
      { [`${t}-root`]: go(e) }
    ];
  },
  nl = e => {
    const { componentCls: t } = e;
    return [
      {
        [`${t}-root`]: {
          [`${t}-wrap`]: {
            zIndex: e.zIndexPopupBase,
            position: 'fixed',
            inset: 0,
            overflow: 'auto',
            outline: 0,
            WebkitOverflowScrolling: 'touch'
          },
          [`${t}-wrap-rtl`]: { direction: 'rtl' },
          [`${t}-centered`]: {
            textAlign: 'center',
            '&::before': {
              display: 'inline-block',
              width: 0,
              height: '100%',
              verticalAlign: 'middle',
              content: '""'
            },
            [t]: {
              top: 0,
              display: 'inline-block',
              paddingBottom: 0,
              textAlign: 'start',
              verticalAlign: 'middle'
            }
          },
          [`@media (max-width: ${e.screenSMMax})`]: {
            [t]: {
              maxWidth: 'calc(100vw - 16px)',
              margin: `${e.marginXS} auto`
            },
            [`${t}-centered`]: { [t]: { flex: 1 } }
          }
        }
      },
      {
        [t]: u(u({}, Pt(e)), {
          pointerEvents: 'none',
          position: 'relative',
          top: 100,
          width: 'auto',
          maxWidth: `calc(100vw - ${e.margin * 2}px)`,
          margin: '0 auto',
          paddingBottom: e.paddingLG,
          [`${t}-title`]: {
            margin: 0,
            color: e.modalHeadingColor,
            fontWeight: e.fontWeightStrong,
            fontSize: e.modalHeaderTitleFontSize,
            lineHeight: e.modalHeaderTitleLineHeight,
            wordWrap: 'break-word'
          },
          [`${t}-content`]: {
            position: 'relative',
            backgroundColor: e.modalContentBg,
            backgroundClip: 'padding-box',
            border: 0,
            borderRadius: e.borderRadiusLG,
            boxShadow: e.boxShadowSecondary,
            pointerEvents: 'auto',
            padding: `${e.paddingMD}px ${e.paddingContentHorizontalLG}px`
          },
          [`${t}-close`]: u(
            {
              position: 'absolute',
              top: (e.modalHeaderCloseSize - e.modalCloseBtnSize) / 2,
              insetInlineEnd:
                (e.modalHeaderCloseSize - e.modalCloseBtnSize) / 2,
              zIndex: e.zIndexPopupBase + 10,
              padding: 0,
              color: e.modalCloseColor,
              fontWeight: e.fontWeightStrong,
              lineHeight: 1,
              textDecoration: 'none',
              background: 'transparent',
              borderRadius: e.borderRadiusSM,
              width: e.modalConfirmIconSize,
              height: e.modalConfirmIconSize,
              border: 0,
              outline: 0,
              cursor: 'pointer',
              transition: `color ${e.motionDurationMid}, background-color ${e.motionDurationMid}`,
              '&-x': {
                display: 'block',
                fontSize: e.fontSizeLG,
                fontStyle: 'normal',
                lineHeight: `${e.modalCloseBtnSize}px`,
                textAlign: 'center',
                textTransform: 'none',
                textRendering: 'auto'
              },
              '&:hover': {
                color: e.modalIconHoverColor,
                backgroundColor: e.wireframe
                  ? 'transparent'
                  : e.colorFillContent,
                textDecoration: 'none'
              },
              '&:active': {
                backgroundColor: e.wireframe
                  ? 'transparent'
                  : e.colorFillContentHover
              }
            },
            Ft(e)
          ),
          [`${t}-header`]: {
            color: e.colorText,
            background: e.modalHeaderBg,
            borderRadius: `${e.borderRadiusLG}px ${e.borderRadiusLG}px 0 0`,
            marginBottom: e.marginXS
          },
          [`${t}-body`]: {
            fontSize: e.fontSize,
            lineHeight: e.lineHeight,
            wordWrap: 'break-word'
          },
          [`${t}-footer`]: {
            textAlign: 'end',
            background: e.modalFooterBg,
            marginTop: e.marginSM,
            [`${e.antCls}-btn + ${e.antCls}-btn:not(${e.antCls}-dropdown-trigger)`]: {
              marginBottom: 0,
              marginInlineStart: e.marginXS
            }
          },
          [`${t}-open`]: { overflow: 'hidden' }
        })
      },
      {
        [`${t}-pure-panel`]: {
          top: 'auto',
          padding: 0,
          display: 'flex',
          flexDirection: 'column',
          [`${t}-content,
          ${t}-body,
          ${t}-confirm-body-wrapper`]: {
            display: 'flex',
            flexDirection: 'column',
            flex: 'auto'
          },
          [`${t}-confirm-body`]: { marginBottom: 'auto' }
        }
      }
    ];
  },
  ol = e => {
    const { componentCls: t } = e,
      n = `${t}-confirm`;
    return {
      [n]: {
        '&-rtl': { direction: 'rtl' },
        [`${e.antCls}-modal-header`]: { display: 'none' },
        [`${n}-body-wrapper`]: u({}, qo()),
        [`${n}-body`]: {
          display: 'flex',
          flexWrap: 'wrap',
          alignItems: 'center',
          [`${n}-title`]: {
            flex: '0 0 100%',
            display: 'block',
            overflow: 'hidden',
            color: e.colorTextHeading,
            fontWeight: e.fontWeightStrong,
            fontSize: e.modalHeaderTitleFontSize,
            lineHeight: e.modalHeaderTitleLineHeight,
            [`+ ${n}-content`]: {
              marginBlockStart: e.marginXS,
              flexBasis: '100%',
              maxWidth: `calc(100% - ${e.modalConfirmIconSize + e.marginSM}px)`
            }
          },
          [`${n}-content`]: { color: e.colorText, fontSize: e.fontSize },
          [`> ${e.iconCls}`]: {
            flex: 'none',
            marginInlineEnd: e.marginSM,
            fontSize: e.modalConfirmIconSize,
            [`+ ${n}-title`]: { flex: 1 },
            [`+ ${n}-title + ${n}-content`]: {
              marginInlineStart: e.modalConfirmIconSize + e.marginSM
            }
          }
        },
        [`${n}-btns`]: {
          textAlign: 'end',
          marginTop: e.marginSM,
          [`${e.antCls}-btn + ${e.antCls}-btn`]: {
            marginBottom: 0,
            marginInlineStart: e.marginXS
          }
        }
      },
      [`${n}-error ${n}-body > ${e.iconCls}`]: { color: e.colorError },
      [`${n}-warning ${n}-body > ${e.iconCls},
        ${n}-confirm ${n}-body > ${e.iconCls}`]: { color: e.colorWarning },
      [`${n}-info ${n}-body > ${e.iconCls}`]: { color: e.colorInfo },
      [`${n}-success ${n}-body > ${e.iconCls}`]: { color: e.colorSuccess },
      [`${t}-zoom-leave ${t}-btns`]: { pointerEvents: 'none' }
    };
  },
  al = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-root`]: {
        [`${t}-wrap-rtl`]: {
          direction: 'rtl',
          [`${t}-confirm-body`]: { direction: 'rtl' }
        }
      }
    };
  },
  il = e => {
    const { componentCls: t, antCls: n } = e,
      o = `${t}-confirm`;
    return {
      [t]: {
        [`${t}-content`]: { padding: 0 },
        [`${t}-header`]: {
          padding: e.modalHeaderPadding,
          borderBottom: `${e.modalHeaderBorderWidth}px ${e.modalHeaderBorderStyle} ${e.modalHeaderBorderColorSplit}`,
          marginBottom: 0
        },
        [`${t}-body`]: { padding: e.modalBodyPadding },
        [`${t}-footer`]: {
          padding: `${e.modalFooterPaddingVertical}px ${e.modalFooterPaddingHorizontal}px`,
          borderTop: `${e.modalFooterBorderWidth}px ${e.modalFooterBorderStyle} ${e.modalFooterBorderColorSplit}`,
          borderRadius: `0 0 ${e.borderRadiusLG}px ${e.borderRadiusLG}px`,
          marginTop: 0
        }
      },
      [o]: {
        [`${n}-modal-body`]: {
          padding: `${e.padding * 2}px ${e.padding * 2}px ${e.paddingLG}px`
        },
        [`${o}-body`]: {
          [`> ${e.iconCls}`]: {
            marginInlineEnd: e.margin,
            [`+ ${o}-title + ${o}-content`]: {
              marginInlineStart: e.modalConfirmIconSize + e.margin
            }
          }
        },
        [`${o}-btns`]: { marginTop: e.marginLG }
      }
    };
  },
  rl = Tt('Modal', e => {
    const t = e.padding,
      n = e.fontSizeHeading5,
      o = e.lineHeightHeading5,
      a = Ct(e, {
        modalBodyPadding: e.paddingLG,
        modalHeaderBg: e.colorBgElevated,
        modalHeaderPadding: `${t}px ${e.paddingLG}px`,
        modalHeaderBorderWidth: e.lineWidth,
        modalHeaderBorderStyle: e.lineType,
        modalHeaderTitleLineHeight: o,
        modalHeaderTitleFontSize: n,
        modalHeaderBorderColorSplit: e.colorSplit,
        modalHeaderCloseSize: o * n + t * 2,
        modalContentBg: e.colorBgElevated,
        modalHeadingColor: e.colorTextHeading,
        modalCloseColor: e.colorTextDescription,
        modalFooterBg: 'transparent',
        modalFooterBorderColorSplit: e.colorSplit,
        modalFooterBorderStyle: e.lineType,
        modalFooterPaddingVertical: e.paddingXS,
        modalFooterPaddingHorizontal: e.padding,
        modalFooterBorderWidth: e.lineWidth,
        modalConfirmTitleFontSize: e.fontSizeLG,
        modalIconHoverColor: e.colorIconHover,
        modalConfirmIconSize: e.fontSize * e.lineHeight,
        modalCloseBtnSize: e.controlHeightLG * 0.55
      });
    return [nl(a), ol(a), al(a), Oo(a), e.wireframe && il(a), co(a, 'zoom')];
  }),
  jt = e => ({ position: e || 'absolute', inset: 0 }),
  ll = e => {
    const {
      iconCls: t,
      motionDurationSlow: n,
      paddingXXS: o,
      marginXXS: a,
      prefixCls: r
    } = e;
    return {
      position: 'absolute',
      inset: 0,
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      color: '#fff',
      background: new tt('#000').setAlpha(0.5).toRgbString(),
      cursor: 'pointer',
      opacity: 0,
      transition: `opacity ${n}`,
      [`.${r}-mask-info`]: u(u({}, Kn), {
        padding: `0 ${o}px`,
        [t]: { marginInlineEnd: a, svg: { verticalAlign: 'baseline' } }
      })
    };
  },
  sl = e => {
    const {
        previewCls: t,
        modalMaskBg: n,
        paddingSM: o,
        previewOperationColorDisabled: a,
        motionDurationSlow: r
      } = e,
      i = new tt(n).setAlpha(0.1),
      l = i.clone().setAlpha(0.2);
    return {
      [`${t}-operations`]: u(u({}, Pt(e)), {
        display: 'flex',
        flexDirection: 'row-reverse',
        alignItems: 'center',
        color: e.previewOperationColor,
        listStyle: 'none',
        background: i.toRgbString(),
        pointerEvents: 'auto',
        '&-operation': {
          marginInlineStart: o,
          padding: o,
          cursor: 'pointer',
          transition: `all ${r}`,
          userSelect: 'none',
          '&:hover': { background: l.toRgbString() },
          '&-disabled': { color: a, pointerEvents: 'none' },
          '&:last-of-type': { marginInlineStart: 0 }
        },
        '&-progress': {
          position: 'absolute',
          left: { _skip_check_: !0, value: '50%' },
          transform: 'translateX(-50%)'
        },
        '&-icon': { fontSize: e.previewOperationSize }
      })
    };
  },
  cl = e => {
    const {
        modalMaskBg: t,
        iconCls: n,
        previewOperationColorDisabled: o,
        previewCls: a,
        zIndexPopup: r,
        motionDurationSlow: i
      } = e,
      l = new tt(t).setAlpha(0.1),
      m = l.clone().setAlpha(0.2);
    return {
      [`${a}-switch-left, ${a}-switch-right`]: {
        position: 'fixed',
        insetBlockStart: '50%',
        zIndex: r + 1,
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        width: e.imagePreviewSwitchSize,
        height: e.imagePreviewSwitchSize,
        marginTop: -e.imagePreviewSwitchSize / 2,
        color: e.previewOperationColor,
        background: l.toRgbString(),
        borderRadius: '50%',
        transform: 'translateY(-50%)',
        cursor: 'pointer',
        transition: `all ${i}`,
        pointerEvents: 'auto',
        userSelect: 'none',
        '&:hover': { background: m.toRgbString() },
        '&-disabled': {
          '&, &:hover': {
            color: o,
            background: 'transparent',
            cursor: 'not-allowed',
            [`> ${n}`]: { cursor: 'not-allowed' }
          }
        },
        [`> ${n}`]: { fontSize: e.previewOperationSize }
      },
      [`${a}-switch-left`]: { insetInlineStart: e.marginSM },
      [`${a}-switch-right`]: { insetInlineEnd: e.marginSM }
    };
  },
  ul = e => {
    const {
      motionEaseOut: t,
      previewCls: n,
      motionDurationSlow: o,
      componentCls: a
    } = e;
    return [
      {
        [`${a}-preview-root`]: {
          [n]: { height: '100%', textAlign: 'center', pointerEvents: 'none' },
          [`${n}-body`]: u(u({}, jt()), { overflow: 'hidden' }),
          [`${n}-img`]: {
            maxWidth: '100%',
            maxHeight: '100%',
            verticalAlign: 'middle',
            transform: 'scale3d(1, 1, 1)',
            cursor: 'grab',
            transition: `transform ${o} ${t} 0s`,
            userSelect: 'none',
            pointerEvents: 'auto',
            '&-wrapper': u(u({}, jt()), {
              transition: `transform ${o} ${t} 0s`,
              display: 'flex',
              justifyContent: 'center',
              alignItems: 'center',
              '&::before': {
                display: 'inline-block',
                width: 1,
                height: '50%',
                marginInlineEnd: -1,
                content: '""'
              }
            })
          },
          [`${n}-moving`]: {
            [`${n}-preview-img`]: {
              cursor: 'grabbing',
              '&-wrapper': { transitionDuration: '0s' }
            }
          }
        }
      },
      { [`${a}-preview-root`]: { [`${n}-wrap`]: { zIndex: e.zIndexPopup } } },
      {
        [`${a}-preview-operations-wrapper`]: {
          position: 'fixed',
          insetBlockStart: 0,
          insetInlineEnd: 0,
          zIndex: e.zIndexPopup + 1,
          width: '100%'
        },
        '&': [sl(e), cl(e)]
      }
    ];
  },
  dl = e => {
    const { componentCls: t } = e;
    return {
      [t]: {
        position: 'relative',
        display: 'inline-block',
        [`${t}-img`]: {
          width: '100%',
          height: 'auto',
          verticalAlign: 'middle'
        },
        [`${t}-img-placeholder`]: {
          backgroundColor: e.colorBgContainerDisabled,
          backgroundImage:
            "url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTQuNSAyLjVoLTEzQS41LjUgMCAwIDAgMSAzdjEwYS41LjUgMCAwIDAgLjUuNWgxM2EuNS41IDAgMCAwIC41LS41VjNhLjUuNSAwIDAgMC0uNS0uNXpNNS4yODEgNC43NWExIDEgMCAwIDEgMCAyIDEgMSAwIDAgMSAwLTJ6bTguMDMgNi44M2EuMTI3LjEyNyAwIDAgMS0uMDgxLjAzSDIuNzY5YS4xMjUuMTI1IDAgMCAxLS4wOTYtLjIwN2wyLjY2MS0zLjE1NmEuMTI2LjEyNiAwIDAgMSAuMTc3LS4wMTZsLjAxNi4wMTZMNy4wOCAxMC4wOWwyLjQ3LTIuOTNhLjEyNi4xMjYgMCAwIDEgLjE3Ny0uMDE2bC4wMTUuMDE2IDMuNTg4IDQuMjQ0YS4xMjcuMTI3IDAgMCAxLS4wMi4xNzV6IiBmaWxsPSIjOEM4QzhDIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48L3N2Zz4=')",
          backgroundRepeat: 'no-repeat',
          backgroundPosition: 'center center',
          backgroundSize: '30%'
        },
        [`${t}-mask`]: u({}, ll(e)),
        [`${t}-mask:hover`]: { opacity: 1 },
        [`${t}-placeholder`]: u({}, jt())
      }
    };
  },
  fl = e => {
    const { previewCls: t } = e;
    return { [`${t}-root`]: co(e, 'zoom'), '&': go(e, !0) };
  },
  _o = Tt(
    'Image',
    e => {
      const t = `${e.componentCls}-preview`,
        n = Ct(e, {
          previewCls: t,
          modalMaskBg: new tt('#000').setAlpha(0.45).toRgbString(),
          imagePreviewSwitchSize: e.controlHeightLG
        });
      return [dl(n), ul(n), Oo(Ct(n, { componentCls: t })), fl(n)];
    },
    e => ({
      zIndexPopup: e.zIndexPopupBase + 80,
      previewOperationColor: new tt(e.colorTextLightSolid).toRgbString(),
      previewOperationColorDisabled: new tt(e.colorTextLightSolid)
        .setAlpha(0.25)
        .toRgbString(),
      previewOperationSize: e.fontSizeIcon * 1.5
    })
  ),
  Io = {
    rotateLeft: s(Mr, null, null),
    rotateRight: s(Br, null, null),
    zoomIn: s(Lr, null, null),
    zoomOut: s(kr, null, null),
    close: s(Wt, null, null),
    left: s(za, null, null),
    right: s(ka, null, null),
    flipX: s(Nn, null, null),
    flipY: s(Nn, { rotate: 90 }, null)
  },
  pl = () => ({ previewPrefixCls: String, preview: Jo() }),
  vl = Z({
    compatConfig: { MODE: 3 },
    name: 'AImagePreviewGroup',
    inheritAttrs: !1,
    props: pl(),
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      const { prefixCls: a, rootPrefixCls: r } = nt('image', e),
        i = B(() => `${a.value}-preview`),
        [l, m] = _o(a),
        d = B(() => {
          const { preview: c } = e;
          if (c === !1) return c;
          const v = typeof c == 'object' ? c : {};
          return u(u({}, v), {
            rootClassName: m.value,
            transitionName: je(r.value, 'zoom', v.transitionName),
            maskTransitionName: je(r.value, 'fade', v.maskTransitionName)
          });
        });
      return () =>
        l(
          s(
            $o,
            A(
              A({}, u(u({}, n), e)),
              {},
              { preview: d.value, icons: Io, previewPrefixCls: i.value }
            ),
            o
          )
        );
    }
  }),
  ml = vl,
  Ve = Z({
    name: 'AImage',
    inheritAttrs: !1,
    props: wo(),
    setup(e, t) {
      let { slots: n, attrs: o } = t;
      const { prefixCls: a, rootPrefixCls: r, configProvider: i } = nt(
          'image',
          e
        ),
        [l, m] = _o(a),
        d = B(() => {
          const { preview: c } = e;
          if (c === !1) return c;
          const v = typeof c == 'object' ? c : {};
          return u(u({ icons: Io }, v), {
            transitionName: je(r.value, 'zoom', v.transitionName),
            maskTransitionName: je(r.value, 'fade', v.maskTransitionName)
          });
        });
      return () => {
        var c, v;
        const g =
            ((v =
              (c = i.locale) === null || c === void 0 ? void 0 : c.value) ===
              null || v === void 0
              ? void 0
              : v.Image) || Yn.Image,
          f = () =>
            s('div', { class: `${a.value}-mask-info` }, [
              s(ja, null, null),
              g == null ? void 0 : g.preview
            ]),
          { previewMask: C = n.previewMask || f } = e;
        return l(
          s(
            tl,
            A(
              A({}, u(u(u({}, o), e), { prefixCls: a.value })),
              {},
              { preview: d.value, rootClassName: J(e.rootClassName, m.value) }
            ),
            u(u({}, n), { previewMask: typeof C == 'function' ? C : null })
          )
        );
      };
    }
  });
Ve.PreviewGroup = ml;
Ve.install = function(e) {
  return (
    e.component(Ve.name, Ve),
    e.component(Ve.PreviewGroup.name, Ve.PreviewGroup),
    e
  );
};
const gl = Ve;
var bl =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var a = 0, o = Object.getOwnPropertySymbols(e); a < o.length; a++)
        t.indexOf(o[a]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[a]) &&
          (n[o[a]] = e[o[a]]);
    return n;
  };
let Ht;
const yl = e => {
  (Ht = { x: e.pageX, y: e.pageY }), setTimeout(() => (Ht = null), 100);
};
Ha() && Ge(document.documentElement, 'click', yl, !0);
const hl = () => ({
    prefixCls: String,
    visible: { type: Boolean, default: void 0 },
    open: { type: Boolean, default: void 0 },
    confirmLoading: { type: Boolean, default: void 0 },
    title: te.any,
    closable: { type: Boolean, default: void 0 },
    closeIcon: te.any,
    onOk: Function,
    onCancel: Function,
    'onUpdate:visible': Function,
    'onUpdate:open': Function,
    onChange: Function,
    afterClose: Function,
    centered: { type: Boolean, default: void 0 },
    width: [String, Number],
    footer: te.any,
    okText: te.any,
    okType: String,
    cancelText: te.any,
    icon: te.any,
    maskClosable: { type: Boolean, default: void 0 },
    forceRender: { type: Boolean, default: void 0 },
    okButtonProps: Pe(),
    cancelButtonProps: Pe(),
    destroyOnClose: { type: Boolean, default: void 0 },
    wrapClassName: String,
    maskTransitionName: String,
    transitionName: String,
    getContainer: {
      type: [String, Function, Boolean, Object],
      default: void 0
    },
    zIndex: Number,
    bodyStyle: Pe(),
    maskStyle: Pe(),
    mask: { type: Boolean, default: void 0 },
    keyboard: { type: Boolean, default: void 0 },
    wrapProps: Object,
    focusTriggerAfterClose: { type: Boolean, default: void 0 },
    modalRender: Function,
    mousePosition: Pe()
  }),
  be = Z({
    compatConfig: { MODE: 3 },
    name: 'AModal',
    inheritAttrs: !1,
    props: ot(hl(), { width: 520, confirmLoading: !1, okType: 'primary' }),
    setup(e, t) {
      let { emit: n, slots: o, attrs: a } = t;
      const [r] = Gt('Modal'),
        {
          prefixCls: i,
          rootPrefixCls: l,
          direction: m,
          getPopupContainer: d
        } = nt('modal', e),
        [c, v] = rl(i);
      Ue(
        e.visible === void 0,
        'Modal',
        '`visible` will be removed in next major version, please use `open` instead.'
      );
      const g = x => {
          n('update:visible', !1),
            n('update:open', !1),
            n('cancel', x),
            n('change', !1);
        },
        f = x => {
          n('ok', x);
        },
        C = () => {
          var x, $;
          const {
            okText: h = (x = o.okText) === null || x === void 0
              ? void 0
              : x.call(o),
            okType: S,
            cancelText: b = ($ = o.cancelText) === null || $ === void 0
              ? void 0
              : $.call(o),
            confirmLoading: _
          } = e;
          return s(ke, null, [
            s(et, A({ onClick: g }, e.cancelButtonProps), {
              default: () => [b || r.value.cancelText]
            }),
            s(
              et,
              A(A({}, Fa(S)), {}, { loading: _, onClick: f }, e.okButtonProps),
              { default: () => [h || r.value.okText] }
            )
          ]);
        };
      return () => {
        var x, $;
        const {
            prefixCls: h,
            visible: S,
            open: b,
            wrapClassName: _,
            centered: p,
            getContainer: P,
            closeIcon: T = (x = o.closeIcon) === null || x === void 0
              ? void 0
              : x.call(o),
            focusTriggerAfterClose: N = !0
          } = e,
          z = bl(e, [
            'prefixCls',
            'visible',
            'open',
            'wrapClassName',
            'centered',
            'getContainer',
            'closeIcon',
            'focusTriggerAfterClose'
          ]),
          R = J(_, {
            [`${i.value}-centered`]: !!p,
            [`${i.value}-wrap-rtl`]: m.value === 'rtl'
          });
        return c(
          s(
            xo,
            A(
              A(A({}, z), a),
              {},
              {
                rootClassName: v.value,
                class: J(v.value, a.class),
                getContainer: P || (d == null ? void 0 : d.value),
                prefixCls: i.value,
                wrapClassName: R,
                visible: b ?? S,
                onClose: g,
                focusTriggerAfterClose: N,
                transitionName: je(l.value, 'zoom', e.transitionName),
                maskTransitionName: je(l.value, 'fade', e.maskTransitionName),
                mousePosition:
                  ($ = z.mousePosition) !== null && $ !== void 0 ? $ : Ht
              }
            ),
            u(u({}, o), {
              footer: o.footer || C,
              closeIcon: () =>
                s('span', { class: `${i.value}-close-x` }, [
                  T || s(Wt, { class: `${i.value}-close-icon` }, null)
                ])
            })
          )
        );
      };
    }
  });
function qe(e) {
  return typeof e == 'function' ? e() : e;
}
const Eo = Z({
    name: 'ConfirmDialog',
    inheritAttrs: !1,
    props: [
      'icon',
      'onCancel',
      'onOk',
      'close',
      'closable',
      'zIndex',
      'afterClose',
      'visible',
      'open',
      'keyboard',
      'centered',
      'getContainer',
      'maskStyle',
      'okButtonProps',
      'cancelButtonProps',
      'okType',
      'prefixCls',
      'okCancel',
      'width',
      'mask',
      'maskClosable',
      'okText',
      'cancelText',
      'autoFocusButton',
      'transitionName',
      'maskTransitionName',
      'type',
      'title',
      'content',
      'direction',
      'rootPrefixCls',
      'bodyStyle',
      'closeIcon',
      'modalRender',
      'focusTriggerAfterClose',
      'wrapClassName',
      'confirmPrefixCls',
      'footer'
    ],
    setup(e, t) {
      let { attrs: n } = t;
      const [o] = Gt('Modal');
      return (
        Ue(
          e.visible === void 0,
          'Modal',
          '`visible` is deprecated, please use `open` instead.'
        ),
        () => {
          const {
            icon: a,
            onCancel: r,
            onOk: i,
            close: l,
            okText: m,
            closable: d = !1,
            zIndex: c,
            afterClose: v,
            keyboard: g,
            centered: f,
            getContainer: C,
            maskStyle: x,
            okButtonProps: $,
            cancelButtonProps: h,
            okCancel: S,
            width: b = 416,
            mask: _ = !0,
            maskClosable: p = !1,
            type: P,
            open: T,
            title: N,
            content: z,
            direction: R,
            closeIcon: F,
            modalRender: Q,
            focusTriggerAfterClose: K,
            rootPrefixCls: ee,
            bodyStyle: y,
            wrapClassName: I,
            footer: E
          } = e;
          let O = a;
          if (!a && a !== null)
            switch (P) {
              case 'info':
                O = s(oa, null, null);
                break;
              case 'success':
                O = s(na, null, null);
                break;
              case 'error':
                O = s(ta, null, null);
                break;
              default:
                O = s(ea, null, null);
            }
          const L = e.okType || 'primary',
            W = e.prefixCls || 'ant-modal',
            H = `${W}-confirm`,
            oe = n.style || {},
            le = S ?? P === 'confirm',
            q = e.autoFocusButton === null ? !1 : e.autoFocusButton || 'ok',
            ae = `${W}-confirm`,
            U = J(
              ae,
              `${ae}-${e.type}`,
              { [`${ae}-rtl`]: R === 'rtl' },
              n.class
            ),
            ce = o.value,
            me =
              le &&
              s(
                fn,
                {
                  actionFn: r,
                  close: l,
                  autofocus: q === 'cancel',
                  buttonProps: h,
                  prefixCls: `${ee}-btn`
                },
                { default: () => [qe(e.cancelText) || ce.cancelText] }
              );
          return s(
            be,
            {
              prefixCls: W,
              class: U,
              wrapClassName: J({ [`${ae}-centered`]: !!f }, I),
              onCancel: ye =>
                l == null ? void 0 : l({ triggerCancel: !0 }, ye),
              open: T,
              title: '',
              footer: '',
              transitionName: je(ee, 'zoom', e.transitionName),
              maskTransitionName: je(ee, 'fade', e.maskTransitionName),
              mask: _,
              maskClosable: p,
              maskStyle: x,
              style: oe,
              bodyStyle: y,
              width: b,
              zIndex: c,
              afterClose: v,
              keyboard: g,
              centered: f,
              getContainer: C,
              closable: d,
              closeIcon: F,
              modalRender: Q,
              focusTriggerAfterClose: K
            },
            {
              default: () => [
                s('div', { class: `${H}-body-wrapper` }, [
                  s('div', { class: `${H}-body` }, [
                    qe(O),
                    N === void 0
                      ? null
                      : s('span', { class: `${H}-title` }, [qe(N)]),
                    s('div', { class: `${H}-content` }, [qe(z)])
                  ]),
                  E !== void 0
                    ? qe(E)
                    : s('div', { class: `${H}-btns` }, [
                        me,
                        s(
                          fn,
                          {
                            type: L,
                            actionFn: i,
                            close: l,
                            autofocus: q === 'ok',
                            buttonProps: $,
                            prefixCls: `${ee}-btn`
                          },
                          {
                            default: () => [
                              qe(m) || (le ? ce.okText : ce.justOkText)
                            ]
                          }
                        )
                      ])
                ])
              ]
            }
          );
        }
      );
    }
  }),
  Cl = [],
  Xe = Cl,
  xl = e => {
    const t = document.createDocumentFragment();
    let n = u(u({}, Be(e, ['parentContext', 'appContext'])), {
        close: r,
        open: !0
      }),
      o = null;
    function a() {
      o && (sn(null, t), o.component.update(), (o = null));
      for (var d = arguments.length, c = new Array(d), v = 0; v < d; v++)
        c[v] = arguments[v];
      const g = c.some(f => f && f.triggerCancel);
      e.onCancel && g && e.onCancel(() => {}, ...c.slice(1));
      for (let f = 0; f < Xe.length; f++)
        if (Xe[f] === r) {
          Xe.splice(f, 1);
          break;
        }
    }
    function r() {
      for (var d = arguments.length, c = new Array(d), v = 0; v < d; v++)
        c[v] = arguments[v];
      (n = u(u({}, n), {
        open: !1,
        afterClose: () => {
          typeof e.afterClose == 'function' && e.afterClose(), a.apply(this, c);
        }
      })),
        n.visible && delete n.visible,
        i(n);
    }
    function i(d) {
      typeof d == 'function' ? (n = d(n)) : (n = u(u({}, n), d)),
        o && (u(o.component.props, n), o.component.update());
    }
    const l = d => {
      const c = ra,
        v = c.prefixCls,
        g = d.prefixCls || `${v}-modal`,
        f = c.iconPrefixCls,
        C = aa();
      return s(ia, A(A({}, c), {}, { prefixCls: v }), {
        default: () => [
          s(
            Eo,
            A(
              A({}, d),
              {},
              {
                rootPrefixCls: v,
                prefixCls: g,
                iconPrefixCls: f,
                locale: C,
                cancelText: d.cancelText || C.cancelText
              }
            ),
            null
          )
        ]
      });
    };
    function m(d) {
      const c = s(l, u({}, d));
      return (
        (c.appContext = e.parentContext || e.appContext || c.appContext),
        sn(c, t),
        c
      );
    }
    return (o = m(n)), Xe.push(r), { destroy: r, update: i };
  },
  ft = xl;
function No(e) {
  return u(u({}, e), { type: 'warning' });
}
function Mo(e) {
  return u(u({}, e), { type: 'info' });
}
function Ao(e) {
  return u(u({}, e), { type: 'success' });
}
function Bo(e) {
  return u(u({}, e), { type: 'error' });
}
function Ro(e) {
  return u(u({}, e), { type: 'confirm' });
}
const $l = () => ({
    config: Object,
    afterClose: Function,
    destroyAction: Function,
    open: Boolean
  }),
  Sl = Z({
    name: 'HookModal',
    inheritAttrs: !1,
    props: ot($l(), { config: { width: 520, okType: 'primary' } }),
    setup(e, t) {
      let { expose: n } = t;
      var o;
      const a = B(() => e.open),
        r = B(() => e.config),
        { direction: i, getPrefixCls: l } = la(),
        m = l('modal'),
        d = l(),
        c = () => {
          var C, x;
          e == null || e.afterClose(),
            (x = (C = r.value).afterClose) === null ||
              x === void 0 ||
              x.call(C);
        },
        v = function() {
          e.destroyAction(...arguments);
        };
      n({ destroy: v });
      const g =
          (o = r.value.okCancel) !== null && o !== void 0
            ? o
            : r.value.type === 'confirm',
        [f] = Gt('Modal', Yn.Modal);
      return () =>
        s(
          Eo,
          A(
            A({ prefixCls: m, rootPrefixCls: d }, r.value),
            {},
            {
              close: v,
              open: a.value,
              afterClose: c,
              okText:
                r.value.okText ||
                (g
                  ? f == null
                    ? void 0
                    : f.value.okText
                  : f == null
                  ? void 0
                  : f.value.justOkText),
              direction: r.value.direction || i.value,
              cancelText:
                r.value.cancelText || (f == null ? void 0 : f.value.cancelText)
            }
          ),
          null
        );
    }
  });
let Fn = 0;
const wl = Z({
  name: 'ElementsHolder',
  inheritAttrs: !1,
  setup(e, t) {
    let { expose: n } = t;
    const o = k([]);
    return (
      n({
        addModal: r => (
          o.value.push(r),
          (o.value = o.value.slice()),
          () => {
            o.value = o.value.filter(i => i !== r);
          }
        )
      }),
      () => o.value.map(r => r())
    );
  }
});
function Tl() {
  const e = k(null),
    t = k([]);
  ne(
    t,
    () => {
      t.value.length &&
        ([...t.value].forEach(i => {
          i();
        }),
        (t.value = []));
    },
    { immediate: !0 }
  );
  const n = r =>
      function(l) {
        var m;
        Fn += 1;
        const d = k(!0),
          c = k(null),
          v = k(D(l)),
          g = k({});
        ne(
          () => l,
          b => {
            $(u(u({}, oo(b) ? b.value : b), g.value));
          }
        );
        const f = function() {
          d.value = !1;
          for (var b = arguments.length, _ = new Array(b), p = 0; p < b; p++)
            _[p] = arguments[p];
          const P = _.some(T => T && T.triggerCancel);
          v.value.onCancel && P && v.value.onCancel(() => {}, ..._.slice(1));
        };
        let C;
        const x = () =>
          s(
            Sl,
            {
              key: `modal-${Fn}`,
              config: r(v.value),
              ref: c,
              open: d.value,
              destroyAction: f,
              afterClose: () => {
                C == null || C();
              }
            },
            null
          );
        (C = (m = e.value) === null || m === void 0 ? void 0 : m.addModal(x)),
          C && Xe.push(C);
        const $ = b => {
          v.value = u(u({}, v.value), b);
        };
        return {
          destroy: () => {
            c.value ? f() : (t.value = [...t.value, f]);
          },
          update: b => {
            (g.value = b),
              c.value ? $(b) : (t.value = [...t.value, () => $(b)]);
          }
        };
      },
    o = B(() => ({
      info: n(Mo),
      success: n(Ao),
      error: n(Bo),
      warning: n(No),
      confirm: n(Ro)
    })),
    a = Symbol('modalHolderKey');
  return [o.value, () => s(wl, { key: a, ref: e }, null)];
}
function Do(e) {
  return ft(No(e));
}
be.useModal = Tl;
be.info = function(t) {
  return ft(Mo(t));
};
be.success = function(t) {
  return ft(Ao(t));
};
be.error = function(t) {
  return ft(Bo(t));
};
be.warning = Do;
be.warn = Do;
be.confirm = function(t) {
  return ft(Ro(t));
};
be.destroyAll = function() {
  for (; Xe.length; ) {
    const t = Xe.pop();
    t && t();
  }
};
be.install = function(e) {
  return e.component(be.name, be), e;
};
var Pl =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var a = 0, o = Object.getOwnPropertySymbols(e); a < o.length; a++)
        t.indexOf(o[a]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[a]) &&
          (n[o[a]] = e[o[a]]);
    return n;
  };
const Ol = {
    border: 0,
    background: 'transparent',
    padding: 0,
    lineHeight: 'inherit',
    display: 'inline-block'
  },
  _l = Z({
    compatConfig: { MODE: 3 },
    name: 'TransButton',
    inheritAttrs: !1,
    props: {
      noStyle: { type: Boolean, default: void 0 },
      onClick: Function,
      disabled: { type: Boolean, default: void 0 },
      autofocus: { type: Boolean, default: void 0 }
    },
    setup(e, t) {
      let { slots: n, emit: o, attrs: a, expose: r } = t;
      const i = k(),
        l = g => {
          const { keyCode: f } = g;
          f === re.ENTER && g.preventDefault();
        },
        m = g => {
          const { keyCode: f } = g;
          f === re.ENTER && o('click', g);
        },
        d = g => {
          o('click', g);
        },
        c = () => {
          i.value && i.value.focus();
        },
        v = () => {
          i.value && i.value.blur();
        };
      return (
        _e(() => {
          e.autofocus && c();
        }),
        r({ focus: c, blur: v }),
        () => {
          var g;
          const { noStyle: f, disabled: C } = e,
            x = Pl(e, ['noStyle', 'disabled']);
          let $ = {};
          return (
            f || ($ = u({}, Ol)),
            C && ($.pointerEvents = 'none'),
            s(
              'div',
              A(
                A(A({ role: 'button', tabindex: 0, ref: i }, x), a),
                {},
                {
                  onClick: d,
                  onKeydown: l,
                  onKeyup: m,
                  style: u(u({}, $), a.style || {})
                }
              ),
              [(g = n.default) === null || g === void 0 ? void 0 : g.call(n)]
            )
          );
        }
      );
    }
  }),
  Wn = _l,
  Il = (e, t, n, o) => {
    const { sizeMarginHeadingVerticalEnd: a, fontWeightStrong: r } = o;
    return {
      marginBottom: a,
      color: n,
      fontWeight: r,
      fontSize: e,
      lineHeight: t
    };
  },
  El = e => {
    const t = [1, 2, 3, 4, 5],
      n = {};
    return (
      t.forEach(o => {
        n[
          `
      h${o}&,
      div&-h${o},
      div&-h${o} > textarea,
      h${o}
    `
        ] = Il(
          e[`fontSizeHeading${o}`],
          e[`lineHeightHeading${o}`],
          e.colorTextHeading,
          e
        );
      }),
      n
    );
  },
  Nl = e => {
    const { componentCls: t } = e;
    return {
      'a&, a': u(u({}, uo(e)), {
        textDecoration: e.linkDecoration,
        '&:active, &:hover': { textDecoration: e.linkHoverDecoration },
        [`&[disabled], &${t}-disabled`]: {
          color: e.colorTextDisabled,
          cursor: 'not-allowed',
          '&:active, &:hover': { color: e.colorTextDisabled },
          '&:active': { pointerEvents: 'none' }
        }
      })
    };
  },
  Ml = () => ({
    code: {
      margin: '0 0.2em',
      paddingInline: '0.4em',
      paddingBlock: '0.2em 0.1em',
      fontSize: '85%',
      background: 'rgba(150, 150, 150, 0.1)',
      border: '1px solid rgba(100, 100, 100, 0.2)',
      borderRadius: 3
    },
    kbd: {
      margin: '0 0.2em',
      paddingInline: '0.4em',
      paddingBlock: '0.15em 0.1em',
      fontSize: '90%',
      background: 'rgba(150, 150, 150, 0.06)',
      border: '1px solid rgba(100, 100, 100, 0.2)',
      borderBottomWidth: 2,
      borderRadius: 3
    },
    mark: { padding: 0, backgroundColor: ai[2] },
    'u, ins': { textDecoration: 'underline', textDecorationSkipInk: 'auto' },
    's, del': { textDecoration: 'line-through' },
    strong: { fontWeight: 600 },
    'ul, ol': {
      marginInline: 0,
      marginBlock: '0 1em',
      padding: 0,
      li: {
        marginInline: '20px 0',
        marginBlock: 0,
        paddingInline: '4px 0',
        paddingBlock: 0
      }
    },
    ul: { listStyleType: 'circle', ul: { listStyleType: 'disc' } },
    ol: { listStyleType: 'decimal' },
    'pre, blockquote': { margin: '1em 0' },
    pre: {
      padding: '0.4em 0.6em',
      whiteSpace: 'pre-wrap',
      wordWrap: 'break-word',
      background: 'rgba(150, 150, 150, 0.1)',
      border: '1px solid rgba(100, 100, 100, 0.2)',
      borderRadius: 3,
      code: {
        display: 'inline',
        margin: 0,
        padding: 0,
        fontSize: 'inherit',
        fontFamily: 'inherit',
        background: 'transparent',
        border: 0
      }
    },
    blockquote: {
      paddingInline: '0.6em 0',
      paddingBlock: 0,
      borderInlineStart: '4px solid rgba(100, 100, 100, 0.2)',
      opacity: 0.85
    }
  }),
  Al = e => {
    const { componentCls: t } = e,
      o = Wa(e).inputPaddingVertical + 1;
    return {
      '&-edit-content': {
        position: 'relative',
        'div&': {
          insetInlineStart: -e.paddingSM,
          marginTop: -o,
          marginBottom: `calc(1em - ${o}px)`
        },
        [`${t}-edit-content-confirm`]: {
          position: 'absolute',
          insetInlineEnd: e.marginXS + 2,
          insetBlockEnd: e.marginXS,
          color: e.colorTextDescription,
          fontWeight: 'normal',
          fontSize: e.fontSize,
          fontStyle: 'normal',
          pointerEvents: 'none'
        },
        textarea: {
          margin: '0!important',
          MozTransition: 'none',
          height: '1em'
        }
      }
    };
  },
  Bl = e => ({
    '&-copy-success': {
      '\n    &,\n    &:hover,\n    &:focus': { color: e.colorSuccess }
    }
  }),
  Rl = () => ({
    '\n  a&-ellipsis,\n  span&-ellipsis\n  ': {
      display: 'inline-block',
      maxWidth: '100%'
    },
    '&-single-line': { whiteSpace: 'nowrap' },
    '&-ellipsis-single-line': {
      overflow: 'hidden',
      textOverflow: 'ellipsis',
      'a&, span&': { verticalAlign: 'bottom' }
    },
    '&-ellipsis-multiple-line': {
      display: '-webkit-box',
      overflow: 'hidden',
      WebkitLineClamp: 3,
      WebkitBoxOrient: 'vertical'
    }
  }),
  Dl = e => {
    const { componentCls: t, sizeMarginHeadingVerticalStart: n } = e;
    return {
      [t]: u(
        u(
          u(
            u(
              u(
                u(
                  u(
                    u(
                      u(
                        {
                          color: e.colorText,
                          wordBreak: 'break-word',
                          lineHeight: e.lineHeight,
                          [`&${t}-secondary`]: {
                            color: e.colorTextDescription
                          },
                          [`&${t}-success`]: { color: e.colorSuccess },
                          [`&${t}-warning`]: { color: e.colorWarning },
                          [`&${t}-danger`]: {
                            color: e.colorError,
                            'a&:active, a&:focus': {
                              color: e.colorErrorActive
                            },
                            'a&:hover': { color: e.colorErrorHover }
                          },
                          [`&${t}-disabled`]: {
                            color: e.colorTextDisabled,
                            cursor: 'not-allowed',
                            userSelect: 'none'
                          },
                          '\n        div&,\n        p\n      ': {
                            marginBottom: '1em'
                          }
                        },
                        El(e)
                      ),
                      {
                        [`
      & + h1${t},
      & + h2${t},
      & + h3${t},
      & + h4${t},
      & + h5${t}
      `]: { marginTop: n },
                        '\n      div,\n      ul,\n      li,\n      p,\n      h1,\n      h2,\n      h3,\n      h4,\n      h5': {
                          '\n        + h1,\n        + h2,\n        + h3,\n        + h4,\n        + h5\n        ': {
                            marginTop: n
                          }
                        }
                      }
                    ),
                    Ml()
                  ),
                  Nl(e)
                ),
                {
                  [`
        ${t}-expand,
        ${t}-edit,
        ${t}-copy
      `]: u(u({}, uo(e)), { marginInlineStart: e.marginXXS })
                }
              ),
              Al(e)
            ),
            Bl(e)
          ),
          Rl()
        ),
        { '&-rtl': { direction: 'rtl' } }
      )
    };
  },
  Lo = Tt('Typography', e => [Dl(e)], {
    sizeMarginHeadingVerticalStart: '1.2em',
    sizeMarginHeadingVerticalEnd: '0.5em'
  }),
  Ll = () => ({
    prefixCls: String,
    value: String,
    maxlength: Number,
    autoSize: { type: [Boolean, Object] },
    onSave: Function,
    onCancel: Function,
    onEnd: Function,
    onChange: Function,
    originContent: String,
    direction: String,
    component: String
  }),
  zl = Z({
    compatConfig: { MODE: 3 },
    name: 'Editable',
    inheritAttrs: !1,
    props: Ll(),
    setup(e, t) {
      let { emit: n, slots: o, attrs: a } = t;
      const { prefixCls: r } = va(e),
        i = Ke({
          current: e.value || '',
          lastKeyCode: void 0,
          inComposition: !1,
          cancelFlag: !1
        });
      ne(
        () => e.value,
        S => {
          i.current = S;
        }
      );
      const l = G();
      _e(() => {
        var S;
        if (l.value) {
          const b =
              (S = l.value) === null || S === void 0
                ? void 0
                : S.resizableTextArea,
            _ = b == null ? void 0 : b.textArea;
          _.focus();
          const { length: p } = _.value;
          _.setSelectionRange(p, p);
        }
      });
      function m(S) {
        l.value = S;
      }
      function d(S) {
        let {
          target: { value: b }
        } = S;
        (i.current = b.replace(/[\r\n]/g, '')), n('change', i.current);
      }
      function c() {
        i.inComposition = !0;
      }
      function v() {
        i.inComposition = !1;
      }
      function g(S) {
        const { keyCode: b } = S;
        b === re.ENTER && S.preventDefault(),
          !i.inComposition && (i.lastKeyCode = b);
      }
      function f(S) {
        const {
          keyCode: b,
          ctrlKey: _,
          altKey: p,
          metaKey: P,
          shiftKey: T
        } = S;
        i.lastKeyCode === b &&
          !i.inComposition &&
          !_ &&
          !p &&
          !P &&
          !T &&
          (b === re.ENTER
            ? (x(), n('end'))
            : b === re.ESC && ((i.current = e.originContent), n('cancel')));
      }
      function C() {
        x();
      }
      function x() {
        n('save', i.current.trim());
      }
      const [$, h] = Lo(r);
      return () => {
        const S = J(
          {
            [`${r.value}`]: !0,
            [`${r.value}-edit-content`]: !0,
            [`${r.value}-rtl`]: e.direction === 'rtl',
            [e.component ? `${r.value}-${e.component}` : '']: !0
          },
          a.class,
          h.value
        );
        return $(
          s('div', A(A({}, a), {}, { class: S }), [
            s(
              Ga,
              {
                ref: m,
                maxlength: e.maxlength,
                value: i.current,
                onChange: d,
                onKeydown: g,
                onKeyup: f,
                onCompositionstart: c,
                onCompositionend: v,
                onBlur: C,
                rows: 1,
                autoSize: e.autoSize === void 0 || e.autoSize
              },
              null
            ),
            o.enterIcon
              ? o.enterIcon({
                  className: `${e.prefixCls}-edit-content-confirm`
                })
              : s(Er, { class: `${e.prefixCls}-edit-content-confirm` }, null)
          ])
        );
      };
    }
  }),
  kl = zl,
  jl = 3,
  Hl = 8;
let ve;
const Lt = { padding: 0, margin: 0, display: 'inline', lineHeight: 'inherit' };
function Fl(e) {
  return Array.prototype.slice
    .apply(e)
    .map(n => `${n}: ${e.getPropertyValue(n)};`)
    .join('');
}
function zo(e, t) {
  e.setAttribute('aria-hidden', 'true');
  const n = window.getComputedStyle(t),
    o = Fl(n);
  e.setAttribute('style', o),
    (e.style.position = 'fixed'),
    (e.style.left = '0'),
    (e.style.height = 'auto'),
    (e.style.minHeight = 'auto'),
    (e.style.maxHeight = 'auto'),
    (e.style.paddingTop = '0'),
    (e.style.paddingBottom = '0'),
    (e.style.borderTopWidth = '0'),
    (e.style.borderBottomWidth = '0'),
    (e.style.top = '-999999px'),
    (e.style.zIndex = '-1000'),
    (e.style.textOverflow = 'clip'),
    (e.style.whiteSpace = 'normal'),
    (e.style.webkitLineClamp = 'none');
}
function Wl(e) {
  const t = document.createElement('div');
  zo(t, e),
    t.appendChild(document.createTextNode('text')),
    document.body.appendChild(t);
  const n = t.getBoundingClientRect().height;
  return document.body.removeChild(t), n;
}
const Gl = (e, t, n, o, a) => {
  ve ||
    ((ve = document.createElement('div')),
    ve.setAttribute('aria-hidden', 'true'),
    document.body.appendChild(ve));
  const { rows: r, suffix: i = '' } = t,
    l = Wl(e),
    m = Math.round(l * r * 100) / 100;
  zo(ve, e);
  const d = ma({
    render() {
      return s('div', { style: Lt }, [
        s('span', { style: Lt }, [n, i]),
        s('span', { style: Lt }, [o])
      ]);
    }
  });
  d.mount(ve);
  function c() {
    return Math.round(ve.getBoundingClientRect().height * 100) / 100 - 0.1 <= m;
  }
  if (c()) return d.unmount(), { content: n, text: ve.innerHTML, ellipsis: !1 };
  const v = Array.prototype.slice
      .apply(ve.childNodes[0].childNodes[0].cloneNode(!0).childNodes)
      .filter(b => {
        let { nodeType: _, data: p } = b;
        return _ !== Hl && p !== '';
      }),
    g = Array.prototype.slice.apply(
      ve.childNodes[0].childNodes[1].cloneNode(!0).childNodes
    );
  d.unmount();
  const f = [];
  ve.innerHTML = '';
  const C = document.createElement('span');
  ve.appendChild(C);
  const x = document.createTextNode(a + i);
  C.appendChild(x),
    g.forEach(b => {
      ve.appendChild(b);
    });
  function $(b) {
    C.insertBefore(b, x);
  }
  function h(b, _) {
    let p = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : 0,
      P =
        arguments.length > 3 && arguments[3] !== void 0
          ? arguments[3]
          : _.length,
      T = arguments.length > 4 && arguments[4] !== void 0 ? arguments[4] : 0;
    const N = Math.floor((p + P) / 2),
      z = _.slice(0, N);
    if (((b.textContent = z), p >= P - 1))
      for (let R = P; R >= p; R -= 1) {
        const F = _.slice(0, R);
        if (((b.textContent = F), c() || !F))
          return R === _.length
            ? { finished: !1, vNode: _ }
            : { finished: !0, vNode: F };
      }
    return c() ? h(b, _, N, P, N) : h(b, _, p, N, T);
  }
  function S(b) {
    if (b.nodeType === jl) {
      const p = b.textContent || '',
        P = document.createTextNode(p);
      return $(P), h(P, p);
    }
    return { finished: !1, vNode: null };
  }
  return (
    v.some(b => {
      const { finished: _, vNode: p } = S(b);
      return p && f.push(p), _;
    }),
    { content: f, text: ve.innerHTML, ellipsis: !0 }
  );
};
var Vl =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var a = 0, o = Object.getOwnPropertySymbols(e); a < o.length; a++)
        t.indexOf(o[a]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[a]) &&
          (n[o[a]] = e[o[a]]);
    return n;
  };
const Xl = () => ({ prefixCls: String, direction: String, component: String }),
  Kl = Z({
    name: 'ATypography',
    inheritAttrs: !1,
    props: Xl(),
    setup(e, t) {
      let { slots: n, attrs: o } = t;
      const { prefixCls: a, direction: r } = nt('typography', e),
        [i, l] = Lo(a);
      return () => {
        var m;
        const d = u(u({}, e), o),
          { prefixCls: c, direction: v, component: g = 'article' } = d,
          f = Vl(d, ['prefixCls', 'direction', 'component']);
        return i(
          s(
            g,
            A(
              A({}, f),
              {},
              {
                class: J(
                  a.value,
                  { [`${a.value}-rtl`]: r.value === 'rtl' },
                  o.class,
                  l.value
                )
              }
            ),
            {
              default: () => [
                (m = n.default) === null || m === void 0 ? void 0 : m.call(n)
              ]
            }
          )
        );
      };
    }
  }),
  ge = Kl,
  Ul = () => {
    const e = document.getSelection();
    if (!e.rangeCount) return function() {};
    let t = document.activeElement;
    const n = [];
    for (let o = 0; o < e.rangeCount; o++) n.push(e.getRangeAt(o));
    switch (t.tagName.toUpperCase()) {
      case 'INPUT':
      case 'TEXTAREA':
        t.blur();
        break;
      default:
        t = null;
        break;
    }
    return (
      e.removeAllRanges(),
      function() {
        e.type === 'Caret' && e.removeAllRanges(),
          e.rangeCount ||
            n.forEach(function(o) {
              e.addRange(o);
            }),
          t && t.focus();
      }
    );
  },
  Yl = Ul,
  Gn = { 'text/plain': 'Text', 'text/html': 'Url', default: 'Text' },
  Zl = 'Copy to clipboard: #{key}, Enter';
function Ql(e) {
  const t = (/mac os x/i.test(navigator.userAgent) ? '⌘' : 'Ctrl') + '+C';
  return e.replace(/#{\s*key\s*}/g, t);
}
function ql(e, t) {
  let n,
    o,
    a,
    r,
    i,
    l = !1;
  t || (t = {});
  const m = t.debug || !1;
  try {
    if (
      ((o = Yl()),
      (a = document.createRange()),
      (r = document.getSelection()),
      (i = document.createElement('span')),
      (i.textContent = e),
      (i.style.all = 'unset'),
      (i.style.position = 'fixed'),
      (i.style.top = 0),
      (i.style.clip = 'rect(0, 0, 0, 0)'),
      (i.style.whiteSpace = 'pre'),
      (i.style.webkitUserSelect = 'text'),
      (i.style.MozUserSelect = 'text'),
      (i.style.msUserSelect = 'text'),
      (i.style.userSelect = 'text'),
      i.addEventListener('copy', function(c) {
        if ((c.stopPropagation(), t.format))
          if ((c.preventDefault(), typeof c.clipboardData > 'u')) {
            m && console.warn('unable to use e.clipboardData'),
              m && console.warn('trying IE specific stuff'),
              window.clipboardData.clearData();
            const v = Gn[t.format] || Gn.default;
            window.clipboardData.setData(v, e);
          } else
            c.clipboardData.clearData(), c.clipboardData.setData(t.format, e);
        t.onCopy && (c.preventDefault(), t.onCopy(c.clipboardData));
      }),
      document.body.appendChild(i),
      a.selectNodeContents(i),
      r.addRange(a),
      !document.execCommand('copy'))
    )
      throw new Error('copy command was unsuccessful');
    l = !0;
  } catch (d) {
    m && console.error('unable to copy using execCommand: ', d),
      m && console.warn('trying IE specific stuff');
    try {
      window.clipboardData.setData(t.format || 'text', e),
        t.onCopy && t.onCopy(window.clipboardData),
        (l = !0);
    } catch (c) {
      m && console.error('unable to copy using clipboardData: ', c),
        m && console.error('falling back to prompt'),
        (n = Ql('message' in t ? t.message : Zl)),
        window.prompt(n, e);
    }
  } finally {
    r &&
      (typeof r.removeRange == 'function'
        ? r.removeRange(a)
        : r.removeAllRanges()),
      i && document.body.removeChild(i),
      o();
  }
  return l;
}
var Jl =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var a = 0, o = Object.getOwnPropertySymbols(e); a < o.length; a++)
        t.indexOf(o[a]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[a]) &&
          (n[o[a]] = e[o[a]]);
    return n;
  };
const es = fo('webkitLineClamp'),
  ts = fo('textOverflow'),
  Vn = '...',
  pt = () => ({
    editable: { type: [Boolean, Object], default: void 0 },
    copyable: { type: [Boolean, Object], default: void 0 },
    prefixCls: String,
    component: String,
    type: String,
    disabled: { type: Boolean, default: void 0 },
    ellipsis: { type: [Boolean, Object], default: void 0 },
    code: { type: Boolean, default: void 0 },
    mark: { type: Boolean, default: void 0 },
    underline: { type: Boolean, default: void 0 },
    delete: { type: Boolean, default: void 0 },
    strong: { type: Boolean, default: void 0 },
    keyboard: { type: Boolean, default: void 0 },
    content: String,
    'onUpdate:content': Function
  }),
  ns = Z({
    compatConfig: { MODE: 3 },
    name: 'TypographyBase',
    inheritAttrs: !1,
    props: pt(),
    setup(e, t) {
      let { slots: n, attrs: o, emit: a } = t;
      const { prefixCls: r, direction: i } = nt('typography', e),
        l = Ke({
          copied: !1,
          ellipsisText: '',
          ellipsisContent: null,
          isEllipsis: !1,
          expanded: !1,
          clientRendered: !1,
          expandStr: '',
          copyStr: '',
          copiedStr: '',
          editStr: '',
          copyId: void 0,
          rafId: void 0,
          prevProps: void 0,
          originContent: ''
        }),
        m = G(),
        d = G(),
        c = B(() => {
          const y = e.ellipsis;
          return y
            ? u({ rows: 1, expandable: !1 }, typeof y == 'object' ? y : null)
            : {};
        });
      _e(() => {
        l.clientRendered = !0;
      }),
        ut(() => {
          clearTimeout(l.copyId), Oe.cancel(l.rafId);
        }),
        ne(
          [() => c.value.rows, () => e.content],
          () => {
            zt(() => {
              P();
            });
          },
          { flush: 'post', deep: !0, immediate: !0 }
        ),
        Ye(() => {
          e.content === void 0 &&
            (Ue(
              !e.editable,
              'Typography',
              'When `editable` is enabled, please use `content` instead of children'
            ),
            Ue(
              !e.ellipsis,
              'Typography',
              'When `ellipsis` is enabled, please use `content` instead of children'
            ));
        });
      function v() {
        var y;
        return e.ellipsis || e.editable
          ? e.content
          : (y = Bt(m.value)) === null || y === void 0
          ? void 0
          : y.innerText;
      }
      function g(y) {
        const { onExpand: I } = c.value;
        (l.expanded = !0), I == null || I(y);
      }
      function f(y) {
        y.preventDefault(), (l.originContent = e.content), p(!0);
      }
      function C(y) {
        x(y), p(!1);
      }
      function x(y) {
        const { onChange: I } = S.value;
        y !== e.content && (a('update:content', y), I == null || I(y));
      }
      function $() {
        var y, I;
        (I = (y = S.value).onCancel) === null || I === void 0 || I.call(y),
          p(!1);
      }
      function h(y) {
        y.preventDefault(), y.stopPropagation();
        const { copyable: I } = e,
          E = u({}, typeof I == 'object' ? I : null);
        E.text === void 0 && (E.text = v()),
          ql(E.text || ''),
          (l.copied = !0),
          zt(() => {
            E.onCopy && E.onCopy(y),
              (l.copyId = setTimeout(() => {
                l.copied = !1;
              }, 3e3));
          });
      }
      const S = B(() => {
          const y = e.editable;
          return y ? u({}, typeof y == 'object' ? y : null) : { editing: !1 };
        }),
        [b, _] = ct(!1, { value: B(() => S.value.editing) });
      function p(y) {
        const { onStart: I } = S.value;
        y && I && I(), _(y);
      }
      ne(
        b,
        y => {
          var I;
          y || (I = d.value) === null || I === void 0 || I.focus();
        },
        { flush: 'post' }
      );
      function P() {
        Oe.cancel(l.rafId),
          (l.rafId = Oe(() => {
            N();
          }));
      }
      const T = B(() => {
          const {
            rows: y,
            expandable: I,
            suffix: E,
            onEllipsis: O,
            tooltip: L
          } = c.value;
          return E || L || e.editable || e.copyable || I || O
            ? !1
            : y === 1
            ? ts
            : es;
        }),
        N = () => {
          const { ellipsisText: y, isEllipsis: I } = l,
            { rows: E, suffix: O, onEllipsis: L } = c.value;
          if (
            !E ||
            E < 0 ||
            !Bt(m.value) ||
            l.expanded ||
            e.content === void 0 ||
            T.value
          )
            return;
          const { content: W, text: H, ellipsis: oe } = Gl(
            Bt(m.value),
            { rows: E, suffix: O },
            e.content,
            ee(!0),
            Vn
          );
          (y !== H || l.isEllipsis !== oe) &&
            ((l.ellipsisText = H),
            (l.ellipsisContent = W),
            (l.isEllipsis = oe),
            I !== oe && L && L(oe));
        };
      function z(y, I) {
        let {
            mark: E,
            code: O,
            underline: L,
            delete: W,
            strong: H,
            keyboard: oe
          } = y,
          le = I;
        function q(ae, U) {
          if (!ae) return;
          const ce = (function() {
            return le;
          })();
          le = s(U, null, { default: () => [ce] });
        }
        return (
          q(H, 'strong'),
          q(L, 'u'),
          q(W, 'del'),
          q(O, 'code'),
          q(E, 'mark'),
          q(oe, 'kbd'),
          le
        );
      }
      function R(y) {
        const { expandable: I, symbol: E } = c.value;
        if (!I || (!y && (l.expanded || !l.isEllipsis))) return null;
        const O = (n.ellipsisSymbol ? n.ellipsisSymbol() : E) || l.expandStr;
        return s(
          'a',
          {
            key: 'expand',
            class: `${r.value}-expand`,
            onClick: g,
            'aria-label': l.expandStr
          },
          [O]
        );
      }
      function F() {
        if (!e.editable) return;
        const { tooltip: y, triggerType: I = ['icon'] } = e.editable,
          E = n.editableIcon
            ? n.editableIcon()
            : s(_r, { role: 'button' }, null),
          O = n.editableTooltip ? n.editableTooltip() : l.editStr,
          L = typeof O == 'string' ? O : '';
        return I.indexOf('icon') !== -1
          ? s(
              Dt,
              { key: 'edit', title: y === !1 ? '' : O },
              {
                default: () => [
                  s(
                    Wn,
                    {
                      ref: d,
                      class: `${r.value}-edit`,
                      onClick: f,
                      'aria-label': L
                    },
                    { default: () => [E] }
                  )
                ]
              }
            )
          : null;
      }
      function Q() {
        if (!e.copyable) return;
        const { tooltip: y } = e.copyable,
          I = l.copied ? l.copiedStr : l.copyStr,
          E = n.copyableTooltip ? n.copyableTooltip({ copied: l.copied }) : I,
          O = typeof E == 'string' ? E : '',
          L = l.copied ? s(Va, null, null) : s(Pr, null, null),
          W = n.copyableIcon ? n.copyableIcon({ copied: !!l.copied }) : L;
        return s(
          Dt,
          { key: 'copy', title: y === !1 ? '' : E },
          {
            default: () => [
              s(
                Wn,
                {
                  class: [
                    `${r.value}-copy`,
                    { [`${r.value}-copy-success`]: l.copied }
                  ],
                  onClick: h,
                  'aria-label': O
                },
                { default: () => [W] }
              )
            ]
          }
        );
      }
      function K() {
        const { class: y, style: I } = o,
          { maxlength: E, autoSize: O, onEnd: L } = S.value;
        return s(
          kl,
          {
            class: y,
            style: I,
            prefixCls: r.value,
            value: e.content,
            originContent: l.originContent,
            maxlength: E,
            autoSize: O,
            onSave: C,
            onChange: x,
            onCancel: $,
            onEnd: L,
            direction: i.value,
            component: e.component
          },
          { enterIcon: n.editableEnterIcon }
        );
      }
      function ee(y) {
        return [R(y), F(), Q()].filter(I => I);
      }
      return () => {
        var y;
        const { triggerType: I = ['icon'] } = S.value,
          E =
            e.ellipsis || e.editable
              ? e.content !== void 0
                ? e.content
                : (y = n.default) === null || y === void 0
                ? void 0
                : y.call(n)
              : n.default
              ? n.default()
              : e.content;
        return b.value
          ? K()
          : s(
              sa,
              {
                componentName: 'Text',
                children: O => {
                  const L = u(u({}, e), o),
                    {
                      type: W,
                      disabled: H,
                      content: oe,
                      class: le,
                      style: q
                    } = L,
                    ae = Jl(L, [
                      'type',
                      'disabled',
                      'content',
                      'class',
                      'style'
                    ]),
                    { rows: U, suffix: ce, tooltip: me } = c.value,
                    { edit: ye, copy: Ie, copied: He, expand: Re } = O;
                  (l.editStr = ye),
                    (l.copyStr = Ie),
                    (l.copiedStr = He),
                    (l.expandStr = Re);
                  const pe = Be(ae, [
                      'prefixCls',
                      'editable',
                      'copyable',
                      'ellipsis',
                      'mark',
                      'code',
                      'delete',
                      'underline',
                      'strong',
                      'keyboard',
                      'onUpdate:content'
                    ]),
                    Ce = T.value,
                    Ee = U === 1 && Ce,
                    he = U && U > 1 && Ce;
                  let w = E,
                    M;
                  if (U && l.isEllipsis && !l.expanded && !Ce) {
                    const { title: Y } = ae;
                    let X = Y || '';
                    !Y &&
                      (typeof E == 'string' || typeof E == 'number') &&
                      (X = String(E)),
                      (X =
                        X == null
                          ? void 0
                          : X.slice(String(l.ellipsisContent || '').length)),
                      (w = s(ke, null, [
                        ga(l.ellipsisContent),
                        s('span', { title: X, 'aria-hidden': 'true' }, [Vn]),
                        ce
                      ]));
                  } else w = s(ke, null, [E, ce]);
                  w = z(e, w);
                  const j = me && U && l.isEllipsis && !l.expanded && !Ce,
                    V = n.ellipsisTooltip ? n.ellipsisTooltip() : me;
                  return s(
                    kt,
                    { onResize: P, disabled: !U },
                    {
                      default: () => [
                        s(
                          ge,
                          A(
                            {
                              ref: m,
                              class: [
                                {
                                  [`${r.value}-${W}`]: W,
                                  [`${r.value}-disabled`]: H,
                                  [`${r.value}-ellipsis`]: U,
                                  [`${r.value}-single-line`]:
                                    U === 1 && !l.isEllipsis,
                                  [`${r.value}-ellipsis-single-line`]: Ee,
                                  [`${r.value}-ellipsis-multiple-line`]: he
                                },
                                le
                              ],
                              style: u(u({}, q), {
                                WebkitLineClamp: he ? U : void 0
                              }),
                              'aria-label': M,
                              direction: i.value,
                              onClick: I.indexOf('text') !== -1 ? f : () => {}
                            },
                            pe
                          ),
                          {
                            default: () => [
                              j
                                ? s(
                                    Dt,
                                    { title: me === !0 ? E : V },
                                    { default: () => [s('span', null, [w])] }
                                  )
                                : w,
                              ee()
                            ]
                          }
                        )
                      ]
                    }
                  );
                }
              },
              null
            );
      };
    }
  }),
  vt = ns;
var os =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var a = 0, o = Object.getOwnPropertySymbols(e); a < o.length; a++)
        t.indexOf(o[a]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[a]) &&
          (n[o[a]] = e[o[a]]);
    return n;
  };
const as = () =>
    Be(u(u({}, pt()), { ellipsis: { type: Boolean, default: void 0 } }), [
      'component'
    ]),
  It = (e, t) => {
    let { slots: n, attrs: o } = t;
    const a = u(u({}, e), o),
      { ellipsis: r, rel: i } = a,
      l = os(a, ['ellipsis', 'rel']);
    Ue(
      typeof r != 'object',
      'Typography.Link',
      '`ellipsis` only supports boolean value.'
    );
    const m = u(u({}, l), {
      rel: i === void 0 && l.target === '_blank' ? 'noopener noreferrer' : i,
      ellipsis: !!r,
      component: 'a'
    });
    return delete m.navigate, s(vt, m, n);
  };
It.displayName = 'ATypographyLink';
It.inheritAttrs = !1;
It.props = as();
const an = It,
  is = () => Be(pt(), ['component']),
  Et = (e, t) => {
    let { slots: n, attrs: o } = t;
    const a = u(u(u({}, e), { component: 'div' }), o);
    return s(vt, a, n);
  };
Et.displayName = 'ATypographyParagraph';
Et.inheritAttrs = !1;
Et.props = is();
const ko = Et,
  rs = () =>
    u(u({}, Be(pt(), ['component'])), {
      ellipsis: { type: [Boolean, Object], default: void 0 }
    }),
  Nt = (e, t) => {
    let { slots: n, attrs: o } = t;
    const { ellipsis: a } = e;
    Ue(
      typeof a != 'object' || !a || (!('expandable' in a) && !('rows' in a)),
      'Typography.Text',
      '`ellipsis` do not support `expandable` or `rows` props.'
    );
    const r = u(
      u(u({}, e), {
        ellipsis: a && typeof a == 'object' ? Be(a, ['expandable', 'rows']) : a,
        component: 'span'
      }),
      o
    );
    return s(vt, r, n);
  };
Nt.displayName = 'ATypographyText';
Nt.inheritAttrs = !1;
Nt.props = rs();
const wt = Nt;
var ls =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var a = 0, o = Object.getOwnPropertySymbols(e); a < o.length; a++)
        t.indexOf(o[a]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[a]) &&
          (n[o[a]] = e[o[a]]);
    return n;
  };
const ss = ca(1, 2, 3, 4, 5),
  cs = () => u(u({}, Be(pt(), ['component', 'strong'])), { level: Number }),
  Mt = (e, t) => {
    let { slots: n, attrs: o } = t;
    const { level: a = 1 } = e,
      r = ls(e, ['level']);
    let i;
    ss.includes(a)
      ? (i = `h${a}`)
      : (Ue(
          !1,
          'Typography',
          'Title only accept `1 | 2 | 3 | 4 | 5` as `level` value.'
        ),
        (i = 'h1'));
    const l = u(u(u({}, r), { component: i }), o);
    return s(vt, l, n);
  };
Mt.displayName = 'ATypographyTitle';
Mt.inheritAttrs = !1;
Mt.props = cs();
const jo = Mt;
ge.Text = wt;
ge.Title = jo;
ge.Paragraph = ko;
ge.Link = an;
ge.Base = vt;
ge.install = function(e) {
  return (
    e.component(ge.name, ge),
    e.component(ge.Text.displayName, wt),
    e.component(ge.Title.displayName, jo),
    e.component(ge.Paragraph.displayName, ko),
    e.component(ge.Link.displayName, an),
    e
  );
};
const us = ba('renderCondition', () => {
    const e = G({}),
      t = Zn(),
      { vendorSettings: n } = ao(t),
      o = l => {
        const { fields: m } = l;
        m.forEach(d => {
          if (d != null && d.render_condition) {
            const { key: c, value: v } = d.render_condition;
            e.value[c]
              ? e.value[c].childs.push({ id: d.id, value: v, render: !1 })
              : (e.value[c] = { childs: [{ id: d.id, value: v, render: !1 }] });
          }
        });
      },
      a = (l, m) => {
        if (!e.value[l]) return !1;
        const d = e.value[l].childs.filter(v => v.value.includes(m));
        d &&
          d.forEach(v => {
            (v.render = !0), r(v.id, !0);
          });
        const c = e.value[l].childs.filter(v => !v.value.includes(m));
        return (
          c.forEach(v => {
            (v.render = !1), r(v.id, !1);
          }),
          (e.value[l].childs = [...d, ...c]),
          !0
        );
      },
      r = (l, m) => {
        if (!e.value[l]) return !1;
        const d = e.value[l].childs,
          c = n.value[l];
        return (
          d &&
            d.forEach(v => {
              v.value.includes(c) ? (v.render = m) : (v.render = !1);
            }),
          (e.value[l].childs = d),
          !0
        );
      };
    return {
      conditions: e,
      addConditionsByTab: o,
      controlRenderChild: a,
      checkRenderCondition: (l, m) => {
        if (!e.value[l]) return !1;
        const d = e.value[l].childs.find(c => c.id === m);
        return d ? d.render : !1;
      }
    };
  }),
  ds = ['onClick'],
  fs = { key: 0 },
  ps = {
    href:
      'https://www.wcvendors.com/pricing/?utm_source=plugin&utm_medium=allplugins&utm_campaign=profeatures&utm_content=upsellbanner',
    target: '_blank'
  },
  vs = ['innerHTML'],
  ms = Je('div', { style: { height: '6em' } }, null, -1),
  gs = Z({
    __name: 'VendorEdit',
    props: { id: Number },
    setup(e) {
      const t = e,
        n = Ca(() =>
          ua(
            () => import('./DynamicControl.682f269f.js').then(x => x.D),
            [
              window.wcv_avp.pluginDirUrl +
                '/dist/common/DynamicControl.682f269f.js',
              window.wcv_avp.pluginDirUrl + '/dist/main.4e11cfe3.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/vendor.e5025a5c.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/antd.e3fbf92b.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/VendorStore.76a5f248.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/initDefaultProps.d90010a5.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.26871545.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.a5a3d068.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/assets/DynamicControl-1f35d3d7.css'
            ],
            import.meta.url
          )
        ),
        o = us(),
        a = G(window.wcv_avp.tabs);
      a.value.forEach(x => {
        o.addConditionsByTab(x);
      });
      const r = Xa(),
        i = Zn(),
        l = window.wcv_avp.logo_path,
        m = ya(),
        d = G('general'),
        { vendorSettings: c, showPopup: v } = ao(i),
        g = () => {
          m.push({ name: 'vendor' });
        },
        f = async () => {
          await i.saveSettings(t.id ?? 0);
        },
        C = async () => {
          await r.setVendorStatus(t.id ?? 0, 'deactivate');
        };
      return (x, $) => {
        var h, S;
        return (
          Me(),
          bt(
            ke,
            null,
            [
              s(
                D(lt),
                { size: 20, direction: 'vertical', style: { width: '100%' } },
                {
                  default: ie(() => {
                    var b;
                    return [
                      Je('div', null, [
                        Je(
                          'a',
                          { onClick: ha(g, ['prevent']) },
                          ' ← ' + Te(D(we)('allVendor')),
                          9,
                          ds
                        ),
                        Je(
                          'h1',
                          null,
                          Te(
                            ((b = D(c)) == null ? void 0 : b.shop_name) ??
                              D(c).display_name
                          ),
                          1
                        )
                      ])
                    ];
                  }),
                  _: 1
                }
              ),
              (h = D(c)) != null && h.code
                ? (Me(),
                  bt('h3', fs, Te((S = D(c)) == null ? void 0 : S.message), 1))
                : yt('v-if', !0),
              D(c).shop_name || D(c).display_name
                ? (Me(),
                  rt(
                    D(st),
                    {
                      key: 1,
                      activeKey: d.value,
                      'onUpdate:activeKey': $[0] || ($[0] = b => (d.value = b)),
                      size: 'large'
                    },
                    {
                      rightExtra: ie(() => [
                        s(D(lt), null, {
                          default: ie(() => {
                            var b;
                            return [
                              s(
                                D(et),
                                { type: 'primary', onClick: f },
                                {
                                  default: ie(() => [
                                    Fe(Te(D(we)('saveChanges')), 1)
                                  ]),
                                  _: 1
                                }
                              ),
                              ((b = D(c)) == null
                                ? void 0
                                : b.vendor_status) === 'active'
                                ? (Me(),
                                  rt(
                                    D(Ka),
                                    {
                                      key: 0,
                                      title: D(we)('confirmDeactive'),
                                      'ok-text': D(we)('ok'),
                                      'cancel-text': D(we)('cancel'),
                                      onConfirm: C
                                    },
                                    {
                                      default: ie(() => [
                                        s(
                                          D(et),
                                          { danger: '', type: 'primary' },
                                          {
                                            default: ie(() => [
                                              Fe(Te(D(we)('deactive')), 1)
                                            ]),
                                            _: 1
                                          }
                                        )
                                      ]),
                                      _: 1
                                    },
                                    8,
                                    ['title', 'ok-text', 'cancel-text']
                                  ))
                                : yt('v-if', !0)
                            ];
                          }),
                          _: 1
                        })
                      ]),
                      default: ie(() => [
                        (Me(!0),
                        bt(
                          ke,
                          null,
                          cn(
                            a.value,
                            b => (
                              Me(),
                              rt(
                                D(St),
                                { id: b.key, key: b.key, tab: b.label },
                                {
                                  default: ie(() => [
                                    (Me(!0),
                                    bt(
                                      ke,
                                      null,
                                      cn(
                                        b.fields,
                                        _ => (
                                          Me(),
                                          rt(
                                            D(n),
                                            { 'field-props': _ },
                                            null,
                                            8,
                                            ['field-props']
                                          )
                                        )
                                      ),
                                      256
                                    ))
                                  ]),
                                  _: 2
                                },
                                1032,
                                ['id', 'tab']
                              )
                            )
                          ),
                          128
                        ))
                      ]),
                      _: 1
                    },
                    8,
                    ['activeKey']
                  ))
                : yt('v-if', !0),
              D(c).shop_name || D(c).display_name
                ? (Me(),
                  rt(
                    D(lt),
                    { key: 2 },
                    {
                      default: ie(() => [
                        s(
                          D(et),
                          { type: 'primary', onClick: f },
                          {
                            default: ie(() => [
                              Fe(Te(D(we)('saveChanges')), 1)
                            ]),
                            _: 1
                          }
                        )
                      ]),
                      _: 1
                    }
                  ))
                : yt('v-if', !0),
              s(
                D(be),
                {
                  open: D(v),
                  'onUpdate:open':
                    $[2] || ($[2] = b => (oo(v) ? (v.value = b) : null)),
                  title: ''
                },
                {
                  footer: ie(() => [
                    s(
                      D(et),
                      {
                        type: 'primary',
                        onClick: $[1] || ($[1] = b => (v.value = !1))
                      },
                      { default: ie(() => [Fe(Te(D(we)('ok')), 1)]), _: 1 }
                    )
                  ]),
                  default: ie(() => [
                    s(
                      D(lt),
                      { direction: 'vertical', size: 'middle' },
                      {
                        default: ie(() => [
                          Je('a', ps, [
                            s(
                              D(gl),
                              {
                                src: D(l),
                                preview: !1,
                                width: 240,
                                height: 35
                              },
                              null,
                              8,
                              ['src']
                            )
                          ]),
                          s(
                            D(lt),
                            { direction: 'horizontal' },
                            {
                              default: ie(() => [
                                s(
                                  D(wt),
                                  { strong: '' },
                                  {
                                    default: ie(() => [
                                      Fe(Te(D(i).modalTitle), 1)
                                    ]),
                                    _: 1
                                  }
                                ),
                                s(
                                  D(Ua),
                                  { color: 'red' },
                                  {
                                    default: ie(() => [
                                      Fe(Te(D(we)('proFeature')), 1)
                                    ]),
                                    _: 1
                                  }
                                )
                              ]),
                              _: 1
                            }
                          ),
                          s(D(wt), null, {
                            default: ie(() => [
                              Je(
                                'p',
                                { innerHTML: D(i).modalContent },
                                null,
                                8,
                                vs
                              )
                            ]),
                            _: 1
                          }),
                          s(
                            D(an),
                            {
                              href: `https://www.wcvendors.com/pricing/?utm_source=plugin&utm_medium=allvendorssetting&utm_campaign=avprosetting_${
                                D(i).featureSlug
                              }`,
                              target: '_blank',
                              underline: ''
                            },
                            {
                              default: ie(() => [
                                Fe(Te(D(we)('seeAllFeatures')) + ' → ', 1)
                              ]),
                              _: 1
                            },
                            8,
                            ['href']
                          )
                        ]),
                        _: 1
                      }
                    )
                  ]),
                  _: 1
                },
                8,
                ['open']
              ),
              ms
            ],
            64
          )
        );
      };
    }
  }),
  bs = da(gs, [
    [
      '__file',
      '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/VendorEdit.vue'
    ]
  ]),
  ws = Object.freeze(
    Object.defineProperty(
      { __proto__: null, default: bs },
      Symbol.toStringTag,
      { value: 'Module' }
    )
  );
export { gl as I, ws as V, us as u };

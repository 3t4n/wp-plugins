import {
  k as Ge,
  o as rt,
  P as me,
  l as fe,
  _ as g,
  ac as Pr,
  g as Nt,
  m as Rt,
  r as et,
  j as wn,
  u as Ye,
  a as W,
  e as ie,
  H as On,
  n as Dt,
  K as Gn,
  ah as kt,
  af as xo,
  h as ye,
  s as Ue,
  q as Le,
  z as Me,
  Y as Mt,
  p as ml,
  as as kr,
  f as Un,
  A as tt,
  a4 as Ft,
  a3 as Ir,
  at as Er,
  G as yl,
  au as Tr,
  w as Kr,
  $ as Dr,
  t as Co,
  ad as Nr,
  W as Rr,
  av as So,
  i as Br,
  B as _r,
  F as Ar
} from '../main.4e11cfe3.js';
import {
  s as ae,
  z as at,
  A as qn,
  j as Re,
  d as ve,
  e as w,
  c as h,
  r as pe,
  g as Te,
  f as qe,
  p as Je,
  n as ft,
  m as gt,
  v as Jn,
  y as bl,
  k as yt,
  R as Yn,
  Z as Qn,
  a0 as ze,
  a2 as Zn,
  i as Gt,
  T as Fr,
  F as mt,
  a6 as zr,
  V as un,
  S as Mr,
  q as jr,
  W as fn,
  U as Lr
} from './vendor.e5025a5c.js';
import {
  w as wt,
  b as Hr,
  l as Pn,
  aC as Wr,
  aD as Vr,
  aE as Xr,
  aF as Gr,
  ao as Ur,
  ap as qr,
  aq as Jr,
  ar as Yr,
  s as $o,
  F as Qr,
  E as Zr,
  J as jt,
  o as ea,
  G as Qt,
  v as We,
  r as Zt,
  aG as ta,
  t as Bt,
  D as na,
  ac as ln,
  ad as xl,
  z as eo,
  ak as Cl,
  aH as oa,
  aI as wo,
  Q as la,
  aJ as ra,
  aa,
  L as Oo,
  U as ia,
  am as sa,
  B as $t,
  R as Sl,
  aK as Po,
  C as ko,
  n as Ot,
  aL as ca,
  aM as da,
  y as ua,
  p as en,
  V as fa,
  K as ht,
  aN as pa,
  aO as va,
  O as ha
} from './VendorStore.76a5f248.js';
import { S as ga } from './index.f3d5a503.js';
import {
  z as ma,
  A as ya,
  B as ba,
  F as xa,
  G as Ca,
  H as Sa,
  J as $a,
  K as wa,
  M as Oa,
  N as Pa,
  O as ka,
  T as zt
} from './antd.e3fbf92b.js';
import {
  i as Io,
  s as $l,
  S as tn,
  D as Ia,
  a as Ea,
  b as Ta,
  L as Ka
} from './index.a5a3d068.js';
import { u as Da } from './responsiveObserve.feb6262f.js';
import { i as bt } from './initDefaultProps.d90010a5.js';
function Na(e, t, n, o) {
  const l = n - t;
  return (
    (e /= o / 2),
    e < 1 ? (l / 2) * e * e * e + t : (l / 2) * ((e -= 2) * e * e + 2) + t
  );
}
function kn(e) {
  return e != null && e === e.window;
}
function Ra(e, t) {
  var n, o;
  if (typeof window > 'u') return 0;
  const l = t ? 'scrollTop' : 'scrollLeft';
  let r = 0;
  return (
    kn(e)
      ? (r = e[t ? 'pageYOffset' : 'pageXOffset'])
      : e instanceof Document
      ? (r = e.documentElement[l])
      : (e instanceof HTMLElement || e) && (r = e[l]),
    e &&
      !kn(e) &&
      typeof r != 'number' &&
      (r =
        (o = ((n = e.ownerDocument) !== null && n !== void 0 ? n : e)
          .documentElement) === null || o === void 0
          ? void 0
          : o[l]),
    r
  );
}
function Ba(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
  const { getContainer: n = () => window, callback: o, duration: l = 450 } = t,
    r = n(),
    a = Ra(r, !0),
    i = Date.now(),
    s = () => {
      const c = Date.now() - i,
        u = Na(c > l ? l : c, a, e, l);
      kn(r)
        ? r.scrollTo(window.pageXOffset, u)
        : r instanceof Document || r.constructor.name === 'HTMLDocument'
        ? (r.documentElement.scrollTop = u)
        : (r.scrollTop = u),
        c < l ? wt(s) : typeof o == 'function' && o();
    };
  wt(s);
}
var _a = /\s/;
function Aa(e) {
  for (var t = e.length; t-- && _a.test(e.charAt(t)); );
  return t;
}
var Fa = /^\s+/;
function za(e) {
  return e && e.slice(0, Aa(e) + 1).replace(Fa, '');
}
var Eo = 0 / 0,
  Ma = /^[-+]0x[0-9a-f]+$/i,
  ja = /^0b[01]+$/i,
  La = /^0o[0-7]+$/i,
  Ha = parseInt;
function To(e) {
  if (typeof e == 'number') return e;
  if (Hr(e)) return Eo;
  if (Pn(e)) {
    var t = typeof e.valueOf == 'function' ? e.valueOf() : e;
    e = Pn(t) ? t + '' : t;
  }
  if (typeof e != 'string') return e === 0 ? e : +e;
  e = za(e);
  var n = ja.test(e);
  return n || La.test(e) ? Ha(e.slice(2), n ? 2 : 8) : Ma.test(e) ? Eo : +e;
}
var Wa = function() {
  return Wr.Date.now();
};
const pn = Wa;
var Va = 'Expected a function',
  Xa = Math.max,
  Ga = Math.min;
function Ua(e, t, n) {
  var o,
    l,
    r,
    a,
    i,
    s,
    f = 0,
    c = !1,
    u = !1,
    y = !0;
  if (typeof e != 'function') throw new TypeError(Va);
  (t = To(t) || 0),
    Pn(n) &&
      ((c = !!n.leading),
      (u = 'maxWait' in n),
      (r = u ? Xa(To(n.maxWait) || 0, t) : r),
      (y = 'trailing' in n ? !!n.trailing : y));
  function x(I) {
    var k = o,
      T = l;
    return (o = l = void 0), (f = I), (a = e.apply(T, k)), a;
  }
  function b(I) {
    return (f = I), (i = setTimeout(p, t)), c ? x(I) : a;
  }
  function v(I) {
    var k = I - s,
      T = I - f,
      C = t - k;
    return u ? Ga(C, r - T) : C;
  }
  function d(I) {
    var k = I - s,
      T = I - f;
    return s === void 0 || k >= t || k < 0 || (u && T >= r);
  }
  function p() {
    var I = pn();
    if (d(I)) return $(I);
    i = setTimeout(p, v(I));
  }
  function $(I) {
    return (i = void 0), y && o ? x(I) : ((o = l = void 0), a);
  }
  function m() {
    i !== void 0 && clearTimeout(i), (f = 0), (o = s = l = i = void 0);
  }
  function S() {
    return i === void 0 ? a : $(pn());
  }
  function O() {
    var I = pn(),
      k = d(I);
    if (((o = arguments), (l = this), (s = I), k)) {
      if (i === void 0) return b(s);
      if (u) return clearTimeout(i), (i = setTimeout(p, t)), x(s);
    }
    return i === void 0 && (i = setTimeout(p, t)), a;
  }
  return (O.cancel = m), (O.flush = S), O;
}
function qa(e) {
  for (var t = -1, n = e == null ? 0 : e.length, o = {}; ++t < n; ) {
    var l = e[t];
    o[l[0]] = l[1];
  }
  return o;
}
function wl() {
  const e = ae({});
  let t = null;
  const n = Da();
  return (
    at(() => {
      t = n.value.subscribe(o => {
        e.value = o;
      });
    }),
    qn(() => {
      n.value.unsubscribe(t);
    }),
    e
  );
}
function Qe(e) {
  const t = ae();
  return (
    Re(
      () => {
        t.value = e();
      },
      { flush: 'sync' }
    ),
    t
  );
}
const Ol = () => ({
    arrow: Ge([Boolean, Object]),
    trigger: { type: [Array, String] },
    menu: rt(),
    overlay: me.any,
    visible: fe(),
    open: fe(),
    disabled: fe(),
    danger: fe(),
    autofocus: fe(),
    align: rt(),
    getPopupContainer: Function,
    prefixCls: String,
    transitionName: String,
    placement: String,
    overlayClassName: String,
    overlayStyle: rt(),
    forceRender: fe(),
    mouseEnterDelay: Number,
    mouseLeaveDelay: Number,
    openClassName: String,
    minOverlayWidthMatchTrigger: fe(),
    destroyPopupOnHide: fe(),
    onVisibleChange: { type: Function },
    'onUpdate:visible': { type: Function },
    onOpenChange: { type: Function },
    'onUpdate:open': { type: Function }
  }),
  vn = Vr(),
  Ja = () =>
    g(g({}, Ol()), {
      type: vn.type,
      size: String,
      htmlType: vn.htmlType,
      href: String,
      disabled: fe(),
      prefixCls: String,
      icon: me.any,
      title: String,
      loading: vn.loading,
      onClick: Pr()
    }),
  Ya = e => {
    const { componentCls: t, antCls: n, paddingXS: o, opacityLoading: l } = e;
    return {
      [`${t}-button`]: {
        whiteSpace: 'nowrap',
        [`&${n}-btn-group > ${n}-btn`]: {
          [`&-loading, &-loading + ${n}-btn`]: {
            cursor: 'default',
            pointerEvents: 'none',
            opacity: l
          },
          [`&:last-child:not(:first-child):not(${n}-btn-icon-only)`]: {
            paddingInline: o
          }
        }
      }
    };
  },
  Qa = Ya,
  Za = e => {
    const {
        componentCls: t,
        menuCls: n,
        colorError: o,
        colorTextLightSolid: l
      } = e,
      r = `${n}-item`;
    return {
      [`${t}, ${t}-menu-submenu`]: {
        [`${n} ${r}`]: {
          [`&${r}-danger:not(${r}-disabled)`]: {
            color: o,
            '&:hover': { color: l, backgroundColor: o }
          }
        }
      }
    };
  },
  ei = Za,
  ti = e => {
    const {
      componentCls: t,
      menuCls: n,
      zIndexPopup: o,
      dropdownArrowDistance: l,
      dropdownArrowOffset: r,
      sizePopupArrow: a,
      antCls: i,
      iconCls: s,
      motionDurationMid: f,
      dropdownPaddingVertical: c,
      fontSize: u,
      dropdownEdgeChildPadding: y,
      colorTextDisabled: x,
      fontSizeIcon: b,
      controlPaddingHorizontal: v,
      colorBgElevated: d,
      boxShadowPopoverArrow: p
    } = e;
    return [
      {
        [t]: g(g({}, et(e)), {
          position: 'absolute',
          top: -9999,
          left: { _skip_check_: !0, value: -9999 },
          zIndex: o,
          display: 'block',
          '&::before': {
            position: 'absolute',
            insetBlock: -l + a / 2,
            zIndex: -9999,
            opacity: 1e-4,
            content: '""'
          },
          [`${t}-wrap`]: {
            position: 'relative',
            [`${i}-btn > ${s}-down`]: { fontSize: b },
            [`${s}-down::before`]: { transition: `transform ${f}` }
          },
          [`${t}-wrap-open`]: {
            [`${s}-down::before`]: { transform: 'rotate(180deg)' }
          },
          '\n        &-hidden,\n        &-menu-hidden,\n        &-menu-submenu-hidden\n      ': {
            display: 'none'
          },
          [`
        &-show-arrow${t}-placement-topLeft,
        &-show-arrow${t}-placement-top,
        &-show-arrow${t}-placement-topRight
      `]: { paddingBottom: l },
          [`
        &-show-arrow${t}-placement-bottomLeft,
        &-show-arrow${t}-placement-bottom,
        &-show-arrow${t}-placement-bottomRight
      `]: { paddingTop: l },
          [`${t}-arrow`]: g(
            { position: 'absolute', zIndex: 1, display: 'block' },
            Gr(a, e.borderRadiusXS, e.borderRadiusOuter, d, p)
          ),
          [`
        &-placement-top > ${t}-arrow,
        &-placement-topLeft > ${t}-arrow,
        &-placement-topRight > ${t}-arrow
      `]: { bottom: l, transform: 'translateY(100%) rotate(180deg)' },
          [`&-placement-top > ${t}-arrow`]: {
            left: { _skip_check_: !0, value: '50%' },
            transform: 'translateX(-50%) translateY(100%) rotate(180deg)'
          },
          [`&-placement-topLeft > ${t}-arrow`]: {
            left: { _skip_check_: !0, value: r }
          },
          [`&-placement-topRight > ${t}-arrow`]: {
            right: { _skip_check_: !0, value: r }
          },
          [`
          &-placement-bottom > ${t}-arrow,
          &-placement-bottomLeft > ${t}-arrow,
          &-placement-bottomRight > ${t}-arrow
        `]: { top: l, transform: 'translateY(-100%)' },
          [`&-placement-bottom > ${t}-arrow`]: {
            left: { _skip_check_: !0, value: '50%' },
            transform: 'translateY(-100%) translateX(-50%)'
          },
          [`&-placement-bottomLeft > ${t}-arrow`]: {
            left: { _skip_check_: !0, value: r }
          },
          [`&-placement-bottomRight > ${t}-arrow`]: {
            right: { _skip_check_: !0, value: r }
          },
          [`&${i}-slide-down-enter${i}-slide-down-enter-active${t}-placement-bottomLeft,
          &${i}-slide-down-appear${i}-slide-down-appear-active${t}-placement-bottomLeft,
          &${i}-slide-down-enter${i}-slide-down-enter-active${t}-placement-bottom,
          &${i}-slide-down-appear${i}-slide-down-appear-active${t}-placement-bottom,
          &${i}-slide-down-enter${i}-slide-down-enter-active${t}-placement-bottomRight,
          &${i}-slide-down-appear${i}-slide-down-appear-active${t}-placement-bottomRight`]: {
            animationName: Ur
          },
          [`&${i}-slide-up-enter${i}-slide-up-enter-active${t}-placement-topLeft,
          &${i}-slide-up-appear${i}-slide-up-appear-active${t}-placement-topLeft,
          &${i}-slide-up-enter${i}-slide-up-enter-active${t}-placement-top,
          &${i}-slide-up-appear${i}-slide-up-appear-active${t}-placement-top,
          &${i}-slide-up-enter${i}-slide-up-enter-active${t}-placement-topRight,
          &${i}-slide-up-appear${i}-slide-up-appear-active${t}-placement-topRight`]: {
            animationName: qr
          },
          [`&${i}-slide-down-leave${i}-slide-down-leave-active${t}-placement-bottomLeft,
          &${i}-slide-down-leave${i}-slide-down-leave-active${t}-placement-bottom,
          &${i}-slide-down-leave${i}-slide-down-leave-active${t}-placement-bottomRight`]: {
            animationName: Jr
          },
          [`&${i}-slide-up-leave${i}-slide-up-leave-active${t}-placement-topLeft,
          &${i}-slide-up-leave${i}-slide-up-leave-active${t}-placement-top,
          &${i}-slide-up-leave${i}-slide-up-leave-active${t}-placement-topRight`]: {
            animationName: Yr
          }
        })
      },
      {
        [`${t} ${n}`]: { position: 'relative', margin: 0 },
        [`${n}-submenu-popup`]: {
          position: 'absolute',
          zIndex: o,
          background: 'transparent',
          boxShadow: 'none',
          transformOrigin: '0 0',
          'ul,li': { listStyle: 'none' },
          ul: { marginInline: '0.3em' }
        },
        [`${t}, ${t}-menu-submenu`]: {
          [n]: g(
            g(
              {
                padding: y,
                listStyleType: 'none',
                backgroundColor: d,
                backgroundClip: 'padding-box',
                borderRadius: e.borderRadiusLG,
                outline: 'none',
                boxShadow: e.boxShadowSecondary
              },
              wn(e)
            ),
            {
              [`${n}-item-group-title`]: {
                padding: `${c}px ${v}px`,
                color: e.colorTextDescription,
                transition: `all ${f}`
              },
              [`${n}-item`]: {
                position: 'relative',
                display: 'flex',
                alignItems: 'center',
                borderRadius: e.borderRadiusSM
              },
              [`${n}-item-icon`]: {
                minWidth: u,
                marginInlineEnd: e.marginXS,
                fontSize: e.fontSizeSM
              },
              [`${n}-title-content`]: {
                flex: 'auto',
                '> a': {
                  color: 'inherit',
                  transition: `all ${f}`,
                  '&:hover': { color: 'inherit' },
                  '&::after': { position: 'absolute', inset: 0, content: '""' }
                }
              },
              [`${n}-item, ${n}-submenu-title`]: g(
                g(
                  {
                    clear: 'both',
                    margin: 0,
                    padding: `${c}px ${v}px`,
                    color: e.colorText,
                    fontWeight: 'normal',
                    fontSize: u,
                    lineHeight: e.lineHeight,
                    cursor: 'pointer',
                    transition: `all ${f}`,
                    '&:hover, &-active': {
                      backgroundColor: e.controlItemBgHover
                    }
                  },
                  wn(e)
                ),
                {
                  '&-selected': {
                    color: e.colorPrimary,
                    backgroundColor: e.controlItemBgActive,
                    '&:hover, &-active': {
                      backgroundColor: e.controlItemBgActiveHover
                    }
                  },
                  '&-disabled': {
                    color: x,
                    cursor: 'not-allowed',
                    '&:hover': {
                      color: x,
                      backgroundColor: d,
                      cursor: 'not-allowed'
                    },
                    a: { pointerEvents: 'none' }
                  },
                  '&-divider': {
                    height: 1,
                    margin: `${e.marginXXS}px 0`,
                    overflow: 'hidden',
                    lineHeight: 0,
                    backgroundColor: e.colorSplit
                  },
                  [`${t}-menu-submenu-expand-icon`]: {
                    position: 'absolute',
                    insetInlineEnd: e.paddingXS,
                    [`${t}-menu-submenu-arrow-icon`]: {
                      marginInlineEnd: '0 !important',
                      color: e.colorTextDescription,
                      fontSize: b,
                      fontStyle: 'normal'
                    }
                  }
                }
              ),
              [`${n}-item-group-list`]: {
                margin: `0 ${e.marginXS}px`,
                padding: 0,
                listStyle: 'none'
              },
              [`${n}-submenu-title`]: { paddingInlineEnd: v + e.fontSizeSM },
              [`${n}-submenu-vertical`]: { position: 'relative' },
              [`${n}-submenu${n}-submenu-disabled ${t}-menu-submenu-title`]: {
                [`&, ${t}-menu-submenu-arrow-icon`]: {
                  color: x,
                  backgroundColor: d,
                  cursor: 'not-allowed'
                }
              },
              [`${n}-submenu-selected ${t}-menu-submenu-title`]: {
                color: e.colorPrimary
              }
            }
          )
        }
      },
      [
        $o(e, 'slide-up'),
        $o(e, 'slide-down'),
        Io(e, 'move-up'),
        Io(e, 'move-down'),
        Qr(e, 'zoom-big')
      ]
    ];
  },
  Pl = Nt(
    'Dropdown',
    (e, t) => {
      let { rootPrefixCls: n } = t;
      const {
          marginXXS: o,
          sizePopupArrow: l,
          controlHeight: r,
          fontSize: a,
          lineHeight: i,
          paddingXXS: s,
          componentCls: f,
          borderRadiusOuter: c,
          borderRadiusLG: u
        } = e,
        y = (r - a * i) / 2,
        { dropdownArrowOffset: x } = Xr({
          sizePopupArrow: l,
          contentRadius: u,
          borderRadiusOuter: c
        }),
        b = Rt(e, {
          menuCls: `${f}-menu`,
          rootPrefixCls: n,
          dropdownArrowDistance: l / 2 + o,
          dropdownArrowOffset: x,
          dropdownPaddingVertical: y,
          dropdownEdgeChildPadding: s
        });
      return [ti(b), Qa(b), ei(b)];
    },
    e => ({ zIndexPopup: e.zIndexPopupBase + 50 })
  );
var ni =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const oi = jt.Group,
  nn = ve({
    compatConfig: { MODE: 3 },
    name: 'ADropdownButton',
    inheritAttrs: !1,
    __ANT_BUTTON: !0,
    props: bt(Ja(), {
      trigger: 'hover',
      placement: 'bottomRight',
      type: 'default'
    }),
    slots: Object,
    setup(e, t) {
      let { slots: n, attrs: o, emit: l } = t;
      const r = y => {
          l('update:visible', y),
            l('visibleChange', y),
            l('update:open', y),
            l('openChange', y);
        },
        { prefixCls: a, direction: i, getPopupContainer: s } = Ye(
          'dropdown',
          e
        ),
        f = w(() => `${a.value}-button`),
        [c, u] = Pl(a);
      return () => {
        var y, x;
        const b = g(g({}, e), o),
          {
            type: v = 'default',
            disabled: d,
            danger: p,
            loading: $,
            htmlType: m,
            class: S = '',
            overlay: O = (y = n.overlay) === null || y === void 0
              ? void 0
              : y.call(n),
            trigger: I,
            align: k,
            open: T,
            visible: C,
            onVisibleChange: E,
            placement: D = i.value === 'rtl' ? 'bottomLeft' : 'bottomRight',
            href: A,
            title: F,
            icon: U = ((x = n.icon) === null || x === void 0
              ? void 0
              : x.call(n)) || h(Zr, null, null),
            mouseEnterDelay: ee,
            mouseLeaveDelay: Z,
            overlayClassName: he,
            overlayStyle: X,
            destroyPopupOnHide: Y,
            onClick: L,
            'onUpdate:open': Q
          } = b,
          B = ni(b, [
            'type',
            'disabled',
            'danger',
            'loading',
            'htmlType',
            'class',
            'overlay',
            'trigger',
            'align',
            'open',
            'visible',
            'onVisibleChange',
            'placement',
            'href',
            'title',
            'icon',
            'mouseEnterDelay',
            'mouseLeaveDelay',
            'overlayClassName',
            'overlayStyle',
            'destroyPopupOnHide',
            'onClick',
            'onUpdate:open'
          ]),
          H = {
            align: k,
            disabled: d,
            trigger: d ? [] : I,
            placement: D,
            getPopupContainer: s == null ? void 0 : s.value,
            onOpenChange: r,
            mouseEnterDelay: ee,
            mouseLeaveDelay: Z,
            open: T ?? C,
            overlayClassName: he,
            overlayStyle: X,
            destroyPopupOnHide: Y
          },
          M = h(
            jt,
            {
              danger: p,
              type: v,
              disabled: d,
              loading: $,
              onClick: L,
              htmlType: m,
              href: A,
              title: F
            },
            { default: n.default }
          ),
          j = h(jt, { danger: p, type: v, icon: U }, null);
        return c(
          h(oi, W(W({}, B), {}, { class: ie(f.value, S, u.value) }), {
            default: () => [
              n.leftButton ? n.leftButton({ button: M }) : M,
              h(Pt, H, {
                default: () => [
                  n.rightButton ? n.rightButton({ button: j }) : j
                ],
                overlay: () => O
              })
            ]
          })
        );
      };
    }
  }),
  kl = ve({
    compatConfig: { MODE: 3 },
    name: 'ADropdown',
    inheritAttrs: !1,
    props: bt(Ol(), {
      mouseEnterDelay: 0.15,
      mouseLeaveDelay: 0.1,
      placement: 'bottomLeft',
      trigger: 'hover'
    }),
    slots: Object,
    setup(e, t) {
      let { slots: n, attrs: o, emit: l } = t;
      const {
          prefixCls: r,
          rootPrefixCls: a,
          direction: i,
          getPopupContainer: s
        } = Ye('dropdown', e),
        [f, c] = Pl(r);
      [
        ['visible', 'open'],
        ['onVisibleChange', 'onOpenChange'],
        ['onUpdate:visible', 'onUpdate:open']
      ].forEach(d => {
        let [p, $] = d;
        On(
          e[p] === void 0,
          'Dropdown',
          `\`${p}\` is deprecated which will be removed in next major version, please use \`${$}\` instead.`
        );
      });
      const u = w(() => {
        const { placement: d = '', transitionName: p } = e;
        return p !== void 0
          ? p
          : d.includes('top')
          ? `${a.value}-slide-down`
          : `${a.value}-slide-up`;
      });
      ea({
        prefixCls: w(() => `${r.value}-menu`),
        expandIcon: w(() =>
          h('span', { class: `${r.value}-menu-submenu-arrow` }, [
            h(Qt, { class: `${r.value}-menu-submenu-arrow-icon` }, null)
          ])
        ),
        mode: w(() => 'vertical'),
        selectable: w(() => !1),
        onClick: () => {},
        validator: d => {
          let { mode: p } = d;
          On(
            !p || p === 'vertical',
            'Dropdown',
            `mode="${p}" is not supported for Dropdown's Menu.`
          );
        }
      });
      const y = () => {
          var d, p, $;
          const m =
              e.overlay ||
              ((d = n.overlay) === null || d === void 0 ? void 0 : d.call(n)),
            S = Array.isArray(m) ? m[0] : m;
          if (!S) return null;
          const O = S.props || {};
          We(
            !O.mode || O.mode === 'vertical',
            'Dropdown',
            `mode="${O.mode}" is not supported for Dropdown's Menu.`
          );
          const {
              selectable: I = !1,
              expandIcon: k = ($ =
                (p = S.children) === null || p === void 0
                  ? void 0
                  : p.expandIcon) === null || $ === void 0
                ? void 0
                : $.call(p)
            } = O,
            T =
              typeof k < 'u' && Dt(k)
                ? k
                : h('span', { class: `${r.value}-menu-submenu-arrow` }, [
                    h(Qt, { class: `${r.value}-menu-submenu-arrow-icon` }, null)
                  ]);
          return Dt(S)
            ? Zt(S, { mode: 'vertical', selectable: I, expandIcon: () => T })
            : S;
        },
        x = w(() => {
          const d = e.placement;
          if (!d) return i.value === 'rtl' ? 'bottomRight' : 'bottomLeft';
          if (d.includes('Center')) {
            const p = d.slice(0, d.indexOf('Center'));
            return (
              We(
                !d.includes('Center'),
                'Dropdown',
                `You are using '${d}' placement in Dropdown, which is deprecated. Try to use '${p}' instead.`
              ),
              p
            );
          }
          return d;
        }),
        b = w(() => (typeof e.visible == 'boolean' ? e.visible : e.open)),
        v = d => {
          l('update:visible', d),
            l('visibleChange', d),
            l('update:open', d),
            l('openChange', d);
        };
      return () => {
        var d, p;
        const { arrow: $, trigger: m, disabled: S, overlayClassName: O } = e,
          I = (d = n.default) === null || d === void 0 ? void 0 : d.call(n)[0],
          k = Zt(
            I,
            g(
              {
                class: ie(
                  (p = I == null ? void 0 : I.props) === null || p === void 0
                    ? void 0
                    : p.class,
                  { [`${r.value}-rtl`]: i.value === 'rtl' },
                  `${r.value}-trigger`
                )
              },
              S ? { disabled: S } : {}
            )
          ),
          T = ie(O, c.value, { [`${r.value}-rtl`]: i.value === 'rtl' }),
          C = S ? [] : m;
        let E;
        C && C.includes('contextmenu') && (E = !0);
        const D = ta({
            arrowPointAtCenter: typeof $ == 'object' && $.pointAtCenter,
            autoAdjustOverflow: !0
          }),
          A = Bt(
            g(g(g({}, e), o), {
              visible: b.value,
              builtinPlacements: D,
              overlayClassName: T,
              arrow: !!$,
              alignPoint: E,
              prefixCls: r.value,
              getPopupContainer: s == null ? void 0 : s.value,
              transitionName: u.value,
              trigger: C,
              onVisibleChange: v,
              placement: x.value
            }),
            ['overlay', 'onUpdate:visible']
          );
        return f(h(na, A, { default: () => [k], overlay: y }));
      };
    }
  });
kl.Button = nn;
const Pt = kl;
var li =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const ri = {
    prefixCls: String,
    name: String,
    id: String,
    type: String,
    defaultChecked: { type: [Boolean, Number], default: void 0 },
    checked: { type: [Boolean, Number], default: void 0 },
    disabled: Boolean,
    tabindex: { type: [Number, String] },
    readonly: Boolean,
    autofocus: Boolean,
    value: me.any,
    required: Boolean
  },
  Il = ve({
    compatConfig: { MODE: 3 },
    name: 'Checkbox',
    inheritAttrs: !1,
    props: bt(ri, {
      prefixCls: 'rc-checkbox',
      type: 'checkbox',
      defaultChecked: !1
    }),
    emits: ['click', 'change'],
    setup(e, t) {
      let { attrs: n, emit: o, expose: l } = t;
      const r = pe(e.checked === void 0 ? e.defaultChecked : e.checked),
        a = pe();
      Te(
        () => e.checked,
        () => {
          r.value = e.checked;
        }
      ),
        l({
          focus() {
            var c;
            (c = a.value) === null || c === void 0 || c.focus();
          },
          blur() {
            var c;
            (c = a.value) === null || c === void 0 || c.blur();
          }
        });
      const i = pe(),
        s = c => {
          if (e.disabled) return;
          e.checked === void 0 && (r.value = c.target.checked),
            (c.shiftKey = i.value);
          const u = {
            target: g(g({}, e), { checked: c.target.checked }),
            stopPropagation() {
              c.stopPropagation();
            },
            preventDefault() {
              c.preventDefault();
            },
            nativeEvent: c
          };
          e.checked !== void 0 && (a.value.checked = !!e.checked),
            o('change', u),
            (i.value = !1);
        },
        f = c => {
          o('click', c), (i.value = c.shiftKey);
        };
      return () => {
        const {
            prefixCls: c,
            name: u,
            id: y,
            type: x,
            disabled: b,
            readonly: v,
            tabindex: d,
            autofocus: p,
            value: $,
            required: m
          } = e,
          S = li(e, [
            'prefixCls',
            'name',
            'id',
            'type',
            'disabled',
            'readonly',
            'tabindex',
            'autofocus',
            'value',
            'required'
          ]),
          {
            class: O,
            onFocus: I,
            onBlur: k,
            onKeydown: T,
            onKeypress: C,
            onKeyup: E
          } = n,
          D = g(g({}, S), n),
          A = Object.keys(D).reduce(
            (ee, Z) => (
              (Z.startsWith('data-') ||
                Z.startsWith('aria-') ||
                Z === 'role') &&
                (ee[Z] = D[Z]),
              ee
            ),
            {}
          ),
          F = ie(c, O, { [`${c}-checked`]: r.value, [`${c}-disabled`]: b }),
          U = g(
            g(
              {
                name: u,
                id: y,
                type: x,
                readonly: v,
                disabled: b,
                tabindex: d,
                class: `${c}-input`,
                checked: !!r.value,
                autofocus: p,
                value: $
              },
              A
            ),
            {
              onChange: s,
              onClick: f,
              onFocus: I,
              onBlur: k,
              onKeydown: T,
              onKeypress: C,
              onKeyup: E,
              required: m
            }
          );
        return h('span', { class: F }, [
          h('input', W({ ref: a }, U), null),
          h('span', { class: `${c}-inner` }, null)
        ]);
      };
    }
  }),
  El = Symbol('radioGroupContextKey'),
  ai = e => {
    Je(El, e);
  },
  ii = () => qe(El, void 0),
  Tl = Symbol('radioOptionTypeContextKey'),
  si = e => {
    Je(Tl, e);
  },
  ci = () => qe(Tl, void 0),
  di = new Gn('antRadioEffect', {
    '0%': { transform: 'scale(1)', opacity: 0.5 },
    '100%': { transform: 'scale(1.6)', opacity: 0 }
  }),
  ui = e => {
    const { componentCls: t, antCls: n } = e,
      o = `${t}-group`;
    return {
      [o]: g(g({}, et(e)), {
        display: 'inline-block',
        fontSize: 0,
        [`&${o}-rtl`]: { direction: 'rtl' },
        [`${n}-badge ${n}-badge-count`]: { zIndex: 1 },
        [`> ${n}-badge:not(:first-child) > ${n}-button-wrapper`]: {
          borderInlineStart: 'none'
        }
      })
    };
  },
  fi = e => {
    const {
        componentCls: t,
        radioWrapperMarginRight: n,
        radioCheckedColor: o,
        radioSize: l,
        motionDurationSlow: r,
        motionDurationMid: a,
        motionEaseInOut: i,
        motionEaseInOutCirc: s,
        radioButtonBg: f,
        colorBorder: c,
        lineWidth: u,
        radioDotSize: y,
        colorBgContainerDisabled: x,
        colorTextDisabled: b,
        paddingXS: v,
        radioDotDisabledColor: d,
        lineType: p,
        radioDotDisabledSize: $,
        wireframe: m,
        colorWhite: S
      } = e,
      O = `${t}-inner`;
    return {
      [`${t}-wrapper`]: g(g({}, et(e)), {
        position: 'relative',
        display: 'inline-flex',
        alignItems: 'baseline',
        marginInlineStart: 0,
        marginInlineEnd: n,
        cursor: 'pointer',
        [`&${t}-wrapper-rtl`]: { direction: 'rtl' },
        '&-disabled': { cursor: 'not-allowed', color: e.colorTextDisabled },
        '&::after': {
          display: 'inline-block',
          width: 0,
          overflow: 'hidden',
          content: '"\\a0"'
        },
        [`${t}-checked::after`]: {
          position: 'absolute',
          insetBlockStart: 0,
          insetInlineStart: 0,
          width: '100%',
          height: '100%',
          border: `${u}px ${p} ${o}`,
          borderRadius: '50%',
          visibility: 'hidden',
          animationName: di,
          animationDuration: r,
          animationTimingFunction: i,
          animationFillMode: 'both',
          content: '""'
        },
        [t]: g(g({}, et(e)), {
          position: 'relative',
          display: 'inline-block',
          outline: 'none',
          cursor: 'pointer',
          alignSelf: 'center'
        }),
        [`${t}-wrapper:hover &,
        &:hover ${O}`]: { borderColor: o },
        [`${t}-input:focus-visible + ${O}`]: g({}, kt(e)),
        [`${t}:hover::after, ${t}-wrapper:hover &::after`]: {
          visibility: 'visible'
        },
        [`${t}-inner`]: {
          '&::after': {
            boxSizing: 'border-box',
            position: 'absolute',
            insetBlockStart: '50%',
            insetInlineStart: '50%',
            display: 'block',
            width: l,
            height: l,
            marginBlockStart: l / -2,
            marginInlineStart: l / -2,
            backgroundColor: m ? o : S,
            borderBlockStart: 0,
            borderInlineStart: 0,
            borderRadius: l,
            transform: 'scale(0)',
            opacity: 0,
            transition: `all ${r} ${s}`,
            content: '""'
          },
          boxSizing: 'border-box',
          position: 'relative',
          insetBlockStart: 0,
          insetInlineStart: 0,
          display: 'block',
          width: l,
          height: l,
          backgroundColor: f,
          borderColor: c,
          borderStyle: 'solid',
          borderWidth: u,
          borderRadius: '50%',
          transition: `all ${a}`
        },
        [`${t}-input`]: {
          position: 'absolute',
          insetBlockStart: 0,
          insetInlineEnd: 0,
          insetBlockEnd: 0,
          insetInlineStart: 0,
          zIndex: 1,
          cursor: 'pointer',
          opacity: 0
        },
        [`${t}-checked`]: {
          [O]: {
            borderColor: o,
            backgroundColor: m ? f : o,
            '&::after': {
              transform: `scale(${y / l})`,
              opacity: 1,
              transition: `all ${r} ${s}`
            }
          }
        },
        [`${t}-disabled`]: {
          cursor: 'not-allowed',
          [O]: {
            backgroundColor: x,
            borderColor: c,
            cursor: 'not-allowed',
            '&::after': { backgroundColor: d }
          },
          [`${t}-input`]: { cursor: 'not-allowed' },
          [`${t}-disabled + span`]: { color: b, cursor: 'not-allowed' },
          [`&${t}-checked`]: {
            [O]: { '&::after': { transform: `scale(${$ / l})` } }
          }
        },
        [`span${t} + *`]: { paddingInlineStart: v, paddingInlineEnd: v }
      })
    };
  },
  pi = e => {
    const {
      radioButtonColor: t,
      controlHeight: n,
      componentCls: o,
      lineWidth: l,
      lineType: r,
      colorBorder: a,
      motionDurationSlow: i,
      motionDurationMid: s,
      radioButtonPaddingHorizontal: f,
      fontSize: c,
      radioButtonBg: u,
      fontSizeLG: y,
      controlHeightLG: x,
      controlHeightSM: b,
      paddingXS: v,
      borderRadius: d,
      borderRadiusSM: p,
      borderRadiusLG: $,
      radioCheckedColor: m,
      radioButtonCheckedBg: S,
      radioButtonHoverColor: O,
      radioButtonActiveColor: I,
      radioSolidCheckedColor: k,
      colorTextDisabled: T,
      colorBgContainerDisabled: C,
      radioDisabledButtonCheckedColor: E,
      radioDisabledButtonCheckedBg: D
    } = e;
    return {
      [`${o}-button-wrapper`]: {
        position: 'relative',
        display: 'inline-block',
        height: n,
        margin: 0,
        paddingInline: f,
        paddingBlock: 0,
        color: t,
        fontSize: c,
        lineHeight: `${n - l * 2}px`,
        background: u,
        border: `${l}px ${r} ${a}`,
        borderBlockStartWidth: l + 0.02,
        borderInlineStartWidth: 0,
        borderInlineEndWidth: l,
        cursor: 'pointer',
        transition: [
          `color ${s}`,
          `background ${s}`,
          `border-color ${s}`,
          `box-shadow ${s}`
        ].join(','),
        a: { color: t },
        [`> ${o}-button`]: {
          position: 'absolute',
          insetBlockStart: 0,
          insetInlineStart: 0,
          zIndex: -1,
          width: '100%',
          height: '100%'
        },
        '&:not(:first-child)': {
          '&::before': {
            position: 'absolute',
            insetBlockStart: -l,
            insetInlineStart: -l,
            display: 'block',
            boxSizing: 'content-box',
            width: 1,
            height: '100%',
            paddingBlock: l,
            paddingInline: 0,
            backgroundColor: a,
            transition: `background-color ${i}`,
            content: '""'
          }
        },
        '&:first-child': {
          borderInlineStart: `${l}px ${r} ${a}`,
          borderStartStartRadius: d,
          borderEndStartRadius: d
        },
        '&:last-child': { borderStartEndRadius: d, borderEndEndRadius: d },
        '&:first-child:last-child': { borderRadius: d },
        [`${o}-group-large &`]: {
          height: x,
          fontSize: y,
          lineHeight: `${x - l * 2}px`,
          '&:first-child': {
            borderStartStartRadius: $,
            borderEndStartRadius: $
          },
          '&:last-child': { borderStartEndRadius: $, borderEndEndRadius: $ }
        },
        [`${o}-group-small &`]: {
          height: b,
          paddingInline: v - l,
          paddingBlock: 0,
          lineHeight: `${b - l * 2}px`,
          '&:first-child': {
            borderStartStartRadius: p,
            borderEndStartRadius: p
          },
          '&:last-child': { borderStartEndRadius: p, borderEndEndRadius: p }
        },
        '&:hover': { position: 'relative', color: m },
        '&:has(:focus-visible)': g({}, kt(e)),
        [`${o}-inner, input[type='checkbox'], input[type='radio']`]: {
          width: 0,
          height: 0,
          opacity: 0,
          pointerEvents: 'none'
        },
        [`&-checked:not(${o}-button-wrapper-disabled)`]: {
          zIndex: 1,
          color: m,
          background: S,
          borderColor: m,
          '&::before': { backgroundColor: m },
          '&:first-child': { borderColor: m },
          '&:hover': {
            color: O,
            borderColor: O,
            '&::before': { backgroundColor: O }
          },
          '&:active': {
            color: I,
            borderColor: I,
            '&::before': { backgroundColor: I }
          }
        },
        [`${o}-group-solid &-checked:not(${o}-button-wrapper-disabled)`]: {
          color: k,
          background: m,
          borderColor: m,
          '&:hover': { color: k, background: O, borderColor: O },
          '&:active': { color: k, background: I, borderColor: I }
        },
        '&-disabled': {
          color: T,
          backgroundColor: C,
          borderColor: a,
          cursor: 'not-allowed',
          '&:first-child, &:hover': {
            color: T,
            backgroundColor: C,
            borderColor: a
          }
        },
        [`&-disabled${o}-button-wrapper-checked`]: {
          color: E,
          backgroundColor: D,
          borderColor: a,
          boxShadow: 'none'
        }
      }
    };
  },
  Kl = Nt('Radio', e => {
    const {
        padding: t,
        lineWidth: n,
        controlItemBgActiveDisabled: o,
        colorTextDisabled: l,
        colorBgContainer: r,
        fontSizeLG: a,
        controlOutline: i,
        colorPrimaryHover: s,
        colorPrimaryActive: f,
        colorText: c,
        colorPrimary: u,
        marginXS: y,
        controlOutlineWidth: x,
        colorTextLightSolid: b,
        wireframe: v
      } = e,
      d = `0 0 0 ${x}px ${i}`,
      p = d,
      $ = a,
      m = 4,
      S = $ - m * 2,
      O = v ? S : $ - (m + n) * 2,
      I = u,
      k = c,
      T = s,
      C = f,
      E = t - n,
      F = Rt(e, {
        radioFocusShadow: d,
        radioButtonFocusShadow: p,
        radioSize: $,
        radioDotSize: O,
        radioDotDisabledSize: S,
        radioCheckedColor: I,
        radioDotDisabledColor: l,
        radioSolidCheckedColor: b,
        radioButtonBg: r,
        radioButtonCheckedBg: r,
        radioButtonColor: k,
        radioButtonHoverColor: T,
        radioButtonActiveColor: C,
        radioButtonPaddingHorizontal: E,
        radioDisabledButtonCheckedBg: o,
        radioDisabledButtonCheckedColor: l,
        radioWrapperMarginRight: y
      });
    return [ui(F), fi(F), pi(F)];
  });
var vi =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const Dl = () => ({
    prefixCls: String,
    checked: fe(),
    disabled: fe(),
    isGroup: fe(),
    value: me.any,
    name: String,
    id: String,
    autofocus: fe(),
    onChange: ye(),
    onFocus: ye(),
    onBlur: ye(),
    onClick: ye(),
    'onUpdate:checked': ye(),
    'onUpdate:value': ye()
  }),
  Xe = ve({
    compatConfig: { MODE: 3 },
    name: 'ARadio',
    inheritAttrs: !1,
    props: Dl(),
    setup(e, t) {
      let { emit: n, expose: o, slots: l, attrs: r } = t;
      const a = ln(),
        i = xl.useInject(),
        s = ci(),
        f = ii(),
        c = xo(),
        u = w(() => {
          var T;
          return (T = v.value) !== null && T !== void 0 ? T : c.value;
        }),
        y = pe(),
        { prefixCls: x, direction: b, disabled: v } = Ye('radio', e),
        d = w(() =>
          (f == null ? void 0 : f.optionType.value) === 'button' ||
          s === 'button'
            ? `${x.value}-button`
            : x.value
        ),
        p = xo(),
        [$, m] = Kl(x);
      o({
        focus: () => {
          y.value.focus();
        },
        blur: () => {
          y.value.blur();
        }
      });
      const I = T => {
          const C = T.target.checked;
          n('update:checked', C),
            n('update:value', C),
            n('change', T),
            a.onFieldChange();
        },
        k = T => {
          n('change', T), f && f.onChange && f.onChange(T);
        };
      return () => {
        var T;
        const C = f,
          { prefixCls: E, id: D = a.id.value } = e,
          A = vi(e, ['prefixCls', 'id']),
          F = g(
            g(
              { prefixCls: d.value, id: D },
              Bt(A, ['onUpdate:checked', 'onUpdate:value'])
            ),
            { disabled: (T = v.value) !== null && T !== void 0 ? T : p.value }
          );
        C
          ? ((F.name = C.name.value),
            (F.onChange = k),
            (F.checked = e.value === C.value.value),
            (F.disabled = u.value || C.disabled.value))
          : (F.onChange = I);
        const U = ie(
          {
            [`${d.value}-wrapper`]: !0,
            [`${d.value}-wrapper-checked`]: F.checked,
            [`${d.value}-wrapper-disabled`]: F.disabled,
            [`${d.value}-wrapper-rtl`]: b.value === 'rtl',
            [`${d.value}-wrapper-in-form-item`]: i.isFormItemInput
          },
          r.class,
          m.value
        );
        return $(
          h('label', W(W({}, r), {}, { class: U }), [
            h(Il, W(W({}, F), {}, { type: 'radio', ref: y }), null),
            l.default && h('span', null, [l.default()])
          ])
        );
      };
    }
  }),
  hi = () => ({
    prefixCls: String,
    value: me.any,
    size: Ue(),
    options: Le(),
    disabled: fe(),
    name: String,
    buttonStyle: Ue('outline'),
    id: String,
    optionType: Ue('default'),
    onChange: ye(),
    'onUpdate:value': ye()
  }),
  gi = ve({
    compatConfig: { MODE: 3 },
    name: 'ARadioGroup',
    inheritAttrs: !1,
    props: hi(),
    setup(e, t) {
      let { slots: n, emit: o, attrs: l } = t;
      const r = ln(),
        { prefixCls: a, direction: i, size: s } = Ye('radio', e),
        [f, c] = Kl(a),
        u = pe(e.value),
        y = pe(!1);
      return (
        Te(
          () => e.value,
          b => {
            (u.value = b), (y.value = !1);
          }
        ),
        ai({
          onChange: b => {
            const v = u.value,
              { value: d } = b.target;
            'value' in e || (u.value = d),
              !y.value &&
                d !== v &&
                ((y.value = !0),
                o('update:value', d),
                o('change', b),
                r.onFieldChange()),
              ft(() => {
                y.value = !1;
              });
          },
          value: u,
          disabled: w(() => e.disabled),
          name: w(() => e.name),
          optionType: w(() => e.optionType)
        }),
        () => {
          var b;
          const { options: v, buttonStyle: d, id: p = r.id.value } = e,
            $ = `${a.value}-group`,
            m = ie(
              $,
              `${$}-${d}`,
              { [`${$}-${s.value}`]: s.value, [`${$}-rtl`]: i.value === 'rtl' },
              l.class,
              c.value
            );
          let S = null;
          return (
            v && v.length > 0
              ? (S = v.map(O => {
                  if (typeof O == 'string' || typeof O == 'number')
                    return h(
                      Xe,
                      {
                        key: O,
                        prefixCls: a.value,
                        disabled: e.disabled,
                        value: O,
                        checked: u.value === O
                      },
                      { default: () => [O] }
                    );
                  const { value: I, disabled: k, label: T } = O;
                  return h(
                    Xe,
                    {
                      key: `radio-group-value-options-${I}`,
                      prefixCls: a.value,
                      disabled: k || e.disabled,
                      value: I,
                      checked: u.value === I
                    },
                    { default: () => [T] }
                  );
                }))
              : (S =
                  (b = n.default) === null || b === void 0
                    ? void 0
                    : b.call(n)),
            f(h('div', W(W({}, l), {}, { class: m, id: p }), [S]))
          );
        }
      );
    }
  }),
  mi = ve({
    compatConfig: { MODE: 3 },
    name: 'ARadioButton',
    inheritAttrs: !1,
    props: Dl(),
    setup(e, t) {
      let { slots: n, attrs: o } = t;
      const { prefixCls: l } = Ye('radio', e);
      return (
        si('button'),
        () => {
          var r;
          return h(Xe, W(W(W({}, o), e), {}, { prefixCls: l.value }), {
            default: () => [
              (r = n.default) === null || r === void 0 ? void 0 : r.call(n)
            ]
          });
        }
      );
    }
  });
Xe.Group = gi;
Xe.Button = mi;
Xe.install = function(e) {
  return (
    e.component(Xe.name, Xe),
    e.component(Xe.Group.name, Xe.Group),
    e.component(Xe.Button.name, Xe.Button),
    e
  );
};
const Nl = Symbol('TreeContextKey'),
  yi = ve({
    compatConfig: { MODE: 3 },
    name: 'TreeContext',
    props: { value: { type: Object } },
    setup(e, t) {
      let { slots: n } = t;
      return (
        Je(
          Nl,
          w(() => e.value)
        ),
        () => {
          var o;
          return (o = n.default) === null || o === void 0 ? void 0 : o.call(n);
        }
      );
    }
  }),
  to = () =>
    qe(
      Nl,
      w(() => ({}))
    ),
  Rl = Symbol('KeysStateKey'),
  bi = e => {
    Je(Rl, e);
  },
  Bl = () =>
    qe(Rl, {
      expandedKeys: ae([]),
      selectedKeys: ae([]),
      loadedKeys: ae([]),
      loadingKeys: ae([]),
      checkedKeys: ae([]),
      halfCheckedKeys: ae([]),
      expandedKeysSet: w(() => new Set()),
      selectedKeysSet: w(() => new Set()),
      loadedKeysSet: w(() => new Set()),
      loadingKeysSet: w(() => new Set()),
      checkedKeysSet: w(() => new Set()),
      halfCheckedKeysSet: w(() => new Set()),
      flattenNodes: ae([])
    }),
  xi = e => {
    let { prefixCls: t, level: n, isStart: o, isEnd: l } = e;
    const r = `${t}-indent-unit`,
      a = [];
    for (let i = 0; i < n; i += 1)
      a.push(
        h(
          'span',
          {
            key: i,
            class: { [r]: !0, [`${r}-start`]: o[i], [`${r}-end`]: l[i] }
          },
          null
        )
      );
    return h('span', { 'aria-hidden': 'true', class: `${t}-indent` }, [a]);
  },
  Ci = xi,
  _l = {
    eventKey: [String, Number],
    prefixCls: String,
    title: me.any,
    data: { type: Object, default: void 0 },
    parent: { type: Object, default: void 0 },
    isStart: { type: Array },
    isEnd: { type: Array },
    active: { type: Boolean, default: void 0 },
    onMousemove: { type: Function },
    isLeaf: { type: Boolean, default: void 0 },
    checkable: { type: Boolean, default: void 0 },
    selectable: { type: Boolean, default: void 0 },
    disabled: { type: Boolean, default: void 0 },
    disableCheckbox: { type: Boolean, default: void 0 },
    icon: me.any,
    switcherIcon: me.any,
    domRef: { type: Function }
  },
  Si = {
    prefixCls: { type: String },
    motion: { type: Object },
    focusable: { type: Boolean },
    activeItem: { type: Object },
    focused: { type: Boolean },
    tabindex: { type: Number },
    checkable: { type: Boolean },
    selectable: { type: Boolean },
    disabled: { type: Boolean },
    height: { type: Number },
    itemHeight: { type: Number },
    virtual: { type: Boolean },
    onScroll: { type: Function },
    onKeydown: { type: Function },
    onFocus: { type: Function },
    onBlur: { type: Function },
    onActiveChange: { type: Function },
    onContextmenu: { type: Function },
    onListChangeStart: { type: Function },
    onListChangeEnd: { type: Function }
  },
  Al = () => ({
    prefixCls: String,
    focusable: { type: Boolean, default: void 0 },
    activeKey: [Number, String],
    tabindex: Number,
    children: me.any,
    treeData: { type: Array },
    fieldNames: { type: Object },
    showLine: { type: [Boolean, Object], default: void 0 },
    showIcon: { type: Boolean, default: void 0 },
    icon: me.any,
    selectable: { type: Boolean, default: void 0 },
    expandAction: [String, Boolean],
    disabled: { type: Boolean, default: void 0 },
    multiple: { type: Boolean, default: void 0 },
    checkable: { type: Boolean, default: void 0 },
    checkStrictly: { type: Boolean, default: void 0 },
    draggable: { type: [Function, Boolean] },
    defaultExpandParent: { type: Boolean, default: void 0 },
    autoExpandParent: { type: Boolean, default: void 0 },
    defaultExpandAll: { type: Boolean, default: void 0 },
    defaultExpandedKeys: { type: Array },
    expandedKeys: { type: Array },
    defaultCheckedKeys: { type: Array },
    checkedKeys: { type: [Object, Array] },
    defaultSelectedKeys: { type: Array },
    selectedKeys: { type: Array },
    allowDrop: { type: Function },
    dropIndicatorRender: { type: Function },
    onFocus: { type: Function },
    onBlur: { type: Function },
    onKeydown: { type: Function },
    onContextmenu: { type: Function },
    onClick: { type: Function },
    onDblclick: { type: Function },
    onScroll: { type: Function },
    onExpand: { type: Function },
    onCheck: { type: Function },
    onSelect: { type: Function },
    onLoad: { type: Function },
    loadData: { type: Function },
    loadedKeys: { type: Array },
    onMouseenter: { type: Function },
    onMouseleave: { type: Function },
    onRightClick: { type: Function },
    onDragstart: { type: Function },
    onDragenter: { type: Function },
    onDragover: { type: Function },
    onDragleave: { type: Function },
    onDragend: { type: Function },
    onDrop: { type: Function },
    onActiveChange: { type: Function },
    filterTreeNode: { type: Function },
    motion: me.any,
    switcherIcon: me.any,
    height: Number,
    itemHeight: Number,
    virtual: { type: Boolean, default: void 0 },
    direction: { type: String },
    rootClassName: String,
    rootStyle: Object
  });
var $i =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const Ko = 'open',
  Do = 'close',
  wi = '---',
  In = ve({
    compatConfig: { MODE: 3 },
    name: 'ATreeNode',
    inheritAttrs: !1,
    props: _l,
    isTreeNode: 1,
    setup(e, t) {
      let { attrs: n, slots: o, expose: l } = t;
      Me(
        !('slots' in e.data),
        `treeData slots is deprecated, please use ${Object.keys(
          e.data.slots || {}
        ).map(K => '`v-slot:' + K + '` ')}instead`
      );
      const r = ae(!1),
        a = to(),
        {
          expandedKeysSet: i,
          selectedKeysSet: s,
          loadedKeysSet: f,
          loadingKeysSet: c,
          checkedKeysSet: u,
          halfCheckedKeysSet: y
        } = Bl(),
        { dragOverNodeKey: x, dropPosition: b, keyEntities: v } = a.value,
        d = w(() =>
          Ut(e.eventKey, {
            expandedKeysSet: i.value,
            selectedKeysSet: s.value,
            loadedKeysSet: f.value,
            loadingKeysSet: c.value,
            checkedKeysSet: u.value,
            halfCheckedKeysSet: y.value,
            dragOverNodeKey: x,
            dropPosition: b,
            keyEntities: v
          })
        ),
        p = Qe(() => d.value.expanded),
        $ = Qe(() => d.value.selected),
        m = Qe(() => d.value.checked),
        S = Qe(() => d.value.loaded),
        O = Qe(() => d.value.loading),
        I = Qe(() => d.value.halfChecked),
        k = Qe(() => d.value.dragOver),
        T = Qe(() => d.value.dragOverGapTop),
        C = Qe(() => d.value.dragOverGapBottom),
        E = Qe(() => d.value.pos),
        D = ae(),
        A = w(() => {
          const { eventKey: K } = e,
            { keyEntities: P } = a.value,
            { children: R } = P[K] || {};
          return !!(R || []).length;
        }),
        F = w(() => {
          const { isLeaf: K } = e,
            { loadData: P } = a.value,
            R = A.value;
          return K === !1 ? !1 : K || (!P && !R) || (P && S.value && !R);
        }),
        U = w(() => (F.value ? null : p.value ? Ko : Do)),
        ee = w(() => {
          const { disabled: K } = e,
            { disabled: P } = a.value;
          return !!(P || K);
        }),
        Z = w(() => {
          const { checkable: K } = e,
            { checkable: P } = a.value;
          return !P || K === !1 ? !1 : P;
        }),
        he = w(() => {
          const { selectable: K } = e,
            { selectable: P } = a.value;
          return typeof K == 'boolean' ? K : P;
        }),
        X = w(() => {
          const {
            data: K,
            active: P,
            checkable: R,
            disableCheckbox: te,
            disabled: ge,
            selectable: we
          } = e;
          return g(
            g(
              {
                active: P,
                checkable: R,
                disableCheckbox: te,
                disabled: ge,
                selectable: we
              },
              K
            ),
            {
              dataRef: K,
              data: K,
              isLeaf: F.value,
              checked: m.value,
              expanded: p.value,
              loading: O.value,
              selected: $.value,
              halfChecked: I.value
            }
          );
        }),
        Y = bl(),
        L = w(() => {
          const { eventKey: K } = e,
            { keyEntities: P } = a.value,
            { parent: R } = P[K] || {};
          return g(g({}, qt(g({}, e, d.value))), { parent: R });
        }),
        Q = gt({
          eventData: L,
          eventKey: w(() => e.eventKey),
          selectHandle: D,
          pos: E,
          key: Y.vnode.key
        });
      l(Q);
      const B = K => {
          const { onNodeDoubleClick: P } = a.value;
          P(K, L.value);
        },
        H = K => {
          if (ee.value) return;
          const { onNodeSelect: P } = a.value;
          K.preventDefault(), P(K, L.value);
        },
        M = K => {
          if (ee.value) return;
          const { disableCheckbox: P } = e,
            { onNodeCheck: R } = a.value;
          if (!Z.value || P) return;
          K.preventDefault();
          const te = !m.value;
          R(K, L.value, te);
        },
        j = K => {
          const { onNodeClick: P } = a.value;
          P(K, L.value), he.value ? H(K) : M(K);
        },
        ne = K => {
          const { onNodeMouseEnter: P } = a.value;
          P(K, L.value);
        },
        oe = K => {
          const { onNodeMouseLeave: P } = a.value;
          P(K, L.value);
        },
        Ke = K => {
          const { onNodeContextMenu: P } = a.value;
          P(K, L.value);
        },
        Ie = K => {
          const { onNodeDragStart: P } = a.value;
          K.stopPropagation(), (r.value = !0), P(K, Q);
          try {
            K.dataTransfer.setData('text/plain', '');
          } catch {}
        },
        De = K => {
          const { onNodeDragEnter: P } = a.value;
          K.preventDefault(), K.stopPropagation(), P(K, Q);
        },
        _e = K => {
          const { onNodeDragOver: P } = a.value;
          K.preventDefault(), K.stopPropagation(), P(K, Q);
        },
        je = K => {
          const { onNodeDragLeave: P } = a.value;
          K.stopPropagation(), P(K, Q);
        },
        Ve = K => {
          const { onNodeDragEnd: P } = a.value;
          K.stopPropagation(), (r.value = !1), P(K, Q);
        },
        Ne = K => {
          const { onNodeDrop: P } = a.value;
          K.preventDefault(), K.stopPropagation(), (r.value = !1), P(K, Q);
        },
        Ee = K => {
          const { onNodeExpand: P } = a.value;
          O.value || P(K, L.value);
        },
        G = () => {
          const { data: K } = e,
            { draggable: P } = a.value;
          return !!(P && (!P.nodeDraggable || P.nodeDraggable(K)));
        },
        ce = () => {
          const { draggable: K, prefixCls: P } = a.value;
          return K && K != null && K.icon
            ? h('span', { class: `${P}-draggable-icon` }, [K.icon])
            : null;
        },
        J = () => {
          var K, P, R;
          const {
              switcherIcon: te = o.switcherIcon ||
                ((K = a.value.slots) === null || K === void 0
                  ? void 0
                  : K[
                      (R =
                        (P = e.data) === null || P === void 0
                          ? void 0
                          : P.slots) === null || R === void 0
                        ? void 0
                        : R.switcherIcon
                    ])
            } = e,
            { switcherIcon: ge } = a.value,
            we = te || ge;
          return typeof we == 'function' ? we(X.value) : we;
        },
        se = () => {
          const { loadData: K, onNodeLoad: P } = a.value;
          O.value ||
            (K && p.value && !F.value && !A.value && !S.value && P(L.value));
        };
      at(() => {
        se();
      }),
        Jn(() => {
          se();
        });
      const ue = () => {
          const { prefixCls: K } = a.value,
            P = J();
          if (F.value)
            return P !== !1
              ? h(
                  'span',
                  { class: ie(`${K}-switcher`, `${K}-switcher-noop`) },
                  [P]
                )
              : null;
          const R = ie(`${K}-switcher`, `${K}-switcher_${p.value ? Ko : Do}`);
          return P !== !1 ? h('span', { onClick: Ee, class: R }, [P]) : null;
        },
        Pe = () => {
          var K, P;
          const { disableCheckbox: R } = e,
            { prefixCls: te } = a.value,
            ge = ee.value;
          return Z.value
            ? h(
                'span',
                {
                  class: ie(
                    `${te}-checkbox`,
                    m.value && `${te}-checkbox-checked`,
                    !m.value && I.value && `${te}-checkbox-indeterminate`,
                    (ge || R) && `${te}-checkbox-disabled`
                  ),
                  onClick: M
                },
                [
                  (P = (K = a.value).customCheckable) === null || P === void 0
                    ? void 0
                    : P.call(K)
                ]
              )
            : null;
        },
        de = () => {
          const { prefixCls: K } = a.value;
          return h(
            'span',
            {
              class: ie(
                `${K}-iconEle`,
                `${K}-icon__${U.value || 'docu'}`,
                O.value && `${K}-icon_loading`
              )
            },
            null
          );
        },
        xe = () => {
          const { disabled: K, eventKey: P } = e,
            {
              draggable: R,
              dropLevelOffset: te,
              dropPosition: ge,
              prefixCls: we,
              indent: N,
              dropIndicatorRender: _,
              dragOverNodeKey: z,
              direction: V
            } = a.value;
          return !K && R !== !1 && z === P
            ? _({
                dropPosition: ge,
                dropLevelOffset: te,
                indent: N,
                prefixCls: we,
                direction: V
              })
            : null;
        },
        ke = () => {
          var K, P, R, te, ge, we;
          const { icon: N = o.icon, data: _ } = e,
            z =
              o.title ||
              ((K = a.value.slots) === null || K === void 0
                ? void 0
                : K[
                    (R =
                      (P = e.data) === null || P === void 0
                        ? void 0
                        : P.slots) === null || R === void 0
                      ? void 0
                      : R.title
                  ]) ||
              ((te = a.value.slots) === null || te === void 0
                ? void 0
                : te.title) ||
              e.title,
            { prefixCls: V, showIcon: le, icon: re, loadData: q } = a.value,
            Se = ee.value,
            Oe = `${V}-node-content-wrapper`;
          let be;
          if (le) {
            const Be =
              N ||
              ((ge = a.value.slots) === null || ge === void 0
                ? void 0
                : ge[
                    (we = _ == null ? void 0 : _.slots) === null ||
                    we === void 0
                      ? void 0
                      : we.icon
                  ]) ||
              re;
            be = Be
              ? h(
                  'span',
                  { class: ie(`${V}-iconEle`, `${V}-icon__customize`) },
                  [typeof Be == 'function' ? Be(X.value) : Be]
                )
              : de();
          } else q && O.value && (be = de());
          let Ce;
          typeof z == 'function' ? (Ce = z(X.value)) : (Ce = z),
            (Ce = Ce === void 0 ? wi : Ce);
          const $e = h('span', { class: `${V}-title` }, [Ce]);
          return h(
            'span',
            {
              ref: D,
              title: typeof z == 'string' ? z : '',
              class: ie(
                `${Oe}`,
                `${Oe}-${U.value || 'normal'}`,
                !Se && ($.value || r.value) && `${V}-node-selected`
              ),
              onMouseenter: ne,
              onMouseleave: oe,
              onContextmenu: Ke,
              onClick: j,
              onDblclick: B
            },
            [be, $e, xe()]
          );
        };
      return () => {
        const K = g(g({}, e), n),
          {
            eventKey: P,
            isLeaf: R,
            isStart: te,
            isEnd: ge,
            domRef: we,
            active: N,
            data: _,
            onMousemove: z,
            selectable: V
          } = K,
          le = $i(K, [
            'eventKey',
            'isLeaf',
            'isStart',
            'isEnd',
            'domRef',
            'active',
            'data',
            'onMousemove',
            'selectable'
          ]),
          {
            prefixCls: re,
            filterTreeNode: q,
            keyEntities: Se,
            dropContainerKey: Oe,
            dropTargetKey: be,
            draggingNodeKey: Ce
          } = a.value,
          $e = ee.value,
          Be = eo(le, { aria: !0, data: !0 }),
          { level: Fe } = Se[P] || {},
          He = ge[ge.length - 1],
          Ae = G(),
          nt = !$e && Ae,
          pt = Ce === P,
          xt = V !== void 0 ? { 'aria-selected': !!V } : void 0;
        return h(
          'div',
          W(
            W(
              {
                ref: we,
                class: ie(n.class, `${re}-treenode`, {
                  [`${re}-treenode-disabled`]: $e,
                  [`${re}-treenode-switcher-${p.value ? 'open' : 'close'}`]: !R,
                  [`${re}-treenode-checkbox-checked`]: m.value,
                  [`${re}-treenode-checkbox-indeterminate`]: I.value,
                  [`${re}-treenode-selected`]: $.value,
                  [`${re}-treenode-loading`]: O.value,
                  [`${re}-treenode-active`]: N,
                  [`${re}-treenode-leaf-last`]: He,
                  [`${re}-treenode-draggable`]: nt,
                  dragging: pt,
                  'drop-target': be === P,
                  'drop-container': Oe === P,
                  'drag-over': !$e && k.value,
                  'drag-over-gap-top': !$e && T.value,
                  'drag-over-gap-bottom': !$e && C.value,
                  'filter-node': q && q(L.value)
                }),
                style: n.style,
                draggable: nt,
                'aria-grabbed': pt,
                onDragstart: nt ? Ie : void 0,
                onDragenter: Ae ? De : void 0,
                onDragover: Ae ? _e : void 0,
                onDragleave: Ae ? je : void 0,
                onDrop: Ae ? Ne : void 0,
                onDragend: Ae ? Ve : void 0,
                onMousemove: z
              },
              xt
            ),
            Be
          ),
          [
            h(Ci, { prefixCls: re, level: Fe, isStart: te, isEnd: ge }, null),
            ce(),
            ue(),
            Pe(),
            ke()
          ]
        );
      };
    }
  });
globalThis && globalThis.__rest;
function ot(e, t) {
  if (!e) return [];
  const n = e.slice(),
    o = n.indexOf(t);
  return o >= 0 && n.splice(o, 1), n;
}
function ct(e, t) {
  const n = (e || []).slice();
  return n.indexOf(t) === -1 && n.push(t), n;
}
function no(e) {
  return e.split('-');
}
function Fl(e, t) {
  return `${e}-${t}`;
}
function Oi(e) {
  return e && e.type && e.type.isTreeNode;
}
function Pi(e, t) {
  const n = [],
    o = t[e];
  function l() {
    (arguments.length > 0 && arguments[0] !== void 0
      ? arguments[0]
      : []
    ).forEach(a => {
      let { key: i, children: s } = a;
      n.push(i), l(s);
    });
  }
  return l(o.children), n;
}
function ki(e) {
  if (e.parent) {
    const t = no(e.pos);
    return Number(t[t.length - 1]) === e.parent.children.length - 1;
  }
  return !1;
}
function Ii(e) {
  const t = no(e.pos);
  return Number(t[t.length - 1]) === 0;
}
function No(e, t, n, o, l, r, a, i, s, f) {
  var c;
  const { clientX: u, clientY: y } = e,
    { top: x, height: b } = e.target.getBoundingClientRect(),
    d =
      ((f === 'rtl' ? -1 : 1) * (((l == null ? void 0 : l.x) || 0) - u) - 12) /
      o;
  let p = i[n.eventKey];
  if (y < x + b / 2) {
    const E = a.findIndex(F => F.key === p.key),
      D = E <= 0 ? 0 : E - 1,
      A = a[D].key;
    p = i[A];
  }
  const $ = p.key,
    m = p,
    S = p.key;
  let O = 0,
    I = 0;
  if (!s.has($))
    for (let E = 0; E < d && ki(p); E += 1) (p = p.parent), (I += 1);
  const k = t.eventData,
    T = p.node;
  let C = !0;
  return (
    Ii(p) &&
    p.level === 0 &&
    y < x + b / 2 &&
    r({ dragNode: k, dropNode: T, dropPosition: -1 }) &&
    p.key === n.eventKey
      ? (O = -1)
      : (m.children || []).length && s.has(S)
      ? r({ dragNode: k, dropNode: T, dropPosition: 0 })
        ? (O = 0)
        : (C = !1)
      : I === 0
      ? d > -1.5
        ? r({ dragNode: k, dropNode: T, dropPosition: 1 })
          ? (O = 1)
          : (C = !1)
        : r({ dragNode: k, dropNode: T, dropPosition: 0 })
        ? (O = 0)
        : r({ dragNode: k, dropNode: T, dropPosition: 1 })
        ? (O = 1)
        : (C = !1)
      : r({ dragNode: k, dropNode: T, dropPosition: 1 })
      ? (O = 1)
      : (C = !1),
    {
      dropPosition: O,
      dropLevelOffset: I,
      dropTargetKey: p.key,
      dropTargetPos: p.pos,
      dragOverNodeKey: S,
      dropContainerKey:
        O === 0
          ? null
          : ((c = p.parent) === null || c === void 0 ? void 0 : c.key) || null,
      dropAllowed: C
    }
  );
}
function Ro(e, t) {
  if (!e) return;
  const { multiple: n } = t;
  return n ? e.slice() : e.length ? [e[0]] : e;
}
function hn(e) {
  if (!e) return null;
  let t;
  if (Array.isArray(e)) t = { checkedKeys: e, halfCheckedKeys: void 0 };
  else if (typeof e == 'object')
    t = {
      checkedKeys: e.checked || void 0,
      halfCheckedKeys: e.halfChecked || void 0
    };
  else return Me(!1, '`checkedKeys` is not an array or an object'), null;
  return t;
}
function En(e, t) {
  const n = new Set();
  function o(l) {
    if (n.has(l)) return;
    const r = t[l];
    if (!r) return;
    n.add(l);
    const { parent: a, node: i } = r;
    i.disabled || (a && o(a.key));
  }
  return (
    (e || []).forEach(l => {
      o(l);
    }),
    [...n]
  );
}
var Ei =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
function Lt(e, t) {
  return e ?? t;
}
function rn(e) {
  const { title: t, _title: n, key: o, children: l } = e || {},
    r = t || 'title';
  return {
    title: r,
    _title: n || [r],
    key: o || 'key',
    children: l || 'children'
  };
}
function Tn(e) {
  function t() {
    let n = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : [];
    return Mt(n).map(l => {
      var r, a, i, s;
      if (!Oi(l))
        return (
          Me(!l, 'Tree/TreeNode can only accept TreeNode as children.'), null
        );
      const f = l.children || {},
        c = l.key,
        u = {};
      for (const [E, D] of Object.entries(l.props)) u[ml(E)] = D;
      const {
          isLeaf: y,
          checkable: x,
          selectable: b,
          disabled: v,
          disableCheckbox: d
        } = u,
        p = {
          isLeaf: y || y === '' || void 0,
          checkable: x || x === '' || void 0,
          selectable: b || b === '' || void 0,
          disabled: v || v === '' || void 0,
          disableCheckbox: d || d === '' || void 0
        },
        $ = g(g({}, u), p),
        {
          title: m = (r = f.title) === null || r === void 0
            ? void 0
            : r.call(f, $),
          icon: S = (a = f.icon) === null || a === void 0
            ? void 0
            : a.call(f, $),
          switcherIcon: O = (i = f.switcherIcon) === null || i === void 0
            ? void 0
            : i.call(f, $)
        } = u,
        I = Ei(u, ['title', 'icon', 'switcherIcon']),
        k = (s = f.default) === null || s === void 0 ? void 0 : s.call(f),
        T = g(
          g(g({}, I), {
            title: m,
            icon: S,
            switcherIcon: O,
            key: c,
            isLeaf: y
          }),
          p
        ),
        C = t(k);
      return C.length && (T.children = C), T;
    });
  }
  return t(e);
}
function Ti(e, t, n) {
  const { _title: o, key: l, children: r } = rn(n),
    a = new Set(t === !0 ? [] : t),
    i = [];
  function s(f) {
    let c =
      arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : null;
    return f.map((u, y) => {
      const x = Fl(c ? c.pos : '0', y),
        b = Lt(u[l], x);
      let v;
      for (let p = 0; p < o.length; p += 1) {
        const $ = o[p];
        if (u[$] !== void 0) {
          v = u[$];
          break;
        }
      }
      const d = g(g({}, Bt(u, [...o, l, r])), {
        title: v,
        key: b,
        parent: c,
        pos: x,
        children: null,
        data: u,
        isStart: [...(c ? c.isStart : []), y === 0],
        isEnd: [...(c ? c.isEnd : []), y === f.length - 1]
      });
      return (
        i.push(d),
        t === !0 || a.has(b)
          ? (d.children = s(u[r] || [], d))
          : (d.children = []),
        d
      );
    });
  }
  return s(e), i;
}
function Ki(e, t, n) {
  let o = {};
  typeof n == 'object' ? (o = n) : (o = { externalGetKey: n }), (o = o || {});
  const { childrenPropName: l, externalGetKey: r, fieldNames: a } = o,
    { key: i, children: s } = rn(a),
    f = l || s;
  let c;
  r
    ? typeof r == 'string'
      ? (c = y => y[r])
      : typeof r == 'function' && (c = y => r(y))
    : (c = (y, x) => Lt(y[i], x));
  function u(y, x, b, v) {
    const d = y ? y[f] : e,
      p = y ? Fl(b.pos, x) : '0',
      $ = y ? [...v, y] : [];
    if (y) {
      const m = c(y, p),
        S = {
          node: y,
          index: x,
          pos: p,
          key: m,
          parentPos: b.node ? b.pos : null,
          level: b.level + 1,
          nodes: $
        };
      t(S);
    }
    d &&
      d.forEach((m, S) => {
        u(m, S, { node: y, pos: p, level: b ? b.level + 1 : -1 }, $);
      });
  }
  u(null);
}
function oo(e) {
  let {
      initWrapper: t,
      processEntity: n,
      onProcessFinished: o,
      externalGetKey: l,
      childrenPropName: r,
      fieldNames: a
    } = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {},
    i = arguments.length > 2 ? arguments[2] : void 0;
  const s = l || i,
    f = {},
    c = {};
  let u = { posEntities: f, keyEntities: c };
  return (
    t && (u = t(u) || u),
    Ki(
      e,
      y => {
        const {
            node: x,
            index: b,
            pos: v,
            key: d,
            parentPos: p,
            level: $,
            nodes: m
          } = y,
          S = { node: x, nodes: m, index: b, key: d, pos: v, level: $ },
          O = Lt(d, v);
        (f[v] = S),
          (c[O] = S),
          (S.parent = f[p]),
          S.parent &&
            ((S.parent.children = S.parent.children || []),
            S.parent.children.push(S)),
          n && n(S, u);
      },
      { externalGetKey: s, childrenPropName: r, fieldNames: a }
    ),
    o && o(u),
    u
  );
}
function Ut(e, t) {
  let {
    expandedKeysSet: n,
    selectedKeysSet: o,
    loadedKeysSet: l,
    loadingKeysSet: r,
    checkedKeysSet: a,
    halfCheckedKeysSet: i,
    dragOverNodeKey: s,
    dropPosition: f,
    keyEntities: c
  } = t;
  const u = c[e];
  return {
    eventKey: e,
    expanded: n.has(e),
    selected: o.has(e),
    loaded: l.has(e),
    loading: r.has(e),
    checked: a.has(e),
    halfChecked: i.has(e),
    pos: String(u ? u.pos : ''),
    parent: u.parent,
    dragOver: s === e && f === 0,
    dragOverGapTop: s === e && f === -1,
    dragOverGapBottom: s === e && f === 1
  };
}
function qt(e) {
  const {
      data: t,
      expanded: n,
      selected: o,
      checked: l,
      loaded: r,
      loading: a,
      halfChecked: i,
      dragOver: s,
      dragOverGapTop: f,
      dragOverGapBottom: c,
      pos: u,
      active: y,
      eventKey: x
    } = e,
    b = g(g({ dataRef: t }, t), {
      expanded: n,
      selected: o,
      checked: l,
      loaded: r,
      loading: a,
      halfChecked: i,
      dragOver: s,
      dragOverGapTop: f,
      dragOverGapBottom: c,
      pos: u,
      active: y,
      eventKey: x,
      key: x
    });
  return (
    'props' in b ||
      Object.defineProperty(b, 'props', {
        get() {
          return (
            Me(
              !1,
              'Second param return from event is node data instead of TreeNode instance. Please read value directly instead of reading from `props`.'
            ),
            e
          );
        }
      }),
    b
  );
}
function zl(e, t) {
  const n = new Set();
  return (
    e.forEach(o => {
      t.has(o) || n.add(o);
    }),
    n
  );
}
function Di(e) {
  const { disabled: t, disableCheckbox: n, checkable: o } = e || {};
  return !!(t || n) || o === !1;
}
function Ni(e, t, n, o) {
  const l = new Set(e),
    r = new Set();
  for (let i = 0; i <= n; i += 1)
    (t.get(i) || new Set()).forEach(f => {
      const { key: c, node: u, children: y = [] } = f;
      l.has(c) &&
        !o(u) &&
        y
          .filter(x => !o(x.node))
          .forEach(x => {
            l.add(x.key);
          });
    });
  const a = new Set();
  for (let i = n; i >= 0; i -= 1)
    (t.get(i) || new Set()).forEach(f => {
      const { parent: c, node: u } = f;
      if (o(u) || !f.parent || a.has(f.parent.key)) return;
      if (o(f.parent.node)) {
        a.add(c.key);
        return;
      }
      let y = !0,
        x = !1;
      (c.children || [])
        .filter(b => !o(b.node))
        .forEach(b => {
          let { key: v } = b;
          const d = l.has(v);
          y && !d && (y = !1), !x && (d || r.has(v)) && (x = !0);
        }),
        y && l.add(c.key),
        x && r.add(c.key),
        a.add(c.key);
    });
  return { checkedKeys: Array.from(l), halfCheckedKeys: Array.from(zl(r, l)) };
}
function Ri(e, t, n, o, l) {
  const r = new Set(e);
  let a = new Set(t);
  for (let s = 0; s <= o; s += 1)
    (n.get(s) || new Set()).forEach(c => {
      const { key: u, node: y, children: x = [] } = c;
      !r.has(u) &&
        !a.has(u) &&
        !l(y) &&
        x
          .filter(b => !l(b.node))
          .forEach(b => {
            r.delete(b.key);
          });
    });
  a = new Set();
  const i = new Set();
  for (let s = o; s >= 0; s -= 1)
    (n.get(s) || new Set()).forEach(c => {
      const { parent: u, node: y } = c;
      if (l(y) || !c.parent || i.has(c.parent.key)) return;
      if (l(c.parent.node)) {
        i.add(u.key);
        return;
      }
      let x = !0,
        b = !1;
      (u.children || [])
        .filter(v => !l(v.node))
        .forEach(v => {
          let { key: d } = v;
          const p = r.has(d);
          x && !p && (x = !1), !b && (p || a.has(d)) && (b = !0);
        }),
        x || r.delete(u.key),
        b && a.add(u.key),
        i.add(u.key);
    });
  return { checkedKeys: Array.from(r), halfCheckedKeys: Array.from(zl(a, r)) };
}
function Tt(e, t, n, o, l, r) {
  const a = [];
  let i;
  r ? (i = r) : (i = Di);
  const s = new Set(
    e.filter(c => {
      const u = !!n[c];
      return u || a.push(c), u;
    })
  );
  kr(
    !a.length,
    `Tree missing follow keys: ${a
      .slice(0, 100)
      .map(c => `'${c}'`)
      .join(', ')}`
  );
  let f;
  return (
    t === !0 ? (f = Ni(s, l, o, i)) : (f = Ri(s, t.halfCheckedKeys, l, o, i)), f
  );
}
function Ml(e) {
  const t = pe(0),
    n = ae();
  return (
    Re(() => {
      const o = new Map();
      let l = 0;
      const r = e.value || {};
      for (const a in r)
        if (Object.prototype.hasOwnProperty.call(r, a)) {
          const i = r[a],
            { level: s } = i;
          let f = o.get(s);
          f || ((f = new Set()), o.set(s, f)), f.add(i), (l = Math.max(l, s));
        }
      (t.value = l), (n.value = o);
    }),
    { maxLevel: t, levelEntities: n }
  );
}
const Bi = new Gn('antCheckboxEffect', {
    '0%': { transform: 'scale(1)', opacity: 0.5 },
    '100%': { transform: 'scale(1.6)', opacity: 0 }
  }),
  _i = e => {
    const { checkboxCls: t } = e,
      n = `${t}-wrapper`;
    return [
      {
        [`${t}-group`]: g(g({}, et(e)), {
          display: 'inline-flex',
          flexWrap: 'wrap',
          columnGap: e.marginXS,
          [`> ${e.antCls}-row`]: { flex: 1 }
        }),
        [n]: g(g({}, et(e)), {
          display: 'inline-flex',
          alignItems: 'baseline',
          cursor: 'pointer',
          '&:after': {
            display: 'inline-block',
            width: 0,
            overflow: 'hidden',
            content: "'\\a0'"
          },
          [`& + ${n}`]: { marginInlineStart: 0 },
          [`&${n}-in-form-item`]: {
            'input[type="checkbox"]': { width: 14, height: 14 }
          }
        }),
        [t]: g(g({}, et(e)), {
          position: 'relative',
          whiteSpace: 'nowrap',
          lineHeight: 1,
          cursor: 'pointer',
          alignSelf: 'center',
          [`${t}-input`]: {
            position: 'absolute',
            inset: 0,
            zIndex: 1,
            cursor: 'pointer',
            opacity: 0,
            margin: 0,
            [`&:focus-visible + ${t}-inner`]: g({}, kt(e))
          },
          [`${t}-inner`]: {
            boxSizing: 'border-box',
            position: 'relative',
            top: 0,
            insetInlineStart: 0,
            display: 'block',
            width: e.checkboxSize,
            height: e.checkboxSize,
            direction: 'ltr',
            backgroundColor: e.colorBgContainer,
            border: `${e.lineWidth}px ${e.lineType} ${e.colorBorder}`,
            borderRadius: e.borderRadiusSM,
            borderCollapse: 'separate',
            transition: `all ${e.motionDurationSlow}`,
            '&:after': {
              boxSizing: 'border-box',
              position: 'absolute',
              top: '50%',
              insetInlineStart: '21.5%',
              display: 'table',
              width: (e.checkboxSize / 14) * 5,
              height: (e.checkboxSize / 14) * 8,
              border: `${e.lineWidthBold}px solid ${e.colorWhite}`,
              borderTop: 0,
              borderInlineStart: 0,
              transform: 'rotate(45deg) scale(0) translate(-50%,-50%)',
              opacity: 0,
              content: '""',
              transition: `all ${e.motionDurationFast} ${e.motionEaseInBack}, opacity ${e.motionDurationFast}`
            }
          },
          '& + span': {
            paddingInlineStart: e.paddingXS,
            paddingInlineEnd: e.paddingXS
          }
        })
      },
      {
        [t]: {
          '&-indeterminate': {
            [`${t}-inner`]: {
              '&:after': {
                top: '50%',
                insetInlineStart: '50%',
                width: e.fontSizeLG / 2,
                height: e.fontSizeLG / 2,
                backgroundColor: e.colorPrimary,
                border: 0,
                transform: 'translate(-50%, -50%) scale(1)',
                opacity: 1,
                content: '""'
              }
            }
          }
        }
      },
      {
        [`${n}:hover ${t}:after`]: { visibility: 'visible' },
        [`
        ${n}:not(${n}-disabled),
        ${t}:not(${t}-disabled)
      `]: { [`&:hover ${t}-inner`]: { borderColor: e.colorPrimary } },
        [`${n}:not(${n}-disabled)`]: {
          [`&:hover ${t}-checked:not(${t}-disabled) ${t}-inner`]: {
            backgroundColor: e.colorPrimaryHover,
            borderColor: 'transparent'
          },
          [`&:hover ${t}-checked:not(${t}-disabled):after`]: {
            borderColor: e.colorPrimaryHover
          }
        }
      },
      {
        [`${t}-checked`]: {
          [`${t}-inner`]: {
            backgroundColor: e.colorPrimary,
            borderColor: e.colorPrimary,
            '&:after': {
              opacity: 1,
              transform: 'rotate(45deg) scale(1) translate(-50%,-50%)',
              transition: `all ${e.motionDurationMid} ${e.motionEaseOutBack} ${e.motionDurationFast}`
            }
          },
          '&:after': {
            position: 'absolute',
            top: 0,
            insetInlineStart: 0,
            width: '100%',
            height: '100%',
            borderRadius: e.borderRadiusSM,
            visibility: 'hidden',
            border: `${e.lineWidthBold}px solid ${e.colorPrimary}`,
            animationName: Bi,
            animationDuration: e.motionDurationSlow,
            animationTimingFunction: 'ease-in-out',
            animationFillMode: 'backwards',
            content: '""',
            transition: `all ${e.motionDurationSlow}`
          }
        },
        [`
        ${n}-checked:not(${n}-disabled),
        ${t}-checked:not(${t}-disabled)
      `]: {
          [`&:hover ${t}-inner`]: {
            backgroundColor: e.colorPrimaryHover,
            borderColor: 'transparent'
          },
          [`&:hover ${t}:after`]: { borderColor: e.colorPrimaryHover }
        }
      },
      {
        [`${n}-disabled`]: { cursor: 'not-allowed' },
        [`${t}-disabled`]: {
          [`&, ${t}-input`]: { cursor: 'not-allowed', pointerEvents: 'none' },
          [`${t}-inner`]: {
            background: e.colorBgContainerDisabled,
            borderColor: e.colorBorder,
            '&:after': { borderColor: e.colorTextDisabled }
          },
          '&:after': { display: 'none' },
          '& + span': { color: e.colorTextDisabled },
          [`&${t}-indeterminate ${t}-inner::after`]: {
            background: e.colorTextDisabled
          }
        }
      }
    ];
  };
function jl(e, t) {
  const n = Rt(t, {
    checkboxCls: `.${e}`,
    checkboxSize: t.controlInteractiveSize
  });
  return [_i(n)];
}
const Ll = Nt('Checkbox', (e, t) => {
    let { prefixCls: n } = t;
    return [jl(n, e)];
  }),
  Ai = () => ({
    name: String,
    prefixCls: String,
    options: Le([]),
    disabled: Boolean,
    id: String
  }),
  Fi = () =>
    g(g({}, Ai()), {
      defaultValue: Le(),
      value: Le(),
      onChange: ye(),
      'onUpdate:value': ye()
    }),
  zi = () => ({
    prefixCls: String,
    defaultChecked: fe(),
    checked: fe(),
    disabled: fe(),
    isGroup: fe(),
    value: me.any,
    name: String,
    id: String,
    indeterminate: fe(),
    type: Ue('checkbox'),
    autofocus: fe(),
    onChange: ye(),
    'onUpdate:checked': ye(),
    onClick: ye(),
    skipGroup: fe(!1)
  }),
  Mi = () => g(g({}, zi()), { indeterminate: fe(!1) }),
  Hl = Symbol('CheckboxGroupContext');
var Bo =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const ut = ve({
    compatConfig: { MODE: 3 },
    name: 'ACheckbox',
    inheritAttrs: !1,
    __ANT_CHECKBOX: !0,
    props: Mi(),
    setup(e, t) {
      let { emit: n, attrs: o, slots: l, expose: r } = t;
      const a = ln(),
        i = xl.useInject(),
        { prefixCls: s, direction: f, disabled: c } = Ye('checkbox', e),
        [u, y] = Ll(s),
        x = qe(Hl, void 0),
        b = Symbol('checkboxUniId'),
        v = w(() => (x == null ? void 0 : x.disabled.value) || c.value);
      Re(() => {
        !e.skipGroup && x && x.registerValue(b, e.value);
      }),
        yt(() => {
          x && x.cancelValue(b);
        }),
        at(() => {
          On(
            !!(e.checked !== void 0 || x || e.value === void 0),
            'Checkbox',
            '`value` is not validate prop, do you mean `checked`?'
          );
        });
      const d = S => {
          const O = S.target.checked;
          n('update:checked', O), n('change', S), a.onFieldChange();
        },
        p = pe();
      return (
        r({
          focus: () => {
            var S;
            (S = p.value) === null || S === void 0 || S.focus();
          },
          blur: () => {
            var S;
            (S = p.value) === null || S === void 0 || S.blur();
          }
        }),
        () => {
          var S;
          const O = Un(
              (S = l.default) === null || S === void 0 ? void 0 : S.call(l)
            ),
            { indeterminate: I, skipGroup: k, id: T = a.id.value } = e,
            C = Bo(e, ['indeterminate', 'skipGroup', 'id']),
            {
              onMouseenter: E,
              onMouseleave: D,
              onInput: A,
              class: F,
              style: U
            } = o,
            ee = Bo(o, [
              'onMouseenter',
              'onMouseleave',
              'onInput',
              'class',
              'style'
            ]),
            Z = g(g(g(g({}, C), { id: T, prefixCls: s.value }), ee), {
              disabled: v.value
            });
          x && !k
            ? ((Z.onChange = function() {
                for (
                  var L = arguments.length, Q = new Array(L), B = 0;
                  B < L;
                  B++
                )
                  Q[B] = arguments[B];
                n('change', ...Q), x.toggleOption({ label: O, value: e.value });
              }),
              (Z.name = x.name.value),
              (Z.checked = x.mergedValue.value.includes(e.value)),
              (Z.disabled = v.value || x.disabled.value),
              (Z.indeterminate = I))
            : (Z.onChange = d);
          const he = ie(
              {
                [`${s.value}-wrapper`]: !0,
                [`${s.value}-rtl`]: f.value === 'rtl',
                [`${s.value}-wrapper-checked`]: Z.checked,
                [`${s.value}-wrapper-disabled`]: Z.disabled,
                [`${s.value}-wrapper-in-form-item`]: i.isFormItemInput
              },
              F,
              y.value
            ),
            X = ie({ [`${s.value}-indeterminate`]: I }, y.value);
          return u(
            h(
              'label',
              { class: he, style: U, onMouseenter: E, onMouseleave: D },
              [
                h(
                  Il,
                  W(
                    W({ 'aria-checked': I ? 'mixed' : void 0 }, Z),
                    {},
                    { class: X, ref: p, disabled: v.value }
                  ),
                  null
                ),
                O.length ? h('span', null, [O]) : null
              ]
            )
          );
        }
      );
    }
  }),
  Kn = ve({
    compatConfig: { MODE: 3 },
    name: 'ACheckboxGroup',
    inheritAttrs: !1,
    props: Fi(),
    setup(e, t) {
      let { slots: n, attrs: o, emit: l, expose: r } = t;
      const a = ln(),
        { prefixCls: i, direction: s } = Ye('checkbox', e),
        f = w(() => `${i.value}-group`),
        [c, u] = Ll(f),
        y = pe((e.value === void 0 ? e.defaultValue : e.value) || []);
      Te(
        () => e.value,
        () => {
          y.value = e.value || [];
        }
      );
      const x = w(() =>
          e.options.map(S =>
            typeof S == 'string' || typeof S == 'number'
              ? { label: S, value: S }
              : S
          )
        ),
        b = pe(Symbol()),
        v = pe(new Map()),
        d = S => {
          v.value.delete(S), (b.value = Symbol());
        },
        p = (S, O) => {
          v.value.set(S, O), (b.value = Symbol());
        },
        $ = pe(new Map());
      return (
        Te(b, () => {
          const S = new Map();
          for (const O of v.value.values()) S.set(O, !0);
          $.value = S;
        }),
        Je(Hl, {
          cancelValue: d,
          registerValue: p,
          toggleOption: S => {
            const O = y.value.indexOf(S.value),
              I = [...y.value];
            O === -1 ? I.push(S.value) : I.splice(O, 1),
              e.value === void 0 && (y.value = I);
            const k = I.filter(T => $.value.has(T)).sort((T, C) => {
              const E = x.value.findIndex(A => A.value === T),
                D = x.value.findIndex(A => A.value === C);
              return E - D;
            });
            l('update:value', k), l('change', k), a.onFieldChange();
          },
          mergedValue: y,
          name: w(() => e.name),
          disabled: w(() => e.disabled)
        }),
        r({ mergedValue: y }),
        () => {
          var S;
          const { id: O = a.id.value } = e;
          let I = null;
          return (
            x.value &&
              x.value.length > 0 &&
              (I = x.value.map(k => {
                var T;
                return h(
                  ut,
                  {
                    prefixCls: i.value,
                    key: k.value.toString(),
                    disabled: 'disabled' in k ? k.disabled : e.disabled,
                    indeterminate: k.indeterminate,
                    value: k.value,
                    checked: y.value.indexOf(k.value) !== -1,
                    onChange: k.onChange,
                    class: `${f.value}-item`
                  },
                  {
                    default: () => [
                      n.label !== void 0
                        ? (T = n.label) === null || T === void 0
                          ? void 0
                          : T.call(n, k)
                        : k.label
                    ]
                  }
                );
              })),
            c(
              h(
                'div',
                W(
                  W({}, o),
                  {},
                  {
                    class: [
                      f.value,
                      { [`${f.value}-rtl`]: s.value === 'rtl' },
                      o.class,
                      u.value
                    ],
                    id: O
                  }
                ),
                [
                  I ||
                    ((S = n.default) === null || S === void 0
                      ? void 0
                      : S.call(n))
                ]
              )
            )
          );
        }
      );
    }
  });
ut.Group = Kn;
ut.install = function(e) {
  return e.component(ut.name, ut), e.component(Kn.name, Kn), e;
};
function _o(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        ji(e, l, n[l]);
      });
  }
  return e;
}
function ji(e, t, n) {
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
var lo = function(t, n) {
  var o = _o({}, t, n.attrs);
  return h(tt, _o({}, o, { icon: ma }), null);
};
lo.displayName = 'CaretDownFilled';
lo.inheritAttrs = !1;
const Li = lo;
function Ao(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        Hi(e, l, n[l]);
      });
  }
  return e;
}
function Hi(e, t, n) {
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
var ro = function(t, n) {
  var o = Ao({}, t, n.attrs);
  return h(tt, Ao({}, o, { icon: ya }), null);
};
ro.displayName = 'CaretDownOutlined';
ro.inheritAttrs = !1;
const Wi = ro;
function Fo(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        Vi(e, l, n[l]);
      });
  }
  return e;
}
function Vi(e, t, n) {
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
var ao = function(t, n) {
  var o = Fo({}, t, n.attrs);
  return h(tt, Fo({}, o, { icon: ba }), null);
};
ao.displayName = 'CaretUpOutlined';
ao.inheritAttrs = !1;
const Xi = ao;
function zo(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        Gi(e, l, n[l]);
      });
  }
  return e;
}
function Gi(e, t, n) {
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
var io = function(t, n) {
  var o = zo({}, t, n.attrs);
  return h(tt, zo({}, o, { icon: xa }), null);
};
io.displayName = 'DoubleLeftOutlined';
io.inheritAttrs = !1;
const Mo = io;
function jo(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        Ui(e, l, n[l]);
      });
  }
  return e;
}
function Ui(e, t, n) {
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
var so = function(t, n) {
  var o = jo({}, t, n.attrs);
  return h(tt, jo({}, o, { icon: Ca }), null);
};
so.displayName = 'DoubleRightOutlined';
so.inheritAttrs = !1;
const Lo = so;
function Ho(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        qi(e, l, n[l]);
      });
  }
  return e;
}
function qi(e, t, n) {
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
var co = function(t, n) {
  var o = Ho({}, t, n.attrs);
  return h(tt, Ho({}, o, { icon: Sa }), null);
};
co.displayName = 'FileOutlined';
co.inheritAttrs = !1;
const Wl = co;
function Wo(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        Ji(e, l, n[l]);
      });
  }
  return e;
}
function Ji(e, t, n) {
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
var uo = function(t, n) {
  var o = Wo({}, t, n.attrs);
  return h(tt, Wo({}, o, { icon: $a }), null);
};
uo.displayName = 'FilterFilled';
uo.inheritAttrs = !1;
const Yi = uo;
function Vo(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        Qi(e, l, n[l]);
      });
  }
  return e;
}
function Qi(e, t, n) {
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
var fo = function(t, n) {
  var o = Vo({}, t, n.attrs);
  return h(tt, Vo({}, o, { icon: wa }), null);
};
fo.displayName = 'FolderOpenOutlined';
fo.inheritAttrs = !1;
const Zi = fo;
function Xo(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        es(e, l, n[l]);
      });
  }
  return e;
}
function es(e, t, n) {
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
var po = function(t, n) {
  var o = Xo({}, t, n.attrs);
  return h(tt, Xo({}, o, { icon: Oa }), null);
};
po.displayName = 'FolderOutlined';
po.inheritAttrs = !1;
const ts = po;
function Go(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        ns(e, l, n[l]);
      });
  }
  return e;
}
function ns(e, t, n) {
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
var vo = function(t, n) {
  var o = Go({}, t, n.attrs);
  return h(tt, Go({}, o, { icon: Pa }), null);
};
vo.displayName = 'MinusSquareOutlined';
vo.inheritAttrs = !1;
const os = vo;
function Uo(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      o.forEach(function(l) {
        ls(e, l, n[l]);
      });
  }
  return e;
}
function ls(e, t, n) {
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
var ho = function(t, n) {
  var o = Uo({}, t, n.attrs);
  return h(tt, Uo({}, o, { icon: ka }), null);
};
ho.displayName = 'PlusSquareOutlined';
ho.inheritAttrs = !1;
const rs = ho;
Pt.Button = nn;
Pt.install = function(e) {
  return e.component(Pt.name, Pt), e.component(nn.name, nn), e;
};
const as = ve({
    name: 'MiniSelect',
    compatConfig: { MODE: 3 },
    inheritAttrs: !1,
    props: $l(),
    Option: tn.Option,
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      return () => {
        const l = g(g(g({}, e), { size: 'small' }), n);
        return h(tn, l, o);
      };
    }
  }),
  is = ve({
    name: 'MiddleSelect',
    inheritAttrs: !1,
    props: $l(),
    Option: tn.Option,
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      return () => {
        const l = g(g(g({}, e), { size: 'middle' }), n);
        return h(tn, l, o);
      };
    }
  }),
  Ct = ve({
    compatConfig: { MODE: 3 },
    name: 'Pager',
    inheritAttrs: !1,
    props: {
      rootPrefixCls: String,
      page: Number,
      active: { type: Boolean, default: void 0 },
      last: { type: Boolean, default: void 0 },
      locale: me.object,
      showTitle: { type: Boolean, default: void 0 },
      itemRender: { type: Function, default: () => {} },
      onClick: { type: Function },
      onKeypress: { type: Function }
    },
    eimt: ['click', 'keypress'],
    setup(e, t) {
      let { emit: n, attrs: o } = t;
      const l = () => {
          n('click', e.page);
        },
        r = a => {
          n('keypress', a, l, e.page);
        };
      return () => {
        const { showTitle: a, page: i, itemRender: s } = e,
          { class: f, style: c } = o,
          u = `${e.rootPrefixCls}-item`,
          y = ie(
            u,
            `${u}-${e.page}`,
            { [`${u}-active`]: e.active, [`${u}-disabled`]: !e.page },
            f
          );
        return h(
          'li',
          {
            onClick: l,
            onKeypress: r,
            title: a ? String(i) : null,
            tabindex: '0',
            class: y,
            style: c
          },
          [
            s({
              page: i,
              type: 'page',
              originalElement: h('a', { rel: 'nofollow' }, [i])
            })
          ]
        );
      };
    }
  }),
  St = {
    ZERO: 48,
    NINE: 57,
    NUMPAD_ZERO: 96,
    NUMPAD_NINE: 105,
    BACKSPACE: 8,
    DELETE: 46,
    ENTER: 13,
    ARROW_UP: 38,
    ARROW_DOWN: 40
  },
  ss = ve({
    compatConfig: { MODE: 3 },
    props: {
      disabled: { type: Boolean, default: void 0 },
      changeSize: Function,
      quickGo: Function,
      selectComponentClass: me.any,
      current: Number,
      pageSizeOptions: me.array.def(['10', '20', '50', '100']),
      pageSize: Number,
      buildOptionText: Function,
      locale: me.object,
      rootPrefixCls: String,
      selectPrefixCls: String,
      goButton: me.any
    },
    setup(e) {
      const t = pe(''),
        n = w(() => (!t.value || isNaN(t.value) ? void 0 : Number(t.value))),
        o = s => `${s.value} ${e.locale.items_per_page}`,
        l = s => {
          const { value: f, composing: c } = s.target;
          s.isComposing || c || t.value === f || (t.value = f);
        },
        r = s => {
          const { goButton: f, quickGo: c, rootPrefixCls: u } = e;
          if (!(f || t.value === ''))
            if (
              s.relatedTarget &&
              (s.relatedTarget.className.indexOf(`${u}-item-link`) >= 0 ||
                s.relatedTarget.className.indexOf(`${u}-item`) >= 0)
            ) {
              t.value = '';
              return;
            } else c(n.value), (t.value = '');
        },
        a = s => {
          t.value !== '' &&
            (s.keyCode === St.ENTER || s.type === 'click') &&
            (e.quickGo(n.value), (t.value = ''));
        },
        i = w(() => {
          const { pageSize: s, pageSizeOptions: f } = e;
          return f.some(c => c.toString() === s.toString())
            ? f
            : f.concat([s.toString()]).sort((c, u) => {
                const y = isNaN(Number(c)) ? 0 : Number(c),
                  x = isNaN(Number(u)) ? 0 : Number(u);
                return y - x;
              });
        });
      return () => {
        const {
            rootPrefixCls: s,
            locale: f,
            changeSize: c,
            quickGo: u,
            goButton: y,
            selectComponentClass: x,
            selectPrefixCls: b,
            pageSize: v,
            disabled: d
          } = e,
          p = `${s}-options`;
        let $ = null,
          m = null,
          S = null;
        if (!c && !u) return null;
        if (c && x) {
          const O = e.buildOptionText || o,
            I = i.value.map((k, T) =>
              h(
                x.Option,
                { key: T, value: k },
                { default: () => [O({ value: k })] }
              )
            );
          $ = h(
            x,
            {
              disabled: d,
              prefixCls: b,
              showSearch: !1,
              class: `${p}-size-changer`,
              optionLabelProp: 'children',
              value: (v || i.value[0]).toString(),
              onChange: k => c(Number(k)),
              getPopupContainer: k => k.parentNode
            },
            { default: () => [I] }
          );
        }
        return (
          u &&
            (y &&
              (S =
                typeof y == 'boolean'
                  ? h(
                      'button',
                      {
                        type: 'button',
                        onClick: a,
                        onKeyup: a,
                        disabled: d,
                        class: `${p}-quick-jumper-button`
                      },
                      [f.jump_to_confirm]
                    )
                  : h('span', { onClick: a, onKeyup: a }, [y])),
            (m = h('div', { class: `${p}-quick-jumper` }, [
              f.jump_to,
              Yn(
                h(
                  'input',
                  {
                    disabled: d,
                    type: 'text',
                    value: t.value,
                    onInput: l,
                    onChange: l,
                    onKeyup: a,
                    onBlur: r
                  },
                  null
                ),
                [[Cl]]
              ),
              f.page,
              S
            ]))),
          h('li', { class: `${p}` }, [$, m])
        );
      };
    }
  }),
  cs = {
    items_per_page: '条/页',
    jump_to: '跳至',
    jump_to_confirm: '确定',
    page: '页',
    prev_page: '上一页',
    next_page: '下一页',
    prev_5: '向前 5 页',
    next_5: '向后 5 页',
    prev_3: '向前 3 页',
    next_3: '向后 3 页'
  };
var ds =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
function us(e) {
  return typeof e == 'number' && isFinite(e) && Math.floor(e) === e;
}
function fs(e) {
  let { originalElement: t } = e;
  return t;
}
function st(e, t, n) {
  const o = typeof e > 'u' ? t.statePageSize : e;
  return Math.floor((n.total - 1) / o) + 1;
}
const ps = ve({
    compatConfig: { MODE: 3 },
    name: 'Pagination',
    mixins: [oa],
    inheritAttrs: !1,
    props: {
      disabled: { type: Boolean, default: void 0 },
      prefixCls: me.string.def('rc-pagination'),
      selectPrefixCls: me.string.def('rc-select'),
      current: Number,
      defaultCurrent: me.number.def(1),
      total: me.number.def(0),
      pageSize: Number,
      defaultPageSize: me.number.def(10),
      hideOnSinglePage: { type: Boolean, default: !1 },
      showSizeChanger: { type: Boolean, default: void 0 },
      showLessItems: { type: Boolean, default: !1 },
      selectComponentClass: me.any,
      showPrevNextJumpers: { type: Boolean, default: !0 },
      showQuickJumper: me.oneOfType([me.looseBool, me.object]).def(!1),
      showTitle: { type: Boolean, default: !0 },
      pageSizeOptions: me.arrayOf(me.oneOfType([me.number, me.string])),
      buildOptionText: Function,
      showTotal: Function,
      simple: { type: Boolean, default: void 0 },
      locale: me.object.def(cs),
      itemRender: me.func.def(fs),
      prevIcon: me.any,
      nextIcon: me.any,
      jumpPrevIcon: me.any,
      jumpNextIcon: me.any,
      totalBoundaryShowSizeChanger: me.number.def(50)
    },
    data() {
      const e = this.$props;
      let t = wo([this.current, this.defaultCurrent]);
      const n = wo([this.pageSize, this.defaultPageSize]);
      return (
        (t = Math.min(t, st(n, void 0, e))),
        { stateCurrent: t, stateCurrentInputValue: t, statePageSize: n }
      );
    },
    watch: {
      current(e) {
        this.setState({ stateCurrent: e, stateCurrentInputValue: e });
      },
      pageSize(e) {
        const t = {};
        let n = this.stateCurrent;
        const o = st(e, this.$data, this.$props);
        (n = n > o ? o : n),
          Ft(this, 'current') ||
            ((t.stateCurrent = n), (t.stateCurrentInputValue = n)),
          (t.statePageSize = e),
          this.setState(t);
      },
      stateCurrent(e, t) {
        this.$nextTick(() => {
          if (this.$refs.paginationNode) {
            const n = this.$refs.paginationNode.querySelector(
              `.${this.prefixCls}-item-${t}`
            );
            n && document.activeElement === n && n.blur();
          }
        });
      },
      total() {
        const e = {},
          t = st(this.pageSize, this.$data, this.$props);
        if (Ft(this, 'current')) {
          const n = Math.min(this.current, t);
          (e.stateCurrent = n), (e.stateCurrentInputValue = n);
        } else {
          let n = this.stateCurrent;
          n === 0 && t > 0 ? (n = 1) : (n = Math.min(this.stateCurrent, t)),
            (e.stateCurrent = n);
        }
        this.setState(e);
      }
    },
    methods: {
      getJumpPrevPage() {
        return Math.max(1, this.stateCurrent - (this.showLessItems ? 3 : 5));
      },
      getJumpNextPage() {
        return Math.min(
          st(void 0, this.$data, this.$props),
          this.stateCurrent + (this.showLessItems ? 3 : 5)
        );
      },
      getItemIcon(e, t) {
        const { prefixCls: n } = this.$props;
        return (
          Ir(this, e, this.$props) ||
          h(
            'button',
            { type: 'button', 'aria-label': t, class: `${n}-item-link` },
            null
          )
        );
      },
      getValidValue(e) {
        const t = e.target.value,
          n = st(void 0, this.$data, this.$props),
          { stateCurrentInputValue: o } = this.$data;
        let l;
        return (
          t === ''
            ? (l = t)
            : isNaN(Number(t))
            ? (l = o)
            : t >= n
            ? (l = n)
            : (l = Number(t)),
          l
        );
      },
      isValid(e) {
        return us(e) && e !== this.stateCurrent;
      },
      shouldDisplayQuickJumper() {
        const { showQuickJumper: e, pageSize: t, total: n } = this.$props;
        return n <= t ? !1 : e;
      },
      handleKeyDown(e) {
        (e.keyCode === St.ARROW_UP || e.keyCode === St.ARROW_DOWN) &&
          e.preventDefault();
      },
      handleKeyUp(e) {
        if (e.isComposing || e.target.composing) return;
        const t = this.getValidValue(e),
          n = this.stateCurrentInputValue;
        t !== n && this.setState({ stateCurrentInputValue: t }),
          e.keyCode === St.ENTER
            ? this.handleChange(t)
            : e.keyCode === St.ARROW_UP
            ? this.handleChange(t - 1)
            : e.keyCode === St.ARROW_DOWN && this.handleChange(t + 1);
      },
      changePageSize(e) {
        let t = this.stateCurrent;
        const n = t,
          o = st(e, this.$data, this.$props);
        (t = t > o ? o : t),
          o === 0 && (t = this.stateCurrent),
          typeof e == 'number' &&
            (Ft(this, 'pageSize') || this.setState({ statePageSize: e }),
            Ft(this, 'current') ||
              this.setState({ stateCurrent: t, stateCurrentInputValue: t })),
          this.__emit('update:pageSize', e),
          t !== n && this.__emit('update:current', t),
          this.__emit('showSizeChange', t, e),
          this.__emit('change', t, e);
      },
      handleChange(e) {
        const { disabled: t } = this.$props;
        let n = e;
        if (this.isValid(n) && !t) {
          const o = st(void 0, this.$data, this.$props);
          return (
            n > o ? (n = o) : n < 1 && (n = 1),
            Ft(this, 'current') ||
              this.setState({ stateCurrent: n, stateCurrentInputValue: n }),
            this.__emit('update:current', n),
            this.__emit('change', n, this.statePageSize),
            n
          );
        }
        return this.stateCurrent;
      },
      prev() {
        this.hasPrev() && this.handleChange(this.stateCurrent - 1);
      },
      next() {
        this.hasNext() && this.handleChange(this.stateCurrent + 1);
      },
      jumpPrev() {
        this.handleChange(this.getJumpPrevPage());
      },
      jumpNext() {
        this.handleChange(this.getJumpNextPage());
      },
      hasPrev() {
        return this.stateCurrent > 1;
      },
      hasNext() {
        return this.stateCurrent < st(void 0, this.$data, this.$props);
      },
      getShowSizeChanger() {
        const {
          showSizeChanger: e,
          total: t,
          totalBoundaryShowSizeChanger: n
        } = this.$props;
        return typeof e < 'u' ? e : t > n;
      },
      runIfEnter(e, t) {
        if (e.key === 'Enter' || e.charCode === 13) {
          for (
            var n = arguments.length, o = new Array(n > 2 ? n - 2 : 0), l = 2;
            l < n;
            l++
          )
            o[l - 2] = arguments[l];
          t(...o);
        }
      },
      runIfEnterPrev(e) {
        this.runIfEnter(e, this.prev);
      },
      runIfEnterNext(e) {
        this.runIfEnter(e, this.next);
      },
      runIfEnterJumpPrev(e) {
        this.runIfEnter(e, this.jumpPrev);
      },
      runIfEnterJumpNext(e) {
        this.runIfEnter(e, this.jumpNext);
      },
      handleGoTO(e) {
        (e.keyCode === St.ENTER || e.type === 'click') &&
          this.handleChange(this.stateCurrentInputValue);
      },
      renderPrev(e) {
        const { itemRender: t } = this.$props,
          n = t({
            page: e,
            type: 'prev',
            originalElement: this.getItemIcon('prevIcon', 'prev page')
          }),
          o = !this.hasPrev();
        return Dt(n) ? Zt(n, o ? { disabled: o } : {}) : n;
      },
      renderNext(e) {
        const { itemRender: t } = this.$props,
          n = t({
            page: e,
            type: 'next',
            originalElement: this.getItemIcon('nextIcon', 'next page')
          }),
          o = !this.hasNext();
        return Dt(n) ? Zt(n, o ? { disabled: o } : {}) : n;
      }
    },
    render() {
      const {
          prefixCls: e,
          disabled: t,
          hideOnSinglePage: n,
          total: o,
          locale: l,
          showQuickJumper: r,
          showLessItems: a,
          showTitle: i,
          showTotal: s,
          simple: f,
          itemRender: c,
          showPrevNextJumpers: u,
          jumpPrevIcon: y,
          jumpNextIcon: x,
          selectComponentClass: b,
          selectPrefixCls: v,
          pageSizeOptions: d
        } = this.$props,
        { stateCurrent: p, statePageSize: $ } = this,
        m = Er(this.$attrs).extraAttrs,
        { class: S } = m,
        O = ds(m, ['class']);
      if (n === !0 && this.total <= $) return null;
      const I = st(void 0, this.$data, this.$props),
        k = [];
      let T = null,
        C = null,
        E = null,
        D = null,
        A = null;
      const F = r && r.goButton,
        U = a ? 1 : 2,
        ee = p - 1 > 0 ? p - 1 : 0,
        Z = p + 1 < I ? p + 1 : I,
        he = this.hasPrev(),
        X = this.hasNext();
      if (f)
        return (
          F &&
            (typeof F == 'boolean'
              ? (A = h(
                  'button',
                  {
                    type: 'button',
                    onClick: this.handleGoTO,
                    onKeyup: this.handleGoTO
                  },
                  [l.jump_to_confirm]
                ))
              : (A = h(
                  'span',
                  { onClick: this.handleGoTO, onKeyup: this.handleGoTO },
                  [F]
                )),
            (A = h(
              'li',
              {
                title: i ? `${l.jump_to}${p}/${I}` : null,
                class: `${e}-simple-pager`
              },
              [A]
            ))),
          h(
            'ul',
            W(
              { class: ie(`${e} ${e}-simple`, { [`${e}-disabled`]: t }, S) },
              O
            ),
            [
              h(
                'li',
                {
                  title: i ? l.prev_page : null,
                  onClick: this.prev,
                  tabindex: he ? 0 : null,
                  onKeypress: this.runIfEnterPrev,
                  class: ie(`${e}-prev`, { [`${e}-disabled`]: !he }),
                  'aria-disabled': !he
                },
                [this.renderPrev(ee)]
              ),
              h(
                'li',
                { title: i ? `${p}/${I}` : null, class: `${e}-simple-pager` },
                [
                  Yn(
                    h(
                      'input',
                      {
                        type: 'text',
                        value: this.stateCurrentInputValue,
                        disabled: t,
                        onKeydown: this.handleKeyDown,
                        onKeyup: this.handleKeyUp,
                        onInput: this.handleKeyUp,
                        onChange: this.handleKeyUp,
                        size: '3'
                      },
                      null
                    ),
                    [[Cl]]
                  ),
                  h('span', { class: `${e}-slash` }, [Qn('／')]),
                  I
                ]
              ),
              h(
                'li',
                {
                  title: i ? l.next_page : null,
                  onClick: this.next,
                  tabindex: X ? 0 : null,
                  onKeypress: this.runIfEnterNext,
                  class: ie(`${e}-next`, { [`${e}-disabled`]: !X }),
                  'aria-disabled': !X
                },
                [this.renderNext(Z)]
              ),
              A
            ]
          )
        );
      if (I <= 3 + U * 2) {
        const H = {
          locale: l,
          rootPrefixCls: e,
          showTitle: i,
          itemRender: c,
          onClick: this.handleChange,
          onKeypress: this.runIfEnter
        };
        I ||
          k.push(
            h(
              Ct,
              W(
                W({}, H),
                {},
                { key: 'noPager', page: 1, class: `${e}-item-disabled` }
              ),
              null
            )
          );
        for (let M = 1; M <= I; M += 1) {
          const j = p === M;
          k.push(h(Ct, W(W({}, H), {}, { key: M, page: M, active: j }), null));
        }
      } else {
        const H = a ? l.prev_3 : l.prev_5,
          M = a ? l.next_3 : l.next_5;
        u &&
          ((T = h(
            'li',
            {
              title: this.showTitle ? H : null,
              key: 'prev',
              onClick: this.jumpPrev,
              tabindex: '0',
              onKeypress: this.runIfEnterJumpPrev,
              class: ie(`${e}-jump-prev`, {
                [`${e}-jump-prev-custom-icon`]: !!y
              })
            },
            [
              c({
                page: this.getJumpPrevPage(),
                type: 'jump-prev',
                originalElement: this.getItemIcon('jumpPrevIcon', 'prev page')
              })
            ]
          )),
          (C = h(
            'li',
            {
              title: this.showTitle ? M : null,
              key: 'next',
              tabindex: '0',
              onClick: this.jumpNext,
              onKeypress: this.runIfEnterJumpNext,
              class: ie(`${e}-jump-next`, {
                [`${e}-jump-next-custom-icon`]: !!x
              })
            },
            [
              c({
                page: this.getJumpNextPage(),
                type: 'jump-next',
                originalElement: this.getItemIcon('jumpNextIcon', 'next page')
              })
            ]
          ))),
          (D = h(
            Ct,
            {
              locale: l,
              last: !0,
              rootPrefixCls: e,
              onClick: this.handleChange,
              onKeypress: this.runIfEnter,
              key: I,
              page: I,
              active: !1,
              showTitle: i,
              itemRender: c
            },
            null
          )),
          (E = h(
            Ct,
            {
              locale: l,
              rootPrefixCls: e,
              onClick: this.handleChange,
              onKeypress: this.runIfEnter,
              key: 1,
              page: 1,
              active: !1,
              showTitle: i,
              itemRender: c
            },
            null
          ));
        let j = Math.max(1, p - U),
          ne = Math.min(p + U, I);
        p - 1 <= U && (ne = 1 + U * 2), I - p <= U && (j = I - U * 2);
        for (let oe = j; oe <= ne; oe += 1) {
          const Ke = p === oe;
          k.push(
            h(
              Ct,
              {
                locale: l,
                rootPrefixCls: e,
                onClick: this.handleChange,
                onKeypress: this.runIfEnter,
                key: oe,
                page: oe,
                active: Ke,
                showTitle: i,
                itemRender: c
              },
              null
            )
          );
        }
        p - 1 >= U * 2 &&
          p !== 1 + 2 &&
          ((k[0] = h(
            Ct,
            {
              locale: l,
              rootPrefixCls: e,
              onClick: this.handleChange,
              onKeypress: this.runIfEnter,
              key: j,
              page: j,
              class: `${e}-item-after-jump-prev`,
              active: !1,
              showTitle: this.showTitle,
              itemRender: c
            },
            null
          )),
          k.unshift(T)),
          I - p >= U * 2 &&
            p !== I - 2 &&
            ((k[k.length - 1] = h(
              Ct,
              {
                locale: l,
                rootPrefixCls: e,
                onClick: this.handleChange,
                onKeypress: this.runIfEnter,
                key: ne,
                page: ne,
                class: `${e}-item-before-jump-next`,
                active: !1,
                showTitle: this.showTitle,
                itemRender: c
              },
              null
            )),
            k.push(C)),
          j !== 1 && k.unshift(E),
          ne !== I && k.push(D);
      }
      let Y = null;
      s &&
        (Y = h('li', { class: `${e}-total-text` }, [
          s(o, [o === 0 ? 0 : (p - 1) * $ + 1, p * $ > o ? o : p * $])
        ]));
      const L = !he || !I,
        Q = !X || !I,
        B = this.buildOptionText || this.$slots.buildOptionText;
      return h(
        'ul',
        W(
          W({ unselectable: 'on', ref: 'paginationNode' }, O),
          {},
          { class: ie({ [`${e}`]: !0, [`${e}-disabled`]: t }, S) }
        ),
        [
          Y,
          h(
            'li',
            {
              title: i ? l.prev_page : null,
              onClick: this.prev,
              tabindex: L ? null : 0,
              onKeypress: this.runIfEnterPrev,
              class: ie(`${e}-prev`, { [`${e}-disabled`]: L }),
              'aria-disabled': L
            },
            [this.renderPrev(ee)]
          ),
          k,
          h(
            'li',
            {
              title: i ? l.next_page : null,
              onClick: this.next,
              tabindex: Q ? null : 0,
              onKeypress: this.runIfEnterNext,
              class: ie(`${e}-next`, { [`${e}-disabled`]: Q }),
              'aria-disabled': Q
            },
            [this.renderNext(Z)]
          ),
          h(
            ss,
            {
              disabled: t,
              locale: l,
              rootPrefixCls: e,
              selectComponentClass: b,
              selectPrefixCls: v,
              changeSize: this.getShowSizeChanger()
                ? this.changePageSize
                : null,
              current: p,
              pageSize: $,
              pageSizeOptions: d,
              buildOptionText: B || null,
              quickGo: this.shouldDisplayQuickJumper()
                ? this.handleChange
                : null,
              goButton: F
            },
            null
          )
        ]
      );
    }
  }),
  vs = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-disabled`]: {
        '&, &:hover': {
          cursor: 'not-allowed',
          [`${t}-item-link`]: {
            color: e.colorTextDisabled,
            cursor: 'not-allowed'
          }
        },
        '&:focus-visible': {
          cursor: 'not-allowed',
          [`${t}-item-link`]: {
            color: e.colorTextDisabled,
            cursor: 'not-allowed'
          }
        }
      },
      [`&${t}-disabled`]: {
        cursor: 'not-allowed',
        [`&${t}-mini`]: {
          [`
          &:hover ${t}-item:not(${t}-item-active),
          &:active ${t}-item:not(${t}-item-active),
          &:hover ${t}-item-link,
          &:active ${t}-item-link
        `]: { backgroundColor: 'transparent' }
        },
        [`${t}-item`]: {
          cursor: 'not-allowed',
          '&:hover, &:active': { backgroundColor: 'transparent' },
          a: {
            color: e.colorTextDisabled,
            backgroundColor: 'transparent',
            border: 'none',
            cursor: 'not-allowed'
          },
          '&-active': {
            borderColor: e.colorBorder,
            backgroundColor: e.paginationItemDisabledBgActive,
            '&:hover, &:active': {
              backgroundColor: e.paginationItemDisabledBgActive
            },
            a: { color: e.paginationItemDisabledColorActive }
          }
        },
        [`${t}-item-link`]: {
          color: e.colorTextDisabled,
          cursor: 'not-allowed',
          '&:hover, &:active': { backgroundColor: 'transparent' },
          [`${t}-simple&`]: {
            backgroundColor: 'transparent',
            '&:hover, &:active': { backgroundColor: 'transparent' }
          }
        },
        [`${t}-simple-pager`]: { color: e.colorTextDisabled },
        [`${t}-jump-prev, ${t}-jump-next`]: {
          [`${t}-item-link-icon`]: { opacity: 0 },
          [`${t}-item-ellipsis`]: { opacity: 1 }
        }
      },
      [`&${t}-simple`]: {
        [`${t}-prev, ${t}-next`]: {
          [`&${t}-disabled ${t}-item-link`]: {
            '&:hover, &:active': { backgroundColor: 'transparent' }
          }
        }
      }
    };
  },
  hs = e => {
    const { componentCls: t } = e;
    return {
      [`&${t}-mini ${t}-total-text, &${t}-mini ${t}-simple-pager`]: {
        height: e.paginationItemSizeSM,
        lineHeight: `${e.paginationItemSizeSM}px`
      },
      [`&${t}-mini ${t}-item`]: {
        minWidth: e.paginationItemSizeSM,
        height: e.paginationItemSizeSM,
        margin: 0,
        lineHeight: `${e.paginationItemSizeSM - 2}px`
      },
      [`&${t}-mini ${t}-item:not(${t}-item-active)`]: {
        backgroundColor: 'transparent',
        borderColor: 'transparent',
        '&:hover': { backgroundColor: e.colorBgTextHover },
        '&:active': { backgroundColor: e.colorBgTextActive }
      },
      [`&${t}-mini ${t}-prev, &${t}-mini ${t}-next`]: {
        minWidth: e.paginationItemSizeSM,
        height: e.paginationItemSizeSM,
        margin: 0,
        lineHeight: `${e.paginationItemSizeSM}px`,
        [`&:hover ${t}-item-link`]: { backgroundColor: e.colorBgTextHover },
        [`&:active ${t}-item-link`]: { backgroundColor: e.colorBgTextActive },
        [`&${t}-disabled:hover ${t}-item-link`]: {
          backgroundColor: 'transparent'
        }
      },
      [`
    &${t}-mini ${t}-prev ${t}-item-link,
    &${t}-mini ${t}-next ${t}-item-link
    `]: {
        backgroundColor: 'transparent',
        borderColor: 'transparent',
        '&::after': {
          height: e.paginationItemSizeSM,
          lineHeight: `${e.paginationItemSizeSM}px`
        }
      },
      [`&${t}-mini ${t}-jump-prev, &${t}-mini ${t}-jump-next`]: {
        height: e.paginationItemSizeSM,
        marginInlineEnd: 0,
        lineHeight: `${e.paginationItemSizeSM}px`
      },
      [`&${t}-mini ${t}-options`]: {
        marginInlineStart: e.paginationMiniOptionsMarginInlineStart,
        '&-size-changer': { top: e.paginationMiniOptionsSizeChangerTop },
        '&-quick-jumper': {
          height: e.paginationItemSizeSM,
          lineHeight: `${e.paginationItemSizeSM}px`,
          input: g(g({}, ra(e)), {
            width: e.paginationMiniQuickJumperInputWidth,
            height: e.controlHeightSM
          })
        }
      }
    };
  },
  gs = e => {
    const { componentCls: t } = e;
    return {
      [`
    &${t}-simple ${t}-prev,
    &${t}-simple ${t}-next
    `]: {
        height: e.paginationItemSizeSM,
        lineHeight: `${e.paginationItemSizeSM}px`,
        verticalAlign: 'top',
        [`${t}-item-link`]: {
          height: e.paginationItemSizeSM,
          backgroundColor: 'transparent',
          border: 0,
          '&:hover': { backgroundColor: e.colorBgTextHover },
          '&:active': { backgroundColor: e.colorBgTextActive },
          '&::after': {
            height: e.paginationItemSizeSM,
            lineHeight: `${e.paginationItemSizeSM}px`
          }
        }
      },
      [`&${t}-simple ${t}-simple-pager`]: {
        display: 'inline-block',
        height: e.paginationItemSizeSM,
        marginInlineEnd: e.marginXS,
        input: {
          boxSizing: 'border-box',
          height: '100%',
          marginInlineEnd: e.marginXS,
          padding: `0 ${e.paginationItemPaddingInline}px`,
          textAlign: 'center',
          backgroundColor: e.paginationItemInputBg,
          border: `${e.lineWidth}px ${e.lineType} ${e.colorBorder}`,
          borderRadius: e.borderRadius,
          outline: 'none',
          transition: `border-color ${e.motionDurationMid}`,
          color: 'inherit',
          '&:hover': { borderColor: e.colorPrimary },
          '&:focus': {
            borderColor: e.colorPrimaryHover,
            boxShadow: `${e.inputOutlineOffset}px 0 ${e.controlOutlineWidth}px ${e.controlOutline}`
          },
          '&[disabled]': {
            color: e.colorTextDisabled,
            backgroundColor: e.colorBgContainerDisabled,
            borderColor: e.colorBorder,
            cursor: 'not-allowed'
          }
        }
      }
    };
  },
  ms = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-jump-prev, ${t}-jump-next`]: {
        outline: 0,
        [`${t}-item-container`]: {
          position: 'relative',
          [`${t}-item-link-icon`]: {
            color: e.colorPrimary,
            fontSize: e.fontSizeSM,
            opacity: 0,
            transition: `all ${e.motionDurationMid}`,
            '&-svg': {
              top: 0,
              insetInlineEnd: 0,
              bottom: 0,
              insetInlineStart: 0,
              margin: 'auto'
            }
          },
          [`${t}-item-ellipsis`]: {
            position: 'absolute',
            top: 0,
            insetInlineEnd: 0,
            bottom: 0,
            insetInlineStart: 0,
            display: 'block',
            margin: 'auto',
            color: e.colorTextDisabled,
            fontFamily: 'Arial, Helvetica, sans-serif',
            letterSpacing: e.paginationEllipsisLetterSpacing,
            textAlign: 'center',
            textIndent: e.paginationEllipsisTextIndent,
            opacity: 1,
            transition: `all ${e.motionDurationMid}`
          }
        },
        '&:hover': {
          [`${t}-item-link-icon`]: { opacity: 1 },
          [`${t}-item-ellipsis`]: { opacity: 0 }
        },
        '&:focus-visible': g(
          {
            [`${t}-item-link-icon`]: { opacity: 1 },
            [`${t}-item-ellipsis`]: { opacity: 0 }
          },
          kt(e)
        )
      },
      [`
    ${t}-prev,
    ${t}-jump-prev,
    ${t}-jump-next
    `]: { marginInlineEnd: e.marginXS },
      [`
    ${t}-prev,
    ${t}-next,
    ${t}-jump-prev,
    ${t}-jump-next
    `]: {
        display: 'inline-block',
        minWidth: e.paginationItemSize,
        height: e.paginationItemSize,
        color: e.colorText,
        fontFamily: e.paginationFontFamily,
        lineHeight: `${e.paginationItemSize}px`,
        textAlign: 'center',
        verticalAlign: 'middle',
        listStyle: 'none',
        borderRadius: e.borderRadius,
        cursor: 'pointer',
        transition: `all ${e.motionDurationMid}`
      },
      [`${t}-prev, ${t}-next`]: {
        fontFamily: 'Arial, Helvetica, sans-serif',
        outline: 0,
        button: { color: e.colorText, cursor: 'pointer', userSelect: 'none' },
        [`${t}-item-link`]: {
          display: 'block',
          width: '100%',
          height: '100%',
          padding: 0,
          fontSize: e.fontSizeSM,
          textAlign: 'center',
          backgroundColor: 'transparent',
          border: `${e.lineWidth}px ${e.lineType} transparent`,
          borderRadius: e.borderRadius,
          outline: 'none',
          transition: `all ${e.motionDurationMid}`
        },
        [`&:focus-visible ${t}-item-link`]: g({}, kt(e)),
        [`&:hover ${t}-item-link`]: { backgroundColor: e.colorBgTextHover },
        [`&:active ${t}-item-link`]: { backgroundColor: e.colorBgTextActive },
        [`&${t}-disabled:hover`]: {
          [`${t}-item-link`]: { backgroundColor: 'transparent' }
        }
      },
      [`${t}-slash`]: {
        marginInlineEnd: e.paginationSlashMarginInlineEnd,
        marginInlineStart: e.paginationSlashMarginInlineStart
      },
      [`${t}-options`]: {
        display: 'inline-block',
        marginInlineStart: e.margin,
        verticalAlign: 'middle',
        '&-size-changer.-select': { display: 'inline-block', width: 'auto' },
        '&-quick-jumper': {
          display: 'inline-block',
          height: e.controlHeight,
          marginInlineStart: e.marginXS,
          lineHeight: `${e.controlHeight}px`,
          verticalAlign: 'top',
          input: g(g({}, aa(e)), {
            width: e.controlHeightLG * 1.25,
            height: e.controlHeight,
            boxSizing: 'border-box',
            margin: 0,
            marginInlineStart: e.marginXS,
            marginInlineEnd: e.marginXS
          })
        }
      }
    };
  },
  ys = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-item`]: g(
        g(
          {
            display: 'inline-block',
            minWidth: e.paginationItemSize,
            height: e.paginationItemSize,
            marginInlineEnd: e.marginXS,
            fontFamily: e.paginationFontFamily,
            lineHeight: `${e.paginationItemSize - 2}px`,
            textAlign: 'center',
            verticalAlign: 'middle',
            listStyle: 'none',
            backgroundColor: 'transparent',
            border: `${e.lineWidth}px ${e.lineType} transparent`,
            borderRadius: e.borderRadius,
            outline: 0,
            cursor: 'pointer',
            userSelect: 'none',
            a: {
              display: 'block',
              padding: `0 ${e.paginationItemPaddingInline}px`,
              color: e.colorText,
              transition: 'none',
              '&:hover': { textDecoration: 'none' }
            },
            [`&:not(${t}-item-active)`]: {
              '&:hover': {
                transition: `all ${e.motionDurationMid}`,
                backgroundColor: e.colorBgTextHover
              },
              '&:active': { backgroundColor: e.colorBgTextActive }
            }
          },
          wn(e)
        ),
        {
          '&-active': {
            fontWeight: e.paginationFontWeightActive,
            backgroundColor: e.paginationItemBgActive,
            borderColor: e.colorPrimary,
            a: { color: e.colorPrimary },
            '&:hover': { borderColor: e.colorPrimaryHover },
            '&:hover a': { color: e.colorPrimaryHover }
          }
        }
      )
    };
  },
  bs = e => {
    const { componentCls: t } = e;
    return {
      [t]: g(
        g(
          g(
            g(
              g(
                g(
                  g(g({}, et(e)), {
                    'ul, ol': { margin: 0, padding: 0, listStyle: 'none' },
                    '&::after': {
                      display: 'block',
                      clear: 'both',
                      height: 0,
                      overflow: 'hidden',
                      visibility: 'hidden',
                      content: '""'
                    },
                    [`${t}-total-text`]: {
                      display: 'inline-block',
                      height: e.paginationItemSize,
                      marginInlineEnd: e.marginXS,
                      lineHeight: `${e.paginationItemSize - 2}px`,
                      verticalAlign: 'middle'
                    }
                  }),
                  ys(e)
                ),
                ms(e)
              ),
              gs(e)
            ),
            hs(e)
          ),
          vs(e)
        ),
        {
          [`@media only screen and (max-width: ${e.screenLG}px)`]: {
            [`${t}-item`]: {
              '&-after-jump-prev, &-before-jump-next': { display: 'none' }
            }
          },
          [`@media only screen and (max-width: ${e.screenSM}px)`]: {
            [`${t}-options`]: { display: 'none' }
          }
        }
      ),
      [`&${e.componentCls}-rtl`]: { direction: 'rtl' }
    };
  },
  xs = e => {
    const { componentCls: t } = e;
    return {
      [`${t}${t}-disabled`]: {
        '&, &:hover': { [`${t}-item-link`]: { borderColor: e.colorBorder } },
        '&:focus-visible': {
          [`${t}-item-link`]: { borderColor: e.colorBorder }
        },
        [`${t}-item, ${t}-item-link`]: {
          backgroundColor: e.colorBgContainerDisabled,
          borderColor: e.colorBorder,
          [`&:hover:not(${t}-item-active)`]: {
            backgroundColor: e.colorBgContainerDisabled,
            borderColor: e.colorBorder,
            a: { color: e.colorTextDisabled }
          },
          [`&${t}-item-active`]: {
            backgroundColor: e.paginationItemDisabledBgActive
          }
        },
        [`${t}-prev, ${t}-next`]: {
          '&:hover button': {
            backgroundColor: e.colorBgContainerDisabled,
            borderColor: e.colorBorder,
            color: e.colorTextDisabled
          },
          [`${t}-item-link`]: {
            backgroundColor: e.colorBgContainerDisabled,
            borderColor: e.colorBorder
          }
        }
      },
      [t]: {
        [`${t}-prev, ${t}-next`]: {
          '&:hover button': {
            borderColor: e.colorPrimaryHover,
            backgroundColor: e.paginationItemBg
          },
          [`${t}-item-link`]: {
            backgroundColor: e.paginationItemLinkBg,
            borderColor: e.colorBorder
          },
          [`&:hover ${t}-item-link`]: {
            borderColor: e.colorPrimary,
            backgroundColor: e.paginationItemBg,
            color: e.colorPrimary
          },
          [`&${t}-disabled`]: {
            [`${t}-item-link`]: {
              borderColor: e.colorBorder,
              color: e.colorTextDisabled
            }
          }
        },
        [`${t}-item`]: {
          backgroundColor: e.paginationItemBg,
          border: `${e.lineWidth}px ${e.lineType} ${e.colorBorder}`,
          [`&:hover:not(${t}-item-active)`]: {
            borderColor: e.colorPrimary,
            backgroundColor: e.paginationItemBg,
            a: { color: e.colorPrimary }
          },
          '&-active': { borderColor: e.colorPrimary }
        }
      }
    };
  },
  Cs = Nt('Pagination', e => {
    const t = Rt(
      e,
      {
        paginationItemSize: e.controlHeight,
        paginationFontFamily: e.fontFamily,
        paginationItemBg: e.colorBgContainer,
        paginationItemBgActive: e.colorBgContainer,
        paginationFontWeightActive: e.fontWeightStrong,
        paginationItemSizeSM: e.controlHeightSM,
        paginationItemInputBg: e.colorBgContainer,
        paginationMiniOptionsSizeChangerTop: 0,
        paginationItemDisabledBgActive: e.controlItemBgActiveDisabled,
        paginationItemDisabledColorActive: e.colorTextDisabled,
        paginationItemLinkBg: e.colorBgContainer,
        inputOutlineOffset: '0 0',
        paginationMiniOptionsMarginInlineStart: e.marginXXS / 2,
        paginationMiniQuickJumperInputWidth: e.controlHeightLG * 1.1,
        paginationItemPaddingInline: e.marginXXS * 1.5,
        paginationEllipsisLetterSpacing: e.marginXXS / 2,
        paginationSlashMarginInlineStart: e.marginXXS,
        paginationSlashMarginInlineEnd: e.marginSM,
        paginationEllipsisTextIndent: '0.13em'
      },
      la(e)
    );
    return [bs(t), e.wireframe && xs(t)];
  });
var Ss =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const $s = () => ({
    total: Number,
    defaultCurrent: Number,
    disabled: fe(),
    current: Number,
    defaultPageSize: Number,
    pageSize: Number,
    hideOnSinglePage: fe(),
    showSizeChanger: fe(),
    pageSizeOptions: Le(),
    buildOptionText: ye(),
    showQuickJumper: Ge([Boolean, Object]),
    showTotal: ye(),
    size: Ue(),
    simple: fe(),
    locale: Object,
    prefixCls: String,
    selectPrefixCls: String,
    totalBoundaryShowSizeChanger: Number,
    selectComponentClass: String,
    itemRender: ye(),
    role: String,
    responsive: Boolean,
    showLessItems: fe(),
    onChange: ye(),
    onShowSizeChange: ye(),
    'onUpdate:current': ye(),
    'onUpdate:pageSize': ye()
  }),
  ws = ve({
    compatConfig: { MODE: 3 },
    name: 'APagination',
    inheritAttrs: !1,
    props: $s(),
    setup(e, t) {
      let { slots: n, attrs: o } = t;
      const { prefixCls: l, configProvider: r, direction: a, size: i } = Ye(
          'pagination',
          e
        ),
        [s, f] = Cs(l),
        c = w(() => r.getPrefixCls('select', e.selectPrefixCls)),
        u = wl(),
        [y] = yl('Pagination', Tr, ze(e, 'locale')),
        x = b => {
          const v = h('span', { class: `${b}-item-ellipsis` }, [Qn('•••')]),
            d = h(
              'button',
              { class: `${b}-item-link`, type: 'button', tabindex: -1 },
              [a.value === 'rtl' ? h(Qt, null, null) : h(Oo, null, null)]
            ),
            p = h(
              'button',
              { class: `${b}-item-link`, type: 'button', tabindex: -1 },
              [a.value === 'rtl' ? h(Oo, null, null) : h(Qt, null, null)]
            ),
            $ = h('a', { rel: 'nofollow', class: `${b}-item-link` }, [
              h('div', { class: `${b}-item-container` }, [
                a.value === 'rtl'
                  ? h(Lo, { class: `${b}-item-link-icon` }, null)
                  : h(Mo, { class: `${b}-item-link-icon` }, null),
                v
              ])
            ]),
            m = h('a', { rel: 'nofollow', class: `${b}-item-link` }, [
              h('div', { class: `${b}-item-container` }, [
                a.value === 'rtl'
                  ? h(Mo, { class: `${b}-item-link-icon` }, null)
                  : h(Lo, { class: `${b}-item-link-icon` }, null),
                v
              ])
            ]);
          return { prevIcon: d, nextIcon: p, jumpPrevIcon: $, jumpNextIcon: m };
        };
      return () => {
        var b;
        const {
            itemRender: v = n.itemRender,
            buildOptionText: d = n.buildOptionText,
            selectComponentClass: p,
            responsive: $
          } = e,
          m = Ss(e, [
            'itemRender',
            'buildOptionText',
            'selectComponentClass',
            'responsive'
          ]),
          S =
            i.value === 'small' ||
            !!(
              !((b = u.value) === null || b === void 0) &&
              b.xs &&
              !i.value &&
              $
            ),
          O = g(
            g(
              g(g(g({}, m), x(l.value)), {
                prefixCls: l.value,
                selectPrefixCls: c.value,
                selectComponentClass: p || (S ? as : is),
                locale: y.value,
                buildOptionText: d
              }),
              o
            ),
            {
              class: ie(
                {
                  [`${l.value}-mini`]: S,
                  [`${l.value}-rtl`]: a.value === 'rtl'
                },
                o.class,
                f.value
              ),
              itemRender: v
            }
          );
        return s(h(ps, O, null));
      };
    }
  }),
  Os = Kr(ws),
  Vl = Symbol('TableContextProps'),
  Ps = e => {
    Je(Vl, e);
  },
  it = () => qe(Vl, {}),
  ks = 'RC_TABLE_KEY';
function Xl(e) {
  return e == null ? [] : Array.isArray(e) ? e : [e];
}
function Gl(e, t) {
  if (!t && typeof t != 'number') return e;
  const n = Xl(t);
  let o = e;
  for (let l = 0; l < n.length; l += 1) {
    if (!o) return null;
    const r = n[l];
    o = o[r];
  }
  return o;
}
function an(e) {
  const t = [],
    n = {};
  return (
    e.forEach(o => {
      const { key: l, dataIndex: r } = o || {};
      let a = l || Xl(r).join('-') || ks;
      for (; n[a]; ) a = `${a}_next`;
      (n[a] = !0), t.push(a);
    }),
    t
  );
}
function Is() {
  const e = {};
  function t(r, a) {
    a &&
      Object.keys(a).forEach(i => {
        const s = a[i];
        s && typeof s == 'object'
          ? ((r[i] = r[i] || {}), t(r[i], s))
          : (r[i] = s);
      });
  }
  for (var n = arguments.length, o = new Array(n), l = 0; l < n; l++)
    o[l] = arguments[l];
  return (
    o.forEach(r => {
      t(e, r);
    }),
    e
  );
}
function Dn(e) {
  return e != null;
}
const Ul = Symbol('SlotsContextProps'),
  Es = e => {
    Je(Ul, e);
  },
  go = () =>
    qe(
      Ul,
      w(() => ({}))
    ),
  ql = Symbol('ContextProps'),
  Ts = e => {
    Je(ql, e);
  },
  Ks = () => qe(ql, { onResizeColumn: () => {} });
globalThis && globalThis.__rest;
const Kt = 'RC_TABLE_INTERNAL_COL_DEFINE',
  Jl = Symbol('HoverContextProps'),
  Ds = e => {
    Je(Jl, e);
  },
  Ns = () => qe(Jl, { startRow: ae(-1), endRow: ae(-1), onHover() {} }),
  Nn = ae(!1),
  Rs = () => {
    at(() => {
      Nn.value = Nn.value || ia('position', 'sticky');
    });
  },
  Bs = () => Nn;
var _s =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
function As(e, t, n, o) {
  const l = e + t - 1;
  return e <= o && l >= n;
}
function Fs(e) {
  return e && typeof e == 'object' && !Array.isArray(e) && !Gt(e);
}
const sn = ve({
  name: 'Cell',
  props: [
    'prefixCls',
    'record',
    'index',
    'renderIndex',
    'dataIndex',
    'customRender',
    'component',
    'colSpan',
    'rowSpan',
    'fixLeft',
    'fixRight',
    'firstFixLeft',
    'lastFixLeft',
    'firstFixRight',
    'lastFixRight',
    'appendNode',
    'additionalProps',
    'ellipsis',
    'align',
    'rowType',
    'isSticky',
    'column',
    'cellType',
    'transformCellText'
  ],
  setup(e, t) {
    let { slots: n } = t;
    const o = go(),
      { onHover: l, startRow: r, endRow: a } = Ns(),
      i = w(() => {
        var b, v, d, p;
        return (d =
          (b = e.colSpan) !== null && b !== void 0
            ? b
            : (v = e.additionalProps) === null || v === void 0
            ? void 0
            : v.colSpan) !== null && d !== void 0
          ? d
          : (p = e.additionalProps) === null || p === void 0
          ? void 0
          : p.colspan;
      }),
      s = w(() => {
        var b, v, d, p;
        return (d =
          (b = e.rowSpan) !== null && b !== void 0
            ? b
            : (v = e.additionalProps) === null || v === void 0
            ? void 0
            : v.rowSpan) !== null && d !== void 0
          ? d
          : (p = e.additionalProps) === null || p === void 0
          ? void 0
          : p.rowspan;
      }),
      f = Qe(() => {
        const { index: b } = e;
        return As(b, s.value || 1, r.value, a.value);
      }),
      c = Bs(),
      u = (b, v) => {
        var d;
        const { record: p, index: $, additionalProps: m } = e;
        p && l($, $ + v - 1),
          (d = m == null ? void 0 : m.onMouseenter) === null ||
            d === void 0 ||
            d.call(m, b);
      },
      y = b => {
        var v;
        const { record: d, additionalProps: p } = e;
        d && l(-1, -1),
          (v = p == null ? void 0 : p.onMouseleave) === null ||
            v === void 0 ||
            v.call(p, b);
      },
      x = b => {
        const v = Mt(b)[0];
        return Gt(v)
          ? v.type === Fr
            ? v.children
            : Array.isArray(v.children)
            ? x(v.children)
            : void 0
          : v;
      };
    return () => {
      var b, v, d, p, $, m;
      const {
          prefixCls: S,
          record: O,
          index: I,
          renderIndex: k,
          dataIndex: T,
          customRender: C,
          component: E = 'td',
          fixLeft: D,
          fixRight: A,
          firstFixLeft: F,
          lastFixLeft: U,
          firstFixRight: ee,
          lastFixRight: Z,
          appendNode: he = (b = n.appendNode) === null || b === void 0
            ? void 0
            : b.call(n),
          additionalProps: X = {},
          ellipsis: Y,
          align: L,
          rowType: Q,
          isSticky: B,
          column: H = {},
          cellType: M
        } = e,
        j = `${S}-cell`;
      let ne, oe;
      const Ke = (v = n.default) === null || v === void 0 ? void 0 : v.call(n);
      if (Dn(Ke) || M === 'header') oe = Ke;
      else {
        const ke = Gl(O, T);
        if (((oe = ke), C)) {
          const K = C({
            text: ke,
            value: ke,
            record: O,
            index: I,
            renderIndex: k,
            column: H.__originColumn__
          });
          Fs(K)
            ? (Me(
                !1,
                '`columns.customRender` return cell props is deprecated with perf issue, please use `customCell` instead.'
              ),
              (oe = K.children),
              (ne = K.props))
            : (oe = K);
        }
        if (
          !(Kt in H) &&
          M === 'body' &&
          o.value.bodyCell &&
          !(!((d = H.slots) === null || d === void 0) && d.customRender)
        ) {
          const K = Zn(
            o.value,
            'bodyCell',
            {
              text: ke,
              value: ke,
              record: O,
              index: I,
              column: H.__originColumn__
            },
            () => {
              const P = oe === void 0 ? ke : oe;
              return [
                (typeof P == 'object' && Dt(P)) || typeof P != 'object'
                  ? P
                  : null
              ];
            }
          );
          oe = Un(K);
        }
        e.transformCellText &&
          (oe = e.transformCellText({
            text: oe,
            record: O,
            index: I,
            column: H.__originColumn__
          }));
      }
      typeof oe == 'object' && !Array.isArray(oe) && !Gt(oe) && (oe = null),
        Y && (U || ee) && (oe = h('span', { class: `${j}-content` }, [oe])),
        Array.isArray(oe) && oe.length === 1 && (oe = oe[0]);
      const Ie = ne || {},
        { colSpan: De, rowSpan: _e, style: je, class: Ve } = Ie,
        Ne = _s(Ie, ['colSpan', 'rowSpan', 'style', 'class']),
        Ee =
          (p = De !== void 0 ? De : i.value) !== null && p !== void 0 ? p : 1,
        G = ($ = _e !== void 0 ? _e : s.value) !== null && $ !== void 0 ? $ : 1;
      if (Ee === 0 || G === 0) return null;
      const ce = {},
        J = typeof D == 'number' && c.value,
        se = typeof A == 'number' && c.value;
      J && ((ce.position = 'sticky'), (ce.left = `${D}px`)),
        se && ((ce.position = 'sticky'), (ce.right = `${A}px`));
      const ue = {};
      L && (ue.textAlign = L);
      let Pe;
      const de = Y === !0 ? { showTitle: !0 } : Y;
      de &&
        (de.showTitle || Q === 'header') &&
        (typeof oe == 'string' || typeof oe == 'number'
          ? (Pe = oe.toString())
          : Gt(oe) && (Pe = x([oe])));
      const xe = g(g(g({ title: Pe }, Ne), X), {
        colSpan: Ee !== 1 ? Ee : null,
        rowSpan: G !== 1 ? G : null,
        class: ie(
          j,
          {
            [`${j}-fix-left`]: J && c.value,
            [`${j}-fix-left-first`]: F && c.value,
            [`${j}-fix-left-last`]: U && c.value,
            [`${j}-fix-right`]: se && c.value,
            [`${j}-fix-right-first`]: ee && c.value,
            [`${j}-fix-right-last`]: Z && c.value,
            [`${j}-ellipsis`]: Y,
            [`${j}-with-append`]: he,
            [`${j}-fix-sticky`]: (J || se) && B && c.value,
            [`${j}-row-hover`]: !ne && f.value
          },
          X.class,
          Ve
        ),
        onMouseenter: ke => {
          u(ke, G);
        },
        onMouseleave: y,
        style: [X.style, ue, ce, je]
      });
      return h(E, xe, {
        default: () => [
          he,
          oe,
          (m = n.dragHandle) === null || m === void 0 ? void 0 : m.call(n)
        ]
      });
    };
  }
});
function mo(e, t, n, o, l) {
  const r = n[e] || {},
    a = n[t] || {};
  let i, s;
  r.fixed === 'left'
    ? (i = o.left[e])
    : a.fixed === 'right' && (s = o.right[t]);
  let f = !1,
    c = !1,
    u = !1,
    y = !1;
  const x = n[t + 1],
    b = n[e - 1];
  return (
    l === 'rtl'
      ? i !== void 0
        ? (y = !(b && b.fixed === 'left'))
        : s !== void 0 && (u = !(x && x.fixed === 'right'))
      : i !== void 0
      ? (f = !(x && x.fixed === 'left'))
      : s !== void 0 && (c = !(b && b.fixed === 'right')),
    {
      fixLeft: i,
      fixRight: s,
      lastFixLeft: f,
      firstFixRight: c,
      lastFixRight: u,
      firstFixLeft: y,
      isSticky: o.isSticky
    }
  );
}
const qo = {
    mouse: { start: 'mousedown', move: 'mousemove', stop: 'mouseup' },
    touch: { start: 'touchstart', move: 'touchmove', stop: 'touchend' }
  },
  Jo = 50,
  zs = ve({
    compatConfig: { MODE: 3 },
    name: 'DragHandle',
    props: {
      prefixCls: String,
      width: { type: Number, required: !0 },
      minWidth: { type: Number, default: Jo },
      maxWidth: { type: Number, default: 1 / 0 },
      column: { type: Object, default: void 0 }
    },
    setup(e) {
      let t = 0,
        n = { remove: () => {} },
        o = { remove: () => {} };
      const l = () => {
        n.remove(), o.remove();
      };
      qn(() => {
        l();
      }),
        Re(() => {
          We(
            !isNaN(e.width),
            'Table',
            'width must be a number when use resizable'
          );
        });
      const { onResizeColumn: r } = Ks(),
        a = w(() =>
          typeof e.minWidth == 'number' && !isNaN(e.minWidth) ? e.minWidth : Jo
        ),
        i = w(() =>
          typeof e.maxWidth == 'number' && !isNaN(e.maxWidth)
            ? e.maxWidth
            : 1 / 0
        ),
        s = bl();
      let f = 0;
      const c = ae(!1);
      let u;
      const y = m => {
          let S = 0;
          m.touches
            ? m.touches.length
              ? (S = m.touches[0].pageX)
              : (S = m.changedTouches[0].pageX)
            : (S = m.pageX);
          const O = t - S;
          let I = Math.max(f - O, a.value);
          (I = Math.min(I, i.value)),
            wt.cancel(u),
            (u = wt(() => {
              r(I, e.column.__originColumn__);
            }));
        },
        x = m => {
          y(m);
        },
        b = m => {
          (c.value = !1), y(m), l();
        },
        v = (m, S) => {
          (c.value = !0),
            l(),
            (f = s.vnode.el.parentNode.getBoundingClientRect().width),
            !(m instanceof MouseEvent && m.which !== 1) &&
              (m.stopPropagation && m.stopPropagation(),
              (t = m.touches ? m.touches[0].pageX : m.pageX),
              (n = $t(document.documentElement, S.move, x)),
              (o = $t(document.documentElement, S.stop, b)));
        },
        d = m => {
          m.stopPropagation(), m.preventDefault(), v(m, qo.mouse);
        },
        p = m => {
          m.stopPropagation(), m.preventDefault(), v(m, qo.touch);
        },
        $ = m => {
          m.stopPropagation(), m.preventDefault();
        };
      return () => {
        const { prefixCls: m } = e,
          S = { [sa ? 'onTouchstartPassive' : 'onTouchstart']: O => p(O) };
        return h(
          'div',
          W(
            W(
              {
                class: `${m}-resize-handle ${c.value ? 'dragging' : ''}`,
                onMousedown: d
              },
              S
            ),
            {},
            { onClick: $ }
          ),
          [h('div', { class: `${m}-resize-handle-line` }, null)]
        );
      };
    }
  }),
  Ms = ve({
    name: 'HeaderRow',
    props: [
      'cells',
      'stickyOffsets',
      'flattenColumns',
      'rowComponent',
      'cellComponent',
      'index',
      'customHeaderRow'
    ],
    setup(e) {
      const t = it();
      return () => {
        const { prefixCls: n, direction: o } = t,
          {
            cells: l,
            stickyOffsets: r,
            flattenColumns: a,
            rowComponent: i,
            cellComponent: s,
            customHeaderRow: f,
            index: c
          } = e;
        let u;
        f &&
          (u = f(
            l.map(x => x.column),
            c
          ));
        const y = an(l.map(x => x.column));
        return h(i, u, {
          default: () => [
            l.map((x, b) => {
              const { column: v } = x,
                d = mo(x.colStart, x.colEnd, a, r, o);
              let p;
              v && v.customHeaderCell && (p = x.column.customHeaderCell(v));
              const $ = v;
              return h(
                sn,
                W(
                  W(
                    W({}, x),
                    {},
                    {
                      cellType: 'header',
                      ellipsis: v.ellipsis,
                      align: v.align,
                      component: s,
                      prefixCls: n,
                      key: y[b]
                    },
                    d
                  ),
                  {},
                  { additionalProps: p, rowType: 'header', column: v }
                ),
                {
                  default: () => v.title,
                  dragHandle: () =>
                    $.resizable
                      ? h(
                          zs,
                          {
                            prefixCls: n,
                            width: $.width,
                            minWidth: $.minWidth,
                            maxWidth: $.maxWidth,
                            column: $
                          },
                          null
                        )
                      : null
                }
              );
            })
          ]
        });
      };
    }
  });
function js(e) {
  const t = [];
  function n(l, r) {
    let a = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : 0;
    t[a] = t[a] || [];
    let i = r;
    return l.filter(Boolean).map(f => {
      const c = {
        key: f.key,
        class: ie(f.className, f.class),
        column: f,
        colStart: i
      };
      let u = 1;
      const y = f.children;
      return (
        y &&
          y.length > 0 &&
          ((u = n(y, i, a + 1).reduce((x, b) => x + b, 0)),
          (c.hasSubColumns = !0)),
        'colSpan' in f && ({ colSpan: u } = f),
        'rowSpan' in f && (c.rowSpan = f.rowSpan),
        (c.colSpan = u),
        (c.colEnd = c.colStart + u - 1),
        t[a].push(c),
        (i += u),
        u
      );
    });
  }
  n(e, 0);
  const o = t.length;
  for (let l = 0; l < o; l += 1)
    t[l].forEach(r => {
      !('rowSpan' in r) && !r.hasSubColumns && (r.rowSpan = o - l);
    });
  return t;
}
const Yo = ve({
    name: 'TableHeader',
    inheritAttrs: !1,
    props: ['columns', 'flattenColumns', 'stickyOffsets', 'customHeaderRow'],
    setup(e) {
      const t = it(),
        n = w(() => js(e.columns));
      return () => {
        const { prefixCls: o, getComponent: l } = t,
          { stickyOffsets: r, flattenColumns: a, customHeaderRow: i } = e,
          s = l(['header', 'wrapper'], 'thead'),
          f = l(['header', 'row'], 'tr'),
          c = l(['header', 'cell'], 'th');
        return h(
          s,
          { class: `${o}-thead` },
          {
            default: () => [
              n.value.map((u, y) =>
                h(
                  Ms,
                  {
                    key: y,
                    flattenColumns: a,
                    cells: u,
                    stickyOffsets: r,
                    rowComponent: f,
                    cellComponent: c,
                    customHeaderRow: i,
                    index: y
                  },
                  null
                )
              )
            ]
          }
        );
      };
    }
  }),
  Yl = Symbol('ExpandedRowProps'),
  Ls = e => {
    Je(Yl, e);
  },
  Hs = () => qe(Yl, {}),
  Ql = ve({
    name: 'ExpandedRow',
    inheritAttrs: !1,
    props: [
      'prefixCls',
      'component',
      'cellComponent',
      'expanded',
      'colSpan',
      'isEmpty'
    ],
    setup(e, t) {
      let { slots: n, attrs: o } = t;
      const l = it(),
        r = Hs(),
        { fixHeader: a, fixColumn: i, componentWidth: s, horizonScroll: f } = r;
      return () => {
        const {
          prefixCls: c,
          component: u,
          cellComponent: y,
          expanded: x,
          colSpan: b,
          isEmpty: v
        } = e;
        return h(
          u,
          { class: o.class, style: { display: x ? null : 'none' } },
          {
            default: () => [
              h(
                sn,
                { component: y, prefixCls: c, colSpan: b },
                {
                  default: () => {
                    var d;
                    let p =
                      (d = n.default) === null || d === void 0
                        ? void 0
                        : d.call(n);
                    return (
                      (v ? f.value : i.value) &&
                        (p = h(
                          'div',
                          {
                            style: {
                              width: `${s.value -
                                (a.value ? l.scrollbarSize : 0)}px`,
                              position: 'sticky',
                              left: 0,
                              overflow: 'hidden'
                            },
                            class: `${c}-expanded-row-fixed`
                          },
                          [p]
                        )),
                      p
                    );
                  }
                }
              )
            ]
          }
        );
      };
    }
  }),
  Ws = ve({
    name: 'MeasureCell',
    props: ['columnKey'],
    setup(e, t) {
      let { emit: n } = t;
      const o = pe();
      return (
        at(() => {
          o.value && n('columnResize', e.columnKey, o.value.offsetWidth);
        }),
        () =>
          h(
            Sl,
            {
              onResize: l => {
                let { offsetWidth: r } = l;
                n('columnResize', e.columnKey, r);
              }
            },
            {
              default: () => [
                h(
                  'td',
                  { ref: o, style: { padding: 0, border: 0, height: 0 } },
                  [
                    h('div', { style: { height: 0, overflow: 'hidden' } }, [
                      Qn(' ')
                    ])
                  ]
                )
              ]
            }
          )
      );
    }
  }),
  Zl = Symbol('BodyContextProps'),
  Vs = e => {
    Je(Zl, e);
  },
  er = () => qe(Zl, {}),
  Xs = ve({
    name: 'BodyRow',
    inheritAttrs: !1,
    props: [
      'record',
      'index',
      'renderIndex',
      'recordKey',
      'expandedKeys',
      'rowComponent',
      'cellComponent',
      'customRow',
      'rowExpandable',
      'indent',
      'rowKey',
      'getRowKey',
      'childrenColumnName'
    ],
    setup(e, t) {
      let { attrs: n } = t;
      const o = it(),
        l = er(),
        r = ae(!1),
        a = w(() => e.expandedKeys && e.expandedKeys.has(e.recordKey));
      Re(() => {
        a.value && (r.value = !0);
      });
      const i = w(
          () =>
            l.expandableType === 'row' &&
            (!e.rowExpandable || e.rowExpandable(e.record))
        ),
        s = w(() => l.expandableType === 'nest'),
        f = w(
          () =>
            e.childrenColumnName && e.record && e.record[e.childrenColumnName]
        ),
        c = w(() => i.value || s.value),
        u = (d, p) => {
          l.onTriggerExpand(d, p);
        },
        y = w(() => {
          var d;
          return (
            ((d = e.customRow) === null || d === void 0
              ? void 0
              : d.call(e, e.record, e.index)) || {}
          );
        }),
        x = function(d) {
          var p, $;
          l.expandRowByClick && c.value && u(e.record, d);
          for (
            var m = arguments.length, S = new Array(m > 1 ? m - 1 : 0), O = 1;
            O < m;
            O++
          )
            S[O - 1] = arguments[O];
          ($ = (p = y.value) === null || p === void 0 ? void 0 : p.onClick) ===
            null ||
            $ === void 0 ||
            $.call(p, d, ...S);
        },
        b = w(() => {
          const { record: d, index: p, indent: $ } = e,
            { rowClassName: m } = l;
          return typeof m == 'string'
            ? m
            : typeof m == 'function'
            ? m(d, p, $)
            : '';
        }),
        v = w(() => an(l.flattenColumns));
      return () => {
        const { class: d, style: p } = n,
          {
            record: $,
            index: m,
            rowKey: S,
            indent: O = 0,
            rowComponent: I,
            cellComponent: k
          } = e,
          { prefixCls: T, fixedInfoList: C, transformCellText: E } = o,
          {
            flattenColumns: D,
            expandedRowClassName: A,
            indentSize: F,
            expandIcon: U,
            expandedRowRender: ee,
            expandIconColumnIndex: Z
          } = l,
          he = h(
            I,
            W(
              W({}, y.value),
              {},
              {
                'data-row-key': S,
                class: ie(
                  d,
                  `${T}-row`,
                  `${T}-row-level-${O}`,
                  b.value,
                  y.value.class
                ),
                style: [p, y.value.style],
                onClick: x
              }
            ),
            {
              default: () => [
                D.map((Y, L) => {
                  const { customRender: Q, dataIndex: B, className: H } = Y,
                    M = v[L],
                    j = C[L];
                  let ne;
                  Y.customCell && (ne = Y.customCell($, m, Y));
                  const oe =
                    L === (Z || 0) && s.value
                      ? h(mt, null, [
                          h(
                            'span',
                            {
                              style: { paddingLeft: `${F * O}px` },
                              class: `${T}-row-indent indent-level-${O}`
                            },
                            null
                          ),
                          U({
                            prefixCls: T,
                            expanded: a.value,
                            expandable: f.value,
                            record: $,
                            onExpand: u
                          })
                        ])
                      : null;
                  return h(
                    sn,
                    W(
                      W(
                        {
                          cellType: 'body',
                          class: H,
                          ellipsis: Y.ellipsis,
                          align: Y.align,
                          component: k,
                          prefixCls: T,
                          key: M,
                          record: $,
                          index: m,
                          renderIndex: e.renderIndex,
                          dataIndex: B,
                          customRender: Q
                        },
                        j
                      ),
                      {},
                      {
                        additionalProps: ne,
                        column: Y,
                        transformCellText: E,
                        appendNode: oe
                      }
                    ),
                    null
                  );
                })
              ]
            }
          );
        let X;
        if (i.value && (r.value || a.value)) {
          const Y = ee({
              record: $,
              index: m,
              indent: O + 1,
              expanded: a.value
            }),
            L = A && A($, m, O);
          X = h(
            Ql,
            {
              expanded: a.value,
              class: ie(
                `${T}-expanded-row`,
                `${T}-expanded-row-level-${O + 1}`,
                L
              ),
              prefixCls: T,
              component: I,
              cellComponent: k,
              colSpan: D.length,
              isEmpty: !1
            },
            { default: () => [Y] }
          );
        }
        return h(mt, null, [he, X]);
      };
    }
  });
function tr(e, t, n, o, l, r) {
  const a = [];
  a.push({ record: e, indent: t, index: r });
  const i = l(e),
    s = o == null ? void 0 : o.has(i);
  if (e && Array.isArray(e[n]) && s)
    for (let f = 0; f < e[n].length; f += 1) {
      const c = tr(e[n][f], t + 1, n, o, l, f);
      a.push(...c);
    }
  return a;
}
function Gs(e, t, n, o) {
  return w(() => {
    const r = t.value,
      a = n.value,
      i = e.value;
    if (a != null && a.size) {
      const s = [];
      for (let f = 0; f < (i == null ? void 0 : i.length); f += 1) {
        const c = i[f];
        s.push(...tr(c, 0, r, a, o.value, f));
      }
      return s;
    }
    return i == null
      ? void 0
      : i.map((s, f) => ({ record: s, indent: 0, index: f }));
  });
}
const nr = Symbol('ResizeContextProps'),
  Us = e => {
    Je(nr, e);
  },
  qs = () => qe(nr, { onColumnResize: () => {} }),
  Js = ve({
    name: 'TableBody',
    props: [
      'data',
      'getRowKey',
      'measureColumnWidth',
      'expandedKeys',
      'customRow',
      'rowExpandable',
      'childrenColumnName'
    ],
    setup(e, t) {
      let { slots: n } = t;
      const o = qs(),
        l = it(),
        r = er(),
        a = Gs(
          ze(e, 'data'),
          ze(e, 'childrenColumnName'),
          ze(e, 'expandedKeys'),
          ze(e, 'getRowKey')
        ),
        i = ae(-1),
        s = ae(-1);
      let f;
      return (
        Ds({
          startRow: i,
          endRow: s,
          onHover: (c, u) => {
            clearTimeout(f),
              (f = setTimeout(() => {
                (i.value = c), (s.value = u);
              }, 100));
          }
        }),
        () => {
          var c;
          const {
              data: u,
              getRowKey: y,
              measureColumnWidth: x,
              expandedKeys: b,
              customRow: v,
              rowExpandable: d,
              childrenColumnName: p
            } = e,
            { onColumnResize: $ } = o,
            { prefixCls: m, getComponent: S } = l,
            { flattenColumns: O } = r,
            I = S(['body', 'wrapper'], 'tbody'),
            k = S(['body', 'row'], 'tr'),
            T = S(['body', 'cell'], 'td');
          let C;
          u.length
            ? (C = a.value.map((D, A) => {
                const { record: F, indent: U, index: ee } = D,
                  Z = y(F, A);
                return h(
                  Xs,
                  {
                    key: Z,
                    rowKey: Z,
                    record: F,
                    recordKey: Z,
                    index: A,
                    renderIndex: ee,
                    rowComponent: k,
                    cellComponent: T,
                    expandedKeys: b,
                    customRow: v,
                    getRowKey: y,
                    rowExpandable: d,
                    childrenColumnName: p,
                    indent: U
                  },
                  null
                );
              }))
            : (C = h(
                Ql,
                {
                  expanded: !0,
                  class: `${m}-placeholder`,
                  prefixCls: m,
                  component: k,
                  cellComponent: T,
                  colSpan: O.length,
                  isEmpty: !0
                },
                {
                  default: () => [
                    (c = n.emptyNode) === null || c === void 0
                      ? void 0
                      : c.call(n)
                  ]
                }
              ));
          const E = an(O);
          return h(
            I,
            { class: `${m}-tbody` },
            {
              default: () => [
                x &&
                  h(
                    'tr',
                    {
                      'aria-hidden': 'true',
                      class: `${m}-measure-row`,
                      style: { height: 0, fontSize: 0 }
                    },
                    [
                      E.map(D =>
                        h(Ws, { key: D, columnKey: D, onColumnResize: $ }, null)
                      )
                    ]
                  ),
                C
              ]
            }
          );
        }
      );
    }
  }),
  lt = {};
var Ys =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
function Rn(e) {
  return e.reduce((t, n) => {
    const { fixed: o } = n,
      l = o === !0 ? 'left' : o,
      r = n.children;
    return r && r.length > 0
      ? [...t, ...Rn(r).map(a => g({ fixed: l }, a))]
      : [...t, g(g({}, n), { fixed: l })];
  }, []);
}
function Qs(e) {
  let t = !0;
  for (let o = 0; o < e.length; o += 1) {
    const l = e[o];
    if (t && l.fixed !== 'left') t = !1;
    else if (!t && l.fixed === 'left') {
      Me(!1, `Index ${o - 1} of \`columns\` missing \`fixed='left'\` prop.`);
      break;
    }
  }
  let n = !0;
  for (let o = e.length - 1; o >= 0; o -= 1) {
    const l = e[o];
    if (n && l.fixed !== 'right') n = !1;
    else if (!n && l.fixed === 'right') {
      Me(!1, `Index ${o + 1} of \`columns\` missing \`fixed='right'\` prop.`);
      break;
    }
  }
}
function Zs(e) {
  return e.map(t => {
    const { fixed: n } = t,
      o = Ys(t, ['fixed']);
    let l = n;
    return (
      n === 'left' ? (l = 'right') : n === 'right' && (l = 'left'),
      g({ fixed: l }, o)
    );
  });
}
function ec(e, t) {
  let {
    prefixCls: n,
    columns: o,
    expandable: l,
    expandedKeys: r,
    getRowKey: a,
    onTriggerExpand: i,
    expandIcon: s,
    rowExpandable: f,
    expandIconColumnIndex: c,
    direction: u,
    expandRowByClick: y,
    expandColumnWidth: x,
    expandFixed: b
  } = e;
  const v = go(),
    d = w(() => {
      if (l.value) {
        let m = o.value.slice();
        if (
          (c.value >= 0 &&
            Me(
              !1,
              '`expandIconColumnIndex` is deprecated. Please use `Table.EXPAND_COLUMN` in `columns` instead.'
            ),
          !m.includes(lt))
        ) {
          const F = c.value || 0;
          F >= 0 && m.splice(F, 0, lt);
        }
        m.filter(F => F === lt).length > 1 &&
          Me(!1, 'There exist more than one `EXPAND_COLUMN` in `columns`.');
        const S = m.indexOf(lt);
        m = m.filter((F, U) => F !== lt || U === S);
        const O = o.value[S];
        let I;
        (b.value === 'left' || b.value) && !c.value
          ? (I = 'left')
          : (b.value === 'right' || b.value) && c.value === o.value.length
          ? (I = 'right')
          : (I = O ? O.fixed : null);
        const k = r.value,
          T = f.value,
          C = s.value,
          E = n.value,
          D = y.value,
          A = {
            [Kt]: {
              class: `${n.value}-expand-icon-col`,
              columnType: 'EXPAND_COLUMN'
            },
            title: Zn(v.value, 'expandColumnTitle', {}, () => ['']),
            fixed: I,
            class: `${n.value}-row-expand-icon-cell`,
            width: x.value,
            customRender: F => {
              let { record: U, index: ee } = F;
              const Z = a.value(U, ee),
                he = k.has(Z),
                X = T ? T(U) : !0,
                Y = C({
                  prefixCls: E,
                  expanded: he,
                  expandable: X,
                  record: U,
                  onExpand: i
                });
              return D
                ? h('span', { onClick: L => L.stopPropagation() }, [Y])
                : Y;
            }
          };
        return m.map(F => (F === lt ? A : F));
      }
      return (
        o.value.includes(lt) &&
          Me(
            !1,
            '`expandable` is not config but there exist `EXPAND_COLUMN` in `columns`.'
          ),
        o.value.filter(m => m !== lt)
      );
    }),
    p = w(() => {
      let m = d.value;
      return (
        t.value && (m = t.value(m)),
        m.length || (m = [{ customRender: () => null }]),
        m
      );
    }),
    $ = w(() => (u.value === 'rtl' ? Zs(Rn(p.value)) : Rn(p.value)));
  return (
    Re(() => {
      setTimeout(() => {
        Qs($.value);
      });
    }),
    [p, $]
  );
}
function or(e) {
  const t = ae(e);
  let n;
  const o = ae([]);
  function l(r) {
    o.value.push(r),
      wt.cancel(n),
      (n = wt(() => {
        const a = o.value;
        (o.value = []),
          a.forEach(i => {
            t.value = i(t.value);
          });
      }));
  }
  return (
    yt(() => {
      wt.cancel(n);
    }),
    [t, l]
  );
}
function tc(e) {
  const t = pe(e || null),
    n = pe();
  function o() {
    clearTimeout(n.value);
  }
  function l(a) {
    (t.value = a),
      o(),
      (n.value = setTimeout(() => {
        (t.value = null), (n.value = void 0);
      }, 100));
  }
  function r() {
    return t.value;
  }
  return (
    yt(() => {
      o();
    }),
    [l, r]
  );
}
function nc(e, t, n) {
  return w(() => {
    const l = [],
      r = [];
    let a = 0,
      i = 0;
    const s = e.value,
      f = t.value,
      c = n.value;
    for (let u = 0; u < f; u += 1)
      if (c === 'rtl') {
        (r[u] = i), (i += s[u] || 0);
        const y = f - u - 1;
        (l[y] = a), (a += s[y] || 0);
      } else {
        (l[u] = a), (a += s[u] || 0);
        const y = f - u - 1;
        (r[y] = i), (i += s[y] || 0);
      }
    return { left: l, right: r };
  });
}
var oc =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
function lr(e) {
  let { colWidths: t, columns: n, columCount: o } = e;
  const l = [],
    r = o || n.length;
  let a = !1;
  for (let i = r - 1; i >= 0; i -= 1) {
    const s = t[i],
      f = n && n[i],
      c = f && f[Kt];
    if (s || c || a) {
      const u = c || {},
        y = oc(u, ['columnType']);
      l.unshift(
        h(
          'col',
          W(
            { key: i, style: { width: typeof s == 'number' ? `${s}px` : s } },
            y
          ),
          null
        )
      ),
        (a = !0);
    }
  }
  return h('colgroup', null, [l]);
}
function Bn(e, t) {
  let { slots: n } = t;
  var o;
  return h('div', null, [
    (o = n.default) === null || o === void 0 ? void 0 : o.call(n)
  ]);
}
Bn.displayName = 'Panel';
let lc = 0;
const rc = ve({
    name: 'TableSummary',
    props: ['fixed'],
    setup(e, t) {
      let { slots: n } = t;
      const o = it(),
        l = `table-summary-uni-key-${++lc}`,
        r = w(() => e.fixed === '' || e.fixed);
      return (
        Re(() => {
          o.summaryCollect(l, r.value);
        }),
        yt(() => {
          o.summaryCollect(l, !1);
        }),
        () => {
          var a;
          return (a = n.default) === null || a === void 0 ? void 0 : a.call(n);
        }
      );
    }
  }),
  ac = rc,
  ic = ve({
    compatConfig: { MODE: 3 },
    name: 'ATableSummaryRow',
    setup(e, t) {
      let { slots: n } = t;
      return () => {
        var o;
        return h('tr', null, [
          (o = n.default) === null || o === void 0 ? void 0 : o.call(n)
        ]);
      };
    }
  }),
  rr = Symbol('SummaryContextProps'),
  sc = e => {
    Je(rr, e);
  },
  cc = () => qe(rr, {}),
  dc = ve({
    name: 'ATableSummaryCell',
    props: ['index', 'colSpan', 'rowSpan', 'align'],
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      const l = it(),
        r = cc();
      return () => {
        const { index: a, colSpan: i = 1, rowSpan: s, align: f } = e,
          { prefixCls: c, direction: u } = l,
          { scrollColumnIndex: y, stickyOffsets: x, flattenColumns: b } = r,
          d = a + i - 1 + 1 === y ? i + 1 : i,
          p = mo(a, a + d - 1, b, x, u);
        return h(
          sn,
          W(
            {
              class: n.class,
              index: a,
              component: 'td',
              prefixCls: c,
              record: null,
              dataIndex: null,
              align: f,
              colSpan: d,
              rowSpan: s,
              customRender: () => {
                var $;
                return ($ = o.default) === null || $ === void 0
                  ? void 0
                  : $.call(o);
              }
            },
            p
          ),
          null
        );
      };
    }
  }),
  Xt = ve({
    name: 'TableFooter',
    inheritAttrs: !1,
    props: ['stickyOffsets', 'flattenColumns'],
    setup(e, t) {
      let { slots: n } = t;
      const o = it();
      return (
        sc(
          gt({
            stickyOffsets: ze(e, 'stickyOffsets'),
            flattenColumns: ze(e, 'flattenColumns'),
            scrollColumnIndex: w(() => {
              const l = e.flattenColumns.length - 1,
                r = e.flattenColumns[l];
              return r != null && r.scrollbar ? l : null;
            })
          })
        ),
        () => {
          var l;
          const { prefixCls: r } = o;
          return h('tfoot', { class: `${r}-summary` }, [
            (l = n.default) === null || l === void 0 ? void 0 : l.call(n)
          ]);
        }
      );
    }
  }),
  uc = ac;
function fc(e) {
  let { prefixCls: t, record: n, onExpand: o, expanded: l, expandable: r } = e;
  const a = `${t}-row-expand-icon`;
  if (!r) return h('span', { class: [a, `${t}-row-spaced`] }, null);
  const i = s => {
    o(n, s), s.stopPropagation();
  };
  return h(
    'span',
    {
      class: { [a]: !0, [`${t}-row-expanded`]: l, [`${t}-row-collapsed`]: !l },
      onClick: i
    },
    null
  );
}
function pc(e, t, n) {
  const o = [];
  function l(r) {
    (r || []).forEach((a, i) => {
      o.push(t(a, i)), l(a[n]);
    });
  }
  return l(e), o;
}
const vc = ve({
    name: 'StickyScrollBar',
    inheritAttrs: !1,
    props: ['offsetScroll', 'container', 'scrollBodyRef', 'scrollBodySizeInfo'],
    emits: ['scroll'],
    setup(e, t) {
      let { emit: n, expose: o } = t;
      const l = it(),
        r = ae(0),
        a = ae(0),
        i = ae(0);
      Re(
        () => {
          (r.value = e.scrollBodySizeInfo.scrollWidth || 0),
            (a.value = e.scrollBodySizeInfo.clientWidth || 0),
            (i.value = r.value && a.value * (a.value / r.value));
        },
        { flush: 'post' }
      );
      const s = ae(),
        [f, c] = or({ scrollLeft: 0, isHiddenScrollBar: !0 }),
        u = pe({ delta: 0, x: 0 }),
        y = ae(!1),
        x = () => {
          y.value = !1;
        },
        b = k => {
          (u.value = { delta: k.pageX - f.value.scrollLeft, x: 0 }),
            (y.value = !0),
            k.preventDefault();
        },
        v = k => {
          const { buttons: T } = k || (window == null ? void 0 : window.event);
          if (!y.value || T === 0) {
            y.value && (y.value = !1);
            return;
          }
          let C = u.value.x + k.pageX - u.value.x - u.value.delta;
          C <= 0 && (C = 0),
            C + i.value >= a.value && (C = a.value - i.value),
            n('scroll', { scrollLeft: (C / a.value) * (r.value + 2) }),
            (u.value.x = k.pageX);
        },
        d = () => {
          if (!e.scrollBodyRef.value) return;
          const k = ko(e.scrollBodyRef.value).top,
            T = k + e.scrollBodyRef.value.offsetHeight,
            C =
              e.container === window
                ? document.documentElement.scrollTop + window.innerHeight
                : ko(e.container).top + e.container.clientHeight;
          T - Po() <= C || k >= C - e.offsetScroll
            ? c(E => g(g({}, E), { isHiddenScrollBar: !0 }))
            : c(E => g(g({}, E), { isHiddenScrollBar: !1 }));
        };
      o({
        setScrollLeft: k => {
          c(T => g(g({}, T), { scrollLeft: (k / r.value) * a.value || 0 }));
        }
      });
      let $ = null,
        m = null,
        S = null,
        O = null;
      at(() => {
        ($ = $t(document.body, 'mouseup', x, !1)),
          (m = $t(document.body, 'mousemove', v, !1)),
          (S = $t(window, 'resize', d, !1));
      }),
        zr(() => {
          ft(() => {
            d();
          });
        }),
        at(() => {
          setTimeout(() => {
            Te(
              [i, y],
              () => {
                d();
              },
              { immediate: !0, flush: 'post' }
            );
          });
        }),
        Te(
          () => e.container,
          () => {
            O == null || O.remove(), (O = $t(e.container, 'scroll', d, !1));
          },
          { immediate: !0, flush: 'post' }
        ),
        yt(() => {
          $ == null || $.remove(),
            m == null || m.remove(),
            O == null || O.remove(),
            S == null || S.remove();
        }),
        Te(
          () => g({}, f.value),
          (k, T) => {
            k.isHiddenScrollBar !==
              (T == null ? void 0 : T.isHiddenScrollBar) &&
              !k.isHiddenScrollBar &&
              c(C => {
                const E = e.scrollBodyRef.value;
                return E
                  ? g(g({}, C), {
                      scrollLeft: (E.scrollLeft / E.scrollWidth) * E.clientWidth
                    })
                  : C;
              });
          },
          { immediate: !0 }
        );
      const I = Po();
      return () => {
        if (r.value <= a.value || !i.value || f.value.isHiddenScrollBar)
          return null;
        const { prefixCls: k } = l;
        return h(
          'div',
          {
            style: {
              height: `${I}px`,
              width: `${a.value}px`,
              bottom: `${e.offsetScroll}px`
            },
            class: `${k}-sticky-scroll`
          },
          [
            h(
              'div',
              {
                onMousedown: b,
                ref: s,
                class: ie(`${k}-sticky-scroll-bar`, {
                  [`${k}-sticky-scroll-bar-active`]: y.value
                }),
                style: {
                  width: `${i.value}px`,
                  transform: `translate3d(${f.value.scrollLeft}px, 0, 0)`
                }
              },
              null
            )
          ]
        );
      };
    }
  }),
  Qo = Dr() ? window : null;
function hc(e, t) {
  return w(() => {
    const {
        offsetHeader: n = 0,
        offsetSummary: o = 0,
        offsetScroll: l = 0,
        getContainer: r = () => Qo
      } = typeof e.value == 'object' ? e.value : {},
      a = r() || Qo,
      i = !!e.value;
    return {
      isSticky: i,
      stickyClassName: i ? `${t.value}-sticky-holder` : '',
      offsetHeader: n,
      offsetSummary: o,
      offsetScroll: l,
      container: a
    };
  });
}
function gc(e, t) {
  return w(() => {
    const n = [],
      o = e.value,
      l = t.value;
    for (let r = 0; r < l; r += 1) {
      const a = o[r];
      if (a !== void 0) n[r] = a;
      else return null;
    }
    return n;
  });
}
const Zo = ve({
  name: 'FixedHolder',
  inheritAttrs: !1,
  props: [
    'columns',
    'flattenColumns',
    'stickyOffsets',
    'customHeaderRow',
    'noData',
    'maxContentScroll',
    'colWidths',
    'columCount',
    'direction',
    'fixHeader',
    'stickyTopOffset',
    'stickyBottomOffset',
    'stickyClassName'
  ],
  emits: ['scroll'],
  setup(e, t) {
    let { attrs: n, slots: o, emit: l } = t;
    const r = it(),
      a = w(() => (r.isSticky && !e.fixHeader ? 0 : r.scrollbarSize)),
      i = pe(),
      s = v => {
        const { currentTarget: d, deltaX: p } = v;
        p &&
          (l('scroll', { currentTarget: d, scrollLeft: d.scrollLeft + p }),
          v.preventDefault());
      },
      f = pe();
    at(() => {
      ft(() => {
        f.value = $t(i.value, 'wheel', s);
      });
    }),
      yt(() => {
        var v;
        (v = f.value) === null || v === void 0 || v.remove();
      });
    const c = w(() =>
        e.flattenColumns.every(
          v => v.width && v.width !== 0 && v.width !== '0px'
        )
      ),
      u = pe([]),
      y = pe([]);
    Re(() => {
      const v = e.flattenColumns[e.flattenColumns.length - 1],
        d = {
          fixed: v ? v.fixed : null,
          scrollbar: !0,
          customHeaderCell: () => ({ class: `${r.prefixCls}-cell-scrollbar` })
        };
      (u.value = a.value ? [...e.columns, d] : e.columns),
        (y.value = a.value ? [...e.flattenColumns, d] : e.flattenColumns);
    });
    const x = w(() => {
        const { stickyOffsets: v, direction: d } = e,
          { right: p, left: $ } = v;
        return g(g({}, v), {
          left: d === 'rtl' ? [...$.map(m => m + a.value), 0] : $,
          right: d === 'rtl' ? p : [...p.map(m => m + a.value), 0],
          isSticky: r.isSticky
        });
      }),
      b = gc(ze(e, 'colWidths'), ze(e, 'columCount'));
    return () => {
      var v;
      const {
          noData: d,
          columCount: p,
          stickyTopOffset: $,
          stickyBottomOffset: m,
          stickyClassName: S,
          maxContentScroll: O
        } = e,
        { isSticky: I } = r;
      return h(
        'div',
        {
          style: g(
            { overflow: 'hidden' },
            I ? { top: `${$}px`, bottom: `${m}px` } : {}
          ),
          ref: i,
          class: ie(n.class, { [S]: !!S })
        },
        [
          h(
            'table',
            {
              style: {
                tableLayout: 'fixed',
                visibility: d || b.value ? null : 'hidden'
              }
            },
            [
              (!d || !O || c.value) &&
                h(
                  lr,
                  {
                    colWidths: b.value ? [...b.value, a.value] : [],
                    columCount: p + 1,
                    columns: y.value
                  },
                  null
                ),
              (v = o.default) === null || v === void 0
                ? void 0
                : v.call(
                    o,
                    g(g({}, e), {
                      stickyOffsets: x.value,
                      columns: u.value,
                      flattenColumns: y.value
                    })
                  )
            ]
          )
        ]
      );
    };
  }
});
function el(e) {
  for (
    var t = arguments.length, n = new Array(t > 1 ? t - 1 : 0), o = 1;
    o < t;
    o++
  )
    n[o - 1] = arguments[o];
  return gt(qa(n.map(l => [l, ze(e, l)])));
}
const mc = [],
  yc = {},
  _n = 'rc-table-internal-hook',
  bc = ve({
    name: 'VcTable',
    inheritAttrs: !1,
    props: [
      'prefixCls',
      'data',
      'columns',
      'rowKey',
      'tableLayout',
      'scroll',
      'rowClassName',
      'title',
      'footer',
      'id',
      'showHeader',
      'components',
      'customRow',
      'customHeaderRow',
      'direction',
      'expandFixed',
      'expandColumnWidth',
      'expandedRowKeys',
      'defaultExpandedRowKeys',
      'expandedRowRender',
      'expandRowByClick',
      'expandIcon',
      'onExpand',
      'onExpandedRowsChange',
      'onUpdate:expandedRowKeys',
      'defaultExpandAllRows',
      'indentSize',
      'expandIconColumnIndex',
      'expandedRowClassName',
      'childrenColumnName',
      'rowExpandable',
      'sticky',
      'transformColumns',
      'internalHooks',
      'internalRefs',
      'canExpandable',
      'onUpdateInternalRefs',
      'transformCellText'
    ],
    emits: [
      'expand',
      'expandedRowsChange',
      'updateInternalRefs',
      'update:expandedRowKeys'
    ],
    setup(e, t) {
      let { attrs: n, slots: o, emit: l } = t;
      const r = w(() => e.data || mc),
        a = w(() => !!r.value.length),
        i = w(() => Is(e.components, {})),
        s = (P, R) => Gl(i.value, P) || R,
        f = w(() => {
          const P = e.rowKey;
          return typeof P == 'function'
            ? P
            : R => {
                const te = R && R[P];
                return (
                  Me(
                    te !== void 0,
                    'Each record in table should have a unique `key` prop, or set `rowKey` to an unique primary key.'
                  ),
                  te
                );
              };
        }),
        c = w(() => e.expandIcon || fc),
        u = w(() => e.childrenColumnName || 'children'),
        y = w(() =>
          e.expandedRowRender
            ? 'row'
            : e.canExpandable ||
              r.value.some(P => P && typeof P == 'object' && P[u.value])
            ? 'nest'
            : !1
        ),
        x = ae([]);
      Re(() => {
        e.defaultExpandedRowKeys && (x.value = e.defaultExpandedRowKeys),
          e.defaultExpandAllRows && (x.value = pc(r.value, f.value, u.value));
      })();
      const v = w(() => new Set(e.expandedRowKeys || x.value || [])),
        d = P => {
          const R = f.value(P, r.value.indexOf(P));
          let te;
          const ge = v.value.has(R);
          ge
            ? (v.value.delete(R), (te = [...v.value]))
            : (te = [...v.value, R]),
            (x.value = te),
            l('expand', !ge, P),
            l('update:expandedRowKeys', te),
            l('expandedRowsChange', te);
        };
      e.expandedRowRender &&
        r.value.some(P => Array.isArray(P == null ? void 0 : P[u.value])) &&
        Me(!1, '`expandedRowRender` should not use with nested Table');
      const p = pe(0),
        [$, m] = ec(
          g(g({}, un(e)), {
            expandable: w(() => !!e.expandedRowRender),
            expandedKeys: v,
            getRowKey: f,
            onTriggerExpand: d,
            expandIcon: c
          }),
          w(() => (e.internalHooks === _n ? e.transformColumns : null))
        ),
        S = w(() => ({ columns: $.value, flattenColumns: m.value })),
        O = pe(),
        I = pe(),
        k = pe(),
        T = pe({ scrollWidth: 0, clientWidth: 0 }),
        C = pe(),
        [E, D] = Ot(!1),
        [A, F] = Ot(!1),
        [U, ee] = or(new Map()),
        Z = w(() => an(m.value)),
        he = w(() => Z.value.map(P => U.value.get(P))),
        X = w(() => m.value.length),
        Y = nc(he, X, ze(e, 'direction')),
        L = w(() => e.scroll && Dn(e.scroll.y)),
        Q = w(() => (e.scroll && Dn(e.scroll.x)) || !!e.expandFixed),
        B = w(
          () =>
            Q.value &&
            m.value.some(P => {
              let { fixed: R } = P;
              return R;
            })
        ),
        H = pe(),
        M = hc(ze(e, 'sticky'), ze(e, 'prefixCls')),
        j = gt({}),
        ne = w(() => {
          const P = Object.values(j)[0];
          return (L.value || M.value.isSticky) && P;
        }),
        oe = (P, R) => {
          R ? (j[P] = R) : delete j[P];
        },
        Ke = pe({}),
        Ie = pe({}),
        De = pe({});
      Re(() => {
        L.value &&
          (Ie.value = { overflowY: 'scroll', maxHeight: Co(e.scroll.y) }),
          Q.value &&
            ((Ke.value = { overflowX: 'auto' }),
            L.value || (Ie.value = { overflowY: 'hidden' }),
            (De.value = {
              width: e.scroll.x === !0 ? 'auto' : Co(e.scroll.x),
              minWidth: '100%'
            }));
      });
      const _e = (P, R) => {
          da(O.value) &&
            ee(te => {
              if (te.get(P) !== R) {
                const ge = new Map(te);
                return ge.set(P, R), ge;
              }
              return te;
            });
        },
        [je, Ve] = tc(null);
      function Ne(P, R) {
        if (!R) return;
        if (typeof R == 'function') {
          R(P);
          return;
        }
        const te = R.$el || R;
        te.scrollLeft !== P && (te.scrollLeft = P);
      }
      const Ee = P => {
          let { currentTarget: R, scrollLeft: te } = P;
          var ge;
          const we = e.direction === 'rtl',
            N = typeof te == 'number' ? te : R.scrollLeft,
            _ = R || yc;
          if (
            ((!Ve() || Ve() === _) &&
              (je(_),
              Ne(N, I.value),
              Ne(N, k.value),
              Ne(N, C.value),
              Ne(
                N,
                (ge = H.value) === null || ge === void 0
                  ? void 0
                  : ge.setScrollLeft
              )),
            R)
          ) {
            const { scrollWidth: z, clientWidth: V } = R;
            we ? (D(-N < z - V), F(-N > 0)) : (D(N > 0), F(N < z - V));
          }
        },
        G = () => {
          Q.value && k.value ? Ee({ currentTarget: k.value }) : (D(!1), F(!1));
        };
      let ce;
      const J = P => {
          P !== p.value && (G(), (p.value = O.value ? O.value.offsetWidth : P));
        },
        se = P => {
          let { width: R } = P;
          if ((clearTimeout(ce), p.value === 0)) {
            J(R);
            return;
          }
          ce = setTimeout(() => {
            J(R);
          }, 100);
        };
      Te(
        [Q, () => e.data, () => e.columns],
        () => {
          Q.value && G();
        },
        { flush: 'post' }
      );
      const [ue, Pe] = Ot(0);
      Rs(),
        at(() => {
          ft(() => {
            var P, R;
            G(),
              Pe(ca(k.value).width),
              (T.value = {
                scrollWidth:
                  ((P = k.value) === null || P === void 0
                    ? void 0
                    : P.scrollWidth) || 0,
                clientWidth:
                  ((R = k.value) === null || R === void 0
                    ? void 0
                    : R.clientWidth) || 0
              });
          });
        }),
        Jn(() => {
          ft(() => {
            var P, R;
            const te =
                ((P = k.value) === null || P === void 0
                  ? void 0
                  : P.scrollWidth) || 0,
              ge =
                ((R = k.value) === null || R === void 0
                  ? void 0
                  : R.clientWidth) || 0;
            (T.value.scrollWidth !== te || T.value.clientWidth !== ge) &&
              (T.value = { scrollWidth: te, clientWidth: ge });
          });
        }),
        Re(
          () => {
            e.internalHooks === _n &&
              e.internalRefs &&
              e.onUpdateInternalRefs({
                body: k.value ? k.value.$el || k.value : null
              });
          },
          { flush: 'post' }
        );
      const de = w(() =>
          e.tableLayout
            ? e.tableLayout
            : B.value
            ? e.scroll.x === 'max-content'
              ? 'auto'
              : 'fixed'
            : L.value ||
              M.value.isSticky ||
              m.value.some(P => {
                let { ellipsis: R } = P;
                return R;
              })
            ? 'fixed'
            : 'auto'
        ),
        xe = () => {
          var P;
          return a.value
            ? null
            : ((P = o.emptyText) === null || P === void 0
                ? void 0
                : P.call(o)) || 'No Data';
        };
      Ps(
        gt(
          g(g({}, un(el(e, 'prefixCls', 'direction', 'transformCellText'))), {
            getComponent: s,
            scrollbarSize: ue,
            fixedInfoList: w(() =>
              m.value.map((P, R) => mo(R, R, m.value, Y.value, e.direction))
            ),
            isSticky: w(() => M.value.isSticky),
            summaryCollect: oe
          })
        )
      ),
        Vs(
          gt(
            g(
              g(
                {},
                un(
                  el(
                    e,
                    'rowClassName',
                    'expandedRowClassName',
                    'expandRowByClick',
                    'expandedRowRender',
                    'expandIconColumnIndex',
                    'indentSize'
                  )
                )
              ),
              {
                columns: $,
                flattenColumns: m,
                tableLayout: de,
                expandIcon: c,
                expandableType: y,
                onTriggerExpand: d
              }
            )
          )
        ),
        Us({ onColumnResize: _e }),
        Ls({ componentWidth: p, fixHeader: L, fixColumn: B, horizonScroll: Q });
      const ke = () =>
          h(
            Js,
            {
              data: r.value,
              measureColumnWidth: L.value || Q.value || M.value.isSticky,
              expandedKeys: v.value,
              rowExpandable: e.rowExpandable,
              getRowKey: f.value,
              customRow: e.customRow,
              childrenColumnName: u.value
            },
            { emptyNode: xe }
          ),
        K = () =>
          h(
            lr,
            {
              colWidths: m.value.map(P => {
                let { width: R } = P;
                return R;
              }),
              columns: m.value
            },
            null
          );
      return () => {
        var P;
        const {
            prefixCls: R,
            scroll: te,
            tableLayout: ge,
            direction: we,
            title: N = o.title,
            footer: _ = o.footer,
            id: z,
            showHeader: V,
            customHeaderRow: le
          } = e,
          {
            isSticky: re,
            offsetHeader: q,
            offsetSummary: Se,
            offsetScroll: Oe,
            stickyClassName: be,
            container: Ce
          } = M.value,
          $e = s(['table'], 'table'),
          Be = s(['body']),
          Fe =
            (P = o.summary) === null || P === void 0
              ? void 0
              : P.call(o, { pageData: r.value });
        let He = () => null;
        const Ae = {
          colWidths: he.value,
          columCount: m.value.length,
          stickyOffsets: Y.value,
          customHeaderRow: le,
          fixHeader: L.value,
          scroll: te
        };
        if (
          (typeof Be == 'function' &&
            a.value &&
            !L.value &&
            Me(
              !1,
              '`components.body` with render props is only work on `scroll.y`.'
            ),
          L.value || re)
        ) {
          let xt = () => null;
          typeof Be == 'function'
            ? ((xt = () =>
                Be(r.value, { scrollbarSize: ue.value, ref: k, onScroll: Ee })),
              (Ae.colWidths = m.value.map((vt, dn) => {
                let { width: Vt } = vt;
                const _t = dn === $.value.length - 1 ? Vt - ue.value : Vt;
                return typeof _t == 'number' && !Number.isNaN(_t)
                  ? _t
                  : (Me(
                      !1,
                      'When use `components.body` with render props. Each column should have a fixed `width` value.'
                    ),
                    0);
              })))
            : (xt = () =>
                h(
                  'div',
                  {
                    style: g(g({}, Ke.value), Ie.value),
                    onScroll: Ee,
                    ref: k,
                    class: ie(`${R}-body`)
                  },
                  [
                    h(
                      $e,
                      { style: g(g({}, De.value), { tableLayout: de.value }) },
                      {
                        default: () => [
                          K(),
                          ke(),
                          !ne.value &&
                            Fe &&
                            h(
                              Xt,
                              {
                                stickyOffsets: Y.value,
                                flattenColumns: m.value
                              },
                              { default: () => [Fe] }
                            )
                        ]
                      }
                    )
                  ]
                ));
          const Wt = g(
            g(
              g(
                {
                  noData: !r.value.length,
                  maxContentScroll: Q.value && te.x === 'max-content'
                },
                Ae
              ),
              S.value
            ),
            { direction: we, stickyClassName: be, onScroll: Ee }
          );
          He = () =>
            h(mt, null, [
              V !== !1 &&
                h(
                  Zo,
                  W(
                    W({}, Wt),
                    {},
                    { stickyTopOffset: q, class: `${R}-header`, ref: I }
                  ),
                  {
                    default: vt =>
                      h(mt, null, [
                        h(Yo, vt, null),
                        ne.value === 'top' && h(Xt, vt, { default: () => [Fe] })
                      ])
                  }
                ),
              xt(),
              ne.value &&
                ne.value !== 'top' &&
                h(
                  Zo,
                  W(
                    W({}, Wt),
                    {},
                    { stickyBottomOffset: Se, class: `${R}-summary`, ref: C }
                  ),
                  { default: vt => h(Xt, vt, { default: () => [Fe] }) }
                ),
              re &&
                k.value &&
                h(
                  vc,
                  {
                    ref: H,
                    offsetScroll: Oe,
                    scrollBodyRef: k,
                    onScroll: Ee,
                    container: Ce,
                    scrollBodySizeInfo: T.value
                  },
                  null
                )
            ]);
        } else
          He = () =>
            h(
              'div',
              {
                style: g(g({}, Ke.value), Ie.value),
                class: ie(`${R}-content`),
                onScroll: Ee,
                ref: k
              },
              [
                h(
                  $e,
                  { style: g(g({}, De.value), { tableLayout: de.value }) },
                  {
                    default: () => [
                      K(),
                      V !== !1 && h(Yo, W(W({}, Ae), S.value), null),
                      ke(),
                      Fe &&
                        h(
                          Xt,
                          { stickyOffsets: Y.value, flattenColumns: m.value },
                          { default: () => [Fe] }
                        )
                    ]
                  }
                )
              ]
            );
        const nt = eo(n, { aria: !0, data: !0 }),
          pt = () =>
            h(
              'div',
              W(
                W({}, nt),
                {},
                {
                  class: ie(R, {
                    [`${R}-rtl`]: we === 'rtl',
                    [`${R}-ping-left`]: E.value,
                    [`${R}-ping-right`]: A.value,
                    [`${R}-layout-fixed`]: ge === 'fixed',
                    [`${R}-fixed-header`]: L.value,
                    [`${R}-fixed-column`]: B.value,
                    [`${R}-scroll-horizontal`]: Q.value,
                    [`${R}-has-fix-left`]: m.value[0] && m.value[0].fixed,
                    [`${R}-has-fix-right`]:
                      m.value[X.value - 1] &&
                      m.value[X.value - 1].fixed === 'right',
                    [n.class]: n.class
                  }),
                  style: n.style,
                  id: z,
                  ref: O
                }
              ),
              [
                N &&
                  h(
                    Bn,
                    { class: `${R}-title` },
                    { default: () => [N(r.value)] }
                  ),
                h('div', { class: `${R}-container` }, [He()]),
                _ &&
                  h(
                    Bn,
                    { class: `${R}-footer` },
                    { default: () => [_(r.value)] }
                  )
              ]
            );
        return Q.value ? h(Sl, { onResize: se }, { default: pt }) : pt();
      };
    }
  });
function xc() {
  const e = g({}, arguments.length <= 0 ? void 0 : arguments[0]);
  for (let t = 1; t < arguments.length; t++) {
    const n = t < 0 || arguments.length <= t ? void 0 : arguments[t];
    n &&
      Object.keys(n).forEach(o => {
        const l = n[o];
        l !== void 0 && (e[o] = l);
      });
  }
  return e;
}
const An = 10;
function Cc(e, t) {
  const n = { current: e.current, pageSize: e.pageSize };
  return (
    Object.keys(t && typeof t == 'object' ? t : {}).forEach(l => {
      const r = e[l];
      typeof r != 'function' && (n[l] = r);
    }),
    n
  );
}
function Sc(e, t, n) {
  const o = w(() => (t.value && typeof t.value == 'object' ? t.value : {})),
    l = w(() => o.value.total || 0),
    [r, a] = Ot(() => ({
      current: 'defaultCurrent' in o.value ? o.value.defaultCurrent : 1,
      pageSize: 'defaultPageSize' in o.value ? o.value.defaultPageSize : An
    })),
    i = w(() => {
      const c = xc(r.value, o.value, {
          total: l.value > 0 ? l.value : e.value
        }),
        u = Math.ceil((l.value || e.value) / c.pageSize);
      return c.current > u && (c.current = u || 1), c;
    }),
    s = (c, u) => {
      t.value !== !1 && a({ current: c ?? 1, pageSize: u || i.value.pageSize });
    },
    f = (c, u) => {
      var y, x;
      t.value &&
        ((x = (y = o.value).onChange) === null ||
          x === void 0 ||
          x.call(y, c, u)),
        s(c, u),
        n(c, u || i.value.pageSize);
    };
  return [
    w(() => (t.value === !1 ? {} : g(g({}, i.value), { onChange: f }))),
    s
  ];
}
function $c(e, t, n) {
  const o = ae({});
  Te(
    [e, t, n],
    () => {
      const r = new Map(),
        a = n.value,
        i = t.value;
      function s(f) {
        f.forEach((c, u) => {
          const y = a(c, u);
          r.set(y, c), c && typeof c == 'object' && i in c && s(c[i] || []);
        });
      }
      s(e.value), (o.value = { kvMap: r });
    },
    { deep: !0, immediate: !0 }
  );
  function l(r) {
    return o.value.kvMap.get(r);
  }
  return [l];
}
const Ze = {},
  Fn = 'SELECT_ALL',
  zn = 'SELECT_INVERT',
  Mn = 'SELECT_NONE',
  wc = [];
function ar(e, t) {
  let n = [];
  return (
    (t || []).forEach(o => {
      n.push(o),
        o && typeof o == 'object' && e in o && (n = [...n, ...ar(e, o[e])]);
    }),
    n
  );
}
function Oc(e, t) {
  const n = w(() => {
      const C = e.value || {},
        { checkStrictly: E = !0 } = C;
      return g(g({}, C), { checkStrictly: E });
    }),
    [o, l] = ua(
      n.value.selectedRowKeys || n.value.defaultSelectedRowKeys || wc,
      { value: w(() => n.value.selectedRowKeys) }
    ),
    r = ae(new Map()),
    a = C => {
      if (n.value.preserveSelectedRowKeys) {
        const E = new Map();
        C.forEach(D => {
          let A = t.getRecordByKey(D);
          !A && r.value.has(D) && (A = r.value.get(D)), E.set(D, A);
        }),
          (r.value = E);
      }
    };
  Re(() => {
    a(o.value);
  });
  const i = w(() =>
      n.value.checkStrictly
        ? null
        : oo(t.data.value, {
            externalGetKey: t.getRowKey.value,
            childrenPropName: t.childrenColumnName.value
          }).keyEntities
    ),
    s = w(() => ar(t.childrenColumnName.value, t.pageData.value)),
    f = w(() => {
      const C = new Map(),
        E = t.getRowKey.value,
        D = n.value.getCheckboxProps;
      return (
        s.value.forEach((A, F) => {
          const U = E(A, F),
            ee = (D ? D(A) : null) || {};
          C.set(U, ee),
            ('checked' in ee || 'defaultChecked' in ee) &&
              We(
                !1,
                'Table',
                'Do not set `checked` or `defaultChecked` in `getCheckboxProps`. Please use `selectedRowKeys` instead.'
              );
        }),
        C
      );
    }),
    { maxLevel: c, levelEntities: u } = Ml(i),
    y = C => {
      var E;
      return !!(
        !((E = f.value.get(t.getRowKey.value(C))) === null || E === void 0) &&
        E.disabled
      );
    },
    x = w(() => {
      if (n.value.checkStrictly) return [o.value || [], []];
      const { checkedKeys: C, halfCheckedKeys: E } = Tt(
        o.value,
        !0,
        i.value,
        c.value,
        u.value,
        y
      );
      return [C || [], E];
    }),
    b = w(() => x.value[0]),
    v = w(() => x.value[1]),
    d = w(() => {
      const C = n.value.type === 'radio' ? b.value.slice(0, 1) : b.value;
      return new Set(C);
    }),
    p = w(() => (n.value.type === 'radio' ? new Set() : new Set(v.value))),
    [$, m] = Ot(null),
    S = C => {
      let E, D;
      a(C);
      const { preserveSelectedRowKeys: A, onChange: F } = n.value,
        { getRecordByKey: U } = t;
      A
        ? ((E = C), (D = C.map(ee => r.value.get(ee))))
        : ((E = []),
          (D = []),
          C.forEach(ee => {
            const Z = U(ee);
            Z !== void 0 && (E.push(ee), D.push(Z));
          })),
        l(E),
        F == null || F(E, D);
    },
    O = (C, E, D, A) => {
      const { onSelect: F } = n.value,
        { getRecordByKey: U } = t || {};
      if (F) {
        const ee = D.map(Z => U(Z));
        F(U(C), E, ee, A);
      }
      S(D);
    },
    I = w(() => {
      const {
          onSelectInvert: C,
          onSelectNone: E,
          selections: D,
          hideSelectAll: A
        } = n.value,
        { data: F, pageData: U, getRowKey: ee, locale: Z } = t;
      return !D || A
        ? null
        : (D === !0 ? [Fn, zn, Mn] : D).map(X =>
            X === Fn
              ? {
                  key: 'all',
                  text: Z.value.selectionAll,
                  onSelect() {
                    S(
                      F.value
                        .map((Y, L) => ee.value(Y, L))
                        .filter(Y => {
                          const L = f.value.get(Y);
                          return !(L != null && L.disabled) || d.value.has(Y);
                        })
                    );
                  }
                }
              : X === zn
              ? {
                  key: 'invert',
                  text: Z.value.selectInvert,
                  onSelect() {
                    const Y = new Set(d.value);
                    U.value.forEach((Q, B) => {
                      const H = ee.value(Q, B),
                        M = f.value.get(H);
                      (M != null && M.disabled) ||
                        (Y.has(H) ? Y.delete(H) : Y.add(H));
                    });
                    const L = Array.from(Y);
                    C &&
                      (We(
                        !1,
                        'Table',
                        '`onSelectInvert` will be removed in future. Please use `onChange` instead.'
                      ),
                      C(L)),
                      S(L);
                  }
                }
              : X === Mn
              ? {
                  key: 'none',
                  text: Z.value.selectNone,
                  onSelect() {
                    E == null || E(),
                      S(
                        Array.from(d.value).filter(Y => {
                          const L = f.value.get(Y);
                          return L == null ? void 0 : L.disabled;
                        })
                      );
                  }
                }
              : X
          );
    }),
    k = w(() => s.value.length);
  return [
    C => {
      var E;
      const {
          onSelectAll: D,
          onSelectMultiple: A,
          columnWidth: F,
          type: U,
          fixed: ee,
          renderCell: Z,
          hideSelectAll: he,
          checkStrictly: X
        } = n.value,
        {
          prefixCls: Y,
          getRecordByKey: L,
          getRowKey: Q,
          expandType: B,
          getPopupContainer: H
        } = t;
      if (!e.value)
        return (
          We(
            !C.includes(Ze),
            'Table',
            '`rowSelection` is not config but `SELECTION_COLUMN` exists in the `columns`.'
          ),
          C.filter(J => J !== Ze)
        );
      let M = C.slice();
      const j = new Set(d.value),
        ne = s.value.map(Q.value).filter(J => !f.value.get(J).disabled),
        oe = ne.every(J => j.has(J)),
        Ke = ne.some(J => j.has(J)),
        Ie = () => {
          const J = [];
          oe
            ? ne.forEach(ue => {
                j.delete(ue), J.push(ue);
              })
            : ne.forEach(ue => {
                j.has(ue) || (j.add(ue), J.push(ue));
              });
          const se = Array.from(j);
          D == null ||
            D(
              !oe,
              se.map(ue => L(ue)),
              J.map(ue => L(ue))
            ),
            S(se);
        };
      let De;
      if (U !== 'radio') {
        let J;
        if (I.value) {
          const xe = h(
            en,
            { getPopupContainer: H.value },
            {
              default: () => [
                I.value.map((ke, K) => {
                  const { key: P, text: R, onSelect: te } = ke;
                  return h(
                    en.Item,
                    {
                      key: P || K,
                      onClick: () => {
                        te == null || te(ne);
                      }
                    },
                    { default: () => [R] }
                  );
                })
              ]
            }
          );
          J = h('div', { class: `${Y.value}-selection-extra` }, [
            h(
              Pt,
              { overlay: xe, getPopupContainer: H.value },
              { default: () => [h('span', null, [h(Ia, null, null)])] }
            )
          ]);
        }
        const se = s.value
            .map((xe, ke) => {
              const K = Q.value(xe, ke),
                P = f.value.get(K) || {};
              return g({ checked: j.has(K) }, P);
            })
            .filter(xe => {
              let { disabled: ke } = xe;
              return ke;
            }),
          ue = !!se.length && se.length === k.value,
          Pe =
            ue &&
            se.every(xe => {
              let { checked: ke } = xe;
              return ke;
            }),
          de =
            ue &&
            se.some(xe => {
              let { checked: ke } = xe;
              return ke;
            });
        De =
          !he &&
          h('div', { class: `${Y.value}-selection` }, [
            h(
              ut,
              {
                checked: ue ? Pe : !!k.value && oe,
                indeterminate: ue ? !Pe && de : !oe && Ke,
                onChange: Ie,
                disabled: k.value === 0 || ue,
                'aria-label': J ? 'Custom selection' : 'Select all',
                skipGroup: !0
              },
              null
            ),
            J
          ]);
      }
      let _e;
      U === 'radio'
        ? (_e = J => {
            let { record: se, index: ue } = J;
            const Pe = Q.value(se, ue),
              de = j.has(Pe);
            return {
              node: h(
                Xe,
                W(
                  W({}, f.value.get(Pe)),
                  {},
                  {
                    checked: de,
                    onClick: xe => xe.stopPropagation(),
                    onChange: xe => {
                      j.has(Pe) || O(Pe, !0, [Pe], xe.nativeEvent);
                    }
                  }
                ),
                null
              ),
              checked: de
            };
          })
        : (_e = J => {
            let { record: se, index: ue } = J;
            var Pe;
            const de = Q.value(se, ue),
              xe = j.has(de),
              ke = p.value.has(de),
              K = f.value.get(de);
            let P;
            return (
              B.value === 'nest'
                ? ((P = ke),
                  We(
                    typeof (K == null ? void 0 : K.indeterminate) != 'boolean',
                    'Table',
                    'set `indeterminate` using `rowSelection.getCheckboxProps` is not allowed with tree structured dataSource.'
                  ))
                : (P =
                    (Pe = K == null ? void 0 : K.indeterminate) !== null &&
                    Pe !== void 0
                      ? Pe
                      : ke),
              {
                node: h(
                  ut,
                  W(
                    W({}, K),
                    {},
                    {
                      indeterminate: P,
                      checked: xe,
                      skipGroup: !0,
                      onClick: R => R.stopPropagation(),
                      onChange: R => {
                        let { nativeEvent: te } = R;
                        const { shiftKey: ge } = te;
                        let we = -1,
                          N = -1;
                        if (ge && X) {
                          const _ = new Set([$.value, de]);
                          ne.some((z, V) => {
                            if (_.has(z))
                              if (we === -1) we = V;
                              else return (N = V), !0;
                            return !1;
                          });
                        }
                        if (N !== -1 && we !== N && X) {
                          const _ = ne.slice(we, N + 1),
                            z = [];
                          xe
                            ? _.forEach(le => {
                                j.has(le) && (z.push(le), j.delete(le));
                              })
                            : _.forEach(le => {
                                j.has(le) || (z.push(le), j.add(le));
                              });
                          const V = Array.from(j);
                          A == null ||
                            A(
                              !xe,
                              V.map(le => L(le)),
                              z.map(le => L(le))
                            ),
                            S(V);
                        } else {
                          const _ = b.value;
                          if (X) {
                            const z = xe ? ot(_, de) : ct(_, de);
                            O(de, !xe, z, te);
                          } else {
                            const z = Tt(
                                [..._, de],
                                !0,
                                i.value,
                                c.value,
                                u.value,
                                y
                              ),
                              { checkedKeys: V, halfCheckedKeys: le } = z;
                            let re = V;
                            if (xe) {
                              const q = new Set(V);
                              q.delete(de),
                                (re = Tt(
                                  Array.from(q),
                                  { checked: !1, halfCheckedKeys: le },
                                  i.value,
                                  c.value,
                                  u.value,
                                  y
                                ).checkedKeys);
                            }
                            O(de, !xe, re, te);
                          }
                        }
                        m(de);
                      }
                    }
                  ),
                  null
                ),
                checked: xe
              }
            );
          });
      const je = J => {
        let { record: se, index: ue } = J;
        const { node: Pe, checked: de } = _e({ record: se, index: ue });
        return Z ? Z(de, se, ue, Pe) : Pe;
      };
      if (!M.includes(Ze))
        if (
          M.findIndex(J => {
            var se;
            return (
              ((se = J[Kt]) === null || se === void 0
                ? void 0
                : se.columnType) === 'EXPAND_COLUMN'
            );
          }) === 0
        ) {
          const [J, ...se] = M;
          M = [J, Ze, ...se];
        } else M = [Ze, ...M];
      const Ve = M.indexOf(Ze);
      M.filter(J => J === Ze).length > 1 &&
        We(!1, 'Table', 'Multiple `SELECTION_COLUMN` exist in `columns`.'),
        (M = M.filter((J, se) => J !== Ze || se === Ve));
      const Ne = M[Ve - 1],
        Ee = M[Ve + 1];
      let G = ee;
      G === void 0 &&
        ((Ee == null ? void 0 : Ee.fixed) !== void 0
          ? (G = Ee.fixed)
          : (Ne == null ? void 0 : Ne.fixed) !== void 0 && (G = Ne.fixed)),
        G &&
          Ne &&
          ((E = Ne[Kt]) === null || E === void 0 ? void 0 : E.columnType) ===
            'EXPAND_COLUMN' &&
          Ne.fixed === void 0 &&
          (Ne.fixed = G);
      const ce = {
        fixed: G,
        width: F,
        className: `${Y.value}-selection-column`,
        title: n.value.columnTitle || De,
        customRender: je,
        [Kt]: { class: `${Y.value}-selection-col` }
      };
      return M.map(J => (J === Ze ? ce : J));
    },
    d
  ];
}
var Pc =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
function It(e, t) {
  return 'key' in e && e.key !== void 0 && e.key !== null
    ? e.key
    : e.dataIndex
    ? Array.isArray(e.dataIndex)
      ? e.dataIndex.join('.')
      : e.dataIndex
    : t;
}
function Ht(e, t) {
  return t ? `${t}-${e}` : `${e}`;
}
function yo(e, t) {
  return typeof e == 'function' ? e(t) : e;
}
function ir() {
  let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : [];
  const t = Un(e),
    n = [];
  return (
    t.forEach(o => {
      var l, r, a, i;
      if (!o) return;
      const s = o.key,
        f = ((l = o.props) === null || l === void 0 ? void 0 : l.style) || {},
        c = ((r = o.props) === null || r === void 0 ? void 0 : r.class) || '',
        u = o.props || {};
      for (const [d, p] of Object.entries(u)) u[ml(d)] = p;
      const y = o.children || {},
        { default: x } = y,
        b = Pc(y, ['default']),
        v = g(g(g({}, b), u), { style: f, class: c });
      if (
        (s && (v.key = s),
        !((a = o.type) === null || a === void 0) && a.__ANT_TABLE_COLUMN_GROUP)
      )
        v.children = ir(typeof x == 'function' ? x() : x);
      else {
        const d =
          (i = o.children) === null || i === void 0 ? void 0 : i.default;
        v.customRender = v.customRender || d;
      }
      n.push(v);
    }),
    n
  );
}
const Jt = 'ascend',
  gn = 'descend';
function on(e) {
  return typeof e.sorter == 'object' && typeof e.sorter.multiple == 'number'
    ? e.sorter.multiple
    : !1;
}
function tl(e) {
  return typeof e == 'function'
    ? e
    : e && typeof e == 'object' && e.compare
    ? e.compare
    : !1;
}
function kc(e, t) {
  return t ? e[e.indexOf(t) + 1] : e[0];
}
function jn(e, t, n) {
  let o = [];
  function l(r, a) {
    o.push({
      column: r,
      key: It(r, a),
      multiplePriority: on(r),
      sortOrder: r.sortOrder
    });
  }
  return (
    (e || []).forEach((r, a) => {
      const i = Ht(a, n);
      r.children
        ? ('sortOrder' in r && l(r, i), (o = [...o, ...jn(r.children, t, i)]))
        : r.sorter &&
          ('sortOrder' in r
            ? l(r, i)
            : t &&
              r.defaultSortOrder &&
              o.push({
                column: r,
                key: It(r, i),
                multiplePriority: on(r),
                sortOrder: r.defaultSortOrder
              }));
    }),
    o
  );
}
function sr(e, t, n, o, l, r, a, i) {
  return (t || []).map((s, f) => {
    const c = Ht(f, i);
    let u = s;
    if (u.sorter) {
      const y = u.sortDirections || l,
        x = u.showSorterTooltip === void 0 ? a : u.showSorterTooltip,
        b = It(u, c),
        v = n.find(C => {
          let { key: E } = C;
          return E === b;
        }),
        d = v ? v.sortOrder : null,
        p = kc(y, d),
        $ =
          y.includes(Jt) &&
          h(
            Xi,
            {
              class: ie(`${e}-column-sorter-up`, { active: d === Jt }),
              role: 'presentation'
            },
            null
          ),
        m =
          y.includes(gn) &&
          h(
            Wi,
            {
              role: 'presentation',
              class: ie(`${e}-column-sorter-down`, { active: d === gn })
            },
            null
          ),
        { cancelSort: S, triggerAsc: O, triggerDesc: I } = r || {};
      let k = S;
      p === gn ? (k = I) : p === Jt && (k = O);
      const T = typeof x == 'object' ? x : { title: k };
      u = g(g({}, u), {
        className: ie(u.className, { [`${e}-column-sort`]: d }),
        title: C => {
          const E = h('div', { class: `${e}-column-sorters` }, [
            h('span', { class: `${e}-column-title` }, [yo(s.title, C)]),
            h(
              'span',
              {
                class: ie(`${e}-column-sorter`, {
                  [`${e}-column-sorter-full`]: !!($ && m)
                })
              },
              [h('span', { class: `${e}-column-sorter-inner` }, [$, m])]
            )
          ]);
          return x ? h(fa, T, { default: () => [E] }) : E;
        },
        customHeaderCell: C => {
          const E = (s.customHeaderCell && s.customHeaderCell(C)) || {},
            D = E.onClick,
            A = E.onKeydown;
          return (
            (E.onClick = F => {
              o({ column: s, key: b, sortOrder: p, multiplePriority: on(s) }),
                D && D(F);
            }),
            (E.onKeydown = F => {
              F.keyCode === ht.ENTER &&
                (o({
                  column: s,
                  key: b,
                  sortOrder: p,
                  multiplePriority: on(s)
                }),
                A == null || A(F));
            }),
            d && (E['aria-sort'] = d === 'ascend' ? 'ascending' : 'descending'),
            (E.class = ie(E.class, `${e}-column-has-sorters`)),
            (E.tabindex = 0),
            E
          );
        }
      });
    }
    return (
      'children' in u &&
        (u = g(g({}, u), { children: sr(e, u.children, n, o, l, r, a, c) })),
      u
    );
  });
}
function nl(e) {
  const { column: t, sortOrder: n } = e;
  return { column: t, order: n, field: t.dataIndex, columnKey: t.key };
}
function ol(e) {
  const t = e
    .filter(n => {
      let { sortOrder: o } = n;
      return o;
    })
    .map(nl);
  return t.length === 0 && e.length
    ? g(g({}, nl(e[e.length - 1])), { column: void 0 })
    : t.length <= 1
    ? t[0] || {}
    : t;
}
function Ln(e, t, n) {
  const o = t.slice().sort((a, i) => i.multiplePriority - a.multiplePriority),
    l = e.slice(),
    r = o.filter(a => {
      let {
        column: { sorter: i },
        sortOrder: s
      } = a;
      return tl(i) && s;
    });
  return r.length
    ? l
        .sort((a, i) => {
          for (let s = 0; s < r.length; s += 1) {
            const f = r[s],
              {
                column: { sorter: c },
                sortOrder: u
              } = f,
              y = tl(c);
            if (y && u) {
              const x = y(a, i, u);
              if (x !== 0) return u === Jt ? x : -x;
            }
          }
          return 0;
        })
        .map(a => {
          const i = a[n];
          return i ? g(g({}, a), { [n]: Ln(i, t, n) }) : a;
        })
    : l;
}
function Ic(e) {
  let {
    prefixCls: t,
    mergedColumns: n,
    onSorterChange: o,
    sortDirections: l,
    tableLocale: r,
    showSorterTooltip: a
  } = e;
  const [i, s] = Ot(jn(n.value, !0)),
    f = w(() => {
      let b = !0;
      const v = jn(n.value, !1);
      if (!v.length) return i.value;
      const d = [];
      function p(m) {
        b ? d.push(m) : d.push(g(g({}, m), { sortOrder: null }));
      }
      let $ = null;
      return (
        v.forEach(m => {
          $ === null
            ? (p(m),
              m.sortOrder && (m.multiplePriority === !1 ? (b = !1) : ($ = !0)))
            : (($ && m.multiplePriority !== !1) || (b = !1), p(m));
        }),
        d
      );
    }),
    c = w(() => {
      const b = f.value.map(v => {
        let { column: d, sortOrder: p } = v;
        return { column: d, order: p };
      });
      return {
        sortColumns: b,
        sortColumn: b[0] && b[0].column,
        sortOrder: b[0] && b[0].order
      };
    });
  function u(b) {
    let v;
    b.multiplePriority === !1 ||
    !f.value.length ||
    f.value[0].multiplePriority === !1
      ? (v = [b])
      : (v = [
          ...f.value.filter(d => {
            let { key: p } = d;
            return p !== b.key;
          }),
          b
        ]),
      s(v),
      o(ol(v), v);
  }
  const y = b => sr(t.value, b, f.value, u, l.value, r.value, a.value),
    x = w(() => ol(f.value));
  return [y, f, c, x];
}
const Ec = e => {
    const { keyCode: t } = e;
    t === ht.ENTER && e.stopPropagation();
  },
  Tc = (e, t) => {
    let { slots: n } = t;
    var o;
    return h('div', { onClick: l => l.stopPropagation(), onKeydown: Ec }, [
      (o = n.default) === null || o === void 0 ? void 0 : o.call(n)
    ]);
  },
  Kc = Tc,
  ll = ve({
    compatConfig: { MODE: 3 },
    name: 'FilterSearch',
    inheritAttrs: !1,
    props: {
      value: Ue(),
      onChange: ye(),
      filterSearch: Ge([Boolean, Function]),
      tablePrefixCls: Ue(),
      locale: rt()
    },
    setup(e) {
      return () => {
        const {
          value: t,
          onChange: n,
          filterSearch: o,
          tablePrefixCls: l,
          locale: r
        } = e;
        return o
          ? h('div', { class: `${l}-filter-dropdown-search` }, [
              h(
                Ea,
                {
                  placeholder: r.filterSearchPlaceholder,
                  onChange: n,
                  value: t,
                  htmlSize: 1,
                  class: `${l}-filter-dropdown-search-input`
                },
                { prefix: () => h(Ta, null, null) }
              )
            ])
          : null;
      };
    }
  });
var rl =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const Dc = ve({
  compatConfig: { MODE: 3 },
  name: 'MotionTreeNode',
  inheritAttrs: !1,
  props: g(g({}, _l), {
    active: Boolean,
    motion: Object,
    motionNodes: { type: Array },
    onMotionStart: Function,
    onMotionEnd: Function,
    motionType: String
  }),
  setup(e, t) {
    let { attrs: n, slots: o } = t;
    const l = ae(!0),
      r = to(),
      a = ae(!1),
      i = w(() => (e.motion ? e.motion : pa())),
      s = (f, c) => {
        var u, y, x, b;
        c === 'appear'
          ? (y =
              (u = i.value) === null || u === void 0
                ? void 0
                : u.onAfterEnter) === null ||
            y === void 0 ||
            y.call(u, f)
          : c === 'leave' &&
            ((b =
              (x = i.value) === null || x === void 0
                ? void 0
                : x.onAfterLeave) === null ||
              b === void 0 ||
              b.call(x, f)),
          a.value || e.onMotionEnd(),
          (a.value = !0);
      };
    return (
      Te(
        () => e.motionNodes,
        () => {
          e.motionNodes &&
            e.motionType === 'hide' &&
            l.value &&
            ft(() => {
              l.value = !1;
            });
        },
        { immediate: !0, flush: 'post' }
      ),
      at(() => {
        e.motionNodes && e.onMotionStart();
      }),
      yt(() => {
        e.motionNodes && s();
      }),
      () => {
        const {
            motion: f,
            motionNodes: c,
            motionType: u,
            active: y,
            eventKey: x
          } = e,
          b = rl(e, [
            'motion',
            'motionNodes',
            'motionType',
            'active',
            'eventKey'
          ]);
        return c
          ? h(
              jr,
              W(
                W({}, i.value),
                {},
                {
                  appear: u === 'show',
                  onAfterAppear: v => s(v, 'appear'),
                  onAfterLeave: v => s(v, 'leave')
                }
              ),
              {
                default: () => [
                  Yn(
                    h(
                      'div',
                      { class: `${r.value.prefixCls}-treenode-motion` },
                      [
                        c.map(v => {
                          const d = rl(v.data, []),
                            { title: p, key: $, isStart: m, isEnd: S } = v;
                          return (
                            delete d.children,
                            h(
                              In,
                              W(
                                W({}, d),
                                {},
                                {
                                  title: p,
                                  active: y,
                                  data: v.data,
                                  key: $,
                                  eventKey: $,
                                  isStart: m,
                                  isEnd: S
                                }
                              ),
                              o
                            )
                          );
                        })
                      ]
                    ),
                    [[Mr, l.value]]
                  )
                ]
              }
            )
          : h(
              In,
              W(
                W({ class: n.class, style: n.style }, b),
                {},
                { active: y, eventKey: x }
              ),
              o
            );
      }
    );
  }
});
function Nc() {
  let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : [],
    t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : [];
  const n = e.length,
    o = t.length;
  if (Math.abs(n - o) !== 1) return { add: !1, key: null };
  function l(r, a) {
    const i = new Map();
    r.forEach(f => {
      i.set(f, !0);
    });
    const s = a.filter(f => !i.has(f));
    return s.length === 1 ? s[0] : null;
  }
  return n < o ? { add: !0, key: l(e, t) } : { add: !1, key: l(t, e) };
}
function al(e, t, n) {
  const o = e.findIndex(a => a.key === n),
    l = e[o + 1],
    r = t.findIndex(a => a.key === n);
  if (l) {
    const a = t.findIndex(i => i.key === l.key);
    return t.slice(r + 1, a);
  }
  return t.slice(r + 1);
}
var il =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const sl = {
    width: 0,
    height: 0,
    display: 'flex',
    overflow: 'hidden',
    opacity: 0,
    border: 0,
    padding: 0,
    margin: 0
  },
  Rc = () => {},
  Et = `RC_TREE_MOTION_${Math.random()}`,
  Hn = { key: Et },
  cr = { key: Et, level: 0, index: 0, pos: '0', node: Hn, nodes: [Hn] },
  cl = {
    parent: null,
    children: [],
    pos: cr.pos,
    data: Hn,
    title: null,
    key: Et,
    isStart: [],
    isEnd: []
  };
function dl(e, t, n, o) {
  return t === !1 || !n ? e : e.slice(0, Math.ceil(n / o) + 1);
}
function ul(e) {
  const { key: t, pos: n } = e;
  return Lt(t, n);
}
function Bc(e) {
  let t = String(e.key),
    n = e;
  for (; n.parent; ) (n = n.parent), (t = `${n.key} > ${t}`);
  return t;
}
const _c = ve({
  compatConfig: { MODE: 3 },
  name: 'NodeList',
  inheritAttrs: !1,
  props: Si,
  setup(e, t) {
    let { expose: n, attrs: o } = t;
    const l = pe(),
      r = pe(),
      { expandedKeys: a, flattenNodes: i } = Bl();
    n({
      scrollTo: v => {
        l.value.scrollTo(v);
      },
      getIndentWidth: () => r.value.offsetWidth
    });
    const s = ae(i.value),
      f = ae([]),
      c = pe(null);
    function u() {
      (s.value = i.value),
        (f.value = []),
        (c.value = null),
        e.onListChangeEnd();
    }
    const y = to();
    Te([() => a.value.slice(), i], (v, d) => {
      let [p, $] = v,
        [m, S] = d;
      const O = Nc(m, p);
      if (O.key !== null) {
        const { virtual: I, height: k, itemHeight: T } = e;
        if (O.add) {
          const C = S.findIndex(A => {
              let { key: F } = A;
              return F === O.key;
            }),
            E = dl(al(S, $, O.key), I, k, T),
            D = S.slice();
          D.splice(C + 1, 0, cl),
            (s.value = D),
            (f.value = E),
            (c.value = 'show');
        } else {
          const C = $.findIndex(A => {
              let { key: F } = A;
              return F === O.key;
            }),
            E = dl(al($, S, O.key), I, k, T),
            D = $.slice();
          D.splice(C + 1, 0, cl),
            (s.value = D),
            (f.value = E),
            (c.value = 'hide');
        }
      } else S !== $ && (s.value = $);
    }),
      Te(
        () => y.value.dragging,
        v => {
          v || u();
        }
      );
    const x = w(() => (e.motion === void 0 ? s.value : i.value)),
      b = () => {
        e.onActiveChange(null);
      };
    return () => {
      const v = g(g({}, e), o),
        {
          prefixCls: d,
          selectable: p,
          checkable: $,
          disabled: m,
          motion: S,
          height: O,
          itemHeight: I,
          virtual: k,
          focusable: T,
          activeItem: C,
          focused: E,
          tabindex: D,
          onKeydown: A,
          onFocus: F,
          onBlur: U,
          onListChangeStart: ee,
          onListChangeEnd: Z
        } = v,
        he = il(v, [
          'prefixCls',
          'selectable',
          'checkable',
          'disabled',
          'motion',
          'height',
          'itemHeight',
          'virtual',
          'focusable',
          'activeItem',
          'focused',
          'tabindex',
          'onKeydown',
          'onFocus',
          'onBlur',
          'onListChangeStart',
          'onListChangeEnd'
        ]);
      return h(mt, null, [
        E && C && h('span', { style: sl, 'aria-live': 'assertive' }, [Bc(C)]),
        h('div', null, [
          h(
            'input',
            {
              style: sl,
              disabled: T === !1 || m,
              tabindex: T !== !1 ? D : null,
              onKeydown: A,
              onFocus: F,
              onBlur: U,
              value: '',
              onChange: Rc,
              'aria-label': 'for screen reader'
            },
            null
          )
        ]),
        h(
          'div',
          {
            class: `${d}-treenode`,
            'aria-hidden': !0,
            style: {
              position: 'absolute',
              pointerEvents: 'none',
              visibility: 'hidden',
              height: 0,
              overflow: 'hidden'
            }
          },
          [
            h('div', { class: `${d}-indent` }, [
              h('div', { ref: r, class: `${d}-indent-unit` }, null)
            ])
          ]
        ),
        h(
          Ka,
          W(
            W({}, Bt(he, ['onActiveChange'])),
            {},
            {
              data: x.value,
              itemKey: ul,
              height: O,
              fullHeight: !1,
              virtual: k,
              itemHeight: I,
              prefixCls: `${d}-list`,
              ref: l,
              onVisibleChange: (X, Y) => {
                const L = new Set(X);
                Y.filter(B => !L.has(B)).some(B => ul(B) === Et) && u();
              }
            }
          ),
          {
            default: X => {
              const { pos: Y } = X,
                L = il(X.data, []),
                { title: Q, key: B, isStart: H, isEnd: M } = X,
                j = Lt(B, Y);
              return (
                delete L.key,
                delete L.children,
                h(
                  Dc,
                  W(
                    W({}, L),
                    {},
                    {
                      eventKey: j,
                      title: Q,
                      active: !!C && B === C.key,
                      data: X.data,
                      isStart: H,
                      isEnd: M,
                      motion: S,
                      motionNodes: B === Et ? f.value : null,
                      motionType: c.value,
                      onMotionStart: ee,
                      onMotionEnd: u,
                      onMousemove: b
                    }
                  ),
                  null
                )
              );
            }
          }
        )
      ]);
    };
  }
});
function Ac(e) {
  let { dropPosition: t, dropLevelOffset: n, indent: o } = e;
  const l = {
    pointerEvents: 'none',
    position: 'absolute',
    right: 0,
    backgroundColor: 'red',
    height: '2px'
  };
  switch (t) {
    case -1:
      (l.top = 0), (l.left = `${-n * o}px`);
      break;
    case 1:
      (l.bottom = 0), (l.left = `${-n * o}px`);
      break;
    case 0:
      (l.bottom = 0), (l.left = `${o}`);
      break;
  }
  return h('div', { style: l }, null);
}
const Fc = 10,
  zc = ve({
    compatConfig: { MODE: 3 },
    name: 'Tree',
    inheritAttrs: !1,
    props: bt(Al(), {
      prefixCls: 'vc-tree',
      showLine: !1,
      showIcon: !0,
      selectable: !0,
      multiple: !1,
      checkable: !1,
      disabled: !1,
      checkStrictly: !1,
      draggable: !1,
      expandAction: !1,
      defaultExpandParent: !0,
      autoExpandParent: !1,
      defaultExpandAll: !1,
      defaultExpandedKeys: [],
      defaultCheckedKeys: [],
      defaultSelectedKeys: [],
      dropIndicatorRender: Ac,
      allowDrop: () => !0
    }),
    setup(e, t) {
      let { attrs: n, slots: o, expose: l } = t;
      const r = ae(!1);
      let a = {};
      const i = ae(),
        s = ae([]),
        f = ae([]),
        c = ae([]),
        u = ae([]),
        y = ae([]),
        x = ae([]),
        b = {},
        v = gt({
          draggingNodeKey: null,
          dragChildrenKeys: [],
          dropTargetKey: null,
          dropPosition: null,
          dropContainerKey: null,
          dropLevelOffset: null,
          dropTargetPos: null,
          dropAllowed: !0,
          dragOverNodeKey: null
        }),
        d = ae([]);
      Te(
        [() => e.treeData, () => e.children],
        () => {
          d.value =
            e.treeData !== void 0 ? fn(e.treeData).slice() : Tn(fn(e.children));
        },
        { immediate: !0, deep: !0 }
      );
      const p = ae({}),
        $ = ae(!1),
        m = ae(null),
        S = ae(!1),
        O = w(() => rn(e.fieldNames)),
        I = ae();
      let k = null,
        T = null,
        C = null;
      const E = w(() => ({
          expandedKeysSet: D.value,
          selectedKeysSet: A.value,
          loadedKeysSet: F.value,
          loadingKeysSet: U.value,
          checkedKeysSet: ee.value,
          halfCheckedKeysSet: Z.value,
          dragOverNodeKey: v.dragOverNodeKey,
          dropPosition: v.dropPosition,
          keyEntities: p.value
        })),
        D = w(() => new Set(x.value)),
        A = w(() => new Set(s.value)),
        F = w(() => new Set(u.value)),
        U = w(() => new Set(y.value)),
        ee = w(() => new Set(f.value)),
        Z = w(() => new Set(c.value));
      Re(() => {
        if (d.value) {
          const N = oo(d.value, { fieldNames: O.value });
          p.value = g({ [Et]: cr }, N.keyEntities);
        }
      });
      let he = !1;
      Te(
        [() => e.expandedKeys, () => e.autoExpandParent, p],
        (N, _) => {
          let [z, V] = N,
            [le, re] = _,
            q = x.value;
          if (e.expandedKeys !== void 0 || (he && V !== re))
            q =
              e.autoExpandParent || (!he && e.defaultExpandParent)
                ? En(e.expandedKeys, p.value)
                : e.expandedKeys;
          else if (!he && e.defaultExpandAll) {
            const Se = g({}, p.value);
            delete Se[Et], (q = Object.keys(Se).map(Oe => Se[Oe].key));
          } else
            !he &&
              e.defaultExpandedKeys &&
              (q =
                e.autoExpandParent || e.defaultExpandParent
                  ? En(e.defaultExpandedKeys, p.value)
                  : e.defaultExpandedKeys);
          q && (x.value = q), (he = !0);
        },
        { immediate: !0 }
      );
      const X = ae([]);
      Re(() => {
        X.value = Ti(d.value, x.value, O.value);
      }),
        Re(() => {
          e.selectable &&
            (e.selectedKeys !== void 0
              ? (s.value = Ro(e.selectedKeys, e))
              : !he &&
                e.defaultSelectedKeys &&
                (s.value = Ro(e.defaultSelectedKeys, e)));
        });
      const { maxLevel: Y, levelEntities: L } = Ml(p);
      Re(() => {
        if (e.checkable) {
          let N;
          if (
            (e.checkedKeys !== void 0
              ? (N = hn(e.checkedKeys) || {})
              : !he && e.defaultCheckedKeys
              ? (N = hn(e.defaultCheckedKeys) || {})
              : d.value &&
                (N = hn(e.checkedKeys) || {
                  checkedKeys: f.value,
                  halfCheckedKeys: c.value
                }),
            N)
          ) {
            let { checkedKeys: _ = [], halfCheckedKeys: z = [] } = N;
            e.checkStrictly ||
              ({ checkedKeys: _, halfCheckedKeys: z } = Tt(
                _,
                !0,
                p.value,
                Y.value,
                L.value
              )),
              (f.value = _),
              (c.value = z);
          }
        }
      }),
        Re(() => {
          e.loadedKeys && (u.value = e.loadedKeys);
        });
      const Q = () => {
          g(v, {
            dragOverNodeKey: null,
            dropPosition: null,
            dropLevelOffset: null,
            dropTargetKey: null,
            dropContainerKey: null,
            dropTargetPos: null,
            dropAllowed: !1
          });
        },
        B = N => {
          I.value.scrollTo(N);
        };
      Te(
        () => e.activeKey,
        () => {
          e.activeKey !== void 0 && (m.value = e.activeKey);
        },
        { immediate: !0 }
      ),
        Te(
          m,
          N => {
            ft(() => {
              N !== null && B({ key: N });
            });
          },
          { immediate: !0, flush: 'post' }
        );
      const H = N => {
          e.expandedKeys === void 0 && (x.value = N);
        },
        M = () => {
          v.draggingNodeKey !== null &&
            g(v, {
              draggingNodeKey: null,
              dropPosition: null,
              dropContainerKey: null,
              dropTargetKey: null,
              dropLevelOffset: null,
              dropAllowed: !0,
              dragOverNodeKey: null
            }),
            (k = null),
            (C = null);
        },
        j = (N, _) => {
          const { onDragend: z } = e;
          (v.dragOverNodeKey = null),
            M(),
            z == null || z({ event: N, node: _.eventData }),
            (T = null);
        },
        ne = N => {
          j(N, null), window.removeEventListener('dragend', ne);
        },
        oe = (N, _) => {
          const { onDragstart: z } = e,
            { eventKey: V, eventData: le } = _;
          (T = _), (k = { x: N.clientX, y: N.clientY });
          const re = ot(x.value, V);
          (v.draggingNodeKey = V),
            (v.dragChildrenKeys = Pi(V, p.value)),
            (i.value = I.value.getIndentWidth()),
            H(re),
            window.addEventListener('dragend', ne),
            z && z({ event: N, node: le });
        },
        Ke = (N, _) => {
          const {
              onDragenter: z,
              onExpand: V,
              allowDrop: le,
              direction: re
            } = e,
            { pos: q, eventKey: Se } = _;
          if ((C !== Se && (C = Se), !T)) {
            Q();
            return;
          }
          const {
            dropPosition: Oe,
            dropLevelOffset: be,
            dropTargetKey: Ce,
            dropContainerKey: $e,
            dropTargetPos: Be,
            dropAllowed: Fe,
            dragOverNodeKey: He
          } = No(N, T, _, i.value, k, le, X.value, p.value, D.value, re);
          if (v.dragChildrenKeys.indexOf(Ce) !== -1 || !Fe) {
            Q();
            return;
          }
          if (
            (a || (a = {}),
            Object.keys(a).forEach(Ae => {
              clearTimeout(a[Ae]);
            }),
            T.eventKey !== _.eventKey &&
              (a[q] = window.setTimeout(() => {
                if (v.draggingNodeKey === null) return;
                let Ae = x.value.slice();
                const nt = p.value[_.eventKey];
                nt &&
                  (nt.children || []).length &&
                  (Ae = ct(x.value, _.eventKey)),
                  H(Ae),
                  V &&
                    V(Ae, { node: _.eventData, expanded: !0, nativeEvent: N });
              }, 800)),
            T.eventKey === Ce && be === 0)
          ) {
            Q();
            return;
          }
          g(v, {
            dragOverNodeKey: He,
            dropPosition: Oe,
            dropLevelOffset: be,
            dropTargetKey: Ce,
            dropContainerKey: $e,
            dropTargetPos: Be,
            dropAllowed: Fe
          }),
            z && z({ event: N, node: _.eventData, expandedKeys: x.value });
        },
        Ie = (N, _) => {
          const { onDragover: z, allowDrop: V, direction: le } = e;
          if (!T) return;
          const {
            dropPosition: re,
            dropLevelOffset: q,
            dropTargetKey: Se,
            dropContainerKey: Oe,
            dropAllowed: be,
            dropTargetPos: Ce,
            dragOverNodeKey: $e
          } = No(N, T, _, i.value, k, V, X.value, p.value, D.value, le);
          v.dragChildrenKeys.indexOf(Se) !== -1 ||
            !be ||
            (T.eventKey === Se && q === 0
              ? (v.dropPosition === null &&
                  v.dropLevelOffset === null &&
                  v.dropTargetKey === null &&
                  v.dropContainerKey === null &&
                  v.dropTargetPos === null &&
                  v.dropAllowed === !1 &&
                  v.dragOverNodeKey === null) ||
                Q()
              : (re === v.dropPosition &&
                  q === v.dropLevelOffset &&
                  Se === v.dropTargetKey &&
                  Oe === v.dropContainerKey &&
                  Ce === v.dropTargetPos &&
                  be === v.dropAllowed &&
                  $e === v.dragOverNodeKey) ||
                g(v, {
                  dropPosition: re,
                  dropLevelOffset: q,
                  dropTargetKey: Se,
                  dropContainerKey: Oe,
                  dropTargetPos: Ce,
                  dropAllowed: be,
                  dragOverNodeKey: $e
                }),
            z && z({ event: N, node: _.eventData }));
        },
        De = (N, _) => {
          C === _.eventKey &&
            !N.currentTarget.contains(N.relatedTarget) &&
            (Q(), (C = null));
          const { onDragleave: z } = e;
          z && z({ event: N, node: _.eventData });
        },
        _e = function(N, _) {
          let z =
            arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !1;
          var V;
          const {
            dragChildrenKeys: le,
            dropPosition: re,
            dropTargetKey: q,
            dropTargetPos: Se,
            dropAllowed: Oe
          } = v;
          if (!Oe) return;
          const { onDrop: be } = e;
          if (((v.dragOverNodeKey = null), M(), q === null)) return;
          const Ce = g(g({}, Ut(q, fn(E.value))), {
              active:
                ((V = R.value) === null || V === void 0 ? void 0 : V.key) === q,
              data: p.value[q].node
            }),
            $e = le.indexOf(q) !== -1;
          Me(
            !$e,
            "Can not drop to dragNode's children node. Maybe this is a bug of ant-design-vue. Please report an issue."
          );
          const Be = no(Se),
            Fe = {
              event: N,
              node: qt(Ce),
              dragNode: T ? T.eventData : null,
              dragNodesKeys: [T.eventKey].concat(le),
              dropToGap: re !== 0,
              dropPosition: re + Number(Be[Be.length - 1])
            };
          z || be == null || be(Fe), (T = null);
        },
        je = (N, _) => {
          const { expanded: z, key: V } = _,
            le = X.value.filter(q => q.key === V)[0],
            re = qt(g(g({}, Ut(V, E.value)), { data: le.data }));
          H(z ? ot(x.value, V) : ct(x.value, V)), xe(N, re);
        },
        Ve = (N, _) => {
          const { onClick: z, expandAction: V } = e;
          V === 'click' && je(N, _), z && z(N, _);
        },
        Ne = (N, _) => {
          const { onDblclick: z, expandAction: V } = e;
          (V === 'doubleclick' || V === 'dblclick') && je(N, _), z && z(N, _);
        },
        Ee = (N, _) => {
          let z = s.value;
          const { onSelect: V, multiple: le } = e,
            { selected: re } = _,
            q = _[O.value.key],
            Se = !re;
          Se ? (le ? (z = ct(z, q)) : (z = [q])) : (z = ot(z, q));
          const Oe = p.value,
            be = z
              .map(Ce => {
                const $e = Oe[Ce];
                return $e ? $e.node : null;
              })
              .filter(Ce => Ce);
          e.selectedKeys === void 0 && (s.value = z),
            V &&
              V(z, {
                event: 'select',
                selected: Se,
                node: _,
                selectedNodes: be,
                nativeEvent: N
              });
        },
        G = (N, _, z) => {
          const { checkStrictly: V, onCheck: le } = e,
            re = _[O.value.key];
          let q;
          const Se = { event: 'check', node: _, checked: z, nativeEvent: N },
            Oe = p.value;
          if (V) {
            const be = z ? ct(f.value, re) : ot(f.value, re),
              Ce = ot(c.value, re);
            (q = { checked: be, halfChecked: Ce }),
              (Se.checkedNodes = be
                .map($e => Oe[$e])
                .filter($e => $e)
                .map($e => $e.node)),
              e.checkedKeys === void 0 && (f.value = be);
          } else {
            let { checkedKeys: be, halfCheckedKeys: Ce } = Tt(
              [...f.value, re],
              !0,
              Oe,
              Y.value,
              L.value
            );
            if (!z) {
              const $e = new Set(be);
              $e.delete(re),
                ({ checkedKeys: be, halfCheckedKeys: Ce } = Tt(
                  Array.from($e),
                  { checked: !1, halfCheckedKeys: Ce },
                  Oe,
                  Y.value,
                  L.value
                ));
            }
            (q = be),
              (Se.checkedNodes = []),
              (Se.checkedNodesPositions = []),
              (Se.halfCheckedKeys = Ce),
              be.forEach($e => {
                const Be = Oe[$e];
                if (!Be) return;
                const { node: Fe, pos: He } = Be;
                Se.checkedNodes.push(Fe),
                  Se.checkedNodesPositions.push({ node: Fe, pos: He });
              }),
              e.checkedKeys === void 0 && ((f.value = be), (c.value = Ce));
          }
          le && le(q, Se);
        },
        ce = N => {
          const _ = N[O.value.key],
            z = new Promise((V, le) => {
              const { loadData: re, onLoad: q } = e;
              if (!re || F.value.has(_) || U.value.has(_)) return null;
              re(N)
                .then(() => {
                  const Oe = ct(u.value, _),
                    be = ot(y.value, _);
                  q && q(Oe, { event: 'load', node: N }),
                    e.loadedKeys === void 0 && (u.value = Oe),
                    (y.value = be),
                    V();
                })
                .catch(Oe => {
                  const be = ot(y.value, _);
                  if (((y.value = be), (b[_] = (b[_] || 0) + 1), b[_] >= Fc)) {
                    Me(
                      !1,
                      'Retry for `loadData` many times but still failed. No more retry.'
                    );
                    const Ce = ct(u.value, _);
                    e.loadedKeys === void 0 && (u.value = Ce), V();
                  }
                  le(Oe);
                }),
                (y.value = ct(y.value, _));
            });
          return z.catch(() => {}), z;
        },
        J = (N, _) => {
          const { onMouseenter: z } = e;
          z && z({ event: N, node: _ });
        },
        se = (N, _) => {
          const { onMouseleave: z } = e;
          z && z({ event: N, node: _ });
        },
        ue = (N, _) => {
          const { onRightClick: z } = e;
          z && (N.preventDefault(), z({ event: N, node: _ }));
        },
        Pe = N => {
          const { onFocus: _ } = e;
          ($.value = !0), _ && _(N);
        },
        de = N => {
          const { onBlur: _ } = e;
          ($.value = !1), P(null), _ && _(N);
        },
        xe = (N, _) => {
          let z = x.value;
          const { onExpand: V, loadData: le } = e,
            { expanded: re } = _,
            q = _[O.value.key];
          if (S.value) return;
          const Se = z.indexOf(q),
            Oe = !re;
          if (
            (Me(
              (re && Se !== -1) || (!re && Se === -1),
              'Expand state not sync with index check'
            ),
            Oe ? (z = ct(z, q)) : (z = ot(z, q)),
            H(z),
            V && V(z, { node: _, expanded: Oe, nativeEvent: N }),
            Oe && le)
          ) {
            const be = ce(_);
            be &&
              be
                .then(() => {})
                .catch(Ce => {
                  const $e = ot(x.value, q);
                  H($e), Promise.reject(Ce);
                });
          }
        },
        ke = () => {
          S.value = !0;
        },
        K = () => {
          setTimeout(() => {
            S.value = !1;
          });
        },
        P = N => {
          const { onActiveChange: _ } = e;
          m.value !== N &&
            (e.activeKey !== void 0 && (m.value = N),
            N !== null && B({ key: N }),
            _ && _(N));
        },
        R = w(() =>
          m.value === null
            ? null
            : X.value.find(N => {
                let { key: _ } = N;
                return _ === m.value;
              }) || null
        ),
        te = N => {
          let _ = X.value.findIndex(V => {
            let { key: le } = V;
            return le === m.value;
          });
          _ === -1 && N < 0 && (_ = X.value.length),
            (_ = (_ + N + X.value.length) % X.value.length);
          const z = X.value[_];
          if (z) {
            const { key: V } = z;
            P(V);
          } else P(null);
        },
        ge = w(() =>
          qt(g(g({}, Ut(m.value, E.value)), { data: R.value.data, active: !0 }))
        ),
        we = N => {
          const { onKeydown: _, checkable: z, selectable: V } = e;
          switch (N.which) {
            case ht.UP: {
              te(-1), N.preventDefault();
              break;
            }
            case ht.DOWN: {
              te(1), N.preventDefault();
              break;
            }
          }
          const le = R.value;
          if (le && le.data) {
            const re =
                le.data.isLeaf === !1 || !!(le.data.children || []).length,
              q = ge.value;
            switch (N.which) {
              case ht.LEFT: {
                re && D.value.has(m.value)
                  ? xe({}, q)
                  : le.parent && P(le.parent.key),
                  N.preventDefault();
                break;
              }
              case ht.RIGHT: {
                re && !D.value.has(m.value)
                  ? xe({}, q)
                  : le.children && le.children.length && P(le.children[0].key),
                  N.preventDefault();
                break;
              }
              case ht.ENTER:
              case ht.SPACE: {
                z && !q.disabled && q.checkable !== !1 && !q.disableCheckbox
                  ? G({}, q, !ee.value.has(m.value))
                  : !z && V && !q.disabled && q.selectable !== !1 && Ee({}, q);
                break;
              }
            }
          }
          _ && _(N);
        };
      return (
        l({
          onNodeExpand: xe,
          scrollTo: B,
          onKeydown: we,
          selectedKeys: w(() => s.value),
          checkedKeys: w(() => f.value),
          halfCheckedKeys: w(() => c.value),
          loadedKeys: w(() => u.value),
          loadingKeys: w(() => y.value),
          expandedKeys: w(() => x.value)
        }),
        qn(() => {
          window.removeEventListener('dragend', ne), (r.value = !0);
        }),
        bi({
          expandedKeys: x,
          selectedKeys: s,
          loadedKeys: u,
          loadingKeys: y,
          checkedKeys: f,
          halfCheckedKeys: c,
          expandedKeysSet: D,
          selectedKeysSet: A,
          loadedKeysSet: F,
          loadingKeysSet: U,
          checkedKeysSet: ee,
          halfCheckedKeysSet: Z,
          flattenNodes: X
        }),
        () => {
          const {
              draggingNodeKey: N,
              dropLevelOffset: _,
              dropContainerKey: z,
              dropTargetKey: V,
              dropPosition: le,
              dragOverNodeKey: re
            } = v,
            {
              prefixCls: q,
              showLine: Se,
              focusable: Oe,
              tabindex: be = 0,
              selectable: Ce,
              showIcon: $e,
              icon: Be = o.icon,
              switcherIcon: Fe,
              draggable: He,
              checkable: Ae,
              checkStrictly: nt,
              disabled: pt,
              motion: xt,
              loadData: Wt,
              filterTreeNode: vt,
              height: dn,
              itemHeight: Vt,
              virtual: _t,
              dropIndicatorRender: mr,
              onContextmenu: yr,
              onScroll: br,
              direction: xr,
              rootClassName: Cr,
              rootStyle: Sr
            } = e,
            { class: $r, style: wr } = n,
            Or = eo(g(g({}, e), n), { aria: !0, data: !0 });
          let At;
          return (
            He
              ? typeof He == 'object'
                ? (At = He)
                : typeof He == 'function'
                ? (At = { nodeDraggable: He })
                : (At = {})
              : (At = !1),
            h(
              yi,
              {
                value: {
                  prefixCls: q,
                  selectable: Ce,
                  showIcon: $e,
                  icon: Be,
                  switcherIcon: Fe,
                  draggable: At,
                  draggingNodeKey: N,
                  checkable: Ae,
                  customCheckable: o.checkable,
                  checkStrictly: nt,
                  disabled: pt,
                  keyEntities: p.value,
                  dropLevelOffset: _,
                  dropContainerKey: z,
                  dropTargetKey: V,
                  dropPosition: le,
                  dragOverNodeKey: re,
                  dragging: N !== null,
                  indent: i.value,
                  direction: xr,
                  dropIndicatorRender: mr,
                  loadData: Wt,
                  filterTreeNode: vt,
                  onNodeClick: Ve,
                  onNodeDoubleClick: Ne,
                  onNodeExpand: xe,
                  onNodeSelect: Ee,
                  onNodeCheck: G,
                  onNodeLoad: ce,
                  onNodeMouseEnter: J,
                  onNodeMouseLeave: se,
                  onNodeContextMenu: ue,
                  onNodeDragStart: oe,
                  onNodeDragEnter: Ke,
                  onNodeDragOver: Ie,
                  onNodeDragLeave: De,
                  onNodeDragEnd: j,
                  onNodeDrop: _e,
                  slots: o
                }
              },
              {
                default: () => [
                  h(
                    'div',
                    {
                      role: 'tree',
                      class: ie(q, $r, Cr, {
                        [`${q}-show-line`]: Se,
                        [`${q}-focused`]: $.value,
                        [`${q}-active-focused`]: m.value !== null
                      }),
                      style: Sr
                    },
                    [
                      h(
                        _c,
                        W(
                          {
                            ref: I,
                            prefixCls: q,
                            style: wr,
                            disabled: pt,
                            selectable: Ce,
                            checkable: !!Ae,
                            motion: xt,
                            height: dn,
                            itemHeight: Vt,
                            virtual: _t,
                            focusable: Oe,
                            focused: $.value,
                            tabindex: be,
                            activeItem: R.value,
                            onFocus: Pe,
                            onBlur: de,
                            onKeydown: we,
                            onActiveChange: P,
                            onListChangeStart: ke,
                            onListChangeEnd: K,
                            onContextmenu: yr,
                            onScroll: br
                          },
                          Or
                        ),
                        null
                      )
                    ]
                  )
                ]
              }
            )
          );
        }
      );
    }
  });
function Mc(e, t, n, o, l) {
  const { isLeaf: r, expanded: a, loading: i } = n;
  let s = t;
  if (i) return h(Nr, { class: `${e}-switcher-loading-icon` }, null);
  let f;
  l && typeof l == 'object' && (f = l.showLeafIcon);
  let c = null;
  const u = `${e}-switcher-icon`;
  return r
    ? l
      ? f && o
        ? o(n)
        : (typeof l == 'object' && !f
            ? (c = h('span', { class: `${e}-switcher-leaf-line` }, null))
            : (c = h(Wl, { class: `${e}-switcher-line-icon` }, null)),
          c)
      : null
    : ((c = h(Li, { class: u }, null)),
      l &&
        (c = a
          ? h(os, { class: `${e}-switcher-line-icon` }, null)
          : h(rs, { class: `${e}-switcher-line-icon` }, null)),
      typeof t == 'function'
        ? (s = t(g(g({}, n), { defaultIcon: c, switcherCls: u })))
        : Dt(s) && (s = Lr(s, { class: u })),
      s || c);
}
const fl = 4;
function jc(e) {
  const {
      dropPosition: t,
      dropLevelOffset: n,
      prefixCls: o,
      indent: l,
      direction: r = 'ltr'
    } = e,
    a = r === 'ltr' ? 'left' : 'right',
    i = r === 'ltr' ? 'right' : 'left',
    s = { [a]: `${-n * l + fl}px`, [i]: 0 };
  switch (t) {
    case -1:
      s.top = '-3px';
      break;
    case 1:
      s.bottom = '-3px';
      break;
    default:
      (s.bottom = '-3px'), (s[a] = `${l + fl}px`);
      break;
  }
  return h('div', { style: s, class: `${o}-drop-indicator` }, null);
}
const Lc = new Gn('ant-tree-node-fx-do-not-use', {
    '0%': { opacity: 0 },
    '100%': { opacity: 1 }
  }),
  Hc = (e, t) => ({
    [`.${e}-switcher-icon`]: {
      display: 'inline-block',
      fontSize: 10,
      verticalAlign: 'baseline',
      svg: { transition: `transform ${t.motionDurationSlow}` }
    }
  }),
  Wc = (e, t) => ({
    [`.${e}-drop-indicator`]: {
      position: 'absolute',
      zIndex: 1,
      height: 2,
      backgroundColor: t.colorPrimary,
      borderRadius: 1,
      pointerEvents: 'none',
      '&:after': {
        position: 'absolute',
        top: -3,
        insetInlineStart: -6,
        width: 8,
        height: 8,
        backgroundColor: 'transparent',
        border: `${t.lineWidthBold}px solid ${t.colorPrimary}`,
        borderRadius: '50%',
        content: '""'
      }
    }
  }),
  Vc = (e, t) => {
    const {
        treeCls: n,
        treeNodeCls: o,
        treeNodePadding: l,
        treeTitleHeight: r
      } = t,
      a = (r - t.fontSizeLG) / 2,
      i = t.paddingXS;
    return {
      [n]: g(g({}, et(t)), {
        background: t.colorBgContainer,
        borderRadius: t.borderRadius,
        transition: `background-color ${t.motionDurationSlow}`,
        [`&${n}-rtl`]: {
          [`${n}-switcher`]: {
            '&_close': {
              [`${n}-switcher-icon`]: { svg: { transform: 'rotate(90deg)' } }
            }
          }
        },
        [`&-focused:not(:hover):not(${n}-active-focused)`]: g({}, kt(t)),
        [`${n}-list-holder-inner`]: { alignItems: 'flex-start' },
        [`&${n}-block-node`]: {
          [`${n}-list-holder-inner`]: {
            alignItems: 'stretch',
            [`${n}-node-content-wrapper`]: { flex: 'auto' },
            [`${o}.dragging`]: {
              position: 'relative',
              '&:after': {
                position: 'absolute',
                top: 0,
                insetInlineEnd: 0,
                bottom: l,
                insetInlineStart: 0,
                border: `1px solid ${t.colorPrimary}`,
                opacity: 0,
                animationName: Lc,
                animationDuration: t.motionDurationSlow,
                animationPlayState: 'running',
                animationFillMode: 'forwards',
                content: '""',
                pointerEvents: 'none'
              }
            }
          }
        },
        [`${o}`]: {
          display: 'flex',
          alignItems: 'flex-start',
          padding: `0 0 ${l}px 0`,
          outline: 'none',
          '&-rtl': { direction: 'rtl' },
          '&-disabled': {
            [`${n}-node-content-wrapper`]: {
              color: t.colorTextDisabled,
              cursor: 'not-allowed',
              '&:hover': { background: 'transparent' }
            }
          },
          [`&-active ${n}-node-content-wrapper`]: g({}, kt(t)),
          [`&:not(${o}-disabled).filter-node ${n}-title`]: {
            color: 'inherit',
            fontWeight: 500
          },
          '&-draggable': {
            [`${n}-draggable-icon`]: {
              width: r,
              lineHeight: `${r}px`,
              textAlign: 'center',
              visibility: 'visible',
              opacity: 0.2,
              transition: `opacity ${t.motionDurationSlow}`,
              [`${o}:hover &`]: { opacity: 0.45 }
            },
            [`&${o}-disabled`]: {
              [`${n}-draggable-icon`]: { visibility: 'hidden' }
            }
          }
        },
        [`${n}-indent`]: {
          alignSelf: 'stretch',
          whiteSpace: 'nowrap',
          userSelect: 'none',
          '&-unit': { display: 'inline-block', width: r }
        },
        [`${n}-draggable-icon`]: { visibility: 'hidden' },
        [`${n}-switcher`]: g(g({}, Hc(e, t)), {
          position: 'relative',
          flex: 'none',
          alignSelf: 'stretch',
          width: r,
          margin: 0,
          lineHeight: `${r}px`,
          textAlign: 'center',
          cursor: 'pointer',
          userSelect: 'none',
          '&-noop': { cursor: 'default' },
          '&_close': {
            [`${n}-switcher-icon`]: { svg: { transform: 'rotate(-90deg)' } }
          },
          '&-loading-icon': { color: t.colorPrimary },
          '&-leaf-line': {
            position: 'relative',
            zIndex: 1,
            display: 'inline-block',
            width: '100%',
            height: '100%',
            '&:before': {
              position: 'absolute',
              top: 0,
              insetInlineEnd: r / 2,
              bottom: -l,
              marginInlineStart: -1,
              borderInlineEnd: `1px solid ${t.colorBorder}`,
              content: '""'
            },
            '&:after': {
              position: 'absolute',
              width: (r / 2) * 0.8,
              height: r / 2,
              borderBottom: `1px solid ${t.colorBorder}`,
              content: '""'
            }
          }
        }),
        [`${n}-checkbox`]: {
          top: 'initial',
          marginInlineEnd: i,
          marginBlockStart: a
        },
        [`${n}-node-content-wrapper, ${n}-checkbox + span`]: {
          position: 'relative',
          zIndex: 'auto',
          minHeight: r,
          margin: 0,
          padding: `0 ${t.paddingXS / 2}px`,
          color: 'inherit',
          lineHeight: `${r}px`,
          background: 'transparent',
          borderRadius: t.borderRadius,
          cursor: 'pointer',
          transition: `all ${t.motionDurationMid}, border 0s, line-height 0s, box-shadow 0s`,
          '&:hover': { backgroundColor: t.controlItemBgHover },
          [`&${n}-node-selected`]: { backgroundColor: t.controlItemBgActive },
          [`${n}-iconEle`]: {
            display: 'inline-block',
            width: r,
            height: r,
            lineHeight: `${r}px`,
            textAlign: 'center',
            verticalAlign: 'top',
            '&:empty': { display: 'none' }
          }
        },
        [`${n}-unselectable ${n}-node-content-wrapper:hover`]: {
          backgroundColor: 'transparent'
        },
        [`${n}-node-content-wrapper`]: g(
          { lineHeight: `${r}px`, userSelect: 'none' },
          Wc(e, t)
        ),
        [`${o}.drop-container`]: {
          '> [draggable]': { boxShadow: `0 0 0 2px ${t.colorPrimary}` }
        },
        '&-show-line': {
          [`${n}-indent`]: {
            '&-unit': {
              position: 'relative',
              height: '100%',
              '&:before': {
                position: 'absolute',
                top: 0,
                insetInlineEnd: r / 2,
                bottom: -l,
                borderInlineEnd: `1px solid ${t.colorBorder}`,
                content: '""'
              },
              '&-end': { '&:before': { display: 'none' } }
            }
          },
          [`${n}-switcher`]: {
            background: 'transparent',
            '&-line-icon': { verticalAlign: '-0.15em' }
          }
        },
        [`${o}-leaf-last`]: {
          [`${n}-switcher`]: {
            '&-leaf-line': {
              '&:before': {
                top: 'auto !important',
                bottom: 'auto !important',
                height: `${r / 2}px !important`
              }
            }
          }
        }
      })
    };
  },
  Xc = e => {
    const { treeCls: t, treeNodeCls: n, treeNodePadding: o } = e;
    return {
      [`${t}${t}-directory`]: {
        [n]: {
          position: 'relative',
          '&:before': {
            position: 'absolute',
            top: 0,
            insetInlineEnd: 0,
            bottom: o,
            insetInlineStart: 0,
            transition: `background-color ${e.motionDurationMid}`,
            content: '""',
            pointerEvents: 'none'
          },
          '&:hover': { '&:before': { background: e.controlItemBgHover } },
          '> *': { zIndex: 1 },
          [`${t}-switcher`]: { transition: `color ${e.motionDurationMid}` },
          [`${t}-node-content-wrapper`]: {
            borderRadius: 0,
            userSelect: 'none',
            '&:hover': { background: 'transparent' },
            [`&${t}-node-selected`]: {
              color: e.colorTextLightSolid,
              background: 'transparent'
            }
          },
          '&-selected': {
            '\n            &:hover::before,\n            &::before\n          ': {
              background: e.colorPrimary
            },
            [`${t}-switcher`]: { color: e.colorTextLightSolid },
            [`${t}-node-content-wrapper`]: {
              color: e.colorTextLightSolid,
              background: 'transparent'
            }
          }
        }
      }
    };
  },
  Gc = (e, t) => {
    const n = `.${e}`,
      o = `${n}-treenode`,
      l = t.paddingXS / 2,
      r = t.controlHeightSM,
      a = Rt(t, {
        treeCls: n,
        treeNodeCls: o,
        treeNodePadding: l,
        treeTitleHeight: r
      });
    return [Vc(e, a), Xc(a)];
  },
  Uc = Nt('Tree', (e, t) => {
    let { prefixCls: n } = t;
    return [{ [e.componentCls]: jl(`${n}-checkbox`, e) }, Gc(n, e), va(e)];
  }),
  dr = () => {
    const e = Al();
    return g(g({}, e), {
      showLine: Ge([Boolean, Object]),
      multiple: fe(),
      autoExpandParent: fe(),
      checkStrictly: fe(),
      checkable: fe(),
      disabled: fe(),
      defaultExpandAll: fe(),
      defaultExpandParent: fe(),
      defaultExpandedKeys: Le(),
      expandedKeys: Le(),
      checkedKeys: Ge([Array, Object]),
      defaultCheckedKeys: Le(),
      selectedKeys: Le(),
      defaultSelectedKeys: Le(),
      selectable: fe(),
      loadedKeys: Le(),
      draggable: fe(),
      showIcon: fe(),
      icon: ye(),
      switcherIcon: me.any,
      prefixCls: String,
      replaceFields: rt(),
      blockNode: fe(),
      openAnimation: me.any,
      onDoubleclick: e.onDblclick,
      'onUpdate:selectedKeys': ye(),
      'onUpdate:checkedKeys': ye(),
      'onUpdate:expandedKeys': ye()
    });
  },
  Yt = ve({
    compatConfig: { MODE: 3 },
    name: 'ATree',
    inheritAttrs: !1,
    props: bt(dr(), {
      checkable: !1,
      selectable: !0,
      showIcon: !1,
      blockNode: !1
    }),
    slots: Object,
    setup(e, t) {
      let { attrs: n, expose: o, emit: l, slots: r } = t;
      Me(
        !(e.treeData === void 0 && r.default),
        '`children` of Tree is deprecated. Please use `treeData` instead.'
      );
      const { prefixCls: a, direction: i, virtual: s } = Ye('tree', e),
        [f, c] = Uc(a),
        u = pe();
      o({
        treeRef: u,
        onNodeExpand: function() {
          var d;
          (d = u.value) === null ||
            d === void 0 ||
            d.onNodeExpand(...arguments);
        },
        scrollTo: d => {
          var p;
          (p = u.value) === null || p === void 0 || p.scrollTo(d);
        },
        selectedKeys: w(() => {
          var d;
          return (d = u.value) === null || d === void 0
            ? void 0
            : d.selectedKeys;
        }),
        checkedKeys: w(() => {
          var d;
          return (d = u.value) === null || d === void 0
            ? void 0
            : d.checkedKeys;
        }),
        halfCheckedKeys: w(() => {
          var d;
          return (d = u.value) === null || d === void 0
            ? void 0
            : d.halfCheckedKeys;
        }),
        loadedKeys: w(() => {
          var d;
          return (d = u.value) === null || d === void 0 ? void 0 : d.loadedKeys;
        }),
        loadingKeys: w(() => {
          var d;
          return (d = u.value) === null || d === void 0
            ? void 0
            : d.loadingKeys;
        }),
        expandedKeys: w(() => {
          var d;
          return (d = u.value) === null || d === void 0
            ? void 0
            : d.expandedKeys;
        })
      }),
        Re(() => {
          We(
            e.replaceFields === void 0,
            'Tree',
            '`replaceFields` is deprecated, please use fieldNames instead'
          );
        });
      const x = (d, p) => {
          l('update:checkedKeys', d), l('check', d, p);
        },
        b = (d, p) => {
          l('update:expandedKeys', d), l('expand', d, p);
        },
        v = (d, p) => {
          l('update:selectedKeys', d), l('select', d, p);
        };
      return () => {
        const {
            showIcon: d,
            showLine: p,
            switcherIcon: $ = r.switcherIcon,
            icon: m = r.icon,
            blockNode: S,
            checkable: O,
            selectable: I,
            fieldNames: k = e.replaceFields,
            motion: T = e.openAnimation,
            itemHeight: C = 28,
            onDoubleclick: E,
            onDblclick: D
          } = e,
          A = g(
            g(
              g({}, n),
              Bt(e, [
                'onUpdate:checkedKeys',
                'onUpdate:expandedKeys',
                'onUpdate:selectedKeys',
                'onDoubleclick'
              ])
            ),
            {
              showLine: !!p,
              dropIndicatorRender: jc,
              fieldNames: k,
              icon: m,
              itemHeight: C
            }
          ),
          F = r.default ? Mt(r.default()) : void 0;
        return f(
          h(
            zc,
            W(
              W({}, A),
              {},
              {
                virtual: s.value,
                motion: T,
                ref: u,
                prefixCls: a.value,
                class: ie(
                  {
                    [`${a.value}-icon-hide`]: !d,
                    [`${a.value}-block-node`]: S,
                    [`${a.value}-unselectable`]: !I,
                    [`${a.value}-rtl`]: i.value === 'rtl'
                  },
                  n.class,
                  c.value
                ),
                direction: i.value,
                checkable: O,
                selectable: I,
                switcherIcon: U => Mc(a.value, $, U, r.leafIcon, p),
                onCheck: x,
                onExpand: b,
                onSelect: v,
                onDblclick: D || E,
                children: F
              }
            ),
            g(g({}, r), {
              checkable: () =>
                h('span', { class: `${a.value}-checkbox-inner` }, null)
            })
          )
        );
      };
    }
  });
var dt;
(function(e) {
  (e[(e.None = 0)] = 'None'),
    (e[(e.Start = 1)] = 'Start'),
    (e[(e.End = 2)] = 'End');
})(dt || (dt = {}));
function bo(e, t, n) {
  function o(l) {
    const r = l[t.key],
      a = l[t.children];
    n(r, l) !== !1 && bo(a || [], t, n);
  }
  e.forEach(o);
}
function qc(e) {
  let {
    treeData: t,
    expandedKeys: n,
    startKey: o,
    endKey: l,
    fieldNames: r = { title: 'title', key: 'key', children: 'children' }
  } = e;
  const a = [];
  let i = dt.None;
  if (o && o === l) return [o];
  if (!o || !l) return [];
  function s(f) {
    return f === o || f === l;
  }
  return (
    bo(t, r, f => {
      if (i === dt.End) return !1;
      if (s(f)) {
        if ((a.push(f), i === dt.None)) i = dt.Start;
        else if (i === dt.Start) return (i = dt.End), !1;
      } else i === dt.Start && a.push(f);
      return n.includes(f);
    }),
    a
  );
}
function mn(e, t, n) {
  const o = [...t],
    l = [];
  return (
    bo(e, n, (r, a) => {
      const i = o.indexOf(r);
      return i !== -1 && (l.push(a), o.splice(i, 1)), !!o.length;
    }),
    l
  );
}
var Jc =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, o = Object.getOwnPropertySymbols(e); l < o.length; l++)
        t.indexOf(o[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[l]) &&
          (n[o[l]] = e[o[l]]);
    return n;
  };
const Yc = () => g(g({}, dr()), { expandAction: Ge([Boolean, String]) });
function Qc(e) {
  const { isLeaf: t, expanded: n } = e;
  return t ? h(Wl, null, null) : n ? h(Zi, null, null) : h(ts, null, null);
}
const yn = ve({
    compatConfig: { MODE: 3 },
    name: 'ADirectoryTree',
    inheritAttrs: !1,
    props: bt(Yc(), { showIcon: !0, expandAction: 'click' }),
    slots: Object,
    setup(e, t) {
      let { attrs: n, slots: o, emit: l, expose: r } = t;
      var a;
      const i = pe(
        e.treeData ||
          Tn(Mt((a = o.default) === null || a === void 0 ? void 0 : a.call(o)))
      );
      Te(
        () => e.treeData,
        () => {
          i.value = e.treeData;
        }
      ),
        Jn(() => {
          ft(() => {
            var C;
            e.treeData === void 0 &&
              o.default &&
              (i.value = Tn(
                Mt(
                  (C = o.default) === null || C === void 0 ? void 0 : C.call(o)
                )
              ));
          });
        });
      const s = pe(),
        f = pe(),
        c = w(() => rn(e.fieldNames)),
        u = pe();
      r({
        scrollTo: C => {
          var E;
          (E = u.value) === null || E === void 0 || E.scrollTo(C);
        },
        selectedKeys: w(() => {
          var C;
          return (C = u.value) === null || C === void 0
            ? void 0
            : C.selectedKeys;
        }),
        checkedKeys: w(() => {
          var C;
          return (C = u.value) === null || C === void 0
            ? void 0
            : C.checkedKeys;
        }),
        halfCheckedKeys: w(() => {
          var C;
          return (C = u.value) === null || C === void 0
            ? void 0
            : C.halfCheckedKeys;
        }),
        loadedKeys: w(() => {
          var C;
          return (C = u.value) === null || C === void 0 ? void 0 : C.loadedKeys;
        }),
        loadingKeys: w(() => {
          var C;
          return (C = u.value) === null || C === void 0
            ? void 0
            : C.loadingKeys;
        }),
        expandedKeys: w(() => {
          var C;
          return (C = u.value) === null || C === void 0
            ? void 0
            : C.expandedKeys;
        })
      });
      const x = () => {
          const { keyEntities: C } = oo(i.value, { fieldNames: c.value });
          let E;
          return (
            e.defaultExpandAll
              ? (E = Object.keys(C))
              : e.defaultExpandParent
              ? (E = En(e.expandedKeys || e.defaultExpandedKeys || [], C))
              : (E = e.expandedKeys || e.defaultExpandedKeys),
            E
          );
        },
        b = pe(e.selectedKeys || e.defaultSelectedKeys || []),
        v = pe(x());
      Te(
        () => e.selectedKeys,
        () => {
          e.selectedKeys !== void 0 && (b.value = e.selectedKeys);
        },
        { immediate: !0 }
      ),
        Te(
          () => e.expandedKeys,
          () => {
            e.expandedKeys !== void 0 && (v.value = e.expandedKeys);
          },
          { immediate: !0 }
        );
      const p = Ua(
          (C, E) => {
            const { isLeaf: D } = E;
            D ||
              C.shiftKey ||
              C.metaKey ||
              C.ctrlKey ||
              u.value.onNodeExpand(C, E);
          },
          200,
          { leading: !0 }
        ),
        $ = (C, E) => {
          e.expandedKeys === void 0 && (v.value = C),
            l('update:expandedKeys', C),
            l('expand', C, E);
        },
        m = (C, E) => {
          const { expandAction: D } = e;
          D === 'click' && p(C, E), l('click', C, E);
        },
        S = (C, E) => {
          const { expandAction: D } = e;
          (D === 'dblclick' || D === 'doubleclick') && p(C, E),
            l('doubleclick', C, E),
            l('dblclick', C, E);
        },
        O = (C, E) => {
          const { multiple: D } = e,
            { node: A, nativeEvent: F } = E,
            U = A[c.value.key],
            ee = g(g({}, E), { selected: !0 }),
            Z =
              (F == null ? void 0 : F.ctrlKey) ||
              (F == null ? void 0 : F.metaKey),
            he = F == null ? void 0 : F.shiftKey;
          let X;
          D && Z
            ? ((X = C),
              (s.value = U),
              (f.value = X),
              (ee.selectedNodes = mn(i.value, X, c.value)))
            : D && he
            ? ((X = Array.from(
                new Set([
                  ...(f.value || []),
                  ...qc({
                    treeData: i.value,
                    expandedKeys: v.value,
                    startKey: U,
                    endKey: s.value,
                    fieldNames: c.value
                  })
                ])
              )),
              (ee.selectedNodes = mn(i.value, X, c.value)))
            : ((X = [U]),
              (s.value = U),
              (f.value = X),
              (ee.selectedNodes = mn(i.value, X, c.value))),
            l('update:selectedKeys', X),
            l('select', X, ee),
            e.selectedKeys === void 0 && (b.value = X);
        },
        I = (C, E) => {
          l('update:checkedKeys', C), l('check', C, E);
        },
        { prefixCls: k, direction: T } = Ye('tree', e);
      return () => {
        const C = ie(
            `${k.value}-directory`,
            { [`${k.value}-directory-rtl`]: T.value === 'rtl' },
            n.class
          ),
          { icon: E = o.icon, blockNode: D = !0 } = e,
          A = Jc(e, ['icon', 'blockNode']);
        return h(
          Yt,
          W(
            W(W({}, n), {}, { icon: E || Qc, ref: u, blockNode: D }, A),
            {},
            {
              prefixCls: k.value,
              class: C,
              expandedKeys: v.value,
              selectedKeys: b.value,
              onSelect: O,
              onClick: m,
              onDblclick: S,
              onExpand: $,
              onCheck: I
            }
          ),
          o
        );
      };
    }
  }),
  bn = In,
  Zc = g(Yt, {
    DirectoryTree: yn,
    TreeNode: bn,
    install: e => (
      e.component(Yt.name, Yt),
      e.component(bn.name, bn),
      e.component(yn.name, yn),
      e
    )
  });
function pl(e, t) {
  let n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !1;
  const o = new Set();
  function l(r, a) {
    let i = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : 1;
    const s = o.has(r);
    if ((Rr(!s, 'Warning: There may be circular references'), s)) return !1;
    if (r === a) return !0;
    if (n && i > 1) return !1;
    o.add(r);
    const f = i + 1;
    if (Array.isArray(r)) {
      if (!Array.isArray(a) || r.length !== a.length) return !1;
      for (let c = 0; c < r.length; c++) if (!l(r[c], a[c], f)) return !1;
      return !0;
    }
    if (r && a && typeof r == 'object' && typeof a == 'object') {
      const c = Object.keys(r);
      return c.length !== Object.keys(a).length
        ? !1
        : c.every(u => l(r[u], a[u], f));
    }
    return !1;
  }
  return l(e, t);
}
const { SubMenu: ed, Item: td } = en;
function nd(e) {
  return e.some(t => {
    let { children: n } = t;
    return n && n.length > 0;
  });
}
function ur(e, t) {
  return typeof t == 'string' || typeof t == 'number'
    ? t == null
      ? void 0
      : t
          .toString()
          .toLowerCase()
          .includes(e.trim().toLowerCase())
    : !1;
}
function fr(e) {
  let {
    filters: t,
    prefixCls: n,
    filteredKeys: o,
    filterMultiple: l,
    searchValue: r,
    filterSearch: a
  } = e;
  return t.map((i, s) => {
    const f = String(i.value);
    if (i.children)
      return h(
        ed,
        { key: f || s, title: i.text, popupClassName: `${n}-dropdown-submenu` },
        {
          default: () => [
            fr({
              filters: i.children,
              prefixCls: n,
              filteredKeys: o,
              filterMultiple: l,
              searchValue: r,
              filterSearch: a
            })
          ]
        }
      );
    const c = l ? ut : Xe,
      u = h(
        td,
        { key: i.value !== void 0 ? f : s },
        {
          default: () => [
            h(c, { checked: o.includes(f) }, null),
            h('span', null, [i.text])
          ]
        }
      );
    return r.trim()
      ? typeof a == 'function'
        ? a(r, i)
          ? u
          : void 0
        : ur(r, i.text)
        ? u
        : void 0
      : u;
  });
}
const od = ve({
  name: 'FilterDropdown',
  props: [
    'tablePrefixCls',
    'prefixCls',
    'dropdownPrefixCls',
    'column',
    'filterState',
    'filterMultiple',
    'filterMode',
    'filterSearch',
    'columnKey',
    'triggerFilter',
    'locale',
    'getPopupContainer'
  ],
  setup(e, t) {
    let { slots: n } = t;
    const o = go(),
      l = w(() => {
        var B;
        return (B = e.filterMode) !== null && B !== void 0 ? B : 'menu';
      }),
      r = w(() => {
        var B;
        return (B = e.filterSearch) !== null && B !== void 0 ? B : !1;
      }),
      a = w(
        () => e.column.filterDropdownOpen || e.column.filterDropdownVisible
      ),
      i = w(
        () =>
          e.column.onFilterDropdownOpenChange ||
          e.column.onFilterDropdownVisibleChange
      );
    [
      [
        'filterDropdownVisible',
        'filterDropdownOpen',
        e.column.filterDropdownVisible
      ],
      [
        'onFilterDropdownVisibleChange',
        'onFilterDropdownOpenChange',
        e.column.onFilterDropdownVisibleChange
      ]
    ].forEach(B => {
      let [H, M, j] = B;
      We(
        j == null,
        'Table',
        `\`${H}\` is deprecated. Please use \`${M}\` instead.`
      );
    });
    const s = ae(!1),
      f = w(() => {
        var B;
        return !!(
          e.filterState &&
          ((!((B = e.filterState.filteredKeys) === null || B === void 0) &&
            B.length) ||
            e.filterState.forceFiltered)
        );
      }),
      c = w(() => {
        var B;
        return cn((B = e.column) === null || B === void 0 ? void 0 : B.filters);
      }),
      u = w(() => {
        const {
          filterDropdown: B,
          slots: H = {},
          customFilterDropdown: M
        } = e.column;
        return (
          B ||
          (H.filterDropdown && o.value[H.filterDropdown]) ||
          (M && o.value.customFilterDropdown)
        );
      }),
      y = w(() => {
        const { filterIcon: B, slots: H = {} } = e.column;
        return (
          B ||
          (H.filterIcon && o.value[H.filterIcon]) ||
          o.value.customFilterIcon
        );
      }),
      x = B => {
        var H;
        (s.value = B), (H = i.value) === null || H === void 0 || H.call(i, B);
      },
      b = w(() => (typeof a.value == 'boolean' ? a.value : s.value)),
      v = w(() => {
        var B;
        return (B = e.filterState) === null || B === void 0
          ? void 0
          : B.filteredKeys;
      }),
      d = ae([]),
      p = B => {
        let { selectedKeys: H } = B;
        d.value = H;
      },
      $ = (B, H) => {
        let { node: M, checked: j } = H;
        e.filterMultiple
          ? p({ selectedKeys: B })
          : p({ selectedKeys: j && M.key ? [M.key] : [] });
      };
    Te(
      v,
      () => {
        s.value && p({ selectedKeys: v.value || [] });
      },
      { immediate: !0 }
    );
    const m = ae([]),
      S = ae(),
      O = B => {
        S.value = setTimeout(() => {
          m.value = B;
        });
      },
      I = () => {
        clearTimeout(S.value);
      };
    yt(() => {
      clearTimeout(S.value);
    });
    const k = ae(''),
      T = B => {
        const { value: H } = B.target;
        k.value = H;
      };
    Te(s, () => {
      s.value || (k.value = '');
    });
    const C = B => {
        const { column: H, columnKey: M, filterState: j } = e,
          ne = B && B.length ? B : null;
        if (
          (ne === null && (!j || !j.filteredKeys)) ||
          pl(ne, j == null ? void 0 : j.filteredKeys, !0)
        )
          return null;
        e.triggerFilter({ column: H, key: M, filteredKeys: ne });
      },
      E = () => {
        x(!1), C(d.value);
      },
      D = function() {
        let { confirm: B, closeDropdown: H } =
          arguments.length > 0 && arguments[0] !== void 0
            ? arguments[0]
            : { confirm: !1, closeDropdown: !1 };
        B && C([]),
          H && x(!1),
          (k.value = ''),
          e.column.filterResetToDefaultFilteredValue
            ? (d.value = (e.column.defaultFilteredValue || []).map(M =>
                String(M)
              ))
            : (d.value = []);
      },
      A = function() {
        let { closeDropdown: B } =
          arguments.length > 0 && arguments[0] !== void 0
            ? arguments[0]
            : { closeDropdown: !0 };
        B && x(!1), C(d.value);
      },
      F = B => {
        B && v.value !== void 0 && (d.value = v.value || []),
          x(B),
          !B && !u.value && E();
      },
      { direction: U } = Ye('', e),
      ee = B => {
        if (B.target.checked) {
          const H = c.value;
          d.value = H;
        } else d.value = [];
      },
      Z = B => {
        let { filters: H } = B;
        return (H || []).map((M, j) => {
          const ne = String(M.value),
            oe = { title: M.text, key: M.value !== void 0 ? ne : j };
          return M.children && (oe.children = Z({ filters: M.children })), oe;
        });
      },
      he = B => {
        var H;
        return g(g({}, B), {
          text: B.title,
          value: B.key,
          children:
            ((H = B.children) === null || H === void 0
              ? void 0
              : H.map(M => he(M))) || []
        });
      },
      X = w(() => Z({ filters: e.column.filters })),
      Y = w(() =>
        ie({
          [`${e.dropdownPrefixCls}-menu-without-submenu`]: !nd(
            e.column.filters || []
          )
        })
      ),
      L = () => {
        const B = d.value,
          {
            column: H,
            locale: M,
            tablePrefixCls: j,
            filterMultiple: ne,
            dropdownPrefixCls: oe,
            getPopupContainer: Ke,
            prefixCls: Ie
          } = e;
        return (H.filters || []).length === 0
          ? h(
              So,
              {
                image: So.PRESENTED_IMAGE_SIMPLE,
                description: M.filterEmptyText,
                imageStyle: { height: 24 },
                style: { margin: 0, padding: '16px 0' }
              },
              null
            )
          : l.value === 'tree'
          ? h(mt, null, [
              h(
                ll,
                {
                  filterSearch: r.value,
                  value: k.value,
                  onChange: T,
                  tablePrefixCls: j,
                  locale: M
                },
                null
              ),
              h('div', { class: `${j}-filter-dropdown-tree` }, [
                ne
                  ? h(
                      ut,
                      {
                        class: `${j}-filter-dropdown-checkall`,
                        onChange: ee,
                        checked: B.length === c.value.length,
                        indeterminate: B.length > 0 && B.length < c.value.length
                      },
                      { default: () => [M.filterCheckall] }
                    )
                  : null,
                h(
                  Zc,
                  {
                    checkable: !0,
                    selectable: !1,
                    blockNode: !0,
                    multiple: ne,
                    checkStrictly: !ne,
                    class: `${oe}-menu`,
                    onCheck: $,
                    checkedKeys: B,
                    selectedKeys: B,
                    showIcon: !1,
                    treeData: X.value,
                    autoExpandParent: !0,
                    defaultExpandAll: !0,
                    filterTreeNode: k.value.trim()
                      ? De =>
                          typeof r.value == 'function'
                            ? r.value(k.value, he(De))
                            : ur(k.value, De.title)
                      : void 0
                  },
                  null
                )
              ])
            ])
          : h(mt, null, [
              h(
                ll,
                {
                  filterSearch: r.value,
                  value: k.value,
                  onChange: T,
                  tablePrefixCls: j,
                  locale: M
                },
                null
              ),
              h(
                en,
                {
                  multiple: ne,
                  prefixCls: `${oe}-menu`,
                  class: Y.value,
                  onClick: I,
                  onSelect: p,
                  onDeselect: p,
                  selectedKeys: B,
                  getPopupContainer: Ke,
                  openKeys: m.value,
                  onOpenChange: O
                },
                {
                  default: () =>
                    fr({
                      filters: H.filters || [],
                      filterSearch: r.value,
                      prefixCls: Ie,
                      filteredKeys: d.value,
                      filterMultiple: ne,
                      searchValue: k.value
                    })
                }
              )
            ]);
      },
      Q = w(() => {
        const B = d.value;
        return e.column.filterResetToDefaultFilteredValue
          ? pl(
              (e.column.defaultFilteredValue || []).map(H => String(H)),
              B,
              !0
            )
          : B.length === 0;
      });
    return () => {
      var B;
      const {
        tablePrefixCls: H,
        prefixCls: M,
        column: j,
        dropdownPrefixCls: ne,
        locale: oe,
        getPopupContainer: Ke
      } = e;
      let Ie;
      typeof u.value == 'function'
        ? (Ie = u.value({
            prefixCls: `${ne}-custom`,
            setSelectedKeys: je => p({ selectedKeys: je }),
            selectedKeys: d.value,
            confirm: A,
            clearFilters: D,
            filters: j.filters,
            visible: b.value,
            column: j.__originColumn__,
            close: () => {
              x(!1);
            }
          }))
        : u.value
        ? (Ie = u.value)
        : (Ie = h(mt, null, [
            L(),
            h('div', { class: `${M}-dropdown-btns` }, [
              h(
                jt,
                {
                  type: 'link',
                  size: 'small',
                  disabled: Q.value,
                  onClick: () => D()
                },
                { default: () => [oe.filterReset] }
              ),
              h(
                jt,
                { type: 'primary', size: 'small', onClick: E },
                { default: () => [oe.filterConfirm] }
              )
            ])
          ]));
      const De = h(Kc, { class: `${M}-dropdown` }, { default: () => [Ie] });
      let _e;
      return (
        typeof y.value == 'function'
          ? (_e = y.value({ filtered: f.value, column: j.__originColumn__ }))
          : y.value
          ? (_e = y.value)
          : (_e = h(Yi, null, null)),
        h('div', { class: `${M}-column` }, [
          h('span', { class: `${H}-column-title` }, [
            (B = n.default) === null || B === void 0 ? void 0 : B.call(n)
          ]),
          h(
            Pt,
            {
              overlay: De,
              trigger: ['click'],
              open: b.value,
              onOpenChange: F,
              getPopupContainer: Ke,
              placement: U.value === 'rtl' ? 'bottomLeft' : 'bottomRight'
            },
            {
              default: () => [
                h(
                  'span',
                  {
                    role: 'button',
                    tabindex: -1,
                    class: ie(`${M}-trigger`, { active: f.value }),
                    onClick: je => {
                      je.stopPropagation();
                    }
                  },
                  [_e]
                )
              ]
            }
          )
        ])
      );
    };
  }
});
function Wn(e, t, n) {
  let o = [];
  return (
    (e || []).forEach((l, r) => {
      var a, i;
      const s = Ht(r, n),
        f =
          l.filterDropdown ||
          ((a = l == null ? void 0 : l.slots) === null || a === void 0
            ? void 0
            : a.filterDropdown) ||
          l.customFilterDropdown;
      if (l.filters || f || 'onFilter' in l)
        if ('filteredValue' in l) {
          let c = l.filteredValue;
          f ||
            (c =
              (i = c == null ? void 0 : c.map(String)) !== null && i !== void 0
                ? i
                : c),
            o.push({
              column: l,
              key: It(l, s),
              filteredKeys: c,
              forceFiltered: l.filtered
            });
        } else
          o.push({
            column: l,
            key: It(l, s),
            filteredKeys:
              t && l.defaultFilteredValue ? l.defaultFilteredValue : void 0,
            forceFiltered: l.filtered
          });
      'children' in l && (o = [...o, ...Wn(l.children, t, s)]);
    }),
    o
  );
}
function pr(e, t, n, o, l, r, a, i) {
  return n.map((s, f) => {
    var c;
    const u = Ht(f, i),
      { filterMultiple: y = !0, filterMode: x, filterSearch: b } = s;
    let v = s;
    const d =
      s.filterDropdown ||
      ((c = s == null ? void 0 : s.slots) === null || c === void 0
        ? void 0
        : c.filterDropdown) ||
      s.customFilterDropdown;
    if (v.filters || d) {
      const p = It(v, u),
        $ = o.find(m => {
          let { key: S } = m;
          return p === S;
        });
      v = g(g({}, v), {
        title: m =>
          h(
            od,
            {
              tablePrefixCls: e,
              prefixCls: `${e}-filter`,
              dropdownPrefixCls: t,
              column: v,
              columnKey: p,
              filterState: $,
              filterMultiple: y,
              filterMode: x,
              filterSearch: b,
              triggerFilter: r,
              locale: l,
              getPopupContainer: a
            },
            { default: () => [yo(s.title, m)] }
          )
      });
    }
    return (
      'children' in v &&
        (v = g(g({}, v), { children: pr(e, t, v.children, o, l, r, a, u) })),
      v
    );
  });
}
function cn(e) {
  let t = [];
  return (
    (e || []).forEach(n => {
      let { value: o, children: l } = n;
      t.push(o), l && (t = [...t, ...cn(l)]);
    }),
    t
  );
}
function vl(e) {
  const t = {};
  return (
    e.forEach(n => {
      let { key: o, filteredKeys: l, column: r } = n;
      var a;
      const i =
          r.filterDropdown ||
          ((a = r == null ? void 0 : r.slots) === null || a === void 0
            ? void 0
            : a.filterDropdown) ||
          r.customFilterDropdown,
        { filters: s } = r;
      if (i) t[o] = l || null;
      else if (Array.isArray(l)) {
        const f = cn(s);
        t[o] = f.filter(c => l.includes(String(c)));
      } else t[o] = null;
    }),
    t
  );
}
function hl(e, t) {
  return t.reduce((n, o) => {
    const {
      column: { onFilter: l, filters: r },
      filteredKeys: a
    } = o;
    return l && a && a.length
      ? n.filter(i =>
          a.some(s => {
            const f = cn(r),
              c = f.findIndex(y => String(y) === String(s)),
              u = c !== -1 ? f[c] : s;
            return l(u, i);
          })
        )
      : n;
  }, e);
}
function ld(e) {
  let {
    prefixCls: t,
    dropdownPrefixCls: n,
    mergedColumns: o,
    locale: l,
    onFilterChange: r,
    getPopupContainer: a
  } = e;
  const [i, s] = Ot(Wn(o.value, !0)),
    f = w(() => {
      const x = Wn(o.value, !1);
      if (x.length === 0) return x;
      let b = !0,
        v = !0;
      if (
        (x.forEach(d => {
          let { filteredKeys: p } = d;
          p !== void 0 ? (b = !1) : (v = !1);
        }),
        b)
      ) {
        const d = (o.value || []).map((p, $) => It(p, Ht($)));
        return i.value
          .filter(p => {
            let { key: $ } = p;
            return d.includes($);
          })
          .map(p => {
            const $ = o.value[d.findIndex(m => m === p.key)];
            return g(g({}, p), {
              column: g(g({}, p.column), $),
              forceFiltered: $.filtered
            });
          });
      }
      return (
        We(
          v,
          'Table',
          'Columns should all contain `filteredValue` or not contain `filteredValue`.'
        ),
        x
      );
    }),
    c = w(() => vl(f.value)),
    u = x => {
      const b = f.value.filter(v => {
        let { key: d } = v;
        return d !== x.key;
      });
      b.push(x), s(b), r(vl(b), b);
    };
  return [x => pr(t.value, n.value, x, f.value, l.value, u, a.value), f, c];
}
function vr(e, t) {
  return e.map(n => {
    const o = g({}, n);
    return (
      (o.title = yo(o.title, t)),
      'children' in o && (o.children = vr(o.children, t)),
      o
    );
  });
}
function rd(e) {
  return [n => vr(n, e.value)];
}
function ad(e) {
  return function(n) {
    let {
      prefixCls: o,
      onExpand: l,
      record: r,
      expanded: a,
      expandable: i
    } = n;
    const s = `${o}-row-expand-icon`;
    return h(
      'button',
      {
        type: 'button',
        onClick: f => {
          l(r, f), f.stopPropagation();
        },
        class: ie(s, {
          [`${s}-spaced`]: !i,
          [`${s}-expanded`]: i && a,
          [`${s}-collapsed`]: i && !a
        }),
        'aria-label': a ? e.collapse : e.expand,
        'aria-expanded': a
      },
      null
    );
  };
}
function hr(e, t) {
  const n = t.value;
  return e.map(o => {
    var l;
    if (o === Ze || o === lt) return o;
    const r = g({}, o),
      { slots: a = {} } = r;
    return (
      (r.__originColumn__ = o),
      We(
        !('slots' in r),
        'Table',
        '`column.slots` is deprecated. Please use `v-slot:headerCell` `v-slot:bodyCell` instead.'
      ),
      Object.keys(a).forEach(i => {
        const s = a[i];
        r[i] === void 0 && n[s] && (r[i] = n[s]);
      }),
      t.value.headerCell &&
        !(!((l = o.slots) === null || l === void 0) && l.title) &&
        (r.title = Zn(
          t.value,
          'headerCell',
          { title: o.title, column: o },
          () => [o.title]
        )),
      'children' in r &&
        Array.isArray(r.children) &&
        (r.children = hr(r.children, t)),
      r
    );
  });
}
function id(e) {
  return [n => hr(n, e)];
}
const sd = e => {
    const { componentCls: t } = e,
      n = `${e.lineWidth}px ${e.lineType} ${e.tableBorderColor}`,
      o = (l, r, a) => ({
        [`&${t}-${l}`]: {
          [`> ${t}-container`]: {
            [`> ${t}-content, > ${t}-body`]: {
              '> table > tbody > tr > td': {
                [`> ${t}-expanded-row-fixed`]: {
                  margin: `-${r}px -${a + e.lineWidth}px`
                }
              }
            }
          }
        }
      });
    return {
      [`${t}-wrapper`]: {
        [`${t}${t}-bordered`]: g(
          g(
            g(
              {
                [`> ${t}-title`]: { border: n, borderBottom: 0 },
                [`> ${t}-container`]: {
                  borderInlineStart: n,
                  [`
            > ${t}-content,
            > ${t}-header,
            > ${t}-body,
            > ${t}-summary
          `]: {
                    '> table': {
                      '\n                > thead > tr > th,\n                > tbody > tr > td,\n                > tfoot > tr > th,\n                > tfoot > tr > td\n              ': {
                        borderInlineEnd: n
                      },
                      '> thead': {
                        '> tr:not(:last-child) > th': { borderBottom: n },
                        '> tr > th::before': {
                          backgroundColor: 'transparent !important'
                        }
                      },
                      '\n                > thead > tr,\n                > tbody > tr,\n                > tfoot > tr\n              ': {
                        [`> ${t}-cell-fix-right-first::after`]: {
                          borderInlineEnd: n
                        }
                      },
                      '> tbody > tr > td': {
                        [`> ${t}-expanded-row-fixed`]: {
                          margin: `-${
                            e.tablePaddingVertical
                          }px -${e.tablePaddingHorizontal + e.lineWidth}px`,
                          '&::after': {
                            position: 'absolute',
                            top: 0,
                            insetInlineEnd: e.lineWidth,
                            bottom: 0,
                            borderInlineEnd: n,
                            content: '""'
                          }
                        }
                      }
                    }
                  },
                  [`
            > ${t}-content,
            > ${t}-header
          `]: { '> table': { borderTop: n } }
                },
                [`&${t}-scroll-horizontal`]: {
                  [`> ${t}-container > ${t}-body`]: {
                    '> table > tbody': {
                      [`
                > tr${t}-expanded-row,
                > tr${t}-placeholder
              `]: { '> td': { borderInlineEnd: 0 } }
                    }
                  }
                }
              },
              o(
                'middle',
                e.tablePaddingVerticalMiddle,
                e.tablePaddingHorizontalMiddle
              )
            ),
            o(
              'small',
              e.tablePaddingVerticalSmall,
              e.tablePaddingHorizontalSmall
            )
          ),
          { [`> ${t}-footer`]: { border: n, borderTop: 0 } }
        ),
        [`${t}-cell`]: {
          [`${t}-container:first-child`]: { borderTop: 0 },
          '&-scrollbar:not([rowspan])': {
            boxShadow: `0 ${e.lineWidth}px 0 ${e.lineWidth}px ${e.tableHeaderBg}`
          }
        }
      }
    };
  },
  cd = sd,
  dd = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-wrapper`]: {
        [`${t}-cell-ellipsis`]: g(g({}, Br), {
          wordBreak: 'keep-all',
          [`
          &${t}-cell-fix-left-last,
          &${t}-cell-fix-right-first
        `]: {
            overflow: 'visible',
            [`${t}-cell-content`]: {
              display: 'block',
              overflow: 'hidden',
              textOverflow: 'ellipsis'
            }
          },
          [`${t}-column-title`]: {
            overflow: 'hidden',
            textOverflow: 'ellipsis',
            wordBreak: 'keep-all'
          }
        })
      }
    };
  },
  ud = dd,
  fd = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-wrapper`]: {
        [`${t}-tbody > tr${t}-placeholder`]: {
          textAlign: 'center',
          color: e.colorTextDisabled,
          '&:hover > td': { background: e.colorBgContainer }
        }
      }
    };
  },
  pd = fd,
  vd = e => {
    const {
        componentCls: t,
        antCls: n,
        controlInteractiveSize: o,
        motionDurationSlow: l,
        lineWidth: r,
        paddingXS: a,
        lineType: i,
        tableBorderColor: s,
        tableExpandIconBg: f,
        tableExpandColumnWidth: c,
        borderRadius: u,
        fontSize: y,
        fontSizeSM: x,
        lineHeight: b,
        tablePaddingVertical: v,
        tablePaddingHorizontal: d,
        tableExpandedRowBg: p,
        paddingXXS: $
      } = e,
      m = o / 2 - r,
      S = m * 2 + r * 3,
      O = `${r}px ${i} ${s}`,
      I = $ - r;
    return {
      [`${t}-wrapper`]: {
        [`${t}-expand-icon-col`]: { width: c },
        [`${t}-row-expand-icon-cell`]: {
          textAlign: 'center',
          [`${t}-row-expand-icon`]: {
            display: 'inline-flex',
            float: 'none',
            verticalAlign: 'sub'
          }
        },
        [`${t}-row-indent`]: { height: 1, float: 'left' },
        [`${t}-row-expand-icon`]: g(g({}, ha(e)), {
          position: 'relative',
          float: 'left',
          boxSizing: 'border-box',
          width: S,
          height: S,
          padding: 0,
          color: 'inherit',
          lineHeight: `${S}px`,
          background: f,
          border: O,
          borderRadius: u,
          transform: `scale(${o / S})`,
          transition: `all ${l}`,
          userSelect: 'none',
          '&:focus, &:hover, &:active': { borderColor: 'currentcolor' },
          '&::before, &::after': {
            position: 'absolute',
            background: 'currentcolor',
            transition: `transform ${l} ease-out`,
            content: '""'
          },
          '&::before': {
            top: m,
            insetInlineEnd: I,
            insetInlineStart: I,
            height: r
          },
          '&::after': {
            top: I,
            bottom: I,
            insetInlineStart: m,
            width: r,
            transform: 'rotate(90deg)'
          },
          '&-collapsed::before': { transform: 'rotate(-180deg)' },
          '&-collapsed::after': { transform: 'rotate(0deg)' },
          '&-spaced': {
            '&::before, &::after': { display: 'none', content: 'none' },
            background: 'transparent',
            border: 0,
            visibility: 'hidden'
          }
        }),
        [`${t}-row-indent + ${t}-row-expand-icon`]: {
          marginTop: (y * b - r * 3) / 2 - Math.ceil((x * 1.4 - r * 3) / 2),
          marginInlineEnd: a
        },
        [`tr${t}-expanded-row`]: {
          '&, &:hover': { '> td': { background: p } },
          [`${n}-descriptions-view`]: {
            display: 'flex',
            table: { flex: 'auto', width: 'auto' }
          }
        },
        [`${t}-expanded-row-fixed`]: {
          position: 'relative',
          margin: `-${v}px -${d}px`,
          padding: `${v}px ${d}px`
        }
      }
    };
  },
  hd = vd,
  gd = e => {
    const {
        componentCls: t,
        antCls: n,
        iconCls: o,
        tableFilterDropdownWidth: l,
        tableFilterDropdownSearchWidth: r,
        paddingXXS: a,
        paddingXS: i,
        colorText: s,
        lineWidth: f,
        lineType: c,
        tableBorderColor: u,
        tableHeaderIconColor: y,
        fontSizeSM: x,
        tablePaddingHorizontal: b,
        borderRadius: v,
        motionDurationSlow: d,
        colorTextDescription: p,
        colorPrimary: $,
        tableHeaderFilterActiveBg: m,
        colorTextDisabled: S,
        tableFilterDropdownBg: O,
        tableFilterDropdownHeight: I,
        controlItemBgHover: k,
        controlItemBgActive: T,
        boxShadowSecondary: C
      } = e,
      E = `${n}-dropdown`,
      D = `${t}-filter-dropdown`,
      A = `${n}-tree`,
      F = `${f}px ${c} ${u}`;
    return [
      {
        [`${t}-wrapper`]: {
          [`${t}-filter-column`]: {
            display: 'flex',
            justifyContent: 'space-between'
          },
          [`${t}-filter-trigger`]: {
            position: 'relative',
            display: 'flex',
            alignItems: 'center',
            marginBlock: -a,
            marginInline: `${a}px ${-b / 2}px`,
            padding: `0 ${a}px`,
            color: y,
            fontSize: x,
            borderRadius: v,
            cursor: 'pointer',
            transition: `all ${d}`,
            '&:hover': { color: p, background: m },
            '&.active': { color: $ }
          }
        }
      },
      {
        [`${n}-dropdown`]: {
          [D]: g(g({}, et(e)), {
            minWidth: l,
            backgroundColor: O,
            borderRadius: v,
            boxShadow: C,
            [`${E}-menu`]: {
              maxHeight: I,
              overflowX: 'hidden',
              border: 0,
              boxShadow: 'none',
              '&:empty::after': {
                display: 'block',
                padding: `${i}px 0`,
                color: S,
                fontSize: x,
                textAlign: 'center',
                content: '"Not Found"'
              }
            },
            [`${D}-tree`]: {
              paddingBlock: `${i}px 0`,
              paddingInline: i,
              [A]: { padding: 0 },
              [`${A}-treenode ${A}-node-content-wrapper:hover`]: {
                backgroundColor: k
              },
              [`${A}-treenode-checkbox-checked ${A}-node-content-wrapper`]: {
                '&, &:hover': { backgroundColor: T }
              }
            },
            [`${D}-search`]: {
              padding: i,
              borderBottom: F,
              '&-input': { input: { minWidth: r }, [o]: { color: S } }
            },
            [`${D}-checkall`]: {
              width: '100%',
              marginBottom: a,
              marginInlineStart: a
            },
            [`${D}-btns`]: {
              display: 'flex',
              justifyContent: 'space-between',
              padding: `${i - f}px ${i}px`,
              overflow: 'hidden',
              backgroundColor: 'inherit',
              borderTop: F
            }
          })
        }
      },
      {
        [`${n}-dropdown ${D}, ${D}-submenu`]: {
          [`${n}-checkbox-wrapper + span`]: { paddingInlineStart: i, color: s },
          '> ul': {
            maxHeight: 'calc(100vh - 130px)',
            overflowX: 'hidden',
            overflowY: 'auto'
          }
        }
      }
    ];
  },
  md = gd,
  yd = e => {
    const {
        componentCls: t,
        lineWidth: n,
        colorSplit: o,
        motionDurationSlow: l,
        zIndexTableFixed: r,
        tableBg: a,
        zIndexTableSticky: i
      } = e,
      s = o;
    return {
      [`${t}-wrapper`]: {
        [`
        ${t}-cell-fix-left,
        ${t}-cell-fix-right
      `]: { position: 'sticky !important', zIndex: r, background: a },
        [`
        ${t}-cell-fix-left-first::after,
        ${t}-cell-fix-left-last::after
      `]: {
          position: 'absolute',
          top: 0,
          right: { _skip_check_: !0, value: 0 },
          bottom: -n,
          width: 30,
          transform: 'translateX(100%)',
          transition: `box-shadow ${l}`,
          content: '""',
          pointerEvents: 'none'
        },
        [`${t}-cell-fix-left-all::after`]: { display: 'none' },
        [`
        ${t}-cell-fix-right-first::after,
        ${t}-cell-fix-right-last::after
      `]: {
          position: 'absolute',
          top: 0,
          bottom: -n,
          left: { _skip_check_: !0, value: 0 },
          width: 30,
          transform: 'translateX(-100%)',
          transition: `box-shadow ${l}`,
          content: '""',
          pointerEvents: 'none'
        },
        [`${t}-container`]: {
          '&::before, &::after': {
            position: 'absolute',
            top: 0,
            bottom: 0,
            zIndex: i + 1,
            width: 30,
            transition: `box-shadow ${l}`,
            content: '""',
            pointerEvents: 'none'
          },
          '&::before': { insetInlineStart: 0 },
          '&::after': { insetInlineEnd: 0 }
        },
        [`${t}-ping-left`]: {
          [`&:not(${t}-has-fix-left) ${t}-container`]: {
            position: 'relative',
            '&::before': { boxShadow: `inset 10px 0 8px -8px ${s}` }
          },
          [`
          ${t}-cell-fix-left-first::after,
          ${t}-cell-fix-left-last::after
        `]: { boxShadow: `inset 10px 0 8px -8px ${s}` },
          [`${t}-cell-fix-left-last::before`]: {
            backgroundColor: 'transparent !important'
          }
        },
        [`${t}-ping-right`]: {
          [`&:not(${t}-has-fix-right) ${t}-container`]: {
            position: 'relative',
            '&::after': { boxShadow: `inset -10px 0 8px -8px ${s}` }
          },
          [`
          ${t}-cell-fix-right-first::after,
          ${t}-cell-fix-right-last::after
        `]: { boxShadow: `inset -10px 0 8px -8px ${s}` }
        }
      }
    };
  },
  bd = yd,
  xd = e => {
    const { componentCls: t, antCls: n } = e;
    return {
      [`${t}-wrapper`]: {
        [`${t}-pagination${n}-pagination`]: { margin: `${e.margin}px 0` },
        [`${t}-pagination`]: {
          display: 'flex',
          flexWrap: 'wrap',
          rowGap: e.paddingXS,
          '> *': { flex: 'none' },
          '&-left': { justifyContent: 'flex-start' },
          '&-center': { justifyContent: 'center' },
          '&-right': { justifyContent: 'flex-end' }
        }
      }
    };
  },
  Cd = xd,
  Sd = e => {
    const { componentCls: t, tableRadius: n } = e;
    return {
      [`${t}-wrapper`]: {
        [t]: {
          [`${t}-title, ${t}-header`]: { borderRadius: `${n}px ${n}px 0 0` },
          [`${t}-title + ${t}-container`]: {
            borderStartStartRadius: 0,
            borderStartEndRadius: 0,
            table: {
              borderRadius: 0,
              '> thead > tr:first-child': {
                'th:first-child': { borderRadius: 0 },
                'th:last-child': { borderRadius: 0 }
              }
            }
          },
          '&-container': {
            borderStartStartRadius: n,
            borderStartEndRadius: n,
            'table > thead > tr:first-child': {
              '> *:first-child': { borderStartStartRadius: n },
              '> *:last-child': { borderStartEndRadius: n }
            }
          },
          '&-footer': { borderRadius: `0 0 ${n}px ${n}px` }
        }
      }
    };
  },
  $d = Sd,
  wd = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-wrapper-rtl`]: {
        direction: 'rtl',
        table: { direction: 'rtl' },
        [`${t}-pagination-left`]: { justifyContent: 'flex-end' },
        [`${t}-pagination-right`]: { justifyContent: 'flex-start' },
        [`${t}-row-expand-icon`]: {
          '&::after': { transform: 'rotate(-90deg)' },
          '&-collapsed::before': { transform: 'rotate(180deg)' },
          '&-collapsed::after': { transform: 'rotate(0deg)' }
        }
      }
    };
  },
  Od = wd,
  Pd = e => {
    const {
      componentCls: t,
      antCls: n,
      iconCls: o,
      fontSizeIcon: l,
      paddingXS: r,
      tableHeaderIconColor: a,
      tableHeaderIconColorHover: i
    } = e;
    return {
      [`${t}-wrapper`]: {
        [`${t}-selection-col`]: { width: e.tableSelectionColumnWidth },
        [`${t}-bordered ${t}-selection-col`]: {
          width: e.tableSelectionColumnWidth + r * 2
        },
        [`
        table tr th${t}-selection-column,
        table tr td${t}-selection-column
      `]: {
          paddingInlineEnd: e.paddingXS,
          paddingInlineStart: e.paddingXS,
          textAlign: 'center',
          [`${n}-radio-wrapper`]: { marginInlineEnd: 0 }
        },
        [`table tr th${t}-selection-column${t}-cell-fix-left`]: {
          zIndex: e.zIndexTableFixed + 1
        },
        [`table tr th${t}-selection-column::after`]: {
          backgroundColor: 'transparent !important'
        },
        [`${t}-selection`]: {
          position: 'relative',
          display: 'inline-flex',
          flexDirection: 'column'
        },
        [`${t}-selection-extra`]: {
          position: 'absolute',
          top: 0,
          zIndex: 1,
          cursor: 'pointer',
          transition: `all ${e.motionDurationSlow}`,
          marginInlineStart: '100%',
          paddingInlineStart: `${e.tablePaddingHorizontal / 4}px`,
          [o]: {
            color: a,
            fontSize: l,
            verticalAlign: 'baseline',
            '&:hover': { color: i }
          }
        }
      }
    };
  },
  kd = Pd,
  Id = e => {
    const { componentCls: t } = e,
      n = (o, l, r, a) => ({
        [`${t}${t}-${o}`]: {
          fontSize: a,
          [`
        ${t}-title,
        ${t}-footer,
        ${t}-thead > tr > th,
        ${t}-tbody > tr > td,
        tfoot > tr > th,
        tfoot > tr > td
      `]: { padding: `${l}px ${r}px` },
          [`${t}-filter-trigger`]: { marginInlineEnd: `-${r / 2}px` },
          [`${t}-expanded-row-fixed`]: { margin: `-${l}px -${r}px` },
          [`${t}-tbody`]: {
            [`${t}-wrapper:only-child ${t}`]: {
              marginBlock: `-${l}px`,
              marginInline: `${e.tableExpandColumnWidth - r}px -${r}px`
            }
          },
          [`${t}-selection-column`]: { paddingInlineStart: `${r / 4}px` }
        }
      });
    return {
      [`${t}-wrapper`]: g(
        g(
          {},
          n(
            'middle',
            e.tablePaddingVerticalMiddle,
            e.tablePaddingHorizontalMiddle,
            e.tableFontSizeMiddle
          )
        ),
        n(
          'small',
          e.tablePaddingVerticalSmall,
          e.tablePaddingHorizontalSmall,
          e.tableFontSizeSmall
        )
      )
    };
  },
  Ed = Id,
  Td = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-wrapper ${t}-resize-handle`]: {
        position: 'absolute',
        top: 0,
        height: '100% !important',
        bottom: 0,
        left: ' auto !important',
        right: ' -8px',
        cursor: 'col-resize',
        touchAction: 'none',
        userSelect: 'auto',
        width: '16px',
        zIndex: 1,
        '&-line': {
          display: 'block',
          width: '1px',
          marginLeft: '7px',
          height: '100% !important',
          backgroundColor: e.colorPrimary,
          opacity: 0
        },
        '&:hover &-line': { opacity: 1 }
      },
      [`${t}-wrapper  ${t}-resize-handle.dragging`]: {
        overflow: 'hidden',
        [`${t}-resize-handle-line`]: { opacity: 1 },
        '&:before': {
          position: 'absolute',
          top: 0,
          bottom: 0,
          content: '" "',
          width: '200vw',
          transform: 'translateX(-50%)',
          opacity: 0
        }
      }
    };
  },
  Kd = Td,
  Dd = e => {
    const {
      componentCls: t,
      marginXXS: n,
      fontSizeIcon: o,
      tableHeaderIconColor: l,
      tableHeaderIconColorHover: r
    } = e;
    return {
      [`${t}-wrapper`]: {
        [`${t}-thead th${t}-column-has-sorters`]: {
          outline: 'none',
          cursor: 'pointer',
          transition: `all ${e.motionDurationSlow}`,
          '&:hover': {
            background: e.tableHeaderSortHoverBg,
            '&::before': { backgroundColor: 'transparent !important' }
          },
          '&:focus-visible': { color: e.colorPrimary },
          [`
          &${t}-cell-fix-left:hover,
          &${t}-cell-fix-right:hover
        `]: { background: e.tableFixedHeaderSortActiveBg }
        },
        [`${t}-thead th${t}-column-sort`]: {
          background: e.tableHeaderSortBg,
          '&::before': { backgroundColor: 'transparent !important' }
        },
        [`td${t}-column-sort`]: { background: e.tableBodySortBg },
        [`${t}-column-title`]: { position: 'relative', zIndex: 1, flex: 1 },
        [`${t}-column-sorters`]: {
          display: 'flex',
          flex: 'auto',
          alignItems: 'center',
          justifyContent: 'space-between',
          '&::after': {
            position: 'absolute',
            inset: 0,
            width: '100%',
            height: '100%',
            content: '""'
          }
        },
        [`${t}-column-sorter`]: {
          marginInlineStart: n,
          color: l,
          fontSize: 0,
          transition: `color ${e.motionDurationSlow}`,
          '&-inner': {
            display: 'inline-flex',
            flexDirection: 'column',
            alignItems: 'center'
          },
          '&-up, &-down': {
            fontSize: o,
            '&.active': { color: e.colorPrimary }
          },
          [`${t}-column-sorter-up + ${t}-column-sorter-down`]: {
            marginTop: '-0.3em'
          }
        },
        [`${t}-column-sorters:hover ${t}-column-sorter`]: { color: r }
      }
    };
  },
  Nd = Dd,
  Rd = e => {
    const {
        componentCls: t,
        opacityLoading: n,
        tableScrollThumbBg: o,
        tableScrollThumbBgHover: l,
        tableScrollThumbSize: r,
        tableScrollBg: a,
        zIndexTableSticky: i
      } = e,
      s = `${e.lineWidth}px ${e.lineType} ${e.tableBorderColor}`;
    return {
      [`${t}-wrapper`]: {
        [`${t}-sticky`]: {
          '&-holder': {
            position: 'sticky',
            zIndex: i,
            background: e.colorBgContainer
          },
          '&-scroll': {
            position: 'sticky',
            bottom: 0,
            height: `${r}px !important`,
            zIndex: i,
            display: 'flex',
            alignItems: 'center',
            background: a,
            borderTop: s,
            opacity: n,
            '&:hover': { transformOrigin: 'center bottom' },
            '&-bar': {
              height: r,
              backgroundColor: o,
              borderRadius: 100,
              transition: `all ${e.motionDurationSlow}, transform none`,
              position: 'absolute',
              bottom: 0,
              '&:hover, &-active': { backgroundColor: l }
            }
          }
        }
      }
    };
  },
  Bd = Rd,
  _d = e => {
    const { componentCls: t, lineWidth: n, tableBorderColor: o } = e,
      l = `${n}px ${e.lineType} ${o}`;
    return {
      [`${t}-wrapper`]: {
        [`${t}-summary`]: {
          position: 'relative',
          zIndex: e.zIndexTableFixed,
          background: e.tableBg,
          '> tr': { '> th, > td': { borderBottom: l } }
        },
        [`div${t}-summary`]: { boxShadow: `0 -${n}px 0 ${o}` }
      }
    };
  },
  gl = _d,
  Ad = e => {
    const {
        componentCls: t,
        fontWeightStrong: n,
        tablePaddingVertical: o,
        tablePaddingHorizontal: l,
        lineWidth: r,
        lineType: a,
        tableBorderColor: i,
        tableFontSize: s,
        tableBg: f,
        tableRadius: c,
        tableHeaderTextColor: u,
        motionDurationMid: y,
        tableHeaderBg: x,
        tableHeaderCellSplitColor: b,
        tableRowHoverBg: v,
        tableSelectedRowBg: d,
        tableSelectedRowHoverBg: p,
        tableFooterTextColor: $,
        tableFooterBg: m,
        paddingContentVerticalLG: S
      } = e,
      O = `${r}px ${a} ${i}`;
    return {
      [`${t}-wrapper`]: g(g({ clear: 'both', maxWidth: '100%' }, _r()), {
        [t]: g(g({}, et(e)), {
          fontSize: s,
          background: f,
          borderRadius: `${c}px ${c}px 0 0`
        }),
        table: {
          width: '100%',
          textAlign: 'start',
          borderRadius: `${c}px ${c}px 0 0`,
          borderCollapse: 'separate',
          borderSpacing: 0
        },
        [`
          ${t}-thead > tr > th,
          ${t}-tbody > tr > td,
          tfoot > tr > th,
          tfoot > tr > td
        `]: {
          position: 'relative',
          padding: `${S}px ${l}px`,
          overflowWrap: 'break-word'
        },
        [`${t}-title`]: { padding: `${o}px ${l}px` },
        [`${t}-thead`]: {
          '\n          > tr > th,\n          > tr > td\n        ': {
            position: 'relative',
            color: u,
            fontWeight: n,
            textAlign: 'start',
            background: x,
            borderBottom: O,
            transition: `background ${y} ease`,
            "&[colspan]:not([colspan='1'])": { textAlign: 'center' },
            [`&:not(:last-child):not(${t}-selection-column):not(${t}-row-expand-icon-cell):not([colspan])::before`]: {
              position: 'absolute',
              top: '50%',
              insetInlineEnd: 0,
              width: 1,
              height: '1.6em',
              backgroundColor: b,
              transform: 'translateY(-50%)',
              transition: `background-color ${y}`,
              content: '""'
            }
          },
          '> tr:not(:last-child) > th[colspan]': { borderBottom: 0 }
        },
        [`${t}:not(${t}-bordered)`]: {
          [`${t}-tbody`]: {
            '> tr': {
              '> td': { borderTop: O, borderBottom: 'transparent' },
              '&:last-child > td': { borderBottom: O },
              [`&:first-child > td,
              &${t}-measure-row + tr > td`]: {
                borderTop: 'none',
                borderTopColor: 'transparent'
              }
            }
          }
        },
        [`${t}${t}-bordered`]: {
          [`${t}-tbody`]: { '> tr': { '> td': { borderBottom: O } } }
        },
        [`${t}-tbody`]: {
          '> tr': {
            '> td': {
              transition: `background ${y}, border-color ${y}`,
              [`
              > ${t}-wrapper:only-child,
              > ${t}-expanded-row-fixed > ${t}-wrapper:only-child
            `]: {
                [t]: {
                  marginBlock: `-${o}px`,
                  marginInline: `${e.tableExpandColumnWidth - l}px -${l}px`,
                  [`${t}-tbody > tr:last-child > td`]: {
                    borderBottom: 0,
                    '&:first-child, &:last-child': { borderRadius: 0 }
                  }
                }
              }
            },
            [`
            &${t}-row:hover > td,
            > td${t}-cell-row-hover
          `]: { background: v },
            [`&${t}-row-selected`]: {
              '> td': { background: d },
              '&:hover > td': { background: p }
            }
          }
        },
        [`${t}-footer`]: { padding: `${o}px ${l}px`, color: $, background: m }
      })
    };
  },
  Fd = Nt('Table', e => {
    const {
        controlItemBgActive: t,
        controlItemBgActiveHover: n,
        colorTextPlaceholder: o,
        colorTextHeading: l,
        colorSplit: r,
        colorBorderSecondary: a,
        fontSize: i,
        padding: s,
        paddingXS: f,
        paddingSM: c,
        controlHeight: u,
        colorFillAlter: y,
        colorIcon: x,
        colorIconHover: b,
        opacityLoading: v,
        colorBgContainer: d,
        borderRadiusLG: p,
        colorFillContent: $,
        colorFillSecondary: m,
        controlInteractiveSize: S
      } = e,
      O = new zt(x),
      I = new zt(b),
      k = t,
      T = 2,
      C = new zt(m).onBackground(d).toHexString(),
      E = new zt($).onBackground(d).toHexString(),
      D = new zt(y).onBackground(d).toHexString(),
      A = Rt(e, {
        tableFontSize: i,
        tableBg: d,
        tableRadius: p,
        tablePaddingVertical: s,
        tablePaddingHorizontal: s,
        tablePaddingVerticalMiddle: c,
        tablePaddingHorizontalMiddle: f,
        tablePaddingVerticalSmall: f,
        tablePaddingHorizontalSmall: f,
        tableBorderColor: a,
        tableHeaderTextColor: l,
        tableHeaderBg: D,
        tableFooterTextColor: l,
        tableFooterBg: D,
        tableHeaderCellSplitColor: a,
        tableHeaderSortBg: C,
        tableHeaderSortHoverBg: E,
        tableHeaderIconColor: O.clone()
          .setAlpha(O.getAlpha() * v)
          .toRgbString(),
        tableHeaderIconColorHover: I.clone()
          .setAlpha(I.getAlpha() * v)
          .toRgbString(),
        tableBodySortBg: D,
        tableFixedHeaderSortActiveBg: C,
        tableHeaderFilterActiveBg: $,
        tableFilterDropdownBg: d,
        tableRowHoverBg: D,
        tableSelectedRowBg: k,
        tableSelectedRowHoverBg: n,
        zIndexTableFixed: T,
        zIndexTableSticky: T + 1,
        tableFontSizeMiddle: i,
        tableFontSizeSmall: i,
        tableSelectionColumnWidth: u,
        tableExpandIconBg: d,
        tableExpandColumnWidth: S + 2 * e.padding,
        tableExpandedRowBg: y,
        tableFilterDropdownWidth: 120,
        tableFilterDropdownHeight: 264,
        tableFilterDropdownSearchWidth: 140,
        tableScrollThumbSize: 8,
        tableScrollThumbBg: o,
        tableScrollThumbBgHover: l,
        tableScrollBg: r
      });
    return [
      Ad(A),
      Cd(A),
      gl(A),
      Nd(A),
      md(A),
      cd(A),
      $d(A),
      hd(A),
      gl(A),
      pd(A),
      kd(A),
      bd(A),
      Bd(A),
      ud(A),
      Ed(A),
      Kd(A),
      Od(A)
    ];
  }),
  zd = [],
  gr = () => ({
    prefixCls: Ue(),
    columns: Le(),
    rowKey: Ge([String, Function]),
    tableLayout: Ue(),
    rowClassName: Ge([String, Function]),
    title: ye(),
    footer: ye(),
    id: Ue(),
    showHeader: fe(),
    components: rt(),
    customRow: ye(),
    customHeaderRow: ye(),
    direction: Ue(),
    expandFixed: Ge([Boolean, String]),
    expandColumnWidth: Number,
    expandedRowKeys: Le(),
    defaultExpandedRowKeys: Le(),
    expandedRowRender: ye(),
    expandRowByClick: fe(),
    expandIcon: ye(),
    onExpand: ye(),
    onExpandedRowsChange: ye(),
    'onUpdate:expandedRowKeys': ye(),
    defaultExpandAllRows: fe(),
    indentSize: Number,
    expandIconColumnIndex: Number,
    showExpandColumn: fe(),
    expandedRowClassName: ye(),
    childrenColumnName: Ue(),
    rowExpandable: ye(),
    sticky: Ge([Boolean, Object]),
    dropdownPrefixCls: String,
    dataSource: Le(),
    pagination: Ge([Boolean, Object]),
    loading: Ge([Boolean, Object]),
    size: Ue(),
    bordered: fe(),
    locale: rt(),
    onChange: ye(),
    onResizeColumn: ye(),
    rowSelection: rt(),
    getPopupContainer: ye(),
    scroll: rt(),
    sortDirections: Le(),
    showSorterTooltip: Ge([Boolean, Object], !0),
    transformCellText: ye()
  }),
  Md = ve({
    name: 'InternalTable',
    inheritAttrs: !1,
    props: bt(g(g({}, gr()), { contextSlots: rt() }), { rowKey: 'key' }),
    setup(e, t) {
      let { attrs: n, slots: o, expose: l, emit: r } = t;
      We(
        !(typeof e.rowKey == 'function' && e.rowKey.length > 1),
        'Table',
        '`index` parameter of `rowKey` function is deprecated. There is no guarantee that it will work as expected.'
      ),
        Es(w(() => e.contextSlots)),
        Ts({
          onResizeColumn: (G, ce) => {
            r('resizeColumn', G, ce);
          }
        });
      const a = wl(),
        i = w(() => {
          const G = new Set(Object.keys(a.value).filter(ce => a.value[ce]));
          return e.columns.filter(
            ce => !ce.responsive || ce.responsive.some(J => G.has(J))
          );
        }),
        {
          size: s,
          renderEmpty: f,
          direction: c,
          prefixCls: u,
          configProvider: y
        } = Ye('table', e),
        [x, b] = Fd(u),
        v = w(() => {
          var G;
          return (
            e.transformCellText ||
            ((G = y.transformCellText) === null || G === void 0
              ? void 0
              : G.value)
          );
        }),
        [d] = yl('Table', Ar.Table, ze(e, 'locale')),
        p = w(() => e.dataSource || zd),
        $ = w(() => y.getPrefixCls('dropdown', e.dropdownPrefixCls)),
        m = w(() => e.childrenColumnName || 'children'),
        S = w(() =>
          p.value.some(G => (G == null ? void 0 : G[m.value]))
            ? 'nest'
            : e.expandedRowRender
            ? 'row'
            : null
        ),
        O = gt({ body: null }),
        I = G => {
          g(O, G);
        },
        k = w(() =>
          typeof e.rowKey == 'function'
            ? e.rowKey
            : G => (G == null ? void 0 : G[e.rowKey])
        ),
        [T] = $c(p, m, k),
        C = {},
        E = function(G, ce) {
          let J =
            arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !1;
          const { pagination: se, scroll: ue, onChange: Pe } = e,
            de = g(g({}, C), G);
          J &&
            (C.resetPagination(),
            de.pagination.current && (de.pagination.current = 1),
            se && se.onChange && se.onChange(1, de.pagination.pageSize)),
            ue &&
              ue.scrollToFirstRowOnChange !== !1 &&
              O.body &&
              Ba(0, { getContainer: () => O.body }),
            Pe == null ||
              Pe(de.pagination, de.filters, de.sorter, {
                currentDataSource: hl(
                  Ln(p.value, de.sorterStates, m.value),
                  de.filterStates
                ),
                action: ce
              });
        },
        D = (G, ce) => {
          E({ sorter: G, sorterStates: ce }, 'sort', !1);
        },
        [A, F, U, ee] = Ic({
          prefixCls: u,
          mergedColumns: i,
          onSorterChange: D,
          sortDirections: w(() => e.sortDirections || ['ascend', 'descend']),
          tableLocale: d,
          showSorterTooltip: ze(e, 'showSorterTooltip')
        }),
        Z = w(() => Ln(p.value, F.value, m.value)),
        he = (G, ce) => {
          E({ filters: G, filterStates: ce }, 'filter', !0);
        },
        [X, Y, L] = ld({
          prefixCls: u,
          locale: d,
          dropdownPrefixCls: $,
          mergedColumns: i,
          onFilterChange: he,
          getPopupContainer: ze(e, 'getPopupContainer')
        }),
        Q = w(() => hl(Z.value, Y.value)),
        [B] = id(ze(e, 'contextSlots')),
        H = w(() => {
          const G = {},
            ce = L.value;
          return (
            Object.keys(ce).forEach(J => {
              ce[J] !== null && (G[J] = ce[J]);
            }),
            g(g({}, U.value), { filters: G })
          );
        }),
        [M] = rd(H),
        j = (G, ce) => {
          E(
            {
              pagination: g(g({}, C.pagination), { current: G, pageSize: ce })
            },
            'paginate'
          );
        },
        [ne, oe] = Sc(
          w(() => Q.value.length),
          ze(e, 'pagination'),
          j
        );
      Re(() => {
        (C.sorter = ee.value),
          (C.sorterStates = F.value),
          (C.filters = L.value),
          (C.filterStates = Y.value),
          (C.pagination =
            e.pagination === !1 ? {} : Cc(ne.value, e.pagination)),
          (C.resetPagination = oe);
      });
      const Ke = w(() => {
        if (e.pagination === !1 || !ne.value.pageSize) return Q.value;
        const { current: G = 1, total: ce, pageSize: J = An } = ne.value;
        return (
          We(G > 0, 'Table', '`current` should be positive number.'),
          Q.value.length < ce
            ? Q.value.length > J
              ? Q.value.slice((G - 1) * J, G * J)
              : Q.value
            : Q.value.slice((G - 1) * J, G * J)
        );
      });
      Re(
        () => {
          ft(() => {
            const { total: G, pageSize: ce = An } = ne.value;
            Q.value.length < G &&
              Q.value.length > ce &&
              We(
                !1,
                'Table',
                '`dataSource` length is less than `pagination.total` but large than `pagination.pageSize`. Please make sure your config correct data with async mode.'
              );
          });
        },
        { flush: 'post' }
      );
      const Ie = w(() =>
          e.showExpandColumn === !1
            ? -1
            : S.value === 'nest' && e.expandIconColumnIndex === void 0
            ? e.rowSelection
              ? 1
              : 0
            : e.expandIconColumnIndex > 0 && e.rowSelection
            ? e.expandIconColumnIndex - 1
            : e.expandIconColumnIndex
        ),
        De = pe();
      Te(
        () => e.rowSelection,
        () => {
          De.value = e.rowSelection ? g({}, e.rowSelection) : e.rowSelection;
        },
        { deep: !0, immediate: !0 }
      );
      const [_e, je] = Oc(De, {
          prefixCls: u,
          data: Q,
          pageData: Ke,
          getRowKey: k,
          getRecordByKey: T,
          expandType: S,
          childrenColumnName: m,
          locale: d,
          getPopupContainer: w(() => e.getPopupContainer)
        }),
        Ve = (G, ce, J) => {
          let se;
          const { rowClassName: ue } = e;
          return (
            typeof ue == 'function' ? (se = ie(ue(G, ce, J))) : (se = ie(ue)),
            ie(
              { [`${u.value}-row-selected`]: je.value.has(k.value(G, ce)) },
              se
            )
          );
        };
      l({ selectedKeySet: je });
      const Ne = w(() => (typeof e.indentSize == 'number' ? e.indentSize : 15)),
        Ee = G => M(_e(X(A(B(G)))));
      return () => {
        var G;
        const {
          expandIcon: ce = o.expandIcon || ad(d.value),
          pagination: J,
          loading: se,
          bordered: ue
        } = e;
        let Pe, de;
        if (J !== !1 && !((G = ne.value) === null || G === void 0) && G.total) {
          let P;
          ne.value.size
            ? (P = ne.value.size)
            : (P =
                s.value === 'small' || s.value === 'middle' ? 'small' : void 0);
          const R = we =>
              h(
                Os,
                W(
                  W({}, ne.value),
                  {},
                  {
                    class: [
                      `${u.value}-pagination ${u.value}-pagination-${we}`,
                      ne.value.class
                    ],
                    size: P
                  }
                ),
                null
              ),
            te = c.value === 'rtl' ? 'left' : 'right',
            { position: ge } = ne.value;
          if (ge !== null && Array.isArray(ge)) {
            const we = ge.find(z => z.includes('top')),
              N = ge.find(z => z.includes('bottom')),
              _ = ge.every(z => `${z}` == 'none');
            !we && !N && !_ && (de = R(te)),
              we && (Pe = R(we.toLowerCase().replace('top', ''))),
              N && (de = R(N.toLowerCase().replace('bottom', '')));
          } else de = R(te);
        }
        let xe;
        typeof se == 'boolean'
          ? (xe = { spinning: se })
          : typeof se == 'object' && (xe = g({ spinning: !0 }, se));
        const ke = ie(
            `${u.value}-wrapper`,
            { [`${u.value}-wrapper-rtl`]: c.value === 'rtl' },
            n.class,
            b.value
          ),
          K = Bt(e, ['columns']);
        return x(
          h('div', { class: ke, style: n.style }, [
            h(ga, W({ spinning: !1 }, xe), {
              default: () => [
                Pe,
                h(
                  bc,
                  W(
                    W(W({}, n), K),
                    {},
                    {
                      expandedRowKeys: e.expandedRowKeys,
                      defaultExpandedRowKeys: e.defaultExpandedRowKeys,
                      expandIconColumnIndex: Ie.value,
                      indentSize: Ne.value,
                      expandIcon: ce,
                      columns: i.value,
                      direction: c.value,
                      prefixCls: u.value,
                      class: ie({
                        [`${u.value}-middle`]: s.value === 'middle',
                        [`${u.value}-small`]: s.value === 'small',
                        [`${u.value}-bordered`]: ue,
                        [`${u.value}-empty`]: p.value.length === 0
                      }),
                      data: Ke.value,
                      rowKey: k.value,
                      rowClassName: Ve,
                      internalHooks: _n,
                      internalRefs: O,
                      onUpdateInternalRefs: I,
                      transformColumns: Ee,
                      transformCellText: v.value
                    }
                  ),
                  g(g({}, o), {
                    emptyText: () => {
                      var P, R;
                      return (
                        ((P = o.emptyText) === null || P === void 0
                          ? void 0
                          : P.call(o)) ||
                        ((R = e.locale) === null || R === void 0
                          ? void 0
                          : R.emptyText) ||
                        f('Table')
                      );
                    }
                  })
                ),
                de
              ]
            })
          ])
        );
      };
    }
  }),
  jd = ve({
    name: 'ATable',
    inheritAttrs: !1,
    props: bt(gr(), { rowKey: 'key' }),
    slots: Object,
    setup(e, t) {
      let { attrs: n, slots: o, expose: l } = t;
      const r = pe();
      return (
        l({ table: r }),
        () => {
          var a;
          const i =
            e.columns ||
            ir((a = o.default) === null || a === void 0 ? void 0 : a.call(o));
          return h(
            Md,
            W(
              W(W({ ref: r }, n), e),
              {},
              {
                columns: i || [],
                expandedRowRender: o.expandedRowRender || e.expandedRowRender,
                contextSlots: g({}, o)
              }
            ),
            o
          );
        }
      );
    }
  }),
  xn = jd,
  Cn = ve({
    name: 'ATableColumn',
    slots: Object,
    render() {
      return null;
    }
  }),
  Sn = ve({
    name: 'ATableColumnGroup',
    slots: Object,
    __ANT_TABLE_COLUMN_GROUP: !0,
    render() {
      return null;
    }
  }),
  Vn = ic,
  Xn = dc,
  $n = g(uc, { Cell: Xn, Row: Vn, name: 'ATableSummary' }),
  Jd = g(xn, {
    SELECTION_ALL: Fn,
    SELECTION_INVERT: zn,
    SELECTION_NONE: Mn,
    SELECTION_COLUMN: Ze,
    EXPAND_COLUMN: lt,
    Column: Cn,
    ColumnGroup: Sn,
    Summary: $n,
    install: e => (
      e.component($n.name, $n),
      e.component(Xn.name, Xn),
      e.component(Vn.name, Vn),
      e.component(xn.name, xn),
      e.component(Cn.name, Cn),
      e.component(Sn.name, Sn),
      e
    )
  });
export { Os as P, Jd as T };

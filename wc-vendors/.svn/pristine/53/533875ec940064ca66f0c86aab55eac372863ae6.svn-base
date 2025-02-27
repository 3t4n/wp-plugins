import {
  S as Re,
  _ as f,
  W as Ba,
  P as _,
  a as D,
  X as si,
  f as Xe,
  e as ie,
  Y as dt,
  H as Qn,
  x as Je,
  v as ui,
  Z as za,
  $ as ot,
  a0 as Ha,
  a1 as Po,
  l as Xt,
  a2 as La,
  y as Fa,
  a3 as ja,
  a4 as Wa,
  a5 as _o,
  a6 as Va,
  A as Mt,
  g as ft,
  u as ze,
  a7 as rt,
  K as le,
  a8 as Jn,
  o as De,
  m as $e,
  r as an,
  n as eo,
  a9 as Ka,
  D as Ua,
  aa as Ga,
  w as Xa,
  ab as Ya,
  ac as Yt,
  ad as Ao,
  j as qa,
  ae as Za,
  af as ci,
  ag as Mo,
  ah as ka,
  i as Qa,
  B as Dn,
  ai as Ja,
  s as el,
  E as Fe,
  J as tl,
  b as ye,
  aj as nl,
  ak as Dt
} from '../main.4e11cfe3.js';
import {
  d as Y,
  m as to,
  z as Ee,
  v as ln,
  A as no,
  g as ee,
  y as He,
  c as h,
  R as sn,
  $ as ol,
  q as pt,
  r as G,
  s as B,
  k as we,
  e as S,
  U as rl,
  n as Se,
  a0 as Nn,
  S as di,
  O as Ro,
  j as Te,
  f as he,
  p as Ce,
  F as it,
  u as yt,
  W as Bn,
  D as fi,
  T as il,
  x as al,
  E as ll,
  X as sl
} from './vendor.e5025a5c.js';
import {
  o as ul,
  p as cl,
  q as dl,
  T as Do,
  r as fl,
  s as pl
} from './antd.e3fbf92b.js';
import { i as pi } from './initDefaultProps.d90010a5.js';
var mi = (function() {
    if (typeof Map < 'u') return Map;
    function e(t, n) {
      var o = -1;
      return (
        t.some(function(r, i) {
          return r[0] === n ? ((o = i), !0) : !1;
        }),
        o
      );
    }
    return (function() {
      function t() {
        this.__entries__ = [];
      }
      return (
        Object.defineProperty(t.prototype, 'size', {
          get: function() {
            return this.__entries__.length;
          },
          enumerable: !0,
          configurable: !0
        }),
        (t.prototype.get = function(n) {
          var o = e(this.__entries__, n),
            r = this.__entries__[o];
          return r && r[1];
        }),
        (t.prototype.set = function(n, o) {
          var r = e(this.__entries__, n);
          ~r ? (this.__entries__[r][1] = o) : this.__entries__.push([n, o]);
        }),
        (t.prototype.delete = function(n) {
          var o = this.__entries__,
            r = e(o, n);
          ~r && o.splice(r, 1);
        }),
        (t.prototype.has = function(n) {
          return !!~e(this.__entries__, n);
        }),
        (t.prototype.clear = function() {
          this.__entries__.splice(0);
        }),
        (t.prototype.forEach = function(n, o) {
          o === void 0 && (o = null);
          for (var r = 0, i = this.__entries__; r < i.length; r++) {
            var a = i[r];
            n.call(o, a[1], a[0]);
          }
        }),
        t
      );
    })();
  })(),
  zn =
    typeof window < 'u' &&
    typeof document < 'u' &&
    window.document === document,
  qt = (function() {
    return typeof global < 'u' && global.Math === Math
      ? global
      : typeof self < 'u' && self.Math === Math
      ? self
      : typeof window < 'u' && window.Math === Math
      ? window
      : Function('return this')();
  })(),
  ml = (function() {
    return typeof requestAnimationFrame == 'function'
      ? requestAnimationFrame.bind(qt)
      : function(e) {
          return setTimeout(function() {
            return e(Date.now());
          }, 1e3 / 60);
        };
  })(),
  vl = 2;
function gl(e, t) {
  var n = !1,
    o = !1,
    r = 0;
  function i() {
    n && ((n = !1), e()), o && l();
  }
  function a() {
    ml(i);
  }
  function l() {
    var s = Date.now();
    if (n) {
      if (s - r < vl) return;
      o = !0;
    } else (n = !0), (o = !1), setTimeout(a, t);
    r = s;
  }
  return l;
}
var hl = 20,
  bl = ['top', 'right', 'bottom', 'left', 'width', 'height', 'size', 'weight'],
  yl = typeof MutationObserver < 'u',
  $l = (function() {
    function e() {
      (this.connected_ = !1),
        (this.mutationEventsAdded_ = !1),
        (this.mutationsObserver_ = null),
        (this.observers_ = []),
        (this.onTransitionEnd_ = this.onTransitionEnd_.bind(this)),
        (this.refresh = gl(this.refresh.bind(this), hl));
    }
    return (
      (e.prototype.addObserver = function(t) {
        ~this.observers_.indexOf(t) || this.observers_.push(t),
          this.connected_ || this.connect_();
      }),
      (e.prototype.removeObserver = function(t) {
        var n = this.observers_,
          o = n.indexOf(t);
        ~o && n.splice(o, 1),
          !n.length && this.connected_ && this.disconnect_();
      }),
      (e.prototype.refresh = function() {
        var t = this.updateObservers_();
        t && this.refresh();
      }),
      (e.prototype.updateObservers_ = function() {
        var t = this.observers_.filter(function(n) {
          return n.gatherActive(), n.hasActive();
        });
        return (
          t.forEach(function(n) {
            return n.broadcastActive();
          }),
          t.length > 0
        );
      }),
      (e.prototype.connect_ = function() {
        !zn ||
          this.connected_ ||
          (document.addEventListener('transitionend', this.onTransitionEnd_),
          window.addEventListener('resize', this.refresh),
          yl
            ? ((this.mutationsObserver_ = new MutationObserver(this.refresh)),
              this.mutationsObserver_.observe(document, {
                attributes: !0,
                childList: !0,
                characterData: !0,
                subtree: !0
              }))
            : (document.addEventListener('DOMSubtreeModified', this.refresh),
              (this.mutationEventsAdded_ = !0)),
          (this.connected_ = !0));
      }),
      (e.prototype.disconnect_ = function() {
        !zn ||
          !this.connected_ ||
          (document.removeEventListener('transitionend', this.onTransitionEnd_),
          window.removeEventListener('resize', this.refresh),
          this.mutationsObserver_ && this.mutationsObserver_.disconnect(),
          this.mutationEventsAdded_ &&
            document.removeEventListener('DOMSubtreeModified', this.refresh),
          (this.mutationsObserver_ = null),
          (this.mutationEventsAdded_ = !1),
          (this.connected_ = !1));
      }),
      (e.prototype.onTransitionEnd_ = function(t) {
        var n = t.propertyName,
          o = n === void 0 ? '' : n,
          r = bl.some(function(i) {
            return !!~o.indexOf(i);
          });
        r && this.refresh();
      }),
      (e.getInstance = function() {
        return this.instance_ || (this.instance_ = new e()), this.instance_;
      }),
      (e.instance_ = null),
      e
    );
  })(),
  vi = function(e, t) {
    for (var n = 0, o = Object.keys(t); n < o.length; n++) {
      var r = o[n];
      Object.defineProperty(e, r, {
        value: t[r],
        enumerable: !1,
        writable: !1,
        configurable: !0
      });
    }
    return e;
  },
  at = function(e) {
    var t = e && e.ownerDocument && e.ownerDocument.defaultView;
    return t || qt;
  },
  gi = un(0, 0, 0, 0);
function Zt(e) {
  return parseFloat(e) || 0;
}
function No(e) {
  for (var t = [], n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
  return t.reduce(function(o, r) {
    var i = e['border-' + r + '-width'];
    return o + Zt(i);
  }, 0);
}
function wl(e) {
  for (
    var t = ['top', 'right', 'bottom', 'left'], n = {}, o = 0, r = t;
    o < r.length;
    o++
  ) {
    var i = r[o],
      a = e['padding-' + i];
    n[i] = Zt(a);
  }
  return n;
}
function Sl(e) {
  var t = e.getBBox();
  return un(0, 0, t.width, t.height);
}
function Cl(e) {
  var t = e.clientWidth,
    n = e.clientHeight;
  if (!t && !n) return gi;
  var o = at(e).getComputedStyle(e),
    r = wl(o),
    i = r.left + r.right,
    a = r.top + r.bottom,
    l = Zt(o.width),
    s = Zt(o.height);
  if (
    (o.boxSizing === 'border-box' &&
      (Math.round(l + i) !== t && (l -= No(o, 'left', 'right') + i),
      Math.round(s + a) !== n && (s -= No(o, 'top', 'bottom') + a)),
    !Ol(e))
  ) {
    var u = Math.round(l + i) - t,
      d = Math.round(s + a) - n;
    Math.abs(u) !== 1 && (l -= u), Math.abs(d) !== 1 && (s -= d);
  }
  return un(r.left, r.top, l, s);
}
var xl = (function() {
  return typeof SVGGraphicsElement < 'u'
    ? function(e) {
        return e instanceof at(e).SVGGraphicsElement;
      }
    : function(e) {
        return e instanceof at(e).SVGElement && typeof e.getBBox == 'function';
      };
})();
function Ol(e) {
  return e === at(e).document.documentElement;
}
function El(e) {
  return zn ? (xl(e) ? Sl(e) : Cl(e)) : gi;
}
function Tl(e) {
  var t = e.x,
    n = e.y,
    o = e.width,
    r = e.height,
    i = typeof DOMRectReadOnly < 'u' ? DOMRectReadOnly : Object,
    a = Object.create(i.prototype);
  return (
    vi(a, {
      x: t,
      y: n,
      width: o,
      height: r,
      top: n,
      right: t + o,
      bottom: r + n,
      left: t
    }),
    a
  );
}
function un(e, t, n, o) {
  return { x: e, y: t, width: n, height: o };
}
var Il = (function() {
    function e(t) {
      (this.broadcastWidth = 0),
        (this.broadcastHeight = 0),
        (this.contentRect_ = un(0, 0, 0, 0)),
        (this.target = t);
    }
    return (
      (e.prototype.isActive = function() {
        var t = El(this.target);
        return (
          (this.contentRect_ = t),
          t.width !== this.broadcastWidth || t.height !== this.broadcastHeight
        );
      }),
      (e.prototype.broadcastRect = function() {
        var t = this.contentRect_;
        return (
          (this.broadcastWidth = t.width), (this.broadcastHeight = t.height), t
        );
      }),
      e
    );
  })(),
  Pl = (function() {
    function e(t, n) {
      var o = Tl(n);
      vi(this, { target: t, contentRect: o });
    }
    return e;
  })(),
  _l = (function() {
    function e(t, n, o) {
      if (
        ((this.activeObservations_ = []),
        (this.observations_ = new mi()),
        typeof t != 'function')
      )
        throw new TypeError(
          'The callback provided as parameter 1 is not a function.'
        );
      (this.callback_ = t), (this.controller_ = n), (this.callbackCtx_ = o);
    }
    return (
      (e.prototype.observe = function(t) {
        if (!arguments.length)
          throw new TypeError('1 argument required, but only 0 present.');
        if (!(typeof Element > 'u' || !(Element instanceof Object))) {
          if (!(t instanceof at(t).Element))
            throw new TypeError('parameter 1 is not of type "Element".');
          var n = this.observations_;
          n.has(t) ||
            (n.set(t, new Il(t)),
            this.controller_.addObserver(this),
            this.controller_.refresh());
        }
      }),
      (e.prototype.unobserve = function(t) {
        if (!arguments.length)
          throw new TypeError('1 argument required, but only 0 present.');
        if (!(typeof Element > 'u' || !(Element instanceof Object))) {
          if (!(t instanceof at(t).Element))
            throw new TypeError('parameter 1 is not of type "Element".');
          var n = this.observations_;
          n.has(t) &&
            (n.delete(t), n.size || this.controller_.removeObserver(this));
        }
      }),
      (e.prototype.disconnect = function() {
        this.clearActive(),
          this.observations_.clear(),
          this.controller_.removeObserver(this);
      }),
      (e.prototype.gatherActive = function() {
        var t = this;
        this.clearActive(),
          this.observations_.forEach(function(n) {
            n.isActive() && t.activeObservations_.push(n);
          });
      }),
      (e.prototype.broadcastActive = function() {
        if (this.hasActive()) {
          var t = this.callbackCtx_,
            n = this.activeObservations_.map(function(o) {
              return new Pl(o.target, o.broadcastRect());
            });
          this.callback_.call(t, n, t), this.clearActive();
        }
      }),
      (e.prototype.clearActive = function() {
        this.activeObservations_.splice(0);
      }),
      (e.prototype.hasActive = function() {
        return this.activeObservations_.length > 0;
      }),
      e
    );
  })(),
  hi = typeof WeakMap < 'u' ? new WeakMap() : new mi(),
  bi = (function() {
    function e(t) {
      if (!(this instanceof e))
        throw new TypeError('Cannot call a class as a function.');
      if (!arguments.length)
        throw new TypeError('1 argument required, but only 0 present.');
      var n = $l.getInstance(),
        o = new _l(t, n, this);
      hi.set(this, o);
    }
    return e;
  })();
['observe', 'unobserve', 'disconnect'].forEach(function(e) {
  bi.prototype[e] = function() {
    var t;
    return (t = hi.get(this))[e].apply(t, arguments);
  };
});
var yi = (function() {
  return typeof qt.ResizeObserver < 'u' ? qt.ResizeObserver : bi;
})();
const oo = Y({
  compatConfig: { MODE: 3 },
  name: 'ResizeObserver',
  props: { disabled: Boolean, onResize: Function },
  emits: ['resize'],
  setup(e, t) {
    let { slots: n } = t;
    const o = to({ width: 0, height: 0, offsetHeight: 0, offsetWidth: 0 });
    let r = null,
      i = null;
    const a = () => {
        i && (i.disconnect(), (i = null));
      },
      l = d => {
        const { onResize: c } = e,
          m = d[0].target,
          { width: p, height: v } = m.getBoundingClientRect(),
          { offsetWidth: g, offsetHeight: b } = m,
          y = Math.floor(p),
          $ = Math.floor(v);
        if (
          o.width !== y ||
          o.height !== $ ||
          o.offsetWidth !== g ||
          o.offsetHeight !== b
        ) {
          const O = { width: y, height: $, offsetWidth: g, offsetHeight: b };
          f(o, O),
            c &&
              Promise.resolve().then(() => {
                c(f(f({}, O), { offsetWidth: g, offsetHeight: b }), m);
              });
        }
      },
      s = He(),
      u = () => {
        const { disabled: d } = e;
        if (d) {
          a();
          return;
        }
        const c = Re(s);
        c !== r && (a(), (r = c)), !i && c && ((i = new yi(l)), i.observe(c));
      };
    return (
      Ee(() => {
        u();
      }),
      ln(() => {
        u();
      }),
      no(() => {
        a();
      }),
      ee(
        () => e.disabled,
        () => {
          u();
        },
        { flush: 'post' }
      ),
      () => {
        var d;
        return (d = n.default) === null || d === void 0 ? void 0 : d.call(n)[0];
      }
    );
  }
});
let $i = e => setTimeout(e, 16),
  wi = e => clearTimeout(e);
typeof window < 'u' &&
  'requestAnimationFrame' in window &&
  (($i = e => window.requestAnimationFrame(e)),
  (wi = e => window.cancelAnimationFrame(e)));
let Bo = 0;
const ro = new Map();
function Si(e) {
  ro.delete(e);
}
function re(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : 1;
  Bo += 1;
  const n = Bo;
  function o(r) {
    if (r === 0) Si(n), e();
    else {
      const i = $i(() => {
        o(r - 1);
      });
      ro.set(n, i);
    }
  }
  return o(t), n;
}
re.cancel = e => {
  const t = ro.get(e);
  return Si(t), wi(t);
};
let Ci = !1;
try {
  const e = Object.defineProperty({}, 'passive', {
    get() {
      Ci = !0;
    }
  });
  window.addEventListener('testPassive', null, e),
    window.removeEventListener('testPassive', null, e);
} catch {}
const et = Ci;
function $t(e, t, n, o) {
  if (e && e.addEventListener) {
    let r = o;
    r === void 0 &&
      et &&
      (t === 'touchstart' || t === 'touchmove' || t === 'wheel') &&
      (r = { passive: !1 }),
      e.addEventListener(t, n, r);
  }
  return {
    remove: () => {
      e && e.removeEventListener && e.removeEventListener(t, n);
    }
  };
}
const kt = [
    'blue',
    'purple',
    'cyan',
    'green',
    'magenta',
    'pink',
    'red',
    'orange',
    'yellow',
    'volcano',
    'geekblue',
    'lime',
    'gold'
  ],
  uv = e => ({
    color: e.colorLink,
    textDecoration: 'none',
    outline: 'none',
    cursor: 'pointer',
    transition: `color ${e.motionDurationSlow}`,
    '&:focus, &:hover': { color: e.colorLinkHover },
    '&:active': { color: e.colorLinkActive }
  }),
  Al = (e, t, n, o, r) => {
    const i = e / 2,
      a = 0,
      l = i,
      s = (n * 1) / Math.sqrt(2),
      u = i - n * (1 - 1 / Math.sqrt(2)),
      d = i - t * (1 / Math.sqrt(2)),
      c = n * (Math.sqrt(2) - 1) + t * (1 / Math.sqrt(2)),
      m = 2 * i - d,
      p = c,
      v = 2 * i - s,
      g = u,
      b = 2 * i - a,
      y = l,
      $ = i * Math.sqrt(2) + n * (Math.sqrt(2) - 2),
      O = n * (Math.sqrt(2) - 1);
    return {
      pointerEvents: 'none',
      width: e,
      height: e,
      overflow: 'hidden',
      '&::after': {
        content: '""',
        position: 'absolute',
        width: $,
        height: $,
        bottom: 0,
        insetInline: 0,
        margin: 'auto',
        borderRadius: { _skip_check_: !0, value: `0 0 ${t}px 0` },
        transform: 'translateY(50%) rotate(-135deg)',
        boxShadow: r,
        zIndex: 0,
        background: 'transparent'
      },
      '&::before': {
        position: 'absolute',
        bottom: 0,
        insetInlineStart: 0,
        width: e,
        height: e / 2,
        background: o,
        clipPath: {
          _multi_value_: !0,
          value: [
            `polygon(${O}px 100%, 50% ${O}px, ${2 * i -
              O}px 100%, ${O}px 100%)`,
            `path('M ${a} ${l} A ${n} ${n} 0 0 0 ${s} ${u} L ${d} ${c} A ${t} ${t} 0 0 1 ${m} ${p} L ${v} ${g} A ${n} ${n} 0 0 0 ${b} ${y} Z')`
          ]
        },
        content: '""'
      }
    };
  };
function Ml(e, t) {
  return kt.reduce((n, o) => {
    const r = e[`${o}-1`],
      i = e[`${o}-3`],
      a = e[`${o}-6`],
      l = e[`${o}-7`];
    return f(
      f({}, n),
      t(o, { lightColor: r, lightBorderColor: i, darkColor: a, textColor: l })
    );
  }, {});
}
function cn(e, t) {
  const n = f({}, e);
  for (let o = 0; o < t.length; o += 1) {
    const r = t[o];
    delete n[r];
  }
  return n;
}
const lt = (e, t, n) => {
  Ba(e, `[ant-design-vue: ${t}] ${n}`);
};
function Rl() {
  return '';
}
function Dl(e) {
  return e ? e.ownerDocument : window.document;
}
function xi() {}
const Nl = () => ({
    action: _.oneOfType([_.string, _.arrayOf(_.string)]).def([]),
    showAction: _.any.def([]),
    hideAction: _.any.def([]),
    getPopupClassNameFromAlign: _.any.def(Rl),
    onPopupVisibleChange: Function,
    afterPopupVisibleChange: _.func.def(xi),
    popup: _.any,
    popupStyle: { type: Object, default: void 0 },
    prefixCls: _.string.def('rc-trigger-popup'),
    popupClassName: _.string.def(''),
    popupPlacement: String,
    builtinPlacements: _.object,
    popupTransitionName: String,
    popupAnimation: _.any,
    mouseEnterDelay: _.number.def(0),
    mouseLeaveDelay: _.number.def(0.1),
    zIndex: Number,
    focusDelay: _.number.def(0),
    blurDelay: _.number.def(0.15),
    getPopupContainer: Function,
    getDocument: _.func.def(Dl),
    forceRender: { type: Boolean, default: void 0 },
    destroyPopupOnHide: { type: Boolean, default: !1 },
    mask: { type: Boolean, default: !1 },
    maskClosable: { type: Boolean, default: !0 },
    popupAlign: _.object.def(() => ({})),
    popupVisible: { type: Boolean, default: void 0 },
    defaultPopupVisible: { type: Boolean, default: !1 },
    maskTransitionName: String,
    maskAnimation: String,
    stretch: String,
    alignPoint: { type: Boolean, default: void 0 },
    autoDestroy: { type: Boolean, default: !1 },
    mobile: Object,
    getTriggerDOMNode: Function
  }),
  io = {
    visible: Boolean,
    prefixCls: String,
    zIndex: Number,
    destroyPopupOnHide: Boolean,
    forceRender: Boolean,
    animation: [String, Object],
    transitionName: String,
    stretch: { type: String },
    align: { type: Object },
    point: { type: Object },
    getRootDomNode: { type: Function },
    getClassNameFromAlign: { type: Function },
    onMouseenter: { type: Function },
    onMouseleave: { type: Function },
    onMousedown: { type: Function },
    onTouchstart: { type: Function }
  },
  Bl = f(f({}, io), { mobile: { type: Object } }),
  zl = f(f({}, io), {
    mask: Boolean,
    mobile: { type: Object },
    maskAnimation: String,
    maskTransitionName: String
  });
function Oi(e) {
  const {
    prefixCls: t,
    visible: n,
    zIndex: o,
    mask: r,
    maskAnimation: i,
    maskTransitionName: a
  } = e;
  if (!r) return null;
  let l = {};
  return (
    (a || i) && (l = si({ prefixCls: t, transitionName: a, animation: i })),
    h(pt, D({ appear: !0 }, l), {
      default: () => [
        sn(h('div', { style: { zIndex: o }, class: `${t}-mask` }, null), [
          [ol('if'), n]
        ])
      ]
    })
  );
}
Oi.displayName = 'Mask';
const Hl = Y({
  compatConfig: { MODE: 3 },
  name: 'MobilePopupInner',
  inheritAttrs: !1,
  props: Bl,
  emits: ['mouseenter', 'mouseleave', 'mousedown', 'touchstart', 'align'],
  setup(e, t) {
    let { expose: n, slots: o } = t;
    const r = G();
    return (
      n({ forceAlign: () => {}, getElement: () => r.value }),
      () => {
        var i;
        const {
            zIndex: a,
            visible: l,
            prefixCls: s,
            mobile: {
              popupClassName: u,
              popupStyle: d,
              popupMotion: c = {},
              popupRender: m
            } = {}
          } = e,
          p = f({ zIndex: a }, d);
        let v = Xe(
          (i = o.default) === null || i === void 0 ? void 0 : i.call(o)
        );
        v.length > 1 && (v = h('div', { class: `${s}-content` }, [v])),
          m && (v = m(v));
        const g = ie(s, u);
        return h(pt, D({ ref: r }, c), {
          default: () => [l ? h('div', { class: g, style: p }, [v]) : null]
        });
      }
    );
  }
});
var Ll =
  (globalThis && globalThis.__awaiter) ||
  function(e, t, n, o) {
    function r(i) {
      return i instanceof n
        ? i
        : new n(function(a) {
            a(i);
          });
    }
    return new (n || (n = Promise))(function(i, a) {
      function l(d) {
        try {
          u(o.next(d));
        } catch (c) {
          a(c);
        }
      }
      function s(d) {
        try {
          u(o.throw(d));
        } catch (c) {
          a(c);
        }
      }
      function u(d) {
        d.done ? i(d.value) : r(d.value).then(l, s);
      }
      u((o = o.apply(e, t || [])).next());
    });
  };
const zo = ['measure', 'align', null, 'motion'],
  Fl = (e, t) => {
    const n = B(null),
      o = B(),
      r = B(!1);
    function i(s) {
      r.value || (n.value = s);
    }
    function a() {
      re.cancel(o.value);
    }
    function l(s) {
      a(),
        (o.value = re(() => {
          let u = n.value;
          switch (n.value) {
            case 'align':
              u = 'motion';
              break;
            case 'motion':
              u = 'stable';
              break;
          }
          i(u), s == null || s();
        }));
    }
    return (
      ee(
        e,
        () => {
          i('measure');
        },
        { immediate: !0, flush: 'post' }
      ),
      Ee(() => {
        ee(
          n,
          () => {
            switch (n.value) {
              case 'measure':
                t();
                break;
            }
            n.value &&
              (o.value = re(() =>
                Ll(void 0, void 0, void 0, function*() {
                  const s = zo.indexOf(n.value),
                    u = zo[s + 1];
                  u && s !== -1 && i(u);
                })
              ));
          },
          { immediate: !0, flush: 'post' }
        );
      }),
      we(() => {
        (r.value = !0), a();
      }),
      [n, l]
    );
  },
  jl = e => {
    const t = B({ width: 0, height: 0 });
    function n(r) {
      t.value = { width: r.offsetWidth, height: r.offsetHeight };
    }
    return [
      S(() => {
        const r = {};
        if (e.value) {
          const { width: i, height: a } = t.value;
          e.value.indexOf('height') !== -1 && a
            ? (r.height = `${a}px`)
            : e.value.indexOf('minHeight') !== -1 &&
              a &&
              (r.minHeight = `${a}px`),
            e.value.indexOf('width') !== -1 && i
              ? (r.width = `${i}px`)
              : e.value.indexOf('minWidth') !== -1 &&
                i &&
                (r.minWidth = `${i}px`);
        }
        return r;
      }),
      n
    ];
  };
function Ho(e, t) {
  var n = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var o = Object.getOwnPropertySymbols(e);
    t &&
      (o = o.filter(function(r) {
        return Object.getOwnPropertyDescriptor(e, r).enumerable;
      })),
      n.push.apply(n, o);
  }
  return n;
}
function Lo(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? arguments[t] : {};
    t % 2
      ? Ho(Object(n), !0).forEach(function(o) {
          Wl(e, o, n[o]);
        })
      : Object.getOwnPropertyDescriptors
      ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n))
      : Ho(Object(n)).forEach(function(o) {
          Object.defineProperty(e, o, Object.getOwnPropertyDescriptor(n, o));
        });
  }
  return e;
}
function Hn(e) {
  '@babel/helpers - typeof';
  return (
    (Hn =
      typeof Symbol == 'function' && typeof Symbol.iterator == 'symbol'
        ? function(t) {
            return typeof t;
          }
        : function(t) {
            return t &&
              typeof Symbol == 'function' &&
              t.constructor === Symbol &&
              t !== Symbol.prototype
              ? 'symbol'
              : typeof t;
          }),
    Hn(e)
  );
}
function Wl(e, t, n) {
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
var gt,
  Vl = { Webkit: '-webkit-', Moz: '-moz-', ms: '-ms-', O: '-o-' };
function Qt() {
  if (gt !== void 0) return gt;
  gt = '';
  var e = document.createElement('p').style,
    t = 'Transform';
  for (var n in Vl) n + t in e && (gt = n);
  return gt;
}
function Ei() {
  return Qt() ? ''.concat(Qt(), 'TransitionProperty') : 'transitionProperty';
}
function dn() {
  return Qt() ? ''.concat(Qt(), 'Transform') : 'transform';
}
function Fo(e, t) {
  var n = Ei();
  n &&
    ((e.style[n] = t),
    n !== 'transitionProperty' && (e.style.transitionProperty = t));
}
function bn(e, t) {
  var n = dn();
  n && ((e.style[n] = t), n !== 'transform' && (e.style.transform = t));
}
function Kl(e) {
  return e.style.transitionProperty || e.style[Ei()];
}
function Ul(e) {
  var t = window.getComputedStyle(e, null),
    n = t.getPropertyValue('transform') || t.getPropertyValue(dn());
  if (n && n !== 'none') {
    var o = n.replace(/[^0-9\-.,]/g, '').split(',');
    return { x: parseFloat(o[12] || o[4], 0), y: parseFloat(o[13] || o[5], 0) };
  }
  return { x: 0, y: 0 };
}
var Gl = /matrix\((.*)\)/,
  Xl = /matrix3d\((.*)\)/;
function Yl(e, t) {
  var n = window.getComputedStyle(e, null),
    o = n.getPropertyValue('transform') || n.getPropertyValue(dn());
  if (o && o !== 'none') {
    var r,
      i = o.match(Gl);
    if (i)
      (i = i[1]),
        (r = i.split(',').map(function(l) {
          return parseFloat(l, 10);
        })),
        (r[4] = t.x),
        (r[5] = t.y),
        bn(e, 'matrix('.concat(r.join(','), ')'));
    else {
      var a = o.match(Xl)[1];
      (r = a.split(',').map(function(l) {
        return parseFloat(l, 10);
      })),
        (r[12] = t.x),
        (r[13] = t.y),
        bn(e, 'matrix3d('.concat(r.join(','), ')'));
    }
  } else
    bn(
      e,
      'translateX('
        .concat(t.x, 'px) translateY(')
        .concat(t.y, 'px) translateZ(0)')
    );
}
var ql = /[\-+]?(?:\d*\.|)\d+(?:[eE][\-+]?\d+|)/.source,
  Rt;
function jo(e) {
  var t = e.style.display;
  (e.style.display = 'none'), e.offsetHeight, (e.style.display = t);
}
function tt(e, t, n) {
  var o = n;
  if (Hn(t) === 'object') {
    for (var r in t) t.hasOwnProperty(r) && tt(e, r, t[r]);
    return;
  }
  if (typeof o < 'u') {
    typeof o == 'number' && (o = ''.concat(o, 'px')), (e.style[t] = o);
    return;
  }
  return Rt(e, t);
}
function Zl(e) {
  var t,
    n,
    o,
    r = e.ownerDocument,
    i = r.body,
    a = r && r.documentElement;
  return (
    (t = e.getBoundingClientRect()),
    (n = Math.floor(t.left)),
    (o = Math.floor(t.top)),
    (n -= a.clientLeft || i.clientLeft || 0),
    (o -= a.clientTop || i.clientTop || 0),
    { left: n, top: o }
  );
}
function Ti(e, t) {
  var n = e['page'.concat(t ? 'Y' : 'X', 'Offset')],
    o = 'scroll'.concat(t ? 'Top' : 'Left');
  if (typeof n != 'number') {
    var r = e.document;
    (n = r.documentElement[o]), typeof n != 'number' && (n = r.body[o]);
  }
  return n;
}
function Ii(e) {
  return Ti(e);
}
function Pi(e) {
  return Ti(e, !0);
}
function Et(e) {
  var t = Zl(e),
    n = e.ownerDocument,
    o = n.defaultView || n.parentWindow;
  return (t.left += Ii(o)), (t.top += Pi(o)), t;
}
function ao(e) {
  return e != null && e == e.window;
}
function _i(e) {
  return ao(e) ? e.document : e.nodeType === 9 ? e : e.ownerDocument;
}
function kl(e, t, n) {
  var o = n,
    r = '',
    i = _i(e);
  return (
    (o = o || i.defaultView.getComputedStyle(e, null)),
    o && (r = o.getPropertyValue(t) || o[t]),
    r
  );
}
var Ql = new RegExp('^('.concat(ql, ')(?!px)[a-z%]+$'), 'i'),
  Jl = /^(top|right|bottom|left)$/,
  yn = 'currentStyle',
  $n = 'runtimeStyle',
  je = 'left',
  es = 'px';
function ts(e, t) {
  var n = e[yn] && e[yn][t];
  if (Ql.test(n) && !Jl.test(t)) {
    var o = e.style,
      r = o[je],
      i = e[$n][je];
    (e[$n][je] = e[yn][je]),
      (o[je] = t === 'fontSize' ? '1em' : n || 0),
      (n = o.pixelLeft + es),
      (o[je] = r),
      (e[$n][je] = i);
  }
  return n === '' ? 'auto' : n;
}
typeof window < 'u' && (Rt = window.getComputedStyle ? kl : ts);
function Nt(e, t) {
  return e === 'left'
    ? t.useCssRight
      ? 'right'
      : e
    : t.useCssBottom
    ? 'bottom'
    : e;
}
function Wo(e) {
  if (e === 'left') return 'right';
  if (e === 'right') return 'left';
  if (e === 'top') return 'bottom';
  if (e === 'bottom') return 'top';
}
function Vo(e, t, n) {
  tt(e, 'position') === 'static' && (e.style.position = 'relative');
  var o = -999,
    r = -999,
    i = Nt('left', n),
    a = Nt('top', n),
    l = Wo(i),
    s = Wo(a);
  i !== 'left' && (o = 999), a !== 'top' && (r = 999);
  var u = '',
    d = Et(e);
  ('left' in t || 'top' in t) && ((u = Kl(e) || ''), Fo(e, 'none')),
    'left' in t && ((e.style[l] = ''), (e.style[i] = ''.concat(o, 'px'))),
    'top' in t && ((e.style[s] = ''), (e.style[a] = ''.concat(r, 'px'))),
    jo(e);
  var c = Et(e),
    m = {};
  for (var p in t)
    if (t.hasOwnProperty(p)) {
      var v = Nt(p, n),
        g = p === 'left' ? o : r,
        b = d[p] - c[p];
      v === p ? (m[v] = g + b) : (m[v] = g - b);
    }
  tt(e, m), jo(e), ('left' in t || 'top' in t) && Fo(e, u);
  var y = {};
  for (var $ in t)
    if (t.hasOwnProperty($)) {
      var O = Nt($, n),
        z = t[$] - d[$];
      $ === O ? (y[O] = m[O] + z) : (y[O] = m[O] - z);
    }
  tt(e, y);
}
function ns(e, t) {
  var n = Et(e),
    o = Ul(e),
    r = { x: o.x, y: o.y };
  'left' in t && (r.x = o.x + t.left - n.left),
    'top' in t && (r.y = o.y + t.top - n.top),
    Yl(e, r);
}
function os(e, t, n) {
  if (n.ignoreShake) {
    var o = Et(e),
      r = o.left.toFixed(0),
      i = o.top.toFixed(0),
      a = t.left.toFixed(0),
      l = t.top.toFixed(0);
    if (r === a && i === l) return;
  }
  n.useCssRight || n.useCssBottom
    ? Vo(e, t, n)
    : n.useCssTransform && dn() in document.body.style
    ? ns(e, t)
    : Vo(e, t, n);
}
function lo(e, t) {
  for (var n = 0; n < e.length; n++) t(e[n]);
}
function Ai(e) {
  return Rt(e, 'boxSizing') === 'border-box';
}
var rs = ['margin', 'border', 'padding'],
  Ln = -1,
  is = 2,
  Fn = 1,
  as = 0;
function ls(e, t, n) {
  var o = {},
    r = e.style,
    i;
  for (i in t) t.hasOwnProperty(i) && ((o[i] = r[i]), (r[i] = t[i]));
  n.call(e);
  for (i in t) t.hasOwnProperty(i) && (r[i] = o[i]);
}
function wt(e, t, n) {
  var o = 0,
    r,
    i,
    a;
  for (i = 0; i < t.length; i++)
    if (((r = t[i]), r))
      for (a = 0; a < n.length; a++) {
        var l = void 0;
        r === 'border'
          ? (l = ''.concat(r).concat(n[a], 'Width'))
          : (l = r + n[a]),
          (o += parseFloat(Rt(e, l)) || 0);
      }
  return o;
}
var Oe = {
  getParent: function(t) {
    var n = t;
    do n.nodeType === 11 && n.host ? (n = n.host) : (n = n.parentNode);
    while (n && n.nodeType !== 1 && n.nodeType !== 9);
    return n;
  }
};
lo(['Width', 'Height'], function(e) {
  (Oe['doc'.concat(e)] = function(t) {
    var n = t.document;
    return Math.max(
      n.documentElement['scroll'.concat(e)],
      n.body['scroll'.concat(e)],
      Oe['viewport'.concat(e)](n)
    );
  }),
    (Oe['viewport'.concat(e)] = function(t) {
      var n = 'client'.concat(e),
        o = t.document,
        r = o.body,
        i = o.documentElement,
        a = i[n];
      return (o.compatMode === 'CSS1Compat' && a) || (r && r[n]) || a;
    });
});
function Ko(e, t, n) {
  var o = n;
  if (ao(e)) return t === 'width' ? Oe.viewportWidth(e) : Oe.viewportHeight(e);
  if (e.nodeType === 9) return t === 'width' ? Oe.docWidth(e) : Oe.docHeight(e);
  var r = t === 'width' ? ['Left', 'Right'] : ['Top', 'Bottom'],
    i = Math.floor(
      t === 'width'
        ? e.getBoundingClientRect().width
        : e.getBoundingClientRect().height
    ),
    a = Ai(e),
    l = 0;
  (i == null || i <= 0) &&
    ((i = void 0),
    (l = Rt(e, t)),
    (l == null || Number(l) < 0) && (l = e.style[t] || 0),
    (l = Math.floor(parseFloat(l)) || 0)),
    o === void 0 && (o = a ? Fn : Ln);
  var s = i !== void 0 || a,
    u = i || l;
  return o === Ln
    ? s
      ? u - wt(e, ['border', 'padding'], r)
      : l
    : s
    ? o === Fn
      ? u
      : u + (o === is ? -wt(e, ['border'], r) : wt(e, ['margin'], r))
    : l + wt(e, rs.slice(o), r);
}
var ss = { position: 'absolute', visibility: 'hidden', display: 'block' };
function Uo() {
  for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++)
    t[n] = arguments[n];
  var o,
    r = t[0];
  return (
    r.offsetWidth !== 0
      ? (o = Ko.apply(void 0, t))
      : ls(r, ss, function() {
          o = Ko.apply(void 0, t);
        }),
    o
  );
}
lo(['width', 'height'], function(e) {
  var t = e.charAt(0).toUpperCase() + e.slice(1);
  Oe['outer'.concat(t)] = function(o, r) {
    return o && Uo(o, e, r ? as : Fn);
  };
  var n = e === 'width' ? ['Left', 'Right'] : ['Top', 'Bottom'];
  Oe[e] = function(o, r) {
    var i = r;
    if (i !== void 0) {
      if (o) {
        var a = Ai(o);
        return a && (i += wt(o, ['padding', 'border'], n)), tt(o, e, i);
      }
      return;
    }
    return o && Uo(o, e, Ln);
  };
});
function Mi(e, t) {
  for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
  return e;
}
var V = {
  getWindow: function(t) {
    if (t && t.document && t.setTimeout) return t;
    var n = t.ownerDocument || t;
    return n.defaultView || n.parentWindow;
  },
  getDocument: _i,
  offset: function(t, n, o) {
    if (typeof n < 'u') os(t, n, o || {});
    else return Et(t);
  },
  isWindow: ao,
  each: lo,
  css: tt,
  clone: function(t) {
    var n,
      o = {};
    for (n in t) t.hasOwnProperty(n) && (o[n] = t[n]);
    var r = t.overflow;
    if (r) for (n in t) t.hasOwnProperty(n) && (o.overflow[n] = t.overflow[n]);
    return o;
  },
  mix: Mi,
  getWindowScrollLeft: function(t) {
    return Ii(t);
  },
  getWindowScrollTop: function(t) {
    return Pi(t);
  },
  merge: function() {
    for (var t = {}, n = 0; n < arguments.length; n++)
      V.mix(t, n < 0 || arguments.length <= n ? void 0 : arguments[n]);
    return t;
  },
  viewportWidth: 0,
  viewportHeight: 0
};
Mi(V, Oe);
var wn = V.getParent;
function jn(e) {
  if (V.isWindow(e) || e.nodeType === 9) return null;
  var t = V.getDocument(e),
    n = t.body,
    o,
    r = V.css(e, 'position'),
    i = r === 'fixed' || r === 'absolute';
  if (!i) return e.nodeName.toLowerCase() === 'html' ? null : wn(e);
  for (o = wn(e); o && o !== n && o.nodeType !== 9; o = wn(o))
    if (((r = V.css(o, 'position')), r !== 'static')) return o;
  return null;
}
var Go = V.getParent;
function us(e) {
  if (V.isWindow(e) || e.nodeType === 9) return !1;
  var t = V.getDocument(e),
    n = t.body,
    o = null;
  for (o = Go(e); o && o !== n && o !== t; o = Go(o)) {
    var r = V.css(o, 'position');
    if (r === 'fixed') return !0;
  }
  return !1;
}
function so(e, t) {
  for (
    var n = { left: 0, right: 1 / 0, top: 0, bottom: 1 / 0 },
      o = jn(e),
      r = V.getDocument(e),
      i = r.defaultView || r.parentWindow,
      a = r.body,
      l = r.documentElement;
    o;

  ) {
    if (
      (navigator.userAgent.indexOf('MSIE') === -1 || o.clientWidth !== 0) &&
      o !== a &&
      o !== l &&
      V.css(o, 'overflow') !== 'visible'
    ) {
      var s = V.offset(o);
      (s.left += o.clientLeft),
        (s.top += o.clientTop),
        (n.top = Math.max(n.top, s.top)),
        (n.right = Math.min(n.right, s.left + o.clientWidth)),
        (n.bottom = Math.min(n.bottom, s.top + o.clientHeight)),
        (n.left = Math.max(n.left, s.left));
    } else if (o === a || o === l) break;
    o = jn(o);
  }
  var u = null;
  if (!V.isWindow(e) && e.nodeType !== 9) {
    u = e.style.position;
    var d = V.css(e, 'position');
    d === 'absolute' && (e.style.position = 'fixed');
  }
  var c = V.getWindowScrollLeft(i),
    m = V.getWindowScrollTop(i),
    p = V.viewportWidth(i),
    v = V.viewportHeight(i),
    g = l.scrollWidth,
    b = l.scrollHeight,
    y = window.getComputedStyle(a);
  if (
    (y.overflowX === 'hidden' && (g = i.innerWidth),
    y.overflowY === 'hidden' && (b = i.innerHeight),
    e.style && (e.style.position = u),
    t || us(e))
  )
    (n.left = Math.max(n.left, c)),
      (n.top = Math.max(n.top, m)),
      (n.right = Math.min(n.right, c + p)),
      (n.bottom = Math.min(n.bottom, m + v));
  else {
    var $ = Math.max(g, c + p);
    n.right = Math.min(n.right, $);
    var O = Math.max(b, m + v);
    n.bottom = Math.min(n.bottom, O);
  }
  return n.top >= 0 && n.left >= 0 && n.bottom > n.top && n.right > n.left
    ? n
    : null;
}
function cs(e, t, n, o) {
  var r = V.clone(e),
    i = { width: t.width, height: t.height };
  return (
    o.adjustX && r.left < n.left && (r.left = n.left),
    o.resizeWidth &&
      r.left >= n.left &&
      r.left + i.width > n.right &&
      (i.width -= r.left + i.width - n.right),
    o.adjustX &&
      r.left + i.width > n.right &&
      (r.left = Math.max(n.right - i.width, n.left)),
    o.adjustY && r.top < n.top && (r.top = n.top),
    o.resizeHeight &&
      r.top >= n.top &&
      r.top + i.height > n.bottom &&
      (i.height -= r.top + i.height - n.bottom),
    o.adjustY &&
      r.top + i.height > n.bottom &&
      (r.top = Math.max(n.bottom - i.height, n.top)),
    V.mix(r, i)
  );
}
function uo(e) {
  var t, n, o;
  if (!V.isWindow(e) && e.nodeType !== 9)
    (t = V.offset(e)), (n = V.outerWidth(e)), (o = V.outerHeight(e));
  else {
    var r = V.getWindow(e);
    (t = { left: V.getWindowScrollLeft(r), top: V.getWindowScrollTop(r) }),
      (n = V.viewportWidth(r)),
      (o = V.viewportHeight(r));
  }
  return (t.width = n), (t.height = o), t;
}
function Xo(e, t) {
  var n = t.charAt(0),
    o = t.charAt(1),
    r = e.width,
    i = e.height,
    a = e.left,
    l = e.top;
  return (
    n === 'c' ? (l += i / 2) : n === 'b' && (l += i),
    o === 'c' ? (a += r / 2) : o === 'r' && (a += r),
    { left: a, top: l }
  );
}
function Bt(e, t, n, o, r) {
  var i = Xo(t, n[1]),
    a = Xo(e, n[0]),
    l = [a.left - i.left, a.top - i.top];
  return {
    left: Math.round(e.left - l[0] + o[0] - r[0]),
    top: Math.round(e.top - l[1] + o[1] - r[1])
  };
}
function Yo(e, t, n) {
  return e.left < n.left || e.left + t.width > n.right;
}
function qo(e, t, n) {
  return e.top < n.top || e.top + t.height > n.bottom;
}
function ds(e, t, n) {
  return e.left > n.right || e.left + t.width < n.left;
}
function fs(e, t, n) {
  return e.top > n.bottom || e.top + t.height < n.top;
}
function zt(e, t, n) {
  var o = [];
  return (
    V.each(e, function(r) {
      o.push(
        r.replace(t, function(i) {
          return n[i];
        })
      );
    }),
    o
  );
}
function Ht(e, t) {
  return (e[t] = -e[t]), e;
}
function Zo(e, t) {
  var n;
  return (
    /%$/.test(e)
      ? (n = (parseInt(e.substring(0, e.length - 1), 10) / 100) * t)
      : (n = parseInt(e, 10)),
    n || 0
  );
}
function ko(e, t) {
  (e[0] = Zo(e[0], t.width)), (e[1] = Zo(e[1], t.height));
}
function Ri(e, t, n, o) {
  var r = n.points,
    i = n.offset || [0, 0],
    a = n.targetOffset || [0, 0],
    l = n.overflow,
    s = n.source || e;
  (i = [].concat(i)), (a = [].concat(a)), (l = l || {});
  var u = {},
    d = 0,
    c = !!(l && l.alwaysByViewport),
    m = so(s, c),
    p = uo(s);
  ko(i, p), ko(a, t);
  var v = Bt(p, t, r, i, a),
    g = V.merge(p, v);
  if (m && (l.adjustX || l.adjustY) && o) {
    if (l.adjustX && Yo(v, p, m)) {
      var b = zt(r, /[lr]/gi, { l: 'r', r: 'l' }),
        y = Ht(i, 0),
        $ = Ht(a, 0),
        O = Bt(p, t, b, y, $);
      ds(O, p, m) || ((d = 1), (r = b), (i = y), (a = $));
    }
    if (l.adjustY && qo(v, p, m)) {
      var z = zt(r, /[tb]/gi, { t: 'b', b: 't' }),
        I = Ht(i, 1),
        T = Ht(a, 1),
        P = Bt(p, t, z, I, T);
      fs(P, p, m) || ((d = 1), (r = z), (i = I), (a = T));
    }
    d && ((v = Bt(p, t, r, i, a)), V.mix(g, v));
    var M = Yo(v, p, m),
      j = qo(v, p, m);
    if (M || j) {
      var C = r;
      M && (C = zt(r, /[lr]/gi, { l: 'r', r: 'l' })),
        j && (C = zt(r, /[tb]/gi, { t: 'b', b: 't' })),
        (r = C),
        (i = n.offset || [0, 0]),
        (a = n.targetOffset || [0, 0]);
    }
    (u.adjustX = l.adjustX && M),
      (u.adjustY = l.adjustY && j),
      (u.adjustX || u.adjustY) && (g = cs(v, p, m, u));
  }
  return (
    g.width !== p.width && V.css(s, 'width', V.width(s) + g.width - p.width),
    g.height !== p.height &&
      V.css(s, 'height', V.height(s) + g.height - p.height),
    V.offset(
      s,
      { left: g.left, top: g.top },
      {
        useCssRight: n.useCssRight,
        useCssBottom: n.useCssBottom,
        useCssTransform: n.useCssTransform,
        ignoreShake: n.ignoreShake
      }
    ),
    { points: r, offset: i, targetOffset: a, overflow: u }
  );
}
function ps(e, t) {
  var n = so(e, t),
    o = uo(e);
  return (
    !n ||
    o.left + o.width <= n.left ||
    o.top + o.height <= n.top ||
    o.left >= n.right ||
    o.top >= n.bottom
  );
}
function co(e, t, n) {
  var o = n.target || t,
    r = uo(o),
    i = !ps(o, n.overflow && n.overflow.alwaysByViewport);
  return Ri(e, r, n, i);
}
co.__getOffsetParent = jn;
co.__getVisibleRectForElement = so;
function ms(e, t, n) {
  var o,
    r,
    i = V.getDocument(e),
    a = i.defaultView || i.parentWindow,
    l = V.getWindowScrollLeft(a),
    s = V.getWindowScrollTop(a),
    u = V.viewportWidth(a),
    d = V.viewportHeight(a);
  'pageX' in t ? (o = t.pageX) : (o = l + t.clientX),
    'pageY' in t ? (r = t.pageY) : (r = s + t.clientY);
  var c = { left: o, top: r, width: 0, height: 0 },
    m = o >= 0 && o <= l + u && r >= 0 && r <= s + d,
    p = [n.points[0], 'cc'];
  return Ri(e, c, Lo(Lo({}, n), {}, { points: p }), m);
}
function be(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {},
    n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !0,
    o = arguments.length > 3 && arguments[3] !== void 0 ? arguments[3] : !1,
    r = e;
  if ((Array.isArray(e) && (r = dt(e)[0]), !r)) return null;
  const i = rl(r, t, o);
  return (
    (i.props = n ? f(f({}, i.props), t) : i.props),
    Qn(typeof i.props.class != 'object', 'class must be string'),
    i
  );
}
function cv(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {},
    n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !0;
  return e.map(o => be(o, t, n));
}
const Di = e => {
  if (!e) return !1;
  if (e.offsetParent) return !0;
  if (e.getBBox) {
    const t = e.getBBox();
    if (t.width || t.height) return !0;
  }
  if (e.getBoundingClientRect) {
    const t = e.getBoundingClientRect();
    if (t.width || t.height) return !0;
  }
  return !1;
};
function vs(e, t) {
  return e === t
    ? !0
    : !e || !t
    ? !1
    : 'pageX' in t && 'pageY' in t
    ? e.pageX === t.pageX && e.pageY === t.pageY
    : 'clientX' in t && 'clientY' in t
    ? e.clientX === t.clientX && e.clientY === t.clientY
    : !1;
}
function gs(e, t) {
  e !== document.activeElement &&
    Je(t, e) &&
    typeof e.focus == 'function' &&
    e.focus();
}
function Qo(e, t) {
  let n = null,
    o = null;
  function r(a) {
    let [{ target: l }] = a;
    if (!document.documentElement.contains(l)) return;
    const { width: s, height: u } = l.getBoundingClientRect(),
      d = Math.floor(s),
      c = Math.floor(u);
    (n !== d || o !== c) &&
      Promise.resolve().then(() => {
        t({ width: d, height: c });
      }),
      (n = d),
      (o = c);
  }
  const i = new yi(r);
  return (
    e && i.observe(e),
    () => {
      i.disconnect();
    }
  );
}
const hs = (e, t) => {
  let n = !1,
    o = null;
  function r() {
    clearTimeout(o);
  }
  function i(a) {
    if (!n || a === !0) {
      if (e() === !1) return;
      (n = !0),
        r(),
        (o = setTimeout(() => {
          n = !1;
        }, t.value));
    } else
      r(),
        (o = setTimeout(() => {
          (n = !1), i();
        }, t.value));
  }
  return [
    i,
    () => {
      (n = !1), r();
    }
  ];
};
function bs() {
  (this.__data__ = []), (this.size = 0);
}
function Ni(e, t) {
  return e === t || (e !== e && t !== t);
}
function fn(e, t) {
  for (var n = e.length; n--; ) if (Ni(e[n][0], t)) return n;
  return -1;
}
var ys = Array.prototype,
  $s = ys.splice;
function ws(e) {
  var t = this.__data__,
    n = fn(t, e);
  if (n < 0) return !1;
  var o = t.length - 1;
  return n == o ? t.pop() : $s.call(t, n, 1), --this.size, !0;
}
function Ss(e) {
  var t = this.__data__,
    n = fn(t, e);
  return n < 0 ? void 0 : t[n][1];
}
function Cs(e) {
  return fn(this.__data__, e) > -1;
}
function xs(e, t) {
  var n = this.__data__,
    o = fn(n, e);
  return o < 0 ? (++this.size, n.push([e, t])) : (n[o][1] = t), this;
}
function Pe(e) {
  var t = -1,
    n = e == null ? 0 : e.length;
  for (this.clear(); ++t < n; ) {
    var o = e[t];
    this.set(o[0], o[1]);
  }
}
Pe.prototype.clear = bs;
Pe.prototype.delete = ws;
Pe.prototype.get = Ss;
Pe.prototype.has = Cs;
Pe.prototype.set = xs;
function Os() {
  (this.__data__ = new Pe()), (this.size = 0);
}
function Es(e) {
  var t = this.__data__,
    n = t.delete(e);
  return (this.size = t.size), n;
}
function Ts(e) {
  return this.__data__.get(e);
}
function Is(e) {
  return this.__data__.has(e);
}
var Ps =
  typeof global == 'object' && global && global.Object === Object && global;
const Bi = Ps;
var _s = typeof self == 'object' && self && self.Object === Object && self,
  As = Bi || _s || Function('return this')();
const _e = As;
var Ms = _e.Symbol;
const st = Ms;
var zi = Object.prototype,
  Rs = zi.hasOwnProperty,
  Ds = zi.toString,
  ht = st ? st.toStringTag : void 0;
function Ns(e) {
  var t = Rs.call(e, ht),
    n = e[ht];
  try {
    e[ht] = void 0;
    var o = !0;
  } catch {}
  var r = Ds.call(e);
  return o && (t ? (e[ht] = n) : delete e[ht]), r;
}
var Bs = Object.prototype,
  zs = Bs.toString;
function Hs(e) {
  return zs.call(e);
}
var Ls = '[object Null]',
  Fs = '[object Undefined]',
  Jo = st ? st.toStringTag : void 0;
function mt(e) {
  return e == null
    ? e === void 0
      ? Fs
      : Ls
    : Jo && Jo in Object(e)
    ? Ns(e)
    : Hs(e);
}
function Hi(e) {
  var t = typeof e;
  return e != null && (t == 'object' || t == 'function');
}
var js = '[object AsyncFunction]',
  Ws = '[object Function]',
  Vs = '[object GeneratorFunction]',
  Ks = '[object Proxy]';
function Li(e) {
  if (!Hi(e)) return !1;
  var t = mt(e);
  return t == Ws || t == Vs || t == js || t == Ks;
}
var Us = _e['__core-js_shared__'];
const Sn = Us;
var er = (function() {
  var e = /[^.]+$/.exec((Sn && Sn.keys && Sn.keys.IE_PROTO) || '');
  return e ? 'Symbol(src)_1.' + e : '';
})();
function Gs(e) {
  return !!er && er in e;
}
var Xs = Function.prototype,
  Ys = Xs.toString;
function Ye(e) {
  if (e != null) {
    try {
      return Ys.call(e);
    } catch {}
    try {
      return e + '';
    } catch {}
  }
  return '';
}
var qs = /[\\^$.*+?()[\]{}|]/g,
  Zs = /^\[object .+?Constructor\]$/,
  ks = Function.prototype,
  Qs = Object.prototype,
  Js = ks.toString,
  eu = Qs.hasOwnProperty,
  tu = RegExp(
    '^' +
      Js.call(eu)
        .replace(qs, '\\$&')
        .replace(
          /hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g,
          '$1.*?'
        ) +
      '$'
  );
function nu(e) {
  if (!Hi(e) || Gs(e)) return !1;
  var t = Li(e) ? tu : Zs;
  return t.test(Ye(e));
}
function ou(e, t) {
  return e == null ? void 0 : e[t];
}
function vt(e, t) {
  var n = ou(e, t);
  return nu(n) ? n : void 0;
}
var ru = vt(_e, 'Map');
const Tt = ru;
var iu = vt(Object, 'create');
const It = iu;
function au() {
  (this.__data__ = It ? It(null) : {}), (this.size = 0);
}
function lu(e) {
  var t = this.has(e) && delete this.__data__[e];
  return (this.size -= t ? 1 : 0), t;
}
var su = '__lodash_hash_undefined__',
  uu = Object.prototype,
  cu = uu.hasOwnProperty;
function du(e) {
  var t = this.__data__;
  if (It) {
    var n = t[e];
    return n === su ? void 0 : n;
  }
  return cu.call(t, e) ? t[e] : void 0;
}
var fu = Object.prototype,
  pu = fu.hasOwnProperty;
function mu(e) {
  var t = this.__data__;
  return It ? t[e] !== void 0 : pu.call(t, e);
}
var vu = '__lodash_hash_undefined__';
function gu(e, t) {
  var n = this.__data__;
  return (
    (this.size += this.has(e) ? 0 : 1),
    (n[e] = It && t === void 0 ? vu : t),
    this
  );
}
function Ge(e) {
  var t = -1,
    n = e == null ? 0 : e.length;
  for (this.clear(); ++t < n; ) {
    var o = e[t];
    this.set(o[0], o[1]);
  }
}
Ge.prototype.clear = au;
Ge.prototype.delete = lu;
Ge.prototype.get = du;
Ge.prototype.has = mu;
Ge.prototype.set = gu;
function hu() {
  (this.size = 0),
    (this.__data__ = {
      hash: new Ge(),
      map: new (Tt || Pe)(),
      string: new Ge()
    });
}
function bu(e) {
  var t = typeof e;
  return t == 'string' || t == 'number' || t == 'symbol' || t == 'boolean'
    ? e !== '__proto__'
    : e === null;
}
function pn(e, t) {
  var n = e.__data__;
  return bu(t) ? n[typeof t == 'string' ? 'string' : 'hash'] : n.map;
}
function yu(e) {
  var t = pn(this, e).delete(e);
  return (this.size -= t ? 1 : 0), t;
}
function $u(e) {
  return pn(this, e).get(e);
}
function wu(e) {
  return pn(this, e).has(e);
}
function Su(e, t) {
  var n = pn(this, e),
    o = n.size;
  return n.set(e, t), (this.size += n.size == o ? 0 : 1), this;
}
function qe(e) {
  var t = -1,
    n = e == null ? 0 : e.length;
  for (this.clear(); ++t < n; ) {
    var o = e[t];
    this.set(o[0], o[1]);
  }
}
qe.prototype.clear = hu;
qe.prototype.delete = yu;
qe.prototype.get = $u;
qe.prototype.has = wu;
qe.prototype.set = Su;
var Cu = 200;
function xu(e, t) {
  var n = this.__data__;
  if (n instanceof Pe) {
    var o = n.__data__;
    if (!Tt || o.length < Cu - 1)
      return o.push([e, t]), (this.size = ++n.size), this;
    n = this.__data__ = new qe(o);
  }
  return n.set(e, t), (this.size = n.size), this;
}
function Be(e) {
  var t = (this.__data__ = new Pe(e));
  this.size = t.size;
}
Be.prototype.clear = Os;
Be.prototype.delete = Es;
Be.prototype.get = Ts;
Be.prototype.has = Is;
Be.prototype.set = xu;
var Ou = '__lodash_hash_undefined__';
function Eu(e) {
  return this.__data__.set(e, Ou), this;
}
function Tu(e) {
  return this.__data__.has(e);
}
function Pt(e) {
  var t = -1,
    n = e == null ? 0 : e.length;
  for (this.__data__ = new qe(); ++t < n; ) this.add(e[t]);
}
Pt.prototype.add = Pt.prototype.push = Eu;
Pt.prototype.has = Tu;
function Iu(e, t) {
  for (var n = -1, o = e == null ? 0 : e.length; ++n < o; )
    if (t(e[n], n, e)) return !0;
  return !1;
}
function Fi(e, t) {
  return e.has(t);
}
var Pu = 1,
  _u = 2;
function ji(e, t, n, o, r, i) {
  var a = n & Pu,
    l = e.length,
    s = t.length;
  if (l != s && !(a && s > l)) return !1;
  var u = i.get(e),
    d = i.get(t);
  if (u && d) return u == t && d == e;
  var c = -1,
    m = !0,
    p = n & _u ? new Pt() : void 0;
  for (i.set(e, t), i.set(t, e); ++c < l; ) {
    var v = e[c],
      g = t[c];
    if (o) var b = a ? o(g, v, c, t, e, i) : o(v, g, c, e, t, i);
    if (b !== void 0) {
      if (b) continue;
      m = !1;
      break;
    }
    if (p) {
      if (
        !Iu(t, function(y, $) {
          if (!Fi(p, $) && (v === y || r(v, y, n, o, i))) return p.push($);
        })
      ) {
        m = !1;
        break;
      }
    } else if (!(v === g || r(v, g, n, o, i))) {
      m = !1;
      break;
    }
  }
  return i.delete(e), i.delete(t), m;
}
var Au = _e.Uint8Array;
const tr = Au;
function Mu(e) {
  var t = -1,
    n = Array(e.size);
  return (
    e.forEach(function(o, r) {
      n[++t] = [r, o];
    }),
    n
  );
}
function fo(e) {
  var t = -1,
    n = Array(e.size);
  return (
    e.forEach(function(o) {
      n[++t] = o;
    }),
    n
  );
}
var Ru = 1,
  Du = 2,
  Nu = '[object Boolean]',
  Bu = '[object Date]',
  zu = '[object Error]',
  Hu = '[object Map]',
  Lu = '[object Number]',
  Fu = '[object RegExp]',
  ju = '[object Set]',
  Wu = '[object String]',
  Vu = '[object Symbol]',
  Ku = '[object ArrayBuffer]',
  Uu = '[object DataView]',
  nr = st ? st.prototype : void 0,
  Cn = nr ? nr.valueOf : void 0;
function Gu(e, t, n, o, r, i, a) {
  switch (n) {
    case Uu:
      if (e.byteLength != t.byteLength || e.byteOffset != t.byteOffset)
        return !1;
      (e = e.buffer), (t = t.buffer);
    case Ku:
      return !(e.byteLength != t.byteLength || !i(new tr(e), new tr(t)));
    case Nu:
    case Bu:
    case Lu:
      return Ni(+e, +t);
    case zu:
      return e.name == t.name && e.message == t.message;
    case Fu:
    case Wu:
      return e == t + '';
    case Hu:
      var l = Mu;
    case ju:
      var s = o & Ru;
      if ((l || (l = fo), e.size != t.size && !s)) return !1;
      var u = a.get(e);
      if (u) return u == t;
      (o |= Du), a.set(e, t);
      var d = ji(l(e), l(t), o, r, i, a);
      return a.delete(e), d;
    case Vu:
      if (Cn) return Cn.call(e) == Cn.call(t);
  }
  return !1;
}
function Xu(e, t) {
  for (var n = -1, o = t.length, r = e.length; ++n < o; ) e[r + n] = t[n];
  return e;
}
var Yu = Array.isArray;
const _t = Yu;
function qu(e, t, n) {
  var o = t(e);
  return _t(e) ? o : Xu(o, n(e));
}
function Zu(e, t) {
  for (var n = -1, o = e == null ? 0 : e.length, r = 0, i = []; ++n < o; ) {
    var a = e[n];
    t(a, n, e) && (i[r++] = a);
  }
  return i;
}
function ku() {
  return [];
}
var Qu = Object.prototype,
  Ju = Qu.propertyIsEnumerable,
  or = Object.getOwnPropertySymbols,
  ec = or
    ? function(e) {
        return e == null
          ? []
          : ((e = Object(e)),
            Zu(or(e), function(t) {
              return Ju.call(e, t);
            }));
      }
    : ku;
const tc = ec;
function nc(e, t) {
  for (var n = -1, o = Array(e); ++n < e; ) o[n] = t(n);
  return o;
}
function ut(e) {
  return e != null && typeof e == 'object';
}
var oc = '[object Arguments]';
function rr(e) {
  return ut(e) && mt(e) == oc;
}
var Wi = Object.prototype,
  rc = Wi.hasOwnProperty,
  ic = Wi.propertyIsEnumerable,
  ac = rr(
    (function() {
      return arguments;
    })()
  )
    ? rr
    : function(e) {
        return ut(e) && rc.call(e, 'callee') && !ic.call(e, 'callee');
      };
const Vi = ac;
function lc() {
  return !1;
}
var Ki = typeof exports == 'object' && exports && !exports.nodeType && exports,
  ir = Ki && typeof module == 'object' && module && !module.nodeType && module,
  sc = ir && ir.exports === Ki,
  ar = sc ? _e.Buffer : void 0,
  uc = ar ? ar.isBuffer : void 0,
  cc = uc || lc;
const Jt = cc;
var dc = 9007199254740991,
  fc = /^(?:0|[1-9]\d*)$/;
function pc(e, t) {
  var n = typeof e;
  return (
    (t = t ?? dc),
    !!t &&
      (n == 'number' || (n != 'symbol' && fc.test(e))) &&
      e > -1 &&
      e % 1 == 0 &&
      e < t
  );
}
var mc = 9007199254740991;
function Ui(e) {
  return typeof e == 'number' && e > -1 && e % 1 == 0 && e <= mc;
}
var vc = '[object Arguments]',
  gc = '[object Array]',
  hc = '[object Boolean]',
  bc = '[object Date]',
  yc = '[object Error]',
  $c = '[object Function]',
  wc = '[object Map]',
  Sc = '[object Number]',
  Cc = '[object Object]',
  xc = '[object RegExp]',
  Oc = '[object Set]',
  Ec = '[object String]',
  Tc = '[object WeakMap]',
  Ic = '[object ArrayBuffer]',
  Pc = '[object DataView]',
  _c = '[object Float32Array]',
  Ac = '[object Float64Array]',
  Mc = '[object Int8Array]',
  Rc = '[object Int16Array]',
  Dc = '[object Int32Array]',
  Nc = '[object Uint8Array]',
  Bc = '[object Uint8ClampedArray]',
  zc = '[object Uint16Array]',
  Hc = '[object Uint32Array]',
  te = {};
te[_c] = te[Ac] = te[Mc] = te[Rc] = te[Dc] = te[Nc] = te[Bc] = te[zc] = te[
  Hc
] = !0;
te[vc] = te[gc] = te[Ic] = te[hc] = te[Pc] = te[bc] = te[yc] = te[$c] = te[
  wc
] = te[Sc] = te[Cc] = te[xc] = te[Oc] = te[Ec] = te[Tc] = !1;
function Lc(e) {
  return ut(e) && Ui(e.length) && !!te[mt(e)];
}
function Fc(e) {
  return function(t) {
    return e(t);
  };
}
var Gi = typeof exports == 'object' && exports && !exports.nodeType && exports,
  St = Gi && typeof module == 'object' && module && !module.nodeType && module,
  jc = St && St.exports === Gi,
  xn = jc && Bi.process,
  Wc = (function() {
    try {
      var e = St && St.require && St.require('util').types;
      return e || (xn && xn.binding && xn.binding('util'));
    } catch {}
  })();
const lr = Wc;
var sr = lr && lr.isTypedArray,
  Vc = sr ? Fc(sr) : Lc;
const po = Vc;
var Kc = Object.prototype,
  Uc = Kc.hasOwnProperty;
function Gc(e, t) {
  var n = _t(e),
    o = !n && Vi(e),
    r = !n && !o && Jt(e),
    i = !n && !o && !r && po(e),
    a = n || o || r || i,
    l = a ? nc(e.length, String) : [],
    s = l.length;
  for (var u in e)
    (t || Uc.call(e, u)) &&
      !(
        a &&
        (u == 'length' ||
          (r && (u == 'offset' || u == 'parent')) ||
          (i && (u == 'buffer' || u == 'byteLength' || u == 'byteOffset')) ||
          pc(u, s))
      ) &&
      l.push(u);
  return l;
}
var Xc = Object.prototype;
function Xi(e) {
  var t = e && e.constructor,
    n = (typeof t == 'function' && t.prototype) || Xc;
  return e === n;
}
function Yc(e, t) {
  return function(n) {
    return e(t(n));
  };
}
var qc = Yc(Object.keys, Object);
const Zc = qc;
var kc = Object.prototype,
  Qc = kc.hasOwnProperty;
function Yi(e) {
  if (!Xi(e)) return Zc(e);
  var t = [];
  for (var n in Object(e)) Qc.call(e, n) && n != 'constructor' && t.push(n);
  return t;
}
function qi(e) {
  return e != null && Ui(e.length) && !Li(e);
}
function Jc(e) {
  return qi(e) ? Gc(e) : Yi(e);
}
function ur(e) {
  return qu(e, Jc, tc);
}
var ed = 1,
  td = Object.prototype,
  nd = td.hasOwnProperty;
function od(e, t, n, o, r, i) {
  var a = n & ed,
    l = ur(e),
    s = l.length,
    u = ur(t),
    d = u.length;
  if (s != d && !a) return !1;
  for (var c = s; c--; ) {
    var m = l[c];
    if (!(a ? m in t : nd.call(t, m))) return !1;
  }
  var p = i.get(e),
    v = i.get(t);
  if (p && v) return p == t && v == e;
  var g = !0;
  i.set(e, t), i.set(t, e);
  for (var b = a; ++c < s; ) {
    m = l[c];
    var y = e[m],
      $ = t[m];
    if (o) var O = a ? o($, y, m, t, e, i) : o(y, $, m, e, t, i);
    if (!(O === void 0 ? y === $ || r(y, $, n, o, i) : O)) {
      g = !1;
      break;
    }
    b || (b = m == 'constructor');
  }
  if (g && !b) {
    var z = e.constructor,
      I = t.constructor;
    z != I &&
      'constructor' in e &&
      'constructor' in t &&
      !(
        typeof z == 'function' &&
        z instanceof z &&
        typeof I == 'function' &&
        I instanceof I
      ) &&
      (g = !1);
  }
  return i.delete(e), i.delete(t), g;
}
var rd = vt(_e, 'DataView');
const Wn = rd;
var id = vt(_e, 'Promise');
const Vn = id;
var ad = vt(_e, 'Set');
const nt = ad;
var ld = vt(_e, 'WeakMap');
const Kn = ld;
var cr = '[object Map]',
  sd = '[object Object]',
  dr = '[object Promise]',
  fr = '[object Set]',
  pr = '[object WeakMap]',
  mr = '[object DataView]',
  ud = Ye(Wn),
  cd = Ye(Tt),
  dd = Ye(Vn),
  fd = Ye(nt),
  pd = Ye(Kn),
  Ke = mt;
((Wn && Ke(new Wn(new ArrayBuffer(1))) != mr) ||
  (Tt && Ke(new Tt()) != cr) ||
  (Vn && Ke(Vn.resolve()) != dr) ||
  (nt && Ke(new nt()) != fr) ||
  (Kn && Ke(new Kn()) != pr)) &&
  (Ke = function(e) {
    var t = mt(e),
      n = t == sd ? e.constructor : void 0,
      o = n ? Ye(n) : '';
    if (o)
      switch (o) {
        case ud:
          return mr;
        case cd:
          return cr;
        case dd:
          return dr;
        case fd:
          return fr;
        case pd:
          return pr;
      }
    return t;
  });
const Un = Ke;
var md = 1,
  vr = '[object Arguments]',
  gr = '[object Array]',
  Lt = '[object Object]',
  vd = Object.prototype,
  hr = vd.hasOwnProperty;
function gd(e, t, n, o, r, i) {
  var a = _t(e),
    l = _t(t),
    s = a ? gr : Un(e),
    u = l ? gr : Un(t);
  (s = s == vr ? Lt : s), (u = u == vr ? Lt : u);
  var d = s == Lt,
    c = u == Lt,
    m = s == u;
  if (m && Jt(e)) {
    if (!Jt(t)) return !1;
    (a = !0), (d = !1);
  }
  if (m && !d)
    return (
      i || (i = new Be()),
      a || po(e) ? ji(e, t, n, o, r, i) : Gu(e, t, s, n, o, r, i)
    );
  if (!(n & md)) {
    var p = d && hr.call(e, '__wrapped__'),
      v = c && hr.call(t, '__wrapped__');
    if (p || v) {
      var g = p ? e.value() : e,
        b = v ? t.value() : t;
      return i || (i = new Be()), r(g, b, n, o, i);
    }
  }
  return m ? (i || (i = new Be()), od(e, t, n, o, r, i)) : !1;
}
function Zi(e, t, n, o, r) {
  return e === t
    ? !0
    : e == null || t == null || (!ut(e) && !ut(t))
    ? e !== e && t !== t
    : gd(e, t, n, o, Zi, r);
}
function hd(e, t) {
  return Zi(e, t);
}
const bd = {
  align: Object,
  target: [Object, Function],
  onAlign: Function,
  monitorBufferTime: Number,
  monitorWindowResize: Boolean,
  disabled: Boolean
};
function br(e) {
  return typeof e != 'function' ? null : e();
}
function yr(e) {
  return typeof e != 'object' || !e ? null : e;
}
const yd = Y({
    compatConfig: { MODE: 3 },
    name: 'Align',
    props: bd,
    emits: ['align'],
    setup(e, t) {
      let { expose: n, slots: o } = t;
      const r = G({}),
        i = G(),
        [a, l] = hs(
          () => {
            const { disabled: m, target: p, align: v, onAlign: g } = e;
            if (!m && p && i.value) {
              const b = i.value;
              let y;
              const $ = br(p),
                O = yr(p);
              (r.value.element = $), (r.value.point = O), (r.value.align = v);
              const { activeElement: z } = document;
              return (
                $ && Di($) ? (y = co(b, $, v)) : O && (y = ms(b, O, v)),
                gs(z, b),
                g && y && g(b, y),
                !0
              );
            }
            return !1;
          },
          S(() => e.monitorBufferTime)
        ),
        s = G({ cancel: () => {} }),
        u = G({ cancel: () => {} }),
        d = () => {
          const m = e.target,
            p = br(m),
            v = yr(m);
          i.value !== u.value.element &&
            (u.value.cancel(),
            (u.value.element = i.value),
            (u.value.cancel = Qo(i.value, a))),
            (r.value.element !== p ||
              !vs(r.value.point, v) ||
              !hd(r.value.align, e.align)) &&
              (a(),
              s.value.element !== p &&
                (s.value.cancel(),
                (s.value.element = p),
                (s.value.cancel = Qo(p, a))));
        };
      Ee(() => {
        Se(() => {
          d();
        });
      }),
        ln(() => {
          Se(() => {
            d();
          });
        }),
        ee(
          () => e.disabled,
          m => {
            m ? l() : a();
          },
          { immediate: !0, flush: 'post' }
        );
      const c = G(null);
      return (
        ee(
          () => e.monitorWindowResize,
          m => {
            m
              ? c.value || (c.value = $t(window, 'resize', a))
              : c.value && (c.value.remove(), (c.value = null));
          },
          { flush: 'post' }
        ),
        no(() => {
          s.value.cancel(), u.value.cancel(), c.value && c.value.remove(), l();
        }),
        n({ forceAlign: () => a(!0) }),
        () => {
          const m = o == null ? void 0 : o.default();
          return m ? be(m[0], { ref: i }, !0, !0) : null;
        }
      );
    }
  }),
  $d = Y({
    compatConfig: { MODE: 3 },
    name: 'PopupInner',
    inheritAttrs: !1,
    props: io,
    emits: ['mouseenter', 'mouseleave', 'mousedown', 'touchstart', 'align'],
    setup(e, t) {
      let { expose: n, attrs: o, slots: r } = t;
      const i = B(),
        a = B(),
        l = B(),
        [s, u] = jl(Nn(e, 'stretch')),
        d = () => {
          e.stretch && u(e.getRootDomNode());
        },
        c = B(!1);
      let m;
      ee(
        () => e.visible,
        T => {
          clearTimeout(m),
            T
              ? (m = setTimeout(() => {
                  c.value = e.visible;
                }))
              : (c.value = !1);
        },
        { immediate: !0 }
      );
      const [p, v] = Fl(c, d),
        g = B(),
        b = () => (e.point ? e.point : e.getRootDomNode),
        y = () => {
          var T;
          (T = i.value) === null || T === void 0 || T.forceAlign();
        },
        $ = (T, P) => {
          var M;
          const j = e.getClassNameFromAlign(P),
            C = l.value;
          l.value !== j && (l.value = j),
            p.value === 'align' &&
              (C !== j
                ? Promise.resolve().then(() => {
                    y();
                  })
                : v(() => {
                    var A;
                    (A = g.value) === null || A === void 0 || A.call(g);
                  }),
              (M = e.onAlign) === null || M === void 0 || M.call(e, T, P));
        },
        O = S(() => {
          const T = typeof e.animation == 'object' ? e.animation : si(e);
          return (
            ['onAfterEnter', 'onAfterLeave'].forEach(P => {
              const M = T[P];
              T[P] = j => {
                v(), (p.value = 'stable'), M == null || M(j);
              };
            }),
            T
          );
        }),
        z = () =>
          new Promise(T => {
            g.value = T;
          });
      ee(
        [O, p],
        () => {
          !O.value && p.value === 'motion' && v();
        },
        { immediate: !0 }
      ),
        n({ forceAlign: y, getElement: () => a.value.$el || a.value });
      const I = S(() => {
        var T;
        return !(
          !((T = e.align) === null || T === void 0) &&
          T.points &&
          (p.value === 'align' || p.value === 'stable')
        );
      });
      return () => {
        var T;
        const {
            zIndex: P,
            align: M,
            prefixCls: j,
            destroyPopupOnHide: C,
            onMouseenter: A,
            onMouseleave: q,
            onTouchstart: X = () => {},
            onMousedown: k
          } = e,
          w = p.value,
          R = [
            f(f({}, s.value), {
              zIndex: P,
              opacity: w === 'motion' || w === 'stable' || !c.value ? null : 0,
              pointerEvents: !c.value && w !== 'stable' ? 'none' : null
            }),
            o.style
          ];
        let K = Xe(
          (T = r.default) === null || T === void 0
            ? void 0
            : T.call(r, { visible: e.visible })
        );
        K.length > 1 && (K = h('div', { class: `${j}-content` }, [K]));
        const x = ie(j, o.class, l.value),
          F = c.value || !e.visible ? ui(O.value.name, O.value) : {};
        return h(pt, D(D({ ref: a }, F), {}, { onBeforeEnter: z }), {
          default: () =>
            !C || e.visible
              ? sn(
                  h(
                    yd,
                    {
                      target: b(),
                      key: 'popup',
                      ref: i,
                      monitorWindowResize: !0,
                      disabled: I.value,
                      align: M,
                      onAlign: $
                    },
                    {
                      default: () =>
                        h(
                          'div',
                          {
                            class: x,
                            onMouseenter: A,
                            onMouseleave: q,
                            onMousedown: Ro(k, ['capture']),
                            [et ? 'onTouchstartPassive' : 'onTouchstart']: Ro(
                              X,
                              ['capture']
                            ),
                            style: R
                          },
                          [K]
                        )
                    }
                  ),
                  [[di, c.value]]
                )
              : null
        });
      };
    }
  }),
  wd = Y({
    compatConfig: { MODE: 3 },
    name: 'Popup',
    inheritAttrs: !1,
    props: zl,
    setup(e, t) {
      let { attrs: n, slots: o, expose: r } = t;
      const i = B(!1),
        a = B(!1),
        l = B(),
        s = B();
      return (
        ee(
          [() => e.visible, () => e.mobile],
          () => {
            (i.value = e.visible), e.visible && e.mobile && (a.value = !0);
          },
          { immediate: !0, flush: 'post' }
        ),
        r({
          forceAlign: () => {
            var u;
            (u = l.value) === null || u === void 0 || u.forceAlign();
          },
          getElement: () => {
            var u;
            return (u = l.value) === null || u === void 0
              ? void 0
              : u.getElement();
          }
        }),
        () => {
          const u = f(f(f({}, e), n), { visible: i.value }),
            d = a.value
              ? h(Hl, D(D({}, u), {}, { mobile: e.mobile, ref: l }), {
                  default: o.default
                })
              : h($d, D(D({}, u), {}, { ref: l }), { default: o.default });
          return h('div', { ref: s }, [h(Oi, u, null), d]);
        }
      );
    }
  });
function Sd(e, t, n) {
  return n ? e[0] === t[0] : e[0] === t[0] && e[1] === t[1];
}
function $r(e, t, n) {
  const o = e[t] || {};
  return f(f({}, o), n);
}
function Cd(e, t, n, o) {
  const { points: r } = n,
    i = Object.keys(e);
  for (let a = 0; a < i.length; a += 1) {
    const l = i[a];
    if (Sd(e[l].points, r, o)) return `${t}-placement-${l}`;
  }
  return '';
}
const xd = {
  methods: {
    setState() {
      let e =
          arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : {},
        t = arguments.length > 1 ? arguments[1] : void 0,
        n = typeof e == 'function' ? e(this.$data, this.$props) : e;
      if (this.getDerivedStateFromProps) {
        const o = this.getDerivedStateFromProps(
          za(this),
          f(f({}, this.$data), n)
        );
        if (o === null) return;
        n = f(f({}, n), o || {});
      }
      f(this.$data, n),
        this._.isMounted && this.$forceUpdate(),
        Se(() => {
          t && t();
        });
    },
    __emit() {
      const e = [].slice.call(arguments, 0);
      let t = e[0];
      t = `on${t[0].toUpperCase()}${t.substring(1)}`;
      const n = this.$props[t] || this.$attrs[t];
      if (e.length && n)
        if (Array.isArray(n))
          for (let o = 0, r = n.length; o < r; o++) n[o](...e.slice(1));
        else n(...e.slice(1));
    }
  }
};
let On;
function ki(e) {
  if (typeof document > 'u') return 0;
  if (e || On === void 0) {
    const t = document.createElement('div');
    (t.style.width = '100%'), (t.style.height = '200px');
    const n = document.createElement('div'),
      o = n.style;
    (o.position = 'absolute'),
      (o.top = '0'),
      (o.left = '0'),
      (o.pointerEvents = 'none'),
      (o.visibility = 'hidden'),
      (o.width = '200px'),
      (o.height = '150px'),
      (o.overflow = 'hidden'),
      n.appendChild(t),
      document.body.appendChild(n);
    const r = t.offsetWidth;
    n.style.overflow = 'scroll';
    let i = t.offsetWidth;
    r === i && (i = n.clientWidth), document.body.removeChild(n), (On = r - i);
  }
  return On;
}
function wr(e) {
  const t = e.match(/^(.*)px$/),
    n = Number(t == null ? void 0 : t[1]);
  return Number.isNaN(n) ? ki() : n;
}
function dv(e) {
  if (typeof document > 'u' || !e || !(e instanceof Element))
    return { width: 0, height: 0 };
  const { width: t, height: n } = getComputedStyle(e, '::-webkit-scrollbar');
  return { width: wr(t), height: wr(n) };
}
const Od = `vc-util-locker-${Date.now()}`;
let Sr = 0;
function Ed() {
  return (
    document.body.scrollHeight >
      (window.innerHeight || document.documentElement.clientHeight) &&
    window.innerWidth > document.body.offsetWidth
  );
}
function Td(e) {
  const t = S(() => !!e && !!e.value);
  Sr += 1;
  const n = `${Od}_${Sr}`;
  Te(
    o => {
      if (ot()) {
        if (t.value) {
          const r = ki(),
            i = Ed();
          Ha(
            `
html body {
  overflow-y: hidden;
  ${i ? `width: calc(100% - ${r}px);` : ''}
}`,
            n
          );
        } else Po(n);
        o(() => {
          Po(n);
        });
      }
    },
    { flush: 'post' }
  );
}
let We = 0;
const Kt = ot(),
  Cr = e => {
    if (!Kt) return null;
    if (e) {
      if (typeof e == 'string') return document.querySelectorAll(e)[0];
      if (typeof e == 'function') return e();
      if (typeof e == 'object' && e instanceof window.HTMLElement) return e;
    }
    return document.body;
  },
  Id = Y({
    compatConfig: { MODE: 3 },
    name: 'PortalWrapper',
    inheritAttrs: !1,
    props: {
      wrapperClassName: String,
      forceRender: { type: Boolean, default: void 0 },
      getContainer: _.any,
      visible: { type: Boolean, default: void 0 },
      autoLock: Xt(),
      didUpdate: Function
    },
    setup(e, t) {
      let { slots: n } = t;
      const o = B(),
        r = B(),
        i = B(),
        a = ot() && document.createElement('div'),
        l = () => {
          var p, v;
          o.value === a &&
            ((v =
              (p = o.value) === null || p === void 0
                ? void 0
                : p.parentNode) === null ||
              v === void 0 ||
              v.removeChild(o.value)),
            (o.value = null);
        };
      let s = null;
      const u = function() {
          return (arguments.length > 0 && arguments[0] !== void 0
            ? arguments[0]
            : !1) ||
            (o.value && !o.value.parentNode)
            ? ((s = Cr(e.getContainer)), s ? (s.appendChild(o.value), !0) : !1)
            : !0;
        },
        d = () =>
          Kt ? (o.value || ((o.value = a), u(!0)), c(), o.value) : null,
        c = () => {
          const { wrapperClassName: p } = e;
          o.value && p && p !== o.value.className && (o.value.className = p);
        };
      ln(() => {
        c(), u();
      });
      const m = He();
      return (
        Td(
          S(
            () =>
              e.autoLock &&
              e.visible &&
              ot() &&
              (o.value === document.body || o.value === a)
          )
        ),
        Ee(() => {
          let p = !1;
          ee(
            [() => e.visible, () => e.getContainer],
            (v, g) => {
              let [b, y] = v,
                [$, O] = g;
              Kt &&
                ((s = Cr(e.getContainer)),
                s === document.body && (b && !$ ? (We += 1) : p && (We -= 1))),
                p &&
                  (typeof y == 'function' && typeof O == 'function'
                    ? y.toString() !== O.toString()
                    : y !== O) &&
                  l(),
                (p = !0);
            },
            { immediate: !0, flush: 'post' }
          ),
            Se(() => {
              u() ||
                (i.value = re(() => {
                  m.update();
                }));
            });
        }),
        we(() => {
          const { visible: p } = e;
          Kt && s === document.body && (We = p && We ? We - 1 : We),
            l(),
            re.cancel(i.value);
        }),
        () => {
          const { forceRender: p, visible: v } = e;
          let g = null;
          const b = { getOpenCount: () => We, getContainer: d };
          return (
            (p || v || r.value) &&
              (g = h(
                La,
                { getContainer: d, ref: r, didUpdate: e.didUpdate },
                {
                  default: () => {
                    var y;
                    return (y = n.default) === null || y === void 0
                      ? void 0
                      : y.call(n, b);
                  }
                }
              )),
            g
          );
        }
      );
    }
  }),
  Pd = [
    'onClick',
    'onMousedown',
    'onTouchstart',
    'onMouseenter',
    'onMouseleave',
    'onFocus',
    'onBlur',
    'onContextmenu'
  ],
  mo = Y({
    compatConfig: { MODE: 3 },
    name: 'Trigger',
    mixins: [xd],
    inheritAttrs: !1,
    props: Nl(),
    setup(e) {
      const t = S(() => {
          const { popupPlacement: r, popupAlign: i, builtinPlacements: a } = e;
          return r && a ? $r(a, r, i) : i;
        }),
        n = B(null),
        o = r => {
          n.value = r;
        };
      return {
        vcTriggerContext: he('vcTriggerContext', {}),
        popupRef: n,
        setPopupRef: o,
        triggerRef: B(null),
        align: t,
        focusTime: null,
        clickOutsideHandler: null,
        contextmenuOutsideHandler1: null,
        contextmenuOutsideHandler2: null,
        touchOutsideHandler: null,
        attachId: null,
        delayTimer: null,
        hasPopupMouseDown: !1,
        preClickTime: null,
        preTouchTime: null,
        mouseDownTimeout: null,
        childOriginEvents: {}
      };
    },
    data() {
      const e = this.$props;
      let t;
      return (
        this.popupVisible !== void 0
          ? (t = !!e.popupVisible)
          : (t = !!e.defaultPopupVisible),
        Pd.forEach(n => {
          this[`fire${n}`] = o => {
            this.fireEvents(n, o);
          };
        }),
        { prevPopupVisible: t, sPopupVisible: t, point: null }
      );
    },
    watch: {
      popupVisible(e) {
        e !== void 0 &&
          ((this.prevPopupVisible = this.sPopupVisible),
          (this.sPopupVisible = e));
      }
    },
    created() {
      Ce('vcTriggerContext', {
        onPopupMouseDown: this.onPopupMouseDown,
        onPopupMouseenter: this.onPopupMouseenter,
        onPopupMouseleave: this.onPopupMouseleave
      }),
        Fa(this);
    },
    deactivated() {
      this.setPopupVisible(!1);
    },
    mounted() {
      this.$nextTick(() => {
        this.updatedCal();
      });
    },
    updated() {
      this.$nextTick(() => {
        this.updatedCal();
      });
    },
    beforeUnmount() {
      this.clearDelayTimer(),
        this.clearOutsideHandler(),
        clearTimeout(this.mouseDownTimeout),
        re.cancel(this.attachId);
    },
    methods: {
      updatedCal() {
        const e = this.$props;
        if (this.$data.sPopupVisible) {
          let n;
          !this.clickOutsideHandler &&
            (this.isClickToHide() || this.isContextmenuToShow()) &&
            ((n = e.getDocument(this.getRootDomNode())),
            (this.clickOutsideHandler = $t(
              n,
              'mousedown',
              this.onDocumentClick
            ))),
            this.touchOutsideHandler ||
              ((n = n || e.getDocument(this.getRootDomNode())),
              (this.touchOutsideHandler = $t(
                n,
                'touchstart',
                this.onDocumentClick,
                et ? { passive: !1 } : !1
              ))),
            !this.contextmenuOutsideHandler1 &&
              this.isContextmenuToShow() &&
              ((n = n || e.getDocument(this.getRootDomNode())),
              (this.contextmenuOutsideHandler1 = $t(
                n,
                'scroll',
                this.onContextmenuClose
              ))),
            !this.contextmenuOutsideHandler2 &&
              this.isContextmenuToShow() &&
              (this.contextmenuOutsideHandler2 = $t(
                window,
                'blur',
                this.onContextmenuClose
              ));
        } else this.clearOutsideHandler();
      },
      onMouseenter(e) {
        const { mouseEnterDelay: t } = this.$props;
        this.fireEvents('onMouseenter', e),
          this.delaySetPopupVisible(!0, t, t ? null : e);
      },
      onMouseMove(e) {
        this.fireEvents('onMousemove', e), this.setPoint(e);
      },
      onMouseleave(e) {
        this.fireEvents('onMouseleave', e),
          this.delaySetPopupVisible(!1, this.$props.mouseLeaveDelay);
      },
      onPopupMouseenter() {
        const { vcTriggerContext: e = {} } = this;
        e.onPopupMouseenter && e.onPopupMouseenter(), this.clearDelayTimer();
      },
      onPopupMouseleave(e) {
        var t;
        if (
          e &&
          e.relatedTarget &&
          !e.relatedTarget.setTimeout &&
          Je(
            (t = this.popupRef) === null || t === void 0
              ? void 0
              : t.getElement(),
            e.relatedTarget
          )
        )
          return;
        this.delaySetPopupVisible(!1, this.$props.mouseLeaveDelay);
        const { vcTriggerContext: n = {} } = this;
        n.onPopupMouseleave && n.onPopupMouseleave(e);
      },
      onFocus(e) {
        this.fireEvents('onFocus', e),
          this.clearDelayTimer(),
          this.isFocusToShow() &&
            ((this.focusTime = Date.now()),
            this.delaySetPopupVisible(!0, this.$props.focusDelay));
      },
      onMousedown(e) {
        this.fireEvents('onMousedown', e), (this.preClickTime = Date.now());
      },
      onTouchstart(e) {
        this.fireEvents('onTouchstart', e), (this.preTouchTime = Date.now());
      },
      onBlur(e) {
        Je(e.target, e.relatedTarget || document.activeElement) ||
          (this.fireEvents('onBlur', e),
          this.clearDelayTimer(),
          this.isBlurToHide() &&
            this.delaySetPopupVisible(!1, this.$props.blurDelay));
      },
      onContextmenu(e) {
        e.preventDefault(),
          this.fireEvents('onContextmenu', e),
          this.setPopupVisible(!0, e);
      },
      onContextmenuClose() {
        this.isContextmenuToShow() && this.close();
      },
      onClick(e) {
        if ((this.fireEvents('onClick', e), this.focusTime)) {
          let n;
          if (
            (this.preClickTime && this.preTouchTime
              ? (n = Math.min(this.preClickTime, this.preTouchTime))
              : this.preClickTime
              ? (n = this.preClickTime)
              : this.preTouchTime && (n = this.preTouchTime),
            Math.abs(n - this.focusTime) < 20)
          )
            return;
          this.focusTime = 0;
        }
        (this.preClickTime = 0),
          (this.preTouchTime = 0),
          this.isClickToShow() &&
            (this.isClickToHide() || this.isBlurToHide()) &&
            e &&
            e.preventDefault &&
            e.preventDefault(),
          e && e.domEvent && e.domEvent.preventDefault();
        const t = !this.$data.sPopupVisible;
        ((this.isClickToHide() && !t) || (t && this.isClickToShow())) &&
          this.setPopupVisible(!this.$data.sPopupVisible, e);
      },
      onPopupMouseDown() {
        const { vcTriggerContext: e = {} } = this;
        (this.hasPopupMouseDown = !0),
          clearTimeout(this.mouseDownTimeout),
          (this.mouseDownTimeout = setTimeout(() => {
            this.hasPopupMouseDown = !1;
          }, 0)),
          e.onPopupMouseDown && e.onPopupMouseDown(...arguments);
      },
      onDocumentClick(e) {
        if (this.$props.mask && !this.$props.maskClosable) return;
        const t = e.target,
          n = this.getRootDomNode(),
          o = this.getPopupDomNode();
        (!Je(n, t) || this.isContextMenuOnly()) &&
          !Je(o, t) &&
          !this.hasPopupMouseDown &&
          this.delaySetPopupVisible(!1, 0.1);
      },
      getPopupDomNode() {
        var e;
        return (
          ((e = this.popupRef) === null || e === void 0
            ? void 0
            : e.getElement()) || null
        );
      },
      getRootDomNode() {
        var e, t, n, o;
        const { getTriggerDOMNode: r } = this.$props;
        if (r) {
          const i =
            ((t =
              (e = this.triggerRef) === null || e === void 0
                ? void 0
                : e.$el) === null || t === void 0
              ? void 0
              : t.nodeName) === '#comment'
              ? null
              : Re(this.triggerRef);
          return Re(r(i));
        }
        try {
          const i =
            ((o =
              (n = this.triggerRef) === null || n === void 0
                ? void 0
                : n.$el) === null || o === void 0
              ? void 0
              : o.nodeName) === '#comment'
              ? null
              : Re(this.triggerRef);
          if (i) return i;
        } catch {}
        return Re(this);
      },
      handleGetPopupClassFromAlign(e) {
        const t = [],
          n = this.$props,
          {
            popupPlacement: o,
            builtinPlacements: r,
            prefixCls: i,
            alignPoint: a,
            getPopupClassNameFromAlign: l
          } = n;
        return o && r && t.push(Cd(r, i, e, a)), l && t.push(l(e)), t.join(' ');
      },
      getPopupAlign() {
        const e = this.$props,
          { popupPlacement: t, popupAlign: n, builtinPlacements: o } = e;
        return t && o ? $r(o, t, n) : n;
      },
      getComponent() {
        const e = {};
        this.isMouseEnterToShow() && (e.onMouseenter = this.onPopupMouseenter),
          this.isMouseLeaveToHide() &&
            (e.onMouseleave = this.onPopupMouseleave),
          (e.onMousedown = this.onPopupMouseDown),
          (e[
            et ? 'onTouchstartPassive' : 'onTouchstart'
          ] = this.onPopupMouseDown);
        const {
            handleGetPopupClassFromAlign: t,
            getRootDomNode: n,
            $attrs: o
          } = this,
          {
            prefixCls: r,
            destroyPopupOnHide: i,
            popupClassName: a,
            popupAnimation: l,
            popupTransitionName: s,
            popupStyle: u,
            mask: d,
            maskAnimation: c,
            maskTransitionName: m,
            zIndex: p,
            stretch: v,
            alignPoint: g,
            mobile: b,
            forceRender: y
          } = this.$props,
          { sPopupVisible: $, point: O } = this.$data,
          z = f(
            f(
              {
                prefixCls: r,
                destroyPopupOnHide: i,
                visible: $,
                point: g ? O : null,
                align: this.align,
                animation: l,
                getClassNameFromAlign: t,
                stretch: v,
                getRootDomNode: n,
                mask: d,
                zIndex: p,
                transitionName: s,
                maskAnimation: c,
                maskTransitionName: m,
                class: a,
                style: u,
                onAlign: o.onPopupAlign || xi
              },
              e
            ),
            { ref: this.setPopupRef, mobile: b, forceRender: y }
          );
        return h(wd, z, {
          default: this.$slots.popup || (() => ja(this, 'popup'))
        });
      },
      attachParent(e) {
        re.cancel(this.attachId);
        const { getPopupContainer: t, getDocument: n } = this.$props,
          o = this.getRootDomNode();
        let r;
        t
          ? (o || t.length === 0) && (r = t(o))
          : (r = n(this.getRootDomNode()).body),
          r
            ? r.appendChild(e)
            : (this.attachId = re(() => {
                this.attachParent(e);
              }));
      },
      getContainer() {
        const { $props: e } = this,
          { getDocument: t } = e,
          n = t(this.getRootDomNode()).createElement('div');
        return (
          (n.style.position = 'absolute'),
          (n.style.top = '0'),
          (n.style.left = '0'),
          (n.style.width = '100%'),
          this.attachParent(n),
          n
        );
      },
      setPopupVisible(e, t) {
        const {
          alignPoint: n,
          sPopupVisible: o,
          onPopupVisibleChange: r
        } = this;
        this.clearDelayTimer(),
          o !== e &&
            (Wa(this, 'popupVisible') ||
              this.setState({ sPopupVisible: e, prevPopupVisible: o }),
            r && r(e)),
          n && t && e && this.setPoint(t);
      },
      setPoint(e) {
        const { alignPoint: t } = this.$props;
        !t ||
          !e ||
          this.setState({ point: { pageX: e.pageX, pageY: e.pageY } });
      },
      handlePortalUpdate() {
        this.prevPopupVisible !== this.sPopupVisible &&
          this.afterPopupVisibleChange(this.sPopupVisible);
      },
      delaySetPopupVisible(e, t, n) {
        const o = t * 1e3;
        if ((this.clearDelayTimer(), o)) {
          const r = n ? { pageX: n.pageX, pageY: n.pageY } : null;
          this.delayTimer = setTimeout(() => {
            this.setPopupVisible(e, r), this.clearDelayTimer();
          }, o);
        } else this.setPopupVisible(e, n);
      },
      clearDelayTimer() {
        this.delayTimer &&
          (clearTimeout(this.delayTimer), (this.delayTimer = null));
      },
      clearOutsideHandler() {
        this.clickOutsideHandler &&
          (this.clickOutsideHandler.remove(),
          (this.clickOutsideHandler = null)),
          this.contextmenuOutsideHandler1 &&
            (this.contextmenuOutsideHandler1.remove(),
            (this.contextmenuOutsideHandler1 = null)),
          this.contextmenuOutsideHandler2 &&
            (this.contextmenuOutsideHandler2.remove(),
            (this.contextmenuOutsideHandler2 = null)),
          this.touchOutsideHandler &&
            (this.touchOutsideHandler.remove(),
            (this.touchOutsideHandler = null));
      },
      createTwoChains(e) {
        let t = () => {};
        const n = _o(this);
        return this.childOriginEvents[e] && n[e]
          ? this[`fire${e}`]
          : ((t = this.childOriginEvents[e] || n[e] || t), t);
      },
      isClickToShow() {
        const { action: e, showAction: t } = this.$props;
        return e.indexOf('click') !== -1 || t.indexOf('click') !== -1;
      },
      isContextMenuOnly() {
        const { action: e } = this.$props;
        return (
          e === 'contextmenu' || (e.length === 1 && e[0] === 'contextmenu')
        );
      },
      isContextmenuToShow() {
        const { action: e, showAction: t } = this.$props;
        return (
          e.indexOf('contextmenu') !== -1 || t.indexOf('contextmenu') !== -1
        );
      },
      isClickToHide() {
        const { action: e, hideAction: t } = this.$props;
        return e.indexOf('click') !== -1 || t.indexOf('click') !== -1;
      },
      isMouseEnterToShow() {
        const { action: e, showAction: t } = this.$props;
        return e.indexOf('hover') !== -1 || t.indexOf('mouseenter') !== -1;
      },
      isMouseLeaveToHide() {
        const { action: e, hideAction: t } = this.$props;
        return e.indexOf('hover') !== -1 || t.indexOf('mouseleave') !== -1;
      },
      isFocusToShow() {
        const { action: e, showAction: t } = this.$props;
        return e.indexOf('focus') !== -1 || t.indexOf('focus') !== -1;
      },
      isBlurToHide() {
        const { action: e, hideAction: t } = this.$props;
        return e.indexOf('focus') !== -1 || t.indexOf('blur') !== -1;
      },
      forcePopupAlign() {
        var e;
        this.$data.sPopupVisible &&
          ((e = this.popupRef) === null || e === void 0 || e.forceAlign());
      },
      fireEvents(e, t) {
        this.childOriginEvents[e] && this.childOriginEvents[e](t);
        const n = this.$props[e] || this.$attrs[e];
        n && n(t);
      },
      close() {
        this.setPopupVisible(!1);
      }
    },
    render() {
      const { $attrs: e } = this,
        t = dt(Va(this)),
        { alignPoint: n, getPopupContainer: o } = this.$props,
        r = t[0];
      this.childOriginEvents = _o(r);
      const i = { key: 'trigger' };
      this.isContextmenuToShow()
        ? (i.onContextmenu = this.onContextmenu)
        : (i.onContextmenu = this.createTwoChains('onContextmenu')),
        this.isClickToHide() || this.isClickToShow()
          ? ((i.onClick = this.onClick),
            (i.onMousedown = this.onMousedown),
            (i[
              et ? 'onTouchstartPassive' : 'onTouchstart'
            ] = this.onTouchstart))
          : ((i.onClick = this.createTwoChains('onClick')),
            (i.onMousedown = this.createTwoChains('onMousedown')),
            (i[
              et ? 'onTouchstartPassive' : 'onTouchstart'
            ] = this.createTwoChains('onTouchstart'))),
        this.isMouseEnterToShow()
          ? ((i.onMouseenter = this.onMouseenter),
            n && (i.onMousemove = this.onMouseMove))
          : (i.onMouseenter = this.createTwoChains('onMouseenter')),
        this.isMouseLeaveToHide()
          ? (i.onMouseleave = this.onMouseleave)
          : (i.onMouseleave = this.createTwoChains('onMouseleave')),
        this.isFocusToShow() || this.isBlurToHide()
          ? ((i.onFocus = this.onFocus), (i.onBlur = this.onBlur))
          : ((i.onFocus = this.createTwoChains('onFocus')),
            (i.onBlur = u => {
              u &&
                (!u.relatedTarget || !Je(u.target, u.relatedTarget)) &&
                this.createTwoChains('onBlur')(u);
            }));
      const a = ie(r && r.props && r.props.class, e.class);
      a && (i.class = a);
      const l = be(r, f(f({}, i), { ref: 'triggerRef' }), !0, !0),
        s = h(
          Id,
          {
            key: 'portal',
            getContainer: o && (() => o(this.getRootDomNode())),
            didUpdate: this.handlePortalUpdate,
            visible: this.$data.sPopupVisible
          },
          { default: this.getComponent }
        );
      return h(it, null, [l, s]);
    }
  }),
  L = {
    MAC_ENTER: 3,
    BACKSPACE: 8,
    TAB: 9,
    NUM_CENTER: 12,
    ENTER: 13,
    SHIFT: 16,
    CTRL: 17,
    ALT: 18,
    PAUSE: 19,
    CAPS_LOCK: 20,
    ESC: 27,
    SPACE: 32,
    PAGE_UP: 33,
    PAGE_DOWN: 34,
    END: 35,
    HOME: 36,
    LEFT: 37,
    UP: 38,
    RIGHT: 39,
    DOWN: 40,
    PRINT_SCREEN: 44,
    INSERT: 45,
    DELETE: 46,
    ZERO: 48,
    ONE: 49,
    TWO: 50,
    THREE: 51,
    FOUR: 52,
    FIVE: 53,
    SIX: 54,
    SEVEN: 55,
    EIGHT: 56,
    NINE: 57,
    QUESTION_MARK: 63,
    A: 65,
    B: 66,
    C: 67,
    D: 68,
    E: 69,
    F: 70,
    G: 71,
    H: 72,
    I: 73,
    J: 74,
    K: 75,
    L: 76,
    M: 77,
    N: 78,
    O: 79,
    P: 80,
    Q: 81,
    R: 82,
    S: 83,
    T: 84,
    U: 85,
    V: 86,
    W: 87,
    X: 88,
    Y: 89,
    Z: 90,
    META: 91,
    WIN_KEY_RIGHT: 92,
    CONTEXT_MENU: 93,
    NUM_ZERO: 96,
    NUM_ONE: 97,
    NUM_TWO: 98,
    NUM_THREE: 99,
    NUM_FOUR: 100,
    NUM_FIVE: 101,
    NUM_SIX: 102,
    NUM_SEVEN: 103,
    NUM_EIGHT: 104,
    NUM_NINE: 105,
    NUM_MULTIPLY: 106,
    NUM_PLUS: 107,
    NUM_MINUS: 109,
    NUM_PERIOD: 110,
    NUM_DIVISION: 111,
    F1: 112,
    F2: 113,
    F3: 114,
    F4: 115,
    F5: 116,
    F6: 117,
    F7: 118,
    F8: 119,
    F9: 120,
    F10: 121,
    F11: 122,
    F12: 123,
    NUMLOCK: 144,
    SEMICOLON: 186,
    DASH: 189,
    EQUALS: 187,
    COMMA: 188,
    PERIOD: 190,
    SLASH: 191,
    APOSTROPHE: 192,
    SINGLE_QUOTE: 222,
    OPEN_SQUARE_BRACKET: 219,
    BACKSLASH: 220,
    CLOSE_SQUARE_BRACKET: 221,
    WIN_KEY: 224,
    MAC_FF_META: 224,
    WIN_IME: 229,
    isTextModifyingKeyEvent: function(t) {
      const { keyCode: n } = t;
      if ((t.altKey && !t.ctrlKey) || t.metaKey || (n >= L.F1 && n <= L.F12))
        return !1;
      switch (n) {
        case L.ALT:
        case L.CAPS_LOCK:
        case L.CONTEXT_MENU:
        case L.CTRL:
        case L.DOWN:
        case L.END:
        case L.ESC:
        case L.HOME:
        case L.INSERT:
        case L.LEFT:
        case L.MAC_FF_META:
        case L.META:
        case L.NUMLOCK:
        case L.NUM_CENTER:
        case L.PAGE_DOWN:
        case L.PAGE_UP:
        case L.PAUSE:
        case L.PRINT_SCREEN:
        case L.RIGHT:
        case L.SHIFT:
        case L.UP:
        case L.WIN_KEY:
        case L.WIN_KEY_RIGHT:
          return !1;
        default:
          return !0;
      }
    },
    isCharacterKey: function(t) {
      if (
        (t >= L.ZERO && t <= L.NINE) ||
        (t >= L.NUM_ZERO && t <= L.NUM_MULTIPLY) ||
        (t >= L.A && t <= L.Z) ||
        (window.navigator.userAgent.indexOf('WebKit') !== -1 && t === 0)
      )
        return !0;
      switch (t) {
        case L.SPACE:
        case L.QUESTION_MARK:
        case L.NUM_PLUS:
        case L.NUM_MINUS:
        case L.NUM_PERIOD:
        case L.NUM_DIVISION:
        case L.SEMICOLON:
        case L.DASH:
        case L.EQUALS:
        case L.COMMA:
        case L.PERIOD:
        case L.SLASH:
        case L.APOSTROPHE:
        case L.SINGLE_QUOTE:
        case L.OPEN_SQUARE_BRACKET:
        case L.BACKSLASH:
        case L.CLOSE_SQUARE_BRACKET:
          return !0;
        default:
          return !1;
      }
    }
  },
  _d = L;
function Ad(e) {
  e.target.composing = !0;
}
function xr(e) {
  e.target.composing && ((e.target.composing = !1), Md(e.target, 'input'));
}
function Md(e, t) {
  const n = document.createEvent('HTMLEvents');
  n.initEvent(t, !0, !0), e.dispatchEvent(n);
}
function En(e, t, n, o) {
  e.addEventListener(t, n, o);
}
const Rd = {
    created(e, t) {
      (!t.modifiers || !t.modifiers.lazy) &&
        (En(e, 'compositionstart', Ad),
        En(e, 'compositionend', xr),
        En(e, 'change', xr));
    }
  },
  Dd = Rd,
  Nd = `accept acceptcharset accesskey action allowfullscreen allowtransparency
alt async autocomplete autofocus autoplay capture cellpadding cellspacing challenge
charset checked classid classname colspan cols content contenteditable contextmenu
controls coords crossorigin data datetime default defer dir disabled download draggable
enctype form formaction formenctype formmethod formnovalidate formtarget frameborder
headers height hidden high href hreflang htmlfor for httpequiv icon id inputmode integrity
is keyparams keytype kind label lang list loop low manifest marginheight marginwidth max maxlength media
mediagroup method min minlength multiple muted name novalidate nonce open
optimum pattern placeholder poster preload radiogroup readonly rel required
reversed role rowspan rows sandbox scope scoped scrolling seamless selected
shape size sizes span spellcheck src srcdoc srclang srcset start step style
summary tabindex target title type usemap value width wmode wrap`,
  Bd = `onCopy onCut onPaste onCompositionend onCompositionstart onCompositionupdate onKeydown
    onKeypress onKeyup onFocus onBlur onChange onInput onSubmit onClick onContextmenu onDoubleclick onDblclick
    onDrag onDragend onDragenter onDragexit onDragleave onDragover onDragstart onDrop onMousedown
    onMouseenter onMouseleave onMousemove onMouseout onMouseover onMouseup onSelect onTouchcancel
    onTouchend onTouchmove onTouchstart onTouchstartPassive onTouchmovePassive onScroll onWheel onAbort onCanplay onCanplaythrough
    onDurationchange onEmptied onEncrypted onEnded onError onLoadeddata onLoadedmetadata
    onLoadstart onPause onPlay onPlaying onProgress onRatechange onSeeked onSeeking onStalled onSuspend onTimeupdate onVolumechange onWaiting onLoad onError`,
  Or = `${Nd} ${Bd}`.split(/[\s\n]+/),
  zd = 'aria-',
  Hd = 'data-';
function Er(e, t) {
  return e.indexOf(t) === 0;
}
function fv(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1,
    n;
  t === !1
    ? (n = { aria: !0, data: !0, attr: !0 })
    : t === !0
    ? (n = { aria: !0 })
    : (n = f({}, t));
  const o = {};
  return (
    Object.keys(e).forEach(r => {
      ((n.aria && (r === 'role' || Er(r, zd))) ||
        (n.data && Er(r, Hd)) ||
        (n.attr && (Or.includes(r) || Or.includes(r.toLowerCase())))) &&
        (o[r] = e[r]);
    }),
    o
  );
}
const Qi = Symbol('OverflowContextProviderKey'),
  Gn = Y({
    compatConfig: { MODE: 3 },
    name: 'OverflowContextProvider',
    inheritAttrs: !1,
    props: { value: { type: Object } },
    setup(e, t) {
      let { slots: n } = t;
      return (
        Ce(
          Qi,
          S(() => e.value)
        ),
        () => {
          var o;
          return (o = n.default) === null || o === void 0 ? void 0 : o.call(n);
        }
      );
    }
  }),
  Ld = () =>
    he(
      Qi,
      S(() => null)
    );
var Fd =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var r = 0, o = Object.getOwnPropertySymbols(e); r < o.length; r++)
        t.indexOf(o[r]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[r]) &&
          (n[o[r]] = e[o[r]]);
    return n;
  };
const Ze = void 0,
  Ut = Y({
    compatConfig: { MODE: 3 },
    name: 'Item',
    props: {
      prefixCls: String,
      item: _.any,
      renderItem: Function,
      responsive: Boolean,
      itemKey: { type: [String, Number] },
      registerSize: Function,
      display: Boolean,
      order: Number,
      component: _.any,
      invalidate: Boolean
    },
    setup(e, t) {
      let { slots: n, expose: o } = t;
      const r = S(() => e.responsive && !e.display),
        i = G();
      o({ itemNodeRef: i });
      function a(l) {
        e.registerSize(e.itemKey, l);
      }
      return (
        no(() => {
          a(null);
        }),
        () => {
          var l;
          const {
              prefixCls: s,
              invalidate: u,
              item: d,
              renderItem: c,
              responsive: m,
              registerSize: p,
              itemKey: v,
              display: g,
              order: b,
              component: y = 'div'
            } = e,
            $ = Fd(e, [
              'prefixCls',
              'invalidate',
              'item',
              'renderItem',
              'responsive',
              'registerSize',
              'itemKey',
              'display',
              'order',
              'component'
            ]),
            O = (l = n.default) === null || l === void 0 ? void 0 : l.call(n),
            z = c && d !== Ze ? c(d) : O;
          let I;
          u ||
            (I = {
              opacity: r.value ? 0 : 1,
              height: r.value ? 0 : Ze,
              overflowY: r.value ? 'hidden' : Ze,
              order: m ? b : Ze,
              pointerEvents: r.value ? 'none' : Ze,
              position: r.value ? 'absolute' : Ze
            });
          const T = {};
          return (
            r.value && (T['aria-hidden'] = !0),
            h(
              oo,
              {
                disabled: !m,
                onResize: P => {
                  let { offsetWidth: M } = P;
                  a(M);
                }
              },
              {
                default: () =>
                  h(
                    y,
                    D(
                      D(D({ class: ie(!u && s), style: I }, T), $),
                      {},
                      { ref: i }
                    ),
                    { default: () => [z] }
                  )
              }
            )
          );
        }
      );
    }
  });
var Tn =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var r = 0, o = Object.getOwnPropertySymbols(e); r < o.length; r++)
        t.indexOf(o[r]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[r]) &&
          (n[o[r]] = e[o[r]]);
    return n;
  };
const jd = Y({
  compatConfig: { MODE: 3 },
  name: 'RawItem',
  inheritAttrs: !1,
  props: {
    component: _.any,
    title: _.any,
    id: String,
    onMouseenter: { type: Function },
    onMouseleave: { type: Function },
    onClick: { type: Function },
    onKeydown: { type: Function },
    onFocus: { type: Function },
    role: String,
    tabindex: Number
  },
  setup(e, t) {
    let { slots: n, attrs: o } = t;
    const r = Ld();
    return () => {
      var i;
      if (!r.value) {
        const { component: c = 'div' } = e,
          m = Tn(e, ['component']);
        return h(c, D(D({}, m), o), {
          default: () => [
            (i = n.default) === null || i === void 0 ? void 0 : i.call(n)
          ]
        });
      }
      const a = r.value,
        { className: l } = a,
        s = Tn(a, ['className']),
        { class: u } = o,
        d = Tn(o, ['class']);
      return h(
        Gn,
        { value: null },
        { default: () => [h(Ut, D(D(D({ class: ie(l, u) }, s), d), e), n)] }
      );
    };
  }
});
var Wd =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var r = 0, o = Object.getOwnPropertySymbols(e); r < o.length; r++)
        t.indexOf(o[r]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[r]) &&
          (n[o[r]] = e[o[r]]);
    return n;
  };
const Ji = 'responsive',
  ea = 'invalidate';
function Vd(e) {
  return `+ ${e.length} ...`;
}
const Kd = () => ({
    id: String,
    prefixCls: String,
    data: Array,
    itemKey: [String, Number, Function],
    itemWidth: { type: Number, default: 10 },
    renderItem: Function,
    renderRawItem: Function,
    maxCount: [Number, String],
    renderRest: Function,
    renderRawRest: Function,
    suffix: _.any,
    component: String,
    itemComponent: _.any,
    onVisibleChange: Function,
    ssr: String,
    onMousedown: Function
  }),
  mn = Y({
    name: 'Overflow',
    inheritAttrs: !1,
    props: Kd(),
    emits: ['visibleChange'],
    setup(e, t) {
      let { attrs: n, emit: o, slots: r } = t;
      const i = S(() => e.ssr === 'full'),
        a = B(null),
        l = S(() => a.value || 0),
        s = B(new Map()),
        u = B(0),
        d = B(0),
        c = B(0),
        m = B(null),
        p = B(null),
        v = S(() =>
          p.value === null && i.value ? Number.MAX_SAFE_INTEGER : p.value || 0
        ),
        g = B(!1),
        b = S(() => `${e.prefixCls}-item`),
        y = S(() => Math.max(u.value, d.value)),
        $ = S(() => !!(e.data.length && e.maxCount === Ji)),
        O = S(() => e.maxCount === ea),
        z = S(
          () =>
            $.value ||
            (typeof e.maxCount == 'number' && e.data.length > e.maxCount)
        ),
        I = S(() => {
          let w = e.data;
          return (
            $.value
              ? a.value === null && i.value
                ? (w = e.data)
                : (w = e.data.slice(
                    0,
                    Math.min(e.data.length, l.value / e.itemWidth)
                  ))
              : typeof e.maxCount == 'number' &&
                (w = e.data.slice(0, e.maxCount)),
            w
          );
        }),
        T = S(() =>
          $.value ? e.data.slice(v.value + 1) : e.data.slice(I.value.length)
        ),
        P = (w, R) => {
          var K;
          return typeof e.itemKey == 'function'
            ? e.itemKey(w)
            : (K = e.itemKey && (w == null ? void 0 : w[e.itemKey])) !== null &&
              K !== void 0
            ? K
            : R;
        },
        M = S(() => e.renderItem || (w => w)),
        j = (w, R) => {
          (p.value = w),
            R || ((g.value = w < e.data.length - 1), o('visibleChange', w));
        },
        C = (w, R) => {
          a.value = R.clientWidth;
        },
        A = (w, R) => {
          const K = new Map(s.value);
          R === null ? K.delete(w) : K.set(w, R), (s.value = K);
        },
        q = (w, R) => {
          (u.value = d.value), (d.value = R);
        },
        X = (w, R) => {
          c.value = R;
        },
        k = w => s.value.get(P(I.value[w], w));
      return (
        ee([l, s, d, c, () => e.itemKey, I], () => {
          if (l.value && y.value && I.value) {
            let w = c.value;
            const R = I.value.length,
              K = R - 1;
            if (!R) {
              j(0), (m.value = null);
              return;
            }
            for (let x = 0; x < R; x += 1) {
              const H = k(x);
              if (H === void 0) {
                j(x - 1, !0);
                break;
              }
              if (
                ((w += H),
                (K === 0 && w <= l.value) ||
                  (x === K - 1 && w + k(K) <= l.value))
              ) {
                j(K), (m.value = null);
                break;
              } else if (w + y.value > l.value) {
                j(x - 1), (m.value = w - H - c.value + d.value);
                break;
              }
            }
            e.suffix && k(0) + c.value > l.value && (m.value = null);
          }
        }),
        () => {
          const w = g.value && !!T.value.length,
            {
              itemComponent: R,
              renderRawItem: K,
              renderRawRest: x,
              renderRest: H,
              prefixCls: F = 'rc-overflow',
              suffix: N,
              component: U = 'div',
              id: ne,
              onMousedown: fe
            } = e,
            { class: ce, style: E } = n,
            W = Wd(n, ['class', 'style']);
          let Z = {};
          m.value !== null &&
            $.value &&
            (Z = { position: 'absolute', left: `${m.value}px`, top: 0 });
          const Q = {
              prefixCls: b.value,
              responsive: $.value,
              component: R,
              invalidate: O.value
            },
            ae = K
              ? (ue, pe) => {
                  const Le = P(ue, pe);
                  return h(
                    Gn,
                    {
                      key: Le,
                      value: f(f({}, Q), {
                        order: pe,
                        item: ue,
                        itemKey: Le,
                        registerSize: A,
                        display: pe <= v.value
                      })
                    },
                    { default: () => [K(ue, pe)] }
                  );
                }
              : (ue, pe) => {
                  const Le = P(ue, pe);
                  return h(
                    Ut,
                    D(
                      D({}, Q),
                      {},
                      {
                        order: pe,
                        key: Le,
                        item: ue,
                        renderItem: M.value,
                        itemKey: Le,
                        registerSize: A,
                        display: pe <= v.value
                      }
                    ),
                    null
                  );
                };
          let se = () => null;
          const oe = {
            order: w ? v.value : Number.MAX_SAFE_INTEGER,
            className: `${b.value} ${b.value}-rest`,
            registerSize: q,
            display: w
          };
          if (x)
            x &&
              (se = () =>
                h(
                  Gn,
                  { value: f(f({}, Q), oe) },
                  { default: () => [x(T.value)] }
                ));
          else {
            const ue = H || Vd;
            se = () =>
              h(Ut, D(D({}, Q), oe), {
                default: () => (typeof ue == 'function' ? ue(T.value) : ue)
              });
          }
          const xe = () => {
            var ue;
            return h(
              U,
              D(
                {
                  id: ne,
                  class: ie(!O.value && F, ce),
                  style: E,
                  onMousedown: fe
                },
                W
              ),
              {
                default: () => [
                  I.value.map(ae),
                  z.value ? se() : null,
                  N &&
                    h(
                      Ut,
                      D(
                        D({}, Q),
                        {},
                        {
                          order: v.value,
                          class: `${b.value}-suffix`,
                          registerSize: X,
                          display: !0,
                          style: Z
                        }
                      ),
                      { default: () => N }
                    ),
                  (ue = r.default) === null || ue === void 0
                    ? void 0
                    : ue.call(r)
                ]
              }
            );
          };
          return h(oo, { disabled: !$.value, onResize: C }, { default: xe });
        }
      );
    }
  });
mn.Item = jd;
mn.RESPONSIVE = Ji;
mn.INVALIDATE = ea;
const Ct = mn,
  pv = () => {
    if (typeof navigator > 'u' || typeof window > 'u') return !1;
    const e = navigator.userAgent || navigator.vendor || window.opera;
    return (
      /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(
        e
      ) ||
      /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw-(n|u)|c55\/|capi|ccwa|cdm-|cell|chtm|cldc|cmd-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc-s|devi|dica|dmob|do(c|p)o|ds(12|-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(-|_)|g1 u|g560|gene|gf-5|g-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd-(m|p|t)|hei-|hi(pt|ta)|hp( i|ip)|hs-c|ht(c(-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i-(20|go|ma)|i230|iac( |-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|-[a-w])|libw|lynx|m1-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|-([1-8]|c))|phil|pire|pl(ay|uc)|pn-2|po(ck|rt|se)|prox|psio|pt-g|qa-a|qc(07|12|21|32|60|-[2-7]|i-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h-|oo|p-)|sdk\/|se(c(-|0|1)|47|mc|nd|ri)|sgh-|shar|sie(-|m)|sk-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h-|v-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl-|tdg-|tel(i|m)|tim-|t-mo|to(pl|sh)|ts(70|m-|m3|m5)|tx-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas-|your|zeto|zte-/i.test(
        e == null ? void 0 : e.substr(0, 4)
      )
    );
  };
function mv(e, t) {
  const { defaultValue: n, value: o = G() } = t || {};
  let r = typeof e == 'function' ? e() : e;
  o.value !== void 0 && (r = yt(o)),
    n !== void 0 && (r = typeof n == 'function' ? n() : n);
  const i = G(r),
    a = G(r);
  Te(() => {
    let s = o.value !== void 0 ? o.value : i.value;
    t.postState && (s = t.postState(s)), (a.value = s);
  });
  function l(s) {
    const u = a.value;
    (i.value = s), Bn(a.value) !== s && t.onChange && t.onChange(s, u);
  }
  return (
    ee(o, () => {
      i.value = o.value;
    }),
    [a, l]
  );
}
function Ve(e) {
  const t = typeof e == 'function' ? e() : e,
    n = G(t);
  function o(r) {
    n.value = r;
  }
  return [n, o];
}
function Tr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(r) {
          return Object.getOwnPropertyDescriptor(n, r).enumerable;
        })
      )),
      o.forEach(function(r) {
        Ud(e, r, n[r]);
      });
  }
  return e;
}
function Ud(e, t, n) {
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
  var o = Tr({}, t, n.attrs);
  return h(Mt, Tr({}, o, { icon: ul }), null);
};
vo.displayName = 'CheckOutlined';
vo.inheritAttrs = !1;
const vv = vo;
function go(e) {
  const t = Symbol('contextKey');
  return {
    useProvide: (r, i) => {
      const a = to({});
      return (
        Ce(t, a),
        Te(() => {
          f(a, r, i || {});
        }),
        a
      );
    },
    useInject: () => he(t, e) || {}
  };
}
const Ir = Symbol('ContextProps'),
  Pr = Symbol('InternalContextProps'),
  _r = {
    id: S(() => {}),
    onFieldBlur: () => {},
    onFieldChange: () => {},
    clearValidate: () => {}
  },
  Ar = { addFormItemField: () => {}, removeFormItemField: () => {} },
  Gd = () => {
    const e = he(Pr, Ar),
      t = Symbol('FormItemFieldKey'),
      n = He();
    return (
      e.addFormItemField(t, n.type),
      we(() => {
        e.removeFormItemField(t);
      }),
      Ce(Pr, Ar),
      Ce(Ir, _r),
      he(Ir, _r)
    );
  },
  ho = go({}),
  gv = Y({
    name: 'NoFormStatus',
    setup(e, t) {
      let { slots: n } = t;
      return (
        ho.useProvide({}),
        () => {
          var o;
          return (o = n.default) === null || o === void 0 ? void 0 : o.call(n);
        }
      );
    }
  });
function ta(e, t, n) {
  return ie({
    [`${e}-status-success`]: t === 'success',
    [`${e}-status-warning`]: t === 'warning',
    [`${e}-status-error`]: t === 'error',
    [`${e}-status-validating`]: t === 'validating',
    [`${e}-has-feedback`]: n
  });
}
const na = (e, t) => t || e,
  Xd = e => {
    const { componentCls: t } = e;
    return {
      [t]: {
        display: 'inline-flex',
        '&-block': { display: 'flex', width: '100%' },
        '&-vertical': { flexDirection: 'column' }
      }
    };
  },
  Yd = Xd,
  qd = e => {
    const { componentCls: t } = e;
    return {
      [t]: {
        display: 'inline-flex',
        '&-rtl': { direction: 'rtl' },
        '&-vertical': { flexDirection: 'column' },
        '&-align': {
          flexDirection: 'column',
          '&-center': { alignItems: 'center' },
          '&-start': { alignItems: 'flex-start' },
          '&-end': { alignItems: 'flex-end' },
          '&-baseline': { alignItems: 'baseline' }
        },
        [`${t}-space-item`]: { '&:empty': { display: 'none' } }
      }
    };
  },
  oa = ft('Space', e => [qd(e), Yd(e)]);
var Zd = '[object Symbol]';
function hv(e) {
  return typeof e == 'symbol' || (ut(e) && mt(e) == Zd);
}
function kd() {}
function Qd(e, t, n, o) {
  for (var r = e.length, i = n + (o ? 1 : -1); o ? i-- : ++i < r; )
    if (t(e[i], i, e)) return i;
  return -1;
}
function Jd(e) {
  return e !== e;
}
function ef(e, t, n) {
  for (var o = n - 1, r = e.length; ++o < r; ) if (e[o] === t) return o;
  return -1;
}
function tf(e, t, n) {
  return t === t ? ef(e, t, n) : Qd(e, Jd, n);
}
function nf(e, t) {
  var n = e == null ? 0 : e.length;
  return !!n && tf(e, t, 0) > -1;
}
function of(e, t, n) {
  for (var o = -1, r = e == null ? 0 : e.length; ++o < r; )
    if (n(t, e[o])) return !0;
  return !1;
}
var rf = '[object Map]',
  af = '[object Set]',
  lf = Object.prototype,
  sf = lf.hasOwnProperty;
function ra(e) {
  if (e == null) return !0;
  if (
    qi(e) &&
    (_t(e) ||
      typeof e == 'string' ||
      typeof e.splice == 'function' ||
      Jt(e) ||
      po(e) ||
      Vi(e))
  )
    return !e.length;
  var t = Un(e);
  if (t == rf || t == af) return !e.size;
  if (Xi(e)) return !Yi(e).length;
  for (var n in e) if (sf.call(e, n)) return !1;
  return !0;
}
var uf = 1 / 0,
  cf =
    nt && 1 / fo(new nt([, -0]))[1] == uf
      ? function(e) {
          return new nt(e);
        }
      : kd;
const df = cf;
var ff = 200;
function pf(e, t, n) {
  var o = -1,
    r = nf,
    i = e.length,
    a = !0,
    l = [],
    s = l;
  if (n) (a = !1), (r = of);
  else if (i >= ff) {
    var u = t ? null : df(e);
    if (u) return fo(u);
    (a = !1), (r = Fi), (s = new Pt());
  } else s = t ? [] : l;
  e: for (; ++o < i; ) {
    var d = e[o],
      c = t ? t(d) : d;
    if (((d = n || d !== 0 ? d : 0), a && c === c)) {
      for (var m = s.length; m--; ) if (s[m] === c) continue e;
      t && s.push(c), l.push(d);
    } else r(s, c, n) || (s !== l && s.push(c), l.push(d));
  }
  return l;
}
function In(e) {
  return e && e.length ? pf(e) : [];
}
const mf = () => ({
    compactSize: String,
    compactDirection: _.oneOf(rt('horizontal', 'vertical')).def('horizontal'),
    isFirstItem: Xt(),
    isLastItem: Xt()
  }),
  vn = go(null),
  vf = (e, t) => {
    const n = vn.useInject(),
      o = S(() => {
        if (!n || ra(n)) return '';
        const { compactDirection: r, isFirstItem: i, isLastItem: a } = n,
          l = r === 'vertical' ? '-vertical-' : '-';
        return ie({
          [`${e.value}-compact${l}item`]: !0,
          [`${e.value}-compact${l}first-item`]: i,
          [`${e.value}-compact${l}last-item`]: a,
          [`${e.value}-compact${l}item-rtl`]: t.value === 'rtl'
        });
      });
    return {
      compactSize: S(() => (n == null ? void 0 : n.compactSize)),
      compactDirection: S(() => (n == null ? void 0 : n.compactDirection)),
      compactItemClassnames: o
    };
  },
  bv = Y({
    name: 'NoCompactStyle',
    setup(e, t) {
      let { slots: n } = t;
      return (
        vn.useProvide(null),
        () => {
          var o;
          return (o = n.default) === null || o === void 0 ? void 0 : o.call(n);
        }
      );
    }
  }),
  gf = () => ({
    prefixCls: String,
    size: { type: String },
    direction: _.oneOf(rt('horizontal', 'vertical')).def('horizontal'),
    align: _.oneOf(rt('start', 'end', 'center', 'baseline')),
    block: { type: Boolean, default: void 0 }
  }),
  hf = Y({
    name: 'CompactItem',
    props: mf(),
    setup(e, t) {
      let { slots: n } = t;
      return (
        vn.useProvide(e),
        () => {
          var o;
          return (o = n.default) === null || o === void 0 ? void 0 : o.call(n);
        }
      );
    }
  }),
  Xn = Y({
    name: 'ASpaceCompact',
    inheritAttrs: !1,
    props: gf(),
    setup(e, t) {
      let { attrs: n, slots: o } = t;
      const { prefixCls: r, direction: i } = ze('space-compact', e),
        a = vn.useInject(),
        [l, s] = oa(r),
        u = S(() =>
          ie(r.value, s.value, {
            [`${r.value}-rtl`]: i.value === 'rtl',
            [`${r.value}-block`]: e.block,
            [`${r.value}-vertical`]: e.direction === 'vertical'
          })
        );
      return () => {
        var d;
        const c = Xe(
          ((d = o.default) === null || d === void 0 ? void 0 : d.call(o)) || []
        );
        return c.length === 0
          ? null
          : l(
              h('div', D(D({}, n), {}, { class: [u.value, n.class] }), [
                c.map((m, p) => {
                  var v;
                  const g = (m && m.key) || `${r.value}-item-${p}`,
                    b = !a || ra(a);
                  return h(
                    hf,
                    {
                      key: g,
                      compactSize:
                        (v = e.size) !== null && v !== void 0 ? v : 'middle',
                      compactDirection: e.direction,
                      isFirstItem:
                        p === 0 && (b || (a == null ? void 0 : a.isFirstItem)),
                      isLastItem:
                        p === c.length - 1 &&
                        (b || (a == null ? void 0 : a.isLastItem))
                    },
                    { default: () => [m] }
                  );
                })
              ])
            );
      };
    }
  }),
  bf = e => ({ animationDuration: e, animationFillMode: 'both' }),
  yf = e => ({ animationDuration: e, animationFillMode: 'both' }),
  ia = function(e, t, n, o) {
    const i = (arguments.length > 4 && arguments[4] !== void 0
    ? arguments[4]
    : !1)
      ? '&'
      : '';
    return {
      [`
      ${i}${e}-enter,
      ${i}${e}-appear
    `]: f(f({}, bf(o)), { animationPlayState: 'paused' }),
      [`${i}${e}-leave`]: f(f({}, yf(o)), { animationPlayState: 'paused' }),
      [`
      ${i}${e}-enter${e}-enter-active,
      ${i}${e}-appear${e}-appear-active
    `]: { animationName: t, animationPlayState: 'running' },
      [`${i}${e}-leave${e}-leave-active`]: {
        animationName: n,
        animationPlayState: 'running',
        pointerEvents: 'none'
      }
    };
  },
  $f = new le('antSlideUpIn', {
    '0%': { transform: 'scaleY(0.8)', transformOrigin: '0% 0%', opacity: 0 },
    '100%': { transform: 'scaleY(1)', transformOrigin: '0% 0%', opacity: 1 }
  }),
  wf = new le('antSlideUpOut', {
    '0%': { transform: 'scaleY(1)', transformOrigin: '0% 0%', opacity: 1 },
    '100%': { transform: 'scaleY(0.8)', transformOrigin: '0% 0%', opacity: 0 }
  }),
  Sf = new le('antSlideDownIn', {
    '0%': {
      transform: 'scaleY(0.8)',
      transformOrigin: '100% 100%',
      opacity: 0
    },
    '100%': { transform: 'scaleY(1)', transformOrigin: '100% 100%', opacity: 1 }
  }),
  Cf = new le('antSlideDownOut', {
    '0%': { transform: 'scaleY(1)', transformOrigin: '100% 100%', opacity: 1 },
    '100%': {
      transform: 'scaleY(0.8)',
      transformOrigin: '100% 100%',
      opacity: 0
    }
  }),
  xf = new le('antSlideLeftIn', {
    '0%': { transform: 'scaleX(0.8)', transformOrigin: '0% 0%', opacity: 0 },
    '100%': { transform: 'scaleX(1)', transformOrigin: '0% 0%', opacity: 1 }
  }),
  Of = new le('antSlideLeftOut', {
    '0%': { transform: 'scaleX(1)', transformOrigin: '0% 0%', opacity: 1 },
    '100%': { transform: 'scaleX(0.8)', transformOrigin: '0% 0%', opacity: 0 }
  }),
  Ef = new le('antSlideRightIn', {
    '0%': { transform: 'scaleX(0.8)', transformOrigin: '100% 0%', opacity: 0 },
    '100%': { transform: 'scaleX(1)', transformOrigin: '100% 0%', opacity: 1 }
  }),
  Tf = new le('antSlideRightOut', {
    '0%': { transform: 'scaleX(1)', transformOrigin: '100% 0%', opacity: 1 },
    '100%': { transform: 'scaleX(0.8)', transformOrigin: '100% 0%', opacity: 0 }
  }),
  If = {
    'slide-up': { inKeyframes: $f, outKeyframes: wf },
    'slide-down': { inKeyframes: Sf, outKeyframes: Cf },
    'slide-left': { inKeyframes: xf, outKeyframes: Of },
    'slide-right': { inKeyframes: Ef, outKeyframes: Tf }
  },
  Mr = (e, t) => {
    const { antCls: n } = e,
      o = `${n}-${t}`,
      { inKeyframes: r, outKeyframes: i } = If[t];
    return [
      ia(o, r, i, e.motionDurationMid),
      {
        [`
      ${o}-enter,
      ${o}-appear
    `]: {
          transform: 'scale(0)',
          transformOrigin: '0% 0%',
          opacity: 0,
          animationTimingFunction: e.motionEaseOutQuint
        },
        [`${o}-leave`]: { animationTimingFunction: e.motionEaseInQuint }
      }
    ];
  },
  Pf = new le('antZoomIn', {
    '0%': { transform: 'scale(0.2)', opacity: 0 },
    '100%': { transform: 'scale(1)', opacity: 1 }
  }),
  _f = new le('antZoomOut', {
    '0%': { transform: 'scale(1)' },
    '100%': { transform: 'scale(0.2)', opacity: 0 }
  }),
  Rr = new le('antZoomBigIn', {
    '0%': { transform: 'scale(0.8)', opacity: 0 },
    '100%': { transform: 'scale(1)', opacity: 1 }
  }),
  Dr = new le('antZoomBigOut', {
    '0%': { transform: 'scale(1)' },
    '100%': { transform: 'scale(0.8)', opacity: 0 }
  }),
  Af = new le('antZoomUpIn', {
    '0%': { transform: 'scale(0.8)', transformOrigin: '50% 0%', opacity: 0 },
    '100%': { transform: 'scale(1)', transformOrigin: '50% 0%' }
  }),
  Mf = new le('antZoomUpOut', {
    '0%': { transform: 'scale(1)', transformOrigin: '50% 0%' },
    '100%': { transform: 'scale(0.8)', transformOrigin: '50% 0%', opacity: 0 }
  }),
  Rf = new le('antZoomLeftIn', {
    '0%': { transform: 'scale(0.8)', transformOrigin: '0% 50%', opacity: 0 },
    '100%': { transform: 'scale(1)', transformOrigin: '0% 50%' }
  }),
  Df = new le('antZoomLeftOut', {
    '0%': { transform: 'scale(1)', transformOrigin: '0% 50%' },
    '100%': { transform: 'scale(0.8)', transformOrigin: '0% 50%', opacity: 0 }
  }),
  Nf = new le('antZoomRightIn', {
    '0%': { transform: 'scale(0.8)', transformOrigin: '100% 50%', opacity: 0 },
    '100%': { transform: 'scale(1)', transformOrigin: '100% 50%' }
  }),
  Bf = new le('antZoomRightOut', {
    '0%': { transform: 'scale(1)', transformOrigin: '100% 50%' },
    '100%': { transform: 'scale(0.8)', transformOrigin: '100% 50%', opacity: 0 }
  }),
  zf = new le('antZoomDownIn', {
    '0%': { transform: 'scale(0.8)', transformOrigin: '50% 100%', opacity: 0 },
    '100%': { transform: 'scale(1)', transformOrigin: '50% 100%' }
  }),
  Hf = new le('antZoomDownOut', {
    '0%': { transform: 'scale(1)', transformOrigin: '50% 100%' },
    '100%': { transform: 'scale(0.8)', transformOrigin: '50% 100%', opacity: 0 }
  }),
  Lf = {
    zoom: { inKeyframes: Pf, outKeyframes: _f },
    'zoom-big': { inKeyframes: Rr, outKeyframes: Dr },
    'zoom-big-fast': { inKeyframes: Rr, outKeyframes: Dr },
    'zoom-left': { inKeyframes: Rf, outKeyframes: Df },
    'zoom-right': { inKeyframes: Nf, outKeyframes: Bf },
    'zoom-up': { inKeyframes: Af, outKeyframes: Mf },
    'zoom-down': { inKeyframes: zf, outKeyframes: Hf }
  },
  aa = (e, t) => {
    const { antCls: n } = e,
      o = `${n}-${t}`,
      { inKeyframes: r, outKeyframes: i } = Lf[t];
    return [
      ia(
        o,
        r,
        i,
        t === 'zoom-big-fast' ? e.motionDurationFast : e.motionDurationMid
      ),
      {
        [`
        ${o}-enter,
        ${o}-appear
      `]: {
          transform: 'scale(0)',
          opacity: 0,
          animationTimingFunction: e.motionEaseOutCirc,
          '&-prepare': { transform: 'none' }
        },
        [`${o}-leave`]: { animationTimingFunction: e.motionEaseInOutCirc }
      }
    ];
  },
  Ff = e => ({
    [e.componentCls]: {
      [`${e.antCls}-motion-collapse-legacy`]: {
        overflow: 'hidden',
        '&-active': {
          transition: `height ${e.motionDurationMid} ${e.motionEaseInOut},
        opacity ${e.motionDurationMid} ${e.motionEaseInOut} !important`
        }
      },
      [`${e.antCls}-motion-collapse`]: {
        overflow: 'hidden',
        transition: `height ${e.motionDurationMid} ${e.motionEaseInOut},
        opacity ${e.motionDurationMid} ${e.motionEaseInOut} !important`
      }
    }
  }),
  jf = Ff;
function Wf(e, t, n) {
  const { focusElCls: o, focus: r, borderElCls: i } = n,
    a = i ? '> *' : '',
    l = ['hover', r ? 'focus' : null, 'active']
      .filter(Boolean)
      .map(s => `&:${s} ${a}`)
      .join(',');
  return {
    [`&-item:not(${t}-last-item)`]: { marginInlineEnd: -e.lineWidth },
    '&-item': f(
      f({ [l]: { zIndex: 2 } }, o ? { [`&${o}`]: { zIndex: 2 } } : {}),
      { [`&[disabled] ${a}`]: { zIndex: 0 } }
    )
  };
}
function Vf(e, t, n) {
  const { borderElCls: o } = n,
    r = o ? `> ${o}` : '';
  return {
    [`&-item:not(${t}-first-item):not(${t}-last-item) ${r}`]: {
      borderRadius: 0
    },
    [`&-item:not(${t}-last-item)${t}-first-item`]: {
      [`& ${r}, &${e}-sm ${r}, &${e}-lg ${r}`]: {
        borderStartEndRadius: 0,
        borderEndEndRadius: 0
      }
    },
    [`&-item:not(${t}-first-item)${t}-last-item`]: {
      [`& ${r}, &${e}-sm ${r}, &${e}-lg ${r}`]: {
        borderStartStartRadius: 0,
        borderEndStartRadius: 0
      }
    }
  };
}
function la(e) {
  let t =
    arguments.length > 1 && arguments[1] !== void 0
      ? arguments[1]
      : { focus: !0 };
  const { componentCls: n } = e,
    o = `${n}-compact`;
  return { [o]: f(f({}, Wf(e, o, t)), Vf(n, o, t)) };
}
const me = { adjustX: 1, adjustY: 1 },
  ve = [0, 0],
  sa = {
    left: {
      points: ['cr', 'cl'],
      overflow: me,
      offset: [-4, 0],
      targetOffset: ve
    },
    right: {
      points: ['cl', 'cr'],
      overflow: me,
      offset: [4, 0],
      targetOffset: ve
    },
    top: {
      points: ['bc', 'tc'],
      overflow: me,
      offset: [0, -4],
      targetOffset: ve
    },
    bottom: {
      points: ['tc', 'bc'],
      overflow: me,
      offset: [0, 4],
      targetOffset: ve
    },
    topLeft: {
      points: ['bl', 'tl'],
      overflow: me,
      offset: [0, -4],
      targetOffset: ve
    },
    leftTop: {
      points: ['tr', 'tl'],
      overflow: me,
      offset: [-4, 0],
      targetOffset: ve
    },
    topRight: {
      points: ['br', 'tr'],
      overflow: me,
      offset: [0, -4],
      targetOffset: ve
    },
    rightTop: {
      points: ['tl', 'tr'],
      overflow: me,
      offset: [4, 0],
      targetOffset: ve
    },
    bottomRight: {
      points: ['tr', 'br'],
      overflow: me,
      offset: [0, 4],
      targetOffset: ve
    },
    rightBottom: {
      points: ['bl', 'br'],
      overflow: me,
      offset: [4, 0],
      targetOffset: ve
    },
    bottomLeft: {
      points: ['tl', 'bl'],
      overflow: me,
      offset: [0, 4],
      targetOffset: ve
    },
    leftBottom: {
      points: ['br', 'bl'],
      overflow: me,
      offset: [-4, 0],
      targetOffset: ve
    }
  },
  Kf = { prefixCls: String, id: String, overlayInnerStyle: _.any },
  Uf = Y({
    compatConfig: { MODE: 3 },
    name: 'TooltipContent',
    props: Kf,
    setup(e, t) {
      let { slots: n } = t;
      return () => {
        var o;
        return h(
          'div',
          {
            class: `${e.prefixCls}-inner`,
            id: e.id,
            role: 'tooltip',
            style: e.overlayInnerStyle
          },
          [(o = n.overlay) === null || o === void 0 ? void 0 : o.call(n)]
        );
      };
    }
  });
var Gf =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var r = 0, o = Object.getOwnPropertySymbols(e); r < o.length; r++)
        t.indexOf(o[r]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[r]) &&
          (n[o[r]] = e[o[r]]);
    return n;
  };
function Nr() {}
const Xf = Y({
    compatConfig: { MODE: 3 },
    name: 'Tooltip',
    inheritAttrs: !1,
    props: {
      trigger: _.any.def(['hover']),
      defaultVisible: { type: Boolean, default: void 0 },
      visible: { type: Boolean, default: void 0 },
      placement: _.string.def('right'),
      transitionName: String,
      animation: _.any,
      afterVisibleChange: _.func.def(() => {}),
      overlayStyle: { type: Object, default: void 0 },
      overlayClassName: String,
      prefixCls: _.string.def('rc-tooltip'),
      mouseEnterDelay: _.number.def(0.1),
      mouseLeaveDelay: _.number.def(0.1),
      getPopupContainer: Function,
      destroyTooltipOnHide: { type: Boolean, default: !1 },
      align: _.object.def(() => ({})),
      arrowContent: _.any.def(null),
      tipId: String,
      builtinPlacements: _.object,
      overlayInnerStyle: { type: Object, default: void 0 },
      popupVisible: { type: Boolean, default: void 0 },
      onVisibleChange: Function,
      onPopupAlign: Function
    },
    setup(e, t) {
      let { slots: n, attrs: o, expose: r } = t;
      const i = B(),
        a = () => {
          const { prefixCls: d, tipId: c, overlayInnerStyle: m } = e;
          return [
            h('div', { class: `${d}-arrow`, key: 'arrow' }, [
              Jn(n, e, 'arrowContent')
            ]),
            h(
              Uf,
              { key: 'content', prefixCls: d, id: c, overlayInnerStyle: m },
              { overlay: n.overlay }
            )
          ];
        };
      r({
        getPopupDomNode: () => i.value.getPopupDomNode(),
        triggerDOM: i,
        forcePopupAlign: () => {
          var d;
          return (d = i.value) === null || d === void 0
            ? void 0
            : d.forcePopupAlign();
        }
      });
      const s = B(!1),
        u = B(!1);
      return (
        Te(() => {
          const { destroyTooltipOnHide: d } = e;
          if (typeof d == 'boolean') s.value = d;
          else if (d && typeof d == 'object') {
            const { keepParent: c } = d;
            (s.value = c === !0), (u.value = c === !1);
          }
        }),
        () => {
          const {
              overlayClassName: d,
              trigger: c,
              mouseEnterDelay: m,
              mouseLeaveDelay: p,
              overlayStyle: v,
              prefixCls: g,
              afterVisibleChange: b,
              transitionName: y,
              animation: $,
              placement: O,
              align: z,
              destroyTooltipOnHide: I,
              defaultVisible: T
            } = e,
            P = Gf(e, [
              'overlayClassName',
              'trigger',
              'mouseEnterDelay',
              'mouseLeaveDelay',
              'overlayStyle',
              'prefixCls',
              'afterVisibleChange',
              'transitionName',
              'animation',
              'placement',
              'align',
              'destroyTooltipOnHide',
              'defaultVisible'
            ]),
            M = f({}, P);
          e.visible !== void 0 && (M.popupVisible = e.visible);
          const j = f(
            f(
              f(
                {
                  popupClassName: d,
                  prefixCls: g,
                  action: c,
                  builtinPlacements: sa,
                  popupPlacement: O,
                  popupAlign: z,
                  afterPopupVisibleChange: b,
                  popupTransitionName: y,
                  popupAnimation: $,
                  defaultPopupVisible: T,
                  destroyPopupOnHide: s.value,
                  autoDestroy: u.value,
                  mouseLeaveDelay: p,
                  popupStyle: v,
                  mouseEnterDelay: m
                },
                M
              ),
              o
            ),
            {
              onPopupVisibleChange: e.onVisibleChange || Nr,
              onPopupAlign: e.onPopupAlign || Nr,
              ref: i,
              popup: a()
            }
          );
          return h(mo, j, { default: n.default });
        }
      );
    }
  }),
  Yf = () => ({
    trigger: [String, Array],
    open: { type: Boolean, default: void 0 },
    visible: { type: Boolean, default: void 0 },
    placement: String,
    color: String,
    transitionName: String,
    overlayStyle: De(),
    overlayInnerStyle: De(),
    overlayClassName: String,
    openClassName: String,
    prefixCls: String,
    mouseEnterDelay: Number,
    mouseLeaveDelay: Number,
    getPopupContainer: Function,
    arrowPointAtCenter: { type: Boolean, default: void 0 },
    autoAdjustOverflow: { type: [Boolean, Object], default: void 0 },
    destroyTooltipOnHide: { type: Boolean, default: void 0 },
    align: De(),
    builtinPlacements: De(),
    children: Array,
    onVisibleChange: Function,
    'onUpdate:visible': Function,
    onOpenChange: Function,
    'onUpdate:open': Function
  }),
  qf = { adjustX: 1, adjustY: 1 },
  Br = { adjustX: 0, adjustY: 0 },
  Zf = [0, 0];
function zr(e) {
  return typeof e == 'boolean' ? (e ? qf : Br) : f(f({}, Br), e);
}
function kf(e) {
  const {
      arrowWidth: t = 4,
      horizontalArrowShift: n = 16,
      verticalArrowShift: o = 8,
      autoAdjustOverflow: r,
      arrowPointAtCenter: i
    } = e,
    a = {
      left: { points: ['cr', 'cl'], offset: [-4, 0] },
      right: { points: ['cl', 'cr'], offset: [4, 0] },
      top: { points: ['bc', 'tc'], offset: [0, -4] },
      bottom: { points: ['tc', 'bc'], offset: [0, 4] },
      topLeft: { points: ['bl', 'tc'], offset: [-(n + t), -4] },
      leftTop: { points: ['tr', 'cl'], offset: [-4, -(o + t)] },
      topRight: { points: ['br', 'tc'], offset: [n + t, -4] },
      rightTop: { points: ['tl', 'cr'], offset: [4, -(o + t)] },
      bottomRight: { points: ['tr', 'bc'], offset: [n + t, 4] },
      rightBottom: { points: ['bl', 'cr'], offset: [4, o + t] },
      bottomLeft: { points: ['tl', 'bc'], offset: [-(n + t), 4] },
      leftBottom: { points: ['br', 'cl'], offset: [-4, o + t] }
    };
  return (
    Object.keys(a).forEach(l => {
      (a[l] = i
        ? f(f({}, a[l]), { overflow: zr(r), targetOffset: Zf })
        : f(f({}, sa[l]), { overflow: zr(r) })),
        (a[l].ignoreShake = !0);
    }),
    a
  );
}
function Qf() {
  let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : [];
  for (let t = 0, n = e.length; t < n; t++) if (e[t] !== void 0) return e[t];
}
const Jf = kt.map(e => `${e}-inverse`),
  ep = ['success', 'processing', 'error', 'default', 'warning'];
function tp(e) {
  return (arguments.length > 1 && arguments[1] !== void 0
  ? arguments[1]
  : !0)
    ? [...Jf, ...kt].includes(e)
    : kt.includes(e);
}
function yv(e) {
  return ep.includes(e);
}
function np(e, t) {
  const n = tp(t),
    o = ie({ [`${e}-${t}`]: t && n }),
    r = {},
    i = {};
  return (
    t && !n && ((r.background = t), (i['--antd-arrow-background-color'] = t)),
    { className: o, overlayStyle: r, arrowStyle: i }
  );
}
function Ft(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : '';
  return e.map(n => `${t}${n}`).join(',');
}
const ua = 8;
function op(e) {
  const t = ua,
    {
      sizePopupArrow: n,
      contentRadius: o,
      borderRadiusOuter: r,
      limitVerticalRadius: i
    } = e,
    a = n / 2 - Math.ceil(r * (Math.sqrt(2) - 1)),
    l = (o > 12 ? o + 2 : 12) - a,
    s = i ? t - a : l;
  return { dropdownArrowOffset: l, dropdownArrowOffsetVertical: s };
}
function rp(e, t) {
  const {
      componentCls: n,
      sizePopupArrow: o,
      marginXXS: r,
      borderRadiusXS: i,
      borderRadiusOuter: a,
      boxShadowPopoverArrow: l
    } = e,
    {
      colorBg: s,
      showArrowCls: u,
      contentRadius: d = e.borderRadiusLG,
      limitVerticalRadius: c
    } = t,
    { dropdownArrowOffsetVertical: m, dropdownArrowOffset: p } = op({
      sizePopupArrow: o,
      contentRadius: d,
      borderRadiusOuter: a,
      limitVerticalRadius: c
    }),
    v = o / 2 + r;
  return {
    [n]: {
      [`${n}-arrow`]: [
        f(
          f(
            { position: 'absolute', zIndex: 1, display: 'block' },
            Al(o, i, a, s, l)
          ),
          { '&:before': { background: s } }
        )
      ],
      [[
        `&-placement-top ${n}-arrow`,
        `&-placement-topLeft ${n}-arrow`,
        `&-placement-topRight ${n}-arrow`
      ].join(',')]: { bottom: 0, transform: 'translateY(100%) rotate(180deg)' },
      [`&-placement-top ${n}-arrow`]: {
        left: { _skip_check_: !0, value: '50%' },
        transform: 'translateX(-50%) translateY(100%) rotate(180deg)'
      },
      [`&-placement-topLeft ${n}-arrow`]: {
        left: { _skip_check_: !0, value: p }
      },
      [`&-placement-topRight ${n}-arrow`]: {
        right: { _skip_check_: !0, value: p }
      },
      [[
        `&-placement-bottom ${n}-arrow`,
        `&-placement-bottomLeft ${n}-arrow`,
        `&-placement-bottomRight ${n}-arrow`
      ].join(',')]: { top: 0, transform: 'translateY(-100%)' },
      [`&-placement-bottom ${n}-arrow`]: {
        left: { _skip_check_: !0, value: '50%' },
        transform: 'translateX(-50%) translateY(-100%)'
      },
      [`&-placement-bottomLeft ${n}-arrow`]: {
        left: { _skip_check_: !0, value: p }
      },
      [`&-placement-bottomRight ${n}-arrow`]: {
        right: { _skip_check_: !0, value: p }
      },
      [[
        `&-placement-left ${n}-arrow`,
        `&-placement-leftTop ${n}-arrow`,
        `&-placement-leftBottom ${n}-arrow`
      ].join(',')]: {
        right: { _skip_check_: !0, value: 0 },
        transform: 'translateX(100%) rotate(90deg)'
      },
      [`&-placement-left ${n}-arrow`]: {
        top: { _skip_check_: !0, value: '50%' },
        transform: 'translateY(-50%) translateX(100%) rotate(90deg)'
      },
      [`&-placement-leftTop ${n}-arrow`]: { top: m },
      [`&-placement-leftBottom ${n}-arrow`]: { bottom: m },
      [[
        `&-placement-right ${n}-arrow`,
        `&-placement-rightTop ${n}-arrow`,
        `&-placement-rightBottom ${n}-arrow`
      ].join(',')]: {
        left: { _skip_check_: !0, value: 0 },
        transform: 'translateX(-100%) rotate(-90deg)'
      },
      [`&-placement-right ${n}-arrow`]: {
        top: { _skip_check_: !0, value: '50%' },
        transform: 'translateY(-50%) translateX(-100%) rotate(-90deg)'
      },
      [`&-placement-rightTop ${n}-arrow`]: { top: m },
      [`&-placement-rightBottom ${n}-arrow`]: { bottom: m },
      [Ft(
        ['&-placement-topLeft', '&-placement-top', '&-placement-topRight'],
        u
      )]: { paddingBottom: v },
      [Ft(
        [
          '&-placement-bottomLeft',
          '&-placement-bottom',
          '&-placement-bottomRight'
        ],
        u
      )]: { paddingTop: v },
      [Ft(
        ['&-placement-leftTop', '&-placement-left', '&-placement-leftBottom'],
        u
      )]: { paddingRight: { _skip_check_: !0, value: v } },
      [Ft(
        [
          '&-placement-rightTop',
          '&-placement-right',
          '&-placement-rightBottom'
        ],
        u
      )]: { paddingLeft: { _skip_check_: !0, value: v } }
    }
  };
}
const ip = e => {
    const {
      componentCls: t,
      tooltipMaxWidth: n,
      tooltipColor: o,
      tooltipBg: r,
      tooltipBorderRadius: i,
      zIndexPopup: a,
      controlHeight: l,
      boxShadowSecondary: s,
      paddingSM: u,
      paddingXS: d,
      tooltipRadiusOuter: c
    } = e;
    return [
      {
        [t]: f(
          f(
            f(f({}, an(e)), {
              position: 'absolute',
              zIndex: a,
              display: 'block',
              '&': [{ width: 'max-content' }, { width: 'intrinsic' }],
              maxWidth: n,
              visibility: 'visible',
              '&-hidden': { display: 'none' },
              '--antd-arrow-background-color': r,
              [`${t}-inner`]: {
                minWidth: l,
                minHeight: l,
                padding: `${u / 2}px ${d}px`,
                color: o,
                textAlign: 'start',
                textDecoration: 'none',
                wordWrap: 'break-word',
                backgroundColor: r,
                borderRadius: i,
                boxShadow: s
              },
              [[
                '&-placement-left',
                '&-placement-leftTop',
                '&-placement-leftBottom',
                '&-placement-right',
                '&-placement-rightTop',
                '&-placement-rightBottom'
              ].join(',')]: {
                [`${t}-inner`]: { borderRadius: Math.min(i, ua) }
              },
              [`${t}-content`]: { position: 'relative' }
            }),
            Ml(e, (m, p) => {
              let { darkColor: v } = p;
              return {
                [`&${t}-${m}`]: {
                  [`${t}-inner`]: { backgroundColor: v },
                  [`${t}-arrow`]: { '--antd-arrow-background-color': v }
                }
              };
            })
          ),
          { '&-rtl': { direction: 'rtl' } }
        )
      },
      rp($e(e, { borderRadiusOuter: c }), {
        colorBg: 'var(--antd-arrow-background-color)',
        showArrowCls: '',
        contentRadius: i,
        limitVerticalRadius: !0
      }),
      { [`${t}-pure`]: { position: 'relative', maxWidth: 'none' } }
    ];
  },
  ap = (e, t) =>
    ft(
      'Tooltip',
      o => {
        if ((t == null ? void 0 : t.value) === !1) return [];
        const {
            borderRadius: r,
            colorTextLightSolid: i,
            colorBgDefault: a,
            borderRadiusOuter: l
          } = o,
          s = $e(o, {
            tooltipMaxWidth: 250,
            tooltipColor: i,
            tooltipBorderRadius: r,
            tooltipBg: a,
            tooltipRadiusOuter: l > 4 ? 4 : l
          });
        return [ip(s), aa(o, 'zoom-big-fast')];
      },
      o => {
        let { zIndexPopupBase: r, colorBgSpotlight: i } = o;
        return { zIndexPopup: r + 70, colorBgDefault: i };
      }
    )(e),
  lp = (e, t) => {
    const n = {},
      o = f({}, e);
    return (
      t.forEach(r => {
        e && r in e && ((n[r] = e[r]), delete o[r]);
      }),
      { picked: n, omitted: o }
    );
  },
  sp = () => f(f({}, Yf()), { title: _.any }),
  $v = () => ({
    trigger: 'hover',
    align: {},
    placement: 'top',
    mouseEnterDelay: 0.1,
    mouseLeaveDelay: 0.1,
    arrowPointAtCenter: !1,
    autoAdjustOverflow: !0
  }),
  up = Y({
    compatConfig: { MODE: 3 },
    name: 'ATooltip',
    inheritAttrs: !1,
    props: pi(sp(), {
      trigger: 'hover',
      align: {},
      placement: 'top',
      mouseEnterDelay: 0.1,
      mouseLeaveDelay: 0.1,
      arrowPointAtCenter: !1,
      autoAdjustOverflow: !0
    }),
    slots: Object,
    setup(e, t) {
      let { slots: n, emit: o, attrs: r, expose: i } = t;
      [
        ['visible', 'open'],
        ['onVisibleChange', 'onOpenChange']
      ].forEach(C => {
        let [A, q] = C;
        Qn(
          e[A] === void 0,
          'Tooltip',
          `\`${A}\` is deprecated, please use \`${q}\` instead.`
        );
      });
      const {
          prefixCls: a,
          getPopupContainer: l,
          direction: s,
          rootPrefixCls: u
        } = ze('tooltip', e),
        d = S(() => {
          var C;
          return (C = e.open) !== null && C !== void 0 ? C : e.visible;
        }),
        c = G(Qf([e.open, e.visible])),
        m = G();
      let p;
      ee(d, C => {
        re.cancel(p),
          (p = re(() => {
            c.value = !!C;
          }));
      });
      const v = () => {
          var C;
          const A = (C = e.title) !== null && C !== void 0 ? C : n.title;
          return !A && A !== 0;
        },
        g = C => {
          const A = v();
          d.value === void 0 && (c.value = A ? !1 : C),
            A ||
              (o('update:visible', C),
              o('visibleChange', C),
              o('update:open', C),
              o('openChange', C));
        };
      i({
        getPopupDomNode: () => m.value.getPopupDomNode(),
        open: c,
        forcePopupAlign: () => {
          var C;
          return (C = m.value) === null || C === void 0
            ? void 0
            : C.forcePopupAlign();
        }
      });
      const y = S(() => {
          const {
            builtinPlacements: C,
            arrowPointAtCenter: A,
            autoAdjustOverflow: q
          } = e;
          return C || kf({ arrowPointAtCenter: A, autoAdjustOverflow: q });
        }),
        $ = C => C || C === '',
        O = C => {
          const A = C.type;
          if (
            typeof A == 'object' &&
            C.props &&
            (((A.__ANT_BUTTON === !0 || A === 'button') &&
              $(C.props.disabled)) ||
              (A.__ANT_SWITCH === !0 &&
                ($(C.props.disabled) || $(C.props.loading))) ||
              (A.__ANT_RADIO === !0 && $(C.props.disabled)))
          ) {
            const { picked: q, omitted: X } = lp(Ga(C), [
                'position',
                'left',
                'right',
                'top',
                'bottom',
                'float',
                'display',
                'zIndex'
              ]),
              k = f(f({ display: 'inline-block' }, q), {
                cursor: 'not-allowed',
                lineHeight: 1,
                width: C.props && C.props.block ? '100%' : void 0
              }),
              w = f(f({}, X), { pointerEvents: 'none' }),
              R = be(C, { style: w }, !0);
            return h(
              'span',
              { style: k, class: `${a.value}-disabled-compatible-wrapper` },
              [R]
            );
          }
          return C;
        },
        z = () => {
          var C, A;
          return (C = e.title) !== null && C !== void 0
            ? C
            : (A = n.title) === null || A === void 0
            ? void 0
            : A.call(n);
        },
        I = (C, A) => {
          const q = y.value,
            X = Object.keys(q).find(k => {
              var w, R;
              return (
                q[k].points[0] ===
                  ((w = A.points) === null || w === void 0 ? void 0 : w[0]) &&
                q[k].points[1] ===
                  ((R = A.points) === null || R === void 0 ? void 0 : R[1])
              );
            });
          if (X) {
            const k = C.getBoundingClientRect(),
              w = { top: '50%', left: '50%' };
            X.indexOf('top') >= 0 || X.indexOf('Bottom') >= 0
              ? (w.top = `${k.height - A.offset[1]}px`)
              : (X.indexOf('Top') >= 0 || X.indexOf('bottom') >= 0) &&
                (w.top = `${-A.offset[1]}px`),
              X.indexOf('left') >= 0 || X.indexOf('Right') >= 0
                ? (w.left = `${k.width - A.offset[0]}px`)
                : (X.indexOf('right') >= 0 || X.indexOf('Left') >= 0) &&
                  (w.left = `${-A.offset[0]}px`),
              (C.style.transformOrigin = `${w.left} ${w.top}`);
          }
        },
        T = S(() => np(a.value, e.color)),
        P = S(() => r['data-popover-inject']),
        [M, j] = ap(
          a,
          S(() => !P.value)
        );
      return () => {
        var C, A;
        const {
          openClassName: q,
          overlayClassName: X,
          overlayStyle: k,
          overlayInnerStyle: w
        } = e;
        let R =
          (A = dt(
            (C = n.default) === null || C === void 0 ? void 0 : C.call(n)
          )) !== null && A !== void 0
            ? A
            : null;
        R = R.length === 1 ? R[0] : R;
        let K = c.value;
        if ((d.value === void 0 && v() && (K = !1), !R)) return null;
        const x = O(eo(R) && !Ka(R) ? R : h('span', null, [R])),
          H = ie({
            [q || `${a.value}-open`]: !0,
            [x.props && x.props.class]: x.props && x.props.class
          }),
          F = ie(
            X,
            { [`${a.value}-rtl`]: s.value === 'rtl' },
            T.value.className,
            j.value
          ),
          N = f(f({}, T.value.overlayStyle), w),
          U = T.value.arrowStyle,
          ne = f(f(f({}, r), e), {
            prefixCls: a.value,
            getPopupContainer: l == null ? void 0 : l.value,
            builtinPlacements: y.value,
            visible: K,
            ref: m,
            overlayClassName: F,
            overlayStyle: f(f({}, U), k),
            overlayInnerStyle: N,
            onVisibleChange: g,
            onPopupAlign: I,
            transitionName: Ua(u.value, 'zoom-big-fast', e.transitionName)
          });
        return M(
          h(Xf, ne, {
            default: () => [c.value ? be(x, { class: H }) : x],
            arrowContent: () =>
              h('span', { class: `${a.value}-arrow-content` }, null),
            overlay: z
          })
        );
      };
    }
  }),
  cp = Xa(up),
  ke = { adjustX: 1, adjustY: 1 },
  Qe = [0, 0],
  dp = {
    topLeft: {
      points: ['bl', 'tl'],
      overflow: ke,
      offset: [0, -4],
      targetOffset: Qe
    },
    topCenter: {
      points: ['bc', 'tc'],
      overflow: ke,
      offset: [0, -4],
      targetOffset: Qe
    },
    topRight: {
      points: ['br', 'tr'],
      overflow: ke,
      offset: [0, -4],
      targetOffset: Qe
    },
    bottomLeft: {
      points: ['tl', 'bl'],
      overflow: ke,
      offset: [0, 4],
      targetOffset: Qe
    },
    bottomCenter: {
      points: ['tc', 'bc'],
      overflow: ke,
      offset: [0, 4],
      targetOffset: Qe
    },
    bottomRight: {
      points: ['tr', 'br'],
      overflow: ke,
      offset: [0, 4],
      targetOffset: Qe
    }
  },
  fp = dp;
var pp =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var r = 0, o = Object.getOwnPropertySymbols(e); r < o.length; r++)
        t.indexOf(o[r]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[r]) &&
          (n[o[r]] = e[o[r]]);
    return n;
  };
const wv = Y({
    compatConfig: { MODE: 3 },
    props: {
      minOverlayWidthMatchTrigger: { type: Boolean, default: void 0 },
      arrow: { type: Boolean, default: !1 },
      prefixCls: _.string.def('rc-dropdown'),
      transitionName: String,
      overlayClassName: _.string.def(''),
      openClassName: String,
      animation: _.any,
      align: _.object,
      overlayStyle: { type: Object, default: void 0 },
      placement: _.string.def('bottomLeft'),
      overlay: _.any,
      trigger: _.oneOfType([_.string, _.arrayOf(_.string)]).def('hover'),
      alignPoint: { type: Boolean, default: void 0 },
      showAction: _.array,
      hideAction: _.array,
      getPopupContainer: Function,
      visible: { type: Boolean, default: void 0 },
      defaultVisible: { type: Boolean, default: !1 },
      mouseEnterDelay: _.number.def(0.15),
      mouseLeaveDelay: _.number.def(0.1)
    },
    emits: ['visibleChange', 'overlayClick'],
    setup(e, t) {
      let { slots: n, emit: o, expose: r } = t;
      const i = G(!!e.visible);
      ee(
        () => e.visible,
        p => {
          p !== void 0 && (i.value = p);
        }
      );
      const a = G();
      r({ triggerRef: a });
      const l = p => {
          e.visible === void 0 && (i.value = !1), o('overlayClick', p);
        },
        s = p => {
          e.visible === void 0 && (i.value = p), o('visibleChange', p);
        },
        u = () => {
          var p;
          const v =
              (p = n.overlay) === null || p === void 0 ? void 0 : p.call(n),
            g = { prefixCls: `${e.prefixCls}-menu`, onClick: l };
          return h(it, { key: Ya }, [
            e.arrow && h('div', { class: `${e.prefixCls}-arrow` }, null),
            be(v, g, !1)
          ]);
        },
        d = S(() => {
          const { minOverlayWidthMatchTrigger: p = !e.alignPoint } = e;
          return p;
        }),
        c = () => {
          var p;
          const v =
            (p = n.default) === null || p === void 0 ? void 0 : p.call(n);
          return i.value && v
            ? be(v[0], { class: e.openClassName || `${e.prefixCls}-open` }, !1)
            : v;
        },
        m = S(() =>
          !e.hideAction && e.trigger.indexOf('contextmenu') !== -1
            ? ['click']
            : e.hideAction
        );
      return () => {
        const {
            prefixCls: p,
            arrow: v,
            showAction: g,
            overlayStyle: b,
            trigger: y,
            placement: $,
            align: O,
            getPopupContainer: z,
            transitionName: I,
            animation: T,
            overlayClassName: P
          } = e,
          M = pp(e, [
            'prefixCls',
            'arrow',
            'showAction',
            'overlayStyle',
            'trigger',
            'placement',
            'align',
            'getPopupContainer',
            'transitionName',
            'animation',
            'overlayClassName'
          ]);
        return h(
          mo,
          D(
            D({}, M),
            {},
            {
              prefixCls: p,
              ref: a,
              popupClassName: ie(P, { [`${p}-show-arrow`]: v }),
              popupStyle: b,
              builtinPlacements: fp,
              action: y,
              showAction: g,
              hideAction: m.value || [],
              popupPlacement: $,
              popupAlign: O,
              popupTransitionName: I,
              popupAnimation: T,
              popupVisible: i.value,
              stretch: d.value ? 'minWidth' : '',
              onPopupVisibleChange: s,
              getPopupContainer: z
            }
          ),
          { popup: u, default: c }
        );
      };
    }
  }),
  mp = e => {
    const { componentCls: t, colorPrimary: n } = e;
    return {
      [t]: {
        position: 'absolute',
        background: 'transparent',
        pointerEvents: 'none',
        boxSizing: 'border-box',
        color: `var(--wave-color, ${n})`,
        boxShadow: '0 0 0 0 currentcolor',
        opacity: 0.2,
        '&.wave-motion-appear': {
          transition: [
            `box-shadow 0.4s ${e.motionEaseOutCirc}`,
            `opacity 2s ${e.motionEaseOutCirc}`
          ].join(','),
          '&-active': { boxShadow: '0 0 0 6px currentcolor', opacity: 0 }
        }
      }
    };
  },
  vp = ft('Wave', e => [mp(e)]);
function gp(e) {
  const t = (e || '').match(/rgba?\((\d*), (\d*), (\d*)(, [\d.]*)?\)/);
  return t && t[1] && t[2] && t[3] ? !(t[1] === t[2] && t[2] === t[3]) : !0;
}
function Pn(e) {
  return (
    e &&
    e !== '#fff' &&
    e !== '#ffffff' &&
    e !== 'rgb(255, 255, 255)' &&
    e !== 'rgba(255, 255, 255, 1)' &&
    gp(e) &&
    !/rgba\((?:\d*, ){3}0\)/.test(e) &&
    e !== 'transparent'
  );
}
function hp(e) {
  const {
    borderTopColor: t,
    borderColor: n,
    backgroundColor: o
  } = getComputedStyle(e);
  return Pn(t) ? t : Pn(n) ? n : Pn(o) ? o : null;
}
function _n(e) {
  return Number.isNaN(e) ? 0 : e;
}
const bp = Y({
  props: { target: De(), className: String },
  setup(e) {
    const t = B(null),
      [n, o] = Ve(null),
      [r, i] = Ve([]),
      [a, l] = Ve(0),
      [s, u] = Ve(0),
      [d, c] = Ve(0),
      [m, p] = Ve(0),
      [v, g] = Ve(!1);
    function b() {
      const { target: P } = e,
        M = getComputedStyle(P);
      o(hp(P));
      const j = M.position === 'static',
        { borderLeftWidth: C, borderTopWidth: A } = M;
      l(j ? P.offsetLeft : _n(-parseFloat(C))),
        u(j ? P.offsetTop : _n(-parseFloat(A))),
        c(P.offsetWidth),
        p(P.offsetHeight);
      const {
        borderTopLeftRadius: q,
        borderTopRightRadius: X,
        borderBottomLeftRadius: k,
        borderBottomRightRadius: w
      } = M;
      i([q, X, w, k].map(R => _n(parseFloat(R))));
    }
    let y, $, O;
    const z = () => {
        clearTimeout(O), re.cancel($), y == null || y.disconnect();
      },
      I = () => {
        var P;
        const M =
          (P = t.value) === null || P === void 0 ? void 0 : P.parentElement;
        M && (fi(null, M), M.parentElement && M.parentElement.removeChild(M));
      };
    Ee(() => {
      z(),
        (O = setTimeout(() => {
          I();
        }, 5e3));
      const { target: P } = e;
      P &&
        (($ = re(() => {
          b(), g(!0);
        })),
        typeof ResizeObserver < 'u' &&
          ((y = new ResizeObserver(b)), y.observe(P)));
    }),
      we(() => {
        z();
      });
    const T = P => {
      P.propertyName === 'opacity' && I();
    };
    return () => {
      if (!v.value) return null;
      const P = {
        left: `${a.value}px`,
        top: `${s.value}px`,
        width: `${d.value}px`,
        height: `${m.value}px`,
        borderRadius: r.value.map(M => `${M}px`).join(' ')
      };
      return (
        n && (P['--wave-color'] = n.value),
        h(
          pt,
          {
            appear: !0,
            name: 'wave-motion',
            appearFromClass: 'wave-motion-appear',
            appearActiveClass: 'wave-motion-appear',
            appearToClass: 'wave-motion-appear wave-motion-appear-active'
          },
          {
            default: () => [
              h(
                'div',
                { ref: t, class: e.className, style: P, onTransitionend: T },
                null
              )
            ]
          }
        )
      );
    };
  }
});
function yp(e, t) {
  const n = document.createElement('div');
  (n.style.position = 'absolute'),
    (n.style.left = '0px'),
    (n.style.top = '0px'),
    e == null || e.insertBefore(n, e == null ? void 0 : e.firstChild),
    fi(h(bp, { target: e, className: t }, null), n);
}
function $p(e, t) {
  function n() {
    const o = Re(e);
    yp(o, t.value);
  }
  return n;
}
const wp = Y({
  compatConfig: { MODE: 3 },
  name: 'Wave',
  props: { disabled: Boolean },
  setup(e, t) {
    let { slots: n } = t;
    const o = He(),
      { prefixCls: r } = ze('wave', e),
      [, i] = vp(r),
      a = $p(
        o,
        S(() => ie(r.value, i.value))
      );
    let l;
    const s = () => {
      Re(o).removeEventListener('click', l, !0);
    };
    return (
      Ee(() => {
        ee(
          () => e.disabled,
          () => {
            s(),
              Se(() => {
                const u = Re(o);
                u == null || u.removeEventListener('click', l, !0),
                  !(!u || u.nodeType !== 1 || e.disabled) &&
                    ((l = d => {
                      d.target.tagName === 'INPUT' ||
                        !Di(d.target) ||
                        !u.getAttribute ||
                        u.getAttribute('disabled') ||
                        u.disabled ||
                        u.className.includes('disabled') ||
                        u.className.includes('-leave') ||
                        a();
                    }),
                    u.addEventListener('click', l, !0));
              });
          },
          { immediate: !0, flush: 'post' }
        );
      }),
      we(() => {
        s();
      }),
      () => {
        var u;
        return (u = n.default) === null || u === void 0 ? void 0 : u.call(n)[0];
      }
    );
  }
});
function Sv(e) {
  return e === 'danger' ? { danger: !0 } : { type: e };
}
const Sp = () => ({
    prefixCls: String,
    type: String,
    htmlType: { type: String, default: 'button' },
    shape: { type: String },
    size: { type: String },
    loading: { type: [Boolean, Object], default: () => !1 },
    disabled: { type: Boolean, default: void 0 },
    ghost: { type: Boolean, default: void 0 },
    block: { type: Boolean, default: void 0 },
    danger: { type: Boolean, default: void 0 },
    icon: _.any,
    href: String,
    target: String,
    title: String,
    onClick: Yt(),
    onMousedown: Yt()
  }),
  Cp = Sp,
  Hr = e => {
    e &&
      ((e.style.width = '0px'),
      (e.style.opacity = '0'),
      (e.style.transform = 'scale(0)'));
  },
  Lr = e => {
    Se(() => {
      e &&
        ((e.style.width = `${e.scrollWidth}px`),
        (e.style.opacity = '1'),
        (e.style.transform = 'scale(1)'));
    });
  },
  Fr = e => {
    e &&
      e.style &&
      ((e.style.width = null),
      (e.style.opacity = null),
      (e.style.transform = null));
  },
  xp = Y({
    compatConfig: { MODE: 3 },
    name: 'LoadingIcon',
    props: {
      prefixCls: String,
      loading: [Boolean, Object],
      existIcon: Boolean
    },
    setup(e) {
      return () => {
        const { existIcon: t, prefixCls: n, loading: o } = e;
        if (t)
          return h('span', { class: `${n}-loading-icon` }, [h(Ao, null, null)]);
        const r = !!o;
        return h(
          pt,
          {
            name: `${n}-loading-icon-motion`,
            onBeforeEnter: Hr,
            onEnter: Lr,
            onAfterEnter: Fr,
            onBeforeLeave: Lr,
            onLeave: i => {
              setTimeout(() => {
                Hr(i);
              });
            },
            onAfterLeave: Fr
          },
          {
            default: () => [
              r
                ? h('span', { class: `${n}-loading-icon` }, [h(Ao, null, null)])
                : null
            ]
          }
        );
      };
    }
  }),
  jr = (e, t) => ({
    [`> span, > ${e}`]: {
      '&:not(:last-child)': {
        [`&, & > ${e}`]: { '&:not(:disabled)': { borderInlineEndColor: t } }
      },
      '&:not(:first-child)': {
        [`&, & > ${e}`]: { '&:not(:disabled)': { borderInlineStartColor: t } }
      }
    }
  }),
  Op = e => {
    const {
      componentCls: t,
      fontSize: n,
      lineWidth: o,
      colorPrimaryHover: r,
      colorErrorHover: i
    } = e;
    return {
      [`${t}-group`]: [
        {
          position: 'relative',
          display: 'inline-flex',
          [`> span, > ${t}`]: {
            '&:not(:last-child)': {
              [`&, & > ${t}`]: {
                borderStartEndRadius: 0,
                borderEndEndRadius: 0
              }
            },
            '&:not(:first-child)': {
              marginInlineStart: -o,
              [`&, & > ${t}`]: {
                borderStartStartRadius: 0,
                borderEndStartRadius: 0
              }
            }
          },
          [t]: {
            position: 'relative',
            zIndex: 1,
            '&:hover,\n          &:focus,\n          &:active': { zIndex: 2 },
            '&[disabled]': { zIndex: 0 }
          },
          [`${t}-icon-only`]: { fontSize: n }
        },
        jr(`${t}-primary`, r),
        jr(`${t}-danger`, i)
      ]
    };
  },
  Ep = Op;
function Tp(e, t) {
  return {
    [`&-item:not(${t}-last-item)`]: { marginBottom: -e.lineWidth },
    '&-item': {
      '&:hover,&:focus,&:active': { zIndex: 2 },
      '&[disabled]': { zIndex: 0 }
    }
  };
}
function Ip(e, t) {
  return {
    [`&-item:not(${t}-first-item):not(${t}-last-item)`]: { borderRadius: 0 },
    [`&-item${t}-first-item:not(${t}-last-item)`]: {
      [`&, &${e}-sm, &${e}-lg`]: {
        borderEndEndRadius: 0,
        borderEndStartRadius: 0
      }
    },
    [`&-item${t}-last-item:not(${t}-first-item)`]: {
      [`&, &${e}-sm, &${e}-lg`]: {
        borderStartStartRadius: 0,
        borderStartEndRadius: 0
      }
    }
  };
}
function Pp(e) {
  const t = `${e.componentCls}-compact-vertical`;
  return { [t]: f(f({}, Tp(e, t)), Ip(e.componentCls, t)) };
}
const _p = e => {
    const { componentCls: t, iconCls: n } = e;
    return {
      [t]: {
        outline: 'none',
        position: 'relative',
        display: 'inline-block',
        fontWeight: 400,
        whiteSpace: 'nowrap',
        textAlign: 'center',
        backgroundImage: 'none',
        backgroundColor: 'transparent',
        border: `${e.lineWidth}px ${e.lineType} transparent`,
        cursor: 'pointer',
        transition: `all ${e.motionDurationMid} ${e.motionEaseInOut}`,
        userSelect: 'none',
        touchAction: 'manipulation',
        lineHeight: e.lineHeight,
        color: e.colorText,
        '> span': { display: 'inline-block' },
        [`> ${n} + span, > span + ${n}`]: { marginInlineStart: e.marginXS },
        '> a': { color: 'currentColor' },
        '&:not(:disabled)': f({}, qa(e)),
        [`&-icon-only${t}-compact-item`]: { flex: 'none' },
        [`&-compact-item${t}-primary`]: {
          [`&:not([disabled]) + ${t}-compact-item${t}-primary:not([disabled])`]: {
            position: 'relative',
            '&:before': {
              position: 'absolute',
              top: -e.lineWidth,
              insetInlineStart: -e.lineWidth,
              display: 'inline-block',
              width: e.lineWidth,
              height: `calc(100% + ${e.lineWidth * 2}px)`,
              backgroundColor: e.colorPrimaryHover,
              content: '""'
            }
          }
        },
        '&-compact-vertical-item': {
          [`&${t}-primary`]: {
            [`&:not([disabled]) + ${t}-compact-vertical-item${t}-primary:not([disabled])`]: {
              position: 'relative',
              '&:before': {
                position: 'absolute',
                top: -e.lineWidth,
                insetInlineStart: -e.lineWidth,
                display: 'inline-block',
                width: `calc(100% + ${e.lineWidth * 2}px)`,
                height: e.lineWidth,
                backgroundColor: e.colorPrimaryHover,
                content: '""'
              }
            }
          }
        }
      }
    };
  },
  Ie = (e, t) => ({ '&:not(:disabled)': { '&:hover': e, '&:active': t } }),
  Ap = e => ({
    minWidth: e.controlHeight,
    paddingInlineStart: 0,
    paddingInlineEnd: 0,
    borderRadius: '50%'
  }),
  Mp = e => ({
    borderRadius: e.controlHeight,
    paddingInlineStart: e.controlHeight / 2,
    paddingInlineEnd: e.controlHeight / 2
  }),
  Yn = e => ({
    cursor: 'not-allowed',
    borderColor: e.colorBorder,
    color: e.colorTextDisabled,
    backgroundColor: e.colorBgContainerDisabled,
    boxShadow: 'none'
  }),
  en = (e, t, n, o, r, i, a) => ({
    [`&${e}-background-ghost`]: f(
      f(
        {
          color: t || void 0,
          backgroundColor: 'transparent',
          borderColor: n || void 0,
          boxShadow: 'none'
        },
        Ie(
          f({ backgroundColor: 'transparent' }, i),
          f({ backgroundColor: 'transparent' }, a)
        )
      ),
      {
        '&:disabled': {
          cursor: 'not-allowed',
          color: o || void 0,
          borderColor: r || void 0
        }
      }
    )
  }),
  bo = e => ({ '&:disabled': f({}, Yn(e)) }),
  ca = e => f({}, bo(e)),
  tn = e => ({
    '&:disabled': { cursor: 'not-allowed', color: e.colorTextDisabled }
  }),
  da = e =>
    f(
      f(
        f(
          f(f({}, ca(e)), {
            backgroundColor: e.colorBgContainer,
            borderColor: e.colorBorder,
            boxShadow: `0 ${e.controlOutlineWidth}px 0 ${e.controlTmpOutline}`
          }),
          Ie(
            { color: e.colorPrimaryHover, borderColor: e.colorPrimaryHover },
            { color: e.colorPrimaryActive, borderColor: e.colorPrimaryActive }
          )
        ),
        en(
          e.componentCls,
          e.colorBgContainer,
          e.colorBgContainer,
          e.colorTextDisabled,
          e.colorBorder
        )
      ),
      {
        [`&${e.componentCls}-dangerous`]: f(
          f(
            f(
              { color: e.colorError, borderColor: e.colorError },
              Ie(
                {
                  color: e.colorErrorHover,
                  borderColor: e.colorErrorBorderHover
                },
                { color: e.colorErrorActive, borderColor: e.colorErrorActive }
              )
            ),
            en(
              e.componentCls,
              e.colorError,
              e.colorError,
              e.colorTextDisabled,
              e.colorBorder
            )
          ),
          bo(e)
        )
      }
    ),
  Rp = e =>
    f(
      f(
        f(
          f(f({}, ca(e)), {
            color: e.colorTextLightSolid,
            backgroundColor: e.colorPrimary,
            boxShadow: `0 ${e.controlOutlineWidth}px 0 ${e.controlOutline}`
          }),
          Ie(
            {
              color: e.colorTextLightSolid,
              backgroundColor: e.colorPrimaryHover
            },
            {
              color: e.colorTextLightSolid,
              backgroundColor: e.colorPrimaryActive
            }
          )
        ),
        en(
          e.componentCls,
          e.colorPrimary,
          e.colorPrimary,
          e.colorTextDisabled,
          e.colorBorder,
          { color: e.colorPrimaryHover, borderColor: e.colorPrimaryHover },
          { color: e.colorPrimaryActive, borderColor: e.colorPrimaryActive }
        )
      ),
      {
        [`&${e.componentCls}-dangerous`]: f(
          f(
            f(
              {
                backgroundColor: e.colorError,
                boxShadow: `0 ${e.controlOutlineWidth}px 0 ${e.colorErrorOutline}`
              },
              Ie(
                { backgroundColor: e.colorErrorHover },
                { backgroundColor: e.colorErrorActive }
              )
            ),
            en(
              e.componentCls,
              e.colorError,
              e.colorError,
              e.colorTextDisabled,
              e.colorBorder,
              { color: e.colorErrorHover, borderColor: e.colorErrorHover },
              { color: e.colorErrorActive, borderColor: e.colorErrorActive }
            )
          ),
          bo(e)
        )
      }
    ),
  Dp = e => f(f({}, da(e)), { borderStyle: 'dashed' }),
  Np = e =>
    f(
      f(
        f(
          { color: e.colorLink },
          Ie({ color: e.colorLinkHover }, { color: e.colorLinkActive })
        ),
        tn(e)
      ),
      {
        [`&${e.componentCls}-dangerous`]: f(
          f(
            { color: e.colorError },
            Ie({ color: e.colorErrorHover }, { color: e.colorErrorActive })
          ),
          tn(e)
        )
      }
    ),
  Bp = e =>
    f(
      f(
        f(
          {},
          Ie(
            { color: e.colorText, backgroundColor: e.colorBgTextHover },
            { color: e.colorText, backgroundColor: e.colorBgTextActive }
          )
        ),
        tn(e)
      ),
      {
        [`&${e.componentCls}-dangerous`]: f(
          f({ color: e.colorError }, tn(e)),
          Ie(
            { color: e.colorErrorHover, backgroundColor: e.colorErrorBg },
            { color: e.colorErrorHover, backgroundColor: e.colorErrorBg }
          )
        )
      }
    ),
  zp = e => f(f({}, Yn(e)), { [`&${e.componentCls}:hover`]: f({}, Yn(e)) }),
  Hp = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-default`]: da(e),
      [`${t}-primary`]: Rp(e),
      [`${t}-dashed`]: Dp(e),
      [`${t}-link`]: Np(e),
      [`${t}-text`]: Bp(e),
      [`${t}-disabled`]: zp(e)
    };
  },
  yo = function(e) {
    let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : '';
    const {
        componentCls: n,
        iconCls: o,
        controlHeight: r,
        fontSize: i,
        lineHeight: a,
        lineWidth: l,
        borderRadius: s,
        buttonPaddingHorizontal: u
      } = e,
      d = Math.max(0, (r - i * a) / 2 - l),
      c = u - l,
      m = `${n}-icon-only`;
    return [
      {
        [`${n}${t}`]: {
          fontSize: i,
          height: r,
          padding: `${d}px ${c}px`,
          borderRadius: s,
          [`&${m}`]: {
            width: r,
            paddingInlineStart: 0,
            paddingInlineEnd: 0,
            [`&${n}-round`]: { width: 'auto' },
            '> span': { transform: 'scale(1.143)' }
          },
          [`&${n}-loading`]: { opacity: e.opacityLoading, cursor: 'default' },
          [`${n}-loading-icon`]: {
            transition: `width ${e.motionDurationSlow} ${e.motionEaseInOut}, opacity ${e.motionDurationSlow} ${e.motionEaseInOut}`
          },
          [`&:not(${m}) ${n}-loading-icon > ${o}`]: {
            marginInlineEnd: e.marginXS
          }
        }
      },
      { [`${n}${n}-circle${t}`]: Ap(e) },
      { [`${n}${n}-round${t}`]: Mp(e) }
    ];
  },
  Lp = e => yo(e),
  Fp = e => {
    const t = $e(e, {
      controlHeight: e.controlHeightSM,
      padding: e.paddingXS,
      buttonPaddingHorizontal: 8,
      borderRadius: e.borderRadiusSM
    });
    return yo(t, `${e.componentCls}-sm`);
  },
  jp = e => {
    const t = $e(e, {
      controlHeight: e.controlHeightLG,
      fontSize: e.fontSizeLG,
      borderRadius: e.borderRadiusLG
    });
    return yo(t, `${e.componentCls}-lg`);
  },
  Wp = e => {
    const { componentCls: t } = e;
    return { [t]: { [`&${t}-block`]: { width: '100%' } } };
  },
  Vp = ft('Button', e => {
    const { controlTmpOutline: t, paddingContentHorizontal: n } = e,
      o = $e(e, { colorOutlineDefault: t, buttonPaddingHorizontal: n });
    return [
      _p(o),
      Fp(o),
      Lp(o),
      jp(o),
      Wp(o),
      Hp(o),
      Ep(o),
      la(e, { focus: !1 }),
      Pp(e)
    ];
  }),
  Kp = () => ({ prefixCls: String, size: { type: String } }),
  fa = go(),
  qn = Y({
    compatConfig: { MODE: 3 },
    name: 'AButtonGroup',
    props: Kp(),
    setup(e, t) {
      let { slots: n } = t;
      const { prefixCls: o, direction: r } = ze('btn-group', e),
        [, , i] = Za();
      fa.useProvide(to({ size: S(() => e.size) }));
      const a = S(() => {
        const { size: l } = e;
        let s = '';
        switch (l) {
          case 'large':
            s = 'lg';
            break;
          case 'small':
            s = 'sm';
            break;
          case 'middle':
          case void 0:
            break;
          default:
            lt(!l, 'Button.Group', 'Invalid prop `size`.');
        }
        return {
          [`${o.value}`]: !0,
          [`${o.value}-${s}`]: s,
          [`${o.value}-rtl`]: r.value === 'rtl',
          [i.value]: !0
        };
      });
      return () => {
        var l;
        return h('div', { class: a.value }, [
          Xe((l = n.default) === null || l === void 0 ? void 0 : l.call(n))
        ]);
      };
    }
  }),
  Wr = /^[\u4e00-\u9fa5]{2}$/,
  Vr = Wr.test.bind(Wr);
function jt(e) {
  return e === 'text' || e === 'link';
}
const Gt = Y({
  compatConfig: { MODE: 3 },
  name: 'AButton',
  inheritAttrs: !1,
  __ANT_BUTTON: !0,
  props: pi(Cp(), { type: 'default' }),
  slots: Object,
  setup(e, t) {
    let { slots: n, attrs: o, emit: r, expose: i } = t;
    const {
        prefixCls: a,
        autoInsertSpaceInButton: l,
        direction: s,
        size: u
      } = ze('btn', e),
      [d, c] = Vp(a),
      m = fa.useInject(),
      p = ci(),
      v = S(() => {
        var w;
        return (w = e.disabled) !== null && w !== void 0 ? w : p.value;
      }),
      g = B(null),
      b = B(void 0);
    let y = !1;
    const $ = B(!1),
      O = B(!1),
      z = S(() => l.value !== !1),
      { compactSize: I, compactItemClassnames: T } = vf(a, s),
      P = S(() =>
        typeof e.loading == 'object' && e.loading.delay
          ? e.loading.delay || !0
          : !!e.loading
      );
    ee(
      P,
      w => {
        clearTimeout(b.value),
          typeof P.value == 'number'
            ? (b.value = setTimeout(() => {
                $.value = w;
              }, P.value))
            : ($.value = w);
      },
      { immediate: !0 }
    );
    const M = S(() => {
        const {
            type: w,
            shape: R = 'default',
            ghost: K,
            block: x,
            danger: H
          } = e,
          F = a.value,
          N = { large: 'lg', small: 'sm', middle: void 0 },
          U = I.value || (m == null ? void 0 : m.size) || u.value,
          ne = (U && N[U]) || '';
        return [
          T.value,
          {
            [c.value]: !0,
            [`${F}`]: !0,
            [`${F}-${R}`]: R !== 'default' && R,
            [`${F}-${w}`]: w,
            [`${F}-${ne}`]: ne,
            [`${F}-loading`]: $.value,
            [`${F}-background-ghost`]: K && !jt(w),
            [`${F}-two-chinese-chars`]: O.value && z.value,
            [`${F}-block`]: x,
            [`${F}-dangerous`]: !!H,
            [`${F}-rtl`]: s.value === 'rtl'
          }
        ];
      }),
      j = () => {
        const w = g.value;
        if (!w || l.value === !1) return;
        const R = w.textContent;
        y && Vr(R) ? O.value || (O.value = !0) : O.value && (O.value = !1);
      },
      C = w => {
        if ($.value || v.value) {
          w.preventDefault();
          return;
        }
        r('click', w);
      },
      A = w => {
        r('mousedown', w);
      },
      q = (w, R) => {
        const K = R ? ' ' : '';
        if (w.type === il) {
          let x = w.children.trim();
          return Vr(x) && (x = x.split('').join(K)), h('span', null, [x]);
        }
        return w;
      };
    return (
      Te(() => {
        lt(
          !(e.ghost && jt(e.type)),
          'Button',
          "`link` or `text` button can't be a `ghost` button."
        );
      }),
      Ee(j),
      ln(j),
      we(() => {
        b.value && clearTimeout(b.value);
      }),
      i({
        focus: () => {
          var w;
          (w = g.value) === null || w === void 0 || w.focus();
        },
        blur: () => {
          var w;
          (w = g.value) === null || w === void 0 || w.blur();
        }
      }),
      () => {
        var w, R;
        const {
            icon: K = (w = n.icon) === null || w === void 0 ? void 0 : w.call(n)
          } = e,
          x = Xe((R = n.default) === null || R === void 0 ? void 0 : R.call(n));
        y = x.length === 1 && !K && !jt(e.type);
        const { type: H, htmlType: F, href: N, title: U, target: ne } = e,
          fe = $.value ? 'loading' : K,
          ce = f(f({}, o), {
            title: U,
            disabled: v.value,
            class: [
              M.value,
              o.class,
              { [`${a.value}-icon-only`]: x.length === 0 && !!fe }
            ],
            onClick: C,
            onMousedown: A
          });
        v.value || delete ce.disabled;
        const E =
            K && !$.value
              ? K
              : h(
                  xp,
                  { existIcon: !!K, prefixCls: a.value, loading: !!$.value },
                  null
                ),
          W = x.map(Q => q(Q, y && z.value));
        if (N !== void 0)
          return d(
            h('a', D(D({}, ce), {}, { href: N, target: ne, ref: g }), [E, W])
          );
        let Z = h('button', D(D({}, ce), {}, { ref: g, type: F }), [E, W]);
        if (!jt(H)) {
          const Q = (function() {
            return Z;
          })();
          Z = h(
            wp,
            { ref: 'wave', disabled: !!$.value },
            { default: () => [Q] }
          );
        }
        return d(Z);
      }
    );
  }
});
Gt.Group = qn;
Gt.install = function(e) {
  return e.component(Gt.name, Gt), e.component(qn.name, qn), e;
};
function Kr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(r) {
          return Object.getOwnPropertyDescriptor(n, r).enumerable;
        })
      )),
      o.forEach(function(r) {
        Up(e, r, n[r]);
      });
  }
  return e;
}
function Up(e, t, n) {
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
var $o = function(t, n) {
  var o = Kr({}, t, n.attrs);
  return h(Mt, Kr({}, o, { icon: cl }), null);
};
$o.displayName = 'EllipsisOutlined';
$o.inheritAttrs = !1;
const Gp = $o;
function Ur(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(r) {
          return Object.getOwnPropertyDescriptor(n, r).enumerable;
        })
      )),
      o.forEach(function(r) {
        Xp(e, r, n[r]);
      });
  }
  return e;
}
function Xp(e, t, n) {
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
var wo = function(t, n) {
  var o = Ur({}, t, n.attrs);
  return h(Mt, Ur({}, o, { icon: dl }), null);
};
wo.displayName = 'RightOutlined';
wo.inheritAttrs = !1;
const Cv = wo,
  pa = Symbol('OverrideContextKey'),
  ma = () => he(pa, void 0),
  xv = e => {
    var t, n, o;
    const {
      prefixCls: r,
      mode: i,
      selectable: a,
      validator: l,
      onClick: s,
      expandIcon: u
    } = ma() || {};
    Ce(pa, {
      prefixCls: S(() => {
        var d, c;
        return (c =
          (d = e.prefixCls) === null || d === void 0 ? void 0 : d.value) !==
          null && c !== void 0
          ? c
          : r == null
          ? void 0
          : r.value;
      }),
      mode: S(() => {
        var d, c;
        return (c =
          (d = e.mode) === null || d === void 0 ? void 0 : d.value) !== null &&
          c !== void 0
          ? c
          : i == null
          ? void 0
          : i.value;
      }),
      selectable: S(() => {
        var d, c;
        return (c =
          (d = e.selectable) === null || d === void 0 ? void 0 : d.value) !==
          null && c !== void 0
          ? c
          : a == null
          ? void 0
          : a.value;
      }),
      validator: (t = e.validator) !== null && t !== void 0 ? t : l,
      onClick: (n = e.onClick) !== null && n !== void 0 ? n : s,
      expandIcon:
        (o = e.expandIcon) !== null && o !== void 0
          ? o
          : u == null
          ? void 0
          : u.value
    });
  };
function Yp(e, t, n, o) {
  let r = n ? n.call(o, e, t) : void 0;
  if (r !== void 0) return !!r;
  if (e === t) return !0;
  if (typeof e != 'object' || !e || typeof t != 'object' || !t) return !1;
  const i = Object.keys(e),
    a = Object.keys(t);
  if (i.length !== a.length) return !1;
  const l = Object.prototype.hasOwnProperty.bind(t);
  for (let s = 0; s < i.length; s++) {
    const u = i[s];
    if (!l(u)) return !1;
    const d = e[u],
      c = t[u];
    if (
      ((r = n ? n.call(o, d, c, u) : void 0),
      r === !1 || (r === void 0 && d !== c))
    )
      return !1;
  }
  return !0;
}
function bt(e, t) {
  return Yp(Bn(e), Bn(t));
}
const va = Symbol('menuContextKey'),
  ga = e => {
    Ce(va, e);
  },
  Ae = () => he(va),
  ha = Symbol('ForceRenderKey'),
  qp = e => {
    Ce(ha, e);
  },
  ba = () => he(ha, !1),
  ya = Symbol('menuFirstLevelContextKey'),
  $a = e => {
    Ce(ya, e);
  },
  Zp = () => he(ya, !0),
  nn = Y({
    compatConfig: { MODE: 3 },
    name: 'MenuContextProvider',
    inheritAttrs: !1,
    props: {
      mode: { type: String, default: void 0 },
      overflowDisabled: { type: Boolean, default: void 0 }
    },
    setup(e, t) {
      let { slots: n } = t;
      const o = Ae(),
        r = f({}, o);
      return (
        e.mode !== void 0 && (r.mode = Nn(e, 'mode')),
        e.overflowDisabled !== void 0 &&
          (r.overflowDisabled = Nn(e, 'overflowDisabled')),
        ga(r),
        () => {
          var i;
          return (i = n.default) === null || i === void 0 ? void 0 : i.call(n);
        }
      );
    }
  }),
  kp = ga,
  Qp = Symbol('siderCollapsed'),
  Wt = '$$__vc-menu-more__key',
  wa = Symbol('KeyPathContext'),
  So = () =>
    he(wa, {
      parentEventKeys: S(() => []),
      parentKeys: S(() => []),
      parentInfo: {}
    }),
  Jp = (e, t, n) => {
    const { parentEventKeys: o, parentKeys: r } = So(),
      i = S(() => [...o.value, e]),
      a = S(() => [...r.value, t]);
    return Ce(wa, { parentEventKeys: i, parentKeys: a, parentInfo: n }), a;
  },
  Sa = Symbol('measure'),
  Gr = Y({
    compatConfig: { MODE: 3 },
    setup(e, t) {
      let { slots: n } = t;
      return (
        Ce(Sa, !0),
        () => {
          var o;
          return (o = n.default) === null || o === void 0 ? void 0 : o.call(n);
        }
      );
    }
  }),
  Co = () => he(Sa, !1),
  em = Jp;
function Ca(e) {
  const { mode: t, rtl: n, inlineIndent: o } = Ae();
  return S(() =>
    t.value !== 'inline'
      ? null
      : n.value
      ? { paddingRight: `${e.value * o.value}px` }
      : { paddingLeft: `${e.value * o.value}px` }
  );
}
let tm = 0;
const nm = () => ({
    id: String,
    role: String,
    disabled: Boolean,
    danger: Boolean,
    title: { type: [String, Boolean], default: void 0 },
    icon: _.any,
    onMouseenter: Function,
    onMouseleave: Function,
    onClick: Function,
    onKeydown: Function,
    onFocus: Function,
    originItemValue: De()
  }),
  At = Y({
    compatConfig: { MODE: 3 },
    name: 'AMenuItem',
    inheritAttrs: !1,
    props: nm(),
    slots: Object,
    setup(e, t) {
      let { slots: n, emit: o, attrs: r } = t;
      const i = He(),
        a = Co(),
        l = typeof i.vnode.key == 'symbol' ? String(i.vnode.key) : i.vnode.key;
      lt(
        typeof i.vnode.key != 'symbol',
        'MenuItem',
        `MenuItem \`:key="${String(l)}"\` not support Symbol type`
      );
      const s = `menu_item_${++tm}_$$_${l}`,
        { parentEventKeys: u, parentKeys: d } = So(),
        {
          prefixCls: c,
          activeKeys: m,
          disabled: p,
          changeActiveKeys: v,
          rtl: g,
          inlineCollapsed: b,
          siderCollapsed: y,
          onItemClick: $,
          selectedKeys: O,
          registerMenuInfo: z,
          unRegisterMenuInfo: I
        } = Ae(),
        T = Zp(),
        P = B(!1),
        M = S(() => [...d.value, l]);
      z(s, {
        eventKey: s,
        key: l,
        parentEventKeys: u,
        parentKeys: d,
        isLeaf: !0
      }),
        we(() => {
          I(s);
        }),
        ee(
          m,
          () => {
            P.value = !!m.value.find(N => N === l);
          },
          { immediate: !0 }
        );
      const C = S(() => p.value || e.disabled),
        A = S(() => O.value.includes(l)),
        q = S(() => {
          const N = `${c.value}-item`;
          return {
            [`${N}`]: !0,
            [`${N}-danger`]: e.danger,
            [`${N}-active`]: P.value,
            [`${N}-selected`]: A.value,
            [`${N}-disabled`]: C.value
          };
        }),
        X = N => ({
          key: l,
          eventKey: s,
          keyPath: M.value,
          eventKeyPath: [...u.value, s],
          domEvent: N,
          item: f(f({}, e), r)
        }),
        k = N => {
          if (C.value) return;
          const U = X(N);
          o('click', N), $(U);
        },
        w = N => {
          C.value || (v(M.value), o('mouseenter', N));
        },
        R = N => {
          C.value || (v([]), o('mouseleave', N));
        },
        K = N => {
          if ((o('keydown', N), N.which === _d.ENTER)) {
            const U = X(N);
            o('click', N), $(U);
          }
        },
        x = N => {
          v(M.value), o('focus', N);
        },
        H = (N, U) => {
          const ne = h('span', { class: `${c.value}-title-content` }, [U]);
          return (!N || (eo(U) && U.type === 'span')) &&
            U &&
            b.value &&
            T &&
            typeof U == 'string'
            ? h('div', { class: `${c.value}-inline-collapsed-noicon` }, [
                U.charAt(0)
              ])
            : ne;
        },
        F = Ca(S(() => M.value.length));
      return () => {
        var N, U, ne, fe, ce;
        if (a) return null;
        const E =
            (N = e.title) !== null && N !== void 0
              ? N
              : (U = n.title) === null || U === void 0
              ? void 0
              : U.call(n),
          W = Xe(
            (ne = n.default) === null || ne === void 0 ? void 0 : ne.call(n)
          ),
          Z = W.length;
        let Q = E;
        typeof E > 'u' ? (Q = T && Z ? W : '') : E === !1 && (Q = '');
        const ae = { title: Q };
        !y.value && !b.value && ((ae.title = null), (ae.open = !1));
        const se = {};
        e.role === 'option' && (se['aria-selected'] = A.value);
        const oe =
          (fe = e.icon) !== null && fe !== void 0
            ? fe
            : (ce = n.icon) === null || ce === void 0
            ? void 0
            : ce.call(n, e);
        return h(
          cp,
          D(
            D({}, ae),
            {},
            {
              placement: g.value ? 'left' : 'right',
              overlayClassName: `${c.value}-inline-collapsed-tooltip`
            }
          ),
          {
            default: () => [
              h(
                Ct.Item,
                D(
                  D(
                    D({ component: 'li' }, r),
                    {},
                    {
                      id: e.id,
                      style: f(f({}, r.style || {}), F.value),
                      class: [
                        q.value,
                        {
                          [`${r.class}`]: !!r.class,
                          [`${c.value}-item-only-child`]: (oe ? Z + 1 : Z) === 1
                        }
                      ],
                      role: e.role || 'menuitem',
                      tabindex: e.disabled ? null : -1,
                      'data-menu-id': l,
                      'aria-disabled': e.disabled
                    },
                    se
                  ),
                  {},
                  {
                    onMouseenter: w,
                    onMouseleave: R,
                    onClick: k,
                    onKeydown: K,
                    onFocus: x,
                    title: typeof E == 'string' ? E : void 0
                  }
                ),
                {
                  default: () => [
                    be(
                      typeof oe == 'function' ? oe(e.originItemValue) : oe,
                      { class: `${c.value}-item-icon` },
                      !1
                    ),
                    H(oe, W)
                  ]
                }
              )
            ]
          }
        );
      };
    }
  }),
  Ne = { adjustX: 1, adjustY: 1 },
  om = {
    topLeft: { points: ['bl', 'tl'], overflow: Ne, offset: [0, -7] },
    bottomLeft: { points: ['tl', 'bl'], overflow: Ne, offset: [0, 7] },
    leftTop: { points: ['tr', 'tl'], overflow: Ne, offset: [-4, 0] },
    rightTop: { points: ['tl', 'tr'], overflow: Ne, offset: [4, 0] }
  },
  rm = {
    topLeft: { points: ['bl', 'tl'], overflow: Ne, offset: [0, -7] },
    bottomLeft: { points: ['tl', 'bl'], overflow: Ne, offset: [0, 7] },
    rightTop: { points: ['tr', 'tl'], overflow: Ne, offset: [-4, 0] },
    leftTop: { points: ['tl', 'tr'], overflow: Ne, offset: [4, 0] }
  },
  im = {
    horizontal: 'bottomLeft',
    vertical: 'rightTop',
    'vertical-left': 'rightTop',
    'vertical-right': 'leftTop'
  },
  Xr = Y({
    compatConfig: { MODE: 3 },
    name: 'PopupTrigger',
    inheritAttrs: !1,
    props: {
      prefixCls: String,
      mode: String,
      visible: Boolean,
      popupClassName: String,
      popupOffset: Array,
      disabled: Boolean,
      onVisibleChange: Function
    },
    slots: Object,
    emits: ['visibleChange'],
    setup(e, t) {
      let { slots: n, emit: o } = t;
      const r = B(!1),
        {
          getPopupContainer: i,
          rtl: a,
          subMenuOpenDelay: l,
          subMenuCloseDelay: s,
          builtinPlacements: u,
          triggerSubMenuAction: d,
          forceSubMenuRender: c,
          motion: m,
          defaultMotions: p,
          rootClassName: v
        } = Ae(),
        g = ba(),
        b = S(() => (a.value ? f(f({}, rm), u.value) : f(f({}, om), u.value))),
        y = S(() => im[e.mode]),
        $ = B();
      ee(
        () => e.visible,
        I => {
          re.cancel($.value),
            ($.value = re(() => {
              r.value = I;
            }));
        },
        { immediate: !0 }
      ),
        we(() => {
          re.cancel($.value);
        });
      const O = I => {
          o('visibleChange', I);
        },
        z = S(() => {
          var I, T;
          const P =
              m.value ||
              ((I = p.value) === null || I === void 0 ? void 0 : I[e.mode]) ||
              ((T = p.value) === null || T === void 0 ? void 0 : T.other),
            M = typeof P == 'function' ? P() : P;
          return M ? ui(M.name, { css: !0 }) : void 0;
        });
      return () => {
        const {
          prefixCls: I,
          popupClassName: T,
          mode: P,
          popupOffset: M,
          disabled: j
        } = e;
        return h(
          mo,
          {
            prefixCls: I,
            popupClassName: ie(
              `${I}-popup`,
              { [`${I}-rtl`]: a.value },
              T,
              v.value
            ),
            stretch: P === 'horizontal' ? 'minWidth' : null,
            getPopupContainer: i.value,
            builtinPlacements: b.value,
            popupPlacement: y.value,
            popupVisible: r.value,
            popupAlign: M && { offset: M },
            action: j ? [] : [d.value],
            mouseEnterDelay: l.value,
            mouseLeaveDelay: s.value,
            onPopupVisibleChange: O,
            forceRender: g || c.value,
            popupAnimation: z.value
          },
          { popup: n.popup, default: n.default }
        );
      };
    }
  }),
  xa = (e, t) => {
    let { slots: n, attrs: o } = t;
    var r;
    const { prefixCls: i, mode: a } = Ae();
    return h(
      'ul',
      D(
        D({}, o),
        {},
        {
          class: ie(
            i.value,
            `${i.value}-sub`,
            `${i.value}-${a.value === 'inline' ? 'inline' : 'vertical'}`
          ),
          'data-menu-list': !0
        }
      ),
      [(r = n.default) === null || r === void 0 ? void 0 : r.call(n)]
    );
  };
xa.displayName = 'SubMenuList';
const Oa = xa,
  am = Y({
    compatConfig: { MODE: 3 },
    name: 'InlineSubMenuList',
    inheritAttrs: !1,
    props: { id: String, open: Boolean, keyPath: Array },
    setup(e, t) {
      let { slots: n } = t;
      const o = S(() => 'inline'),
        { motion: r, mode: i, defaultMotions: a } = Ae(),
        l = S(() => i.value === o.value),
        s = G(!l.value),
        u = S(() => (l.value ? e.open : !1));
      ee(
        i,
        () => {
          l.value && (s.value = !1);
        },
        { flush: 'post' }
      );
      const d = S(() => {
        var c, m;
        const p =
            r.value ||
            ((c = a.value) === null || c === void 0 ? void 0 : c[o.value]) ||
            ((m = a.value) === null || m === void 0 ? void 0 : m.other),
          v = typeof p == 'function' ? p() : p;
        return f(f({}, v), { appear: e.keyPath.length <= 1 });
      });
      return () => {
        var c;
        return s.value
          ? null
          : h(
              nn,
              { mode: o.value },
              {
                default: () => [
                  h(pt, d.value, {
                    default: () => [
                      sn(
                        h(
                          Oa,
                          { id: e.id },
                          {
                            default: () => [
                              (c = n.default) === null || c === void 0
                                ? void 0
                                : c.call(n)
                            ]
                          }
                        ),
                        [[di, u.value]]
                      )
                    ]
                  })
                ]
              }
            );
      };
    }
  });
let Yr = 0;
const lm = () => ({
    icon: _.any,
    title: _.any,
    disabled: Boolean,
    level: Number,
    popupClassName: String,
    popupOffset: Array,
    internalPopupClose: Boolean,
    eventKey: String,
    expandIcon: Function,
    theme: String,
    onMouseenter: Function,
    onMouseleave: Function,
    onTitleClick: Function,
    originItemValue: De()
  }),
  ct = Y({
    compatConfig: { MODE: 3 },
    name: 'ASubMenu',
    inheritAttrs: !1,
    props: lm(),
    slots: Object,
    setup(e, t) {
      let { slots: n, attrs: o, emit: r } = t;
      var i, a;
      $a(!1);
      const l = Co(),
        s = He(),
        u = typeof s.vnode.key == 'symbol' ? String(s.vnode.key) : s.vnode.key;
      lt(
        typeof s.vnode.key != 'symbol',
        'SubMenu',
        `SubMenu \`:key="${String(u)}"\` not support Symbol type`
      );
      const d = Mo(u) ? u : `sub_menu_${++Yr}_$$_not_set_key`,
        c =
          (i = e.eventKey) !== null && i !== void 0
            ? i
            : Mo(u)
            ? `sub_menu_${++Yr}_$$_${u}`
            : d,
        { parentEventKeys: m, parentInfo: p, parentKeys: v } = So(),
        g = S(() => [...v.value, d]),
        b = B([]),
        y = {
          eventKey: c,
          key: d,
          parentEventKeys: m,
          childrenEventKeys: b,
          parentKeys: v
        };
      (a = p.childrenEventKeys) === null || a === void 0 || a.value.push(c),
        we(() => {
          var J;
          p.childrenEventKeys &&
            (p.childrenEventKeys.value =
              (J = p.childrenEventKeys) === null || J === void 0
                ? void 0
                : J.value.filter(de => de != c));
        }),
        em(c, d, y);
      const {
          prefixCls: $,
          activeKeys: O,
          disabled: z,
          changeActiveKeys: I,
          mode: T,
          inlineCollapsed: P,
          openKeys: M,
          overflowDisabled: j,
          onOpenChange: C,
          registerMenuInfo: A,
          unRegisterMenuInfo: q,
          selectedSubMenuKeys: X,
          expandIcon: k,
          theme: w
        } = Ae(),
        R = u != null,
        K = !l && (ba() || !R);
      qp(K),
        ((l && R) || (!l && !R) || K) &&
          (A(c, y),
          we(() => {
            q(c);
          }));
      const x = S(() => `${$.value}-submenu`),
        H = S(() => z.value || e.disabled),
        F = B(),
        N = B(),
        U = S(() => M.value.includes(d)),
        ne = S(() => !j.value && U.value),
        fe = S(() => X.value.includes(d)),
        ce = B(!1);
      ee(
        O,
        () => {
          ce.value = !!O.value.find(J => J === d);
        },
        { immediate: !0 }
      );
      const E = J => {
          H.value ||
            (r('titleClick', J, d), T.value === 'inline' && C(d, !U.value));
        },
        W = J => {
          H.value || (I(g.value), r('mouseenter', J));
        },
        Z = J => {
          H.value || (I([]), r('mouseleave', J));
        },
        Q = Ca(S(() => g.value.length)),
        ae = J => {
          T.value !== 'inline' && C(d, J);
        },
        se = () => {
          I(g.value);
        },
        oe = c && `${c}-popup`,
        xe = S(() =>
          ie($.value, `${$.value}-${e.theme || w.value}`, e.popupClassName)
        ),
        ue = (J, de) => {
          if (!de)
            return P.value && !v.value.length && J && typeof J == 'string'
              ? h('div', { class: `${$.value}-inline-collapsed-noicon` }, [
                  J.charAt(0)
                ])
              : h('span', { class: `${$.value}-title-content` }, [J]);
          const Me = eo(J) && J.type === 'span';
          return h(it, null, [
            be(
              typeof de == 'function' ? de(e.originItemValue) : de,
              { class: `${$.value}-item-icon` },
              !1
            ),
            Me ? J : h('span', { class: `${$.value}-title-content` }, [J])
          ]);
        },
        pe = S(() =>
          T.value !== 'inline' && g.value.length > 1 ? 'vertical' : T.value
        ),
        Le = S(() => (T.value === 'horizontal' ? 'vertical' : T.value)),
        Na = S(() => (pe.value === 'horizontal' ? 'vertical' : pe.value)),
        To = () => {
          var J, de;
          const Me = x.value,
            gn =
              (J = e.icon) !== null && J !== void 0
                ? J
                : (de = n.icon) === null || de === void 0
                ? void 0
                : de.call(n, e),
            Io = e.expandIcon || n.expandIcon || k.value,
            hn = ue(Jn(n, e, 'title'), gn);
          return h(
            'div',
            {
              style: Q.value,
              class: `${Me}-title`,
              tabindex: H.value ? null : -1,
              ref: F,
              title: typeof hn == 'string' ? hn : null,
              'data-menu-id': d,
              'aria-expanded': ne.value,
              'aria-haspopup': !0,
              'aria-controls': oe,
              'aria-disabled': H.value,
              onClick: E,
              onFocus: se
            },
            [
              hn,
              T.value !== 'horizontal' && Io
                ? Io(f(f({}, e), { isOpen: ne.value }))
                : h('i', { class: `${Me}-arrow` }, null)
            ]
          );
        };
      return () => {
        var J;
        if (l)
          return R
            ? (J = n.default) === null || J === void 0
              ? void 0
              : J.call(n)
            : null;
        const de = x.value;
        let Me = () => null;
        if (!j.value && T.value !== 'inline') {
          const gn = T.value === 'horizontal' ? [0, 8] : [10, 0];
          Me = () =>
            h(
              Xr,
              {
                mode: pe.value,
                prefixCls: de,
                visible: !e.internalPopupClose && ne.value,
                popupClassName: xe.value,
                popupOffset: e.popupOffset || gn,
                disabled: H.value,
                onVisibleChange: ae
              },
              {
                default: () => [To()],
                popup: () =>
                  h(
                    nn,
                    { mode: Na.value },
                    {
                      default: () => [
                        h(Oa, { id: oe, ref: N }, { default: n.default })
                      ]
                    }
                  )
              }
            );
        } else Me = () => h(Xr, null, { default: To });
        return h(
          nn,
          { mode: Le.value },
          {
            default: () => [
              h(
                Ct.Item,
                D(
                  D({ component: 'li' }, o),
                  {},
                  {
                    role: 'none',
                    class: ie(de, `${de}-${T.value}`, o.class, {
                      [`${de}-open`]: ne.value,
                      [`${de}-active`]: ce.value,
                      [`${de}-selected`]: fe.value,
                      [`${de}-disabled`]: H.value
                    }),
                    onMouseenter: W,
                    onMouseleave: Z,
                    'data-submenu-id': d
                  }
                ),
                {
                  default: () =>
                    h(it, null, [
                      Me(),
                      !j.value &&
                        h(
                          am,
                          { id: oe, open: ne.value, keyPath: g.value },
                          { default: n.default }
                        )
                    ])
                }
              )
            ]
          }
        );
      };
    }
  });
function Ea(e, t) {
  return e.classList
    ? e.classList.contains(t)
    : ` ${e.className} `.indexOf(` ${t} `) > -1;
}
function qr(e, t) {
  e.classList
    ? e.classList.add(t)
    : Ea(e, t) || (e.className = `${e.className} ${t}`);
}
function Zr(e, t) {
  if (e.classList) e.classList.remove(t);
  else if (Ea(e, t)) {
    const n = e.className;
    e.className = ` ${n} `.replace(` ${t} `, ' ');
  }
}
const sm = function() {
    let e =
        arguments.length > 0 && arguments[0] !== void 0
          ? arguments[0]
          : 'ant-motion-collapse',
      t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !0;
    return {
      name: e,
      appear: t,
      css: !0,
      onBeforeEnter: n => {
        (n.style.height = '0px'), (n.style.opacity = '0'), qr(n, e);
      },
      onEnter: n => {
        Se(() => {
          (n.style.height = `${n.scrollHeight}px`), (n.style.opacity = '1');
        });
      },
      onAfterEnter: n => {
        n && (Zr(n, e), (n.style.height = null), (n.style.opacity = null));
      },
      onBeforeLeave: n => {
        qr(n, e),
          (n.style.height = `${n.offsetHeight}px`),
          (n.style.opacity = null);
      },
      onLeave: n => {
        setTimeout(() => {
          (n.style.height = '0px'), (n.style.opacity = '0');
        });
      },
      onAfterLeave: n => {
        n &&
          (Zr(n, e),
          n.style && ((n.style.height = null), (n.style.opacity = null)));
      }
    };
  },
  um = sm,
  cm = () => ({ title: _.any, originItemValue: De() }),
  on = Y({
    compatConfig: { MODE: 3 },
    name: 'AMenuItemGroup',
    inheritAttrs: !1,
    props: cm(),
    slots: Object,
    setup(e, t) {
      let { slots: n, attrs: o } = t;
      const { prefixCls: r } = Ae(),
        i = S(() => `${r.value}-item-group`),
        a = Co();
      return () => {
        var l, s;
        return a
          ? (l = n.default) === null || l === void 0
            ? void 0
            : l.call(n)
          : h(
              'li',
              D(
                D({}, o),
                {},
                { onClick: u => u.stopPropagation(), class: i.value }
              ),
              [
                h(
                  'div',
                  {
                    title: typeof e.title == 'string' ? e.title : void 0,
                    class: `${i.value}-title`
                  },
                  [Jn(n, e, 'title')]
                ),
                h('ul', { class: `${i.value}-list` }, [
                  (s = n.default) === null || s === void 0 ? void 0 : s.call(n)
                ])
              ]
            );
      };
    }
  }),
  dm = () => ({ prefixCls: String, dashed: Boolean }),
  rn = Y({
    compatConfig: { MODE: 3 },
    name: 'AMenuDivider',
    props: dm(),
    setup(e) {
      const { prefixCls: t } = Ae(),
        n = S(() => ({
          [`${t.value}-item-divider`]: !0,
          [`${t.value}-item-divider-dashed`]: !!e.dashed
        }));
      return () => h('li', { class: n.value }, null);
    }
  });
var fm =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var o in e)
      Object.prototype.hasOwnProperty.call(e, o) &&
        t.indexOf(o) < 0 &&
        (n[o] = e[o]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var r = 0, o = Object.getOwnPropertySymbols(e); r < o.length; r++)
        t.indexOf(o[r]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, o[r]) &&
          (n[o[r]] = e[o[r]]);
    return n;
  };
function Zn(e, t, n) {
  return (e || [])
    .map((o, r) => {
      if (o && typeof o == 'object') {
        const i = o,
          { label: a, children: l, key: s, type: u } = i,
          d = fm(i, ['label', 'children', 'key', 'type']),
          c = s ?? `tmp-${r}`,
          m = n ? n.parentKeys.slice() : [],
          p = [],
          v = {
            eventKey: c,
            key: c,
            parentEventKeys: G(m),
            parentKeys: G(m),
            childrenEventKeys: G(p),
            isLeaf: !1
          };
        if (l || u === 'group') {
          if (u === 'group') {
            const b = Zn(l, t, n);
            return h(
              on,
              D(D({ key: c }, d), {}, { title: a, originItemValue: o }),
              { default: () => [b] }
            );
          }
          t.set(c, v), n && n.childrenEventKeys.push(c);
          const g = Zn(l, t, {
            childrenEventKeys: p,
            parentKeys: [].concat(m, c)
          });
          return h(
            ct,
            D(D({ key: c }, d), {}, { title: a, originItemValue: o }),
            { default: () => [g] }
          );
        }
        return u === 'divider'
          ? h(rn, D({ key: c }, d), null)
          : ((v.isLeaf = !0),
            t.set(c, v),
            h(At, D(D({ key: c }, d), {}, { originItemValue: o }), {
              default: () => [a]
            }));
      }
      return null;
    })
    .filter(o => o);
}
function pm(e) {
  const t = B([]),
    n = B(!1),
    o = B(new Map());
  return (
    ee(
      () => e.items,
      () => {
        const r = new Map();
        (n.value = !1),
          e.items
            ? ((n.value = !0), (t.value = Zn(e.items, r)))
            : (t.value = void 0),
          (o.value = r);
      },
      { immediate: !0, deep: !0 }
    ),
    { itemsNodes: t, store: o, hasItmes: n }
  );
}
const mm = e => {
    const {
      componentCls: t,
      motionDurationSlow: n,
      menuHorizontalHeight: o,
      colorSplit: r,
      lineWidth: i,
      lineType: a,
      menuItemPaddingInline: l
    } = e;
    return {
      [`${t}-horizontal`]: {
        lineHeight: `${o}px`,
        border: 0,
        borderBottom: `${i}px ${a} ${r}`,
        boxShadow: 'none',
        '&::after': {
          display: 'block',
          clear: 'both',
          height: 0,
          content: '"\\20"'
        },
        [`${t}-item, ${t}-submenu`]: {
          position: 'relative',
          display: 'inline-block',
          verticalAlign: 'bottom',
          paddingInline: l
        },
        [`> ${t}-item:hover,
        > ${t}-item-active,
        > ${t}-submenu ${t}-submenu-title:hover`]: {
          backgroundColor: 'transparent'
        },
        [`${t}-item, ${t}-submenu-title`]: {
          transition: [`border-color ${n}`, `background ${n}`].join(',')
        },
        [`${t}-submenu-arrow`]: { display: 'none' }
      }
    };
  },
  vm = mm,
  gm = e => {
    let { componentCls: t, menuArrowOffset: n } = e;
    return {
      [`${t}-rtl`]: { direction: 'rtl' },
      [`${t}-submenu-rtl`]: { transformOrigin: '100% 0' },
      [`${t}-rtl${t}-vertical,
    ${t}-submenu-rtl ${t}-vertical`]: {
        [`${t}-submenu-arrow`]: {
          '&::before': { transform: `rotate(-45deg) translateY(-${n})` },
          '&::after': { transform: `rotate(45deg) translateY(${n})` }
        }
      }
    };
  },
  hm = gm,
  kr = e => f({}, ka(e)),
  bm = (e, t) => {
    const {
      componentCls: n,
      colorItemText: o,
      colorItemTextSelected: r,
      colorGroupTitle: i,
      colorItemBg: a,
      colorSubItemBg: l,
      colorItemBgSelected: s,
      colorActiveBarHeight: u,
      colorActiveBarWidth: d,
      colorActiveBarBorderSize: c,
      motionDurationSlow: m,
      motionEaseInOut: p,
      motionEaseOut: v,
      menuItemPaddingInline: g,
      motionDurationMid: b,
      colorItemTextHover: y,
      lineType: $,
      colorSplit: O,
      colorItemTextDisabled: z,
      colorDangerItemText: I,
      colorDangerItemTextHover: T,
      colorDangerItemTextSelected: P,
      colorDangerItemBgActive: M,
      colorDangerItemBgSelected: j,
      colorItemBgHover: C,
      menuSubMenuBg: A,
      colorItemTextSelectedHorizontal: q,
      colorItemBgSelectedHorizontal: X
    } = e;
    return {
      [`${n}-${t}`]: {
        color: o,
        background: a,
        [`&${n}-root:focus-visible`]: f({}, kr(e)),
        [`${n}-item-group-title`]: { color: i },
        [`${n}-submenu-selected`]: { [`> ${n}-submenu-title`]: { color: r } },
        [`${n}-item-disabled, ${n}-submenu-disabled`]: {
          color: `${z} !important`
        },
        [`${n}-item:hover, ${n}-submenu-title:hover`]: {
          [`&:not(${n}-item-selected):not(${n}-submenu-selected)`]: { color: y }
        },
        [`&:not(${n}-horizontal)`]: {
          [`${n}-item:not(${n}-item-selected)`]: {
            '&:hover': { backgroundColor: C },
            '&:active': { backgroundColor: s }
          },
          [`${n}-submenu-title`]: {
            '&:hover': { backgroundColor: C },
            '&:active': { backgroundColor: s }
          }
        },
        [`${n}-item-danger`]: {
          color: I,
          [`&${n}-item:hover`]: {
            [`&:not(${n}-item-selected):not(${n}-submenu-selected)`]: {
              color: T
            }
          },
          [`&${n}-item:active`]: { background: M }
        },
        [`${n}-item a`]: { '&, &:hover': { color: 'inherit' } },
        [`${n}-item-selected`]: {
          color: r,
          [`&${n}-item-danger`]: { color: P },
          'a, a:hover': { color: 'inherit' }
        },
        [`& ${n}-item-selected`]: {
          backgroundColor: s,
          [`&${n}-item-danger`]: { backgroundColor: j }
        },
        [`${n}-item, ${n}-submenu-title`]: {
          [`&:not(${n}-item-disabled):focus-visible`]: f({}, kr(e))
        },
        [`&${n}-submenu > ${n}`]: { backgroundColor: A },
        [`&${n}-popup > ${n}`]: { backgroundColor: a },
        [`&${n}-horizontal`]: f(
          f({}, t === 'dark' ? { borderBottom: 0 } : {}),
          {
            [`> ${n}-item, > ${n}-submenu`]: {
              top: c,
              marginTop: -c,
              marginBottom: 0,
              borderRadius: 0,
              '&::after': {
                position: 'absolute',
                insetInline: g,
                bottom: 0,
                borderBottom: `${u}px solid transparent`,
                transition: `border-color ${m} ${p}`,
                content: '""'
              },
              '&:hover, &-active, &-open': {
                '&::after': { borderBottomWidth: u, borderBottomColor: q }
              },
              '&-selected': {
                color: q,
                backgroundColor: X,
                '&::after': { borderBottomWidth: u, borderBottomColor: q }
              }
            }
          }
        ),
        [`&${n}-root`]: {
          [`&${n}-inline, &${n}-vertical`]: {
            borderInlineEnd: `${c}px ${$} ${O}`
          }
        },
        [`&${n}-inline`]: {
          [`${n}-sub${n}-inline`]: { background: l },
          [`${n}-item, ${n}-submenu-title`]:
            c && d ? { width: `calc(100% + ${c}px)` } : {},
          [`${n}-item`]: {
            position: 'relative',
            '&::after': {
              position: 'absolute',
              insetBlock: 0,
              insetInlineEnd: 0,
              borderInlineEnd: `${d}px solid ${r}`,
              transform: 'scaleY(0.0001)',
              opacity: 0,
              transition: [`transform ${b} ${v}`, `opacity ${b} ${v}`].join(
                ','
              ),
              content: '""'
            },
            [`&${n}-item-danger`]: { '&::after': { borderInlineEndColor: P } }
          },
          [`${n}-selected, ${n}-item-selected`]: {
            '&::after': {
              transform: 'scaleY(1)',
              opacity: 1,
              transition: [`transform ${b} ${p}`, `opacity ${b} ${p}`].join(',')
            }
          }
        }
      }
    };
  },
  Qr = bm,
  Jr = e => {
    const {
        componentCls: t,
        menuItemHeight: n,
        itemMarginInline: o,
        padding: r,
        menuArrowSize: i,
        marginXS: a,
        marginXXS: l
      } = e,
      s = r + i + a;
    return {
      [`${t}-item`]: { position: 'relative' },
      [`${t}-item, ${t}-submenu-title`]: {
        height: n,
        lineHeight: `${n}px`,
        paddingInline: r,
        overflow: 'hidden',
        textOverflow: 'ellipsis',
        marginInline: o,
        marginBlock: l,
        width: `calc(100% - ${o * 2}px)`
      },
      [`${t}-submenu`]: { paddingBottom: 0.02 },
      [`> ${t}-item,
            > ${t}-submenu > ${t}-submenu-title`]: {
        height: n,
        lineHeight: `${n}px`
      },
      [`${t}-item-group-list ${t}-submenu-title,
            ${t}-submenu-title`]: { paddingInlineEnd: s }
    };
  },
  ym = e => {
    const {
        componentCls: t,
        iconCls: n,
        menuItemHeight: o,
        colorTextLightSolid: r,
        dropdownWidth: i,
        controlHeightLG: a,
        motionDurationMid: l,
        motionEaseOut: s,
        paddingXL: u,
        fontSizeSM: d,
        fontSizeLG: c,
        motionDurationSlow: m,
        paddingXS: p,
        boxShadowSecondary: v
      } = e,
      g = {
        height: o,
        lineHeight: `${o}px`,
        listStylePosition: 'inside',
        listStyleType: 'disc'
      };
    return [
      {
        [t]: {
          '&-inline, &-vertical': f(
            { [`&${t}-root`]: { boxShadow: 'none' } },
            Jr(e)
          )
        },
        [`${t}-submenu-popup`]: {
          [`${t}-vertical`]: f(f({}, Jr(e)), { boxShadow: v })
        }
      },
      {
        [`${t}-submenu-popup ${t}-vertical${t}-sub`]: {
          minWidth: i,
          maxHeight: `calc(100vh - ${a * 2.5}px)`,
          padding: '0',
          overflow: 'hidden',
          borderInlineEnd: 0,
          "&:not([class*='-active'])": {
            overflowX: 'hidden',
            overflowY: 'auto'
          }
        }
      },
      {
        [`${t}-inline`]: {
          width: '100%',
          [`&${t}-root`]: {
            [`${t}-item, ${t}-submenu-title`]: {
              display: 'flex',
              alignItems: 'center',
              transition: [
                `border-color ${m}`,
                `background ${m}`,
                `padding ${l} ${s}`
              ].join(','),
              [`> ${t}-title-content`]: {
                flex: 'auto',
                minWidth: 0,
                overflow: 'hidden',
                textOverflow: 'ellipsis'
              },
              '> *': { flex: 'none' }
            }
          },
          [`${t}-sub${t}-inline`]: {
            padding: 0,
            border: 0,
            borderRadius: 0,
            boxShadow: 'none',
            [`& > ${t}-submenu > ${t}-submenu-title`]: g,
            [`& ${t}-item-group-title`]: { paddingInlineStart: u }
          },
          [`${t}-item`]: g
        }
      },
      {
        [`${t}-inline-collapsed`]: {
          width: o * 2,
          [`&${t}-root`]: {
            [`${t}-item, ${t}-submenu ${t}-submenu-title`]: {
              [`> ${t}-inline-collapsed-noicon`]: {
                fontSize: c,
                textAlign: 'center'
              }
            }
          },
          [`> ${t}-item,
          > ${t}-item-group > ${t}-item-group-list > ${t}-item,
          > ${t}-item-group > ${t}-item-group-list > ${t}-submenu > ${t}-submenu-title,
          > ${t}-submenu > ${t}-submenu-title`]: {
            insetInlineStart: 0,
            paddingInline: `calc(50% - ${d}px)`,
            textOverflow: 'clip',
            [`
            ${t}-submenu-arrow,
            ${t}-submenu-expand-icon
          `]: { opacity: 0 },
            [`${t}-item-icon, ${n}`]: {
              margin: 0,
              fontSize: c,
              lineHeight: `${o}px`,
              '+ span': { display: 'inline-block', opacity: 0 }
            }
          },
          [`${t}-item-icon, ${n}`]: { display: 'inline-block' },
          '&-tooltip': {
            pointerEvents: 'none',
            [`${t}-item-icon, ${n}`]: { display: 'none' },
            'a, a:hover': { color: r }
          },
          [`${t}-item-group-title`]: f(f({}, Qa), { paddingInline: p })
        }
      }
    ];
  },
  $m = ym,
  ei = e => {
    const {
      componentCls: t,
      fontSize: n,
      motionDurationSlow: o,
      motionDurationMid: r,
      motionEaseInOut: i,
      motionEaseOut: a,
      iconCls: l,
      controlHeightSM: s
    } = e;
    return {
      [`${t}-item, ${t}-submenu-title`]: {
        position: 'relative',
        display: 'block',
        margin: 0,
        whiteSpace: 'nowrap',
        cursor: 'pointer',
        transition: [
          `border-color ${o}`,
          `background ${o}`,
          `padding ${o} ${i}`
        ].join(','),
        [`${t}-item-icon, ${l}`]: {
          minWidth: n,
          fontSize: n,
          transition: [
            `font-size ${r} ${a}`,
            `margin ${o} ${i}`,
            `color ${o}`
          ].join(','),
          '+ span': {
            marginInlineStart: s - n,
            opacity: 1,
            transition: [`opacity ${o} ${i}`, `margin ${o}`, `color ${o}`].join(
              ','
            )
          }
        },
        [`${t}-item-icon`]: f({}, Ja()),
        [`&${t}-item-only-child`]: {
          [`> ${l}, > ${t}-item-icon`]: { marginInlineEnd: 0 }
        }
      },
      [`${t}-item-disabled, ${t}-submenu-disabled`]: {
        background: 'none !important',
        cursor: 'not-allowed',
        '&::after': { borderColor: 'transparent !important' },
        a: { color: 'inherit !important' },
        [`> ${t}-submenu-title`]: {
          color: 'inherit !important',
          cursor: 'not-allowed'
        }
      }
    };
  },
  ti = e => {
    const {
      componentCls: t,
      motionDurationSlow: n,
      motionEaseInOut: o,
      borderRadius: r,
      menuArrowSize: i,
      menuArrowOffset: a
    } = e;
    return {
      [`${t}-submenu`]: {
        '&-expand-icon, &-arrow': {
          position: 'absolute',
          top: '50%',
          insetInlineEnd: e.margin,
          width: i,
          color: 'currentcolor',
          transform: 'translateY(-50%)',
          transition: `transform ${n} ${o}, opacity ${n}`
        },
        '&-arrow': {
          '&::before, &::after': {
            position: 'absolute',
            width: i * 0.6,
            height: i * 0.15,
            backgroundColor: 'currentcolor',
            borderRadius: r,
            transition: [
              `background ${n} ${o}`,
              `transform ${n} ${o}`,
              `top ${n} ${o}`,
              `color ${n} ${o}`
            ].join(','),
            content: '""'
          },
          '&::before': { transform: `rotate(45deg) translateY(-${a})` },
          '&::after': { transform: `rotate(-45deg) translateY(${a})` }
        }
      }
    };
  },
  wm = e => {
    const {
      antCls: t,
      componentCls: n,
      fontSize: o,
      motionDurationSlow: r,
      motionDurationMid: i,
      motionEaseInOut: a,
      lineHeight: l,
      paddingXS: s,
      padding: u,
      colorSplit: d,
      lineWidth: c,
      zIndexPopup: m,
      borderRadiusLG: p,
      radiusSubMenuItem: v,
      menuArrowSize: g,
      menuArrowOffset: b,
      lineType: y,
      menuPanelMaskInset: $
    } = e;
    return [
      {
        '': { [`${n}`]: f(f({}, Dn()), { '&-hidden': { display: 'none' } }) },
        [`${n}-submenu-hidden`]: { display: 'none' }
      },
      {
        [n]: f(
          f(
            f(
              f(
                f(f(f({}, an(e)), Dn()), {
                  marginBottom: 0,
                  paddingInlineStart: 0,
                  fontSize: o,
                  lineHeight: 0,
                  listStyle: 'none',
                  outline: 'none',
                  transition: `width ${r} cubic-bezier(0.2, 0, 0, 1) 0s`,
                  'ul, ol': { margin: 0, padding: 0, listStyle: 'none' },
                  '&-overflow': {
                    display: 'flex',
                    [`${n}-item`]: { flex: 'none' }
                  },
                  [`${n}-item, ${n}-submenu, ${n}-submenu-title`]: {
                    borderRadius: e.radiusItem
                  },
                  [`${n}-item-group-title`]: {
                    padding: `${s}px ${u}px`,
                    fontSize: o,
                    lineHeight: l,
                    transition: `all ${r}`
                  },
                  [`&-horizontal ${n}-submenu`]: {
                    transition: [
                      `border-color ${r} ${a}`,
                      `background ${r} ${a}`
                    ].join(',')
                  },
                  [`${n}-submenu, ${n}-submenu-inline`]: {
                    transition: [
                      `border-color ${r} ${a}`,
                      `background ${r} ${a}`,
                      `padding ${i} ${a}`
                    ].join(',')
                  },
                  [`${n}-submenu ${n}-sub`]: {
                    cursor: 'initial',
                    transition: [
                      `background ${r} ${a}`,
                      `padding ${r} ${a}`
                    ].join(',')
                  },
                  [`${n}-title-content`]: { transition: `color ${r}` },
                  [`${n}-item a`]: {
                    '&::before': {
                      position: 'absolute',
                      inset: 0,
                      backgroundColor: 'transparent',
                      content: '""'
                    }
                  },
                  [`${n}-item-divider`]: {
                    overflow: 'hidden',
                    lineHeight: 0,
                    borderColor: d,
                    borderStyle: y,
                    borderWidth: 0,
                    borderTopWidth: c,
                    marginBlock: c,
                    padding: 0,
                    '&-dashed': { borderStyle: 'dashed' }
                  }
                }),
                ei(e)
              ),
              {
                [`${n}-item-group`]: {
                  [`${n}-item-group-list`]: {
                    margin: 0,
                    padding: 0,
                    [`${n}-item, ${n}-submenu-title`]: {
                      paddingInline: `${o * 2}px ${u}px`
                    }
                  }
                },
                '&-submenu': {
                  '&-popup': {
                    position: 'absolute',
                    zIndex: m,
                    background: 'transparent',
                    borderRadius: p,
                    boxShadow: 'none',
                    transformOrigin: '0 0',
                    '&::before': {
                      position: 'absolute',
                      inset: `${$}px 0 0`,
                      zIndex: -1,
                      width: '100%',
                      height: '100%',
                      opacity: 0,
                      content: '""'
                    }
                  },
                  '&-placement-rightTop::before': {
                    top: 0,
                    insetInlineStart: $
                  },
                  [`> ${n}`]: f(f(f({ borderRadius: p }, ei(e)), ti(e)), {
                    [`${n}-item, ${n}-submenu > ${n}-submenu-title`]: {
                      borderRadius: v
                    },
                    [`${n}-submenu-title::after`]: {
                      transition: `transform ${r} ${a}`
                    }
                  })
                }
              }
            ),
            ti(e)
          ),
          {
            [`&-inline-collapsed ${n}-submenu-arrow,
        &-inline ${n}-submenu-arrow`]: {
              '&::before': { transform: `rotate(-45deg) translateX(${b})` },
              '&::after': { transform: `rotate(45deg) translateX(-${b})` }
            },
            [`${n}-submenu-open${n}-submenu-inline > ${n}-submenu-title > ${n}-submenu-arrow`]: {
              transform: `translateY(-${g * 0.2}px)`,
              '&::after': { transform: `rotate(-45deg) translateX(-${b})` },
              '&::before': { transform: `rotate(45deg) translateX(${b})` }
            }
          }
        )
      },
      { [`${t}-layout-header`]: { [n]: { lineHeight: 'inherit' } } }
    ];
  },
  Sm = (e, t) =>
    ft(
      'Menu',
      (o, r) => {
        let { overrideComponentToken: i } = r;
        if ((t == null ? void 0 : t.value) === !1) return [];
        const {
            colorBgElevated: a,
            colorPrimary: l,
            colorError: s,
            colorErrorHover: u,
            colorTextLightSolid: d
          } = o,
          { controlHeightLG: c, fontSize: m } = o,
          p = (m / 7) * 5,
          v = $e(o, {
            menuItemHeight: c,
            menuItemPaddingInline: o.margin,
            menuArrowSize: p,
            menuHorizontalHeight: c * 1.15,
            menuArrowOffset: `${p * 0.25}px`,
            menuPanelMaskInset: -7,
            menuSubMenuBg: a
          }),
          g = new Do(d).setAlpha(0.65).toRgbString(),
          b = $e(
            v,
            {
              colorItemText: g,
              colorItemTextHover: d,
              colorGroupTitle: g,
              colorItemTextSelected: d,
              colorItemBg: '#001529',
              colorSubItemBg: '#000c17',
              colorItemBgActive: 'transparent',
              colorItemBgSelected: l,
              colorActiveBarWidth: 0,
              colorActiveBarHeight: 0,
              colorActiveBarBorderSize: 0,
              colorItemTextDisabled: new Do(d).setAlpha(0.25).toRgbString(),
              colorDangerItemText: s,
              colorDangerItemTextHover: u,
              colorDangerItemTextSelected: d,
              colorDangerItemBgActive: s,
              colorDangerItemBgSelected: s,
              menuSubMenuBg: '#001529',
              colorItemTextSelectedHorizontal: d,
              colorItemBgSelectedHorizontal: l
            },
            f({}, i)
          );
        return [
          wm(v),
          vm(v),
          $m(v),
          Qr(v, 'light'),
          Qr(b, 'dark'),
          hm(v),
          jf(v),
          Mr(v, 'slide-up'),
          Mr(v, 'slide-down'),
          aa(v, 'zoom-big')
        ];
      },
      o => {
        const {
          colorPrimary: r,
          colorError: i,
          colorTextDisabled: a,
          colorErrorBg: l,
          colorText: s,
          colorTextDescription: u,
          colorBgContainer: d,
          colorFillAlter: c,
          colorFillContent: m,
          lineWidth: p,
          lineWidthBold: v,
          controlItemBgActive: g,
          colorBgTextHover: b
        } = o;
        return {
          dropdownWidth: 160,
          zIndexPopup: o.zIndexPopupBase + 50,
          radiusItem: o.borderRadiusLG,
          radiusSubMenuItem: o.borderRadiusSM,
          colorItemText: s,
          colorItemTextHover: s,
          colorItemTextHoverHorizontal: r,
          colorGroupTitle: u,
          colorItemTextSelected: r,
          colorItemTextSelectedHorizontal: r,
          colorItemBg: d,
          colorItemBgHover: b,
          colorItemBgActive: m,
          colorSubItemBg: c,
          colorItemBgSelected: g,
          colorItemBgSelectedHorizontal: 'transparent',
          colorActiveBarWidth: 0,
          colorActiveBarHeight: v,
          colorActiveBarBorderSize: p,
          colorItemTextDisabled: a,
          colorDangerItemText: i,
          colorDangerItemTextHover: i,
          colorDangerItemTextSelected: i,
          colorDangerItemBgActive: l,
          colorDangerItemBgSelected: l,
          itemMarginInline: o.marginXXS
        };
      }
    )(e),
  Cm = () => ({
    id: String,
    prefixCls: String,
    items: Array,
    disabled: Boolean,
    inlineCollapsed: Boolean,
    disabledOverflow: Boolean,
    forceSubMenuRender: Boolean,
    openKeys: Array,
    selectedKeys: Array,
    activeKey: String,
    selectable: { type: Boolean, default: !0 },
    multiple: { type: Boolean, default: !1 },
    tabindex: { type: [Number, String] },
    motion: Object,
    role: String,
    theme: { type: String, default: 'light' },
    mode: { type: String, default: 'vertical' },
    inlineIndent: { type: Number, default: 24 },
    subMenuOpenDelay: { type: Number, default: 0 },
    subMenuCloseDelay: { type: Number, default: 0.1 },
    builtinPlacements: { type: Object },
    triggerSubMenuAction: { type: String, default: 'hover' },
    getPopupContainer: Function,
    expandIcon: Function,
    onOpenChange: Function,
    onSelect: Function,
    onDeselect: Function,
    onClick: [Function, Array],
    onFocus: Function,
    onBlur: Function,
    onMousedown: Function,
    'onUpdate:openKeys': Function,
    'onUpdate:selectedKeys': Function,
    'onUpdate:activeKey': Function
  }),
  ni = [],
  Ue = Y({
    compatConfig: { MODE: 3 },
    name: 'AMenu',
    inheritAttrs: !1,
    props: Cm(),
    slots: Object,
    setup(e, t) {
      let { slots: n, emit: o, attrs: r } = t;
      const { direction: i, getPrefixCls: a } = ze('menu', e),
        l = ma(),
        s = S(() => {
          var E;
          return a(
            'menu',
            e.prefixCls ||
              ((E = l == null ? void 0 : l.prefixCls) === null || E === void 0
                ? void 0
                : E.value)
          );
        }),
        [u, d] = Sm(
          s,
          S(() => !l)
        ),
        c = B(new Map()),
        m = he(Qp, G(void 0)),
        p = S(() => (m.value !== void 0 ? m.value : e.inlineCollapsed)),
        { itemsNodes: v } = pm(e),
        g = B(!1);
      Ee(() => {
        g.value = !0;
      }),
        Te(() => {
          lt(
            !(e.inlineCollapsed === !0 && e.mode !== 'inline'),
            'Menu',
            '`inlineCollapsed` should only be used when `mode` is inline.'
          ),
            lt(
              !(m.value !== void 0 && e.inlineCollapsed === !0),
              'Menu',
              '`inlineCollapsed` not control Menu under Sider. Should set `collapsed` on Sider instead.'
            );
        });
      const b = G([]),
        y = G([]),
        $ = G({});
      ee(
        c,
        () => {
          const E = {};
          for (const W of c.value.values()) E[W.key] = W;
          $.value = E;
        },
        { flush: 'post' }
      ),
        Te(() => {
          if (e.activeKey !== void 0) {
            let E = [];
            const W = e.activeKey ? $.value[e.activeKey] : void 0;
            W && e.activeKey !== void 0
              ? (E = In([].concat(yt(W.parentKeys), e.activeKey)))
              : (E = []),
              bt(b.value, E) || (b.value = E);
          }
        }),
        ee(
          () => e.selectedKeys,
          E => {
            E && (y.value = E.slice());
          },
          { immediate: !0, deep: !0 }
        );
      const O = G([]);
      ee(
        [$, y],
        () => {
          let E = [];
          y.value.forEach(W => {
            const Z = $.value[W];
            Z && (E = E.concat(yt(Z.parentKeys)));
          }),
            (E = In(E)),
            bt(O.value, E) || (O.value = E);
        },
        { immediate: !0 }
      );
      const z = E => {
          if (e.selectable) {
            const { key: W } = E,
              Z = y.value.includes(W);
            let Q;
            e.multiple
              ? Z
                ? (Q = y.value.filter(se => se !== W))
                : (Q = [...y.value, W])
              : (Q = [W]);
            const ae = f(f({}, E), { selectedKeys: Q });
            bt(Q, y.value) ||
              (e.selectedKeys === void 0 && (y.value = Q),
              o('update:selectedKeys', Q),
              Z && e.multiple ? o('deselect', ae) : o('select', ae));
          }
          C.value !== 'inline' && !e.multiple && I.value.length && X(ni);
        },
        I = G([]);
      ee(
        () => e.openKeys,
        function() {
          let E =
            arguments.length > 0 && arguments[0] !== void 0
              ? arguments[0]
              : I.value;
          bt(I.value, E) || (I.value = E.slice());
        },
        { immediate: !0, deep: !0 }
      );
      let T;
      const P = E => {
          clearTimeout(T),
            (T = setTimeout(() => {
              e.activeKey === void 0 && (b.value = E),
                o('update:activeKey', E[E.length - 1]);
            }));
        },
        M = S(() => !!e.disabled),
        j = S(() => i.value === 'rtl'),
        C = G('vertical'),
        A = B(!1);
      Te(() => {
        var E;
        (e.mode === 'inline' || e.mode === 'vertical') && p.value
          ? ((C.value = 'vertical'), (A.value = p.value))
          : ((C.value = e.mode), (A.value = !1)),
          !((E = l == null ? void 0 : l.mode) === null || E === void 0) &&
            E.value &&
            (C.value = l.mode.value);
      });
      const q = S(() => C.value === 'inline'),
        X = E => {
          (I.value = E), o('update:openKeys', E), o('openChange', E);
        },
        k = G(I.value),
        w = B(!1);
      ee(
        I,
        () => {
          q.value && (k.value = I.value);
        },
        { immediate: !0 }
      ),
        ee(
          q,
          () => {
            if (!w.value) {
              w.value = !0;
              return;
            }
            q.value ? (I.value = k.value) : X(ni);
          },
          { immediate: !0 }
        );
      const R = S(() => ({
          [`${s.value}`]: !0,
          [`${s.value}-root`]: !0,
          [`${s.value}-${C.value}`]: !0,
          [`${s.value}-inline-collapsed`]: A.value,
          [`${s.value}-rtl`]: j.value,
          [`${s.value}-${e.theme}`]: !0
        })),
        K = S(() => a()),
        x = S(() => ({
          horizontal: { name: `${K.value}-slide-up` },
          inline: um,
          other: { name: `${K.value}-zoom-big` }
        }));
      $a(!0);
      const H = function() {
          let E =
            arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : [];
          const W = [],
            Z = c.value;
          return (
            E.forEach(Q => {
              const { key: ae, childrenEventKeys: se } = Z.get(Q);
              W.push(ae, ...H(yt(se)));
            }),
            W
          );
        },
        F = E => {
          var W;
          o('click', E),
            z(E),
            (W = l == null ? void 0 : l.onClick) === null ||
              W === void 0 ||
              W.call(l);
        },
        N = (E, W) => {
          var Z;
          const Q =
            ((Z = $.value[E]) === null || Z === void 0
              ? void 0
              : Z.childrenEventKeys) || [];
          let ae = I.value.filter(se => se !== E);
          if (W) ae.push(E);
          else if (C.value !== 'inline') {
            const se = H(yt(Q));
            ae = In(ae.filter(oe => !se.includes(oe)));
          }
          bt(I, ae) || X(ae);
        },
        U = (E, W) => {
          c.value.set(E, W), (c.value = new Map(c.value));
        },
        ne = E => {
          c.value.delete(E), (c.value = new Map(c.value));
        },
        fe = G(0),
        ce = S(() => {
          var E;
          return e.expandIcon ||
            n.expandIcon ||
            (!(
              (E = l == null ? void 0 : l.expandIcon) === null || E === void 0
            ) &&
              E.value)
            ? W => {
                let Z = e.expandIcon || n.expandIcon;
                return (
                  (Z = typeof Z == 'function' ? Z(W) : Z),
                  be(Z, { class: `${s.value}-submenu-expand-icon` }, !1)
                );
              }
            : null;
        });
      return (
        kp({
          prefixCls: s,
          activeKeys: b,
          openKeys: I,
          selectedKeys: y,
          changeActiveKeys: P,
          disabled: M,
          rtl: j,
          mode: C,
          inlineIndent: S(() => e.inlineIndent),
          subMenuCloseDelay: S(() => e.subMenuCloseDelay),
          subMenuOpenDelay: S(() => e.subMenuOpenDelay),
          builtinPlacements: S(() => e.builtinPlacements),
          triggerSubMenuAction: S(() => e.triggerSubMenuAction),
          getPopupContainer: S(() => e.getPopupContainer),
          inlineCollapsed: A,
          theme: S(() => e.theme),
          siderCollapsed: m,
          defaultMotions: S(() => (g.value ? x.value : null)),
          motion: S(() => (g.value ? e.motion : null)),
          overflowDisabled: B(void 0),
          onOpenChange: N,
          onItemClick: F,
          registerMenuInfo: U,
          unRegisterMenuInfo: ne,
          selectedSubMenuKeys: O,
          expandIcon: ce,
          forceSubMenuRender: S(() => e.forceSubMenuRender),
          rootClassName: d
        }),
        () => {
          var E, W;
          const Z =
              v.value ||
              Xe((E = n.default) === null || E === void 0 ? void 0 : E.call(n)),
            Q =
              fe.value >= Z.length - 1 ||
              C.value !== 'horizontal' ||
              e.disabledOverflow,
            ae =
              C.value !== 'horizontal' || e.disabledOverflow
                ? Z
                : Z.map((oe, xe) =>
                    h(
                      nn,
                      { key: oe.key, overflowDisabled: xe > fe.value },
                      { default: () => oe }
                    )
                  ),
            se =
              ((W = n.overflowedIndicator) === null || W === void 0
                ? void 0
                : W.call(n)) || h(Gp, null, null);
          return u(
            h(
              Ct,
              D(
                D({}, r),
                {},
                {
                  onMousedown: e.onMousedown,
                  prefixCls: `${s.value}-overflow`,
                  component: 'ul',
                  itemComponent: At,
                  class: [R.value, r.class, d.value],
                  role: 'menu',
                  id: e.id,
                  data: ae,
                  renderRawItem: oe => oe,
                  renderRawRest: oe => {
                    const xe = oe.length,
                      ue = xe ? Z.slice(-xe) : null;
                    return h(it, null, [
                      h(
                        ct,
                        {
                          eventKey: Wt,
                          key: Wt,
                          title: se,
                          disabled: Q,
                          internalPopupClose: xe === 0
                        },
                        { default: () => ue }
                      ),
                      h(Gr, null, {
                        default: () => [
                          h(
                            ct,
                            {
                              eventKey: Wt,
                              key: Wt,
                              title: se,
                              disabled: Q,
                              internalPopupClose: xe === 0
                            },
                            { default: () => ue }
                          )
                        ]
                      })
                    ]);
                  },
                  maxCount:
                    C.value !== 'horizontal' || e.disabledOverflow
                      ? Ct.INVALIDATE
                      : Ct.RESPONSIVE,
                  ssr: 'full',
                  'data-menu-list': !0,
                  onVisibleChange: oe => {
                    fe.value = oe;
                  }
                }
              ),
              {
                default: () => [
                  h(
                    al,
                    { to: 'body' },
                    {
                      default: () => [
                        h(
                          'div',
                          { style: { display: 'none' }, 'aria-hidden': !0 },
                          [h(Gr, null, { default: () => [ae] })]
                        )
                      ]
                    }
                  )
                ]
              }
            )
          );
        }
      );
    }
  });
Ue.install = function(e) {
  return (
    e.component(Ue.name, Ue),
    e.component(At.name, At),
    e.component(ct.name, ct),
    e.component(rn.name, rn),
    e.component(on.name, on),
    e
  );
};
Ue.Item = At;
Ue.Divider = rn;
Ue.SubMenu = ct;
Ue.ItemGroup = on;
const xm = e => ({
    '&::-moz-placeholder': { opacity: 1 },
    '&::placeholder': { color: e, userSelect: 'none' },
    '&:placeholder-shown': { textOverflow: 'ellipsis' }
  }),
  xo = e => ({
    borderColor: e.inputBorderHoverColor,
    borderInlineEndWidth: e.lineWidth
  }),
  kn = e => ({
    borderColor: e.inputBorderHoverColor,
    boxShadow: `0 0 0 ${e.controlOutlineWidth}px ${e.controlOutline}`,
    borderInlineEndWidth: e.lineWidth,
    outline: 0
  }),
  Om = e => ({
    color: e.colorTextDisabled,
    backgroundColor: e.colorBgContainerDisabled,
    borderColor: e.colorBorder,
    boxShadow: 'none',
    cursor: 'not-allowed',
    opacity: 1,
    '&:hover': f({}, xo($e(e, { inputBorderHoverColor: e.colorBorder })))
  }),
  Ta = e => {
    const {
      inputPaddingVerticalLG: t,
      fontSizeLG: n,
      lineHeightLG: o,
      borderRadiusLG: r,
      inputPaddingHorizontalLG: i
    } = e;
    return {
      padding: `${t}px ${i}px`,
      fontSize: n,
      lineHeight: o,
      borderRadius: r
    };
  },
  Ia = e => ({
    padding: `${e.inputPaddingVerticalSM}px ${e.controlPaddingHorizontalSM -
      1}px`,
    borderRadius: e.borderRadiusSM
  }),
  Pa = (e, t) => {
    const {
      componentCls: n,
      colorError: o,
      colorWarning: r,
      colorErrorOutline: i,
      colorWarningOutline: a,
      colorErrorBorderHover: l,
      colorWarningBorderHover: s
    } = e;
    return {
      [`&-status-error:not(${t}-disabled):not(${t}-borderless)${t}`]: {
        borderColor: o,
        '&:hover': { borderColor: l },
        '&:focus, &-focused': f(
          {},
          kn(
            $e(e, {
              inputBorderActiveColor: o,
              inputBorderHoverColor: o,
              controlOutline: i
            })
          )
        ),
        [`${n}-prefix`]: { color: o }
      },
      [`&-status-warning:not(${t}-disabled):not(${t}-borderless)${t}`]: {
        borderColor: r,
        '&:hover': { borderColor: s },
        '&:focus, &-focused': f(
          {},
          kn(
            $e(e, {
              inputBorderActiveColor: r,
              inputBorderHoverColor: r,
              controlOutline: a
            })
          )
        ),
        [`${n}-prefix`]: { color: r }
      }
    };
  },
  _a = e =>
    f(
      f(
        {
          position: 'relative',
          display: 'inline-block',
          width: '100%',
          minWidth: 0,
          padding: `${e.inputPaddingVertical}px ${e.inputPaddingHorizontal}px`,
          color: e.colorText,
          fontSize: e.fontSize,
          lineHeight: e.lineHeight,
          backgroundColor: e.colorBgContainer,
          backgroundImage: 'none',
          borderWidth: e.lineWidth,
          borderStyle: e.lineType,
          borderColor: e.colorBorder,
          borderRadius: e.borderRadius,
          transition: `all ${e.motionDurationMid}`
        },
        xm(e.colorTextPlaceholder)
      ),
      {
        '&:hover': f({}, xo(e)),
        '&:focus, &-focused': f({}, kn(e)),
        '&-disabled, &[disabled]': f({}, Om(e)),
        '&-borderless': {
          '&, &:hover, &:focus, &-focused, &-disabled, &[disabled]': {
            backgroundColor: 'transparent',
            border: 'none',
            boxShadow: 'none'
          }
        },
        'textarea&': {
          maxWidth: '100%',
          height: 'auto',
          minHeight: e.controlHeight,
          lineHeight: e.lineHeight,
          verticalAlign: 'bottom',
          transition: `all ${e.motionDurationSlow}, height 0s`,
          resize: 'vertical'
        },
        '&-lg': f({}, Ta(e)),
        '&-sm': f({}, Ia(e)),
        '&-rtl': { direction: 'rtl' },
        '&-textarea-rtl': { direction: 'rtl' }
      }
    ),
  Em = e => {
    const { componentCls: t, antCls: n } = e;
    return {
      position: 'relative',
      display: 'table',
      width: '100%',
      borderCollapse: 'separate',
      borderSpacing: 0,
      "&[class*='col-']": {
        paddingInlineEnd: e.paddingXS,
        '&:last-child': { paddingInlineEnd: 0 }
      },
      [`&-lg ${t}, &-lg > ${t}-group-addon`]: f({}, Ta(e)),
      [`&-sm ${t}, &-sm > ${t}-group-addon`]: f({}, Ia(e)),
      [`> ${t}`]: {
        display: 'table-cell',
        '&:not(:first-child):not(:last-child)': { borderRadius: 0 }
      },
      [`${t}-group`]: {
        '&-addon, &-wrap': {
          display: 'table-cell',
          width: 1,
          whiteSpace: 'nowrap',
          verticalAlign: 'middle',
          '&:not(:first-child):not(:last-child)': { borderRadius: 0 }
        },
        '&-wrap > *': { display: 'block !important' },
        '&-addon': {
          position: 'relative',
          padding: `0 ${e.inputPaddingHorizontal}px`,
          color: e.colorText,
          fontWeight: 'normal',
          fontSize: e.fontSize,
          textAlign: 'center',
          backgroundColor: e.colorFillAlter,
          border: `${e.lineWidth}px ${e.lineType} ${e.colorBorder}`,
          borderRadius: e.borderRadius,
          transition: `all ${e.motionDurationSlow}`,
          lineHeight: 1,
          [`${n}-select`]: {
            margin: `-${e.inputPaddingVertical + 1}px -${
              e.inputPaddingHorizontal
            }px`,
            [`&${n}-select-single:not(${n}-select-customize-input)`]: {
              [`${n}-select-selector`]: {
                backgroundColor: 'inherit',
                border: `${e.lineWidth}px ${e.lineType} transparent`,
                boxShadow: 'none'
              }
            },
            '&-open, &-focused': {
              [`${n}-select-selector`]: { color: e.colorPrimary }
            }
          },
          [`${n}-cascader-picker`]: {
            margin: `-9px -${e.inputPaddingHorizontal}px`,
            backgroundColor: 'transparent',
            [`${n}-cascader-input`]: {
              textAlign: 'start',
              border: 0,
              boxShadow: 'none'
            }
          }
        },
        '&-addon:first-child': { borderInlineEnd: 0 },
        '&-addon:last-child': { borderInlineStart: 0 }
      },
      [`${t}`]: {
        float: 'inline-start',
        width: '100%',
        marginBottom: 0,
        textAlign: 'inherit',
        '&:focus': { zIndex: 1, borderInlineEndWidth: 1 },
        '&:hover': {
          zIndex: 1,
          borderInlineEndWidth: 1,
          [`${t}-search-with-button &`]: { zIndex: 0 }
        }
      },
      [`> ${t}:first-child, ${t}-group-addon:first-child`]: {
        borderStartEndRadius: 0,
        borderEndEndRadius: 0,
        [`${n}-select ${n}-select-selector`]: {
          borderStartEndRadius: 0,
          borderEndEndRadius: 0
        }
      },
      [`> ${t}-affix-wrapper`]: {
        [`&:not(:first-child) ${t}`]: {
          borderStartStartRadius: 0,
          borderEndStartRadius: 0
        },
        [`&:not(:last-child) ${t}`]: {
          borderStartEndRadius: 0,
          borderEndEndRadius: 0
        }
      },
      [`> ${t}:last-child, ${t}-group-addon:last-child`]: {
        borderStartStartRadius: 0,
        borderEndStartRadius: 0,
        [`${n}-select ${n}-select-selector`]: {
          borderStartStartRadius: 0,
          borderEndStartRadius: 0
        }
      },
      [`${t}-affix-wrapper`]: {
        '&:not(:last-child)': {
          borderStartEndRadius: 0,
          borderEndEndRadius: 0,
          [`${t}-search &`]: {
            borderStartStartRadius: e.borderRadius,
            borderEndStartRadius: e.borderRadius
          }
        },
        [`&:not(:first-child), ${t}-search &:not(:first-child)`]: {
          borderStartStartRadius: 0,
          borderEndStartRadius: 0
        }
      },
      [`&${t}-group-compact`]: f(f({ display: 'block' }, Dn()), {
        [`${t}-group-addon, ${t}-group-wrap, > ${t}`]: {
          '&:not(:first-child):not(:last-child)': {
            borderInlineEndWidth: e.lineWidth,
            '&:hover': { zIndex: 1 },
            '&:focus': { zIndex: 1 }
          }
        },
        '& > *': {
          display: 'inline-block',
          float: 'none',
          verticalAlign: 'top',
          borderRadius: 0
        },
        [`& > ${t}-affix-wrapper`]: { display: 'inline-flex' },
        [`& > ${n}-picker-range`]: { display: 'inline-flex' },
        '& > *:not(:last-child)': {
          marginInlineEnd: -e.lineWidth,
          borderInlineEndWidth: e.lineWidth
        },
        [`${t}`]: { float: 'none' },
        [`& > ${n}-select > ${n}-select-selector,
      & > ${n}-select-auto-complete ${t},
      & > ${n}-cascader-picker ${t},
      & > ${t}-group-wrapper ${t}`]: {
          borderInlineEndWidth: e.lineWidth,
          borderRadius: 0,
          '&:hover': { zIndex: 1 },
          '&:focus': { zIndex: 1 }
        },
        [`& > ${n}-select-focused`]: { zIndex: 1 },
        [`& > ${n}-select > ${n}-select-arrow`]: { zIndex: 1 },
        [`& > *:first-child,
      & > ${n}-select:first-child > ${n}-select-selector,
      & > ${n}-select-auto-complete:first-child ${t},
      & > ${n}-cascader-picker:first-child ${t}`]: {
          borderStartStartRadius: e.borderRadius,
          borderEndStartRadius: e.borderRadius
        },
        [`& > *:last-child,
      & > ${n}-select:last-child > ${n}-select-selector,
      & > ${n}-cascader-picker:last-child ${t},
      & > ${n}-cascader-picker-focused:last-child ${t}`]: {
          borderInlineEndWidth: e.lineWidth,
          borderStartEndRadius: e.borderRadius,
          borderEndEndRadius: e.borderRadius
        },
        [`& > ${n}-select-auto-complete ${t}`]: { verticalAlign: 'top' },
        [`${t}-group-wrapper + ${t}-group-wrapper`]: {
          marginInlineStart: -e.lineWidth,
          [`${t}-affix-wrapper`]: { borderRadius: 0 }
        },
        [`${t}-group-wrapper:not(:last-child)`]: {
          [`&${t}-search > ${t}-group`]: {
            [`& > ${t}-group-addon > ${t}-search-button`]: { borderRadius: 0 },
            [`& > ${t}`]: {
              borderStartStartRadius: e.borderRadius,
              borderStartEndRadius: 0,
              borderEndEndRadius: 0,
              borderEndStartRadius: e.borderRadius
            }
          }
        }
      }),
      [`&&-sm ${n}-btn`]: {
        fontSize: e.fontSizeSM,
        height: e.controlHeightSM,
        lineHeight: 'normal'
      },
      [`&&-lg ${n}-btn`]: {
        fontSize: e.fontSizeLG,
        height: e.controlHeightLG,
        lineHeight: 'normal'
      },
      [`&&-lg ${n}-select-single ${n}-select-selector`]: {
        height: `${e.controlHeightLG}px`,
        [`${n}-select-selection-item, ${n}-select-selection-placeholder`]: {
          lineHeight: `${e.controlHeightLG - 2}px`
        },
        [`${n}-select-selection-search-input`]: {
          height: `${e.controlHeightLG}px`
        }
      },
      [`&&-sm ${n}-select-single ${n}-select-selector`]: {
        height: `${e.controlHeightSM}px`,
        [`${n}-select-selection-item, ${n}-select-selection-placeholder`]: {
          lineHeight: `${e.controlHeightSM - 2}px`
        },
        [`${n}-select-selection-search-input`]: {
          height: `${e.controlHeightSM}px`
        }
      }
    };
  },
  Tm = e => {
    const { componentCls: t, controlHeightSM: n, lineWidth: o } = e,
      r = 16,
      i = (n - o * 2 - r) / 2;
    return {
      [t]: f(f(f(f({}, an(e)), _a(e)), Pa(e, t)), {
        '&[type="color"]': {
          height: e.controlHeight,
          [`&${t}-lg`]: { height: e.controlHeightLG },
          [`&${t}-sm`]: { height: n, paddingTop: i, paddingBottom: i }
        }
      })
    };
  },
  Im = e => {
    const { componentCls: t } = e;
    return {
      [`${t}-clear-icon`]: {
        margin: 0,
        color: e.colorTextQuaternary,
        fontSize: e.fontSizeIcon,
        verticalAlign: -1,
        cursor: 'pointer',
        transition: `color ${e.motionDurationSlow}`,
        '&:hover': { color: e.colorTextTertiary },
        '&:active': { color: e.colorText },
        '&-hidden': { visibility: 'hidden' },
        '&-has-suffix': { margin: `0 ${e.inputAffixPadding}px` }
      },
      '&-textarea-with-clear-btn': {
        padding: '0 !important',
        border: '0 !important',
        [`${t}-clear-icon`]: {
          position: 'absolute',
          insetBlockStart: e.paddingXS,
          insetInlineEnd: e.paddingXS,
          zIndex: 1
        }
      }
    };
  },
  Pm = e => {
    const {
      componentCls: t,
      inputAffixPadding: n,
      colorTextDescription: o,
      motionDurationSlow: r,
      colorIcon: i,
      colorIconHover: a,
      iconCls: l
    } = e;
    return {
      [`${t}-affix-wrapper`]: f(
        f(
          f(
            f(f({}, _a(e)), {
              display: 'inline-flex',
              [`&:not(${t}-affix-wrapper-disabled):hover`]: f(f({}, xo(e)), {
                zIndex: 1,
                [`${t}-search-with-button &`]: { zIndex: 0 }
              }),
              '&-focused, &:focus': { zIndex: 1 },
              '&-disabled': {
                [`${t}[disabled]`]: { background: 'transparent' }
              },
              [`> input${t}`]: {
                padding: 0,
                fontSize: 'inherit',
                border: 'none',
                borderRadius: 0,
                outline: 'none',
                '&:focus': { boxShadow: 'none !important' }
              },
              '&::before': {
                width: 0,
                visibility: 'hidden',
                content: '"\\a0"'
              },
              [`${t}`]: {
                '&-prefix, &-suffix': {
                  display: 'flex',
                  flex: 'none',
                  alignItems: 'center',
                  '> *:not(:last-child)': { marginInlineEnd: e.paddingXS }
                },
                '&-show-count-suffix': { color: o },
                '&-show-count-has-suffix': { marginInlineEnd: e.paddingXXS },
                '&-prefix': { marginInlineEnd: n },
                '&-suffix': { marginInlineStart: n }
              }
            }),
            Im(e)
          ),
          {
            [`${l}${t}-password-icon`]: {
              color: i,
              cursor: 'pointer',
              transition: `all ${r}`,
              '&:hover': { color: a }
            }
          }
        ),
        Pa(e, `${t}-affix-wrapper`)
      )
    };
  },
  _m = e => {
    const {
      componentCls: t,
      colorError: n,
      colorSuccess: o,
      borderRadiusLG: r,
      borderRadiusSM: i
    } = e;
    return {
      [`${t}-group`]: f(f(f({}, an(e)), Em(e)), {
        '&-rtl': { direction: 'rtl' },
        '&-wrapper': {
          display: 'inline-block',
          width: '100%',
          textAlign: 'start',
          verticalAlign: 'top',
          '&-rtl': { direction: 'rtl' },
          '&-lg': { [`${t}-group-addon`]: { borderRadius: r } },
          '&-sm': { [`${t}-group-addon`]: { borderRadius: i } },
          '&-status-error': {
            [`${t}-group-addon`]: { color: n, borderColor: n }
          },
          '&-status-warning': {
            [`${t}-group-addon:last-child`]: { color: o, borderColor: o }
          }
        }
      })
    };
  },
  Am = e => {
    const { componentCls: t, antCls: n } = e,
      o = `${t}-search`;
    return {
      [o]: {
        [`${t}`]: {
          '&:hover, &:focus': {
            borderColor: e.colorPrimaryHover,
            [`+ ${t}-group-addon ${o}-button:not(${n}-btn-primary)`]: {
              borderInlineStartColor: e.colorPrimaryHover
            }
          }
        },
        [`${t}-affix-wrapper`]: { borderRadius: 0 },
        [`${t}-lg`]: { lineHeight: e.lineHeightLG - 2e-4 },
        [`> ${t}-group`]: {
          [`> ${t}-group-addon:last-child`]: {
            insetInlineStart: -1,
            padding: 0,
            border: 0,
            [`${o}-button`]: {
              paddingTop: 0,
              paddingBottom: 0,
              borderStartStartRadius: 0,
              borderStartEndRadius: e.borderRadius,
              borderEndEndRadius: e.borderRadius,
              borderEndStartRadius: 0
            },
            [`${o}-button:not(${n}-btn-primary)`]: {
              color: e.colorTextDescription,
              '&:hover': { color: e.colorPrimaryHover },
              '&:active': { color: e.colorPrimaryActive },
              [`&${n}-btn-loading::before`]: {
                insetInlineStart: 0,
                insetInlineEnd: 0,
                insetBlockStart: 0,
                insetBlockEnd: 0
              }
            }
          }
        },
        [`${o}-button`]: {
          height: e.controlHeight,
          '&:hover, &:focus': { zIndex: 1 }
        },
        [`&-large ${o}-button`]: { height: e.controlHeightLG },
        [`&-small ${o}-button`]: { height: e.controlHeightSM },
        '&-rtl': { direction: 'rtl' },
        [`&${t}-compact-item`]: {
          [`&:not(${t}-compact-last-item)`]: {
            [`${t}-group-addon`]: {
              [`${t}-search-button`]: {
                marginInlineEnd: -e.lineWidth,
                borderRadius: 0
              }
            }
          },
          [`&:not(${t}-compact-first-item)`]: {
            [`${t},${t}-affix-wrapper`]: { borderRadius: 0 }
          },
          [`> ${t}-group-addon ${t}-search-button,
        > ${t},
        ${t}-affix-wrapper`]: { '&:hover,&:focus,&:active': { zIndex: 2 } },
          [`> ${t}-affix-wrapper-focused`]: { zIndex: 2 }
        }
      }
    };
  };
function Mm(e) {
  return $e(e, {
    inputAffixPadding: e.paddingXXS,
    inputPaddingVertical: Math.max(
      Math.round(((e.controlHeight - e.fontSize * e.lineHeight) / 2) * 10) /
        10 -
        e.lineWidth,
      3
    ),
    inputPaddingVerticalLG:
      Math.ceil(
        ((e.controlHeightLG - e.fontSizeLG * e.lineHeightLG) / 2) * 10
      ) /
        10 -
      e.lineWidth,
    inputPaddingVerticalSM: Math.max(
      Math.round(((e.controlHeightSM - e.fontSize * e.lineHeight) / 2) * 10) /
        10 -
        e.lineWidth,
      0
    ),
    inputPaddingHorizontal: e.paddingSM - e.lineWidth,
    inputPaddingHorizontalSM: e.paddingXS - e.lineWidth,
    inputPaddingHorizontalLG: e.controlPaddingHorizontal - e.lineWidth,
    inputBorderHoverColor: e.colorPrimaryHover,
    inputBorderActiveColor: e.colorPrimaryHover
  });
}
const Rm = e => {
    const { componentCls: t, inputPaddingHorizontal: n, paddingLG: o } = e,
      r = `${t}-textarea`;
    return {
      [r]: {
        position: 'relative',
        [`${r}-suffix`]: {
          position: 'absolute',
          top: 0,
          insetInlineEnd: n,
          bottom: 0,
          zIndex: 1,
          display: 'inline-flex',
          alignItems: 'center',
          margin: 'auto'
        },
        '&-status-error,\n        &-status-warning,\n        &-status-success,\n        &-status-validating': {
          [`&${r}-has-feedback`]: { [`${t}`]: { paddingInlineEnd: o } }
        },
        '&-show-count': {
          [`> ${t}`]: { height: '100%' },
          '&::after': {
            color: e.colorTextDescription,
            whiteSpace: 'nowrap',
            content: 'attr(data-count)',
            pointerEvents: 'none',
            float: 'right'
          }
        },
        '&-rtl': { '&::after': { float: 'left' } }
      }
    };
  },
  Dm = ft('Input', e => {
    const t = Mm(e);
    return [Tm(t), Rm(t), Pm(t), _m(t), Am(t), la(t)];
  });
function oi(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(r) {
          return Object.getOwnPropertyDescriptor(n, r).enumerable;
        })
      )),
      o.forEach(function(r) {
        Nm(e, r, n[r]);
      });
  }
  return e;
}
function Nm(e, t, n) {
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
var Oo = function(t, n) {
  var o = oi({}, t, n.attrs);
  return h(Mt, oi({}, o, { icon: fl }), null);
};
Oo.displayName = 'LeftOutlined';
Oo.inheritAttrs = !1;
const Ov = Oo,
  Bm = () => ot() && window.document.documentElement,
  Aa = e => {
    if (ot() && window.document.documentElement) {
      const t = Array.isArray(e) ? e : [e],
        { documentElement: n } = window.document;
      return t.some(o => o in n.style);
    }
    return !1;
  },
  zm = (e, t) => {
    if (!Aa(e)) return !1;
    const n = document.createElement('div'),
      o = n.style[e];
    return (n.style[e] = t), n.style[e] !== o;
  };
function Ev(e, t) {
  return !Array.isArray(e) && t !== void 0 ? zm(e, t) : Aa(e);
}
let Vt;
const Hm = () => {
    if (!Bm()) return !1;
    if (Vt !== void 0) return Vt;
    const e = document.createElement('div');
    return (
      (e.style.display = 'flex'),
      (e.style.flexDirection = 'column'),
      (e.style.rowGap = '1px'),
      e.appendChild(document.createElement('div')),
      e.appendChild(document.createElement('div')),
      document.body.appendChild(e),
      (Vt = e.scrollHeight === 1),
      document.body.removeChild(e),
      Vt
    );
  },
  Lm = () => {
    const e = B(!1);
    return (
      Ee(() => {
        e.value = Hm();
      }),
      e
    );
  };
function ri(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      o = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (o = o.concat(
        Object.getOwnPropertySymbols(n).filter(function(r) {
          return Object.getOwnPropertyDescriptor(n, r).enumerable;
        })
      )),
      o.forEach(function(r) {
        Fm(e, r, n[r]);
      });
  }
  return e;
}
function Fm(e, t, n) {
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
var Eo = function(t, n) {
  var o = ri({}, t, n.attrs);
  return h(Mt, ri({}, o, { icon: pl }), null);
};
Eo.displayName = 'EyeOutlined';
Eo.inheritAttrs = !1;
const Tv = Eo,
  xt = e => e != null && (Array.isArray(e) ? dt(e).length : !0);
function Iv(e) {
  return xt(e.prefix) || xt(e.suffix) || xt(e.allowClear);
}
function Pv(e) {
  return xt(e.addonBefore) || xt(e.addonAfter);
}
function jm(e) {
  return typeof e > 'u' || e === null ? '' : String(e);
}
function An(e, t, n, o) {
  if (!n) return;
  const r = t;
  if (t.type === 'click') {
    Object.defineProperty(r, 'target', { writable: !0 }),
      Object.defineProperty(r, 'currentTarget', { writable: !0 });
    const i = e.cloneNode(!0);
    (r.target = i), (r.currentTarget = i), (i.value = ''), n(r);
    return;
  }
  if (o !== void 0) {
    Object.defineProperty(r, 'target', { writable: !0 }),
      Object.defineProperty(r, 'currentTarget', { writable: !0 }),
      (r.target = e),
      (r.currentTarget = e),
      (e.value = o),
      n(r);
    return;
  }
  n(r);
}
function Wm(e, t) {
  if (!e) return;
  e.focus(t);
  const { cursor: n } = t || {};
  if (n) {
    const o = e.value.length;
    switch (n) {
      case 'start':
        e.setSelectionRange(0, 0);
        break;
      case 'end':
        e.setSelectionRange(o, o);
        break;
      default:
        e.setSelectionRange(0, o);
    }
  }
}
const Vm = () => ({
    addonBefore: _.any,
    addonAfter: _.any,
    prefix: _.any,
    suffix: _.any,
    clearIcon: _.any,
    affixWrapperClassName: String,
    groupClassName: String,
    wrapperClassName: String,
    inputClassName: String,
    allowClear: { type: Boolean, default: void 0 }
  }),
  Km = () =>
    f(f({}, Vm()), {
      value: { type: [String, Number, Symbol], default: void 0 },
      defaultValue: { type: [String, Number, Symbol], default: void 0 },
      inputElement: _.any,
      prefixCls: String,
      disabled: { type: Boolean, default: void 0 },
      focused: { type: Boolean, default: void 0 },
      triggerFocus: Function,
      readonly: { type: Boolean, default: void 0 },
      handleReset: Function,
      hidden: { type: Boolean, default: void 0 }
    }),
  Um = () =>
    f(f({}, Km()), {
      id: String,
      placeholder: { type: [String, Number] },
      autocomplete: String,
      type: el('text'),
      name: String,
      size: { type: String },
      autofocus: { type: Boolean, default: void 0 },
      lazy: { type: Boolean, default: !0 },
      maxlength: Number,
      loading: { type: Boolean, default: void 0 },
      bordered: { type: Boolean, default: void 0 },
      showCount: { type: [Boolean, Object] },
      htmlSize: Number,
      onPressEnter: Function,
      onKeydown: Function,
      onKeyup: Function,
      onFocus: Function,
      onBlur: Function,
      onChange: Function,
      onInput: Function,
      'onUpdate:value': Function,
      onCompositionstart: Function,
      onCompositionend: Function,
      valueModifiers: Object,
      hidden: { type: Boolean, default: void 0 },
      status: String
    }),
  Ma = () =>
    cn(Um(), [
      'wrapperClassName',
      'groupClassName',
      'inputClassName',
      'affixWrapperClassName'
    ]),
  _v = Ma,
  Ra = () =>
    f(f({}, cn(Ma(), ['prefix', 'addonBefore', 'addonAfter', 'suffix'])), {
      rows: Number,
      autosize: { type: [Boolean, Object], default: void 0 },
      autoSize: { type: [Boolean, Object], default: void 0 },
      onResize: { type: Function },
      onCompositionstart: Yt(),
      onCompositionend: Yt(),
      valueModifiers: Object
    }),
  ii = e => e != null && (Array.isArray(e) ? dt(e).length : !0);
function Gm(e) {
  return ii(e.addonBefore) || ii(e.addonAfter);
}
const Xm = ['text', 'input'],
  Ym = Y({
    compatConfig: { MODE: 3 },
    name: 'ClearableLabeledInput',
    inheritAttrs: !1,
    props: {
      prefixCls: String,
      inputType: _.oneOf(rt('text', 'input')),
      value: Fe(),
      defaultValue: Fe(),
      allowClear: { type: Boolean, default: void 0 },
      element: Fe(),
      handleReset: Function,
      disabled: { type: Boolean, default: void 0 },
      direction: { type: String },
      size: { type: String },
      suffix: Fe(),
      prefix: Fe(),
      addonBefore: Fe(),
      addonAfter: Fe(),
      readonly: { type: Boolean, default: void 0 },
      focused: { type: Boolean, default: void 0 },
      bordered: { type: Boolean, default: !0 },
      triggerFocus: { type: Function },
      hidden: Boolean,
      status: String,
      hashId: String
    },
    setup(e, t) {
      let { slots: n, attrs: o } = t;
      const r = ho.useInject(),
        i = l => {
          const {
              value: s,
              disabled: u,
              readonly: d,
              handleReset: c,
              suffix: m = n.suffix
            } = e,
            p = !u && !d && s,
            v = `${l}-clear-icon`;
          return h(
            tl,
            {
              onClick: c,
              onMousedown: g => g.preventDefault(),
              class: ie({ [`${v}-hidden`]: !p, [`${v}-has-suffix`]: !!m }, v),
              role: 'button'
            },
            null
          );
        },
        a = (l, s) => {
          const {
              value: u,
              allowClear: d,
              direction: c,
              bordered: m,
              hidden: p,
              status: v,
              addonAfter: g = n.addonAfter,
              addonBefore: b = n.addonBefore,
              hashId: y
            } = e,
            { status: $, hasFeedback: O } = r;
          if (!d) return be(s, { value: u, disabled: e.disabled });
          const z = ie(
            `${l}-affix-wrapper`,
            `${l}-affix-wrapper-textarea-with-clear-btn`,
            ta(`${l}-affix-wrapper`, na($, v), O),
            {
              [`${l}-affix-wrapper-rtl`]: c === 'rtl',
              [`${l}-affix-wrapper-borderless`]: !m,
              [`${o.class}`]: !Gm({ addonAfter: g, addonBefore: b }) && o.class
            },
            y
          );
          return h('span', { class: z, style: o.style, hidden: p }, [
            be(s, { style: null, value: u, disabled: e.disabled }),
            i(l)
          ]);
        };
      return () => {
        var l;
        const {
          prefixCls: s,
          inputType: u,
          element: d = (l = n.element) === null || l === void 0
            ? void 0
            : l.call(n)
        } = e;
        return u === Xm[0] ? a(s, d) : null;
      };
    }
  }),
  qm = `
 min-height:0 !important;
 max-height:none !important;
 height:0 !important;
 visibility:hidden !important;
 overflow:hidden !important;
 position:absolute !important;
 z-index:-1000 !important;
 top:0 !important;
 right:0 !important
`,
  Zm = [
    'letter-spacing',
    'line-height',
    'padding-top',
    'padding-bottom',
    'font-family',
    'font-weight',
    'font-size',
    'font-variant',
    'text-rendering',
    'text-transform',
    'width',
    'text-indent',
    'padding-left',
    'padding-right',
    'border-width',
    'box-sizing',
    'word-break'
  ],
  Mn = {};
let ge;
function km(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1;
  const n =
    e.getAttribute('id') ||
    e.getAttribute('data-reactid') ||
    e.getAttribute('name');
  if (t && Mn[n]) return Mn[n];
  const o = window.getComputedStyle(e),
    r =
      o.getPropertyValue('box-sizing') ||
      o.getPropertyValue('-moz-box-sizing') ||
      o.getPropertyValue('-webkit-box-sizing'),
    i =
      parseFloat(o.getPropertyValue('padding-bottom')) +
      parseFloat(o.getPropertyValue('padding-top')),
    a =
      parseFloat(o.getPropertyValue('border-bottom-width')) +
      parseFloat(o.getPropertyValue('border-top-width')),
    s = {
      sizingStyle: Zm.map(u => `${u}:${o.getPropertyValue(u)}`).join(';'),
      paddingSize: i,
      borderSize: a,
      boxSizing: r
    };
  return t && n && (Mn[n] = s), s;
}
function Qm(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1,
    n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : null,
    o = arguments.length > 3 && arguments[3] !== void 0 ? arguments[3] : null;
  ge ||
    ((ge = document.createElement('textarea')),
    ge.setAttribute('tab-index', '-1'),
    ge.setAttribute('aria-hidden', 'true'),
    document.body.appendChild(ge)),
    e.getAttribute('wrap')
      ? ge.setAttribute('wrap', e.getAttribute('wrap'))
      : ge.removeAttribute('wrap');
  const { paddingSize: r, borderSize: i, boxSizing: a, sizingStyle: l } = km(
    e,
    t
  );
  ge.setAttribute('style', `${l};${qm}`),
    (ge.value = e.value || e.placeholder || '');
  let s = Number.MIN_SAFE_INTEGER,
    u = Number.MAX_SAFE_INTEGER,
    d = ge.scrollHeight,
    c;
  if (
    (a === 'border-box' ? (d += i) : a === 'content-box' && (d -= r),
    n !== null || o !== null)
  ) {
    ge.value = ' ';
    const m = ge.scrollHeight - r;
    n !== null &&
      ((s = m * n),
      a === 'border-box' && (s = s + r + i),
      (d = Math.max(s, d))),
      o !== null &&
        ((u = m * o),
        a === 'border-box' && (u = u + r + i),
        (c = d > u ? '' : 'hidden'),
        (d = Math.min(u, d)));
  }
  return {
    height: `${d}px`,
    minHeight: `${s}px`,
    maxHeight: `${u}px`,
    overflowY: c,
    resize: 'none'
  };
}
const Rn = 0,
  ai = 1,
  Jm = 2,
  ev = Y({
    compatConfig: { MODE: 3 },
    name: 'ResizableTextArea',
    inheritAttrs: !1,
    props: Ra(),
    setup(e, t) {
      let { attrs: n, emit: o, expose: r } = t,
        i,
        a;
      const l = G(),
        s = G({}),
        u = G(Rn);
      we(() => {
        re.cancel(i), re.cancel(a);
      });
      const d = () => {
          try {
            if (document.activeElement === l.value) {
              const b = l.value.selectionStart,
                y = l.value.selectionEnd;
              l.value.setSelectionRange(b, y);
            }
          } catch {}
        },
        c = () => {
          const b = e.autoSize || e.autosize;
          if (!b || !l.value) return;
          const { minRows: y, maxRows: $ } = b;
          (s.value = Qm(l.value, !1, y, $)),
            (u.value = ai),
            re.cancel(a),
            (a = re(() => {
              (u.value = Jm),
                (a = re(() => {
                  (u.value = Rn), d();
                }));
            }));
        },
        m = () => {
          re.cancel(i), (i = re(c));
        },
        p = b => {
          if (u.value !== Rn) return;
          o('resize', b), (e.autoSize || e.autosize) && m();
        };
      Qn(
        e.autosize === void 0,
        'Input.TextArea',
        'autosize is deprecated, please use autoSize instead.'
      );
      const v = () => {
        const { prefixCls: b, autoSize: y, autosize: $, disabled: O } = e,
          z = cn(e, [
            'prefixCls',
            'onPressEnter',
            'autoSize',
            'autosize',
            'defaultValue',
            'allowClear',
            'type',
            'lazy',
            'maxlength',
            'valueModifiers'
          ]),
          I = ie(b, n.class, { [`${b}-disabled`]: O }),
          T = [
            n.style,
            s.value,
            u.value === ai ? { overflowX: 'hidden', overflowY: 'hidden' } : null
          ],
          P = f(f(f({}, z), n), { style: T, class: I });
        return (
          P.autofocus || delete P.autofocus,
          P.rows === 0 && delete P.rows,
          h(
            oo,
            { onResize: p, disabled: !(y || $) },
            {
              default: () => [
                sn(h('textarea', D(D({}, P), {}, { ref: l }), null), [[Dd]])
              ]
            }
          )
        );
      };
      ee(
        () => e.value,
        () => {
          Se(() => {
            c();
          });
        }
      ),
        Ee(() => {
          Se(() => {
            c();
          });
        });
      const g = He();
      return r({ resizeTextarea: c, textArea: l, instance: g }), () => v();
    }
  }),
  tv = ev;
function Da(e, t) {
  return [...(e || '')].slice(0, t).join('');
}
function li(e, t, n, o) {
  let r = n;
  return (
    e
      ? (r = Da(n, o))
      : [...(t || '')].length < n.length &&
        [...(n || '')].length > o &&
        (r = t),
    r
  );
}
const Av = Y({
  compatConfig: { MODE: 3 },
  name: 'ATextarea',
  inheritAttrs: !1,
  props: Ra(),
  setup(e, t) {
    let { attrs: n, expose: o, emit: r } = t;
    const i = Gd(),
      a = ho.useInject(),
      l = S(() => na(a.status, e.status)),
      s = B(e.value === void 0 ? e.defaultValue : e.value),
      u = B(),
      d = B(''),
      { prefixCls: c, size: m, direction: p } = ze('input', e),
      [v, g] = Dm(c),
      b = ci(),
      y = S(() => e.showCount === '' || e.showCount || !1),
      $ = S(() => Number(e.maxlength) > 0),
      O = B(!1),
      z = B(),
      I = B(0),
      T = x => {
        (O.value = !0),
          (z.value = d.value),
          (I.value = x.currentTarget.selectionStart),
          r('compositionstart', x);
      },
      P = x => {
        var H;
        O.value = !1;
        let F = x.currentTarget.value;
        if ($.value) {
          const N =
            I.value >= e.maxlength + 1 ||
            I.value ===
              ((H = z.value) === null || H === void 0 ? void 0 : H.length);
          F = li(N, z.value, F, e.maxlength);
        }
        F !== d.value && (A(F), An(x.currentTarget, x, k, F)),
          r('compositionend', x);
      },
      M = He();
    ee(
      () => e.value,
      () => {
        var x;
        'value' in M.vnode.props,
          (s.value = (x = e.value) !== null && x !== void 0 ? x : '');
      }
    );
    const j = x => {
        var H;
        Wm((H = u.value) === null || H === void 0 ? void 0 : H.textArea, x);
      },
      C = () => {
        var x, H;
        (H = (x = u.value) === null || x === void 0 ? void 0 : x.textArea) ===
          null ||
          H === void 0 ||
          H.blur();
      },
      A = (x, H) => {
        s.value !== x &&
          (e.value === void 0
            ? (s.value = x)
            : Se(() => {
                var F, N, U;
                u.value.textArea.value !== d.value &&
                  ((U =
                    (F = u.value) === null || F === void 0
                      ? void 0
                      : (N = F.instance).update) === null ||
                    U === void 0 ||
                    U.call(N));
              }),
          Se(() => {
            H && H();
          }));
      },
      q = x => {
        x.keyCode === 13 && r('pressEnter', x), r('keydown', x);
      },
      X = x => {
        const { onBlur: H } = e;
        H == null || H(x), i.onFieldBlur();
      },
      k = x => {
        r('update:value', x.target.value),
          r('change', x),
          r('input', x),
          i.onFieldChange();
      },
      w = x => {
        An(u.value.textArea, x, k),
          A('', () => {
            j();
          });
      },
      R = x => {
        const { composing: H } = x.target;
        let F = x.target.value;
        if (
          ((O.value = !!(x.isComposing || H)),
          !((O.value && e.lazy) || s.value === F))
        ) {
          if ($.value) {
            const N = x.target,
              U =
                N.selectionStart >= e.maxlength + 1 ||
                N.selectionStart === F.length ||
                !N.selectionStart;
            F = li(U, d.value, F, e.maxlength);
          }
          An(x.currentTarget, x, k, F), A(F);
        }
      },
      K = () => {
        var x, H;
        const { class: F } = n,
          { bordered: N = !0 } = e,
          U = f(f(f({}, cn(e, ['allowClear'])), n), {
            class: [
              {
                [`${c.value}-borderless`]: !N,
                [`${F}`]: F && !y.value,
                [`${c.value}-sm`]: m.value === 'small',
                [`${c.value}-lg`]: m.value === 'large'
              },
              ta(c.value, l.value),
              g.value
            ],
            disabled: b.value,
            showCount: null,
            prefixCls: c.value,
            onInput: R,
            onChange: R,
            onBlur: X,
            onKeydown: q,
            onCompositionstart: T,
            onCompositionend: P
          });
        return (
          !((x = e.valueModifiers) === null || x === void 0) &&
            x.lazy &&
            delete U.onInput,
          h(
            tv,
            D(
              D({}, U),
              {},
              {
                id:
                  (H = U == null ? void 0 : U.id) !== null && H !== void 0
                    ? H
                    : i.id.value,
                ref: u,
                maxlength: e.maxlength
              }
            ),
            null
          )
        );
      };
    return (
      o({ focus: j, blur: C, resizableTextArea: u }),
      Te(() => {
        let x = jm(s.value);
        !O.value &&
          $.value &&
          (e.value === null || e.value === void 0) &&
          (x = Da(x, e.maxlength)),
          (d.value = x);
      }),
      () => {
        var x;
        const { maxlength: H, bordered: F = !0, hidden: N } = e,
          { style: U, class: ne } = n,
          fe = f(f(f({}, e), n), {
            prefixCls: c.value,
            inputType: 'text',
            handleReset: w,
            direction: p.value,
            bordered: F,
            style: y.value ? void 0 : U,
            hashId: g.value,
            disabled: (x = e.disabled) !== null && x !== void 0 ? x : b.value
          });
        let ce = h(Ym, D(D({}, fe), {}, { value: d.value, status: e.status }), {
          element: K
        });
        if (y.value || a.hasFeedback) {
          const E = [...d.value].length;
          let W = '';
          typeof y.value == 'object'
            ? (W = y.value.formatter({
                value: d.value,
                count: E,
                maxlength: H
              }))
            : (W = `${E}${$.value ? ` / ${H}` : ''}`),
            (ce = h(
              'div',
              {
                hidden: N,
                class: ie(
                  `${c.value}-textarea`,
                  {
                    [`${c.value}-textarea-rtl`]: p.value === 'rtl',
                    [`${c.value}-textarea-show-count`]: y.value,
                    [`${c.value}-textarea-in-form-item`]: a.isFormItemInput
                  },
                  `${c.value}-textarea-show-count`,
                  ne,
                  g.value
                ),
                style: U,
                'data-count': typeof W != 'object' ? W : void 0
              },
              [
                ce,
                a.hasFeedback &&
                  h('span', { class: `${c.value}-textarea-suffix` }, [
                    a.feedbackIcon
                  ])
              ]
            ));
        }
        return v(ce);
      }
    );
  }
});
function Mv() {
  const e = document.documentElement.clientWidth,
    t = window.innerHeight || document.documentElement.clientHeight;
  return { width: e, height: t };
}
function Rv(e) {
  const t = e.getBoundingClientRect(),
    n = document.documentElement;
  return {
    left:
      t.left +
      (window.pageXOffset || n.scrollLeft) -
      (n.clientLeft || document.body.clientLeft || 0),
    top:
      t.top +
      (window.pageYOffset || n.scrollTop) -
      (n.clientTop || document.body.clientTop || 0)
  };
}
const nv = { small: 8, middle: 16, large: 24 },
  ov = () => ({
    prefixCls: String,
    size: { type: [String, Number, Array] },
    direction: _.oneOf(rt('horizontal', 'vertical')).def('horizontal'),
    align: _.oneOf(rt('start', 'end', 'center', 'baseline')),
    wrap: Xt()
  });
function rv(e) {
  return typeof e == 'string' ? nv[e] : e || 0;
}
const Ot = Y({
  compatConfig: { MODE: 3 },
  name: 'ASpace',
  inheritAttrs: !1,
  props: ov(),
  slots: Object,
  setup(e, t) {
    let { slots: n, attrs: o } = t;
    const { prefixCls: r, space: i, direction: a } = ze('space', e),
      [l, s] = oa(r),
      u = Lm(),
      d = S(() => {
        var y, $, O;
        return (O =
          (y = e.size) !== null && y !== void 0
            ? y
            : ($ = i == null ? void 0 : i.value) === null || $ === void 0
            ? void 0
            : $.size) !== null && O !== void 0
          ? O
          : 'small';
      }),
      c = G(),
      m = G();
    ee(
      d,
      () => {
        [c.value, m.value] = (Array.isArray(d.value)
          ? d.value
          : [d.value, d.value]
        ).map(y => rv(y));
      },
      { immediate: !0 }
    );
    const p = S(() =>
        e.align === void 0 && e.direction === 'horizontal' ? 'center' : e.align
      ),
      v = S(() =>
        ie(r.value, s.value, `${r.value}-${e.direction}`, {
          [`${r.value}-rtl`]: a.value === 'rtl',
          [`${r.value}-align-${p.value}`]: p.value
        })
      ),
      g = S(() => (a.value === 'rtl' ? 'marginLeft' : 'marginRight')),
      b = S(() => {
        const y = {};
        return (
          u.value &&
            ((y.columnGap = `${c.value}px`), (y.rowGap = `${m.value}px`)),
          f(
            f({}, y),
            e.wrap && { flexWrap: 'wrap', marginBottom: `${-m.value}px` }
          )
        );
      });
    return () => {
      var y, $;
      const { wrap: O, direction: z = 'horizontal' } = e,
        I = (y = n.default) === null || y === void 0 ? void 0 : y.call(n),
        T = dt(I),
        P = T.length;
      if (P === 0) return null;
      const M = ($ = n.split) === null || $ === void 0 ? void 0 : $.call(n),
        j = `${r.value}-item`,
        C = c.value,
        A = P - 1;
      return h(
        'div',
        D(
          D({}, o),
          {},
          { class: [v.value, o.class], style: [b.value, o.style] }
        ),
        [
          T.map((q, X) => {
            const k = I.indexOf(q);
            let w = {};
            return (
              u.value ||
                (z === 'vertical'
                  ? X < A && (w = { marginBottom: `${C / (M ? 2 : 1)}px` })
                  : (w = f(
                      f({}, X < A && { [g.value]: `${C / (M ? 2 : 1)}px` }),
                      O && { paddingBottom: `${m.value}px` }
                    ))),
              l(
                h(it, { key: k }, [
                  h('div', { class: j, style: w }, [q]),
                  X < A &&
                    M &&
                    h('span', { class: `${j}-split`, style: w }, [M])
                ])
              )
            );
          })
        ]
      );
    };
  }
});
Ot.Compact = Xn;
Ot.install = function(e) {
  return e.component(Ot.name, Ot), e.component(Xn.name, Xn), e;
};
const Dv = Ot,
  Nv = ll('vendor', () => {
    const e = sl(),
      t = G([]),
      n = G({}),
      o = nl,
      r = G(!1),
      i = G(!1),
      a = G(1),
      l = G({ page: 1, limit: 10, search: '', status: '' }),
      s = G([
        { title: ye('shopName'), dataIndex: 'shopname', key: 'shop_name' },
        { title: ye('owner'), dataIndex: 'displayname', key: 'owner' },
        {
          title: ye('outstandingCommissions'),
          dataIndex: 'commission_due',
          key: 'commission_due'
        },
        {
          title: ye('commissionRate'),
          dataIndex: 'commission_rate',
          key: 'commission_rate'
        },
        {
          title: ye('registeredDate'),
          dataIndex: 'registered_date',
          key: 'registered_date'
        },
        { title: ye('status'), dataIndex: 'status', key: 'status' },
        { title: ye('actions'), dataIndex: 'action', key: 'action' }
      ]),
      u = async () => {
        (r.value = !0), (t.value = []);
        const v = await o.getVendors(l.value);
        (t.value = v.vendors),
          (n.value = v.vendor_count),
          (a.value = v.result_count),
          (r.value = !1);
      };
    return {
      vendors: t,
      vendorsCount: n,
      vendorAPI: o,
      onLoading: r,
      isSearch: i,
      vendorsQueryParams: l,
      tableColumns: s,
      resultCount: a,
      fetchVendors: u,
      onSearch: async () => {
        l.value.search !== '' ? (i.value = !0) : (i.value = !1), await u();
      },
      navigationFilter: async v => {
        (l.value.status = v),
          (l.value.search = ''),
          v === '' ? (i.value = !1) : (i.value = !0),
          (l.value.page = 1),
          await u();
      },
      setVendorStatus: async (v, g) => {
        const b = await o.setVendorStatus(v, g);
        b.success
          ? Dt.success({ message: ye('success'), description: b.message })
          : Dt.error({ message: ye('error'), description: b.message }),
          g === 'deactivate' && e.currentRoute.value.name === 'vendor-edit'
            ? e.back()
            : await u();
      },
      setVendorApproval: async (v, g) => {
        const b = await o.setVendorApproval(v, g);
        b.success
          ? Dt.success({ message: ye('success'), description: b.message })
          : Dt.error({ message: ye('error'), description: b.message }),
          await u();
      }
    };
  });
export {
  Ml as $,
  Mv as A,
  $t as B,
  Rv as C,
  wv as D,
  Gp as E,
  aa as F,
  Cv as G,
  Tv as H,
  Bm as I,
  Gt as J,
  _d as K,
  Ov as L,
  qe as M,
  Sv as N,
  uv as O,
  Id as P,
  Mm as Q,
  oo as R,
  Dv as S,
  Av as T,
  Ev as U,
  cp as V,
  vv as W,
  rp as X,
  kt as Y,
  $v as Z,
  Yf as _,
  st as a,
  wp as a0,
  tp as a1,
  yv as a2,
  cv as a3,
  la as a4,
  xo as a5,
  kn as a6,
  Om as a7,
  Em as a8,
  xm as a9,
  Dm as aA,
  Lm as aB,
  _e as aC,
  Cp as aD,
  op as aE,
  Al as aF,
  kf as aG,
  xd as aH,
  Qf as aI,
  Ia as aJ,
  ki as aK,
  dv as aL,
  Di as aM,
  um as aN,
  jf as aO,
  _a as aa,
  Pa as ab,
  Gd as ac,
  ho as ad,
  na as ae,
  vf as af,
  ta as ag,
  bv as ah,
  gv as ai,
  mo as aj,
  Dd as ak,
  Ct as al,
  et as am,
  Yc as an,
  $f as ao,
  Sf as ap,
  wf as aq,
  Cf as ar,
  Km as as,
  Iv as at,
  Pv as au,
  Um as av,
  jm as aw,
  Wm as ax,
  An as ay,
  _v as az,
  hv as b,
  Vi as c,
  Xu as d,
  Ni as e,
  Ui as f,
  vt as g,
  pc as h,
  _t as i,
  ut as j,
  mt as k,
  Hi as l,
  ia as m,
  Ve as n,
  xv as o,
  Ue as p,
  At as q,
  be as r,
  Mr as s,
  cn as t,
  Nv as u,
  lt as v,
  re as w,
  pv as x,
  mv as y,
  fv as z
};

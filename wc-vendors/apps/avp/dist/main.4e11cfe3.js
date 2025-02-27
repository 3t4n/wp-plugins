import {
  d as M,
  a as Ra,
  w as Ia,
  u as _e,
  o as ka,
  c as v,
  b as mr,
  F as Me,
  i as rt,
  C as ja,
  T as Na,
  e as P,
  f as ae,
  p as fe,
  r as B,
  s as oe,
  g as de,
  j as ot,
  k as Ma,
  l as La,
  m as Se,
  h as ln,
  t as Fa,
  v as Da,
  n as So,
  x as xo,
  y as Ha,
  z as In,
  A as wo,
  B as Oo,
  D as gr,
  E as Po,
  G as Ba,
  H as za,
  I as Ua,
  J as qa
} from './common/vendor.e5025a5c.js';
import {
  T as F,
  g as Je,
  b as Wa,
  L as Va,
  C as Ga,
  a as Xa,
  c as Ka,
  E as Ja,
  I as Ya,
  d as Qa,
  e as Za,
  f as es,
  h as ts
} from './common/antd.e3fbf92b.js';
const ns = 'modulepreload',
  rs = function(e, t) {
    return e[0] === '.' ? new URL(e, t).href : e;
  },
  hr = {},
  Ct = function(t, n, r) {
    if (!n || n.length === 0) return t();
    const o = document.getElementsByTagName('link');
    return Promise.all(
      n.map(i => {
        if (((i = rs(i, r)), i in hr)) return;
        hr[i] = !0;
        const a = i.endsWith('.css'),
          s = a ? '[rel="stylesheet"]' : '';
        if (!!r)
          for (let l = o.length - 1; l >= 0; l--) {
            const u = o[l];
            if (u.href === i && (!a || u.rel === 'stylesheet')) return;
          }
        else if (document.querySelector(`link[href="${i}"]${s}`)) return;
        const c = document.createElement('link');
        if (
          ((c.rel = a ? 'stylesheet' : ns),
          a || ((c.as = 'script'), (c.crossOrigin = '')),
          (c.href = i),
          document.head.appendChild(c),
          a)
        )
          return new Promise((l, u) => {
            c.addEventListener('load', l),
              c.addEventListener('error', () =>
                u(new Error(`Unable to preload CSS for ${i}`))
              );
          });
      })
    )
      .then(() => t())
      .catch(i => {
        const a = new Event('vite:preloadError', { cancelable: !0 });
        if (((a.payload = i), window.dispatchEvent(a), !a.defaultPrevented))
          throw i;
      });
  },
  os = M({
    __name: 'App',
    setup(e) {
      const t = mr(() =>
          Ct(
            () => import('./components/Admin.e0123fb1.js'),
            [
              window.wcv_avp.pluginDirUrl +
                '/dist/components/Admin.e0123fb1.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/vendor.e5025a5c.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/antd.e3fbf92b.js'
            ],
            import.meta.url
          )
        ),
        n = mr(() =>
          Ct(
            () => import('./components/Spinner.1dfdcf82.js'),
            [
              window.wcv_avp.pluginDirUrl +
                '/dist/components/Spinner.1dfdcf82.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/vendor.e5025a5c.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.f3d5a503.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/initDefaultProps.d90010a5.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/antd.e3fbf92b.js'
            ],
            import.meta.url
          )
        );
      return (r, o) => (
        ka(), Ra(_e(n), null, { default: Ia(() => [v(_e(t))]), _: 1 })
      );
    }
  }),
  is = (e, t) => {
    const n = e.__vccOpts || e;
    for (const [r, o] of t) n[r] = o;
    return n;
  },
  as = is(os, [
    [
      '__file',
      '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/App.vue'
    ]
  ]);
function Ye(e) {
  '@babel/helpers - typeof';
  return (
    (Ye =
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
    Ye(e)
  );
}
function ss(e, t) {
  if (Ye(e) !== 'object' || e === null) return e;
  var n = e[Symbol.toPrimitive];
  if (n !== void 0) {
    var r = n.call(e, t || 'default');
    if (Ye(r) !== 'object') return r;
    throw new TypeError('@@toPrimitive must return a primitive value.');
  }
  return (t === 'string' ? String : Number)(e);
}
function ls(e) {
  var t = ss(e, 'string');
  return Ye(t) === 'symbol' ? t : String(t);
}
function cs(e, t, n) {
  return (
    (t = ls(t)),
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
function yr(e, t) {
  var n = Object.keys(e);
  if (Object.getOwnPropertySymbols) {
    var r = Object.getOwnPropertySymbols(e);
    t &&
      (r = r.filter(function(o) {
        return Object.getOwnPropertyDescriptor(e, o).enumerable;
      })),
      n.push.apply(n, r);
  }
  return n;
}
function D(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? arguments[t] : {};
    t % 2
      ? yr(Object(n), !0).forEach(function(r) {
          cs(e, r, n[r]);
        })
      : Object.getOwnPropertyDescriptors
      ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n))
      : yr(Object(n)).forEach(function(r) {
          Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(n, r));
        });
  }
  return e;
}
function y() {
  return (
    (y = Object.assign
      ? Object.assign.bind()
      : function(e) {
          for (var t = 1; t < arguments.length; t++) {
            var n = arguments[t];
            for (var r in n)
              Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r]);
          }
          return e;
        }),
    y.apply(this, arguments)
  );
}
const us = e => typeof e == 'function',
  fs = Array.isArray,
  ds = e => typeof e == 'string',
  ps = e => e !== null && typeof e == 'object',
  ms = /^on[^a-z]/,
  gs = e => ms.test(e),
  kn = e => {
    const t = Object.create(null);
    return n => t[n] || (t[n] = e(n));
  },
  hs = /-(\w)/g,
  jn = kn(e => e.replace(hs, (t, n) => (n ? n.toUpperCase() : ''))),
  ys = /\B([A-Z])/g,
  vs = kn(e => e.replace(ys, '-$1').toLowerCase()),
  Dp = kn(e => e.charAt(0).toUpperCase() + e.slice(1)),
  bs = Object.prototype.hasOwnProperty,
  vr = (e, t) => bs.call(e, t);
function Cs(e, t, n, r) {
  const o = e[n];
  if (o != null) {
    const i = vr(o, 'default');
    if (i && r === void 0) {
      const a = o.default;
      r = o.type !== Function && us(a) ? a() : a;
    }
    o.type === Boolean && (!vr(t, n) && !i ? (r = !1) : r === '' && (r = !0));
  }
  return r;
}
function Hp(e) {
  return typeof e == 'number' ? `${e}px` : e;
}
function Pe(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {},
    n = arguments.length > 2 ? arguments[2] : void 0;
  return typeof e == 'function' ? e(t) : e ?? n;
}
function Ss(e) {
  let t;
  const n = new Promise(o => {
      t = e(() => {
        o(!0);
      });
    }),
    r = () => {
      t == null || t();
    };
  return (r.then = (o, i) => n.then(o, i)), (r.promise = n), r;
}
function G() {
  const e = [];
  for (let t = 0; t < arguments.length; t++) {
    const n = t < 0 || arguments.length <= t ? void 0 : arguments[t];
    if (n) {
      if (ds(n)) e.push(n);
      else if (fs(n))
        for (let r = 0; r < n.length; r++) {
          const o = G(n[r]);
          o && e.push(o);
        }
      else if (ps(n)) for (const r in n) n[r] && e.push(r);
    }
  }
  return e.join(' ');
}
const xs = e => e != null && e !== '',
  ws = xs,
  Os = e => {
    const t = Object.keys(e),
      n = {},
      r = {},
      o = {};
    for (let i = 0, a = t.length; i < a; i++) {
      const s = t[i];
      gs(s)
        ? ((n[s[2].toLowerCase() + s.slice(3)] = e[s]), (r[s] = e[s]))
        : (o[s] = e[s]);
    }
    return { onEvents: r, events: n, extraAttrs: o };
  },
  Ps = function() {
    let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : '',
      t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1;
    const n = {},
      r = /;(?![^(]*\))/g,
      o = /:(.+)/;
    return typeof e == 'object'
      ? e
      : (e.split(r).forEach(function(i) {
          if (i) {
            const a = i.split(o);
            if (a.length > 1) {
              const s = t ? jn(a[0].trim()) : a[0].trim();
              n[s] = a[1].trim();
            }
          }
        }),
        n);
  },
  Bp = (e, t) => e[t] !== void 0,
  Ts = Symbol('skipFlatten'),
  $e = function() {
    let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : [],
      t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !0;
    const n = Array.isArray(e) ? e : [e],
      r = [];
    return (
      n.forEach(o => {
        Array.isArray(o)
          ? r.push(...$e(o, t))
          : o && o.type === Me
          ? o.key === Ts
            ? r.push(o)
            : r.push(...$e(o.children, t))
          : o && rt(o)
          ? t && !To(o)
            ? r.push(o)
            : t || r.push(o)
          : ws(o) && r.push(o);
      }),
      r
    );
  },
  zp = function(e) {
    let t =
        arguments.length > 1 && arguments[1] !== void 0
          ? arguments[1]
          : 'default',
      n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : {};
    if (rt(e))
      return e.type === Me
        ? t === 'default'
          ? $e(e.children)
          : []
        : e.children && e.children[t]
        ? $e(e.children[t](n))
        : [];
    {
      const r = e.$slots[t] && e.$slots[t](n);
      return $e(r);
    }
  },
  Up = e => {
    var t;
    let n =
      ((t = e == null ? void 0 : e.vnode) === null || t === void 0
        ? void 0
        : t.el) ||
      (e && (e.$el || e));
    for (; n && !n.tagName; ) n = n.nextSibling;
    return n;
  },
  qp = e => {
    const t = {};
    if (e.$ && e.$.vnode) {
      const n = e.$.vnode.props || {};
      Object.keys(e.$props).forEach(r => {
        const o = e.$props[r],
          i = vs(r);
        (o !== void 0 || i in n) && (t[r] = o);
      });
    } else if (rt(e) && typeof e.type == 'object') {
      const n = e.props || {},
        r = {};
      Object.keys(n).forEach(i => {
        r[jn(i)] = n[i];
      });
      const o = e.type.props || {};
      Object.keys(o).forEach(i => {
        const a = Cs(o, r, i, r[i]);
        (a !== void 0 || i in r) && (t[i] = a);
      });
    }
    return t;
  },
  Wp = function(e) {
    let t =
        arguments.length > 1 && arguments[1] !== void 0
          ? arguments[1]
          : 'default',
      n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : e,
      r = arguments.length > 3 && arguments[3] !== void 0 ? arguments[3] : !0,
      o;
    if (e.$) {
      const i = e[t];
      if (i !== void 0) return typeof i == 'function' && r ? i(n) : i;
      (o = e.$slots[t]), (o = r && o ? o(n) : o);
    } else if (rt(e)) {
      const i = e.props && e.props[t];
      if (i !== void 0 && e.props !== null)
        return typeof i == 'function' && r ? i(n) : i;
      e.type === Me
        ? (o = e.children)
        : e.children &&
          e.children[t] &&
          ((o = e.children[t]), (o = r && o ? o(n) : o));
    }
    return (
      Array.isArray(o) &&
        ((o = $e(o)),
        (o = o.length === 1 ? o[0] : o),
        (o = o.length === 0 ? void 0 : o)),
      o
    );
  };
function Vp() {
  let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : {},
    t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !0,
    n = {};
  return (
    e.$ ? (n = y(y({}, n), e.$attrs)) : (n = y(y({}, n), e.props)),
    Os(n)[t ? 'onEvents' : 'events']
  );
}
function Gp(e, t) {
  let r = ((rt(e) ? e.props : e.$attrs) || {}).style || {};
  if (typeof r == 'string') r = Ps(r, t);
  else if (t && r) {
    const o = {};
    return Object.keys(r).forEach(i => (o[jn(i)] = r[i])), o;
  }
  return r;
}
function Xp(e) {
  return e.length === 1 && e[0].type === Me;
}
function To(e) {
  return (
    e &&
    (e.type === ja ||
      (e.type === Me && e.children.length === 0) ||
      (e.type === Na && e.children.trim() === ''))
  );
}
function $o() {
  let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : [];
  const t = [];
  return (
    e.forEach(n => {
      Array.isArray(n)
        ? t.push(...n)
        : (n == null ? void 0 : n.type) === Me
        ? t.push(...$o(n.children))
        : t.push(n);
    }),
    t.filter(n => !To(n))
  );
}
function Kp(e) {
  return (
    Array.isArray(e) && e.length === 1 && (e = e[0]),
    e && e.__v_isVNode && typeof e.type != 'symbol'
  );
}
function Jp(e, t) {
  let n =
    arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : 'default';
  var r, o;
  return (r = t[n]) !== null && r !== void 0
    ? r
    : (o = e[n]) === null || o === void 0
    ? void 0
    : o.call(e);
}
const $s = function() {
    for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++)
      t[n] = arguments[n];
    return t;
  },
  Yp = function() {
    for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++)
      t[n] = arguments[n];
    return t;
  },
  Nn = e => {
    const t = e;
    return (
      (t.install = function(n) {
        n.component(t.displayName || t.name, e);
      }),
      e
    );
  };
function Qp() {
  return { type: [Function, Array] };
}
function K(e) {
  return { type: Object, default: e };
}
function Yt(e) {
  return { type: Boolean, default: e };
}
function Zp(e) {
  return { type: Function, default: e };
}
function cn(e, t) {
  const n = { validator: () => !0, default: e };
  return n;
}
function br(e) {
  return { type: Array, default: e };
}
function Cr(e) {
  return { type: String, default: e };
}
function Es(e, t) {
  return e ? { type: e, default: t } : cn(t);
}
const Mn = 'anticon',
  _s = Symbol('GlobalFormContextKey'),
  As = e => {
    fe(_s, e);
  },
  Rs = () => ({
    iconPrefixCls: String,
    getTargetContainer: { type: Function },
    getPopupContainer: { type: Function },
    prefixCls: String,
    getPrefixCls: { type: Function },
    renderEmpty: { type: Function },
    transformCellText: { type: Function },
    csp: K(),
    input: K(),
    autoInsertSpaceInButton: { type: Boolean, default: void 0 },
    locale: K(),
    pageHeader: K(),
    componentSize: { type: String },
    componentDisabled: { type: Boolean, default: void 0 },
    direction: { type: String, default: 'ltr' },
    space: K(),
    virtual: { type: Boolean, default: void 0 },
    dropdownMatchSelectWidth: { type: [Number, Boolean], default: !0 },
    form: K(),
    pagination: K(),
    theme: K(),
    select: K()
  }),
  Ln = Symbol('configProvider'),
  Eo = {
    getPrefixCls: (e, t) => t || (e ? `ant-${e}` : 'ant'),
    iconPrefixCls: P(() => Mn),
    getPopupContainer: P(() => () => document.body),
    direction: P(() => 'ltr')
  },
  _o = () => ae(Ln, Eo),
  Is = e => fe(Ln, e),
  Ao = Symbol('DisabledContextKey'),
  Ro = () => ae(Ao, B(void 0)),
  ks = e => {
    const t = Ro();
    return (
      fe(
        Ao,
        P(() => {
          var n;
          return (n = e.value) !== null && n !== void 0 ? n : t.value;
        })
      ),
      e
    );
  },
  js = {
    items_per_page: '/ page',
    jump_to: 'Go to',
    jump_to_confirm: 'confirm',
    page: '',
    prev_page: 'Previous Page',
    next_page: 'Next Page',
    prev_5: 'Previous 5 Pages',
    next_5: 'Next 5 Pages',
    prev_3: 'Previous 3 Pages',
    next_3: 'Next 3 Pages'
  },
  Ns = {
    locale: 'en_US',
    today: 'Today',
    now: 'Now',
    backToToday: 'Back to today',
    ok: 'Ok',
    clear: 'Clear',
    month: 'Month',
    year: 'Year',
    timeSelect: 'select time',
    dateSelect: 'select date',
    weekSelect: 'Choose a week',
    monthSelect: 'Choose a month',
    yearSelect: 'Choose a year',
    decadeSelect: 'Choose a decade',
    yearFormat: 'YYYY',
    dateFormat: 'M/D/YYYY',
    dayFormat: 'D',
    dateTimeFormat: 'M/D/YYYY HH:mm:ss',
    monthBeforeYear: !0,
    previousMonth: 'Previous month (PageUp)',
    nextMonth: 'Next month (PageDown)',
    previousYear: 'Last year (Control + left)',
    nextYear: 'Next year (Control + right)',
    previousDecade: 'Last decade',
    nextDecade: 'Next decade',
    previousCentury: 'Last century',
    nextCentury: 'Next century'
  },
  Ms = Ns,
  Ls = {
    placeholder: 'Select time',
    rangePlaceholder: ['Start time', 'End time']
  },
  Io = Ls,
  Fs = {
    lang: y(
      {
        placeholder: 'Select date',
        yearPlaceholder: 'Select year',
        quarterPlaceholder: 'Select quarter',
        monthPlaceholder: 'Select month',
        weekPlaceholder: 'Select week',
        rangePlaceholder: ['Start date', 'End date'],
        rangeYearPlaceholder: ['Start year', 'End year'],
        rangeQuarterPlaceholder: ['Start quarter', 'End quarter'],
        rangeMonthPlaceholder: ['Start month', 'End month'],
        rangeWeekPlaceholder: ['Start week', 'End week']
      },
      Ms
    ),
    timePickerLocale: y({}, Io)
  },
  Sr = Fs,
  W = '${label} is not a valid ${type}',
  Ds = {
    locale: 'en',
    Pagination: js,
    DatePicker: Sr,
    TimePicker: Io,
    Calendar: Sr,
    global: { placeholder: 'Please select' },
    Table: {
      filterTitle: 'Filter menu',
      filterConfirm: 'OK',
      filterReset: 'Reset',
      filterEmptyText: 'No filters',
      filterCheckall: 'Select all items',
      filterSearchPlaceholder: 'Search in filters',
      emptyText: 'No data',
      selectAll: 'Select current page',
      selectInvert: 'Invert current page',
      selectNone: 'Clear all data',
      selectionAll: 'Select all data',
      sortTitle: 'Sort',
      expand: 'Expand row',
      collapse: 'Collapse row',
      triggerDesc: 'Click to sort descending',
      triggerAsc: 'Click to sort ascending',
      cancelSort: 'Click to cancel sorting'
    },
    Tour: { Next: 'Next', Previous: 'Previous', Finish: 'Finish' },
    Modal: { okText: 'OK', cancelText: 'Cancel', justOkText: 'OK' },
    Popconfirm: { okText: 'OK', cancelText: 'Cancel' },
    Transfer: {
      titles: ['', ''],
      searchPlaceholder: 'Search here',
      itemUnit: 'item',
      itemsUnit: 'items',
      remove: 'Remove',
      selectCurrent: 'Select current page',
      removeCurrent: 'Remove current page',
      selectAll: 'Select all data',
      removeAll: 'Remove all data',
      selectInvert: 'Invert current page'
    },
    Upload: {
      uploading: 'Uploading...',
      removeFile: 'Remove file',
      uploadError: 'Upload error',
      previewFile: 'Preview file',
      downloadFile: 'Download file'
    },
    Empty: { description: 'No data' },
    Icon: { icon: 'icon' },
    Text: { edit: 'Edit', copy: 'Copy', copied: 'Copied', expand: 'Expand' },
    PageHeader: { back: 'Back' },
    Form: {
      optional: '(optional)',
      defaultValidateMessages: {
        default: 'Field validation error for ${label}',
        required: 'Please enter ${label}',
        enum: '${label} must be one of [${enum}]',
        whitespace: '${label} cannot be a blank character',
        date: {
          format: '${label} date format is invalid',
          parse: '${label} cannot be converted to a date',
          invalid: '${label} is an invalid date'
        },
        types: {
          string: W,
          method: W,
          array: W,
          object: W,
          number: W,
          date: W,
          boolean: W,
          integer: W,
          float: W,
          regexp: W,
          email: W,
          url: W,
          hex: W
        },
        string: {
          len: '${label} must be ${len} characters',
          min: '${label} must be at least ${min} characters',
          max: '${label} must be up to ${max} characters',
          range: '${label} must be between ${min}-${max} characters'
        },
        number: {
          len: '${label} must be equal to ${len}',
          min: '${label} must be minimum ${min}',
          max: '${label} must be maximum ${max}',
          range: '${label} must be between ${min}-${max}'
        },
        array: {
          len: 'Must be ${len} ${label}',
          min: 'At least ${min} ${label}',
          max: 'At most ${max} ${label}',
          range: 'The amount of ${label} must be between ${min}-${max}'
        },
        pattern: { mismatch: '${label} does not match the pattern ${pattern}' }
      }
    },
    Image: { preview: 'Preview' },
    QRCode: { expired: 'QR code expired', refresh: 'Refresh' }
  },
  Ae = Ds,
  ko = M({
    compatConfig: { MODE: 3 },
    name: 'LocaleReceiver',
    props: {
      componentName: String,
      defaultLocale: { type: [Object, Function] },
      children: { type: Function }
    },
    setup(e, t) {
      let { slots: n } = t;
      const r = ae('localeData', {}),
        o = P(() => {
          const { componentName: a = 'global', defaultLocale: s } = e,
            f = s || Ae[a || 'global'],
            { antLocale: c } = r,
            l = a && c ? c[a] : {};
          return y(y({}, typeof f == 'function' ? f() : f), l || {});
        }),
        i = P(() => {
          const { antLocale: a } = r,
            s = a && a.locale;
          return a && a.exist && !s ? Ae.locale : s;
        });
      return () => {
        const a = e.children || n.default,
          { antLocale: s } = r;
        return a == null ? void 0 : a(o.value, i.value, s);
      };
    }
  });
function em(e, t, n) {
  const r = ae('localeData', {});
  return [
    P(() => {
      const { antLocale: i } = r,
        a = _e(t) || Ae[e || 'global'],
        s = e && i ? i[e] : {};
      return y(
        y(y({}, typeof a == 'function' ? a() : a), s || {}),
        _e(n) || {}
      );
    })
  ];
}
function Fn(e) {
  for (var t = 0, n, r = 0, o = e.length; o >= 4; ++r, o -= 4)
    (n =
      (e.charCodeAt(r) & 255) |
      ((e.charCodeAt(++r) & 255) << 8) |
      ((e.charCodeAt(++r) & 255) << 16) |
      ((e.charCodeAt(++r) & 255) << 24)),
      (n = (n & 65535) * 1540483477 + (((n >>> 16) * 59797) << 16)),
      (n ^= n >>> 24),
      (t =
        ((n & 65535) * 1540483477 + (((n >>> 16) * 59797) << 16)) ^
        ((t & 65535) * 1540483477 + (((t >>> 16) * 59797) << 16)));
  switch (o) {
    case 3:
      t ^= (e.charCodeAt(r + 2) & 255) << 16;
    case 2:
      t ^= (e.charCodeAt(r + 1) & 255) << 8;
    case 1:
      (t ^= e.charCodeAt(r) & 255),
        (t = (t & 65535) * 1540483477 + (((t >>> 16) * 59797) << 16));
  }
  return (
    (t ^= t >>> 13),
    (t = (t & 65535) * 1540483477 + (((t >>> 16) * 59797) << 16)),
    ((t ^ (t >>> 15)) >>> 0).toString(36)
  );
}
const xr = '%';
class Hs {
  constructor(t) {
    (this.cache = new Map()), (this.instanceId = t);
  }
  get(t) {
    return this.cache.get(Array.isArray(t) ? t.join(xr) : t) || null;
  }
  update(t, n) {
    const r = Array.isArray(t) ? t.join(xr) : t,
      o = this.cache.get(r),
      i = n(o);
    i === null ? this.cache.delete(r) : this.cache.set(r, i);
  }
}
const Bs = Hs,
  jo = 'data-token-hash',
  ye = 'data-css-hash',
  zs = 'data-cache-path',
  Te = '__cssinjs_instance__';
function St() {
  const e = Math.random()
    .toString(12)
    .slice(2);
  if (typeof document < 'u' && document.head && document.body) {
    const t = document.body.querySelectorAll(`style[${ye}]`) || [],
      { firstChild: n } = document.head;
    Array.from(t).forEach(o => {
      (o[Te] = o[Te] || e), o[Te] === e && document.head.insertBefore(o, n);
    });
    const r = {};
    Array.from(document.querySelectorAll(`style[${ye}]`)).forEach(o => {
      var i;
      const a = o.getAttribute(ye);
      r[a]
        ? o[Te] === e &&
          ((i = o.parentNode) === null || i === void 0 || i.removeChild(o))
        : (r[a] = !0);
    });
  }
  return new Bs(e);
}
const No = Symbol('StyleContextKey'),
  Mo = { cache: St(), defaultCache: !0, hashPriority: 'low' },
  _t = () => ae(No, oe(y(y({}, Mo), { cache: St() }))),
  Us = e => {
    const t = _t(),
      n = oe(y(y({}, Mo), { cache: St() }));
    return (
      de(
        [() => _e(e), t],
        () => {
          const r = y({}, t.value),
            o = _e(e);
          Object.keys(o).forEach(a => {
            const s = o[a];
            o[a] !== void 0 && (r[a] = s);
          });
          const { cache: i } = o;
          (r.cache = r.cache || St()),
            (r.defaultCache = !i && t.value.defaultCache),
            (n.value = r);
        },
        { immediate: !0 }
      ),
      fe(No, n),
      n
    );
  },
  qs = () => ({
    autoClear: Yt(),
    mock: Cr(),
    cache: K(),
    defaultCache: Yt(),
    hashPriority: Cr(),
    container: Es(),
    ssrInline: Yt(),
    transformers: br(),
    linters: br()
  });
Nn(
  M({
    name: 'AStyleProvider',
    inheritAttrs: !1,
    props: qs(),
    setup(e, t) {
      let { slots: n } = t;
      return (
        Us(e),
        () => {
          var r;
          return (r = n.default) === null || r === void 0 ? void 0 : r.call(n);
        }
      );
    }
  })
);
let un = !1;
function Ws() {
  return un;
}
const Vs = Ws;
if (typeof module < 'u' && module && module.hot && typeof window < 'u') {
  const e = window;
  if (typeof e.webpackHotUpdate == 'function') {
    const t = e.webpackHotUpdate;
    e.webpackHotUpdate = function() {
      return (
        (un = !0),
        setTimeout(() => {
          un = !1;
        }, 0),
        t(...arguments)
      );
    };
  }
}
function Lo(e, t, n, r) {
  const o = _t(),
    i = oe(''),
    a = oe();
  ot(() => {
    i.value = [e, ...t.value].join('%');
  });
  const s = Vs(),
    f = c => {
      o.value.cache.update(c, l => {
        const [u = 0, d] = l || [];
        return u - 1 === 0 ? (r == null || r(d, !1), null) : [u - 1, d];
      });
    };
  return (
    de(
      i,
      (c, l) => {
        l && f(l),
          o.value.cache.update(c, u => {
            const [d = 0, m] = u || [];
            let p = m;
            m && s && (r == null || r(p, s), (p = null));
            const g = p || n();
            return [d + 1, g];
          }),
          (a.value = o.value.cache.get(i.value)[1]);
      },
      { immediate: !0 }
    ),
    Ma(() => {
      f(i.value);
    }),
    a
  );
}
function Le() {
  return !!(
    typeof window < 'u' &&
    window.document &&
    window.document.createElement
  );
}
function Gs(e, t) {
  return e && e.contains ? e.contains(t) : !1;
}
const wr = 'data-vc-order',
  Xs = 'vc-util-key',
  fn = new Map();
function Fo() {
  let { mark: e } =
    arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : {};
  return e ? (e.startsWith('data-') ? e : `data-${e}`) : Xs;
}
function At(e) {
  return e.attachTo
    ? e.attachTo
    : document.querySelector('head') || document.body;
}
function Ks(e) {
  return e === 'queue' ? 'prependQueue' : e ? 'prepend' : 'append';
}
function Do(e) {
  return Array.from((fn.get(e) || e).children).filter(
    t => t.tagName === 'STYLE'
  );
}
function Ho(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
  if (!Le()) return null;
  const { csp: n, prepend: r } = t,
    o = document.createElement('style');
  o.setAttribute(wr, Ks(r)),
    n != null && n.nonce && (o.nonce = n == null ? void 0 : n.nonce),
    (o.innerHTML = e);
  const i = At(t),
    { firstChild: a } = i;
  if (r) {
    if (r === 'queue') {
      const s = Do(i).filter(f =>
        ['prepend', 'prependQueue'].includes(f.getAttribute(wr))
      );
      if (s.length) return i.insertBefore(o, s[s.length - 1].nextSibling), o;
    }
    i.insertBefore(o, a);
  } else i.appendChild(o);
  return o;
}
function Bo(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
  const n = At(t);
  return Do(n).find(r => r.getAttribute(Fo(t)) === e);
}
function zo(e) {
  let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
  const n = Bo(e, t);
  n && At(t).removeChild(n);
}
function Js(e, t) {
  const n = fn.get(e);
  if (!n || !Gs(document, n)) {
    const r = Ho('', t),
      { parentNode: o } = r;
    fn.set(e, o), e.removeChild(r);
  }
}
function xt(e, t) {
  let n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : {};
  var r, o, i;
  const a = At(n);
  Js(a, n);
  const s = Bo(t, n);
  if (s)
    return (
      !((r = n.csp) === null || r === void 0) &&
        r.nonce &&
        s.nonce !== ((o = n.csp) === null || o === void 0 ? void 0 : o.nonce) &&
        (s.nonce = (i = n.csp) === null || i === void 0 ? void 0 : i.nonce),
      s.innerHTML !== e && (s.innerHTML = e),
      s
    );
  const f = Ho(e, n);
  return f.setAttribute(Fo(n), t), f;
}
function Ys(e, t) {
  if (e.length !== t.length) return !1;
  for (let n = 0; n < e.length; n++) if (e[n] !== t[n]) return !1;
  return !0;
}
class Re {
  constructor() {
    (this.cache = new Map()), (this.keys = []), (this.cacheCallTimes = 0);
  }
  size() {
    return this.keys.length;
  }
  internalGet(t) {
    let n = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1,
      r = { map: this.cache };
    return (
      t.forEach(o => {
        var i;
        r
          ? (r =
              (i = r == null ? void 0 : r.map) === null || i === void 0
                ? void 0
                : i.get(o))
          : (r = void 0);
      }),
      r != null && r.value && n && (r.value[1] = this.cacheCallTimes++),
      r == null ? void 0 : r.value
    );
  }
  get(t) {
    var n;
    return (n = this.internalGet(t, !0)) === null || n === void 0
      ? void 0
      : n[0];
  }
  has(t) {
    return !!this.internalGet(t);
  }
  set(t, n) {
    if (!this.has(t)) {
      if (this.size() + 1 > Re.MAX_CACHE_SIZE + Re.MAX_CACHE_OFFSET) {
        const [o] = this.keys.reduce(
          (i, a) => {
            const [, s] = i;
            return this.internalGet(a)[1] < s ? [a, this.internalGet(a)[1]] : i;
          },
          [this.keys[0], this.cacheCallTimes]
        );
        this.delete(o);
      }
      this.keys.push(t);
    }
    let r = this.cache;
    t.forEach((o, i) => {
      if (i === t.length - 1) r.set(o, { value: [n, this.cacheCallTimes++] });
      else {
        const a = r.get(o);
        a ? a.map || (a.map = new Map()) : r.set(o, { map: new Map() }),
          (r = r.get(o).map);
      }
    });
  }
  deleteByPath(t, n) {
    var r;
    const o = t.get(n[0]);
    if (n.length === 1)
      return (
        o.map ? t.set(n[0], { map: o.map }) : t.delete(n[0]),
        (r = o.value) === null || r === void 0 ? void 0 : r[0]
      );
    const i = this.deleteByPath(o.map, n.slice(1));
    return (!o.map || o.map.size === 0) && !o.value && t.delete(n[0]), i;
  }
  delete(t) {
    if (this.has(t))
      return (
        (this.keys = this.keys.filter(n => !Ys(n, t))),
        this.deleteByPath(this.cache, t)
      );
  }
}
Re.MAX_CACHE_SIZE = 20;
Re.MAX_CACHE_OFFSET = 5;
let Or = {};
function Qs(e, t) {
  !e && console !== void 0 && console.error(`Warning: ${t}`);
}
function Zs(e, t) {
  !e && console !== void 0 && console.warn(`Note: ${t}`);
}
function Uo(e, t, n) {
  !t && !Or[n] && (e(!1, n), (Or[n] = !0));
}
function qo(e, t) {
  Uo(Qs, e, t);
}
function tm(e, t) {
  Uo(Zs, e, t);
}
function el() {}
let Wo = el;
Wo = (e, t, n) => {
  qo(e, `[ant-design-vue: ${t}] ${n}`);
};
const Dn = Wo;
let Pr = 0;
class Vo {
  constructor(t) {
    (this.derivatives = Array.isArray(t) ? t : [t]),
      (this.id = Pr),
      t.length === 0 &&
        Dn(
          t.length > 0,
          '[Ant Design Vue CSS-in-JS] Theme should have at least one derivative function.'
        ),
      (Pr += 1);
  }
  getDerivativeToken(t) {
    return this.derivatives.reduce((n, r) => r(t, n), void 0);
  }
}
const Qt = new Re();
function Go(e) {
  const t = Array.isArray(e) ? e : [e];
  return Qt.has(t) || Qt.set(t, new Vo(t)), Qt.get(t);
}
const Tr = new WeakMap();
function wt(e) {
  let t = Tr.get(e) || '';
  return (
    t ||
      (Object.keys(e).forEach(n => {
        const r = e[n];
        (t += n),
          r instanceof Vo
            ? (t += r.id)
            : r && typeof r == 'object'
            ? (t += wt(r))
            : (t += r);
      }),
      Tr.set(e, t)),
    t
  );
}
function tl(e, t) {
  return Fn(`${t}_${wt(e)}`);
}
const Ge = `random-${Date.now()}-${Math.random()}`.replace(/\./g, ''),
  Xo = '_bAmBoO_';
function nl(e, t, n) {
  var r, o;
  if (Le()) {
    xt(e, Ge);
    const i = document.createElement('div');
    (i.style.position = 'fixed'),
      (i.style.left = '0'),
      (i.style.top = '0'),
      t == null || t(i),
      document.body.appendChild(i),
      (i.innerHTML = 'Test'),
      (i.style.zIndex = '9999999');
    const a = n
      ? n(i)
      : (r = getComputedStyle(i).content) === null || r === void 0
      ? void 0
      : r.includes(Xo);
    return (
      (o = i.parentNode) === null || o === void 0 || o.removeChild(i), zo(Ge), a
    );
  }
  return !1;
}
let Zt;
function rl() {
  return (
    Zt === void 0 &&
      (Zt = nl(`@layer ${Ge} { .${Ge} { content: "${Xo}"!important; } }`, e => {
        e.className = Ge;
      })),
    Zt
  );
}
const $r = {},
  ol = 'css-dev-only-do-not-override',
  ge = new Map();
function il(e) {
  ge.set(e, (ge.get(e) || 0) + 1);
}
function al(e, t) {
  typeof document < 'u' &&
    document.querySelectorAll(`style[${jo}="${e}"]`).forEach(r => {
      var o;
      r[Te] === t &&
        ((o = r.parentNode) === null || o === void 0 || o.removeChild(r));
    });
}
const sl = 0;
function ll(e, t) {
  ge.set(e, (ge.get(e) || 0) - 1);
  const n = Array.from(ge.keys()),
    r = n.filter(o => (ge.get(o) || 0) <= 0);
  n.length - r.length > sl &&
    r.forEach(o => {
      al(o, t), ge.delete(o);
    });
}
const cl = (e, t, n, r) => {
  const o = n.getDerivativeToken(e);
  let i = y(y({}, o), t);
  return r && (i = r(i)), i;
};
function ul(e, t) {
  let n =
    arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : B({});
  const r = _t(),
    o = P(() => y({}, ...t.value)),
    i = P(() => wt(o.value)),
    a = P(() => wt(n.value.override || $r));
  return Lo(
    'token',
    P(() => [n.value.salt || '', e.value.id, i.value, a.value]),
    () => {
      const {
          salt: f = '',
          override: c = $r,
          formatToken: l,
          getComputedToken: u
        } = n.value,
        d = u ? u(o.value, c, e.value) : cl(o.value, c, e.value, l),
        m = tl(d, f);
      (d._tokenKey = m), il(m);
      const p = `${ol}-${Fn(m)}`;
      return (d._hashId = p), [d, p];
    },
    f => {
      var c;
      ll(
        f[0]._tokenKey,
        (c = r.value) === null || c === void 0 ? void 0 : c.cache.instanceId
      );
    }
  );
}
var fl = {
    animationIterationCount: 1,
    aspectRatio: 1,
    borderImageOutset: 1,
    borderImageSlice: 1,
    borderImageWidth: 1,
    boxFlex: 1,
    boxFlexGroup: 1,
    boxOrdinalGroup: 1,
    columnCount: 1,
    columns: 1,
    flex: 1,
    flexGrow: 1,
    flexPositive: 1,
    flexShrink: 1,
    flexNegative: 1,
    flexOrder: 1,
    gridRow: 1,
    gridRowEnd: 1,
    gridRowSpan: 1,
    gridRowStart: 1,
    gridColumn: 1,
    gridColumnEnd: 1,
    gridColumnSpan: 1,
    gridColumnStart: 1,
    msGridRow: 1,
    msGridRowSpan: 1,
    msGridColumn: 1,
    msGridColumnSpan: 1,
    fontWeight: 1,
    lineHeight: 1,
    opacity: 1,
    order: 1,
    orphans: 1,
    tabSize: 1,
    widows: 1,
    zIndex: 1,
    zoom: 1,
    WebkitLineClamp: 1,
    fillOpacity: 1,
    floodOpacity: 1,
    stopOpacity: 1,
    strokeDasharray: 1,
    strokeDashoffset: 1,
    strokeMiterlimit: 1,
    strokeOpacity: 1,
    strokeWidth: 1
  },
  Ko = 'comm',
  Jo = 'rule',
  Yo = 'decl',
  dl = '@import',
  pl = '@keyframes',
  ml = '@layer',
  gl = Math.abs,
  Hn = String.fromCharCode;
function Qo(e) {
  return e.trim();
}
function ct(e, t, n) {
  return e.replace(t, n);
}
function hl(e, t) {
  return e.indexOf(t);
}
function Qe(e, t) {
  return e.charCodeAt(t) | 0;
}
function Ze(e, t, n) {
  return e.slice(t, n);
}
function ue(e) {
  return e.length;
}
function Zo(e) {
  return e.length;
}
function at(e, t) {
  return t.push(e), e;
}
var Rt = 1,
  Ie = 1,
  ei = 0,
  Y = 0,
  j = 0,
  Fe = '';
function Bn(e, t, n, r, o, i, a) {
  return {
    value: e,
    root: t,
    parent: n,
    type: r,
    props: o,
    children: i,
    line: Rt,
    column: Ie,
    length: a,
    return: ''
  };
}
function yl() {
  return j;
}
function vl() {
  return (j = Y > 0 ? Qe(Fe, --Y) : 0), Ie--, j === 10 && ((Ie = 1), Rt--), j;
}
function Z() {
  return (j = Y < ei ? Qe(Fe, Y++) : 0), Ie++, j === 10 && ((Ie = 1), Rt++), j;
}
function ve() {
  return Qe(Fe, Y);
}
function ut() {
  return Y;
}
function It(e, t) {
  return Ze(Fe, e, t);
}
function dn(e) {
  switch (e) {
    case 0:
    case 9:
    case 10:
    case 13:
    case 32:
      return 5;
    case 33:
    case 43:
    case 44:
    case 47:
    case 62:
    case 64:
    case 126:
    case 59:
    case 123:
    case 125:
      return 4;
    case 58:
      return 3;
    case 34:
    case 39:
    case 40:
    case 91:
      return 2;
    case 41:
    case 93:
      return 1;
  }
  return 0;
}
function bl(e) {
  return (Rt = Ie = 1), (ei = ue((Fe = e))), (Y = 0), [];
}
function Cl(e) {
  return (Fe = ''), e;
}
function en(e) {
  return Qo(It(Y - 1, pn(e === 91 ? e + 2 : e === 40 ? e + 1 : e)));
}
function Sl(e) {
  for (; (j = ve()) && j < 33; ) Z();
  return dn(e) > 2 || dn(j) > 3 ? '' : ' ';
}
function xl(e, t) {
  for (
    ;
    --t &&
    Z() &&
    !(j < 48 || j > 102 || (j > 57 && j < 65) || (j > 70 && j < 97));

  );
  return It(e, ut() + (t < 6 && ve() == 32 && Z() == 32));
}
function pn(e) {
  for (; Z(); )
    switch (j) {
      case e:
        return Y;
      case 34:
      case 39:
        e !== 34 && e !== 39 && pn(j);
        break;
      case 40:
        e === 41 && pn(e);
        break;
      case 92:
        Z();
        break;
    }
  return Y;
}
function wl(e, t) {
  for (; Z() && e + j !== 47 + 10; )
    if (e + j === 42 + 42 && ve() === 47) break;
  return '/*' + It(t, Y - 1) + '*' + Hn(e === 47 ? e : Z());
}
function Ol(e) {
  for (; !dn(ve()); ) Z();
  return It(e, Y);
}
function Pl(e) {
  return Cl(ft('', null, null, null, [''], (e = bl(e)), 0, [0], e));
}
function ft(e, t, n, r, o, i, a, s, f) {
  for (
    var c = 0,
      l = 0,
      u = a,
      d = 0,
      m = 0,
      p = 0,
      g = 1,
      w = 1,
      b = 1,
      x = 0,
      T = '',
      $ = o,
      E = i,
      S = r,
      C = T;
    w;

  )
    switch (((p = x), (x = Z()))) {
      case 40:
        if (p != 108 && Qe(C, u - 1) == 58) {
          hl((C += ct(en(x), '&', '&\f')), '&\f') != -1 && (b = -1);
          break;
        }
      case 34:
      case 39:
      case 91:
        C += en(x);
        break;
      case 9:
      case 10:
      case 13:
      case 32:
        C += Sl(p);
        break;
      case 92:
        C += xl(ut() - 1, 7);
        continue;
      case 47:
        switch (ve()) {
          case 42:
          case 47:
            at(Tl(wl(Z(), ut()), t, n), f);
            break;
          default:
            C += '/';
        }
        break;
      case 123 * g:
        s[c++] = ue(C) * b;
      case 125 * g:
      case 59:
      case 0:
        switch (x) {
          case 0:
          case 125:
            w = 0;
          case 59 + l:
            b == -1 && (C = ct(C, /\f/g, '')),
              m > 0 &&
                ue(C) - u &&
                at(
                  m > 32
                    ? _r(C + ';', r, n, u - 1)
                    : _r(ct(C, ' ', '') + ';', r, n, u - 2),
                  f
                );
            break;
          case 59:
            C += ';';
          default:
            if (
              (at((S = Er(C, t, n, c, l, o, s, T, ($ = []), (E = []), u)), i),
              x === 123)
            )
              if (l === 0) ft(C, t, S, S, $, i, u, s, E);
              else
                switch (d === 99 && Qe(C, 3) === 110 ? 100 : d) {
                  case 100:
                  case 108:
                  case 109:
                  case 115:
                    ft(
                      e,
                      S,
                      S,
                      r && at(Er(e, S, S, 0, 0, o, s, T, o, ($ = []), u), E),
                      o,
                      E,
                      u,
                      s,
                      r ? $ : E
                    );
                    break;
                  default:
                    ft(C, S, S, S, [''], E, 0, s, E);
                }
        }
        (c = l = m = 0), (g = b = 1), (T = C = ''), (u = a);
        break;
      case 58:
        (u = 1 + ue(C)), (m = p);
      default:
        if (g < 1) {
          if (x == 123) --g;
          else if (x == 125 && g++ == 0 && vl() == 125) continue;
        }
        switch (((C += Hn(x)), x * g)) {
          case 38:
            b = l > 0 ? 1 : ((C += '\f'), -1);
            break;
          case 44:
            (s[c++] = (ue(C) - 1) * b), (b = 1);
            break;
          case 64:
            ve() === 45 && (C += en(Z())),
              (d = ve()),
              (l = u = ue((T = C += Ol(ut())))),
              x++;
            break;
          case 45:
            p === 45 && ue(C) == 2 && (g = 0);
        }
    }
  return i;
}
function Er(e, t, n, r, o, i, a, s, f, c, l) {
  for (
    var u = o - 1, d = o === 0 ? i : [''], m = Zo(d), p = 0, g = 0, w = 0;
    p < r;
    ++p
  )
    for (var b = 0, x = Ze(e, u + 1, (u = gl((g = a[p])))), T = e; b < m; ++b)
      (T = Qo(g > 0 ? d[b] + ' ' + x : ct(x, /&\f/g, d[b]))) && (f[w++] = T);
  return Bn(e, t, n, o === 0 ? Jo : s, f, c, l);
}
function Tl(e, t, n) {
  return Bn(e, t, n, Ko, Hn(yl()), Ze(e, 2, -2), 0);
}
function _r(e, t, n, r) {
  return Bn(e, t, n, Yo, Ze(e, 0, r), Ze(e, r + 1, -1), r);
}
function mn(e, t) {
  for (var n = '', r = Zo(e), o = 0; o < r; o++) n += t(e[o], o, e, t) || '';
  return n;
}
function $l(e, t, n, r) {
  switch (e.type) {
    case ml:
      if (e.children.length) break;
    case dl:
    case Yo:
      return (e.return = e.return || e.value);
    case Ko:
      return '';
    case pl:
      return (e.return = e.value + '{' + mn(e.children, r) + '}');
    case Jo:
      e.value = e.props.join(',');
  }
  return ue((n = mn(e.children, r)))
    ? (e.return = e.value + '{' + n + '}')
    : '';
}
function ti(e, t) {
  const { path: n, parentSelectors: r } = t;
  qo(
    !1,
    `[Ant Design Vue CSS-in-JS] ${n ? `Error in '${n}': ` : ''}${e}${
      r.length ? ` Selector info: ${r.join(' -> ')}` : ''
    }`
  );
}
const El = (e, t, n) => {
    if (e === 'content') {
      const r = /(attr|counters?|url|(((repeating-)?(linear|radial))|conic)-gradient)\(|(no-)?(open|close)-quote/;
      (typeof t != 'string' ||
        (['normal', 'none', 'initial', 'inherit', 'unset'].indexOf(t) === -1 &&
          !r.test(t) &&
          (t.charAt(0) !== t.charAt(t.length - 1) ||
            (t.charAt(0) !== '"' && t.charAt(0) !== "'")))) &&
        ti(
          `You seem to be using a value for 'content' without quotes, try replacing it with \`content: '"${t}"'\`.`,
          n
        );
    }
  },
  _l = El,
  Al = (e, t, n) => {
    e === 'animation' &&
      n.hashId &&
      t !== 'none' &&
      ti(
        `You seem to be using hashed animation '${t}', in which case 'animationName' with Keyframe as value is recommended.`,
        n
      );
  },
  Rl = Al,
  Ar = 'data-ant-cssinjs-cache-path',
  Il = '_FILE_STYLE__';
let be,
  ni = !0;
function kl() {
  var e;
  if (!be && ((be = {}), Le())) {
    const t = document.createElement('div');
    (t.className = Ar),
      (t.style.position = 'fixed'),
      (t.style.visibility = 'hidden'),
      (t.style.top = '-9999px'),
      document.body.appendChild(t);
    let n = getComputedStyle(t).content || '';
    (n = n.replace(/^"/, '').replace(/"$/, '')),
      n.split(';').forEach(o => {
        const [i, a] = o.split(':');
        be[i] = a;
      });
    const r = document.querySelector(`style[${Ar}]`);
    r &&
      ((ni = !1),
      (e = r.parentNode) === null || e === void 0 || e.removeChild(r)),
      document.body.removeChild(t);
  }
}
function jl(e) {
  return kl(), !!be[e];
}
function Nl(e) {
  const t = be[e];
  let n = null;
  if (t && Le())
    if (ni) n = Il;
    else {
      const r = document.querySelector(`style[${ye}="${be[e]}"]`);
      r ? (n = r.innerHTML) : delete be[e];
    }
  return [n, t];
}
const Rr = Le(),
  ri = '_skip_check_',
  oi = '_multi_value_';
function Ir(e) {
  return mn(Pl(e), $l).replace(/\{%%%\:[^;];}/g, ';');
}
function Ml(e) {
  return typeof e == 'object' && e && (ri in e || oi in e);
}
function Ll(e, t, n) {
  if (!t) return e;
  const r = `.${t}`,
    o = n === 'low' ? `:where(${r})` : r;
  return e
    .split(',')
    .map(a => {
      var s;
      const f = a.trim().split(/\s+/);
      let c = f[0] || '';
      const l =
        ((s = c.match(/^\w+/)) === null || s === void 0 ? void 0 : s[0]) || '';
      return (c = `${l}${o}${c.slice(l.length)}`), [c, ...f.slice(1)].join(' ');
    })
    .join(',');
}
const kr = new Set(),
  gn = function(e) {
    let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {},
      { root: n, injectHash: r, parentSelectors: o } =
        arguments.length > 2 && arguments[2] !== void 0
          ? arguments[2]
          : { root: !0, parentSelectors: [] };
    const {
      hashId: i,
      layer: a,
      path: s,
      hashPriority: f,
      transformers: c = [],
      linters: l = []
    } = t;
    let u = '',
      d = {};
    function m(w) {
      const b = w.getName(i);
      if (!d[b]) {
        const [x] = gn(w.style, t, { root: !1, parentSelectors: o });
        d[b] = `@keyframes ${w.getName(i)}${x}`;
      }
    }
    function p(w) {
      let b =
        arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : [];
      return (
        w.forEach(x => {
          Array.isArray(x) ? p(x, b) : x && b.push(x);
        }),
        b
      );
    }
    if (
      (p(Array.isArray(e) ? e : [e]).forEach(w => {
        const b = typeof w == 'string' && !n ? {} : w;
        if (typeof b == 'string')
          u += `${b}
`;
        else if (b._keyframe) m(b);
        else {
          const x = c.reduce((T, $) => {
            var E;
            return (
              ((E = $ == null ? void 0 : $.visit) === null || E === void 0
                ? void 0
                : E.call($, T)) || T
            );
          }, b);
          Object.keys(x).forEach(T => {
            var $;
            const E = x[T];
            if (
              typeof E == 'object' &&
              E &&
              (T !== 'animationName' || !E._keyframe) &&
              !Ml(E)
            ) {
              let S = !1,
                C = T.trim(),
                _ = !1;
              (n || r) && i
                ? C.startsWith('@')
                  ? (S = !0)
                  : (C = Ll(T, i, f))
                : n && !i && (C === '&' || C === '') && ((C = ''), (_ = !0));
              const [I, L] = gn(E, t, {
                root: _,
                injectHash: S,
                parentSelectors: [...o, C]
              });
              (d = y(y({}, d), L)), (u += `${C}${I}`);
            } else {
              let S = function(_, I) {
                (typeof E != 'object' || !(E != null && E[ri])) &&
                  [_l, Rl, ...l].forEach(q =>
                    q(_, I, { path: s, hashId: i, parentSelectors: o })
                  );
                const L = _.replace(/[A-Z]/g, q => `-${q.toLowerCase()}`);
                let Q = I;
                !fl[_] && typeof Q == 'number' && Q !== 0 && (Q = `${Q}px`),
                  _ === 'animationName' &&
                    I != null && I._keyframe &&
                    (m(I), (Q = I.getName(i))),
                  (u += `${L}:${Q};`);
              };
              const C =
                ($ = E == null ? void 0 : E.value) !== null && $ !== void 0
                  ? $
                  : E;
              typeof E == 'object' && E != null && E[oi] && Array.isArray(C)
                ? C.forEach(_ => {
                    S(T, _);
                  })
                : S(T, C);
            }
          });
        }
      }),
      !n)
    )
      u = `{${u}}`;
    else if (a && rl()) {
      const w = a.split(',');
      (u = `@layer ${w[w.length - 1].trim()} {${u}}`),
        w.length > 1 && (u = `@layer ${a}{%%%:%}${u}`);
    }
    return [u, d];
  };
function Fl(e, t) {
  return Fn(`${e.join('%')}${t}`);
}
function hn(e, t) {
  const n = _t(),
    r = P(() => e.value.token._tokenKey),
    o = P(() => [r.value, ...e.value.path]);
  let i = Rr;
  return (
    n.value.mock !== void 0 && (i = n.value.mock === 'client'),
    Lo(
      'style',
      o,
      () => {
        const {
            path: a,
            hashId: s,
            layer: f,
            nonce: c,
            clientOnly: l,
            order: u = 0
          } = e.value,
          d = o.value.join('|');
        if (jl(d)) {
          const [C, _] = Nl(d);
          if (C) return [C, r.value, _, {}, l, u];
        }
        const m = t(),
          {
            hashPriority: p,
            container: g,
            transformers: w,
            linters: b,
            cache: x
          } = n.value,
          [T, $] = gn(m, {
            hashId: s,
            hashPriority: p,
            layer: f,
            path: a.join('-'),
            transformers: w,
            linters: b
          }),
          E = Ir(T),
          S = Fl(o.value, E);
        if (i) {
          const C = { mark: ye, prepend: 'queue', attachTo: g, priority: u },
            _ = typeof c == 'function' ? c() : c;
          _ && (C.csp = { nonce: _ });
          const I = xt(E, S, C);
          (I[Te] = x.instanceId),
            I.setAttribute(jo, r.value),
            I.setAttribute(zs, o.value.join('|')),
            Object.keys($).forEach(L => {
              kr.has(L) ||
                (kr.add(L),
                xt(Ir($[L]), `_effect-${L}`, {
                  mark: ye,
                  prepend: 'queue',
                  attachTo: g
                }));
            });
        }
        return [E, r.value, S, $, l, u];
      },
      (a, s) => {
        let [, , f] = a;
        (s || n.value.autoClear) && Rr && zo(f, { mark: ye });
      }
    ),
    a => a
  );
}
class Dl {
  constructor(t, n) {
    (this._keyframe = !0), (this.name = t), (this.style = n);
  }
  getName() {
    let t = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : '';
    return t ? `${t}-${this.name}` : this.name;
  }
}
const Ce = Dl,
  Hl = '4.0.3',
  Bl = e => {
    const { controlHeight: t } = e;
    return {
      controlHeightSM: t * 0.75,
      controlHeightXS: t * 0.5,
      controlHeightLG: t * 1.25
    };
  },
  zl = Bl;
function Ul(e) {
  const { sizeUnit: t, sizeStep: n } = e;
  return {
    sizeXXL: t * (n + 8),
    sizeXL: t * (n + 4),
    sizeLG: t * (n + 2),
    sizeMD: t * (n + 1),
    sizeMS: t * n,
    size: t * n,
    sizeSM: t * (n - 1),
    sizeXS: t * (n - 2),
    sizeXXS: t * (n - 3)
  };
}
const ii = {
    blue: '#1677ff',
    purple: '#722ED1',
    cyan: '#13C2C2',
    green: '#52C41A',
    magenta: '#EB2F96',
    pink: '#eb2f96',
    red: '#F5222D',
    orange: '#FA8C16',
    yellow: '#FADB14',
    volcano: '#FA541C',
    geekblue: '#2F54EB',
    gold: '#FAAD14',
    lime: '#A0D911'
  },
  ql = y(y({}, ii), {
    colorPrimary: '#1677ff',
    colorSuccess: '#52c41a',
    colorWarning: '#faad14',
    colorError: '#ff4d4f',
    colorInfo: '#1677ff',
    colorTextBase: '',
    colorBgBase: '',
    fontFamily: `-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial,
'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol',
'Noto Color Emoji'`,
    fontSize: 14,
    lineWidth: 1,
    lineType: 'solid',
    motionUnit: 0.1,
    motionBase: 0,
    motionEaseOutCirc: 'cubic-bezier(0.08, 0.82, 0.17, 1)',
    motionEaseInOutCirc: 'cubic-bezier(0.78, 0.14, 0.15, 0.86)',
    motionEaseOut: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
    motionEaseInOut: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
    motionEaseOutBack: 'cubic-bezier(0.12, 0.4, 0.29, 1.46)',
    motionEaseInBack: 'cubic-bezier(0.71, -0.46, 0.88, 0.6)',
    motionEaseInQuint: 'cubic-bezier(0.755, 0.05, 0.855, 0.06)',
    motionEaseOutQuint: 'cubic-bezier(0.23, 1, 0.32, 1)',
    borderRadius: 6,
    sizeUnit: 4,
    sizeStep: 4,
    sizePopupArrow: 16,
    controlHeight: 32,
    zIndexBase: 0,
    zIndexPopupBase: 1e3,
    opacityImage: 1,
    wireframe: !1
  }),
  kt = ql;
function Wl(e, t) {
  let { generateColorPalettes: n, generateNeutralColorPalettes: r } = t;
  const {
      colorSuccess: o,
      colorWarning: i,
      colorError: a,
      colorInfo: s,
      colorPrimary: f,
      colorBgBase: c,
      colorTextBase: l
    } = e,
    u = n(f),
    d = n(o),
    m = n(i),
    p = n(a),
    g = n(s),
    w = r(c, l);
  return y(y({}, w), {
    colorPrimaryBg: u[1],
    colorPrimaryBgHover: u[2],
    colorPrimaryBorder: u[3],
    colorPrimaryBorderHover: u[4],
    colorPrimaryHover: u[5],
    colorPrimary: u[6],
    colorPrimaryActive: u[7],
    colorPrimaryTextHover: u[8],
    colorPrimaryText: u[9],
    colorPrimaryTextActive: u[10],
    colorSuccessBg: d[1],
    colorSuccessBgHover: d[2],
    colorSuccessBorder: d[3],
    colorSuccessBorderHover: d[4],
    colorSuccessHover: d[4],
    colorSuccess: d[6],
    colorSuccessActive: d[7],
    colorSuccessTextHover: d[8],
    colorSuccessText: d[9],
    colorSuccessTextActive: d[10],
    colorErrorBg: p[1],
    colorErrorBgHover: p[2],
    colorErrorBorder: p[3],
    colorErrorBorderHover: p[4],
    colorErrorHover: p[5],
    colorError: p[6],
    colorErrorActive: p[7],
    colorErrorTextHover: p[8],
    colorErrorText: p[9],
    colorErrorTextActive: p[10],
    colorWarningBg: m[1],
    colorWarningBgHover: m[2],
    colorWarningBorder: m[3],
    colorWarningBorderHover: m[4],
    colorWarningHover: m[4],
    colorWarning: m[6],
    colorWarningActive: m[7],
    colorWarningTextHover: m[8],
    colorWarningText: m[9],
    colorWarningTextActive: m[10],
    colorInfoBg: g[1],
    colorInfoBgHover: g[2],
    colorInfoBorder: g[3],
    colorInfoBorderHover: g[4],
    colorInfoHover: g[4],
    colorInfo: g[6],
    colorInfoActive: g[7],
    colorInfoTextHover: g[8],
    colorInfoText: g[9],
    colorInfoTextActive: g[10],
    colorBgMask: new F('#000').setAlpha(0.45).toRgbString(),
    colorWhite: '#fff'
  });
}
const Vl = e => {
    let t = e,
      n = e,
      r = e,
      o = e;
    return (
      e < 6 && e >= 5
        ? (t = e + 1)
        : e < 16 && e >= 6
        ? (t = e + 2)
        : e >= 16 && (t = 16),
      e < 7 && e >= 5
        ? (n = 4)
        : e < 8 && e >= 7
        ? (n = 5)
        : e < 14 && e >= 8
        ? (n = 6)
        : e < 16 && e >= 14
        ? (n = 7)
        : e >= 16 && (n = 8),
      e < 6 && e >= 2 ? (r = 1) : e >= 6 && (r = 2),
      e > 4 && e < 8 ? (o = 4) : e >= 8 && (o = 6),
      {
        borderRadius: e > 16 ? 16 : e,
        borderRadiusXS: r,
        borderRadiusSM: n,
        borderRadiusLG: t,
        borderRadiusOuter: o
      }
    );
  },
  Gl = Vl;
function Xl(e) {
  const { motionUnit: t, motionBase: n, borderRadius: r, lineWidth: o } = e;
  return y(
    {
      motionDurationFast: `${(n + t).toFixed(1)}s`,
      motionDurationMid: `${(n + t * 2).toFixed(1)}s`,
      motionDurationSlow: `${(n + t * 3).toFixed(1)}s`,
      lineWidthBold: o + 1
    },
    Gl(r)
  );
}
const le = (e, t) => new F(e).setAlpha(t).toRgbString(),
  Ue = (e, t) => new F(e).darken(t).toHexString(),
  Kl = e => {
    const t = Je(e);
    return {
      1: t[0],
      2: t[1],
      3: t[2],
      4: t[3],
      5: t[4],
      6: t[5],
      7: t[6],
      8: t[4],
      9: t[5],
      10: t[6]
    };
  },
  Jl = (e, t) => {
    const n = e || '#fff',
      r = t || '#000';
    return {
      colorBgBase: n,
      colorTextBase: r,
      colorText: le(r, 0.88),
      colorTextSecondary: le(r, 0.65),
      colorTextTertiary: le(r, 0.45),
      colorTextQuaternary: le(r, 0.25),
      colorFill: le(r, 0.15),
      colorFillSecondary: le(r, 0.06),
      colorFillTertiary: le(r, 0.04),
      colorFillQuaternary: le(r, 0.02),
      colorBgLayout: Ue(n, 4),
      colorBgContainer: Ue(n, 0),
      colorBgElevated: Ue(n, 0),
      colorBgSpotlight: le(r, 0.85),
      colorBorder: Ue(n, 15),
      colorBorderSecondary: Ue(n, 6)
    };
  };
function Yl(e) {
  const t = new Array(10).fill(null).map((n, r) => {
    const o = r - 1,
      i = e * Math.pow(2.71828, o / 5),
      a = r > 1 ? Math.floor(i) : Math.ceil(i);
    return Math.floor(a / 2) * 2;
  });
  return (
    (t[1] = e),
    t.map(n => {
      const r = n + 8;
      return { size: n, lineHeight: r / n };
    })
  );
}
const Ql = e => {
    const t = Yl(e),
      n = t.map(o => o.size),
      r = t.map(o => o.lineHeight);
    return {
      fontSizeSM: n[0],
      fontSize: n[1],
      fontSizeLG: n[2],
      fontSizeXL: n[3],
      fontSizeHeading1: n[6],
      fontSizeHeading2: n[5],
      fontSizeHeading3: n[4],
      fontSizeHeading4: n[3],
      fontSizeHeading5: n[2],
      lineHeight: r[1],
      lineHeightLG: r[2],
      lineHeightSM: r[0],
      lineHeightHeading1: r[6],
      lineHeightHeading2: r[5],
      lineHeightHeading3: r[4],
      lineHeightHeading4: r[3],
      lineHeightHeading5: r[2]
    };
  },
  Zl = Ql;
function ec(e) {
  const t = Object.keys(ii)
    .map(n => {
      const r = Je(e[n]);
      return new Array(10)
        .fill(1)
        .reduce((o, i, a) => ((o[`${n}-${a + 1}`] = r[a]), o), {});
    })
    .reduce((n, r) => ((n = y(y({}, n), r)), n), {});
  return y(
    y(
      y(
        y(
          y(
            y(y({}, e), t),
            Wl(e, {
              generateColorPalettes: Kl,
              generateNeutralColorPalettes: Jl
            })
          ),
          Zl(e.fontSize)
        ),
        Ul(e)
      ),
      zl(e)
    ),
    Xl(e)
  );
}
function tn(e) {
  return e >= 0 && e <= 255;
}
function st(e, t) {
  const { r: n, g: r, b: o, a: i } = new F(e).toRgb();
  if (i < 1) return e;
  const { r: a, g: s, b: f } = new F(t).toRgb();
  for (let c = 0.01; c <= 1; c += 0.01) {
    const l = Math.round((n - a * (1 - c)) / c),
      u = Math.round((r - s * (1 - c)) / c),
      d = Math.round((o - f * (1 - c)) / c);
    if (tn(l) && tn(u) && tn(d))
      return new F({
        r: l,
        g: u,
        b: d,
        a: Math.round(c * 100) / 100
      }).toRgbString();
  }
  return new F({ r: n, g: r, b: o, a: 1 }).toRgbString();
}
var tc =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var r in e)
      Object.prototype.hasOwnProperty.call(e, r) &&
        t.indexOf(r) < 0 &&
        (n[r] = e[r]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var o = 0, r = Object.getOwnPropertySymbols(e); o < r.length; o++)
        t.indexOf(r[o]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, r[o]) &&
          (n[r[o]] = e[r[o]]);
    return n;
  };
function nc(e) {
  const { override: t } = e,
    n = tc(e, ['override']),
    r = y({}, t);
  Object.keys(kt).forEach(m => {
    delete r[m];
  });
  const o = y(y({}, n), r),
    i = 480,
    a = 576,
    s = 768,
    f = 992,
    c = 1200,
    l = 1600,
    u = 2e3;
  return y(
    y(y({}, o), {
      colorLink: o.colorInfoText,
      colorLinkHover: o.colorInfoHover,
      colorLinkActive: o.colorInfoActive,
      colorFillContent: o.colorFillSecondary,
      colorFillContentHover: o.colorFill,
      colorFillAlter: o.colorFillQuaternary,
      colorBgContainerDisabled: o.colorFillTertiary,
      colorBorderBg: o.colorBgContainer,
      colorSplit: st(o.colorBorderSecondary, o.colorBgContainer),
      colorTextPlaceholder: o.colorTextQuaternary,
      colorTextDisabled: o.colorTextQuaternary,
      colorTextHeading: o.colorText,
      colorTextLabel: o.colorTextSecondary,
      colorTextDescription: o.colorTextTertiary,
      colorTextLightSolid: o.colorWhite,
      colorHighlight: o.colorError,
      colorBgTextHover: o.colorFillSecondary,
      colorBgTextActive: o.colorFill,
      colorIcon: o.colorTextTertiary,
      colorIconHover: o.colorText,
      colorErrorOutline: st(o.colorErrorBg, o.colorBgContainer),
      colorWarningOutline: st(o.colorWarningBg, o.colorBgContainer),
      fontSizeIcon: o.fontSizeSM,
      lineWidth: o.lineWidth,
      controlOutlineWidth: o.lineWidth * 2,
      controlInteractiveSize: o.controlHeight / 2,
      controlItemBgHover: o.colorFillTertiary,
      controlItemBgActive: o.colorPrimaryBg,
      controlItemBgActiveHover: o.colorPrimaryBgHover,
      controlItemBgActiveDisabled: o.colorFill,
      controlTmpOutline: o.colorFillQuaternary,
      controlOutline: st(o.colorPrimaryBg, o.colorBgContainer),
      lineType: o.lineType,
      borderRadius: o.borderRadius,
      borderRadiusXS: o.borderRadiusXS,
      borderRadiusSM: o.borderRadiusSM,
      borderRadiusLG: o.borderRadiusLG,
      fontWeightStrong: 600,
      opacityLoading: 0.65,
      linkDecoration: 'none',
      linkHoverDecoration: 'none',
      linkFocusDecoration: 'none',
      controlPaddingHorizontal: 12,
      controlPaddingHorizontalSM: 8,
      paddingXXS: o.sizeXXS,
      paddingXS: o.sizeXS,
      paddingSM: o.sizeSM,
      padding: o.size,
      paddingMD: o.sizeMD,
      paddingLG: o.sizeLG,
      paddingXL: o.sizeXL,
      paddingContentHorizontalLG: o.sizeLG,
      paddingContentVerticalLG: o.sizeMS,
      paddingContentHorizontal: o.sizeMS,
      paddingContentVertical: o.sizeSM,
      paddingContentHorizontalSM: o.size,
      paddingContentVerticalSM: o.sizeXS,
      marginXXS: o.sizeXXS,
      marginXS: o.sizeXS,
      marginSM: o.sizeSM,
      margin: o.size,
      marginMD: o.sizeMD,
      marginLG: o.sizeLG,
      marginXL: o.sizeXL,
      marginXXL: o.sizeXXL,
      boxShadow: `
      0 1px 2px 0 rgba(0, 0, 0, 0.03),
      0 1px 6px -1px rgba(0, 0, 0, 0.02),
      0 2px 4px 0 rgba(0, 0, 0, 0.02)
    `,
      boxShadowSecondary: `
      0 6px 16px 0 rgba(0, 0, 0, 0.08),
      0 3px 6px -4px rgba(0, 0, 0, 0.12),
      0 9px 28px 8px rgba(0, 0, 0, 0.05)
    `,
      boxShadowTertiary: `
      0 1px 2px 0 rgba(0, 0, 0, 0.03),
      0 1px 6px -1px rgba(0, 0, 0, 0.02),
      0 2px 4px 0 rgba(0, 0, 0, 0.02)
    `,
      screenXS: i,
      screenXSMin: i,
      screenXSMax: a - 1,
      screenSM: a,
      screenSMMin: a,
      screenSMMax: s - 1,
      screenMD: s,
      screenMDMin: s,
      screenMDMax: f - 1,
      screenLG: f,
      screenLGMin: f,
      screenLGMax: c - 1,
      screenXL: c,
      screenXLMin: c,
      screenXLMax: l - 1,
      screenXXL: l,
      screenXXLMin: l,
      screenXXLMax: u - 1,
      screenXXXL: u,
      screenXXXLMin: u,
      boxShadowPopoverArrow: '3px 3px 7px rgba(0, 0, 0, 0.1)',
      boxShadowCard: `
      0 1px 2px -2px ${new F('rgba(0, 0, 0, 0.16)').toRgbString()},
      0 3px 6px 0 ${new F('rgba(0, 0, 0, 0.12)').toRgbString()},
      0 5px 12px 4px ${new F('rgba(0, 0, 0, 0.09)').toRgbString()}
    `,
      boxShadowDrawerRight: `
      -6px 0 16px 0 rgba(0, 0, 0, 0.08),
      -3px 0 6px -4px rgba(0, 0, 0, 0.12),
      -9px 0 28px 8px rgba(0, 0, 0, 0.05)
    `,
      boxShadowDrawerLeft: `
      6px 0 16px 0 rgba(0, 0, 0, 0.08),
      3px 0 6px -4px rgba(0, 0, 0, 0.12),
      9px 0 28px 8px rgba(0, 0, 0, 0.05)
    `,
      boxShadowDrawerUp: `
      0 6px 16px 0 rgba(0, 0, 0, 0.08),
      0 3px 6px -4px rgba(0, 0, 0, 0.12),
      0 9px 28px 8px rgba(0, 0, 0, 0.05)
    `,
      boxShadowDrawerDown: `
      0 -6px 16px 0 rgba(0, 0, 0, 0.08),
      0 -3px 6px -4px rgba(0, 0, 0, 0.12),
      0 -9px 28px 8px rgba(0, 0, 0, 0.05)
    `,
      boxShadowTabsOverflowLeft: 'inset 10px 0 8px -8px rgba(0, 0, 0, 0.08)',
      boxShadowTabsOverflowRight: 'inset -10px 0 8px -8px rgba(0, 0, 0, 0.08)',
      boxShadowTabsOverflowTop: 'inset 0 10px 8px -8px rgba(0, 0, 0, 0.08)',
      boxShadowTabsOverflowBottom: 'inset 0 -10px 8px -8px rgba(0, 0, 0, 0.08)'
    }),
    r
  );
}
const nm = {
    overflow: 'hidden',
    whiteSpace: 'nowrap',
    textOverflow: 'ellipsis'
  },
  ai = e => ({
    boxSizing: 'border-box',
    margin: 0,
    padding: 0,
    color: e.colorText,
    fontSize: e.fontSize,
    lineHeight: e.lineHeight,
    listStyle: 'none',
    fontFamily: e.fontFamily
  }),
  rc = () => ({
    display: 'inline-flex',
    alignItems: 'center',
    color: 'inherit',
    fontStyle: 'normal',
    lineHeight: 0,
    textAlign: 'center',
    textTransform: 'none',
    verticalAlign: '-0.125em',
    textRendering: 'optimizeLegibility',
    '-webkit-font-smoothing': 'antialiased',
    '-moz-osx-font-smoothing': 'grayscale',
    '> *': { lineHeight: 1 },
    svg: { display: 'inline-block' }
  }),
  rm = () => ({
    '&::before': { display: 'table', content: '""' },
    '&::after': { display: 'table', clear: 'both', content: '""' }
  }),
  oc = e => ({
    a: {
      color: e.colorLink,
      textDecoration: e.linkDecoration,
      backgroundColor: 'transparent',
      outline: 'none',
      cursor: 'pointer',
      transition: `color ${e.motionDurationSlow}`,
      '-webkit-text-decoration-skip': 'objects',
      '&:hover': { color: e.colorLinkHover },
      '&:active': { color: e.colorLinkActive },
      '&:active,\n  &:hover': {
        textDecoration: e.linkHoverDecoration,
        outline: 0
      },
      '&:focus': { textDecoration: e.linkFocusDecoration, outline: 0 },
      '&[disabled]': { color: e.colorTextDisabled, cursor: 'not-allowed' }
    }
  }),
  ic = (e, t) => {
    const { fontFamily: n, fontSize: r } = e,
      o = `[class^="${t}"], [class*=" ${t}"]`;
    return {
      [o]: {
        fontFamily: n,
        fontSize: r,
        boxSizing: 'border-box',
        '&::before, &::after': { boxSizing: 'border-box' },
        [o]: {
          boxSizing: 'border-box',
          '&::before, &::after': { boxSizing: 'border-box' }
        }
      }
    };
  },
  ac = e => ({
    outline: `${e.lineWidthBold}px solid ${e.colorPrimaryBorder}`,
    outlineOffset: 1,
    transition: 'outline-offset 0s, outline 0s'
  }),
  om = e => ({ '&:focus-visible': y({}, ac(e)) });
function zn(e, t, n) {
  return r => {
    const o = P(() => (r == null ? void 0 : r.value)),
      [i, a, s] = Nt(),
      { getPrefixCls: f, iconPrefixCls: c } = _o(),
      l = P(() => f()),
      u = P(() => ({
        theme: i.value,
        token: a.value,
        hashId: s.value,
        path: ['Shared', l.value]
      }));
    hn(u, () => [{ '&': oc(a.value) }]);
    const d = P(() => ({
      theme: i.value,
      token: a.value,
      hashId: s.value,
      path: [e, o.value, c.value]
    }));
    return [
      hn(d, () => {
        const { token: m, flush: p } = cc(a.value),
          g = typeof n == 'function' ? n(m) : n,
          w = y(y({}, g), a.value[e]),
          b = `.${o.value}`,
          x = jt(
            m,
            {
              componentCls: b,
              prefixCls: o.value,
              iconCls: `.${c.value}`,
              antCls: `.${l.value}`
            },
            w
          ),
          T = t(x, {
            hashId: s.value,
            prefixCls: o.value,
            rootPrefixCls: l.value,
            iconPrefixCls: c.value,
            overrideComponentToken: a.value[e]
          });
        return p(e, w), [ic(a.value, o.value), T];
      }),
      s
    ];
  };
}
const sc = !0;
let yn = !0;
function jt() {
  for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++)
    t[n] = arguments[n];
  yn = !1;
  const r = {};
  return (
    t.forEach(o => {
      Object.keys(o).forEach(a => {
        Object.defineProperty(r, a, {
          configurable: !0,
          enumerable: !0,
          get: () => o[a]
        });
      });
    }),
    (yn = !0),
    r
  );
}
function lc() {}
function cc(e) {
  let t,
    n = e,
    r = lc;
  return (
    sc &&
      ((t = new Set()),
      (n = new Proxy(e, {
        get(o, i) {
          return yn && t.add(i), o[i];
        }
      })),
      (r = (o, i) => {
        Array.from(t);
      })),
    { token: n, keys: t, flush: r }
  );
}
function uc(e) {
  if (!La(e)) return Se(e);
  const t = new Proxy(
    {},
    {
      get(n, r, o) {
        return Reflect.get(e.value, r, o);
      },
      set(n, r, o) {
        return (e.value[r] = o), !0;
      },
      deleteProperty(n, r) {
        return Reflect.deleteProperty(e.value, r);
      },
      has(n, r) {
        return Reflect.has(e.value, r);
      },
      ownKeys() {
        return Object.keys(e.value);
      },
      getOwnPropertyDescriptor() {
        return { enumerable: !0, configurable: !0 };
      }
    }
  );
  return Se(t);
}
const fc = Go(ec),
  si = { token: kt, hashed: !0 },
  li = Symbol('DesignTokenContext'),
  ci = B(),
  dc = e => {
    fe(li, e),
      ot(() => {
        ci.value = e;
      });
  },
  pc = M({
    props: { value: K() },
    setup(e, t) {
      let { slots: n } = t;
      return (
        dc(uc(P(() => e.value))),
        () => {
          var r;
          return (r = n.default) === null || r === void 0 ? void 0 : r.call(n);
        }
      );
    }
  });
function Nt() {
  const e = ae(li, ci.value || si),
    t = P(() => `${Hl}-${e.hashed || ''}`),
    n = P(() => e.theme || fc),
    r = ul(
      n,
      P(() => [kt, e.token]),
      P(() => ({
        salt: t.value,
        override: y({ override: e.token }, e.components),
        formatToken: nc
      }))
    );
  return [n, P(() => r.value[0]), P(() => (e.hashed ? r.value[1] : ''))];
}
const ui = M({
  compatConfig: { MODE: 3 },
  setup() {
    const [, e] = Nt(),
      t = P(() =>
        new F(e.value.colorBgBase).toHsl().l < 0.5 ? { opacity: 0.65 } : {}
      );
    return () =>
      v(
        'svg',
        {
          style: t.value,
          width: '184',
          height: '152',
          viewBox: '0 0 184 152',
          xmlns: 'http://www.w3.org/2000/svg'
        },
        [
          v('g', { fill: 'none', 'fill-rule': 'evenodd' }, [
            v('g', { transform: 'translate(24 31.67)' }, [
              v(
                'ellipse',
                {
                  'fill-opacity': '.8',
                  fill: '#F5F5F7',
                  cx: '67.797',
                  cy: '106.89',
                  rx: '67.797',
                  ry: '12.668'
                },
                null
              ),
              v(
                'path',
                {
                  d:
                    'M122.034 69.674L98.109 40.229c-1.148-1.386-2.826-2.225-4.593-2.225h-51.44c-1.766 0-3.444.839-4.592 2.225L13.56 69.674v15.383h108.475V69.674z',
                  fill: '#AEB8C2'
                },
                null
              ),
              v(
                'path',
                {
                  d:
                    'M101.537 86.214L80.63 61.102c-1.001-1.207-2.507-1.867-4.048-1.867H31.724c-1.54 0-3.047.66-4.048 1.867L6.769 86.214v13.792h94.768V86.214z',
                  fill: 'url(#linearGradient-1)',
                  transform: 'translate(13.56)'
                },
                null
              ),
              v(
                'path',
                {
                  d:
                    'M33.83 0h67.933a4 4 0 0 1 4 4v93.344a4 4 0 0 1-4 4H33.83a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4z',
                  fill: '#F5F5F7'
                },
                null
              ),
              v(
                'path',
                {
                  d:
                    'M42.678 9.953h50.237a2 2 0 0 1 2 2V36.91a2 2 0 0 1-2 2H42.678a2 2 0 0 1-2-2V11.953a2 2 0 0 1 2-2zM42.94 49.767h49.713a2.262 2.262 0 1 1 0 4.524H42.94a2.262 2.262 0 0 1 0-4.524zM42.94 61.53h49.713a2.262 2.262 0 1 1 0 4.525H42.94a2.262 2.262 0 0 1 0-4.525zM121.813 105.032c-.775 3.071-3.497 5.36-6.735 5.36H20.515c-3.238 0-5.96-2.29-6.734-5.36a7.309 7.309 0 0 1-.222-1.79V69.675h26.318c2.907 0 5.25 2.448 5.25 5.42v.04c0 2.971 2.37 5.37 5.277 5.37h34.785c2.907 0 5.277-2.421 5.277-5.393V75.1c0-2.972 2.343-5.426 5.25-5.426h26.318v33.569c0 .617-.077 1.216-.221 1.789z',
                  fill: '#DCE0E6'
                },
                null
              )
            ]),
            v(
              'path',
              {
                d:
                  'M149.121 33.292l-6.83 2.65a1 1 0 0 1-1.317-1.23l1.937-6.207c-2.589-2.944-4.109-6.534-4.109-10.408C138.802 8.102 148.92 0 161.402 0 173.881 0 184 8.102 184 18.097c0 9.995-10.118 18.097-22.599 18.097-4.528 0-8.744-1.066-12.28-2.902z',
                fill: '#DCE0E6'
              },
              null
            ),
            v('g', { transform: 'translate(149.65 15.383)', fill: '#FFF' }, [
              v(
                'ellipse',
                { cx: '20.654', cy: '3.167', rx: '2.849', ry: '2.815' },
                null
              ),
              v(
                'path',
                { d: 'M5.698 5.63H0L2.898.704zM9.259.704h4.985V5.63H9.259z' },
                null
              )
            ])
          ])
        ]
      );
  }
});
ui.PRESENTED_IMAGE_DEFAULT = !0;
const mc = ui,
  fi = M({
    compatConfig: { MODE: 3 },
    setup() {
      const [, e] = Nt(),
        t = P(() => {
          const {
            colorFill: n,
            colorFillTertiary: r,
            colorFillQuaternary: o,
            colorBgContainer: i
          } = e.value;
          return {
            borderColor: new F(n).onBackground(i).toHexString(),
            shadowColor: new F(r).onBackground(i).toHexString(),
            contentColor: new F(o).onBackground(i).toHexString()
          };
        });
      return () =>
        v(
          'svg',
          {
            width: '64',
            height: '41',
            viewBox: '0 0 64 41',
            xmlns: 'http://www.w3.org/2000/svg'
          },
          [
            v(
              'g',
              {
                transform: 'translate(0 1)',
                fill: 'none',
                'fill-rule': 'evenodd'
              },
              [
                v(
                  'ellipse',
                  {
                    fill: t.value.shadowColor,
                    cx: '32',
                    cy: '33',
                    rx: '32',
                    ry: '7'
                  },
                  null
                ),
                v(
                  'g',
                  { 'fill-rule': 'nonzero', stroke: t.value.borderColor },
                  [
                    v(
                      'path',
                      {
                        d:
                          'M55 12.76L44.854 1.258C44.367.474 43.656 0 42.907 0H21.093c-.749 0-1.46.474-1.947 1.257L9 12.761V22h46v-9.24z'
                      },
                      null
                    ),
                    v(
                      'path',
                      {
                        d:
                          'M41.613 15.931c0-1.605.994-2.93 2.227-2.931H55v18.137C55 33.26 53.68 35 52.05 35h-40.1C10.32 35 9 33.259 9 31.137V13h11.16c1.233 0 2.227 1.323 2.227 2.928v.022c0 1.605 1.005 2.901 2.237 2.901h14.752c1.232 0 2.237-1.308 2.237-2.913v-.007z',
                        fill: t.value.contentColor
                      },
                      null
                    )
                  ]
                )
              ]
            )
          ]
        );
    }
  });
fi.PRESENTED_IMAGE_SIMPLE = !0;
const gc = fi,
  hc = e => {
    const {
      componentCls: t,
      margin: n,
      marginXS: r,
      marginXL: o,
      fontSize: i,
      lineHeight: a
    } = e;
    return {
      [t]: {
        marginInline: r,
        fontSize: i,
        lineHeight: a,
        textAlign: 'center',
        [`${t}-image`]: {
          height: e.emptyImgHeight,
          marginBottom: r,
          opacity: e.opacityImage,
          img: { height: '100%' },
          svg: { height: '100%', margin: 'auto' }
        },
        [`${t}-footer`]: { marginTop: n },
        '&-normal': {
          marginBlock: o,
          color: e.colorTextDisabled,
          [`${t}-image`]: { height: e.emptyImgHeightMD }
        },
        '&-small': {
          marginBlock: r,
          color: e.colorTextDisabled,
          [`${t}-image`]: { height: e.emptyImgHeightSM }
        }
      }
    };
  },
  yc = zn('Empty', e => {
    const { componentCls: t, controlHeightLG: n } = e,
      r = jt(e, {
        emptyImgCls: `${t}-img`,
        emptyImgHeight: n * 2.5,
        emptyImgHeightMD: n,
        emptyImgHeightSM: n * 0.875
      });
    return [hc(r)];
  });
var vc =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var r in e)
      Object.prototype.hasOwnProperty.call(e, r) &&
        t.indexOf(r) < 0 &&
        (n[r] = e[r]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var o = 0, r = Object.getOwnPropertySymbols(e); o < r.length; o++)
        t.indexOf(r[o]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, r[o]) &&
          (n[r[o]] = e[r[o]]);
    return n;
  };
const di = v(mc, null, null),
  pi = v(gc, null, null),
  bc = () => ({
    prefixCls: String,
    imageStyle: K(),
    image: cn(),
    description: cn()
  }),
  Un = M({
    name: 'AEmpty',
    compatConfig: { MODE: 3 },
    inheritAttrs: !1,
    props: bc(),
    setup(e, t) {
      let { slots: n = {}, attrs: r } = t;
      const { direction: o, prefixCls: i } = Mt('empty', e),
        [a, s] = yc(i);
      return () => {
        var f, c;
        const l = i.value,
          u = y(y({}, e), r),
          {
            image: d = ((f = n.image) === null || f === void 0
              ? void 0
              : f.call(n)) || di,
            description: m = ((c = n.description) === null || c === void 0
              ? void 0
              : c.call(n)) || void 0,
            imageStyle: p,
            class: g = ''
          } = u,
          w = vc(u, ['image', 'description', 'imageStyle', 'class']);
        return a(
          v(
            ko,
            {
              componentName: 'Empty',
              children: b => {
                const x = typeof m < 'u' ? m : b.description,
                  T = typeof x == 'string' ? x : 'empty';
                let $ = null;
                return (
                  typeof d == 'string'
                    ? ($ = v('img', { alt: T, src: d }, null))
                    : ($ = d),
                  v(
                    'div',
                    D(
                      {
                        class: G(l, g, s.value, {
                          [`${l}-normal`]: d === pi,
                          [`${l}-rtl`]: o.value === 'rtl'
                        })
                      },
                      w
                    ),
                    [
                      v('div', { class: `${l}-image`, style: p }, [$]),
                      x && v('p', { class: `${l}-description` }, [x]),
                      n.default &&
                        v('div', { class: `${l}-footer` }, [$o(n.default())])
                    ]
                  )
                );
              }
            },
            null
          )
        );
      };
    }
  });
Un.PRESENTED_IMAGE_DEFAULT = di;
Un.PRESENTED_IMAGE_SIMPLE = pi;
const qe = Nn(Un),
  mi = e => {
    const { prefixCls: t } = Mt('empty', e);
    return (r => {
      switch (r) {
        case 'Table':
        case 'List':
          return v(qe, { image: qe.PRESENTED_IMAGE_SIMPLE }, null);
        case 'Select':
        case 'TreeSelect':
        case 'Cascader':
        case 'Transfer':
        case 'Mentions':
          return v(
            qe,
            { image: qe.PRESENTED_IMAGE_SIMPLE, class: `${t.value}-small` },
            null
          );
        default:
          return v(qe, null, null);
      }
    })(e.componentName);
  };
function Cc(e) {
  return v(mi, { componentName: e }, null);
}
const gi = Symbol('SizeContextKey'),
  hi = () => ae(gi, B(void 0)),
  Sc = e => {
    const t = hi();
    return (
      fe(
        gi,
        P(() => e.value || t.value)
      ),
      e
    );
  },
  Mt = (e, t) => {
    const n = hi(),
      r = Ro(),
      o = ae(
        Ln,
        y(y({}, Eo), { renderEmpty: S => ln(mi, { componentName: S }) })
      ),
      i = P(() => o.getPrefixCls(e, t.prefixCls)),
      a = P(() => {
        var S, C;
        return (S = t.direction) !== null && S !== void 0
          ? S
          : (C = o.direction) === null || C === void 0
          ? void 0
          : C.value;
      }),
      s = P(() => {
        var S;
        return (S = t.iconPrefixCls) !== null && S !== void 0
          ? S
          : o.iconPrefixCls.value;
      }),
      f = P(() => o.getPrefixCls()),
      c = P(() => {
        var S;
        return (S = o.autoInsertSpaceInButton) === null || S === void 0
          ? void 0
          : S.value;
      }),
      l = o.renderEmpty,
      u = o.space,
      d = o.pageHeader,
      m = o.form,
      p = P(() => {
        var S, C;
        return (S = t.getTargetContainer) !== null && S !== void 0
          ? S
          : (C = o.getTargetContainer) === null || C === void 0
          ? void 0
          : C.value;
      }),
      g = P(() => {
        var S, C;
        return (S = t.getPopupContainer) !== null && S !== void 0
          ? S
          : (C = o.getPopupContainer) === null || C === void 0
          ? void 0
          : C.value;
      }),
      w = P(() => {
        var S, C;
        return (S = t.dropdownMatchSelectWidth) !== null && S !== void 0
          ? S
          : (C = o.dropdownMatchSelectWidth) === null || C === void 0
          ? void 0
          : C.value;
      }),
      b = P(() => {
        var S;
        return (
          (t.virtual === void 0
            ? ((S = o.virtual) === null || S === void 0 ? void 0 : S.value) !==
              !1
            : t.virtual !== !1) && w.value !== !1
        );
      }),
      x = P(() => t.size || n.value),
      T = P(() => {
        var S, C, _;
        return (S = t.autocomplete) !== null && S !== void 0
          ? S
          : (_ = (C = o.input) === null || C === void 0 ? void 0 : C.value) ===
              null || _ === void 0
          ? void 0
          : _.autocomplete;
      }),
      $ = P(() => {
        var S;
        return (S = t.disabled) !== null && S !== void 0 ? S : r.value;
      }),
      E = P(() => {
        var S;
        return (S = t.csp) !== null && S !== void 0 ? S : o.csp;
      });
    return {
      configProvider: o,
      prefixCls: i,
      direction: a,
      size: x,
      getTargetContainer: p,
      getPopupContainer: g,
      space: u,
      pageHeader: d,
      form: m,
      autoInsertSpaceInButton: c,
      renderEmpty: l,
      virtual: b,
      dropdownMatchSelectWidth: w,
      rootPrefixCls: f,
      getPrefixCls: o.getPrefixCls,
      autocomplete: T,
      csp: E,
      iconPrefixCls: s,
      disabled: $,
      select: o.select
    };
  };
function jr(e, t) {
  for (var n = 0; n < t.length; n++) {
    var r = t[n];
    (r.enumerable = r.enumerable || !1),
      (r.configurable = !0),
      'value' in r && (r.writable = !0),
      Object.defineProperty(e, r.key, r);
  }
}
function yi(e, t, n) {
  return t && jr(e.prototype, t), n && jr(e, n), e;
}
function dt() {
  return (dt =
    Object.assign ||
    function(e) {
      for (var t = 1; t < arguments.length; t++) {
        var n = arguments[t];
        for (var r in n)
          Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r]);
      }
      return e;
    }).apply(this, arguments);
}
function vi(e, t) {
  (e.prototype = Object.create(t.prototype)),
    (e.prototype.constructor = e),
    (e.__proto__ = t);
}
function bi(e, t) {
  if (e == null) return {};
  var n,
    r,
    o = {},
    i = Object.keys(e);
  for (r = 0; r < i.length; r++) t.indexOf((n = i[r])) >= 0 || (o[n] = e[n]);
  return o;
}
function Nr(e) {
  return (
    ((t = e) != null && typeof t == 'object' && Array.isArray(t) === !1) == 1 &&
    Object.prototype.toString.call(e) === '[object Object]'
  );
  var t;
}
var Ci = Object.prototype,
  Si = Ci.toString,
  xc = Ci.hasOwnProperty,
  xi = /^\s*function (\w+)/;
function Mr(e) {
  var t,
    n = (t = e == null ? void 0 : e.type) !== null && t !== void 0 ? t : e;
  if (n) {
    var r = n.toString().match(xi);
    return r ? r[1] : '';
  }
  return '';
}
var xe = function(e) {
    var t, n;
    return (
      Nr(e) !== !1 &&
      typeof (t = e.constructor) == 'function' &&
      Nr((n = t.prototype)) !== !1 &&
      n.hasOwnProperty('isPrototypeOf') !== !1
    );
  },
  wi = function(e) {
    return e;
  },
  z = wi;
{
  var wc = typeof console < 'u';
  z = wc
    ? function(e) {
        console.warn('[VueTypes warn]: ' + e);
      }
    : wi;
}
var et = function(e, t) {
    return xc.call(e, t);
  },
  Oc =
    Number.isInteger ||
    function(e) {
      return typeof e == 'number' && isFinite(e) && Math.floor(e) === e;
    },
  ke =
    Array.isArray ||
    function(e) {
      return Si.call(e) === '[object Array]';
    },
  je = function(e) {
    return Si.call(e) === '[object Function]';
  },
  Ot = function(e) {
    return xe(e) && et(e, '_vueTypes_name');
  },
  Oi = function(e) {
    return (
      xe(e) &&
      (et(e, 'type') ||
        ['_vueTypes_name', 'validator', 'default', 'required'].some(function(
          t
        ) {
          return et(e, t);
        }))
    );
  };
function qn(e, t) {
  return Object.defineProperty(e.bind(t), '__original', { value: e });
}
function Oe(e, t, n) {
  var r;
  n === void 0 && (n = !1);
  var o = !0,
    i = '';
  r = xe(e) ? e : { type: e };
  var a = Ot(r) ? r._vueTypes_name + ' - ' : '';
  if (Oi(r) && r.type !== null) {
    if (r.type === void 0 || r.type === !0 || (!r.required && t === void 0))
      return o;
    ke(r.type)
      ? ((o = r.type.some(function(u) {
          return Oe(u, t, !0) === !0;
        })),
        (i = r.type
          .map(function(u) {
            return Mr(u);
          })
          .join(' or ')))
      : (o =
          (i = Mr(r)) === 'Array'
            ? ke(t)
            : i === 'Object'
            ? xe(t)
            : i === 'String' ||
              i === 'Number' ||
              i === 'Boolean' ||
              i === 'Function'
            ? (function(u) {
                if (u == null) return '';
                var d = u.constructor.toString().match(xi);
                return d ? d[1] : '';
              })(t) === i
            : t instanceof r.type);
  }
  if (!o) {
    var s = a + 'value "' + t + '" should be of type "' + i + '"';
    return n === !1 ? (z(s), !1) : s;
  }
  if (et(r, 'validator') && je(r.validator)) {
    var f = z,
      c = [];
    if (
      ((z = function(u) {
        c.push(u);
      }),
      (o = r.validator(t)),
      (z = f),
      !o)
    ) {
      var l =
        (c.length > 1 ? '* ' : '') +
        c.join(`
* `);
      return (c.length = 0), n === !1 ? (z(l), o) : l;
    }
  }
  return o;
}
function V(e, t) {
  var n = Object.defineProperties(t, {
      _vueTypes_name: { value: e, writable: !0 },
      isRequired: {
        get: function() {
          return (this.required = !0), this;
        }
      },
      def: {
        value: function(o) {
          return o !== void 0 || this.default
            ? je(o) || Oe(this, o, !0) === !0
              ? ((this.default = ke(o)
                  ? function() {
                      return [].concat(o);
                    }
                  : xe(o)
                  ? function() {
                      return Object.assign({}, o);
                    }
                  : o),
                this)
              : (z(
                  this._vueTypes_name + ' - invalid default value: "' + o + '"'
                ),
                this)
            : this;
        }
      }
    }),
    r = n.validator;
  return je(r) && (n.validator = qn(r, n)), n;
}
function ie(e, t) {
  var n = V(e, t);
  return Object.defineProperty(n, 'validate', {
    value: function(r) {
      return (
        je(this.validator) &&
          z(
            this._vueTypes_name +
              ` - calling .validate() will overwrite the current custom validator function. Validator info:
` +
              JSON.stringify(this)
          ),
        (this.validator = qn(r, this)),
        this
      );
    }
  });
}
function Lr(e, t, n) {
  var r,
    o,
    i =
      ((r = t),
      (o = {}),
      Object.getOwnPropertyNames(r).forEach(function(u) {
        o[u] = Object.getOwnPropertyDescriptor(r, u);
      }),
      Object.defineProperties({}, o));
  if (((i._vueTypes_name = e), !xe(n))) return i;
  var a,
    s,
    f = n.validator,
    c = bi(n, ['validator']);
  if (je(f)) {
    var l = i.validator;
    l && (l = (s = (a = l).__original) !== null && s !== void 0 ? s : a),
      (i.validator = qn(
        l
          ? function(u) {
              return l.call(this, u) && f.call(this, u);
            }
          : f,
        i
      ));
  }
  return Object.assign(i, c);
}
function Lt(e) {
  return e.replace(/^(?!\s*$)/gm, '  ');
}
var Pc = function() {
    return ie('any', {});
  },
  Tc = function() {
    return ie('function', { type: Function });
  },
  $c = function() {
    return ie('boolean', { type: Boolean });
  },
  Ec = function() {
    return ie('string', { type: String });
  },
  _c = function() {
    return ie('number', { type: Number });
  },
  Ac = function() {
    return ie('array', { type: Array });
  },
  Rc = function() {
    return ie('object', { type: Object });
  },
  Ic = function() {
    return V('integer', {
      type: Number,
      validator: function(e) {
        return Oc(e);
      }
    });
  },
  kc = function() {
    return V('symbol', {
      validator: function(e) {
        return typeof e == 'symbol';
      }
    });
  };
function jc(e, t) {
  if (
    (t === void 0 && (t = 'custom validation failed'), typeof e != 'function')
  )
    throw new TypeError(
      '[VueTypes error]: You must provide a function as argument'
    );
  return V(e.name || '<<anonymous function>>', {
    validator: function(n) {
      var r = e(n);
      return r || z(this._vueTypes_name + ' - ' + t), r;
    }
  });
}
function Nc(e) {
  if (!ke(e))
    throw new TypeError(
      '[VueTypes error]: You must provide an array as argument.'
    );
  var t = 'oneOf - value should be one of "' + e.join('", "') + '".',
    n = e.reduce(function(r, o) {
      if (o != null) {
        var i = o.constructor;
        r.indexOf(i) === -1 && r.push(i);
      }
      return r;
    }, []);
  return V('oneOf', {
    type: n.length > 0 ? n : void 0,
    validator: function(r) {
      var o = e.indexOf(r) !== -1;
      return o || z(t), o;
    }
  });
}
function Mc(e) {
  if (!ke(e))
    throw new TypeError(
      '[VueTypes error]: You must provide an array as argument'
    );
  for (var t = !1, n = [], r = 0; r < e.length; r += 1) {
    var o = e[r];
    if (Oi(o)) {
      if (Ot(o) && o._vueTypes_name === 'oneOf') {
        n = n.concat(o.type);
        continue;
      }
      if ((je(o.validator) && (t = !0), o.type !== !0 && o.type)) {
        n = n.concat(o.type);
        continue;
      }
    }
    n.push(o);
  }
  return (
    (n = n.filter(function(i, a) {
      return n.indexOf(i) === a;
    })),
    V(
      'oneOfType',
      t
        ? {
            type: n,
            validator: function(i) {
              var a = [],
                s = e.some(function(f) {
                  var c = Oe(
                    Ot(f) && f._vueTypes_name === 'oneOf' ? f.type || null : f,
                    i,
                    !0
                  );
                  return typeof c == 'string' && a.push(c), c === !0;
                });
              return (
                s ||
                  z(
                    'oneOfType - provided value does not match any of the ' +
                      a.length +
                      ` passed-in validators:
` +
                      Lt(
                        a.join(`
`)
                      )
                  ),
                s
              );
            }
          }
        : { type: n }
    )
  );
}
function Lc(e) {
  return V('arrayOf', {
    type: Array,
    validator: function(t) {
      var n,
        r = t.every(function(o) {
          return (n = Oe(e, o, !0)) === !0;
        });
      return (
        r ||
          z(
            `arrayOf - value validation error:
` + Lt(n)
          ),
        r
      );
    }
  });
}
function Fc(e) {
  return V('instanceOf', { type: e });
}
function Dc(e) {
  return V('objectOf', {
    type: Object,
    validator: function(t) {
      var n,
        r = Object.keys(t).every(function(o) {
          return (n = Oe(e, t[o], !0)) === !0;
        });
      return (
        r ||
          z(
            `objectOf - value validation error:
` + Lt(n)
          ),
        r
      );
    }
  });
}
function Hc(e) {
  var t = Object.keys(e),
    n = t.filter(function(o) {
      var i;
      return !!(!((i = e[o]) === null || i === void 0) && i.required);
    }),
    r = V('shape', {
      type: Object,
      validator: function(o) {
        var i = this;
        if (!xe(o)) return !1;
        var a = Object.keys(o);
        if (
          n.length > 0 &&
          n.some(function(f) {
            return a.indexOf(f) === -1;
          })
        ) {
          var s = n.filter(function(f) {
            return a.indexOf(f) === -1;
          });
          return (
            z(
              s.length === 1
                ? 'shape - required property "' + s[0] + '" is not defined.'
                : 'shape - required properties "' +
                    s.join('", "') +
                    '" are not defined.'
            ),
            !1
          );
        }
        return a.every(function(f) {
          if (t.indexOf(f) === -1)
            return (
              i._vueTypes_isLoose === !0 ||
              (z(
                'shape - shape definition does not include a "' +
                  f +
                  '" property. Allowed keys: "' +
                  t.join('", "') +
                  '".'
              ),
              !1)
            );
          var c = Oe(e[f], o[f], !0);
          return (
            typeof c == 'string' &&
              z(
                'shape - "' +
                  f +
                  `" property validation error:
 ` +
                  Lt(c)
              ),
            c === !0
          );
        });
      }
    });
  return (
    Object.defineProperty(r, '_vueTypes_isLoose', { writable: !0, value: !1 }),
    Object.defineProperty(r, 'loose', {
      get: function() {
        return (this._vueTypes_isLoose = !0), this;
      }
    }),
    r
  );
}
var re = (function() {
  function e() {}
  return (
    (e.extend = function(t) {
      var n = this;
      if (ke(t))
        return (
          t.forEach(function(u) {
            return n.extend(u);
          }),
          this
        );
      var r = t.name,
        o = t.validate,
        i = o !== void 0 && o,
        a = t.getter,
        s = a !== void 0 && a,
        f = bi(t, ['name', 'validate', 'getter']);
      if (et(this, r))
        throw new TypeError(
          '[VueTypes error]: Type "' + r + '" already defined'
        );
      var c,
        l = f.type;
      return Ot(l)
        ? (delete f.type,
          Object.defineProperty(
            this,
            r,
            s
              ? {
                  get: function() {
                    return Lr(r, l, f);
                  }
                }
              : {
                  value: function() {
                    var u,
                      d = Lr(r, l, f);
                    return (
                      d.validator &&
                        (d.validator = (u = d.validator).bind.apply(
                          u,
                          [d].concat([].slice.call(arguments))
                        )),
                      d
                    );
                  }
                }
          ))
        : ((c = s
            ? {
                get: function() {
                  var u = Object.assign({}, f);
                  return i ? ie(r, u) : V(r, u);
                },
                enumerable: !0
              }
            : {
                value: function() {
                  var u,
                    d,
                    m = Object.assign({}, f);
                  return (
                    (u = i ? ie(r, m) : V(r, m)),
                    m.validator &&
                      (u.validator = (d = m.validator).bind.apply(
                        d,
                        [u].concat([].slice.call(arguments))
                      )),
                    u
                  );
                },
                enumerable: !0
              }),
          Object.defineProperty(this, r, c));
    }),
    yi(e, null, [
      {
        key: 'any',
        get: function() {
          return Pc();
        }
      },
      {
        key: 'func',
        get: function() {
          return Tc().def(this.defaults.func);
        }
      },
      {
        key: 'bool',
        get: function() {
          return $c().def(this.defaults.bool);
        }
      },
      {
        key: 'string',
        get: function() {
          return Ec().def(this.defaults.string);
        }
      },
      {
        key: 'number',
        get: function() {
          return _c().def(this.defaults.number);
        }
      },
      {
        key: 'array',
        get: function() {
          return Ac().def(this.defaults.array);
        }
      },
      {
        key: 'object',
        get: function() {
          return Rc().def(this.defaults.object);
        }
      },
      {
        key: 'integer',
        get: function() {
          return Ic().def(this.defaults.integer);
        }
      },
      {
        key: 'symbol',
        get: function() {
          return kc();
        }
      }
    ]),
    e
  );
})();
function Pi(e) {
  var t;
  return (
    e === void 0 &&
      (e = {
        func: function() {},
        bool: !0,
        string: '',
        number: 0,
        array: function() {
          return [];
        },
        object: function() {
          return {};
        },
        integer: 0
      }),
    ((t = (function(n) {
      function r() {
        return n.apply(this, arguments) || this;
      }
      return (
        vi(r, n),
        yi(r, null, [
          {
            key: 'sensibleDefaults',
            get: function() {
              return dt({}, this.defaults);
            },
            set: function(o) {
              this.defaults = o !== !1 ? dt({}, o !== !0 ? o : e) : {};
            }
          }
        ]),
        r
      );
    })(re)).defaults = dt({}, e)),
    t
  );
}
(re.defaults = {}),
  (re.custom = jc),
  (re.oneOf = Nc),
  (re.instanceOf = Fc),
  (re.oneOfType = Mc),
  (re.arrayOf = Lc),
  (re.objectOf = Dc),
  (re.shape = Hc),
  (re.utils = {
    validate: function(e, t) {
      return Oe(t, e, !0) === !0;
    },
    toType: function(e, t, n) {
      return n === void 0 && (n = !1), n ? ie(e, t) : V(e, t);
    }
  });
(function(e) {
  function t() {
    return e.apply(this, arguments) || this;
  }
  return vi(t, e), t;
})(Pi());
const Ti = Pi({
  func: void 0,
  bool: void 0,
  string: void 0,
  number: void 0,
  array: void 0,
  object: void 0,
  integer: void 0
});
Ti.extend([
  { name: 'looseBool', getter: !0, type: Boolean, default: void 0 },
  { name: 'style', getter: !0, type: [String, Object], default: void 0 },
  { name: 'VueNode', getter: !0, type: null }
]);
const Bc = Ti;
function zc(e) {
  let { prefixCls: t, animation: n, transitionName: r } = e;
  return n ? { name: `${t}-${n}` } : r ? { name: r } : {};
}
$s('bottomLeft', 'bottomRight', 'topLeft', 'topRight');
const im = e =>
    e !== void 0 && (e === 'topLeft' || e === 'topRight')
      ? 'slide-down'
      : 'slide-up',
  am = function(e) {
    let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
    return y(
      e
        ? {
            name: e,
            appear: !0,
            enterFromClass: `${e}-enter ${e}-enter-prepare ${e}-enter-start`,
            enterActiveClass: `${e}-enter ${e}-enter-prepare`,
            enterToClass: `${e}-enter ${e}-enter-active`,
            leaveFromClass: ` ${e}-leave`,
            leaveActiveClass: `${e}-leave ${e}-leave-active`,
            leaveToClass: `${e}-leave ${e}-leave-active`
          }
        : { css: !1 },
      t
    );
  },
  $i = function(e) {
    let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
    return y(
      e
        ? {
            name: e,
            appear: !0,
            appearActiveClass: `${e}`,
            appearToClass: `${e}-appear ${e}-appear-active`,
            enterFromClass: `${e}-appear ${e}-enter ${e}-appear-prepare ${e}-enter-prepare`,
            enterActiveClass: `${e}`,
            enterToClass: `${e}-enter ${e}-appear ${e}-appear-active ${e}-enter-active`,
            leaveActiveClass: `${e} ${e}-leave`,
            leaveToClass: `${e}-leave-active`
          }
        : { css: !1 },
      t
    );
  },
  sm = (e, t, n) => (n !== void 0 ? n : `${e}-${t}`),
  Ei = Symbol('PortalContextKey'),
  Uc = function(e) {
    let t =
      arguments.length > 1 && arguments[1] !== void 0
        ? arguments[1]
        : { inTriggerContext: !0 };
    fe(Ei, {
      inTriggerContext: t.inTriggerContext,
      shouldRender: P(() => {
        const {
          sPopupVisible: n,
          popupRef: r,
          forceRender: o,
          autoDestroy: i
        } = e || {};
        let a = !1;
        return (n || r || o) && (a = !0), !n && i && (a = !1), a;
      })
    });
  },
  qc = () => {
    Uc({}, { inTriggerContext: !1 });
    const e = ae(Ei, { shouldRender: P(() => !1), inTriggerContext: !1 });
    return {
      shouldRender: P(() => e.shouldRender.value || e.inTriggerContext === !1)
    };
  },
  Wc = M({
    compatConfig: { MODE: 3 },
    name: 'Portal',
    inheritAttrs: !1,
    props: { getContainer: Bc.func.isRequired, didUpdate: Function },
    setup(e, t) {
      let { slots: n } = t,
        r = !0,
        o;
      const { shouldRender: i } = qc();
      Fa(() => {
        (r = !1), i.value && (o = e.getContainer());
      });
      const a = de(i, () => {
        i.value && !o && (o = e.getContainer()), o && a();
      });
      return (
        Da(() => {
          So(() => {
            var s;
            i.value &&
              ((s = e.didUpdate) === null || s === void 0 || s.call(e, e));
          });
        }),
        () => {
          var s;
          return i.value
            ? r
              ? (s = n.default) === null || s === void 0
                ? void 0
                : s.call(n)
              : o
              ? v(xo, { to: o }, n)
              : null
            : null;
        }
      );
    }
  });
var Vc = Symbol('iconContext'),
  Wn = function() {
    return ae(Vc, { prefixCls: B('anticon'), rootClassName: B(''), csp: B() });
  };
function Gc() {
  return !!(
    typeof window < 'u' &&
    window.document &&
    window.document.createElement
  );
}
function Xc(e, t) {
  return e && e.contains ? e.contains(t) : !1;
}
var Fr = 'data-vc-order',
  Kc = 'vc-icon-key',
  vn = new Map();
function _i() {
  var e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : {},
    t = e.mark;
  return t ? (t.startsWith('data-') ? t : 'data-'.concat(t)) : Kc;
}
function Vn(e) {
  if (e.attachTo) return e.attachTo;
  var t = document.querySelector('head');
  return t || document.body;
}
function Jc(e) {
  return e === 'queue' ? 'prependQueue' : e ? 'prepend' : 'append';
}
function Ai(e) {
  return Array.from((vn.get(e) || e).children).filter(function(t) {
    return t.tagName === 'STYLE';
  });
}
function Ri(e) {
  var t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
  if (!Gc()) return null;
  var n = t.csp,
    r = t.prepend,
    o = document.createElement('style');
  o.setAttribute(Fr, Jc(r)),
    n && n.nonce && (o.nonce = n.nonce),
    (o.innerHTML = e);
  var i = Vn(t),
    a = i.firstChild;
  if (r) {
    if (r === 'queue') {
      var s = Ai(i).filter(function(f) {
        return ['prepend', 'prependQueue'].includes(f.getAttribute(Fr));
      });
      if (s.length) return i.insertBefore(o, s[s.length - 1].nextSibling), o;
    }
    i.insertBefore(o, a);
  } else i.appendChild(o);
  return o;
}
function Yc(e) {
  var t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {},
    n = Vn(t);
  return Ai(n).find(function(r) {
    return r.getAttribute(_i(t)) === e;
  });
}
function Qc(e, t) {
  var n = vn.get(e);
  if (!n || !Xc(document, n)) {
    var r = Ri('', t),
      o = r.parentNode;
    vn.set(e, o), e.removeChild(r);
  }
}
function Zc(e, t) {
  var n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : {},
    r = Vn(n);
  Qc(r, n);
  var o = Yc(t, n);
  if (o)
    return (
      n.csp &&
        n.csp.nonce &&
        o.nonce !== n.csp.nonce &&
        (o.nonce = n.csp.nonce),
      o.innerHTML !== e && (o.innerHTML = e),
      o
    );
  var i = Ri(e, n);
  return i.setAttribute(_i(n), t), i;
}
function Dr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        eu(e, o, n[o]);
      });
  }
  return e;
}
function eu(e, t, n) {
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
function tu(e, t) {
  !e && console !== void 0 && console.error('Warning: '.concat(t));
}
function bn(e, t) {
  tu(e, '[@ant-design/icons-vue] '.concat(t));
}
function Hr(e) {
  return (
    typeof e == 'object' &&
    typeof e.name == 'string' &&
    typeof e.theme == 'string' &&
    (typeof e.icon == 'object' || typeof e.icon == 'function')
  );
}
function Cn(e, t, n) {
  return n
    ? ln(
        e.tag,
        Dr({ key: t }, n, e.attrs),
        (e.children || []).map(function(r, o) {
          return Cn(
            r,
            ''
              .concat(t, '-')
              .concat(e.tag, '-')
              .concat(o)
          );
        })
      )
    : ln(
        e.tag,
        Dr({ key: t }, e.attrs),
        (e.children || []).map(function(r, o) {
          return Cn(
            r,
            ''
              .concat(t, '-')
              .concat(e.tag, '-')
              .concat(o)
          );
        })
      );
}
function Ii(e) {
  return Je(e)[0];
}
function ki(e) {
  return e ? (Array.isArray(e) ? e : [e]) : [];
}
var nu = {
    width: '1em',
    height: '1em',
    fill: 'currentColor',
    'aria-hidden': 'true',
    focusable: 'false'
  },
  ru = `
.anticon {
  display: inline-block;
  color: inherit;
  font-style: normal;
  line-height: 0;
  text-align: center;
  text-transform: none;
  vertical-align: -0.125em;
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.anticon > * {
  line-height: 1;
}

.anticon svg {
  display: inline-block;
}

.anticon::before {
  display: none;
}

.anticon .anticon-icon {
  display: block;
}

.anticon[tabindex] {
  cursor: pointer;
}

.anticon-spin::before,
.anticon-spin {
  display: inline-block;
  -webkit-animation: loadingCircle 1s infinite linear;
  animation: loadingCircle 1s infinite linear;
}

@-webkit-keyframes loadingCircle {
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes loadingCircle {
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
`;
function ji(e) {
  return e && e.getRootNode && e.getRootNode();
}
function ou(e) {
  return ji(e) instanceof ShadowRoot;
}
function iu(e) {
  return ou(e) ? ji(e) : null;
}
var au = function() {
    var t = Wn(),
      n = t.prefixCls,
      r = t.csp,
      o = Ha(),
      i = ru;
    n && (i = i.replace(/anticon/g, n.value)),
      So(function() {
        var a = o.vnode.el,
          s = iu(a);
        Zc(i, '@ant-design-vue-icons', {
          prepend: !0,
          csp: r.value,
          attachTo: s
        });
      });
  },
  su = ['icon', 'primaryColor', 'secondaryColor'];
function lu(e, t) {
  if (e == null) return {};
  var n = cu(e, t),
    r,
    o;
  if (Object.getOwnPropertySymbols) {
    var i = Object.getOwnPropertySymbols(e);
    for (o = 0; o < i.length; o++)
      (r = i[o]),
        !(t.indexOf(r) >= 0) &&
          Object.prototype.propertyIsEnumerable.call(e, r) &&
          (n[r] = e[r]);
  }
  return n;
}
function cu(e, t) {
  if (e == null) return {};
  var n = {},
    r = Object.keys(e),
    o,
    i;
  for (i = 0; i < r.length; i++)
    (o = r[i]), !(t.indexOf(o) >= 0) && (n[o] = e[o]);
  return n;
}
function pt(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        uu(e, o, n[o]);
      });
  }
  return e;
}
function uu(e, t, n) {
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
var Xe = { primaryColor: '#333', secondaryColor: '#E6E6E6', calculated: !1 };
function fu(e) {
  var t = e.primaryColor,
    n = e.secondaryColor;
  (Xe.primaryColor = t),
    (Xe.secondaryColor = n || Ii(t)),
    (Xe.calculated = !!n);
}
function du() {
  return pt({}, Xe);
}
var De = function(t, n) {
  var r = pt({}, t, n.attrs),
    o = r.icon,
    i = r.primaryColor,
    a = r.secondaryColor,
    s = lu(r, su),
    f = Xe;
  if (
    (i && (f = { primaryColor: i, secondaryColor: a || Ii(i) }),
    bn(Hr(o), 'icon should be icon definiton, but got '.concat(o)),
    !Hr(o))
  )
    return null;
  var c = o;
  return (
    c &&
      typeof c.icon == 'function' &&
      (c = pt({}, c, { icon: c.icon(f.primaryColor, f.secondaryColor) })),
    Cn(
      c.icon,
      'svg-'.concat(c.name),
      pt({}, s, {
        'data-icon': c.name,
        width: '1em',
        height: '1em',
        fill: 'currentColor',
        'aria-hidden': 'true'
      })
    )
  );
};
De.props = {
  icon: Object,
  primaryColor: String,
  secondaryColor: String,
  focusable: String
};
De.inheritAttrs = !1;
De.displayName = 'IconBase';
De.getTwoToneColors = du;
De.setTwoToneColors = fu;
const Gn = De;
function pu(e, t) {
  return yu(e) || hu(e, t) || gu(e, t) || mu();
}
function mu() {
  throw new TypeError(`Invalid attempt to destructure non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function gu(e, t) {
  if (e) {
    if (typeof e == 'string') return Br(e, t);
    var n = Object.prototype.toString.call(e).slice(8, -1);
    if (
      (n === 'Object' && e.constructor && (n = e.constructor.name),
      n === 'Map' || n === 'Set')
    )
      return Array.from(e);
    if (n === 'Arguments' || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))
      return Br(e, t);
  }
}
function Br(e, t) {
  (t == null || t > e.length) && (t = e.length);
  for (var n = 0, r = new Array(t); n < t; n++) r[n] = e[n];
  return r;
}
function hu(e, t) {
  var n =
    e == null
      ? null
      : (typeof Symbol < 'u' && e[Symbol.iterator]) || e['@@iterator'];
  if (n != null) {
    var r = [],
      o = !0,
      i = !1,
      a,
      s;
    try {
      for (
        n = n.call(e);
        !(o = (a = n.next()).done) && (r.push(a.value), !(t && r.length === t));
        o = !0
      );
    } catch (f) {
      (i = !0), (s = f);
    } finally {
      try {
        !o && n.return != null && n.return();
      } finally {
        if (i) throw s;
      }
    }
    return r;
  }
}
function yu(e) {
  if (Array.isArray(e)) return e;
}
function Ni(e) {
  var t = ki(e),
    n = pu(t, 2),
    r = n[0],
    o = n[1];
  return Gn.setTwoToneColors({ primaryColor: r, secondaryColor: o });
}
function vu() {
  var e = Gn.getTwoToneColors();
  return e.calculated ? [e.primaryColor, e.secondaryColor] : e.primaryColor;
}
var Mi = M({
    name: 'InsertStyles',
    setup: function() {
      return (
        au(),
        function() {
          return null;
        }
      );
    }
  }),
  bu = [
    'class',
    'icon',
    'spin',
    'rotate',
    'tabindex',
    'twoToneColor',
    'onClick'
  ];
function Cu(e, t) {
  return Ou(e) || wu(e, t) || xu(e, t) || Su();
}
function Su() {
  throw new TypeError(`Invalid attempt to destructure non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function xu(e, t) {
  if (e) {
    if (typeof e == 'string') return zr(e, t);
    var n = Object.prototype.toString.call(e).slice(8, -1);
    if (
      (n === 'Object' && e.constructor && (n = e.constructor.name),
      n === 'Map' || n === 'Set')
    )
      return Array.from(e);
    if (n === 'Arguments' || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))
      return zr(e, t);
  }
}
function zr(e, t) {
  (t == null || t > e.length) && (t = e.length);
  for (var n = 0, r = new Array(t); n < t; n++) r[n] = e[n];
  return r;
}
function wu(e, t) {
  var n =
    e == null
      ? null
      : (typeof Symbol < 'u' && e[Symbol.iterator]) || e['@@iterator'];
  if (n != null) {
    var r = [],
      o = !0,
      i = !1,
      a,
      s;
    try {
      for (
        n = n.call(e);
        !(o = (a = n.next()).done) && (r.push(a.value), !(t && r.length === t));
        o = !0
      );
    } catch (f) {
      (i = !0), (s = f);
    } finally {
      try {
        !o && n.return != null && n.return();
      } finally {
        if (i) throw s;
      }
    }
    return r;
  }
}
function Ou(e) {
  if (Array.isArray(e)) return e;
}
function Ur(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        Ve(e, o, n[o]);
      });
  }
  return e;
}
function Ve(e, t, n) {
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
function Pu(e, t) {
  if (e == null) return {};
  var n = Tu(e, t),
    r,
    o;
  if (Object.getOwnPropertySymbols) {
    var i = Object.getOwnPropertySymbols(e);
    for (o = 0; o < i.length; o++)
      (r = i[o]),
        !(t.indexOf(r) >= 0) &&
          Object.prototype.propertyIsEnumerable.call(e, r) &&
          (n[r] = e[r]);
  }
  return n;
}
function Tu(e, t) {
  if (e == null) return {};
  var n = {},
    r = Object.keys(e),
    o,
    i;
  for (i = 0; i < r.length; i++)
    (o = r[i]), !(t.indexOf(o) >= 0) && (n[o] = e[o]);
  return n;
}
Ni(Wa.primary);
var He = function(t, n) {
  var r,
    o = Ur({}, t, n.attrs),
    i = o.class,
    a = o.icon,
    s = o.spin,
    f = o.rotate,
    c = o.tabindex,
    l = o.twoToneColor,
    u = o.onClick,
    d = Pu(o, bu),
    m = Wn(),
    p = m.prefixCls,
    g = m.rootClassName,
    w =
      ((r = {}),
      Ve(r, g.value, !!g.value),
      Ve(r, p.value, !0),
      Ve(r, ''.concat(p.value, '-').concat(a.name), !!a.name),
      Ve(r, ''.concat(p.value, '-spin'), !!s || a.name === 'loading'),
      r),
    b = c;
  b === void 0 && u && (b = -1);
  var x = f
      ? {
          msTransform: 'rotate('.concat(f, 'deg)'),
          transform: 'rotate('.concat(f, 'deg)')
        }
      : void 0,
    T = ki(l),
    $ = Cu(T, 2),
    E = $[0],
    S = $[1];
  return v(
    'span',
    Ur({ role: 'img', 'aria-label': a.name }, d, {
      onClick: u,
      class: [w, i],
      tabindex: b
    }),
    [
      v(Gn, { icon: a, primaryColor: E, secondaryColor: S, style: x }, null),
      v(Mi, null, null)
    ]
  );
};
He.props = {
  spin: Boolean,
  rotate: Number,
  icon: Object,
  twoToneColor: String
};
He.displayName = 'AntdIcon';
He.inheritAttrs = !1;
He.getTwoToneColor = vu;
He.setTwoToneColor = Ni;
const se = He;
function qr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        $u(e, o, n[o]);
      });
  }
  return e;
}
function $u(e, t, n) {
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
var Xn = function(t, n) {
  var r = qr({}, t, n.attrs);
  return v(se, qr({}, r, { icon: Va }), null);
};
Xn.displayName = 'LoadingOutlined';
Xn.inheritAttrs = !1;
const Kn = Xn;
function Wr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        Eu(e, o, n[o]);
      });
  }
  return e;
}
function Eu(e, t, n) {
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
var Jn = function(t, n) {
  var r = Wr({}, t, n.attrs);
  return v(se, Wr({}, r, { icon: Ga }), null);
};
Jn.displayName = 'CloseOutlined';
Jn.inheritAttrs = !1;
const Li = Jn;
function Vr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        _u(e, o, n[o]);
      });
  }
  return e;
}
function _u(e, t, n) {
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
var Yn = function(t, n) {
  var r = Vr({}, t, n.attrs);
  return v(se, Vr({}, r, { icon: Xa }), null);
};
Yn.displayName = 'CloseCircleFilled';
Yn.inheritAttrs = !1;
const Ft = Yn;
function Gr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        Au(e, o, n[o]);
      });
  }
  return e;
}
function Au(e, t, n) {
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
var Qn = function(t, n) {
  var r = Gr({}, t, n.attrs);
  return v(se, Gr({}, r, { icon: Ka }), null);
};
Qn.displayName = 'CheckCircleOutlined';
Qn.inheritAttrs = !1;
const Ru = Qn;
function Xr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        Iu(e, o, n[o]);
      });
  }
  return e;
}
function Iu(e, t, n) {
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
var Zn = function(t, n) {
  var r = Xr({}, t, n.attrs);
  return v(se, Xr({}, r, { icon: Ja }), null);
};
Zn.displayName = 'ExclamationCircleOutlined';
Zn.inheritAttrs = !1;
const ku = Zn;
function Kr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        ju(e, o, n[o]);
      });
  }
  return e;
}
function ju(e, t, n) {
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
var er = function(t, n) {
  var r = Kr({}, t, n.attrs);
  return v(se, Kr({}, r, { icon: Ya }), null);
};
er.displayName = 'InfoCircleOutlined';
er.inheritAttrs = !1;
const Nu = er;
function Jr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        Mu(e, o, n[o]);
      });
  }
  return e;
}
function Mu(e, t, n) {
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
var tr = function(t, n) {
  var r = Jr({}, t, n.attrs);
  return v(se, Jr({}, r, { icon: Qa }), null);
};
tr.displayName = 'CloseCircleOutlined';
tr.inheritAttrs = !1;
const Lu = tr;
function Yr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        Fu(e, o, n[o]);
      });
  }
  return e;
}
function Fu(e, t, n) {
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
var nr = function(t, n) {
  var r = Yr({}, t, n.attrs);
  return v(se, Yr({}, r, { icon: Za }), null);
};
nr.displayName = 'CheckCircleFilled';
nr.inheritAttrs = !1;
const Dt = nr;
function Qr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        Du(e, o, n[o]);
      });
  }
  return e;
}
function Du(e, t, n) {
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
var rr = function(t, n) {
  var r = Qr({}, t, n.attrs);
  return v(se, Qr({}, r, { icon: es }), null);
};
rr.displayName = 'ExclamationCircleFilled';
rr.inheritAttrs = !1;
const Ht = rr;
function Zr(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        Hu(e, o, n[o]);
      });
  }
  return e;
}
function Hu(e, t, n) {
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
var or = function(t, n) {
  var r = Zr({}, t, n.attrs);
  return v(se, Zr({}, r, { icon: ts }), null);
};
or.displayName = 'InfoCircleFilled';
or.inheritAttrs = !1;
const Bt = or;
let mt = y({}, Ae.Modal);
function Bu(e) {
  e ? (mt = y(y({}, mt), e)) : (mt = y({}, Ae.Modal));
}
function lm() {
  return mt;
}
const Sn = 'internalMark',
  gt = M({
    compatConfig: { MODE: 3 },
    name: 'ALocaleProvider',
    props: { locale: { type: Object }, ANT_MARK__: String },
    setup(e, t) {
      let { slots: n } = t;
      Dn(
        e.ANT_MARK__ === Sn,
        'LocaleProvider',
        '`LocaleProvider` is deprecated. Please use `locale` with `ConfigProvider` instead'
      );
      const r = Se({
        antLocale: y(y({}, e.locale), { exist: !0 }),
        ANT_MARK__: Sn
      });
      return (
        fe('localeData', r),
        de(
          () => e.locale,
          o => {
            Bu(o && o.Modal), (r.antLocale = y(y({}, o), { exist: !0 }));
          },
          { immediate: !0 }
        ),
        () => {
          var o;
          return (o = n.default) === null || o === void 0 ? void 0 : o.call(n);
        }
      );
    }
  });
gt.install = function(e) {
  return e.component(gt.name, gt), e;
};
const zu = Nn(gt),
  Fi = M({
    name: 'Notice',
    inheritAttrs: !1,
    props: [
      'prefixCls',
      'duration',
      'updateMark',
      'noticeKey',
      'closeIcon',
      'closable',
      'props',
      'onClick',
      'onClose',
      'holder',
      'visible'
    ],
    setup(e, t) {
      let { attrs: n, slots: r } = t,
        o,
        i = !1;
      const a = P(() => (e.duration === void 0 ? 4.5 : e.duration)),
        s = () => {
          a.value &&
            !i &&
            (o = setTimeout(() => {
              c();
            }, a.value * 1e3));
        },
        f = () => {
          o && (clearTimeout(o), (o = null));
        },
        c = u => {
          u && u.stopPropagation(), f();
          const { onClose: d, noticeKey: m } = e;
          d && d(m);
        },
        l = () => {
          f(), s();
        };
      return (
        In(() => {
          s();
        }),
        wo(() => {
          (i = !0), f();
        }),
        de(
          [a, () => e.updateMark, () => e.visible],
          (u, d) => {
            let [m, p, g] = u,
              [w, b, x] = d;
            (m !== w || p !== b || (g !== x && x)) && l();
          },
          { flush: 'post' }
        ),
        () => {
          var u, d;
          const {
              prefixCls: m,
              closable: p,
              closeIcon: g = (u = r.closeIcon) === null || u === void 0
                ? void 0
                : u.call(r),
              onClick: w,
              holder: b
            } = e,
            { class: x, style: T } = n,
            $ = `${m}-notice`,
            E = Object.keys(n).reduce(
              (C, _) => (
                (_.startsWith('data-') ||
                  _.startsWith('aria-') ||
                  _ === 'role') &&
                  (C[_] = n[_]),
                C
              ),
              {}
            ),
            S = v(
              'div',
              D(
                {
                  class: G($, x, { [`${$}-closable`]: p }),
                  style: T,
                  onMouseenter: f,
                  onMouseleave: s,
                  onClick: w
                },
                E
              ),
              [
                v('div', { class: `${$}-content` }, [
                  (d = r.default) === null || d === void 0 ? void 0 : d.call(r)
                ]),
                p
                  ? v('a', { tabindex: 0, onClick: c, class: `${$}-close` }, [
                      g || v('span', { class: `${$}-close-x` }, null)
                    ])
                  : null
              ]
            );
          return b ? v(xo, { to: b }, { default: () => S }) : S;
        }
      );
    }
  });
var Uu =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var r in e)
      Object.prototype.hasOwnProperty.call(e, r) &&
        t.indexOf(r) < 0 &&
        (n[r] = e[r]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var o = 0, r = Object.getOwnPropertySymbols(e); o < r.length; o++)
        t.indexOf(r[o]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, r[o]) &&
          (n[r[o]] = e[r[o]]);
    return n;
  };
let eo = 0;
const qu = Date.now();
function to() {
  const e = eo;
  return (eo += 1), `rcNotification_${qu}_${e}`;
}
const xn = M({
  name: 'Notification',
  inheritAttrs: !1,
  props: [
    'prefixCls',
    'transitionName',
    'animation',
    'maxCount',
    'closeIcon',
    'hashId'
  ],
  setup(e, t) {
    let { attrs: n, expose: r, slots: o } = t;
    const i = new Map(),
      a = B([]),
      s = P(() => {
        const { prefixCls: l, animation: u = 'fade' } = e;
        let d = e.transitionName;
        return !d && u && (d = `${l}-${u}`), $i(d);
      }),
      f = (l, u) => {
        const d = l.key || to(),
          m = y(y({}, l), { key: d }),
          { maxCount: p } = e,
          g = a.value.map(b => b.notice.key).indexOf(d),
          w = a.value.concat();
        g !== -1
          ? w.splice(g, 1, { notice: m, holderCallback: u })
          : (p &&
              a.value.length >= p &&
              ((m.key = w[0].notice.key),
              (m.updateMark = to()),
              (m.userPassKey = d),
              w.shift()),
            w.push({ notice: m, holderCallback: u })),
          (a.value = w);
      },
      c = l => {
        a.value = a.value.filter(u => {
          let {
            notice: { key: d, userPassKey: m }
          } = u;
          return (m || d) !== l;
        });
      };
    return (
      r({ add: f, remove: c, notices: a }),
      () => {
        var l;
        const {
            prefixCls: u,
            closeIcon: d = (l = o.closeIcon) === null || l === void 0
              ? void 0
              : l.call(o, { prefixCls: u })
          } = e,
          m = a.value.map((g, w) => {
            let { notice: b, holderCallback: x } = g;
            const T = w === a.value.length - 1 ? b.updateMark : void 0,
              { key: $, userPassKey: E } = b,
              { content: S } = b,
              C = y(
                y(
                  y(
                    {
                      prefixCls: u,
                      closeIcon:
                        typeof d == 'function' ? d({ prefixCls: u }) : d
                    },
                    b
                  ),
                  b.props
                ),
                {
                  key: $,
                  noticeKey: E || $,
                  updateMark: T,
                  onClose: _ => {
                    var I;
                    c(_), (I = b.onClose) === null || I === void 0 || I.call(b);
                  },
                  onClick: b.onClick
                }
              );
            return x
              ? v(
                  'div',
                  {
                    key: $,
                    class: `${u}-hook-holder`,
                    ref: _ => {
                      typeof $ > 'u' ||
                        (_ ? (i.set($, _), x(_, C)) : i.delete($));
                    }
                  },
                  null
                )
              : v(Fi, D(D({}, C), {}, { class: G(C.class, e.hashId) }), {
                  default: () => [
                    typeof S == 'function' ? S({ prefixCls: u }) : S
                  ]
                });
          }),
          p = { [u]: 1, [n.class]: !!n.class, [e.hashId]: !0 };
        return v(
          'div',
          { class: p, style: n.style || { top: '65px', left: '50%' } },
          [v(Oo, D({ tag: 'div' }, s.value), { default: () => [m] })]
        );
      }
    );
  }
});
xn.newInstance = function(t, n) {
  const r = t || {},
    {
      name: o = 'notification',
      getContainer: i,
      appContext: a,
      prefixCls: s,
      rootPrefixCls: f,
      transitionName: c,
      hasTransitionName: l,
      useStyle: u
    } = r,
    d = Uu(r, [
      'name',
      'getContainer',
      'appContext',
      'prefixCls',
      'rootPrefixCls',
      'transitionName',
      'hasTransitionName',
      'useStyle'
    ]),
    m = document.createElement('div');
  i ? i().appendChild(m) : document.body.appendChild(m);
  const p = M({
      compatConfig: { MODE: 3 },
      name: 'NotificationWrapper',
      setup(w, b) {
        let { attrs: x } = b;
        const T = oe(),
          $ = P(() => H.getPrefixCls(o, s)),
          [, E] = u($);
        return (
          In(() => {
            n({
              notice(S) {
                var C;
                (C = T.value) === null || C === void 0 || C.add(S);
              },
              removeNotice(S) {
                var C;
                (C = T.value) === null || C === void 0 || C.remove(S);
              },
              destroy() {
                gr(null, m), m.parentNode && m.parentNode.removeChild(m);
              },
              component: T
            });
          }),
          () => {
            const S = H,
              C = S.getRootPrefixCls(f, $.value),
              _ = l ? c : `${$.value}-${c}`;
            return v(Ke, D(D({}, S), {}, { prefixCls: C }), {
              default: () => [
                v(
                  xn,
                  D(
                    D({ ref: T }, x),
                    {},
                    { prefixCls: $.value, transitionName: _, hashId: E.value }
                  ),
                  null
                )
              ]
            });
          }
        );
      }
    }),
    g = v(p, d);
  (g.appContext = a || g.appContext), gr(g, m);
};
const Di = xn;
let no = 0;
const Wu = Date.now();
function ro() {
  const e = no;
  return (no += 1), `rcNotification_${Wu}_${e}`;
}
const Vu = M({
    name: 'HookNotification',
    inheritAttrs: !1,
    props: [
      'prefixCls',
      'transitionName',
      'animation',
      'maxCount',
      'closeIcon',
      'hashId',
      'remove',
      'notices',
      'getStyles',
      'getClassName',
      'onAllRemoved',
      'getContainer'
    ],
    setup(e, t) {
      let { attrs: n, slots: r } = t;
      const o = new Map(),
        i = P(() => e.notices),
        a = P(() => {
          let l = e.transitionName;
          if (!l && e.animation)
            switch (typeof e.animation) {
              case 'string':
                l = e.animation;
                break;
              case 'function':
                l = e.animation().name;
                break;
              case 'object':
                l = e.animation.name;
                break;
              default:
                l = `${e.prefixCls}-fade`;
                break;
            }
          return $i(l);
        }),
        s = l => e.remove(l),
        f = B({});
      de(i, () => {
        const l = {};
        Object.keys(f.value).forEach(u => {
          l[u] = [];
        }),
          e.notices.forEach(u => {
            const { placement: d = 'topRight' } = u.notice;
            d && ((l[d] = l[d] || []), l[d].push(u));
          }),
          (f.value = l);
      });
      const c = P(() => Object.keys(f.value));
      return () => {
        var l;
        const {
            prefixCls: u,
            closeIcon: d = (l = r.closeIcon) === null || l === void 0
              ? void 0
              : l.call(r, { prefixCls: u })
          } = e,
          m = c.value.map(p => {
            var g, w;
            const b = f.value[p],
              x =
                (g = e.getClassName) === null || g === void 0
                  ? void 0
                  : g.call(e, p),
              T =
                (w = e.getStyles) === null || w === void 0
                  ? void 0
                  : w.call(e, p),
              $ = b.map((C, _) => {
                let { notice: I, holderCallback: L } = C;
                const Q = _ === i.value.length - 1 ? I.updateMark : void 0,
                  { key: q, userPassKey: Kt } = I,
                  { content: O } = I,
                  R = y(
                    y(
                      y(
                        {
                          prefixCls: u,
                          closeIcon:
                            typeof d == 'function' ? d({ prefixCls: u }) : d
                        },
                        I
                      ),
                      I.props
                    ),
                    {
                      key: q,
                      noticeKey: Kt || q,
                      updateMark: Q,
                      onClose: k => {
                        var X;
                        s(k),
                          (X = I.onClose) === null || X === void 0 || X.call(I);
                      },
                      onClick: I.onClick
                    }
                  );
                return L
                  ? v(
                      'div',
                      {
                        key: q,
                        class: `${u}-hook-holder`,
                        ref: k => {
                          typeof q > 'u' ||
                            (k ? (o.set(q, k), L(k, R)) : o.delete(q));
                        }
                      },
                      null
                    )
                  : v(Fi, D(D({}, R), {}, { class: G(R.class, e.hashId) }), {
                      default: () => [
                        typeof O == 'function' ? O({ prefixCls: u }) : O
                      ]
                    });
              }),
              E = {
                [u]: 1,
                [`${u}-${p}`]: 1,
                [n.class]: !!n.class,
                [e.hashId]: !0,
                [x]: !!x
              };
            function S() {
              var C;
              b.length > 0 ||
                (Reflect.deleteProperty(f.value, p),
                (C = e.onAllRemoved) === null || C === void 0 || C.call(e));
            }
            return v(
              'div',
              {
                key: p,
                class: E,
                style: n.style || T || { top: '65px', left: '50%' }
              },
              [
                v(Oo, D(D({ tag: 'div' }, a.value), {}, { onAfterLeave: S }), {
                  default: () => [$]
                })
              ]
            );
          });
        return v(Wc, { getContainer: e.getContainer }, { default: () => [m] });
      };
    }
  }),
  Gu = Vu;
var Xu =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var r in e)
      Object.prototype.hasOwnProperty.call(e, r) &&
        t.indexOf(r) < 0 &&
        (n[r] = e[r]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var o = 0, r = Object.getOwnPropertySymbols(e); o < r.length; o++)
        t.indexOf(r[o]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, r[o]) &&
          (n[r[o]] = e[r[o]]);
    return n;
  };
const Ku = () => document.body;
let oo = 0;
function Ju() {
  const e = {};
  for (var t = arguments.length, n = new Array(t), r = 0; r < t; r++)
    n[r] = arguments[r];
  return (
    n.forEach(o => {
      o &&
        Object.keys(o).forEach(i => {
          const a = o[i];
          a !== void 0 && (e[i] = a);
        });
    }),
    e
  );
}
function Hi() {
  let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : {};
  const {
      getContainer: t = Ku,
      motion: n,
      prefixCls: r,
      maxCount: o,
      getClassName: i,
      getStyles: a,
      onAllRemoved: s
    } = e,
    f = Xu(e, [
      'getContainer',
      'motion',
      'prefixCls',
      'maxCount',
      'getClassName',
      'getStyles',
      'onAllRemoved'
    ]),
    c = oe([]),
    l = oe(),
    u = (b, x) => {
      const T = b.key || ro(),
        $ = y(y({}, b), { key: T }),
        E = c.value.map(C => C.notice.key).indexOf(T),
        S = c.value.concat();
      E !== -1
        ? S.splice(E, 1, { notice: $, holderCallback: x })
        : (o &&
            c.value.length >= o &&
            (($.key = S[0].notice.key),
            ($.updateMark = ro()),
            ($.userPassKey = T),
            S.shift()),
          S.push({ notice: $, holderCallback: x })),
        (c.value = S);
    },
    d = b => {
      c.value = c.value.filter(x => {
        let {
          notice: { key: T, userPassKey: $ }
        } = x;
        return ($ || T) !== b;
      });
    },
    m = () => {
      c.value = [];
    },
    p = P(() =>
      v(
        Gu,
        {
          ref: l,
          prefixCls: r,
          maxCount: o,
          notices: c.value,
          remove: d,
          getClassName: i,
          getStyles: a,
          animation: n,
          hashId: e.hashId,
          onAllRemoved: s,
          getContainer: t
        },
        null
      )
    ),
    g = oe([]),
    w = {
      open: b => {
        const x = Ju(f, b);
        (x.key === null || x.key === void 0) &&
          ((x.key = `vc-notification-${oo}`), (oo += 1)),
          (g.value = [...g.value, { type: 'open', config: x }]);
      },
      close: b => {
        g.value = [...g.value, { type: 'close', key: b }];
      },
      destroy: () => {
        g.value = [...g.value, { type: 'destroy' }];
      }
    };
  return (
    de(g, () => {
      g.value.length &&
        (g.value.forEach(b => {
          switch (b.type) {
            case 'open':
              u(b.config);
              break;
            case 'close':
              d(b.key);
              break;
            case 'destroy':
              m();
              break;
          }
        }),
        (g.value = []));
    }),
    [w, () => p.value]
  );
}
const Yu = e => {
    const {
        componentCls: t,
        iconCls: n,
        boxShadowSecondary: r,
        colorBgElevated: o,
        colorSuccess: i,
        colorError: a,
        colorWarning: s,
        colorInfo: f,
        fontSizeLG: c,
        motionEaseInOutCirc: l,
        motionDurationSlow: u,
        marginXS: d,
        paddingXS: m,
        borderRadiusLG: p,
        zIndexPopup: g,
        messageNoticeContentPadding: w
      } = e,
      b = new Ce('MessageMoveIn', {
        '0%': { padding: 0, transform: 'translateY(-100%)', opacity: 0 },
        '100%': { padding: m, transform: 'translateY(0)', opacity: 1 }
      }),
      x = new Ce('MessageMoveOut', {
        '0%': { maxHeight: e.height, padding: m, opacity: 1 },
        '100%': { maxHeight: 0, padding: 0, opacity: 0 }
      });
    return [
      {
        [t]: y(y({}, ai(e)), {
          position: 'fixed',
          top: d,
          width: '100%',
          pointerEvents: 'none',
          zIndex: g,
          [`${t}-move-up`]: { animationFillMode: 'forwards' },
          [`
        ${t}-move-up-appear,
        ${t}-move-up-enter
      `]: {
            animationName: b,
            animationDuration: u,
            animationPlayState: 'paused',
            animationTimingFunction: l
          },
          [`
        ${t}-move-up-appear${t}-move-up-appear-active,
        ${t}-move-up-enter${t}-move-up-enter-active
      `]: { animationPlayState: 'running' },
          [`${t}-move-up-leave`]: {
            animationName: x,
            animationDuration: u,
            animationPlayState: 'paused',
            animationTimingFunction: l
          },
          [`${t}-move-up-leave${t}-move-up-leave-active`]: {
            animationPlayState: 'running'
          },
          '&-rtl': { direction: 'rtl', span: { direction: 'rtl' } }
        })
      },
      {
        [`${t}-notice`]: {
          padding: m,
          textAlign: 'center',
          [n]: {
            verticalAlign: 'text-bottom',
            marginInlineEnd: d,
            fontSize: c
          },
          [`${t}-notice-content`]: {
            display: 'inline-block',
            padding: w,
            background: o,
            borderRadius: p,
            boxShadow: r,
            pointerEvents: 'all'
          },
          [`${t}-success ${n}`]: { color: i },
          [`${t}-error ${n}`]: { color: a },
          [`${t}-warning ${n}`]: { color: s },
          [`
        ${t}-info ${n},
        ${t}-loading ${n}`]: { color: f }
        }
      },
      { [`${t}-notice-pure-panel`]: { padding: 0, textAlign: 'start' } }
    ];
  },
  Bi = zn(
    'Message',
    e => {
      const t = jt(e, {
        messageNoticeContentPadding: `${(e.controlHeightLG -
          e.fontSize * e.lineHeight) /
          2}px ${e.paddingSM}px`
      });
      return [Yu(t)];
    },
    e => ({ height: 150, zIndexPopup: e.zIndexPopupBase + 10 })
  );
var Qu = [
  'class',
  'component',
  'viewBox',
  'spin',
  'rotate',
  'tabindex',
  'onClick'
];
function lt(e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = arguments[t] != null ? Object(arguments[t]) : {},
      r = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (r = r.concat(
        Object.getOwnPropertySymbols(n).filter(function(o) {
          return Object.getOwnPropertyDescriptor(n, o).enumerable;
        })
      )),
      r.forEach(function(o) {
        ht(e, o, n[o]);
      });
  }
  return e;
}
function ht(e, t, n) {
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
function Zu(e, t) {
  if (e == null) return {};
  var n = ef(e, t),
    r,
    o;
  if (Object.getOwnPropertySymbols) {
    var i = Object.getOwnPropertySymbols(e);
    for (o = 0; o < i.length; o++)
      (r = i[o]),
        !(t.indexOf(r) >= 0) &&
          Object.prototype.propertyIsEnumerable.call(e, r) &&
          (n[r] = e[r]);
  }
  return n;
}
function ef(e, t) {
  if (e == null) return {};
  var n = {},
    r = Object.keys(e),
    o,
    i;
  for (i = 0; i < r.length; i++)
    (o = r[i]), !(t.indexOf(o) >= 0) && (n[o] = e[o]);
  return n;
}
var zt = function(t, n) {
  var r,
    o = n.attrs,
    i = n.slots,
    a = lt({}, t, o),
    s = a.class,
    f = a.component,
    c = a.viewBox,
    l = a.spin,
    u = a.rotate,
    d = a.tabindex,
    m = a.onClick,
    p = Zu(a, Qu),
    g = Wn(),
    w = g.prefixCls,
    b = g.rootClassName,
    x = i.default && i.default(),
    T = x && x.length,
    $ = i.component;
  bn(!!(f || T || $), 'Should have `component` prop/slot or `children`.');
  var E = ((r = {}), ht(r, b.value, !!b.value), ht(r, w.value, !0), r),
    S = ht({}, ''.concat(w.value, '-spin'), l === '' || !!l),
    C = u
      ? {
          msTransform: 'rotate('.concat(u, 'deg)'),
          transform: 'rotate('.concat(u, 'deg)')
        }
      : void 0,
    _ = lt({}, nu, { viewBox: c, class: S, style: C });
  c || delete _.viewBox;
  var I = function() {
      return f
        ? v(f, _, {
            default: function() {
              return [x];
            }
          })
        : $
        ? $(_)
        : T
        ? (bn(
            !!c || (x.length === 1 && x[0] && x[0].type === 'use'),
            'Make sure that you provide correct `viewBox` prop (default `0 0 1024 1024`) to the icon.'
          ),
          v('svg', lt({}, _, { viewBox: c }), [x]))
        : null;
    },
    L = d;
  return (
    L === void 0 && m && ((L = -1), (p.tabindex = L)),
    v('span', lt({ role: 'img' }, p, { onClick: m, class: [E, s] }), [
      I(),
      v(Mi, null, null)
    ])
  );
};
zt.props = {
  spin: Boolean,
  rotate: Number,
  viewBox: String,
  ariaLabel: String
};
zt.inheritAttrs = !1;
zt.displayName = 'Icon';
const tf = zt,
  nf = {
    info: v(Bt, null, null),
    success: v(Dt, null, null),
    error: v(Ft, null, null),
    warning: v(Ht, null, null),
    loading: v(Kn, null, null)
  },
  rf = M({
    name: 'PureContent',
    inheritAttrs: !1,
    props: ['prefixCls', 'type', 'icon'],
    setup(e, t) {
      let { slots: n } = t;
      return () => {
        var r;
        return v(
          'div',
          {
            class: G(
              `${e.prefixCls}-custom-content`,
              `${e.prefixCls}-${e.type}`
            )
          },
          [
            e.icon || nf[e.type],
            v('span', null, [
              (r = n.default) === null || r === void 0 ? void 0 : r.call(n)
            ])
          ]
        );
      };
    }
  });
var of =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var r in e)
      Object.prototype.hasOwnProperty.call(e, r) &&
        t.indexOf(r) < 0 &&
        (n[r] = e[r]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var o = 0, r = Object.getOwnPropertySymbols(e); o < r.length; o++)
        t.indexOf(r[o]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, r[o]) &&
          (n[r[o]] = e[r[o]]);
    return n;
  };
const af = 8,
  sf = 3,
  lf = M({
    name: 'Holder',
    inheritAttrs: !1,
    props: [
      'top',
      'prefixCls',
      'getContainer',
      'maxCount',
      'duration',
      'rtl',
      'transitionName',
      'onAllRemoved'
    ],
    setup(e, t) {
      let { expose: n } = t;
      var r;
      const { getPrefixCls: o, getPopupContainer: i } = Mt('message', e),
        a = P(() => o('message', e.prefixCls)),
        [, s] = Bi(a),
        f = () => {
          var p;
          const g = (p = e.top) !== null && p !== void 0 ? p : af;
          return {
            left: '50%',
            transform: 'translateX(-50%)',
            top: typeof g == 'number' ? `${g}px` : g
          };
        },
        c = () => G(s.value, e.rtl ? `${a.value}-rtl` : ''),
        l = () => {
          var p;
          return zc({
            prefixCls: a.value,
            animation:
              (p = e.animation) !== null && p !== void 0 ? p : 'move-up',
            transitionName: e.transitionName
          });
        },
        u = v('span', { class: `${a.value}-close-x` }, [
          v(tf, { class: `${a.value}-close-icon` }, null)
        ]),
        [d, m] = Hi({
          getStyles: f,
          prefixCls: a.value,
          getClassName: c,
          motion: l,
          closable: !1,
          closeIcon: u,
          duration: (r = e.duration) !== null && r !== void 0 ? r : sf,
          getContainer: () => {
            var p, g;
            return (
              ((p = e.staticGetContainer) === null || p === void 0
                ? void 0
                : p.call(e)) ||
              ((g = i.value) === null || g === void 0 ? void 0 : g.call(i)) ||
              document.body
            );
          },
          maxCount: e.maxCount,
          onAllRemoved: e.onAllRemoved
        });
      return n(y(y({}, d), { prefixCls: a, hashId: s })), m;
    }
  });
let io = 0;
function cf(e) {
  const t = oe(null),
    n = Symbol('messageHolderKey'),
    r = f => {
      var c;
      (c = t.value) === null || c === void 0 || c.close(f);
    },
    o = f => {
      if (!t.value) {
        const E = () => {};
        return (E.then = () => {}), E;
      }
      const { open: c, prefixCls: l, hashId: u } = t.value,
        d = `${l}-notice`,
        { content: m, icon: p, type: g, key: w, class: b, onClose: x } = f,
        T = of(f, ['content', 'icon', 'type', 'key', 'class', 'onClose']);
      let $ = w;
      return (
        $ == null && ((io += 1), ($ = `antd-message-${io}`)),
        Ss(
          E => (
            c(
              y(y({}, T), {
                key: $,
                content: () =>
                  v(
                    rf,
                    {
                      prefixCls: l,
                      type: g,
                      icon: typeof p == 'function' ? p() : p
                    },
                    { default: () => [typeof m == 'function' ? m() : m] }
                  ),
                placement: 'top',
                class: G(g && `${d}-${g}`, u, b),
                onClose: () => {
                  x == null || x(), E();
                }
              })
            ),
            () => {
              r($);
            }
          )
        )
      );
    },
    a = {
      open: o,
      destroy: f => {
        var c;
        f !== void 0
          ? r(f)
          : (c = t.value) === null || c === void 0 || c.destroy();
      }
    };
  return (
    ['info', 'success', 'warning', 'error', 'loading'].forEach(f => {
      const c = (l, u, d) => {
        let m;
        l && typeof l == 'object' && 'content' in l
          ? (m = l)
          : (m = { content: l });
        let p, g;
        typeof u == 'function' ? (g = u) : ((p = u), (g = d));
        const w = y(y({ onClose: g, duration: p }, m), { type: f });
        return o(w);
      };
      a[f] = c;
    }),
    [a, () => v(lf, D(D({ key: n }, e), {}, { ref: t }), null)]
  );
}
function uf(e) {
  return cf(e);
}
let zi = 3,
  Ui,
  U,
  ff = 1,
  qi = '',
  Wi = 'move-up',
  Vi = !1,
  Gi = () => document.body,
  Xi,
  Ki = !1;
function df() {
  return ff++;
}
function pf(e) {
  e.top !== void 0 && ((Ui = e.top), (U = null)),
    e.duration !== void 0 && (zi = e.duration),
    e.prefixCls !== void 0 && (qi = e.prefixCls),
    e.getContainer !== void 0 && ((Gi = e.getContainer), (U = null)),
    e.transitionName !== void 0 &&
      ((Wi = e.transitionName), (U = null), (Vi = !0)),
    e.maxCount !== void 0 && ((Xi = e.maxCount), (U = null)),
    e.rtl !== void 0 && (Ki = e.rtl);
}
function mf(e, t) {
  if (U) {
    t(U);
    return;
  }
  Di.newInstance(
    {
      appContext: e.appContext,
      prefixCls: e.prefixCls || qi,
      rootPrefixCls: e.rootPrefixCls,
      transitionName: Wi,
      hasTransitionName: Vi,
      style: { top: Ui },
      getContainer: Gi || e.getPopupContainer,
      maxCount: Xi,
      name: 'message',
      useStyle: Bi
    },
    n => {
      if (U) {
        t(U);
        return;
      }
      (U = n), t(n);
    }
  );
}
const Ji = { info: Bt, success: Dt, error: Ft, warning: Ht, loading: Kn },
  gf = Object.keys(Ji);
function hf(e) {
  const t = e.duration !== void 0 ? e.duration : zi,
    n = e.key || df(),
    r = new Promise(i => {
      const a = () => (typeof e.onClose == 'function' && e.onClose(), i(!0));
      mf(e, s => {
        s.notice({
          key: n,
          duration: t,
          style: e.style || {},
          class: e.class,
          content: f => {
            let { prefixCls: c } = f;
            const l = Ji[e.type],
              u = l ? v(l, null, null) : '',
              d = G(`${c}-custom-content`, {
                [`${c}-${e.type}`]: e.type,
                [`${c}-rtl`]: Ki === !0
              });
            return v('div', { class: d }, [
              typeof e.icon == 'function' ? e.icon() : e.icon || u,
              v('span', null, [
                typeof e.content == 'function' ? e.content() : e.content
              ])
            ]);
          },
          onClose: a,
          onClick: e.onClick
        });
      });
    }),
    o = () => {
      U && U.removeNotice(n);
    };
  return (o.then = (i, a) => r.then(i, a)), (o.promise = r), o;
}
function yf(e) {
  return Object.prototype.toString.call(e) === '[object Object]' && !!e.content;
}
const tt = {
  open: hf,
  config: pf,
  destroy(e) {
    if (U)
      if (e) {
        const { removeNotice: t } = U;
        t(e);
      } else {
        const { destroy: t } = U;
        t(), (U = null);
      }
  }
};
function vf(e, t) {
  e[t] = (n, r, o) =>
    yf(n)
      ? e.open(y(y({}, n), { type: t }))
      : (typeof r == 'function' && ((o = r), (r = void 0)),
        e.open({ content: n, duration: r, type: t, onClose: o }));
}
gf.forEach(e => vf(tt, e));
tt.warn = tt.warning;
tt.useMessage = uf;
const bf = tt,
  Cf = e => {
    const { componentCls: t, width: n, notificationMarginEdge: r } = e,
      o = new Ce('antNotificationTopFadeIn', {
        '0%': { marginTop: '-100%', opacity: 0 },
        '100%': { marginTop: 0, opacity: 1 }
      }),
      i = new Ce('antNotificationBottomFadeIn', {
        '0%': { marginBottom: '-100%', opacity: 0 },
        '100%': { marginBottom: 0, opacity: 1 }
      }),
      a = new Ce('antNotificationLeftFadeIn', {
        '0%': { right: { _skip_check_: !0, value: n }, opacity: 0 },
        '100%': { right: { _skip_check_: !0, value: 0 }, opacity: 1 }
      });
    return {
      [`&${t}-top, &${t}-bottom`]: { marginInline: 0 },
      [`&${t}-top`]: {
        [`${t}-fade-enter${t}-fade-enter-active, ${t}-fade-appear${t}-fade-appear-active`]: {
          animationName: o
        }
      },
      [`&${t}-bottom`]: {
        [`${t}-fade-enter${t}-fade-enter-active, ${t}-fade-appear${t}-fade-appear-active`]: {
          animationName: i
        }
      },
      [`&${t}-topLeft, &${t}-bottomLeft`]: {
        marginInlineEnd: 0,
        marginInlineStart: r,
        [`${t}-fade-enter${t}-fade-enter-active, ${t}-fade-appear${t}-fade-appear-active`]: {
          animationName: a
        }
      }
    };
  },
  Sf = Cf,
  xf = e => {
    const {
        iconCls: t,
        componentCls: n,
        boxShadowSecondary: r,
        fontSizeLG: o,
        notificationMarginBottom: i,
        borderRadiusLG: a,
        colorSuccess: s,
        colorInfo: f,
        colorWarning: c,
        colorError: l,
        colorTextHeading: u,
        notificationBg: d,
        notificationPadding: m,
        notificationMarginEdge: p,
        motionDurationMid: g,
        motionEaseInOut: w,
        fontSize: b,
        lineHeight: x,
        width: T,
        notificationIconSize: $
      } = e,
      E = `${n}-notice`,
      S = new Ce('antNotificationFadeIn', {
        '0%': { left: { _skip_check_: !0, value: T }, opacity: 0 },
        '100%': { left: { _skip_check_: !0, value: 0 }, opacity: 1 }
      }),
      C = new Ce('antNotificationFadeOut', {
        '0%': { maxHeight: e.animationMaxHeight, marginBottom: i, opacity: 1 },
        '100%': {
          maxHeight: 0,
          marginBottom: 0,
          paddingTop: 0,
          paddingBottom: 0,
          opacity: 0
        }
      });
    return [
      {
        [n]: y(
          y(
            y(y({}, ai(e)), {
              position: 'fixed',
              zIndex: e.zIndexPopup,
              marginInlineEnd: p,
              [`${n}-hook-holder`]: { position: 'relative' },
              [`&${n}-top, &${n}-bottom`]: {
                [`${n}-notice`]: { marginInline: 'auto auto' }
              },
              [`&${n}-topLeft, &${n}-bottomLeft`]: {
                [`${n}-notice`]: {
                  marginInlineEnd: 'auto',
                  marginInlineStart: 0
                }
              },
              [`${n}-fade-enter, ${n}-fade-appear`]: {
                animationDuration: e.motionDurationMid,
                animationTimingFunction: w,
                animationFillMode: 'both',
                opacity: 0,
                animationPlayState: 'paused'
              },
              [`${n}-fade-leave`]: {
                animationTimingFunction: w,
                animationFillMode: 'both',
                animationDuration: g,
                animationPlayState: 'paused'
              },
              [`${n}-fade-enter${n}-fade-enter-active, ${n}-fade-appear${n}-fade-appear-active`]: {
                animationName: S,
                animationPlayState: 'running'
              },
              [`${n}-fade-leave${n}-fade-leave-active`]: {
                animationName: C,
                animationPlayState: 'running'
              }
            }),
            Sf(e)
          ),
          {
            '&-rtl': {
              direction: 'rtl',
              [`${n}-notice-btn`]: { float: 'left' }
            }
          }
        )
      },
      {
        [E]: {
          position: 'relative',
          width: T,
          maxWidth: `calc(100vw - ${p * 2}px)`,
          marginBottom: i,
          marginInlineStart: 'auto',
          padding: m,
          overflow: 'hidden',
          lineHeight: x,
          wordWrap: 'break-word',
          background: d,
          borderRadius: a,
          boxShadow: r,
          [`${n}-close-icon`]: { fontSize: b, cursor: 'pointer' },
          [`${E}-message`]: {
            marginBottom: e.marginXS,
            color: u,
            fontSize: o,
            lineHeight: e.lineHeightLG
          },
          [`${E}-description`]: { fontSize: b },
          [`&${E}-closable ${E}-message`]: { paddingInlineEnd: e.paddingLG },
          [`${E}-with-icon ${E}-message`]: {
            marginBottom: e.marginXS,
            marginInlineStart: e.marginSM + $,
            fontSize: o
          },
          [`${E}-with-icon ${E}-description`]: {
            marginInlineStart: e.marginSM + $,
            fontSize: b
          },
          [`${E}-icon`]: {
            position: 'absolute',
            fontSize: $,
            lineHeight: 0,
            [`&-success${t}`]: { color: s },
            [`&-info${t}`]: { color: f },
            [`&-warning${t}`]: { color: c },
            [`&-error${t}`]: { color: l }
          },
          [`${E}-close`]: {
            position: 'absolute',
            top: e.notificationPaddingVertical,
            insetInlineEnd: e.notificationPaddingHorizontal,
            color: e.colorIcon,
            outline: 'none',
            width: e.notificationCloseButtonSize,
            height: e.notificationCloseButtonSize,
            borderRadius: e.borderRadiusSM,
            transition: `background-color ${e.motionDurationMid}, color ${e.motionDurationMid}`,
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            '&:hover': {
              color: e.colorIconHover,
              backgroundColor: e.wireframe ? 'transparent' : e.colorFillContent
            }
          },
          [`${E}-btn`]: { float: 'right', marginTop: e.marginSM }
        }
      },
      { [`${E}-pure-panel`]: { margin: 0 } }
    ];
  },
  Yi = zn(
    'Notification',
    e => {
      const t = e.paddingMD,
        n = e.paddingLG,
        r = jt(e, {
          notificationBg: e.colorBgElevated,
          notificationPaddingVertical: t,
          notificationPaddingHorizontal: n,
          notificationPadding: `${e.paddingMD}px ${e.paddingContentHorizontalLG}px`,
          notificationMarginBottom: e.margin,
          notificationMarginEdge: e.marginLG,
          animationMaxHeight: 150,
          notificationIconSize: e.fontSizeLG * e.lineHeightLG,
          notificationCloseButtonSize: e.controlHeightLG * 0.55
        });
      return [xf(r)];
    },
    e => ({ zIndexPopup: e.zIndexPopupBase + 50, width: 384 })
  );
function wf(e, t) {
  return (
    t ||
    v('span', { class: `${e}-close-x` }, [
      v(Li, { class: `${e}-close-icon` }, null)
    ])
  );
}
v(Bt, null, null),
  v(Dt, null, null),
  v(Ft, null, null),
  v(Ht, null, null),
  v(Kn, null, null);
const Of = { success: Dt, info: Bt, error: Ft, warning: Ht };
function Pf(e) {
  let {
      prefixCls: t,
      icon: n,
      type: r,
      message: o,
      description: i,
      btn: a
    } = e,
    s = null;
  if (n) s = v('span', { class: `${t}-icon` }, [Pe(n)]);
  else if (r) {
    const f = Of[r];
    s = v(f, { class: `${t}-icon ${t}-icon-${r}` }, null);
  }
  return v('div', { class: G({ [`${t}-with-icon`]: s }), role: 'alert' }, [
    s,
    v('div', { class: `${t}-message` }, [o]),
    v('div', { class: `${t}-description` }, [i]),
    a && v('div', { class: `${t}-btn` }, [a])
  ]);
}
function Qi(e, t, n) {
  let r;
  switch (
    ((t = typeof t == 'number' ? `${t}px` : t),
    (n = typeof n == 'number' ? `${n}px` : n),
    e)
  ) {
    case 'top':
      r = {
        left: '50%',
        transform: 'translateX(-50%)',
        right: 'auto',
        top: t,
        bottom: 'auto'
      };
      break;
    case 'topLeft':
      r = { left: 0, top: t, bottom: 'auto' };
      break;
    case 'topRight':
      r = { right: 0, top: t, bottom: 'auto' };
      break;
    case 'bottom':
      r = {
        left: '50%',
        transform: 'translateX(-50%)',
        right: 'auto',
        top: 'auto',
        bottom: n
      };
      break;
    case 'bottomLeft':
      r = { left: 0, top: 'auto', bottom: n };
      break;
    default:
      r = { right: 0, top: 'auto', bottom: n };
      break;
  }
  return r;
}
function Tf(e) {
  return { name: `${e}-fade` };
}
var $f =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var r in e)
      Object.prototype.hasOwnProperty.call(e, r) &&
        t.indexOf(r) < 0 &&
        (n[r] = e[r]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var o = 0, r = Object.getOwnPropertySymbols(e); o < r.length; o++)
        t.indexOf(r[o]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, r[o]) &&
          (n[r[o]] = e[r[o]]);
    return n;
  };
const ao = 24,
  Ef = 4.5,
  _f = M({
    name: 'Holder',
    inheritAttrs: !1,
    props: ['prefixCls', 'class', 'type', 'icon', 'content', 'onAllRemoved'],
    setup(e, t) {
      let { expose: n } = t;
      const { getPrefixCls: r, getPopupContainer: o } = Mt('notification', e),
        i = P(() => e.prefixCls || r('notification')),
        a = d => {
          var m, p;
          return Qi(
            d,
            (m = e.top) !== null && m !== void 0 ? m : ao,
            (p = e.bottom) !== null && p !== void 0 ? p : ao
          );
        },
        [, s] = Yi(i),
        f = () => G(s.value, { [`${i.value}-rtl`]: e.rtl }),
        c = () => Tf(i.value),
        [l, u] = Hi({
          prefixCls: i.value,
          getStyles: a,
          getClassName: f,
          motion: c,
          closable: !0,
          closeIcon: wf(i.value),
          duration: Ef,
          getContainer: () => {
            var d, m;
            return (
              ((d = e.getPopupContainer) === null || d === void 0
                ? void 0
                : d.call(e)) ||
              ((m = o.value) === null || m === void 0 ? void 0 : m.call(o)) ||
              document.body
            );
          },
          maxCount: e.maxCount,
          hashId: s.value,
          onAllRemoved: e.onAllRemoved
        });
      return n(y(y({}, l), { prefixCls: i.value, hashId: s })), u;
    }
  });
function Af(e) {
  const t = oe(null),
    n = Symbol('notificationHolderKey'),
    r = s => {
      if (!t.value) return;
      const { open: f, prefixCls: c, hashId: l } = t.value,
        u = `${c}-notice`,
        { message: d, description: m, icon: p, type: g, btn: w, class: b } = s,
        x = $f(s, ['message', 'description', 'icon', 'type', 'btn', 'class']);
      return f(
        y(y({ placement: 'topRight' }, x), {
          content: () =>
            v(
              Pf,
              {
                prefixCls: u,
                icon: typeof p == 'function' ? p() : p,
                type: g,
                message: typeof d == 'function' ? d() : d,
                description: typeof m == 'function' ? m() : m,
                btn: typeof w == 'function' ? w() : w
              },
              null
            ),
          class: G(g && `${u}-${g}`, l, b)
        })
      );
    },
    i = {
      open: r,
      destroy: s => {
        var f, c;
        s !== void 0
          ? (f = t.value) === null || f === void 0 || f.close(s)
          : (c = t.value) === null || c === void 0 || c.destroy();
      }
    };
  return (
    ['success', 'info', 'warning', 'error'].forEach(s => {
      i[s] = f => r(y(y({}, f), { type: s }));
    }),
    [i, () => v(_f, D(D({ key: n }, e), {}, { ref: t }), null)]
  );
}
function Rf(e) {
  return Af(e);
}
globalThis && globalThis.__awaiter;
const he = {};
let Zi = 4.5,
  ea = '24px',
  ta = '24px',
  wn = '',
  na = 'topRight',
  ra = () => document.body,
  oa = null,
  On = !1,
  ia;
function If(e) {
  const {
    duration: t,
    placement: n,
    bottom: r,
    top: o,
    getContainer: i,
    closeIcon: a,
    prefixCls: s
  } = e;
  s !== void 0 && (wn = s),
    t !== void 0 && (Zi = t),
    n !== void 0 && (na = n),
    r !== void 0 && (ta = typeof r == 'number' ? `${r}px` : r),
    o !== void 0 && (ea = typeof o == 'number' ? `${o}px` : o),
    i !== void 0 && (ra = i),
    a !== void 0 && (oa = a),
    e.rtl !== void 0 && (On = e.rtl),
    e.maxCount !== void 0 && (ia = e.maxCount);
}
function kf(e, t) {
  let {
    prefixCls: n,
    placement: r = na,
    getContainer: o = ra,
    top: i,
    bottom: a,
    closeIcon: s = oa,
    appContext: f
  } = e;
  const { getPrefixCls: c } = Vf(),
    l = c('notification', n || wn),
    u = `${l}-${r}-${On}`,
    d = he[u];
  if (d) {
    Promise.resolve(d).then(p => {
      t(p);
    });
    return;
  }
  const m = G(`${l}-${r}`, { [`${l}-rtl`]: On === !0 });
  Di.newInstance(
    {
      name: 'notification',
      prefixCls: n || wn,
      useStyle: Yi,
      class: m,
      style: Qi(r, i ?? ea, a ?? ta),
      appContext: f,
      getContainer: o,
      closeIcon: p => {
        let { prefixCls: g } = p;
        return v('span', { class: `${g}-close-x` }, [
          Pe(s, {}, v(Li, { class: `${g}-close-icon` }, null))
        ]);
      },
      maxCount: ia,
      hasTransitionName: !0
    },
    p => {
      (he[u] = p), t(p);
    }
  );
}
const jf = { success: Ru, info: Nu, error: Lu, warning: ku };
function Nf(e) {
  const { icon: t, type: n, description: r, message: o, btn: i } = e,
    a = e.duration === void 0 ? Zi : e.duration;
  kf(e, s => {
    s.notice({
      content: f => {
        let { prefixCls: c } = f;
        const l = `${c}-notice`;
        let u = null;
        if (t) u = () => v('span', { class: `${l}-icon` }, [Pe(t)]);
        else if (n) {
          const d = jf[n];
          u = () => v(d, { class: `${l}-icon ${l}-icon-${n}` }, null);
        }
        return v('div', { class: u ? `${l}-with-icon` : '' }, [
          u && u(),
          v('div', { class: `${l}-message` }, [
            !r && u
              ? v(
                  'span',
                  { class: `${l}-message-single-line-auto-margin` },
                  null
                )
              : null,
            Pe(o)
          ]),
          v('div', { class: `${l}-description` }, [Pe(r)]),
          i ? v('span', { class: `${l}-btn` }, [Pe(i)]) : null
        ]);
      },
      duration: a,
      closable: !0,
      onClose: e.onClose,
      onClick: e.onClick,
      key: e.key,
      style: e.style || {},
      class: e.class
    });
  });
}
const Ne = {
    open: Nf,
    close(e) {
      Object.keys(he).forEach(t =>
        Promise.resolve(he[t]).then(n => {
          n.removeNotice(e);
        })
      );
    },
    config: If,
    destroy() {
      Object.keys(he).forEach(e => {
        Promise.resolve(he[e]).then(t => {
          t.destroy();
        }),
          delete he[e];
      });
    }
  },
  Mf = ['success', 'info', 'warning', 'error'];
Mf.forEach(e => {
  Ne[e] = t => Ne.open(y(y({}, t), { type: e }));
});
Ne.warn = Ne.warning;
Ne.useNotification = Rf;
const Pt = Ne,
  Lf = `-ant-${Date.now()}-${Math.random()}`;
function Ff(e, t) {
  const n = {},
    r = (a, s) => {
      let f = a.clone();
      return (f = (s == null ? void 0 : s(f)) || f), f.toRgbString();
    },
    o = (a, s) => {
      const f = new F(a),
        c = Je(f.toRgbString());
      (n[`${s}-color`] = r(f)),
        (n[`${s}-color-disabled`] = c[1]),
        (n[`${s}-color-hover`] = c[4]),
        (n[`${s}-color-active`] = c[6]),
        (n[`${s}-color-outline`] = f
          .clone()
          .setAlpha(0.2)
          .toRgbString()),
        (n[`${s}-color-deprecated-bg`] = c[0]),
        (n[`${s}-color-deprecated-border`] = c[2]);
    };
  if (t.primaryColor) {
    o(t.primaryColor, 'primary');
    const a = new F(t.primaryColor),
      s = Je(a.toRgbString());
    s.forEach((c, l) => {
      n[`primary-${l + 1}`] = c;
    }),
      (n['primary-color-deprecated-l-35'] = r(a, c => c.lighten(35))),
      (n['primary-color-deprecated-l-20'] = r(a, c => c.lighten(20))),
      (n['primary-color-deprecated-t-20'] = r(a, c => c.tint(20))),
      (n['primary-color-deprecated-t-50'] = r(a, c => c.tint(50))),
      (n['primary-color-deprecated-f-12'] = r(a, c =>
        c.setAlpha(c.getAlpha() * 0.12)
      ));
    const f = new F(s[0]);
    (n['primary-color-active-deprecated-f-30'] = r(f, c =>
      c.setAlpha(c.getAlpha() * 0.3)
    )),
      (n['primary-color-active-deprecated-d-02'] = r(f, c => c.darken(2)));
  }
  return (
    t.successColor && o(t.successColor, 'success'),
    t.warningColor && o(t.warningColor, 'warning'),
    t.errorColor && o(t.errorColor, 'error'),
    t.infoColor && o(t.infoColor, 'info'),
    `
  :root {
    ${Object.keys(n).map(a => `--${e}-${a}: ${n[a]};`).join(`
`)}
  }
  `.trim()
  );
}
function Df(e, t) {
  const n = Ff(e, t);
  Le()
    ? xt(n, `${Lf}-dynamic-theme`)
    : Dn(
        !1,
        'ConfigProvider',
        'SSR do not support dynamic theme with css variables.'
      );
}
const Hf = e => {
    const [t, n] = Nt();
    return hn(
      P(() => ({
        theme: t.value,
        token: n.value,
        hashId: '',
        path: ['ant-design-icons', e.value]
      })),
      () => [
        {
          [`.${e.value}`]: y(y({}, rc()), {
            [`.${e.value} .${e.value}-icon`]: { display: 'block' }
          })
        }
      ]
    );
  },
  Bf = Hf;
function zf(e, t) {
  const n = P(() => (e == null ? void 0 : e.value) || {}),
    r = P(() =>
      n.value.inherit === !1 || !(t != null && t.value) ? si : t.value
    );
  return P(() => {
    if (!(e != null && e.value)) return t == null ? void 0 : t.value;
    const i = y({}, r.value.components);
    return (
      Object.keys(e.value.components || {}).forEach(a => {
        i[a] = y(y({}, i[a]), e.value.components[a]);
      }),
      y(y(y({}, r.value), n.value), {
        token: y(y({}, r.value.token), n.value.token),
        components: i
      })
    );
  });
}
var Uf =
  (globalThis && globalThis.__rest) ||
  function(e, t) {
    var n = {};
    for (var r in e)
      Object.prototype.hasOwnProperty.call(e, r) &&
        t.indexOf(r) < 0 &&
        (n[r] = e[r]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var o = 0, r = Object.getOwnPropertySymbols(e); o < r.length; o++)
        t.indexOf(r[o]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, r[o]) &&
          (n[r[o]] = e[r[o]]);
    return n;
  };
const qf = 'ant';
function Ee() {
  return H.prefixCls || qf;
}
function aa() {
  return H.iconPrefixCls || Mn;
}
const ir = Se({}),
  H = Se({});
ot(() => {
  y(H, ir),
    (H.prefixCls = Ee()),
    (H.iconPrefixCls = aa()),
    (H.getPrefixCls = (e, t) => t || (e ? `${H.prefixCls}-${e}` : H.prefixCls)),
    (H.getRootPrefixCls = () => (H.prefixCls ? H.prefixCls : Ee()));
});
let nn;
const Wf = e => {
    nn && nn(),
      (nn = ot(() => {
        y(ir, Se(e)), y(H, Se(e));
      })),
      e.theme && Df(Ee(), e.theme);
  },
  Vf = () => ({
    getPrefixCls: (e, t) => t || (e ? `${Ee()}-${e}` : Ee()),
    getIconPrefixCls: aa,
    getRootPrefixCls: () => (H.prefixCls ? H.prefixCls : Ee())
  }),
  Ke = M({
    compatConfig: { MODE: 3 },
    name: 'AConfigProvider',
    inheritAttrs: !1,
    props: Rs(),
    setup(e, t) {
      let { slots: n } = t;
      const r = _o(),
        o = (O, R) => {
          const { prefixCls: k = 'ant' } = e;
          if (R) return R;
          const X = k || r.getPrefixCls('');
          return O ? `${X}-${O}` : X;
        },
        i = P(() => e.iconPrefixCls || r.iconPrefixCls.value || Mn),
        a = P(() => i.value !== r.iconPrefixCls.value),
        s = P(() => {
          var O;
          return (
            e.csp || ((O = r.csp) === null || O === void 0 ? void 0 : O.value)
          );
        }),
        f = Bf(i),
        c = zf(
          P(() => e.theme),
          P(() => {
            var O;
            return (O = r.theme) === null || O === void 0 ? void 0 : O.value;
          })
        ),
        l = O => (e.renderEmpty || n.renderEmpty || r.renderEmpty || Cc)(O),
        u = P(() => {
          var O, R;
          return (O = e.autoInsertSpaceInButton) !== null && O !== void 0
            ? O
            : (R = r.autoInsertSpaceInButton) === null || R === void 0
            ? void 0
            : R.value;
        }),
        d = P(() => {
          var O;
          return (
            e.locale ||
            ((O = r.locale) === null || O === void 0 ? void 0 : O.value)
          );
        });
      de(
        d,
        () => {
          ir.locale = d.value;
        },
        { immediate: !0 }
      );
      const m = P(() => {
          var O;
          return (
            e.direction ||
            ((O = r.direction) === null || O === void 0 ? void 0 : O.value)
          );
        }),
        p = P(() => {
          var O, R;
          return (O = e.space) !== null && O !== void 0
            ? O
            : (R = r.space) === null || R === void 0
            ? void 0
            : R.value;
        }),
        g = P(() => {
          var O, R;
          return (O = e.virtual) !== null && O !== void 0
            ? O
            : (R = r.virtual) === null || R === void 0
            ? void 0
            : R.value;
        }),
        w = P(() => {
          var O, R;
          return (O = e.dropdownMatchSelectWidth) !== null && O !== void 0
            ? O
            : (R = r.dropdownMatchSelectWidth) === null || R === void 0
            ? void 0
            : R.value;
        }),
        b = P(() => {
          var O;
          return e.getTargetContainer !== void 0
            ? e.getTargetContainer
            : (O = r.getTargetContainer) === null || O === void 0
            ? void 0
            : O.value;
        }),
        x = P(() => {
          var O;
          return e.getPopupContainer !== void 0
            ? e.getPopupContainer
            : (O = r.getPopupContainer) === null || O === void 0
            ? void 0
            : O.value;
        }),
        T = P(() => {
          var O;
          return e.pageHeader !== void 0
            ? e.pageHeader
            : (O = r.pageHeader) === null || O === void 0
            ? void 0
            : O.value;
        }),
        $ = P(() => {
          var O;
          return e.input !== void 0
            ? e.input
            : (O = r.input) === null || O === void 0
            ? void 0
            : O.value;
        }),
        E = P(() => {
          var O;
          return e.pagination !== void 0
            ? e.pagination
            : (O = r.pagination) === null || O === void 0
            ? void 0
            : O.value;
        }),
        S = P(() => {
          var O;
          return e.form !== void 0
            ? e.form
            : (O = r.form) === null || O === void 0
            ? void 0
            : O.value;
        }),
        C = P(() => {
          var O;
          return e.select !== void 0
            ? e.select
            : (O = r.select) === null || O === void 0
            ? void 0
            : O.value;
        }),
        _ = P(() => e.componentSize),
        I = P(() => e.componentDisabled),
        L = {
          csp: s,
          autoInsertSpaceInButton: u,
          locale: d,
          direction: m,
          space: p,
          virtual: g,
          dropdownMatchSelectWidth: w,
          getPrefixCls: o,
          iconPrefixCls: i,
          theme: P(() => {
            var O, R;
            return (O = c.value) !== null && O !== void 0
              ? O
              : (R = r.theme) === null || R === void 0
              ? void 0
              : R.value;
          }),
          renderEmpty: l,
          getTargetContainer: b,
          getPopupContainer: x,
          pageHeader: T,
          input: $,
          pagination: E,
          form: S,
          select: C,
          componentSize: _,
          componentDisabled: I,
          transformCellText: P(() => e.transformCellText)
        },
        Q = P(() => {
          const O = c.value || {},
            { algorithm: R, token: k } = O,
            X = Uf(O, ['algorithm', 'token']),
            Jt = R && (!Array.isArray(R) || R.length > 0) ? Go(R) : void 0;
          return y(y({}, X), { theme: Jt, token: y(y({}, kt), k) });
        }),
        q = P(() => {
          var O, R;
          let k = {};
          return (
            d.value &&
              (k =
                ((O = d.value.Form) === null || O === void 0
                  ? void 0
                  : O.defaultValidateMessages) ||
                ((R = Ae.Form) === null || R === void 0
                  ? void 0
                  : R.defaultValidateMessages) ||
                {}),
            e.form &&
              e.form.validateMessages &&
              (k = y(y({}, k), e.form.validateMessages)),
            k
          );
        });
      Is(L), As({ validateMessages: q }), Sc(_), ks(I);
      const Kt = O => {
        var R, k;
        let X = a.value
          ? f((R = n.default) === null || R === void 0 ? void 0 : R.call(n))
          : (k = n.default) === null || k === void 0
          ? void 0
          : k.call(n);
        if (e.theme) {
          const Jt = (function() {
            return X;
          })();
          X = v(pc, { value: Q.value }, { default: () => [Jt] });
        }
        return v(
          zu,
          { locale: d.value || O, ANT_MARK__: Sn },
          { default: () => [X] }
        );
      };
      return (
        ot(() => {
          m.value &&
            (bf.config({ rtl: m.value === 'rtl' }),
            Pt.config({ rtl: m.value === 'rtl' }));
        }),
        () => v(ko, { children: (O, R, k) => Kt(k) }, null)
      );
    }
  });
Ke.config = Wf;
Ke.install = function(e) {
  e.component(Ke.name, Ke);
};
function sa(e, t) {
  return function() {
    return e.apply(t, arguments);
  };
}
const { toString: Gf } = Object.prototype,
  { getPrototypeOf: ar } = Object,
  Ut = (e => t => {
    const n = Gf.call(t);
    return e[n] || (e[n] = n.slice(8, -1).toLowerCase());
  })(Object.create(null)),
  ne = e => ((e = e.toLowerCase()), t => Ut(t) === e),
  qt = e => t => typeof t === e,
  { isArray: Be } = Array,
  nt = qt('undefined');
function Xf(e) {
  return (
    e !== null &&
    !nt(e) &&
    e.constructor !== null &&
    !nt(e.constructor) &&
    J(e.constructor.isBuffer) &&
    e.constructor.isBuffer(e)
  );
}
const la = ne('ArrayBuffer');
function Kf(e) {
  let t;
  return (
    typeof ArrayBuffer < 'u' && ArrayBuffer.isView
      ? (t = ArrayBuffer.isView(e))
      : (t = e && e.buffer && la(e.buffer)),
    t
  );
}
const Jf = qt('string'),
  J = qt('function'),
  ca = qt('number'),
  Wt = e => e !== null && typeof e == 'object',
  Yf = e => e === !0 || e === !1,
  yt = e => {
    if (Ut(e) !== 'object') return !1;
    const t = ar(e);
    return (
      (t === null ||
        t === Object.prototype ||
        Object.getPrototypeOf(t) === null) &&
      !(Symbol.toStringTag in e) &&
      !(Symbol.iterator in e)
    );
  },
  Qf = ne('Date'),
  Zf = ne('File'),
  ed = ne('Blob'),
  td = ne('FileList'),
  nd = e => Wt(e) && J(e.pipe),
  rd = e => {
    let t;
    return (
      e &&
      ((typeof FormData == 'function' && e instanceof FormData) ||
        (J(e.append) &&
          ((t = Ut(e)) === 'formdata' ||
            (t === 'object' &&
              J(e.toString) &&
              e.toString() === '[object FormData]'))))
    );
  },
  od = ne('URLSearchParams'),
  [id, ad, sd, ld] = ['ReadableStream', 'Request', 'Response', 'Headers'].map(
    ne
  ),
  cd = e =>
    e.trim ? e.trim() : e.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
function it(e, t, { allOwnKeys: n = !1 } = {}) {
  if (e === null || typeof e > 'u') return;
  let r, o;
  if ((typeof e != 'object' && (e = [e]), Be(e)))
    for (r = 0, o = e.length; r < o; r++) t.call(null, e[r], r, e);
  else {
    const i = n ? Object.getOwnPropertyNames(e) : Object.keys(e),
      a = i.length;
    let s;
    for (r = 0; r < a; r++) (s = i[r]), t.call(null, e[s], s, e);
  }
}
function ua(e, t) {
  t = t.toLowerCase();
  const n = Object.keys(e);
  let r = n.length,
    o;
  for (; r-- > 0; ) if (((o = n[r]), t === o.toLowerCase())) return o;
  return null;
}
const fa = (() =>
    typeof globalThis < 'u'
      ? globalThis
      : typeof self < 'u'
      ? self
      : typeof window < 'u'
      ? window
      : global)(),
  da = e => !nt(e) && e !== fa;
function Pn() {
  const { caseless: e } = (da(this) && this) || {},
    t = {},
    n = (r, o) => {
      const i = (e && ua(t, o)) || o;
      yt(t[i]) && yt(r)
        ? (t[i] = Pn(t[i], r))
        : yt(r)
        ? (t[i] = Pn({}, r))
        : Be(r)
        ? (t[i] = r.slice())
        : (t[i] = r);
    };
  for (let r = 0, o = arguments.length; r < o; r++)
    arguments[r] && it(arguments[r], n);
  return t;
}
const ud = (e, t, n, { allOwnKeys: r } = {}) => (
    it(
      t,
      (o, i) => {
        n && J(o) ? (e[i] = sa(o, n)) : (e[i] = o);
      },
      { allOwnKeys: r }
    ),
    e
  ),
  fd = e => (e.charCodeAt(0) === 65279 && (e = e.slice(1)), e),
  dd = (e, t, n, r) => {
    (e.prototype = Object.create(t.prototype, r)),
      (e.prototype.constructor = e),
      Object.defineProperty(e, 'super', { value: t.prototype }),
      n && Object.assign(e.prototype, n);
  },
  pd = (e, t, n, r) => {
    let o, i, a;
    const s = {};
    if (((t = t || {}), e == null)) return t;
    do {
      for (o = Object.getOwnPropertyNames(e), i = o.length; i-- > 0; )
        (a = o[i]), (!r || r(a, e, t)) && !s[a] && ((t[a] = e[a]), (s[a] = !0));
      e = n !== !1 && ar(e);
    } while (e && (!n || n(e, t)) && e !== Object.prototype);
    return t;
  },
  md = (e, t, n) => {
    (e = String(e)),
      (n === void 0 || n > e.length) && (n = e.length),
      (n -= t.length);
    const r = e.indexOf(t, n);
    return r !== -1 && r === n;
  },
  gd = e => {
    if (!e) return null;
    if (Be(e)) return e;
    let t = e.length;
    if (!ca(t)) return null;
    const n = new Array(t);
    for (; t-- > 0; ) n[t] = e[t];
    return n;
  },
  hd = (e => t => e && t instanceof e)(
    typeof Uint8Array < 'u' && ar(Uint8Array)
  ),
  yd = (e, t) => {
    const r = (e && e[Symbol.iterator]).call(e);
    let o;
    for (; (o = r.next()) && !o.done; ) {
      const i = o.value;
      t.call(e, i[0], i[1]);
    }
  },
  vd = (e, t) => {
    let n;
    const r = [];
    for (; (n = e.exec(t)) !== null; ) r.push(n);
    return r;
  },
  bd = ne('HTMLFormElement'),
  Cd = e =>
    e.toLowerCase().replace(/[-_\s]([a-z\d])(\w*)/g, function(n, r, o) {
      return r.toUpperCase() + o;
    }),
  so = (({ hasOwnProperty: e }) => (t, n) => e.call(t, n))(Object.prototype),
  Sd = ne('RegExp'),
  pa = (e, t) => {
    const n = Object.getOwnPropertyDescriptors(e),
      r = {};
    it(n, (o, i) => {
      let a;
      (a = t(o, i, e)) !== !1 && (r[i] = a || o);
    }),
      Object.defineProperties(e, r);
  },
  xd = e => {
    pa(e, (t, n) => {
      if (J(e) && ['arguments', 'caller', 'callee'].indexOf(n) !== -1)
        return !1;
      const r = e[n];
      if (J(r)) {
        if (((t.enumerable = !1), 'writable' in t)) {
          t.writable = !1;
          return;
        }
        t.set ||
          (t.set = () => {
            throw Error("Can not rewrite read-only method '" + n + "'");
          });
      }
    });
  },
  wd = (e, t) => {
    const n = {},
      r = o => {
        o.forEach(i => {
          n[i] = !0;
        });
      };
    return Be(e) ? r(e) : r(String(e).split(t)), n;
  },
  Od = () => {},
  Pd = (e, t) => (e != null && Number.isFinite((e = +e)) ? e : t),
  rn = 'abcdefghijklmnopqrstuvwxyz',
  lo = '0123456789',
  ma = { DIGIT: lo, ALPHA: rn, ALPHA_DIGIT: rn + rn.toUpperCase() + lo },
  Td = (e = 16, t = ma.ALPHA_DIGIT) => {
    let n = '';
    const { length: r } = t;
    for (; e--; ) n += t[(Math.random() * r) | 0];
    return n;
  };
function $d(e) {
  return !!(
    e &&
    J(e.append) &&
    e[Symbol.toStringTag] === 'FormData' &&
    e[Symbol.iterator]
  );
}
const Ed = e => {
    const t = new Array(10),
      n = (r, o) => {
        if (Wt(r)) {
          if (t.indexOf(r) >= 0) return;
          if (!('toJSON' in r)) {
            t[o] = r;
            const i = Be(r) ? [] : {};
            return (
              it(r, (a, s) => {
                const f = n(a, o + 1);
                !nt(f) && (i[s] = f);
              }),
              (t[o] = void 0),
              i
            );
          }
        }
        return r;
      };
    return n(e, 0);
  },
  _d = ne('AsyncFunction'),
  Ad = e => e && (Wt(e) || J(e)) && J(e.then) && J(e.catch),
  h = {
    isArray: Be,
    isArrayBuffer: la,
    isBuffer: Xf,
    isFormData: rd,
    isArrayBufferView: Kf,
    isString: Jf,
    isNumber: ca,
    isBoolean: Yf,
    isObject: Wt,
    isPlainObject: yt,
    isReadableStream: id,
    isRequest: ad,
    isResponse: sd,
    isHeaders: ld,
    isUndefined: nt,
    isDate: Qf,
    isFile: Zf,
    isBlob: ed,
    isRegExp: Sd,
    isFunction: J,
    isStream: nd,
    isURLSearchParams: od,
    isTypedArray: hd,
    isFileList: td,
    forEach: it,
    merge: Pn,
    extend: ud,
    trim: cd,
    stripBOM: fd,
    inherits: dd,
    toFlatObject: pd,
    kindOf: Ut,
    kindOfTest: ne,
    endsWith: md,
    toArray: gd,
    forEachEntry: yd,
    matchAll: vd,
    isHTMLForm: bd,
    hasOwnProperty: so,
    hasOwnProp: so,
    reduceDescriptors: pa,
    freezeMethods: xd,
    toObjectSet: wd,
    toCamelCase: Cd,
    noop: Od,
    toFiniteNumber: Pd,
    findKey: ua,
    global: fa,
    isContextDefined: da,
    ALPHABET: ma,
    generateString: Td,
    isSpecCompliantForm: $d,
    toJSONObject: Ed,
    isAsyncFn: _d,
    isThenable: Ad
  };
function A(e, t, n, r, o) {
  Error.call(this),
    Error.captureStackTrace
      ? Error.captureStackTrace(this, this.constructor)
      : (this.stack = new Error().stack),
    (this.message = e),
    (this.name = 'AxiosError'),
    t && (this.code = t),
    n && (this.config = n),
    r && (this.request = r),
    o && (this.response = o);
}
h.inherits(A, Error, {
  toJSON: function() {
    return {
      message: this.message,
      name: this.name,
      description: this.description,
      number: this.number,
      fileName: this.fileName,
      lineNumber: this.lineNumber,
      columnNumber: this.columnNumber,
      stack: this.stack,
      config: h.toJSONObject(this.config),
      code: this.code,
      status:
        this.response && this.response.status ? this.response.status : null
    };
  }
});
const ga = A.prototype,
  ha = {};
[
  'ERR_BAD_OPTION_VALUE',
  'ERR_BAD_OPTION',
  'ECONNABORTED',
  'ETIMEDOUT',
  'ERR_NETWORK',
  'ERR_FR_TOO_MANY_REDIRECTS',
  'ERR_DEPRECATED',
  'ERR_BAD_RESPONSE',
  'ERR_BAD_REQUEST',
  'ERR_CANCELED',
  'ERR_NOT_SUPPORT',
  'ERR_INVALID_URL'
].forEach(e => {
  ha[e] = { value: e };
});
Object.defineProperties(A, ha);
Object.defineProperty(ga, 'isAxiosError', { value: !0 });
A.from = (e, t, n, r, o, i) => {
  const a = Object.create(ga);
  return (
    h.toFlatObject(
      e,
      a,
      function(f) {
        return f !== Error.prototype;
      },
      s => s !== 'isAxiosError'
    ),
    A.call(a, e.message, t, n, r, o),
    (a.cause = e),
    (a.name = e.name),
    i && Object.assign(a, i),
    a
  );
};
const Rd = null;
function Tn(e) {
  return h.isPlainObject(e) || h.isArray(e);
}
function ya(e) {
  return h.endsWith(e, '[]') ? e.slice(0, -2) : e;
}
function co(e, t, n) {
  return e
    ? e
        .concat(t)
        .map(function(o, i) {
          return (o = ya(o)), !n && i ? '[' + o + ']' : o;
        })
        .join(n ? '.' : '')
    : t;
}
function Id(e) {
  return h.isArray(e) && !e.some(Tn);
}
const kd = h.toFlatObject(h, {}, null, function(t) {
  return /^is[A-Z]/.test(t);
});
function Vt(e, t, n) {
  if (!h.isObject(e)) throw new TypeError('target must be an object');
  (t = t || new FormData()),
    (n = h.toFlatObject(
      n,
      { metaTokens: !0, dots: !1, indexes: !1 },
      !1,
      function(g, w) {
        return !h.isUndefined(w[g]);
      }
    ));
  const r = n.metaTokens,
    o = n.visitor || l,
    i = n.dots,
    a = n.indexes,
    f = (n.Blob || (typeof Blob < 'u' && Blob)) && h.isSpecCompliantForm(t);
  if (!h.isFunction(o)) throw new TypeError('visitor must be a function');
  function c(p) {
    if (p === null) return '';
    if (h.isDate(p)) return p.toISOString();
    if (!f && h.isBlob(p))
      throw new A('Blob is not supported. Use a Buffer instead.');
    return h.isArrayBuffer(p) || h.isTypedArray(p)
      ? f && typeof Blob == 'function'
        ? new Blob([p])
        : Buffer.from(p)
      : p;
  }
  function l(p, g, w) {
    let b = p;
    if (p && !w && typeof p == 'object') {
      if (h.endsWith(g, '{}'))
        (g = r ? g : g.slice(0, -2)), (p = JSON.stringify(p));
      else if (
        (h.isArray(p) && Id(p)) ||
        ((h.isFileList(p) || h.endsWith(g, '[]')) && (b = h.toArray(p)))
      )
        return (
          (g = ya(g)),
          b.forEach(function(T, $) {
            !(h.isUndefined(T) || T === null) &&
              t.append(
                a === !0 ? co([g], $, i) : a === null ? g : g + '[]',
                c(T)
              );
          }),
          !1
        );
    }
    return Tn(p) ? !0 : (t.append(co(w, g, i), c(p)), !1);
  }
  const u = [],
    d = Object.assign(kd, {
      defaultVisitor: l,
      convertValue: c,
      isVisitable: Tn
    });
  function m(p, g) {
    if (!h.isUndefined(p)) {
      if (u.indexOf(p) !== -1)
        throw Error('Circular reference detected in ' + g.join('.'));
      u.push(p),
        h.forEach(p, function(b, x) {
          (!(h.isUndefined(b) || b === null) &&
            o.call(t, b, h.isString(x) ? x.trim() : x, g, d)) === !0 &&
            m(b, g ? g.concat(x) : [x]);
        }),
        u.pop();
    }
  }
  if (!h.isObject(e)) throw new TypeError('data must be an object');
  return m(e), t;
}
function uo(e) {
  const t = {
    '!': '%21',
    "'": '%27',
    '(': '%28',
    ')': '%29',
    '~': '%7E',
    '%20': '+',
    '%00': '\0'
  };
  return encodeURIComponent(e).replace(/[!'()~]|%20|%00/g, function(r) {
    return t[r];
  });
}
function sr(e, t) {
  (this._pairs = []), e && Vt(e, this, t);
}
const va = sr.prototype;
va.append = function(t, n) {
  this._pairs.push([t, n]);
};
va.toString = function(t) {
  const n = t
    ? function(r) {
        return t.call(this, r, uo);
      }
    : uo;
  return this._pairs
    .map(function(o) {
      return n(o[0]) + '=' + n(o[1]);
    }, '')
    .join('&');
};
function jd(e) {
  return encodeURIComponent(e)
    .replace(/%3A/gi, ':')
    .replace(/%24/g, '$')
    .replace(/%2C/gi, ',')
    .replace(/%20/g, '+')
    .replace(/%5B/gi, '[')
    .replace(/%5D/gi, ']');
}
function ba(e, t, n) {
  if (!t) return e;
  const r = (n && n.encode) || jd,
    o = n && n.serialize;
  let i;
  if (
    (o
      ? (i = o(t, n))
      : (i = h.isURLSearchParams(t) ? t.toString() : new sr(t, n).toString(r)),
    i)
  ) {
    const a = e.indexOf('#');
    a !== -1 && (e = e.slice(0, a)),
      (e += (e.indexOf('?') === -1 ? '?' : '&') + i);
  }
  return e;
}
class Nd {
  constructor() {
    this.handlers = [];
  }
  use(t, n, r) {
    return (
      this.handlers.push({
        fulfilled: t,
        rejected: n,
        synchronous: r ? r.synchronous : !1,
        runWhen: r ? r.runWhen : null
      }),
      this.handlers.length - 1
    );
  }
  eject(t) {
    this.handlers[t] && (this.handlers[t] = null);
  }
  clear() {
    this.handlers && (this.handlers = []);
  }
  forEach(t) {
    h.forEach(this.handlers, function(r) {
      r !== null && t(r);
    });
  }
}
const fo = Nd,
  Ca = {
    silentJSONParsing: !0,
    forcedJSONParsing: !0,
    clarifyTimeoutError: !1
  },
  Md = typeof URLSearchParams < 'u' ? URLSearchParams : sr,
  Ld = typeof FormData < 'u' ? FormData : null,
  Fd = typeof Blob < 'u' ? Blob : null,
  Dd = {
    isBrowser: !0,
    classes: { URLSearchParams: Md, FormData: Ld, Blob: Fd },
    protocols: ['http', 'https', 'file', 'blob', 'url', 'data']
  },
  lr = typeof window < 'u' && typeof document < 'u',
  Hd = (e => lr && ['ReactNative', 'NativeScript', 'NS'].indexOf(e) < 0)(
    typeof navigator < 'u' && navigator.product
  ),
  Bd = (() =>
    typeof WorkerGlobalScope < 'u' &&
    self instanceof WorkerGlobalScope &&
    typeof self.importScripts == 'function')(),
  zd = (lr && window.location.href) || 'http://localhost',
  Ud = Object.freeze(
    Object.defineProperty(
      {
        __proto__: null,
        hasBrowserEnv: lr,
        hasStandardBrowserEnv: Hd,
        hasStandardBrowserWebWorkerEnv: Bd,
        origin: zd
      },
      Symbol.toStringTag,
      { value: 'Module' }
    )
  ),
  ee = { ...Ud, ...Dd };
function qd(e, t) {
  return Vt(
    e,
    new ee.classes.URLSearchParams(),
    Object.assign(
      {
        visitor: function(n, r, o, i) {
          return ee.isNode && h.isBuffer(n)
            ? (this.append(r, n.toString('base64')), !1)
            : i.defaultVisitor.apply(this, arguments);
        }
      },
      t
    )
  );
}
function Wd(e) {
  return h
    .matchAll(/\w+|\[(\w*)]/g, e)
    .map(t => (t[0] === '[]' ? '' : t[1] || t[0]));
}
function Vd(e) {
  const t = {},
    n = Object.keys(e);
  let r;
  const o = n.length;
  let i;
  for (r = 0; r < o; r++) (i = n[r]), (t[i] = e[i]);
  return t;
}
function Sa(e) {
  function t(n, r, o, i) {
    let a = n[i++];
    if (a === '__proto__') return !0;
    const s = Number.isFinite(+a),
      f = i >= n.length;
    return (
      (a = !a && h.isArray(o) ? o.length : a),
      f
        ? (h.hasOwnProp(o, a) ? (o[a] = [o[a], r]) : (o[a] = r), !s)
        : ((!o[a] || !h.isObject(o[a])) && (o[a] = []),
          t(n, r, o[a], i) && h.isArray(o[a]) && (o[a] = Vd(o[a])),
          !s)
    );
  }
  if (h.isFormData(e) && h.isFunction(e.entries)) {
    const n = {};
    return (
      h.forEachEntry(e, (r, o) => {
        t(Wd(r), o, n, 0);
      }),
      n
    );
  }
  return null;
}
function Gd(e, t, n) {
  if (h.isString(e))
    try {
      return (t || JSON.parse)(e), h.trim(e);
    } catch (r) {
      if (r.name !== 'SyntaxError') throw r;
    }
  return (n || JSON.stringify)(e);
}
const cr = {
  transitional: Ca,
  adapter: ['xhr', 'http', 'fetch'],
  transformRequest: [
    function(t, n) {
      const r = n.getContentType() || '',
        o = r.indexOf('application/json') > -1,
        i = h.isObject(t);
      if ((i && h.isHTMLForm(t) && (t = new FormData(t)), h.isFormData(t)))
        return o ? JSON.stringify(Sa(t)) : t;
      if (
        h.isArrayBuffer(t) ||
        h.isBuffer(t) ||
        h.isStream(t) ||
        h.isFile(t) ||
        h.isBlob(t) ||
        h.isReadableStream(t)
      )
        return t;
      if (h.isArrayBufferView(t)) return t.buffer;
      if (h.isURLSearchParams(t))
        return (
          n.setContentType(
            'application/x-www-form-urlencoded;charset=utf-8',
            !1
          ),
          t.toString()
        );
      let s;
      if (i) {
        if (r.indexOf('application/x-www-form-urlencoded') > -1)
          return qd(t, this.formSerializer).toString();
        if ((s = h.isFileList(t)) || r.indexOf('multipart/form-data') > -1) {
          const f = this.env && this.env.FormData;
          return Vt(
            s ? { 'files[]': t } : t,
            f && new f(),
            this.formSerializer
          );
        }
      }
      return i || o ? (n.setContentType('application/json', !1), Gd(t)) : t;
    }
  ],
  transformResponse: [
    function(t) {
      const n = this.transitional || cr.transitional,
        r = n && n.forcedJSONParsing,
        o = this.responseType === 'json';
      if (h.isResponse(t) || h.isReadableStream(t)) return t;
      if (t && h.isString(t) && ((r && !this.responseType) || o)) {
        const a = !(n && n.silentJSONParsing) && o;
        try {
          return JSON.parse(t);
        } catch (s) {
          if (a)
            throw s.name === 'SyntaxError'
              ? A.from(s, A.ERR_BAD_RESPONSE, this, null, this.response)
              : s;
        }
      }
      return t;
    }
  ],
  timeout: 0,
  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',
  maxContentLength: -1,
  maxBodyLength: -1,
  env: { FormData: ee.classes.FormData, Blob: ee.classes.Blob },
  validateStatus: function(t) {
    return t >= 200 && t < 300;
  },
  headers: {
    common: {
      Accept: 'application/json, text/plain, */*',
      'Content-Type': void 0
    }
  }
};
h.forEach(['delete', 'get', 'head', 'post', 'put', 'patch'], e => {
  cr.headers[e] = {};
});
const ur = cr,
  Xd = h.toObjectSet([
    'age',
    'authorization',
    'content-length',
    'content-type',
    'etag',
    'expires',
    'from',
    'host',
    'if-modified-since',
    'if-unmodified-since',
    'last-modified',
    'location',
    'max-forwards',
    'proxy-authorization',
    'referer',
    'retry-after',
    'user-agent'
  ]),
  Kd = e => {
    const t = {};
    let n, r, o;
    return (
      e &&
        e
          .split(
            `
`
          )
          .forEach(function(a) {
            (o = a.indexOf(':')),
              (n = a
                .substring(0, o)
                .trim()
                .toLowerCase()),
              (r = a.substring(o + 1).trim()),
              !(!n || (t[n] && Xd[n])) &&
                (n === 'set-cookie'
                  ? t[n]
                    ? t[n].push(r)
                    : (t[n] = [r])
                  : (t[n] = t[n] ? t[n] + ', ' + r : r));
          }),
      t
    );
  },
  po = Symbol('internals');
function We(e) {
  return (
    e &&
    String(e)
      .trim()
      .toLowerCase()
  );
}
function vt(e) {
  return e === !1 || e == null ? e : h.isArray(e) ? e.map(vt) : String(e);
}
function Jd(e) {
  const t = Object.create(null),
    n = /([^\s,;=]+)\s*(?:=\s*([^,;]+))?/g;
  let r;
  for (; (r = n.exec(e)); ) t[r[1]] = r[2];
  return t;
}
const Yd = e => /^[-_a-zA-Z0-9^`|~,!#$%&'*+.]+$/.test(e.trim());
function on(e, t, n, r, o) {
  if (h.isFunction(r)) return r.call(this, t, n);
  if ((o && (t = n), !!h.isString(t))) {
    if (h.isString(r)) return t.indexOf(r) !== -1;
    if (h.isRegExp(r)) return r.test(t);
  }
}
function Qd(e) {
  return e
    .trim()
    .toLowerCase()
    .replace(/([a-z\d])(\w*)/g, (t, n, r) => n.toUpperCase() + r);
}
function Zd(e, t) {
  const n = h.toCamelCase(' ' + t);
  ['get', 'set', 'has'].forEach(r => {
    Object.defineProperty(e, r + n, {
      value: function(o, i, a) {
        return this[r].call(this, t, o, i, a);
      },
      configurable: !0
    });
  });
}
class Gt {
  constructor(t) {
    t && this.set(t);
  }
  set(t, n, r) {
    const o = this;
    function i(s, f, c) {
      const l = We(f);
      if (!l) throw new Error('header name must be a non-empty string');
      const u = h.findKey(o, l);
      (!u || o[u] === void 0 || c === !0 || (c === void 0 && o[u] !== !1)) &&
        (o[u || f] = vt(s));
    }
    const a = (s, f) => h.forEach(s, (c, l) => i(c, l, f));
    if (h.isPlainObject(t) || t instanceof this.constructor) a(t, n);
    else if (h.isString(t) && (t = t.trim()) && !Yd(t)) a(Kd(t), n);
    else if (h.isHeaders(t)) for (const [s, f] of t.entries()) i(f, s, r);
    else t != null && i(n, t, r);
    return this;
  }
  get(t, n) {
    if (((t = We(t)), t)) {
      const r = h.findKey(this, t);
      if (r) {
        const o = this[r];
        if (!n) return o;
        if (n === !0) return Jd(o);
        if (h.isFunction(n)) return n.call(this, o, r);
        if (h.isRegExp(n)) return n.exec(o);
        throw new TypeError('parser must be boolean|regexp|function');
      }
    }
  }
  has(t, n) {
    if (((t = We(t)), t)) {
      const r = h.findKey(this, t);
      return !!(r && this[r] !== void 0 && (!n || on(this, this[r], r, n)));
    }
    return !1;
  }
  delete(t, n) {
    const r = this;
    let o = !1;
    function i(a) {
      if (((a = We(a)), a)) {
        const s = h.findKey(r, a);
        s && (!n || on(r, r[s], s, n)) && (delete r[s], (o = !0));
      }
    }
    return h.isArray(t) ? t.forEach(i) : i(t), o;
  }
  clear(t) {
    const n = Object.keys(this);
    let r = n.length,
      o = !1;
    for (; r--; ) {
      const i = n[r];
      (!t || on(this, this[i], i, t, !0)) && (delete this[i], (o = !0));
    }
    return o;
  }
  normalize(t) {
    const n = this,
      r = {};
    return (
      h.forEach(this, (o, i) => {
        const a = h.findKey(r, i);
        if (a) {
          (n[a] = vt(o)), delete n[i];
          return;
        }
        const s = t ? Qd(i) : String(i).trim();
        s !== i && delete n[i], (n[s] = vt(o)), (r[s] = !0);
      }),
      this
    );
  }
  concat(...t) {
    return this.constructor.concat(this, ...t);
  }
  toJSON(t) {
    const n = Object.create(null);
    return (
      h.forEach(this, (r, o) => {
        r != null && r !== !1 && (n[o] = t && h.isArray(r) ? r.join(', ') : r);
      }),
      n
    );
  }
  [Symbol.iterator]() {
    return Object.entries(this.toJSON())[Symbol.iterator]();
  }
  toString() {
    return Object.entries(this.toJSON()).map(([t, n]) => t + ': ' + n).join(`
`);
  }
  get [Symbol.toStringTag]() {
    return 'AxiosHeaders';
  }
  static from(t) {
    return t instanceof this ? t : new this(t);
  }
  static concat(t, ...n) {
    const r = new this(t);
    return n.forEach(o => r.set(o)), r;
  }
  static accessor(t) {
    const r = (this[po] = this[po] = { accessors: {} }).accessors,
      o = this.prototype;
    function i(a) {
      const s = We(a);
      r[s] || (Zd(o, a), (r[s] = !0));
    }
    return h.isArray(t) ? t.forEach(i) : i(t), this;
  }
}
Gt.accessor([
  'Content-Type',
  'Content-Length',
  'Accept',
  'Accept-Encoding',
  'User-Agent',
  'Authorization'
]);
h.reduceDescriptors(Gt.prototype, ({ value: e }, t) => {
  let n = t[0].toUpperCase() + t.slice(1);
  return {
    get: () => e,
    set(r) {
      this[n] = r;
    }
  };
});
h.freezeMethods(Gt);
const te = Gt;
function an(e, t) {
  const n = this || ur,
    r = t || n,
    o = te.from(r.headers);
  let i = r.data;
  return (
    h.forEach(e, function(s) {
      i = s.call(n, i, o.normalize(), t ? t.status : void 0);
    }),
    o.normalize(),
    i
  );
}
function xa(e) {
  return !!(e && e.__CANCEL__);
}
function ze(e, t, n) {
  A.call(this, e ?? 'canceled', A.ERR_CANCELED, t, n),
    (this.name = 'CanceledError');
}
h.inherits(ze, A, { __CANCEL__: !0 });
function wa(e, t, n) {
  const r = n.config.validateStatus;
  !n.status || !r || r(n.status)
    ? e(n)
    : t(
        new A(
          'Request failed with status code ' + n.status,
          [A.ERR_BAD_REQUEST, A.ERR_BAD_RESPONSE][
            Math.floor(n.status / 100) - 4
          ],
          n.config,
          n.request,
          n
        )
      );
}
function ep(e) {
  const t = /^([-+\w]{1,25})(:?\/\/|:)/.exec(e);
  return (t && t[1]) || '';
}
function tp(e, t) {
  e = e || 10;
  const n = new Array(e),
    r = new Array(e);
  let o = 0,
    i = 0,
    a;
  return (
    (t = t !== void 0 ? t : 1e3),
    function(f) {
      const c = Date.now(),
        l = r[i];
      a || (a = c), (n[o] = f), (r[o] = c);
      let u = i,
        d = 0;
      for (; u !== o; ) (d += n[u++]), (u = u % e);
      if (((o = (o + 1) % e), o === i && (i = (i + 1) % e), c - a < t)) return;
      const m = l && c - l;
      return m ? Math.round((d * 1e3) / m) : void 0;
    }
  );
}
function np(e, t) {
  let n = 0;
  const r = 1e3 / t;
  let o = null;
  return function() {
    const a = this === !0,
      s = Date.now();
    if (a || s - n > r)
      return (
        o && (clearTimeout(o), (o = null)), (n = s), e.apply(null, arguments)
      );
    o ||
      (o = setTimeout(
        () => ((o = null), (n = Date.now()), e.apply(null, arguments)),
        r - (s - n)
      ));
  };
}
const Tt = (e, t, n = 3) => {
    let r = 0;
    const o = tp(50, 250);
    return np(i => {
      const a = i.loaded,
        s = i.lengthComputable ? i.total : void 0,
        f = a - r,
        c = o(f),
        l = a <= s;
      r = a;
      const u = {
        loaded: a,
        total: s,
        progress: s ? a / s : void 0,
        bytes: f,
        rate: c || void 0,
        estimated: c && s && l ? (s - a) / c : void 0,
        event: i,
        lengthComputable: s != null
      };
      (u[t ? 'download' : 'upload'] = !0), e(u);
    }, n);
  },
  rp = ee.hasStandardBrowserEnv
    ? (function() {
        const t = /(msie|trident)/i.test(navigator.userAgent),
          n = document.createElement('a');
        let r;
        function o(i) {
          let a = i;
          return (
            t && (n.setAttribute('href', a), (a = n.href)),
            n.setAttribute('href', a),
            {
              href: n.href,
              protocol: n.protocol ? n.protocol.replace(/:$/, '') : '',
              host: n.host,
              search: n.search ? n.search.replace(/^\?/, '') : '',
              hash: n.hash ? n.hash.replace(/^#/, '') : '',
              hostname: n.hostname,
              port: n.port,
              pathname:
                n.pathname.charAt(0) === '/' ? n.pathname : '/' + n.pathname
            }
          );
        }
        return (
          (r = o(window.location.href)),
          function(a) {
            const s = h.isString(a) ? o(a) : a;
            return s.protocol === r.protocol && s.host === r.host;
          }
        );
      })()
    : (function() {
        return function() {
          return !0;
        };
      })(),
  op = ee.hasStandardBrowserEnv
    ? {
        write(e, t, n, r, o, i) {
          const a = [e + '=' + encodeURIComponent(t)];
          h.isNumber(n) && a.push('expires=' + new Date(n).toGMTString()),
            h.isString(r) && a.push('path=' + r),
            h.isString(o) && a.push('domain=' + o),
            i === !0 && a.push('secure'),
            (document.cookie = a.join('; '));
        },
        read(e) {
          const t = document.cookie.match(
            new RegExp('(^|;\\s*)(' + e + ')=([^;]*)')
          );
          return t ? decodeURIComponent(t[3]) : null;
        },
        remove(e) {
          this.write(e, '', Date.now() - 864e5);
        }
      }
    : {
        write() {},
        read() {
          return null;
        },
        remove() {}
      };
function ip(e) {
  return /^([a-z][a-z\d+\-.]*:)?\/\//i.test(e);
}
function ap(e, t) {
  return t ? e.replace(/\/?\/$/, '') + '/' + t.replace(/^\/+/, '') : e;
}
function Oa(e, t) {
  return e && !ip(t) ? ap(e, t) : t;
}
const mo = e => (e instanceof te ? { ...e } : e);
function we(e, t) {
  t = t || {};
  const n = {};
  function r(c, l, u) {
    return h.isPlainObject(c) && h.isPlainObject(l)
      ? h.merge.call({ caseless: u }, c, l)
      : h.isPlainObject(l)
      ? h.merge({}, l)
      : h.isArray(l)
      ? l.slice()
      : l;
  }
  function o(c, l, u) {
    if (h.isUndefined(l)) {
      if (!h.isUndefined(c)) return r(void 0, c, u);
    } else return r(c, l, u);
  }
  function i(c, l) {
    if (!h.isUndefined(l)) return r(void 0, l);
  }
  function a(c, l) {
    if (h.isUndefined(l)) {
      if (!h.isUndefined(c)) return r(void 0, c);
    } else return r(void 0, l);
  }
  function s(c, l, u) {
    if (u in t) return r(c, l);
    if (u in e) return r(void 0, c);
  }
  const f = {
    url: i,
    method: i,
    data: i,
    baseURL: a,
    transformRequest: a,
    transformResponse: a,
    paramsSerializer: a,
    timeout: a,
    timeoutMessage: a,
    withCredentials: a,
    withXSRFToken: a,
    adapter: a,
    responseType: a,
    xsrfCookieName: a,
    xsrfHeaderName: a,
    onUploadProgress: a,
    onDownloadProgress: a,
    decompress: a,
    maxContentLength: a,
    maxBodyLength: a,
    beforeRedirect: a,
    transport: a,
    httpAgent: a,
    httpsAgent: a,
    cancelToken: a,
    socketPath: a,
    responseEncoding: a,
    validateStatus: s,
    headers: (c, l) => o(mo(c), mo(l), !0)
  };
  return (
    h.forEach(Object.keys(Object.assign({}, e, t)), function(l) {
      const u = f[l] || o,
        d = u(e[l], t[l], l);
      (h.isUndefined(d) && u !== s) || (n[l] = d);
    }),
    n
  );
}
const Pa = e => {
    const t = we({}, e);
    let {
      data: n,
      withXSRFToken: r,
      xsrfHeaderName: o,
      xsrfCookieName: i,
      headers: a,
      auth: s
    } = t;
    (t.headers = a = te.from(a)),
      (t.url = ba(Oa(t.baseURL, t.url), e.params, e.paramsSerializer)),
      s &&
        a.set(
          'Authorization',
          'Basic ' +
            btoa(
              (s.username || '') +
                ':' +
                (s.password ? unescape(encodeURIComponent(s.password)) : '')
            )
        );
    let f;
    if (h.isFormData(n)) {
      if (ee.hasStandardBrowserEnv || ee.hasStandardBrowserWebWorkerEnv)
        a.setContentType(void 0);
      else if ((f = a.getContentType()) !== !1) {
        const [c, ...l] = f
          ? f
              .split(';')
              .map(u => u.trim())
              .filter(Boolean)
          : [];
        a.setContentType([c || 'multipart/form-data', ...l].join('; '));
      }
    }
    if (
      ee.hasStandardBrowserEnv &&
      (r && h.isFunction(r) && (r = r(t)), r || (r !== !1 && rp(t.url)))
    ) {
      const c = o && i && op.read(i);
      c && a.set(o, c);
    }
    return t;
  },
  sp = typeof XMLHttpRequest < 'u',
  lp =
    sp &&
    function(e) {
      return new Promise(function(n, r) {
        const o = Pa(e);
        let i = o.data;
        const a = te.from(o.headers).normalize();
        let { responseType: s } = o,
          f;
        function c() {
          o.cancelToken && o.cancelToken.unsubscribe(f),
            o.signal && o.signal.removeEventListener('abort', f);
        }
        let l = new XMLHttpRequest();
        l.open(o.method.toUpperCase(), o.url, !0), (l.timeout = o.timeout);
        function u() {
          if (!l) return;
          const m = te.from(
              'getAllResponseHeaders' in l && l.getAllResponseHeaders()
            ),
            g = {
              data:
                !s || s === 'text' || s === 'json'
                  ? l.responseText
                  : l.response,
              status: l.status,
              statusText: l.statusText,
              headers: m,
              config: e,
              request: l
            };
          wa(
            function(b) {
              n(b), c();
            },
            function(b) {
              r(b), c();
            },
            g
          ),
            (l = null);
        }
        'onloadend' in l
          ? (l.onloadend = u)
          : (l.onreadystatechange = function() {
              !l ||
                l.readyState !== 4 ||
                (l.status === 0 &&
                  !(l.responseURL && l.responseURL.indexOf('file:') === 0)) ||
                setTimeout(u);
            }),
          (l.onabort = function() {
            l &&
              (r(new A('Request aborted', A.ECONNABORTED, o, l)), (l = null));
          }),
          (l.onerror = function() {
            r(new A('Network Error', A.ERR_NETWORK, o, l)), (l = null);
          }),
          (l.ontimeout = function() {
            let p = o.timeout
              ? 'timeout of ' + o.timeout + 'ms exceeded'
              : 'timeout exceeded';
            const g = o.transitional || Ca;
            o.timeoutErrorMessage && (p = o.timeoutErrorMessage),
              r(
                new A(
                  p,
                  g.clarifyTimeoutError ? A.ETIMEDOUT : A.ECONNABORTED,
                  o,
                  l
                )
              ),
              (l = null);
          }),
          i === void 0 && a.setContentType(null),
          'setRequestHeader' in l &&
            h.forEach(a.toJSON(), function(p, g) {
              l.setRequestHeader(g, p);
            }),
          h.isUndefined(o.withCredentials) ||
            (l.withCredentials = !!o.withCredentials),
          s && s !== 'json' && (l.responseType = o.responseType),
          typeof o.onDownloadProgress == 'function' &&
            l.addEventListener('progress', Tt(o.onDownloadProgress, !0)),
          typeof o.onUploadProgress == 'function' &&
            l.upload &&
            l.upload.addEventListener('progress', Tt(o.onUploadProgress)),
          (o.cancelToken || o.signal) &&
            ((f = m => {
              l &&
                (r(!m || m.type ? new ze(null, e, l) : m),
                l.abort(),
                (l = null));
            }),
            o.cancelToken && o.cancelToken.subscribe(f),
            o.signal &&
              (o.signal.aborted ? f() : o.signal.addEventListener('abort', f)));
        const d = ep(o.url);
        if (d && ee.protocols.indexOf(d) === -1) {
          r(new A('Unsupported protocol ' + d + ':', A.ERR_BAD_REQUEST, e));
          return;
        }
        l.send(i || null);
      });
    },
  cp = (e, t) => {
    let n = new AbortController(),
      r;
    const o = function(f) {
      if (!r) {
        (r = !0), a();
        const c = f instanceof Error ? f : this.reason;
        n.abort(
          c instanceof A ? c : new ze(c instanceof Error ? c.message : c)
        );
      }
    };
    let i =
      t &&
      setTimeout(() => {
        o(new A(`timeout ${t} of ms exceeded`, A.ETIMEDOUT));
      }, t);
    const a = () => {
      e &&
        (i && clearTimeout(i),
        (i = null),
        e.forEach(f => {
          f &&
            (f.removeEventListener
              ? f.removeEventListener('abort', o)
              : f.unsubscribe(o));
        }),
        (e = null));
    };
    e.forEach(f => f && f.addEventListener && f.addEventListener('abort', o));
    const { signal: s } = n;
    return (
      (s.unsubscribe = a),
      [
        s,
        () => {
          i && clearTimeout(i), (i = null);
        }
      ]
    );
  },
  up = cp,
  fp = function*(e, t) {
    let n = e.byteLength;
    if (!t || n < t) {
      yield e;
      return;
    }
    let r = 0,
      o;
    for (; r < n; ) (o = r + t), yield e.slice(r, o), (r = o);
  },
  dp = async function*(e, t, n) {
    for await (const r of e)
      yield* fp(ArrayBuffer.isView(r) ? r : await n(String(r)), t);
  },
  go = (e, t, n, r, o) => {
    const i = dp(e, t, o);
    let a = 0;
    return new ReadableStream(
      {
        type: 'bytes',
        async pull(s) {
          const { done: f, value: c } = await i.next();
          if (f) {
            s.close(), r();
            return;
          }
          let l = c.byteLength;
          n && n((a += l)), s.enqueue(new Uint8Array(c));
        },
        cancel(s) {
          return r(s), i.return();
        }
      },
      { highWaterMark: 2 }
    );
  },
  ho = (e, t) => {
    const n = e != null;
    return r =>
      setTimeout(() => t({ lengthComputable: n, total: e, loaded: r }));
  },
  Xt =
    typeof fetch == 'function' &&
    typeof Request == 'function' &&
    typeof Response == 'function',
  Ta = Xt && typeof ReadableStream == 'function',
  $n =
    Xt &&
    (typeof TextEncoder == 'function'
      ? (e => t => e.encode(t))(new TextEncoder())
      : async e => new Uint8Array(await new Response(e).arrayBuffer())),
  pp =
    Ta &&
    (() => {
      let e = !1;
      const t = new Request(ee.origin, {
        body: new ReadableStream(),
        method: 'POST',
        get duplex() {
          return (e = !0), 'half';
        }
      }).headers.has('Content-Type');
      return e && !t;
    })(),
  yo = 64 * 1024,
  En =
    Ta &&
    !!(() => {
      try {
        return h.isReadableStream(new Response('').body);
      } catch {}
    })(),
  $t = { stream: En && (e => e.body) };
Xt &&
  (e => {
    ['text', 'arrayBuffer', 'blob', 'formData', 'stream'].forEach(t => {
      !$t[t] &&
        ($t[t] = h.isFunction(e[t])
          ? n => n[t]()
          : (n, r) => {
              throw new A(
                `Response type '${t}' is not supported`,
                A.ERR_NOT_SUPPORT,
                r
              );
            });
    });
  })(new Response());
const mp = async e => {
    if (e == null) return 0;
    if (h.isBlob(e)) return e.size;
    if (h.isSpecCompliantForm(e))
      return (await new Request(e).arrayBuffer()).byteLength;
    if (h.isArrayBufferView(e)) return e.byteLength;
    if ((h.isURLSearchParams(e) && (e = e + ''), h.isString(e)))
      return (await $n(e)).byteLength;
  },
  gp = async (e, t) => {
    const n = h.toFiniteNumber(e.getContentLength());
    return n ?? mp(t);
  },
  hp =
    Xt &&
    (async e => {
      let {
        url: t,
        method: n,
        data: r,
        signal: o,
        cancelToken: i,
        timeout: a,
        onDownloadProgress: s,
        onUploadProgress: f,
        responseType: c,
        headers: l,
        withCredentials: u = 'same-origin',
        fetchOptions: d
      } = Pa(e);
      c = c ? (c + '').toLowerCase() : 'text';
      let [m, p] = o || i || a ? up([o, i], a) : [],
        g,
        w;
      const b = () => {
        !g &&
          setTimeout(() => {
            m && m.unsubscribe();
          }),
          (g = !0);
      };
      let x;
      try {
        if (
          f &&
          pp &&
          n !== 'get' &&
          n !== 'head' &&
          (x = await gp(l, r)) !== 0
        ) {
          let S = new Request(t, { method: 'POST', body: r, duplex: 'half' }),
            C;
          h.isFormData(r) &&
            (C = S.headers.get('content-type')) &&
            l.setContentType(C),
            S.body && (r = go(S.body, yo, ho(x, Tt(f)), null, $n));
        }
        h.isString(u) || (u = u ? 'cors' : 'omit'),
          (w = new Request(t, {
            ...d,
            signal: m,
            method: n.toUpperCase(),
            headers: l.normalize().toJSON(),
            body: r,
            duplex: 'half',
            withCredentials: u
          }));
        let T = await fetch(w);
        const $ = En && (c === 'stream' || c === 'response');
        if (En && (s || $)) {
          const S = {};
          ['status', 'statusText', 'headers'].forEach(_ => {
            S[_] = T[_];
          });
          const C = h.toFiniteNumber(T.headers.get('content-length'));
          T = new Response(
            go(T.body, yo, s && ho(C, Tt(s, !0)), $ && b, $n),
            S
          );
        }
        c = c || 'text';
        let E = await $t[h.findKey($t, c) || 'text'](T, e);
        return (
          !$ && b(),
          p && p(),
          await new Promise((S, C) => {
            wa(S, C, {
              data: E,
              headers: te.from(T.headers),
              status: T.status,
              statusText: T.statusText,
              config: e,
              request: w
            });
          })
        );
      } catch (T) {
        throw (b(),
        T && T.name === 'TypeError' && /fetch/i.test(T.message)
          ? Object.assign(new A('Network Error', A.ERR_NETWORK, e, w), {
              cause: T.cause || T
            })
          : A.from(T, T && T.code, e, w));
      }
    }),
  _n = { http: Rd, xhr: lp, fetch: hp };
h.forEach(_n, (e, t) => {
  if (e) {
    try {
      Object.defineProperty(e, 'name', { value: t });
    } catch {}
    Object.defineProperty(e, 'adapterName', { value: t });
  }
});
const vo = e => `- ${e}`,
  yp = e => h.isFunction(e) || e === null || e === !1,
  $a = {
    getAdapter: e => {
      e = h.isArray(e) ? e : [e];
      const { length: t } = e;
      let n, r;
      const o = {};
      for (let i = 0; i < t; i++) {
        n = e[i];
        let a;
        if (
          ((r = n),
          !yp(n) && ((r = _n[(a = String(n)).toLowerCase()]), r === void 0))
        )
          throw new A(`Unknown adapter '${a}'`);
        if (r) break;
        o[a || '#' + i] = r;
      }
      if (!r) {
        const i = Object.entries(o).map(
          ([s, f]) =>
            `adapter ${s} ` +
            (f === !1
              ? 'is not supported by the environment'
              : 'is not available in the build')
        );
        let a = t
          ? i.length > 1
            ? `since :
` +
              i.map(vo).join(`
`)
            : ' ' + vo(i[0])
          : 'as no adapter specified';
        throw new A(
          'There is no suitable adapter to dispatch the request ' + a,
          'ERR_NOT_SUPPORT'
        );
      }
      return r;
    },
    adapters: _n
  };
function sn(e) {
  if (
    (e.cancelToken && e.cancelToken.throwIfRequested(),
    e.signal && e.signal.aborted)
  )
    throw new ze(null, e);
}
function bo(e) {
  return (
    sn(e),
    (e.headers = te.from(e.headers)),
    (e.data = an.call(e, e.transformRequest)),
    ['post', 'put', 'patch'].indexOf(e.method) !== -1 &&
      e.headers.setContentType('application/x-www-form-urlencoded', !1),
    $a
      .getAdapter(e.adapter || ur.adapter)(e)
      .then(
        function(r) {
          return (
            sn(e),
            (r.data = an.call(e, e.transformResponse, r)),
            (r.headers = te.from(r.headers)),
            r
          );
        },
        function(r) {
          return (
            xa(r) ||
              (sn(e),
              r &&
                r.response &&
                ((r.response.data = an.call(
                  e,
                  e.transformResponse,
                  r.response
                )),
                (r.response.headers = te.from(r.response.headers)))),
            Promise.reject(r)
          );
        }
      )
  );
}
const Ea = '1.7.2',
  fr = {};
['object', 'boolean', 'number', 'function', 'string', 'symbol'].forEach(
  (e, t) => {
    fr[e] = function(r) {
      return typeof r === e || 'a' + (t < 1 ? 'n ' : ' ') + e;
    };
  }
);
const Co = {};
fr.transitional = function(t, n, r) {
  function o(i, a) {
    return (
      '[Axios v' +
      Ea +
      "] Transitional option '" +
      i +
      "'" +
      a +
      (r ? '. ' + r : '')
    );
  }
  return (i, a, s) => {
    if (t === !1)
      throw new A(
        o(a, ' has been removed' + (n ? ' in ' + n : '')),
        A.ERR_DEPRECATED
      );
    return (
      n &&
        !Co[a] &&
        ((Co[a] = !0),
        console.warn(
          o(
            a,
            ' has been deprecated since v' +
              n +
              ' and will be removed in the near future'
          )
        )),
      t ? t(i, a, s) : !0
    );
  };
};
function vp(e, t, n) {
  if (typeof e != 'object')
    throw new A('options must be an object', A.ERR_BAD_OPTION_VALUE);
  const r = Object.keys(e);
  let o = r.length;
  for (; o-- > 0; ) {
    const i = r[o],
      a = t[i];
    if (a) {
      const s = e[i],
        f = s === void 0 || a(s, i, e);
      if (f !== !0)
        throw new A('option ' + i + ' must be ' + f, A.ERR_BAD_OPTION_VALUE);
      continue;
    }
    if (n !== !0) throw new A('Unknown option ' + i, A.ERR_BAD_OPTION);
  }
}
const An = { assertOptions: vp, validators: fr },
  ce = An.validators;
class Et {
  constructor(t) {
    (this.defaults = t),
      (this.interceptors = { request: new fo(), response: new fo() });
  }
  async request(t, n) {
    try {
      return await this._request(t, n);
    } catch (r) {
      if (r instanceof Error) {
        let o;
        Error.captureStackTrace
          ? Error.captureStackTrace((o = {}))
          : (o = new Error());
        const i = o.stack ? o.stack.replace(/^.+\n/, '') : '';
        try {
          r.stack
            ? i &&
              !String(r.stack).endsWith(i.replace(/^.+\n.+\n/, '')) &&
              (r.stack +=
                `
` + i)
            : (r.stack = i);
        } catch {}
      }
      throw r;
    }
  }
  _request(t, n) {
    typeof t == 'string' ? ((n = n || {}), (n.url = t)) : (n = t || {}),
      (n = we(this.defaults, n));
    const { transitional: r, paramsSerializer: o, headers: i } = n;
    r !== void 0 &&
      An.assertOptions(
        r,
        {
          silentJSONParsing: ce.transitional(ce.boolean),
          forcedJSONParsing: ce.transitional(ce.boolean),
          clarifyTimeoutError: ce.transitional(ce.boolean)
        },
        !1
      ),
      o != null &&
        (h.isFunction(o)
          ? (n.paramsSerializer = { serialize: o })
          : An.assertOptions(
              o,
              { encode: ce.function, serialize: ce.function },
              !0
            )),
      (n.method = (n.method || this.defaults.method || 'get').toLowerCase());
    let a = i && h.merge(i.common, i[n.method]);
    i &&
      h.forEach(
        ['delete', 'get', 'head', 'post', 'put', 'patch', 'common'],
        p => {
          delete i[p];
        }
      ),
      (n.headers = te.concat(a, i));
    const s = [];
    let f = !0;
    this.interceptors.request.forEach(function(g) {
      (typeof g.runWhen == 'function' && g.runWhen(n) === !1) ||
        ((f = f && g.synchronous), s.unshift(g.fulfilled, g.rejected));
    });
    const c = [];
    this.interceptors.response.forEach(function(g) {
      c.push(g.fulfilled, g.rejected);
    });
    let l,
      u = 0,
      d;
    if (!f) {
      const p = [bo.bind(this), void 0];
      for (
        p.unshift.apply(p, s),
          p.push.apply(p, c),
          d = p.length,
          l = Promise.resolve(n);
        u < d;

      )
        l = l.then(p[u++], p[u++]);
      return l;
    }
    d = s.length;
    let m = n;
    for (u = 0; u < d; ) {
      const p = s[u++],
        g = s[u++];
      try {
        m = p(m);
      } catch (w) {
        g.call(this, w);
        break;
      }
    }
    try {
      l = bo.call(this, m);
    } catch (p) {
      return Promise.reject(p);
    }
    for (u = 0, d = c.length; u < d; ) l = l.then(c[u++], c[u++]);
    return l;
  }
  getUri(t) {
    t = we(this.defaults, t);
    const n = Oa(t.baseURL, t.url);
    return ba(n, t.params, t.paramsSerializer);
  }
}
h.forEach(['delete', 'get', 'head', 'options'], function(t) {
  Et.prototype[t] = function(n, r) {
    return this.request(
      we(r || {}, { method: t, url: n, data: (r || {}).data })
    );
  };
});
h.forEach(['post', 'put', 'patch'], function(t) {
  function n(r) {
    return function(i, a, s) {
      return this.request(
        we(s || {}, {
          method: t,
          headers: r ? { 'Content-Type': 'multipart/form-data' } : {},
          url: i,
          data: a
        })
      );
    };
  }
  (Et.prototype[t] = n()), (Et.prototype[t + 'Form'] = n(!0));
});
const bt = Et;
class dr {
  constructor(t) {
    if (typeof t != 'function')
      throw new TypeError('executor must be a function.');
    let n;
    this.promise = new Promise(function(i) {
      n = i;
    });
    const r = this;
    this.promise.then(o => {
      if (!r._listeners) return;
      let i = r._listeners.length;
      for (; i-- > 0; ) r._listeners[i](o);
      r._listeners = null;
    }),
      (this.promise.then = o => {
        let i;
        const a = new Promise(s => {
          r.subscribe(s), (i = s);
        }).then(o);
        return (
          (a.cancel = function() {
            r.unsubscribe(i);
          }),
          a
        );
      }),
      t(function(i, a, s) {
        r.reason || ((r.reason = new ze(i, a, s)), n(r.reason));
      });
  }
  throwIfRequested() {
    if (this.reason) throw this.reason;
  }
  subscribe(t) {
    if (this.reason) {
      t(this.reason);
      return;
    }
    this._listeners ? this._listeners.push(t) : (this._listeners = [t]);
  }
  unsubscribe(t) {
    if (!this._listeners) return;
    const n = this._listeners.indexOf(t);
    n !== -1 && this._listeners.splice(n, 1);
  }
  static source() {
    let t;
    return {
      token: new dr(function(o) {
        t = o;
      }),
      cancel: t
    };
  }
}
const bp = dr;
function Cp(e) {
  return function(n) {
    return e.apply(null, n);
  };
}
function Sp(e) {
  return h.isObject(e) && e.isAxiosError === !0;
}
const Rn = {
  Continue: 100,
  SwitchingProtocols: 101,
  Processing: 102,
  EarlyHints: 103,
  Ok: 200,
  Created: 201,
  Accepted: 202,
  NonAuthoritativeInformation: 203,
  NoContent: 204,
  ResetContent: 205,
  PartialContent: 206,
  MultiStatus: 207,
  AlreadyReported: 208,
  ImUsed: 226,
  MultipleChoices: 300,
  MovedPermanently: 301,
  Found: 302,
  SeeOther: 303,
  NotModified: 304,
  UseProxy: 305,
  Unused: 306,
  TemporaryRedirect: 307,
  PermanentRedirect: 308,
  BadRequest: 400,
  Unauthorized: 401,
  PaymentRequired: 402,
  Forbidden: 403,
  NotFound: 404,
  MethodNotAllowed: 405,
  NotAcceptable: 406,
  ProxyAuthenticationRequired: 407,
  RequestTimeout: 408,
  Conflict: 409,
  Gone: 410,
  LengthRequired: 411,
  PreconditionFailed: 412,
  PayloadTooLarge: 413,
  UriTooLong: 414,
  UnsupportedMediaType: 415,
  RangeNotSatisfiable: 416,
  ExpectationFailed: 417,
  ImATeapot: 418,
  MisdirectedRequest: 421,
  UnprocessableEntity: 422,
  Locked: 423,
  FailedDependency: 424,
  TooEarly: 425,
  UpgradeRequired: 426,
  PreconditionRequired: 428,
  TooManyRequests: 429,
  RequestHeaderFieldsTooLarge: 431,
  UnavailableForLegalReasons: 451,
  InternalServerError: 500,
  NotImplemented: 501,
  BadGateway: 502,
  ServiceUnavailable: 503,
  GatewayTimeout: 504,
  HttpVersionNotSupported: 505,
  VariantAlsoNegotiates: 506,
  InsufficientStorage: 507,
  LoopDetected: 508,
  NotExtended: 510,
  NetworkAuthenticationRequired: 511
};
Object.entries(Rn).forEach(([e, t]) => {
  Rn[t] = e;
});
const xp = Rn;
function _a(e) {
  const t = new bt(e),
    n = sa(bt.prototype.request, t);
  return (
    h.extend(n, bt.prototype, t, { allOwnKeys: !0 }),
    h.extend(n, t, null, { allOwnKeys: !0 }),
    (n.create = function(o) {
      return _a(we(e, o));
    }),
    n
  );
}
const N = _a(ur);
N.Axios = bt;
N.CanceledError = ze;
N.CancelToken = bp;
N.isCancel = xa;
N.VERSION = Ea;
N.toFormData = Vt;
N.AxiosError = A;
N.Cancel = N.CanceledError;
N.all = function(t) {
  return Promise.all(t);
};
N.spread = Cp;
N.isAxiosError = Sp;
N.mergeConfig = we;
N.AxiosHeaders = te;
N.formToJSON = e => Sa(h.isHTMLForm(e) ? new FormData(e) : e);
N.getAdapter = $a.getAdapter;
N.HttpStatusCode = xp;
N.default = N;
const wp = N,
  pe = wp.create({
    baseURL: window.wcv_avp.rest_url,
    headers: { 'Content-Type': 'application/json' }
  }),
  Op = window.wpApiSettings.nonce;
pe.interceptors.request.use(
  e => ((e.headers['X-WP-Nonce'] = Op), e),
  async e => await Promise.reject(e)
);
pe.interceptors.response.use(
  e => e,
  async e => (
    (e.response.status === 401 ||
      e.response.status === 403 ||
      e.response.status === 500) &&
      Pt.error({ message: e.response.data.message, description: e.message }),
    await Promise.reject(e)
  )
);
const Pp = async e => (await pe.get('/vendors', { params: e })).data,
  Tp = async e => (await pe.get(`/vendors/settings/${e}`)).data,
  $p = async e => (await pe.get(`/vendors/settings/${e}`)).data,
  Ep = async (e, t) =>
    (await pe.post(`/vendors/settings/${e}`, { changes: t })).data,
  _p = async (e, t) => (await pe.post(`/vendors/action/${e}/${t}`)).data,
  Ap = async (e, t) => (await pe.post(`/vendors/action/${e}/${t}`)).data,
  Rp = {
    getVendors: Pp,
    getVendor: Tp,
    getVendorSettings: $p,
    saveSettings: Ep,
    setVendorStatus: _p,
    setVendorApproval: Ap
  },
  Ip = window.wcv_avp.html_settings,
  kp = {
    plugins:
      'charmap colorpicker compat3x directionality fullscreen hr image lists media paste tabfocus textcolor wordpress wpautoresize wpdialogs wpeditimage wpemoji wpgallery wplink wptextpattern wpview',
    toolbar1:
      'formatselect bold italic | bullist numlist | blockquote | alignleft aligncenter alignright | link unlink | wp_more | spellchecker',
    wp_theme: !0
  },
  cm = (e, t = {}) => {
    In(() => {
      window.wp.editor.initialize(e, {
        tinymce: { ...kp, ...t },
        mediaButtons: Ip.use_media,
        quicktags: !0
      });
    }),
      wo(() => {
        window.wp.editor.remove(e);
      });
  },
  me = e => window.wcv_avp.i18n[e],
  Aa = Po('spinerStore', () => ({ showSpinner: B(!1) })),
  jp = Po('vendorEditStore', () => {
    const e = Aa(),
      t = B({}),
      n = Rp,
      r = B(!1),
      o = B([
        {
          title: me('openHDay'),
          dataIndex: 'day',
          key: 'day',
          width: '25%',
          align: 'center'
        },
        {
          title: me('openHFrom'),
          dataIndex: 'open',
          key: 'open',
          width: '20%',
          align: 'center'
        },
        {
          title: me('openHTo'),
          dataIndex: 'close',
          key: 'close',
          width: '20%',
          align: 'center'
        },
        {
          title: me('openHEnable'),
          dataIndex: 'status',
          key: 'status',
          width: '15%',
          align: 'center'
        },
        {
          title: me('actions'),
          dataIndex: 'actions',
          key: 'actions',
          width: '20%',
          align: 'center'
        }
      ]),
      i = B(''),
      a = B(''),
      s = B('');
    return {
      vendorSettings: t,
      openingHoursColumns: o,
      showPopup: r,
      modalTitle: i,
      modalContent: a,
      featureSlug: s,
      saveSettings: async l => {
        e.showSpinner = !0;
        const u = await n.saveSettings(l, t.value);
        u.success
          ? Pt.success({ message: me('success'), description: u.message })
          : Pt.error({ message: me('error'), description: u.message });
        const d = await n.getVendorSettings(l);
        return (t.value = d), (e.showSpinner = !1), u;
      },
      fetchVendorSettings: async l => {
        e.showSpinner = !0;
        const u = await n.getVendorSettings(l);
        (t.value = u), (e.showSpinner = !1);
      }
    };
  }),
  Np = Ba({
    history: za(),
    routes: [
      {
        name: 'vendor',
        path: '/',
        component: async () =>
          await Ct(
            () => import('./components/VendorTable.65288152.js'),
            [
              window.wcv_avp.pluginDirUrl +
                '/dist/components/VendorTable.65288152.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/vendor.e5025a5c.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/VendorStore.76a5f248.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/antd.e3fbf92b.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/initDefaultProps.d90010a5.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.078f4788.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.f3d5a503.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.a5a3d068.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/responsiveObserve.feb6262f.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.ff501c81.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/assets/VendorTable-1b7c54ee.css'
            ],
            import.meta.url
          )
      },
      {
        name: 'vendor-edit',
        path: '/vendor-edit/:id',
        component: async () =>
          await Ct(
            () => import('./common/VendorEdit.a89160bf.js').then(e => e.V),
            [
              window.wcv_avp.pluginDirUrl +
                '/dist/common/VendorEdit.a89160bf.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/vendor.e5025a5c.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/VendorStore.76a5f248.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/antd.e3fbf92b.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/initDefaultProps.d90010a5.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.26871545.js'
            ],
            import.meta.url
          ),
        props: e => ({ id: Number(e.params.id) }),
        beforeEnter: async (e, t, n) => {
          const r = jp(),
            o = Aa();
          (o.showSpinner = !0),
            await r.fetchVendorSettings(Number(e.params.id)),
            r.vendorSettings.error ? n(t.path) : n(),
            (o.showSpinner = !1);
        }
      }
    ],
    linkActiveClass: 'active',
    linkExactActiveClass: 'active'
  }),
  pr = Ua(as);
pr.use(qa());
pr.use(Np);
pr.mount('#avp');
export {
  Le as $,
  se as A,
  rm as B,
  Li as C,
  sm as D,
  cn as E,
  Ae as F,
  em as G,
  Dn as H,
  Ht as I,
  Ft as J,
  Ce as K,
  Dt as L,
  Bt as M,
  lm as N,
  Ke as O,
  Bc as P,
  H as Q,
  _o as R,
  Up as S,
  ko as T,
  Yp as U,
  jp as V,
  qo as W,
  zc as X,
  $o as Y,
  qp as Z,
  y as _,
  D as a,
  xt as a0,
  zo as a1,
  Wc as a2,
  Wp as a3,
  Bp as a4,
  Vp as a5,
  zp as a6,
  $s as a7,
  Jp as a8,
  Xp as a9,
  Gp as aa,
  Ts as ab,
  Qp as ac,
  Kn as ad,
  Nt as ae,
  Ro as af,
  ws as ag,
  ac as ah,
  rc as ai,
  Rp as aj,
  Pt as ak,
  Aa as al,
  Dp as am,
  cm as an,
  uc as ao,
  tm as ap,
  im as aq,
  mi as ar,
  Zs as as,
  Os as at,
  js as au,
  qe as av,
  me as b,
  is as c,
  Ct as d,
  G as e,
  $e as f,
  zn as g,
  Zp as h,
  nm as i,
  om as j,
  Es as k,
  Yt as l,
  jt as m,
  Kp as n,
  K as o,
  jn as p,
  br as q,
  ai as r,
  Cr as s,
  Hp as t,
  Mt as u,
  am as v,
  Nn as w,
  Gs as x,
  Uc as y,
  Qs as z
};

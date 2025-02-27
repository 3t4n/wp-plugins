import {
  _ as C,
  z as Wn,
  P as z,
  a as Z,
  e as te,
  ao as Zt,
  n as Re,
  f as kt,
  $ as Kn,
  W as me,
  ap as Dt,
  A as it,
  J as en,
  ad as Un,
  C as Gn,
  K as Ce,
  i as ot,
  r as rt,
  m as we,
  ai as tn,
  g as Yn,
  k as Ft,
  s as _e,
  l as Xn,
  h as Qn,
  u as Ve,
  af as nn,
  D as qn,
  aq as Jn,
  ar as Zn
} from '../main.4e11cfe3.js';
import {
  d as se,
  e as L,
  r as he,
  c as b,
  f as Ue,
  R as on,
  s as J,
  z as ve,
  g as ae,
  Z as lt,
  F as Te,
  k as De,
  p as st,
  j as Ie,
  V as kn,
  y as ln,
  U as eo,
  m as je,
  A as to,
  W as ut,
  n as Oe,
  v as no,
  a0 as ye,
  Q as oo
} from './vendor.e5025a5c.js';
import {
  aj as lo,
  ak as an,
  r as $e,
  z as ct,
  al as ao,
  K as Y,
  x as io,
  R as ro,
  am as Se,
  w as ge,
  t as be,
  y as _t,
  n as Nt,
  W as so,
  an as uo,
  j as co,
  k as fo,
  m as po,
  ao as vo,
  ap as mo,
  aq as go,
  ar as ho,
  s as Vt,
  a4 as bo,
  ac as rn,
  ad as We,
  ae as sn,
  v as yo,
  af as un,
  ag as Le,
  as as So,
  at as dt,
  au as ze,
  av as wo,
  aw as At,
  ax as Co,
  ay as Bt,
  az as ft,
  aA as cn,
  ah as Ht,
  ai as Lt,
  J as xo,
  H as Io,
  T as Oo
} from './VendorStore.76a5f248.js';
import { i as pt } from './initDefaultProps.d90010a5.js';
import { D as $o, u as To, v as Po } from './antd.e3fbf92b.js';
function zt(e, o) {
  const { key: n } = e;
  let t;
  return (
    'value' in e && ({ value: t } = e),
    n ?? (t !== void 0 ? t : `rc-index-key-${o}`)
  );
}
function dn(e, o) {
  const { label: n, value: t, options: l } = e || {};
  return {
    label: n || (o ? 'children' : 'label'),
    value: t || 'value',
    options: l || 'options'
  };
}
function Mo(e) {
  let { fieldNames: o, childrenAsData: n } =
    arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
  const t = [],
    { label: l, value: a, options: i } = dn(o, !1);
  function r(d, s) {
    d.forEach(f => {
      const p = f[l];
      if (s || !(i in f)) {
        const c = f[a];
        t.push({
          key: zt(f, t.length),
          groupOption: s,
          data: f,
          label: p,
          value: c
        });
      } else {
        let c = p;
        c === void 0 && n && (c = f.label),
          t.push({ key: zt(f, t.length), group: !0, data: f, label: c }),
          r(f[i], !0);
      }
    });
  }
  return r(e, !1), t;
}
function at(e) {
  const o = C({}, e);
  return (
    'props' in o ||
      Object.defineProperty(o, 'props', {
        get() {
          return (
            Wn(
              !1,
              'Return type is option instead of Option instance. Please read value directly instead of reading from `props`.'
            ),
            o
          );
        }
      }),
    o
  );
}
function Eo(e, o) {
  if (!o || !o.length) return null;
  let n = !1;
  function t(a, i) {
    let [r, ...d] = i;
    if (!r) return [a];
    const s = a.split(r);
    return (
      (n = n || s.length > 1),
      s.reduce((f, p) => [...f, ...t(p, d)], []).filter(f => f)
    );
  }
  const l = t(e, o);
  return n ? l : null;
}
var Ro =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
const Do = e => {
    const o = e === !0 ? 0 : 1;
    return {
      bottomLeft: {
        points: ['tl', 'bl'],
        offset: [0, 4],
        overflow: { adjustX: o, adjustY: 1 }
      },
      bottomRight: {
        points: ['tr', 'br'],
        offset: [0, 4],
        overflow: { adjustX: o, adjustY: 1 }
      },
      topLeft: {
        points: ['bl', 'tl'],
        offset: [0, -4],
        overflow: { adjustX: o, adjustY: 1 }
      },
      topRight: {
        points: ['br', 'tr'],
        offset: [0, -4],
        overflow: { adjustX: o, adjustY: 1 }
      }
    };
  },
  Fo = se({
    name: 'SelectTrigger',
    inheritAttrs: !1,
    props: {
      dropdownAlign: Object,
      visible: { type: Boolean, default: void 0 },
      disabled: { type: Boolean, default: void 0 },
      dropdownClassName: String,
      dropdownStyle: z.object,
      placement: String,
      empty: { type: Boolean, default: void 0 },
      prefixCls: String,
      popupClassName: String,
      animation: String,
      transitionName: String,
      getPopupContainer: Function,
      dropdownRender: Function,
      containerWidth: Number,
      dropdownMatchSelectWidth: z.oneOfType([Number, Boolean]).def(!0),
      popupElement: z.any,
      direction: String,
      getTriggerDOMNode: Function,
      onPopupVisibleChange: Function,
      onPopupMouseEnter: Function
    },
    setup(e, o) {
      let { slots: n, attrs: t, expose: l } = o;
      const a = L(() => {
          const { dropdownMatchSelectWidth: r } = e;
          return Do(r);
        }),
        i = he();
      return (
        l({ getPopupElement: () => i.value }),
        () => {
          const r = C(C({}, e), t),
            { empty: d = !1 } = r,
            s = Ro(r, ['empty']),
            {
              visible: f,
              dropdownAlign: p,
              prefixCls: c,
              popupElement: y,
              dropdownClassName: h,
              dropdownStyle: E,
              direction: m = 'ltr',
              placement: O,
              dropdownMatchSelectWidth: P,
              containerWidth: I,
              dropdownRender: M,
              animation: u,
              transitionName: x,
              getPopupContainer: v,
              getTriggerDOMNode: S,
              onPopupVisibleChange: $,
              onPopupMouseEnter: A
            } = s,
            W = `${c}-dropdown`;
          let G = y;
          M && (G = M({ menuNode: y, props: e }));
          const N = u ? `${W}-${u}` : x,
            V = C({ minWidth: `${I}px` }, E);
          return (
            typeof P == 'number'
              ? (V.width = `${P}px`)
              : P && (V.width = `${I}px`),
            b(
              lo,
              Z(
                Z({}, e),
                {},
                {
                  showAction: $ ? ['click'] : [],
                  hideAction: $ ? ['click'] : [],
                  popupPlacement:
                    O || (m === 'rtl' ? 'bottomRight' : 'bottomLeft'),
                  builtinPlacements: a.value,
                  prefixCls: W,
                  popupTransitionName: N,
                  popupAlign: p,
                  popupVisible: f,
                  getPopupContainer: v,
                  popupClassName: te(h, { [`${W}-empty`]: d }),
                  popupStyle: V,
                  getTriggerDOMNode: S,
                  onPopupVisibleChange: $
                }
              ),
              {
                default: n.default,
                popup: () => b('div', { ref: i, onMouseenter: A }, [G])
              }
            )
          );
        }
      );
    }
  }),
  _o = Fo,
  Ge = (e, o) => {
    let { slots: n } = o;
    var t;
    const {
      class: l,
      customizeIcon: a,
      customizeIconProps: i,
      onMousedown: r,
      onClick: d
    } = e;
    let s;
    return (
      typeof a == 'function' ? (s = a(i)) : (s = a),
      b(
        'span',
        {
          class: l,
          onMousedown: f => {
            f.preventDefault(), r && r(f);
          },
          style: { userSelect: 'none', WebkitUserSelect: 'none' },
          unselectable: 'on',
          onClick: d,
          'aria-hidden': !0
        },
        [
          s !== void 0
            ? s
            : b('span', { class: l.split(/\s+/).map(f => `${f}-icon`) }, [
                (t = n.default) === null || t === void 0 ? void 0 : t.call(n)
              ])
        ]
      )
    );
  };
Ge.inheritAttrs = !1;
Ge.displayName = 'TransBtn';
Ge.props = {
  class: String,
  customizeIcon: z.any,
  customizeIconProps: z.any,
  onMousedown: Function,
  onClick: Function
};
const Ke = Ge,
  No = {
    inputRef: z.any,
    prefixCls: String,
    id: String,
    inputElement: z.VueNode,
    disabled: { type: Boolean, default: void 0 },
    autofocus: { type: Boolean, default: void 0 },
    autocomplete: String,
    editable: { type: Boolean, default: void 0 },
    activeDescendantId: String,
    value: String,
    open: { type: Boolean, default: void 0 },
    tabindex: z.oneOfType([z.number, z.string]),
    attrs: z.object,
    onKeydown: { type: Function },
    onMousedown: { type: Function },
    onChange: { type: Function },
    onPaste: { type: Function },
    onCompositionstart: { type: Function },
    onCompositionend: { type: Function },
    onFocus: { type: Function },
    onBlur: { type: Function }
  },
  Vo = se({
    compatConfig: { MODE: 3 },
    name: 'SelectInput',
    inheritAttrs: !1,
    props: No,
    setup(e) {
      let o = null;
      const n = Ue('VCSelectContainerEvent');
      return () => {
        var t;
        const {
          prefixCls: l,
          id: a,
          inputElement: i,
          disabled: r,
          tabindex: d,
          autofocus: s,
          autocomplete: f,
          editable: p,
          activeDescendantId: c,
          value: y,
          onKeydown: h,
          onMousedown: E,
          onChange: m,
          onPaste: O,
          onCompositionstart: P,
          onCompositionend: I,
          onFocus: M,
          onBlur: u,
          open: x,
          inputRef: v,
          attrs: S
        } = e;
        let $ = i || on(b('input', null, null), [[an]]);
        const A = $.props || {},
          {
            onKeydown: W,
            onInput: G,
            onFocus: N,
            onBlur: V,
            onMousedown: U,
            onCompositionstart: K,
            onCompositionend: k,
            style: T
          } = A;
        return (
          ($ = $e(
            $,
            C(
              C(
                C(
                  C(C({ type: 'search' }, A), {
                    id: a,
                    ref: v,
                    disabled: r,
                    tabindex: d,
                    autocomplete: f || 'off',
                    autofocus: s,
                    class: te(
                      `${l}-selection-search-input`,
                      (t = $ == null ? void 0 : $.props) === null ||
                        t === void 0
                        ? void 0
                        : t.class
                    ),
                    role: 'combobox',
                    'aria-expanded': x,
                    'aria-haspopup': 'listbox',
                    'aria-owns': `${a}_list`,
                    'aria-autocomplete': 'list',
                    'aria-controls': `${a}_list`,
                    'aria-activedescendant': c
                  }),
                  S
                ),
                {
                  value: p ? y : '',
                  readonly: !p,
                  unselectable: p ? null : 'on',
                  style: C(C({}, T), { opacity: p ? null : 0 }),
                  onKeydown: R => {
                    h(R), W && W(R);
                  },
                  onMousedown: R => {
                    E(R), U && U(R);
                  },
                  onInput: R => {
                    m(R), G && G(R);
                  },
                  onCompositionstart(R) {
                    P(R), K && K(R);
                  },
                  onCompositionend(R) {
                    I(R), k && k(R);
                  },
                  onPaste: O,
                  onFocus: function() {
                    clearTimeout(o),
                      N && N(arguments.length <= 0 ? void 0 : arguments[0]),
                      M && M(arguments.length <= 0 ? void 0 : arguments[0]),
                      n == null ||
                        n.focus(arguments.length <= 0 ? void 0 : arguments[0]);
                  },
                  onBlur: function() {
                    for (
                      var R = arguments.length, Q = new Array(R), X = 0;
                      X < R;
                      X++
                    )
                      Q[X] = arguments[X];
                    o = setTimeout(() => {
                      V && V(Q[0]), u && u(Q[0]), n == null || n.blur(Q[0]);
                    }, 100);
                  }
                }
              ),
              $.type === 'textarea' ? {} : { type: 'search' }
            ),
            !0,
            !0
          )),
          $
        );
      };
    }
  }),
  fn = Vo,
  Ao = Symbol('TreeSelectLegacyContextPropsKey');
function vt() {
  return Ue(Ao, {});
}
const Bo = {
    id: String,
    prefixCls: String,
    values: z.array,
    open: { type: Boolean, default: void 0 },
    searchValue: String,
    inputRef: z.any,
    placeholder: z.any,
    disabled: { type: Boolean, default: void 0 },
    mode: String,
    showSearch: { type: Boolean, default: void 0 },
    autofocus: { type: Boolean, default: void 0 },
    autocomplete: String,
    activeDescendantId: String,
    tabindex: z.oneOfType([z.number, z.string]),
    removeIcon: z.any,
    choiceTransitionName: String,
    maxTagCount: z.oneOfType([z.number, z.string]),
    maxTagTextLength: Number,
    maxTagPlaceholder: z.any.def(() => e => `+ ${e.length} ...`),
    tagRender: Function,
    onToggleOpen: { type: Function },
    onRemove: Function,
    onInputChange: Function,
    onInputPaste: Function,
    onInputKeyDown: Function,
    onInputMouseDown: Function,
    onInputCompositionStart: Function,
    onInputCompositionEnd: Function
  },
  jt = e => {
    e.preventDefault(), e.stopPropagation();
  },
  Ho = se({
    name: 'MultipleSelectSelector',
    inheritAttrs: !1,
    props: Bo,
    setup(e) {
      const o = J(),
        n = J(0),
        t = J(!1),
        l = vt(),
        a = L(() => `${e.prefixCls}-selection`),
        i = L(() => (e.open || e.mode === 'tags' ? e.searchValue : '')),
        r = L(() => e.mode === 'tags' || (e.showSearch && (e.open || t.value)));
      ve(() => {
        ae(
          i,
          () => {
            n.value = o.value.scrollWidth;
          },
          { flush: 'post', immediate: !0 }
        );
      });
      function d(c, y, h, E, m) {
        return b(
          'span',
          {
            class: te(`${a.value}-item`, { [`${a.value}-item-disabled`]: h }),
            title:
              typeof c == 'string' || typeof c == 'number'
                ? c.toString()
                : void 0
          },
          [
            b('span', { class: `${a.value}-item-content` }, [y]),
            E &&
              b(
                Ke,
                {
                  class: `${a.value}-item-remove`,
                  onMousedown: jt,
                  onClick: m,
                  customizeIcon: e.removeIcon
                },
                { default: () => [lt('×')] }
              )
          ]
        );
      }
      function s(c, y, h, E, m, O) {
        var P;
        const I = u => {
          jt(u), e.onToggleOpen(!open);
        };
        let M = O;
        return (
          l.keyEntities &&
            (M =
              ((P = l.keyEntities[c]) === null || P === void 0
                ? void 0
                : P.node) || {}),
          b('span', { key: c, onMousedown: I }, [
            e.tagRender({
              label: y,
              value: c,
              disabled: h,
              closable: E,
              onClose: m,
              option: M
            })
          ])
        );
      }
      function f(c) {
        const { disabled: y, label: h, value: E, option: m } = c,
          O = !e.disabled && !y;
        let P = h;
        if (
          typeof e.maxTagTextLength == 'number' &&
          (typeof h == 'string' || typeof h == 'number')
        ) {
          const M = String(P);
          M.length > e.maxTagTextLength &&
            (P = `${M.slice(0, e.maxTagTextLength)}...`);
        }
        const I = M => {
          var u;
          M && M.stopPropagation(),
            (u = e.onRemove) === null || u === void 0 || u.call(e, c);
        };
        return typeof e.tagRender == 'function'
          ? s(E, P, y, O, I, m)
          : d(h, P, y, O, I);
      }
      function p(c) {
        const { maxTagPlaceholder: y = E => `+ ${E.length} ...` } = e,
          h = typeof y == 'function' ? y(c) : y;
        return d(h, h, !1);
      }
      return () => {
        const {
            id: c,
            prefixCls: y,
            values: h,
            open: E,
            inputRef: m,
            placeholder: O,
            disabled: P,
            autofocus: I,
            autocomplete: M,
            activeDescendantId: u,
            tabindex: x,
            onInputChange: v,
            onInputPaste: S,
            onInputKeyDown: $,
            onInputMouseDown: A,
            onInputCompositionStart: W,
            onInputCompositionEnd: G
          } = e,
          N = b(
            'div',
            {
              class: `${a.value}-search`,
              style: { width: n.value + 'px' },
              key: 'input'
            },
            [
              b(
                fn,
                {
                  inputRef: m,
                  open: E,
                  prefixCls: y,
                  id: c,
                  inputElement: null,
                  disabled: P,
                  autofocus: I,
                  autocomplete: M,
                  editable: r.value,
                  activeDescendantId: u,
                  value: i.value,
                  onKeydown: $,
                  onMousedown: A,
                  onChange: v,
                  onPaste: S,
                  onCompositionstart: W,
                  onCompositionend: G,
                  tabindex: x,
                  attrs: ct(e, !0),
                  onFocus: () => (t.value = !0),
                  onBlur: () => (t.value = !1)
                },
                null
              ),
              b(
                'span',
                {
                  ref: o,
                  class: `${a.value}-search-mirror`,
                  'aria-hidden': !0
                },
                [i.value, lt(' ')]
              )
            ]
          ),
          V = b(
            ao,
            {
              prefixCls: `${a.value}-overflow`,
              data: h,
              renderItem: f,
              renderRest: p,
              suffix: N,
              itemKey: 'key',
              maxCount: e.maxTagCount,
              key: 'overflow'
            },
            null
          );
        return b(Te, null, [
          V,
          !h.length &&
            !i.value &&
            b('span', { class: `${a.value}-placeholder` }, [O])
        ]);
      };
    }
  }),
  Lo = Ho,
  zo = {
    inputElement: z.any,
    id: String,
    prefixCls: String,
    values: z.array,
    open: { type: Boolean, default: void 0 },
    searchValue: String,
    inputRef: z.any,
    placeholder: z.any,
    disabled: { type: Boolean, default: void 0 },
    mode: String,
    showSearch: { type: Boolean, default: void 0 },
    autofocus: { type: Boolean, default: void 0 },
    autocomplete: String,
    activeDescendantId: String,
    tabindex: z.oneOfType([z.number, z.string]),
    activeValue: String,
    backfill: { type: Boolean, default: void 0 },
    optionLabelRender: Function,
    onInputChange: Function,
    onInputPaste: Function,
    onInputKeyDown: Function,
    onInputMouseDown: Function,
    onInputCompositionStart: Function,
    onInputCompositionEnd: Function
  },
  mt = se({
    name: 'SingleSelector',
    setup(e) {
      const o = J(!1),
        n = L(() => e.mode === 'combobox'),
        t = L(() => n.value || e.showSearch),
        l = L(() => {
          let s = e.searchValue || '';
          return n.value && e.activeValue && !o.value && (s = e.activeValue), s;
        }),
        a = vt();
      ae(
        [n, () => e.activeValue],
        () => {
          n.value && (o.value = !1);
        },
        { immediate: !0 }
      );
      const i = L(() =>
          e.mode !== 'combobox' && !e.open && !e.showSearch ? !1 : !!l.value
        ),
        r = L(() => {
          const s = e.values[0];
          return s && (typeof s.label == 'string' || typeof s.label == 'number')
            ? s.label.toString()
            : void 0;
        }),
        d = () => {
          if (e.values[0]) return null;
          const s = i.value ? { visibility: 'hidden' } : void 0;
          return b(
            'span',
            { class: `${e.prefixCls}-selection-placeholder`, style: s },
            [e.placeholder]
          );
        };
      return () => {
        var s, f, p, c;
        const {
            inputElement: y,
            prefixCls: h,
            id: E,
            values: m,
            inputRef: O,
            disabled: P,
            autofocus: I,
            autocomplete: M,
            activeDescendantId: u,
            open: x,
            tabindex: v,
            optionLabelRender: S,
            onInputKeyDown: $,
            onInputMouseDown: A,
            onInputChange: W,
            onInputPaste: G,
            onInputCompositionStart: N,
            onInputCompositionEnd: V
          } = e,
          U = m[0];
        let K = null;
        if (U && a.customSlots) {
          const k = (s = U.key) !== null && s !== void 0 ? s : U.value,
            T =
              ((f = a.keyEntities[k]) === null || f === void 0
                ? void 0
                : f.node) || {};
          (K =
            a.customSlots[
              (p = T.slots) === null || p === void 0 ? void 0 : p.title
            ] ||
            a.customSlots.title ||
            U.label),
            typeof K == 'function' && (K = K(T));
        } else K = S && U ? S(U.option) : U == null ? void 0 : U.label;
        return b(Te, null, [
          b('span', { class: `${h}-selection-search` }, [
            b(
              fn,
              {
                inputRef: O,
                prefixCls: h,
                id: E,
                open: x,
                inputElement: y,
                disabled: P,
                autofocus: I,
                autocomplete: M,
                editable: t.value,
                activeDescendantId: u,
                value: l.value,
                onKeydown: $,
                onMousedown: A,
                onChange: k => {
                  (o.value = !0), W(k);
                },
                onPaste: G,
                onCompositionstart: N,
                onCompositionend: V,
                tabindex: v,
                attrs: ct(e, !0)
              },
              null
            )
          ]),
          !n.value &&
            U &&
            !i.value &&
            b('span', { class: `${h}-selection-item`, title: r.value }, [
              b(
                Te,
                { key: (c = U.key) !== null && c !== void 0 ? c : U.value },
                [K]
              )
            ]),
          d()
        ]);
      };
    }
  });
mt.props = zo;
mt.inheritAttrs = !1;
const jo = mt;
function Wo(e) {
  return ![
    Y.ESC,
    Y.SHIFT,
    Y.BACKSPACE,
    Y.TAB,
    Y.WIN_KEY,
    Y.ALT,
    Y.META,
    Y.WIN_KEY_RIGHT,
    Y.CTRL,
    Y.SEMICOLON,
    Y.EQUALS,
    Y.CAPS_LOCK,
    Y.CONTEXT_MENU,
    Y.F1,
    Y.F2,
    Y.F3,
    Y.F4,
    Y.F5,
    Y.F6,
    Y.F7,
    Y.F8,
    Y.F9,
    Y.F10,
    Y.F11,
    Y.F12
  ].includes(e);
}
function pn() {
  let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : 250,
    o = null,
    n;
  De(() => {
    clearTimeout(n);
  });
  function t(l) {
    (l || o === null) && (o = l),
      clearTimeout(n),
      (n = setTimeout(() => {
        o = null;
      }, e));
  }
  return [() => o, t];
}
function Ne() {
  const e = o => {
    e.current = o;
  };
  return e;
}
const Ko = se({
    name: 'Selector',
    inheritAttrs: !1,
    props: {
      id: String,
      prefixCls: String,
      showSearch: { type: Boolean, default: void 0 },
      open: { type: Boolean, default: void 0 },
      values: z.array,
      multiple: { type: Boolean, default: void 0 },
      mode: String,
      searchValue: String,
      activeValue: String,
      inputElement: z.any,
      autofocus: { type: Boolean, default: void 0 },
      activeDescendantId: String,
      tabindex: z.oneOfType([z.number, z.string]),
      disabled: { type: Boolean, default: void 0 },
      placeholder: z.any,
      removeIcon: z.any,
      maxTagCount: z.oneOfType([z.number, z.string]),
      maxTagTextLength: Number,
      maxTagPlaceholder: z.any,
      tagRender: Function,
      optionLabelRender: Function,
      tokenWithEnter: { type: Boolean, default: void 0 },
      choiceTransitionName: String,
      onToggleOpen: { type: Function },
      onSearch: Function,
      onSearchSubmit: Function,
      onRemove: Function,
      onInputKeyDown: { type: Function },
      domRef: Function
    },
    setup(e, o) {
      let { expose: n } = o;
      const t = Ne();
      let l = !1;
      const [a, i] = pn(0),
        r = O => {
          const { which: P } = O;
          (P === Y.UP || P === Y.DOWN) && O.preventDefault(),
            e.onInputKeyDown && e.onInputKeyDown(O),
            P === Y.ENTER &&
              e.mode === 'tags' &&
              !l &&
              !e.open &&
              e.onSearchSubmit(O.target.value),
            Wo(P) && e.onToggleOpen(!0);
        },
        d = () => {
          i(!0);
        };
      let s = null;
      const f = O => {
          e.onSearch(O, !0, l) !== !1 && e.onToggleOpen(!0);
        },
        p = () => {
          l = !0;
        },
        c = O => {
          (l = !1), e.mode !== 'combobox' && f(O.target.value);
        },
        y = O => {
          let {
            target: { value: P }
          } = O;
          if (e.tokenWithEnter && s && /[\r\n]/.test(s)) {
            const I = s
              .replace(/[\r\n]+$/, '')
              .replace(/\r\n/g, ' ')
              .replace(/[\r\n]/g, ' ');
            P = P.replace(I, s);
          }
          (s = null), f(P);
        },
        h = O => {
          const { clipboardData: P } = O;
          s = P.getData('text');
        },
        E = O => {
          let { target: P } = O;
          P !== t.current &&
            (document.body.style.msTouchAction !== void 0
              ? setTimeout(() => {
                  t.current.focus();
                })
              : t.current.focus());
        },
        m = O => {
          const P = a();
          O.target !== t.current && !P && O.preventDefault(),
            ((e.mode !== 'combobox' && (!e.showSearch || !P)) || !e.open) &&
              (e.open && e.onSearch('', !0, !1), e.onToggleOpen());
        };
      return (
        n({
          focus: () => {
            t.current.focus();
          },
          blur: () => {
            t.current.blur();
          }
        }),
        () => {
          const { prefixCls: O, domRef: P, mode: I } = e,
            M = {
              inputRef: t,
              onInputKeyDown: r,
              onInputMouseDown: d,
              onInputChange: y,
              onInputPaste: h,
              onInputCompositionStart: p,
              onInputCompositionEnd: c
            },
            u =
              I === 'multiple' || I === 'tags'
                ? b(Lo, Z(Z({}, e), M), null)
                : b(jo, Z(Z({}, e), M), null);
          return b(
            'div',
            { ref: P, class: `${O}-selector`, onClick: E, onMousedown: m },
            [u]
          );
        }
      );
    }
  }),
  Uo = Ko;
function Go(e, o, n) {
  function t(l) {
    var a, i, r;
    let d = l.target;
    d.shadowRoot && l.composed && (d = l.composedPath()[0] || d);
    const s = [
      (a = e[0]) === null || a === void 0 ? void 0 : a.value,
      (r = (i = e[1]) === null || i === void 0 ? void 0 : i.value) === null ||
      r === void 0
        ? void 0
        : r.getPopupElement()
    ];
    o.value && s.every(f => f && !f.contains(d) && f !== d) && n(!1);
  }
  ve(() => {
    window.addEventListener('mousedown', t);
  }),
    De(() => {
      window.removeEventListener('mousedown', t);
    });
}
function Yo() {
  let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : 10;
  const o = J(!1);
  let n;
  const t = () => {
    clearTimeout(n);
  };
  return (
    ve(() => {
      t();
    }),
    [
      o,
      (a, i) => {
        t(),
          (n = setTimeout(() => {
            (o.value = a), i && i();
          }, e));
      },
      t
    ]
  );
}
const vn = Symbol('BaseSelectContextKey');
function Xo(e) {
  return st(vn, e);
}
function Qo() {
  return Ue(vn, {});
}
var qo =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
const Jo = [
    'value',
    'onChange',
    'removeIcon',
    'placeholder',
    'autofocus',
    'maxTagCount',
    'maxTagTextLength',
    'maxTagPlaceholder',
    'choiceTransitionName',
    'onInputKeyDown',
    'onPopupScroll',
    'tabindex',
    'OptionList',
    'notFoundContent'
  ],
  Zo = () => ({
    prefixCls: String,
    id: String,
    omitDomProps: Array,
    displayValues: Array,
    onDisplayValuesChange: Function,
    activeValue: String,
    activeDescendantId: String,
    onActiveValueChange: Function,
    searchValue: String,
    onSearch: Function,
    onSearchSplit: Function,
    maxLength: Number,
    OptionList: z.any,
    emptyOptions: Boolean
  }),
  mn = () => ({
    showSearch: { type: Boolean, default: void 0 },
    tagRender: { type: Function },
    optionLabelRender: { type: Function },
    direction: { type: String },
    tabindex: Number,
    autofocus: Boolean,
    notFoundContent: z.any,
    placeholder: z.any,
    onClear: Function,
    choiceTransitionName: String,
    mode: String,
    disabled: { type: Boolean, default: void 0 },
    loading: { type: Boolean, default: void 0 },
    open: { type: Boolean, default: void 0 },
    defaultOpen: { type: Boolean, default: void 0 },
    onDropdownVisibleChange: { type: Function },
    getInputElement: { type: Function },
    getRawInputElement: { type: Function },
    maxTagTextLength: Number,
    maxTagCount: { type: [String, Number] },
    maxTagPlaceholder: z.any,
    tokenSeparators: { type: Array },
    allowClear: { type: Boolean, default: void 0 },
    showArrow: { type: Boolean, default: void 0 },
    inputIcon: z.any,
    clearIcon: z.any,
    removeIcon: z.any,
    animation: String,
    transitionName: String,
    dropdownStyle: { type: Object },
    dropdownClassName: String,
    dropdownMatchSelectWidth: { type: [Boolean, Number], default: void 0 },
    dropdownRender: { type: Function },
    dropdownAlign: Object,
    placement: { type: String },
    getPopupContainer: { type: Function },
    showAction: { type: Array },
    onBlur: { type: Function },
    onFocus: { type: Function },
    onKeyup: Function,
    onKeydown: Function,
    onMousedown: Function,
    onPopupScroll: Function,
    onInputKeyDown: Function,
    onMouseenter: Function,
    onMouseleave: Function,
    onClick: Function
  }),
  ko = () => C(C({}, Zo()), mn());
function gt(e) {
  return e === 'tags' || e === 'multiple';
}
const el = se({
    compatConfig: { MODE: 3 },
    name: 'BaseSelect',
    inheritAttrs: !1,
    props: pt(ko(), { showAction: [], notFoundContent: 'Not Found' }),
    setup(e, o) {
      let { attrs: n, expose: t, slots: l } = o;
      const a = L(() => gt(e.mode)),
        i = L(() =>
          e.showSearch !== void 0
            ? e.showSearch
            : a.value || e.mode === 'combobox'
        ),
        r = J(!1);
      ve(() => {
        r.value = io();
      });
      const d = vt(),
        s = J(null),
        f = Ne(),
        p = J(null),
        c = J(null),
        y = J(null),
        [h, E, m] = Yo();
      t({
        focus: () => {
          var D;
          (D = c.value) === null || D === void 0 || D.focus();
        },
        blur: () => {
          var D;
          (D = c.value) === null || D === void 0 || D.blur();
        },
        scrollTo: D => {
          var F;
          return (F = y.value) === null || F === void 0
            ? void 0
            : F.scrollTo(D);
        }
      });
      const I = L(() => {
          var D;
          if (e.mode !== 'combobox') return e.searchValue;
          const F =
            (D = e.displayValues[0]) === null || D === void 0
              ? void 0
              : D.value;
          return typeof F == 'string' || typeof F == 'number' ? String(F) : '';
        }),
        M = e.open !== void 0 ? e.open : e.defaultOpen,
        u = J(M),
        x = J(M),
        v = D => {
          (u.value = e.open !== void 0 ? e.open : D), (x.value = u.value);
        };
      ae(
        () => e.open,
        () => {
          v(e.open);
        }
      );
      const S = L(() => !e.notFoundContent && e.emptyOptions);
      Ie(() => {
        (x.value = u.value),
          (e.disabled || (S.value && x.value && e.mode === 'combobox')) &&
            (x.value = !1);
      });
      const $ = L(() => (S.value ? !1 : x.value)),
        A = D => {
          const F = D !== void 0 ? D : !x.value;
          u.value !== F &&
            !e.disabled &&
            (v(F), e.onDropdownVisibleChange && e.onDropdownVisibleChange(F));
        },
        W = L(() =>
          (e.tokenSeparators || []).some(D =>
            [
              `
`,
              `\r
`
            ].includes(D)
          )
        ),
        G = (D, F, g) => {
          var w, _;
          let B = !0,
            H = D;
          (w = e.onActiveValueChange) === null ||
            w === void 0 ||
            w.call(e, null);
          const q = g ? null : Eo(D, e.tokenSeparators);
          return (
            e.mode !== 'combobox' &&
              q &&
              ((H = ''),
              (_ = e.onSearchSplit) === null || _ === void 0 || _.call(e, q),
              A(!1),
              (B = !1)),
            e.onSearch &&
              I.value !== H &&
              e.onSearch(H, { source: F ? 'typing' : 'effect' }),
            B
          );
        },
        N = D => {
          var F;
          !D ||
            !D.trim() ||
            (F = e.onSearch) === null ||
            F === void 0 ||
            F.call(e, D, { source: 'submit' });
        };
      ae(
        x,
        () => {
          !x.value && !a.value && e.mode !== 'combobox' && G('', !1, !1);
        },
        { immediate: !0, flush: 'post' }
      ),
        ae(
          () => e.disabled,
          () => {
            u.value && e.disabled && v(!1);
          },
          { immediate: !0 }
        );
      const [V, U] = pn(),
        K = function(D) {
          var F;
          const g = V(),
            { which: w } = D;
          if (
            (w === Y.ENTER &&
              (e.mode !== 'combobox' && D.preventDefault(), x.value || A(!0)),
            U(!!I.value),
            w === Y.BACKSPACE &&
              !g &&
              a.value &&
              !I.value &&
              e.displayValues.length)
          ) {
            const q = [...e.displayValues];
            let ue = null;
            for (let oe = q.length - 1; oe >= 0; oe -= 1) {
              const de = q[oe];
              if (!de.disabled) {
                q.splice(oe, 1), (ue = de);
                break;
              }
            }
            ue && e.onDisplayValuesChange(q, { type: 'remove', values: [ue] });
          }
          for (
            var _ = arguments.length, B = new Array(_ > 1 ? _ - 1 : 0), H = 1;
            H < _;
            H++
          )
            B[H - 1] = arguments[H];
          x.value && y.value && y.value.onKeydown(D, ...B),
            (F = e.onKeydown) === null || F === void 0 || F.call(e, D, ...B);
        },
        k = function(D) {
          for (
            var F = arguments.length, g = new Array(F > 1 ? F - 1 : 0), w = 1;
            w < F;
            w++
          )
            g[w - 1] = arguments[w];
          x.value && y.value && y.value.onKeyup(D, ...g),
            e.onKeyup && e.onKeyup(D, ...g);
        },
        T = D => {
          const F = e.displayValues.filter(g => g !== D);
          e.onDisplayValuesChange(F, { type: 'remove', values: [D] });
        },
        R = J(!1);
      st('VCSelectContainerEvent', {
        focus: function() {
          E(!0),
            e.disabled ||
              (e.onFocus && !R.value && e.onFocus(...arguments),
              e.showAction && e.showAction.includes('focus') && A(!0)),
            (R.value = !0);
        },
        blur: function() {
          if (
            (E(!1, () => {
              (R.value = !1), A(!1);
            }),
            e.disabled)
          )
            return;
          const D = I.value;
          D &&
            (e.mode === 'tags'
              ? e.onSearch(D, { source: 'submit' })
              : e.mode === 'multiple' && e.onSearch('', { source: 'blur' })),
            e.onBlur && e.onBlur(...arguments);
        }
      });
      const j = [];
      ve(() => {
        j.forEach(D => clearTimeout(D)), j.splice(0, j.length);
      }),
        De(() => {
          j.forEach(D => clearTimeout(D)), j.splice(0, j.length);
        });
      const ne = function(D) {
          var F, g;
          const { target: w } = D,
            _ =
              (F = p.value) === null || F === void 0
                ? void 0
                : F.getPopupElement();
          if (_ && _.contains(w)) {
            const ue = setTimeout(() => {
              var oe;
              const de = j.indexOf(ue);
              de !== -1 && j.splice(de, 1),
                m(),
                !r.value &&
                  !_.contains(document.activeElement) &&
                  ((oe = c.value) === null || oe === void 0 || oe.focus());
            });
            j.push(ue);
          }
          for (
            var B = arguments.length, H = new Array(B > 1 ? B - 1 : 0), q = 1;
            q < B;
            q++
          )
            H[q - 1] = arguments[q];
          (g = e.onMousedown) === null || g === void 0 || g.call(e, D, ...H);
        },
        ee = J(null),
        ie = ln(),
        ce = () => {
          ie.update();
        };
      return (
        ve(() => {
          ae(
            $,
            () => {
              var D;
              if ($.value) {
                const F = Math.ceil(
                  (D = s.value) === null || D === void 0
                    ? void 0
                    : D.offsetWidth
                );
                ee.value !== F && !Number.isNaN(F) && (ee.value = F);
              }
            },
            { immediate: !0, flush: 'post' }
          );
        }),
        Go([s, p], $, A),
        Xo(
          Zt(
            C(C({}, kn(e)), {
              open: x,
              triggerOpen: $,
              showSearch: i,
              multiple: a,
              toggleOpen: A
            })
          )
        ),
        () => {
          const D = C(C({}, e), n),
            {
              prefixCls: F,
              id: g,
              open: w,
              defaultOpen: _,
              mode: B,
              showSearch: H,
              searchValue: q,
              onSearch: ue,
              allowClear: oe,
              clearIcon: de,
              showArrow: le,
              inputIcon: Pe,
              disabled: fe,
              loading: Me,
              getInputElement: Ae,
              getPopupContainer: Be,
              placement: Xe,
              animation: xn,
              transitionName: In,
              dropdownStyle: On,
              dropdownClassName: $n,
              dropdownMatchSelectWidth: Tn,
              dropdownRender: Pn,
              dropdownAlign: Mn,
              showAction: Ma,
              direction: En,
              tokenSeparators: Ea,
              tagRender: Rn,
              optionLabelRender: Dn,
              onPopupScroll: Ra,
              onDropdownVisibleChange: Da,
              onFocus: Fa,
              onBlur: _a,
              onKeyup: Na,
              onKeydown: Va,
              onMousedown: Aa,
              onClear: Qe,
              omitDomProps: qe,
              getRawInputElement: It,
              displayValues: He,
              onDisplayValuesChange: Fn,
              emptyOptions: _n,
              activeDescendantId: Nn,
              activeValue: Vn,
              OptionList: An
            } = D,
            Bn = qo(D, [
              'prefixCls',
              'id',
              'open',
              'defaultOpen',
              'mode',
              'showSearch',
              'searchValue',
              'onSearch',
              'allowClear',
              'clearIcon',
              'showArrow',
              'inputIcon',
              'disabled',
              'loading',
              'getInputElement',
              'getPopupContainer',
              'placement',
              'animation',
              'transitionName',
              'dropdownStyle',
              'dropdownClassName',
              'dropdownMatchSelectWidth',
              'dropdownRender',
              'dropdownAlign',
              'showAction',
              'direction',
              'tokenSeparators',
              'tagRender',
              'optionLabelRender',
              'onPopupScroll',
              'onDropdownVisibleChange',
              'onFocus',
              'onBlur',
              'onKeyup',
              'onKeydown',
              'onMousedown',
              'onClear',
              'omitDomProps',
              'getRawInputElement',
              'displayValues',
              'onDisplayValuesChange',
              'emptyOptions',
              'activeDescendantId',
              'activeValue',
              'OptionList'
            ]),
            Ot = (B === 'combobox' && Ae && Ae()) || null,
            Fe = typeof It == 'function' && It(),
            Je = C({}, Bn);
          let $t;
          Fe &&
            ($t = xe => {
              A(xe);
            }),
            Jo.forEach(xe => {
              delete Je[xe];
            }),
            qe == null ||
              qe.forEach(xe => {
                delete Je[xe];
              });
          const Tt = le !== void 0 ? le : Me || (!a.value && B !== 'combobox');
          let Pt;
          Tt &&
            (Pt = b(
              Ke,
              {
                class: te(`${F}-arrow`, { [`${F}-arrow-loading`]: Me }),
                customizeIcon: Pe,
                customizeIconProps: {
                  loading: Me,
                  searchValue: I.value,
                  open: x.value,
                  focused: h.value,
                  showSearch: i.value
                }
              },
              null
            ));
          let Mt;
          const Hn = () => {
            Qe == null || Qe(),
              Fn([], { type: 'clear', values: He }),
              G('', !1, !1);
          };
          !fe &&
            oe &&
            (He.length || I.value) &&
            (Mt = b(
              Ke,
              { class: `${F}-clear`, onMousedown: Hn, customizeIcon: de },
              { default: () => [lt('×')] }
            ));
          const Ln = b(
              An,
              { ref: y },
              C(C({}, d.customSlots), { option: l.option })
            ),
            zn = te(F, n.class, {
              [`${F}-focused`]: h.value,
              [`${F}-multiple`]: a.value,
              [`${F}-single`]: !a.value,
              [`${F}-allow-clear`]: oe,
              [`${F}-show-arrow`]: Tt,
              [`${F}-disabled`]: fe,
              [`${F}-loading`]: Me,
              [`${F}-open`]: x.value,
              [`${F}-customize-input`]: Ot,
              [`${F}-show-search`]: i.value
            }),
            Et = b(
              _o,
              {
                ref: p,
                disabled: fe,
                prefixCls: F,
                visible: $.value,
                popupElement: Ln,
                containerWidth: ee.value,
                animation: xn,
                transitionName: In,
                dropdownStyle: On,
                dropdownClassName: $n,
                direction: En,
                dropdownMatchSelectWidth: Tn,
                dropdownRender: Pn,
                dropdownAlign: Mn,
                placement: Xe,
                getPopupContainer: Be,
                empty: _n,
                getTriggerDOMNode: () => f.current,
                onPopupVisibleChange: $t,
                onPopupMouseEnter: ce
              },
              {
                default: () =>
                  Fe
                    ? Re(Fe) && $e(Fe, { ref: f }, !1, !0)
                    : b(
                        Uo,
                        Z(
                          Z({}, e),
                          {},
                          {
                            domRef: f,
                            prefixCls: F,
                            inputElement: Ot,
                            ref: c,
                            id: g,
                            showSearch: i.value,
                            mode: B,
                            activeDescendantId: Nn,
                            tagRender: Rn,
                            optionLabelRender: Dn,
                            values: He,
                            open: x.value,
                            onToggleOpen: A,
                            activeValue: Vn,
                            searchValue: I.value,
                            onSearch: G,
                            onSearchSubmit: N,
                            onRemove: T,
                            tokenWithEnter: W.value
                          }
                        ),
                        null
                      )
              }
            );
          let Ze;
          return (
            Fe
              ? (Ze = Et)
              : (Ze = b(
                  'div',
                  Z(
                    Z({}, Je),
                    {},
                    {
                      class: zn,
                      ref: s,
                      onMousedown: ne,
                      onKeydown: K,
                      onKeyup: k
                    }
                  ),
                  [
                    h.value &&
                      !x.value &&
                      b(
                        'span',
                        {
                          style: {
                            width: 0,
                            height: 0,
                            position: 'absolute',
                            overflow: 'hidden',
                            opacity: 0
                          },
                          'aria-live': 'polite'
                        },
                        [
                          `${He.map(xe => {
                            let { label: Rt, value: jn } = xe;
                            return ['number', 'string'].includes(typeof Rt)
                              ? Rt
                              : jn;
                          }).join(', ')}`
                        ]
                      ),
                    Et,
                    Pt,
                    Mt
                  ]
                )),
            Ze
          );
        }
      );
    }
  }),
  Ye = (e, o) => {
    let { height: n, offset: t, prefixCls: l, onInnerResize: a } = e,
      { slots: i } = o;
    var r;
    let d = {},
      s = { display: 'flex', flexDirection: 'column' };
    return (
      t !== void 0 &&
        ((d = { height: `${n}px`, position: 'relative', overflow: 'hidden' }),
        (s = C(C({}, s), {
          transform: `translateY(${t}px)`,
          position: 'absolute',
          left: 0,
          right: 0,
          top: 0
        }))),
      b('div', { style: d }, [
        b(
          ro,
          {
            onResize: f => {
              let { offsetHeight: p } = f;
              p && a && a();
            }
          },
          {
            default: () => [
              b('div', { style: s, class: te({ [`${l}-holder-inner`]: l }) }, [
                (r = i.default) === null || r === void 0 ? void 0 : r.call(i)
              ])
            ]
          }
        )
      ])
    );
  };
Ye.displayName = 'Filter';
Ye.inheritAttrs = !1;
Ye.props = {
  prefixCls: String,
  height: Number,
  offset: Number,
  onInnerResize: Function
};
const tl = Ye,
  gn = (e, o) => {
    let { setRef: n } = e,
      { slots: t } = o;
    var l;
    const a = kt((l = t.default) === null || l === void 0 ? void 0 : l.call(t));
    return a && a.length ? eo(a[0], { ref: n }) : a;
  };
gn.props = { setRef: { type: Function, default: () => {} } };
const nl = gn,
  ol = 20;
function Wt(e) {
  return 'touches' in e ? e.touches[0].pageY : e.pageY;
}
const ll = se({
  compatConfig: { MODE: 3 },
  name: 'ScrollBar',
  inheritAttrs: !1,
  props: {
    prefixCls: String,
    scrollTop: Number,
    scrollHeight: Number,
    height: Number,
    count: Number,
    onScroll: { type: Function },
    onStartMove: { type: Function },
    onStopMove: { type: Function }
  },
  setup() {
    return {
      moveRaf: null,
      scrollbarRef: Ne(),
      thumbRef: Ne(),
      visibleTimeout: null,
      state: je({ dragging: !1, pageY: null, startTop: null, visible: !1 })
    };
  },
  watch: {
    scrollTop: {
      handler() {
        this.delayHidden();
      },
      flush: 'post'
    }
  },
  mounted() {
    var e, o;
    (e = this.scrollbarRef.current) === null ||
      e === void 0 ||
      e.addEventListener(
        'touchstart',
        this.onScrollbarTouchStart,
        Se ? { passive: !1 } : !1
      ),
      (o = this.thumbRef.current) === null ||
        o === void 0 ||
        o.addEventListener(
          'touchstart',
          this.onMouseDown,
          Se ? { passive: !1 } : !1
        );
  },
  beforeUnmount() {
    this.removeEvents(), clearTimeout(this.visibleTimeout);
  },
  methods: {
    delayHidden() {
      clearTimeout(this.visibleTimeout),
        (this.state.visible = !0),
        (this.visibleTimeout = setTimeout(() => {
          this.state.visible = !1;
        }, 2e3));
    },
    onScrollbarTouchStart(e) {
      e.preventDefault();
    },
    onContainerMouseDown(e) {
      e.stopPropagation(), e.preventDefault();
    },
    patchEvents() {
      window.addEventListener('mousemove', this.onMouseMove),
        window.addEventListener('mouseup', this.onMouseUp),
        this.thumbRef.current.addEventListener(
          'touchmove',
          this.onMouseMove,
          Se ? { passive: !1 } : !1
        ),
        this.thumbRef.current.addEventListener('touchend', this.onMouseUp);
    },
    removeEvents() {
      window.removeEventListener('mousemove', this.onMouseMove),
        window.removeEventListener('mouseup', this.onMouseUp),
        this.scrollbarRef.current.removeEventListener(
          'touchstart',
          this.onScrollbarTouchStart,
          Se ? { passive: !1 } : !1
        ),
        this.thumbRef.current &&
          (this.thumbRef.current.removeEventListener(
            'touchstart',
            this.onMouseDown,
            Se ? { passive: !1 } : !1
          ),
          this.thumbRef.current.removeEventListener(
            'touchmove',
            this.onMouseMove,
            Se ? { passive: !1 } : !1
          ),
          this.thumbRef.current.removeEventListener(
            'touchend',
            this.onMouseUp
          )),
        ge.cancel(this.moveRaf);
    },
    onMouseDown(e) {
      const { onStartMove: o } = this.$props;
      C(this.state, { dragging: !0, pageY: Wt(e), startTop: this.getTop() }),
        o(),
        this.patchEvents(),
        e.stopPropagation(),
        e.preventDefault();
    },
    onMouseMove(e) {
      const { dragging: o, pageY: n, startTop: t } = this.state,
        { onScroll: l } = this.$props;
      if ((ge.cancel(this.moveRaf), o)) {
        const a = Wt(e) - n,
          i = t + a,
          r = this.getEnableScrollRange(),
          d = this.getEnableHeightRange(),
          s = d ? i / d : 0,
          f = Math.ceil(s * r);
        this.moveRaf = ge(() => {
          l(f);
        });
      }
    },
    onMouseUp() {
      const { onStopMove: e } = this.$props;
      (this.state.dragging = !1), e(), this.removeEvents();
    },
    getSpinHeight() {
      const { height: e, count: o } = this.$props;
      let n = (e / o) * 10;
      return (n = Math.max(n, ol)), (n = Math.min(n, e / 2)), Math.floor(n);
    },
    getEnableScrollRange() {
      const { scrollHeight: e, height: o } = this.$props;
      return e - o || 0;
    },
    getEnableHeightRange() {
      const { height: e } = this.$props,
        o = this.getSpinHeight();
      return e - o || 0;
    },
    getTop() {
      const { scrollTop: e } = this.$props,
        o = this.getEnableScrollRange(),
        n = this.getEnableHeightRange();
      return e === 0 || o === 0 ? 0 : (e / o) * n;
    },
    showScroll() {
      const { height: e, scrollHeight: o } = this.$props;
      return o > e;
    }
  },
  render() {
    const { dragging: e, visible: o } = this.state,
      { prefixCls: n } = this.$props,
      t = this.getSpinHeight() + 'px',
      l = this.getTop() + 'px',
      a = this.showScroll(),
      i = a && o;
    return b(
      'div',
      {
        ref: this.scrollbarRef,
        class: te(`${n}-scrollbar`, { [`${n}-scrollbar-show`]: a }),
        style: {
          width: '8px',
          top: 0,
          bottom: 0,
          right: 0,
          position: 'absolute',
          display: i ? void 0 : 'none'
        },
        onMousedown: this.onContainerMouseDown,
        onMousemove: this.delayHidden
      },
      [
        b(
          'div',
          {
            ref: this.thumbRef,
            class: te(`${n}-scrollbar-thumb`, {
              [`${n}-scrollbar-thumb-moving`]: e
            }),
            style: {
              width: '100%',
              height: t,
              top: l,
              left: 0,
              position: 'absolute',
              background: 'rgba(0, 0, 0, 0.5)',
              borderRadius: '99px',
              cursor: 'pointer',
              userSelect: 'none'
            },
            onMousedown: this.onMouseDown
          },
          null
        )
      ]
    );
  }
});
function al(e, o, n, t) {
  const l = new Map(),
    a = new Map(),
    i = he(Symbol('update'));
  ae(e, () => {
    i.value = Symbol('update');
  });
  let r;
  function d() {
    ge.cancel(r);
  }
  function s() {
    d(),
      (r = ge(() => {
        l.forEach((p, c) => {
          if (p && p.offsetParent) {
            const { offsetHeight: y } = p;
            a.get(c) !== y &&
              ((i.value = Symbol('update')), a.set(c, p.offsetHeight));
          }
        });
      }));
  }
  function f(p, c) {
    const y = o(p),
      h = l.get(y);
    c ? (l.set(y, c.$el || c), s()) : l.delete(y),
      !h != !c && (c ? n == null || n(p) : t == null || t(p));
  }
  return (
    to(() => {
      d();
    }),
    [f, s, a, i]
  );
}
function il(e, o, n, t, l, a, i, r) {
  let d;
  return s => {
    if (s == null) {
      r();
      return;
    }
    ge.cancel(d);
    const f = o.value,
      p = t.itemHeight;
    if (typeof s == 'number') i(s);
    else if (s && typeof s == 'object') {
      let c;
      const { align: y } = s;
      'index' in s
        ? ({ index: c } = s)
        : (c = f.findIndex(m => l(m) === s.key));
      const { offset: h = 0 } = s,
        E = (m, O) => {
          if (m < 0 || !e.value) return;
          const P = e.value.clientHeight;
          let I = !1,
            M = O;
          if (P) {
            const u = O || y;
            let x = 0,
              v = 0,
              S = 0;
            const $ = Math.min(f.length, c);
            for (let G = 0; G <= $; G += 1) {
              const N = l(f[G]);
              v = x;
              const V = n.get(N);
              (S = v + (V === void 0 ? p : V)),
                (x = S),
                G === c && V === void 0 && (I = !0);
            }
            const A = e.value.scrollTop;
            let W = null;
            switch (u) {
              case 'top':
                W = v - h;
                break;
              case 'bottom':
                W = S - P + h;
                break;
              default: {
                const G = A + P;
                v < A ? (M = 'top') : S > G && (M = 'bottom');
              }
            }
            W !== null && W !== A && i(W);
          }
          d = ge(() => {
            I && a(), E(m - 1, M);
          }, 2);
        };
      E(5);
    }
  };
}
const rl = typeof navigator == 'object' && /Firefox/i.test(navigator.userAgent),
  sl = rl,
  hn = (e, o) => {
    let n = !1,
      t = null;
    function l() {
      clearTimeout(t),
        (n = !0),
        (t = setTimeout(() => {
          n = !1;
        }, 50));
    }
    return function(a) {
      let i =
        arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1;
      const r = (a < 0 && e.value) || (a > 0 && o.value);
      return i && r ? (clearTimeout(t), (n = !1)) : (!r || n) && l(), !n && r;
    };
  };
function ul(e, o, n, t) {
  let l = 0,
    a = null,
    i = null,
    r = !1;
  const d = hn(o, n);
  function s(p) {
    if (!e.value) return;
    ge.cancel(a);
    const { deltaY: c } = p;
    (l += c),
      (i = c),
      !d(c) &&
        (sl || p.preventDefault(),
        (a = ge(() => {
          t(l * (r ? 10 : 1)), (l = 0);
        })));
  }
  function f(p) {
    e.value && (r = p.detail === i);
  }
  return [s, f];
}
const cl = 14 / 15;
function dl(e, o, n) {
  let t = !1,
    l = 0,
    a = null,
    i = null;
  const r = () => {
      a &&
        (a.removeEventListener('touchmove', d),
        a.removeEventListener('touchend', s));
    },
    d = c => {
      if (t) {
        const y = Math.ceil(c.touches[0].pageY);
        let h = l - y;
        (l = y),
          n(h) && c.preventDefault(),
          clearInterval(i),
          (i = setInterval(() => {
            (h *= cl), (!n(h, !0) || Math.abs(h) <= 0.1) && clearInterval(i);
          }, 16));
      }
    },
    s = () => {
      (t = !1), r();
    },
    f = c => {
      r(),
        c.touches.length === 1 &&
          !t &&
          ((t = !0),
          (l = Math.ceil(c.touches[0].pageY)),
          (a = c.target),
          a.addEventListener('touchmove', d, { passive: !1 }),
          a.addEventListener('touchend', s));
    },
    p = () => {};
  ve(() => {
    document.addEventListener('touchmove', p, { passive: !1 }),
      ae(
        e,
        c => {
          o.value.removeEventListener('touchstart', f),
            r(),
            clearInterval(i),
            c && o.value.addEventListener('touchstart', f, { passive: !1 });
        },
        { immediate: !0 }
      );
  }),
    De(() => {
      document.removeEventListener('touchmove', p);
    });
}
var fl =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
const pl = [],
  vl = { overflowY: 'auto', overflowAnchor: 'none' };
function ml(e, o, n, t, l, a) {
  let { getKey: i } = a;
  return e.slice(o, n + 1).map((r, d) => {
    const s = o + d,
      f = l(r, s, {}),
      p = i(r);
    return b(nl, { key: p, setRef: c => t(r, c) }, { default: () => [f] });
  });
}
const gl = se({
    compatConfig: { MODE: 3 },
    name: 'List',
    inheritAttrs: !1,
    props: {
      prefixCls: String,
      data: z.array,
      height: Number,
      itemHeight: Number,
      fullHeight: { type: Boolean, default: void 0 },
      itemKey: { type: [String, Number, Function], required: !0 },
      component: { type: [String, Object] },
      virtual: { type: Boolean, default: void 0 },
      children: Function,
      onScroll: Function,
      onMousedown: Function,
      onMouseenter: Function,
      onVisibleChange: Function
    },
    setup(e, o) {
      let { expose: n } = o;
      const t = L(() => {
          const { height: T, itemHeight: R, virtual: Q } = e;
          return !!(Q !== !1 && T && R);
        }),
        l = L(() => {
          const { height: T, itemHeight: R, data: Q } = e;
          return t.value && Q && R * Q.length > T;
        }),
        a = je({ scrollTop: 0, scrollMoving: !1 }),
        i = L(() => e.data || pl),
        r = J([]);
      ae(
        i,
        () => {
          r.value = ut(i.value).slice();
        },
        { immediate: !0 }
      );
      const d = J(T => {});
      ae(
        () => e.itemKey,
        T => {
          typeof T == 'function'
            ? (d.value = T)
            : (d.value = R => (R == null ? void 0 : R[T]));
        },
        { immediate: !0 }
      );
      const s = J(),
        f = J(),
        p = J(),
        c = T => d.value(T),
        y = { getKey: c };
      function h(T) {
        let R;
        typeof T == 'function' ? (R = T(a.scrollTop)) : (R = T);
        const Q = x(R);
        s.value && (s.value.scrollTop = Q), (a.scrollTop = Q);
      }
      const [E, m, O, P] = al(r, c, null, null),
        I = je({ scrollHeight: void 0, start: 0, end: 0, offset: void 0 }),
        M = J(0);
      ve(() => {
        Oe(() => {
          var T;
          M.value =
            ((T = f.value) === null || T === void 0
              ? void 0
              : T.offsetHeight) || 0;
        });
      }),
        no(() => {
          Oe(() => {
            var T;
            M.value =
              ((T = f.value) === null || T === void 0
                ? void 0
                : T.offsetHeight) || 0;
          });
        }),
        ae(
          [t, r],
          () => {
            t.value ||
              C(I, {
                scrollHeight: void 0,
                start: 0,
                end: r.value.length - 1,
                offset: void 0
              });
          },
          { immediate: !0 }
        ),
        ae(
          [t, r, M, l],
          () => {
            t.value &&
              !l.value &&
              C(I, {
                scrollHeight: M.value,
                start: 0,
                end: r.value.length - 1,
                offset: void 0
              }),
              s.value && (a.scrollTop = s.value.scrollTop);
          },
          { immediate: !0 }
        ),
        ae(
          [l, t, () => a.scrollTop, r, P, () => e.height, M],
          () => {
            if (!t.value || !l.value) return;
            let T = 0,
              R,
              Q,
              X;
            const j = r.value.length,
              ne = r.value,
              ee = a.scrollTop,
              { itemHeight: ie, height: ce } = e,
              D = ee + ce;
            for (let F = 0; F < j; F += 1) {
              const g = ne[F],
                w = c(g);
              let _ = O.get(w);
              _ === void 0 && (_ = ie);
              const B = T + _;
              R === void 0 && B >= ee && ((R = F), (Q = T)),
                X === void 0 && B > D && (X = F),
                (T = B);
            }
            R === void 0 && ((R = 0), (Q = 0), (X = Math.ceil(ce / ie))),
              X === void 0 && (X = j - 1),
              (X = Math.min(X + 1, j)),
              C(I, { scrollHeight: T, start: R, end: X, offset: Q });
          },
          { immediate: !0 }
        );
      const u = L(() => I.scrollHeight - e.height);
      function x(T) {
        let R = T;
        return (
          Number.isNaN(u.value) || (R = Math.min(R, u.value)),
          (R = Math.max(R, 0)),
          R
        );
      }
      const v = L(() => a.scrollTop <= 0),
        S = L(() => a.scrollTop >= u.value),
        $ = hn(v, S);
      function A(T) {
        h(T);
      }
      function W(T) {
        var R;
        const { scrollTop: Q } = T.currentTarget;
        Q !== a.scrollTop && h(Q),
          (R = e.onScroll) === null || R === void 0 || R.call(e, T);
      }
      const [G, N] = ul(t, v, S, T => {
        h(R => R + T);
      });
      dl(t, s, (T, R) =>
        $(T, R) ? !1 : (G({ preventDefault() {}, deltaY: T }), !0)
      );
      function V(T) {
        t.value && T.preventDefault();
      }
      const U = () => {
        s.value &&
          (s.value.removeEventListener('wheel', G, Se ? { passive: !1 } : !1),
          s.value.removeEventListener('DOMMouseScroll', N),
          s.value.removeEventListener('MozMousePixelScroll', V));
      };
      Ie(() => {
        Oe(() => {
          s.value &&
            (U(),
            s.value.addEventListener('wheel', G, Se ? { passive: !1 } : !1),
            s.value.addEventListener('DOMMouseScroll', N),
            s.value.addEventListener('MozMousePixelScroll', V));
        });
      }),
        De(() => {
          U();
        });
      const K = il(s, r, O, e, c, m, h, () => {
        var T;
        (T = p.value) === null || T === void 0 || T.delayHidden();
      });
      n({ scrollTo: K });
      const k = L(() => {
        let T = null;
        return (
          e.height &&
            ((T = C(
              { [e.fullHeight ? 'height' : 'maxHeight']: e.height + 'px' },
              vl
            )),
            t.value &&
              ((T.overflowY = 'hidden'),
              a.scrollMoving && (T.pointerEvents = 'none'))),
          T
        );
      });
      return (
        ae(
          [() => I.start, () => I.end, r],
          () => {
            if (e.onVisibleChange) {
              const T = r.value.slice(I.start, I.end + 1);
              e.onVisibleChange(T, r.value);
            }
          },
          { flush: 'post' }
        ),
        {
          state: a,
          mergedData: r,
          componentStyle: k,
          onFallbackScroll: W,
          onScrollBar: A,
          componentRef: s,
          useVirtual: t,
          calRes: I,
          collectHeight: m,
          setInstance: E,
          sharedConfig: y,
          scrollBarRef: p,
          fillerInnerRef: f
        }
      );
    },
    render() {
      const e = C(C({}, this.$props), this.$attrs),
        {
          prefixCls: o = 'rc-virtual-list',
          height: n,
          itemHeight: t,
          fullHeight: l,
          data: a,
          itemKey: i,
          virtual: r,
          component: d = 'div',
          onScroll: s,
          children: f = this.$slots.default,
          style: p,
          class: c
        } = e,
        y = fl(e, [
          'prefixCls',
          'height',
          'itemHeight',
          'fullHeight',
          'data',
          'itemKey',
          'virtual',
          'component',
          'onScroll',
          'children',
          'style',
          'class'
        ]),
        h = te(o, c),
        { scrollTop: E } = this.state,
        { scrollHeight: m, offset: O, start: P, end: I } = this.calRes,
        {
          componentStyle: M,
          onFallbackScroll: u,
          onScrollBar: x,
          useVirtual: v,
          collectHeight: S,
          sharedConfig: $,
          setInstance: A,
          mergedData: W
        } = this;
      return b(
        'div',
        Z({ style: C(C({}, p), { position: 'relative' }), class: h }, y),
        [
          b(
            d,
            {
              class: `${o}-holder`,
              style: M,
              ref: 'componentRef',
              onScroll: u
            },
            {
              default: () => [
                b(
                  tl,
                  {
                    prefixCls: o,
                    height: m,
                    offset: O,
                    onInnerResize: S,
                    ref: 'fillerInnerRef'
                  },
                  { default: () => ml(W, P, I, A, f, $) }
                )
              ]
            }
          ),
          v &&
            b(
              ll,
              {
                ref: 'scrollBarRef',
                prefixCls: o,
                scrollTop: E,
                height: n,
                scrollHeight: m,
                count: W.length,
                onScroll: x,
                onStartMove: () => {
                  this.state.scrollMoving = !0;
                },
                onStopMove: () => {
                  this.state.scrollMoving = !1;
                }
              },
              null
            )
        ]
      );
    }
  }),
  hl = gl;
function bl(e, o, n) {
  const t = he(e());
  return (
    ae(o, (l, a) => {
      n ? n(l, a) && (t.value = e()) : (t.value = e());
    }),
    t
  );
}
function yl() {
  return /(mac\sos|macintosh)/i.test(navigator.appVersion);
}
const bn = Symbol('SelectContextKey');
function Sl(e) {
  return st(bn, e);
}
function wl() {
  return Ue(bn, {});
}
var Cl =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
function Kt(e) {
  return typeof e == 'string' || typeof e == 'number';
}
const xl = se({
    compatConfig: { MODE: 3 },
    name: 'OptionList',
    inheritAttrs: !1,
    setup(e, o) {
      let { expose: n, slots: t } = o;
      const l = Qo(),
        a = wl(),
        i = L(() => `${l.prefixCls}-item`),
        r = bl(
          () => a.flattenOptions,
          [() => l.open, () => a.flattenOptions],
          u => u[0]
        ),
        d = Ne(),
        s = u => {
          u.preventDefault();
        },
        f = u => {
          d.current &&
            d.current.scrollTo(typeof u == 'number' ? { index: u } : u);
        },
        p = function(u) {
          let x =
            arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : 1;
          const v = r.value.length;
          for (let S = 0; S < v; S += 1) {
            const $ = (u + S * x + v) % v,
              { group: A, data: W } = r.value[$];
            if (!A && !W.disabled) return $;
          }
          return -1;
        },
        c = je({ activeIndex: p(0) }),
        y = function(u) {
          let x =
            arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1;
          c.activeIndex = u;
          const v = { source: x ? 'keyboard' : 'mouse' },
            S = r.value[u];
          if (!S) {
            a.onActiveValue(null, -1, v);
            return;
          }
          a.onActiveValue(S.value, u, v);
        };
      ae(
        [() => r.value.length, () => l.searchValue],
        () => {
          y(a.defaultActiveFirstOption !== !1 ? p(0) : -1);
        },
        { immediate: !0 }
      );
      const h = u => a.rawValues.has(u) && l.mode !== 'combobox';
      ae(
        [() => l.open, () => l.searchValue],
        () => {
          if (!l.multiple && l.open && a.rawValues.size === 1) {
            const u = Array.from(a.rawValues)[0],
              x = ut(r.value).findIndex(v => {
                let { data: S } = v;
                return S[a.fieldNames.value] === u;
              });
            x !== -1 &&
              (y(x),
              Oe(() => {
                f(x);
              }));
          }
          l.open &&
            Oe(() => {
              var u;
              (u = d.current) === null || u === void 0 || u.scrollTo(void 0);
            });
        },
        { immediate: !0, flush: 'post' }
      );
      const E = u => {
          u !== void 0 && a.onSelect(u, { selected: !a.rawValues.has(u) }),
            l.multiple || l.toggleOpen(!1);
        },
        m = u => (typeof u.label == 'function' ? u.label() : u.label);
      function O(u) {
        const x = r.value[u];
        if (!x) return null;
        const v = x.data || {},
          { value: S } = v,
          { group: $ } = x,
          A = ct(v, !0),
          W = m(x);
        return x
          ? b(
              'div',
              Z(
                Z({ 'aria-label': typeof W == 'string' && !$ ? W : null }, A),
                {},
                {
                  key: u,
                  role: $ ? 'presentation' : 'option',
                  id: `${l.id}_list_${u}`,
                  'aria-selected': h(S)
                }
              ),
              [S]
            )
          : null;
      }
      return (
        n({
          onKeydown: u => {
            const { which: x, ctrlKey: v } = u;
            switch (x) {
              case Y.N:
              case Y.P:
              case Y.UP:
              case Y.DOWN: {
                let S = 0;
                if (
                  (x === Y.UP
                    ? (S = -1)
                    : x === Y.DOWN
                    ? (S = 1)
                    : yl() &&
                      v &&
                      (x === Y.N ? (S = 1) : x === Y.P && (S = -1)),
                  S !== 0)
                ) {
                  const $ = p(c.activeIndex + S, S);
                  f($), y($, !0);
                }
                break;
              }
              case Y.ENTER: {
                const S = r.value[c.activeIndex];
                S && !S.data.disabled ? E(S.value) : E(void 0),
                  l.open && u.preventDefault();
                break;
              }
              case Y.ESC:
                l.toggleOpen(!1), l.open && u.stopPropagation();
            }
          },
          onKeyup: () => {},
          scrollTo: u => {
            f(u);
          }
        }),
        () => {
          const { id: u, notFoundContent: x, onPopupScroll: v } = l,
            {
              menuItemSelectedIcon: S,
              fieldNames: $,
              virtual: A,
              listHeight: W,
              listItemHeight: G
            } = a,
            N = t.option,
            { activeIndex: V } = c,
            U = Object.keys($).map(K => $[K]);
          return r.value.length === 0
            ? b(
                'div',
                {
                  role: 'listbox',
                  id: `${u}_list`,
                  class: `${i.value}-empty`,
                  onMousedown: s
                },
                [x]
              )
            : b(Te, null, [
                b(
                  'div',
                  {
                    role: 'listbox',
                    id: `${u}_list`,
                    style: { height: 0, width: 0, overflow: 'hidden' }
                  },
                  [O(V - 1), O(V), O(V + 1)]
                ),
                b(
                  hl,
                  {
                    itemKey: 'key',
                    ref: d,
                    data: r.value,
                    height: W,
                    itemHeight: G,
                    fullHeight: !1,
                    onMousedown: s,
                    onScroll: v,
                    virtual: A
                  },
                  {
                    default: (K, k) => {
                      var T;
                      const { group: R, groupOption: Q, data: X, value: j } = K,
                        { key: ne } = X,
                        ee = typeof K.label == 'function' ? K.label() : K.label;
                      if (R) {
                        const fe =
                          (T = X.title) !== null && T !== void 0
                            ? T
                            : Kt(ee) && ee;
                        return b(
                          'div',
                          { class: te(i.value, `${i.value}-group`), title: fe },
                          [N ? N(X) : ee !== void 0 ? ee : ne]
                        );
                      }
                      const {
                          disabled: ie,
                          title: ce,
                          children: D,
                          style: F,
                          class: g,
                          className: w
                        } = X,
                        _ = Cl(X, [
                          'disabled',
                          'title',
                          'children',
                          'style',
                          'class',
                          'className'
                        ]),
                        B = be(_, U),
                        H = h(j),
                        q = `${i.value}-option`,
                        ue = te(i.value, q, g, w, {
                          [`${q}-grouped`]: Q,
                          [`${q}-active`]: V === k && !ie,
                          [`${q}-disabled`]: ie,
                          [`${q}-selected`]: H
                        }),
                        oe = m(K),
                        de = !S || typeof S == 'function' || H,
                        le = typeof oe == 'number' ? oe : oe || j;
                      let Pe = Kt(le) ? le.toString() : void 0;
                      return (
                        ce !== void 0 && (Pe = ce),
                        b(
                          'div',
                          Z(
                            Z({}, B),
                            {},
                            {
                              'aria-selected': H,
                              class: ue,
                              title: Pe,
                              onMousemove: fe => {
                                _.onMousemove && _.onMousemove(fe),
                                  !(V === k || ie) && y(k);
                              },
                              onClick: fe => {
                                ie || E(j), _.onClick && _.onClick(fe);
                              },
                              style: F
                            }
                          ),
                          [
                            b('div', { class: `${q}-content` }, [
                              N ? N(X) : le
                            ]),
                            Re(S) || H,
                            de &&
                              b(
                                Ke,
                                {
                                  class: `${i.value}-option-state`,
                                  customizeIcon: S,
                                  customizeIconProps: { isSelected: H }
                                },
                                { default: () => [H ? '✓' : null] }
                              )
                          ]
                        )
                      );
                    }
                  }
                )
              ]);
        }
      );
    }
  }),
  Il = xl;
var Ol =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
function $l(e) {
  const o = e,
    { key: n, children: t } = o,
    l = o.props,
    { value: a, disabled: i } = l,
    r = Ol(l, ['value', 'disabled']),
    d = t == null ? void 0 : t.default;
  return C(
    {
      key: n,
      value: a !== void 0 ? a : n,
      children: d,
      disabled: i || i === ''
    },
    r
  );
}
function ht(e) {
  let o = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1;
  return kt(e)
    .map((t, l) => {
      var a;
      if (!Re(t) || !t.type) return null;
      const {
        type: { isSelectOptGroup: i },
        key: r,
        children: d,
        props: s
      } = t;
      if (o || !i) return $l(t);
      const f = d && d.default ? d.default() : void 0,
        p =
          (s == null ? void 0 : s.label) ||
          ((a = d.label) === null || a === void 0 ? void 0 : a.call(d)) ||
          r;
      return C(
        C({ key: `__RC_SELECT_GRP__${r === null ? l : String(r)}__` }, s),
        { label: p, options: ht(f || []) }
      );
    })
    .filter(t => t);
}
function Tl(e, o, n) {
  const t = J(),
    l = J(),
    a = J(),
    i = J([]);
  return (
    ae(
      [e, o],
      () => {
        e.value ? (i.value = ut(e.value).slice()) : (i.value = ht(o.value));
      },
      { immediate: !0, deep: !0 }
    ),
    Ie(() => {
      const r = i.value,
        d = new Map(),
        s = new Map(),
        f = n.value;
      function p(c) {
        let y =
          arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !1;
        for (let h = 0; h < c.length; h += 1) {
          const E = c[h];
          !E[f.options] || y
            ? (d.set(E[f.value], E), s.set(E[f.label], E))
            : p(E[f.options], !0);
        }
      }
      p(r), (t.value = r), (l.value = d), (a.value = s);
    }),
    { options: t, valueOptions: l, labelOptions: a }
  );
}
let Ut = 0;
const Pl = Kn();
function Ml() {
  let e;
  return Pl ? ((e = Ut), (Ut += 1)) : (e = 'TEST_OR_SSR'), e;
}
function El() {
  let e =
    arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : he('');
  const o = `rc_select_${Ml()}`;
  return e.value || o;
}
function bt(e) {
  return Array.isArray(e) ? e : e !== void 0 ? [e] : [];
}
function Rl(e) {
  const {
      mode: o,
      options: n,
      children: t,
      backfill: l,
      allowClear: a,
      placeholder: i,
      getInputElement: r,
      showSearch: d,
      onSearch: s,
      defaultOpen: f,
      autofocus: p,
      labelInValue: c,
      value: y,
      inputValue: h,
      optionLabelProp: E
    } = e,
    m = gt(o),
    O = d !== void 0 ? d : m || o === 'combobox',
    P = n || ht(t);
  if (
    (me(
      o !== 'tags' || P.every(I => !I.disabled),
      'Please avoid setting option to disabled in tags mode since user can always type text as tag.'
    ),
    me(
      o !== 'combobox' || !E,
      '`combobox` mode not support `optionLabelProp`. Please set `value` on Option directly.'
    ),
    me(o === 'combobox' || !l, '`backfill` only works with `combobox` mode.'),
    me(
      o === 'combobox' || !r,
      '`getInputElement` only work with `combobox` mode.'
    ),
    Dt(
      o !== 'combobox' || !r || !a || !i,
      'Customize `getInputElement` should customize clear and placeholder logic instead of configuring `allowClear` and `placeholder`.'
    ),
    s &&
      !O &&
      o !== 'combobox' &&
      o !== 'tags' &&
      me(!1, '`onSearch` should work with `showSearch` instead of use alone.'),
    Dt(
      !f || p,
      '`defaultOpen` makes Select open without focus which means it will not close by click outside. You can set `autofocus` if needed.'
    ),
    y != null)
  ) {
    const I = bt(y);
    me(
      !c || I.every(M => typeof M == 'object' && ('key' in M || 'value' in M)),
      '`value` should in shape of `{ value: string | number, label?: any }` when you set `labelInValue` to `true`'
    ),
      me(
        !m || Array.isArray(y),
        '`value` should be array when `mode` is `multiple` or `tags`'
      );
  }
  if (t) {
    let I = null;
    t.some(M => {
      var u;
      if (!Re(M) || !M.type) return !1;
      const { type: x } = M;
      return x.isSelectOption
        ? !1
        : x.isSelectOptGroup
        ? !(
            ((u = M.children) === null || u === void 0
              ? void 0
              : u.default()) || []
          ).every($ =>
            !Re($) || !M.type || $.type.isSelectOption ? !0 : ((I = $.type), !1)
          )
        : ((I = x), !0);
    }),
      I &&
        me(
          !1,
          `\`children\` should be \`Select.Option\` or \`Select.OptGroup\` instead of \`${I.displayName ||
            I.name ||
            I}\`.`
        ),
      me(
        h === void 0,
        '`inputValue` is deprecated, please use `searchValue` instead.'
      );
  }
}
function ke(e, o) {
  return bt(e)
    .join('')
    .toUpperCase()
    .includes(o);
}
const Dl = (e, o, n, t, l) =>
    L(() => {
      const a = n.value,
        i = l == null ? void 0 : l.value,
        r = t == null ? void 0 : t.value;
      if (!a || r === !1) return e.value;
      const { options: d, label: s, value: f } = o.value,
        p = [],
        c = typeof r == 'function',
        y = a.toUpperCase(),
        h = c
          ? r
          : (m, O) =>
              i
                ? ke(O[i], y)
                : O[d]
                ? ke(O[s !== 'children' ? s : 'label'], y)
                : ke(O[f], y),
        E = c ? m => at(m) : m => m;
      return (
        e.value.forEach(m => {
          if (m[d]) {
            if (h(a, E(m))) p.push(m);
            else {
              const P = m[d].filter(I => h(a, E(I)));
              P.length && p.push(C(C({}, m), { [d]: P }));
            }
            return;
          }
          h(a, E(m)) && p.push(m);
        }),
        p
      );
    }),
  Fl = (e, o) => {
    const n = J({ values: new Map(), options: new Map() });
    return [
      L(() => {
        const { values: a, options: i } = n.value,
          r = e.value.map(f => {
            var p;
            return f.label === void 0
              ? C(C({}, f), {
                  label:
                    (p = a.get(f.value)) === null || p === void 0
                      ? void 0
                      : p.label
                })
              : f;
          }),
          d = new Map(),
          s = new Map();
        return (
          r.forEach(f => {
            d.set(f.value, f),
              s.set(f.value, o.value.get(f.value) || i.get(f.value));
          }),
          (n.value.values = d),
          (n.value.options = s),
          r
        );
      }),
      a => o.value.get(a) || n.value.options.get(a)
    ];
  },
  _l = ['inputValue'];
function yn() {
  return C(C({}, mn()), {
    prefixCls: String,
    id: String,
    backfill: { type: Boolean, default: void 0 },
    fieldNames: Object,
    inputValue: String,
    searchValue: String,
    onSearch: Function,
    autoClearSearchValue: { type: Boolean, default: void 0 },
    onSelect: Function,
    onDeselect: Function,
    filterOption: { type: [Boolean, Function], default: void 0 },
    filterSort: Function,
    optionFilterProp: String,
    optionLabelProp: String,
    options: Array,
    defaultActiveFirstOption: { type: Boolean, default: void 0 },
    virtual: { type: Boolean, default: void 0 },
    listHeight: Number,
    listItemHeight: Number,
    menuItemSelectedIcon: z.any,
    mode: String,
    labelInValue: { type: Boolean, default: void 0 },
    value: z.any,
    defaultValue: z.any,
    onChange: Function,
    children: Array
  });
}
function Nl(e) {
  return !e || typeof e != 'object';
}
const Vl = se({
    compatConfig: { MODE: 3 },
    name: 'VcSelect',
    inheritAttrs: !1,
    props: pt(yn(), {
      prefixCls: 'vc-select',
      autoClearSearchValue: !0,
      listHeight: 200,
      listItemHeight: 20,
      dropdownMatchSelectWidth: !0
    }),
    setup(e, o) {
      let { expose: n, attrs: t, slots: l } = o;
      const a = El(ye(e, 'id')),
        i = L(() => gt(e.mode)),
        r = L(() => !!(!e.options && e.children)),
        d = L(() =>
          e.filterOption === void 0 && e.mode === 'combobox'
            ? !1
            : e.filterOption
        ),
        s = L(() => dn(e.fieldNames, r.value)),
        [f, p] = _t('', {
          value: L(() =>
            e.searchValue !== void 0 ? e.searchValue : e.inputValue
          ),
          postState: g => g || ''
        }),
        c = Tl(ye(e, 'options'), ye(e, 'children'), s),
        { valueOptions: y, labelOptions: h, options: E } = c,
        m = g =>
          bt(g).map(_ => {
            var B, H;
            let q, ue, oe, de;
            Nl(_)
              ? (q = _)
              : ((oe = _.key),
                (ue = _.label),
                (q = (B = _.value) !== null && B !== void 0 ? B : oe));
            const le = y.value.get(q);
            return (
              le &&
                (ue === void 0 &&
                  (ue =
                    le == null
                      ? void 0
                      : le[e.optionLabelProp || s.value.label]),
                oe === void 0 &&
                  (oe =
                    (H = le == null ? void 0 : le.key) !== null && H !== void 0
                      ? H
                      : q),
                (de = le == null ? void 0 : le.disabled)),
              { label: ue, value: q, key: oe, disabled: de, option: le }
            );
          }),
        [O, P] = _t(e.defaultValue, { value: ye(e, 'value') }),
        I = L(() => {
          var g;
          const w = m(O.value);
          return e.mode === 'combobox' &&
            !(!((g = w[0]) === null || g === void 0) && g.value)
            ? []
            : w;
        }),
        [M, u] = Fl(I, y),
        x = L(() => {
          if (!e.mode && M.value.length === 1) {
            const g = M.value[0];
            if (g.value === null && (g.label === null || g.label === void 0))
              return [];
          }
          return M.value.map(g => {
            var w;
            return C(C({}, g), {
              label:
                (w = typeof g.label == 'function' ? g.label() : g.label) !==
                  null && w !== void 0
                  ? w
                  : g.value
            });
          });
        }),
        v = L(() => new Set(M.value.map(g => g.value)));
      Ie(
        () => {
          var g;
          if (e.mode === 'combobox') {
            const w =
              (g = M.value[0]) === null || g === void 0 ? void 0 : g.value;
            w != null && p(String(w));
          }
        },
        { flush: 'post' }
      );
      const S = (g, w) => {
          const _ = w ?? g;
          return { [s.value.value]: g, [s.value.label]: _ };
        },
        $ = J();
      Ie(() => {
        if (e.mode !== 'tags') {
          $.value = E.value;
          return;
        }
        const g = E.value.slice(),
          w = _ => y.value.has(_);
        [...M.value]
          .sort((_, B) => (_.value < B.value ? -1 : 1))
          .forEach(_ => {
            const B = _.value;
            w(B) || g.push(S(B, _.label));
          }),
          ($.value = g);
      });
      const A = Dl($, s, f, d, ye(e, 'optionFilterProp')),
        W = L(() =>
          e.mode !== 'tags' ||
          !f.value ||
          A.value.some(g => g[e.optionFilterProp || 'value'] === f.value)
            ? A.value
            : [S(f.value), ...A.value]
        ),
        G = L(() =>
          e.filterSort
            ? [...W.value].sort((g, w) => e.filterSort(g, w))
            : W.value
        ),
        N = L(() =>
          Mo(G.value, { fieldNames: s.value, childrenAsData: r.value })
        ),
        V = g => {
          const w = m(g);
          if (
            (P(w),
            e.onChange &&
              (w.length !== M.value.length ||
                w.some((_, B) => {
                  var H;
                  return (
                    ((H = M.value[B]) === null || H === void 0
                      ? void 0
                      : H.value) !== (_ == null ? void 0 : _.value)
                  );
                })))
          ) {
            const _ = e.labelInValue
                ? w.map(H =>
                    C(C({}, H), {
                      originLabel: H.label,
                      label: typeof H.label == 'function' ? H.label() : H.label
                    })
                  )
                : w.map(H => H.value),
              B = w.map(H => at(u(H.value)));
            e.onChange(i.value ? _ : _[0], i.value ? B : B[0]);
          }
        },
        [U, K] = Nt(null),
        [k, T] = Nt(0),
        R = L(() =>
          e.defaultActiveFirstOption !== void 0
            ? e.defaultActiveFirstOption
            : e.mode !== 'combobox'
        ),
        Q = function(g, w) {
          let { source: _ = 'keyboard' } =
            arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : {};
          T(w),
            e.backfill &&
              e.mode === 'combobox' &&
              g !== null &&
              _ === 'keyboard' &&
              K(String(g));
        },
        X = (g, w) => {
          const _ = () => {
            var B;
            const H = u(g),
              q = H == null ? void 0 : H[s.value.label];
            return [
              e.labelInValue
                ? {
                    label: typeof q == 'function' ? q() : q,
                    originLabel: q,
                    value: g,
                    key:
                      (B = H == null ? void 0 : H.key) !== null && B !== void 0
                        ? B
                        : g
                  }
                : g,
              at(H)
            ];
          };
          if (w && e.onSelect) {
            const [B, H] = _();
            e.onSelect(B, H);
          } else if (!w && e.onDeselect) {
            const [B, H] = _();
            e.onDeselect(B, H);
          }
        },
        j = (g, w) => {
          let _;
          const B = i.value ? w.selected : !0;
          B
            ? (_ = i.value ? [...M.value, g] : [g])
            : (_ = M.value.filter(H => H.value !== g)),
            V(_),
            X(g, B),
            e.mode === 'combobox'
              ? K('')
              : (!i.value || e.autoClearSearchValue) && (p(''), K(''));
        },
        ne = (g, w) => {
          V(g),
            (w.type === 'remove' || w.type === 'clear') &&
              w.values.forEach(_ => {
                X(_.value, !1);
              });
        },
        ee = (g, w) => {
          var _;
          if ((p(g), K(null), w.source === 'submit')) {
            const B = (g || '').trim();
            if (B) {
              const H = Array.from(new Set([...v.value, B]));
              V(H), X(B, !0), p('');
            }
            return;
          }
          w.source !== 'blur' &&
            (e.mode === 'combobox' && V(g),
            (_ = e.onSearch) === null || _ === void 0 || _.call(e, g));
        },
        ie = g => {
          let w = g;
          e.mode !== 'tags' &&
            (w = g
              .map(B => {
                const H = h.value.get(B);
                return H == null ? void 0 : H.value;
              })
              .filter(B => B !== void 0));
          const _ = Array.from(new Set([...v.value, ...w]));
          V(_),
            _.forEach(B => {
              X(B, !0);
            });
        },
        ce = L(() => e.virtual !== !1 && e.dropdownMatchSelectWidth !== !1);
      Sl(
        Zt(
          C(C({}, c), {
            flattenOptions: N,
            onActiveValue: Q,
            defaultActiveFirstOption: R,
            onSelect: j,
            menuItemSelectedIcon: ye(e, 'menuItemSelectedIcon'),
            rawValues: v,
            fieldNames: s,
            virtual: ce,
            listHeight: ye(e, 'listHeight'),
            listItemHeight: ye(e, 'listItemHeight'),
            childrenAsData: r
          })
        )
      ),
        Ie(
          () => {
            Rl(e);
          },
          { flush: 'post' }
        );
      const D = he();
      n({
        focus() {
          var g;
          (g = D.value) === null || g === void 0 || g.focus();
        },
        blur() {
          var g;
          (g = D.value) === null || g === void 0 || g.blur();
        },
        scrollTo(g) {
          var w;
          (w = D.value) === null || w === void 0 || w.scrollTo(g);
        }
      });
      const F = L(() =>
        be(e, [
          'id',
          'mode',
          'prefixCls',
          'backfill',
          'fieldNames',
          'inputValue',
          'searchValue',
          'onSearch',
          'autoClearSearchValue',
          'onSelect',
          'onDeselect',
          'dropdownMatchSelectWidth',
          'filterOption',
          'filterSort',
          'optionFilterProp',
          'optionLabelProp',
          'options',
          'children',
          'defaultActiveFirstOption',
          'menuItemSelectedIcon',
          'virtual',
          'listHeight',
          'listItemHeight',
          'value',
          'defaultValue',
          'labelInValue',
          'onChange'
        ])
      );
      return () =>
        b(
          el,
          Z(
            Z(Z({}, F.value), t),
            {},
            {
              id: a,
              prefixCls: e.prefixCls,
              ref: D,
              omitDomProps: _l,
              mode: e.mode,
              displayValues: x.value,
              onDisplayValuesChange: ne,
              searchValue: f.value,
              onSearch: ee,
              onSearchSplit: ie,
              dropdownMatchSelectWidth: e.dropdownMatchSelectWidth,
              OptionList: Il,
              emptyOptions: !N.value.length,
              activeValue: U.value,
              activeDescendantId: `${a}_list_${k.value}`
            }
          ),
          l
        );
    }
  }),
  yt = () => null;
yt.isSelectOption = !0;
yt.displayName = 'ASelectOption';
const Al = yt,
  St = () => null;
St.isSelectOptGroup = !0;
St.displayName = 'ASelectOptGroup';
const Bl = St;
function Gt(e) {
  for (var o = 1; o < arguments.length; o++) {
    var n = arguments[o] != null ? Object(arguments[o]) : {},
      t = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (t = t.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      t.forEach(function(l) {
        Hl(e, l, n[l]);
      });
  }
  return e;
}
function Hl(e, o, n) {
  return (
    o in e
      ? Object.defineProperty(e, o, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[o] = n),
    e
  );
}
var wt = function(o, n) {
  var t = Gt({}, o, n.attrs);
  return b(it, Gt({}, t, { icon: $o }), null);
};
wt.displayName = 'DownOutlined';
wt.inheritAttrs = !1;
const Ll = wt;
function Yt(e) {
  for (var o = 1; o < arguments.length; o++) {
    var n = arguments[o] != null ? Object(arguments[o]) : {},
      t = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (t = t.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      t.forEach(function(l) {
        zl(e, l, n[l]);
      });
  }
  return e;
}
function zl(e, o, n) {
  return (
    o in e
      ? Object.defineProperty(e, o, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[o] = n),
    e
  );
}
var Ct = function(o, n) {
  var t = Yt({}, o, n.attrs);
  return b(it, Yt({}, t, { icon: To }), null);
};
Ct.displayName = 'SearchOutlined';
Ct.inheritAttrs = !1;
const Sn = Ct;
function jl(e) {
  let o = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
  const {
      loading: n,
      multiple: t,
      prefixCls: l,
      hasFeedback: a,
      feedbackIcon: i,
      showArrow: r
    } = e,
    d = e.suffixIcon || (o.suffixIcon && o.suffixIcon()),
    s = e.clearIcon || (o.clearIcon && o.clearIcon()),
    f =
      e.menuItemSelectedIcon ||
      (o.menuItemSelectedIcon && o.menuItemSelectedIcon()),
    p = e.removeIcon || (o.removeIcon && o.removeIcon()),
    c = s ?? b(en, null, null),
    y = O => b(Te, null, [r !== !1 && O, a && i]);
  let h = null;
  if (d !== void 0) h = y(d);
  else if (n) h = y(b(Un, { spin: !0 }, null));
  else {
    const O = `${l}-suffix`;
    h = P => {
      let { open: I, showSearch: M } = P;
      return y(I && M ? b(Sn, { class: O }, null) : b(Ll, { class: O }, null));
    };
  }
  let E = null;
  f !== void 0 ? (E = f) : t ? (E = b(so, null, null)) : (E = null);
  let m = null;
  return (
    p !== void 0 ? (m = p) : (m = b(Gn, null, null)),
    { clearIcon: c, suffixIcon: h, itemIcon: E, removeIcon: m }
  );
}
var Wl = uo(Object.getPrototypeOf, Object);
const Kl = Wl;
var Ul = '[object Object]',
  Gl = Function.prototype,
  Yl = Object.prototype,
  wn = Gl.toString,
  Xl = Yl.hasOwnProperty,
  Ql = wn.call(Object);
function ql(e) {
  if (!co(e) || fo(e) != Ul) return !1;
  var o = Kl(e);
  if (o === null) return !0;
  var n = Xl.call(o, 'constructor') && o.constructor;
  return typeof n == 'function' && n instanceof n && wn.call(n) == Ql;
}
const Jl = new Ce('antMoveDownIn', {
    '0%': {
      transform: 'translate3d(0, 100%, 0)',
      transformOrigin: '0 0',
      opacity: 0
    },
    '100%': {
      transform: 'translate3d(0, 0, 0)',
      transformOrigin: '0 0',
      opacity: 1
    }
  }),
  Zl = new Ce('antMoveDownOut', {
    '0%': {
      transform: 'translate3d(0, 0, 0)',
      transformOrigin: '0 0',
      opacity: 1
    },
    '100%': {
      transform: 'translate3d(0, 100%, 0)',
      transformOrigin: '0 0',
      opacity: 0
    }
  }),
  kl = new Ce('antMoveLeftIn', {
    '0%': {
      transform: 'translate3d(-100%, 0, 0)',
      transformOrigin: '0 0',
      opacity: 0
    },
    '100%': {
      transform: 'translate3d(0, 0, 0)',
      transformOrigin: '0 0',
      opacity: 1
    }
  }),
  ea = new Ce('antMoveLeftOut', {
    '0%': {
      transform: 'translate3d(0, 0, 0)',
      transformOrigin: '0 0',
      opacity: 1
    },
    '100%': {
      transform: 'translate3d(-100%, 0, 0)',
      transformOrigin: '0 0',
      opacity: 0
    }
  }),
  ta = new Ce('antMoveRightIn', {
    '0%': {
      transform: 'translate3d(100%, 0, 0)',
      transformOrigin: '0 0',
      opacity: 0
    },
    '100%': {
      transform: 'translate3d(0, 0, 0)',
      transformOrigin: '0 0',
      opacity: 1
    }
  }),
  na = new Ce('antMoveRightOut', {
    '0%': {
      transform: 'translate3d(0, 0, 0)',
      transformOrigin: '0 0',
      opacity: 1
    },
    '100%': {
      transform: 'translate3d(100%, 0, 0)',
      transformOrigin: '0 0',
      opacity: 0
    }
  }),
  oa = new Ce('antMoveUpIn', {
    '0%': {
      transform: 'translate3d(0, -100%, 0)',
      transformOrigin: '0 0',
      opacity: 0
    },
    '100%': {
      transform: 'translate3d(0, 0, 0)',
      transformOrigin: '0 0',
      opacity: 1
    }
  }),
  la = new Ce('antMoveUpOut', {
    '0%': {
      transform: 'translate3d(0, 0, 0)',
      transformOrigin: '0 0',
      opacity: 1
    },
    '100%': {
      transform: 'translate3d(0, -100%, 0)',
      transformOrigin: '0 0',
      opacity: 0
    }
  }),
  aa = {
    'move-up': { inKeyframes: oa, outKeyframes: la },
    'move-down': { inKeyframes: Jl, outKeyframes: Zl },
    'move-left': { inKeyframes: kl, outKeyframes: ea },
    'move-right': { inKeyframes: ta, outKeyframes: na }
  },
  Xt = (e, o) => {
    const { antCls: n } = e,
      t = `${n}-${o}`,
      { inKeyframes: l, outKeyframes: a } = aa[o];
    return [
      po(t, l, a, e.motionDurationMid),
      {
        [`
        ${t}-enter,
        ${t}-appear
      `]: { opacity: 0, animationTimingFunction: e.motionEaseOutCirc },
        [`${t}-leave`]: { animationTimingFunction: e.motionEaseInOutCirc }
      }
    ];
  },
  Qt = e => {
    const { controlPaddingHorizontal: o } = e;
    return {
      position: 'relative',
      display: 'block',
      minHeight: e.controlHeight,
      padding: `${(e.controlHeight - e.fontSize * e.lineHeight) / 2}px ${o}px`,
      color: e.colorText,
      fontWeight: 'normal',
      fontSize: e.fontSize,
      lineHeight: e.lineHeight,
      boxSizing: 'border-box'
    };
  },
  ia = e => {
    const { antCls: o, componentCls: n } = e,
      t = `${n}-item`;
    return [
      {
        [`${n}-dropdown`]: C(C({}, rt(e)), {
          position: 'absolute',
          top: -9999,
          zIndex: e.zIndexPopup,
          boxSizing: 'border-box',
          padding: e.paddingXXS,
          overflow: 'hidden',
          fontSize: e.fontSize,
          fontVariant: 'initial',
          backgroundColor: e.colorBgElevated,
          borderRadius: e.borderRadiusLG,
          outline: 'none',
          boxShadow: e.boxShadowSecondary,
          [`
            &${o}-slide-up-enter${o}-slide-up-enter-active${n}-dropdown-placement-bottomLeft,
            &${o}-slide-up-appear${o}-slide-up-appear-active${n}-dropdown-placement-bottomLeft
          `]: { animationName: vo },
          [`
            &${o}-slide-up-enter${o}-slide-up-enter-active${n}-dropdown-placement-topLeft,
            &${o}-slide-up-appear${o}-slide-up-appear-active${n}-dropdown-placement-topLeft
          `]: { animationName: mo },
          [`&${o}-slide-up-leave${o}-slide-up-leave-active${n}-dropdown-placement-bottomLeft`]: {
            animationName: go
          },
          [`&${o}-slide-up-leave${o}-slide-up-leave-active${n}-dropdown-placement-topLeft`]: {
            animationName: ho
          },
          '&-hidden': { display: 'none' },
          '&-empty': { color: e.colorTextDisabled },
          [`${t}-empty`]: C(C({}, Qt(e)), { color: e.colorTextDisabled }),
          [`${t}`]: C(C({}, Qt(e)), {
            cursor: 'pointer',
            transition: `background ${e.motionDurationSlow} ease`,
            borderRadius: e.borderRadiusSM,
            '&-group': {
              color: e.colorTextDescription,
              fontSize: e.fontSizeSM,
              cursor: 'default'
            },
            '&-option': {
              display: 'flex',
              '&-content': C({ flex: 'auto' }, ot),
              '&-state': { flex: 'none' },
              [`&-active:not(${t}-option-disabled)`]: {
                backgroundColor: e.controlItemBgHover
              },
              [`&-selected:not(${t}-option-disabled)`]: {
                color: e.colorText,
                fontWeight: e.fontWeightStrong,
                backgroundColor: e.controlItemBgActive,
                [`${t}-option-state`]: { color: e.colorPrimary }
              },
              '&-disabled': {
                [`&${t}-option-selected`]: {
                  backgroundColor: e.colorBgContainerDisabled
                },
                color: e.colorTextDisabled,
                cursor: 'not-allowed'
              },
              '&-grouped': {
                paddingInlineStart: e.controlPaddingHorizontal * 2
              }
            }
          }),
          '&-rtl': { direction: 'rtl' }
        })
      },
      Vt(e, 'slide-up'),
      Vt(e, 'slide-down'),
      Xt(e, 'move-up'),
      Xt(e, 'move-down')
    ];
  },
  ra = ia,
  Ee = 2;
function Cn(e) {
  let { controlHeightSM: o, controlHeight: n, lineWidth: t } = e;
  const l = (n - o) / 2 - t,
    a = Math.ceil(l / 2);
  return [l, a];
}
function et(e, o) {
  const { componentCls: n, iconCls: t } = e,
    l = `${n}-selection-overflow`,
    a = e.controlHeightSM,
    [i] = Cn(e),
    r = o ? `${n}-${o}` : '';
  return {
    [`${n}-multiple${r}`]: {
      fontSize: e.fontSize,
      [l]: {
        position: 'relative',
        display: 'flex',
        flex: 'auto',
        flexWrap: 'wrap',
        maxWidth: '100%',
        '&-item': {
          flex: 'none',
          alignSelf: 'center',
          maxWidth: '100%',
          display: 'inline-flex'
        }
      },
      [`${n}-selector`]: {
        display: 'flex',
        flexWrap: 'wrap',
        alignItems: 'center',
        padding: `${i - Ee}px ${Ee * 2}px`,
        borderRadius: e.borderRadius,
        [`${n}-show-search&`]: { cursor: 'text' },
        [`${n}-disabled&`]: {
          background: e.colorBgContainerDisabled,
          cursor: 'not-allowed'
        },
        '&:after': {
          display: 'inline-block',
          width: 0,
          margin: `${Ee}px 0`,
          lineHeight: `${a}px`,
          content: '"\\a0"'
        }
      },
      [`
        &${n}-show-arrow ${n}-selector,
        &${n}-allow-clear ${n}-selector
      `]: { paddingInlineEnd: e.fontSizeIcon + e.controlPaddingHorizontal },
      [`${n}-selection-item`]: {
        position: 'relative',
        display: 'flex',
        flex: 'none',
        boxSizing: 'border-box',
        maxWidth: '100%',
        height: a,
        marginTop: Ee,
        marginBottom: Ee,
        lineHeight: `${a - e.lineWidth * 2}px`,
        background: e.colorFillSecondary,
        border: `${e.lineWidth}px solid ${e.colorSplit}`,
        borderRadius: e.borderRadiusSM,
        cursor: 'default',
        transition: `font-size ${e.motionDurationSlow}, line-height ${e.motionDurationSlow}, height ${e.motionDurationSlow}`,
        userSelect: 'none',
        marginInlineEnd: Ee * 2,
        paddingInlineStart: e.paddingXS,
        paddingInlineEnd: e.paddingXS / 2,
        [`${n}-disabled&`]: {
          color: e.colorTextDisabled,
          borderColor: e.colorBorder,
          cursor: 'not-allowed'
        },
        '&-content': {
          display: 'inline-block',
          marginInlineEnd: e.paddingXS / 2,
          overflow: 'hidden',
          whiteSpace: 'pre',
          textOverflow: 'ellipsis'
        },
        '&-remove': C(C({}, tn()), {
          display: 'inline-block',
          color: e.colorIcon,
          fontWeight: 'bold',
          fontSize: 10,
          lineHeight: 'inherit',
          cursor: 'pointer',
          [`> ${t}`]: { verticalAlign: '-0.2em' },
          '&:hover': { color: e.colorIconHover }
        })
      },
      [`${l}-item + ${l}-item`]: {
        [`${n}-selection-search`]: { marginInlineStart: 0 }
      },
      [`${n}-selection-search`]: {
        display: 'inline-flex',
        position: 'relative',
        maxWidth: '100%',
        marginInlineStart: e.inputPaddingHorizontalBase - i,
        '\n          &-input,\n          &-mirror\n        ': {
          height: a,
          fontFamily: e.fontFamily,
          lineHeight: `${a}px`,
          transition: `all ${e.motionDurationSlow}`
        },
        '&-input': { width: '100%', minWidth: 4.1 },
        '&-mirror': {
          position: 'absolute',
          top: 0,
          insetInlineStart: 0,
          insetInlineEnd: 'auto',
          zIndex: 999,
          whiteSpace: 'pre',
          visibility: 'hidden'
        }
      },
      [`${n}-selection-placeholder `]: {
        position: 'absolute',
        top: '50%',
        insetInlineStart: e.inputPaddingHorizontalBase,
        insetInlineEnd: e.inputPaddingHorizontalBase,
        transform: 'translateY(-50%)',
        transition: `all ${e.motionDurationSlow}`
      }
    }
  };
}
function sa(e) {
  const { componentCls: o } = e,
    n = we(e, {
      controlHeight: e.controlHeightSM,
      controlHeightSM: e.controlHeightXS,
      borderRadius: e.borderRadiusSM,
      borderRadiusSM: e.borderRadiusXS
    }),
    [, t] = Cn(e);
  return [
    et(e),
    et(n, 'sm'),
    {
      [`${o}-multiple${o}-sm`]: {
        [`${o}-selection-placeholder`]: {
          insetInlineStart: e.controlPaddingHorizontalSM - e.lineWidth,
          insetInlineEnd: 'auto'
        },
        [`${o}-selection-search`]: { marginInlineStart: t }
      }
    },
    et(
      we(e, {
        fontSize: e.fontSizeLG,
        controlHeight: e.controlHeightLG,
        controlHeightSM: e.controlHeight,
        borderRadius: e.borderRadiusLG,
        borderRadiusSM: e.borderRadius
      }),
      'lg'
    )
  ];
}
function tt(e, o) {
  const { componentCls: n, inputPaddingHorizontalBase: t, borderRadius: l } = e,
    a = e.controlHeight - e.lineWidth * 2,
    i = Math.ceil(e.fontSize * 1.25),
    r = o ? `${n}-${o}` : '';
  return {
    [`${n}-single${r}`]: {
      fontSize: e.fontSize,
      [`${n}-selector`]: C(C({}, rt(e)), {
        display: 'flex',
        borderRadius: l,
        [`${n}-selection-search`]: {
          position: 'absolute',
          top: 0,
          insetInlineStart: t,
          insetInlineEnd: t,
          bottom: 0,
          '&-input': { width: '100%' }
        },
        [`
          ${n}-selection-item,
          ${n}-selection-placeholder
        `]: {
          padding: 0,
          lineHeight: `${a}px`,
          transition: `all ${e.motionDurationSlow}`,
          '@supports (-moz-appearance: meterbar)': { lineHeight: `${a}px` }
        },
        [`${n}-selection-item`]: { position: 'relative', userSelect: 'none' },
        [`${n}-selection-placeholder`]: {
          transition: 'none',
          pointerEvents: 'none'
        },
        [[
          '&:after',
          `${n}-selection-item:after`,
          `${n}-selection-placeholder:after`
        ].join(',')]: {
          display: 'inline-block',
          width: 0,
          visibility: 'hidden',
          content: '"\\a0"'
        }
      }),
      [`
        &${n}-show-arrow ${n}-selection-item,
        &${n}-show-arrow ${n}-selection-placeholder
      `]: { paddingInlineEnd: i },
      [`&${n}-open ${n}-selection-item`]: { color: e.colorTextPlaceholder },
      [`&:not(${n}-customize-input)`]: {
        [`${n}-selector`]: {
          width: '100%',
          height: e.controlHeight,
          padding: `0 ${t}px`,
          [`${n}-selection-search-input`]: { height: a },
          '&:after': { lineHeight: `${a}px` }
        }
      },
      [`&${n}-customize-input`]: {
        [`${n}-selector`]: {
          '&:after': { display: 'none' },
          [`${n}-selection-search`]: { position: 'static', width: '100%' },
          [`${n}-selection-placeholder`]: {
            position: 'absolute',
            insetInlineStart: 0,
            insetInlineEnd: 0,
            padding: `0 ${t}px`,
            '&:after': { display: 'none' }
          }
        }
      }
    }
  };
}
function ua(e) {
  const { componentCls: o } = e,
    n = e.controlPaddingHorizontalSM - e.lineWidth;
  return [
    tt(e),
    tt(
      we(e, {
        controlHeight: e.controlHeightSM,
        borderRadius: e.borderRadiusSM
      }),
      'sm'
    ),
    {
      [`${o}-single${o}-sm`]: {
        [`&:not(${o}-customize-input)`]: {
          [`${o}-selection-search`]: { insetInlineStart: n, insetInlineEnd: n },
          [`${o}-selector`]: { padding: `0 ${n}px` },
          [`&${o}-show-arrow ${o}-selection-search`]: {
            insetInlineEnd: n + e.fontSize * 1.5
          },
          [`
            &${o}-show-arrow ${o}-selection-item,
            &${o}-show-arrow ${o}-selection-placeholder
          `]: { paddingInlineEnd: e.fontSize * 1.5 }
        }
      }
    },
    tt(
      we(e, {
        controlHeight: e.controlHeightLG,
        fontSize: e.fontSizeLG,
        borderRadius: e.borderRadiusLG
      }),
      'lg'
    )
  ];
}
const ca = e => {
    const { componentCls: o } = e;
    return {
      position: 'relative',
      backgroundColor: e.colorBgContainer,
      border: `${e.lineWidth}px ${e.lineType} ${e.colorBorder}`,
      transition: `all ${e.motionDurationMid} ${e.motionEaseInOut}`,
      input: { cursor: 'pointer' },
      [`${o}-show-search&`]: {
        cursor: 'text',
        input: { cursor: 'auto', color: 'inherit' }
      },
      [`${o}-disabled&`]: {
        color: e.colorTextDisabled,
        background: e.colorBgContainerDisabled,
        cursor: 'not-allowed',
        [`${o}-multiple&`]: { background: e.colorBgContainerDisabled },
        input: { cursor: 'not-allowed' }
      }
    };
  },
  nt = function(e, o) {
    let n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !1;
    const {
        componentCls: t,
        borderHoverColor: l,
        outlineColor: a,
        antCls: i
      } = o,
      r = n ? { [`${t}-selector`]: { borderColor: l } } : {};
    return {
      [e]: {
        [`&:not(${t}-disabled):not(${t}-customize-input):not(${i}-pagination-size-changer)`]: C(
          C({}, r),
          {
            [`${t}-focused& ${t}-selector`]: {
              borderColor: l,
              boxShadow: `0 0 0 ${o.controlOutlineWidth}px ${a}`,
              borderInlineEndWidth: `${o.controlLineWidth}px !important`,
              outline: 0
            },
            [`&:hover ${t}-selector`]: {
              borderColor: l,
              borderInlineEndWidth: `${o.controlLineWidth}px !important`
            }
          }
        )
      }
    };
  },
  da = e => {
    const { componentCls: o } = e;
    return {
      [`${o}-selection-search-input`]: {
        margin: 0,
        padding: 0,
        background: 'transparent',
        border: 'none',
        outline: 'none',
        appearance: 'none',
        '&::-webkit-search-cancel-button': {
          display: 'none',
          '-webkit-appearance': 'none'
        }
      }
    };
  },
  fa = e => {
    const { componentCls: o, inputPaddingHorizontalBase: n, iconCls: t } = e;
    return {
      [o]: C(C({}, rt(e)), {
        position: 'relative',
        display: 'inline-block',
        cursor: 'pointer',
        [`&:not(${o}-customize-input) ${o}-selector`]: C(C({}, ca(e)), da(e)),
        [`${o}-selection-item`]: C({ flex: 1, fontWeight: 'normal' }, ot),
        [`${o}-selection-placeholder`]: C(C({}, ot), {
          flex: 1,
          color: e.colorTextPlaceholder,
          pointerEvents: 'none'
        }),
        [`${o}-arrow`]: C(C({}, tn()), {
          position: 'absolute',
          top: '50%',
          insetInlineStart: 'auto',
          insetInlineEnd: n,
          height: e.fontSizeIcon,
          marginTop: -e.fontSizeIcon / 2,
          color: e.colorTextQuaternary,
          fontSize: e.fontSizeIcon,
          lineHeight: 1,
          textAlign: 'center',
          pointerEvents: 'none',
          display: 'flex',
          alignItems: 'center',
          [t]: {
            verticalAlign: 'top',
            transition: `transform ${e.motionDurationSlow}`,
            '> svg': { verticalAlign: 'top' },
            [`&:not(${o}-suffix)`]: { pointerEvents: 'auto' }
          },
          [`${o}-disabled &`]: { cursor: 'not-allowed' },
          '> *:not(:last-child)': { marginInlineEnd: 8 }
        }),
        [`${o}-clear`]: {
          position: 'absolute',
          top: '50%',
          insetInlineStart: 'auto',
          insetInlineEnd: n,
          zIndex: 1,
          display: 'inline-block',
          width: e.fontSizeIcon,
          height: e.fontSizeIcon,
          marginTop: -e.fontSizeIcon / 2,
          color: e.colorTextQuaternary,
          fontSize: e.fontSizeIcon,
          fontStyle: 'normal',
          lineHeight: 1,
          textAlign: 'center',
          textTransform: 'none',
          background: e.colorBgContainer,
          cursor: 'pointer',
          opacity: 0,
          transition: `color ${e.motionDurationMid} ease, opacity ${e.motionDurationSlow} ease`,
          textRendering: 'auto',
          '&:before': { display: 'block' },
          '&:hover': { color: e.colorTextTertiary }
        },
        '&:hover': { [`${o}-clear`]: { opacity: 1 } }
      }),
      [`${o}-has-feedback`]: {
        [`${o}-clear`]: { insetInlineEnd: n + e.fontSize + e.paddingXXS }
      }
    };
  },
  pa = e => {
    const { componentCls: o } = e;
    return [
      {
        [o]: {
          [`&-borderless ${o}-selector`]: {
            backgroundColor: 'transparent !important',
            borderColor: 'transparent !important',
            boxShadow: 'none !important'
          },
          [`&${o}-in-form-item`]: { width: '100%' }
        }
      },
      fa(e),
      ua(e),
      sa(e),
      ra(e),
      { [`${o}-rtl`]: { direction: 'rtl' } },
      nt(
        o,
        we(e, {
          borderHoverColor: e.colorPrimaryHover,
          outlineColor: e.controlOutline
        })
      ),
      nt(
        `${o}-status-error`,
        we(e, {
          borderHoverColor: e.colorErrorHover,
          outlineColor: e.colorErrorOutline
        }),
        !0
      ),
      nt(
        `${o}-status-warning`,
        we(e, {
          borderHoverColor: e.colorWarningHover,
          outlineColor: e.colorWarningOutline
        }),
        !0
      ),
      bo(e, { borderElCls: `${o}-selector`, focusElCls: `${o}-focused` })
    ];
  },
  va = Yn(
    'Select',
    (e, o) => {
      let { rootPrefixCls: n } = o;
      const t = we(e, {
        rootPrefixCls: n,
        inputPaddingHorizontalBase: e.paddingSM - 1
      });
      return [pa(t)];
    },
    e => ({ zIndexPopup: e.zIndexPopupBase + 50 })
  ),
  ma = () =>
    C(
      C(
        {},
        be(yn(), [
          'inputIcon',
          'mode',
          'getInputElement',
          'getRawInputElement',
          'backfill'
        ])
      ),
      {
        value: Ft([Array, Object, String, Number]),
        defaultValue: Ft([Array, Object, String, Number]),
        notFoundContent: z.any,
        suffixIcon: z.any,
        itemIcon: z.any,
        size: _e(),
        mode: _e(),
        bordered: Xn(!0),
        transitionName: String,
        choiceTransitionName: _e(''),
        popupClassName: String,
        dropdownClassName: String,
        placement: _e(),
        status: _e(),
        'onUpdate:value': Qn()
      }
    ),
  qt = 'SECRET_COMBOBOX_MODE_DO_NOT_USE',
  pe = se({
    compatConfig: { MODE: 3 },
    name: 'ASelect',
    Option: Al,
    OptGroup: Bl,
    inheritAttrs: !1,
    props: pt(ma(), { listHeight: 256, listItemHeight: 24 }),
    SECRET_COMBOBOX_MODE_DO_NOT_USE: qt,
    slots: Object,
    setup(e, o) {
      let { attrs: n, emit: t, slots: l, expose: a } = o;
      const i = he(),
        r = rn(),
        d = We.useInject(),
        s = L(() => sn(d.status, e.status)),
        f = () => {
          var j;
          (j = i.value) === null || j === void 0 || j.focus();
        },
        p = () => {
          var j;
          (j = i.value) === null || j === void 0 || j.blur();
        },
        c = j => {
          var ne;
          (ne = i.value) === null || ne === void 0 || ne.scrollTo(j);
        },
        y = L(() => {
          const { mode: j } = e;
          if (j !== 'combobox') return j === qt ? 'combobox' : j;
        });
      yo(
        !e.dropdownClassName,
        'Select',
        '`dropdownClassName` is deprecated. Please use `popupClassName` instead.'
      );
      const {
          prefixCls: h,
          direction: E,
          configProvider: m,
          renderEmpty: O,
          size: P,
          getPrefixCls: I,
          getPopupContainer: M,
          disabled: u,
          select: x
        } = Ve('select', e),
        { compactSize: v, compactItemClassnames: S } = un(h, E),
        $ = L(() => v.value || P.value),
        A = nn(),
        W = L(() => {
          var j;
          return (j = u.value) !== null && j !== void 0 ? j : A.value;
        }),
        [G, N] = va(h),
        V = L(() => I()),
        U = L(() =>
          e.placement !== void 0
            ? e.placement
            : E.value === 'rtl'
            ? 'bottomRight'
            : 'bottomLeft'
        ),
        K = L(() => qn(V.value, Jn(U.value), e.transitionName)),
        k = L(() =>
          te(
            {
              [`${h.value}-lg`]: $.value === 'large',
              [`${h.value}-sm`]: $.value === 'small',
              [`${h.value}-rtl`]: E.value === 'rtl',
              [`${h.value}-borderless`]: !e.bordered,
              [`${h.value}-in-form-item`]: d.isFormItemInput
            },
            Le(h.value, s.value, d.hasFeedback),
            S.value,
            N.value
          )
        ),
        T = function() {
          for (
            var j = arguments.length, ne = new Array(j), ee = 0;
            ee < j;
            ee++
          )
            ne[ee] = arguments[ee];
          t('update:value', ne[0]), t('change', ...ne), r.onFieldChange();
        },
        R = j => {
          t('blur', j), r.onFieldBlur();
        };
      a({ blur: p, focus: f, scrollTo: c });
      const Q = L(() => y.value === 'multiple' || y.value === 'tags'),
        X = L(() =>
          e.showArrow !== void 0
            ? e.showArrow
            : e.loading || !(Q.value || y.value === 'combobox')
        );
      return () => {
        var j, ne, ee, ie;
        const {
            notFoundContent: ce,
            listHeight: D = 256,
            listItemHeight: F = 24,
            popupClassName: g,
            dropdownClassName: w,
            virtual: _,
            dropdownMatchSelectWidth: B,
            id: H = r.id.value,
            placeholder: q = (j = l.placeholder) === null || j === void 0
              ? void 0
              : j.call(l),
            showArrow: ue
          } = e,
          { hasFeedback: oe, feedbackIcon: de } = d;
        let le;
        ce !== void 0
          ? (le = ce)
          : l.notFoundContent
          ? (le = l.notFoundContent())
          : y.value === 'combobox'
          ? (le = null)
          : (le =
              (O == null ? void 0 : O('Select')) ||
              b(Zn, { componentName: 'Select' }, null));
        const {
            suffixIcon: Pe,
            itemIcon: fe,
            removeIcon: Me,
            clearIcon: Ae
          } = jl(
            C(C({}, e), {
              multiple: Q.value,
              prefixCls: h.value,
              hasFeedback: oe,
              feedbackIcon: de,
              showArrow: X.value
            }),
            l
          ),
          Be = be(e, [
            'prefixCls',
            'suffixIcon',
            'itemIcon',
            'removeIcon',
            'clearIcon',
            'size',
            'bordered',
            'status'
          ]),
          Xe = te(
            g || w,
            { [`${h.value}-dropdown-${E.value}`]: E.value === 'rtl' },
            N.value
          );
        return G(
          b(
            Vl,
            Z(
              Z(Z({ ref: i, virtual: _, dropdownMatchSelectWidth: B }, Be), n),
              {},
              {
                showSearch:
                  (ne = e.showSearch) !== null && ne !== void 0
                    ? ne
                    : (ee = x == null ? void 0 : x.value) === null ||
                      ee === void 0
                    ? void 0
                    : ee.showSearch,
                placeholder: q,
                listHeight: D,
                listItemHeight: F,
                mode: y.value,
                prefixCls: h.value,
                direction: E.value,
                inputIcon: Pe,
                menuItemSelectedIcon: fe,
                removeIcon: Me,
                clearIcon: Ae,
                notFoundContent: le,
                class: [k.value, n.class],
                getPopupContainer: M == null ? void 0 : M.value,
                dropdownClassName: Xe,
                onChange: T,
                onBlur: R,
                id: H,
                dropdownRender: Be.dropdownRender || l.dropdownRender,
                transitionName: K.value,
                children:
                  (ie = l.default) === null || ie === void 0
                    ? void 0
                    : ie.call(l),
                tagRender: e.tagRender || l.tagRender,
                optionLabelRender: l.optionLabel,
                maxTagPlaceholder: e.maxTagPlaceholder || l.maxTagPlaceholder,
                showArrow: oe || ue,
                disabled: W.value
              }
            ),
            { option: l.option }
          )
        );
      };
    }
  });
pe.install = function(e) {
  return (
    e.component(pe.name, pe),
    e.component(pe.Option.displayName, pe.Option),
    e.component(pe.OptGroup.displayName, pe.OptGroup),
    e
  );
};
pe.Option;
pe.OptGroup;
const Wa = pe;
function Jt(e) {
  for (var o = 1; o < arguments.length; o++) {
    var n = arguments[o] != null ? Object(arguments[o]) : {},
      t = Object.keys(n);
    typeof Object.getOwnPropertySymbols == 'function' &&
      (t = t.concat(
        Object.getOwnPropertySymbols(n).filter(function(l) {
          return Object.getOwnPropertyDescriptor(n, l).enumerable;
        })
      )),
      t.forEach(function(l) {
        ga(e, l, n[l]);
      });
  }
  return e;
}
function ga(e, o, n) {
  return (
    o in e
      ? Object.defineProperty(e, o, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0
        })
      : (e[o] = n),
    e
  );
}
var xt = function(o, n) {
  var t = Jt({}, o, n.attrs);
  return b(it, Jt({}, t, { icon: Po }), null);
};
xt.displayName = 'EyeInvisibleOutlined';
xt.inheritAttrs = !1;
const ha = xt,
  ba = se({
    name: 'BaseInput',
    inheritAttrs: !1,
    props: So(),
    setup(e, o) {
      let { slots: n, attrs: t } = o;
      const l = he(),
        a = r => {
          var d;
          if (
            !((d = l.value) === null || d === void 0) &&
            d.contains(r.target)
          ) {
            const { triggerFocus: s } = e;
            s == null || s();
          }
        },
        i = () => {
          var r;
          const {
            allowClear: d,
            value: s,
            disabled: f,
            readonly: p,
            handleReset: c,
            suffix: y = n.suffix,
            prefixCls: h
          } = e;
          if (!d) return null;
          const E = !f && !p && s,
            m = `${h}-clear-icon`,
            O =
              ((r = n.clearIcon) === null || r === void 0
                ? void 0
                : r.call(n)) || '*';
          return b(
            'span',
            {
              onClick: c,
              onMousedown: P => P.preventDefault(),
              class: te({ [`${m}-hidden`]: !E, [`${m}-has-suffix`]: !!y }, m),
              role: 'button',
              tabindex: -1
            },
            [O]
          );
        };
      return () => {
        var r, d;
        const {
          focused: s,
          value: f,
          disabled: p,
          allowClear: c,
          readonly: y,
          hidden: h,
          prefixCls: E,
          prefix: m = (r = n.prefix) === null || r === void 0
            ? void 0
            : r.call(n),
          suffix: O = (d = n.suffix) === null || d === void 0
            ? void 0
            : d.call(n),
          addonAfter: P = n.addonAfter,
          addonBefore: I = n.addonBefore,
          inputElement: M,
          affixWrapperClassName: u,
          wrapperClassName: x,
          groupClassName: v
        } = e;
        let S = $e(M, { value: f, hidden: h });
        if (dt({ prefix: m, suffix: O, allowClear: c })) {
          const $ = `${E}-affix-wrapper`,
            A = te(
              $,
              {
                [`${$}-disabled`]: p,
                [`${$}-focused`]: s,
                [`${$}-readonly`]: y,
                [`${$}-input-with-clear-btn`]: O && c && f
              },
              !ze({ addonAfter: P, addonBefore: I }) && t.class,
              u
            ),
            W = (O || c) && b('span', { class: `${E}-suffix` }, [i(), O]);
          S = b(
            'span',
            {
              class: A,
              style: t.style,
              hidden: !ze({ addonAfter: P, addonBefore: I }) && h,
              onMousedown: a,
              ref: l
            },
            [
              m && b('span', { class: `${E}-prefix` }, [m]),
              $e(M, { style: null, value: f, hidden: null }),
              W
            ]
          );
        }
        if (ze({ addonAfter: P, addonBefore: I })) {
          const $ = `${E}-group`,
            A = `${$}-addon`,
            W = te(`${E}-wrapper`, $, x),
            G = te(`${E}-group-wrapper`, t.class, v);
          return b('span', { class: G, style: t.style, hidden: h }, [
            b('span', { class: W }, [
              I && b('span', { class: A }, [I]),
              $e(S, { style: null, hidden: null }),
              P && b('span', { class: A }, [P])
            ])
          ]);
        }
        return S;
      };
    }
  });
var ya =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
const Sa = se({
  name: 'VCInput',
  inheritAttrs: !1,
  props: wo(),
  setup(e, o) {
    let { slots: n, attrs: t, expose: l, emit: a } = o;
    const i = J(e.value === void 0 ? e.defaultValue : e.value),
      r = J(!1),
      d = J();
    ae(
      () => e.value,
      () => {
        i.value = e.value;
      }
    ),
      ae(
        () => e.disabled,
        () => {
          e.disabled && (r.value = !1);
        }
      );
    const s = v => {
      d.value && Co(d.value, v);
    };
    l({
      focus: s,
      blur: () => {
        var v;
        (v = d.value) === null || v === void 0 || v.blur();
      },
      input: d,
      stateValue: i,
      setSelectionRange: (v, S, $) => {
        var A;
        (A = d.value) === null || A === void 0 || A.setSelectionRange(v, S, $);
      },
      select: () => {
        var v;
        (v = d.value) === null || v === void 0 || v.select();
      }
    });
    const y = v => {
        a('change', v);
      },
      h = ln(),
      E = (v, S) => {
        i.value !== v &&
          (e.value === void 0
            ? (i.value = v)
            : Oe(() => {
                d.value.value !== i.value && h.update();
              }),
          Oe(() => {
            S && S();
          }));
      },
      m = v => {
        const { value: S, composing: $ } = v.target;
        if (((v.isComposing || $) && e.lazy) || i.value === S) return;
        const A = v.target.value;
        Bt(d.value, v, y), E(A);
      },
      O = v => {
        v.keyCode === 13 && a('pressEnter', v), a('keydown', v);
      },
      P = v => {
        (r.value = !0), a('focus', v);
      },
      I = v => {
        (r.value = !1), a('blur', v);
      },
      M = v => {
        Bt(d.value, v, y),
          E('', () => {
            s();
          });
      },
      u = () => {
        var v, S;
        const {
            addonBefore: $ = n.addonBefore,
            addonAfter: A = n.addonAfter,
            disabled: W,
            valueModifiers: G = {},
            htmlSize: N,
            autocomplete: V,
            prefixCls: U,
            inputClassName: K,
            prefix: k = (v = n.prefix) === null || v === void 0
              ? void 0
              : v.call(n),
            suffix: T = (S = n.suffix) === null || S === void 0
              ? void 0
              : S.call(n),
            allowClear: R,
            type: Q = 'text'
          } = e,
          X = be(e, [
            'prefixCls',
            'onPressEnter',
            'addonBefore',
            'addonAfter',
            'prefix',
            'suffix',
            'allowClear',
            'defaultValue',
            'size',
            'bordered',
            'htmlSize',
            'lazy',
            'showCount',
            'valueModifiers',
            'showCount',
            'affixWrapperClassName',
            'groupClassName',
            'inputClassName',
            'wrapperClassName'
          ]),
          j = C(C(C({}, X), t), {
            autocomplete: V,
            onChange: m,
            onInput: m,
            onFocus: P,
            onBlur: I,
            onKeydown: O,
            class: te(
              U,
              { [`${U}-disabled`]: W },
              K,
              !ze({ addonAfter: A, addonBefore: $ }) &&
                !dt({ prefix: k, suffix: T, allowClear: R }) &&
                t.class
            ),
            ref: d,
            key: 'ant-input',
            size: N,
            type: Q
          });
        G.lazy && delete j.onInput, j.autofocus || delete j.autofocus;
        const ne = b('input', be(j, ['size']), null);
        return on(ne, [[an]]);
      },
      x = () => {
        var v;
        const {
            maxlength: S,
            suffix: $ = (v = n.suffix) === null || v === void 0
              ? void 0
              : v.call(n),
            showCount: A,
            prefixCls: W
          } = e,
          G = Number(S) > 0;
        if ($ || A) {
          const N = [...At(i.value)].length,
            V =
              typeof A == 'object'
                ? A.formatter({ count: N, maxlength: S })
                : `${N}${G ? ` / ${S}` : ''}`;
          return b(Te, null, [
            !!A &&
              b(
                'span',
                {
                  class: te(`${W}-show-count-suffix`, {
                    [`${W}-show-count-has-suffix`]: !!$
                  })
                },
                [V]
              ),
            $
          ]);
        }
        return null;
      };
    return (
      ve(() => {}),
      () => {
        const { prefixCls: v, disabled: S } = e,
          $ = ya(e, ['prefixCls', 'disabled']);
        return b(
          ba,
          Z(
            Z(Z({}, $), t),
            {},
            {
              prefixCls: v,
              inputElement: u(),
              handleReset: M,
              value: At(i.value),
              focused: r.value,
              triggerFocus: s,
              suffix: x(),
              disabled: S
            }
          ),
          n
        );
      }
    );
  }
});
var wa =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
const re = se({
    compatConfig: { MODE: 3 },
    name: 'AInput',
    inheritAttrs: !1,
    props: ft(),
    setup(e, o) {
      let { slots: n, attrs: t, expose: l, emit: a } = o;
      const i = he(),
        r = rn(),
        d = We.useInject(),
        s = L(() => sn(d.status, e.status)),
        { direction: f, prefixCls: p, size: c, autocomplete: y } = Ve(
          'input',
          e
        ),
        { compactSize: h, compactItemClassnames: E } = un(p, f),
        m = L(() => h.value || c.value),
        [O, P] = cn(p),
        I = nn();
      l({
        focus: N => {
          var V;
          (V = i.value) === null || V === void 0 || V.focus(N);
        },
        blur: () => {
          var N;
          (N = i.value) === null || N === void 0 || N.blur();
        },
        input: i,
        setSelectionRange: (N, V, U) => {
          var K;
          (K = i.value) === null ||
            K === void 0 ||
            K.setSelectionRange(N, V, U);
        },
        select: () => {
          var N;
          (N = i.value) === null || N === void 0 || N.select();
        }
      });
      const S = he([]),
        $ = () => {
          S.value.push(
            setTimeout(() => {
              var N, V, U, K;
              !((N = i.value) === null || N === void 0) &&
                N.input &&
                ((V = i.value) === null || V === void 0
                  ? void 0
                  : V.input.getAttribute('type')) === 'password' &&
                !((U = i.value) === null || U === void 0) &&
                  U.input.hasAttribute('value') &&
                ((K = i.value) === null ||
                  K === void 0 ||
                  K.input.removeAttribute('value'));
            })
          );
        };
      ve(() => {
        $();
      }),
        oo(() => {
          S.value.forEach(N => clearTimeout(N));
        }),
        De(() => {
          S.value.forEach(N => clearTimeout(N));
        });
      const A = N => {
          $(), a('blur', N), r.onFieldBlur();
        },
        W = N => {
          $(), a('focus', N);
        },
        G = N => {
          a('update:value', N.target.value),
            a('change', N),
            a('input', N),
            r.onFieldChange();
        };
      return () => {
        var N, V, U, K, k, T;
        const { hasFeedback: R, feedbackIcon: Q } = d,
          {
            allowClear: X,
            bordered: j = !0,
            prefix: ne = (N = n.prefix) === null || N === void 0
              ? void 0
              : N.call(n),
            suffix: ee = (V = n.suffix) === null || V === void 0
              ? void 0
              : V.call(n),
            addonAfter: ie = (U = n.addonAfter) === null || U === void 0
              ? void 0
              : U.call(n),
            addonBefore: ce = (K = n.addonBefore) === null || K === void 0
              ? void 0
              : K.call(n),
            id: D = (k = r.id) === null || k === void 0 ? void 0 : k.value
          } = e,
          F = wa(e, [
            'allowClear',
            'bordered',
            'prefix',
            'suffix',
            'addonAfter',
            'addonBefore',
            'id'
          ]),
          g = (R || ee) && b(Te, null, [ee, R && Q]),
          w = p.value,
          _ = dt({ prefix: ne, suffix: ee }) || !!R,
          B = n.clearIcon || (() => b(en, null, null));
        return O(
          b(
            Sa,
            Z(
              Z(Z({}, t), be(F, ['onUpdate:value', 'onChange', 'onInput'])),
              {},
              {
                onChange: G,
                id: D,
                disabled:
                  (T = e.disabled) !== null && T !== void 0 ? T : I.value,
                ref: i,
                prefixCls: w,
                autocomplete: y.value,
                onBlur: A,
                onFocus: W,
                prefix: ne,
                suffix: g,
                allowClear: X,
                addonAfter:
                  ie &&
                  b(Ht, null, {
                    default: () => [b(Lt, null, { default: () => [ie] })]
                  }),
                addonBefore:
                  ce &&
                  b(Ht, null, {
                    default: () => [b(Lt, null, { default: () => [ce] })]
                  }),
                class: [t.class, E.value],
                inputClassName: te(
                  {
                    [`${w}-sm`]: m.value === 'small',
                    [`${w}-lg`]: m.value === 'large',
                    [`${w}-rtl`]: f.value === 'rtl',
                    [`${w}-borderless`]: !j
                  },
                  !_ && Le(w, s.value),
                  P.value
                ),
                affixWrapperClassName: te(
                  {
                    [`${w}-affix-wrapper-sm`]: m.value === 'small',
                    [`${w}-affix-wrapper-lg`]: m.value === 'large',
                    [`${w}-affix-wrapper-rtl`]: f.value === 'rtl',
                    [`${w}-affix-wrapper-borderless`]: !j
                  },
                  Le(`${w}-affix-wrapper`, s.value, R),
                  P.value
                ),
                wrapperClassName: te(
                  { [`${w}-group-rtl`]: f.value === 'rtl' },
                  P.value
                ),
                groupClassName: te(
                  {
                    [`${w}-group-wrapper-sm`]: m.value === 'small',
                    [`${w}-group-wrapper-lg`]: m.value === 'large',
                    [`${w}-group-wrapper-rtl`]: f.value === 'rtl'
                  },
                  Le(`${w}-group-wrapper`, s.value, R),
                  P.value
                )
              }
            ),
            C(C({}, n), { clearIcon: B })
          )
        );
      };
    }
  }),
  Ca = se({
    compatConfig: { MODE: 3 },
    name: 'AInputGroup',
    inheritAttrs: !1,
    props: {
      prefixCls: String,
      size: { type: String },
      compact: { type: Boolean, default: void 0 }
    },
    setup(e, o) {
      let { slots: n, attrs: t } = o;
      const { prefixCls: l, direction: a, getPrefixCls: i } = Ve(
          'input-group',
          e
        ),
        r = We.useInject();
      We.useProvide(r, { isFormItemInput: !1 });
      const d = L(() => i('input')),
        [s, f] = cn(d),
        p = L(() => {
          const c = l.value;
          return {
            [`${c}`]: !0,
            [f.value]: !0,
            [`${c}-lg`]: e.size === 'large',
            [`${c}-sm`]: e.size === 'small',
            [`${c}-compact`]: e.compact,
            [`${c}-rtl`]: a.value === 'rtl'
          };
        });
      return () => {
        var c;
        return s(
          b('span', Z(Z({}, t), {}, { class: te(p.value, t.class) }), [
            (c = n.default) === null || c === void 0 ? void 0 : c.call(n)
          ])
        );
      };
    }
  });
var xa =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
const Ia = se({
  compatConfig: { MODE: 3 },
  name: 'AInputSearch',
  inheritAttrs: !1,
  props: C(C({}, ft()), {
    inputPrefixCls: String,
    enterButton: z.any,
    onSearch: { type: Function }
  }),
  setup(e, o) {
    let { slots: n, attrs: t, expose: l, emit: a } = o;
    const i = J(),
      r = J(!1);
    l({
      focus: () => {
        var u;
        (u = i.value) === null || u === void 0 || u.focus();
      },
      blur: () => {
        var u;
        (u = i.value) === null || u === void 0 || u.blur();
      }
    });
    const f = u => {
        a('update:value', u.target.value),
          u && u.target && u.type === 'click' && a('search', u.target.value, u),
          a('change', u);
      },
      p = u => {
        var x;
        document.activeElement ===
          ((x = i.value) === null || x === void 0 ? void 0 : x.input) &&
          u.preventDefault();
      },
      c = u => {
        var x, v;
        a(
          'search',
          (v = (x = i.value) === null || x === void 0 ? void 0 : x.input) ===
            null || v === void 0
            ? void 0
            : v.stateValue,
          u
        );
      },
      y = u => {
        r.value || e.loading || c(u);
      },
      h = u => {
        (r.value = !0), a('compositionstart', u);
      },
      E = u => {
        (r.value = !1), a('compositionend', u);
      },
      { prefixCls: m, getPrefixCls: O, direction: P, size: I } = Ve(
        'input-search',
        e
      ),
      M = L(() => O('input', e.inputPrefixCls));
    return () => {
      var u, x, v, S;
      const {
          disabled: $,
          loading: A,
          addonAfter: W = (u = n.addonAfter) === null || u === void 0
            ? void 0
            : u.call(n),
          suffix: G = (x = n.suffix) === null || x === void 0
            ? void 0
            : x.call(n)
        } = e,
        N = xa(e, ['disabled', 'loading', 'addonAfter', 'suffix']);
      let {
        enterButton: V = (S =
          (v = n.enterButton) === null || v === void 0 ? void 0 : v.call(n)) !==
          null && S !== void 0
          ? S
          : !1
      } = e;
      V = V || V === '';
      const U = typeof V == 'boolean' ? b(Sn, null, null) : null,
        K = `${m.value}-button`,
        k = Array.isArray(V) ? V[0] : V;
      let T;
      const R = k.type && ql(k.type) && k.type.__ANT_BUTTON;
      if (R || k.tagName === 'button')
        T = $e(
          k,
          C(
            { onMousedown: p, onClick: c, key: 'enterButton' },
            R ? { class: K, size: I.value } : {}
          ),
          !1
        );
      else {
        const X = U && !V;
        T = b(
          xo,
          {
            class: K,
            type: V ? 'primary' : void 0,
            size: I.value,
            disabled: $,
            key: 'enterButton',
            onMousedown: p,
            onClick: c,
            loading: A,
            icon: X ? U : null
          },
          { default: () => [X ? null : U || V] }
        );
      }
      W && (T = [T, W]);
      const Q = te(
        m.value,
        {
          [`${m.value}-rtl`]: P.value === 'rtl',
          [`${m.value}-${I.value}`]: !!I.value,
          [`${m.value}-with-button`]: !!V
        },
        t.class
      );
      return b(
        re,
        Z(
          Z(
            Z({ ref: i }, be(N, ['onUpdate:value', 'onSearch', 'enterButton'])),
            t
          ),
          {},
          {
            onPressEnter: y,
            onCompositionstart: h,
            onCompositionend: E,
            size: I.value,
            prefixCls: M.value,
            addonAfter: T,
            suffix: G,
            onChange: f,
            class: Q,
            disabled: $
          }
        ),
        n
      );
    };
  }
});
var Oa =
  (globalThis && globalThis.__rest) ||
  function(e, o) {
    var n = {};
    for (var t in e)
      Object.prototype.hasOwnProperty.call(e, t) &&
        o.indexOf(t) < 0 &&
        (n[t] = e[t]);
    if (e != null && typeof Object.getOwnPropertySymbols == 'function')
      for (var l = 0, t = Object.getOwnPropertySymbols(e); l < t.length; l++)
        o.indexOf(t[l]) < 0 &&
          Object.prototype.propertyIsEnumerable.call(e, t[l]) &&
          (n[t[l]] = e[t[l]]);
    return n;
  };
const $a = { click: 'onClick', hover: 'onMouseover' },
  Ta = e => (e ? b(Io, null, null) : b(ha, null, null)),
  Pa = se({
    compatConfig: { MODE: 3 },
    name: 'AInputPassword',
    inheritAttrs: !1,
    props: C(C({}, ft()), {
      prefixCls: String,
      inputPrefixCls: String,
      action: { type: String, default: 'click' },
      visibilityToggle: { type: Boolean, default: !0 },
      visible: { type: Boolean, default: void 0 },
      'onUpdate:visible': Function,
      iconRender: Function
    }),
    setup(e, o) {
      let { slots: n, attrs: t, expose: l, emit: a } = o;
      const i = J(!1),
        r = () => {
          const { disabled: m } = e;
          m || ((i.value = !i.value), a('update:visible', i.value));
        };
      Ie(() => {
        e.visible !== void 0 && (i.value = !!e.visible);
      });
      const d = J();
      l({
        focus: () => {
          var m;
          (m = d.value) === null || m === void 0 || m.focus();
        },
        blur: () => {
          var m;
          (m = d.value) === null || m === void 0 || m.blur();
        }
      });
      const p = m => {
          const { action: O, iconRender: P = n.iconRender || Ta } = e,
            I = $a[O] || '',
            M = P(i.value),
            u = {
              [I]: r,
              class: `${m}-icon`,
              key: 'passwordIcon',
              onMousedown: x => {
                x.preventDefault();
              },
              onMouseup: x => {
                x.preventDefault();
              }
            };
          return $e(Re(M) ? M : b('span', null, [M]), u);
        },
        { prefixCls: c, getPrefixCls: y } = Ve('input-password', e),
        h = L(() => y('input', e.inputPrefixCls)),
        E = () => {
          const { size: m, visibilityToggle: O } = e,
            P = Oa(e, ['size', 'visibilityToggle']),
            I = O && p(c.value),
            M = te(c.value, t.class, { [`${c.value}-${m}`]: !!m }),
            u = C(C(C({}, be(P, ['suffix', 'iconRender', 'action'])), t), {
              type: i.value ? 'text' : 'password',
              class: M,
              prefixCls: h.value,
              suffix: I
            });
          return m && (u.size = m), b(re, Z({ ref: d }, u), n);
        };
      return () => E();
    }
  });
re.Group = Ca;
re.Search = Ia;
re.TextArea = Oo;
re.Password = Pa;
re.install = function(e) {
  return (
    e.component(re.name, re),
    e.component(re.Group.name, re.Group),
    e.component(re.Search.name, re.Search),
    e.component(re.TextArea.name, re.TextArea),
    e.component(re.Password.name, re.Password),
    e
  );
};
export {
  Ll as D,
  Ia as I,
  hl as L,
  Wa as S,
  re as a,
  Sn as b,
  Xt as i,
  ma as s
};

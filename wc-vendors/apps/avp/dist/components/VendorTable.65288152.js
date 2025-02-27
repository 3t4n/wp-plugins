import {
  g as R,
  m as W,
  _ as w,
  r as A,
  w as Q,
  u as j,
  f as F,
  a as L,
  b as u,
  c as P,
  d as O
} from '../main.4e11cfe3.js';
import {
  d as C,
  e as S,
  c as r,
  K as M,
  o as T,
  L as D,
  M as $,
  N as g,
  u as e,
  O as b,
  P as x,
  F as G,
  a as K,
  w as f,
  b as U
} from '../common/vendor.e5025a5c.js';
import { u as I, S as k } from '../common/VendorStore.76a5f248.js';
import { P as X, T as Y } from '../common/index.078f4788.js';
import { C as z, R as B } from '../common/index.ff501c81.js';
import { I as q } from '../common/index.a5a3d068.js';
import '../common/antd.e3fbf92b.js';
import '../common/initDefaultProps.d90010a5.js';
import '../common/index.f3d5a503.js';
import '../common/responsiveObserve.feb6262f.js';
const J = t => {
    const {
      componentCls: n,
      sizePaddingEdgeHorizontal: a,
      colorSplit: o,
      lineWidth: i
    } = t;
    return {
      [n]: w(w({}, A(t)), {
        borderBlockStart: `${i}px solid ${o}`,
        '&-vertical': {
          position: 'relative',
          top: '-0.06em',
          display: 'inline-block',
          height: '0.9em',
          margin: `0 ${t.dividerVerticalGutterMargin}px`,
          verticalAlign: 'middle',
          borderTop: 0,
          borderInlineStart: `${i}px solid ${o}`
        },
        '&-horizontal': {
          display: 'flex',
          clear: 'both',
          width: '100%',
          minWidth: '100%',
          margin: `${t.dividerHorizontalGutterMargin}px 0`
        },
        [`&-horizontal${n}-with-text`]: {
          display: 'flex',
          alignItems: 'center',
          margin: `${t.dividerHorizontalWithTextGutterMargin}px 0`,
          color: t.colorTextHeading,
          fontWeight: 500,
          fontSize: t.fontSizeLG,
          whiteSpace: 'nowrap',
          textAlign: 'center',
          borderBlockStart: `0 ${o}`,
          '&::before, &::after': {
            position: 'relative',
            width: '50%',
            borderBlockStart: `${i}px solid transparent`,
            borderBlockStartColor: 'inherit',
            borderBlockEnd: 0,
            transform: 'translateY(50%)',
            content: "''"
          }
        },
        [`&-horizontal${n}-with-text-left`]: {
          '&::before': { width: '5%' },
          '&::after': { width: '95%' }
        },
        [`&-horizontal${n}-with-text-right`]: {
          '&::before': { width: '95%' },
          '&::after': { width: '5%' }
        },
        [`${n}-inner-text`]: { display: 'inline-block', padding: '0 1em' },
        '&-dashed': {
          background: 'none',
          borderColor: o,
          borderStyle: 'dashed',
          borderWidth: `${i}px 0 0`
        },
        [`&-horizontal${n}-with-text${n}-dashed`]: {
          '&::before, &::after': { borderStyle: 'dashed none none' }
        },
        [`&-vertical${n}-dashed`]: {
          borderInlineStart: i,
          borderInlineEnd: 0,
          borderBlockStart: 0,
          borderBlockEnd: 0
        },
        [`&-plain${n}-with-text`]: {
          color: t.colorText,
          fontWeight: 'normal',
          fontSize: t.fontSize
        },
        [`&-horizontal${n}-with-text-left${n}-no-default-orientation-margin-left`]: {
          '&::before': { width: 0 },
          '&::after': { width: '100%' },
          [`${n}-inner-text`]: { paddingInlineStart: a }
        },
        [`&-horizontal${n}-with-text-right${n}-no-default-orientation-margin-right`]: {
          '&::before': { width: '100%' },
          '&::after': { width: 0 },
          [`${n}-inner-text`]: { paddingInlineEnd: a }
        }
      })
    };
  },
  Z = R(
    'Divider',
    t => {
      const n = W(t, {
        dividerVerticalGutterMargin: t.marginXS,
        dividerHorizontalWithTextGutterMargin: t.margin,
        dividerHorizontalGutterMargin: t.marginLG
      });
      return [J(n)];
    },
    { sizePaddingEdgeHorizontal: 0 }
  ),
  ee = () => ({
    prefixCls: String,
    type: { type: String, default: 'horizontal' },
    dashed: { type: Boolean, default: !1 },
    orientation: { type: String, default: 'center' },
    plain: { type: Boolean, default: !1 },
    orientationMargin: [String, Number]
  }),
  te = C({
    name: 'ADivider',
    inheritAttrs: !1,
    compatConfig: { MODE: 3 },
    props: ee(),
    setup(t, n) {
      let { slots: a, attrs: o } = n;
      const { prefixCls: i, direction: d } = j('divider', t),
        [l, p] = Z(i),
        c = S(() => t.orientation === 'left' && t.orientationMargin != null),
        s = S(() => t.orientation === 'right' && t.orientationMargin != null),
        m = S(() => {
          const { type: v, dashed: y, plain: N } = t,
            h = i.value;
          return {
            [h]: !0,
            [p.value]: !!p.value,
            [`${h}-${v}`]: !0,
            [`${h}-dashed`]: !!y,
            [`${h}-plain`]: !!N,
            [`${h}-rtl`]: d.value === 'rtl',
            [`${h}-no-default-orientation-margin-left`]: c.value,
            [`${h}-no-default-orientation-margin-right`]: s.value
          };
        }),
        _ = S(() => {
          const v =
            typeof t.orientationMargin == 'number'
              ? `${t.orientationMargin}px`
              : t.orientationMargin;
          return w(
            w({}, c.value && { marginLeft: v }),
            s.value && { marginRight: v }
          );
        }),
        H = S(() =>
          t.orientation.length > 0 ? '-' + t.orientation : t.orientation
        );
      return () => {
        var v;
        const y = F(
          (v = a.default) === null || v === void 0 ? void 0 : v.call(a)
        );
        return l(
          r(
            'div',
            L(
              L({}, o),
              {},
              {
                class: [
                  m.value,
                  y.length
                    ? `${i.value}-with-text ${i.value}-with-text${H.value}`
                    : '',
                  o.class
                ],
                role: 'separator'
              }
            ),
            [
              y.length
                ? r(
                    'span',
                    { class: `${i.value}-inner-text`, style: _.value },
                    [y]
                  )
                : null
            ]
          )
        );
      };
    }
  }),
  V = Q(te),
  ne = ['title'],
  ie = ['title'],
  ae = ['title'],
  re = ['title'],
  oe = C({
    __name: 'NavigationLinks',
    setup(t) {
      const n = I(),
        { vendorsCount: a } = M(n),
        o = d => (n.vendorsQueryParams.status === d ? 'active' : ''),
        i = d => {
          n.navigationFilter(d);
        };
      return (d, l) => {
        var p, c, s, m;
        return (
          T(),
          D(
            G,
            null,
            [
              $(
                'a',
                {
                  href: '#',
                  onClick: l[0] || (l[0] = b(_ => i(''), ['prevent'])),
                  type: 'primary',
                  title: e(u)('allVendor'),
                  class: x(o(''))
                },
                g(e(u)('allVendor')) +
                  ' (' +
                  g((p = e(a)) == null ? void 0 : p.vendor) +
                  ')',
                11,
                ne
              ),
              r(e(V), { type: 'vertical' }),
              $(
                'a',
                {
                  href: '#',
                  onClick: l[1] || (l[1] = b(_ => i('pending'), ['prevent'])),
                  type: 'primary',
                  title: e(u)('pendingVendor'),
                  class: x(o('pending'))
                },
                g(e(u)('pendingVendor')) +
                  ' (' +
                  g((c = e(a)) == null ? void 0 : c.pending) +
                  ')',
                11,
                ie
              ),
              r(e(V), { type: 'vertical' }),
              $(
                'a',
                {
                  href: '#',
                  onClick: l[2] || (l[2] = b(_ => i('active'), ['prevent'])),
                  type: 'primary',
                  title: e(u)('active'),
                  class: x(o('active'))
                },
                g(e(u)('active')) +
                  ' (' +
                  g((s = e(a)) == null ? void 0 : s.active) +
                  ')',
                11,
                ae
              ),
              r(e(V), { type: 'vertical' }),
              $(
                'a',
                {
                  href: '#',
                  onClick: l[3] || (l[3] = b(_ => i('inactive'), ['prevent'])),
                  type: 'primary',
                  title: e(u)('inactive'),
                  class: x(o('inactive'))
                },
                g(e(u)('inactive')) +
                  ' (' +
                  g((m = e(a)) == null ? void 0 : m.inactive) +
                  ')',
                11,
                re
              )
            ],
            64
          )
        );
      };
    }
  });
const le = P(oe, [
    ['__scopeId', 'data-v-02a14f9c'],
    [
      '__file',
      '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/VendorTable/NavigationLinks.vue'
    ]
  ]),
  se = C({
    __name: 'Pagination',
    setup(t) {
      const n = I(),
        { vendorsQueryParams: a, resultCount: o } = M(n),
        i = (l, p) => {
          n.$patch({ vendorsQueryParams: { page: l, limit: p } }),
            n.fetchVendors();
        },
        d = ['5', '10', '15', '20', '50', '100'];
      return (l, p) => (
        T(),
        K(
          e(X),
          {
            total: e(o),
            current: e(a).page,
            pageSize: e(a).limit,
            onChange: i,
            showSizeChanger: !0,
            pageSizeOptions: d
          },
          null,
          8,
          ['total', 'current', 'pageSize']
        )
      );
    }
  }),
  E = P(se, [
    [
      '__file',
      '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/VendorTable/Pagination.vue'
    ]
  ]),
  de = C({
    __name: 'VendorTable',
    setup(t) {
      const n = U(() =>
          O(
            () => import('./VendorTable/VendorTableCell.45d724bf.js'),
            [
              window.wcv_avp.pluginDirUrl +
                '/dist/components/VendorTable/VendorTableCell.45d724bf.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/vendor.e5025a5c.js',
              window.wcv_avp.pluginDirUrl + '/dist/main.4e11cfe3.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/antd.e3fbf92b.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/VendorStore.76a5f248.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/common/initDefaultProps.d90010a5.js',
              window.wcv_avp.pluginDirUrl + '/dist/common/index.26871545.js',
              window.wcv_avp.pluginDirUrl +
                '/dist/assets/VendorTableCell-18f63230.css'
            ],
            import.meta.url
          )
        ),
        a = I(),
        { tableColumns: o, onLoading: i, vendors: d } = M(a);
      return (
        (async () => {
          await a.fetchVendors();
        })(),
        (p, c) => (
          T(),
          D(
            G,
            null,
            [
              r(
                e(B),
                { type: 'flex', justify: 'space-between', align: 'middle' },
                {
                  default: f(() => [
                    r(
                      e(z),
                      { id: 'navigation-links' },
                      { default: f(() => [r(le)]), _: 1 }
                    ),
                    r(e(z), null, {
                      default: f(() => [
                        r(
                          e(k),
                          { direction: 'horizontal', align: 'start' },
                          {
                            default: f(() => [
                              r(
                                e(q),
                                {
                                  placeholder: e(u)('searchPlacehoder'),
                                  value: e(a).vendorsQueryParams.search,
                                  'onUpdate:value':
                                    c[0] ||
                                    (c[0] = s =>
                                      (e(a).vendorsQueryParams.search = s)),
                                  onSearch:
                                    c[1] || (c[1] = s => e(a).onSearch())
                                },
                                null,
                                8,
                                ['placeholder', 'value']
                              ),
                              r(E)
                            ]),
                            _: 1
                          }
                        )
                      ]),
                      _: 1
                    })
                  ]),
                  _: 1
                }
              ),
              r(
                e(Y),
                {
                  columns: e(o),
                  'data-source': e(d),
                  pagination: !1,
                  bordered: !0,
                  loading: e(i),
                  rowKey: s => s.id
                },
                {
                  bodyCell: f(({ record: s, column: m }) => [
                    r(e(n), { record: s, column: m }, null, 8, [
                      'record',
                      'column'
                    ])
                  ]),
                  _: 1
                },
                8,
                ['columns', 'data-source', 'loading', 'rowKey']
              ),
              r(
                e(B),
                {
                  type: 'flex',
                  justify: 'end',
                  style: { 'margin-top': '0.5em' }
                },
                {
                  default: f(() => [
                    r(e(z), null, {
                      default: f(() => [
                        r(
                          e(k),
                          { direction: 'horizontal', align: 'start' },
                          { default: f(() => [r(E)]), _: 1 }
                        )
                      ]),
                      _: 1
                    })
                  ]),
                  _: 1
                }
              )
            ],
            64
          )
        )
      );
    }
  });
const Se = P(de, [
  ['__scopeId', 'data-v-34183064'],
  [
    '__file',
    '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/VendorTable.vue'
  ]
]);
export { Se as default };

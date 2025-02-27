import {
  d as E,
  K,
  r as P,
  o as a,
  a as u,
  w as c,
  u as e,
  c as m,
  Y as y,
  L as d,
  F as v,
  Z as k,
  N as g
} from '../common/vendor.e5025a5c.js';
import { V as R, b as h, c as $ } from '../main.4e11cfe3.js';
import { J as w, S as j } from '../common/VendorStore.76a5f248.js';
import { x as A, y as D, t as F, w as J } from '../common/antd.e3fbf92b.js';
import { S as O } from '../common/index.a5a3d068.js';
import { P as Y } from '../common/index.26871545.js';
import { S as Z } from '../common/DynamicControl.682f269f.js';
import { T as q } from '../common/index.078f4788.js';
import '../common/initDefaultProps.d90010a5.js';
import '../common/VendorEdit.a89160bf.js';
import '../common/index.f3d5a503.js';
import '../common/responsiveObserve.feb6262f.js';
const G = E({
    __name: 'OpeningHours',
    setup(M) {
      var x, C, S;
      const T = R(),
        H = window.wcv_avp.opening_times,
        _ = window.wcv_avp.opening_days,
        { vendorSettings: p, openingHoursColumns: U } = K(T);
      p.value.store_opening_hours = Array.isArray(
        (x = p.value) == null ? void 0 : x.store_opening_hours
      )
        ? (C = p.value) == null
          ? void 0
          : C.store_opening_hours
        : [];
      const I = (S = p.value) == null ? void 0 : S.store_opening_hours,
        V = h('confirmRemove'),
        l = P([]),
        f = H.map(o => {
          let n = Object.keys(o);
          return { value: n[0], label: o[n[0]] };
        }),
        N = Object.keys(_).map(o => ({ value: o, label: _[o] })),
        B = o => {
          l.value.indexOf(o) === -1
            ? l.value.push(o)
            : l.value.splice(l.value.indexOf(o), 1);
        },
        L = o => {
          var n, t;
          (t = (n = p.value) == null ? void 0 : n.store_opening_hours) ==
            null || t.splice(o, 1);
        },
        z = () => {
          var o, n, t, s;
          (n = (o = p.value) == null ? void 0 : o.store_opening_hours) ==
            null ||
            n.push({
              day: 'sunday',
              open: '00:00',
              close: '23:30',
              status: '1'
            }),
            l.value.push(
              ((s = (t = p.value) == null ? void 0 : t.store_opening_hours) ==
              null
                ? void 0
                : s.length) - 1
            );
        },
        b = o => {
          let n = f.find(s => s.value === o);
          return n ? n.label : '';
        };
      return (o, n) => (
        a(),
        u(
          e(q),
          {
            columns: e(U),
            dataSource: e(I),
            pagination: !1,
            rowKey: t => t.day,
            bordered: '',
            tableLayout: 'auto'
          },
          {
            headerCell: c(({ column: t }) => [
              t.dataIndex === 'actions'
                ? (a(),
                  u(
                    e(w),
                    {
                      key: 0,
                      type: 'primary',
                      size: 'middle',
                      onClick: n[0] || (n[0] = s => z())
                    },
                    { default: c(() => [m(e(A))]), _: 1 }
                  ))
                : y('v-if', !0)
            ]),
            bodyCell: c(({ record: t, column: s, index: r }) => [
              s.dataIndex === 'day'
                ? (a(),
                  d(
                    v,
                    { key: 0 },
                    [
                      l.value.includes(r)
                        ? (a(),
                          u(
                            e(O),
                            {
                              key: 0,
                              options: e(N),
                              value: t.day,
                              'onUpdate:value': i => (t.day = i),
                              style: { width: '100px' }
                            },
                            null,
                            8,
                            ['options', 'value', 'onUpdate:value']
                          ))
                        : (a(), d(v, { key: 1 }, [k(g(e(_)[t.day]), 1)], 64))
                    ],
                    64
                  ))
                : s.dataIndex === 'open'
                ? (a(),
                  d(
                    v,
                    { key: 1 },
                    [
                      l.value.includes(r)
                        ? (a(),
                          u(
                            e(O),
                            {
                              key: 0,
                              options: e(f),
                              value: t.open,
                              'onUpdate:value': i => (t.open = i),
                              style: { width: '100px' }
                            },
                            null,
                            8,
                            ['options', 'value', 'onUpdate:value']
                          ))
                        : (a(), d(v, { key: 1 }, [k(g(b(t.open)), 1)], 64))
                    ],
                    64
                  ))
                : s.dataIndex === 'close'
                ? (a(),
                  d(
                    v,
                    { key: 2 },
                    [
                      l.value.includes(r)
                        ? (a(),
                          u(
                            e(O),
                            {
                              key: 0,
                              options: e(f),
                              value: t.close,
                              'onUpdate:value': i => (t.close = i),
                              style: { width: '100px' }
                            },
                            null,
                            8,
                            ['options', 'value', 'onUpdate:value']
                          ))
                        : (a(), d(v, { key: 1 }, [k(g(b(t.close)), 1)], 64))
                    ],
                    64
                  ))
                : y('v-if', !0),
              s.dataIndex === 'actions'
                ? (a(),
                  u(
                    e(j),
                    { key: 3, size: 'small' },
                    {
                      default: c(() => [
                        m(
                          e(w),
                          { onClick: i => B(r) },
                          {
                            default: c(() => [
                              l.value.includes(r)
                                ? (a(), u(e(D), { key: 0 }))
                                : (a(), u(e(F), { key: 1 }))
                            ]),
                            _: 2
                          },
                          1032,
                          ['onClick']
                        ),
                        l.value.includes(r)
                          ? y('v-if', !0)
                          : (a(),
                            u(
                              e(Y),
                              {
                                key: 0,
                                title: e(V),
                                onConfirm: i => L(r),
                                okText: e(h)('ok'),
                                cancelText: e(h)('cancel')
                              },
                              {
                                default: c(() => [
                                  m(
                                    e(w),
                                    { danger: '' },
                                    { default: c(() => [m(e(J))]), _: 1 }
                                  )
                                ]),
                                _: 2
                              },
                              1032,
                              ['title', 'onConfirm', 'okText', 'cancelText']
                            ))
                      ]),
                      _: 2
                    },
                    1024
                  ))
                : s.dataIndex === 'status'
                ? (a(),
                  u(
                    e(Z),
                    {
                      key: 4,
                      size: 'small',
                      checked: t.status,
                      'onUpdate:checked': i => (t.status = i),
                      checkedValue: '1',
                      unCheckedValue: '0'
                    },
                    null,
                    8,
                    ['checked', 'onUpdate:checked']
                  ))
                : y('v-if', !0)
            ]),
            _: 1
          },
          8,
          ['columns', 'dataSource', 'rowKey']
        )
      );
    }
  }),
  pe = $(G, [
    [
      '__file',
      '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/OpeningHours.vue'
    ]
  ]);
export { pe as default };

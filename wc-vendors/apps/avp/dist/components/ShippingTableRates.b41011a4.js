import {
  d as g,
  V,
  e as x,
  o as n,
  L as S,
  c as r,
  w as i,
  Z as U,
  N as b,
  u as t,
  a as l,
  Y as c,
  F as w
} from '../common/vendor.e5025a5c.js';
import { b as o, c as C } from '../main.4e11cfe3.js';
import {
  C as I,
  I as T,
  S as q,
  b as R,
  a as N
} from '../common/DynamicControl.682f269f.js';
import { J as p } from '../common/VendorStore.76a5f248.js';
import { a as B } from '../common/index.a5a3d068.js';
import { P as F } from '../common/index.26871545.js';
import { w as O } from '../common/antd.e3fbf92b.js';
import { T as A } from '../common/index.078f4788.js';
import '../common/VendorEdit.a89160bf.js';
import '../common/initDefaultProps.d90010a5.js';
import '../common/index.f3d5a503.js';
import '../common/responsiveObserve.feb6262f.js';
const D = g({
    __name: 'ShippingTableRates',
    props: {
      rates: { type: Object, required: !0, default: () => [] },
      currency: String
    },
    setup(y) {
      const f = y,
        { rates: u, currency: m } = V(f),
        k = x(() => [
          { title: o('region'), dataIndex: 'region', key: 'region' },
          { title: o('country'), dataIndex: 'country', key: 'country' },
          { title: o('state'), dataIndex: 'state', key: 'state' },
          { title: o('postcode'), dataIndex: 'postcode', key: 'postcode' },
          { title: o('shippingFee'), dataIndex: 'fee', key: 'fee' },
          {
            title: o('qtyOverride'),
            dataIndex: 'qty_override',
            key: 'qty_override'
          },
          { title: o('actions'), key: 'action', dataIndex: 'action' }
        ]),
        v = () => {
          u.value.push({
            region: '',
            country: '',
            state: '',
            postcode: '',
            fee: 0,
            qty_override: 'no'
          });
        },
        h = d => {
          u.value.splice(d, 1);
        };
      return (d, L) => (
        n(),
        S(
          w,
          null,
          [
            r(
              t(p),
              {
                type: 'primary',
                style: { 'margin-bottom': '8px' },
                onClick: v
              },
              { default: i(() => [U(b(t(o)('addRow')), 1)]), _: 1 }
            ),
            r(
              t(A),
              { dataSource: t(u), columns: k.value },
              {
                bodyCell: i(({ record: e, index: _, column: s }) => [
                  s.key === 'action'
                    ? (n(),
                      l(
                        t(F),
                        {
                          key: 0,
                          onConfirm: a => h(_),
                          title: t(o)('confirmRemove'),
                          okText: t(o)('ok'),
                          cancelText: t(o)('cancel')
                        },
                        {
                          default: i(() => [
                            r(
                              t(p),
                              { danger: '' },
                              { default: i(() => [r(t(O))]), _: 1 }
                            )
                          ]),
                          _: 2
                        },
                        1032,
                        ['onConfirm', 'title', 'okText', 'cancelText']
                      ))
                    : c('v-if', !0),
                  s.key === 'country'
                    ? (n(),
                      l(
                        I,
                        {
                          key: 1,
                          selectedValue: e.country,
                          'onUpdate:selectedValue': a => (e.country = a),
                          continent: e.region,
                          showSearch: !0
                        },
                        null,
                        8,
                        ['selectedValue', 'onUpdate:selectedValue', 'continent']
                      ))
                    : c('v-if', !0),
                  s.key === 'postcode'
                    ? (n(),
                      l(
                        t(B),
                        {
                          key: 2,
                          value: e.postcode,
                          'onUpdate:value': a => (e.postcode = a)
                        },
                        null,
                        8,
                        ['value', 'onUpdate:value']
                      ))
                    : c('v-if', !0),
                  s.key === 'fee'
                    ? (n(),
                      l(
                        t(T),
                        {
                          key: 3,
                          value: e.fee,
                          'onUpdate:value': a => (e.fee = a),
                          addonAfter: t(m)
                        },
                        null,
                        8,
                        ['value', 'onUpdate:value', 'addonAfter']
                      ))
                    : c('v-if', !0),
                  s.key === 'qty_override'
                    ? (n(),
                      l(
                        t(q),
                        {
                          key: 4,
                          size: 'small',
                          checked: e.qty_override,
                          'onUpdate:checked': a => (e.qty_override = a),
                          checkedValue: 'yes',
                          unCheckedValue: 'no'
                        },
                        null,
                        8,
                        ['checked', 'onUpdate:checked']
                      ))
                    : c('v-if', !0),
                  s.key === 'region'
                    ? (n(),
                      l(
                        R,
                        {
                          key: 5,
                          selectedValue: e.region,
                          'onUpdate:selectedValue': a => (e.region = a),
                          showSearch: !0
                        },
                        null,
                        8,
                        ['selectedValue', 'onUpdate:selectedValue']
                      ))
                    : c('v-if', !0),
                  s.key === 'state'
                    ? (n(),
                      l(
                        N,
                        {
                          key: 6,
                          country: e.country,
                          selectedValue: e.state,
                          'onUpdate:selectedValue': a => (e.state = a),
                          showSearch: !0
                        },
                        null,
                        8,
                        ['country', 'selectedValue', 'onUpdate:selectedValue']
                      ))
                    : c('v-if', !0)
                ]),
                _: 1
              },
              8,
              ['dataSource', 'columns']
            )
          ],
          64
        )
      );
    }
  }),
  Q = C(D, [
    [
      '__file',
      '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/ShippingTableRates.vue'
    ]
  ]);
export { Q as default };

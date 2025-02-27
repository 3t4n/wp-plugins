import {
  d as b,
  K as O,
  o as d,
  a as m,
  w as n,
  u as e,
  Y as r,
  c as o,
  Z as s,
  N as p
} from '../common/vendor.e5025a5c.js';
import { V as h, b as t, c as w } from '../main.4e11cfe3.js';
import { a as I, S as u } from '../common/index.a5a3d068.js';
import { J as _ } from '../common/VendorStore.76a5f248.js';
import { w as C } from '../common/antd.e3fbf92b.js';
import { I as f } from '../common/DynamicControl.682f269f.js';
import { P as S } from '../common/index.26871545.js';
import { T as g } from '../common/index.078f4788.js';
import '../common/initDefaultProps.d90010a5.js';
import '../common/VendorEdit.a89160bf.js';
import '../common/index.f3d5a503.js';
import '../common/responsiveObserve.feb6262f.js';
const N = b({
    __name: 'CommissionTiers',
    setup(V) {
      const k = h(),
        { vendorSettings: i } = O(k),
        x = [
          { title: t('name'), dataIndex: 'name', key: 'name' },
          { title: t('rules'), dataIndex: 'rule', key: 'rule' },
          { title: t('sales'), dataIndex: 'value', key: 'value' },
          { title: t('type'), dataIndex: 'type', key: 'type' },
          { title: t('amount'), dataIndex: 'amount', key: 'amount' },
          { title: t('percentage'), dataIndex: 'percent', key: 'percent' },
          { title: t('fee'), dataIndex: 'fee', key: 'fee' },
          { title: t('action'), key: 'action' }
        ],
        T = () => {
          i.value.commission_tiers.hasOwnProperty(i.value.commission_type)
            ? i.value.commission_tiers[i.value.commission_type].push({
                name: '',
                rule: '',
                value: 0,
                type: '',
                amount: 0,
                percent: 0,
                fee: 0
              })
            : (i.value.commission_tiers[i.value.commission_type] = [
                {
                  name: '',
                  rule: '',
                  value: 0,
                  type: '',
                  amount: 0,
                  percent: 0,
                  fee: 0
                }
              ]);
        },
        U = c => {
          const y = i.value.commission_tiers[i.value.commission_type].indexOf(
            c
          );
          i.value.commission_tiers[i.value.commission_type].splice(y, 1);
        };
      return (c, y) => (
        d(),
        m(
          e(g),
          {
            columns: x,
            dataSource: e(i).commission_tiers[e(i).commission_type],
            bordered: ''
          },
          {
            bodyCell: n(({ record: a, column: v }) => [
              v.key === 'name'
                ? (d(),
                  m(
                    e(I),
                    {
                      key: 0,
                      value: a.name,
                      'onUpdate:value': l => (a.name = l)
                    },
                    null,
                    8,
                    ['value', 'onUpdate:value']
                  ))
                : r('v-if', !0),
              v.key === 'rule'
                ? (d(),
                  m(
                    e(u),
                    {
                      key: 1,
                      value: a.rule,
                      'onUpdate:value': l => (a.rule = l),
                      style: { width: '150px' }
                    },
                    {
                      default: n(() => [
                        o(
                          e(u).Option,
                          { value: '' },
                          {
                            default: n(() => [
                              s(' --- ' + p(e(t)('select')) + ' --- ', 1)
                            ]),
                            _: 1
                          }
                        ),
                        o(
                          e(u).Option,
                          { value: 'less_than' },
                          {
                            default: n(() => [s(p(e(t)('lessThan')), 1)]),
                            _: 1
                          }
                        ),
                        o(
                          e(u).Option,
                          { value: 'up_to' },
                          { default: n(() => [s(p(e(t)('upTo')), 1)]), _: 1 }
                        ),
                        o(
                          e(u).Option,
                          { value: 'more_than' },
                          {
                            default: n(() => [s(p(e(t)('moreThan')), 1)]),
                            _: 1
                          }
                        )
                      ]),
                      _: 2
                    },
                    1032,
                    ['value', 'onUpdate:value']
                  ))
                : r('v-if', !0),
              v.key === 'value'
                ? (d(),
                  m(
                    e(f),
                    {
                      key: 2,
                      value: a.value,
                      'onUpdate:value': l => (a.value = l)
                    },
                    null,
                    8,
                    ['value', 'onUpdate:value']
                  ))
                : r('v-if', !0),
              v.key === 'type'
                ? (d(),
                  m(
                    e(u),
                    {
                      key: 3,
                      value: a.type,
                      'onUpdate:value': l => (a.type = l),
                      style: { width: '150px' }
                    },
                    {
                      default: n(() => [
                        o(
                          e(u).Option,
                          { value: '' },
                          {
                            default: n(() => [
                              s(' --- ' + p(e(t)('select')) + ' --- ', 1)
                            ]),
                            _: 1
                          }
                        ),
                        o(
                          e(u).Option,
                          { value: 'fixed' },
                          { default: n(() => [s(p(e(t)('fixed')), 1)]), _: 1 }
                        ),
                        o(
                          e(u).Option,
                          { value: 'fixed_fee' },
                          {
                            default: n(() => [s(p(e(t)('fixedFee')), 1)]),
                            _: 1
                          }
                        ),
                        o(
                          e(u).Option,
                          { value: 'percent' },
                          {
                            default: n(() => [s(p(e(t)('percentage')), 1)]),
                            _: 1
                          }
                        ),
                        o(
                          e(u).Option,
                          { value: 'percent_fee' },
                          {
                            default: n(() => [s(p(e(t)('percentageFee')), 1)]),
                            _: 1
                          }
                        )
                      ]),
                      _: 2
                    },
                    1032,
                    ['value', 'onUpdate:value']
                  ))
                : r('v-if', !0),
              v.key === 'amount'
                ? (d(),
                  m(
                    e(f),
                    {
                      key: 4,
                      value: a.amount,
                      'onUpdate:value': l => (a.amount = l),
                      disabled: ['percent', 'percent_fee', ''].includes(a.type)
                    },
                    null,
                    8,
                    ['value', 'onUpdate:value', 'disabled']
                  ))
                : r('v-if', !0),
              v.key === 'percent'
                ? (d(),
                  m(
                    e(f),
                    {
                      key: 5,
                      value: a.percent,
                      'onUpdate:value': l => (a.percent = l),
                      disabled: ['fixed', 'fixed_fee', ''].includes(a.type)
                    },
                    null,
                    8,
                    ['value', 'onUpdate:value', 'disabled']
                  ))
                : r('v-if', !0),
              v.key === 'fee'
                ? (d(),
                  m(
                    e(f),
                    {
                      key: 6,
                      value: a.fee,
                      'onUpdate:value': l => (a.fee = l),
                      disabled: ['percent', 'fixed', ''].includes(a.type)
                    },
                    null,
                    8,
                    ['value', 'onUpdate:value', 'disabled']
                  ))
                : r('v-if', !0),
              v.key === 'action'
                ? (d(),
                  m(
                    e(S),
                    {
                      key: 7,
                      onConfirm: U,
                      okText: e(t)('ok'),
                      cancelText: e(t)('cancel'),
                      title: e(t)('confirmRemove')
                    },
                    {
                      default: n(() => [
                        o(
                          e(_),
                          { danger: '' },
                          { default: n(() => [o(e(C))]), _: 1 }
                        )
                      ]),
                      _: 1
                    },
                    8,
                    ['okText', 'cancelText', 'title']
                  ))
                : r('v-if', !0)
            ]),
            footer: n(() => [
              o(
                e(_),
                { type: 'primary', onClick: T },
                { default: n(() => [s(p(e(t)('addRow')), 1)]), _: 1 }
              )
            ]),
            _: 1
          },
          8,
          ['dataSource']
        )
      );
    }
  }),
  q = w(N, [
    [
      '__file',
      '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/CommissionTiers.vue'
    ]
  ]);
export { q as default };

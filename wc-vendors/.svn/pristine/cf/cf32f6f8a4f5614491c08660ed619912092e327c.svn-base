import {
  d as I,
  V as R,
  a1 as M,
  o as n,
  L as i,
  u as e,
  F as l,
  M as s,
  N as o,
  Z as m,
  a as u,
  w as d,
  Y as p,
  R as f,
  S as y,
  c as _
} from '../../common/vendor.e5025a5c.js';
import { b as a, c as N } from '../../main.4e11cfe3.js';
import { u as O, S as B } from '../../common/VendorStore.76a5f248.js';
import { t as H } from '../../common/antd.e3fbf92b.js';
import { T as h, P as k } from '../../common/index.26871545.js';
import '../../common/initDefaultProps.d90010a5.js';
const P = ['innerHTML'],
  $ = ['innerHTML'],
  A = ['href'],
  D = ['href'],
  E = { href: '#', type: 'primary', class: 'vendor-action-approve' },
  j = { href: '#', type: 'primary', class: 'vendor-action-deny' },
  q = { href: '#', type: 'primary', class: 'vendor-action-edit' },
  F = ['href'],
  U = ['href'],
  z = { href: '#', type: 'primary', class: 'vendor-action-reactive' },
  Y = I({
    __name: 'VendorTableCell',
    props: {
      record: { type: Object, required: !0 },
      column: { type: Object, required: !0 }
    },
    setup(b) {
      const T = b,
        x = O(),
        C = window.wcv_avp.view_products_url,
        L = window.wcv_avp.view_orders_url,
        { record: t, column: c } = R(T),
        S = async (v, r) => {
          await x.setVendorStatus(v, r);
        },
        w = async (v, r) => {
          await x.setVendorApproval(v, r);
        };
      return (v, r) => {
        const g = M('RouterLink');
        return (
          n(),
          i(
            l,
            null,
            [
              e(c).dataIndex === 'commission_due'
                ? (n(),
                  i(
                    'span',
                    { key: 0, innerHTML: e(t).commission_due.formatted },
                    null,
                    8,
                    P
                  ))
                : e(c).dataIndex === 'commission_rate'
                ? (n(),
                  i(
                    l,
                    { key: 1 },
                    [
                      s(
                        'span',
                        { innerHTML: e(t).commission_rate.formatted },
                        null,
                        8,
                        $
                      ),
                      s(
                        'span',
                        null,
                        ' (' + o(e(t).commission_rate.level) + ') ',
                        1
                      )
                    ],
                    64
                  ))
                : e(c).dataIndex === 'registered_date'
                ? (n(), i(l, { key: 2 }, [m(o(e(t).registered_date), 1)], 64))
                : e(c).dataIndex === 'status'
                ? (n(),
                  i(
                    l,
                    { key: 3 },
                    [
                      e(t).status.value === 'active'
                        ? (n(),
                          u(
                            e(h),
                            { key: 0, color: 'green' },
                            {
                              default: d(() => [m(o(e(a)('active')), 1)]),
                              _: 1
                            }
                          ))
                        : e(t).status.value === 'inactive'
                        ? (n(),
                          u(
                            e(h),
                            { key: 1 },
                            {
                              default: d(() => [m(o(e(a)('inactive')), 1)]),
                              _: 1
                            }
                          ))
                        : e(t).status.value === 'pending'
                        ? (n(),
                          u(
                            e(h),
                            { key: 2, color: 'orange' },
                            {
                              default: d(() => [m(o(e(a)('pending')), 1)]),
                              _: 1
                            }
                          ))
                        : p('v-if', !0)
                    ],
                    64
                  ))
                : e(c).dataIndex === 'displayname'
                ? (n(),
                  i(
                    'a',
                    {
                      key: 4,
                      href: `/wp-admin/user-edit.php?user_id=${e(t).id}`,
                      target: "'_blank'"
                    },
                    o(e(t).displayname),
                    9,
                    A
                  ))
                : e(c).dataIndex === 'shopname'
                ? (n(),
                  i(
                    l,
                    { key: 5 },
                    [
                      f(
                        s(
                          'a',
                          { href: e(t).shop_link, target: "'_blank'" },
                          o(e(t).shopname),
                          9,
                          D
                        ),
                        [
                          [
                            y,
                            e(t).shopname !== '' &&
                              e(t).status.value !== 'inactive'
                          ]
                        ]
                      ),
                      f(s('span', null, '(' + o(e(a)('na')) + ')', 513), [
                        [y, e(t).shopname === '']
                      ]),
                      f(s('span', null, o(e(t).shopname), 513), [
                        [y, e(t).status.value === 'inactive']
                      ]),
                      e(t).status.value !== 'inactive' &&
                      e(t).status.value !== 'pending'
                        ? (n(),
                          u(
                            g,
                            {
                              key: 0,
                              to: {
                                name: 'vendor-edit',
                                params: { id: e(t).id }
                              },
                              class: 'tc-shop-name-edit',
                              title: e(a)('edit')
                            },
                            { default: d(() => [_(e(H))]), _: 1 },
                            8,
                            ['to', 'title']
                          ))
                        : p('v-if', !0)
                    ],
                    64
                  ))
                : p('v-if', !0),
              e(c).dataIndex === 'action'
                ? (n(),
                  u(
                    e(B),
                    { key: 6, align: 'center', size: 'small' },
                    {
                      default: d(() => [
                        e(t).status.value === 'pending'
                          ? (n(),
                            i(
                              l,
                              { key: 0 },
                              [
                                _(
                                  e(k),
                                  {
                                    title: e(a)('confirmApprove'),
                                    'ok-text': e(a)('yes'),
                                    'cancel-text': e(a)('no'),
                                    onConfirm:
                                      r[0] ||
                                      (r[0] = V => w(e(t).id, 'approve'))
                                  },
                                  {
                                    default: d(() => [
                                      s('a', E, o(e(a)('approve')), 1)
                                    ]),
                                    _: 1
                                  },
                                  8,
                                  ['title', 'ok-text', 'cancel-text']
                                ),
                                _(
                                  e(k),
                                  {
                                    title: e(a)('confirmDeny'),
                                    'ok-text': e(a)('yes'),
                                    'cancel-text': e(a)('no'),
                                    onConfirm:
                                      r[1] || (r[1] = V => w(e(t).id, 'deny'))
                                  },
                                  {
                                    default: d(() => [
                                      s('a', j, o(e(a)('deny')), 1)
                                    ]),
                                    _: 1
                                  },
                                  8,
                                  ['title', 'ok-text', 'cancel-text']
                                )
                              ],
                              64
                            ))
                          : p('v-if', !0),
                        e(t).status.value === 'active'
                          ? (n(),
                            i(
                              l,
                              { key: 1 },
                              [
                                _(
                                  g,
                                  {
                                    type: 'primary',
                                    to: {
                                      name: 'vendor-edit',
                                      params: { id: e(t).id }
                                    }
                                  },
                                  {
                                    default: d(() => [
                                      s('a', q, o(e(a)('edit')), 1)
                                    ]),
                                    _: 1
                                  },
                                  8,
                                  ['to']
                                ),
                                s(
                                  'a',
                                  { href: e(C) + e(t).id, type: 'primary' },
                                  o(e(a)('viewProducts')),
                                  9,
                                  F
                                ),
                                s(
                                  'a',
                                  { href: e(L) + e(t).id, type: 'primary' },
                                  o(e(a)('viewOrders')),
                                  9,
                                  U
                                )
                              ],
                              64
                            ))
                          : p('v-if', !0),
                        e(t).status.value === 'inactive'
                          ? (n(),
                            u(
                              e(k),
                              {
                                key: 2,
                                title: e(a)('confirmReactive'),
                                'ok-text': e(a)('yes'),
                                'cancel-text': e(a)('no'),
                                onConfirm:
                                  r[2] || (r[2] = V => S(e(t).id, 'activate'))
                              },
                              {
                                default: d(() => [
                                  s('a', z, o(e(a)('reactive')), 1)
                                ]),
                                _: 1
                              },
                              8,
                              ['title', 'ok-text', 'cancel-text']
                            ))
                          : p('v-if', !0)
                      ]),
                      _: 1
                    }
                  ))
                : p('v-if', !0)
            ],
            64
          )
        );
      };
    }
  });
const X = N(Y, [
  ['__scopeId', 'data-v-be458021'],
  [
    '__file',
    '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/VendorTable/VendorTableCell.vue'
  ]
]);
export { X as default };

import {
  d as o,
  K as u,
  o as _,
  L as g,
  c as t,
  w as i,
  u as e,
  F as f
} from '../common/vendor.e5025a5c.js';
import { V as h, b as l, c as m } from '../main.4e11cfe3.js';
import { C as v, F as n, a as c } from '../common/DynamicControl.682f269f.js';
import { a as d } from '../common/index.a5a3d068.js';
import '../common/antd.e3fbf92b.js';
import '../common/VendorStore.76a5f248.js';
import '../common/initDefaultProps.d90010a5.js';
import '../common/index.26871545.js';
import '../common/VendorEdit.a89160bf.js';
const b = o({
    __name: 'ShippingAddress',
    setup(S) {
      const r = h(),
        { vendorSettings: s } = u(r);
      return (y, a) => (
        _(),
        g(
          f,
          null,
          [
            t(
              n,
              { label: e(l)('shippingCountry') },
              {
                default: i(() => [
                  t(
                    v,
                    {
                      selectedValue: e(s).shipping_flat_rate.shipping_address
                        .country,
                      'onUpdate:selectedValue':
                        a[0] ||
                        (a[0] = p =>
                          (e(
                            s
                          ).shipping_flat_rate.shipping_address.country = p))
                    },
                    null,
                    8,
                    ['selectedValue']
                  )
                ]),
                _: 1
              },
              8,
              ['label']
            ),
            t(
              n,
              { label: e(l)('shippingState') },
              {
                default: i(() => [
                  t(
                    c,
                    {
                      selectedValue: e(s).shipping_flat_rate.shipping_address
                        .state,
                      'onUpdate:selectedValue':
                        a[1] ||
                        (a[1] = p =>
                          (e(s).shipping_flat_rate.shipping_address.state = p)),
                      country: e(s).shipping_flat_rate.shipping_address.country
                    },
                    null,
                    8,
                    ['selectedValue', 'country']
                  )
                ]),
                _: 1
              },
              8,
              ['label']
            ),
            t(
              n,
              { label: e(l)('shippingCity') },
              {
                default: i(() => [
                  t(
                    e(d),
                    {
                      value: e(s).shipping_flat_rate.shipping_address.city,
                      'onUpdate:value':
                        a[2] ||
                        (a[2] = p =>
                          (e(s).shipping_flat_rate.shipping_address.city = p))
                    },
                    null,
                    8,
                    ['value']
                  )
                ]),
                _: 1
              },
              8,
              ['label']
            ),
            t(
              n,
              { label: e(l)('shippingPostcode') },
              {
                default: i(() => [
                  t(
                    e(d),
                    {
                      value: e(s).shipping_flat_rate.shipping_address.postcode,
                      'onUpdate:value':
                        a[3] ||
                        (a[3] = p =>
                          (e(
                            s
                          ).shipping_flat_rate.shipping_address.postcode = p))
                    },
                    null,
                    8,
                    ['value']
                  )
                ]),
                _: 1
              },
              8,
              ['label']
            ),
            t(
              n,
              { label: e(l)('shippingAddress1') },
              {
                default: i(() => [
                  t(
                    e(d),
                    {
                      value: e(s).shipping_flat_rate.shipping_address.address1,
                      'onUpdate:value':
                        a[4] ||
                        (a[4] = p =>
                          (e(
                            s
                          ).shipping_flat_rate.shipping_address.address1 = p))
                    },
                    null,
                    8,
                    ['value']
                  )
                ]),
                _: 1
              },
              8,
              ['label']
            ),
            t(
              n,
              { label: e(l)('shippingAddress2') },
              {
                default: i(() => [
                  t(
                    e(d),
                    {
                      value: e(s).shipping_flat_rate.shipping_address.address2,
                      'onUpdate:value':
                        a[5] ||
                        (a[5] = p =>
                          (e(
                            s
                          ).shipping_flat_rate.shipping_address.address2 = p))
                    },
                    null,
                    8,
                    ['value']
                  )
                ]),
                _: 1
              },
              8,
              ['label']
            )
          ],
          64
        )
      );
    }
  }),
  B = m(b, [
    [
      '__file',
      '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/ShippingAddress.vue'
    ]
  ]);
export { B as default };

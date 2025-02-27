import {
  d as O,
  K as D,
  r as y,
  z as F,
  u as e,
  o as f,
  L as w,
  c as h,
  w as M,
  M as _,
  Z as G,
  N as u,
  R as Z,
  S as $
} from '../common/vendor.e5025a5c.js';
import { V as J, b as n, c as j } from '../main.4e11cfe3.js';
import { J as L, S as q } from '../common/VendorStore.76a5f248.js';
import '../common/antd.e3fbf92b.js';
import '../common/initDefaultProps.d90010a5.js';
const H = { key: 0, class: 'gmap' },
  Q = ['placeholder'],
  U = { class: 'gmap__map', id: 'gmap' },
  W = { key: 1 },
  X = { key: 2 },
  Y = O({
    __name: 'GMap',
    setup(ee) {
      const V = J(),
        { vendorSettings: t } = D(V),
        I = Number.parseInt(window.wcv_avp.map_zoom_level),
        S = window.google && window.google.maps,
        A = window.wcv_avp.is_pro_active,
        E = `${window.wcv_avp.admin_url}admin.php?page=wcv-settings&tab=forms`,
        z = () => {
          S && R();
        };
      let s = y(),
        c = y(),
        v,
        g;
      const i = y(!1);
      let b = [];
      const l = r => b.find(a => a.types.includes(r)),
        R = () => {
          const r = {
              center: {
                lat: Number.parseFloat(t.value.store_lat) || 0,
                lng: Number.parseFloat(t.value.store_lng) || 0
              },
              zoom: I,
              mapTypeId: google.maps.MapTypeId.TERRAIN,
              mapTypeControl: !1
            },
            p = {
              fields: [
                'formatted_address',
                'geometry',
                'name',
                'address_components',
                'vicinity'
              ],
              strictBounds: !1,
              types: ['establishment']
            };
          if (
            ((v = document.getElementById('gmap')),
            (g = document.getElementById('searchInput')),
            !v || !g)
          )
            return !1;
          (s.value = new google.maps.Map(v, r)),
            (c.value = new google.maps.Marker({
              map: s.value,
              anchorPoint: new google.maps.Point(0, -29)
            })),
            c.value.setVisible(!0),
            c.value.setPosition(r.center);
          const a = new google.maps.places.Autocomplete(g, p);
          a.bindTo('bounds', s.value),
            a.addListener('place_changed', () => {
              var m, k, N, x, C, T, B, P;
              const o = a.getPlace();
              if (!o.geometry || !o.geometry.location) return;
              const d = o.formatted_address ?? t.value.store_address1;
              (b = o.address_components ?? []),
                (m = s.value) == null || m.panTo(o.geometry.location),
                (k = s.value) == null || k.setZoom(I),
                (N = c.value) == null || N.setPosition(o.geometry.location),
                (t.value.store_postcode =
                  ((x = l('postal_code')) == null ? void 0 : x.long_name) ??
                  ''),
                (t.value.store_city =
                  ((C = l('locality')) == null ? void 0 : C.long_name) ??
                  ((T = l('administrative_area_level_2')) == null
                    ? void 0
                    : T.short_name) ??
                  ''),
                (t.value.store_state =
                  ((B = l('administrative_area_level_1')) == null
                    ? void 0
                    : B.short_name) ?? ''),
                (t.value.store_country =
                  ((P = l('country')) == null ? void 0 : P.short_name) ?? ''),
                (t.value.store_lat = o.geometry.location.lat().toString()),
                (t.value.store_lng = o.geometry.location.lng().toString()),
                (t.value.store_address = d);
            });
          var K = new google.maps.Geocoder();
          return (
            google.maps.event.addListener(s.value, 'click', function(o) {
              K.geocode({ location: o.latLng }, function(d, m) {
                m == google.maps.GeocoderStatus.OK && d && a.set('place', d[0]);
              });
            }),
            !0
          );
        };
      return (
        F(() => {
          z();
        }),
        (r, p) =>
          e(S)
            ? (f(),
              w('div', H, [
                h(e(q), null, {
                  default: M(() => [
                    _(
                      'input',
                      {
                        type: 'text',
                        id: 'searchInput',
                        placeholder: e(n)('mapSearch')
                      },
                      null,
                      8,
                      Q
                    ),
                    h(
                      e(L),
                      {
                        type: 'primary',
                        onClick: p[0] || (p[0] = a => (i.value = !i.value))
                      },
                      {
                        default: M(() => [
                          G(u(i.value ? e(n)('hideMap') : e(n)('showMap')), 1)
                        ]),
                        _: 1
                      }
                    )
                  ]),
                  _: 1
                }),
                Z(_('div', U, null, 512), [[$, i.value]])
              ]))
            : e(A)
            ? (f(),
              w('div', X, [
                _('p', null, u(e(n)('mapNotLoaded')), 1),
                h(
                  e(L),
                  { type: 'primary', href: E },
                  { default: M(() => [G(u(e(n)('setMapAPIKey')), 1)]), _: 1 }
                )
              ]))
            : (f(), w('div', W, [_('p', null, u(e(n)('onlyPro')), 1)]))
      );
    }
  });
const re = j(Y, [
  ['__scopeId', 'data-v-802104c0'],
  [
    '__file',
    '/home/dani/Local Sites/wcvdev/app/public/wp-content/plugins/wc-vendors/apps/avp/src/components/GMap.vue'
  ]
]);
export { re as default };

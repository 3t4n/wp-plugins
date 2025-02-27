!(function(r, s) {
  function a(n, o, r) {
    var s;
    return function() {
      var e = this,
        a = arguments,
        t = r && !s;
      clearTimeout(s),
        (s = setTimeout(function() {
          (s = null), r || n.apply(e, a);
        }, o)),
        t && n.apply(e, a);
    };
  }
  r(window).on('load', function() {
    var e, o;
    window.Parsley.on(
      'form:error',
      a(function() {
        r('html, body').animate(
          { scrollTop: r('.parsley-error:first').offset().top - 200 },
          'slow'
        ),
          r('.parsley-error:first').focus();
      }, 100)
    ),
      r('.wcv-form').length &&
        void 0 !== (e = s.Common_1.getInstance('.wcv-form')[0]) &&
        ((o = e._options.onError),
        (e._options.onError = function(e) {
          var a, t, n;
          e.length < 1 ||
            ((t = (a = r(e[0].getElement())).closest('.tabs-content')) &&
              !t.hasClass('active') &&
              void 0 !== (n = s.Common_1.getInstance('.wcv-tabs')[0]) &&
              n.changeTab('#' + t.attr('id')),
            (n = a.closest('.control-group')),
            r('html, body').animate(
              { scrollTop: n.offset().top },
              { duration: 500 }
            ),
            void 0 !== o && o(e));
        })),
      r('#_wcv_vendor_enable_store_notice').is(':checked')
        ? r('#wp-_wcv_vendor_store_notice-wrap').show()
        : r('#wp-_wcv_vendor_store_notice-wrap').hide(),
      r('#_wcv_vendor_enable_store_notice').click(function() {
        r('#wp-_wcv_vendor_store_notice-wrap').toggle();
      }),
      r('#_wcv_shipping_type').on('change', function() {
        var e = r(this).val();
        'flat' == e
          ? (r('#shipping-flat-rates').removeClass('hidden'),
            r('#shipping-country-rates').addClass('hidden'))
          : 'country' == e
          ? (r('#shipping-flat-rates').addClass('hidden'),
            r('#shipping-country-rates').removeClass('hidden'))
          : (r('#shipping-flat-rates').addClass('hidden'),
            r('#shipping-country-rates').addClass('hidden'));
      });
  }),
    r(window).on(
      'load',
      a(function() {
        var e = wcv_frontend_forms.vendor_select
          ? r('#_wcv_shipping_type').val()
          : wcv_frontend_forms.shipping_type;
        'flat' === e
          ? (r('#shipping-flat-rates').removeClass('hidden'),
            r('#shipping-country-rates').addClass('hidden'))
          : 'country' === e || 'country' === wcv_frontend_forms.shipping_type
          ? (r('#shipping-flat-rates').addClass('hidden'),
            r('#shipping-country-rates').removeClass('hidden'))
          : 'flat' === wcv_frontend_forms.shipping_type &&
            (r('#shipping-flat-rates').removeClass('hidden'),
            r('#shipping-country-rates').addClass('hidden'));
      }, 100)
    ),
    r('form').on('submit', function(e) {
      var t = !1,
        n = window.wcv_frontend_general.required_file_msg;
      r('.wcv-file-uploader').each(function() {
        var e = !1,
          a =
            (void 0 !== r(this).attr('required') &&
              ((a = r(this).attr('id')), (e = o(a, n))),
            r(this)
              .closest('.tabs-content')
              .first()
              .attr('id'));
        e
          ? (r('a.' + a).addClass('parsley-error'), (t = !0))
          : r('a.' + a).removeClass('parsley-error');
      }),
        t && e.preventDefault();
    }),
    r(document).on('input change', '.wcv-file-uploader', function() {
      var e, a, t;
      void 0 !== r(this).attr('required') &&
        ((e = r(this).attr('id')),
        (a = r('#' + e).data('msg-id')),
        (t = r(this)
          .closest('.tabs-content')
          .first()
          .attr('id')),
        0 != r('#' + e).val()) &&
        '' != r('#' + e).val() &&
        (r('#' + a)
          .html('')
          .removeClass('parsley-error'),
        r('.' + t).removeClass('parsley-error'));
    });
  var o = function(e, a) {
    var t = !1,
      n = r('#' + e).data('msg-id');
    return (
      0 == r('#' + e).val() || '' == r('#' + e).val()
        ? (r('#' + n)
            .html(a)
            .addClass('parsley-error'),
          (t = !0))
        : r('#' + n)
            .html('')
            .removeClass('parsley-error'),
      t
    );
  };
  r('#wcv_commission_payout_method').on('change', function() {
    var e = r('#wcv_commission_payout_method').val(),
      a = r('#wcv-paypal-payout-fields'),
      t = r('#wcv-bank-payout-fields');
    switch (e) {
      case 'paypal':
        n(a);
        break;
      case 'bank':
        n(t);
        break;
      default:
        i();
    }
  }),
    r('#wcv_paypal_masspay_wallet').on('change', function() {
      e();
    });
  let e = function() {
      var e = r('#wcv_paypal_masspay_venmo_id_wrapper'),
        a = r('#wcv_paypal_masspay_email_address_wrapper');
      switch (r('#wcv_paypal_masspay_wallet').val()) {
        case 'paypal':
          r(e).hide(), r(a).show();
          break;
        case 'venmo':
          r(e).show(), r(a).hide();
          break;
        default:
          r(e).hide(), r(a).hide();
      }
    },
    n = function(e) {
      i(), e.show();
    },
    i = function() {
      r('.wcv-payout-method').hide();
    };
})(jQuery, Ink.UI);


const oceanalipay_settings = window.wc.wcSettings.getSetting( 'oceanalipay_data', {} );


const oceanalipay_label = window.wp.htmlEntities.decodeEntities( oceanalipay_settings.title ) || window.wp.i18n.__( 'Oceanpayment AliPay Payment Gateway', 'oceanpayment-alipay-gateway' );




const oceanalipay_Content = () => {
    return window.wp.htmlEntities.decodeEntities( oceanalipay_settings.description || '' );
};


var I = function(e) {
    var t = e.components,
        n = e.title,
        r = e.icons,
        a = e.id;
    Array.isArray(r) || (r = [r]);
    var o = t.PaymentMethodLabel,
        i = t.PaymentMethodIcons;

    const style = {
        'align-items': 'center',
        'display': 'flex',
        'width': '100%'
    };

    return React.createElement("div", {
        className: "wc-oceanalipay-blocks-payment-method__label ".concat(a),
        style:style
    }, React.createElement(o, {
        text: n
    }), React.createElement(i, {
        icons: r
    }))
};
const Oceanalipay_Block_Gateway = {
    name: 'oceanalipay',

    label: React.createElement(I, {
        id: "oceanalipay",
        title: oceanalipay_settings.title,
        icons: oceanalipay_settings.icons
    }),

    content: Object( window.wp.element.createElement )( oceanalipay_Content, null ),
    edit: Object( window.wp.element.createElement )( oceanalipay_Content, null ),
    canMakePayment: () => true,
    ariaLabel: oceanalipay_label,
    // placeOrderButtonLabel: window.wp.i18n.__( 'Proceed to Oceanpayment', 'oceanpayment-alipay-gateway' ),
  /*  supports: {
        features: oceanalipay_settings.supports,
    },*/
};

window.wc.wcBlocksRegistry.registerPaymentMethod( Oceanalipay_Block_Gateway );
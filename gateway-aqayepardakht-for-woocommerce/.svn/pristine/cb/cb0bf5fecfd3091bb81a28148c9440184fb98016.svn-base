const aqayepardakht_settings = window.wc.wcSettings.getSetting('WC_aqayepardakht_data', {});
const aqayepardakht_label = window.wp.htmlEntities.decodeEntities(aqayepardakht_settings.title) || window.wp.i18n.__('آقای پرداخت', 'woocommerce');

const Aqayepardakht_icon =  Object(window.wp.element.createElement)('img', {
    src: aqayepardakht_settings.icon, 
    alt: window.wp.htmlEntities.decodeEntities(aqayepardakht_settings.title),
    style: { marginLeft: '10px', height: '24px',display:'inline-block' }, 
});

const aqayepardakht_label_with_icon = window.wp.element.createElement('span', null, [
    Aqayepardakht_icon,
    aqayepardakht_label,
]);

const aqayepardakht_Content = () => {
    return window.wp.htmlEntities.decodeEntities(aqayepardakht_settings.description || 'پرداخت امن به وسیله کلیه کارت های عضو شتاب از طریق درگاه آقای پرداخت');
};

const Aqayepardakht_Block_Gateway = {
    name: 'WC_aqayepardakht',
    label: aqayepardakht_label_with_icon,
    content: Object(window.wp.element.createElement)(aqayepardakht_Content, null),
    edit: Object(window.wp.element.createElement)(aqayepardakht_Content, null),
    canMakePayment: () => true,
    ariaLabel: aqayepardakht_label,
    supports: {
        features: aqayepardakht_settings.supports,
    },
};

window.wc.wcBlocksRegistry.registerPaymentMethod(Aqayepardakht_Block_Gateway);

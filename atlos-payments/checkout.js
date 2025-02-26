// const settings = window.wc.wcSettings.getSetting('atlos-payments', {});
const settings = window.wc.wcSettings.getSetting('paymentMethodData')["atlos-payments"];
const label = window.wp.htmlEntities.decodeEntities(settings.title) || window.wp.i18n.__('ATLOS Crypto Payments', 'atlos-payments');
const Content = () => {
    return window.wp.htmlEntities.decodeEntities(settings.description || '');
};
const Block_Gateway = {
    name: 'atlos-payments',
    label: label,
    content: Object(window.wp.element.createElement)(Content, null),
    edit: Object(window.wp.element.createElement)(Content, null),
    canMakePayment: () => true,
    ariaLabel: label,
    supports: {
        features: [
            "products",
            "subscriptions",
            "yith_subscription",
            "yith_subscriptions",
            "yith_subscription_pause",
            "yith_subscription_pay_method_customer",
            "yith_subscriptions_multiple",
            "yith_subscriptions_scheduling",
            "yith_subscriptions_pause",
            "yith_subscriptions_payment_date",
            "yith_subscriptions_recurring_amount",
            "ywsbs_subscription",
            "_ywsbs_subscription",
        ],
    },
};
window.wc.wcBlocksRegistry.registerPaymentMethod(Block_Gateway);
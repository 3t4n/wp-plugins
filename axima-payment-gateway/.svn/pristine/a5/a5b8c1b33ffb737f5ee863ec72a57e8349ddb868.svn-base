const settings = window.wc.wcSettings.getSetting('pays_data', {});
const label = window.wp.htmlEntities.decodeEntities(settings.title);
const Content = () => {
    return window.wp.htmlEntities.decodeEntities(settings.description || '');
};

const PaysGateway = {
    name: 'pays',
    label: label,
    content: window.wp.element.createElement(Content, null),
    edit: window.wp.element.createElement(Content, null),
    canMakePayment: () => true,
    ariaLabel: label,
    supports: {
        features: settings.supports,
    },
};

window.wc.wcBlocksRegistry.registerPaymentMethod(PaysGateway);
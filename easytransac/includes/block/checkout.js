const { registerPaymentMethod } = window.wc.wcBlocksRegistry;

const settings = window.wc.wcSettings.getSetting( 'easytransac_data', {} );
const label = window.wp.htmlEntities.decodeEntities( settings.title ) || window.wp.i18n.__( 'Easytransac', 'wc-easytransac' );
const Content = () => {
    return window.wp.htmlEntities.decodeEntities( settings.description || '' );
};

const Block_Gateway = {
    name: 'easytransac',
    label: label,
    content: Object(window.wp.element.createElement)('div', { dangerouslySetInnerHTML : {__html: settings.description} } ),
    edit: Object(window.wp.element.createElement)(Content, null),
    canMakePayment: () => true,
    ariaLabel: label,
    supports: {
        features: settings.supports,
    },
};

registerPaymentMethod( Block_Gateway );
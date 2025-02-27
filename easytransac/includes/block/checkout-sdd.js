const { registerPaymentMethodSdd } = window.wc.wcBlocksRegistry;

const settingsSdd = window.wc.wcSettings.getSetting( 'easytransac-sdd_data', {} );
const labelSdd = window.wp.htmlEntities.decodeEntities( settingsSdd.title ) || window.wp.i18n.__( 'Easytransac', 'wc-easytransac' );
const ContentSdd = () => {
    return window.wp.htmlEntities.decodeEntities( settingsSdd.description || '' );
};

const Block_Gateway_Sdd = {
    name: 'easytransac-sdd',
    label: labelSdd,
    content: Object(window.wp.element.createElement)('div', { dangerouslySetInnerHTML : {__html: settingsSdd.description} } ),
    edit: Object(window.wp.element.createElement)(ContentSdd, null),
    canMakePayment: () => true,
    ariaLabel: labelSdd,
    supports: {
        features: settings.supports,
    },
};

registerPaymentMethod( Block_Gateway_Sdd );
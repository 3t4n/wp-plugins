(function() {
    const settings = window.wc.wcSettings.getSetting('duitnowqriswallet-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('DuitNow QRIS Wallet', 'bayarcash-wc');

    const DuitNowQRISWalletContent = () => {
        return createElement(
            'div',
            { className: 'duitnowqriswallet-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'duitnowqriswallet-wc-label',
            style: {
                display: 'flex',
                justifyContent: 'space-between',
                alignItems: 'center',
                width: '100%'
            }
        },
        createElement('span', null, label),
        settings.icon && createElement('img', {
            src: settings.icon,
            alt: label,
            className: 'duitnowqriswallet-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const DuitNowQRISWalletGateway = {
        name: 'duitnowqriswallet-wc',
        label: labelElement,
        content: createElement(DuitNowQRISWalletContent, null),
        edit: createElement(DuitNowQRISWalletContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(DuitNowQRISWalletGateway);
})();
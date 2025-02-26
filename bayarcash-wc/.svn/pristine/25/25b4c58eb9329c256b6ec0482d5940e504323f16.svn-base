(function() {
    const settings = window.wc.wcSettings.getSetting('duitnowqr-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('DuitNow QR', 'bayarcash-wc');

    const DuitNowQRContent = () => {
        return createElement(
            'div',
            { className: 'duitnowqr-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'duitnowqr-wc-label',
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
            className: 'duitnowqr-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const DuitNowQRGateway = {
        name: 'duitnowqr-wc',
        label: labelElement,
        content: createElement(DuitNowQRContent, null),
        edit: createElement(DuitNowQRContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(DuitNowQRGateway);
})();
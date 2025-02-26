(function() {
    const settings = window.wc.wcSettings.getSetting('duitnowqris-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('DuitNow QRIS', 'bayarcash-wc');

    const DuitNowQRISContent = () => {
        return createElement(
            'div',
            { className: 'duitnowqris-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'duitnowqris-wc-label',
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
            className: 'duitnowqris-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const DuitNowQRISGateway = {
        name: 'duitnowqris-wc',
        label: labelElement,
        content: createElement(DuitNowQRISContent, null),
        edit: createElement(DuitNowQRISContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(DuitNowQRISGateway);
})();
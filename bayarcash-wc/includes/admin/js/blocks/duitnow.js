(function() {
    const settings = window.wc.wcSettings.getSetting('duitnow-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('DuitNow Online Banking', 'bayarcash-wc');

    const DuitNowContent = () => {
        return createElement(
            'div',
            { className: 'duitnow-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'duitnow-wc-label',
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
            className: 'duitnow-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const DuitNowGateway = {
        name: 'duitnow-wc',
        label: labelElement,
        content: createElement(DuitNowContent, null),
        edit: createElement(DuitNowContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(DuitNowGateway);
})();
(function() {
    const settings = window.wc.wcSettings.getSetting('bayarcash-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('FPX Online Banking', 'bayarcash-wc');

    const BayarcashContent = () => {
        return createElement(
            'div',
            { className: 'bayarcash-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'bayarcash-wc-label',
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
            className: 'bayarcash-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const BayarcashGateway = {
        name: 'bayarcash-wc',
        label: labelElement,
        content: createElement(BayarcashContent, null),
        edit: createElement(BayarcashContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(BayarcashGateway);
})();
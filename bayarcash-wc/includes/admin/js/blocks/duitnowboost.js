(function() {
    const settings = window.wc.wcSettings.getSetting('duitnowboost-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('DuitNow Boost PayFlex', 'bayarcash-wc');

    const DuitNowBoostContent = () => {
        return createElement(
            'div',
            { className: 'duitnowboost-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'duitnowboost-wc-label',
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
            className: 'duitnowboost-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const DuitNowBoostGateway = {
        name: 'duitnowboost-wc',
        label: labelElement,
        content: createElement(DuitNowBoostContent, null),
        edit: createElement(DuitNowBoostContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(DuitNowBoostGateway);
})();
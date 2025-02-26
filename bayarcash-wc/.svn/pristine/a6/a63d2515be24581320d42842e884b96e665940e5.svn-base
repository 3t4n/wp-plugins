(function() {
    const settings = window.wc.wcSettings.getSetting('duitnowshopee-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('DuitNow ShopeePay Later', 'bayarcash-wc');

    const DuitNowShopeeContent = () => {
        return createElement(
            'div',
            { className: 'duitnowshopee-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'duitnowshopee-wc-label',
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
            className: 'duitnowshopee-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const DuitNowShopeeGateway = {
        name: 'duitnowshopee-wc',
        label: labelElement,
        content: createElement(DuitNowShopeeContent, null),
        edit: createElement(DuitNowShopeeContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(DuitNowShopeeGateway);
})();
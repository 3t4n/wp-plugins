(function() {
    const settings = window.wc.wcSettings.getSetting('linecredit-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('Line Credit', 'bayarcash-wc');

    const LineCreditContent = () => {
        return createElement(
            'div',
            { className: 'linecredit-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'linecredit-wc-label',
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
            className: 'linecredit-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const LineCreditGateway = {
        name: 'linecredit-wc',
        label: labelElement,
        content: createElement(LineCreditContent, null),
        edit: createElement(LineCreditContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(LineCreditGateway);
})();
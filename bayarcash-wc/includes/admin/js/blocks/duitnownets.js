(function() {
    const settings = window.wc.wcSettings.getSetting('duitnownets-wc_data', {});
    const { createElement } = window.wp.element;

    const label = window.wp.htmlEntities.decodeEntities(settings.title) ||
        window.wp.i18n.__('DuitNow NETS', 'bayarcash-wc');

    const DuitNowNETSContent = () => {
        return createElement(
            'div',
            { className: 'duitnownets-wc-container' },
            window.wp.htmlEntities.decodeEntities(settings.description || '')
        );
    };

    const labelElement = createElement(
        'div',
        {
            className: 'duitnownets-wc-label',
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
            className: 'duitnownets-wc-icon',
            style: {
                height: '24px',
                verticalAlign: 'middle'
            }
        })
    );

    const DuitNowNETSGateway = {
        name: 'duitnownets-wc',
        label: labelElement,
        content: createElement(DuitNowNETSContent, null),
        edit: createElement(DuitNowNETSContent, null),
        canMakePayment: () => true,
        ariaLabel: label,
        supports: {
            features: settings.supports,
        },
    };

    window.wc.wcBlocksRegistry.registerPaymentMethod(DuitNowNETSGateway);
})();
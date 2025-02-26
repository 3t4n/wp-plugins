jQuery(function ($) {
    
    if (typeof window.wc !== 'undefined' && typeof window.wp !== 'undefined' && typeof window.wc.wcSettings !== 'undefined' && typeof window.wc.wcBlocksRegistry !== 'undefined') {
        const settings = window.wc.wcSettings.getSetting('amwalcheckout_data', {});
        const label = window.wp.htmlEntities.decodeEntities(settings.title) || window.wp.i18n.__('Quick Checkout', 'amwal-checkout');

        const Icon = () => {
            return settings.icon
                ? window.wp.element.createElement('img', {
                    src: settings.icon, id: 'amwalcheckout-logo', style: {
                        maxWidth: '70px',
                        float: 'right',
                        paddingTop: '6px'
                    }
                })
                : null;
        };

        const Content = () => {
            return window.wp.htmlEntities.decodeEntities(settings.description || window.wp.i18n.__( 'Pay securely with MADA, credit cards or with Apple Pay', 'amwal-checkout' ));
        };

        const LabelWithIcon = () => {
            return window.wp.element.createElement('span', { style: { width: '100%' } }, label, window.wp.element.createElement(Icon));
        };

        const Block_Gateway = {
            name: 'amwalcheckout',
            label: window.wp.element.createElement(LabelWithIcon),
            content: window.wp.element.createElement(Content, null),
            edit: window.wp.element.createElement(Content, null),
            canMakePayment: () => true,
            ariaLabel: label,
            supports: {
                features: settings.supports,
            },
        };

        window.wc.wcBlocksRegistry.registerPaymentMethod(Block_Gateway);

        // Append the dynamic CSS
        const css = `
         html[lang="en"] #amwalcheckout-logo {
             float: right !important;
         }
         html[lang="ar"] #amwalcheckout-logo {
             float: left !important;
         }
     `;

        const style = document.createElement('style');
        style.appendChild(document.createTextNode(css));
        document.head.appendChild(style);
    }
});
(() => {
    "use strict";

    const { React } = window;
    const { __ } = window.wp.i18n;
    const { registerPaymentMethod } = window.wc.wcBlocksRegistry;
    const { decodeEntities } = window.wp.htmlEntities;

    const PLUGIN_NAME = 'woo-gutenberg-products-block';
    const DEFAULT_ICON_SIZE = { width: '100px', height: '80px' };

    const mintpayData = window.wc.wcSettings.getSetting("mintpay_data", {
        title: "Pay Better with Mintpay",
        description: "Pay Now for Instant Cashback | Pay Later in 3 Interest-Free Instalments",
        supports: {},
        icon: 'https://mintpay-static-files.s3.ap-south-1.amazonaws.com/static/base/logo/mintpay_new_payment_logo.webp'
    });

    const defaultTitle = __("Mintpay Payments", PLUGIN_NAME);
    const paymentTitle = decodeEntities(mintpayData.title) || defaultTitle;

    const getDescription = () => decodeEntities(mintpayData.description || "");

    const renderIcon = () => {
        if (!mintpayData.icon) return null;
        return React.createElement("img", {
            src: mintpayData.icon,
            alt: paymentTitle,
            style: {
                // ...DEFAULT_ICON_SIZE,
                // objectFit: 'contain',
            }
        });
    };

    const Label = () => {
        return React.createElement("div", {
                style: {
                    display: 'flex',
                    justifyContent: 'space-between',
                    alignItems: 'center',
                    width: '100%',
                }
            },
            React.createElement("span", null, paymentTitle),
            renderIcon()
        );
    };

    const paymentMethod = {
        name: "mintpay",
        label: React.createElement(Label, null),
        content: React.createElement(getDescription, null),
        edit: React.createElement(getDescription, null),
        canMakePayment: () => true,
        ariaLabel: paymentTitle,
        supports: { features: mintpayData.supports },
        Icon: renderIcon,
    };

    registerPaymentMethod(paymentMethod);
})();
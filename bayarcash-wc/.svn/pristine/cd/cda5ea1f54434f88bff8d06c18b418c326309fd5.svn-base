(() => {
    const { PAYMENT_STORE_KEY } = window.wc.wcBlocksData;
    const { extensionCartUpdate } = window.wc.blocksCheckout;
    const { subscribe, select } = wp.data;

    subscribe(function() {
        const activePaymentMethod = select(PAYMENT_STORE_KEY).getActivePaymentMethod();
        extensionCartUpdate({
            namespace: "bayarcash-checkout-fees",
            data: {
                payment_method: activePaymentMethod
            }
        });
    }, PAYMENT_STORE_KEY);
})();
const {registerCheckoutFilters} = window.wc.blocksCheckout;

const woofsCartItemClass = (defaultValue, extensions, args) => {
    const isCartContext = args?.context === 'cart';

    if (!isCartContext) {
        return defaultValue;
    }

    if (args?.cartItem?.woofs_main) {
        defaultValue += ' woofs-main';
    }

    if (args?.cartItem?.woofs_linked) {
        defaultValue += ' woofs-linked';
    }

    if (args?.cartItem?.woofs_hide_linked) {
        defaultValue += ' woofs-hide-linked';
    }

    return defaultValue;
};

const woofsShowRemoveItemLink = (defaultValue, extensions, args) => {
    const isCartContext = args?.context === 'cart';

    if (!isCartContext) {
        return defaultValue;
    }

    if (args?.cartItem?.woofs_linked) {
        return false;
    }

    return defaultValue;
};

registerCheckoutFilters('woofs-blocks', {
    cartItemClass: woofsCartItemClass, showRemoveItemLink: woofsShowRemoveItemLink,
});

// https://github.com/woocommerce/woocommerce-blocks/blob/trunk/docs/third-party-developers/extensibility/checkout-block/available-filters/cart-line-items.md
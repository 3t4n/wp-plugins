import { dispatch, select } from '@wordpress/data';

const { registerPlugin } = wp.plugins;
const render = () => {
	const { CART_STORE_KEY } = window.wc.wcBlocksData;
	const store = select(CART_STORE_KEY);
	const cartData = store.getCartData();

	if (cartData.extensions?.muzapay?.has_mixed_categories && cartData.extensions?.muzapay?.mixed_categories_notice) {
		const context = 'wc/checkout';
		dispatch('core/notices').createNotice(
			'warning',
			cartData.extensions?.muzapay?.mixed_categories_notice,
			{ context },
		);
	}
};

registerPlugin('muzapay-checkout', {
	render,
	scope: 'woocommerce-checkout',
});

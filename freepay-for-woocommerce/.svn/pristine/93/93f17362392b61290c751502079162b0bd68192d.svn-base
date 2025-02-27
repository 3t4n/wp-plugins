
import { sprintf, __ } from '@wordpress/i18n';
import { registerPaymentMethod } from '@woocommerce/blocks-registry';
import { decodeEntities } from '@wordpress/html-entities';
import { getSetting } from '@woocommerce/settings';

const settings = getSetting( 'freepay_data', {} );

const defaultLabel = __(
	'Kort betaling',
	'woo-gutenberg-products-block'
);

const label = decodeEntities( settings.title ) || defaultLabel;
/**
 * Content component
 */
const Content = () => {
	return <div class="freepay-payment-block-cards"><div class="freepay-payment-block-cards-description">{decodeEntities( settings.description || '' )}</div><div class="freepay-payment-block-card-icons">{settings.icons.map((icon, i) => { return <img class="freepay-payment-block-card-icon" style={{maxHeight: settings.iconMaxHeight + 'px'}} src={icon} />; })}</div></div>;
};
/**
 * Label component
 *
 * @param {*} props Props from payment API.
 */
const Label = ( props ) => {
	const { PaymentMethodLabel } = props.components;
	return <PaymentMethodLabel text={ label } />;
};

/**
 * Freepay payment method config object.
 */
const FreepayObj = {
	name: "freepay",
	label: <Label />,
	content: <Content />,
	edit: <Content />,
	canMakePayment: () => true,
	ariaLabel: label,
	supports: {
		features: settings.supports,
	},
};

registerPaymentMethod( FreepayObj );

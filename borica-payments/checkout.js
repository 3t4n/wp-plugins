/**
 * Borica_Payment_Gateway_Blocks checkout blocks
 *
 * PHP version 8
 *
 * @category Payment Gateway
 * @package  Borica_Woo_Payment_Gateway
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */

const settings_borica = window.wc.wcSettings.getSetting( 'borica_woo_payment_gateway_data', {} );
const label_borica    = window.wp.htmlEntities.decodeEntities( settings_borica.title );

var createElement = window.wp.element.createElement;
var useEffect     = window.wp.element.useEffect;

const Content_borica = () => {
	return createElement(
		'div',
		{ },
		createElement(
			'div',
			{ className: 'borica_panel' },
			createElement( 'img', { className: 'borica_cards', src: settings_borica.img_src, title: settings_borica.title }, ),
			createElement( 'h4', { }, settings_borica.processed_by ),
		)
	);
};

const Block_Gateway_Borica = {
	name: 'borica_woo_payment_gateway',
	label: label_borica,
	content: Object( window.wp.element.createElement )( Content_borica, null ),
	edit: Object( window.wp.element.createElement )( Content_borica, null ),
	canMakePayment: () => true,
	ariaLabel: label_borica,
	supports: {
		features: settings_borica.supports,
	},
};
window.wc.wcBlocksRegistry.registerPaymentMethod( Block_Gateway_Borica );

const boricaPaymentButtonLabelUpdater           = ({ boricaPaymentMethodsArray }) => {
	useEffect(
		() => {
			const boricaUpdatePaymentButtonText = ( selectedMethod ) => {
				const boricaPaymentButton       = document.querySelector( 'button.wc-block-components-checkout-place-order-button' );
				if (boricaPaymentButton) {
					if (parseInt(settings_borica.borica_direct) === 1) {
						if (selectedMethod === 'borica_woo_payment_gateway') {
							boricaPaymentButton.innerHTML = '<span class="wc-block-components-button__text">' + settings_borica.borica_btn_pay_text + '</span>';
						} else {
							boricaPaymentButton.innerHTML = '<span class="wc-block-components-button__text">' + settings_borica.borica_btn_place_order_text + '</span>';
						}
					}
				}
			};
			const boricaCheckAndAttachListeners     = () => {
				const boricaPaymentMethodsContainer = document.querySelector( '#payment-method' );
				if (boricaPaymentMethodsContainer) {
					const boricaObserver                           = new MutationObserver(
						() => {
							boricaPaymentMethodsArray.forEach(
								(method) => {
									const boricaPaymentMethodRadio = document.querySelector( `input[value = "${method.name}"]` );
									if (boricaPaymentMethodRadio) {
										boricaPaymentMethodRadio.addEventListener(
											'change',
											(event) => {
												boricaUpdatePaymentButtonText( event.target.value );
											}
										);
									}
								}
							);
						}
					);

					boricaObserver.observe( boricaPaymentMethodsContainer, { childList: true, subtree: true } );

					const boricaSelectedMethod = document.querySelector( 'input[name="payment_method"]:checked' ) ?.value;
					if ( boricaSelectedMethod ) {
						boricaUpdatePaymentButtonText( boricaSelectedMethod );
					}

					return () => {
						boricaObserver.disconnect();
					};
				} else {
					setTimeout( boricaCheckAndAttachListeners, 100 );
				}
			};
			boricaCheckAndAttachListeners();
		},
		[boricaPaymentMethodsArray]
	);

	return null;
};

const boricaRegisterPaymentButtonLabelUpdater = () => {
	const boricaPaymentMethods                = window.wc.wcBlocksRegistry.getPaymentMethods();
	const boricaPaymentMethodsArray           = Object.values( boricaPaymentMethods );
	if (boricaPaymentMethodsArray.length) {
		const boricaListenerElement = document.createElement( 'div' );
		boricaListenerElement.id    = 'borica-payment-button-label-updater';
		document.body.appendChild( boricaListenerElement );
		window.wp.element.render(
			createElement( boricaPaymentButtonLabelUpdater, { boricaPaymentMethodsArray } ),
			document.getElementById( 'borica-payment-button-label-updater' )
		);
	}
};

document.addEventListener( 'DOMContentLoaded', boricaRegisterPaymentButtonLabelUpdater );
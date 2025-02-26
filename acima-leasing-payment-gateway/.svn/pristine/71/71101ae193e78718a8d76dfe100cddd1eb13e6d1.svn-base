import { sprintf, __ } from '@wordpress/i18n';
import { registerPaymentMethod } from '@woocommerce/blocks-registry';
import { decodeEntities } from '@wordpress/html-entities';
import { getSetting } from '@woocommerce/settings';
import { useEffect, useState } from '@wordpress/element';
import { processAcimaPayment } from './block-checkout';

const settings = getSetting('acima_credit_data', {});
const defaultLabel = __('Acima Leasing', 'acima_credit');
const label = decodeEntities(settings.title) || defaultLabel;

const Content = (props) => {
    const { eventRegistration, emitResponse } = props;
    const { onPaymentProcessing, onCheckoutAfterProcessingWithError, onCheckoutValidation,onCheckoutSuccess } = eventRegistration;
    const [checkoutData, setCheckoutData] = useState(null);
    const [orderNonce, setOrderNonce] = useState(null);

    useEffect(() => {
        const fetchCheckoutData = async () => {
            console.log(`storeApiNonce: ${settings.storeApiNonce}`);
            console.log(`restApiNonce: ${settings.restApiNonce}`);

            try {
                // First request - fetch checkout data
                const response = await fetch('/wp-json/wc/store/v1/checkout', {
                    method: 'GET',
                    headers: {
                        'Nonce': settings.storeApiNonce,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                });

                if (!response.ok) {
                    throw new Error(`Failed to fetch checkout data: ${response.status}`);
                }

                const data = await response.json();
                setCheckoutData(data);
                console.log('Checkout data fetched:', data);

                // Second request - generate order nonce
                const nonceResponse = await fetch('/wp-json/wc-acima-credit/v1/generate-order-nonce', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': settings.restApiNonce, // Add REST API nonce
                    },
                    body: JSON.stringify({ order_id: data.order_id })
                });

                if (!nonceResponse.ok) {
                    throw new Error(`Failed to generate nonce: ${nonceResponse.status}`);
                }

                const nonceData = await nonceResponse.json();
                console.log('Received nonce from server:', nonceData.nonce);
                setOrderNonce(nonceData.nonce);
            } catch (error) {
                console.error('Acima Credit: Error fetching checkout data:', error);
            }
        };

        fetchCheckoutData();
    }, []);

    useEffect(() => {
        const unsubscribeValidation = onCheckoutValidation(() => {
            console.log('Acima Credit: onCheckoutValidation called');
            return true;
        });

        const unsubscribePaymentProcessing = onPaymentProcessing(async () => {
            if (!checkoutData || !orderNonce) {
                console.log('Acima Credit: Checkout data or order nonce not available');
                return {
                    type: emitResponse.responseTypes.ERROR,
                    message: 'Checkout data or order nonce not available',
                };
            }

            try {
                console.log('Acima Credit: Payment setup initiated');

                const success = await processAcimaPayment({
                    customerData: {
                        billingAddress: checkoutData.billing_address,
                        shippingAddress: checkoutData.shipping_address,
                    },
                    transactionData: {
                        orderId: checkoutData.order_id,
                        orderKey: checkoutData.order_key,
                    },
                    orderNonce: orderNonce,
                    storeApiNonce: settings.storeApiNonce
                });

                if (success) {
                    return { type: emitResponse.responseTypes.SUCCESS };
                } else {
                    throw new Error('Acima Credit checkout failed');
                }
            } catch (error) {
                console.error('Acima Credit: Error processing payment:', error);
                return {
                    type: emitResponse.responseTypes.ERROR,
                    message: error.message || 'An error occurred while processing your payment.',
                };
            }
        });

        const unsubscribeSuccess = onCheckoutSuccess((checkoutSuccessData) => {
            if (checkoutSuccessData.paymentResult.paymentDetails.isAcimaCredit) {
                // Prevent further processing and redirect
                window.location.replace(checkoutSuccessData.redirectUrl);
                return false; // Stops further processing
            }
            return true;
        });

        const unsubscribeError = onCheckoutAfterProcessingWithError(() => {
            console.log('Acima Credit: Error occurred after processing');
            return { type: emitResponse.responseTypes.ERROR };
        });

        return () => {
            unsubscribeValidation();
            unsubscribePaymentProcessing ();
            unsubscribeError();
            unsubscribeSuccess();
        };
    }, [
        onCheckoutValidation,
        checkoutData,
        orderNonce,
        onPaymentProcessing,
        onCheckoutAfterProcessingWithError,
        onCheckoutSuccess,
        emitResponse.responseTypes
    ]);

    return (
        <div dangerouslySetInnerHTML={{ __html: decodeEntities(settings.description || '') }} />
    );
};

const Label = (props) => {
    const { PaymentMethodLabel } = props.components;
    return <PaymentMethodLabel text={label} />;
};

const Acima = {
    name: 'acima_credit',
    label: <Label />,
    content: <Content />,
    edit: <Content />,
    canMakePayment: () => true,
    ariaLabel: label,
    supports: {
        features: settings.supports,
    },
};

registerPaymentMethod(Acima);
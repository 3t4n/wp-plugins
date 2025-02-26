import { AcimaCreditCheckout } from './acima-credit-checkout';
import { getSetting } from '@woocommerce/settings';

const settings = getSetting('acima_credit_data', {});

const processAcimaPayment = async (paymentData) => {
    try {
        const response = await fetch('/wp-json/wc-acima-credit/v1/process-payment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': window.acimaBlockCheckout.nonce || '',
            },
            body: JSON.stringify({
                payment_method: window.acimaCredit.payment_method,
                order_id: paymentData.transactionData.orderId,
            }),
        });

        const data = await response.json();

        if (data.success) {
            const checkout = new AcimaCreditCheckout(
                settings,
                data.customer_data,
                data.transaction_data,
                data.thank_you_page,
                paymentData.transactionData.orderId,
                paymentData.orderNonce,
                paymentData.storeApiNonce
            );
            const result = await checkout.initCheckout();
            return {
                success: data.success,
                isAcimaCredit: true,
                ...result
            };
        } else {
            throw new Error(data.message || 'Payment processing failed.');
        }
    } catch (error) {
        console.error('Error during Acima payment processing:', error);
        throw error;
    }
};

export { processAcimaPayment };
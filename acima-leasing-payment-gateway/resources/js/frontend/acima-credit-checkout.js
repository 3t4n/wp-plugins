export class AcimaCreditCheckout {
    constructor(settings, customerData, transactionData, thankYouPage, orderId, nonce) {
        this.settings  = settings ;
        this.client = null;
        this.customer = customerData;
        this.transaction = transactionData;
        this.thankYouPage = thankYouPage;
        this.orderId = orderId;
        this.nonce = nonce;
        console.log('AcimaCreditCheckout constructor called with settings:', settings);
    }

    redirectToThankYouPage() {
        if (this.thankYouPage) {
            // Prevent back navigation using replace
            window.location.replace(this.thankYouPage);
        } else {
            console.error('Thank you page URL is not set');
        }
    }

    async initCheckout() {
        try {
            console.log('Initiating checkout with client:', window.AcimaCredit.client);
            return window.AcimaCredit.client.checkout({
                customer: this.customer,
                transaction: this.transaction,
                isSuccessCallbackMode: true,
                onSuccess: (response) => this.success(response),
                onError: (error) => this.handleError(error),
                onEventNotification: (result) => this.onEventNotification(result)
            }).then(async (response) => {
                console.log("Checkout response:", JSON.stringify(response));
                await this.closeOrder(response);
                response.createOrderComplete();
                this.redirectToThankYouPage();
                return response;
            }).catch((error) => {
                if (error.code === 'CheckoutInterrupted') {
                    console.log(error.message);
                } else {
                    console.error("Unhandled error:", error);
                }
                throw error;
            });
        } catch (error) {
            console.error('Error during checkout initialization:', error);
            throw error;
        }
    }

    handleError(error) {
        console.error("Checkout error:", error);
    }

    onEventNotification(result) {
        console.log("onCheckoutSuccessful:", result);
        const leaseId = result.leaseId || result.applicationId;
        if (leaseId) {
            this.saveLeaseInfo(result);
        }
    }

    async closeOrder(result) {
        console.log('this.nonce:', this.nonce);
        const data = {
            action: 'acima_leasing_checkout_successful',
            order: this.orderId,
            nonce: window.acimaBlockCheckout.nonce,
            lease_id: result.leaseId || result.applicationId,
            checkout_token: result.checkoutToken,
            is_acima_credit: true,
            is_block_checkout: true
        };

        console.log('Closing order with data:', data);

        try {
            const ajaxUrl = window.acimaCredit?.ajax_url ||
                (window.woocommerce_params && window.woocommerce_params.ajax_url);

            const response = await fetch(ajaxUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(data).toString()
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const responseData = await response.json();
            console.log('Order closing response:', responseData);

            if (responseData.success) {
                console.log('Order closed successfully');
                return { isAcimaCredit: true, ...responseData };
            } else {
                console.error('Error closing order:', responseData);
                throw new Error('Failed to close order');
            }
        } catch (error) {
            console.error('Error in closeOrder:', error);
            throw error;
        }
    }

    saveLeaseInfo(result) {
        const data = JSON.stringify({
            leaseId: result.leaseId || result.applicationId,
            leaseNumber: result.leaseNumber,
            orderId: this.orderId
        });

        fetch('/?rest_route=/acima/v1/cancel-checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': acimaCredit.rest_nonce
            },
            body: data,
        })
            .then(response => response.json())
            .then(data => console.log('Lease saved successfully:', data))
            .catch(error => console.error('Error saving lease:', error));
    }
}
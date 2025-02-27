/**
 * @description Moyasar Triggers
 */
const __mysr_triggers = window.wp.i18n.__

class MoyasarTriggers {

    /**
     * @description Register the payment methods to prevent multiple events
     * use-case: apply coupon code this will re-render the payment box
     * @type {[]}
     */
    static registeredMethods = []

    /**
     * @description Register Submit Event
     * @param method
     */
    static registerForm(method) {
        const checkoutForm = jQuery('form.woocommerce-checkout');
        // Loop through the registered methods and remove the event
        MoyasarTriggers.registeredMethods.forEach((method) => {
            checkoutForm.off('checkout_place_order', method);
        });
        MoyasarTriggers.registeredMethods = [];
        checkoutForm.on('checkout_place_order', method);
        MoyasarTriggers.registeredMethods.push(method)
    }

    /**
     * @description un register Submit Event
     * @param method
     */
    static unRegisterForm(method) {
        const checkoutForm = jQuery('form.woocommerce-checkout');
        checkoutForm.off('checkout_place_order', method);
    }

    /**
     * @description Detect if the selected payment method then trigger the callback
     * @param methodId
     * @param cb
     * @returns {boolean}
     */
    static detectSelectedPaymentMethod(methodId, cb) {
        // Add event on change
        document.querySelectorAll('input[id^="payment_method"]').forEach((element) => {
            element.addEventListener('change', (event) => {
                let selectedPaymentMethod = event.target.value;
                if (selectedPaymentMethod === methodId) {
                    cb(true);
                } else {
                    cb(false);
                }
            });
        });
    }

    /**
     * @description Return the selected payment method
     * @returns {*}
     */
    static selectedPaymentMethod() {
        const checkoutForm = jQuery('form.woocommerce-checkout')
        const val = checkoutForm.find('input[name="payment_method"]:checked').val()
        if (!val){
            return ''
        }
        // Remove spaces
        return val.replace(/\s/g, '');
    }

    /**
     * @description Add error message to the form/payment box
     * @param error_messages
     */
    static submitError(error_messages) {
        let randomId = 'mysr_'+ Math.floor(Math.random() * 1000)
        // Loop through the error messages and make them li
        let error_message = ''
        error_messages.forEach((message) => {
            error_message += '<li>' + __mysr_triggers(message, 'moyasar') + '</li>'
        });

        const checkoutForm = jQuery('form.woocommerce-checkout')
        // Get Current Payment Method
        const block = checkoutForm.find('input[name="payment_method"]:checked')
        // Div in block
        const div = block.parent().find('div').first()
        // Remove the error message
        div.find('.moyasar-error-message').remove()

        if (div.length > 0) {
            div.prepend('<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-error moyasar-error-message ' + randomId + '"><ul class="woocommerce-error" role="alert">' + error_message + '</ul></div>')
        } else {
            checkoutForm.prepend('<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-error moyasar-error-message ' + randomId + '"><ul class="woocommerce-error" role="alert">' + error_message + '</ul></div>')
        }

        // Scroll to the error
        jQuery('html, body').animate({
            scrollTop: jQuery('.' + randomId).offset().top - 100
        }, 1000);
    }

    /**
     * @description Clear the error message
     */
    static clearError() {
        const checkoutForm = jQuery('form.woocommerce-checkout')
        checkoutForm.find('.moyasar-error-message').remove()
    }

    /**
     * @description Add info message to the form/payment box
     * @param info_messages
     */
    static submitInfo(info_messages) {
        // Loop through the error messages and make them li
        let info_message = ''
        info_messages.forEach((message) => {
            info_message += '<li>' + __mysr_triggers(message, 'moyasar') + '</li>'
        });

        const checkoutForm = jQuery('form.woocommerce-checkout')
        // Get Current Payment Method
        const block = checkoutForm.find('input[name="payment_method"]:checked')
        // Div in block
        const div = block.parent().find('div').first()
        // Remove the error message
        div.find('.moyasar-info-message').remove()

        if (div.length > 0) {
            div.prepend('<div class="woocommerce-message moyasar-info-message">' + info_message + '</div>')
        } else {
            checkoutForm.prepend('<div class="woocommerce-message moyasar-info-message">' + info_message + '</div>')
        }

        // Scroll to the error
        jQuery('html, body').animate({
            scrollTop: jQuery('.moyasar-info-message').offset().top - 100
        }, 1000);
    }

    /**
     * @description Submit Form Error
     * @param error_message
     */
    static submitFormError(error_message) {
        const checkoutForm = jQuery('form.woocommerce-checkout')
        jQuery('.woocommerce-NoticeGroup-checkout, .woocommerce-error, .woocommerce-message, .is-error, .is-success').remove();
        checkoutForm.prepend('<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout">' + error_message + '</div>'); // eslint-disable-line max-len
        checkoutForm.removeClass('processing').unblock();
        checkoutForm.find('.input-text, select, input:checkbox').trigger('validate').trigger('blur');
        jQuery('html, body').animate({
            scrollTop: jQuery('.woocommerce-NoticeGroup').offset().top - 100
        }, 1000);
        jQuery(document.body).trigger('checkout_error', [error_message]);
    }

}


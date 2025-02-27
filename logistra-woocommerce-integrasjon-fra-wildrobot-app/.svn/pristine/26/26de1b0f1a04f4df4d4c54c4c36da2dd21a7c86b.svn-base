(function ($) {
    'use strict';
    function bindServicePartnerHandler() {
        const container = document.querySelector('.woocommerce-wildrobot-pickuppoint-checkout-inline');
        if (!container) return;

        let servicePartnerData;
        try {
            servicePartnerData = JSON.parse(container.dataset.logistraServicePartner);
            // Validate the expected structure
            if (!servicePartnerData || !Array.isArray(servicePartnerData.servicePartners) || !servicePartnerData.ajaxUrl || !servicePartnerData.nonce) {
                console.error('Invalid service partner data structure');
                return;
            }
        } catch (e) {
            console.error('Failed to parse service partner data:', e);
            return;
        }
        // Now you can use servicePartnerData.servicePartners, servicePartnerData.ajaxUrl, etc.
        $('.logistra_robots_select_servicepartner').each(function () {
            console.log("RUNNING logistra_robots_select_servicepartner");
            // Remove existing handler to prevent duplicates
            $(this).off('change.logistra');

            // Add new handler
            $(this).on('change.logistra', function () {
                const selectedOption = $(this).find('option:selected');
                console.log("selectedOption: ", selectedOption);
                const servicePartners = servicePartnerData.servicePartners;
                console.log("servicePartners: ", servicePartners);
                const servicePartner = servicePartners.find(sp =>
                    selectedOption.val() === sp.number + "@@@" +
                    (typeof sp["customer-number"] === 'string' ? sp["customer-number"] : "")
                );

                if (!servicePartner?.number) {
                    console.log("No service partner found for option: ", selectedOption);
                    return;
                }

                $.ajax({
                    url: servicePartnerData.ajaxUrl,
                    type: 'POST',
                    data: {
                        action: 'logistra_save_service_partner',
                        service_partner_number: servicePartner.number,
                        service_partner_customer_number: servicePartner["customer-number"],
                        service_partner_name: servicePartner.name,
                        service_partner_postcode: servicePartner.postcode,
                        service_partner_city: servicePartner.city,
                        service_partner_country: servicePartner.country,
                        nonce: servicePartnerData.nonce
                    },
                    success: function (response) {
                        if (response.success) {
                            if (typeof wc_checkout_params !== 'undefined') {
                                $(document.body).trigger('update_checkout');
                            }
                        } else {
                            console.error("Error saving service partner");
                        }
                    }
                });
            });
        });
    }

    // Initial binding when document is ready
    $(document).ready(bindServicePartnerHandler);

    // Rebind after WooCommerce updates
    $(document.body).on('wc_fragments_refreshed', bindServicePartnerHandler);
    $(document.body).on('updated_checkout', bindServicePartnerHandler);
    $(document.body).on('updated_shipping_method', bindServicePartnerHandler);


})(jQuery);
jQuery(document).ready(function($) {
    if (wizbeeOrderData.redirectOrderId) {
        // Clear the transient after use
        $.post(wizbeeOrderData.ajaxUrl, {
            action: 'clear_wizbee_duplicate_order_redirect'
        });

        // Redirect to the edit page of the new order
        window.location.href = wizbeeOrderData.adminUrl + wizbeeOrderData.redirectOrderId + '&action=edit';
    }
});

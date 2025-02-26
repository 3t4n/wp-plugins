// jQuery(window).on("load", function() {
//     if (jQuery('.wp-block-woocommerce-cart-order-summary-block').length) {
//         jQuery('.wp-block-woocommerce-cart-order-summary-block').after(amwal_block.amwal_btn);
//     }
// });
// jQuery(document).ready(function($) {
//     if(jQuery('#payment-method').length){
//         jQuery('#payment-method').after(amwal_block.amwal_btn+"<br/>");

//     }
// });

jQuery(window).on("load", function() {
    if (jQuery('.wp-block-woocommerce-cart-order-summary-block').length) {
        displayAmwalBtn('cart');
    }
});
jQuery(document).ready(function($) {
    if(jQuery('#payment-method').length){
        displayAmwalBtn('checkout');
    }
});

function displayAmwalBtn(page){
    jQuery.ajax({
        url: amwal_block.btn_ajax_url, 
        type: "POST",
        data: { 
            action: "amwalwc_woo_block",              
            security: amwal_block.btn_ajax_nonce
        },
        success: function(response) {
            console.info(response)
            if (page === 'cart') {
                jQuery('.wp-block-woocommerce-cart-order-summary-block').after(response);
            }
             if(page === 'checkout'){
                jQuery('#payment-method').after(response+"<br/>");
            }
        }
    });
}
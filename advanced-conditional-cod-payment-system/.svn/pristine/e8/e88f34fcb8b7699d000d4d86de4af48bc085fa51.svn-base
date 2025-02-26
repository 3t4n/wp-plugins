<?php 

// Add custom checkbox to checkout page
function accodps_wc_advance_payment_add_checkbox() {
    global $accodps_adv_pay_per;
    global $accodps_adv_min_order_total;
    global $accodps_ap_title;
    global $accodps_ap_description;
    global $accodps_ap_checkbox_text;

    if(WC()->cart->total > $accodps_adv_min_order_total){
       echo '<div id="advance-payment-field"><h3>'. esc_html($accodps_ap_title) .'</h3>';
       if (!empty($accodps_ap_description)) {
            echo '<p>' . esc_html($accodps_ap_description) . '</p>';
        }
        woocommerce_form_field('advance_payment_checkbox', array(
            'type' => 'checkbox',
            'required' => 'true',
            'class' => array('form-row-wide'),
            'id'   =>  'advance_payment_checkbox',
            'label' => esc_html($accodps_ap_checkbox_text),
        ), WC()->checkout->get_value('advance_payment_checkbox'));
        echo '</div>';
        // Add nonce field
        wp_nonce_field('accodps_process_payment', 'accodps_payment_nonce');
    }
}
add_action('woocommerce_review_order_before_payment', 'accodps_wc_advance_payment_add_checkbox');
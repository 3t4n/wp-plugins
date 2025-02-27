<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Function to display enabled payment methods
function digages_display_enabled_payment_methods() {
    // Get gateway options
    $currency = get_woocommerce_currency();

    // Get the current user's email address and order details
    $order_id = WC()->session->get('order_id');
    $cart_total = WC()->cart->get_total();
    $user = wp_get_current_user();
    $user_email = $user->user_email; 
    
    $options = get_option('woocommerce_digages_direct_payments_settings');
    ?> 
    <?php
    // Check if the gateway itself is enabled
    if (isset($options['enabled']) && $options['enabled'] === 'yes') {
        include_once(plugin_dir_path(__FILE__) . 'step1.php'); 
        include_once(plugin_dir_path(__FILE__) . 'step2.php'); 
        include_once(plugin_dir_path(__FILE__) . 'step3.php'); 
        include_once(plugin_dir_path(__FILE__) . 'step4.php'); 
        ?>  
        <?php
        // Enqueue the jQuery script
        function digages_enqueue_scripts() {
            wp_enqueue_script(
                'digages-pop-script', // Handle
                plugin_dir_url(__FILE__) . 'pop.js', // Path to your script
                array('jquery'), // Dependencies
                '1.5.1', // Version number
                true // Load in footer
            ); 
 
            wp_localize_script('digages-pop-script', 'ajax_object', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'site_url' => site_url(),
                'nonce' => wp_create_nonce('digages_send_p2p_confirmation') // Pass the nonce to JavaScript
            ));


    // Get the total amount from the cart
    $total_amount = WC()->cart->get_total('edit'); // Get the total amount (as a float)
    
    // Localize the script
    wp_localize_script('digages-pop-script', 'digagesData', array(
        'dtumamount' => $total_amount, // Pass the total amount
    ));

        }
        add_action('wp_footer', 'digages_enqueue_scripts');
        
    } else {
        echo '<h3>Direct Payments for Woocommerce is disabled.</h3>';
    }

}
?>


<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


add_filter( 'woocommerce_product_data_tabs', 'appalify_add_product_data_tab_woo' ); //create tab in wc


$appalify_enable_preorders = (bool) get_option('appalify_enable_preorders', true);
if($appalify_enable_preorders == 1){
add_action( 'woocommerce_product_data_panels', 'appalify_wc_data' ); //enter data in wc product data
add_action( 'woocommerce_process_product_meta', 'appalify_save_product_settings' ); //save data enter in appalify_wc_data
add_action('woocommerce_before_add_to_cart_button', 'appalify_display_pre_order_message_above_button'); //add message above cart button
add_filter('woocommerce_product_single_add_to_cart_text', 'appalify_custom_pre_order_add_to_cart_button_text', 10, 2); //change cart button text
add_filter('woocommerce_get_item_data', 'appalify_add_custom_meta', 10, 2);
}





//create tab in wc
function appalify_add_product_data_tab_woo( $tabs ) {
    $tabs['appalify'] = array(
        'label'    => __( 'Appalify for Woocommerce', 'appalify' ),
        'target'   => 'appalify_ps_setup',
        'class'    => 'appalify_ps_setup',
    );

    return $tabs;
}

//enter data in wc product data
function appalify_wc_data() {
    global $post;
   
    $appalify_enabled = get_post_meta($post->ID, 'appalify_enabled', true); // New
    $appalify_custom_pre_order_text = get_post_meta($post->ID, 'appalify_preo_order_text', true);
    $appalify_cart_button_text = get_post_meta($post->ID, 'appalify_cart_button_text', true);
    $appalify_shipping_info = get_post_meta($post->ID, 'appalify_shipping_info', true);
    $appalify_aon = get_post_meta($post->ID, 'appalify_aon', true);

    $response = get_option('check_if_appalify_active');
    $appalify_wc_version = get_option('appalify_woocommerce_version');

    wp_nonce_field('appalify_save_ps_setup_nonce_action', 'appalify_ps_setup_nonce');


    ?>

    <div id="appalify_ps_setup" class="panel woocommerce_options_panel appalify-options-groups-wrapper">

        <p>
            <div style="display: inline-block;">
                <h2 style="display: inline;">Enable Pre-Orders</h2>
            </div>
            <input type="checkbox" name="appalify_enabled" id="appalify_enabled" <?php checked($appalify_enabled, 'yes'); ?>>
        </p>


    <?php     if (trim($response) === "true") { ?>
    <span style="flex: 1; margin-left: 5px;">Leave the following settings blank for global settings.</span><br>
    <p style="display: flex; align-items: center;">
        <span style="flex: 1; margin-right: 5px;">Pre-Order text:</span>
        <input type="text" name="appalify_preo_order_text_<?php echo esc_attr($post->ID); ?>" id="appalify_preo_order_text_<?php echo esc_attr($post->ID); ?>" placeholder="This is a Pre-Order." value="<?php echo esc_attr($appalify_custom_pre_order_text); ?>" style="flex: 2;">
    </p>


    <p style="display: flex; align-items: center;">
        <span style="flex: 1; margin-right: 5px;">Add to Cart text:</span>
        <input type="text" name="appalify_cart_button_text_<?php echo esc_attr($post->ID); ?>" id="appalify_cart_button_text_<?php echo esc_attr($post->ID); ?>" placeholder="Pre-Order Now" value="<?php echo esc_attr($appalify_cart_button_text); ?>" style="flex: 2;">
    </p>


    <p style="display: flex; align-items: center;">
        <span style="flex: 1; margin-right: 5px;">Available on Date:</span>
        <input type="text" name="appalify_aon_<?php echo esc_attr($post->ID); ?>" id="appalify_aon_<?php echo esc_attr($post->ID); ?>" placeholder="Select a date" value="<?php echo esc_attr($appalify_aon); ?>" style="flex: 2;" oninput="eopcheckValue(this)">
    </p>


    <p style="display: flex; align-items: center;">
        <span style="flex: 1; margin-right: 5px;">Extra Product Page Information:</span>
        <input type="text" name="appalify_shipping_info_<?php echo esc_attr($post->ID); ?>" id="appalify_shipping_info_<?php echo esc_attr($post->ID); ?>" placeholder="Shipping in 2 weeks." value="<?php echo esc_attr($appalify_shipping_info); ?>" style="flex: 2;">
    </p>
    <?php }?>
</div>
    <?php
    
}

//save data enter in appalify_wc_data
function appalify_save_product_settings($post_id) {
    if (!isset($_POST['appalify_ps_setup_nonce']) || !wp_verify_nonce(sanitize_key($_POST['appalify_ps_setup_nonce']), 'appalify_save_ps_setup_nonce_action')) {
        return; // Exit if nonce is not verified
    }
    if (isset($_POST['appalify_preo_order_text_' . $post_id])) {
        update_post_meta($post_id, 'appalify_preo_order_text', sanitize_text_field($_POST['appalify_preo_order_text_' . $post_id]));
    }
    if (isset($_POST['appalify_cart_button_text_' . $post_id])) {
        update_post_meta($post_id, 'appalify_cart_button_text', sanitize_text_field($_POST['appalify_cart_button_text_' . $post_id]));
    }
    if (isset($_POST['appalify_shipping_info_' . $post_id])) {
        update_post_meta($post_id, 'appalify_shipping_info', sanitize_text_field($_POST['appalify_shipping_info_' . $post_id]));
    }
    if (isset($_POST['appalify_aon_' . $post_id])) {
        update_post_meta($post_id, 'appalify_aon', sanitize_text_field($_POST['appalify_aon_' . $post_id]));
    }

    $appalify_enabled = isset($_POST['appalify_enabled']) ? 'yes' : 'no';
    update_post_meta($post_id, 'appalify_enabled', $appalify_enabled);
}

function appalify_display_pre_order_message_above_button() {
    global $post;
    
    // Get the custom post meta to check if the pre-order is enabled
    $appalify_enabled = get_post_meta($post->ID, 'appalify_enabled', true);
    $appalify_custom_pre_order_text = get_post_meta($post->ID, 'appalify_preo_order_text', true);
    $appalify_shipping_info = get_post_meta($post->ID, 'appalify_shipping_info', true);
    $appalify_additional_info_text = get_option('appalify_additional_info_text', 'This is a Pre-Order.');
    // Display the message if pre-order is enabled

    if ($appalify_enabled === 'yes') {

    if (!empty($appalify_custom_pre_order_text)) {
        // Use the custom product-specific pre-order text
        $pre_order_message = esc_html($appalify_custom_pre_order_text);
        if (!empty($appalify_shipping_info)) {
            $pre_order_message .= '<br>' . esc_html($appalify_shipping_info);
        }

    } elseif (!empty($appalify_additional_info_text)) {
        // Use the global option text if available
        $pre_order_message = esc_html($appalify_additional_info_text);
    }

    // Display the message if pre-order is enabled

    echo wp_kses_post($pre_order_message);
    }
}
function appalify_custom_pre_order_add_to_cart_button_text($button_text, $product) {
    global $post;

    // 1. Check if the pre-order is enabled for this product
    $appalify_enabled = get_post_meta($product->get_id(), 'appalify_enabled', true);

    $appalify_custom_pre_order_button_text = get_post_meta($post->ID, 'appalify_cart_button_text', true);
    $appalify_additional_info_text = get_option('appalify_cart_button_text', 'This is a Pre-Order.');

    // Determine the button text following the same priority: 
    // custom -> global -> default
    if (!empty($appalify_custom_pre_order_button_text)) {
        $pre_order_message = esc_html($appalify_custom_pre_order_button_text);
    } elseif (!empty($appalify_additional_info_text)) {
        $pre_order_message = esc_html($appalify_additional_info_text);
    } 

    // If pre-order is enabled, use the determined message, otherwise return the default Add to Cart text
    if ($appalify_enabled === 'yes') {
        return $pre_order_message;  // Change the button text to pre-order message
    }

    // Return default Add to Cart text if pre-order is not enabled
    return $button_text;
}
function appalify_add_custom_meta($cart_data, $cart_item) {
    // Check if the custom option 'appalify_aon' exists in the product
    $product_id = $cart_item['product_id']; // Assuming the product ID is available in the cart item.
    $appalify_custom_data = get_post_meta($product_id, 'appalify_aon', true);
    if ($appalify_custom_data && $appalify_custom_data != '0') {
        $cart_data[] = array(
            'name' => 'Available on',
            'value' => esc_html($appalify_custom_data)
        );
    }
    return $cart_data;
}

   

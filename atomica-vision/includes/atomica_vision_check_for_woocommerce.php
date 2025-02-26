<?php 

add_action('plugins_loaded', 'atomica_vision_check_for_woocommerce');

if( !function_exists("atomica_vision_check_for_woocommerce") ) {
    function atomica_vision_check_for_woocommerce() {
        add_action( 'admin_menu', 'atomica_vision_admin_menu' );
    
        if (class_exists( 'WooCommerce' )) {
            
            add_action( 'admin_init', 'atomica_vision_admin_update_settings' ); 
    
            $buttonPosition = empty(get_option( 'atomica_vision_try_on_button_position' )) ? "woocommerce_before_add_to_cart_form" : get_option( 'atomica_vision_try_on_button_position' ); 
            add_action( $buttonPosition, 'atomica_vision_show_try_on_button' );
            
            add_filter( 'woocommerce_product_data_tabs', 'atomica_vision_data_tab' );
            add_action( 'woocommerce_product_data_panels', 'atomica_vision_data_tab_content' );
            add_action( 'woocommerce_process_product_meta', 'atomica_vision_product_settings_save' );
        } 
    }
    
}


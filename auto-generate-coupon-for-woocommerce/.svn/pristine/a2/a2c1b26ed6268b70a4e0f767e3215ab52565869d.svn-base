<?php //plugin Register Settings

 // exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}
// register plugin settings
function auto_generate_coupon_register_settings() {

    register_setting(
            'auto_generate_coupon_options', 
            'auto_generate_coupon_options', 
            'auto_generate_coupon_callback_validate_options'
    );
    
    
    add_settings_section(
         'auto_generate_coupon_coupon_settings',
            esc_html__('Coupon Settings','auto_generate_coupon'),
            'auto_generate_coupon_callback_coupon_settings',
            'auto_generate_coupon'
    );
    
    add_settings_section(
         'auto_generate_coupon_custom_message',
            esc_html__('Costum Message Settings','auto_generate_coupon'),
            'auto_generate_coupon_callback_custom_message',
            'auto_generate_coupon'
    );

    add_settings_field(
            'active_campaign', 
            esc_html__('Activeate campaign','auto_generate_coupon'), 
            'auto_generate_coupon_callback_active_campaign', 
            'auto_generate_coupon',
            'auto_generate_coupon_coupon_settings',
            ['id'=>'active_campaign','label'=>esc_html__('Activeate campaign','auto_generate_coupon')]);
    
    add_settings_field(
            'discount_type', 
            esc_html__('Discount type','auto_generate_coupon'), 
            'auto_generate_coupon_callback_discount_type', 
            'auto_generate_coupon',
            'auto_generate_coupon_coupon_settings',
            ['id'=>'discount_type','label'=>esc_html__('Discount type','auto_generate_coupon')]);
    
    add_settings_field(
            'individual_use', 
            esc_html__('Individual use only','auto_generate_coupon'), 
            'auto_generate_coupon_callback_individual_use', 
            'auto_generate_coupon',
            'auto_generate_coupon_coupon_settings',
            ['id'=>'individual_use','label'=>esc_html__('Individual use only','auto_generate_coupon')]);
    
    add_settings_field(
            'discount_amount', 
                esc_html__('Discount amount','auto_generate_coupon'), 
            'auto_generate_coupon_callback_discount_amount', 
            'auto_generate_coupon',
            'auto_generate_coupon_coupon_settings',
            ['id'=>'coupon_amount','label'=>esc_html__('Discount amount','auto_generate_coupon')]);
    
    add_settings_field(
            'free_shipping', 
            esc_html__('Allow free shipping','auto_generate_coupon'), 
            'auto_generate_coupon_callback_free_shipping', 
            'auto_generate_coupon',
            'auto_generate_coupon_coupon_settings',
            ['id'=>'free_shipping','label'=>esc_html__('Allow free shipping','auto_generate_coupon')]);
    
    add_settings_field(
            'expiry_date', 
            esc_html__('Coupon expiry date','auto_generate_coupon'), 
            'auto_generate_coupon_callback_expiry_date', 
            'auto_generate_coupon',
            'auto_generate_coupon_coupon_settings',
            ['id'=>'expiry_date','label'=>esc_html__('Coupon expiry date','auto_generate_coupon')]);

    
    add_settings_field(
            'coupon_message', 
            esc_html__('Message for New Coupon','auto_generate_coupon'), 
            'auto_generate_coupon_callback_message_for_new_coupon', 
            'auto_generate_coupon',
            'auto_generate_coupon_custom_message',
            ['id'=>'coupon_message','label'=>esc_html__('Custom Message for coupon that showes on thankyou page,%s is define your coupon code','auto_generate_coupon')]);
}



add_action('admin_init', 'auto_generate_coupon_register_settings');

<?php
/**
 * Plugin Name: Elementor Form International Telephone Input
 * Plugin URI: https://add-ons.org/plugin/elementor-forms-international-phone-input-mask-field/
 * Description: Elementor International Telephone Input easy phone number input
 * Version: 1.4.8
 * Requires Plugins: elementor
 * Author: add-ons.org
 * Text Domain: elementor-telephone
 * Domain Path: /languages
 * Elementor tested up to: 3.24
 * Elementor Pro tested up to: 3.24
 * Author URI: https://add-ons.org/
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'ELEMENTOR_TELEPHONE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ELEMENTOR_TELEPHONE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
add_action( 'elementor_pro/forms/fields/register', 'rednumber_add_new_telephone_field' );
function rednumber_add_new_telephone_field($form_fields_registrar){
    require_once( ELEMENTOR_TELEPHONE_PLUGIN_PATH."fields/telephone.php" );
    $form_fields_registrar->register( new \Superaddons_Telephone_Field() );
}
include ELEMENTOR_TELEPHONE_PLUGIN_PATH."superaddons/check_purchase_code.php";
new Superaddons_Check_Purchase_Code( 
    array(
        "plugin" => "telephone-field-for-elementor-forms/telephone-field-for-elementor-forms.php",
        "id"=>"1524",
        "pro"=>"https://add-ons.org/plugin/elementor-forms-international-phone-input-mask-field/",
        "plugin_name"=> "Elementor Form International Telephone Input",
        "document"=>"https://add-ons.org/document-elementor-forms-international-phone-masking-field/"
    )
);
if(!class_exists('Superaddons_List_Addons')) {  
    include ELEMENTOR_TELEPHONE_PLUGIN_PATH."add-ons.php"; 
}
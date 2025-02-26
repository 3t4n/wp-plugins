<?php
/**
 * Class for WC AC Hook settings fields in administration panel. This class will add the necessary
 * form fields to the 'Integration' tab of the WooCommerce Settings menu.
 *
 */
if (!defined('ABSPATH')) exit();

if (!class_exists('Woo_Repupress_Mail_CRM')) :

class Woo_Repupress_Mail_CRM extends WC_Integration {

	public function __construct() {
		$this->id                 = 'woo-repupress-mail-crm';
		$this->method_title       = __( 'Woocommerce Email Marketing and CRM', 'woo-repupress-mail-crm' );
		$this->method_description = __( '<strong>Please Note:</strong> This Plugin is a contector between WooCommerce and the Rep U Press Email Marketing & CRM platform.  It gives WooCommerce full fledged Email Marketing and CRM capabilities and features.  You must have an active subscription to either the Rep U Press Email Marketing Platform or the Rep U Press Email Marketing & CRM Platform.<br /><br /><a href="http://www.repupress.com/email-marketing/" target="_blank">Email Marketing Platform</a><br /><br /><a href="http://www.repupress.com/email-marketing-crm/" target="_blank">Email Marketing & CRM Platform</a><br /><br />After you have created an account please enter your URL and Key.  You can find this by logging into your Rep U Press Email Marketing & CRM Account and going to My Account found in the upper right hand corner, and then clicking on the developer tab in the left hand side bar.  You can also tag your contacts when they are added to your Email Marketing & CRM account based on the product they order. To do this, find the Tag Field in the Advanced Product Data section for each WooCommerce product.', 'woo-repupress-mail-crm' );
		$this->init_form_fields();
		add_action( 'woocommerce_update_options_integration_' . $this->id, array( $this, 'process_admin_options' ) );
	}

	public function init_form_fields() {
		$ac_settings = get_option('settings_activecampaign', null);
		$this->form_fields = array(
			'ac_url' => array(
				'title'             => __( 'Rep U Press URL', 'woo-repupress-mail-crm' ),
				'description'       => __( 'This information and your API key can be found under My Account > Developer.', 'woo-repupress-mail-crm' ),
				'type'              => 'text'
			),
			'ac_api_key' => array(
				'title'             => __( 'Rep U Press API Key', 'woo-repupress-mail-crm' ),
				'type'              => 'text',
				'default'      		=> $ac_settings['api_key']
			),
			'ac_list_id' => array(
				'title'             => __( 'Rep U Press List ID', 'woo-repupress-mail-crm' ),
				'type'              => 'text',
				'css'				=> 'width:3em',
				'description'       => __( 'Enter the Rep U Press list to which you would like contacts added.', 'woo-repupress-mail-crm' ),
				'desc_tip'          => true
			),
			'ac_default_tag' => array(
				'title'             => __( 'Default Tag(s)', 'woo-repupress-mail-crm' ),
				'type'              => 'text',
				'description'       => __( 'The default tags will always be added for any order (if you want multiple tags then comma separate).', 'woo-repupress-mail-crm' ),
				'desc_tip'          => true
			),
			'wc_ac_addonprocessing' => array(
				'title' 			=> __( 'Add/Update Contact', 'woo-repupress-mail-crm' ),
				'type' 				=> 'checkbox',
				'label' 			=> __( 'When order created (i.e. status is processing)', 'woo-repupress-mail-crm' ),
				'description' 		=> __( 'Default is to wait until order is completed', 'woo-repupress-mail-crm' ),
			),
			'wc_ac_ordertracking' => array(
				'title' 			=> __( 'Track Order Status', 'woo-repupress-mail-crm' ),
				'type' 				=> 'checkbox',
				'label' 			=> __( 'Add WooCommerce order status to tags', 'woo-repupress-mail-crm' ),
				'description' 		=> __( 'Suffix (pending), (failed), (processing), (on-hold), (cancelled) or (completed) appended to last tags', 'woo-repupress-mail-crm' ),
				'desc_tip'          => true
			),
			'wc_ac_notification' => array(
				'title' 			=> __( 'Debug Log', 'woo-repupress-mail-crm' ),
				'type' 				=> 'checkbox',
				'label' 			=> __( 'Enable logging', 'woo-repupress-mail-crm' ),
				'default' 			=> 'yes',
				'description' 		=> __( 'Report errors to a WooCommerce System Status log file', 'woo-repupress-mail-crm' ),
			)
		);
	}

}

endif;
?>
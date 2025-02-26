<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.demotic.co.uk/
 * @since      1.0.0
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/admin
 * @author     Demotic Limited <benfleming@demotic.co.uk>
 */
class Advanced_Forms_Paypal_Payment_Buttons_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name       The name of this plugin.
	 * @param    string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'af_ppb';

	/**
	 * Display notice if ACF Pro and Advanced Forms are missing
	 *
	 * @since 1.0.0
	 */
	public function af_ppb_check_dependencies() {
		
		if( !has_acf() ) {
			?>
			<div class="notice notice-error is-dismissible"><p><?php echo esc_attr__( 'Couldn\'t find Advanced Custom Fields PRO. Advanced Forms PayPal Payment Buttons requires ACF Pro to run.', $this->plugin_name ); ?></p></div>
			<?php		
		}

		if( !has_af() ) {
			?>
			<div class="notice notice-error is-dismissible"><p><?php echo esc_attr__( 'Couldn\'t find Advanced Forms. Advanced Forms PayPal Payment Buttons requires Advanced Forms to run.', $this->plugin_name ); ?></p></div>
			<?php		
		}
		
		return;

	}

	/**
	 * Add an options page under the Settings submenu using ACF options page functionality
	 *
	 * @since 1.0.0
	 */
	public function af_ppb_add_options_page() {
	
		// Register options page
		acf_add_options_page( array(
			'page_title'  => 'Advanced Forms PayPal Payment Buttons Settings',
			'menu_title'  => 'PayPal Settings',
			'menu_slug'   => 'af_ppb',
			'capability'  => 'edit_pages',
			'parent_slug' => 'edit.php?post_type=af_form',
		) );
			
		// Register field group
		acf_add_local_field_group(array (
			'key' => 'group_af_ppb_options',
			'title' => 'PayPal Settings',
			'fields' => array (
				array (
					'key' => 'field_af_ppb_accounts_tab',
					'label' => '<span class="dashicons dashicons-id"></span>Accounts',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => 'field_af_ppb_accounts_message',
					'label' => 'PayPal Accounts',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'message' => 'Enter the PayPal email addresses or merchant IDs for live and sandbox.',
					'new_lines' => '',
					'esc_html' => 0,
				),
				array (
					'key' => 'field_af_ppb_accounts_live_account',
					'label' => 'Live Account',
					'name' => 'af_ppb_accounts_live_account',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_af_ppb_accounts_sandbox_account',
					'label' => 'Sandbox Account',
					'name' => 'af_ppb_accounts_sandbox_account',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_af_ppb_encryption_tab',
					'label' => '<span class="dashicons dashicons-lock"></span>Encryption',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => 'field_af_ppb_encryption_message',
					'label' => 'PayPal Button Encryption',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'message' => 'In order to encrypt PayPal payment buttons, you must be able to generate a private key and X.509 public certificate using OpenSSL.	You must upload the public certificate to PayPal and take note of the certificate ID to enter here. You must then download the PayPal public certificate for both the live system and the sandbox. The certifcates and key must be stored securely in a directory on the webserver outside of the WordPress directory and web root (they must not be publically accessible). You must also have access to a temporary directory outside of the web root in order for temporary files to be written and then removed during the process of encryption. The documentation for how to implement this is <a target="_blank" href="https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/encryptedwebpayments/#id08A3I0QC0X4">here</a> - see <strong>Using EWP to Protect Manually Created Payment Buttons</strong>.',
					'new_lines' => '',
					'esc_html' => 0,
				),
				array (
					'key' => 'field_af_ppb_encryption_merchant_public_certificate_id_live',
					'label' => 'Merchant Public Certificate ID (Live)',
					'name' => 'af_ppb_encryption_merchant_public_certificate_id_live',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_af_ppb_encryption_merchant_public_certificate_id_sandbox',
					'label' => 'Merchant Public Certificate ID (Sandbox)',
					'name' => 'af_ppb_encryption_merchant_public_certificate_id_sandbox',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_af_ppb_encryption_merchant_public_certificate',
					'label' => 'Merchant Public Certificate File',
					'name' => 'af_ppb_encryption_merchant_public_certificate',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_af_ppb_encryption_merchant_private_key',
					'label' => 'Merchant Private Key File',
					'name' => 'af_ppb_encryption_merchant_private_key',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_af_ppb_encryption_paypal_public_certificate_live',
					'label' => 'PayPal Public Certificate File (Live)',
					'name' => 'af_ppb_encryption_paypal_public_certificate_live',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_af_ppb_encryption_paypal_public_certificate_sandbox',
					'label' => 'PayPal Public Certificate File (Sandbox)',
					'name' => 'af_ppb_encryption_paypal_public_certificate_sandbox',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'hide_admin' => 0,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'af_ppb',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));
		
	}

	/**
	 * Add "PayPal Button Settings" page to contact form
	 *
	 * @param  string $panels
	 * @since  1.0.0
	 * @return string
	 */
	public function af_ppb_add_form_settings_fields ( $field_group ) {
		
		$field_group['fields'][] = array(
			'key' => 'field_form_paypal_button_tab',
			'label' => '<span class="dashicons dashicons-cart"></span>PayPal Button',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 0,
		);

		$field_group['fields'][] = array (
			'key' => 'field_paypal_button_header',
			'label' => 'PayPal Button',
			'name' => '',
			'type' => 'message',
			'instructions' => 'Select the type of PayPal button you want to create. Add in those variables which you need to pass to PayPal. You can either 
				hard code variables, or use fields from the submitted form by inserting the fields using the buttons provided.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_button_type',
			'label' => 'Button Type',
			'name' => 'af_ppb_button_type',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'choices' => array (
				'none' => 'None',
				'_xclick' => 'Buy Now',
				'_donations' => 'Donate',
			),
			'default_value' => array (
				0 => 'none',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		);

		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_button_image',
			'label' => 'Button Image',
			'name' => 'af_ppb_button_image',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '==',
						'value' => '_xclick',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'choices' => array (
				'buy_now' => 'Buy Now',
				'pay_now' => 'Pay Now',
			),
			'default_value' => array (
				0 => 'buy_now',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_form_mode',
			'label' => 'Form Mode',
			'name' => 'af_ppb_form_mode',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'choices' => array (
				'live' => 'Live',
				'sandbox' => 'Sandbox',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'sandbox',
			'layout' => 'horizontal',
			'return_format' => 'value',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_button_encryption',
			'label' => 'Button Encryption',
			'name' => 'af_ppb_button_encryption',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'choices' => array (
				'on' => 'On',
				'off' => 'Off',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'off',
			'layout' => 'horizontal',
			'return_format' => 'value',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_individual_items_variables',
			'label' => 'Individual Items Variables',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_amount',
			'label' => 'Amount',
			'name' => 'af_ppb_amount',
			'type' => 'text',
			'instructions' => 'The price or amount of the product, service, or contribution, not including shipping, handling, or tax. If you omit this variable from Buy Now or Donate buttons, buyers enter their own amount at the time of payment.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_discount_amount',
			'label' => 'Discount Amount',
			'name' => 'af_ppb_discount_amount',
			'type' => 'text',
			'instructions' => 'Discount amount associated with each additional quantity of the item, which must be equal to or less than the selling price of the item. For <code>discount_amount2</code> to take effect, you must also specify a <code>discount_amount</code> that is greater than or equal to 0. Valid only for Buy Now and Add to Cart buttons.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_discount_amount2',
			'label' => 'Discount Amount 2',
			'name' => 'af_ppb_discount_amount2',
			'type' => 'text',
			'instructions' => 'Discount amount associated with each additional quantity of the item, which must be equal to or less than the selling price of the item. For <code>discount_amount2</code> to take effect, you must also specify a <code>discount_amount</code> that is greater than or equal to 0. Valid only for Buy Now and Add to Cart buttons.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_discount_rate',
			'label' => 'Discount Rate',
			'name' => 'af_ppb_discount_rate',
			'type' => 'text',
			'instructions' => 'Discount rate, as a percentage, associated with an item. Set to a value less than 100. If you do not set <code>discount_rate2</code>, the value in <code>discount_rate</code> applies only to the first item regardless of the quantity of items purchased. Valid only for Buy Now and Add to Cart buttons.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_discount_rate2',
			'label' => 'Discount Rate 2',
			'name' => 'af_ppb_discount_rate2',
			'type' => 'text',
			'instructions' => 'Discount rate, as a percentage, associated with each additional quantity of the item. Must be equal to or less than 100. For <code>discount_rate2</code> to take effect, you must also specify a <code>discount_rate</code> that is greater than or equal to 0. Valid only for Buy Now and Add to Cart buttons.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_discount_num',
			'label' => 'Discount Num',
			'name' => 'af_ppb_discount_num',
			'type' => 'text',
			'instructions' => 'Number of additional quantities of the item to which the discount applies. Applicable when you specify <code>discount_amount2</code> or <code>discount_rate2</code>. Specifies an upper limit on the number of discounted items. Valid only for Buy Now and Add to Cart buttons.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_item_name',
			'label' => 'Item Name',
			'name' => 'af_ppb_item_name',
			'type' => 'text',
			'instructions' => 'Description of item. If you omit this variable, buyers enter their own name during checkout. Optional for Buy Now, Donate, Subscribe, Automatic Billing, Installment Plan, and Add to Cart buttons.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_item_number',
			'label' => 'Item Number',
			'name' => 'af_ppb_item_number',
			'type' => 'text',
			'instructions' => 'Pass-through variable for you to track product or service purchased or the contribution made. The value you specify is passed back to you upon payment completion. Required if you want PayPal to track either inventory or profit and loss for the item the button sells.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_quantity',
			'label' => 'Quantity',
			'name' => 'af_ppb_quantity',
			'type' => 'text',
			'instructions' => 'Number of items. If profile-based shipping rates are configured with a basis of quantity, the sum of <code>quantity</code> values is used to 	calculate the shipping charges for the payment. PayPal appends a sequence number to uniquely identify the item in the PayPal Shopping Cart. For example, <code>quantity1</code>, <code>quantity2</code>, and so on.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_shipping',
			'label' => 'Shipping',
			'name' => 'af_ppb_shipping',
			'type' => 'text',
			'instructions' => 'The cost of shipping this item. If you specify <code>shipping</code> and <code>shipping2</code> is not defined, this flat amount is charged regardless of the quantity of items purchased. This <code>shipping</code> variable is valid only for Buy Now and Add to Cart buttons. By default, if profile-based shipping rates are configured, buyers are charged an amount according to the shipping methods they choose.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_shipping2',
			'label' => 'Shipping 2',
			'name' => 'af_ppb_shipping2',
			'type' => 'text',
			'instructions' => 'The cost of shipping each additional unit of this item. If you omit this variable and profile-based shipping rates are configured, buyers are charged an amount according to the shipping methods they choose. This <code>shipping2</code> variable is valid only for Buy Now and Add to Cart buttons.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_ap_ppb_tax',
			'label' => 'Tax',
			'name' => 'ap_ppb_tax',
			'type' => 'text',
			'instructions' => 'Transaction-based tax override variable. Set this variable to a flat tax amount to apply to the payment regardless of the buyer\'s location. This value overrides any tax settings set in your account profile. Valid only for Buy Now and Add to Cart buttons. By default, profile tax settings, if any, apply.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_tax_rate',
			'label' => 'Tax Rate',
			'name' => 'af_ppb_tax_rate',
			'type' => 'text',
			'instructions' => 'Transaction-based tax override variable. Set this variable to a percentage that applies to the amount multiplied by the quantity selected during checkout. This value overrides any tax settings set in your account profile. A valid value is from 0.001 to 100. Valid only for Buy Now and Add to Cart buttons. By default, profile tax settings, if any, apply.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_undefined_quantity',
			'label' => 'Undefined Quantity',
			'name' => 'af_ppb_undefined_quantity',
			'type' => 'text',
			'instructions' => 'Set to <code>1</code> to enable buyers to specify the quantity. Optional for Buy Now buttons. Not used with other buttons.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_weight',
			'label' => 'Weight',
			'name' => 'af_ppb_weight',
			'type' => 'text',
			'instructions' => 'Weight of items. If profile-based shipping rates are configured with a basis of weight, the sum of <code>weight</code> values is used to calculate the shipping charges for the payment. A valid value is a decimal number with two significant digits to the right of the decimal point.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_weight_unit',
			'label' => 'Weight Unit',
			'name' => 'af_ppb_weight_unit',
			'type' => 'select',
			'instructions' => 'The unit of measure if <code>weight</code> is specified. Valid value is <code>lbs</code> or <code>kgs</code>. Default is <code>lbs</code>.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'choices' => array (
				'lbs' => 'Pounds (lbs)',
				'kgs' => 'Kilograms (kgs)',
			),
			'default_value' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_payment_transaction_variables',
			'label' => 'Payment Transaction Variables',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_currency_code',
			'label' => 'Currency Code',
			'name' => 'af_ppb_currency_code',
			'type' => 'select',
			'instructions' => 'The currency of the payment. Default is <code>USD</code>.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'choices' => array (
				'AUD' => 'Australian Dollar',
				'BRL' => 'Brazilian Real',
				'CAD' => 'Canadian Dollar',
				'CZK' => 'Czech Koruna',
				'DKK' => 'Danish Krone',
				'EUR' => 'Euro',
				'HKD' => 'Hong Kong Dollar',
				'HUF' => 'Hungarian Forint',
				'ILS' => 'Israeli New Sheqel',
				'JPY' => 'Japanese Yen',
				'MYR' => 'Malaysian Ringgit',
				'MXN' => 'Mexican Peso',
				'NOK' => 'Norwegian Krone',
				'NZD' => 'New Zealand Dollar',
				'PHP' => 'Philippine Peso',
				'PLN' => 'Polish Zloty',
				'GBP' => 'Pound Sterling',
				'RUB' => 'Russian Ruble',
				'SGD' => 'Singapore Dollar',
				'SEK' => 'Swedish Krona',
				'CHF' => 'Swiss Franc',
				'TWD' => 'Taiwan New Dollar',
				'THB' => 'Thai Baht',
				'USD' => 'US Dollar',
			),
			'default_value' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_custom',
			'label' => 'Custom',
			'name' => 'af_ppb_custom',
			'type' => 'text',
			'instructions' => 'Pass-through variable for your own tracking purposes, which buyers do not see.	By default, no variable is passed back to you.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_handling',
			'label' => 'Handling',
			'name' => 'af_ppb_handling',
			'type' => 'text',
			'instructions' => 'Handling charges. This variable is not quantity-specific. The same handling cost applies, regardless of the number of items on the order. By default, no handling charges are included.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_invoice',
			'label' => 'Invoice',
			'name' => 'af_ppb_invoice',
			'type' => 'text',
			'instructions' => 'Pass-through variable you can use to identify your invoice number for this purchase.	By default, no variable is passed back to you.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_ap_ppb_checkout_page_variables',
			'label' => 'Checkout Page Variables',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_ap_ppb_image_url',
			'label' => 'Image URL',
			'name' => 'ap_ppb_image_url',
			'type' => 'text',
			'instructions' => 'The URL of the 150x50-pixel image displayed as your logo in the upper left corner of the PayPal checkout pages. Default is your business name, if you have a PayPal Business account or your email address, if you have PayPal Premier or Personal account.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_lc',
			'label' => 'Locale',
			'name' => 'af_ppb_lc',
			'type' => 'select',
			'instructions' => 'The locale of the checkout login or sign-up page. PayPal provides localized checkout pages for some countries and languages.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'choices' => array (
				'AL' => 'Albania',
				'DZ' => 'Algeria',
				'AD' => 'Andorra',
				'AO' => 'Angola',
				'AI' => 'Anguilla',
				'AG' => 'Antigua &amp; Barbuda',
				'AR' => 'Argentina',
				'AM' => 'Armenia',
				'AW' => 'Aruba',
				'AU' => 'Australia',
				'AT' => 'Austria',
				'AZ' => 'Azerbaijan',
				'BS' => 'Bahamas',
				'BH' => 'Bahrain',
				'BB' => 'Barbados',
				'BY' => 'Belarus',
				'BE' => 'Belgium',
				'BZ' => 'Belize',
				'BJ' => 'Benin',
				'BM' => 'Bermuda',
				'BT' => 'Bhutan',
				'BO' => 'Bolivia',
				'BA' => 'Bosnia &amp; Herzegovina',
				'BW' => 'Botswana',
				'BR' => 'Brazil',
				'VG' => 'British Virgin Islands',
				'BN' => 'Brunei',
				'BG' => 'Bulgaria',
				'BF' => 'Burkina Faso',
				'BI' => 'Burundi',
				'KH' => 'Cambodia',
				'CM' => 'Cameroon',
				'CA' => 'Canada',
				'CV' => 'Cape Verde',
				'KY' => 'Cayman Islands',
				'TD' => 'Chad',
				'CL' => 'Chile',
				'CN' => 'China',
				'C2' => 'China Worldwide',
				'CO' => 'Colombia',
				'KM' => 'Comoros',
				'CG' => 'Congo - Brazzaville',
				'CD' => 'Congo - Kinshasa',
				'CK' => 'Cook Islands',
				'CR' => 'Costa Rica',
				'CI' => 'Côte D’Ivoire',
				'HR' => 'Croatia',
				'CY' => 'Cyprus',
				'CZ' => 'Czech Republic',
				'DK' => 'Denmark',
				'DJ' => 'Djibouti',
				'DM' => 'Dominica',
				'DO' => 'Dominican Republic',
				'EC' => 'Ecuador',
				'EG' => 'Egypt',
				'SV' => 'El Salvador',
				'ER' => 'Eritrea',
				'EE' => 'Estonia',
				'ET' => 'Ethiopia',
				'FK' => 'Falkland Islands',
				'FO' => 'Faroe Islands',
				'FJ' => 'Fiji',
				'FI' => 'Finland',
				'FR' => 'France',
				'GF' => 'French Guiana',
				'PF' => 'French Polynesia',
				'GA' => 'Gabon',
				'GM' => 'Gambia',
				'GE' => 'Georgia',
				'DE' => 'Germany',
				'GI' => 'Gibraltar',
				'GR' => 'Greece',
				'GL' => 'Greenland',
				'GD' => 'Grenada',
				'GP' => 'Guadeloupe',
				'GT' => 'Guatemala',
				'GN' => 'Guinea',
				'GW' => 'Guinea-Bissau',
				'GY' => 'Guyana',
				'HN' => 'Honduras',
				'HK' => 'Hong Kong SAR China',
				'HU' => 'Hungary',
				'IS' => 'Iceland',
				'IN' => 'India',
				'ID' => 'Indonesia',
				'IE' => 'Ireland',
				'IL' => 'Israel',
				'IT' => 'Italy',
				'JM' => 'Jamaica',
				'JP' => 'Japan',
				'JO' => 'Jordan',
				'KZ' => 'Kazakhstan',
				'KE' => 'Kenya',
				'KI' => 'Kiribati',
				'KW' => 'Kuwait',
				'KG' => 'Kyrgyzstan',
				'LA' => 'Laos',
				'LV' => 'Latvia',
				'LS' => 'Lesotho',
				'LI' => 'Liechtenstein',
				'LT' => 'Lithuania',
				'LU' => 'Luxembourg',
				'MK' => 'Macedonia',
				'MG' => 'Madagascar',
				'MW' => 'Malawi',
				'MY' => 'Malaysia',
				'MV' => 'Maldives',
				'ML' => 'Mali',
				'MT' => 'Malta',
				'MH' => 'Marshall Islands',
				'MQ' => 'Martinique',
				'MR' => 'Mauritania',
				'MU' => 'Mauritius',
				'YT' => 'Mayotte',
				'MX' => 'Mexico',
				'FM' => 'Micronesia',
				'MD' => 'Moldova',
				'MC' => 'Monaco',
				'MN' => 'Mongolia',
				'ME' => 'Montenegro',
				'MS' => 'Montserrat',
				'MA' => 'Morocco',
				'MZ' => 'Mozambique',
				'NA' => 'Namibia',
				'NR' => 'Nauru',
				'NP' => 'Nepal',
				'NL' => 'Netherlands',
				'NC' => 'New Caledonia',
				'NZ' => 'New Zealand',
				'NI' => 'Nicaragua',
				'NE' => 'Niger',
				'NG' => 'Nigeria',
				'NU' => 'Niue',
				'NF' => 'Norfolk Island',
				'NO' => 'Norway',
				'OM' => 'Oman',
				'PW' => 'Palau',
				'PA' => 'Panama',
				'PG' => 'Papua New Guinea',
				'PY' => 'Paraguay',
				'PE' => 'Peru',
				'PH' => 'Philippines',
				'PN' => 'Pitcairn Islands',
				'PL' => 'Poland',
				'PT' => 'Portugal',
				'QA' => 'Qatar',
				'RE' => 'Réunion',
				'RO' => 'Romania',
				'RU' => 'Russia',
				'RW' => 'Rwanda',
				'WS' => 'Samoa',
				'SM' => 'San Marino',
				'ST' => 'São Tomé &amp; Príncipe',
				'SA' => 'Saudi Arabia',
				'SN' => 'Senegal',
				'RS' => 'Serbia',
				'SC' => 'Seychelles',
				'SL' => 'Sierra Leone',
				'SG' => 'Singapore',
				'SK' => 'Slovakia',
				'SI' => 'Slovenia',
				'SB' => 'Solomon Islands',
				'SO' => 'Somalia',
				'ZA' => 'South Africa',
				'KR' => 'South Korea',
				'ES' => 'Spain',
				'LK' => 'Sri Lanka',
				'SH' => 'St. Helena',
				'KN' => 'St. Kitts &amp; Nevis',
				'LC' => 'St. Lucia',
				'PM' => 'St. Pierre &amp; Miquelon',
				'VC' => 'St. Vincent &amp; Grenadines',
				'SR' => 'Suriname',
				'SJ' => 'Svalbard &amp; Jan Mayen',
				'SZ' => 'Swaziland',
				'SE' => 'Sweden',
				'CH' => 'Switzerland',
				'TW' => 'Taiwan',
				'TJ' => 'Tajikistan',
				'TZ' => 'Tanzania',
				'TH' => 'Thailand',
				'TG' => 'Togo',
				'TO' => 'Tonga',
				'TT' => 'Trinidad &amp; Tobago',
				'TN' => 'Tunisia',
				'TM' => 'Turkmenistan',
				'TC' => 'Turks &amp; Caicos Islands',
				'TV' => 'Tuvalu',
				'UG' => 'Uganda',
				'UA' => 'Ukraine',
				'AE' => 'United Arab Emirates',
				'GB' => 'United Kingdom',
				'US' => 'United States',
				'UY' => 'Uruguay',
				'VU' => 'Vanuatu',
				'VA' => 'Vatican City',
				'VE' => 'Venezuela',
				'VN' => 'Vietnam',
				'WF' => 'Wallis &amp; Futuna',
				'YE' => 'Yemen',
				'ZM' => 'Zambia',
				'ZW' => 'Zimbabwe',
			),
			'default_value' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_ap_ppb_return',
			'label' => 'Return URL',
			'name' => 'ap_ppb_return',
			'type' => 'text',
			'instructions' => 'The URL to which PayPal redirects buyers\' browser after they complete their payments. For example, specify a URL on your site that displays a thank you for your payment page.	By default, PayPal redirects the browser to a PayPal webpage.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_ap_ppb_rm',
			'label' => 'Return Method',
			'name' => 'ap_ppb_rm',
			'type' => 'text',
			'instructions' => 'Return method. The <code>FORM METHOD</code> used to send data to the URL specified by the <code>return</code> variable.
				Valid value is: <br>
				<code>0</code> All shopping cart payments use the GET method. <br>
				<code>1</code> The buyer\'s browser is redirected to the return URL by using the GET method, but no payment variables are included.<br>
				<code>2</code> The buyer\'s browser is redirected to the return URL by using the POST method, and all payment variables are included.<br>
				Default is <code>0</code>. Note: This variable only takes effect only if the Return URL variable is set.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_cancel_return',
			'label' => 'Cancel URL',
			'name' => 'af_ppb_cancel_return',
			'type' => 'text',
			'instructions' => 'A URL to which PayPal redirects the buyers\' browsers if they cancel checkout before completing their payments. For example, specify a URL on your website that displays the Payment Canceled page. By default, PayPal redirects the browser to a PayPal webpage.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		$field_group['fields'][] = array (
			'key' => 'field_af_ppb_notify_url',
			'label' => 'Notify URL',
			'name' => 'af_ppb_notify_url',
			'type' => 'text',
			'instructions' => 'The URL to which PayPal posts information about the payment, in the form of Instant Payment Notification messages.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_af_ppb_button_type',
						'operator' => '!=',
						'value' => 'none',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		);
		
		return $field_group;
		
	}

	/**
	 * Add an "Insert field" button to text fields
	 *
	 * @since 1.0.0
	 *
	 */
	function af_ppb_add_form_field_inserter( $field ) {
		
		global $post;
		
		if( ! $post ) {
			return;
		}
		
		
		$form = af_form_from_post( $post );
		
		if( ! $form ) {
			return;
		}
		
		$fields_to_add = array(
			'field_af_ppb_amount',
			'field_af_ppb_discount_amount',
			'field_af_ppb_discount_amount2',
			'field_af_ppb_discount_rate',
			'field_af_ppb_discount_rate2',
			'field_af_ppb_discount_num',
			'field_af_ppb_item_name',
			'field_af_ppb_item_number',
			'field_af_ppb_quantity',
			'field_af_ppb_shipping',
			'field_af_ppb_shipping2',
			'field_ap_ppb_tax',
			'field_af_ppb_tax_rate',
			'field_af_ppb_undefined_quantity',
			'field_af_ppb_weight',
			'field_af_ppb_custom',
			'field_af_ppb_handling',
			'field_af_ppb_invoice',
			'field_ap_ppb_image_url',
			'field_ap_ppb_return',
			'field_ap_ppb_rm',
			'field_af_ppb_cancel_return',
			'field_af_ppb_notify_url',
		);
		
		
		if( in_array( $field['key'], $fields_to_add ) ) {
			_af_field_inserter_button( $form, 'regular', true );
		}
		
	}
	
}

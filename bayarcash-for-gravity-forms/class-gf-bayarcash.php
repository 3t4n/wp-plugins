<?php

defined( 'ABSPATH' ) || die();

GFForms::include_payment_addon_framework();

class GF_Bayarcash extends GFPaymentAddOn {

  private static $_instance = null;
  protected $_slug = 'bayarcash-for-gravity-forms';
  protected $_title = 'Bayarcash for Gravity Forms';

  protected $_short_title = 'Bayarcash';
  protected $_supports_callbacks = true;

  protected $_capabilities = array( 'gravityforms_bayarcash', 'gravityforms_bayarcash_uninstall' );

  protected $_capabilities_settings_page = 'gravityforms_bayarcash';
  protected $_capabilities_form_settings = 'gravityforms_bayarcash';
  protected $_capabilities_uninstall = 'gravityforms_bayarcash_uninstall';

  public function __construct()
  {
    parent::__construct();
    // based on: update_option( 'gravityformsaddon_' . $this->_slug . '_settings', $settings );
    add_action( 'update_option_gravityformsaddon_bayarcash-for-gravity-forms_settings', array($this, 'global_validate_keys'), 10, 3);
  }
  
  // Add Bayarcash Feed Setting Page 
  public static function get_instance(): ?GF_Bayarcash {

    if ( self::$_instance == null ) {
      self::$_instance = new GF_Bayarcash();
    }

    return self::$_instance;
  }
  
   public function pre_init() {
   // inspired by gravityformsstripe
   add_action( 'wp', array( $this, 'maybe_thankyou_page' ), 5 );
   parent::pre_init();
    }
  
  public function init() {
    //add_filter( 'gform_disable_post_creation', array( $this, 'disable_post_creation' ), 10, 3 );

    $this->add_delayed_payment_support(
      array(
        'option_label' => esc_html__( 'Create post only when payment is received.', 'bayarcash-for-gravity-forms' )
      )
    );
    parent::init();
  }
  
  public function get_post_payment_actions_config( $feed_slug ): array {
    // if ($feed_slug != $this->_slug) {
    //   return array();
    // }

    // $form = $this->get_current_form();

    // if ( GFCommon::has_post_field( $form['fields'] ) ) {
      return array(
        'position' => 'before',
        'setting'  => 'conditionalLogic',
      );
    // }

    // return array();
  }
  
  public function supported_currencies( $currencies ): array {
    return array('MYR' => $currencies['MYR']);
  }

	public function get_menu_icon(): string {
		return esc_url(plugins_url("assets/logo.svg", __FILE__));
	}


    public function plugin_settings_fields() {
    $configuration = array(
      array(
        'title'       => esc_html__( 'Bayarcash', 'bayarcash-for-gravity-forms' ),
        'description' => $this->get_description(),
        'fields'      => $this->global_keys_fields(),
      ),
    );


    return apply_filters('gf_bayarcash_plugin_settings_fields', $configuration);
  }

	public function get_description() {
		ob_start();
		?>
        <p>
			<?php
			printf(
				wp_kses(  // translators: $1$s opens a link tag, %2$s closes link tag.
					__(
						'Bayarcash - Platform Pembayaran Online (Aggregator). %1$sLearn more%2$s. %3$s%3$sThis is a global configuration and it is not mandatory to set. You can still configure on per form basis.',
						'bayarcash-for-gravity-forms'
					),
					array(
						'a' => array(
							'href' => array(),
							'target' => array(),
						),
						'br' => array(),
					)
				),
				'<a href="' . esc_url('https://bayarcash.com/') . '" target="_blank">',
				'</a>',
				'<br>'
			);
			?>
        </p>
		<?php
		return ob_get_clean();
	}

	public function global_keys_fields(): array
    {
		return array(
			array(
				'name'     => 'pat_key',
				'label'    => esc_html__( 'Personal Access Token (PAT)', 'bayarcash-for-gravity-forms' ),
				'type'     => 'textarea',
				'required' => true,
				'tooltip'  => '<h6>' . esc_html__( 'Personal Access Token (PAT)', 'bayarcash-for-gravity-forms' ) . '</h6>' . esc_html__( 'You can get PAT from your email after successful register account', 'bayarcash-for-gravity-forms' )
			),
			array(
				'name'     => 'fpx_portal_key',
				'label'    => esc_html__( 'Portal Key', 'bayarcash-for-gravity-forms' ),
				'type'     => 'text',
				'required' => true,
				'tooltip'  => '<h6>' . esc_html__( 'Portal Key', 'bayarcash-for-gravity-forms' ) . '</h6>' . esc_html__( 'Change this portal key with yours. Login to Bayarcash console > Portal.', 'bayarcash-for-gravity-forms' )
			),
		);
	}
  
  public function feed_settings_fields() {
    $feed_settings_fields = parent::feed_settings_fields();
    $feed_settings_fields[0]['description'] = esc_html__( 'Configuration payment Bayarcash for Gravity Forms.', 'bayarcash-for-gravity-forms' );
    
    // Remove subscription option from Transaction type
    unset( $feed_settings_fields[0]['fields'][1]['choices'][2] );

    // Ensure transaction type mandatory
    $feed_settings_fields[0]['fields'][1]['required'] = true;

    // Temporarily remove transaction type section
    $transaction_type_array = $feed_settings_fields[0]['fields'][1];
    unset( $feed_settings_fields[0]['fields'][1] );

    // Temporarily remove product and services section
    $product_and_services = $feed_settings_fields[2];
    $other_settings = $feed_settings_fields[3];
    unset( $feed_settings_fields[2] );
    unset( $feed_settings_fields[3] );

    // Add Bayarcash configuration settings
    $feed_settings_fields[0]['fields'][] = array(
      'name'     => 'bayarcashConfigurationType',
      'label'    => esc_html__( 'Configuration Type', 'bayarcash-for-gravity-forms' ),
      'type'     => 'select',
      'required' => true,
      'onchange' => "jQuery(this).parents('form').submit();",
      'choices'  => array(
        array(
          'label' => esc_html__( 'Select configuration type', 'bayarcash-for-gravity-forms' ),
          'value' => ''
        ),
        array(
          'label' => esc_html__( 'Global Configuration', 'bayarcash-for-gravity-forms' ),
          'value' => 'global'
        ),
      ),
      'tooltip'  => '<h6>' . esc_html__( 'Configuration Type', 'bayarcash-for-gravity-forms' ) . '</h6>' . esc_html__( 'Select a configuration type. If you want to configure Bayarcash on form basis, you may use Form Configuration. If you want to use globally set keys, choose Global Configuration.', 'bayarcash-for-gravity-forms' )
    );

    // Read transaction type section
    $feed_settings_fields[0]['fields'][] = $transaction_type_array;

    // Read product and services section
    $feed_settings_fields[] = $product_and_services;
    $feed_settings_fields[] = $other_settings;

    return apply_filters( 'gf_bayarcash_feed_settings_fields', $feed_settings_fields );
  }
  
   public function other_settings_fields(): array {
    $other_settings_fields                 = parent::other_settings_fields();
    $other_settings_fields[0]['name']      = 'clientInformation';
    $other_settings_fields[0]['label']     = esc_html__( 'Client Information.', 'bayarcash-for-gravity-forms' );
    $other_settings_fields[0]['field_map'] = $this->client_info_fields();
    $other_settings_fields[0]['tooltip']   = '<h6>' . esc_html__( 'Client Information', 'bayarcash-for-gravity-forms' ) . '</h6>' . esc_html__( 'Map your Form Fields to the available listed fields. Only email are required to be set', 'bayarcash-for-gravity-forms' );

    $conditional_logic = $other_settings_fields[1];
    unset($other_settings_fields[1]);

    $other_settings_fields[] = array(
      'name'      => 'purchaseInformation',
      'label'     => esc_html__( 'Purhase Description', 'bayarcash-for-gravity-forms' ),
      'type'      => 'field_map',
      'field_map' => $this->purchase_info_fields(),
      'tooltip'   => '<h6>' . esc_html__( 'Purchase Description', 'bayarcash-for-gravity-forms' ) . '</h6>' . esc_html__( 'Map your Form Fields to the available listed fields.', 'bayarcash-for-gravity-forms' )
    );


    $other_settings_fields[] = array(
      'name'        => 'cancelUrl',
      'label'       => esc_html__( 'Cancel URL', 'bayarcash-for-gravity-forms' ),
      'type'        => 'text',
      'placeholder' => 'https://example.com/pages',
      'tooltip'     => '<h6>' . esc_html__( 'Cancel URL', 'bayarcash-for-gravity-forms' ) . '</h6>' . esc_html__( 'Redirect to custom URL in the event of cancellation. Leaving blank will redirect back to form page in the event of cancellation. Note: You can set success behavior by setting confirmation redirect.', 'bayarcash-for-gravity-forms' )
    );

    $other_settings_fields[] = $conditional_logic;

    return $other_settings_fields;
  }
  
  // This method must return empty array to prevent option from showing in feeds settings
  public function option_choices(): array
  {
    return array();
  }
  
   public function client_info_fields() {

    $client_info_fields = array(
      array( 'name' => 'email',     'label' => esc_html__( 'Email', 'bayarcash-for-gravity-forms' ), 'required' => true ),
      array( 'name' => 'full_name', 'label' => esc_html__( 'Full Name', 'bayarcash-for-gravity-forms' ), 'required' => true ),
      array( 'name' => 'phone', 'label' => esc_html__( 'Phone Number', 'bayarcash-for-gravity-forms' ), 'required' => false ),
    );

    return apply_filters( 'gf_bayarcash_client_info_fields', $client_info_fields );
  }

  public function purchase_info_fields() {
    $purchase_info_fields = array(
      array( 'name' => 'notes', 'label' => esc_html__( 'Purchase Note', 'bayarcash-for-gravity-forms' ), 'required' => false ),
    );

    return apply_filters( 'gf_bayarcash_purchase_info_fields', $purchase_info_fields );
  }
  
  public function redirect_url($feed, $submission_data, $form, $entry): void
  {
      
    $entry_id = $entry['id'];
    
    $this->log_debug( __METHOD__ . "(): Started for entry id: #" . $entry_id );
    
    $configuration_type = rgars( $feed, 'meta/bayarcashConfigurationType', 'global' );

    $payment_amount_location = rgars( $feed, 'meta/paymentAmount'); // location for payment amount
    $name_location           = rgars( $feed, 'meta/clientInformation_full_name'); // location for buyer name
    $email_location          = rgars( $feed, 'meta/clientInformation_email'); // location for buyer email address
    $phone_location           = rgars( $feed, 'meta/clientInformation_phone');
    $notes_location          = rgars( $feed, 'meta/purchaseInformation_notes'); // location for purchase notes
    $reference_location      = rgars( $feed, 'meta/miscellaneous_reference'); // location for reference

    $full_name_location_array = array();

    foreach ( $form['fields'] as $field ) {
      if ( $field->type == 'name' ) {
        if ($name_location != $field->id) {
          continue;
        }

        $full_name_location_array[$field->id] = array();
        foreach($field->inputs as $input) {
          $full_name_location_array[$field->id][] = $input['id'];
        }
      }
    }

    // This if the total amount choose to form total
    if ($payment_amount_location == 'form_total'){
      $amount       = rgar( $submission_data, 'payment_amount' );
      $product_name = rgar( $form, 'title' );
      $product_qty  = '1';
    } else {
      // This if the total amount choose to specific product.
      $items = rgar( $submission_data, 'line_items');
      foreach ($items as $item){
        if ($item['id'] == $payment_amount_location){
          $amount       = $item['unit_price'];
          $product_name = $item['name'];
          $product_qty  = $item['quantity'];
          break;
        }
      }
    }

    $email     = rgar( $entry, $email_location );
    $phone     = rgar($entry, $phone_location);
    $notes     = rgar( $entry, $notes_location );
    $reference = rgar( $entry, $reference_location );
    $full_name = rgar( $entry, $name_location, '' );

    if ( !empty($full_name_location_array) ) {
      if ( array_key_exists( $name_location, $full_name_location_array ) ) {
        foreach( $full_name_location_array[$name_location] as $full_name_location ) {
          $full_name .= ' ' . rgar( $entry, $full_name_location );
        }
        $full_name = trim( $full_name );
      }
    }

    if ( $gf_global_settings = get_option( 'gravityformsaddon_bayarcash-for-gravity-forms_settings' ) ) {
      $fpx_portal_key   = rgars( $gf_global_settings, 'fpx_portal_key' );
      $pat_key     = rgars( $gf_global_settings, 'pat_key' );
    }

    if (empty($fpx_portal_key) || empty($pat_key)) {
		  $this->log_error(__METHOD__ . "(): Missing required API keys for entry id: #" . $entry_id);
		  return;
    }
    
    $bayarcash = GFBayarcashAPI::get_instance( $fpx_portal_key, $pat_key );
    
    $redirect_url_args = array(
      'callback' => $this->_slug,
      'entry_id' => $entry_id,
    );

    // Define the POST data
    $postData = [
        'order_no' => $entry_id,
        'order_amount' => $amount,
        'buyer_name' => substr( $full_name, 0, 30 ),
        'buyer_email' => $email,
        'payment_gateway' => '1',
        'return_url' => $this->get_redirect_url( $redirect_url_args ),
        'portal_key' => $fpx_portal_key,
        'buyer_tel_no' => str_replace('+', '', $phone),
        
    ];

    // Perform any necessary processing or validation on the submission data, form, or entry
    
    $bayarcash->create_payment( $postData );

}

 public function get_redirect_url($args = array()): string
 {
    return add_query_arg(
      $args, 
      home_url( '/' ) 
    );
  }

	public function note_avatar() {
		return esc_url(plugins_url("assets/logo.svg", __FILE__));
	}

  public function callback() {

	  global $wpdb;
	  $entry_id = absint(rgget('entry_id'));
	  $this->log_debug('Started ' . __METHOD__ . "(): for entry id #" . esc_html($entry_id));

	  $entry = GFAPI::get_entry($entry_id);
	  $submission_feed = $this->get_payment_feed($entry);
	  $this->log_debug(__METHOD__ . "(): Entry ID #" . esc_html($entry_id) . " is set to Feed ID #" . esc_html($submission_feed['id']));

    $configuration_type = rgars( $submission_feed, 'meta/bayarcashConfigurationType', 'global' );

	  if ($gf_global_settings = get_option('gravityformsaddon_bayarcash-for-gravity-forms_settings')) {
		  $pat_key        = rgar($gf_global_settings, 'pat_key');
	  }

	  if ($configuration_type == 'form') {
		  $pat_key        = rgars($submission_feed, 'meta/pat_key');
	  }

      $redirect_url_args = array(
          'callback' => $this->_slug,
          'entry_id' => $entry_id,
      );

	  $target_return_url = $this->get_redirect_url( $redirect_url_args );

      // Use GFBayarcashAPI to make a request to retrieve payment status
      $fpx_portal_key = '';
      $bayarcash = GFBayarcashAPI::get_instance( $fpx_portal_key, $pat_key );
      $response = $bayarcash->get_payment($pat_key, $target_return_url);

      $exchangeOrderNo = null;
      $fpxAmount = null;
      $fpxStatus = null;
      $transactionStatusDescription = null;

      if (!empty($response)) {
          $exchangeOrderNo = $response['exchangeOrderNo'];
          $fpxAmount = $response['fpxAmount'];
          $fpxStatus = $response['fpxStatus'];
          $transactionStatusDescription = $response['transactionStatusDescription'];
      }


	  if (isset($_POST['fpx_data'])) {
		  // Verify nonce first
		  if (!check_ajax_referer('bayarcash_payment_verification', 'nonce', false)) {
			  exit('Invalid request.');
		  }

		  $is_portal_key_valid = $this->check_portal_key_valid($submission_feed);

		  if (!$is_portal_key_valid) {
			  exit('Mismatched data.');
		  }
	  }

    $payment_status = $this->get_payment_status_name($fpxStatus);
    gform_update_meta($entry_id, 'payment_status', $payment_status);
    $payment_status_bank = gform_get_meta( $entry_id, 'payment_status' );

    if ($payment_status == 'Successful') {
	    $payment_status_message = 'Payment is successful. ' . $transactionStatusDescription;
	    $this->add_note( $entry_id, $payment_status_message, 'success' );
        $type = 'complete_payment';
    } else if ($payment_status_bank == 'Unsuccessful' || $payment_status_bank == 'Cancelled' ){
	    $payment_status_message = 'Payment is Failed. ' . $transactionStatusDescription;
	    $this->add_note( $entry_id, $payment_status_message, 'error' );
	    $type = 'fail_payment';
    }

    $action = array(
      'id'             => $exchangeOrderNo,
      'type'           => $type,
      'transaction_id' => $exchangeOrderNo,
      'entry_id'       => $entry_id,
      'payment_method' => 'FPX',
      'amount'         => $fpxAmount,
    );

    // Acquire lock to prevent concurrency
    $GLOBALS['wpdb']->get_results(
     "SELECT GET_LOCK('bayarcash_gf_payment', 15);"
   );

   if ( $this->is_duplicate_callback( $exchangeOrderNo ) ) {
     $action['abort_callback'] = 'true';
   }

    return $action;

}

	public function post_callback($callback_action, $result): void
	{
		$this->log_debug('Start of ' . __METHOD__ . "(): for entry id: #" . esc_html($callback_action['entry_id']));

		// Release lock to enable concurrency
		$GLOBALS['wpdb']->get_results(
			"SELECT RELEASE_LOCK('bayarcash_gf_payment');"
		);

		$entry_id = $callback_action['entry_id'];
		$entry = GFAPI::get_entry($entry_id);
		$url = rgar($entry, 'source_url');
		$message = esc_html__('Payment failed.', 'bayarcash-for-gravity-forms');

		if ($callback_action['type'] == 'complete_payment') {
			$entry_id = $callback_action['entry_id'];
			$form_id = $entry['form_id'];

			$message = esc_html__('Payment successful.', 'bayarcash-for-gravity-forms');
			$url = $this->get_confirmation_url($entry, $form_id);
		} else {
			$submission_feed = $this->get_payment_feed($entry);
			$cancel_url = rgars($submission_feed, 'meta/cancelUrl');

			if ($cancel_url && filter_var($cancel_url, FILTER_VALIDATE_URL)) {
				$url = $cancel_url;
			}
		}

		// Output payment status with proper escaping
		echo esc_html($message);

		// Output redirection link with proper escaping
		printf(
			'<a href="%1$s">%2$s</a>%3$s',
			esc_url($url),
			esc_html__('Click here', 'bayarcash-for-gravity-forms'),
			esc_html__(' to redirect confirmation page', 'bayarcash-for-gravity-forms')
		);

		// Redirect user automatically with proper URL escaping
		printf(
			'<script>window.location.replace(\'%s\');</script>',
			esc_js(esc_url($url))
		);

		$this->log_debug('End of ' . __METHOD__ . "(): for entry id: #" . esc_html($callback_action['entry_id']));
	}
  
  // This method inspired by gravityformsstripe plugin
  public function get_confirmation_url( $entry, $form_id ): string {
    $redirect_url_args = array(
      'gf_bayarcash_success' => 'true',
      'entry_id'        => $entry['id'],
      'form_id'         => $form_id
    );

    $redirect_url_args['hash'] = wp_hash( implode( $redirect_url_args ) );
    
    return add_query_arg(
      $redirect_url_args,
      rgar( $entry, 'source_url' )
    );
  }
  
  // This method inspired by gravityformsstripe plugin
  public function maybe_thankyou_page() {
    if ( !rgget( 'gf_bayarcash_success' ) OR !rgget( 'entry_id' ) OR !rgget( 'form_id' ) ) {
      return;
    }

    $entry_id = sanitize_key( rgget( 'entry_id' ) );
    $form_id  = sanitize_key( rgget( 'form_id' ) );
    $this->log_debug( __METHOD__ . "(): confirmation page for entry id: #" . $entry_id );

    if (wp_hash( 'true' . $entry_id . $form_id ) != rgget('hash')){
      $this->log_debug( __METHOD__ . "(): wp_hash failure for entry id: #" . $entry_id );
      return;
    }

    $form  = GFAPI::get_form( $form_id );
    $entry = GFAPI::get_entry( $entry_id );

    if ( ! class_exists( 'GFFormDisplay' ) ) {
      require_once( GFCommon::get_base_path() . '/form_display.php' );
    }

    $confirmation = GFFormDisplay::handle_confirmation( $form, $entry, false );

    if ( is_array( $confirmation ) && isset( $confirmation['redirect'] ) ) {
      $this->log_debug( __METHOD__ . "(): confirmation is redirect type for entry id: #" . $entry_id );
      header( "Location: {$confirmation['redirect']}" );
      exit;
    }

    GFFormDisplay::$submission[ $form_id ] = array(
      'is_confirmation'      => true,
      'confirmation_message' => $confirmation,
      'form'                 => $form,
      'lead'                 => $entry,
    );

    $this->log_debug( __METHOD__ . "(): confirmation is non redirect type for entry id: #" . $entry_id );
  }

	public function check_portal_key_valid($submission_feed): bool
	{
		// Verify nonce first
		if (!check_ajax_referer('bayarcash_payment_verification', 'nonce', false)) {
			return false;
		}

		$configuration_type = rgars($submission_feed, 'meta/bayarcashConfigurationType', 'global');

		if ($gf_global_settings = get_option('gravityformsaddon_bayarcash-for-gravity-forms_settings')) {
			$fpx_portal_key = rgar($gf_global_settings, 'fpx_portal_key');
		}

		if ($configuration_type == 'form') {
			$fpx_portal_key = rgars($submission_feed, 'meta/fpx_portal_key');
		}

		// Validate and sanitize POST data
		if (!isset($_POST['fpx_data'])) {
			return false;
		}

		// Unslash and sanitize the input
		$fpx_hashed_data_from_portal = sanitize_text_field(wp_unslash($_POST['fpx_data']));

		// Create a copy of POST data for hashing
		$post_data = $_POST;
		unset($post_data['fpx_data']);
		unset($post_data['nonce']);

		// Use wp_json_encode instead of json_encode
		$fpx_hashed_data_to_compare = md5($fpx_portal_key . wp_json_encode($post_data));

		return hash_equals($fpx_hashed_data_to_compare, $fpx_hashed_data_from_portal);
	}

public function get_payment_status_name($payment_status_code) {
    $payment_status_name_list = [
        'New',
        'Pending',
        'Unsuccessful',
        'Successful',
        'Cancelled',
    ];

    $is_Id = array_key_exists($payment_status_code, $payment_status_name_list);

    if (!$is_Id) {
        return;
    }

    return $payment_status_name_list[$payment_status_code];
}

}

<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.demotic.co.uk/
 * @since      1.0.0
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/public
 * @author     Demotic Limited <benfleming@demotic.co.uk>
 */
class Advanced_Forms_Paypal_Payment_Buttons_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advanced-forms-paypal-payment-buttons-public.css', array(), $this->version, 'all' );
	}
	
	/**
	 * Check/create/return temp directory (used for writing temp files)
	 * Also create .htaccess to prevent file downloads
	 *
	 * @since    1.0.0
	 */	
	private function af_ppb_temp_dir() {
		
		$upload = wp_upload_dir();
		$upload_dir = trailingslashit( $upload['basedir'] ) . 'af_ppb';
		wp_mkdir_p( $upload_dir );

		$htaccess_file = trailingslashit( $upload_dir ) . '.htaccess';

		if ( !file_exists( $htaccess_file ) ) {
			if ( $handle = @fopen( $htaccess_file, 'w' ) ) {
				fwrite( $handle, "Deny from all\n" );
				fclose( $handle );
			}
		}
		
		return $upload_dir;
		
	}

	/**
	 * Add span element to button submit text
	 *
	 * @since    1.0.0
	 */	
	public function af_ppb_form_args( $args, $form ) {
		
		$form_id = $form['post_id'];
		
		$button = get_field( 'field_af_ppb_button_type', $form_id );
		
		if ( $button && $button != 'none' ) {
			$args['submit_text'] = '<span>' . $args['submit_text'] . '</span>';
		}
		
		return $args;
		
	}
	
	/**
	 * Adds a class to the form so we can replace the submit button with an image
	 *
	 * @since    1.0.0
	 */	
	public function af_ppb_form_attributes( $form_attributes, $form, $args ) {
		
		$form_id = $form['post_id'];
		
		$button = get_field( 'field_af_ppb_button_type', $form_id );
		$image = get_field( 'field_af_ppb_button_image', $form_id );
		
		if ( $button && $button != 'none' ) {
			if ( $button == '_xclick' ) {
				if ( $image == 'pay_now' ) {
					$form_attributes['class'] .= ' pay-now';
				}
				else {
					$form_attributes['class'] .= ' buy-now';
				}
			}
			elseif ( $button == '_donations' ) {
				$form_attributes['class'] .= ' donate';
			}
		}
		
		return $form_attributes;

	}

	/**
	 * Runs after Advanced Forms email has been sent
	 *
	 * @since    1.0.0
	 */	
	public function af_ppb_form_submission( $form, $fields, $args ) {
		
		$form_id = $form['post_id'];
		
		$button = get_field( 'field_af_ppb_button_type', $form_id );
		
		if( $button && $button != 'none' ) {
		
			$af_ppb_variables = array(
				'cmd' => $button,
				'bn' => 'AF_PPB_WPS_GB',
				'amount' => get_field( 'field_af_ppb_amount', $form_id ),
				'discount_amount' => get_field( 'field_af_ppb_discount_amount', $form_id ),
				'discount_amount2' => get_field( 'field_af_ppb_discount_amount2', $form_id ),
				'discount_rate' => get_field( 'field_af_ppb_discount_rate', $form_id ),
				'discount_rate2' => get_field( 'field_af_ppb_discount_rate2', $form_id ),
				'discount_num' => get_field( 'field_af_ppb_discount_num', $form_id ),
				'item_name' => get_field( 'field_af_ppb_item_name', $form_id ),
				'item_number' => get_field( 'field_af_ppb_item_number', $form_id ),
				'quantity' => get_field( 'field_af_ppb_quantity', $form_id ),
				'shipping' => get_field( 'field_af_ppb_shipping', $form_id ),
				'shipping2' => get_field( 'field_af_ppb_shipping2', $form_id ),
				'tax' => get_field( 'field_ap_ppb_tax', $form_id ),
				'tax_rate' => get_field( 'field_af_ppb_tax_rate', $form_id ),
				'undefined_quantity' => get_field( 'field_af_ppb_undefined_quantity', $form_id ),
				'weight' => get_field( 'field_af_ppb_weight', $form_id ),
				'weight_unit' => get_field( 'field_af_ppb_weight_unit', $form_id ),
				'currency_code' => get_field( 'field_af_ppb_currency_code', $form_id ),
				'custom' => get_field( 'field_af_ppb_custom', $form_id ),
				'handling' => get_field( 'field_af_ppb_handling', $form_id ),
				'invoice' => get_field( 'field_af_ppb_invoice', $form_id ),
				'image_url' => get_field( 'field_ap_ppb_image_url', $form_id ),
				'lc' => get_field( 'field_af_ppb_lc', $form_id ),
				'return' => get_field( 'field_ap_ppb_return', $form_id ),
				'rm' => get_field( 'field_ap_ppb_rm', $form_id ),
				'cancel_return' => get_field( 'field_af_ppb_cancel_return', $form_id ),
				'notify_url' => get_field( 'field_af_ppb_notify_url', $form_id ),
			);
			
			// Replace any form tokens coded into the settings with the actual value from the form submission
			// Thanks to Advanced Forms' api-helpers.php for the preg_match
			foreach( $af_ppb_variables as $key => $input ) {
				if ( preg_match_all( "/{field:(.*?)}/", $input, $matches ) ) {
					foreach ($matches[1] as $i => $field_name ) {
						$field = af_get_field_object( $field_name );
						$rendered_value = _af_render_field_include( $field );
						$af_ppb_variables[$key] = str_replace( $matches[0][$i], $rendered_value, $af_ppb_variables[$key] );
					}
				}				
			}
			
			$mode = get_field( 'field_af_ppb_form_mode', $form_id );
			
			if( 'live' == $mode ) {
				$path = 'https://www.paypal.com/cgi-bin/webscr';
				$af_ppb_variables['business'] = get_field( 'field_af_ppb_accounts_live_account', 'option' );
			}
			else {
				$path = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
				$af_ppb_variables['business'] = get_field( 'field_af_ppb_accounts_sandbox_account', 'option' );
			}
			
			if ( 'on' == get_field( 'field_af_ppb_button_encryption', $form_id ) ) {

				$encdata = $this->af_ppb_encrypt_variables( $af_ppb_variables, $mode );

				if ( is_wp_error( $encdata ) ) {
					wp_die( '<strong>ERROR:</strong> An error occurred communicating with PayPal. Please contact the site owner quoting the error code ' . $encdata->get_error_code() . '.');
				}

				$form = '<form action="' . $path .'" method="post" name="af_ppb">' . PHP_EOL
					.'<input type="hidden" name="cmd" value="_s-xclick">' . PHP_EOL
					.'<input type="hidden" name="encrypted" value="' . $encdata . '">' . PHP_EOL
					.'</form>';

			}
			
			else {

				$form = '<form action="' . $path .'" method="post" name="af_ppb">' . PHP_EOL;

				foreach( $af_ppb_variables as $key => $value ) { 
					if( $value ) {
						$form .= '<input type="hidden" name="' . $key . '" value="' . $value . '">' . PHP_EOL;
					}
				}

				$form .= '</form>';

			}
			
			include_once 'partials/advanced-forms-paypal-payment-buttons-public-redirect.php';

			exit;
			
		}
		
	}

	/**
	 * Encrypts form variables before submitting to PayPal
	 *
	 * @since    1.0.0
	 */	
	private function af_ppb_encrypt_variables( $af_ppb_variables, $mode ) {

		$error = new WP_Error();

		if( 'live' == $mode ) {
			$af_ppb_variables['cert_id'] = get_field( 'field_af_ppb_encryption_merchant_public_certificate_id_live', 'option' );
			$paypal_cert = 'file://' . get_field( 'field_af_ppb_encryption_paypal_public_certificate_live', 'option' );
		}
		else {
			$af_ppb_variables['cert_id'] = get_field( 'field_af_ppb_encryption_merchant_public_certificate_id_sandbox', 'option' );
			$paypal_cert = 'file://' . get_field( 'field_af_ppb_encryption_paypal_public_certificate_sandbox', 'option' );
		}
		
		$merchant_cert = 'file://' . get_field( 'field_af_ppb_encryption_merchant_public_certificate', 'option' );
		$merchant_key = 'file://' . get_field( 'field_af_ppb_encryption_merchant_private_key', 'option' );
		
		if( !file_exists( $paypal_cert ) || !file_exists( $merchant_cert ) || !file_exists( $merchant_key ) ) { 
			$error->add( 'af_ppb_error_enc1', __( 'Missing certificate files.', $this->plugin_name ) );
			return $error;			
		}

		$tmpin_file  = tempnam( $this->af_ppb_temp_dir(), 'paypal_tmpin_' );
		$tmpout_file = tempnam( $this->af_ppb_temp_dir(), 'paypal_tmpout_' );
		$tmpfinal_file = tempnam( $this->af_ppb_temp_dir(), 'paypal_tmpfinal_' );

		$rawdata = array();
		foreach( $af_ppb_variables as $key => $value ) {
			$rawdata[] = "$key=$value";
		}
		$rawdata = implode( "\n", $rawdata );

		$fp = fopen( $tmpin_file, 'w' );
		if ( !$fp ) {
			$error->add( 'af_ppb_error_enc2', __( 'Cannot write temporary file.', $this->plugin_name ) );
			return $error;			
		}
		fwrite( $fp, $rawdata );
		fclose( $fp );

		if( !@openssl_pkcs7_sign( $tmpin_file, $tmpout_file, $merchant_cert, array($merchant_key, ''), array(), PKCS7_BINARY) ) {
			error_log ( print_r (openssl_error_string(), true ) );
			$error->add( 'af_ppb_error_enc3', __( 'Cannot sign data.', $this->plugin_name ) );
			return $error;			
		}

		$signeddata = file_get_contents( $tmpout_file );
		$signeddata = explode( "\n\n", $signeddata );
		$signeddata = $signeddata[1];
		$signeddata = base64_decode( $signeddata );
		$fp = fopen( $tmpout_file, 'w' );
		if ( !$fp ) {
			$error->add( 'af_ppb_error_enc4', __( 'Cannot write signed data.', $this->plugin_name ) );
			return $error;			
		}
		fwrite( $fp, $signeddata );
		fclose( $fp );	

		if( !@openssl_pkcs7_encrypt( $tmpout_file, $tmpfinal_file, $paypal_cert, array(), PKCS7_BINARY) ) {
			$error->add( 'af_ppb_error_enc5', __( 'Cannot encrypt data.', $this->plugin_name ) );
			return $error;			
		}

		$encdata = @file_get_contents( $tmpfinal_file, false );
		if( !$encdata ) {
			$error->add( 'af_ppb_error_enc6', __( 'Cannot read signed and encrypted data.', $this->plugin_name ) );
			return $error;			
		}

		$encdata = explode( "\n\n", $encdata );
		$encdata = trim( str_replace( "\n", '', $encdata[1] ) );
		$encdata = "-----BEGIN PKCS7-----$encdata-----END PKCS7-----";

		@unlink( $tmpfinal_file );
		@unlink( $tmpin_file );
		@unlink( $tmpout_file );
		
		return $encdata;
		
	}

}

<?php
/**
 * OxygenOrder Class File
 *
 * @package Oxygen
 * @summary Class to add WooCommerce order hooks
 * @version 1.0.56
 * @since  1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController;

/**
 * Oxygen MyData Class
 */
class OxygenOrder {

	/**
	 * Singleton Instance of OxygenOrder
	 *
	 * @var OxygenOrder
	 **/
	private static $instance = null;

	/**
	 * WooCommerce order ID
	 *
	 * @var int order ID
	 */
	private static $order_id = null;


	/**
	 * Singleton init Function
	 *
	 * @static
	 */
	public static function init() {
		if ( ! self::$instance ) {
			self::$instance = new self();

		}
		return self::$instance;
	}

	/**
	 * Oxygen Constructor
	 */
	private function __construct() {

		$this->init_hooks();
	}

	/**
	 *  Add all order hooks
	 *
	 *  @return void
	 */
	private function init_hooks() {

		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'admin_init', array( $this, 'oxygen_actions' ) );
		add_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20, 1 );

		add_action( 'woocommerce_order_status_changed', array( $this, 'run_on_woocommerce_bulk_order_status' ), 5, 4 );

		add_action( 'woocommerce_new_order', array( $this, 'on_order_create' ), 10, 1 );
		add_action( 'woocommerce_thankyou', array( $this, 'on_order_thankyou' ), 10, 1 );

		if ( 'yes' === get_option( 'oxygen_self_fields' ) ) {

			// Add VAT fields in billing address display.
			add_filter( 'woocommerce_checkout_fields', array( $this, 'override_checkout_fields' ) );
			add_filter( 'woocommerce_checkout_process', array( $this, 'validate_checkout_fields' ) );
			add_filter( 'woocommerce_address_to_edit', array( $this, 'oxygen_address_to_edit' ), 10, 2 );
			add_filter( 'woocommerce_order_formatted_billing_address', array( $this, 'oxygen_order_formatted_billing_address' ), 10, 2 );
			add_filter( 'woocommerce_my_account_my_address_formatted_address', array( $this, 'oxygen_my_account_my_address_formatted_address' ), 10, 3 );
			add_filter( 'woocommerce_formatted_address_replacements', array( $this, 'oxygen_formatted_address_replacements' ), 10, 2 );
			add_filter( 'woocommerce_admin_billing_fields', array( $this, 'oxygen_admin_billing_fields' ), 10, 1 );
			add_filter( 'woocommerce_ajax_get_customer_details', array( $this, 'oxygen_found_customer_details' ), 10, 3 );
			add_filter( 'woocommerce_customer_meta_fields', array( $this, 'oxygen_customer_meta_fields' ), 10, 1 );

		}

		add_filter( 'woocommerce_my_account_my_orders_actions', array( $this, 'my_account_my_orders_actions' ), 9999, 2 );
		// add extra order list column(s).
		add_filter( 'manage_edit-shop_order_columns', array( $this, 'shop_order_column' ), 20 );
		add_filter( 'woocommerce_shop_order_list_table_columns', array( $this, 'shop_order_column' ), 20 ); // hpos.
		add_action( 'manage_shop_order_posts_custom_column', array( $this, 'orders_list_column_content' ), 20, 2 );
		add_action( 'woocommerce_shop_order_list_table_custom_column', array( $this, 'orders_list_column_content' ), 20, 2 ); // hpos.

		$oxygen_order_status = str_replace( 'wc-', '', OxygenWooSettings::get_option( 'oxygen_order_status' ) );

		if ( current_user_can( 'manage_woocommerce' ) && is_ajax()
		     && isset( $_REQUEST['action'] ) && 'woocommerce_mark_order_status' === $_REQUEST['action'] // phpcs:ignore
		     && isset( $_REQUEST['status'] ) && $_REQUEST['status'] === $oxygen_order_status // phpcs:ignore
		     && isset( $_REQUEST['order_id'] ) && intval( $_REQUEST['order_id'] ) > 0 // phpcs:ignore
		) {

			add_action( 'init', array( $this, 'run_on_woocommerce_mark_order_status' ) );

		}


	}

	/**
	 *  Check for duplicate contact by email address on checkout
	 *
	 *  @param array $order_id WC_Order
	 *
	 *  @return string response
	 */

	public static function check_identical_contact( $order_id ): string {

		$order = wc_get_order($order_id);

		OxygenWooSettings::debug(array($order."------------check_identical_contact ----------"));

		if ($order) {

			$checkout_fields = [];
			$address_number = '';
			$address_street = '';
			$checkout_address = $order->get_billing_address_1();

			if(!empty($checkout_address)){

				if(preg_match('/^(\d+\s+[^\d]+)\s+\d+$/', $checkout_address, $match_street)){ /* letters and numbers between */
					$address_street = trim($match_street[1]);

				}else if (strpos($checkout_address, ",") !== false) { /* comma between example Θερίσου , 28 */

					$parts = explode(",", $checkout_address); // Split at the comma
					$address_street = trim($parts[0]);

					if(count($parts) > 1 && !is_numeric($parts[1])){
						$address_street = trim($parts[0])." ".trim($parts[1]);

						$only_text = preg_replace('/\d+/', '', $address_street);
						if($only_text){
							$address_street = trim($only_text);
						}
					}

					if (preg_match('/^[^\d]+/', $address_street, $matches))
						$address_street = trim($matches[0]);

					if(is_numeric(trim($parts[1])))
						$address_number = trim($parts[1]);

				}else if(preg_match('/^(.*)\s+(\d+\s*[A-Za-zΑ-Ωα-ω]*)$/u', $checkout_address, $matches)){ /* gets only string first part of an address */
					$address_street = trim($matches[1]);

					if (preg_match('/\s\d+\s*[A-Za-z]?\b/', $checkout_address, $matches)) {
						$address_number = trim($matches[0]); // Extracted number
					}
				}else {
					$address_street = trim( $checkout_address ); // letters only with spaces
				}

				if(preg_match('/\d+$/', $checkout_address, $match_number)){ /* gets only number at the end of an address */
					$address_number = trim($match_number[0]);
				}

			}else{
				OxygenWooSettings::debug( array("Billing address 1 is empty.") );
			}

			OxygenWooSettings::debug( array("Address for new contact is street : " .$address_street . " and number : " .$address_number) );


			/* checkout contact fields */
			$checkout_fields['billing'] = [
				'name' => $order->get_billing_first_name(),
				'surname'  => $order->get_billing_last_name(),
				'company_name'    => $order->get_billing_company(),
				'vat_number' => (self::get_billing_vat_info($order_id) !== false && isset($billing_vat_info['billing_vat'])) ? $billing_vat_info['billing_vat']: '',
				'email'      => $order->get_billing_email(),
				'street'  => $address_street,
				'number'  => $address_number,
				'city'       => $order->get_billing_city(),
				'zip_code'   => $order->get_billing_postcode(),
				'country'    => $order->get_billing_country(),
				'phone'      => $order->get_billing_phone(),
			];

			$checkout_email = $order->get_billing_email();
			$contact_by_email = OxygenApi::get_contact_by_email($checkout_email);


			if (!empty($contact_by_email['data'])) {

				OxygenWooSettings::debug(array("------------ contact_by_email is/are ".json_encode($contact_by_email['data'])." ----------"));

				$matching_contact_id = ''; // To store the ID of the first fully matching contact

				foreach ($contact_by_email['data'] as $item) {

					$differences = []; // Differences for this contact
					$same = []; // Matching fields for this contact

					$fields_to_compare = ['name', 'surname', 'street', 'number', 'city', 'zip_code', 'country'];
					/* name, surname, country , street , number , city ,zip_code , telephone , mobile  -- names of api */

					if ( !empty( $item['type'] ) && $item['type'] === 2 )  { /* Contact type is not 'P' is company */

						$fields_to_compare = ['name', 'surname', 'street', 'number', 'city', 'zip_code', 'country' ,'company_name','vat_number'];
					}

					foreach ($fields_to_compare as $field) {
						if (isset($checkout_fields['billing'][$field]) && isset($item[$field])) {
							if ($checkout_fields['billing'][$field] !== $item[$field]) {
								$differences[$field] = [
									'checkout' => $checkout_fields['billing'][$field],
									'api' => $item[$field],
								];
							}else{
								$same[$field] = $item[$field];
							}
						}
					}

					// Check if all fields match for this contact
					$all_fields_match = empty(array_diff($fields_to_compare, array_keys($same)));

					if ($all_fields_match) {
						// Fully matching contact found
						$matching_contact_id = $item['id'];
						OxygenWooSettings::debug(array("Type contact {$item['type']} : Identical contact found on order and Pelatologio API for order {$order_id} matching_contact_id is {$matching_contact_id}"));
						return $matching_contact_id; // Stop further processing

					} else {
						// Add differences for this contact
						OxygenWooSettings::debug(array("Type contact {$item['type']} : Contact on order and pelatologio app has some differences " .json_encode($differences)));
					}
				}
			}

		}else{

			OxygenWooSettings::debug(array("Empty order id in check_identical_contact"));

		}
		return '';

	}


	/**
	 *  Runs on WooCommerce on bulk action "woocommerce_order_status_changed".
	 *x
	 *  @param integer $id order id.
	 *  @param string  $from_status order from status.
	 *  @param string  $new_status order to status.
	 *  @param object  $order WC_Order.
	 *
	 *  @return void
	 */
	public function run_on_woocommerce_bulk_order_status( $id, $from_status, $new_status, $order ) {

		if ( $order ) {
			$_oxygen_invoice = $order->get_meta( '_oxygen_invoice', true );

			$log = array( '------------ in bulk oxygen invoice is not empty -------------');
			OxygenWooSettings::debug( $log );

			$oxygen_order_status = str_replace( 'wc-', '', OxygenWooSettings::get_option( 'oxygen_order_status' ) );

			// status mismatch.
			if ( $oxygen_order_status !== $new_status ) {
				return;
			}

			if(empty($_oxygen_invoice)) {
				$oxygen_default_document_type = OxygenWooSettings::get_option( 'oxygen_default_document_type' );
				$_GET['notetype'] = ( ! empty( $oxygen_default_document_type ) ? $oxygen_default_document_type : 'invoice' ); // default to invoice.
				$_GET['_oxygen_payment_note_type'] = $order->get_meta( '_oxygen_payment_note_type', true );

				$this->create_invoice( $order->get_id(), $order );

				$log = array(
					'------------ after invoice creation -- on run_on_woocommerce_bulk_order_status -------------'
				);
				OxygenWooSettings::debug( $log );

			}else{
				OxygenWooSettings::debug( array( 'empty oxygen invoice' ) );

			}

		}else {

			$log = array( '----------------- Invalid Order on bulk edit ' . gmdate( 'Y-m-d H:i:s' ) . ' -----------------', $order );
			OxygenWooSettings::debug( $log );
		}
	}


	/**
	 *  Runs on WooCommerce action "woocommerce_mark_order_status".
	 *
	 *  @return void
	 */
	public function run_on_woocommerce_mark_order_status() {

		$order = null;

		if ( isset( $_REQUEST['order_id'] ) ) { // phpcs:ignore

			$order = wc_get_order( intval( $_REQUEST['order_id'] ) ); // phpcs:ignore
		}

		if ( ! empty( $order ) ) {

			$oxygen_default_document_type      = OxygenWooSettings::get_option( 'oxygen_default_document_type' );
			$_GET['notetype']                  = ( ! empty( $oxygen_default_document_type ) ? $oxygen_default_document_type : 'invoice' ); // default to invoice.
			$_GET['_oxygen_payment_note_type'] = $order->get_meta( '_oxygen_payment_note_type', true );

			$this->create_invoice( $order->get_id(), $order );

		} else {

			$log = array( '----------------- Invalid Order ' . gmdate( 'Y-m-d H:i:s' ) . ' -----------------', $order );
			OxygenWooSettings::debug( $log );
		}
	}

	/**
	 *  Create the metabox for Oxygen order data.
	 *
	 *  @return void
	 */
	public function add_meta_box() {

		$screen = wc_get_container()->get( CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled()
			? wc_get_page_screen_id( 'shop-order' )
			: 'shop_order';

		add_meta_box( 'oxygen_order_extra', __( 'Oxygen', 'oxygen' ), array( $this, 'order_metabox_content' ), $screen, 'side', 'core' );
	}

	/**
	 *  Create the content of the Oxygen order metabox.
	 *
	 *  @param object $post_or_order_object WC_Order | WP_Post .
	 *
	 *  @return void
	 */
	public function order_metabox_content( $post_or_order_object ) {

		$order = ( $post_or_order_object instanceof WP_Post ) ? wc_get_order( $post_or_order_object->ID ) : $post_or_order_object;

		if ( ! $order ) {
			return;
		}

		global $post;

		self::$order_id = $order->get_id();

		$check = OxygenApi::check_connection();

		if ( ! $check ) {
			?>
            <a href="<?php echo esc_url( get_admin_url() . 'admin.php?page=wc-settings&tab=oxygen' ); ?>">
				<?php esc_html_e( 'Oxygen setup', 'oxygen' ); ?>
            </a>
			<?php
			return;
		}

		$nonce = wp_create_nonce( 'oxygen-' . $order->get_id() . '-nonce' );

		$_oxygen_payment_note_type = sanitize_text_field( $order->get_meta( $order->get_id(), '_oxygen_payment_note_type', true ) );

		$document_type_names = OxygenWooSettings::document_type_names();
		unset( $document_type_names['notice'] );

		$invoice_data = $order->get_meta( '_oxygen_invoice', true );
		$notice_data  = $order->get_meta( '_oxygen_notice', true );

		print_buttons_for_view_download_pdf($invoice_data,$notice_data);

		if( empty($invoice_data)){
			wp_nonce_field( 'oxygen-' . $order->get_id() . '-nonce', 'oxygen_nonce' );
			?>

            <div>
                <label for="_oxygen_payment_note_type"><?php esc_html_e( 'Payment Note Type', 'oxygen' ); ?></label>
                <p>
                    <select name="_oxygen_payment_note_type" id="_oxygen_payment_note_type" class="wide wide-fat">
                        <option value=""></option>
						<?php foreach ( $document_type_names as $key => $type ) { ?>
                            <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $_oxygen_payment_note_type, $key ); ?>><?php echo esc_html( $type ); ?></option>
						<?php } ?>

                    </select><br />
                </p>
            </div>
		<?php }?>
        <div>
			<?php if( empty($invoice_data)){?>
                <p>
                    <a href="<?php echo esc_url( get_admin_url() . 'post.php?post=' . intval( $order->get_id() ) . '&action=edit&oxygen=create_invoice&_wpnonce=' . esc_attr( $nonce ) ); ?>" class="oxy_create_document create_invoice disabled"><?php esc_html_e( 'Create Document', 'oxygen' ); ?></a>
                </p>
			<?php }?>
            <p>
                <a href="<?php echo esc_url( get_admin_url() . 'post.php?post=' . intval( $order->get_id() ) . '&action=edit&oxygen=create_notice&_wpnonce=' . esc_attr( $nonce ) ); ?>" class="oxy_create_notice action create_notice"><?php esc_html_e( 'Create Notice', 'oxygen' ); ?></a>
            </p>
        </div>

        <script>
            jQuery( document ).ready( function($) {

                if ( $('#_oxygen_payment_note_type').length > 0 ) {

                    var $type = $('#_oxygen_payment_note_type').val();

                    if ( $type == '' ) {

                        $( '.create_invoice' ).addClass( 'disabled' );

                    } else {

                        $( '.create_invoice' ).removeClass( 'disabled' );

                        if($(this).val() === 'alp' || $(this).val() === 'apy') {
                            var createReceiptText = '<?php echo esc_js( __('Create Receipt', 'oxygen') ); ?>';

                            $('.create_invoice').text(createReceiptText);
                        }else{

                            var createInvoiceText = '<?php echo esc_js( __('Create Invoice', 'oxygen') ); ?>';

                            $('.create_invoice').text(createInvoiceText);
                        }
                    }

                    $('#_oxygen_payment_note_type').on( 'change', function() {

                        var $dropthis = $( this );
                        $type = $dropthis.val();

                        if ( $dropthis.val() == '' ) {

                            $( '.create_invoice' ).addClass( 'disabled' );

                            return;

                        } else {

                            $( '.create_invoice' ).removeClass( 'disabled' );

                            if($type === 'alp' || $type === 'apy') {
                                var createReceiptText = '<?php echo esc_js( __('Create Receipt', 'oxygen') ); ?>';

                                $('.create_invoice').text(createReceiptText);
                            }else{

                                var createInvoiceText = '<?php echo esc_js( __('Create Invoice', 'oxygen') ); ?>';

                                $('.create_invoice').text(createInvoiceText);
                            }
                        }

                    });

                    $( '.create_invoice' ).on( 'click', function( e ) {

                        e.preventDefault();

                        if ( $(this).hasClass( 'disabled' ) ) {
                            return false;
                        }

                        $( '.create_invoice,.create_notice' ).addClass( 'disabled' );

                        window.location.href = $( this ).attr( 'href' )+'&_oxygen_payment_note_type='+$type;

                        return false;

                    });

                }

                $('.create_notice' ).on( 'click', function( e ) {

                    e.preventDefault();

                    if ( $(this).hasClass( 'disabled' ) ) {
                        return false;
                    }

                    $( '.create_notice' ).addClass( 'disabled' );

                    window.location.href = $( this ).attr( 'href' )+'&_oxygen_payment_note_type=notice';

                    return false;

                });

            });
        </script>
		<?php

		if ( ! isset( $_GET['oxygen'] ) || ! isset( $_GET['_wpnonce'] ) ) { // phpcs:ignore

			WC_Admin_Notices::remove_notice( 'oxygen_payment_note_missing' );
			WC_Admin_Notices::remove_notice( 'oxygen_invalid_action' );
			WC_Admin_Notices::remove_notice( 'oxygen_payment_method_missing' );
			WC_Admin_Notices::remove_notice( 'oxygen_invoice_info_missing' );
			WC_Admin_Notices::remove_notice( 'oxygen_contact_error' );
			WC_Admin_Notices::remove_notice( 'oxygen_invoice_error' );
			WC_Admin_Notices::remove_notice( 'oxygen_invoice_success' );
			WC_Admin_Notices::remove_notice( 'oxygen_notice_success' );
			WC_Admin_Notices::remove_notice( 'oxygen_no_api' );
			return;
		}
	}

	/**
	 *  Trigger Oxygen actions for invoice and notices creation.
	 *
	 *  @return void
	 */
	public function oxygen_actions() {

		if ( ! is_admin() ) {
			return;
		}

		if ( ! isset( $_GET['oxygen'] ) || ! isset( $_GET['_wpnonce'] ) ) {

			return;
		}

		$oxygen_api_key = get_option( 'oxygen_api_key' );

		if ( empty( $oxygen_api_key ) ) {
			/* translators: %s: URL to Oxygen platform */
			WC_Admin_Notices::add_custom_notice( 'oxygen_no_api', sprintf( __( '<p>The Oxygen API key is missing. <a href="%s">Click here to add one</a>.</p>', 'oxygen' ), get_admin_url() . 'admin.php?page=wc-settings&tab=oxygen' ) );
			WC_Admin_Notices::output_custom_notices();

			WC_Admin_Notices::remove_notice( 'oxygen_no_api' );

			return;
		}

		if ( isset( $_REQUEST['_wpnonce'] ) ) {
			$nonce = sanitize_key( $_REQUEST['_wpnonce'] );
		} else {
			return;
		}

		$post_id = 0;

		if ( isset( $_REQUEST['post'] ) ) {
			$post_id = intval( $_REQUEST['post'] );
		}

		$verify = wp_verify_nonce( $nonce, 'oxygen-' . $post_id . '-nonce' );

		if ( ! $verify ) {

			WC_Admin_Notices::add_custom_notice( 'oxygen', '<p>Could not verify request</p>' );
			WC_Admin_Notices::output_custom_notices();

			WC_Admin_Notices::remove_notice( 'oxygen' );

			return;
		}

		// Disable WP Obj Caching ...
		wp_using_ext_object_cache( false );
		wp_cache_flush();
		wp_cache_init();

		$order = wc_get_order( $post_id );
		if ( ! $order ) {
			return;
		}

		$oxygen_action = sanitize_text_field( wp_unslash( $_GET['oxygen'] ) );

		$_GET['notetype'] = false;

		if ( ( isset( $_GET['_oxygen_payment_note_type'] ) && ! empty( $_GET['_oxygen_payment_note_type'] ) ) || ( empty( $_GET['_oxygen_payment_note_type'] ) && 'create_notice' === $oxygen_action ) ) {

			if ( 'create_invoice' === $oxygen_action ) {

				$_GET['notetype'] = 'invoice';

				$this->create_invoice( $order->get_id(), $order );

			} elseif ( 'create_notice' === $oxygen_action ) {

				$_GET['notetype'] = 'notice';

				$this->create_invoice( $order->get_id(), $order );

			} else {

				WC_Admin_Notices::add_custom_notice( 'oxygen_invalid_action', '<p>' . __( 'Invalid Oxygen action', 'oxygen' ) . '</p>' );
			}
		} else {

			WC_Admin_Notices::add_custom_notice( 'oxygen_payment_note_missing', '<p>' . __( 'Payment Note Type has not been defined', 'oxygen' ) . '</p>' );

		}

	}

	function format_debug_message($notetype, $doc_key, $message) {
		return "DEBUG: {$notetype}/{$doc_key} - {$message}";
	}

	/**
	 * Select contact id for invoice/notice
	 * @param string $notetype
	 * @param string $doc_key
	 * @param array  $order_id the WC order ID.
	 * @param object $order WC_Order.
	 * @return string
	 */

	function select_contact_id_per_invoice_type($notetype, $doc_key, $order, $order_id): string {

		$oxygen_customer_id = '';
		$get_billing_vat_info = self::get_billing_vat_info($order_id);

		if ('invoice' === $notetype && in_array($doc_key, ['tpy', 'tpda'])) {

			OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, "Processing invoice with doc_key '{$doc_key}'")));

			$checkout_email = $order->get_billing_email();
			$checkout_vat = $get_billing_vat_info['billing_vat'];

			if (!empty($checkout_vat)) {

				$contact_by_vat = OxygenApi::get_contact_by_vat($checkout_vat);
				OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, 'Retrieved contacts by VAT: ' . json_encode($contact_by_vat))));

				if (empty($contact_by_vat['data'])) { /* No existing contact */

					$new_contact = self::create_new_contact($order, $get_billing_vat_info); /* returns false in case of error */
					if($new_contact) {
						$oxygen_customer_id = $new_contact['id'];
						OxygenWooSettings::debug( array( self::format_debug_message( $notetype, $doc_key, "No existing contact found by VAT. Created new contact with ID: {$oxygen_customer_id}" ) ) );
					}
					return $oxygen_customer_id;

				} else {
					if (count($contact_by_vat['data']) > 1) { /* Multiple contacts for the same VAT */

						OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, "Multiple contacts found for VAT '{$checkout_vat}'")));

						foreach ($contact_by_vat['data'] as $item) {
							// Check if contact type is a company
							if (isset($item['type']) && $item['type'] === 2) {

								if (!empty($checkout_email) && $checkout_email !== $item['email'] && $checkout_vat !== $item['vat_number']) {
									/* Checkout email differs from contact's email and VAT number */

									$new_contact = self::create_new_contact($order, $get_billing_vat_info);
									if($new_contact) {
										$oxygen_customer_id = $new_contact['id'];
										OxygenWooSettings::debug( array( self::format_debug_message( $notetype, $doc_key, "Checkout email '{$checkout_email}' differs from contact's email or VAT. Created new contact with ID: {$oxygen_customer_id}" ) ) );
									}
									return $oxygen_customer_id;

								} else { /* Contact VAT data are filled AND checkout email matches */

									$oxygen_customer_id = $item['id'];
									OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, "Existing contact found with matching VAT. Using contact ID: {$oxygen_customer_id}")));
									return $oxygen_customer_id;
								}

							} else { /* Contact type is not 'C' */

								$new_contact = self::create_new_contact($order, $get_billing_vat_info);
								if($new_contact) {
									$oxygen_customer_id = $new_contact['id'];
									OxygenWooSettings::debug( array( self::format_debug_message( $notetype, $doc_key, "Contact type is not 'C'. Created new contact with ID: {$oxygen_customer_id}" )));
								}
								return $oxygen_customer_id;
							}
						}

					} else { /* Only one contact */

						$existing_contact = $contact_by_vat['data'][0];
						if (!empty($checkout_email) && $checkout_email !== $existing_contact['email'] && $checkout_vat !== $existing_contact['vat_number']) {
							/* Checkout email differs from contact's email and VAT number */

							$new_contact = self::create_new_contact($order, $get_billing_vat_info);
							if($new_contact) {
								$oxygen_customer_id = $new_contact['id'];
								OxygenWooSettings::debug( array( self::format_debug_message( $notetype, $doc_key, "Checkout email '{$checkout_email}' differs from contact's email or VAT. Created new contact with ID: {$oxygen_customer_id}" ) ));
							}
							return $oxygen_customer_id;

						} else { /* Contact VAT data are filled AND checkout email matches */

							$oxygen_customer_id = $existing_contact['id'];
							OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, "Existing contact found with matching VAT and email. Using contact ID: {$oxygen_customer_id}")));
							return $oxygen_customer_id;
						}
					}
				}

			}

		} elseif ('invoice' === $notetype && in_array($doc_key, ['alp', 'apy'])) {

			OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, "Processing ALP/APY invoice with doc_key '{$doc_key}'")));

			$checkout_email = $order->get_billing_email();

			if (!empty($checkout_email)) {

				OxygenWooSettings::debug(array( "order at this point is ".$order_id));

				$is_identical = self::check_identical_contact( $order_id );
				OxygenWooSettings::debug(" -------- function execution {$is_identical}" );

				if(empty($is_identical)) {

					$new_contact = self::create_new_contact($order, $get_billing_vat_info);
					if($new_contact) {
						$oxygen_customer_id = $new_contact['id'];
						OxygenWooSettings::debug( array(
							self::format_debug_message( $notetype,
								$doc_key,
								"Is not identical - Created new contact with ID: {$oxygen_customer_id}" )
						) );
					}
					return $oxygen_customer_id;
				}else{
					OxygenWooSettings::debug( array(
						self::format_debug_message( $notetype,
							$doc_key,
							"Is identical - return contact with ID: {$is_identical}" )
					) );
					/* epistrefei to contact_id tis epafhs poy einai tautosimh */
					return $is_identical;
				}

			} else { /* Empty checkout email */

				OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, "Checkout email is empty. Creating new contact.")));

				$new_contact = self::create_new_contact($order, $get_billing_vat_info);
				if($new_contact) {
					$oxygen_customer_id = $new_contact['id'];
					OxygenWooSettings::debug( array(
						self::format_debug_message( $notetype,
							$doc_key,
							"Created new contact with ID: {$oxygen_customer_id}" )
					) );
				}
				return $oxygen_customer_id;
			}

		} elseif ('notice' === $notetype) {

			OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, "Processing notice.")));

			$checkout_email = $order->get_billing_email();

			if (!empty($checkout_email)) {

				$is_identical = self::check_identical_contact( $order_id );
				OxygenWooSettings::debug( "Notice -------- if contact is identical {$is_identical}" );

				if ( empty( $is_identical ) ) {
					$new_contact = self::create_new_contact( $order, $get_billing_vat_info );
					if ( $new_contact ) {
						$oxygen_customer_id = $new_contact['id'];
						OxygenWooSettings::debug( array(
							self::format_debug_message( $notetype,
								$doc_key,
								"Notice - Created new contact with ID: {$oxygen_customer_id}" )
						) );
					}

					return $oxygen_customer_id;
				} else {
					OxygenWooSettings::debug( array(
						self::format_debug_message( $notetype,
							$doc_key,
							"Notice - Is identical - return contact with ID: {$is_identical}" )
					) );

					/* epistrefei to contact_id tis epafhs poy einai tautosimh */
					return $is_identical;
				}
			}else{

				$new_contact = self::create_new_contact( $order, $get_billing_vat_info );
				if ( $new_contact ) {
					$oxygen_customer_id = $new_contact['id'];
					OxygenWooSettings::debug( array(
						self::format_debug_message( $notetype,
							$doc_key,
							"Notice - empty checkout email - Created new contact with ID: {$oxygen_customer_id}" )
					) );
				}

				return $oxygen_customer_id;
			}

		}

		OxygenWooSettings::debug(array(self::format_debug_message($notetype, $doc_key, "No conditions met. Returning empty customer ID.")));
		return $oxygen_customer_id;
	}



	/**
	 *  Create order invoice on Oxygen API
	 *
	 *  @param array  $order_id the WC order ID.
	 *  @param object $order WC_Order.
	 *  @return array|false
	 */
	public function create_invoice( $order_id, $order ) {

		// Disable WP Obj Caching ...
		wp_using_ext_object_cache( false );
		wp_cache_flush();
		wp_cache_init();
		$_oxygen_invoice = $order->get_meta( '_oxygen_invoice', true );

		// abort duplicate invoice.
		if ( ! empty( $_oxygen_invoice ) &&  !empty( $_GET['_oxygen_payment_note_type'] ) && $_GET['_oxygen_payment_note_type'] !== 'notice') {

			$order->add_order_note( 'Duplicate oxygen document aborted' );
			return false;
		}

		// if we are NOT on the thankyou page.
		if ( ! ( is_checkout() && is_wc_endpoint_url( 'order-received' ) ) ) {

			if ( isset( $_REQUEST['_wpnonce'] ) ) {
				$nonce = sanitize_key( $_REQUEST['_wpnonce'] );
			} else {
				return;
			}

			$verify              = wp_verify_nonce( $nonce, 'oxygen-' . $order_id . '-nonce' );
			$verify_oxygen_nonce = wp_verify_nonce( $nonce, 'oxygen-nonce' );

			if ( ! $verify && 0 === $order_id ) {

				$log = array( '----------------- Could not verify request ' . gmdate( 'Y-m-d H:i:s' ) . ' -----------------', array( $order_id, __( 'Could not verify request', 'oxygen' ) ) );
				OxygenWooSettings::debug( $log );

				WC_Admin_Notices::add_custom_notice( 'oxygen', '<p>Could not verify request</p>' );
				WC_Admin_Notices::output_custom_notices();

				WC_Admin_Notices::remove_notice( 'oxygen' );

				return;
			}
		}

		$log = array( '----------------- creating_invoice ' . gmdate( 'Y-m-d H:i:s' ) . ' -----------------' );
		OxygenWooSettings::debug( $log, 'info' );

		$post_id = $order_id;

		if ( isset( $_REQUEST['post'] ) ) {
			$post_id = intval( $_REQUEST['post'] );
		}

		if ( 0 === $post_id && isset( $_REQUEST['post_ID'] ) ) {
			$post_id = intval( $_REQUEST['post_ID'] );
		}

		$doc_key = false;

		if ( isset( $_GET['_oxygen_payment_note_type'] ) ) {
			$doc_key = sanitize_text_field( wp_unslash( $_GET['_oxygen_payment_note_type'] ) );
		}

		$oxygen_default_receipt_doctype = get_option( 'oxygen_default_receipt_doctype' );
		$oxygen_default_invoice_doctype = get_option( 'oxygen_default_invoice_doctype' );
		$oxygen_default_document_type   = OxygenWooSettings::get_option( 'oxygen_default_document_type' );

		if ( ! isset( $_GET['notetype'] ) ) {

			$log = array( '----------------- Invalid Payment Note Type ' . gmdate( 'Y-m-d H:i:s' ) . ' -----------------', array( $order_id, __( 'Invalid Payment Note Type', 'oxygen' ) ) );
			OxygenWooSettings::debug( $log );

			WC_Admin_Notices::add_custom_notice( 'oxygen_payment_note_missing', '<p>' . __( 'Invalid Payment Note Type', 'oxygen' ) . '</p>' );

			return false;

		}

		$notetype = sanitize_text_field( wp_unslash( $_GET['notetype'] ) );

		if ( 'notice' === $_GET['notetype'] ) {
			$doc_key = 'notice';
		}

		if ( isset( $_GET['oxygen'] ) && 'notice' !== $notetype && empty( $doc_key ) ) {

			$log = array( '----------------- Invalid Payment Note Type ' . gmdate( 'Y-m-d H:i:s' ) . ' -----------------', array( $order_id, __( 'Payment Note Type has not been defined', 'oxygen' ) ) );
			OxygenWooSettings::debug( $log );

			WC_Admin_Notices::add_custom_notice( 'oxygen_payment_note_missing', '<p>' . __( 'Payment Note Type has not been defined', 'oxygen' ) . '</p>' );

			return false;

		}

		$get_billing_vat_info = self::get_billing_vat_info( $order_id );

		if ( ! isset( $_GET['oxygen'] ) ) {

			// set the default document type.
			// is it selected to create an invoice.

			$should_create_invoice = false;

			if ( isset( $get_billing_vat_info['billing_invoice'] ) && ! empty( $get_billing_vat_info['billing_invoice'] ) ) {

				if ( false !== $get_billing_vat_info['billing_invoice'] ) {

					if ( 'y' === strtolower( $get_billing_vat_info['billing_invoice'] ) || 1 === $get_billing_vat_info['billing_invoice'] || '1' === $get_billing_vat_info['billing_invoice'] || 'yes' === strtolower( $get_billing_vat_info['billing_invoice'] ) ) {

						$should_create_invoice = true;
					}
				}
			}

			if ( false !== $get_billing_vat_info && true === $should_create_invoice && ! empty( $order->get_billing_company() ) && ! empty( $oxygen_default_invoice_doctype ) ) {

				$order->update_meta_data( '_oxygen_payment_note_type', $oxygen_default_invoice_doctype );
				$doc_key = $oxygen_default_invoice_doctype;

			} else {

				if ( ! empty( $oxygen_default_receipt_doctype ) ) {

					$order->update_meta_data( '_oxygen_payment_note_type', $oxygen_default_receipt_doctype );
					$doc_key = $oxygen_default_receipt_doctype;

				}
			}
		} else {

			$order->update_meta_data( '_oxygen_payment_note_type', $doc_key );
		}

		$class_cat_subfix = '';
		if ( 'alp' === $doc_key || 'apy' === $doc_key ) {
			$class_cat_subfix = '_receipt';
		}

		$document_types  = OxygenWooSettings::document_types();
		$mydata_types    = OxygenWooSettings::mydata_document_types();
		$payment_methods = OxygenWooSettings::get_option( 'oxygen_payment_methods' );
		$oxygen_taxes    = OxygenWooSettings::oxygen_tax_options();

		if ( ! isset( $payment_methods[ $order->get_payment_method() ] ) ) {

			$log = array( '----------------- Invalid Payment Note Type ' . gmdate( 'Y-m-d H:i:s' ) . ' -----------------', array( $order_id, __( 'Payment method not found', 'oxygen' ) ) );
			OxygenWooSettings::debug( $log );

			WC_Admin_Notices::add_custom_notice( 'oxygen_payment_method_missing', '<p>' . __( 'Payment method not found', 'oxygen' ) . '</p>' );

			return false;
		}

		/* select contact id or create new */
		$oxygen_customer_id = self::select_contact_id_per_invoice_type($notetype,$doc_key,$order,$order_id);


		if(empty($oxygen_customer_id)){
			WC_Admin_Notices::add_custom_notice( 'error','<p>Contact not created please check contact data and try again.</p>' );
		}

		if ( 'notice' !== $notetype ) {
			if ( ( 'tpda' === $doc_key || 'tpy' === $doc_key ) && false === $get_billing_vat_info ) {

				$log = array( '----------------- Invalid Payment Note Type ' . gmdate( 'Y-m-d H:i:s' ) . ' -----------------', array( $order_id, __( 'Invoice details are missing or incomplete', 'oxygen' ) ) );
				OxygenWooSettings::debug( $log );

				WC_Admin_Notices::add_custom_notice( 'oxygen_invoice_info_missing', '<p>' . __( 'Invoice details are missing or incomplete', 'oxygen' ) . '</p>' );

				return false;

			}
		}

		/* check if order's language is checked on settings then print invoice in order's language , else on selected lang */
		$wc_order_language = get_checkout_language($order_id);
		OxygenWooSettings::debug( array('------ this is the language in site ',$wc_order_language) );

		$infobox_lang = 'Order No ';
		$shipping_lang = 'Shipping: ';
		$language_to_print  = get_option( 'oxygen_language' );
		if($language_to_print  === 'order_lang'){
			if($wc_order_language === 'el'){
				$language_to_print = 'EL';
				$infobox_lang = 'Αριθμός παραγγελίας ';
				$shipping_lang = 'Μεταφορικά: ';
			}else{
				$language_to_print = 'EN';
			}
		}else{
			if($language_to_print === 'EL'){
				$infobox_lang = 'Αριθμός παραγγελίας ';
				$shipping_lang = 'Μεταφορικά: ';
			}
		}

		if ( 'notice' === $notetype ) {

			$doc_key = 'notice';

			$args = array_filter(
				array(
					'numbering_sequence_id' => OxygenWooSettings::get_option( 'oxygen_num_sequence' . $doc_key ),
					'issue_date'            => wp_date( 'Y-m-d' ),
					'expire_date'           => wp_date( 'Y-m-d', strtotime( '+1 month' ) ),
					'contact_id'            => $oxygen_customer_id,
					'is_paid'               => ( OxygenWooSettings::get_option( 'oxygen_is_paid' ) === 'yes' ? true : false ),
					'language'              => $language_to_print,
					'logo_id'               => ( ! empty( OxygenWooSettings::get_option( 'oxygen_logo' ) ) ? OxygenWooSettings::get_option( 'oxygen_logo' ) : OxygenWooSettings::get_default_logo_id() ),
					/* translators: %s: order ID string */
					'infobox'               => $infobox_lang. sprintf(' %s' , $order_id),
				)
			);

		} else {

			$payment_method_option = $payment_methods[ $order->get_payment_method() ];
			if ( empty($payment_method_option)){
				if( !empty(get_option('oxygen_payment_default'))){
					$payment_method_option = get_option('oxygen_payment_default');
				}else{
					OxygenWooSettings::debug( array('------ Option for default payment method is empty ------- ',$payment_method_option) );
				}
			}

			$receipt_id = get_post_meta( $order->get_id(), '_oxygen_has_receipt_id', true );

			$args = array_filter(
				array(
					'numbering_sequence_id' => OxygenWooSettings::get_option( 'oxygen_num_sequence' . $doc_key ),
					'issue_date'            => wp_date( 'Y-m-d' ),
					'document_type'         => $document_types[ $doc_key ], // p or rp if physical product exists.
					'mydata_document_type'  => $mydata_types[ $doc_key ],
					'payment_method_id'     => $payment_method_option,
					'contact_id'            => $oxygen_customer_id,
					'is_paid'               => ( OxygenWooSettings::get_option( 'oxygen_is_paid' ) === 'yes' ? true : false ),
					'language'              => $language_to_print,
					'logo_id'               => ( ! empty( OxygenWooSettings::get_option( 'oxygen_logo' ) ) ? OxygenWooSettings::get_option( 'oxygen_logo' ) : OxygenWooSettings::get_default_logo_id() ),
					/* translators: %s: order ID string */
					'infobox'               => $infobox_lang. sprintf(' %s' , $order_id),
					'receipt_id'            => $receipt_id ?? ''
				)
			);
		}

		$oxygen_taxes = get_option( 'oxygen_taxes' );

		$items = $order->get_items();

		foreach ( $items as $item_id => $item ) {

			$taxes = $item->get_taxes();

			$item_rate_id = false;

			foreach ( $taxes['total'] as $rate_id => $amount ) {

				if ( ! empty( $amount ) ) {

					$item_rate_id = $rate_id;
					break;
				}
			}

			if ( 'notice' === $notetype ) {
				$get_product_mydata_info = self::get_product_mydata_receipt_info( $item->get_product_id() );
			} else {
				$get_product_mydata_info = self::get_product_mydata_info( $item->get_product_id() );
			}

			$product_variation_id = $item['variation_id'];

			/* fix variation code sku if exist else use parent -- if there isn't variation product sku in app pelatologio everything is null */
			/* ---SOS--- if the SKU !== product_code_pelatologio (maybe wrong), there is any check for now */

			$option_oxygen_products_variations = get_option('oxygen_products_variations');

			/* an 8elw panta na painei to parent product sku */
			if($option_oxygen_products_variations === 'yes'){

				$item_product = wc_get_product( $item->get_product_id() );
				OxygenWooSettings::debug( array('------always parent sku product code ',$item_product->get_sku()) );

			}else{
				if ( !empty( $product_variation_id ) && $product_variation_id !== 0) {
					$item_product = wc_get_product( $product_variation_id );
				} else {
					$item_product = wc_get_product( $item->get_product_id() );
				}

				if (!empty($item_product)) {
					OxygenWooSettings::debug( array( '------NOT $option_oxygen_products_variations product code ', $item_product->get_sku() ));
				}

			}

			$product_code = (!empty($item_product) && is_object($item_product)) ? ($item_product->get_sku() ?? '') : '';

			$args['items'][] = array(
				'code'                           => $product_code,
				'description'                    => strip_tags($item->get_name()), /* strip any HTML tags */
				'quantity'                       => $item->get_quantity(),
				'unit_net_value'                 => round( ( $item->get_total() / $item->get_quantity() ), 2 ),
				'tax_id'                         => $oxygen_taxes[ $rate_id ],
				'vat_amount'                     => round( $item->get_total_tax(), 2 ),
				'net_amount'                     => round( $item->get_total(), 2 ),
				'mydata_classification_category' => ( is_array( $get_product_mydata_info[ 'mydata_category' . $class_cat_subfix ] ) ? $get_product_mydata_info[ 'mydata_category' . $class_cat_subfix ][0] : $get_product_mydata_info[ 'mydata_category' . $class_cat_subfix ] ),
				'mydata_classification_type'     => ( is_array( $get_product_mydata_info[ 'mydata_classification_type' . $class_cat_subfix ] ) ? $get_product_mydata_info[ 'mydata_classification_type' . $class_cat_subfix ][0] : $get_product_mydata_info[ 'mydata_classification_type' . $class_cat_subfix ] ),
			);
		}

		$items = $order->get_items( array( 'shipping' ) );

		foreach ( $items as $item_id => $item ) {

			if ( 0 === floatval( $item->get_total() ) ) {
				continue;
			}

			$taxes = $item->get_taxes();

			$item_rate_id = false;

			foreach ( $taxes['total'] as $rate_id => $amount ) {

				if ( ! empty( $amount ) ) {

					$item_rate_id = $rate_id;
					break;
				}
			}

			$get_item_mydata_info = $item->get_data();

			$oxygen_shipping_code = self::clean( str_replace( 'wc-', '', OxygenWooSettings::get_option( 'oxygen_shipping_code' ) ) );

			$args['items'][] = array(
				'code'                           => ( ! empty( $oxygen_shipping_code ) ? $oxygen_shipping_code : 'shipping' ),
				'description'                    => $shipping_lang . $item->get_name(),
				'quantity'                       => $item->get_quantity(),
				'unit_net_value'                 => round( ( $item->get_total() / $item->get_quantity() ), 2 ),
				'tax_id'                         => $oxygen_taxes[ $rate_id ],
				'vat_amount'                     => round( $item->get_total_tax(), 2 ),
				'net_amount'                     => round( $item->get_total(), 2 ),
				'mydata_classification_category' => 'category1_5',
				'mydata_classification_type'     => 'E3_562',
			);

		}

		$items = $order->get_items( array( 'fee' ) );

		foreach ( $items as $item_id => $item ) {

			$taxes = $item->get_taxes();

			$item_rate_id = false;

			foreach ( $taxes['total'] as $rate_id => $amount ) {

				if ( ! empty( $amount ) ) {

					$item_rate_id = $rate_id;
					break;
				}
			}

			$get_item_mydata_info = $item->get_data();

			if ( 'notice' === $notetype ) {
				$get_product_mydata_info = array(
					'mydata_category'            => get_option( 'mydata_category_receipt' ),
					'mydata_classification_type' => get_option( 'mydata_classification_type_receipt' ),
				);
			} else {
				$get_product_mydata_info = array(
					'mydata_category'                    => get_option( 'mydata_category' ),
					'mydata_classification_type'         => get_option( 'mydata_classification_type' ),
					'mydata_category_receipt'            => get_option( 'mydata_category_receipt' ),
					'mydata_classification_type_receipt' => get_option( 'mydata_classification_type_receipt' ),
				);
			}

			if ( $item->get_total() < 0 ) {
				$args['items'][] = array(
					'code'                           => null,
					'description'                    => $item->get_name(),
					'quantity'                       => $item->get_quantity(),
					'unit_net_value'                 => round( ( $item->get_total() / $item->get_quantity() ), 2 ),
					'tax_id'                         => $oxygen_taxes[ $rate_id ],
					'vat_amount'                     => round( $item->get_total_tax(), 2 ),
					'net_amount'                     => round( $item->get_total(), 2 ),
					'mydata_classification_category' => ( is_array( $get_product_mydata_info[ 'mydata_category' . $class_cat_subfix ] ) ? $get_product_mydata_info[ 'mydata_category' . $class_cat_subfix ][0] : $get_product_mydata_info[ 'mydata_category' . $class_cat_subfix ] ),
					'mydata_classification_type'     => ( is_array( $get_product_mydata_info[ 'mydata_classification_type' . $class_cat_subfix ] ) ? $get_product_mydata_info[ 'mydata_classification_type' . $class_cat_subfix ][0] : $get_product_mydata_info[ 'mydata_classification_type' . $class_cat_subfix ] ),
				);
			} else {

				$args['items'][] = array(
					'code'                           => null,
					'description'                    => $item->get_name(),
					'quantity'                       => $item->get_quantity(),
					'unit_net_value'                 => round( ( $item->get_total() / $item->get_quantity() ), 2 ),
					'tax_id'                         => $oxygen_taxes[ $rate_id ],
					'vat_amount'                     => round( $item->get_total_tax(), 2 ),
					'net_amount'                     => round( $item->get_total(), 2 ),
					'mydata_classification_category' => 'category1_5',
					'mydata_classification_type'     => 'E3_562',
				);
			}
		}

		$log = array( '----------------- ' . $notetype . ' args log -----------------', $args, $order_id );
		OxygenWooSettings::debug( $log, 'debug' );

		if ( 'notice' === $notetype ) {

			$result = OxygenApi::add_notice( $args );

		} else {

			$result = OxygenApi::add_invoice( $args );

			$log = array( '----------------- Oxygen invoice creating for order ' . $order_id . ' -----------------', $result, $order_id );
			OxygenWooSettings::debug( $log, 'info' );

		}

		if ( ! array( $result ) ) {

			$log = array( '----------------- results not array -----------------', $result, $order_id );
			OxygenWooSettings::debug( $log );

		}

		if ( is_array( $result ) && isset( $result['body'] ) ) {
			if ( is_wp_error( $result ) ) {
				$log = array( '----------------- results wp error from api -----------------', $result, $order_id );
				OxygenWooSettings::debug( $log );
			} else {
				$add_invoice = json_decode($result['body'], true);
			}
		} else {
			if ( is_wp_error( $result ) ) {
				$log = array( '----------------- results wp error from api else -----------------', $result, $order_id );
				OxygenWooSettings::debug( $log );
			} else {
				$add_invoice = json_decode($result, true);
			}
		}

		if ( is_array( $add_invoice ) && isset( $add_invoice['id'] ) ) {

			if ( 'notice' === $notetype ) {

				$order->update_meta_data( '_oxygen_notice', $add_invoice );
				WC_Admin_Notices::add_custom_notice( 'oxygen_notice_success', '<p>' . __( 'Notice Created', 'oxygen' ) . '</p>' );
				$this->send_invoice_email($order,'notice');

			} else {

				$order->update_meta_data( '_oxygen_invoice', $add_invoice );

				if ( !empty($add_invoice) ) {
					WC_Admin_Notices::add_custom_notice( 'oxygen_invoice_success', '<p>' . __( 'Document created successfully', 'oxygen' ) . '</p>' );
					$this->send_invoice_email($order,'invoice');

				} else {
					WC_Admin_Notices::add_custom_notice( 'oxygen_invoice_error', '<p>' . __( 'Could not create invoice', 'oxygen' ). '</p>' );
				}
			}



			remove_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20 );
			$order->save_meta_data();
			$order->save();
			add_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20, 1 );

			if ( ! isset( $_GET['oxygen'] ) ) {
				return;
			}
		} else {

			$errors = array();

			if ( isset( $add_invoice['errors'] ) ) {

				foreach ( $add_invoice['errors'] as $error ) {

					$errors[] = implode( ',', $error );

				}
			} else {

				$errors = $add_invoice;

			}

			if ( 'notice' === $notetype ) {

				WC_Admin_Notices::add_custom_notice( 'oxygen_invoice_error', '<p>' . __( 'Could not create notice', 'oxygen' ) . ' | ' . implode( ',', $errors ) . '</p>' );
			} else {

				WC_Admin_Notices::add_custom_notice( 'oxygen_invoice_error', '<p>' . __( 'Could not create invoice', 'oxygen' ) . ' | ' . implode( ',', $errors ) . '</p>' );
			}

			$log = array( '----------------- ' . $notetype . ' error -----------------', $args, $add_invoice );
			OxygenWooSettings::debug( $log );
		}

		remove_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20 );
		$order->save_meta_data();
		$order->save();
		add_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20, 1 );

		if ( is_admin() && current_user_can( 'manage_woocommerce' ) ) {

			wp_safe_redirect( get_admin_url() . 'post.php?post=' . $order_id . '&action=edit' );
			die;
		}
	}


	/**
	 *  Get the customer billing VAT data by order ID.
	 *
	 *  @param array $order_id the WC order ID.
	 *  @return array|false
	 */
	public static function get_billing_vat_info( $order_id ) {

		$billing_vat        = false;
		$billing_job        = false;
		$billing_tax_office = false;
		$billing_invoice    = false;
		$billing_company    = false;

		$order = wc_get_order( $order_id );

		if ( ! $order_id ) {
			OxygenWooSettings::debug( 'Invalid order ID' );
			return false;
		}else{
			OxygenWooSettings::debug( array('order id is ' . $order_id) );
		}


		if ( 'yes' === get_option( 'oxygen_self_fields' ) ) {

			$billing_vat        = $order->get_meta( '_billing_vat', true );
			$billing_job        = $order->get_meta( '_billing_job', true );
			$billing_tax_office = $order->get_meta( '_billing_tax_office', true );
			$billing_invoice    = $order->get_meta( '_billing_invoice', true );
			$billing_company    = $order->get_billing_company();

		} else {

			$oxygen_vat_metakey           = get_option( 'oxygen_vat_metakey' );
			$oxygen_working_field_metakey = get_option( 'oxygen_working_field_metakey' );
			$oxygen_tax_office            = get_option( 'oxygen_tax_office' );
			$oxygen_issue_invoice_metakey = get_option( 'oxygen_issue_invoice_metakey' );

			$billing_vat        = $order->get_meta( $oxygen_vat_metakey, true );
			$billing_job        = $order->get_meta( $oxygen_working_field_metakey, true );
			$billing_tax_office = $order->get_meta( $oxygen_tax_office, true );
			$billing_invoice    = $order->get_meta( $oxygen_issue_invoice_metakey, true );
			$billing_company    = $order->get_billing_company();

		}

		if ( empty( $billing_vat ) ) {
			$billing_vat = $order->get_meta( '_billing_vat', true );
		}
		if ( empty( $billing_job ) ) {
			$billing_job = $order->get_meta( '_billing_job', true );
		}
		if ( empty( $billing_tax_office ) ) {
			$billing_tax_office = $order->get_meta( '_billing_tax_office', true );
		}
		if ( empty( $billing_invoice ) ) {
			$billing_invoice = $order->get_meta( 'billing_invoice', true );
		}

		if ( $billing_invoice == 1 && ! empty( $billing_vat ) && ! empty( $billing_job ) && ! empty( $billing_invoice ) && ! empty( $billing_company ) ) {

			$info = array(
				'billing_vat'        => $billing_vat,
				'billing_job'        => $billing_job,
				'billing_tax_office' => $billing_tax_office,
				'billing_invoice'    => $billing_invoice,
				'billing_company'    => $billing_company,
			);

			$log = array( '----------------- TPDA OR TPY -----------------' );
			OxygenWooSettings::debug( $log );

			return $info;

		} else {

			if($billing_invoice == 0 || $billing_invoice == ''){
				$info = array(
					'billing_vat'        => '',
					'billing_job'        => '',
					'billing_tax_office' => '',
					'billing_invoice'    => 0,
					'billing_company'    => '',
				);

				$log = array( '----------------- ALP OR APY -----------------' );
				OxygenWooSettings::debug( $log );

				return $info;
			}else{
				$info = array(
					'billing_vat'        => $billing_vat,
					'billing_job'        => $billing_job,
					'billing_tax_office' => $billing_tax_office,
					'billing_invoice'    => $billing_invoice,
					'billing_company'    => $billing_company,
				);

				if ( empty( $billing_vat ) || empty( $billing_job ) || empty( $billing_tax_office ) || empty( $billing_invoice ) || empty( $billing_company ) ) {

					$log = array( '----------------- Missing VAT info -----------------' );
					OxygenWooSettings::debug( $log );
				}
			}
		}

		return false;
	}

	/**
	 *  Create new contact
	 *
	 *  @param object $order
	 *  @param array|bool $get_billing_vat_info
	 *  @return array|boolean
	 */
	public static function create_new_contact( object $order , $get_billing_vat_info)
	{

		$log = array( '----------------- START CREATING NEW CONTACT -----------------' );
		OxygenWooSettings::debug( $log );

		/* TODO CREATE NEW CONTACT */
		$billing_invoice = get_post_meta( $order->get_id(), '_billing_invoice', true );
		$billing_vat        = false;
		$billing_job        = false;
		$billing_tax_office = false;
		$customer_type      = 1;

		if ( $get_billing_vat_info ) {

			$billing_vat        = $get_billing_vat_info['billing_vat'];
			$billing_job        = $get_billing_vat_info['billing_job'];
			$billing_tax_office = $get_billing_vat_info['billing_tax_office'];
			$billing_invoice    = $get_billing_vat_info['billing_invoice'];

			// set customer type to 2 ONLY if all values are set.
			if ( !empty($billing_vat) && !empty( $order->get_billing_company() ) ) {

				$log = array( '---- billing vat & billing company is ----',$billing_vat ,$order->get_billing_company());
				OxygenWooSettings::debug( $log );
				$customer_type = 2;
			}
		}

		$address_street = '';
		$address_number = 0;
		$checkout_address =  $order->get_billing_address_1();

		if(!empty($checkout_address)){

			if(preg_match('/^(\d+\s+[^\d]+)\s+\d+$/', $checkout_address, $match_street)){ /* letters and numbers between */
				$address_street = trim($match_street[1]);

			}else if (strpos($checkout_address, ",") !== false) { /* comma between example Θερίσου , 28 */

				$parts = explode(",", $checkout_address); // Split at the comma
				$address_street = trim($parts[0]);

				if(count($parts) > 1 && !is_numeric($parts[1])){
					$address_street = trim($parts[0])." ".trim($parts[1]);

					$only_text = preg_replace('/\d+/', '', $address_street);
					if($only_text){
						$address_street = trim($only_text);
					}
				}

				if (preg_match('/^[^\d]+/', $address_street, $matches))
					$address_street = trim($matches[0]);

				if(is_numeric(trim($parts[1])))
					$address_number = trim($parts[1]);

			}else if(preg_match('/^(.*)\s+(\d+\s*[A-Za-zΑ-Ωα-ω]*)$/u', $checkout_address, $matches)){ /* gets only string first part of an address */
				$address_street = trim($matches[1]);

				if (preg_match('/\s\d+\s*[A-Za-z]?\b/', $checkout_address, $matches)) {
					$address_number = trim($matches[0]); // Extracted number
				}
			}else {
				$address_street = trim( $checkout_address ); // letters only with spaces
			}

			if(preg_match('/\d+$/', $checkout_address, $match_number)){ /* gets only number at the end of an address */
				$address_number = trim($match_number[0]);
			}

		}else{
			OxygenWooSettings::debug( array("Billing address 1 is empty.") );
		}

		OxygenWooSettings::debug( array("Address for new contact is street : " .$address_street . " and number : " .$address_number) );

		$contact_args = array_filter(
			array(
				'code'         => '',
				'type'         => $customer_type,
				'is_client'    => true,
				'name'         => $order->get_billing_first_name(),
				'surname'      => $order->get_billing_last_name(),
				'company_name' => $billing_invoice === '1' ? $order->get_billing_company() : '',
				'profession'   => $billing_job,
				'vat_number'   => $billing_vat,
				'tax_office'   => $billing_tax_office,
				'telephone'    => $order->get_billing_phone(),
				'mobile'       => $order->get_billing_phone(),
				'email'        => $order->get_billing_email(),
				'street'       => $address_street,
				'number'       => $address_number,
				'city'         => $order->get_billing_city(),
				'zip_code'     => $order->get_billing_postcode(),
				'country'      => $order->get_billing_country(),
			)
		);

		if ( empty( $billing_vat ) ) {
			unset( $contact_args['vat_number'] );
		}

		$contact_args['is_supplier'] = false;
		$contact =  json_decode(OxygenApi::add_contact( $contact_args ) ,true);

		$log = array( '----------------- CONTACT IS -----------------', $contact );
		OxygenWooSettings::debug( $log );

		if ( !is_array( $contact ) || !isset( $contact['id'] ) ) {

			WC_Admin_Notices::add_custom_notice( 'oxygen_contact_error', '<p>' . __( 'Could not create contact', 'oxygen' ).'</p>' );

			if (!empty($contact['errors'])) {
				// Collect all error messages.
				$error_messages = array();
				foreach ($contact['errors'] as $field => $messages) {
					foreach ($messages as $message) {
						$error_messages[] = $message;
					}
				}
				$errors_html = implode(' | ', $error_messages);
				// Add the notice using WC_Admin_Notices.
				WC_Admin_Notices::add_custom_notice( 'oxygen_contact_error', '<p><strong>' . __('The following errors were found when creating a new contact:', 'oxygen') . '</strong></p><p>' . $errors_html . '</p>' );
			}
			return false;
		}

		return $contact;

	}

	/**
	 *  Create customer billing address extra fields.
	 *
	 *  @param array $fields customer billing address data.
	 *  @return array
	 */
	public function override_checkout_fields( $fields ) {

		$fields['billing']['billing_vat']        = array(
			'type'        => 'text',
			'label'       => __( 'VAT #', 'oxygen' ),
			'placeholder' => __( 'ex. EL1234567890', 'oxygen' ),
			'priority'    => 160,
			'class'       => array('custom-vat-field')

		);
		$fields['billing']['billing_job']        = array(
			'type'        => 'text',
			'label'       => __( 'Job Description Field', 'oxygen' ),
			'placeholder' => __( 'ex. Accountant', 'oxygen' ),
			'priority'    => 161,
		);
		$fields['billing']['billing_tax_office'] = array(
			'type'        => 'text',
			'label'       => __( 'Tax Office', 'oxygen' ),
			'placeholder' => __( 'ex. D', 'oxygen' ),
			'priority'    => 162,
		);
		$fields['billing']['billing_invoice']    = array(
			'type'     => 'checkbox',
			'label'    => __( 'I need an invoice', 'oxygen' ),
			'id'       => 'billing_invoice',
			'priority' => 159,
		);

		$fields['billing']['billing_company']['priority'] = 163;

		return $fields;

	}
	/**
	 *  Validate customer billing address extra fields.
	 *
	 *  @return void
	 */
	public function validate_checkout_fields() {

		if ( isset( $_POST['billing_invoice'] ) && isset( $_POST['billing_vat'] ) && empty( $_POST['billing_vat'] ) ) { // phpcs:ignore
			wc_add_notice( __( 'Please fill VAT ID', 'oxygen' ), 'error' );
		}
		if ( isset( $_POST['billing_invoice'] ) && isset( $_POST['billing_job'] ) && empty( $_POST['billing_job'] ) ) { // phpcs:ignore
			wc_add_notice( __( 'Please fill billing job', 'oxygen' ), 'error' );
		}
		if ( isset( $_POST['billing_invoice'] ) && isset( $_POST['billing_tax_office'] ) && empty( $_POST['billing_tax_office'] ) ) { // phpcs:ignore
			wc_add_notice( __( 'Please fill billing tax office', 'oxygen' ), 'error' );
		}
		if ( isset( $_POST['billing_invoice'] ) && isset( $_POST['billing_company'] ) && empty( $_POST['billing_company'] ) ) { // phpcs:ignore
			wc_add_notice( __( 'Please fill the billing company name', 'oxygen' ), 'error' );
		}

	}

	/**
	 *  Create customer billing address extra fields.
	 *
	 *  @param array  $address customer billing address fields data.
	 *  @param string $load_address address type.
	 *  @return array
	 */
	public function oxygen_address_to_edit( $address, $load_address ) {
		global $wp_query;

		if ( isset( $wp_query->query_vars['edit-address'] ) && 'billing' !== $wp_query->query_vars['edit-address'] ) {
			return $address;
		}

		if ( ! isset( $address['billing_vat'] ) ) {
			$address['billing_vat'] = array(
				'label'       => __( 'VAT #', 'oxygen' ),
				'placeholder' => _x( 'VAT #', 'placeholder', 'oxygen' ),
				'required'    => false,
				'class'       => array( 'form-row-first' ),
				'value'       => sanitize_text_field( get_user_meta( get_current_user_id(), 'billing_vat', true ) ),
			);
		}

		if ( ! isset( $address['billing_job'] ) ) {
			$address['billing_job'] = array(
				'label'       => __( 'Job Description Field', 'oxygen' ),
				'placeholder' => _x( 'Job Description Field', 'placeholder', 'oxygen' ),
				'required'    => false,
				'class'       => array( 'form-row-last' ),
				'value'       => sanitize_text_field( get_user_meta( get_current_user_id(), 'billing_job', true ) ),
			);
		}
		if ( ! isset( $address['billing_tax_office'] ) ) {
			$address['billing_tax_office'] = array(
				'label'       => __( 'Tax Office', 'oxygen' ),
				'placeholder' => _x( 'Tax Office', 'placeholder', 'oxygen' ),
				'required'    => false,
				'class'       => array( 'form-row-first' ),
				'value'       => sanitize_text_field( get_user_meta( get_current_user_id(), 'billing_tax_office', true ) ),
			);
		}

		if ( ! isset( $address['billing_invoice'] ) ) {
			$address['billing_invoice'] = array(
				'label'       => __( 'Issue invoice', 'oxygen' ),
				'placeholder' => _x( 'Issue invoice', 'placeholder', 'oxygen' ),
				'required'    => false,
				'class'       => array( 'form-row-last' ),
				'value'       => sanitize_text_field( get_user_meta( get_current_user_id(), 'billing_invoice', true ) ),
				'type'        => 'checkbox',
			);
		}

		return $address;
	}

	/**
	 *  Create customer billing address extra fields.
	 *
	 *  @param array  $fields customer meta data array.
	 *  @param object $order WC_Order.
	 *  @return array
	 */
	public function oxygen_order_formatted_billing_address( $fields, $order ) {
		$fields['billing_vat']        = sanitize_text_field( $order->get_meta( '_billing_vat', true ) );
		$fields['billing_job']        = sanitize_text_field( $order->get_meta( '_billing_job', true ) );
		$fields['billing_tax_office'] = sanitize_text_field( $order->get_meta( '_billing_tax_office', true ) );
		$fields['billing_invoice']    = sanitize_text_field( $order->get_meta( '_billing_invoice', true ) );

		return $fields;
	}


	/**
	 *  Adding new customer billing fields to the order.
	 *
	 *  @param array  $fields customer meta data array.
	 *  @param int    $customer_id order user ID.
	 *  @param string $type address type.
	 *  @return array
	 */
	public function oxygen_my_account_my_address_formatted_address( $fields, $customer_id, $type ) {

		if ( 'billing' === $type ) {
			$fields['vat']        = sanitize_text_field( get_user_meta( $customer_id, 'billing_vat', true ) );
			$fields['job']        = sanitize_text_field( get_user_meta( $customer_id, 'billing_job', true ) );
			$fields['tax_office'] = sanitize_text_field( get_user_meta( $customer_id, 'billing_tax_office', true ) );
			$fields['invoice']    = sanitize_text_field( get_user_meta( $customer_id, 'billing_invoice', true ) );
		}

		return $fields;
	}

	/**
	 *  Adding new customer billing fields to the order.
	 *
	 *  @param array $address customer address data.
	 *  @param array $args customer address data.
	 *  @return array
	 */
	public function oxygen_formatted_address_replacements( $address, $args ) {

		$address['{vat}']        = '';
		$address['{job}']        = '';
		$address['{tax_office}'] = '';
		$address['{invoice}']    = '';

		if ( ! empty( $args['vat'] ) ) {
			$address['{vat}'] = __( 'VAT #', 'oxygen' ) . ' ' . strtoupper( $args['vat'] );
		}
		if ( ! empty( $args['job'] ) ) {
			$address['{job}'] = __( 'Job Description Field', 'oxygen' ) . ' ' . strtoupper( $args['job'] );
		}
		if ( ! empty( $args['tax_office'] ) ) {
			$address['{tax_office}'] = __( 'Tax office', 'oxygen' ) . ' ' . strtoupper( $args['tax_office'] );
		}
		if ( ! empty( $args['invoice'] ) ) {
			$address['{invoice}'] = __( 'Issue invoice', 'oxygen' ) . ' ' . strtoupper( $args['invoice'] );
		}

		return $address;
	}

	/**
	 *  Adding new customer billing fields to the order.
	 *
	 *  @param array $fields customer meta data array.
	 *  @return array
	 */
	public function oxygen_admin_billing_fields( $fields ) {

		$fields['vat']        = array(
			'label' => __( 'VAT #', 'oxygen' ),
			'show'  => true,
		);
		$fields['job']        = array(
			'label' => __( 'Job Description Field', 'oxygen' ),
			'show'  => true,
		);
		$fields['tax_office'] = array(
			'label' => __( 'Tax office', 'oxygen' ),
			'show'  => true,
		);
		$fields['invoice']    = array(
			'label'             => __( 'Issue invoice', 'oxygen' ),
			'show'              => true,
			'type'              => 'number',
			'description'       => __( '1 is on, 0 is off', 'oxygen' ),
			'custom_attributes' => array(
				'min' => 0,
				'max' => 1,
			),
		);

		return $fields;
	}

	/**
	 *  Fetching customer meta data fields from the order.
	 *
	 *  @param array  $customer_data customer meta data array.
	 *  @param object $customer WC_Customer.
	 *  @param int    $user_id the user ID.
	 *  @return array
	 */
	public function oxygen_found_customer_details( $customer_data, $customer, $user_id ) {

		$customer_data['billing_vat']        = sanitize_text_field( get_user_meta( $user_id, 'billing_vat', true ) );
		$customer_data['billing_job']        = sanitize_text_field( get_user_meta( $user_id, 'billing_job', true ) );
		$customer_data['billing_tax_office'] = sanitize_text_field( get_user_meta( $user_id, 'billing_tax_office', true ) );
		$customer_data['billing_invoice']    = sanitize_text_field( get_user_meta( $user_id, 'billing_invoice', true ) );

		$customer_data['billing']['vat']        = $customer_data['billing_vat'];
		$customer_data['billing']['job']        = $customer_data['billing_job'];
		$customer_data['billing']['tax_office'] = $customer_data['billing_tax_office'];
		$customer_data['billing']['invoice']    = ( empty( $customer_data['billing_invoice'] ) ? 0 : $customer_data['billing_invoice'] );

		return $customer_data;
	}

	/**
	 *  Adding new customer meta data fields to the order.
	 *
	 *  @param array $fields customer meta data array.
	 *  @return array
	 */
	public function oxygen_customer_meta_fields( $fields ) {
		$fields['billing']['fields']['billing_vat'] = array(
			'label'       => __( 'VAT #', 'oxygen' ),
			'description' => '',
		);

		$fields['billing']['fields']['billing_job'] = array(
			'label'       => __( 'Job Description Field', 'oxygen' ),
			'description' => '',
		);

		$fields['billing']['fields']['billing_tax_office'] = array(
			'label'       => __( 'Tax Office', 'oxygen' ),
			'description' => '',
		);

		$fields['billing']['fields']['billing_invoice'] = array(
			'label'       => __( 'Issue invoice', 'oxygen' ),
			'description' => '',
			'class'       => '',
			'type'        => 'checkbox',
		);

		return $fields;
	}

	/**
	 *  Adding 1 new column with their titles (keeping "Total" and "Actions" columns at the end).
	 *
	 *  @param array $columns the order list admin columns array.
	 *  @return array
	 */
	public function shop_order_column( $columns ) {

		$reordered_columns = array();

		// Inserting columns to a specific location.
		foreach ( $columns as $key => $column ) {
			$reordered_columns[ $key ] = $column;
			if ( 'order_status' === $key ) {
				// Inserting after "Status" column.
				$reordered_columns['oxygen'] = __( 'Oxygen', 'oxygen' );
			}
		}
		return $reordered_columns;
	}

	/**
	 *  Adding custom fields meta data on new column(s)
	 *
	 *  @param string $column name of the column.
	 *  @param int    $post_id post ID.
	 *  @return void
	 */
	public function orders_list_column_content( $column, $post_id ) {

		$order = wc_get_order( $post_id );

		switch ( $column ) {
			case 'oxygen':
				// Get custom post meta data.
				$invoice_data = $order->get_meta( '_oxygen_invoice', true );
				$notice_data  = $order->get_meta( '_oxygen_notice', true );

				print_buttons_for_view_download_pdf($invoice_data,$notice_data);

				break;
		}
	}

	/**
	 *  On order create actions
	 *
	 *  @param int $order_id the ID of the order.
	 *  @return void
	 */
	public function on_order_create( $order_id ) {

		$order = wc_get_order( $order_id );

		$oxygen_default_receipt_doctype = get_option( 'oxygen_default_receipt_doctype' );
		$oxygen_default_invoice_doctype = get_option( 'oxygen_default_invoice_doctype' );

		$get_billing_vat_info = self::get_billing_vat_info( $order_id );

		$log = array( '----------------- on order create -----------------');
		OxygenWooSettings::debug( $log );

		if ( false !== $get_billing_vat_info && ! empty( $order->get_billing_company() ) && ! empty( $oxygen_default_invoice_doctype ) ) {

			$order->update_meta_data( '_oxygen_payment_note_type', $oxygen_default_receipt_doctype );
		}
		if ( ! empty( $oxygen_default_invoice_doctype ) ) {

			$order->update_meta_data( '_oxygen_payment_note_type', $oxygen_default_invoice_doctype );
		}

		remove_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20 );
		$order->save_meta_data();
		$order->save();
		add_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20, 1 );

	}

	/**
	 *  On order thankyou actions
	 *
	 *  @param int $order_id the ID of the order.
	 *  @return void
	 */
	public function on_order_thankyou( $order_id ) {

		// Disable WP Obj Caching ...
		wp_using_ext_object_cache( false );
		wp_cache_flush();
		wp_cache_init();

		$order = wc_get_order( $order_id );

		$oxygen_order_status = str_replace( 'wc-', '', OxygenWooSettings::get_option( 'oxygen_order_status' ) );
		$_oxygen_invoice     = $order->get_meta( '_oxygen_invoice', true );

		if ( empty( $_oxygen_invoice ) ) {

			if ( $order->get_status() === $oxygen_order_status ) {

				$oxygen_default_document_type      = OxygenWooSettings::get_option( 'oxygen_default_document_type' );
				$_GET['notetype']                  = ( ! empty( $oxygen_default_document_type ) ? $oxygen_default_document_type : 'invoice' ); // default to invoice.
				$_GET['_oxygen_payment_note_type'] = $order->get_meta( '_oxygen_payment_note_type', true );

				$this->create_invoice( $order_id, $order );
			}
		}

	}

	/**
	 *  On order save actions
	 *
	 *  @param object $order WC_Order.
	 *  @return void
	 */
	public function save_order( $order ) {

		if ( ! is_admin() ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! isset( $_POST['oxygen_nonce'] ) ) {
			return;
		}

		$post_id = $order->get_id();

		if ( ! wp_verify_nonce( sanitize_key( $_POST['oxygen_nonce'] ), 'oxygen-' . $post_id . '-nonce', 'oxygen_nonce' ) ) {
			return;
		}

		// Disable WP Obj Caching ...
		wp_using_ext_object_cache( false );
		wp_cache_flush();
		wp_cache_init();

		if ( isset( $_POST['_oxygen_payment_note_type'] ) ) {

			$order->update_meta_data( '_oxygen_payment_note_type', sanitize_text_field( wp_unslash( $_POST['_oxygen_payment_note_type'] ) ) );
		}

		$oxygen_order_status = str_replace( 'wc-', '', OxygenWooSettings::get_option( 'oxygen_order_status' ) );
		$_oxygen_invoice     = $order->get_meta( '_oxygen_invoice', true );

		if ( empty( $_oxygen_invoice ) && isset( $_POST ) && isset( $_POST['order_status'] ) ) {

			if ( sanitize_text_field( wp_unslash( $_POST['order_status'] ) ) === 'wc-' . $oxygen_order_status ) {

				$_GET['notetype']                  = 'invoice';
				$_GET['_oxygen_payment_note_type'] = $order->get_meta( '_oxygen_payment_note_type', true );

				add_action( 'woocommerce_order_status_' . $oxygen_order_status, array( $this, 'create_invoice' ), 10, 2 );
			}
		}

		remove_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20 );
		$order->save_meta_data();
		$order->save();
		add_action( 'woocommerce_after_order_object_save', array( $this, 'save_order' ), 20, 1 );

	}


	/**
	 *  On notice/invoice creation send email attachment
	 *
	 *  @param object $order WC_Order.
	 *  @return void of attachments absolute path.
	 */

	public static function send_invoice_email($order , $document_type) {

		OxygenWooSettings::debug( array( '--- in send_invoice_email -- ') );

		$oxygen_order_attachment = str_replace( 'wc-', '', OxygenWooSettings::get_option( 'oxygen_order_attachment' ) );

		if ($order  && 'yes' === $oxygen_order_attachment) {

			$_oxygen_invoice = $order->get_meta( '_oxygen_invoice', true );

            if($document_type === 'notice') {
	            $_oxygen_invoice = $order->get_meta( '_oxygen_notice', true );
            }

			$attachments = [];

			if ( ! empty( $_oxygen_invoice ) ) {
				$document_id = sanitize_text_field( $_oxygen_invoice['id'] );
				$doc_type    = sanitize_text_field( $_oxygen_invoice['document_type'] );
				$print_type  = 'a4';

				if ( $doc_type === '' && $document_type === 'invoice' ) {
					WC_Admin_Notices::add_notice( 'error', 'Document type is empty' );
				} else {
					$doc_types = array( 'p', 's', 'rs', 'rp' );

					/* print invoices types documents */
					if ( in_array( $doc_type, $doc_types ) ) {
						$oxygen_pdf = OxygenApi::get_invoice_pdf( $document_id, $print_type );

						$headers       = $oxygen_pdf['headers'];
						$document_name = get_filename_from_disposition( $headers );
					} else {
						/* print notices types documents */
						$oxygen_pdf = OxygenApi::get_notice_pdf( $document_id );

						$headers       = $oxygen_pdf['headers'];
						$document_name = get_filename_from_disposition( $headers );
					}

					$upload_dir  = wp_upload_dir();
					$oxygen_path = $upload_dir['basedir'] . '/oxygen';
					if ( ! is_dir( $oxygen_path ) ) {
						wp_mkdir_p( $oxygen_path );
					}

					$pdf_path = $upload_dir['basedir'] . '/oxygen/' . $document_name;

					$file_put = false;

					if ( is_array( $oxygen_pdf ) && isset( $oxygen_pdf['body'] ) ) {
						$file_put = file_put_contents( $pdf_path, $oxygen_pdf['body'] );
					}

					if ( ! empty( $file_put ) ) {

						$order->update_meta_data( '_oxygen_pdf_attachment', $document_name );
						$order->save_meta_data();

						OxygenWooSettings::debug( array( '--- oxygen_pdf_document_name  -- ' . $order->get_meta( '_oxygen_pdf_attachment' ) ) );
						$attachments[] = $pdf_path;
					} else {
						WC_Admin_Notices::add_notice( 'error', 'Pdf file could not created for this document' );
						OxygenWooSettings::debug( array(
							'-------- email doc doesnt exist in folder -----',
							$document_name
						) );
					}
				}

				// Send the email with attachments after the delay
				$mailer = WC()->mailer();
				$email  = $mailer->emails['WC_Email_Invoice_Email'];

				if ( $email->is_enabled() && !empty($attachments)) {

					add_filter('woocommerce_email_attachments', function($email_attachments, $email_id, $order) use ($attachments) {
						$email_attachments = array_merge($email_attachments, $attachments);
						OxygenWooSettings::debug( array( '--- merged attachments ', $email_attachments ) );

						return $email_attachments;
					}, 10, 3);

					$email->trigger( $order->get_id(), $order );
					OxygenWooSettings::debug( array( '--- in custom email sent for order ' . $order->get_id() . ' '.$document_type .' has already sent') );

					remove_filter('woocommerce_email_attachments', '__return_empty_array');

					OxygenOrder::delete_attachment_pdf_file();

				}
			}else{

				OxygenWooSettings::debug( array( '-------- empty pdf in send_invoice_email-----' ) );
			}
		}
	}


	public static function delete_attachment_pdf_file() {

		$upload_dir = wp_upload_dir(); // Get the upload directory
		$oxygen_path = $upload_dir['basedir'] . '/oxygen/';

		// Check if the directory exists
		if ( is_dir( $oxygen_path ) ) {
			// Open the directory
			$files = glob( $oxygen_path . '*'); // Get all files in the directory

			// Loop through and delete each file
			foreach ( $files as $file ) {
				if ( is_file( $file ) ) {
					unlink( $file ); // Delete the file
				}
			}
			OxygenWooSettings::debug( array( '------ deleting documents in oxygen ----- ' ) );


		}

	}

	/**
	 *  Fetches product myData settings
	 *
	 *  @param int $product_id the ID of the product.
	 *  @return array
	 */
	private static function get_product_mydata_info( $product_id ) {

		$meta = get_post_meta( $product_id );

		if ( ! empty( $meta['mydata_category'] ) && ! empty( $meta['mydata_classification_type'] ) ) {

			return array(
				'mydata_category'                    => $meta['mydata_category'],
				'mydata_classification_type'         => $meta['mydata_classification_type'],
				'mydata_category_receipt'            => $meta['mydata_category_receipt'],
				'mydata_classification_type_receipt' => $meta['mydata_classification_type_receipt'],
			);

		}

		$categories = get_the_terms( $product_id, 'product_cat' );

		if ( ! empty( $categories ) && is_array( $categories ) ) {

			foreach ( $categories as $cat ) {

				$mydata_category                    = get_term_meta( $cat->term_id, 'mydata_category', true );
				$mydata_classification_type         = get_term_meta( $cat->term_id, 'mydata_classification_type', true );
				$mydata_category_receipt            = get_term_meta( $cat->term_id, 'mydata_category_receipt', true );
				$mydata_classification_type_receipt = get_term_meta( $cat->term_id, 'mydata_classification_type_receipt', true );

				if ( ! empty( $mydata_category ) && ! empty( $mydata_classification_type ) ) {

					return array(
						'mydata_category'            => $mydata_category,
						'mydata_classification_type' => $mydata_classification_type,
						'mydata_category_receipt'    => $mydata_category_receipt,
						'mydata_classification_type_receipt' => $mydata_classification_type_receipt,
					);

				}
			}
		}

		return array(
			'mydata_category'                    => get_option( 'mydata_category' ),
			'mydata_classification_type'         => get_option( 'mydata_classification_type' ),
			'mydata_category_receipt'            => get_option( 'mydata_category_receipt' ),
			'mydata_classification_type_receipt' => get_option( 'mydata_classification_type_receipt' ),
		);

	}

	/**
	 *  Fetches product myData receipt settings
	 *
	 *  @param int $product_id the ID of the product.
	 *  @return array
	 */
	private static function get_product_mydata_receipt_info( $product_id ) {

		$meta = get_post_meta( $product_id );

		if ( ! empty( $meta['mydata_category'] ) && ! empty( $meta['mydata_classification_type'] ) ) {

			return array(
				'mydata_category'            => $meta['mydata_category_receipt'],
				'mydata_classification_type' => $meta['mydata_classification_type_receipt'],
			);

		}

		$categories = get_the_terms( $product_id, 'product_cat' );

		if ( ! empty( $categories ) && is_array( $categories ) ) {

			foreach ( $categories as $cat ) {

				$mydata_category            = get_term_meta( $cat->term_id, 'mydata_category_receipt', true );
				$mydata_classification_type = get_term_meta( $cat->term_id, 'mydata_classification_type_receipt', true );

				if ( ! empty( $mydata_category ) && ! empty( $mydata_classification_type ) ) {

					return array(
						'mydata_category'            => $mydata_category,
						'mydata_classification_type' => $mydata_classification_type,
					);

				}
			}
		}

		return array(
			'mydata_category'            => get_option( 'mydata_category_receipt' ),
			'mydata_classification_type' => get_option( 'mydata_classification_type_receipt' ),
		);

	}

	/**
	 *  New user actions on orders list table
	 *
	 *  @param array  $actions Array of user actions.
	 *  @param object $order WC_Order.
	 *  @return array
	 */
	public function my_account_my_orders_actions( $actions, $order ) {

		$invoice_data = $order->get_meta( '_oxygen_invoice', true );
		$notice_data  = $order->get_meta( '_oxygen_notice', true );

		print_buttons_for_view_download_pdf($invoice_data,$notice_data);

		return $actions;
	}


	/**
	 *  Helper method to allow only latin and numbers on strings
	 *
	 *  @param string $string the text to be cleaned.
	 *  @return string
	 */
	private static function clean( $string ) {

		$string = str_replace( ' ', '-', $string ); // Replaces all spaces with hyphens.

		return preg_replace( '/[^A-Za-z0-9\-]/', '', $string ); // Removes special chars.
	}

}


add_action('woocommerce_checkout_process', 'check_invoice_fields');

function check_invoice_fields() {

	$posted_data = WC()->checkout()->get_posted_data();

	if(!empty($posted_data)){

		$billing_country = $posted_data['billing_country'];
		$billing_invoice = $posted_data['billing_invoice'];
		$billing_vat = $posted_data['billing_vat'];
		$billing_job = $posted_data['billing_job'];
		$billing_tax_office = $posted_data['billing_tax_office'];

		if($billing_invoice === 1 ){ /* an exw epilexei ekdosh timologio */
			if(strcmp($billing_country, 'GR') === 0){ /* kai eimai ellada tote ola ta pedia einai ypoxrewtika */

				if(empty($billing_vat)){
					wc_add_notice(__('The VAT number field is mandatory for issuing an invoice.','oxygen'), 'error');
				}else{
					$result  = checkMod($billing_vat,$billing_country);

					if($result === 0) {
						wc_add_notice(__('The VAT number is incorrect.','oxygen'), 'error');
					}
				}

				if(empty($billing_job)){
					wc_add_notice(__('The Profession field is mandatory for invoicing.','oxygen'), 'error');
				}

				if(empty($billing_tax_office)){
					wc_add_notice(__('The DOU field is mandatory for issuing an invoice.','oxygen'), 'error');
				}
			}

		}
	}
}

/* save check option for invoice or not --- using in oxygen payments */
add_action('woocommerce_checkout_update_order_meta', 'save_billing_invoice_meta');
function save_billing_invoice_meta($order_id) {
	// Check if the billing_invoice field is set
	if (isset($_POST['billing_invoice']) && $_POST['billing_invoice'] === '1') {
		update_post_meta($order_id, '_billing_invoice', '1'); // Save as 'yes' if checked
		$log = array( '------------ if billing invoice checkbox updated --------------', $order_id . ' '.get_post_meta( $order_id, '_billing_invoice', true ) );
		OxygenWooSettings::debug( $log );
	} else {
		update_post_meta($order_id, '_billing_invoice', '0'); // Save as 'no' if not checked
		$log = array( '------------ else billing invoice checkbox updated -------------', $order_id . ' '. get_post_meta( $order_id, '_billing_invoice', true ));
		OxygenWooSettings::debug( $log );
	}

}


/**
 * Make the actual check
 *
 * a. Get the first 8 digits
 * b. Calculate sum of product digit * 2^(8-digit index[0..8])
 * c. Calculate sum mod11 mod10
 * d. Result must be the same as last (9th) digit
 *
 * @param $value    string VAT ID
 *
 * @return integer
 */
function checkMod($value,$billing_country){

	if($billing_country === 'GR' && strlen($value) > 9){
		return 0;
	}

	$digits = str_split(substr($value, 0, -1));
	$sum    = 0;
	foreach ($digits as $index => $digit) {
		$sum += $digit * pow(2, 8 - $index);
	}
	//== (int) $value[8]
	if( $sum % 11 % 10 == (int) $value[8]){
		return 1;
	}
	return 0;
}

/**
 * Check vat number via api call to vat_check
 *
 *
 * @return
 */
function handle_check_vat_action() {

	$log = array( '---------------- COUNTRY CODE -------------' ,$_POST['country_code'] );
	OxygenWooSettings::debug( $log );

	if ( isset( $_POST['vat_number'] ) && !isset($_POST['country_code'])){

		$vat_number = sanitize_text_field( $_POST['vat_number'] );
		$response = OxygenApi::do_vat_check($vat_number);

		$log = array( '---------------- handle vat search greek -------------' );
		OxygenWooSettings::debug( $log );

	}else if(isset( $_POST['vat_number'] ) && isset($_POST['country_code'])) {

		$log = array( '---------------- handle vat search VIES -------------' );
		OxygenWooSettings::debug( $log );

		$vat_number = sanitize_text_field( $_POST['vat_number'] );
		$country_code = sanitize_text_field( $_POST['country_code'] );
		$response = OxygenApi::do_vies_check($vat_number,$country_code);

	}else{
		$response = array( 'message' => 'handle_check_vat_action - Vat number is empty' );
	}

	// Send a response back to the AJAX call
	wp_send_json_success( $response );
}

// Hook into WordPress' AJAX system for both logged in and non-logged in users
add_action( 'wp_ajax_check_vat_action', 'handle_check_vat_action' );
add_action( 'wp_ajax_nopriv_check_vat_action', 'handle_check_vat_action' );

function enqueue_vat_check_script() {
	// Enqueue your custom JS file
	wp_enqueue_script( 'check_vat', OXYGEN_PLUGIN_URL . 'js/check_vat.js', array(),false);

	// Pass WooCommerce parameters (like ajax_url and nonce) to your JS file
	if ( is_checkout() ) {

		wp_localize_script( 'check_vat', 'handle_check_vat_action', array(
			'ajax_url'       => admin_url( 'admin-ajax.php' ),
		) );

	}
}

if( 'yes' === get_option('oxygen_fetch_vat_fields')) {
	add_action( 'wp_enqueue_scripts', 'enqueue_vat_check_script' );
}

function get_checkout_language($order_id) {

	$order = wc_get_order($order_id);
	$order_meta_data = $order->get_meta_data();

	$trp_language = null;
	foreach ( $order_meta_data as $meta ) {
		if ( $meta->key === 'trp_language' ) {
			$trp_language = $meta->value;
			break;
		}
	}

	if ( function_exists( 'icl_object_id' ) ) {
		return apply_filters( 'wpml_current_language', NULL );
	}elseif ( function_exists( 'pll_current_language' ) ) {
		return pll_current_language();
	}elseif ( $trp_language !== '' && $trp_language !== null) {
		return $trp_language;
	}

	return 'el';
}


function download_pdf_action() {

	if ( isset( $_POST['document_id']) && isset($_POST['doctype']) && !empty($_POST['document_id']) && !empty($_POST['doctype'])) {

		$document_id = sanitize_text_field($_POST['document_id']);
		$doc_type = sanitize_text_field($_POST['doctype']);
		$print_type = 'a4';

		if($doc_type === ''){
			wp_send_json_error('Document type is empty');
			wp_die();
		}

		$doc_types = array('tpy', 'tpda', 'apy', 'alp');

		/* print invoices types documents */
		if (in_array($doc_type, $doc_types)) {
			if ( $doc_type === 'alp' || $doc_type === 'apy' ) {
				$print_type = get_option( 'oxygen_receipt_print_type' );
			}

			$oxygen_pdf = OxygenApi::get_invoice_pdf( $document_id, $print_type );
		}else{
			/* print notices types documents */
			$oxygen_pdf = OxygenApi::get_notice_pdf( $document_id);
		}

		$upload_dir = wp_upload_dir();
		$oxygen_path = $upload_dir['basedir'] . '/oxygen';
		if ( ! is_dir( $oxygen_path ) ) {
			wp_mkdir_p( $oxygen_path );
		}

		$headers = $oxygen_pdf['headers'];
		$filename = get_filename_from_disposition($headers);

		$pdf_path = $upload_dir['basedir'] . '/oxygen/' . $filename;
		$pdf_url  = $upload_dir['baseurl'] . '/oxygen/' . $filename;

		$file_put = false;

		if ( is_array( $oxygen_pdf ) && isset( $oxygen_pdf['body'] ) ) {
			$file_put = file_put_contents( $pdf_path, $oxygen_pdf['body'] );
		}

		if ( $file_put ) {
			wp_send_json_success($pdf_url);
		} else {
			wp_send_json_error( [ 'message' => 'Failed to generate PDF. Maybe wrong document id.']);
		}

	}else{

		wp_send_json_error( [ 'message' => 'Document id or document type is empty. Failed to generate PDF.']);
	}
}

// Hook into WordPress' AJAX system for both logged in and non-logged in users
add_action( 'wp_ajax_download_pdf_action', 'download_pdf_action' );
add_action( 'wp_ajax_nopriv_download_pdf_action', 'download_pdf_action' );

function enqueue_download_pdf_script() {
	// Enqueue your custom JS file
	wp_enqueue_script( 'download_pdf', OXYGEN_PLUGIN_URL . '/js/download_pdf.js', array(), false );

	// Pass WooCommerce parameters (like ajax_url and nonce) to your JS file
	wp_localize_script( 'download_pdf', 'download_pdf_action', array(
		'ajax_url'       => admin_url( 'admin-ajax.php' ),
	) );
}

add_action( 'admin_enqueue_scripts', 'enqueue_download_pdf_script' );
add_action( 'wp_enqueue_scripts', 'enqueue_download_pdf_script' );



function delete_pdf_after_downloading() {

	if ( isset( $_POST['document_name'])) {

		$document_name = sanitize_text_field($_POST['document_name']);
		$upload_dir = wp_upload_dir();
		$oxygen_path = $upload_dir['basedir'] . '/oxygen/';
		$file_path = $oxygen_path . $document_name;

		if ( file_exists( $file_path ) ) {
			unlink( $file_path ); // Deletes the file
			exit;
		} else {
			wp_send_json_error( [ 'message' => 'File not found in path '.$file_path ] );
		}
	}else {
		wp_send_json_error( [ 'message' => 'Document id is wrong.' ] );
	}
}

add_action('wp_ajax_delete_pdf_after_downloading', 'delete_pdf_after_downloading');
add_action('wp_ajax_nopriv_delete_pdf_after_downloading', 'delete_pdf_after_downloading');

function print_buttons_for_view_download_pdf($invoice_data,$notice_data){

	$note_type    = $invoice_data['document_type'] ?? '';
	$doc_types_array = array( 's'  => 'tpy', 'p' => 'tpda', 'rs' => 'apy', 'rp' => 'alp');

	if ( isset( $invoice_data['iview_url'] ) && ! empty( $invoice_data['iview_url'] ) ) {
		?>
        <div>
            <p> <!-- first is the label of document receipt/invoice/notice -->
				<?php
				if( !empty($note_type)){
					if( $invoice_data['document_type'] == 'rs' || $invoice_data['document_type'] == 'rp' ){
						echo '<span class="oxygen_labels_orders">' . esc_html( __( 'Receipt', 'oxygen' ) ) ." - #".esc_html( $invoice_data['sequence'] . $invoice_data['number'] ). '</span>';
					}else{
						echo '<span class="oxygen_labels_orders">' . esc_html( __( 'Invoice', 'oxygen' ) ) ." - #".esc_html( $invoice_data['sequence'] . $invoice_data['number'] ). '</span>';
					}
				}
				?>
            </p>
            <div style="display:flex; align-items:center;">
                <span class="download_pdf_orders doctype_<?php echo $doc_types_array[$note_type];?>" id="<?php echo $invoice_data['id'];?>">
                    <span style="margin-right:5px;" class="dashicons dashicons-download"></span>
                    <?php esc_html_e( 'PDF Download', 'oxygen' ); ?>
                    <div class="loader_pdf"></div>
                </span>
                <?php if (!is_account_page()) { ?>
                <div class="send_invoice_email">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 91">
                        <path d="M 85,10 84,11 83,11 81,13 79,13 78,14 77,14 75,16 74,16 73,17 71,17 70,18 69,18 67,20 66,20 65,21 64,21 63,22 62,22 60,24 59,24 58,25 56,
                        25 55,26 54,26 52,28 51,28 50,29 49,29 47,31 46,31 45,32 42,32 39,35 38,35 37,36 35,36 34,37 33,37 31,39 29,39 28,40 27,40 26,41 26,42 25,43 22,43 21,
                        44 20,44 18,46 17,46 17,47 16,48 16,50 17,51 18,51 19,52 21,52 23,54 24,54 25,55 30,55 32,57 33,57 34,58 37,58 40,55 41,55 45,51 46,51 51,46 52,46 52,
                        45 53,44 54,44 55,43 57,45 57,46 56,47 56,48 54,50 53,50 53,51 52,52 52,53 51,54 50,54 50,55 46,59 46,61 47,61 48,62 49,62 50,63 52,63 53,64 52,65 43,65 43,66 42,67
                        42,79 44,81 47,81 48,80 49,80 49,79 50,78 50,77 53,74 53,73 54,72 54,69 53,68 53,66 54,65 56,65 57,66 62,66 64,68 65,68 66,69 68,69 69,70 74,70 76,72 80,72 82,70 82,64
                        83,63 83,56 84,55 84,54 85,53 85,51 86,50 86,42 87,41 87,31 88,30 88,27 89,26 89,22 90,21 90,11 89,10 Z" fill="grey" stroke="grey" stroke-width="1"/>
                    </svg>
                    <div class="loader_pdf"></div>
                </div>
                <?php } ?>
            </div>
            <p style="padding-top:4px;">
                <a class="oxygen_links_style" href="<?php echo esc_url( $invoice_data['iview_url'] ); ?>" target="_blank"><span class="dashicons dashicons-search"></span>
					<?php
					if( $invoice_data['document_type'] == 'rs' || $invoice_data['document_type'] == 'rp' ){
						esc_html_e( 'View Receipt', 'oxygen' );
					} else {
						esc_html_e( 'View Invoice', 'oxygen' );
					}
					?></a>
            </p>
        </div>

		<?php
	}
	if(!empty($invoice_data) && !empty($notice_data)){?>
        <p class="oxygen_list_separator"></p>
		<?php
	}
	if (!is_account_page()) {

		if ( isset( $notice_data['iview_url'] ) && ! empty( $notice_data['iview_url'] ) ) {
			?>
            <div>
                <p>
                    <span class="oxygen_labels_orders"><?php echo esc_html( __( 'Notice', 'oxygen' ) )." - #".esc_html( $notice_data['sequence'] . $notice_data['number'] ); ?></span>
                </p>
                <div style="display:flex; align-items:center;">
                    <span class="download_pdf_orders doctype_notice" id="<?php echo $notice_data['id'];?>">
                        <span style="margin-right:5px;" class="dashicons dashicons-download"></span>
                        <?php esc_html_e( 'PDF Download', 'oxygen' ); ?>
                        <div class="loader_pdf"></div>
                    </span>
                    <div class="send_invoice_email">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 91">
                            <path d="M 85,10 84,11 83,11 81,13 79,13 78,14 77,14 75,16 74,16 73,17 71,17 70,18 69,18 67,20 66,20 65,21 64,21 63,22 62,22 60,24 59,24 58,25 56,
                            25 55,26 54,26 52,28 51,28 50,29 49,29 47,31 46,31 45,32 42,32 39,35 38,35 37,36 35,36 34,37 33,37 31,39 29,39 28,40 27,40 26,41 26,42 25,43 22,43 21,
                            44 20,44 18,46 17,46 17,47 16,48 16,50 17,51 18,51 19,52 21,52 23,54 24,54 25,55 30,55 32,57 33,57 34,58 37,58 40,55 41,55 45,51 46,51 51,46 52,46 52,
                            45 53,44 54,44 55,43 57,45 57,46 56,47 56,48 54,50 53,50 53,51 52,52 52,53 51,54 50,54 50,55 46,59 46,61 47,61 48,62 49,62 50,63 52,63 53,64 52,65 43,65 43,66 42,67
                            42,79 44,81 47,81 48,80 49,80 49,79 50,78 50,77 53,74 53,73 54,72 54,69 53,68 53,66 54,65 56,65 57,66 62,66 64,68 65,68 66,69 68,69 69,70 74,70 76,72 80,72 82,70 82,64
                            83,63 83,56 84,55 84,54 85,53 85,51 86,50 86,42 87,41 87,31 88,30 88,27 89,26 89,22 90,21 90,11 89,10 Z" fill="grey" stroke="grey" stroke-width="1"/>
                        </svg>
                        <div class="loader_pdf"></div>
                    </div>
                </div>
                <p style="padding-top:4px;">
                    <a class="oxygen_links_style" href="<?php echo esc_url( $notice_data['iview_url'] ); ?>" target="_blank"><span class="dashicons dashicons-search"></span> <?php esc_html_e( 'View Notice', 'oxygen' ); ?></a><br />
                </p>
            </div>
			<?php
		}
	}
}

function get_filename_from_disposition($headers) {
	if (isset($headers['content-disposition'])) {
		// Match the filename in the Content-Disposition header
		if (preg_match('/filename="?([^"]+)"?/', $headers['content-disposition'], $matches)) {
			return $matches[1]; // Return the filename
		}
	}
	return null; // Return null if filename is not found
}


function send_invoice_email_on_click_action() {

	$order_id = $_POST['order_id'] ;
    $document_type = $_POST['document_type'] ;
	if ( !empty( $order_id ) && !empty($document_type)) {
		$order = wc_get_order( $order_id );

		if($order){
			OxygenOrder::send_invoice_email($order,$document_type);
			OxygenWooSettings::debug( array( '------------- email sent by icon oxygen column -------------' ));
		}else{
			WC_Admin_Notices::add_notice( 'error', 'Something is wrong with order\'s id. Please try again.' );
		}

	}
}

add_action( 'wp_ajax_send_invoice_email_on_click_action', 'send_invoice_email_on_click_action' );
add_action( 'wp_ajax_nopriv_send_invoice_email_on_click_action', 'send_invoice_email_on_click_action' );

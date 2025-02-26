<?php

/**
 * Customers class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Customers' ) ) {

	/**
	 * Customers
	 *
	 * Retrieval of customer related data
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Customers {

		/**
		 * Construct
		 *
		 * @since 1.0.0
		 */

		public function __construct() {

			add_action( 'admin_footer', array( $this, 'select_customer_role' ) );
			add_action( 'wp_ajax_billing_state_options', array( $this, 'billing_state_options' ) );
			add_action( 'wp_ajax_shipping_state_options', array( $this, 'shipping_state_options' ) );

		}

		/**
		 * Prints JS to change selected user role to customer on WordPress add user screen
		 *
		 * @since 1.0.0
		 */

		public function select_customer_role() {

			global $pagenow;

			if( $pagenow == 'user-new.php' && isset( $_GET['customer'] ) && $_GET['customer'] == 1 ) { ?>

				<script type="text/javascript">
					jQuery(document).ready( function($) {
						$( '#role option' ).attr( 'selected', false );
						$( '#role option[value="customer"]' ).attr( 'selected', true );
					});
				</script>

			<?php }

		}

		/**
		 * Gets the ids of customers
		 *
		 * @since 1.0.0
		 * @return array User ids of users with role customer
		 */

		public function ids() {

			$args = array(
				'role' => 'customer',
				'fields' => 'ID',
			);

			$ids = get_users( $args );

			return $ids;

		}

		/**
		 * Gets all billing state options via AJAX
		 *
		 * @since 1.0.0
		 * @return string JSON billing states array
		 */

		public function billing_state_options() {

			global $woocommerce;

			$billing_country = sanitize_text_field( $_POST['billing_country'] );
			$initial_load = sanitize_text_field( $_POST['initial_load'] );
			$initial_billing_state = sanitize_text_field( $_POST['initial_billing_state'] );

			$countries_obj = new WC_Countries();
			$countries = $countries_obj->__get('countries');
			$billing_states = $countries_obj->get_states( $billing_country );

			$states = array(
				'billing_states' => $billing_states,
				'initial_load' => $initial_load,
				'initial_billing_state' => $initial_billing_state,
			);

			echo json_encode( $states );

			die();

		}

		/**
		 * Gets all shipping state options via AJAX
		 *
		 * @since 1.0.0
		 * @return string JSON shipping states array
		 */

		public function shipping_state_options() {

			global $woocommerce;

			$shipping_country = sanitize_text_field( $_POST['shipping_country'] );
			$initial_load = sanitize_text_field( $_POST['initial_load'] );
			$initial_shipping_state = sanitize_text_field( $_POST['initial_shipping_state'] );

			$countries_obj = new WC_Countries();
			$countries = $countries_obj->__get('countries');
			$shipping_states = $countries_obj->get_states( $shipping_country );

			$states = array(
				'shipping_states' => $shipping_states,
				'initial_load' => $initial_load,
				'initial_shipping_state' => $initial_shipping_state,
			);

			echo json_encode( $states );

			die();

		}

	}

	new LDASH_Customers();

}
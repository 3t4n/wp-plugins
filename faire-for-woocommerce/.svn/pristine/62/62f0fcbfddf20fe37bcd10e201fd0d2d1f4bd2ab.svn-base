<?php
/**
 * Sync Orders.
 *
 * @package  FAIRE
 */

namespace Faire\Wc\Sync;

use Exception;
use Faire\Wc\Admin\Settings;
use Faire\Wc\Api\Order_Api;
use Faire\Wc\Faire\Order as Faire_Order;
use Faire\Wc\Utils;
use Faire\Wc\Woocommerce\Order as WC_Order;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Sync Order class.
 */
class Sync_Order {

	/**
	 * Max number of orders per page.
	 */
	const ORDERS_PER_PAGE = 50;

	/**
	 * Instance of Sync_Order_Status class.
	 *
	 * @var Sync_Order_Status
	 */
	private Sync_Order_Status $sync_status;

	/**
	 * Instance of Faire\Wc\Api\Order class.
	 *
	 * @var Order_Api
	 */
	private Order_Api $order_api;

	/**
	 * Instance of Faire\Wc\Admin\Settings class.
	 *
	 * @var Settings
	 */
	private Settings $settings;

	/**
	 * Arguments to retrieve Faire orders.
	 *
	 * @var array
	 */
	private array $faire_get_orders_args;

	/**
	 * Class constructor.
	 *
	 * @param Order_Api $order_api Instance of Faire\Wc\Api\Order class.
	 * @param Settings  $settings  Instance of Faire\Wc\Admin\Settings class.
	 */
	public function __construct( Order_Api $order_api, Settings $settings ) {
		$this->order_api   = $order_api;
		$this->settings    = $settings;
		$this->sync_status = new Sync_Order_Status( $settings );

		// Removes a Faire order ID from the list of already synced orders if the
		// related WooCommerce order is deleted.
		// We need to user the `before_delete_post` action because later on the
		// postmeta of the order is deleted and we lose the link with the related
		// Faire order.
		add_action( 'before_delete_post', array( $this, 'delete_from_synced_faire_orders' ) );

		new Sync_Order_Scheduler( array( $this, 'sync_orders' ), $this->settings );

		if (
			get_option( 'yes' === 'woocommerce_manage_stock' ) &&
			$this->settings->get_inventory_sync_on_add_to_cart()
		) {
			add_action( 'woocommerce_add_to_cart', array( $this, 'hook_sync_orders_on_add_to_cart' ) );
		}
	}

	/**
	 * Removes a Faire order ID from the list of already synced orders.
	 *
	 * When a WooCommerce order created during a Faire orders sync is permanently
	 * deleted, we remove the related Faire order ID from the list of already
	 * synced orders. This prevents that the order gets permanently excluded from
	 * being synced.
	 *
	 * @param int $order_id The WooCommerce order ID.
	 */
	public function delete_from_synced_faire_orders( int $order_id ) {
		if ( 'shop_order' !== get_post_type( $order_id ) ) {
			return;
		}
		$faire_order_id = get_post_meta( $order_id, '_faire_order_id', true );
		if ( $faire_order_id ) {
			$this->sync_status->delete_order_already_synced( $faire_order_id );
		}
	}

	/**
	 * Handles add to cart action.
	 */
	public function hook_sync_orders_on_add_to_cart() {
		if ( 'yes' !== get_option( 'woocommerce_manage_stock' ) ) {
			return;
		}
		if ( $this->sync_status->check_sync_running() ) {
			return;
		}
		if ( $this->sync_status->check_sync_finished_recently() ) {
			return;
		}
		$sync_scheduler = new Sync_Order_Scheduler(
			array( $this, 'sync_orders_once' ),
			$this->settings
		);
		$sync_scheduler->start_once_job();
	}

	/**
	 * Runs a single time orders sync.
	 */
	public function sync_orders_once() {
		$this->sync_status->sync_running( true );
		$this->sync_status->save_orders_sync_results( $this->import_orders() );
		$this->sync_status->save_last_sync_finish_timestamp();
		$this->sync_status->sync_running( false );
	}

	/**
	 * Handles Ajax requests to sync Faire orders.
	 */
	public function ajax_orders_manual_sync() {
		// Check for nonce security.
		$nonce = isset( $_POST['nonce'] ) ?
			sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) :
			'';

		if (
			empty( $nonce ) ||
			! wp_verify_nonce( $nonce, 'faire_orders_manual_sync' )
		) {
			wp_send_json_error(
				__( 'Manual sync failed. Unauthorized request.', 'faire-for-woocommerce' ),
				401
			);
		}

		$result = $this->sync_orders();
		if ( $this->sync_status::ORDERS_SYNC_RUNNING_STATUS === $result ) {
			wp_send_json_error(
				__( 'An orders sync is already in progress.', 'faire-for-woocommerce' ),
				400
			);
		}
		if ( $this->sync_status::ORDERS_SYNC_FINISHED_RECENTLY_STATUS === $result ) {
			wp_send_json_error(
				__( 'An orders sync finished recently. Please, try later.', 'faire-for-woocommerce' ),
				400
			);
		}

		wp_send_json_success( $this->sync_status->get_orders_sync_results() );
	}

	/**
	 * Runs orders sync and saves results.
	 *
	 * @return int
	 */
	public function sync_orders(): int {
		if ( $this->sync_status->check_sync_running() ) {
			return $this->sync_status::ORDERS_SYNC_RUNNING_STATUS;
		}
		if ( $this->sync_status->check_sync_finished_recently() ) {
			return $this->sync_status::ORDERS_SYNC_FINISHED_RECENTLY_STATUS;
		}
		$this->sync_status->sync_running( true );
		$results = $this->import_orders();
		$this->sync_status->save_last_sync_finish_timestamp();
		$this->sync_status->save_orders_sync_results( $results );
		$this->sync_status->sync_running( false );

		return $this->sync_status::ORDERS_SYNC_FINISHED_STATUS;
	}

	/**
	 * Imports orders from Faire into the shop.
	 *
	 * @return array Results of the orders import.
	 */
	public function import_orders(): array {
		$synced_orders = array();

		// We go back 30 days from the last orders sync to ensure no orders
		// get stuck un-synced for ever.
		$updated_at_min = gmdate(
			'Y-m-d\TH:i:s.v\Z',
			strtotime( $this->sync_status->get_orders_last_sync_date() . ' - 30 days' )
		);

		$this->faire_get_orders_args = array(
			'updated_at_min' => $updated_at_min,
			'page'           => 1,
		);

		$results = array();

		do {
			$orders = $this->get_orders_page( $this->faire_get_orders_args );
			$error  = $this->check_orders_page_errors( $orders );
			if ( $error ) {
				$results[] = $error;
				return $results;
			}

			$orders_in_page = count( $orders );
			// No orders in the first page, something might be wrong.
			$error = $this->check_first_orders_page_empty( $orders_in_page );
			if ( $error ) {
				$results[] = $error;
				return $results;
			}

			$skip_order_create = $this->settings->get_order_sync_skip_orders_create();

			// Process the retrieved orders.
			foreach ( $orders as $order ) {
				$faire_order = new Faire_Order( $order );
				$wc_order_id = WC_Order::get_order_by_faire_id( $faire_order->get_id() );
				$result      = $wc_order_id
					? $this->sync_order_status( $faire_order, $wc_order_id )
					: $this->sync_faire_to_wc_order( $faire_order, $skip_order_create );

				if ( 'success' === $result['status'] ) {
					$synced_orders[] = $faire_order->get_id();
				}
				$results[] = $result;
			}
			$this->faire_get_orders_args['page']++;
		} while ( self::ORDERS_PER_PAGE === $orders_in_page );

		$total_orders_synced = count( $synced_orders );
		if ( $total_orders_synced ) {
			$this->sync_status->save_orders_already_synced( $synced_orders );
		}
		$this->sync_status->save_orders_last_sync_date();

		$results[] = Utils::create_import_result_entry(
			true,
			sprintf(
				// translators: %1$d number of orders imported, %2$d date of import.
				__( 'Successfully synced: %1$d. Date %2$s.', 'faire-for-woocommerce' ),
				$total_orders_synced,
				$this->sync_status->get_orders_last_sync_date()
			)
		);

		return $results;
	}

	/**
	 * Checks if retrieving a page of orders failed with errors.
	 *
	 * @param array $orders Orders retrieved or errors result.
	 *
	 * @return array Resulting errors.
	 */
	private function check_orders_page_errors( array $orders ): array {
		$errors = array();
		if ( isset( $orders['error'] ) ) {
			$errors[] = Utils::create_import_error_entry(
				sprintf(
					// translators: %1d orders page, %2$s: date of import.
					__( 'Orders import failed at page %1$d. Date: %2$s', 'faire-for-wordpress' ),
					$this->faire_get_orders_args['page'],
					$this->faire_get_orders_args['updated_at_min']
				)
			);
			$errors[] = Utils::create_import_error_entry(
				$orders['error']['code'] . ': ' . $orders['error']['message']
			);
		}

		return $errors;
	}

	/**
	 * Checks if the first page of retrieved orders is empty.
	 *
	 * @param int $orders_in_page Orders retrieved.
	 *
	 * @return array Resulting error.
	 */
	private function check_first_orders_page_empty( int $orders_in_page ): array {
		$errors = array();
		if ( 0 === $orders_in_page && 1 === $this->faire_get_orders_args['page'] ) {
			$errors = Utils::create_import_error_entry(
				sprintf(
					// translators: %s date of import.
					__( 'Could not find orders to import. Date: %s', 'faire-for-wordpress' ),
					$this->faire_get_orders_args['updated_at_min']
				)
			);
		}

		return $errors;
	}

	/**
	 * Creates or updates a WooCommerce order from a given Faire order data.
	 *
	 * @param Faire_Order $faire_order       A Faire order.
	 * @param bool        $skip_order_create If true, WC order should not be created.
	 *
	 * @return array The result of the order sync.
	 */
	private function sync_faire_to_wc_order(
		Faire_Order $faire_order,
		bool $skip_order_create
	): array {
		if (
			$faire_order->check_was_synced(
				$this->sync_status->get_orders_already_synced()
			)
		) {
			return Utils::create_import_error_entry(
				sprintf(
					// translators: %s ID of the order.
					__( 'Order %s was already synced.', 'faire-for-woocommerce' ),
					$faire_order->get_id()
				)
			);
		}

		return $skip_order_create
			? WC_Order::update_inventory( $faire_order )
			: WC_Order::create( $faire_order );
	}

	/**
	 * Syncs the status of a Faire order into an existing WooCommerce order.
	 *
	 * @param Faire_Order $faire_order A Faire order.
	 * @param int         $wc_order_id  The ID of a WooCommerce order.
	 *
	 * @return array The result of the order status sync.
	 */
	private function sync_order_status(
		Faire_Order $faire_order,
		int $wc_order_id
	): array {
		$faire_order_state = $faire_order->get_state();
		$result            = ( 'backordered' === strtolower( $faire_order_state ) )
			? WC_Order::apply_backorder( $faire_order, $wc_order_id )
			: WC_Order::apply_status( $wc_order_id, $faire_order_state );

		$raw_message = $result
			// translators: %s ID of the order.
			? __( 'Order status updated. ID: %s', 'faire-for-woocommerce' )
			// translators: %s ID of the order.
			: __( 'Order status could not be updated. ID: %s', 'faire-for-woocommerce' );

		return Utils::create_import_result_entry(
			$result,
			sprintf( $raw_message, $faire_order->get_id() )
		);
	}

	/**
	 * Retrieves a page of Faire orders that were updated after a given date.
	 *
	 * @param array $args Arguments to retrieve orders from the Faire API.
	 *
	 * @return object[] Page of orders.
	 */
	private function get_orders_page( array $args ): array {
		$default_args = array(
			'page'  => 1,
			'limit' => self::ORDERS_PER_PAGE,
		);

		$args = wp_parse_args( $args, $default_args );

		try {
			$orders = $this->order_api->get_orders( $args )->orders;
		} catch ( Exception $e ) {
			$orders = array(
				'error' => array(
					'code'    => $e->getCode(),
					'message' => $e->getMessage(),
				),
			);
		}

		return $orders;
	}

}

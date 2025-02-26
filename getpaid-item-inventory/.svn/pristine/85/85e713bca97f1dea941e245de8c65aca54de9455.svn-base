<?php
/**
 * Main admin Class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Main admin class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */
class GetPaid_Item_Inventory_Admin {

	/**
	 * Class constructor.
	 *
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'maybe_redirect_to_settings' ) );
		add_filter( 'wpinv_settings_tabs', array( $this, 'register_settings_tab' ) );
		add_filter( 'wpinv_settings_sections', array( $this, 'register_settings_section' ) );
		add_filter( 'wpinv_registered_settings', array( $this, 'register_settings' ) );
		add_action( 'wpinv_item_details_metabox_item_details', array( $this, 'stock_quantity_input' ) );
		add_action( 'getpaid_item_metabox_save', array( $this, 'save_metabox' ) );
		add_filter( 'wpi_item_table_columns', array( $this, 'filter_item_columns' ) );
		add_filter( 'manage_edit-wpi_item_sortable_columns', array( $this, 'sortable_item_columns' ), 30 );
		add_action( 'manage_wpi_item_posts_custom_column', array( $this, 'display_item_columns' ), 10, 2 );
		add_action( 'request', array( $this, 'reorder_items' ), 100 );
	}

	/**
	 * Redirect users to settings on activation.
	 *
	 * @return void
	 */
	public function maybe_redirect_to_settings() {

		$redirected = get_option( 'getpaid_redirected_to_inventory_settings' );

		if ( ! empty( $redirected ) || is_network_admin() || isset( $_GET['activate-multi'] ) || wp_doing_ajax() || ! current_user_can( 'manage_options' ) ) {
			return;
		}

		update_option( 'getpaid_redirected_to_inventory_settings', 1 );

		wp_safe_redirect( admin_url( 'admin.php?page=wpinv-settings&tab=inventory' ) );
		exit;

	}

	/**
	 * Registers our settings tab.
	 *
	 * @param array $tabs
	 * @return array
	 */
	public function register_settings_tab( $tabs ) {
		$tabs['inventory'] = __( 'Inventory', 'getpaid-item-inventory' );
		return $tabs;
	}

	/**
	 * Registers our settings sections.
	 *
	 * @param array $sections
	 * @return array
	 */
	public function register_settings_section( $sections ) {

		$sections['inventory'] = apply_filters(
			'getpaid_item_inventory_setting_sections',
			array( 'main' => __( 'Inventory Settings', 'getpaid-item-inventory' ) )
		);

		return $sections;

	}

	/**
	 * Init our settings.
	 *
	 * @param array $settings
	 * @return array
	 */
	public function register_settings( $settings ) {

		$settings['inventory']         = isset( $settings['inventory'] ) ? $settings['inventory'] : array();
		$settings['inventory']['main'] = apply_filters(
			'getpaid_item_inventory_settings',
			array(

				'getpaid_item_inventory_options' =>array(
					'name'  => '<h3>' . __( 'Inventory Settings', 'getpaid-item-inventory' ) . '</h3>',
					'type'  => 'header',
					'desc'  => '',
					'id'    => 'getpaid_item_inventory_options',
				),

				'manage_stock' => array(
					'name'     => __( 'Manage stock', 'getpaid-item-inventory' ),
					'desc'     => __( 'Enable stock management', 'getpaid-item-inventory' ),
					'id'       => 'manage_stock',
					'std'      => 1,
					'type'     => 'checkbox',
				),

				'allow_backorders' => array(
					'name'         => __( 'Backorders', 'getpaid-item-inventory' ),
					'desc'         => __( 'Allow backorders on out of stock items.', 'getpaid-item-inventory' ),
					'id'           => 'allow_backorders',
					'std'          => 0,
					'type'         => 'checkbox',
				),

				'notify_low_stock'  => array(
					'name'          => __( 'Low Stock', 'getpaid-item-inventory' ),
					'desc'          => __( 'Enable low stock notifications', 'getpaid-item-inventory' ),
					'id'            => 'notify_low_stock',
					'std'           => 1,
					'type'          => 'checkbox',
				),

				'notify_no_stock'   => array(
					'name'          => __( 'Out of Stock', 'getpaid-item-inventory' ),
					'desc'          => __( 'Enable out of stock notifications', 'getpaid-item-inventory' ),
					'id'            => 'notify_no_stock',
					'std'           => 1,
					'type'          => 'checkbox',
				),

				'stock_details_button'   => array(
					'name'          => __( 'Show on Buttons', 'getpaid-item-inventory' ),
					'desc'          => __( 'Show stock information on buy buttons', 'getpaid-item-inventory' ),
					'id'            => 'stock_details_button',
					'std'           => 0,
					'type'          => 'checkbox',
				),

				'stock_email_recipient' => array(
					'name'          => __( 'Notification recipient(s)', 'getpaid-item-inventory' ),
					'desc'          => __( 'Enter recipients (comma separated) that will receive stock notifications.', 'getpaid-item-inventory' ),
					'id'            => 'stock_email_recipient',
					'type'          => 'text',
					'std'           => wpinv_get_admin_email(),
					'help-tip'      => true,
				),

				'backorder_threshold' => array(
					'name'              => __( 'Backorder threshold', 'getpaid-item-inventory' ),
					'desc'              => __( 'Maximum number of backorders allowed.', 'getpaid-item-inventory' ),
					'id'                => 'backorder_threshold',
					'type'              => 'number',
					'placeholder'       => 'unlimited',
					'std'               => '',
					'help-tip'          => true,
				),

				'low_threshold' => array(
					'name'              => __( 'Low stock threshold', 'getpaid-item-inventory' ),
					'desc'              => __( 'When item stock reaches this amount you will be notified via email.', 'getpaid-item-inventory' ),
					'id'                => 'low_threshold',
					'type'              => 'number',
					'std'               => '5',
					'help-tip'          => true,
				),

				'no_threshold' => array(
					'name'              => __( 'Out of stock threshold', 'getpaid-item-inventory' ),
					'desc'              => __( 'When item stock reaches this amount the stock status will change to "out of stock" and you will be notified via email.', 'getpaid-item-inventory' ),
					'id'                => 'no_threshold',
					'type'              => 'number',
					'std'               => '0',
					'help-tip'          => true,
				),

				'hold_stock_minutes' => array(
					'name'              => __( 'Hold stock (minutes)', 'getpaid-item-inventory' ),
					'desc'              => __( 'Hold stock (for unpaid invoices) for x minutes. When this time limit is reached, the pending invoice will be cancelled and the stock released. Leave blank to disable.', 'getpaid-item-inventory' ),
					'id'                => 'hold_stock_minutes',
					'type'              => 'number',
					'std'               => 24 * MINUTE_IN_SECONDS,
					'help-tip'          => true,
					'placeholder'       => __( 'Do not hold stock', 'getpaid-item-inventory' ),
				),

				'stock_format' => array(
					'name'     => __( 'Stock display format', 'getpaid-item-inventory' ),
					'desc'     => __( 'This controls how stock quantities are displayed on the frontend.', 'getpaid-item-inventory' ),
					'id'       => 'stock_format',
					'class'    => 'regular-text',
					'std'      => 'no_amount',
					'type'     => 'select',
					'options'  => array(
						''           => __( 'Always show quantity remaining in stock e.g. "12 in stock"', 'getpaid-item-inventory' ),
						'low_amount' => __( 'Only show quantity remaining in stock when low e.g. "Only 2 left in stock"', 'getpaid-item-inventory' ),
						'no_amount'  => __( 'Never show quantity remaining in stock', 'getpaid-item-inventory' ),
						'no_stock'   => __( 'Never show stock information if in stock', 'getpaid-item-inventory' ),
					),
					'help-tip' => true,
				),

			)
		);
		return $settings;

	}


	/**
	 * Displays the stock quantity input.
	 *
	 * @param WP_Post $post
	 */
	public function stock_quantity_input( $post ) {

		if ( ! GetPaid_Item_Inventory::is_enabled() ) {
			return;
		}

		$quantity = get_post_meta( $post->ID, '_stock', true );

		if ( false === $quantity || '' === $quantity ) {
			$quantity = '';
		} else {
			$quantity = (int) $quantity;
		}

		?>

		<div class="form-group mb-3 row form-row">

			<label for="getpaid_item_inventory_available_stock" class="col-sm-3 col-form-label">
				<?php esc_html_e( 'Available Stock', 'getpaid-item-inventory' );?>
			</label>

			<div class="col-sm-8">
				<input type="number" name="_stock" id="getpaid_item_inventory_available_stock" value="<?php echo esc_attr( $quantity ); ?>" placeholder="<?php esc_attr_e( 'Disable Stock Management', 'getpaid-item-inventory' ); ?>" class="w-100">
			</div>

			<div class="col-sm-1 pt-2 pl-0">
                <span class="wpi-help-tip dashicons dashicons-editor-help" title="<?php esc_attr_e( 'Leave blank to disable stock management.', 'getpaid-item-inventory' ); ?>"></span>
            </div>

		</div>

		<?php

	}

	/**
	 * Save meta box data.
	 *
	 * @param int $post_id
	 */
	public static function save_metabox( $post_id ) {

		if ( isset( $_POST['_stock'] ) && '' !== trim( $_POST['_stock'] ) ) {
			update_post_meta( $post_id, '_stock', (int) $_POST['_stock'] );
		} else {
			delete_post_meta( $post_id, '_stock' );
		}

	}

	/**
	 * Filters item columns
	 *
	 * @param array $columns
	 */
	public function filter_item_columns( $columns ) {

		$filtered = array();
		foreach ( $columns as $key => $label ) {
			
			$filtered[ $key ] = $label;

			if ( $key == 'price' ) {
				$filtered['stock'] = __( 'Stock', 'getpaid-item-inventory' );
			}

		}

		return $filtered;
	}

	/**
	 * Filters item sortable columns
	 *
	 * @param array $columns
	 */
	public function sortable_item_columns( $columns ) {
		$columns['stock'] = 'stock';
		return $columns;
	}

	/**
	 * Displays item columns.
	 *
	 * @param string $column_name
	 * @param int $post_id
	 */
	public function display_item_columns( $column_name, $post_id ) {

		if ( 'stock' === $column_name ) {

			if ( $GLOBALS['getpaid_item_inventory']->inventory->manage_stock( $post_id ) ) {
				echo (int) $GLOBALS['getpaid_item_inventory']->inventory->available_stock( $post_id );
			} else {
				echo "&mdash;";
			}

		}

	}

	/*
	* Reorders items.
	*/
   public function reorder_items( $vars ) {
	   global $typenow;

	   if ( 'wpi_item' !== $typenow || empty( $vars['orderby'] ) ) {
		   return $vars;
	   }

	   // By stock.
	   if ( 'stock' == $vars['orderby'] ) {
		   return array_merge(
			   $vars,
			   array(
				   'meta_key' => '_stock',
				   'orderby'  => 'meta_value_num'
			   )
		   );
	   }

	   return $vars;

   }

}

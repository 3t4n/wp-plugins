<?php
/**
 * Class Ssgsw_Log_List
 *
 * A custom class that extends WP_List_Table to display log entries with product information, including current, previous, and earlier logs.
 * This class manages the display and sorting of product logs in the WordPress admin panel.
 *
 * @package Stock Sync with Google Sheet for WooCommerce
 * @version 1.0.0
 */
if ( ! defined('ABSPATH') ) {
	exit;
}
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

if ( ! class_exists( 'Ssgsw_Log_List' ) ) {
	/**
	 * Class Ssgsw_Log_List
	 *
	 * A custom class that extends WP_List_Table to display log entries with product information, including current, previous, and earlier logs.
	 * This class manages the display and sorting of product logs in the WordPress admin panel.
	 *
	 * @package Stock Sync with Google Sheet for WooCommerce
	 * @version 1.0.0
	 */
	class Ssgsw_Log_List extends WP_List_Table {
		/**
		 * Constructor for the Ssgsw_Log_List class.
		 *
		 * Initializes the WP_List_Table with settings for singular/plural terms and enables AJAX support.
		 *
		 * @return void
		 */
		public function __construct() {
			parent::__construct( [
				'singular' => 'contact',
				'plural'   => 'contacts',
				'ajax'     => true,
			] );
		}
		/**
		 * use for temp
		 *
		 * @var array
		 * @version 1.0.0
		 */
		public $_items;
		/**
		 * Set the vendor log data.
		 *
		 * This method sets the data to be displayed in the table.
		 *
		 * @param array $data The log data to be displayed in the table.
		 *
		 * @return void
		 */
		public function set_data( $data ) {
			 $this->_items = $data;
		}
		/**
		 * Define the columns to be displayed in the table.
		 *
		 * This method sets the table columns such as product ID, product name, current log, previous log, and earlier log.
		 *
		 * @return array The columns to be displayed.
		 */
		public function get_columns() {
			return [
				'cb'           => '<input type="checkbox" class="ssgsw_log_list_check" />',
				'product_id'   => __('Product ID','stock-sync-with-google-sheet-for-woocommerce'),
				'product_name' => __('Product Name','stock-sync-with-google-sheet-for-woocommerce'),
				'current_log' => __('Current Log','stock-sync-with-google-sheet-for-woocommerce'),
				'previous_log' => __('Previous Log','stock-sync-with-google-sheet-for-woocommerce'),
				'earlier_log'  => __('Earlier Log','stock-sync-with-google-sheet-for-woocommerce'),
				'date'        => __('Updated Date','stock-sync-with-google-sheet-for-woocommerce'),
			];
		}
		/**
		 * Generate the checkbox column for selecting table rows.
		 *
		 * This method overrides the default WP_List_Table method to display checkboxes in the first column.
		 *
		 * @param array $item The row item data.
		 *
		 * @return string The HTML for the checkbox input.
		 */
		public function column_cb( $item ) {
			return "<input type='checkbox' class='ssgsw_log_list_check' value='{$item['id']}' />";
		}
		/**
		 * Format the 'previous_log' column for display.
		 *
		 * This method processes and formats the 'previous_log' column data for output in the table.
		 *
		 * @param array $item The row item data.
		 *
		 * @return string The formatted log data for the previous log.
		 */
		public function column_previous_log( $item ) {
			return $this->format_recursive_log( $item['previous_log'] );
		}
		/**
		 * Format the 'earlier_log' column for display.
		 *
		 * This method processes and formats the 'earlier_log' column data for output in the table.
		 *
		 * @param array $item The row item data.
		 *
		 * @return string The formatted log data for the earlier log.
		 */
		public function column_earlier_log( $item ) {
			return $this->format_recursive_log( $item['earlier_log'] );
		}
		/**
		 * Format the 'current_log' column for display.
		 *
		 * This method processes and formats the 'current_log' column data for output in the table.
		 *
		 * @param array $item The row item data.
		 *
		 * @return string The formatted log data for the current log.
		 */
		public function column_current_log( $item ) {
			return $this->format_recursive_log( $item['current_log'] );
		}
		/**
		 * Format the recursive log data into a readable string.
		 *
		 * This method takes an array or string log data and formats it into a human-readable string, excluding the 'index_number' key.
		 *
		 * @param mixed $data The log data to be formatted.
		 *
		 * @return string The formatted log data.
		 */
		private function format_recursive_log( $data ) {
			if ( ! is_array($data) ) {
				return is_null($data) ? '' : htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
			}

			$output = '';
			foreach ( $data as $key => $value ) {
				if ( 'index_number' !== $key ) {
					if ( is_array($value) || is_null($value) ) {
						$value = '';
					}
					$output .= '<strong>' . ucfirst(htmlspecialchars($key, ENT_QUOTES, 'UTF-8')) . ':</strong> ' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . ', ';
				}
			}

			return $output;
		}
		/**
		 * Define the sortable columns for the table.
		 *
		 * This method returns the columns that are sortable by the user, such as 'product_id'.
		 *
		 * @return array The sortable columns.
		 */
		public function get_sortable_columns() {
			return [
				'product_id' => [ 'product_id', true ],
			];
		}
		/**
		 * Prepare the table items and pagination.
		 *
		 * This method prepares the table for display by setting the items, columns, sorting, and pagination.
		 *
		 * @return void
		 */
		public function prepare_items() {
			global $wpdb;

			$search_term = isset( $_REQUEST['s'] ) ? sanitize_text_field( wp_unslash($_REQUEST['s']) ) : '';
			$where        = '';
			if ( ! empty( $search_term ) ) {
				$like = '%' . $wpdb->esc_like( $search_term ) . '%';
				$where = $wpdb->prepare( 'WHERE product_id LIKE %s', $like );
			}
			$total_items = $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}ssgsw_products {$where}" );
			$per_page              = get_option( 'ssgsw_per_page', 20 );
			$this->items = $this->_items;
			$this->_column_headers = array( $this->get_columns(), array(), $this->get_sortable_columns() );
			$this->set_pagination_args([
				'total_items'   => $total_items,
				'per_page'      => $per_page,
				'total_pages'   => ceil($total_items / $per_page),
			]);
		}
		/**
		 * Set the default column content.
		 *
		 * This method handles the display of the default column data when no specific column method is defined.
		 *
		 * @param array  $item        The row item data.
		 * @param string $column_name The column name.
		 *
		 * @return mixed The column content.
		 */
		public function column_default( $item, $column_name ) {
			return $item[ $column_name ];
		}
	}


}

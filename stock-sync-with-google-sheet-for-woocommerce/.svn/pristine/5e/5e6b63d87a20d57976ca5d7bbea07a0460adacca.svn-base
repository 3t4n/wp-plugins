<?php
/**
 * Action Request Class
 */
if ( ! defined('ABSPATH') ) {
	exit;
}
if ( ! class_exists('SSGSW_Logs') ) {
	/**
	 * Class SSGSW_Logs
	 *
	 * Handles the logging functionality for the SSGSW system.
	 */
	class SSGSW_Logs {
		/**
		 * Constructor for the SSGSW_Logs class.
		 *
		 * Initializes the logging process by calling the log_list method.
		 */
		public function __construct() {
			$this->log_list();
		}
		/**
		 * Formats the array data for logging.
		 *
		 * @param array $data The raw data to be formatted.
		 *
		 * @return array The formatted product information with current, previous, and earlier logs.
		 */
		public function format_array_data( $data ) {
			$products_info = [];
			$i = 0;
			if ( is_array($data) && ! empty($data) ) {
				foreach ( $data as $key => $products ) {

					$products_info[ $i ]['id'] = isset($products['id']) ? $products['id'] : '';
					$products_info[ $i ]['product_id'] = $products['product_id'];

					$products_info[ $i ]['product_name'] = get_the_title($products['product_id']);
					$product_information = isset($products['product_current_info']) ? $products['product_current_info'] : '';
					if ( is_serialized($product_information) ) {
						$product_information = unserialize($product_information);
						$current_tag = $products['current_tag'];
						$product_information = [ 'reference' => $current_tag ] + $product_information;
					}
					$products_info[ $i ]['current_log'] = $product_information;

					$product_info_previous = $products['product_info_previous'];
					if ( is_serialized($product_info_previous) ) {
						$product_info_previous = unserialize($product_info_previous);
						$previous_tag = $products['previous_tag'];
						$product_info_previous = [ 'reference' => $previous_tag ] + $product_info_previous;
					}
					$products_info[ $i ]['previous_log'] = $product_info_previous;

					$product_info_previous_2 = $products['product_info_previous_2'];
					if ( is_serialized($product_info_previous_2) ) {
						$product_info_previous_2 = unserialize($product_info_previous_2);
						$previous_tag_2 = $products['previous_tag_2'];
						$product_info_previous_2 = [ 'reference' => $previous_tag_2 ] + $product_info_previous_2;
					}
					$products_info[ $i ]['earlier_log'] = $product_info_previous_2;
					$products_info[ $i ]['date'] = $products['date'];

					$i++;

				}
			}
			return $products_info;
		}
		/**
		 * Fetches and displays the log list with pagination and search functionality.
		 *
		 * @return void
		 */
		public function log_list() {
			global $wpdb;
			$table   = new Ssgsw_Log_List();
			$paged = isset( $_REQUEST['paged'] ) ? intval( sanitize_text_field( wp_unslash( $_REQUEST['paged'] ) ) ) : 1;
			$per_page    = get_option( 'ssgsw_per_page', 20 );
			$offset      = ( $paged - 1 ) * $per_page;

			$search_term = isset( $_REQUEST['s'] ) ? sanitize_text_field( wp_unslash($_REQUEST['s']) ) : '';
			$where        = '';
			if ( ! empty( $search_term ) ) {
				$like = '%' . $wpdb->esc_like( $search_term ) . '%';
				$where = $wpdb->prepare( 'WHERE product_id LIKE %s', $like );
			}
			$query = "SELECT * FROM {$wpdb->prefix}ssgsw_products {$where}";
			$orderby = ! empty( $_GET['orderby'] ) ? sanitize_text_field( wp_unslash($_GET['orderby']) ) : 'product_id';

			$order    = ! empty( $_GET['order'] ) ? sanitize_text_field( wp_unslash($_GET['order']) ) : 'ASC';
			$query    .= " ORDER BY {$orderby} {$order}";
			$query .= $wpdb->prepare( ' LIMIT %d, %d', $offset, $per_page );

			$data = $wpdb->get_results( $query, ARRAY_A ); //phpcs:ignore

			$format_data = $this->format_array_data($data);

			$table->set_data($format_data);

			$table->prepare_items();
			$this->_form_table($table);
		}
		/**
		 * Displays the vendor list table form with search and pagination.
		 *
		 * @param object $table The table object containing the log data to be displayed.
		 *
		 * @return void
		 */
		public function _form_table( $table ) {
			?>
				<div class="wrap">
					<div class="ssgsw_wrap_list"></div>
					<div class="ssgsw_main_layout">
						<div class="ssgsw_heading_numbers"><h1><?php esc_html_e('All Logs','stock-sync-with-google-sheet-for-woocommerce'); ?></h1></div>
							<div class='ssgsw_list_numbers'>
								<form method='GET' action="">                           
									<?php
										$paged = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );
										printf( '<input type="hidden" name="paged" value="%d" />', esc_attr($paged) );
										$table->search_box('Search ID','search_id_ssgsw');
										$table->display();
										wp_nonce_field('ssgsw_list_nonce','ssgsw_list_nonce');
										$search_page = isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash($_REQUEST['page']) ) : '';
									?>

									<input type="hidden" name="page" value="<?php echo esc_attr( $search_page ); ?>">
								</form>
						</div>
					</div>
				</div>
			<?php
		}
	}
	new SSGSW_Logs();
}

<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class OPBW_Preview extends WP_List_Table {

	public function __construct() {
		parent::__construct(
			array(
				'singular' => 'Product',
				'plural'   => 'Products',
				'ajax'     => true,
			)
		);
	}

    public function get_columns() {
		$columns = array(
			'checkbox'   => 'Select',
			'thumb'      => '<span class="wc-image">Image</span>',
			'title'      => 'Title',
			'properties' => 'Properties',
			'stock'      => 'Stock',
			'price'      => 'Price',
			'published'  => 'Published',
		);
		return $columns;
	}

	private static function set_products_data($product_data, $product_id) {
		global $woocommerce;
		$placeholder  = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
		$product = wc_get_product($product_id);
		$temp_type  = $product->get_type();
		$temp_title = $product->get_name();
		$temp_dim   = '-';
		if ( $product->get_dimensions( false ) != '' ) {
			$temp_dim = wc_format_dimensions( $product->get_dimensions( false ) );
		}
		$get_category = '';
		if ( 'variation' == $temp_type ) {
			$get_category = $product->get_parent_id();
		} else {
			$get_category = $product_id;
		}
		$parent_id = $product_id;

		if ( 'simple' == $temp_type  || 'variable' == $temp_type  || 'variation' == $temp_type ) {
			$meta_thumb                              = $product->get_meta( '_thumbnail_id' );
			$i                                       = $product_id;
			$product_data[ $i ]['product_id']        = $product_id;
			$product_data[ $i ]['parent_id']         = $parent_id;
			$product_data[ $i ]['product_title']     = $temp_title;
			$product_data[ $i ]['product_date']      = get_the_date( '', $product_id );
			$product_data[ $i ]['product_type']      = ucfirst( $temp_type );
			$product_data[ $i ]['product_type_meta'] = ( $product->is_downloadable() != null ) ? 'Downloadable' : ( ( $product->is_virtual() != null ) ? 'Virtual' : 'Item' );
			$product_data[ $i ]['product_thumb']     = ( 0 != $meta_thumb ) ? wp_get_attachment_thumb_url( $meta_thumb ) : $placeholder;
			$product_data[ $i ]['product_sku']       = ( $product->get_sku() != null ) ? $product->get_sku() : '-';
			$product_data[ $i ]['product_category']  = wc_get_product_category_list( $get_category );
			$product_data[ $i ]['product_stock_status']   = ( $product->get_stock_status() == 'instock' ) ? 'In Stock ' : ( $product->get_stock_status() == 'onbackorder' ? 'On Backorder' : 'Out of Stock' );
			$product_data[ $i ]['product_stock_quantity'] = ( $product->get_stock_quantity() != null ) ? $product->get_stock_quantity() : ' - ';
			$product_data[ $i ]['product_dimensions']     = $temp_dim;
			$product_data[ $i ]['product_weight']         = ( $product->get_weight() != null ) ? $product->get_weight() : '-';
			$product_data[ $i ]['product_attributes'] = '';
			
			$att = $product->get_attributes();
			if ( null != $att ) {
				foreach ( $att as $key => $value ) {
					$attrib_slug                              = ! empty( $value['name'] ) ? $value['name'] : '';
					$product_data[ $i ]['product_attributes'] = ( null == $product_data[ $i ]['product_attributes'] ) ? wc_attribute_label( $attrib_slug, $product ) : $product_data[ $i ]['product_attributes'] . ' , ' . wc_attribute_label( $attrib_slug, $product );
				}
			} else {
				$product_data[ $i ]['product_attributes'] = '-';
			}
			$product_data[ $i ]['product_sale']    = wc_price($product->get_sale_price());
			$product_data[ $i ]['product_regular'] = wc_price($product->get_regular_price());
		}

		return $product_data;
	}

    public function set_items($ids) {
		
		$product_data = array();
		if ( ! empty( $ids ) ) {
			foreach ( $ids as $product_id) {
                $product_data = self::set_products_data($product_data, $product_id);
			}
		}
		$this->items = $product_data;
	}

    /** Function to add checkbox for products and handle their state.
	 *
	 * @param any $item item.
	 */
	public function column_checkbox( $item ) {
		return sprintf( "<input type='checkbox' class='opbw-bulk-checkbox' name='column-checkbox' id={$item['product_id']} checked=checked/>" );
	}


	public function column_title( $item ) {
		// Build row actions
		// Return the title contents
		if ( 'Variable' == $item['product_type'] ) {
			$meta = 'Parent';
		} else {
			$meta = $item['product_type_meta'];
		}
		$item['product_title']    = preg_replace( '/%/', '%%', $item['product_title'] );
		$item['product_category'] = preg_replace( '/%/', '%%', $item['product_category'] );
		$item['product_category'] = preg_replace( '/<a/', '<a target="_blank"', $item['product_category'] );
		$item['product_id']       = '<a target="_blank" href="' . home_url() . '/wp-admin/post.php?post=' . $item['parent_id'] . '&action=edit" rel="tag">' . $item['product_id'] . '</a>';
		return sprintf( $item['product_title'] . '<span style="color:black"> (Id : ' . $item['product_id'] . ') </span> <br> <span id="category" >' . $item['product_category'] . '</span> <br><span id="type" class="table-type-text">Type :</span> ' . $item['product_type'] . ' (' . $meta . ') ' );
	}

	public function column_thumb( $item ) {

		$thumbnail_id = get_post_thumbnail_id($item['product_id']);
		if (!$thumbnail_id || empty($thumbnail_id)) {
			return '';
		}
		
		return wp_get_attachment_image($thumbnail_id);
	}

	public function column_stock( $item ) {
		$item['product_sku'] = preg_replace( '/%/', '%%', $item['product_sku'] );
		return sprintf( '<span id="sku" class="table-type-text" >SKU : </span>' . $item['product_sku'] . '<br><span id="stock_status" class="table-type-text">Status :</span> ' . $item['product_stock_status'] . '<br><span id="stock_quantity" class="table-type-text">Quantity : </span>' . $item['product_stock_quantity'] );
	}

	public function column_price( $item ) {

		return sprintf( '<span id="sale_price" class="table-type-text">Sale :</span> ' . $item['product_sale'] . '<br><span id="regular_price" class="table-type-text">Regular : </span>' . $item['product_regular'] );
	}

	public function column_properties( $item ) {
		$item['product_attributes'] = preg_replace( '/%/', '%%', $item['product_attributes'] );
		return sprintf( '<span id="atribute" class="table-type-text">Attributes : </span>' . $item['product_attributes'] . '<br><span id="dimension" class="table-type-text">Dimension :</span> ' . $item['product_dimensions'] . '<br><span id="weight" class="table-type-text">Weight : </span>' . $item['product_weight'] );
	}

	public function column_published( $item ) {

		return sprintf( '<span id="dimension" class="table-content-td">' . $item['product_date'] . '</span>' );
	}

	public function get_sortable_columns() {
		$sortable_columns = array();
		return $sortable_columns;
	}

	public function get_bulk_actions() {
		$actions = array();
		return $actions;
	}

	public function process_bulk_action() {

		// Detect when a bulk action is being triggered...
		if ( 'delete' === $this->current_action() ) {
			// Verify the nonce to protect against CSRF
			if ( !isset( $_POST['_ajax_eh_bep_nonce'] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_ajax_eh_bep_nonce'] ) ) , 'bulk_action_nonce' ) ) {
				wp_die( 'Security check failed!' );
			}
			wp_die( 'Items deleted (or they would be if we had items to delete)!' );
		}
	}

	public function prepare_items( $page_num = '', $prepare = '', $page_count = '' ) {
		$per_page              = ( '' == $page_count ) ? ( ( get_option( 'eh_bulk_edit_table_row' ) ) ? get_option( 'eh_bulk_edit_table_row' ) : 20 ) : $page_count;
		$columns               = $this->get_columns();
		$hidden                = array();
		$sortable              = $this->get_sortable_columns();
		$this->_column_headers = array(
			$columns,
			$hidden,
			$sortable,
		);
		$this->process_bulk_action();
		$this->input();
	}

	public function display() {
		parent::display();
	}

	public function ajax_response( $page_num = '' ) {

		$this->prepare_items( $page_num );

		extract( $this->_args );
		extract( $this->_pagination_args, EXTR_SKIP );

		ob_start();
		if ( ! empty( $_REQUEST['no_placeholder'] ) ) {
			$this->display_rows();
		} else {
			$this->display_rows_or_placeholder();
		}
		$rows = ob_get_clean();

		ob_start();
		$this->print_column_headers();
		$headers = ob_get_clean();

		ob_start();
		$this->pagination( 'top' );
		$pagination_top = ob_get_clean();

		ob_start();
		$this->pagination( 'bottom' );
		$pagination_bottom = ob_get_clean();

		$response                         = array(
			'rows' => $rows,
		);
		$response['pagination']['top']    = $pagination_top;
		$response['pagination']['bottom'] = $pagination_bottom;
		$response['column_headers']       = $headers;

		if ( isset( $total_items ) ) {
			/* translators: %s:  print total items */
			$response['total_items_i18n'] = sprintf( _n( '%s item', '%s items', $total_items , 'opal-bulkedit-for-woocommerce'), number_format_i18n( $total_items ) );
		}
		$response['total_items_count'] = $total_items;

		if ( isset( $total_pages ) ) {
			$response['total_pages']      = $total_pages;
			$response['total_pages_i18n'] = number_format_i18n( $total_pages );
		}
		 $is_regex_error = get_option( 'xa_regex_error' );
		if ( $is_regex_error ) {
			$response['regex_error'] = true;
			delete_option( 'xa_regex_error' );
		}
		die( wp_json_encode( $response ) );
	}
}
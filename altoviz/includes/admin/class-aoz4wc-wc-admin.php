<?php
namespace Altoviz;

use Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController;

defined( 'ABSPATH' ) || exit;

class AOZ4WC_WC_Admin {

	public function __construct() {
		add_filter( 'user_row_actions', array( $this, 'user_row_actions' ), 10, 2 );
		add_filter( 'post_row_actions', array( $this, 'post_row_actions' ), 10, 2 );
		// add_action("admin_action_aoz-update-product", [$this, "admin_action_AOZ4WC_update"]);
		add_action( 'woocommerce_order_actions', array( $this, 'woocommerce_order_actions' ), 10, 2 );
		add_action( 'woocommerce_order_action_aoz-update', array( $this, 'woocommerce_order_action_AOZ4WC_update' ) );
		add_action( 'woocommerce_order_action_aoz-send', array( $this, 'woocommerce_order_action_AOZ4WC_send' ) );
		add_action( 'admin_action_aoz-update', array( $this, 'admin_action_AOZ4WC_update' ) );
		add_action( 'admin_action_aoz-update-user', array( $this, 'admin_action_AOZ4WC_update_user' ) );
		add_filter( 'bulk_actions-users', array( $this, 'bulk_actions_users' ) );
		add_filter( 'bulk_actions-edit-product', array( $this, 'bulk_actions_edit_post' ) );
		add_filter( 'bulk_actions-edit-post', array( $this, 'bulk_actions_edit_post' ) );
		add_filter( 'bulk_actions-edit-shop_order', array( $this, 'bulk_actions_edit_post' ) );
		add_filter( 'bulk_actions-woocommerce_page_wc-orders', array( $this, 'bulk_actions_edit_post' ) );
		add_filter( 'handle_bulk_actions-users', array( $this, 'handle_bulk_actions_users' ), 10, 3 );
		add_filter( 'handle_bulk_actions-edit-product', array( $this, 'handle_bulk_actions_edit_post' ), 10, 3 );
		add_filter( 'handle_bulk_actions-edit-shop_order', array( $this, 'handle_bulk_actions_edit_post' ), 10, 3 );
		add_filter( 'handle_bulk_actions-woocommerce_page_wc-orders', array( $this, 'handle_bulk_actions_edit_post' ), 10, 3 );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 10, 1 );
		add_filter( 'manage_edit-product_columns', array( $this, 'manage_edit_product_columns' ) );
		add_filter( 'manage_edit-shop_order_columns', array( $this, 'manage_edit_shop_order_columns' ) );
		add_action( 'manage_product_posts_custom_column', array( $this, 'manage_product_posts_custom_column' ) );
		add_filter( 'manage_woocommerce_page_wc-orders_columns', array( $this, 'manage_edit_shop_order_columns' ) );
		add_action( 'manage_shop_order_posts_custom_column', array( $this, 'manage_shop_order_posts_custom_column' ) );
		add_action( 'manage_woocommerce_page_wc-orders_custom_column', array( $this, 'manage_woocommerce_page_wc_orders_custom_column' ), 20, 2 );
		add_filter( 'manage_users_columns', array( $this, 'manage_users_columns' ) );
		add_filter( 'manage_users_custom_column', array( $this, 'manage_users_custom_column' ), 20, 3 );
	}
	public function manage_users_columns( $columns ) {
		$columns['aoz4wc_customer_id'] = __( 'Customer 🚀', 'altoviz' );
		return $columns;
	}
	public function manage_users_custom_column( $output, $column_name, $user_id ) {
		$user = get_userdata( $user_id );
		if ( 'aoz4wc_customer_id' === $column_name ) {
			return wp_kses_data( $this->customer_anchor_user( $user ) );
		}
		return $output;
	}
	public function manage_edit_product_columns( $columns ) {
		$columns['aoz4wc_product_id'] = __( 'Product 🚀', 'altoviz' );
		return $columns;
	}
	public function manage_product_posts_custom_column( $column ) {
		global $post;
		if ( 'aoz4wc_product_id' === $column ) {
			echo wp_kses_data( $this->product_anchor( wc_get_product( $post->ID ) ) );
		}
	}
	public function manage_edit_shop_order_columns( $columns ) {
		$columns['aoz4wc_invoice_id'] = __( 'Invoice 🚀', 'altoviz' );
		return $columns;
	}
	public function manage_shop_order_posts_custom_column( $column ) {
		global $the_order;
		$this->manage_woocommerce_page_wc_orders_custom_column( $column, $the_order );
	}
	public function manage_woocommerce_page_wc_orders_custom_column( $column, $order ) {
		if ( 'aoz4wc_invoice_id' === $column ) {
			echo wp_kses_data( $this->invoice_anchor( $order, 'aoz-invoice' ) );
		}
	}
	public function get_settings_url() {
		return add_query_arg(
			array(
				'page' => 'wc-settings',
				'tab'  => 'altoviz',
			),
			admin_url( 'admin.php' )
		);
	}
	public function get_logs_url() {
		return add_query_arg(
			array(
				'page'   => 'wc-status',
				'tab'    => 'logs',
				'source' => 'altoviz',
			),
			admin_url( 'admin.php' )
		);
	}
	public function user_row_actions( $actions, $user ) {
		$nonce                      = wp_create_nonce( 'aoz-nonce' );
		$link                       = wp_nonce_url(
			add_query_arg(
				array(
					'action'  => 'aoz-update-user',
					'user_id' => $user->ID,
				),
				'users.php'
			),
			'aoz-nonce',
			'_wpnonce'
		);
		$actions['aoz-update-user'] = '<a href="' . $link . '" title="' . __( 'Update customer in the Altoviz app', 'altoviz' ) . '">' . __( 'Update Altoviz 🚀 customer', 'altoviz' ) . '</a>';
		return $actions;
	}
	public function post_row_actions( $actions, $post ) {
		$link = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'aoz-update',
					'post'   => $post->ID,
				),
				'admin.php'
			),
			'aoz-nonce',
			'_wpnonce'
		);
		$type = $post->post_type;
		switch ( $type ) {
			case 'product':
				$actions['aoz-update'] = '<a href="' . $link . '" title="' . __( 'Update product in the Altoviz app', 'altoviz' ) . '">' . __( 'Update Altoviz 🚀 product', 'altoviz' ) . '</a>';
				break;
			case 'shop_order':
				$actions['aoz-update'] = '<a href="' . $link . '" title="' . __( 'Update invoice in the Altoviz app', 'altoviz' ) . '">' . __( 'Update Altoviz 🚀 invoice', 'altoviz' ) . '</a>';
				break;
		}
		return $actions;
	}
	public function admin_action_AOZ4WC_update_user() {
		$nonce = sanitize_key( $_REQUEST['_wpnonce'] ?? null );
		if ( ! wp_verify_nonce( $nonce, 'aoz-nonce' ) ) {
			return;
		}
		$action = sanitize_text_field( wp_unslash( $_GET['action'] ?? null ) );
		// AOZ4WC()->sys_log(['action' => $action]);
		if ( 'aoz-update-user' === $action ) {
			$user_id = intval( sanitize_text_field( wp_unslash( $_GET['user_id'] ?? 0 ) ) );
			if ( $user_id > 0 ) {
				if ( AOZ4WC()->wc()->do_sync_customer( $user_id ) ) {
					$this->add_notice_user( 1 );
				}
			}
		}
	}
	public function admin_action_AOZ4WC_update() {
		$nonce = sanitize_key( $_REQUEST['_wpnonce'] ?? null );
		if ( ! wp_verify_nonce( $nonce, 'aoz-nonce' ) ) {
			return;
		}
		$action  = sanitize_text_field( wp_unslash( $_GET['action'] ?? null ) );
		$post_id = sanitize_text_field( wp_unslash( $_GET['post'] ?? 0 ) );
		if ( null === $action || 0 === $post_id ) {
			return;
		}
		$post      = get_post( $post_id );
		$post_type = get_post_type( $post );
		$type      = '';
		switch ( $post_type ) {
			case 'product':
				if ( AOZ4WC()->wc()->do_sync_product( $post_id ) ) {
					$this->add_notice_product( 1 );
				}
				$type = 'products';
				break;
			case 'shop_order':
				if ( AOZ4WC()->wc()->do_sync_order( $post_id ) ) {
					$this->add_notice_order( 1 );
				}
				$type = 'orders';
				break;
			default:
				return;
		}
		wp_safe_redirect( add_query_arg( array( 'post_type' => 'post' !== $post_type ? $post_type : false ), admin_url( 'edit.php' ) ) );
		exit();
	}
	public function add_notice_product( $count ) {
		// translators: %s is the count
		AOZ4WC()->add_notice( sprintf( __( '%s product(s) updated in Altoviz 🚀', 'altoviz' ), $count ) );
	}
	public function add_notice_order( $count ) {
		// translators: %s is the count
		AOZ4WC()->add_notice( sprintf( __( '%s invoice(s) updated in Altoviz 🚀', 'altoviz' ), $count ) );
	}
	public function add_notice_user( $count ) {
		// translators: %s is the count
		AOZ4WC()->add_notice( sprintf( __( '%s customer(s) updated in Altoviz 🚀', 'altoviz' ), $count ) );
	}
	public function bulk_actions_users( $actions ) {
		if ( AOZ4WC()->check_requirements() ) {
			$actions['aoz-update'] = __( 'Update Altoviz 🚀 customers', 'altoviz' );
		}
		return $actions;
	}
	public function bulk_actions_edit_post( $actions ) {
		// AOZ4WC()->sys_log(['screen_id' => get_current_screen()->id]);
		if ( AOZ4WC()->check_requirements() ) {
			$screen_id = get_current_screen()->id;
			switch ( $screen_id ) {
				case 'edit-product':
					$actions['aoz-update'] = __( 'Update Altoviz 🚀 products', 'altoviz' );
					break;
				case 'edit-shop_order':
				case 'woocommerce_page_wc-orders':
					$actions['aoz-update'] = __( 'Update Altoviz 🚀 invoices', 'altoviz' );
					break;
			}
		}
		return $actions;
	}
	public function handle_bulk_actions_users( $sendback, $doaction, $items ) {
		$sendback = remove_query_arg( array( 'action', 'aoz-update', 'aoz-update-user', 'aoz-users-updated' ), $sendback );
		if ( 'aoz-update' === $doaction ) {
			$count = 0;
			foreach ( $items as $item_id ) {
				if ( AOZ4WC()->wc()->sync_customer( $item_id ) ) {
					++$count;
				}
			}
			// $sendback = add_query_arg('aoz-users-updated', count($items), $sendback);
			$this->add_notice_user( $count );
		}
		return $sendback;
	}
	public function handle_bulk_actions_edit_post( $sendback, $action, $items ) {
		$screen_id = get_current_screen()->id;
		// AOZ4WC()->sys_log('screen=' . $screen_id);
		$sendback = remove_query_arg( array( 'action', 'aoz-update', 'aoz-updated' ), $sendback );
		switch ( $screen_id ) {
			case 'edit-product':
				$updated_count = 0;
				foreach ( $items as $item_id ) {
					if ( 'aoz-update' === $action ) {
						if ( AOZ4WC()->wc()->sync_product( $item_id ) ) {
							++$updated_count;
						}
					}
				}
				$this->add_notice_product( $updated_count );
				break;
			case 'edit-shop_order':
			case 'woocommerce_page_wc-orders':
				$updated_count = 0;
				foreach ( $items as $item_id ) {
					if ( 'aoz-update' === $action ) {
						if ( AOZ4WC()->wc()->sync_order( $item_id ) ) {
							++$updated_count;
						}
					}
				}
				$this->add_notice_order( $updated_count );
				break;
		}
		return $sendback;
	}
	public function woocommerce_order_actions( $actions, $order ) {
		if ( AOZ4WC()->check_requirements() && is_a( $order, 'WC_Order' ) ) {
			$actions['aoz-update'] = __( 'Update Altoviz 🚀 invoice', 'altoviz' );
			$invoice_id            = intval( $order->get_meta( 'aoz4wc_invoice_id', true ) );
			if ( $invoice_id ) {
				$actions['aoz-send'] = __( 'Send Altoviz 🚀 invoice', 'altoviz' );
			}
		}
		return $actions;
	}
	public function woocommerce_order_action_AOZ4WC_send( $order ) {
		if ( AOZ4WC()->wc()->send_document( $order ) ) {
			$this->add_notice_order( 1 );
		}
	}
	public function woocommerce_order_action_AOZ4WC_update( $order ) {
		if ( is_a( $order, 'WC_Order' ) ) {
			// $order->update_meta_data('_AOZ4WC_force_update', true, true);
			// $order->save();
			if ( AOZ4WC()->wc()->sync_order_action( $order, true ) ) {
				$this->add_notice_product( 1 );
			}
		}
	}
	public function add_meta_boxes( $post_type ) {
		if (null === $post_type) {
			return;
		}
		$screen_id = get_current_screen()->id;
		// AOZ4WC()->sys_log(['screen_id' => $screen_id, 'post_type' => $post_type]);
		switch ( $screen_id ) {
			case 'product':
				add_meta_box( 'aoz-product-metabox', 'Altoviz 🚀', array( $this, 'render_meta_boxes_product' ), 'product', 'side', 'default' );
				break;
			case 'shop_order':
			case 'woocommerce_page_wc-orders':
				$screen = class_exists( '\Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController' )
				&& wc_get_container()->get( CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled()
				? wc_get_page_screen_id( 'shop-order' )
				: 'shop_order';
				add_meta_box( 'aoz-order-metabox', 'Altoviz 🚀', array( $this, 'render_meta_boxes_order' ), $screen, 'side', 'default' );
				break;
		}
	}
	public function customer_anchor( $customer_id, $customer_number, $id = '' ) {
		$url = AOZ4WC()->app()->get_url();
		if ( $url && $customer_id && $customer_number ) {
			$customer_url = $url . '/sales/customers/' . $customer_id;
			return '<a target="_blank" href="' . esc_attr( $customer_url ) . '" ' . ( empty( $id ) ? '' : 'id="' . $id . '" ' ) . '>' . esc_html( $customer_number ) . '</a>';
		}
		return false;
	}
	public function customer_anchor_user( $user, $id = '' ) {
		$customer_id     = get_user_meta( $user->ID, 'aoz4wc_customer_id', true );
		$customer_number = get_user_meta( $user->ID, 'aoz4wc_customer_number', true );
		return $this->customer_anchor( $customer_id, $customer_number, $id );
	}
	public function invoice_anchor( $order, $id = '', $credit = false ) {
		$invoice_number = AOZ4WC()->wc()->get_AOZ4WC_invoice_number( $order );
		$invoice_id     = AOZ4WC()->wc()->get_AOZ4WC_invoice_id( $order );
		$url            = AOZ4WC()->app()->get_url();
		if ( $url && $invoice_id ) {
			$invoice_url = $url . ( $credit ? '/sales/credits/' : '/sales/invoices/' ) . $invoice_id;
			return '<a target="_blank" href="' . esc_attr( $invoice_url ) . '" ' . ( empty( $id ) ? '' : 'id="' . $id . '" ' ) . '>' . esc_html( $invoice_number ) . '</a>';
		}
		return false;
	}
	public function customer_anchor_order( $order, $id = '' ) {
		$customer_id     = intval( $order->get_meta( 'aoz4wc_customer_id', true ) );
		$customer_number = $order->get_meta( 'aoz4wc_customer_number', true );
		return $this->customer_anchor( $customer_id, $customer_number, $id );
	}
	public function product_anchor( $product, $id = '' ) {
		$product_id     = $product->get_meta( 'aoz4wc_product_id', true );
		$product_number = $product->get_meta( 'aoz4wc_product_number', true );
		$url            = AOZ4WC()->app()->get_url();
		if ( $url && $product_id && $product_number ) {
			$product_url = $url . '/products/' . $product_id;
			return '<a target="_blank" href="' . esc_attr( $product_url ) . '" ' . ( empty( $id ) ? '' : 'id="' . $id . '" ' ) . '>' . esc_html( $product_number ) . '</a>';
		}
		return false;
	}
	public function render_meta_boxes_order( $post ) {
		$order = ( $post instanceof \WP_Post ) ? wc_get_order( $post->ID ) : $post;
		$url   = esc_url( AOZ4WC()->app()->get_url() );
		echo '<p>';
		echo '<label for="aoz-invoice-link">' . esc_html__( 'Invoice: ', 'altoviz' ) . '</label>';
		$link = $this->invoice_anchor( $order, 'aoz-invoice' );
		if ( $link ) {
			echo wp_kses_data( $link );
		} else {
			echo '<i id="aoz-invoice" >--<i/>';
		}
		echo '</p>';
		/*
		$invoice_sent = boolval($order->get_meta('aoz4wc_invoice_sent', true));
		echo '<p>';
		echo '<label for="aoz-invoice-link">' . esc_html__('Invoice sent: ', 'altoviz') . '</label>';
		if ($invoice_sent) {
		echo '<i> id="aoz-invoice-sent" >' . esc_html('✅') . '</i>';
		}
		else {
		echo '<i id="aoz-invoice" >--<i/>';
		}
		echo '</p>';
		*/
		echo '<p>';
		echo '<label for="aoz-customer-link">' . esc_html__( 'Customer: ', 'altoviz' ) . '</label>';
		$link = $this->customer_anchor_order( $order, 'aoz-customer' );
		if ( $link ) {
			echo wp_kses_data( $link );
		} else {
			echo '<i id="aoz-customer-none" >--<i/>';
		}
		echo '</p>';
		$order_refunds = $order->get_refunds();
		if ( count( $order_refunds ) > 0 ) {
			echo '<p>';
			echo '<label for="aoz-invoice-link">' . esc_html__( 'Credit: ', 'altoviz' ) . '</label>';
			$first = true;
			foreach ( $order_refunds as $refund ) {
				$link = $this->invoice_anchor( $refund, 'aoz-invoice', true );
				if ( $link ) {
					if ( ! $first ) {
						echo '&nbsp;/&nbsp;';
					}
					echo wp_kses_data( $link );
				}
				if ( $first ) {
					$first = false;
				}
			}
			echo '</p>';
		}
	}
	public function render_meta_boxes_product( $post ) {
		$product        = ( $post instanceof \WP_Post ) ? wc_get_product( $post->ID ) : $post;
		$url            = AOZ4WC()->app()->get_url();
		$product_number = get_post_meta( $post->ID, 'aoz4wc_product_number', true );
		$product_id     = intval( get_post_meta( $post->ID, 'aoz4wc_product_id', true ) );
		echo '<p>';
		echo '<label for="aoz-product-link">' . esc_html( __('Product: ', 'altoviz' )) . '</label>';
		if ( $url && $product_id ) {
			$product_url = $url . '/products/' . $product_id;
			echo '<a target="_blank" href="' . esc_attr( $product_url ) . '" id="aoz-product-link" >' . esc_html( $product_number ) . '</a>';
		} else {
			echo '<i id="aoz-product-none" >--<i/>';
		}
		/*
		$sku = $product->get_sku('edit');
		if (!$sku) {
			$sku = $product->get_id();
		}
		echo '<i>' . esc_html($sku) . ' | ' . $product->get_sku('edit') . '</i>';
		 */
		echo '</p>';
	}
}

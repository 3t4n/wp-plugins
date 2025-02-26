<?php

if (!function_exists('get_orders_onetime')) {
	function get_orders_onetime($product_id)
	{
		$query = new WC_Order_Query([
			'customer_id' => get_current_user_id(),
			'status'      => ['wc-completed'],
			'limit'       => -1,
			'post__in'    => get_orders_ids_by_product_id($product_id)
		]);

		return $query->get_orders();
	}
}


if (!function_exists('get_orders_ids_by_product_id')) {
	function get_orders_ids_by_product_id($product_id)
	{
		global $wpdb;

		$wp_posts_table                   = $wpdb->posts;
		$woocommerce_order_items_table    = $wpdb->prefix . 'woocommerce_order_items';
		$woocommerce_order_itemmeta_table = $wpdb->prefix . 'woocommerce_order_itemmeta';

		$wpdb_sql     = "
			SELECT order_items.order_id
			FROM {$woocommerce_order_items_table} as order_items
			LEFT JOIN {$woocommerce_order_itemmeta_table} as order_item_meta
				ON order_items.order_item_id = order_item_meta.order_item_id
			LEFT JOIN {$wp_posts_table} AS posts ON order_items.order_id = posts.ID
			WHERE posts.post_type = 'shop_order'
				AND order_items.order_item_type = 'line_item'
				AND order_item_meta.meta_key = '_product_id'
				AND order_item_meta.meta_value = %s
		";
		$wpdb_prepare = $wpdb->prepare($wpdb_sql, $product_id);

		return $wpdb->get_col($wpdb_prepare);
	}
}

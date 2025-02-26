<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://shopitpress.com/
 * @since      1.0.0
 *
 * @package    Sip_Custom_Order_Satus_For_Woocommerce
 * @subpackage Sip_Custom_Order_Satus_For_Woocommerce/admin/partials
 */

function sip_coswc_dashboard_status_widget($reports) {
	global $wpdb;

	$counts = array();
	foreach (wc_get_order_types('order-count') as $type) {
		$_counts = (array)wp_count_posts($type);
		if (empty($counts)) {
			$counts = $_counts;
		} else {
			foreach ($_counts as $key => $value) {
				if (isset($counts[$key])) {
					$counts[$key] += (int)$value;
				} else {
					$counts[$key] = (int)$value;
				}
			}
		}
	}

	$statuses = $wpdb->get_results("SELECT ID, post_name, post_title FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish' ORDER BY menu_order ASC");

	if( $statuses ) {

	    foreach ( $statuses as $row ) {

	    	$custom_statuses = get_post_meta( $row->ID, 'sip_custom_statuses', true );

			$status_dashboard_widget = ( isset($custom_statuses['status_dashboard_widget']) ? $custom_statuses['status_dashboard_widget'] : "NO" );

	        if (isset($counts[$row->post_name]) && $status_dashboard_widget === 'yes') {
	            $count = $counts[$row->post_name];
	            ?>
	            <li class="<?php echo $row->post_name; ?>-orders dashboard_status">
	                <a href="<?php echo admin_url('edit.php?post_status=' . $row->post_name . '&post_type=shop_order'); ?>">
	                    <?php printf(_n("<strong>%s order</strong> %s", "<strong>%s orders</strong> %s", $count, 'woocommerce_status_actions'), $count, strtolower($row->post_title)); ?>
	                </a>
	            </li>
	            <?php
	        }
	        
	    }

	}

}
add_filter('woocommerce_after_dashboard_status_widget', 'sip_coswc_dashboard_status_widget', 10, 1);

function sip_coswc_reports_order_statuses($order_status) {
	global $wpdb;
	
	if (!is_array($order_status))
		return $order_status;

	if (in_array('refunded', $order_status) && sizeof($order_status) == 1)
		return $order_status;

	$query = "SELECT ID, post_name FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish'  ORDER BY menu_order ASC";

	$result   = $wpdb->get_results($query);

	$include_reports = array();
	if( $result ) {
		foreach ( $result as $key => $row ) {
			
			$custom_statuses = get_post_meta( $row->ID, 'sip_custom_statuses', true );

			$status_display_reports = ( isset($custom_statuses['status_display_reports']) ? $custom_statuses['status_display_reports'] : false );
			if ( $status_display_reports != false ) {
				$include_reports[] = $row->post_name;
			}		
		}
	}

	$order_status = array_merge($order_status, $include_reports);

	return $order_status;
}
add_filter('woocommerce_reports_order_statuses', 'sip_coswc_reports_order_statuses', 10, 1);
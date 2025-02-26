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

function sip_cos_status_columns( $column ) {
	$columns                       = array();
	$columns['cb']                 = $column['cb'];
	$columns['title']              = __( 'Name', 'sip-custom-order-satus-for-woocommerce' );
	$columns['label']              = __( 'Label', 'sip-custom-order-satus-for-woocommerce' );
	$columns['order_status']       = __( 'Icon', 'sip-custom-order-satus-for-woocommerce' );
	$columns['order_actions']      = __( 'Action', 'sip-custom-order-satus-for-woocommerce' );
	$columns['display_in_reports'] = __( 'Reports', 'sip-custom-order-satus-for-woocommerce' );
	$columns['orders']             = __( 'Orders', 'sip-custom-order-satus-for-woocommerce' );

	return $columns;
}
add_filter( 'manage_sip_custom_statuses_posts_columns', 'sip_cos_status_columns' );

function sip_cos_render_status_columns( $column ) {
	global $post;
	$statuses = get_post_meta( $post->ID, 'sip_custom_statuses', true );

	switch ( $column ) {
		case 'label' :
			echo $post->post_name;
		break;
		case 'order_status' :
			$icod   = ( (isset( $statuses['status_icon'])) ? $statuses['status_icon'] : '57345' );
			$icolor = ( (isset( $statuses['status_colour'])) ? $statuses['status_colour'] : '#aa2727' );
			$istyles = array(
				'background-color:'.$icolor.'; border-color:'.$icolor.'; color: #fff',
				'color:'.$icolor.'; border-color:'.$icolor.';',
			);

			$display_icon = "";

			if (isset($statuses['status_icon_style'])) {
				switch ($statuses['status_icon_style']) {
					case 'icon-color':
						$display_icon = '<span class="sip-icon-circle sip-icon-icomoon sip-icon-color-style-0" style="'.$istyles[0].'"><i class="icomoon-'.sip_icon_lists ( $icod ).'" data-icomoon="'.$icod.'"></i></span>';
						break;

					case 'icon-outline':
						$display_icon = '<span class="sip-icon-outline sip-icon-icomoon sip-icon-color-style-1" style="'.$istyles[1].'"><i class="icomoon-'.sip_icon_lists ( $icod ).'" data-icomoon="'.$icod.'"></i></span>';
						break;

					case 'text-color':
						$display_icon = '<span class="sip-status-label-display sip-icon-icomoon-text-color sip-icon-color-style-0" style="'.$istyles[0].'">'.( (isset( $statuses['status_name'])) ? $statuses['status_name'] : __('Status', 'sip-custom-order-satus-for-woocommerce') );
						break;

					case 'text-outline':
						$display_icon = '<span class="sip-status-label-display sip-icon-icomoon-text-outline sip-icon-color-style-1" style="'.$istyles[1].'">'.( (isset( $statuses['status_name'])) ? $statuses['status_name'] : __('Status', 'sip-custom-order-satus-for-woocommerce') ).'</span>';
						break;

					default:
						$display_icon = '<span class="sip-status-label-display sip-icon-icomoon-text-outline sip-icon-color-style-1" style="'.$istyles[1].'">'.( (isset( $statuses['status_name'])) ? $statuses['status_name'] : __('Status', 'sip-custom-order-satus-for-woocommerce') ).'</span>';
						break;
				}
			}

			echo $display_icon;

		break;
		case 'order_actions' :
			$icod   = ( (isset( $statuses['status_action_icon'])) ? $statuses['status_action_icon'] : '57345' );
			printf( '<button type="button" class="button icomoon-%s"></button>', sip_icon_lists ( $icod ) );
		break;
		case 'display_in_reports' :
			if( isset($statuses['status_display_reports']) && $statuses['status_display_reports'] == 'yes' ){
				$reports = __('Included In Reports', 'sip-custom-order-satus-for-woocommerce');
				printf( '<span class="status-enabled tips" data-tip="%s">%s</span>', $reports, $reports );
			}else{
				$reports = __('Not Included In Reports', 'sip-custom-order-satus-for-woocommerce');
				printf( '<span class="status-disabled tips" data-tip="%s">%s</span>', $reports, $reports );
			}
		break;
		case 'orders' :
			global $wpdb;
	        $sql = "SELECT COUNT(DISTINCT ID) FROM {$wpdb->posts} WHERE post_status = '{$post->post_name}' ";
	        $count = $wpdb->get_var($sql);
	        echo $count;
   		break;
	}
}
add_action( 'manage_sip_custom_statuses_posts_custom_column', 'sip_cos_render_status_columns' , 2 );


function sip_cos_order_status_changed($order_id, $old_status, $new_status) {

	global $wpdb;

	$note = isset($_POST['sip_cos_order_note']) ? trim($_POST['sip_cos_order_note']) : '';
	$order = wc_get_order($order_id);
	$note = apply_filters('bulk_handler_custom_action_note', $note, $new_status, $order);
	if (!empty($note)) {
		$is_customer_note = isset($_POST['sip_cos_order_note_type']) && $_POST['sip_cos_order_note_type'] == 'customer' ? true : false;
		$order->add_order_note($note, $is_customer_note, true);
	}
  
	$custom = array();
	$result = $wpdb->get_results("SELECT ID, post_name, post_title FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish' ORDER BY menu_order ASC");
	if( $result ) {
		foreach ($result as $key => $value) {
			$custom[$value->post_name] = $value->post_title;
		}
	}

	wc_delete_shop_order_transients($order_id);
}
add_action('woocommerce_order_status_changed', 'sip_cos_order_status_changed', 777, 3);


function sip_cos_admin_order_actions( $actions, $order ) {

	global $wpdb;
	
	$statuses	= array();
	$result		= $wpdb->get_results("SELECT ID, post_name, post_title FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish' ORDER BY menu_order ASC");

	if( $result ) {
		foreach ($result as $key => $value) {
			$statuses[$value->ID] = (object)array('title' => $value->post_title, 'label' => $value->post_name);
		}
	}

	$sip_actions = array();
	$order_statuses = wc_get_order_statuses();
	
	if ($statuses) {
		foreach ($statuses as $key => $value) {

			$custom_statuses = get_post_meta( $key, 'sip_custom_statuses', true );
			
			$custom_statuses['status_order_note_prompt'] = ( isset($custom_statuses['status_order_note_prompt']) ? $custom_statuses['status_order_note_prompt'] : "NO" );

			$action_visibility = ( isset( $custom_statuses['action_visibility']) ? $custom_statuses['action_visibility'] : array() );
			$current_status = "wc-".$order->get_status();

			if (in_array($current_status, $action_visibility)) {

				$action_icon_code = isset($custom_statuses['status_action_icon']) ? $custom_statuses['status_action_icon'] : '57345';
				$action_icon = "icomoon-".sip_icon_lists ( $action_icon_code );
				$action = array($value->label, "icomoon-status" ,$action_icon );
				
				if ($custom_statuses['status_order_note_prompt'] == 'yes') {
					$action[] = 'class_note_prompt';
				}

				$label = $value->label;
				$label = str_replace("wc-", "", $label);
				$sip_actions[$label] = array(
					'url' => wp_nonce_url(admin_url('admin-ajax.php?action=woocommerce_mark_order_status&status=' . $label . '&order_id=' . $order->get_id()), 'woocommerce-mark-order-status'),
					'name' => $value->title,
					'action' => implode(' ', $action)
				);
			}

			$label = $value->label;
			$label = str_replace("wc-", "", $label);
			if ($order->get_status() == $label) {
				if (!empty($custom_statuses['status_show_action_buttons'])) {
					foreach ($custom_statuses['status_show_action_buttons'] as $st_key) {
						$_key = substr($st_key, 3);
						if (isset($order_statuses[$st_key])) {
							$_action = $_key;
							$name = $order_statuses[$st_key];
							switch ($_key) {
								case 'completed':
								$_action = 'complete';
								$name = __('Complete', 'woocommerce');
								break;
							}
							
							$sip_actions[$_action] = array(
								'url' => wp_nonce_url(admin_url('admin-ajax.php?action=woocommerce_mark_order_status&status=' . $_key . '&order_id=' . $order->get_id()), 'woocommerce-mark-order-status'),
								'name' => $name,
								'action' => $_action
								);
						}
					}
				}
			}
		}
	}

	return array_merge($sip_actions, $actions);
}
add_filter('woocommerce_admin_order_actions', 'sip_cos_admin_order_actions', 199, 2);


function sip_cos_register_post_status( ) {

	global $wpdb;
	$result   = $wpdb->get_results("SELECT ID, post_name, post_title FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish' ORDER BY menu_order ASC");
	$statuses = array();
	if( $result ) {
		foreach ($result as $key => $value) {
			$statuses[$value->ID] = (object)array('title' => $value->post_title, 'label' => $value->post_name);
		}
	}

	foreach ($statuses as $status) {

		register_post_status( $status->label, array(
			'label' => $status->title,
			'public' => true,
			'exclude_from_search' => false,
			'show_in_admin_all_list' => true,
			'show_in_admin_status_list' => true,
			'label_count' => _n_noop($status->title . ' <span class="count">(%s)</span>', $status->title . ' <span class="count">(%s)</span>', 'sip-custom-order-satus-for-woocommerce')
			)
		);
	}
}
add_action('init', 'sip_cos_register_post_status');


function sip_cos_add_order_statuses( $statuses ) {
	global $wpdb;
	if (!is_array($statuses)) $statuses = array();

	$result   = $wpdb->get_results("SELECT ID, post_name, post_title FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish' ORDER BY menu_order ASC");
	$sip_statuses = array();
	if( $result ) {
		foreach ($result as $key => $value) {
			$sip_statuses[$value->ID] = (object)array('title' => $value->post_title, 'label' => $value->post_name);
		}
	}

	foreach ($sip_statuses as $status) {
		$statuses[$status->label] = $status->title;
	}

	return $statuses;
}
add_filter('wc_order_statuses', 'sip_cos_add_order_statuses', 10, 1);


function sip_cos_note_promt( ) {
	?>
	<script type="text/html" id="wc_cos_note_prompt-modal">
		<div class="media-frame-title">
			<h1><?php _e('Add note', 'sip-custom-order-satus-for-woocommerce'); ?></h1>
		</div>
		<form class="wc_cos_note_prompt_form" method="post">
			<div class="media-frame-content" data-columns="10">
				<?php _e('Add a note for your reference, or add a customer note (the user will be notified).', 'sip-custom-order-satus-for-woocommerce'); ?>
				<textarea id="add_order_note" class="input-text" rows="5" name="sip_cos_order_note" type="text"></textarea>
				<p>
					<select id="order_note_type" name="sip_cos_order_note_type">
						<option value=""><?php _e('Private note', 'sip-custom-order-satus-for-woocommerce'); ?></option>
						<option value="customer"><?php _e('Note to customer', 'sip-custom-order-satus-for-woocommerce'); ?></option>
					</select>

				</p>
			</div>
			<div class="media-frame-toolbar">
				<div class="media-toolbar">
					<div class="media-toolbar-primary search-form">
						<button type="submit" class="button button-primary media-button"><?php _e('Add', 'sip-custom-order-satus-for-woocommerce'); ?></button>
					</div>
				</div>
			</div>
		</form>
	</script>
	<?php
}
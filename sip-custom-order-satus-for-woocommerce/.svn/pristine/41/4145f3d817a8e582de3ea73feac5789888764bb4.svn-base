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

function sip_coswc_add_admin_scripts( $hook ) {

    global $post, $wpdb;

    if ( $hook == 'index.php' ) {

    	wp_enqueue_style( 'icomoon', esc_url( SIP_COSWC_URL . 'admin/assets/css/style.css', false, '1.0.0' ));

		sip_coswc_dashboard_display_status_icon ( "icomoon" );
	}

    if ( $hook == 'post-new.php' || $hook == 'post.php' || $hook == 'edit.php' ) {
        if ( ( isset($post->post_type) && 'sip_custom_statuses' === $post->post_type ) || ( isset($post->post_type) && 'shop_order' === $post->post_type ) ) {

        	if ( 'shop_order' === $post->post_type ) {
				wp_enqueue_media();
			}

			wp_enqueue_style( 'jquery.fonticonpicker', esc_url( SIP_COSWC_URL . 'admin/assets/css/jquery.fonticonpicker.min.css', false, '1.0.0' ));
			wp_enqueue_style( 'jquery.fonticonpicker.theme', esc_url( SIP_COSWC_URL . 'admin/assets/css/jquery.fonticonpicker.darkgrey.min.css', false, '1.0.0' ));
			wp_enqueue_style( 'icomoon', esc_url( SIP_COSWC_URL . 'admin/assets/css/style.css', false, '1.0.0' ));

			wp_enqueue_script(  'jquery.fonticonpicker-js', SIP_COSWC_URL . 'admin/assets/js/jquery.fonticonpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script(  'custom-fonticonpicker-js', SIP_COSWC_URL . 'admin/assets/js/custom-fonticonpicker.js', array( 'jquery' ), '1.0.0', true );


			if ( 'shop_order' === $post->post_type ) {

				sip_coswc_display_status_icon ( 'icomoon' );
			}
        }
    }
}
add_action( 'admin_enqueue_scripts', 'sip_coswc_add_admin_scripts', 10, 1 );

function sip_coswc_dashboard_display_status_icon ( $css_style ) {

	global $wpdb;

	$result   = $wpdb->get_results("SELECT ID, post_name, post_title FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish' ORDER BY menu_order ASC");

	$custom_css = "";
	if( $result ) {
		
		foreach ($result as $key => $value) {

			$statuses = get_post_meta( $value->ID, 'sip_custom_statuses', true );

			$icod   = ( (isset( $statuses['status_icon'])) ? $statuses['status_icon'] : '57345' );
			$icolor = ( (isset( $statuses['status_colour'])) ? $statuses['status_colour'] : '#aa2727' );
			$istyles = array(
				'background-color:'.$icolor.'; border-color:'.$icolor.'; color: #fff',
				'color:'.$icolor.'; border-color:'.$icolor.';',
			);

			if (isset($statuses['status_icon_style'])) {

				$custom_css .= '

					#woocommerce_dashboard_status .wc_status_list li.'.$value->post_name.'-orders a:before {
						color: '.$icolor.';
						content: "'.sip_content_icon_lists(sip_icon_lists ( $icod )).'";
						font-family: icomoon !important;
						font-size: 12px;
						border: 1px solid '.$icolor.';
						width: 18px;
						height: 18px;
						line-height: 18px;
						padding: 3px;
						border-radius: 100%;
						text-align: center;
					}';				
			}
		}
	}
	wp_add_inline_style( $css_style, $custom_css );
}

function sip_coswc_display_status_icon ( $css_style ) {

	global $wpdb;

	$result   = $wpdb->get_results("SELECT ID, post_name, post_title FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish' ORDER BY menu_order ASC");

	$custom_css = "";
	if( $result ) {
		
		foreach ($result as $key => $value) {

			$statuses = get_post_meta( $value->ID, 'sip_custom_statuses', true );

			$icod   = ( (isset( $statuses['status_icon'])) ? $statuses['status_icon'] : '57345' );
			$icolor = ( (isset( $statuses['status_colour'])) ? $statuses['status_colour'] : '#aa2727' );
			$istyles = array(
				'background-color:'.$icolor.'; border-color:'.$icolor.'; color: #fff',
				'color:'.$icolor.'; border-color:'.$icolor.';',
			);

			if (isset($statuses['status_icon_style'])) {
				switch ($statuses['status_icon_style']) {
					case 'icon-color':
						$custom_css .= '.widefat .column-order_status mark.'.$value->post_name.' { background-color: '.$icolor.'; border: 1px solid '.$icolor.'; width: 11px; height: 11px; padding: 3px; border-radius: 100%; text-align: center; } .widefat .column-order_status mark.'.$value->post_name.'::after { font-family: "icomoon"; color: #fff; content: "'.sip_content_icon_lists(sip_icon_lists ( $icod )).'"; font-variant: normal; font-weight: 400; height: 100%; left: 0; margin: 0; position: absolute; text-indent: 0; text-transform: none; top: 0; width: 100%;  font-size: 73%; line-height: 17px;}';
						break;

					case 'icon-outline':
						$custom_css .= '.widefat .column-order_status mark.'.$value->post_name.' { color: '.$icolor.'; border: 1px solid '.$icolor.'; width: 11px; height: 11px; padding: 3px; border-radius: 100%; text-align: center; } .widefat .column-order_status mark.'.$value->post_name.'::after { color: '.$icolor.'; font-family: "icomoon"; content: "'.sip_content_icon_lists(sip_icon_lists ( $icod )).'"; font-variant: normal; font-weight: 400; height: 100%; left: 0; margin: 0; position: absolute; text-indent: 0; text-transform: none; top: 0; width: 100%; font-size: 73%; line-height: 17px; }';
						break;

					case 'text-color':
						$custom_css .= '.widefat .column-order_status mark.'.$value->post_name.' { background-color: '.$icolor.'; border: 1px solid '.$icolor.'; color: #fff; display: block; border-radius: 16px; font-size: 0px; font-weight: normal; line-height: 0px; min-width: 80px; padding: 0; text-align: center; width: auto; height: auto; } .widefat .column-order_status mark.'.$value->post_name.':after { content: "'.$value->post_name.'"; display: block; font-size: 9px; line-height: 17px; text-transform: uppercase; font-weight: bold; text-indent: 1px !important;}';
						break;

					case 'text-outline':
						$custom_css .= '.widefat .column-order_status mark.'.$value->post_name.' { color: '.$icolor.'; border: 2px solid '.$icolor.'; display: block; border-radius: 16px; font-size: 0px; line-height: 0px; min-width: 80px; padding: 0; text-align: center; text-indent: 1px; width: auto; height: auto; } .widefat .column-order_status mark.'.$value->post_name.':after { content: "'.$value->post_name.'"; display: block; font-size: 9px; line-height: 15px; text-indent: 1px !important; font-weight: bold; text-transform: uppercase;}';
						break;

					default:
						$custom_css .= '.widefat .column-order_status mark.'.$value->post_name.' { color: '.$icolor.'; border: 2px solid '.$icolor.'; display: block; border-radius: 16px; font-size: 0px; line-height: 0px; min-width: 80px; padding: 0; text-align: center; text-indent: 1px; width: auto; height: auto; } .widefat .column-order_status mark.'.$value->post_name.':after { content: "'.$value->post_name.'"; display: block; font-size: 9px; line-height: 15px; text-indent: 1px !important; font-weight: bold; text-transform: uppercase;}';
						break;
				}
			}
		}
	}
	wp_add_inline_style( $css_style, $custom_css );
}


/**
* Enqueue the styles and scripts needed for the color picker.
*/
function sip_coswc_add_styles_scripts(){
	//Access the global $wp_version variable to see which version of WordPress is installed.
	global $wp_version;

	//If the WordPress version is greater than or equal to 3.5, then load the new WordPress color picker.
	if ( 3.5 <= $wp_version ){
		//Both the necessary css and javascript have been registered already by WordPress, so all we have to do is load them with their handle.
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
	}
	//If the WordPress version is less than 3.5 load the older farbtasic color picker.
	else {
		//As with wp-color-picker the necessary css and javascript have been registered already by WordPress, so all we have to do is load them with their handle.
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_script( 'farbtastic' );
	}

	//Load our custom Javascript file
	wp_enqueue_script( 'sip-coswc-wp-color-picker-settings', SIP_COSWC_URL . 'admin/assets/js/settings.js' );
}
add_action( 'admin_enqueue_scripts', 'sip_coswc_add_styles_scripts' );


function sip_cos_bulk_admin_footer( ) {
	global $post_type, $wpdb;

	if ('shop_order' == $post_type) {

		?>
		<script type="text/javascript" id="sa-status-bulk-actions">
			jQuery(function () {

				<?php 
					$result   = $wpdb->get_results("SELECT ID, post_name, post_title FROM {$wpdb->posts} WHERE post_type = 'sip_custom_statuses' AND post_status = 'publish' ORDER BY menu_order ASC");
					if( $result ) {
						foreach ($result as $key => $value) {
							$statuses = get_post_meta( $value->ID, 'sip_custom_statuses', true );
							$status_hide_bulk_actions = ( (isset($statuses['status_hide_bulk_actions'] )) ? $statuses['status_hide_bulk_actions'] : "" ); 

							if (!checked('yes', $status_hide_bulk_actions, true)) {
								?>
									jQuery('<option>').val('mark_<?php echo $value->post_name; ?>').text('Mark <?php echo $value->post_title; ?>').appendTo("select[name='action']");
									jQuery('<option>').val('mark_<?php echo $value->post_name; ?>').text('Mark <?php echo $value->post_title; ?>').appendTo("select[name='action2']");
								<?php
							}
						}
					}
				?>

				jQuery('select[name="action"] option[value="trash"], select[name="action2"] option[value="trash').remove();
				jQuery('select[name="action"] option[value="edit"], select[name="action2"] option[value="edit').remove();
				jQuery('<option>').val('sip_delete_status').text('<?php _e('Delete permanently', 'sip-custom-order-satus-for-woocommerce'); ?>').appendTo('select[name="action"], select[name="action2"]');

			});
		</script>
		<?php
		sip_cos_note_promt( );
	}
}
add_action('admin_footer', 'sip_cos_bulk_admin_footer', 99);
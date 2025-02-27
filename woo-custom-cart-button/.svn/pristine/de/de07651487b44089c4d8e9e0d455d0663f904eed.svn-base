<?php
/*
** Start Setting Section
** Cart setting in setting menu
*/
add_action('admin_menu', 'wcatcbll_cart_setting_menu');
function wcatcbll_cart_setting_menu()
{
	add_options_page(__('CATCBNL', 'catcbll'), __('Custom Cart Button', 'catcbll'), 'manage_options', 'hwx-wccb', 'wcatcbll_wccb_options_page');
}

/* 
** Insert all setting in option table
** @use insert key is _woo_cstmbtn_all_settings
**/
add_action('wp_ajax_catcbll_save_option', 'catcbll_save_option');
function catcbll_save_option()
{
	// Check if form data exists
	if (!isset($_POST['form_data'])) {
		wp_send_json_error('Form data is missing');
		die;
	}

	// Unsplash the nonce and sanitize it
	$nonce = isset($_POST['security_nonce']) ? wp_unslash($_POST['security_nonce']) : '';

	// Verify nonce
	if (!wp_verify_nonce($nonce, 'ajax_public_nonce')) {
		wp_send_json_error('Nonce verification failed');
		die;
	}

	// Parse and unslash form data
	$final_data = array();
	parse_str(wp_unslash($_POST['form_data']), $final_data);
	$btn_action = isset($_POST['action']) ? sanitize_text_field(wp_unslash($_POST['action'])) : '';

	// Validate button action
	if ($btn_action === "catcbll_save_option") {
		$save_data = array();

		foreach ($final_data as $final_data_key => $final_data_val) {
			$btn_clr_key = array('catcbll_btn_bg', 'catcbll_btn_fclr', 'catcbll_btn_border', 'catcbll_btn_hvrclr');
			$cbtn_setting = in_array($final_data_key, $btn_clr_key, true) 
				? $final_data_val 
				: sanitize_text_field($final_data_val);
			$save_data[sanitize_key($final_data_key)] = $cbtn_setting;
		}

		// Update the option
		update_option('_woo_catcbll_all_settings', $save_data);
		wp_send_json_success("Success");
	} else {
		wp_send_json_error('Invalid action');
	}

	die; // End the script
}

add_action('admin_head', 'catcbll_disable_notice');
function catcbll_disable_notice()
{
	if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'hwx-wccb') { ?>
<style>
	.notice,
	.updated {
		display: none;
	}
</style> 
<?php }
}
?>

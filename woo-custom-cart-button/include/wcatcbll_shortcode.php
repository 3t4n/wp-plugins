<?php
// hooks your functions into the correct filters
function wcatcbll_add_mce()
{
	// check user permissions
	if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
		return;
	}
	// check if WYSIWYG is enabled
	if ('true' == get_user_option('rich_editing')) {
		add_filter('mce_external_plugins', 'wcatcbll_add_tinymce_plugin');
		add_filter('mce_buttons', 'wcatcbll_register_mce_button');
	}
}
add_action('admin_head', 'wcatcbll_add_mce');

// register shortcode button in the editor
function wcatcbll_register_mce_button($buttons)
{
	// Sanitize the shortcode button name before output
	array_push($buttons, sanitize_text_field("wccb_shrtcd"));
	return $buttons;
}

// declare a script for the Shortcode button
// the script will insert the shortcode on the click event
function wcatcbll_add_tinymce_plugin($plugin_array)
{
	// Safely output the URL of the JavaScript file using esc_url
	$plugin_array['Wccbinsertshortcode'] = esc_url(WCATCBLL_CART_JS . 'wcatcbll_shortcode.js');
	return $plugin_array;
}


if (!function_exists('wcatcbll_shortcode')) {
	function wcatcbll_shortcode($atts = array())
	{
		$astra_active_or_not = get_option('template');

		// Latest product showing when no product id passed
		if (!empty($atts["pid"]) && isset($atts["pid"])) {
			$pid = sanitize_text_field($atts['pid']); // Sanitize user input
			$pids = explode(",", $pid);
			$pid_count = count($pids);
		} else {
			$pid_count = 0;
		}

		// Button styling using shortcode parameters
		$catcbll_settings = get_option('_woo_catcbll_all_settings');
		extract($catcbll_settings);
		$shortcode_attr = array('background', 'font_size', 'font_color', 'font_awesome', 'border_color', 'border_size', 'icon_position', 'image');
		$option_key_vals = array();

		foreach ($shortcode_attr as $key) {
			if (isset($atts[$key])) {
				$option_key_vals[$key] = sanitize_text_field($atts[$key]); // Sanitize user input
				if (empty($option_key_vals[$key])) {
					switch ($key) {
						case 'background':
							$option_key_vals[$key] = $catcbll_btn_bg;
							break;
						case 'font_size':
							$option_key_vals[$key] = $catcbll_btn_fsize;
							break;
						case 'font_color':
							$option_key_vals[$key] = $catcbll_btn_fclr;
							break;
						case 'font_awesome':
							$option_key_vals[$key] = $catcbll_btn_icon_cls;
							break;
						case 'border_color':
							$option_key_vals[$key] = $catcbll_btn_border_clr;
							break;
						case 'border_size':
							$option_key_vals[$key] = $catcbll_border_size;
							break;
						case 'icon_position':
							$option_key_vals[$key] = $catcbll_btn_icon_psn;
							break;
						default:
							$option_key_vals[$key] = '';
					}
				}
			} else {
				$background = $catcbll_btn_bg;
				$font_size = $catcbll_btn_fsize;
				$font_color = $catcbll_btn_fclr;
				$font_awesome = $catcbll_btn_icon_cls;
				$border_color = $catcbll_btn_border_clr;
				$border_size = $catcbll_border_size;
				$icon_position = $catcbll_btn_icon_psn;
				$image = '';
			}
		}
		extract($option_key_vals);

		// Button display setting
		$both = isset($catcbll_both_btn) ? sanitize_text_field($catcbll_both_btn) : '';
		$add2cart = isset($catcbll_add2_cart) ? sanitize_text_field($catcbll_add2_cart) : '';
		$custom = isset($catcbll_custom) ? sanitize_text_field($catcbll_custom) : '';
		$btn_opnt_new_tab = isset($catcbll_btn_open_new_tab) ? sanitize_text_field($catcbll_btn_open_new_tab) : '';

		// Button Margin
		$btn_margin = esc_attr($catcbll_margin_top) . 'px ' . esc_attr($catcbll_margin_right) . 'px ' . esc_attr($catcbll_margin_bottom) . 'px ' . esc_attr($catcbll_margin_left) . 'px';

?>
<style>
	<?php
		if ($catcbll_custom_btn_position == 'left' || $catcbll_custom_btn_position == 'right') {
			$display = 'display:inline-flex';
		} else {
			$display = 'display:block';
		}

		if (!empty($catcbll_hide_btn_bghvr) || !empty($catcbll_btn_hvrclr)) {
			$btn_class = 'btn';
			$imp = '';
		} else {
			$btn_class = 'button';
			$imp = '!important';
		}
		if ($astra_active_or_not == 'Avada') {
			$avada_style = 'display: inline-block;float: none !important;';
		} else {
			$avada_style = '';
		}

		echo 'form.cart{display:inline-block}';
		echo '.catcbll_preview_button{text-align:' . esc_attr($catcbll_custom_btn_alignment) . ';margin:' . esc_attr($btn_margin) . ';display:' . esc_attr($display) . '}';
		echo '.catcbll_preview_button .fa{font-family:FontAwesome ' . esc_attr($imp) . '}';
		echo '.' . esc_attr($catcbll_hide_btn_bghvr) . ':before{border-radius:' . esc_attr($catcbll_btn_radius) . 'px ' . esc_attr($imp) . ';background:' . esc_attr($catcbll_btn_hvrclr) . ' ' . esc_attr($imp) . ';color:#fff ' . esc_attr($imp) . ';}';
		echo '.catcbll_preview_button .catcbll{' . esc_attr($avada_style) . 'color:' . esc_attr($catcbll_btn_fclr) . ' ' . esc_attr($imp) . ';font-size:' . esc_attr($catcbll_btn_fsize) . 'px ' . esc_attr($imp) . ';padding:' . esc_attr($catcbll_padding_top_bottom) . 'px ' . esc_attr($catcbll_padding_left_right) . 'px ' . esc_attr($imp) . ';border:' . esc_attr($catcbll_border_size) . 'px solid ' . esc_attr($catcbll_btn_border_clr) . ' ' . esc_attr($imp) . ';border-radius:' . esc_attr($catcbll_btn_radius) . 'px ' . esc_attr($imp) . ';background-color:' . esc_attr($catcbll_btn_bg) . ' ' . esc_attr($imp) . ';}';
		echo '.catcbll_preview_button a{text-decoration: none ' . esc_attr($imp) . ';}';
		if (empty($catcbll_hide_btn_bghvr)) {
			echo '.catcbll:hover{border-radius:' . esc_attr($catcbll_btn_radius) . ' ' . esc_attr($imp) . ';background-color:' . esc_attr($catcbll_btn_hvrclr) . ' ' . esc_attr($imp) . ';color:#fff ' . esc_attr($imp) . ';}';
		}
	?>
</style>
<?php

		// Main logic for processing products and rendering buttons...
		if ($pid_count > 0) {
			for ($x = 0; $x < $pid_count; $x++) {
				// Get featured image URL from the database
				if (get_post_type($pids[$x]) == 'product') {
					$pimg_id = get_post_meta($pids[$x], '_thumbnail_id', false);
					$pimg_url = get_post($pimg_id[0]);
					$pimg_url = esc_url($pimg_url->guid);

					// Get button label, URL, and open-new-tab-checkbox value from the database
					$prd_lbl = get_post_meta($pids[$x], '_catcbll_btn_label', true);
					$prd_url = esc_url(get_post_meta($pids[$x], '_catcbll_btn_link', true));

					$trgtblnk = ($btn_opnt_new_tab == "1") ? "target='_blank'" : "";

					// Count button values               
					$atxtcnt = is_array($prd_lbl) ? count($prd_lbl) : '';

					// Remaining rendering logic goes here...
				}
			}
		} else {
			echo esc_html__('Please Write Us PID Parameter In Shortcode', 'catcbll') . " ([catcbll pid='Please change it to your product ID'])";
		}
	} // close function
}
add_shortcode('catcbll', 'wcatcbll_shortcode');
?>
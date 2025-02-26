<?php
	add_action( 'wp_ajax_lacands_share_button_settings', 'lacands_share_button_settings_ajax_callback' );
	function lacands_share_button_settings_ajax_callback() {
		$whatever = intval( $_POST['whatever'] );
		$whatever += 10;
        echo 'Saved';
		if ($_POST['settings_above_content'] == 'true') {
			$func_name = 'lacands_share_button_settings_ajax_callback_'.'above_content';
		}else if ($_POST['settings_below_content'] == 'true') {
			$func_name = 'lacands_share_button_settings_ajax_callback_'.'below_content';
		}else if ($_POST['settings_sidebar'] == 'true') {
			$func_name = 'lacands_share_button_settings_ajax_callback_'.'sidebar';
		}else if ($_POST['settings_mobile_sharing_toolbar'] == 'true') {
			$func_name = 'lacands_share_button_settings_ajax_callback_'.'mobile_sharing_toolbar';
		}else if ($_POST['settings_mobile_toolbar'] == 'true') {
			$func_name = 'lacands_share_button_settings_ajax_callback_'.'mobile_toolbar';
		}
		if ($_POST['upgrade_notice'] == 'true') {
			global $lacands_version_number;
			update_option('lacands-html-version-number', $lacands_version_number);
		} else {
			$func_name();
		}
		wp_die();
	}
	
	function lacands_share_button_settings_ajax_callback_above_content() {
		$lacands_opt_array = get_option('lacands_plugin_settings');
		$enabled = ($_POST['above_content_enabled']) ? true : false;
		$style = $_POST['settings_above_content_button_style'];
		list($button_style, $button_size, $button_code_snippet) = get_button_style($style);
		$networks = $_POST['selected_networks'];
		if (!$networks) {
			$networks = array();
		}
		$options = $_POST['settings_above_content_button_options'];
		$show_count = ($_POST['settings_above_content_show_count']) ? 'true' : 'false';
		echo '<pre>'; print_r($lacands_opt_array['above_content']); echo '</pre>';
		$lacands_opt_array['above_content'] = array(
			'enabled' => $enabled,
			'style' => $style,
			'networks' => $networks,
			'options' => $options,
			'button_style' => $button_style,
			'button_size' => $button_size,
			'show_count' => $show_count,
			'button_code_snippet' => $button_code_snippet
		);
		lacands_update_options($lacands_opt_array);
	}
	
	function lacands_update_options($lacands_opt_array) {
		$lacands_opt_array['settings_configured'] = true;
		update_option('lacands_plugin_settings', $lacands_opt_array);
	}
	
	function lacands_share_button_settings_ajax_callback_below_content() {
		$lacands_opt_array = get_option('lacands_plugin_settings');
		$enabled = ($_POST['below_content_enabled']) ? true : false;
		$style = $_POST['settings_below_content_button_style'];
		list($button_style, $button_size, $button_code_snippet) = get_button_style($style);
		$networks = $_POST['selected_networks'];
		if (!$networks) {
			$networks = array();
		}
		$options = $_POST['settings_below_content_button_options'];
		$show_count = ($_POST['settings_below_content_show_count']) ? 'true' : 'false';
		// echo '<pre>'; print_r($lacands_opt_array['below_content']); echo '</pre>';
		$lacands_opt_array['below_content'] = array(
			'enabled' => $enabled,
			'style' => $style,
			'networks' => $networks,
			'options' => $options,
			'button_style' => $button_style,
			'button_size' => $button_size,
			'show_count' => $show_count,
			'button_code_snippet' => $button_code_snippet
		);
		lacands_update_options($lacands_opt_array);
	}

	function lacands_share_button_settings_ajax_callback_sidebar() {
		$lacands_opt_array = get_option('lacands_plugin_settings');
		$enabled = ($_POST['sidebar_enabled']) ? true : false;
		$position = $_POST['settings_sidebar_position'];
		// list($button_style, $button_size, $button_code_snippet) = get_button_style($style);
		$button_code_snippet = 'sidebar';
		$networks = $_POST['selected_networks'];
		if (!$networks) {
			$networks = array();
		}
		$options = $_POST['settings_sidebar_button_options'];
		$show_count = ($_POST['settings_sidebar_show_count']) ? 'true' : 'false';
		// echo '<pre>'; print_r($lacands_opt_array['sidebar']); echo '</pre>';
		$lacands_opt_array['sidebar'] = array(
			'enabled' => $enabled,
			'position' => $position,
			'networks' => $networks,
			'options' => $options,
			// 'button_style' => $button_style,
			// 'button_size' => $button_size,
			'show_count' => $show_count,
			'button_code_snippet' => $button_code_snippet
		);
		lacands_update_options($lacands_opt_array);
	}
	
	function lacands_share_button_settings_ajax_callback_mobile_sharing_toolbar() {
		$lacands_opt_array = get_option('lacands_plugin_settings');
		$enabled = ($_POST['mobile_sharing_toolbar_enabled']) ? true : false;
		$position = $_POST['settings_mobile_sharing_toolbar_position'];
		// list($button_style, $button_size, $button_code_snippet) = get_button_style($style);
		$button_code_snippet = 'mobile_sharing_toolbar';
		$networks = $_POST['selected_networks'];
		if (!$networks) {
			$networks = array();
		}
		$options = $_POST['settings_mobile_sharing_toolbar_button_options'];
		// echo '<pre>'; print_r($_POST['mobile_sharing_toolbar_enabled']); echo '</pre>';
		$lacands_opt_array['mobile_sharing_toolbar'] = array(
			'enabled' => $enabled,
			'position' => $position,
			'networks' => $networks,
			'options' => $options,
			// 'button_style' => $button_style,
			// 'button_size' => $button_size,
			'button_code_snippet' => $button_code_snippet
		);
		lacands_update_options($lacands_opt_array);
	}
	
	function lacands_share_button_settings_ajax_callback_mobile_toolbar() {
		$lacands_opt_array = get_option('lacands_plugin_settings');
		$enabled = ($_POST['mobile_toolbar_enabled']) ? true : false;
		$position = $_POST['settings_mobile_toolbar_position'];
		// list($button_style, $button_size, $button_code_snippet) = get_button_style($style);
		$button_code_snippet = 'mobile_toolbar';
		// $networks = $_POST['selected_networks'];
		$options = $_POST['settings_mobile_toolbar_button_options'];
		// echo '<pre>'; print_r($lacands_opt_array['mobile_toolbar']); echo '</pre>';
		$lacands_opt_array['mobile_toolbar'] = array(
			'enabled' => $enabled,
			'position' => $position,
			// 'networks' => $networks,
			'options' => $options,
			// 'button_style' => $button_style,
			// 'button_size' => $button_size,
			'button_code_snippet' => $button_code_snippet
		);
		lacands_update_options($lacands_opt_array);
	}
	
	function get_button_style($style) {
		$parts = explode("_", $style);
		if (in_array($parts[0], array('circle', 'square'))) {
			$button_style = $parts[0];
			$button_code_snippet = 'la_share_buttons';
			$button_size = $parts[1];
		} else {
			$button_style = $style;
			$button_size = 'regular';
			$button_code_snippet = $style;
		}
		return array($button_style, $button_size, $button_code_snippet);
	}
?>
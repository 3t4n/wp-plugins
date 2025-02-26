<?php
	// //Saving values of settings in database in "wp_options" table
	function cjs_settings() {
	    $cjs_setting_width = intval($_POST['cjs_setting_width']);
	    if(!$cjs_setting_width) {
	    	$cjs_setting_width = 800;
	    }

	    $cjs_setting_height = intval($_POST['cjs_setting_height']);
	    if(!$cjs_setting_height) {
	    	$cjs_setting_height = 400;
	    }

	    $cjs_setting_effect = sanitize_text_field($_POST['cjs_setting_effect']);
	    $cjs_setting_auto_play = filter_var($_POST['cjs_setting_auto_play'],FILTER_SANITIZE_NUMBER_INT);
	    $cjs_setting_auto_time = intval($_POST['cjs_setting_auto_time']);
	    if(!$cjs_setting_auto_time) {
	    	$cjs_setting_auto_time = 0;
	    }

	    $cjs_setting_speed = intval($_POST['cjs_setting_speed']);
	    if(!$cjs_setting_speed) {
	    	$cjs_setting_speed = 2;
	    }

	    $cjs_setting_pager = filter_var($_POST['cjs_setting_pager'],FILTER_SANITIZE_NUMBER_INT);
	    $cjs_setting_controls = filter_var($_POST['cjs_setting_controls'],FILTER_SANITIZE_NUMBER_INT);

	    $cjs_options_array = array(
	        'cjs_width' => $cjs_setting_width,
	        'cjs_height' => $cjs_setting_height,
	        'cjs_effect' => $cjs_setting_effect,
	        'cjs_auto_play' => $cjs_setting_auto_play,
	        'cjs_auto_time' => $cjs_setting_auto_time,
	        'cjs_speed' => $cjs_setting_speed,
	        'cjs_pager' => $cjs_setting_pager,
	        'cjs_controls' => $cjs_setting_controls
	    );

	    $cjs_options_ser = serialize($cjs_options_array);

	    global $wpdb;
	    $wpdb->update(
	        'wp_options',
	        array(
	            'option_value' => "$cjs_options_ser"
	        ),
	        array(
	            'option_name' => 'cheeko_slider_options',
	        )
	    );
	    die();
	    return true;
	}

	//Save values in database in "wp_cjs_images" table
	function cjs_add_images() {
	    $img_url = $_POST['cjs_input_method'];
	    $img_url = esc_url_raw($img_url);

	    global $wpdb;
	    $wpdb->insert(
	        'wp_cjs_images',
	        array(
	            'cjs_img_path' => $img_url
	        )
	    );
	    die();
	    return true;
	}

	//Updating values in database in "wp_cjs_images" table
	function cjs_update_values() {
	    $id = $_POST['cjs_id'];
	    $link = (!empty($_POST['cjs_update_link']) ? $_POST['cjs_update_link'] : '');
	    $link = esc_url_raw($link);

	    $desc = (!empty($_POST['cjs_update_desc']) ? $_POST['cjs_update_desc'] : '');
	    $desc = sanitize_text_field($desc);

	    $title = (!empty($_POST['cjs_update_title']) ? $_POST['cjs_update_title'] : '');
	    $title = sanitize_text_field($title);

	    global $wpdb;

	    $wpdb->update(
	        'wp_cjs_images',
	        array(
	            'cjs_img_title' => $title,
	            'cjs_img_description' => $desc,
	            'cjs_img_link' => $link
	        ),
	        array('cjs_img_id' => $id)
	    );

	    die();

	    return true;
	}

	//Deleting values in database in "wp_cjs_images" table
	function cjs_delete_values() {
	    $id = $_POST['cjs_id'];

	    global $wpdb;

	    $wpdb->delete(
	        'wp_cjs_images',
	        array('cjs_img_id' => $id)
	    );

	    die();
	    
	    return true;
	}

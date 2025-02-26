<?php

function sls_wp_ajax_function(){
	global $wpdb;
	$table_images = $wpdb->prefix."sls_images";
	
	if( ! isset($_REQUEST['sls_actions']) ) {
		return;
	}
	
	$sls_actions = sanitize_text_field($_REQUEST['sls_actions']);
	
	switch ( $sls_actions ){
		
		//=============== [Title SL Logo Slider] ===============
		case "update_title":
			if ( ! isset($_POST['sls_title']) ) {
				return;
			}
			
			$sls_title 	= strtolower(sanitize_text_field($_POST['sls_title']));
			
			if ( strlen($sls_title) > 25 ) {
				$return_notice = array('success' => false, 'msg' => 'Length of characters not allowed, Update Title Failed!!');
				wp_send_json($return_notice);
				wp_die();
			}
			
			if( ! empty($sls_title) ){
				//check already options on database
				if ( get_option( 'sls_title_slider' ) !== false ){
					update_option( 'sls_title_slider', ucwords($sls_title));
				}
				else{
					add_option( 'sls_title_slider', ucwords($sls_title));
				}
				
				$return_notice = array('success' => true, 'msg' => 'Update Title Successfully!!');
				wp_send_json($return_notice);
				wp_die();
			}
			else{
				$return_notice = array('success' => false, 'msg' => 'Empty Title, Update Title Failed!!');
				wp_send_json($return_notice);
				wp_die();
			}
        break;
		
		case "delete_title":
			if ( get_option( 'sls_title_slider' ) !== false ){
				delete_option( 'sls_title_slider' );
			}
			
			$return_notice = array('success' => true, 'msg' => 'Delete Title Successfully!!');
			wp_send_json($return_notice);
			wp_die();
			
        break;
		
		//=============== [SL Logo Slider Image Proccess] ===============
        case "add_image":
            if( ! isset($_POST['sls_slide_image']) ) {
				return;
			}
			
			$sls_slide_image = sanitize_text_field($_POST['sls_slide_image']);
            
            $sls_image_ext = pathinfo($sls_slide_image, PATHINFO_EXTENSION);
            $sls_image_name = pathinfo($sls_slide_image, PATHINFO_BASENAME);
            $split_img_name = explode(".", $sls_image_name);
            $split_img_name = $split_img_name[0];
            $sls_image_path = pathinfo($sls_slide_image, PATHINFO_DIRNAME)."/";
            
            $image_add_data = array(
				'image_order' => (int) 0,
				'image_title' => $split_img_name,
                'image_name' => $split_img_name.".".$sls_image_ext,
                'image_path' => $sls_image_path
            );
			
            if( ! empty($sls_slide_image) ) {
				
				if( is_array($image_add_data) ) {
					$wpdb->insert($table_images, $image_add_data);
				}
				
				$return_notice = array('success' => true, 'msg' => 'Image Upload Successfully!!');
				wp_send_json($return_notice);
				wp_die();
            }
            else{
				$return_notice = array('success' => false, 'msg' => 'Image Required!!');
				wp_send_json($return_notice);
				wp_die();
			}
        break;
		
		case "update_image":
            
			if( ! isset($_POST['sls_image_id'], $_POST['sls_image_title'], $_POST['sls_image_link'], $_POST['sls_image_order']) ) {
				return;
			}
			
			$sls_unique_id = (int) $_POST['sls_image_id'];
			$sls_order_number = (int) $_POST['sls_image_order'];
			
			if ( ! filter_var($_POST['sls_image_link'], FILTER_VALIDATE_URL) && !empty($_POST['sls_image_link']) ) {
				$return_notice = array('success' => false, 'msg' => 'Invalid URL Link, Update Failed!!');
				wp_send_json($return_notice);
				wp_die();
			}
			else if ( strlen($_POST['sls_image_title']) > 50 ) {
				$return_notice = array('success' => false, 'msg' => 'Length of characters not allowed, Update Failed!!');
				wp_send_json($return_notice);
				wp_die();
			}
			
            $sls_image_id = sanitize_text_field($sls_unique_id);
            $sls_image_title = sanitize_text_field($_POST['sls_image_title']);
            $sls_image_link = sanitize_text_field($_POST['sls_image_link']);
            $sls_image_order = sanitize_text_field($sls_order_number);
            
            $image_link_data = array(
                'image_title' => $sls_image_title,
                'image_link_to' => $sls_image_link,
                'image_order' => $sls_image_order
            );
            
            $image_link_where = array(
                'image_id' => $sls_image_id
            );
            
			if( ! empty($sls_image_id) ){
				
				if( is_array($image_link_data) && is_array($image_link_where) ) {
					$wpdb->update($table_images, $image_link_data, $image_link_where);
				}
				
				$return_notice = array('success' => true, 'msg' => 'Update Image Successfully!!');
				wp_send_json($return_notice);
				wp_die();
				
			}
			else{
                $return_notice = array('success' => false, 'msg' => 'Update Failed!!');
				wp_send_json($return_notice);
				wp_die();
			}
        break;
		
		case "del_image":
			if( ! isset($_REQUEST['sls_image_id']) ) {
				return;
			}
			
			$sls_unique_id = (int) $_REQUEST['sls_image_id'];
			$sls_image_id = sanitize_text_field($sls_unique_id);
            
            $image_where = array(
                'image_id' => $sls_image_id
            );
            
			if( ! empty($sls_image_id) ){
				
				if( is_array($image_where) ) {
					$wpdb->delete($table_images, $image_where);
				}
				
				$return_notice = array('success' => true, 'msg' => 'Delete Image Successfully!!');
				wp_send_json($return_notice);
				wp_die();
				
			}
			else{
                $return_notice = array('success' => false, 'msg' => 'Delete Failed!!');
				wp_send_json($return_notice);
				wp_die();
			}
		break;
		
		//=============== [SL Logo Slider Image Settings] ===============
		case "edit_settings":
			if ( ! isset($_POST) ) {
				return;
			}
			
			if( ! empty($_POST) ){
				
				$options_data = maybe_serialize( $_POST );
				update_option( 'sls_settings', $options_data);
				
				$return_notice = array('success' => true, 'msg' => 'Update Settings Successfully!!');
				wp_send_json($return_notice);
				wp_die();
			}
			else{
				$return_notice = array('success' => false, 'msg' => 'Update Settings Failed!!');
				wp_send_json($return_notice);
				wp_die();
			}
            
        break;
    }
	
}
add_action( "wp_ajax_sls_action_pro", "sls_wp_ajax_function" );
add_action( "wp_ajax_nopriv_sls_action_pro", "sls_wp_ajax_function" );

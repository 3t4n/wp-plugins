<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class AutomobAjax
{
	public function am_save_vehicle()
	{
		if (isset($_POST['post_id'])&&isset($_POST['meta_key'])&&isset($_POST['meta_value'])) 
		{
			$post_id = (int)$_POST['post_id'];
			$meta_key = sanitize_text_field($_POST['meta_key']);
			$meta_value = sanitize_text_field($_POST['meta_value']);
			update_post_meta( $post_id, $meta_key, $meta_value);
			wp_die();
		}

	}	

}
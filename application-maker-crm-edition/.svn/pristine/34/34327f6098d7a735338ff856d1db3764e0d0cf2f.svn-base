<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//HERE DO DATA PROCESS
global $wpdb;
$nbr = 1;

if (current_user_can('administrator')) {
	$query = "SELECT *
				FROM $wpdb->posts
				WHERE post_type = 'ff_taxdiagrams'
				ORDER BY post_date DESC
				LIMIT 0,$nbr ";
	$posts_list = $wpdb->get_results($query);
	$resual_post = array();
	foreach($posts_list as $k => $post){
		$post_id = $post->ID;
		$diagrams_upload = get_post_meta($post_id , 'diagrams_upload' , true);
		$tips_description = get_post_meta($post_id , 'tips_description' , true);
		$tmp_arr = explode('*****' ,$diagrams_upload);
		unset($tmp_arr[0]);
		$resual_post[$k]['id'] = $post->ID ;
		$resual_post[$k]['title'] = $post->post_title ;
		$resual_post[$k]['tips_description'] = $tips_description;
		foreach($tmp_arr as $tmp){
			$tmp = wp_get_attachment_image_src($tmp);
			
			$thumbar = explode('.', $tmp[0]);
            $ext = $thumbar[count($thumbar) - 1];
			$thumb = str_replace("." . $ext, "_thumb." . $ext, $tmp[0]);

			$resual_post[$k]['diagrams_upload'][] = $thumb;
		}
	}
	
	$img_width = 155;
	$img_height = 90;
	// echo '<pre>';
	// print_r($resual_post);
	// echo '</pre>';
}

?>
<?php
//###############################
//--> Eliminar la fecha pasados X dias
//###############################


//if (is_singular()) {
	//$change_date = strtotime('-'. get_option('pymseoWPORemoveDatexDays') .' days');
	$change_date = strtotime('-'. get_option('pymseoWPORemoveDatexDays') .' days');
	$post_date = strtotime(get_the_date('m/d/Y'));
	$post_modified_date = strtotime(get_the_modified_date('m/d/Y'));

//echo get_option('pymseoWPORemoveDatexDays') .' - ';
//echo $change_date .' - ';
//echo $post_date .' - ';
//echo $post_modified_date .' - ';
//echo get_the_date('c');

//	if(($post_date > $change_date) || ($post_modified_date > $change_date)){
//		if($post_modified_date > $post_date){

			// Delete all dates
			function fun_pymseo_remove_post_dates() {
				add_filter('the_date', '__return_false');
				add_filter('the_time', '__return_false');
				add_filter('the_modified_date', '__return_false');
				add_filter('get_the_date', '__return_false');
				add_filter('get_the_time', '__return_false');
				add_filter('get_the_modified_date', '__return_false');
			}
			add_action('loop_start', 'fun_pymseo_remove_post_dates');
//		} else {
//
	//	}
	//}
//}
?>
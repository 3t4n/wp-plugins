<?php

add_action('wp_ajax_EDIT_PROD', 'vkrwps_edit_prod');
function vkrwps_edit_prod() {

	$sv = (int) $_POST['sv'];
	
	global $wpdb;

	$get_prod_info = $wpdb->get_results( 
	"
	SELECT id, cat_id, name, description, long_description, price, shipping, weight, sku, in_stock
	FROM wp_vkrwps_products
	WHERE id = '$sv'
	"
	);

	$dir = content_url().'/rwpsliteuploads/';

	$jsonArray = array();

	foreach ($get_prod_info as $prod_info) {

		$ld = $prod_info->long_description;
		remove_filter( 'the_content', 'do_shortcode', 11 );
		$ld = apply_filters('the_content', $ld);

		$sd = $prod_info->description;
		remove_filter( 'the_content', 'do_shortcode', 11 );
		$sd = apply_filters('the_content', $sd);

		$p = (float)$prod_info->price;
		// $p = number_format($p, 2);
		$p = $prod_info->price;

		// if (strpos($p,',') !== false) {
  //           $p = $p;
  //       } else {
  //           $p = number_format($p, 2);
  //       }
        $p = number_format($p, 2, '.', '');

		$jsonArray['id'] = $prod_info->id;
		$jsonArray['cat_id'] = $prod_info->cat_id;
		$jsonArray['name'] = $prod_info->name;
		$jsonArray['description'] = stripslashes($sd);
		$jsonArray['long_description'] = stripslashes($ld);
		$jsonArray['price'] = $p;
		$jsonArray['weight'] = $prod_info->weight;
		$jsonArray['shipping'] = $prod_info->shipping;
		$jsonArray['sku'] = $prod_info->sku;
		$jsonArray['in_stock'] = $prod_info->in_stock;

	} 


	echo json_encode($jsonArray);

	die();
}

?>
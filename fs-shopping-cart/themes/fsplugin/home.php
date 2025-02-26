<?php
	$page_content = "";
	$page_content .= '<div id="fs-cart">';
	
	$Categories = $wpdb->get_results("SELECT categories_name, categories_url, categories_id, categories_visibility, categories_order FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = 0 AND categories_visibility = 1 AND categories_product_count > 0 ORDER BY categories_order");
	foreach ($Categories as $Categories) {
		$ProductInfo = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories, ".$wpdb->prefix."fssc_products WHERE ".$wpdb->prefix."fssc_products_to_categories.categories_id = ".$categories_info['categories_id']." AND ".$wpdb->prefix."fssc_products.products_id = ".$wpdb->prefix."fssc_products_to_categories.products_id AND ".$wpdb->prefix."fssc_products.products_visibility = 1 ORDER BY ".$wpdb->prefix."fssc_products_to_categories.products_order LIMIT 1");
		$CategoryImage = '';
		$CategoryHeight = '40px';
		if ($fscartconfig['CatalogHomeDisplayThumbnails'] == "1") {
			if (file_exists(ABSPATH.'/wp-content/uploads/fscart/categories/'.$Categories->categories_id.'.jpg')) { $CategoryImage = '<img src="'.get_option('home').'/wp-content/uploads/fscart/categories/'.$Categories->categories_id.'.jpg" border="0" alt="'.stripslashes($Categories->categories_name).'" style="border: 1px solid #999999;">'; }
			$CategoryHeight = '100px';
		}
		if ($fscartconfig['CatalogHomeList'] == "Horizontal") {
			$page_content .= '<div style="float: left; width: 33%; text-align: center; height: 152px;"><a href="'.get_option('home').'/products/'.$Categories->categories_url.'/"><br />'.$CategoryImage.'</a><h3>'.stripslashes($Categories->categories_name).'</h3></div>';
		} elseif ($fscartconfig['CatalogHomeList'] == "Vertical") {
			$page_content .= '<h3><a href="'.get_option('home').'/products/'.$Categories->categories_url.'/">'.stripslashes($Categories->categories_name).'</a></h3>';
		}
	}
	$page_content .= '</div><div style="clear: left;"></div>';
	echo $page_content;
?>

<?php

// Featured Products [fssc_featured_products]
if (preg_match('/[fssc_featured_products_h]/i', $content)) {
	$FeaturedProducts = '<div id="fs-cart-h">';
	$FeaturedProducts .= fssc_print_products_listing (0, '', 'Featured Products', FALSE, FALSE, $fscartconfig['DefaultProductsPerPage']);
	$FeaturedProducts .= '</div>';
	
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		$content = str_replace('[fssc_featured_products_h]', 'You must be logged in to view our product catalog.', $content);
	} else {
		$content = str_replace('[fssc_featured_products_h]', $FeaturedProducts, $content);
	}
}
if (preg_match('/[fssc_featured_products]/i', $content)) {
	$FeaturedProducts = '<div id="fs-cart">';
	$FeaturedProducts .= fssc_print_products_listing (0, '', 'Featured Products', FALSE, FALSE, $fscartconfig['DefaultProductsPerPage']);
	$FeaturedProducts .= '</div>';
	
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		$content = str_replace('[fssc_featured_products]', 'You must be logged in to view our product catalog.', $content);
	} else {
		$content = str_replace('[fssc_featured_products]', $FeaturedProducts, $content);
	}
}


// Top Sellers [fssc_top_sellers]
if (preg_match('/[fssc_top_sellers_h]/i', $content)) {
	$FeaturedProducts = '<div id="fs-cart-h">';
	$FeaturedProducts .= fssc_print_products_listing (0, '', 'Top Sellers', FALSE, FALSE, $fscartconfig['DefaultProductsPerPage']);
	$FeaturedProducts .= '</div>';
	
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		$content = str_replace('[fssc_top_sellers_h]', 'You must be logged in to view our product catalog.', $content);
	} else {
		$content = str_replace('[fssc_top_sellers_h]', $FeaturedProducts, $content);
	}
}
if (preg_match('/[fssc_top_sellers]/i', $content)) {
	$FeaturedProducts = '<div id="fs-cart">';
	$FeaturedProducts .= fssc_print_products_listing (0, '', 'Top Sellers', FALSE, FALSE, $fscartconfig['DefaultProductsPerPage']);
	$FeaturedProducts .= '</div>';
	
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		$content = str_replace('[fssc_top_sellers]', 'You must be logged in to view our product catalog.', $content);
	} else {
		$content = str_replace('[fssc_top_sellers]', $FeaturedProducts, $content);
	}
}


// NEW Products [fssc_new_products]
if (preg_match('/[fssc_new_products_h]/i', $content)) {
	$NewProducts = '<div id="fs-cart-h">';
	$NewProducts .= fssc_print_products_listing (0, '', 'New Products', FALSE, FALSE, $fscartconfig['DefaultProductsPerPage']);
	$NewProducts .= '</div>';
	
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		$content = str_replace('[fssc_new_products_h]', 'You must be logged in to view our product catalog.', $content);
	} else {
		$content = str_replace('[fssc_new_products_h]', $NewProducts, $content);
	}
}
if (preg_match('/[fssc_new_products]/i', $content)) {
	$NewProducts = '<div id="fs-cart">';
	$NewProducts .= fssc_print_products_listing (0, '', 'New Products', FALSE, FALSE, $fscartconfig['DefaultProductsPerPage']);
	$NewProducts .= '</div>';
	
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		$content = str_replace('[fssc_new_products]', 'You must be logged in to view our product catalog.', $content);
	} else {
		$content = str_replace('[fssc_new_products]', $NewProducts, $content);
	}
}


// SITEMAP
if (!function_exists(fssc_sitemap)) {
function fssc_sitemap ($parent_id, $level, $SitemapContent) {
	global $wpdb,$FSSCPages;
	$level = $level + 1;
	$sql = mysql_query("SELECT parent_id, categories_visibility, categories_order, categories_name, categories_id, categories_order, categories_url FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = $parent_id AND categories_visibility = 1 ORDER BY categories_order");
	$count = mysql_num_rows($sql);
	if ($count > 0) {
		while ($categories = mysql_fetch_array($sql)) {
			$sql2 = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_products_to_categories, ".$wpdb->prefix."fssc_products WHERE ".$wpdb->prefix."fssc_products_to_categories.categories_id = ".$categories['categories_id']." AND ".$wpdb->prefix."fssc_products.products_id = ".$wpdb->prefix."fssc_products_to_categories.products_id AND ".$wpdb->prefix."fssc_products.products_visibility = 1");
			if (mysql_num_rows($sql2) > 0) {
				$tab = "";
				for ($i=1; $i<$level; $i++) {
					$tab .= "&nbsp;&nbsp;&nbsp;";
				}
				$SitemapContent .= $previous_id.' '.$tab.'<a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$categories['categories_url'].'/" style="text-decoration: none; color: #000000;"><strong>'.$categories['categories_name'].'</strong></a><br />';
				
				$SubCheck = mysql_query("SELECT * FROM ".$wpdb->prefix."fssc_categories WHERE parent_id = ".$categories['categories_id']);
				if ($categories['parent_id'] == 0 && mysql_num_rows($SubCheck) != 0) {
					// DO NOTHING
				} else {
					while ($Products = mysql_fetch_array($sql2)) {
						$SitemapContent .= $previous_id.' &nbsp;&nbsp;&nbsp;'.$tab.'<a href="'.get_option('home').'/'.$FSSCPages['ProductsURL'].'/'.$Products['products_url'].'/" style="text-decoration: none;">'.$Products['products_name'].'</a><br />';
					}
				}
				
				fssc_sitemap ($categories['categories_id'], $level, $SitemapContent);
				$SitemapContent .= '<br />';
			}
		}
	}
}
if (preg_match('/[fssc_product_sitemap]/i', $content)) {
	$SitemapContent = fssc_sitemap (0, 0, '');
	if ($fscartconfig['StoreRequiresLogin'] == 1 && !$user_ID) {
		$content = str_replace('[product-sitemap]', 'You must be logged in to view our product catalog.', $content);
	} else {
		$content = str_replace('[product-sitemap]', $SitemapContent, $content);
	}
}
}



?>
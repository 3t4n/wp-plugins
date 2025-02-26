<?php
class waruk_wc_productList {
/*
* Terméklistát kezelő osztály
*/
/*
* Összes termék id lekérdezése
* return: array
*/
public function getProductList() {
    $prodlist = array();
    $paged = 1;
    $posts_per_page = 10; // Kisebb oldalméret az erőforrások kezelése érdekében

    while (count($prodlist) < 50) {
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $posts_per_page,
            'paged' => $paged,
            'post_status' => 'publish'
        );

        $products = new WP_Query($args);

        if (!$products->have_posts()) {
            break; // Ha nincs több termék, kilépünk a ciklusból
        }

        while ($products->have_posts()) {
            $products->the_post();
            $product = wc_get_product(get_the_ID());
            if ($product && $product->is_type('simple') && count($prodlist) < 50 &&$this->isProductAllowed(get_the_ID())) {
                $prodlist[] = $product->get_id();
            }
        }

        wp_reset_postdata();
        $paged++; // Növeljük az oldalszámot a következő lekérdezéshez
    }

    return $prodlist;
}

public function isProductAllowed($id) {
    // Először ellenőrizze a termék beállításait
    if (get_option('waruk_hide_default') != 1) {
        if (get_post_meta($id, 'arukereso_hide', true) != 'yes') {
            // Itt ellenőrizzük a készletet
            return $this->checkProductStock($id);
        } else {
            return false;
        }
    } else {
        if (get_post_meta($id, 'arukereso_show', true) != 'yes') {
            return false;
        } else {
            // Itt is ellenőrizzük a készletet
            return $this->checkProductStock($id);
        }
    }
}

private function checkProductStock($id) {
    $product = wc_get_product($id);
    if (!$product || !$product->managing_stock()) {
        // Ha nincs készletkezelés, vagy a termék nem létezik
        return true;
    }
    return $product->is_in_stock();
}

	public function getCategoryList($id) {
		$terms =get_the_terms($id, 'product_cat');
$catlist =array();
    if (!is_array($terms)) {
        return $catlist; // Üres tömböt ad vissza, ha nincsenek kategóriák
    }
foreach ($terms as $term) {
	if ($term->parent ==0) {
				$catlist[$term->term_id][] =$term;
	}
	}
	foreach ($terms as $term) {
		
		if ($term->parent !=0) {
		$catlist[$term->parent][] =$term;
	}
	}
	return $catlist;
		}
public function getProductData ($id) {
	$full_product_list =array();
	$product = wc_get_product($id);
if( $product->is_type( 'simple' )   &&$product->is_in_stock()) {
if($product->is_type( 'simple' ) && $this->isProductAllowed($id)) {
$thetitle = get_post_meta($id, 'waruk_prod_name', true );
if (empty($thetitle)) {
$thetitle =get_the_title($id);
}
$excerpt ="";
if (has_excerpt($id)) {
	$excerpt =strip_tags(str_replace( '"', '""', get_the_excerpt($id) ));
} else {
$excerpt =strip_tags(str_replace( '"', '""', $product->get_description() ));
}
$attributes =array();
$manufacturer =(get_post_meta( $id, 'manufacturer', true ) =='Array' ? '' : get_post_meta( $id, 'manufacturer', true ));
$ean_code =(get_post_meta( $id, 'ean_code', true ) =='Array' ? '' : get_post_meta( $id, 'ean_code', true ));
$warranty =(get_post_meta( $id, 'warranty', true ) =='Array' ? '' : get_post_meta( $id, 'warranty', true ));
$productnumber =(get_post_meta( $id, 'product_number', true ) =='Array' ? '' : get_post_meta( $id, 'product_number', true ));

$shipping_cost =(get_post_meta( $id, 'shipping_cost', true ) =='Array' ? '' : get_post_meta( $id, 'shipping_cost', true ));
$shipping_time =(get_post_meta( $id, 'shipping_time', true ) =='Array' ? '' : get_post_meta( $id, 'shipping_time', true ));
$sku =$product->get_sku(); //Cikkszám
				   				   $price =wc_get_price_including_tax($product);//Ha van áfa, az is kell
			$net_price =round(wc_get_price_excluding_tax($product));
			$url  =get_permalink( $id);
						   $category =(get_post_meta( $id, 'woo_prod_category', true ) =='Array' ? '' : get_post_meta( $id, 'woo_prod_category', true ));
						   if (empty($category)) {
							$category ="";
																									   $terms =$this->getCategoryList($id);
																									   			   if (!empty($terms) &&is_array($terms) &&count($terms) >0) {
				foreach ($terms as $termlist) {
					foreach ($termlist as $term) {
					$waruk_category =get_term_meta($term->term_id, "waruk_category", true);
					$waruk_category_hide =get_term_meta($term->term_id, "waruk_category_hide", true);
					if (!empty($waruk_category_hide) &&$waruk_category_hide ==1) {
						return array();
						}
					if (!empty($waruk_category)) {
						$category .=", ".$waruk_category;
						} else {
					$term_meta = get_option("taxonomy_" . $term->term_id);
					if (empty($term_meta['waruk_category_hide']) ||$term_meta['waruk_category_hide'] !='1') {
					
					if (!empty($term_meta['waruk_category'])) {
						$category .=", ".$term_meta['waruk_category'];
						} else {
			   $category.=", ".$term->name;
			   }
			   } elseif (isset($term_meta['waruk_category_hide']) &&$term_meta['waruk_category_hide'] ==1) {
			   return array();
			   }
				   }
			   }
			   }
			   }
				   $category =trim($category, ", ");
										   }
				   				   					$_temp = wp_get_attachment_image_src( get_post_thumbnail_id( $id), 'full' ); //Fotólink
						if ( $_temp ) {
					   $picture_link =wp_get_attachment_url( get_post_thumbnail_id($id) );
						} else {
						$picture_link ="";
						}
						if ($id>0) {
return array(apply_filters("waruk_product", array("title"=>$thetitle, "sku"=>$sku, "id"=>$id, "category" =>$category, "manufacturer" =>$manufacturer, "ean_code" =>$ean_code, "productnumber" =>$productnumber, "net_price" =>$net_price, "price"=>$price, "url" =>$url, "kep" =>$picture_link, "excerpt" =>$excerpt, "warranty" =>$warranty, "shipping_cost" =>$shipping_cost, "shipping_time" =>$shipping_time, "stock" =>$product->get_stock_quantity(), "attributes" =>$attributes)));
}
}

}
return $full_product_list;
}
}
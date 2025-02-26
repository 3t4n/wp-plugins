<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function google_seo_schema_product($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the product values for schema
	$google_seo_product_currency         = get_post_meta( $post->ID, $prefix.'product_currency', true );
	$google_seo_product_auto             = get_post_meta( $post->ID, $prefix.'product_auto', true );
	$google_snippetsproduct_name		 =get_post_meta( $post->ID, $prefix.'product_name', true );
	$google_snippetssku       			 =get_post_meta($post->ID,$prefix.'sku',true);
	$google_snippetsproduct_price		 =get_post_meta($post->ID,$prefix.'product_price',true);
	$google_snippetsproduct_image		 =get_post_meta($post->ID,$prefix.'product_image',true);
	$google_snippetsproduct_category	 =get_post_meta($post->ID,$prefix.'product_category',true);
	$google_snippetsproduct_currency	 =get_post_meta($post->ID,$prefix.'product_currency',true);
	$google_snippetsbrand_name		 	 =get_post_meta($post->ID,$prefix.'brand_name',true);
	$google_snippetsoffer_regular_price	 =get_post_meta($post->ID,$prefix.'offer_regular_price',true);
	$google_snippetsoffer_sale_price	 =get_post_meta($post->ID,$prefix.'offer_sale_price',true);
	$google_snippetsoffer_available_from =get_post_meta($post->ID,$prefix.'offer_available_from',true);
	$google_snippetsoffer_valid_upto     =get_post_meta($post->ID,$prefix.'offer_valid_upto',true);
	$google_snippetsoffer_stock          =get_post_meta($post->ID,$prefix.'offer_stock',true);
	$google_snippetsoffer_condition 	 =get_post_meta($post->ID,$prefix.'offer_condition',true);
	$google_snippetsproduct_seller		 =get_post_meta($post->ID,$prefix.'product_seller',true);
	if(isset($google_seo_product_auto) && ($google_seo_product_auto == "on" )) {
		$auto = "google_auto_";
		
	} else {
		$auto = "google_seo_"; }
	/* ==================================================================================================== */
	$ID = $post->ID;
	if (has_post_thumbnail( $post->ID ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$google_auto_product_image          = $image[0];
	}
	$user_firstname = get_the_author_meta('user_firstname'); // retrieve firstname
	$user_lastname = get_the_author_meta('user_lastname'); // retrieve lastname
	$authdate = get_the_date( 'D M j' );
	$author = get_option('gsas_checked1');
	$date = get_option('gsas_checked2');
	$displ = get_option('gsas_checked4');
	if ($displ == 'checked') {
		$disp = 'block' ;
	} else {
		$disp = 'none' ;
	}
	$google_seo_publish_author = $user_firstname . $user_lastname;
	$google_seo_publish_date = $authdate;
	$google_seo_schema_product = '';
	$google_seo_schema_product .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 100%;height:60%;border-radius: 5px;"><div style="padding:2%;display:block;" itemscope itemtype="https://data-vocabulary.org/Product">';
	$google_seo_schema_product .=    '<span >';
	$product_name = $auto."product_name";
	$product_brand = $auto."brand_name";
	$product_image = $auto."product_image";
	$product_description = $auto."product_description";
	if(isset($google_snippetsproduct_name))
		$google_seo_schema_product .='<div style="float:left;">Product name:<span itemprop="productname">'.$google_snippetsproduct_name.'</span></div>';
	if(isset($google_snippetssku))
		$google_seo_schema_product.="<br>SKU:<span itemprop='sku'>".$google_snippetssku."</span>";
	if(isset($google_snippetsproduct_price	))
		$google_seo_schema_product.="<br>Price:<span itemprop='price'>".$google_snippetsproduct_price."</span>";	
	if(isset($google_snippetsproduct_category))	
		$google_seo_schema_product .="<br>category:<span itemprop='category'>".$google_snippetsproduct_category."</span>";
	if(isset($google_snippetsproduct_currency))
		$google_seo_schema_product.="<br>Currency:<span itemprop='currency'>".$google_snippetsproduct_currency."</span>";
	if(isset($google_snippetsbrand_name))
		$google_seo_schema_product.="<br>Brandname:<span itemprop='brandname'>".$google_snippetsbrand_name."</span>";
	if(isset($google_snippetsoffer_regular_price))
		$google_seo_schema_product.="<br>Regularprice:<span itemprop='regularprice'>".$google_snippetsoffer_regular_price."</span>";
	if(isset($google_snippetsoffer_sale_price))
		$google_seo_schema_product.="<br>saleprice:<span itemprop='saleprice'>".$google_snippetsoffer_sale_price."</span>";
	if(isset($google_snippetsoffer_available_from))
		$google_seo_schema_product.="<br>Offer available from:<span itemprop='offeravailablefrom'>".$google_snippetsoffer_available_from."</span>";
	if(isset($google_snippetsoffer_valid_upto))
		$google_seo_schema_product.="<br>offer valid upto:<span itemprop='validupto'>".$google_snippetsoffer_valid_upto."</span>";
	if(isset($google_snippetsoffer_stock ))
		$google_seo_schema_product.="<br>offer_stock:<span itemprop='stock'>".$google_snippetsoffer_stock ."</span>";
	if(isset($google_snippetsoffer_condition))
		$google_seo_schema_product.="<br>Offer condition:<span itemprop='condition'>".$google_snippetsoffer_condition."</span>";
	if(isset($google_snippetsproduct_seller))
		$google_seo_schema_product.="<br>product seller:<span itemprop='seller'>".$google_snippetsproduct_seller."</span>";

		
if(isset($google_snippetsproduct_image))
	global $wpdb;
	$google_snippetsproduct_image=$wpdb->get_results($wpdb->prepare("SELECT guid FROM {$wpdb->prefix}posts WHERE id=%d ",$google_snippetsproduct_image));
	foreach($google_snippetsproduct_image as $product_image){
		$google_snippetsproduct_image=$product_image->guid;
	}
	if(is_string($google_snippetsproduct_image)){
	$google_seo_schema_product .=' <img  style="width:75px;height:75px;" itemprop="image" src="'.esc_url($google_snippetsproduct_image).'" /><br>';
	}
	//if(isset($product_name))
	//	$google_seo_schema_product .=   "<span style='color: red;font-size: x-large;' itemprop='brand'>".$google_snippetsproduct_name."</span> by <span itemprop='name'>".$google_snippetsbrand_name ."</span><br>";
	if($author == 'checked' && $date == 'checked'){
		$google_seo_schema_product .='<div style="padding-left:19%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	} elseif($author == 'checked'){
		$google_seo_schema_product .='<div style="padding-left:19%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published 
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif($date == 'checked'){
	$google_seo_schema_product .='<div style="padding-left:19%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
		Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
		</div>';
			}
	$google_seo_schema_product .='</div></div>';
	return  $text.$google_seo_schema_product;
	}

function google_seo_schema_add_product() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_schema_product = get_post_meta( $post->ID, $prefix.'product_name', true );

	if($google_seo_schema_product != '' && !is_home() ) {
		add_filter( "the_content", "google_seo_schema_product" );
	}
}
add_action( 'wp', 'google_seo_schema_add_product' );

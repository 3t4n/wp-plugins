<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_software($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the product values for schema
	$google_seo_software_name = get_post_meta( $post->ID, $prefix.'software_name', true );
	$google_seo_software_operationg_systems = get_post_meta( $post->ID, $prefix.'software_operationg_systems', true );
	$google_seo_software_category = get_post_meta( $post->ID, $prefix.'software_category', true );
	$google_seo_software_version = get_post_meta( $post->ID, $prefix.'software_version', true );
	$google_seo_software_image = get_post_meta( $post->ID, $prefix.'software_image', true );
	$google_seo_software_description = get_post_meta( $post->ID, $prefix.'software_description', true );
	$google_seo_software_url = get_post_meta( $post->ID, $prefix.'software_url', true );
	$google_seo_software_author = get_post_meta( $post->ID, $prefix.'software_author', true );
	$google_seo_software_reveiws = get_post_meta( $post->ID, $prefix.'software_reveiws', true );
	//$google_seo_software_aggregate_rating = get_post_meta( $post->ID, $prefix.'software_aggregate_rating', true );
	//$google_seo_software_aggregate_rating_count = get_post_meta( $post->ID, $prefix.'software_aggregate_rating_count', true );
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
	$google_seo_software_price = get_post_meta( $post->ID, $prefix.'software_price', true );
	$google_seo_software_price_currency = get_post_meta( $post->ID, $prefix.'software_price_currency', true );
	$smack_google_seo_schema_software ="";
	$smack_google_seo_schema_software .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"><div style="padding:2%;display: block;" itemscope itemtype="https://schema.org/SoftwareApplication">';
	if(isset($google_seo_software_image))
		$smack_google_seo_schema_software .= '<img style="width:25%;float:right;" itemprop="image" src="'.$google_seo_software_image.'"/>';
	if(isset($google_seo_software_name))
		$smack_google_seo_schema_software .= '<span itemprop="name">'.$google_seo_software_name.'</span> <br>';

	$smack_google_seo_schema_software .= 'REQUIRES : <span itemprop="operatingSystem">'.$google_seo_software_operationg_systems.'</span> <span itemprop="SoftwareVersion">'.$google_seo_software_version.'</span> <br>';

	// Aggregate Rating
	$smack_google_seo_schema_software .= '<link itemprop="applicationCategory" href="https://schema.org/' .$google_seo_software_category . '"/><span>category:'.$google_seo_software_category.'</span><br>';
	$smack_google_seo_schema_software.='Description:<span itemprop="description">'.$google_seo_software_description.'</span><br>';
	$smack_google_seo_schema_software.='software url:<a href="'.$google_seo_software_url.'"itemprop="software url">Link</a><br>';
	$smack_google_seo_schema_software.='Author:<span itemprop="author">'.$google_seo_software_author.'</span><br>';
	$smack_google_seo_schema_software.='Reviews:<span itemprop="reveiws">'.$google_seo_software_reveiws.'</span><br>';
	//$smack_google_seo_schema_software .= '<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">';
//	$smack_google_seo_schema_software .= '<span itemprop="ratingValue">'.$google_seo_software_aggregate_rating.'</span>  <span itemprop="ratingCount">'.$google_seo_software_aggregate_rating_count.'</span> '.$google_seo_software_aggregate_rating.'</span><br>';
	$smack_google_seo_schema_software .= "</div>";

	// Offer - Price & Price Currency
	$smack_google_seo_schema_software .= '<div itemprop="offers" itemscope itemtype="https://schema.org/Offer">';
	if(isset($google_seo_software_price))
	$smack_google_seo_schema_software .= ' Price: <span itemprop="price">'.$google_seo_software_price.'</span><br>';
	$smack_google_seo_schema_software .= 'Currency:<span itemprop="priceCurrency">'. $google_seo_software_price_currency .' </span>';
	$smack_google_seo_schema_software .= '</div>';


	if($author == 'checked' && $date == 'checked'){
		$smack_google_seo_schema_software .= '<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif($author == 'checked'){
		$smack_google_seo_schema_software .= '<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published 
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif( $date == 'checked'){
		$smack_google_seo_schema_software .= '<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			</div>';
	}
	$smack_google_seo_schema_software .= '</div></div>';
	return $text.$smack_google_seo_schema_software;

}

function smack_google_seo_schema_add_software() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_software_name = get_post_meta( $post->ID, $prefix.'software_name', true );
	if( $google_seo_software_name != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_software" );
	}
}
add_action( 'wp', 'smack_google_seo_schema_add_software' );

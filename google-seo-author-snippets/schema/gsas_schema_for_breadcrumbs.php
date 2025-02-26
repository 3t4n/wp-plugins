<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_breadcrumbs($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the product values for schema
	$google_seo_bread_name1 = get_post_meta( $post->ID, $prefix.'bread_name1', true );
	$google_seo_bread_image1 = get_post_meta( $post->ID, $prefix.'bread_image1', true );
	$google_seo_bread_url1 = get_post_meta( $post->ID, $prefix.'bread_url1', true );
	$google_seo_bread_name2 = get_post_meta( $post->ID, $prefix.'bread_name2', true );
	$google_seo_bread_url2=get_post_meta( $post->ID, $prefix.'bread_url2', true );
	$google_seo_bread_name3 = get_post_meta( $post->ID, $prefix.'bread_name3', true );
	$google_seo_bread_url3 = get_post_meta( $post->ID, $prefix.'bread_url3', true );
	$user_firstname = get_the_author_meta('user_firstname'); // retrieve firstname
	$user_lastname = get_the_author_meta('user_lastname'); // retrieve lastname
	$authdate = get_the_date( 'D M j' );
	$google_seo_bread_author = $user_firstname . $user_lastname;
	$google_seo_bread_date = $authdate;
	$author = get_option('gsas_checked1');
	$date = get_option('gsas_checked2');
	$displ = get_option('gsas_checked4');
	if ($displ == 'checked') {
		$disp = 'block' ;
	} else {
		$disp = 'none' ;
	}


	$smack_google_seo_schema_breadcrumbs = '';
	$smack_google_seo_schema_breadcrumbs .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 100%;height:60%;border-radius: 5px;">  
		<div itemscope itemtype="https://schema.org/WebPage">
		<img style="border-radius: 5px 5px 0 0;max-width: 38% ! important;"itemprop="image" src="'. $google_seo_bread_image1 .'" width:"50" height:"50"/><br>
		<span id="breadcrumbs" itemprop="breadcrumb">
		<a rel="home" href="'.$google_seo_bread_url1.'">
		<span>'. $google_seo_bread_name1.'</span>
		</a> » 
		<span>
		<a href="'.$google_seo_bread_url2.'">
		<span>'.$google_seo_bread_name2.'</span>
		</a> » 
		<span>
		<a href="'.$google_seo_bread_url3.'">
		<span>'.$google_seo_bread_name3.'</span>
		</a>
		</span>
		</span>
		</span>
		</div>';
	if($author == 'checked' && $date == 'checked') {
		$smack_google_seo_schema_breadcrumbs .= '<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on <span itemprop="published Date">'.$google_seo_bread_date.'</span>
			by <span itemprop="auhtor Name">'.$google_seo_bread_author.'</span></div>';
	}
	$smack_google_seo_schema_breadcrumbs .= '</div>';
	return $text.$smack_google_seo_schema_breadcrumbs;
}
function smack_google_seo_schema_add_breadcrumbs() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_bread_name1 = get_post_meta( $post->ID, $prefix.'bread_name1', true );
	if( $google_seo_bread_name1 != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_breadcrumbs" );
	}
}
add_action('wp', 'smack_google_seo_schema_add_breadcrumbs');

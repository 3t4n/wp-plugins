<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_people($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the product values for schema
	$google_seo_people_name          = get_post_meta( $post->ID, $prefix.'people_name', true );
	$google_seo_people_nick_name     = get_post_meta( $post->ID, $prefix.'people_nick_name', true );
	$google_seo_people_home_page_url = get_post_meta( $post->ID, $prefix.'people_home_page_url', true );
	$google_seo_people_locality     = get_post_meta( $post->ID, $prefix.'peoeple_locality', true );
	$google_seo_people_street_address=get_post_meta($post->ID,$prefix.'people_street_address',true);
	$google_seo_people_region        = get_post_meta( $post->ID, $prefix.'people_region', true );
	$google_seo_people_postal_code   = get_post_meta( $post->ID, $prefix.'people_postal_code', true );
	$google_seo_people_country_name   = get_post_meta( $post->ID, $prefix.'people_country_name', true );
	$google_seo_people_title         = get_post_meta( $post->ID, $prefix.'people_title', true );
	$google_seo_people_role			 =get_post_meta( $post->ID, $prefix.'people_role', true );
	$google_seo_people_affliation    = get_post_meta( $post->ID, $prefix.'people_affliation', true );
	$google_seo_people_friend_name   = get_post_meta( $post->ID, $prefix.'people_friend_name', true );
	$google_seo_people_friend_url    = get_post_meta( $post->ID, $prefix.'people_friend_url', true );
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
	$smack_google_seo_schema_people = '';
	$smack_google_seo_schema_people .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"><div style="display:block;" itemscope itemtype="https://data-vocabulary.org/Person">';
	$smack_google_seo_schema_people .= '<span >';
	if(isset($google_seo_people_name))
		$smack_google_seo_schema_people .= 'My name is <span itemprop="name">'.$google_seo_people_name.'</span>, ';
	if(isset($google_seo_people_nick_name))
		$smack_google_seo_schema_people .= 'but people call me <span itemprop="nickname">'.$google_seo_people_nick_name.'</span>.<br>
		Here is my homepage: ';
	if(isset($google_seo_people_home_page_url))
		$smack_google_seo_schema_people .= '<a href="'.esc_url($google_seo_people_home_page_url).'" itemprop="url">Link</a>. <br>My Address';
	$smack_google_seo_schema_people .= '<span itemprop="address" itemscope itemtype="https://data-vocabulary.org/Address">';
	if(isset($google_seo_people_street_address))
	$smack_google_seo_schema_people .= '<span itemprop="streetaddress">'.$google_seo_people_street_address.'</span>, ';
	if(isset($google_seo_people_locality))
		$smack_google_seo_schema_people .= '<span itemprop="locality">'.$google_seo_people_locality.'</span>, ';
	if(isset($google_seo_people_region))
		$smack_google_seo_schema_people .= '<span itemprop="region">'.$google_seo_people_region.'</span>,';
	if(isset($google_seo_people_postal_code))
		$smack_google_seo_schema_people .= '<span itemprop="postalcode">'.$google_seo_people_postal_code.'</span>,<br>';	
	if(isset($google_seo_people_country_name))
		$smack_google_seo_schema_people .= '<span itemprop="countryname">'.$google_seo_people_country_name.'</span>.<br>';	
	if(isset($google_seo_people_role))
		$smack_google_seo_schema_people .='my role <span itemprop="role">'.$google_seo_people_role.'</span>';
	if(isset($google_seo_people_title))
		$smack_google_seo_schema_people .= 'and work as an <span itemprop="title">'.$google_seo_people_title.'</span>';
	
	if(isset($google_seo_people_affliation))
		$smack_google_seo_schema_people .= ' at <span itemprop="affiliation">'.$google_seo_people_affliation.'</span>.';
	if(isset($google_seo_people_friend_url))
		$smack_google_seo_schema_people .= '<a href="'.esc_url($google_seo_people_friend_url).'" rel="friend">'.$google_seo_people_friend_name.'</a>';
	$smack_google_seo_schema_people .= '</span>';
	if($author == 'checked' && $date == 'checked'){
		$smack_google_seo_schema_people .='<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif($author == 'checked'){
	$smack_google_seo_schema_people .='<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
		Published 
		by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
			}elseif($date == 'checked'){
			$smack_google_seo_schema_people .='<div style="padding-left:10%;" itemprop="author" itemscope itemtype="https://schema.org/Author">
				Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
				</div>';
		}
	$smack_google_seo_schema_people .='</div></div>';
	return $text.$smack_google_seo_schema_people;
}

function smack_google_seo_schema_add_people() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_people_name = get_post_meta( $post->ID, $prefix.'people_name', true );
	if( $google_seo_people_name != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_people" );
	}
}
add_action( 'wp', 'smack_google_seo_schema_add_people' );

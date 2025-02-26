<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_organisation($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the product values for schema
	$google_seo_organisation_name = get_post_meta( $post->ID, $prefix.'organisation_name', true );
	$google_seo_organisation_url = get_post_meta( $post->ID, $prefix.'organisation_url', true );
	$google_seo_organisation_street_address = get_post_meta( $post->ID, $prefix.'organisation_street_address', true );
	$google_seo_organisation_address_locality = get_post_meta( $post->ID, $prefix.'organisation_address_locality', true );
	$google_seo_organisation_address_region = get_post_meta( $post->ID, $prefix.'organisation_address_region', true );
	$google_seo_organisation_postal_code=get_post_meta( $post->ID, $prefix.'organisation_postal_code', true );
	$google_seo_organisation_country = get_post_meta( $post->ID, $prefix.'organisation_country', true );
	$google_seo_organisation_telephone = get_post_meta( $post->ID, $prefix.'organisation_telephone', true );
	$google_seo_organisation_logo = get_post_meta( $post->ID, $prefix.'organisation_logo', true );
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
	$smack_google_seo_schema_organisation = '';
	$smack_google_seo_schema_organisation .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"><div style="padding:2%;display:block;" vocab="https://schema.org/" typeof="Organization"> ';
	$smack_google_seo_schema_organisation .= '<span >';
	if(isset($google_seo_organisation_name))
		$smack_google_seo_schema_organisation .= '<span style="color:red;" property="name">'.$google_seo_organisation_name.'</span><br>';
	if(isset($google_seo_organisation_logo))
		$smack_google_seo_schema_organisation .='<img style="float:right;width:20%;" property="logo" src="'.$google_seo_organisation_logo.'" />';
	$smack_google_seo_schema_organisation .= 'Located at: <div property="address" typeof="PostalAddress">';
	if(isset($google_seo_organisation_street_address))
		$smack_google_seo_schema_organisation .='<span property="streetAddress">'.$google_seo_organisation_street_address.'</span>,';
	if(isset($google_seo_organisation_address_locality))
		$smack_google_seo_schema_organisation .= '<span property="addressLocality">'.$google_seo_organisation_address_locality.'</span>,<br>';
	if(isset($google_seo_organisation_address_region))
		$smack_google_seo_schema_organisation .= '<span property="addressRegion">'.$google_seo_organisation_address_region.'</span>-';
	if(isset($google_seo_organisation_postal_code))
		$smack_google_seo_schema_organisation .='<span property="postal code">'.$google_seo_organisation_postal_code.'</span>,<br>';
	if(isset($google_seo_organisation_country))
		$smack_google_seo_schema_organisation .='<span property="country">'.$google_seo_organisation_country.'</span>.<br>';
		$smack_google_seo_schema_organisation .= '</div>';

	if(isset($google_seo_organisation_telephone))
		$smack_google_seo_schema_organisation .= 'Phone: <span property="telephone">'.$google_seo_organisation_telephone.'</span><br>';
	if(isset($google_seo_organisation_url))
		$smack_google_seo_schema_organisation .= '<a href="'.esc_url($google_seo_organisation_url).'" property="url">Link</a>';
	$smack_google_seo_schema_organisation .= '</span>';

	if($author == 'checked' && $date == 'checked'){
		$smack_google_seo_schema_organisation .=' <div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif($author == 'checked'){
		$smack_google_seo_schema_organisation .=' <div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published 
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif( $date == 'checked'){
		$smack_google_seo_schema_organisation .=' <div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			</div>';
	}
	$smack_google_seo_schema_organisation .= ' </div></div>';
	return $text.$smack_google_seo_schema_organisation;
}

function smack_google_seo_schema_add_org() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_org_name = get_post_meta( $post->ID, $prefix.'organisation_name', true );
	if( $google_seo_org_name != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_organisation" );
	}
}
add_action( 'wp', 'smack_google_seo_schema_add_org' );

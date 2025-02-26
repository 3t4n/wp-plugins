<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_review($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the review values for schema
	$google_seo_item_reviewed            = get_post_meta( $post->ID, $prefix.'review_item_reviewed', true );
	$google_seo_review_rating            = get_post_meta( $post->ID, $prefix.'review_rating', true );
	$google_seo_review_reviewer          = get_post_meta( $post->ID, $prefix.'review_reviewer', true );
	$google_seo_review_date_reviewed     = get_post_meta( $post->ID, $prefix.'review_date_reviewed', true );
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
	$google_seo_review_description       = get_post_meta( $post->ID, $prefix.'review_description', true );
	$google_seo_review_summary           = get_post_meta( $post->ID, $prefix.'review_summary', true );
	$smack_google_seo_schema_review  =  '';
	$smack_google_seo_schema_review .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"><div style="padding:2%;display:block;" itemscope itemtype="https://data-vocabulary.org/Review">';
	$smack_google_seo_schema_review .= '<span>';
	if(isset($google_seo_item_reviewed))
		$smack_google_seo_schema_review .= '<span style="color:red;padding-left:30%;" itemprop="itemreviewed">'.$google_seo_item_reviewed.'</span><br>';
	if(isset($google_seo_review_reviewer))
		$smack_google_seo_schema_review .= 'Reviewed by <span itemprop="reviewer">'.$google_seo_review_reviewer.'</span> on';
	if(isset($google_seo_review_date_reviewed))
		$smack_google_seo_schema_review .= '<time itemprop="dtreviewed" datetime="'.$google_seo_review_date_reviewed.'">'.$google_seo_review_date_reviewed.'</time>.<br>Summary:';
	if(isset($google_seo_review_summary))
		$smack_google_seo_schema_review .= '<span itemprop="summary">'.$google_seo_review_summary.'</span><br><br>Description:';
	if(isset($google_seo_review_description))
		$smack_google_seo_schema_review .= '<span itemprop="description">'.$google_seo_review_description.' </span><br>';
	if(isset($google_seo_review_rating))
		$smack_google_seo_schema_review .= 'Rating: <span itemprop="rating">'.$google_seo_review_rating.'</span>';
	$smack_google_seo_schema_review .= ' </span>';
	if($author == 'checked' && $date == 'checked'){
		$smack_google_seo_schema_review .=' <div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif($author == 'checked'){
	$smack_google_seo_schema_review .=' <div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
		Published 
		by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
			}elseif( $date == 'checked'){
			$smack_google_seo_schema_review .=' <div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
				Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
				</div>';
		}
	$smack_google_seo_schema_review .='</div>';
	return $text.$smack_google_seo_schema_review;

}
function smack_google_seo_schema_add_review() {
	global $post;
	$prefix = 'google_snippets';
	$smack_google_seo_schema_review = get_post_meta( $post->ID, $prefix.'review_item_reviewed', true );
	if($smack_google_seo_schema_review != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_review" );
	}
}
add_action( 'wp', 'smack_google_seo_schema_add_review' );

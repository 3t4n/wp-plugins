<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_videos($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the product values for schema
	$google_seo_video_title          = get_post_meta( $post->ID, $prefix.'video_name', true );
	$google_seo_video_image_src      = get_post_meta( $post->ID, $prefix.'video_image_src', true );
	$google_seo_video_video_src      = get_post_meta( $post->ID, $prefix.'video_video_src', true );
	$google_seo_upload_date          = get_post_meta( $post->ID, $prefix.'upload_date', true );
	$google_seo_video_description    = get_post_meta( $post->ID, $prefix.'video_description', true );
	$google_seo_video_duration       = get_post_meta( $post->ID, $prefix.'video_duration', true );
	$google_seo_embed_url            = get_post_meta( $post->ID, $prefix.'embed_url', true );
	$google_seo_video_interaction_count = get_post_meta( $post->ID, $prefix.'interactionCount', true );
	$google_seo_video_expire_date = get_post_meta( $post->ID, $prefix.'expire_date', true );
	$google_seo_video_type=get_post_meta( $post->ID, $prefix.'video_type', true );
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
	$smack_google_seo_schema_videos = '';
	$smack_google_seo_schema_videos .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"><div style="padding:2%;" itemscope itemtype="https://schema.org/VideoObject">';
	if(isset($google_seo_video_title))
		$smack_google_seo_schema_videos .= '<span itemprop="name">' . $google_seo_video_title . '</span><br>';
	if(isset($google_seo_video_image_src))
		$smack_google_seo_schema_videos .= '<img style="width:30%;float:right;" itemprop="thumbnailUrl" src="'.$google_seo_video_image_src.'"/><br>';
	if(isset($google_seo_video_description))
		$smack_google_seo_schema_videos .= '<span itemprop="description">' . $google_seo_video_description . '</span><br>';

	if(isset($google_seo_upload_date))
		$smack_google_seo_schema_videos .= '<meta itemprop="uploadDate" content="' . $google_seo_upload_date . '" /><span>Upload Date:'.$google_seo_upload_date.'</span><br>' ;
	if(isset($google_seo_video_expire_date))
		$smack_google_seo_schema_videos .='<meta itemprop="expiredate" content="'.$google_seo_video_expire_date.'"/><span>Expire Date:'.$google_seo_upload_date.'</span><br>';
	if(isset($google_seo_video_duration))
		$smack_google_seo_schema_videos .=' <meta itemprop="duration" content="'.$google_seo_video_duration.'" /><span>Duration:'.$google_seo_video_duration.'</span><br>';
	if(isset($google_seo_video_video_src))
		$smack_google_seo_schema_videos .= '<link itemprop="contentURL" href="' . $google_seo_video_video_src . '"/><span>Video:<a href="'.$google_seo_video_video_src.'">Link</a><br>';
	if(isset($google_seo_embed_url))
		$smack_google_seo_schema_videos .= '<link itemprop="embedURL" href="' . $google_seo_embed_url . '" /><span>Embed Url:<a href="'.$google_seo_embed_url.'">Link</a><br>';
	if(isset($google_seo_video_interaction_count))
		$smack_google_seo_schema_videos .= '<meta itemprop="interactionCount" content="' . $google_seo_video_interaction_count . '" /><span>Interaction Count:'.$google_seo_video_interaction_count.'</span><br>';
	if(isset($google_seo_video_type))
		$smack_google_seo_schema_videos .='<meta itemprop="video type" content="'.$google_seo_video_type.'"/><span>video type:'.$google_seo_video_type.'</span><br>';


	if($author == 'checked' && $date == 'checked'){
		$smack_google_seo_schema_videos .= '<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif($author == 'checked'){
	$smack_google_seo_schema_videos .= '<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
		Published 
		by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
			}elseif($author == 'checked' && $date == 'checked'){
			$smack_google_seo_schema_videos .= '<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
				Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
				</div>';
		}

	$smack_google_seo_schema_videos .= '</div></div>';
	return $text.$smack_google_seo_schema_videos;
}

function smack_google_seo_schema_add_video() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_video_name = get_post_meta( $post->ID, $prefix.'video_name', true );
	if( $google_seo_video_name != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_videos" );
	}
}
add_action( 'wp', 'smack_google_seo_schema_add_video' );

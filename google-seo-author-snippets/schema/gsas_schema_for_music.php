<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function smack_google_seo_schema_music($text) {
	global $post;
	$prefix = 'google_snippets';
	// Get the Music values for schema
	$google_seo_music_group = get_post_meta( $post->ID, $prefix.'music_group', true );
	$google_seo_track_name = get_post_meta( $post->ID, $prefix.'track_name', true );
	$google_seo_track_length = get_post_meta( $post->ID, $prefix.'track_length', true );
	$google_seo_play_count = get_post_meta( $post->ID, $prefix.'play_count', true );
	$google_seo_play_url = get_post_meta( $post->ID, $prefix.'play_url', true );
	$google_seo_buy_url = get_post_meta( $post->ID, $prefix.'buy_url', true );
	$google_seo_album_name = get_post_meta( $post->ID, $prefix.'album_name', true );
	$google_seo_album_link = get_post_meta( $post->ID, $prefix.'album_link', true );
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
	$smack_google_seo_schema_music = '';
	$smack_google_seo_schema_music .= '<div style="display:'.$disp.';box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);  transition: 0.3s;width: 80%;height:60%;border-radius: 5px;"> <div style="display: block;" itemscope itemtype="https://schema.org/MusicGroup">';
	$smack_google_seo_schema_music .= '<span >';
	if(isset($google_seo_music_group)){
		$smack_google_seo_schema_music .= '<h1 itemprop="name">'.$google_seo_music_group.'</h1>';
	}
	$smack_google_seo_schema_music .= '<h2>Songs</h2>
		<div itemprop="tracks" itemscope itemtype="https://schema.org/MusicRecording">';
	if(isset($google_seo_track_name)){
		$smack_google_seo_schema_music .= '<span style="float:left;color:blue;font-style:italic;" itemprop="name">'.$google_seo_track_name.'</span><br>';
	}
	if(isset($google_seo_album_link) || isset($google_seo_album_name)){
		$smack_google_seo_schema_music .= 'From album: <a href="'.esc_url($google_seo_album_link).'" itemprop="inAlbum">'.$google_seo_album_name.'</a><br>';
	}
	if(isset($google_seo_track_length) || isset($google_seo_play_count )){
		$smack_google_seo_schema_music .= 'Length: <meta itemprop="duration" content="PT6M33S" />'.$google_seo_track_length.'-'.$google_seo_play_count ;
	}
	if(isset($google_seo_play_count)){
		$smack_google_seo_schema_music .= '<meta itemprop="interactionCount" content="UserPlays:'.$google_seo_play_count.'"/><br>';
	}
	if(isset($google_seo_play_url)){
		$smack_google_seo_schema_music .= '<a href="'.esc_url($google_seo_play_url).'" itemprop="audio">Play</a>';
	}
	if(isset($google_seo_buy_url)){
		$smack_google_seo_schema_music .= ' <a href="'.esc_url($google_seo_buy_url).'" itemprop="offers">Buy</a><br>';
	}

	$smack_google_seo_schema_music .= '</div>  ';
	if(isset($google_seo_album_link)){
		$smack_google_seo_schema_music .= '<a href="'.esc_url($google_seo_album_link).'" itemprop="url">Album Link</a>';
	}
	$smack_google_seo_schema_music .= ' </span>';
	if($author == 'checked' && $date == 'checked'){ 
		$smack_google_seo_schema_music .='<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}

	elseif($author == 'checked' ){ 
		$smack_google_seo_schema_music .='<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published 
			by<span itemprop="auhtor Name">'.$google_seo_publish_author.'</span></div>';
	}elseif( $date == 'checked'){ 
		$smack_google_seo_schema_music .='<div style="padding-left:10%;" itemprop="address" itemscope itemtype="https://schema.org/Author">
			Published on<span itemprop="published Date">'.$google_seo_publish_date.'</span>
			</div>';
	}

	$smack_google_seo_schema_music .= '</div></div>';
	return  $text.$smack_google_seo_schema_music;
}

function smack_google_seo_schema_add_music() {
	global $post;
	$prefix = 'google_snippets';
	$google_seo_music_name = get_post_meta( $post->ID, $prefix.'music_group', true );
	if( $google_seo_music_name != '' && !is_home() ) {
		add_filter( "the_content", "smack_google_seo_schema_music" );
	}
}
add_action( 'wp', 'smack_google_seo_schema_add_music' );


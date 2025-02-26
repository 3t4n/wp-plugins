<?php 
/**
Plugin Name: List YouTube Channel Videos
Plugin URI: https://wordpress.org/plugins/list-youtube-channel-videos/
Description: Provide shortcode to show youtube videos of channel into website and play youtube videos directly from website. Use Shortcode [youtube-list-channel-videos id="UCrdpnS5Uz2MijaX9-5vJR4g" number="16"] (Replace my channel id to your channel ID & number to show number if videos, Default is 12 video).
Author: Girdhari choyal
Version: 1.0
Author URI: https://www.ninjatechnician.com/
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function nysb_shortcode_youtube_videos( $attr ){
	
	$channelID = sanitize_text_field( $attr['id'] );
	$number = intval( $attr['number'] );
	
	if( isset( $number ) && $number>0 ){
		$maxResults = $number;
	}else{
		$maxResults = 12;
	}
	
	$API_key    = 'AIzaSyCLCC30vgv3jTDQ1OQ637aKLRuTnWNBmp4';
	
	if( isset( $channelID ) && $channelID!='' ){
	
		$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));	
		 
		$html = '<div id="youtubevideo-slider" class="youtubevideo-slider">';
		
		foreach($videoList->items as $item){
			
			if(isset($item->id->videoId)){
			
			$html .= '<div class="youtubevideo-item" title="'. $item->snippet->title .'">
			
				<div class="wpb_video_wrapper">
					<div class="iframe-embed">
						<iframe src="https://www.youtube.com/embed/'.$item->id->videoId.'?feature=oembed&amp;wmode=transparent" gesture="media" allow="encrypted-media" allowfullscreen="" data-aspectratio="0.562962962962963" style="width: 458px; height: 257.837px; opacity: 1; visibility: visible;" frameborder="0"></iframe>
					</div>
				</div>
				
			</div>';
			
			}
		
		}
		
		$html .= '</div>';
		return $html;
		
	}else{
	
		$html = '<p>Please enter YouTube channel ID(Found in YouTube channel URL) in Youtube List Video Shortcode.</p>';
		
	}
	
}
add_shortcode('youtube-list-channel-videos', 'nysb_shortcode_youtube_videos');
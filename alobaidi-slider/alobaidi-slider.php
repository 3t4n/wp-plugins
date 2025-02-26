<?php
/*
Plugin Name: Alobaidi Slider
Plugin URI: http://wp-plugins.in/alobaidi-slider
Description: Beautiful slider, responsive and retina, autoplay, touch devices, youtube, vimeo, keek, and instagram image support, slider widget, easy to use, compatible with all major browsers.
Version: 1.0.0
Author: Alobaidi
Author URI: http://wp-plugins.in
License: GPLv2 or later
*/

/*  Copyright 2015 Alobaidi (email: wp-plugins@outlook.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function alobaidi_slider_plugin_row_meta( $links, $file ) {

	if ( strpos( $file, 'alobaidi-slider.php' ) !== false ) {
		
		$new_links = array(
						'<a href="http://wp-plugins.in/alobaidi-slider" target="_blank">Explanation of Use</a>',
						'<a href="https://profiles.wordpress.org/alobaidi#content-plugins" target="_blank">More Plugins</a>',
						'<a href="http://j.mp/ET_WPTime_ref_pl" target="_blank">Elegant Themes</a>'
					);
		
		$links = array_merge( $links, $new_links );
		
	}
	
	return $links;
	
}
add_filter( 'plugin_row_meta', 'alobaidi_slider_plugin_row_meta', 10, 2 );


include( plugin_dir_path(__FILE__).'/shortcodes-page.php' ); // Include shortcodes page
include( plugin_dir_path(__FILE__).'/widget.php' ); // Include alobaidi slider widget


// Include javascript and style
function alobaidi_slider__js_css(){		
	wp_enqueue_style( 'alobaidi-slider-style', plugins_url( '/css/alobaidi-slider-style.css', __FILE__ ), false, false);
	wp_enqueue_script( 'alobaidi-slider-script', plugins_url( '/js/alobaidi-slider-script.js', __FILE__ ), array('jquery'), false, false);
}
add_action('wp_enqueue_scripts', 'alobaidi_slider__js_css');


// Add alobaidi slider shortcode
function alobaidi_slider_( $atts, $content = null ) { 
	Extract(
		shortcode_atts(
			array(
				"width" 	=> 	"",
				"height" 	=> 	"",
				"margin_bottom"  =>  "",
				"auto" 		=> 	"false",
				"time" 		=> 	"3",
				"move" 		=> 	"Right"
			),$atts
		)
	);
	
	if( !empty($width) and !empty($margin_bottom) ){
		$wrap_style = ' style="max-width:'.$width.'px; margin-bottom:'.$margin_bottom.'px;"';
	}elseif( !empty($width) and empty($margin_bottom) ){
		$wrap_style = ' style="max-width:'.$width.'px;"';
	}elseif( empty($width) and !empty($margin_bottom) ){
		$wrap_style = ' style="margin-bottom:'.$margin_bottom.'px;"';
	}else{
		$wrap_style = null;
	}
	
	if( !empty($height) ){
		$height_style = ' style="height:'.$height.'px;padding-bottom:0;"';
	}else{
		$height_style = null;
	}
	
	if( $auto == "true" ){
		$slider_control = null;
		$id = rand().'-autoslider';
	}else{
		$slider_control = '<i class="alobaidi_slider_next"></i><i class="alobaidi_slider_prev"></i>';
		$id = 'alobaidi-slider-standard-slider';
	}
	
	if( $move == "left" or $move == "Left" ){
		$move = "Left";
	}else{
		$move = "Right";
	}
	
	$clean_content = strip_tags($content);
	
	ob_start();
    ?>
    	<div id="<?php echo $id; ?>" class="alobaidi_slider_wrap"<?php echo $wrap_style; ?>>
    		<div class="alobaidi_slider_content"<?php echo $height_style; ?>>
    			<ul id="alobaidi_slider" class="alobaidi_slider_list"><?php echo do_shortcode($clean_content); ?></ul>
				<?php echo $slider_control; ?>
    		</div>
    	</div>
    
    	<?php if($auto == "true") : ?>
			<script type="text/javascript">
				setInterval(function() { 
					if( !jQuery('#<?php echo $id; ?>.alobaidi_slider_wrap').is(':hover') ){
						jQuery('#<?php echo $id; ?>.alobaidi_slider_wrap ul li:first-child')
						.addClass('animated fadeIn<?php echo $move;?>')
						.next().addClass('animated fadeIn<?php echo $move;?>')
						.end()
						.appendTo('#<?php echo $id; ?>.alobaidi_slider_wrap ul');
					}
				}, <?php echo $time; ?>000);
			</script>
        <?php endif; ?>
        
    <?php
	return ob_get_clean();
}
add_shortcode("alobaidislider_w", "alobaidi_slider_");


// Add content shortcode for alobaidislider_w shortcode
function alobaidi_slider__content( $atts, $content = null ) { 
	Extract(
		shortcode_atts(
			array(
				"url"			=>	"",
				"img"			=>	"",
				"before_img"	=>	"",
				"cap"			=>	"",
				"before_cap"	=>	"",
				"video"			=>	""
			),$atts
		)
	);
	
	$the_list 		= 	null;
	$img_before_o 	= 	null;
	$img_before_c 	= 	null;
	$the_cap 		= 	null;

	$vimeo_regex = '/(https?:\/\/vimeo.com\/)|(www.vimeo.com\/)|(vimeo.com\/)|(https?:\/\/www.vimeo.com\/)/';
	$youtube_regex = '/(https?:\/\/youtube.com\/watch)|(www.youtube.com\/watch)|(youtube.com\/watch)|(https?:\/\/www.youtube.com\/watch)|(https?:\/\/youtu.be)|(www.youtu.be)|(youtu.be)|(https?:\/\/www.youtu.be)/';
	$instagram_regex = '/(https?:\/\/instagram.com\/p)|(www.instagram.com\/p)|(instagram.com\/p)|(https?:\/\/www.instagram.com\/p)|(https?:\/\/instagr.am\/p)|(www.instagr.am\/p)|(instagr.am\/p)|(https?:\/\/www.instagr.am\/p)/';
	
	if( !empty($url) or !empty($img) or !empty($video) ){
		if( !empty($img) ){
			$url = $img;
		}
		
		if( !empty($video) ){
			$url = $video;
		}
		
		if( preg_match($vimeo_regex, $url) ){
			$protocol 	= array('http://', 'https://', 'www.', 'vimeo.com', '/');
			$str_replace = str_replace($protocol, '', $url);
			$video_link = preg_replace('/[a-zA-Z]/', '', $str_replace);
			$the_list = '<iframe src="http://player.vimeo.com/video/'.$video_link.'"></iframe>';
		}
		
		elseif( preg_match($youtube_regex, $url) ){
			$protocol 	= array('http://', 'https://', 'www.', 'youtube.com', 'youtu.be', 'embed', 'watch?v=', '/');
			$str_replace = str_replace($protocol, '', $url);
			$video_link = preg_replace( array('/[^&?]*?=[^&?]*/', '/[(&)]/'), '', $str_replace );
			$the_list = '<iframe src="http://youtube.com/embed/'.$video_link.'"></iframe>';
		}
		
		elseif( preg_match("/(keek.com)+/", $url) ){
			$regex = array("/.*\\/(?=[^\\/]*\\/)|\\//m");
			$preg_replace = preg_replace($regex, "", $url);
			$str_replace = str_replace("keek", "", $preg_replace);
			$embed_link = "https://www.keek.com/keek/$str_replace/embed?autoplay=0&mute=0&controls=1&loop=0";
			$the_list = '<iframe src="'.$embed_link.'"></iframe>';
		}
		
		elseif( preg_match($instagram_regex, $url) ){
			$regex = array("/[^&?]*?=[^&?]*/", "/[(?)]/", "/(\/p\/)/");
			$preg_replace = preg_replace($regex, "", $url);
			$protocol = array('http://', 'https://', 'www.', 'instagram.com', 'instagr.am', '/');
			$str_replace = str_replace($protocol, "", $preg_replace);
			$instagram_image_link = 'https://instagram.com/p/'.$str_replace.'/media?size=l';
			$the_list = '<img src="'.$instagram_image_link.'">';
		}
		
		else{
			$img = $url;
			$the_list = '<img src="'.$img.'">';
			
			if( !empty($before_img) ){
				$img_before_o = '<a target="_blank" href="'.$before_img.'">';
				$img_before_c = '</a>';
			}else{
				$img_before_o = null;
				$img_before_c = null;
			}
			
			if( !empty($cap) ){
				$the_cap = '<p class="alobaidi_slider_caption">'.$cap.'</p>';
			}elseif( !empty($before_cap) and !empty($cap) ){
				$the_cap = '<p class="alobaidi_slider_caption"><a href="'.$before_cap.'">'.$cap.'</a></p>';
			}else{
				$the_cap = null;
			}
		}
		
		$result = $img_before_o.$the_list.$img_before_c.$the_cap;
		return '<li>'.$result.'</li>';
	}
	
}
add_shortcode("alobaidislider_c", "alobaidi_slider__content");

?>
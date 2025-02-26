<?php
/*
Plugin Name: Achilles Shortcodes
Plugin URI: http://www.achillestheme.com/shortcodes
Description: I made these for the blog theme I was building, and decided to put them into a plugin for easier use when switching themes. Theres 8 total shortcodes included.
Version:     0.1
Author:      Joey Straile
Author URI:  http://www.achillestheme.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function achilles_col_size($atts, $content, $ignore_html = false){
	$atts = shortcode_atts(
		array(
			'size' 		=> ''
		), $atts
	);

	$display = '';
	//the display output

	if( $atts['size'] ){
		
		$display .= '<div class="'.$atts["size"].'">';
		$display .= do_shortcode(force_balance_tags($content));
		$display .= '</div>';
		

	
		return $display;
	}else{
		$display .= '<div class="col-xs-12">';
		$display .= do_shortcode(force_balance_tags($content));
		$display .= '</div>';
		return $display;
	}

}

function achilles_button_link_sc($atts, $content = null){
	$atts = shortcode_atts(
		array(
			'class' 		=> 'btn btn-default',
			'content' 		=> '',
			'link'			=> ''
		), $atts
	);

	$display = '';
	if($atts['content'] && $atts['link']){
		$display .= '<a href="'.$atts['link'].'" class="'.$atts['class'].'">'.$atts['content'].'</a>';
		return $display;
	}else{
		return 'content and link must be filled out.';
	}

	//the display output
}
function achilles_accordion($atts, $content = null){
	$atts = shortcode_atts(
		array(
			'arg1' 		=> '',
			'arg2' 		=> '',
			'arg3'		=> '',
			'arg4'		=> '',
			'arg5'		=> '',
			'arg6'		=> '',
		), $atts
	);
	$display = '<div class="accordion">';
	$count = 0;
	foreach($atts as $att){
		if($att == ''){
			continue;
		}
		$display .= '<div class="accordion-button btn btn-default">+</div>';
		$display .= '<span class="accordion-data">'.$att.'</span><br>';
		
		$count++;
	}
	


	$display .= '</div><div class="clearfix"></div>';
	//the display output
	return $display;
}

function achilles_icon_links($atts, $content=null){
	$atts = shortcode_atts(
		array(
			'icon' 		=> '',
			'link1' 	=> '',
			'name1'		=> '',
			'link2'		=> '',
			'name2'		=> '',
			'link3'		=> '',
			'name3'		=> '',
			'link4'		=> '',
			'name4'		=> ''
		), $atts
	);

	$display = '<ul class="icon_link_sc">';
	$count = 1;
		foreach($atts as $att){
			if($att == ''){
				continue;
			}
			//icons
			if($atts['icon'] == 'link'){
				$icon = '<span class="icon achilles-link"></span> ';
			}elseif($atts['icon'] == 'leaf'){
				$icon = '<span class="icon achilles-leaf"></span> ';
			}elseif($atts['icon'] == 'fire'){
				$icon = '<span class="icon achilles-fire"></span> ';
			}elseif($atts['icon'] == 'pencil'){
				$icon = '<span class="icon achilles-pencil"></span> ';
			}elseif($atts['icon'] == 'music'){
				$icon = '<span class="icon achilles-music"></span> ';
			}elseif($atts['icon'] == 'github'){
				$icon = '<span class="icon achilles-github"></span> ';
			}
			elseif($atts['icon'] == 'camera'){
				$icon = '<span class="icon achilles-camera"></span> ';
			}elseif($atts['icon'] == 'home'){
				$icon = '<span class="icon achilles-home"></span> ';
			}elseif($atts['icon'] == 'image'){
				$icon = '<span class="icon achilles-image"></span> ';
			}elseif($atts['icon'] == 'headphones'){
				$icon = '<span class="icon achilles-headphones"></span> ';
			}elseif($atts['icon'] == 'play'){
				$icon = '<span class="icon achilles-play"></span> ';
			}elseif($atts['icon'] == 'film'){
				$icon = '<span class="icon achilles-film"></span> ';
			}elseif($atts['icon'] == 'connection'){
				$icon = '<span class="icon achilles-connection"></span> ';
			}elseif($atts['icon'] == 'price-tag'){
				$icon = '<span class="icon achilles-price-tag"></span> ';
			}elseif($atts['icon'] == 'pushpin'){
				$icon = '<span class="icon achilles-pushpin"></span> ';
			}elseif($atts['icon'] == 'undo2'){
				$icon = '<span class="icon achilles-undo2"></span> ';
			}elseif($atts['icon'] == 'redo2'){
				$icon = '<span class="icon achilles-redo2"></span> ';
			}elseif($atts['icon'] == 'forward'){
				$icon = '<span class="icon achilles-forward"></span> ';
			}elseif($atts['icon'] == 'reply'){
				$icon = '<span class="icon achilles-reply"></span> ';
			}elseif($atts['icon'] == 'bubble'){
				$icon = '<span class="icon achilles-bubble"></span> ';
			}elseif($atts['icon'] == 'bubbles'){
				$icon = '<span class="icon achilles-bubbles"></span> ';
			}elseif($atts['icon'] == 'bubbles2'){
				$icon = '<span class="icon achilles-bubbles2"></span> ';
			}elseif($atts['icon'] == 'bubble2'){
				$icon = '<span class="icon achilles-bubble2"></span> ';
			}elseif($atts['icon'] == 'quotes-right'){
				$icon = '<span class="icon achilles-quotes-right"></span> ';
			}elseif($atts['icon'] == 'spinner3'){
				$icon = '<span class="icon achilles-spinner3"></span> ';
			}elseif($atts['icon'] == 'lab'){
				$icon = '<span class="icon achilles-lab"></span> ';
			}elseif($atts['icon'] == 'power'){
				$icon = '<span class="icon achilles-power"></span> ';
			}elseif($atts['icon'] == 'bookmark'){
				$icon = '<span class="icon achilles-bookmark"></span> ';
			}elseif($atts['icon'] == 'bookmarks'){
				$icon = '<span class="icon achilles-bookmarks"></span> ';
			}elseif($atts['icon'] == 'arrow-up2'){
				$icon = '<span class="icon achilles-arrow-up2"></span> ';
			}elseif($atts['icon'] == 'arrow-right2'){
				$icon = '<span class="icon achilles-arrow-right2"></span> ';
			}elseif($atts['icon'] == 'arrow-down2'){
				$icon = '<span class="icon achilles-arrow-down2"></span> ';
			}elseif($atts['icon'] == 'arrow-left2'){
				$icon = '<span class="icon achilles-arrow-left2"></span> ';
			}elseif($atts['icon'] == 'google-plus2'){
				$icon = '<span class="icon achilles-google-plus2"></span> ';
			}elseif($atts['icon'] == 'facebook2'){
				$icon = '<span class="icon achilles-facebook2"></span> ';
			}elseif($atts['icon'] == 'instagram'){
				$icon = '<span class="icon achilles-instagram"></span> ';
			}elseif($atts['icon'] == 'rss2'){
				$icon = '<span class="icon achilles-rss2"></span> ';
			}elseif($atts['icon'] == 'twitter'){
				$icon = '<span class="icon achilles-twitter"></span> ';
			}elseif($atts['icon'] == 'youtube'){
				$icon = '<span class="icon achilles-youtube"></span> ';
			}elseif($atts['icon'] == 'youtube2'){
				$icon = '<span class="icon achilles-youtube2"></span> ';
			}elseif($atts['icon'] == 'skype'){
				$icon = '<span class="icon achilles-skype"></span> ';
			}elseif($atts['icon'] == 'reddit'){
				$icon = '<span class="icon achilles-reddit"></span> ';
			}elseif($atts['icon'] == 'pinterest'){
				$icon = '<span class="icon achilles-pinterest"></span> ';
			}elseif($atts['icon'] == 'html-five'){
				$icon = '<span class="icon achilles-html-five"></span> ';
			}
			//links
			if($atts['link' . strval($count)] == $att){
				$display .= '<li><a href="'.$atts['link' . strval($count)].'">';
			}
			//names
			if($atts['name' . strval($count)] == $att){
				$display .= $icon . $atts['name' . strval($count)] . '</a></li>';
				$count++;
			}
		}
	$display .= '</ul>';
	//the display output
	return $display;
}

function achilles_icon_buttons($atts, $content=null){
	$atts = shortcode_atts(
		array(
			'icon' 		=> '',
			'link' 		=> '',
			'text'		=> '',
			'class'		=> ''
		), $atts
	);
	//icons
			if($atts['icon'] == 'link'){
				$icon = '<span class="icon achilles-link"></span> ';
			}elseif($atts['icon'] == 'leaf'){
				$icon = '<span class="icon achilles-leaf"></span> ';
			}elseif($atts['icon'] == 'fire'){
				$icon = '<span class="icon achilles-fire"></span> ';
			}elseif($atts['icon'] == 'pencil'){
				$icon = '<span class="icon achilles-pencil"></span> ';
			}elseif($atts['icon'] == 'music'){
				$icon = '<span class="icon achilles-music"></span> ';
			}elseif($atts['icon'] == 'github'){
				$icon = '<span class="icon achilles-github"></span> ';
			}
			elseif($atts['icon'] == 'camera'){
				$icon = '<span class="icon achilles-camera"></span> ';
			}elseif($atts['icon'] == 'home'){
				$icon = '<span class="icon achilles-home"></span> ';
			}elseif($atts['icon'] == 'image'){
				$icon = '<span class="icon achilles-image"></span> ';
			}elseif($atts['icon'] == 'headphones'){
				$icon = '<span class="icon achilles-headphones"></span> ';
			}elseif($atts['icon'] == 'play'){
				$icon = '<span class="icon achilles-play"></span> ';
			}elseif($atts['icon'] == 'film'){
				$icon = '<span class="icon achilles-film"></span> ';
			}elseif($atts['icon'] == 'connection'){
				$icon = '<span class="icon achilles-connection"></span> ';
			}elseif($atts['icon'] == 'price-tag'){
				$icon = '<span class="icon achilles-price-tag"></span> ';
			}elseif($atts['icon'] == 'pushpin'){
				$icon = '<span class="icon achilles-pushpin"></span> ';
			}elseif($atts['icon'] == 'undo2'){
				$icon = '<span class="icon achilles-undo2"></span> ';
			}elseif($atts['icon'] == 'redo2'){
				$icon = '<span class="icon achilles-redo2"></span> ';
			}elseif($atts['icon'] == 'forward'){
				$icon = '<span class="icon achilles-forward"></span> ';
			}elseif($atts['icon'] == 'reply'){
				$icon = '<span class="icon achilles-reply"></span> ';
			}elseif($atts['icon'] == 'bubble'){
				$icon = '<span class="icon achilles-bubble"></span> ';
			}elseif($atts['icon'] == 'bubbles'){
				$icon = '<span class="icon achilles-bubbles"></span> ';
			}elseif($atts['icon'] == 'bubbles2'){
				$icon = '<span class="icon achilles-bubbles2"></span> ';
			}elseif($atts['icon'] == 'bubble2'){
				$icon = '<span class="icon achilles-bubble2"></span> ';
			}elseif($atts['icon'] == 'quotes-right'){
				$icon = '<span class="icon achilles-quotes-right"></span> ';
			}elseif($atts['icon'] == 'spinner3'){
				$icon = '<span class="icon achilles-spinner3"></span> ';
			}elseif($atts['icon'] == 'lab'){
				$icon = '<span class="icon achilles-lab"></span> ';
			}elseif($atts['icon'] == 'power'){
				$icon = '<span class="icon achilles-power"></span> ';
			}elseif($atts['icon'] == 'bookmark'){
				$icon = '<span class="icon achilles-bookmark"></span> ';
			}elseif($atts['icon'] == 'bookmarks'){
				$icon = '<span class="icon achilles-bookmarks"></span> ';
			}elseif($atts['icon'] == 'arrow-up2'){
				$icon = '<span class="icon achilles-arrow-up2"></span> ';
			}elseif($atts['icon'] == 'arrow-right2'){
				$icon = '<span class="icon achilles-arrow-right2"></span> ';
			}elseif($atts['icon'] == 'arrow-down2'){
				$icon = '<span class="icon achilles-arrow-down2"></span> ';
			}elseif($atts['icon'] == 'arrow-left2'){
				$icon = '<span class="icon achilles-arrow-left2"></span> ';
			}elseif($atts['icon'] == 'google-plus2'){
				$icon = '<span class="icon achilles-google-plus2"></span> ';
			}elseif($atts['icon'] == 'facebook2'){
				$icon = '<span class="icon achilles-facebook2"></span> ';
			}elseif($atts['icon'] == 'instagram'){
				$icon = '<span class="icon achilles-instagram"></span> ';
			}elseif($atts['icon'] == 'rss2'){
				$icon = '<span class="icon achilles-rss2"></span> ';
			}elseif($atts['icon'] == 'twitter'){
				$icon = '<span class="icon achilles-twitter"></span> ';
			}elseif($atts['icon'] == 'youtube'){
				$icon = '<span class="icon achilles-youtube"></span> ';
			}elseif($atts['icon'] == 'youtube2'){
				$icon = '<span class="icon achilles-youtube2"></span> ';
			}elseif($atts['icon'] == 'skype'){
				$icon = '<span class="icon achilles-skype"></span> ';
			}elseif($atts['icon'] == 'reddit'){
				$icon = '<span class="icon achilles-reddit"></span> ';
			}elseif($atts['icon'] == 'pinterest'){
				$icon = '<span class="icon achilles-pinterest"></span> ';
			}elseif($atts['icon'] == 'html-five'){
				$icon = '<span class="icon achilles-html-five"></span> ';
			}

	$display = '<a href="'.$atts['link'].'" class="'.$atts['class'].'">'.$icon .$atts['text'].'</a>';

	return $display;
}

function achilles_images_shortcode($atts, $content=null){
	$atts = shortcode_atts(
		array(
			'alt'	=> '',
			'style'	=> '',
			'src'	=> '',
			'width'	=> '',
			'height'=> ''
		), $atts
	);

	$display = '';
	$display .= '<img style="width:'.$atts['width'].';height:'.$atts['height'].';" ';
	if($atts['alt']){
		$display .= 'alt="'.$atts['alt'].'"';
	}
	//rounded, circle, thumbnail, responsive
	if($atts['style'] == 'rounded'){
		$display .= 'class="img-rounded"';
	}elseif($atts['style'] == 'circle'){
		$display .= 'class="img-circle"';
	}elseif($atts['style'] == 'thumbnail'){
		$display .= 'class="img-thumbnail"';
	}elseif($atts['style'] == 'responsive'){
		$display .= 'class="img-responsive"';
	}

	
	$display .= 'src="'.$atts['src'].'"/>';

	return $display;
}

function achilles_color_boxes($atts, $content=null){
	$atts = shortcode_atts(
		array(
			'bg-color'	=> '',
			'text-color'=> '',
			'padding'	=> '',
		), $atts
	);

	$display = '';
	if(!$atts['bg-color'] && !$atts['text-color'] && !$atts['padding']){
		$display .= '<div style="background-color: #444;color:#fff;padding:10px;border-radius: 5px;"';
	}elseif($atts['bg-color'] && !$atts['text-color'] && !$atts['padding']){
		$display .= '<div style="background-color:'.$atts['bg-color'].';color:#fff;padding:10px;border-radius: 5px;"';
	}
	elseif(!$atts['bg-color'] && $atts['text-color'] && !$atts['padding']){
		$display .= '<div style="background-color:#fff;color:'.$atts['text-color'].';padding:10px;border-radius: 5px;"';
	}
	elseif(!$atts['bg-color'] && !$atts['text-color'] && $atts['padding']){
		$display .= '<div style="background-color:#fff;color:#fff;padding:'.$atts['padding'].';border-radius: 5px;"';
	}
	elseif($atts['bg-color'] && $atts['text-color'] && $atts['padding']){
		$display .= '<div style="background-color:'.$atts['bg-color'].';color:'.$atts['text-color'].';padding:'.$atts['padding'].';border-radius: 5px;"';
	}//needs else if for, 2 of them each maybe a border radius option?

	$display .= '> '.do_shortcode(force_balance_tags($content)).' </div>';

	return $display;
}

function achilles_block_quotes($atts, $content=null){
	$atts = shortcode_atts(
		array(
			'class'			=> ''
		), $atts
	);
	//classes for blockquotes use bootstrap names

	$display = '';
	$display .= '<blockquote class="'.$atts['class'].'">';
	$display .= '<q>'.do_shortcode(force_balance_tags($content)).'</q>';
	$display .= '</blockquote>';

	return $display;

}

add_shortcode('ac_quotes', 'achilles_block_quotes');
add_shortcode('ac_boxes', 'achilles_color_boxes');
add_shortcode('ac_image', 'achilles_images_shortcode');
add_shortcode('ac_icon_button', 'achilles_icon_buttons');
add_shortcode('ac_icon_link', 'achilles_icon_links');
add_shortcode('ac_accordion', 'achilles_accordion');
add_shortcode('ac_bootstrap', 'achilles_col_size');
add_shortcode('ac_button_link', 'achilles_button_link_sc');

require_once ( plugin_dir_path(__FILE__) . 'achilles-tinymce-button.php' );
/*
;;;; Ideas for Shortcodes ;;;;

Visual editor for shortcodes.
	button right next to add media. insert shortcode selected on click.
Another menu page for shortcodes

- slideshow
- Tables
- slide ins?
*/

<?php
/*
Plugin Name: Attachments List

Description: Display a list of the attachments added to a post or page by the Attachments plugin.  

The Attachments plugin allows you to easily append items from the media library to posts, pages, etc, but does not directly interact with the theme.   

This plugin will display an list of those items, each as a link to the file.  

Version: 1.1
Author: Phillip Bryan
Author URI: http://www.theemeraldcurtain.com/
*/

define (ATTACHMENTS_LIST_VERSION, '1.1');

//---------------------------------------------------------------------
// LOAD STYLES FOR THE FRONT END
//---------------------------------------------------------------------
add_action( 'wp_print_styles', 'attachments_list_load_css' );
function attachments_list_load_css() {
	wp_register_style( 'attachments-list-style', 	plugins_url('style.css', __FILE__), array(), ATTACHMENTS_LIST_VERSION);
	
	wp_enqueue_style('attachments-list-style');
}   

//---------------------------------------------------------------------
// LOAD COMPONENTS OF PLUGIN
//---------------------------------------------------------------------
include('widget.php');

//---------------------------------------------------------------------
// DISPLAY LIST OF ATTACHED FILES FOR POST
//---------------------------------------------------------------------
function show_attachments_list($size='') {
	echo get_attachments_list($size);
}

function get_attachments_list($size='') {
 
 	global $post, $post_ID;

	if (!function_exists('attachments_get_attachments')) {
		return '<p>The &quot;Attachments&quot; plugin was not found or has been disabled.</p>';
	}

	switch ($size) {
		case 'none': $class=' attachment-list-none'; break;
		case 'small': $class=' attachment-list-small'; break;
		case 'medium': $class=' attachment-list-medium'; break;
		case 'casual': $class=' attachment-list-casual'; break;
		case 'thumbnail': $class=' attachment-list-thumbnail'; break;
		default: $class='';
	}
	$attachments = attachments_get_attachments();
	$total_attachments = count($attachments);

	if ($total_attachments > 0) {
		$str = '<ul class="attachment-list '.$class.'">';
			
		for ($i=0; $i < $total_attachments; $i++) {
				
        	$str .= '<li><a class="'.($size=='thumbnail'?'thickbox no_icon':'').' widget_download" href="'.$attachments[$i]['location'].'"
				title="'.$attachments[$i]['title'].'" alt="'.$attachments[$i]['title'].'" target="_blank">';
			//$str.=$attachments[$i]['mime'].'<br>';
			$mime = strtok($attachments[$i]['mime'], "/");	
			switch ($mime) {
				case 'application':
					$mime = strtok('/');
					switch ($mime) {
						case 'pdf':		$str .= '<div class="adobe"></div>';			break;	
						case 'msword':	$str .= '<div class="document"></div>';		break;	
						case 'zip':		$str .= '<div class="archive"></div>';		break;	
						default:		$str .= '<div class="document"></div>';
					}
					break;			
				case 'audio':	$str .= '<div class="audio"></div>';	break;
				case 'image':						
        	        $str .='<div class="image"><img src="'.$attachments[$i]['location'].'" alt="'.$attachments[$i]['title'].'"/></div>';								
					break;
					
				case 'text': 	$str .= '<div class="text"></div>';		break;
				case 'video':	$str .= '<div class="video"></div>';	break;				
										
				default:
					$str .= '<div class="document"></div>';
			}
			
			$str .='<span>'.$attachments[$i]['title'].'</span></a></li>';
		} // for loop
		$str .= '</ul><br clear="all"/>';
	}
	return $str;
} 
			
//---------------------------------------------------------------------
// SHORTCODE for ATTACEMENTS LIST
//---------------------------------------------------------------------
add_shortcode("attachments-list", "attachments_list_shortcode");
function attachments_list_shortcode($atts) {
	
	extract(shortcode_atts(array(
    	"size" 	=> ''	
    ), $atts));
	
	$str = get_attachments_list($size);
	
	return $str;
}

?>
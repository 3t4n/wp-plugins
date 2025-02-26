<?php 

/*
Plugin Name: Depositphotos Affiliate
Plugin URI: 
Description: The plugin gives you the opportunity to use and publish illustrations with affiliate links from Depositphotos, one of the leading photobanks in the world. After adding the keywords, Depositphotos will suggest relevant and themed images. You will be able to get relevant visual content and profit from your readers. For using the plugin, you will need a Depositphotos affiliate account.
Author: Dmitriy Sergeev
Version: 1.0
Author URI: https://profiles.wordpress.org/depositphotos
*/

function dpaff_shortcode( $atts ){

	$atts_array = array(
        'block_type'=> '',
        'tracking_link'=> '',
        'feed'=> '',
        'category_list'=> '',
        'author_id'=> '',
        'portfolio_checkbox'=> '',
        'search_query'=> '',
        'theme'=> '',
        'background'=> '',
        'image_type_photo'=> '',
        'image_type_vector'=> '',
        'image_type_video'=> '',
        'editorial'=> '',
        'sortby'=> '',
        'thumb_size'=> '',
        'thumb_size_custom'=> '300',
        'feed_width'=> '',
        'feed_height'=> '',
        'search_bar'=> '',
        'show_logo'=> '',
        'thumbnails_preview'=> '',
        'hide_pagination'=> '',
        'show_borders'=> '',
        'responsive'=> '',
        'additional_nofollow'=> '',
	);

	extract(shortcode_atts($atts_array, $atts));

	if(esc_url($tracking_link) == "") {
		return "";
	}

	$feed_width = (int)$feed_width;

	$feed_height = (int)$feed_height;

	if($feed == "categories") {
		$feed = '"feedtype":"categories","categorylist":"'.$category_list.'",';
	} elseif($feed == "search") {
		$feed = '"feedtype":"search","searchquery":"'.$search_query.'",';
	}

	if($portfolio_checkbox == "on") {
		$portfolio_checkbox = '"showportfolio":true,';
	} else {
		$portfolio_checkbox = "";
	}

	if($image_type_photo == "on") {
		$image_type_photo = '"photo":true,';
	} else {
		$image_type_photo = '';
	}

	if($image_type_vector == "on") {
		$image_type_vector = '"vector":true,';
	} else {
		$image_type_vector = '';
	}

	if($image_type_video == "on") {
		$image_type_video = '"video":true,';
	} else {
		$image_type_video = '';
	}

	if($editorial == "on") {
		$editorial = '"editorial":true,';
	} else {
		$editorial = '';
	}

	if($thumb_size == "specify_size") {
		//$thumb_size = 'specify_size';
		$thumb_size_specify = '"specify_size":'.(int)$thumb_size_custom.',';
	} else {
		$thumb_size = (int)$thumb_size;
		$thumb_size_specify = '';
	}

	if($search_bar == "yes") {
		$search_bar = '"searchBar":true,';
	} else {
		$search_bar = '';
	}

	if($show_logo == "yes") {
		$show_logo = '"showlogo":true,';
	} else {
		$show_logo = '';
	}

	if($thumbnails_preview == "yes") {
		$thumbnails_preview = '"preview":true,';
	} else {
		$thumbnails_preview = '';
	}

	if($hide_pagination == "yes") {
		$hide_pagination = '"limitpage":true,';
	} else {
		$hide_pagination = '';
	}

	if($show_borders == "yes") {
		$show_borders = '"showborder":true,';
	} else {
		$show_borders = '';
	}

	if($responsive == "yes") {
		$responsive = '"responsive":true,';
	} else {
		$responsive = '';
	}

	if($additional_nofollow == "yes") {
		$additional_nofollow = '"nofollow":true,';
	} else {
		$additional_nofollow = '';
	}

	switch ($block_type) {
		case 'iframe':
			$return = '<iframe class="dp-widget-frame" style="display: none" src="javascript:void(false)" width="'.$feed_width.'" height="'.$feed_height.'" data-dpw="66"></iframe>
<script type="text/javascript" src="//static.depositphotos.com/js_c/widget-ext.js"></script>
<script type="text/javascript">(function(){new dpw({"format":"iframe","trackingLink":"'.esc_url($tracking_link).'",'.$feed.'"theme":"'.$theme.'","background":"'.$background.'",'.$image_type_photo.''.$image_type_vector.''.$image_type_video.'"sort":"1","thumbsize":"'.$thumb_size.'",'.$thumb_size_specify.'"feedwidth":"'.$feed_width.'","feedheight":"'.$feed_height.'",'.$search_bar.''.$show_logo.''.$thumbnails_preview.''.$hide_pagination.''.$show_borders.''.$responsive.''.$additional_nofollow.'"wid":66,"lang":"en"}).init(); })();</script>';
			break;

		case 'block':
			$return = '<div class="dp-widget" data-dpw="66"></div>
<script type="text/javascript" src="//static.depositphotos.com/js_c/widget-ext.js"></script>
<script type="text/javascript">(function(){new dpw({"format":"iframe","trackingLink":"'.esc_url($tracking_link).'",'.$feed.'"theme":"'.$theme.'","background":"'.$background.'",'.$image_type_photo.''.$image_type_vector.''.$image_type_video.'"sort":"1","thumbsize":"'.$thumb_size.'",'.$thumb_size_specify.'"feedwidth":"'.$feed_width.'","feedheight":"'.$feed_height.'",'.$search_bar.''.$show_logo.''.$thumbnails_preview.''.$hide_pagination.''.$show_borders.''.$responsive.''.$additional_nofollow.'"wid":66,"lang":"en"}).init(); })();</script>';
			break;
		
		case 'php':

		default:
		$return = file_get_contents('http://api.depositphotos.com/?dpaff_apikey=1b81008a61144733101b25d21e067cf332fb1a30&dpaff_lang=ru&dpaff_command=getWidget&dpaff_widget_config='.urlencode('{"format":"div",
 "trackingLink":"'.esc_url($tracking_link).'",
'.$feed.'"theme":"'.$theme.'","background":"'.$background.'",'.$image_type_photo.''.$image_type_vector.''.$image_type_video.'"sort":"1","thumbsize":"'.$thumb_size.'",'.$thumb_size_specify.'"feedwidth":"'.$feed_width.'","feedheight":"'.$feed_height.'",'.$search_bar.''.$show_logo.''.$thumbnails_preview.''.$hide_pagination.''.$show_borders.''.$responsive.''.$additional_nofollow.'
 "php":true,
 "wid":66,
 "lang":"en"}').'&dpaff_widget_referer='.urlencode(json_encode($_GET)));
			break;
	}

	return $return;
}
add_shortcode( 'depositphotos_affiliate', 'dpaff_shortcode' );

function dpaff_insert_shortcode_button() {
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    
    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'dpaff_add_mce_plugin');
        add_filter('mce_buttons', 'dpaff_register_button');
    }
}
add_action('init', 'dpaff_insert_shortcode_button');

function dpaff_register_button($buttons) {
    array_push($buttons, "|", 'dpaff_insert_shortcode_button');
    return $buttons;
}

function dpaff_add_mce_plugin($plugin_array) {
    $plugin_array['dpaff_insert_shortcode'] = plugins_url('js/shortcode.js', __FILE__);
    return $plugin_array;
}

// AJAX for affiliate URL and block type

function dpaff_get_options() {
	$dpaff_options = get_option('dpaff_options');
    print json_encode($dpaff_options);
    wp_die();
}
add_action( 'wp_ajax_dpaff_get_options', 'dpaff_get_options' );

// Settings

include_once 'dpaff_settings.php';
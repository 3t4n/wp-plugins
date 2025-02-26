<?php
/*
Plugin Name: ByREV Gallery Pagination for Wordpress
Plugin URI: http://byrev.org/bookmarks/gallery-pagination-for-wordpress-plugin/
Description: This plugin offers the possibility of displaying a photo gallery on multiple pages / pagination gallery. Change <strong>[gallery]</strong> from Wordpress Post with <strong>[gallery pagination="N"]</strong>. Features: AJAX Gallery Loading; "Quick Cache" plugin support; Fill the gaps (to complete gallery) in last row; Gallery title SEO / No Duplicate Title; Compatible with Lightbox ,Slimbox and FancyBox; Paging can be Top, Bottom or Both; 
Version: 1.7.3.beta.001
Author: ByREV ( Robert Emilian Vicol )
Author URI: http://byrev.org/

 * byrev_gallery_shortcode function is derived from function original wordpress gallery_shortcode located \wp-includes\media.php , Wordpress Media Library.
 * All code from gallery_shortcode with certain exceptions (clearly marked with "byrev insert N {" )  belongs to the wordpress developers and community. 
 * Code marked with "byrev insert N {" belong to the author of this plugin , Emilian Robert Vicol.
 
 * How to Use? 
 * Change [gallery] from Wordpress Post with [gallery pagination="N"] , where N is number of images per page
 * Example: [gallery link="file" columns="5" pagination="10"]  --> will show only 10 images per page in 5 columns , respectively 2 rows. Images are directly linked (link="file")
*/

############################# Values that can be modified ############################
#~~~~ To configure from wordpress administration, the following value must be TRUE. Otherwise, any changes/settings may be made only from the values below.
define('_MENU_CONFIGURATION', true);

#~~~~ if "pagination" parameter is not present in gallery code like this: [gallery pagination="N"], plugin will force paginate with _DEFAULT_IMAGE_IN_PAGE value (see below)
define('__FORCE_PAGINATION',true);

#~~~~ if _FORCE_PAGINATION is false, this value has no effect.
define('__DEFAULT_IMAGE_IN_PAGE', 9);

#~~~~ Change with your class. For example, view byrev-gallery-pagination.css from plugin folder.
define('__CSS_PAGINATION_CLASS','paginate_gallery');

#~~~~ if is false pagination will show only NEXT / PREVIEW style, else will show < < [0, 1, 3 ... N] > > style.
define('__EXTEDED_PAGINATION', true);

#~~~~ if css style is custom/defined in other file, change this with false
define('__INCLUDE_DEFAULT_CSS',true);

#~~~~ if both value is true, plugin add pagination at the bottom and top gallery. Set/Choose the option that you want, but at least one must be active/true.
define('__PAGINATION_BOTTOM', true);
define('__PAGINATION_TOP', true);

#~~~~ if the number of images in gallery will not fill last row to the end, the gaps is filled with empty images. (default true)
define('__FILL_GAPS_IN_LAST_ROW', true);

#~~~~ empty images transparency (behavior) / translucency - from 0 to 1
define('__FILL_GAPS_TRANSPARENCY', 0.5);

#~~~~ must be enabled for the pages to be cached / valid only for "Quick Cache" plugin.
define('__QUICK_CACHE_SUPPORT', true);

#~~~~ if is true pagination is loaded with ajax / Save your bandwidth, resources & speed-up your website.
define('__AJAX_PAGINATION', true);

#===========cache=============
#~~~~ if is true, gallery is loaded from cache / Save resources & speed-up your website.
define('__GALLERY_CACHE', false);

#~~~~ 'mysql' for cache in database, 'disk' for cache to disk; 'auto' value for "auto detect" is valid only if _MENU_CONFIGURATION is true !;
define('__GALLERY_CACHE_MODE', 'disk');

#~~~~ Cache time-out
define('__GALLERY_CACHE_EXPIRATION', 86400);

#===========cdn================
#~~~~ if is true, images is loaded from cdn mirror servers / Save resources & speed-up your website.
define('__GALLERY_CDN', false);

#~~~~ "round" - all defined servers are chosen with rotation (to balance the load, list is randomly mixed)!
#~~~~~ "rand" - all defined servers will be used randomly (balancing is done in a long time)
#~~~~~ "one"  - only one server (randomly chosen) will be used per session. 
define('__GALLERY_CDN_USE_MODE', 'round');

#~~~~ CDN servers separated by **|**  ; By default value is equals with $default_cdn variable defined below.
$urlinfo = parse_url(get_option('home')); define('_WP_BLOG_HOST', $urlinfo['host']); define('_WP_BLOG_HOST_REPLACE', '//'._WP_BLOG_HOST); $default_cdn = _WP_BLOG_HOST.".nyud.net|"._WP_BLOG_HOST;  #~~~ no edit this line !!!

define('__GALLERY_CDN_SERVERS', $default_cdn);

####################### Do not change anything after this line! #######################
$default_option_pagination_gallery = array(
	'force_pagination' => 1,
	'default_image_in_page' => 9,
	'extended_pagination' => 1,
	'css_pagination_class' => 'paginate_gallery',
	'include_default_css' => 1,
	'pagination_position' => 'both',
	'fill_gaps_in_last_row' => 1,	
	'fill_gaps_transparency' => 0.5,	
	'quick_cache_support' => 1,
	'ajax_pagination' => 1,
	'gallery_cache' => 0,
	'gallery_cache_mode' => 'disk',
	'gallery_cache_expiration' => 86400,
	'cdn' => false,
	'cdn_use_mode' => "round",
	'cdn_servers' => $default_cdn
	);
	
$GLOBALS['default_option_pagination_gallery'] = &$default_option_pagination_gallery;	

/*** sync database otion ***/	
function sync_option_gallery(&$option_pagination_gallery) {
	global $default_option_pagination_gallery;
	
	$missing_options = 0;
	foreach ($default_option_pagination_gallery as $key=>$value) {
		if (!isset($option_pagination_gallery[$key])) { 
			$option_pagination_gallery[$key] = $value;
			$missing_options++;
		}
	}		
	if ($missing_options > 0) {
		update_option('ByREV_Pagination_Gallery', $option_pagination_gallery);
		$option_pagination_gallery = get_option('ByREV_Pagination_Gallery', $default_option_pagination_gallery);
	}		
}	

if (!_MENU_CONFIGURATION) {
	define('_FORCE_PAGINATION', __FORCE_PAGINATION);
	define('_DEFAULT_IMAGE_IN_PAGE', __DEFAULT_IMAGE_IN_PAGE);
	define('_CSS_PAGINATION_CLASS', __CSS_PAGINATION_CLASS);
	define('_EXTEDED_PAGINATION', __EXTEDED_PAGINATION);
	define('_INCLUDE_DEFAULT_CSS', __INCLUDE_DEFAULT_CSS);
	define('_PAGINATION_BOTTOM', __PAGINATION_BOTTOM);
	define('_PAGINATION_TOP', __PAGINATION_TOP);
	define('_FILL_GAPS_IN_LAST_ROW', __FILL_GAPS_IN_LAST_ROW);	
	define('_FILL_GAPS_TRANSPARENCY', __FILL_GAPS_TRANSPARENCY );
	define('_QUICK_CACHE_SUPPORT', __QUICK_CACHE_SUPPORT );	
	define('_AJAX_PAGINATION', __AJAX_PAGINATION );		
	define('_GALLERY_CACHE', __GALLERY_CACHE);
	define('_GALLERY_CACHE_MODE', __GALLERY_CACHE_MODE);
	define('_GALLERY_CACHE_EXPIRATION', __GALLERY_CACHE_EXPIRATION);
	define('_GALLERY_CDN', __GALLERY_CDN);	
	define('_GALLERY_CDN_USE_MODE', __GALLERY_CDN_USE_MODE);	
	define('_GALLERY_CDN_SERVERS', __GALLERY_CDN_SERVERS);			
	
} else {
	$option_pagination_gallery = get_option('ByREV_Pagination_Gallery', $default_option_pagination_gallery);
	sync_option_gallery($option_pagination_gallery);
	
	define('_FORCE_PAGINATION', ($option_pagination_gallery['force_pagination'] == 1) );
	define('_DEFAULT_IMAGE_IN_PAGE', $option_pagination_gallery['default_image_in_page'] );
	define('_CSS_PAGINATION_CLASS', $option_pagination_gallery['css_pagination_class'] );
	define('_EXTEDED_PAGINATION', ($option_pagination_gallery['extended_pagination'] == 1) );
	define('_INCLUDE_DEFAULT_CSS', ($option_pagination_gallery['include_default_css'] == 1) );
	define('_FILL_GAPS_IN_LAST_ROW', ($option_pagination_gallery['fill_gaps_in_last_row'] == 1));	
	define('_FILL_GAPS_TRANSPARENCY', $option_pagination_gallery['fill_gaps_transparency'] );	
	define('_QUICK_CACHE_SUPPORT', ($option_pagination_gallery['quick_cache_support'] == 1));	
	define('_AJAX_PAGINATION', ($option_pagination_gallery['ajax_pagination'] == 1));
	
	define('_GALLERY_CACHE', ($option_pagination_gallery['gallery_cache'] == 1));
	define('_GALLERY_CACHE_MODE', $option_pagination_gallery['gallery_cache_mode']);	 
	define('_GALLERY_CACHE_EXPIRATION', $option_pagination_gallery['gallery_cache_expiration']);	
	
	define('_GALLERY_CDN', ($option_pagination_gallery['cdn'] == 1));	
	define('_GALLERY_CDN_USE_MODE', $option_pagination_gallery['cdn_use_mode']);	
	define('_GALLERY_CDN_SERVERS', $option_pagination_gallery['cdn_servers']);		
	
	if ($option_pagination_gallery['pagination_position'] == "both") {
		define('_PAGINATION_BOTTOM', true);
		define('_PAGINATION_TOP', true);
	} else {
		define('_PAGINATION_BOTTOM', ($option_pagination_gallery['pagination_position'] == "bottom") );
		define('_PAGINATION_TOP', ($option_pagination_gallery['pagination_position'] == "top") );		
	}	
}

if (isset($_REQUEST['pagination'])) {
	define('_IMAGE_IN_PAGE', (int)$_REQUEST['pagination']);
} else {
	define('_IMAGE_IN_PAGE', _DEFAULT_IMAGE_IN_PAGE);
}

define('_BYREV_PAGINATE_PLUGIN_DIR', WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) );

global $__GALLERY_POST_ID, $__GALLERY_INSTANCE;
$__GALLERY_POST_ID = 0;
$__GALLERY_INSTANCE = 0;

if (isset($_REQUEST['page-album']) || isset($_REQUEST['ajaxgal'])  ) {	
		if (isset($_REQUEST['page-album'])) :
			define('__PAGE_ALBUM', $_REQUEST['page-album']);
		else:
			define('__PAGE_ALBUM', 1);
		endif;		
		define('_REQ_POST_ID', $_REQUEST['pid']);				
		
		define('_REQ_GALLERY_INSTANCE', $_REQUEST['gin']);
		define('_REQ_PAGE_INSTANCE', $_REQUEST['pin']);		
					
} else {				
		define('__PAGE_ALBUM', 1);
		define('_REQ_POST_ID', "");
		define('_REQ_GALLERY_INSTANCE', 1);
		define('_REQ_PAGE_INSTANCE', 1);		
}

if (__AJAX_PAGINATION) {
	define('_LOADING_IMAGES_URL', _BYREV_PAGINATE_PLUGIN_DIR.'/loader.gif');
	if (isset($_REQUEST['ajaxgal'])) {	
			define('__AJAX_GALLERY', $_REQUEST['ajaxgal']);
	} else {
			define('__AJAX_GALLERY', 1);
	}
}

define('_DEFAULT_GALLERY_REL', 'lightbox');

if (_GALLERY_CACHE) {	
	include('byrev-gallery-pagination-cache.php');
}

#=============== for CDN
#---- func
function get_cdn_one() { 
	global $_CDN_SERVERS;
	return $_CDN_SERVERS[0];
}

function get_cdn_round() {
	global $_CDN_SERVERS;
	
	$server = current($_CDN_SERVERS);
	if( next($_CDN_SERVERS) === false) { 
		reset($_CDN_SERVERS); 
	}
	return $server;	
}

function get_cdn_rand() {
	global $_CDN_SERVERS;
	$key = array_rand($_CDN_SERVERS, 1);
	return $_CDN_SERVERS[$key];	
}

#----

if (_GALLERY_CDN) {

	$_CDN_SERVERS = explode('|',_GALLERY_CDN_SERVERS);	
	
	#~~~ clean invalid value
	foreach ($_CDN_SERVERS as $key=>$value) {
		$server = trim($value);
		if ($server != "" ) {
			$_CDN_SERVERS[$key] = $server;
		} else {
			unset($_CDN_SERVERS[$key]);
		}
	}
	
	#~~~ randomize servers
	shuffle($_CDN_SERVERS);
	
	$cdn_func = 'get_cdn_'._GALLERY_CDN_USE_MODE;
	if (function_exists($cdn_func)) {
		$_f_CDN = $cdn_func;
	} else {
		$_f_CDN = "get_cdn_round";
	}				
	
} else {
	$_CDN_SERVERS = array($addr[1]);
	$_f_CDN = 'get_cdn_one';
}

$GLOBALS['_CDN_SERVERS'] = &$_CDN_SERVERS;
$GLOBALS['_f_CDN'] = $_f_CDN;

function attachment_link_cdn($attachment_link) { 
	
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)><img(.*?)src=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)><\/a>/i";
	
	if (!preg_match($pattern, $attachment_link, $m)) { return $attachment_link; }
	
	if (_GALLERY_CDN) {	
		global $_f_CDN;		
		$href = str_replace(_WP_BLOG_HOST_REPLACE, "//".$_f_CDN(), $m[3]);
		$src = str_replace(_WP_BLOG_HOST_REPLACE, "//".$_f_CDN(), $m[9]);	
	} else {
		$href = &$m[3];
		$src = &$m[9];
	}
	
	$attachment_link = '<a'.$m[1].'href='.$m[2].$href.'.'.$m[4].$m[5].' rel="'._DEFAULT_GALLERY_REL.'" '.$m[6].'><img'.$m[7].'src='.$m[8].$src.'.'.$m[10].$m[11].$m[12].'></a>';

    return $attachment_link;
}

add_filter( 'wp_get_attachment_link' , 'attachment_link_cdn', 1 );

#================================================ function used for ajax 
function get_gallery_box_class($gallery) {
	return "gallerybox_".$gallery;
}

function get_gallery_link_class($gallery) {
	return get_gallery_box_class($gallery)."_link";
}

function insert_gallery_shortcode_jquery($gallery) {
$loading_images = '<img src="'._LOADING_IMAGES_URL.'" />';
return '
<script type="text/javascript">
jQuery(document).ready( function($) {
  $(".'.get_gallery_link_class($gallery).'").click( function() {
    var link = $(this);
    document.getElementById("boxloading_'.$gallery.'").innerHTML = \''.$loading_images.'\';
    $.post(link.attr("href"), {
        ajaxgal: '.$gallery.'
      }, function(data) {
        link.parents(".'.get_gallery_box_class($gallery).'").html($(data));
      }
    );
    return false;
  });
});
</script>
';
}

#================================================
function insert_rel_in_attachment_link($link, $id, $size, $permalink, $icon, $text ) {
	return $link;	
}

function byrev_gallery_shortcode($gallery_html, $attr) {
	global $post, $wp_locale;
	global $__GALLERY_POST_ID ;
	global $__GALLERY_INSTANCE ;		
	
	$time_start = microtime(true);
	
	static $instance = 0;
	#~~~ byrev moded/inserted 0 {
	if (!defined('_AJAX_GALLERY_INSTANCE')) {
		$instance++;
	} else {
		$instance = _AJAX_GALLERY_INSTANCE;
	}
	#~~~ byrev insert 0 }	
	
	#~~~~ byrev removed 1 {
	// Allow plugins/themes to override the default gallery template.
	#$output = apply_filters('post_gallery', '', $attr);
	#if ( $output != '' )
	#	return $output;	
	#~~~~ byrev removed 1 }	

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'pagination' => 0,  #~~~ byrev insert 1 , pagination
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	
	if ($__GALLERY_POST_ID != $id) :
		 $__GALLERY_INSTANCE = 0;
		 $__GALLERY_POST_ID = $id;	
	endif;		
	$__GALLERY_INSTANCE++;	
	
	#~~~~ byrev insert write cache {  (apelare aici, pentru ca aici e locul unde ID-ul si instanta sunt disponibile 100%)
	$output = '';
	$instance_cahe = md5($instance.'-'._REQ_POST_ID.'-'._REQ_GALLERY_INSTANCE.'-'._REQ_PAGE_INSTANCE.'-'.__PAGE_ALBUM);
	if (_GALLERY_CACHE) { if ( byrev_gallery_cache($id, $instance_cahe, $output) ) return $output.'<!-- Time: '.round(microtime(true) - $time_start, 4).' seconds. -->'; }
	#~~~~ byrev insert }	
	
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	#======== byrev insert 2 { ========
	$_COUNT_IMAGES = count($attachments);
	
	if ( $pagination == 0 ) {
		if (!_FORCE_PAGINATION) {
			$pagination = -1;
			$_PAGINATE = false;
		} else {
			$_PAGINATE = true;
			$pagination = _IMAGE_IN_PAGE;
		}
	}
	if ($_COUNT_IMAGES > $pagination ) {
		$_PAGINATE = true;		
	} else {
		$_PAGINATE = false;		
	}	
	
	if ($_PAGINATE) {
	
		#~~~ extract real permalink gallery		
		$_THIS_LINK = remove_query_arg( 'page-album', wp_url_link() );				
		
		if (_AJAX_PAGINATION) {
			//$_THIS_LINK = add_query_arg( 'ajaxgal', $instance, $_THIS_LINK );  //~~ used gor GET version istead POST (only for debug)
		}		
		
		$_NAVI_LINK  = $_THIS_LINK;		
		if (_QUICK_CACHE_SUPPORT) {
			$_NAVI_LINK = add_query_arg( 'qcAC', '1', $_NAVI_LINK );
		}	

		$_NAVI_LINK = add_query_arg( 'pid', $id, $_NAVI_LINK );
		
		if (!isset($_REQUEST['ajaxgal'])):
			$_NAVI_LINK = add_query_arg( 'pin', $instance, $_NAVI_LINK );		
			$_NAVI_LINK = add_query_arg( 'gin', $__GALLERY_INSTANCE, $_NAVI_LINK );
		else:
			$_NAVI_LINK = add_query_arg( 'pin', _REQ_PAGE_INSTANCE, $_NAVI_LINK );		
			$_NAVI_LINK = add_query_arg( 'gin', _REQ_GALLERY_INSTANCE, $_NAVI_LINK );
		endif;
				
 
	    #~~~ resolve issue with blog without permalink; 
	    $pos1 = stripos($_NAVI_LINK, '?');
	    if ($pos1 === false) {
	   	    $_ALBUM_LINK = $_NAVI_LINK.'?page-album=';
		} else {
	   	    $_ALBUM_LINK = $_NAVI_LINK.'&page-album=';		
		}
		
		#~~~ get/set current page
		if ( ((_REQ_POST_ID == $id) && (_REQ_GALLERY_INSTANCE == $__GALLERY_INSTANCE)) || (defined('_AJAX_GALLERY_INSTANCE')) ):		
			$_PAGE_ALBUM = __PAGE_ALBUM;
		else :
			$_PAGE_ALBUM = 1;
		endif;		
	
		#~~~ set preview page
		if ($_PAGE_ALBUM > 1) {
        	$_PREV_PAGE = $_PAGE_ALBUM - 1;
        } else {
        	$_PREV_PAGE = 1;
        }	
        
        #~~~ set preview URL page
		$_PREV_LINK = $_ALBUM_LINK.$_PREV_PAGE;
        
        #~~~ set next page        
        $_MAX_PAGE = ceil($_COUNT_IMAGES / $pagination);
        if ($_PAGE_ALBUM < $_MAX_PAGE) {
        	$_NEXT_PAGE = $_PAGE_ALBUM + 1;
        } else {
        	$_NEXT_PAGE = $_MAX_PAGE;
        }
        
        #~~~ set next URL page
       	$_NEXT_LINK = $_ALBUM_LINK.$_NEXT_PAGE; 
       	
       	#~~~ set link class
       	$pagination_link_class = get_gallery_link_class($instance);
       	
       	#~~~ set rel tag;
       	//$rel = &$GLOBALS['byrev_gallery_rel'];
		$_MARK_INSTANCE = 'gpin'.$instance;
		$_HASH_MARK = '#'.$_MARK_INSTANCE;
			
		#~~~ navigation page		 
		if (!_EXTEDED_PAGINATION) {
			$paginate_html = '<div class="'._CSS_PAGINATION_CLASS.'"> <a class="'.$pagination_link_class.'" href="'.$_PREV_LINK.$_HASH_MARK.'">&lt;&lt;</a> ['.$_PAGE_ALBUM.' of '.$_MAX_PAGE.'] <a href="'.$_NEXT_LINK.$_HASH_MARK.'">&gt;&gt;</a></div>';
		} else {		 
		 	$paginate_html = '<div class="'._CSS_PAGINATION_CLASS.'"> <a class="'.$pagination_link_class.'" href="'.$_PREV_LINK.$_HASH_MARK.'">&lt;&lt;</a>';
		 	for ($i=1; $i<=$_MAX_PAGE; $i++) {
		 		if ($i > 1) {
			 		$_LINK = $_ALBUM_LINK . $i;
			 	} else {
			 		$_LINK = $_THIS_LINK;
			 	}
		 		if ($_PAGE_ALBUM == $i) { 
		 			//$paginate_html .= '<a class="'.$pagination_link_class.'" style="background: #fff;" href="'.$_LINK.$_HASH_MARK.'">'.$i.'</a>';					
					$paginate_html .= '<span class="pselect" href="#">'.$i.'</span>';
		 		} else {
		 			$paginate_html .= '<a class="'.$pagination_link_class.'" href="'.$_LINK.$_HASH_MARK.'">'.$i.'</a>'; }
		 	}		 
		 	$paginate_html .= '<a class="'.$pagination_link_class.'" href="'.$_NEXT_LINK.$_HASH_MARK.	'">&gt;&gt;</a><span style="float: right; position: absolute;" id="boxloading_'.$instance.'"></span></div>';
		 }
		 
		 $_START_ITEM = ($_PAGE_ALBUM - 1)*$pagination;
		 $_END_ITEM = $_START_ITEM + $pagination;
		 
	} else {
		$paginate_html = "";
		$_START_ITEM = 0;
		$_END_ITEM = 1000;
	}	
	#========  byrev insert 2 } ========

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	
	#======== byrev insert 6 {
	if (_AJAX_PAGINATION) { $output = insert_gallery_shortcode_jquery($instance); } else {$output = '<A NAME="'.$_MARK_INSTANCE.'"></A>';}
	
	$output .= "<div class='".get_gallery_box_class($instance)."'>";
	
	if (_PAGINATION_TOP) { $output .= $paginate_html; }
	#======== byrev insert 6 }
	
	$output .= apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );  #======== byrev modifiy 7 / add concatenate string (.)

	$i = 0;
	#======== byrev insert 3 {
	$j = 0;
	#======== byrev insert 3 }
	foreach ( $attachments as $ida => $attachment ) {
		#======== byrev insert 4 {
		if ( ($j < $_START_ITEM) OR ($j >= $_END_ITEM) ) {$j++; continue;} 
		$j++;
		#======== byrev insert 4 }
		
		#======== byrev insert cdn {
		if (__GALLERY_CDN) {
			$cdn_server = $_f_CDN();
		}
		#======== cdn }
		
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($ida, $size, false, false) : wp_get_attachment_link($ida, $size, true, false);

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '<br style="clear: both" />';
	}
	
	#======== byrev insert 7 {
	if (_FILL_GAPS_IN_LAST_ROW) :
		//$maxj = ceil($i / $columns)*$columns;
		$maxj = $pagination;
		if ($i<$maxj) {
			$missing_url = _BYREV_PAGINATE_PLUGIN_DIR.'/noimage.png';
			$_thumb_width= get_option('thumbnail_size_w');
			$_thumb_height= get_option('thumbnail_size_h');	
			$link = "<img class='attachment-thumbnail' style='opacity: "._FILL_GAPS_TRANSPARENCY.";' src='".$missing_url."' height='".$_thumb_height."' width='".$_thumb_width."' />";
			for($j=$i; $j<$maxj; $j++) {
				$output .= "<{$itemtag} class='gallery-item'>";
				$output .= "
					<{$icontag} class='gallery-icon'>
						$link
					</{$icontag}>";
				$output .= "</{$itemtag}>";			
			}
		}
	endif;
	#======== byrev insert 7 }

	$output .= "
			<br style='clear: both;' />
		</div>\n";  
	
	if (_PAGINATION_BOTTOM) {
		$output .= $paginate_html;
	}
	$output .= '</div>'; #~~~ instance box
	
	if (!_PAGINATION_BOTTOM AND !_PAGINATION_TOP) {
		$output .= '<p style="color: white; background: red; text-align: center; padding: 5px;"><strong>Pagination position is not defined. Please define one or both values from _PAGINATION_TOP and _PAGINATION_BOTTOM!</strong></p>';
	}
	
	#~~~~ byrev insert write cache {
	if (_GALLERY_CACHE) { byrev_gallery_write_cache($output);	}
	#~~~~ byrev insert }		
		
	return $output.'<!-- Time: '.round(microtime(true) - $time_start, 4).' seconds. -->';
}

function wp_url_link(){
    $thisurl = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    return $thisurl;
}

function insert_gallery_shortcode_css() {
  echo ( '<link rel="stylesheet" type="text/css" media="all" href="'. _BYREV_PAGINATE_PLUGIN_DIR . 'byrev-gallery-pagination.css">' ); 
}

function byrev_gallery_shortcode_wptitle($title, $sep, $seplocation) {
	if(__PAGE_ALBUM != 1) {	return $title .= " Page ".__PAGE_ALBUM.' '.$sep.' ';	} else { return $title; }
}

function byrev_gallery_shortcode_permalink($permalink) {
	if(__PAGE_ALBUM == 1) return $permalink;	
	
	if (!isset($GLOBALS['gallery_post_id'])) return $permalink;
	
	global $posts;
	$link_id = $posts[0]->ID;
	$post_id = $GLOBALS['gallery_post_id'];		
	
	if ($post_id != $link_id) return $permalink;
	
	$permalink .= " ?page-album=".__PAGE_ALBUM;
}

function byrev_gallery_shortcode_init() {
	if(__PAGE_ALBUM == 1) return;
	
	global $posts;
	$posts[0]->post_title .= " / Page ".__PAGE_ALBUM;
	$GLOBALS['gallery_post_id'] = $posts[0]->ID;
}

add_filter('post_gallery', 'byrev_gallery_shortcode', 10, 2);

if (_INCLUDE_DEFAULT_CSS) add_action('wp_head', 'insert_gallery_shortcode_css');
	
if(__PAGE_ALBUM != 1) {
	add_filter('loop_start','byrev_gallery_shortcode_init');
	add_filter('wp_title', byrev_gallery_shortcode_wptitle,10,3 );
	add_filter('the_permalink', byrev_gallery_shortcode_permalink );
}	

#================= admin menu ======================
function init_byrev_gallery_shortcode_submenu() {
?>  
	<div class="wrap">  
		<h2>Gallery Pagination for Wordpress / ByREV Plugin</h2>  
		<hr>		
		<?php include('byrev-gallery-pagination-admin.php'); ?>
	</div>  
<?php  		
}

function add_byrev_gallery_shortcode_submenu() {  
	add_submenu_page('options-general.php', 'ByREV Gallery Pagination for Wordpress', 'Gallery Pagination', 10, __FILE__, 'init_byrev_gallery_shortcode_submenu');  
}  

add_action('admin_menu', 'add_byrev_gallery_shortcode_submenu');  

/***************************************************************************/
if ( isset( $_REQUEST["ajaxgal"] ) ) {
	require_once('byrev-gallery-ajax.php');
}
/***************************************************************************/

function byrev_gallery_init_script() {
    if (!is_admin()) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
        wp_enqueue_script( 'jquery' );
    }
}    
 
add_action('init', 'byrev_gallery_init_script');

include('byrev-gallery-ajax-reload.php');
	
	#==========================================	

?>
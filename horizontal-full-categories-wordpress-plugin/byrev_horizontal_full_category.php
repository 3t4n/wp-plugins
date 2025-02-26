<?php
/*
Plugin Name: ByREV Horizontal Full Categories
Plugin URI: http://byrev.org/bookmarks/wordpress/byrev-horizontal-full-categories-wordpress-plugin/
Description: Categories Wordpress Plugin - Show top level categories and children of categories in horizontal table mode
Author: ByREV ( Robert Emilian Vicol)
Version: 1.2b
Author URI: http://byrev.org/
*/

function byrev_horizontal_full_cat() {
global $ByREV_Full_Cat, $ByREV_Full_Cat_Cache;
	$cache = ($ByREV_Full_Cat['cache']=='on');
	$cat_html = &$ByREV_Full_Cat_Cache['html']['code'];
	$cat_time = &$ByREV_Full_Cat_Cache['html']['time'];
	
	if ($cache) {
		if ($cat_html != '') {
			$this_time = time();
			if ($cat_time > $this_time ) {
				echo $cat_html;	return; }	#~~~ print cat from cache and return;
		}
	}	
	if ($ByREV_Full_Cat['hide_emty_cat'] == 'on') {$hide_empty = 1;} else {$hide_empty=0;}
	$args = 'hide_empty='.$hide_empty.'&parent=0&exclude='.$ByREV_Full_Cat['exclude_cat'];	
	
	$categories=get_categories($args);
	$count_cat = count($categories);
	for ($i=0;$i<$count_cat;$i++) {
		$sub_categories[$i] = get_categories(array('child_of'=>$categories[$i]->cat_ID));	}

	$hmenu = $count_cat*24;
	$cat_html ='<div class="byrev_cat_h" style="height: '.$hmenu.'px; ">';

	for ($i=0;$i<$count_cat;$i++) {
		$cat = &$categories[$i];
		$link0 = '<a href="'.get_category_link( $cat->term_id ).'" title="View all posts in : '. __($cat->name).'" '.'>'.$cat->name.'</a>';	
		$cat_html .= '<div class="cat0"><span>'.$link0.'</span> &#9658; ';
		$sub_cat = &$sub_categories[$i];
		$cont_subcat = count($sub_cat);
		for ($j=0;$j<$cont_subcat;$j++) {
			$cat = &$sub_cat[$j];
			$linkj = '<a class="catx" href="'.get_category_link( $cat->term_id ).'" title="View all posts in : '.__( $cat->name ).'" '.'>'.$cat->name.'</a>';
			$cat_html .= $linkj.' | ';	}
		$cat_html .= '</div>';
	}
	$cat_html .='</div>';
	echo $cat_html;
	
	if ($cache) { 
		$cat_time = $this_time + $ByREV_Full_Cat['cahe_timeout'];
		update_option('ByREV_Full_Categories_Cache', $ByREV_Full_Cat_Cache ); 	}
}
#~~~~~~~~~~~~~~~~ Insert CSS ~~~~~~~~~~~~~~~~
function byrev_horizontal_full_category_head() {
global $ByREV_Full_Cat, $ByREV_Full_Cat_Cache;
	$ByREV_Full_Cat = get_option('ByREV_Full_Categories');

	$cache = ($ByREV_Full_Cat['cache']=='on');
	if ($cache) { $ByREV_Full_Cat_Cache = get_option('ByREV_Full_Categories_Cache'); } 
	else {$ByREV_Full_Cat_Cache = array('css'=>'','html'=> array('code'=>'', 'time'=>0) );  }
	
	if($ByREV_Full_Cat['default_css'] !='on') { return; }

	$css = &$ByREV_Full_Cat_Cache['css'];	
	if ( $css != '') { echo $css;  } 
	else { $css = '
        
<!-- ByREV Categories Wordpress Plugin - Horizontal Subcategories - http://byrev.org === -->
<style>
.byrev_cat_h {background-color:'.$ByREV_Full_Cat['bg_cat_warp'].'; padding: 5px 10px 5px 5px; border: 1px solid '.$ByREV_Full_Cat['bord_cat_warp'].'; margin: 0px auto;}
.cat0 { float: left; width: 100%; margin: 3px; background-color:'.$ByREV_Full_Cat['bg_subcat_line'].'; font-family: Arial; text-transform: capitalize; font-weight: bold; font-size: 13px; border-bottom: 1px dotted '.$ByREV_Full_Cat['bord_subcat_line'].'; }
.cat0 a { text-decoration: none; }
.cat0 span { width: '.$ByREV_Full_Cat['level0_width'].'px; display: inline-block; }
.cat0 span a { color: '.$ByREV_Full_Cat['basecat_color'].'; }
.catx { font-size: 12px; font-family: Courier New, Georgia, Verdana; text-decoration: none; color: '.$ByREV_Full_Cat['subcat_color'].';}
.cat0 a:hover { text-decoration: overline underline; }
</style>
<!-- === ByREV Categories Wordpress Plugin - Horizontal Subcategories - http://byrev.org === -->
        
'; 
	echo $css; 
	if ($cache) { update_option('ByREV_Full_Categories_Cache', $ByREV_Full_Cat_Cache ); }
	} 
}

$ByREV_Full_Cat = array(); $ByREV_Full_Cat_Cache = array();
if (is_admin()) { 
	include('byrev_horizontal_full_category_cfg.php'); 
	add_action('admin_menu', 'byrev_horizontal_full_cat_menu');
	register_activation_hook( __FILE__, 'byrev_horizontal_full_activate');
	register_deactivation_hook( __FILE__, 'byrev_horizontal_full_deactivate');	
}

add_action('wp_head', 'byrev_horizontal_full_category_head');
?>
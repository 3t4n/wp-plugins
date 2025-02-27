<?php
/**
 * @package TSL iframe unfilter
 * @author Oleg Somphane
 * @version 1.0
 */
/*
Plugin Name: TSL iframe unfilter
Plugin URI: http://www.twoslowlorises.com/
Description: A simple iframe unfilter plugin.
Author: Oleg Somphane
Version: 1.0
Author URI: http://www.twoslowlorises.com/
*/

function unfilter_iframe($initArray) {
	$initArray['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
	return $initArray;
}

add_filter('tiny_mce_before_init', 'unfilter_iframe');
?>
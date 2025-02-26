<?php defined('ABSPATH') or die("No script kiddies please!");

$background_type = $background_options['option'];
$wrap_inner_styles = '';
if ( $background_type === 'image' ) {
    $bg_image_url = $background_options['image']['url'];
    $wrap_inner_styles .= 'background-image: url(\'' . esc_url($bg_image_url) . '\');';
}
if($background_type === 'background-color'){
	$background_color = $background_options['background-color']['color'];
    $wrap_inner_styles .= "background-color: $background_color";
}
if( $detect->isMobile() && !$detect->isTablet() ){
	$responsive_class = 'ec-responsive';
}
// Any tablet device.
else if( $detect->isTablet() ){
	$responsive_class = 'ec-responsive';
}
// any desktop devices
else{
	$responsive_class = '';
}
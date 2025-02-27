<?php
/**
* Views: Social Icons 
*/
if ( ! defined( 'ABSPATH' ) ) {
exit;
}
$fl_social_icons_settings =  fl_get_social_icons_settings();
$position = 'bar';
if( isset( $fl_social_icons_settings['type'] ) ){
	$type = $fl_social_icons_settings['type'];
}
if ( $fl_templateurl = locate_template( array( 'floating-links/views/templates/social-icons/template-'.$type.'.php' ) ) ) {
	$fl_templateurl = $fl_templateurl;
} else {
	$fl_templateurl = FLOATING_LINKS_DIR . 'frontend/views/templates/social-icons/template-'.$type.'.php';
}
$fl_templateurl = apply_filters( 'fl_social_icons_template_url',  $fl_templateurl);
require $fl_templateurl;
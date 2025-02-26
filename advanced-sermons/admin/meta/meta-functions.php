<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Include metabox templates
require( plugin_dir_path( __FILE__ ) . 'sermon-details.php');


// Remove slider revolution metabox from sermons
function asp_remove_revolution_slider_meta_boxes() {
		remove_meta_box( 'mymetabox_revslider_0', 'sermons', 'normal' );
}
add_action( 'do_meta_boxes', 'asp_remove_revolution_slider_meta_boxes' );

<?php
defined( 'ABSPATH' ) or die();
include( WL_AGM_LITE_PLUGIN_DIR_PATH . '/admin/inc/helpers/WL_AGM_LITE_Helper.php' );

/* Fetching Location Post(Shortcode) Id */
extract( shortcode_atts( array(
	'id' => '',
), $attr ) );
$post_id = $attr['id'];

WL_AGM_LITE_Helper::get_multi_map_shortcode_data( $post_id );
?>

<div class="wl_agm container">
    <div id="map" class="wl_agm_map"></div>
</div>

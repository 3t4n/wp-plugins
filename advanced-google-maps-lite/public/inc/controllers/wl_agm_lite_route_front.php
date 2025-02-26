<?php
defined( 'ABSPATH' ) or die();
include( WL_AGM_LITE_PLUGIN_DIR_PATH . '/admin/inc/helpers/WL_AGM_LITE_Helper.php' );

extract( shortcode_atts( array(
	'id' => '',
), $attr ) );
$post_id = $attr['id'];
WL_AGM_LITE_Helper::get_multi_route_shortcode_data( $post_id );
?>
<div class="wl_agm container">
    <div id="route_map-<?php echo esc_attr( $post_id ); ?>"></div>
</div>

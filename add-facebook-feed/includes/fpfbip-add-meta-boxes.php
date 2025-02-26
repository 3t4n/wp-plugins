<?php
add_action( 'add_meta_boxes' , 'fpfbip_add_meta_boxes');



function fpfbip_add_meta_boxes(){

	add_meta_box( 'fpfbip_shortcode_meta_box' , 'Shortcode' , 'fpfbip_shortcode_meta_boxx' , 'fpfbip_facebook_feed','side');



}
function fpfbip_shortcode_meta_boxx( $post ){
	

	?>
	<p id="fpfbip_shortcode_label">Use this shortcode to add Facebook Feed in your Posts, Pages </p>
	<input style="width: 100%;
    text-align: center;
    font-weight: bold;
    font-size: 17px;" type="text" readonly id="tfbip_shortcode_value" name="fpfbip_shortcode_value" value="[arrow_fan_page id='<?php echo $post->ID; ?>']" />
	

	<?php
}

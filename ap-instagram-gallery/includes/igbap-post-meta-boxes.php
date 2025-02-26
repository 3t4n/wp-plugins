<?php
add_action( 'add_meta_boxes' , 'igbap_add_meta_boxes');

/* META BOXES */

function igbap_add_meta_boxes(){
// Shortcode meta box
	add_meta_box( 'igbap_shortcode_meta_box' , 'Shortcode' , 'igbap_shortcode_meta_box_UI' , 'arrow_insta_gallery','side');

}
function igbap_shortcode_meta_box_UI( $post ){
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	?>
	<p id="igbap_shortcode_label">Use this shortcode to add Instagram Feed in your Posts, Pages: </p>
<input style="width: 100%;
    text-align: center;
    font-weight: bold;
    font-size: 16px;" type="text" readonly id="igbap_shortcode_value" name="igbap_shortcode_value" value="[arrow_insta_gallery id='<?php echo $post->ID; ?>']" />
    <p>To show Instagram Photos into your Widget Please <a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Buy Premium Version</a></p>
	<?php
}
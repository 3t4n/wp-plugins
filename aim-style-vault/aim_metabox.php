<?php /**
 * Create meta box for adding custom CSS styles
 *
 * @version: 1.0.0
*/

add_action( 'add_meta_boxes', 'asv_meta_box_add' );
function asv_meta_box_add()
{
	add_meta_box( 'asv-meta-box-id', 'AIM Style Vault', 'asv_meta_box_cb', 'aim_style_vault', 'normal', 'high' );
}

function asv_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$text = isset( $values['asv_meta_box_text'] ) ? esc_attr( $values['asv_meta_box_text'][0] ) : '';

	wp_nonce_field( 'asv_meta_box_nonce', 'meta_box_nonce' );
?>
	<p>
		<label for="asv_meta_box_text">Custom CSS Stylesheet</label>
		<textarea name="asv_meta_box_text" id="asv_meta_box_text" cols="60" rows="15" style="width:97%"><?php echo $text; ?></textarea>
	</p>
	
	<p>
		<div style="margin: 1em 0 0 1em;">
		<label for="asv_meta_box_resources">Online CSS Style Resources</label>
			<li><a href="http://www.w3schools.com/css/default.asp" target="_blank" alt="W3Schools link">W3Schools</a> is a resource for learning more about using CSS.</li>
			<li><a href="http://www.colorpicker.com/" target="_blank" alt="ColorPicker.com link">ColorPicker.com</a> is a free online color picker tool for generating hex color values that you can use in your CSS styles. In addition to picking colors, you can generate complementary color palettes with the click of a button.</li>
			<li><a href="http://cssmate.com/csseditor.html" target="_blank" alt="CSS Mate link">CSS Mate</a> generates standard CSS code from properties and values that you enter.</li>
			<li><a href="http://www.css3maker.com/css-gradient.html" target="_blank" alt="CSS3 Maker link">CSS3 Maker</a> generates CSS3 code from selections and shows which browsers are compliant.</li>
		</div>
	</p>

<?php	
}

add_action( 'save_post', 'asv_meta_box_save' );
function asv_meta_box_save( $post_id ) {
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'asv_meta_box_nonce' ) ) return;
	
	//  save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchors can only have href attribute
		)
	);
	
	//  make sure your data is set
	if( isset( $_POST['asv_meta_box_text'] ) )
		update_post_meta( $post_id, 'asv_meta_box_text', wp_kses( $_POST['asv_meta_box_text'], $allowed ) );
}
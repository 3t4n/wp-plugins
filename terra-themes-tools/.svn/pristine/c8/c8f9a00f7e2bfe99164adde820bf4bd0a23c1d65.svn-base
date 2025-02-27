<?php

/**
 * Metabox for the Slides custom post type
 *
 * @package    	Terra_Themes_Tools
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


function terra_themes_tools_slides_meta() {
	new Terra_Themes_Tools_Slides_Meta();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'terra_themes_tools_slides_meta' );
	add_action( 'load-post-new.php', 'terra_themes_tools_slides_meta' );
}

class Terra_Themes_Tools_Slides_Meta {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
		$post_types = array('page');

		if ( in_array( $post_type, $post_types ) ) {
			add_meta_box(
				'terra_themes_slider_metabox'
				,__( 'Header Shortcode', 'mountain' )
				,array( $this, 'render_meta_box_content' )
				,$post_type
				,'advanced'
			);
		}
	}


	public function save( $post_id ) {
	
		if ( ! isset( $_POST['terra_themes_tools_slide_nonce'] ) )
			return $post_id;

		$nonce = $_POST['terra_themes_tools_slide_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'terra_themes_tools_inner_custom_box' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$terra_themes_tools_header_slider = isset( $_POST['terra_themes_tools_header_slider'] ) ? sanitize_text_field($_POST['terra_themes_tools_header_slider']) : false;
		
		update_post_meta( $post_id, '_terra_themes_header_slider', $terra_themes_tools_header_slider );

	}

	public function render_meta_box_content( $post ) {
	
		wp_nonce_field( 'terra_themes_tools_inner_custom_box', 'terra_themes_tools_slide_nonce' );

		$terra_themes_tools_header_slider	= get_post_meta( $post->ID, '_terra_themes_header_slider', true );
	?>

	<div class="tt-meta-wrapper">
		<div class="tt-meta-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Shortcode', 'terra_themes_tools' ); ?></h4>
				<p><?php _e('Paste in your shortcode to display a slider or video in the header area on this page.', 'terra_themes_tools' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" class="form-control tt-form-element" id="terra_themes_tools_header_slider" name="terra_themes_tools_header_slider" value="<?php echo esc_html($terra_themes_tools_header_slider); ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	}

}
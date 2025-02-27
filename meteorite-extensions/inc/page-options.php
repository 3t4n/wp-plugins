<?php

/**
 * Page options extensions for Meteorite
 *
 * @package    	Meteorite_Extensions
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

function call_Meteorite_Extensions_Page_Metabox() {
	new Meteorite_Extensions_Page_Metabox();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'call_Meteorite_Extensions_Page_Metabox' );
	add_action( 'load-post-new.php', 'call_Meteorite_Extensions_Page_Metabox' );
}

class Meteorite_Extensions_Page_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
		$post_types = array('page');

		if ( in_array( $post_type, $post_types ) ) {
			add_meta_box(
				'meteorite_extensions_page_metabox'
				,__( 'Header Buttons', 'meteorite_extensions' )
				,array( $this, 'meteorite_extensions_render_meta_box_content' )
				,$post_type
				,'advanced'
				,'default'
			);
		}
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['meteorite_extensions_inner_custom_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['meteorite_extensions_inner_custom_box_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'meteorite_extensions_inner_custom_box' ) )
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

		$meteorite_header_button_text_one 	= isset( $_POST['meteorite_header_button_text_one'] ) ? sanitize_text_field($_POST['meteorite_header_button_text_one']) : false;
		$meteorite_header_button_text_two 	= isset( $_POST['meteorite_header_button_text_two'] ) ? sanitize_text_field($_POST['meteorite_header_button_text_two']) : false;
		$meteorite_header_button_link_one 	= isset( $_POST['meteorite_header_button_link_one'] ) ? esc_url_raw($_POST['meteorite_header_button_link_one']) : false;
		$meteorite_header_button_link_two 	= isset( $_POST['meteorite_header_button_link_two'] ) ? esc_url_raw($_POST['meteorite_header_button_link_two']) : false;

		update_post_meta( $post_id, '_meteorite_header_button_text_one', $meteorite_header_button_text_one );
		update_post_meta( $post_id, '_meteorite_header_button_text_two', $meteorite_header_button_text_two );
		update_post_meta( $post_id, '_meteorite_header_button_link_one', $meteorite_header_button_link_one );
		update_post_meta( $post_id, '_meteorite_header_button_link_two', $meteorite_header_button_link_two );

	}

	public function meteorite_extensions_render_meta_box_content( $post ) {
	
		wp_nonce_field( 'meteorite_extensions_inner_custom_box', 'meteorite_extensions_inner_custom_box_nonce' );

		$meteorite_header_button_text_one	= get_post_meta( $post->ID, '_meteorite_header_button_text_one', true );
		$meteorite_header_button_text_two	= get_post_meta( $post->ID, '_meteorite_header_button_text_two', true );
		$meteorite_header_button_link_one	= get_post_meta( $post->ID, '_meteorite_header_button_link_one', true );
		$meteorite_header_button_link_two	= get_post_meta( $post->ID, '_meteorite_header_button_link_two', true );
	?>

	<div class="tt-meta-wrapper">
		<div class="tt-meta-section">
			<div class="tt-field-desc">
				<h4><?php _e('Button 1', 'meteorite_extensions') ?></h4>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Label', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="meteorite_header_button_text_one" name="meteorite_header_button_text_one" value="<?php echo esc_html($meteorite_header_button_text_one); ?>"></p>
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Link', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="meteorite_header_button_link_one" name="meteorite_header_button_link_one" value="<?php echo esc_url($meteorite_header_button_link_one); ?>"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tt-meta-section">
			<div class="tt-field-desc">
				<h4><?php _e('Button 2', 'meteorite_extensions') ?></h4>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Label', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="meteorite_header_button_text_two" name="meteorite_header_button_text_two" value="<?php echo esc_html($meteorite_header_button_text_two); ?>"></p>
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Link', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="meteorite_header_button_link_two" name="meteorite_header_button_link_two" value="<?php echo esc_url($meteorite_header_button_link_two); ?>"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	}
}
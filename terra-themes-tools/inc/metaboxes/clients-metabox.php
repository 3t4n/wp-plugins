<?php

/**
 * Metabox for the Clients custom post type
 *
 * @package    	Terra_Themes_Tools
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


function terra_themes_tools_clients_metabox() {
	new Terra_Themes_Tools_Clients_Metabox();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'terra_themes_tools_clients_metabox' );
	add_action( 'load-post-new.php', 'terra_themes_tools_clients_metabox' );
}

class Terra_Themes_Tools_Clients_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
		global $post;
		add_meta_box(
			'tt_clients_metabox'
			,__( 'Clients Info', 'terra_themes_tools' )
			,array( $this, 'render_meta_box_content' )
			,'clients'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['terra_themes_tools_clients_nonce'] ) )
			return $post_id;

		$nonce = $_POST['terra_themes_tools_clients_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'terra_themes_tools_clients' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'clients' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$link 	= isset( $_POST['terra_themes_tools_clients_info'] ) ? esc_url_raw($_POST['terra_themes_tools_clients_info']) : false;
		update_post_meta( $post_id, 'tt-client-link', $link );

	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'terra_themes_tools_clients', 'terra_themes_tools_clients_nonce' );

		$link = get_post_meta( $post->ID, 'tt-client-link', true ); //Types generated fields compatibility

	?>

		<div class="tt-meta-wrapper">
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Client Link', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('If you want your client logo to link somewhere, paste it in here.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_clients_info" name="terra_themes_tools_clients_info" value="<?php echo esc_url($link); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php
	}
}

<?php

/**
 * Project options extensions for Meteorite
 *
 * @package    	Meteorite_Extensions
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

function call_Meteorite_Extensions_Project_Metabox() {
	new Meteorite_Extensions_Project_Metabox();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'call_Meteorite_Extensions_Project_Metabox' );
	add_action( 'load-post-new.php', 'call_Meteorite_Extensions_Project_Metabox' );
}

class Meteorite_Extensions_Project_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
		$post_types = array('projects');

		if ( in_array( $post_type, $post_types ) ) {
			add_meta_box(
				'meteorite_extensions_project_header_infos'
				,__( 'Header Text', 'meteorite_extensions' )
				,array( $this, 'render_meteorite_project_header_infos' )
				,$post_type
				,'advanced'
				,'default'
			);
			add_meta_box(
				'meteorite_extensions_project_header_buttons'
				,__( 'Header Buttons', 'meteorite_extensions' )
				,array( $this, 'meteorite_project_header_buttons' )
				,$post_type
				,'advanced'
				,'default'
			);
			add_meta_box(
				'terra_themes_slider_metabox'
				,__( 'Header Shortcode', 'mountain' )
				,array( $this, 'render_meta_box_content' )
				,$post_type
				,'advanced'
				,'default'
			);
		}
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['meteorite_extensions_project_header_infos_nonce'] ) )
			return $post_id;

		$nonce = $_POST['meteorite_extensions_project_header_infos_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'meteorite_extensions_project_nonce' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'projects' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		}

		$meteorite_project_image_header_title 		= isset( $_POST['meteorite_project_image_header_title'] ) ? wp_kses_post($_POST['meteorite_project_image_header_title']) : false;
		$meteorite_project_image_header_title_tag 	= isset( $_POST['meteorite_project_image_header_title_tag'] ) ? esc_attr($_POST['meteorite_project_image_header_title_tag']) : false;
		$meteorite_project_image_header_text 		= isset( $_POST['meteorite_project_image_header_text'] ) ? wp_kses_post($_POST['meteorite_project_image_header_text']) : false;
		$meteorite_project_image_header_text_tag 	= isset( $_POST['meteorite_project_image_header_text_tag'] ) ? esc_attr($_POST['meteorite_project_image_header_text_tag']) : false;

		$meteorite_project_header_button_text_one 	= isset( $_POST['meteorite_project_header_button_text_one'] ) ? sanitize_text_field($_POST['meteorite_project_header_button_text_one']) : false;
		$meteorite_project_header_button_text_two 	= isset( $_POST['meteorite_project_header_button_text_two'] ) ? sanitize_text_field($_POST['meteorite_project_header_button_text_two']) : false;
		$meteorite_project_header_button_link_one 	= isset( $_POST['meteorite_project_header_button_link_one'] ) ? esc_url_raw($_POST['meteorite_project_header_button_link_one']) : false;
		$meteorite_project_header_button_link_two 	= isset( $_POST['meteorite_project_header_button_link_two'] ) ? esc_url_raw($_POST['meteorite_project_header_button_link_two']) : false;

		$terra_themes_tools_header_slider = isset( $_POST['terra_themes_tools_header_slider'] ) ? sanitize_text_field($_POST['terra_themes_tools_header_slider']) : false;

		update_post_meta( $post_id, '_meteorite_project_image_header_title', $meteorite_project_image_header_title );
		update_post_meta( $post_id, '_meteorite_project_image_header_title_tag', $meteorite_project_image_header_title_tag );
		update_post_meta( $post_id, '_meteorite_project_image_header_text', $meteorite_project_image_header_text );
		update_post_meta( $post_id, '_meteorite_project_image_header_text_tag', $meteorite_project_image_header_text_tag );

		update_post_meta( $post_id, '_meteorite_project_header_button_text_one', $meteorite_project_header_button_text_one );
		update_post_meta( $post_id, '_meteorite_project_header_button_text_two', $meteorite_project_header_button_text_two );
		update_post_meta( $post_id, '_meteorite_project_header_button_link_one', $meteorite_project_header_button_link_one );
		update_post_meta( $post_id, '_meteorite_project_header_button_link_two', $meteorite_project_header_button_link_two );

		update_post_meta( $post_id, '_terra_themes_header_slider', $terra_themes_tools_header_slider );

	}

	public function render_meteorite_project_header_infos( $post ) {
		wp_nonce_field( 'meteorite_extensions_project_nonce', 'meteorite_extensions_project_header_infos_nonce' );

		$meteorite_project_image_header_title		= get_post_meta( $post->ID, '_meteorite_project_image_header_title', true );
		$meteorite_project_image_header_title_tag	= get_post_meta( $post->ID, '_meteorite_project_image_header_title_tag', true );
		$meteorite_project_image_header_text		= get_post_meta( $post->ID, '_meteorite_project_image_header_text', true );
		$meteorite_project_image_header_text_tag	= get_post_meta( $post->ID, '_meteorite_project_image_header_text_tag', true );
	?>

	<div class="tt-meta-wrapper">
		<div class="tt-meta-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Header Image Headline', 'meteorite_extensions' ); ?></h4>
				<p><?php _e('Enter a headline for this header image', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="meteorite_project_image_header_title" name="meteorite_project_image_header_title" value="<?php echo esc_html($meteorite_project_image_header_title); ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Tag', 'meteorite_extensions' ); ?></em>
							<select id='meteorite_project_image_header_title_tag' name='meteorite_project_image_header_title_tag' class="form-control tt-form-element">
							<?php
							$options = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $meteorite_project_image_header_title_tag == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tt-meta-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Header Image Text', 'meteorite_extensions' ); ?></h4>
				<p><?php _e('Enter a text for this header image', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="meteorite_project_image_header_text" name="meteorite_project_image_header_text" value="<?php echo esc_html($meteorite_project_image_header_text); ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Tag', 'meteorite_extensions' ); ?></em>
							<select id='meteorite_project_image_header_text_tag' name='meteorite_project_image_header_text_tag' class="form-control tt-form-element">
							<?php
							$options = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $meteorite_project_image_header_text_tag == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	}

	public function meteorite_project_header_buttons( $post ) {
		wp_nonce_field( 'meteorite_extensions_project_nonce', 'meteorite_extensions_project_header_infos_nonce' );

		$meteorite_project_header_button_text_one	= get_post_meta( $post->ID, '_meteorite_project_header_button_text_one', true );
		$meteorite_project_header_button_text_two	= get_post_meta( $post->ID, '_meteorite_project_header_button_text_two', true );
		$meteorite_project_header_button_link_one	= get_post_meta( $post->ID, '_meteorite_project_header_button_link_one', true );
		$meteorite_project_header_button_link_two	= get_post_meta( $post->ID, '_meteorite_project_header_button_link_two', true );
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
							<input type="text" class="form-control tt-form-element" id="meteorite_project_header_button_text_one" name="meteorite_project_header_button_text_one" value="<?php echo esc_html($meteorite_project_header_button_text_one); ?>"></p>
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Link', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="meteorite_project_header_button_link_one" name="meteorite_project_header_button_link_one" value="<?php echo esc_url($meteorite_project_header_button_link_one); ?>"></p>
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
							<input type="text" class="form-control tt-form-element" id="meteorite_project_header_button_text_two" name="meteorite_project_header_button_text_two" value="<?php echo esc_html($meteorite_project_header_button_text_two); ?>"></p>
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Link', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="meteorite_project_header_button_link_two" name="meteorite_project_header_button_link_two" value="<?php echo esc_url($meteorite_project_header_button_link_two); ?>"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'terra_themes_tools_inner_custom_box', 'terra_themes_tools_slide_nonce' );

		$terra_themes_tools_header_slider = get_post_meta( $post->ID, '_terra_themes_header_slider', true );
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

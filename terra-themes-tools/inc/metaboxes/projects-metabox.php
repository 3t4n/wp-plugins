<?php

/**
 * Metabox for the Projects custom post type
 *
 * @package    	Terra_Themes_Tools
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

function terra_themes_tools_projects_metabox() {
	new Terra_Themes_Tools_Projects_Metabox();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'terra_themes_tools_projects_metabox' );
	add_action( 'load-post-new.php', 'terra_themes_tools_projects_metabox' );
}

class Terra_Themes_Tools_Projects_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
		global $post;
		add_meta_box(
			'tt_projects_metabox_details'
			,__( 'Projects Details', 'terra_themes_tools' )
			,array( $this, 'render_meta_box_details' )
			,'projects'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['terra_themes_tools_projects_nonce'] ) )
			return $post_id;

		$nonce = $_POST['terra_themes_tools_projects_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'terra_themes_tools_projects' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'projects' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$widget_image_url		= isset( $_POST['terra_themes_tools_widget_image_url'] ) ? esc_url_raw($_POST['terra_themes_tools_widget_image_url']) : false;
		$project_type			= isset( $_POST['terra_themes_tools_project_type'] ) ? esc_attr($_POST['terra_themes_tools_project_type']) : false;
		$detail_heading_one		= isset( $_POST['terra_themes_tools_projects_detail_heading_one'] ) ? esc_html($_POST['terra_themes_tools_projects_detail_heading_one']) : false;
		$detail_desc_one		= isset( $_POST['terra_themes_tools_projects_detail_desc_one'] ) ? wp_kses_post(force_balance_tags($_POST['terra_themes_tools_projects_detail_desc_one'])) : false;
		$detail_heading_two		= isset( $_POST['terra_themes_tools_projects_detail_heading_two'] ) ? esc_html($_POST['terra_themes_tools_projects_detail_heading_two']) : false;
		$detail_desc_two		= isset( $_POST['terra_themes_tools_projects_detail_desc_two'] ) ? wp_kses_post(force_balance_tags($_POST['terra_themes_tools_projects_detail_desc_two'])) : false;
		$detail_heading_three	= isset( $_POST['terra_themes_tools_projects_detail_heading_three'] ) ? esc_html($_POST['terra_themes_tools_projects_detail_heading_three']) : false;
		$detail_desc_three		= isset( $_POST['terra_themes_tools_projects_detail_desc_three'] ) ? wp_kses_post(force_balance_tags($_POST['terra_themes_tools_projects_detail_desc_three'])) : false;
		$detail_heading_four	= isset( $_POST['terra_themes_tools_projects_detail_heading_four'] ) ? esc_html($_POST['terra_themes_tools_projects_detail_heading_four']) : false;
		$detail_desc_four		= isset( $_POST['terra_themes_tools_projects_detail_desc_four'] ) ? wp_kses_post(force_balance_tags($_POST['terra_themes_tools_projects_detail_desc_four'])) : false;
		$link 					= isset( $_POST['terra_themes_tools_projects_link'] ) ? esc_url_raw($_POST['terra_themes_tools_projects_link']) : false;

		update_post_meta( $post_id, 'tt-widget-image-url', $widget_image_url );
		update_post_meta( $post_id, 'tt-project-type', $project_type );
		update_post_meta( $post_id, 'tt-project-detail-heading-one', $detail_heading_one );
		update_post_meta( $post_id, 'tt-project-detail-desc-one', $detail_desc_one );
		update_post_meta( $post_id, 'tt-project-detail-heading-two', $detail_heading_two );
		update_post_meta( $post_id, 'tt-project-detail-desc-two', $detail_desc_two );
		update_post_meta( $post_id, 'tt-project-detail-heading-three', $detail_heading_three );
		update_post_meta( $post_id, 'tt-project-detail-desc-three', $detail_desc_three );
		update_post_meta( $post_id, 'tt-project-detail-heading-four', $detail_heading_four );
		update_post_meta( $post_id, 'tt-project-detail-desc-four', $detail_desc_four );
		update_post_meta( $post_id, 'tt-project-link', $link );

	}

	public function render_meta_box_details( $post ) {
		wp_nonce_field( 'terra_themes_tools_projects', 'terra_themes_tools_projects_nonce' );

		$widget_image_url		= get_post_meta( $post->ID, 'tt-widget-image-url', true );
		$project_type			= get_post_meta( $post->ID, 'tt-project-type', true );
		$detail_heading_one		= get_post_meta( $post->ID, 'tt-project-detail-heading-one', true );
		$detail_desc_one		= get_post_meta( $post->ID, 'tt-project-detail-desc-one', true );
		$detail_heading_two		= get_post_meta( $post->ID, 'tt-project-detail-heading-two', true );
		$detail_desc_two		= get_post_meta( $post->ID, 'tt-project-detail-desc-two', true );
		$detail_heading_three	= get_post_meta( $post->ID, 'tt-project-detail-heading-three', true );
		$detail_desc_three		= get_post_meta( $post->ID, 'tt-project-detail-desc-three', true );
		$detail_heading_four	= get_post_meta( $post->ID, 'tt-project-detail-heading-four', true );
		$detail_desc_four		= get_post_meta( $post->ID, 'tt-project-detail-desc-four', true );
		$link 					= get_post_meta( $post->ID, 'tt-project-link', true );

	?>

		<div class="tt-meta-wrapper">
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Project Image (Widgets)', 'terra_themes_tools' ); ?></h4>
					<p><?php _e( 'Choose an image that will be used in project widgets. Featured image is used on single page.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="tt-media-uploader">
									<div class="tt-media-image-holder" <?php if ( ! $widget_image_url ) { echo 'style="display: none;"'; } ?>>
										<img src="<?php echo esc_url( terra_themes_tools_get_attachment_thumb_url( $widget_image_url ) ); ?>" alt="" class="tt-media-image img-thumbnail" />
									</div>
									<div class="tt-media-meta-fields">
										<input type="hidden" class="tt-media-upload-url" id="terra_themes_tools_widget_image_url" name="terra_themes_tools_widget_image_url" value="<?php echo esc_url( $widget_image_url ); ?>" />
									</div>
									<a class="tt-media-upload-btn btn btn-primary" href="#"><?php _e( 'Upload', 'terra_themes_tools' ); ?></a>
									<a class="tt-media-remove-btn btn btn-default" href="#" <?php if ( ! $widget_image_url ) { echo 'style="display: none;"'; } ?>><?php _e( 'Remove', 'terra_themes_tools' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Project Type', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Choose the project type for single display.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<select name='terra_themes_tools_project_type' id='terra_themes_tools_project_type' class="form-control tt-form-element">
								<?php
								$options = array('Wide', 'Half');
								foreach ($options as $option) {
								echo '<option value="' . $option . '" id="' . $option . '"', $project_type == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
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
					<h4><?php _e( 'Custom Field (1)', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Provide some information about your project. E.g. client, year etc.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Heading', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_detail_heading_one" name="terra_themes_tools_projects_detail_heading_one" value="<?php echo esc_html($detail_heading_one); ?>">
							</div>
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Description', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_detail_desc_one" name="terra_themes_tools_projects_detail_desc_one" value="<?php echo esc_html($detail_desc_one); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Custom Field (2)', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Provide some information about your project. E.g. client, year etc.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Heading', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_detail_heading_two" name="terra_themes_tools_projects_detail_heading_two" value="<?php echo esc_html($detail_heading_two); ?>">
							</div>
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Description', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_detail_desc_two" name="terra_themes_tools_projects_detail_desc_two" value="<?php echo esc_html($detail_desc_two); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Custom Field (3)', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Provide some information about your project. E.g. client, year etc.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Heading', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_detail_heading_three" name="terra_themes_tools_projects_detail_heading_three" value="<?php echo esc_html($detail_heading_three); ?>">
							</div>
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Description', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_detail_desc_three" name="terra_themes_tools_projects_detail_desc_three" value="<?php echo esc_html($detail_desc_three); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Custom Field (4)', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Provide some information about your project. E.g. client, year etc.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Heading', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_detail_heading_four" name="terra_themes_tools_projects_detail_heading_four" value="<?php echo esc_html($detail_heading_four); ?>">
							</div>
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Description', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_detail_desc_four" name="terra_themes_tools_projects_detail_desc_four" value="<?php echo esc_html($detail_desc_four); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Project Link', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('If you want your project to link somewhere, paste it in here.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_projects_link" name="terra_themes_tools_projects_link" value="<?php echo esc_url($link); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php
	}
}

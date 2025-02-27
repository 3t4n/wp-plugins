<?php

/**
 * Metabox for the Slides custom post type
 *
 * @package    	Terra_Themes_Tools
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


function terra_themes_tools_slides_metabox() {
    new Terra_Themes_Tools_Slides_Metabox();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'terra_themes_tools_slides_metabox' );
    add_action( 'load-post-new.php', 'terra_themes_tools_slides_metabox' );
}

class Terra_Themes_Tools_Slides_Metabox {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
		add_meta_box(
			'tt_slides_metabox_image_video'
			,__( 'Terra Themes Slide Type', 'terra_themes_tools' )
			,array( $this, 'render_meta_box_slide_type' )
			,'slides'
			,'advanced'
			,'high'
		);
		add_meta_box(
			'tt_slides_metabox_image'
			,__( 'Terra Themes Slide Image', 'terra_themes_tools' )
			,array( $this, 'render_meta_box_slide_image' )
			,'slides'
			,'advanced'
			,'high'
		);
		add_meta_box(
			'tt_slides_metabox_video'
			,__( 'Terra Themes Slide Video', 'terra_themes_tools' )
			,array( $this, 'render_meta_box_slide_video' )
			,'slides'
			,'advanced'
			,'high'
		);
		add_meta_box(
			'tt_slides_metabox_content'
			,__( 'Terra Themes Slide Content', 'terra_themes_tools' )
			,array( $this, 'render_meta_box_slide_content' )
			,'slides'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['terra_themes_tools_slides_nonce'] ) )
			return $post_id;

		$nonce = $_POST['terra_themes_tools_slides_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'terra_themes_slides' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'slides' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$slide_is_video 		= isset( $_POST['terra_themes_tools_slide_is_video'] ) ? (bool)($_POST['terra_themes_tools_slide_is_video']) : '';
		$title 					= isset( $_POST['terra_themes_tools_title'] ) ? sanitize_text_field($_POST['terra_themes_tools_title']) : false;
		$title_tag 				= isset( $_POST['terra_themes_tools_title_tag'] ) ? sanitize_text_field($_POST['terra_themes_tools_title_tag']) : 'h2';
		$text 					= isset( $_POST['terra_themes_tools_text'] ) ? sanitize_text_field($_POST['terra_themes_tools_text']) : false;
		$text_tag 				= isset( $_POST['terra_themes_tools_text_tag'] ) ? sanitize_text_field($_POST['terra_themes_tools_text_tag']) : 'p';
		$button_text_one 		= isset( $_POST['terra_themes_tools_button_text_one'] ) ? sanitize_text_field($_POST['terra_themes_tools_button_text_one']) : false;
		$button_text_two 		= isset( $_POST['terra_themes_tools_button_text_two'] ) ? sanitize_text_field($_POST['terra_themes_tools_button_text_two']) : false;
		$button_link_one		= isset( $_POST['terra_themes_tools_button_link_one'] ) ? esc_url_raw($_POST['terra_themes_tools_button_link_one']) : false;
		$button_link_two		= isset( $_POST['terra_themes_tools_button_link_two'] ) ? esc_url_raw($_POST['terra_themes_tools_button_link_two']) : false;
		$arrow_button			= isset( $_POST['terra_themes_tools_arrow_button'] ) ? esc_attr($_POST['terra_themes_tools_arrow_button']) : false;
		$content_align			= isset( $_POST['terra_themes_tools_content_align'] ) ? esc_attr($_POST['terra_themes_tools_content_align']) : false;
		$image_url				= isset( $_POST['terra_themes_tools_image_url'] ) ? esc_url_raw($_POST['terra_themes_tools_image_url']) : false;
		$image_alt				= isset( $_POST['terra_themes_tools_image_alt'] ) ? esc_attr($_POST['terra_themes_tools_image_alt']) : false;
		$image_zoom				= isset( $_POST['terra_themes_tools_image_zoom'] ) ? esc_attr($_POST['terra_themes_tools_image_zoom']) : false;
		$video_webm				= isset( $_POST['terra_themes_tools_video_webm'] ) ? esc_url_raw($_POST['terra_themes_tools_video_webm']) : false;
		$video_mp4				= isset( $_POST['terra_themes_tools_video_mp4'] ) ? esc_url_raw($_POST['terra_themes_tools_video_mp4']) : false;
		$video_ogv				= isset( $_POST['terra_themes_tools_video_ogv'] ) ? esc_url_raw($_POST['terra_themes_tools_video_ogv']) : false;
		$video_poster_url		= isset( $_POST['terra_themes_tools_video_poster_url'] ) ? esc_url_raw($_POST['terra_themes_tools_video_poster_url']) : false;
		$video_poster_alt		= isset( $_POST['terra_themes_tools_video_poster_alt'] ) ? esc_attr($_POST['terra_themes_tools_video_poster_alt']) : false;
		
		update_post_meta( $post_id, 'tt-slide-is-video', $slide_is_video );
		update_post_meta( $post_id, 'tt-title', $title );
		update_post_meta( $post_id, 'tt-title-tag', $title_tag );
		update_post_meta( $post_id, 'tt-text', $text );
		update_post_meta( $post_id, 'tt-text-tag', $text_tag );
		update_post_meta( $post_id, 'tt-button-text-one', $button_text_one );
		update_post_meta( $post_id, 'tt-button-text-two', $button_text_two );
		update_post_meta( $post_id, 'tt-button-link-one', $button_link_one );
		update_post_meta( $post_id, 'tt-button-link-two', $button_link_two );
		update_post_meta( $post_id, 'tt-arrow-button', $arrow_button );
		update_post_meta( $post_id, 'tt-content-align', $content_align );
		update_post_meta( $post_id, 'tt-image-url', $image_url );
		update_post_meta( $post_id, 'tt-image-alt', $image_alt );
		update_post_meta( $post_id, 'tt-image-zoom', $image_zoom );
		update_post_meta( $post_id, 'tt-video-webm', $video_webm );
		update_post_meta( $post_id, 'tt-video-mp4', $video_mp4 );
		update_post_meta( $post_id, 'tt-video-ogv', $video_ogv );
		update_post_meta( $post_id, 'tt-video-poster-url', $video_poster_url );
		update_post_meta( $post_id, 'tt-video-poster-alt', $video_poster_alt );
	}

	public function render_meta_box_slide_type( $post ) {
		wp_nonce_field( 'terra_themes_slides', 'terra_themes_tools_slides_nonce' );

		$slide_is_video = get_post_meta( $post->ID, 'tt-slide-is-video', true );
	?>

		<div class="tt-meta-wrapper">
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Slide Type', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Do you want to upload an image or a video?', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="tt-image-video-switcher">
									<p class="field switch switch-type">
										<label class="cb-disable <?php if ( $slide_is_video == false ) { echo 'cb-selected'; } ?>" data-show="#tt_slides_metabox_image" data-hide="#tt_slides_metabox_video"><?php _e( 'Image', 'terra_themes_tools' ); ?></label>
										<label class="cb-enable <?php if ( $slide_is_video == true ) { echo 'cb-selected'; } ?>" data-show="#tt_slides_metabox_video" data-hide="#tt_slides_metabox_image"><?php _e( 'Video', 'terra_themes_tools' ); ?></label>
										<input type="checkbox" id="terra_themes_tools_slide_is_video" class="checkbox terra_themes_tools_slide_is_video cb-hidden" name="terra_themes_tools_slide_is_video" <?php checked( $slide_is_video ); ?> />
										<input type="text" class="terra_themes_tools_slide_type" value="<?php if ( $slide_is_video == false ) { echo 'image'; } else { echo 'video'; } ?>" />
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php
	}

	public function render_meta_box_slide_image( $post ) {
		wp_nonce_field( 'terra_themes_slides', 'terra_themes_tools_slides_nonce' );

		$image_url	= get_post_meta( $post->ID, 'tt-image-url', true );
		$image_alt	= get_post_meta( $post->ID, 'tt-image-alt', true );
		$image_zoom	= get_post_meta( $post->ID, 'tt-image-zoom', true );
	?>

		<div class="tt-meta-wrapper">
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Slide Image', 'terra_themes_tools' ); ?></h4>
					<p><?php _e( 'Choose a background image.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="tt-media-uploader">
									<div class="tt-media-image-holder" <?php if ( ! $image_url ) { echo 'style="display: none;"'; } ?> >
										<img src="<?php echo esc_url( terra_themes_tools_get_attachment_thumb_url( $image_url ) ); ?>" alt="" class="tt-media-image img-thumbnail" />
									</div>
									<div class="tt-media-meta-fields">
										<input type="hidden" class="tt-media-upload-url" id="terra_themes_tools_image_url" name="terra_themes_tools_image_url" value="<?php echo esc_url($image_url); ?>" />
									</div>
									<a class="tt-media-upload-btn btn btn-primary" href="javascript:void(0)"><?php _e( 'Upload', 'terra_themes_tools' ); ?></a>
									<a class="tt-media-remove-btn btn btn-default" href="javascript:void(0)" style="display: none;"><?php _e( 'Remove', 'terra_themes_tools' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e('Image Alt Text', 'terra_themes_tools'); ?></h4>
					<p><?php _e( 'Describe your image here in a few words.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_image_alt" name="terra_themes_tools_image_alt" value="<?php echo esc_attr($image_alt); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Image Zoom Effect', 'terra_themes_tools' ); ?></h4>
					<p><?php _e( 'Choose an image zoom effect.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<select id='terra_themes_tools_image_zoom' name='terra_themes_tools_image_zoom' class="form-control tt-form-element">
								<?php
								$options = array('None', 'Zoom In Center', 'Zoom In Top Left', 'Zoom In Top Right', 'Zoom In Bottom Left', 'Zoom In Bottom Right');
								foreach ($options as $option) {
								echo '<option value="' . $option . '" id="' . $option . '"', $image_zoom == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
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

	public function render_meta_box_slide_video( $post ) {
		wp_nonce_field( 'terra_themes_slides', 'terra_themes_tools_slides_nonce' );

		$video_webm			= get_post_meta( $post->ID, 'tt-video-webm', true );
		$video_mp4			= get_post_meta( $post->ID, 'tt-video-mp4', true );
		$video_ogv			= get_post_meta( $post->ID, 'tt-video-ogv', true );
		$video_poster_url	= get_post_meta( $post->ID, 'tt-video-poster-url', true );
		$video_poster_alt	= get_post_meta( $post->ID, 'tt-video-poster-alt', true );
	?>

		<div class="tt-meta-wrapper tt-hide-initial">
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Video - webm', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Path to the <strong>webm</strong> file that you have previously uploaded in Media Section.', 'terra_themes_tools'); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_video_webm" name="terra_themes_tools_video_webm" value="<?php echo esc_html($video_webm); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Video - mp4', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Path to the <strong>mp4</strong> file that you have previously uploaded in Media Section.', 'terra_themes_tools'); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_video_mp4" name="terra_themes_tools_video_mp4" value="<?php echo esc_html($video_mp4); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Video - ogv', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Path to the <strong>ogv</strong> file that you have previously uploaded in Media Section.', 'terra_themes_tools'); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_video_ogv" name="terra_themes_tools_video_ogv" value="<?php echo esc_html($video_ogv); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Video Preview Image', 'terra_themes_tools' ); ?></h4>
					<p><?php _e( 'Choose a background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="tt-media-uploader">
									<div class="tt-media-image-holder" <?php if ( ! $video_poster_url ) { echo 'style="display: none;"'; } ?> >
										<img src="<?php echo esc_url( terra_themes_tools_get_attachment_thumb_url( $video_poster_url ) ); ?>" alt="" class="tt-media-image img-thumbnail" />
									</div>
									<div class="tt-media-meta-fields">
										<input type="hidden" class="tt-media-upload-url" id="terra_themes_tools_video_poster_url" name="terra_themes_tools_video_poster_url" value="<?php echo esc_url($video_poster_url); ?>" />
									</div>
									<a class="tt-media-upload-btn btn btn-primary" href="javascript:void(0)"><?php _e( 'Upload', 'terra_themes_tools' ); ?></a>
									<a class="tt-media-remove-btn btn btn-default" href="javascript:void(0)" style="display: none;"><?php _e( 'Remove', 'terra_themes_tools' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Video Image Alt Text', 'terra_themes_tools' ); ?></h4>
					<p><?php _e( 'Describe your image here in a few words.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_video_poster_alt" name="terra_themes_tools_video_poster_alt" value="<?php echo esc_attr($video_poster_alt); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<?php
	}

	public function render_meta_box_slide_content( $post ) {
		wp_nonce_field( 'terra_themes_slides', 'terra_themes_tools_slides_nonce' );

		$title			 = get_post_meta( $post->ID, 'tt-title', true );
		$title_tag		 = get_post_meta( $post->ID, 'tt-title-tag', true );
		$text			 = get_post_meta( $post->ID, 'tt-text', true );
		$text_tag		 = get_post_meta( $post->ID, 'tt-text-tag', true );
		$button_text_one = get_post_meta( $post->ID, 'tt-button-text-one', true );
		$button_text_two = get_post_meta( $post->ID, 'tt-button-text-two', true );
		$button_link_one = get_post_meta( $post->ID, 'tt-button-link-one', true );
		$button_link_two = get_post_meta( $post->ID, 'tt-button-link-two', true );
		$arrow_button	 = get_post_meta( $post->ID, 'tt-arrow-button', true );
		$content_align	 = get_post_meta( $post->ID, 'tt-content-align', true );
	?>

		<div class="tt-meta-wrapper">
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Slide Title', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Enter a headline for this slide.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Text', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_title" name="terra_themes_tools_title" value="<?php echo esc_html($title); ?>">
							</div>
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Tag', 'terra_themes_tools' ); ?></em>
								<select name='terra_themes_tools_title_tag' id='terra_themes_tools_title_tag' class="form-control tt-form-element">
								<?php
								$options = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
								foreach ($options as $option) {
								echo '<option value="' . $option . '" id="' . $option . '"', $title_tag == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
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
					<h4><?php _e( 'Slide Text', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Enter a text for this slide.', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Text', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_text" name="terra_themes_tools_text" value="<?php echo esc_html($text); ?>">
							</div>
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Tag', 'terra_themes_tools' ); ?></em>
								<select name='terra_themes_tools_text_tag' id='terra_themes_tools_text_tag' class="form-control tt-form-element">
								<?php
								$options = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
								foreach ($options as $option) {
								echo '<option value="' . $option . '" id="' . $option . '"', $text_tag == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
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
					<h4><?php _e('Button 1', 'terra_themes_tools'); ?></h4>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Label', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_button_text_one" name="terra_themes_tools_button_text_one" value="<?php echo esc_html($button_text_one); ?>">
							</div>
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Link', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_button_link_one" name="terra_themes_tools_button_link_one" value="<?php echo esc_url($button_link_one); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e('Button 2', 'terra_themes_tools'); ?></h4>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Label', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_button_text_two" name="terra_themes_tools_button_text_two" value="<?php echo esc_html($button_text_two); ?>">
							</div>
							<div class="col-lg-6">
								<em class="tt-field-description"><?php _e('Link', 'terra_themes_tools' ); ?></em>
								<input type="text" class="form-control tt-form-element" id="terra_themes_tools_button_link_two" name="terra_themes_tools_button_link_two" value="<?php echo esc_url($button_link_two); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tt-meta-section">
				<div class="tt-field-desc">
					<h4><?php _e( 'Content Alignment', 'terra_themes_tools' ); ?></h4>
					<p><?php _e('Choose an alignment for the text slide content (Headline, text, buttons).', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<select name='terra_themes_tools_content_align' id='terra_themes_tools_content_align' class="form-control tt-form-element">
								<?php
								$options = array('', 'Left', 'Center', 'Right');
								foreach ($options as $option) {
								echo '<option value="' . $option . '" id="' . $option . '"', $content_align == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
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
					<h4><?php _e( 'Arrow Button', 'terra_themes_tools' ); ?></h4>
					<p><?php _e( 'Show an arrow button on this slide?', 'terra_themes_tools' ); ?></p>
				</div>
				<div class="tt-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<select id='terra_themes_tools_arrow_button' name='terra_themes_tools_arrow_button' class="form-control tt-form-element">
								<?php
								$options = array('No', 'Yes');
								foreach ($options as $option) {
								echo '<option value="' . $option . '" id="' . $option . '"', $arrow_button == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
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
}
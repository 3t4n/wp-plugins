<?php // phpcs:ignore

namespace DistinctiveLightbox\Admin;

use \DistinctiveLightbox\DistinctiveLightbox as DistinctiveLightbox;

/**
 * SettingsPage - Class for handling settings
 */
class SettingsPage {

	/**
	 * Create admin menu entru and settings page
	 */
	public function create_settings_admin_menu() {
		// Create sub menu item.
		add_options_page(
			esc_html__( 'Distinctive Lightbox Settings', 'distinctive-lightbox' ),
			esc_html__( 'Distinctive Lightbox', 'distinctive-lightbox' ),
			'manage_options',
			'distinctive-lightbox-settings',
			array( $this, 'settings_page_render' )
		);

		// Register our settings page.
		register_setting(
			'distinctive_lightbox_settings',
			'distinctive_lightbox_settings',
			array( $this, 'validate_and_sanitize' )
		);
	}

	/**
	 * Render the settings
	 */
	public function settings_page_render() { ?>
		<div id="dp-admin-wrap" class="wrap ">
			<h2><?php esc_html_e( 'Distinctive Lightbox Settings', 'distinctive-lightbox' ); ?></h2>
			<hr>
			<?php
				printf( '<p class="description">%1$s <a href="mailto:support@wpwhitesecurity.com">%2$s</a></p>', esc_html__( 'Use the settings below to configure Distinctive Lightbox to your needs. If you have any questions send us an email at', 'distinctive-lightbox' ), esc_html__( 'hello@distinctivepixels.com', 'distinctive-lightbox' ) );
			?>
			<br/>
			<form action='options.php' method='post' autocomplete="off">
				<?php
				if ( ! current_user_can( 'manage_options' ) ) {
					return;
				}

				settings_fields( 'distinctive_lightbox_settings' );
				$this->image_handling_setting();
				$this->video_handling_setting();
				$this->gallery_handling_setting();
				$this->styling_setting();
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * General settings
	 */
	private function image_handling_setting() {
		?>
		<h3><?php esc_html_e( 'How would you like the lightbox to work with images?', 'distinctive-lightbox' ); ?></h3>
		<p class="description">
			<?php esc_html_e( 'Choose if you would like to have the lightbox work automatically, or only when you want it to.', 'distinctive-lightbox' ); ?>
		</p>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="lightbox-image-settings"><?php esc_html_e( 'Choose configuration:', 'distinctive-lightbox' ); ?></label></th>
					<td>
						<fieldset class="contains-hidden-inputs">
							<label for="auto-all-images">
								<input type="radio" name="distinctive_lightbox_settings[image-setting]" id="auto-all-images" value="auto-all-images"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'image-setting' ), 'auto-all-images' ); ?>
								>
								<span><?php esc_html_e( 'Use the lightbox for any links which lead to images.', 'distinctive-lightbox' ); ?></span>
							</label>

							<br/>

							<label for="images-with-class-only">
								<input type="radio" name="distinctive_lightbox_settings[image-setting]" id="images-with-class-only" value="images-with-class-only"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'image-setting' ), 'images-with-class-only' ); ?>
								>
								<span><?php esc_html_e( 'Use the lightbox only on links with this class:', 'distinctive-lightbox' ); ?></span>

								<input type="text" name="distinctive_lightbox_settings[exclusive-image-class]" id="exclusive-image-class" placeholder="Enter Class(s)" value="<?php echo esc_attr( DistinctiveLightbox::get_distinctive_lightbox_setting( 'exclusive-image-class' ) ); ?>">
							</label>

							<br/>

							<label for="all-images-and-class">
								<input type="radio" name="distinctive_lightbox_settings[image-setting]" id="all-images-and-class" value="all-images-and-class"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'image-setting' ), 'all-images-and-class' ); ?>
								>
								<span><?php esc_html_e( 'Use the lightbox only on links to images, plus links with this class:', 'distinctive-lightbox' ); ?></span>

								<input type="text" name="distinctive_lightbox_settings[included-image-class]" id="included-image-class" placeholder="Enter Class(s)" value="<?php echo esc_attr( DistinctiveLightbox::get_distinctive_lightbox_setting( 'included-image-class' ) ); ?>">
							</label>

						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="lightbox-image-settings"><?php esc_html_e( 'Image captions:', 'distinctive-lightbox' ); ?></label></th>
					<td>
						<fieldset class="contains-hidden-inputs">
							<label for="grab-description">
								<input type="radio" name="distinctive_lightbox_settings[description-setting]" id="grab-description" value="grab-description"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'description-setting' ), 'grab-description' ); ?>
								>
								<span><?php esc_html_e( 'Attempt to use the images title and description from the media library', 'distinctive-lightbox' ); ?></span>
							</label>

							<br/>

							<label for="manual-description">
								<input type="radio" name="distinctive_lightbox_settings[description-setting]" id="manual-description" value="manual-description"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'description-setting' ), 'manual-description' ); ?>
								>
								<span><?php esc_html_e( 'Use the image title/alt tags for descriptions if possible.', 'distinctive-lightbox' ); ?></span>
							</label>

							<br/>

							<label for="no-description">
								<input type="radio" name="distinctive_lightbox_settings[description-setting]" id="no-description" value="no-description"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'description-setting' ), 'no-description' ); ?>
								>
								<span><?php esc_html_e( 'Dont show any caption', 'distinctive-lightbox' ); ?></span>
							</label>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
	}

	private function video_handling_setting() {
		?>
		<h3><?php esc_html_e( 'How would you like the lightbox to work with videos?', 'distinctive-lightbox' ); ?></h3>
		<p class="description">
			<?php esc_html_e( 'Choose if you would like to have the lightbox work automatically, or only when you want it to.', 'distinctive-lightbox' ); ?>
		</p>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="lightbox-video-settings"><?php esc_html_e( 'Choose configuration:', 'distinctive-lightbox' ); ?></label></th>
					<td>
						<fieldset class="contains-hidden-inputs">
							<label for="auto-all-videos">
								<input type="radio" name="distinctive_lightbox_settings[video-setting]" id="auto-all-videos" value="auto-all-videos"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'video-setting' ), 'auto-all-videos' ); ?>
								>
								<span><?php esc_html_e( 'Use the lightbox for any links which lead to a youtube/vimeo video.', 'distinctive-lightbox' ); ?></span>
							</label>
							<br/>

							<label for="videos-with-class-only">
								<input type="radio" name="distinctive_lightbox_settings[video-setting]" id="videos-with-class-only" value="videos-with-class-only"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'video-setting' ), 'videos-with-class-only' ); ?>
								>
								<span><?php esc_html_e( 'Use the lightbox only on video links with this class:', 'distinctive-lightbox' ); ?></span>
							</label>

							<input type="text" name="distinctive_lightbox_settings[exclusive-video-class]" id="exclusive-video-class" placeholder="Enter Class(s)" value="<?php echo esc_attr( DistinctiveLightbox::get_distinctive_lightbox_setting( 'exclusive-video-class' ) ); ?>">

						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
	}

	private function gallery_handling_setting() {
		?>
		<h3><?php esc_html_e( 'How would you like the lightbox to work with galleries (multiple images in a page)?', 'distinctive-lightbox' ); ?></h3>
		<p class="description">
			<?php esc_html_e( 'Choose if you would like to have the lightbox work automatically, or only when you want it to.', 'distinctive-lightbox' ); ?>
		</p>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="lightbox-image-settings"><?php esc_html_e( 'Choose configuration:', 'distinctive-lightbox' ); ?></label></th>
					<td>
						<fieldset class="contains-hidden-inputs">
							<label for="show-nav">
								<input type="radio" name="distinctive_lightbox_settings[gallery-setting]" id="show-nav" value="show-nav"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'gallery-setting' ), 'show-nav' ); ?>
								>
								<span><?php esc_html_e( 'Show next/previous navigation links to browser all lightbox images.', 'distinctive-lightbox' ); ?></span>
							</label>

							<br/>

							<label for="hide-nav">
								<input type="radio" name="distinctive_lightbox_settings[gallery-setting]" id="hide-nav" value="hide-nav"
								<?php checked( DistinctiveLightbox::get_distinctive_lightbox_setting( 'gallery-setting' ), 'hide-nav' ); ?>
								>
								<span><?php esc_html_e( 'Hide navigation, treat each image/video as its own item.', 'distinctive-lightbox' ); ?></span>
							</label>

						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
	}

	private function styling_setting() {
		?>
		<h3><?php esc_html_e( 'How do you want the lightbox to look & feel?', 'distinctive-lightbox' ); ?></h3>
		<p class="description">
			<?php esc_html_e( 'Choose if you would like to have the lightbox work automatically, or only when you want it to.', 'distinctive-lightbox' ); ?>
		</p>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="lightbox-video-settings"><?php esc_html_e( 'Lightbox animations:', 'distinctive-lightbox' ); ?></label></th>
					<td>
						<fieldset>
							<label for="opening-animation"><?php esc_html_e( 'Open animation:', 'distinctive-lightbox' ); ?> </label>
							<select name="distinctive_lightbox_settings[opening-animation]" id="opening-animation">
								<option value="zoomIn" <?php if ( 'zoomIn' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'opening-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Zoom In', 'distinctive-lightbox' ); ?></option>
								<option value="fadeIn" <?php if ( 'fadeIn' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'opening-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Fade In', 'distinctive-lightbox' ); ?></option>
								<option value="none" <?php if ( 'none' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'opening-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'None', 'distinctive-lightbox' ); ?></option>
							</select>
						</fieldset>
						<br>
						<fieldset>
							<label for="slide-animation"><?php esc_html_e( 'Slide animation:', 'distinctive-lightbox' ); ?> </label>
							<select name="distinctive_lightbox_settings[slide-animation]" id="slide-animation">
								<option value="slide" <?php if ( 'slide' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'slide-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Slide', 'distinctive-lightbox' ); ?></option>
								<option value="zoom" <?php if ( 'zoom' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'slide-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Zoom', 'distinctive-lightbox' ); ?></option>
								<option value="fade" <?php if ( 'fade' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'slide-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Fade', 'distinctive-lightbox' ); ?></option>
								<option value="none" <?php if ( 'none' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'slide-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'None', 'distinctive-lightbox' ); ?></option>
							</select>
						</fieldset>
						<br>
						<fieldset>
							<label for="closing-animation"><?php esc_html_e( 'Closing animation:', 'distinctive-lightbox' ); ?> </label>
							<select name="distinctive_lightbox_settings[closing-animation]" id="closing-animation">
								<option value="zoomOut" <?php if ( 'zoomOut' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'closing-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Zoom Out', 'distinctive-lightbox' ); ?></option>
								<option value="fadeOut" <?php if ( 'fadeOut' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'closing-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Fade Out', 'distinctive-lightbox' ); ?></option>
								<option value="none" <?php if ( 'none' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'closing-animation' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'None', 'distinctive-lightbox' ); ?></option>
							</select>
						</fieldset>
					</td>
				</tr>
				<tr>
					<th><label for="lightbox-video-settings"><?php esc_html_e( 'Lightbox dimensions', 'distinctive-lightbox' ); ?></label></th>
					<td>
						<fieldset>
							<label for="cars"><?php esc_html_e( 'Maximum browser width for any image. You can use any unit for example 90% or 100vw For inline elements you can set the height to auto.', 'distinctive-lightbox' ); ?></label><br>
							<input type="text" name="distinctive_lightbox_settings[max-width]" id="max-width" placeholder="Enter Width" value="<?php echo esc_attr( DistinctiveLightbox::get_distinctive_lightbox_setting( 'max-width' ) ); ?>">
						</fieldset>
					</td>
				</tr>
				<tr>
					<th><label for="lightbox-desc-settings"><?php esc_html_e( 'Description position', 'distinctive-lightbox' ); ?></label></th>
					<td>
						<fieldset>
							<label for="opening-animation"><?php esc_html_e( 'Choose position:', 'distinctive-lightbox' ); ?> </label>
							<select name="distinctive_lightbox_settings[desc-position]" id="opening-animation">
								<option value="bottom" <?php if ( 'bottom' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'desc-position' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Bottom', 'distinctive-lightbox' ); ?></option>
								<option value="left" <?php if ( 'left' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'desc-position' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Left', 'distinctive-lightbox' ); ?></option>
								<option value="top" <?php if ( 'top' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'desc-position' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Top', 'distinctive-lightbox' ); ?></option>
								<option value="right" <?php if ( 'right' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'desc-position' ) ) { echo 'selected'; } ?>><?php esc_html_e( 'Right', 'distinctive-lightbox' ); ?></option>
							</select>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
	}

	/**
	 * Validate options before saving
	 *
	 * @param  array $input The settings array.
	 */
	public function validate_and_sanitize( $input ) {

		// Bail if user doesnt have permissions to be here.
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( isset( $input['image-setting'] ) && 'auto-all-images' === $input['image-setting'] || isset( $input['image-setting'] ) && 'images-with-class-only' === $input['image-setting'] || isset( $input['image-setting'] ) && 'all-images-and-class' === $input['image-setting'] ) {
			$output['image-setting'] = esc_attr( $input['image-setting'] );
		}

		if ( isset( $input['exclusive-image-class'] ) ) {
			$output['exclusive-image-class'] = sanitize_text_field( $input['exclusive-image-class'] );
		}

		if ( isset( $input['included-image-class'] ) ) {
			$output['included-image-class'] = esc_attr( $input['included-image-class'] );
		}

		if ( isset( $input['description-setting'] ) && 'grab-description' === $input['description-setting'] || isset( $input['description-setting'] ) && 'manual-description' === $input['description-setting'] || isset( $input['description-setting'] ) && 'no-description' === $input['description-setting'] ) {
			$output['description-setting'] = esc_attr( $input['description-setting'] );
		}

		if ( isset( $input['video-setting'] ) && 'auto-all-videos' === $input['video-setting'] || isset( $input['video-setting'] ) && 'videos-with-class-only' === $input['video-setting'] ) {
			$output['video-setting'] = esc_attr( $input['video-setting'] );
		}

		if ( isset( $input['exclusive-video-class'] ) ) {
			$output['exclusive-video-class'] = esc_attr( $input['exclusive-video-class'] );
		}

		if ( isset( $input['gallery-setting'] ) && 'show-nav' === $input['gallery-setting'] || isset( $input['gallery-setting'] ) && 'hide-nav' === $input['gallery-setting'] ) {
			$output['gallery-setting'] = esc_attr( $input['gallery-setting'] );
		}

		if ( isset( $input['opening-animation'] ) ) {
			$output['opening-animation'] = esc_attr( $input['opening-animation'] );
		}

		if ( isset( $input['slide-animation'] ) ) {
			$output['slide-animation'] = esc_attr( $input['slide-animation'] );
		}

		if ( isset( $input['closing-animation'] ) ) {
			$output['closing-animation'] = esc_attr( $input['closing-animation'] );
		}

		if ( isset( $input['max-width'] ) ) {
			$output['max-width'] = sanitize_text_field( $input['max-width'] );
		}

		if ( isset( $input['desc-position'] ) ) {
			$output['desc-position'] = esc_attr( $input['desc-position'] );
		}

		return $output;
	}

}

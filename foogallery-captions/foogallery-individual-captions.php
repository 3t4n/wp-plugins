<?php
/*
Plugin Name: FooGallery Individual Captions
Description: Add individual captions to each image in FooGallery.
Plugin URI: http://tormorten.no
Author: Tor Morten Jensen
Author URI: http://tormorten.no
Version: 1.0.2
License: GPL2
Text Domain: foogallery-captions
Domain Path: lang/
*/

/*

    Copyright (C) 2015  Tor Morten Jensen  tormorten@tormorten.no

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



	/**
	 * FooGalleryCaptions Class
	 */
	class FooGalleryCaptions {

		/**
		 * Inits the plugin and adds actions and filters
		 * @return void
		 */
		public static function init() {

			if(!class_exists('FooGallery_Plugin')) {
				return;
			}

			add_action( 'admin_enqueue_scripts',  	 	array( 'FooGalleryCaptions', 'scripts' ) );
			add_action( 'save_post',      				array( 'FooGalleryCaptions', 'save' ), 99, 3 );
			add_action( 'wp_ajax_foogallery_captions',  array( 'FooGalleryCaptions', 'render' ) );
			add_action( 'edit_form_advanced',  			array( 'FooGalleryCaptions', 'output' ) );
			add_filter( 'foogallery_attachment_html_image_attributes', array('FooGalleryCaptions', 'html_image'), 99, 3);
			add_filter( 'foogallery_attachment_html_link_attributes', array('FooGalleryCaptions', 'html_link'), 99, 3);

		}

		/**
		 * Adds scripts and styles
		 * @return void
		 */
		public static function scripts() {

			if ( get_current_screen()->post_type === 'foogallery' ) {

				wp_enqueue_script( 'foogallery-captions-admin', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery' ) );
				wp_enqueue_style( 'foogallery-captions-admin', plugins_url( 'css/admin.css', __FILE__ ) );

			}

		}

		/**
		 * Saves the captions
		 * 
		 * @param int $post_id The post ID.
		 * @param post $post The post object.
 		 * @param bool $update Whether this is an existing post being updated or not.
		 * @return void
		 */
		public static function save( $post_id, $post, $update ) {

			/*
		     * In production code, $slug should be set only once in the plugin,
		     * preferably as a class property, rather than in each function that needs it.
		     */
			$slug = 'foogallery';

			// If this isn't a 'book' post, don't update it.
			if ( $slug != $post->post_type ) {
				return;
			}

			if ( isset( $_REQUEST['foogallery_captions'] ) ) {

				update_post_meta( $post_id, 'foogallery_captions', $_REQUEST['foogallery_captions'] );

			}

		}

		/**
		 * Outputs inputs on posts where captions already have been set
		 * @param  post $post The post object
		 * @return void
		 */
		public static function output($post) {

			if( $post->post_type === 'foogallery' ) {

				echo '<div id="foogallery_captions">';

				$captions = get_post_meta( $post->ID, 'foogallery_captions', true );

				if($captions) {
					foreach($captions as $attachment => $caption) {
						foreach($caption as $key => $value) {
							echo '<input type="hidden" id="foogallery-captions-'. $attachment .'-'. $key .'" name="foogallery_captions['. $attachment .']['. $key .']" value="'. $value .'" />';
						}
					}
				}

				echo '</div>';

			}

		}

		/**
		 * Renders the caption modal
		 * @return void
		 */
		public static function render() {

			$attachment = $_REQUEST['attachment'];
			$post = $_REQUEST['post'];

			$caption = self::get_captions($post, $attachment);

			?>
				<div class="close">&times;</div>
				<div class="caption-box">

					<input type="hidden" id="foogallery-caption-attachment" value="<?php echo $attachment ?>">
					<input type="hidden" id="foogallery-caption-post" value="<?php echo $post ?>">

					<div class="attachment-details">
						<h3>
							<?php _e( 'Attachment Details' ); ?>
						</h3>
						<div class="attachment-info">

							<label class="setting" data-setting="title">
								<span class="name"><?php _e( 'Title' ) ?></span>
								<input type="text" value="<?php echo $caption['title'] ?>">
							</label>

							<label class="setting" data-setting="caption">
								<span class="name"><?php _e( 'Caption' ) ?></span>
								<textarea><?php echo $caption['caption'] ?></textarea>
							</label>

								<label class="setting" data-setting="alt">
									<span class="name"><?php _e( 'Alt Text' ) ?></span>
									<input type="text" value="<?php echo $caption['alt'] ?>">
								</label>

							<label class="setting" data-setting="description">
								<span class="name"><?php _e( 'Description' ) ?></span>
								<textarea><?php echo $caption['description'] ?></textarea>
							</label>
						</div>

					</div>
					<a href="#" class="button media-button button-primary button-large media-button-select"><?php _e( 'Save' ) ?></a>
				</div>
			<?php

			die;

		}

		/**
		 * Get the captions for a specific attachment in a gallery
		 * @param  int $post       Post ID.
		 * @param  int $attachment Attachment ID
		 * @return array
		 */
		public static function get_captions($post, $attachment) {
			
			$post = apply_filters('foogallery_captions_post_id', $post);
			$attachment = apply_filters('foogallery_captions_attachment_id', $attachment, $post);
			
			$captions = get_post_meta( $post, 'foogallery_captions', true );

			$caption = array('title' => '', 'caption' => '', 'description' => '', 'alt' => '');
			if ( isset( $captions[$attachment] ) ) {
				$caption = $captions[$attachment];
			}
			else {
				$media = wp_prepare_attachment_for_js( $attachment );
				$caption = array('title' => $media['title'], 'caption' => $media['caption'], 'description' => $media['description'], 'alt' => $media['alt']);
			}

			return $caption;
		}

		/**
		 * Modifies the attributes for the image
		 * @param  array $attr Attributes
		 * @param  array $args Arguments
		 * @param  object $obj  The object
		 * @return array
		 */
		public static function html_image($attr, $args, $obj) {
			global $current_foogallery;
			if(is_object($current_foogallery)) {
				$caption = self::get_captions($current_foogallery->ID, $obj->ID);
				$attr['alt'] = $caption['alt'];
			}
			return $attr;
		}
		/**
		 * Modifies the attributes for the link
		 * @param  array $attr Attributes
		 * @param  array $args Arguments
		 * @param  object $obj  The object
		 * @return array
		 */
		public static function html_link($attr, $args, $obj) {
			global $current_foogallery;
			if(is_object($current_foogallery)) {
				$caption = self::get_captions($current_foogallery->ID, $obj->ID);

				$attr['data-caption-title'] = $caption['caption'];
				$attr['data-caption-desc'] = $caption['description'];
			}
			return $attr;
		}

	}

	add_action( 'plugins_loaded', array( 'FooGalleryCaptions', 'init' ) );



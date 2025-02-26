<?php
/**
 * AWRPG Gallery Functions
 *
 * This class encapsulates the core functionalities of the Awesome Responsive Photo Gallery plugin. 
 * It provides various methods to manage gallery options, video parsing, custom media fields, 
 * TinyMCE button integration, lightbox customizations, and other advanced features.
 *
 * Built with robust sanitization, validation, and escaping mechanisms to ensure compatibility and 
 * security, adhering to modern WordPress coding standards.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'AWRPG_Gallery_Functions' ) ) {
	class AWRPG_Gallery_Functions {

		/**
		 * Constructor to initialize hooks and filters.
		 */
		public function __construct() {
			// Filters to handle image and attachment fields.
			add_filter( 'image_send_to_editor', array( $this, 'awrpg_filter_image_send_to_editor' ), 10, 3 );
			add_filter( 'attachment_fields_to_edit', array( $this, 'awrpg_attachment_video_field' ), 10, 2 );
			add_filter( 'attachment_fields_to_save', array( $this, 'awrpg_attachment_video_field_save' ), 10, 2 );

			// Add custom TinyMCE button for the Classic Block editor.
			add_filter( 'mce_external_plugins', array( $this, 'mce_external_plugins_callback' ) );
			add_filter( 'mce_buttons', array( $this, 'mce_buttons_callback' ) );

			// Enqueue admin scripts for gallery ID button.
			add_action('admin_enqueue_scripts', array( $this, 'awrpg_gallery_id_button_script' ) );
		}

		/**
		 * Get thumbnail hover effects.
		 * 
		 * @return array Sanitized array of hover effects.
		 */
		public function awrpg_thumbnail_hover_effect() {
			$thumbnail_hover_effect = array(
				'none'      => esc_html__( 'None', 'awesome-responsive-photo-gallery' ),
				'slideleft' => esc_html__( 'Slide Left', 'awesome-responsive-photo-gallery' ),
				'zoompan'   => esc_html__( 'Zoom Pan', 'awesome-responsive-photo-gallery' ),
				'shrink'    => esc_html__( 'Shrink', 'awesome-responsive-photo-gallery' ),
			);
	
			return $thumbnail_hover_effect;
		}

		/**
		 * Get thumbnail overlay effects.
		 * 
		 * @return array Sanitized array of overlay effects.
		 */
		public function awrpg_thumbnail_overlay_effect() {
			$thumbnail_overlay_effect = array(
				'none'         => esc_html__( 'None', 'awesome-responsive-photo-gallery' ),
				'lefttoright'  => esc_html__( 'Left to Right', 'awesome-responsive-photo-gallery' ),
				'fadeinmid'    => esc_html__( 'Fade In Middle', 'awesome-responsive-photo-gallery' ),
				'capfadeleft'  => esc_html__( 'Caption Fade In Left', 'awesome-responsive-photo-gallery' ),
			);

			return $thumbnail_overlay_effect;
		}

		/**
		 * Get border styles.
		 * 
		 * @return array Sanitized array of border styles.
		 */
		public function awrpg_border_style() {
			$border_style_values = array(
				'dashed' => esc_html__( 'Dashed', 'awesome-responsive-photo-gallery' ),
				'dotted' => esc_html__( 'Dotted', 'awesome-responsive-photo-gallery' ),
				'double' => esc_html__( 'Double', 'awesome-responsive-photo-gallery' ),
				'groove' => esc_html__( 'Groove', 'awesome-responsive-photo-gallery' ),
				'inset'  => esc_html__( 'Inset', 'awesome-responsive-photo-gallery' ),
				'outset' => esc_html__( 'Outset', 'awesome-responsive-photo-gallery' ),
				'ridge'  => esc_html__( 'Ridge', 'awesome-responsive-photo-gallery' ),
				'solid'  => esc_html__( 'Solid', 'awesome-responsive-photo-gallery' ),
			);

			return $border_style_values;
		}

		/**
		 * Get gallery transition effects.
		 * 
		 * @return array Sanitized array of transition effects.
		 */
		public function awrpg_transition_effects() {
			$ag_transition_effects = array(
				'slide' => esc_html__( 'Slide', 'awesome-responsive-photo-gallery' ),
				'fade'  => esc_html__( 'Fade', 'awesome-responsive-photo-gallery' ),
			);

			return $ag_transition_effects;
		}

		/**
		 * Get Lightcase transition effects.
		 * 
		 * @return array Sanitized array of Lightcase transitions.
		 */
		public function awrpg_lightcase_transitions() {
			$lc_transition_values = array(
				'none'             => esc_html__( 'None', 'awesome-responsive-photo-gallery' ),
				'fade'             => esc_html__( 'Fade', 'awesome-responsive-photo-gallery' ),
				'scrollHorizontal' => esc_html__( 'Scroll Horizontal', 'awesome-responsive-photo-gallery' ),
			);

			return $lc_transition_values;
		}

		/**
		 * Get thumbnail positions.
		 *
		 * @return array Sanitized array of thumbnail positions.
		 */
		public function awrpg_thumbnails_position() {
			$thumb_position_values = array(
				'bottom' => esc_html__( 'Bottom', 'awrpg' ),
				'right'  => esc_html__( 'Right', 'awrpg' ),
			);

			return $thumb_position_values;
		}

		/**
		 * Get JGallery transitions.
		 *
		 * @return array Sanitized array of JGallery transitions.
		 */
		public function awrpg_jgallery_transitions() {
			$jgallery_transitions = array(
				'moveToLeft_moveFromRight' => esc_html__( 'Slide Left', 'awesome-responsive-photo-gallery' ),
				'moveToRight_moveFromLeft' => esc_html__( 'Slide Right', 'awesome-responsive-photo-gallery' ),
				'moveToTop_moveFromBottom' => esc_html__( 'Slide Top', 'awesome-responsive-photo-gallery' ),
				'moveToBottom_moveFromTop' => esc_html__( 'Slide Bottom', 'awesome-responsive-photo-gallery' ),
			);

			return $jgallery_transitions;
		}

		/**
		 * Filter image link output in the editor to add custom data attributes.
		 *
		 * @param int    $id  The attachment ID.
		 * @param string $url The attachment URL.
		 * @param string $img The HTML for the image.
		 *
		 * @return string Filtered HTML output for the image.
		 */
		public function awrpg_filter_image_send_to_editor( $id, $url, $img ) {
			$url = esc_url( $url );
			$img = wp_kses_post( $img );
			$html = sprintf( '<a href="%s">%s</a>', $url, $img );

			return $html;
		}

		/**
		 * Add "Video URL" field to media uploader.
		 *
		 * @param array $form_fields Array of existing form fields.
		 * @param WP_Post $post The attachment post object.
		 *
		 * @return array Modified form fields with the video URL field.
		 */
		public function awrpg_attachment_video_field( $form_fields, $post ) {
			$form_fields['awrpg-video-url'] = array(
				'label' => esc_html__( 'Video URL', 'awrpg' ),
				'input' => 'text',
				'value' => esc_url( get_post_meta( $post->ID, '_awrpg_video_url', true ) ),
				'helps' => esc_html__( 'Add YouTube or Vimeo URL', 'awrpg' ),
			);

			return $form_fields;
		}

		/**
		 * Save the "Video URL" field value in media uploader.
		 *
		 * @param array $post The post data for the attachment.
		 * @param array $attachment The attachment fields to save.
		 *
		 * @return array Modified post data with saved metadata.
		 */
		public function awrpg_attachment_video_field_save( $post, $attachment ) {
			if ( isset( $attachment['awrpg-video-url'] ) ) {
				$video_url = esc_url_raw( $attachment['awrpg-video-url'] );
				update_post_meta( $post['ID'], '_awrpg_video_url', $video_url );
			}

			return $post;
		}

		/**
		 * Parse video URLs and retrieve workable video URLs and thumbnails.
		 *
		 * @param int    $id          The gallery ID.
		 * @param string $videoString The input video URLs as a string (optional).
		 *
		 * @return array Array of parsed videos with metadata.
		 */
		public function awrpg_parseVideos( $id, $videoString = null ) {
			// Validate and sanitize gallery ID.
			$id = isset( $id ) ? absint( $id ) : 1;
			$videos = array(); // Initialize return data.

			// Retrieve gallery options.
			$gallery_lists = esc_attr( get_option( 'awrpg_galleryTables' ) );
			$gallery_lists = explode( ', ', $gallery_lists );

			if ( ! isset( $gallery_lists[ $id - 1 ] ) ) {
				return $videos; // Return empty array if gallery ID is invalid.
			}

			$gallery = sanitize_key( $gallery_lists[ $id - 1 ] );
			$gallery_options = get_option( $gallery . '_options' );
			$gallery_lightcs = get_option( $gallery . '_lightcs' );
		
			if ( ! empty( $videoString ) ) {
				// Process the video string.
				$videoString = stripslashes( trim( $videoString ) );
				$videoString = explode( "\n", $videoString );
				$videoString = array_filter( $videoString, 'trim' );

				foreach ( $videoString as $video ) {
					$link = '';
		
					// Extract video URL from iframe if present.
					if ( strpos( $video, 'iframe' ) !== false ) {
						$anchorRegex = '/src="(.*)?"/isU';
						$results = array();
						if ( preg_match( $anchorRegex, $video, $results ) ) {
							$link = esc_url_raw( trim( $results[1] ) );
						}
					} else {
						$link = esc_url_raw( $video ); // Direct URL.
					}

					if ( ! empty( $link ) ) {
						$video_id = null;
						$videoIdRegex = null;
						$results = array();
		
						// Process YouTube links.
						if ( strpos( $link, 'youtu' ) !== false ) {
							$videoIdRegex = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
							if ( preg_match( $videoIdRegex, $link, $results ) ) {
								$video_id = sanitize_text_field( $results[1] );
								$video_str = 'https://www.youtube.com/embed/%s?wmode=opaque&enablejsapi=1';
								$thumbnail_str = 'https://img.youtube.com/vi/%s/2.jpg';
								$fullsize_str = 'https://img.youtube.com/vi/%s/0.jpg';
							}
						}

						// Process Vimeo links.
						elseif ( strpos( $link, 'vimeo' ) !== false ) {
							if ( strpos( $link, 'player.vimeo.com' ) !== false ) {
								$videoIdRegex = '/player.vimeo.com\/video\/([0-9]+)\??/i';
							} else {
								$videoIdRegex = '/vimeo.com\/([0-9]+)\??/i';
							}
							if ( preg_match( $videoIdRegex, $link, $results ) ) {
								$video_id = sanitize_text_field( $results[1] );
								try {
									$hash = unserialize( file_get_contents( "https://vimeo.com/api/v2/video/$video_id.php" ) );
									if ( ! empty( $hash ) && is_array( $hash ) ) {
										$video_str = '//player.vimeo.com/video/%s?api=1';
										$thumbnail_str = esc_url_raw( $hash[0]['thumbnail_small'] );
										$fullsize_str = esc_url_raw( $hash[0]['thumbnail_large'] );
									} else {
										$video_str = "//player.vimeo.com/video/$video_id";
									}
								} catch ( Exception $e ) {
									$video_id = null;
								}
							}
						}

						// Add video metadata to the return array.
						if ( ! empty( $video_id ) ) {
							$videos[] = array(
								'url'       => sprintf( esc_url( $video_str ), $video_id ),
								'thumbnail' => sprintf( esc_url( $thumbnail_str ), $video_id ),
								'fullsize'  => sprintf( esc_url( $fullsize_str ), $video_id ),
							);
						}
					}
				}
			}

			// Return parsed video data.
			return $videos;
		}

		/**
		 * Add external TinyMCE plugins.
		 *
		 * @param array $plugins Array of TinyMCE external plugins.
		 * @return array Modified array of TinyMCE external plugins.
		 */
		public function mce_external_plugins_callback( $plugins ) {
			// Ensure the plugin is not already added.
			if ( ! array_key_exists( 'awrpg_gallery_id', $plugins ) ) {
				$plugins['awrpg_gallery_id'] = esc_url( AWRPG_PLUGIN_URL . 'assets/js/gallery-id-button.js' );
			}
			return $plugins;
		}

		/**
		 * Add buttons to TinyMCE editor.
		 *
		 * @param array $buttons Array of TinyMCE buttons.
		 * @return array Modified array of TinyMCE buttons.
		 */
		public function mce_buttons_callback( $buttons ) {
			// Ensure the button is not added multiple times.
			if ( ! in_array( 'awrpg_gallery_id', $buttons, true ) ) {
				$buttons[] = 'awrpg_gallery_id';
			}
			return $buttons;
		}

		/**
		 * Enqueue the script for the gallery ID button.
		 */
		public function awrpg_gallery_id_button_script() {
			wp_enqueue_script(
				'awrpg-gallery-id',
				esc_url( AWRPG_PLUGIN_URL . 'assets/js/gallery-id-button.js' ), // Ensure the URL is escaped.
				array( 'wp-blocks', 'wp-i18n', 'wp-components', 'wp-data', 'wp-edit-post', 'wp-hooks', 'wp-plugins', 'wp-element', 'wp-editor', 'jquery' ),
				'1.0.5',
				true
			);
		}
	}
}

// Initialize the class
new AWRPG_Gallery_Functions();
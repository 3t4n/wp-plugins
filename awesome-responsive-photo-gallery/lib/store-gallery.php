<?php
/**
 * AWRPG_Store_Gallery Class
 *
 * This class is responsible for managing the storage and updating of gallery options
 * in the Awesome Responsive Photo Gallery plugin. It includes methods for:
 * - Handling user permissions and nonce verification for secure operations.
 * - Saving and updating gallery settings for different gallery types (general, awesome, lightcase, and jgallery).
 * - Validating, sanitizing, and escaping user input to prevent security vulnerabilities.
 * - Interacting with WordPress options API for persistent storage of gallery settings.
 *
 * The class emphasizes robust security practices and modular design to handle multiple
 * gallery configurations effectively.
 * 
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'AWRPG_Store_Gallery' ) ) {
	class AWRPG_Store_Gallery {

		public function __construct() {
			// Register AJAX actions for setting gallery options
			add_action( 'wp_ajax_awrpg_set_gallery_options', array( $this, 'awrpg_set_gallery_options' ) );
			add_action( 'wp_ajax_nopriv_awrpg_set_gallery_options', array( $this, 'awrpg_set_gallery_options' ) );

			// Register AJAX actions for deleting a gallery
			add_action( 'wp_ajax_nopriv_awrpg_delete_awesome_gallery', array( $this, 'awrpg_delete_awesome_gallery' ) );
			add_action( 'wp_ajax_awrpg_delete_awesome_gallery', array( $this, 'awrpg_delete_awesome_gallery' ) );
		}

		/**
		 * Check permissions and validate nonce for AJAX actions.
		 *
		 * @return bool True if permissions and nonce are valid, false otherwise.
		 */
		function awrpg_check_permissions_and_nonce() {
			// Check if the user has the necessary capability (e.g., manage_options)
			if ( ! current_user_can( 'manage_options' ) ) {
				// If the user does not have the required capability, return false
				return false;
			}
	
			// Create or verify nonce
			$nonce_action = 'awrpg_ajax_action_nonce';
			$nonce = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';
	
			if (empty($nonce) || !wp_verify_nonce($nonce, $nonce_action)) {
				// If nonce is missing or verification fails, return false
				return false;
			}
			// Nonce verification passed, return true
			return true;
		}

		/**
		 * Add a new gallery.
		 *
		 * This function processes the input, validates it, and updates the gallery options.
		 */
		function awrpg_add_new_gallery() {
			// Check user capability
			if (!current_user_can('manage_options')) {
				// Terminate with an error message if the user lacks permissions.
				wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'awesome-responsive-photo-gallery'));
			}

			// Retrieve and sanitize the gallery name
			$awesome_gallery = !empty($_POST['awesome_gallery']) ? 
				trim(preg_replace('/[^A-Za-z0-9-\w_]+/', '_', sanitize_text_field($_POST['awesome_gallery']))) : '';

			// If the gallery name is empty, terminate with an error message.
			if (!$awesome_gallery) {
				wp_die(esc_html__('Gallery name is required.', 'awesome-responsive-photo-gallery'));
			}

			// Retrieve the existing gallery tables
			$gallery_table = get_option('awrpg_galleryTables');
			$gallery_lists = $gallery_table ? explode(', ', $gallery_table) : array();

			// Add the new gallery to the list or handle duplicates
			if ( empty($gallery_table) ) {
				// If no galleries exist, create the first entry
				update_option('awrpg_galleryTables', $awesome_gallery);
			} elseif ( in_array($awesome_gallery, $gallery_lists) ) {
				// Handle duplicate gallery names by appending a prefix
				$new_awesome_gallery = 'another_' . $awesome_gallery;
				$gallery_lists[] = $new_awesome_gallery;
				update_option('awrpg_galleryTables', implode(', ', array_map('sanitize_text_field', $gallery_lists)));
			} else {
				// Add the new gallery to the existing list
				$gallery_lists[] = $awesome_gallery;
				update_option('awrpg_galleryTables', implode(', ', array_map('sanitize_text_field', $gallery_lists)));
			}
		}

		/**
		 * Edit Gallery Name and Check Uniqueness
		 *
		 * This function handles the update of a gallery's name while ensuring its uniqueness.
		 *
		 * @param string  $edited_gallery - The name of the gallery that needs to be edited.
		 * @param string  $awesome_gallery - Edited name of the gallery.
		 * @return string - The edited gallery name.
		 */
		function awrpg_edit_gallery_name($edited_gallery, $awesome_gallery) {
			// Check user capability
			if (!current_user_can('manage_options')) {
				// Terminate with an error message if the user lacks permissions.
				wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'awesome-responsive-photo-gallery'));
			}

			// Ensure the gallery names are sanitized
			$edited_gallery = sanitize_text_field($edited_gallery);
			$awesome_gallery = sanitize_text_field($awesome_gallery);

			// Validate and update the gallery name if it has been changed
			if ( $awesome_gallery && $awesome_gallery !== $edited_gallery ) {
				$gallery_table = get_option('awrpg_galleryTables');
				$table_items = $gallery_table ? explode(', ', $gallery_table) : array();
				$new_gallery_table = array();

				if (is_array($table_items) && !empty($table_items)) {
					foreach ( $table_items as $key => $value ) {
						if ($value === $edited_gallery) {
							// Check for duplicate gallery names and handle them
							if (in_array($awesome_gallery, $table_items, true)) {
								$awesome_gallery = 'another_' . $awesome_gallery;
							}
							// Use the new name
							$new_gallery_table[$key] = $awesome_gallery;
						} else {
							// Keep existing gallery names
							$new_gallery_table[$key] = $value;
						}
					}
				}

				// Update the gallery table option
				$new_gallery_table = implode(', ', array_map('sanitize_text_field', $new_gallery_table));

				// Update gallery list with the new names
				update_option('awrpg_galleryTables', $new_gallery_table);

				// Update the associated gallery options
				$edited_option_value = get_option($edited_gallery . '_options');
				if ($edited_option_value) {
					delete_option($edited_gallery . '_options');
					add_option($awesome_gallery . '_options', $edited_option_value);
				}

				$edited_awesome_value = get_option($edited_gallery . '_awesome');
				if ($edited_awesome_value) {
					delete_option($edited_gallery . '_awesome');
					add_option($awesome_gallery . '_awesome', $edited_awesome_value);
				}

				$edited_lightcs_value = get_option($edited_gallery . '_lightcs');
				if ($edited_lightcs_value) {
					delete_option($edited_gallery . '_lightcs');
					add_option($awesome_gallery . '_lightcs', $edited_lightcs_value);
				}

				$edited_jgalery_value = get_option($edited_gallery . '_jgalery');
				if ($edited_jgalery_value) {
					delete_option($edited_gallery . '_jgalery');
					add_option($awesome_gallery . '_jgalery', $edited_jgalery_value);
				}

				return $awesome_gallery;
			}
		
			return $edited_gallery;
		}

		/**
		 * Delete a gallery by clearing all the options
		 */
		function awrpg_delete_awesome_gallery() {
			// Check permissions and nonce
			if ( $this->awrpg_check_permissions_and_nonce() ) {
				// Retrieve and sanitize the gallery name
				$awesome_gallery = isset($_POST['awsmgallery']) ? sanitize_text_field($_POST['awsmgallery']) : '';

				// Retrieve the existing gallery options
				$awesome_gallery_lists = get_option('awrpg_galleryTables');
				$gallery_option_names = array(
					'_options',
					'_awesome',
					'_lightcs',
					'_jgalery'
				);

				// Delete all associated options for the gallery
				foreach ($gallery_option_names as $suffix) {
					$option_name = $awesome_gallery . $suffix;
					if (get_option($option_name)) {
						delete_option($option_name);
					}
				}

				// Update the gallery list
				$awesome_gallery_lists = $awesome_gallery_lists ? explode(', ', $awesome_gallery_lists) : array();
				$awesome_gallery_diff = array_diff($awesome_gallery_lists, array($awesome_gallery));

				if (!empty($awesome_gallery_diff)) {
					$new_awesome_gallery_lists = implode(', ', array_map('sanitize_text_field', $awesome_gallery_diff));
					update_option('awrpg_galleryTables', $new_awesome_gallery_lists);
				} else {
					delete_option('awrpg_galleryTables');
				}
			} else {
				// Nonce verification failed
				wp_send_json_error(array('message' => esc_html__('Nonce verification failed', 'awesome-responsive-photo-gallery')));
				wp_die(esc_html__('You do not have sufficient permissions to access this page, or the nonce verification failed.', 'awesome-responsive-photo-gallery'));
			}
			wp_die();
		}

		/**
		 * Handles the setting and updating of gallery options for the Awesome Responsive Photo Gallery.
		 *
		 * This method performs the following tasks:
		 * - Verifies user permissions and nonce for security.
		 * - Processes and sanitizes data received via a POST request.
		 * - Updates or adds options for different gallery settings (general, awesome, lightcase, and jgallery).
		 * - Ensures proper sanitization and validation of all inputs before saving to the database.
		 *
		 * @return void
		 * @throws wp_die() If the request method is not POST or permissions/nonce verification fails.
		 */
		function awrpg_set_gallery_options() {
			// Check permissions and nonce
			if ( $this->awrpg_check_permissions_and_nonce() ) {
				// Ensure this is a POST request
				if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
					wp_die(esc_html__('Invalid request method.', 'awesome-responsive-photo-gallery'));
				}

				// Sanitize the gallery name input
				$awesome_gallery = isset($_POST['awesome_gallery']) ? sanitize_text_field($_POST['awesome_gallery']) : '';
				$gallery_name = isset($_POST['gallery_name']) && $_POST['gallery_name'] !== '' 
					? trim(preg_replace('/[^A-Za-z0-9-\w_]+/', '_', sanitize_text_field($_POST['gallery_name']))) 
					: $awesome_gallery;
		
				$awesome_gallery = $this->awrpg_edit_gallery_name($awesome_gallery, $gallery_name);

				// Process gallery options
				$option_name = $awesome_gallery . '_options';
				$gallery_options = get_option($option_name);

				$my_gallery = isset($_POST['my_gallery']) ? sanitize_text_field($_POST['my_gallery']) : 'awesome';
		
				$gallery_option_entry = array( 'mygal' => 'my_gallery', 'cwdth' => 'container_width', 'tpspc' => 'top_space', 'btspc' => 'bottom_space', 'gpbdr' => 'gap_border', 'image' => 'image_size', 'imgwd' => 'image_width', 'imght' => 'image_height', 'hveft' => 'hover_effect', 'oveft' => 'overlay_effect', 'thttl' => 'thumb_title', 'thcap' => 'thumb_caption', 'opccp' => 'opacity_caption', 'mrgin' => 'thumb_space', 'brsle' => 'border_style', 'brwdh' => 'border_width', 'shade' => 'thumb_shadow', 'shlen' => 'shadow_length', 'blrad' => 'blur_radius', 'sprad' => 'spread_radius', 'shopc' => 'shadow_opacity', 'thrad' => 'thumb_radius', 'thlay' => 'overlay_color', 'brclr' => 'border_color', 'shclr' => 'shadow_color', 'infbg' => 'info_bg', 'inftt' => 'info_title', 'infcp' => 'info_caption', 'subfm' => 'submitted' );

				$gallery_option_value = array();
				foreach ( $gallery_option_entry as $key => $value ) {
					if ( isset( $_POST[$value] ) ) {
						if ( $key == 'subfm' ) {
							$gallery_option_value[$key] = $_POST[$value] == 'yes' ? sanitize_text_field($_POST[$value]) : sanitize_text_field('yes');
						} else {
							$gallery_option_value[$key] = sanitize_text_field( $_POST[$value] );
						}
					}
				}

				if ( isset($gallery_options) && ! empty($gallery_options) ) {
					update_option($option_name, $gallery_option_value);
				} else {
					add_option($option_name, $gallery_option_value);
				}

				// Process Awesome Gallery options
				$this->awrpg_process_gallery_type($awesome_gallery, '_awesome', array(
					'treft' => 'tran_effect',
					'hveft' => 'hover_effect',
					'loop'  => 'loop_back',
					'speed' => 'tran_duration',
					'dload' => 'downloadimg',
					'fscrn' => 'fullscreen',
					'index' => 'index_number',
					'share' => 'shareimg',
					'thumb' => 'thumbnails',
					'vmaxw' => 'videomax_width',
					'fbook' => 'facebook',
					'lnkin' => 'linkedin',
					'twter' => 'twitter',
					'pntrs' => 'pinterest',
				));

				// Process Light Case Gallery options
				$this->awrpg_process_gallery_type($awesome_gallery, '_lightcs', array(
					'lctrn' => 'lc_effect',
					'lmaxw' => 'lc_maxwidth',
					'lmaxh' => 'lc_maxheight',
					'lcttl' => 'lc_title',
					'lcdsc' => 'lc_desc',
					'sinfo' => 'lc_seqinfo',
					'lcfrm' => 'lc_iframe',
					'fwdth' => 'frame_width',
					'fhigh' => 'frame_height',
					'lvopt' => 'lc_voption',
					'lvwdh' => 'lc_vwidth',
					'lvhgt' => 'lc_vheight',
				));

				// Process jGallery options
				$this->awrpg_process_gallery_type($awesome_gallery, '_jgalery', array(
					'jgtrn' => 'jg_transition',
					'trivl' => 'tran_interval',
					'maxmb' => 'max_mobile',
					'close' => 'can_close',
					'czoom' => 'can_zoom',
					'imttl' => 'show_title',
					'jthum' => 'jg_thumbnail',
					'mobth' => 'mobile_thumb',
					'thpos' => 'thumb_position',
				));
			} else {
				// Nonce verification failed, handle the error
				wp_send_json_error(['message' => esc_html__('Nonce verification failed', 'awesome-responsive-photo-gallery')]);
				wp_die(esc_html__('You do not have sufficient permissions to access this page, or the nonce verification failed.', 'awesome-responsive-photo-gallery'));
			}
			wp_die();
		}

		/**
		 * Helper function to process gallery options for a specific type.
		 */
		function awrpg_process_gallery_type($gallery_name, $suffix, $entry_map) {
			$option_name = $gallery_name . $suffix;
			$current_options = get_option($option_name);
			$new_values = array();

			// Loop through the entry_map
			foreach ($entry_map as $key => $field) {
				// Check if the field is a social option (fbook, lnkin, twter, pntrs)
				if (in_array($key, ['fbook', 'lnkin', 'twter', 'pntrs'])) {
					// Use intval() to sanitize integer values for social options
					$new_values[$key] = isset($_POST[$field]) ? intval($_POST[$field]) : 0;
				} else {
					// For non-social options, use sanitize_text_field()
					$new_values[$key] = isset($_POST[$field]) ? sanitize_text_field($_POST[$field]) : '';
				}
			}

			if (!empty($current_options)) {
				update_option($option_name, $new_values);
			} else {
				add_option($option_name, $new_values);
			}
		}
	}
}

new AWRPG_Store_Gallery();
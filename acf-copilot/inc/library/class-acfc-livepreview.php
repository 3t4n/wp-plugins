<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'ACFC_LivePreview' ) ) {

	class ACFC_LivePreview {
		/**
		 * Consturtor.
		 */
		public function __construct() {
		}

		/**
		 * Initializor.
		 */
		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		/**
		 * Plugin loaded.
		 */
		public function on_loaded() {
			global $post;

			$acf_copilot = new ACF_Copilot();

			if ( empty( $post ) && is_admin() && isset( $_GET['post'] ) ) {
				$post_id = intval( $_GET['post'] );
				$post    = get_post( $post_id ); // Manually set the global $post
			}

			$current_editor = 'classic';

			if ( isset( $post->ID ) && use_block_editor_for_post( $post->ID ) ) {
				$current_editor = 'block';
			}

			if ( '' === $acf_copilot->disable_livepreview
				&& 'classic' === $current_editor ) {
				add_action(
					'rest_api_init',
					function () {
						// Register the POST (create/update) route: /wp-json/acf/v3/pages/<id> || /wp-json/acf/v3/posts/<id>
						register_rest_route(
							'acfc/v3',
							'/(pages|posts)/(?P<id>\d+)',
							array(
								'methods'             => \WP_REST_Server::CREATABLE, // POST
								'callback'            => array( $this, 'update_post_fields' ),
								'permission_callback' => array( $this, 'permission_check' ),
							)
						);
					}
				);

				add_action( 'add_meta_boxes', array( $this, 'add_livepreview_metabox' ) );
				add_action( 'save_post', array( $this, 'save_livepreview_metabox' ) );
			}
		}

		/**
		 * Permission check to ensure only valid users can read/update ACF fields.
		 * Adjust as needed for your use case, e.g. check if the user can edit this specific post.
		 */
		public function permission_check( $request ) {
			return current_user_can( 'edit_posts' );
		}

		/**
		* POST callback: Update ACF fields for the specified post ID.
		*
		* Endpoint: POST /wp-json/acf/v3/pages/{id}
		* You’d typically send JSON like:
		*   { "acf": { "field_key_or_name": "value", "another_field": "value2" } }
		*/
		public function update_post_fields( $request ) {
			$post_id = (int) $request['id'];

			if ( get_post_status( $post_id ) === false ) {
				return new \WP_Error( 'no_post', 'Invalid post ID.', array( 'status' => 404 ) );
			}

			// Temporarily disable revisions
			// add_filter( 'wp_save_post_revision_check_for_changes', '__return_false' );

			// Grab the JSON body
			$params = $request->get_json_params();

			if ( isset( $params['fields'] ) && is_array( $params['fields'] ) ) {
				foreach ( $params['fields'] as $field_key => $field_value ) {
						/**
						 * update_field() can accept:
						 *  - the "field key" (e.g. 'field_abc123') or
						 *  - the "field name" (e.g. 'my_repeater')
						 *
						 * If $field_value is a nested array matching how ACF expects data for
						 * Groups, Repeaters, or Flexible Content, ACF will store it automatically.
						 */
						update_field( $field_key, $field_value, $post_id );
				}
			}

			// Re-enable revisions
			// remove_filter( 'wp_save_post_revision_check_for_changes', '__return_false' );

			return array(
				'success' => true,
				'message' => 'ACF custom fields updated.',
			);
		}

		/**
		 * Add a custom meta box for live preview.
		 */
		public function add_livepreview_metabox() {
			$acf_copilot = new ACF_Copilot();

			add_meta_box(
				'acfc-livepreview-metabox',
				__( 'LivePreview Mode', 'acf-copilot' ),
				array( $this, 'display_livepreview_metabox' ),
				$acf_copilot->types_supported,
				'side',
				'low'
			);
		}

		/**
		 * Render the meta box content.
		 */
		public function display_livepreview_metabox( $post ) {
			$acfc_admin  = new ACFC_Admin();
			$acf_copilot = new ACF_Copilot();

			// Retrieve the current live preview mode
			$livepreview_mode = get_post_meta( $post->ID, 'acfc_livepreview_mode', true );

			// Output nonce for security
			wp_nonce_field( 'acfc_livepreview_metabox', 'acfc_livepreview_metabox_nonce' );
			?>
				<div class="inisde">
					<div class="acfc-admin">
						<p class="post-attributes-help-text">
							<?php echo esc_html__( 'Make changes to ACF fields and preview them in a new window after each custom field changes content.', 'acf-copilot' ); ?>
						</p>
						<p class="post-attributes-help-text">
							<?php if ( 'off' === $acf_copilot->livepreview_mode ) : ?>
								<strong class="acfc-disabled-message text-color-red">
									<?php
									printf(
										wp_kses(
											/* translators: %1$s is replaced with "Options" */
											__( '<strong>Note:</strong> LivePreview mode is disabled globally from the %s page.', 'acf-copilot' ),
											json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR )
										),
										'<a href="' . esc_url( admin_url( $acfc_admin->admin_page . ACFC_SETTINGS_SLUG ) ) . '">Options</a>'
									);
									?>
								</strong>
							<?php else : ?>
								<select id="acfc-livepreview-mode" name="acfc_livepreview_mode">
									<option value="on" <?php selected( $livepreview_mode, 'on' ); ?>>
										<?php echo esc_html__( 'On', 'acf-copilot' ); ?>
									</option>
									<option value="off" <?php selected( $livepreview_mode, 'off' ); ?>>
										<?php echo esc_html__( 'Off', 'acf-copilot' ); ?>
									</option>
								</select>
							<?php endif; ?>
						</p>
						<p class="post-attributes-help-text">
							<u> 
								<?php echo esc_html__( 'All required custom fields will be skipped and posts content will be updated regardless.', 'acf-copilot' ); ?>
							</u>
						</p>
					</div>
				</div>
			<?php
		}

		/**
		 * Save the meta box data.
		 */
		function save_livepreview_metabox( $post_id ) {
			// Verify the nonce
			if ( ! isset( $_POST['acfc_livepreview_metabox_nonce'] )
				|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['acfc_livepreview_metabox_nonce'] ) ), 'acfc_livepreview_metabox' ) ) {
				return;
			}

			// Check autosave
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			// Check the user's permissions
			if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
			} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}

			// Save the live preview mode
			if ( isset( $_POST['acfc_livepreview_mode'] ) ) {
				$livepreview_mode = sanitize_text_field( wp_unslash( $_POST['acfc_livepreview_mode'] ) );
				update_post_meta( $post_id, 'acfc_livepreview_mode', $livepreview_mode );
			}
		}
	}

	// Initialize.
	$acfc_livepreview = new ACFC_LivePreview();
	$acfc_livepreview->init();
}

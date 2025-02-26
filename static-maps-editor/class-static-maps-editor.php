<?php
/**
 * The Static Maps Editor plugin main class.
 *
 * @since   1.0.0
 * @package Static_Maps_Editor
 * @author  Printmaps
 */

/**
 * The Static Maps Editor plugin main class.
 *
 * @since   1.0.0
 */
class Static_Maps_Editor {

	/**
	 * The name / ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The name of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The URL of this site.
	 * Used when registering the api Key with our service
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $static_maps_editor_origin    The URL of this site.
	 */
	private $static_maps_editor_origin;

	/**
	 * The api key for this site.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $static_maps_editor_uid    The api key for this site.
	 */
	private $static_maps_editor_uid;

	/**
	 * Flag for accepted privacy policy for the plugin use.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $static_maps_editor_privacy_policy_accepted    Flag for accepted privacy policy for the plugin use.
	 */
	private $static_maps_editor_privacy_policy_accepted;

	/**
	 * Flag for accepted TOS for the plugin use.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $static_maps_editor_tos_accepted    Flag for accepted TOS for the plugin use.
	 */
	private $static_maps_editor_tos_accepted;

	/**
	 * The Static Maps Editor service URL.
	 *
	 * @since    1.0.0
	 * @var      string   STATIC_MAPS_EDITOR_SERVER  The Static Maps Editor service URL.
	 */
	const STATIC_MAPS_EDITOR_SERVER = 'https://sme.printmaps.net';

	/**
	 * The Static Maps Editor service endpoint api key / uid registration.
	 *
	 * @since    1.0.0
	 * @var      string   STATIC_MAPS_EDITOR_JS_URL  The Static Maps Editor service endpoint api key / uid registration.
	 */
	const STATIC_MAPS_EDITOR_ENDPOINT_UID = 'uid';

	/**
	 * Templates relative path.
	 *
	 * @since    1.0.0
	 * @var      string   STATIC_MAPS_EDITOR_TEMPLATE_DIR  Templates relative path.
	 */
	const STATIC_MAPS_EDITOR_TEMPLATE_DIR = 'templates/';

	/**
	 * Default map width.
	 *
	 * @since    1.0.0
	 * @var      string   STATIC_MAPS_EDITOR_DEFAULT_SIZE_WIDTH  Includes relative path.
	 */
	const STATIC_MAPS_EDITOR_DEFAULT_SIZE_WIDTH = 1024;

	/**
	 * Default map height.
	 *
	 * @since    1.0.0
	 * @var      string   STATIC_MAPS_EDITOR_DEFAULT_SIZE_HEIGHT  Includes relative path.
	 */
	const STATIC_MAPS_EDITOR_DEFAULT_SIZE_HEIGHT = 512;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param    string $plugin_name  The name of this plugin.
	 * @param    string $version      The current version of this plugin.
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name                                = $plugin_name;
		$this->version                                    = $version;
		$this->static_maps_editor_origin                  = get_site_url();
		$this->static_maps_editor_uid                     = get_option( 'static_maps_editor_uid', false );
		$this->static_maps_editor_privacy_policy_accepted = get_option( 'static_maps_editor_privacy_policy_accepted', false );
		$this->static_maps_editor_tos_accepted            = get_option( 'static_maps_editor_tos_accepted', false );
	}

	/**
	 * Add notice in the backend for missing api key / uid.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_uid_admin_notice() {
		if ( ! $this->static_maps_editor_uid ) {
			if ( ! isset( $_SERVER['QUERY_STRING'] ) || ( isset( $_SERVER['QUERY_STRING'] ) && ! preg_match( '/page=static_maps_editor/', sanitize_text_field( wp_unslash( $_SERVER['QUERY_STRING'] ) ) ) ) ) {
				$this->static_maps_editor_render_template( 'missing-uid-setting-admin-notice.php' );
			}
		}
	}

	/**
	 * Add pages to admin media & settings menu.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_add_pages() {
		$static_maps_editor_menu_disabled = get_option( 'static_maps_editor_menu', false );
		if ( 1 === (int) $static_maps_editor_menu_disabled ) {
			add_media_page(
				'static_maps_editor',
				__( 'Add static map', 'static-maps-editor' ),
				'edit_posts',
				'static_maps_editor',
				array( $this, 'static_maps_editor_editor_page' )
			);
			add_options_page(
				__( 'Static Maps Editor - Settings', 'static-maps-editor' ),
				__( 'Static Maps Editor', 'static-maps-editor' ),
				'manage_options',
				'static_maps_editor-settings',
				array( $this, 'static_maps_editor_settings_page' )
			);
		} else {
			add_menu_page(
				'static_maps_editor',
				__( 'Static Maps Editor', 'static-maps-editor' ),
				'edit_posts',
				'static_maps_editor',
				array( $this, 'static_maps_editor_editor_page' ),
				'dashicons-location'
			);
			add_submenu_page(
				'static_maps_editor',
				__( 'Add static map', 'static-maps-editor' ),
				__( 'Add static map', 'static-maps-editor' ),
				'edit_posts',
				'static_maps_editor',
				array( $this, 'static_maps_editor_editor_page' ),
				1
			);
			add_submenu_page(
				'static_maps_editor',
				__( 'Static Maps Editor - Settings', 'static-maps-editor' ),
				__( 'Settings', 'static-maps-editor' ),
				'manage_options',
				'static_maps_editor-settings',
				array( $this, 'static_maps_editor_settings_page' ),
				2
			);
		}
		// redirect from option-general.php to admin.php to avoid 403 Access denied,
		// when switching the hide / show menu.
		$this->static_maps_editor_maybe_redirect();
		add_action( 'admin_init', array( $this, 'static_maps_editor_settings_section' ) );
	}

	/**
	 * Add media library filter.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_add_media_filter() {
		$js = file_get_contents( plugin_dir_path( __FILE__ ) . 'js/media-filter.js' );
		wp_add_inline_script( 'media-views', $js, array(), $this->version ); // Dependencies: media-editor, media-views.
	}

	/**
	 * Get a map from the static maps service and add it to media library.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_add_media_ajax() {
		$post_id  = null;
		$res_code = null;
		$res_msg  = null;
		if ( check_ajax_referer( 'static_maps_editor_add_media', 'static_maps_editor_add_media_nonce' ) && isset( $_POST['map'] ) && isset( $_POST['map']['map'] ) ) {
			$img = $this->static_maps_editor_extract_image( sanitize_text_field( wp_unslash( $_POST['map']['map'] ) ) );
			if ( false !== $img ) {
				$name        = sprintf( '%s%s_static_maps_editor.png', gmdate( 'dmY' ), intval( microtime( true ) ) );
				$attribution = isset( $_POST['map']['attribution'] ) && ( 'false' === $_POST['map']['attribution'] );
				$post_id     = $this->static_maps_editor_add_image( $img, $name, $attribution );
				$res_code    = 200;
				$res_msg     = 'OK';
			}
		}
		echo wp_json_encode(
			array(
				'status'  => $res_code,
				'message' => $res_msg,
				'post_id' => $post_id,
			)
		);
		wp_die();
	}

	/**
	 * Filter to explicitly allow queries by file name for the static maps images.
	 *
	 * @param    array $query The WP Query.
	 * @since    1.0.0
	 */
	public function static_maps_editor_ajax_query_attachments_args( $query ) {
		if ( isset( $query['post_mime_type'] ) && 'static_maps_editor' === $query['post_mime_type'] ) {
			// Search for '_static_maps_editor.png' in filenames if no custom search text has been given.
			if ( ! isset( $query['s'] ) ) {
				$query['s'] = '_static_maps_editor.png';
				add_filter( 'wp_allow_query_attachment_by_filename', '__return_true' );
			}
			$query['post_mime_type'] = null;
		}
		return $query;
	}

	/**
	 * Render the static maps interface page or a warning message if api key / uid is missing.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_editor_page() {
		if ( $this->static_maps_editor_uid && $this->static_maps_editor_privacy_policy_accepted && $this->static_maps_editor_tos_accepted ) {
			wp_enqueue_style( 'static_maps_editor-editor-css', plugin_dir_url( __FILE__ ) . 'css/editor.css', array(), $this->version );
			$this->static_maps_editor_render_template( 'page-editor.php' );
		} else {
			if ( ! $this->static_maps_editor_uid ) {
				delete_option( 'static_maps_editor_privacy_policy_accepted' );
				delete_option( 'static_maps_editor_tos_accepted' );
			}
			( $this->static_maps_editor_privacy_policy_accepted && $this->static_maps_editor_uid )
				? $this->static_maps_editor_render_template( 'missing-tos-setting.php' )
				: $this->static_maps_editor_render_template( 'missing-uid-setting.php' );
		}
	}

	/**
	 * Render the settings link under the plugin name.
	 *
	 * @param    array  $links  The links from the plugin_action_links action.
	 * @param    string $file   The name of the plugin file.
	 * @since    1.0.0
	 */
	public function static_maps_editor_plugin_action_links( $links, $file ) {
		if ( plugin_basename( plugin_dir_path( __FILE__ ) . '/static-maps-editor.php' ) === $file ) {
			$links[] = sprintf(
				'<a href="%s">%s</a>',
				esc_url( $this->static_maps_editor_get_page_url() ),
				__( 'Settings', 'static-maps-editor' )
			);
		}
		return $links;
	}

	/**
	 * Render the settings page.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$this->static_maps_editor_render_template( 'page-settings.php' );
	}

	/**
	 * Register static maps editor settings.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_settings_section() {
		add_settings_section( 'static_maps_editor-settings-section', __( 'Static Maps Editor - Settings', 'static-maps-editor' ), '', 'static_maps_editor-settings' );
		register_setting( 'static_maps_editor-settings', 'static_maps_editor_uid' );
		add_settings_field( 'static_maps_editor-uid', __( 'API Key', 'static-maps-editor' ), array( $this, 'static_maps_editor_settings_uid' ), 'static_maps_editor-settings', 'static_maps_editor-settings-section' );
		register_setting( 'static_maps_editor-settings', 'static_maps_editor_menu' );
		add_settings_field( 'static_maps_editor-menu', __( 'Hide from main navigation', 'static-maps-editor' ), array( $this, 'static_maps_editor_settings_menu' ), 'static_maps_editor-settings', 'static_maps_editor-settings-section' );
		register_setting( 'static_maps_editor-settings', 'static_maps_editor_size_width' );
		register_setting( 'static_maps_editor-settings', 'static_maps_editor_size_height' );
		add_settings_field( 'static_maps_editor-size', __( 'Default dimensions', 'static-maps-editor' ), array( $this, 'static_maps_editor_settings_size' ), 'static_maps_editor-settings', 'static_maps_editor-settings-section' );

		add_settings_section( 'static_maps_editor-settings-section-privacy', __( 'Terms of Service', 'static-maps-editor' ), '', 'static_maps_editor-settings' );
		register_setting( 'static_maps_editor-settings', 'static_maps_editor_privacy_policy_accepted' );
		register_setting( 'static_maps_editor-settings', 'static_maps_editor_tos_accepted' );
		add_settings_field( 'static_maps_editor-privacy', __( 'Privacy and terms', 'static-maps-editor' ), array( $this, 'static_maps_editor_settings_privacy' ), 'static_maps_editor-settings', 'static_maps_editor-settings-section-privacy' );

		// register the setting also here for when we set it initially,
		// in the very first call to the editor screen.
		register_setting( 'static_maps_editor-settings-privacy', 'static_maps_editor_privacy_policy_accepted' );
		register_setting( 'static_maps_editor-settings-tos', 'static_maps_editor_tos_accepted' );
	}

	/**
	 * Api key / uid settings.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_settings_uid() {
		$this->static_maps_editor_render_template( 'page-settings-uid-field.php' );
	}

	/**
	 * Visibility settings.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_settings_menu() {
		$this->static_maps_editor_render_template( 'page-settings-show-menu.php' );
	}

	/**
	 * Privacy policy and ToS settings.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_settings_privacy() {
		$this->static_maps_editor_render_template( 'page-settings-privacy.php' );
	}

	/**
	 * Size settings.
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_settings_size() {
		$this->static_maps_editor_render_template( 'page-settings-size.php' );
	}

	/**
	 * Set the activated option when the plugin is activated
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_activate_plugin() {
		if ( ! empty( $_SERVER['SCRIPT_NAME'] ) && false !== strpos( admin_url( 'plugins.php' ), sanitize_url( wp_unslash( $_SERVER['SCRIPT_NAME'] ) ) ) ) {
			add_option( 'static_maps_editor_activated_static_maps_editor', true );
		}
	}

	/**
	 * Check the activated option and redirect the user accordingly
	 *
	 * @since    1.0.0
	 */
	public function static_maps_editor_admin_init() {
		$access_type = get_filesystem_method();
		if ( 'direct' === $access_type ) {
			$creds = request_filesystem_credentials( site_url() . '/wp-admin/', '', false, false, array() );
			if ( ! WP_Filesystem( $creds ) ) {
				add_action( 'admin_notices', array( $this, 'static_maps_editor_fs_unable_to_access' ) );
				return false;
			}
		} else {
			add_action( 'admin_notices', array( $this, 'static_maps_editor_fs_unable_to_access' ) );
		}
		if ( get_option( 'static_maps_editor_activated_static_maps_editor' ) ) {
			delete_option( 'static_maps_editor_activated_static_maps_editor' );
			if ( ! headers_sent() ) {
				wp_safe_redirect( $this->static_maps_editor_get_page_url() );
				exit;
			}
		}
	}

	/**
	 * Get the API Key after the user has accepted the privacy policy triggered on option update
	 *
	 * @param    string $old_value  The old value of the option.
	 * @param    string $new_value  The new value of the option.
	 * @param    string $option     The name of the option.
	 * @since    1.0.0
	 */
	public function static_maps_editor_after_privacy_policy_accepted_updated( $old_value, $new_value, $option = 'static_maps_editor_privacy_policy_accepted' ) {
		$this->static_maps_editor_get_uid_after_privacy_policy_accepted( $old_value, $new_value, $option );
	}

	/**
	 * Get the API Key after the user has accepted the privacy policy triggered on option add
	 *
	 * @param    string $option     The name of the option.
	 * @param    string $value      The value of the option.
	 * @since    1.0.0
	 */
	public function static_maps_editor_after_privacy_policy_accepted_added( $option = 'static_maps_editor_privacy_policy_accepted', $value ) {
		$this->static_maps_editor_get_uid_after_privacy_policy_accepted( null, $value, $option );
	}

	/**
	 * Return the only allowed HTML elemnts and their attributes
	 *
	 * @since    1.0.0
	 */
	public static function static_maps_editor_allowed_html() {
		return array(
			'strong' => array(),
			'a'      => array(
				'href'   => array(),
				'target' => array(),
			),
		);
	}

	/**
	 * Get the API Key after the user has accepted the privacy policy
	 *
	 * @param    string $old_value  The old value of the option.
	 * @param    string $new_value  The new value of the option.
	 * @param    string $option     The name of the option.
	 * @since    1.0.0
	 */
	private function static_maps_editor_get_uid_after_privacy_policy_accepted( $old_value, $new_value, $option = 'static_maps_editor_privacy_policy_accepted' ) {
		if ( 1 === (int) $new_value && ! $this->static_maps_editor_uid && 'static_maps_editor_privacy_policy_accepted' === $option ) {
			$res                    = $this->static_maps_editor_get_uid();
			$static_maps_editor_uid = $this->static_maps_editor_validate_and_get_api_key( $res );
			if ( ! is_wp_error( $res ) && $static_maps_editor_uid ) {
				update_option( 'static_maps_editor_uid', $static_maps_editor_uid );
			} else {
				delete_option( 'static_maps_editor_uid' );
				delete_option( 'static_maps_editor_privacy_policy_accepted' );
				delete_option( 'static_maps_editor_tos_accepted' );
				add_option( 'static_maps_editor_uid_fetch_error', true );
				if ( is_wp_error( $res ) ) {
					add_option( 'static_maps_editor_uid_fetch_error_messages', implode( "\n", $res->get_error_messages() ) );
				}
			}
		}
	}

	/**
	 * Validate an API Key response
	 *
	 * @param    array $res  The response.
	 * @since    1.0.0
	 * @return   string|bool
	 */
	private function static_maps_editor_validate_and_get_api_key( $res ) {
		$http_code              = wp_remote_retrieve_response_code( $res );
		$static_maps_editor_uid = wp_remote_retrieve_body( $res );
		return ( preg_match( '/^20[012]$/', $http_code ) && preg_match( '/^[0-9a-f]{32}$/i', $static_maps_editor_uid ) )
			? $static_maps_editor_uid
			: false;
	}

	/**
	 * Get an api key / uid from the static maps service.
	 *
	 * @since    1.0.0
	 * @return   array
	 */
	private function static_maps_editor_get_uid() {
		return wp_safe_remote_get(
			sprintf( '%s/%s', self::STATIC_MAPS_EDITOR_SERVER, self::STATIC_MAPS_EDITOR_ENDPOINT_UID ),
			array(
				'headers' => array( 'Origin' => $this->static_maps_editor_origin ),
			)
		);
	}

	/**
	 * Add the generated static map as an attachemt to the media library.
	 *
	 * @param    string $image_data   The binary image data.
	 * @param    string $filename     The filename of the image.
	 * @param    bool   $show_credits Show the attribution as link or in the image.
	 * @since    1.0.0
	 * @return   int                   The attachment ID.
	 */
	private function static_maps_editor_add_image( $image_data, $filename, $show_credits ) {
		global $wp_filesystem;

		$upload_dir  = wp_upload_dir();
		$upload_file = $upload_dir['path'] . '/' . $filename;
		$wp_filesystem->put_contents( $upload_file, $image_data, FS_CHMOD_FILE );

		$credits = $show_credits ? '<a href="https://www.printmaps.net/" target="_blank">© Printmaps.net / OSM Contributors</a>' : '';

		$attachment    = array(
			'post_mime_type' => 'image/png',
			'post_title'     => $filename,
			'post_content'   => '',
			'post_status'    => 'inherit',
		);
		$attachment_id = wp_insert_attachment( $attachment, $upload_file );
		$image_post    = get_post( $attachment_id );
		wp_update_post(
			array(
				'ID'           => $image_post->ID,
				'post_excerpt' => $show_credits ? $credits : '',
			)
		);
		$attachment_meta = wp_generate_attachment_metadata( $attachment_id, get_attached_file( $image_post->ID ) );

		$attachment_meta['image_meta']['caption'] = $credits;
		wp_update_attachment_metadata( $attachment_id, $attachment_meta );
		return $attachment_id;
	}

	/**
	 * Simple template renderer.
	 *
	 * @param    string $f_name  The template filename.
	 * @since    1.0.0
	 * @return   striing
	 */
	private function static_maps_editor_render_template( $f_name ) {
		$template = plugin_dir_path( __FILE__ ) . self::STATIC_MAPS_EDITOR_TEMPLATE_DIR . $f_name;
		include_once $template;
		return true;
	}

	/**
	 * Replace placeholders with html <a> links.
	 *
	 * @param    string $href    The href of the link.
	 * @param    string $text    The display text of the link.
	 * @since    1.0.0
	 * @return   striing
	 */
	private function static_maps_editor_set_href( $href, $text ) {
		$href = sprintf( '<a href="%s">', esc_url( $href ) );
		$text = preg_replace( '/\[/', $href, $text, 1 );
		$text = preg_replace( '/\]/', '</a>', $text, 1 );
		return $text;
	}

	/**
	 * Return the url of the settings page.
	 *
	 * @since    1.0.0
	 */
	private function static_maps_editor_get_page_url() {
		return $this->static_maps_editor_uid
			? menu_page_url( 'static_maps_editor-settings', false )
			: menu_page_url( 'static_maps_editor', false );
	}

	/**
	 * Redirect if necessary.
	 *
	 * @since    1.0.0
	 */
	private function static_maps_editor_maybe_redirect() {
		if ( ! empty( $_SERVER['SCRIPT_NAME'] )
			&& false !== strpos( admin_url( 'options-general.php' ), sanitize_url( wp_unslash( $_SERVER['SCRIPT_NAME'] ) ) )
			&& isset( $_SERVER['QUERY_STRING'] )
			&& preg_match( '/page=static_maps_editor-settings/', sanitize_text_field( wp_unslash( $_SERVER['QUERY_STRING'] ) ) )
			&& 1 !== (int) get_option( 'static_maps_editor_menu', 0 )
		) {
			if ( ! headers_sent() ) {
				wp_safe_redirect( $this->static_maps_editor_get_page_url() );
				exit;
			}
		}
	}

	/**
	 * Get settings form data.
	 *
	 * @param    string $type  The type of the setting.
	 * @since    1.0.0
	 */
	private function static_maps_editor_get_settings_fields( $type ) {
		ob_start();
		settings_fields( 'static_maps_editor-settings-' . $type );
		$settings_fields = ob_get_contents();
		ob_end_clean();
		return $settings_fields;
	}

	/**
	 * Format an URL.
	 *
	 * @since    1.0.0
	 */
	private function static_maps_editor_get_formated_host() {
		return sprintf(
			'<strong>%s</strong>',
			htmlspecialchars( wp_parse_url( get_bloginfo( 'url' ), PHP_URL_HOST ) )
		);
	}

	/**
	 * Format an IP address.
	 *
	 * @since    1.0.0
	 */
	private function static_maps_editor_get_formated_ip() {
		$address = isset( $_SERVER['REMOTE_ADDR'] )
			? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) )
			: '0.0.0.0';
		return sprintf(
			'<strong>%s</strong>',
			preg_replace( '/\.[^.]+$/', '.xxx', $address )
		);
	}

	/**
	 * Get the PNG image data from a data-url base64 encoded string.
	 *
	 * @param    string $data   The data-url string.
	 * @since    1.0.0
	 * @return   string|bool
	 */
	private function static_maps_editor_extract_image( $data ) {
		$result = false;
		if ( preg_match( '/^data:image\/png;base64,/', $data ) ) {
			$data = str_replace( 'data:image/png;base64,', '', $data );
			// We use base64_decode to decode the image data.
			// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode
			$data = base64_decode( $data );
			if ( $this->static_maps_editor_is_valid_sme_img_data( $data ) ) {
				$result = $data;
			}
		}
		return $result;
	}

	/**
	 * Validate the PNG image data coming from the Static Maps Editor.
	 *
	 * @param    string $data The PNG image data as a string.
	 * @since    1.0.0
	 * @return   bool
	 */
	private function static_maps_editor_is_valid_sme_img_data( $data ) {
		if ( function_exists( 'getimagesizefromstring' ) ) {
			$result = getimagesizefromstring( $data );
			if ( IMAGETYPE_PNG === $result[2] ) {
				return true;
			}
		} elseif ( function_exists( 'mime_content_type' ) ) {
			global $wp_filesystem;
			$temp_file = tempnam( sys_get_temp_dir(), 'STATIC_MAPS_EDITOR' );
			$wp_filesystem->put_contents( $temp_file, $data, FS_CHMOD_FILE );
			$mime_type = mime_content_type( $temp_file );
			$wp_filesystem->delete( $temp_file );
			if ( 'image/png' === strtolower( $mime_type ) ) {
				return true;
			}
		} elseif ( preg_match( '/^\x89\x50\x4E\x47\x0D\x0A\x1A\x0A/', $data ) ) { // PNG file signature - https://datatracker.ietf.org/doc/html/rfc2083 .
			return true;
		}
		return false;
	}

	/**
	 * Notify the user that we cannot access the filesystem in order to write the image files.
	 *
	 * @since    1.0.0
	 */
	private function static_maps_editor_fs_unable_to_access() {
		echo 'Unable to access your media library for writing';
	}
}

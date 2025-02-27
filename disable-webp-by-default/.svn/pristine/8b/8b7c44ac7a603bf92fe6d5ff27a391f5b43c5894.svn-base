<?php
/**
 * Disable WebP By Default
 *
 * @package disable-webp-by-default
 * @author David Baumwald <davidbaumwald>
 * @license GPLv2
 */

namespace Disable_WebP_By_Default\Inc;

// Bail early if accessed directly around WP.
defined( 'ABSPATH' ) || die( 'We\'re sorry, but you cannot directly access this file.' );

/**
 * Plugin class.
 *
 * This class contains most of the effective plugin code to modify WP functionality.
 *
 * @since      0.6.0
 * @package    Disable_WebP_By_Default
 * @subpackage Disable_WebP_By_Default\Inc
 * @author     David Baumwald <davidbaumwald>
 */
class Plugin {

	/**
	 * Initialize the class.
	 *
	 * @since  0.6.0
	 * @access public
	 */
	public function __construct() {
	}

	/**
	 * Singleton.
	 *
	 * @since  0.7.0
	 * @access public
	 *
	 * @return Plugin
	 */
	public static function get_instance() {
		static $instance = null;

		if ( null === $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Add plugin settings to the "Media" page.
	 *
	 * @since  0.6.0
	 * @access public
	 *
	 * @return void
	 */
	public function disable_webp_settings() {
		register_setting(
			'media',
			'disable_webp_transforms',
			array(
				'type'              => 'int',
				'description'       => __( 'Whether to disable WebP file creation on upload', 'disable-webp-by-default' ),
				'sanitize_callback' => 'absint',
				'default'           => '1',
			)
		);

		add_settings_field(
			'disable_webp_transforms',
			__( 'WebP', 'disable-webp-by-default' ),
			array( $this, 'disable_webp_settings_callback' ),
			'media',
			'default',
			array(
				'disable_webp_transforms',
			)
		);
	}

	/**
	 * Settings callback to actually create the fields.
	 *
	 * @since  0.6.0
	 * @access public
	 *
	 * @return void
	 */
	public function disable_webp_settings_callback() {
		?>

		<tr>
			<td colspan="2">
				<label for="disable_webp_transforms">
					<input name="disable_webp_transforms" type="checkbox" id="disable_webp_transforms" value="1"<?php checked( '1', get_option( 'disable_webp_transforms' ) ); ?> />
					<?php esc_html_e( 'Disable WebP file creation on upload.', 'disable-webp-by-default' ); ?>
				</label>
			</td>
		</tr>

		<?php
	}

	/**
	 * Filter the array of default mime transforms.
	 *
	 * @since  0.6.0
	 * @access public
	 *
	 * @param  array  $transforms  Array of default transforms.
	 * @return array
	 */
	public function disable_jpeg_webp_transform( $transforms ) {
		if ( isset( $transforms['image/jpeg'] ) ) {
			$transforms['image/jpeg'] = array(
				'image/jpeg',
			);
		}

		return $transforms;
	}
}

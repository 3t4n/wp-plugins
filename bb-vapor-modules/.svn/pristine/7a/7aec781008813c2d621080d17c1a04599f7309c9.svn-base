<?php
if (!defined('ABSPATH')) die('No direct access.');
class BBVapor_BeaverBuilder_Admin {

	/**
	 * Holds the slug to the admin panel page
	 *
	 * @since 1.0.0
	 * @static
	 * @var string $slug
	 */
	private static $slug = 'bb-vapor-modules';

	/**
	 * Holds the URL to the admin panel page
	 *
	 * @since 1.0.0
	 * @static
	 * @var string $url
	 */
	private static $url = '';

	public function __construct() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'register_sub_menu') );
	}

	/**
	 * Initializes admin menus, plugin settings links.
	 *
	 * @since 1.0.0
	 * @access public
	 * @see __construct
	 */
	public function init() {

		// Add settings link
		add_action( 'plugin_action_links_' . BBVAPOR_BEAVER_BUILDER_SLUG, array( $this, 'plugin_settings_link' ) );

		add_action( 'after_plugin_row_' . BBVAPOR_BEAVER_BUILDER_SLUG, array( $this, 'after_plugin_row' ), 10, 3 );

	}

	/**
	 * Adds license information
	 *
	 * @since 1.4.1.
	 * @access public
	 * @see __construct
	 * @param string $plugin_File Plugin file
	 * @param array  $plugin_data Array of plugin data
	 * @param string $status      If plugin is active or not
	 * @return null HTML Settings
	 */
	public function after_plugin_row( $plugin_file, $plugin_data, $status ) {
		echo sprintf( '<tr class="active"><td colspan="3"><a href="%s">%s</a></td></tr>', esc_url( 'https://bbvapormodules.com' ), __( 'Update to Pro for more modules!', 'bb-vapor-modules' ) );
	}

	/**
	 * Initializes admin menus
	 *
	 * @since 1.0.0
	 * @access public
	 * @see init
	 */
	public function register_sub_menu() {
		$hook = '';

		$hook = add_submenu_page(
			'options-general.php', __( 'Vapor Modules', 'bb-vapor-modules' ), __( 'Vapor Modules', 'bb-vapor-modules' ), 'manage_options', 'bb-vapor-modules', array( $this, 'admin_page' )
		);
	}

	/**
	 * Output admin menu
	 *
	 * @since 1.0.0
	 * @access public
	 * @see register_sub_menu
	 */
	public function admin_page() {
		?>
		<div class="wrap">
			<form action="<?php echo esc_url( add_query_arg( array( 'page' => 'bb-vapor-modules' ), admin_url( 'options-general.php' ) ) ); ?>" method="POST">
				<?php wp_nonce_field('save_bbvm_beaver_builder_options'); ?>
				<h2><?php esc_html_e( 'Vapor Modules for Beaver Builder', 'breadcrumbs-for-beaver-builder' ); ?></h2>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="bbvm-pro"><?php esc_html_e( 'Upgrade', 'bb-vapor-modules' ); ?></label>
							</th>
							<td>
								<a class="button button-secondary" href="https://bbvapormodules.com" target="_blank"><?php esc_html_e( 'Upgrade to Pro for more modules', 'bb-vapor-modules' ); ?></a>&nbsp;<a class="button button-secondary" href="https://bbvapormodules.com/modules" target="_blank"><?php esc_html_e( 'View all Available Modules', 'bb-vapor-modules' ); ?></a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<?php
	}

	/**
	 * Adds plugin settings page link to plugin links in WordPress Dashboard Plugins Page
	 *
	 * @since 1.0.0
	 * @access public
	 * @see __construct
	 * @param array $settings Uses $prefix . "plugin_action_links_$plugin_file" action
	 * @return array Array of settings
	 */
	public function plugin_settings_link( $settings ) {
		$admin_anchor = sprintf( '<a href="%s">%s</a>', esc_url($this->get_url()), esc_html__( 'Settings', 'bb-vapor-modules' ) );
		if (! is_array( $settings  )) {
			return array( $admin_anchor );
		} else {
			return array_merge( array( $admin_anchor ), $settings) ;
		}
	}

	/**
	 * Return the URL to the admin panel page.
	 *
	 * Return the URL to the admin panel page.
	 *
	 * @since 1.0.0
	 * @access static
	 *
	 * @return string URL to the admin panel page.
	 */
	public static function get_url() {
		$url = self::$url;
		if ( empty( $url ) ) {
			$url = add_query_arg(array( 'page' => self::$slug ), admin_url('options-general.php'));
			self::$url = $url;
		}
		return $url;
	}
}
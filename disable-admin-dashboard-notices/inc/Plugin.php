<?php
/**
 * Main plugin entry class.
 *
 * @package assignment
 */

namespace WPFraternity\Disable_Admin_Dashboard;

use WPFraternity\Disable_Admin_Dashboard\Traits\Singleton;

/**
 * Main plugin class
 */
final class Plugin {
	use Singleton;

	/**
	 *
	 * @var float $version Plugin version.
	 */
	public static string $version;

	/**
	 * @var string Path to assets.
	 */
	public static string $assets_path;

	/**
	 * @var string URL to assets.
	 */
	public static string $assets_uri;

	/**
	 * Plugin constructor.
	 */
	public function __construct() {
		$this->define_paths();
		$this->setup_hooks();
		Assets::get_instance();
	}

	/**
	 * Register callback for various hook
	 */
	public function setup_hooks() {
		add_action( 'plugins_loaded', [ $this, 'load_textdomain' ] );
		add_action( 'admin_notices', [ $this, 'admin_notices', ], 1 );
	}

	/**
	 * Load textdomain for plugin
	 *
	 * @return void
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'disable-admin-dashboard-notices', false, __DIR__ . '/languages/' );
	}

	/**
	 * Define various constant
	 *
	 * @return void
	 */
	private function define_paths() {
		self::$version     = '1.0.0';
		self::$assets_path = plugin_dir_path( __DIR__ ) . 'assets';
		self::$assets_uri  = plugins_url( '', __DIR__ ) . '/assets';
	}

	public function admin_notices() {
		?>
        <div id="hidden-admin-notices-panel" class="hidden" tabindex="-1"
             aria-label="<?php echo esc_attr__( 'Notifications Tab', 'disable-admin-dashboard-notices' ); ?> "></div>
        <div id="hidden-admin-notices-link-wrap" class="hide-if-no-js">
            <button type="button" id="hidden-admin-notices-link"
                    class="button" aria-controls="hidden-admin-notices-panel" aria-expanded="false">
                <span class="hidden-admin-notices-link-icon" aria-hidden="true"></span>
                <span class="hidden-admin-notices-link-text-show"
                      aria-label="<?php echo esc_html__( 'Show Notices', 'disable-admin-dashboard-notices' ); ?>"><?php echo esc_html__( 'Show Notices', 'disable-admin-dashboard-notices' ); ?></span>
                <span class="hidden-admin-notices-link-text-hide"
                      aria-label="<?php echo esc_html__( 'Hide Notices', 'disable-admin-dashboard-notices' ); ?>"><?php echo esc_html__( 'Hide Notices', 'disable-admin-dashboard-notices' ); ?></span>
            </button>
        </div>
		<?php
	}
}

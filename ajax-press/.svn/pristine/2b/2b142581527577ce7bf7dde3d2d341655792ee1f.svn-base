<?php
/**
 * Plugin Name: Ajax Press
 * Plugin URI:  https://wpmilitary.com/ajax-press
 * Description: Easily Enable Fast Ajax Navigation. Loads content without page reload.
 * Version:     1.0.1
 * Author:      Prince
 * Author URI:  https://wpmilitary.com/
 * Text Domain: ajax-press
 * Domain Path: /languages/
 */

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
	wp_die( __( 'You can\'t access this page', 'ajax-press' ) );
}

/** define constants */
define( 'AJAX_PRESS_VERSION', '1.0.1' );
define( 'AJAX_PRESS_FILE', __FILE__ );
define( 'AJAX_PRESS_PATH', dirname( AJAX_PRESS_FILE ) );
define( 'AJAX_PRESS_INCLUDES', AJAX_PRESS_PATH . '/includes' );
define( 'AJAX_PRESS_URL', plugins_url( '', AJAX_PRESS_FILE ) );
define( 'AJAX_PRESS_ASSETS', AJAX_PRESS_URL . '/assets' );

class Ajax_Press {

	private static $instance = null;

	public function __construct() {
		$this->includes();
        $this->init_hooks();
        $this->init_freemius();

		register_activation_hook( AJAX_PRESS_FILE, array( $this, 'activate' ) );
	}

	public function activate() {
		include_once AJAX_PRESS_INCLUDES . '/class-install.php';
		Ajax_Press\Install::activate();
	}

    public function init_hooks(){
	    add_action( 'admin_notices', [ $this, 'print_notices' ], 15 );

	    add_filter( 'plugin_action_links_' . plugin_basename( AJAX_PRESS_FILE ), [ $this, 'plugin_action_links' ] );

    }

	public function plugin_action_links( $links ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=ajax-press-settings' ) . '">' . __( 'Settings', 'ajax-press' ) . '</a>';

		return $links;
	}

    public function init_freemius(){
	    if ( ! function_exists( 'ap_fs' ) ) {
		    // Create a helper function for easy SDK access.
		    function ap_fs() {
			    global $ap_fs;

			    if ( ! isset( $ap_fs ) ) {
				    // Include Freemius SDK.
				    require_once dirname(__FILE__) . '/freemius/start.php';

				    $ap_fs = fs_dynamic_init( array(
					    'id'                  => '10249',
					    'slug'                => 'ajax-press',
					    'type'                => 'plugin',
					    'public_key'          => 'pk_89cfc20908b6ca94af4d3dd95577a',
					    'is_premium'          => false,
					    'has_addons'          => false,
					    'has_paid_plans'      => false,
					    'menu'                => array(
						    'slug'           => 'ajax-press',
						    'first-path'     => 'admin.php?page=ajax-press-getting-started',
						    'account'        => false,
						    'support'        => false,
					    ),
				    ) );
			    }

			    return $ap_fs;
		    }

		    // Init Freemius.
		    ap_fs();
		    // Signal that SDK was initiated.
		    do_action( 'ap_fs_loaded' );
	    }
    }

	public function includes() {
		require_once AJAX_PRESS_INCLUDES . '/class-enqueue.php';

        if(is_admin()) {
	        require_once AJAX_PRESS_INCLUDES . '/class-admin.php';
	        include_once AJAX_PRESS_INCLUDES . '/class-theme-configs.php';
        }
	}


	public function add_notice( $class, $message ) {

		$notices = get_option( sanitize_key( 'ajax_press_notices' ), [] );
		if ( is_string( $message ) && is_string( $class ) && ! wp_list_filter( $notices, array( 'message' => $message ) ) ) {

			$notices[] = array(
				'message' => $message,
				'class'   => $class,
			);

			update_option( sanitize_key( 'ajax_press_notices' ), $notices );
		}

	}

	/**
	 * Prince admin notice
	 *
	 * @return void
	 * @since 1.0.0
	 *
	 */
	public function print_notices() {
		$notices = get_option( sanitize_key( 'ajax_press_notices' ), [] );
		foreach ( $notices as $notice ) { ?>
			<div class="notice notice-large is-dismissible ajax-press-admin-notice notice-<?php echo esc_attr( $notice['class'] ); ?>">
				<?php echo $notice['message']; ?>
			</div>
			<?php
			update_option( sanitize_key( 'ajax_press_notices' ), [] );
		}
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

}

function ajax_press() {
	return Ajax_Press::instance();
}

ajax_press();
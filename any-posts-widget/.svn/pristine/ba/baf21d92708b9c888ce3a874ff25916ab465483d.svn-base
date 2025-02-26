<?php
/**
 * Plugin main class
 *
 * @package Any_Posts_Widget
 */

/**
 * Class Any_Posts_Widget
 */
final class Any_Posts_Widget {

	/**
	 * Plugin instance.
	 *
	 * @var Any_Posts_Widget
	 * @access private
	 */
	private static $instance = null;

	/**
	 * Get plugin instance.
	 *
	 * @return Any_Posts_Widget
	 * @static
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @access private
	 */
	private function __construct() {
		$this->includes();

		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Load plugin function files here.
	 */
	public function includes() {
		require_once ANY_POSTS_WIDGET_PATH . 'inc/class-apw-widget.php';
	}

	/**
	 * Code you want to run when all other plugins loaded.
	 */
	public function init() {
		load_plugin_textdomain( 'any-posts-widget', false, ANY_POSTS_WIDGET_PATH . 'languages' );
	}
}

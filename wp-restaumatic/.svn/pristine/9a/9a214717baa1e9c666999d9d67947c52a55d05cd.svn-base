<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.restaumatic.com
 * @since      1.0.0
 *
 * @package    WP_Restaumatic
 * @subpackage WP_Restaumatic/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    WP_Restaumatic
 * @subpackage WP_Restaumatic/public
 */
class WP_Restaumatic_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
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
	 * The Active Menu demo slug.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $demo_slug    The Active Menu demo slug.
	 */
	protected $demo_slug;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      1.0.0
	 * @param      string $plugin_name    The name of the plugin.
	 * @param      string $version        The version of this plugin.
	 * @param      string $demo_slug      The Active Menu demo slug.
	 */
	public function __construct( $plugin_name, $version, $demo_slug ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->demo_slug   = $demo_slug;

	}

	/**
	 * Display Restuamatic Active Menu using a shortcode.
	 *
	 * @param array  $atts Shortcode attributes.
	 * @param string $content Not used.
	 * @return string Active Menu HTML and script.
	 */
	public function active_menu_shortcode( $atts, $content = null ) {
		$options = get_option( 'wp_restaumatic' );
		$output  = '';

		$atts = shortcode_atts(
			array(
				'slug'       => ( ! empty( $options['slug'] ) ) ? $options['slug'] : '',
				'restaurant' => '',
			),
			$atts,
			'restaumatic_active_menu'
		);

		if ( empty( $atts['slug'] ) ) {
			if ( current_user_can( 'manage_options' ) ) {
				$output .= esc_html__( 'Active Menu slug is missing.', 'wp-restaumatic' );
				$output .= ' ';
				$output .= '<a href="' . esc_url( add_query_arg( array( 'page' => 'wp-restaumatic' ), admin_url( 'admin.php' ) ) ) . '">';
				$output .= esc_html__( 'Go to the settings', 'wp-restaumatic' );
				$output .= '</a>.';
			}

			return;
		} elseif ( $this->demo_slug === $atts['slug'] ) {
			$output .= '<p>';
			$output .= esc_html__( 'Example Active Menu for demo purposes only. All orders will be automatically canceled.', 'wp-restaumatic' );
			$output .= '</p>';
		}

		if ( empty( $atts['restaurant'] ) ) {
			$am_url     = 'https://' . $atts['slug'] . '.skubacz.pl/restauracje';
			$script_url = 'https://' . $atts['slug'] . '.skubacz.pl/menu_widget.js';
		} else {
			$am_url     = 'https://' . $atts['slug'] . '.skubacz.pl/restauracja/' . $atts['restaurant'];
			$script_url = 'https://' . $atts['slug'] . '.skubacz.pl/menu_widget.js?restaurant=' . $atts['restaurant'];
		}

		$output .= '<div id="restaumatic_menu_widget_wrapper">';
		$output .= '<iframe src="' . esc_url( $am_url ) . '" width="100%" title="' . esc_attr__( 'Menu', 'wp-restaumatic' ) . '"></iframe>';
		$output .= '</div>';

		// Script is not registered/enqueued via wp_enqueue_script in order to prevent possible caching by other WordPress plugins.
		// phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript
		$output .= '<script type="text/javascript" src="' . esc_url( $script_url ) . '" async></script>';

		return $output;
	}

}

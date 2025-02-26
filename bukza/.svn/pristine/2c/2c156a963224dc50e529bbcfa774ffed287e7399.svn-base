<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bukza.com
 * @since      2.00
 *
 * @package    Bukza
 * @subpackage Bukza/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bukza
 * @subpackage Bukza/public
 * @author     Bukza <support@bukza.com>
 */
class Bukza_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.0.0
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Adds short code
	 *
	 * @since    2.0.0
	 */
	public function add_shortcode() {

		add_shortcode( 'bukza', 'Bukza_Public::bukza_shortcode_function' );

	}

	/**
	 * Short code creation
	 *
	 * @since    2.0.0
	 * @param string $atts Short code attributes.
	 */
	public static function bukza_shortcode_function( $atts ) {
		// Define default attributes and sanitize user input
		$atts = shortcode_atts(
			array(
				'async'     => '', // Default empty
				'tag'       => '', // Default empty
				'user'      => 0,  // Default 0
				'widget'    => 0,  // Default 0
				'timetable' => 0,  // Legacy attribute for backward compatibility
			),
			$atts,
			'bukza'
		);

		// Sanitize each attribute
		$async = sanitize_text_field( $atts['async'] );
		$tag = sanitize_key( $atts['tag'] ); // Use sanitize_key for HTML id
		$user = absint( $atts['user'] ); // Ensure it's a positive integer
		$widget = absint( $atts['widget'] ); // Ensure it's a positive integer

		// Fallback to 'timetable' if 'widget' is not provided
		if ( $widget === 0 ) {
			$widget = absint( $atts['timetable'] ); // Use legacy attribute as fallback
		}

		// If async is enabled, use inline script
		if ( '1' === $async ) {
			return '<!-- BEGIN BUKZA CODE --><div id="' . esc_attr( $tag ) . '"></div><script type="text/javascript">(function(){var d = document;var w = window;function l() {var s = d.createElement("script");s.type = "text/javascript";s.async = true;s.src = "https://public.bukza.com/api/script/generate/' . esc_attr( $user ) . '/' . esc_attr( $widget ) . '/' . esc_attr( $tag ) . '?t=" + (new Date().getTime());var ss = d.getElementsByTagName("script")[0];ss.parentNode.insertBefore(s, ss);}if (d.readyState == "complete") {l();} else {if (w.attachEvent) {w.attachEvent("onload", l);} else {w.addEventListener("load", l, false);}}})();</script><!-- END BUKZA CODE -->';
		}

		// For non-async, enqueue the script dynamically
		$script_url = add_query_arg(
			array(
				't' => time(),
			),
			'https://public.bukza.com/api/script/generate/' . esc_attr( $user ) . '/' . esc_attr( $widget ) . '/' . esc_attr( $tag )
		);

		// Register the script dynamically to avoid direct output
		$handle = 'bukza-script-' . $user . '-' . $widget; // Unique handle for the script
		wp_enqueue_script( $handle, $script_url, array(), BUKZA_VERSION, true );

		// Return only the HTML container
		return '<!-- BEGIN BUKZA CODE --><div id="' . esc_attr( $tag ) . '"></div><!-- END BUKZA CODE -->';
	}
}

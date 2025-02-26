<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       mardell.me
 * @since      1.0.0
 *
 * @package    append_id
 * @subpackage append_id/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    append_id
 * @subpackage append_id/admin
 * @author     Andy Mardell <mardell.me>
 */
class Append_ID_Admin {

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
	 * The options for the settings pages
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $options    The options from the settings page
	 */
	private $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string $plugin_name  The name of this plugin.
	 * @param    string $version      The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the scripts and stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_files() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/append-id-admin.css', array(), $this->version, 'all' );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/append-id-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Shortcode Output
	 *
	 * @since    1.0.0
	 * @param    array   $atts    Attribute values from the shortcode
	 * @param    string  $content Content from inside the shortcode tags
	 * @param    string  $tag     Tag name
	 * @return   string           HTML content
	 */
	public function shortcode_output( $atts, $content, $tag ) {
		$atts           = array_change_key_case( (array) $atts, CASE_LOWER );
		$append_id_atts = shortcode_atts(
			array( 'url' => '' ),
			$atts,
			$tag
		);

		if ( is_user_logged_in() ) {
			$html = sprintf(
				'<a href="%s?user_id=%s">',
				esc_url( $append_id_atts['url'] ),
				get_current_user_id()
			);

			$html .= esc_html( $content ) . '</a>';

			return apply_filters(
				'append_id_content',
				$html,
				$url,
				$content
			);
		}

		$html = sprintf(
			'<a href="%s">',
			esc_url( $append_id_atts['url'] )
		);

		$html .= esc_html( $content ) . '</a>';

		return apply_filters(
			'append_id_content',
			$html,
			$url,
			$content
		);
	}

	/**
	 * Register Shortcode
	 *
	 * @since    1.0.0
	 * @return   void
	 */
	public function add_shortcode() {
		add_shortcode( 'user_link', array( $this, 'shortcode_output' ) );
	}

}

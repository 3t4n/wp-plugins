<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Photo_Gallery_Shortcode {

	/**
	 * Photo_Gallery_Shortcode constructor.
	 */
	public function __construct() {
		add_shortcode( 'web_pace_portfolio', array( $this, 'run_shortcode' ) );
		add_action( 'admin_footer', array( $this, 'photo_inline_popup_content' ) );
		add_action( 'media_buttons_context', array( $this, 'add_editor_media_button' ) );
	}

	/**
	 * Run the shortcode on front-end
	 *
	 * @param $attrs
	 *
	 * @return string
	 */
	public function run_shortcode( $attrs ) {
		$attrs = shortcode_atts( array(
			'id' => 'no web_pace portfolio',
		), $attrs );

		global $wpdb;
		$query = $wpdb->prepare("SELECT portfolio_list_effects_s FROM ".$wpdb->prefix."web_paceportfolio_portfolios WHERE id=%d", $attrs['id']);
		$portfolio_view = $wpdb->get_var($query);

		do_action( 'photo_gallery_shortcode_scripts', $attrs['id'], $portfolio_view );
		do_action( 'photo_gallery_localize_scripts', $attrs['id'] );

		return $this->init_frontend( $attrs['id'] );
	}

	/**
	 * Show published portfolios in frontend
	 *
	 * @param $id
	 *
	 * @return string
	 */
	protected function init_frontend( $id ) {
		global $wpdb;

		$query = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "web_paceportfolio_images WHERE portfolio_id = '%d' ORDER BY ordering ASC", $id );

		$images = $wpdb->get_results( $query );

		$query = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "web_paceportfolio_portfolios WHERE id = '%d' ORDER BY id ASC", $id );

		$portfolio = $wpdb->get_results( $query );

		$photo_gallery_get_options = photo_gallery_get_default_general_options();

		ob_start();

		if( !$portfolio ){
			_e("Portfolio with this ID doesn't exist.","photo-portfolio");
			return;
		}

		Photo_Gallery()->template_loader->load_front_end( $images, $photo_gallery_get_options, $portfolio );

		return ob_get_clean();

	}

	/**
	 * Add editor media button
	 *
	 * @param $context
	 *
	 * @return string
	 */
	public function add_editor_media_button( $context ) {
		$img = untrailingslashit( Photo_Gallery()->plugin_url() ) . "/assets/images/admin_images/photo-portfolio-icon.png";

		$container_id = 'web_pace_portfolio';

		$title = __( 'Select Web Pace Portfolio Gallery to insert into post', 'photo-portfolio' );

		$button_text = __( 'Add Portfolio', 'photo-portfolio' );

		$context .= '<a class="button thickbox" title="' . $title . '"    href="#TB_inline?width=400&inlineId=' . $container_id . '">
		<span class="wp-media-buttons-icon" style="background: url(' . $img . '); background-repeat: no-repeat; background-position: left bottom;"></span>' . $button_text . '</a>';

		return $context;
	}

	/**
	 * Inline popup contents
	 */
	public function photo_inline_popup_content() {
		require PHOTO_PORTFOLIO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'photo-portfolio-admin-popup-content-view.php';
	}
}
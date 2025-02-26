<?php
/**
 * Template loader.
 *
 * @package Aithenticate
 */

/**
 * Template loader class
 */
class Aithenticate_Template_Loader {

	/**
	 * Initialize
	 *
	 * @return void
	 */
	public static function init() {
		$self = new self();

		add_filter( 'the_content', array( $self, 'show_content_type' ) );
	}

	/**
	 * Show content type.
	 *
	 * @param string $content Content.
	 * @return string
	 */
	public function show_content_type( $content ) {
		global $post;

		$fixed_ai_post_types  = aithenticate_get_fixed_ai_post_types();
		$aithenticate_enabled = get_post_meta( get_the_ID(), '_aithenticate_enabled', true );

		if (
			! aithenticate_has_valid_license_and_email() ||
			( ! $aithenticate_enabled && ( ! in_array( $post->post_type, $fixed_ai_post_types ) || 'unlimited' !== aithenticate_get_license_type() ) )
		) {
			return $content;
		}

		ob_start();

		require $this->get_template_path( 'content-type.php' );

		return $content . ob_get_clean();
	}

	/**
	 * Get the template path.
	 *
	 * @param string $filepath Filepath.
	 * @return string
	 */
	public static function get_template_path( $filepath ) {
		return aithenticate()->plugin_path() . 'templates/' . $filepath;
	}

}

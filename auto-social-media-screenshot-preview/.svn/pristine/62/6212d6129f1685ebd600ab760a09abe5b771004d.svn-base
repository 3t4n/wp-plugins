<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://screenshot-capture-api.com
 * @since      1.0.0
 *
 * @package    Screenshot_Preview
 * @subpackage Screenshot_Preview/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Screenshot_Preview
 * @subpackage Screenshot_Preview/public
 * @author     Roman Kobosil <r.kobosil@webseite-herunterladen.de>
 */
class Screenshot_Preview_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $screenshot_preview    The ID of this plugin.
	 */
	private $screenshot_preview;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $screenshot_preview       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $screenshot_preview, $version ) {

		$this->screenshot_preview = $screenshot_preview;
		$this->version = $version;

	}

	/**
	 * Add screenshot meta tag to the header of the site.
	 *
	 * @since    1.0.0
	 */
	public function add_head() {
        global $wp;
        $delay = get_option('wh_screenshot_delay');
        if ( defined( 'SCREENSHOT_API_ENDPOINT' ) && $delay != '' ) {

            $token = get_option('wh_api_token');
            $secret = get_option('wh_api_secret');
            $ttl = get_option('wh_screenshot_ttl');

        	$current_url_encoded = urlencode(home_url(add_query_arg(array(), $wp->request)));
        	$query = 'url='. $current_url_encoded .'&ttl='. $ttl .'&delay='. $delay .'&width=1200&fileType=jpeg&quality=60&height=630&hide_cookie_banners=true';
            $hash = hash('sha256', $query . $secret);
            $screenshot_url = SCREENSHOT_API_ENDPOINT . '/capture/'. $token . '/' . $hash . '?' . $query;
            ?>
              <!-- OpenGraph Screenshot -->
              <meta property="og:image" content="<?php echo esc_url($screenshot_url); ?>" />
              <meta property="og:image:secure_url" content="<?php echo esc_url($screenshot_url); ?>" />
              <meta property="og:image:type" content="image/jpeg" />
              <meta property="og:image:width" content="1200" />
              <meta property="og:image:height" content="630" />

              <!-- Twitter Screenshot -->
              <meta name="twitter:card" content="summary_large_image">
              <meta name="twitter:image" content="<?php echo esc_url($screenshot_url); ?>" />
            <?php
        }
	}
}

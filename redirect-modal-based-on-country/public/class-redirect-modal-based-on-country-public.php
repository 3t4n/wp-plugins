<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/David-Kurniawan/
 * @since      1.0.0
 *
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Redirect_Modal_Based_On_Country
 * @subpackage Redirect_Modal_Based_On_Country/public
 * @author     David Kurniawan <jatinangorservice@gmail.com>
 */
class Redirect_Modal_Based_On_Country_Public {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Display the widget.
	 *
	 * @since    1.0.0
	 */
	public function rmboc_widget() {
		if (!is_admin()) {
			// Check if visitor never stay
			if (!$this->rmboc_visitor_stay()) {
				// Get visitor IP
				$visitorIp = $this->rmboc_ip_checker();
				if ($visitorIp) {
					// Collect Visitor IP Info
					$visitorInfo = $this->rmboc_visitor_ip_info();
					if ($visitorInfo) {
						// Get Setting
						if (isset($visitorInfo->countryCode) && !empty($visitorInfo->countryCode) && $visitorInfo->countryCode !== '') {
							$setting = $this->rmboc_check_settings($visitorInfo->countryCode);
							if ($setting) {
								$host = get_site_url();
								$host = parse_url($host, PHP_URL_HOST);

								$cookieName = get_option(RMBOC_SHORT_PREFIX.'_cookie_name');

						        $theme = plugin_dir_path( __DIR__ ).'public/partials/redirect-modal-based-on-country-public-display.php';

								ob_start();
								include($theme);
								$body = ob_get_contents();
								ob_end_clean();

								echo wp_kses($body, $this->rmboc_expanded_alowed_tags());
							}
						}
					}
				}
			}
		}
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Redirect_Modal_Based_On_Country_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Redirect_Modal_Based_On_Country_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/app.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Redirect_Modal_Based_On_Country_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Redirect_Modal_Based_On_Country_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/app.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Get cookie.
	 *
	 * @since    1.0.0
	 */
	public function rmboc_visitor_stay() {
		$cookieName = get_option(RMBOC_SHORT_PREFIX.'_cookie_name');
		if (isset($_COOKIE[$cookieName])) {
			return true;
		}

		return false;
	}

	/**
	 * Get visitor ip info.
	 *
	 * @since    1.0.0
	 */
	public function rmboc_visitor_ip_info() {
		$visitorIp = $this->rmboc_ip_checker();
		if (!$visitorIp) return;

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-redirect-modal-based-on-country-api.php';

		$results = (new Redirect_Modal_Based_On_Country_API)->get_visitor_ip_info($visitorIp);

		return $results;
	}

	/**
	 * Get setting.
	 *
	 * @since    1.0.0
	 */
	public function rmboc_check_settings($countryCode)
	{
		$setting = cmb2_get_option( RMBOC_SHORT_PREFIX.'_options', RMBOC_SHORT_PREFIX.'_'.$countryCode );
		if (!$setting) {
			return;
		}

		return $setting;
	}

	/**
	 * Get visitor ip address.
	 *
	 * @since    1.0.0
	 */
	public function rmboc_ip_checker() {
        $direct_ip = null;
        // Gets the default ip sent by the user
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $direct_ip = $_SERVER['REMOTE_ADDR'];
        }
        // Gets the proxy ip sent by the user
        $proxy_ip     = null;
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $proxy_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED'])) {
            $proxy_ip = $_SERVER['HTTP_X_FORWARDED'];
        } else if (!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
            $proxy_ip = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (!empty($_SERVER['HTTP_FORWARDED'])) {
            $proxy_ip = $_SERVER['HTTP_FORWARDED'];
        } else if (!empty($_SERVER['HTTP_VIA'])) {
            $proxy_ip = $_SERVER['HTTP_VIA'];
        } else if (!empty($_SERVER['HTTP_X_COMING_FROM'])) {
            $proxy_ip = $_SERVER['HTTP_X_COMING_FROM'];
        } else if (!empty($_SERVER['HTTP_COMING_FROM'])) {
            $proxy_ip = $_SERVER['HTTP_COMING_FROM'];
        }
        // Returns the true IP if it has been found, else FALSE
        if (empty($proxy_ip)) {
            // True IP without proxy
            return $direct_ip;
        } else {
            $is_ip = preg_match('|^([0-9]{1,3}\.){3,3}[0-9]{1,3}|', $proxy_ip, $regs);
            if ($is_ip && (count($regs) > 0)) {
                // True IP behind a proxy
                return $regs[0];
            } else {
                // Can't define IP: there is a proxy but we don't have
                // information about the true IP
                return $direct_ip;
            }
        }
	}

	/**
	 * Allowing widget.
	 *
	 * @since    1.0.0
	 */
	private function rmboc_expanded_alowed_tags() {
		$my_allowed = wp_kses_allowed_html( 'post' );
		$my_allowed['main-modal'] = array(
			'title' => array(),
			'text'    => array(),
			'icon'  => array(),
			'country' => array(),
			'redirect_to_btn_text'  => array(),
			'redirect_to_btn_color'  => array(),
			'stay_btn_text' => array(),
			'stay_btn_color'    => array(),
			'host'  => array(),
			'cookie_name' => array(),
			'href'  => array(),
		);

		return $my_allowed;
	}

}

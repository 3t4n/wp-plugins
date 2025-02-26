<?php

  /**
	* Find A Covid testing Center 
	*
	*	@since 0.1
	*/

class wpRemoteSiteSearchAssets
{
    /**
     * Instance of wpRemoteSiteSearchAssets class
     *
     */ 
    public static function instance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new wpRemoteSiteSearchAssets();
        }
        return $instance;
    }

    /**
     * Constructor enqueue styles & scripts 
     *
     */
    private function __construct()
    {
    	add_action('wp_enqueue_scripts', 	array($this,'remote_site_search_scripts'));
		add_action('wp_enqueue_scripts',	array($this,'remote_site_search_styles'), 99);

		add_action( 'plugins_loaded',       array( $this, 'load_textdomain' ) );

		// include plugin links class
		require_once( FIND_A_COVID_TESTING_CENTER_DIR. '/public/includes/plugin-links-class.php' );

		// setup plugin links
		$plugin_links = new WRSS_Links();
		$plugin_links->setup();

    }

   /**
	*	Enqueue scripts
	*
	*	@since 0.1
	*/
	public function remote_site_search_scripts(){

		// wp remote_site_search script
		wp_register_script('rs-script', FIND_A_COVID_TESTING_CENTER_URL.'/public/assets/js/multisite-search.js', array('jquery', 'underscore', 'backbone'), FIND_A_COVID_TESTING_CENTER_VERSION, true);

		// Localize the script with new data
			$messages_array = array(
				'least_char' => __('Search must be at least 3 characters.','wp-remote-site-search'),
				'no_result' => __('No results found. Please try again with a City and Sate OR Zip Code','wp-remote-site-search'),
				'we_found' => __('These are the top','wp-remote-site-search'),
				'found_msg' => __('Covid Testing Centers in your area:','wp-remote-site-search'),
				'end_point_error' => __('Were have issues connecting to CovidTestingCenters.com. Please try your request again.', 'wp-remote-site-search')
			);
			wp_localize_script( 'rs-script', 'rs_search_msg', $messages_array );

		wp_register_script('rs-trigger-script', FIND_A_COVID_TESTING_CENTER_URL.'/public/assets/js/ms-trigger.js', array('jquery'), FIND_A_COVID_TESTING_CENTER_VERSION, true);
		
	}

   /**
	*	Enqueue the style sheet (low priority) to avoid theme conflicts with basic layout styles
	*
	*	@since 0.1
	*/
	public function remote_site_search_styles() {

			// wp remote_site_search style
			wp_register_style('rs-style', FIND_A_COVID_TESTING_CENTER_URL.'/public/assets/css/style.css', FIND_A_COVID_TESTING_CENTER_VERSION );

	}

	/**
	 * Loads textdomain for the plugin.
	 *
	 * @since 1.0.1
	 */
	function load_textdomain() {
		load_plugin_textdomain( 'wp-remote-site-search' );
	}
}
$remote_site_search_assets = wpRemoteSiteSearchAssets::instance();
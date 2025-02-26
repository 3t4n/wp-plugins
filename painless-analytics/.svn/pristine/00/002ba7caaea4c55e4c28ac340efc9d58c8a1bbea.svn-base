<?php
/*
 * painlessAnalytics class
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class painlessAnalytics {

    private $settings = null;

    /*
    * init()
    * 
    * Initialize plugin
    */
    public function init() {
        load_plugin_textdomain( 'painless-analytics' ); // Support translation
        
        // See if we have an api URL in the settings...
        $this->settings = get_option('painlessanalytics');
        $this->initHooks();
    }

    /*
    * initHooks()
    */
    private function initHooks() {
        $headPriority = isset($this->settings['head_priority']) && is_numeric($this->settings['head_priority']) ? intval($this->settings['head_priority']) : 0 ; // Future advanced setting
        add_action('wp_head', array($this, 'wp_head'), $headPriority );
    }

    /*
    * wp_head()
    */
    function wp_head() {
        if( $this->getApiUrl() ) {
            $args = array(
                'api_url'=>$this->getApiUrl()
            );
            $this->view('wp_head', $args);
        }
    }
    
    /*
    * Load a view to display on the public side of site
    */
    public function view( $name, array $args = array() ) {
        $file = PAINLESSANALYTICS_PLUGIN_PATH . 'views/'. $name . '.php';
        if( file_exists($file) ) {
		    include( $file ); }
	}

    /*
    * Singleton
    */
    public static function getInstance() {
        if( isset($GLOBALS['painlessanalytic_plugin']) && is_object($GLOBALS['painlessanalytic_plugin']) )
            return $GLOBALS['painlessanalytic_plugin'];

        $GLOBALS['painlessanalytic_plugin'] = new painlessAnalytics();
        return $GLOBALS['painlessanalytic_plugin'];
    }

    /*
    * pluginUrl()
    */
    public function pluginUrl() {
        return plugin_dir_url(__FILE__);
    }

    /*
    * pluginDir()
    */
    public function pluginDir() {
        return plugin_dir_path(__FILE__);
    }

    /*
    * getApiUrl()
    */
    public function getApiUrl() {

        if( !empty($this->settings['api_url'])) {
            return $this->settings['api_url'];
        }
        
        return false;
    }

    /*
    * getAdminApiUrl()
    */
    public function getAdminApiUrl() {

        if( empty($this->settings['admin_mode']) ) {
            return false; // Default, if not set then don't track the admin area
        }

        if( !empty($this->settings['api_url']) && empty($this->settings['admin_separately']) ) {
            return $this->settings['api_url'];
        }

        if( !empty($this->settings['admin_api_url']) && !empty($this->settings['admin_separately']) ) {
            return $this->settings['admin_api_url'];
        }
        
        return false;
    }
};

// eof
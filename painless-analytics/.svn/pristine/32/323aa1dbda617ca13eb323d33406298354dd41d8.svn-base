<?php
/**
 * Painless Analytics wp-admin
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class painlessAnalyticsAdmin {

    private $apiUrl = 'https://api.painlessanalytics.com';

    /*
    * init()
    */
    public function init() {
        $this->initHooks();
    }

    /*
    * admin_init()
    */
    public function admin_init() {
        // Initialize plugin
        if ( get_option( 'activated_painlessanalytics' ) ) {
			delete_option( 'activated_painlessanalytics' );
			if ( !headers_sent() ) {
                $url = $this->getSettingsPageUrl();
				wp_redirect( $url );
                return;
			}
		}

        // Future proofing (Only do this if we can confirm user data is already loaded into memory)
        if( get_user_meta( get_current_user_id(), 'activated_painlessanalytics',  true) ) {
            delete_user_meta( get_current_user_id(), 'activated_painlessanalytics');
			if ( !headers_sent() ) {
                $url = $this->getSettingsPageUrl();
				wp_redirect( $url );
                return;
			}
        }

        $args = array(
			'type' => 'array', 
			'sanitize_callback' => array($this, 'sanitizeSettings'),
			'default' => array(),
			);

        register_setting('painlessanalytics_settings_group', 'painlessanalytics', $args ); // multiple settings in Array
    }

    public static function getTrackUrlFromEmbed($embed) {

        if( preg_match('/(https?\:\/\/[^\/]*)\/t/im', $embed, $matches) ) {
            return $matches[1]; // Found it!
        }

        return false;
    }

    /*
    * testTrackUrl($url)
    *
    * Returns true if test successful, false otherwise
    */
    public static function testTrackUrl($url) {
        // Make an HTTP connection to the track Url  with a /t.js, it should return valid JS within 3 seconds
        $args = ['timeout'=> 3];
        $response = wp_remote_get( $url . '/t.js', $args);

        if ( !is_array( $response ) || is_wp_error( $response ) ) {
            if( !is_wp_error($response)) {
                $response = new WP_Error( 'http_error', __('Unknown HTTP error occurred', 'painless-analytics') );
            }
    
            return $response; // return WP_Error
        }

        $body = ( !empty($response['body']) ? $response['body'] : '');
        if( preg_match('/painlessanalytics\.com/im', $body) ) { // Should have hostname in the js file
            return true;
        }

        return false;
    }

    /*
    * sanitizeSettings($value)
    */
    public function sanitizeSettings($value) {

        $errorMessage = '';
        $lastSettings = get_option('painlessanalytics');
        $linkCode = $value['link_code'];
        $value['api_url'] = ( !empty($lastSettings['api_url'])? $lastSettings['api_url'] : '');
        if( empty($linkCode) ) {
            $value['api_url'] = '';
        }

        if ( $linkCode ) {
            $httpHost = '';
            if( !empty($_SERVER['HTTP_HOST']) ) {
                $httpHost = sanitize_text_field( wp_unslash($_SERVER['HTTP_HOST']) );
            } else {
                $httpHost = wp_parse_url( get_site_url(), PHP_URL_HOST );
            }
            $postArgs = array();
            $postArgs['code'] = $linkCode;
            $postArgs['return'] = 'api_url';
            if( !empty($httpHost) ) {
                $postArgs['register_host'] = $httpHost;
            }
            
            // With this link code we can 
            $url = $this->apiUrl .'/link';
            $response = wp_remote_post( $url, array(
                'body'    => $postArgs
            ) );
            
            $jsonResults = array();
            if( !is_wp_error( $response ) ) {

                $body = wp_remote_retrieve_body( $response );
                if(!is_wp_error( $body ) ) {
                    $jsonResults = json_decode( $body, true );
                }
            }
            else {
                $errorMessage = __('The provided Painless Analytics Link Code is invalid.', 'painless-analytics');
            }

            if( !empty($jsonResults['status']) && $jsonResults['status'] == 'success' && !empty($jsonResults['data']['results']['api_url']) ) {
                $value['api_url'] = sanitize_url($jsonResults['data']['results']['api_url']);
                $value['hostname'] = $httpHost;
            } else if( !empty($jsonResults['message'])) {
                $errorMessage = sanitize_text_field($jsonResults['message']);
            } else if( empty($errorMessage) ) {
                $errorMessage = __('An error occurred during linking.', 'painless-analytics');
            }

            // If there are no errors, sweet!
            if( empty($errorMessage) ) {
                add_settings_error(
                    'painlessanalytics_message',
                    esc_attr( 'settings_updated' ),
                    __('Painless Analytics is now enabled on your site. Please clear your site cache now if applicable.', 'painless-analytics'),
                    'updated'
                );
            } else {
                add_settings_error(
                    'painlessanalytics_message',
                    esc_attr( 'settings_updated' ),
                    $errorMessage,
                    'error'
                );
            }
        }

        return $value;
    }

    /*
    * initHooks()
    */
    private function initHooks() {
        $pluginDir = painlessAnalytics::getInstance()->pluginDir();
        add_action('admin_init', array($this, 'admin_init'));
        register_activation_hook( $pluginDir . 'painless-analytics.php', array( $this, 'register_activation_hook'));
        add_action('admin_menu', array( $this, 'admin_menu'));
        add_action('admin_head', array( $this, 'admin_head'));
        add_action('admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
        add_filter('plugin_action_links_'.plugin_basename( $pluginDir . 'painlessanalytics.php'), array( $this, 'plugin_action_links' ) ); // WP 2.7+
        add_filter('admin_body_class', array($this, 'admin_body_class') );
    }

    /*
    * Singleton
    */
    public static function getInstance() {
        if( isset($GLOBALS['painlessanalytics_plugin_admin']) && is_object($GLOBALS['painlessanalytics_plugin_admin']) )
            return $GLOBALS['painlessanalytics_plugin_admin'];

        $GLOBALS['painlessanalytics_plugin_admin'] = new painlessAnalyticsAdmin();
        return $GLOBALS['painlessanalytics_plugin_admin'];
    }

    /*
    * getSettingsPageUrl($args=array())
    */
    private function getSettingsPageUrl( $args = array() ) {
        if( !empty($args) ) {
            return add_query_arg( $args, menu_page_url( 'painlessanalytics', false ) );
        }
            
        return menu_page_url( 'painlessanalytics', false );
    }

    /*
    * register_activation_hook()
    */
    public function register_activation_hook() {
        add_user_meta( get_current_user_id(), 'activated_painlessanalytics', true, true); // Next page load, we will redirect to the settings page
        //add_option( 'activated_painlessanalytics', true, true ); // Next page load, we will redirect to the settings page
    }

    /*
    * admin_menu()
    */
    public function admin_menu() {
        add_options_page(__('Simplified web metrics', 'painless-analytics'), __('Painless Analytics', 'painless-analytics'), 'manage_options', 'painlessanalytics', array($this, 'painlessanalytics_settings'));
    }

    /*
    * admin_enqueue_scripts()
    */
    public function admin_enqueue_scripts() {

        if ( in_array( $GLOBALS['hook_suffix'], array(
			'settings_page_painlessanalytics' // settings page
		) ) ) {
            wp_register_style( 'painlessanalytics-admin', PAINLESSANALYTICS_PLUGIN_URL . 'admin/css/styles.css', array(), filemtime( PAINLESSANALYTICS_PLUGIN_PATH . 'admin/css/styles.css' ) );
            wp_enqueue_style( 'painlessanalytics-admin' );
        }
    }

    /*
    * plugin_action_links( $links )
    */
    public function plugin_action_links( $links ) {
        $url = $this->getSettingsPageUrl();
        $settings_link = '<a href="'.esc_url( $url ).'">'.__('Settings', 'painless-analytics').'</a>';
        array_unshift( $links, $settings_link );
        return $links;
    }

    /*
    * admin_head()
    */
    public function admin_head() {
        if( painlessAnalytics::getInstance()->getAdminApiUrl() ) {
            $args = array(
                'api_url'=>painlessAnalytics::getInstance()->getAdminApiUrl()
            );
            painlessAnalytics::getInstance()->view('wp_head', $args);
        }
    }

    /*
    * admin_body_class($value)
    */
    public function admin_body_class($value) {
        if ( in_array( $GLOBALS['hook_suffix'], array(
			'settings_page_painlessanalytics' // settings page
		) ) ) {

            $value .= ' painlessanalytics-page';
        }
        return $value;
    }

    /*
    * painlessanalytics_settings()
    */
    public function painlessanalytics_settings() {
        painlessAnalyticsAdmin::view('page');
    }

    /*
    * plugin_action_links_no( $links, $file ) 
    */
    public function plugin_action_links_no( $links, $file ) {
        $pluginUrl = painlessAnalytics::getInstance()->pluginUrl();
		if ( $file == plugin_basename( $pluginUrl . '/painlessanalytics.php' ) ) {
            $url = $this->getSettingsPageUrl();
			$links[] = '<a href="' . esc_url( $url ) . '">'.esc_html__( 'Settings' , 'painless-analytics').'</a>';
		}

		return $links;
	}

    /*
    * plugin_action_links_no( $name, $args = array() ) 
    */
    public static function view( $name, $args = array() ) {

        $file = PAINLESSANALYTICS_PLUGIN_PATH . 'admin/views/'. $name . '.php';
		
        if( file_exists($file) ) {
            include( $file );
        }
	}
};

painlessAnalyticsAdmin::getInstance()->init();

// eof
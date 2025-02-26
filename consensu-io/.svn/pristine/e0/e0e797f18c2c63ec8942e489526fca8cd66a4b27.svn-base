<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://consensu.io
 * @since      1.0.0
 *
 * @package    Consensu_IO
 * @subpackage Consensu_IO/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Consensu_IO
 * @subpackage Consensu_IO/public
 * @author      Consensu.IO <contato@consensu.io>
 */
class Consensu_IO_Public {

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
	 * The final consensu client tag
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $tag_key    The final consensu client tag
	 */
	private $tag_key;

	/**
	 * The client key.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $client_key    The client key.
	 */
	private $client_key;
	private $debug_mode;

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
		$this->fill_options();

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_consensu_script() {
		wp_enqueue_script('consensu', 'https://www.consensu.io/bundle.min.js' , array(), $this->version, true);
			
	}

	function consensu_script_attrs( $tag, $handle ) {
		if ( 'consensu' !== $handle ) 
			return $tag;
		
		return str_replace(' src', ' key="'. $this->get_client_key() .'" '.$this->get_debug_mode().' src', $tag);
	}


	public function get_client_key() {
		return $this->client_key;
	}

	public function get_debug_mode() {
		 return $this->debug_mode ? 'debug="true"' : '';
	}

	private function fill_options() {
		$options = $this->get_safe_options();
		$this->client_key = esc_attr($options['client_key']);
		$this->debug_mode = esc_attr($options['debug_mode']);
	}

	
    /**
     * Get fail safe options
     * @return array
     */
    private function get_safe_options()
    {
        // Get fresh options from db
        $db_options = get_option(CONSENSU_IO_OPTION_NAME);
		
        // Be fail safe, if not array then array_merge may fail
        if (!is_array($db_options)) {
            $db_options = array();
        }

        // If options not exists in db then init with defaults , also always append default options to existing options
        $db_options = empty($db_options) ? $this->get_default_options() : array_merge($this->get_default_options(), $db_options);
        return $db_options;
		
    }

	
    /**
     * Return default options for this plugin
     * @return array
     */
    private function get_default_options()
    {
        $defaults = array(
            'plugin_ver' => $this->version,
			'client_key' => '',
			'debug_mode' => false,
        );
        return $defaults;
    }
	

	 /**
     * Function will print our option page form
     */
    public function load_options_page()
    {
        if (!current_user_can('manage_options')) {
            wp_die(esc_html_e('You don\'t have sufficient permissions to access this page.', 'consensu-io'));
        }

        $this->load_view('settings-page.php');

    }
	

}

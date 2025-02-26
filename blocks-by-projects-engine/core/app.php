<?php

namespace goodblocks;

/**
 * Everything will be loaded here.
 *
 * @class App
 */
class App {
    private $plugin_domain = 'goodblocks';
    private $plugin_version = '1.1.2';

    /**
	 * App constructor.
	 *
	 * @since 1.0.1
     * 
	 * @access public
	 */
	public function __construct() {
        /**
         * Load the scripts and styles.
         */
        $this->load_scripts();
	}

    /**
     * Load the option pages method.
     *
     * @return void
     */
    public function load_scripts() {
        /**
         * Require the scripts class.
         */
		require_once plugin_dir_path( __FILE__ ). '../include/scripts.php';
        new Scripts($this->get_plugin_domain(), $this->get_plugin_version());

        /**
         * Require the plugin meta.
         */
        require_once plugin_dir_path( __FILE__ ). '../include/meta.php';
    }

    /**
     * Gte the plugin domain.
     *
     * @return string
     */
    public function get_plugin_domain() {
        return $this->plugin_domain;
    }

     /**
     * Gte the plugin version.
     *
     * @return string
     */
    public function get_plugin_version() {
        return $this->plugin_version;
    }
}

new App;
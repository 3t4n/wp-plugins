<?php

namespace GSBEH;

// if direct access than exit the file.
defined('ABSPATH') || exit;

final class Plugin {

    private static $instance = null;

    public $shortcode;
    public $db;
    public $integrations;
    public $helpers;
    public $addons;
    public $data;
    public $builder;
    public $ajax;
    public $assets;
    public $scripts;    
    public $templateLoader;
    public $behance;
    public $cpt;

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    /**
     * Class Constructor
     *
     * @since  2.0.12
     * @return void
     */
    public function __construct() {

        $this->builder          = new Builder;
        $this->helpers          = new Helpers;
        $this->data             = new DataLayer;
        $this->ajax             = new Ajax;
        $this->shortcode        = new Shortcode;
        $this->scripts          = new Scripts;
        $this->db               = new Database;
        $this->integrations     = new Integrations;
        $this->templateLoader   = new TemplateLoader;

        require_once GSBEH_PLUGIN_DIR . 'includes/gs-common-pages/gs-behance-common-pages.php';        
        require_once GSBEH_PLUGIN_DIR . 'includes/asset-generator/gs-load-asset-generator.php';

        // register widget
        add_action( 'init', [ $this, 'init' ] );
        add_action( 'init', [ $this, 'plugin_update_version' ], 0 );
        
        // firing the initial compatibility migration
        add_action( 'plugins_loaded', [ $this, 'plugin_loaded' ] );
        add_action( 'in_admin_header', [$this, 'disable_admin_notices'], PHP_INT_MAX );
    }

    function disable_admin_notices() {
        global $parent_file;
        if ( $parent_file != 'gs-behance-shortcode' ) return;
        remove_all_actions( 'network_admin_notices' );
        remove_all_actions( 'user_admin_notices' );
        remove_all_actions( 'admin_notices' );
        remove_all_actions( 'all_admin_notices' );
    }

    public function plugin_loaded() {
        plugin()->db->migration();
    }

    /**
     * Plugin Initialization
     *
     * @since  2.0.12
     * @return void
     */
    public function init() {
        // Schedule Events
        if ( ! wp_next_scheduled( 'gs_task_hook' ) ) {
            wp_schedule_event( time(), 'daily', 'gs_task_hook' );
        }
    }

    public function plugin_update_version() {
    
        $old_version = get_option('gsbeh_plugin_version');
    
        if (GSBEH_VERSION === $old_version) return;
        
        plugin()->builder->maybe_upgrade_data($old_version);
        
        gsBehanceAssetGenerator()->assets_purge_all();

        update_option('gsbeh_plugin_version', GSBEH_VERSION);
        
    }
}

function plugin() {
	return Plugin::get_instance();
}
plugin();

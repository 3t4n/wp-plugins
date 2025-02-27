<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

final class Plugin {

	private static $_instance;

    public static function get_instance() {

        if ( ! self::$_instance ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

	public $taxonomy;
	public $scripts;
	public $shortcode;
	public $sortable;
	public $notices;
	public $integrations;
	public $builder;
	public $load_template;

	private function __construct() {

		$this->scripts        = new Scripts();
		$this->sortable       = new Sortable();
		$this->notices        = new Notices();
		$this->integrations   = new Integrations();
		$this->builder   	  = new ShortcodeBuilder();
		$this->load_template  = new TemplateLoader();
		
		new Hooks();
		new CPT();
		new MetaBox();
		new Columns();
		new Shortcode();
		new Taxonomy();
		// new Taxonomy_Image();
		// new Taxonomy_Repeat();

		require_once GS_BOOKS_PLUGIN_DIR . 'includes/demo-data/gs-books-dummy-data.php';
		require_once GS_BOOKS_PLUGIN_DIR . 'includes/asset-generator/gs-load-assets-generator.php';
        require_once GS_BOOKS_PLUGIN_DIR . 'includes/gs-common-pages/gs-book-common-pages.php';
	}

}

function plugin() {
	return Plugin::get_instance();
}
add_action('plugins_loaded', function() {
    plugin();
}, 0 );
<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

class Easy_Quotes
{
	function __construct()
	{
		add_action('init', [$this, 'translation']);
		add_action( 'plugins_loaded', [$this, 'update_db'] );

		require_once('quotes-data.php');
		require_once('quotes-stars.php');
		require_once('quotes-post-type.php');
		require_once('quotes-block.php');
		require_once('quotes-rest-route.php');
		require_once('quotes-font.php');
		require_once('quotes-fonts-database.php');
		
		new Quotes_Data();
		new Quotes_Stars();
		new Quotes_Post_Type();
		new Quotes_Block();
		new Quotes_Rest_Route();

		global $eqdb;
		$eqdb = new Quotes_Fonts_Database();
		if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {
			//register_deactivation_hook(QUOTES_DIR.'plugin.php', array('Easy_Quotes', 'deactivate'));
			register_uninstall_hook(QUOTES_DIR.'plugin.php', array('Easy_Quotes', 'uninstall'));
		}
	}

	function translation()
	{
		load_plugin_textdomain('easy-quotes', false, QUOTES_PLUGIN_BASE . '/languages');
	}

	public static function deactivate()
	{
		// do nothing
	}

	public static function uninstall()
	{
		/** @var Quotes_Fonts_Database $eqdb */
		global $eqdb;
		$eqdb->dropTables();
		delete_option('easy-quotes-db-version');
	}

	public function update_db() {
		/** @var Quotes_Fonts_Database $eqdb */
		global $eqdb;
		$eqdb->load_google_fonts_json(QUOTES_DIR . 'includes/google-fonts.json');
	}
}

new Easy_Quotes();

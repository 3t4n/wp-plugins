<?php
namespace MonetizeLinkPlugin;

class MLP_Config extends MLP_Base
{
	const AJAX_ACTION = 'mlp_uuid_delete';
	const NONCE       = 'javH5BF2qSgt';
	const PlUGIN_KEY  = 'monetize-link';
	const OPTION      = 'takeads_uuid4';
	const PATTERN     = '^[0-9A-F]{8}-[0-9A-F]{4}-[4][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$';

	public static $script = array(
		'url' => 'https://convertlink.com/script/[id]/bundle.js',
		'key' => 'monetizelink-plugin'
	);

	public static $js_selectors = array(
		'main'   => '.takeads-plugin',
        'button' => '.takeads-btn',
        'field'  => '#platform_id',
        'popup'  => '.takeads-popup',
	);

	public static $settings = array(
		'capability' => 'manage_options',
		'page'       => 'monetizelink-setting',
		'group'      => 'monetizelink_option_group',
	);

	public static $field_key = 'platform_id';
	public static $error_key = 'monetizelink_option_error';

	public function __construct()
	{
		add_action( 'admin_notices', array( $this, 'error_notice' ) );
		add_action( 'plugins_loaded', array( $this, 'plugin_translate' ) );
		add_action( 'plugin_action_links_' . MLP_PLUGIN_FILE, array( $this, 'plugin_link' ), 10, 2 );
	}

	public function plugin_translate()
	{
		$file = MLP_PLUGIN_FOLDER . '/languages';
		load_plugin_textdomain( 'monetize-link', false, $file );
	}

	public function plugin_link( $actions, $plugin_file )
	{
		$text = __( 'Settings', 'monetize-link' );
		$link = '<a href="options-general.php?page=%s">%s</a>';
		$link = sprintf( $link, self::$settings['page'], $text );
		array_unshift( $actions, $link );
		return $actions;
	}

	public function error_notice()
	{
		settings_errors( self::$error_key );
	}
}
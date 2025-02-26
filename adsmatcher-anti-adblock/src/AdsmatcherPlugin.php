<?php
namespace Adsmatcher\Antiadblock;

class AdsMatcherPlugin
{
	const ADSMATCHER_ACTIVATED = 'adsmatcher_activated';
	
	public function __construct(string $file)
	{
		register_activation_hook($file, [$this, 'plugin_activation']);
		add_action('admin_notices', [$this, 'notice_activation']);
		$this->init_hooks();
	}

	public function plugin_activation(): void
	{
		set_transient(self::ADSMATCHER_ACTIVATED, true);
	}
	
	public function notice_activation(): void
	{
		if(get_transient(self::ADSMATCHER_ACTIVATED)){
			self::render('notices', ['message' => "<h3 style='padding:2px;font-weight:normal;margin:.5em 0 0;'>Thank you for installing <strong>AdsMatcher</strong> !</h3> <p>You can customize the message that will be displayed to visitors who use an Adblock on your website in the settings.</p>"]);
			delete_transient(self::ADSMATCHER_ACTIVATED);
			update_option('adsmatcher_display_clostebtn', 0);
			update_option('adsmatcher_title', 'Adblock Detected');
			update_option('adsmatcher_message', 'Please consider supporting us by disabling your ad blocker');
		}
	}

	public static function render(string $name, array $args = []): void
	{
		extract($args);
		$file = ADSMATCHERPLUGIN_DIR . "views/$name.php";
		ob_start();
		include_once($file);
		echo ob_get_clean();
	}
	
	public function init_hooks(): void
	{
		add_action('admin_menu', [$this, 'admin_menu']);
		add_action('admin_init', [$this, 'admin_init']);
	}
	
	public function admin_menu(): void
	{
		add_options_page('adsmatcher', 'AdsMatcher', 'manage_options', 'adsmatcher_plugin', [$this, 'config_page']);
	}

	public function config_page(): void
	{
		AdsMatcherPlugin::render('settings');
	}

	public function admin_init(): void
	{
		register_setting('adsmatcher', 'adsmatcher_uniqueid');
		register_setting('adsmatcher', 'adsmatcher_title');
		register_setting('adsmatcher', 'adsmatcher_message');
		register_setting('adsmatcher', 'adsmatcher_optimization');
		register_setting('adsmatcher', 'adsmatcher_display_clostebtn');
		add_settings_section('adsmatcher_settings', '', '', 'adsmatcher');
	}
	
	public function init(){
		add_action('wp_enqueue_scripts', array($this, 'add_adsmatcher_viewability_code'));
		add_action('wp_footer',array($this, 'add_adsmatcher_antiadblocker'));
	}
	
	public function add_adsmatcher_viewability_code(){
		/* This JS code check if your ads are clearly visible to your audience and check if the anti ad-blocker is working properly, to change your identifiers or update the plugin if necessary. */
		wp_enqueue_script('viewability-checking', 'https://www.adsmatcher.com/api/viewability.min.js');
	}
	
	public function add_adsmatcher_antiadblocker(){
		wp_enqueue_style('style', plugins_url( '/style.css', __FILE__ ), false, '1.0', 'all' );
		AdsMatcherPlugin::render('message');
	}
	
}
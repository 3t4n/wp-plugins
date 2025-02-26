<?php

class Mail365Activation {
			
	public function __construct()
	{
		if (isset($_POST["mail365_api_key"]) && !empty($_POST["mail365_api_key"])) {
			$this->saveApiKey();
		} else {
			$this->index();
		}
	}
		
	public static function activatePlugin()
	{
		self::addOptions();
	}

	public static function deactivatePlugin()
	{
		self::removeOptions();
	}
	
	private static function addOptions()
	{
		add_option('mail365_api_key', '');
	}
	
	private static function removeOptions()
	{
		delete_option('mail365_api_key');
	}
	
	public static function index()
	{
		include(dirname(plugin_dir_path(__FILE__)) . '/templates/Activation/activation.php');

		return true;
	}
	
	public static function saveApiKey()
	{
		$apiKey = $_POST['mail365_api_key'];
		
		update_option('mail365_api_key', $apiKey);

		die(json_encode(
			array(
				"error" => 0,
				"redirectURL" => admin_url('tools.php?page=mail365')
			)
		));
	}
	
	public static function addManagementPage()
	{
		wp_enqueue_style('mail365_admin', dirname(plugin_dir_url(__FILE__)) . '/css/mail365.css', false);
		wp_enqueue_script('mail365_admin', dirname(plugin_dir_url(__FILE__)) . '/js/mail365.js');
		
		$jsTrans = array(
			'deleteQuestion' => __('Are you sure you want to delete an item', 'mail365')
		);
		wp_localize_script('mail365_admin', 'mail365JsTrans', $jsTrans);
		
		if (empty($_POST)) {
			new self();
		}
	}
	
	static public function addMenuPages()
	{
		if (!get_option('mail365_api_key')) {
			add_management_page(
				'Mail365 Integration',
				'Mail365',
				'edit_plugins',
				'mail365',
				array('Mail365Activation', 'addManagementPage')
			);
			if (!empty($_POST)) {
				new Mail365Activation();
			}
		} else {
			add_management_page(
				'Mail365 Integration',
				'Mail365',
				'edit_plugins',
				'mail365',
				array('Mail365Import', 'addManagementPage')
			);
			if (!empty($_POST)) {
				new Mail365Import();
			}
		}
	}

}

?>
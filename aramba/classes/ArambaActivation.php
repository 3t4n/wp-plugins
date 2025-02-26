<?php

class ArambaActivation {
			
	public function __construct()
	{
		if (isset($_POST["aramba_api_key"]) && !empty($_POST["aramba_api_key"])) {
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
		add_option('aramba_api_key', '');
	}
	
	private static function removeOptions()
	{
		delete_option('aramba_api_key');
	}
	
	public static function index()
	{
		include(dirname(plugin_dir_path(__FILE__)) . '/templates/Activation/activation.php');

		return true;
	}
	
	public static function saveApiKey()
	{
		$apiKey = $_POST['aramba_api_key'];
		
		update_option('aramba_api_key', $apiKey);

		die(json_encode(
			array(
				"error" => 0,
				"redirectURL" => admin_url('tools.php?page=aramba')
			)
		));
	}
	
	public static function addManagementPage()
	{
		wp_enqueue_style('aramba_admin', dirname(plugin_dir_url(__FILE__)) . '/css/aramba.css', false);
		wp_enqueue_script('aramba_admin', dirname(plugin_dir_url(__FILE__)) . '/js/aramba.js');
		
		$jsTrans = array(
			'deleteQuestion' => __('Are you sure you want to delete an item', 'aramba')
		);
		wp_localize_script('aramba_admin', 'arambaJsTrans', $jsTrans);
		
		if (empty($_POST)) {
			new self();
		}
	}
	
	static public function addMenuPages()
	{
		if (!get_option('aramba_api_key')) {
			add_management_page(
				'Aramba Integration',
				'Aramba',
				'edit_plugins',
				'aramba',
				array('ArambaActivation', 'addManagementPage')
			);
			if (!empty($_POST)) {
				new ArambaActivation();
			}
		} else {
			add_management_page(
				'Aramba Integration',
				'Aramba',
				'edit_plugins',
				'aramba',
				array('ArambaImport', 'addManagementPage')
			);
			if (!empty($_POST)) {
				new ArambaImport();
			}
		}
	}

}

?>
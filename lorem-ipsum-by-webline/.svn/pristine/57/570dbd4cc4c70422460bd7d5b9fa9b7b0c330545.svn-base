<?php
class lipsum_wli
{
	public function __construct()
	{
		if ( ! defined( 'ABSPATH' ) ) {
			exit();
		}
		// Plugin activate option
		register_activation_hook(WLI_LOREM_PATH . WLI_LOREM_PLUGIN_FILE, array($this,'lipsum_wli_default_option_value'));
		
		// Plugin deactivate option
		register_uninstall_hook(WLI_LOREM_PATH . WLI_LOREM_PLUGIN_FILE,array(__CLASS__,'lipsum_delete_option_value'));
	}
	
	public function lipsum_wli_default_option_value()
	{
		$default_values = array(
				'version'=>WLI_LOREM_VERSION,
		);
		add_option('lipsum_wli',$default_values);
		update_option('libw_activation_date', time());
	}
	
	public static function lipsum_delete_option_value()
	{
		delete_option('lipsum_wli');	
	}
	
}
new lipsum_wli();
?>

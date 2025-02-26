<?
require_once('bazaagentov_base.php');
if (!class_exists('bazaagentov_wp')) {
	class bazaagentov_wp extends bazaagentov_base {

		function __construct(){
			parent::__construct();
			$this->photo_default = trailingslashit(get_option('siteurl')).'wp-content/plugins/baza-agentov/data/no_foto.jpg';
		}
	
			// Перегражаемый метод, берет настройки из WordPress
		function getSettings() {
			
			if (!get_option('bazaagentov_settings')) $this->setupActivation();
			
			$settings = $this->settings_default;

			if (get_option('bazaagentov_settings'))
				$settings = array_merge($settings, get_option('bazaagentov_settings'));
			return $settings;
		}


	}
}


?>

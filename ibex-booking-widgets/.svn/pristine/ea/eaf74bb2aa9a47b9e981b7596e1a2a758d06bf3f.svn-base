<?php

/**
 * Controls the WordPress admin page for iBex
 *
 */
class iBex_Manager {

	/**
	 * Pid saved in the old version of this plugin
	 * @var int
	 */
	public $oldPid;

	/**
	 * RU saved in the old version of this plugin
	 * @var string
	 */
	public $oldRu;

	/**
	 * @var iBex_Manager
	 */
	protected static $_instance;

	protected function __construct(){
		self::$_instance = $this;
	}

	/**
	 * @return iBex_Manager
	 */
	public static function getInstance(){
		if(!self::$_instance){
			self::$_instance = new iBex_Manager();
		}
		return self::$_instance;
	}

	/**
	 * Execute all of the functions required to create the admin page
	 */
	public function execute(){

		// Global setup
		$oldpid = get_option('ibex_bw_setting_pid', 0);
		if($oldpid > 0){
			self::getInstance()->oldPid = $oldpid;
		}

		$oldru = get_option('ibex_bw_setting_ru', false);
		if($oldru){
			self::getInstance()->oldRu = $oldru;
		}

		// Only load if we're looking at an admin page
		if(is_admin()){
			$this->adminExecute();
		}
		else {
			$this->publicExecute();
		}
	}

	/**
	 * Admin Execution Functions
	 */
	public function adminExecute(){
		add_action('admin_menu', array('iBex_Manager', 'addOptionsPageLink'));
		add_action('admin_init', array($this, 'registerSettings'));

		if(isset($_GET['page']) && $_GET['page'] == 'ibex-widgets'){
			add_action('admin_enqueue_scripts', array('iBex_Manager', 'registerScriptsAndThemes'));
		}
	}

	/**
	 * Public Execution Functions
	 */
	public function publicExecute(){
		add_action('wp_enqueue_scripts', array($this, 'publicRegisterScripts'));

		$this->registerShortcodes();

		add_action('wp_head', array($this, 'publicHeadCode'));
	}

	/**
	 * Public Register Scripts
	 */
	public function publicRegisterScripts(){
		wp_register_script('ibw-resizer', IBEX_BW_PLUGIN_URL . '/scripts/resizer.js');
	}

	/**
	 * Print Options in the header
	 */
	public function publicHeadCode(){
		$args = array(
			'operator'	=> get_option('ibw-option-base-operatorid', ''),
			'msgagent'	=> IBEX_BW_PLUGIN_URL . '/scripts/ibex-message-agent.html'
		);

		echo '<meta name="ibw-config" id="ibw-config" data-config="' . htmlentities(json_encode($args), ENT_QUOTES) . '" />';
	}

	/**
	 * Register any shortcodes
	 */
	protected function registerShortcodes(){
		$availWidgets = $this->getAvailableWidgets();
		foreach($availWidgets as $folder=>$widgets){
			foreach($widgets as $widget=>$title){
				$widgetClass = self::getWidgetClassFile($folder, $widget);
				$widget = new $widgetClass;
				$shortcodes = call_user_func(array($widget, 'getShortCodes'));
				foreach($shortcodes as $code=>$callBack){
					add_shortcode($code, $callBack);
				}
			}
		}
	}



	public function setupObj(){
		$widget = isset($_GET['widget']) ? htmlentities($_GET['widget']) : null;

		$obj = null;
		if($widget){
			$path = explode('-', $widget, 2);
			$objName = iBex_Manager::getWidgetClassFile($path[0], $path[1]);
			$obj = call_user_func(array($objName, 'getInstance'));
			$return = true;
		}
		else {
			$obj = iBex_Widgets_Base::getInstance();
			$return = false;
		}

		/* @var $obj iBex_Widgets_Base */

		add_action('admin_init', array($obj, 'addSettingsSection'));
	}

	/**
	 * Register the scripts needed for the admin pages
	 */
	public static function registerScriptsAndThemes(){
		wp_enqueue_script('jquery');

		wp_register_script('ibex-options', IBEX_BW_PLUGIN_URL . '/scripts/admin.js', array('jquery'));
		wp_enqueue_script('ibex-options');

		wp_register_style('ibex-admin-css', IBEX_BW_PLUGIN_URL . '/css/admin.css');
		wp_enqueue_style('ibex-admin-css');
	}

	/**
	 * Add the link to the sidebar
	 */
	public static function addOptionsPageLink(){
		add_options_page('iBex Widgets', 'iBex Widgets', 'manage_options', 'ibex-widgets', array('iBex_Manager', 'iBexAdminPageOptions'));
	}

	/**
	 * Init the Options Page
	 */
	public static function iBexAdminPageOptions(){
		if ( !current_user_can( 'manage_options' ) )  {	wp_die( __( 'You do not have sufficient permissions to access this page.' ) ); }

		require_once IBEX_BW_PLUGIN_DIR . '/includes/admin-content.php';
	}

	/**
	 * @param string $folder
	 * @param string $key
	 * @return string
	 */
	public static function getWidgetClassFile($folder, $key){
		require_once IBEX_BW_PLUGIN_DIR . '/includes/widgets/' .  $folder . '/' . $key . '.php';
		$casedName = join('', array_map('ucfirst', explode('-', $key)));
		$objName = 'iBex_Widgets_' . ucwords($folder) . '_' . $casedName;
		$objName = str_replace('__', '_', $objName);

		return $objName;
	}

	/**
	 * Get a list of the available widgets
	 * @return array
	 */
	public function getAvailableWidgets(){
		$availableWidgets = array(
			'accommodation'	=>	array(
				'prop-single'	=>	'Single Property Booking Page',
				'prop-multi'	=>	'Multi Property Booking Page',
				'date-selector'	=>	'Date Selector',
				'mini-calendar'	=>	'Mini Calendar (Single Only)',
				'single-rates-calendar'	=>	'Rates Calendar (Single Only)',
			),
			'tours'			=>	array(),
			'rental'		=>	array(),
		);

		return $availableWidgets;
	}

	/**
	 * Register Settings
	 */
	public function registerSettings(){
		$availWidgets = $this->getAvailableWidgets();
		$availWidgets[''] = array('base'=>'Base');
		foreach($availWidgets as $folder=>$widgets){
			foreach($widgets as $widget=>$title){
				$widgetClass = self::getWidgetClassFile($folder, $widget);
				$settings = call_user_func(array($widgetClass, 'getSettings'));
				foreach($settings as $setting=>$callBack){
					register_setting('ibw-options-' . $widget, 'ibw-option-' . $widget . '-' . $setting, $callBack);
				}
			}
		}
	}


	/**
	 * Activation Hook
	 */
	public static function ibwActivationHook(){
		// Convert the old opid to the new opid
		$oldopid = get_option('ibex_bw_setting_opid', '');
		add_option('ibw-option-base-operatorid', $oldopid);
		delete_option('ibex_bw_setting_opid');

		// Convert old booking page to new
		$oldDefaultPage = get_option('ibex_bw_setting_dbpage', '');
		add_option('ibw-option-prop-single-bp', $oldDefaultPage);
		delete_option('ibex_bw_setting_dbpage');
	}

	/**
	 * Deactivation Hook
	 */
	public static function ibwDeactivationHook(){
		// Do some cleanup
	}

}

require_once IBEX_BW_PLUGIN_DIR . '/includes/widgets/base.php';
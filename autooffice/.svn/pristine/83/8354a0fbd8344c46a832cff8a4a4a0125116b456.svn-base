<?php
class AutoofficeOptions
{

	protected $page_settings;
	protected $page_settings_html;
	protected $page_settings_css;
	protected $page_settings_js;
	protected $capability = 'edit_others_posts';
	protected $url = 'autooffice';
	protected $sub_url_html = 'autooffice-html-code';
	protected $sub_url_css = 'autooffice-css-code';
	protected $sub_url_js = 'autooffice-js-code';
	protected $function_settings_page = 'aopf_autooffice_settings_page';
	protected $function_settings_page_html = 'aopf_autooffice_settings_page_html';
	protected $function_settings_page_css = 'aopf_autooffice_settings_page_css';
	protected $function_settings_page_js = 'aopf_autooffice_settings_page_js';
	protected $icons;
	protected $html_icons;
	protected $position = 14568;
	protected $html_position = 1;
	protected $data = [];
	protected $is_plugin_page;

	public function __construct()
	{
		add_action('admin_menu', array($this, 'aopf_autooffice_settings_menu'));
	}
	
	/**
	 * autooffice_settings_menu()
	 */
	public function aopf_autooffice_settings_menu() 
	{
   		$this->icons = plugins_url('/autooffice/assets/img/icon.png');
		$this->html_icons = plugins_url('/autooffice/assets/img/icon.png');
		$this->page_settings = __('AutoofficeEmail', 'autooffice');
		$this->page_settings_base = __('Settings', 'autooffice');
		$this->page_settings_html =  __('Code Html', 'autooffice');
		$this->page_settings_css =  __('Code Css', 'autooffice');
		$this->page_settings_js =  __('Code Js', 'autooffice');

		add_menu_page( 
			__('Autooffice Settings Base', 'autooffice'), 
			$this->page_settings, 
			$this->capability, 
			$this->url, 
			[$this, $this->function_settings_page], 
			$this->icons, 
			$this->position 
		);

		add_submenu_page(
			'autooffice',
			__('Settings', 'autooffice'),
			$this->page_settings_base, 
			$this->capability, 
			$this->url,
			[$this, $this->function_settings_page] 
		);

		add_submenu_page(
			'autooffice',
			__('Autooffice Settings Html', 'autooffice'),
			$this->page_settings_html, 
			$this->capability, 
			$this->sub_url_html,
			[$this, $this->function_settings_page_html] 
		);
		
		add_submenu_page(
			'autooffice',
			__('Autooffice Settings Css', 'autooffice'),
			$this->page_settings_css, 
			$this->capability, 
			$this->sub_url_css,
			[$this, $this->function_settings_page_css] 
		);
      
		add_submenu_page(
			'autooffice',
			__('Autooffice Settings Js', 'autooffice'),
			$this->page_settings_js, 
			$this->capability, 
			$this->sub_url_js,
			[$this, $this->function_settings_page_js] 
		);
	}

	/**
	 * settings_page()
	 */
	public function aopf_autooffice_settings_page()
	{
		self::resourceRegistration();

		if (empty($model) || get_class($model)!='AutoofficeModel') {
			$model = new AutoofficeModel();
		}
		
		$this->data = $model->aopf_autooffice_getData();

		if (!empty($_POST['Autooffice']) && is_array($_POST['Autooffice'])) {
			
			$this->data = $model->aopf_autooffice_load($_POST['Autooffice']);
			if ($model->aopf_autooffice_save()) {
				AutoofficeModel::aopf()->aopf_autooffice_setSession('success', 'all', __('Success', 'autooffice'));
				wp_redirect('https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			} else {
				AutoofficeModel::aopf()->aopf_autooffice_setSession('error', 'all', __('Data not recorded', 'autooffice'));
				wp_redirect('https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			}
		} else {
			require_once(AOPF_AUTOOFFICE_DIR.'views/plugin_settings_page.php');
		}
	}

	/**
	 * settings_page_html()
	 */
	public function aopf_autooffice_settings_page_html()
	{	
		self::resourceRegistration();

		if (empty($model) || get_class($model)!='AutoofficeModel') {
			$model = new AutoofficeModel();
		}
		
		$this->data = $model->aopf_autooffice_getData();

		if (!empty($_POST['Autooffice']) && is_array($_POST['Autooffice'])) {
			$this->data = $model->aopf_autooffice_load($_POST['Autooffice']);
			if ($model->aopf_autooffice_save()) {
				AutoofficeModel::aopf()->aopf_autooffice_setSession('success', 'all', __('Success', 'autooffice'));
				wp_redirect('https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			} else {
				AutoofficeModel::aopf()->aopf_autooffice_setSession('error', 'all', __('Data not recorded', 'autooffice'));
				wp_redirect('https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			}
		} else {
			require_once(AOPF_AUTOOFFICE_DIR.'views/plugin_settings_page_html.php');
		}
	}
	
	/**
	 * settings_page_css()
	 */
	public function aopf_autooffice_settings_page_css()
	{	
		self::resourceRegistration();

		if (empty($model) || get_class($model)!='AutoofficeModel') {
			$model = new AutoofficeModel();
		}
		
		$this->data = $model->aopf_autooffice_getData();

		if (!empty($_POST['Autooffice']) && is_array($_POST['Autooffice'])) {
			$this->data = $model->aopf_autooffice_load($_POST['Autooffice']);
			if ($model->aopf_autooffice_filesave()) {
				AutoofficeModel::aopf()->aopf_autooffice_setSession('success', 'all', __('Success', 'autooffice'));
				wp_redirect('https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			} else {
				AutoofficeModel::aopf()->aopf_autooffice_setSession('error', 'all', __('Data not recorded', 'autooffice'));
				wp_redirect('https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			}
		} else {
			require_once(AOPF_AUTOOFFICE_DIR.'views/plugin_settings_page_css.php');
		}
	}
	
	/**
	 * settings_page_js()
	 */
	public function aopf_autooffice_settings_page_js()
	{	
		self::resourceRegistration();

		if (empty($model) || get_class($model)!='AutoofficeModel') {
			$model = new AutoofficeModel();
		}
		
		$this->data = $model->aopf_autooffice_getData();

		if (!empty($_POST['Autooffice']) && is_array($_POST['Autooffice'])) {
			$this->data = $model->aopf_autooffice_load($_POST['Autooffice']);
			if ($model->aopf_autooffice_filesave()) {
				AutoofficeModel::aopf()->aopf_autooffice_setSession('success', 'all', __('Success', 'autooffice'));
				wp_redirect('https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			} else {
				AutoofficeModel::aopf()->aopf_autooffice_setSession('error', 'all', __('Data not recorded', 'autooffice'));
				wp_redirect('https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			}
		} else {
			require_once(AOPF_AUTOOFFICE_DIR.'views/plugin_settings_page_js.php');
		}
	}
	
	/**
	 * resourceRegistration()
	 */
	public function resourceRegistration() 
	{
		wp_enqueue_style('aopf_plugin_css', plugins_url('assets/css/bootstrap.min.css', dirname(__FILE__)));
			
		if (empty(AOPF_DEBUG)) {
			wp_enqueue_style('aopf_plugin_css', plugins_url('assets/css/admin.css', dirname(__FILE__)));
		} else {
			wp_enqueue_style('aopf_plugin_css', plugins_url('assets/css/admin.min.css', dirname(__FILE__)));
		}

		wp_enqueue_script('aopf_plugin_js', plugins_url('assets/js/bootstrap.min.js', dirname(__FILE__)));

		if (!empty(AOPF_DEBUG)) {
			wp_enqueue_script('aopf_plugin_js', plugins_url('assets/js/admin.js', dirname(__FILE__)));
		} else {
			wp_enqueue_script('aopf_plugin_js', plugins_url('assets/js/admin.min.js', dirname(__FILE__)));
		}
	}
	
	/**
	 * install()
	 */
	public static function aopf_autooffice_install()
	{
		AutoofficeModel::aopf()->aopf_autooffice_create_table();
	}
	
	/**
	 * uninstall()
	 */
	public static function aopf_autooffice_uninstall()
	{
		AutoofficeModel::aopf()->aopf_autooffice_delete_table();
	}
	
	/**
	 * deactivation()
	 */
	public static function aopf_autooffice_deactivation()
	{
		AutoofficeModel::aopf()->aopf_autooffice_trincate_table();
	}
	
	/**
	 * model($className=__CLASS__)
	 */ 
	public static function aopf($className=__CLASS__)
	{
		return new $className();
	}
}

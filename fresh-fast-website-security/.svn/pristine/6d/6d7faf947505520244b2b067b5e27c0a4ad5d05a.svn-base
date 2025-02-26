<?php

/**
 * FFWSecurityPlugin
 *
 * @package FFWSecurityPluginAdmin
 * @author Ondrej7
 *        
 * @link http://www.freshfastwebsite.com/wordpress-security-plugin
 * @copyright 2014 Ondrej7
 *           
 *           
 */
class FFWSecurityPluginAdmin {

	const PAGE_MAIN = '-main';

	const PAGE_USERS = '-users';

	const PAGE_SETTINGS = '-settings';

	/**
	 *
	 * @var string
	 */
	protected $plugin_slug;

	/**
	 * Plugin admin URL
	 *
	 * @var string
	 */
	protected static $plugins_url;

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @var string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 *
	 * @var wpdb
	 */
	protected $wpdb;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 */
	private function __construct() {
		global $wpdb;
		$this->wpdb = $wpdb;
		
		/*
		 * Call $plugin_slug from public plugin class.
		 */
		$this->plugin_slug = FFWSecurityPlugin::getPluginSlug();
		
		// Load admin style sheet and JavaScript.
		add_action('admin_enqueue_scripts', array(
			$this,
			'enqueue_admin_styles' 
		));
		add_action('admin_enqueue_scripts', array(
			$this,
			'enqueue_admin_scripts' 
		));
		
		// Add the options page and menu item.
		add_action('admin_menu', array(
			$this,
			'add_plugin_admin_menu' 
		));
		
		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename(plugin_dir_path(realpath(dirname(__FILE__))) . $this->plugin_slug . '.php');
		add_filter('plugin_action_links_' . $plugin_basename, array(
			$this,
			'add_action_links' 
		));
		
		// FFW Security Dashboard Widget
		add_action('wp_dashboard_setup', array(
			'FFW_Security_Widget',
			'init' 
		));
	}

	public static function getAdminPluginUrl($path = '') {
		if (self::$plugins_url == NULL) {
			self::$plugins_url = plugins_url($path, __FILE__);
		}
		return self::$plugins_url;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function getInstance() {
		
		// admin class should only be available for super admins
		if (!is_super_admin()) {
			return;
		}
		
		// If the single instance hasn't been set, set it now.
		if (null == self::$instance) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}

	/**
	 * Register and enqueue admin-specific style sheet.
	 */
	public function enqueue_admin_styles() {
		/*
		 if (!isset($this->plugin_screen_hook_suffix)) {
		 return;
		 }
		 
		 $screen = get_current_screen();
		 if ($this->plugin_screen_hook_suffix == $screen->id) {
		 wp_enqueue_style($this->plugin_slug . '-admin-styles', plugins_url('assets/css/admin.css', __FILE__), array(), FFWSecurityPlugin::VERSION);
		 }
		 */
		wp_enqueue_style($this->plugin_slug . '-admin-styles', plugins_url('assets/css/admin.css', __FILE__), array(), FFWSecurityPlugin::VERSION);
	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 */
	public function enqueue_admin_scripts() {
		/*
		 if (!isset($this->plugin_screen_hook_suffix)) {
		 return;
		 }
		 
		 $screen = get_current_screen();
		 if ($this->plugin_screen_hook_suffix == $screen->id) {
		 wp_enqueue_script($this->plugin_slug . '-admin-script', plugins_url('assets/js/admin.js', __FILE__), array(
		 'jquery' 
		 ), FFWSecurityPlugin::VERSION);
		 }
		 */
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 */
	public function add_plugin_admin_menu() {
		
		// $this->plugin_screen_hook_suffix = add_options_page(__('Fresh Fast Website Security Plugin Settings', $this->plugin_slug), __('FFW Security Plugin', $this->plugin_slug), 'remove_users', $this->plugin_slug . self::PAGE_MAIN, array(
		add_menu_page(__('Fresh Fast Website Security - General Info', $this->plugin_slug), __('FFW Security', $this->plugin_slug), 'remove_users', $this->plugin_slug . self::PAGE_MAIN, array(
			$this,
			'display_plugin_admin_page' 
		));
		add_submenu_page('options-general.php', $page_title, $menu_title, $capability, $menu_slug, $function);
		
		//
		$beforeUsers = add_submenu_page($this->plugin_slug . self::PAGE_MAIN, __('Fresh Fast Website Security - Administrators', $this->plugin_slug), __('FFW Administrators', $this->plugin_slug), 'remove_users', $this->plugin_slug . self::PAGE_USERS, array(
			$this,
			'displayFFWSecurityUsers' 
		));
		// loads callback function which is called before previous function
		add_action('load-' . $beforeUsers, array(
			$this,
			'actionFFWSecurityUsers' 
		));
		
		/* If I want to put it into "Settings menu" of main WordPress menu
		 add_options_page(__('Fresh Fast Website Security - Settings', $this->plugin_slug), __('FFW - Settings', $this->plugin_slug), 'manage_options', $this->plugin_slug . self::PAGE_SETTINGS, array(
		 $this,
		 'displayFFWSecuritySettings' 
		 ));
		 */
		
		$beforeSettings = add_submenu_page($this->plugin_slug . self::PAGE_MAIN, __('Fresh Fast Website Security - Settings', $this->plugin_slug), __('FFW Settings', $this->plugin_slug), 'manage_options', $this->plugin_slug . self::PAGE_SETTINGS, array(
			$this,
			'displayFFWSecuritySettings' 
		));
		// loads callback function which is called before previous function
		add_action('load-' . $beforeSettings, array(
			$this,
			'actionFFWSecuritySettings' 
		));
		
		// renaming first submenu
		global $submenu;
		if (isset($submenu[$this->plugin_slug . self::PAGE_MAIN])) {
			$submenu[$this->plugin_slug . self::PAGE_MAIN][0][0] = __('Dashboard', $this->plugin_slug);
		}
	}

	public function actionFFWSecurityUsers() {
		if ($_REQUEST['action'] == 'save') {
			
			$this->wpdb->update($this->wpdb->users, array(
				'user_login' => $_REQUEST['login'],
				'user_nicename' => $_REQUEST['nicename'],
				'display_name' => $_REQUEST['displayname'] 
			), array(
				'ID' => $_REQUEST['id'] 
			), array(
				'%s',
				'%s',
				'%s' 
			), array(
				'%d' 
			));
			
			// FIXME: somewhere show message
			$redirectTo = FFWSecurityPlugin::getPageLink(self::PAGE_USERS, array(
				'message' => 'saved' 
			));
			wp_safe_redirect($redirectTo);
			exit();
		}
	}

	public function actionFFWSecuritySettings() {
		if ($_REQUEST['action'] == 'save') {
			
			FFWSecurityOptions::saveOptions();
			
			$redirectTo = FFWSecurityPlugin::getPageLink(self::PAGE_SETTINGS, array(
				'message' => 'saved' 
			));
			wp_safe_redirect($redirectTo);
			
			exit();
		}
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since 1.0.0
	 */
	public function display_plugin_admin_page() {
		$ffwSecurityTools = new FFW_Security_Tools();
		
		$users = $ffwSecurityTools->getAdministratorUsers();
		
		include_once ('views/admin.php');
	}

	public function displayFFWSecuritySettings() {
		$options = FFWSecurityOptions::getAllOptions();
		
		// form action
		$action = esc_url(FFWSecurityPlugin::getPageLink(self::PAGE_SETTINGS, array(
			'action' => 'save' 
		)));
		
		include_once ('views/admin-settings.php');
	}

	public function displayFFWSecurityUsers() {
		if ($_REQUEST['action'] == 'edit') {
			
			// FIXME: check if user with this ID is admin?
			if (!empty($_REQUEST['id'])) {
				$userId = $_REQUEST['id'];
			}
			else {
				// TODO: maybe better
				die('Not ID');
			}
			
			$sql = "
			SELECT
			u.ID,
			u.user_login,
				u.user_nicename,
				u.display_name
				FROM
			
				" . $this->wpdb->users . " u
				WHERE ID = '" . intval($userId) . "'
				";
			
			// $results = $wpdb->get_results($sql, OBJECT);
			$user = $this->wpdb->get_row($sql, OBJECT);
			$userId = $user->ID;
			$userName = $user->user_login;
			$userNiceName = $user->user_nicename;
			$userDisplayName = $user->display_name;
			
			// form action
			$action = esc_url(FFWSecurityPlugin::getPageLink(self::PAGE_USERS, array(
				'action' => 'save' 
			)));
			
			include_once ('views/users-edit.php');
		}
		else {
			
			$ffwSecurityTools = new FFW_Security_Tools();
			$users = $ffwSecurityTools->getAdministratorUsers();
			
			$pluginUrl = plugins_url('', __FILE__);
			
			$linkUrl = FFWSecurityPlugin::getPageLink(self::PAGE_USERS, array(
				'action' => 'edit' 
			));
			
			include_once ('views/users.php');
		}
	}

	/**
	 * Add settings action link to the plugins page.
	 */
	public function add_action_links($links) {
		$url = FFWSecurityPlugin::getPageLink(self::PAGE_SETTINGS);
		
		return array_merge(array(
			'settings' => '<a href="' . $url . '">' . __('Settings', $this->plugin_slug) . '</a>' 
		), $links);
	}
	
	/*
	 public function action_method_name() {
	 // @TODO: Define your action hook callback here
	 }
	 
	 
	 public function filter_method_name() {
	 // @TODO: Define your filter hook callback here
	 }
	 */
}

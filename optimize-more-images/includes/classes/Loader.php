<?php

if (!defined('WPINC')) {
    die;
}


class OPM_IMG_Loader {
    const CLASS_DIR = 'includes/classes/';
    const VIEW_DIR = 'view/';

    private $admin_core_class;
    private $settings_class;
    private $upgrade_class;

    private $admin_url;
	
	private $images_class;

    private static $_instance; //The single instance


    function __construct()
    {
        $this->loadClasses();
    }

    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    private function loadClasses()
    {
        $this->require_class('Messages');

        $this->require_class('Admin_Core');
        $this->admin_core_class = new OPM_IMG_Admin_Core();

        $this->require_class('Settings');
        $this->settings_class = new OPM_IMG_Settings();
				
		$this->require_class('Images');
        $this->images_class = new OPM_IMG_Images();
		
    }

    public function Admin_Core()
    {
        return $this->admin_core_class;
    }

    public function Settings()
    {
        return $this->settings_class;
    }
	
	public function Images()
    {
        return $this->images_class;
    }
	
		

    public function require_class($file = "")
    {
        return $this->required(self::CLASS_DIR . $file);
    }

    public function admin_url($view = 'settings')
    {
        return admin_url('admin.php?page=optimize-more-images&view=' . $view);
    }

    public function required($file = "")
    {
        $dir = OPM_IMG_DIR;

        if (empty($dir) || !is_dir($dir)) {
            return false;
        }

        $file = path_join($dir, $file . '.php');

        if (!file_exists($file)) {
            return false;
        }

        require_once $file;
    }

    public function get_view($file = "")
    {
        $this->required(self::VIEW_DIR . $file);
    }

    public function admin_view($file = "")
    {
        $this->get_view('admin/' . $file);
    }

    public function get_active_view()
    {
        $default = 'settings';

        if (!isset($_GET['view'])) {
            return $default;
        }

        $view = wp_filter_kses($_GET['view']);

        return ($view) ? $view : $default;

    }
}

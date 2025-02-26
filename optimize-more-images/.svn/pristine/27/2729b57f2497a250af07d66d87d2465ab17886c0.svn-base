<?php

if (!defined('WPINC')) {
    die;
}

class OPM_IMG_Settings {
    
    private $settings;

    function __construct()
    {
        $this->init_settings();
        add_action('init', array($this, 'init'));
        add_action('opm_img_after_body', array($this, 'add_import_html'));
    }

    public function init()
    {
        // check or initiate import
        $this->import();

        if (!isset($_GET['opm_img-action'])) {
            return;
        }

        // check or initiate reset
        $this->reset_plugin();

        // check or initiate export
        $this->export();

    }

    public function get($key = "", $default = false)
    {
        if (!isset($this->settings[$key])) {
            return $default;
        }

        $value = opm_img_removeslashes($this->settings[$key]);
        if (empty($value) || is_null($value)) {
            return false;
        }

        if (is_array($value) && count($value) == 0) {
            return false;
        }

        return $value;
    }

    public function reset()
    {
        $this->settings = array();
    }

    public function setAll($value)
    {
        $this->settings = $value;
    }

    public function getAll()
    {
        return $this->settings;
    }

    public function set($key, $value)
    {
        $this->settings[$key] = $value;
    }

    public function remove($key)
    {
        if (isset($this->settings[$key])) {
            unset($this->settings[$key]);
        }
    }

    public function save()
    {
        update_option("opm_img_options", $this->settings);
		
    }

    public function store()
    {
        do_action('opm_img_before_saving', $this);
        $this->reset();
        $this->set('version', OPM_IMG_VERSION);

        foreach ($this->keys() as $key) {
            $setting_value = '';
            if (isset($_POST[$key])) {
                $setting_value = opm_img_kses($_POST[$key]);
            }
            $this->set($key, $setting_value);
        }

        $placeholder = ''; // use the same method used by preview wizard
        do_action('opm_img_save_addtional_settings', $this, $placeholder);

        $this->save();

        do_action('opm_img_after_saving', $this);

        opm_img_Queue('Settings saved.');
        wp_redirect(opm_img()->admin_url());
        exit;
    }

    public function init_settings()
    {
        $settings = get_option("opm_img_options", false);

        if (!$settings) {
            $settings = $this->default_options();
        }

        $this->settings = $settings;
		
    }

    public function add_import_html()
    {
        opm_img()->admin_view('parts/import-settings');
    }

    public function import()
    {
        if (!isset($_POST['opm_img-settings_nonce'])) return;

        if (!is_admin() && !current_user_can('manage_options')) {
            return;
        }

        if (!isset($_POST['opm_img-settings']) && !isset($_FILES['import_file'])) {
            return;
        }

        if (!isset($_FILES['import_file'])) {
            return;
        }

        if ($_FILES['import_file']['size'] == 0 && $_FILES['import_file']['name'] == '') {
            return;
        }

        // check nonce
        if (!wp_verify_nonce($_POST['opm_img-settings_nonce'], 'opm_img-settings-action')) {

            opm_img_Queue('Sorry, your nonce did not verify.', 'error');
            wp_redirect(opm_img()->admin_url());
            exit;
        }

        $import_field = 'import_file';
        $temp_file_raw = $_FILES[$import_field]['tmp_name'];
        $temp_file = esc_attr($temp_file_raw);
        $arr_file_type = $_FILES[$import_field];
        $uploaded_file_type = $arr_file_type['type'];
        $allowed_file_types = array('application/json');


        if (!in_array($uploaded_file_type, $allowed_file_types)) {
            opm_img_Queue('Upload a valid .json file.', 'error');
            wp_redirect(opm_img()->admin_url());
            exit;
        }

        $settings = (array)json_decode(
            file_get_contents($temp_file),
            true
        );

        unlink($temp_file);

        if (!$settings) {

            opm_img_Queue('Nothing to import, please check your json file format.', 'error');
            wp_redirect(opm_img()->admin_url());
            exit;

        }

        $this->setAll($settings);
        $this->save();

        opm_img_Queue('Your Import has been completed.');

        wp_redirect(opm_img()->admin_url());
        exit;
    }


    public function export()
    {
        if (!isset($_GET['opm_img-action']) || (isset($_GET['opm_img-action']) && $_GET['opm_img-action'] != 'export')) {
            return;
        }

        $settings = $this->getAll();

        if (!is_array($settings)) {
            $settings = array();
        }

        $settings = json_encode($settings);
		
		$site_name = get_bloginfo('name');

        header('Content-disposition: attachment; filename=opm-img_'.$site_name.'_settings.json');
        header('Content-type: application/json');
        print $settings;
        exit;
    }

    public function reset_plugin()
    {
        global $wpdb;

        if ($_GET['opm_img-action'] != 'reset') {
            return;
        }

        delete_option("opm_img_options");
        $wpdb->get_results($wpdb->prepare("DELETE FROM $wpdb->options WHERE option_name LIKE %s", 'opm_img_o_%'));

        opm_img_Queue('Settings reset.');
        wp_redirect(opm_img()->admin_url());
        exit;
    }

    public function keys()
    {
        return array_keys($this->default_options());
    }

    public function get_default_option($key)
    {
        $settings = $this->default_options();
        return isset($settings[$key]) ? $settings[$key] : null;
    }

    public function default_options()
    {

        $settings = array(
	        
			// images - lazyload
			'enable_lazyload' => false,
			'enable_lazyload_images' => false,
			'enable_lazyload_backgrounds' => false,
			'enable_lazyload_iframes' => false,
			'enable_lazyload_videos' => false,
			'lazyload_exclude_list' => '',
			'use_noscript' => false,
			'add_loading_eager' => false,
			
			// images - lazyload bg imgs
			'enable_lazy_css_bg_img' => false,
			'lazy_css_bg_img_include_list' => '',
			
			// lazy size config
			'lazysizes_extra_config' => '',
			
			// images - cdn
			'use_img_cdn' => false,
			'img_cdn_url' => '',
			'img_cdn_exclude_list' => '',
			'img_cdn_quality' => false,
			'img_cdn_compression_quality' => '',
			
			// images - dimensions
			'add_img_attr' => false,
			'img_attr_width' => '',
			'img_attr_height' => '',
			
			// images - preload
			'enable_preload_featured_imgs' => false,
			'preload_featured_img_front_page' => false,
			'preload_featured_img_pages' => false,
			'preload_featured_img_single_post' => false,
			'preload_featured_img_blog_archive' => false,
			'preload_featured_img_product_pages' => false,
			'preload_featured_img_shop_page' => false,
			'preload_featured_img_product_category_pages' => false
			
			
        );
        
        return apply_filters('opm_img_setting_fields', $settings);
    }
}
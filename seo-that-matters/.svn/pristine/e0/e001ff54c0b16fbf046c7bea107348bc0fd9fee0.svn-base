<?php

namespace SeoThatMatters;
use function SeoThatMatters\plugin_queue;
use WP_Sitemaps_Posts;

if (!defined('WPINC')) { die; }

class PluginSettings {
    
    private $settings;

    function __construct() {
        $this->init_settings();
        add_action('init', array($this, 'init'));
        add_action(SEOTM_PREFIX . '_after_body', array($this, 'add_import_html'));
    }

    public function init() {
        
        // check or initiate import
        $this->import();

        if (!isset($_GET[SEOTM_PREFIX . '-action'])) {
            return;
        }

        // check or initiate reset
        $this->reset_plugin();

        // check or initiate export
        $this->export();

    }

    public function get($key = "", $default = false) {
        
        $value = isset($this->settings[$key]) ? plugin_removeslashes($this->settings[$key]) : $default;
    
        if (empty($value) || is_null($value)) {
            return false;
        }
    
        if (is_array($value) && count($value) == 0) {
            return false;
        }
    
        return $value;
    }

    public function reset() {
        $this->settings = array();
    }

    public function setAll($value) {
        $this->settings = $value;
    }

    public function getAll() {
        return $this->settings;
    }

    public function set($key, $value) {
        $this->settings[$key] = $value;
    }

    public function remove($key) {
        if (isset($this->settings[$key])) {
            unset($this->settings[$key]);
        }
    }

    public function save() {
        update_option(SEOTM_PREFIX . "_options", $this->settings);
        flush_rewrite_rules(); // flush permalinks
    }

    public function store() {
        do_action(SEOTM_PREFIX . '_before_saving', $this);
        $this->reset();
        $this->set('version', SEOTM_VERSION);
        
        foreach ($this->keys() as $key) {
            $setting_value = '';
            if (isset($_POST[$key])) {
                $setting_value = plugin_kses($_POST[$key]);
            }
            $this->set($key, $setting_value);
        }

        $placeholder = '';
        do_action(SEOTM_PREFIX . '_save_addtional_settings', $this, $placeholder);

        $this->save();

        do_action(SEOTM_PREFIX . '_after_saving', $this);

        plugin_queue('Settings saved.');
        wp_redirect(plugin_instance()->admin_url());
        exit;
    }

    public function init_settings() {
        $settings = get_option(SEOTM_PREFIX . "_options", false);

        if (!$settings) {
            $settings = $this->default_options();
        }
	
    	$settings = is_array($settings) ? $settings : array("settings" => $settings);

        $this->settings = $settings;
		
    }

    public function add_import_html() {
        plugin_instance()->admin_view('parts/import');
    }

    public function import() {
        
        if (!isset($_POST[SEOTM_PREFIX . '_settings_nonce'])) return;

        if (!is_admin() && !current_user_can('manage_options')) {
            return;
        }

        if (!isset($_POST[SEOTM_PREFIX . '-settings']) && !isset($_FILES['import_file'])) {
            return;
        }

        if (!isset($_FILES['import_file'])) {
            return;
        }

        if ($_FILES['import_file']['size'] == 0 && $_FILES['import_file']['name'] == '') {
            return;
        }

        // check nonce
        if (!wp_verify_nonce($_POST[SEOTM_PREFIX . '_settings_nonce'], SEOTM_PREFIX . '-settings-action')) {

           plugin_queue('Sorry, your nonce did not verify.', 'error');
            wp_redirect(plugin_instance()->admin_url());
            exit;
        }

        $import_field = 'import_file';
        $temp_file_raw = $_FILES[$import_field]['tmp_name'];
        $temp_file = esc_attr($temp_file_raw);
        $arr_file_type = $_FILES[$import_field];
        $uploaded_file_type = $arr_file_type['type'];
        $allowed_file_types = array('application/json');


        if (!in_array($uploaded_file_type, $allowed_file_types)) {
            plugin_queue('Upload a valid .json file.', 'error');
            wp_redirect(plugin_instance()->admin_url());
            exit;
        }

        $settings = (array)json_decode(
            file_get_contents($temp_file),
            true
        );

        unlink($temp_file);

        if (!$settings) {

            plugin_queue('Nothing to import, please check your json file format.', 'error');
            wp_redirect(plugin_instance()->admin_url());
            exit;

        }

        $this->setAll($settings);
        $this->save();

        plugin_queue('Your Import has been completed.');

        wp_redirect(plugin_instance()->admin_url());
        exit;
    }


    public function export() {
        if (!isset($_GET[SEOTM_PREFIX . '-action']) || (isset($_GET[SEOTM_PREFIX . '-action']) && $_GET[SEOTM_PREFIX . '-action'] != 'export')) {
            return;
        }

        $settings = $this->getAll();

        if (!is_array($settings)) {
            $settings = array();
        }

        $settings = json_encode($settings);
		
		$site_name = get_bloginfo('url');
		$site_name = preg_replace('#^https?://#i', '', $site_name);

        header('Content-disposition: attachment; filename=' . SEOTM_PREFIX . '_' . $site_name . '-settings_' . date_i18n( 'd-m-Y' ) . '.json');
        header('Content-type: application/json');
        print $settings;
        exit;
    }

    public function reset_plugin() {
        global $wpdb;

        if ($_GET[SEOTM_PREFIX . '-action'] != 'reset') {
            return;
        }

        delete_option(SEOTM_PREFIX . "_options");
        $wpdb->get_results($wpdb->prepare("DELETE FROM $wpdb->options WHERE option_name LIKE %s", SEOTM_PREFIX . '_o_%'));

        plugin_queue('Settings reset.');
		
        wp_redirect(plugin_instance()->admin_url());
        exit;
    }

    public function keys() {
        return array_keys($this->default_options());
    }

    public function get_default_option($key) {
        $settings = $this->default_options();
        return isset($settings[$key]) ? $settings[$key] : null;
    }

    public function default_options() {

        $settings = array(
	        
			// meta
			'seotm_use_seo_meta' => false,
			'seotm_use_social_meta' => false,
			'seotm_default_fb_img' => '',
			'seotm_default_twitter_img' => '',
			'seotm_use_custom_title' => false,
			
			// schema markup
			'seotm_use_markup_organization' => false,
			'seotm_use_markup_organization_org_type' => '',
			'seotm_use_markup_organization_name' => '',
			'seotm_use_markup_organization_altname' => '',
			'seotm_use_markup_organization_ophone' => '',
			'seotm_use_markup_organization_address' => '',
			'seotm_use_markup_organization_locality' => '',
			'seotm_use_markup_organization_region' => '',
			'seotm_use_markup_organization_postcode' => '',
			'seotm_use_markup_organization_aphone' => '',
			'seotm_use_markup_organization_country' => '',
			'seotm_use_markup_organization_social' => '',
			'seotm_use_markup_organization_logo' => '',
			'seotm_use_markup_organization_image' => '',
			'seotm_use_markup_organization_description' => '',
			'seotm_use_markup_organization_extra' => '',
			
			'seotm_use_markup_local_business' => false,
            'seotm_use_markup_local_business_type' => '',
            'seotm_use_markup_local_business_name' => '',
            'seotm_use_markup_local_business_phone' => '',
            'seotm_use_markup_local_business_image' => '',
            'seotm_use_markup_local_business_description' => '',
            'seotm_use_markup_local_business_address' => '',
            'seotm_use_markup_local_business_locality' => '',
            'seotm_use_markup_local_business_region' => '',
            'seotm_use_markup_local_business_postcode' => '',
            'seotm_use_markup_local_business_country' => '',
            'seotm_use_markup_local_business_geo_latitude' => '',
            'seotm_use_markup_local_business_geo_longitude' => '',
            'seotm_use_markup_local_business_price' => '',
            'seotm_use_markup_local_business_opening_hours' => '',
            'seotm_use_markup_local_business_social' => '',
            'seotm_use_markup_local_business_extra' => '',
			
			'seotm_use_markup_articles' => false,
			'seotm_use_markup_articles_type' => '',
			'seotm_use_markup_articles_author' => '',
			
			'seotm_use_markup_sitelink_search_box' => false,
			'seotm_use_markup_breadcrumbs' => false,
			'seotm_use_markup_custom_json' => false,
			'seotm_use_schema_offer_shop' => false,
			
			// sitemap
			'seotm_use_sitemap' => false,
			'seotm_use_sitemap_custom_url' => '',
			'seotm_use_sitemap_exclude_list' => '',
			'seotm_use_sitemap_ping_search_engines' => false,
			
			'remove_provider_users' => false,
			'seotm_use_sitemap_add_last_mod' => false,
			'seotm_use_sitemap_add_media' => false,
			
			'seotm_use_sitemap_images' => false,
			'seotm_use_sitemap_images_custom_url' => '',
			'seotm_use_sitemap_images_exclude_list' => '',
			'seotm_use_sitemap_images_ping_search_engines' => false,
			
			// robots.txt
			'seotm_use_robots' => false,
			'seotm_use_robots_content' => '',
			
			// miscellaneous
			'seotm_use_img_alt_text' => false,
			'seotm_use_x_default' => false,
			'seotm_disable_feeds' => false,
			
			
        );
        
        $post_types = get_post_types(array('public' => true));
        foreach ($post_types as $post_type) {
            $option_name = 'remove_sitemap_posts_' . $post_type;
            $settings[$option_name] = ''; // Set the default value to false
        }
        
        $taxonomies = get_taxonomies( array( 'public' => true )); 
        foreach ($taxonomies as $taxonomy) {
            $option_name = 'remove_sitemap_taxonomies_' . $taxonomy;
            $settings[$option_name] = ''; // Set the default value to false
        }
        
        return apply_filters(SEOTM_PREFIX . '_setting_fields', $settings);
    }
}
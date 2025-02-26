<?php

/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_CAPTCHA
 * @subpackage APOYL_CAPTCHA/admin
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Captcha_Admin
{

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/admin.css', array(), $this->version, 'all');
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/admin.js', array(
            'jquery'
        ), $this->version, false);
    }

    public function links($alinks)
    {
        $links[] = '<a href="' . esc_url(get_admin_url(null, 'options-general.php?page=apoyl-captcha-settings')) . '">' . __('settingsname', 'apoyl-captcha') . '</a>';
        $alinks = array_merge($links, $alinks);
        
        return $alinks;
    }

    public function menu()
    {
        add_options_page(__('settings', 'apoyl-captcha'), __('settings', 'apoyl-captcha'), 'manage_options', 'apoyl-captcha-settings', array(
            $this,
            'settings_page'
        ));
    }
	public function settings_page() {
		global $wpdb;
		$options_name = 'apoyl-captcha-settings';
		require_once plugin_dir_path ( __FILE__ ) . 'partials/setting.php';
	}



}

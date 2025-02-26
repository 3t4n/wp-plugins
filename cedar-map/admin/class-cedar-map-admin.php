<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       sina-abadi-uri
 * @since      1.0.0
 *
 * @package    Cedar_Map
 * @subpackage Cedar_Map/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cedar_Map
 * @subpackage Cedar_Map/admin
 * @author     Sina <sina_abadi@hotmail.com>
 */
class Cedar_Map_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;


    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Cedar_Map_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Cedar_Map_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/cedar-map-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Cedar_Map_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Cedar_Map_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_media();
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/cedar-map-admin.js', array('jquery', 'media-upload'), $this->version, false);
        wp_enqueue_style($this->plugin_name . 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array(), $this->version, 'all');

    }

    public function add_plugin_admin_menu()
    {
        add_options_page('تنظیمات سیدارمپ', 'CedarMaps', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
    }

    public function add_action_links($links)
    {
        $settings_link = array(
            '<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge($settings_link, $links);
    }

    public function display_plugin_setup_page()
    {
        include_once('partials/cedar-map-admin-display.php');
    }

    public static function convertToPersian($string)
    {
        $persianNumbers = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabicNumbers = array('٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠');

        $num = range(0, 9);
        $convertedPersianNumbers = str_replace($persianNumbers, $num, $string);
        $englishNumbers = str_replace($arabicNumbers, $num, $convertedPersianNumbers);
        return $englishNumbers;
    }

    public function validate($input)
    {
        $valid = array();
        if (!isset($input['api_key']) || empty($input['api_key'])) {
            add_settings_error(
                'api_key',
                'api_key',
                'Please enter valid API key',
                'error'
            );
        }

        if (empty($input['center_lat'])) {
            add_settings_error(
                'center_lat',
                'center_lat',
                'Please enter valid center latitude',
                'error'
            );
        }

        if (empty($input['center_lng'])) {
            add_settings_error(
                'center_lng',
                'center_lng',
                'Please enter valid center longitude',
                'error'
            );
        }

        $valid['markers'] = array();
        $inputMarkers = !empty($input['markers']) ? $input['markers'] : array();
        foreach ($inputMarkers as $marker) {
            if (empty($marker['popup_name']) || !is_numeric($marker['lat']) || !is_numeric($marker['lng'])) continue;
            $valid['markers'][] = $marker;

        }

        $valid['height'] = self::convertToPersian(trim($input['height']));
        $valid['width'] = self::convertToPersian(trim($input['width']));
        $valid['api_key'] = self::convertToPersian(trim($input['api_key']));
        $valid['zoom'] = self::convertToPersian(intval($input['zoom']));
        $valid['min_zoom'] = self::convertToPersian(intval($input['min_zoom']));
        $valid['max_zoom'] = self::convertToPersian(intval($input['max_zoom']));
        $valid['center_lng'] = self::convertToPersian(floatval($input['center_lng']));
        $valid['center_lat'] = self::convertToPersian(floatval($input['center_lat']));
        $valid['scroll_wheel_zoom'] = self::convertToPersian((isset($input['scroll_wheel_zoom']) && !empty($input['scroll_wheel_zoom'])));
        return $valid;
    }

    public function options_update()
    {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
    }


}

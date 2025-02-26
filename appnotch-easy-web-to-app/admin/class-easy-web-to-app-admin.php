<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://easywebtoapp.com/
 * @since      1.0.0
 *
 * @package    Easy_Web_To_App
 * @subpackage Easy_Web_To_App/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Easy_Web_To_App
 * @subpackage Easy_Web_To_App/admin
 * @author     Muthukumaran P <muthukumaran.palanivel@outlook.com>
 */
class Easy_Web_To_App_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * The options name to be used in this plugin
     *
     * @since      1.0.0
     * @access     private
     * @var      string         $option_name     Option name of this plugin
     */
    private $option_name = 'easy_web_to_app';

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

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
         * defined in Easy_Web_To_App_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Easy_Web_To_App_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/easy-web-to-app-admin.css', array(), $this->version, 'all');

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
         * defined in Easy_Web_To_App_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Easy_Web_To_App_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/easy-web-to-app-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * Add an options page under the Settings submenu
     *
     * @since  1.0.0
     */
    public function add_options_page()
    {

        $this->plugin_screen_hook_suffix = add_options_page(
            __('Easy Web To App Settings', 'easy-web-to-app'),
            __('Easy Web To App', 'easy-web-to-app'),
            'manage_options',
            $this->plugin_name,
            array($this, 'display_options_page')
        );

    }

    /**
     * Render the options page for plugin
     *
     * @since  1.0.0
     */
    public function display_options_page()
    {
        include_once 'partials/easy-web-to-app-admin-display.php';
    }

    public function register_setting()
    {
        
        
        

        add_settings_field(
            $this->option_name . '_appname',
            __('App Name', 'easy-web-to-app'),
            array($this, $this->option_name . '_appname_cb'),
            $this->plugin_name,
            $this->option_name . '_general',
            array('label_for' => $this->option_name . '_appname')
        );
        
        add_settings_field(
            $this->option_name . '_email',
            __('Admin Email', 'easy-web-to-app'),
            array($this, $this->option_name . '_email_cb'),
            $this->plugin_name,
            $this->option_name . '_general',
            array('label_for' => $this->option_name . '_email')
        );

        add_settings_field(
            $this->option_name . '_url',
            __('Site URL', 'easy-web-to-app'),
            array($this, $this->option_name . '_url_cb'),
            $this->plugin_name,
            $this->option_name . '_general',
            array('label_for' => $this->option_name . '_url')
        );
        
        add_settings_field(
            $this->option_name . '_appfirsttime',
            '',
            array($this, $this->option_name . '_appfirsttime_cb'),
            $this->plugin_name,
            $this->option_name . '_general',
            ''
        );
        
        // Add a General section
        add_settings_section(
            $this->option_name . '_general',
            __('General', 'easy-web-to-app'),
            array($this, $this->option_name . '_general_cb'),
            $this->plugin_name
        );
        
        register_setting($this->plugin_name, $this->option_name . '_appname', array($this, $this->option_name . '_sanitize_email'));

         register_setting($this->plugin_name, $this->option_name . '_email', array($this, $this->option_name . '_sanitize_email'));

         register_setting($this->plugin_name, $this->option_name . '_url', array($this, $this->option_name . '_sanitize_url'));
         
         register_setting($this->plugin_name, $this->option_name . '_appfirsttime', array($this, $this->option_name . '_sanitize_appfirsttime'));

         register_setting($this->plugin_name, '', array($this, $this->option_name . '_sample_callback'));
    }
    
    /**
     * Sanitize the text position value before being saved to database
     *
     * @param  string $position $_POST value
     * @since  1.0.0
     * @return string           Sanitized value
     */
    public function easy_web_to_app_sanitize_appfirsttime($appfirsttime)
    {
        return sanitize_text_field($appfirsttime);
    }

    /**
     * Sanitize the text position value before being saved to database
     *
     * @param  string $position $_POST value
     * @since  1.0.0
     * @return string           Sanitized value
     */
    public function easy_web_to_app_sanitize_url($url)
    {
        //api call here
        return sanitize_text_field($url);
    }

    /**
     * Sanitize the text position value before being saved to database
     *
     * @param  string $position $_POST value
     * @since  1.0.0
     * @return string           Sanitized value
     */
    public function easy_web_to_app_sanitize_email($email)
    {
        return sanitize_text_field($email);
    }

    
   /**
 * Render the radio input field for position option
 *
 * @since  1.0.0
 */
    public function easy_web_to_app_appname_cb()
    {
        $general_sett = get_option($this->option_name . '_appfirsttime','');
        $disabled='';
        if($general_sett == "easywebtoapp"){
            $disabled='readonly=readonly';
        }
        $appname = get_option($this->option_name . '_appname',get_option('blogname'));

        echo '<input style="width:500px;" type="text" '.$disabled.' name="' . $this->option_name . '_appname' . '" id="' . $this->option_name . '_appname' . '" value="' . $appname . '" />';

    }
/**
 * Render the radio input field for position option
 *
 * @since  1.0.0
 */
    public function easy_web_to_app_email_cb()
    {
        $general_sett = get_option($this->option_name . '_appfirsttime','');
        $disabled='';
        if($general_sett == "easywebtoapp"){
            $disabled='readonly=readonly';
        }
        
        $email = get_option($this->option_name . '_email',get_option('admin_email'));

        echo '<input style="width:500px;" type="email" '.$disabled.' name="' . $this->option_name . '_email' . '" id="' . $this->option_name . '_email' . '" value="' . $email . '" />';

    }

    /**
     * Render the radio input field for position option
     *
     * @since  1.0.0
     */
    public function easy_web_to_app_url_cb()
    {
        $general_sett = get_option($this->option_name . '_appfirsttime','');
        $disabled='';
        if($general_sett == "easywebtoapp"){
            $disabled='readonly=readonly';
        }
        
        $url = get_option($this->option_name . '_url',get_option('siteurl'));

        echo '<input style="width:500px;" type="url" '.$disabled.' name="' . $this->option_name . '_url' . '" id="' . $this->option_name . '_url' . '" value="' . $url . '"> ';

    }
/**
     * Render the text for the general section
     *
     * @since  1.0.0
     */
    public function easy_web_to_app_general_cb()
    {
       
        
        
       
    }
     /**
     * Render the text for the general section
     *
     * @since  1.0.0
     */
    public function easy_web_to_app_appfirsttime_cb()
    {
        $general_sett = get_option($this->option_name . '_appfirsttime','');
        
        if ($general_sett == "easywebtoapp") {
            $app_name=get_option($this->option_name . '_appname',get_option('blogname'));
            $app_email=get_option($this->option_name . '_email',get_option('admin_email'));
            $blog_url = get_option($this->option_name . '_url',get_option('siteurl'));
            $general_sett = get_option($this->option_name . '_appfirsttime','');
            $app_url='http://www.appnotch.com/partner/wordpress/home/?email='.$app_email.'&url='.$blog_url.'&appname='.$app_name;
            echo '<a href="'.$app_url.'">Create Your App</a>';
        }
        else
        {
           $general_sett = "easywebtoapp";
           echo '<input type="hidden" name="' . $this->option_name . '_appfirsttime' . '" id="' . $this->option_name . '_appfirsttime' . '" value="' . $general_sett . '" />';
        }
        
    }
}

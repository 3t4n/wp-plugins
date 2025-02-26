<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @since      1.0.0
 * @package    ADSMANIA
 * @subpackage adsmania/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @since      1.0.0
 * @package    ADSMANIA
 * @subpackage adsmania/admin
 * @author     Abu Bakr Soliman <bakrianoo@gmail.com>
 */
class ADSMANIA_settings {
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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
        public function __construct($plugin_name, $version) {
            $this->plugin_name = $plugin_name;
            $this->version = $version;
            
            $this->set_potions();
        }
        
        /**
	 * Register the setting page.
	 *
	 * @since    1.0.0
	 */
        function register_settings_page($wp) {
            $wp->add_setting( 'header_textcolor' , array(
                'default'     => '#000000',
                'transport'   => 'refresh',
            ) );
        }
        
        /**
	 * Register the setting options and the dafault values.
	 *
	 * @since    1.0.0
	 */
        public function set_potions() {
            // create options and set dafault values
            add_option('ads_sett_ic_bg','#000');
            add_option('ads_sett_ic_close','3');
            add_option('ads_sett_i_ads','ads_start_at');
            add_option('ads_sett_c_max_ads','3');
            add_option('ads_sett_c_ads','rand');
            add_option('ads_sett_user_cont_msg',__('You must register to view this content',$this->plugin_name));
            add_option('ads_sett_click_cont_msg',__('Click here to view this content',$this->plugin_name));
        }
        
        /**
	 * Add the ads setting page to the (Settings) menu.
	 *
	 * @since    1.0.0
	 */
        function ads_settings_menu() {
            add_options_page(
               'Ads Settings',__("Ads",$this->plugin_name),'manage_options',"{$this->plugin_name}_settings",function(){
                   // load the settings HTML template
                    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/ads_post_settings.php';
               }
            );
            
                    // add the first section
                    add_settings_section(
                    "{$this->plugin_name}_settings_section_1",
                    __("Intro Ads",$this->plugin_name),
                    function(){},
                    "{$this->plugin_name}_settings"
                    );

                    // add the second section
                    add_settings_section(
                    "{$this->plugin_name}_settings_section_2",
                    __("Articles Ads",$this->plugin_name),
                    function(){},
                    "{$this->plugin_name}_settings"
                    );

                    // add the third section
                    add_settings_section(
                    "{$this->plugin_name}_settings_section_3",
                    __("Short codes",$this->plugin_name),
                    function(){},
                    "{$this->plugin_name}_settings"
                    );
        }
        
        /**
	 * register the options and generate the html input from code.
	 *
	 * @since    1.0.0
	 */
        function ads_settings_init() {
           
            $this->add_setting_field('ads_sett_ic_bg', __('Background',$this->plugin_name),"1");
            $this->add_setting_field('ads_sett_ic_close', __('Show close icon after (seconds)',$this->plugin_name),"1");
            $this->add_setting_field('ads_sett_i_ads', __('Select Ads',$this->plugin_name),"1");
            $this->add_setting_field('ads_sett_c_max_ads', __('Maximum ads per article',$this->plugin_name),"2");
            $this->add_setting_field('ads_sett_c_ads', __('Select Ads',$this->plugin_name),"2");
            $this->add_setting_field('ads_sett_user_cont_msg', __('User Content Message',$this->plugin_name),"3");
            $this->add_setting_field('ads_sett_click_cont_msg', __('Click To view Message',$this->plugin_name),"3");
           
           // register these fields with our settings group.
           $this->register_setting_group(array(
               'ads_sett_ic_bg',
               'ads_sett_ic_close',
               'ads_sett_i_ads',
               'ads_sett_c_max_ads',
               'ads_sett_c_ads',
               'ads_sett_user_cont_msg',
               'ads_sett_click_cont_msg'
           ));
        }
        
        /**
	 * Register the setting groups.
	 *
	 * @since    1.0.0
	 */
        public function register_setting_group($groups) {
            foreach($groups as $group) {
                register_setting( "{$this->plugin_name}_settings_group", $group );
            }
        }
        
        /**
	 * Add the setting fields to the sctions and generate the HTML from codes.
	 *
	 * @since    1.0.0
	 */
        public function add_setting_field($id, $name, $section) {            
            switch($id) {
                case "ads_sett_ic_bg":
                    add_settings_field($id, $name, function(){
                        echo "<input class='form-control' type='text' value='".get_option('ads_sett_ic_bg','#000')."' name='ads_sett_ic_bg' id='ads_sett_ic_bg' />";
                    }, "{$this->plugin_name}_settings","{$this->plugin_name}_settings_section_$section");
                    
                    break;
                
                case "ads_sett_ic_close":
                    add_settings_field($id, $name, function(){
                        echo "<input class='form-control' type='text' value='".get_option('ads_sett_ic_close','3')."' name='ads_sett_ic_close' id='ads_sett_ic_close' />";
                    }, "{$this->plugin_name}_settings","{$this->plugin_name}_settings_section_$section");
                    
                    break;
                case "ads_sett_i_ads":
                    add_settings_field($id, $name, function(){
                            echo "<select class='form-control' name='ads_sett_i_ads' id='ads_sett_i_ads'>
                                <option value='ads_start_at'>Last</option>
                                <option value='rand'>Random</option></select>";
                    }, "{$this->plugin_name}_settings","{$this->plugin_name}_settings_section_$section");
                    break;
                
                case "ads_sett_c_max_ads":
                    add_settings_field($id, $name, function(){
                        echo "<input class='form-control' type='text' value='".get_option('ads_sett_c_max_ads','3')."' name='ads_sett_c_max_ads' id='ads_sett_c_max_ads' />";
                    }, "{$this->plugin_name}_settings","{$this->plugin_name}_settings_section_$section");
                    
                    break;
                case "ads_sett_c_ads": 
                    add_settings_field($id, $name, function(){
                        echo "<select class='form-control' name='ads_sett_c_ads' id='ads_sett_c_ads'>
                                <option value='ads_start_at'>Last</option>
                                <option value='rand'>Random</option></select>";
                    }, "{$this->plugin_name}_settings","{$this->plugin_name}_settings_section_$section");
                    
                    break;
                case "ads_sett_user_cont_msg": 
                    add_settings_field($id, $name, function(){
                        echo "<input class='form-control' type='text' value='".get_option('ads_sett_user_cont_msg','You must register to view this content')."' name='ads_sett_user_cont_msg' id='ads_sett_user_cont_msg' />";
                    }, "{$this->plugin_name}_settings","{$this->plugin_name}_settings_section_$section");
                    
                    break;
                case "ads_sett_click_cont_msg": 
                    add_settings_field($id, $name, function(){
                        echo "<input class='form-control' type='text' value='".get_option('ads_sett_click_cont_msg','C   lick here to view this content')."' name='ads_sett_click_cont_msg' id='ads_sett_click_cont_msg' />";
                    }, "{$this->plugin_name}_settings","{$this->plugin_name}_settings_section_$section");
                    break;
            }
        }
}


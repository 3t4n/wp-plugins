<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.2803media.fr/
 * @since      1.0.0
 *
 * @package    Wp_Scsb
 * @subpackage Wp_Scsb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Scsb
 * @subpackage Wp_Scsb/admin
 * @author     2803 MEDIA <henri@2803media.fr>
 */
class Wp_Scsb_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Scsb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Scsb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-scsb-admin.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), '4.5.0', 'all' );
		//wp_enqueue_style( 'jquery-ui.min', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.min.css', array(), '1.11.4' );
		wp_enqueue_style( 'morris-0.4.1.min', plugin_dir_url( __FILE__ ) . 'css/morris-0.4.1.min.css', array(), '0.4.1' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Scsb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Scsb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-scsb-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_script( 'morris-0.5.1.min', plugin_dir_url( __FILE__ ) . 'js/morris-0.5.1.min.js', array( 'jquery' ), '0.5.1' );
		wp_enqueue_script( 'raphael-min', plugin_dir_url( __FILE__ ) . 'js/raphael-min.js', array( 'jquery' ), '2.1.4' );
	}
    
    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        //add_options_page( 'Simple social sharing button setting', 'Simple social sharing buttons', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
		
		add_menu_page('Simple social sharing button', 'Simple social sharing button', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
		
		//add_submenu_page($this->plugin_name, 'Statistics', 'Statistics', 'manage_options', $this->plugin_name.'-stats', array($this, 'display_plugin_stats_page'));
   		
		
    }

     /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */

    public function add_action_links( $links ) {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
       $settings_link = array(
        '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
       );
       return array_merge(  $settings_link, $links );

    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    public function display_plugin_setup_page() {
        include_once( 'partials/wp-scsb-admin-display.php' );
    }
    
	public function display_plugin_stats_page() {
        include_once( 'partials/wp-scsb-stats-display.php' );
    }
    
    public function validate($input) {
        // All checkboxes inputs        
        $valid = array();

        //Cleanup
        $valid['network']['facebook'] = (isset($input['facebook']) && !empty($input['facebook'])) ? 1 : 0;
        $valid['network']['twitter'] = (isset($input['twitter']) && !empty($input['twitter'])) ? 1 : 0;
        $valid['network']['linkedin'] = (isset($input['linkedin']) && !empty($input['linkedin'])) ? 1 : 0;
        $valid['network']['google-plus'] = (isset($input['google-plus']) && !empty($input['google-plus'])) ? 1 : 0;
        $valid['network']['pinterest'] = (isset($input['pinterest']) && !empty($input['pinterest'])) ? 1 : 0;
        $valid['network']['whatsapp'] = (isset($input['whatsapp']) && !empty($input['whatsapp'])) ? 1 : 0;
        
        $valid['name']['facebook'] = $input['name_facebook'];
        $valid['name']['twitter'] = $input['name_twitter'];
        $valid['name']['linkedin'] = $input['name_linkedin'];
        $valid['name']['google-plus'] = $input['name_googleplus'];
        $valid['name']['pinterest'] = $input['name_pinterest'];
        $valid['name']['whatsapp'] = $input['name_whatsapp'];
        
        $valid['twitter']['username'] = $input['twitter_username'];
        $valid['text_before_buttons'] = $input['text_before_buttons'];
        $valid['display_counter'] = (isset($input['display_counter']) && !empty($input['display_counter'])) ? 1 : 0;
		$valid['display_counter_total'] = (isset($input['display_counter_total']) && !empty($input['display_counter_total'])) ? 1 : 0;
		$valid['display_counter_total_text'] = $input['display_counter_total_text'];
        $valid['count_number_format'] = $input['count_number_format'];
        $valid['update_counter_minutes'] = $input['update_counter_minutes'];
        
		$valid['sort'] = $input['sort_social_network'];
        
		$valid['scsb_forme'] = $input['scsb_forme'];
        $valid['scsb_round'] = $input['scsb_round'];
        $valid['scsb_size'] = $input['scsb_size'];
        $valid['scsb_icon'] = $input['scsb_icon'];
        $valid['scsb_background'] = $input['scsb_background'];
        $valid['scsb_hover'] = $input['scsb_hover'];
        
		$valid['location']['before'] = (isset($input['before']) && !empty($input['before'])) ? 1 : 0;
        $valid['location']['after'] = (isset($input['after']) && !empty($input['after'])) ? 1 : 0;
        
		$valid['where']['post'] = (isset($input['post']) && !empty($input['post'])) ? 1 : 0;
        $valid['where']['page'] = (isset($input['page']) && !empty($input['page'])) ? 1 : 0;
        $valid['where']['home'] = (isset($input['home']) && !empty($input['home'])) ? 1 : 0;
        
        return $valid;
     }

    public function options_update() {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
     }

}

<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://harryrobinsondev.com
 * @since      1.0.0
 *
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Smoother
 * @subpackage Wp_Smoother/public
 * @author     Harry Robinson <harry.robo14@yahoo.co.uk>
 */
class Wp_Smoother_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Smoother_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Smoother_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

            
                    $options = get_option($this->plugin_name);
                    $wpsmoother_activate_fade = $options['wpsmoother_activate_fade'];
                    $wpsmoother_fade_duration = $options['wpsmoother_fade_duration'];
                    $wpsmoother_fade_home = $options['wpsmoother_fade_home'];

        if ($wpsmoother_fade_home == '1') {
                   if(!is_front_page() )
    {
                       $wpsmoother_activate_fade = '0';  
                   }   
        }
                    
                    
		$selections = array(
                'wpsmoother_fade_home' =>     isset( $wpsmoother_fade_home )     && trim( $wpsmoother_fade_home )     != "" ? $wpsmoother_fade_home : '0',
		'wpsmoother_activate_fade' => isset( $wpsmoother_activate_fade ) && trim( $wpsmoother_activate_fade ) != "" ? $wpsmoother_activate_fade : '0',
		'wpsmoother_fade_duration' => isset( $wpsmoother_fade_duration ) && trim( $wpsmoother_fade_duration ) != "" ? $wpsmoother_fade_duration : '1200',
			);
                        
                    if ($wpsmoother_activate_fade == 1) { 
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-smoother-public.php?'.http_build_query($selections), array(), $this->version, 'all' );
                }
            
            
            

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Smoother_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Smoother_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
            
            
        $options = get_option($this->plugin_name);
        // START VARS
        $wpsmoother_activate_fade = $options['wpsmoother_activate_fade'];
        $wpsmoother_activate_mouse_scroll = $options['wpsmoother_activate_mouse_scroll'];
        $wpsmoother_activate_click_scroll = $options['wpsmoother_activate_click_scroll'];
        
        //Value VARS
        $wpsmoother_mouse_distance = $options['wpsmoother_mouse_distance'];
        $wpsmoother_mouse_speed = $options['wpsmoother_mouse_speed'];
        $wpsmoother_anchor_speed = $options['wpsmoother_anchor_speed'];


		$selections = array(
		'activate_mouse_scroll' => isset( $wpsmoother_activate_mouse_scroll ) && trim( $wpsmoother_activate_mouse_scroll ) != "" ? $wpsmoother_activate_mouse_scroll : '0',
		'activate_click_scroll' => isset( $wpsmoother_activate_click_scroll ) && trim( $wpsmoother_activate_click_scroll ) != "" ? $wpsmoother_activate_click_scroll : '0',
		'wpsmoother_mouse_distance' => isset( $wpsmoother_mouse_distance ) && trim( $wpsmoother_mouse_distance ) != "" ? $wpsmoother_mouse_distance : '100',
		'wpsmoother_mouse_speed' => isset( $wpsmoother_mouse_speed ) && trim( $wpsmoother_mouse_speed ) != "" ? $wpsmoother_mouse_speed : '800',
		'wpsmoother_anchor_speed' => isset( $wpsmoother_anchor_speed ) && trim( $wpsmoother_anchor_speed ) != "" ? $wpsmoother_anchor_speed : '800',
			);
                        
                    if ($wpsmoother_activate_mouse_scroll == 0 && $wpsmoother_activate_click_scroll == 0) {  } else {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-smoother-public.php?'.http_build_query($selections), array( 'jquery' ), $this->version, false );
                }
                
                
                
                
                
                    }
                
        }



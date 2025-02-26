<?php
/**
 *
 * Plugin Name: Ajax Search Popup
 * Plugin URI: https://www.yasin.tk/
 * Description: Ajax Popup Search. Search By Post And Page On KeyUp.
 * Version: 1.0
 * Author: Yasin Ti
 * Author URI: https://profiles.wordpress.org/yasintechnology
 * License: GPLv2 or later
 *
 * @package   Ajax Search Popup
 * @author    Yasin Ti <yasin.coding@gmail.com>
 * @copyright Copyright (c) 2018, yasin.cf.
 *
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	die( 'dont access' );
}

Ajax_s_a::init();

CLASS Ajax_s_a {
	
	
		public static function init(){
		
		// to Create field in database
        register_activation_hook(__FILE__, array(__CLASS__, 'sinstall'));

        // to group field
        add_action('admin_init', array(__CLASS__, 'sadmin_init'));
		
		// add widget
		add_action('widgets_init',function(){register_widget('search_popup_widget');});

		add_action('wp_enqueue_scripts',array(__CLASS__,'add_js_files'));
	
		add_action('wp_ajax_my_ajax_s_functions',array(__CLASS__,'my_ajax_s_functions'));
		add_action('wp_ajax_nopriv_my_ajax_s_functions',array(__CLASS__,'my_ajax_s_functions'));

        // link for General Style on plugin
        add_action('wp_enqueue_scripts', array(__CLASS__, 'plugin_file'));

		// insert style in to admin panel
        add_action('admin_enqueue_scripts', array(__CLASS__, 'admin_style_scripts'));
		
		// add admin menu
        add_action('admin_menu', array(__CLASS__, 'admin_menu'));
		
		add_shortcode('ajax_popup_search',array(__CLASS__,'ajax_popup'));
		
		}
	
		
		public static function sinstall() {

			// Create option field
			add_option('s_popup_title', 'What are you looking for?');
			add_option('s_popup_post', '1');
			add_option('s_popup_page', '1');
			add_option('s_popup_posts_per_page', '4');

		}

		public static function sadmin_init() {

			// to group field in database
			register_setting('popup_search_admin', 's_popup_title');
			register_setting('popup_search_admin', 's_popup_post');
			register_setting('popup_search_admin', 's_popup_page');
			register_setting('popup_search_admin', 's_popup_posts_per_page');

		}

		public static function add_js_files() {
		
		wp_enqueue_script('search-all-js-file-21', plugins_url('/js/js.js', __FILE__), array('jquery'),null,false);

		wp_enqueue_script('ajax_search_all',plugins_url('/js/ajax.js',__FILE__),array('jquery'),null,false);
		wp_localize_script( 'ajax_search_all', 's_url', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
        'security_nonce' => wp_create_nonce('search-all')
		));
	
	}


	
     /**
     * Enqueue public-facing style sheet.
     */
    public static function plugin_file()
    {

        wp_enqueue_style('search-all-style5422', plugins_url('/style/style.css' ,__FILE__));

    }

    /**
     * Enqueue admin side scripts and styles
     */
    public static function admin_style_scripts()
    {

        wp_enqueue_style('search-all-style4422', plugins_url('/style/admin.css',__FILE__));
    }


	// add admin menu
    public static function admin_menu()
    {

        add_menu_page('Search Popup', 'Search Popup', 'manage_options', 'search-popup-setting', array(__CLASS__, 'popup_search_menu'));
        add_submenu_page('search-popup-setting', 'Setting', 'Setting', 'manage_options', 'search-popup-setting', array(__CLASS__, 'popup_search_menu'));
        add_submenu_page('search-popup-setting', 'Contact Us', 'Contact Us', 'manage_options', 'about-us', array(__CLASS__, 'about'));
    }
	
	

    /**
     * include setting for edite elements
     */
    public static function popup_search_menu()
    {
			//must check that the user has the required capability 
		if (!current_user_can('manage_options'))
		{
		  wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		
		include 'setting.php';

	}	
	
	 /**
     * about me
     * user support
     */

    public static function about()
    {

        echo __(' <div class="p_contact">	
			<div id="p_search-me-header"> <p> Contact Me </p> </div>
			<p> Thank you for your download </p>
			<p> to contact myself with any questions regarding this Ajax Search Popup : yasin.coding@gmail.com</p>
			</div>');

    }
	
	public static function my_ajax_s_functions() {

        // check_ajax_referer dies if nonce can not been verified
        check_ajax_referer( 'search-all', 'security_nonce' );

	 /**
	 * resive post data
	 */
 
	$search =  sanitize_text_field($_POST['search_title']);
    $post = sanitize_text_field($_POST['post']);
    $page = sanitize_text_field($_POST['page']);
	$s_popup_p = intval(get_option('s_popup_posts_per_page'));
	
		if(empty($search)){
			$search = null;
			return false;
		}  elseif (empty($post)){
			$post = null;	
		}  elseif (empty($page)){
			$page = null;	
		} 
		

	 /**
	 * Query Settings
	 *
	 * @return mixed
	 */
 
	$args = array(
    'post_type' => array($post,$page),
    's' => 	$search,
	'posts_per_page' => $s_popup_p

);


$query = new WP_Query($args);

// The Loop
while ($query->have_posts()) {

    $query->the_post();
	
	   echo '<div class="pop_title" ><a href="'.get_the_permalink().'"> "'.get_the_title().'" </a></div>'; 

	}
	
$search_address .=get_bloginfo("url");
$search_address .= '/?s=' . $search;

// show count publish posts on result
$count = $query->found_posts;

if ($count > $s_popup_p):



	
    echo "<div class='pop_archive'><a href='". esc_url($search_address)."'>". __('Show All Results') ." </a></div>";



endif;
	

if ($count < 1){
echo "<h3 style='text-align:center;padding-top:20px;'>".__('No More Post!')."</h3>";

}



wp_reset_postdata();

wp_die();



}




		public static function ajax_popup() {

			ob_start();
            require_once("form.php");
			ob_get_clean();


	}

	
	
	
	}
	
	require_once('widget.php');
	
	



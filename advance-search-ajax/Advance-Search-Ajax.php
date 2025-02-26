<?php
/**
 *
 * Plugin Name: Advance-Search-Ajax
 * Plugin URI: https://www.yasin.tk/
 * Description: Advance Ajax Live Search. Search By Author-Tag-Cats-Date And Keyword.
 * Version: 1.0
 * Author: Yasin Ti
 * Author URI: https://profiles.wordpress.org/yasintechnology
 * License: GPLv2 or later
 *
 * @package   Advance-Search-Ajax
 * @author    Yasin Ti <yasin.coding@gmail.com>
 * @copyright Copyright (c) 2017, yasin.cf.
 *
 */
 
 
if ( ! defined( 'ABSPATH' ) ) {
	die( 'dont access' );
}

 advance_search_me::init();
 
CLASS advance_search_me
{


    public static function init()
    {

        // to Create field  in database
        register_activation_hook(__FILE__, array(__CLASS__, 'install'));

        //to group field
        add_action('admin_init', array(__CLASS__, 'admin_init'));

        // link for General Style on plugin
        add_action('wp_enqueue_scripts', array(__CLASS__, 'plugin_file'));

        // insert style in to admin panel
        add_action('admin_enqueue_scripts', array(__CLASS__, 'admin_style_scripts'));

        // ajax request and ajax result
        add_action('wp_enqueue_scripts', array(__CLASS__, 'add_js_file'));
        add_action('wp_ajax_my_ajax_function', array(__CLASS__, 'my_ajax_function'));
        add_action('wp_ajax_nopriv_my_ajax_function', array(__CLASS__, 'my_ajax_function'));

        // shortcode for page and theme
        add_shortcode('Advance_Search_Ajax', array(__CLASS__, 'search'));

        // add admin menu
        add_action('admin_menu', array(__CLASS__, 'admin_menu'));

    }

    /**
     * Enqueue public-facing Scripts.
     */

    public static function add_js_file()
    {

        wp_enqueue_script('my-ajax77', plugins_url('/js/ajax.js', __FILE__), array('jquery'), true);
        wp_localize_script('my-ajax77', 'my_ajax_url', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
		
		wp_enqueue_script('my-ajax3', plugins_url('/js/jquery.nice-select.js', __FILE__), array('jquery'), true);
    }

    /**
     * Enqueue public-facing style sheet.
     */
    public static function plugin_file()
    {

        wp_enqueue_style('style4420', plugins_url('/style/style.css', __FILE__));
		wp_enqueue_style('style4421', plugins_url('/style/nice-select.css', __FILE__));

    }

    /**
     * Enqueue admin side scripts and styles
     */
    public static function admin_style_scripts()
    {

        wp_enqueue_style('style34220', plugins_url('/style/admin.css', __FILE__));
    }


    public static function install()
    {


// to Create field in database

        // Create option field  one!
        add_option('title', '');
        add_option('e_date', '1');
        add_option('e_keyword', '1');
        add_option('e_author', '1');
        add_option('e_tag', '1');
        add_option('e_cats', '1');
        add_option('loadin_img', '');
        add_option('s_posts_per_page', '4');

    }

    public static function admin_init()
    {


        // to group field in database
        register_setting('search_setting', 'title');
        register_setting('search_setting', 'e_date');
        register_setting('search_setting', 'e_keyword');
        register_setting('search_setting', 'e_author');
        register_setting('search_setting', 'e_tag');
        register_setting('search_setting', 'e_cats');
        register_setting('search_setting', 'loadin_img');
        register_setting('search_setting', 's_posts_per_page');

    }

    // add admin menu
    public static function admin_menu()
    {

        add_menu_page('Search Me', 'Search Me', 'manage_options', 'search-setting', array(__CLASS__, 'add_search_menu'), plugins_url('/img/search-me.png', __FILE__), 25);
        add_submenu_page('search-setting', 'Search Setting', 'Search Setting', 'manage_options', 'search-setting', array(__CLASS__, 'add_search_menu'));
        add_submenu_page('search-setting', 'Contact Us', 'Contact Us', 'manage_options', 'about-us', array(__CLASS__, 'about'));
    }
	

    /**
     * include setting for edite elements
     */
    public static function add_search_menu()
    {
			//must check that the user has the required capability 
		if (!current_user_can('manage_options'))
		{
		  wp_die( __('You do not have sufficient permissions to access this page.') );
		}
	
        require_once('setting.php');

    }

    /**
     * about me
     * user support
     */

    public static function about()
    {

        echo __(' <div class="contact">	
			<div id="search-me-header"> <p> Contact Me </p> </div>
			<p> Thank you for your download </p>
			<p> to contact myself with any questions regarding this Advance Search Me : yasin.coding@gmail.com</p>
			</div>');

    }


    /**
     * include selects file from database
     */
    public static function search()
    {


		
echo '<div id="main-search-form">';

        require_once("select.php");

        ?>

        <div id="loadingmessage" class="search-loading-img" style="display:none">

            <?php

            /**
             * defult loading image
             * chanege loading image
             */
            if (get_option('loadin_img') && get_option('loadin_img') != '') {

                echo '<img src="' . esc_url(get_option('loadin_img')) . '" />';

            } else {

                echo '<img src="' . esc_url(plugins_url('/img/loading.gif', __FILE__)) . '" />';
            }
            ?>

        </div>

        <!-- ajax response - show result -->
        <div id="ajax-response"></div>
</div>
        <?php

    }


    /**
     * ajax result
     * include process file
     * include loop file to show content
     */
    public static function my_ajax_function()
    {

	if ( ! isset( $_POST['name_advance_security'] ) 
    || ! wp_verify_nonce( $_POST['name_advance_security'], 'action_advance_security' ) 
		) {
   print 'Sorry, your request did not verify.';
   exit;
		  }

        require_once('process.php');


        require_once('loop.php');



    }


}


?>
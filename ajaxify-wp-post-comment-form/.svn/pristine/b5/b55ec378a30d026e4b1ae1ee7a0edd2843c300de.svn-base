<?php
defined( 'ABSPATH' ) || exit;
/**
	* The file that defines the core plugin class
 * @since      1.0.0
 * @package    Ajaxify_Wp_Post_Comment_Form
 * @subpackage Ajaxify_Wp_Post_Comment_Form/includes
 * @author     Kairav Thakar <kairavthaker2016@gmail.com>
 */

class Ajaxify_Wp_Post_Comment_Form 
{
    function __construct() 
	{
		if ( defined( 'AJAXIFY_WP_POST_COMMENT_FORM_VERSION' ) ) {
			$this->version = AJAXIFY_WP_POST_COMMENT_FORM_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'ajaxify-wp-post-comment-form';
        add_action('admin_menu', array($this, 'ajaxify_admin_menu'));
		add_action('admin_enqueue_scripts', array($this, 'ajaxify_admin_style_scripts'),10);
		add_action('wp_enqueue_scripts', array($this, 'ajaxify_front_style_scripts'),10);
    }
	
	function ajaxify_admin_style_scripts()
	{
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __DIR__ ) . 'admin/css/ajaxify-wp-post-comment-form-admin.css', array(), $this->version, 'all' );
		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __DIR__ ) . 'admin/js/ajaxify-wp-post-comment-form-admin.js', array( 'jquery' ), $this->version, false );
		$js_vars = [
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'wp_rest' ),
		];
		wp_localize_script($this->plugin_name,'admin_comment_ajax_obj',$js_vars);
		//url: talent_ajax_obj.ajaxurl,
	}
	
	function ajaxify_front_style_scripts()
	{
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __DIR__ ) . 'public/css/ajaxify-wp-post-comment-form-public.css', array(), $this->version, 'all' );
		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __DIR__ ) . 'public/js/ajaxify-wp-post-comment-form-public.js', array( 'jquery' ), $this->version, false );
		$js_vars = [
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'wp_rest' ),
		];
		wp_localize_script($this->plugin_name,'public_comment_ajax_obj',$js_vars);
		//url: talent_ajax_obj.ajaxurl,
	}
	
    function ajaxify_admin_menu() 
	{
        add_menu_page('Ajax Comment', 'Ajax Comment', 'administrator', 'ajaxify_comment_edit', array($this, 'ajaxify_comment_edit'), 'dashicons-update', 90);
    }
	
    function ajaxify_comment_edit() 
	{
        if (current_user_can("administrator")) {
            include (plugin_dir_path(__FILE__) . 'ajaxify-comment-form-setting.php');
        }
    }
}
$ajaxify_wp_post_comment_form = new Ajaxify_Wp_Post_Comment_Form();
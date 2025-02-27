<?php
/*
	Plugin Name: Contact Form 7 - email body TinyMCE editor
	Plugin URI: https://kubiq.sk
	Description: Enable WYSIWYG editor for Contact Form 7 email body
	Version: 1.7
	Author: KubiQ
	Author URI: https://kubiq.sk/about
*/

if( ! class_exists('cf7_email_editor') ){
	class cf7_email_editor{
		public function __construct(){
			add_action( 'admin_enqueue_scripts', array( $this, 'cf7_email_editor_scripts' ) );
		}

		public function cf7_email_editor_scripts(){
			if( isset( $_GET['page'], $_GET['post'] ) ){
				if( $_GET['page'] == 'wpcf7' ){
					wp_enqueue_script( 'jquery' );
					wp_enqueue_script( 'wp-tinymce' );
					wp_enqueue_script( 'editor_js', admin_url('js/editor.js'), array(), false, true );
					wp_enqueue_script( 'cf7_email_editor', plugin_dir_url( __FILE__ ) . '/js/scripts.js', array(), 1, true );
					wp_enqueue_style( 'tinymce_css', includes_url('css/editor.css') );
				}
			}
		}
	}

	$cf7_email_editor = new cf7_email_editor();
}
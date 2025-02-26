<?php
/*
Plugin Name: DX-Advanced-Widgets
Plugin URI: http://www.daxiawp.com/dx-advanced-widgets.html
Description: Collection of advanced features of the widget. 小工具高级功能集合。
Version: 1.2.0
Author: 大侠wp
Author URI: http://www.daxiawp.com/dx-advanced-widgets.html
Copyright: daxiawp开发的原创插件，任何个人或团体不可擅自更改版权。
*/

class Dx_Advanced_Widgets{
	
	function __construct(){
		add_action( 'plugins_loaded', array( $this, 'load_languages' ) );	//load languages	
		add_action( 'widgets_init', create_function( '', 'register_widget( "DX_Custom_Articles_List_Widget" );' ) );	//register DX_Custom_Articles_List_Widget
	}
	
	//load languages
	function load_languages(){
		load_plugin_textdomain( 'dx-advanced-widgets', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	
}

include( 'extension/custom-articles-list/custom_articles_list.php' );	//include custom articles list

new Dx_Advanced_Widgets();
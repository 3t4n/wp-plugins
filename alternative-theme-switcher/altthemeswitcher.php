<?php
/*
Plugin Name: Alternative Theme Switcher
Plugin URI: http://fredpointzero.com/plugins-wordpress/alternative-theme-switcher/
Description: Enable to switch between alternative stylesheets
Version: 0.1.1
Author: Frederic Vauchelles, Cathy Vauchelles
Author URI:http://fredpointzero.com
Text Domain: altthemeswitcher

Copyright 2009  Frédéric Vauchelles  (email : fredpointzero@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
class altThemeSwitcher{
	/// Constructor
	private function __construct(){
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_print_scripts', array( $this, 'include_alternative_link_tag' ) );
		if ( is_admin() ){
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		} else {
			add_action( 'init', array( $this, 'wp_head' ) );
		}
		
	}
	
	public function init(){
		load_plugin_textdomain( 'altthemeswitcher', null, 'altthemeswitcher/lang');
	}
	
	public function wp_head(){
		wp_enqueue_script('jquery');
		wp_enqueue_script(
			'jquery.cookies',
			'/wp-content/plugins/altthemeswitcher/javascript/jquery.cookies.js',
			array('jquery'),
			'1.0'
		);
		wp_enqueue_script(
			'altthemeswitcher.ready',
			'/wp-content/plugins/altthemeswitcher/javascript/ready.php',
			array('jquery', 'jquery.cookies'),
			'1.0'
		);
		wp_enqueue_style(
			'altthemeswitcher.style',
			'/wp-content/plugins/altthemeswitcher/ats.css'
		);
		
	}
	
	public function include_alternative_link_tag(){
		echo '<link rel="stylesheet" class="alternative" type="text/css" media="screen" />';
	}
	
	public function admin_menu(){
		add_options_page(
			'Alternative theme switcher options',
			'Alternative theme switcher',
			8,
			'ats_admin',
			array( $this, 'admin_generate_main' )
		);
	}
	
	public function admin_generate_main(){
		include dirname(__FILE__).'/admin_main.php';
	}
	
	public function admin_init() {
		register_setting( 'ats-options-group', 'ats_switchable_themes' );
		register_setting( 'ats-options-group', 'ats_label' );
		register_setting( 'ats-options-group', 'ats_default' );
		add_option( 'ats_switchable_themes' );
		add_option( 'ats_label' );
		add_option( 'ats_default' );
	}

	public function getThemes(){
		$themeDirs = array();
		// Get others themes
		$scanThemeDirs = scandir(get_theme_root());
		foreach($scanThemeDirs as $scannedFile){
			if (!preg_match("/\./", $scannedFile) && file_exists(get_theme_root().'/'.$scannedFile.'/style.css'))
				$themeDirs[] = $scannedFile.'/style.css';
		}
		// Get alternative themes
		if (file_exists(get_theme_root().'/'.get_template().'/altThemes')){
			$scanThemeDirs = scandir(get_theme_root().'/'.get_template().'/altThemes');
			foreach($scanThemeDirs as $scannedFile){
				if (!preg_match("/\./", $scannedFile) && file_exists(get_theme_root().'/'.get_template().'/altThemes/'.$scannedFile.'/style.css'))
					$themeDirs[] = get_template().'/altThemes/'.$scannedFile.'/style.css';
			}
		}
		return $themeDirs;
	}
	
	public function render_string(){
		$themes = get_option('ats_switchable_themes');
		if (empty($themes) || empty($themes['theme']))
			return '';
		else {
			$string = '<div id="ats-widget"><div class="label">'.get_option('ats_label').'</div><div class="items">';
			foreach($themes['theme'] as $pk=>$theme){
				$string .= '<div class="item" style="background-color:#'.(empty($themes['color'][$pk])?'666':$themes['color'][$pk]).';" title="'.$themes['name'][$pk].'" rel="'.$pk.'"></div>';
			}
		}
		$string .= '<div style="clear:both;"></div></div><div style="clear:both;"></div></div>';
		return $string;
	}
	
	public function render(){
		echo $this->render_string();
	}
	
	// Singleton pattern
	static private $instance = null;
	
	public static function getInstance(){
		if (self::$instance == null)
			self::$instance = new altThemeSwitcher();
		return self::$instance;
	}
}
altThemeSwitcher::getInstance();
?>
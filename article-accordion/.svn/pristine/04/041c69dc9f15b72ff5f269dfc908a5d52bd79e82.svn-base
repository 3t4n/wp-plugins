<?php
/*
Plugin Name: Article Accordion
Plugin URI: http://fredpointzero.com/2009/08/plugin-wordpress-article-accordion/
Description: Display categorie articles in an accordion sidebar widget
Version: 0.1.2
Author: Frederic Vauchelles, Cathy Vauchelles
Author URI: http://fredpointzero.com
Text Domain: articleaccordion

Copyright 2009  FrŽdŽric Vauchelles  (email : fredpointzero@gmail.com)

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
class articleAccordionWidget {
	/// Constructor
	private function __construct(){
		$this->dir = '/'.str_replace( ABSPATH, '', dirname( __FILE__ ) );
		/// Widget rendering initialization
		add_action( 'init', array( $this, 'init' ) );
		add_action( "plugins_loaded", array( $this, "widget_init" ) );
		/// Admin initilization
		if ( is_admin() ){
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_menu', array( $this, 'generate_admin' ) );
			add_action( "widgets_init", array( $this, "widget_control" ) );
		}
	}
	/**
	 *	Widget rendering initilization
	 *	Includes scripts and stylesheets
	 *	Load locales files
	 */
	public function init(){
		wp_enqueue_script('jquery');
		wp_enqueue_script(
			'jqueryui',
			$this->dir.'/js/jquery-ui.js',
			array('jquery')
		);
		wp_enqueue_script(
			'articleAccordion.ready',
			$this->dir.'/js/ready.js',
			array('jqueryui')
		);
		wp_enqueue_style(
			'jqueryui',
			$this->dir.'/css/ui-theme/ui.all.css'
		);
		wp_enqueue_style(
			'articleAccordion.style',
			$this->dir.'/css/style.css'
		);
		load_plugin_textdomain( 'articleaccordion', null, 'articleAccordion/lang');
	}
	/// Widgets methods
	/**
	 *	Register widget in sidebar
	 */
	public function widget_init(){
		register_sidebar_widget( "Article Accordion", array( $this, "widget_render" ) );    
	}
	/**
	 *	Register widget control
	 */
	public function widget_control(){
		register_widget_control( "Article Accordion", array( $this, "generate_widget_control" ) );
	}
	/**
	 *	Widget rendering
	 */
	public function widget_render() {
		include( 'widget.php' );
	}
	/**
	 *	Widget control rendering
	 */
	public function generate_widget_control(){
		$this->process_widget_options();
		echo $this->generate_widget_control_string();
	}
	/**
	 *	Process widget options control form
	 */
	private function process_widget_options(){
		if (!empty($_POST['aa_widget_title']))
			update_option('aa_widget_title', $_POST['aa_widget_title']);
		if (!empty($_POST['aa_max_articles']))
			update_option('aa_max_articles', $_POST['aa_max_articles']);
		if (!empty($_POST['aa_displayed_cat']))
			update_option('aa_displayed_cat', $_POST['aa_displayed_cat']);
	}
	/**
	 *	@return string : widget control string
	 */
	private function generate_widget_control_string(){
		$displayedCat = get_option('aa_displayed_cat');
		$categories = get_categories();
		$string = __('Select categories', 'articleaccordion').' :<table class="form-table">
<tr><td>'.__('Widget Title', 'articleaccordion').' : </td><td><input type="text" name="aa_widget_title" value="'.get_option('aa_widget_title').'" size="8"/></td></tr>
<tr><td>'.__('Max articles', 'articleaccordion').' : </td><td><input type="text" name="aa_max_articles" value="'.get_option('aa_max_articles').'" size="3" /></td></tr>';
		foreach($categories as $categorie)
			$string .= '<tr><td colspan="2"><label><input '.(($displayedCat && in_array($categorie->cat_ID, $displayedCat))?'checked="checked"':'').' name="aa_displayed_cat[]" type="checkbox" value="'.$categorie->cat_ID.'" />'.$categorie->name.'</label></td></tr>';
		return $string.'</table>';
	}
	/// Admin pages
	/**
	 *	Add pages to admin menu
	 */
	public function generate_admin(){
		add_options_page('Article Accordion Options', 'Article Accordion', 8, 'aa_admin', array( $this, 'generate_admin_main_page' ) );
	}
	/**
	 *	Main admin page rendering
	 */
	public function generate_admin_main_page(){
		include dirname(__FILE__).'/admin_main.php';
	}
	/**
	 *	Admin initialization
	 *	Register widget options
	 *	Add widget options
	 */
	public function admin_init(){
		register_setting( 'aa-options-group', 'aa_displayed_cat' );
		register_setting( 'aa-options-group', 'aa_widget_title' );
		register_setting( 'aa-options-group', 'aa_max_articles' );
		add_option('aa_max_articles');
		add_option('aa_displayed_cat');
		add_option('aa_widget_title');
	}
	
	// Singleton pattern
	private static $instance = null;
	
	public static function getInstance(){
		if (self::$instance == null)
			self::$instance = new articleAccordionWidget();
		return self::$instance;
	}
}
articleAccordionWidget::getInstance();
?>
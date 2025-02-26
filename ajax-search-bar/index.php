<?php 
/*
Plugin Name: Ajax Search Bar
Description: Search the post anywhere on the website
Plugin URI: https://dgashu.com/ajax-search-plugin
Version: 1.0.0
Author: DGAshu
Author URI: https://dgashu.com

*/
//Exit if accessed directly
if(!defined('ABSPATH')) exit; 

class ASB_Ajax_Search_Bar {
	//call main wordpress hook here in constructor
	function __construct(){
		add_action('admin_menu', array($this,'ourMenu'));
		add_shortcode('custom-Search-Form', array($this,'ourCustomSearchForm'));
		add_action('wp_enqueue_scripts', array($this,'includeCustomJsFile'));
	}
	//Include Custom Js File
	function includeCustomJsFile(){
		wp_enqueue_script( 'custom-js', plugins_url( '/build/index.js', __FILE__ ),array('jquery'),'1.0',true);
		wp_localize_script( 'custom-js', 'mySearchData', array(
			'root_url' => site_url('/wp-json/wp/v2/')
		) );

	}
	//Show in Admin Menu
	function ourMenu(){
		add_menu_page('custom ajax search', 'Custom Search', 'manage_options','customsearch', array($this,'customsearchbar'),'dashicons-search', 100 );
	}
	//Show text on The Custom Search Page
	function customsearchbar(){?>
		<div class="wrap">
			<h1>Custom Search Form</h1>	
			<p>Use Shortcode <strong>[custom-Search-Form]</strong> to show the search bar where you want to show</p>
			<br>
			<h3>Note:- This Plugin will only search Post of any blog</h3>
			<p>For Any issue mail us at dgashu.com@gmail.com</p>	
		</div>

	<?php }

	//Search Form
	function ourCustomSearchForm(){
		$search_form = '<div class="search-overlay">        
					        <div class="container">
					            <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
					        </div>        
					        <div class="container">
					          <div id="search-overlay__results"></div>
					        </div>
					     </div>';
	return $search_form;
	}

}
$asb_ajax_search_bar = new ASB_Ajax_Search_Bar();

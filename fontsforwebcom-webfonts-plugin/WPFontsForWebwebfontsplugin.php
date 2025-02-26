<?php
/*
Plugin Name: WP FontsForWeb.com wordpress webfonts plugin
Plugin URI: http://killerdeveloper.com
Description: While editing post select any portion on text, click on "F" icon in "Upload/Insert" bar and choose some exciting font out of 1000 availabile! And that's just the beginning!
Version: 1.0 beta
Author: Paweł Misiurski
Author URI: http://killerdeveloper.com
License: Freeware for comercial and non-commercial use on website. All Rights Reserved. No re-engineering permitted. Read each font license info before use!
DO NOT REMOVE OR MODIFY ANY FILE - THIS IS ONLY CONDITION FOR USING THIS FREE FONTS PLUGIN

*/

class WPFontsForWebwebfontsplugin
{
	public $pluginName = 'WPFontsForWebwebfontsplugin';
	//public $baseUrl = 'http://localhost/fontsforweb';
	public $baseUrl = 'http://fontsforweb.com';
	public $fontAllIds = array();
	
	function __construct()
	{
		add_action( 'admin_menu', array( &$this, 'admin_menu'));
		//filter post content to get ids
		add_filter('the_posts', array(&$this, 'extractIdsFromThePosts'));
		//add font definitions from extracted ids
		add_action( 'wp_head', array(&$this,'attachHeaderFFWCss'));
		//add link to fonts for web at the bottom of page
		add_action( 'wp_footer', array(&$this,'addFFWLink'));
		
		
		// init process for button control
		add_action('init', array(&$this,'myplugin_addbuttons'));
		
		//init js file
		wp_register_script( 'jquery-jcarousel', plugins_url('/js/jquery.jcarousel.min.js', __FILE__), 'jquery' );
		
		wp_register_script( 'WPFontsForWebwebfontsJS', plugins_url('/js/WPFontsForWebwebfontsplugin.js', __FILE__), 'jquery' );
		wp_register_style( 'fontsforwebstyle', plugins_url('/css/fontsforwebstyle.css', __FILE__));
		wp_register_style( 'ffwfontface', $this->baseUrl . '/font/generatecss/?id=777');
	}
	
	//run when displaying header
	function attachHeaderFFWCss()
	{
		//generate css url using 
		$this->generateFFWCSSURL($this->fontAllIds);
		echo '<link href="'.FFW_fonts_link_href.'" rel="stylesheet" type="text/css" />';
	}

	//get ids from currently displayed post
	function extractIdsFromThePosts($content)
	{
		foreach($content as $post)
		{
			//fontsforweb_fontid_
			preg_match_all('/fontsforweb_fontid_([0-9]*)/', $post->post_content, $fontsIds);
			$fontsIds = array_unique($fontsIds[1]);
			foreach($fontsIds as $k => $v)
			{
				$this->fontAllIds[] = $v;
			}
		}
		$this->fontAllIds = array_unique($this->fontAllIds);
		//var_dump($this->fontAllIds);
		//die();
		
		return $content;
	}
	
	//admin settings
	function admin_menu()
	{
		add_action( 'media_buttons', array( &$this, 'media_buttons' ) );
		
		wp_enqueue_script( 'jquery-jcarousel');
		
		wp_enqueue_script( 'WPFontsForWebwebfontsJS');
		wp_enqueue_style( 'fontsforwebstyle' );
		wp_enqueue_style( 'ffwfontface' );
		
		$this->loadFontsForTinymce($this->get_fonts_ids_from_content());
	}
	
	//generate CSS URL
	function generateFFWCSSURL($idsArray)
	{
		$idsString = '';
		for($i=0; $i<count($idsArray); $i++)
		{
			$idsString .= '&ids[]=' . $idsArray[$i];
		}
		define('FFW_fonts_link_href', $this->baseUrl . '/font/generatecss/?id=' . $idsArray[0] . $idsString);
	}
	
	//load FontsForWeb for tinyMce
	function loadFontsForTinymce($idsArray)
	{
		/*
		 *
		 *  Adds a filter to append the default stylesheet to the tinymce editor.
		 *
		 */
		$this->generateFFWCSSURL($idsArray);
		
		if ( ! function_exists('tdav_css') ) {
			function tdav_css($wp) {
				$wp .= ',' . FFW_fonts_link_href;
			return $wp;
			}
		}
		add_filter( 'mce_css', 'tdav_css' );

		/* Custom CSS styles on WYSIWYG Editor – Start
		======================================= */
		if ( ! function_exists( 'myCustomTinyMCE' ) ) :
		function myCustomTinyMCE($init) {
			$init['theme_advanced_buttons2_add_before'] = 'styleselect'; // Adds the buttons at the begining. (theme_advanced_buttons2_add adds them at the end)
			$init['theme_advanced_styles'] = 'Float Left=fleft,Float Right=fright';
			return $init;
		}
		endif;
		add_filter('tiny_mce_before_init', 'myCustomTinyMCE' );
		add_filter( 'mce_css', 'tdav_css' );
		// incluiding the Custom CSS on our theme.
		function mycustomStyles(){
			wp_enqueue_style( 'myCustomStyles', $this->baseUrl . '/font/generatecss/?id=777', ",",'all' ); /*adjust this path if you place "mycustomstyles.css" in a different folder than the theme's root.*/
		}
		add_action('init', 'mycustomStyles');
		/* Custom CSS styles on WYSIWYG Editor – End
		======================================= */
	}
	
	//add button in Upload/Insert menu bar
	function media_buttons() {
		$title = __( 'Show fonts', 'button1000fonts' );
		echo '<a href="#" id="FFW_chooseFontButton"><img src="'. plugins_url('/menu_item.png', __FILE__) . '" alt="fonts" /></a>';
	}
	
	//get fonts ids from content OLD VERSION NOW FILTERING OF get_posts DOES THE JOB
	function get_fonts_ids_from_content(){
		if($wp_query->post->ID)
			$post = wp_get_single_post($wp_query->post->ID);
		else if(is_numeric($_GET['post']))
			$post = wp_get_single_post($_GET['post']);
		else if(is_numeric($_GET['page']))
			$post = wp_get_single_post($_GET['page']);
		else if(is_numeric($_GET['p']))
			$post = wp_get_single_post($_GET['page']);
		
		$post_content = $post->post_content;
		
		//fontsforweb_fontid_
		preg_match_all('/fontsforweb_fontid_([0-9]*)/', $post_content, $fontsIds);
		$fontsIds = array_unique($fontsIds[1]);
		
		return $fontsIds;
	}
	//TINYMCE PLUGIN
	function myplugin_addbuttons() {
	   // Don't bother doing this stuff if the current user lacks permissions
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		 return;
	 
	   // Add only in Rich Editor mode
	   if ( get_user_option('rich_editing') == 'true') {
		 add_filter("mce_external_plugins", array(&$this, "add_myplugin_tinymce_plugin"));
		 add_filter('mce_buttons', array(&$this, 'register_myplugin_button'));
	   }
	}
	 
	function register_myplugin_button($buttons) {
		//die('pizdaka');
	   array_push($buttons, "separator", 'FFWButton');
	   return $buttons;
	}
	 
	// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
	function add_myplugin_tinymce_plugin($plugin_array) {
	   $plugin_array['ffwbutton'] = plugins_url('/js/editor_plugin.js', __FILE__);
	   
	   return $plugin_array;
	}
	
	//add link
	/*DO NOT REMOVE OR MODIFY - THIS IS ONLY CONDITION FOR USING THIS FREE FONTS PLUGIN*/
	//I would just hide this with JS :D - BUT THATS NOT PERMITTED TOO!
	function addFFWLink()
	{
		echo '<p><a href="http://www.fontsforweb.com" target="_blank">Webfonts HTML & CSS provided by FontsForWeb.com - free fonts download</a>. See this <a href="http://wordpress.org/extend/plugins/fontsforwebcom-webfonts-plugin/screenshots/" target="_blank">Wordpress fonts(webfonts) plugin here</a></p>';
	}
}

$WPFFW = new WPFontsForWebwebfontsplugin();
?>
<?php 
/*
Plugin Name: JinMenu
Plugin URI: http://buffernow.com/
Description: Inject Javascript In WP MENU
Version: 3.2.1
Author: Rohit Chowdhary
Author URI: http://buffernow.com/about-me/
*/

class jin
	{


	function __construct()
		{
			add_filter('nav_menu_css_class', array(
				$this,
				'jsom_menu_class'
			) , 10, 2);
		
			add_action('wp_enqueue_scripts', array(
				$this,
				'enqueue_scripts'
			));
		
			add_action('admin_menu', array(
				$this,
				'jin_plugin_menu'
			));
		
			add_action('wp_footer', array(
				$this,
				'push_script'), 
			100);
		
			add_filter('wp_setup_nav_menu_item', array(
				$this,
				'jin_nav_item'
			));
	
			add_filter( 'admin_body_class', array( 
				$this, 
				'add_menu_class' 
			));

		
		
			$this->check_update();
		}

	function jsom_menu_class($classes, $item)
		{
		if (isset($item->jin) && $item->jin != "")
			{

				$classes[] = "jsom" . str_replace(' ', '', $this->slugify($item->title) . "-" . $item->ID);
			}

		return $classes;
		}

	function slugify($text)
		{

		// replace non letter or digits by -

		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate

		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters

		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim

		$text = trim($text, '-');

		// remove duplicate -

		$text = preg_replace('~-+~', '-', $text);

		// lowercase

		$text = strtolower($text);
		if (empty($text))
			{
			return 'n-a';
			}

		return $text;
		}



	function enqueue_scripts()
		{
		wp_enqueue_script('jquery');
		}

	function jin_plugin_menu()
		{
		$submenu = add_submenu_page('themes.php', 'Jin Menus', 'Jin Menus', 'manage_options', 'jin-plugin-menu', array(
			$this,
			'jin_plugin_options'
		),4);
		add_action('admin_print_styles-' . $submenu, array(
			$this,
			'jin_load_scripts'
		));

		
		
		}

	function jin_plugin_options()
		{
			require_once('template.php');

		}

	function jin_load_scripts()
		{		
			wp_enqueue_style('jquery-ui-accordion');
			wp_enqueue_style('dashicon');
			wp_enqueue_style('nav-menu');
			wp_enqueue_script('jquery-ui-accordion');
		}
	

	
	function add_menu_class($body_classes){

		if(isset($_GET['page']) && $_GET['page']  == 'jin-plugin-menu')
		{ 

			$body_classes = "nav-menus-php";
		}
		return $body_classes;
	}
	

	function jin_nav_item($menu_item)
		{
			$menu_item->jin = get_post_meta($menu_item->ID, '_menu_item_jin', true);
				return $menu_item;
		}

	function check_update()
		{
		if (isset($_REQUEST['jin_update']))
			{
			$menu_items = $_REQUEST['menu-item-jin'];
			if (!empty($menu_items)):
				foreach($menu_items as $key => $val):
					if (!update_post_meta($key, '_menu_item_jin', $val)) add_post_meta($key, '_menu_item_jin', $val);
				endforeach;
			endif;
			}
		}
		
	function push_script() 
		{	
	
		$js_scipt ='<script type="text/javascript">';
		$js_scipt .='jQuery(document).ready(function(){';

		 $m_i=1;
		 if($locations = get_nav_menu_locations()){
			
						foreach($locations as $keyn => $val){
							if ( has_nav_menu($keyn ) ):
							
				 $menu_items = wp_get_nav_menu_items($val );
				
				 foreach ( (array) $menu_items as $key => $menu_item ) {
				  if(isset($menu_item->jin) && $menu_item->jin !=""): 
					$js_scipt .='var menuID'.$m_i.' = jQuery(".jsom'.$this->slugify($menu_item->title)."-".$menu_item->ID.'");';
					$js_scipt .='findA'. $m_i.' =menuID'. $m_i.'.find("a");';
					$js_scipt .='findA'.$m_i.'.attr( "href", "javascript:void(0)" );';
					$js_scipt .='findA'.$m_i.'.unbind().click(function(event){';
					$js_scipt .= stripslashes($menu_item->jin)."});"; 
				  endif;
				   $m_i++;
				 }
				endif;
							} 
		 }
		$js_scipt .= "});</script>";
	  
		echo  $js_scipt;
		}
	
	}
	
	add_action('init','activate_jin_menu');
	
	function activate_jin_menu(){
		$Lets_Start = new jin();
	}
?>
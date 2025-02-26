<?php
/*
Plugin Name: ODD Social media plugin
Plugin URI: http://www.orangedevdesign.nl
Description: ODD Social media plugin
Version: 1.0
Author: Dennis de Groot
Author URI: http://www.orangedevdesign.nl
*/

	//Set Up Class
	if (!class_exists("OddSocial"))
	{
		class OddSocial
		{			
			function Main()
			{
				//Admin section
				include('ODDSocialMedia_admin.php');
			}
			
			function ConfigureMenu()
			{
				add_menu_page("ODD Social media", "ODD Social media", 6, 'odd_social_media', array('OddSocial','Main'));
			}
		}
	}
	
	//Create new instance of class
	if (class_exists("OddSocial"))
	{
		$social_media = new OddSocial();
	}
	
	//Actions and Filters
	if(isset($social_media))
	{
		// Administration Actions
		add_action('admin_menu', array($social_media,'ConfigureMenu'));
	}
	
	//Load CSS style
	add_action('admin_init','original_source_init');
	wp_enqueue_style('odd_css', WP_PLUGIN_URL.'/ODD_social_media/ODDstyle.css', '', '1.0');
	
	//Output
	function odd_social()
	{
		$alloptions = get_alloptions();
		$blogname = get_option('blogname');
		
		echo '<div id="odd_social_block">';
		foreach($alloptions as $option => $value)
		{
			if(substr($option, 0, 4) == 'odd_' && $value != '')
			{
				echo '<a class="odd_url" href="'.$value.'" title="'.$blogname.' '.ucfirst(substr($option, 4)).'" target="_blank"><img src="'.WP_PLUGIN_URL.'/ODD_social_media/icons/'.substr($option, 4).'.png" title="'.$blogname.' '.ucfirst(substr($option, 4)).'" alt="'.$blogname.' '.ucfirst(substr($option, 4)).'" /></a>';
			}
		}
		echo '</div>';
	}
?>
<?php
/*
Plugin Name: Add PHP
Plugin URI: http://www.nanofaz.it/Wordpress/plugin/addphp.zip
Description: Permette di inserire condice php nelle pagine o negli articoli
Author: Fabio Ziviello
Version: 1.0
Tags: Add PHP, attiva PHP, aggiungi PHP
Author URI: http://www.nanofaz.it
*/

define('URL_Plugina_addphp',get_option('siteurl').'/wp-content/plugins/addphp/');

global $addphp_setting_defaults;
global $addphp_settings;

$addphp_setting_defaults=array(
'status'=>1
);

register_deactivation_hook(__FILE__, 'addphp_deactivate');
register_activation_hook(__FILE__, 'addphp_activate');

function addphp_activate()
{
	global $addphp_setting_defaults,$values;
	$default_settings = get_option('addphp_settingPage');
	$default_settings= wp_parse_args($default_settings, $addphp_setting_defaults);
	add_option('addphp_settingPage',$default_settings);
}

function addphp_deactivate()
{
	delete_option('addphp_settingPage');
}

function addphp_settingPage()
{
	addphp_settings_recupere();
	include_once dirname(__FILE__).'/setting.php';
}

function addphp_menu()
{
    $level = 'level_10';
   add_menu_page('AddPHp', 'AddPHp', $level, __FILE__,'addphp_settingPage',URL_Plugina_addphp.'img/logo-menu.png');
}

add_action('admin_menu', 'addphp_menu');

function addphp_settings_recupere()
{
	if(isset($_POST['addphp_settingPage']))
	{
		echo '<div class="updated fade" id="message"><p>Modifiche <strong>Salvate</strong></p></div>';
		$addphp_setting_defaults=$_POST['addphp_settingPage'];
		unset($_POST['update']);
		update_option('addphp_settingPage', $addphp_setting_defaults);
	}
	
	addphp_UpdateSetting();
}

function addphp_UpdateSetting()
{
	$default_settings=get_option('addphp_settingPage');

	 if ($default_settings['status']==1)
	 {
	 	if(!function_exists('addphp_functAdd') )
		{
			function addphp_functAdd($content)
			{
				$addphp_content = $content;
				preg_match_all('!\[addPhp[^\]]*\](.*?)\[/addPhp[^\]]*\]!is',$addphp_content,$addphp_array);
				$addphp_count = count($addphp_array[0]);
		
				for( $addphp_indice=0; $addphp_indice<$addphp_count; $addphp_indice++ )
				{
					ob_start();
					eval($addphp_array[1][$addphp_indice]);
					$addphp_replace = ob_get_contents();
					ob_clean();
					ob_end_flush();
					$addphp_search = quotemeta($addphp_array[0][$addphp_indice]);
					$addphp_search = str_replace('/',"\\".'/',$addphp_search);
					$addphp_content = preg_replace("/$addphp_search/",$addphp_replace,$addphp_content,1);
				}
				return $addphp_content;
			}
			add_filter( 'the_content', 'addphp_functAdd', 9 );
		}
	 }

}

addphp_UpdateSetting();


?>
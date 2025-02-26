<?php
/*
Plugin Name: bbPress - Auto Delete Spam Replies
Plugin URI: http://www.hudsonatwell.co
Description: Automatically delete bbPress replies marked as spam.
Version: 1.0.1
Author: Hudson Atwell
Author URI: http://www.hudsonatwell.co
*/

/* 
---------------------------------------------------------------------------------------------------------
- Define constants & include core files
---------------------------------------------------------------------------------------------------------
*/ 

define('BBPRESS_AUTODELETE_CURRENT_VERSION', '1.0.1' );
define('BBPRESS_AUTODELETE_LABEL' , 'Auto Delete Spam Replies' );
define('BBPRESS_AUTODELETE_SLUG' , plugin_basename( dirname(__FILE__) ) );
define('BBPRESS_AUTODELETE_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );
define('BBPRESS_AUTODELETE_PATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );

/* load core files */
switch (is_admin()) :
	case true : 
		/* loads admin files */	
		include_once('modules/module.settings.php');
		include_once('modules/module.cron.php');
		
		
	case false :
		/* loads frontend files */				
		include_once('modules/module.cron.php');	
			
endswitch;



		
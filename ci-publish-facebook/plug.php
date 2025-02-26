<?php
/*
Plugin Name: TR Hello
Plugin URI: http://ngoctrinh.net/
Description: hello
Version: 1.0.4
Author: Trinh
Author URI: http://ngoctrinh.net/
License: GPL2
*/



define('TRLP_FILE',__FILE__);
define('TRLP_URL', plugins_url('/',__FILE__));
define('TRLP_FBPATH',plugin_dir_path(__FILE__).'/');

define('TRLP_FBADMIN_URL',admin_url('admin.php?page=trlp_settings'));
define('TRLP_FACEBOOK_LINK_DESCRIPTION_MAX_LENGTH', 340); 
define('TRLP_REQUEST_TIMEOUT', 20); 
define('TRLP_TEXT_DOMAIN', 'tr_last_post_to_facebook');


//INCLUDE FUNCTIONS:

include_once(TRLP_FBPATH.'inc/functions.php');
include_once(TRLP_FBPATH.'inc/init.php');

include_once(TRLP_FBPATH.'widgets/widgets.php');
//install admin 
if(is_admin())
{
    include_once(TRLP_FBPATH.'lib/post_facebook.php');
    include_once(TRLP_FBPATH.'inc/admin.php');  
    include_once(TRLP_FBPATH.'inc/admin_menu.php');  
}else
{    
    include_once(TRLP_FBPATH.'shortcodes/shortcodes.php');
    include_once(TRLP_FBPATH.'inc/front.php');    
}


//import cron script

include_once(TRLP_FBPATH.'inc/cron.php');




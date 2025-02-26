<?php
/*
 * Plugin Name: NinjaTeam Facebook Messenger Bulksender
 * Plugin URI: https://ninjateam.org/facebook-messenger-sender/
 * Description: Send bulk messages to those who messaged your page
 * Version: 1.0
 * Author: NinjaTeam
 * Author URI: http://ninjateam.org
 */

define('NJT_FB_MESS_FILE', __FILE__);

define('NJT_FB_MESS_DIR', realpath(plugin_dir_path(NJT_FB_MESS_FILE)));
define('NJT_FB_MESS_URL', plugins_url('', NJT_FB_MESS_FILE));
define('NJT_FB_MESS_I18N', 'njt_fc_messenger');

require_once NJT_FB_MESS_DIR . '/src/Facebook/autoload.php';

require_once NJT_FB_MESS_DIR . '/src/functions.php';
require_once NJT_FB_MESS_DIR . '/src/category.class.php';

require_once NJT_FB_MESS_DIR . '/src/NjtView.class.php';
require_once NJT_FB_MESS_DIR . '/src/NjtFbMessApi.class.php';
require_once NJT_FB_MESS_DIR . '/init.php';

$njt_fb_mess_api = new NjtFbMessApi();

NjtFbMessenger::instance();

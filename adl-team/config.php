<?php
/*Define All Constants*/
if ( !defined('ABSPATH') ) { die('You do not have right to access this file directly'); } // prevents direct access
if ( !defined('ADL_TEAM_VERSION') ) { define('ADL_TEAM_VERSION', '1.0.0'); }
if ( !defined('ADL_TEAM_DIR') ) { define('ADL_TEAM_DIR', plugin_dir_path(__FILE__)); }
if ( !defined('ADL_TEAM_URL') ) { define('ADL_TEAM_URL', plugin_dir_url(__FILE__)); }
if ( !defined('ADL_TEAM_CLASS_DIR') ) { define('ADL_TEAM_CLASS_DIR', ADL_TEAM_DIR.'includes/classes/'); }
if ( !defined('ADL_TEAM_VIEWS_DIR') ) { define('ADL_TEAM_VIEWS_DIR', ADL_TEAM_DIR.'views/'); }
if ( !defined('ADL_TEAM_LIB_DIR') ) { define('ADL_TEAM_LIB_DIR', ADL_TEAM_DIR.'libs/'); }
if ( !defined('ADL_TEAM_TEMPLATES_DIR') ) { define('ADL_TEAM_TEMPLATES_DIR', ADL_TEAM_DIR.'templates/'); }
if ( !defined('ADL_TEAM_ADMIN_ASSETS') ) { define('ADL_TEAM_ADMIN_ASSETS', ADL_TEAM_URL.'admin/assets/'); }
if ( !defined('ADL_TEAM_PUBLIC_ASSETS') ) { define('ADL_TEAM_PUBLIC_ASSETS', ADL_TEAM_URL.'public/assets/'); }
if ( !defined('ADL_TEAM_TEXTDOMAIN') ) { define('ADL_TEAM_TEXTDOMAIN', 'adl-team'); }
if ( !defined('ADL_TEAM_LANG_DIR') ) { define('ADL_TEAM_LANG_DIR', dirname(plugin_basename( __FILE__ ) ) . '/languages'); }
if ( !defined('ADL_TEAM_POST_TYPE') ) { define('ADL_TEAM_POST_TYPE', 'adl-team'); }
if ( !defined('ADL_TEAM_SHORT_CODE_POST_TYPE') ) { define('ADL_TEAM_SHORT_CODE_POST_TYPE', 'adl-team-shortcode'); }
if ( !defined('ADL_TEAM_PLUGIN_NAME') ) { define('ADL_TEAM_PLUGIN_NAME', 'ADL Team'); }

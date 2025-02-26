<?php
  /*
    Plugin Name: BugPlug by OMATUM
    Plugin URI: https://bugplug.omatum.com
    Description: BugPlug is the easiest and most affordable way to collect feedback and track bugs from your users and clients.
    Version: 1.0.0
    Author: OMATUM, Inc.
    Author URI: http://www.omatum.com
    Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
   */


   function bugplug_init_settings() {
     add_option('bugplug_switch', false);
     add_option('bugplug_api_key', null);
     add_option('bugplug_board', true);
     add_option('bugplug_color', '#f9dd65');
     add_option('bugplug_vars', null);
     register_setting('bugplug_settings', 'bugplug_switch');
     register_setting('bugplug_settings', 'bugplug_api_key');
     register_setting('bugplug_settings', 'bugplug_board');
     register_setting('bugplug_settings', 'bugplug_color');
     register_setting('bugplug_settings', 'bugplug_vars');
   }
   add_action( 'admin_init', 'bugplug_init_settings' );

   if (is_admin()) {
       include dirname(__FILE__) . '/admin.php';
   }

   function bugplug_code() {
     $bugplug_board = "false";
     if(get_option('bugplug_board')=="on"){$bugplug_board = "true";};
     echo "\n<!-- BEGIN BUGPLUG BY OMATUM WIDGET -->\n";
     echo "<script src=\"//widget-cdn.bugplug.omatum.com/bp.js\"></script>\n";
     echo "<script>\n";
     echo "_bugplug.init(\n\t{\n\t\t\"API_KEY\": \"".get_option('bugplug_api_key')."\",\n\t\t\"bg_color\": \"".get_option('bugplug_color')."\",\n\t\t\"trello_link\": ".$bugplug_board."\n\t}\n);\n";
     echo get_option('bugplug_vars');
     echo "\n</script>\n";
     echo "<!-- END BUGPLUG BY OMATUM WIDGET -->\n\n";

   }

if (get_option('bugplug_switch')=="on") {
  add_action( 'wp_footer', 'bugplug_code' );
}
?>

<?php
/*
Plugin Name: HumansNotBots - Easy, Accessible Email Cloaker
Plugin URI: http://wordpress.org/extend/plugins/humansnotbots/
Description: Email addresses in the form <strong>email AT address DOT com</strong> are converted to a clickable version, <a href="mailto:email@address.com">email@address.com</a>, if JavaScript is enabled. If JavaScript is not enabled (such as for screen readers), then the email address in the form "email AT address DOT com" is still readable to humans.
Author: Sophiah (Zing-Ming)
Version: 3.2
Author URI: http://wordpress.org/extend/plugins/profile/zingming
Text Domain: humansnotbots
*/

load_plugin_textdomain('humansnotbots', false, 'humansnotbots/languages');

class HumansNotBots {
      function add_to_footer () {
      	       $js_file_url = WP_PLUGIN_URL .'/'. plugin_basename(dirname(__FILE__)) . '/humansnotbots.js';
      	       echo '<script type="text/javascript" src="' . $js_file_url .'"></script>' . "\n";
      	       echo '<script type="text/javascript">' . "\n<!--\nHumansNotBots(";
	       if (get_option('replacement_method') == 'innerhtml')
	       	  echo '"innerhtml"';
	       else
	          echo '"dom"';
	       echo ', "'; 
	       _e('AT', 'humansnotbots');
	       echo '", "';
	       _e('DOT', 'humansnotbots');
	       echo '");';
	       echo "\n//-->\n</script>\n";
      }

      function menu() {
               add_options_page('HumansNotBots Settings', 'HumansNotBots', 'manage_options', 'HumansNotBots', array($this, 'options'));
      }
      
      function options() {
      	       if (!current_user_can('manage_options'))  {
    	       	  wp_die( __('You do not have sufficient permissions to access this page.', 'humansnotbots') );
  	       }
	       
	       if (!get_option('replacement_method'))
	       	  update_option('replacement_method', 'innerhtml');
	       
  	       echo '<div class="wrap"><h2>';
	       _e('HumansNotBots Settings', 'humansnotbots');
	       echo '</h2>'; 
	       echo '<p>';
	       _e('Remember that email addresses should be in the form <strong>email AT address DOT com</strong> and the "AT" and "DOT" need to be all uppercase (capital letters).', 'humansnotbots');
	       echo '</p>';
	       echo '<h3>';
	       _e('Advanced Settings', 'humansnotbots');
	       echo '</h3>';
	       echo '<form method="post" action="options.php">';
	       wp_nonce_field('update-options');
	       echo '<table class="form-table"><p>';
	       echo '</p>';
	       echo '<tr valign="top">';
	       echo '<th scope="row">';
	       _e('Replacement method', 'humansnotbots');
	       echo '</th>';
	       $method = get_option('replacement_method');
	       if ($method === FALSE)
	       	  $method = 'dom';
	       echo '<td><input type="radio" name="replacement_method" value="innerhtml" ';
	       if ($method === 'innerhtml')
	       	  echo 'checked="checked"';
	       echo ' />';
	       _e('innerHTML', 'humansnotbots');
	       echo '<br />';
	       echo '<input type="radio" name="replacement_method" value="dom"';
	       if ($method === 'dom')
	       	  echo 'checked="checked"';
	       echo ' />';
	       _e('Walk the DOM (default)', 'humansnotbots');
	       echo '</td>';
	       echo '</tr>';
	       echo '</table>';
	       echo '<input type="hidden" name="action" value="update" />';
	       echo '<input type="hidden" name="page_options" value="replacement_method" />';
	       echo '<p class="submit">';
	       echo '<input type="submit" class="button-primary" value="';
	       _e('Save Changes', 'humansnotbots');
	       echo '" />';
	       echo '</p>';
  	       echo '</div>';
      }

      function register_settings () {
      	       register_setting('replacement_method', 'innerhtml');
	       register_setting('replacement_method', 'dom');
      }
}

$humansnotbots = new HumansNotBots();
add_action('wp_footer', array($humansnotbots, 'add_to_footer'));
if ( is_admin() ) {
   add_action('admin_menu', array($humansnotbots, 'menu'));
   add_action('admin_init', array($humansnotbots, 'register_settings'));
}
?>

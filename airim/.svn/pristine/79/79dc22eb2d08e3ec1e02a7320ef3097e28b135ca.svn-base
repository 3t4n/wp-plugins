<?php
   /*
   Plugin Name: Airim
   Plugin URI: https://airim.co
   description: Add Airim to your Wordpress site to increase conversions
   Version: 1.0
   Author: Airim
   Author URI: https://airim.co/about
   License: GPL2
   */

   add_action( 'wp_footer', 'add_airim_script' );
   add_action('admin_menu', 'airim_plugin_menu');
   add_action( 'admin_init', 'airim_settings_vars' );

   function add_airim_script(){
   	echo '<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://d25z1h7fcwlg61.cloudfront.net/airim.js";var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}();</script>';
   }

   function airim_settings_vars() {
      register_setting('airim-settings-group', 'airim_enabled',array(
        'type'              => 'boolean',
        'group'             => 'airim-settings-group',
        'description'       => '',
        'sanitize_callback' => null,
        'show_in_rest'      => false,
        'default' => true
    ) );
   }

   function airim_plugin_menu() {
   	add_submenu_page('options-general.php','Airim Settings', 'Airim Settings', 'administrator', 'airim-settings', 'airim_settings_page', 'dashicons-admin-generic');
   }

   function airim_settings_page() {
   ?>
     <div class="wrap">
         <h2>Airim Script</h2>
         <p>The script has automatically been added to your Wordpress blog.</p>
         <p>
            Please create an account on <a href="https://airim.co">Airim</a> and enter your domain name to get started.
            <br><br>
            You can customize the widget via the Airim <a href="https://airim.co/settings/">settings</a> page
            <br><br>
            You can enable or disable the widget from Wordpress plugins page.
         </p>
         </div>
   <?php
   }
?>
<?php
/*
 * Plugin name: Fix missing property app_id
 * Version: 0.1
 * Description: This plugin allows you to insert a property fb:app_id in order to fix the Facebook Sharing Debugger error «The following required properties are missing: fb:app_id»
 * Requires at least: 5.4
 * Requires PHP: 7.0
 * Author: Ilias Vlachos
 * Author URI: https://profiles.wordpress.org/iliasvlachos1/
 * Licence: GPL v2 or later
 * Licence URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/*
Fix missing property app_id is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Fix missing property app_id is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Fix missing property app_id. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.html .
*/

namespace FBAPPIDFIX_FixMissingPropertyAppID;


/*
 * Display input field
 */
function FBAPPIDFIX_display_app_id_input_template(){
    ?>
    <div class="wrap">
        <form action="options.php" method="post">
            <?php
            settings_fields( 'fb_app_id_fix' );
            do_settings_sections('fb_app_id_fix');
            submit_button( 'Save', 'submit' );
            ?>
        </form>
    </div>
    <?php
}

/*
 * Display of plugin page
 */
function FBAPPIDFIX_options_page_html(){
    echo "<h1>". esc_html(get_admin_page_title()) ."</h1>";
    echo '<p>This plugin only inserts the required property with the given app_id. You have to create a facebook app to get the app_id!</p>';
    echo '<p>To create a facebook app, visit <a href="https://developers.facebook.com/">https://developers.facebook.com/</a>.</p>';
    echo '<p>Register or Login to your account.</p>';
    echo '<p>Click My Apps, then click Create to create a new App</p>';
    echo '<p>When the app is created and you are in the app dashboard click settings and select Basic</p>';
    echo '<p>That is the App ID you need to copy and past in the field below</p>';
}

function FBAPPIDFIX_display_settings_init(){
    register_setting('fb_app_id_fix', 'FBAPPIDFIX_app_id', array('type' => 'string', 'sanitize_callback' => 'sanitize_text_field', 'default' => ''));
    add_settings_section('FBAPPIDFIX_section', 'Settings Section', '\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDFIX_options_page_html', 'fb_app_id_fix');
    add_settings_field('FBAPPIDFIX_field', 'Facebook app_id', '\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDFIX_app_id_input_field_callback', 'fb_app_id_fix', 'FBAPPIDFIX_section');
}

add_action('admin_init', '\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDFIX_display_settings_init');

function FBAPPIDFIX_app_id_input_field_callback(){
    $FBAPPIDFIX_input_field = get_option('FBAPPIDFIX_app_id');
    ?>
    <input type="text" id="FBAPPIDFIX_app_id" name="FBAPPIDFIX_app_id" class="regular-text" value="<?php echo isset($FBAPPIDFIX_input_field) ? esc_attr( $FBAPPIDFIX_input_field ) : ''; ?>" />
    <?php
}

/*
 * Add plugin in Tools submenu
 */
function FBAPPIDFIX_options_page(){
    add_submenu_page('tools.php', 'Fix missing Facebook app_id', 'Fix missing FB app_id', 'manage_options', 'fb_app_id_fix', '\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDFIX_display_app_id_input_template');
}
add_action('admin_menu', '\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDFIX_options_page');

/*
 * Remove plugin's submenu. Runs in deactivation hook
 */
function FBAPPIDFIX_remove_options_page(){
    remove_menu_page('fb_app_id_fix');
}

/*
 * Checks if FBAPPIDFIX_app_id exists and has a value
 */
function FBAPPIDFIXcheckForPluginOption(){
    //chech if row exists in wp-options
    $option = "FBAPPIDFIX_app_id";
    $exists = get_option($option, $default = false );
    if ($exists){
        if ($exists !== ''){
            add_action('wp_head', '\FBAPPIDFIX_FixMissingPropertyAppID\insertFBAPPIDFIXproperty');
        }
    }
}

function insertFBAPPIDFIXproperty(){
    $option = "FBAPPIDFIX_app_id";
    $app_id = get_option($option, $default = false );
    echo '<meta property="fb:app_id" content="'.$app_id.'">';
}

function FBAPPIDdeletePluginOption(){
    //delete row from wp-option
    delete_option('FBAPPIDFIX_app_id');
}

register_activation_hook( __FILE__, '\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDFIX_options_page' );

register_deactivation_hook(__FILE__, '\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDFIX_remove_options_page');

register_uninstall_hook(__FILE__, '\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDdeletePluginOption');

\FBAPPIDFIX_FixMissingPropertyAppID\FBAPPIDFIXcheckForPluginOption();
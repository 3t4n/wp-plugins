<?php
/**
 * Plugin Name: AskThis
 * Plugin URI: https://askthis.nl
 * Description: Get feedback from your visitors/customer on your Wordpress website by showing your questions created on askthis.nl (interface is only Dutch for now)
 * Version: 0.3
 * Tested up to: 5.4
 * Author: Marcel van Doornen
 * Author URI: https://tech.marcelvandoornen.nl
 * Text Domain: AskThis
 * Domain Path: /languages
 **/
define( 'ASKTHIS__PLUGIN_DIR_PATH', plugins_url('', __FILE__ ) );

function askthis_register_settings() {
    register_setting( 'askthis_options_group', 'askthis_use_fontawesome', 'askthis_callback' );
}
add_action( 'admin_init', 'askthis_register_settings' );


function askthis_register_options_page() {
    add_options_page( 'AskThis settings', 'AskThis', 'manage_options', 'askthis', 'askthis_options_page' );
}
add_action( 'admin_menu', 'askthis_register_options_page' );

function askthis_options_page() {

    ?>
    <div>
        <?php screen_icon(); ?>
        <h2><?php _e('AskThis settings'); ?></h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'askthis_options_group' ); ?>
            <table>
                <tr valign="top">
                    <th scope="row"><label for="askthis_fa"><?php _e('Use Font Awesome', 'AskThis'); ?></label></th>
                    <td>
                        <input type="hidden" name="askthis_use_fontawesome" value="0" />
                        <?php $checked = get_option('askthis_use_fontawesome' , 0) ? ' checked ' : ''; ?>
                        <input <?php print $checked; ?> name="askthis_use_fontawesome" value="1" type="checkbox" id="askthis_fa" />
                        <p><?php _e('If your site does not already use Font Awesome, turn this checkbox on. You can check this by creating a question with thumbs up/down and check if they appears on your website. If this is the case you won\'t need to turn this on. Need help, please feel free to <a title="Contact with AskThis" href="https://askthis.nl#contact">contact AskThis</a>.', 'AskThis'); ?></p>
                    </td>
                </tr>
            </table>

            <?php  submit_button(); ?>
        </form>
    </div>
    <?php
}

add_action( 'wp_enqueue_scripts', 'askthis_include_js_and_css' );

function askthis_include_js_and_css() {

    wp_enqueue_script( 'askthis-js', ASKTHIS__PLUGIN_DIR_PATH . '/assets/js/askThis.min.js', '', '0.2' );
    wp_enqueue_style(' AskThis', ASKTHIS__PLUGIN_DIR_PATH . '/assets/css/askThis.css', '', '0.1');
    if (get_option('askthis_use_fontawesome' , 0)) {
        wp_enqueue_style('fontAwesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', '', '4.7');
    }
}



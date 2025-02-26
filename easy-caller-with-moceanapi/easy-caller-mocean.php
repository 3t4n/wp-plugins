<?php
/*
  Plugin Name: Easy Caller with MoceanAPI
  Plugin URI: http://moceanapi.com
  Description: Simple and effective plugin that allows you to integrate click-to-call options into your existing WordPress theme using Mocean's Voice API.
  Version: 1.1.0
  Author: MoceanAPI
  Author URI: https://moceanapi.com/
  License: GPLv2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( ! function_exists( 'ecwm_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ecwm_fs() {
        global $ecwm_fs;

        if ( ! isset( $ecwm_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/lib/freemius/start.php';

            $ecwm_fs = fs_dynamic_init( array(
                'id'                  => '10843',
                'slug'                => 'easy-caller-with-moceanapi',
                'type'                => 'plugin',
                'public_key'          => 'pk_d25d32f513e9916dc09eb67a434d0',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'emc',
                    'first-path'     => 'admin.php?page=emc',
                    'account'        => false,
                    'contact'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $ecwm_fs;
    }

    // Init Freemius.
    ecwm_fs();
    // Signal that SDK was initiated.
    do_action( 'ecwm_fs_loaded' );
}

define('EMC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('EMC_PLUGIN_PATH', plugin_dir_path(__FILE__));

require_once ('lib/vendor/autoload.php');

if (!class_exists('EMC')) {
    class EMC {
        public function __construct() {
            add_action('admin_menu', array($this, 'emc_settings_page'));
            require_once ('includes/shortcodes.php');
            require_once ('includes/ajax.php');
            add_action('wp_enqueue_scripts', array($this, 'emc_script'));
            add_action('admin_enqueue_scripts', array($this, 'emc_settings_style'));
        }
        public function emc_settings_style() {
            wp_enqueue_style('emc-settings-style', EMC_PLUGIN_URL . 'css/admin.css');
            wp_enqueue_script('emc-setting-script', EMC_PLUGIN_URL . 'js/admin.js');
        }
        public function emc_script() {
            ?>
            <script>
                var ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
                var countries = <?php if(get_option('emc_setting_countries')){ echo json_encode(preg_split('/\n|\r\n?/', get_option('emc_setting_countries'))); } else {echo json_encode(array('us', 'ca'));} ?>;
            </script>
            <?php
            wp_enqueue_style('emc-css', EMC_PLUGIN_URL . 'css/frontend.css');
            wp_enqueue_style('emc-phone-css', EMC_PLUGIN_URL . 'css/intlTelInput.css');
            wp_enqueue_script('emc-phone', EMC_PLUGIN_URL . 'js/intlTelInput.min.js', array('jquery'));
            wp_enqueue_script('emc-util', EMC_PLUGIN_URL . 'js/utils.js');
            wp_enqueue_script('emc-script', EMC_PLUGIN_URL . 'js/emc-script.js');
        }
        public function emc_settings_page() {
            add_menu_page('Easy Caller', 'Easy Caller', 'manage_options', 'emc', array($this, 'emc_settings_page_func'), 'dashicons-phone');
        }

        public function emc_settings_page_func() {

            if(ecwm_fs()->is_tracking_allowed()) {
                ?>
                    <!-- Yandex.Metrika counter -->
                    <script type="text/javascript" >
                    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
                    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

                    ym(89906647, "init", {
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true,
                            webvisor:true
                    });
                    </script>
                    <noscript><div><img src="https://mc.yandex.ru/watch/89906647" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                    <!-- /Yandex.Metrika counter -->
                <?php
            }

            ?>
            <div class="emc_settings" style="margin-top: 20px;">
                <div class="welcome-panel">
                    <div class="welcome-panel-content" >
                        <div class="welcome-panel-column-container" >
                            <div class="welcome-panel-column">
                                <h1>Easy Caller with MoceanAPI</h1>
                                <h4>Website: <a href="https://moceanapi.com/" target="_blank">MoceanAPI</a></h4>
                                <p>Easy Caller uses Mocean Voice API to connect calls with you and your customers both easily and efficiently.</p>
                                <p>Full Plugin Step by Step Tutorial: <a href="https://dl.dropboxusercontent.com/s/ii9mdj1vsos7m0o/emccaller%20step%20by%20step%20tutorial.docx?dl=0" target="_blank">Documentation (Step by Step Tutorial)</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <form method="post" class="form-table">
                <?php
                if( isset( $_POST['setting_emc_nonce'] ) && wp_verify_nonce( $_POST['setting_emc_nonce'], 'emc_form_nonce') ) {
                    if( !($_POST['setting_emc_account_sid']) || !($_POST['setting_emc_auth_token'])) {
                        echo  '<div class="error notice is-dismissible"><p>';
                        _e( 'You cannot leave your API Key or API Secret empty!', 'emc-plugin' ) ;
                        echo '</p> </div>';
                    } elseif (!($_POST['setting_emc_number'])) {
                        echo  '<div class="error notice is-dismissible"><p>';
                        _e( 'You cannot leave the endpoint phone number field empty!', 'emc-plugin' );
                        echo '</p> </div>';
                    } else {
                        update_option('emc_setting_number', sanitize_text_field(preg_replace('/[^0-9]+/', '', $_POST['setting_emc_number'])));
                        update_option('emc_setting_welcome', sanitize_text_field($_POST['setting_emc_welcome']));
                        update_option('emc_setting_account_sid', sanitize_text_field($_POST['setting_emc_account_sid']));
                        update_option('emc_setting_auth_token', sanitize_text_field($_POST['setting_emc_auth_token']));
                        update_option('emc_setting_countries', sanitize_textarea_field($_POST['setting_emc_countries']));
                        echo  '<div class="updated settings-error notice is-dismissible"><p>';
                        _e( 'Settings updated successfully.', 'emc-plugin' );
                        echo '</p> </div>';
                    }
                 }
                ?>
                <ul class="emc-tab-bar nav-tab-wrapper  wp-clearfix">
                    <li class="emc-tab-active"><a href="#tabs-1"><?php _e( 'General Settings', 'emc-plugin' ); ?></a></li>
                    <li><a href="#tabs-2"><?php _e( 'Call Settings', 'emc-plugin' ); ?></a></li>
                    <li><a href="#tabs-5"><?php _e( 'Shortcodes', 'emc-plugin' ); ?></a></li>
                </ul>
                <div class="emc-tab-panel" id="tabs-1">
                    <h3><?php _e( 'General Settings', 'emc-plugin' ); ?></h3>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th><label for="setting_emc_account_sid"><?php _e( 'API Key', 'emc-plugin' ); ?></label></th>
                                <td>
                                    <input value="<?php echo esc_attr(get_option('emc_setting_account_sid')); ?>" name="setting_emc_account_sid" type="text" class="regular-text"/>
                                    <p class="description"><?php _e( 'You can get your API Key from:', 'emc-plugin' ); ?> <a target="_blank" href='https://dashboard.moceanapi.com/'>https://dashboard.moceanapi.com</a></p>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="setting_emc_auth_token"><?php _e( 'API Secret', 'emc-plugin' ); ?></label></th>
                                <td>
                                    <input value="<?php echo esc_attr(get_option('emc_setting_auth_token')); ?>" name="setting_emc_auth_token" type="password" class="regular-text"/>
                                    <p class="description"><?php _e( 'You can get your Account API Secret from:', 'emc-plugin' ); ?> <a target="_blank" href='https://dashboard.moceanapi.com/'>https://dashboard.moceanapi.com</a></p>
                                </td>
                            </tr>

                            <tr>
                                <th><label for="setting_emc_auth_token"><?php _e( 'Country List', 'emc-plugin' ); ?></label></th>
                                <td>
                                    <textarea name="setting_emc_countries" rows="15" cols="5"><?php echo esc_attr(get_option('emc_setting_countries')); ?></textarea>
                                    <p class="description"><?php _e( 'Enter the 2 letters country code for the list of countries that appear in the phone input field.<br><strong>Example:</strong> my -> for Malaysia. Complete list of country codes here: <a href="https://pastebin.com/LyTzvxAK" target="_blank">Country List Codes</a><br>
                                    <strong>Please Note:</strong> This is is only to display the country flags in the select dropdown.', 'emc-plugin' ); ?> </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="emc-tab-panel" id="tabs-2" style="display: none;">
                    <h3><?php _e( 'Call Settings', 'emc-plugin' ); ?></h3>
                    <table>
                        <tbody>
                            <tr>
                                <th><label for="setting_emc_number"><?php _e( 'Endpoint Phone Number', 'emc-plugin' ); ?></label></th>
                                <td>
                                    <input value="<?php echo esc_attr(get_option('emc_setting_number')); ?>" name="setting_emc_number" type="text" class="regular-text"/>
                                    <p class="description"><?php _e( 'Where you want to redirect your customer\'s call to? (Example: your company\'s contact number)', 'emc-plugin' ); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th><label for="setting_emc_welcome"><?php _e( 'Welcome Message', 'emc-plugin' ); ?></label></th>
                                <td>
                                    <input value="<?php echo esc_attr(get_option('emc_setting_welcome')); ?>" name="setting_emc_welcome" type="text" class="regular-text"/>
                                    <p class="description"><?php _e( 'Welcome message to be played when connecting visitor to your endpoint number. If left blank nothing will be played.', 'emc-plugin' ); ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="emc-tab-panel" id="tabs-5" style="display: none;">
                    <h3><?php _e( 'Shortcode Instructions', 'emc-plugin' ); ?></h3>
                    <table class="update-nag">
                        <tbody>
                            <tr>
                                <td><b><?php _e( 'ShortCode for Easy Caller:', 'emc-plugin' ); ?> </b> [easycall label='Click To Call' number='<?php
                                    if(get_option('emc_setting_number') ){
                                        echo esc_attr(get_option('emc_setting_number'));
                                    }else{
                                        _e('please key in your endpoint phone number at Call Settings page', 'emc-plugin');
                                    }
                                    ?>']<?php _e('<br><br><b>' . '<small>Note:</b> You can change the "label" to anything such as "Call Me" or "Click Here to Call" etc and the "number" is <br>basically your endpoint number, just make sure it is valid when setting it in the "Call Settings" page.</small></td>', 'emc-plugin');?>
                            </tr>
                        </tbody>
                    </table>
					<br>
					<ol><b><u><?php _e('Instructions', 'emc-plugin');?> </u></b>
						<?php _e('<li>' . 'Copy the shortcode above' . '</li>', 'emc-plugin');?>
						<?php _e('<li>' . 'Go into edit mode on the page you want the plugin to appear at' . '</li>', 'emc-plugin')?>
						<?php _e('<li>' . 'Click on the "+" icon on the top left in edit mode' . '</li>', 'emc-plugin')?>
						<?php _e('<li>' . 'Select "shortcode" and a box should appear on your page' . '</li>', 'emc-plugin')?>
						<?php _e('<li>' . 'Paste in the shortcode you copied earlier' . '</li>', 'emc-plugin')?>
						<?php _e('<li>' . 'Click on "Update" after you are done' . '</li>', 'emc-plugin')?>
						<?php _e('<li>' . 'Repeat the steps above whenever you change your endpoint number in the "Call Settings" page' . '</li>', 'emc-plugin')?>
					</ol>
					<br>
					<div class="instructions"><span style="color:black;"></span></div>
                <br>
                </div>
                    <p class="submit">
                        <?php $emc_add_meta_nonce = wp_create_nonce( 'emc_form_nonce' ); ?>
                        <input type="hidden" name="setting_emc_nonce" value="<?php echo $emc_add_meta_nonce; ?>">
                        <input type="submit" value="<?php _e( 'Save Changes', 'emc-plugin' ); ?>" class="button button-primary">
                    </p>
                <hr/>
                </form>
            </div>

            <?php
        }
    }
    $mocean = new EMC();
}

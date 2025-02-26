<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

/////////////////////////////
//  SAVING THE SETTINGS
/////////////////////////////

if ( !empty($_POST) && check_admin_referer( 'fc_save_settings', 'fc_settings' ) ) {

    // Check apiusr
    $safe_apiusr = intval( $_POST['fc_apiusr'] );
    if ( !$safe_apiusr ) {
        $safe_apiusr = '';
    }

    // Check apikey
    $safe_apikey = sanitize_key($_POST['fc_apikey']);

    // Check apiurl
    $safe_apiurl = esc_url($_POST['fc_apiurl']);

    // Check playerurl
    $safe_playerurl = esc_url($_POST['fc_playerurl']);

    // Check playertype
    $safe_playertype = sanitize_text_field($_POST['fc_playertype']);

    // Save options
    update_option('fc_apiusr', $safe_apiusr);
    update_option('fc_apikey', $safe_apikey);
    update_option('fc_apiurl', $safe_apiurl);
    update_option('fc_playerurl', $safe_playerurl);
    update_option('fc_playertype', $safe_playertype);

    echo '<div id="notice" class="updated notice is-dismissible"><p><strong>' . __('Saved settings', 'freecaster') . '.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">' . __('Dismiss this message', 'freecaster') . '.</span></button></div>';

}

/////////////////////////////
// GET SETTINGS FROM WP
/////////////////////////////

$apiurl = get_option('fc_apiurl');
$apiusr = get_option('fc_apiusr');
$apikey = get_option('fc_apikey');
$fc_playerurl  = get_option('fc_playerurl');
$fc_playertype = get_option('fc_playertype');

////////////////////////
// LIVE CHECK API
////////////////////////

include_once(plugin_dir_path(__FILE__) . 'FCAPItools.php');
$FreecasterAPI = new FCAPItools();
$APIstate = json_decode( $FreecasterAPI->SearchVideos() );

////////////////////////
//  CHECK THE SETTINGS
////////////////////////

if ( empty($apiurl) OR empty($apiusr) OR empty($apikey) ) {

    echo '<div id="notice" class="error notice is-dismissible"><p><strong>' . sprintf( __('Settings missing, please contact Freecaster if you do not have yet', 'freecaster'), '<a href="mailto:api@freecaster.com">api@freecaster.com</a>' ) . '.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">' . __('Dismiss this message', 'freecaster') . '.</span></button></div>';
    $APIstate->text  = "<img id='notice-icon' src='" . plugin_dir_url( __FILE__ ) . "img/problem.png' />";
    $APIstate->text .= __('API Error: Missing parameters', 'freecaster');

}

?>

<style>
    #notice {
        margin-top: 16px;
    }
    #notice-icon {
        margin: 0 5px -3px 0;
    }
</style>

<!-- -------------------- -->
<!--  PARAMETERS FORM     -->
<!-- -------------------- -->

<div class="wrap">

    <form method="POST">

        <h1><?php _e('API Settings', 'freecaster'); ?></h1>

        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="fc_apiusr"><?php _e('API user', 'freecaster'); ?></label></th>
                <td><input type="text" name="fc_apiusr" id="fc_apiusr" value="<?php echo $apiusr; ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="fc_apikey"><?php _e('API key', 'freecaster'); ?></label></th>
                <td><input type="text" name="fc_apikey" id="fc_apikey" value="<?php echo $apikey; ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="fc_apiurl"><?php _e('API url', 'freecaster'); ?></label></th>
                <td><input type="url" name="fc_apiurl" id="fc_apiurl" value="<?php echo $apiurl; ?>" class="regular-text code" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="fc_apichk"><?php _e('API state', 'freecaster'); ?></label></th>
                <td><?php echo $APIstate->text; ?></td>
            </tr>
            </tbody>
        </table>

        <h1><?php _e('Player Settings', 'freecaster'); ?></h1>

        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="fc_playerurl"><?php _e('Player url', 'freecaster'); ?></label></th>
                <td><input type="text" name="fc_playerurl" id="fc_playerurl" value="<?php echo $fc_playerurl; ?>" class="regular-text code" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="fc_playertype"><?php _e('Player protocol', 'freecaster'); ?></label></th>
                <td><input type="radio" name="fc_playertype" value="http"  <?php echo ($fc_playertype == 'http' ? 'checked' : '') ?>> <b>http</b><span style="color: #ccc;">:<?php echo $fc_playerurl; ?></span><br>
                    <input type="radio" name="fc_playertype" value="https" <?php echo ($fc_playertype == 'https' ? 'checked' : '') ?>> <b>https</b><span style="color: #ccc;">:<?php echo $fc_playerurl; ?></span></td>
            </tr>
            </tbody>
        </table>

        <?php wp_nonce_field('fc_save_settings', 'fc_settings'); ?>

        <?php submit_button(); ?>

    </form>

</div>

<script>
    jQuery(document).ready(function($)
    {
        $('input[type="radio"]').click(function()
        {
            $('input[type="radio"]').removeAttr("checked");
            $(this).attr("checked", "checked");
        });
    });
</script>
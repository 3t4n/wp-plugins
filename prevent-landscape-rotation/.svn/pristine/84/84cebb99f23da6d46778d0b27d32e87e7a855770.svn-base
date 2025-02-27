<?php
if (!defined('ABSPATH'))
{
    die('-1');
}
/**
 * @package Prevent Landscape Rotation
 * @version 2.1
 * @since 1.0
 */
if (!current_user_can('manage_options'))
{
    wp_die(__('You do not have sufficient permissions to access this page.'));
}
?>
<div class="wrap">
<h1><?php echo esc_html('Prevent Landscape Rotation Settings', 'prevent-landscape-rotation'); ?></h1>
<?php
$apj_plr_default_message = APJ_PLR_DEFAULT_MESSAGE;
$apj_plr_message         = APJ_PLR_OPT_MESSAGE;
$apj_plr_bg_clr_code     = APJ_PLR_OPT_BG_COLOR_CODE;
$apj_plr_txt_clr_code    = APJ_PLR_OPT_TXT_COLOR_CODE;
if( isset($_POST["submit"]) && $_POST['action'] == 'apj_form_response') {
if ( isset( $_POST['apj_add_user_meta_nonce'] ) && wp_verify_nonce( $_POST['apj_add_user_meta_nonce'], 'apj_add_user_meta_form_nonce'))
{
    $plr_message_show    = trim($_POST[$apj_plr_message]);
    $plr_message_show    = strip_tags( stripslashes($plr_message_show));
    $plr_message_show    = sanitize_text_field($plr_message_show);
    $plr_bg_clr          = trim($_POST[$apj_plr_bg_clr_code]);
    $plr_bg_clr          = strip_tags( stripslashes($plr_bg_clr));
    $plr_bg_clr          = sanitize_text_field($plr_bg_clr);
    $plr_txt_clr         = trim($_POST[$apj_plr_txt_clr_code]);
    $plr_txt_clr         = strip_tags( stripslashes($plr_txt_clr));
    $plr_txt_clr         = sanitize_text_field($plr_txt_clr);
    update_option($apj_plr_message, $plr_message_show);
    update_option($apj_plr_bg_clr_code, $plr_bg_clr);
    update_option($apj_plr_txt_clr_code, $plr_txt_clr);
    echo '<div id="message" class="updated fade"><p>Settings saved.</p></div>';
}
    else
    {
        wp_die( __( 'Invalid. Please try again', APJ_PLR_MENU_SLUG ), __( 'Error', APJ_PLR_MENU_SLUG ), array(
            'response' 	=> 403,
            'back_link' => 'options-general.php?page=' . APJ_PLR_MENU_SLUG,

        ) );
    }
}
$plr_message_show = get_option($apj_plr_message);
$plr_bg_clr       = get_option($apj_plr_bg_clr_code);
$plr_txt_clr      = get_option($apj_plr_txt_clr_code);
// Generate a custom nonce value.
$apj_add_meta_nonce = wp_create_nonce( 'apj_add_user_meta_form_nonce' );
?>
<div>
    <fieldset>
        <form method="post">
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row"><label for="<?php echo $apj_plr_message; ?>">Enter New Message :</label></th>
                        <td>
                            <textarea id="<?php echo $apj_plr_message; ?>" name="<?php echo $apj_plr_message; ?>" class="regular-text" rows="3" required><?php echo (empty($plr_message_show) ? esc_attr($apj_plr_default_message) : esc_attr($plr_message_show)); ?></textarea>
                            <input type="hidden" name="action" value="apj_form_response">
		                    <input type="hidden" name="apj_add_user_meta_nonce" value="<?php echo $apj_add_meta_nonce ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="<?php echo $apj_plr_bg_clr_code; ?>">Enter Background Color Code :</label></th>
                        <td>
                            <input type="text" value="<?php echo (empty($plr_bg_clr) ? 'rgba(216, 216, 216, 0.94)' : esc_attr($plr_bg_clr)); ?>" id="<?php echo $apj_plr_bg_clr_code; ?>" name="<?php echo $apj_plr_bg_clr_code; ?>" class="my-color-field" data-alpha-enabled="true" data-default-color="rgba(216, 216, 216, 0.94)" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="<?php echo $apj_plr_txt_clr_code; ?>">Enter Text Color Code :</label></th>
                        <td>
                            <input type="text" value="<?php echo (empty($plr_txt_clr) ? '#000000' : esc_attr($plr_txt_clr)); ?>" id="<?php echo $apj_plr_txt_clr_code; ?>" name="<?php echo $apj_plr_txt_clr_code; ?>" class="my-color-field" data-default-color="#000000" />
                        </td>
                    </tr>
                </tbody></table>
                <p class="submit"><?php submit_button(); ?></p>
            </form>
        </fieldset>
    </div>
</div>
<?php
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( '../assets/js/wp-color-picker-alpha.min.js',  __FILE__ ), array( 'wp-color-picker' ), '3.0.0', true );
    wp_enqueue_script( 'wp-color-picker-init',  plugins_url( '../assets/js/wp-color-picker-script.js',  __FILE__ ), array( 'wp-color-picker-alpha' ), '3.0.0', true );
?>

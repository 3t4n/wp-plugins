<?php
if (!defined('ABSPATH'))
{
    die('-1');
}
/**
 * @package Publish Confirm Message
 * @version 2.0
 * @since 1.0
 */
if (!current_user_can('manage_options'))
{
    wp_die(__('You do not have sufficient permissions to access this page.'));
}
?>
<div class="wrap">
<h1>Publish Confirm Message Settings</h1>
<?php
$apj_pcm_default_message = APJ_PCM_DEFAULT_MESSAGE;
$apj_pcm_opt_name        = APJ_PCM_OPT_NAME;
if( isset($_POST["submit"]) && $_POST['action'] == 'apj_form_response') {
    if ( isset( $_POST['apj_add_user_meta_nonce'] ) && wp_verify_nonce( $_POST['apj_add_user_meta_nonce'], 'apj_add_user_meta_form_nonce'))
    {
    $pcm_message_show    = sanitize_text_field($_POST[$apj_pcm_opt_name]);
    update_option($apj_pcm_opt_name, $pcm_message_show);
    echo '<div id="message" class="updated fade"><p>Message saved.</p></div>';
}
else
{
    wp_die( __( 'Invalid. Please try again', APJ_PCM_MENU_SLUG ), __( 'Error', APJ_PCM_MENU_SLUG ), array(
        'response' 	=> 403,
        'back_link' => 'options-general.php?page=' . APJ_PCM_MENU_SLUG,

    ) );
}
}
else
{
    $pcm_message_show = get_option($apj_pcm_opt_name);
}
// Generate a custom nonce value.
$apj_add_meta_nonce = wp_create_nonce( 'apj_add_user_meta_form_nonce' );
?>
<div>
    <fieldset>
        <form method="post">
            <table class="form-table" role="presentation">
                <tbody><tr>
                    <th scope="row"><label for="<?php echo $apj_pcm_opt_name; ?>">Enter New Message :</label></th>
                    <td> <input type="text" id="<?php echo $apj_pcm_opt_name; ?>" name="<?php echo $apj_pcm_opt_name; ?>" value="<?php echo (empty($pcm_message_show) ? esc_attr($apj_pcm_default_message) : esc_attr($pcm_message_show)); ?>" class="regular-text" required/>
                    <input type="hidden" name="action" value="apj_form_response">
		            <input type="hidden" name="apj_add_user_meta_nonce" value="<?php echo $apj_add_meta_nonce ?>" /></td>
                </tr>
            </tbody></table>
            <p class="submit"><?php submit_button(); ?></p>
        </form>
    </fieldset>
</div>
</div>

<?php
$email_back_url = add_query_arg(
    array(
        'page'     => 'chat_integration',
    ),
    admin_url('admin.php')
);
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $tawk_to_script = ($_POST['tawk_to_script']);
    update_option('tawk_to_script', wp_unslash($tawk_to_script));
    echo '<div class="notice notice-success is-dismissible"><p>Script saved successfully.</p></div>';
}
?>
<div class="autochat-edit-wrap">
    <form method="post" action="">
        <?php wp_nonce_field('save_tawk_to_script', 'tawk_to_script_nonce'); ?>
        <div class="back-to-settings">
            <a href="<?php echo esc_url($email_back_url); ?>"><span class="dashicons dashicons-arrow-left-alt"></span>Back</a>
        </div>
        <div class="enable-toggle">
            <label class="achat-form-toggle">
                <input type="hidden" name="achat-greetings" value="on">
                <input type="checkbox" value="on" checked="checked" class="achat-form-toggle-input">
                <span class="achat-form-toggle-control"></span>
            </label>
        </div>
        <div class="input-field-body">
            <p class="field-desc">Add embeded code here</p>
            <label for="tawk_to_script">
                <p class="settings-field-title">embeded code</p>
            </label>
            <textarea name="tawk_to_script" id="tawk_to_script" cols="50" rows="6" placeholder="tawk script text"><?php echo get_option('tawk_to_script');?></textarea>
        </div>
        
        <div class="separator"></div>
        <div class="brn-area">
            <button class="">
                Reset
            </button>
            <input type="submit" class="button-save" value="Save Changes" />
        </div>
    </form>
</div>


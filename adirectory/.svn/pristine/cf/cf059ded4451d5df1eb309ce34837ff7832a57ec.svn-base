<form id="lostpasswordform" action="<?php echo esc_url(site_url('wp-login.php?action=lostpassword', 'login_post')); ?>"
    method="post">
    <div class="adqs-form-fields">
        <label for="user_login"><?php _e('Enter your username or email address:', 'text-domain'); ?></label>
        <div class="adqs-input-wrapper">
            <input type="text" name="user_login" id="user_login" autocomplete="username" required size="20">
        </div>
    </div>

    <p class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
            value="<?php _e('Reset Password', 'text-domain'); ?>">
        <input type="hidden" name="redirect_to" value="<?php echo esc_url(site_url('/login/?reset=true')); ?>">
    </p>

</form>
<?php
if (!defined('ABSPATH')) {
    exit;
} ?>
<div class="ambikly-login">
    <form method="post" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>">
        <p>
            <label for="user_login"><?php echo esc_html__('Username', 'ambikly'); ?><br/>
                <input type="text" name="log" id="user_login" class="input" value="" size="20"/></label>
        </p>
        <p>
            <label for="user_pass"><?php echo esc_html__('Password', 'ambikly'); ?><br/>
                <input type="password" name="pwd" id="user_pass" class="input" value="" size="20"/></label>
        </p>
        <p>
            <label for="rememberme">
                <input name="rememberme" type="checkbox" id="rememberme"
                       value="forever"/> <?php echo esc_html__('Remember Me', 'ambikly'); ?>
            </label>
        </p>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                   value="<?php echo esc_html__('Log In', 'ambikly'); ?>"/>
            <input type="hidden" name="redirect_to" value="<?php echo esc_url(ambikly_get_account_page(true)); ?>"/>
        </p>
    </form>
</div>
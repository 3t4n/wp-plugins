<?php

require_once(realpath(__DIR__ . '/../review.php'));
/**
 * Created by PhpStorm.
 * User: Sanchoss
 * Date: 2019-04-08
 * Time: 20:22
 */

function mightyforms_run_forms()
{
    $redirect_url = get_admin_url(null, 'admin.php?page=mightyforms');

    $api_key = get_option('mightyforms_api_key');

    if (!$api_key) {
        echo '<h4>You have not set your API key. Go to <a href="' . esc_url($redirect_url) . '">application</a> and sign up or sign in.</h4>';
        exit;
    }

    $raw_user_forms = wp_remote_get('https://app.mightyforms.com/api/v1/mf/' . $api_key . '/forms', array(
        'timeout'   => 60,
        'sslverify' => false
    ));

    $user_forms = json_decode($raw_user_forms['body'], true);

    if ($user_forms['success']) {
        $user_id = wp_get_current_user()->ID;
        if (time() - MF_WEEK_IN_SECONDS > (int)get_user_meta($user_id, 'mf_next_schedule_review_notice_time')) {
            mf_ask_to_leave_review_handler();
        }
    }
    ?>

    <div class="mf-main-block">
        <div class="mf-message-box">
            <p>
                Look's like you're using Safari. In some cases you may face with signing in problems.
                To resolve it, go to Safari &rarr; Preferences &rarr; Privacy and uncheck "Prevent cross-site
                tracking"</p>
            <span>&#10005;</span>
        </div>

        <div class="row mf-header">
            <div class="container">
                <img src="<?php echo esc_url(plugins_url('../images/logo.svg', __FILE__)); // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>" alt="Logo">
            </div>
        </div>

        <div class="forms-box container">
            <?php
            if ($user_forms['success']) { ?>
                <div class="mf-forms-control-block">
                    <h3>Your forms and shortcodes.</h3>
                    <button>Reconnect</button>
                    <?php wp_nonce_field('user_api_key', 'mf_reconnect'); ?>
                </div>
                <p>If you want to show your form in a page or post - just copy the form's shortcode and paste it into
                    your
                    visual editor. That's it!</p>
                <table id="user_forms" class="display">
                    <thead>
                    <tr>
                        <td>Form name</td>
                        <td>Shortcode</td>
                        <td>Last editor</td>
                        <td>Last modified</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($user_forms['data'] as $forms) {
                        ?>
                        <tr>
                            <td><?php echo esc_html($forms['project_name']) ?></td>
                            <td> [mightyforms id="mf-<?php echo esc_attr($forms['project_id']) ?>"]</td>
                            <td> <?php echo isset($forms['last_modified_username']) ? esc_html($forms['last_modified_username']) : '' ?></td>
                            <td> <?php echo isset($forms['last_modified']) ? esc_html($forms['last_modified']) : '' ?></td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
                <?php
            } elseif (isset($user_forms) && isset($user_forms['error'])) {
                echo '<h4>' . esc_html($user_forms['error']) . '</h4>';

                if ($user_forms['error'] === 'You have not data yet') { ?>
                    <a href="https://app.mightyforms.com/create-form" target="_blank" class="mf-create-new-form">Create
                        New Form</a>
                <?php }
            } ?>
        </div>
    </div>
    <?php
}

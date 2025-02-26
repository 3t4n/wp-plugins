<?php
add_action('admin_menu', 'autoblogger_add_admin_menu');

function autoblogger_add_admin_menu()
{
    $svg_icon_base64 = 'data:image/svg+xml;base64,' . base64_encode('<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.871948 4.36808C0 6.07937 0 8.31958 0 12.8V19.2C0 23.6804 0 25.9206 0.871948 27.6319C1.63893 29.1372 2.86278 30.3611 4.36808 31.1281C6.07937 32 8.31958 32 12.8 32H19.2C23.6804 32 25.9206 32 27.6319 31.1281C29.1372 30.3611 30.3611 29.1372 31.1281 27.6319C32 25.9206 32 23.6804 32 19.2V12.8C32 8.31958 32 6.07937 31.1281 4.36808C30.3611 2.86278 29.1372 1.63893 27.6319 0.871948C25.9206 0 23.6804 0 19.2 0H12.8C8.31958 0 6.07937 0 4.36808 0.871948C2.86278 1.63893 1.63893 2.86278 0.871948 4.36808ZM24.0769 28H23.9231C23.4133 28 23 27.5867 23 27.0769V4.92308C23 4.41328 23.4133 4 23.9231 4H24.0769C24.5867 4 25 4.41327 25 4.92308V27.0769C25 27.5867 24.5867 28 24.0769 28ZM6.2771 23L11.9171 9H15.0171L20.7171 23H17.4771L16.5771 20.7H10.3971L9.5171 23H6.2771ZM11.3371 18.02H15.6371L13.4971 12.38H13.4571L11.3371 18.02Z" fill="#100E10"/></svg>');
    add_menu_page('AutoBlogger Settings', 'AutoBlogger', 'manage_options', 'autoblogger', 'autoblogger_admin_page', $svg_icon_base64, 6);
}

function autoblogger_admin_page() {
    $client = new AutoBloggerAPIClient();
    $tokenStatus = $client->validateApiKey() ? 'Valid' : 'Invalid';
    update_option('autoblogger_token_status', $tokenStatus);
    
    $lastTokenCheck = current_time('mysql');
    update_option('autoblogger_last_token_check', $lastTokenCheck);

    $lastSync = get_option('autoblogger_last_sync', 'Never');
    $nextScheduled = wp_next_scheduled('autoblogger_fetch_posts_hook');

    $lastSyncUTC = $lastSync !== 'Never' ? get_gmt_from_date($lastSync, 'Y-m-d H:i:s') : 'Never';
    $nextScheduledUTC = $nextScheduled ? gmdate('Y-m-d H:i:s', $nextScheduled) : 'Not scheduled';

    autoblogger_enqueue_admin_script($lastSyncUTC, $nextScheduledUTC, $tokenStatus, $lastTokenCheck);

    ?>
    <div class="wrap">
        <div style="display: flex; align-items: center;">
            <h1>AutoBlogger Plugin</h1>
            <svg style="padding-left: 10px;" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_5270_37193)">
                    <path d="M0 12.8C0 8.31958 0 6.07937 0.871948 4.36808C1.63893 2.86278 2.86278 1.63893 4.36808 0.871948C6.07937 0 8.31958 0 12.8 0H19.2C23.6804 0 25.9206 0 27.6319 0.871948C29.1372 1.63893 30.3611 2.86278 31.1281 4.36808C32 6.07937 32 8.31958 32 12.8V19.2C32 23.6804 32 25.9206 31.1281 27.6319C30.3611 29.1372 29.1372 30.3611 27.6319 31.1281C25.9206 32 23.6804 32 19.2 32H12.8C8.31958 32 6.07937 32 4.36808 31.1281C2.86278 30.3611 1.63893 29.1372 0.871948 27.6319C0 25.9206 0 23.6804 0 19.2V12.8Z" fill="url(#paint0_linear_5270_37193)"/>
                    <path d="M6.2771 23L11.9171 9H15.0171L20.7171 23H17.4771L16.5771 20.7H10.3971L9.5171 23H6.2771ZM11.3371 18.02H15.6371L13.4971 12.38H13.4571L11.3371 18.02Z" fill="white"/>
                    <path d="M24.0769 28H23.9231C23.4133 28 23 27.5867 23 27.0769V4.92308C23 4.41328 23.4133 4 23.9231 4H24.0769C24.5867 4 25 4.41327 25 4.92308V27.0769C25 27.5867 24.5867 28 24.0769 28Z" fill="white"/>
                </g>
                <defs>
                    <linearGradient id="paint0_linear_5270_37193" x1="32" y1="0" x2="0" y2="32" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FF8E00"/>
                        <stop offset="0.333689" stop-color="#FF5A80"/>
                        <stop offset="0.72863" stop-color="#A66FFF"/>
                        <stop offset="1" stop-color="#00CBBF"/>
                    </linearGradient>
                    <clipPath id="clip0_5270_37193">
                        <rect width="32" height="32" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </div>
        <form method="post" action="options.php">
            <?php
            settings_fields('autoblogger_options');
            do_settings_sections('autoblogger');
            submit_button('Save Changes');
            ?>
        </form>
        <p>Last Token Check: <strong id="lastTokenCheck"><?php echo esc_html($lastTokenCheck); ?></strong></p>
        <p>Token Status: <strong id="tokenStatus"><?php echo esc_html($tokenStatus); ?></strong></p>
        <p>Last Sync: <strong id="lastSync"><?php echo esc_html($lastSyncUTC); ?></strong></p>
        <p>Next Scheduled Sync: <strong id="nextScheduled"><?php echo esc_html($nextScheduledUTC); ?></strong></p>
        <button id="manualSync" class="button button-primary">Sync Latest Posts</button>
    </div>
    <?php
}

function autoblogger_enqueue_admin_script($lastSyncUTC, $nextScheduledUTC, $tokenStatus, $lastTokenCheck) {
    wp_enqueue_script('jquery');
    
    wp_register_script('autoblogger-admin-js', false, [], '1.0.0', true);

    wp_localize_script('autoblogger-admin-js', 'autobloggerData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('autoblogger_nonce'),
        'lastSync' => $lastSyncUTC,
        'nextScheduled' => $nextScheduledUTC,
        'tokenStatus' => $tokenStatus,
        'lastTokenCheck' => $lastTokenCheck,
    ));

    $inline_script = "
        jQuery(document).ready(function ($) {
            const formatLocalTime = (utcString) => {
                if (utcString === 'Never' || utcString === 'Not scheduled') {
                    return utcString;
                }
                const utcDate = new Date(utcString + ' UTC');
                return utcDate.toLocaleString();
            };

            // Convert UTC times to local times
            $('#lastSync').text(formatLocalTime(autobloggerData.lastSync));
            $('#nextScheduled').text(formatLocalTime(autobloggerData.nextScheduled));

            $('#manualSync').click(function () {
                $.ajax({
                    url: autobloggerData.ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'autoblogger_import_old_posts',
                        security: autobloggerData.nonce
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Posts synchronized successfully.');
                        } else {
                            alert('Failed to synchronize posts. Check console for details.');
                            console.error(response.data);
                        }
                    },
                    error: function (xhr) {
                        console.error('Sync Failed:', xhr.responseText);
                        alert('Failed to synchronize posts. Check console for details.');
                    }
                });
            });
        });
    ";
    wp_add_inline_script('autoblogger-admin-js', $inline_script);

    wp_enqueue_script('autoblogger-admin-js');
}

add_action('admin_init', 'autoblogger_admin_init');

function autoblogger_admin_init()
{
    register_setting('autoblogger_options', 'autoblogger_settings');
    add_settings_section('autoblogger_main', 'Settings', 'autoblogger_section_text', 'autoblogger');
    add_settings_field('api_key', 'API Token', 'autoblogger_api_key_field', 'autoblogger', 'autoblogger_main');
    add_settings_field('post_status', 'Default Post Status', 'autoblogger_post_status_field', 'autoblogger', 'autoblogger_main');
    add_settings_field('default_author', 'Default Author', 'autoblogger_default_author_field', 'autoblogger', 'autoblogger_main');
    add_settings_field('post_type', 'Default Post Type', 'autoblogger_post_type_field', 'autoblogger', 'autoblogger_main');
}

function autoblogger_section_text()
{
    echo '<p>Enter your settings below:</p>';
}

function autoblogger_api_key_field()
{
    $options = get_option('autoblogger_settings');
    echo "<input id='api_key' name='autoblogger_settings[api_key]' size='40' type='text' value='" . esc_attr($options['api_key'] ?? '') . "' />";
}

function autoblogger_post_status_field()
{
    $options = get_option('autoblogger_settings');
    $post_status = $options['post_status'] ?? 'draft';
    echo "<select id='post_status' name='autoblogger_settings[post_status]'>";
    echo "<option value='publish'" . selected($post_status, 'publish', false) . ">Publish</option>";
    echo "<option value='draft'" . selected($post_status, 'draft', false) . ">Draft</option>";
    echo "</select>";
}

function autoblogger_default_author_field()
{
    $options = get_option('autoblogger_settings');
    $users = get_users(array('fields' => array('ID', 'display_name')));
    echo "<select id='default_author' name='autoblogger_settings[default_author]'>";
    foreach ($users as $user) {
        $selected = selected($options['default_author'] ?? '', $user->ID, false);
        echo "<option value='" . esc_attr($user->ID) . "'" . ($selected ? ' selected' : '') . ">" . esc_html($user->display_name) . "</option>";
    }
    echo "</select>";
}

function autoblogger_post_type_field()
{
    $options = get_option('autoblogger_settings');
    $post_types = get_post_types(array('public' => true), 'objects');
    echo "<select id='post_type' name='autoblogger_settings[post_type]'>";
    foreach ($post_types as $post_type) {
        $selected = selected($options['post_type'] ?? 'post', $post_type->name, false);
        echo "<option value='" . esc_attr($post_type->name) . "'" . ($selected ? ' selected' : '') . ">" . esc_html($post_type->label) . "</option>";
    }
    echo "</select>";
}
?>

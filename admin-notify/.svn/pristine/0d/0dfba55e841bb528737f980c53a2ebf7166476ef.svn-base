<?php
namespace Eliyahna\AdminNotify; // Ensure this is the very first line in the file

/**
 * Plugin Name: Admin Notify
 * Description: Sends an email notification to the administrator when a new admin is added, an admin's password is changed, an admin is deleted, or an existing user is upgraded or downgraded to an administrator.
 * Version: 1.0.4
 * Author: Eliyahna Creative, LLC
 * Author URI: https://Eliyahna.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define the option name for storing the admin notification email
define('ELIYAHNA_ADMIN_NOTIFY_OPTION', 'eliyahna_admin_notify_email');
define('ELIYAHNA_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

// Add menu item to the admin dashboard
function admin_notify_menu() {
    add_menu_page(
        'Admin Notify',              // Page title
        'Admin Notify',              // Menu title
        'manage_options',            // Capability
        'eliyahna_admin_notify',     // Menu slug
        'Eliyahna\AdminNotify\admin_notify_settings_page', // Function to display the page (note the namespace here)
        'dashicons-email-alt'        // Icon
    );
}
add_action('admin_menu', 'Eliyahna\AdminNotify\admin_notify_menu');

// Settings page
function admin_notify_settings_page() {
    ?>
    <div class="wrap">
        <div style="text-align: left; font-size: 14px; margin-bottom: 10px;">בס״ד</div>
        <h1>Admin Notify Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('eliyahna_admin_notify_options_group');
            do_settings_sections('eliyahna_admin_notify');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Admin Notification Email</th>
                    <td>
                        <input type="email" name="<?php echo esc_attr(ELIYAHNA_ADMIN_NOTIFY_OPTION); ?>" value="<?php echo esc_attr(get_option(ELIYAHNA_ADMIN_NOTIFY_OPTION)); ?>" class="regular-text" required />
                    </td>
                </tr>
            </table>
            
            <?php
            // Add nonce field for security
            wp_nonce_field('eliyahna_admin_notify_save_email', 'eliyahna_admin_notify_nonce');
            ?>
            
            <?php submit_button('Save Changes'); ?>
        </form>
    </div>
    <?php
}

// Register plugin settings with sanitization
function admin_notify_register_settings() {
    register_setting(
        'eliyahna_admin_notify_options_group',  // Option group
        ELIYAHNA_ADMIN_NOTIFY_OPTION,           // Option name
        'sanitize_email'                        // Sanitization callback for email
    );
}
add_action('admin_init', 'Eliyahna\AdminNotify\admin_notify_register_settings');

// Flag to track if email has already been sent to avoid duplicates
$eliyahna_notified_users = [];

// Hook into user updates (admin role changes or password updates)
function admin_notify_user_updated($user_id, $old_user_data) {
    global $eliyahna_notified_users;

    // Prevent duplicate notifications for the same user
    if (in_array($user_id, $eliyahna_notified_users)) {
        return;
    }

    $user = get_user_by('id', $user_id);
    $old_roles = (array) $old_user_data->roles;
    $new_roles = (array) $user->roles;

    // Check if the user is upgraded to admin
    if (in_array('administrator', $new_roles) && !in_array('administrator', $old_roles)) {
        admin_notify_send_email($user, 'Admin Role Upgrade Notification', 'A user has been upgraded to an administrator.');
        $eliyahna_notified_users[] = $user_id;
    }

    // Check if the user is downgraded from admin
    if (!in_array('administrator', $new_roles) && in_array('administrator', $old_roles)) {
        admin_notify_send_email($user, 'Admin Role Downgrade Notification', 'A user has been downgraded from an administrator.');
        $eliyahna_notified_users[] = $user_id;
    }
}
add_action('profile_update', 'Eliyahna\AdminNotify\admin_notify_user_updated', 10, 2);
add_action('user_register', 'Eliyahna\AdminNotify\admin_notify_user_updated', 10, 2);

// Hook into role change (ensure admin role upgrades and downgrades are notified)
function admin_notify_role_changed($user_id, $role) {
    global $eliyahna_notified_users;

    // Prevent duplicate notifications for the same user
    if (in_array($user_id, $eliyahna_notified_users)) {
        return;
    }

    $user = get_user_by('id', $user_id);
    if ($role === 'administrator') {
        admin_notify_send_email($user, 'Admin Role Upgrade Notification', 'A user has been upgraded to an administrator.');
        $eliyahna_notified_users[] = $user_id;
    } else {
        admin_notify_send_email($user, 'Admin Role Downgrade Notification', 'A user has been downgraded from an administrator.');
        $eliyahna_notified_users[] = $user_id;
    }
}
add_action('set_user_role', 'Eliyahna\AdminNotify\admin_notify_role_changed', 10, 2);

// Hook into user deletion (notify when admin account is deleted)
function admin_notify_user_deleted($user_id) {
    $user = get_user_by('id', $user_id);
    if ($user && in_array('administrator', (array) $user->roles)) {
        admin_notify_send_email($user, 'Admin Account Deletion Notification', 'An administrator account has been deleted.');
    }
}
add_action('delete_user', 'Eliyahna\AdminNotify\admin_notify_user_deleted');

// Function to send email notification
function admin_notify_send_email($user, $subject, $message_body) {
    $notify_email = get_option(ELIYAHNA_ADMIN_NOTIFY_OPTION);
    if ($notify_email && is_email($notify_email)) {
        $message = "$message_body\n\n";
        $message .= "Username: " . esc_html($user->user_login) . "\n";
        $message .= "Email: " . esc_html($user->user_email) . "\n";
        $message .= "Date: " . current_time('mysql') . "\n";
        wp_mail($notify_email, $subject, $message);
    }
}

// Save settings (with nonce check)
function admin_notify_save_settings() {
    if ( isset($_POST['eliyahna_admin_notify_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['eliyahna_admin_notify_nonce'])), 'eliyahna_admin_notify_save_email') ) {
        if ( isset($_POST[ELIYAHNA_ADMIN_NOTIFY_OPTION]) ) {
            $email = sanitize_email(wp_unslash($_POST[ELIYAHNA_ADMIN_NOTIFY_OPTION]));
            update_option(ELIYAHNA_ADMIN_NOTIFY_OPTION, $email);
        }
    } else {
        wp_die('Nonce verification failed!');
    }
}
add_action('admin_post_save_eliyahna_admin_notify_settings', 'Eliyahna\AdminNotify\admin_notify_save_settings');

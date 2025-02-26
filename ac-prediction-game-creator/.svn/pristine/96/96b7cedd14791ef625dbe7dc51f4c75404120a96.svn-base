<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ACPGC_auth {

    function __construct() {
        add_shortcode('acpgc_register', array($this, 'acpgc_registration_form'));
        add_action('rest_api_init', array($this, 'acpgc_register_registration_route'));
        add_shortcode('acpgc_login', array($this, 'acpgc_login_form'));
        add_action('rest_api_init', array($this, 'acpgc_register_login_route'));
        add_shortcode('acpgc_reset_password', array($this, 'acpgc_reset_password_form'));
        add_action('rest_api_init', array($this, 'acpgc_reset_password_route'));
    }

    public function acpgc_registration_form() {
        $template = ACPGC_PLUGIN_TEMPLATE_DIR . "/registration-form-template.php";
        ob_start();
        include("$template");
        return ob_get_clean();
    }

    public function acpgc_register_registration_route() {
        register_rest_route('acpgc/v1', '/register', array(
            'methods' => 'POST',
            'callback' => array($this, 'acpgc_handle_custom_registration'),
            'permission_callback' => '__return_true'
        ));
    }

    public function acpgc_handle_custom_registration(WP_REST_Request $request) {
        $username = sanitize_text_field($request->get_param('username'));
        $email = sanitize_email($request->get_param('email'));
        $password = $request->get_param('password');
        $first_name = sanitize_text_field($request->get_param('first_name'));
        $last_name = sanitize_text_field($request->get_param('last_name'));

        if (email_exists($email)) {
            return array(
                'success' => false,
                'message' => 'That email already registered.'
            );
        }

        if (username_exists($username)) {
            return array(
                'success' => false,
                'message' => 'Username already exists.'
            );
        }

        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            return array(
                'success' => false,
                'message' => $user_id->get_error_message()
            );
        }

        update_user_meta($user_id, 'first_name', $first_name);
        update_user_meta($user_id, 'last_name', $last_name);

        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);

        return array(
            'success' => true,
            'message' => 'Registration successful',
            'redirect_url' => home_url()
        );
    }

    public function acpgc_login_form() {
        $template = ACPGC_PLUGIN_TEMPLATE_DIR . "/login-form-template.php";
        ob_start();
        include("$template");
        return ob_get_clean();
    }

    public function acpgc_register_login_route() {
        register_rest_route('acpgc/v1', '/login', array(
            'methods' => 'POST',
            'callback' => array($this, 'acpgc_handle_custom_login'),
            'permission_callback' => '__return_true'
        ));
    }

    public function acpgc_handle_custom_login(WP_REST_Request $request) {
        $username = $request->get_param('username');
        $password = $request->get_param('password');

        $user = wp_authenticate($username, $password);

        if (is_wp_error($user)) {
            return array(
                'success' => false,
                'message' => 'Invalid username or password'
            );
        }

        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);

        return array(
            'success' => true,
            'redirect_url' => home_url()
        );
    }

    public function acpgc_reset_password_form() {
        $template = ACPGC_PLUGIN_TEMPLATE_DIR . "/reset-password-form-template.php";
        ob_start();
        include("$template");
        return ob_get_clean();
    }

    public function acpgc_reset_password_route() {
        register_rest_route('acpgc/v1', '/reset-password', array(
            'methods' => 'POST',
            'callback' => array($this, 'acpgc_handle_reset_password'),
            'permission_callback' => '__return_true'
        ));
    }

    public function acpgc_handle_reset_password(WP_REST_Request $request) {
        $email = $request->get_param('email');
        $user = get_user_by('email', $email);

        if ($user) {
            $key = get_password_reset_key($user);

            if (is_wp_error($key)) {
                return array('success' => false, 'message' => 'Could not generate reset key.');
            }

            $reset_url = network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login');
            $message = "To reset your password, visit the following link: $reset_url";
            $subject = "Password Reset Request";

            if (wp_mail($email, $subject, $message)) {
                return array('success' => true);
            } else {
                return array('success' => false, 'message' => 'Could not send reset email.');
            }
        } else {
            return array('success' => false, 'message' => 'User not found.');
        }
    }
}

add_filter('show_admin_bar', 'acpgc_disable_admin_bar');
function acpgc_disable_admin_bar($show) {
    if (!current_user_can('administrator')) {
        return false;
    }
    return $show;
}

add_filter('login_redirect', 'acpgc_login_redirect', 10, 3);
function acpgc_login_redirect($redirect_to, $request, $user) {
    if (!is_wp_error($user) && !$user->has_cap('administrator')) {
        return home_url();
    }
    return $redirect_to;
}

function acpgc_restrict_admin_access() {
    if (!current_user_can('administrator') && isset($_SERVER['REQUEST_URI'])) {
        $request_uri = sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI']));
        if (strpos($request_uri, '/wp-admin') !== false) {
            wp_redirect(home_url());
            exit;
        }
    }
}
add_action('admin_init', 'acpgc_restrict_admin_access');

add_action('user_register', 'acpgc_register_add_to_league');
function acpgc_register_add_to_league($user_id) {
    global $wpdb;

    // If these values don't exist, then you would exit early.
    if (!isset($_COOKIE['invite_token']) || !isset($_COOKIE['league_id'])) return;

    $token = isset($_COOKIE['invite_token']) ? sanitize_text_field(wp_unslash($_COOKIE['invite_token'])) : null;
    $league_id = isset($_COOKIE['league_id']) ? sanitize_text_field(wp_unslash($_COOKIE['league_id'])) : null;

    if (!is_numeric($league_id)) {
        $league_id = null;
    }
    if (strlen($token) !== 20 ) {
        // Token is not valid
        $token = null;
    }

    // Query database to validate token and league ID
    $table_name = $wpdb->prefix . ACPGC_PREFIX . 'league_invites';

    $result = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM " . esc_sql($table_name) . " WHERE `invite_token` = %s AND `league_id` = %d",
        $token,
        $league_id
    ));

    if ($result) {
        $new_user = get_user_by('ID', $user_id);

        if ($new_user->user_email === $result->email) {
            // SQL to delete the invite from the table
            $wpdb->delete($table_name, ['id' => $result->id]);

            // Get existing league members
            $existing_members = get_field('league_members', $league_id);

            // Add new user to the array of existing members
            $existing_members[] = $new_user->ID;

            // Update the custom field with the new array of members
            update_field('league_members', $existing_members, $league_id);

            set_transient("acpgc_added_to_league_{$new_user->ID}", get_the_title($league_id), 60);

            setcookie('invite_token', '', time() - 3600, '/');
            setcookie('league_id', '', time() - 3600, '/');
        }
    }
}

function acpgc_redirect_after_logout(){
    $redirect_url = home_url('acpgc-login/');
    wp_redirect($redirect_url);
    exit;
}
add_action('wp_logout','acpgc_redirect_after_logout');

function acpgc_redirect_logged_in_users() {
    // Retrieve the custom redirection URL from the WordPress option with a default value.
    $redirection_url = get_option('custom_redirection_url', '/acpgc-dashboard');

    // Retrieve the custom redirection enabled setting with a default value of 1 (enabled).
    $redirection_enabled = get_option('custom_redirection_enabled', 1);

    // Remove the leading slash from the redirection URL to get the slug of the dashboard page.
    $dashboard_page_slug = ltrim($redirection_url, '/');

    // Check if the page specified by the redirection URL exists.
    $page_exists = get_page_by_path($redirection_url) != null;

    // Check if the user is logged in and has the 'subscriber' role
    $current_user = wp_get_current_user();
    $is_subscriber = in_array('subscriber', (array) $current_user->roles);

    // Check if redirection is enabled, the page exists, the user is logged in as a subscriber,
    // the current page is the front page, and the current page is not the dashboard page.
    if ($redirection_enabled && $page_exists && is_user_logged_in() && $is_subscriber && is_front_page() && !is_page($dashboard_page_slug)) {
        // Redirect the user to the dashboard page.
        wp_redirect($redirection_url);
        exit;
    }
}
add_action('template_redirect', 'acpgc_redirect_logged_in_users');

add_filter('parse_request', 'acpgc_custom_logout');
function  acpgc_custom_logout($request){
    if (isset($request->query_vars['pagename']) && $request->query_vars['pagename'] == 'logout'){
        wp_logout();
        wp_set_current_user(0);
    }
}


/*
 * Custom redirects
 */

function acpgc_redirect_to_custom_login() {
    // Check if it's a password reset case
    if (isset($_SERVER['REQUEST_URI']) && strpos(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])), 'wp-login.php') !== false) {
        if (isset($_GET['action'])) {
            $action = isset($_GET['action']) ? sanitize_text_field(wp_unslash($_GET['action'])) : '';
            if ($action === 'rp' || $action === 'resetpass') {
                // Let the request go through if it's for resetting the password
                return;
            }
        } else {
            // Redirect to custom login page
            wp_redirect(home_url('/acpgc-login/'));
            exit();
        }
    }
}
add_action('init', 'acpgc_redirect_to_custom_login');

// Clear auth cookie and handle logout redirection
function acpgc_custom_logout_redirect() {
    wp_clear_auth_cookie();
    wp_redirect(home_url('/acpgc-login/'));
    exit();
}
add_action('wp_logout', 'acpgc_custom_logout_redirect');

// Prevent logged-in users from accessing the login page
function acpgc_redirect_logged_in_user() {
    if (is_user_logged_in() && isset($_SERVER['REQUEST_URI']) && strpos(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])), 'wp-login.php') !== false) {
        wp_redirect(home_url()); // Redirect to homepage or another appropriate page
        exit();
    }
}
add_action('template_redirect', 'acpgc_redirect_logged_in_user');

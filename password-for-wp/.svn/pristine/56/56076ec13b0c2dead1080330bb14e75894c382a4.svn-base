<?php
/*
    Plugin name: Password for WP
    Description: Password for your WordPress site
    Author: get3code
    Author URI: https://get3code.com
    License: GPL2
    Version: 1.6.1
    Requires at least: 4.9
    Requires PHP: 5.6
    Text Domain: password-for-wp
    Domain Path: /languages
*/

function get3_check_page() {
    $get3_start = get_option('g3_password_status');
    if (trim($get3_start) === 'ON') {
        if (!isset($_COOKIE['accessPassword']) || $_COOKIE['accessPassword'] !== get_option('g3_password_pass')) {
            add_action('template_redirect', 'get3_login_page');
        }
    }
}

function get3_login_page() {
    $login_template = plugin_dir_path(__FILE__) . 'parts/get3-login.php';
    error_log('Redirecting to login template.');

    if (file_exists($login_template)) {
        include $login_template;
        exit;
    }

    error_log('Login template not found.');
    wp_die(__('Login template not found', 'password-for-wp'), __('Error', 'password-for-wp'), 404);
}
add_action('init', 'get3_check_page');

function get3_init_admin_page() {
    $g3option = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'get3_admin_action')) {
            wp_die(__('Unauthorized action', 'password-for-wp'));
        }

        $checker_pass = sanitize_text_field($_POST['g3_pass_text']);
        if (isset($_POST['g3_pass_ver'])) {
            $checker_option = sanitize_text_field($_POST['g3_pass_ver']);
        } else {
            $checker_option = __('OFF', 'password-for-wp');
        }
        update_option('g3_password_status', $checker_option);

        if (isset($_POST['g3_text1'])) {
            $stat_text1 = sanitize_text_field(strip_tags($_POST['g3_text1']));
            update_option('g3_text1', $stat_text1);
        }
        if (isset($_POST['g3_text2'])) {
            $stat_text2 = sanitize_text_field(strip_tags($_POST['g3_text2']));
            update_option('g3_text2', $stat_text2);
        }
        if (isset($_POST['g3_color_text'])) {
            $stat_color = sanitize_text_field($_POST['g3_color_text']);
            update_option('g3_color_text', $stat_color);
        }

        if ($_POST['g3_pass_text'] != '') {
            update_option('g3_password_pass', $checker_pass);
        }
        $g3option = '<p class="g3_save">' . __('SUCCESS SAVE', 'password-for-wp') . '</p>';
    }

    $stat_check = get_option('g3_password_status') ?: __('OFF', 'password-for-wp');
    $stat_pass  = get_option('g3_password_pass');
    $stat_text1 = get_option('g3_text1') ?: __('Website during maintenance.', 'password-for-wp');
    $stat_text2 = get_option('g3_text2') ?: __('Please come back soon.', 'password-for-wp');
    $stat_color = get_option('g3_color_text') ?: '#dddddd';

    ?>
    <div id="g3_content">
        <div class="g3_header">
            <h1><span class="dashicons dashicons-admin-network"></span> <?php echo __('Password for WP', 'password-for-wp'); ?></h1>
            <p><?php echo __('Set a password for the entire Wordpress installation. You can view the site with a password.', 'password-for-wp'); ?>
                <strong><?php echo __('The password does not include the login panel to the wordpress backend.', 'password-for-wp'); ?></strong></p>
        </div>
        <form action="" method="post">
            <?php wp_nonce_field('get3_admin_action');?>
            <?php echo $g3option; ?>
            <div class="g3_row">
                <div class="g3_half_2">
                    <?php echo __('Do you want to enable the password?', 'password-for-wp'); ?>
                </div>
                <div class="g3_half_2">
                    <input type="checkbox" name="g3_pass_ver" value="ON" <?php if ($stat_check == 'ON') { echo 'checked'; } ?>>
                    <?php echo $stat_check == 'ON' ? '<span class="g3_on">' . $stat_check . '</span>' : '<span class="g3_off">' . $stat_check . '</span>'; ?>
                </div>
            </div>
            <div class="g3_row">
                <div class="g3_half_2">
                    <?php echo __('Enter the password for WP', 'password-for-wp'); ?>
                </div>
                <div class="g3_half_2">
                    <input type="password" class="g3_input_pass" value="<?php echo esc_attr($stat_pass); ?>" name="g3_pass_text">
                </div>
            </div>
            <div class="g3_row">
                <div class="g3_half_2">
                    <?php echo __('Enter text H2', 'password-for-wp'); ?>
                </div>
                <div class="g3_half_2">
                    <input type="text" class="g3_input_pass" value="<?php echo esc_attr($stat_text1); ?>" name="g3_text1">
                </div>
            </div>
            <div class="g3_row">
                <div class="g3_half_2">
                    <?php echo __('Enter text H3', 'password-for-wp'); ?>
                </div>
                <div class="g3_half_2">
                    <input type="text" class="g3_input_pass" value="<?php echo esc_attr($stat_text2); ?>" name="g3_text2">
                </div>
            </div>
            <div class="g3_row">
                <div class="g3_half_2">
                    <?php echo __('Background color', 'password-for-wp'); ?>
                </div>
                <div class="g3_half_2">
                    <input type="text" class="my-color-field" data-default-color="<?php echo esc_attr($stat_color); ?>" value="<?php echo esc_attr($stat_color); ?>" name="g3_color_text">
                </div>
            </div>
            <div class="g3_row">
                <div class="g3_half_2"></div>
                <div class="g3_half_2">
                    <input type="submit" class="button button-primary" value="<?php echo __('save changes', 'password-for-wp'); ?>">
                </div>
            </div>
        </form>
    </div>
    <?php
}

function get3_password_menu() {
    add_menu_page('Password for WP', 'Password for WP', 'manage_options', 'get3-passw-menu', 'get3_init_admin_page', 'dashicons-admin-network', null);
}
add_action('admin_menu', 'get3_password_menu');
add_action('init', 'get3_check_page');

function get3_password_menu_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu(array(
        'id' => 'get-3pass',
        'title' => '<span class="dashicons dashicons-admin-network" style="font-family:dashicons;"></span> ' . __('Password for WP', 'password-for-wp'),
        'href' => esc_url(admin_url('admin.php?page=get3-passw-menu'))
    ));
}
add_action('admin_bar_menu', 'get3_password_menu_bar', 300);

function get3_password_css() {
    wp_enqueue_style('styles-get3-code', esc_url(plugin_dir_url(__FILE__) . 'assets/get3_pass.css'));
}
add_action('admin_enqueue_scripts', 'get3_password_css');

function get3_password_js() {
    wp_enqueue_script('js-get3-pass', esc_url(plugin_dir_url(__FILE__) . 'assets/get3_pass.js'), array('wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'get3_password_js', 30);

function get3_add_settings_link($links) {
    $links = array_merge(array(
        '<a href="' . esc_url(admin_url('/admin.php?page=get3-passw-menu')) . '">' . __('Settings', 'password-for-wp') . '</a>'
    ), $links);

    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'get3_add_settings_link');

register_deactivation_hook(__FILE__, 'removeDataG3');
function removeDataG3() {
    delete_option('g3_password_status');
    delete_option('g3_password_pass');
    delete_option('g3_text1');
    delete_option('g3_text2');
    delete_option('g3_color_text');
}

function get3_password_translation() {
    load_plugin_textdomain('password-for-wp', false, basename(dirname(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'get3_password_translation');
?>

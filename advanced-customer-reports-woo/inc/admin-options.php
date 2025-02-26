<?php
if( !defined('ABSPATH') ) {
    exit;
}

// Create hidden admin menu page
add_action('admin_menu', 'acreports_admin_menu');
function acreports_admin_menu() {
    add_submenu_page(null, 'Advanced Customer Reports Settings', 'Advanced Customer Reports Settings', 'manage_options', 'acreports-settings', 'acreports_settings_content');
}

// Save settings
add_action('admin_init', 'acreports_save_settings');
function acreports_save_settings() {
    if(isset($_POST['action']) && $_POST['action'] == 'acreports_save_settings') {
        if(!isset($_POST['acreports_settings_nonce_field']) || !wp_verify_nonce($_POST['acreports_settings_nonce_field'], 'acreports_settings_nonce')) {
            wp_die('Security check');
        }

        $options = get_option('acreports_settings');

        $options['activity_per_user'] = isset($_POST['activity_per_user']) ? intval($_POST['activity_per_user']) : 25;

        update_option('acreports_settings', $options);
    }
}

// Get option
function acreports_get_option($option, $default = '') {
    $options = get_option('acreports_settings');
    if(isset($options[$option])) {
        return $options[$option];
    }
    return $default;
}

// Settings page
add_action('acreports_settings', 'acreports_settings_content');
function acreports_settings_content() {

$options = get_option('acreports_settings');
?>

<br/>

<h1><?php esc_html_e('Advanced Customer Reports - Settings', 'advanced-customer-reports-woo'); ?></h1>

<form method="post" action="">

    <br/><h2><?php esc_html_e('General Settings', 'advanced-customer-reports-woo'); ?></h2>

    <table class="form-table">

        <tr>
            <th scope="row">
                <label for="activity_per_user">Activity Per User</label>
            </th>
            <td>
                <input type="number" name="activity_per_user" id="activity_per_user" value="<?php echo esc_attr(acreports_get_option('activity_per_user', 25)); ?>" class="regular-text">
            </td>
        </tr>

        <tr>
            <th scope="row">
                <label for="activity_per_user">Sort Customers List By</label>
            </th>
            <td>
                <?php
                $total_users = count(get_users());
                $default_sort = 'customer_id';
                if($total_users < 2000) {
                    $default_sort = 'customer_total_spent';
                }
                ?>
                <select name="sort_users_by" id="sort_users_by">
                    <option value="customer_id" <?php selected(acreports_get_option('sort_users_by', $default_sort), 'customer_name'); ?>>Customer Name</option>
                    <option value="customer_total_spent" <?php selected(acreports_get_option('sort_users_by', $default_sort), 'customer_total_spent'); ?>>Total Spent</option>
                </select>
        </tr>

    </table>

    <?php wp_nonce_field('acreports_settings_nonce', 'acreports_settings_nonce_field'); ?>

    <input type="hidden" name="action" value="acreports_save_settings">

    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e('Save Changes', 'advanced-customer-reports-woo'); ?>">
    </p>

    <br/><br/>

    <a href="<?php echo admin_url('admin.php?page=advanced-customer-reports'); ?>" class="button"><?php esc_html_e('Back to Customer Reports', 'advanced-customer-reports-woo'); ?></a>

</form>

<br><br><hr/><br><br>

<p style="font-size: 15px; font-weight: bold;">
    <?php esc_html_e('Developed by', 'advanced-customer-reports-woo'); ?> 
    <a href="https://www.relywp.com" target="_blank">RelyWP</a>.
</p>

<p style="font-size: 15px;">
    <?php esc_html_e('This is a new plugin, still under early stages of active development. If you have any suggestions for new features, please feel free to message us!', 'advanced-customer-reports-woo'); ?>
</p>    

<p style="font-size: 12px; font-weight: bold;"><?php esc_html_e( 'Check out our other plugins:', 'advanced-customer-reports-woo' ); ?>

<a href="https://couponaffiliates.com/?utm_campaign=advanced-customer-reports-plugin&utm_source=plugin-settings&utm_medium=promo" target="_blank"><?php esc_html_e( 'Coupon Affiliates for WooCommerce', 'advanced-customer-reports-woo' ); ?></a>
|
<a href="https://relywp.com/plugins/better-coupon-restrictions-woocommerce/?utm_campaign=advanced-customer-reports-plugin&utm_source=plugin-settings&utm_medium=promo" target="_blank"><?php esc_html_e( 'Better Coupon Restrictions for WooCommerce', 'advanced-customer-reports-woo' ); ?></a>
|
<a href="https://relywp.com/plugins/tax-exemption-woocommerce/?utm_campaign=advanced-customer-reports-plugin&utm_source=plugin-settings&utm_medium=promo" target="_blank"><?php esc_html_e( 'Tax Exemption for WooCommerce', 'advanced-customer-reports-woo' ); ?></a>
|
<a href="https://relywp.com/plugins/simple-cloudflare-turnstile/?utm_campaign=advanced-customer-reports-plugin&utm_source=plugin-settings&utm_medium=promo" target="_blank"><?php esc_html_e( 'Simple Cloudflare Turnstile', 'advanced-customer-reports-woo' ); ?></a>

</p>

<?php
}
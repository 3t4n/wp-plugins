<?php
/**
 * JetAPI Dashboard Page
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined('ABSPATH') || exit;

/**
 * JETI_Dashboard_Page Class
 */
class JETI_Dashboard_Page {

    /**
     * Initialize the dashboard page
     */
    public static function init() {
        // Remove this line as we're handling menu creation in class-jeti-integration.php
        // add_action('admin_menu', array(__CLASS__, 'add_dashboard_menu'));
    }

    /**
     * Render the dashboard page
     */
    public static function render_dashboard() {
        self::render_tabs('dashboard');
        ?>
        <div class="wrap">
            <div class="jeti-settings-wrapper">
                <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
                
                <div class="jeti-dashboard">
                    <div class="jeti-dashboard-header">
                        <h2><?php esc_html_e('Welcome to JetAPI Integration', 'jetapi-integration-for-woocommerce'); ?></h2>
                        <p class="jeti-dashboard-intro"><?php esc_html_e('JetAPI Integration allows you to send notifications to your customers via WhatsApp, Telegram, and SMS.', 'jetapi-integration-for-woocommerce'); ?></p>
                    </div>

                    <div class="jeti-dashboard-grid">
                        <div class="jeti-dashboard-card">
                            <h3><?php esc_html_e('Getting Started', 'jetapi-integration-for-woocommerce'); ?></h3>
                            <ol class="jeti-dashboard-steps">
                                <li><?php 
                                    printf(
                                        /* translators: %1$s: Opening link tag, %2$s: Closing link tag */
                                        esc_html__('Go to the %1$sSettings page%2$s to configure your JetAPI credentials.', 'jetapi-integration-for-woocommerce'),
                                        '<a href="' . esc_url(admin_url('admin.php?page=jeti-settings')) . '">',
                                        '</a>'
                                    );
                                ?></li>
                                <li><?php esc_html_e('Set up your preferred notification channels and message templates.', 'jetapi-integration-for-woocommerce'); ?></li>
                                <li><?php esc_html_e('Configure which WooCommerce events should trigger notifications.', 'jetapi-integration-for-woocommerce'); ?></li>
                            </ol>
                        </div>

                        <div class="jeti-dashboard-card">
                            <h3><?php esc_html_e('Features', 'jetapi-integration-for-woocommerce'); ?></h3>
                            <ul class="jeti-dashboard-features">
                                <li class="feature-whatsapp">
                                    <?php esc_html_e('Send notifications via WhatsApp, Telegram, and SMS', 'jetapi-integration-for-woocommerce'); ?>
                                </li>
                                <li class="feature-customize">
                                    <?php esc_html_e('Customize notification messages for different order statuses', 'jetapi-integration-for-woocommerce'); ?>
                                </li>
                                <li class="feature-history">
                                    <?php esc_html_e('View message history and delivery status', 'jetapi-integration-for-woocommerce'); ?>
                                </li>
                                <li class="feature-bulk">
                                    <?php esc_html_e('Send bulk messages to your customers', 'jetapi-integration-for-woocommerce'); ?>
                                </li>
                            </ul>
                        </div>

                        <div class="jeti-dashboard-card">
                            <h3><?php esc_html_e('Quick Actions', 'jetapi-integration-for-woocommerce'); ?></h3>
                            <div class="jeti-dashboard-actions">
                                <a href="<?php echo esc_url(admin_url('admin.php?page=jeti-settings')); ?>" class="button button-primary">
                                    <?php esc_html_e('Configure Settings', 'jetapi-integration-for-woocommerce'); ?>
                                </a>
                                <a href="<?php echo esc_url(admin_url('admin.php?page=jeti-bulk-messaging')); ?>" class="button button-secondary">
                                    <?php esc_html_e('Send Bulk Message', 'jetapi-integration-for-woocommerce'); ?>
                                </a>
                                <a href="<?php echo esc_url(admin_url('admin.php?page=jeti-messages')); ?>" class="button button-secondary">
                                    <?php esc_html_e('View Message History', 'jetapi-integration-for-woocommerce'); ?>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Render tabs for JetAPI pages
     *
     * @param string $current Current tab
     */
    public static function render_tabs($current = 'dashboard') {
        $tabs = array(
            'dashboard' => __('Dashboard', 'jetapi-integration-for-woocommerce'),
            'messages' => __('Message History', 'jetapi-integration-for-woocommerce'),
            'bulk-messaging' => __('Bulk Messaging', 'jetapi-integration-for-woocommerce'),
            'settings' => __('Settings', 'jetapi-integration-for-woocommerce'),
        );

        echo '<div class="jeti-tabs-wrapper">';
        echo '<h2 class="nav-tab-wrapper">';
        foreach ($tabs as $tab => $name) {
            $class = ($tab == $current) ? ' nav-tab-active' : '';
            echo '<a class="nav-tab' . esc_attr($class) . '" href="?page=jeti-' . esc_attr($tab) . '">' . esc_html($name) . '</a>';
        }
        echo '</h2>';
        echo '</div>';
    }
}

// Initialize the dashboard page
JETI_Dashboard_Page::init();

<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

use Google\Service\SearchConsole;
use Google\Service\SearchConsole\SearchAnalyticsQueryRequest;

/**
 * Main plugin class.
 *
 * 
 *
 */
class Rankology_Bot_batch {
    /**
     * Holds the class object.
     *
     * 
     *
     * @var object
     */
    public static $instance;
    /**
     * Unique plugin slug identifier.
     *
     * 
     *
     * @var string
     */
    public $plugin_slug = 'rankology-bot-batch';
    /**
     * Plugin file.
     *
     * 
     *
     * @var string
     */
    public $file = __FILE__;
    /**
     * Plugin menu hook.
     *
     * 
     *
     * @var string
     */
    public $hook = false;

    /**
     * Primary class constructor.
     *
     * 
     */
    public function __construct() {
        // Load the plugin.
        add_action('init', [$this, 'init'], 0);
    }

    /**
     * Loads the plugin into WordPress.
     *
     * 
     */
    public function init() {
        add_action('admin_menu', [$this, 'menu'], 22);
    }

    /**
     * Loads the admin menu item under the Rankology menu.
     *
     * 
     */
    public function menu() {
        if ('1' == rankology_get_toggle_option('bot')) {
//            add_submenu_page('rankology-option', __('Scan Broken Links', 'wp-rankology'), __('Scan URLs', 'wp-rankology'), rankology_capability('manage_options', 'bot'), $this->plugin_slug, [$this, 'menu_cb'], 12);
        }
    }

    /**
     * Outputs the menu view.
     *
     * 
     */
    public function menu_cb() {
        $this->options = get_option('rankology_bot_option_name');

        if (is_plugin_active('rankology/rankology.php')) {
            if (function_exists('rankology_admin_header')) {
                echo rankology_admin_header();
            }
        } ?>
        <div class="rankology-margin">
            <?php
                //echo rankology_feature_title(null);x
        $current_tab = ''; ?>
            <div id="rankology-tabs" class="wrap">
                <?php
                    $plugin_settings_tabs = [
                        'tab_rankology_scan'          => __('Scan Broken Links', 'wp-rankology'),
                        'tab_rankology_scan_settings' => __('Settings', 'wp-rankology'),
                    ];

        echo '<div class="rankology-option nav-tab-wrapper">';
        foreach ($plugin_settings_tabs as $tab_key => $tab_caption) {
            echo '<a id="' . $tab_key . '-tab" class="nav-tab" href="?page=rankology-bot-batch#tab=' . $tab_key . '">' . $tab_caption . '</a>';
        }
        echo '</div>'; ?>

                <!-- Scan -->
                <div class="rankology-tab rankology-option <?php if ('tab_rankology_scan' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_scan">
                    <?php do_settings_sections('rankology-settings-admin-bot'); ?>

                    <?php if ('' != get_option('rankology_bot_log')) { ?>
                        <p>
                            <strong>
                                <?php esc_html_e('Latest scan: ', 'wp-rankology'); ?>
                            </strong>
                            <?php echo get_option('rankology_bot_log'); ?>
                        </p>

                        <p>
                            <strong>
                                <?php esc_html_e('Links found: ', 'wp-rankology'); ?>
                            </strong>
                            <?php echo wp_count_posts('rankology_bot')->publish; ?>
                        </p>

                        <form method="post">
                            <input type="hidden" name="rankology_action" value="export_csv_links_settings" />
                            <p>
                                <?php wp_nonce_field('rankology_export_csv_links_nonce', 'rankology_export_csv_links_nonce'); ?>
                                <input type="submit" class="btn btnSecondary" value="<?php esc_html_e('Export CSV', 'wp-rankology'); ?>">
                            </p>
                        </form>
                    <?php
                    } else {
                        esc_html_e('No scan', 'wp-rankology');
                    } ?>
                    <p>
                        <div id="rankology_launch_bot" class="btn btnPrimary">
                            <?php esc_html_e('Launch the bot!', 'wp-rankology'); ?>
                        </div>

                        <span class="spinner"></span>
                    </p>

                    <textarea id="rankology_bot_log" rows="10" width="100%" style="max-width: inherit;" readonly style="display:none"><?php esc_html_e('---Scan in progress (don\'t close this window)---', 'wp-rankology'); ?></textarea>
                </div><!--end .wrap-bot-form-->


                <!-- Settings -->
                <div class="rankology-tab rankology-option <?php if ('tab_rankology_scan_settings' == $current_tab) {
            echo 'active';
        } ?>" id="tab_rankology_scan_settings">
                    <form method="post" action="<?php echo admin_url('options.php'); ?>">
                        <?php settings_fields('rankology_bot_option_group'); ?>
                        <?php do_settings_sections('rankology-settings-admin-bot-settings'); ?>
                        <?php //echo rankology_feature_save();?>
                        <?php rkseo_submit_button(__('Save changes', 'wp-rankology')); ?>
                    </form>
                </div>
        </div><!--rankology-tabs-->
    </div>
        <?php
    }

    /**
     * Returns the singleton instance of the class.
     *
     * 
     *
     * @return object the Rankology_Bot_batch object
     */
    public static function get_instance() {
        if ( ! isset(self::$instance) && ! (self::$instance instanceof Rankology_Bot_batch)) {
            self::$instance = new Rankology_Bot_batch();
        }

        return self::$instance;
    }
}
// Load the main plugin class.
$rankology_bot_batch = Rankology_Bot_batch::get_instance();

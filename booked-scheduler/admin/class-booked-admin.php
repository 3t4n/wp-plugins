<?php
/**
 * @copyright Copyright 2024 Twinkle Toes Software, LLC
 */

defined('ABSPATH') || exit;

class Booked_Admin
{
    private Booked_Loader $loader;
    private string $version;
    private string $plugin_name = "Booked";

    public function __construct(Booked_Loader $loader, string $version)
    {
        $this->loader = $loader;
        $this->version = $version;
    }

    public function enqueue_styles($hook)
    {
        wp_enqueue_style('booked_admin_css', plugins_url('css/booked-admin.css', BOOKED_SCHEDULER_PLUGIN_FILE), [], $this->version, 'all');
    }

    public function enqueue_scripts($hook)
    {
    }

    private function sanitize_array($args)
    {
        return array_map('sanitize_text_field', $args);
    }

    private function init_admin()
    {
        register_setting('booked-scheduler', 'booked_options', ['type' => 'array', 'sanitize_callback' => fn($args) => $this->sanitize_array($args),]);

        $settingsSectionId = 'booked_admin_section';
        $settingsPageId = 'booked-scheduler';

        add_settings_section(
            $settingsSectionId,
            'Booked Scheduler Wordpress Settings',
            fn($args) => $this->booked_section_developers_callback($args),
            $settingsPageId
        );

        add_settings_field(
            'booked_url',
            'Booked Scheduler URL',
            fn($args) => $this->field_booked_url($args),
            $settingsPageId,
            $settingsSectionId,
            [
                'label_for' => 'booked_url',
                'class' => 'booked_full_width',
            ]
        );

        add_settings_field(
            'booked_wp_key',
            'WordPress Key',
            fn($args) => $this->field_wp_key($args),
            $settingsPageId,
            $settingsSectionId,
            [
                'label_for' => 'booked_wp_key',
                'class' => 'booked_full_width',
            ]
        );
    }

    private function booked_section_developers_callback($args)
    {
        ?>
        <p>
            <?php esc_html_e('These settings enable Booked browsing and reservations directly within your WordPress site.', 'booked-scheduler'); ?>
            <a href="https://www.bookedscheduler.com/help/integrations/wordpress" target="_blank"
               rel="nofollow noreferrer noopener"><?php esc_html_e('Help', 'booked-scheduler'); ?></a>
        </p>
        <p>
            <?php esc_html_e('This plugin requires a Booked server. Sign up for a', 'booked-scheduler'); ?>
            <a href="https://www.bookedscheduler.com/free-trial/" target="_blank"
               rel="nofollow noreferrer noopener"> <?php esc_html_e('free trial', 'booked-scheduler'); ?></a>
            <?php esc_html_e('or', 'booked-scheduler'); ?>
            <a href="https://www.bookedscheduler.com/licensing/" target="_blank"
               rel="nofollow noreferrer noopener"> <?php esc_html_e('purchase a license', 'booked-scheduler'); ?></a>
        </p>
        <?php
    }

    private function field_booked_url($args)
    {
        $options = get_option('booked_options');
        ?>
        <input type="url"
               id="<?php echo esc_attr($args['label_for']); ?>"
               name="booked_options[<?php echo esc_attr($args['label_for']); ?>]"
               value="<?php echo isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : ""; ?>"
               class="booked_full_width"
               required="required" />
        <p class="description">
            <?php esc_html_e('The full URL to your Booked instance.', 'booked-scheduler'); ?>
        </p>
        <?php
    }

    private function field_wp_key($args)
    {
        $options = get_option('booked_options');
        ?>
        <input type="text"
               id="<?php echo esc_attr($args['label_for']); ?>"
               name="booked_options[<?php echo esc_attr($args['label_for']); ?>]"
               value="<?php echo isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : ""; ?>"
               class="booked_full_width"
               required="required" />
        <p class="description">
            <?php esc_html_e('The WordPress key found in your Booked Scheduler settings', 'booked-scheduler'); ?>
        </p>
        <?php
    }

    private function field_allow_wp_user_auth($args)
    {
        $options = get_option('booked_options');
        ?>
        <select
                id="<?php echo esc_attr($args['label_for']); ?>"
                name="booked_options[<?php echo esc_attr($args['label_for']); ?>]"
        >
            <option value="no"
                <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'no', false)) : (''); ?>>
                No
            </option>
            <option value="yes"
                <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'yes', false)) : (''); ?>>
                Yes
            </option>
        </select>
        <p class="description">
            <?php esc_html_e('This allows users to create reservations using their WordPress account on this site', 'booked-scheduler'); ?>
        </p>
        <?php
    }


    private function booked_options_page()
    {
//        https://developer.wordpress.org/plugins/settings/custom-settings-page/
        add_menu_page(
            'Booked Scheduler',
            'Booked Scheduler',
            'manage_options',
            'booked-scheduler',
            fn() => $this->booked_options_page_html(),
            plugins_url('images/icon.png', BOOKED_SCHEDULER_PLUGIN_FILE),
        );
    }

    private function booked_options_page_html()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            check_admin_referer('save_booked_settings');
        }

        if (isset($_GET['settings-updated'])) {
            // add settings saved message with the class of "updated"
            add_settings_error('booked_messages', 'booked_message', __('Settings Saved', 'booked-scheduler'), 'updated');
        }

        settings_errors('booked_messages');

        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('booked-scheduler');
                do_settings_sections('booked-scheduler');
                submit_button('Save Settings');
                //                wp_nonce_field('save_booked_settings');

                ?>
            </form>
        </div>
        <?php
    }

    public function run()
    {
        $this->loader->add_action('admin_enqueue_scripts', fn($hook) => $this->enqueue_styles($hook));
        $this->loader->add_action('admin_enqueue_scripts', fn($hook) => $this->enqueue_scripts($hook));
        $this->loader->add_action('admin_init', fn() => $this->init_admin());
        $this->loader->add_action('admin_menu', fn() => $this->booked_options_page());
    }
}
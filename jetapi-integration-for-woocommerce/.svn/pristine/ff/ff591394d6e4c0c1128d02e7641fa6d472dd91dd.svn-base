<?php

/**
 * JetAPI Settings Page
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined('ABSPATH') || exit;

/**
 * JETI_Settings_Page Class
 */
class JETI_Settings_Page
{
    /**
     * @var JETI_Integration_Settings
     */
    private static $settings = null;

    /**
     * Constructor for the settings page.
     */
    public function __construct()
    {
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_post_update_jeti_settings', array($this, 'update_settings'));

        if (is_null(self::$settings)) {
            self::$settings = new JETI_Integration_Settings();
        }
    }

    /**
     * Register settings.
     */
    public function register_settings()
    {
        register_setting('jeti_settings', 'jeti_settings', array($this, 'sanitize_settings'));
    }

    /**
     * Render the settings page.
     */
    public static function render_settings_page()
    {
        if (is_null(self::$settings)) {
            self::$settings = new JETI_Integration_Settings();
        }

        // Check authentication status
        $auth = new JETI_Auth();
        $auth->check_token_on_page_load();

        // Verify nonce for GET parameters
        $nonce = isset($_REQUEST['_wpnonce']) ? wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])), 'jeti_settings_nonce') : false;

        // Render tabs
        JETI_Dashboard_Page::render_tabs('settings');
?>
        <div class="wrap">
            <div class="jeti-settings-wrapper">
                <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
                <?php 
                // Show settings updated message if nonce is valid
                if ($nonce && isset($_GET['settings-updated']) && $_GET['settings-updated'] === 'true') {
                    echo '<div class="jeti-admin-notice success"><p>' . esc_html__('Settings saved successfully.', 'jetapi-integration-for-woocommerce') . '</p></div>';
                }
                ?>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="jeti_settings_form" class="jeti-settings-form">
                    <input type="hidden" name="action" value="update_jeti_settings">
                    <?php
                    wp_nonce_field('jeti_settings_nonce', 'jeti_settings_nonce');
                    self::render_settings_fields();
                    ?>
                    <div class="submit">
                        <?php submit_button(); ?>
                    </div>
                </form>
            </div>
        </div>
<?php
    }

    /**
     * Render settings fields.
     */
    private static function render_settings_fields()
    {
        if (is_null(self::$settings)) {
            self::$settings = new JETI_Integration_Settings();
        }

        // The table opening tag is safe static HTML
        echo '<table class="form-table">';
        
        // The settings HTML is already escaped in generate_settings_html() method
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Output is pre-escaped in generate_settings_html()
        echo self::$settings->generate_settings_html();
        
        echo '</table>';
    }

    /**
     * Sanitize settings before saving.
     *
     * @param array $input The input array to sanitize.
     * @return array The sanitized input.
     */
    public function sanitize_settings($input)
    {
        if (is_null(self::$settings)) {
            self::$settings = new JETI_Integration_Settings();
        }

        return self::$settings->sanitize_settings($input);
    }

    /**
     * Update settings.
     */
    public function update_settings()
    {
        // Verify nonce
        if (! isset($_POST['jeti_settings_nonce']) || 
            ! wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['jeti_settings_nonce'])), 
                'jeti_settings_nonce'
            )
        ) {
            wp_die(esc_html__('Security check failed', 'jetapi-integration-for-woocommerce'));
        }

        if (is_null(self::$settings)) {
            self::$settings = new JETI_Integration_Settings();
        }

        $settings = array();
        $form_fields = self::$settings->get_form_fields();

        foreach ($form_fields as $key => $field)
        {
            $field_key = self::$settings->get_field_key($key);
            if (isset($_POST[$field_key]))
            {
                // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- Sanitization handled in sanitize_field method
                $post_value = wp_unslash($_POST[$field_key]);
                
                if ($field['type'] === 'checkbox')
                {
                    $settings[$key] = 'yes';
                }
                elseif ($field['type'] === 'multicheck' || $field['type'] === 'ordered_multiselect')
                {
                    $settings[$key] = is_array($post_value) ? array_map('sanitize_text_field', $post_value) : array();
                }
                else
                {
                    $settings[$key] = $this->sanitize_field($post_value, $field);
                }
            }
            else
            {
                // For checkboxes, if not set, save as 'no'
                if ($field['type'] === 'checkbox')
                {
                    $settings[$key] = 'no';
                }
                else
                {
                    // Set default value if the field is not in POST data
                    $settings[$key] = isset($field['default']) ? $field['default'] : '';
                }
            }
        }

        $updated = update_option('jeti_settings', $settings);

        if ($updated)
        {
            add_settings_error('jeti_settings', 'settings_updated', esc_html__('Settings saved successfully.', 'jetapi-integration-for-woocommerce'), 'updated');
        }
        else
        {
            add_settings_error('jeti_settings', 'settings_error', esc_html__('Error saving settings. Please try again.', 'jetapi-integration-for-woocommerce'), 'error');
        }

        set_transient('settings_errors', get_settings_errors(), 30);

        wp_safe_redirect(add_query_arg(array(
            'settings-updated' => 'true',
            '_wpnonce' => wp_create_nonce('jeti_settings_nonce')
        ), admin_url('admin.php?page=jeti-settings')));
        exit;
    }

    /**
     * Sanitize a single field.
     *
     * @param mixed $value The field value.
     * @param array $field The field settings.
     * @return mixed The sanitized value.
     */
    private function sanitize_field($value, $field)
    {
        switch ($field['type'])
        {
            case 'text':
            case 'select':
                return sanitize_text_field($value);
            case 'textarea':
                return sanitize_textarea_field($value);
            case 'checkbox':
                return 'yes' === $value ? 'yes' : 'no';
            case 'email':
                return sanitize_email($value);
            case 'url':
                return esc_url_raw($value);
            default:
                return sanitize_text_field($value);
        }
    }
}

// Initialize the settings page
new JETI_Settings_Page();

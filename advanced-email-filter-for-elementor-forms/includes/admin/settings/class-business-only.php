<?php
namespace AEFE\Admin\Settings;

use AEFE\Admin\Traits\Section_Header_Renderer;

class Business_Only_Settings {

    use Section_Header_Renderer;

    protected $option_name = 'aefe_business_only';

    public function __construct() {
        add_action('admin_init', [$this, 'register_section_and_field'], 30);
    }

    public function register_section_and_field() {
        add_settings_section(
            'aefe_business_only_section',
            '',
            [$this, 'render_header'],
            'aefe-settings'
        );

        add_settings_field(
            $this->option_name,
            __('Enable Business Email Only', 'advanced-email-filter-for-elementor-forms'),
            [$this, 'render_field'],
            'aefe-settings',
            'aefe_business_only_section'
        );

        register_setting('aefe-settings', $this->option_name,'rest_sanitize_boolean');
    }

    public function render_header() {
        $this->render_section_header(
            __('Business Email Filter', 'advanced-email-filter-for-elementor-forms'),
            __('Enable to block personal email domains globally for all forms.', 'advanced-email-filter-for-elementor-forms')
        );
    }

    public function render_field() {
        $option = get_option($this->option_name, '');
        ?>
        <label for="<?php echo esc_attr($this->option_name); ?>">
            <input type="checkbox" 
                   id="<?php echo esc_attr($this->option_name); ?>" 
                   name="<?php echo esc_attr($this->option_name); ?>" 
                   value="1" 
                   <?php checked(1, $option); ?>>
            <?php esc_html_e('Block personal email domains', 'advanced-email-filter-for-elementor-forms'); ?>
        </label>
        <p class="description">
            <?php esc_html_e('When enabled, emails from common personal domains (like gmail.com, yahoo.com, etc.) will be blocked.', 'advanced-email-filter-for-elementor-forms'); ?>
        </p>
        <p class="disclaimer">
            <?php esc_html_e('Note: Our database is updated every 7 days, but some domains might still pass through as new personal email providers can come.', 'advanced-email-filter-for-elementor-forms'); ?>
        </p>
        <?php
    }
}

new Business_Only_Settings();
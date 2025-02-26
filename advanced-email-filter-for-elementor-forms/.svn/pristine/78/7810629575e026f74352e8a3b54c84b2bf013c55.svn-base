<?php
namespace AEFE\Admin\Settings;

use AEFE\Admin\Traits\Section_Header_Renderer;

class Disposable_Settings {

    use Section_Header_Renderer;

    protected $option_name = 'aefe_block_disposable';

    public function __construct() {
        add_action('admin_init', [$this, 'register_section_and_field'], 40);
    }

    public function register_section_and_field() {
        add_settings_section(
            'aefe_disposable_section',
            '',
            [$this, 'render_header'],
            'aefe-settings'
        );

        add_settings_field(
            $this->option_name,
            __('Enable Disposable Email Blocking', 'advanced-email-filter-for-elementor-forms'),
            [$this, 'render_field'],
            'aefe-settings',
            'aefe_disposable_section'
        );

        register_setting('aefe-settings', $this->option_name, 'rest_sanitize_boolean');
    }

    public function render_header() {
        $this->render_section_header(
            __('Disposable Email Filter', 'advanced-email-filter-for-elementor-forms'),
            __('Enable to block disposable/temporary email domains globally for all forms. ', 'advanced-email-filter-for-elementor-forms')
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
            <?php esc_html_e('Block disposable email domains', 'advanced-email-filter-for-elementor-forms'); ?>
        </label>
        <p class="description">
            <?php esc_html_e('When enabled, emails from disposable/temporary email domains will be blocked.', 'advanced-email-filter-for-elementor-forms'); ?>
        </p>
        <p class="disclaimer">
            <?php esc_html_e('Note: Our database is updated every 7 days, but some domains might still pass through as new disposable email services appear daily.', 'advanced-email-filter-for-elementor-forms'); ?>
        </p>
        <?php
    }
}

new Disposable_Settings();

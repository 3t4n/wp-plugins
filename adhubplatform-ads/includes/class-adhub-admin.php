<?php
/**
 * Classe per la gestione dell'interfaccia di amministrazione
 *
 * @package AdhubPlatform
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class AdhubPlatform_Admin {
    private $options;
    private $page_name = 'adhub-platform-settings';

    public function __construct($options) {
        $this->options = $options;
    }

    public function init() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function register_settings() {
        register_setting(
            'adhub_platform_options',
            'adhub_platform_options',
            array($this, 'sanitize_options')
        );

        // Sezione Generale
        add_settings_section(
            'adhub_general_section',
            __('General Settings', 'adhubplatform-ads'),
            array($this, 'render_general_section'),
            $this->page_name
        );

        // Campo Abilitazione
        add_settings_field(
            'enabled',
            __('Enable Plugin', 'adhubplatform-ads'),
            array($this, 'render_checkbox_field'),
            $this->page_name,
            'adhub_general_section',
            array(
                'label_for' => 'enabled',
                'field_name' => 'enabled',
                'description' => __('Enable or disable all advertisements', 'adhubplatform-ads'),
                'default' => true
            )
        );

        // Sezione CMP
        add_settings_section(
            'adhub_cmp_section',
            __('CMP Settings', 'adhubplatform-ads'),
            array($this, 'render_cmp_section'),
            $this->page_name
        );

        add_settings_field(
            'cmp_script',
            __('CMP Script', 'adhubplatform-ads'),
            array($this, 'render_textarea_field'),
            $this->page_name,
            'adhub_cmp_section',
            array(
                'label_for' => 'cmp_script',
                'field_name' => 'cmp_script',
                'description' => __('Insert your CMP JavaScript code here', 'adhubplatform-ads'),
                'class' => 'large-text code'
            )
        );

        // Sezione Desktop Ads
        add_settings_section(
            'adhub_desktop_section',
            __('Desktop Ad Tags', 'adhubplatform-ads'),
            array($this, 'render_desktop_section'),
            $this->page_name
        );

        // Desktop Ad Tags
        $desktop_positions = array(
            'desktop_970x250' => __('Masthead (970x250)', 'adhubplatform-ads'),
            'desktop_300x600' => __('Sidebar Top (300x600)', 'adhubplatform-ads'),
            'desktop_300x250' => __('Sidebar Bottom (300x250)', 'adhubplatform-ads'),
            'desktop_300x250_2' => __('Second 300x250', 'adhubplatform-ads'),
            'desktop_sticky_video' => __('Sticky Video Player', 'adhubplatform-ads'),
            'desktop_native_single' => __('Native Single (Article)', 'adhubplatform-ads'),
            'desktop_native_extended' => __('Native Extended', 'adhubplatform-ads'),
            'desktop_728x90' => __('Footer Banner (728x90)', 'adhubplatform-ads'),
            'desktop_skin' => __('Skin', 'adhubplatform-ads')
        );

        foreach ($desktop_positions as $key => $label) {
             /**
             * translators: %s: Ad position label
             */
            $description = sprintf(
                __('Insert JavaScript tag for %s', 'adhubplatform-ads'),
                $label
            );
            
            add_settings_field(
                $key,
                $label,
                array($this, 'render_textarea_field'),
                $this->page_name,
                'adhub_desktop_section',
                array(
                    'label_for' => $key,
                    'field_name' => $key,
                    'description' => $description,
                    'class' => 'large-text code'
                )
            );
        }

        // Sezione Mobile Ads
        add_settings_section(
            'adhub_mobile_section',
            __('Mobile Ad Tags', 'adhubplatform-ads'),
            array($this, 'render_mobile_section'),
            $this->page_name
        );

        // Mobile Ad Tags
        $mobile_positions = array(
            'mobile_320x100' => __('Sticky Banner (320x100)', 'adhubplatform-ads'),
            'mobile_320x50' => __('Mobile Banner (320x50)', 'adhubplatform-ads')
        );

        foreach ($mobile_positions as $key => $label) {
            /**
            *  translators: %s: Ad position label
            */            
            $description = sprintf(
                __('Insert JavaScript tag for %s', 'adhubplatform-ads'),
                $label
            );
            
            add_settings_field(
                $key,
                $label,
                array($this, 'render_textarea_field'),
                $this->page_name,
                'adhub_mobile_section',
                array(
                    'label_for' => $key,
                    'field_name' => $key,
                    'description' => $description,
                    'class' => 'large-text code'
                )
            );
        }
    }

    public function render_textarea_field($args) {
        $options = $this->options->get_all_options();
        $value = isset($options[$args['field_name']]) ? $options[$args['field_name']] : '';
        
        printf(
            '<textarea id="%1$s" name="adhub_platform_options[%1$s]" class="%2$s" rows="4">%3$s</textarea>',
            esc_attr($args['field_name']),
            esc_attr($args['class']),
            esc_textarea($value)
        );

        if ($args['field_name'] !== 'cmp_script') {
            echo '<br><br>';
            echo '<label>' . esc_html__('Show on:', 'adhubplatform-ads') . '</label><br>';
            $this->render_device_selector($args);
        }
    
        if (isset($args['description'])) {
            printf('<p class="description">%s</p>', esc_html($args['description']));
        }
    
        $shortcode_info = $this->get_shortcode_info($args['field_name']);
        if ($shortcode_info) {
            echo '<p class="shortcode-info" style="background: #f0f0f1; padding: 10px; border-left: 4px solid #2271b1; margin-top: 10px;">';
            echo '<strong>' . esc_html__('Shortcode:', 'adhubplatform-ads') . '</strong> ';
            echo '<code>[' . esc_html($shortcode_info['specific']) . ']</code>';
            echo ' ' . esc_html__('or', 'adhubplatform-ads') . ' ';
            echo '<code>[adhub_ad position="' . esc_html($args['field_name']) . '"]</code>';
            echo '</p>';
        }
    }

    private function get_shortcode_info($position) {
        $shortcodes = array(
            'desktop_970x250' => array('specific' => 'adhub_970x250'),
            'desktop_300x600' => array('specific' => 'adhub_300x600'),
            'desktop_300x250' => array('specific' => 'adhub_300x250'),
            'desktop_300x250_2' => array('specific' => 'adhub_300x250_2'),
            'desktop_sticky_video' => array('specific' => 'adhub_sticky_video'),
            'desktop_native_single' => array('specific' => 'adhub_native_single'),
            'desktop_native_extended' => array('specific' => 'adhub_native_extended'),
            'desktop_728x90' => array('specific' => 'adhub_728x90'),
            'desktop_skin' => array('specific' => 'adhub_skin'),
            'mobile_320x100' => array('specific' => 'adhub_320x100'),
            'mobile_320x50' => array('specific' => 'adhub_320x50'),
        );

        return isset($shortcodes[$position]) ? $shortcodes[$position] : false;
    }

    public function render_section($args) {
        $section_id = $args['id'];
        
        switch ($section_id) {
            case 'adhub_desktop_section':
                echo '<p>' . esc_html__('Configure JavaScript tags for desktop advertisements.', 'adhubplatform-ads') . '</p>';
                break;
            case 'adhub_mobile_section':
                echo '<p>' . esc_html__('Configure JavaScript tags for mobile advertisements.', 'adhubplatform-ads') . '</p>';
                break;
            default:
                echo '<p>' . esc_html__('Configure advertisement settings.', 'adhubplatform-ads') . '</p>';
        }
    }

    public function sanitize_options($input) {
        $sanitized_input = array();
        
        $sanitized_input['enabled'] = isset($input['enabled']) ? (bool)$input['enabled'] : false;

        if (isset($input['cmp_script'])) {
            $sanitized_input['cmp_script'] = wp_kses_post($input['cmp_script']);
        }

        $ad_positions = array(
            'desktop_970x250', 'desktop_300x600', 'desktop_300x250',
            'desktop_300x250_2', 'desktop_sticky_video', 'desktop_native_single',
            'desktop_native_extended', 'desktop_728x90', 'desktop_skin',
            'mobile_320x100', 'mobile_320x50'
        );

        foreach ($ad_positions as $position) {
            if (isset($input[$position])) {
                $sanitized_input[$position] = wp_kses_post($input[$position]);
            }
            
            $device_key = $position . '_device';
            if (isset($input[$device_key])) {
                $sanitized_input[$device_key] = in_array($input[$device_key], ['desktop', 'mobile', 'both']) 
                    ? $input[$device_key] 
                    : 'both';
            }
        }

        return $sanitized_input;
    }

    public function render_desktop_section() {
        echo '<p>' . esc_html__('Insert JavaScript tags for desktop advertisements.', 'adhubplatform-ads') . '</p>';
    }
    
    public function render_mobile_section() {
        echo '<p>' . esc_html__('Insert JavaScript tags for mobile advertisements.', 'adhubplatform-ads') . '</p>';
    }
    
    public function render_general_section() {
        echo '<p>' . esc_html__('Configure general settings for advertisement display.', 'adhubplatform-ads') . '</p>';
    }
    
    public function render_cmp_section() {
        echo '<p>' . esc_html__('Configure your Consent Management Platform settings.', 'adhubplatform-ads') . '</p>';
    }

    public function render_settings_page() {
        if (!current_user_can('manage_options')) {
            wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'adhubplatform-ads'));
        }
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('adhub_platform_options');
                do_settings_sections($this->page_name);
                submit_button(esc_html__('Save Settings', 'adhubplatform-ads'));
                ?>
            </form>
        </div>
        <?php
    }

    public function render_checkbox_field($args) {
        $options = $this->options->get_all_options();
        $value = isset($options[$args['field_name']]) ? $options[$args['field_name']] : false;
        
        printf(
            '<label for="%1$s">
                <input type="checkbox" 
                    id="%1$s" 
                    name="adhub_platform_options[%1$s]" 
                    value="1" 
                    %2$s 
                />
            </label>',
            esc_attr($args['field_name']),
            checked(1, $value, false)
        );

        if (isset($args['description'])) {
            printf('<p class="description">%s</p>', esc_html($args['description']));
        }
    }

    public function add_admin_menu() {
        add_menu_page(
            __('AdhubPlatform Settings', 'adhubplatform-ads'),
            'AdhubPlatform',
            'manage_options',
            $this->page_name,
            array($this, 'render_settings_page'),
            'dashicons-money',
            100
        );
    }

    public function enqueue_scripts($hook) {
        if ('toplevel_page_' . $this->page_name !== $hook) {
            return;
        }

        wp_enqueue_style(
            'adhub-platform-admin',
            ADHUB_PLATFORM_URL . 'assets/css/admin.css',
            array(),
            ADHUB_PLATFORM_VERSION
        );

        wp_enqueue_script(
            'adhub-platform-admin',
            ADHUB_PLATFORM_URL . 'assets/js/admin.js',
            array('jquery'),
            ADHUB_PLATFORM_VERSION,
            true
        );
    }

  
    public function render_device_selector($args) {
        $options = $this->options->get_all_options();
        $field_name = $args['field_name'] . '_device';
        $value = isset($options[$field_name]) ? $options[$field_name] : 'both';
        
        ?>
        <select name="adhub_platform_options[<?php echo esc_attr($field_name); ?>]">
            <option value="both" <?php selected($value, 'both'); ?>><?php esc_html_e('Desktop & Mobile', 'adhubplatform-ads'); ?></option>
            <option value="desktop" <?php selected($value, 'desktop'); ?>><?php esc_html_e('Desktop Only', 'adhubplatform-ads'); ?></option>
            <option value="mobile" <?php selected($value, 'mobile'); ?>><?php esc_html_e('Mobile Only', 'adhubplatform-ads'); ?></option>
        </select>
        <?php
    }




}


remove_filter('content_save_pre', 'wp_filter_post_kses');
remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

// Allow script tags in user input
add_filter('wp_kses_allowed_html', function($allowed_tags) {
    $allowed_tags['script'] = array(
        'type' => true,
        'src' => true,
        'async' => true,
        'defer' => true,
    );
    return $allowed_tags;
}, 10, 1);
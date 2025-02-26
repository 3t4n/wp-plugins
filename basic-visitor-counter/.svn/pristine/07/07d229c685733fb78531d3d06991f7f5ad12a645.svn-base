<?php

class Basivicoun_Admin {
    private $table_name;

    public function __construct($table_name) {
        $this->table_name = $table_name;
        add_action('admin_menu', [$this, 'add_admin_page']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function add_admin_page() {
        add_menu_page(
            'Basic Visitor Counter',
            'Visitor Counter',
            'manage_options',
            'basic-visitor-counter',
            [$this, 'render_admin_page'],
            'dashicons-visibility',
            100
        );
    }


    public function render_admin_page() {
        ?>
        <div class="wrap">
            <h1>Basic Visitor Counter Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('basivicoun_settings_group');
                do_settings_sections('basivicoun_settings');
                submit_button();
                ?>
            </form>
            <h2>Visitor Statistics</h2>
            <p>Total Visitors: <strong><?php echo esc_html($this->get_visitor_count()); ?></strong></p>
        </div>
        <?php
    }

    public function register_settings() {
        register_setting('basivicoun_settings_group', 'basivicoun_enable_tracking', ['sanitize_callback' => 'absint']);
        add_settings_section('basivicoun_settings_section', 'General Settings', null,'basivicoun_settings');

        add_settings_field(
            'basivicoun_enable_tracking',
            'Enable Visitor Tracking',
            [$this, 'render_tracking_field'],
            'basivicoun_settings',
            'basivicoun_settings_section'
        );
    }
   
/**
 * Sanitization callback function for tracking option.
 */
public function sanitize_tracking_option($input) {
   return sanitize_text_field($input);
}
    public function render_tracking_field() {
        $value = get_option('basivicoun_enable_tracking', '1');
        ?>
        <input type="checkbox" name="basivicoun_enable_tracking" value="1" <?php checked($value, '1'); ?> />
        Enable visitor tracking
        <?php
    }

    private function get_visitor_count() {
        global $wpdb;
        $table_name = esc_sql($this->table_name);
        $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `%s`", $table_name));
        return $count;
    }
}

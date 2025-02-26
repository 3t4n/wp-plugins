<?php

class Basivicoun_Tracker {
    private $table_name;

    public function __construct($table_name) {
        $this->table_name = $table_name;
        add_action('wp_footer', [$this, 'track_visitor']);
        add_shortcode('basivicoun_track_visitor', [$this, 'get_track_visitor']);
    }

    public function track_visitor() {
        if (get_option('basivicoun_enable_tracking') !== '1') {
            return; // Tracking is disabled
        }

        global $wpdb;
        $ip_address = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0'));

        $table_name = esc_sql($this->table_name);
        $stamp = gmdate('Y-m-d H:i:s', strtotime("-5 minutes")); // Corrected timestamp logic

        // Avoid duplicate entries from the same IP within 5 minutes
  
         $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `%s` WHERE ip_address = %s AND visit_time > %d",
                $table_name,
                $ip_address,
                $stamp
               ));

           if ($count == 0) {
            $wpdb->insert(
                $table_name,
                [
                    'ip_address' => $ip_address,
                    'visit_time' => current_time('mysql'),
                ],
                [
                    '%s',
                    '%s',
                ]
            );
        }
    }

    public function get_track_visitor() {
        return esc_html($this->get_visitor_count()); // Return instead of echo
    }

     private function get_visitor_count() {
        global $wpdb;
        $table_name = esc_sql($this->table_name);
        $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `%s`", $table_name));
        return $count;
    }
}

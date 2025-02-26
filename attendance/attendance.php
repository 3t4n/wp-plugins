<?php
/*

Plugin Name: Attendance
Description: Track attendance with ease on the front-end of your site: easy-to-use, self-hosted app including analytics, reports, multiple user access, offline support.
Version: 1.1.15
Contributors: remetric
Author: Dallas Read
Author URI: http://www.fastwordpress.org
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=29U2LHYQNAURL
Text Domain: attendance
Tags: attendance
Requires at least: 3.6
Tested up to: 5.3
Stable tag: trunk
License: MIT

Copyright (c) 2019 Dallas Read.

ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(-1);
*/

require_once 'lib/api.php';

class Attendance {
    public static $attendance_instance;
    public static $vars;
    public static $notice;
    public static $error;

    const VERSION = 1;
    const DEBUG = false;
    const UPGRADE_URL = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=29U2LHYQNAURL';

    public static function init() {
        if ( is_null( self::$attendance_instance ) ) { self::$attendance_instance = new Attendance(); }
        return self::$attendance_instance;
    }

    private function __construct() {
        define('ATTENDANCE_ROOT', dirname(__FILE__));

        add_action( 'admin_menu',                   array( $this, 'menu_page' ) );
        add_action( 'admin_init',                   array( $this, 'admin_init' ) );
        add_action( 'admin_notices',                array( $this, 'admin_notices' ) );
        add_filter( 'template_redirect',            array( $this, 'template_redirect' ) );
        add_filter( 'plugin_action_links',          array( $this, 'plugin_action_links' ), 10, 2 );
        add_action( 'send_attendance_daily_digest', array( $this, 'send_daily_digest' ));

        if (!wp_next_scheduled('send_attendance_daily_digest')) {
            wp_schedule_event( strtotime( 'next monday 7am' ), 'daily', 'send_attendance_daily_digest' );
        }

        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
    }

    public static function plugin_action_links($links, $file) {
        if ($file != 'attendance/attendance.php') {
            return $links;
        }

        $attendance = self::get_vars();
        $attendance_links = array(
            'app' => '<a href="' . home_url() . $attendance['slug'] . '" target="_blank">App</a>',
            'settings' => '<a href="' . admin_url('options-general.php?page=attendance') . '">Settings</a>'
        );

        if (!$attendance['paid']) {
            $attendance_links['upgrade'] = '<a href="' . self::UPGRADE_URL . '" target="_blank">Upgrade Now</a>';;
        }

        return array_merge($links, $attendance_links);
    }

    public static function template_redirect() {
        global $wp;

        $slug = get_option( 'attendance_slug', '/attendance' );
        $target = '/' . ltrim($slug, '/');
        $current = '/' . ltrim(add_query_arg( array(), $wp->request ), '/');

        if ($target == $current) {
            // wp_redirect( site_url($slug . '/'), 301 );
            wp_redirect( plugins_url('app/dist/', __FILE__) . '?api_url=' . get_rest_url() . 'attendance/v1&secret_key=' . get_option( 'attendance_secret_key' ), 301 );
            // $test = 'aha';
            // require_once 'app/dist/index.html';
            exit;
        }
    }

    public static function admin_init() {
        // wp_register_script( 'attendance_admin', plugins_url('js/attendance.js', __FILE__) );
        // wp_enqueue_script( array( 'jquery' ) );

        if (isset($_POST['attendance-reset'])) {
            self::reset();
        }

        $attendance = self::get_vars();
        require_once 'lib/settings.php';
    }

    public static function update_rewrite_rules($slug) {
        global $wp_rewrite;


        $non_wp_rules = array();
        $non_wp_rules[ltrim($slug, '/') . '/(.*)'] = plugins_url('app/dist/$1', __FILE__);

        $wp_rewrite->non_wp_rules = $non_wp_rules + $wp_rewrite->non_wp_rules;
        $wp_rewrite->flush_rules();
    }

    public static function menu_page() {
        add_options_page(
            'Attendance',
            'Attendance',
            'manage_options',
            'attendance',
            array('Attendance', 'admin_panel')
        );
    }

    public static function admin_panel() {
        // wp_register_style( 'attendance_admin', plugins_url('css/style.css', __FILE__) );
        // wp_enqueue_style( array( 'attendance_admin' ) );
        $attendance = self::get_vars();
        require_once 'templates/pages/general.php';
    }

    public static function setting($setting) {
        $attendance = self::get_vars();

        if ($setting['type'] != 'description') {
            require 'templates/fields/' . $setting['type'] . '.php';
        }

        require 'templates/fields/description.php';
    }

    public static function admin_notices() {
        if (!isset($_GET['page']) || $_GET['page'] != 'attendance') {
            return;
        }

        $attendance = self::get_vars();

        if (strlen(self::$notice) > 0) {
            echo "<div class='updated'><p>" . self::$notice . "</p></div>";
        }

        if (strlen(self::$error) > 0) {
            echo "<div class='error'><p>" . self::$error . "</p></div>";
        }
    }

    public static function get_vars($override = false) {
        if ($override || is_null( self::$vars ) || isset($_POST)) {
            $secret_key = get_option( 'attendance_secret_key', '' );
            $slug = get_option( 'attendance_slug', '/attendance' );
            $paid = empty($secret_key) ? false : $secret_key[0] == 'p';

            if (strlen($secret_key) > 0 && !$paid) {
                self::$error = 'Activation Code is invalid.';
                update_option( 'attendance_secret_key', '' );
                $secret_key = '';
            } else if ($paid) {
                self::$notice = '<strong>Activation Code is valid!</strong><br>Start using Attendance @ <a href="' . home_url() . $slug . '" target="_blank">' . home_url() . $slug . '</a>';
            } else {
                self::$notice = 'Start using Attendance @ <a href="' . home_url() . $slug . '" target="_blank">' . home_url() . $slug . '</a>';
            }

            if (isset($_POST) && isset($_POST['attendance_slug'])) {
                self::update_rewrite_rules($slug);
            }

            self::$vars = array(
                'version' => self::VERSION,
                'secret_key' => $secret_key,
                'title' => get_option( 'attendance_title', 'Attendance' ),
                'slug' => $slug,
                'paid' => $paid,
                'notify' => get_option( 'attendance_notify', get_option('admin_email', '') )
            );
        }

        return self::$vars;
    }

    public static function reset() {
        $query = new WP_Query(array(
            'post_type' => array(
                AttendanceAPI::TABLE_PREFIX . 'day',
                AttendanceAPI::TABLE_PREFIX . 'location',
                AttendanceAPI::TABLE_PREFIX . 'person',
                AttendanceAPI::TABLE_PREFIX . 'staff'
            ),
            'post_status' => 'any',
            'posts_per_page' => -1
        ));

        while ($query->have_posts()) {
            $query->the_post();
            wp_delete_post( get_the_ID(), true );
        }
    }

    public static function deactivate() {
        wp_clear_scheduled_hook( 'send_attendance_daily_digest' );
    }

    public static function get_people() {
        global $attendance_people;

        if (isset($attendance_people)) {
            return $attendance_people;
        }

        return new WP_Query(array(
            'post_type' => AttendanceAPI::TABLE_PREFIX . 'person',
            'posts_per_page' => -1
        ));
    }

    public static function build_location_data($location, $startAt, $endAt) {
        $people = self::get_people();

        $days = new WP_Query(array(
            'post_type' => AttendanceAPI::TABLE_PREFIX . 'day',
            'posts_per_page' => -1,
            'meta_query' => array(
                'relation' => 'AND',
                'date' => array(
                    'key'     => AttendanceAPI::TABLE_PREFIX . 'date',
                    'compare' => '<=',
                    'value'   => $endAt,
                ),
                array(
                    'key'     => AttendanceAPI::TABLE_PREFIX . 'date',
                    'compare' => '>=',
                    'value'   => $startAt,
                ),
                array(
                    'key'     => AttendanceAPI::TABLE_PREFIX . 'locationId',
                    'compare' => '>=',
                    'value'   => $location->ID,
                )
            ),
            'orderby' => array(
                'date' => 'asc'
            )
        ));

        $location->dates = array();

        foreach ($days->posts as $key => $day) {
            $people_ids = get_post_meta($day->ID, AttendanceAPI::TABLE_PREFIX . 'peopleIds', true);
            $date = get_post_meta($day->ID, AttendanceAPI::TABLE_PREFIX . 'date', true);
            $location->dates[$date] = $people_ids;
        }

        return $location;
    }

    public static function location_to_csv($location) {
        $people = self::get_people();

        $output = 'Name';

        foreach ($location->dates as $date => $people_ids) {
            $output .= ', ' . $date;
        }

        $output .= "\r\n";

        foreach ($people->posts as $key => $person) {
            $any = true;

            if ($any) {
                $output .= $person->post_title;

                foreach ($location->dates as $date => $people_ids) {
                    if (in_array($person->ID, $people_ids)) {
                        $output .= ',1';
                    } else {
                        $output .= ',';
                    }
                }


                $output .= "\r\n";
            }
        }

        return $output;
    }

    public static function send_daily_digest() {
        if (date('D') != 'Mon') {
            die('Today is not Monday.');
        }

        $attendance = self::get_vars();
        $attachments = array();
        $headers = '';

        if (empty($attendance['notify'])) {
            die('Attendance Digest email address not set.');
        }

        $startAt = date( 'Y-m-d', strtotime( 'last sunday -1 week' ) );
        $endAt = date( 'Y-m-d', strtotime( 'last sunday' ) );

        $locations = new WP_Query(array(
            'post_type' => AttendanceAPI::TABLE_PREFIX . 'location',
            'posts_per_page' => -1
        ));

        foreach ($locations->posts as $key => $location) {
            self::build_location_data( $location, $startAt, $endAt );

            if (!empty($location->dates)) {
                $path = get_temp_dir() . $location->post_title . ' (' . $startAt . ' to ' . $endAt . ').csv';
                $file = fopen($path, 'w') or die('Unable to open file!');
                $csv = self::location_to_csv($location);

                if (fwrite($file, $csv)) {
                    $attachments[] = $path;
                }
            }
        }

        wp_mail(
            $attendance['notify'],
            'Attendance from ' . $startAt . ' to ' . $endAt,
            'Here is a summary of the Attendance from ' . $startAt . ' to ' . $endAt . '.',
            $headers,
            $attachments
        );

        foreach ($attachments as $attachment) {
            unlink($attachment);
        }
    }
}

Attendance::init();

?>

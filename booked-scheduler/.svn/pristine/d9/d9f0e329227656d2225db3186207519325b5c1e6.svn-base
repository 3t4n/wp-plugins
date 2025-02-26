<?php
/**
 * @copyright Copyright 2024 Twinkle Toes Software, LLC
 */

defined('ABSPATH') || exit;

require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'includes/class-booked-exception.php';

class Booked_Plugin
{
    private Booked_Loader $loader;
    private Booked_Admin $admin;
    private string $version = "1.0.0";

    public function __construct()
    {
        require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'includes/class-booked-loader.php';
        require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'admin/class-booked-admin.php';

        $this->loader = new Booked_Loader();
        $this->admin = new Booked_Admin($this->loader, $this->version);
    }

    public function enqueue_styles($hook)
    {
        wp_enqueue_style('booked-scheduler-app-css', plugins_url('css/booked-app.css', BOOKED_SCHEDULER_PLUGIN_FILE), [], $this->version, 'all');
    }

    public function enqueue_scripts($hook)
    {
        wp_enqueue_script("booked-scheduler-app", plugins_url('js/booked-scheduler-app.js', BOOKED_SCHEDULER_PLUGIN_FILE), ['jquery'], $this->version, ['in_footer' => true]);
        wp_localize_script(
            'booked-scheduler-app',
            'booked_scheduler_ajax',
            [
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('booked-scheduler-app')
            ]);
    }

    public function run()
    {
        $this->addActions();
        $this->addShortCodes();
        $this->admin->run();

        $this->loader->run(); // always last to run
    }

    private function render_shortcode($atts, $content, $shortcode_tag, $action)
    {
        $this->enqueue_styles('');
        $this->enqueue_scripts('');

        $scheduleId = array_key_exists('scheduleid', $atts) ? $atts['scheduleid'] : '';
        $resourceIds = array_key_exists('resourceids', $atts) ? $atts['resourceids'] : '';
        $defaultCalendarView = array_key_exists('defaultview', $atts) ? $atts['defaultview'] : '';

        return "<div>
<div id=\"booked-schedule-app\"></div>
<input type=\"hidden\" id=\"booked-schedule-param-scheduleid\" value=\"$scheduleId\" />
<input type=\"hidden\" id=\"booked-schedule-param-resourceids\" value=\"$resourceIds\" />
<input type=\"hidden\" id=\"booked-schedule-param-action\" value=\"$action\" />
<input type=\"hidden\" id=\"booked-schedule-param-defaultview\" value=\"$defaultCalendarView\" />
</div>";
    }

    public function render_schedule_shortcode($atts, $content, $shortcode_tag)
    {
        return self::render_shortcode($atts, $content, $shortcode_tag, 'booked_load_schedule');
    }

    public function render_calendar_shortcode($atts, $content, $shortcode_tag)
    {
        return self::render_shortcode($atts, $content, $shortcode_tag, 'booked_load_calendar');
    }

    private function init()
    {
        require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'includes/class-booked-initiator.php';
        Booked_Initiator::init();
    }

    public function load_schedule()
    {
        $this->load_booked_view(function ($scheduleId, $resourceIds) {
            $bookedServer = new Booked_Server();
            return $bookedServer->LoadSchedule($scheduleId, $resourceIds);
        });
    }

    public function load_calendar()
    {
        $this->load_booked_view(function ($scheduleId, $resourceIds, $defaultCalendarViewForm) {
            $bookedServer = new Booked_Server();
            return $bookedServer->LoadCalendar($scheduleId, $resourceIds, $defaultCalendarViewForm);
        });
    }

    private function load_booked_view($callback)
    {
        check_ajax_referer('booked-scheduler-app');

        require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'includes/class-booked-server.php';

        $scheduleIdForm = sanitize_text_field(wp_unslash($_POST['data']['scheduleId'] ?? ''));
        $resourceIdsForm = sanitize_text_field(wp_unslash($_POST['data']['resourceIds'] ?? ''));
        $defaultCalendarViewForm = sanitize_text_field(wp_unslash($_POST['data']['defaultview'] ?? ''));

        $scheduleId = empty($scheduleIdForm) ? null : $scheduleIdForm;
        $resourceIds = empty($resourceIdsForm) ? [] : explode(',', $resourceIdsForm);

        if (empty($scheduleId) && empty($resourceIds)) {
            wp_send_json_error(['message' => 'Error rendering booked_schedule shortcode. Either scheduleid or resourceid must be set.']);
        }

        try {
            $options = $callback($scheduleId, $resourceIds, $defaultCalendarViewForm);

        } catch (Booked_Exception $ex) {
            wp_send_json_error(['message' => 'Error rendering booked_schedule shortcode. ' . $ex->getMessage()]);
        }

        wp_send_json_success(['message' => $options]);
    }

    private function addActions()
    {
        $this->loader->add_action('wp_ajax_booked_load_schedule', fn() => $this->load_schedule());
        $this->loader->add_action('wp_ajax_nopriv_booked_load_schedule', fn() => $this->load_schedule());
        $this->loader->add_action('wp_ajax_booked_load_calendar', fn() => $this->load_calendar());
        $this->loader->add_action('wp_ajax_nopriv_booked_load_calendar', fn() => $this->load_calendar());
        $this->loader->add_action('init', fn() => $this->init());
    }

    private function addShortCodes()
    {
        $this->loader->add_shortcode('booked_schedule', fn($atts, $content, $shortcode_tag) => $this->render_schedule_shortcode($atts, $content, $shortcode_tag));
        $this->loader->add_shortcode('booked_calendar', fn($atts, $content, $shortcode_tag) => $this->render_calendar_shortcode($atts, $content, $shortcode_tag));
    }
}
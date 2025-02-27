<?php

/**
 * Corn jobs.
 */

defined('ABSPATH') || exit;

class APBD_WPS_Corn_Jobs extends AppsBDModel
{
    function __construct()
    {
        $this->cronSchedules();
        $this->createSchedules();
        $this->createActions();
    }

    function cronSchedules()
    {
        add_filter('cron_schedules', function ($schedules = array()) {
            if (!is_array($schedules)) {
                $schedules = [];
            }

            $items = [];

            foreach ($items as $item) {
                $recurrence = $item['recurrence'];
                $interval = $item['interval'];
                $display = $item['display'];

                if (!isset($schedules[$recurrence])) {
                    $schedules[$recurrence] = array(
                        'interval' => $interval,
                        'display' => $display
                    );
                }
            }

            return $schedules;
        }, 20);
    }

    function createSchedules()
    {
        $timestamp  = time();

        $items = [];

        foreach ($items as $item) {
            $recurrence = $item['recurrence'];
            $hook = $item['hook'];

            if (!wp_next_scheduled($hook)) {
                wp_schedule_event($timestamp, $recurrence, $hook);
            }

            if (false !== get_option($hook)) {
                delete_option($hook);
            }
        }
    }

    function createActions() {}
}

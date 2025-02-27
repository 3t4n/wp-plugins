<?php

// Custom Intervals

function dark_visitors_add_cron_intervals($schedules) {
    $schedules['every_five_minutes'] = array(
        'interval' => 300
    );

    return $schedules;
}

add_filter('cron_schedules', 'dark_visitors_add_cron_intervals');

// Starting

function dark_visitors_start_cron_jobs_if_needed() {
    if (!wp_next_scheduled(DARK_VISITORS_DAILY_CRON_EVENT)) {
        wp_schedule_event(time(), 'daily', DARK_VISITORS_DAILY_CRON_EVENT);
    }

    if (!wp_next_scheduled(DARK_VISITORS_EVERY_FIVE_MINUTES_CRON_EVENT)) {
        wp_schedule_event(time(), 'every_five_minutes', DARK_VISITORS_EVERY_FIVE_MINUTES_CRON_EVENT);
    }
}

add_action('init', 'dark_visitors_start_cron_jobs_if_needed');

// Stopping

function dark_visitors_stop_cron_jobs() {
    wp_clear_scheduled_hook(DARK_VISITORS_DAILY_CRON_EVENT);
    wp_clear_scheduled_hook(DARK_VISITORS_EVERY_FIVE_MINUTES_CRON_EVENT);
}

register_deactivation_hook(DARK_VISITORS_PLUGIN_FILE, 'dark_visitors_stop_cron_jobs');
<?php
define('DFEHC_MAX_SERVER_LOAD', 85);
define('DFEHC_MIN_INTERVAL', 15);
define('DFEHC_MAX_INTERVAL', 300);
define('DFEHC_LOAD_AVERAGES', 'dfehc_load_averages');
define('DFEHC_SERVER_LOAD', 'dfehc_server_load');

function dfehc_register_ajax($action, $callback) {
    add_action('wp_ajax_' . $action, $callback);
    add_action('wp_ajax_nopriv_' . $action, $callback);
}

function dfehc_get_server_load_ajax_handler() {
    $nonce = filter_input(INPUT_POST, 'nonce', FILTER_SANITIZE_STRING);
    $server_load = filter_input(INPUT_POST, 'serverLoad', FILTER_SANITIZE_NUMBER_FLOAT);
    $server_response_time = filter_input(INPUT_POST, 'serverResponseTime', FILTER_SANITIZE_NUMBER_FLOAT);

    if (!wp_verify_nonce($nonce, 'dfehc-ajax-nonce')) {
        wp_send_json_error('Heartbeat: Invalid nonce provided.');
        return;
    }
    $cached_server_load = get_transient(DFEHC_SERVER_LOAD);

    if ($cached_server_load !== false) {
        wp_send_json_success($cached_server_load);
        wp_die();
    }
    $server_load = dfehc_calculate_server_load();
    if ($server_load !== false) {
        set_transient(DFEHC_SERVER_LOAD, $server_load, 5 * MINUTE_IN_SECONDS);
        $interval = dfehc_calculate_recommended_interval_user_activity($server_load);
        if ($interval > 0) {
            wp_send_json_success($interval);
        } else {
            wp_send_json_error('Heartbeat: Failed to calculate interval.');
        }
    } else {
        wp_send_json_error('Heartbeat: Server load calculation not supported.');
    }
}
dfehc_register_ajax('get_server_load', 'dfehc_get_server_load_ajax_handler');

function dfehc_calculate_server_load() {
    if (function_exists('sys_getloadavg')) {
        $load = sys_getloadavg();
        return $load[0];
    } elseif (function_exists('exec') && !empty($_SERVER['SERVER_ADDR'])) {
        $serverIP = $_SERVER['SERVER_ADDR'];
        $command = "uptime";
        $output = [];
        exec($command, $output);
        preg_match('/load average: ([0-9.]+)/', implode(" ", $output), $matches);
        if (!empty($matches[1])) {
            $serverLoad = (float) $matches[1];
        }
    } elseif (is_readable('/proc/loadavg')) {
        $loadAvgFile = file_get_contents('/proc/loadavg');
        $loadAvgData = explode(' ', $loadAvgFile);
        $serverLoad = (float) $loadAvgData[0];
    } elseif (function_exists('shell_exec')) {
        $command = "uptime";
        $output = shell_exec($command);
        preg_match('/load average: ([0-9.]+)/', $output, $matches);
        if (!empty($matches[1])) {
            $serverLoad = (float) $matches[1];
        }
    } elseif (is_readable('/proc/stat')) {
        $statData = file_get_contents('/proc/stat');
        preg_match('/^cpu\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/', $statData, $matches);

        if (isset($matches[1], $matches[2], $matches[3], $matches[4])) {
            $idle = $matches[4];
            $total = $matches[1] + $matches[2] + $matches[3] + $matches[4];
            $serverLoad = (1 - ($idle / $total)) * 100;
        }
    } elseif (function_exists('microtime')) {
        $startTime = microtime(true);
        $endTime = $startTime + 0.1;
        $busyTime = 0;
        while (microtime(true) < $endTime) {
            $busyTime++;
        }
        $idleTime = ($endTime - $startTime) - $busyTime;
        $serverLoad = ($busyTime / ($busyTime + $idleTime)) * 100;
    }
    if ($serverLoad !== null) {
        $serverLoadPercentage = round(($serverLoad / getServerLoadCapacity()) * 100);
        wp_send_json_success($serverLoadPercentage);
    } else {
        wp_send_json_error('Failed to retrieve server load.');
    }
    return false;
}

class Heartbeat_Async {
    protected $action = '';

    public function __construct() {
        dfehc_register_ajax($this->action, [$this, 'handle_async_request']);
    }

    public function dispatch() {
        wp_schedule_event(time(), 'dfehc_5_minutes', $this->action);
    }

    public function handle_async_request() {
        $retry_count = 0;
        $max_retries = 3;
        while ($retry_count < $max_retries) {
            try {
                $this->run_action();
                break;
            } catch (Exception $e) {
                $retry_count++;
                if ($retry_count >= $max_retries) {
                    error_log("Heartbeat: " . $e->getMessage());
                }
            }
        }
        wp_die();
    }

    protected function run_action() {
        $last_activity = (int) get_transient('dfehc_last_user_activity');
        if ($last_activity <= 0) {
            throw new Exception('Last activity time is not valid: ' . $last_activity);
        }

        $time_elapsed = time() - $last_activity;

        $load_average = sys_getloadavg()[0];
        $load_averages = get_transient(DFEHC_LOAD_AVERAGES) ?: array();
        array_push($load_averages, $load_average);
        $load_averages = array_slice($load_averages, -5);
        $weights = [5, 4, 3, 2, 1];
        $average_load = array_sum(array_map(function($load, $weight) {
            return $load * $weight;
        }, $load_averages, $weights)) / array_sum($weights);
        set_transient(DFEHC_LOAD_AVERAGES, $load_averages, 30 * MINUTE_IN_SECONDS);

        $interval = $this->calculate_recommended_interval($time_elapsed, $average_load);

        set_transient('dfehc_recommended_interval', $interval, 5 * MINUTE_IN_SECONDS);

        return $interval;
    }

    protected function dfehc_calculate_recommended_interval($time_elapsed, $load_average) {
        if ($time_elapsed <= DFEHC_MIN_INTERVAL) {
            return DFEHC_MIN_INTERVAL;
        } elseif ($time_elapsed >= DFEHC_MAX_INTERVAL) {
            return DFEHC_MAX_INTERVAL;
        }
        return $this->calculate_interval($time_elapsed, $load_average);
    }

    private function dfehc_calculate_interval($time_elapsed, $load_average) {
        $user_activity_factor = $time_elapsed / DFEHC_MAX_INTERVAL;
        $server_load_factor = 1 - ($load_average / DFEHC_MAX_SERVER_LOAD);
        return DFEHC_MIN_INTERVAL + ($user_activity_factor * $server_load_factor * (DFEHC_MAX_INTERVAL - DFEHC_MIN_INTERVAL));
    }
}

function dfehc_custom_cron_interval_addition($schedules) {
    $schedules['dfehc_5_minutes'] = [
        'interval' => 300,
    ];
    return $schedules;
}
add_filter('cron_schedules', 'dfehc_custom_cron_interval_addition');
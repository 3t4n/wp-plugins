<?php
/*
Plugin Name: Dynamic Front-End Heartbeat Control
Description: An enhanced solution to optimize the performance of your WordPress website. Stabilize your website's load averages and enhance the browsing experience for visitors during high-traffic fluctuations. 
Version: 1.2.9
Author: Codeloghin
Author URI: https://www.fiverr.com/codeloghin
License: GPL2
*/

define('DFEHC_MIN_INTERVAL', 15);
define('DFEHC_MAX_INTERVAL', 300);
define('DFEHC_MAX_SERVER_LOAD', 85);
define('DFEHC_MAX_RESPONSE_TIME', 5000);
define('SERVER_LOAD_FACTOR', 1);
$nonce = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';
$server_load = isset($_POST['serverLoad']) ? floatval(sanitize_text_field($_POST['serverLoad'])) : 0;
$server_response_time = isset($_POST['serverResponseTime']) ? intval(sanitize_text_field($_POST['serverResponseTime'])) : 0;

function dfehc_set_default_last_activity_time($user_id) {
    update_user_meta($user_id, 'last_activity_time', current_time('timestamp'));
}
add_action('user_register', 'dfehc_set_default_last_activity_time');

class Dfehc_UserActivityProcess {
    private $queue;
    public function __construct() {
        $this->queue = new SplQueue(); 
    }
    public function push_to_queue($user) {
        $this->queue->enqueue($user);
    }
    public function process_queue() {
        while (!$this->queue->isEmpty()) {
            $user = $this->queue->dequeue();
            
            $lastActivity = get_user_meta($user->ID, 'last_activity_time', true);
            if (!$lastActivity) {
                update_user_meta($user->ID, 'last_activity_time', current_time('timestamp'));
            }
        }
    }
}

function dfehc_process_user_activity() {
    $user_activity_process = new Dfehc_UserActivityProcess();
    $batch_size = 75;
    $offset = 0;
    while ($users = dfehc_get_users_in_batches($batch_size, $offset)) {
        foreach ($users as $user) {
            $user_activity_process->push_to_queue($user);
        }
        $offset += $batch_size;
    }

    $user_activity_process->process_queue();
}
add_action('init', 'dfehc_process_user_activity');
add_action('dfehc_process_user_activity', 'dfehc_process_user_activity');

function dfehc_get_users_in_batches($batch_size, $offset) {
    $args = array(
        'number' => $batch_size,
        'offset' => $offset,
    );
    $user_query = new WP_User_Query($args);
    return $user_query->get_results();
}

function dfehc_record_user_activity() {
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $time = current_time('timestamp');
        update_user_meta($current_user->ID, 'last_activity_time', $time);
    }
}
add_action('wp_footer', 'dfehc_record_user_activity');
add_action('wp', 'dfehc_record_user_activity');

function dfehc_schedule_user_activity_processing() {
    if(!wp_next_scheduled('dfehc_process_user_activity')) {
        $user_activity_process = new Dfehc_UserActivityProcess();
        $batch_size = 75;
        $offset = 0;
        $users = array();
        do {
            $users = dfehc_get_users_in_batches($batch_size, $offset);

            if ($users) {
                foreach ($users as $user) {
                    $user_activity_process->push_to_queue($user);
                }
            }
            $offset += $batch_size;
        } while (count($users) === $batch_size);

        wp_schedule_single_event(time() + 10, 'dfehc_process_user_activity');
        wp_schedule_event(time(), 'hourly', 'dfehc_process_user_activity'); 
    }
}
add_action('init', 'dfehc_schedule_user_activity_processing');
add_action('dfehc_process_user_activity', 'dfehc_process_user_activity');

function dfehc_cleanup_user_activity($offset = 0, $batch_size = 75) {
    $users = get_users(array('number' => $batch_size, 'offset' => $offset));
    if (empty($users)) {
        return;
    }
    foreach ($users as $user) {
        delete_user_meta($user->ID, 'last_activity_time');
    }
    if (count($users) == $batch_size) {
        wp_schedule_single_event(time() + 10, 'dfehc_cleanup_user_activity', array($offset + $batch_size, $batch_size));
    }
}

if (!wp_next_scheduled('dfehc_cleanup_user_activity')) {
    wp_schedule_single_event(time(), 'dfehc_cleanup_user_activity');
}
add_action('dfehc_cleanup_user_activity', 'dfehc_cleanup_user_activity', 10, 2);

function dfehc_get_server_load() {
    $load_logs = get_option('dfehc_server_load_logs', array());
    $server_load = 0;

    if (function_exists('sys_getloadavg')) return sys_getloadavg()[0];
    if (function_exists('exec') && !empty($_SERVER['SERVER_ADDR'])) {
        preg_match('/load average: ([0-9.]+)/', implode(" ", exec("uptime", $output=[])), $matches);
        return !empty($matches[1]) ? (float) $matches[1] : 0;
    }
    if (is_readable('/proc/loadavg')) return (float) explode(' ', file_get_contents('/proc/loadavg'))[0];
    
    if (function_exists('proc_get_status')) {
        $process = proc_open('uptime', array(array('pipe', 'r'), array('pipe', 'w'), array('pipe', 'w')), $pipes);
        if (is_resource($process)) {
            $status = proc_get_status($process);
            fclose($pipes[0]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($process);

            if (isset($status['running']) && !$status['running']) {
                return (float) $status['exitcode'];
            }
        }
    }
    if (function_exists('shell_exec')) {
        preg_match('/load average: ([0-9.]+)/', shell_exec("uptime"), $matches);
        return !empty($matches[1]) ? (float) $matches[1] : 0;
    }
    if (is_readable('/proc/stat')) {
        preg_match('/^cpu\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/', file_get_contents('/proc/stat'), $matches);
        return isset($matches[1], $matches[2], $matches[3], $matches[4]) ? (1 - ($matches[4] / ($matches[1] + $matches[2] + $matches[3] + $matches[4]))) * 100 : 0;
    }
    if (function_exists('microtime')) {
        $startTime = microtime(true);
        $endTime = $startTime + 0.1;
        $busyTime = 0;
        while (microtime(true) < $endTime) $busyTime++;
        return ($busyTime / ($busyTime + ($endTime - $startTime))) * 100;
    }

    $load_logs[] = array(
        'timestamp' => time(),
        'load' => $server_load,
    );
    while (end($load_logs)['timestamp'] < time() - 86400) {
        array_shift($load_logs);
    }
    update_option('dfehc_server_load_logs', $load_logs);

    return $server_load;
}

function dfehc_get_server_health_status($load) {
    if(get_option('dfehc_disable_heartbeat')) {
        return 'Stopped';
    } elseif ($load < 14.95) {
        return 'Resting';
    } elseif ($load >= 15.00 && $load <= 33.00) {
        return 'Pacing';
    } elseif ($load > 35.00 && $load <= 67.65) {
        return 'Under Load';
    } else {
        return 'Under Strain';
    }
}

function dfehc_get_server_response_time() {
    $cached_response_time = get_transient('dfehc_cached_response_time');
    if ($cached_response_time !== false) {
        return $cached_response_time;
    }

    $ping_command = '';
    $response_time = null;

    if (function_exists('proc_open')) {
        if (stristr(PHP_OS, 'win')) {
            $ping_command = 'ping -n 1 localhost';
        } else {
            $ping_command = 'ping -c 1 localhost';
        }

        $descriptors = array(
            0 => array('pipe', 'r'),
            1 => array('pipe', 'w'),
            2 => array('pipe', 'w')
        );

        $process = @proc_open($ping_command, $descriptors, $pipes);

        if (is_resource($process)) {
            stream_set_blocking($pipes[1], 0);
            stream_set_blocking($pipes[2], 0);
            $status = proc_get_status($process);

            while ($status['running']) {
                usleep(500);
                $status = proc_get_status($process);
            }

            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            $time_regex = '/time=([0-9.]+) ms/';
            preg_match($time_regex, $output, $matches);

            if (!empty($matches[1])) {
                $response_time = (float) $matches[1];
            }

            fclose($pipes[0]);
            fclose($pipes[2]);
            proc_close($process);
        }
    }

    if ($response_time === null) {
        $calculate_response_time_with_php_operation = function () {
            $start_time = microtime(true);
            $test_array = range(1, 1000);
            shuffle($test_array);
            $end_time = microtime(true);
            return ($end_time - $start_time) * 1000;
        };

		$response_time = $calculate_response_time_with_php_operation();

        if ($response_time === null) {
            $response_time = DEFAULT_RESPONSE_TIME;
        }
    }

    if ($response_time !== null) {
        set_transient('dfehc_cached_response_time', $response_time, 3 * MINUTE_IN_SECONDS);
    }

    return $response_time;
}

function dfehc_load_average() {
    if (function_exists('sys_getloadavg')) {
        $loadavg = sys_getloadavg();
        return $loadavg[0];
    }
    return 0.0;
}

require( plugin_dir_path( __FILE__ ) . 'widget.php' );

function dfehc_get_system_load_average() {
    $load_average = get_transient('dfehc_get_system_load_average');

    if (false === $load_average) {
        if (function_exists('sys_getloadavg')) {
            $load_average = sys_getloadavg()[0];
        } elseif (function_exists('exec') && !empty($_SERVER['SERVER_ADDR'])) {
            $output = [];
            exec('uptime', $output);
            preg_match('/load average: ([0-9.]+)/', implode(" ", $output), $matches);
            $load_average = !empty($matches[1]) ? (float) $matches[1] : 0;
        } elseif (is_readable('/proc/loadavg')) {
            $load_average = (float) explode(' ', file_get_contents('/proc/loadavg'))[0];
        } elseif (function_exists('proc_get_status')) {
            $process = proc_open('uptime', array(array('pipe', 'r'), array('pipe', 'w'), array('pipe', 'w')), $pipes);
            if (is_resource($process)) {
                $status = proc_get_status($process);
                fclose($pipes[0]);
                fclose($pipes[1]);
                fclose($pipes[2]);
                proc_close($process);

                if (isset($status['running']) && !$status['running']) {
                    $load_average = (float) $status['exitcode'];
                }
            }
        } elseif (function_exists('shell_exec')) {
            $output = shell_exec("uptime");
            preg_match('/load average: ([0-9.]+)/', $output, $matches);
            $load_average = !empty($matches[1]) ? (float) $matches[1] : 0;
        } elseif (is_readable('/proc/stat')) {
            $matches = [];
            preg_match('/^cpu\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/', file_get_contents('/proc/stat'), $matches);
            $load_average = isset($matches[1], $matches[2], $matches[3], $matches[4]) ? (1 - ($matches[4] / ($matches[1] + $matches[2] + $matches[3] + $matches[4]))) * 100 : 0;
        } elseif (function_exists('microtime')) {
            $startTime = microtime(true);
            $endTime = $startTime + 0.1;
            $busyTime = 0;
            while (microtime(true) < $endTime) $busyTime++;
            $load_average = ($busyTime / ($busyTime + ($endTime - $startTime))) * 100;
        } else {
            $load_average = 0;
        }

        set_transient('dfehc_get_system_load_average', $load_average, 5 * MINUTE_IN_SECONDS);
    }

    return $load_average;
}
$load_average = dfehc_get_system_load_average();

function dfehc_enqueue_scripts() {
    wp_enqueue_script('heartbeat', plugin_dir_url(__FILE__) . 'js/heartbeat.js', array('jquery'), '1.0', true);
    wp_script_add_data('heartbeat', 'async', true);
    global $load_average;
    $recommendedInterval = dfehc_calculate_recommended_interval_user_activity($load_average, $batch_size = 75);
    wp_localize_script('heartbeat', 'dfehcData', array(
        'recommendedInterval' => $recommendedInterval,
    ));
}
add_action('wp_enqueue_scripts', 'dfehc_enqueue_scripts');

function dfehc_calculate_recommended_interval($time_elapsed, $load_average, $server_response_time) {
    $min_interval = get_option('DFEHC_MIN_INTERVAL', DFEHC_MIN_INTERVAL);
    $max_interval = get_option('DFEHC_MAX_INTERVAL', DFEHC_MAX_INTERVAL);

    $interval_factors = [
        'user_activity' => $time_elapsed / $max_interval,
        'server_load' => 1 - ($load_average / DFEHC_MAX_SERVER_LOAD),
        'response_time' => $server_response_time / DFEHC_MAX_RESPONSE_TIME
    ];

    $sliderValue = get_option('dfehc_priority_slider', 0);

    if ($sliderValue < 0) {
        $userActivityWeight = 0.4 + (0.1 * $sliderValue);
        $serverLoadWeight = 0.3 - (0.1 * $sliderValue / 2);
        $responseTimeWeight = 0.3 - (0.1 * $sliderValue / 2);
    } else {
        $userActivityWeight = 0.4 - (0.1 * $sliderValue);
        $serverLoadWeight = 0.3 + (0.1 * $sliderValue / 2);
        $responseTimeWeight = 0.3 + (0.1 * $sliderValue / 2);
    }

    $weights = [
        'user_activity' => $userActivityWeight,
        'server_load' => $serverLoadWeight,
        'response_time' => $responseTimeWeight
    ];

    $interval = $min_interval + weighted_sum($interval_factors, $weights) * ($max_interval - $min_interval);
    
    return dfehc_apply_exponential_moving_average($interval);
}

function dfehc_weighted_sum($factors, $weights) {
    $sum = 0;
    foreach ($factors as $key => $value) {
        $sum += $value * $weights[$key];
    }
    return $sum;
}

function dfehc_apply_exponential_moving_average($interval) {
    $ema_smoothing_factor = 0.4;
    $previous_intervals = get_transient('dfehc_previous_intervals');
    
    if (!$previous_intervals) {
        $previous_intervals = array($interval);
    } else {
        array_unshift($previous_intervals, $interval); 
        $previous_intervals = array_slice($previous_intervals, 0, 100);
        
        $interval = array_reduce($previous_intervals, function($carry, $item) use ($ema_smoothing_factor) {
            return $ema_smoothing_factor * $item + (1 - $ema_smoothing_factor) * $carry;
        }, $interval);  
    }
    
    set_transient('dfehc_previous_intervals', $previous_intervals, 10 * MINUTE_IN_SECONDS);
    return $interval;
}

function dfehc_calculate_recommended_interval_user_activity($load_average, $batch_size = 75) {
    if (PHP_OS_FAMILY !== 'Unix' || !function_exists('sys_getloadavg')) {
        return 60; 
    }

    $load_average = dfehc_get_system_load_average();
    
    $user_data = gather_user_activity_data($batch_size);
    $average_duration = $user_data['total_duration'] / $user_data['total_weight'];

    return dfehc_calculate_interval_based_on_duration($average_duration, $load_average);
}

function dfehc_gather_user_activity_data($batch_size) {
    $total_weighted_duration = 0;

    $total_weight = 0;
    $offset = 0;

    do {
        $userBatch = get_transient('dfehc_user_batch_' . $offset);
        if (!$userBatch) {
            $userBatch = dfehc_get_users_in_batches($batch_size, $offset);
            set_transient('dfehc_user_batch_' . $offset, $userBatch, HOUR_IN_SECONDS);
        }

        foreach ($userBatch as $user) {
            $activity_data = get_user_meta($user->ID, 'dfehc_user_activity', true);

            if (empty($activity_data['durations'])) continue;

            $user_weight = count($activity_data['durations']);
            $user_average_duration = array_sum($activity_data['durations']) / $user_weight;
            
            $total_weighted_duration += $user_weight * $user_average_duration;
            $total_weight += $user_weight;
        }

        $offset += $batch_size;
    } while (!empty($userBatch));

    return ['total_duration' => $total_weighted_duration, 'total_weight' => $total_weight];
}

function dfehc_calculate_interval_based_on_duration($average_duration, $load_average) {
    $min_interval = get_option('DFEHC_MIN_INTERVAL', DFEHC_MIN_INTERVAL);
    $max_interval = get_option('DFEHC_MAX_INTERVAL', DFEHC_MAX_INTERVAL);
    
    if ($average_duration <= $min_interval) {
        return $min_interval;
    } elseif ($average_duration >= $max_interval) {
        return $max_interval;
    } else {
        return calculate_recommended_interval($average_duration, $load_average, 0);
    }
}

require( plugin_dir_path( __FILE__ ) . 'settings.php' );

global $dfehc_redis_available;
global $dfehc_memcached_available;

$dfehc_redis_available = class_exists('Redis');
$dfehc_memcached_available = class_exists('Memcached');

function dfehc_get_server_load_persistent() {
    global $dfehc_redis_available, $dfehc_memcached_available;

    $server_load = null;

    try {
        if ($dfehc_redis_available) {
            $redis = new Redis();
            $redis_connected = $redis->connect(dfehc_get_redis_server(), dfehc_get_redis_port());
            if ($redis_connected) {
                $server_load = $redis->get('server_load');
            }
            $redis->close();
        } elseif ($dfehc_memcached_available) {
            $memcached = new Memcached();
            $memcached_connected = $memcached->addServer(dfehc_get_memcached_server(), dfehc_get_memcached_port());
            if ($memcached_connected) {
                $server_load = $memcached->get('server_load');
            }
            $memcached->quit();
        }
    } catch (Exception $e) {
        error_log('DFEHC Error: ' . $e->getMessage());
    }

    return $server_load;
}

function dfehc_get_server_load_ajax() {
    $nonce = isset($_POST['nonce']) ? $_POST['nonce'] : '';
    $server_load = isset($_POST['serverLoad']) ? floatval($_POST['serverLoad']) : 0;
    $server_response_time = isset($_POST['serverResponseTime']) ? intval($_POST['serverResponseTime']) : 0;

    if (!wp_verify_nonce($nonce, 'dfehc-ajax-nonce')) {
        wp_send_json_error('Invalid nonce.');
        return;
    }
    
    $serverLoad = null;

    if (function_exists('sys_getloadavg')) {
        $load = sys_getloadavg();
        $serverLoad = $load[0];
        dfehc_send_response($serverLoad);
        return;
    } 
    if (function_exists('exec') && !empty($_SERVER['SERVER_ADDR'])) {
        $serverIP = $_SERVER['SERVER_ADDR'];
        $command = "uptime";
        $output = [];
        exec($command, $output);
        preg_match('/load average: ([0-9.]+)/', implode(" ", $output), $matches);
        if (!empty($matches[1])) {
            $serverLoad = (float) $matches[1];
            dfehc_send_response($serverLoad);
            return;
        }
    } 
    if (is_readable('/proc/loadavg')) {
        $loadAvgFile = file_get_contents('/proc/loadavg');
        $loadAvgData = explode(' ', $loadAvgFile);
        $serverLoad = (float) $loadAvgData[0];
        dfehc_send_response($serverLoad);
        return;
    } 
    if (function_exists('shell_exec')) {
        $command = "uptime";
        $output = shell_exec($command);
        preg_match('/load average: ([0-9.]+)/', $output, $matches);
        if (!empty($matches[1])) {
            $serverLoad = (float) $matches[1];
            dfehc_send_response($serverLoad);
            return;
        }
    } 
    if (is_readable('/proc/stat')) {
        $statData = file_get_contents('/proc/stat');
        preg_match('/^cpu\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/', $statData, $matches);

        if (isset($matches[1], $matches[2], $matches[3], $matches[4])) {
            $idle = $matches[4];
            $total = $matches[1] + $matches[2] + $matches[3] + $matches[4];
            $serverLoad = (1 - ($idle / $total)) * 100;
            dfehc_send_response($serverLoad);
            return;
        }
    } 
    if (function_exists('microtime')) {
        $startTime = microtime(true);
        $endTime = $startTime + 0.1;
        $busyTime = 0;
        while (microtime(true) < $endTime) {
            $busyTime++;
        }
        $idleTime = ($endTime - $startTime) - $busyTime;
        $serverLoad = ($busyTime / ($busyTime + $idleTime)) * 100;
        dfehc_send_response($serverLoad);
        return;
    }

    wp_send_json_error('Failed to calculate server load.');
}

function dfehc_send_response($serverLoad) {
    $batch_size = 75; 
    $interval = dfehc_calculate_recommended_interval_user_activity($serverLoad, $batch_size);

    if ($interval > 0) {
        wp_send_json_success($interval);
    } else {
        wp_send_json_error('Failed to calculate interval. Check your web server settings and file permissions.');
    }
}

add_action('wp_ajax_get_server_load', 'dfehc_get_server_load_ajax');
add_action('wp_ajax_nopriv_get_server_load', 'dfehc_get_server_load_ajax');

function dfehc_get_time_elapsed() {
    static $dfehc_start_time;

    if (empty($dfehc_start_time)) {
        $dfehc_start_time = microtime(true);
        return 0;
    }

    $time_elapsed = microtime(true) - $dfehc_start_time;
    return $time_elapsed;
}

function dfehc_adjust_heartbeat_interval() {
    $time_elapsed = dfehc_get_time_elapsed();
    $load_average = dfehc_get_server_load_ajax();
    $server_response_time = dfehc_get_server_response_time();
    $recommended_interval = dfehc_calculate_recommended_interval($time_elapsed, $load_average, $server_response_time);
    $max_server_load = 85;
    $load_factor = 1 - $load_average / $max_server_load;

    if ($load_factor < 0) {
        $load_factor = 0;
    }

    $traffic_levels = [
        'low' => 50,
        'medium' => 75,
        'high' => PHP_INT_MAX,
    ];
    $traffic_level = 'low';
    foreach ($traffic_levels as $level => $threshold) {
        if ($load_average <= $threshold) {
            $traffic_level = $level;
            break;
        }
    }
    $intervals = [
        'low' => [15, 30, 60, 120, 180, 240, 300],
        'medium' => [30, 60, 120, 180, 240, 300],
        'high' => [60, 120, 180, 240, 300],
    ];

    $recent_intervals = array_slice($intervals[$traffic_level], -5);
    $weighted_average = array_sum($recent_intervals) / 15;
    $smoothed_interval = dfehc_smooth_moving($recent_intervals);
    $recommended_interval_js = round($weighted_average + $smoothed_interval * $load_factor);
    $recommended_interval = max($recommended_interval, $recommended_interval_js);
    if ($recommended_interval > DFEHC_MAX_INTERVAL) {
        define('HEARTBEAT_INTERVAL', 120);
        set_transient('dfehc_adjusted_heartbeat_interval', 120, 10 * MINUTE_IN_SECONDS);
    } else {
        define('HEARTBEAT_INTERVAL', $recommended_interval);
        set_transient('dfehc_adjusted_heartbeat_interval', $recommended_interval, 10 * MINUTE_IN_SECONDS);
    }

}

function dfehc_smooth_moving($x) {
    $sum = 0;
    $y = [];
    foreach ($x as $val) {
        if (count($y) >= 5) {
            $sum -= array_shift($y);
        }

        $y[] = $val;
        $sum += $val;
    }

    return $sum / count($y);
}

function dfehc_get_recommended_heartbeat_interval_async() {
    if (!class_exists('Heartbeat_Async')) {
        include_once('heartbeat-async.php');
    }

    class Dfehc_Get_Recommended_Heartbeat_Interval_Async extends Heartbeat_Async {
        protected $action = 'dfehc_get_recommended_interval_async';

        protected function run_action() {
            $last_activity = (int) get_transient('dfehc_last_user_activity');
            $time_elapsed = time() - $last_activity;
            $load_average = sys_getloadavg()[0];

            $interval = calculate_recommended_interval($time_elapsed, $load_average, 0);

            set_transient('dfehc_recommended_interval', $interval, 5 * MINUTE_IN_SECONDS);
        }
    }

    $current_visitors = dfehc_get_website_visitors();
    $previous_visitors = get_transient('dfehc_previous_visitor_count');

    if (false === $previous_visitors || abs($current_visitors - $previous_visitors) > $current_visitors * 0.2) {
        delete_transient('dfehc_recommended_interval');
        set_transient('dfehc_previous_visitor_count', $current_visitors, 5 * MINUTE_IN_SECONDS);
    }

    if (false === get_transient('dfehc_recommended_interval')) {
        $async_task = new Dfehc_Get_Recommended_Heartbeat_Interval_Async();
        $async_task->dispatch();
    }

    return get_transient('dfehc_recommended_interval');
}

function dfehc_get_recommended_intervals() {
    check_ajax_referer('dfehc_get_recommended_intervals', 'nonce');
    $interval = dfehc_get_recommended_heartbeat_interval_async();
    $settings = array('interval' => $interval);
    wp_send_json_success($settings);
    wp_die();
}
add_action('wp_ajax_dfehc_update_heartbeat_interval', 'dfehc_get_recommended_intervals');
add_action('wp_ajax_nopriv_dfehc_update_heartbeat_interval', 'dfehc_get_recommended_intervals');

function dfehc_override_heartbeat_interval($settings) {
    $interval = isset($settings['interval']) ? $settings['interval'] : DFEHC_MIN_INTERVAL;

    if ($interval < DFEHC_MIN_INTERVAL) {
        $interval = DFEHC_MIN_INTERVAL;
    } else if ($interval > DFEHC_MAX_INTERVAL) {
        $interval = DFEHC_MAX_INTERVAL;
    }
    $settings['interval'] = $interval;
    return $settings;
}
add_filter('heartbeat_settings', 'dfehc_override_heartbeat_interval');

function dfehc_set_user_cookie() {
    if (headers_sent()) {
        return;
    }

    $visitor_id = isset($_COOKIE['dfehc_user']) ? $_COOKIE['dfehc_user'] : uniqid('visitor_', true);
    setcookie('dfehc_user', $visitor_id, time() + 400, '/');

    $redis_available = extension_loaded('redis');
    $memcached_available = extension_loaded('memcached');
    $fallback_used = true;

    try {
        if ($redis_available) {
            $redis = new Redis();
            $redis_socket = get_option('dfehc_redis_socket', '/path/to/redis.sock');
            $connected = false;

            if (!empty($redis_socket)) {
                $connected = @$redis->connect($redis_socket);
            } else {
                $redis_server = dfehc_get_redis_server();
                $redis_port = dfehc_get_redis_port();
                $connected = @$redis->connect($redis_server, $redis_port);
            }

            if ($connected) {
                $redis->incr('dfehc_total_visitors');
                $redis->close();
                $fallback_used = false;
            }
        }

        if ($memcached_available && $fallback_used) {
            $memcached = new Memcached();
            $connected = @$memcached->addServer(dfehc_get_memcached_server(), dfehc_get_memcached_port());

            if ($connected) {
                $count = $memcached->get('dfehc_total_visitors');
                $memcached->set('dfehc_total_visitors', ($count ? $count : 0) + 1);
                $memcached->quit();
                $fallback_used = false;
            }
        }

        if ($fallback_used) {
            $count = get_transient('dfehc_total_visitors');
            set_transient('dfehc_total_visitors', ($count ? $count : 0) + 1);
        }
    }  catch (Exception $e) {
    }
}
add_action('init', 'dfehc_set_user_cookie');

function dfehc_increment_total_visitors_fallback() {
    $count = get_transient('dfehc_total_visitors');
    set_transient('dfehc_total_visitors', ($count ? $count : 0) + 1);
}

function dfehc_get_website_visitors() {
    try {
        $result = get_transient('dfehc_total_visitors');
        if ($result !== false) {
            return $result;
        }
        if (get_transient('dfehc_regenerating_cache')) {
            for ($i = 0; $i < 10; $i++) {
                sleep(1);
                $result = get_transient('dfehc_total_visitors');
                if ($result !== false) {
                    return $result;
                }
            }
            return get_option('dfehc_stale_total_visitors', 0);
        }
        set_transient('dfehc_regenerating_cache', true, 60);

        if (extension_loaded('redis')) {
            $redis = new Redis();
            $connected = $redis->connect(dfehc_get_redis_server(), dfehc_get_redis_port());
            if ($connected) {
                $result = $redis->get('dfehc_total_visitors');
            }
            $redis->close();
        } elseif (extension_loaded('memcached')) {
            $memcached = new Memcached();
            $connected = $memcached->addServer(dfehc_get_memcached_server(), dfehc_get_memcached_port());
            if ($connected) {
                $result = $memcached->get('dfehc_total_visitors');
            }
            $memcached->quit();
        }

        set_transient('dfehc_total_visitors', $result, 4 * MINUTE_IN_SECONDS);
        update_option('dfehc_stale_total_visitors', $result);
        delete_transient('dfehc_regenerating_cache');
    } catch (Exception $e) {
        error_log('DFEHC Error in dfehc_get_website_visitors: ' . $e->getMessage());
        $result = false;
    }

    return $result ?: 0;
}

function dfehc_invalidate_heartbeat_cache($user_id) {
    $high_visitor_count = get_transient('dfehc_high_visitor_count');
    if (!$high_visitor_count) {
        $visitor_count = dfehc_get_website_visitors();
        if ($visitor_count > 100) {
            set_transient('dfehc_high_visitor_count', true, 4 * MINUTE_IN_SECONDS);
            delete_transient('dfehc_recommended_interval');
        }
    } else {
        $last_recalculation = get_transient('dfehc_last_recalculation');

        if (!$last_recalculation || time() - $last_recalculation >= 4 * MINUTE_IN_SECONDS) {
            set_transient('dfehc_last_recalculation', time(), 4 * MINUTE_IN_SECONDS);
            delete_transient('dfehc_recommended_interval');
        }
    }
}
add_action('wp_logout', 'dfehc_invalidate_heartbeat_cache');
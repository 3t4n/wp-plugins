<?php
function dfehc_enqueue_chart_js() {
    global $load_logs;
    if (!is_array($load_logs) || empty($load_logs)) {
        $load_logs = [];
    }

    $chart_js_url = plugins_url('js/chart.js', __FILE__);
    wp_enqueue_script('dfehc_chartjs', $chart_js_url, array(), '1.0', true);

    $labels = array_map(function($entry) { return date('H:i', $entry['timestamp']); }, $load_logs);
    $data = array_map(function($entry) { return $entry['load']; }, $load_logs);

    wp_localize_script('dfehc_chartjs', 'dfehc_chartData', array(
        'labels' => $labels,
        'data' => $data,
    ));
}
add_action('admin_enqueue_scripts', 'dfehc_enqueue_chart_js');

function dfehc_heartbeat_health_dashboard_widget_function() {
    $heartbeat_status = get_transient('dfehc_heartbeat_health_status');
    $server_load = dfehc_get_server_load();
    $server_response_time = dfehc_get_server_response_time(); 
    if ($heartbeat_status === false) {
        $heartbeat_status = dfehc_get_server_health_status($server_load);
        set_transient('dfehc_heartbeat_health_status', $heartbeat_status, 60);
    }
    $recommended_interval = dfehc_calculate_recommended_interval_user_activity($server_load);
    $load_logs = get_option('dfehc_server_load_logs', array());
    $load_logs[] = array(
        'timestamp' => time(),
        'load' => $server_load,
    );
    while (end($load_logs)['timestamp'] < time() - 86400) {
        array_shift($load_logs);
    }
    update_option('dfehc_server_load_logs', $load_logs);

    if ($heartbeat_status === false) {
    if(get_option('dfehc_disable_heartbeat')) {
        $heartbeat_status = 'Stopped';
    } else {
        $heartbeat_status = dfehc_get_server_health_status($server_load);
    }
    set_transient('dfehc_heartbeat_health_status', $heartbeat_status, 60);
}
	
switch ($heartbeat_status) {
    case 'Resting':
        $status_color = 'green';
        $animation_name = 'heartbeat-healthy';
        break;
    case 'Pacing':
        $status_color = 'green';
        $animation_name = 'heartbeat-under-load';
        break;
    case 'Under Load':
        $status_color = 'yellow';
        $animation_name = 'heartbeat-working-hard';
        break;
    case 'Under Strain':
        $status_color = 'red';
        $animation_name = 'heartbeat-critical';
        break;
    case 'Stopped':
        $status_color = 'black';
        $animation_name = 'heartbeat-stopped';
        break;
}
    echo "<style>
        .heartbeat {
            animation: {$animation_name} 1s linear infinite;
        }

        @keyframes heartbeat-healthy {
            0% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
            50% {box-shadow: 0 0 20px {$status_color}, 0 0 30px {$status_color}, 0 0 40px {$status_color}, 0 0 50px {$status_color};}
            100% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
        }
      @keyframes heartbeat-under-load {
            0% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
            25% {box-shadow: 0 0 30px {$status_color}, 0 0 40px {$status_color}, 0 0 50px {$status_color}, 0 0 60px {$status_color};}
            50% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
            75% {box-shadow: 0 0 30px {$status_color}, 0 0 40px {$status_color}, 0 0 50px {$status_color}, 0 0 60px {$status_color};}
            100% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
        }
        @keyframes heartbeat-working-hard {
            0% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
            50% {box-shadow: 0 0 20px {$status_color}, 0 0 30px {$status_color}, 0 0 40px {$status_color}, 0 0 50px {$status_color};}
            100% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
        }
        @keyframes heartbeat-critical {
            0% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
            25% {box-shadow: 0 0 20px {$status_color}, 0 0 30px {$status_color}, 0 0 40px {$status_color}, 0 0 50px {$status_color};}
            50% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
            75% {box-shadow: 0 0 20px {$status_color}, 0 0 30px {$status_color}, 0 0 40px {$status_color}, 0 0 50px {$status_color};}
            100% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
        }
		@keyframes heartbeat-stopped {
    0%, 100% {box-shadow: 0 0 5px {$status_color}, 0 0 10px {$status_color}, 0 0 15px {$status_color}, 0 0 20px {$status_color};}
}

    }
    </style>";
    $load_logs = get_option('dfehc_server_load_logs', array());
    $load_logs[] = array(
        'timestamp' => time(),
        'load' => $server_load,
    );
    while (end($load_logs)['timestamp'] < time() - 86400) {
        array_shift($load_logs);
    }
    update_option('dfehc_server_load_logs', $load_logs);
    echo "<p style='text-align: center; font-size: 24px; margin-top: 20px;'>Systolic Pressure: <strong>{$server_load}</strong></p>";
    echo "<div style='width: 30px; height: 30px; background-color: {$status_color}; margin: 20px auto; border-radius: 50%; animation: {$animation_name} 2s infinite;'></div>";
    echo "<p style='text-align: center; font-size: 24px; margin-top: 20px;'>Heartbeat: <strong>{$heartbeat_status}</strong></p>";
    $load_logs = get_option('dfehc_server_load_logs', array());
    $load_average = dfehc_load_average();
    $server_load_factor = SERVER_LOAD_FACTOR - ($load_average / DFEHC_MAX_SERVER_LOAD);
    $labels = array();
    $data = array();
    $timestamp = strtotime('-24 hours'); 
    $interval = 20 * 60; 
    while ($timestamp <= time()) {
    $load = 0;
    foreach ($load_logs as $log) {
        if ($log['timestamp'] >= $timestamp && $log['timestamp'] < ($timestamp + $interval)) {
            $load += $log['load'];
        }
    }
    $average_load = $load / count($load_logs);
    $labels[] = date('H:i', $timestamp);
    $data[] = $average_load;
    $timestamp += $interval; 
}
    echo '<canvas id="loadChart"></canvas>';
    echo '
    <script src="js/chart.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("loadChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: ' . json_encode($labels) . ',
                datasets: [{
                    label: "Diastolic pressure",
                    data: ' . json_encode($data) . ',
                    backgroundColor: "rgba(75,192,192,0.2)",
                    borderColor: "rgba(75,192,192,1)",
                    borderWidth: 2
                }]
            },
           options: {
    responsive: true,
    scales: {
        y: {
            beginAtZero: true,
            max: 10,
            suggestedMax: 36, 
            ticks: {
                stepSize: 1 
            }
        }
    }
}
        });
    });
    </script>
    ';
}

function dfehc_add_heartbeat_health_dashboard_widget() {
    wp_add_dashboard_widget('heartbeat_health_dashboard_widget', 'Dynamic Heartbeat Health Check', 'dfehc_heartbeat_health_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'dfehc_add_heartbeat_health_dashboard_widget' );
<?php
function dfehc_register_settings() {
    add_settings_section('dfehc_redis_settings_section', 'Redis Settings', 'dfehc_redis_settings_section_callback', 'dfehc_plugin');
    add_settings_field('dfehc_redis_server', 'Redis Server', 'dfehc_redis_server_callback', 'dfehc_plugin', 'dfehc_redis_settings_section');
    add_settings_field('dfehc_redis_port', 'Redis Port', 'dfehc_redis_port_callback', 'dfehc_plugin', 'dfehc_redis_settings_section');
    add_settings_field('dfehc_redis_socket', 'Redis Unix Socket', 'dfehc_redis_socket_callback', 'dfehc_plugin', 'dfehc_redis_settings_section');
    add_settings_section('dfehc_memcached_settings_section', 'Memcached Settings', 'dfehc_memcached_settings_section_callback', 'dfehc_plugin');
    add_settings_field('dfehc_memcached_server', 'Memcached Server', 'dfehc_memcached_server_callback', 'dfehc_plugin', 'dfehc_memcached_settings_section');
    add_settings_field('dfehc_memcached_port', 'Memcached Port', 'dfehc_memcached_port_callback', 'dfehc_plugin', 'dfehc_memcached_settings_section');
    add_settings_field('dfehc_priority_slider', 'Adjust Priority', 'dfehc_plugin', 'dfehc_priority_settings_section');
    add_settings_section('dfhcsl_heartbeat_settings_section', 'Heartbeat Control Settings', 'dfhcsl_heartbeat_control_settings_section_callback', 'dfehc_plugin');
    add_settings_field('dfehc_disable_heartbeat', 'Disable Heartbeat', 'dfehc_disable_heartbeat_callback', 'dfehc_plugin', 'dfhcsl_heartbeat_settings_section');
    add_settings_field('dfhcsl_backend_heartbeat_control', 'Backend Heartbeat Control', 'dfhcsl_backend_heartbeat_control_callback', 'dfehc_plugin', 'dfhcsl_heartbeat_settings_section');
    add_settings_field('dfhcsl_backend_heartbeat_interval', 'Backend Heartbeat Interval', 'dfhcsl_backend_heartbeat_interval_callback', 'dfehc_plugin', 'dfhcsl_heartbeat_settings_section');
    add_settings_field('dfhcsl_editor_heartbeat_control', 'Editor Heartbeat Control', 'dfhcsl_editor_heartbeat_control_callback', 'dfehc_plugin', 'dfhcsl_heartbeat_settings_section');
    add_settings_field('dfhcsl_editor_heartbeat_interval', 'Editor Heartbeat Interval', 'dfhcsl_editor_heartbeat_interval_callback', 'dfehc_plugin', 'dfhcsl_heartbeat_settings_section');
    add_settings_field('dfehc_optimization_frequency', 'DB Optimization Frequency:', 'dfehc_optimization_frequency_callback', 'dfehc_plugin', 'dfehc_optimization_schedule_section');
    add_settings_section('dfehc_optimization_schedule_section', 'Database Optimization Area (Advanced section)', 'dfehc_optimization_schedule_section_callback', 'dfehc_plugin');
	
    register_setting('dfehc_options_group', 'dfehc_optimization_frequency');
    register_setting('dfehc_options_group', 'dfhcsl_backend_heartbeat_control');
    register_setting('dfehc_options_group', 'dfhcsl_editor_heartbeat_control');
    register_setting('dfehc_options_group', 'dfhcsl_backend_heartbeat_interval', 'dfhcsl_validate_heartbeat_interval');
    register_setting('dfehc_options_group', 'dfhcsl_editor_heartbeat_interval', 'dfhcsl_validate_heartbeat_interval');
    register_setting('dfehc_options_group', 'dfehc_priority_slider');
    register_setting('dfehc_options_group', 'dfehc_redis_server', 'dfehc_validate_server');
    register_setting('dfehc_options_group', 'dfehc_redis_port', 'dfehc_validate_port');
    register_setting('dfehc_options_group', 'dfehc_memcached_server', 'dfehc_validate_server');
    register_setting('dfehc_options_group', 'dfehc_memcached_port', 'dfehc_validate_port');
	register_setting('dfehc_options_group', 'dfehc_redis_socket');
    register_setting('dfehc_options_group', 'dfehc_disable_heartbeat');
	register_setting('dfehc_options_group', 'add_to_menu');
}

require( plugin_dir_path( __FILE__ ) . 'defibrillator/unclogger.php' );

function dfehc_unclogger_menu() {
    $add_to_menu = get_option('add_to_menu', false);

    if ($add_to_menu) {
        add_menu_page(
            'Unclogger',
            'Unclogger',
            'manage_options',
            'dfehc-unclogger',
            'dfehc_unclogger_page_callback',
            'dashicons-heart', 
            80 
        );
    }
}
add_action('admin_menu', 'dfehc_unclogger_menu');

function dfehc_optimization_schedule_section_callback() {
    $add_to_menu = get_option('add_to_menu', false);
    echo '<br><p><strong>Use this section with care.</strong> An optimized database helps your website run faster, especially if it has gotten slower while editing pages or placing orders. Configure the schedule for full database optimizations or run manual optimizations. Optimizing websites corrupted by plugins may cause the website to crash. It\'s highly recommended you always perform backups before optimizing your database so you can have a recovery point in case of a crash.</p>';
    if ($add_to_menu) {
        echo '<p><a href="' . admin_url('admin.php?page=dfehc-unclogger') . '">Manually choose certain database optimizations</a></p>';
    }

    echo '<div><p>Database health status';


$health_info = calculate_database_health();
$circle_size = 20;

echo '<div class="database-health-status heartbeat" style="background-color: ' . $health_info['status_color'] . '; width: ' . $circle_size . 'px; height: ' . $circle_size . 'px; border-radius: 50%; display: inline-block;"></div>';
echo '<style>
    .database-health-status.heartbeat {
        animation: heartbeat 1s linear infinite;
        box-shadow: 0 0 5px ' . $health_info['status_color'] . ', 0 0 10px ' . $health_info['status_color'] . ', 0 0 15px ' . $health_info['status_color'] . ', 0 0 20px ' . $health_info['status_color'] . ';
    }

    @keyframes heartbeat {
        25% { box-shadow: 0 0 5px ' . $health_info['status_color'] . ', 0 0 10px ' . $health_info['status_color'] . ', 0 0 15px ' . $health_info['status_color'] . ', 0 0 20px ' . $health_info['status_color'] . '; }
        50% { box-shadow: 0 0 20px ' . $health_info['status_color'] . ', 0 0 30px ' . $health_info['status_color'] . ', 0 0 40px ' . $health_info['status_color'] . ', 0 0 50px ' . $health_info['status_color'] . '; }
        100% { box-shadow: 0 0 5px ' . $health_info['status_color'] . ', 0 0 10px ' . $health_info['status_color'] . ', 0 0 15px ' . $health_info['status_color'] . ', 0 0 20px ' . $health_info['status_color'] . '; }
    }
</style>';

    echo '<p><br>Add manual database optimizations page to admin menu:</p>';
    echo '<label><input type="radio" name="add_to_menu" value="1" ' . checked(1, $add_to_menu, false) . '>Enable  </label>';
    echo '<label><input type="radio" name="add_to_menu" value="0" ' . checked(0, $add_to_menu, false) . '>Disable</label>';
    echo '</div>';
}

function dfehc_run_periodic_optimization() {
$unclogger = new DynamicHeartbeat\DfehcUncloggerDb();

    $unclogger->optimize_all();

    $threeMonthsAgo = strtotime('-3 months');
    $olderLogs = get_option('dfehc_last_periodic_optimization', array());

    foreach ($olderLogs as $timestamp => $log) {
        if ($timestamp < $threeMonthsAgo) {
            unset($olderLogs[$timestamp]);
        }
    }

    $currentTimestamp = current_time('timestamp');
    $olderLogs[$currentTimestamp] = 'Optimization completed';

    update_option('dfehc_last_periodic_optimization', $olderLogs);
}

add_action('dfehc_periodic_optimization', 'dfehc_run_periodic_optimization');


function dfehc_optimization_frequency_callback() {
    $frequency = get_option('dfehc_optimization_frequency', '');

    echo '<select name="dfehc_optimization_frequency">';
    echo '<option value="" ' . selected($frequency, '', false) . '>Disabled</option>';
    echo '<option value="1" ' . selected($frequency, '1', false) . '>Every 1 week</option>';
    echo '<option value="2" ' . selected($frequency, '2', false) . '>Every 2 weeks</option>';
    echo '<option value="3" ' . selected($frequency, '3', false) . '>Every 3 weeks</option>';
    echo '<option value="4" ' . selected($frequency, '4', false) . '>Every 4 weeks</option>';
    echo '</select>';
}

function dfehc_save_optimization_frequency($new_value) {
    if (!empty($new_value) && $new_value !== 'disable') {
        dfehc_run_periodic_optimization();
        wp_schedule_event(time(), 'weekly', 'dfehc_periodic_optimization');
    } else {
        wp_clear_scheduled_hook('dfehc_periodic_optimization');
    }

    return $new_value;
}
add_filter('pre_update_option_dfehc_optimization_frequency', 'dfehc_save_optimization_frequency');

function display_unclogger_information() {
$unclogger = new DynamicHeartbeat\DfehcUncloggerDb();
    $database_size = $unclogger->get_database_size();
    $revision_count = $unclogger->count_revisions();
    $trashed_posts_count = $unclogger->count_trashed_posts();
    $expired_transients_count = $unclogger->count_expired_transients();
    $myisam_tables_count = $unclogger->count_myisam_tables();

    ?>
    <h2>Current Database Size: <span id="database_size"><?php echo $database_size; ?></span></h2>
    <h2>Number of Revisions: <span id="revision_count"><?php echo $revision_count; ?></span></h2>
    <h2>Number of Trashed Posts: <span id="trashed_posts_count"><?php echo $trashed_posts_count; ?></span></h2>
    <h2>Number of Expired Transients: <span id="expired_transients_count"><?php echo $expired_transients_count; ?></span></h2>
    <h2>Number of MyISAM Tables: <span id="myisam_tables_count"><?php echo $myisam_tables_count; ?></span></h2>
    <?php
}

function calculate_database_health() {
    $unclogger = new DynamicHeartbeat\DfehcUncloggerDb();
    $revision_count = $unclogger->count_revisions();
    $trashed_posts_count = $unclogger->count_trashed_posts();
    $expired_transients_count = $unclogger->count_expired_transients();
    $status_color = '#00ff00';

    if ($revision_count === false || $trashed_posts_count === false || $expired_transients_count === false) {
        return array(
            'status_color' => $status_color,
        );
    }
    $conditions_met = 0;
    if ($revision_count > 800) {
        $conditions_met++;
    }
    if ($trashed_posts_count > 800) {
        $conditions_met++;
    }
    if ($expired_transients_count > 22000) {
        $conditions_met++;
    }
    if ($conditions_met >= 2) {
        $status_color = '#ff0000';
    } elseif (($revision_count > 150 && $trashed_posts_count > 200) || ($revision_count > 150 && $expired_transients_count > 2500) || ($trashed_posts_count > 200 && $expired_transients_count > 2500)) {
    $status_color = '#ffff00';
    }
    return array(
        'status_color' => $status_color,
    );
}

$health_info = calculate_database_health();

function dfehc_unclogger_page_callback() {

    if (isset($_POST['optimize_function'])) {
        $unclogger = new DynamicHeartbeat\DfehcUncloggerDb();
        $database_size_before = $unclogger->get_database_size();
        $revision_count_before = $unclogger->count_revisions();
        $trashed_posts_count_before = $unclogger->count_trashed_posts();
        $expired_transients_count_before = $unclogger->count_expired_transients();
        $myisam_tables_count_before = $unclogger->count_myisam_tables();
        $selected_function = sanitize_text_field($_POST['optimize_function']);
        $unclogger->$selected_function();
        $optimization_frequency = get_option('dfehc_optimization_frequency', '');

        if ($optimization_frequency) {
            wp_schedule_single_event(time() + $optimization_frequency * WEEK_IN_SECONDS, 'dfehc_periodic_optimization');
        }
        $database_size_after = $unclogger->get_database_size();
        $revision_count_after = $unclogger->count_revisions();
        $trashed_posts_count_after = $unclogger->count_trashed_posts();
        $expired_transients_count_after = $unclogger->count_expired_transients();
        $myisam_tables_count_after = $unclogger->count_myisam_tables();
        ?>
        <div class="wrap">
            <h1>Dynamic Heartbeat Database Unclogger</h1>
            <p>Below are optimization options for your website's database. It's always recommended to run a backup before dropping, converting, or optimizing database tables.</p>
            <h2>After Optimization:</h2>
			<br>
            <?php display_unclogger_information(); ?>
    <br>
    <button class="optimize-button" onclick="refreshPage()">Back to optimizations</button>

    <script>
        function refreshPage() {
            location.reload();
        }
    </script>
        </div>

        <?php
    } else {
        ?>
    <div class="wrap">
        <h1>Database Unclogger</h1>
        <p>Below are optimization options for your website's database.</p>
        <form method="post" action="">
        <button class="optimize-button" type="submit" name="optimize_function" value="delete_trashed_posts">Delete Trashed Posts</button> 
        <button class="optimize-button" type="submit" name="optimize_function" value="delete_revisions">Delete Revisions</button> 
        <button class="optimize-button" type="submit" name="optimize_function" value="delete_auto_drafts">Delete Auto-drafts</button>
        <button class="optimize-button" type="submit" name="optimize_function" value="delete_orphaned_postmeta">Delete Orphaned Post Meta</button>
        <button class="optimize-button" type="submit" name="optimize_function" value="delete_expired_transients">Delete Expired Transients</button>
        <button class="optimize-button" type="submit" name="optimize_function" value="delete_woocommerce_transients">Delete WooCommerce Transients</button>
        <button class="optimize-button" type="submit" name="optimize_function" value="clear_woocommerce_cache">Clear WooCommerce Cache</button>
        <label class="label-backup-warning"><br><br>Please ensure that you backup your website before running the optimizations below:<br><br></label>
        <button class="optimize-button" type="submit" name="optimize_function" value="drop_tables_with_different_prefix">Drop Tables with Different Prefix</button> 
        <button class="optimize-button" type="submit" name="optimize_function" value="convert_to_innodb">Convert MyISAM Tables to InnoDB</button> 
        <button class="optimize-button" type="submit" name="optimize_function" value="optimize_tables">Optimize Tables</button>
        </form>
        <br>
        <h2>Current database status:</h2><br>       
<?php

$health_info = calculate_database_health();
$circle_size = 20;

echo '<div class="database-health-status heartbeat" style="background-color: ' . $health_info['status_color'] . '; width: ' . $circle_size . 'px; height: ' . $circle_size . 'px; border-radius: 50%; display: inline-block;"></div>';
echo '<style>
    .database-health-status.heartbeat {
        animation: heartbeat 1s linear infinite;
        box-shadow: 0 0 5px ' . $health_info['status_color'] . ', 0 0 10px ' . $health_info['status_color'] . ', 0 0 15px ' . $health_info['status_color'] . ', 0 0 20px ' . $health_info['status_color'] . ';
    }

    @keyframes heartbeat {
        25% { box-shadow: 0 0 5px ' . $health_info['status_color'] . ', 0 0 10px ' . $health_info['status_color'] . ', 0 0 15px ' . $health_info['status_color'] . ', 0 0 20px ' . $health_info['status_color'] . '; }
        50% { box-shadow: 0 0 20px ' . $health_info['status_color'] . ', 0 0 30px ' . $health_info['status_color'] . ', 0 0 40px ' . $health_info['status_color'] . ', 0 0 50px ' . $health_info['status_color'] . '; }
        100% { box-shadow: 0 0 5px ' . $health_info['status_color'] . ', 0 0 10px ' . $health_info['status_color'] . ', 0 0 15px ' . $health_info['status_color'] . ', 0 0 20px ' . $health_info['status_color'] . '; }
    }
</style>';
?><br><br>
<?php display_unclogger_information(); ?>
        
    </div>
    <?php
    }
}

function dfhcsl_enqueue_admin_scripts() {
    $screen = get_current_screen();
    if (
        ($screen && $screen->id === 'settings_page_dfehc_plugin') ||
        ($screen && $screen->id === 'toplevel_page_dfehc-unclogger')
    ) {
        wp_enqueue_script('dfhcsl-admin-js', plugin_dir_url(__FILE__) . 'js/dfhcsl-admin.js', array('jquery'), '1.0.0', true);
        wp_enqueue_style('dfhcsl-admin-css', plugin_dir_url(__FILE__) . 'css/dfhcsl-admin.css');
    }
}
add_action('admin_enqueue_scripts', 'dfhcsl_enqueue_admin_scripts');

function dfhcsl_heartbeat_settings_section_callback() {
    echo '<p>Control the WordPress heartbeat settings for the backend and editor.</p>';
}

function dfhcsl_validate_heartbeat_interval($input) {
    if (is_numeric($input) && ($input >= 15 && $input <= 300)) {
        return $input;
    } else if ($input === 'disable') {
        return $input;
    } else {
        add_settings_error('dfhcsl_heartbeat_interval', 'dfhcsl_heartbeat_interval_error', 'Please enter a valid interval between 15 and 300 or "disable".');
        return get_option('dfhcsl_backend_heartbeat_interval', '60'); 
    }
}

function dfehc_get_redis_server() {
    return get_option('dfehc_redis_server', '127.0.0.1');
}

function dfehc_get_redis_port() {
    return get_option('dfehc_redis_port', 6379);
}

function dfehc_get_memcached_server() {
    return get_option('dfehc_memcached_server', '127.0.0.1');
}

function dfehc_get_memcached_port() {
    return get_option('dfehc_memcached_port', 11211);
}

function dfehc_redis_server_callback() {
    $server = get_option('dfehc_redis_server', '127.0.0.1');
    echo '<input type="text" name="dfehc_redis_server" value="' . esc_attr($server) . '" />';
}

function dfehc_redis_port_callback() {
    $port = get_option('dfehc_redis_port', 6379);
    echo '<input type="number" name="dfehc_redis_port" value="' . esc_attr($port) . '" />';
}

function dfehc_memcached_server_callback() {
    $server = get_option('dfehc_memcached_server', '127.0.0.1');
    echo '<input type="text" name="dfehc_memcached_server" value="' . esc_attr($server) . '" />';
}

function dfehc_memcached_port_callback() {
    $port = get_option('dfehc_memcached_port', 11211);
    echo '<input type="number" name="dfehc_memcached_port" value="' . esc_attr($port) . '" /><br><br><br>';
}

function dfehc_redis_settings_section_callback() {
    echo '<br><p>Configure Redis settings for the plugin.</p>';
}

function dfehc_memcached_settings_section_callback() {
    echo '<br><p>Configure Memcached settings for the plugin.</p>';
}

function dfehc_redis_socket_callback() {
    $socket = get_option('dfehc_redis_socket', '/path/to/redis.sock');
    echo '<input type="text" name="dfehc_redis_socket" value="' . esc_attr($socket) . '" /><br><br>';
}

function dfehc_add_settings_page() {
    add_options_page('DFEHC Settings', 'DFEHC', 'manage_options', 'dfehc_plugin', 'dfehc_settings_page');

}

function dfehc_heartbeat_settings_section_callback() {
    echo '<p>Here you can enable or disable the WordPress Heartbeat.</p>';
}

function dfehc_maybe_disable_heartbeat() {
    if (get_option('dfehc_disable_heartbeat')) {
        wp_deregister_script('heartbeat');
    }
}
add_action('init', 'dfehc_maybe_disable_heartbeat');
register_setting('dfhcsl_options_group', 'dfhcsl_backend_heartbeat_control', 'dfhcsl_validate_heartbeat_control');
register_setting('dfhcsl_options_group', 'dfhcsl_editor_heartbeat_control', 'dfhcsl_validate_heartbeat_control');

function dfhcsl_validate_heartbeat_control($input) {
    $disable_heartbeat = get_option('dfehc_disable_heartbeat', 0);
    if ($disable_heartbeat) {
        return 0;
    }
    return $input;
}

function dfehc_validate_options($new_value, $old_value) {
    if ($new_value == '1') {
        update_option('dfhcsl_backend_heartbeat_control', '0');
        update_option('dfhcsl_editor_heartbeat_control', '0');
    }
    return $new_value;
}

add_filter('pre_update_option_dfehc_disable_heartbeat', 'dfehc_validate_options', 10, 2);

function dfhcsl_heartbeat_control_settings_section_callback() {
    echo '<br><p>Control the WordPress heartbeat settings for the backend and editor. Disabling or setting a long interval may affect real-time features like post locking or showing real-time notifications.</p>';
}

function dfhcsl_backend_heartbeat_control_callback() {
    $value = get_option('dfhcsl_backend_heartbeat_control', '');
    echo '<input type="checkbox" id="dfhcsl_backend_heartbeat_control" name="dfhcsl_backend_heartbeat_control" value="1"' . checked(1, $value, false) . ' />';
    echo '<label for="dfhcsl_backend_heartbeat_control">Enable manual heartbeat control for the backend</label>';
}

function dfhcsl_backend_heartbeat_interval_callback() {
    $value = get_option('dfhcsl_backend_heartbeat_interval', '60');
    echo '<input type="number" id="dfhcsl_backend_heartbeat_interval" name="dfhcsl_backend_heartbeat_interval" min="15" max="300" value="' . esc_attr($value) . '" />';
    echo ' <span>Set interval for backend (15-300 seconds or "disable")</span>';
}

function dfhcsl_editor_heartbeat_control_callback() {
    $value = get_option('dfhcsl_editor_heartbeat_control', '');
    echo '<input type="checkbox" id="dfhcsl_editor_heartbeat_control" name="dfhcsl_editor_heartbeat_control" value="1"' . checked(1, $value, false) . ' />';
    echo '<label for="dfhcsl_editor_heartbeat_control">Enable manual heartbeat control for the editor</label>';
}

function dfhcsl_editor_heartbeat_interval_callback() {
    $value = get_option('dfhcsl_editor_heartbeat_interval', '60');
    echo '<input type="number" id="dfhcsl_editor_heartbeat_interval" name="dfhcsl_editor_heartbeat_interval" min="15" max="300" value="' . esc_attr($value) . '" />';
    echo ' <span>Set interval for editor (15-300 seconds or "disable")</span><br><br><br>';
}

function dfehc_disable_heartbeat($settings) {
    if (dfehc_should_disable_heartbeat()) {
        add_action('admin_enqueue_scripts', function() {
            wp_dequeue_script('heartbeat');
            wp_deregister_script('heartbeat');
        }, 100);
    }
    return $settings;
}

function dfehc_disable_heartbeat_callback() {
    $setting = get_option('dfehc_disable_heartbeat');
    $backend_enabled = get_option('dfhcsl_backend_heartbeat_control');
    $editor_enabled = get_option('dfhcsl_editor_heartbeat_control');

    $disabled_attr = ($backend_enabled || $editor_enabled) ? 'disabled' : '';

    echo "<input type='checkbox' name='dfehc_disable_heartbeat' value='1' " . checked(1, $setting, false) . " $disabled_attr />";
}


function dfehc_settings_page_callback() {
    ?>
    <div class="wrap">
        <h1>DFEHC Settings</h1>
        <p>Only update the caching method values if the plugin didn't find your settings. The plugin will automatically choose your enabled method on your hosting environment. If no object caching is available on your setup, the plugin will automatically fall back and use regular WordPress Transients caching.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields('dfehc_options_group');
            do_settings_sections('dfehc_plugin');
            do_settings_sections('dfhcsl_plugin');
            submit_button();
            ?>
        </form>
    </div>

    <?php
}
add_action('admin_menu', 'dfehc_add_settings_page');
add_action('admin_init', 'dfehc_register_settings');

function dfehc_settings_page() {
    $sliderValue = (int) get_option('dfehc_priority_slider', '0');
    $userActivityWeight = 0.4;
    $serverLoadWeight = 0.3;
    $responseTimeWeight = 0.3;

    if ($sliderValue < 0) {
        $userActivityWeight = 0.4 + (0.1 * $sliderValue);
        $serverLoadWeight = 0.3 - (0.1 * $sliderValue / 2);
        $responseTimeWeight = 0.3 - (0.1 * $sliderValue / 2);
    } else {
        $userActivityWeight = 0.4 - (0.1 * $sliderValue);
        $serverLoadWeight = 0.3 + (0.1 * $sliderValue / 2);
        $responseTimeWeight = 0.3 + (0.1 * $sliderValue / 2);
    }

    ?>
    <div class="wrap">
        <h1>DFEHC Settings</h1>
		<p>Only update the caching method values if the plugin didn't find your settings. The plugin will automatically choose your enabled method on your hosting environment. If no object caching is available on your setup, the plugin will automatically fall back and use regular WordPress Transients caching.</p>
        <form method="post" action="options.php">
            <?php settings_fields('dfehc_options_group'); ?>
            <?php do_settings_sections('dfehc_plugin'); ?>
            <br><br>
            <h3>Priority Settings</h3>
			<br>
            <p>Adjust the priority between server performance and user activity. Slide towards "Increase server priority" to give more importance to server performance. Slide towards "Increase visitor priority" to give more priority to user activity.</p>

            <div style="display: flex; align-items: center;">
                <span style=" padding-right: 10px;">Increase server priority</span>
                <?php 
                echo '<input type="range" id="dfehc_priority_slider" name="dfehc_priority_slider" min="-3" max="3" step="1" value="' . esc_attr($sliderValue) . '" style="flex: 2;">';
                ?>
                <span style="flex: 1; padding-left: 10px;">Increase visitor priority</span>
            </div>
            <br>
            <div>
                <p style="font-size: 10px;">User Activity Priority: <span id="user_activity_weight_display"><?php echo number_format($userActivityWeight, 2); ?></span></p>
                <p style="font-size: 10px;">Server Load Priority: <span id="server_load_weight_display"><?php echo number_format($serverLoadWeight, 2); ?></span></p>
                <p style="font-size: 10px;">Response Time Priority: <span id="response_time_weight_display"><?php echo number_format($responseTimeWeight, 2); ?></span></p>
            </div>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function dfehc_adjust_backend_editor_heartbeat($settings) {
    if (current_filter() !== 'heartbeat_settings') {
        return $settings;
    }
    $backend_control_enabled = get_option('dfhcsl_backend_heartbeat_control');
    $editor_control_enabled = get_option('dfhcsl_editor_heartbeat_control');
    $screen = $_POST['screen_id'] ?? '';

    if ($screen === 'post' && $editor_control_enabled) {
        $editor_interval = get_option('dfhcsl_editor_heartbeat_interval', 60);
        $settings['interval'] = max(min($editor_interval, DFEHC_MAX_INTERVAL), DFEHC_MIN_INTERVAL);
    } elseif (($screen === 'dashboard' || $screen === 'settings_page_dfehc_plugin') && $backend_control_enabled) {
        $backend_interval = get_option('dfhcsl_backend_heartbeat_interval', 60);
        $settings['interval'] = max(min($backend_interval, DFEHC_MAX_INTERVAL), DFEHC_MIN_INTERVAL);
    }
    
    return $settings;
}
add_filter('heartbeat_settings', 'dfehc_adjust_backend_editor_heartbeat', 20);

function dfehc_remove_external_notices() {
    $screen = get_current_screen();
     if (
        ($screen && $screen->id === 'settings_page_dfehc_plugin') ||
        ($screen && $screen->id === 'toplevel_page_dfehc-unclogger')
    ) {
        global $wp_filter;
        if (isset($wp_filter['admin_notices'])) {
            $dfehc_notices = $wp_filter['admin_notices'];
        }
        remove_all_actions('admin_notices');
        remove_all_actions('all_admin_notices');
        if (isset($dfehc_notices)) {
            $wp_filter['admin_notices'] = $dfehc_notices;
        }
    }
}
add_action('admin_head', 'dfehc_remove_external_notices');

function dfehc_custom_admin_footer_text($text) {
 $screen = get_current_screen();
    if (
        ($screen && $screen->id === 'settings_page_dfehc_plugin') ||
        ($screen && $screen->id === 'toplevel_page_dfehc-unclogger')
    ) {
        $text = '<strong>Dynamic Front-end Heartbeat Control Settings Page</strong>';
    }

    return $text;
}
add_filter('admin_footer_text', 'dfehc_custom_admin_footer_text');

function dfehc_custom_admin_footer_version($version) {
     $screen = get_current_screen();
    if (
        ($screen && $screen->id === 'settings_page_dfehc_plugin') ||
        ($screen && $screen->id === 'toplevel_page_dfehc-unclogger')
    ){
        $heartbeat_disabled = get_option('dfehc_disable_heartbeat');
        $heartbeat_status = $heartbeat_disabled ? 'Disabled' : 'Enabled';    
        $version = 'Heartbeat: <strong>' . $heartbeat_status . '</strong>';
    }

    return $version;
}
add_filter('update_footer', 'dfehc_custom_admin_footer_version', 11);
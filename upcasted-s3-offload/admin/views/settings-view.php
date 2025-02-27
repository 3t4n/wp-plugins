<div class="wrap">
    <?php 
        $header = plugin_dir_path(__FILE__) . '/partials/header.php'; // Adjust the path as necessary
        if (file_exists($header)) {
            include $header;
        } else {
            echo '<div class="error"><p>View file not found: ' . esc_html($header) . '</p></div>';
        }

        $pluginInfo = plugin_dir_path(__FILE__) . '/partials/plugin-info.php'; // Adjust the path as necessary
        if (file_exists($pluginInfo)) {
            include $pluginInfo;
        } else {
            echo '<div class="error"><p>View file not found: ' . esc_html($pluginInfo) . '</p></div>';
        }
    ?>
    <div class="upcasted-container">
        <?php 
            $settingsView = plugin_dir_path(__FILE__) . '/partials/settings.php'; // Adjust the path as necessary
            if (file_exists($settingsView)) {
                include $settingsView;
            } else {
                echo '<div class="error"><p>View file not found: ' . esc_html($settingsView) . '</p></div>';
            }

            $toolsView = plugin_dir_path(__FILE__) . '/partials/tools.php'; // Adjust the path as necessary
            if (file_exists($toolsView)) {
                include $toolsView;
            } else {
                echo '<div class="error"><p>View file not found: ' . esc_html($toolsView) . '</p></div>';
            }
        ?>
    </div>
</div>
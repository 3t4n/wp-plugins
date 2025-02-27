<?php
// Fetch plugin icon from WordPress.org using the Plugin Information API
function rfc_get_plugin_icon($slug) {
    // Use the WordPress.org Plugin Information API to fetch plugin details
    $api = plugins_api('plugin_information', array(
        'slug' => $slug,
        'fields' => array('icons' => true),
    ));

    // If the API request was successful and there is an icon, return it
    if (!is_wp_error($api) && !empty($api->icons)) {
        if (!empty($api->icons['default'])) {
            return $api->icons['default']; // Use default icon
        } elseif (!empty($api->icons['2x'])) {
            return $api->icons['2x']; // Use higher resolution icon if available
        } elseif (!empty($api->icons['1x'])) {
            return $api->icons['1x']; // Fallback to 1x icon if necessary
        }
    }

    return false; // Return false if no icon is available
}

// Settings page to display all installed plugins with the "Install Fresh" option
function rfc_plugins_fresh_install_page() {
    // Get all installed plugins
    $all_plugins = get_plugins();
    ?>
    <div class="wrap">
    
    <!-- Logo on the top right linking to wpfixit.com -->
    <a href="https://www.wpfixit.com/" target="_blank">
        <img src="<?php echo esc_url(plugins_url('/assets/desktop.webp', __FILE__)); ?>" 
             alt="WP Fix It" 
             style="position: absolute; top: 23px; right: 23px; max-width: 200px;">
    </a>

    <style>
    .updated {max-width: 80%;}
    .widefat td {border-bottom: solid 1px #ccc;font-size: 16px; padding: 10px;}
    .widefat tfoot tr td, .widefat tfoot tr th, .widefat thead tr td, .widefat thead tr th {
        font-size: 16px;
    }
    .plugin-icon {
        width: 40px;
        height: 40px;
        vertical-align: middle;
        margin-right: 10px;
    }
    .plugin-entry {
        display: flex;
        align-items: center;
    }
    img.plugin-icon {
    position: relative;
    margin-right: 33px;
    max-width: 33px;
    max-height: 33px;
    margin-top: -23px;
    margin-left: -23px;
    border-radius: 300px;
    border: solid 1px #f99568;
    padding: 1px;
    }
    .refresh_all {
        min-width: 200px;
        margin: 10px auto 15px;
        font-size: 16px;
        color: #fff;
        padding: 10px;
        border: 0;
        border-radius: 6px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        background: #3b657d;
    }
    .refresh_one {
        min-width: 200px;
        margin: 10px auto 15px;
        font-size: 14px;
        color: #fff;
        padding: 7px;
        border: 0;
        border-radius: 6px;
        cursor: pointer;
        vertical-align: middle;
        background: #f99568;
    }
    .refresh_all:hover {
        background: #00D78B !important;
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        color: #fff;
    }
    .refresh_one:hover {
        background: #00D78B !important;
        color: #fff;
    }
    </style>

    <h1><span style="color:#f99568" class="dashicons dashicons-plugins-checked"></span> <?php esc_html_e('Fresh Plugins Ready To Install', 'textdomain'); ?></h1>
    <p style="font-size: 16px;">Select the plugins below that you would like to freshly install on this website.</p>
    <form method="post" action="">
    <?php wp_nonce_field('rfc_bulk_install_fresh_nonce'); ?>
    <table class="widefat plugins">
        <thead>
            <tr>
                <th><input style="margin-left: 0px;" type="checkbox" id="select-all"></th>
                <th><span style="color:#f99568" class="dashicons dashicons-admin-plugins"></span> <?php esc_html_e('Plugin Name', 'textdomain'); ?></th>
                <th><span style="color:#f99568" class="dashicons dashicons-update"></span> <?php esc_html_e('Action', 'textdomain'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($all_plugins as $plugin_file => $plugin_data) {
    if (rfc_is_plugin_from_wporg($plugin_file)) {
        $plugin_slug = dirname($plugin_file); // Get plugin slug for API request
        $plugin_icon = rfc_get_plugin_icon($plugin_slug); // Fetch plugin icon

        $reinstall_url = wp_nonce_url(
            admin_url('plugins.php?action=rfc_reinstall_plugin&plugin=' . urlencode($plugin_file)),
            'rfc_reinstall_plugin_' . $plugin_file
        );

        // Create a unique id for each link using the plugin slug
        $unique_id = 'reinstall-' . esc_attr($plugin_slug);
        ?>
                    <tr>
                        <td><input type="checkbox" name="plugins[]" value="<?php echo esc_attr($plugin_file); ?>"></td>
                        <td>
                            <div class="plugin-entry">
                                <?php if ($plugin_icon): ?>
                                    <img src="<?php echo esc_url($plugin_icon); ?>" alt="<?php echo esc_attr($plugin_data['Name']); ?>" class="plugin-icon">
                                <?php else: ?>
                                    <span class="dashicons dashicons-admin-plugins" style="font-size: 32px; vertical-align: middle;"></span>
                                <?php endif; ?>
                                <span style="font-weight: 700;"><?php echo esc_html($plugin_data['Name']); ?></span>
                            </div>
                        </td>
                        <td><a href="<?php echo esc_url($reinstall_url); ?>" id="<?php echo $unique_id; ?>" class="refresh_one"><?php esc_html_e('Install Fresh', 'textdomain'); ?></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
    <button style="margin-top: 23px;" type="submit" name="rfc_bulk_install_fresh" class="refresh_all"><?php esc_html_e('Fresh Install Selected', 'textdomain'); ?></button>
    </form>
    </div>
    <script type="text/javascript">
    document.getElementById('select-all').addEventListener('click', function(event) {
        var checkboxes = document.querySelectorAll('input[name="plugins[]"]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = event.target.checked;
        }
    });
document.addEventListener("DOMContentLoaded", function() {
    // Dynamically select all reinstall links with an id starting with 'reinstall-'
    const reinstallLinks = document.querySelectorAll('[id^="reinstall-"]'); // Select all elements with ids starting with 'reinstall-'

    reinstallLinks.forEach(link => {
        link.addEventListener("click", function(e) {
            document.getElementById("fresh-install-overlay").style.display = "flex"; // Show the overlay
        });
    });
});
</script>
    <?php
}
?>

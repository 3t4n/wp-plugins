<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/*
* Plugin Name: AIO Calculators By Adittaw
* Description: Adds multiple calculators Tools to your WordPress site.
* Version: 1.0.1
* Author: Adittaw
* Author URI: https://adittaw.com
* License: GPL-2.0+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

// Define prefix
define('ADITTAW_PREFIX', 'adittaw_');

// Include all PHP files in the 'tools' directory
$plugin_dir = plugin_dir_path(__FILE__);
$tools_dir = $plugin_dir . 'tools/';
$adittaw_tool_files = glob($tools_dir . '*.php');
foreach ($adittaw_tool_files as $file) {
    require_once $file;
}

// Add settings menu and page
function adittaw_aio_calculators_settings_menu() {
    add_options_page(
        'AIO Calculators Settings',
        'AIO Calculators',
        'manage_options',
        'adittaw_aio_calculators_settings',
        'adittaw_aio_calculators_settings_page'
    );
}
add_action('admin_menu', 'adittaw_aio_calculators_settings_menu');

// Render settings page
function adittaw_aio_calculators_settings_page() {
    global $adittaw_tool_files; // Make $tool_files global
    ?>
    <div class="wrap">
        <h1>AIO Calculators Settings</h1>
        <input type="text" id="search_tool" placeholder="Search Tool" onkeyup="searchTools()">
        <p>Shortcodes for available calculators:</p>
        <table class="wp-list-table widefat striped">
            <thead>
                <tr>
                    <th>Tool Name</th>
                    <th>Shortcode</th>
                </tr>
            </thead>
            <tbody id="tool_list">
    <?php
    // Check if $adittaw_tool_files is defined and not empty
    if (isset($adittaw_tool_files) && !empty($adittaw_tool_files)) {
        foreach ($adittaw_tool_files as $file) {
            $file_basename = plugin_basename($file);
            // Get tool name from the file name
            $tool_name = ucwords(str_replace('_', ' ', basename($file, '.php')));
            // Get shortcode with prefix
            $shortcode_prefix = ADITTAW_PREFIX;
            $shortcode = '[' . $shortcode_prefix . basename($file, '.php') . ']';
            // Display tool name and shortcode
            echo "<tr><td>" . esc_html($tool_name) . "</td><td>" . esc_html($shortcode) . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No tools found.</td></tr>";
    }
    ?>
</tbody>

        </table>
    </div>

    <style>
        /* Add your CSS styles here */
        .wrap {
            margin-top: 20px;
        }
        table.wp-list-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table.wp-list-table th,
        table.wp-list-table td {
            padding: 10px;
            text-align: left;
        }
        table.wp-list-table th {
            background-color: #f1f1f1;
            font-weight: bold;
        }
        table.wp-list-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        input#search_tool {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
    </style>

    <script>
        function searchTools() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search_tool");
            filter = input.value.toUpperCase();
            table = document.getElementById("tool_list");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <?php
}

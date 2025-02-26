<?php
// Main Plugin File
add_action('admin_menu', 'aiosc_shortcodes_add_settings_page');

function aiosc_shortcodes_add_settings_page() {
       $icon_url = plugin_dir_url(__FILE__) . '../assets/images/aio-menu-img.png';



    add_menu_page(
        'AIO Shortcodes Settings',     // Page title
        'AIO Shortcodes',              // Menu title
        'manage_options',              // Capability
        'aio_shortcodes_settings',     // Menu slug
        'aiosc_view_shortcodes_admin_table', // Callback
        $icon_url,                     // Icon URL
        25                             // Position
    );
}

// Display the settings page
function aiosc_view_shortcodes_admin_table() {
    global $shortcode_tags;

    $aiosc_shortcodes_list = array_filter(
        array_keys($shortcode_tags),
        fn($shortcode) => strpos($shortcode, 'aio') === 0
    );

    sort($aiosc_shortcodes_list);

    ?>
    <div id="aio_view_shortcodes_title" style="padding: 20px;">
        <h1><?php _e('AIO Shortcodes List', 'view-shortcodes'); ?></h1>
        
        <div style="margin-bottom: 20px;">
            <legend>
    <p>
        <?php _e('Easily view, manage and monitor shortcode usage across your site.', 'view-shortcodes'); ?>
    
        <a href="https://aioshortcodes.com/?utm_source=site-view-list&utm_medium=site-view-shortcodes-list&utm_campaign=aiosc-plugin" target="_blank" style="text-decoration: none; color: #0033BB; font-weight: 500;">
            <?php _e('Visit Official Website', 'view-shortcodes'); ?>
        </a> |
        <a href="https://aioshortcodes.com/docs/?utm_source=site-view-list&utm_medium=site-view-shortcodes-list&utm_campaign=aiosc-plugin" target="_blank" style="text-decoration: none; color: #0033BB; font-weight: 500;">
            <?php _e('Read Documentation', 'view-shortcodes'); ?>
        </a> |
        <a href="https://wordpress.org/support/plugin/aio-shortcodes/" target="_blank" style="text-decoration: none; color: #0033BB; font-weight: 500;">
            <?php _e('Free Support', 'view-shortcodes'); ?>
        </a>
    </p>
    </br>
</legend>

            <div style="overflow-x:auto;background:#ffffff;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
    <tr>
        <th style="background-color:#0033BB;color:#ffffff;text-align:left;padding:15px 20px;"><?php _e('Shortcode Name', 'view-shortcodes'); ?></th>
        <th style="background-color:#0033BB;color:#ffffff;text-align:left;cursor:pointer;" title="Click to sort"><?php _e('Usage Count ⇕', 'view-shortcodes'); ?></th>
        <th style="background-color:#0033BB;color:#ffffff;text-align:left;cursor:pointer;"><?php _e('Used In (times) ⇕️', 'view-shortcodes'); ?></th>
        <th style="background-color:#0033BB;color:#ffffff;text-align:left;cursor:pointer;" title="Click to sort"><?php _e('Total Usage Counts ⇕', 'view-shortcodes'); ?></th>
    </tr>
</thead>
                
                    <tbody>
                         <?php
                        // Loop through AIO shortcodes
                        foreach ($aiosc_shortcodes_list as $shortcode) {
                            $shortcode_data = get_posts_using_shortcode($shortcode); // Get posts/pages using the shortcode
                            $used_in = $shortcode_data['titles']; // Extract post titles
                            $usage_count = count($used_in); // Count the number of occurrences
                            $total_usage_count = $shortcode_data['total_count']; // Get total usage count

                            echo '<tr style="width: 20%; border-bottom: 1px solid #f2f2f2;">';
                            echo '<td style="padding-left: 17px; width: 20%; font-size:15px;"><strong>[' . $shortcode . ']</strong></td>';
                            echo '<td style="width: 10%;">' . $usage_count . '</td>';
                            echo '<td style="padding-top: 15px; padding-bottom: 15px; width: 55%">' . (empty($used_in) ? __('Not used', 'view-shortcodes') : implode('<br>', $used_in)) . '</td>';
                            echo '<td style="width: 25%;">' . $total_usage_count . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Inline JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const table = document.querySelector("table");
            const headers = table.querySelectorAll("th");

            headers.forEach((header, index) => {
                header.addEventListener("click", function () {
                    const rows = Array.from(table.querySelectorAll("tbody tr"));
                    const isAscending = header.classList.contains("asc");

                    rows.sort((rowA, rowB) => {
                        const cellA = rowA.children[index].textContent.trim();
                        const cellB = rowB.children[index].textContent.trim();

                        const numA = parseInt(cellA.match(/\d+/)) || 0; // Extract numbers
                        const numB = parseInt(cellB.match(/\d+/)) || 0;

                        return isAscending ? numA - numB : numB - numA;
                    });

                    header.classList.toggle("asc", !isAscending);
                    header.classList.toggle("desc", isAscending);

                    rows.forEach((row) => table.querySelector("tbody").appendChild(row));
                });
            });
        });
    </script>
  
    <?php
}

// Function to get posts/pages where a shortcode is used
function get_posts_using_shortcode($shortcode) {
    global $wpdb;

    $query = "
        SELECT p.ID, p.post_title, p.post_content
        FROM {$wpdb->posts} p
        WHERE p.post_content LIKE %s
        AND p.post_status = 'publish'
        AND (p.post_type = 'post' OR p.post_type = 'page')
    ";
    $posts = $wpdb->get_results($wpdb->prepare($query, '%' . $wpdb->esc_like('[' . $shortcode) . '%'));

    $post_titles = [];
    $total_usage_count = 0;

    foreach ($posts as $post) {
        preg_match_all('/\[' . preg_quote($shortcode, '/') . '[^\]]*\]/', $post->post_content, $matches);
        $count = count($matches[0]);
        $total_usage_count += $count;
        $post_titles[] = '<a href="' . get_edit_post_link($post->ID) . '" target="_blank">' . esc_html($post->post_title) . '</a> (' . $count . ')';
    }

    return [
        'titles' => $post_titles,
        'total_count' => $total_usage_count,
    ];
}

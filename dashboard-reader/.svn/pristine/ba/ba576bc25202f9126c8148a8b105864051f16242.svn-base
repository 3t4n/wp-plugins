<?php 
// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Hook into the 'wp_dashboard_setup' action to add our widgets
add_action('wp_dashboard_setup', 'dashboard_reader_add_widgets');

function dashboard_reader_add_widgets() {
    $options = get_option('dashboard_reader_settings');
    $raw_feeds = preg_split('/\r\n|[\r\n]/', $options['dashboard_reader_textarea_field']);
    $rss_feeds = array_filter(array_map('trim', $raw_feeds), function($url) {
        return filter_var($url, FILTER_VALIDATE_URL);
    });

    $feed_titles = get_transient('dashboard_reader_feed_titles');
    if (false === $feed_titles) {
        $feed_titles = dashboard_reader_get_feed_titles($rss_feeds);
        set_transient('dashboard_reader_feed_titles', $feed_titles, HOUR_IN_SECONDS);
    }

    foreach ($rss_feeds as $feed_url) {
        $widget_id = 'dashboard_reader_widget_' . md5($feed_url);
        $widget_title = isset($feed_titles[$feed_url]) ? $feed_titles[$feed_url] : __('RSS Feed', 'dashboard-reader');

        wp_add_dashboard_widget(
            $widget_id, 
            $widget_title, 
            'dashboard_reader_display_feed', 
            null, 
            array('feed_url' => $feed_url)
        );
    }
}

function dashboard_reader_get_feed_titles($feeds) {
    $feed_titles = array();
    require_once(ABSPATH . WPINC . '/feed.php');

    foreach ($feeds as $feed_url) {
        $rss = fetch_feed($feed_url);
        if (!is_wp_error($rss)) {
            $feed_titles[$feed_url] = esc_html($rss->get_title());
        } else {
            $feed_titles[$feed_url] = __('RSS Feed', 'dashboard-reader');
        }
    }

    return $feed_titles;
}

function dashboard_reader_display_feed($widget, $callback_args) {
    $feed_url = $callback_args['args']['feed_url'];
    $transient_name = 'dashboard_feed_' . md5($feed_url);
    
    // Fetch cached feed items from the transient
    $cached_feed_items = get_transient($transient_name);

    // If no cached items, fetch them from the feed URL
    if ($cached_feed_items === false) {
        require_once(ABSPATH . WPINC . '/feed.php');
        $rss = fetch_feed($feed_url);

        if (is_wp_error($rss)) {
            echo '<p>' . esc_html__('Error fetching feed.', 'dashboard-reader') . '</p>';
            return;
        }

        $options = get_option('dashboard_reader_settings');
        // Use the user-defined item count setting or default to 5 if not set
        $item_count = isset($options['dashboard_reader_item_count']) ? absint($options['dashboard_reader_item_count']) : 5;
        
        $maxitems = $rss->get_item_quantity($item_count);
        $rss_items = $rss->get_items(0, $maxitems);

        $cached_feed_items = array_map(function($item) {
            // Extract and cache only the necessary data from each feed item
            return [
                'permalink' => $item->get_permalink(),
                'title' => $item->get_title(),
                'date' => $item->get_date('j F Y | g:i a'),
            ];
        }, $rss_items);

        // Determine the refresh interval from settings
        $refresh_interval = isset($options['dashboard_reader_refresh_interval']) ? absint($options['dashboard_reader_refresh_interval']) : 12;

        // Cache the simplified feed items array
        set_transient($transient_name, $cached_feed_items, HOUR_IN_SECONDS * $refresh_interval);
    }

    if (empty($cached_feed_items)) {
        echo '<p>' . esc_html__('No items to display.', 'dashboard-reader') . '</p>';
    } else {
        // Display the cached feed items
        echo '<ul>';
        foreach ($cached_feed_items as $item) {
            echo '<li>';
            echo '<a href="' . esc_url($item['permalink']) . '" target="_blank" rel="noopener noreferrer">';
            echo esc_html($item['title']);
            echo '</a>';
            echo '<br/><small>' . esc_html($item['date']) . '</small>';
            echo '</li>';
        }
        echo '</ul>';
    }
}



<?php

clean();

function clean() {
    global $wpdb;
    $wpdb->query("DELETE FROM wp_options WHERE wp_options.option_name='widget_twitter_widget'");
    delete_transient('update_time');
    delete_transient('token');
    delete_transient('lastTweets');
    delete_transient('twitter_status');
}

?>
<?php

function plugin_zaehler() {
    $all_plugins = apply_filters( 'all_plugins', get_plugins() );
    foreach ( (array) $all_plugins as $plugin_file => $plugin_data) {
        if ( is_plugin_active($plugin_file) ) {
            $aktivierte_plugins[ $plugin_file ] = $plugin_data;
        }
    }
    $total_active_plugins = count($aktivierte_plugins);
    echo '<p class="plugins-right-now">'. __('You have ', 'dashview'). '<a href="plugins.php">'.$total_active_plugins . __(' active plugins', 'dashview').'</a>.';
}

add_action('activity_box_end', 'plugin_zaehler');

?>

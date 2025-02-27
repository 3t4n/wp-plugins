<?php

function dark_visitors_augment_robots_txt() {
    $robots_txt = dark_visitors_get_robots_txt();

    dark_visitors_echo_robots_txt_block($robots_txt);
}

add_action('do_robots', 'dark_visitors_augment_robots_txt');

// Helpers

function dark_visitors_echo_robots_txt_block($robots_txt) {
    echo "

# START DARK VISITORS BLOCK
# ---------------------------
";

    echo esc_textarea($robots_txt);

    echo "
# ---------------------------
# END DARK VISITORS BLOCK

";
}

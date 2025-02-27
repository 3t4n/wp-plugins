<?php

namespace ElementsHiveForBreakdance\BuilderTricks;

function enqueue_builder_script()
{
    if (!\Breakdance\isRequestFromBuilderIframe()) return;

    wp_enqueue_script('elements_hive_builder_tricks_js', ELEMENTS_HIVE_ASSETS_DIR . '/builder/builder-tricks/eh_builder_tricks.js', [], '1.0', true);

}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_builder_script');



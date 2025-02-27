<?php
function ScldEditorBtn($buttons) {
    array_push($buttons, "separator", "ScldShortcode");
    return $buttons;
}
add_filter('mce_buttons', 'ScldEditorBtn', 0);

function ScldRegister($plugin_array) {
        $plugin_array['ScldShortcode'] = plugins_url('tinyMCE/editor_plugin.js', __FILE__);
        return $plugin_array;
}
add_filter('mce_external_plugins', "ScldRegister");
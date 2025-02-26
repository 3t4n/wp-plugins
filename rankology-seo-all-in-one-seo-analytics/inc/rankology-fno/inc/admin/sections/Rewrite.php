<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rkseo_print_section_info_rewrite()
{
    rankology_print_pre_section('rewrite');

    if (! is_plugin_active('permalink-manager-pro/permalink-manager.php')) {
        if (method_exists(rankology_get_service('ToggleOption'), 'getToggleWhiteLabel') && '1' !== rankology_get_service('ToggleOption')->getToggleWhiteLabel()) { ?>

        <?php
        }
    }
}

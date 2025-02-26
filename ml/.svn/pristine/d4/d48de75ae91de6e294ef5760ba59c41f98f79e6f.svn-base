<?php

if(version_compare(get_option('icl_sitepress_version'), ICL_SITEPRESS_VERSION, '=') || (isset($_REQUEST['action']) && $_REQUEST['action'] == 'error_scrape') || !isset($wpdb) ) return;

add_action('plugins_loaded', 'icl_plugin_upgrade' , 1);

function icl_plugin_upgrade()
{
    global $wpdb, $sitepress_settings, $sitepress;

    if(defined('ICL_DEBUG_MODE') && ICL_DEBUG_MODE && (is_writable(ICL_PLUGIN_PATH) || is_writable(ICL_PLUGIN_PATH . '/upgrade.log'))){
        $mig_debug = @fopen(ICL_PLUGIN_PATH . '/upgrade.log' , 'w');
    }else{
        $mig_debug = false;
    }

    $iclsettings = get_option('icl_sitepress_settings');

    // upgrade actions
    // 1. reset ajx_health_flag
    $iclsettings['ajx_health_checked'] = 0;
    update_option('icl_sitepress_settings',$iclsettings);

    // clear any caches
    if($mig_debug) fwrite($mig_debug, "Clearing cache \n");
    require_once ICL_PLUGIN_PATH . '/inc/cache.php';
    icl_cache_clear('locale_cache_class');
    icl_cache_clear('flags_cache_class');
    icl_cache_clear('language_name_cache_class');
    icl_cache_clear('cms_nav_offsite_url_cache_class');
    if($mig_debug) fwrite($mig_debug, "Cleared cache \n");


    if(defined('ICL_DEBUG_MODE') && ICL_DEBUG_MODE && $mig_debug){
        @fclose($mig_debug);
    }

}


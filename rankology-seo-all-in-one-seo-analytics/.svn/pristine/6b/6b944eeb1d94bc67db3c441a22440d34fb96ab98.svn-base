<?php

namespace Rankology_Stats\Detailed_Data;

class Helper
{
    public static function getPluginAssetUrl($assetName, $plugin = 'rankology-stats-widgets')
    {
        return RANKOLOGY_STATS_DETAILED_DATA_URL . "/assets/{$assetName}";
    }
    public static function getAssetPath($asset)
    {
        return RANKOLOGY_STATS_DETAILED_DATA_PATH . $asset;
    }
    /**
     * @param $template
     * @param array $parameters
     * @return false|string|void
     */
    public static function loadTemplate($template, $parameters = [])
    {
        $templatePath = RANKOLOGY_STATS_DETAILED_DATA_PATH . "templates/{$template}";
        if (\file_exists($templatePath)) {
            \ob_start();
            \extract($parameters);
            require RANKOLOGY_STATS_DETAILED_DATA_PATH . "templates/{$template}";
            return \ob_get_clean();
        }
    }
}

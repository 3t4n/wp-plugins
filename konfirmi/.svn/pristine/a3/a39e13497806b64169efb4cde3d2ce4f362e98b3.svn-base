<?php

/**
 * Activation of Konfirmi Plugin
 * 
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Base;
use \Konfirmi\Models\WidgetModel;

class Activate
{
    /*
     * Flush WordPress rewrite rules when activating a theme of plugin.
     */
    public static function activate()
    {
        $widgetModel = new WidgetModel();
        $widgetModel->createTables();
        flush_rewrite_rules();
    }
}
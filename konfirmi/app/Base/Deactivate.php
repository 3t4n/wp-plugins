<?php

/**
 * Deactivate Konfirmi Plugin
 * 
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Base;
use \Konfirmi\Models\WidgetModel;

class Deactivate
{
    /*
     * Flush WordPress rewrite rules when deactivating a theme of plugin.
     */
    public static function deactivate()
    {
        $widgetModel = new WidgetModel();
        $widgetModel->clearForms();
        flush_rewrite_rules();
    }
}
<?php

/**
 * General Class for working with forms
 * 
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Base;
use \Konfirmi\Api\RestfulApi;

use \Konfirmi\Models\WidgetModel;
class FormController extends RestfulApi
{
    /**
     * Prevent render widget for incorrect form
     *
     * @param [int] $type index of form (Contact Form 7 - 1, Ninja Forms - 2, Gravity Forms - 3, Caldera Forms - 4 )
     * @param [integer] $widget_id
     * @return bool should render
     */
    public function shouldWidgetRender($type, $widget_id) {
        $widgetModel = new WidgetModel();
        $forms = $widgetModel->getWidgetFormsWhere($widget_id);
        if(count($forms) <= 0) return false;
        if($forms[0]->form_id == $type) return true;
        return false;
    }
}
<?php

/**
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Api;

use \Konfirmi\Api\RestfulApi;
/**
 * Class for Konfirmi Api services.
 */
class RequestHelper extends RestfulApi
{
    /**
     * Load all widgets from server
     *
     * @return object object that contains widgets and errors
     */
    public function loadWidgets(){
        $widgets_data = $this->makeRequest($this->config["api"]["baseUrl"].'/widgets', 'GET');
        if(!empty($widgets_data['error'])){
            $widgets_data['data']['widgets'] = NULL;
        }
        return $widgets_data;
    }

    public function asignWidgetToForm($widgetModel, $notifies){
        $widgetId = sanitize_text_field($_POST['widget_id']);
        $formId = sanitize_text_field($_POST['form_id']);
        if(!empty($widgetId)){
            if(!empty($formId) && $formId == 5){
                $widgetModel->saveWidgetForUnicForm($widgetId, 5);
            } else {
                $widgetModel->saveWidgetForm($widgetId, empty($formId) ? 0 : $formId);
            }
            $notifies[] = $this->config['strings']['containerAttached'];
        }
    }
}

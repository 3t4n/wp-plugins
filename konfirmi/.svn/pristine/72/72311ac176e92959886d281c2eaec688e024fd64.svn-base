<?php

/**
 * @package Konfirmi Plugin
 */

namespace Konfirmi\Base\Forms;

use \Konfirmi\Base\FormController;
use \Konfirmi\Models\WidgetModel;
use \Konfirmi\Base\BaseController;
use \Konfirmi\Api\RestfulApi;



class AgileCRM extends FormController
{
	
	/**
	 * Register the hook for working with AgileCRM form data before sending.
	 */ 
	public function register(){

		// if(!in_array('agile-crm-lead-management/index.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        //     return null;
        // }
		
        $this->enqueueScripts();
        AgileCRM::register_endpoints();
	}
	

	/**
    * Init scripts for Konfirmi Plugin
    */
	public function enqueueScripts(){
        wp_enqueue_script('config', $this->plugin_url."assets/js/Config.js");
        wp_enqueue_script('base_class', $this->plugin_url."assets/js/Base.js", 'config');
        wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/css/konfirmi.min.css');
        wp_enqueue_script('agile_crm_scripts', $this->plugin_url."assets/js/agile-crm.js", 'base_class');
    }


    public function register_endpoints(){
        add_action( 'rest_api_init', function () {
            register_rest_route( '/v1', '/widget/(?P<id>\d+)', array(
                'methods'  => 'GET',
                'callback' => 'konfirmi_checkWidget',
            ) );
        });
    }

    public static function check_widget($widget_id){
        $widgetModel = new WidgetModel();
        $forms = $widgetModel->getWidgetFormsWhere($widget_id);
        $sitekey = "";
        if(count($forms) > 0 && $forms[0]->form_id == 6) {
            $restfulAPI = new RestfulApi();
            $base = new BaseController();

            $url = $base->config['api']['baseUrl'];
            $widget = $restfulAPI->makeRequest($url . "/form/site-key/$widget_id", 'GET');
            $sitekey = $widget['data'];
        }
        return array( 'data'=> $sitekey);
    }
}

<?php

/**
 * Class for working with Caldera Forms plugin
 * 
 * @package Konfirmi Plugin
 */


namespace Konfirmi\Base\Forms;

use \Konfirmi\Base\FormController;
use Caldera_Forms_Fields;

class CalderaForm extends FormController
{
	public $Caldera_fields;
	/**
	* Register hooks for working with Caldera Forms.
	*/
	public function register() {
		// if(!in_array('caldera-forms/caldera-core.php', apply_filters('active_plugins', get_option('active_plugins'))) && !class_exists('Caldera_Forms_Admin')) {
		//     return null;
		// }

		add_filter('caldera_forms_render_get_field', function ($fields) {
			if($fields['type'] == 'konfirmi'){
				$widget_id = $fields['config']['widget_id'];
				if(!$this->shouldWidgetRender(4, abs($widget_id))){
					$fields['config']['widget_id'] = -abs($widget_id);
				} else {
					$fields['config']['widget_id'] = abs($widget_id);
					$this->enqueueScripts();
				}
			}
			return $fields;
		}, 99);
		
		/**
		* Add konfirmi widget field tag
		*
		* @param "file" 	- template for render in form
		* @param "template" - template for field configuration on admin panel  
		* @param "preview" 	- template for field view on admin panel
		* 
		*/
		add_filter('caldera_forms_get_field_types', function($types){
			$types['konfirmi'] = array(
				"field" => "Konfirmi Widget",
				"description" => "Konfirmi Widget",
				"file" => $this->plugin_path . "templates/caldera-templates/konfirmi-field-view.php",
				"category" => "Special",
				"setup" => array(
					"template" => $this->plugin_path . "templates/caldera-templates/konfirmi-field-config.php",
					"preview" => $this->plugin_path . "templates/caldera-templates/konfirmi-field-preview.php"
				),
			);
			return $types;
		}, 99);
	}
	
    /**
	 * Init scripts for Konfirmi Plugin
	 */
	public function enqueueScripts(){
	  	// add_action('wp_enqueue_scripts', function(){
			$CalderaScripts = $this->plugin_url."assets/js/caldera-form.js";
			wp_enqueue_script('caldera_scripts', $CalderaScripts, array('konfirmi_scripts', 'base_class'));
		// });

	}
}
<?php 
class AutoofficeWork
{
	/**
	 * getAdmin()
	 */
	public function aopf_autooffice_wpForm()
	{
		add_shortcode('aopf-subscribeform', [$this, 'aopf_autooffice_form']);
	}

	/**
	 * aopf_form()
	 */
	public function aopf_autooffice_form() 
	{
		self::resourceRegistration();
		
		if (empty($model) || get_class($model)!='AutoofficeModel') {
			$model = new AutoofficeModel();
		}
		
		$data = $model->aopf_autooffice_getData();
		
		if (
			!empty($data['select']) && 
			is_array($data['select']) && 
			!empty($data['select']['stores_id']['value']) && 
			!empty($data['select']['stores_name']['value']) &&  
			!empty($data['select']['newsletter']['value']) &&
			!empty($data['select']['form_html']['value'])
		) {
			return $model->aopf_autooffice_parserForm($data['select']['form_html']['value']);
		}
	}
	
	/**
	 * resourceRegistration()
	 */
	public function resourceRegistration() 
	{
		if (empty(AOPF_DEBUG)) {
			wp_enqueue_style('aopf_plugin_css', plugins_url('assets/css/core.css',dirname(__FILE__)));
		} else {
			wp_enqueue_style('aopf_plugin_css', plugins_url('assets/css/core.min.css', dirname(__FILE__)));
		}

		if (!empty(AOPF_DEBUG)) {
			wp_enqueue_script('aopf_plugin_js', plugins_url('assets/js/core.js', dirname(__FILE__)));
		} else {
			wp_enqueue_script('aopf_plugin_js', plugins_url('assets/js/core.min.js', dirname(__FILE__)));
		}
	}
	
	/**
	 * model($className=__CLASS__)
	 */ 
	public static function aopf($className=__CLASS__)
	{
		return new $className;
	}
}

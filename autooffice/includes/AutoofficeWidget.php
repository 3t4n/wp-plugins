<?php
class AutoofficeWidget extends WP_Widget
{
	protected $table_name;
	protected $data;
	
	// ['title', 'newsletter', 'advertising', 'subsform']
	protected $settings = ['title']; 
	
	public function __construct() 
	{
		parent::__construct("aopf_autooffice_widget", __('Autooffice Subs', 'autooffice'), array("description" => __('Autooffice Description', 'autooffice')));
	}

	public function aopf_autooffice_form($instance) 
	{
		if (empty($model) || get_class($model)!='AutoofficeModel') {
			$model = new AutoofficeModel();
		}
		
		$this->data = $model->aopf_autooffice_getData();
		
		$params = [];
		foreach ($this->settings as $val) {
			$params[$val]['id'] = $this->get_field_id("widget_".$val);
			$params[$val]['name'] = $this->get_field_name("widget_".$val);
			$params[$val]['value'] = $instance['widget_'.$val];
		}

		require_once(AOPF_AUTOOFFICE_DIR.'views/widget_form.php');
		echo AopfAutoofficeForm::aopf_autooffice_getForm($this->data, $params);
	}
   
	public function update($newInstance, $oldInstance) 
	{
		$values = [];
		foreach ($this->settings as $val) {
			$values['widget_'.$val] = $newInstance['widget_'.$val];
		}

		return $values;	
	}
   
	public function widget($args, $instance) 
	{
		if (empty($model) || get_class($model)!='AutoofficeModel') {
			$model = new AutoofficeModel();
		}
		
		$this->data = $model->aopf_autooffice_getData();
		
		if (!empty($instance)) {
			foreach ($this->settings as $val) {
				if (!empty($instance['widget_'.$val])) {
					$this->data['select']['widget_'.$val]['value'] = $instance['widget_'.$val];
				}
			}
		}

		$id_newsletter = $this->data['select']['widget_newsletter']['value'] ? $this->data['select']['widget_newsletter']['value'] : $this->data['select']['newsletter']['value'];
		if (
			!empty($this->data['select']) && 
			is_array($this->data['select']) && 
			!empty($this->data['select']['stores_id']['value']) && 
			!empty($this->data['select']['stores_name']['value']) &&  
			!empty($id_newsletter) &&
			!empty($this->data['select']['form_html']['value'])
		) {
			$form = $model->aopf_autooffice_parserForm($this->data['select']['form_html']['value']);
			require_once(AOPF_AUTOOFFICE_DIR.'views/widget.php');
		}
	} 
	
	public function aopf_autooffice_getData()
	{
		return $this->data;
	}
	
	/**
	 * model($className=__CLASS__)
	 */ 
	public static function aopf($className=__CLASS__)
	{
		return new $className;
	}
}
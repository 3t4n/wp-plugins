<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* Coreoption option
*/
class As_metabox_option
{	
	public $as_field;
	public $as_value;
	public $as_type;
	public function __construct($field, $value = '', $option_type = ''){
		$field['required'] = (isset($field['required']) === true) ? true : false;
		$this->as_field = $field;		
		$this->as_value = $value;
		$this->as_type = $option_type;

	}
	
	public function name(){
		$serial = (isset($this->as_type['serial'])) ? $this->as_type['serial'] : '0' ;
		if (isset($this->as_type['option_type'])) {
			if ($this->as_type['option_type'] == 'group') {
				return $this->as_type['option_id'].'['.$serial.']['.$this->as_field['id'].']';
			}
		}

		return sanitize_html_class($this->as_field['id']);
	}

	public function value(){
		$field = $this->as_field;
		$value = $this->as_value;
		if ($value !== null) {
			return $value;
		}else{
			return (isset($field['default'])) ? $field['default'] : '' ;
		}		
	}



	public function attributes(){
		ob_start();
		$field = $this->as_field;
		if (isset($field['attirbutes'])) {
			if (is_array($field['attirbutes'])) {
				foreach ($field['attirbutes'] as $key => $value) {
					?>
						<?php echo $key; ?>="<?php echo $value; ?>"
					<?php
				}
			}
		}

		if ($field['required'] === true) {
			echo 'required';
		}

		return ob_get_clean();
	}

	public function html_class(){
		$field = $this->as_field;
		if (isset($field['html_class'])) {
			return sanitize_html_class($field['html_class']);
		}else{
			return '';
		}	
	}



	public function required($value)
	{
		$chack = true;
		$field = $this->as_field;
		if ($field['required'] === true) {
			if (empty($value) === true) {
				$chack = false;
			}else{
				$chack = true;
			}
		}

		return ($chack === true) ? true : false ;
	}
	


	public function validation($value){
		return true;
	}
	
	public function save($post_id, $key, $value){
		$key = sanitize_key($key);
		update_post_meta(
			$post_id,
			$key,
			$value);
	}
	
	public function dateconfig(){
		$field = $this->as_field;
		if(isset($field['data-format'])){
			return $field['data-format'];
		}else{
			return 'dd-mm-yy';
		}
	}


	public function sanitize_as_metadata($data)	{
		return sanitize_text_field($data);
	}

}

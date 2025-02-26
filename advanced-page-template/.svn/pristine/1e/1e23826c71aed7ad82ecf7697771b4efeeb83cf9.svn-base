<?php
/**
 * @package Advanced Page Template
 * @version 1.0
 */
/*
Plugin Name: Advanced Page Template
Plugin URI: http://wordpress.org/plugins/advanced-page-template/
Description: This plugin enables to specify the custom fields for the page templates in php comment block of them, and displays specified custom fields for that page template in the backend.
Author: Xing
Author URI: http://www.webuddysoft.com/
Version: 1.1
*/

if( !class_exists('apt') ):

class apt
{
	var $settings;

	function __construct()
	{
		// vars
		$this->settings = array(
			'version' => '1.0'
		);


		add_action( 'save_post',  array($this, 'save_post') );
		add_action( 'add_meta_boxes',  array($this, 'add_meta_box') );
		add_action( 'admin_init', array($this, 'init') );
	}

	function init(){
		$styles = array(
			'apt' => plugin_dir_url(__FILE__) . 'style.css'
		);
		
		foreach( $styles as $k => $v )
		{
			wp_register_style( $k, $v, false, $this->settings['version'] );
			wp_enqueue_style( $k );
		}
	}

	function add_meta_box(){
		add_meta_box( 
		    'advanced-page-template',
		    'Custom Fields For Template',
		    array($this, 'callback_add_meta_box'),
		    'page',
		    'normal',
		    'high'
		);
	}

	function helpers_humanize_string($str){
		$str = trim(strtolower($str));
		$str = preg_replace('/[^a-z0-9\s+]/', '', $str);
		$str = preg_replace('/\s+/', ' ', $str);
		$str = explode(' ', $str);
	 
		$str = array_map('ucwords', $str);
	 
		return implode(' ', $str);
	}

	function helpers_hash($string){
		$array = explode(':', $string);

		$hash = array();

		$pattern = '/\((.*)\)/';

		preg_match($pattern, $array[1], $matches);

		if(count($matches) == 2)
		{
			$values = explode('|', $matches[1]);
			$hash = array(trim($array[0]) => $values);

		}else{
			$hash = array(trim($array[0]) => trim($array[1]));
		}
		

		return $hash;
	}

	function helpers_array_unique($array, $unique_key) {
	    if (!is_array($array)) {
	        return array();
	    }

	    $_unique_keys = array();

	    foreach ($array as $key => $item) {
	        $group_by=$item[$unique_key];
	        
	        if (isset( $_unique_keys[$group_by]))
	        {
	            continue;
	        }
	        
	        $_unique_keys[$group_by] = $item;
	    }

	    return $_unique_keys;
	}


	function extract_fields($path){

		$fields = array();

		$pattern = '/\@custom_field\s(.*)\n/';

		$file_handle = fopen($path, "r");
		while (!feof($file_handle)) {
		   $line = fgets($file_handle);
		   preg_match($pattern, $line, $matches);

		   if(count($matches) == 2)
		   {
		   		$field_data = explode(',', $matches[1]);
		   		$field_name = array_shift($field_data);

		   		$field_label = $this->helpers_humanize_string($field_name);

		   		$_field = array('name'=>$field_name, 'key'=>$field_name, 'label'=>$field_label);

		   		if(count($field_data) > 0){

		   			foreach($field_data as $field_option)
		   			{
						$_option = $this->helpers_hash($field_option);

						$_field = array_merge($_field, $_option);
		   			}
		   		}

		   		$fields[] = $_field;

		   }
		}
		fclose($file_handle);

		$fields = $this->helpers_array_unique($fields, 'key');
		return $fields;
	}

	function render_fields($fields){

		global $post, $acf;

		echo "<div class='advanced-page-template'>";

		?>
			<p style="text-align: right;">
				<a href="http://wordpress.org/support/view/plugin-reviews/advanced-page-template">Click here to rate</a> |
				<a href="http://forum.webuddysoft.com/blogs/advanced-page-template/53-wordpress-advanced-page-template-guide">Read online document</a>
			</p>

		<?php

		if($acf):
			$acf->create_fields($fields, $post->ID);
		else:
			?>
			<p>
				I recommend you to install and activate <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Advanced Custom Fields</a> plugin that makes the custom fields easy to manage for you.
			</p>
			
			<?php

			foreach($fields as $field){
				?>
				<p><label><?php echo $field['label']?></label></p>
				<div>
					<textarea><?php echo get_post_meta($post->ID, $field['key'], true);?></textarea>
				</div>
				<?php
			}

		endif;

		echo "</div>";
		
	}

	function callback_add_meta_box($post)
	{
		$_template_root = get_template_directory();
	    $_template_path = get_post_meta($post->ID, '_wp_page_template', true);
	    $_template_full_path = $_template_root.'/'.$_template_path;

	    $fields = $this->extract_fields($_template_full_path);

	    $this->render_fields($fields);
	}

	function save_post($post_id){
		if(isset($_POST['fields']))
		{
			foreach($_POST['fields'] as $k=>$v)
			{
				update_post_meta($post_id, $k, $v);
			}
		}
		
	}

}


/*
* initialize advanced page template
*/

function apt()
{
	global $apt;
	
	if( !isset($apt) )
	{
		$apt = new apt();;
	}
	
	return $apt;
}

apt();

endif;
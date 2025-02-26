<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* As metabox core class
*/
class As_metabox
{
	public $as_name;
	public $as_id;
	public $screen;
	public $as_context;
	public $as_priority;

	public $addsections;
	public $sections;



	

	public function __construct($args)	{

		$this->addsections 	= array();
		$this->sections 	= array();



		$this->as_name 		= $args['title'];
		$this->as_id 		= $args['id'];
		$this->screen 		= $args['screen'];
		$this->as_context	= (empty($args['context']) === false) ? $args['context'] : 'advanced' ;
		$this->as_priority 	= (empty($args['priority']) === false) ? $args['priority'] : 'default' ;

		add_action( 'add_meta_boxes', array(  $this, 'as_add_meta_box' ));
		add_action('save_post', array(  $this, 'as_save_all_metabox' ));
	
	}

	public function as_add_meta_box(){
		if (function_exists('add_meta_box')) {
			add_meta_box( 
				$this->as_id, 
				$this->as_name, 
				array(  $this, 'as_metabox_func' ), 
				$this->screen,
				$this->as_context,
				$this->as_priority
				);
		}
	}

	public function add_section($args){
		$this->sections[] = array_merge($this->addsections, $args);
	}


	public function as_metabox_func(){
		$sections = (array)$this->sections;
		$as_fields = array();
		$this->error_handler();
?>


  <div class="asa_admin_before_tab">
	  <div id="as_admin_tabs">
	  <input type="hidden" name="_as_nonce" value="<?php echo wp_create_nonce( 'as_metabox_'.get_the_ID() ); ?>">
	    <ul id="as_admin_tabs_ul">
		<?php
		$a1 = 0;
		if (empty($sections) === false) {
			if (is_array($sections) === true) {
				foreach ($sections as $section) {?>
					<li class="<?php echo ($a1 == 0) ? 'active' : '' ; ?>"><a id="as_tab_active" href="#<?php echo sanitize_html_class($section['id']); ?>"><i class="fa <?php echo sanitize_html_class($section['icon']); ?>"></i><?php echo esc_html($section['title']); ?></a></li>
					<?php
					$a1++;
				}
			}
		}

		?>

	    </ul>
	        <div id="as_admin_tabs_container">
				<div class="asa_admin_inner_tab">


<?php

if (empty($sections) === false) {
	if (is_array($sections) === true) {
		$a1 = 0;
		foreach ($sections as $section) {
		?>

			<div id="<?php echo sanitize_html_class($section['id']); ?>" class="as_tab_main_content <?php echo ($a1 == 0) ? 'active' : '' ; ?>">

		<?php
			if (empty($section['fields']) === false) {
				if (is_array($section['fields']) === true) {
					foreach ($section['fields'] as $field) {
						
						$as_title 	= (isset($field['title']) === true) ? $field['title'] : '' ;
						$as_desc 	= (isset($field['desc'])  === true) ? $field['desc'] : '' ;
						$as_type 	= (isset($field['type'])  === true) ? $field['type'] : '' ;
						$as_value   = get_post_meta(get_the_ID(), $field['id'], true);
						$as_value   = (empty($as_value) === false) ? $as_value : null ;
						?>
						<div class="as_admin_tab_content">
							<div class="as_main_single_box">
								<div class="as_main_single_title">
									<?php echo $this->box_title($as_title); ?>
									<?php echo $this->box_desc($as_desc); ?>
								</div>
								<div class="as_main_single_contant_box">
									<?php
										$as_type_class = 'As_metabox_option_'.$as_type;
										if (class_exists($as_type_class)) {
											$type = new $as_type_class($field, $as_value, $as_type);
											$type->as_output();
										}else{
											echo apply_filters('as_not_exists_option', 'No Option Available.');
										}
									?>
								</div>
							</div>
						</div>

						<?php
					}
				}
			}
		?>
			</div>
		<?php
$a1++;
		}
	}
}

?>


				</div>
	        </div>
	  </div>
  </div><!--End tabs-->


<?php
	}


	public function box_title($data){
		if (empty($data) === false) {
			echo '<h2>'.$data.'</h2>';
		}
	}
	public function box_desc($data){
		if (empty($data) === false) {
			echo '<p>'.$data.'</p>';
		}
	}
	

	public function as_save_all_metabox($post_id){
		$sections = (array)$this->sections;
		$error_msg = null;
		$valid_data = false;
		$sanitize_data = array();
		if (empty($_POST) === false) {
			if (empty($_POST['_as_nonce'])  === false) {
				
				$as_nonce = @$_POST['_as_nonce'];
				
				$autosave = wp_is_post_autosave( $post_id );
				$revision = wp_is_post_revision( $post_id );

				if ($autosave || $revision) {
					return;
				}
				
				if (!wp_verify_nonce( $as_nonce, 'as_metabox_'.$post_id)) {
					return;
				}

				
				if (is_array($sections) === true) {
					foreach ($sections as $section) {
						if (is_array($section['fields']) === true) {
							foreach ($section['fields'] as $field) {
								$as_type 	= (isset($field['type'])  === true) ? $field['type'] : '' ;
								$as_type_class = 'As_metabox_option_'.$as_type;
								$as_value = '';
								$as_key = '';
								if (class_exists($as_type_class)) {	

									if ( $field['type'] == 'group' ) {

										if (isset($field['group_fields'])) {

											if (is_array($field['group_fields'])) {

												foreach ($field['group_fields'] as $group_key => $group_value) {

													if (isset($_POST[$field['id']])) {

														if (is_array($_POST[$field['id']])) {

															$as_type_class = 'As_metabox_option_'.$group_value['type'];
															if (class_exists($as_type_class)) {
																foreach ($_POST[$field['id']] as $post_key => $post_value) {
																	if (array_key_exists($group_value['id'], $post_value) === true) {				
																		$not_set_val = (is_array($post_value[$group_value['id']])) ? serialize($post_value[$group_value['id']]) : $post_value[$group_value['id']] ;
																		$validate = new $as_type_class($group_value, $group_value['id'], $group_value['type']);
																		if ($validate->required( $not_set_val )  === false) {
																			$error_msg = apply_filters('as_metabox_error_message_'.$group_value['id'], $group_value['title'].' is required.', 'required');
																		}else if ($validate->validation($not_set_val) === false) {
																			$error_msg = apply_filters('as_metabox_error_message_'.$group_value['id'], $group_value['title'].' Invalid data.' , 'validation');
																		}else{
																			$key_id = $group_value['id'];
																			$post_key = (int)$post_key;
																			$sanitize_data[$field['id']][$post_key][$key_id] = $validate->sanitize_as_metadata($not_set_val);																	
																		}
																	}
																}
															}

														}

													}

												}

											}

										}

										if ($error_msg === null) {
											$valid_data[$field['id']] = array(
												'type' 			=> $as_type,
												'valid_data' 	=> $sanitize_data
											);
										}

									}else{
										if (array_key_exists($field['id'], $_POST) === true) {
											$chack_array = (is_array($_POST[$field['id']])) ? serialize($_POST[$field['id']]) : $_POST[$field['id']] ;
											$validate = new $as_type_class($field, $as_value, $as_type);
											if ($validate->required( $chack_array )  === false) {
												$error_msg = apply_filters('as_metabox_error_message_'.$field['id'], $group_value['title'].' is required.', 'required');
											}else if ($validate->validation($chack_array) === false) {
												$error_msg = apply_filters('as_metabox_error_message_'.$field['id'], $field['title'].' Invalid data.' , 'validation');
											}else{
												$valid_data[$field['id']] = array(
														'type' 			=> $as_type,
														'valid_data' 	=>  $validate->sanitize_as_metadata($chack_array)
													);
											}
										}
									}				
								}
							}
						}
					}
				}			
			}
		}		


		if ($error_msg !== null) {
			set_transient('as_set_transient_error_msg', $error_msg, 60*60*12);			
		}else{
			if ($valid_data) {
				if (is_array($valid_data)) {
					foreach ($valid_data as $key => $value) {
						$as_type_class = 'As_metabox_option_'.$value['type'];
						$save_data = new $as_type_class($value,$value,$value);
						$save_data->save($post_id, $key, $value['valid_data']);
					}
				}
			}
		}

	}

	public function error_handler(){

		$transient_error = get_transient( 'as_set_transient_error_msg' );

		if (empty($transient_error) === false) {
			add_settings_error(
				'as_set_setting_error_msg',
				esc_attr( 'post_updated' ),
				$transient_error,
				'error'
			);
		}

		if (empty(get_settings_errors('as_set_setting_error_msg')) === false) {
			settings_errors('as_set_setting_error_msg');
		}
		delete_transient( 'as_set_transient_error_msg' );

	}


}
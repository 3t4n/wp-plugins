<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'PROFILEPROAdminAjax' ) ){

	class PROFILEPROAdminAjax{
		
		function __construct(){
			
			add_action( 'wp_ajax_profilepro_get_popup_contents', array( $this, 'get_popup_contents' ) );
			add_action( 'wp_ajax_profilepro_admin_add_field', array( $this, 'admin_add_field' ) );
			add_action( 'wp_ajax_profilepro_admin_add_custom_field', array( $this, 'add_custom_field' ) );
			add_action( 'wp_ajax_profilepro_admin_update_field', array( $this, 'admin_update_field' ) );
			add_action( 'wp_ajax_profilepro_admin_accept_user', array( $this, 'profilepro_admin_accept_user') );
		}
		
		function get_popup_contents(){
			
			if ( !is_user_logged_in() || !current_user_can('manage_options') ) die( __('Please login as administrator','profilepro') );
			
			extract($_POST);
		    $profilepro_meta_box = new PROFILEPROAdminPostMetaBoxes();
			//$profilepro = new PROFILEPROApi();
			 
			global $profilepro , $post;
			switch( $act_id ){
				
				case 'profilepro_admin_show_fields':
					ob_start();
					?>
					<h4><?php _e('Setup New Field',PROFILEPRO_PLUGIN_SLUG); ?></h4>
					<div>
					<?php 
						$fields_arr = $profilepro->api->get_field_types();
						if( $fields_arr ){
							foreach( $fields_arr as $key => $array ){
					?> 
								<a href="#" class="profilepro-admin-fields" data-arg1="<?php echo $key;?>" data-arg2="<?php echo $arg2;?>" data-action="profilepro_admin_popup_create_field"><?php _e( ucfirst($array['type']) , PROFILEPRO_PLUGIN_SLUG )?></a>
					<?php 
						}
					}	
					?>
					</div>
					<h4><?php _e('Predefined Fields',PROFILEPRO_PLUGIN_SLUG); ?></h4>
					<div>
						<?php 
							$builtin_field_arr = $profilepro->api->get_builtin_fields();
							if( $builtin_field_arr ){
								foreach( $builtin_field_arr as $key => $array ){
						?>
							<a href="#" class="profilepro-admin-fields" data-arg1 = "<?php echo $key;?>" data-arg2 = "<?php echo $arg2;?>" data-action="profilepro_admin_popup_add_builtin_field"><?php _e( $array['title'] , PROFILEPRO_PLUGIN_SLUG )?></a>
						<?php 
							}
						}
							
						?>
					</div>
					<h4><?php _e('Custom Fields',PROFILEPRO_PLUGIN_SLUG); ?></h4>
					<div>
						<?php 
							$custom_field_arr = get_option('profilepro_custom_fields');
							if( $custom_field_arr ){
								foreach( $custom_field_arr as $key => $array ){
						?>
							<a href="#" class="profilepro-admin-fields" data-arg1 = "<?php echo $key;?>" data-arg2 = "<?php echo $arg2;?>" data-action="profilepro_admin_popup_add_custom_field"><?php _e( $array['title'] , PROFILEPRO_PLUGIN_SLUG )?></a>
						<?php 
							}
						}
							
						?>
					</div>
					<?php 
					$output = ob_get_contents();
					ob_get_clean();
					echo $output;
					die();
					break;

				
			}
		}
		function admin_add_field(){
			if ( !is_user_logged_in() || !current_user_can('manage_options') ) die( __('Please login as administrator','profilepro') );
			
			global $profilepro , $post;
			extract($_POST);
			$profilepro_meta_box = new PROFILEPROAdminPostMetaBoxes();
			switch( $act_id ){
			case 'profilepro_admin_popup_create_field':
					$field_attr = $profilepro->api->get_field_types($arg1);
					ob_start();
					?>
					<form action="">
					<?php
					foreach( $field_attr as $key=>$array){
						$profilepro_meta_box->create_field( $key );
					}
					?>
					<input type="hidden" name="type" id="type" value="<?php echo $arg1;?>" />
					<br>
					<center><input type="button" class="frombuilder_button" name="profilepro_admin_add_custom_field" id="profilepro_admin_add_custom_field" value="<?php _e('Add', 'profilepro')?>" data-arg2="<?php echo $arg2;?>" ></center>
					</form>
					<?php
					$output = ob_get_contents();
					ob_get_clean();
					echo $output;
					die();
					break;
					
			case 'profilepro_admin_popup_add_builtin_field':
				$fields = get_post_meta( $arg2, 'fields', true );
				$builtin_field = $profilepro->api->get_builtin_fields($arg1);
				$fields[$arg1] = $builtin_field;
				update_post_meta($arg2, 'fields', $fields);
				ob_start();
				?>
				<div class="profilepro-admin-drag-drop-field profilepro-field-type-<?php echo $builtin_field['type']?>">
					<div class="profilepro-admin-field-name"><?php _e($builtin_field['title'], PROFILEPRO_PLUGIN_SLUG);?><span class="fieldtype"><?php _e($builtin_field['type'],PROFILEPRO_PLUGIN_SLUG)?><span></div>
					<div class="profilepro-admin-field-operations">
					<div class="profilepro-admin-delete-field"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
					<div class="profilepro-admin-edit-field">
						<a href="#" data-arg1="<?php echo $arg1;?>" data-arg2="<?php echo $arg2;?>" data-arg3="<?php echo $builtin_field['type']?>" data-action="profilepro_admin_popup_edit_field"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<input type="hidden" name="profilepro_field_order[]" value="<?php echo $arg1;?>">
					</div>
					</div>
				</div>
				<?php 
				$output = ob_get_contents();
				ob_get_clean();
				echo $output;
				die();
				break;
				
			case 'profilepro_admin_popup_add_custom_field':	
				$fields = get_post_meta( $arg2, 'fields', true );
				$custom_field = get_option( 'profilepro_custom_fields' );
				$custom_field = $custom_field[$arg1];
				$fields[$arg1] = $custom_field;
				update_post_meta($arg2, 'fields', $fields);
				ob_start();
				?>
				<div class="profilepro-admin-drag-drop-field profilepro-field-type-<?php echo $custom_field['type']?>">
					<div class="profilepro-admin-field-name"><?php _e($custom_field['title'], PROFILEPRO_PLUGIN_SLUG);?><span class="fieldtype"><?php _e($custom_field['type'],PROFILEPRO_PLUGIN_SLUG)?><span></div>
					<div class="profilepro-admin-field-operations">
					<div class="profilepro-admin-delete-field"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
					<div class="profilepro-admin-edit-field">
						<a href="#" data-arg1="<?php echo $arg1;?>" data-arg2="<?php echo $arg2;?>" data-arg3="<?php echo $custom_field['type']?>" data-action="profilepro_admin_popup_edit_field"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<input type="hidden" name="profilepro_field_order[]" value="<?php echo $arg1;?>">
					</div>
					</div>
				</div>
				<?php 
				$output = ob_get_contents();
				ob_get_clean();
				echo $output;
				die();
				break;
				
			case 'profilepro_admin_popup_edit_field':
				if ( !is_user_logged_in() || !current_user_can('manage_options') ) die( __('Please login as administrator','profilepro') );
			
				extract($_POST);
				$fields = get_post_meta( $arg2, 'fields', true );
				$field = $fields[$arg1];
				$profilepro_meta_box = new PROFILEPROAdminPostMetaBoxes();
				$profilepro_meta_box->editing = true;
				?>
				<form action="">
					<?php
					foreach( $field as $key=>$val){
						$profilepro_meta_box->edit_val = $val;
						$profilepro_meta_box->create_field( $key );
					}
					?>
					<br/>
					<input type="hidden" name="type" id="type" value="<?php echo $arg3;?>" />
					<center><input type="button" name="profilepro_admin_update_field" class="frombuilder_button" id="profilepro_admin_update_field" value="<?php _e('Update', 'profilepro')?>" data-arg2="<?php echo $arg2;?>" ></center>
					</form>
				<?php	
				die();
				break;
					
			}
		}
		
		function add_custom_field(){
			$fields = get_post_meta( $_POST['arg2'], 'fields', true );
			
			
			$fields[$_POST['meta_key']] = $_POST;
			update_post_meta( $_POST['arg2'], 'fields', $fields );
			$fields = get_option( 'profilepro_custom_fields' );
			$fields[$_POST['meta_key']] = $_POST;
			update_option( 'profilepro_custom_fields',  $fields );
			
			ob_start();
				?>
				<div class="profilepro-admin-drag-drop-field profilepro-field-type-<?php echo $_POST['type']?>">
					<div class="profilepro-admin-field-name"><?php _e($_POST['title'], PROFILEPRO_PLUGIN_SLUG);?><span class="fieldtype"><?php _e($_POST['type'],PROFILEPRO_PLUGIN_SLUG)?><span></div>
					<div class="profilepro-admin-field-operations">
					<div></div>
					<div class="profilepro-admin-delete-field"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
					<div class="profilepro-admin-edit-field">
						<a href="#" data-arg1="<?php echo $_POST['meta_key'];?>" data-arg2="<?php echo $_POST['arg2'];?>" data-arg3="<?php echo $_POST['type']?>" data-action="profilepro_admin_popup_edit_field" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<input type="hidden" name="profilepro_field_order[]" value="<?php echo $_POST['meta_key'];?>">
					</div>
					</div>
				</div>
				<?php 
				$output = ob_get_contents();
				ob_get_clean();
				echo $output;
				die();
		}
		
		function admin_update_field(){
			$fields = get_post_meta( $_POST['arg2'], 'fields', true );
			$fields[$_POST['meta_key']] = $_POST;
			

			update_post_meta( $_POST['arg2'], 'fields', $fields );
			die();
		}
		
		function profilepro_admin_accept_user(){
			$user_id = intval($_POST['user_id']);
			delete_user_meta($user_id, 'profilepro_account_status');
			die();
		}
	}
	
	new PROFILEPROAdminAjax();
}

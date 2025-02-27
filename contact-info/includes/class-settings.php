<?php
class Contact_info {
	
	public function __construct() {
		$this->plug_settings();
	}

	public function contact_info_save_data(){
		if(isset($_POST['update_contact']) && sanitize_text_field($_POST['update_contact']) == 'update_contact'){
			global $contact_info_data;
			
			if ( ! isset( $_POST['contact_info_options_save_action_field'] ) || ! wp_verify_nonce( $_POST['contact_info_options_save_action_field'], 'contact_info_options_save_action' ) ) {
			   wp_die( 'Sorry, your nonce did not verify.');
			} 
			
			if(is_array( $contact_info_data )){
				foreach( $contact_info_data as $key => $value ){
					if(!empty($_POST[$key.'_icon'])){
						update_option( $key.'_icon', sanitize_text_field($_POST[$key.'_icon']) );
					} else {
						delete_option( $key.'_icon' );
					}
				}
			}
			
			if(is_array( $contact_info_data )){
				foreach( $contact_info_data as $key => $value ){
					if(!empty($_POST[$key.'_default'])){
						update_option( $key.'_default', esc_html($_POST[$key.'_default']) );
					} else {
						delete_option( $key.'_default' );
					}
				}
			}
			
			$GLOBALS['msg'] = 'Data Updated Successfully';
		}
	}
	
	public function contact_info_afo_plugin_menu () {
		add_options_page('Contact Info', 'Contact Info', 'manage_options', 'contact_info_afo',  array( $this, 'contact_info_options' ) );
	}
	
	public function contact_help(){
    	global $contact_info_data;
		include( CI_DIR_PATH . '/view/admin/help.php' );
	}
	
	public function plug_settings(){
		add_action( 'admin_menu',  array( $this, 'contact_info_afo_plugin_menu' ) );
		add_action( 'init',  array( $this, 'contact_info_save_data' ) );
	}
	
	public function get_icon_selected( $sel = '' ){
		$ret = '';
		global $contact_info_icons;
		if(is_array( $contact_info_icons )){
			foreach( $contact_info_icons as $key => $value ){
				if( $key == $sel ){
					$ret .= '<option value="'.$key.'" selected>'.$value['type'].'</option>';
				} else {
					$ret .= '<option value="'.$key.'">'.$value['type'].'</option>';
				}
			}
		}
		return $ret;
	}
	
	public function  contact_info_options() {
		global $contact_info_data;
		echo '<div class="wrap">';
		$this->show_message();
		$this->help_support();
		include( CI_DIR_PATH . '/view/admin/settings.php' );
    	echo '</div>';
	}
	
	public function help_support(){
		include( CI_DIR_PATH . '/view/admin/help-support.php' );
	}
	
	public function show_message(){		
		if(isset($GLOBALS['msg'])){
			echo '<div class="updated"><p>'.$GLOBALS['msg'].'</p></div>';
			unset($GLOBALS['msg']);
		}
	}
}
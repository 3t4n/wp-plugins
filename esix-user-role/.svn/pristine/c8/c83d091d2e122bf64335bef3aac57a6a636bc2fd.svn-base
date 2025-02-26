<?php
/**
*Plugin Name: E6k USer Role
*Plugin URI: https://e6web.com/
*Description: This pluin is use for wordpress to make new user role based on user admin requrement and acces page based on selected user role to seleect option for which user cann access page content.
*Version: 1.0
*Author: Ketan Umretiya
*Author URI: https://profiles.wordpress.org/ketanumretiya030/
*/
register_activation_hook( __FILE__, 'eurm_ragister_meta_onactive' );
if(!function_exists('eurm_ragister_meta_onactive'))
{
	function eurm_ragister_meta_onactive()
	{
		$pagealow = array('page','media');
		$pagealow_type = array_map( 'esc_attr', $pagealow );
		if($pagealow_type)
		{
		  add_option('kk_postoption_ff',$pagealow_type  );
		}
		$message_user = 'Please contact the adminisitrator it seems you do not have access to this content, or try to login';
		 $sntguser_msg = sanitize_text_field($message_user); 
		add_option('kk_message_ff',"<h2>".$sntguser_msg."</h2>");
	}
}

if(!function_exists('eurm_register_sk_setting_page_as'))
{
	function eurm_register_sk_setting_page_as() {
		$menu_slug = 'eurm_access';
		add_menu_page(  __( 'Access User Role', 'textdomain' ),   'Access User Role',   'manage_options',   $menu_slug,  'eurm_setting_page_as',  plugins_url( 'esix_user-role/images/small.png' ),  5 );
		add_submenu_page( $menu_slug, 'About Plugin', 'About Plugin', 'read', 'eurm_about_esix', 'eurm_about_esix_sk' );  
	}
}
add_action( 'admin_menu', 'eurm_register_sk_setting_page_as' );

if(!function_exists('eurm_about_esix_sk'))
{
	function eurm_about_esix_sk()
	{

		include 'code/sk-admin-option.php';
		include 'code/esix_pramotions_admin.php';
	}
}
if(!function_exists('eurm_setting_page_as'))
{
	function eurm_setting_page_as()
	{
		 include 'code/sk-admin-option.php';
		 include 'code/sk-user_role_list.php';
	}
}
// use for get user role
if(!function_exists('eurm_roles_array'))
{
  function eurm_roles_array() {
			$editable_roles = get_editable_roles();
			foreach ($editable_roles as $role => $details) {
				$sub['role'] = esc_attr($role);
				$sub['name'] = translate_user_role($details['name']);
				$roles[] = $sub;
			}
			return $roles;
		}
}

// add Option on all admin page sidebar
if(!function_exists('eurm_custom_meta_user_ffrole'))
{
	function eurm_custom_meta_user_ffrole()
	{
		include 'code/sk_page_sidebar_admin_option.php';
	}
}
if(!function_exists('eurm_custom_meta_box_role'))
{
	function eurm_custom_meta_box_role()
	{
		$kk_alowd_post = get_option('kk_postoption_ff');
		add_meta_box("ff-userole-metabox", "Access User Role", "eurm_custom_meta_user_ffrole", $kk_alowd_post, "side", "high", null);
	}
}

add_action("add_meta_boxes", "eurm_custom_meta_box_role");

if(!function_exists('eurm_wporg_save_postdata'))
{
	function eurm_wporg_save_postdata( $post_id ) {
		//print_r($_POST['ff_role_alowk'] ) ; 
		
		if ( array_key_exists( 'ff_rolekadmin', $_POST ) ) {

		   $roleadmin = sanitize_text_field( $_POST['ff_rolekadmin']  );
		  // $ff_role_alowk = array_map ('esc_attr' , $_POST['ff_role_alowk']  );
		   $ff_role_alowk = eurm_sanitize_array( $_POST['ff_role_alowk']);
		   
			update_post_meta(  $post_id,  'ff_rolekadmin', $roleadmin   );
			update_post_meta(  $post_id, 'ff_role_alowk', $ff_role_alowk   );
		}else
		{   $roleadmin = sanitize_text_field( $_POST['ff_rolekadmin']  );
			  // $ff_role_alowk = array_map ('esc_attr' , $_POST['ff_role_alowk']  );
			  // $ff_role_alowk = array_map ('esc_attr' , $_POST['ff_role_alowk']  );
			   $ff_role_alowk = eurm_sanitize_array( $_POST['ff_role_alowk']);
			 add_post_meta(  $post_id, 'ff_rolekadmin',  $roleadmin   );
			add_post_meta(  $post_id,  'ff_role_alowk',   $ff_role_alowk   );
		}
	}
}
add_action( 'save_post', 'eurm_wporg_save_postdata' );
//Add Filter for front user_error

add_filter( 'the_content', 'eurm_filter_the_content_in_the_main_ffk' );
if(!function_exists('eurm_filter_the_content_in_the_main_ffk'))
{
	function eurm_filter_the_content_in_the_main_ffk( $content ) {
			  $post_id = get_the_ID();
			 $data_ff_rolek =  get_post_meta( $post_id , 'ff_rolekadmin' );
			// print_r($data_ff_rolek );
				 if($data_ff_rolek[0] == 'not_publish')
				 {
					 if(is_user_logged_in())
					 {
						 $usrkid = get_current_user_id();
						 $user_meta=get_userdata($usrkid);
						 $user_roles=$user_meta->roles;
						$ff_role_alowk = get_post_meta( $post_id , 'ff_role_alowk' );
						
						 if ((in_array($user_roles[0], $ff_role_alowk[0])) || ($user_roles[0]=='administrator'))
							 {
								 
							 }else
							 {
								$content = '<div class="ff_restrictuser">'.$kk_alowd_post.'</div>';   
							 }
						
					 }else
					 {
						$kk_alowd_post = get_option('kk_message_ff');
						$content = '<div class="ff_restrictuser">'.$kk_alowd_post.'</div>'; 
					 }
				 }
		return $content;
	}
}
if(!function_exists('eurm_sanitize_array'))
{
	function eurm_sanitize_array( $input ) {

		// Initialize the new array that will hold the sanitize values
		$new_input = array();

		// Loop through the input and sanitize each of the values
		foreach ( $input as $key => $val ) {
			$new_input[ $key ] = sanitize_text_field( $val );
		}

		return $new_input;

}
}
include 'shortcode/sk_show_hide_content_shortcode.php';
<?php
function alimitl_advanced_limitlogin_install() {
   global $table_prefix, $wpdb;
   $sql = "select * from ".$table_prefix."users order by id ASC";
   $users = $wpdb->get_results($sql);
   foreach($users as $user){
   		$cclogin_limit = get_user_meta($user->ID, '_gen_user_cc_login_limit', true);
		if($cclogin_limit =="" || $cclogin_limit == NULL){
			update_user_meta( $user->ID, "_gen_user_cc_login_limit", 1 );
		}
   } 	 
}
function alimitl_advanced_limitlogin_uninstall(){
	
}
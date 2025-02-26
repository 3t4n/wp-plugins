<?php 

add_action('wp_print_scripts', 'wtp_add_script_fn');
function wtp_add_script_fn(){

		//wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_media(); 
			
			wp_enqueue_style('wtp_picker_css', plugins_url('/inc/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css', __FILE__ ) ) ;
			wp_enqueue_script('wtp_pick_js', plugins_url('/inc/bootstrap-iconpicker/js/bootstrap-iconpicker.js', __FILE__ ), array('jquery' ), '1.0' ) ;
			
			wp_enqueue_style('wtp_font-awesome_css', plugins_url('/inc/font-awesome-4.1.0/css/font-awesome.min.css', __FILE__ ) ) ;
			
			wp_enqueue_style('wtp_font-awdddffggesome_css', plugins_url('/inc/bootstrap-3.2.0/css/bootstrap.css', __FILE__ ) ) ;
			
			
			wp_enqueue_style('wtp_fo2323nt-awesome_css', plugins_url('/inc/bootstrap-3.2.0/css/docs.css', __FILE__ ) ) ;
			wp_enqueue_style('wtp_fo434nt-awesome_css', plugins_url('/inc/bootstrap-3.2.0/css/pygments-manni.css', __FILE__ ) ) ;
			
			
			wp_enqueue_script('wtp_pick111_js', plugins_url('/inc/bootstrap-3.2.0/js/bootstrap.min.js', __FILE__ ), array('jquery' ), '1.0' ) ;
			
			wp_enqueue_script('wtp_jscolor_js', plugins_url('/inc/jscolor/jscolor.js', __FILE__ ), array('jquery' ), '1.0' ) ;
			

	if(is_admin()){		   	
		wp_enqueue_script('wtp_admin_js', plugins_url('/js/admin.js', __FILE__ ), array('jquery' ), '1.0' ) ;
		wp_enqueue_style('wtp_admin_css', plugins_url('/css/admin.css', __FILE__ ) ) ;	
	  }else{
		wp_enqueue_script('wtp_front_js', plugins_url('/js/front.js', __FILE__ ), array( 'jquery', 'jquery-form' ), '1.0' ) ;
		wp_enqueue_style('wtp_front_css', plugins_url('/css/front.css', __FILE__ ) ) ;	
	  }
}
?>
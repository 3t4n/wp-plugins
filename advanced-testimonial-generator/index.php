<?php
/*
Plugin Name: Advanced Testimonial Generator

Description: Testimonial Front End Form
Version: 1.0
Author: Junaid Ashraf

*/

?>

<?php 

add_action('admin_menu', 'view_page');

function view_page() {
    
    // Add a new top-level menu (ill-advised):
    add_menu_page(__('Testimonial Details','menu-test'), __('Testimonials','menu-test'), 'manage_options', 'top-level-testimonial', 'atg_view_testimonial');

    // Add a submenu to the custom top-level menu:
   // add_submenu_page('mt-top-level-handle', __('Test Sublevel','menu-test'), __('Add New','menu-test'), 'manage_options', 'View-list', 'sublevel_page');

  }
function atg_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post" class="form-basic">';
	echo "<div class='form-row'>";
	echo " <label><span>Full name</span>";
	echo '<input type="text" id="name" name="your_name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
	echo '</label>';
	echo '</div>';

	echo "<div class='form-row'>";
	echo "<label><span>Feedback</span>";
	echo '<textarea rows="10" cols="35" name="your_message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
	echo '</label>';
	echo '</div>';
	echo "<div class='form-row'>";
echo "<button type='submit' name='send' value='Send'>Submit</button>";
echo "</div>";
	echo '</form>';
}

function atg_insertion() {
global $reg_errors;
    $reg_errors = new WP_Error;
	global $wpdb;
	
	if ( isset( $_POST['send'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["your_name"] );
		
		
		$message = esc_textarea( $_POST["your_message"] );

          $wpdb->insert("wp_testimonial", array(
          "name" => "$name",
		  "detail" => "$message"

));
		if ( $message )  {
			echo '<div class="form-basic">';
			echo "<div class='form-title-row'><h1>Thanks for giving your feedback.</h1> </div>";
			
			echo '</div>';
		} else {
				echo '<div class="form-basic">';
			echo "<div class='form-title-row'><h1>An Unexpected error has occured.</h1> </div>";
			
			echo '</div>';
		}
	}
}
   

   
   
   
function testimonial_shortcode() {
	ob_start();
	atg_insertion();
	atg_form_code();

	return ob_get_clean();
}

add_shortcode( 'Testimonials', 'testimonial_shortcode' );
function atg_view_data() {
	ob_start();
	atg_front_view();
	

	return ob_get_clean();
}

add_shortcode( 'view data', 'atg_view_data' );

define('ROOTDIR', plugin_dir_path(__FILE__));


require_once(ROOTDIR . 'create-table.php');
require_once(ROOTDIR . 'view_testimonial.php');
require_once(ROOTDIR . 'frontend_view.php');

register_activation_hook( __FILE__, 'jal_install' );
register_activation_hook( __FILE__, 'jal_install_data' );

?>
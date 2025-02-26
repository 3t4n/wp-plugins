<?PHP
/*
Plugin Name: Stop Registration Spam
Plugin URI: http://www.tomroyal.com/blog/2012/04/09/stop-wordpress-registration-spam/
Description: Stop robot registrations using a custom question
Version: 1.24
Author: Tom Royal
Author URI: http://www.tomroyal.com

GPL licensed: http://www.gnu.org/licenses/gpl.html
*/

// add options
add_action( 'admin_menu', 'srs_plugin_menu' ); 

function srs_plugin_menu() {
	add_options_page( 'Stop Registration Spam Options', 'Stop Registration Spam', 'manage_options', 'stop_registration_spam_options', 'srs_plugin_options' ); 
}

function srs_plugin_options() {
	// check user has rights to change
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	// begin settings page
	
	// variables for the field and option names 
    $opt1_name = 'srs_captcha_q';
	$opt2_name = 'srs_captcha_a';
	$opt3_name = 'srs_captcha_h';
	
    $hidden_field_name = 'srs_submit_check';
    $data_field_name1 = 'srs_captcha_q';
	$data_field_name2 = 'srs_captcha_a';
	$data_field_name3 = 'srs_captcha_h';

    // Read in existing option values from database
    $opt1_val = get_option( $opt1_name );
	$opt2_val = get_option( $opt2_name );
	$opt3_val = get_option( $opt3_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'

    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {

		if ( ! isset( $_POST['srs_opts_nonce'] ) || ! wp_verify_nonce( $_POST['srs_opts_nonce'], 'srs_submit_options' )) {
			error_log('nonce failure die');
			exit;
		} 
		else {

			// Read their posted value
			$opt1_val = $_POST[ $data_field_name1 ];
			$opt2_val = $_POST[ $data_field_name2 ];
			$opt3_val = $_POST[ $data_field_name3 ];
			// Save the posted value in the database
			update_option( $opt1_name, $opt1_val );
			update_option( $opt2_name, $opt2_val );
			update_option( $opt3_name, $opt3_val );

			// Message user..

?>
<div class="updated"><p><strong><?php _e('Thanks - your custom settings have been saved.', 'Stop Registration Spam' ); ?></strong></p></div>
<?php
		}
    }

    // Show settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Stop Registration Spam Settings', 'Stop Registration Spam' ) . "</h2>";

    // settings form
    
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<p>To help stop registration spam robots in their tracks, enter a question and answer that should be obvious to your visitors but baffling to a robot scanning the site automatically.</p>
<p>Keep the question short, as it needs to display in a small box. The answer should also be short, and without spaces.</p>
<p><?php _e("Question:", 'Stop Registration Spam' ); ?> 
<input type="text" name="<?php echo $data_field_name1; ?>" value="<?php echo htmlspecialchars($opt1_val); ?>" size="60">
</p>
<p><?php _e("Answer:", 'Stop Registration Spam' ); ?> 
<input type="text" name="<?php echo $data_field_name2; ?>" value="<?php echo htmlspecialchars($opt2_val); ?>" size="20">
</p>
<p><?php _e("Message to display on failure:", 'Stop Registration Spam' ); ?> 
<input type="text" name="<?php echo $data_field_name3; ?>" value="<?php echo htmlspecialchars($opt3_val); ?>" size="60">
</p>

<?php wp_nonce_field( 'srs_submit_options', 'srs_opts_nonce' ); ?>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>
	<?php
	
	// end settings page
}

// Get settings..
$tom_custom_question_q = get_option('srs_captcha_q');
$tom_custom_question_a = get_option('srs_captcha_a');
$tom_custom_question_z = get_option('srs_captcha_h');

// in case no settings saved, defaults
if ($tom_custom_question_q == ""){
	$tom_custom_question_q = "What kind of animal is Snoopy?";	
	$tom_custom_question_a = "dog";	
	$tom_custom_question_z = "Sorry, incorrect answer. It's a three letter word.";	
}

// hooks..
add_action('register_form','tom_custom_question_f');
add_action('register_post','tom_custom_answer_f',10,3);
// end hooks..


// do question function
function tom_custom_question_f(){
 global $tom_custom_question_q;
 $html = '
 			<style type="text/css">
 					#newfield {
					background:#FBFBFB none repeat scroll 0 0;
					border:1px solid #E5E5E5;
					font-size:24px;
					margin-bottom:16px;
					margin-right:6px;
					margin-top:2px;
					padding:3px;
					width:97%;
				}
 			</style>

 				<div width="100%">

 					<p>
 						<label style="display: block; margin-bottom: 5px;">' . $tom_custom_question_q . '
 							<input type="text" name="tomcustomq" id="tomcustomq" class="input" value="'.$_POST['tomcustomq'].'" size="10" tabindex="26" />
 						</label>
 					</p>
</div>
';
echo $html;
}

// do validation
function tom_custom_answer_f($login,$email,$errors){
 global $tom_custom_question_a,$tom_custom_question_z;
   if (strtolower($_POST['tomcustomq']) != strtolower($tom_custom_question_a)){
    	$errors->add('tom_captcha_error',__($tom_custom_question_z));
   };

}

?>
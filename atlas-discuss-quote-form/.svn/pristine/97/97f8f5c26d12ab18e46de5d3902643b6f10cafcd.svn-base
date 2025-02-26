<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'wp_ajax_adf_mail_send', 'adf_mail_send' ); 
add_action( 'wp_ajax_nopriv_adf_mail_send', 'adf_mail_send' );
function adf_mail_send() 
{
	$a = check_ajax_referer('adf_nonce_string','security');
	if(!$a){ echo esc_html('Something went wrong ! please try after Some time'); wp_die();}
	
	global $wpdb;
	$adf_entities = $wpdb->prefix . 'adf_entities';
	$upload = wp_upload_dir();
	$upload_dir = $upload['basedir'].'/discuss-form/'.date('Y').'/'.date('m');
	$upload_url = $upload['baseurl'].'/discuss-form/'.date('Y').'/'.date('m');

	$admin_ext_email = sanitize_email(get_option('admin_email'));	
	if(isset($_POST['admin_ext_email'])){
		$admin_ext_email = sanitize_email($_POST['admin_ext_email']);
	}

	$mail_nonce = $merror = 0;
	$upload_file_url = $upload_dir .'/'. sanitize_file_name($_FILES['file']['name']);

	parse_str($_POST['post'], $output);

	$adf_description = sanitize_text_field($_POST['post']);

	if($_POST)
	{
		if(!is_dir($upload_dir)) { mkdir($upload_dir, 0755, true); }

		if ( 0 < $_FILES['file']['error'] ) 
		{
			echo 'Error: ' . $_FILES['file']['error'] . '<br>';
		}
		else {
			$filename = sanitize_file_name($_FILES['file']['name']);
			$check_filetype = wp_check_filetype_and_ext($_FILES['file'],$filename);
			$valid_ext = array('jpg|jpeg|jpe' => 'image/jpeg','png'  => 'image/png','gif'  => 'image/gif','pdf' => 'application/pdf','doc' => 'application/msword','docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			if(in_array($check_filetype['type'] , $valid_ext,TRUE))
			{
				$loc = $upload_dir .'/'. sanitize_file_name($_FILES['file']['name']);
				if(file_exists($loc)){
					$increment = 0;
				    list($name, $ext) = explode('.', $loc);
				    while(file_exists($loc)) {
				        $increment++;
				        $loc = $name. $increment . '.' . $ext;
				        $filename = $name. $increment . '.' . $ext;
				        $upload_file_url = $filename;
				    }		    
				    move_uploaded_file($_FILES['file']['tmp_name'],$filename);
				} else {
			   		move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir .'/'. sanitize_file_name($_FILES['file']['name']));   
			   	}	
			}   	
		}

		$out = 'Please Find Project Detail <br/>';
		$out .= '<table>';

		foreach ($output as $key => $value) {			
			$out .= '<tr>';
			if($key !== 'adf_demo_wpnonce')
			{
				if(sanitize_text_field($key) == 'projectType'){
					$out .= '<td>Services:</td>';			
					
					foreach ($value as $subkey => $val) {						
						if($val){
							$out .= '<tr><td>'.sanitize_text_field($val).':</td>';
							$out .= '<td>';
							foreach ($val as $innval) {
							$out .= '&nbsp;'.sanitize_text_field($innval).'<br/>';
							}
							$out .= '</td></tr>';
						}
					}
					
				}else{
					$out .= '<td>'.ucwords(str_replace('adf_',' ',sanitize_text_field($key))).'</td><td>'.$value.'</td>';						
				}
			}	
			$out .= '</tr>';
		}

		$out .= '</table>';
		
		/*------- Email Sendding---------*/
		$headers= "MIME-Version: 1.0\n" .
	    "Content-Type: text/html; charset=\"" .
		get_option('blog_charset') . "\"\n";
		$attachments = $attachments = array($upload_file_url);
		
		$to = $admin_ext_email;		
		$subject = esc_html('Project Specification');	 
		$a = wp_mail( $to, $subject, $out,$headers,$attachments);
		if(!$a){
			echo esc_html('Try After Some time Mail not sendding');
		}else{
			echo esc_html('Mail send Our Team will contact You soon !');
		}
		die();
	}

}	
?>
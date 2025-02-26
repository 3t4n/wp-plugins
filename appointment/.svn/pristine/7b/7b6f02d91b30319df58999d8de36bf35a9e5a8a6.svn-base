<?php
/*
	Plugin Name: Appointment
	Plugin URI: https://boffincoders.com/wp- 
	Description: Appointment System gives you the ability to set and pick time for appointment.
	Version: 4.1.0
	Author: Boffincoders
    Author URI: https://boffincoders.com/ 
    Text Domain: wp-boffin-appointment  
*/
 
if ( ! defined( 'ABSPATH' ) ) exit;
  
function boffin_coders_availability() {
global $wpdb; 
 
$table_name = $wpdb->base_prefix.'boffin_coders_appointment_availability';
$query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );

$table_name2 = $wpdb->base_prefix.'boffin_coders_appointment_booked';
$query2 = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name2 ) );

$table_name3 = $wpdb->base_prefix.'boffin_coders_appointment_data';
$query3 = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name3 ) );

$table_name4 = $wpdb->base_prefix.'boffin_coders_appointment_user_information';
$query4 = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name4 ) );


$table_name5 = $wpdb->base_prefix.'boffin_coders_appointment_styles';
$query5 = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name5 ) );

	  if ( ! $wpdb->get_var( $query ) == $table_name ) {
		$table_name = $wpdb->prefix . "boffin_coders_appointment_availability";
	 
		$charset_collate = $wpdb->get_charset_collate();
	 
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id int(11) NOT NULL,
		appointment_id int(11) NOT NULL,
		json_data mediumtext NOT NULL,
		details varchar(255) NOT NULL
		) $charset_collate;";
	 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql); 
 
	   $sql2 = $wpdb->insert( $table_name, array(
            'id' => "1", 
            'appointment_id' => "1",
            'json_data' => "'[\"Sundayslot9:00\",\"Sundayslot9:30\",\"Sundayslot10:00\",\"Sundayslot10:30\",\"Sundayslot11:00\",\"Sundayslot11:30\",\"Sundayslot12:00\",\"Sundayslot12:30\",\"Sundayslot13:00\",\"Sundayslot13:30\",\"Sundayslot14:00\",\"Sundayslot14:30\",\"Sundayslot15:00\",\"Sundayslot15:30\",\"Sundayslot16:30\",\"Sundayslot17:30\",\"Sundayslot18:30\",\"Mondayslot9:00\",\"Mondayslot9:30\",\"Mondayslot10:00\",\"Mondayslot10:30\",\"Mondayslot11:00\",\"Mondayslot11:30\",\"Mondayslot12:00\",\"Mondayslot12:30\",\"Mondayslot13:00\",\"Mondayslot13:30\",\"Mondayslot14:00\",\"Mondayslot14:30\",\"Mondayslot15:00\",\"Mondayslot15:30\",\"Mondayslot16:30\",\"Mondayslot17:30\",\"Mondayslot18:30\",\"Mondayslot19:00\",\"Mondayslot19:30\",\"Tuesdayslot9:00\",\"Tuesdayslot9:30\",\"Tuesdayslot10:00\",\"Tuesdayslot10:30\",\"Tuesdayslot11:30\",\"Tuesdayslot12:00\",\"Tuesdayslot12:30\",\"Tuesdayslot13:00\",\"Tuesdayslot13:30\",\"Tuesdayslot14:00\",\"Tuesdayslot14:30\",\"Tuesdayslot15:00\",\"Tuesdayslot15:30\",\"Tuesdayslot16:30\",\"Tuesdayslot17:30\",\"Tuesdayslot18:30\",\"Tuesdayslot19:00\",\"Tuesdayslot19:30\",\"Wednesdayslot9:00\",\"Wednesdayslot9:30\",\"Wednesdayslot10:00\",\"Wednesdayslot10:30\",\"Wednesdayslot11:00\",\"Wednesdayslot11:30\",\"Wednesdayslot12:00\",\"Wednesdayslot12:30\",\"Wednesdayslot13:00\",\"Wednesdayslot13:30\",\"Wednesdayslot14:00\",\"Wednesdayslot14:30\",\"Wednesdayslot15:00\",\"Wednesdayslot15:30\",\"Wednesdayslot16:30\",\"Wednesdayslot17:30\",\"Wednesdayslot18:30\",\"Wednesdayslot19:00\",\"Wednesdayslot19:30\",\"Thursdayslot9:00\",\"Thursdayslot9:30\",\"Thursdayslot10:00\",\"Thursdayslot10:30\",\"Thursdayslot11:00\",\"Thursdayslot11:30\",\"Thursdayslot12:00\",\"Thursdayslot12:30\",\"Thursdayslot13:00\",\"Thursdayslot13:30\",\"Thursdayslot14:30\",\"Thursdayslot15:00\",\"Thursdayslot15:30\",\"Thursdayslot16:30\",\"Thursdayslot17:30\",\"Thursdayslot18:30\",\"Thursdayslot19:00\",\"Thursdayslot19:30\",\"Fridayslot9:30\",\"Fridayslot10:00\",\"Fridayslot10:30\",\"Fridayslot11:00\",\"Fridayslot11:30\",\"Fridayslot12:00\",\"Fridayslot12:30\",\"Fridayslot13:00\",\"Fridayslot13:30\",\"Fridayslot14:30\",\"Fridayslot15:00\",\"Fridayslot15:30\",\"Fridayslot16:30\",\"Fridayslot17:30\",\"Fridayslot18:30\",\"Fridayslot19:00\",\"Fridayslot19:30\",\"Saturdayslot9:00\",\"Saturdayslot9:30\",\"Saturdayslot10:30\",\"Saturdayslot11:00\",\"Saturdayslot11:30\",\"Saturdayslot12:00\",\"Saturdayslot12:30\",\"Saturdayslot13:00\",\"Saturdayslot13:30\",\"Saturdayslot14:00\",\"Saturdayslot14:30\",\"Saturdayslot15:00\",\"Saturdayslot15:30\",\"Saturdayslot16:30\",\"Saturdayslot17:30\",\"Saturdayslot18:30\",\"Saturdayslot19:30\"]'", 
            'details' => "",
        ));
      dbDelta($sql2); 
	}
  
    if ( ! $wpdb->get_var( $query2 ) == $table_name2 ) {
		$table_name2 = $wpdb->prefix . "boffin_coders_appointment_booked";
	 
		$charset_collate = $wpdb->get_charset_collate();
	 
		 $sql = "CREATE TABLE IF NOT EXISTS $table_name2 (
		   id bigint(20) unsigned NOT NULL auto_increment,
		   name varchar(191) NOT NULL default '',
		   email varchar(191) NOT NULL default '',
		   phone varchar(191) NOT NULL default '',
		   address varchar(191) NOT NULL default '',
		   city varchar(191) NOT NULL default '',
		   state varchar(191) NOT NULL default '',
		   zip_code varchar(191) NOT NULL default '',
		   notes varchar(191) NOT NULL default '',
		   date varchar(191) NOT NULL default '',
		   time varchar(191) NOT NULL default '',
		   autoload varchar(20) NOT NULL default 'yes',
		   PRIMARY KEY  (id),
		   KEY autoload (autoload)
 
		) $charset_collate;";
	 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql); 
 
	} 
	
 
	if ( ! $wpdb->get_var( $query3 ) == $table_name3 ) {
		$table_name3 = $wpdb->prefix . "boffin_coders_appointment_data";
	 
		$charset_collate = $wpdb->get_charset_collate();
	 
		$sql = "CREATE TABLE IF NOT EXISTS $table_name3 (
		 id bigint(20) unsigned NOT NULL auto_increment,
		   appointment_id varchar(191) NOT NULL default '',
		   shortcode varchar(191) NOT NULL default '',
		   name varchar(191) NOT NULL default '',
		   duration varchar(191) NOT NULL default '',
		   duration_unit varchar(191) NOT NULL default '',
		   booking_view varchar(191) NOT NULL default '',
		   instructions varchar(191) NOT NULL default '',
		   capacity varchar(191) NOT NULL default '',
		   booked_apointment_email_admin varchar(191) NOT NULL default '',
		   success_message varchar(191) NOT NULL default '',
		   failed_message varchar(191) NOT NULL default '',
		   booked_apointment_email_customer varchar(191) NOT NULL default '',
		   canceled_apointment_email_admin varchar(191) NOT NULL default '',
		   canceled_apointment_email_customer varchar(191) NOT NULL default '',
		   autoload varchar(20) NOT NULL default 'yes',
		   PRIMARY KEY  (id),
		   KEY autoload (autoload)
		) $charset_collate;";
	 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql); 
 
	   $sql2 = $wpdb->insert( $table_name3, array(
            'id' => "1", 
            'appointment_id' => "1",
            'shortcode' => "", 
            'name' => "My appointment",
            'duration' => "30",
            'duration_unit' => "",
            'booking_view' => "",
            'instructions' => "",
            'capacity' => "1",
            'booked_apointment_email_admin' => "New Appointment",
            'success_message' => "Thank you! Your appointment is booked: Schedule Appointment",
            'failed_message' => "Appointment Booking Failed",
            'booked_apointment_email_customer' => "Your Appointment is confirmed",
            'canceled_apointment_email_admin' => "Cancel Email for Admin ",
            'canceled_apointment_email_customer' => "Cancel Email for Customer",
            'autoload' => "",
        ));
      dbDelta($sql2); 
	}
 
	if ( ! $wpdb->get_var( $query4 ) == $table_name4 ) {
		$table_name4 = $wpdb->prefix . "boffin_coders_appointment_user_information";
	 
		$charset_collate = $wpdb->get_charset_collate();
	 
		$sql = "CREATE TABLE IF NOT EXISTS $table_name4 (
		   id bigint(20) unsigned NOT NULL auto_increment,
		   appointment_id varchar(191) NOT NULL default '',
		   name varchar(191) NOT NULL default '',
		   name_required varchar(191) NOT NULL default '',
		   email varchar(191) NOT NULL default '',
		   email_required varchar(191) NOT NULL default '',
		   phone varchar(191) NOT NULL default '',
		   phone_required varchar(191) NOT NULL default '',
		   address varchar(191) NOT NULL default '',
		   address_required varchar(191) NOT NULL default '',
		   city varchar(191) NOT NULL default '',
		   city_required varchar(191) NOT NULL default '',
		   state varchar(191) NOT NULL default '',
		   state_required varchar(191) NOT NULL default '',
		   zip_code varchar(191) NOT NULL default '',
		   zip_code_required varchar(191) NOT NULL default '',
		   note varchar(191) NOT NULL default '',
		   note_required varchar(191) NOT NULL default '',
		   autoload varchar(20) NOT NULL default 'yes',
		   PRIMARY KEY  (id),
		   KEY autoload (autoload)
		) $charset_collate;";
	 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql); 
 
	   $sql2 = $wpdb->insert( $table_name4, array(
            'id' => "1", 
            'appointment_id' => "1",
            'name' => "1",
            'name_required' => "1",
            'email' => "1",
            'email_required' => "1",
            'phone' => "0",
            'phone_required' => "0",
            'address' => "0",
            'address_required' => "0",
            'city' => "0",
            'city_required' => "0",
            'state' => "0",
            'state_required' => "0",
            'zip_code' => "0",
            'zip_code_required' => "0",
            'note' => "0",
            'note_required' => "0",
            'autoload' => "",
        ));
      dbDelta($sql2); 
	}
	
	
	if ( ! $wpdb->get_var( $query5 ) == $table_name5 ) {
		$table_name5 = $wpdb->prefix . "boffin_coders_appointment_styles";
	 
		$charset_collate = $wpdb->get_charset_collate();
	 
		$sql = "CREATE TABLE IF NOT EXISTS $table_name5 (
		   id bigint(20) unsigned NOT NULL auto_increment,
		   background_color varchar(191) NOT NULL default '',
		   months_name varchar(191) NOT NULL default '',
		   dates_color varchar(191) NOT NULL default '',
		   year_color varchar(191) NOT NULL default '',
		   popup_backgound_border_color varchar(191) NOT NULL default '',
		   popup_backgound_color varchar(191) NOT NULL default '',
		   submit_button_color varchar(191) NOT NULL default '',
		   timeslot_text_color varchar(191) NOT NULL default '',
		   timeslot_background_color varchar(191) NOT NULL default '',
		   timeslot_booked_color varchar(191) NOT NULL default '',
		   timeslot_booked_bkg_color varchar(191) NOT NULL default '',
		   heading_color_popup varchar(191) NOT NULL default '',
		   text_color_popup varchar(191) NOT NULL default '',
		   autoload varchar(20) NOT NULL default 'yes',
		   PRIMARY KEY  (id),
		   KEY autoload (autoload)
		) $charset_collate;";
	 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql); 
 
	   $sql2 = $wpdb->insert( $table_name5, array(
            'id' => "1", 
            'background_color' => "#04b6e2",
            'months_name' => "#ffffff",
            'dates_color' => "#ffffff",
            'year_color' => "#000000",
            'popup_backgound_border_color' => "#04b6e2",
            'popup_backgound_color' => "#489960",
            'submit_button_color' => "#04b6e2",
            'timeslot_text_color' => "#000000",
            'timeslot_background_color' => "#ffffff",
            'timeslot_booked_color' => "#f91010",
            'timeslot_booked_bkg_color' => "#c0bfbf",
            'heading_color_popup' => "#ffffff",
            'text_color_popup' => "#000000",
            'autoload' => "",
        ));
      dbDelta($sql2); 
	}
	
	
 if( isset($_POST['radiovalue']) && isset($_POST['name']) && isset($_POST['email']) ){
 
	$to = sanitize_email($_POST['email']);	
	$subject = 'Apointment';
	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <webmaster@example.com>' . "\r\n";
	$headers .= 'Cc: boffinteam@boffincoders.com' . "\r\n";
  
 	$name = sanitize_text_field($_POST['name']);
 	$email = sanitize_email($_POST['email']);
 	$radiovalue = sanitize_text_field($_POST['radiovalue']);
 	$phone = sanitize_text_field($_POST['phone']);
   	$address = sanitize_text_field($_POST['address']);
 	$city = sanitize_text_field($_POST['city']);
 	$state = sanitize_text_field($_POST['state']);
 	$zip_code = sanitize_text_field($_POST['zip_code']);
 	$note = sanitize_text_field($_POST['note']);
	
	if(sanitize_text_field($_POST['date_slected']))
	{
		$date_slected = sanitize_text_field($_POST['date_slected']);
	}
	
     $table_name = $wpdb->prefix."boffin_coders_appointment_booked";
     $table_name2 = $wpdb->prefix."boffin_coders_appointment_data";
     $default_row2 = $wpdb->get_row( "SELECT * FROM $table_name2 WHERE appointment_id='1'");
	
     $allbook = array();
	 $table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
     $default_rowbooked = $wpdb->get_results("SELECT * FROM $table_namebooked");
	 foreach($default_rowbooked as $bookedvalues)
	 {
		 $allbook[] = $bookedvalues->date;
		 $allbook[] = $bookedvalues->time;
	 }
	  
 	 $tablemessages = $wpdb->prefix."boffin_coders_appointment_data";
	 $default_rowbooked = $wpdb->get_row("SELECT * FROM $tablemessages where id = '1'");
	  
 
   if (in_array( $radiovalue, $allbook) && in_array( $date_slected, $allbook))   
   {
	   esc_html_e($default_rowbooked->success_message);
   }
   
   else {
     $wpdb->insert($table_name, array(
					'name' => $name,	 
					'email' => $email,	 
					'phone' => $phone,	 
					'address' => $address,	 
					'city' => $city,	 
					'state' => $state,	 
					'zip_code' => $zip_code,	 
					'notes' => $note,	  
					'date' => $radiovalue,	 
					'time' => $date_slected,	 
			));
    
	
	$time = explode("slot",$radiovalue);
	
 	$message = "<html>
					<head>
					<title>Appointment</title>
					</head>
					<body>
					<p>".$default_row2->booked_apointment_email_customer."</p>
					 <div>
					 <p><b>Name</b>".$name."</p> 
					 <p> <b>Email</b>".$email." </p> 
					 <p> <b>Appointment Time </b>".$date_slected.", ".$time[1]." </p> 
					 </div>
					</body>
					</html>
				 ";
 
		esc_html_e($default_rowbooked->success_message);
     echo "<br/>";
	 echo "Appointment Time : ";
	   esc_html_e($date_slected.", ".$time[1]);
	 echo "<br/>";	
	 echo "Name : ";
	   esc_html_e($name);
	 echo "<br/>";
	 echo "Email : ";
	   esc_html_e($email); 
 
   }
	?>   
	<script>
		document.getElementById("<?php esc_html_e(str_replace(':',"", $radiovalue)); ?>").disabled = true;
	</script>

	<style>
	#<?php esc_html_e(str_replace(':',"", $radiovalue)); ?>
	{
		background: #bab6bf !IMPORTANT;
		border: 1px solid #bab6bf !IMPORTANT;
	}
	</style>
	<?php
	 die; 
	}	
}    
 
add_action('init', 'boffin_coders_availability');

  

function boffin_coders_styling()
{
    wp_enqueue_style('style_file' , plugin_dir_url(__FILE__).'style/style.css');
}
 
add_action('wp_enqueue_scripts','boffin_coders_styling');
  

//add_action('wp_enqueue_scripts','ajax_call');


function boffin_coders_menu_pages(){
 
 add_menu_page('Portfolio List', 'Appointments', 'edit_posts','appointment','boffin_coders_appointment','dashicons-calendar', 6 );   

 
add_submenu_page(
    'appointment',          
    'Settings',             
    'Settings',              
    'manage_options',            
    'appointment-basics',   
    'boffin_coders_settings'  
); 
 
  
 add_submenu_page(
    '',          
    'Delete Appointment',           
    'Delete Appointment',               
    'manage_options',              
    'appointment-delete',  
    'appointment_delete_single'  
);  
 
}
 
add_action('admin_menu', 'boffin_coders_menu_pages');

 
function boffin_coders_settings() {
   wp_enqueue_style('style_file' , plugin_dir_url(__FILE__).'style/style.css'); 
   global $wpdb;
   ?>
   
     <script>
			setTimeout(function() {
				document.getElementById("message").style.display = 'none';
			}, 2000);
	</script> 
   
   <?php
     /* Basic info */
 
     if(isset($_POST['basic_info']))
	{ 
        $table_name = $wpdb->prefix."boffin_coders_appointment_data";
		$appoint_name= sanitize_text_field( $_POST["appoint_name"]); 
	    $duration= sanitize_text_field( $_POST["duration"]); 
		$success_message= sanitize_text_field( $_POST["success"]); 
		$failed_message= sanitize_text_field( $_POST["failed"]); 
	    
 
	    $wpdb->update($table_name, array('name'=>$appoint_name, 'duration'=>$duration, 'duration_unit'=>'', 'booking_view'=>'', 'instructions'=>'', 'success_message'=>$success_message, 'failed_message'=>$failed_message), array('appointment_id'=>'1'));
		
		print_r("<p class='greentext' id='message' >Appointment Updated Successfully</p>");
	} 

 
	/* Capacity */
 
     if(isset($_POST['capacity_submit']))
	{ 
        $table_name = $wpdb->prefix."boffin_coders_appointment_styles";
		
		$background_color= sanitize_text_field( $_POST["background_color"]); 
		$months_name= sanitize_text_field( $_POST["months_name"]); 
		$dates_color= sanitize_text_field( $_POST["dates_color"]); 
		$year_color= sanitize_text_field( $_POST["year_color"]); 
		$popup_backgound_border_color= sanitize_text_field( $_POST["popup_backgound_border_color"]); 
		$popup_backgound_color= sanitize_text_field( $_POST["popup_backgound_color"]); 
		$submit_button_color= sanitize_text_field( $_POST["submit_button_color"]); 
		$timeslot_text_color= sanitize_text_field( $_POST["timeslot_text_color"]); 
		$timeslot_background_color= sanitize_text_field( $_POST["timeslot_background_color"]); 
		$timeslot_booked_color= sanitize_text_field( $_POST["timeslot_booked_color"]); 
		$timeslot_booked_bkg_color= sanitize_text_field( $_POST["timeslot_booked_bkg_color"]); 
		$heading_color_popup= sanitize_text_field( $_POST["heading_color_popup"]); 
		$text_color_popup= sanitize_text_field( $_POST["text_color_popup"]); 
 
 
	    $wpdb->update($table_name, array('background_color'=>$background_color, 'months_name'=>$months_name, 'dates_color'=>$dates_color, 'year_color'=>$year_color, 'popup_backgound_border_color'=>$popup_backgound_border_color, 'popup_backgound_color'=>$popup_backgound_color, 'submit_button_color'=>$submit_button_color, 'timeslot_text_color'=>$timeslot_text_color, 'timeslot_background_color'=>$timeslot_background_color, 'timeslot_booked_color'=>$timeslot_booked_color, 'timeslot_booked_bkg_color'=>$timeslot_booked_bkg_color, 'heading_color_popup'=>$heading_color_popup, 'text_color_popup'=>$text_color_popup ), array('id'=>'1'));
		
		print_r("<p class='greentext' id='message'>Appointment Updated Successfully</p>");
	}
 
 
     if(isset($_POST['availability_submit']))
	{ 
             $table_name = $wpdb->prefix."boffin_coders_appointment_availability";
 
	     $timeslots = array_map('sanitize_text_field', $_POST["timeslots"]);
 
	     $wpdb->update($table_name, array('json_data'=>json_encode($timeslots)), array('appointment_id'=>'1'));
		
	     print_r("<p class='greentext' id='message'>Appointment Updated Successfully</p>");
	}
 
 
     if(isset($_POST['user_info']))
	{ 
        $table_name = $wpdb->prefix."boffin_coders_appointment_user_information";
		
		if (isset($_POST['user_name'])) {
		    $user_name = "1";
		 }
		else
		{
			$user_name = '0';
		}
		
		if (isset($_POST['user_name_required'])) {
		    $user_name_required = "1";
		 }
		else
		{
			$user_name_required = '0';
		}
		
		if (isset($_POST['user_email'])) {
		    $user_email = "1";
		 }
		else
		{
			$user_email = '0';
		}
		
	    if (isset($_POST['user_email_required'])) {
		    $user_email_required = "1";
		 }
		else
		{
			$user_email_required = '0';
		}
		
	    if (isset($_POST['user_phone'])) {
		    $user_phone = "1";
		 }
		else
		{
			$user_phone = '0';
		}
		
	   if (isset($_POST['user_phone_required'])) {
		    $user_phone_required = "1";
		 }
		else
		{
			$user_phone_required = '0';
		}
		
	    if (isset($_POST['user_address'])) {
		    $user_address = "1";
		 }
		else
		{
			$user_address = '0';
		}
		
	    if (isset($_POST['user_address_required'])) {
		    $user_address_required = "1";
		 }
		else
		{
			$user_address_required = '0';
		}
		
	    if (isset($_POST['user_city'])) {
		    $user_city = "1";
		 }
		else
		{
			$user_city = '0';
		}
		
	   if (isset($_POST['user_city_required'])) {
		    $user_city_required = "1";
		 }
		else
		{
			$user_city_required = '0';
		}
		
	   if (isset($_POST['user_state'])) {
		    $user_state = "1";
		 }
		else
		{
			$user_state = '0';
		}
		 
		if (isset($_POST['user_state_required'])) {
		    $user_state_required = "1";
		 }
		else
		{
			$user_state_required = '0';
		}
		  
		if (isset($_POST['user_zip_code'])) {
		    $user_zip_code = "1";
		 }
		else
		{
			$user_zip_code = '0';
		}
	   
		if (isset($_POST['user_zip_required'])) {
		    $user_zip_required = "1";
		 }
		else
		{
			$user_zip_required = '0';
		}
	  
	  
	  if (isset($_POST['user_notes'])) {
		    $user_notes = "1";
		 }
		else
		{
			$user_notes = '0';
		}
	 
	  if (isset($_POST['user_notes_required'])) {
		    $user_notes_required = "1";
		 }
		else
		{
			$user_notes_required = '0';
		}
 
		$appointment_id= sanitize_text_field( $_POST["appointment_id"]); 
 
	   $wpdb->update($table_name, array('name'=>$user_name, 'name_required'=>$user_name_required, 'email'=>$user_email, 'email_required'=>$user_email_required, 'phone'=>$user_phone, 'phone_required'=>$user_phone_required, 'address'=>$user_address, 'address_required'=>$user_address_required, 'city'=>$user_city, 'city_required'=>$user_city_required, 'state'=>$user_state, 'state_required'=>$user_state_required, 'zip_code'=>$user_zip_code, 'zip_code_required'=>$user_zip_required, 'note'=>$user_notes, 'note_required'=>$user_notes_required), array('appointment_id'=>'1'));
		 
	 	print_r("<p class='greentext' id='message'>Customer Information Updated Successfully</p>");
		
	 
	}
 
 
     if(isset($_POST['notification']))
	{ 
        $table_name = $wpdb->prefix."boffin_coders_appointment_data";
		$admin_boffin_coders_appointment_booked= sanitize_text_field( $_POST["admin_boffin_coders_appointment_booked"]); 
		$customer_boffin_coders_appointment_booked= sanitize_text_field( $_POST["customer_boffin_coders_appointment_booked"]); 
		$admin_appointment_canceled= sanitize_text_field( $_POST["admin_appointment_canceled"]); 
		$customer_appointment_canceled= sanitize_text_field( $_POST["customer_appointment_canceled"]); 
 
		$appointment_id= sanitize_text_field( $_POST["appointment_id"]); 
 
	    $wpdb->update($table_name, array('booked_apointment_email_admin'=>$admin_boffin_coders_appointment_booked, 'booked_apointment_email_customer'=>$customer_boffin_coders_appointment_booked, 'canceled_apointment_email_admin'=>$admin_appointment_canceled, 'canceled_apointment_email_customer'=>$customer_appointment_canceled), array('appointment_id'=>'1'));
		
		print_r("<p class='greentext' id='message' >Appointment Updated Successfully</p>");
	} 

 
      global $wpdb;
	  $table_name2 = $wpdb->prefix."boffin_coders_appointment_data";
	  $table_name3 = $wpdb->prefix."boffin_coders_appointment_user_information";
	  $table_name4 = $wpdb->prefix."boffin_coders_appointment_availability";
	  $table_name5 = $wpdb->prefix."boffin_coders_appointment_styles";
	 ?>
   
	 <!-- Create a header in the default WordPress 'wrap' container -->
     <div class="wrap">
        <div id="icon-themes" class="icon32"></div>
        <h2>Appointment Options</h2>
        <p> <b>ShortCode</b> : <span class="shortcode_code">[boffin_appointment_calendar]</span></p>
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = sanitize_text_field($_GET[ 'tab' ]);
            }  
			
		 $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field($_GET[ 'tab' ]) : 'basics';
		 $default_row = $wpdb->get_row( "SELECT * FROM $table_name2 WHERE appointment_id='1'");
		 $default_row3 = $wpdb->get_row( "SELECT * FROM $table_name3 WHERE appointment_id='1'");
		 $default_row4 = $wpdb->get_row( "SELECT * FROM $table_name4 WHERE appointment_id='1'");
		 $default_row5 = $wpdb->get_row( "SELECT * FROM $table_name5 WHERE id='1'");
         ?>
         
          <h2 class="nav-tab-wrapper">
            <a href="?page=appointment-basics&tab=basics" class="nav-tab <?php esc_html_e($active_tab == 'basics' ? 'nav-tab-active' : ''); ?>">Basics</a>
            <a href="?page=appointment-basics&tab=availability" class="nav-tab <?php esc_html_e($active_tab == 'availability' ? 'nav-tab-active' : ''); ?>">Availability</a>
 
			<a href="?page=appointment-basics&tab=customer-information" class="nav-tab <?php esc_html_e($active_tab == 'customer-information' ? 'nav-tab-active' : ''); ?>">Customer Information</a>
			
			<a href="?page=appointment-basics&tab=notifications" class="nav-tab <?php esc_html_e($active_tab == 'notifications' ? 'nav-tab-active' : ''); ?>">Notifications</a>
			
			 <a href="?page=appointment-basics&tab=styles" class="nav-tab <?php esc_html_e($active_tab == 'styles' ? 'nav-tab-active' : ''); ?>">Styles</a>
		  
          </h2>
  
  
  
    <!-- Basic Tab -->	   
	 <?php
	 if($active_tab == "basics") { ?>
      <form method="post" action="?page=appointment-basics&tab=basics" class="formall">
	   <b class="appointment-info">
          The basics for this type of appointment
          </b>
    <table class="form-table appointment-boffin" role="presentation" id="basic-changes">
	 <tbody> 
	  <tr>
		    <th><label for="name_base">Name</label></th>
		    <td> <input name="appoint_name" id="name_base" type="text" value="<?php  esc_html_e($default_row->name); ?>" class="regular-text code" placeholder="Consultation Phone Call" required></td>
	  </tr>
	  
	  
	  <tr>
		<th><label for="name_base">Time Interval between Appointments</label></th>
		  <td>  
			<select name="duration" id="duration" >
	           <option value="10" <?php if($default_row->duration == '10') { ?> Selected <?php } ?>> 10 minutes </option>
				<option value="15" <?php if($default_row->duration == '15') { ?> Selected <?php } ?>> 15 minutes </option>
				<option value="30" <?php if($default_row->duration == '30') { ?> Selected <?php } ?>> 30 minutes </option>
				<option value="1" <?php if($default_row->duration == '1') { ?> Selected <?php } ?>> 1 Hour</option>
				<option value="2"<?php if($default_row->duration == '2') { ?> Selected <?php } ?>> 2 Hours </option>
			</select>
			After Change This , You have to Update Availability Section Also
		</td>
	  </tr>
	     
	  <tr>
	    <th><label for="instructions">Booking Success Message</label></th>
		 <td> <textarea name="success" id="instructions" rows="4" cols="50" class="regular-text code"placeholder="Thank you, Your Appointment is fixed" ><?php esc_html_e($default_row->success_message); ?></textarea>
		 </td>
	  </tr>
	  
	  <tr>
	    <th><label for="instructions">Booking Failed Message</label></th>
		 <td> <textarea name="failed" id="instructions" rows="4" cols="50" class="regular-text code"placeholder="Sorry, Please try Again" ><?php esc_html_e($default_row->failed_message); ?></textarea>
		 </td>
	  </tr>
 
          <tr>
		    <th><label> <input type="hidden" value="<?php esc_html_e($appoint_id); ?>" name="appointment_id"/>  </label></th>
			<td> <input type="submit" class="button button-primary" name="basic_info"/></td>
	      </tr>
	     </tbody>
		</table>
      </form>
		  <?php
           }
          ?>
       
   
	  <?php
	   if($active_tab == "availability") { ?>
      <?php
	 
	       // for 10 minutes
		  if($default_row->duration == '10') {
	       $timearray = array('9:00', '9:10', '9:20', '9:30','9:40', '9:50', '10:00', '10:10', '10:20', '10:30','10:40', '10:50', '11:00', '11:10', '11:20', '11:30','11:40', '11:50', '12:00', '12:10', '12:20', '12:30','12:40', '12:50', '13:00', '13:10', '13:20', '13:30','13:40', '13:50', '14:00', '14:10', '14:20', '14:30','14:40', '14:50', '15:00', '15:10', '15:20', '15:30','15:40', '15:50', '16:00', '16:10', '16:20', '16:30','16:40', '16:50', '17:00', '17:10', '17:20', '17:30','17:40', '17:50', '18:00', '18:10', '18:20', '18:30','18:40', '18:50', '19:00', '19:10', '19:20', '19:30','19:40', '19:50', '20:00', '20:10', '20:20', '20:30','20:40', '20:50', );
		  }
 
	      // for 15 minutes
		  if($default_row->duration == '15') {
	       $timearray = array('9:00', '9:15', '9:30', '9:45', '10:00','10:15','10:30', '10:45', '11:00', '11:15','11:30', '11:45', '12:00', '12:15', '12:30', '12:55', '13:00', '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45', '15:00','15:15','15:30', '15:45', '16:00', '16:15', '16:30', '16:45', '17:00', '17:15', '17:30', '17:45', '18:00', '18:15', '18:30', '18:45', '19:00', '19:15', '19:30', '19:45', '20:00', '20:15', '20:30', '20:45', '21:00', '21:15', '21:30', '21:45', '22:00', '22:15', '22:30', '22:45');
		  }
	  
	  
	     // for 1/2 hour
		  if($default_row->duration == '30') {
	       $timearray = array('9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30','15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30');
		  }
		  
         // for 1 hour
		 if($default_row->duration == '1') {
		   $timearray = array('9:00','10:00','11:00', '12:00','13:00', '14:00','15:00', '16:00', '17:00', '18:00', '19:00');
		  }
		  
		  // for 2 hours
		 if($default_row->duration == '2') {
		    $timearray = array('9:00','11:00','13:00','15:00','17:00', '19:00', '21:00', '23:00', '01:00', '03:00', '05:00', '07:00');
		  }
		  
		  
	   $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	  ?>
 
      <form method="post" action="?page=appointment-basics&tab=availability" class="formall full-width-table">
	  
	  <table class="form-table appointment-boffin unique-table" role="presentation">
	  <tr> 
	  <th>
	  
	  </th>
	   <?php foreach($timearray as $timevalue){ ?>
			        <th> <span class="time-name"> <?php esc_html_e($timevalue); ?></span> 			    
  
			        </th>
	       <?php } ?>
	    </tr>
	  
	       <?php foreach($days as $daysvalue) { ?>	
		 <tr>
			   <th>
			      <span class="days-name"><?php  esc_html_e($daysvalue); ?></span>
			    </th>
			       <?php foreach($timearray as $timevalue){ ?>
			        <th>  	
					 
			           <input name="timeslots[]" type="checkbox" class="mew" value="<?php esc_html_e($daysvalue.'slot'.$timevalue); ?>"  <?php if (str_contains($default_row4->json_data, $daysvalue.'slot'.$timevalue)) { ?> checked ="checked" <?php } ?>/>
 
			        </th>
	      <?php } ?>	   
	     </tr>
			
		 <?php  
		 } 
		 
		 ?>	
	    </table>
		
        <table class="form-table appointment-boffin" role="presentation">
          <tr>
		    <th><label> <input type="hidden" value="<?php esc_html_e($appoint_id); ?>" name="appointment_id"/>  </label> 
			  <input type="submit" class="button button-primary" name="availability_submit"/></td>
	      </tr>
	    </table>
		
	   
	  	<script>
		  jQuery(".mew").on("mouseover", function () {
			this.checked = ! this.checked;
		  });
	   </script>
 
       </form>
		  <?php
           }
          ?>
 
	  <!-- Capacity Tab -->	   
	  <?php
	   if($active_tab == "styles") { ?>
      <form method="post" action="?page=appointment-basics&tab=styles" class="formall stylepart">
       <table class="form-table appointment-boffin" role="presentation" id="style-section-tb">
	    <tbody>
         <b class="appointment-info">
         Calendar Section : 
          </b>		 
		  <tr>
		    <th><label for="capacity">Calendar Background Color</label></th>
		    <td> <input name="background_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->background_color); ?>" class="regular-text"  required="required"></td>
	      </tr>
		  
		  <tr>
		    <th><label for="capacity">Months Names Color</label></th>
		    <td> <input name="months_name" id="capacity" type="color" value="<?php esc_html_e($default_row5->months_name); ?>" class="regular-text"  required></td>
	      </tr>
   
		  <tr>
		    <th><label for="capacity">Dates Color</label></th>
		    <td> <input name="dates_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->dates_color); ?>" class="regular-text"  required></td>
	      </tr>
		  
		  <tr>
		    <th><label for="capacity">Year Color</label></th>
		    <td> <input name="year_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->year_color); ?>" class="regular-text"  required></td>
	      </tr>
   
        <tr>
		    <th><b class="appointment-info">
           Popup Section Settings: 
          </b>	</th>
		    <td> </td>
	      </tr>
         
		 <tr>
		    <th><label for="capacity">Popup Header-Footer Backgound Color</label></th>
		    <td> <input name="popup_backgound_border_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->popup_backgound_border_color); ?>" class="regular-text"  required></td>
	      </tr>
  
         <tr>
		    <th><label for="capacity">Submit Button Color</label></th>
		    <td> <input name="submit_button_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->submit_button_color); ?>" class="regular-text"  required></td>
	      </tr>
  
         <tr>
		    <th><label for="capacity">Time slots Text Color</label></th>
		    <td> <input name="timeslot_text_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->timeslot_text_color); ?>" class="regular-text"  required></td>
	      </tr>
  
         <tr>
		    <th><label for="capacity">Time slots Background Color</label></th>
		    <td> <input name="timeslot_background_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->timeslot_background_color); ?>" class="regular-text"  required></td>
	      </tr>
		  
         <tr>
		    <th><label for="capacity">Booked Time slots Text Color</label></th>
		    <td> <input name="timeslot_booked_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->timeslot_booked_color); ?>" class="regular-text"  required></td>
	      </tr>
   
         <tr>
		    <th><label for="capacity">Booked Time slots Background Color</label></th>
		    <td> <input name="timeslot_booked_bkg_color" id="capacity" type="color" value="<?php esc_html_e($default_row5->timeslot_booked_bkg_color); ?>" class="regular-text"  required></td>
	      </tr>
		  
         <tr>
		    <th><label for="capacity">Popup Heading Color</label></th>
		    <td> <input name="heading_color_popup" id="capacity" type="color" value="<?php esc_html_e($default_row5->heading_color_popup); ?>" class="regular-text"  required></td>
	      </tr>
		  
         <tr>
		    <th><label for="capacity">Popup text Color</label></th>
		    <td> <input name="text_color_popup" id="capacity" type="color" value="<?php esc_html_e($default_row5->text_color_popup); ?>" class="regular-text"  required></td>
	      </tr>
  
  
          <tr>
		    <th><label> </label></th>
			<td> <input value="Save" type="submit" class="button button-primary" name="capacity_submit"/></td>
	      </tr>
	     </tbody>
		</table>
       </form>
		  <?php
           }
          ?>
		 
		 
		 <!-- Customer Information Tab -->	   
	 <?php
      
	 if($active_tab == "customer-information") { ?>
     <form method="post" action="?page=appointment-basics&tab=customer-information" class="formall">
        <table class="form-table appointment-boffin" role="presentation">
	     <tbody>
          <b class="appointment-info">
            What do you need to know about your customer?
          </b>		 
		 <tr>
		  <th><label for="user_name">Name</label></th>
		  <td>Display &nbsp;<input name="user_name" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->name); ?>" <?php if($default_row3->name == "1") { ?> checked="checked" <?php } ?> style="pointer-events: none; opacity:0.5;">
		  
		 &nbsp; &nbsp; Required &nbsp;<input name="user_name_required" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->name_required); ?>" <?php if($default_row3->name_required == "1") { ?> checked="checked" <?php } ?> style="pointer-events: none; opacity:0.5;"/>
		  </td>
	     </tr>
		 
		 
		 <tr>
		  <th><label for="user_name">Email</label></th>
		  <td>Display &nbsp;<input name="user_email" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->email); ?>" <?php if($default_row3->email == "1") { ?> checked="checked" <?php } ?> style="pointer-events: none; opacity:0.5;">
		  
		 &nbsp; &nbsp; Required &nbsp;<input name="user_email_required" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->email_required); ?>" <?php if($default_row3->email_required == "1") { ?> checked="checked" <?php } ?> style="pointer-events: none; opacity:0.5;"/>
		  </td>
	     </tr>
 
		 <tr>
		  <th><label for="user_name">Phone</label></th>
		  <td>Display &nbsp;<input name="user_phone" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->phone); ?>" <?php if($default_row3->phone == "1") { ?> checked="checked" <?php } ?>>
		  
		 &nbsp; &nbsp; Required &nbsp;<input name="user_phone_required" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->phone_required); ?>" <?php if($default_row3->phone_required == "1") { ?> checked="checked" <?php } ?>/>
		  </td>
	     </tr>
		 
		  <tr>
		  <th><label for="user_name">Address</label></th>
		  <td>Display &nbsp;<input name="user_address" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->address); ?>" <?php if($default_row3->address == "1") { ?> checked="checked" <?php } ?>>
		  
		 &nbsp; &nbsp; Required &nbsp;<input name="user_address_required" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e( $default_row3->address_required); ?>" <?php if($default_row3->address_required == "1") { ?> checked="checked" <?php } ?>/>
		  </td>
	     </tr> 
		 
		 
		  <tr>
		  <th><label for="user_name">City</label></th>
		  <td>Display &nbsp;<input name="user_city" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->city); ?>" <?php if($default_row3->city == "1") { ?> checked="checked" <?php } ?>>
		  
		 &nbsp; &nbsp; Required &nbsp;<input name="user_city_required" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->city_required); ?>" <?php if($default_row3->city_required == "1") { ?> checked="checked" <?php } ?>/>
		  </td>
	     </tr>
         
		 
		  
		  <tr>
		  <th><label for="user_name">State</label></th>
		  <td>Display &nbsp;<input name="user_state" id="user_state" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->state); ?>" <?php if($default_row3->state == "1") { ?> checked="checked" <?php } ?>>
		  
		 &nbsp; &nbsp; Required &nbsp;<input name="user_state_required" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->state_required); ?>" <?php if($default_row3->state_required == "1") { ?> checked="checked" <?php } ?>/>
		  </td>
	     </tr>
 
		  <tr>
		  <th><label for="user_name">Zip Code</label></th>
		  <td>Display &nbsp;<input name="user_zip_code" id="user_zip_code" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->zip_code); ?>" <?php if($default_row3->zip_code == "1") { ?> checked="checked" <?php } ?>>
		  
		 &nbsp; &nbsp; Required &nbsp;<input name="user_zip_required" id="user_name" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->zip_code_required); ?>" <?php if($default_row3->zip_code_required == "1") { ?> checked="checked" <?php } ?>/>
		  </td>
	     </tr>
  
 
		  <tr>
		  <th><label for="user_name">Notes</label></th>
		  <td>Display &nbsp;<input name="user_notes" id="user_notes" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->note); ?>" <?php if($default_row3->note == "1") { ?> checked="checked" <?php } ?>>
		  
		 &nbsp; &nbsp; Required &nbsp;<input name="user_notes_required" id="user_notes_required" type="checkbox" class="regular-text" value="<?php esc_html_e($default_row3->note_required); ?>" <?php if($default_row3->note_required == "1") { ?> checked="checked" <?php } ?>/>
		  </td>
	     </tr>
 
         <tr>
		    <th><label for="instructions"><input type="hidden" value="<?php esc_html_e($appoint_id); ?>" name="appointment_id"/> </label></th>
			<td> <input type="submit" class="button button-primary" name="user_info"/></td>
	     </tr>
	     </tbody>
	    </table>
      </form>
		  <?php
           }
          ?>
 
	  <?php
	   if($active_tab == "notifications") { ?>
	   
	   <script>
			function boffin_coders_notifyFunction() {
			  var boffin_coders_dots = document.getElementById("boffin_coders_dots");
			  var boffin_coders_moreText = document.getElementById("more");
			  var boffin_coders_btnText = document.getElementById("myBtn");

			  if (boffin_coders_dots.style.display === "none") {
				boffin_coders_dots.style.display = "inline";
			 	boffin_coders_btnText.innerHTML = "Edit"; 
				boffin_coders_moreText.style.display = "none";
			  } else {
				boffin_coders_dots.style.display = "none";
		  	boffin_coders_btnText.innerHTML = "Hide"; 
				boffin_coders_moreText.style.display = "inline";
			  }
			}

			function boffin_coders_notifyFunction2() {
			  var boffin_coders_dots = document.getElementById("boffin_coders_dots2");
			  var boffin_coders_moreText = document.getElementById("more2");
			  var boffin_coders_btnText = document.getElementById("myBtn2");

			  if (boffin_coders_dots.style.display === "none") {
				boffin_coders_dots.style.display = "inline";
			 	boffin_coders_btnText.innerHTML = "Edit"; 
				boffin_coders_moreText.style.display = "none";
			  } else {
				boffin_coders_dots.style.display = "none";
		     	boffin_coders_btnText.innerHTML = "Hide"; 
				boffin_coders_moreText.style.display = "inline";
			  }
			}
			
			function boffin_coders_notifyFunction3() {
			  var boffin_coders_dots = document.getElementById("boffin_coders_dots3");
			  var boffin_coders_moreText = document.getElementById("more3");
			  var boffin_coders_btnText = document.getElementById("myBtn3");

			  if (boffin_coders_dots.style.display === "none") {
				boffin_coders_dots.style.display = "inline";
			 	boffin_coders_btnText.innerHTML = "Edit"; 
				boffin_coders_moreText.style.display = "none";
			  } else {
				boffin_coders_dots.style.display = "none";
		    	boffin_coders_btnText.innerHTML = "Hide"; 
				boffin_coders_moreText.style.display = "inline";
			  }
			}
			
			function boffin_coders_notifyFunction4() {
			  var boffin_coders_dots = document.getElementById("boffin_coders_dots4");
			  var boffin_coders_moreText = document.getElementById("more4");
			  var boffin_coders_btnText = document.getElementById("myBtn4");

			  if (boffin_coders_dots.style.display === "none") {
				boffin_coders_dots.style.display = "inline";
			 	boffin_coders_btnText.innerHTML = "Edit"; 
				boffin_coders_moreText.style.display = "none";
			  } else {
				boffin_coders_dots.style.display = "none";
		  	    boffin_coders_btnText.innerHTML = "Hide"; 
				boffin_coders_moreText.style.display = "inline";
			  }
			}
		</script>
	   
      <form method="post" action="?page=appointment-basics&tab=notifications" class="formall notification" style="width: 88%;">
        <table class="form-table appointment-boffin" role="presentation">
	     <tbody>
          <b class="appointment-info"> Options for sending customer and admin notifications</b>		 
		  <tr>
		    <th><label for="capacity">Email (Admin) Appointment Booked</label></th>
		    <td><a onclick="boffin_coders_notifyFunction()" id="myBtn">Edit</a>

            <p> <span id="dots"> </span>
			 <span id="more" style="display: none;"> 
			  <textarea style="width:84%;" rows="7" cols="100" class="regular-text" name="admin_boffin_coders_appointment_booked"><?php esc_html_e($default_row->booked_apointment_email_admin); ?></textarea>
			 </span>
			</p>
			</td>
	      </tr>
 
 
         <tr>
		    <th><label for="capacity">Email (Customer) Appointment Booked</label></th>
		    <td><a onclick="boffin_coders_notifyFunction2()" id="myBtn2">Edit</a>

            <p> <span id="dots2"> </span>
			 <span id="more2" style="display: none;"> 
			  <textarea style="width:84%;" rows="7" cols="100" class="regular-text" name="customer_boffin_coders_appointment_booked"><?php esc_html_e($default_row->booked_apointment_email_customer); ?></textarea>
			 </span>
			</p>
			</td>
	     </tr>
  
         <tr>
		    <th><label for="capacity">Email (Admin) Appointment Canceled</label></th>
		    <td><a onclick="boffin_coders_notifyFunction3()" id="myBtn3">Edit</a>

            <p> <span id="dots3"> </span>
			  <span id="more3" style="display: none;"> 
			    <textarea style="width:84%;" rows="7" cols="100" class="regular-text" name="admin_appointment_canceled"><?php esc_html_e($default_row->canceled_apointment_email_admin); ?></textarea>
			  </span>
			</p>
			</td>
	     </tr>
 
		  <tr>
		    <th><label for="capacity">Email (Customer) Appointment Canceled</label></th>
		    <td><a onclick="boffin_coders_notifyFunction4()" id="myBtn4">Edit</a>

            <p> <span id="dots4"> </span>
			  <span id="more4" style="display: none;"> 
			    <textarea style="width:84%;" rows="7" cols="100" class="regular-text" name="customer_appointment_canceled"><?php esc_html_e($default_row->canceled_apointment_email_customer); ?></textarea>
			  </span>
			</p>
			</td>
	      </tr>
 
          <tr>
		    <th><label for="instructions"><input type="hidden" value="<?php esc_html_e($appoint_id); ?>" name="appointment_id"/></label></th>
			<td> <input type="submit" class="button button-primary" name="notification"/></td>
	      </tr>
	     </tbody>
		</table>
       </form>
		  <?php
           
          ?>
 
      </div> 
		 <?php } 
         
 
}
 
function boffin_coders_appointment() {
	wp_enqueue_style('style_file' , plugin_dir_url(__FILE__).'style/style.css'); 
	  ?>
	  <br/>
	  <h2 class="nav-tab-wrapper">
         <a href="#" class="nav-tab">Appointment List</a> 
      </h2>
 
     <?php 
	 global $wpdb;
	 $table_name_list = $wpdb->prefix."boffin_coders_appointment_booked";
 
	 $list_appointments = $wpdb->get_results("SELECT * FROM  $table_name_list");
 
      ?>
	   <table class="list-table">
	   <tr>
	    <th>Customer Name</th>
	    <th> Customer Email </th>
	    <th> Appointment Time </th>
	    <th> Appointment Date </th>
	    <th> Address </th>
	  </tr>
	 <?php
 
	 foreach($list_appointments as $default_rows)  { 
	 ?>	
    <tr>	
     <th class="data-th"> 
	 <?php esc_html_e($default_rows->name); ?>
	 </th>	
   
     <th class="data-th">
	 <?php esc_html_e($default_rows->email); ?>
	 </th>	
	 
	 <th class="data-th">
	 <?php esc_html_e($default_rows->date); ?>
	 </th>
	 
	  <th class="data-th">
	 <?php esc_html_e($default_rows->time); ?>
	 </th>
   
     <th class="data-th">
	 Phone: <?php if($default_rows->phone != "undefined") { esc_html_e($default_rows->phone); } ?>
	 <br/>
	 Address: <?php if($default_rows->address != "undefined") { esc_html_e($default_rows->address); }  ?>
	 <br/>
	 City: <?php if($default_rows->city != "undefined") { esc_html_e($default_rows->city); } ?> 
	 <br/>
	 State: <?php if($default_rows->state != "undefined") { esc_html_e($default_rows->state); } ?> 
	 <br/>
	 Zip Code: <?php if($default_rows->zip_code != "undefined") { esc_html_e($default_rows->zip_code); } ?>  
	 <br/> 
	 Note: <?php if($default_rows->notes != "undefined") { esc_html_e($default_rows->notes); } ?>  
	 <br/>
	 </th>
    </tr>	 
      <?php
	    }
	   ?>	
	  </table>
	  <?php
  }
 
 
 function boffin_coders_appointment_id() {
  ?>
 	
<script>
var boffin_coders_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
function boffin_coders_nextDate(dayIndex) {
    var boffin_coders_todays = new Date();
    boffin_coders_todays.setDate(boffin_coders_todays.getDate() + (dayIndex - 1 - boffin_coders_todays.getDay() + 7) % 7 + 1);
    return boffin_coders_todays.getDate();
}

  setInterval(function(){
    jQuery(document).ready(function(){
 	var boffin_coders_today = new Date();
 
    // month
    var boffin_coders_month =  boffin_coders_today.getMonth();	
    boffin_coders_cmonth = boffin_coders_month+1;
    
	//  next sunday
	var boffin_coders_nextsunday = boffin_coders_nextDate(0).toLocaleString();
	if(boffin_coders_nextsunday.length == 1)
	{
		var boffin_coders_nextsunday = "0"+boffin_coders_nextsunday;
	}
	 
    var boffin_coders_dt = new Date(boffin_coders_today);
    boffin_coders_dt.setDate( boffin_coders_dt.getDate() + 7 );
  
   jQuery(".Sun."+boffin_coders_nextsunday+"").click(function(){
   boffin_coders_sun.style.display = "block";
   var boffin_coders_indexval =  jQuery(this).index(".Sun");
   var boffin_coders_className = jQuery('.Sun:eq('+boffin_coders_indexval+')').attr('data-date');
  //  alert(boffin_coders_className);
  var boffin_coders_trimmedString = boffin_coders_className.substring(0, 15);
  jQuery('#dateslected').text(boffin_coders_trimmedString);
  jQuery('#date_slected').text(boffin_coders_trimmedString);
  jQuery('#date_moreslected').text(boffin_coders_trimmedString);
 // jQuery('.plan-details').text(boffin_coders_className);
  
  });
});


jQuery(document).ready(function(){
 var boffin_coders_today = new Date();
    
   
    // month
    var boffin_coders_month =  boffin_coders_today.getMonth();	
    boffin_coders_cmonth = boffin_coders_month+1;
    
	//  next sunday
	var boffin_coders_nextmonday = boffin_coders_nextDate(1).toLocaleString();
	if(boffin_coders_nextmonday.length == 1)
	{
		var boffin_coders_nextmonday = "0"+boffin_coders_nextmonday;
	}
	
    var boffin_coders_dt = new Date(boffin_coders_today);
    boffin_coders_dt.setDate( boffin_coders_dt.getDate() + 7 );
 
   
   jQuery(".Mon."+boffin_coders_nextmonday+"").click(function(){
   boffin_coders_mon.style.display = "block";
   var boffin_coders_indexval =  jQuery(this).index(".Mon");
   var boffin_coders_className = jQuery('.Mon:eq('+boffin_coders_indexval+')').attr('data-date');
  //  alert(boffin_coders_className);
    var boffin_coders_trimmedString = boffin_coders_className.substring(0, 15);
  jQuery('#dateslected2').text(boffin_coders_trimmedString);
  jQuery('#date_slected2').text(boffin_coders_trimmedString);
  jQuery('#date_moreslected2').text(boffin_coders_trimmedString);
 // jQuery('.plan-details').text(boffin_coders_className);
  
  });
});



jQuery(document).ready(function(){
 var boffin_coders_today = new Date();
    
   
    // month
    var boffin_coders_month =  boffin_coders_today.getMonth();	
    boffin_coders_cmonth = boffin_coders_month+1;
    
	//  next sunday
	var boffin_coders_nextmonday = boffin_coders_nextDate(2).toLocaleString();
	 if(boffin_coders_nextmonday.length == 1)
	{
		var boffin_coders_nextmonday = "0"+boffin_coders_nextmonday;
	}
	
    var boffin_coders_dt = new Date(boffin_coders_today);
    boffin_coders_dt.setDate( boffin_coders_dt.getDate() + 7 );
 
   jQuery(".Tue."+boffin_coders_nextmonday+"").click(function(){
   boffin_coders_tue.style.display = "block";
   var boffin_coders_indexval =  jQuery(this).index(".Tue");
   var boffin_coders_className = jQuery('.Tue:eq('+boffin_coders_indexval+')').attr('data-date');
  //  alert(boffin_coders_className);
  var boffin_coders_trimmedString = boffin_coders_className.substring(0, 15);
  jQuery('#dateslected3').text(boffin_coders_trimmedString);
  jQuery('#date_slected3').text(boffin_coders_trimmedString);
  jQuery('#date_moreslected3').text(boffin_coders_trimmedString);
 // jQuery('.plan-details').text(boffin_coders_className);
  
  });
});


jQuery(document).ready(function(){
 var boffin_coders_today = new Date();
    
   
    // month
    var boffin_coders_month =  boffin_coders_today.getMonth();	
    boffin_coders_cmonth = boffin_coders_month+1;
    
	//  next sunday
	var boffin_coders_nextmonday = boffin_coders_nextDate(3).toLocaleString();
	 if(boffin_coders_nextmonday.length == 1)
	{
		var boffin_coders_nextmonday = "0"+boffin_coders_nextmonday;
	}
    var boffin_coders_dt = new Date(boffin_coders_today);
    boffin_coders_dt.setDate( boffin_coders_dt.getDate() + 7 );
 
   
   jQuery(".Wed."+boffin_coders_nextmonday+"").click(function(){
   boffin_coders_wed.style.display = "block";
   var boffin_coders_indexval =  jQuery(this).index(".Wed");
   var boffin_coders_className = jQuery('.Wed:eq('+boffin_coders_indexval+')').attr('data-date');
  //  alert(boffin_coders_className);
   var boffin_coders_trimmedString = boffin_coders_className.substring(0, 15);
  jQuery('#dateslected4').text(boffin_coders_trimmedString);
  jQuery('#date_slected4').text(boffin_coders_trimmedString);
  jQuery('#date_moreslected4').text(boffin_coders_trimmedString);
 // jQuery('.plan-details').text(boffin_coders_className);
  
  });
});



jQuery(document).ready(function(){
 var boffin_coders_today = new Date();
    
   
    // month
    var boffin_coders_month =  boffin_coders_today.getMonth();	
    boffin_coders_cmonth = boffin_coders_month+1;
    
	//  next sunday
	var boffin_coders_nextmonday = boffin_coders_nextDate(4).toLocaleString();
	  if(boffin_coders_nextmonday.length == 1)
	{
		var boffin_coders_nextmonday = "0"+boffin_coders_nextmonday;
	}
    var boffin_coders_dt = new Date(boffin_coders_today);
    boffin_coders_dt.setDate( boffin_coders_dt.getDate() + 7 );
 
   
   jQuery(".Thu."+boffin_coders_nextmonday+"").click(function(){
   boffin_coders_thu.style.display = "block";
   var boffin_coders_indexval =  jQuery(this).index(".Thu");
   var boffin_coders_className = jQuery('.Thu:eq('+boffin_coders_indexval+')').attr('data-date');
   
    var boffin_coders_trimmedString = boffin_coders_className.substring(0, 15);
  //  alert(boffin_coders_className);
  jQuery('#dateslected5').text(boffin_coders_trimmedString);
  jQuery('#date_slected5').text(boffin_coders_trimmedString);
  jQuery('#date_moreslected5').text(boffin_coders_trimmedString);
 // jQuery('.plan-details').text(boffin_coders_className);
  
  });
});


jQuery(document).ready(function(){
 var boffin_coders_today = new Date();
    
   
    // month
    var boffin_coders_month =  boffin_coders_today.getMonth();	
    boffin_coders_cmonth = boffin_coders_month+1;
    
	//  next sunday
	var boffin_coders_nextmonday = boffin_coders_nextDate(5).toLocaleString();
	  if(boffin_coders_nextmonday.length == 1)
	{
		var boffin_coders_nextmonday = "0"+boffin_coders_nextmonday;
	}
    var boffin_coders_dt = new Date(boffin_coders_today);
    boffin_coders_dt.setDate( boffin_coders_dt.getDate() + 7 );
 
   jQuery(".Fri."+boffin_coders_nextmonday+"").click(function(){
   boffin_coders_fri.style.display = "block";
   var boffin_coders_indexval =  jQuery(this).index(".Fri");
   var boffin_coders_className = jQuery('.Fri:eq('+boffin_coders_indexval+')').attr('data-date');
  //  alert(boffin_coders_className);
  var boffin_coders_trimmedString = boffin_coders_className.substring(0, 15);
  jQuery('#dateslected6').text(boffin_coders_trimmedString);
  jQuery('#date_slected6').text(boffin_coders_trimmedString);
  jQuery('#date_moreslected6').text(boffin_coders_trimmedString);
 // jQuery('.plan-details').text(boffin_coders_className);
  
  });
});

jQuery(document).ready(function(){
 var boffin_coders_today = new Date();
    
   
    // month
    var boffin_coders_month =  boffin_coders_today.getMonth();	
    boffin_coders_cmonth = boffin_coders_month+1;
    
	//  next sunday
	var boffin_coders_nextmonday = boffin_coders_nextDate(6).toLocaleString();
	  if(boffin_coders_nextmonday.length == 1)
	{
		var boffin_coders_nextmonday = "0"+boffin_coders_nextmonday;
	}
    var boffin_coders_dt = new Date(boffin_coders_today);
    boffin_coders_dt.setDate( boffin_coders_dt.getDate() + 7 );
 
   jQuery(".Sat."+boffin_coders_nextmonday+"").click(function(){
   boffin_coders_sat.style.display = "block";
   var boffin_coders_indexval =  jQuery(this).index(".Sat");
   var boffin_coders_className = jQuery('.Sat:eq('+boffin_coders_indexval+')').attr('data-date');
 
   var boffin_coders_trimmedString = boffin_coders_className.substring(0, 15);
  //  alert(boffin_coders_className);
  jQuery('#dateslected7').text(boffin_coders_trimmedString);
  jQuery('#date_slected7').text(boffin_coders_trimmedString);
  jQuery('#date_moreslected7').text(boffin_coders_trimmedString);
 // jQuery('.plan-details').text(boffin_coders_className);
  
  });
});
   }, 50);

</script>
	
	
  <?php
  global $wpdb;
  $appoint_id = '1';
  $table_name4 = $wpdb->prefix."boffin_coders_appointment_availability";
  $default_row4 = $wpdb->get_row( "SELECT * FROM $table_name4 WHERE appointment_id='$appoint_id'");
  $allarray = array($default_row4->json_data); 
  $nearr = explode(",",  $default_row4->json_data);
 
  ?>
 
   <div class="calendar" id="calendar-app">
 
   <div class="calendar--view" id="calendar-view">
    <div class="cview__month">
      <span class="cview__month-last" id="calendar-month-last">Apr</span>
      <span class="cview__month-current" id="calendar-month">May</span>
      <span class="cview__month-next" id="calendar-month-next">Jun</span>
    </div>
    <div class="cview__header">Sun</div>
    <div class="cview__header">Mon</div>
    <div class="cview__header">Tue</div>
    <div class="cview__header">Wed</div>
    <div class="cview__header">Thu</div>
    <div class="cview__header">Fri</div>
    <div class="cview__header">Sat</div>
    <div class="calendar--view" id="dates">
    </div>
  </div> 
   <div class="footer">
    <span><span id="footer-date" class="footer__link"> </span></span>    
  </div>
</div>
<style>

</style>
<script>
function boffin_coders_CalendarApp(date) {
  
  if (!(date instanceof Date)) {
    date = new Date();
  }
  
  this.boffin_coders_days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  this.boffin_coders_months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
 
  this.boffin_coders_aptDates = [new Date(2016, 4, 30).toString(),new Date(2016, 4, 1).toString()];
  this.boffin_coders_eles = {
  };
  this.boffin_coders_calDaySelected = null;
  
  this.boffin_coders_calendar = document.getElementById("calendar-app");
  
  this.boffin_coders_calendarView = document.getElementById("dates");
  
  this.boffin_coders_calendarMonthDiv = document.getElementById("calendar-month");
  this.boffin_coders_calendarMonthLastDiv = document.getElementById("calendar-month-last");
  this.boffin_coders_calendarMonthNextDiv = document.getElementById("calendar-month-next");
  
  this.boffin_coders_dayInspirationalQuote = document.getElementById("inspirational-quote");
   
  this.todayIsSpan = document.getElementById("footer-date");
  this.boffin_coders_dayViewEle = document.getElementById("day-view");
  this.boffin_coders_dayViewExitEle = document.getElementById("day-view-exit");
  this.boffin_coders_dayViewDateEle = document.getElementById("day-view-date");
  this.boffin_coders_dayViewDateEleinput = document.getElementById("day-view-date-input");
  this.addDayEventEle = document.getElementById("add-event");
  this.boffin_coders_dayEventsEle = document.getElementById("day-events");
  
  this.boffin_coders_dayEventAddForm = {
    cancelBtn: document.getElementById("add-event-cancel"),
    addBtn: document.getElementById("add-event-save"),
    nameEvent:  document.getElementById("input-add-event-name"),
    startTime:  document.getElementById("input-add-event-start-time"),
    endTime:  document.getElementById("input-add-event-end-time"),
    startAMPM:  document.getElementById("input-add-event-start-ampm"),
    endAMPM:  document.getElementById("input-add-event-end-ampm")
  };
  this.boffin_coders_dayEventsList = document.getElementById("day-events-list");
  this.boffin_coders_dayEventBoxEle = document.getElementById("add-day-event-box");
  
  /* Start the app */
  this.showView(date);
  this.addEventListeners();
  this.todayIsSpan.textContent = "Today is " + this.boffin_coders_months[date.getMonth()] + " " + date.getDate();  
}

boffin_coders_CalendarApp.prototype.addEventListeners = function(){
  
  this.boffin_coders_calendar.addEventListener("click", this.mainCalendarClickClose.bind(this));
  this.todayIsSpan.addEventListener("click", this.showView.bind(this));
  this.boffin_coders_calendarMonthLastDiv.addEventListener("click", this.showNewMonth.bind(this));
  this.boffin_coders_calendarMonthNextDiv.addEventListener("click", this.showNewMonth.bind(this));
  this.boffin_coders_dayViewExitEle.addEventListener("click", this.closeDayWindow.bind(this));
  this.boffin_coders_dayViewDateEle.addEventListener("click", this.showNewMonth.bind(this));
  this.addDayEventEle.addEventListener("click", this.addNewEventBox.bind(this));
  this.boffin_coders_dayEventAddForm.cancelBtn.addEventListener("click", this.closeNewEventBox.bind(this));
  this.boffin_coders_dayEventAddForm.cancelBtn.addEventListener("keyup", this.closeNewEventBox.bind(this));
  
  this.boffin_coders_dayEventAddForm.startTime.addEventListener("keyup",this.inputChangeLimiter.bind(this));
  this.boffin_coders_dayEventAddForm.startAMPM.addEventListener("keyup",this.inputChangeLimiter.bind(this));
  this.boffin_coders_dayEventAddForm.endTime.addEventListener("keyup",this.inputChangeLimiter.bind(this));
  this.boffin_coders_dayEventAddForm.endAMPM.addEventListener("keyup",this.inputChangeLimiter.bind(this));
  this.boffin_coders_dayEventAddForm.addBtn.addEventListener("click",this.saveAddNewEvent.bind(this));

};


boffin_coders_CalendarApp.prototype.showView = function(date){
  if ( !date || (!(date instanceof Date)) ) date = new Date();
  var now = new Date(date),
      y = now.getFullYear(),
      m = now.getMonth();
  var today = new Date();
  
  var lastDayOfM = new Date(y, m + 1, 0).getDate();
  var startingD = new Date(y, m, 1).getDay();
  var lastM = new Date(y, now.getMonth()-1, 1);
  var nextM = new Date(y, now.getMonth()+1, 1);
 
  this.boffin_coders_calendarMonthDiv.classList.remove("cview__month-activate");
  this.boffin_coders_calendarMonthDiv.classList.add("cview__month-reset");
  
  while(this.boffin_coders_calendarView.firstChild) {
    this.boffin_coders_calendarView.removeChild(this.boffin_coders_calendarView.firstChild);
  }
  
  // build up spacers
  for ( var x = 0; x < startingD; x++ ) {
    var spacer = document.createElement("div");
    spacer.className = "cview--spacer";
    this.boffin_coders_calendarView.appendChild(spacer);
  }
  
  for ( var z = 1; z <= lastDayOfM; z++ ) {
   
    var _date = new Date(y, m ,z);
    var day = document.createElement("div");
    day.className = "cview--date " + _date;
    day.textContent = z;
    day.setAttribute("data-date", _date);
   // day.onclick = this.showDay.bind(this);
	 
    // check if todays date
    if ( z == today.getDate() && y == today.getFullYear() && m == today.getMonth() ) {
      day.classList.add("today");
    }
    
     // check if has events to show
    if ( this.boffin_coders_aptDates.indexOf(_date.toString()) !== -1 ) {
      day.classList.add("has-events");
    }
    
    this.boffin_coders_calendarView.appendChild(day);
  }
  
  var _that = this;
  setTimeout(function(){
    _that.calendarMonthDiv.classList.add("cview__month-activate");
  }, 50);
  
  this.boffin_coders_calendarMonthDiv.textContent = this.boffin_coders_months[now.getMonth()] + " " + now.getFullYear();
  this.boffin_coders_calendarMonthDiv.setAttribute("data-date", now);

  
  this.boffin_coders_calendarMonthLastDiv.textContent = "← " + this.boffin_coders_months[lastM.getMonth()];
  this.boffin_coders_calendarMonthLastDiv.setAttribute("data-date", lastM);
  
  this.boffin_coders_calendarMonthNextDiv.textContent = this.boffin_coders_months[nextM.getMonth()] + " →";
  this.boffin_coders_calendarMonthNextDiv.setAttribute("data-date", nextM);
  
}
boffin_coders_CalendarApp.prototype.showDay = function(e, dayEle) {
  e.stopPropagation();
  if ( !dayEle ) {
    dayEle = e.currentTarget;
  }
  var dayDate = new Date(dayEle.getAttribute('data-date'));
  
  this.boffin_coders_calDaySelected = dayEle;
  
  this.openDayWindow(dayDate);
 
};
boffin_coders_CalendarApp.prototype.openDayWindow = function(date){
  
  var now = new Date();
  var day = new Date(date);
  this.boffin_coders_dayViewDateEle.textContent = this.boffin_coders_days[day.getDay()] + ", " + this.boffin_coders_months[day.getMonth()] + " " + day.getDate() + ", " + day.getFullYear();
  this.boffin_coders_dayViewDateEle.setAttribute('data-date', day);
  this.boffin_coders_dayViewDateEle.setAttribute('value', this.boffin_coders_days[day.getDay()]);
  this.boffin_coders_dayViewDateEleinput.setAttribute('data-date', day);
  this.boffin_coders_dayViewDateEleinput.setAttribute('value', this.boffin_coders_days[day.getDay()]);
  this.boffin_coders_dayViewEle.classList.add("calendar--day-view-active");
  
  againcall();
  
  /* Contextual lang changes based on tense. Also show btn for scheduling future events */
  var _dayTopbarText = '';
  if ( day < new Date(now.getFullYear(), now.getMonth(), now.getDate())) {
    _dayTopbarText = "had ";
    this.addDayEventEle.style.display = "none";
  } else {
     _dayTopbarText = "have ";
     this.addDayEventEle.style.display = "inline";
  }
  this.addDayEventEle.setAttribute("data-date", day);
  
  var eventsToday = this.showEventsByDay(day);
  if ( !eventsToday ) {
    _dayTopbarText += "no ";
    var _rand = Math.round(Math.random() * ((this.quotes.length - 1 ) - 0) + 0);
    this.boffin_coders_dayInspirationalQuote.textContent = this.quotes[_rand];
  } else {
    _dayTopbarText += eventsToday.length + " ";
    this.boffin_coders_dayInspirationalQuote.textContent = null;
  }
  //this.boffin_coders_dayEventsList.innerHTML = this.showEventsCreateHTMLView(eventsToday);
  while(this.boffin_coders_dayEventsList.firstChild) {
    this.boffin_coders_dayEventsList.removeChild(this.boffin_coders_dayEventsList.firstChild);
  }
  
  this.boffin_coders_dayEventsList.appendChild(this.showEventsCreateElesView(eventsToday));
  
  
  this.boffin_coders_dayEventsEle.textContent = _dayTopbarText + "events on " + this.boffin_coders_months[day.getMonth()] + " " + day.getDate() + ", " + day.getFullYear();
  
  
};
 
  
boffin_coders_CalendarApp.prototype.closeDayWindow = function(){
  this.boffin_coders_dayViewEle.classList.remove("calendar--day-view-active");
  this.closeNewEventBox();
};


boffin_coders_CalendarApp.prototype.mainCalendarClickClose = function(e){
  if ( e.currentTarget != e.target ) {
    return;
  }
  
  this.boffin_coders_dayViewEle.classList.remove("calendar--day-view-active");
  this.closeNewEventBox();
 
};


boffin_coders_CalendarApp.prototype.addNewEventBox = function(e){
  var target = e.currentTarget;
  this.boffin_coders_dayEventBoxEle.setAttribute("data-active", "true"); 
  this.boffin_coders_dayEventBoxEle.setAttribute("data-date", target.getAttribute("data-date"));
  
};
boffin_coders_CalendarApp.prototype.closeNewEventBox = function(e){
  
  if (e && e.keyCode && e.keyCode != 13) return false;
  
  this.boffin_coders_dayEventBoxEle.setAttribute("data-active", "false");
  // reset values
  this.resetAddEventBox();
  
};
boffin_coders_CalendarApp.prototype.saveAddNewEvent = function() {
  var saveErrors = this.validateAddEventInput();
  if ( !saveErrors ) {
    this.addEvent();
  }
};

boffin_coders_CalendarApp.prototype.addEvent = function() {
  
  var boffin_coders_name = this.boffin_coders_dayEventAddForm.nameEvent.value.trim();
  var dayOfDate = this.boffin_coders_dayEventBoxEle.getAttribute("data-date");
  var dateObjectDay =  new Date(dayOfDate);
  var cleanDates = this.cleanEventTimeStampDates();
  
  this.apts.push({
    name: name,
    day: dateObjectDay,
    startTime: cleanDates[0],
    endTime: cleanDates[1]
  });
  this.closeNewEventBox();
  this.openDayWindow(dayOfDate);
  this.boffin_coders_calDaySelected.classList.add("has-events");
  // add to dates
  if ( this.boffin_coders_aptDates.indexOf(dateObjectDay.toString()) === -1 ) {
    this.boffin_coders_aptDates.push(dateObjectDay.toString());
  }
  
};
boffin_coders_CalendarApp.prototype.convertTo23HourTime = function(stringOfTime, AMPM) {
  // convert to 0 - 23 hour time
  var mins = stringOfTime.split(":");
  var hours = stringOfTime.trim();
  if ( mins[1] && mins[1].trim() ) {
    hours = parseInt(mins[0].trim());
    mins = parseInt(mins[1].trim());
  } else {
    hours = parseInt(hours);
    mins = 0;
  }
  hours = ( AMPM == 'am' ) ? ( (hours == 12) ? 0 : hours ) : (hours <= 11) ? parseInt(hours) + 12 : hours;
  return [hours, mins];
};
boffin_coders_CalendarApp.prototype.cleanEventTimeStampDates = function() {
  
  var startTime = this.boffin_coders_dayEventAddForm.startTime.value.trim() || this.boffin_coders_dayEventAddForm.startTime.getAttribute("placeholder") || '8';
  var startAMPM = this.boffin_coders_dayEventAddForm.startAMPM.value.trim() || this.boffin_coders_dayEventAddForm.startAMPM.getAttribute("placeholder") || 'am';
  startAMPM = (startAMPM == 'a') ? startAMPM + 'm' : startAMPM;
  var endTime = this.boffin_coders_dayEventAddForm.endTime.value.trim() || this.boffin_coders_dayEventAddForm.endTime.getAttribute("placeholder") || '9';
  var endAMPM = this.boffin_coders_dayEventAddForm.endAMPM.value.trim() || this.boffin_coders_dayEventAddForm.endAMPM.getAttribute("placeholder") || 'pm';
  endAMPM = (endAMPM == 'p') ? endAMPM + 'm' : endAMPM;
  var date = this.boffin_coders_dayEventBoxEle.getAttribute("data-date");
  
  var startingTimeStamps = this.convertTo23HourTime(startTime, startAMPM);
  var endingTimeStamps = this.convertTo23HourTime(endTime, endAMPM);
  
  var dateOfEvent = new Date(date);
  var startDate = new Date(dateOfEvent.getFullYear(), dateOfEvent.getMonth(), dateOfEvent.getDate(), startingTimeStamps[0], startingTimeStamps[1]);
  var endDate = new Date(dateOfEvent.getFullYear(), dateOfEvent.getMonth(), dateOfEvent.getDate(), endingTimeStamps[0], endingTimeStamps[1]);
  
  // if end date is less than start date - set end date back another day
  if ( startDate > endDate ) endDate.setDate(endDate.getDate() + 1);
  
  return [startDate, endDate];
  
};
boffin_coders_CalendarApp.prototype.validateAddEventInput = function() {

  var _errors = false;
  var boffin_coders_name = this.boffin_coders_dayEventAddForm.nameEvent.value.trim();
  var startTime = this.boffin_coders_dayEventAddForm.startTime.value.trim();
  var startAMPM = this.boffin_coders_dayEventAddForm.startAMPM.value.trim();
  var endTime = this.boffin_coders_dayEventAddForm.endTime.value.trim();
  var endAMPM = this.boffin_coders_dayEventAddForm.endAMPM.value.trim();
  
  if (!name || name == null) {
    _errors = true;
    this.boffin_coders_dayEventAddForm.nameEvent.classList.add("add-event-edit--error");
    this.boffin_coders_dayEventAddForm.nameEvent.focus();
  } else {
     this.boffin_coders_dayEventAddForm.nameEvent.classList.remove("add-event-edit--error");
  }
 
  return _errors;
  
  
};
var timeOut = null;
var activeEle = null;
 
boffin_coders_CalendarApp.prototype.showNewMonth = function(e){
  var date = e.currentTarget.dataset.date;
  var newMonthDate = new Date(date);
  this.showView(newMonthDate);
  this.closeDayWindow();
  return true;
};

var calendar = new boffin_coders_CalendarApp();
console.log(calendar);
</script>

  
 <div id="mysun" class="sun">
  <?php global $wpdb;
  $appoint_id = '1';
  $table_name4 = $wpdb->prefix."boffin_coders_appointment_availability";
  $table_booked = $wpdb->prefix."boffin_coders_appointment_user_information";
  $default_row4 = $wpdb->get_row( "SELECT * FROM $table_name4 WHERE appointment_id='$appoint_id'");
  $default_booked = $wpdb->get_row( "SELECT * FROM $table_booked WHERE appointment_id='$appoint_id'");
  
  ?>
  <div class="sun-content">
       <div class="sun-header">
       <span class="closesun">&times;</span>
       <h3 id="dateslected"></h3>
      </div>
    <div class="sun-body">
  
	<form name="ContactForm" method="post" id="ContactForm">
	   <textarea style="display:none;" type="hidden" name="date_slected" id="date_slected"/> </textarea> 
	   <div class="container-appointment">
	    <div class="plans-appointment">
	     <?php  $slots = $default_row4->json_data; 
		 $slots = str_replace('["',"", $slots);
		 $slots = str_replace('"]',"", $slots);
		 $array = explode('","', $slots); 
		 
		 $table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
		 $allbook = array();
		 $default_rowbooked = $wpdb->get_results("SELECT * FROM $table_namebooked");
		 foreach($default_rowbooked as $bookedvalues)
		 {
			 $allbook[] = $bookedvalues->date;
			 $allbook[] = $bookedvalues->time;
		 }
		 
		 $nextsunday = date('D M d Y', strtotime('next sunday'));
		 
		 ?>
	  
		<?php  foreach($array as $slotsvalues)
		 {
			 if (str_contains($slotsvalues, 'Sunday')) {

			
			  $thisarea = "<div id='date_moreslected'> </div>";
			  $slotsvaluestrimed = str_replace('slot'," ", $slotsvalues);
			  $slotsvaluestrimed = str_replace('Sunday',"", $slotsvaluestrimed);
			  ?>
			  
			 <?php
			 
			  if (in_array( $slotsvalues, $allbook) && in_array( $nextsunday, $allbook))
			  {
			 ?>		 
			  <label class="plan" for="<?php esc_html_e($slotsvalues); ?>">
				<input type="radio" id="<?php esc_html_e($slotsvalues); ?>" name="plan" required="required" value="<?php esc_html_e($slotsvalues); ?>" disabled="disabled" />
				<div class="plan-content disabledslot">
				<div class="plan-details">
			   <span><?php esc_html_e($slotsvaluestrimed); ?></span>
			 </div>
			 </div>
			</label>
			<?php
			
			  }
			  else
			  {		  
			 ?>
			  <label class="plan" for="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
				<input type="radio" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>" name="plan" required="required" value="<?php esc_html_e($slotsvalues); ?>" />
				<div class="plan-content" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
				<div class="plan-details">
			   <span><?php esc_html_e($slotsvaluestrimed); ?></span>
			 </div>
			 </div>
			</label>
			
			 <?php } ?>
	 
			 <?php 
			 }
		 } 
		 ?>
		</div>
	 <br />
 
     <?php if($default_booked->name == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="name" class="fom-text">Name:</label>
	   <input type="text" class="form-control" id="name"/>
	 </div>
	 <?php } ?>
 
 
	<?php if($default_booked->email == "1" && $default_booked->email_required == "1")
	  {  ?>
		<div class="form-group">
		  <label for="email" class="fom-text">Email Address:</label>
		  <input type="email" class="form-control" id="email"/>
		</div>	
	 <?php }

	 
	 else if($default_booked->email == "0")
	 { ?>
		 <div class="form-group" style="display:none;">
	      <label for="email" class="fom-text">Email Address:</label>
	      <input type="email" class="form-control" id="email" value="noemail@gmail.com"/>
	    </div> 
    <?php }
	 else
     { 
	 ?>
 
	 <div class="form-group" style="display:none;">
	  <label for="email" class="fom-text">Email Address:</label>
	  <input type="email" class="form-control" id="email" value="noemail@gmail.com"/>
	 </div>

	 <div class="form-group" style="">
	   <label for="email" class="fom-text">Email Address:</label>
	   <input type="email" class="form-control" id="email"/>
	 </div>
	 <?php } ?>
	 
	 <?php if($default_booked->phone == "1") {  ?> 
	 <div class="form-group" style="">
	   <label for="phone" class="fom-text">Phone:</label>
	   <input type="number" class="form-control" id="phone"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->address == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="address" class="fom-text">Address:</label>
	   <input type="text" class="form-control" id="address"/>
	 </div>
	 <?php } ?>
  
	 <?php if($default_booked->city == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="city" class="fom-text">City:</label>
	   <input type="text" class="form-control" id="city"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->state == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="state" class="fom-text">State:</label>
	   <input type="text" class="form-control" id="state"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->zip_code == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="zip_code" class="fom-text">Zip Code:</label>
	   <input type="text" class="form-control" id="zip_code"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->note == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="note" class="fom-text">Note:</label>
	   <input type="text" class="form-control" id="note"/>
	 </div>
	 <?php } ?>
 
	<button type="submit" class="btn btn-default" >Submit</button>
	</form>

	<div class="message_box" style="margin:10px 0px;">
	</div>
  </div>

<script>
	jQuery(document).ready(function() {
		var boffin_coders_delay = 0;
		jQuery('.btn-default').click(function(e){
			e.preventDefault();
  
				
		if (jQuery('input[name=plan]:checked').length == 0) {		
			jQuery('.message_box').html(
				'<span style="color:red;">Please Select Time slot!</span>'
				);
		 
		}
	

      if(jQuery('#name').val() == '' || jQuery('#name').val() == ' ') 
	 {
		  var boffin_coders_name = "";
     }
	 else 
	 {
		  var boffin_coders_name = jQuery('#name').val();
	 }
	
      if(jQuery('#email').val() == '' || jQuery('#email').val() == ' ') 
	 {
		  var boffin_coders_email = "";
     }
	  else 
	 {
		  var boffin_coders_email = jQuery('#email').val();
	 }
	 
 
	 if(jQuery('#phone').val() == '' || jQuery('#phone').val() == ' ') 
	 {
		 var boffin_coders_phone = "";
     }
	   else 
	 {
		 var boffin_coders_phone = jQuery('#phone').val();
	 }
	 
	 
	   if(jQuery('#address').val() == '' || jQuery('#address').val() == ' ') 
	 {
		 var boffin_coders_address = "";
     }
	   else 
	 {
		 var boffin_coders_address = jQuery('#address').val();
	 }
	 
	
	   if(jQuery('#city').val() == '' || jQuery('#city').val() == ' ') 
	 {
		 var boffin_coders_city = "";
     }
	  else 
	 {
		 var boffin_coders_city = jQuery('#city').val();
	 }
	 
	
	   if(jQuery('#state').val() == '' || jQuery('#state').val() == ' ') 
	 {
		  var boffin_coders_state = "";
     }
	 else 
	 {
		  var boffin_coders_state = jQuery('#state').val();
	 }
	 
	   if(jQuery('#zip_code').val() == '' || jQuery('#zip_code').val() == ' ') 
	 {
		  var boffin_coders_zip_code = "";
     }
	 else 
	 {
		  var boffin_coders_zip_code = jQuery('#zip_code').val();
	 }
	
	   if(jQuery('#note').val() == '' || jQuery('#note').val() == ' ') 
	 {
		  var boffin_coders_note = "";
     }
	  else 
	 {
		  var boffin_coders_note = jQuery('#note').val();
	 }
	 
	  
  	 <?php  if($default_booked->name_required == "1" && $default_booked->name == "1") { ?>  
	    var boffin_coders_name = jQuery('#name').val();
			if(boffin_coders_name == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter Your Name!</span>'
			);
			jQuery('#name').focus();
			return false;
			}
		
	 <?php } ?>	
		
		
		var boffin_coders_email = jQuery('#email').val();
        if(boffin_coders_email == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter Email Address!</span>'
			);
			jQuery('#email').focus();
            return false;
			}
		if( jQuery("#email").val()!='' ){
			if(!boffin_coders_filter.test( jQuery("#email").val() ) ){
			jQuery('.message_box').html(
			'<span style="color:red;">Provided email address is incorrect!</span>'
			);
			jQuery('#email').focus();
			return false;
			}
			}
			
			
			
	 <?php  if($default_booked->phone_required == "1" && $default_booked->phone == "1") { ?>  
 	
           var boffin_coders_phone = jQuery('#phone').val();
			if(boffin_coders_phone == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter phone Number!</span>'
			);
			jQuery('#phone').focus();
			return false;
			}
	 <?php  } ?>
	 
	 
	 	 
	 <?php  if($default_booked->address_required == "1" && $default_booked->address == "1") { ?>  
 	
           var boffin_coders_address = jQuery('#address').val();
			if(boffin_coders_address == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter address!</span>'
			);
			jQuery('#address').focus();
			return false;
			}
	 <?php  } ?>
	 
	 		
	 <?php  if($default_booked->city_required == "1" && $default_booked->city == "1") { ?>  
 	
           var boffin_coders_city = jQuery('#city').val();
			if(boffin_coders_city == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter city!</span>'
			);
			jQuery('#city').focus();
			return false;
			}
	 <?php  } ?>
	  		
	 <?php  if($default_booked->state_required == "1" && $default_booked->state == "1") { ?>  
 	
            var boffin_coders_state = jQuery('#state').val();
			if(boffin_coders_state == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter State!</span>'
			);
			jQuery('#state').focus();
			return false;
			}
	 <?php  } ?>
	   		
	 <?php  if($default_booked->zip_code_required == "1" && $default_booked->zip_code == "1") { ?>  
 	
            var boffin_coders_zip_code = jQuery('#zip_code').val();
			if(boffin_coders_zip_code == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter Zip Code!</span>'
			);
			jQuery('#zip_code').focus();
			return false;
			}
	 <?php  } ?>
	 
	    		
	 <?php  if($default_booked->note_required == "1" && $default_booked->note == "1") { ?>  
 	
            var boffin_coders_note = jQuery('#note').val();
			if(boffin_coders_note == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter Note!</span>'
			);
			jQuery('#notenote').focus();
			return false;
			}
	 <?php  } ?>
	 
  
		var boffin_coders_radiovalue = document.querySelector('input[name="plan"]:checked').value;	
		var boffin_coders_date_slected = jQuery('textarea#date_slected').val();
		
			
		var boffin_coders_message = jQuery('#message').val();
        if(boffin_coders_message == ''){
			jQuery('.message_box').html(
			'<span style="color:red;">Enter Your Message Here!</span>'
			);
			jQuery('#message').focus();
            return false;
			}
  			
			jQuery.ajax
			({
             type: "POST",
             data: "name="+boffin_coders_name+"&email="+boffin_coders_email+"&message="+boffin_coders_message+"&radiovalue="+boffin_coders_radiovalue+"&date_slected="+boffin_coders_date_slected+"&phone="+boffin_coders_phone+"&address="+boffin_coders_address+"&city="+boffin_coders_city+"&state="+boffin_coders_state+"&zip_code="+boffin_coders_zip_code+"&note="+boffin_coders_note,
			 beforeSend: function() {
			 jQuery('.message_box').html(
			 '<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'appointment/img/Loader.gif'; ?>" width="25" height="25"/>'
			 );
			 },		 
             success: function(data)
			 {
				 setTimeout(function() {
                    jQuery('.message_box').html(data);
                }, boffin_coders_delay);
			
             }
			 });
	});
			
});
 
</script>
 
   </div>  
 
	 <div class="sun-footer">
      <h3> </h3>
    </div>
   
  </div>

</div>
</div>

 <div id="mymon" class="mon">
 <!-- mon content -->
  <div class="mon-content">
    <div class="mon-header">
      <span class="closemon">&times;</span>
      <h3 id="dateslected2"></h3>
    </div>
    <div class="mon-body">
 	  
<form name="ContactForm" method="post" action="" id="ContactForm">
<textarea style="display:none;" type="hidden" name="date_slected" id="date_slected2"/> </textarea> 
<div class="container-appointment">
<div class="plans-appointment">
 <?php  $slots = $default_row4->json_data; 
	 $slots = str_replace('["',"", $slots);
	 $slots = str_replace('"]',"", $slots);
	 $array = explode('","', $slots); 

	 $table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
	 $allbook = array();
	 $default_rowbooked = $wpdb->get_results("SELECT * FROM $table_namebooked");
	 foreach($default_rowbooked as $bookedvalues)
	 {
		 $allbook[] = $bookedvalues->date;
		 $allbook[] = $bookedvalues->time;
	 }
	 
     $nextday = date('D M d Y', strtotime('next monday'));
 
	 ?>
  
	<?php  foreach($array as $slotsvalues)
	 {
		 if (str_contains($slotsvalues, 'Monday')) {
 
		  $thisarea = "<div id='date_moreslected'> </div>";
		  $slotsvaluestrimed = str_replace('slot'," ", $slotsvalues);
		    $slotsvaluestrimed = str_replace('Monday',"", $slotsvaluestrimed);
		  ?>
		 
        <?php if (in_array( $slotsvalues, $allbook) && in_array( $nextday, $allbook)) { ?>		 
		 <label class="plan" for="<?php esc_html_e($slotsvalues); ?>">
            <input type="radio" id="<?php esc_html_e($slotsvalues); ?>" name="plan2" required="required" value="<?php esc_html_e($slotsvalues); ?>" disabled="disabled"/>
            <div class="plan-content disabledslot">
            <div class="plan-details">
            <span><?php esc_html_e($slotsvaluestrimed); ?></span>
           </div>
          </div>
         </label>
  	    <?php } else {  ?>
		
		 <label class="plan" for="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <input type="radio" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>" name="plan2" required="required" value="<?php esc_html_e($slotsvalues); ?>" />
            <div class="plan-content" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <div class="plan-details">
            <span><?php esc_html_e($slotsvaluestrimed); ?></span>
           </div>
          </div>
         </label>
		 <?php 
		 }
		 }
	 } 
	 ?>
    </div>
	 <br />
	 
<?php if($default_booked->name == "1") {  ?>	 
<div class="form-group">
<label for="name" class="fom-text">Name:</label>
<input type="text" class="form-control" id="name2">
</div>
<?php } ?>



<?php if($default_booked->email == "1" && $default_booked->email_required == "1")
	  {  ?>
		<div class="form-group">
		  <label for="email2" class="fom-text">Email Address:</label>
		  <input type="email" class="form-control" id="email2"/>
		</div>	
	 <?php }

	 
	 else if($default_booked->email == "0")
	 { ?>
		 <div class="form-group" style="display:none;">
	      <label for="email2" class="fom-text">Email Address:</label>
	      <input type="email" class="form-control" id="email2" value="noemail@gmail.com"/>
	    </div> 
    <?php }
	 else
     { 
	 ?>
 
	 <div class="form-group" style="display:none;">
	  <label for="email2" class="fom-text">Email Address:</label>
	  <input type="email" class="form-control" id="email2" value="noemail@gmail.com"/>
	 </div>

	 <div class="form-group" style="">
	   <label for="email2" class="fom-text">Email Address:</label>
	   <input type="email" class="form-control" id="email2"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->phone == "1") {  ?> 
	 <div class="form-group" style="">
	   <label for="phone2" class="fom-text">Phone:</label>
	   <input type="number" class="form-control" id="phone2"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->address == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="address2" class="fom-text">Address:</label>
	   <input type="text" class="form-control" id="address2"/>
	 </div>
	 <?php } ?>
  
	 <?php if($default_booked->city == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="city2" class="fom-text">City:</label>
	   <input type="text" class="form-control" id="city2"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->state == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="state2" class="fom-text">State:</label>
	   <input type="text" class="form-control" id="state2"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->zip_code == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="zip_code2" class="fom-text">Zip Code:</label>
	   <input type="text" class="form-control" id="zip_code2"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->note == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="note2" class="fom-text">Note:</label>
	   <input type="text" class="form-control" id="note2"/>
	 </div>
	 <?php } ?>
	 
 
<button type="submit" class="btn btn-default" >Submit</button>
</form>

<div class="message_box2" style="margin:10px 0px;">
</div>
 
 
</div>

<script>
jQuery(document).ready(function() {
	var boffin_coders_delay = 0;
	jQuery('.btn-default').click(function(e){
		e.preventDefault();
		
	 if (jQuery('input[name=plan2]:checked').length == 0) {		
			jQuery('.message_box2').html(
				'<span style="color:red;">Please Select Time slot!</span>'
				);
		 
		}
		
		
		
      if(jQuery('#name2').val() == '' || jQuery('#name2').val() == ' ') 
	 {
		  var boffin_coders_name2 = "";
     }
	 else 
	 {
		  var boffin_coders_name2 = jQuery('#name2').val();
	 }
	
      if(jQuery('#email2').val() == '' || jQuery('#email2').val() == ' ') 
	 {
		  var boffin_coders_email2 = "";
     }
	  else 
	 {
		  var boffin_coders_email2 = jQuery('#email2').val();
	 }
	 
 
	 if(jQuery('#phone2').val() == '' || jQuery('#phone2').val() == ' ') 
	 {
		 var boffin_coders_phone2 = "";
     }
	   else 
	 {
		 var boffin_coders_phone2 = jQuery('#phone2').val();
	 }
	 
	 
	   if(jQuery('#address2').val() == '' || jQuery('#address2').val() == ' ') 
	 {
		 var boffin_coders_address2 = "";
     }
	   else 
	 {
		 var boffin_coders_address2 = jQuery('#address2').val();
	 }
	 
	
	   if(jQuery('#city2').val() == '' || jQuery('#city2').val() == ' ') 
	 {
		 var boffin_coders_city2 = "";
     }
	  else 
	 {
		 var boffin_coders_city2 = jQuery('#city2').val();
	 }
	 
	
	   if(jQuery('#state2').val() == '' || jQuery('#state2').val() == ' ') 
	 {
		  var boffin_coders_state2 = "";
     }
	 else 
	 {
		  var boffin_coders_state2 = jQuery('#state2').val();
	 }
	 
	   if(jQuery('#zip_code2').val() == '' || jQuery('#zip_code2').val() == ' ') 
	 {
		  var boffin_coders_zip_code2 = "";
     }
	 else 
	 {
		  var boffin_coders_zip_code2 = jQuery('#zip_code2').val();
	 }
	
	   if(jQuery('#note2').val() == '' || jQuery('#note2').val() == ' ') 
	 {
		  var boffin_coders_note2 = "";
     }
	  else 
	 {
		  var boffin_coders_note2 = jQuery('#note2').val();
	 }
		
 
			 <?php  if($default_booked->name_required == "1" && $default_booked->name == "1") { ?>  
	    var boffin_coders_name2 = jQuery('#name2').val();
			if(boffin_coders_name2 == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter Your Name!</span>'
			);
			jQuery('#name2').focus();
			return false;
			}
		
	 <?php } ?>	
		
		
		var boffin_coders_email2 = jQuery('#email2').val();
        if(boffin_coders_email2 == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter Email Address!</span>'
			);
			jQuery('#email2').focus();
            return false;
			}
		if( jQuery("#email2").val()!='' ){
			if(!boffin_coders_filter.test( jQuery("#email2").val() ) ){
			jQuery('.message_box2').html(
			'<span style="color:red;">Provided email address is incorrect!</span>'
			);
			jQuery('#email2').focus();
			return false;
			}
			}
			
			
			
	 <?php  if($default_booked->phone_required == "1" && $default_booked->phone == "1") { ?>  
 	
           var boffin_coders_phone2 = jQuery('#phone2').val();
			if(boffin_coders_phone2 == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter phone Number!</span>'
			);
			jQuery('#phone2').focus();
			return false;
			}
	 <?php  } ?>
	 
	 
	 	 
	 <?php  if($default_booked->address_required == "1" && $default_booked->address == "1") { ?>  
 	
           var boffin_coders_address2 = jQuery('#address2').val();
			if(boffin_coders_address2 == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter address!</span>'
			);
			jQuery('#address2').focus();
			return false;
			}
	 <?php  } ?>
	 
	 		
	 <?php  if($default_booked->city_required == "1" && $default_booked->city == "1") { ?>  
 	
           var boffin_coders_city2 = jQuery('#city2').val();
			if(boffin_coders_city2 == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter city!</span>'
			);
			jQuery('#city2').focus();
			return false;
			}
	 <?php  } ?>
	  		
	 <?php  if($default_booked->state_required == "1" && $default_booked->state == "1") { ?>  
 	
            var boffin_coders_state2 = jQuery('#state2').val();
			if(boffin_coders_state2 == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter State!</span>'
			);
			jQuery('#state2').focus();
			return false;
			}
	 <?php  } ?>
	   		
	 <?php  if($default_booked->zip_code_required == "1" && $default_booked->zip_code == "1") { ?>  
 	
            var boffin_coders_zip_code2 = jQuery('#zip_code2').val();
			if(boffin_coders_zip_code2 == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter Zip Code!</span>'
			);
			jQuery('#zip_code2').focus();
			return false;
			}
	 <?php  } ?>
	 
	    		
	 <?php  if($default_booked->note_required == "1" && $default_booked->note == "1") { ?>  
 	
            var boffin_coders_note2 = jQuery('#note2').val();
			if(boffin_coders_note2 == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter Note!</span>'
			);
			jQuery('#note2').focus();
			return false;
			}
	 <?php  } ?>
			
		var boffin_coders_radiovalue = document.querySelector('input[name="plan2"]:checked').value;	
		var boffin_coders_date_slected = jQuery('textarea#date_slected2').val();
		
			
		var boffin_coders_message = jQuery('#message').val();
        if(boffin_coders_message == ''){
			jQuery('.message_box2').html(
			'<span style="color:red;">Enter Your Message Here!</span>'
			);
			jQuery('#message').focus();
            return false;
			}
  			
			jQuery.ajax
			({
             type: "POST",
             data: "name="+boffin_coders_name2+"&email="+boffin_coders_email2+"&message="+boffin_coders_message+"&radiovalue="+boffin_coders_radiovalue+"&date_slected="+boffin_coders_date_slected+"&phone="+boffin_coders_phone2+"&address="+boffin_coders_address2+"&city="+boffin_coders_city2+"&state="+boffin_coders_state2+"&zip_code="+boffin_coders_zip_code2+"&note="+boffin_coders_note2,
			 beforeSend: function() {
			 jQuery('.message_box2').html(
			 '<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'appointment/img/Loader.gif'; ?>" width="25" height="25"/>'
			 );
			 },		 
             success: function(data)
			 {
				 setTimeout(function() {
                    jQuery('.message_box2').html(data);
                }, boffin_coders_delay);
			
             }
			 });
	});
			
});
 
</script>
 
   
	  
	  
	  
    </div>
    <div class="mon-footer">
      <h3> </h3>
    </div>
  </div>

</div>

 <div id="mytue" class="tue">
 <!-- tue content -->
  <div class="tue-content">
    <div class="tue-header">
      <span class="closetue">&times;</span>
      <h3 id="dateslected3"></h3>
    </div>
    <div class="tue-body">
 
  <form name="ContactForm" method="post" action="" id="ContactForm">

<textarea style="display:none;" type="hidden" name="date_slected" id="date_slected3"/> </textarea> 
<div class="container-appointment">
 <div class="plans-appointment">
 <?php  $slots = $default_row4->json_data; 
	 $slots = str_replace('["',"", $slots);
	 $slots = str_replace('"]',"", $slots);
	 $array = explode('","', $slots); 
	 
	$table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
	 $allbook = array();
	 $default_rowbooked = $wpdb->get_results("SELECT * FROM $table_namebooked");
	 foreach($default_rowbooked as $bookedvalues)
	 {
		 $allbook[] = $bookedvalues->date;
		 $allbook[] = $bookedvalues->time;
	 }
	 
     $nextday = date('D M d Y', strtotime('next tuesday'));
	 
	 ?>
  
	<?php  foreach($array as $slotsvalues)
	 {
		 if (str_contains($slotsvalues, 'Tuesday')) {
 
		  $thisarea = "<div id='date_moreslected'> </div>";
		  $slotsvaluestrimed = str_replace('slot'," ", $slotsvalues);
		   $slotsvaluestrimed = str_replace('Tuesday',"", $slotsvaluestrimed);
		  ?>
		  
		<?php  if (in_array( $slotsvalues, $allbook) && in_array( $nextday, $allbook)) { ?>  
		 <label class="plan" for="<?php esc_html_e($slotsvalues); ?>">
            <input type="radio" id="<?php esc_html_e($slotsvalues); ?>" name="plan3" required="required" value="<?php esc_html_e($slotsvalues); ?>" disabled="disabled"/>
            <div class="plan-content disabledslot">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
          </div>
         </div>
        </label>
		<?php } else { ?>
		 
		  <label class="plan" for="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <input type="radio" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>" name="plan3" required="required" value="<?php esc_html_e($slotsvalues); ?>" />
            <div class="plan-content" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
          </div>
         </div>
        </label>
		 <?php 
		 }
		 }
	 } 
	 ?>
    </div>
	 <br />


 
<?php if($default_booked->name == "1") {  ?>	 
<div class="form-group">
<label for="name3" class="fom-text">Name:</label>
<input type="text" class="form-control" id="name3">
</div>
<?php } ?>
 

<?php if($default_booked->email == "1" && $default_booked->email_required == "1")
	  {  ?>
		<div class="form-group">
		  <label for="email3" class="fom-text">Email Address:</label>
		  <input type="email" class="form-control" id="email3"/>
		</div>	
	 <?php }

	 
	 else if($default_booked->email == "0")
	 { ?>
		 <div class="form-group" style="display:none;">
	      <label for="email3" class="fom-text">Email Address:</label>
	      <input type="email" class="form-control" id="email3" value="noemail@gmail.com"/>
	    </div> 
    <?php }
	 else
     { 
	 ?>
 
	 <div class="form-group" style="display:none;">
	  <label for="email3" class="fom-text">Email Address:</label>
	  <input type="email" class="form-control" id="email3" value="noemail@gmail.com"/>
	 </div>

	 <div class="form-group" style="">
	   <label for="email3" class="fom-text">Email Address:</label>
	   <input type="email" class="form-control" id="email3"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->phone == "1") {  ?> 
	 <div class="form-group" style="">
	   <label for="phone3" class="fom-text">Phone:</label>
	   <input type="number" class="form-control" id="phone3"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->address == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="address3" class="fom-text">Address:</label>
	   <input type="text" class="form-control" id="address3"/>
	 </div>
	 <?php } ?>
  
	 <?php if($default_booked->city == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="city3" class="fom-text">City:</label>
	   <input type="text" class="form-control" id="city3"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->state == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="state3" class="fom-text">State:</label>
	   <input type="text" class="form-control" id="state3"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->zip_code == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="zip_code3" class="fom-text">Zip Code:</label>
	   <input type="text" class="form-control" id="zip_code3"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->note == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="note3" class="fom-text">Note:</label>
	   <input type="text" class="form-control" id="note3"/>
	 </div>
	 <?php } ?>
	 
 
<button type="submit" class="btn btn-default" >Submit</button>
</form>

<div class="message_box3" style="margin:10px 0px;">
</div>
 
 
</div>

<script>
jQuery(document).ready(function() {
	var boffin_coders_delay = 0;
	jQuery('.btn-default').click(function(e){
		e.preventDefault();
		
		
		 if (jQuery('input[name=plan3]:checked').length == 0) {		
			 jQuery('.message_box3').html(
			   '<span style="color:red;">Please Select Time slot!</span>'
				);
		 
		}
 
		
      if(jQuery('#name3').val() == '' || jQuery('#name3').val() == ' ') 
	 {
		  var boffin_coders_name3 = "";
     }
	 else 
	 {
		  var boffin_coders_name3 = jQuery('#name3').val();
	 }
	
      if(jQuery('#email3').val() == '' || jQuery('#email3').val() == ' ') 
	 {
		  var boffin_coders_email3 = "";
     }
	  else 
	 {
		  var boffin_coders_email3 = jQuery('#email3').val();
	 }
	 
 
	 if(jQuery('#phone3').val() == '' || jQuery('#phone3').val() == ' ') 
	 {
		 var boffin_coders_phone3 = "";
     }
	   else 
	 {
		 var boffin_coders_phone3 = jQuery('#phone3').val();
	 }
	 
	 
	   if(jQuery('#address3').val() == '' || jQuery('#address3').val() == ' ') 
	 {
		 var boffin_coders_address3 = "";
     }
	   else 
	 {
		 var boffin_coders_address3 = jQuery('#address3').val();
	 }
	 
	
	   if(jQuery('#city3').val() == '' || jQuery('#city3').val() == ' ') 
	 {
		 var boffin_coders_city3 = "";
     }
	  else 
	 {
		 var boffin_coders_city3 = jQuery('#city3').val();
	 }
	 
	
	   if(jQuery('#state3').val() == '' || jQuery('#state3').val() == ' ') 
	 {
		  var boffin_coders_state3 = "";
     }
	 else 
	 {
		  var boffin_coders_state3 = jQuery('#state3').val();
	 }
	 
	   if(jQuery('#zip_code3').val() == '' || jQuery('#zip_code3').val() == ' ') 
	 {
		  var boffin_coders_zip_code3 = "";
     }
	 else 
	 {
		  var boffin_coders_zip_code3 = jQuery('#zip_code3').val();
	 }
	
	   if(jQuery('#note3').val() == '' || jQuery('#note3').val() == ' ') 
	 {
		  var boffin_coders_note3 = "";
     }
	  else 
	 {
		  var boffin_coders_note3 = jQuery('#note3').val();
	 }
		
	 
			
		 <?php  if($default_booked->name_required == "1" && $default_booked->name == "1") { ?>  
	    var boffin_coders_name3 = jQuery('#name3').val();
			if(boffin_coders_name3 == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter Your Name!</span>'
			);
			jQuery('#name3').focus();
			return false;
			}
		
	 <?php } ?>	
		
		
		var boffin_coders_email3 = jQuery('#email3').val();
        if(boffin_coders_email3 == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter Email Address!</span>'
			);
			jQuery('#email3').focus();
            return false;
			}
		if( jQuery("#email3").val()!='' ){
			if(!boffin_coders_filter.test( jQuery("#email3").val() ) ){
			jQuery('.message_box3').html(
			'<span style="color:red;">Provided email address is incorrect!</span>'
			);
			jQuery('#email3').focus();
			return false;
			}
			}
			
			
			
	 <?php  if($default_booked->phone_required == "1" && $default_booked->phone == "1") { ?>  
 	
           var boffin_coders_phone3 = jQuery('#phone3').val();
			if(boffin_coders_phone3 == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter phone Number!</span>'
			);
			jQuery('#phone3').focus();
			return false;
			}
	 <?php  } ?>
	 
	 
	 	 
	 <?php  if($default_booked->address_required == "1" && $default_booked->address == "1") { ?>  
 	
           var boffin_coders_address3 = jQuery('#address3').val();
			if(boffin_coders_address3 == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter address!</span>'
			);
			jQuery('#address3').focus();
			return false;
			}
	 <?php  } ?>
	 
	 		
	 <?php  if($default_booked->city_required == "1" && $default_booked->city == "1") { ?>  
 	
           var boffin_coders_city3 = jQuery('#city3').val();
			if(boffin_coders_city3 == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter city!</span>'
			);
			jQuery('#city3').focus();
			return false;
			}
	 <?php  } ?>
	  		
	 <?php  if($default_booked->state_required == "1" && $default_booked->state == "1") { ?>  
 	
            var boffin_coders_state3 = jQuery('#state3').val();
			if(boffin_coders_state3 == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter State!</span>'
			);
			jQuery('#state3').focus();
			return false;
			}
	 <?php  } ?>
	   		
	 <?php  if($default_booked->zip_code_required == "1" && $default_booked->zip_code == "1") { ?>  
 	
            var boffin_coders_zip_code3 = jQuery('#zip_code3').val();
			if(boffin_coders_zip_code3 == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter Zip Code!</span>'
			);
			jQuery('#zip_code3').focus();
			return false;
			}
	 <?php  } ?>
	 
	    		
	 <?php  if($default_booked->note_required == "1" && $default_booked->note == "1") { ?>  
 	
            var boffin_coders_note3 = jQuery('#note3').val();
			if(boffin_coders_note3 == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter Note!</span>'
			);
			jQuery('#note3').focus();
			return false;
			}
	 <?php  } ?>
		
		
		
		var boffin_coders_radiovalue = document.querySelector('input[name="plan3"]:checked').value;	
		var boffin_coders_date_slected = jQuery('textarea#date_slected3').val();
		
			
		var boffin_coders_message = jQuery('#message').val();
        if(boffin_coders_message == ''){
			jQuery('.message_box3').html(
			'<span style="color:red;">Enter Your Message Here!</span>'
			);
			jQuery('#message').focus();
            return false;
			}
  			
			jQuery.ajax
			({
             type: "POST",
             data: "name="+boffin_coders_name3+"&email="+boffin_coders_email3+"&message="+boffin_coders_message+"&radiovalue="+boffin_coders_radiovalue+"&date_slected="+boffin_coders_date_slected+"&phone="+boffin_coders_phone3+"&address="+boffin_coders_address3+"&city="+boffin_coders_city3+"&state="+boffin_coders_state3+"&zip_code="+boffin_coders_zip_code3+"&note="+boffin_coders_note3,
			 beforeSend: function() {
			 jQuery('.message_box3').html(
			 '<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'appointment/img/Loader.gif'; ?>" width="25" height="25"/>'
			 );
			 },		 
             success: function(data)
			 {
				 setTimeout(function() {
                    jQuery('.message_box3').html(data);
                }, boffin_coders_delay);
			
             }
			 });
	});
			
});
 
</script>
  
    </div>
    <div class="tue-footer">
      <h3> </h3>
    </div>
  </div>

</div>

 <div id="mywed" class="wed">
  <div class="wed-content">
    <div class="wed-header">
      <span class="closewed">&times;</span>
      <h3 id="dateslected4">wed Header</h3>
    </div>
    <div class="wed-body">
    
	  <form name="ContactForm" method="post" action="" id="ContactForm">
<textarea style="display:none;" type="hidden" name="date_slected" id="date_slected4"/> </textarea> 
<div class="container-appointment">
 <div class="plans-appointment">
 <?php  $slots = $default_row4->json_data; 
	 $slots = str_replace('["',"", $slots);
	 $slots = str_replace('"]',"", $slots);
	 $array = explode('","', $slots); 
	 
 
	 $table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
	 $allbook = array();
	 $default_rowbooked = $wpdb->get_results("SELECT * FROM $table_namebooked");
	 foreach($default_rowbooked as $bookedvalues)
	 {
		 $allbook[] = $bookedvalues->date;
		 $allbook[] = $bookedvalues->time;
	 }
	 
     $nextday = date('D M d Y', strtotime('next wednesday'));
	 
	 ?>
  
	<?php  foreach($array as $slotsvalues)
	 {
		 if (str_contains($slotsvalues, 'Wednesday')) {
 
		  $thisarea = "<div id='date_moreslected'> </div>";
		  $slotsvaluestrimed = str_replace('slot'," ", $slotsvalues);
		  $slotsvaluestrimed = str_replace('Wednesday',"", $slotsvaluestrimed);
		  ?>
		  
		<?php  if (in_array( $slotsvalues, $allbook) && in_array( $nextday, $allbook)) { ?>  
		    <label class="plan" for="<?php esc_html_e($slotsvalues); ?>">
            <input type="radio" id="<?php esc_html_e($slotsvalues); ?>" name="plan4" required="required" value="<?php esc_html_e($slotsvalues); ?>" disabled="disabled"/>
            <div class="plan-content disabledslot">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
         </div>
         </div>
        </label>
		<?php } else { ?>
          <label class="plan" for="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <input type="radio" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>" name="plan4" required="required" value="<?php esc_html_e($slotsvalues); ?>" />
            <div class="plan-content" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
         </div>
         </div>
        </label>
        <?php } ?>
          
		 <?php 
		 }
	 } 
	 ?>
    </div>
	 <br />


 
<?php if($default_booked->name == "1") {  ?>	 
<div class="form-group">
<label for="name4" class="fom-text">Name:</label>
<input type="text" class="form-control" id="name4">
</div>
<?php } ?>
 

<?php if($default_booked->email == "1" && $default_booked->email_required == "1")
	  {  ?>
		<div class="form-group">
		  <label for="email4" class="fom-text">Email Address:</label>
		  <input type="email" class="form-control" id="email4"/>
		</div>	
	 <?php }

	 
	 else if($default_booked->email == "0")
	 { ?>
		 <div class="form-group" style="display:none;">
	      <label for="email4" class="fom-text">Email Address:</label>
	      <input type="email" class="form-control" id="email4" value="noemail@gmail.com"/>
	    </div> 
    <?php }
	 else
     { 
	 ?>
 
	 <div class="form-group" style="display:none;">
	  <label for="email4" class="fom-text">Email Address:</label>
	  <input type="email" class="form-control" id="email4" value="noemail@gmail.com"/>
	 </div>

	 <div class="form-group" style="">
	   <label for="email4" class="fom-text">Email Address:</label>
	   <input type="email" class="form-control" id="email4"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->phone == "1") {  ?> 
	 <div class="form-group" style="">
	   <label for="phone4" class="fom-text">Phone:</label>
	   <input type="number" class="form-control" id="phone4"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->address == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="address4" class="fom-text">Address:</label>
	   <input type="text" class="form-control" id="address4"/>
	 </div>
	 <?php } ?>
  
	 <?php if($default_booked->city == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="city4" class="fom-text">City:</label>
	   <input type="text" class="form-control" id="city4"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->state == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="state4" class="fom-text">State:</label>
	   <input type="text" class="form-control" id="state4"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->zip_code == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="zip_code4" class="fom-text">Zip Code:</label>
	   <input type="text" class="form-control" id="zip_code4"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->note == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="note4" class="fom-text">Note:</label>
	   <input type="text" class="form-control" id="note4"/>
	 </div>
	 <?php } ?>

 
<button type="submit" class="btn btn-default" >Submit</button>
</form>

<div class="message_box4" style="margin:10px 0px;">
</div>
 
 
</div>

<script>
jQuery(document).ready(function() {
	var boffin_coders_delay = 0;
	jQuery('.btn-default').click(function(e){
		e.preventDefault();
		
			 if (jQuery('input[name=plan4]:checked').length == 0) {		
			jQuery('.message_box4').html(
				'<span style="color:red;">Please Select Time slot!</span>'
				);
		 
		}
 
			
			
		
      if(jQuery('#name4').val() == '' || jQuery('#name4').val() == ' ') 
	 {
		  var boffin_coders_name4 = "";
     }
	 else 
	 {
		  var boffin_coders_name4 = jQuery('#name4').val();
	 }
	
      if(jQuery('#email4').val() == '' || jQuery('#email4').val() == ' ') 
	 {
		  var boffin_coders_email4 = "";
     }
	  else 
	 {
		  var boffin_coders_email4 = jQuery('#email4').val();
	 }
	 
 
	 if(jQuery('#phone4').val() == '' || jQuery('#phone4').val() == ' ') 
	 {
		 var boffin_coders_phone4 = "";
     }
	   else 
	 {
		 var boffin_coders_phone4 = jQuery('#phone4').val();
	 }
	 
	 
	   if(jQuery('#address4').val() == '' || jQuery('#address4').val() == ' ') 
	 {
		 var boffin_coders_address4 = "";
     }
	   else 
	 {
		 var boffin_coders_address4 = jQuery('#address4').val();
	 }
	 
	
	   if(jQuery('#city4').val() == '' || jQuery('#city4').val() == ' ') 
	 {
		 var boffin_coders_city4 = "";
     }
	  else 
	 {
		 var boffin_coders_city4 = jQuery('#city4').val();
	 }
	 
	
	   if(jQuery('#state4').val() == '' || jQuery('#state4').val() == ' ') 
	 {
		  var boffin_coders_state4 = "";
     }
	 else 
	 {
		  var boffin_coders_state4 = jQuery('#state4').val();
	 }
	 
	   if(jQuery('#zip_code4').val() == '' || jQuery('#zip_code4').val() == ' ') 
	 {
		  var boffin_coders_zip_code4 = "";
     }
	 else 
	 {
		  var boffin_coders_zip_code4 = jQuery('#zip_code4').val();
	 }
	
	   if(jQuery('#note4').val() == '' || jQuery('#note4').val() == ' ') 
	 {
		  var boffin_coders_note4 = "";
     }
	  else 
	 {
		  var boffin_coders_note4 = jQuery('#note4').val();
	 }
		
	 
			
		 <?php  if($default_booked->name_required == "1" && $default_booked->name == "1") { ?>  
	    var boffin_coders_name4 = jQuery('#name4').val();
			if(name4 == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter Your Name!</span>'
			);
			jQuery('#name4').focus();
			return false;
			}
		
	 <?php } ?>	
		
		
		var boffin_coders_email4 = jQuery('#email4').val();
        if(boffin_coders_email4 == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter Email Address!</span>'
			);
			jQuery('#email4').focus();
            return false;
			}
		if( jQuery("#email4").val()!='' ){
			if(!boffin_coders_filter.test( jQuery("#email4").val() ) ){
			jQuery('.message_box4').html(
			'<span style="color:red;">Provided email address is incorrect!</span>'
			);
			jQuery('#email4').focus();
			return false;
			}
			}
			
			
			
	 <?php  if($default_booked->phone_required == "1" && $default_booked->phone == "1") { ?>  
 	
           var boffin_coders_phone4 = jQuery('#phone4').val();
			if(boffin_coders_phone4 == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter phone Number!</span>'
			);
			jQuery('#phone4').focus();
			return false;
			}
	 <?php  } ?>
	 
	 
	 	 
	 <?php  if($default_booked->address_required == "1" && $default_booked->address == "1") { ?>  
 	
           var boffin_coders_address4 = jQuery('#address4').val();
			if(boffin_coders_address4 == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter address!</span>'
			);
			jQuery('#address4').focus();
			return false;
			}
	 <?php  } ?>
	 
	 		
	 <?php  if($default_booked->city_required == "1" && $default_booked->city == "1") { ?>  
 	
           var boffin_coders_city4 = jQuery('#city4').val();
			if(boffin_coders_city4 == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter city!</span>'
			);
			jQuery('#city4').focus();
			return false;
			}
	 <?php  } ?>
	  		
	 <?php  if($default_booked->state_required == "1" && $default_booked->state == "1") { ?>  
 	
            var boffin_coders_state4 = jQuery('#state4').val();
			if(boffin_coders_state4 == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter State!</span>'
			);
			jQuery('#state4').focus();
			return false;
			}
	 <?php  } ?>
	   		
	 <?php  if($default_booked->zip_code_required == "1" && $default_booked->zip_code == "1") { ?>  
 	
            var boffin_coders_zip_code4 = jQuery('#zip_code4').val();
			if(boffin_coders_zip_code4 == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter Zip Code!</span>'
			);
			jQuery('#zip_code4').focus();
			return false;
			}
	 <?php  } ?>
	 
	    		
	 <?php  if($default_booked->note_required == "1" && $default_booked->note == "1") { ?>  
 	
            var boffin_coders_note4 = jQuery('#note4').val();
			if(boffin_coders_note4 == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter Note!</span>'
			);
			jQuery('#note4').focus();
			return false;
			}
	 <?php  } ?>
		
			
			
		var boffin_coders_radiovalue = document.querySelector('input[name="plan4"]:checked').value;	
		var boffin_coders_date_slected = jQuery('textarea#date_slected4').val();
		
			
		var boffin_coders_message = jQuery('#message').val();
        if(boffin_coders_message == ''){
			jQuery('.message_box4').html(
			'<span style="color:red;">Enter Your Message Here!</span>'
			);
			jQuery('#message').focus();
            return false;
			}
  			
			jQuery.ajax
			({
             type: "POST",
             data: "name="+boffin_coders_name4+"&email="+boffin_coders_email4+"&message="+boffin_coders_message+"&radiovalue="+boffin_coders_radiovalue+"&date_slected="+boffin_coders_date_slected+"&phone="+boffin_coders_phone4+"&address="+boffin_coders_address4+"&city="+boffin_coders_city4+"&state="+boffin_coders_state4+"&zip_code="+boffin_coders_zip_code4+"&note="+boffin_coders_note4,
			 beforeSend: function() {
			 jQuery('.message_box4').html(
			 '<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'appointment/img/Loader.gif'; ?>" width="25" height="25"/>'
			 );
			 },		 
             success: function(data)
			 {
				 setTimeout(function() {
                    jQuery('.message_box4').html(data);
                }, boffin_coders_delay);
			
             }
			 });
	});
			
});
  
</script>
 
    </div>
    <div class="wed-footer">
      <h3> </h3>
    </div>
  </div>
</div>

 <div id="mythu" class="thu">
  <div class="thu-content">
    <div class="thu-header">
      <span class="closethu">&times;</span>
      <h3 id="dateslected5"></h3>
    </div>
    <div class="thu-body">
       
 <form name="ContactForm" method="post" action="" id="ContactForm">
<textarea style="display:none;" type="hidden" name="date_slected" id="date_slected5"/> </textarea> 
<div class="container-appointment">
 <div class="plans-appointment">
 <?php  $slots = $default_row4->json_data; 
	 $slots = str_replace('["',"", $slots);
	 $slots = str_replace('"]',"", $slots);
	 $array = explode('","', $slots); 
 
	 $table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
	 $allbook = array();
	 $default_rowbooked = $wpdb->get_results("SELECT * FROM $table_namebooked");
	 foreach($default_rowbooked as $bookedvalues)
	 {
		 $allbook[] = $bookedvalues->date;
		 $allbook[] = $bookedvalues->time;
	 }
	 
     $nextday = date('D M d Y', strtotime('next thursday'));
 
	 ?>
  
	<?php  foreach($array as $slotsvalues)
	 {
		 if (str_contains($slotsvalues, 'Thursday')) {
		  $thisarea = "<div id='date_moreslected'> </div>";
		  $slotsvaluestrimed = str_replace('slot'," ", $slotsvalues);
		   $slotsvaluestrimed = str_replace('Thursday',"", $slotsvaluestrimed);
		  ?>
		  
		 <?php if (in_array( $slotsvalues, $allbook) && in_array( $nextday, $allbook)) {  ?> 
		 <label class="plan" for="<?php esc_html_e($slotsvalues); ?>">
           <input type="radio" id="<?php esc_html_e($slotsvalues); ?>" name="plan5" required="required" value="<?php esc_html_e($slotsvalues); ?>" disabled="disabled"/>
             <div class="plan-content disabledslot">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
         </div>
         </div>
        </label>
		 <?php } else { ?>
		<label class="plan" for="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <input type="radio" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>" name="plan5" required="required" value="<?php esc_html_e($slotsvalues); ?>" />
            <div class="plan-content" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
         </div>
         </div>
        </label>
		 <?php } ?>
		 <?php 
		 }
	 } 
	 ?> 
    </div>
	 <br />
 

 
<?php if($default_booked->name == "1") {  ?>	 
<div class="form-group">
<label for="name5" class="fom-text">Name:</label>
<input type="text" class="form-control" id="name5">
</div>
<?php } ?>
 

<?php if($default_booked->email == "1" && $default_booked->email_required == "1")
	  {  ?>
		<div class="form-group">
		  <label for="email5" class="fom-text">Email Address:</label>
		  <input type="email" class="form-control" id="email5"/>
		</div>	
	 <?php }

	 
	 else if($default_booked->email == "0")
	 { ?>
		 <div class="form-group" style="display:none;">
	      <label for="email5" class="fom-text">Email Address:</label>
	      <input type="email" class="form-control" id="email5" value="noemail@gmail.com"/>
	    </div> 
    <?php }
	 else
     { 
	 ?>
 
	 <div class="form-group" style="display:none;">
	  <label for="email5" class="fom-text">Email Address:</label>
	  <input type="email" class="form-control" id="email5" value="noemail@gmail.com"/>
	 </div>

	 <div class="form-group" style="">
	   <label for="email5" class="fom-text">Email Address:</label>
	   <input type="email" class="form-control" id="email5"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->phone == "1") {  ?> 
	 <div class="form-group" style="">
	   <label for="phone5" class="fom-text">Phone:</label>
	   <input type="number" class="form-control" id="phone5"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->address == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="address5" class="fom-text">Address:</label>
	   <input type="text" class="form-control" id="address5"/>
	 </div>
	 <?php } ?>
  
	 <?php if($default_booked->city == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="city5" class="fom-text">City:</label>
	   <input type="text" class="form-control" id="city5"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->state == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="state5" class="fom-text">State:</label>
	   <input type="text" class="form-control" id="state5"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->zip_code == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="zip_code5" class="fom-text">Zip Code:</label>
	   <input type="text" class="form-control" id="zip_code5"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->note == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="note5" class="fom-text">Note:</label>
	   <input type="text" class="form-control" id="note5"/>
	 </div>
	 <?php } ?>
 
 
<button type="submit" class="btn btn-default" >Submit</button>
</form>

<div class="message_box5" style="margin:10px 0px;">
</div>
 
 
</div>

<script>
jQuery(document).ready(function() {
	var boffin_coders_delay = 0;
	jQuery('.btn-default').click(function(e){
		e.preventDefault();
		
	   if (jQuery('input[name=plan5]:checked').length == 0) {		
			jQuery('.message_box5').html(
				'<span style="color:red;">Please Select Time slot!</span>'
				);
		 
		}
		
	 		
		
      if(jQuery('#name5').val() == '' || jQuery('#name5').val() == ' ') 
	 {
		  var boffin_coders_name5 = "";
     }
	 else 
	 {
		  var boffin_coders_name5 = jQuery('#name5').val();
	 }
	
      if(jQuery('#email5').val() == '' || jQuery('#email5').val() == ' ') 
	 {
		  var boffin_coders_email5 = "";
     }
	  else 
	 {
		  var boffin_coders_email5 = jQuery('#email5').val();
	 }
	 
 
	 if(jQuery('#phone5').val() == '' || jQuery('#phone5').val() == ' ') 
	 {
		 var boffin_coders_phone5 = "";
     }
	   else 
	 {
		 var boffin_coders_phone5 = jQuery('#phone5').val();
	 }
	 
	 
	   if(jQuery('#address5').val() == '' || jQuery('#address5').val() == ' ') 
	 {
		 var boffin_coders_address5 = "";
     }
	   else 
	 {
		 var boffin_coders_address5 = jQuery('#address5').val();
	 }
	 
	
	   if(jQuery('#city5').val() == '' || jQuery('#city5').val() == ' ') 
	 {
		 var boffin_coders_city5 = "";
     }
	  else 
	 {
		 var boffin_coders_city5 = jQuery('#city5').val();
	 }
	 
	
	   if(jQuery('#state5').val() == '' || jQuery('#state5').val() == ' ') 
	 {
		  var boffin_coders_state5 = "";
     }
	 else 
	 {
		  var boffin_coders_state5 = jQuery('#state5').val();
	 }
	 
	   if(jQuery('#zip_code5').val() == '' || jQuery('#zip_code5').val() == ' ') 
	 {
		  var boffin_coders_zip_code5 = "";
     }
	 else 
	 {
		  var boffin_coders_zip_code5 = jQuery('#zip_code5').val();
	 }
	
	   if(jQuery('#note5').val() == '' || jQuery('#note5').val() == ' ') 
	 {
		  var boffin_coders_note5 = "";
     }
	  else 
	 {
		  var boffin_coders_note5 = jQuery('#note5').val();
	 }
		
	 
			
		 <?php  if($default_booked->name_required == "1" && $default_booked->name == "1") { ?>  
	    var boffin_coders_name5 = jQuery('#name5').val();
			if(boffin_coders_name5 == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter Your Name!</span>'
			);
			jQuery('#name5').focus();
			return false;
			}
		
	 <?php } ?>	
		
		
		var boffin_coders_email5 = jQuery('#email5').val();
        if(boffin_coders_email5 == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter Email Address!</span>'
			);
			jQuery('#email5').focus();
            return false;
			}
		if( jQuery("#email5").val()!='' ){
           if(!boffin_coders_filter.test( jQuery("#email5").val() ) ){
			jQuery('.message_box5').html(
			'<span style="color:red;">Provided email address is incorrect!</span>'
			);
			jQuery('#email5').focus();
			return false;
			}
			}
			
			
			
	 <?php  if($default_booked->phone_required == "1" && $default_booked->phone == "1") { ?>  
 	
           var boffin_coders_phone5 = jQuery('#phone5').val();
			if(boffin_coders_phone5 == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter phone Number!</span>'
			);
			jQuery('#phone5').focus();
			return false;
			}
	 <?php  } ?>
	 
	 
	 	 
	 <?php  if($default_booked->address_required == "1" && $default_booked->address == "1") { ?>  
 	
           var boffin_coders_address5 = jQuery('#address5').val();
			if(boffin_coders_address5 == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter address!</span>'
			);
			jQuery('#address5').focus();
			return false;
			}
	 <?php  } ?>
	 
	 		
	 <?php  if($default_booked->city_required == "1" && $default_booked->city == "1") { ?>  
 	
           var boffin_coders_city5 = jQuery('#city5').val();
			if(boffin_coders_city5 == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter city!</span>'
			);
			jQuery('#city5').focus();
			return false;
			}
	 <?php  } ?>
	  		
	 <?php  if($default_booked->state_required == "1" && $default_booked->state == "1") { ?>  
 	
            var boffin_coders_state5 = jQuery('#state5').val();
			if(boffin_coders_state5 == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter State!</span>'
			);
			jQuery('#state5').focus();
			return false;
			}
	 <?php  } ?>
	   		
	 <?php  if($default_booked->zip_code_required == "1" && $default_booked->zip_code == "1") { ?>  
 	
            var boffin_coders_zip_code5 = jQuery('#zip_code5').val();
			if(boffin_coders_zip_code5 == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter Zip Code!</span>'
			);
			jQuery('#zip_code5').focus();
			return false;
			}
	 <?php  } ?>
	 
	    		
	 <?php  if($default_booked->note_required == "1" && $default_booked->note == "1") { ?>  
 	
            var boffin_coders_note5 = jQuery('#note5').val();
			if(boffin_coders_note5 == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter Note!</span>'
			);
			jQuery('#note5').focus();
			return false;
			}
	 <?php  } ?>
		
			
			
		var boffin_coders_radiovalue = document.querySelector('input[name="plan5"]:checked').value;	
		var boffin_coders_date_slected = jQuery('textarea#date_slected5').val();
		
			
		var boffin_coders_message = jQuery('#message').val();
        if(boffin_coders_message == ''){
			jQuery('.message_box5').html(
			'<span style="color:red;">Enter Your Message Here!</span>'
			);
			jQuery('#message').focus();
            return false;
			}
  			
			jQuery.ajax
			({
             type: "POST",
             data: "name="+boffin_coders_name5+"&email="+boffin_coders_email5+"&message="+boffin_coders_message+"&radiovalue="+boffin_coders_radiovalue+"&date_slected="+boffin_coders_date_slected+"&phone="+boffin_coders_phone5+"&address="+boffin_coders_address5+"&city="+boffin_coders_city5+"&state="+boffin_coders_state5+"&zip_code="+boffin_coders_zip_code5+"&note="+boffin_coders_note5,
			 beforeSend: function() {
			 jQuery('.message_box5').html(
			 '<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'appointment/img/Loader.gif'; ?>" width="25" height="25"/>'
			 );
			 },		 
             success: function(data)
			 {
				 setTimeout(function() {
                    jQuery('.message_box5').html(data);
                }, boffin_coders_delay);
			
             }
			 });
	});
			
});
  
</script>
 
    </div>
    <div class="thu-footer">
      <h3> </h3>
    </div>
  </div>

</div>

 <div id="myfri" class="fri">
  <div class="fri-content">
    <div class="fri-header">
      <span class="closefri">&times;</span>
      <h3 id="dateslected6"></h3>
    </div>
 <div class="fri-body">
          
 <form name="ContactForm" method="post" action="" id="ContactForm">
<textarea style="display:none;" type="hidden" name="date_slected" id="date_slected6"/> </textarea> 
<div class="container-appointment">
 <div class="plans-appointment">
 <?php  $slots = $default_row4->json_data; 
	 $slots = str_replace('["',"", $slots);
	 $slots = str_replace('"]',"", $slots);
	 $array = explode('","', $slots); 
    
	 $table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
	 $allbook = array();
	 $default_rowbooked = $wpdb->get_results("SELECT * FROM $table_namebooked");
	 foreach($default_rowbooked as $bookedvalues)
	 {
		 $allbook[] = $bookedvalues->date;
		 $allbook[] = $bookedvalues->time;
	 }
	 
     $nextday = date('D M d Y', strtotime('next friday'));
	 
	 ?>
  
	<?php  foreach($array as $slotsvalues)
	 {
		 if (str_contains($slotsvalues, 'Friday')) {
		  $thisarea = "<div id='date_moreslected'> </div>";
		  $slotsvaluestrimed = str_replace('slot'," ", $slotsvalues);
		    $slotsvaluestrimed = str_replace('Friday',"", $slotsvaluestrimed);
		  ?>
		<?php if (in_array( $slotsvalues, $allbook) && in_array( $nextday, $allbook)) { ?>
		<label class="plan" for="<?php esc_html_e($slotsvalues); ?>">
            <input type="radio" id="<?php esc_html_e($slotsvalues); ?>" name="plan6" required="required" value="<?php esc_html_e($slotsvalues); ?>" disabled="disabled" />
            <div class="plan-content disabledslot">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
         </div>
         </div>
        </label>
		<?php } else { ?>
         <label class="plan" for="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <input type="radio" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>" name="plan6" required="required" value="<?php esc_html_e($slotsvalues); ?>" />
            <div class="plan-content" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
         </div>
         </div>
        </label>
		<?php } ?>		
		 <?php 
		 }
	 } 
	 ?>
    </div>
	 <br />
 
  
<?php if($default_booked->name == "1") {  ?>	 
<div class="form-group">
<label for="name6" class="fom-text">Name:</label>
<input type="text" class="form-control" id="name6">
</div>
<?php } ?>
 

<?php if($default_booked->email == "1" && $default_booked->email_required == "1")
	  {  ?>
		<div class="form-group">
		  <label for="email6" class="fom-text">Email Address:</label>
		  <input type="email" class="form-control" id="email6"/>
		</div>	
	 <?php }

	 
	 else if($default_booked->email == "0")
	 { ?>
		 <div class="form-group" style="display:none;">
	      <label for="email6" class="fom-text">Email Address:</label>
	      <input type="email" class="form-control" id="email6" value="noemail@gmail.com"/>
	    </div> 
    <?php }
	 else
     { 
	 ?>
 
	 <div class="form-group" style="display:none;">
	  <label for="email6" class="fom-text">Email Address:</label>
	  <input type="email" class="form-control" id="email6" value="noemail@gmail.com"/>
	 </div>

	 <div class="form-group" style="">
	   <label for="email6" class="fom-text">Email Address:</label>
	   <input type="email" class="form-control" id="email6"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->phone == "1") {  ?> 
	 <div class="form-group" style="">
	   <label for="phone6" class="fom-text">Phone:</label>
	   <input type="number" class="form-control" id="phone6"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->address == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="address6" class="fom-text">Address:</label>
	   <input type="text" class="form-control" id="address6"/>
	 </div>
	 <?php } ?>
  
	 <?php if($default_booked->city == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="city6" class="fom-text">City:</label>
	   <input type="text" class="form-control" id="city6"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->state == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="state6" class="fom-text">State:</label>
	   <input type="text" class="form-control" id="state6"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->zip_code == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="zip_code6" class="fom-text">Zip Code:</label>
	   <input type="text" class="form-control" id="zip_code6"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->note == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="note6" class="fom-text">Note:</label>
	   <input type="text" class="form-control" id="note6"/>
	 </div>
	 <?php } ?>
 
 
<button type="submit" class="btn btn-default" >Submit</button>
</form>

<div class="message_box6" style="margin:10px 0px;">
</div>
 
 
</div>

<script>
jQuery(document).ready(function() {
	var boffin_coders_delay = 0;
	jQuery('.btn-default').click(function(e){
		e.preventDefault();
		
	   if (jQuery('input[name=plan6]:checked').length == 0) {		
			jQuery('.message_box6').html(
				'<span style="color:red;">Please Select Time slot!</span>'
				);
		 
		}
		
		 		
		
      if(jQuery('#name6').val() == '' || jQuery('#name6').val() == ' ') 
	 {
		  var boffin_coders_name6 = "";
     }
	 else 
	 {
		  var boffin_coders_name6 = jQuery('#name6').val();
	 }
	
      if(jQuery('#email6').val() == '' || jQuery('#email6').val() == ' ') 
	 {
		  var boffin_coders_email6 = "";
     }
	  else 
	 {
		  var boffin_coders_email6 = jQuery('#email6').val();
	 }
	 
 
	 if(jQuery('#phone6').val() == '' || jQuery('#phone6').val() == ' ') 
	 {
		 var boffin_coders_phone6 = "";
     }
	   else 
	 {
		 var boffin_coders_phone6 = jQuery('#phone6').val();
	 }
	 
	 
	   if(jQuery('#address6').val() == '' || jQuery('#address6').val() == ' ') 
	 {
		 var boffin_coders_address6 = "";
     }
	   else 
	 {
		 var boffin_coders_address6 = jQuery('#address6').val();
	 }
	 
	
	   if(jQuery('#city6').val() == '' || jQuery('#city6').val() == ' ') 
	 {
		 var boffin_coders_city6 = "";
     }
	  else 
	 {
		 var boffin_coders_city6 = jQuery('#city6').val();
	 }
	 
	
	   if(jQuery('#state6').val() == '' || jQuery('#state6').val() == ' ') 
	 {
		  var boffin_coders_state6 = "";
     }
	 else 
	 {
		  var boffin_coders_state6 = jQuery('#state6').val();
	 }
	 
	   if(jQuery('#zip_code6').val() == '' || jQuery('#zip_code6').val() == ' ') 
	 {
		  var boffin_coders_zip_code6 = "";
     }
	 else 
	 {
		  var boffin_coders_zip_code6 = jQuery('#zip_code6').val();
	 }
	
	   if(jQuery('#note6').val() == '' || jQuery('#note6').val() == ' ') 
	 {
		  var boffin_coders_zip_note6 = "";
     }
	  else 
	 {
		  var boffin_coders_zip_note6 = jQuery('#note6').val();
	 }
		
	 
			
		 <?php  if($default_booked->name_required == "1" && $default_booked->name == "1") { ?>  
	    var boffin_coders_name6 = jQuery('#name6').val();
			if(boffin_coders_name6 == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter Your Name!</span>'
			);
			jQuery('#name6').focus();
			return false;
			}
		
	 <?php } ?>	
		
		
		var boffin_coders_email6 = jQuery('#email6').val();
        if(boffin_coders_email6 == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter Email Address!</span>'
			);
			jQuery('#email6').focus();
            return false;
			}
		if( jQuery("#email6").val()!='' ){
		   if(!boffin_coders_filter.test( jQuery("#email6").val() ) ){
			jQuery('.message_box6').html(
			'<span style="color:red;">Provided email address is incorrect!</span>'
			);
			jQuery('#email6').focus();
			return false;
			}
			}
			
			
			
	 <?php  if($default_booked->phone_required == "1" && $default_booked->phone == "1") { ?>  
 	
           var boffin_coders_phone6 = jQuery('#phone6').val();
			if(boffin_coders_phone6 == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter phone Number!</span>'
			);
			jQuery('#phone6').focus();
			return false;
			}
	 <?php  } ?>
	 
	 
	 	 
	 <?php  if($default_booked->address_required == "1" && $default_booked->address == "1") { ?>  
 	
           var boffin_coders_address6 = jQuery('#address6').val();
			if(boffin_coders_address6 == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter address!</span>'
			);
			jQuery('#address6').focus();
			return false;
			}
	 <?php  } ?>
	 
	 		
	 <?php  if($default_booked->city_required == "1" && $default_booked->city == "1") { ?>  
 	
           var boffin_coders_city6 = jQuery('#city6').val();
			if(boffin_coders_city6 == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter city!</span>'
			);
			jQuery('#city6').focus();
			return false;
			}
	 <?php  } ?>
	  		
	 <?php  if($default_booked->state_required == "1" && $default_booked->state == "1") { ?>  
 	
            var boffin_coders_state6 = jQuery('#state6').val();
			if(boffin_coders_state6 == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter State!</span>'
			);
			jQuery('#state6').focus();
			return false;
			}
	 <?php  } ?>
	   		
	 <?php  if($default_booked->zip_code_required == "1" && $default_booked->zip_code == "1") { ?>  
 	
            var boffin_coders_zip_code6 = jQuery('#zip_code6').val();
			if(boffin_coders_zip_code6 == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter Zip Code!</span>'
			);
			jQuery('#zip_code6').focus();
			return false;
			}
	 <?php  } ?>
	 
	    		
	 <?php  if($default_booked->note_required == "1" && $default_booked->note == "1") { ?>  
 	
            var boffin_coders_note6 = jQuery('#note6').val();
			if(boffin_coders_note6 == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter Note!</span>'
			);
			jQuery('#note6').focus();
			return false;
			}
	 <?php  } ?>
		
			
			
			
		var boffin_coders_radiovalue = document.querySelector('input[name="plan6"]:checked').value;	
		var boffin_coders_date_slected = jQuery('textarea#date_slected6').val();
		
			
		var boffin_coders_message = jQuery('#message').val();
        if(boffin_coders_message == ''){
			jQuery('.message_box6').html(
			'<span style="color:red;">Enter Your Message Here!</span>'
			);
			jQuery('#message').focus();
            return false;
			}
  			
			jQuery.ajax
			({
             type: "POST",
             data: "name="+boffin_coders_name6+"&email="+boffin_coders_email6+"&message="+boffin_coders_message+"&radiovalue="+boffin_coders_radiovalue+"&date_slected="+boffin_coders_date_slected+"&phone="+boffin_coders_phone6+"&address="+boffin_coders_address6+"&city="+boffin_coders_city6+"&state="+boffin_coders_state6+"&zip_code="+boffin_coders_zip_code6+"&note="+boffin_coders_note6,
			 beforeSend: function() {
			 jQuery('.message_box6').html(
			 '<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'appointment/img/Loader.gif'; ?>" width="25" height="25"/>'
			 );
			 },		 
             success: function(data)
			 {
				 setTimeout(function() {
                    jQuery('.message_box6').html(data);
                }, boffin_coders_delay);
			
             }
			 });
	});
			
});
  
</script>
	   
	   
    </div>
    <div class="fri-footer">
      <h3> </h3>
    </div>
  </div>

</div>

 <div id="mysat" class="sat">
  <div class="sat-content">
    <div class="sat-header">
      <span class="closesat">&times;</span>
      <h3 id="dateslected7">sat Header</h3>
    </div>
    <div class="sat-body">
  
 <form name="ContactForm" method="post" action="" id="ContactForm">
<div class="dateslected7" id="dateslected7"> </div>
<textarea style="display:none;" type="hidden" name="date_slected" id="date_slected7"/> </textarea> 
<div class="container-appointment">
 <div class="plans-appointment">
 <?php  $slots = $default_row4->json_data; 
	 $slots = str_replace('["',"", $slots);
	 $slots = str_replace('"]',"", $slots);
	 $array = explode('","', $slots); 
	 
	 $table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
	 $default_rowbooked = $wpdb->get_results("SELECT time FROM $table_namebooked");
	 
	 $table_namebooked = $wpdb->prefix."boffin_coders_appointment_booked";
	 $allbook = array();
	 $default_rowbooked = $wpdb->get_results("SELECT * FROM $table_namebooked");
	 foreach($default_rowbooked as $bookedvalues)
	 {
		 $allbook[] = $bookedvalues->date;
		 $allbook[] = $bookedvalues->time;
	 }
	 
     $nextday = date('D M d Y', strtotime('next saturday'));
	 
	 ?>
  
	<?php  foreach($array as $slotsvalues)
	 {
		 if (str_contains($slotsvalues, 'Saturday')) {
		  $thisarea = "<div id='date_moreslected'> </div>";
		  $slotsvaluestrimed = str_replace('slot'," ", $slotsvalues);
		  $slotsvaluestrimed = str_replace('Saturday',"", $slotsvaluestrimed);
		  ?>
		  
		<?php  if (in_array( $slotsvalues, $allbook) && in_array( $nextsunday, $allbook)) { ?>  
		    <label class="plan" for="<?php esc_html_e($slotsvalues); ?>">
            <input type="radio" id="<?php esc_html_e($slotsvalues); ?>" name="plan7" required="required" value="<?php esc_html_e($slotsvalues); ?>" disabled="disabled"/>
            <div class="plan-content disabledslot">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
         </div>
         </div>
        </label>
		<?php } else { ?>
		  <label class="plan" for="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <input type="radio" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>" name="plan7" required="required" value="<?php esc_html_e($slotsvalues); ?>" />
            <div class="plan-content" id="<?php esc_html_e(str_replace(':',"", $slotsvalues)); ?>">
            <div class="plan-details">
           <span><?php esc_html_e($slotsvaluestrimed); ?></span>
         </div>
         </div>
        </label>
		
		<?php } 
		 }
	 } 
	 ?>
    </div>
	 <br />

<?php if($default_booked->name == "1") {  ?>	 
<div class="form-group">
<label for="name7" class="fom-text">Name:</label>
<input type="text" class="form-control" id="name7">
</div>
<?php } ?>
 

<?php if($default_booked->email == "1" && $default_booked->email_required == "1")
	  {  ?>
		<div class="form-group">
		  <label for="email7" class="fom-text">Email Address:</label>
		  <input type="email" class="form-control" id="email7"/>
		</div>	
	 <?php }

	 
	 else if($default_booked->email == "0")
	 { ?>
		 <div class="form-group" style="display:none;">
	      <label for="email7" class="fom-text">Email Address:</label>
	      <input type="email" class="form-control" id="email7" value="noemail@gmail.com"/>
	    </div> 
    <?php }
	 else
     { 
	 ?>
 
	 <div class="form-group" style="display:none;">
	  <label for="email7" class="fom-text">Email Address:</label>
	  <input type="email" class="form-control" id="email7" value="noemail@gmail.com"/>
	 </div>

	 <div class="form-group" style="">
	   <label for="email7" class="fom-text">Email Address:</label>
	   <input type="email" class="form-control" id="email7"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->phone == "1") {  ?> 
	 <div class="form-group" style="">
	   <label for="phone7" class="fom-text">Phone:</label>
	   <input type="number" class="form-control" id="phone7"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->address == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="address7" class="fom-text">Address:</label>
	   <input type="text" class="form-control" id="address7"/>
	 </div>
	 <?php } ?>
  
	 <?php if($default_booked->city == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="city7" class="fom-text">City:</label>
	   <input type="text" class="form-control" id="city7"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->state == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="state7" class="fom-text">State:</label>
	   <input type="text" class="form-control" id="state7"/>
	 </div>
	 <?php } ?>
	 
	 
	 <?php if($default_booked->zip_code == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="zip_code7" class="fom-text">Zip Code:</label>
	   <input type="text" class="form-control" id="zip_code7"/>
	 </div>
	 <?php } ?>
 
	 <?php if($default_booked->note == "1") {  ?>
	 <div class="form-group" style="">
	   <label for="note7" class="fom-text">Note:</label>
	   <input type="text" class="form-control" id="note7"/>
	 </div>
	 <?php } ?>
 
 
 
<button type="submit" class="btn btn-default" >Submit</button>
</form>

<div class="message_box7" style="margin:10px 0px;">
</div>
 
 
</div>

<script>
jQuery(document).ready(function() {
	var boffin_coders_delay = 0;
	jQuery('.btn-default').click(function(e){
		e.preventDefault();
		
		  if (jQuery('input[name=plan7]:checked').length == 0) {		
			jQuery('.message_box7').html(
				'<span style="color:red;">Please Select Time slot!</span>'
				);
		 
		}
		
	 	
      if(jQuery('#name7').val() == '' || jQuery('#name7').val() == ' ') 
	 {
		  var boffin_coders_name7 = "";
     }
	 else 
	 {
		  var boffin_coders_name7 = jQuery('#name7').val();
	 }
	
      if(jQuery('#email7').val() == '' || jQuery('#email7').val() == ' ') 
	 {
		  var boffin_coders_email7 = "";
     }
	  else 
	 {
		  var boffin_coders_email7 = jQuery('#email7').val();
	 }
	 
 
	 if(jQuery('#phone7').val() == '' || jQuery('#phone7').val() == ' ') 
	 {
		 var boffin_coders_phone7 = "";
     }
	   else 
	 {
		 var boffin_coders_phone7 = jQuery('#phone7').val();
	 }
	 
	 
	   if(jQuery('#address7').val() == '' || jQuery('#address7').val() == ' ') 
	 {
		 var boffin_coders_address7 = "";
     }
	   else 
	 {
		 var boffin_coders_address7 = jQuery('#address7').val();
	 }
	 
	
	   if(jQuery('#city7').val() == '' || jQuery('#city7').val() == ' ') 
	 {
		 var boffin_coders_city7 = "";
     }
	  else 
	 {
		 var boffin_coders_city7 = jQuery('#city7').val();
	 }
	 
	
	   if(jQuery('#state7').val() == '' || jQuery('#state7').val() == ' ') 
	 {
		  var boffin_coders_state7 = "";
     }
	 else 
	 {
		  var boffin_coders_state7 = jQuery('#state7').val();
	 }
	 
	   if(jQuery('#zip_code7').val() == '' || jQuery('#zip_code7').val() == ' ') 
	 {
		  var boffin_coders_zip_code7 = "";
     }
	 else 
	 {
		  var boffin_coders_zip_code7 = jQuery('#zip_code7').val();
	 }
	
	   if(jQuery('#note7').val() == '' || jQuery('#note7').val() == ' ') 
	 {
		  var boffin_coders_zip_note7 = "";
     }
	  else 
	 {
		  var boffin_coders_zip_note7 = jQuery('#note7').val();
	 }
		
	 
			
		 <?php  if($default_booked->name_required == "1" && $default_booked->name == "1") { ?>  
	    var boffin_coders_name7 = jQuery('#name7').val();
			if(boffin_coders_name7 == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter Your Name!</span>'
			);
			jQuery('#name7').focus();
			return false;
			}
		
	 <?php } ?>	
		
		
		var boffin_coders_email7 = jQuery('#email7').val();
        if(boffin_coders_email7 == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter Email Address!</span>'
			);
			jQuery('#email7').focus();
            return false;
			}
		if( jQuery("#email7").val()!='' ){
		   if(!boffin_coders_filter.test( jQuery("#email7").val() ) ){
			jQuery('.message_box7').html(
			'<span style="color:red;">Provided email address is incorrect!</span>'
			);
			jQuery('#email7').focus();
			return false;
			}
			}
			
			
			
	 <?php  if($default_booked->phone_required == "1" && $default_booked->phone == "1") { ?>  
 	
           var boffin_coders_phone7 = jQuery('#phone7').val();
			if(boffin_coders_phone7 == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter phone Number!</span>'
			);
			jQuery('#phone7').focus();
			return false;
			}
	 <?php  } ?>
	 
	 
	 	 
	 <?php  if($default_booked->address_required == "1" && $default_booked->address == "1") { ?>  
 	
           var boffin_coders_address7 = jQuery('#address7').val();
			if(boffin_coders_address7 == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter address!</span>'
			);
			jQuery('#address7').focus();
			return false;
			}
	 <?php  } ?>
	 
	 		
	 <?php  if($default_booked->city_required == "1" && $default_booked->city == "1") { ?>  
 	
           var boffin_coders_city7 = jQuery('#city7').val();
			if(boffin_coders_city7 == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter city!</span>'
			);
			jQuery('#city7').focus();
			return false;
			}
	 <?php  } ?>
	  		
	 <?php  if($default_booked->state_required == "1" && $default_booked->state == "1") { ?>  
 	
            var boffin_coders_state7 = jQuery('#state7').val();
			if(boffin_coders_state7 == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter State!</span>'
			);
			jQuery('#state7').focus();
			return false;
			}
	 <?php  } ?>
	   		
	 <?php  if($default_booked->zip_code_required == "1" && $default_booked->zip_code == "1") { ?>  
 	
            var boffin_coders_zip_code7 = jQuery('#zip_code7').val();
			if(boffin_coders_zip_code7 == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter Zip Code!</span>'
			);
			jQuery('#zip_code7').focus();
			return false;
			}
	 <?php  } ?>
	 
	    		
	 <?php  if($default_booked->note_required == "1" && $default_booked->note == "1") { ?>  
 	
            var boffin_coders_note7 = jQuery('#note7').val();
			if(boffin_coders_note7 == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter Note!</span>'
			);
			jQuery('#note7').focus();
			return false;
			}
	 <?php  } ?>
		
			
	
			
		var boffin_coders_radiovalue = document.querySelector('input[name="plan7"]:checked').value;	
		var boffin_coders_date_slected = jQuery('textarea#date_slected7').val();
		
			
		var boffin_coders_message = jQuery('#message').val();
        if(boffin_coders_message == ''){
			jQuery('.message_box7').html(
			'<span style="color:red;">Enter Your Message Here!</span>'
			);
			jQuery('#message').focus();
            return false;
			}
  			
			jQuery.ajax
			({
             type: "POST",
             data: "name="+boffin_coders_name7+"&email="+boffin_coders_email7+"&message="+boffin_coders_message+"&radiovalue="+boffin_coders_radiovalue+"&date_slected="+dboffin_coders_ate_slected+"&phone="+boffin_coders_phone7+"&address="+boffin_coders_address7+"&city="+boffin_coders_city7+"&state="+boffin_coders_state7+"&zip_code="+boffin_coders_zip_code7+"&note="+boffin_coders_note7,
			 beforeSend: function() {
			 jQuery('.message_box7').html(
			 '<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'appointment/img/Loader.gif'; ?>" width="25" height="25"/>'
			 );
			 },		 
             success: function(data)
			 {
				 setTimeout(function() {
                    jQuery('.message_box7').html(data);
                }, boffin_coders_delay);
			
             }
			 });
	});
			
});
 
</script>
   </div>
    <div class="sat-footer">
      <h3> </h3>
    </div>
  </div>

</div>


<script>
// Get the wed
  var boffin_coders_wed = document.getElementById("mywed");
  var boffin_coders_spanwed = document.getElementsByClassName("closewed")[0];

  boffin_coders_spanwed.onclick = function() {
  boffin_coders_wed.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == boffin_coders_wed) {
    boffin_coders_wed.style.display = "none";
  }
}

var boffin_coders_sun = document.getElementById("mysun");
var boffin_coders_spansun = document.getElementsByClassName("closesun")[0];

boffin_coders_spansun.onclick = function() {
  boffin_coders_sun.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == boffin_coders_sun) {
    boffin_coders_sun.style.display = "none";
  }
}


var boffin_coders_mon = document.getElementById("mymon");
var boffin_coders_spanmon = document.getElementsByClassName("closemon")[0];

boffin_coders_spanmon.onclick = function() {
  boffin_coders_mon.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == boffin_coders_mon) {
    boffin_coders_mon.style.display = "none";
  }
}

var boffin_coders_tue = document.getElementById("mytue");
var boffin_coders_spantue = document.getElementsByClassName("closetue")[0];

  boffin_coders_spantue.onclick = function() {
  boffin_coders_tue.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == boffin_coders_tue) {
    boffin_coders_tue.style.display = "none";
  }
}

 
var boffin_coders_thu = document.getElementById("mythu");
var boffin_coders_spanthu = document.getElementsByClassName("closethu")[0];

boffin_coders_spanthu.onclick = function() {
  boffin_coders_thu.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == boffin_coders_thu) {
    boffin_coders_thu.style.display = "none";
  }
}


 
var boffin_coders_fri = document.getElementById("myfri");
var boffin_coders_spanfri = document.getElementsByClassName("closefri")[0];

boffin_coders_spanfri.onclick = function() {
  boffin_coders_fri.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == boffin_coders_fri) {
    boffin_coders_fri.style.display = "none";
  }
}
 
var boffin_coders_sat = document.getElementById("mysat");
var boffin_coders_spansat = document.getElementsByClassName("closesat")[0];

boffin_coders_spansat.onclick = function() {
  boffin_coders_sat.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == boffin_coders_sat) {
    boffin_coders_sat.style.display = "none";
  }
}
 
</script>
   <?php 
     global $wpdb;
	$table_name5 = $wpdb->prefix."boffin_coders_appointment_styles";
	$default_row5 = $wpdb->get_row( "SELECT * FROM $table_name5 WHERE id='1'");
	 
   ?>
<style>
.calendar
{
	background: <?php esc_html_e($default_row5->background_color); ?> !Important;
}

.cview__month-last
{
	color: <?php esc_html_e($default_row5->months_name); ?> !Important;
}

.cview__month-next
{
	color: <?php esc_html_e($default_row5->months_name); ?> !Important;
}
 
.cview--date
{
	color: <?php esc_html_e($default_row5->dates_color); ?> !Important;
}

.cview__month-current
{
	color: <?php esc_html_e($default_row5->year_color); ?> !Important;
}

.sun-header
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;
}

.sun-footer
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;	
}


.mon-header
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;
}

.mon-footer
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;	
}


.tue-header
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;
}

.tue-footer
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;	
}


.wed-header
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;
}

.wed-footer
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;	
}
 

.thu-header
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;
}

.thu-footer
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;	
}


.fri-header
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;
}

.fri-footer
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;	
}

.sat-header
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;
}

.sat-footer
{
 background-color: <?php esc_html_e($default_row5->popup_backgound_border_color); ?> !Important;	
}

#ContactForm button
{
 background-color: <?php esc_html_e($default_row5->submit_button_color); ?> !Important;		
}

.plan-content span
{
	    color: <?php esc_html_e($default_row5->timeslot_text_color); ?> !Important;	
}

.plan-content
{
    background: <?php esc_html_e($default_row5->timeslot_background_color); ?>;
    border: <?php esc_html_e($default_row5->timeslot_background_color); ?>;
}

.disabledslot span
{
	  color: <?php esc_html_e($default_row5->timeslot_booked_color); ?> !Important;	
}

.disabledslot
{
	 background: <?php esc_html_e($default_row5->timeslot_booked_bkg_color); ?> !Important;
    border: <?php esc_html_e($default_row5->timeslot_booked_bkg_color); ?> !Important;
}


.sun-header h3
{
	 color: <?php esc_html_e($default_row5->heading_color_popup); ?> !Important;
}

.mon-header h3
{
	 color: <?php esc_html_e($default_row5->heading_color_popup); ?> !Important;
}

.tue-header h3
{
	 color: <?php esc_html_e($default_row5->heading_color_popup); ?> !Important;
}

.wed-header h3
{
	 color: <?php esc_html_e($default_row5->heading_color_popup); ?> !Important;
}

.thu-header h3
{
	 color: <?php esc_html_e($default_row5->heading_color_popup); ?> !Important;
}

.fri-header h3
{
	 color: <?php esc_html_e($default_row5->heading_color_popup); ?> !Important;
}

.sat-header h3
{
	 color: <?php esc_html_e($default_row5->heading_color_popup); ?> !Important;
}

.fom-text
{
	color : <?php esc_html_e($default_row5->text_color_popup); ?> !Important;
}


</style> 
 
<?php
} 
add_shortcode('boffin_appointment_calendar', 'boffin_coders_appointment_id');
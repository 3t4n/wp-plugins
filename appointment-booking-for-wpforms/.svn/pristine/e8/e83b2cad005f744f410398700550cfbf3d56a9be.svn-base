<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Install {
	function __construct(){
		add_action("activated_plugin", array($this,"redirect"));
		add_action("Booknow_install_done",array($this,"install_notifications"));
		add_action("Booknow_install_done",array($this,"add_page_my_bookings"));
	}
	function redirect($plugin){
		$check_wizard = get_option("booknow_wizard");
		 if( $plugin == "booknow/booknow.php"  && $check_wizard != "done" ) {
		 	exit( wp_redirect( admin_url( 'admin.php?page=booknow-settings-wizard' ) ) );
		 }
	}
	public static function route(){
		?>
		<div class="booknow-container-settings-wizard">
		<?php
		Booknow_Settings_Backend::settings_page_render(true);
		?>
		</div>
		<?php
	}
	function add_page_my_bookings(){
		if( get_option("booknow_my_order") < 1 ){
			$my_post = array(
					'post_title'    => "My Bookings",
					'post_content'  => '[booknow_orders]',
					'post_type'=>"page",
					'post_status'=>"publish"
				);
			$post_id = wp_insert_post( $my_post );
			$my_post_booking = array(
					'post_title'    => "Book an Appointment",
					'post_content'  => '[booknow]',
					'post_type'=>"page",
					'post_status'=>"publish"
				);
			$my_post_booking_id = wp_insert_post( $my_post_booking );
			update_option("booknow_my_order",$post_id);
			update_option("booknow_booking",$my_post_booking_id);
		}
	}
	public static function install_notifications_update(){
		if( wp_count_posts("booknow_notify")->publish < 1 ) :
		$datas = array(
				array(
					"title"=>"Appointment Approved",
					"type"=>"approved",
					"sendto"=>"customer",
					"message"=>"Dear [customer_first_name] [customer_last_name],<br>You have successfully scheduled appointment.<br>Thank you for choosing us"
				),
				array(
					"title"=>"Appointment Approved",
					"type"=>"approved",
					"sendto"=>"satff",
					"message"=>"Hi [staff_first_name] [staff_last_name],<br>You have one confirmed [service_name] appointment. The appointment is added to your schedule.<br>Thank you"
				),
				array(
					"title"=>"Appointment Pending",
					"type"=>"pending",
					"sendto"=>"customer",
					"message"=>"Dear [customer_first_name] [customer_last_name],<br>The [service_name] appointment is scheduled and it's waiting for a confirmation.<br>Thank you for choosing us"
				),
				array(
					"title"=>"Appointment Pending",
					"type"=>"pending",
					"sendto"=>"satff",
					"message"=>"Hi [staff_first_name] [staff_last_name],<br>You have new appointment in [service_name]. The appointment is waiting for a confirmation.<br>Thank you"
				),
				array(
					"title"=>"Appointment Rejected",
					"type"=>"rejected",
					"sendto"=>"customer",
					"message"=>"Dear [customer_first_name] [customer_last_name],<br>The [service_name] appointment, has been rejected.<br>Thank you for choosing us"
				),
				array(
					"title"=>"Appointment Rejected",
					"type"=>"rejected",
					"sendto"=>"satff",
					"message"=>"Hi [staff_first_name] [staff_last_name],<br>Your [service_name] appointment, has been rejected.<br>Thank you"
				),
				array(
					"title"=>"Appointment Canceled",
					"type"=>"cancelled",
					"sendto"=>"customer",
					"message"=>"Dear [customer_first_name] [customer_last_name],<br>The [service_name] appointment, has been canceled.<br>Thank you for choosing us"
				),
				array(
					"title"=>"Appointment Canceled",
					"type"=>"cancelled",
					"sendto"=>"satff",
					"message"=>"Hi [staff_first_name] [staff_last_name],<br>Your [service_name] appointment, has been canceled.<br>Thank you"
				),
		);
		foreach($datas as $data){
			$my_post = array(
				'post_title'    => $data["title"],
				'post_content'  => '',
				'post_type'=>"booknow_notify",
				'post_status'=>"publish"
			);
			$post_id = wp_insert_post( $my_post );
			update_post_meta( $post_id, "_booknow_notifications_type", $data["type"] );
			$notifications = array("sendto"=>$data["sendto"],"formname"=>"","formmail"=>"","reply"=>"","bcc"=>"","subject"=>$data["title"],"message"=>$data["message"],"sendtoemail"=>"");
			update_post_meta( $post_id, "_booknow_notifications", $notifications );
		}
		endif;	
	}
	public function install_notifications(){
		if( wp_count_posts("booknow_notify")->publish < 1 ) :
		$datas = array(
				array(
					"title"=>"Appointment Approved",
					"type"=>"approved",
					"sendto"=>"customer",
					"message"=>"Dear [customer_first_name] [customer_last_name],<br>You have successfully scheduled appointment.<br>Thank you for choosing us"
				),
				array(
					"title"=>"Appointment Approved",
					"type"=>"approved",
					"sendto"=>"satff",
					"message"=>"Hi [satff_first_name] [satff_last_name],<br>You have one confirmed [service_name] appointment. The appointment is added to your schedule.<br>Thank you"
				),
				array(
					"title"=>"Appointment Pending",
					"type"=>"pending",
					"sendto"=>"customer",
					"message"=>"Dear [customer_first_name] [customer_last_name],<br>The [service_name] appointment is scheduled and it's waiting for a confirmation.<br>Thank you for choosing us"
				),
				array(
					"title"=>"Appointment Pending",
					"type"=>"pending",
					"sendto"=>"satff",
					"message"=>"Hi [satff_first_name] [satff_last_name],<br>You have new appointment in [service_name]. The appointment is waiting for a confirmation.<br>Thank you"
				),
				array(
					"title"=>"Appointment Rejected",
					"type"=>"rejected",
					"sendto"=>"customer",
					"message"=>"Dear [customer_first_name] [customer_last_name],<br>The [service_name] appointment, has been rejected.<br>Thank you for choosing us"
				),
				array(
					"title"=>"Appointment Rejected",
					"type"=>"rejected",
					"sendto"=>"satff",
					"message"=>"Hi [satff_first_name] [satff_last_name],<br>Your [service_name] appointment, has been rejected.<br>Thank you"
				),
				array(
					"title"=>"Appointment Canceled",
					"type"=>"cancelled",
					"sendto"=>"customer",
					"message"=>"Dear [customer_first_name] [customer_last_name],<br>The [service_name] appointment, has been canceled.<br>Thank you for choosing us"
				),
				array(
					"title"=>"Appointment Canceled",
					"type"=>"cancelled",
					"sendto"=>"satff",
					"message"=>"Hi [satff_first_name] [satff_last_name],<br>Your [service_name] appointment, has been canceled.<br>Thank you"
				),
		);
		foreach($datas as $data){
			$my_post = array(
				'post_title'    => $data["title"],
				'post_content'  => '',
				'post_type'=>"booknow_notify",
				'post_status'=>"publish"
			);
			$post_id = wp_insert_post( $my_post );
			update_post_meta( $post_id, "_booknow_notifications_type", $data["type"] );
			$notifications = array("sendto"=>$data["sendto"],"formname"=>"","formmail"=>"","reply"=>"","bcc"=>"","subject"=>$data["title"],"message"=>$data["message"],"sendtoemail"=>"");
			update_post_meta( $post_id, "_booknow_notifications", $notifications );
		}
		endif;	
	}
}
new Booknow_Install;
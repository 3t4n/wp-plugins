<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Notifications_Update_Status{ 
	function __construct(){
		add_action("booknow_appointment_status",array($this,"send_mail"),10,2);
		add_action("booknow_after_appointment",array($this,"send_mail"),10,2);
	}
	function send_mail($appointment_id,$status){
		 $notifications = get_posts( array("post_type"=>"booknow_notify","posts_per_page"=>-1,
		'meta_query' => array( 
							"relation"=> "AND",
	                        array(
	                            'key'=> '_booknow_notifications_type',
	                            'value' => $status,
	                        ),
	                        array(
	                            'key'=> '_booknow_notifications_enable',
	                            'value' => "on",
	                        )
	                    )) );
        if ( $notifications ) :
            foreach ( $notifications as $post ) : 
                $post_id = $post->ID;
                $notifications_datas = get_post_meta( $post_id , '_booknow_notifications' , true );
                if($notifications_datas["sendto"] == "customer") {
                	$customer_id = get_post_meta( $appointment_id , '_booknow_appointment_customer' , true );
                	if( isset($customer_id) && $customer_id > 0){
                		$customer_datas = get_post_meta( $customer_id , '_booknow_customers' , true );
                		if(isset($customer_datas["email"])){
                			$email = $customer_datas["email"];
                		}
                	}
                }else if( $notifications_datas["sendto"] == "satff" ) {
                	$staff_id = get_post_meta( $appointment_id , '_booknow_appointment_staff' , true );
                	if( isset($staff_id) &&  $staff_id > 0 ){
                		$staff_datas = get_post_meta( $customer_id , '_booknow_staffs' , true );
                		if(isset($staff_datas["email"])){
                			$email = $staff_datas["email"];
                		}
                	}
                }else{
                	$email = $notifications_datas["sendtoemail"];
                }
                $customer_id = get_post_meta( $appointment_id , '_booknow_appointment_customer' , true );

                if(isset($email) && is_email($email) ){
                	$datas = array(
                		"subject"=>$notifications_datas["subject"],
                		"message"=>$notifications_datas["message"],
                		"name"=>$notifications_datas["formname"],
                		"formmail"=>$notifications_datas["formmail"],
                		"bcc"=>$notifications_datas["bcc"],
                		"reply"=>$notifications_datas["subject"],
                		"attachments"=>array()
                	);
                	$datas = apply_filters("booknow_appointment_tags",$datas,$appointment_id);
                	$is_success = Booknow_Notifications_Wpmail::send($email,$datas);
                	do_action("booknow_email_success",$is_success);
                }
            endforeach;
            wp_reset_postdata(); 
        endif;
	}
}
new Booknow_Notifications_Update_Status;
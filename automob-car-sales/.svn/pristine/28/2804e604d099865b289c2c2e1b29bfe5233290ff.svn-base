<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class AutomobPublicAjax
{
	public function am_send_email()
	{
			$recipients =  array();
			if (strlen(get_option('contact_email',''))==0)
			{
				$args = array('orderby' => 'display_name');
				$wp_user_query = new WP_User_Query($args);
				$authors = $wp_user_query->get_results();
				if (!empty($authors)) {
					foreach ($authors as $author) {
						$author_info = get_userdata($author->ID);
						$recipients[]= $author_info->user_email ;
					}
				}
			}else{
				$recipients[]=get_option('contact_email');
			}

			
			$subject  = trim(get_bloginfo('name').' Car Enquiry') ; //todo make dynamic via settings form
			$name  = sanitize_text_field($_POST['name']);
			$surname  = sanitize_text_field($_POST['surname']);			
			$from  = sanitize_email($_POST['email']);
			$message  = sanitize_text_field($_POST['message']);
			$area  = sanitize_text_field($_POST['area']);
			$mobile= sanitize_text_field($_POST['mobile']);
			$vehicle_id  = (int)$_POST['vehicle-id'];

			$form_info = array('subject' => $subject,
							   'name' => $name,
							   'surname' => $surname,
							   'from' => $from,
							   'message' => $message,
							   'area' => $area,
							   'mobile' => $mobile);

			


			$html_message = $this->build_email($form_info,$vehicle_id);

			$headers[] = "From: ".$name." <".$from.">\r\n";
			$headers[] = "Reply-To: ".$from."\r\n";
			$headers[] = "Content-Type: text/html;charset=utf-8\r\n";

			wp_mail( $recipients, $subject, $html_message, $headers);

			$result = json_encode(array('status' => 'success'));
			echo $result;
			wp_die();
		}



		private function build_email($form_info,$vehicle_id)
		{
			$vehicle_table  =  new Automob_Car_Table(); 
			$vehicle_info = $vehicle_table->getCar($vehicle_id);

			//get  from model
			ob_start(); 
				$template_loader  = new AutomobTemplateManager(); 
				$template_loader->get_template_part( 'email','interested', array('form_info' => $form_info,'vehicle_info'=>$vehicle_info));
				$contents = ob_get_contents();
			ob_end_clean();

			return $contents;
		}	

}
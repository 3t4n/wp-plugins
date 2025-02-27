<?php 
if ( ! defined( 'ABSPATH' ) ) { exit;} 
if( !class_exists( 'Ni_WooPR_Core' ) ) {
    class Ni_WooPR_Core {
		var $niwoopr_constant =array();
        public function __construct($niwoopr_constant =array()){
			$this->niwoopr_constant =$niwoopr_constant;
			$this->niwoopr_constant["manage_options"] = "manage_options";
			$this->niwoopr_constant["menu"] = "niwoopr-payment-reminder";
			
           
            add_filter( 'manage_edit-shop_order_columns',   array(&$this,'add_payment_reminder_button' ));

            add_action( 'manage_shop_order_posts_custom_column' , array(&$this,'add_payment_reminder_button_action' ), 10, 2 );


            add_action( 'wp_ajax_niwoopr_ajax',  array(&$this,'niwoopr_ajax' )); /*used in form field name="action" value="my_action"*/
            add_action( 'admin_enqueue_scripts',  array(&$this,'admin_enqueue_scripts' ));
            add_action( 'admin_init',  array(&$this,'admin_init' ));
			add_action( 'admin_footer',  array(&$this,'admin_footer' ));
			add_action( 'admin_menu',  array(&$this,'admin_menu' ));
			

            
        }
		function admin_menu(){
		 	add_menu_page( 
			__(  'Payment Reminder'  ,'niwoopr'), 
			__(  'Payment Reminder'  ,'niwoopr'), 
			$this->niwoopr_constant['manage_options'], 
			$this->niwoopr_constant['menu'], 
			array( $this, 'add_page'), 'dashicons-lightbulb', "58.8513" );
			add_submenu_page(
			$this->niwoopr_constant["menu"], 
			__(  'Dashboard'  ,'niwoopr'),
			__(  'Dashboard'  ,'niwoopr'), 
			$this->niwoopr_constant['manage_options'],
			$this->niwoopr_constant["menu"], 
			array( $this, 'add_page'));
			add_submenu_page(
			$this->niwoopr_constant["menu"], 
			__(  'Setting'  ,'niwoopr'),
			__(  'Setting'  ,'niwoopr'), 
			$this->niwoopr_constant['manage_options'],
			'niwoopr-setting', 
			array( $this, 'add_page'));
		}
		function add_page(){
			if (isset($_REQUEST["page"])){
				$page = sanitize_text_field(isset($_REQUEST["page"])?$_REQUEST["page"]:"");
				if ($page == "niwoopr-setting"){
					include_once("niwoopr-setting.php");
					$obj = new Ni_WooPR_Setting();
					$obj->page_init();
				}
				if ($page == "niwoopr-payment-reminder"){
					include_once("niwoopr-payment-reminder.php");
					$obj = new Ni_WooPR_Payment_Reminder();
					$obj->page_init();
				}
			}
			
		}
        function admin_init(){

            
    

        }
        function niwoopr_ajax(){
			
			if(isset($_REQUEST["sub_action"])){
				$sub_action = sanitize_text_field(isset($_REQUEST["sub_action"])?$_REQUEST["sub_action"]:"");
				
				if ($sub_action =="save_setting")
				{	include_once("niwoopr-setting.php");
					$obj = new Ni_WooPR_Setting();
					$obj->get_ajax();
					die;
				}
				
				if ($sub_action =="reminder_email"){
					
					$return_data  	 = array(); 
					$return_data["email_status"] = 0;
					$return_data["email_message"] = "";
					$return_data["last_date"] = "";
			
					$order_id = absint( wp_unslash( $_REQUEST['order_id'] ) ) ;
					include_once("niwoopr-email.php");
					$obj_email  =  new  Ni_WooPR_Email();
					$return_data = $obj_email->send_reminder_email($order_id);
					
					if(isset($return_data["email_status"]) and $return_data["email_status"]	 == 1){
						$return_data["email_message"] = sprintf(esc_html__("Email reminder order ID #%s successfully sended.",'niwoopr'),$order_id);
					}else{
						$return_data["email_message"] = esc_html__("Getting problem to sending email.",'niwoopr');
					}
					$last_date = get_post_meta($order_id,'_ni_last_reminder_date',true);						
					if(!empty($last_date)){
						$return_data["last_date"] = $this->to_time_ago(strtotime($last_date));
					}
					echo json_encode($return_data);
					die;
				}
			}
        }
        function admin_enqueue_scripts( $hook){
			$page = sanitize_text_field(isset($_REQUEST["page"])?$_REQUEST["page"]:"");
        
            if ((get_post_type() =="shop_order" &&  $hook == "edit.php" ) || $page =="niwoopr-setting"  || $page =="niwoopr-payment-reminder" ){
				
				
					wp_enqueue_script('niwoopr-bootstrap-script', plugins_url( '../admin/js/lib/bootstrap.min.js', __FILE__ ));
					wp_enqueue_script('niwoopr-popper-script', plugins_url( '../admin/js/lib/popper.min.js', __FILE__ ));
					wp_register_style('niwoopr-bootstrap', plugins_url('../admin/css/lib/bootstrap.min.css', __FILE__ ));
					wp_enqueue_style('niwoopr-bootstrap' );
					
					wp_register_style('niwoopr-payment-reminder', plugins_url('../admin/css/niwoopr-payment-reminder.css', __FILE__ ));
					wp_enqueue_style('niwoopr-payment-reminder' );
				
				if ($page =="niwoopr-setting"){
					wp_enqueue_script('niwoopr-setting-script', plugins_url('../admin/js/niwoopr-setting.js', __FILE__), array('jquery'));
				} 
			 	
				wp_enqueue_script('niwoopr_ajax_scripts', plugins_url( '../admin/js/script.js', __FILE__ ), array('jquery') );
                wp_localize_script('niwoopr_ajax_scripts','niwoopr_ajax_object',array('niwoopr_ajax_url'=>admin_url('admin-ajax.php'),"ajax_action" => 'niwoopr_ajax'));
            }
            

        }
       
		
		function admin_footer(){
			?>
            	<script type="text/javascript">
                	jQuery(document).ready(function(e) {
						 
						var ni_processing = false;
                        jQuery("td.niwoopr_payment_reminder").click(function(e) {
							e.preventDefault();
							return false;
						});
						var admin_notice_number = 1;
						var admin_notice = "";
						jQuery("a.send_reminder_email").click(function(e) {
								e.preventDefault();
								
								if(jQuery(this).hasClass('disabled')){
									return false;
								}
								
								var t_this = jQuery(this);
							     // disable button
								  jQuery(this).prop("disabled", true);
								  // add spinner to button
								  jQuery(this).html(
									'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
								  );
								
								var button_obj = jQuery(this);
								var order_id = button_obj.attr('data-order');
								
								var form_data = {
									"action" : niwoopr_ajax_object.ajax_action
									,"sub_action" : "reminder_email"
									,"order_id" : order_id
								};
								
								admin_notice = "";
								admin_notice_number = admin_notice_number + 1;
								
								button_obj.addClass("sending");
								button_obj.removeClass("sended");
								button_obj.removeClass("failed");
								
								jQuery.ajax({			
									url: niwoopr_ajax_object.niwoopr_ajax_url,
									data: form_data,
									success:function(response) {
										
										var return_data = JSON.parse(response);
										ni_processing = false;
										button_obj.removeClass("sending");
										button_obj.addClass("sended");
										
										var notice_class = " notice-success";
										if(return_data.email_status == 1){
											t_this.html('Emailed');
											t_this.prop("disabled", true);
											
											t_this.addClass("disabled");
											
											jQuery(".niwoopr_last_reminded_date_"+order_id).html(return_data.last_date);
										}else{
											notice_class = " error";
											t_this.addClass("failed");
											t_this.html('Email');
											t_this.prop("disabled", false);
										}
										
										admin_notice += '<div id="admin_notice_number_'+admin_notice_number+'" class="notice '+notice_class+'" style="display:none">';
											admin_notice += '	<p>'+return_data.email_message+'</p>';
										admin_notice += '</div>';
										jQuery(".wrap").prepend(admin_notice);
											jQuery("#admin_notice_number_"+admin_notice_number).fadeIn("slow").delay(3000).fadeOut("slow",function(){
											jQuery("#admin_notice_number_"+admin_notice_number).remove();
										});
									},
									error: function(response){
										console.log("error");
										console.log(response);
										button_obj.removeClass("sending");
										button_obj.addClass("failed");
										
										jQuery(".wrap").prepend(admin_notice);
										jQuery("#admin_notice_number_"+admin_notice_number).fadeIn("slow").delay(30000).fadeOut("slow",function(){
											jQuery("#admin_notice_number_"+admin_notice_number).remove();
										});
										
										ni_processing = false;
									}
								});
								
								return false;
                        });
                    });
                </script>
                <style type="text/css">
					 .wp-core-ui .send_reminder_email.button.sending{ color: #31708f;background-color: #d9edf7;border-color: #bce8f1;}
					 .wp-core-ui .send_reminder_email.button.sended,
					 .wp-core-ui .send_reminder_email.button.sended.focus{ background-color:#dff0d8; color:#3c763d;border-color: #3c763d;}
					 .wp-core-ui .send_reminder_email.button.failed{ color: #a94442;background-color: #f2dede;border-color: #ebccd1;}
                </style>
            <?php
		}
		
		 function add_payment_reminder_button($columns){
            $columns['niwoopr_payment_reminder'] = __('Email','niwoopr');
			$columns['niwoopr_last_reminded_date'] = __('Reminded','niwoopr');
            return $columns;
        }
        
		function add_payment_reminder_button_action($column_name, $post_id){
			switch($column_name){
				case "niwoopr_payment_reminder":
					$niwoopr_settings = get_option("niwoopr_settings");
					$setting_order_status = isset($niwoopr_settings["order_status"])?$niwoopr_settings["order_status"]:array("wc-processing");
					$order = wc_get_order( $post_id );
					$status = $order->get_status();
					
					if (in_array("wc-".$status, $setting_order_status)):
						if($column_name=="niwoopr_payment_reminder"){
							$admin_ajax_url  = admin_url('admin-ajax.php')."?action=niwoopr_ajax&order_id=".$post_id;                
							_e( "<p><a href='{$admin_ajax_url}' class='pdf-over button send_reminder_email' target='blank' style='float:left; margin-top:0px; height:27px;' data-order='{$post_id}'>Email</a></p>");				
						}
					endif;
					break;
				case "niwoopr_last_reminded_date":
					$last_date = get_post_meta($post_id,'_ni_last_reminder_date',true);					
					if(!empty($last_date)){
						$t = strtotime($last_date);
						echo "<div class=\"niwoopr_last_reminded_date niwoopr_last_reminded_date_".$post_id."\" title=\"".date_i18n('d F Y, h:i:s A',$t)."\">";
						echo $this->to_time_ago($t);
					}else{
						echo "<div class=\"niwoopr_last_reminded_date niwoopr_last_reminded_date_".$post_id."\">";
					}
					echo "</div>";
					break;
			}
        }
		
		// PHP program to convert timestamp 
		// to time ago 
		  
		function time_Ago($time) { 
		  
			// Calculate difference between current 
			// time and given timestamp in seconds 
			$diff     = strtotime(date_i18n("Y-m-d H:i:s")) - $time; 
			  
			// Time difference in seconds 
			$sec     = $diff; 
			  
			// Convert time difference in minutes 
			$min     = round($diff / 60 ); 
			  
			// Convert time difference in hours 
			$hrs     = round($diff / 3600); 
			  
			// Convert time difference in days 
			$days     = round($diff / 86400 ); 
			  
			// Convert time difference in weeks 
			$weeks     = round($diff / 604800); 
			  
			// Convert time difference in months 
			$mnths     = round($diff / 2600640 ); 
			  
			// Convert time difference in years 
			$yrs     = round($diff / 31207680 ); 
			
			$output = "";
			  
			// Check for seconds 
			if($sec <= 60) { 
				$output .= "$sec seconds ago"; 
			} 
			  
			// Check for minutes 
			else if($min <= 60) { 
				if($min==1) { 
					$output .= "one minute ago"; 
				} 
				else { 
					$output .= "$min minutes ago"; 
				} 
			} 
			  
			// Check for hours 
			else if($hrs <= 24) { 
				if($hrs == 1) {  
					$output .= "an hour ago"; 
				} 
				else { 
					$output .= "$hrs hours ago"; 
				} 
			} 
			  
			// Check for days 
			else if($days <= 7) { 
				if($days == 1) { 
					$output .= "Yesterday"; 
				} 
				else { 
					$output .= "$days days ago"; 
				} 
			} 
			  
			// Check for weeks 
			else if($weeks <= 4.3) { 
				if($weeks == 1) { 
					$output .= "a week ago"; 
				} 
				else { 
					$output .= "$weeks weeks ago"; 
				} 
			} 
			  
			// Check for months 
			else if($mnths <= 12) { 
				if($mnths == 1) { 
					$output .= "a month ago"; 
				} 
				else { 
					$output .= "$mnths months ago"; 
				} 
			} 
			  
			// Check for years 
			else { 
				if($yrs == 1) { 
					$output .= "one year ago"; 
				} 
				else { 
					$output .= "$yrs years ago"; 
				} 
			}
			return $output; 
		} 
		
		// PHP program to convert timestamp 
		// to time ago 
		  
		function to_time_ago( $time ) { 
			  
			// Calculate difference between current 
			// time and given timestamp in seconds 
			$diff = strtotime(date_i18n("Y-m-d H:i:s")) - $time; 
			  
			if( $diff < 1 ) {  
				return 'less than 1 second ago';  
			} 
			  
			$time_rules = array (  
						12 * 30 * 24 * 60 * 60 => 'year', 
						30 * 24 * 60 * 60       => 'month', 
						24 * 60 * 60           => 'day', 
						60 * 60                   => 'hour', 
						60                       => 'minute', 
						1                       => 'second'
			); 
		  
			foreach( $time_rules as $secs => $str ) { 
				  
				$div = $diff / $secs; 
		  
				if( $div >= 1 ) { 
					  
					$t = round( $div ); 
					  
					return $t . ' ' . $str .  
						( $t > 1 ? 's' : '' ) . ' ago'; 
				} 
			} 
		} 
		
    }/*End*/
}
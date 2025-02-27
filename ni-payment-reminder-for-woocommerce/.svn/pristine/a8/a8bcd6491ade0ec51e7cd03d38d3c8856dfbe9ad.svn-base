<?php 
if ( ! defined( 'ABSPATH' ) ) { exit;} 
if( !class_exists( 'Ni_WooPR_Setting' ) ) {
	include_once("niwoopr-email.php");
    class Ni_WooPR_Setting extends Ni_WooPR_Email{
		 public function __construct(){
		 }
		 function page_init(){
			$niwoopr_settings = get_option("niwoopr_settings");
			
			//print("<pre>".print_r($niwoopr_settings,true)."</pre>");
			
			$niwoopr_settings =  isset( $niwoopr_settings)? $niwoopr_settings:array();
			$from_name = isset($niwoopr_settings["from_name"])?$niwoopr_settings["from_name"]:'';
			$from_email_address = isset($niwoopr_settings["from_email_address"])?$niwoopr_settings["from_email_address"]:'';
			$email_subject_line = isset($niwoopr_settings["email_subject_line"])?$niwoopr_settings["email_subject_line"]:'';
			$email_content = isset($niwoopr_settings["email_content"])?$niwoopr_settings["email_content"]:'';
			$editor_type = isset($niwoopr_settings["editor_type"])?$niwoopr_settings["editor_type"]:'';
			
			$setting_order_status = isset($niwoopr_settings["order_status"])?$niwoopr_settings["order_status"]:array("wc-processing");
			
		
			
			
			$placeholder_text = $this->get_placeholder_text();
			
			//if(isset($_REQUEST["email"]) && $_REQUEST["email"] ==1){
				//include_once("niwoopr-email.php");
				//$obj  =  new  Ni_WooPR_Email();
				//$this->send_reminder_email();
			//}
			
			$order_status =  $this->get_order_status();
			
			
		 ?>
         <div class="container-fluid" id="niwoopr">
         	<div class="row">
                <div class="col-md-12">
                    <div class="card">
                		<div class="card-header"> <?php esc_html_e('Settings','niwoopr'); ?> </div>
                        	
                			<div class="card-body">
                				<form autocomplete="off" id ="frm_setting" name="frm_setting" method="post">
                                  <div class="form-group">
                                    <label for="from_name"><?php esc_html_e('From Name','niwoopr'); ?> </label>
                                    <input type="text" class="form-control" id="from_name" name="niwoopr_settings[from_name]" placeholder="Enter From Name" value="<?php esc_html_e($from_name);  ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="from_email_address"><?php esc_html_e('From Email Address','niwoopr'); ?> </label>
                                    <input type="text" class="form-control" id="from_email_address" name="niwoopr_settings[from_email_address]" placeholder="Enter From Email Address" value="<?php esc_html_e($from_email_address);  ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="email_subject_line"><?php esc_html_e('Subject Line','niwoopr'); ?> </label>
                                    <input type="text" class="form-control" id="email_subject_line" name="niwoopr_settings[email_subject_line]" placeholder="Enter Subject Line" value="<?php esc_html_e($email_subject_line);  ?>">
                                  </div>
                                   <div class="form-row">
                                        <div class="form-group  col-md-10">
                                        <label for="email_content"> <?php esc_html_e('Email Text','niwoopr'); ?> </label>
                                        
                                        <?php //http://wp-kama.ru/filecode/wp-includes/class-wp-editor.php
                                         //wp_editor( 'Hi,its content' , 'desired_id_of_textarea', $settings = array('textarea_name'=>'your_desired_name_for_$POST') ); ?> 
                                        <?php 
                                        wp_editor( stripslashes($email_content),'email_content',array('textarea_name'=>'niwoopr_settings[email_content]'));
										?>
                                      </div>
                                      <div class="form-group  col-md-2">
                                         <label for="email_content"> <?php _e('Placeholder','niwoopr'); ?> </label>
                                      	<ul>
                                        	<?php foreach($placeholder_text as $key=>$value): ?>
                                        	<li><?php echo $value; ?></li>
                                           <?php endforeach; ?>
                                          
                                        </ul>
                                     </div>
                                   </div>
                                   <hr />
                                   
                                  <div class="form-group">
                                    <label for="order_status"><?php esc_html_e('Select Order Status for Email','niwoopr'); ?> </label>
                                    <select id="order_status"  class="form-control" name="niwoopr_settings[order_status][]" multiple="multiple" >
                                   		<?php foreach($order_status as $key=>$value): ?>
                                        		
												<?php if (in_array($key, $setting_order_status)): ?>
                                                
                                        	<option value="<?php  esc_html_e($key); ?>" selected="selected"><?php esc_html_e($value) ; ?></option>
                                            		<?php  else :?>
                                                    <option value="<?php  esc_html_e($key); ?>"><?php esc_html_e($value) ; ?></option>
                                            	<?php endif;?>
                                        <?php endforeach; ?> 	
                                    </select>
                                  </div>
                                   
                                  <div class="form-row">
                                  	<div class="form-group  col-md-11">
                                     	<div class="alert alert-success" style="display:none">
                                          <strong>Success!</strong> Indicates a successful or positive action.
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-1">
                                  		<button type="submit" class="btn btn-primary"> <?php esc_html_e('Save','niwoopr'); ?> </button>  
                                    </div>
                                    
                                  </div>
                                  <input type="hidden"  name="sub_action" id="sub_action" value="save_setting"/>
                                  <input type="hidden"  name="action" id="action" value="niwoopr_ajax"/>
                                  <input type="hidden"  name="niwoopr_settings[editor_type]" id="ni_editor_type" value="<?php echo esc_html($editor_type) ; ?>"/>
                                </form>	
                			</div>
                		</div>
                	</div>
            	</div>
         </div>
         <?php	
		 }
		 function get_ajax(){
			 $niwoopr_settings  = array();
			 
			 $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
			 $allowedTags.='<li><ol><ul><span><div><br><ins><del>';
			 $email_content = isset($_REQUEST["niwoopr_settings"]["email_content"]) ? $_REQUEST["niwoopr_settings"]["email_content"] : '';
			// $sContent = strip_tags(stripslashes($receivedData),$allowedTags);
			
			 $niwoopr_settings["from_name"] = sanitize_text_field( isset($_REQUEST["niwoopr_settings"]["from_name"]) ? $_REQUEST["niwoopr_settings"]["from_name"] : '');
			 $niwoopr_settings["from_email_address"] = sanitize_email( isset($_REQUEST["niwoopr_settings"]["from_email_address"]) ?  wp_unslash( $_REQUEST["niwoopr_settings"]["from_email_address"]) : '');
			 $niwoopr_settings["email_subject_line"] = sanitize_text_field( isset($_REQUEST["niwoopr_settings"]["email_subject_line"]) ? $_REQUEST["niwoopr_settings"]["email_subject_line"] : '');
			 $niwoopr_settings["email_content"] =  strip_tags(stripslashes($email_content),$allowedTags);
			 $niwoopr_settings["order_status"] = array_map("sanitize_text_field",isset($_REQUEST["niwoopr_settings"]["order_status"]) ? $_REQUEST["niwoopr_settings"]["order_status"] : array());
			 $niwoopr_settings["editor_type"] = sanitize_text_field( isset($_REQUEST["niwoopr_settings"]["editor_type"]) ? $_REQUEST["niwoopr_settings"]["editor_type"] : 'html-active');
			 update_option("niwoopr_settings", $niwoopr_settings);
			 _e('Recrd saved','niwoopr');
			 die;
		 }
	}
}
?>
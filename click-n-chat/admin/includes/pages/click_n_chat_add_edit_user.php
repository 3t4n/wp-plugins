<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_add_edit_user($limit) {	
	global $wpdb;
	$table_name = $wpdb->prefix . 'cnc_social_users';
	// Fetch users
	$users = $wpdb->get_results("SELECT * FROM {$table_name}");
	$mode = sanitize_text_field($_GET['mode']);
	$nonce = wp_create_nonce( 'addedit-user' );
	$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
	$action = '';
	// Handle add or update user
	if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		} 
 		
		
		
		
		$action = sanitize_text_field($_POST['action']);
 
		$name = sanitize_text_field($_POST['name']);
		$country_code = sanitize_text_field($_POST['country_code']);
		$cnc_social_id = str_replace("-", "", str_replace(" ", "", sanitize_text_field($_POST['cnc_social_id'])));
		$ulimit = sanitize_textarea_field($_POST['limit']);
		$social_type = sanitize_text_field($_POST['social_type']);
		$designation = sanitize_text_field($_POST['designation']);
		$description = sanitize_textarea_field($_POST['description']);
		$welcome_message = sanitize_textarea_field($_POST['welcome_message']);
		$availability = sanitize_text_field($_POST['availability']) == "on" ? 1 : 0;
		
		if ($action === 'add') {
			if (  $ulimit >= $limit )
				 die( '<h5>Reached the maximum number of users, check <a style="text-decoration:none" href="https://clicknchat.flag92.com/">PRO</a></h5>' ); 
		} elseif ($action === 'update') {
			if (  $ulimit > $limit )
				 die( '<h5>Reached the maximum number of users, check <a style="text-decoration:none" href="https://clicknchat.flag92.com/">PRO</a></h5>' );
		}
		
		$my_icon = isset($_POST['my_icon']) ? sanitize_textarea_field($_POST['my_icon']) : '';
		$icon_url = '';
		
		$country_code = $social_type == 'whatsapp' ? $country_code : '';
		
		if (!empty($_FILES['icon']['name']) || $my_icon != '') {
			
			if($my_icon == "")
			{
				$uploaded_file = $_FILES['icon'];
				$upload_overrides = array('test_form' => false);
				$movefile = wp_handle_upload($uploaded_file, $upload_overrides);
				if ($movefile && !isset($movefile['error'])) {
					$icon_url = $movefile['url'];
				} else {
					wp_redirect(admin_url('admin.php?page=wa-clicknchat&message='.esc_html($movefile['error'])));
					exit;
				}
			}
			else
			{
				$icon_url = $my_icon;
			}
		} else {
			if ($action === 'update') {
				$icon_url = sanitize_text_field($_POST['current_icon']);
			}
		}
		

		if ($action === 'add') {
			$social_position = $wpdb->get_results("SELECT max(position) as position FROM {$table_name} LIMIT 1");
			$position = 1;
			
			if ($social_position[0]->position != NULL) {
				$position = $social_position[0]->position + 1;
			}

			$wpdb->insert(
				$table_name,
				['name' => $name, 'cnc_social_id' => $country_code.$cnc_social_id, 'social_type' => $social_type, 'user_icon' => $icon_url, 'designation' => $designation, 'description' => $description, 'welcome_message' => $welcome_message,'position' => $position]
			);
			$id = $wpdb->insert_id;
			$alertMessage ="User added.";
		} elseif ($action === 'update') {
			$id = intval($_POST['id']);
			$wpdb->update(
				$table_name,
				['name' => $name, 'cnc_social_id' => $country_code.$cnc_social_id, 'social_type' => $social_type, 'user_icon' => $icon_url, 'designation' => $designation, 'description' => $description, 'welcome_message' => $welcome_message],
				['id' => $id]
			);
			$alertMessage = "User updated";
		}
		wp_redirect(admin_url('admin.php?page=wa-clicknchat&message='.$alertMessage));
        exit;
	}

	// Handle delete user
	if (isset($_GET['action']) && $_GET['action'] === 'delete') {
		$id = intval($_GET['id']);
		$wpdb->delete($table_name, ['id' => $id]);
		$alertMessage = "User deleted";
		wp_redirect(admin_url('admin.php?page=wa-clicknchat&message='.$alertMessage));
        exit;
	}
	

	if($mode == "add" && sizeof($users) >= $limit) {   
	?>
    	<h5>Reached the maximum number of users, check <a style="text-decoration:none" href="https://clicknchat.flag92.com/">PRO</a></h5>
    <?php
		exit;
	}
    
	$nonce = wp_create_nonce( 'addedit-user' );
	?>
    <div class="my-3">   
        <h1 class="wp-heading-inline"><?php echo esc_html($mode == "edit" ? 'Update' : 'Add'); ?> Social User</h1>
    </div>
    <form id="userForm" method="post" enctype="multipart/form-data">
    <div class="cnc-custom-gap-row">
        <div class="form-wrap cnc-custom-col-gap-6">
        	<div class="cnc-container cnc-bg-white cnc-shadow">
                <?php wp_nonce_field($nonce, '_wpnonce'); ?>
                <?php
                if ($mode == "edit") {
                    $id = intval($_GET['id']);
                    $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
                ?>
                <input type="hidden" name="id" value="<?php echo esc_attr($user->id); ?>">
                <input type="hidden" name="current_icon" value="<?php echo esc_attr($user->user_icon); ?>">
                <input type="hidden" name="limit" value="<?php echo esc_attr(sizeof($users)); ?>">
                <input type="hidden" name="action" value="update">
                <?php
                }
                else{
                ?>
                <input type="hidden" name="action" value="add">
                <?php		
                }
         
                ?>
                <div class="form-field">
                    <label for="social_type">Soial Account:</label>
                    <div class="cnc-radio-group cnc-link-option" style="gap:.5rem"> 
                        <!--Whatsapp-->
                        <label>
                            <input type="radio" data-ftype="1" data-placeholder="" name="social_type" value="whatsapp" <?php  echo esc_html($mode == "edit" ? ($user->social_type == "whatsapp" ? 'checked="checked"' : '') : 'checked="checked"') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/whatsapp.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">WhatsApp</center>
                        </label>
                        <!--Telegram-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="@Username" name="social_type" value="telegram" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "telegram" ? 'checked="checked"' : '') : '') ?>>

                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/telegram.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Telegram</center>
                        </label>
                        <!--Facebook Messenger-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="https://m.me/ChatGPT/" name="social_type" value="fb_messenger" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "fb_messenger" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/fb_messenger.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Facebook<br />Messenger</center>
                        </label>
                        <!--X-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="TwitterHandle" name="social_type" value="x" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "x" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/x.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">X</center>
                        </label>
                        <!--Facebook-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="https://www.facebook.com/alias" name="social_type" value="facebook" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "facebook" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/facebook.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Facebook</center>
                        </label>
                        <!--Youtube-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="@Username" name="social_type" value="youtube" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "youtube" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/youtube.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Youtube</center>
                        </label>
                        <!--Skype-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="Skype Username" name="social_type" value="skype" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "skype" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/skype.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Skype</center>
                        </label>
                        <!--Instagram-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="Instagram Username" name="social_type" value="instagram" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "instagram" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/instagram.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Instagram</center>
                        </label>
                        <!--Snapchat-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="Snapchat Username" name="social_type" value="snapchat" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "snapchat" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/snapchat.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Snapchat</center>
                        </label>
                        <!--Viber-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="Phone or Viber ID" name="social_type" value="viber" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "viber" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/viber.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Viber</center>
                        </label>
                        <!--Line-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="http://line.me/ti/p/@UserlineID"  name="social_type" value="line" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "line" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/line.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Line</center>
                        </label>
                        <!--Email-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="user@email.com" name="social_type" value="email" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "email" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/email.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Email</center>
                        </label>
                        <!--SMS-->
                        <label>
                            <input type="radio" data-ftype="2" data-placeholder="+15222333666" name="social_type" value="sms" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "sms" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/sms.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">SMS</center>
                        </label>
                        <!--Google Map-->
                        <label>
                            <input type="radio" data-type="2" data-placeholder="https://maps.app.goo.gl/14yHh6Jp4nVxgumm6" name="social_type" value="gmap" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "gmap" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/gmap.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Google Map</center>
                        </label>
                        <!--TikTok-->
                        <label>
                            <input type="radio" data-type="2" data-placeholder="@TICTOK Username" name="social_type" value="tiktok" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "tiktok" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/tiktok.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">TikTok</center>
                        </label>
                        <!--Slack-->
                        <label>
                            <input type="radio" data-type="2" data-placeholder="https://workspace.slack.com" name="social_type" value="slack" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "slack" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/slack.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Slack</center>
                        </label>
                        
                        <!--We Chat-->
                        <label>
                            <input type="radio" data-type="2" data-placeholder="My-Name" name="social_type" value="linkedin" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "linkedin" ? 'checked="checked"' : '') : '') ?>>
                            <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/linkedin.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Linked In</center>
                        </label>
                        
                        <!--V K-->
                        <label>
                            <input type="radio" data-type="2" data-placeholder="Username" name="social_type" value="vk" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "vk" ? 'checked="checked"' : '') : '') ?>>
                             <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/vk.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">VK</center>
                        </label>
                        
                        <!--Pinterest-->
                        <label>
                            <input type="radio" data-type="2" data-placeholder="https://www.pinterest.com/xyz/" name="social_type" value="pinterest" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "pinterest" ? 'checked="checked"' : '') : '') ?>>
                             <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/pinterest.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Pinterest</center>
                        </label>
                        
                        <!--Reddit-->
                        <label>
                            <input type="radio" data-type="2" data-placeholder="https://www.reddit.com/r/xyz/" name="social_type" value="reddit" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "reddit" ? 'checked="checked"' : '') : '') ?>>
                             <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/reddit.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Reddit</center>
                        </label>
                        
                         <!-- Custom -->
                        <label>
                            <input type="radio" data-type="2" data-placeholder="https://link.com" name="social_type" value="link" <?php echo esc_html($mode == "edit" ? ( $user->social_type == "link" ? 'checked="checked"' : '') : '') ?>>
                             <div class="cnc-checkpoint">
                                 <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/link.svg'; ?>
                            </div>
                            <span class="cnc-checkmark">&#10003;</span>
                            <center class="cnc-f-11">Custom<br />Link</center>
                        </label>
                    </div>
                </div>
                <div class="form-field">
                    <?php if($mode == "edit"){ ?>
                        <?php if($user->social_type == "whatsapp"){ ?>
                            <div id="cnc_social_id_div">
                                <input type="hidden" id="country_code" name="country_code">
                                <input name="cnc_social_id" type="tel" id="cnc_social_id" class="cnc_social_id" value="+<?php echo ($mode == "edit"? esc_attr($user->cnc_social_id) : ''); ?>" required>
                            </div>
                            <input name="cnc_social_id" type="text" id="cnc_social_id_txt" class="cnc_social_id" value="<?php echo ($mode == "edit"? esc_attr($user->cnc_social_id) : ''); ?>" style="display:none" disabled="disabled" required>
                        <?php }else{ ?>
                            <div id="cnc_social_id_div" style="display:none">
                                <input type="hidden" id="country_code" name="country_code">
                                <input name="cnc_social_id" type="tel" id="cnc_social_id" class="cnc_social_id" value="<?php echo ($mode == "edit"? esc_attr($user->cnc_social_id) : ''); ?>" disabled="disabled"  required>
                            </div>
                            <input name="cnc_social_id" type="text" id="cnc_social_id_txt" class="cnc_social_id" value="<?php echo ($mode == "edit"? esc_attr($user->cnc_social_id) : ''); ?>" required>
                        <?php } ?>
                    <?php }else{ ?>
                        <div id="cnc_social_id_div">
                            <input type="hidden" id="country_code" name="country_code">
                            <input name="cnc_social_id" type="tel" id="cnc_social_id" class="cnc_social_id" value="" required>
                        </div>
                        <input name="cnc_social_id" type="text" id="cnc_social_id_txt" class="cnc_social_id" value="" style="display:none" disabled="disabled" required>
                    <?php } ?>
                </div>
          	</div>
            <br />
            <div class="cnc-container cnc-bg-white cnc-shadow">                
                <div class="form-field">
                    <label for="name">Agent Name:</label>
                    <input name="name" type="text" id="name" value="<?php echo esc_html($mode == "edit" ? esc_attr($user->name) : ''); ?>" required placeholder="John Doe" >
                </div>
                <div class="form-field">
                    <label for="designation">Designation:</label>
                    <input name="designation" type="text" id="designation" value="<?php echo esc_html($mode == "edit" ? esc_attr($user->designation) : ''); ?>" placeholder="Support">
                </div>
                <div class="form-field">
                    <label for="description">Description:</label>
                    <input name="description" type="text" id="description" value="<?php echo esc_html($mode == "edit" ? esc_attr($user->description) : ''); ?>" placeholder="How can I help you?">
                    <p id="name-description">
                        <b>Description: </b> <br />
                        1. Will be display in social widget.<br />
                        2. If it's not empty, it will display as a social icon on mouse over.
                    </p>
                </div>
                <div class="form-field">
                    <label for="welcome_message">Welcome Message:</label>
                    <input name="welcome_message" type="text" id="welcome_message" value="<?php echo esc_html($mode == "edit" ? esc_attr($user->welcome_message) : ''); ?>"  placeholder="Hi, I want to ask about your services">
                    <p id="name-description">
                        <b>Welcome Message: </b> will be sent to the social user when they click on the widget/icon.
                    </p>
                </div>
              </div>
            </div>
            
            <div class="cnc-custom-col-gap-6">
                <div class="cnc-container cnc-bg-white cnc-shadow">                
                    <div class="form-field">
                        <label for="my_icon">User Icon:</label>
                        <div class="cnc-radio-group cnc-link-option" style="gap:.5rem">
                            <label>
                                <input type="radio" data-ftype="1" data-placeholder="" name="my_icon" value="social_icon">
                                <div id="cnc-my_icon-social" class="cnc-checkpoint">
                                     
                                </div>
                                <span class="cnc-checkmark">&#10003;</span>
                            </label> 
                            <?php for($i=1; $i <= 13; $i++){  ?>
                            <label>
                                <input type="radio" data-ftype="1" data-placeholder="" name="my_icon" value="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/call-icon'.$i.'.png') ?>">
                                <div class="cnc-checkpoint">
                                     <img style="border-radius: 50%;width:40px;height: 40px;" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/call-icon'.$i.'.png') ?>" />
                                </div>
                                <span class="cnc-checkmark">&#10003;</span>
                            </label>
                            <?php } ?>	
                        </div>
                        <input name="icon" type="file" id="icon" aria-describedby="iconHelp">
                        <p id="name-description"><b>User Icon</b> Please select from above icons or upload your own icon</p>
                        <?php
                            if($mode == "edit"){
                        ?>
                            <?php
                                if($user->user_icon == "social_icon"){
                            ?>
                            <center>
                                
                                <?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/'.$user->social_type.'.svg'; ?><br />
                                Current Icon 
                            </center>
                            <?php	
                                }else{
                            ?>
                            <center>
                                
                                <img src="<?php echo esc_url($user->user_icon); ?>" style="border-radius: 50%;width:50px;height: 50px;"><br />
                                Current Icon 
                            </center>
                            <?php	
                                }
                            ?>
                        <?php	
                            }
                        ?>
                    </div>
               	</div>
                <br />
                <div class="cnc-container cnc-bg-white cnc-shadow">
                    <h2>Availability</h2>
                    <table id="availabilityDetail" class="wp-list-table cnc-list-table striped widefat fixed table-view-list cnc-pro-label">
                        <thead>
                            <tr>
                                <th style="width:10%"></th>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $days_of_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                            foreach ($days_of_week as $day):
                                ?>
                                <tr>
                                    <td data-colname="Availabe">
                                    <label class="cnc-switch">
                                        <input name="" type="checkbox" value="1" disabled="disabled">
                                        <span class="cnc-switch-slider"></span>
                                    </label>
                                    </td>
                                    <td data-colname="Day">
                                    <?php echo esc_html($day); ?>
                                    </td>
                                    <td data-colname="Start Time">
                                        <input type="time" disabled="disabled">
                                    </td>
                                    <td data-colname="End Time">
                                        <input type="time" disabled="disabled">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
               	 
			</div>
        </div>
    </div>
    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_html($mode == "edit" ? 'Update Social User' : 'Add Social User'); ?>">
    </p>
    </form>
<?php
}
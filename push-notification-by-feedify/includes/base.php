<?php

add_action( 'wp_loaded', 'feedify_run_cmd' );

add_action( 'admin_notices', 'feedify_admin_notice' );

add_action( 'add_meta_boxes', 'feedify_meta_box_add' );

add_action( 'save_post', 'feedify_on_save_post', 1, 3 );

add_action( 'transition_post_status', 'feedify_on_transition_post_status', 10, 3 );

add_action( 'publish_future_post', 'feedify_on_schedule_post_status', 10, 1  );

add_action( 'wp_head', 'feedify_site_script' );

$FeedifySW = new FeedifySW();

function feedify_site_script() {
	
	$feedify_domain_key = get_option('feedify_domain_key');
	$feedify_public_key = get_option('feedify_public_key');
	$feedify_enable_ssl = get_option('feedify_enable_ssl');
	$feedify_plugin_status = get_option('feedify_plugin_status');

    if( $feedify_plugin_status == 1  ) { 
    	if( $feedify_public_key  && (!empty($feedify_enable_ssl) && $feedify_enable_ssl=='yes' ) ) { ?>
    	<script  id="feedify_webscript" >
			var feedify = feedify || {};
			window.feedify_options={fedify_url:"https://app.feedify.net/",pkey:"<?php echo esc_js($feedify_public_key);?>",sw:"<?php echo esc_js(FEEDIFY_SW_PATH); ?>"};
			(function (window, document){
				function addScript( script_url ){
					var s = document.createElement('script');
					s.type = 'text/javascript';
					s.src = script_url;
					document.getElementsByTagName('head')[0].appendChild(s);
				}
				addScript('https://cdn.feedify.net/getjs/feedbackembad-min-3.0.js');

				
			})(window, document);
		</script>
        <?php
    	}else{ ?>
    		<script  id="feedify_webscript" >
				var feedify = feedify || {};
				window.feedify_options={fedify_url:"https://app.feedify.net/",sw:"<?php echo esc_js(FEEDIFY_SW_PATH); ?>"};
				(function (window, document){
					function addScript( script_url ){
						var s = document.createElement('script');
						s.type = 'text/javascript';
						s.src = script_url;
						document.getElementsByTagName('head')[0].appendChild(s);
					}
					addScript('https://cdn.feedify.net/getjs/feedbackembad-min-3.0.js');
				})(window, document);
			</script>
    	<?php }
    }
}





function feedify_on_save_post( $post_id, $post, $updated ) {
	
	
	if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'update-post_' . $post_id)) {
     	return $post_id; // Invalid nonce, bail out
 	}

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
    }
	
	if (array_key_exists('send_feedify_notification', $_POST)) {
		if($_POST['send_feedify_notification']=='true'){
				update_post_meta($post_id, 'send_feedify_notification', true);
			}else{
				update_post_meta($post_id, 'send_feedify_notification', false);
			}
    } else {
		update_post_meta($post_id, 'send_feedify_notification', false);
		}
		
    $just_sent_notification = (get_post_meta($post_id, 'feedify_notification_already_sent', true) == true);
	
    if ($just_sent_notification) {
        // Reset our flag
        update_post_meta($post_id, 'feedify_notification_already_sent', false);
    }
	
	feedify_on_transition_post_status($post->post_status, $post->post_status, $post);
}	


function feedify_on_transition_post_status( $new_status, $old_status, $post ) { 
	
		if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'update-post_' . $post->ID)) {
     		return $post->ID; // Invalid nonce, bail out
 		}
	 
	
		if($new_status == 'future' && array_key_exists('send_feedify_notification', $_POST) && $_POST['send_feedify_notification']=='true'){
			update_post_meta($post->ID, 'schedule_send_feedify_notification', true);	
		}
		
    if (!(empty($post) || $new_status !== "publish" || $post->post_type == 'page')) {
		if( get_post_meta($post->ID, 'send_feedify_notification', true) && !get_post_meta($post->ID, 'feedify_notification_already_sent', true) ) {
			
            $feedify_licence_key = get_option('feedify_licence_key');
            $feedify_domain_key = get_option('feedify_domain_key');
            $feedify = new FeedifyAPI($feedify_domain_key, $feedify_licence_key);
			
			$feedify_is_default_logo	= get_option('feedify_is_default_logo');
			$feedify_is_banner_image	= get_option('feedify_is_banner_image');
			$feedify_is_featured_logo	= get_option('feedify_is_featured_logo');
			$feedify_is_word_limit		= get_option('feedify_is_word_limit');
			$feedify_is_msg_send		= get_option('feedify_is_msg_send');
			
			$msg						= wp_strip_all_tags($post->post_content);
			$logo_url					= get_the_post_thumbnail_url($post);
			$banner_url					= '';
			$post_content				= '';
			
			if($feedify_is_default_logo==1){
				$logo_url	= get_option('feedify_is_website_logo');
			}
			if($feedify_is_featured_logo==1){
				$logo_url	= get_the_post_thumbnail_url($post);
			}
			if($feedify_is_banner_image==1){
				$banner_url	= get_the_post_thumbnail_url($post);
			}
			if($feedify_is_word_limit==1){
				$msg	= wp_trim_words($msg, 15, '...');
			}
				
			if($feedify_is_msg_send==1){
				$post_content	= '';
			}else{
				$post_content	= $msg;
			}
				
			
			 $data = array(
                'title' 	=> $post->post_title,
				'msg' 		=> $post_content,
                'url' 		=> get_permalink($post),		
				'sent_web_subscribers'	=> 1,
				'sent_app_subscribers'	=> 1,
				'logo' => $logo_url,
				'image' => $banner_url,
				 'multipart' => 'Y' 
			);
			
			if (array_key_exists('send_feedify_notification', $_POST)) {
				if($_POST['send_feedify_notification']=='true'){
					
			
					if($feedify->FeedifySendPush($data)) {
					
						update_post_meta($post->ID, 'feedify_notification_already_sent', true);
						update_post_meta($post->ID, 'send_feedify_notification', false);
					}
				}
			}
			
        }
    }
}

// 025 - start - 12-05-2021 - schedule push
function feedify_on_schedule_post_status(  $post_id ) { 
	   		$post =get_post($post_id); 
		 	$feedify_licence_key = get_option('feedify_licence_key');
         	$feedify_domain_key = get_option('feedify_domain_key');
         	$feedify = new FeedifyAPI($feedify_domain_key, $feedify_licence_key);
			$feedify_is_default_logo	= get_option('feedify_is_default_logo');
			$feedify_is_banner_image	= get_option('feedify_is_banner_image');
			$feedify_is_featured_logo	= get_option('feedify_is_featured_logo');
			$feedify_is_word_limit		= get_option('feedify_is_word_limit');
			$feedify_is_msg_send		= get_option('feedify_is_msg_send');
			$msg						= wp_strip_all_tags($post->post_content);
			$logo_url					= get_the_post_thumbnail_url($post);
			$banner_url					= '';
			$post_content				= '';
			if($feedify_is_default_logo==1){
				$logo_url	= get_option('feedify_is_website_logo');
			}
			if($feedify_is_featured_logo==1){
				$logo_url	= get_the_post_thumbnail_url($post);
			}
			if($feedify_is_banner_image==1){
				$banner_url	= get_the_post_thumbnail_url($post);
			}
			if($feedify_is_word_limit==1){
				$msg	= wp_trim_words($msg, 15, '...');
			}
			if($feedify_is_msg_send==1){
				$post_content	= '';
			}else{
				$post_content	= $msg;
			}
            $data = array(
                'title' 	=> $post->post_title,
				'msg' 		=> $post_content,
                'url' 		=> get_permalink($post),
                'logo' 	=> $logo_url,
				'image' => $banner_url,
				'sent_web_subscribers'	=> 1,
				'sent_app_subscribers'	=> 1,
				 'multipart' => 'Y' 
			);
		


 				if(get_post_meta($post->ID, 'schedule_send_feedify_notification', true)){

					if($feedify->FeedifySendPush($data)) {

					
						update_post_meta($post->ID, 'feedify_notification_already_sent', true);
						update_post_meta($post->ID, 'send_feedify_notification', false);
						update_post_meta($post->ID, 'schedule_send_feedify_notification', false);
					}
 				}

	
           
        
    
}

// 025 -  end  - 12-05-2021 - schedule push

function feedify_send_push_to_server() {
	
		$nonce = isset($_REQUEST['_wpnonce']) ? sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])) : '';
	if ( ! wp_verify_nonce( $nonce, 'feedify_nonce' ) ) {
		wp_redirect( admin_url( '/admin.php?page=feedify-send-push&feedify_error='.urlencode('Not Valid CSRF Token')));
 		 exit; 
	}

    $feedify_licence_key = get_option('feedify_licence_key');
    $feedify_domain_key = get_option('feedify_domain_key');
    $feedify = new FeedifyAPI($feedify_domain_key, $feedify_licence_key);
    $data = array(
        'title'		=>isset($_POST['push_title']) ? sanitize_text_field(wp_unslash($_POST['push_title'])) : '',
        'msg'		=>isset($_POST['push_message']) ? sanitize_textarea_field(wp_unslash($_POST['push_message'])) : '',
        'url'		=>isset($_POST['push_url']) ? esc_url_raw(wp_unslash($_POST['push_url'])) : '',
        'logo'	=>isset($_POST['push_icon']) ? esc_url_raw(wp_unslash($_POST['push_icon'])) : '',
		'sent_web_subscribers'	=> 1,
		'sent_app_subscribers'	=> 1,
		 'multipart' => 'Y' 
    );
	
	
	

    if($feedify->FeedifySendPush($data)) {
        wp_redirect( admin_url( '/admin.php?page=feedify-send-push&feedify_msg='.urlencode('Push Queued').'&_wpnonce='.wp_create_nonce('feedify_nonce') ) );
        exit;
    } else {
        wp_redirect( admin_url( '/admin.php?page=feedify-send-push&feedify_error='.urlencode('Error sending push').'&_wpnonce='.wp_create_nonce('feedify_nonce') ) );
        exit;
    }


}

function feedify_meta_box_add(){
    add_meta_box( 'feedify-meta-box-id', 'Feedify Push Notifications', 'feedify_meta_box_cb', 'post', 'side', 'high' );
}

function feedify_meta_box_cb($post) {
    $meta_box_checkbox_send_notification = true;
    if($post) {
        $meta_box_checkbox_send_notification = get_post_meta($post->ID, 'send_feedify_notification', true);
    }
    	$feedify_domain_key = get_option('feedify_domain_key');
	$feedify_licence_key = get_option('feedify_licence_key');

 	$feedify = new FeedifyAPI($feedify_domain_key, $feedify_licence_key);
    
	$sub_limit = $feedify->FeedifyCheckSubscribers();
   

	if($sub_limit && $sub_limit == 'Expire') {
    	?>
    	<?php /*?>
		<input type="checkbox" id="s_f_noti" disabled>
       	<label for="s_f_noti">Send notification on post publish</label>
        <div style="color:red;">Upgrade your plan</div>
		<?php */?>
		<input type="checkbox" id="openModalBtn" value="true" <?php if ($meta_box_checkbox_send_notification) { echo "checked"; } ?>>
        <label for="s_f_noti">Send notification on post publish</label>
		<style>
			/* Modal overlay */
			.feedify_mod-overlay {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			z-index: 1000;
			}

			/* Modal content */
			.feedify_mod {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 90%;
			max-width: 500px;
			background: white;
			border-radius: 8px;
			padding: 20px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
			z-index: 1001;
			}

			/* Close button */
			.feedify_mod .close-btn {
			background: none;
			border: none;
			font-size: 1.5rem;
			font-weight: bold;
			color: #333;
			position: absolute;
			top: 10px;
			right: 10px;
			cursor: pointer;
			}

			/* Modal header and content */
			.feedify_mod-header {
			font-size: 1.25rem;
			margin-bottom: 15px;
			}

			.feedify_mod-content {
			font-size: 1rem;
			line-height: 1.5;
			}

			/* Show feedify_mod */
			.feedify_mod-overlay.active {
			display: block;
			}
		</style>
		<div class="feedify_mod-overlay" id="feedify_modOverlay">
			<div class="feedify_mod">
			<button type="button" class="close-btn" id="closeModalBtn">&times;</button>
			<div class="feedify_mod-header">Feedify Push Notifications</div>
			<div class="feedify_mod-content">
					You have reached the subscriber limit for sending push notifications. Please <a href="https://app.feedify.net/login" target="_blank" title="login"> upgrade </a> your plan to continue.
			</div>
			</div>
		</div>
		<script>
			const openModalBtn = document.getElementById('openModalBtn');
			const closeModalBtn = document.getElementById('closeModalBtn');
			const feedify_modOverlay = document.getElementById('feedify_modOverlay');

			// Open feedify_mod
			openModalBtn.addEventListener('click', () => {
			feedify_modOverlay.classList.add('active');            
			});

openModalBtn.addEventListener("click", function(event) {
    event.preventDefault(); // Stops the default check action
});
			// Close feedify_mod
			closeModalBtn.addEventListener('click', () => {
			feedify_modOverlay.classList.remove('active');
			});

			// Close feedify_mod by clicking outside the feedify_mod content
			feedify_modOverlay.addEventListener('click', (event) => {
			if (event.target === feedify_modOverlay) {
				feedify_modOverlay.classList.remove('active');
			}
			});
		</script>
    	<?php
     }else{
    	?>
    	<input type="checkbox" name="send_feedify_notification" id="s_f_noti" value="true" <?php if ($meta_box_checkbox_send_notification) { echo "checked"; } ?>>
        <label for="s_f_noti">Send notification on post publish</label>
    	<?php
    }
	/****************BabyPNG ad block*************/
	include_once(ABSPATH . 'wp-admin/includes/plugin.php');

	$plugin_path = 'babypng/babypng.php';

	if (!array_key_exists($plugin_path, get_plugins())) {
		echo'<div style="padding:10px; margin-top:10px; border:5px solid #fdf0c4;">';
		echo'<h4 style="margin-top:0px;">Compress & optimize your images with BabyPNG!</h4>';
		echo'<p>Use code <b>BABYPNG001</b> for 1 month free access.</p>';
		echo'<p><a href="'.get_site_url().'/wp-admin/plugin-install.php?s=babypng&tab=search&type=term" target="_blank">Don’t wait - Install the plugin today!

	</a></p>';
		echo'</div>';
		return false;
	} elseif (!is_plugin_active($plugin_path)) {
		//echo '<div class="notice notice-warning"><p>The required plugin is installed but not active.</p></div>';
		//return false;
	} else {
		
	}	
	/****************BabyPNG ad block*************/
}

function feedify_admin_notice() {
	
	
	if ( isset($_GET['feedify_msg']) || isset($_GET['feedify_error']) ) {
    if ( isset($_GET['_wpnonce']) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'feedify_nonce' ) ) {
        if ( isset($_GET['feedify_msg']) ) {
            ?>
            <div class="notice notice-success is-dismissible">
                <p><?php echo esc_html( sanitize_text_field( wp_unslash( $_GET['feedify_msg'] ) ) ); ?></p>
            </div>
            <?php
        } elseif ( isset($_GET['feedify_error']) ) {
            ?>
            <div class="notice notice-error is-dismissible">
                <p><?php echo esc_html( sanitize_text_field( wp_unslash( $_GET['feedify_error'] ) ) ); ?></p>
            </div>
            <?php
        }
    } else {
        // Optionally handle nonce verification failure
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php esc_html( 'Invalid request. Please try again.', 'your-text-domain' ); ?></p>
        </div>
        <?php
    }
}


}

function feedify_save_push_settings() {
	$nonce = isset($_REQUEST['_wpnonce']) ? sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])) : '';
	if ( ! wp_verify_nonce( $nonce, 'feedify_nonce' ) ) {
		wp_redirect( admin_url( '/admin.php?page=feedify-push-settings&feedify_error='.urlencode('Not Valid CSRF Token')));
 		 exit; 
	}

	$feedify_is_default_logo	= isset($_POST['feedify_is_default_logo']) ? sanitize_text_field(wp_unslash($_POST['feedify_is_default_logo'])) : '';
	$feedify_is_banner_image	= isset($_POST['feedify_is_banner_image']) ? sanitize_text_field(wp_unslash($_POST['feedify_is_banner_image'])) : '';
	$feedify_is_featured_logo	= isset($_POST['feedify_is_featured_logo']) ? sanitize_text_field(wp_unslash($_POST['feedify_is_featured_logo'])) : '';
	$feedify_is_word_limit		= isset($_POST['feedify_is_word_limit']) ? sanitize_text_field(wp_unslash($_POST['feedify_is_word_limit'])) : '';
	$feedify_is_msg_send		= isset($_POST['feedify_is_msg_send']) ? sanitize_text_field(wp_unslash($_POST['feedify_is_msg_send'])) : '';
	
    $feedify_is_website_logo 	= isset($_POST['custom_image_url']) ? esc_url_raw(wp_unslash($_POST['custom_image_url'])) : '';
	$custom_image_url_type		= isset($_POST['custom_image_url_type']) ? esc_url_raw(wp_unslash($_POST['custom_image_url_type'])) : '';
	$myprefix_image_id 			= isset($_POST['myprefix_image_id']) ? sanitize_text_field(wp_unslash($_POST['myprefix_image_id'])) : '';
	
	
	
	if($feedify_is_default_logo==1){
			update_option( 'feedify_is_default_logo', 1);
		}else{
			update_option( 'feedify_is_default_logo', 0);
		}
	
	if($feedify_is_banner_image==1){
		update_option( 'feedify_is_banner_image', 1);
		}else{
			update_option( 'feedify_is_banner_image', 0);
		}
	
	if($feedify_is_featured_logo==1){
		update_option( 'feedify_is_featured_logo', 1);
		}else{
			update_option( 'feedify_is_featured_logo', 0);
		}
	
	if($feedify_is_word_limit==1){
		update_option( 'feedify_is_word_limit', 1);
		}else{
			update_option( 'feedify_is_word_limit', 0);
		}
		
	if($feedify_is_msg_send==1){
		update_option( 'feedify_is_msg_send', 1);
		}else{
			update_option( 'feedify_is_msg_send', 0);
		}
		
	if(empty($feedify_is_website_logo)){
			wp_redirect( admin_url( '/admin.php?page=feedify-push-settings&feedify_error='.urlencode('Please Select logo').'&_wpnonce='.wp_create_nonce('feedify_nonce')));
		}else{
			update_option( 'feedify_is_website_logo', $feedify_is_website_logo);
			update_option( 'custom_image_url_type', $custom_image_url_type);
			update_option( 'myprefix_image_id', $myprefix_image_id);
			wp_redirect( admin_url( '/admin.php?page=feedify-push-settings&feedify_msg='.urlencode('Settings saved').'&_wpnonce='.wp_create_nonce('feedify_nonce')));
			}
     exit;
        
	}
//Added on 09-07-2024 by eid 044 START
function feedify_register() {
	$nonce = isset($_REQUEST['_wpnonce']) ? sanitize_text_field(wp_unslash($_REQUEST['_wpnonce'])) : '';
	if ( ! wp_verify_nonce( $nonce, 'feedify_nonce' ) ) {
		wp_redirect( admin_url( '/admin.php?page=feedify-settings&feedify_error='.urlencode('Invalid request')));
 		 exit; 
	}
	$feedify_licence_key = get_option('feedify_licence_key') ? get_option('feedify_licence_key') : "";
	$feedify_domain_key = get_option('feedify_domain_key') ? get_option('feedify_domain_key') : "";
	$feedify = new FeedifyAPI($feedify_domain_key, $feedify_licence_key, 'N');
	$data = array(
		'email'		 =>isset($_POST['email']) ? sanitize_text_field(wp_unslash($_POST['email'])) : '',
		'store_name' =>sanitize_textarea_field(get_bloginfo( 'name' )),
		'phone'		 =>isset($_POST['full_number']) ? sanitize_textarea_field(wp_unslash($_POST['full_number'])) : '',
		'store_url'	 =>isset($_POST['store_url']) ? esc_url_raw(wp_unslash($_POST['store_url'])) : '',
		'password'	 =>isset($_POST['password']) ? sanitize_textarea_field(wp_unslash($_POST['password'])) : '',
		'platform'	 =>'wordpress'		
	);
	$result = $feedify->FeedifyRegister($data);
	if(isset($result->licence_key)) {
		
		update_option( 'feedify_licence_key', $result->licence_key);
		update_option( 'feedify_domain_key', $result->domain_key);
		update_option( 'feedify_public_key', $result->public_key);
		update_option( 'feedify_enable_ssl', 'yes');
		wp_redirect(admin_url('admin.php?page=feedify-push-settings&msg=feedify_register&_wpnonce='.wp_create_nonce('feedify_register')));
    	exit;
	} else {
		$_SESSION['error_msg'] = $result;		
	}
}
//Added on 09-07-2024 by eid 044 END

function feedify_run_cmd() { 
	$allowed_functions = array(
		'feedify_save_settings',
		'feedify_send_push_to_server',
		'feedify_save_push_settings',
		'feedify_register'
	);
	
	
	
	$cmdkey = isset( $_REQUEST['feedify_cmd'] ) ? sanitize_text_field(wp_unslash($_REQUEST['feedify_cmd'])) : '' ;

    if ( $cmdkey != '' &&
		in_array($cmdkey, $allowed_functions ) 
        && is_callable($cmdkey) 
        && isset($_REQUEST['_wpnonce']) 
        && wp_verify_nonce(sanitize_text_field( wp_unslash($_REQUEST['_wpnonce'])), 'feedify_nonce') 
        ){
   
         $command = sanitize_text_field($cmdkey);

        call_user_func( $command );
    }
	
	
	
//     if(isset($_REQUEST['feedify_cmd'])) {
//         if( in_array($_REQUEST['feedify_cmd'], $allowed_functions) && is_callable($_REQUEST['feedify_cmd']) ) {
//             call_user_func(sanitize_text_field(wp_unslash($_REQUEST['feedify_cmd'])));
//         }
//     }
}

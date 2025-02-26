<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_admin')) {
	class click_n_chat_popup {
	   public function __construct() {
		  add_action('wp_footer', array( $this, 'popup' ) );
		  add_action('wp_enqueue_scripts', array($this, 'click_n_chat_enqueue_styles'));
	  }
	   
	  function popup() {
			$chat_icon_wp_url = CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png';
			$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
			$click_n_chat_time_zone = get_option('click_n_chat_time_zone');
			$chat_icon_url = $click_n_chat_setting_popup->click_url_type == "whatsapp" ? CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png' :  CLICK_N_CHAT_DIR_URL . 'assets/images/chaticon.png';
			if(get_option('click_n_chat_is_active') == "0")	{return 1;}
			
			$users = $this->click_n_chat_get_available_agents();
			
			$bg_color = $click_n_chat_setting_popup->bg_color;
			if (strpos($click_n_chat_setting_popup->bg_color, 'linear-gradient') !== false) {
				$regex = '/rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)/';
				
				if (preg_match($regex, $click_n_chat_setting_popup->bg_color, $matches)) {
					$rgbColor = "rgb({$matches[1]}, {$matches[2]}, {$matches[3]})";
					$bg_color = $rgbColor;
				}
			}
			$chat_bg_color = $click_n_chat_setting_popup->chat_bg_color;
			if (strpos($click_n_chat_setting_popup->chat_bg_color, 'linear-gradient') !== false) {
				$regex = '/rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)/';
				
				if (preg_match($regex, $click_n_chat_setting_popup->chat_bg_color, $matches)) {
					$rgbColor = "rgb({$matches[1]}, {$matches[2]}, {$matches[3]})";
					$chat_bg_color = $rgbColor;
				}
			}
			$userCounts = sizeof($users);
			
			$click_n_chat_setting_popup_pop_type = $click_n_chat_setting_popup->pop_type;
			
			if($click_n_chat_setting_popup_pop_type == "socialwidgets" && $userCounts == '0')
			{
				$click_n_chat_setting_popup_pop_type = $click_n_chat_setting_popup->socialwidgets_no_availability;
			}

			if($click_n_chat_setting_popup_pop_type == "none")
				return;
			?>

            <div style="display:<?php echo esc_attr($userCounts==0 && $click_n_chat_setting_popup_pop_type == "socialwidgets" ? 'none' : 0) ?>" data-header="<?php echo esc_html($click_n_chat_setting_popup->bg_color); ?>" id="cnc-chatbot-icon" class="cnc-chatbot-icon-<?php echo esc_attr($click_n_chat_setting_popup->popup_position); ?>">
                <img id="cnc-chatbot-icon-img" data-closebg="<?php echo esc_attr( (CLICK_N_CHAT_DIR_URL . 'assets/images/cnccalliconw.png' != $click_n_chat_setting_popup->pop_up_icon && CLICK_N_CHAT_DIR_URL . 'assets/images/chatlefticonlw.png' != $click_n_chat_setting_popup->pop_up_icon) ? $click_n_chat_setting_popup->bg_color : '') ?>" style="border-radius:50%; background:<?php echo esc_attr((CLICK_N_CHAT_DIR_URL . 'assets/images/cnccalliconw.png' == $click_n_chat_setting_popup->pop_up_icon || CLICK_N_CHAT_DIR_URL . 'assets/images/chatlefticonlw.png' == $click_n_chat_setting_popup->pop_up_icon) ? $click_n_chat_setting_popup->bg_color : '') ?>" src="<?php echo esc_html($click_n_chat_setting_popup->pop_up_icon); ?>" alt="Chat">
            </div>
            
        
            <div id="cnc-chatbot-popup" class="<?php echo esc_html($click_n_chat_setting_popup_pop_type == "socialwidgets" ? 'cnc-chatbot-popup-widget' : 'cnc-chatbot-popup') ?> <?php echo esc_html($click_n_chat_setting_popup_pop_type == "socialwidgets" ? 'cnc-chatbot-popup-widget' : 'cnc-chatbot-popup') ?>-<?php echo esc_attr($click_n_chat_setting_popup->popup_position); ?>" style="display:none; min-width:<?php echo esc_html($click_n_chat_setting_popup->popup_width); ?>; <?php echo esc_html($click_n_chat_setting_popup->show_header == "0" ? "border-radius:5px 5px 5px 5px" : ""); ?>;">
                <input type="hidden" name="lid" id="lid" />
                <?php if($click_n_chat_setting_popup->show_header == "1"){ ?>
                <div class="cnc-chatbot-popup-header" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color); ?>; border-radius:<?php echo esc_html($click_n_chat_setting_popup->border_style); ?>; padding:<?php echo esc_html($click_n_chat_setting_popup->header_padding); ?>px;">
                    <h1 class="cnc-text-header" style="color:<?php echo esc_html($click_n_chat_setting_popup->txt_color); ?>"><?php echo wp_kses_post(stripslashes(html_entity_decode($click_n_chat_setting_popup->title))); ?></h1>
                    <h1 class="cnc-text-header-mobile" style="color:<?php echo esc_html($click_n_chat_setting_popup->txt_color); ?>">&nbsp;</h1>
                    <?php 
                    if($click_n_chat_setting_popup_pop_type != "socialwidgets"){
                    ?>
                        <a href="javascript:void(0)" id="refreshImage" style="top:7px;right:25px;position: absolute;"><span class="dashicons dashicons-update-alt cnc-chat-top-icon"></span></a>
                    <?php 
                    }
                    ?>
                    <a href="javascript:void(0)" id="closeImage" style="top:7px;right:5px;position: absolute;"><span class="dashicons dashicons-no cnc-chat-top-icon"></span></a>
                </div>
                <?php } else { ?>
                <div class="cnc-chatbot-popup-header" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color); ?>; box-shadow:none; border-radius:5px 5px 0px 0px; padding:0px;">
                    <?php 
                    if($click_n_chat_setting_popup_pop_type != "socialwidgets"){
                    ?>
                        <a href="javascript:void(0)" id="refreshImage" style="top:7px;right:25px;position: absolute;"><span class="dashicons dashicons-update-alt cnc-chat-top-icon-b"></span></a>
                    <?php 
                    }
                    ?>
                    <a href="javascript:void(0)" id="closeImage" style="top:7px;right:5px;position: absolute;"><span class="dashicons dashicons-no cnc-chat-top-icon-b"></span></a>
                </div>
                <span style="padding:10px"></span>
                <?php } ?>
                
                
                <?php 
                if($click_n_chat_setting_popup_pop_type == "socialwidgets"){
                ?>
                    
                    <div id="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget" style="height: auto; overflow-y: auto;">
                        <?php foreach ($users as $user) : 
                            $click_url = $this->click_n_chat_click_url($user);
                        ?>
                        
                        <a class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-link" href="<?php echo esc_html($click_url); ?>" target="_blank">
                        <div class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-container">
                            <div class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-item">
                                <div class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-icon-div">		
                                    <?php
                                    if($user->user_icon == 'social_icon') {
                                    ?>
                                        <img src="<?php echo esc_html(esc_url(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/'.$user->social_type.'.svg')); ?>" class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-icon" style="border:0px">
                                    <?php
                                    }else{ ?><img src="<?php echo esc_html(esc_url($user->user_icon)); ?>" class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-icon">
                                    <?php } ?>
                                    
                                </div>
                                <div class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-details">
                                    <span class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-designation"><?php echo esc_html(($user->designation)); ?></span>
                                    <span class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-name"><?php echo esc_html(($user->name)); ?></span>
                                    <span class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-description"><?php echo esc_html($user->description); ?></span>
                                </div>
                            </div>
                        </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                <?php
                }else{
                ?>
                    
                    <div class="cnc-chat-container">   
                        <?php 
                        if($click_n_chat_setting_popup->chat_name_start == "1"){
                        ?>
                            <div class="cnc-chat-initial-form">  
                                <input type="text" id="chat-name" placeholder="Your Name" required />  
                                <input type="text" id="chat-phone" placeholder="Your Phone" required />  
                                <input type="email" id="chat-email" placeholder="Your Email" required />  
                                <button id="cnc-start-chat" style="background:<?php echo esc_html($bg_color); ?>;">Start Chat</button>  
                            </div>  
                        <?php
                        }
                        ?>
                        <div class="cnc-chat-body" style="display:none">  
                            <div class="cnc-chat-messages">
                                <div class="cnc-loading-chat" style="display:none">
                                <img src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/loading.gif'); ?>" width="40px" sty alt="Chat">
                                </div>
                            </div> 
                            <div class="cnc-chat-suggestions" id="suggestions">  
                                <?php 
                                $suggestions = $this->click_n_chat_suggestions();
                                foreach($suggestions as $suggestion){
                                ?>
                                <div class="cnc-chat-suggestion-button" style="border: 1px solid <?php echo esc_attr($chat_bg_color)  ?>"><?php echo esc_html($suggestion->query); ?></div>
                                <?php 
                                }
                                ?>
                            </div>  
                        </div>  
                        
                        <div class="cnc-chat-footer" style="display: <?php echo esc_html($click_n_chat_setting_popup->chat_name_start == "1" ? "none" : ""); ?>;">  
                            <textarea type="text" placeholder="Type a message" class="chat-input" style="height:30px;"></textarea>  
                            <button class="cnc-chat-send" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color); ?>;">
                                <svg fill="#FFFFFF" version="1.1" xmlns="http://www.w3.org/2000/svg" 
                                     width="10" height="10" viewBox="0 0 8 8" enable-background="new 0 0 8 8" xml:space="preserve">
                                <rect x="0.016" y="1.68" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 6.2428 2.2389)" width="5.283" height="1.466"/>
                                <rect x="3.161" y="1.604" width="1.683" height="6.375"/>
                                <rect x="2.709" y="1.674" transform="matrix(0.7073 0.7069 -0.7069 0.7073 3.2674 -3.0786)" width="5.284" height="1.465"/>
                                </svg>
                            </button>  
                            
                        </div>  
                    </div>  
                <?php
                }
                ?>
                <center style="color:#000; font-size:11px;"><a target="_blank" style="text-decoration:none; color:#3d3d3d; font-size:.6rem" href="https://www.flag92.com">Powered by Flag92</a></center>
            </div>
            <div id="click_n_chat_greetings_message" style="display:none"><?php print wp_kses_post(stripslashes(html_entity_decode(get_option('click_n_chat_greetings_message')))) ?></div>
        <?php
			 
		}
		 
		function click_n_chat_click_url($user)
		{
			switch($user->social_type)
			{
				case 'whatsapp':
					return "https://wa.me/".str_replace("+", "",$user->cnc_social_id)."?text=".urlencode($user->welcome_message);
				break;
				case 'telegram':
					return "https://telegram.me/".$user->cnc_social_id."?text=".urlencode($user->welcome_message);
				break;
				case 'fb_messenger':
					return $user->cnc_social_id;
				break;
				case 'x':
					return "https://twitter.com/".$user->cnc_social_id;
				break;
				case 'skype':
					return "skype:".$user->cnc_social_id."?chat";
				break;
				case 'instagram':
					return "https://www.instagram.com/".$user->cnc_social_id;
				break;
				case 'snapchat':
					return "https://www.snapchat.com/add/".$user->cnc_social_id;
				break;
				case 'viber':
					return "viber://chat?number=".$user->cnc_social_id;
				break;
				case 'line':
					return $user->cnc_social_id;
				break;
				case 'email':
					return "mailto:".$user->cnc_social_id;
				break;
				case 'sms':
					return "sms:".$user->cnc_social_id;
				break;
				case 'gmap':
					return $user->cnc_social_id;
				break;
				case 'tiktok':
					return "https://www.tiktok.com/".$user->cnc_social_id;
				break;
				case 'slack':
					return $user->cnc_social_id;
				break;
				case 'linkedin':
					return "https://www.linkedin.com/in/".$user->cnc_social_id;
				break;
				case 'vk':
					return "https://vk.me/".$user->cnc_social_id;
				break;
				case 'faceebook':
					return $user->cnc_social_id;
				break;
				case 'youtube':
					return "https://www.youtube.com/".$user->cnc_social_id;
				break;
				case 'pinterest':
					return $user->cnc_social_id;
				break;
				case 'reddit':
					return $user->cnc_social_id;
				break;
				case 'link':
					return $user->cnc_social_id;
				break;
			}
		}
		
		function click_n_chat_enqueue_styles() {
			$theme_version = wp_get_theme()->get('Version');
			wp_enqueue_style('cnc-script-style', CLICK_N_CHAT_DIR_URL .'assets/css/style.css', array(), $theme_version);
			wp_enqueue_script('cnc-script-script', CLICK_N_CHAT_DIR_URL . 'assets/js/script.js', array('jquery'), $theme_version, true); 
			wp_enqueue_script('cnc-script-script-slimscroll', CLICK_N_CHAT_DIR_URL . 'assets/js/jquery.slimscroll.min.js', array('jquery'), '1.0', true);  
			wp_enqueue_style('dashicons');
			$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
			$ajax_data = array(  
				'ajax_url' => admin_url('admin-ajax.php'),  
				'nonce'    => wp_create_nonce( 'ajax-call-nounce' ), 
				'plugin_url' => CLICK_N_CHAT_DIR_URL,
				'auto_reply_method' => $click_n_chat_setting_popup->pop_type == 'socialwidgets' ? ($click_n_chat_setting_popup->socialwidgets_no_availability == "chatgpt" ? "click_n_chat_get_ai_action" : "click_n_chat_get_auto_reply_action"):($click_n_chat_setting_popup->pop_type == "chatgpt" ? "click_n_chat_get_ai_action" : "click_n_chat_get_auto_reply_action"),
				'chat_name_start' => $click_n_chat_setting_popup->chat_name_start,
				'chat_bg_color' => $click_n_chat_setting_popup->chat_bg_color,
				'bg_color' => $click_n_chat_setting_popup->bg_color
			);  		
			wp_localize_script('cnc-script-script', 'click_n_chat_ajax_object ', $ajax_data);  
		}
		
		function click_n_chat_get_available_agents() {
			global $wpdb;
			$query = $wpdb->prepare(
				"SELECT u.* 
				FROM {$wpdb->prefix}cnc_social_users u
				where status=1
				GROUP BY u.id
				ORDER BY u.position"
			);
		
			return $wpdb->get_results($query);
		}
		
		function click_n_chat_suggestions() {
			global $wpdb;
			$query = $wpdb->prepare(
				"SELECT query from wp_cnc_auto_reply where is_suggestion = %d",
				'1'
			);
			return $wpdb->get_results($query);
		}
	}
	
	new click_n_chat_popup();
}
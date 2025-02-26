<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class click_n_chat_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'cnc_chatbot_widget', // Base ID
            __('CNC Chatbot Widget', 'text_domain'), // Name
            array('description' => __('A Custom Chatbot Widget', 'text_domain'),) // Args
        );
		
		add_shortcode('cnc_chatbot_widget', array( $this, 'click_n_chat_chatbot_widget_shortcode' ));
    }

    public function widget($args, $instance) {
        echo wp_kses_post($args['before_widget']);
       
        echo wp_kses_post($this->click_n_chat_chatbot_widget_shortcode('nowidget'));
         
        echo wp_kses_post($args['after_widget']);
    }
	public function click_n_chat_chatbot_widget_shortcode($type) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'cnc_social_users';
		if(get_option('click_n_chat_is_active') == "0")	{return 1;}
		if($type != 'nowidget')
		{
			$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
			$widget_style = $click_n_chat_setting_popup->widget_style;
			$widget_icon_size = $click_n_chat_setting_popup->widget_icon_size;
			
			$users = $wpdb->get_results($wpdb->prepare(
				"SELECT * FROM {$table_name} WHERE is_widget = %s order by position",
				'1'
			));
		}
		else
		{
			$click_n_chat_setting_woocommerce = get_option('click_n_chat_setting_woocommerce');
			$widget_style = $click_n_chat_setting_woocommerce->woo_widget_style;
			$widget_icon_size = $click_n_chat_setting_woocommerce->woo_widget_icon_size;
			
			$users = $wpdb->get_results($wpdb->prepare(
				"SELECT * FROM {$table_name} WHERE is_woo = %s order by position",
				'1'
			));
		}
		$chat_icon_url = $click_n_chat_setting_popup->click_url_type == "whatsapp" ? CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png' :  CLICK_N_CHAT_DIR_URL . 'assets/images/telegram.png';
		
		$widget = '<div id="'. $widget_style .'-cnc-widget-widget">';
		foreach ($users as $user) : 
		
			$click_url = $this->click_url($user);
			
			if($widget_style == 'justicons'){
				$widget .= '<a href="'.esc_html($click_url).'" class="cnc-icon-popup-social-icon" target="_blank"><img width="'. esc_attr($widget_icon_size).'px" height="'. esc_attr($widget_icon_size).'px" src="'.esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/'.$user->social_type.'.svg').'"></a>'; 
			}else{
				
				 
				if($user->user_icon == 'social_icon') {				
					$widget_icon = '<img src="'. esc_html(esc_url(CLICK_N_CHAT_DIR_URL . 'assets/images/svgs/'.$user->social_type.'.svg')).'" class="'.esc_html($widget_style).'-cnc-widget-icon" style="border:0px">';
				
				}else{ 
					$widget_icon = '<img src="'. esc_url($user->user_icon) .'" class="'. esc_html($widget_style) .'-cnc-widget-icon">';
				}  
				
				$widget .= '<a class="'. $widget_style .'-cnc-widget-link" href="'. esc_html($click_url) .'" target="_blank">
				<div class="'. $widget_style .'-cnc-widget-container">
					<div class="'. $widget_style .'-cnc-widget-item">
						<div class="'. $widget_style .'-cnc-widget-icon-div">
							'.$widget_icon.'
						</div>
						<div class="'. $widget_style .'-cnc-widget-details">
							<span class="'. $widget_style .'-cnc-widget-designation">'. esc_html($user->designation) .'</span>
							<span class="'. $widget_style .'-cnc-widget-name">'. esc_html($user->name) .'</span>
							<span class="'. $widget_style .'-cnc-widget-description">'.  esc_html($user->description) .'</span>
						</div>
					</div>
				</div>
				</a><span style="font-size:3px">&nbsp;</span>';
			}
		endforeach;
		$widget .= '</div>';
        
        return $widget;
	}
	
	function click_url($user)
	{
		switch($user->social_type)
		{
			case 'whatsapp':
				return "//api.whatsapp.com/send?phone=".str_replace("+", "",$user->cnc_social_id)."&text=".urlencode($user->welcome_message);
			break;
			case 'telegram':
				return "//telegram.me/".$user->cnc_social_id."?text=".urlencode($user->welcome_message);
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
				return "//www.instagram.com/".$user->cnc_social_id;
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
			case 'link':
				return $user->cnc_social_id;
			break;
		}
	}
}

function click_n_chat_register_chatbot_widget() {
    register_widget('click_n_chat_widget');
}
add_action('widgets_init', 'click_n_chat_register_chatbot_widget');

function click_n_chat_display_chatbot_widget_on_product_page() {
    the_widget('click_n_chat_widget');
}

$click_n_chat_setting_woocommerce = get_option('click_n_chat_setting_woocommerce');
if($click_n_chat_setting_woocommerce->woocommerce != "none")
{
	add_action($click_n_chat_setting_woocommerce->woocommerce, 'click_n_chat_display_chatbot_widget_on_product_page', 15);
}

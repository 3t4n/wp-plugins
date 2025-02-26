<?php 

$notifs_bar_font_size  = (array)get_option('new_settings');
$notifs_bar_font_weight  = (array)get_option('new_settings');
$notifs_bar_bg_color = (array)get_option('new_settings');
$notifs_bar_font_color  = (array)get_option('new_settings');
$notifs_btn_bg_color  = (array)get_option('new_settings');
$notifs_btn_bg_hover_color  = (array)get_option('new_settings');
$notifs_btn_font_color  = (array)get_option('new_settings');
$notifs_btn_font_hover_color  = (array)get_option('new_settings');
$notifs_icon_bg_color  = (array)get_option('new_settings');
$notifs_icon_bg_hover_color  = (array)get_option('new_settings');
$notifs_icon_font_color  = (array)get_option('new_settings');
$notifs_icon_font_hover_color  = (array)get_option('new_settings');
$notifs_bar_btn_border  = (array)get_option('new_settings');
$notifs_bar_icon_border  = (array)get_option('new_settings');
$notifs_bar_icon_size  = (array)get_option('new_settings');
$notifs_open_icon_bg_color  = (array)get_option('new_settings');
$notifs_open_icon_font_color  = (array)get_option('new_settings');

// All the user input CSS settings as set in the plugin settings 
$notifs_bar_position  = (array)get_option('new_settings');
if ( isset( $notifs_bar_position['select-global-position'] ) ) :
    $envy_notifs_global = $notifs_bar_position['select-global-position'];
else :
    $envy_notifs_global = '';
endif;

$notifs_bar_height  = (array)get_option('new_settings');

if( isset( $notifs_bar_height['notifs-bar-top-bottom-height'] ) ) :
    $notifs_bar_height_new  = $notifs_bar_height['notifs-bar-top-bottom-height'];
else: $notifs_bar_height_new = '';
endif;

if ( isset( $envy_notifs_custom_css ) ) :
	echo esc_html__( $envy_notifs_custom_css );
else :
    $envy_notifs_custom_css = '';
endif;

if( $envy_notifs_global == 'popup' || $envy_notifs_global == 'top' || $envy_notifs_global == 'bottom' || $envy_notifs_global == 'leftside' || $envy_notifs_global == 'rightside' ) : 

    $envy_notifs_custom_css = ' 
        .mc4wp-form, .mc4wp-form-fields {
        	display: inline !important;
        }
        .mc4wp-form-fields p label {
        	font-size: 0px;
        }   
        .mc4wp-response p {
        	display: none
        }  
        .envynotifs-bar, .envynotifs-bar .envynotifs-details .envynotifsshow, .envynotifs-popup, .envynotifs-left-sidebar, .envynotifs-right-sidebar, .envynotifs-left-sidebar-two, .envynotifs-right-sidebar-two {
            background-color: '.esc_attr($notifs_bar_bg_color["notifs-bar-bg-color"]).' !important;
        }
        .envynotifs-title h2, .envynotifs-time-list li, .envynotifs-subscribe-title, .envynotifs-social, 
        .envynotifs-popup-title h2, .envynotifs-popup-time-list li, .envynotifs-popup-subscribe-title, .envynotifs-popup-social,
         .envynotifs-left-sidebar-title h2, .envynotifs-left-sidebar-time-list li, .envynotifs-left-sidebar-subscribe-title, .envynotifs-left-sidebar-social, 
         .envynotifs-right-sidebar-title h2, .envynotifs-right-sidebar-time-list li, .envynotifs-right-sidebar-subscribe-title, .envynotifs-right-sidebar-social, 
         .envynotifs-left-sidebar-two-title h2, .envynotifs-left-sidebar-two-time-list li, .envynotifs-left-sidebar-two-subscribe-title, .envynotifs-left-sidebar-two-social, 
         .envynotifs-right-sidebar-two-title h2, .envynotifs-right-sidebar-two-time-list li, .envynotifs-right-sidebar-two-subscribe-title, .envynotifs-right-sidebar-two-social {
        	color: '.esc_attr($notifs_bar_font_color["notifs-bar-font-color"]).' !important;
        }
        .envynotifs-title h2, .envynotifs-popup-title h2, .envynotifs-left-sidebar-title h2, .envynotifs-right-sidebar-title h2, .envynotifs-left-sidebar-two-title h2, .envynotifs-right-sidebar-two-title h2 {
		    font-size: '.esc_attr($notifs_bar_font_size['notifs-bar-font-size']).' !important;
		    font-weight: '.esc_attr($notifs_bar_font_size['notifs-bar-font-weight']).' !important;
		}
		.envynotifs-button, .envynotifs-popup-button, .envynotifs-left-sidebar-button, .envynotifs-right-sidebar-button, .envynotifs-left-sidebar-two-button, .envynotifs-right-sidebar-two-button {
		    background-color: '.esc_attr($notifs_btn_bg_color['notifs-btn-bg-color']).' !important;
		    color: '.esc_attr($notifs_btn_font_color['notifs-btn-font-color']).' !important;
		}
		.envynotifs-button:hover, .envynotifs-popup-button:hover, .envynotifs-left-sidebar-button:hover, .envynotifs-right-sidebar-button:hover, .envynotifs-left-sidebar-two-button:hover, .envynotifs-right-sidebar-two-button:hover {
		    background-color: '.esc_attr($notifs_btn_bg_hover_color['notifs-btn-bg-hover-color']).' !important;
		    color: '.esc_attr($notifs_btn_font_hover_color['notifs-btn-font-hover-color']).' !important;
		    border-radius: '.esc_attr($notifs_bar_btn_border['notifs-bar-btn-border']).' !important; 
		}
		.envynotifs-close-button, .envynotifs-popup-close-button, .envynotifs-left-sidebar-close-button, .envynotifs-right-sidebar-close-button, .envynotifs-left-sidebar-two-close-button, .envynotifs-right-sidebar-two-close-button {
		    background-color: '.esc_attr($notifs_icon_bg_color['notifs-icon-bg-color']).' !important;
		    color: '.esc_attr($notifs_icon_font_color['notifs-icon-font-color']).' !important;
		    border-radius: '.esc_attr($notifs_bar_icon_border['notifs-bar-icon-border']).' !important;
		}
		.envynotifs-close-button:hover, .envynotifs-popup-close-button:hover, .envynotifs-left-sidebar-close-button:hover, .envynotifs-right-sidebar-close-button:hover, .envynotifs-left-sidebar-two-close-button:hover, .envynotifs-right-sidebar-two-close-button:hover {
		    background-color: '.esc_attr($notifs_icon_bg_hover_color['notifs-icon-bg-hover-color']).' !important;
		    color: '.esc_attr($notifs_icon_font_hover_color['notifs-icon-font-hover-color']).' !important;
		    border-radius: '.esc_attr($notifs_bar_icon_border['notifs-bar-icon-border']).' !important;
		}
		.envynotifs-close-button i, .envynotifs-popup-close-button i, .envynotifs-left-sidebar-close-button i, .envynotifs-right-sidebar-close-button i, .envynotifs-left-sidebar-two-close-button i, .envynotifs-right-sidebar-two-close-button i {
		    font-size: '.esc_attr($notifs_bar_icon_size['notifs-bar-icon-size']).' !important;
		}
		#notifino-open-close1, #notifino-open-close2, #notifino-open-close3, #notifino-open-close4, #notifino-open-close5, #notifino-open-close6, #notifino-open-close7 {
		    background-color: '.esc_attr($notifs_open_icon_bg_color['notifs-open-icon-bg-color']).' !important;
		    color: '.esc_attr($notifs_open_icon_font_color['notifs-open-icon-font-color']).' !important;
		}
    ';
endif;

wp_add_inline_style( 'envy-notifs-main-css', $envy_notifs_custom_css );

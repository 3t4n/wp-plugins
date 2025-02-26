<?php
class ENBA_HTML
{

    function __construct()
    {
        $enba_event_ID = enba_get_option('enba_countdown_event','enba_general_settings');
        if($enba_event_ID ==0 || $enba_event_ID ==Null ){
           return;
        }
        $enba_position = enba_get_option('enba_position','enba_style_settings')!=Null?enba_get_option('enba_position','enba_style_settings'):'top';
       
        if($enba_position=='top'){
           $position = 'wp_head';
        }
        else{
            $position = 'wp_footer';
        }
		add_action( $position, array($this,'enba_generate_html') );
        add_action( 'wp_enqueue_scripts',array($this,'enba_register_frontend_assets')); //registers js and css for frontend
    		
    }
    

	function enba_generate_html(){
        $html = '';
        global $wp_query;
        $enba_apply_on = enba_get_option('enba_apply_on','enba_general_settings');
        $enba_specific_page = enba_get_option('enba_specific_page','enba_general_settings');
        $enba_event_ID = enba_get_option('enba_countdown_event','enba_general_settings');
        $enba_show_timer = enba_get_option('enba_show_timer','enba_general_settings');
        $enba_show_date = enba_get_option('enba_show_date','enba_general_settings');
        $enba_date_format = enba_get_option('enba_date_format','enba_general_settings');
        $enba_show_venue = enba_get_option('enba_show_venue','enba_general_settings');
        $enba_bg_color = enba_get_option('enba_bg_color','enba_style_settings');
        $enba_text_color = enba_get_option('enba_text_color','enba_style_settings');
        $enba_font_size = enba_get_option('enba_font_size','enba_style_settings');
        $enba_content_width = enba_get_option('enba_content_width','enba_style_settings');
        $enba_banner_layout = enba_get_option('enba_layout','enba_style_settings'); 
        $enba_layout = ($enba_banner_layout!='')?$enba_banner_layout:'style-1'; 
        $enba_position = enba_get_option('enba_position','enba_style_settings')!=Null?enba_get_option('enba_position','enba_style_settings'):'top';
        $enba_behavior = enba_get_option('enba_behavior','enba_style_settings')!=Null?enba_get_option('enba_behavior','enba_style_settings'):'always';
        $enba_scroll_height = enba_get_option('enba_scroll_height','enba_style_settings');
        $enba_scrollH = ($enba_scroll_height!='')?$enba_scroll_height:100;
        $enba_pageid_array= explode(',',$enba_specific_page);
        $event_title = get_the_title( $enba_event_ID );
        $link = tribe_get_event_link( $enba_event_ID );
        $event_venue = tribe_get_venue_details($enba_event_ID);
        $start_date_formated= tribe_get_start_date($enba_event_ID, false, 'd F Y' );
        
        $venue_html = '';
        if(is_array($event_venue) && $enba_show_venue=='yes'){	
            $strip_addr = preg_replace('/\s+/', '', $event_venue['address']);
            $trim_addr = trim(preg_replace('/\s+/', '', $strip_addr));
            $address=strip_tags($trim_addr); 
            if($address!=''){  
                /*if($enba_show_date =='yes'){
                    $venue_html .='<span class="enba-location"> | </span>';
                }   */        
                $venue_html .= '<i class="enba-icon-location"></i>' .$event_venue['linked_name'].'';
            }
        }        

        if ($enba_apply_on=='everywhere' || in_array($wp_query->post->ID,$enba_pageid_array)){
            wp_enqueue_script( 'enba-script-js');  
            wp_enqueue_style( 'enba-styles');
            wp_enqueue_style( 'enba-fontello');

            $enba_width =''; $countdown_html='';
            if($enba_show_timer == 'yes') {
                wp_enqueue_script( 'enba-countdown-js');
                $countdown_html = enba_get_countdown_output($enba_event_ID, $event_title);
                $enba_width = "enba-half";
            } 
            else {
                $enba_width = "enba-full";
            }

            require_once dirname(__FILE__) . '/layouts/enba-'.$enba_layout.'.php'; // require layout file according to layout style($enba_layout)  
        
            $dynamic_styles = enba_dynamic_styles($enba_layout, $enba_bg_color, $enba_text_color, $enba_font_size, $enba_content_width);        

            echo $html . $dynamic_styles;
        }
	}
	
	function enba_register_frontend_assets() 
	{ 		
		wp_register_script( 'enba-countdown-js', ENBA_URL . 'assets/js/enba-countdown.js', array('jquery'), false, true);
        wp_register_script( 'enba-script-js', ENBA_URL . 'assets/js/enba-script.js', array('jquery'), false, true);
        wp_register_style( 'enba-styles', ENBA_URL . 'assets/css/enba-styles.css', array(), null);
        wp_register_style( 'enba-fontello', ENBA_URL . 'assets/css/enba-icons.css', array(), null);
		
    }

    
	
}
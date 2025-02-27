<?php

/*
 *	Plugin Name: text message sms plugin
 *	Plugin URI: http://biztextsolutions.com/
 *	Description: text message by biz text lets your website receive and send text messages. reply to text messages from a pc or forward messages to your mobile phone.
 *	Version: 3.1.0
 *	Author: Biz Text
 *  Author URI: https://www.biztextsolutions.com?ref=wp%20text%20message%20sms%20plugin
 *	License: GPL2
 *
*/

/*
 *	Assign global variables
 *	 
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$plugin_url = plugins_url( '', __FILE__ );

$options = array();

/*
 *	Add a link to our plugin in the admin menu
 *	under 'Settings > Biz Text'
 *
*/

// Check to see if custom role is already in DB

function biztext_custom_role() {
    if ( get_option( 'biztext_custom_role' ) < 1 ) {
        add_role( 'biztext_admin', 'Biz Text Admin', array( 'read' => true, 'level_0' => true ) );
        update_option( 'biztext_custom_role', 1 );
    }
}
add_action( 'init', 'biztext_custom_role' );

function biztext_menu() {

	/*
	 * 	Use the add_options_page function
	 * 	add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
	 *
	*/
	
	// add the capatility to each role
	
    $editor = get_role('editor');
    $admin = get_role('administrator');
    $biztext_admin = get_role('biztext_admin');
    
    $editor->add_cap('biztext_menu_access');
    $admin->add_cap('biztext_menu_access');
    
    
    if ( $biztext_admin != null ) {
    
        $biztext_admin->add_cap('biztext_menu_access');
    
    }

	add_menu_page(
		'Text Message Plugin',
		'Biz Text',
		'biztext_menu_access',
		'biz-text',
		'biztext_options_page',
		'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4IiB2aWV3Qm94PSIwIDAgMTYgMTYiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDE2IDE2IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNFRTgxMjIiIGQ9Ik04LjEyNiwxLjkxOGMtNC40MTEsMC03Ljk5OCwyLjM1Mi03Ljk5OCw1LjI0MWMwLDEuMDM4LDAuNDc4LDIuMDQ4LDEuMzgxLDIuOTI0bDAuMDI0LDAuMDIzbDAuMDI0LDAuMDI1DQoJYzAuMTEyLDAuMTIsMC4yNTgsMC4yNjcsMC4zMTcsMC4zMmMwLjc5LDEsMC4yNywxLjQzMi0wLjk4OSwyLjYzOWMyLjk1NywwLjQzMiw1LjA5OS0wLjk1Miw1LjA5OS0wLjk1Mg0KCWMwLjU2MSwwLjAxNCwxLjEyMiwwLjA3NCwxLjYxNywwLjEyOWgwLjAwM2wwLjAyLDAuMDAxYzAuMzk2LDAuMDQ0LDAuODQ0LDAuMDkzLDEuMjI2LDAuMTAzbDAuMjgzLDAuMDAzDQoJYzMuOTg4LTAuMDA0LDYuOTk1LTIuMjQ0LDYuOTk1LTUuMjE1QzE2LjEyOCw0LjI3LDEyLjUzOCwxLjkxOCw4LjEyNiwxLjkxOHogTTQuMjkxLDcuNzU3Yy0wLjQ0MSwwLTAuODAzLTAuMjk5LTAuODAzLTAuNjY5DQoJYzAtMC4zNjksMC4zNjEtMC42NjksMC44MDMtMC42NjljMC40NDMsMCwwLjgwMiwwLjMsMC44MDIsMC42NjlDNS4wOTMsNy40NTgsNC43MzQsNy43NTcsNC4yOTEsNy43NTd6IE04LjAwMiw4LjI3Nw0KCWMtMC43ODUsMC0xLjQyNC0wLjUzMy0xLjQyNC0xLjE4OGMwLTAuNjU1LDAuNjM5LTEuMTg5LDEuNDI0LTEuMTg5YzAuNzg2LDAsMS40MjQsMC41MzQsMS40MjQsMS4xODkNCglDOS40MjYsNy43NDQsOC43ODgsOC4yNzcsOC4wMDIsOC4yNzd6IE0xMi4yNTgsOC43MzdjLTEuMDkyLDAtMS45NzgtMC43MzgtMS45NzgtMS42NDdjMC0wLjkxLDAuODg2LTEuNjUsMS45NzgtMS42NQ0KCWMxLjA5LDAsMS45NzYsMC43NCwxLjk3NiwxLjY1QzE0LjIzMyw3Ljk5OSwxMy4zNDgsOC43MzcsMTIuMjU4LDguNzM3eiIvPg0KPC9zdmc+DQo=
'
	);
	
	add_submenu_page( 
		'biz-text', 
		'View Conversations', 
		'View Conversations', 
		'biztext_menu_access', 
		'admin.php?page=biz-text&tab=dashboard', 
		'' 
	);
	
	add_submenu_page( 
		'biz-text', 
		'Display on Website', 
		'Display on Website', 
		'biztext_menu_access', 
		'admin.php?page=biz-text&tab=display', 
		'' 
	);
	
	add_submenu_page( 
		'biz-text', 
		'FAQs & Support', 
		'FAQs & Support', 
		'biztext_menu_access', 
		'admin.php?page=biz-text&tab=support', 
		'' 
	);

} 

add_action( 'admin_menu', 'biztext_menu', 1);

// back end styles
function biztext_styles(){

    $my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'wpbiztext.css' ));
    wp_enqueue_style( 'wpbiztext_styles', plugins_url( 'wpbiztext.css', __FILE__ ),'false',$my_css_ver);
	
}

function biztext_scripts()	{
									
    $js_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/biztezt_script.js')); 
    wp_enqueue_script ( 'wpbiztext_script', plugins_url( 'js/biztezt_script.js', __FILE__ ), array('jquery') , $js_ver, true);
    
}

if (isset($_GET['page'])){

	if ($_GET['page'] == "biz-text"){

		add_action( 'admin_print_scripts', 'biztext_scripts' , 5 );
		add_action('admin_head','biztext_styles');
	}

}

function biztext_options_page() {

	if( !current_user_can( 'biztext_menu_access')) {

		wp_die( 'You do not have suggicient permissions to access this page.' );

	}
	
	global $plugin_url;
	global $options;
	
	if (isset( $_POST['wpbiztext-form-submitted'])) {
	
	    $retrieved_nonce = $_REQUEST['_wpnonce'];
        if (!wp_verify_nonce($retrieved_nonce, 'biztext-display-otpions') ) wp_die( 'Failed security check' );
	
		$hidden_field = sanitize_text_field($_POST['wpbiztext-form-submitted']);
		
		
		if ($hidden_field == 'Y' ) {
		
			$wpvbiztext_number = sanitize_text_field($_POST['wpbiztext-btnumber']);
			$wpbiztext_is_active = sanitize_text_field($_POST['wpbiztext-form-activated']);	
			$wpbiztext_link_text = sanitize_text_field($_POST['wpbixtext_text_name']);	
			$wpbiztext_button = sanitize_text_field(htmlentities($_POST['wpbiztext-button-code']));			
			$wpbiztext_link = sanitize_text_field(htmlentities($_POST['wpbiztext-link-code']));	
			$wpbixtext_button_text = sanitize_text_field($_POST['wpbixtext_button_text']);
			$wpbixtext_button_text_color = sanitize_text_field($_POST['btn-color']);
			$wpbixtext_button_color = sanitize_text_field($_POST['btn-bg']);
			$wpbiztext_border_color = sanitize_text_field($_POST['btn-border']);
			$wpbiztext_button_text_size = sanitize_text_field($_POST['button_size']);
			$wpbiztext_button_pad_ver = sanitize_text_field($_POST['button_padding']);
			$wpbiztext_button_pad_hor = sanitize_text_field($_POST['button_padding_horz']);
			$wpbiztext_button_radius = sanitize_text_field($_POST['button_border_radius']);
			$wpbiztext_button_width = sanitize_text_field($_POST['wpbixtext_button_width']);
			$wpbiztext_button_align = sanitize_text_field($_POST['wpbixtext_button_align']);
			$wpbiztext_type = sanitize_text_field($_POST['display_type']);
			$wpbiztext_other_classes = sanitize_text_field($_POST['wpbixtext_link_class']);
			$wpbiztext_link_other_classes = sanitize_text_field($_POST['wpbixtext_link_only_class']);
			$wpbiztext_button_styles = sanitize_text_field($_POST['wpbiztext-styles']);
			$wpbiztext_button_fixed = (isset($_POST["wpbixtext_button_fixed"])) ? 'true' : 'false';
			
			// fixed button options
			
			$wpbiztext_button_fixed_pos = sanitize_text_field($_POST['wpbixtext_button_fixed_position']);
			$wpbiztext_button_fixed_side = sanitize_text_field($_POST['wpbixtext_button_fixed_side']);
			$wpbiztext_button_fixed_zindex = sanitize_text_field(intval($_POST['wpbixtext_button_fixed_zindex']));
			$wpbiztext_button_fixed_dispos = sanitize_text_field(intval($_POST['wpbixtext_button_fixed_distpos']));
			$wpbiztext_button_fixed_disside = sanitize_text_field(intval($_POST['wpbixtext_button_fixed_distside']));
			$wpbiztext_button_fixed_icon = sanitize_text_field($_POST['wpbixtext_button_fixed_icon']);
		
			$options["wpbiztext-form-activated"] = $wpbiztext_is_active;
			$options["wpbixtext-link-text"] = $wpbiztext_link_text;
			$options["wpbixtext-button-text"] = $wpbixtext_button_text;
			$options["wpbixtext-button-text-color"] =  $wpbixtext_button_text_color;
			$options["wpbixtext-button-color"] = $wpbixtext_button_color;
			$options["wpbixtext-button-border-color"] = $wpbiztext_border_color;
			$options["wpbixtext-button-text-size"] = $wpbiztext_button_text_size;
			$options["wpbixtext-button-padding-vertical"] = $wpbiztext_button_pad_ver;
			$options["wpbixtext-button-padding-hor"] = $wpbiztext_button_pad_hor;
			$options["wpbixtext-button-radius"] = $wpbiztext_button_radius;
			$options["wpbixtext-button-width"] = $wpbiztext_button_width;
			$options["wpbixtext-button-align"] = $wpbiztext_button_align;
			$options["wpbixtext-button-styles"] = $wpbiztext_button_styles;
			$options["wpbixtext-link-type"] = $wpbiztext_type;
			$options["wpbixtext-link-classes"] = $wpbiztext_other_classes;
			$options["wpbixtext-link-only-classes"] = $wpbiztext_link_other_classes;
			
			$options["wpbiztext-link-code"] = $wpbiztext_link;
			$options["wpbiztext-button-code"] = $wpbiztext_button;
			$options["wpbiztext-btnumber"] = $wpvbiztext_number;
			$options["wpbixtext_button_fixed"] = $wpbiztext_button_fixed;
			$options["wpbixtext_button_fixed_position"] = $wpbiztext_button_fixed_pos;
			$options["wpbixtext_button_fixed_side"] = $wpbiztext_button_fixed_side;
			$options["wpbixtext_button_fixed_zindex"] = $wpbiztext_button_fixed_zindex;
			$options["wpbixtext_button_fixed_distpos"] = $wpbiztext_button_fixed_dispos;
			$options["wpbixtext_button_fixed_distside"] = $wpbiztext_button_fixed_disside;
			$options["wpbixtext_button_fixed_icon"] = $wpbiztext_button_fixed_icon;
			
			update_option('wpbiztext-button', $options );
			
		}
	
	}
	
	$options = get_option('wpbiztext-button');
	
	
	$biz_lnk_text = isset($options["wpbixtext-link-text"])?$options["wpbixtext-link-text"]:'Text Us at: ';
	$biz_btn_text =  isset($options["wpbixtext-button-text"])?$options["wpbixtext-button-text"]:'Text Our Front Desk';
	$biz_btn_text_color = isset($options["wpbixtext-button-text-color"])?$options["wpbixtext-button-text-color"]:'#000000';
	$biz_btn_color = isset($options["wpbixtext-button-color"])?$options["wpbixtext-button-color"]:'#ffffff';
	$biz_btn_border_color = isset($options["wpbixtext-button-border-color"])?$options["wpbixtext-button-border-color"]:'#000000';
	$biz_btn_text_size = isset($options["wpbixtext-button-text-size"])?$options["wpbixtext-button-text-size"]:'16';
	$biz_btn_pad_ver = isset($options["wpbixtext-button-padding-vertical"])?$options["wpbixtext-button-padding-vertical"]:'5';
	$biz_btn_pad_hor = isset($options["wpbixtext-button-padding-hor"])?$options["wpbixtext-button-padding-hor"]:'5';
	$biz_btn_radius = isset($options["wpbixtext-button-radius"])?$options["wpbixtext-button-radius"]:'0';
	$biz_btn_width = isset($options["wpbixtext-button-width"])?$options["wpbixtext-button-width"]:'inline-block';
	$biz_btn_align = isset($options["wpbixtext-button-align"])?$options["wpbixtext-button-align"]:'left';
	$biz_btn_styles = isset($options["wpbixtext-button-styles"])?$options["wpbixtext-button-styles"]:'border: 2px solid #000000;color:#000000;padding: 5px 5px;';
	$biz_btn_type = isset($options["wpbixtext-link-type"])?$options["wpbixtext-link-type"]:'display_button';
	
	$biz_link_class = isset($options["wpbixtext-link-classes"])?$options["wpbixtext-link-classes"]:'';
	$biz_link_only_class = isset($options["wpbixtext-link-only-classes"])?$options["wpbixtext-link-only-classes"]:'';
	
	$biz_text_number = isset($options["wpbiztext-btnumber"])?$options["wpbiztext-btnumber"]:'';
	
	$biztext_status = isset(($options["wpbiztext-form-activated"]))?($options["wpbiztext-form-activated"] == "Y") ? "Your Button / Link is Currently Active" : "Your Button / Link is Currently Deactivated" : "Your Button / Link is Currently Deactivated";
  $biztext_status_class = isset(($options["wpbiztext-form-activated"]))?($options["wpbiztext-form-activated"] == "Y") ? "notice-success" : "notice-error" : "notice-error";

	$bizbutton = isset(($options['wpbiztext-button-code']))?$options['wpbiztext-button-code']:"";
	
	// fixed options
	
	$biz_button_fixed = isset($options["wpbixtext_button_fixed"])?$options["wpbixtext_button_fixed"] :'false';
	$biz_button_fixed_pos = isset($options["wpbixtext_button_fixed_position"])?$options["wpbixtext_button_fixed_position"] :'bottom';
	$biz_button_fixed_side = isset($options["wpbixtext_button_fixed_side"])?$options["wpbixtext_button_fixed_side"] :'left';
	$biz_button_fixed_zindex = isset($options["wpbixtext_button_fixed_zindex"])?$options["wpbixtext_button_fixed_zindex"] : 500;
	$biz_button_fixed_dispos = isset($options["wpbixtext_button_fixed_distpos"])?$options["wpbixtext_button_fixed_distpos"] : 20;
	$biz_button_fixed_disside = isset($options["wpbixtext_button_fixed_distside"])?$options["wpbixtext_button_fixed_distside"] : 20;
	$biz_button_fixed_icon = isset($options["wpbixtext_button_fixed_icon"])?$options["wpbixtext_button_fixed_icon"] : "false";
	$wpvbiztext_number = "";
	
	
	
	if (isset($_GET['tab'])){

		if ($_GET['tab'] == "dashboard"){

			 $open = 'dashboard';
	 
		}

		if ($_GET['tab'] == "display"){

			 $open = "display";
	 
		}

		if ($_GET['tab'] == "support"){

			 $open = "support";
	 
		}


	} else {

		$open = 'dashboard';

	}
	

	require('inc/options-page-wrapper.php');

}

/* widget example https://codex.wordpress.org/Function_Reference/register_widget */

class Biztext_Widget extends WP_Widget {

	function __construct() {
        // Instantiate the parent object
        parent::__construct( false, __( 'Biz Text Widget', 'wpb_widget_domain' ),
        array('customize_selective_refresh' => true, 'description' =>  'Display your Biz Text Number link or button',) );
    }

	function widget( $args, $instance ) {
		// Widget output
		
		extract( $args );
		$title = apply_filters('widget_title' , $instance['title']);
		$display_devices = $instance['display_devices'];
		$display_type = $instance['wpbiztext_widget_display'];
		$display_fixed = $instance['display_fixed'];
		$display_fixed_icon = $instance['display_fixed_icon'];
		
		$wpbiztext_widget_id="";
		$wpbiztext_shortcode_div="";
		
		/*check if options are set*/	
		$options = get_option('wpbiztext-button');
		$bizbutton_width = isset($options["wpbixtext-button-width"])?$options["wpbixtext-button-width"]:"";
		
		// add widget to button div
		if ($display_type == "link") {
	
			$bizbutton = str_replace (['display:none', 'display: none'],'display:inline-block' , biztext_removeslashes(html_entity_decode(isset($options["wpbiztext-link-code"])?$options["wpbiztext-link-code"]:"")));
			$biz_noshow = "biztext_preview_link";

		} else {
		
		
			$bizbutton = str_replace (['display:none', 'display: none'],$bizbutton_width , biztext_removeslashes(html_entity_decode(isset($options["wpbiztext-button-code"])?$options["wpbiztext-button-code"]:"" )) );
			$biz_noshow = "biztext_preview";
		
		}
		
		$displayDev = ($display_devices == 1)? "all" : ""; 
		
		$biztext_activated = isset($options["wpbiztext-form-activated"])?$options["wpbiztext-form-activated"]:"N";
		
		// fixed button options
	    $biz_button_fixed_pos = isset($options["wpbixtext_button_fixed_position"])?$options["wpbixtext_button_fixed_position"]:"";
	    $biz_button_fixed_side = isset($options["wpbixtext_button_fixed_side"])?$options["wpbixtext_button_fixed_side"]:"";
	    $biz_button_fixed = isset($options["wpbixtext_button_fixed"])?$options["wpbixtext_button_fixed"]:"";
	    $biz_button_fixed_zindex = isset($options["wpbixtext_button_fixed_zindex"])?$options["wpbixtext_button_fixed_zindex"]:"";
	    
	    $biz_button_fixed_dispos = isset($options["wpbixtext_button_fixed_distpos"])?$options["wpbixtext_button_fixed_distpos"]:"";
	    $biz_button_fixed_disside = isset($options["wpbixtext_button_fixed_distside"])?$options["wpbixtext_button_fixed_distside"]:"";
	    $biz_button_fixed_widthuse = isset($options["wpbixtext-button-width"])?($options["wpbixtext-button-width"] == "block")? "100%" : "auto" :"";
	    $biz_text_number = isset($options['wpbiztext-btnumber'])?$options['wpbiztext-btnumber']:"";
	    $biz_button_fixed_icon_colour = isset($options['wpbixtext-button-text-color'])?$options['wpbixtext-button-text-color']:"";
	    $biz_button_fixed_icon_bg = isset($options["wpbixtext-button-color"])?$options["wpbixtext-button-color"]:"";
	    
	    if ($biz_button_fixed == "true"){
	        //select size of icon
	    
	        switch ($options["wpbixtext_button_fixed_icon"]) {
                case "false":
                    $biz_button_fixed_icon = "false" ;
                    break;
                case "xsmall":
                    $biz_button_fixed_icon = 50;
                    break;
                case "small":
                    $biz_button_fixed_icon = 75 ;
                    break;
                case "medium":
                    $biz_button_fixed_icon = 100 ;
                    break;
                case "large":
                    $biz_button_fixed_icon = 125 ;
                    break;
                case "xlarge":
                    $biz_button_fixed_icon = 150 ;
                    break;
   
            }
	    
	    } else {
	    
	        $biz_button_fixed_icon = "false" ;
	    
	    }
	    
	    if ($display_fixed_icon != "false" && $biz_button_fixed == "false"){
		
		    switch ($display_fixed_icon) {

                case "xsmall":
                    $biz_button_fixed_icon = 50;
                    break;
                case "small":
                    $biz_button_fixed_icon = 75 ;
                    break;
                case "medium":
                    $biz_button_fixed_icon = 100 ;
                    break;
                case "large":
                    $biz_button_fixed_icon = 125 ;
                    break;
                case "xlarge":
                    $biz_button_fixed_icon = 150 ;
                    break;
            
            }
		
		} 
        
	    if ($display_fixed == 1 && $biz_button_fixed =="false" ){
		
			 $biz_button_fixed = "true";
	
		}
		$wpbiztext_widget_id = $this->id;
		$isShortCode = false;
		if ($biztext_activated == "Y"){
	
			require('inc/front-end.php');
	
		}
		
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
    	$instance = $old_instance;
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['display_devices'] =isset($new_instance['display_devices'])? strip_tags($new_instance['display_devices']):null;
    	$instance['wpbiztext_widget_display'] = isset($new_instance['wpbiztext_widget_display'])?strip_tags($new_instance['wpbiztext_widget_display']):null;
    	$instance['display_fixed'] =isset($new_instance['display_fixed'])? strip_tags($new_instance['display_fixed']):null;
    	$instance['display_fixed_icon'] = isset($new_instance['display_fixed_icon'])? strip_tags($new_instance['display_fixed_icon']):"";
    
    	return $instance;
	
	}

	function form( $instance ) {
		// Output admin widget options form
		
		if(!isset($instance['title']) || empty($instance['title'])) { 
        $instance['title'] = ""; }
        if(!isset($instance['display_devices']) || empty($instance['display_devices'])) { 
        $instance['display_devices'] = ""; }
        if(!isset($instance['wpbiztext_widget_display']) || empty($instance['wpbiztext_widget_display'])) { 
        $instance['wpbiztext_widget_display'] = ""; }
        if(!isset($instance['display_fixed']) || empty($instance['display_fixed'])) { 
        $instance['display_fixed'] = ""; }
        if(!isset($instance['display_fixed_icon']) || empty($instance['display_fixed_icon'])) { 
        $instance['display_fixed_icon'] = ""; }
		
		$title = esc_attr( $instance['title']);
		$display_devices = esc_attr( $instance['display_devices']);
		$display_type = esc_attr( $instance['wpbiztext_widget_display']);
		$display_fixed = esc_attr( $instance['display_fixed']);
		$display_fixed_icon = esc_attr( $instance['display_fixed_icon']);
		
		$biz_button_fixed = get_option('wpbiztext-button')["wpbixtext_button_fixed"];
		
		
    	require('inc/widget-fields.php');
	}
}

function biztext_register_widget() {
	register_widget( 'Biztext_Widget' );
}

add_action( 'widgets_init', 'biztext_register_widget' );

function biztext_removeslashes($string)
	
	{
		$string=implode("",explode("\\",$string));
		return stripslashes(trim($string));
	}
	

function biztext_shortcode ( $atts, $content, $tag ) {

	global $post;
	
	extract( shortcode_atts( array(
		
		'type' => '',
		'devices' => '',
		'fixed' => '',
		'icon' => ''
		
	), $atts));
	
	$options = get_option('wpbiztext-button');
	$biztext_activated = isset($options["wpbiztext-form-activated"])?$options["wpbiztext-form-activated"]:"";
	$bizbutton_width = isset($options["wpbixtext-button-width"])?$options["wpbixtext-button-width"]:"";
	$biz_button_fixed = isset($options["wpbixtext_button_fixed"])?$options["wpbixtext_button_fixed"]:"";
	$biz_button_fixed_icon = isset($options["wpbixtext_button_fixed_icon"])?$options["wpbixtext_button_fixed_icon"]:"";
	
	$biz_noshow = '';
	
	$title = "short code";
	$before_widget = "short code";
	$before_title = "short code";
	$after_title = "short code";
	$after_widget = "short code";
	$display_width ="";
	$display_type = "";
	$displayDev =  "";
	$BizTextbrowserUsed = "";
	$wpbiztext_widget_id="shortcode";
	$wpbiztext_shortcode_div="";
	
	switch( $tag ) {
        case "BT_BUTTON":
        	$bizbutton = str_replace (['display:none', 'display: none'],$bizbutton_width , biztext_removeslashes(html_entity_decode(isset($options["wpbiztext-button-code"])?$options["wpbiztext-button-code"]:"" )) );
			$biz_noshow = "biztext_preview";
			
			if ($fixed == "true" && $biz_button_fixed == "false"|| $biz_button_fixed == "true"){
			
			    $biz_button_fixed = "true";
			    // fixed button options
                $biz_button_fixed_pos = $options["wpbixtext_button_fixed_position"];
                $biz_button_fixed_side = $options["wpbixtext_button_fixed_side"];
                $biz_button_fixed_zindex = $options["wpbixtext_button_fixed_zindex"];
        
                $biz_button_fixed_dispos = $options["wpbixtext_button_fixed_distpos"];
                $biz_button_fixed_disside = $options["wpbixtext_button_fixed_distside"];
                $biz_button_fixed_widthuse = ($options["wpbixtext-button-width"] == "block")? "100%" : "auto";
                
                if ($icon != "" || $biz_button_fixed_icon != "false"){
                
                    if($biz_button_fixed_icon == "false" || $icon != ""){
                
                        $biz_button_fixed_icon = $icon;
                    
                    }
                
                    $biz_text_number = $options['wpbiztext-btnumber'];
                    $biz_button_fixed_icon_colour = $options['wpbixtext-button-text-color'];
                    $biz_button_fixed_icon_bg = $options["wpbixtext-button-color"];
    
                    switch ($biz_button_fixed_icon) {
                        case "false":
                            $biz_button_fixed_icon = "false" ;
                        break;
                        case "xsmall":
                            $biz_button_fixed_icon = 50;
                            break;
                        case "small":
                            $biz_button_fixed_icon = 75;
                            break;
                        case "medium":
                            $biz_button_fixed_icon = 100;
                            break;
                        case "large":
                            $biz_button_fixed_icon = 125;
                            break;
                        case "xlarge":
                            $biz_button_fixed_icon = 150;
                            break;
                        default:
                            $biz_button_fixed_icon = "false" ;
        
                    }
                   
                } else {
                
                    $biz_button_fixed_icon = "false" ;
                
                
                }
                
			
			}
			
            break;
        case "BT_LINK":
           	$bizbutton = str_replace (['display:none', 'display: none'],'display:inline-block' , biztext_removeslashes(html_entity_decode(isset($options["wpbiztext-link-code"])?$options["wpbiztext-link-code"]:"" )) );
			$biz_noshow = "biztext_preview_link";
            break;

    }
    
    if ($devices == 'all'){
		$displayDev = "all";
	 
	} else {
		$wpbiztext_shortcode_div = "wpbiztext-safari-hide";
		$bizbutton = "<div class='wpbiztext-safari-hide'>" . $bizbutton . "</div>";
	}	

	if ($biz_button_fixed_icon != false){
		$wpbiztext_shortcode_div = "wpbiztext-button-fixed";
	}
	

	if ($biztext_activated == "Y"){
	
		ob_start();
	
		require('inc/front-end.php');
	
		$content = ob_get_clean();
	
		return $content;
	
	} else {
	
	  ob_start();
	
		echo "Active The Biz Text Plugin";
	
		$content = ob_get_clean();
	
		return $content;
	
	
	}

} 

add_shortcode('BT_BUTTON','biztext_shortcode');
add_shortcode('BT_LINK','biztext_shortcode');

?>
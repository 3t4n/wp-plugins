<?php 

/* Plugin Name:Awesome Fontawesome Collection

* Plugin URI: http://www.phoeniixx.com/

* Description: By Using fontawesome icon plugin you can demonstrate icons in your pages and widget area.

* Version: 1.4

* Author: phoeniixx

* Author URI: http://www.phoeniixx.com/

* License: GPLv2 or later

* License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/


if ( ! defined( 'ABSPATH' ) ) exit;
		


			 
			 
	//GENERATE HTML//
	
	$gen_settings = get_option('phoen_icon_with_text');

	if(isset($gen_settings) && $gen_settings == '1'){
				
		add_action( 'wp_enqueue_scripts', 'pregister_plugin_styles', 999 );
						 
		add_action( 'admin_enqueue_scripts', 'pregister_plugin_styles', 999 );
				
	}

	function pregister_plugin_styles() {
				
		global $wp_styles;
		
		wp_enqueue_style('phoeniixx-font-awesome-styles', plugins_url('assets/css/phoeniixx-font-awesome.min.css', __FILE__), array(),'all');
		
		wp_enqueue_style('phoeniixx-font-awesome-ie7', plugins_url('assets/css/phoeniixx-font-awesome-ie7.min.css', __FILE__), array(),'all');
		
		$wp_styles->add_data('phoeniixx-font-awesome-ie7', 'conditional', 'lte IE 7');
	}
  

	
	//Register Icon Button In Editor

	function mregister_buttons_editor($buttons)
	
	{
    
		 ob_start();
		?>
			<span class="phoen-iconpicker phoefontawesome-iconpicker" data-selected="fa-flag">
			
			<a href="javascript:void(0);" class="button button-secondary phoeiconpicker-component">
			
				<span class="fa icon fa-flag icon-flag"></span>&nbsp;
				
				<?php esc_html_e( 'Font Awesome Icon', 'Phoeniixx_Icons' ); ?>
				
				<i class="phoe-change-icon-placeholder"></i>
			</a>
			
		</span>
		
		<?php
		
		
	  	return $buttons;
	}

	//if plugin is not disabled from setting then it register button
	
	if(isset($gen_settings) && $gen_settings == '1'){

		add_action('media_buttons_context','mregister_buttons_editor'); 
	}

	add_action('admin_head','function_icons_assests');
	
	
		include_once(plugin_dir_path(__FILE__).'widget/add_custom_widget.php');	
             
		include_once(plugin_dir_path( __FILE__ ) . 'includes/shortcode.php');

	
	function function_icons_assests(){
		
		wp_enqueue_script( 'wp-color-picker' );
		
		wp_enqueue_style( 'wp-color-picker' );
		
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
		
		wp_enqueue_style( 'phoe_style_icon', plugin_dir_url(__FILE__). "assets/css/fontawesome-iconpicker.css" );
		
		wp_enqueue_script( 'phoe_script_name', plugin_dir_url(__FILE__)."assets/js/fontawesome-iconpicker.js");
		
		wp_enqueue_style( 'phoe_style_icongg', plugin_dir_url(__FILE__). "assets/css/admin.css" );

	}
	
	add_action('admin_menu', 'phoe_iconsetting_menu');
	
	
	//check for mce editor is in edit page but not in widget
		
	global $pagenow;
		
	if (! empty($pagenow) && ('post-new.php' === $pagenow || 'post.php' === $pagenow ))
				
		add_action('admin_enqueue_scripts', 'enqueue_my_scripts');

	function enqueue_my_scripts() {
			
		wp_enqueue_script( 'phoe_script_nameggf', plugin_dir_url(__FILE__)."assets/js/admin.js");
		   
	} 
		
	//Created Menu on dashboard
	
	function phoe_iconsetting_menu() {
		
		add_menu_page('Icons', 'Font Awesome Icons' ,'manage_options','Icons','phoe_iconsetting_page', plugin_dir_url( __FILE__ ).'assets/images/aa2.png' ,'3');
		
	} 


	register_activation_hook( __FILE__, 'phoe_activate_icon_text');
	
	//During activation it save value 1 in wp_option table
	
	function phoe_activate_icon_text()
	{
		
		$enable = get_option('phoen_icon_with_text');
		
		if($enable != 1){
			
			update_option('phoen_icon_with_text','1','yes');
		
		}
		
	}
	
	//admin setting Page
	
	function phoe_iconsetting_page(){
		
		?>
		<div id="profile-page" class="wrap">
		
			<?php
				if(isset($_GET['tab']))
					
				{
					$tab = sanitize_text_field( $_GET['tab'] );
					
				}
				else
					
				{
					
					$tab="";
					
				}
				
			?>
			<h2> Phoeniixx Icons with Texts	</h2>
			
			<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
			
				<a class="nav-tab <?php if($tab == 'setting' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="javascript:void(0);">Settings</a>
				
			</h2>
			
		</div>
		
		<?php
		
		if($tab=='setting' || $tab == '')
			
		{
			
			include_once(dirname(__FILE__).'/includes/adminpagesetting.php');
		
		}
			
} ?>

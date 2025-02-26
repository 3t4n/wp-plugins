<?php 

namespace QSDarkMode\Base;
use QSDarkMode\Base\BaseController;
use QSDarkMode\Utilities\Inc\Helpers;
/**
*  Load Assets 
*/
class Enqueue extends BaseController
{
	public function register() {
		
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ]);
		add_action( 'admin_enqueue_scripts' , [ $this , 'register_scripts' ]);
		// admin
		add_action( 'admin_bar_menu', [ $this, 'admin_switch_menu' ], 1800 );
		add_action( 'admin_enqueue_scripts', array( $this, 'backend_enqueue' ),12 );
		// // frontend
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue' ) );
		add_action( 'wp_enqueue_scripts', [ $this, 'wp_header_scripts' ], 12 );

	    add_action('qs_dark_mode_fnd_custom_css',[$this,'added_custom_css'],10);

		add_action( 'wp_enqueue_scripts', [$this,'inline_header_scripts'],100 );
		
		
	}

	function added_custom_css($handle_name){

        if(!defined('QS_DARK_MODE_PRO')){
		  
			$results = $this->php_string_to_array(qs_dark_mode_custom_css());
            wp_add_inline_style( $handle_name , $this->css_array_to_css( $results ) );
    
		}   
		
	}

	public function admin_switch_menu( \WP_Admin_Bar $admin_bar ){

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
	
		$dark_icon = '<i class="qs-dark-mode-icon"></i>';
		$admin_bar->add_menu( array(
			'id'    => 'qs-dark-mode-dash',
			'parent' => null,
			'group'  => null,
			'title' => sprintf(
				'<div class="qs-dm-toggle qs-dm-skip"> %s </div>',
				 $dark_icon
			),
			'href'  => '#',
			
		) );
	}

	function register_scripts( $handle ){

	
		wp_register_script( 'qs-dark-mode-bkd', $this->plugin_url . 'assets/js/backend.js', array( 'jquery','jquery-ui-tabs','media-upload' ,'thickbox','wp-color-picker'),false, time()); 
		wp_register_script( 'select2', $this->plugin_url . 'assets/js/select2.min.js', array( 'jquery' ),false, time()); 
		//wp_register_script( 'qs-dark-mode-fnd', apply_filters( 'qs_dark_mode_fnd_filter', $this->plugin_url . 'assets/js/frontend.js' ) , array(),false, false); 
		wp_register_script( 'qs-dark-mode-dashboard', $this->plugin_url . 'assets/js/dashboard.js', array(),false, false); 
		
		wp_register_style( 'select2' , $this->plugin_url . 'assets/css/select2.min.css', array(),false, false);
		wp_register_style( 'qs-dark-mode-bkd' , $this->plugin_url . 'assets/css/backend.css', array(),false, false);
		wp_register_style( 'qs-admin-dark-mode' , $this->plugin_url . 'assets/css/admin-dark-mode.css', array(),false, false);
		wp_register_style( 'qs-dark-mode-fnd' , $this->plugin_url . 'assets/css/frontend.css' , array(),false, time());
		wp_register_style( 'qs-dark-mode-grid' , $this->plugin_url . 'assets/css/grid.css', array( ),false, false);
                        
	}
	
	function backend_enqueue( $handle ) {
		// enqueue all our scripts
	
		
		if( $handle == 'toplevel_page_'.QS_DARK_MODE_SETTING_PATH ) {
			wp_enqueue_style( 'qs-dark-mode-fonts', Helpers::Google_fonts_url(['Roboto:300,400,500,600,700,800']), null, QS_DARK_MODE_LITE_VERSION );
			wp_dequeue_style( 'jquery-ui' );
			wp_dequeue_style( 'learn-press-admin' );
			wp_enqueue_style( 'qs-dark-mode-bkd' );
			wp_enqueue_style( 'qs-dark-mode-bkd' );
	        wp_enqueue_style( 'qs-dark-mode-grid' );
	        wp_enqueue_style( 'select2' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'select2' );
			
			wp_enqueue_script( 'qs-dark-mode-bkd' );
			
			wp_enqueue_media();
        	wp_enqueue_style('thickbox');
            wp_localize_script( 'qs-dark-mode-bkd', 'qs_dark_mode_obj',[
               'active' =>  sanitize_text_field(isset($_GET['tabs'])?$_GET['tabs']:0),
               'js_active_version' =>  apply_filters( 'qs_dark_mode_js_version' , QS_DARK_MODE_LITE_VERSION ),
            ] );
		
			
        }

		$this->dashboard_enqueue();
		
	}

	function frontend_enqueue() {
      
		// enqueue all our scripts
        if( qs_dark_mode_active() ){

			wp_enqueue_style( 'qs-dark-mode-fnd' );
			
		}   
		
	}

	public function inline_header_scripts(){
		if( !qs_dark_mode_active() ){
          return;
		}
    ?>

	  <script>
		var qs_dm_obj = <?php echo json_encode( $this->get_js_localize_options() ); ?>;  
	  	<?php echo qs_dark_mode_get_front_js_content(); ?>
	  </script>	

	<?php
	}



	function dashboard_enqueue() {

		// enqueue all our scripts
        if( qs_dark_mode_dashboard_active() ){

			wp_enqueue_style( 'qs-admin-dark-mode');
			wp_enqueue_script( 'qs-dark-mode-dashboard');
			wp_localize_script( 'qs-dark-mode-dashboard', 'qs_dm_obj',$this->get_js_dash_localize_options());
    	}   
		
	}

	public function get_js_localize_options(){

		 
		 $options = [
			
			'active'                 => qs_dark_mode_active(),
			'default'                => qs_dark_mode_default(),
			'switch_enable'          => qs_dark_mode_switch_enable(),
			'switch_preset'          => qs_dark_mode_switch_preset(),
			'custom_element_exclude' => qs_dark_mode_custom_element_exclude(),
			'custom_element_include' => qs_dark_mode_custom_element_include(),
			'switch_light_image'     => function_exists('qs_dark_mode_switch_light_image')?qs_dark_mode_switch_light_image():'',
			'switch_dark_image'      => function_exists('qs_dark_mode_switch_dark_image')? qs_dark_mode_switch_dark_image():'',
			'switch_dark_text'       => qs_dark_mode_switch_dark_text(),
			'switch_light_text'      => qs_dark_mode_switch_light_text(),
		

			'theme_box_shadow'   => qs_dark_mode_theme_box_shadow(),
			'background_color'   => qs_dark_mode_theme_background_color(),
			'text_color'         => qs_dark_mode_theme_text_color(),
			'image_opacity'      => qs_dark_mode_adv_image_opacity(),
			'image_filter'       => qs_dark_mode_adv_image_filter(),
			'image_filter_value' => qs_dark_mode_adv_image_filter_value(),
			'adv_include_custom_element' => qs_dark_mode_adv_include_custom_element(),
			'title_color'        => qs_dark_mode_theme_title_color(),
			'icon_color'         => qs_dark_mode_theme_icon_color(),
			'border_color'       => qs_dark_mode_theme_border_color(),
			'link_color'         => qs_dark_mode_theme_link_color(),
			'button_color'       => qs_dark_mode_theme_button_color(),
			'switch_position'    => qs_dark_mode_switch_position(),
		   
			'theme_custom_color' => function_exists('qs_dark_mode_theme_custom_color') ? qs_dark_mode_theme_custom_color(false):false,
			'qs_dm_lite_version' => '1.0',
			'qs_dark_mode_img'   => QS_DARK_MODE_IMG,
			

		];

		$return_options = apply_filters('qs_dm_localize_options',$options);
		
		return $return_options;
	}

	public function get_js_dash_localize_options(){
        
		$options = [
		   
		   'active'             => qs_dark_mode_dashboard_active(),
		   'default'            => qs_dark_mode_default(),
		   'color_scheme'       => qs_dark_mode_dashboard_color_scheme(),
		   'qs_dm_lite_version' => '1.0',
		   

	   ];

	   $return_options = apply_filters('qs_dm_dash_localize_options',$options);
	   return $return_options;
   }

	function wp_header_scripts(){

		if( !qs_dark_mode_active() ){
           return; 
		}

		wp_add_inline_style( 'qs-dark-mode-fnd', qs_dark_mode_get_front_css_content() );
		do_action( 'qs_dark_mode_fnd_custom_css', 'qs-dark-mode-fnd' );
		?>
        
		<?php
	}
	

}
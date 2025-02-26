<?php
namespace QSDarkMode\Pages;
use QSDarkMode\Base\BaseController;

/**
* Admin Dashboard
*/
class QS_Dark_Mode_Main_Page extends BaseController
{
    use \QSDarkMode\Pages\Traits\Theme_Preset;
    use \QSDarkMode\Pages\Traits\Switch_Style;
    use \QSDarkMode\Pages\Traits\General;
    use \QSDarkMode\Pages\Traits\Custom_Element;
    use \QSDarkMode\Pages\Traits\Custom_Css;
    use \QSDarkMode\Pages\Traits\Advanced;
    use \QSDarkMode\Pages\Traits\Swap_Images;
    private static $instance = null;
	public function __construct() {
		
		add_action( 'admin_menu' , [ $this,'dashboard_menu_page'] );
        add_action( 'network_admin_menu' , [ $this,'dashboard_menu_page'] );

		// settings
		add_action( 'admin_post_qs_dark_mode_general_option' , [ $this,'general_components_options'] ); 
        add_action( 'admin_post_qs_dark_mode_switch_style_options', [ $this,'switch_style_options_save'] ); 
        add_action( 'admin_post_qs_dark_mode_theme_preset_options' , [ $this,'theme_color_preset_options_save'] ); 
        add_action( 'admin_post_qs_dark_mode_custom_element_options' , [ $this,'custom_element_options_save'] ); 
        add_action( 'admin_post_qs_dark_mode_custom_css_options' , [ $this,'custom_css_options_save'] ); 
        add_action( 'admin_post_qs_dark_mode_advanced_options' , [ $this,'advanced_options_save'] ); 
        add_action( 'admin_post_qs_dark_mode_swap_images_options' , [ $this,'swap_images_options_save'] ); 
	}

	public function validate_options($options = [], $all=false){
        
        if(!is_array($options)){
            return $options;
        }
       
        $return_options = [];
      
        foreach( $options as $key => $value ){

            if($all){
                
                if( isset($value['is_pro']) && $value['is_pro'] == 1){
                   
                    $return_options[$key] = 'on'; 
                }else{
                    $return_options[$key] = ''; 
                }
                 
            }else{
                $return_options[$key] = trim(sanitize_text_field($value)); 
            }
           
        }

        return $return_options;
    }

    public function validate_switch_options($options = [], $all=false){
        
        if(!is_array($options)){
            return $options;
        }

        
       
        $return_options = [];
       
        foreach( $options as $key => $value ){

            if($all){
                
                if( $value['type'] == 'switch' ){

                    if( isset($value['is_pro']) && $value['is_pro'] == 1){
                   
                        $return_options[$key] = 'on'; 
                    }else{
                        $return_options[$key] = ''; 
                    }

                }else{
                   
                    if(is_array($value)){
                        $filter_item = [];
                        foreach($value as $k=> $item){
                          $filter_item[$k] = sanitize_text_field($item);
                        }
      
                      $return_options[$key] = $filter_item; 
                  }else{
                      $return_options[$key] = sanitize_text_field($value); 
                  }

                }
               
                 
            }else{
                
               
                if( isset($value['type']) && $value['type'] == 'switch' ){
                  
                    if( isset($value['is_pro']) && $value['is_pro'] == 1) {
                   
                        $return_options[$key] = 'on'; 
                    }else{
                        $return_options[$key] = 'on'; 
                    }

                }else{

                        if(is_array($value)){

                            $filter_item = [];
                            foreach($value as $k=> $item){
                                $filter_item[$k] = sanitize_text_field($item);
                            }
      
                            $return_options[$key] = $filter_item; 
                        }else{
                            $return_options[$key] = sanitize_text_field($value); 
                        }
                }
                
                
            }
           
        }

        return $return_options;
    }
    
   

	public function validate_all_options($options = [], $all = false){
        
        if(!is_array($options)){
            return $options;
        }
               
        foreach( $options as $key => $value ){

            if( $all ){
                
                if( isset($value['is_pro']) && $value['is_pro'] == 1){
                    unset($options[$key]); 
                }else{
                    $options[$key] = 'on'; 
                }
                 
            }else{
                $options[$key] = 'on'; 
            }
           
        }

        return $options;
    }

	public function get_transform_options($options = [], $key = false){

        if( !is_array($options) || $key == false ){
            return $options;
        }

        $db_option      = get_option( $key );
       
        $return_options = $options;
      
        foreach( $options as $key => $value ){

            if($return_options[$key]['type'] == 'switch'){

                if( isset($db_option[$key]) ){
                    $return_options[$key]['default'] = 1; 
                }else{
                    $return_options[$key]['default'] = 0;    
                } 

            }else{
                
                if(isset($db_option[$key])){
                    $return_options[$key]['value'] = $db_option[$key];    
                } 
               
            }
            
        
        }

        return $return_options; 
    }
    public function get_gen_transform_options($options = [], $key = false){

        if( !is_array($options) || $key == false ){
            return $options;
        }

        $db_option      = get_option( $key );
       
        $return_options = $options;
       
        foreach( $options as $key => $value ){
       
            if( isset($db_option[$key]) ){
                $return_options[$key]['value'] = $db_option[$key]; 
            }else{
                $return_options[$key]['value'] = '';    
            }  
        
        }

        return $return_options; 
    }

	public function get_transform_inputs_options($options = [], $key = false){

        if( !is_array($options) || $key == false ){
            return $options;
        }

        $db_option  = esc_html(get_option( $key ));
     
        $return_options = $options;
        
        foreach( $options as $key => $value ){

            if( isset($db_option[$key]) ){
                $return_options[$key]['default'] = $db_option[$key]; 
            }else{
                $return_options[$key]['default'] = '';    
            }

        }
        return $return_options; 
    }

   

	function dashboard_menu_page() {

        add_menu_page( 
            esc_html__( 'Dark Mode' , 'qs-dark-mode' ),
            esc_html__('Dark Mode' , 'qs-dark-mode'),
            'manage_options',
            QS_DARK_MODE_PLUGIN_PATH,
            [$this,'dashboard_menu_page_content'],
            QS_DARK_MODE_IMG . '/icon.svg',
            4
        );
        
        add_submenu_page(
            QS_DARK_MODE_PLUGIN_PATH,
            esc_html__( 'Support', 'qs-dark-mode' ),
            esc_html__( 'Support', 'qs-dark-mode' ),
            'manage_options',
            'https://support.quomodosoft.com/support/login',
            '',
            500
        );

        add_submenu_page(
            QS_DARK_MODE_PLUGIN_PATH,
            esc_html__( 'Documentation', 'qs-dark-mode' ),
            esc_html__( 'Documentation', 'qs-dark-mode' ),
            'manage_options',
            'https://quomodosoft.com/plugins-docs/',
            '',
            500
        );

        if(defined('QS_DARK_MODE_PRO_VERSION')){

            add_submenu_page(
                QS_DARK_MODE_PLUGIN_PATH,
                esc_html__( 'MyAccount', 'qs-dark-mode' ),
                esc_html__( 'My Account', 'qs-dark-mode' ),
                'manage_options',
                'https://quomodosoft.com/my-account/',
                '',
                499
            );

        }

        $installed_plugins = array_keys( get_plugins() );
        if ( in_array('qs-dark-mode-pro/qs-dark-mode-pro.php',$installed_plugins) || in_array('qs-dark-mode-pro-bundle/qs-dark-mode-pro.php',$installed_plugins) ) {

        }else{

            add_submenu_page(
                QS_DARK_MODE_PLUGIN_PATH,
                esc_html__( 'Go Pro', 'qs-dark-mode' ),
                esc_html__( 'Go Pro 🔥', 'qs-dark-mode' ),
                'manage_options',
                QS_DARK_MODE_DEMO_URL,
                '',
                100
            );
        }
       
    
    }

	public static function getInstance(){
        if (self::$instance == null){
            self::$instance = new QS_Dark_Mode_Main_Page();
        }
        return self::$instance;
    }

	public function dashboard_menu_page_content(){
       
        require_once( __DIR__ . '/views/dashboard.php' );
    }
}    

QS_Dark_Mode_Main_Page::getInstance();
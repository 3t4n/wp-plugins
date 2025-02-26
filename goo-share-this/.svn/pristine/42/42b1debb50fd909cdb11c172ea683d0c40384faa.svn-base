<?php
  
  // ------------------ NO DIRECT ACCESS
 if ( !function_exists( 'add_action' ) ) 
     {
        echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
        die();
     }
 
  
    if ( !function_exists('goo_tools_plugin_settings_function') )
        {
            require_once( plugin_dir_path( __FILE__ ) . 'goo_tools.php' );  
        }
  
    add_action('admin_menu', 'goo_share_this_plugin_menu');

    function goo_share_this_plugin_menu() 
        {
            if ( empty ( $GLOBALS['admin_page_hooks']['goo-tools-plugin-settings'] ) )
                {
                    add_menu_page('Goo Tools - Settings', 'Goo Tools Plugins', 'administrator', 'goo-tools-plugin-settings', 'goo_tools_plugin_settings_function', 'dashicons-admin-generic');
                }
            
            add_submenu_page('goo-tools-plugin-settings', 'Goo Share This', 'Goo Share This', 'administrator', 'goo-sharethis-plugin-settings', 'goo_share_this_plugin_settings_f');         
        }
        
    function goo_share_this_plugin_settings_f()
        {
            $plugin_admin = new goo_sharethis_class();
            
            $plugin_admin->html_admin();
            return;
            
        }
        
    add_action( 'admin_init', 'goosh_plugin_settings' );

    function goosh_plugin_settings() 
        {
            
            register_setting( 'goo-sharethis-settings-group', 'goosh_options', 'goosh_option_callback' );  
            
        }
        
    function goosh_option_callback($input)
        {
            $plugin_admin = new goo_sharethis_class();
     
            if ( isset($input['activate']) )
                {
                    $plugin_admin->options['product_info']['amx'] = $input['product_info']['amx'];
                    
                    $response = wp_remote_get( esc_url_raw( 'http://www.gootools.net/product_info/'.'customer_service.php?action=activate&key='.$input['product_info']['amx']).'&product='.str_replace(' ', '',$plugin_admin->options['product_info']['name']).'&location='.esc_url_raw( home_url() ) ); 
                    $solved_response = json_decode($response['body'], true);
						
                    $plugin_admin->amx_a($solved_response);
               
                    return $plugin_admin->options;  
                }   
            
            if ( isset($input['checked']) )
				{
					$opt_passed = unserialize($input['product_data']);
					$plugin_admin->options['product_info'] = $opt_passed;
					return $plugin_admin->options;
				}
            //Social
            foreach ( $plugin_admin->options as $key => $value ) //override NO VALUE from HTML check...
                {
                    if ( isset($plugin_admin->options[$key]['display']) ) { $plugin_admin->options[$key]['display'] = '0'; }
                }
                
            foreach ( $input as $key => $value )
                {
                    if ( isset($plugin_admin->options[$key]['display']) ) { $plugin_admin->options[$key]['display'] = $value['display']; }
                }
            //Effect
            $plugin_admin->options['effect'] = $input['effect'];
            
            //Advaced
            if ( $plugin_admin->amx_c() != $plugin_admin->amx_k() )
                {
                    $plugin_admin->options['shortcode'] = '1';
                    $plugin_admin->options['beggining'] = '0';
                    $plugin_admin->options['bottom'] = '0';
                    $plugin_admin->options['pages'] = '1';
                    
                    $plugin_admin->options['exclude'] = '';  
                }
                else
                {
                    $plugin_admin->options['shortcode'] = ( isset( $input['shortcode']) ) ?  '1' : '0';
                    $plugin_admin->options['beggining'] = ( isset( $input['beggining']) ) ?  '1' : '0';
                    $plugin_admin->options['bottom'] = ( isset( $input['bottom']) ) ?  '1' : '0';
                    $plugin_admin->options['pages'] = ( isset( $input['pages']) ) ?  '1' : '0';
                    
                    $plugin_admin->options['exclude'] = str_replace(',', ', ', str_replace( ' ', '', $input['exclude'] ) );
                }
				
			//product_info
			if ( isset($input['product_info']['check']) ) { $plugin_admin->options['product_info']['check'] = $input['product_info']['check']; }
			  
            return $plugin_admin->options;
            
        }
?>

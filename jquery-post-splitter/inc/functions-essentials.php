<?php

	if(!function_exists('pre')){
		function pre($data){
			if(isset($_GET['debug'])){
				pree($data);
			}
		}	 
	} 
		
	if(!function_exists('pree')){
	function pree($data){
				echo '<pre>';
				print_r($data);
				echo '</pre>';	
		
		}	 
	} 
	
	if(!function_exists('jpps_add_options')){
		function jpps_add_options() {
			global $jps_title;			
			add_options_page($jps_title.' '.__('Settings','wpjps'), $jps_title, 'manage_options', 'jpsoptions', 'jpps_options_page');	
			$jps_title = trim(str_replace('jQuery', '', $jps_title));
			add_submenu_page('edit.php', $jps_title, $jps_title, 'manage_options', 'jpsoptions', 'jpps_options_page' );
			$jps_title = trim(str_replace('Post', 'Page', $jps_title));
			add_submenu_page('edit.php?post_type=page', $jps_title, $jps_title, 'manage_options', 'jpsoptions', 'jpps_options_page' );
		}	
		add_action('admin_menu', 'jpps_add_options');
	}
	if(!function_exists('jps_plugin_links')){
		function jps_plugin_links($links) { 	
			global $jps_premium_link, $jps_premium;	
			$settings_link = '<a href="options-general.php?page=jpsoptions">'.__('Settings','wpjps').'</a>';	
			if($jps_premium){
				array_unshift($links, $settings_link); 
			}else{	
				$jps_premium_link = '<a href="'.esc_url($jps_premium_link).'" title="'.__('Go Premium','wpjps').'" target="_blank">'.__('Go Premium','wpjps').'</a>'; 
				array_unshift($links, $settings_link, $jps_premium_link); 	
			}	
			return $links; 	
		}		
	}
	if(!function_exists('jps_underscore')){
		function jps_underscore($str) { 	
			$str = str_replace(array(' ', '-'), '_', strtolower($str));
			return $str;
		}
	}
	
	function jps_get_post_nav_type($post_nav_type = '', $jps_the_post=array()){
		
		global $jps_premium;
		
		$debug_backtrace = debug_backtrace();
		
		$function = $debug_backtrace[0]['function'];
		$function .= ' / '.$debug_backtrace[1]['function'];
		$function .= ' / '.$debug_backtrace[2]['function'];
		$function .= ' / '.$debug_backtrace[3]['function'];
		$function .= ' / '.$debug_backtrace[4]['function'];
		
		$is_single = is_page();
		$is_page = is_single();
		
		if(wp_doing_ajax() && is_array($jps_the_post) && !empty($jps_the_post)){
			$is_single = $jps_the_post['is_single'];
			$is_page = $jps_the_post['is_page'];
		}		
		
		if($is_single || $is_page){
		
			$default_nav_implementation = 'jQuery';//default
			
			$post_nav_type = get_post_meta( get_the_ID(), 'jps_nav_type', true );
			
			$post_nav_type = (($post_nav_type==$default_nav_implementation || !$jps_premium)?$default_nav_implementation:$post_nav_type);
	
		}

		if($post_nav_type!=''){

            $jpps_nav_implementation = $post_nav_type;

		}else{

            $jpps_nav_implementation = jps_get( 'nav_implementation' );


        }	
		
		//pree($jpps_nav_implementation.' - '.$function);
		
		return $jpps_nav_implementation;	
	}
	
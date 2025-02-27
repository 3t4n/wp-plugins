<?php

/*-----------------------------------------------------------------------------------*/
/* SUEVAFREE IS WOOCOMMERCE ACTIVE */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'suevafree_ek_is_woocommerce_active' ) ) {
	
	function suevafree_ek_is_woocommerce_active( $type = "" ) {
	
        global $woocommerce;

        if ( isset( $woocommerce ) ) {
			
			if ( !$type || call_user_func($type) ) {
            
				return true;
			
			}
			
		}
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* SUEVAFREE WIDGET SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_ek_widget_setting')) {

	function suevafree_ek_widget_setting( $id, $default = '' ) {
	
		if (isset($id)):
		
			return $id;
		
		else:
		
			return $default;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* SUEVAFREE THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_ek_setting')) {

	function suevafree_ek_setting( $id, $default = '' ) {
	
		$suevafree_ek_setting = get_option('sueva_theme_settings');
		
		if(isset($suevafree_ek_setting[$id])):
		
			return $suevafree_ek_setting[$id];
		
		else:
		
			return $default;
		
		endif;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* POSTMETA */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_ek_postmeta')) {

	function suevafree_ek_postmeta( $id, $default = '' ) {
	
		global $post, $wp_query;
		
		if ( suevafree_ek_is_woocommerce_active('is_shop') ) :
	
			$content_ID = get_option('woocommerce_shop_page_id');
	
		else :
	
			$content_ID = $post->ID;
	
		endif;

		$val = get_post_meta( $content_ID , $id, TRUE);
		
		if ( !empty($val) ) :
			
			return $val;
			
		else:
				
			return $default;
			
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* REQUIRE FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_ek_require')) {

	function suevafree_ek_require( $folder ) {
	
		if (isset($folder)) : 
	
			$dir = plugin_dir_path( __FILE__ ) . $folder;  

			$files = scandir($dir);  
				  
			foreach ($files as $key => $value) {  

				if ( !in_array($value,array(".DS_Store",".","..") ) && !strstr( $value, '._' ) ) { 
						
					if ( !is_dir( $dir . $value) ) { 
							
						require_once $dir . $value;
						
					} 
					
				} 

			}  
			
		endif;
		
	}

}

/*-----------------------------------------------------------------------------------*/
/* Socials */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_ek_socials_function')) {

	function suevafree_ek_socials_function() {

		$allowed = array(
			'div' => array(
				'class' => array(),
			),
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array(),
				'target' => array()
			),
			'i' => array(
				'class' => array(),
			)
		);

		$socials = array ( 
			
			"facebook" => array( "icon" => "fa fa-facebook" , "target" => "_blank" ),
			"twitter" => array( "icon" => "fa fa-twitter" , "target" => "_blank" ),
			"flickr" => array( "icon" => "fa fa-flickr" , "target" => "_blank" ),
			"google" => array( "icon" => "fa fa-google-plus" , "target" => "_blank" ),
			"linkedin" => array( "icon" => "fa fa-linkedin" , "target" => "_blank" ),
			"pinterest" => array( "icon" => "fa fa-pinterest" , "target" => "_blank" ),
			"tumblr" => array( "icon" => "fa fa-tumblr" , "target" => "_blank" ),
			"youtube" => array( "icon" => "fa fa-youtube" , "target" => "_blank" ),
			"skype" => array( "icon" => "fa fa-skype" , "target" => "_self" ),
			"instagram" => array( "icon" => "fa fa-instagram" , "target" => "_blank" ),
			"deviantart" => array( "icon" => "fa fa-deviantart" , "target" => "_blank" ),
			"github" => array( "icon" => "fa fa-github" , "target" => "_blank" ),
			"xing" => array( "icon" => "fa fa-xing" , "target" => "_blank" ),
			"whatsapp" => array( "icon" => "fa fa-whatsapp" , "target" => "_self" ),
			"email" => array( "icon" => "fa fa-envelope" , "target" => "_self" ),
		
		);

		$i = 0;
		
		$html  = '<div class="social-buttons">';
		
		foreach ( $socials as $name => $attrs) { 
		
			if ( suevafree_ek_postmeta('wip_team_'.$name ) ): 

				$i++;	
				$html.= '<a href="'.esc_url(suevafree_ek_postmeta('wip_team_'.$name), array( 'http', 'https', 'tel', 'skype', 'mailto' ) ).'" target="'.$attrs['target'].'" title="'.$name.'" class="social"> <i class="'.$attrs['icon'].'" ></i> </a> ';
			
			endif;
			
		}

		$html .= '</div>';

		if ( $i > 0 ) {
			
			echo wp_kses($html, $allowed);
	
		}
		
	}
	
	add_action( 'suevafree_ek_socials', 'suevafree_ek_socials_function', 10, 2 );

}

/*-----------------------------------------------------------------------------------*/
/* CONTACT FORMS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('suevafree_ek_wpcf7_forms')) {

	function suevafree_ek_wpcf7_forms() {
	
        $query_args = array(
            'post_type' => 'wpcf7_contact_form',
            'posts_per_page' => '-1',
        );
        
        $query = new WP_Query( $query_args );
        
		while ( $query->have_posts() ) : $query->the_post(); 
                        
        global $post;
						
		$test[$post->ID] = esc_attr(get_the_title());

        endwhile;
		 
        wp_reset_query();
        wp_reset_postdata();
		
		return $test;

	}

}

?>
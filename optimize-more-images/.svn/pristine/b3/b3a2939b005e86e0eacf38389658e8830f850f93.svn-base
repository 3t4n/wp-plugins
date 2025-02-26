<?php

if (!defined('WPINC')) {
    die;
}

if (!class_exists('LazyCSSbgIMGs') ) {
    
    class LazyCSSbgIMGs {
		
		const LAZY_BGIMGS_CLASS = 'lazyload';
		
        
        public function __construct() {
			
			 if( !is_admin() ){
				
				//Actions
				/**/
				add_action('template_redirect', function () {
				   
                    ob_start(function ($content) {
                        return $this->LazyLoadCSSbgIMGsDiv($content);
                    });
                    ob_start(function ($content) {
                        return $this->LazyLoadCSSbgIMGsSection($content);
                    });
                    
                    
                });
		
			}
        }

        public function LazyLoadCSSbgIMGsDiv($content) {
			
			// Exclude if
			if ( is_user_logged_in() || !opm_img_field_setting('enable_lazy_css_bg_img') ) {
				return $content;
			}
			
			$default_exclude_list = array(
				"no-lazy",
				"skip-lazy"
			);
			
			$lazy_css_bg_img_list = get_option('opm_img_options')['lazy_css_bg_img_include_list'];
			$lazy_css_bg_img_list = explode("\n", str_replace("\r", "", $lazy_css_bg_img_list) );
			
			$lazy_bgimg_class = self::LAZY_BGIMGS_CLASS;
			
			$matches = array();
			preg_match_all( '/<div[\s\r\n]+.*?>/is', $content, $matches );

			$search = array();
			$replace = array();

			$i = 0;
			
			foreach ( $matches[0] as $divTags ) {
			    
			    foreach ($lazy_css_bg_img_list as $replacedivTags) { if ($replacedivTags && strpos($divTags, $replacedivTags) !== false) {
			        
			        $exclude_keywords = get_option('opm_img_options')['lazyload_exclude_list'];
                    $exclude_keywords = explode("\n", str_replace("\r", "", $exclude_keywords));
                
                    $exclude_lazy = array_merge( $default_exclude_list, $exclude_keywords);

					foreach ($exclude_lazy as $exclude) {
						if ( $exclude && strpos($divTags, $exclude) !== false ) {
							continue 2;
						}
					}
        				
        			$replacedivTags = preg_replace( '/<div(.*?)class="/is', '<div$1class="'.esc_html($lazy_bgimg_class).' ', $divTags );
        					
        
        			array_push( $search, $divTags );
        			array_push( $replace, $replacedivTags );
        			}
        		}
 
			}
			

			$search = array_unique( $search );
			$replace = array_unique( $replace );

			$content = str_replace( $search, $replace, $content );
			

		return $content;
			
        } // end LazyLoadCSSbgIMGsDiv
        
        public function LazyLoadCSSbgIMGsSection($content) {
			
			// Exclude if
			if ( is_user_logged_in() || !opm_img_field_setting('enable_lazy_css_bg_img') ) {
				return $content;
			}
			
			$default_exclude_list = array(
				"no-lazy",
				"skip-lazy"
			);
			
			$lazy_css_bg_img_list = get_option('opm_img_options')['lazy_css_bg_img_include_list'];
			$lazy_css_bg_img_list = explode("\n", str_replace("\r", "", $lazy_css_bg_img_list) );
			
			$lazy_bgimg_class = self::LAZY_BGIMGS_CLASS;
			
			$matches = array();
			preg_match_all( '/<section[\s\r\n]+.*?>/is', $content, $matches );

			$search = array();
			$replace = array();

			$i = 0;
			foreach ( $matches[0] as $sectionTags ) {
			    
			    foreach ($lazy_css_bg_img_list as $replacesectionTags) { if ($replacesectionTags && strpos($sectionTags, $replacesectionTags) !== false) {
			        
			        $exclude_keywords = get_option('opm_img_options')['lazyload_exclude_list'];
                    $exclude_keywords = explode("\n", str_replace("\r", "", $exclude_keywords));
                
                    $exclude_lazy = array_merge( $default_exclude_list, $exclude_keywords);

					foreach ($exclude_lazy as $exclude) {
						if ( $exclude && strpos($sectionTags, $exclude) !== false ) {
							continue 2;
						}
					}
        					
        			$replacesectionTags = preg_replace( '/<section(.*?)class="/is', '<section$1class="'.esc_html($lazy_bgimg_class).' ', $sectionTags );
        					
        
        			array_push( $search, $sectionTags );
        			array_push( $replace, $replacesectionTags );
        			}
        		}
 
			}
			

			$search = array_unique( $search );
			$replace = array_unique( $replace );

			$content = str_replace( $search, $replace, $content );
			

		return $content;
			
        } // end LazyLoadCSSbgIMGssection
		        
		
		
    } // end Class


    new LazyCSSbgIMGs();
} // End if class exists statement
<?php

if (!defined('WPINC')) {
    die;
}

class AddLoadingEager {
	
	const EAGER = 'eager';
  
    public function __construct() {
		
		if( !is_admin() ){

			add_action('template_redirect', function () {

				ob_start(function ($content) {
					return $this->AddLoadingEagerImgAttr($content);
				});

				ob_start(function ($content) {
					return $this->AddLoadingEagerIframeAttr($content);
				});

			});

		}
		
    } // end construct

	public function AddLoadingEagerImgAttr($content) {
		
		// Exclude if
		if ( is_user_logged_in() ) {
			return $content;
		}
		
		$default_loading_eager = array(
			"no-lazy",
			"skip-lazy"
		);
		
		$matches = array();
		
		preg_match_all( '@<img(?:(?!loading=).)*?>@', $content, $matches );

		$attr = self::EAGER;

		$search = array();
		$replace = array();

		$i = 0;
		foreach ( $matches[0] as $imgNotLazy ) {

            $loading_eager = get_option('opm_img_options')['lazyload_exclude_list'];
			$loading_eager = explode("\n", str_replace("\r", "", $loading_eager) );
		
			$loading_eager = array_merge( $default_loading_eager, $loading_eager);
                                
        	foreach ($loading_eager as $replaceImgNoLazy) {
				if ($replaceImgNoLazy && strpos($imgNotLazy, $replaceImgNoLazy) !== false) {

					$replaceImgNoLazy = preg_replace( '/<img/is', '<img loading="'.esc_html($attr).'"', $imgNotLazy );
					array_push( $search, $imgNotLazy );
					array_push( $replace, $replaceImgNoLazy );

				}
			}

		}

	$search = array_unique( $search );
	$replace = array_unique( $replace );

	$content = str_replace( $search, $replace, $content );

	return $content;

	} // end AddLoadingEagerImgAttr
    
	
	public function AddLoadingEagerIframeAttr($content) {
		
		// Exclude if
		if ( is_user_logged_in() ) {
			return $content;
		}
		
		$default_loading_eager = array(
			"no-lazy",
			"skip-lazy"
		);
		
		$matches = array();
		
		preg_match_all( '@<iframe(?:(?!loading=).)*?>@', $content, $matches );

		$attr = self::EAGER;

		$search = array();
		$replace = array();

		$i = 0;
		
		foreach ( $matches[0] as $IframeNotLazy ) {
		    
			$loading_eager = get_option('opm_img_options')['lazyload_exclude_list'];
			$loading_eager = explode("\n", str_replace("\r", "", $loading_eager) );

			$loading_eager = array_merge( $default_loading_eager, $loading_eager);

			foreach ($loading_eager as $replaceIframeNoLazy) { if ($replaceIframeNoLazy && strpos($IframeNotLazy, $replaceIframeNoLazy) !== false) {

				$replaceIframeNoLazy = preg_replace( '/<iframe/is', '<iframe loading="'.esc_html($attr).'"', $IframeNotLazy );
				array_push( $search, $IframeNotLazy );
				array_push( $replace, $replaceIframeNoLazy );

				}
			}

		}

	$search = array_unique( $search );
	$replace = array_unique( $replace );

	$content = str_replace( $search, $replace, $content );
	
	return $content;
		
    } // end AddLoadingEagerIframeAttr

	
} // end Class

new AddLoadingEager();
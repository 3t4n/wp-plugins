<?php

if (!defined('WPINC')) {
    die;
}

/**
 * inline background image html rewrite are forked & modified from Evgeniy Kozenok codes in
 * WP Lozad - https://wordpress.org/plugins/wp-lozad/
 */

if (!class_exists('LazySizes') ) {
    
    class LazySizes {
		
		const LAZY_CLASS = 'lazyload';
		
		const PLACEHOLDER = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
		
		const LAZY_INLINE_STYLE = '.lazyload{will-change: transform;
                                opacity: 0;
                                transition: opacity 0.025s ease-in,transform 0.025s ease-in!important}.lazyloaded,.lazyloading{opacity: 1;
                                transition: opacity 0.25s ease-in,transform 0.25s ease-in!important}';
		
		const LAZY_BG_INLINE_STYLE = ':not(img,iframe,video).lazyload{background-image:none!important}';
		
		const LAZY_SCRIPT_AFTER_OPEN = "document.addEventListener('lazybeforeunveil', function(e){";
		
		const LAZY_SCRIPT_AFTER_BG = "
const bg = e.target.getAttribute('data-bg');
	if(bg){
		e.target.style.backgroundImage = 'url(' + bg + ')';
		e.target.removeAttribute('data-bg');
}";
		
		const LAZY_SCRIPT_AFTER_POSTER = "
const poster = e.target.getAttribute('data-poster');
	if(poster){
		e.target.setAttribute('poster', poster);
		e.target.removeAttribute('data-poster');
}";
							 
		const LAZY_SCRIPT_AFTER_CLOSE = "});";
        
        
	public function __construct() {
			
		if( !is_admin() ){
				
			add_action('wp_enqueue_scripts', [$this, 'LazySizesScripts'], PHP_INT_MAX);
			// Filters
			add_filter('the_content', [$this, 'LazyLoad_Backgrounds'], 999);
			add_filter('the_content', [$this, 'LazyLoad_Iframes'], 999);
			add_filter('the_content', [$this, 'LazyLoad_Videos'], 999);
				
			//Actions
			add_action('template_redirect', function () {
				   
            	ob_start(function ($content) {
                	return $this->LazyLoad_Images($content);
            	});
 
            });
				
		}
		
	} // end construct

		
	public function LazySizesScripts() {
			
		$lazysizes_js_before = get_option('opm_img_options')['lazysizes_extra_config'];
		$lazysizes_js_before = preg_replace('/\s+/', ' ', $lazysizes_js_before);
		
		
		$lazysizes_js_after_open = self::LAZY_SCRIPT_AFTER_OPEN;
		
		$lazysizes_js_after_close = self::LAZY_SCRIPT_AFTER_CLOSE;
		
		$lazysizes_js_after_bg = self::LAZY_SCRIPT_AFTER_BG;
		
		$lazysizes_js_after_poster = self::LAZY_SCRIPT_AFTER_POSTER;
		
		//$lazysizes_js_after = preg_replace('/\s+/', ' ', $lazysizes_js_after);
            
		// enqueue the lazysizes js
		wp_enqueue_script('lazysizes', OPM_IMG_PUBLIC_URL . 'js/lazysizes.min.js', [], OPM_IMG_VERSION, true, PHP_INT_MAX);
			
		// set up the config
		// if use extra lazysize config
		if ( !empty(get_option('opm_img_options')['lazysizes_extra_config']) ) {
			wp_add_inline_script('lazysizes', wp_kses_data($lazysizes_js_before), 'before');
		}
		// if use lazyload inline bg images and video
		if (opm_img_field_setting('enable_lazyload_backgrounds')) {
			$lazysizes_js_after_open .= $lazysizes_js_after_bg;
		}
		if (opm_img_field_setting('enable_lazyload_videos')) {
			$lazysizes_js_after_open .= $lazysizes_js_after_poster;
		}
		if ( opm_img_field_setting('enable_lazyload_backgrounds') || opm_img_field_setting('enable_lazyload_videos') ) {
			wp_add_inline_script('lazysizes', wp_kses_data($lazysizes_js_after_open . $lazysizes_js_after_close) );
		}
		// add fade-in css
		wp_register_style( 'lazysizes', false );
        wp_enqueue_style( 'lazysizes' );
            
		$lazysizes_inline_style = self::LAZY_INLINE_STYLE;
		$lazysizes_inline_style = preg_replace('/\s+/', ' ', $lazysizes_inline_style);
            
		wp_add_inline_style('lazysizes', esc_attr($lazysizes_inline_style));
            
		if ( opm_img_field_setting('enable_lazy_css_bg_img') ) {
			$lazy_bg_inline_style = self::LAZY_BG_INLINE_STYLE;
			wp_add_inline_style('lazysizes', $lazy_bg_inline_style);
		}

    } // end LazySizesScripts

	
	public function LazyLoad_Images($content) {
			
		// Exclude if
		if ( is_user_logged_in() || !opm_img_field_setting('enable_lazyload_images') ) {
			return $content;
		}
			
		$default_exclude_list = array(
			"no-lazy",
			"skip-lazy"
		);
			
		$matches = array();
		preg_match_all( '/<img[\s\r\n]+.*?>/is', $content, $matches );

		$lazy_class = self::LAZY_CLASS;
			
		$placeholder = self::PLACEHOLDER;

		$search = array();
		$replace = array();

		$i = 0;
		
		foreach ( $matches[0] as $imgTags ) {
                
			$exclude_keywords = get_option('opm_img_options')['lazyload_exclude_list'];
			$exclude_keywords = explode("\n", str_replace("\r", "", $exclude_keywords));
                
			$exclude_lazy = array_merge( $default_exclude_list, $exclude_keywords);

			foreach ($exclude_lazy as $exclude) {
				if ( $exclude && strpos($imgTags, $exclude) !== false ) {
					continue 2;
				}
			}
				
				// don't replace if the image is a data-uri
			if ( ! preg_match( "/src=['\"]data:image/is", $imgTags ) ) {

				//$i++;
					
				// replace the src and add the data-src attribute
				$replaceImgTags = '';
				//$replaceImgTags = preg_replace( '/<img(.*?)src=/is', '<img$1src="' . esc_attr( $placeholder ) . '" $1data-src=', $imgTags );
				$replaceImgTags = preg_replace( '/<img(.*?)src=/is', '<img$1data-src=', $imgTags );
				$replaceImgTags = str_replace( 'srcset', 'data-srcset', $replaceImgTags );
				//$replaceImgTags = preg_replace( '/<img(.*?)srcset=/is', '<img$1srcset="' . esc_attr( $placeholder ) . '"  data-srcset=', $replaceImgTags );

				// add the lazy class to the img element
				if ( preg_match( '/class=["\']/i', $replaceImgTags ) ) {
					//$replaceImgTags = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1'.esc_html($lazy_class).' $2$1', $replaceImgTags );
					$replaceImgTags = preg_replace( '/class=(["\'](.*?)")/is', 'class="'.esc_html($lazy_class).' $2"', $replaceImgTags );
				} else {
					$replaceImgTags = preg_replace( '/<img/is', '<img class="'.esc_html($lazy_class).'"', $replaceImgTags );
				}
					
				if ( opm_img_field_setting('use_noscript') ) {
					$replaceImgTags .= '<noscript>' . $imgTags . '</noscript>';
				}
					
				// add the loading=lazy to the lazy img element
				if ( !preg_match( '/loading=["\']/i', $replaceImgTags ) ) {
					$replaceImgTags = preg_replace( '/<img/is', '<img loading="lazy"', $replaceImgTags );
				} /*else {
					$replaceImgTags = preg_replace( '/<img/is', '<img loading="lazy"', $replaceImgTags );
				}*/

				array_push( $search, $imgTags );
				array_push( $replace, $replaceImgTags );
			}
				
		}

		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );

		return $content;
			
	} // end LazyLoad_Images
		

	// start LazyLoad BG_Images
	public function LazyLoad_Backgrounds($content) {
            
		// Exclude if
		if ( is_user_logged_in() || !opm_img_field_setting('enable_lazyload_backgrounds') ) {
			return $content;
		}
		
		$default_exclude_list = array(
			"no-lazy",
			"skip-lazy"
		);
    
        $bg_imgs = ['background-image', 'background'];
            
		$lazy_class = self::LAZY_CLASS;
            
		$search = array();
		$replace = array();

		foreach ($bg_imgs as $bg_img) {
                
			$bg_img_matches = [];
			preg_match_all('/<[^>]*?style=[^>]*?' . $bg_img . '\s*?:\s*?url\s*\([^>]+\)[^>]*?>/', $content, $bg_img_matches);
    
			foreach ($bg_img_matches[0] as $bg_img_tags) {
                    
				$exclude_keywords = get_option('opm_img_options')['lazyload_exclude_list'];
				$exclude_keywords = explode("\n", str_replace("\r", "", $exclude_keywords));
				
				$exclude_lazy = array_merge( $default_exclude_list, $exclude_keywords);
                    
				foreach ($exclude_lazy as $exclude) {
					if ( $exclude && strpos($bg_img_tags, $exclude) !== false ) {
					continue 2;
					}
				}
                    
				if (preg_match("/url=['\"]data:image/is", $bg_img_tags) !== 0) {
					continue;
				}
    
				$bgImgMatches = [];
				preg_match('/' . $bg_img . ':\s*url\s*\(\s*[\'"]?([^\'"]*)[\'"]?\)/im', $bg_img_tags, $bgImgMatches);
    
				$bgImg = isset($bgImgMatches[1]) ? $bgImgMatches[1] : null;
				
				if (empty($bgImg)) {
					continue;
				}
    
				$bgImgSlashes = preg_replace(['/\//', '/\./'], ['\/', '\.'], $bgImg);
    
				// remove bg image from style tag
				$replaceBGimgsHTML = preg_replace('/(.*?style=.*?)' . $bg_img . ':\s*url\s*\(\s*[\'"]' . $bgImgSlashes . '[\'"]\s*\);*\s*(.*?)/is', '$1$2', $bg_img_tags);
				$replaceBGimgsHTML = preg_replace('/(.*?style=.*?)' . $bg_img . ':\s*url\s*\(\s*' . $bgImgSlashes . '\s*\);*\s*(.*?)/is', '$1$2', $replaceBGimgsHTML);

				// add lazyload class
				$replaceBGimgsHTML = preg_replace('/(.*?)class=([\'"])(.*?)/is', '$1class=$2' . esc_html($lazy_class) . ' $3', $replaceBGimgsHTML);
    				
                // add bg img url to data-background-image
				$replaceBGimgsHTML = preg_replace('/<(.*)>/is', '<$1 data-bg="' . $bgImg . '">', $replaceBGimgsHTML);
                    
				array_push( $search, $bg_img_tags );
				array_push( $replace, $replaceBGimgsHTML );
			}
		}
            
		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );
    
		return $content;
            
	} // end LazyLoad BG Images
		

	// start LazyLoad_Iframes
	public function LazyLoad_Iframes($content) {
            
		// Exclude if
		if ( is_user_logged_in() || !opm_img_field_setting('enable_lazyload_iframes') ) {
				return $content;
		}
		
		$default_exclude_list = array(
			"no-lazy",
			"skip-lazy"
		);
			
		$matches = [];
		preg_match_all('/<iframe[^>]*?>(.*?)<\/iframe>/sim', $content, $matches);
            
		$lazy_class = self::LAZY_CLASS;
            
		$search = array();
		$replace = array();
    		
			
		foreach ($matches[0] as $iframeTags) {
                
			$exclude_keywords = get_option('opm_img_options')['lazyload_exclude_list'];
			$exclude_keywords = explode("\n", str_replace("\r", "", $exclude_keywords));
                
			$exclude_lazy = array_merge( $default_exclude_list, $exclude_keywords);

			foreach ($exclude_lazy as $exclude) {
				if ( $exclude && strpos($iframeTags, $exclude) !== false ) {
					continue 2;
				}
			}
                
			if (!preg_match('/<video[^>]*?>(.*?)<\/video>/sim', $iframeTags)) {

			// replace the src and add the data-src attribute
			$replaceIframeTags = '';
			$replaceIframeTags = preg_replace( '/<iframe(.*?)src=/is', '<iframe$1data-src=', $iframeTags );

			// add the lazy class to the img element
			if ( preg_match( '/class=["\']/i', $replaceIframeTags ) ) {
				$replaceIframeTags = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1'.esc_html($lazy_class).' $2$1', $replaceIframeTags );
			} else {
				$replaceIframeTags = preg_replace( '/<iframe/is', '<iframe class="'.esc_html($lazy_class).'"', $replaceIframeTags );
		}
					
		if ( opm_img_field_setting('use_noscript') ) {
			$replaceIframeTags .= '<noscript>' . $iframeTags . '</noscript>';
		}
					
		// add the loading=lazy to the lazy iframe element
		if ( !preg_match( '/loading=["\']/i', $replaceIframeTags ) ) {
			$replaceIframeTags = preg_replace( '/<iframe/is', '<iframe loading="lazy"', $replaceIframeTags );
			} /*else {
				$replaceIframeTags = preg_replace( '/<iframe/is', '<iframe loading="lazy"', $replaceIframeTags );
		}*/
            
			array_push( $search, $iframeTags );
			array_push( $replace, $replaceIframeTags );

			}
		}
    
		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );
    
		return $content;

	}
		
		// end LazyLoad_Iframes
        
        
     // start LazyLoad_Videos
	public function LazyLoad_Videos($content) {
            
		// Exclude if
		if ( is_user_logged_in() || !opm_img_field_setting('enable_lazyload_videos') ) {
			return $content;
		}
		
		$default_exclude_list = array(
			"no-lazy",
			"skip-lazy"
		);
			
		$lazy_class = self::LAZY_CLASS;
            
		$search = array();
		$replace = array();
			
		$videoPosterTags = [];
		preg_match_all('/<video[^>]*?>(.*?)<\/video>/sim', $content, $videoPosterTags);
    
		foreach ($videoPosterTags[0] as $videoPosterTag) {
                
			$exclude_keywords = get_option('opm_img_options')['lazyload_exclude_list'];
			$exclude_keywords = explode("\n", str_replace("\r", "", $exclude_keywords));
                
			$exclude_lazy = array_merge( $default_exclude_list, $exclude_keywords);

			foreach ($exclude_lazy as $exclude) {
				if ( $exclude && strpos($videoPosterTag, $exclude) !== false ) {
					continue 2;
				}
			}
                
			if (preg_match("/src=['\"]data:image/is", $videoPosterTag) !== 0) {
				continue;
			}
    			
			$replacevideoPosterTag = preg_replace( '/<video(.*?)src=/is', '<video$1data-src=', $videoPosterTag );
			$replacevideoPosterTag = preg_replace('/<(.*)poster=/is', '<$1 data-poster=', $replacevideoPosterTag);
    
			if (preg_match('/class=["\']/i', $replacevideoPosterTag)) {
				$replacevideoPosterTag = preg_replace('/class=(["\'])(.*?)["\']/is', "class=$1{$lazy_class} $2$1", $replacevideoPosterTag);
			} else {
				$replacevideoPosterTag = preg_replace('/<video/is', '<video class="' . esc_html($lazy_class) . '"', $replacevideoPosterTag);
			}
    
			array_push( $search, $videoPosterTag );
			array_push( $replace, $replacevideoPosterTag );
			
			$videoTags = [];
			preg_match_all('/<source[^>]*?\/>/sim', $videoPosterTag, $videoTags);
    
			foreach ($videoTags[0] as $videoTag) {
                    
				$exclude_keywords = get_option('opm_img_options')['lazyload_exclude_list'];
				$exclude_keywords = explode("\n", str_replace("\r", "", $exclude_keywords));
                    
                foreach ($exclude_lazy as $exclude) {
					if ( $exclude && strpos($videoTag, $exclude) !== false ) {
						continue 2;
					}
				}
                    
				$replaceVideoTag = preg_replace('/<(.*)src=/is', '<$1 data-src=', $videoTag);

				array_push( $search, $videoTag );
				array_push( $replace, $replaceVideoTag );
					
			}
		}
    
		$content = str_replace( $search, $replace, $content );
    
		return $content;
	
        } // end LazyLoad_Videos
	
		
    } // end Class


new LazySizes();
    
} // End if class exists statement
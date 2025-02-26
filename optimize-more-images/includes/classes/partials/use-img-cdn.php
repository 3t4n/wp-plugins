<?php

if (!defined('WPINC')) {
    die;
}

class OPM_IMG_CDN{
		
 	public function __construct() {
			
 		if( !is_admin() ){
			
			add_action('wp_head', [$this, 'img_cdn_prefetch'], 0);
			
			add_action('template_redirect', function () {
				ob_start(function ($content) {
                 	return $this->img_cdn_start_buffering($content);
                });
            });
			
		}
		
 	}
 	
 	// get the cdn exclusion list
    protected function opm_img_cdn_exclude_list( $matches ) {
        
        $exclude_keywords = get_option('opm_img_options')['img_cdn_exclude_list'];
        $exclude_keywords = explode("\n", str_replace("\r", "", $exclude_keywords));
        // excludes
        foreach ( $exclude_keywords as $exclude ) {
            if ( !! $exclude && stristr( $matches, $exclude ) != false ) {
                return true;
            }
        }
        return false;
    }
	
	public function img_cdn_start_buffering($content) {
		
		if ( is_user_logged_in() ) {
			return $content;
		}
		
		// Get the content directory URL minus the http://
        $img_url = content_url();
        
        $img_url = str_replace([
		        	'http://',
		        	'https://'],
		            ['', ''],
		        	 $img_url );
        
		$opm_cdn_file_types = apply_filters( 'opm_cdn_file_types', 'jpg|jpeg|png|webp' );
        
        return preg_replace_callback(
            '{'. $img_url .'/[^\/\s]+\/\S+\.('. $opm_cdn_file_types .')}i',
            array( $this, 'replace' ),
            $content
        );
        
	}
	
	// Replaces matches image URLs
    public function replace( $matches ) {
        
        if ( $this->opm_img_cdn_exclude_list( $matches[0]) ) {
            return $matches[0];
        }
        
        // grab the parsed image URL
        $url = isset( $matches[0] ) ? $matches[0] : '' ;
        
        // get the image CDN URL
        $img_cdn_url = get_option('opm_img_options')['img_cdn_url'];
        
        // on the fly image compression quality if the cdn supports
        $quality = get_option('opm_img_options')['img_cdn_compression_quality'];
        
        // final url if use on the fly image compression quality
        if ( opm_img_field_setting('img_cdn_quality')  ) {
            $final_url = "$img_cdn_url/$url$quality";
        }
        
        // default final url
        else {
	        $final_url = "$img_cdn_url/$url";
        }

        return $final_url;

    }
	
	public function img_cdn_prefetch() {
		
		$img_cdn_url = get_option('opm_img_options')['img_cdn_url'];
		$prefetch_tag = '<link rel="dns-prefetch" href="%s">'. PHP_EOL;
		printf( $prefetch_tag, esc_url( $img_cdn_url ) );
		
	}
	
		
} // end Class

new OPM_IMG_CDN();
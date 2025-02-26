<?php

if (!defined('WPINC')) {
    die;
}

class OPM_IMG_Images {

    public function __construct()
    {
		
		add_action( 'init', array($this, 'lazy_load'), PHP_INT_MAX);
		add_action( 'init', array($this, 'image_cdn'), PHP_INT_MAX);
		add_action( 'init', array($this, 'preload_featured_imgs'), PHP_INT_MAX);
		add_action( 'init', array($this, 'img_attr'), PHP_INT_MAX);
		
    }

    
    public function lazy_load()
    {

        if ( !opm_img_field_setting('enable_lazyload') || is_user_logged_in() ) {
            return;
        }
		
		require_once(OPM_IMG_CLASSES_DIR . 'partials/lazy-load.php');
		add_filter( 'wp_lazy_loading_enabled', '__return_false' );
		
		
        if ( opm_img_field_setting('enable_lazy_css_bg_img')  ) {
		    require_once(OPM_IMG_CLASSES_DIR . 'partials/lazy-css-bg-images.php');
        }
        
        if ( opm_img_field_setting('add_loading_eager')  ) {
		    require_once(OPM_IMG_CLASSES_DIR . 'partials/add-loading-eager.php');
        }
		
		
    }
    
    
    public function image_cdn()
    {   
        if ( !opm_img_field_setting('use_img_cdn') || is_user_logged_in()  ) {
            return;
        }

        require_once(OPM_IMG_CLASSES_DIR . 'partials/use-img-cdn.php');
		
		
    }
    
    public function img_attr()
    {

        if ( !opm_img_field_setting('add_img_attr') || is_user_logged_in()  ) {
            return;
        }
		
		require_once(OPM_IMG_CLASSES_DIR . 'partials/add-img-attr.php');
		
		
    }
    
    public function preload_featured_imgs()
    {

        if ( !opm_img_field_setting('enable_preload_featured_imgs') || is_user_logged_in()  ) {
            return;
        }
            
        require_once(OPM_IMG_CLASSES_DIR . 'partials/preload-featured-imgs.php');
        
	
    }
    
	
}
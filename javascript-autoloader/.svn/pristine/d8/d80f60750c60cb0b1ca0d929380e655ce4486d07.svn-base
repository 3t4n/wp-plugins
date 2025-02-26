<?php

/**
 * The JavaScript AutoLoader core plugin class
 */

 
// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The core plugin class
 */
if ( !class_exists( 'PP_Js_Autoloader' ) ) { 

  class PP_Js_Autoloader extends PPF09_Plugin {
    
    
	/**
     * Admin Class
     *
     * @see    class-js-autoloader-admin.php
     * @since  5.0.0
     * @var    object
     * @access private
     */
    private $admin;
    
    
    private $_autoloaddir;

    
    /**
     * Init the Class 
     *
     * @since 5.0.0
     */
    public function plugin_init() {
		
		$this->add_action( 'init' );
	
	}
	
	/**
     * do plugin init 
     * this runs after init action has fired to ensure everything is loaded properly
     * was functioninit() before 5.0.0
     */
    function action_init() {
      
      // directory name
      $this->_autoloaddir = 'jsautoload';
	  
	  // moved from add_text_domain() in v 5.0.0
      load_plugin_textdomain( 'javascript-autoloader' );

	  // using PPF Admin Class since 5.0.0
	  $this->admin = $this->add_sub_class_backend( 'PP_Js_Autoloader_Admin', 'class-js-autoloader-admin', $this );

      // load JS files on frontend
      add_action( 'wp_enqueue_scripts', array( $this, 'jsautoloader' ), 999 );
      
    }

    
    /**
     * autoload JS files on frontend
     */
    function jsautoloader() {
      foreach ( $this->getAllFiles() as $file ) {    
		wp_enqueue_script( 'jsautoloader-' . md5( $file['name'] ), $file['url'], array(), $file['version'], $file['footer'] );
      }
    }


    /**
     * get an array of possible directories
     */
    function getDirs() {
      $possibledirs = array();
      $possibledirs['general'] = array( 'dir' => $this->mk_path( WP_CONTENT_DIR ), 'url' => $this->mk_url( content_url() ) );
      $possibledirs['theme'] = array( 'dir' => $this->mk_path( get_template_directory() ), 'url' => $this->mk_url( get_template_directory_uri() ) );
      if ( is_child_theme() ) {
        $possibledirs['childtheme'] =  array( 'dir' => $this->mk_path( get_stylesheet_directory() ), 'url' => $this->mk_url( get_stylesheet_directory_uri() ) );
      } else {
        $possibledirs['childtheme'] = false;
      }
      return $possibledirs;
    }
    
    
    /**
     * create path name
     */
    private function mk_path( $dir ) {
      
      $path = $dir;
      
      if ( $path != '' ) {
        
        $path = trailingslashit( $dir ) . $this->_autoloaddir;
        
      }
      
      return $path;
      
    }
    
    
    /**
     * create url path name
     */
    private function mk_url( $dir ) {
      
      $path = $dir;
      
      if ( $path != '' ) {
        
        $path = trailingslashit( $dir ) . $this->_autoloaddir;
        
      }
      
      return $path;
      
    }

    
    /**
     * get an sorted array of all *.js files in all possible loactions 
     */
    function getAllFiles() {
		
      $possibledirs = $this->getDirs();
	  $pdirs = [];
	  
	  foreach ( $possibledirs as $pdir ) {
		  if ( ! empty( $pdir ) ) {
			$pdirs[] = $pdir;
			$pdirs[] = [ 'dir' => $pdir['dir'] . '/footer', 'url' => $pdir['url'] . '/footer' ] ;
		  }
	  }
	  
      $files = [];
      foreach ( $pdirs as $pdir ) {
		  
		$footer = false;
		if ( '/footer' == strtolower( substr( $pdir['dir'], -7 ) ) ) {
			$footer = true;
		}
		
        if ( $pdir ) {
          if ( is_dir( $pdir['dir'] ) ) {
			foreach ( scandir( $pdir['dir'] ) as $file ) {
			  if ( $file !== '.' && $file !== '..' && !is_dir( trailingslashit( $pdir['dir'] ) . $file ) && substr( $file, 0, 1 ) != '_' && '.js' == strtolower( substr( $file, -3 ) ) ) {
				$files[] = array( 'name' => trailingslashit( $pdir['dir'] ) . $file, 'url' => trailingslashit( $pdir['url'] ) . $file, 'file' => $file, 'version' =>  date( 'U', filemtime( trailingslashit( $pdir['dir'] ) . $file ) ), 'footer' => $footer );
			  }
			}
		  }
        }
      }
      return $files;
    } 
        
  }
  
}

?>
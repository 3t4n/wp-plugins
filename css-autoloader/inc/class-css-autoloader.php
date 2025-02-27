<?php

/**
 * The CSS AutoLoader core plugin class
 */

 
// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The core plugin class
 */
if ( !class_exists( 'PP_Css_Autoloader' ) ) { 

  class PP_Css_Autoloader extends PPF09_Plugin {
    
    
	/**
     * Admin Class
     *
     * @see    class-css-autoloader-admin.php
     * @since  5.0.0
     * @var    object
     * @access private
     */
    private $admin;
    
    
    private $_autoloaddir;
    public $media;

    
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
      $this->_autoloaddir = 'cssautoload';
      
      // allowed media types
      $this->media = array( '' => 'all', '/all' => 'all', '/braille' => 'braille', '/embossed' => 'embossed', '/handheld' => 'handheld', '/print' => 'print', '/projection' => 'projection', '/screen' => 'screen', '/speech' => 'speech', '/tty' => 'tty', '/tv' => 'tv' );
	  
	  // moved from add_text_domain() in v 5.0.0
      load_plugin_textdomain( 'css-autoloader' );

	  // using PPF Admin Class since 5.0.0
	  $this->admin = $this->add_sub_class_backend( 'PP_Css_Autoloader_Admin', 'class-css-autoloader-admin', $this );

      // load CSS files on frontend
      add_action( 'wp_enqueue_scripts', array( $this, 'cssautoloader' ), 999 );
	  
	  /*
      add_action( 'init', array( $this, 'add_text_domain' ) );
      add_action( 'admin_menu', array( $this, 'adminmenu' ) );
      add_action( 'admin_enqueue_scripts', array( $this, 'admin_style' ) );
      add_filter( 'plugin_action_links_' . plugin_basename( $this->get_plugin_file() ), array( $this, 'add_links' ) ); 
	  */
      
    }

    
    /**
     * autoload CSS files on frontend
     */
    function cssautoloader() {
      foreach ( $this->getAllFiles() as $file ) {
        wp_enqueue_style( 'cssautoloader-' . md5( $file['name'] ), $file['url'], array(), $file['version'], $file['media'] );
      }
    }


    /**
     * get an array of possible directories
     */
    function getDirs() {
      $possibledirs = array();
      $possibledirs['general'] = array( 'dir' => $this->mk_path( WP_CONTENT_DIR ), 'url' => $this->mk_url( content_url() ) );
      $possibledirs['theme'] = array( 'dir' => $this->mk_path( get_template_directory() ), 'url' => $this->mk_path( get_template_directory_uri() ) );
      if ( is_child_theme() ) {
        $possibledirs['childtheme'] =  array( 'dir' => $this->mk_path( get_stylesheet_directory() ), 'url' => $this->mk_path( get_stylesheet_directory_uri() ) );
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
     * get an sorted array of all *.css files in all possible loactions 
     */
    function getAllFiles() {
      $possibledirs = $this->getDirs();
      $files = array();
      foreach ( $possibledirs as $pdir ) {
        if ( $pdir ) {
          if ( is_dir( $pdir['dir'] ) ) {
            foreach ( $this->media as $mdir => $media ) {
              $curdir = $pdir['dir'] . $mdir;
              if ( is_dir( $curdir ) ) {
                foreach ( scandir( $curdir ) as $file ) {
                  if ( $file !== '.' && $file !== '..' && !is_dir( trailingslashit( $curdir ) . $file ) && substr( $file, 0, 1 ) != '_' && '.css' == strtolower( substr( $file, -4 ) ) ) {
                    $files[] = array( 'name' => trailingslashit( $curdir ) . $file, 'url' => $pdir['url'] . trailingslashit( $mdir ) . $file, 'file' => $file, 'media' => $media, 'version' =>  date( 'U', filemtime( trailingslashit( $curdir ) . $file ) ) );
                  }
                }
              }
            }
          }
        }
      }
      return $files;
    }  
    
    
    /**
     * add links to plugins table
     */
    function add_links( $links ) {
      return array_merge( $links, array( '<a href="' . admin_url( 'themes.php?page=cssautoloader' ) . '" title="' . __( 'Show currently loaded files', 'css-autoloader' ) . '">' . __( 'Show currently loaded files', 'css-autoloader' ) . '</a>', '<a href="https://wordpress.org/support/plugin/' . $this->plugin_slug . '/reviews/" title="' . __( 'Please rate plugin', 'css-autoloader' ) . '">' . __( 'Please rate plugin', 'css-autoloader' ) . '</a>' ) );
    }
    
  }
  
}

?>
<?php
/**
Plugin Name: Background with Particle.js
Plugin URI: http://maherhossain.com/particle-background
Description: Easy to use Particle JS Background. Create Powerful Particle Banner from dashboard
Version: 2.0.0
Author: Maher Hossain
Author URI: https://maherhossain.com
*/
if ( ! defined( 'ABSPATH' ) ) {die("Don't try to access directly :-( ");}

if( file_exists( dirname( __FILE__ ) . '/shortcode.php' ) ) {
	require_once( dirname( __FILE__ ) . '/shortcode.php' );
}
add_action('wp_enqueue_scripts', 'maher_particlejs_scripts');
function maher_particlejs_scripts(){
    wp_enqueue_style('maher-particle-style', PLUGINS_URL('css/style.css',__FILE__));
    wp_enqueue_script('maher-particle-script', PLUGINS_URL('js/particle.js', __FILE__ ));
	wp_enqueue_script('maher-front-script', PLUGINS_URL('js/front-script.js', __FILE__ ), array( 'jquery' ));
}


function maher_admin_scripts() {

    wp_enqueue_style('mh-admin-style', plugins_url('css/admin.css',__FILE__ ));
    wp_enqueue_script('maher-particle-admin', PLUGINS_URL('js/main.js', __FILE__ ));
}
add_action('admin_enqueue_scripts', 'maher_admin_scripts' );

/**
*
* Fields of the ParticleJS 
*
*/

function maher_particlejs_fields(){   
    
    if( file_exists(  dirname( __FILE__ ) . '/config/init.php' )) {
        require_once( dirname( __FILE__ ) . '/config/init.php' );
    }
}
add_action("admin_init", "maher_particlejs_fields");

/**
* @param $page_title
* @param $menu_title
* @param $capability
* @param $menu_slug
* @param $function ( callback function )
* @param $icon_url
* @param $position
*
* Add ParticleJS item in the top level menu
*/

function maher_particlejs_top_menu(){
    
	if( file_exists(dirname( __FILE__ ) . '/settings/main-navigation.php' )) {
        require_once( dirname( __FILE__ ) . '/settings/main-navigation.php' );
    }
}
add_action("admin_menu", "maher_particlejs_top_menu");
/**
* @param $tag
* @param $function_to_add
*/
function maher_particlejs_main_menu(){
    
    if( file_exists(dirname( __FILE__ ) . '/settings/menu-settings.php' )) {
        require_once( dirname( __FILE__ ) . '/settings/menu-settings.php' );
    } 
    
}

function maher_particlejs_submenu(){
    
    if( file_exists(dirname( __FILE__ ) . '/settings/submenu-settings.php' )) {
        require_once( dirname( __FILE__ ) . '/settings/submenu-settings.php' );
    } 
    
}

/**
* Template Settings
* Select Particle Background as Page Template
*/
class MaherParticlePageTemplate {

  private static $maherinstance;
  protected $mahertemplates;

  public static function maher_get_instance() {

    if ( null == self::$maherinstance ) {
      self::$maherinstance = new MaherParticlePageTemplate();
    } 
    return self::$maherinstance;
  } 


  private function __construct() {

    $this->mahertemplates = array();

    if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
      add_filter(
        'page_attributes_dropdown_pages_args',
        array( $this, 'maher_register_project_templates' )
      );

    } else {
      add_filter(
        'theme_page_templates', array( $this, 'maher_add_new_template' )
      );

    }

    add_filter(
      'wp_insert_post_data', 
      array( $this, 'maher_register_project_templates' ) 
    );
    add_filter(
      'template_include', 
      array( $this, 'maher_view_project_template') 
    );

    $this->mahertemplates = array(
      'particle-page.php' => 'Particle Background',
    );
      
  } 

  public function maher_add_new_template( $posts_templates ) {
    $posts_templates = array_merge( $posts_templates, $this->mahertemplates );
    return $posts_templates;
  }

  public function maher_register_project_templates( $atts ) {

    $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

    $mahertemplates = wp_get_theme()->get_page_templates();
    if ( empty( $mahertemplates ) ) {
      $mahertemplates = array();
    } 

    wp_cache_delete( $cache_key , 'themes');

    $mahertemplates = array_merge( $mahertemplates, $this->mahertemplates );

    wp_cache_add( $cache_key, $mahertemplates, 'themes', 1800 );

    return $atts;

  } 

  public function maher_view_project_template( $mahertemplate ) {
    
    global $post;

    if ( ! $post ) {
      return $mahertemplate;
    }
    if ( ! isset( $this->mahertemplates[get_post_meta( 
      $post->ID, '_wp_page_template', true 
    )] ) ) {
      return $mahertemplate;
    } 

    $file = plugin_dir_path( __FILE__ ). get_post_meta( 
      $post->ID, '_wp_page_template', true
    );
    if ( file_exists( $file ) ) {
      return $file;
    } else {
      echo $file;
    }
    return $mahertemplate;
  }

} 
add_action( 'plugins_loaded', array( 'MaherParticlePageTemplate', 'maher_get_instance' ) );
<?php
/**
 * Meal Planner
 *
 * @package   Meal_Planner
 * @author    Gary Jones
 * @link      http://example.com/meal-planner
 * @copyright 2013 Gary Jones
 * @license   GPL-2.0+
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Gamajo_Template_Loader' ) ) {
  require plugin_dir_path( __FILE__ ) . 'class-gamajo-template-loader.php';
}

/**
 * Template loader for Automob.
 *
 * Only need to specify class properties here.
 *
 * @package Automob
 * @author  Luke Madzedze
 */
class AutomobTemplateManager extends Gamajo_Template_Loader {
  /**
   * Prefix for filter names.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $filter_prefix = 'automob';

  /**
   * Directory name where custom templates for this plugin should be found in the theme.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $theme_template_directory = 'automob';

  /**
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $plugin_directory = AUTOMOB_PLUGIN_DIR;

  /**
   * Directory name where templates are found in this plugin.
   *
   * Can either be a defined constant, or a relative reference from where the subclass lives.
   *
   * e.g. 'templates' or 'includes/templates', etc.
   *
   * @since 1.1.0
   *
   * @var string
   */
  protected $plugin_template_directory = 'templates/';
  
  public function init()
  {
    add_filter( 'the_content', array( $this, 'inject_vehicle_singular_content' ) );
  }

  public function inject_vehicle_singular_content( $content ) 
  {
    global $post;

    // check if we need to inject
    if ( ! is_singular(AUTOMOB_CPT_CAR) || ! in_the_loop() ) {  
      return $content;
    }

    // remove filter to prevent crazy loops
    remove_filter( 'the_content', array( $this, 'inject_singular_content' ) );
    
    // check if vehicle actually the post type that's being looped
    if ( AUTOMOB_CPT_CAR === $post->post_type ) {

      // create vehicle object
      $car_table = new Automob_Car_Table();

      $vehicle = $car_table->getCar( $post->ID );

       // print_r($post);die();

      ob_start();

      /**
       * wpcm_before_main_content hook
       */
      do_action( 'amcs_before_single_content', $vehicle );

      // load content-single-vehicle
      $this->get_template_part( 'content', 'single-vehicle', array( 'vehicle' => $vehicle ) );

      /**
       * wpcm_after_main_content hook
       */
      do_action( 'amcs_after_single_content', $vehicle );

      // set new content
      $content = ob_get_clean();
    }

    // add filter back in place
    add_filter( 'the_content', array( $this, 'inject_singular_content' ) );

    // return content
    return apply_filters( 'amcs_content_single_vehicle', $content, $post );
  }


  /**
   * Get template part
   *
   * @param string $slug
   * @param string $name
   * @param array $args
   * @param string $custom_dir
   *
   * @parem string $custom_dir
   *
   */
  public function get_template_part( $slug, $name = '', $args = array(), $custom_dir = '' ) {
      $template = '';

      // set template dir
      $template_dir = $this->get_templates_dir();


      // Look in yourtheme/slug-name.php and yourtheme/automob/slug-name.php
      if ( $name ) {
        $template = locate_template( array(
          "{$slug}-{$name}.php",
          $this->get_theme_path() . "{$slug}-{$name}.php"
        ) );
      }
        // print_r(  $this->get_theme().$this->get_theme_path() . "{$slug}-{$name}.php");die();

      // Get default slug-name.php
      if ( ! $template && $name && file_exists( $template_dir . "{$slug}-{$name}.php" ) ) {
        $template = $template_dir . $slug . '-' . $name . '.php';
      }

       // print_r(file_exists($template_dir . "/{$slug}-{$name}.php"));die();
      // If template file doesn't exist, look in yourtheme/slug.php and yourtheme/automob/slug.php
      if ( ! $template ) {
        $template = locate_template( array( "{$slug}.php", $this->get_theme_path() . "{$slug}.php" ) );
      }

      // Get default slug.php
      if ( ! $template ) {
        $template = $template_dir . $slug . '.php';
      }

       

      // Allow 3rd party plugin filter template file from their plugin
      if ( $template ) {
        $template = apply_filters( 'amcs_get_template_part', $template, $slug, $name, $args );
      }

      if ( $template ) {

        // Extract args if there are any
        if ( is_array( $args ) && count( $args ) > 0 ) {
          extract( $args );
        }

        /**
         * wpcm_before_template_part hook
         */
        do_action( 'amcs_before_template_part', $template, $slug, $name, $args );

        // include file
        include( $template );

        /**
         * wpcm_after_template_part hook
         */
        do_action( 'amcs_after_template_part', $template, $slug, $name, $args );

      } else {
        if ( WP_DEBUG ) {
          echo '<span style="color:#ff0000;">Template not found: ' . $slug . ( ( '' != $name ) ? '-' . $name : '' ) . '</span><br/>';
        }
      }
  }

  public function get_theme() {
    $theme = wp_get_theme();
    return ( ( null != $theme->parent ) ? $theme->parent : $theme->template );
  }

    /**
   * Return theme template path
   *
   * @return string
   */
  public function get_theme_path() {
    return apply_filters( 'amcs_theme_template_path', 'automob/' );
  }

}
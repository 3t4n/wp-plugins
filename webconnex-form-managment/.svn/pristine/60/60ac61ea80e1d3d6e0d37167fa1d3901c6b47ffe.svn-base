<?php

/**
 @link              http://webconnex.com
 @since             1.0.0
 @package           WX Form Management

 @wordpress-plugin
 Plugin Name:       WX Form Management
 Plugin URI:        http://webconnex.com/wordpress/
 Description:       An easy way to include your WebConnex forms in WordPress
 Version:           1.6.19
 Author:            WebConnex
 Author URI:        http://webconnex.com/
 License:           GPL2
 License URI:       http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) exit;


class wx_form_management {

  function __construct() {
    add_shortcode( 'wxform', array(__CLASS__,'wxform_shortcode_fn' ));
    add_action('media_buttons_context',  array(__CLASS__,'add_wx_button'));
    add_action('admin_footer', array(__CLASS__,'add_wx_popup' ));
    add_action('admin_enqueue_scripts', array(__CLASS__,'wx_load_admin_styles' ));
  }

  public static function wx_build_link($formUrl, $content, $button = array('color'=>'FFF','background'=>'7BB045')) {
    wp_enqueue_style('wx-form-management', plugin_dir_url( __FILE__ ) . 'wx-form-management-styles.css', null, '1.0');
    $styles = esc_attr('background:'.$button['background'].';color:'.$button['color']);
    return '<div class="holds-wc-button"><a class="wx-button" style="'.$styles.'" target="_blank" href="'.esc_url($formUrl).'">'.esc_html($content).'</a></div>';
  }

  public static function wx_build_embed($formUrl, $content)
  {
    $directURL = $formUrl;

    $formUrl = add_query_arg('mode','wp', $formUrl);

    wp_enqueue_script('iframeresize', plugin_dir_url( __FILE__ ) . 'iframeResizer.min.js',  array('jquery'));
    wp_enqueue_script('wx-form-management', plugin_dir_url( __FILE__ ) . 'wx-form-management.js',  array('jquery'));
    return '<div class="holds-wx-embed"><iframe class="wx-embed" src="'.esc_url($formUrl).'" width="100%" scrolling="no"></iframe></div> <p class="notice" style="font-size:0.8em">This window is secured by 256 bit encryption on a PCI compliant network. <a href="'.esc_url($directURL).'" target="_blank">Click here</a> to view this window in its own page.</p>';
  }

  public static function wx_build_modal($formUrl, $content, $button = array('color'=>'FFF','background'=>'7BB045'))
  {
    $formUrl = add_query_arg(array('mode'=>'wp', 'TB_iframe' => 'true','width'=>'800','height'=>'550'), $formUrl);

    wp_enqueue_script('thickbox', null,  array('jquery'));
    wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style('wx-form-management', plugin_dir_url( __FILE__ ) . 'wx-form-management-styles.css', null, '1.0');
    $styles = esc_attr('background:'.$button['background'].';color:'.$button['color']);
    return '<div class="holds-wc-button"><a class="wx-button thickbox" style="'.$styles.'" href="'.esc_url($formUrl).'">'.esc_html($content).'</a></div>';
  }


  public static function wxform_shortcode_fn($attributes, $content)
  {
    $formUrl = sanitize_url($attributes['url']);
    if($formUrl == '') {
      return '';
    }

    $displayType = sanitize_text_field($attributes['type']);
    if($displayType == '') {
      $displayType = 'link';
    }
    
    $content = sanitize_text_field($content);
    if ($content == '') {
      $content = 'Click Here';
    }

    $button = array('color'=>'#FFF','background'=>'#7BB045');
    $fg = sanitize_hex_color($attributes['fg']);
    $bg = sanitize_hex_color($attributes['bg']);
    if($fg !== "") {
      $button['color'] = $fg;
    }
    if($bg) {
      $button['background'] = $bg;
    }
    return call_user_func(array(__CLASS__,'wx_build_'.$displayType), $formUrl, $content, $button);
  }


  //Setting up Editor Elements
  public static function add_wx_button()
  {
   return '<a href="javascript:tb_show(\'\',\'#TB_inline?width=800&height=550&inlineId=wx_popup_container\',\'\')" id="insert-wxform-button" class="button" title="Add WebConnex Form"><span class="dashicons dashicons-feedback"></span> Add WebConnex Form</a>';
  }
  public static function add_wx_popup()
  {
    if($GLOBALS['hook_suffix'] == 'post.php' || $GLOBALS['hook_suffix'] == 'post-new.php')
    {
      include(plugin_dir_path( __FILE__ ) . 'admin/wx-form-management-editor-popup.php');
    }
  }

  public static function wx_load_admin_styles($hook_suffix)
  {
    if($hook_suffix == 'post.php' || $hook_suffix == 'post-new.php')
    {
      wp_enqueue_style('wx-styles', plugin_dir_url( __FILE__ ) . 'admin/css/wx-form-management-admin.css');
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script('wx-script', plugin_dir_url( __FILE__ ) . 'admin/js/wx-form-management-admin.js',array('wp-color-picker'));
    }
  }
}


$wx_form_management = new wx_form_management();

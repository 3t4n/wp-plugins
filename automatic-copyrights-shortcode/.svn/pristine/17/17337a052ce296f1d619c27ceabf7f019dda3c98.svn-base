<?php
/**
* Plugin Name: Automatic Copyrights Shortcode
* Plugin URI: https://linkpak.com/products/wp-automatic-copyright-shortcode/
* Description: This plugin auto update the year and display the copyrights.
* Version: 1.0
* Author: Linkpak Digital
* Author URI: https://linkpak.com/
**/
defined( 'ABSPATH' ) or die( 'Direct access prohibited!' );

function acs_shortcode($atts = [], $content = null, $tag = '')
{
    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    // override default attributes with user attributes
    $acs_atts = shortcode_atts([
                                     'cyear' => date(Y),
                                     'symbol' => '© ',
                                     'copyright' => 'copyright ',
                                     'url' => get_bloginfo( 'url').' ',
                                     'title' => get_bloginfo( 'name').' ',
                                     'byear' => false,
                                 ], $atts, $tag);
 
    // start output
    $o = '';
 
    // start box
    $o .= '<div class="acs-wrapper" style="display:inline-block;">';
 
    // output
    if ($acs_atts['cyear']=="hide") $acs_atts['cyear']=false;
    if ($acs_atts['symbol']=="hide") $acs_atts['symbol']=false;
    if ($acs_atts['copyright']=="hide") $acs_atts['copyright']=false;
    if ($acs_atts['title']=="hide") $acs_atts['title']=false;
    else{//do nothing
    }
    
    if (!empty($acs_atts['byear'])) 
      {
          $o .= '<span>' . $acs_atts['symbol'] . $acs_atts['copyright'] . $acs_atts['byear'] . '-' . $acs_atts['cyear'] . ' <a href="'. $acs_atts['url'] . '">'. $acs_atts['title'] . '</a></span>';
      }

    else{
        $o .= '<span>' . $acs_atts['symbol'] . $acs_atts['copyright'] . $acs_atts['cyear'] . ' <a href="'. $acs_atts['url'] . '">'. $acs_atts['title'] . '</a></span>';
    }
 
    // enclosing tags
    if (!is_null($content)) {
        // secure output by executing the_content filter hook on $content
        $o .= apply_filters('the_content', $content);
 
        // run shortcode parser recursively
        $o .= do_shortcode($content);
    }
 
    // end box
    $o .= '</div>';
 
    // return output
    return $o;
}
 
function acs_shortcodes_init()
{
    add_shortcode('acs', 'acs_shortcode');
}
 
add_action('init', 'acs_shortcodes_init');
?>
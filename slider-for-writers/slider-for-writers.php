<?php
/*
Plugin Name: Slider for Writers
Plugin URI: http://artanik.ru/
Description: Simple wordpress plugin for slider with lightbox in the posts and static page.
Version: 1.3
Author: Artem Anikeev
Author URI: http://artanik.ru/
License: GPL2
Text Domain: slider-for-writers
*/
/*  Copyright 2014  Artanik  (email : artanik94 {at} yandex.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


load_plugin_textdomain( 'slider-for-writers', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

function writer_set_options() {
    add_option('writer_fx');
    add_option('writer_easing');
    add_option('writer_pauseOnHover');
    add_option('writer_autoplay');
    add_option('writer_navs');
    add_option('writer_thumbnail');
    add_option('writer_duration');
    add_option('writer_description');
}

function writer_unset_options() {
    delete_option('writer_fx');
    delete_option('writer_easing');
    delete_option('writer_pauseOnHover');
    delete_option('writer_autoplay');
    delete_option('writer_navs');
    delete_option('writer_thumbnail');
    delete_option('writer_duration');
    delete_option('writer_description');
}

function writer_admin_page() {
    add_options_page('Slider for Writers', 'Slider for Writers', 8, __FILE__, 'writer_options_page');

}

function writer_options_page() {

    $options = array(
     'writer_fx',
     'writer_easing',
     'writer_pauseOnHover',
     'writer_autoplay',
     'writer_navs',
     'writer_thumbnail',
     'writer_duration',
     'writer_description'
    );


    echo '<div class="wrap"><div id="icon-edit" class="icon32"></div><h2>'.__('Slider for Writers - Settings','slider-for-writers').'</h2>';

    foreach ($options as $opt) {
        $$opt = get_option($opt);
    }

    if(isset($_POST['cmd'])) {
        $cmd = $_POST['cmd'];

        foreach ($options as $opt) {
            if(!isset($_POST[$opt]))
                $_POST[$opt] = '';
            
            $$opt = $_POST[$opt];
        }

        if ($cmd == "writer_save_opt") {
            foreach ($options as $opt) {
                update_option($opt, $_POST[$opt]);
            }
        }

        ?>
            <div class="updated"><p><strong> <?php _e('The settings are saved.','slider-for-writers'); ?></strong></p></div>
        <?php
    }

    ?>
    
    <div id="poststuff">
    
        <div id="post-body" class="metabox-holder columns-2">
        
            <!-- main content -->
            <div id="post-body-content">
                
                <div class="meta-box-sortables ui-sortable">
                    
                    <div class="postbox">
                    
                        <h3><span><?php _e('How to use', 'slider-for-writers'); ?></span></h3>
                        <div class="inside">
                            <?php _e('<p>Use icon <code><span alt="f161" class="dashicons dashicons-format-gallery"></span></code> in the editor <em>TinyMCE</em> or shortcode <code>[writer_slider attachment_ids="1,2,3,4,5"]</code>, to display the slider in the article or page.</p>', 'slider-for-writers'); ?>
                            <?php _e('<p>Plugin settings allow modifications to the effects of the transitions.</p>', 'slider-for-writers'); ?>
                        </div> <!-- .inside -->
                    
                    </div> <!-- .postbox -->
                    
                </div> <!-- .meta-box-sortables .ui-sortable -->
                
            </div> <!-- post-body-content -->
            
            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">
                
                <div class="meta-box-sortables">
                    
                    <div class="postbox">
                    
                        <h3><span><?php _e('About the plugin', 'slider-for-writers'); ?></span></h3>
                        <div class="inside">
                            <?php _e('Simple wordpress plugin for slider with lightbox in the articles. Based on <a href="http://dev7studios.com/plugins/caroufredsel" target="_blank">caroufredsel</a>.', 'slider-for-writers'); ?>
                            <?php _e('<p>Powered by <a href="http://artanik.ru/" target="_blank">Artem Anikeev</a> &copy; 2014</p>', 'slider-for-writers'); ?>
                        </div> <!-- .inside -->
                        
                    </div> <!-- .postbox -->
                    
                </div> <!-- .meta-box-sortables -->
                
            </div> <!-- #postbox-container-1 .postbox-container -->
            
        </div> <!-- #post-body .metabox-holder .columns-2 -->
        
        <br class="clear">
    </div> <!-- #poststuff -->

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
    <table class="widefat">
        <tbody>
            <tr>
                <td class="row-title" style="vertical-align: middle;"><label for="writer_fx"><?php _e('Effect(fx) for the transition', 'slider-for-writers'); ?></label></td>
                <td>
                    <select name="writer_fx" id="writer_fx">
                        <?php
                            $writer_fx = empty($writer_fx)?'scroll':$writer_fx;
                            $arr_fx = array("none" , "scroll", "directscroll", "fade", "crossfade", "cover", "cover-fade", "uncover", "uncover-fade");
                            foreach ($arr_fx as $key => $value) {
                                $selected = $writer_fx == $value?' selected="selected"':'';
                                echo '<option value="'.$value.'"'.$selected.'>'.$value.'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr class="alt">
                <td class="row-title" style="vertical-align: middle;"><label for="writer_easing"><?php _e('Easing for the transition', 'slider-for-writers'); ?></label></td>
                <td>
                    <select name="writer_easing" id="writer_easing">
                        <?php
                            $writer_easing = empty($writer_easing)?'swing':$writer_easing;
                            $arr_easing = array("linear", "swing", "quadratic", "cubic", "elastic");
                            foreach ($arr_easing as $key => $value) {
                                $selected = $writer_easing == $value?' selected="selected"':'';
                                echo '<option value="'.$value.'"'.$selected.'>'.$value.'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="row-title" style="vertical-align: middle;"><label for="writer_pauseOnHover"><?php _e('Pause on hover', 'slider-for-writers'); ?></label></td>
                <td>
                    <input name="writer_pauseOnHover" type="checkbox" id="writer_pauseOnHover" value="1" <?php checked( $writer_pauseOnHover, $current = true, $echo = true ); ?> />
                </td>
            </tr>
            <tr class="alt">
                <td class="row-title" style="vertical-align: middle;"><label for="writer_autoplay"><?php _e('Autoplay', 'slider-for-writers'); ?></label></td>
                <td>
                    <input name="writer_autoplay" type="checkbox" id="writer_autoplay" value="1" <?php checked( $writer_autoplay, $current = true, $echo = true ); ?> />
                </td>
            </tr>
            <tr>
                <td class="row-title" style="vertical-align: middle;"><label for="writer_thumbnail"><?php _e('Disable bottom thumbnail', 'slider-for-writers'); ?></label></td>
                <td>
                    <input name="writer_thumbnail" type="checkbox" id="writer_thumbnail" value="1" <?php checked( $writer_thumbnail, $current = true, $echo = true ); ?> />
                </td>
            </tr>
            <tr class="alt">
                <td class="row-title" style="vertical-align: middle;"><label for="writer_navs"><?php _e('Disable bottom nav', 'slider-for-writers'); ?></label></td>
                <td>
                    <input name="writer_navs" type="checkbox" id="writer_navs" value="1" <?php checked( $writer_navs, $current = true, $echo = true ); ?> />
                </td>
            </tr>
            <tr>
                <td class="row-title" style="vertical-align: middle;"><label for="writer_description"><?php _e('Disable descriptions', 'slider-for-writers'); ?></label></td>
                <td>
                    <input name="writer_description" type="checkbox" id="writer_description" value="1" <?php checked( $writer_description, $current = true, $echo = true ); ?> />
                </td>
            </tr>
            <tr class="alt">
                <td class="row-title" style="vertical-align: middle;"><label for="writer_duration"><?php _e('Duration for the transition', 'slider-for-writers'); ?></label></td>
                <td>
                    <input type="text" name="writer_duration" id="writer_duration" value="<?php echo empty($writer_duration)?'1000':$writer_duration; ?>">
                    <span class="description"><?php _e('ms', 'slider-for-writers'); ?></span>
                </td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="cmd" value="writer_save_opt">
    <p class="submit">
        <input type="submit" class="button button-primary" name="Submit" value="<?php _e('Save','slider-for-writers') ?>" /> 
    </p>
    </form>

    
</div> <!-- .wrap -->
    
    <?php

}

register_activation_hook(__FILE__, 'writer_set_options');
register_deactivation_hook(__FILE__, 'writer_unset_options');
add_action('admin_menu', 'writer_admin_page');

require( 'editor/add_buttons.php' );


// [writer_slider attachment_ids="1,2,3,4,5"]
function writer_slider_func( $atts ) {
  global $catalogID;
  extract( shortcode_atts( array(
    'attachment_ids' => '0',
  ), $atts ) );

  $template = '';
  $attachment_ids_arr = explode(',', $attachment_ids);

  $writer_fx = get_option('writer_fx');
  $writer_easing = get_option('writer_easing');
  $writer_description = get_option('writer_description');
  $writer_duration = get_option('writer_duration');
  $writer_autoplay = get_option('writer_autoplay');
  $writer_navs = get_option('writer_navs');
  $writer_thumbnail = get_option('writer_thumbnail');
  $writer_pauseOnHover = get_option('writer_pauseOnHover');

  $writer_fx = empty($writer_fx)?'scroll':$writer_fx;
  $writer_easing = empty($writer_easing)?'swing':$writer_easing;
  $writer_duration = empty($writer_duration)?'1000':$writer_duration;
  $writer_description = empty($writer_description)?true:false;
  $writer_autoplay = empty($writer_autoplay)?'false':'true';
  $writer_navs = empty($writer_navs)?'false':'true';
  $writer_thumbnail = empty($writer_thumbnail)?'false':'true';
  $writer_pauseOnHover = empty($writer_pauseOnHover)?'false':'true';

  $template .= '<div  class="dev7-caroufredsel-wrapper">';
  $template .= '<div class="dev7-caroufredsel-carousel dev7-caroufredsel-main" data-fx="'.$writer_fx.'" data-easing="'.$writer_easing.'" data-duration="'.$writer_duration.'" data-autoplay="'.$writer_autoplay.'" data-pause-on-hover="'.$writer_pauseOnHover.'">';
  foreach ($attachment_ids_arr as $attachment_id) {
    $image_attributes = wp_get_attachment_image_src( $attachment_id, 'large');
    if( $image_attributes ) {
      $alt = trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)));
      $description = $writer_description?'<span>'.$alt.'</span>':'';
      $template .= '<div class="dev7-caroufredsel-image"><img src="'. $image_attributes[0] .'" data-img="'.$image_attributes[0].'" title="'.$alt.'" alt="'.$alt.'">'.$description.'</div>';
    }
  }
  $template .= '</div>';

  $template .= '<div class="dev7-clearfix"></div>';

  $noneClass = $writer_navs==="true"?' none':'';
  $thumbClass = $writer_thumbnail==="true"?' noneThumb':'';
  $template .= '<div class="dev7-caroufredsel-wrapper-pag'.$noneClass.$thumbClass.'"><div class="dev7-caroufredsel-pag" id="caroufredsel-6">';
  foreach ($attachment_ids_arr as $attachment_id) {
    $image_attributes = wp_get_attachment_image_src( $attachment_id, 'thumbnail');
    if( $image_attributes ) {
      $template .= '<a class="dev7-caroufredsel-thumb" href="#"><img src="'. $image_attributes[0] .'" width="'. $image_attributes[1] .'" height="'. $image_attributes[2] .'"></a>';
    }
  }
  $template .= '</div></div></div>';
  $template .= '<div class="clearfix"></div>';

  return $template;
}

add_shortcode( 'writer_slider', 'writer_slider_func' );
add_action('wp_print_styles', 'writer_slider_css');
add_action( 'wp_enqueue_scripts', 'writer_slider_js' );

function writer_slider_css() {
    wp_enqueue_style( 'zoomSliderCss', plugins_url( 'assets/plugin_styles.css', __FILE__ ));
}

function writer_slider_js() {
    wp_enqueue_script('zoomImagesloaded', plugins_url( 'assets/jquery.imagesloaded.min.js', __FILE__ ), array('jquery'));
    wp_enqueue_script('zoomColorbox', plugins_url( 'assets/jquery.colorbox-min.js', __FILE__ ), array('jquery'));
    wp_enqueue_script('zoomCarouFredSel', plugins_url( 'assets/jquery.carouFredSel-6.2.1-packed.js', __FILE__ ), array('jquery'));
    wp_enqueue_script('zoomSliderJs', plugins_url( 'assets/plugin_scripts.js', __FILE__ ), array('jquery'));
}
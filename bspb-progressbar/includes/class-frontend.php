<?php
if ( ! defined( 'ABSPATH' ) )
	exit;

//define( 'DYNAMICSCRIPTVERSION', '0.1.0' );

new BSPB_Frontend();
//echo dirname( __FILE__ ) . '/../css/custom-css.php';
/**
 * Responsive Lightbox frontend class.
 *
 * @class Responsive_Lightbox_Frontend
 */
class BSPB_Frontend {

	//public $gallery_no = 0;

	public function __construct() {

$this->make_shortcode();


//add_action( 'wp_enqueue_scripts', array( $this, 'theme_custom_style_script' )  , 11 );

//wp_enqueue_scripts = load on front-end

//add_action( 'wp_enqueue_scripts', array( $this, 'prefix_add_my_stylesheet' ), 10  );
//add_action( 'wp_ajax_dynamic_css', array( $this, 'dynamic_css' ) );
//add_action( 'wp_ajax_nopriv_dynamic_css', array( $this, 'dynamic_css' ));
//add_action( 'wp_enqueue_scripts', array( $this, 'dynamic_css_enqueue' ) );

	}



  public function bspb_animated( $atts, $content ) {
	  //echo get_option('setting_a');
	  $settings = BSPB_Plugin()->options['settings'];
	  $animation = BSPB_Plugin()->options['animation'];

	  //$options_text = get_option( 'bspb_settings_text_options');

	  $type = $settings['script'];

	  $opacity_bar = $settings['opacity_bar'];
	  $transparent_background = $settings['transparent_background'];
	  $background_color = $settings['background_color'];
	  $bar_color = $settings['bar_color'];
	  $opacity_bar_angles = $animation['opacity_bar_angles'];
	  $animate_opacity_bar = $animation['animate_opacity_bar'];
	  $animate_opacity_bar_speeds = $animation['animate_opacity_bar_speeds'];
	  $draw_on_scroll = $animation['draw_on_scroll'];
	  $draw_on_scroll_animation_speeds = $animation['draw_on_scroll_animation_speeds'];
	  $configuration = BSPB_Plugin()->options['configuration'][$type];
	  $show_title = $configuration['show_title'];
	  $show_value = $configuration['show_value'];
	  $title_position = $configuration['title_position'];
	  $value_position = $configuration['value_position'];
	  $bar_width = $configuration['bar_width'];
	  $bar_height = $configuration['bar_height'];
	 // ['video_max_width'];

//echo $opacity_bar_angles;
$data = shortcode_atts(array(
    "text" => '',
    "value" => '',
    "type" => $type,
    "class_parent" => '',
    "class_child" => '',
    "bgcolor" => '',
    "barcolor" => $bar_color,
    "opacity_bar" => $opacity_bar,
    "opacity_bar_angles" => $opacity_bar_angles,
    "animate_opacity_bar" => $animate_opacity_bar,
    'animate_opacity_bar_speeds' =>  $animate_opacity_bar_speeds,
    "draw_on_scroll" => $draw_on_scroll,
    "draw_on_scroll_animation_speeds" => $draw_on_scroll_animation_speeds,
    "show_title" => $show_title,
    "show_value" => $show_value,
    "width" => $bar_width,
    "height" => $bar_height,
    "title_position" => $title_position,
    "value_position" => $value_position,
    "style_parent" => '',
    "style_child" => '',
    //"drawon" => $bar_height,
    //"liststart" => DEMOLP_LISTSTART,
    //"listend" => DEMOLP_LISTEND,
    //"itemstart" => DEMOLP_ITEMSTART,
    //"itemend" => DEMOLP_ITEMEND
  ), $atts);
    //echo $data['text'];
  //echo $data['value'];
$valuetostring = strip_tags($data['value']);
//$html = str_replace(' *\%', 'a', $html);
$valuetostring = preg_replace('/%.*/s', '', $valuetostring);
//$html = substr($html, 0, strpos($html, '%'));
//echo $html;
if($data['type'] == 'horizontal'){$data['class_child'] .= 'horiz ';}
if($data['type'] == 'vertical'){$data['class_child'] .= 'vert ';}
if($data['type'] == 'horizontal' && $data['opacity_bar']){$data['class_child'] .= 'progress-bar-striped-horizontal ' . $data['opacity_bar_angles'] . ' ';}
if($data['type'] == 'vertical' && $data['opacity_bar']){$data['class_child'] .= 'progress-bar-striped-vertical ' . $data['opacity_bar_angles'] . ' ';}

if($data['animate_opacity_bar']){$data['class_child'] .= 'active ' . $animate_opacity_bar_speeds;}

if($transparent_background || $data['bgcolor'] ){$data['style_parent'] .= 'background-color:'. $data['bgcolor'] .'!important;';}
if($data['width']){$data['style_parent'] .= 'width:'. $data['width'] .'% !important;';}
if($data['height']){$data['style_parent'] .= 'height:'. $data['height'] .'px !important;';}

//if($data['opacity_bar']){$data['class_child'] .= ' active';}

if($data['type'] == 'horizontal' && $data['draw_on_scroll']){$data['class_child'] .= ' '. $draw_on_scroll_animation_speeds;}
if($data['type'] == 'vertical' && $data['draw_on_scroll']){$data['class_child'] .= ' '. $draw_on_scroll_animation_speeds;}
       // $data = shortcode_atts(array('text' => '', 'value' => ''), $atts);
       $bspbanimated_output = '<div id="progress-'. $data['text'] .'" class="progress center-block progress-bar-' . $data['type'] . ' ' . $data['class_parent'] .'"  style="'. $data['style_parent'] .'">
    <div class="progress-bar six-sec-ease-in-outs progress-bar-customs '. $data['class_child'] .'" style="background-color:'. $data['barcolor'] .'" role="progressbar"  aria-valuenow="' . $valuetostring . '" aria-valuemin="0" aria-valuemax="' . $valuetostring . '">';
    if($data['show_title']){$bspbanimated_output .= '<div class="title '. $data['title_position'] .'">'. $data['text'] .'</div>';}
    if($data['show_value']){$bspbanimated_output .= '<div class="value '. $data['value_position'] .'" data-index='. $valuetostring .'>'. $data['value'] .'</div>';}
	$bspbanimated_output .= '</div></div>';



  return $bspbanimated_output;

    }

public function make_shortcode() {
   add_shortcode('bspb', array($this,'bspb_animated'));
    //add_shortcode( 'bspb_animated', array( &$this, 'bsprogressbaranimated_handler' ) );
}

}
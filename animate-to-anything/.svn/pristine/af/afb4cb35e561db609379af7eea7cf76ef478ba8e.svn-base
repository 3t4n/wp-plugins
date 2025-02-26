<?php
/**
 * Plugin Name: Animate To Anything
 * Plugin URI: https://wordpress.org/plugins/animate-to-anything/
 * Description: You can animate any element of your website by using its class or id. a large no. of animations and easy to use. Make your website more attractive and playfull.
 * Version: 0.1
 * Author: Manpreet Singh
 */
 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/** Step 2 (from text above). */
add_action( 'admin_menu', 'animateanything_register_menus' );

/** Step 1. */
function animateanything_register_menus() {
    add_menu_page( 
        _( 'Animation Setting', 'textdomain' ),
        'Animation',
        'manage_options',
        'Animate_page',
        'animateanything_changes_form',
        'dashicons-tickets-alt'); 
}
/** Step 3. */
function animateanything_changes_form() {
  if(is_admin()){   
  wp_enqueue_style( 'customcss', plugins_url( 'include/css/style.css', __FILE__));  

  if( isset($_POST['save-animation'])){
      $animate_classid = sanitize_text_field( $_POST['class-or-id'] );
      $style_animation = sanitize_text_field( $_POST['animate-style'] );
      $duration_animation = sanitize_text_field( $_POST['animated-duration'] );
      $speed_animate = sanitize_text_field( $_POST['animation-speed'] );
      $infinite_animate = sanitize_text_field( $_POST['animation-infinite'] );

  $Ani_array = array(
      'class-or-id' => $animate_classid,
      'animate-style' => $style_animation,
      'animated-duration' => $duration_animation,
      'animation-speed' => $speed_animate,
      'animation-infinite' => $infinite_animate
        );
  update_option('animation_var',$Ani_array);
  $success = "Saved Successfully";
  }
$logi = get_option('animation_var',true); ?>
<div class="animated-design">
  <?php if($success){ ?>
    <div id="message" class="updated notice notice-success is-dismissible">
      <p><?php echo $success; ?></p><button type="button" class="notice-dismiss"></button>
    </div>
  <?php }?>
  <h3><?php echo esc_html( 'Animate To Anything' ); ?></h3>
  <h6 class="Ani-setting"><?php echo esc_html( 'Animation Settings'); ?></h6>
  <form  method="post" >
    <label>Please mention your Any class or id which you want to animate</label><br>
      <input type="text" name="class-or-id" required placeholder="example :- .class or #id "value="<?php echo $logi['class-or-id']; ?>">
    <label>Select Animation type :</label><br>
      <select class="input input--dropdown js--animations" name="animate-style">
      <?php            
      $optionarr = array("bounce","flash","pulse","rubberBand","shake","swing","tada","wobble","jello","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp","bounceOut","bounceOutDown","bounceOutLeft","bounceOutRight","bounceOutUp","fadeIn","fadeInDown","fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig","fadeOut","fadeOutDown","fadeOutDownBig","fadeOutLeft","fadeOutLeftBig","fadeOutRight","fadeOutRightBig","fadeOutUp","fadeOutUpBig","flip","flipInX","flipInY","flipOutX","flipOutY","lightSpeedIn","lightSpeedOut","rotateIn","rotateInDownLeft","rotateInDownRight","rotateInUpLeft","rotateInUpRight","rotateOut","rotateOutDownLeft","rotateOutDownRight","rotateOutUpLeft","rotateOutUpRight","slideInUp","slideInDown","slideInLeft","slideInRight","slideOutUp","slideOutDown","slideOutLeft","slideOutRight",   "zoomIn","zoomInDown","zoomInLeft","zoomInRight","zoomInUp","zoomOut","zoomOutDown","zoomOutLeft","zoomOutRight","zoomOutUp","hinge","rollIn");
      foreach($optionarr as $arrayopt){
        if($logi["animate-style"] == $arrayopt){ $select = "selected"; }else{ $select="";  }
        echo '<option '.$select.' value="'.$arrayopt.'">'.$arrayopt.'</option>';
        } ?>
      </select>
    <label>Fill Animate Duration Time (in seconds):</label><br>
      <input type="number" placeholder="0" name="animated-duration" min="0" value="<?php echo $logi['animated-duration']; ?>">
  
    <label>Fill Animate Speed (in seconds):</label><br>
      <input type="number" placeholder="0" name="animation-speed" min="0" value="<?php echo $logi['animation-speed']; ?>">

    <label>Make the Animate Duration Infinite or Non-Infinite :</label><br>
      <?php if ($logi['animation-infinite']=='infinite'){ $checked = "checked";}else{$not_checked="checked";} ?>
      <input type="radio" name="animation-infinite" <?php echo esc_html($checked) ; ?> value="infinite">Infinite
      <input type="radio" name="animation-infinite" <?php echo esc_html($not_checked); ?> value="">Non-Infinite <br>
	  <input type="submit" class="button button-primary" name="save-animation" value="Save" />
  </form>
</div> 
  <?php
} }
// add class or scripts

 function animateanything_classed(){
    $logi = get_option('animation_var',true); ?>
    <style>
      .animated{
        animation : <?php echo $logi['animation-speed']; ?>s <?php echo $logi['animation-infinite']; ?> ;
        -webkit-animation-duration: <?php echo $logi['animated-duration']; ?>s ;
        animation-duration: <?php echo $logi['animated-duration']; ?>s ;
      }
    </style>
    <script>
      jQuery(document).ready(function($){
      $("<?php echo $logi['class-or-id']; ?>").addClass("<?php echo $logi['animate-style']; ?> animated");
      });
    </script>
    <?php
	wp_enqueue_style('link_animated', plugins_url('include/css/animated.css', __FILE__ ));
  }
add_action('wp_footer','animateanything_classed'); ?>
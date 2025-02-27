<?php

/*
Plugin Name: Christmas Countdown Widget
Plugin URI: https://christmaswebmaster.com/santa-claus-christmas-countdown-wordpress-plugin
Description: Displays a cute Christmas countdown in your sidebar.
Author: Monica Haught
Version: 3.0
Author URI: https://christmaswebmaster.com/

Christmas Countdown Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or 
any later version.

Christmas Countdown Widget is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Christmas Countdown Widget. If not, see <http://www.gnu.org/licenses/>.
*/

//Adds Countdown Shortcodes

function cw_CountDownShortcode_left() {  
    return '<div style="float:left;padding-right:15px;"><div id="cw_countdown"><div class="cw_countdown-text">
          <script type="text/javascript">
          <!--
          cw_axmascount();
          //--></script></div></div></div>';  
}  
add_shortcode('countdown', 'cw_CountDownShortcode_left');

function cw_CountDownShortcode_right() {  
    return '<div style="float:right;padding-left:15px;"><div id="cw_countdown"><div class="cw_countdown-text">
          <script type="text/javascript">
          <!--
          cw_axmascount();
          //--></script></div></div></div>';  
}  
add_shortcode('countdown-right', 'cw_CountDownShortcode_right');


function cw_CountDownShortcode_center() {  
    return '<div style="margin: 0 auto;"><div id="cw_countdown"><div class="cw_countdown-text">
          <script type="text/javascript">
          <!--
          cw_axmascount();
          //--></script></div></div></div>';  
}  
add_shortcode('countdown-center', 'cw_CountDownShortcode_center');

//Enqueue Countdown Scripts and Styles

function cw_santas_countdown_scripts() {
  wp_enqueue_style( 'xmascount-styles', plugins_url( 'css/cw_xmascount-styles.css', __FILE__ ) );
  wp_enqueue_script( 'xmascount-scripts', plugins_url( 'scripts/scriptfile.js', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'cw_santas_countdown_scripts' );

//Extends Countdown Widget

class cw_axmascount extends WP_Widget {
 public function __construct() {
    $widget_ops = array(
      'classname'   => 'cw_axmascount',
      'description' => 'Drag this widget to your sidebar to display Santa\'s Christmas Countdown.',
    );
      parent::__construct(
        'cw_axmascount',
        'Santa\'s Countdown',
        $widget_ops
      );
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
}
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 

    echo '<div id="cw_countdown"><div class="cw_countdown-text">
          <script type="text/javascript">
          <!--
          cw_axmascount();
          //--></script></div></div>';
 
    echo $after_widget;
  }
 
}
  function cw_axmascount_register_widgets() 
  {
    return register_widget( 'cw_axmascount' );
  }
add_action( 'widgets_init', 'cw_axmascount_register_widgets' );
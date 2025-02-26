<?php
/**
 * Plugin Name: Clear Block Widget
 * Plugin URI: http://stevejamesson.com/?p=866
 * Description: Simply outputs a clearing block in a widget area
 * Version: 0.2
 * Author: Steve Jamesson
 * Author URI: http://stevejamesson.com
 * License: GPL2
 */
/*  Copyright 2011  Steve Jamesson  (email : steve (dot) jamesson (at) gmail (dot) com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 
add_action( 'widgets_init', 'groovy_clearwidget_init' );
function groovy_clearwidget_init() {
  register_widget( 'Groovy_ClearWidget' );
}

class Groovy_ClearWidget extends WP_Widget {
  
  function Groovy_ClearWidget() {
    parent::WP_Widget( false, $name = 'Clear Block' );
  }
  
  function form( $instance ) {
    $height = esc_attr( $instance['height'] );
    $class  = esc_attr( $instance['class'] );
    $inline = esc_attr( $instance['disable_inline_style'] );
    ?>
      <p>
        <label>
          <input type="checkbox" name="<?php echo $this->get_field_name('disable_inline_style') ?>" id="<?php echo $this->get_field_id('disable_inline_style') ?>" value="1" <?php echo $inline == 1 ? 'checked="checked"' : '' ?> /> Disable inline style output
        </label>
      </p>
      <p>
        <label>Height: 
        <input type="text" size="3" name="<?php echo $this->get_field_name('height') ?>" id="<?php echo $this->get_field_id('height') ?>" value="<?php echo $height ?>" /></label><br />
        <span class="howto">Include unit (i.e. "1px"). Default = 0</span>
      </p>
      <p><label>CSS Class:
        <input type="text" size="10" name="<?php echo $this->get_field_name('class') ?>" id="<?php echo $this->get_field_id('class') ?>" value="<?php echo $class ?>" /></label><br />
        <span class="howto">Default: 'clear'</span>
      </p>
    <?php
  }
  
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['height'] = strip_tags( $new_instance['height'] );
    $instance['class'] = strip_tags( $new_instance['class'] );
    $instance['disable_inline_style']  = strip_tags( $new_instance['disable_inline_style'] );
    return $instance;
  }
  
  function widget( $args, $instance ) {
    $height = $instance['height'];
    $class  = $instance['class'];
    $inline = $instance['disable_inline_style'];
    
    $out = "\n".'<div class="' . (empty($class) ? 'clear' : $class) . '"';
    
    $style = '';
    if (1 != $inline) {
      $style .= ' style="';
      $style .= 'clear:both; ';
      $style .= 'height:' . ($height ? $height : '0') . '; ';
      $style .= 'visibility: hidden;"';
    }

    $out .= $style . '></div>'."\n";

    echo $out;
  }
}

// EOF
<?php /*
Plugin Name: Diwali Countdown
Plugin URI: http://lamp.sangkrit.net/
Description: Displays Diwali countdown in your theme's widget area.
Author: Shardul Pandey
Author URI: http://lamp.sangkrit.net/
Version: 2.0


Diwali Countdown has been modified from Halloween Countdown Widget by Monica Mays is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or 
any later version.

Diwali Countdown Widget is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with the Diwali Countdown Widget. If not, see <http://www.gnu.org/licenses/>.
*/



 

class hallocount extends WP_Widget
{
  function hallocount()
  {
    $widget_ops = array('classname' => 'hallocount', 'description' => 'Displays Diwali Countdown' );
    $this->WP_Widget('hallocount', 'Diwali Countdown', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
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
     echo "<div style=\"background-image: url(".plugins_url('img/vampy.png', __FILE__)."); margin: 0 auto;
     height:162px; 
     width:180px; 
     background-repeat: no-repeat;
     background-size: 180px 162px;
     text-align:center;\"><div style=\"font-weight:normal;
     font-size:20px; 
     padding-right: 0px; 
     padding-top:88px; 
     text-align:center;
     font-family: comic sans ms;
     color: #FFFF00;\"><script language=\"javascript\" type=\"text/javascript\">
        today = new Date();
        BigDay = new Date(\"November 03, 2013\")
        msPerDay = 24 * 60 * 60 * 1000;
        timeLeft = (BigDay.getTime() - today.getTime());
        e_daysLeft = timeLeft / msPerDay;
        daysLeft = Math.floor(e_daysLeft);
        e_hrsLeft = (e_daysLeft - daysLeft) * 24;
        hrsLeft = Math.floor(e_hrsLeft);
        minsLeft = Math.floor((e_hrsLeft - hrsLeft) * 60);
        document.write(\"\" + daysLeft + \" days<BR>till Diwali!\");
    </script></div></div>";
    echo $after_widget;
  }
 
}

add_action( 'widgets_init', create_function('', 'return register_widget("hallocount");') );?>
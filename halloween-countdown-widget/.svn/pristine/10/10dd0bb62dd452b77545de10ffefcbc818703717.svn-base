<?php
/*
Plugin Name: Halloween Countdown Widget
Plugin URI: https://christmaswebmaster.com/
Description: Get into the Halloween spirit with a cute countdown widget for your sidebar! The classic 'Vampy' Countdown is back, and in version 3, we've added four new spooky backgrounds! Choose your favorite... Classic Vampy or a Ghost, the Moon, a Cauldron, or Candy and countdown to the spookiest night of the year in style!
Author: Monica Haught
Author URI: https://christmaswebmaster.com/
Version: 3.0.2

Halloween Countdown Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or 
any later version.

Halloween Countdown Widget is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with the Halloween Countdown Widget. If not, see <http://www.gnu.org/licenses/>.
*/

class hallocount extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'hallocount', 'description' => 'Displays a cute Halloween countdown.' );
    parent::__construct('hallocount', 'Halloween Countdown', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args((array) $instance, array('title' => '', 'image' => 'vampy.png'));
    $title = $instance['title'];
    $image = $instance['image'];
    $images = array('vampy.png' => 'Vampire', 'ghost.png' => 'Ghost', 'moon.png' => 'Moon', 'cauldron.png' => 'Cauldron', 'candy.png' => 'Candy');
?>
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Title: 
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('image'); ?>">Background Image: 
      <select class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>">
        <?php foreach ($images as $file => $label) : ?>
          <option value="<?php echo esc_attr($file); ?>" <?php selected($image, $file); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['image'] = strip_tags($new_instance['image']);
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
    $image = empty($instance['image']) ? 'vampy.png' : $instance['image'];
    $image_class = str_replace('.png', '', $image);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;
    
    // Enqueue CSS file
    wp_enqueue_style('halloween-countdown', plugins_url('halloween-countdown.css', __FILE__));
     
    echo "<div class=\"hallocount-widget $image_class\"><div class=\"countdown-text\"><script language=\"javascript\" type=\"text/javascript\">
today = new Date();
thismon = today.getMonth();
thisday = today.getDate();
thisyr = today.getFullYear();
if (thismon > 9 || (thismon == 9 && thisday > 31))
  {
  thisyr = ++thisyr;
  }
BigDay = new Date(\"October 31, \"+thisyr);

msPerDay = 24 * 60 * 60 * 1000;
timeLeft = (BigDay.getTime() - today.getTime() - 1);
e_daysLeft = timeLeft / msPerDay;
daysLeft = Math.ceil(e_daysLeft);
if (daysLeft <= 0 )
{
document.write(\"Happy<br>Halloween!\")
}
else if (daysLeft == 1 )
{
document.write( \"\"+daysLeft+\" day <BR> till Halloween!\");}
else
{
document.write( \"\"+daysLeft+\" days <BR> till Halloween!\");}
    </script></div></div>";
    echo $after_widget;
  }
 
}

add_action('widgets_init', function() {
  register_widget('hallocount');
});
?>
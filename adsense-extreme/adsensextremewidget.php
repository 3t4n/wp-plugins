<?php
class adsense_extreme_Widget extends WP_Widget
{
   function adsense_extreme_Widget()
   {
      $widget_ops = array('classname' => 'adsense_extreme_Widget', 'description' => 'Adsense Modify via Settings / Adsense Extreme');
      $this->WP_Widget('aeopt', 'Adsense Extreme', $widget_ops);
   }
   function widget($args, $instance)
   {
      extract($args, EXTR_SKIP);
      echo $before_widget;
      if ((isset($_SESSION['adsensextreme_noad'])) && ($_SESSION['adsensextreme_noad']==0)) {
          $title = apply_filters('widget_title', $instance['title']);
          $adtype = empty($instance['adtype']) ? '5' : apply_filters('widget_adtype', $instance['adtype']);
          if(!empty($title))
          {
             echo $before_title . $title . $after_title;
          }
          aeopt($adtype);
      }
      echo $after_widget;
   }
   function update($new_instance, $old_instance)
   {
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['adtype'] = strip_tags($new_instance['adtype']);
      return $instance;
   }
   function form($instance)
   {
      $instance = wp_parse_args((array)$instance, array('title' => '', 'adtype' => ''));
      $title = strip_tags($instance['title']);
                          $adtype = strip_tags($instance['adtype']);
                    ?>

<p>
  Title: <input class="widefat"
    name="<?php echo $this->get_field_name('title');          ?>" type="text"
    value="<?php echo attribute_escape($title);          ?>" />
</p>

<p>
  Ad Type: (1-5) <input class="widefat"
    name="<?php echo $this->get_field_name('adtype');          ?>" type="text"
    value="<?php echo attribute_escape($adtype);          ?>" />
</p>

<?php

                       }
                    }
?>
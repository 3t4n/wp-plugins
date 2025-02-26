<?php
/*
Plugin Name: DOI Indentifier
Plugin URI: http://techooid.com/dev/wp-plugins/
Description: Resolve DOI to find the research articles.
Version: 1.0
Author: Haseeb Ahmad
Author URI: http://techooid.com/dev/
*/
 
 
class doiidentifier extends WP_Widget
{
  function doiidentifier()
  {
    $widget_ops = array('classname' => 'doiidentifier', 'description' => 'DOI Identifier' );
    $this->WP_Widget('doiidentifier', 'DOI Identifier', $widget_ops);
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
 
    // WIDGET CODE GOES HERE
echo <<<_HTML

<form method="post" action="https://dx.doi.org" id="resolveID" accept-charset="utf-8">
<input type="text" name="hdl" id="nameID" size="40">
<input type="submit" value="Resolve DOI">
</form>

_HTML;


    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("doiidentifier");') );?>
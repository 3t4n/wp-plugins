<?php 
class imagerandomizerwidget extends WP_Widget
{
  function imagerandomizerwidget()
  {
    $widget_ops = array('classname' => 'imagerandomizerwidget', 'description' => 'Displays random images' );
    $this->WP_Widget('imagerandomizerwidget', 'Image Randomizer', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '','content' => '' ) );
    $title = $instance['title'];
    $content = $instance['content'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['content'] = $new_instance['content'];
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
$query_images_args = array(
    'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
);

$query_images = new WP_Query( $query_images_args );
$images = array();
foreach ( $query_images->posts as $image) {
    $images[]= wp_get_attachment_url( $image->ID );
}
echo("<img src='".$images[rand (0 ,count($images)-1)]."' width='100%'>");
 
    echo $after_widget;
  }
 
}
?>
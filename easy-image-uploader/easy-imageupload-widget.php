<?php
// =============================== My Post Cycle widget ======================================
class Easy_ImageUploader extends WP_Widget {
    /** constructor */
    function Easy_ImageUploader() {
        parent::WP_Widget(false, $name = 'Easy Image Uploader');    
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {        
        extract( $args );
    $title = esc_attr($instance['title']);
    $image = esc_attr($instance['image']);
    $content = esc_attr($instance['content']);
    $link = esc_attr($instance['link']);
    //$weight = (esc_attr($instance['weight'])) ? esc_attr($instance['weight']) : 239;
    //$height = (esc_attr($instance['height'])) ? esc_attr($instance['height']) : 189;
                echo $before_widget;  ?>
                 <div class="col-sm-4">
                    <div class="three-box-inner">
                       <img src="<?php echo $image; ?> " alt="img1" class="aligncenter">
                        <h2><?php echo $title; ?></h2>
                        <p><?php echo $content; ?></p>
                        <dfn><span class="read-more"><a href="<?php echo $link; ?>"><?php _e('Read More','pim'); ?></a></span></dfn>
                    </div>
                </div>
                  <?php echo $after_widget; ?>
        <?php
    }
    
    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {                
        return $new_instance;
    }
    
    /** @see WP_Widget::form */
    function form($instance) {                
    $title = esc_attr($instance['title']);
    $image = esc_attr($instance['image']);
    $content = esc_attr($instance['content']);
    $link = esc_attr($instance['link']);
       ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'vista'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
      <?php
   $arg = array(
   
        'parent_div_class'=> 'custom-image-upload',
                
        'field_name' => $this->get_field_name('image'),
        'field_id' => 'upload_logo',
        'field_class' => 'upload_image_field',
        
        'upload_button_id' => 'upload_logo_button',
        'upload_button_class' => 'upload_logo_button',
        'upload_button_text' => 'Upload',
        
        'remove_button_id' => 'remove_logo',
        'remove_button_class' => 'remove_logo_button',
        'remove_button_text' => 'Remove'
        
        );
       eiu_add_media_custom($arg,false,$image);
   ?>
      
      <p><label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:', 'vista'); ?> <textarea class="widefat content" rows="10" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" ><?php echo $content; ?></textarea></label></p>
      <p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:', 'vista'); ?> <input class="widefat <?php echo $this->get_field_id('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" /></label></p>
       <style>
/*         .remove_box {
        display: none !important;
        }
          */
      </style>

      <?php 
      /*
      <p><label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'vista'); ?> <input class="widefat <?php echo $this->get_field_id('height'); ?>" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" /></label></p>
      <p><label for="<?php echo $this->get_field_id('weight'); ?>"><?php _e('Width:', 'vista'); ?> <input class="widefat <?php echo $this->get_field_id('weight'); ?>" id="<?php echo $this->get_field_id('weight'); ?>" name="<?php echo $this->get_field_name('weight'); ?>" type="text" value="<?php echo $weight; ?>" /></label></p>
      */
    }
    

} // class Cycle Widget
function register_my_widget()
{
    register_widget('Easy_ImageUploader');
}
add_action('widgets_init','register_my_widget');
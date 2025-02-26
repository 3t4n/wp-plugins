<?php
/*
Plugin Name: Go MultiWidget+
Plugin URI: http://www.seofixing.com/
Description: Adds a Social widget to connect your website with Facebook, Twitter, Google+. Show external Rss feeds with thumbnails
Version: 1.3
Author: Bestseogr
Author URI: http://www.seofixing.com/
License: GPL2
*/

if(!function_exists("get_first_image_url")) {
function get_first_image_url($html)
        {
            if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)) {
            return $matches[1];
			echo $matches[1];
            }
        }
}		
	
class wp_gosocial_plugin extends WP_Widget {

	// constructor
    function wp_gosocial_plugin() {
        parent::__construct(false, $name = __('Go MultiWidget', 'wp_gs_plugin') );
                                  }		   
	// widget form creation
function form($instance) {
    // Check values
if( $instance) {
     $show=0;
     $title = esc_attr($instance['title']);
     $text = esc_attr($instance['text']);
	 $text1 = esc_attr($instance['text1']);
	 $text2 = esc_attr($instance['text2']);
	 $text3 = esc_attr($instance['text3']);
	 $text4 = esc_attr($instance['text4']);
	 $text41 = esc_attr($instance['text41']);
	 $text42 = esc_attr($instance['text42']);
	 $text43 = esc_attr($instance['text43']);
	 $checkbox = esc_attr($instance['checkbox']);  
	 $checkbox1 = esc_attr($instance['checkbox1']);  
	 $checkbox2 = esc_attr($instance['checkbox2']);
     $checkbox22 = esc_attr($instance['checkbox22']); 	 
     $checkbox61 = esc_attr($instance['checkbox61']); 
     $checkbox62 = esc_attr($instance['checkbox62']); 
     $checkbox63 = esc_attr($instance['checkbox63']); 
     $checkbox7 = esc_attr($instance['checkbox7']); 	 
     $textarea = esc_textarea($instance['textarea']);
} else {
     $show=0;
     $title = '';
     $text = '';
	 $text1 = '';
     $text2 = '';
	 $text3 = '292';
	 $text4 = '';
	 $text41 = '';
	 $text42 = '250';
	 $text43 = '150';
	 $checkbox = ''; 
	 $checkbox1 = '';
	 $checkbox2 = '';
	 $checkbox61 = '1';
	 $checkbox62 = '1';
	 $checkbox63 = '1';
	 $checkbox7 = '';
	 $textarea = '';
	 $checkbox22 = '1';
} ?>
<p><img src="<?php echo plugins_url( '/assets/gomultiwidget.png', __FILE__ ); ?>" align="center" width="225px" /></p>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_gs_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p><b>VISIBILITY SETTINGS:</b></p>
<p>
<input id="<?php echo $this->get_field_id('checkbox61'); ?>" name="<?php echo $this->get_field_name('checkbox61'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox61 ); ?> />
<label for="<?php echo $this->get_field_id('checkbox61'); ?>"><?php _e('Home', 'wp_gs_plugin'); ?></label>
<input id="<?php echo $this->get_field_id('checkbox62'); ?>" name="<?php echo $this->get_field_name('checkbox62'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox62 ); ?> />
<label for="<?php echo $this->get_field_id('checkbox62'); ?>"><?php _e('Category', 'wp_gs_plugin'); ?></label>
<input id="<?php echo $this->get_field_id('checkbox63'); ?>" name="<?php echo $this->get_field_name('checkbox63'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox63 ); ?> />
<label for="<?php echo $this->get_field_id('checkbox63'); ?>"><?php _e('Posts', 'wp_gs_plugin'); ?></label>
</p>
<p><img src="<?php echo plugins_url( '/assets/facebook.png', __FILE__ ); ?>" align="left" width="20px" /><b>FACEBOOK SETTINGS:</b><br/></p>
<p>
<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Facebook:', 'wp_gs_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
</p>
<p>
<input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?> />
<label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Show Faces', 'wp_gs_plugin'); ?></label>
<input id="<?php echo $this->get_field_id('checkbox1'); ?>" name="<?php echo $this->get_field_name('checkbox1'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox1 ); ?> />
<label for="<?php echo $this->get_field_id('checkbox1'); ?>"><?php _e('Show Stream', 'wp_gs_plugin'); ?></label>
</p>
<p>
<label for="<?php echo $this->get_field_id('text3'); ?>"><?php _e('Like Box Width:', 'wp_gs_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('text3'); ?>" name="<?php echo $this->get_field_name('text3'); ?>" type="text" size="100px" value="<?php echo $text3; ?>" />
</p>
<p><img src="<?php echo plugins_url( '/assets/twitter.png', __FILE__ ); ?>" align="left" width="20px" /><b>TWITTER SETTINGS:</b><br/></p>
<p>
<label for="<?php echo $this->get_field_id('text1'); ?>"><?php _e('Twitter:', 'wp_gs_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo $text1; ?>" />
</p>
<p><img src="<?php echo plugins_url( '/assets/google.png', __FILE__ ); ?>" align="left" width="20px" /><b>GOOGLE+ SETTINGS:</b><br/></p>
<p>
<label for="<?php echo $this->get_field_id('text2'); ?>"><?php _e('Google+ Page ID:', 'wp_gs_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>" type="text" value="<?php echo $text2; ?>" />
</p>
<p><img src="<?php echo plugins_url( '/assets/rss.png', __FILE__ ); ?>" align="left" width="20px" /><b>RSS FEED SETTINGS:</b><br/></p>
<p>
<label for="<?php echo $this->get_field_id('text4'); ?>"><?php _e('RSS Feed to display:', 'wp_gs_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('text4'); ?>" name="<?php echo $this->get_field_name('text4'); ?>" type="text" value="<?php echo $text4; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('text41'); ?>"><?php _e('How many Items?', 'wp_gs_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('text41'); ?>" name="<?php echo $this->get_field_name('text41'); ?>" type="text" value="<?php echo $text41; ?>" />
</p>
<p>
<input id="<?php echo $this->get_field_id('checkbox7'); ?>" name="<?php echo $this->get_field_name('checkbox7'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox7 ); ?> />
<label for="<?php echo $this->get_field_id('checkbox7'); ?>"><?php _e('Show Feed Thumbnails?', 'wp_gs_plugin'); ?></label>
</p>
<p><b>THUMBNAIL DIMENSIONS:</b></p>
<p>
<label for="<?php echo $this->get_field_id('text42'); ?>"><?php _e('Width:&nbsp;', 'wp_gs_plugin'); ?></label>
<input class="widefat" style="width:50px;" id="<?php echo $this->get_field_id('text42'); ?>" name="<?php echo $this->get_field_name('text42'); ?>" type="text" value="<?php echo $text42; ?>" />
<label for="<?php echo $this->get_field_id('text43'); ?>"><?php _e('&nbsp;&nbsp;&nbsp;Height:&nbsp;', 'wp_gs_plugin'); ?></label>
<input class="widefat" style="width:50px;" id="<?php echo $this->get_field_id('text43'); ?>" name="<?php echo $this->get_field_name('text43'); ?>" type="text" value="<?php echo $text43; ?>" />
</p>
<p>
<input id="<?php echo $this->get_field_id('checkbox2'); ?>" name="<?php echo $this->get_field_name('checkbox2'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox2 ); ?> />
<label for="<?php echo $this->get_field_id('checkbox2'); ?>"><?php _e('Show Title below Thumbnail?', 'wp_gs_plugin'); ?></label>
</p>
<p><b>ADDITIONAL TEXT:</b></p>
<p>
<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Widget Bottom:', 'wp_gs_plugin'); ?></label>
<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
</p>
<p>
<input id="<?php echo $this->get_field_id('checkbox22'); ?>" name="<?php echo $this->get_field_name('checkbox22'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox22 ); ?> />
<label for="<?php echo $this->get_field_id('checkbox22'); ?>"><?php _e('Show credit? (Please say yes)', 'wp_gs_plugin'); ?></label>
</p>

<?php }
	// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['text'] = strip_tags($new_instance['text']);
      $instance['text1'] = strip_tags($new_instance['text1']);
	  $instance['text2'] = strip_tags($new_instance['text2']);
	  $instance['text3'] = strip_tags($new_instance['text3']);
	  $instance['text4'] = strip_tags($new_instance['text4']);
	  $instance['text41'] = strip_tags($new_instance['text41']);
	  $instance['text42'] = strip_tags($new_instance['text42']);
	  $instance['text43'] = strip_tags($new_instance['text43']);
	  $instance['checkbox'] = strip_tags($new_instance['checkbox']);
	  $instance['checkbox1'] = strip_tags($new_instance['checkbox1']);
	  $instance['checkbox2'] = strip_tags($new_instance['checkbox2']);
	  $instance['checkbox22'] = strip_tags($new_instance['checkbox22']);
	  $instance['checkbox61'] = strip_tags($new_instance['checkbox61']);
	  $instance['checkbox62'] = strip_tags($new_instance['checkbox62']);
	  $instance['checkbox63'] = strip_tags($new_instance['checkbox63']);
	  $instance['checkbox7'] = strip_tags($new_instance['checkbox7']);
	  $instance['textarea'] = strip_tags($new_instance['textarea']);
     return $instance;
}
	// display widget
function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = apply_filters('widget_title', $instance['title']);
   $text = $instance['text'];
   $text1 = $instance['text1'];
   $text2 = $instance['text2'];
   $text3 = $instance['text3'];
   $text4 = $instance['text4'];
   $text41 = $instance['text41'];
   $text42 = $instance['text42'];
   $text43 = $instance['text43'];
   $checkbox = $instance['checkbox'];
   $checkbox1 = $instance['checkbox1'];
   $checkbox2 = $instance['checkbox2'];
   $checkbox22 = $instance['checkbox22'];
   $checkbox61 = $instance['checkbox61'];
   $checkbox62 = $instance['checkbox62'];
   $checkbox63 = $instance['checkbox63'];
   $checkbox7 = $instance['checkbox7'];
   $textarea = $instance['textarea'];
   wp_register_style('gosocial', plugins_url('go-multiwidget/CSS/main.css'), false, '1.0', 'all');
   wp_print_styles(array('gosocial', 'gosocial'));
   if( is_home() ) {
   if ( $checkbox61 AND $checkbox61 == '1') $show=1; else $show=0;
   }
   if( is_category() ) {
   if ( $checkbox62 AND $checkbox62 == '1') $show=1; else $show=0;
   }
   if( is_single() ) {
   if ( $checkbox63 AND $checkbox63 == '1') $show=1; else $show=0;
   }
   if ( $show=='1' ) {
   echo $before_widget;
   // Display the widget
   echo '<div class="widget-text wp_gs_plugin_box">';
   // Check if title is set
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }
   // Check if text1 is set
   if( $text1 ) {
      echo '<p class="wp_gs_plugin_text"><iframe allowtransparency="true" frameborder="0" show_count="true" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name='.$text1.'" style="width:300px; height:20px;"></iframe></p>';
   }
   // Check if text2 is set
   if( $text2 ) {
      echo '<p class="wp_gs_plugin_text"><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><div class="g-follow" data-href="https://plus.google.com/'.$text2.'" data-rel="author" data-height=24></div></p>';
   }
   if( $checkbox AND $checkbox == '1' AND $checkbox1 == '1') {
   // Check if text is set
   if( $text ) {
      echo '<p class="wp_gs_plugin_text"><iframe src="//www.facebook.com/plugins/likebox.php?href='.$text.'&amp;width='.$text3.'&amp;height=558&amp;colorscheme=light&amp;show_faces=true&amp;stream=true&amp;header=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$text3.'px; height:558px;" allowTransparency="true"></iframe></p>';
   } 
   } 
   else if( $checkbox1 AND $checkbox1 == '1'){
   if( $text ) {
      echo '<p class="wp_gs_plugin_text"><iframe src="//www.facebook.com/plugins/likebox.php?href='.$text.'&amp;width='.$text3.'&amp;height=395&amp;colorscheme=light&amp;show_faces=false&amp;stream=true&amp;header=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$text3.'px; height:395px;" allowTransparency="true"></iframe></p>';
   }
   }
   else if( $checkbox AND $checkbox == '1')
   {
   if( $text ) {
      echo '<p class="wp_gs_plugin_text"><iframe src="//www.facebook.com/plugins/likebox.php?href='.$text.'&amp;width='.$text3.'&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$text3.'px; height:258px;" allowTransparency="true"></iframe></p>';
   }
   }
   else if( $text ) {
      echo '<p class="wp_gs_plugin_text"><iframe src="//www.facebook.com/plugins/likebox.php?href='.$text.'&amp;width='.$text3.'&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$text3.'px; height:62px;" allowTransparency="true"></iframe></p>';
   } 
 if( $text4 ) {  
 if(function_exists('fetch_feed')) {
include_once(ABSPATH.WPINC.'/feed.php');               
$feed = fetch_feed(''.$text4.'');
if( ! is_wp_error( $feed ) ) {
$limit = $feed->get_item_quantity($text41); // specify number of items
$items = $feed->get_items(0, $limit); // create an array of items
} }
if ($limit == 0) echo '<div>The feed is either empty or unavailable.</div>';
else foreach ($items as $item) : ?>
<?php if( $checkbox7 AND $checkbox7 == '1'){ ?>
<div class="gosocialpin">
<?php $nume = $item->get_title(); ?>
<a href='<?php echo $item->get_permalink(); ?>'>
<?php echo '<img src="' .get_first_image_url($item->get_content()). '" width="'.$text42.'px" height="'.$text43.'px" title="'.$nume.'" alt="'.$nume.'" />'; ?>
</a>
<?php if( $checkbox2 AND $checkbox2 == '1'){ ?>
<div align="center"><p style="horizontal-align:center;"><?php echo $nume; ?></p></div>
<?php } ?>
</div>
<?php } else {
 $nume = $item->get_title(); ?>
<div><li><a href='<?php echo $item->get_permalink(); ?>'><?php echo $nume; ?></a></li></div>
<?php } endforeach;  }
   // Check if textarea is set
   if( $textarea ) {
     echo '<p class="wp_gs_plugin_textarea">'.$textarea.'</p>';
   }
   if( $checkbox22 AND $checkbox22 == '1')
      {
        echo '<p align="right" style="padding: 5px 5px 0 0; font-size:10px; ">Powered by <a target="_blank" href="http://www.seofixing.com">SEO Fixing</a></p>';
      }
   echo '</div>';
   
   
   
   echo $after_widget; 
   }
}

}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_gosocial_plugin");'));

?>
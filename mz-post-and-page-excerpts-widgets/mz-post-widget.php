<?php

/**
 * Adds MZ_Post_Widget widget.
 */
class MZ_Post_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {
  
	load_plugin_textdomain( 'mzppew', false, 'mz-post-and-page-excerpts-widgets/languages' );
	
    parent::__construct(
            'mz_post_widget', // Base ID
            __('MZ Post Widget', 'mzppew'), // Name
            array('description' => __('A MZ Post Widget', 'mzppew')) // Args
    );
  }

  /**
   * Front-end display of widget.
   */
  public function widget($args, $instance) {
    global $post;
    extract($args);
    $mz_post_title = apply_filters('widget_title', $instance['mz_post_title']);
    $mz_post_select = $instance['mz_post_select'];
    $mz_post_show_title = $instance['mz_post_show_title'];
    $mz_post_show_content = $instance['mz_post_show_content'];
    $mz_post_show_excerpt = $instance['mz_post_show_excerpt'];
    $mz_post_content_length = $instance['mz_post_content_length'];
    $mz_post_show_img = $instance['mz_post_show_img'];
    $mz_post_align_img = $instance['mz_post_align_img'];
    $mz_post_img_size = $instance['mz_post_img_size']; 
    $mz_post_readmore = $instance['mz_post_readmore'];
    $mz_post_highlights = $instance['mz_post_highlights'];
    $mz_post_highlights_color = $instance['mz_post_highlights_color'];
    

    echo $before_widget;
    if($mz_post_highlights==1)
    	echo '<div class="mz-post-in mz-post-highlights" style="border-color:'.$mz_post_highlights_color.'">';
    else
    	echo '<div class="mz-post-in">';
    if (!empty($mz_post_title)) {
      echo $before_title . $mz_post_title . $after_title;
    }
    if (!empty($mz_post_select)) {
      $post = get_post($mz_post_select);

      if ($mz_post_show_img == 1) {
        echo '<div class="mz-post-featured-image mz-post-align-'.$mz_post_align_img.'"><a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '">';
        echo get_the_post_thumbnail($post->ID, $mz_post_img_size);
        echo '</a></div>';
      }

      if ($mz_post_show_title == 1) {
        echo '<h3 class="mz-post-title">' . $post->post_title . '</h3>';
      }

      if ($mz_post_show_content == 1) {
        echo '<p>' . $this->mz_post_excerpts($post->post_content, $mz_post_content_length) . "...</p>";
      }

      if ($mz_post_show_excerpt == 1) {
        echo '<p>' . $this->mz_post_excerpts($post->post_excerpt, $mz_post_content_length) . "...</p>";
      }
      
      if(!empty($mz_post_readmore)){
        echo '<a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '" class="mz-post-readmore">'.$mz_post_readmore.'</a>';
      }else{
        echo '<a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '" class="mz-post-readmore">'. __('Read More...', 'mzppew') .'</a>';
      }
    }
    if($mz_post_highlights==1)
    	echo '</div>';
    else
    	echo '</div>';
    echo $after_widget;
  }

  /**
   * Sanitize widget form values as they are saved.
   */
  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['mz_post_title'] = strip_tags($new_instance['mz_post_title']);
    $instance['mz_post_select'] = $new_instance['mz_post_select'];
    $instance['mz_post_show_title'] = $new_instance['mz_post_show_title'];
    $instance['mz_post_show_content'] = $new_instance['mz_post_show_content'];
    $instance['mz_post_show_excerpt'] = $new_instance['mz_post_show_excerpt'];
    $instance['mz_post_content_length'] = $new_instance['mz_post_content_length'];
    $instance['mz_post_show_img'] = $new_instance['mz_post_show_img'];
    $instance['mz_post_align_img'] = strip_tags($new_instance['mz_post_align_img']);
    $instance['mz_post_img_size'] = strip_tags($new_instance['mz_post_img_size']);    
    $instance['mz_post_readmore'] = strip_tags($new_instance['mz_post_readmore']);  
    $instance['mz_post_highlights'] = strip_tags($new_instance['mz_post_highlights']);
    $instance['mz_post_highlights_color'] = strip_tags($new_instance['mz_post_highlights_color']);
    
    return $instance;
  }

  /**
   * Back-end widget form.
   */
  public function form($instance) {
    global $post;
    if (isset($instance['mz_post_title'])) {
      $mz_post_title = $instance['mz_post_title'];
    } else {
      //$mz_post_title = __('MZ Posts', 'text_domain');
	  $mz_page_title = "";
    }
    if (isset($instance['mz_post_select'])) {
      $mz_post_select = $instance['mz_post_select'];
    } else {
      $mz_post_select = "";
    }
    if (isset($instance['mz_post_show_title'])) {
      $mz_post_show_title = $instance['mz_post_show_title'];
    } else {
      $mz_post_show_title = "1";
    }
    if (isset($instance['mz_post_show_content'])) {
      $mz_post_show_content = $instance['mz_post_show_content'];
    } else {
      $mz_post_show_content = "0";
    }
    if (isset($instance['mz_post_show_excerpt'])) {
      $mz_post_show_excerpt = $instance['mz_post_show_excerpt'];
    } else {
      $mz_post_show_excerpt = "1";
    }
    if (isset($instance['mz_post_content_length'])) {
      $mz_post_content_length = $instance['mz_post_content_length'];
    } else {
      $mz_post_content_length = "300";
    }
    if (isset($instance['mz_post_show_img'])) {
      $mz_post_show_img = $instance['mz_post_show_img'];
    } else {
      $mz_post_show_img = "1";
    }
    if (isset($instance['mz_post_align_img'])) {
      $mz_post_align_img = $instance['mz_post_align_img'];
    } else {
      $mz_post_align_img = "";
    }    
    if (isset($instance['mz_post_img_size'])) {
      $mz_post_img_size = $instance['mz_post_img_size'];
    } else {
      $mz_post_img_size = "full";
    }
    
    if (isset($instance['mz_post_readmore'])) {
      $mz_post_readmore = $instance['mz_post_readmore'];
    } else {
      $mz_post_readmore = __('Read More...', 'mzppew');
    }

    if (isset($instance['mz_post_highlights'])) {
    	$mz_post_highlights = $instance['mz_post_highlights'];
    } else {
    	$mz_post_highlights = "0";
    }

    if (isset($instance['mz_post_highlights_color'])) {
    	$mz_post_highlights_color = $instance['mz_post_highlights_color'];
    } else {
    	$mz_post_highlights_color = "#0000ff";
    }

    
    
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_title'); ?>"><?php _e('Title', 'mzppew'); ?>:</label> 
      <input class="widefat" id="<?php echo $this->get_field_id('mz_post_title'); ?>" name="<?php echo $this->get_field_name('mz_post_title'); ?>" type="text" value="<?php echo esc_attr($mz_post_title); ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('mz_post_select'); ?>"><?php _e('Select post', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_post_select'); ?>" id="<?php echo $this->get_field_id('mz_post_select'); ?>">
        <option value="">-- <?php _e('Select', 'mzppew'); ?> --</option>
        <?php
        $args = array('numberposts' => -1, 'orderby' => 'title');
        $posts = get_posts($args);
        foreach ($posts as $post) : setup_postdata($post);
          $selected = $post->ID == $mz_post_select ? 'selected="selected"' : '';
          ?>
          <option <?php echo $selected; ?> value="<?php echo $post->ID; ?>"><?php the_title(); ?></option>
        <?php endforeach; ?>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_show_title'); ?>"><?php _e('Show post title', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_post_show_title'); ?>" id="<?php echo $this->get_field_id('mz_post_show_title'); ?>">
        <option value="1" <?php echo $mz_post_show_title == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_post_show_title == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_show_content'); ?>"><?php _e('Show post content', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_post_show_content'); ?>" id="<?php echo $this->get_field_id('mz_post_show_content'); ?>">
        <option value="1" <?php echo $mz_post_show_content == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_post_show_content == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_show_excerpt'); ?>"><?php _e('Show post excerpt', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_post_show_excerpt'); ?>" id="<?php echo $this->get_field_id('mz_post_show_excerpt'); ?>">
        <option value="1" <?php echo $mz_post_show_excerpt == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_post_show_excerpt == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_content_length'); ?>"><?php _e('Show post content length', 'mzppew'); ?>:</label>
      <input type="text" value="<?php echo esc_attr($mz_post_content_length); ?>" class="widefat" name="<?php echo $this->get_field_name('mz_post_content_length'); ?>" id="<?php echo $this->get_field_id('mz_post_content_length'); ?>"/>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_show_img'); ?>"><?php _e('Show featured image', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_post_show_img'); ?>" id="<?php echo $this->get_field_id('mz_post_show_img'); ?>">
        <option value="1" <?php echo $mz_post_show_img == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_post_show_img == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_align_img'); ?>"><?php _e('Align featured image', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_post_align_img'); ?>" id="<?php echo $this->get_field_id('mz_post_align_img'); ?>">
        <option value="">-- Select --</option>
        <option value="left" <?php echo $mz_post_align_img == "left" ? 'selected="selected"' : ''; ?>><?php _e('Left', 'mzppew'); ?></option>
        <option value="right" <?php echo $mz_post_align_img == "right" ? 'selected="selected"' : ''; ?>><?php _e('Right', 'mzppew'); ?></option>
        <option value="center" <?php echo $mz_post_align_img == "center" ? 'selected="selected"' : ''; ?>><?php _e('Center', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_img_size'); ?>"><?php _e('Featured image size', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_post_img_size'); ?>" id="<?php echo $this->get_field_id('mz_post_img_size'); ?>">
        <option value="">-- Select --</option>
        <option value="thumbnail" <?php echo $mz_post_img_size == "thumbnail" ? 'selected="selected"' : ''; ?>><?php _e('Thumbnail', 'mzppew'); ?></option>
        <option value="medium" <?php echo $mz_post_img_size == "medium" ? 'selected="selected"' : ''; ?>><?php _e('Medium', 'mzppew'); ?></option>
        <option value="large" <?php echo $mz_post_img_size == "large" ? 'selected="selected"' : ''; ?>><?php _e('Large', 'mzppew'); ?></option>
        <option value="full" <?php echo $mz_post_img_size == "full" ? 'selected="selected"' : ''; ?>><?php _e('Full', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_readmore'); ?>"><?php _e('Read more text', 'mzppew'); ?>:</label>
      <input type="text" value="<?php echo esc_attr($mz_post_readmore); ?>" class="widefat" name="<?php echo $this->get_field_name('mz_post_readmore'); ?>" id="<?php echo $this->get_field_id('mz_post_readmore'); ?>"/>
    </p>
    
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_highlights'); ?>"><?php _e('Show post highlights', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_post_highlights'); ?>" id="<?php echo $this->get_field_id('mz_post_highlights'); ?>">
        <option value="1" <?php echo $mz_post_highlights == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_post_highlights == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_post_highlights_color'); ?>"><?php _e('Highlight color', 'mzppew'); ?>:</label>
            <input type="text" value="<?php echo esc_attr($mz_post_highlights_color); ?>" class="widefat" name="<?php echo $this->get_field_name('mz_post_highlights_color'); ?>" id="<?php echo $this->get_field_id('mz_page_highlights_color'); ?>"/>
    </p>
    <p align="center"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8347BXEUEN8SY" title="Donate" target="_blank"><img src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donateCC_LG.gif" alt="Donate" title="Donate" /></a></p>
    <?php
  }

  /*
   * Function to get the excerpts of the post
   */

  public function mz_post_excerpts($content, $length = 300) {
    $tempStr = substr($content, 0, $length);
    return substr($tempStr, 0, strripos($tempStr, " "));
  }

}

// class MZ_Post_Widget
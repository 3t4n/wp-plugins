<?php

/**
 * Adds MZ_Page_Widget widget.
 */
class MZ_Page_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {
  
	load_plugin_textdomain( 'mzppew', false, 'mz-post-and-page-excerpts-widgets/languages' );
	
    parent::__construct(
            'mz_page_widget', // Base ID
            __('MZ Page Widget', 'mzppew'), // Name
            array('description' => __('A MZ Page Widget', 'mzppew'),) // Args
    );
  }

  /**
   * Front-end display of widget.
   */
  public function widget($args, $instance) {
    global $post;
    extract($args);
    $mz_page_title = apply_filters('widget_title', $instance['mz_page_title']);
    $mz_page_select = $instance['mz_page_select'];
    $mz_page_show_title = $instance['mz_page_show_title'];
    $mz_page_show_content = $instance['mz_page_show_content'];
    $mz_page_show_excerpt = $instance['mz_page_show_excerpt'];
    $mz_page_content_length = $instance['mz_page_content_length'];
    $mz_page_show_img = $instance['mz_page_show_img'];
    $mz_page_align_img = $instance['mz_page_align_img'];
    $mz_page_img_size = $instance['mz_page_img_size']; 
    $mz_page_readmore = $instance['mz_page_readmore'];
    $mz_page_highlights = $instance['mz_page_highlights'];
    $mz_page_highlights_color = $instance['mz_page_highlights_color'];
    

    echo $before_widget;
    if($mz_page_highlights==1)
    	echo '<div class="mz-page-in mz-page-highlights" style="border-color:'.$mz_page_highlights_color.'">';
    else
    	echo '<div class="mz-page-in">';
    if (!empty($mz_page_title)) {
      echo $before_title . $mz_page_title . $after_title;
    }
    if (!empty($mz_page_select)) {
      $post = get_post($mz_page_select);

      if ($mz_page_show_img == 1) {
        echo '<div class="mz-page-featured-image mz-page-align-'.$mz_page_align_img.'"><a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '">';
        echo get_the_post_thumbnail($post->ID, $mz_page_img_size);
        echo '</a></div>';
      }

      if ($mz_page_show_title == 1) {
        echo '<h3 class="mz-page-title">' . $post->post_title . '</h3>';
      }

      if ($mz_page_show_content == 1) {
        echo '<p>' . $this->mz_page_excerpts($post->post_content, $mz_page_content_length) . "...</p>";
      }

      if ($mz_page_show_excerpt == 1) {
        echo '<p>' . $this->mz_page_excerpts($post->post_excerpt, $mz_page_content_length) . "...</p>";
      }
      
      if(!empty($mz_page_readmore)){
        echo '<a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '" class="mz-page-readmore">'.$mz_page_readmore.'</a>';
      }else{
        echo '<a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '" class="mz-page-readmore">'.__('Read More...', 'mzppew').'</a>';
      }
    }
    if($mz_page_highlights==1)
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
    $instance['mz_page_title'] = strip_tags($new_instance['mz_page_title']);
    $instance['mz_page_select'] = $new_instance['mz_page_select'];
    $instance['mz_page_show_title'] = $new_instance['mz_page_show_title'];
    $instance['mz_page_show_content'] = $new_instance['mz_page_show_content'];
    $instance['mz_page_show_excerpt'] = $new_instance['mz_page_show_excerpt'];
    $instance['mz_page_content_length'] = $new_instance['mz_page_content_length'];
    $instance['mz_page_show_img'] = $new_instance['mz_page_show_img'];
    $instance['mz_page_align_img'] = strip_tags($new_instance['mz_page_align_img']);
    $instance['mz_page_img_size'] = strip_tags($new_instance['mz_page_img_size']);    
    $instance['mz_page_readmore'] = strip_tags($new_instance['mz_page_readmore']);  
    $instance['mz_page_highlights'] = $new_instance['mz_page_highlights'];
    $instance['mz_page_highlights_color'] = $new_instance['mz_page_highlights_color'];
    
    
    return $instance;
  }

  /**
   * Back-end widget form.
   */
  public function form($instance) {
    global $post;
    if (isset($instance['mz_page_title'])) {
      $mz_page_title = $instance['mz_page_title'];
    } else {
      //$mz_page_title = __('MZ Pages', 'text_domain');
	  $mz_page_title = "";
    }
    if (isset($instance['mz_page_select'])) {
      $mz_page_select = $instance['mz_page_select'];
    } else {
      $mz_page_select = "";
    }
    if (isset($instance['mz_page_show_title'])) {
      $mz_page_show_title = $instance['mz_page_show_title'];
    } else {
      $mz_page_show_title = "1";
    }
    if (isset($instance['mz_page_show_content'])) {
      $mz_page_show_content = $instance['mz_page_show_content'];
    } else {
      $mz_page_show_content = "0";
    }
    if (isset($instance['mz_page_show_excerpt'])) {
      $mz_page_show_excerpt = $instance['mz_page_show_excerpt'];
    } else {
      $mz_page_show_excerpt = "1";
    }
    if (isset($instance['mz_page_content_length'])) {
      $mz_page_content_length = $instance['mz_page_content_length'];
    } else {
      $mz_page_content_length = "300";
    }
    if (isset($instance['mz_page_show_img'])) {
      $mz_page_show_img = $instance['mz_page_show_img'];
    } else {
      $mz_page_show_img = "1";
    }
    if (isset($instance['mz_page_align_img'])) {
      $mz_page_align_img = $instance['mz_page_align_img'];
    } else {
      $mz_page_align_img = "";
    }    
    if (isset($instance['mz_page_img_size'])) {
      $mz_page_img_size = $instance['mz_page_img_size'];
    } else {
      $mz_page_img_size = "full";
    }
    
    if (isset($instance['mz_page_readmore'])) {
      $mz_page_readmore = $instance['mz_page_readmore'];
    } else {
      $mz_page_readmore = __('Read More...', 'mzppew');
    }

    if (isset($instance['mz_page_highlights'])) {
    	$mz_page_highlights = $instance['mz_page_highlights'];
    } else {
    	$mz_page_highlights = "0";
    }
    if (isset($instance['mz_page_highlights_color'])) {
    	$mz_page_highlights_color = $instance['mz_page_highlights_color'];
    } else {
    	$mz_page_highlights_color = "#0000ff";
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_title'); ?>"><?php _e('Title', 'mzppew'); ?>:</label> 
      <input class="widefat" id="<?php echo $this->get_field_id('mz_page_title'); ?>" name="<?php echo $this->get_field_name('mz_page_title'); ?>" type="text" value="<?php echo esc_attr($mz_page_title); ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('mz_page_select'); ?>"><?php _e('Select page', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_page_select'); ?>" id="<?php echo $this->get_field_id('mz_page_select'); ?>">
        <option value="">-- Select --</option>
        <?php
        $args = array('numberposts' => -1, 'orderby' => 'title');
        $posts = get_pages($args);
        foreach ($posts as $post) : setup_postdata($post);
          $selected = $post->ID == $mz_page_select ? 'selected="selected"' : '';
          ?>
          <option <?php echo $selected; ?> value="<?php echo $post->ID; ?>"><?php the_title(); ?></option>
        <?php endforeach; ?>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_show_title'); ?>"><?php _e('Show page title', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_page_show_title'); ?>" id="<?php echo $this->get_field_id('mz_page_show_title'); ?>">
        <option value="1" <?php echo $mz_page_show_title == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_page_show_title == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_show_content'); ?>"><?php _e('Show page content', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_page_show_content'); ?>" id="<?php echo $this->get_field_id('mz_page_show_content'); ?>">
        <option value="1" <?php echo $mz_page_show_content == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_page_show_content == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_show_excerpt'); ?>"><?php _e('Show page excerpt', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_page_show_excerpt'); ?>" id="<?php echo $this->get_field_id('mz_page_show_excerpt'); ?>">
        <option value="1" <?php echo $mz_page_show_excerpt == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_page_show_excerpt == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_content_length'); ?>"><?php _e('Show page content length', 'mzppew'); ?>:</label>
      <input type="text" value="<?php echo esc_attr($mz_page_content_length); ?>" class="widefat" name="<?php echo $this->get_field_name('mz_page_content_length'); ?>" id="<?php echo $this->get_field_id('mz_page_content_length'); ?>"/>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_show_img'); ?>"><?php _e('Show featured image', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_page_show_img'); ?>" id="<?php echo $this->get_field_id('mz_page_show_img'); ?>">
        <option value="1" <?php echo $mz_page_show_img == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_page_show_img == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_align_img'); ?>"><?php _e('Align featured image', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_page_align_img'); ?>" id="<?php echo $this->get_field_id('mz_page_align_img'); ?>">
        <option value="">-- Select --</option>
        <option value="left" <?php echo $mz_page_align_img == "left" ? 'selected="selected"' : ''; ?>><?php _e('Left', 'mzppew'); ?></option>
        <option value="right" <?php echo $mz_page_align_img == "right" ? 'selected="selected"' : ''; ?>><?php _e('Right', 'mzppew'); ?></option>
        <option value="center" <?php echo $mz_page_align_img == "center" ? 'selected="selected"' : ''; ?>><?php _e('Center', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_img_size'); ?>"><?php _e('Featured image size', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_page_img_size'); ?>" id="<?php echo $this->get_field_id('mz_page_img_size'); ?>">
        <option value="">-- Select --</option>
        <option value="thumbnail" <?php echo $mz_page_img_size == "thumbnail" ? 'selected="selected"' : ''; ?>><?php _e('Thumbnail', 'mzppew'); ?></option>
        <option value="medium" <?php echo $mz_page_img_size == "medium" ? 'selected="selected"' : ''; ?>><?php _e('Medium', 'mzppew'); ?></option>
        <option value="large" <?php echo $mz_page_img_size == "large" ? 'selected="selected"' : ''; ?>><?php _e('Large', 'mzppew'); ?></option>
        <option value="full" <?php echo $mz_page_img_size == "full" ? 'selected="selected"' : ''; ?>><?php _e('Full', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_readmore'); ?>"><?php _e('Read more text', 'mzppew'); ?>:</label>
      <input type="text" value="<?php echo esc_attr($mz_page_readmore); ?>" class="widefat" name="<?php echo $this->get_field_name('mz_page_readmore'); ?>" id="<?php echo $this->get_field_id('mz_page_readmore'); ?>"/>
    </p>
    
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_highlights'); ?>"><?php _e('Show highlights', 'mzppew'); ?>:</label>
      <select class="widefat" name="<?php echo $this->get_field_name('mz_page_highlights'); ?>" id="<?php echo $this->get_field_id('mz_page_highlights'); ?>">
        <option value="1" <?php echo $mz_page_highlights == 1 ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'mzppew'); ?></option>
        <option value="0" <?php echo $mz_page_highlights == 0 ? 'selected="selected"' : ''; ?>><?php _e('No', 'mzppew'); ?></option>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('mz_page_highlights_color'); ?>"><?php _e('Highlight color', 'mzppew'); ?>:</label>
            <input type="text" value="<?php echo esc_attr($mz_page_highlights_color); ?>" class="widefat" name="<?php echo $this->get_field_name('mz_page_highlights_color'); ?>" id="<?php echo $this->get_field_id('mz_page_highlights_color'); ?>"/>
    </p>
    <p align="center"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8347BXEUEN8SY" title="Donate" target="_blank"><img src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donateCC_LG.gif" alt="Donate" title="Donate" /></a></p>
    <?php
  }

  /*
   * Function to get the excerpts of the post
   */

  public function mz_page_excerpts($content, $length = 300) {
    $tempStr = substr($content, 0, $length);
    return substr($tempStr, 0, strripos($tempStr, " "));
  }

}

// class MZ_Page_Widget
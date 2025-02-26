<?php
/*
Plugin Name: Advanced Random Post Thumbnails Widget
Plugin URI: http://wpservicemasters.com/
Description: Display thumbnails from random posts. Thumbnails can be selected from post categories, dimensions can be specified and margin's between thumbs can be specified. Thumbs can be displayed in a single column or in automatically defined rows. Based on the Advanced Random Post widget by Yakup GÖVLER.
Version: 1.1
Author: Dion de Ville.
Author URI: http://wpservicemasters.com/
*/

class dv_adv_random_post_thumbs extends WP_Widget {
	function dv_adv_random_post_thumbs() {
	 //Load Language
	 load_plugin_textdomain( 'adv-rnd-post-thumbs', false, dirname(plugin_basename(__FILE__)) .  '/lang' );
	 $widget_ops = array('description' => __('Shows Hyperlinked Thumbnails from Random Posts.', 'adv-rnd-post-thumbs') );
	 //Create widget
	 $this->WP_Widget('advancedrandompostthumbs', __('Advnaced Random Post Thumbnails', 'adv-rnd-post-thumbs'), $widget_ops);
	}

  function widget($args, $instance) {
	 		extract($args, EXTR_SKIP);
			echo $before_widget;
			$title = empty($instance['title']) ? __('Random Post Thumbnails', 'adv-rnd-post-thumbs') : apply_filters('widget_title', $instance['title']);
			$parameters = array(
				'title' => $title,
				'limit' => (int) $instance['show-num'],
				'actcat' => (bool) $instance['actcat'],
				'cats' => esc_attr($instance['cats']),
				'cusfield' => esc_attr($instance['cus-field']),
				'w' => (int) $instance['width'],
				'h' => (int) $instance['height'],
				'inline' => (bool) $instance['inline'],
				't' => (int) $instance['top'],
				'r' => (int) $instance['right'],
				'b' => (int) $instance['bottom'],
				'l' => (int) $instance['left'],
				'bl' => (int) $instance['bufferl'],
				'br' => (int) $instance['bufferr'],
				'firstimage' => (bool) $instance['firstimage'],
				'atimage' =>(bool) $instance['atimage'],
				'defimage' => esc_url($instance['defimage'])
			);

			if ( !empty( $title ) ) {
		    echo $before_title . $title . $after_title;
			};
        //print random posts
				dv_randompostthumbs($parameters);
			echo $after_widget;
  } //end of widget
	
	//Update widget options
  function update($new_instance, $old_instance) {

		$instance = $old_instance;
		//get old variables
		$instance['title'] = esc_attr($new_instance['title']);
		$instance['show-num'] = (int) abs($new_instance['show-num']);
		if ($instance['show-num'] > 20) $instance['show-num'] = 20;
		$instance['cats'] = esc_attr($new_instance['cats']);
		$instance['actcat'] = $new_instance['actcat'] ? 1 : 0;
		$instance['cus-field'] = esc_attr($new_instance['cus-field']);
		$instance['width'] = esc_attr($new_instance['width']);
		$instance['height'] = esc_attr($new_instance['height']);
		$instance['inline'] = $new_instance['inline'] ? 1 : 0;
		$instance['top'] = esc_attr($new_instance['top']);
		$instance['right'] = esc_attr($new_instance['right']);
		$instance['bottom'] = esc_attr($new_instance['bottom']);
		$instance['left'] = esc_attr($new_instance['left']);
		$instance['bufferl'] = esc_attr($new_instance['bufferl']);
		$instance['bufferr'] = esc_attr($new_instance['bufferr']);
		$instance['firstimage'] = $new_instance['first-image'] ? 1 : 0;
		$instance['atimage'] = $new_instance['atimage'] ? 1 : 0;
		$instance['defimage'] = esc_url($new_instance['def-image']);
		return $instance;
  } //end of update
	
	//Widget options form
  function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => __('Random Post Thumbnails','adv-rnd-post-thumbs'), 'show-num' => 10, 'actcat' => 0, 'cats' => '', 'cus-field' => '', 'width' => '75', 'height' => '75', 'inline' => 'inline', 'top' => '5', 'right' => '5', 'bottom' => '5', 'left' => '5', 'bufferl' => '0', 'bufferr' => '0', 'firstimage' => 0, 'atimage' => 0, 'defimage'=>'' ) );
		
		$title = esc_attr($instance['title']);
		$show_num = (int) $instance['show-num'];
		$cats = esc_attr($instance['cats']);
		$actcat = (bool) $instance['actcat'];
		$cus_field = esc_attr($instance['cus-field']);
		$width = esc_attr($instance['width']);
		$height = esc_attr($instance['height']);
		$inline = (bool) $instance['inline'];
		$top = esc_attr($instance['top']);
		$right = esc_attr($instance['right']);
		$bottom = esc_attr($instance['bottom']);
		$left = esc_attr($instance['left']);
		$bufferl = esc_attr($instance['bufferl']);
		$bufferr = esc_attr($instance['bufferr']);
		$firstimage = (bool) $instance['firstimage'];
		$atimage = (bool) $instance['atimage'];
		$defimage = esc_url($instance['defimage']);

		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:');?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		   </label>
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('show-num'); ?>"><?php _e('Number of posts to show:');?> 
		  <input id="<?php echo $this->get_field_id('show-num'); ?>" name="<?php echo $this->get_field_name('show-num'); ?>" type="text" value="<?php echo $show_num; ?>" size ="3" /><br />
			<small><?php _e('(at most 20)','adv-rnd-post-thumbs'); ?></small>
		  </label>
	  </p>
		<p>
		  <label for="<?php echo $this->get_field_id('cus-field'); ?>"><?php _e('Thumbnail Custom Field Name:', 'adv-rnd-post-thumbs');?> 
		  <input id="<?php echo $this->get_field_id('cus-field'); ?>" name="<?php echo $this->get_field_name('cus-field'); ?>" type="text" value="<?php echo $cus_field; ?>" size ="20" /> 
		  </label>
	  </p>
		<p>Thumbnail Dimensions:<br />
		  <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'adv-rnd-post-thumbs');?> <input id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" size ="3" /></label>px<br />
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'adv-rnd-post-thumbs');?> <input id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" size ="3" /></label>px
	  </p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('inline'); ?>" name="<?php echo $this->get_field_name('inline'); ?>"<?php checked( $inline ); ?> />
			<label for="<?php echo $this->get_field_id('inline'); ?>"><?php _e('Display thumbnails in rows and columns?', 'adv-rnd-post-thumbs');?></label>
		</p>
		<p>Thumbnail Margins:<br />
		  <label for="<?php echo $this->get_field_id('top'); ?>"><?php _e('Top:', 'adv-rnd-post-thumbs');?> <input id="<?php echo $this->get_field_id('top'); ?>" name="<?php echo $this->get_field_name('top'); ?>" type="text" value="<?php echo $top; ?>" size ="3" /></label>px<br />

		  <label for="<?php echo $this->get_field_id('right'); ?>"><?php _e('Right:', 'adv-rnd-post-thumbs');?> <input id="<?php echo $this->get_field_id('right'); ?>" name="<?php echo $this->get_field_name('right'); ?>" type="text" value="<?php echo $right; ?>" size ="3" /></label>px<br />

		  <label for="<?php echo $this->get_field_id('bottom'); ?>"><?php _e('Bottom:', 'adv-rnd-post-thumbs');?> <input id="<?php echo $this->get_field_id('bottom'); ?>" name="<?php echo $this->get_field_name('bottom'); ?>" type="text" value="<?php echo $bottom; ?>" size ="3" /></label>px<br />

		  <label for="<?php echo $this->get_field_id('left'); ?>"><?php _e('Left:', 'adv-rnd-post-thumbs');?> <input id="<?php echo $this->get_field_id('left'); ?>" name="<?php echo $this->get_field_name('left'); ?>" type="text" value="<?php echo $left; ?>" size ="3" /></label>px<br />
	  </p>

		<p>Left and Right Side Buffers:<br />

		  <label for="<?php echo $this->get_field_id('bufferl'); ?>"><?php _e('Left Buffer:', 'adv-rnd-post-thumbs');?> <input id="<?php echo $this->get_field_id('bufferl'); ?>" name="<?php echo $this->get_field_name('bufferl'); ?>" type="text" value="<?php echo $bufferl; ?>" size ="3" /></label>px<br />

		  <label for="<?php echo $this->get_field_id('bufferr'); ?>"><?php _e('Right Buffer:', 'adv-rnd-post-thumbs');?> <input id="<?php echo $this->get_field_id('bufferr'); ?>" name="<?php echo $this->get_field_name('bufferr'); ?>" type="text" value="<?php echo $bufferr; ?>" size ="3" /></label>px<br />
		<small>(<?php _e('Use the left and right buffers to help position the thumbnails within the widget relative to the widget\'s left and right sides.)', 'adv-rnd-post-thumbs');?></small>
	  </p>

		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('first-image'); ?>" name="<?php echo $this->get_field_name('first-image'); ?>"<?php checked( $firstimage ); ?> />
			<label for="<?php echo $this->get_field_id('first-image'); ?>"><?php _e('Get first image of each post?', 'adv-rnd-post-thumbs');?></label>
		</p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('atimage'); ?>" name="<?php echo $this->get_field_name('atimage'); ?>"<?php checked( $atimage ); ?> />
			<label for="<?php echo $this->get_field_id('atimage'); ?>"><?php _e('Get first attached image of each post?', 'adv-rnd-post-thumbs');?></label>
		</p>
	  <p>
		  <label for="<?php echo $this->get_field_id('def-image'); ?>"><?php _e('Default Image:', 'adv-rnd-post-thumbs');?> 
		  <input class="widefat" id="<?php echo $this->get_field_id('def-image'); ?>" name="<?php echo $this->get_field_name('def-image'); ?>" type="text" value="<?php echo $defimage; ?>" /><br />
			<small>(<?php _e('This is used when a post has no image attachment.', 'adv-rnd-post-thumbs');?></small>
		  </label>
	  </p>	
	  <p>
		  <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Categories:', 'adv-rnd-post-thumbs');?> 
		  <input class="widefat" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>" type="text" value="<?php echo $cats; ?>" /><br />
			<small>(<?php _e('Optional comma separated list of category IDs.', 'adv-rnd-post-thumbs');?>)</small>
		  </label>
	  </p>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('actcat'); ?>" name="<?php echo $this->get_field_name('actcat'); ?>"<?php checked( $actcat ); ?> />
			<label for="<?php echo $this->get_field_id('actcat'); ?>"> <?php _e('Get posts with the same category as the viewed post?', 'adv-rnd-post-thumbs');?></label>
		</p>
   <?php
  } //end of form
}

add_action( 'widgets_init', create_function('', 'return register_widget("dv_adv_random_post_thumbs");') );
//Register Widget

 // Show random posts function
 function dv_randompostthumbs($args = '') {
  global $wpdb;
	$defaults = array('limit' => 10, 'actcat' => 0, 'cats'=>'', 'cusfield' =>'', 'w' => 48, 'h' => 48, 'inline' => '0', 't' => 5,  'r' => 5, 'b' => 5, 'l' => 5, 'bl' => 0, 'br' => 0, 'firstimage' => 0, 'atimage' => 0, 'defimage' => '');
	$args = wp_parse_args( $args, $defaults );
	extract($args);
	
	$limit = (int) abs($limit);
	$firstimage = (bool) $firstimage;
	$atimage = (bool) $atimage;
	$defimage = esc_url($defimage);
	$w = (int) $w;
	$h = (int) $h;
	$inline = (bool) $inline;
	$t = (int) $t;
	$r = (int) $r;
	$b = (int) $b;
	$l = (int) $l;
	$bl = (int) $bl;
	$br = (int) $br;
	
	$cats = str_replace(" ", "", esc_attr($cats));
	if (($limit < 1 ) || ($limit > 20)) $limit = 10;
	
	if (($actcat) && (is_category())) {
	 $cats = get_query_var('cat');
	}
	if (($actcat) && (is_single())) {
	 $cats = '';
	 foreach (get_the_category() as $catt) {
	   $cats .= $catt->cat_ID.' '; 
	 }
	 $cats = str_replace(" ", ",", trim($cats));
	}
	
	if (!intval($cats)) $cats='';
	$query = "cat=$cats&showposts=$limit&orderby=rand";
	$rnd_posts = get_posts($query); //get posts by random
	$postlist = '';
	$height = $h ? ' height = "' . $h .'"' : '';
	$width = $w ? ' width = "' . $w .'"' : '';
	$top = $t ? ' margin-top:' . $t : '';
	$right = $r ? ' margin-right:' . $r : '';
	$bottom = $b ? ' margin-bottom:' . $b : '';
	$left = $l ? ' margin-left:' . $l : '';
	$bufferl = $bl ? ' width:' . $bl : '';
	$bufferr = $br ? ' width:' . $br : '';

    foreach ($rnd_posts as $post) {
		  $post_title = htmlspecialchars(stripslashes($post->post_title));
			$image = '';
			$img = '';
			if ($cusfield) {
			 $cusfield = esc_attr($cusfield);
			 $img = get_post_meta($post->ID, $cusfield, true);
			}

			 if (!$img && $firstimage) {
			   $match_count = preg_match_all("/<img[^']*?src=\"([^']*?)\"[^']*?>/", $post->post_content, $match_array, PREG_PATTERN_ORDER);		
			   $img = $match_array[1][0];
			 }
		   if (!$img && $atimage) { 
				 $p = array(
				  'post_type' => 'attachment',
				  'post_mime_type' => 'image',
				  'numberposts' => 1,
				  'order' => 'ASC',
				  'orderby' => 'menu_order ID',
				  'post_status' => null,
				  'post_parent' => $post->ID
				 );
				 $attachments = get_posts($p);
				 if ($attachments) {
				   $imgsrc = wp_get_attachment_image_src($attachments[0]->ID, 'thumbnail');
				   $img = $imgsrc[0];
				 }
				}
				 
			 if (!$img && $defimage)
			  $img = $defimage;
				 
			 if ($img)
        $image = '<img src="' . $img . '" title="' . $post_title . '" class="dv-advanced-random-posts-thumb"' . $width . $height . ' />';

	if ($inline) {
	    $postlist .= "<div class=\"dv-advanced-random-image-image\" style=\"display: inline; width:" . $w ."px;" . $top ."px;" . $right ."px;" . $bottom ."px;" . $left ."px;\" ><a href=\"" . get_permalink($post->ID) . "\" title=\"". $post_title ."\" >" . $image . "</a></div>\n";
	} else {
	    $postlist .= "<div class=\"dv-advanced-random-image-image\" style=\"display: block; width:" . $w ."px;" . $top ."px;" . $right ."px;" . $bottom ."px;" . $left ."px;\" ><a href=\"" . get_permalink($post->ID) . "\" title=\"". $post_title ."\" >" . $image . "</a></div>\n";
	}
    }
		echo '<div class="dv-advanced-random-image-block" style="margin-left: auto;margin-right:auto; text-align: center; width: 100%;">';
		echo '<table class="dv-advanced-random-image-table" style="border-collapse:collapse;border-width:0px;padding:0px;margin:0px;"><tbody><tr>';
		echo '<td class="dv-buffer-left" style="' . $bufferl . 'px;"></td>';
		   echo '<td class="dv-image-holder">' . $postlist . '</td>';
		echo '<td class="dv-buffer-right" style="' . $bufferr . 'px;"></td>';
		echo '</tr></tbody></table>';
		echo '</div>';
 }
 
?>
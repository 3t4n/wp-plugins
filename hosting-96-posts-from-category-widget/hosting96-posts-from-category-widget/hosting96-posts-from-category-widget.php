<?php
/*
Plugin Name: Hosting 96 Posts from category widget
Plugin URI: http://ho96.com/en/downloads/wordpress/posts-from-category-widget
Description: Allows you to add a widget with some number of most recent posts from a particular category. This is an improvement of the widget made by http://springthistle.com.
Author: Hosting 96
License: New BSD
Version: 1.0
Author URI: http://ho96.com
*/

class Hosting96PostsFromCategory_Widget extends WP_Widget
{

	function Hosting96PostsFromCategory_Widget() 
	{
		/* Widget settings. */
		$widget_ops = array(
		'classname' => 'postsfromcat',
		'description' => 'Allows you to display a list of recent posts within a particular category.');
	
		/* Widget control settings. */
		$control_ops = array(
		'width' => 250,
		'height' => 250,
		'id_base' => 'postsfromcat-widget');
	
		/* Create the widget. */
		$this->WP_Widget('postsfromcat-widget', 'Posts from a Category', $widget_ops, $control_ops );
	}

	function form ($instance)
	{
		/* Set up some default widget settings. */
		$defaults = array('numberposts' => '5','catid'=>'1','title'=>'Posts from a category', 'date'=>'1', 'image'=>'1', 'introtext'=>'1', 'introtextlength'=>'20', 'comments'=>'1');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
		<input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $instance['title'] ?>" size="20">
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('catid'); ?>">Category ID:</label>
		<?php wp_dropdown_categories('hide_empty=0&hierarchical=1&id='.$this->get_field_id('catid').'&name='.$this->get_field_name('catid').'&selected='.$instance['catid']); ?>
		</p>
		  
		<p>
		<label for="<?php echo $this->get_field_id('numberposts'); ?>">Number of posts:</label>
		<select id="<?php echo $this->get_field_id('numberposts'); ?>" name="<?php echo $this->get_field_name('numberposts'); ?>">
		<?php 
			for ($i=1;$i<=20;$i++)
			{
				echo '<option value="'.$i.'"';
				if ($i==$instance['numberposts']) echo ' selected="selected"';
				echo '>'.$i.'</option>';
		        }
		?>
		</select>
		</p>
		
		<p>
		<input type="checkbox" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" <?php if ($instance['date']) echo 'checked="checked"' ?> />
		<label for="<?php echo $this->get_field_id('date'); ?>">Show date?</label>
		</p>
		  
		<p>
		<input type="checkbox" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" <?php if ($instance['image']) echo 'checked="checked"' ?> />
		<label for="<?php echo $this->get_field_id('image'); ?>">Show image?</label>
		</p>
		  
		<p>
		<input type="checkbox" id="<?php echo $this->get_field_id('introtext'); ?>" name="<?php echo $this->get_field_name('introtext'); ?>" <?php if ($instance['introtext']) echo 'checked="checked"' ?> />
		<label for="<?php echo $this->get_field_id('introtext'); ?>">Show intro text?</label>
		</p>
		 
		<p>
		<label for="<?php echo $this->get_field_id('introtextlength'); ?>">Intro text length:</label>
		<input type="text" name="<?php echo $this->get_field_name('introtextlength') ?>" id="<?php echo $this->get_field_id('introtextlength') ?> " value="<?php echo $instance['introtextlength'] ?>" size="20">
		</p>
		  
		<p>
		<input type="checkbox" id="<?php echo $this->get_field_id('comments'); ?>" name="<?php echo $this->get_field_name('comments'); ?>" <?php if ($instance['comments']) echo 'checked="checked"' ?> />
		<label for="<?php echo $this->get_field_id('date'); ?>">Show comments?</label>
		</p>
		  
		<p>
		<input type="checkbox" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" <?php if ($instance['rss']) echo 'checked="checked"' ?> />
		<label for="<?php echo $this->get_field_id('rss'); ?>">Show RSS feed link?</label>
		</p>
		
		  <?php
	}

	function update ($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['catid'] = $new_instance['catid'];
		$instance['numberposts'] = $new_instance['numberposts'];
		$instance['title'] = $new_instance['title'];
		$instance['date'] = $new_instance['date'];
		$instance['image'] = $new_instance['image'];
		$instance['introtext'] = $new_instance['introtext'];
		$instance['introtextlength'] = $new_instance['introtextlength'];
		$instance['comments'] = $new_instance['comments'];
		$instance['rss'] = $new_instance['rss'];
		  
		return $instance;
	}

	function widget ($args,$instance)
	{
		extract($args);
		
		$title = $instance['title'];
		$catid = $instance['catid'];
		$numberposts = $instance['numberposts'];
		$rss = $instance['rss'];
		
		// retrieve posts information from database
		global $wpdb;
		$posts = get_posts('numberposts='.$numberposts.'&category='.$catid);
		$out = '<ul>';
		foreach($posts as $post)
		{
			$out .= '<li style="margin-bottom:10px;"><a href="'.get_permalink($post->ID).'">';
	  
			if($instance['date'])
				$out .= get_the_date('Y/m/d', $post->ID) . ' - ';
	
			$out .= $post->post_title . '<br/>';
	  
	  
			if ($instance['image'] && has_post_thumbnail( $post->ID )):
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			 	$out .= '<img style="max-width:100%" src="' . $image[0] . '" />';
			endif;
	  
			$out .= '</a>';
	  
			if($instance['introtext'])
			{
				$content = $post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				  
				$retval = $content; // Just in case of a problem
				$array = explode(" ", $content);
				/* Already short enough, return the whole thing*/
				if (count($array) <= $instance['introtextlength'])
				{
					$retval = $content;
				}
					
				/* Need to chop of some words*/
				else
				{
					array_splice($array, $instance['introtextlength']);
					$retval = implode(" ", $array) . " [...]";
				}
					
				$retval = strip_tags($retval);
					
				$out .=  $retval;
			}
			 
			if($instance['comments'])
			{
				$out .= '<br/><br/>';
				$out .= '<a href="'. get_comments_link($post->ID) .'">' . get_comments_number($post->ID) . ' comment(s)</a>';
			}
	 
			$out .= '</li>';
		}

		$out .= '</ul>';
		
		if($rss) 
			$out .= '<br/><a href="'.get_category_link($catid).'feed/" class="rss"><img style="vertical-align:middle;" src="' . plugins_url( 'images/rssIcon.gif', __FILE__ ) . '">Category RSS</a></img>';
	
		//print the widget for the sidebar
		echo $before_widget;
		echo $before_title.$title.$after_title;
		echo $out;
		echo $after_widget;
	}
}

function ahspfc_load_widgets() {
	register_widget('Hosting96PostsFromCategory_Widget');
}

add_action('widgets_init', 'ahspfc_load_widgets');

?>

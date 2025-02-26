<?php
/*
Plugin Name: Content MetaData Widget
Plugin URI: http://www.donnafontenot.com
Description: Display the current page or post's metadata (title, author, publication date, categories, tags) in a sidebar widget, outside of "the loop". The widget displays only when viewing single pages and posts. 
Version: 1.3
Author: Donna D. Fontenot
Author Email: donna@donnafontenot.com
License: GPLv2 or later

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

/* INSTRUCTIONS FOR USE
 *
 *Place a checkmark next to each content metadata (cmd) that you wish to display in the widget. Leave unchecked if you do not wish to display a metadata in the widget. Displays only on single pages and posts at this time.
 *
 * The plugin comes with basic styling for each metadata element. You can change the styles by using your own custom css for the following classes:
 *
 * .cmdtitle (the content title)
 * .cmdauthor (the content author)
 * .cmddate (the content date)
 * .cmdcategories (the content categories)
 * .cmdtags (the content tags)
 * .content_metadata_widget_box (the surrounding widget box)
 * Use the CSS ::before pseudo-element to control text before each metadata element
 */
 
class Content_Metadata_Widget extends WP_Widget
	{
		
		// constructor
		function content_metadata_widget()
			{
				parent::WP_Widget(false, $name = __('Content MetaData Widget', 'content_metadata_widget'));
			}
		
		// widget form creation
		function form($instance)
			{
				
				// Check values
				if ($instance)
					{
						$title         = esc_attr($instance['title']);
						$cmdtitle      = esc_attr($instance['cmdtitle']);
						$cmdauthor     = esc_attr($instance['cmdauthor']);
						$cmddate       = esc_attr($instance['cmddate']);
						$cmdcategories = esc_attr($instance['cmdcategories']);
						$cmdtags       = esc_attr($instance['cmdtags']);
					}
				else
					{
						$title         = '';
						$cmdtitle      = '';
						$cmdauthor     = '';
						$cmddate       = '';
						$cmdcategories = '';
						$cmdtags       = '';
					}
?>
	
	<p>
	Select the items you want to have appear in sidebar / widget area on single posts and pages. Note that pages will never show categories and tags, even if checked, but posts will, because pages do not have categories or tags.
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'content_metadata_widget'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	
	<p>
	<input id="<?php echo $this->get_field_id('cmdtitle'); ?>" name="<?php echo $this->get_field_name('cmdtitle'); ?>" type="checkbox" value="1" <?php checked( '1', $cmdtitle ); ?> />
	<label for="<?php echo $this->get_field_id('cmdtitle'); ?>"><?php _e('Content Title', 'content_metadata_widget'); ?></label>
	</p>
	
	<p>
	<input id="<?php echo $this->get_field_id('cmdauthor'); ?>" name="<?php echo $this->get_field_name('cmdauthor'); ?>" type="checkbox" value="1" <?php checked( '1', $cmdauthor ); ?> />
	<label for="<?php echo $this->get_field_id('cmdauthor'); ?>"><?php _e('Author', 'content_metadata_widget'); ?></label>
	</p>
	
	<p>
	<input id="<?php echo $this->get_field_id('cmddate'); ?>" name="<?php echo $this->get_field_name('cmddate'); ?>" type="checkbox" value="1" <?php checked( '1', $cmddate ); ?> />
	<label for="<?php echo $this->get_field_id('cmddate'); ?>"><?php _e('Date', 'content_metadata_widget'); ?></label>
	</p>
	
	<p>
	<input id="<?php echo $this->get_field_id('cmdcategories'); ?>" name="<?php echo $this->get_field_name('cmdcategories'); ?>" type="checkbox" value="1" <?php checked( '1', $cmdcategories ); ?> />
	<label for="<?php echo $this->get_field_id('cmdcategories'); ?>"><?php _e('Post Categories', 'content_metadata_widget'); ?></label>
	</p>
	
	<p>
	<input id="<?php echo $this->get_field_id('cmdtags'); ?>" name="<?php echo $this->get_field_name('cmdtags'); ?>" type="checkbox" value="1" <?php checked( '1', $cmdtags ); ?> />
	<label for="<?php echo $this->get_field_id('cmdtags'); ?>"><?php _e('Post Tags', 'content_metadata_widget'); ?></label>
	</p>
	
	<?php
			}
		
		// update widget
		function update($new_instance, $old_instance)
			{
				$instance                  = $old_instance;
				// Fields
				$instance['title']         = strip_tags($new_instance['title']);
				$instance['cmdtitle']      = strip_tags($new_instance['cmdtitle']);
				$instance['cmdauthor']     = strip_tags($new_instance['cmdauthor']);
				$instance['cmddate']       = strip_tags($new_instance['cmddate']);
				$instance['cmdcategories'] = strip_tags($new_instance['cmdcategories']);
				$instance['cmdtags']       = strip_tags($new_instance['cmdtags']);
				return $instance;
			}
		
		// display widget
		function widget($args, $instance)
			{
				extract($args);
				// these are the widget options
				$title         = apply_filters('widget_title', $instance['title']);
				$cmdtitle      = $instance['cmdtitle'];
				$cmdauthor     = $instance['cmdauthor'];
				$cmddate       = $instance['cmddate'];
				$cmdcategories = $instance['cmdcategories'];
				$cmdtags       = $instance['cmdtags'];
				
				echo $before_widget;
				// Display the widget
				
				global $post;
				$ID='';
				$author_id=$post->post_author;
				
				if (is_single() || is_page())
					{
						
						// If it's a single post or a single page only
						
						echo '<div class="widget-text content_metadata_widget_box">';
						
						// Check if title is set
						if ($title)
							{
								echo $before_title . $title . $after_title;
							}
						
						// Check if title checkbox is checked
						if ($cmdtitle AND $cmdtitle == '1')
							{
								$showtitle = get_the_title($ID);
								echo '<div class="cmdtitle">' . $showtitle . '</div>';
							}
						
						// Check if author checkbox is checked
						if ($cmdauthor AND $cmdauthor == '1')
							{
								$showauthor = get_the_author_meta( 'display_name', $author_id );
								echo '<div class="cmdauthor">' . $showauthor . '</div>';
							}
						
						// Check if date checkbox is checked
						if ($cmddate AND $cmddate == '1')
							{
								$showdate = get_the_date($ID);
								echo '<div class="cmddate">' . $showdate . '</div>';
							}
						
						// Check if categories checkbox is checked
						if ($cmdcategories AND $cmdcategories == '1' AND !is_page())
							{
								echo '<div class="cmdcategories">';
								$categories = get_the_category($ID);
								$separator  = ', ';
								$output     = '';
								if ($categories)
									{
										foreach ($categories as $category)
											{
												$output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("View all posts in %s"), $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
											}
										echo trim($output, $separator);
									}
								echo '</div>';
							}
						
						
						// Check if date checkbox is checked
						if ($cmdtags AND $cmdtags == '1' AND !is_page())
							{
								echo '<div class="cmdtags">';
								$posttags = get_the_tags($ID);
								if ($posttags)
									{
										$tagstrings = array();
										foreach ($posttags as $tag)
											{
												$tagstrings[] = '<a href="' . get_tag_link($tag->term_id) . '" class="tag-link-' . $tag->term_id . '">' . $tag->name . '</a>';
											}
										echo implode(', ', $tagstrings);
									}
								echo '</div>';
							}
						
						
						
						echo '</div>';
						echo $after_widget;
					}
			}
	}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("content_metadata_widget");'));

// enqueue styles
function cmdstyles()
	{
		wp_enqueue_style("cmd_css", path_join(WP_PLUGIN_URL, basename(dirname(__FILE__)) . "/cmdstyles.css"));
	}

add_action('wp_enqueue_scripts', 'cmdstyles');

?>
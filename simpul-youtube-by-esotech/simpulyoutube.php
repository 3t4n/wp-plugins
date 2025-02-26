<?php
/**
 * @package Simpul
 */
/*
Plugin Name: Simpul Youtube by Esotech
Plugin URI: http://www.esotech.org/plugins/simpul/simpul-youtube/
Description: This plugin is designed to access a youtube feed and display it in a Wordpress Widget.
Version: 1.7
Author: Alexander Conroy
Author URI: http://www.esotech.org/people/alexander-conroy/
License: This code is released under the GPL licence version 3 or later, available here http://www.gnu.org/licenses/gpl.txt
*/

class SimpulYoutube extends WP_Widget 
{
	# The ID of the facebook feed we are trying to read	
	public function __construct()
	{
		$widget_ops = array('classname' => 'simpul-youtube', 
							'description' => 'A Simpul Youtube Widget' );
		parent::__construct('simpul_youtube', // Base ID
							'Youtube', // Name
							$widget_ops // Args  
							);
							
	}
	public function widget( $args, $instance )
	{
		extract($args);
		
		echo $before_widget;
		
		if($instance['title_element']):
			$before_title = '<' . $instance['title_element'] . ' class="widgettitle">';
			$after_title = '</' . $instance['title_element'] . '>';
		else:
			$before_title = '<h3 class="widgettitle">';
			$after_title = '</h3>';
		endif;
		
		if ( !empty( $instance['title']) ) { echo $before_title . $instance['title']. $after_title; };
		
		// Solution for caching.
		if($instance['cache_enabled']):
			
			if(!$instance['cache'] || current_time('timestamp') > strtotime($instance['cache_interval'] . ' hours', $instance['last_cache_time'])):
				$instance['cache'] = self::youtubeVideos( $instance );;
				$instance['last_cache_time'] = current_time('timestamp');
			endif;
			
			self::updateWidgetArray( $args, $instance );
			
		else:
			
			unset($instance['cache'], $instance['last_cache_time']);
			self::updateWidgetArray( $args, $instance );
			
		endif;
		
		if( $instance['video_element'] == 'li'): 
		echo '<ul class="' . $instance['video_class'] . '">';
		else:
			echo '<div class="' . $instance['video_class'] . '">';
		endif;
		
		echo self::getPosts( $instance );
		
		if( $instance['video_element'] == 'li'): 
			echo '</ul>';
		else:
			echo '</div>';
		endif;
		
		echo $after_widget;
	}	
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance 							= $old_instance;
		$instance['title'] 					= strip_tags($new_instance['title']);
		$instance['title_element']			= strip_tags($new_instance['title_element']);
		$instance['account'] 				= strip_tags($new_instance['account']);
		$instance['type'] 					= strip_tags($new_instance['type']);
		$instance['number'] 				= strip_tags($new_instance['number']);
		$instance['video_autoplay']			= strip_tags($new_instance['video_autoplay']);
		$instance['video_title']			= strip_tags($new_instance['video_title']);
		$instance['video_class']			= strip_tags($new_instance['video_class']);
		$instance['video_link_class']		= strip_tags($new_instance['video_link_class']);
		$instance['video_element']			= strip_tags($new_instance['video_element']);
		$instance['video_description']		= strip_tags($new_instance['video_description']);
		$instance['video_published']		= strip_tags($new_instance['video_published']);
		$instance['video_published_format']	= strip_tags($new_instance['video_published_format']);
		$instance['image'] 					= strip_tags($new_instance['image']);
		
		$instance['image_max'] 				= strip_tags($new_instance['image_max']);
		$instance['image_height'] 			= strip_tags($new_instance['image_height']);
		$instance['image_width'] 			= strip_tags($new_instance['image_width']);
		$instance['image_slider']			= strip_tags($new_instance['image_slider']);
		$instance['image_position']			= strip_tags($new_instance['image_position']);
		$instance['cache_enabled']			= strip_tags($new_instance['cache_enabled']);
		$instance['cache_interval']			= strip_tags($new_instance['cache_interval']);
		
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$instance 		= wp_parse_args( (array) $instance, array( 'title' => '', 'account' => 'EsotechInc', 'number' => '3' ) );
		$title 						= strip_tags($instance['title']);
		$title_element				= strip_tags($instance['title_element']);
		$account	 				= strip_tags($instance['account']);
		$type						= strip_tags($instance['type']);
		$number 					= strip_tags($instance['number']);
		$video_autoplay				= strip_tags($instance['video_autoplay']);
		$video_title				= strip_tags($instance['video_title']);
		$video_class				= strip_tags($instance['video_class']);
		$video_link_class			= strip_tags($instance['video_link_class']);
		$video_element				= strip_tags($instance['video_element']);
		$video_description 			= strip_tags($instance['video_description']);
		$video_published 			= strip_tags($instance['video_published']);
		$video_published_format 	= strip_tags($instance['video_published_format']);
		$image		 				= strip_tags($instance['image']);
		$image_linked 				= strip_tags($instance['image_linked']);
		
		$image_max					= strip_tags($instance['image_max']);
		$image_height				= strip_tags($instance['image_height']);
		$image_width 				= strip_tags($instance['image_width']);
		$image_slider 				= strip_tags($instance['image_slider']);
		$image_position				= strip_tags($instance['image_position']);
		$cache_enabled 				= strip_tags($instance['cache_enabled']);
		$cache_interval 			= strip_tags($instance['cache_interval']);

		echo self::formatField($this->get_field_name('title'), $this->get_field_id('title'),  $title, "Title");
		echo self::formatField($this->get_field_name('title_element'), $this->get_field_id('title_element'),  $title_element, "Title Element (default h3)");
		echo self::formatField($this->get_field_name('account'), $this->get_field_id('account'),  $account, "Youtube Account or ID");
		echo self::formatField($this->get_field_name('type'), $this->get_field_id('type'),  $type, "Type", 'radio', '', array('user', 'playlist'));
		echo self::formatField($this->get_field_name('number'), $this->get_field_id('number'),  $number, "Number of Videos");
		echo self::formatField($this->get_field_name('video_autoplay'), $this->get_field_id('video_autoplay'),  $video_autoplay, "Videos Autoplay", 'checkbox');
		echo self::formatField($this->get_field_name('video_title'), $this->get_field_id('video_title'),  $video_title, "Show Video Title", 'checkbox');
		echo self::formatField($this->get_field_name('video_class'), $this->get_field_id('video_class'),  $video_class, "Video Container Class");
		echo self::formatField($this->get_field_name('video_link_class'), $this->get_field_id('video_link_class'),  $video_link_class, "Video Link Class (Also applies to Image Links)");
		echo self::formatField($this->get_field_name('video_element'), $this->get_field_id('video_element'),  $video_element, "Video Element (default p)");
		echo self::formatField($this->get_field_name('video_description'), $this->get_field_id('video_description'),  $video_description, "Show Video Description", 'checkbox');
		echo self::formatField($this->get_field_name('video_published'), $this->get_field_id('video_published'),  $video_published, "Show Video Published Date", 'checkbox');
		echo self::formatField($this->get_field_name('video_published_format'), $this->get_field_id('video_published_format'),  $video_published_format, "Video Published Date Format");
		echo "<h3>Image Previews</h3>";
		echo self::formatField($this->get_field_name('image'), $this->get_field_id('image'),  $image, "Show Images", 'checkbox');
		echo self::formatField($this->get_field_name('image_linked'), $this->get_field_id('image_linked'),  $image_linked, "Link Images", 'checkbox');
		
		echo self::formatField($this->get_field_name('image_max'), $this->get_field_id('image_max'),  $image_max, "Max Images (Effects Slide All/Posts)");
		echo self::formatField($this->get_field_name('image_height'), $this->get_field_id('image_height'),  $image_height, "Image Height");
		echo self::formatField($this->get_field_name('image_width'), $this->get_field_id('image_width'),  $image_width, "Image Width");
		echo self::formatField($this->get_field_name('image_slider'), $this->get_field_id('image_slider'),  $image_slider, "Slider Options", 'radio','', array('slide_posts', 'slide_all', 'off' ));
		echo self::formatField($this->get_field_name('image_position'), $this->get_field_id('image_position'),  $image_position, "Image", 'radio', '', array('above', 'below'));
		echo "<h3>Cache Options</h3>";
		echo self::formatField($this->get_field_name('cache_enabled'), $this->get_field_id('cache_enabled'), $cache_enabled, "Use Cache?", 'checkbox' );
		echo self::formatField($this->get_field_name('cache_interval'), $this->get_field_id('cache_interval'),  $cache_interval, "Cache Interval (hours)" );
	}

	# -----------------------------------------------------------------------------#
	# End Standard Wordpress Widget Section
	# -----------------------------------------------------------------------------#
	
	# -----------------------------------------------------------------------------#
	# Get the Youtube feed via CURL according to the Youtube Username
	# -----------------------------------------------------------------------------#
	public function youtubeVideos( $instance )
	{
		$header = array();
		$header[] = 'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5';
		$header[] = 'Cache-Control: max-age=0';
		$header[] = 'Connection: keep-alive';
		$header[] = 'Keep-Alive: 300';
		$header[] = 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7';
		$header[] = 'Accept-Language: en-us,en;q=0.5';
		$header[] = 'Pragma: ';
		$ch = curl_init(); 
		
		if( $instance['type'] == 'playlist'):
			curl_setopt($ch, CURLOPT_URL, 'http://gdata.youtube.com/feeds/api/playlists/' . $instance['account'] . '?alt=json&max-results=' . $instance['number'] );
		else:
			curl_setopt($ch, CURLOPT_URL, 'http://gdata.youtube.com/feeds/api/videos?max-results=' . $instance['number'] . '&alt=json&orderby=published&author=' . $instance['account']);
		endif;
		
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.11) Gecko/2009060215 Firefox/3.0.11 (.NET CLR 3.5.30729)');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		$response = curl_exec($ch);
		curl_close ($ch);
		
		return json_decode($response);
	}
	# -----------------------------------------------------------------------------#
	# This is the mthod we will call, which sets everything up and calls the
	# Youtube videos method
	# -----------------------------------------------------------------------------#
	public function getPosts( $instance )
	{
		$result = null;
		$i = null;

		# get the actual feed
		if($instance['cache_enabled']):
			$videos = $instance['cache'];
		else:
			$videos = self::youtubeVideos( $instance ); 
		endif;
		# Make sure we have something to work with
		if(!empty($videos))
		{
			$simpulthumb =  plugins_url( '/includes/simpulthumb.php?src=', __FILE__ );
			$image_width = $instance['image_width'] ? $instance['image_width'] : '150px';
			$image_height = $instance['image_height'] ? $instance['image_height'] : '150px';
			
			if($instance['image_slider'] == "slide_all"): // Image Slider
				$image_slider = '<div class="simpul-youtube-images" style="position: relative; width: ' . $image_width . 'px; height: ' . $image_height . 'px;">';
			endif;
			
			$instance['image_max'] > 1 ? $instance['image_max'] = $instance['image_max']: $instance['image_max'] = 1;
			
			foreach($videos->feed->entry as $post):
			
				if( !empty( $instance['video_element'] ) ):
					$posts .= '<' . $instance['video_element'] . '>';
				else:
					$posts .= '<p>';
				endif;
				
				//Get the Image ready. 
				if( $instance['image'] ):

					$image = '';
					if($instance['image_slider'] == "slide_posts"): // Post Slider
						$image .= '<div class="simpul-youtube-images" style="position: relative; width: ' . $image_width . 'px; height: ' . $image_height . 'px;">';		
					endif;
					$image_count = 0;
					foreach( $post->{'media$group'}->{'media$thumbnail'} as $thumbnail):
						
						// Safe to assume that autoplay uses an ampersand (&).
						if($instance['image_linked']) $image .= '<a href="' . $post->link[0]->href . '&autoplay='. ($instance['video_autoplay'] ? '1' : '0') . '" target="_blank" class="' . $instance['video_link_class'] . '">';
					
						$image .= '<img height="' . $image_height . '" width="' . $image_width . '" src="' . $simpulthumb . $thumbnail->url . '&w=' . $image_width . '&h=' . $image_height . '&q=100' . '" />';
					
						if($instance['image_linked']) $image .= '</a>';
						
						$image_count++;
						
						if( $image_count >= $instance['image_max']): break; endif;
						
					endforeach;
					
					if($instance['image_slider'] == "slide_posts"):
						$image .= '</div>';		
					endif;
					
				endif;
				//Show Video Title
				if($instance['video_title']):
					// Safe to assume that autoplay uses an ampersand (&).
					$title = '<a href="' . $post->link[0]->href . '&autoplay='. ($instance['video_autoplay'] ? '1' : '0') . '" target="_blank" class="' . $instance['video_link_class'] . '">' .$post->title->{'$t'} ."</a>";
				endif;
				//Show Published Date
				if($instance['video_published']):
					if($instance['video_published_format']):
						$video_published_format = $instance['video_published_format'];
					else:
						$video_published_format = 'm/d/Y';
					endif; 
					$published = '<br />' . date( $video_published_format, strtotime($post->{'published'}->{'$t'} ) );
				endif;
				
				//Show the Video Description if any.
				if( $instance['video_description'] && $post->{'media$group'}->{'media$description'}->{'$t'} ):
					$description = "<br />" . $post->{'media$group'}->{'media$description'}->{'$t'};
				endif;
				
				//If Image slider, start bulding Image slider, otherwise decide where to put the main image.
				if($instance['image_slider'] == "slide_all"): 
					$posts .= $title . $published . $description;
					$image_slider .= $image;		
				elseif($instance['image_position'] == 'below'):
					$posts .= $title . $published . $description . $image;
				else:
					$posts .= $image . $title . $published . $description;
				endif;
				
				if( !empty( $instance['video_element'] ) ):
					$posts .= '</' . $instance['video_element'] . '>';
				else:
					$posts .= '</p>';
				endif;
				
			endforeach;

			if($instance['image_slider'] == "slide_all"):
				$image_slider .= '</div>';	
			endif;

			//Decide to show Slider and Where, otherwise dont modify posts.
			if($instance['image_slider'] && $instance['image_position'] == 'below'):
				$posts = $posts . $image_slider;
			elseif($instance['image_slider']):
				$posts = $image_slider . $posts;
			endif;
			
			return $posts;
		}
	return false;
	}
	public function textToLink($text)
	{
		$text  = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)','<a href="\\1">\\1</a>', $text ); 
		$text  = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="http://\\2">\\2</a>', $text ); 
		$text  = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})', '<a href="mailto:\\1">\\1</a>', $text );
		
		return $text;
	}
	public function getLabel($key)
	{
		$glued = array();
		if( strpos( $key, "_" ) ) $pieces = explode( "_", $key );
		elseif( strpos( $key, "-" ) ) $pieces = explode( "-", $key );
		else $pieces = explode(" ", $key);
		foreach($pieces as $piece):
			if($piece == "id"):
				$glued[] = strtoupper($piece);
			else:
				$glued[] = ucfirst($piece);
			endif;
		endforeach;
			
		return implode(" ", (array) $glued);
	}
	public function formatField($field, $id, $value, $description, $type = "text", $args = array(), $options = array() )	{
		if($type == "text"):
			return '<p>
					<label for="' . $id . '">
						' . $description . ': 
						<input class="widefat" id="' . $id . '" name="' . $field. '" type="text" value="' . attribute_escape($value) . '" />
					</label>
					</p>';
		elseif($type == "checkbox"):
			if( $value ) $checked = "checked";
			return '<p>
					<label for="' . $field . '">
						
						<input id="' . $field. '" name="' . $field . '" type="checkbox" value="1" ' . $checked . ' /> ' . $description . ' 
					</label>
					</p>';
		elseif($type == "radio"):
			$radio = '<p>
					<label for="' . $field . '">' . $description . '<br />';
					foreach($options as $option):
						if( $value == $option ): $checked = "checked"; else: $checked = ""; endif;						
						$radio .= '<input id="' . $field. '" name="' . $field . '" type="radio" value="' . $option . '" ' . $checked . ' /> ' . self::getLabel($option) . '<br />';
					endforeach; 
			$radio .= '</label>
					</p>';
			return $radio;
		endif;
	}
	public function updateWidgetArray( $args, $instance ) {
		
		$widget_class = explode('-', $args['widget_id']);
		$widget_id = array_pop($widget_class);
		$widget_name = implode('-', $widget_class);
		$widget_array = get_option('widget_' . $widget_name);
		
		$widget_array[$widget_id] = $instance;
		update_option('widget_' . $widget_name, $widget_array);
		
	}
}
//Register the Widget
function simpul_youtube_widget() {
	register_widget( 'SimpulYoutube' );
}
//Add Widget to wordpress
add_action( 'widgets_init', 'simpul_youtube_widget' );	

function simpul_youtube_scripts() {
	if( !wp_script_is('jquery') ):
		wp_enqueue_script( 'jquery' ); // Make sure jQuery is Enqueued
	endif;
				
	if( !wp_script_is('cycle') ):
		wp_enqueue_script('cycle', plugins_url( '/js/jquery.cycle.all.js', __FILE__ ), array('jquery') );
	endif;
	
	wp_deregister_script('simpul-youtube');
	wp_enqueue_script('simpul-youtube', plugins_url( '/js/simpul-youtube.js', __FILE__ ), array('jquery', 'cycle') );
}
	
if(!is_admin()): //Load only on Frontend
	add_action( 'wp_enqueue_scripts', 'simpul_youtube_scripts' );
endif;

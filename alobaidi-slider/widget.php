<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class AlobaidiSliderWidget extends WP_Widget {
	function AlobaidiSliderWidget() {
		parent::__construct( false, 'Alobaidi Slider', array('description' => 'Beautiful slider widget, responsive and retina, touch devices, youtube, vimeo, keek, and instagram image support.') );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$get_links = $instance['url'];

		?>
            
			<?php echo $args['before_widget']; ?>

				<?php if ( !empty($title) ){ echo $args['before_title'] . $title . $args['after_title']; } ?>

				<?php
					if( empty($get_links) ){
						echo "<p>Please enter media links.</p>";
						echo $args['after_widget'];
						return false;
					}

					$get_media 		= 	$get_links;
					$preg_replace 	= 	preg_replace('/\s+/', "\n", $get_media);
					$explode		= 	explode("\n", $preg_replace);
					$media_links 	= 	(array) $explode;
					$the_list 		=	'';

					$vimeo_regex = '/(https?:\/\/vimeo.com\/)|(www.vimeo.com\/)|(vimeo.com\/)|(https?:\/\/www.vimeo.com\/)/';
					$youtube_regex = '/(https?:\/\/youtube.com\/watch)|(www.youtube.com\/watch)|(youtube.com\/watch)|(https?:\/\/www.youtube.com\/watch)|(https?:\/\/youtu.be)|(www.youtu.be)|(youtu.be)|(https?:\/\/www.youtu.be)/';
					$instagram_regex = '/(https?:\/\/instagram.com\/p)|(www.instagram.com\/p)|(instagram.com\/p)|(https?:\/\/www.instagram.com\/p)|(https?:\/\/instagr.am\/p)|(www.instagr.am\/p)|(instagr.am\/p)|(https?:\/\/www.instagr.am\/p)/';
	
					foreach ($media_links as $media_link) {
						$url = $media_link;

						if( preg_match($vimeo_regex, $url) ){
							$protocol 	= array('http://', 'https://', 'www.', 'vimeo.com', '/');
							$str_replace = str_replace($protocol, '', $url);
							$video_link = preg_replace('/[a-zA-Z]/', '', $str_replace);
							$the_list .= '<li><iframe src="http://player.vimeo.com/video/'.$video_link.'"></iframe></li>';
						}
		
						elseif( preg_match($youtube_regex, $url) ){
							$protocol 	= array('http://', 'https://', 'www.', 'youtube.com', 'youtu.be', 'embed', 'watch?v=', '/');
							$str_replace = str_replace($protocol, '', $url);
							$video_link = preg_replace( array('/[^&?]*?=[^&?]*/', '/[(&)]/'), '', $str_replace );
							$the_list .= '<li><iframe src="http://youtube.com/embed/'.$video_link.'"></iframe></li>';
						}
		
						elseif( preg_match("/(keek.com)+/", $url) ){
							$regex = array("/.*\\/(?=[^\\/]*\\/)|\\//m");
							$preg_replace = preg_replace($regex, "", $url);
							$str_replace = str_replace("keek", "", $preg_replace);
							$embed_link = "https://www.keek.com/keek/$str_replace/embed?autoplay=0&mute=0&controls=1&loop=0";
							$the_list .= '<li><iframe src="'.$embed_link.'"></iframe></li>';
						}
		
						elseif( preg_match($instagram_regex, $url) ){
							$regex = array("/[^&?]*?=[^&?]*/", "/[(?)]/", "/(\/p\/)/");
							$preg_replace = preg_replace($regex, "", $url);
							$protocol = array('http://', 'https://', 'www.', 'instagram.com', 'instagr.am', '/');
							$str_replace = str_replace($protocol, "", $preg_replace);
							$instagram_image_link = 'https://instagram.com/p/'.$str_replace.'/media?size=l';
							$the_list .= '<li><a href="'.$instagram_image_link.'" target="_blank"><img src="'.$instagram_image_link.'"></a></li>';
						}
		
						else{
							$the_list .= '<li><a href="'.$url.'" target="_blank"><img src="'.$url.'"></a></li>';
						}
					} // end foreach()
				?>

<div id="alobaidi-slider-standard-slider" class="alobaidi_slider_wrap">
	<div class="alobaidi_slider_content">
		<ul id="alobaidi_slider" class="alobaidi_slider_list">
			<?php echo $the_list; ?>
		</ul>
		<i class="alobaidi_slider_next"></i><i class="alobaidi_slider_prev"></i>
	</div>
</div>
            
            <?php echo  $args['after_widget']; ?>

        <?php
	}//widget
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['url'] = strip_tags($new_instance['url']);
		return $instance;
	}//update
	
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance
		);
		
		$defaults = array(
			'title' => '',
			'url' => ''
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = $instance['title'];
		$url = $instance['url'];
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('url'); ?>">Links:</label> 
				<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>"><?php echo $url; ?></textarea>
				<label for="<?php echo $this->get_field_id('url'); ?>">Enter list of media links, one URL per line, enter images, youtube, vimeo, keek, instagram only.</label>
			</p>
        <?php
		
	}//form
	
}
add_action('widgets_init', create_function('', 'return register_widget("AlobaidiSliderWidget");') );

?>
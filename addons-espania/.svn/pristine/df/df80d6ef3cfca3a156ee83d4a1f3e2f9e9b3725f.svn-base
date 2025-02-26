<?php
add_action('widgets_init', create_function('', 'return register_widget("AddonsEspaniaVideoWidget");'));

class AddonsEspaniaVideoWidget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => __('Advanced widget for displaying videos', 'espania' ) );
		$control_ops = array( 'width' => 400 );
        parent::__construct( false, __( '&raquo; [Espania] Video', 'espania' ), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
			
		echo $before_widget;
		echo '<div class="espania-widget-video">';
		
		if ( $title ) {
			echo $before_title;
			echo $title ; 
			echo $after_title; 
		}
		
		if ( $instance['embed_code'] ) { 
			echo $instance['embed_code']; 
		}

		elseif ( $instance['video_url'] ) { 
			$video_url = $instance['video_url'];
			$video_link = @parse_url($video_url);
			if ( $video_link['host'] == 'www.youtube.com' || $video_link['host']  == 'youtube.com' ) {
				parse_str( @parse_url( $video_url, PHP_URL_QUERY ), $my_array_of_vars );
				$video =  $my_array_of_vars['v'] ;
				$video_code ='<iframe style="border:none" width="425" height="349" src="http://www.youtube.com/embed/'.$video.'?rel=0&wmode=opaque" allowfullscreen></iframe>';
			}
			elseif( $video_link['host'] == 'www.vimeo.com' || $video_link['host']  == 'vimeo.com' ){
				$video = (int) substr(@parse_url($video_url, PHP_URL_PATH), 1);
				$video_code='<iframe style="border:none" width="400" height="225" src="http://player.vimeo.com/video/'.$video.'" allowFullScreen></iframe>';
			}
			echo $video_code;	
		} 
		
		elseif ( $instance['mp4_url'] || $instance['webm_url'] || $instance['ogv_url'] ) { ?>
			<video <?php if ( isset( $instance['poster_url'] ) ) { echo 'poster="'.$instance['poster_url'].'"'; } ?> controls="controls" preload="none">
				<?php if ( isset( $instance['mp4_url'] ) ) { ?><source type="video/mp4" src="<?php echo $instance['mp4_url']; ?>" /><?php } ?>
				<?php if ( isset( $instance['webm_url'] ) ) { ?><source type="video/webm" src="<?php echo $instance['webm_url']; ?>" /><?php } ?>
				<?php if ( isset( $instance['ogv_url'] ) ) { ?><source type="video/ogv" src="<?php echo $instance['ogv_url']; ?>" /><?php } ?> 
				<!-- Flash fallback for non-HTML5 browsers without JavaScript -->
				<object width="100%" type="application/x-shockwave-flash" data="flashmediaelement.swf">
					<param name="movie" value="flashmediaelement.swf" />
					<param name="flashvars" value="controls=true&file=<?php if ( isset( $instance['mp4_url'] ) ) { echo $instance['mp4_url']; } elseif ( isset( $instance['ogv_url'] ) ) { echo $instance['ogv_url']; } elseif ( isset( $instance['webm_url'] ) ) { echo $instance['webm_url']; } ?>" />
					<?php if ( isset( $instance['poster_url'] ) ) { ?>
						<img src="<?php echo  $instance['poster_url']; ?>" width="100%" title="No video playback capabilities" />
					<?php } ?>
				</object>
			</video>
		<?php }
		
		if ( $instance['description'] ) { ?>
			<div class="video-descr"><?php echo $instance['description']; ?></div>
		<?php
		}
		
		echo '</div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$params = array( 'title', 'description', 'video_url', 'mp4_url', 'webm_url', 'ogv_url', 'poster_url' );
		foreach ( $params as $k ) {
			$instance[$k] = strip_tags( $new_instance[$k] );
		}
		$instance['embed_code'] = $new_instance['embed_code'] ;
		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title' => __( 'Featured Video', 'espania' ),
			'description' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 		
		?>

		<div class="espania-widget">
            <table width="100%">
                <tr>
                    <td class="espania-widget-label" width="30%"><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content" width="70%"><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></td>
                </tr>
                
				<tr>
                    <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content"><textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" class="widefat" ><?php echo $instance['description']; ?></textarea></td>
                </tr>
				 
                <tr>
                    <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'embed_code' ); ?>"><?php _e( 'Embed Code:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content"><textarea id="<?php echo $this->get_field_id( 'embed_code' ); ?>" name="<?php echo $this->get_field_name( 'embed_code' ); ?>" class="widefat" ><?php echo $instance['embed_code']; ?></textarea></td>
                </tr>
				
				<tr>
					<td>
						<em style="display:block; border-bottom:1px solid #CCC; margin-bottom:15px;"><?php _e( 'OR', 'espania' ); ?></em>
					</td>
				</tr>
				
				<tr>
                    <td class="espania-widget-label" width="30%"><label for="<?php echo $this->get_field_id('video_url'); ?>"><?php _e( 'Youtube/Vimeo Video URL:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content" width="70%">
						<input class="widefat" id="<?php echo $this->get_field_id('video_url'); ?>" name="<?php echo $this->get_field_name('video_url'); ?>" type="text" value="<?php echo $instance['video_url']; ?>" />
					</td>
				</tr>
				
				<tr>
					<td>
						<em style="display:block; border-bottom:1px solid #CCC; margin:15px 0;"><?php _e( 'OR', 'espania' ); ?></em>
					</td>
				</tr>
				
				<tr>
                    <td class="espania-widget-label" width="30%"><label for="<?php echo $this->get_field_id('mp4_url'); ?>"><?php _e( 'MP4 file Url:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content" width="70%">
						<input class="widefat" id="<?php echo $this->get_field_id('mp4_url'); ?>" name="<?php echo $this->get_field_name('mp4_url'); ?>" type="text" value="<?php echo $instance['mp4_url']; ?>" />
					</td>
				</tr>
				
				<tr>
                    <td class="espania-widget-label" width="30%"><label for="<?php echo $this->get_field_id('webm_url'); ?>"><?php _e( 'WebM file Url:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content" width="70%">
						<input class="widefat" id="<?php echo $this->get_field_id('webm_url'); ?>" name="<?php echo $this->get_field_name('webm_url'); ?>" type="text" value="<?php echo $instance['webm_url']; ?>" />
					</td>
				</tr>
				
				<tr>
                    <td class="espania-widget-label" width="30%"><label for="<?php echo $this->get_field_id('ogv_url'); ?>"><?php _e( 'OGV file Url:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content" width="70%">
						<input class="widefat" id="<?php echo $this->get_field_id('ogv_url'); ?>" name="<?php echo $this->get_field_name('ogv_url'); ?>" type="text" value="<?php echo $instance['ogv_url']; ?>" />
					</td>
				</tr>
				
				<tr>
                    <td class="espania-widget-label" width="30%"><label for="<?php echo $this->get_field_id('poster_url'); ?>"><?php _e( 'Poster img Url:', 'espania' ); ?></label></td>
                    <td class="espania-widget-content" width="70%">
						<input class="widefat" id="<?php echo $this->get_field_id('poster_url'); ?>" name="<?php echo $this->get_field_name('poster_url'); ?>" type="text" value="<?php echo $instance['poster_url']; ?>" />
					</td>
				</tr>
				
			</table>
        </div>	
				
		<?php
	}
}
?>
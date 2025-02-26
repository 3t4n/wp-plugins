<?php
add_action('widgets_init', create_function('', 'return register_widget("AddonsEspaniaInstagramWidget");'));

class AddonsEspaniaInstagramWidget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => __( 'Instagram photos widget.', 'espania' ) );
		$control_ops = array( 'width' => 400 );
        parent::__construct( false, __( '&raquo; [Espania] Instagram', 'espania' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = $instance['title'];
		$username = $instance['username'];	
		$limit = $instance['number'];
		$size = $instance['size'];
		$target = $instance['target'];
		
		echo $before_widget;
		if(!empty($title)) { echo $before_title . $title . $after_title; };
			
		if ($username != '') {

			$media_array = $this->scrape_instagram($username, $limit);

			if ( is_wp_error($media_array) ) {

			   echo $media_array->get_error_message();

			} else {

				// filter for images only?
				if ( $instance['only_img'] ) $media_array = array_filter( $media_array, array( $this, 'images_only' ) );

				?><ul class="instagram-pics pics-<?php echo $size; ?>"><?php
				foreach ($media_array as $item) {
					echo '<li><a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"><img src="'. esc_url($item[$size]) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"/></a></li>';
				}
				?></ul><?php
			}
		}
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$params = array( 'title', 'username', 'number', 'size', 'target', 'only_img' );
		foreach ( $params as $k ) {
			$instance[$k] = strip_tags( $new_instance[$k] );
		}
        return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title' => 'Instagram',
			'username' => '',
			'number' => '4',
			'size' => 'thumbnail',
			'target' => '_self',
			'only_img' => false,
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
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Username:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content"><input type="text" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php  echo esc_attr($instance['username']); ?>" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of photos:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content"><input type="number" min="1" max="50" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr($instance['number']); ?>" /></td>
                    </tr>

					<tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Photo size:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content">
                            <select name="<?php echo $this->get_field_name( 'size' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'size' ); ?>">
								<option value="thumbnail" <?php selected('thumbnail', $instance['size']); ?> ><?php _e( 'Thumbnail', 'espania' ); ?></option>
								<option value="large" <?php selected('large', $instance['size']); ?> ><?php _e( 'Large', 'espania' ); ?></option>
							</select>                       
                        </td>
                    </tr>
					
					<tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'target' ); ?>"><?php _e( 'Open links in:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content">
							<select name="<?php echo $this->get_field_name( 'target' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'target' ); ?>">
								<option value="_self" <?php selected('_self', $instance['target']); ?> ><?php _e( 'Current window (_self)', 'espania' ); ?></option>
								<option value="_blank" <?php selected('_blank', $instance['target']); ?> ><?php _e( 'New window (_blank)', 'espania' ); ?></option>
							</select>                       
                        </td>
                    </tr>
					
					<tr>
                        <td class="espania-widget-label"><?php _e( 'Show only images:', 'espania' ); ?></td>
                        <td class="espania-widget-content">
                            <input type="checkbox" id="<?php echo $this->get_field_id('only_img'); ?>" name="<?php echo $this->get_field_name('only_img'); ?>"  <?php checked('true', $instance['only_img']); ?> value="true" /> <label for="<?php echo $this->get_field_id('only_img'); ?>"><?php _e( 'Enable', 'espania' ); ?></label>                          
						</td>
                    </tr>
				  
                </table>
            </div>	
		
		<?php
	}
	
	// based on https://gist.github.com/cosmocatalano/4544576
	function scrape_instagram($username, $slice = 4) {

		$username = strtolower($username);

		//if (false === ($instagram = get_transient('instagram-media-'.sanitize_title_with_dashes($username)))) {

			$remote = wp_remote_get('http://instagram.com/'.trim($username));

			if (is_wp_error($remote))
	  			return new WP_Error('site_down', __( 'Unable to communicate with Instagram.', 'espania' ));

  			if ( 200 != wp_remote_retrieve_response_code( $remote ) )
  				return new WP_Error('invalid_response', __( 'Instagram did not return a 200.', 'espania' ));

			$shards = explode('window._sharedData = ', $remote['body']);
			$insta_json = explode(';</script>', $shards[1]);
			$insta_array = json_decode($insta_json[0], TRUE);

			if (!$insta_array)
	  			return new WP_Error('bad_json', __( 'Instagram has returned invalid data.', 'espania' ));

			$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];

			$instagram = array();

//        var_dump($images);

			foreach ($images as $image) {

                $image['display_src']   = preg_replace( "/^http:/i", "", $image['display_src'] );
                $image['thumbnail_src'] = preg_replace( "/^http:/i", "", $image['thumbnail_src'] );
                $image['display_src']   = preg_replace( "/^http:/i", "", $image['display_src'] );

                $instagram[] = array(
                    'description'   => isset( $image['caption'] ) ? $image['caption'] : '',
                    'link'          => $image['display_src'],
                    'comments'      => $image['comments']['count'],
                    'likes'         => $image['likes']['count'],
                    'thumbnail'     => $image['thumbnail_src'],
                    'large'         => $image['display_src'],
                    'type'          => $image['__typename']
                );

			}

			$instagram = base64_encode( serialize( $instagram ) );
			set_transient('instagram-media-'.sanitize_title_with_dashes($username), $instagram, apply_filters('null_instagram_cache_time', HOUR_IN_SECONDS*2));
		//}

		$instagram = unserialize( base64_decode( $instagram ) );

		return array_slice($instagram, 0, $slice);
	}

	function images_only($media_item) {

		if ($media_item['type'] == 'GraphImage')
			return true;

		return false;
	}
	
}
?>
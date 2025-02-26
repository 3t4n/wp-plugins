<?php
add_action('widgets_init', create_function('', 'return register_widget("AddonsEspaniaFlickrWidget");'));

class AddonsEspaniaFlickrWidget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => __( 'Flickr photos widget.', 'espania' ) );
		$control_ops = array( 'width' => 400 );
        parent::__construct( false, __( '&raquo; [Espania] Flickr', 'espania' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$id = $instance['id'];
		$number = $instance['number'];
		$type = $instance['type'];
		$sorting = $instance['sorting'];
		$size = $instance['custom_size'] ? 's' : $instance['size'];
		$widget_id = rand(); 
		
		echo $before_widget;
		echo $before_title; 
		echo $title;
        echo $after_title; 
		?>
		
		<?php if ( $instance['custom_size'] == true ) { ?>
			<style>
				<?php echo ".flickr_".$widget_id; ?> .flickr_badge_image a img { width: <?php echo $instance['width'] . 'px'; ?>; height: <?php echo $instance['height'] . 'px'; ?>; }
			</style>
		<?php } ?>
		
		<div class="flickr flickr_<?php echo $widget_id; ?>">			
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=<?php echo $sorting; ?>&amp;&amp;layout=x&amp;source=<?php echo $type; ?>&amp;<?php echo $type; ?>=<?php echo $id; ?>&amp;size=<?php echo $size; ?>"></script>
			<div class="clearfix"></div>
		</div>
		
	    <?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$params = array( 'title', 'id', 'number', 'type', 'sorting', 'size', 'custom_size', 'width', 'height' );
		foreach ( $params as $k ) {
			$instance[$k] = strip_tags( $new_instance[$k] );
		}
        return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title' => 'Flickr',
			'id' => '52617155@N08',
			'number' => '8',
			'type' => 'user',
			'sorting' => 'latest',
			'size' => 's',
			'custom_size' => false,
			'width' => '75',
			'height' => '75'
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
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e( 'Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):', 'espania' ); ?></label></td>
                        <td class="espania-widget-content"><input type="text" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php  echo esc_attr($instance['id']); ?>" class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of images:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content"><input type="number" min="1" max="50" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr($instance['number']); ?>" /></td>
                    </tr>

					<tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Type:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content">
                            <select name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'type' ); ?>">
								<option value="user" <?php selected('user', $instance['type']); ?> ><?php _e( 'User', 'espania' ); ?></option>
								<option value="group" <?php selected('group', $instance['type']); ?> ><?php _e( 'Group', 'espania' ); ?></option>
							</select>                       
                        </td>
                    </tr>
					
					<tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'sorting' ); ?>"><?php _e( 'Sorting:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content">
							<select name="<?php echo $this->get_field_name( 'sorting' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'sorting' ); ?>">
								<option value="latest" <?php selected('latest', $instance['sorting']); ?> ><?php _e( 'Latest', 'espania' ); ?></option>
								<option value="random" <?php selected('random', $instance['sorting']); ?> ><?php _e( 'Random', 'espania' ); ?></option>
							</select>                       
                        </td>
                    </tr>
					
					<tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Size:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content">
                            <select name="<?php echo $this->get_field_name( 'size' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'size' ); ?>">
								<option value="s" <?php selected('s', $instance['size']); ?> ><?php _e( 'Square', 'espania' ); ?></option>
								<option value="m" <?php selected('m', $instance['size']); ?> ><?php _e( 'Medium', 'espania' ); ?></option>
								<option value="t" <?php selected('t', $instance['size']); ?> ><?php _e( 'Thumbnail', 'espania' ); ?></option>
							</select>                       
                        </td>
                    </tr>
					
					<tr>
                        <td class="espania-widget-label"><?php _e( 'Custom size:', 'espania' ); ?></td>
                        <td class="espania-widget-content">
                            <input type="checkbox" id="<?php echo $this->get_field_id('custom_size'); ?>" name="<?php echo $this->get_field_name('custom_size'); ?>"  <?php checked('true', $instance['custom_size']); ?> value="true" /> <label for="<?php echo $this->get_field_id('custom_size'); ?>"><?php _e( 'Enable', 'espania' ); ?></label>                          
							&nbsp; &nbsp; <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e( 'Width:', 'espania' ); ?></label> <input type="text" style="width: 40px;" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo esc_attr($instance['width']); ?>" /> 
							&nbsp; <label for="<?php echo $this->get_field_id('height'); ?>"><?php _e( 'Height:', 'espania' ); ?></label> <input type="text" style="width: 40px;" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo esc_attr($instance['height']); ?>"  />  
						</td>
                    </tr>
				  
                </table>
            </div>	
		
		<?php
	}
}
?>
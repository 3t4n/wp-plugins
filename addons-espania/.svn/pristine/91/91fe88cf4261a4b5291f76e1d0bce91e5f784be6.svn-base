<?php        
add_action('widgets_init', create_function('', 'return register_widget("AddonsEspaniaFacebookBoxWidget");'));

class AddonsEspaniaFacebookBoxWidget extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'description' => __('Facebook like box widget.', 'espania' ) );
        $control_ops = array( 'width' => 400 );
        parent::__construct( false, __( '&raquo; [Espania] Facebook Box', 'espania' ), $widget_ops, $control_ops );
    }

    function widget($args, $instance) {
        extract( $args );
        $title = $instance['title'];
        $url = $instance['url'];
        $width = $instance['width'];
        $height = $instance['height'];
        $colorscheme = $instance['colorscheme'];
        $show_faces = $instance['show_faces'] == 'true' ? 'true' : 'false';
        $stream = $instance['stream'] == 'true' ? 'true' : 'false';
        $header = $instance['header'] == 'true' ? 'true' : 'false';
		$border = $instance['border'] == 'true' ? 'true' : 'false';
		
		echo $before_widget;
		echo $before_title; 
		echo $title;
        echo $after_title; 
        ?>		

		<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $url; ?>&amp;width&amp;height=<?php echo $height; ?>&amp;colorscheme=<?php echo $colorscheme; ?>&amp;show_faces=<?php echo $show_faces; ?>&amp;header=<?php echo $header; ?>&amp;stream=<?php echo $stream; ?>&amp;show_border=<?php echo $border; ?>&amp" 
		scrolling="no" 
		frameborder="0" 
		style="border:none; overflow:hidden; height:<?php echo $height + 130; ?>px;" 
		allowTransparency="true">
		</iframe>   
		  
        <?php
		echo $after_widget;
    }

    function update($new_instance, $old_instance) {		
    	$instance = $old_instance;
		$params = array( 'title', 'url', 'width', 'height', 'colorscheme', 'show_faces', 'stream', 'header', 'border' );
		foreach ( $params as $k ) {
			$instance[$k] = strip_tags( $new_instance[$k] );
		}
        return $instance;
    }
    
    function form($instance) {	
        $defaults = array(
			'title' => 'Facebook',
			'url' => 'http://www.facebook.com/platform',
			'width' => '320',
			'height' => '230',
			'colorscheme' => 'light',
			'show_faces' => 'true',
			'stream' => 'false',
			'header' => 'false',
			'border' => 'false'
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
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id('url'); ?>"><?php _e( 'Page URL:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo esc_attr($instance['url']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><?php _e( 'Sizes:', 'espania' ); ?></td>
                        <td class="espania-widget-content">
							<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e( 'Width: ', 'espania' ); ?></label>
                            <input type="text" style="width: 50px;" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo esc_attr($instance['width']); ?>" /> px. &nbsp; &nbsp;
                            <label for="<?php echo $this->get_field_id('height'); ?>"><?php _e( 'Height: ', 'espania' ); ?></label>
							<input type="text" style="width: 50px;" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo esc_attr($instance['height']); ?>" /> px.
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id('colorscheme'); ?>"><?php _e( 'Color Scheme:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content">
                            <select name="<?php echo $this->get_field_name('colorscheme'); ?>" class="widefat" id="<?php echo $this->get_field_id('colorscheme'); ?>">
                                <option value="light" <?php selected('light', $instance['colorscheme']); ?> ><?php _e( 'Light', 'espania' ); ?></option>
                                <option value="dark"  <?php selected('dark', $instance['colorscheme']); ?>><?php _e( 'Dark', 'espania' ); ?></option>
                            </select>                        
                        </td>
                    </tr>

                    <tr>
                        <td class="espania-widget-label"><?php _e( 'Misc Options:', 'espania' ); ?></td>
                        <td class="espania-widget-content">
                            <input type="checkbox" id="<?php echo $this->get_field_id('show_faces'); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>"  <?php checked('true', $instance['show_faces']); ?> value="true" /><label for="<?php echo $this->get_field_id('show_faces'); ?>"> <?php _e('Show Faces', 'espania'); ?></label>
                            <br /><input type="checkbox" id="<?php echo $this->get_field_id('stream'); ?>" name="<?php echo $this->get_field_name('stream'); ?>"  <?php checked('true', $instance['stream']); ?> value="true" /><label for="<?php echo $this->get_field_id('stream'); ?>"> <?php _e('Show Posts', 'espania'); ?></label>
                            <br /><input type="checkbox" id="<?php echo $this->get_field_id('header'); ?>" name="<?php echo $this->get_field_name('header'); ?>"  <?php checked('true', $instance['header']); ?> value="true" /><label for="<?php echo $this->get_field_id('header'); ?>"> <?php _e('Show Header', 'espania'); ?></label>   
							<br /><input type="checkbox" id="<?php echo $this->get_field_id('border'); ?>" name="<?php echo $this->get_field_name('border'); ?>"  <?php checked('true', $instance['border']); ?> value="true" /><label for="<?php echo $this->get_field_id('border'); ?>"> <?php _e('Show Border', 'espania'); ?></label>  
						</td>
                    </tr>  
                </table>
            </div>
            
        <?php 
    }
} 
?>
<?php
add_action('widgets_init', create_function('', 'return register_widget("AddonsEspaniaSocialIconsWidget");'));

class AddonsEspaniaSocialIconsWidget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => __('Display social icons', 'espania' ) );
		$control_ops = array( 'width' => 400 );
        parent::__construct( false, __( '&raquo; [Espania] Social Icons', 'espania' ), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$socials =  array( 'Google+', 'Pinterest', 'LinkedIn', 'Twitter', 'Facebook' );
		$social = array();
		foreach ( $socials as $k ) {
			if ( $instance[$k] == 'true' ) $social[] = $k;
		}

		echo $before_widget;
		echo $before_title;
		echo $title; 
		echo $after_title; 
		
		espania_social_icons( $social );
		
		if ( $instance['description'] ) { ?>
			<div class="clearfix"></div>
			<div style="padding-top:10px;"><?php echo $instance['description']; ?></div>
		<?php
		}
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$params = array( 'title', 'description', 'Google+', 'Pinterest', 'LinkedIn', 'Twitter', 'Facebook' );
		foreach ( $params as $k ) {
			$instance[$k] = strip_tags( $new_instance[$k] );
		}
		return $instance;
	}

	function form( $instance ) {
		global $shortname;
		$defaults = array(
			'title' => __( 'Social Icons', 'espania' ),
			'description' => '',
			'Twitter' => 'true','Facebook' => 'true','LinkedIn' => 'true','Google+' => 'true','Pinterest' => 'true',
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
                    <td class="espania-widget-label"><?php _e( 'Show Options:', 'espania' ); ?></td>
                    <td class="espania-widget-content">
						<?php
                        $empty = true;

                        foreach ( $instance as $k => $value ) {
							if ( get_theme_mod( 'social_' . $k ) ) {
                                $is_checked = checked( 'true', $instance[$k], false );
								echo '<input type="checkbox" id="' . $this->get_field_id( $k ) . '" name="' . $this->get_field_name( $k ) . '"' . $is_checked . ' value="true" /><label for="' . $this->get_field_id( $k ) . '"> ' . __( $k.' Icon', 'espania') . '</label><br />';
                                $empty = false;
                            }
						}

                        if ( $empty ) {
                            echo '<span style="color:red;">' . __( 'Please go to theme settings and specify you social networks profiles', 'espania' ) . '</span>';
                        }

                        ?>
					</td>
                </tr>
					
			</table>
        </div>	
				
		<?php
	}
}
?>
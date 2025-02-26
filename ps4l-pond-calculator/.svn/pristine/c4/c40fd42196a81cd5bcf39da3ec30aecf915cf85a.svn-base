<?php

class Pond_Calculator_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'pond_calculator_widget',
            // Widget name will appear in UI
            __('Pond Calculator', WSGT_TEXTDOMAIN),

            // Widget description
            array( 'description' => __( 'Pond Calculator Widget', WSGT_TEXTDOMAIN ), )
        );
		//add_action('wp_print_scripts', array(&$this, 'load_scripts') );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $w_instance ) {

        $title = apply_filters( 'widget_title', $w_instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        ?><div id='wswp_campaign_monitor'><?php
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];


       
          ?><div id='wswp_cm_main'><?php

          WSGT()->pond_frontend_widget($w_instance);
    
     
		        ?></div><?php
        echo $args['after_widget'];
    }
    // Updating widget replacing old instances with new
 	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance[ 'title' ]  = strip_tags( $new_instance['title'] );
		$instance[ 'color1px' ] = strip_tags( $new_instance['color1px'] );
		$instance[ 'color1' ] = strip_tags( $new_instance['color1'] );
		$instance[ 'color2' ] = strip_tags( $new_instance['color2'] );
		$instance[ 'color2text' ] = strip_tags( $new_instance['color2text'] );
		$instance[ 'colorbutton' ] = strip_tags( $new_instance['colorbutton'] );
		$instance[ 'linktoggle' ] = strip_tags( $new_instance['linktoggle'] );

		return $instance;
	}

    // Widget Backend
    public function form( $instance ) {
	
$instance = wp_parse_args(
			$instance,
			array(
				'title' => _x( '', 'widget title', 'pond-calculator' ),
				'color1px' => '',
				'color1' => '',
				'color2' => '',
				'color2text' => '',
				'colorbutton' => '',
				'linktoggle' => '',
			)
		);
		$title = esc_attr( $instance['title'] );
		$color1px = esc_attr( $instance[ 'color1px' ] );
		$color1 = esc_attr( $instance[ 'color1' ] );
		$color2 = esc_attr( $instance[ 'color2' ] );
		$color2text = esc_attr( $instance[ 'color2text' ] );
		$colorbutton = esc_attr( $instance[ 'colorbutton' ] );
		$linktoggle = esc_attr( $instance[ 'linktoggle' ] );
		$hidelink = "checked";
		$showlink = "unchecked";
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'color1' ); ?>"><?php _e( 'Form Border(Size in px):' ); ?></label><br>
					<input type="number" name="<?php echo $this->get_field_name( 'color1px' ); ?>" class="color1px" id="<?php echo $this->get_field_id( 'color1px' ); ?>" value="<?php echo $color1px; ?>" data-default-color="1" />
			<input type="text" name="<?php echo $this->get_field_name( 'color1' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'color1' ); ?>" value="<?php echo $color1; ?>" data-default-color="#fff" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'color2' ); ?>"><?php _e( 'Header background color:' ); ?></label><br>
			<input type="text" name="<?php echo $this->get_field_name( 'color2' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'color2' ); ?>" value="<?php echo $color2; ?>" data-default-color="#f00" />
			
		</p>
		<p>			
			<label for="<?php echo $this->get_field_id( 'color2text' ); ?>"><?php _e( 'Header text color:' ); ?></label><br>
			<input type="text" name="<?php echo $this->get_field_name( 'color2text' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'color2text' ); ?>" value="<?php echo $color2text; ?>" data-default-color="#f00" />
		</p>
		<p>			
			<label for="<?php echo $this->get_field_id( 'colorbutton' ); ?>"><?php _e( 'Button background color:' ); ?></label><br>
			<input type="text" name="<?php echo $this->get_field_name( 'colorbutton' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'colorbutton' ); ?>" value="<?php echo $colorbutton; ?>" data-default-color="#f00" />
		</p>
		<p>			
			<label for="<?php echo $this->get_field_id( 'linktoggle' ); ?>"><?php _e( ' Pond Supplies 4 Less link show/hide: ' ); ?></label><br>
			<?php if($linktoggle=="none") {
			$hidelink = "checked";
			
			}
			if($linktoggle=="block") {
			$showlink = "checked";
			
			}
			?>
			
			<label for="<?php echo $this->get_field_id( 'linktoggle' ); ?>"><?php _e( 'Hide:' ); ?></label>
			<input type="radio" name="<?php echo $this->get_field_name( 'linktoggle' ); ?>" <?php echo $hidelink; ?> class="color-pickera <?php echo $linktoggle; ?>" id="<?php echo $this->get_field_id( 'linktoggle' ); ?>" value="none" data-default-color="#f00" />
			
			<label for="<?php echo $this->get_field_id( 'linktoggle' ); ?>"><?php _e( 'Show:' ); ?></label>
			<input type="radio" name="<?php echo $this->get_field_name( 'linktoggle' ); ?>" <?php echo $showlink; ?> class="color-pickera <?php echo $linktoggle; ?>" id="<?php echo $this->get_field_id( 'linktoggle' ); ?>" value="block" data-default-color="#f00" />
		</p>
		
		
		
		<p> Widget shortcode (For custom colors, Always use updated shortcode after SAVE widget):</p>
			<p class="shortcss" style="background: #ccc none repeat scroll 0 0;padding: 5px;">	
		[pondcalculator color1px="<?php echo $color1px; ?>" color1="<?php echo $color1; ?>" color2="<?php echo $color2; ?>" color2text="<?php echo $color2text; ?>" colorbutton="<?php echo $colorbutton; ?>" linktoggle="<?php echo $linktoggle; ?>"] </p>
    
        <?php
    }
}

<?php 

class suevafree_cta_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::__construct( "suevafree_cta_widget", "SuevaFree Call To Action", array("description" => "SuevaFree Call To Action"));
	
	}
	
	public function form( $instance ) {

		$defaults = array( 
			'layout' => 'layout-1',
			'title' => 'Create your awesome website.',
            'title_size' => '50px',
			'cta' => 'Button',
			'cta_url' => '#',
			'cta_content' => 'Sueva, easy to use and configurate, simply the theme you&lsquo;ve been waiting.',
			'cta_size' => '16px',
			'cta_button_size' => '14px',
            'background_image' => '',
            'background_color' => '#e96656',
            'color' => '#ffffff',
            'button_color' => '#db5a4a',
            'button_hover_color' => '#bf3928',
        );
		
		$layouts = array(
		
			"layout-1" => esc_html__( "Title at the left, button at the right, content below the title and button.", "suevafree-essential-kit"),
			"layout-2" => esc_html__( "Title above the button and content.", "suevafree-essential-kit"),
		
		);
		
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
        
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php esc_html_e( "Choose a layout:", "suevafree-essential-kit"); ?></label>
            
            <select class="widefat" name="<?php echo $this->get_field_name( 'layout' ); ?>" id="<?php echo $this->get_field_id( 'layout' ); ?>">
				<?php
                	
					foreach ($layouts as $layout => $desc) {
                    
					    if ($layout == $instance['layout'] ) { 
					
							echo "<option value='".$layout."' selected='selected' >".$desc."</option>"; 
					
						} else { 
					
							echo "<option value='".$layout."'>".$desc."</option>"; 
					
						};
                    
					}
					
                ?>
            </select>

		</p>
        
		<p>
        
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( "Title:", "suevafree-essential-kit"); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			
		</p>

		<p>
			
            <label for="<?php echo $this->get_field_id( 'title_size' ); ?>"><?php esc_html_e( "Title size: (Default value : 50px)","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title_size' ); ?>" name="<?php echo $this->get_field_name( 'title_size' ); ?>" value="<?php echo esc_attr($instance['title_size']); ?>" />
			
		</p>  

		<p>
        
			<label for="<?php echo $this->get_field_id( 'cta' ); ?>"><?php esc_html_e( "Call to action:", "suevafree-essential-kit"); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'cta' ); ?>" name="<?php echo $this->get_field_name( 'cta' ); ?>" value="<?php echo $instance['cta']; ?>" />
			
		</p>

		<p>
        
			<label for="<?php echo $this->get_field_id( 'cta_url' ); ?>"><?php esc_html_e( "Call to action url:", "suevafree-essential-kit"); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'cta_url' ); ?>" name="<?php echo $this->get_field_name( 'cta_url' ); ?>" value="<?php echo $instance['cta_url']; ?>" />
			
		</p>
        
		<p>
        
			<label for="<?php echo $this->get_field_id( 'cta_content' ); ?>"><?php esc_html_e( "Content:", "suevafree-essential-kit"); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'cta_content' ); ?>" name="<?php echo $this->get_field_name( 'cta_content' ); ?>"><?php echo $instance['cta_content']; ?></textarea>

		</p>
         
		<p>
			
            <label for="<?php echo $this->get_field_id( 'cta_size' ); ?>"><?php esc_html_e( "Content size: (Default value : 16px)","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'cta_size' ); ?>" name="<?php echo $this->get_field_name( 'cta_size' ); ?>" value="<?php echo esc_attr($instance['cta_size']); ?>" />
			
		</p>  

		<p>
			
            <label for="<?php echo $this->get_field_id( 'cta_button_size' ); ?>"><?php esc_html_e( "Button size: (Default value : 14px)","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'cta_button_size' ); ?>" name="<?php echo $this->get_field_name( 'cta_button_size' ); ?>" value="<?php echo esc_attr($instance['cta_button_size']); ?>" />
			
		</p>  

		<p class="sueva_widget_upload">
			
            <label for="<?php echo $this->get_field_id( 'background_image' ); ?>"><?php esc_html_e( "Background image","suevafree-essential-kit"); ?></label>
			
            <input class="widefat upload_attachment" type="text" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo $instance['background_image']; ?>" />
            
			<input type="button" name="upload_button" class="button upload_button" value="<?php esc_attr_e('Upload', 'suevafree-essential-kit'); ?>" />
			
		</p>  

		<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( "Background color:",'suevafree-essential-kit'); ?></label></p>
        <p><input type="text" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo $instance['background_color']; ?>" data-default-color="<?php echo $instance['background_color']; ?>" class="widefat sueva_color_picker"  /></p>  

		<p><label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php esc_html_e( "Title color:","suevafree-essential-kit"); ?></label></p>
        <p><input type="text" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" value="<?php echo $instance['color']; ?>" data-default-color="<?php echo $instance['color']; ?>" class="widefat sueva_color_picker"  /></p>  

		<p><label for="<?php echo $this->get_field_id( 'button_color' ); ?>"><?php esc_html_e( "Button color:","suevafree-essential-kit"); ?></label></p>
        <p><input type="text" id="<?php echo $this->get_field_id( 'button_color' ); ?>" name="<?php echo $this->get_field_name( 'button_color' ); ?>" value="<?php echo $instance['button_color']; ?>" data-default-color="<?php echo $instance['button_color']; ?>" class="widefat sueva_color_picker"  /></p>  

		<p><label for="<?php echo $this->get_field_id( 'button_hover_color' ); ?>"><?php esc_html_e( "Button color at hover:","suevafree-essential-kit"); ?></label></p>
        <p><input type="text" id="<?php echo $this->get_field_id( 'button_hover_color' ); ?>" name="<?php echo $this->get_field_name( 'button_hover_color' ); ?>" value="<?php echo $instance['button_hover_color']; ?>" data-default-color="<?php echo $instance['button_hover_color']; ?>" class="widefat sueva_color_picker"  /></p>  

		<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['title_size'] = strip_tags( $new_instance['title_size'] );
		$instance['layout'] = strip_tags( $new_instance['layout'] );
		$instance['cta'] = strip_tags( $new_instance['cta'] );
		$instance['cta_url'] = strip_tags( $new_instance['cta_url'] );
		$instance['cta_content'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['cta_content']) ) );
		$instance['cta_size'] = strip_tags( $new_instance['cta_size'] );
		$instance['cta_button_size'] = strip_tags( $new_instance['cta_button_size'] );
		$instance['background_image'] = strip_tags( $new_instance['background_image'] );
		$instance['background_color'] = strip_tags( $new_instance['background_color'] );
		$instance['color'] = strip_tags( $new_instance['color'] );
		$instance['button_color'] = strip_tags( $new_instance['button_color'] );
		$instance['button_hover_color'] = strip_tags( $new_instance['button_hover_color'] );

		return $instance;
	}                     
	
	public function widget( $args, $instance ) {
		
		extract( $args );

		echo $before_widget;

		$title = apply_filters( 'widget_title', $instance['title'] );
			
		?>

		<style scoped>
		
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-cta-widget {
				background-color: <?php echo esc_attr($instance['background_color']); ?>;
				<?php if ( $instance['background_image']) : ?>
					background-image:url(<?php echo esc_attr($instance['background_image']); ?>);
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
					background-attachment: fixed;
				<?php endif; ?>
			}

			<?php if ( $instance['title_size']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-cta-widget h2 {
					font-size:<?php echo esc_attr($instance['title_size']); ?>;
				}
				
			<?php endif; ?>

			<?php if ( $instance['cta_size']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-cta-widget p.cta-content {
					font-size:<?php echo esc_attr($instance['cta_size']); ?>;
				}
				
			<?php endif; ?>

			<?php if ( $instance['cta_button_size']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-cta-widget p.cta-button a {
					font-size:<?php echo esc_attr($instance['cta_button_size']); ?>;
				}
				
			<?php endif; ?>

			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-cta-widget h2, 
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-cta-widget p.cta-content {
				color: <?php echo $instance['color']; ?>;
			}
			
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-cta-widget p.cta-button a {
				background-color: <?php echo $instance['button_color']; ?>;
			}
			
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-cta-widget p.cta-button a:hover {
				background-color: <?php echo esc_attr($instance['button_hover_color']); ?>;
			}

        </style>

        <section class="suevafree-cta-widget <?php echo esc_attr($instance['layout']); ?> ">
        
        	<div class="container">
            
            	<div class="row">
                
                	<div class="col-md-12">
        	
						<?php 
                            
                            if ( $title ) 
                                echo '<h2 data-scroll-reveal="enter top move 50px, after 0.9s">' . esc_attr($title) . '</h2>';
                            
							if ( $instance['layout'] == 'layout-1') {

								if ( $instance['cta_url'] ) :
									echo '<p class="cta-button" data-scroll-reveal="enter bottom move 50px, after 0.9s">';
									echo '<a href="' . esc_url($instance['cta_url']) . '" title="' . esc_attr($instance['cta']) . '">' . esc_attr($instance['cta']) . '</a></p>';
								endif;
								
								if ( $instance['cta_content'] ) : 
									echo '<p class="cta-content" data-scroll-reveal="enter left move 50px, after 0.9s">' . $instance['cta_content'] . '</p>';
								endif;
							
							} else {
							
								if ( $instance['cta_content'] ) : 
									echo '<p class="cta-content" data-scroll-reveal="enter left move 50px, after 0.9s">' . $instance['cta_content'] . '</p>';
								endif;
								
								if ( $instance['cta_url'] ) :
									echo '<p class="cta-button" data-scroll-reveal="enter bottom move 50px, after 0.9s">';
									echo '<a href="' . esc_url($instance['cta_url']) . '" title="' . esc_attr($instance['cta']) . '">' . esc_attr($instance['cta']) . '</a></p>';
								endif;

							}
                         
						 ?>

        			</div>
				
                </div>
                
			</div>
                    
        </section>   
            
		<?php

		echo $after_widget;
		
	}
	
}

?>
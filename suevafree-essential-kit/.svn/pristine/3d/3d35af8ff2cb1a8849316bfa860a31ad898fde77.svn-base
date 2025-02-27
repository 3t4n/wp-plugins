<?php 

class suevafree_contactform_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::__construct( "suevafree_contactform_widget", "SuevaFree Contact Form Widget", array("description" => "SuevaFree Contact Form Widget"));
	}
	
	public function form( $instance ) {

		$defaults = array( 
			'title' => 'Get in touch',
            'title_size' => '50px',
            'title_color' => '#ffffff',
			'description' => 'Let us know what you are thinking.',
            'description_size' => '20px',
			'contact_form' => '',
            'background_image' => '',
            'background_color' => '#2d3032',
        );
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
	?>
        
		<p>
			
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( "Title","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
			
		</p>  

		<p>
			
            <label for="<?php echo $this->get_field_id( 'title_size' ); ?>"><?php esc_html_e( "Title size: (Default value : 50px)","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title_size' ); ?>" name="<?php echo $this->get_field_name( 'title_size' ); ?>" value="<?php echo esc_attr($instance['title_size']); ?>" />
			
		</p>  

		<p><label for="<?php echo $this->get_field_id( 'title_color' ); ?>"><?php esc_html_e( "Title color:","suevafree-essential-kit"); ?></label></p>
		<p><input type="text" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" data-default-color="<?php echo $instance['title_color']; ?>" class="widefat sueva_color_picker"  /></p>  

		<p>
			
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( "Description","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" value="<?php echo esc_attr($instance['description']); ?>" />
			
		</p>  
         
		<p>
			
            <label for="<?php echo $this->get_field_id( 'description_size' ); ?>"><?php esc_html_e( "Description size: (Default value : 20px)","suevafree-essential-kit"); ?>:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'description_size' ); ?>" name="<?php echo $this->get_field_name( 'description_size' ); ?>" value="<?php echo esc_attr($instance['description_size']); ?>" />
			
		</p>  

		<p>
        
			<label for="<?php echo $this->get_field_id( 'contact_form' ); ?>"><?php esc_html_e( "Choose a contact form:", "suevafree-essential-kit"); ?></label>
            
            <select class="widefat" name="<?php echo $this->get_field_name( 'contact_form' ); ?>" id="<?php echo $this->get_field_id( 'contact_form' ); ?>">
				
				<?php
                	
					foreach ( suevafree_ek_wpcf7_forms() as $option => $value) {
                    
					    if ( $option == $instance['contact_form'] ) { 
					
							echo "<option value='".$option."' selected='selected' >".$value."</option>"; 
					
						} else { 
					
							echo "<option value='".$option."'>".$value."</option>"; 
					
						};
                    
					}
					
                ?>
                
            </select>

		</p>
		
		<p class="sueva_widget_upload">
			
            <label for="<?php echo $this->get_field_id( 'background_image' ); ?>"><?php esc_html_e( "Background image","suevafree-essential-kit"); ?></label>
			
            <input class="widefat upload_attachment" type="text" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo $instance['background_image']; ?>" />
            
			<input type="button" name="upload_button" class="button upload_button" value="<?php esc_attr_e('Upload','suevafree-essential-kit'); ?>" />
			
		</p>  

		<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( "Background color:","suevafree-essential-kit"); ?></label></p>
		<p><input type="text" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo $instance['background_color']; ?>" data-default-color="<?php echo $instance['background_color']; ?>" class="widefat sueva_color_picker"  /></p>  

		<?php
		
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['title_size'] = strip_tags( $new_instance['title_size'] );
		$instance['title_color'] = strip_tags( $new_instance['title_color'] );
		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['description_size'] = strip_tags( $new_instance['description_size'] );
		$instance['contact_form'] = strip_tags( $new_instance['contact_form'] );
		$instance['background_image'] = strip_tags( $new_instance['background_image'] );
		$instance['background_color'] = strip_tags( $new_instance['background_color'] );

		return $instance;
		
	}                     
	
	public function widget( $args, $instance ) {
		
		extract( $args );
		
		$allowed = array(
		
			'div' => array(
				'id' => array(),
				'class' => array(),
			),
			'article' => array(
				'id' => array(),
				'class' => array(),
			),
			'h4' => array(
				'class' => array(),
			)
	
		);

		echo wp_kses($before_widget, $allowed);

		$title = apply_filters( 'widget_title', $instance['title'] );

	?>

		<style scoped>
		
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget {
				background-color: <?php echo $instance['background_color']; ?>;
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
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget h4 {
					font-size:<?php echo esc_attr($instance['title_size']); ?>;
				}
				
			<?php endif; ?>

			<?php if ( $instance['description_size']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget .subtitle {
					font-size:<?php echo esc_attr($instance['description_size']); ?>;
				}
				
			<?php endif; ?>

			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget h4 ,
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget .wpcf7-form label ,
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget .subtitle {
				color: <?php echo esc_attr($instance['title_color']); ?>;
			}
			
			<?php if ( $title ) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget h4 {
					margin-bottom:50px;
				}
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget .subtitle {
					margin-top:-45px;
				}
				
			<?php endif; ?>

			<?php if ( $instance['description']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-contactform-widget .subtitle {
					margin-bottom:50px;
				}
				
			<?php endif; ?>

        </style>

        <section class="suevafree-contactform-widget">
        
        	<div data-scroll-reveal="enter top move 50px, after 0.9s">
            
                <div class="container">
                
                    <div class="row">
                    
                        <div class="col-md-12">

							<?php
                                        
                                if ( $title )
                                    echo '<h4>' . esc_attr($title) . '</h4>' ;
                                            
                                if ( $instance['description'] )
                                    echo '<div class="subtitle">' . esc_attr($instance['description']) . '</div>' ;
                                    
                                if ( $instance['contact_form'] )
                                    echo do_shortcode('[contact-form-7 id="' . $instance['contact_form'] . '"]');
                
                            ?>
                
                		</div>
                        
                	</div>
                    
                </div>
                
            </div>
                    
        </section>   
        
        <?php

		echo wp_kses($after_widget, $allowed);
		
	}
	
}

?>
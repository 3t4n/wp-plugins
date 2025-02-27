<?php 

class suevafree_services_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::__construct( "suevafree_services_widget", "SuevaFree Services Widget", array("description" => "SuevaFree Services Widget"));
	}
	
	public function form( $instance ) {

		$defaults = array( 
			'title' => 'Features',
            'title_size' => '50px',
            'title_color' => '#ffffff',
			'description' => 'The Reasons You’ll Love Sueva',
            'description_size' => '20px',
            'items' => "-1",
			'columns' => 'col-md-4',
            'background_image' => '',
            'background_color' => '#2d3032',
        );

		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$columns = array(
		
			"col-md-1"  => esc_html__( "12", "suevafree-essential-kit"),
			"col-md-2"  => esc_html__( "6", "suevafree-essential-kit"),
			"col-md-3"  => esc_html__( "4", "suevafree-essential-kit"),
			"col-md-4"  => esc_html__( "3", "suevafree-essential-kit"),
			"col-md-6"  => esc_html__( "2", "suevafree-essential-kit"),
			"col-md-12" => esc_html__( "1", "suevafree-essential-kit"),
		
		);

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
			
            <label for="<?php echo $this->get_field_id( 'items' ); ?>"> <?php esc_html_e( "Numbers of items ( Add -1 to display all items. )","suevafree-essential-kit"); ?>: </label>
            <input class="widefat" type="number" id="<?php echo $this->get_field_id( 'items' ); ?>" name="<?php echo $this->get_field_name( 'items' ); ?>" value="<?php echo esc_attr($instance['items']); ?>" />
            
		</p> 
        
		<p>
        
			<label for="<?php echo $this->get_field_id( 'columns' ); ?>"><?php esc_html_e( "Columns:", "suevafree-essential-kit"); ?></label>
            
            <select class="widefat" name="<?php echo $this->get_field_name( 'columns' ); ?>" id="<?php echo $this->get_field_id( 'columns' ); ?>">
				
				<?php
                	
					foreach ($columns as $option => $value) {
                    
					    if ($option == $instance['columns'] ) { 
					
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
		$instance['items'] = strip_tags( $new_instance['items'] );
		$instance['columns'] = strip_tags( $new_instance['columns'] );
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
		
        $query_args = array(
            'post_type' => 'service',
            'posts_per_page' => $instance['items'],
        );
        
        $query = new WP_Query( $query_args );
		
		?>

		<style scoped>
		
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-services-widget {
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
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-services-widget h4 {
					font-size:<?php echo esc_attr($instance['title_size']); ?>;
				}
				
			<?php endif; ?>

			<?php if ( $instance['description_size']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-services-widget .subtitle {
					font-size:<?php echo esc_attr($instance['description_size']); ?>;
				}
				
			<?php endif; ?>

			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-services-widget h4 ,
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-services-widget .subtitle {
				color: <?php echo esc_attr($instance['title_color']); ?>;
			}

			<?php if ( $title ) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-services-widget h4 {
					margin-bottom:100px;
				}
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-services-widget .subtitle {
					margin-top:-95px;
				}
				
			<?php endif; ?>

			<?php if ( $instance['description']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-services-widget .subtitle {
					margin-bottom:100px;
				}
				
			<?php endif; ?>

        </style>

        <section class="suevafree-services-widget">
        
        	<div class="container">
            
            	<div class="row">
                
                	<div class="col-md-12">

						<?php
                            
                            if ( $title )
                                echo '<h4>' . esc_attr($title) . '</h4>' ;
                                
                            if ( $instance['description'] )
                                echo '<div class="subtitle">' . esc_attr($instance['description']) . '</div>' ;
                        
                        ?>
                        
        			</div>

					<?php

						while ( $query->have_posts() ) : $query->the_post(); 
                
					?>
                        

        				<div class="flip-box-item <?php echo suevafree_ek_widget_setting($instance['columns'], 'col-md-4');?>" data-scroll-reveal="enter top move 50px">
							
        					<div class="flip-box-container">
        
        						<div class="flip-box-front" style="background-color:<?php echo esc_attr(suevafree_ek_postmeta('wip_service_background','#c44141' ));?>">
        
        							<div class="flip-box-icon"><i class="fa <?php echo esc_attr(suevafree_ek_postmeta('wip_service_icon','fa-heart-o' ));?>"></i></div>
        							<h5><?php echo esc_attr(get_the_title()); ?></h5>
                                                
        						</div>
                                      
        						<div class="flip-box-back" style="background-color:<?php echo esc_attr(suevafree_ek_postmeta('wip_service_background_hover','#993232' ));?>">

        							<div class="flip-box-details">
											
											<?php 
											
												if ( suevafree_ek_postmeta('wip_service_link' ) == 'on' ) :
												
													echo '<a href="' . esc_url(get_permalink($post->ID)) . '"><h5>' . esc_attr(get_the_title()) . '</h5></a>';
												
												else :

													echo '<h5>' . esc_attr(get_the_title()) . '</h5>';

												endif;
												
												echo wp_trim_words( get_the_excerpt(), $num_words = 25, $more = null );
												
											?>
                                            
        							</div>
                                            
        						</div>
                                        
        					</div>
                                
        				</div>
                            
						<?php
                
                            endwhile; 
                            wp_reset_query();
                            wp_reset_postdata();
                
						?>
                		
                        
                </div>
                
			</div>
                    
        </section>   
        
        <?php

		echo wp_kses($after_widget, $allowed);
		
	}
	
}

?>
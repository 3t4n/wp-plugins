<?php 

class suevafree_team_widget extends WP_Widget {
	
	public function __construct() {
		
		parent::__construct( "suevafree_team_widget", "SuevaFree Team Slideshow", array("description" => "SuevaFree Team Slideshow"));
	}
	
	public function form( $instance ) {

		$defaults = array( 
			'title' => 'Our team',
            'title_size' => '50px',
			'description' => 'Meet our creative team.',
            'description_size' => '20px',
            'items' => "-1",
			'columns' => '3',
            'background_image' => '',
            'background_color' => '#2d3032',
            'title_color' => '#ffffff',
        );

		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$columns = array(
		
			"1"  => esc_html__( "1 Column", "suevafree-essential-kit"),
			"2"  => esc_html__( "2 Columns", "suevafree-essential-kit"),
			"3"  => esc_html__( "3 Columns", "suevafree-essential-kit"),
			"4"  => esc_html__( "4 Columns", "suevafree-essential-kit"),
			"5"  => esc_html__( "5 Columns", "suevafree-essential-kit"),
			"6"  => esc_html__( "6 Columns", "suevafree-essential-kit"),
		
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
            
			<input type="button" name="upload_button" class="button upload_button" value="<?php esc_attr_e("Upload","suevafree-essential-kit"); ?>" />
			
		</p>  

		<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( "Background color:","suevafree-essential-kit"); ?></label></p>
        <p><input type="text" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo $instance['background_color']; ?>" data-default-color="<?php echo $instance['background_color']; ?>" class="widefat sueva_color_picker"  /></p>  
        
		<p><label for="<?php echo $this->get_field_id( 'title_color' ); ?>"><?php esc_html_e( "Title color:",'suevafree-essential-kit'); ?></label></p>
        <p><input type="text" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" data-default-color="<?php echo $instance['title_color']; ?>" class="widefat sueva_color_picker"  /></p>  
        
		<?php
		
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['title_size'] = strip_tags( $new_instance['title_size'] );
		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['description_size'] = strip_tags( $new_instance['description_size'] );
		$instance['items'] = strip_tags( $new_instance['items'] );
		$instance['columns'] = strip_tags( $new_instance['columns'] );
		$instance['background_image'] = strip_tags( $new_instance['background_image'] );
		$instance['background_color'] = strip_tags( $new_instance['background_color'] );
		$instance['title_color'] = strip_tags( $new_instance['title_color'] );

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
            'post_type' => 'team',
            'posts_per_page' => $instance['items'],
			'meta_key' => '_thumbnail_id'
        );
        
        $query = new WP_Query( $query_args );
		
	?>

		<style scoped>
		
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-team-widget {
				background-color: <?php echo esc_attr($instance['background_color']); ?>;
				<?php if ( $instance['background_image']) : ?>
					background-image:url(<?php echo $instance['background_image']; ?>);
					-webkit-background-size: cover;
					-moz-background-size: cover;
					-o-background-size: cover;
					background-size: cover;
					background-attachment: fixed;
				<?php endif; ?>
			}
			
			<?php if ( $instance['title_size']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-team-widget h4 {
					font-size:<?php echo esc_attr($instance['title_size']); ?>;
				}
				
			<?php endif; ?>

			<?php if ( $instance['description_size']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-team-widget .subtitle {
					font-size:<?php echo esc_attr($instance['description_size']); ?>;
				}
				
			<?php endif; ?>

			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-team-widget h4 ,
			#<?php echo esc_attr($args['widget_id']); ?> .suevafree-team-widget .subtitle {
				color: <?php echo esc_attr($instance['title_color']); ?>;
			}

			<?php if ( $title ) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-team-widget h4 {
					margin-bottom:100px;
				}
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-team-widget .subtitle {
					margin-top:-95px;
				}
				
			<?php endif; ?>

			<?php if ( $instance['description']) : ?>
				
				#<?php echo esc_attr($args['widget_id']); ?> .suevafree-team-widget .subtitle {
					margin-bottom:100px;
				}
				
			<?php endif; ?>

        </style>

        <section class="suevafree-team-widget">
        
        	<div class="container">
            
            	<div class="row">
                
                	<div class="col-md-12">

						<?php

                            if ( $title )
                                echo '<h4>' . esc_attr($title) . '</h4>' ;
                            
                            if ( $instance['description'] )
                                echo '<div class="subtitle">' . esc_attr($instance['description']) . '</div>' ;
            
                        ?>

                        <div id="<?php echo esc_attr($args['widget_id']); ?>-carousel" class="slick-suevafree-slideshow" data-center="false" data-columns="<?php echo $instance['columns'];?>"  >
                
                            <div class="slider suevafree-slick-wrapper slick-slides" data-scroll-reveal="enter top move 50px">
                
                            <?php
                        
                                while ( $query->have_posts() ) : $query->the_post(); 
                        
                                    global $post;
                        
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sueva_team');
                                 	                   
									if (!empty($thumb)) : 
													
										$thumbnail = $thumb[0];
													
									else:
													
										$thumbnail = plugins_url( '../assets/images/no-image.jpg', dirname(__FILE__)) ; 
													
									endif;
                
                            ?>
                            
                                    <div>
                                   
                                        <div class="team-item" >
                                        
                                            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo get_the_title(); ?>">
                                        	
                                            <div class="team-details" >
                                                
                                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><h5><?php echo esc_attr(get_the_title()); ?></h5></a>
                                                <?php echo get_the_excerpt(); ?>
                                                
                                                <div class="social-buttons">

													<?php do_action('suevafree_ek_socials');?>
                                                    
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
                        
        			</div>
				
                </div>
                
			</div>
                    
        </section>   
        
        <?php

		echo wp_kses($after_widget, $allowed);
		
	}
	
}

?>
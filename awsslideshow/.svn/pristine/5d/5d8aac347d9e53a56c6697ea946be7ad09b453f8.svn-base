<?php


class AWS_Widget_Slideshow extends WP_Widget {
	
	function __construct(){
		
		parent::__construct(
			'aws_widget_slideshow',
			__('AWS Slideshow', 'awsslideshow'),
			array('description' => __('Description of AWS Slideshow', 'awsslideshow'))
		);
		
		add_action( 'wp_enqueue_scripts', array($this, 'awsslideshow_scripts') );
	}
	
	function awsslideshow_scripts(){
		
		wp_enqueue_style( 'awsslideshow-style', plugins_url('awsslideshow/css/awsslideshow.css') );
		wp_enqueue_script( 'modernizr-script', plugins_url('awsslideshow/js/modernizr.js') );
		wp_enqueue_script( 'videojs-script', plugins_url('awsslideshow/js/videojs/video.js'), array( 'jquery', 'modernizr-script' ) );
		wp_enqueue_script( 'awsslideshow-script', plugins_url('awsslideshow/js/jquery.awslideshow.js'), array( 'videojs-script' ) );
	}
	
	public function widget( $args, $instance ){
		echo $args['before_widget'];
		
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
	
		$data	=	get_post_meta($instance['slideshow_post'], 'awsslideshow_meta_slide', true);
		?>
		
		<?php if(isset($data)): $data	=	json_decode($data); //echo '<pre/>'; var_dump($data); ?>
			<div class="aws_slideshow_wrap" id="<?php echo $this->id; ?>" data-width="<?php echo $data->settings->width; ?>" data-height="<?php echo $data->settings->height; ?>">
				<div class="box_inner">
					
					<?php foreach($data->slides as $key => $slide): ?>
			
					<div class="box_items" data-duration="<?php echo $slide->duration; ?>">
						<?php if($slide->styles->from == 'image'): ?>
						<div class="box_item_bg box_item_bg_image" 
						data-effectin="<?php echo $slide->effectIn->name; ?>" 
						data-effectout="<?php echo $slide->effectOut->name; ?>" 
						data-from="image" 
						data-src="<?php echo $slide->styles->bgSrc; ?>"></div>
						<?php endif; ?>
						
						<?php if($slide->styles->from == 'color'): ?>
						<div class="box_item_bg box_item_bg_color" 
						data-effectin="<?php echo $slide->effectIn->name; ?>" 
						data-effectout="<?php echo $slide->effectOut->name; ?>" 
						data-from="color" 
						data-color="<?php echo $slide->styles->bgColor; ?>"></div>
						<?php endif; ?>
						
						<div class="box_container">
							<?php foreach($slide->items as $key => $item): 
								
								$effectIn	=	$item->effectIn->name;
								$effectOut	=	$item->effectOut->name;
								$top		=	$item->top;
								$left		=	$item->left;
								$width		=	$item->width;
								$height		=	$item->height;
								$speed		=	$item->speed;
								$delay		=	$item->delay;
								$zindex		=	$item->zindex;
								
								$easing		=	($item->timing->name != 'custom')?$item->timing->name:'';
								
								?>
							
							<?php if($item->kind == 'image'): ?>
								<div class="box_item box_item_image" 
									data-effect="<?php echo $effectIn; ?>" 
									data-effectout="<?php echo $effectOut; ?>" 
									data-top="<?php echo $top; ?>" data-left="<?php echo $left; ?>" data-width="<?php echo $item->width; ?>" data-height="<?php echo $item->height; ?>" 
									data-duration="<?php echo $item->speed; ?>" data-delay="<?php echo $item->delay; ?>" 
									data-easing="<?php echo $item->easing; ?>" data-zindex="<?php echo $item->zindex; ?>" 
									data-kind="image" 
									data-src="<?php echo $item->src_img; ?>">
								</div>
							<?php endif; ?>
							
							<?php if($item->kind == 'text'): ?>
								<div class="box_item" data-effect="<?php echo $effectIn; ?>" data-effectout="<?php echo $effectOut; ?>" data-top="<?php echo $top; ?>" data-left="<?php echo $left; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-duration="<?php echo $speed; ?>" data-delay="<?php echo $delay; ?>" data-easing="<?php echo $easing; ?>" data-zindex="<?php echo $zindex; ?>" data-kind="text" data-fontfamily="<?php echo $item->fontName; ?>" data-fontsize="<?php echo $item->fontSize; ?>" data-fontweight="<?php echo $item->fontWeight; ?>" data-color="<?php echo $item->color; ?>">
									<?php echo $item->content; ?>
								</div>
							<?php endif; ?>
							
							<?php endforeach; ?>
						</div>
						
					</div>
					
					<?php endforeach; ?>
				</div>
				<div class="direction style-1">
					<a href="#" class="nextSlide icon ion-ios-arrow-right"><span>Next Slide</span></a>
					<a href="#" class="prevSlide icon ion-ios-arrow-left"><span>Prev Slide</span></a>
				</div>
			</div>
		<?php endif; ?>	
		
<?php		
		
		echo $args['after_widget'];
	}
	

	public function form( $instance ) {
		$title 			= ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'awsslideshow' );
		$slideshow_post	= ! empty( $instance['slideshow_post'] ) ? $instance['slideshow_post'] : 0;
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
			<div class="widefat">
			<?php wp_dropdown_pages(
				array(
					'id' 		=>	$this->get_field_id('slideshow_post'),
					'name' 		=>	$this->get_field_name('slideshow_post'),
					'post_type' =>	'slideshow',
					'show_option_none' => 'Select Slideshow',
					'selected'	=>	$slideshow_post
				)); 
			?>
			</div>
		</p>
		
		<?php 
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] 			= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['slideshow_post']	= ( is_numeric( $new_instance['slideshow_post'] ) ) ? $new_instance['slideshow_post'] : 0;

		return $instance;
	}
}
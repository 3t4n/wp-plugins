<?php

/**
 * Adds Pbp_Progress_Bar_Widget widget.
 */
class Pbp_Progress_Bar_Widget extends WP_Widget { 
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Pbp_Progress_Bar_Widget', // Base ID
			__( 'Progress Bar Setup', 'text_domain' ), // Name
			array( 'description' => __( 'Progress Bar', 'text_domain' ), ) // Args
		);
		
        add_action('admin_enqueue_scripts', array($this, 'pbp_add_media_upload_scripts'));
		
	}
	
	/**
     * Upload the Javascripts for the media uploader
     */
    public function pbp_add_media_upload_scripts() {
		wp_enqueue_media();
    }
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		
		echo $args['before_widget'];
		
		$heading = ! empty( $instance['heading'] ) ? $instance['heading'] : '';
		$wip_title = ! empty( $instance['wip_title'] ) ? $instance['wip_title'] : '';
		$unit_of_measure = ! empty( $instance['unit_of_measure'] ) ? $instance['unit_of_measure'] : '';
		$your_goal = ! empty( $instance['your_goal'] ) ? intval( $instance['your_goal'] ) : '';
		$current_score = ! empty( $instance['current_score'] ) ? intval( $instance['current_score'] ) : '';
		$progress_bar_color = ! empty( $instance['progress_bar_color'] ) ? $instance['progress_bar_color'] : '';
		$progress_bar_border = ! empty( $instance['progress_bar_border'] ) ? $instance['progress_bar_border'] : 'red';
		$candy_stripe_options = ! empty( $instance['candy_stripe_options'] ) ? $instance['candy_stripe_options'] : 'none';
		$progress_bar_height = ! empty( $instance['progress_bar_height'] ) ? intval( $instance['progress_bar_height'] ) : '20';
		$progress_bar_media = ! empty( $instance['progress_bar_media'] ) ? $instance['progress_bar_media'] : '';
		$font_color = ! empty( $instance['font_color'] ) ? $instance['font_color'] : 'inherit';
		$more_information = ! empty( $instance['more_information'] ) ? $instance['more_information'] : '';
		$include_hyperlink = ! empty( $instance['include_hyperlink'] ) ? $instance['include_hyperlink'] : '';
		$hyperlink_text = ! empty( $instance['hyperlink_text'] ) ? $instance['hyperlink_text'] : '';
		$hyperlink = ! empty( $instance['hyperlink'] ) ? $instance['hyperlink'] : '';
		$include_own_progress_bar = ! empty( $instance['include_own_progress_bar'] ) ? $instance['include_own_progress_bar'] : '';
				
		$my_goal = number_format($current_score) . ' of ' .  number_format($your_goal) . ' <span style="text-transform: capitalize;">'. $unit_of_measure .'</span>';
		$percent_complete = round( $current_score / $your_goal * 100 );
		
		// Candy stripe code goes here...
		$candy_class = '';
		if($candy_stripe_options == 'none') {
			$candy_class = 'nostripes';
		}
				
		$widget_id = 'widget_'.rand().rand().rand();
		
		?>
		
		
		<style type="text/css">
		/* candystripe styling */
		#<?php echo $widget_id ?> .meter {
			height: <?php echo $progress_bar_height ?>px;
			<?php if($progress_bar_border != 'noborder') { ?>
			border: 1px solid <?php echo $progress_bar_border ?>;
			<?php } ?>
		}
		#<?php echo $widget_id ?> .meter > span:after, #<?php echo $widget_id ?> .animate > span > span {
			<?php if($candy_stripe_options == 'animated') { ?>
			-webkit-animation: move 2s linear infinite;
			-moz-animation: move 2s linear infinite;
			<?php } ?>
		}
		#<?php echo $widget_id ?> .extra-font-color {
			color: <?php echo $font_color ?> !important;
		}
		</style>
		
		<div id="<?php echo $widget_id ?>" class="wip-progress-widget">
		
			<h2 class="widget-title extra-font-color"><?php echo esc_html( $heading ) ?></h2>
			
			<div class="pogress-bar-media progress-bar-class"><img src="<?php echo esc_url( $progress_bar_media ) ?>" /></div>
			
			<div class="wip-title progress-bar-class extra-font-color"><?php echo esc_html( $wip_title ) ?></div>
			
			<div class="progress-bar-class meter <?php echo esc_attr( $progress_bar_color ) . ' ' . $candy_class ?>">
				<span style="width: <?php echo $percent_complete ?>%"></span>
			</div>
			
			<div class="percent-complete progress-bar-class extra-font-color"><?php echo $percent_complete ?>% Complete</div>
			
			<div class="my-goal progress-bar-class extra-font-color"><?php echo $my_goal ?></div>
			
			<div class="more-info progress-bar-class extra-font-color"><?php echo esc_html( $more_information ) ?></div>
						
			<?php if($include_hyperlink == 'yes') { ?>
				<div class="custom-hyperlinked progress-bar-class"><a href="<?php echo esc_url( $hyperlink ) ?>" class="extra-font-color"><?php echo esc_html( $hyperlink_text ) ?></a></div>
			<?php } ?>
			
			<?php if($include_own_progress_bar == 'yes') { ?>
				<div class="include-progress-link progress-bar-class"><a href="http://authorbiztools.com/wip-progress-bar" class="extra-font-color">Get Your Own Progress Bar</a></div>
			<?php } ?>
		
		</div>
		
		<?php
		
		
		
		
		echo $args['after_widget'];
	}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {	
		$heading = ! empty( $instance['heading'] ) ? $instance['heading'] : __( 'untitled', 'text_domain' );
		$wip_title = ! empty( $instance['wip_title'] ) ? $instance['wip_title'] : __( 'untitled', 'text_domain' );
		$unit_of_measure = ! empty( $instance['unit_of_measure'] ) ? $instance['unit_of_measure'] : __( 'words', 'text_domain' );
		$your_goal = ! empty( $instance['your_goal'] ) ? intval( $instance['your_goal'] ) : __( '', 'text_domain' );
		$current_score = ! empty( $instance['current_score'] ) ? intval( $instance['current_score'] ) : __( '', 'text_domain' );
		$progress_bar_color = ! empty( $instance['progress_bar_color'] ) ? $instance['progress_bar_color'] : __( 'red', 'text_domain' );
		$progress_bar_border = ! empty( $instance['progress_bar_border'] ) ? $instance['progress_bar_border'] : __( 'red', 'text_domain' );
		$candy_stripe_options = ! empty( $instance['candy_stripe_options'] ) ? $instance['candy_stripe_options'] : __( 'none', 'text_domain' );
		$progress_bar_height = ! empty( $instance['progress_bar_height'] ) ? intval( $instance['progress_bar_height'] ) : __( '', 'text_domain' );
		$progress_bar_media = ! empty( $instance['progress_bar_media'] ) ? $instance['progress_bar_media'] : __( '', 'text_domain' );
		$font_color = ! empty( $instance['font_color'] ) ? $instance['font_color'] : __( '', 'text_domain' );
		$more_information = ! empty( $instance['more_information'] ) ? $instance['more_information'] : __( '', 'text_domain' );
		$include_hyperlink = ! empty( $instance['include_hyperlink'] ) ? $instance['include_hyperlink'] : __( '', 'text_domain' );
		$hyperlink_text = ! empty( $instance['hyperlink_text'] ) ? $instance['hyperlink_text'] : __( '', 'text_domain' );
		$hyperlink = ! empty( $instance['hyperlink'] ) ? $instance['hyperlink'] : __( '', 'text_domain' );
		$include_own_progress_bar = ! empty( $instance['include_own_progress_bar'] ) ? $instance['include_own_progress_bar'] : __( '', 'text_domain' );
		$own_progress_bar_link = ! empty( $instance['own_progress_bar_link'] ) ? $instance['own_progress_bar_link'] : __( '', 'text_domain' );
		?>
		
		<style>
		.progress_bar_paragraph {
			border: 2px solid #eaeaea;
			border-radius: 5px;
			margin-bottom: 25px;
			padding: 20px;
		}
		</style>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'heading' ); ?>"><?php _e( 'Heading:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'heading' ); ?>" name="<?php echo $this->get_field_name( 'heading' ); ?>" type="text" value="<?php echo esc_attr( $heading ); ?>">
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'wip_title' ); ?>"><?php _e( 'WIP Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'wip_title' ); ?>" name="<?php echo $this->get_field_name( 'wip_title' ); ?>" type="text" value="<?php echo esc_attr( $wip_title ); ?>">
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'unit_of_measure' ); ?>"><?php _e( 'Unit of measure:' ); ?></label> <br />
		<input class="widefat" name="<?php echo $this->get_field_name( 'unit_of_measure' ); ?>" type="radio" <?php echo ($unit_of_measure == 'words') ? 'checked="checked"' : '' ?> value="words"> &nbsp; Words <br />
		<input class="widefat" name="<?php echo $this->get_field_name( 'unit_of_measure' ); ?>" type="radio" <?php echo ($unit_of_measure == 'pages') ? 'checked="checked"' : '' ?> value="pages"> &nbsp; Pages
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'your_goal' ); ?>"><?php _e( 'Your Goal:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'your_goal' ); ?>" name="<?php echo $this->get_field_name( 'your_goal' ); ?>" type="text" value="<?php echo esc_attr( $your_goal ); ?>" onblur="this.value=this.value.replace(/,/g,'')">
		<label for="<?php echo $this->get_field_id( 'current_score' ); ?>"><?php _e( 'Current:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'current_score' ); ?>" name="<?php echo $this->get_field_name( 'current_score' ); ?>" type="text" value="<?php echo esc_attr( $current_score ); ?>" onblur="this.value=this.value.replace(/,/g,'')">
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'progress_bar_color' ); ?>"><?php _e( 'Color of Progress Bar:' ); ?></label> 
		<select class="widefat" id="<?php echo $this->get_field_id( 'progress_bar_color' ); ?>" name="<?php echo $this->get_field_name( 'progress_bar_color' ); ?>">
			<option value="red" <?php echo ($progress_bar_color == 'red') ? 'selected="selected"' : '' ?>>Red</option>
			<option value="black" <?php echo ($progress_bar_color == 'black') ? 'selected="selected"' : '' ?>>Black</option>
			<option value="blue" <?php echo ($progress_bar_color == 'blue') ? 'selected="selected"' : '' ?>>Blue</option>
			<option value="green" <?php echo ($progress_bar_color == 'green') ? 'selected="selected"' : '' ?>>Green</option>
			<option value="orange" <?php echo ($progress_bar_color == 'orange') ? 'selected="selected"' : '' ?>>Orange</option>
			<option value="yellow" <?php echo ($progress_bar_color == 'yellow') ? 'selected="selected"' : '' ?>>Yellow</option>
			<option value="white" <?php echo ($progress_bar_color == 'white') ? 'selected="selected"' : '' ?>>White</option>
		</select>
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'progress_bar_border' ); ?>"><?php _e( 'Color of Progress Bar Border:' ); ?></label> 
		<select class="widefat" id="<?php echo $this->get_field_id( 'progress_bar_border' ); ?>" name="<?php echo $this->get_field_name( 'progress_bar_border' ); ?>">
			<option value="noborder" <?php echo ($progress_bar_border == 'noborder') ? 'selected="selected"' : '' ?>>No Border</option>
			<option value="red" <?php echo ($progress_bar_border == 'red') ? 'selected="selected"' : '' ?>>Red</option>
			<option value="black" <?php echo ($progress_bar_border == 'black') ? 'selected="selected"' : '' ?>>Black</option>
			<option value="blue" <?php echo ($progress_bar_border == 'blue') ? 'selected="selected"' : '' ?>>Blue</option>
			<option value="green" <?php echo ($progress_bar_border == 'green') ? 'selected="selected"' : '' ?>>Green</option>
			<option value="orange" <?php echo ($progress_bar_border == 'orange') ? 'selected="selected"' : '' ?>>Orange</option>
			<option value="yellow" <?php echo ($progress_bar_border == 'yellow') ? 'selected="selected"' : '' ?>>Yellow</option>
			<option value="white" <?php echo ($progress_bar_border == 'white') ? 'selected="selected"' : '' ?>>White</option>
		</select>
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'candy_stripe_options' ); ?>"><?php _e( 'Candy stripe options:' ); ?></label> <br />
		<input class="widefat" name="<?php echo $this->get_field_name( 'candy_stripe_options' ); ?>" type="radio" <?php echo ($candy_stripe_options == 'simple') ? 'checked="checked"' : '' ?> value="simple"> &nbsp; Candy stripe <br />
		<input class="widefat" name="<?php echo $this->get_field_name( 'candy_stripe_options' ); ?>" type="radio" <?php echo ($candy_stripe_options == 'animated') ? 'checked="checked"' : '' ?> value="animated"> &nbsp; Candy stripe animated <br />
		<input class="widefat" name="<?php echo $this->get_field_name( 'candy_stripe_options' ); ?>" type="radio" <?php echo ($candy_stripe_options == 'none') ? 'checked="checked"' : '' ?> value="none"> &nbsp; None
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'progress_bar_height' ); ?>"><?php _e( 'Progress Bar Height in Pixels:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'progress_bar_height' ); ?>" name="<?php echo $this->get_field_name( 'progress_bar_height' ); ?>" type="text" value="<?php echo esc_attr( $progress_bar_height ); ?>" onblur="this.value=this.value.replace(/,/g,'')">
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'progress_bar_media' ); ?>"><?php _e( 'Add Cover:' ); ?></label> 
		<input style="width: 55%;" class="widefat media-input-field" id="<?php echo $this->get_field_id( 'progress_bar_media' ); ?>" name="<?php echo $this->get_field_name( 'progress_bar_media' ); ?>" type="text" value="<?php echo esc_attr( $progress_bar_media ); ?>"> &nbsp <a href="#" id="open-media-custom-btn" class="">Add Media</a> <!--button button-primary-->
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'font_color' ); ?>"><?php _e( 'Font Color:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'font_color' ); ?>" name="<?php echo $this->get_field_name( 'font_color' ); ?>" type="text" value="<?php echo esc_attr( $font_color ); ?>">
		</p>
		
		<p class="progress_bar_paragraph">
		<label style="vertical-align:top" for="<?php echo $this->get_field_id( 'more_information' ); ?>"><?php _e( 'More Information:' ); ?></label> 
		<textarea id="<?php echo $this->get_field_id( 'more_information' ); ?>" name="<?php echo $this->get_field_name( 'more_information' ); ?>"><?php echo esc_textarea( $more_information ); ?></textarea>
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'include_hyperlink' ); ?>"><?php _e( 'Add Link:' ); ?></label> <br />
		<input class="widefat" name="<?php echo $this->get_field_name( 'include_hyperlink' ); ?>" type="checkbox" <?php echo ($include_hyperlink == 'yes') ? 'checked="checked"' : '' ?> value="yes"> &nbsp; Want to add link? <br />
		<label for="<?php echo $this->get_field_id( 'hyperlink_text' ); ?>"><?php _e( 'Hyperlink Text:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'hyperlink_text' ); ?>" name="<?php echo $this->get_field_name( 'hyperlink_text' ); ?>" type="text" value="<?php echo esc_attr( $hyperlink_text ); ?>"> <br />
		<label for="<?php echo $this->get_field_id( 'hyperlink' ); ?>"><?php _e( 'Hyperlink:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'hyperlink' ); ?>" name="<?php echo $this->get_field_name( 'hyperlink' ); ?>" type="text" value="<?php echo esc_attr( $hyperlink ); ?>">
		</p>
		
		<p class="progress_bar_paragraph">
		<label for="<?php echo $this->get_field_id( 'include_own_progress_bar' ); ?>"><?php _e( 'Help spread the word (optional):' ); ?></label> <br /> 
		<input class="widefat" name="<?php echo $this->get_field_name( 'include_own_progress_bar' ); ?>" type="checkbox" <?php echo ($include_own_progress_bar == 'yes') ? 'checked="checked"' : '' ?> value="yes"> &nbsp; Include: "WIP Progress Bar" 
		</p>
		
		<script type="text/javascript">
		jQuery(document).ready(function(){
		
			// Set all variables to be used in scope
			var frame;
		
			jQuery('body').on( 'click', '#open-media-custom-btn', function( event ){
				event.preventDefault();
				
				// If the media frame already exists, reopen it.
				if ( frame ) {
					frame.open();
					return;
				}
				
				// Create a new media frame
				frame = wp.media({
					title: 'Upload Image',
					button: {
						text: 'Use this media'
					},
					multiple: false  // Set to true to allow multiple files to be selected
				});
				
				// When an image is selected in the media frame...
    			frame.on( 'select', function() {
				
					// Get media attachment details from the frame state
      				var attachment = frame.state().get('selection').first().toJSON();
				
					// Output to the console uploaded_image
					//console.log(uploaded_image);
					var image_url = attachment.url;
					//alert(image_url);
					// Let's assign the url value to the input field
					jQuery('.media-input-field').val(image_url);
					//frame.close();
				});
				
				// Finally, open the modal on click
    			frame.open();
				
				jQuery('.media-modal').parent().not('div:first').remove();
				
			});
		});
		</script>
		
		<?php 
		
		
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['heading'] = ( ! empty( $new_instance['heading'] ) ) ? sanitize_text_field( $new_instance['heading'] ) : '';
		$instance['wip_title'] = ( ! empty( $new_instance['wip_title'] ) ) ? sanitize_text_field( $new_instance['wip_title'] ) : '';
		$instance['unit_of_measure'] = ( ! empty( $new_instance['unit_of_measure'] ) ) ? sanitize_text_field( $new_instance['unit_of_measure'] ) : '';
		$instance['your_goal'] = ( ! empty( $new_instance['your_goal'] ) ) ? intval( sanitize_text_field( $new_instance['your_goal'] ) ) : '';
		$instance['current_score'] = ( ! empty( $new_instance['current_score'] ) ) ? intval( sanitize_text_field( $new_instance['current_score'] ) ) : '';
		$instance['progress_bar_color'] = ( ! empty( $new_instance['progress_bar_color'] ) ) ? sanitize_text_field( $new_instance['progress_bar_color'] ) : '';
		$instance['progress_bar_border'] = ( ! empty( $new_instance['progress_bar_border'] ) ) ? sanitize_text_field( $new_instance['progress_bar_border'] ) : '';
		$instance['candy_stripe_options'] = ( ! empty( $new_instance['candy_stripe_options'] ) ) ? sanitize_text_field( $new_instance['candy_stripe_options'] ) : '';
		$instance['progress_bar_height'] = ( ! empty( $new_instance['progress_bar_height'] ) ) ? intval( sanitize_text_field( $new_instance['progress_bar_height'] ) ) : '';
		$instance['progress_bar_media'] = ( ! empty( $new_instance['progress_bar_media'] ) ) ? sanitize_text_field( $new_instance['progress_bar_media'] ) : '';
		$instance['font_color'] = ( ! empty( $new_instance['font_color'] ) ) ? sanitize_text_field( $new_instance['font_color'] ) : '';
		$instance['more_information'] = ( ! empty( $new_instance['more_information'] ) ) ? sanitize_text_field( $new_instance['more_information'] ) : '';
		$instance['include_hyperlink'] = ( ! empty( $new_instance['include_hyperlink'] ) ) ? sanitize_text_field( $new_instance['include_hyperlink'] ) : '';
		$instance['hyperlink_text'] = ( ! empty( $new_instance['hyperlink_text'] ) ) ? sanitize_text_field( $new_instance['hyperlink_text'] ) : '';
		$instance['hyperlink'] = ( ! empty( $new_instance['hyperlink'] ) ) ? sanitize_text_field( $new_instance['hyperlink'] ) : '';
		$instance['include_own_progress_bar'] = ( ! empty( $new_instance['include_own_progress_bar'] ) ) ? sanitize_text_field( $new_instance['include_own_progress_bar'] ) : '';
		$instance['own_progress_bar_link'] = ( ! empty( $new_instance['own_progress_bar_link'] ) ) ? sanitize_text_field( $new_instance['own_progress_bar_link'] ) : '';
		return $instance;
	}
} // class Pbp_Progress_Bar_Widget

// register Pbp_Progress_Bar_Widget widget
function pbp_register_progress_bar_widget() {
    register_widget( 'Pbp_Progress_Bar_Widget' );
}
add_action( 'widgets_init', 'pbp_register_progress_bar_widget' );
<?php
/**
 * Image Frame Widget
 *
 * @package Meteorite
 */

class Meteorite_Image_Frame extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_image_frame_widget', 'description' => __( 'Display an image in a stylish way.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Image Frame', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_image_frame_widget';
	}
	
	function form($instance) {
		$title				= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$frame_style_type	= isset( $instance['frame_style_type'] ) ? esc_attr( $instance['frame_style_type'] ) : 'None';
		$hover_type			= isset( $instance['hover_type'] ) ? esc_attr( $instance['hover_type'] ) : 'None';
		$image_url			= isset( $instance['image_url'] ) ? esc_url( $instance['image_url'] ) : '';
		$image_alt_text		= isset( $instance['image_alt_text'] ) ? esc_attr( $instance['image_alt_text'] ) : '';
		$image_link			= isset( $instance['image_link'] ) ? esc_url( $instance['image_link'] ) : '';
		$target 			= isset( $instance['target'] ) ? esc_attr( $instance['target'] ) : '_self';
		$alignment			= isset( $instance['alignment'] ) ? esc_attr( $instance['alignment'] ) : 'None';
		$animation			= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
	?>

	<div class="tt-widget-wrapper">
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Title', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter a widget title.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Frame Style Type', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a styling for the frame.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('frame_style_type'); ?>" id="<?php echo $this->get_field_id('frame_style_type'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Glow', 'Drop Shadow', 'Bottom Shadow');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $frame_style_type == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Hover Type', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a hover type for the image.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('hover_type'); ?>" id="<?php echo $this->get_field_id('hover_type'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Zoom In', 'Zoom Out', 'Lift Up', 'Darken');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hover_type == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Image', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Upload your image.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="tt-media-uploader">
								<div class="tt-media-image-holder" <?php if ( ! $image_url ) { echo 'style="display: none;"'; } ?> >
									<img src="<?php echo esc_url( meteorite_get_attachment_thumb_url( $image_url ) ); ?>" alt="" class="tt-media-image img-thumbnail" />
								</div>
								<div class="tt-media-meta-fields">
									<input type="hidden" class="tt-media-upload-url" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php echo $image_url; ?>" />
								</div>
								<a class="tt-media-upload-btn btn btn-primary" id="tt-media-upload-btn" href="#"><?php _e( 'Upload', 'meteorite_extensions' ); ?></a>
								<a class="tt-media-remove-btn btn btn-default" id="tt-media-remove-btn" href="#" <?php if ( ! $image_url ) { echo 'style="display: none;"'; } ?>><?php _e( 'Remove', 'meteorite_extensions' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Image Alt Text', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Describe your image here in a few words.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('image_alt_text'); ?>" name="<?php echo $this->get_field_name('image_alt_text'); ?>" type="text" value="<?php echo $image_alt_text; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Link', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'If you want your image to link somewhere, paste it in here.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('image_link'); ?>" name="<?php echo $this->get_field_name('image_link'); ?>" type="text" value="<?php echo $image_link; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Link Target', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( '_self = open in same window', 'meteorite_extensions' ); ?></p>
				<p><?php _e( '_blank = open in new window.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('target'); ?>" id="<?php echo $this->get_field_id('target'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('_self', '_blank');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $target == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Alignment', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Align your image.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('alignment'); ?>" id="<?php echo $this->get_field_id('alignment'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Left', 'Center', 'Right');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $alignment == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Animation', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose an animation type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('animation'); ?>" id="<?php echo $this->get_field_id('animation'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('None', 'Fade In', 'Fade In Up', 'Fade In Left', 'Fade In Right');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $animation == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 				= sanitize_text_field($new_instance['title']);
		$instance['frame_style_type'] 	= sanitize_text_field($new_instance['frame_style_type']);
		$instance['hover_type'] 		= sanitize_text_field($new_instance['hover_type']);
		$instance['image_url'] 			= esc_url_raw($new_instance['image_url']);
		$instance['image_alt_text'] 	= sanitize_text_field($new_instance['image_alt_text']);
		$instance['image_link']		 	= esc_url_raw($new_instance['image_link']);
		$instance['target']				= sanitize_text_field($new_instance['target']);
		$instance['alignment'] 			= sanitize_text_field($new_instance['alignment']);
		$instance['animation'] 			= sanitize_text_field($new_instance['animation']);

		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 				= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 				= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$frame_style_type	= isset( $instance['frame_style_type'] ) ? esc_attr($instance['frame_style_type']) : 'None';
		$hover_type 		= isset( $instance['hover_type'] ) ? esc_attr($instance['hover_type']) : 'None';
		$image_url		 	= isset( $instance['image_url'] ) ? esc_url($instance['image_url']) : '';
		$image_alt_text 	= isset( $instance['image_alt_text'] ) ? esc_attr($instance['image_alt_text']) : '';
		$image_link 		= isset( $instance['image_link'] ) ? esc_url($instance['image_link']) : '';
		$target 		 	= isset( $instance['target'] ) ? esc_attr($instance['target']) : '_self';
		$alignment 			= isset( $instance['alignment'] ) ? esc_attr($instance['alignment']) : 'None';
		$animation 			= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		$frame_style_type_class = '';
		if ( $frame_style_type == 'None' ) {
			$frame_style_type_class = 'frame-none';
		} elseif ( $frame_style_type == 'Glow' ) {
			$frame_style_type_class = 'frame-glow';
		} elseif ( $frame_style_type == 'Drop Shadow' ) {
			$frame_style_type_class = 'frame-drop-shadow';
		} elseif ( $frame_style_type == 'Bottom Shadow' ) {
			$frame_style_type_class = 'frame-bottom-shadow';
		}

		$hover_type_class = '';
		$overlay = '';
		if ( $hover_type == 'None' ) {
			$hover_type_class = 'hover-none';
		} elseif ( $hover_type == 'Zoom In' ) {
			$hover_type_class = 'hover-zoom-in';
		} elseif ( $hover_type == 'Zoom Out' ) {
			$hover_type_class = 'hover-zoom-out';
		} elseif ( $hover_type == 'Lift Up' ) {
			$hover_type_class = 'hover-lift-up';
		} elseif ( $hover_type == 'Darken' ) {
			$hover_type_class = 'hover-darken';
			$overlay = '<div class="overlay"></div>';
		}

		if ( $target == '_blank' ) {
			$target_blank = '_blank';
		} elseif ( $target == '_self' ) {
			$target_blank = '_self';
		}

		$alignment_class = '';
		if ( $alignment == 'None' ) {
			$alignment_class = 'align-img-none';
		} elseif ( $alignment == 'Left' ) {
			$alignment_class = 'align-img-left';
		} elseif ( $alignment == 'Center' ) {
			$alignment_class = 'align-img-center';
		} elseif ( $alignment == 'Right' ) {
			$alignment_class = 'align-img-right';
		}

		$animation_class = '';
		if ( $animation == 'Fade In' ) {
			$animation_class = 'fade-in';
		} elseif ( $animation == 'Fade In Up' ) {
			$animation_class = 'fade-in-up';
		} elseif ( $animation == 'Fade In Left' ) {
			$animation_class = 'fade-in-left';
		} elseif ( $animation == 'Fade In Right' ) {
			$animation_class = 'fade-in-right';
		}
		
		echo $args['before_widget'];

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; } ?>

			<div class="meteorite-image-frame-wrapper <?php echo $frame_style_type_class . ' ' . $hover_type_class . ' ' . $animation_class; ?>">
				<div class="meteorite-image-frame <?php echo $hover_type_class; ?>">
					<?php if ( $image_link ) : ?>
					<a href="<?php echo $image_link; ?>" target="<?php echo $target_blank; ?>">
						<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt_text; ?>" class="<?php echo $alignment_class; ?>" />
						<?php echo $overlay; ?>
					</a>
					<?php else : ?>
						<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt_text; ?>" class="<?php echo $alignment_class; ?>" />
						<?php echo $overlay; ?>
					<?php endif; ?>
				</div>
			</div>

		<?php
		echo $args['after_widget'];

	}
	
}
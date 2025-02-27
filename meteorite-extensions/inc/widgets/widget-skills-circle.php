<?php
/**
 * Skill bar circle widget
 *
 * @package Meteorite
 */

class Meteorite_Skills_Circle extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_skills_circle_widget', 'description' => __( 'Show your visitors some of your skills.', 'meteorite_extensions') );
        parent::__construct(false, $name = __('Meteorite: Skills Circle', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_skills_circle_widget';
    }
	
	function form($instance) {
		$title     			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type 				= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Default';
		$fill_color 		= isset( $instance['fill_color'] ) ? esc_attr( $instance['fill_color'] ) : '#337ab7';
		$unfill_color 		= isset( $instance['unfill_color'] ) ? esc_attr( $instance['unfill_color'] ) : '#dfdfdf';
		$size 				= isset( $instance['size'] ) ? absint( $instance['size'] ) : '150';
		$line_width 		= isset( $instance['line_width'] ) ? absint( $instance['line_width'] ) : '5';
		$speed 				= isset( $instance['speed'] ) ? absint( $instance['speed'] ) : '1500';
		//First
		$perc_one 			= isset( $instance['perc_one'] ) ? absint( $instance['perc_one'] ) : '';
		$icon_one   		= isset( $instance['icon_one'] ) ? esc_attr( $instance['icon_one'] ) : '';
		$text_in_one   		= isset( $instance['text_in_one'] ) ? esc_html( $instance['text_in_one'] ) : '';
		$text_under_one   	= isset( $instance['text_under_one'] ) ? esc_html( $instance['text_under_one'] ) : '';
		//Second
		$perc_two 			= isset( $instance['perc_two'] ) ? absint( $instance['perc_two'] ) : '';
		$icon_two   		= isset( $instance['icon_two'] ) ? esc_attr( $instance['icon_two'] ) : '';
		$text_in_two   		= isset( $instance['text_in_two'] ) ? esc_html( $instance['text_in_two'] ) : '';
		$text_under_two   	= isset( $instance['text_under_two'] ) ? esc_html( $instance['text_under_two'] ) : '';
		//Third
		$perc_three 		= isset( $instance['perc_three'] ) ? absint( $instance['perc_three'] ) : '';
		$icon_three   		= isset( $instance['icon_three'] ) ? esc_attr( $instance['icon_three'] ) : '';
		$text_in_three   	= isset( $instance['text_in_three'] ) ? esc_html( $instance['text_in_three'] ) : '';
		$text_under_three   = isset( $instance['text_under_three'] ) ? esc_html( $instance['text_under_three'] ) : '';
		//Fourth
		$perc_four 			= isset( $instance['perc_four'] ) ? absint( $instance['perc_four'] ) : '';
		$icon_four   		= isset( $instance['icon_four'] ) ? esc_attr( $instance['icon_four'] ) : '';
		$text_in_four   	= isset( $instance['text_in_four'] ) ? esc_html( $instance['text_in_four'] ) : '';
		$text_under_four   	= isset( $instance['text_under_four'] ) ? esc_html( $instance['text_under_four'] ) : '';
		
		$animation 			= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';

		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');

	?>

	<div class="tt-widget-wrapper">
		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Information', 'meteorite_extensions' ); ?></h4>
				<p>
					<?php echo sprintf( '%1$s<a href="//fontawesome.com/v4.7.0/cheatsheet/" target="_blank">%2$s</a>&#46;&nbsp;%3$s',
						_x( 'You can find a list of the available icons ', 'Icon description', 'meteorite_extensions' ),
						_x( 'here', 'Icon description', 'meteorite_extensions' ),
						_x( 'Usage example: <strong>fa-android</strong>', 'Icon description', 'meteorite_extensions')
					); ?>
				</p>
			</div>
		</div>

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
				<h4><?php _e( 'Type', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a widget type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('type'); ?>" id="<?php echo $this->get_field_id('type'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Default');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $type == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'Customize', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Customize your skill circles in color and size.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Fill Color', 'meteorite_extensions' ); ?></em>
							<input type="text" class="color-field" id="<?php echo $this->get_field_name('fill_color'); ?>" name="<?php echo $this->get_field_name('fill_color'); ?>" value="<?php echo $fill_color; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Track Color', 'meteorite_extensions' ); ?></em>
							<input type="text" class="color-field" id="<?php echo $this->get_field_name('unfill_color'); ?>" name="<?php echo $this->get_field_name('unfill_color'); ?>" value="<?php echo $unfill_color; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Size', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" value="<?php echo $size; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Line Width', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('line_width'); ?>" name="<?php echo $this->get_field_name('line_width'); ?>" value="<?php echo $line_width; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Speed', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('speed'); ?>" name="<?php echo $this->get_field_name('speed'); ?>" value="<?php echo $speed; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'First Skill', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the value of this skill.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('perc_one'); ?>" name="<?php echo $this->get_field_name('perc_one'); ?>" value="<?php echo $perc_one; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Icon', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('icon_one'); ?>" name="<?php echo $this->get_field_name('icon_one'); ?>" value="<?php echo $icon_one; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text (Inside)', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('text_in_one'); ?>" name="<?php echo $this->get_field_name('text_in_one'); ?>" value="<?php echo $text_in_one; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text (Outside)', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('text_under_one'); ?>" name="<?php echo $this->get_field_name('text_under_one'); ?>" value="<?php echo $text_under_one; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Second Skill', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the value of this skill.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('perc_two'); ?>" name="<?php echo $this->get_field_name('perc_two'); ?>" value="<?php echo $perc_two; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Icon', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('icon_two'); ?>" name="<?php echo $this->get_field_name('icon_two'); ?>" value="<?php echo $icon_two; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text (Inside)', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('text_in_two'); ?>" name="<?php echo $this->get_field_name('text_in_two'); ?>" value="<?php echo $text_in_two; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text (Outside)', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('text_under_two'); ?>" name="<?php echo $this->get_field_name('text_under_two'); ?>" value="<?php echo $text_under_two; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Third Skill', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the value of this skill.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('perc_three'); ?>" name="<?php echo $this->get_field_name('perc_three'); ?>" value="<?php echo $perc_three; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Icon', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('icon_three'); ?>" name="<?php echo $this->get_field_name('icon_three'); ?>" value="<?php echo $icon_three; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text (Inside)', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('text_in_three'); ?>" name="<?php echo $this->get_field_name('text_in_three'); ?>" value="<?php echo $text_in_three; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text (Outside)', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('text_under_three'); ?>" name="<?php echo $this->get_field_name('text_under_three'); ?>" value="<?php echo $text_under_three; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Fourth Skill', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the value of this skill.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('perc_four'); ?>" name="<?php echo $this->get_field_name('perc_four'); ?>" value="<?php echo $perc_four; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Icon', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('icon_four'); ?>" name="<?php echo $this->get_field_name('icon_four'); ?>" value="<?php echo $icon_four; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text (Inside)', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('text_in_four'); ?>" name="<?php echo $this->get_field_name('text_in_four'); ?>" value="<?php echo $text_in_four; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Text (Outside)', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('text_under_four'); ?>" name="<?php echo $this->get_field_name('text_under_four'); ?>" value="<?php echo $text_under_four; ?>">
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
							$options = array('None', 'Fade In', 'Fade In Up', 'Fade In Left', 'Fade In Right', 'Fade In One By One', 'Fade In Up One By One');
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

	<script>
	(function( $ ) {
		$(function() {
		$('.color-field').wpColorPicker();
		});
	})( jQuery );
	</script>

	<?php
	}

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= sanitize_text_field($new_instance['title']);
		$instance['type'] 			= sanitize_text_field($new_instance['type']);
		$instance['fill_color'] 	= sanitize_text_field($new_instance['fill_color']);
		$instance['unfill_color'] 	= sanitize_text_field($new_instance['unfill_color']);
		$instance['size'] 			= absint($new_instance['size']);
		$instance['line_width'] 	= absint($new_instance['line_width']);
		$instance['speed'] 			= absint($new_instance['speed']);
		// First
		$instance['perc_one'] 		= absint($new_instance['perc_one']);
		$instance['icon_one'] 		= sanitize_text_field($new_instance['icon_one']);
		$instance['text_in_one'] 	= sanitize_text_field($new_instance['text_in_one']);
		$instance['text_under_one'] = sanitize_text_field($new_instance['text_under_one']);
		// Second
		$instance['perc_two'] 		= absint($new_instance['perc_two']);
		$instance['icon_two'] 		= sanitize_text_field($new_instance['icon_two']);
		$instance['text_in_two'] 	= sanitize_text_field($new_instance['text_in_two']);
		$instance['text_under_two'] = sanitize_text_field($new_instance['text_under_two']);
		//Third
		$instance['perc_three'] 		= absint($new_instance['perc_three']);
		$instance['icon_three'] 		= sanitize_text_field($new_instance['icon_three']);
		$instance['text_in_three'] 		= sanitize_text_field($new_instance['text_in_three']);
		$instance['text_under_three'] 	= sanitize_text_field($new_instance['text_under_three']);
		//Fourth
		$instance['perc_four']			= absint($new_instance['perc_four']);
		$instance['icon_four']			= sanitize_text_field($new_instance['icon_four']);
		$instance['text_in_four'] 		= sanitize_text_field($new_instance['text_in_four']);
		$instance['text_under_four'] 	= sanitize_text_field($new_instance['text_under_four']);

		$instance['animation'] 		= sanitize_text_field($new_instance['animation']);

		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 				= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 				= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$type 				= isset( $instance['type'] ) ? esc_attr($instance['type']) : 'Default';
		$fill_color 		= isset( $instance['fill_color'] ) ? esc_attr($instance['fill_color']) : '#337ab7';
		$unfill_color 		= isset( $instance['unfill_color'] ) ? esc_attr($instance['unfill_color']) : '#dfdfdf';
		$size 				= isset( $instance['size'] ) ? absint( $instance['size'] ) : '150';
		$line_width 		= isset( $instance['line_width'] ) ? absint( $instance['line_width'] ) : '5';
		$speed 				= isset( $instance['speed'] ) ? absint( $instance['speed'] ) : '1500';
		//First
		$perc_one 			= isset( $instance['perc_one'] ) ? absint( $instance['perc_one'] ) : '';
		$icon_one 			= isset( $instance['icon_one'] ) ? esc_attr( $instance['icon_one'] ) : '';
		$text_in_one 		= isset( $instance['text_in_one'] ) ? esc_html( $instance['text_in_one'] ) : '';
		$text_under_one 	= isset( $instance['text_under_one'] ) ? esc_html( $instance['text_under_one'] ) : '';
		//Second
		$perc_two 			= isset( $instance['perc_two'] ) ? absint( $instance['perc_two'] ) : '';
		$icon_two 			= isset( $instance['icon_two'] ) ? esc_attr( $instance['icon_two'] ) : '';
		$text_in_two 		= isset( $instance['text_in_two'] ) ? esc_html( $instance['text_in_two'] ) : '';
		$text_under_two 	= isset( $instance['text_under_two'] ) ? esc_html( $instance['text_under_two'] ) : '';
		//Third
		$perc_three  		= isset( $instance['perc_three'] ) ? absint( $instance['perc_three'] ) : '';
		$icon_three 		= isset( $instance['icon_three'] ) ? esc_attr( $instance['icon_three'] ) : '';
		$text_in_three 		= isset( $instance['text_in_three'] ) ? esc_html( $instance['text_in_three'] ) : '';
		$text_under_three 	= isset( $instance['text_under_three'] ) ? esc_html( $instance['text_under_three'] ) : '';
		//Fourth
		$perc_four 			= isset( $instance['perc_four'] ) ? absint( $instance['perc_four'] ) : '';
		$icon_four 			= isset( $instance['icon_four'] ) ? esc_attr( $instance['icon_four'] ) : '';
		$text_in_four 		= isset( $instance['text_in_four'] ) ? esc_html( $instance['text_in_four'] ) : '';
		$text_under_four 	= isset( $instance['text_under_four'] ) ? esc_html( $instance['text_under_four'] ) : '';

		$animation 			= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		$animation_class = '';
		$animation_single = '';
		if ( $animation == 'Fade In' ) {
			$animation_class = 'fade-in';
		} elseif ( $animation == 'Fade In Up' ) {
			$animation_class = 'fade-in-up';
		} elseif ( $animation == 'Fade In Left' ) {
			$animation_class = 'fade-in-left';
		} elseif ( $animation == 'Fade In Right' ) {
			$animation_class = 'fade-in-right';
		} elseif ( $animation == 'Fade In One By One' ) {
			$animation_single = 'fade-in-single';
		} elseif ( $animation == 'Fade In Up One By One' ) {
			$animation_single = 'fade-in-up-single';
		}

		$_fill_color = get_theme_mod('primary_color', '#337ab7');
		if ( $fill_color ) {
			$_fill_color = $fill_color;
		}

		$_unfill_color = '#dfdfdf';
		if ( $unfill_color ) {
			$_unfill_color = $unfill_color;
		}

		$_size = '150';
		if ( $size ) {
			$_size = $size;
		}

		$_line_width = '5';
		if ( $line_width ) {
			$_line_width = $line_width;
		}

		$_speed = '1500';
		if ( $speed ) {
			$_speed = $speed;
		}

		$font_size = $size / 4.4;
		$font_size = round($font_size, 4);


		echo $args['before_widget'];

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; } 
		?>

		<div class="col-sm-12">
			<div class="meteorite-skill-circle-wrapper row <?php echo $animation_class . $animation_single ?>" data-fillcolor="<?php echo $_fill_color ?>" data-unfillcolor="<?php echo $_unfill_color ?>" data-size="<?php echo $_size ?>" data-linewidth="<?php echo $_line_width ?>" data-speed="<?php echo $_speed ?>">
			<?php if ($perc_one != '') : ?>
				<div class="meteorite-skill-circle meteorite-item col-md-3 col-sm-6" data-waypoint-active="yes">
					<div class="meteorite-skill-circle-inner" style="height: <?php echo $size; ?>px; line-height: <?php echo $size; ?>px; width: <?php echo $size; ?>px; font-size: <?php echo $font_size; ?>px;" data-percent="<?php echo $perc_one; ?>">
						<?php if ( $icon_one ) :
							echo '<div class="aligncenter"><i class="fa ' . $icon_one . '" aria-hidden="true"></i></div>';
						elseif ( $text_in_one ) :
							echo $text_in_one;
						else : 
							echo '<span>' . $perc_one . '</span>';
						endif; ?>
					</div>
					<?php if ( $text_under_one ) :
						echo '<div class="text-outside">' . $text_under_one . '</div>';
					endif; ?>
				</div>
			<?php endif; ?>   
			<?php if ($perc_two !='') : ?>
				<div class="meteorite-skill-circle meteorite-item col-md-3 col-sm-6" data-waypoint-active="yes">
					<div class="meteorite-skill-circle-inner" style="height: <?php echo $size; ?>px; line-height: <?php echo $size; ?>px; width: <?php echo $size; ?>px; font-size: <?php echo $font_size; ?>px;" data-percent="<?php echo $perc_two; ?>">
						<?php if ( $icon_two ) :
							echo '<div class="aligncenter"><i class="fa ' . $icon_two . '" aria-hidden="true"></i></div>';
						elseif ( $text_in_two ) :
							echo $text_in_two;
						else : 
							echo '<span>' . $perc_two . '</span>';
						endif; ?>
					</div>
					<?php if ( $text_under_two ) :
						echo '<div class="text-outside">' . $text_under_two . '</div>';
					endif; ?>
				</div>
			<?php endif; ?> 
			<?php if ($perc_three !='') : ?>
				<div class="meteorite-skill-circle meteorite-item col-md-3 col-sm-6" data-waypoint-active="yes">
					<div class="meteorite-skill-circle-inner" style="height: <?php echo $size; ?>px; line-height: <?php echo $size; ?>px; width: <?php echo $size; ?>px; font-size: <?php echo $font_size; ?>px;" data-percent="<?php echo $perc_three; ?>">
						<?php if ( $icon_three ) :
							echo '<div class="aligncenter"><i class="fa ' . $icon_three . '" aria-hidden="true"></i></div>';
						elseif ( $text_in_three ) :
							echo $text_in_three;
						else : 
							echo '<span>' . $perc_three . '</span>';
						endif; ?>
					</div>
					<?php if ( $text_under_three ) :
						echo '<div class="text-outside">' . $text_under_three . '</div>';
					endif; ?>
				</div>
			<?php endif; ?> 
			<?php if ($perc_four !='') : ?>
				<div class="meteorite-skill-circle meteorite-item col-md-3 col-sm-6" data-waypoint-active="yes">
					<div class="meteorite-skill-circle-inner" style="height: <?php echo $size; ?>px; line-height: <?php echo $size; ?>px; width: <?php echo $size; ?>px; font-size: <?php echo $font_size; ?>px;" data-percent="<?php echo $perc_four; ?>">
						<?php if ( $icon_four ) :
							echo '<div class="aligncenter"><i class="fa ' . $icon_four . '" aria-hidden="true"></i></div>';
						elseif ( $text_in_four ) :
							echo $text_in_four;
						else : 
							echo '<span>' . $perc_four . '</span>';
						endif; ?>
					</div>
					<?php if ( $text_under_four ) :
						echo '<div class="text-outside">' . $text_under_four . '</div>';
					endif; ?>
				</div>
			<?php endif; ?>
			<div class="clearfix"></div>
			</div>
		</div>

		<?php
		echo $args['after_widget'];

	}
	
}
<?php
/**
 * Buttons widget
 *
 * @package Meteorite
 */

class Meteorite_Buttons extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_buttons_widget', 'description' => __( 'Display up to two buttons.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Buttons', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_buttons_widget';
	}
	
	function form($instance) {
		$title     			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$button_text_one 	= isset( $instance['button_text_one'] ) ? esc_html( $instance['button_text_one'] ) : '';
		$button_link_one 	= isset( $instance['button_link_one'] ) ? esc_url( $instance['button_link_one'] ) : '';
		$button_target_one 	= isset( $instance['button_target_one'] ) ? esc_attr( $instance['button_target_one'] ) : '_self';
		$button_text_two 	= isset( $instance['button_text_two'] ) ? esc_html( $instance['button_text_two'] ) : '';
		$button_link_two 	= isset( $instance['button_link_two'] ) ? esc_url( $instance['button_link_two'] ) : '';
		$button_target_two 	= isset( $instance['button_target_two'] ) ? esc_attr( $instance['button_target_two'] ) : '_self';
		$alignment 			= isset( $instance['alignment'] ) ? esc_attr( $instance['alignment'] ) : 'Left Aligned';
		$animation 			= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
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
				<h4><?php _e( 'Button One', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose your preferences.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions') ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('button_text_one'); ?>" name="<?php echo $this->get_field_name('button_text_one'); ?>" type="text" value="<?php echo $button_text_one; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Link', 'meteorite_extensions') ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('button_link_one'); ?>" name="<?php echo $this->get_field_name('button_link_one'); ?>" type="text" value="<?php echo $button_link_one; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Target', 'meteorite_extensions') ?></em>
							<select name="<?php echo $this->get_field_name('button_target_one'); ?>" id="<?php echo $this->get_field_id('button_target_one'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('_self', '_blank');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $button_target_one == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'Button Two', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose your preferences.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions') ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('button_text_two'); ?>" name="<?php echo $this->get_field_name('button_text_two'); ?>" type="text" value="<?php echo $button_text_two; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Link', 'meteorite_extensions') ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('button_link_two'); ?>" name="<?php echo $this->get_field_name('button_link_two'); ?>" type="text" value="<?php echo $button_link_two; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Target', 'meteorite_extensions') ?></em>
							<select name="<?php echo $this->get_field_name('button_target_two'); ?>" id="<?php echo $this->get_field_id('button_target_two'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('_self', '_blank');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $button_target_two == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<p><?php _e( 'Choose where to display the buttons', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('alignment'); ?>" id="<?php echo $this->get_field_id('alignment'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Left Aligned', 'Centered', 'Right Aligned');
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
		$instance['title']				= sanitize_text_field($new_instance['title']);
		$instance['button_text_one'] 	= sanitize_text_field($new_instance['button_text_one']);
		$instance['button_link_one'] 	= esc_url_raw($new_instance['button_link_one']);
		$instance['button_target_one']	= sanitize_text_field($new_instance['button_target_one']);
		$instance['button_text_two'] 	= sanitize_text_field($new_instance['button_text_two']);
		$instance['button_link_two'] 	= esc_url_raw($new_instance['button_link_two']);
		$instance['button_target_two']	= sanitize_text_field($new_instance['button_target_two']);
		$instance['alignment']			= sanitize_text_field($new_instance['alignment']);
		$instance['animation']			= sanitize_text_field($new_instance['animation']);

		return $instance;
	}
	
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 				= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			 	= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$button_text_one 	= isset( $instance['button_text_one'] ) ? esc_html($instance['button_text_one']) : '';
		$button_link_one 	= isset( $instance['button_link_one'] ) ? esc_url($instance['button_link_one']) : '';
		$button_target_one	= isset( $instance['button_target_one'] ) ? esc_attr($instance['button_target_one']) : '_self';
		$button_text_two 	= isset( $instance['button_text_two'] ) ? esc_html($instance['button_text_two']) : '';
		$button_link_two 	= isset( $instance['button_link_two'] ) ? esc_url($instance['button_link_two']) : '';
		$button_target_two	= isset( $instance['button_target_two'] ) ? esc_attr($instance['button_target_two']) : '_self';
		$alignment 		 	= isset( $instance['alignment'] ) ? esc_attr($instance['alignment']) : 'Left Aligned';
		$animation 		 	= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		$target_attr_one = '';
		if ( $button_target_one == '_blank' ) {
			$target_attr_one = '_blank';
		} elseif ( $button_target_one == '_self' ) {
			$target_attr_one = '_self';
		}

		$target_attr_two = '';
		if ( $button_target_two == '_blank' ) {
			$target_attr_two = '_blank';
		} elseif ( $button_target_two == '_self' ) {
			$target_attr_two = '_self';
		}

		if ( $alignment == 'Left Aligned' ) {
			$alignment_style = 'buttons-align-left';
		} elseif ( $alignment == 'Centered' ) {
			$alignment_style = 'buttons-align-center';
		} elseif ( $alignment == 'Right Aligned' ) {
			$alignment_style = 'buttons-align-right';
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

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; }
		?>

		<div class="meteorite-buttons-widget <?php echo $alignment_style . ' ' . $animation_class; ?>">
			<?php if ( $button_link_one ) : ?>
				<a href="<?php echo $button_link_one; ?>" target="<?php echo $target_attr_one; ?>" class="meteorite-button"><?php echo $button_text_one; ?></a>
			<?php endif; ?>
			<?php if ( $button_link_two ) : ?>
				<a href="<?php echo $button_link_two; ?>" target="<?php echo $target_attr_two; ?>" class="meteorite-button border"><?php echo $button_text_two; ?></a>
			<?php endif; ?>
        </div>
        
		<?php
		echo $args['after_widget'];

	}
	
}
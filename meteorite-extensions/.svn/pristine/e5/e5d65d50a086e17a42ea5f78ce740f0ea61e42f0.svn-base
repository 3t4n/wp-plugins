<?php
/**
 * CTA widget
 *
 * @package Meteorite
 */

class Meteorite_Action extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_action_widget', 'description' => __( 'Display a call to action block.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Call to action', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_action_widget';
	}
	
	function form($instance) {
		$title     				= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$action_text 			= isset( $instance['action_text'] ) ? wp_kses_post( force_balance_tags( $instance['action_text'] ) ) : '';
		$action_subline 		= isset( $instance['action_subline'] ) ? wp_kses_post( force_balance_tags( $instance['action_subline'] ) ) : '';
		$action_btn_text_one 	= isset( $instance['action_btn_text_one'] ) ? esc_html( $instance['action_btn_text_one'] ) : '';
		$action_btn_link_one 	= isset( $instance['action_btn_link_one'] ) ? esc_url( $instance['action_btn_link_one'] ) : '';
		$target_one 			= isset( $instance['target_one'] ) ? esc_attr( $instance['target_one'] ) : '_self';
		$action_btn_text_two 	= isset( $instance['action_btn_text_two'] ) ? esc_html( $instance['action_btn_text_two'] ) : '';
		$action_btn_link_two 	= isset( $instance['action_btn_link_two'] ) ? esc_url( $instance['action_btn_link_two'] ) : '';
		$target_two 			= isset( $instance['target_two'] ) ? esc_attr( $instance['target_two'] ) : '_self';
		$inline 				= isset( $instance['inline'] ) ? esc_attr( $instance['inline'] ) : 'Block';
		$animation 				= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
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
				<h4><?php _e( 'Call To Action', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Write a call to action headline.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control tt-form-element" id="<?php echo $this->get_field_id('action_text'); ?>" name="<?php echo $this->get_field_name('action_text'); ?>"><?php echo $action_text; ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Subline', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Describe your call to action with a little text.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control tt-form-element" id="<?php echo $this->get_field_id('action_subline'); ?>" name="<?php echo $this->get_field_name('action_subline'); ?>"><?php echo $action_subline; ?></textarea>
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
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('action_btn_text_one'); ?>" name="<?php echo $this->get_field_name('action_btn_text_one'); ?>" type="text" value="<?php echo $action_btn_text_one; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Link', 'meteorite_extensions') ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('action_btn_link_one'); ?>" name="<?php echo $this->get_field_name('action_btn_link_one'); ?>" type="text" value="<?php echo $action_btn_link_one; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Target', 'meteorite_extensions') ?></em>
							<select name="<?php echo $this->get_field_name('target_one'); ?>" id="<?php echo $this->get_field_id('target_one'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('_self', '_blank');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $target_one == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('action_btn_text_two'); ?>" name="<?php echo $this->get_field_name('action_btn_text_two'); ?>" type="text" value="<?php echo $action_btn_text_two; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Link', 'meteorite_extensions') ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('action_btn_link_two'); ?>" name="<?php echo $this->get_field_name('action_btn_link_two'); ?>" type="text" value="<?php echo $action_btn_link_two; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Target', 'meteorite_extensions') ?></em>
							<select name="<?php echo $this->get_field_name('target_two'); ?>" id="<?php echo $this->get_field_id('target_two'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('_self', '_blank');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $target_two == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'Display', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Display the button inline with the text?', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('inline'); ?>" id="<?php echo $this->get_field_id('inline'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Block', 'Inline');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $inline == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
		$instance['title'] 			 	 = sanitize_text_field($new_instance['title']);
		$instance['action_btn_text_one'] = sanitize_text_field($new_instance['action_btn_text_one']);
		$instance['action_btn_link_one'] = esc_url_raw($new_instance['action_btn_link_one']);
		$instance['target_one']			 = sanitize_text_field($new_instance['target_one']);
		$instance['action_btn_text_two'] = sanitize_text_field($new_instance['action_btn_text_two']);
		$instance['action_btn_link_two'] = esc_url_raw($new_instance['action_btn_link_two']);
		$instance['target_two']			 = sanitize_text_field($new_instance['target_two']);
		$instance['inline']			 	 = sanitize_text_field($new_instance['inline']);
		$instance['animation']		 	 = sanitize_text_field($new_instance['animation']);
		if ( current_user_can('unfiltered_html') ) {
			$instance['action_text']	= $new_instance['action_text'];
			$instance['action_subline'] = $new_instance['action_subline'];
		} else {
			$instance['action_text'] 	= stripslashes( wp_filter_post_kses( addslashes($new_instance['action_text']) ) );
			$instance['action_subline'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['action_subline']) ) );
		}

		return $instance;
	}
	
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 				 = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			 	 = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$action_text 	 	 = isset( $instance['action_text'] ) ? $instance['action_text'] : '';
		$action_subline	 	 = isset( $instance['action_subline'] ) ? $instance['action_subline'] : '';
		$action_btn_text_one = isset( $instance['action_btn_text_one'] ) ? esc_html($instance['action_btn_text_one']) : '';
		$action_btn_link_one = isset( $instance['action_btn_link_one'] ) ? esc_url($instance['action_btn_link_one']) : '';
		$target_one			 = isset( $instance['target_one'] ) ? esc_attr($instance['target_one']) : '_self';
		$action_btn_text_two = isset( $instance['action_btn_text_two'] ) ? esc_html($instance['action_btn_text_two']) : '';
		$action_btn_link_two = isset( $instance['action_btn_link_two'] ) ? esc_url($instance['action_btn_link_two']) : '';
		$target_two			 = isset( $instance['target_two'] ) ? esc_attr($instance['target_two']) : '_self';
		$inline 		 	 = isset( $instance['inline'] ) ? esc_attr($instance['inline']) : 'Block';
		$animation 		 	 = isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		$target_attr_one = '';
		if ( $target_one == '_blank' ) {
			$target_attr_one = '_blank';
		} elseif ( $target_one == '_self' ) {
			$target_attr_one = '_self';
		}

		$target_attr_two = '';
		if ( $target_two == '_blank' ) {
			$target_attr_two = '_blank';
		} elseif ( $target_two == '_self' ) {
			$target_attr_two = '_self';
		}

		if ( $inline == 'Inline' ) {
			$inline_style = 'inline-style';
		} elseif ( $inline == 'Block' ) {
			$inline_style = '';
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

		<div class="meteorite-cta <?php echo $inline_style . ' ' . $animation_class; ?>">
			<div class="cta-wrap">
				<?php if ( $action_text || $action_subline ) : ?>
				<div class="cta-content">
					<?php if ( $action_text ) : ?><h3 class="title"><?php echo $action_text; ?></h3><?php endif; ?>
					<?php if ( $action_subline ) : ?><p class="subline"><?php echo $action_subline; ?></p><?php endif; ?>
				</div>
				<?php endif; ?>
				<div class="cta-controls">
					<?php if ( $action_btn_link_one ) : ?>
						<a href="<?php echo $action_btn_link_one; ?>" target="<?php echo $target_attr_one; ?>" class="meteorite-button"><?php echo $action_btn_text_one; ?></a>
					<?php endif; ?>
					<?php if ( $action_btn_link_two ) : ?>
						<a href="<?php echo $action_btn_link_two; ?>" target="<?php echo $target_attr_two; ?>" class="meteorite-button border"><?php echo $action_btn_text_two; ?></a>
					<?php endif; ?>
				</div>
			</div>
        </div>
        
		<?php
		echo $args['after_widget'];

	}
	
}
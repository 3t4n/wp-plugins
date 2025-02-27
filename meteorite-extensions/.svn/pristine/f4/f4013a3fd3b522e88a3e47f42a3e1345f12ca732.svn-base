<?php
/**
 * List with icons widget
 *
 * @package Meteorite
 */

class Meteorite_List_With_Icons extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_list', 'description' => __('A simple icon-list widget.', 'meteorite_extensions'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('list', __('Meteorite: List With Icons','meteorite_extensions'), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$title 				= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$icon   			= isset( $instance['icon'] ) ? esc_attr( $instance['icon'] ) : 'fa-check';
		$text 				= isset( $instance['text'] ) ? esc_textarea( $instance['text'] ) : '';
		$list 				= isset( $instance['list'] ) ? esc_textarea( $instance['list'] ) : '';
		$animation 			= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
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
				<h4><?php _e( 'Text', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'This text will be displayed above the list.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control tt-form-element" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Icon', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose your icon. Example: <strong>fa-android</strong>.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo $icon; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'List', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Add your list items here.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<em class="tt-field-description"><?php _e('One item per row, start each row with <strong>^</strong>. Example: <strong>^ list item </strong>', 'meteorite_extensions'); ?></em>
							<textarea class="form-control tt-form-element" id="<?php echo $this->get_field_id('list'); ?>" name="<?php echo $this->get_field_name('list'); ?>"><?php echo $list; ?></textarea>
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

	<?php }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']		= sanitize_text_field($new_instance['title']);
		$instance['icon']		= sanitize_text_field($new_instance['icon']);
		$instance['animation']	= sanitize_text_field($new_instance['animation']);
		if ( current_user_can('unfiltered_html') ) {
			$instance['list'] = $new_instance['list'];
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['list'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['list']) ) );
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
		}

		return $instance;
	}

	function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title		= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$text		= isset( $instance['text'] ) ? $instance['text'] : '';
		$icon		= isset( $instance['icon'] ) ? esc_attr( $instance['icon'] ) : 'fa-check';
		$list		= isset( $instance['list'] ) ? $instance['list'] : '';
		$list		= preg_replace( "/\^+(.*)?/i", "<ul class='meteorite-list fa-ul'><li class='meteorite-item'><i class='fa-li fa " . esc_attr($icon) . "' aria-hidden='true'></i>$1</li></ul>", esc_html($list) );
		$list		= preg_replace( "/(\<\/ul\>\n(.*)\<ul class='meteorite-list fa-ul'\>*)+/", "", $list );
		$animation	= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

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

		echo $args['before_widget'];

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; } 
		?>

		<div class="meteorite-list-with-icons <?php echo $animation_class . $animation_single; ?>">
			<?php echo '<div class="meteorite-list-with-icons-text meteorite-item">' . wpautop( $text ) . '</div>'; ?>
			<?php echo $list; ?>
		</div>
		
		<?php
		echo $args['after_widget'];

	}
}
<?php
/**
 * Video widget
 *
 * @package Meteorite
 */

class Meteorite_Video_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_video_widget_widget', 'description' => __( 'Display a video from Youtube, Vimeo etc.', 'meteorite_extensions') );
        parent::__construct(false, $name = __('Meteorite: Video', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_video_widget';
    }
	
	function form($instance) {
		$title		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$url		= isset( $instance['url'] ) ? esc_url( $instance['url'] ) : '';
		$maxwidth	= isset( $instance['maxwidth'] ) ? absint( $instance['maxwidth'] ) : '800';
		$animation	= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
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
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Source', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Paste the URL of the video (only from a network that supports oEmbed, like Youtube, Vimeo etc.).', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Max. Width', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Max. width for the video [px].', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('maxwidth'); ?>" name="<?php echo $this->get_field_name('maxwidth'); ?>" type="text" value="<?php echo $maxwidth; ?>" />
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
		$instance['title'] 		= sanitize_text_field($new_instance['title']);
		$instance['url'] 		= esc_url_raw($new_instance['url']);
		$instance['maxwidth'] 	= absint($new_instance['maxwidth']);
		$instance['animation']	= sanitize_text_field($new_instance['animation']);  

		return $instance;
	}
	
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 		= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 		= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$url   		= isset( $instance['url'] ) ? esc_url( $instance['url'] ) : '';
		$maxwidth 	= isset( $instance['maxwidth'] ) ? absint( $instance['maxwidth'] ) : '800';
		$animation	= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

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

		if ( $url ) {
			echo '<div class="meteorite-video ' . $animation_class . '" style="max-width:' . $maxwidth . 'px;margin:0 auto;">';
				echo wp_oembed_get($url);
			echo '</div>';
		}

		echo $args['after_widget'];

	}
	
}	
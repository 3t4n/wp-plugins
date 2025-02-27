<?php

/**
 * Plugin Name: Image Widget Deluxe
 * Plugin URI: https://rommel.dk/
 * Description: A simple image widget that uses the native WordPress media manager to add widgets with and image and allowing you to change the display order of the fields via drag'n drop.
 * Author: Rommel ApS
 * Version: 2.0.1
 * Author URI: https://rommel.dk/
 */

// No direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	die( "You can't access this file directly." );
}

define( 'IMAGE_WIDGET_DELUXE_VERSION', '2.0.1' );

/**
 * Load a plugin's translated strings.
 */
add_action( 'plugins_loaded', 'image_widget_deluxe_translation' );
function image_widget_deluxe_translation() {
	load_plugin_textdomain( 'image-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Create our Image Widget.
 */
class Image_Widget_Deluxe extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'rommeled_Image', // Base ID
			__( 'Image widget Deluxe', 'image-widget' ), // Name
			[
				'description' => esc_html__( 'A widget that displays an image with title, description and a button.', 'image-widget' ),
			]
		);

		// Enqueue the JS and styles for the backend.
		foreach ( [ 'admin_enqueue_scripts', 'customize_controls_enqueue_scripts' ] as $hook ) {
			add_action( $hook, [ $this, 'scripts_backend' ], 99 );
		}

		// Enqueue the JS and styles for the front-end.
		add_action( 'enqueue_scripts', [ $this, 'scripts_frontend' ] );
	}

	/**
	 * Widget Scripts for the backend.
	 */
	public function scripts_backend() {
		wp_enqueue_media();
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_style( 'image-widget-deluxe', plugins_url( 'css/image-widget-backend.css', __FILE__ ), '', IMAGE_WIDGET_DELUXE_VERSION );
		wp_enqueue_script( 'image-widget-deluxe', plugins_url( 'js/media.js', __FILE__ ), [
			'jquery',
			'media-upload',
			'media-views'
		], IMAGE_WIDGET_DELUXE_VERSION, true );
		wp_localize_script( 'image-widget-deluxe', 'ImageWidgetDeluxe', [
			'frame_title'  => esc_html__( 'Select an Image', 'image-widget' ),
			'button_title' => esc_html__( 'Use this Image', 'image-widget' ),
		] );
	}

	/**
	 * Custom CSS for front-end.
	 */
	public function scripts_frontend() {
		?>
		<style>
			.rommeled_widget_image-field .img-round {
				-moz-border-radius: 50%;
				-webkit-border-radius: 50%;
				border-radius: 50%;
			}
		</style>
		<?php
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		$sort             = ! empty( $instance['sort'] ) ? esc_attr( $instance['sort'] ) : '';
		$image            = ! empty( $instance['image'] ) ? esc_attr( $instance['image'] ) : '';
		$widget_title     = ! empty( $instance['title'] ) ? apply_filters( 'widget_title', esc_attr( $instance['title'] ) ) : '';
		$inner_title      = ! empty( $instance['inner-title'] ) ? esc_attr( $instance['inner-title'] ) : '';
		$text             = ! empty( $instance['text'] ) ? $instance['text'] : '';
		$url              = ! empty( $instance['url'] ) ? esc_attr( $instance['url'] ) : '';
		$url_target       = ! empty( $instance['url_target'] ) ? esc_attr( $instance['url_target'] ) : '';
		$button           = ! empty( $instance['button'] ) ? esc_attr( $instance['button'] ) : '';
		$size             = ! empty( $instance['size'] ) ? esc_attr( $instance['size'] ) : '';
		$style            = ! empty( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';
		$widget_id        = ! empty( $args['widget_id'] ) ? esc_attr( $args['widget_id'] ) : '';
		$title_visibility = ! empty( $instance['title-visibility'] ) ? esc_attr( $instance['title-visibility'] ) : '';
		$widget_content   = '';

		// Add out custom class.
		$args['class'] = ! empty( $instance['class_custom'] ) ? $args['class'] . ' ' . esc_attr( $instance['class_custom'] ) : $args['class'];

		// Find the order of our widget fields.
		$fields = ! empty( $sort ) ? explode( ',', $sort ) : [ 'no-sort' ];

		// Attribute for Target.
		$attr_target = ! empty( $url_target ) ? 'target="' . $url_target . '" ' : '';

		// Loops through each field type in the widget.
		foreach ( $fields as $field ) {
			$field_class = 'rommeled_widget_image-field';

			// Inner Title.
			if ( $field == $widget_id . '-inner-title' && ! empty( $inner_title ) || $field == 'no-sort' && ! empty( $inner_title ) ) {
				$widget_content .= '<h3 class="' . $field_class . ' rommeled_widget_image-inner-title">' . $inner_title . '</h3>';
			}

			$field_class = "$field_class rommeled_widget_image";

			// The image.
			if ( $field == $widget_id . '-image' && ! empty( $image ) || $field == 'no-sort' && ! empty( $image ) ) {
				$widget_content .= '<p class="' . $field_class . '-image">';

				// Grab the image and make an array with url and id.
				$image = explode( '?id=', $image );

				// Get the image alt tag.
				$alt_text = ! empty( $alt = get_post_meta( $image[1], '_wp_attachment_image_alt', true ) ) ? $alt : '';

				// Get the image.
				$widget_image   = wp_get_attachment_image( $image[1], $size, false, [
					'class' => $style,
					'alt'   => $alt_text
				] );
				$widget_content .= $this->wrap_in_href( $widget_image, $url, $attr_target );
				$widget_content .= '</p>';
			}

			// Text.
			if ( $field == $widget_id . '-text' && ! empty( $text ) || $field === 'no-sort' && ! empty( $text ) ) {
				$widget_content .= '<p class="' . $field_class . '-text">' . $text . '</p>';
			}

			// Button.
			if ( $field == $widget_id . '-button' && ! empty( $url ) && ! empty( $button ) || $field === 'no-sort' && ! empty( $url ) && ! empty( $button ) ) {
				$widget_content .= '<p class="' . $field_class . '-button">';
				$widget_content .= '<a ' . $attr_target . ' href="' . $url . '" class="button btn">' . $button . '</a></p>';
			}
		}

		// Begin the widget.
		echo $args['before_widget'];

		// Widget title.
		if ( ! empty( $widget_title ) && $title_visibility == 'on' ) {
			echo $args['before_title'] . $widget_title . $args['after_title'];
		}

		echo '<span class="rommeled_widget_image_inner ' . $args['class'] . '">' . $widget_content . '</span>';

		// End the widget.
		echo $args['after_widget'];
	}

	/**
	 * Wrap widget content in link.
	 *
	 * @param $content
	 * @param $url
	 * @param $attr_string
	 *
	 * @return string
	 */
	public function wrap_in_href( $content, $url, $attr_string ) {
		$data = '';
		if ( ! empty( $url ) ) {
			$data .= '<a ' . $attr_string . ' href="' . $url . '">';
		}
		$data .= $content;
		if ( ! empty( $url ) ) {
			$data .= '</a>';
		}

		return $data;
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$sort             = ! empty( $instance['sort'] ) ? esc_attr( $instance['sort'] ) : '';
		$image            = ! empty( $instance['image'] ) ? esc_attr( $instance['image'] ) : '';
		$title            = ! empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$inner_title      = ! empty( $instance['inner-title'] ) ? esc_attr( $instance['inner-title'] ) : '';
		$text             = ! empty( $instance['text'] ) ? $instance['text'] : '';
		$url              = ! empty( $instance['url'] ) ? esc_attr( $instance['url'] ) : '';
		$url_target       = ! empty( $instance['url_target'] ) ? esc_attr( $instance['url_target'] ) : '';
		$button           = ! empty( $instance['button'] ) ? esc_attr( $instance['button'] ) : '';
		$size             = ! empty( $instance['size'] ) ? esc_attr( $instance['size'] ) : '';
		$style            = ! empty( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';
		$title_visibility = ! empty( $instance['title-visibility'] ) ? esc_attr( $instance['title-visibility'] ) : '';
		$class_custom     = ! empty( $instance['class_custom'] ) ? esc_attr( $instance['class_custom'] ) : '';

		// Make the order array.
		$fields = ! empty( $sort ) ? explode( ',', $sort ) : [ 'no-order' ];

		// Hide the image.
		$image_options = ! empty( $image ) ? 'style="display:block;"' : 'style="display:none;"';

		?>
		<p id="<?= $this->id . '-title'; ?>">
			<label for="<?= $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title', 'image-widget' ); ?></label>
			<input class="widefat" id="<?= $this->get_field_id( 'title' ); ?>"
				   name="<?= $this->get_field_name( 'title' ); ?>" type="text"
				   value="<?= esc_attr( $title ); ?>">
		</p>

		<div class="widget-image-sortable">

			<?php foreach ( $fields as $field ) { ?>

				<?php if ( $field == $this->id . '-inner-title' || $field === 'no-order' ) : ?>

					<p id="<?= $this->id . '-inner-title'; ?>">
						<label for="<?= $this->get_field_id( 'inner-title' ); ?>"><?php _e( 'Title', 'image-widget' ); ?></label>
						<input class="widefat" id="<?= $this->get_field_id( 'inner-title' ); ?>"
							   name="<?= $this->get_field_name( 'inner-title' ); ?>" type="text"
							   value="<?= esc_attr( $inner_title ); ?>">
						<small><?php _e( 'Add a title that will be displayed inside the widget', 'image-widget' ); ?>.
						</small>
					</p>

				<?php endif; ?>

				<?php if ( $field == $this->id . '-image' || $field === 'no-order' ) : ?>
					<p id="<?= $this->id . '-image'; ?>">
						<label for="select-image"><?php _e( 'Image', 'image-widget' ); ?></label>
						<span data-parent="<?= $this->get_field_id( 'title' ); ?>"
							  data-image-id="<?= $this->get_field_id( 'image' ); ?>"
							  class="widefat button image-widget-deluxe--select-image"><?php _e( 'Select image', 'image-widget' ); ?></span>
						<input class="widefat" id="<?= $this->get_field_id( 'image' ); ?>"
							   data-image-options="<?= $this->get_field_id( 'image_options' ); ?>"
							   name="<?= $this->get_field_name( 'image' ); ?>" type="hidden"
							   value="<?= esc_attr( $image ); ?>">

						<?php if ( ! empty( $image ) ) {
							echo '<img id="' . $this->get_field_id( "image" ) . '-preview" class="image-widget-deluxe--preview-image" src="' . esc_attr( $image ) . '">';
							$imageRemoveStyle = 'style="display:block;"';
						} else {
							echo '<img id="' . $this->get_field_id( "image" ) . '-preview" ' . $image_options . ' class="image-widget-deluxe--preview-image" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D">';
							$imageRemoveStyle = 'style="display:none;"';
						}
						?>
						<a id="<?= $this->get_field_id( 'image' ); ?>-remove" <?= $imageRemoveStyle; ?> href="#"
						   data-image-id="<?= $this->get_field_id( 'image' ); ?>"
						   class="image-widget-deluxe--remove-image">⊗</a>
					</p>

				<?php endif; ?>

				<?php if ( $field == $this->id . '-text' || $field === 'no-order' ) : ?>

					<p id="<?= $this->id . '-text'; ?>">
						<label for="<?= $this->get_field_id( 'text' ); ?>"><?php _e( 'Text', 'image-widget' ); ?></label>
						<textarea rows="5" class="widefat" id="<?= $this->get_field_id( 'text' ); ?>"
								  name="<?= $this->get_field_name( 'text' ); ?>"><?= format_to_edit( $text ); ?></textarea>
						<small><?php _e( 'Add or edit a description for the widget', 'image-widget' ); ?>.</small>
					</p>

				<?php endif; ?>
				<?php if ( $field == $this->id . '-button' || $field === 'no-order' ) : ?>

					<p id="<?= $this->id . '-button'; ?>">
						<label for="<?= $this->get_field_id( 'button' ); ?>"><?php _e( 'Button', 'image-widget' ); ?></label>
						<input class="widefat" id="<?= $this->get_field_id( 'button' ); ?>"
							   name="<?= $this->get_field_name( 'button' ); ?>" type="text"
							   value="<?= esc_attr( $button ); ?>">
						<small><?php _e( 'Add a text that will be displayed in the button', 'image-widget' ); ?>.
						</small>
					</p>

				<?php endif; ?>
			<?php } ?>
		</div>

		<?php // Sorting options. ?>
		<input class="widefat image-widget-sort-order" id="<?= $this->get_field_id( 'sort' ); ?>"
			   name="<?= $this->get_field_name( 'sort' ); ?>" type="hidden"
			   value="<?= esc_attr( $sort ); ?>">

		<?php // Url. ?>
		<p>
			<label for="<?= $this->get_field_id( 'url' ); ?>"><?php _e( 'Link', 'image-widget' ); ?></label>
			<input class="widefat" id="<?= $this->get_field_id( 'url' ); ?>"
				   name="<?= $this->get_field_name( 'url' ); ?>" type="text"
				   value="<?= esc_attr( $url ); ?>">
			<small><?php _e( 'Add an url that the widget should refer to (Button and Image)', 'image-widget' ); ?>.
			</small>
		</p>

		<?php // Advanced options. ?>
		<div id="<?= $this->get_field_id( 'image_options' ); ?>" class="non-sortable" <?= $image_options; ?>>
			<input id="<?= $this->get_field_id( 'image_options' ); ?>-checkbox" type="checkbox" style="display: none;"
				   class="imageWidgetDeluxeShowImageOptions">
			<label class="button-link"
				   for="<?= $this->get_field_id( 'image_options' ); ?>-checkbox"><?= esc_html__( 'Show more options', 'image-widget' ); ?></label>
			<div class="imageWidgetDeluxeOptions" style="display: none;">
				<h4><?php _e( 'Widget Options', 'image-widget' ); ?></h4>

				<p id="<?= $this->id . '-title-visibility'; ?>">
					<label for="<?= $this->get_field_id( 'title-visibility' ); ?>">
						<input <?php checked( 'on', esc_attr( $title_visibility ), true ); ?>
								id="<?= $this->get_field_id( 'title-visibility' ); ?>"
								name="<?= $this->get_field_name( 'title-visibility' ); ?>"
								type="checkbox"> <?php _e( 'Show widget title on front-end', 'image-widget' ); ?>
					</label>
				</p>

				<?php // Image options (Url target). ?>
				<label for="<?= $this->get_field_id( 'url_target' ); ?>">
					<?php _e( 'Link target', 'image-widget' ); ?>
					<select class='widefat' id="<?= $this->get_field_id( 'url_target' ); ?>"
							name="<?= $this->get_field_name( 'url_target' ); ?>">
						<?php $targets = [
							''       => esc_html__( 'Same window', 'image-widget' ),
							'_blank' => esc_html__( 'New window', 'image-widget' ),
						];
						foreach ( $targets as $target => $target_type ) : ?>
							<option value="<?= $target; ?>" <?php selected( $target, $url_target, true ); ?>><?= $target_type; ?></option>
						<?php endforeach; ?>
					</select>
				</label>

				<?php // Image options (Style). ?>
				<label for="<?= $this->get_field_id( 'style' ); ?>">
					<?php _e( 'Select a style for the image', 'image-widget' ); ?>
					<select class='widefat' id="<?= $this->get_field_id( 'style' ); ?>"
							name="<?= $this->get_field_name( 'style' ); ?>">
						<?php $img_styles = [
							'img-square' => esc_html__( 'Square', 'image-widget' ),
							'img-round'  => esc_html__( 'Round', 'image-widget' ),
						];
						foreach ( $img_styles as $img_style => $img_style_name ) : ?>
							<option value="<?= $img_style; ?>" <?php selected( $img_style, $style, true ); ?>><?= $img_style_name; ?></option>
						<?php endforeach; ?>
					</select>
				</label>

				<?php // Image options (Size). ?>
				<label for="<?= $this->get_field_id( 'size' ); ?>">
					<?php _e( 'Set an image size', 'image-widget' ); ?>
					<select class='widefat' id="<?= $this->get_field_id( 'size' ); ?>"
							name="<?= $this->get_field_name( 'size' ); ?>">
						<?php foreach ( $this->image_widget_deluxe_get_image_sizes() as $img_size => $image ) : ?>
							<option value="<?= $img_size; ?>" <?php selected( $size, $img_size, true ); ?>><?= $img_size; ?></option>
						<?php endforeach; ?>
					</select>
				</label>

				<?php // Image options (Custom class). ?>
				<label for="<?= $this->get_field_id( 'class_custom' ); ?>">
					<?php _e( 'Custom class. Multiple classes needs spaces between.', 'image-widget' ); ?>
					<input class="widefat" id="<?= $this->get_field_id( 'class_custom' ); ?>"
						   name="<?= $this->get_field_name( 'class_custom' ); ?>" type="text"
						   value="<?= esc_attr( $class_custom ); ?>">
				</label>
			</div>
		</div>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 * @see WP_Widget::update()
	 *
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                     = [];
		$instance['sort']             = ( ! empty( $new_instance['sort'] ) ) ? strip_tags( $new_instance['sort'] ) : '';
		$instance['image']            = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		$instance['title']            = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['inner-title']      = ( ! empty( $new_instance['inner-title'] ) ) ? strip_tags( $new_instance['inner-title'] ) : '';
		$instance['text']             = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
		$instance['button']           = ( ! empty( $new_instance['button'] ) ) ? strip_tags( $new_instance['button'] ) : '';
		$instance['url']              = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		$instance['url_target']       = ( ! empty( $new_instance['url_target'] ) ) ? strip_tags( $new_instance['url_target'] ) : '';
		$instance['size']             = ( ! empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '';
		$instance['style']            = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
		$instance['title-visibility'] = ( ! empty( $new_instance['title-visibility'] ) ) ? strip_tags( $new_instance['title-visibility'] ) : '';
		$instance['class_custom']     = ( ! empty( $new_instance['class_custom'] ) ) ? strip_tags( $new_instance['class_custom'] ) : '';

		return $instance;
	}

	/**
	 * Retrieve all image sizes.
	 *
	 * @param string $size
	 *
	 * @return mixed
	 */
	public function image_widget_deluxe_get_image_sizes( $size = '' ) {
		global $_wp_additional_image_sizes;

		// Create the full array with sizes and crop info.
		foreach ( get_intermediate_image_sizes() as $_size ) {

			if ( in_array( $_size, [ 'thumbnail', 'medium', 'large' ] ) ) {
				$sizes[ $_size ]['width']  = get_option( $_size . '_size_w' );
				$sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
				$sizes[ $_size ]['crop']   = (bool) get_option( $_size . '_crop' );

			} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
				$sizes[ $_size ] = [
					'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
					'height' => $_wp_additional_image_sizes[ $_size ]['height'],
					'crop'   => $_wp_additional_image_sizes[ $_size ]['crop']
				];
			}
		}

		// Retrieve custom size, if exists.
		if ( isset( $sizes[ $size ] ) ) {
			return $sizes[ $size ];
		}

		// Adding the full image size as it won't be stored anywhere.
		$sizes['full'] = [
			'width'  => '',
			'height' => '',
			'crop'   => false
		];

		return $sizes;
	}
}

/**
 * Add our widget.
 *
 */
add_action( 'widgets_init', function () {
	register_widget( 'Image_Widget_Deluxe' );
} );

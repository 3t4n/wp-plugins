<?php
/**
 * Pricing table widget
 *
 * @package Meteorite
 */

class Meteorite_Pricing_Table extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_pricing_table_widget', 'description' => __( 'Show what plans you are able to provide.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Pricing Table', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_pricing_table_widget';
	}
	
	function form($instance) {
		$title				= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type 				= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Default';
		$headline			= isset( $instance['headline'] ) ? esc_attr( $instance['headline'] ) : '';
		$price 				= isset( $instance['price'] ) ? wp_kses_post( $instance['price'] ) : '';
		$button_text 		= isset( $instance['button_text'] ) ? esc_html( $instance['button_text'] ) : '';
		$button_link		= isset( $instance['button_link'] ) ? esc_url( $instance['button_link'] ) : '';
		$icon				= isset( $instance['icon'] ) ? esc_attr( $instance['icon'] ) : '';
		$featured			= isset( $instance['featured'] ) ? esc_attr( $instance['featured'] ) : 'No';
		$features 			= isset( $instance['features'] ) ? wp_kses_post( $instance['features'] ) : '';
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
				<h4><?php _e( 'Type', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a widget type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('type'); ?>" id="<?php echo $this->get_field_id('type'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Default', 'Style 2', 'Style 3');
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
				<h4><?php _e( 'Headline', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter your headline for this plan here.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" type="text" value="<?php echo $headline; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Price', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the price for this plan.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('price'); ?>" name="<?php echo $this->get_field_name('price'); ?>" value="<?php echo $price; ?>">
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
				<h4><?php _e( 'Button Text', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'The text for the button.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Button Link', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'The URL for your button.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('button_link'); ?>" name="<?php echo $this->get_field_name('button_link'); ?>" type="text" value="<?php echo $button_link; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Featured', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Display this plan as featured.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('featured'); ?>" id="<?php echo $this->get_field_id('featured'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $featured == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'Features', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Add the features for this plan.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<em class="tt-field-description"><?php _e('One item per row, start each row with <strong>^</strong>. Example: <strong>^ Feature 1 </strong>', 'meteorite_extensions'); ?></em>
							<textarea class="form-control tt-form-element" id="<?php echo $this->get_field_id('features'); ?>" name="<?php echo $this->get_field_name('features'); ?>"><?php echo $features; ?></textarea>
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

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= sanitize_text_field($new_instance['title']);
		$instance['type'] 			= sanitize_text_field($new_instance['type']);
		$instance['headline'] 		= sanitize_text_field($new_instance['headline']);
		$instance['price'] 			= wp_kses_post($new_instance['price']);
		$instance['button_text']	= sanitize_text_field($new_instance['button_text']);
		$instance['button_link'] 	= esc_url_raw($new_instance['button_link']);
		$instance['icon'] 			= sanitize_text_field($new_instance['icon']);
		$instance['featured'] 		= sanitize_text_field($new_instance['featured']);
		$instance['animation'] 		= sanitize_text_field($new_instance['animation']);
		if ( current_user_can('unfiltered_html') ) {
			$instance['features'] =  $new_instance['features'];
		} else {
			$instance['features'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['features']) ) );
		}

		return $instance;
	}

	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 			= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$type 			= isset( $instance['type'] ) ? esc_attr($instance['type']) : 'Default';
		$headline   	= isset( $instance['headline'] ) ? esc_attr( $instance['headline'] ) : '';
		$price 			= isset( $instance['price'] ) ? wp_kses_post($instance['price']) : '';
		$button_text	= isset( $instance['button_text'] ) ? esc_html( $instance['button_text'] ) : '';
		$button_link 	= isset( $instance['button_link'] ) ? esc_url($instance['button_link']) : '';
		$icon 			= isset( $instance['icon'] ) ? esc_attr($instance['icon']) : '';
		$featured		= isset( $instance['featured'] ) ? esc_attr( $instance['featured'] ) : 'No';
		$animation		= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';
		$features 		= isset( $instance['features'] ) ? wp_kses_post( $instance['features'] ) : '';
		$features 		= preg_replace( "/\^+(.*)?/i", "<div class='plan-feature'>$1</div>", $features );
		$features 		= preg_replace( "/(\<\/ul\>\n(.*)\<ul class='meteorite-list fa-ul'\>*)+/", "", $features );

		$type_class = 'style-1';
		if ( $type == 'Style 2' ) {
			$type_class = 'style-2';
		} elseif ( $type == 'Style 3' ) {
			$type_class = 'style-3';
		}


		$featured_class = '';
		if ( $featured == 'Yes' ) {
			$featured_class = 'featured-plan';
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

		<div class="meteorite-pricing-table <?php echo $animation_class . ' ' . $featured_class . ' ' . $type_class; ?>">
			<div class="plan-header">
				<?php if ( 'Yes' == $featured ) : ?>
					<div class="featured-plan-symbol">
						<span class="featured-plan-ribbon"></span>
					</div>
				<?php endif; ?>
				<?php if ( $icon ) : ?>
					<div class="plan-icon">
						<i class="fa <?php echo $icon; ?>"></i>
					</div>
				<?php endif; ?>
				<?php if ( $headline ) : ?>
					<div class="plan-headline">
						<h3><?php echo $headline; ?></h3>
					</div>
				<?php endif; ?>
				<?php if ( $price ) : ?>
					<div class="plan-price">
						<?php echo $price; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( $features ) : ?>
				<div class="plan-features">
					<?php echo $features; ?>
				</div>
			<?php endif; ?>
			<?php if ( $button_link ) : ?>
				<div class="plan-btn">
					<a class="meteorite-button" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
				</div>
			<?php endif; ?>	
		</div>
		
		<?php
		echo $args['after_widget'];

	}
	
}
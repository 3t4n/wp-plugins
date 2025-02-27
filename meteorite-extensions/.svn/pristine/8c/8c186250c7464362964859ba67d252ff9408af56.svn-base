<?php
/**
 * Contact info widget
 *
 * @package Meteorite
 */

class Meteorite_Contact_Info extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_contact_info_widget', 'description' => __( 'Display your contact information.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Contact info', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_contact_info_widget';
	}
	
	function form($instance) {
		$title     	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type 		= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Inline';
		$address 	= isset( $instance['address'] ) ? esc_html( $instance['address'] ) : '';
		$phone 		= isset( $instance['phone'] ) ? esc_html( $instance['phone'] ) : '';
		$phoneClick	= isset( $instance['phoneClick'] ) ? esc_attr( $instance['phoneClick'] ) : 'No';
		$phoneLink	= isset( $instance['phoneLink'] ) ? esc_attr( $instance['phoneLink'] ) : '';
		$email 		= isset( $instance['email'] ) ? sanitize_email( $instance['email'] ) : '';
		$animation 	= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
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
				<h4><?php _e( 'Type', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a widget type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('type'); ?>" id="<?php echo $this->get_field_id('type'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Inline', 'Block');
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
				<h4><?php _e( 'Adress', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter your address.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Phone', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose your preferences.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Telephone number', 'meteorite_extensions') ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Clickable phone number?', 'meteorite_extensions') ?></em>
							<select name="<?php echo $this->get_field_name('phoneClick'); ?>" id="<?php echo $this->get_field_id('phoneClick'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $phoneClick == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Linked phone number', 'meteorite_extensions') ?></em>
							<input class="form-control tt-form-element" placeholder="<?php _e('e.g. +4712345678', 'meteorite_extensions'); ?>" id="<?php echo $this->get_field_id('phoneLink'); ?>" name="<?php echo $this->get_field_name('phoneLink'); ?>" type="text" value="<?php echo $phoneLink; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'E-mail', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter your e-mail.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
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

	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 		= sanitize_text_field($new_instance['title']);
		$instance['type'] 		= sanitize_text_field($new_instance['type']);
		$instance['address'] 	= sanitize_text_field($new_instance['address']);
		$instance['phone'] 		= sanitize_text_field($new_instance['phone']);
		$instance['phoneClick'] = sanitize_text_field($new_instance['phoneClick']);
		$instance['phoneLink'] 	= sanitize_text_field($new_instance['phoneLink']);
		$instance['email'] 		= sanitize_text_field($new_instance['email']);
		$instance['animation'] 	= sanitize_text_field($new_instance['animation']);

		return $instance;
	}
	
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 		= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 		= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$type   	= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Inline';
		$address   	= isset( $instance['address'] ) ? esc_html( $instance['address'] ) : '';
		$phone   	= isset( $instance['phone'] ) ? esc_html( $instance['phone'] ) : '';
		$phoneClick	= isset( $instance['phoneClick'] ) ? esc_attr($instance['phoneClick']) : 'No';
		$phoneLink	= isset( $instance['phoneLink'] ) ? esc_attr($instance['phoneLink']) : '';
		$email   	= isset( $instance['email'] ) ? sanitize_email( $instance['email'] ) : '';
		$animation 	= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

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

		<?php if ( $type == 'Block' ) { ?>
			<div class="meteorite-contact-info block <?php echo $animation_class . $animation_single ?>">
				<?php
				if( $address ) {
					echo '<div class="contact-address meteorite-item">';
					echo '<span><i class="fa fa-home"></i></span>' . $address;
					echo '</div>';
				}
				if( $phone ) {
					echo '<div class="contact-phone meteorite-item">';
					if ( $phoneClick == "Yes" && $phoneLink != "" ) {
						echo '<span><i class="fa fa-phone"></i></span><a href="tel:' . $phoneLink . '">' . $phone . '</a>';
					} else {
						echo '<span><i class="fa fa-phone"></i></span>' . $phone;
					}
					echo '</div>';
				}
				if( $email ) {
					echo '<div class="contact-email meteorite-item">';
					echo '<span><i class="fa fa-envelope"></i></span>' . '<a href="mailto:' . $email . '">' . $email . '</a>';
					echo '</div>';
				} ?>
	        </div>
		<?php } elseif ( $type == 'Inline' ) { ?>
			<div class="meteorite-contact-info inline row clearfix <?php echo $animation_class . $animation_single ?>">
				<?php
				if( $address ) {
					echo '<div class="contact-address col-md-4 col-sm-4 meteorite-item">';
					echo '<span><i class="fa fa-home"></i></span>' . $address;
					echo '</div>';
				}
				if( $phone ) {
					echo '<div class="contact-phone col-md-4 col-sm-4 meteorite-item">';
					if ( $phoneClick == "Yes" && $phoneLink != "" ) {
						echo '<span><i class="fa fa-phone"></i></span><a href="tel:' . $phoneLink . '">' . $phone . '</a>';
					} else {
						echo '<span><i class="fa fa-phone"></i></span>' . $phone;
					}
					echo '</div>';
				}
				if( $email ) {
					echo '<div class="contact-email col-md-4 col-sm-4 meteorite-item">';
					echo '<span><i class="fa fa-envelope"></i></span>' . '<a href="mailto:' . $email . '">' . $email . '</a>';
					echo '</div>';
				} ?>
			</div>
		<?php }

		echo $args['after_widget'];

	}
	
}
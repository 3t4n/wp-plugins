<?php
/**
 * Facts widget
 *
 * @package Meteorite
 */

class Meteorite_Facts extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_facts_widget', 'description' => __( 'Show some facts about you or your company.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Facts', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_facts_widget';
	}
	
	function form($instance) {
		$title				= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type 				= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Default';
		$count_me 			= isset( $instance['count_me'] ) ? esc_attr( $instance['count_me'] ) : 'Yes';
		$speed				= isset( $instance['speed'] ) ? absint( $instance['speed'] ) : 2000;
		$fact_one			= isset( $instance['fact_one'] ) ? esc_html( $instance['fact_one'] ) : '';
		$fact_one_max		= isset( $instance['fact_one_max'] ) ? esc_html( $instance['fact_one_max'] ) : '';
		$fact_one_icon		= isset( $instance['fact_one_icon'] ) ? esc_attr( $instance['fact_one_icon'] ) : '';
		$fact_two			= isset( $instance['fact_two'] ) ? esc_html( $instance['fact_two'] ) : '';
		$fact_two_max		= isset( $instance['fact_two_max'] ) ? esc_html( $instance['fact_two_max'] ) : '';
		$fact_two_icon		= isset( $instance['fact_two_icon'] ) ? esc_attr( $instance['fact_two_icon'] ) : '';
		$fact_three			= isset( $instance['fact_three'] ) ? esc_html( $instance['fact_three'] ) : '';
		$fact_three_max		= isset( $instance['fact_three_max'] ) ? esc_html( $instance['fact_three_max'] ) : '';
		$fact_three_icon	= isset( $instance['fact_three_icon'] ) ? esc_attr( $instance['fact_three_icon'] ) : '';
		$fact_four			= isset( $instance['fact_four'] ) ? esc_html( $instance['fact_four'] ) : '';
		$fact_four_max		= isset( $instance['fact_four_max'] ) ? esc_html( $instance['fact_four_max'] ) : '';
		$fact_four_icon		= isset( $instance['fact_four_icon'] ) ? esc_attr( $instance['fact_four_icon'] ) : '';
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
				<p><?php _e('Disable the value animation in the counter options below in order to be able to use delimiter, prefix or suffix characters.', 'meteorite_extensions'); ?></p>
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
							$options = array('Default', 'Icon Left');
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
				<h4><?php _e( 'Counter Options', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose your preferences.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Animate the values?', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('count_me'); ?>" id="<?php echo $this->get_field_id('count_me'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Yes', 'No');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $count_me == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Count Speed [Default: 2000ms]', 'meteorite_extensions' ); ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('speed'); ?>" name="<?php echo $this->get_field_name('speed'); ?>" type="text" value="<?php echo $speed; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'First Fact', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter details for the first fact.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_one'); ?>" name="<?php echo $this->get_field_name('fact_one'); ?>" value="<?php echo $fact_one; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_one_max'); ?>" name="<?php echo $this->get_field_name('fact_one_max'); ?>" value="<?php echo $fact_one_max; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Icon', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_one_icon'); ?>" name="<?php echo $this->get_field_name('fact_one_icon'); ?>" value="<?php echo $fact_one_icon; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Second Fact', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter details for the second fact.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_two'); ?>" name="<?php echo $this->get_field_name('fact_two'); ?>" value="<?php echo $fact_two; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_two_max'); ?>" name="<?php echo $this->get_field_name('fact_two_max'); ?>" value="<?php echo $fact_two_max; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Icon', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_two_icon'); ?>" name="<?php echo $this->get_field_name('fact_two_icon'); ?>" value="<?php echo $fact_two_icon; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Third Fact', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter details for the third fact.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_three'); ?>" name="<?php echo $this->get_field_name('fact_three'); ?>" value="<?php echo $fact_three; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_three_max'); ?>" name="<?php echo $this->get_field_name('fact_three_max'); ?>" value="<?php echo $fact_three_max; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Icon', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_three_icon'); ?>" name="<?php echo $this->get_field_name('fact_three_icon'); ?>" value="<?php echo $fact_three_icon; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Fourth Fact', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter details for the fourth fact.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_four'); ?>" name="<?php echo $this->get_field_name('fact_four'); ?>" value="<?php echo $fact_four; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_four_max'); ?>" name="<?php echo $this->get_field_name('fact_four_max'); ?>" value="<?php echo $fact_four_max; ?>">
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Icon', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('fact_four_icon'); ?>" name="<?php echo $this->get_field_name('fact_four_icon'); ?>" value="<?php echo $fact_four_icon; ?>">
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

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 				= sanitize_text_field($new_instance['title']);
		$instance['type'] 				= sanitize_text_field($new_instance['type']);
		$instance['count_me'] 			= sanitize_text_field($new_instance['count_me']);
		$instance['speed'] 				= absint($new_instance['speed']);
		$instance['fact_one'] 			= sanitize_text_field($new_instance['fact_one']);
		$instance['fact_one_max'] 		= sanitize_text_field($new_instance['fact_one_max']);
		$instance['fact_one_icon'] 		= sanitize_text_field($new_instance['fact_one_icon']);
		$instance['fact_two'] 			= sanitize_text_field($new_instance['fact_two']);
		$instance['fact_two_max'] 		= sanitize_text_field($new_instance['fact_two_max']);
		$instance['fact_two_icon'] 		= sanitize_text_field($new_instance['fact_two_icon']);
		$instance['fact_three'] 		= sanitize_text_field($new_instance['fact_three']);
		$instance['fact_three_max']		= sanitize_text_field($new_instance['fact_three_max']);
		$instance['fact_three_icon'] 	= sanitize_text_field($new_instance['fact_three_icon']);
		$instance['fact_four'] 			= sanitize_text_field($new_instance['fact_four']);
		$instance['fact_four_max'] 		= sanitize_text_field($new_instance['fact_four_max']);
		$instance['fact_four_icon'] 	= sanitize_text_field($new_instance['fact_four_icon']);
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
		$type 				= isset( $instance['type'] ) ? esc_attr($instance['type']) : 'Default';
		$count_me 			= isset( $instance['count_me'] ) ? esc_attr($instance['count_me']) : 'Yes';
		$speed 				= ( ! empty( $instance['speed'] ) ) ? absint( $instance['speed'] ) : 2000;
		$fact_one			= isset( $instance['fact_one'] ) ? esc_html( $instance['fact_one'] ) : '';
		$fact_one_icon		= isset( $instance['fact_one_icon'] ) ? esc_attr( $instance['fact_one_icon'] ) : '';
		$fact_two			= isset( $instance['fact_two'] ) ? esc_html( $instance['fact_two'] ) : '';
		$fact_two_icon		= isset( $instance['fact_two_icon'] ) ? esc_attr( $instance['fact_two_icon'] ) : '';
		$fact_three			= isset( $instance['fact_three'] ) ? esc_html( $instance['fact_three'] ) : '';
		$fact_three_icon	= isset( $instance['fact_three_icon'] ) ? esc_attr( $instance['fact_three_icon'] ) : '';
		$fact_four			= isset( $instance['fact_four'] ) ? esc_html( $instance['fact_four'] ) : '';	
		$fact_four_icon		= isset( $instance['fact_four_icon'] ) ? esc_attr( $instance['fact_four_icon'] ) : '';
		$animation			= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		if ( $count_me == 'Yes' ) :
			$fact_one_max		= isset( $instance['fact_one_max'] ) ? absint( $instance['fact_one_max'] ) : '';
			$fact_two_max		= isset( $instance['fact_two_max'] ) ? absint( $instance['fact_two_max'] ) : '';
			$fact_three_max		= isset( $instance['fact_three_max'] ) ? absint( $instance['fact_three_max'] ) : '';
			$fact_four_max		= isset( $instance['fact_four_max'] ) ? absint( $instance['fact_four_max'] ) : '';
		else :
			$fact_one_max		= isset( $instance['fact_one_max'] ) ? esc_html( $instance['fact_one_max'] ) : '';
			$fact_two_max		= isset( $instance['fact_two_max'] ) ? esc_html( $instance['fact_two_max'] ) : '';
			$fact_three_max		= isset( $instance['fact_three_max'] ) ? esc_html( $instance['fact_three_max'] ) : '';
			$fact_four_max		= isset( $instance['fact_four_max'] ) ? esc_html( $instance['fact_four_max'] ) : '';

		endif;

		$count_me_class = '';
		if ( $count_me == 'Yes' ) {
			$count_me_class = 'count-me';
		}

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

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; } ?>

		<div class="meteorite-facts row clearfix <?php echo $animation_class . $animation_single; ?>">
			<?php if ( $type == 'Default' ) { ?>
				<div class="type-default clearfix">
					<?php if ( $fact_one != '' ) : ?>
						<div class="fact-item <?php echo $count_me_class; ?> meteorite-item col-md-3 col-sm-3">
							<div class="fact-icon"><i class="fa <?php echo $fact_one_icon; ?>"></i></div>
							<div class="fact-count" data-to="<?php echo absint( $fact_one_max ); ?>" data-speed="<?php echo $speed; ?>" data-waypoint-active="yes"><?php echo $fact_one_max; ?></div>
							<div class="fact-name"><?php echo $fact_one; ?></div>
						</div>
					<?php endif; ?>   
					<?php if ( $fact_two != '' ) : ?>
						<div class="fact-item <?php echo $count_me_class; ?> meteorite-item col-md-3 col-sm-3">
							<div class="fact-icon"><i class="fa <?php echo $fact_two_icon; ?>"></i></div>
							<div class="fact-count" data-to="<?php echo absint( $fact_two_max ); ?>" data-speed="<?php echo $speed; ?>" data-waypoint-active="yes"><?php echo $fact_two_max; ?></div>
							<div class="fact-name"><?php echo $fact_two; ?></div>
						</div>
					<?php endif; ?> 
					<?php if ( $fact_three != '' ) : ?>
						<div class="fact-item <?php echo $count_me_class; ?> meteorite-item col-md-3 col-sm-3">
							<div class="fact-icon"><i class="fa <?php echo $fact_three_icon; ?>"></i></div>
							<div class="fact-count" data-to="<?php echo absint( $fact_three_max ); ?>" data-speed="<?php echo $speed; ?>" data-waypoint-active="yes"><?php echo $fact_three_max; ?></div>
							<div class="fact-name"><?php echo $fact_three; ?></div>
						</div>
					<?php endif; ?> 
					<?php if ( $fact_four != '' ) : ?>
						<div class="fact-item <?php echo $count_me_class; ?> meteorite-item col-md-3 col-sm-3">
							<div class="fact-icon"><i class="fa <?php echo $fact_four_icon; ?>"></i></div>
							<div class="fact-count" data-to="<?php echo absint( $fact_four_max ); ?>" data-speed="<?php echo $speed; ?>" data-waypoint-active="yes"><?php echo $fact_four_max; ?></div>
							<div class="fact-name"><?php echo $fact_four; ?></div>
						</div>
					<?php endif; ?>
				</div>
			<?php } elseif ( $type == 'Icon Left' ) { ?>
				<div class="type-icon-left clearfix">
					<?php if ( $fact_one != '' ) : ?>
						<div class="fact-item <?php echo $count_me_class; ?> meteorite-item col-md-3 col-sm-6">
							<div class="fact-icon"><i class="fa <?php echo $fact_one_icon; ?>"></i></div>
							<div class="fact-count" data-to="<?php echo absint( $fact_one_max ); ?>" data-speed="<?php echo $speed; ?>" data-waypoint-active="yes"><?php echo $fact_one_max; ?></div>
							<div class="fact-name"><?php echo $fact_one; ?></div>
							<div class="clearfix"></div>
						</div>
					<?php endif; ?>   
					<?php if ( $fact_two != '' ) : ?>
						<div class="fact-item <?php echo $count_me_class; ?> meteorite-item col-md-3 col-sm-6">
							<div class="fact-icon"><i class="fa <?php echo $fact_two_icon; ?>"></i></div>
							<div class="fact-count" data-to="<?php echo absint( $fact_two_max ); ?>" data-speed="<?php echo $speed; ?>" data-waypoint-active="yes"><?php echo $fact_two_max; ?></div>
							<div class="fact-name"><?php echo $fact_two; ?></div>
							<div class="clearfix"></div>
						</div>
					<?php endif; ?> 
					<?php if ( $fact_three != '' ) : ?>
						<div class="fact-item <?php echo $count_me_class; ?> meteorite-item col-md-3 col-sm-6">
							<div class="fact-icon"><i class="fa <?php echo $fact_three_icon; ?>"></i></div>
							<div class="fact-count" data-to="<?php echo absint( $fact_three_max ); ?>" data-speed="<?php echo $speed; ?>" data-waypoint-active="yes"><?php echo $fact_three_max; ?></div>
							<div class="fact-name"><?php echo $fact_three; ?></div>
							<div class="clearfix"></div>
						</div>
					<?php endif; ?> 
					<?php if ( $fact_four != '' ) : ?>
						<div class="fact-item <?php echo $count_me_class; ?> meteorite-item col-md-3 col-sm-6">
							<div class="fact-icon"><i class="fa <?php echo $fact_four_icon; ?>"></i></div>
							<div class="fact-count" data-to="<?php echo absint( $fact_four_max ); ?>" data-speed="<?php echo $speed; ?>" data-waypoint-active="yes"><?php echo $fact_four_max; ?></div>
							<div class="fact-name"><?php echo $fact_four; ?></div>
							<div class="clearfix"></div>
						</div>
					<?php endif; ?>
				</div>
			<?php } ?>
		</div>
		
		<?php
		echo $args['after_widget'];

	}
	
}
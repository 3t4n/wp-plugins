<?php
/**
 * Skill bar widget
 *
 * @package Meteorite
 */

class Meteorite_Skills extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_skills_widget', 'description' => __( 'Show your visitors some of your skills.', 'meteorite_extensions') );
        parent::__construct(false, $name = __('Meteorite: Skills', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_skills_widget';
    }
	
	function form($instance) {
		$title     			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type 				= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Large';
		$showPerc 			= isset( $instance['showPerc'] ) ? esc_attr( $instance['showPerc'] ) : 'Yes';
		$skill_one   		= isset( $instance['skill_one'] ) ? esc_html( $instance['skill_one'] ) : '';
		$skill_one_max   	= isset( $instance['skill_one_max'] ) ? absint( $instance['skill_one_max'] ) : '';
		$skill_two   		= isset( $instance['skill_two'] ) ? esc_html( $instance['skill_two'] ) : '';
		$skill_two_max   	= isset( $instance['skill_two_max'] ) ? absint( $instance['skill_two_max'] ) : '';
		$skill_three   		= isset( $instance['skill_three'] ) ? esc_html( $instance['skill_three'] ) : '';
		$skill_three_max 	= isset( $instance['skill_three_max'] ) ? absint( $instance['skill_three_max'] ) : '';
		$skill_four   		= isset( $instance['skill_four'] ) ? esc_html( $instance['skill_four'] ) : '';
		$skill_four_max  	= isset( $instance['skill_four_max'] ) ? absint( $instance['skill_four_max'] ) : '';
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
				<h4><?php _e( 'Type', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose a widget type.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('type'); ?>" id="<?php echo $this->get_field_id('type'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Large', 'Small');
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
				<h4><?php _e( 'Percentages', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Show skill percentages?', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('showPerc'); ?>" id="<?php echo $this->get_field_id('showPerc'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Yes', 'No');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $showPerc == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'First Skill', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter details for the first skill.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('skill_one'); ?>" name="<?php echo $this->get_field_name('skill_one'); ?>" value="<?php echo $skill_one; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('skill_one_max'); ?>" name="<?php echo $this->get_field_name('skill_one_max'); ?>" value="<?php echo $skill_one_max; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Second Skill', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter details for the second skill.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('skill_two'); ?>" name="<?php echo $this->get_field_name('skill_two'); ?>" value="<?php echo $skill_two; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('skill_two_max'); ?>" name="<?php echo $this->get_field_name('skill_two_max'); ?>" value="<?php echo $skill_two_max; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Third Skill', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter details for the third skill.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('skill_three'); ?>" name="<?php echo $this->get_field_name('skill_three'); ?>" value="<?php echo $skill_three; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('skill_three_max'); ?>" name="<?php echo $this->get_field_name('skill_three_max'); ?>" value="<?php echo $skill_three_max; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Fourth Skill', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter details for the fourth skill.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Name', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('skill_four'); ?>" name="<?php echo $this->get_field_name('skill_four'); ?>" value="<?php echo $skill_four; ?>">
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Value', 'meteorite_extensions' ); ?></em>
							<input type="text" class="form-control tt-form-element" id="<?php echo $this->get_field_name('skill_four_max'); ?>" name="<?php echo $this->get_field_name('skill_four_max'); ?>" value="<?php echo $skill_four_max; ?>">
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
		$instance['showPerc'] 			= sanitize_text_field($new_instance['showPerc']);
		$instance['skill_one'] 			= sanitize_text_field($new_instance['skill_one']);
		$instance['skill_one_max'] 		= absint($new_instance['skill_one_max']);
		$instance['skill_two'] 			= sanitize_text_field($new_instance['skill_two']);
		$instance['skill_two_max'] 		= absint($new_instance['skill_two_max']);
		$instance['skill_three'] 		= sanitize_text_field($new_instance['skill_three']);
		$instance['skill_three_max']	= absint($new_instance['skill_three_max']);
		$instance['skill_four'] 		= sanitize_text_field($new_instance['skill_four']);
		$instance['skill_four_max'] 	= absint($new_instance['skill_four_max']);
		$instance['animation'] 			= sanitize_text_field($new_instance['animation']);

		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title 			= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$type 			= isset( $instance['type'] ) ? esc_attr($instance['type']) : 'Large';
		$showPerc 		= isset( $instance['showPerc'] ) ? esc_attr($instance['showPerc']) : 'Yes';
		$skill_one   	= isset( $instance['skill_one'] ) ? esc_html( $instance['skill_one'] ) : '';
		$skill_one_max  = isset( $instance['skill_one_max'] ) ? absint( $instance['skill_one_max'] ) : '';
		$skill_two   	= isset( $instance['skill_two'] ) ? esc_html( $instance['skill_two'] ) : '';
		$skill_two_max  = isset( $instance['skill_two_max'] ) ? absint( $instance['skill_two_max'] ) : '';
		$skill_three   	= isset( $instance['skill_three'] ) ? esc_html( $instance['skill_three'] ) : '';
		$skill_three_max= isset( $instance['skill_three_max'] ) ? absint( $instance['skill_three_max'] ) : '';
		$skill_four   	= isset( $instance['skill_four'] ) ? esc_html( $instance['skill_four'] ) : '';
		$skill_four_max = isset( $instance['skill_four_max'] ) ? absint( $instance['skill_four_max'] ) : '';
		$animation 		= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

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


		<div class="meteorite-skill-wrapper <?php echo $animation_class . $animation_single ?>">
		<?php if ($skill_one != '') : ?>
			<?php if ( $type == 'Large' ) { ?>
				<div class="meteorite-skill meteorite-item">
					<div class="skill-bar skill-bar-a" data-percent="<?php echo $skill_one_max; ?>" data-waypoint-active="yes">
						<div class="skill-bar-fill skill-bar-fill-a">
							<span class="skill-name"><?php echo $skill_one; ?></span>
							<div class="skill-perc"><?php if ( $showPerc == 'Yes' ) { echo $skill_one_max . '%'; } ?></div>
						</div>
					</div>
				</div>
			<?php } elseif ( $type == 'Small' ) { ?>
				<div class="meteorite-skill meteorite-item meteorite-skill-b">
					<span class="skill-name"><?php echo $skill_one; ?></span>
					<div class="skill-perc"><?php if ( $showPerc == 'Yes' ) { echo $skill_one_max . '%'; } ?></div>
					<div class="skill-bar skill-bar-b" data-percent="<?php echo $skill_one_max; ?>" data-waypoint-active="yes">
						<div class="skill-bar-fill skill-bar-b"></div>
					</div>
				</div>
			<?php } ?>
		<?php endif; ?>   
		<?php if ($skill_two !='') : ?>
			<?php if ( $type == 'Large' ) { ?>
				<div class="meteorite-skill meteorite-item">
					<div class="skill-bar skill-bar-a" data-percent="<?php echo $skill_two_max; ?>" data-waypoint-active="yes">
						<div class="skill-bar-fill skill-bar-fill-a">
							<span class="skill-name"><?php echo $skill_two; ?></span>
							<div class="skill-perc"><?php if ( $showPerc == 'Yes' ) { echo $skill_two_max . '%'; } ?></div>
						</div>
					</div>
				</div>
			<?php } elseif ( $type == 'Small' ) { ?>
				<div class="meteorite-skill meteorite-item meteorite-skill-b">
					<span class="skill-name"><?php echo $skill_two; ?></span>
					<div class="skill-perc"><?php if ( $showPerc == 'Yes' ) { echo $skill_two_max . '%'; } ?></div>
					<div class="skill-bar skill-bar-b" data-percent="<?php echo $skill_two_max; ?>" data-waypoint-active="yes">
						<div class="skill-bar-fill skill-bar-b"></div>
					</div>
				</div>
			<?php } ?>
		<?php endif; ?> 
		<?php if ($skill_three !='') : ?>
			<?php if ( $type == 'Large' ) { ?>
				<div class="meteorite-skill meteorite-item">
					<div class="skill-bar skill-bar-a" data-percent="<?php echo $skill_three_max; ?>" data-waypoint-active="yes">
						<div class="skill-bar-fill skill-bar-fill-a">
							<span class="skill-name"><?php echo $skill_three; ?></span>
							<div class="skill-perc"><?php if ( $showPerc == 'Yes' ) { echo $skill_three_max . '%'; } ?></div>
						</div>
					</div>
				</div>
			<?php } elseif ( $type == 'Small' ) { ?>
				<div class="meteorite-skill meteorite-item meteorite-skill-b">
					<span class="skill-name"><?php echo $skill_three; ?></span>
					<div class="skill-perc"><?php if ( $showPerc == 'Yes' ) { echo $skill_three_max . '%'; } ?></div>
					<div class="skill-bar skill-bar-b" data-percent="<?php echo $skill_three_max; ?>" data-waypoint-active="yes">
						<div class="skill-bar-fill skill-bar-b"></div>
					</div>
				</div>
			<?php } ?>
		<?php endif; ?> 
		<?php if ($skill_four !='') : ?>
			<?php if ( $type == 'Large' ) { ?>
				<div class="meteorite-skill meteorite-item">
					<div class="skill-bar skill-bar-a" data-percent="<?php echo $skill_four_max; ?>" data-waypoint-active="yes">
						<div class="skill-bar-fill skill-bar-fill-a">
							<span class="skill-name"><?php echo $skill_four; ?></span>
							<div class="skill-perc"><?php if ( $showPerc == 'Yes' ) { echo $skill_four_max . '%'; } ?></div>
						</div>
					</div>
				</div>
			<?php } elseif ( $type == 'Small' ) { ?>
				<div class="meteorite-skill meteorite-item meteorite-skill-b">
					<span class="skill-name"><?php echo $skill_four; ?></span>
					<div class="skill-perc"><?php if ( $showPerc == 'Yes' ) { echo $skill_four_max . '%'; } ?></div>
					<div class="skill-bar skill-bar-b" data-percent="<?php echo $skill_four_max; ?>" data-waypoint-active="yes">
						<div class="skill-bar-fill skill-bar-b"></div>
					</div>
				</div>
			<?php } ?>
		<?php endif; ?>
		</div>

		<?php
		echo $args['after_widget'];

	}
	
}
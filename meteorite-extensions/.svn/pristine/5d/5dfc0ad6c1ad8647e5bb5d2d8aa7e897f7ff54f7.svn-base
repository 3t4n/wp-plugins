<?php
/**
 * Projects Carousel widget
 *
 * @package Meteorite
 */

class Meteorite_Projects_Carousel extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_projects_carousel_widget', 'description' => __( 'Display some of your projects in a carousel.', 'meteorite_extensions') );
        parent::__construct(false, $name = __('Meteorite: Projects Carousel', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_projects_carousel_widget';
    }
	
	function form($instance) {
		$title				= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$type				= isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'Default';
		$number				= isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$category			= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$cols				= isset( $instance['cols'] ) ? esc_attr( $instance['cols'] ) : '4';
		$enable_autoplay 	= isset( $instance['enable_autoplay'] ) ? esc_attr( $instance['enable_autoplay'] ) : 'Off';
		$autoplay			= isset( $instance['autoplay'] ) ? intval( $instance['autoplay'] ) : 5000;
		$pagination			= isset( $instance['pagination'] ) ? esc_attr( $instance['pagination'] ) : 'Hide';
		$padding			= isset( $instance['padding'] ) ? esc_attr( $instance['padding'] ) : 'No';
		$animation			= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
	?>

	<div class="tt-widget-wrapper">
		<div class="tt-widget-section">
			<div class="tt-field-desc" style="width: 100%;">
				<h4><?php _e( 'Information', 'meteorite_extensions' ); ?></h4>
				<p><?php _e('In order to display this widget, you must first add some projects from the dashboard.', 'meteorite_extensions'); ?></p>
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
							$options = array('Default', 'Icons', 'Excerpt', 'Title + Category', 'Reveal Title');
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
				<h4><?php _e( 'Number', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Number of projects to show (-1 shows all of them).', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" class="form-control tt-form-element" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Category', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the slugs (comma separated) for your categories or leave empty to show all projects.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo $category; ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="tt-widget-section">
			<div class="tt-field-desc">
				<h4><?php _e( 'Columns', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'How many columns do you want?', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('cols'); ?>" id="<?php echo $this->get_field_id('cols'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('1', '2', '3', '4', '5');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $cols == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<p><?php _e( 'Customize this carousel', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Autoplay', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('enable_autoplay'); ?>" id="<?php echo $this->get_field_id('enable_autoplay'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('On', 'Off');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $enable_autoplay == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Enter an autoplay time [ms].', 'meteorite_extensions' ); ?></em>
							<input class="form-control tt-form-element" id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" type="text" value="<?php echo $autoplay; ?>" />
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Pagination', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('pagination'); ?>" id="<?php echo $this->get_field_id('pagination'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('Show', 'Hide');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $pagination == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<h4><?php _e( 'Padding', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Do you want to have a padding around the items?', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('padding'); ?>" id="<?php echo $this->get_field_id('padding'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $padding == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
		$instance['title']			 = sanitize_text_field($new_instance['title']);
		$instance['type']			 = sanitize_text_field($new_instance['type']);
		$instance['number']			 = sanitize_text_field($new_instance['number']);
		$instance['category']		 = sanitize_text_field($new_instance['category']);
		$instance['cols']			 = sanitize_text_field($new_instance['cols']);
		$instance['enable_autoplay'] = sanitize_text_field($new_instance['enable_autoplay']);
		$instance['autoplay'] 		 = absint($new_instance['autoplay']);
		$instance['pagination'] 	 = sanitize_text_field($new_instance['pagination']);
		$instance['padding']		 = sanitize_text_field($new_instance['padding']);
		$instance['animation']		 = sanitize_text_field($new_instance['animation']);

		return $instance;
	}
	
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title				= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title				= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$type				= isset( $instance['type'] ) ? esc_attr($instance['type']) : 'Default';
		$number				= ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		if ( ! $number )
			$number = -1;
		$category			= isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$cols				= isset( $instance['cols'] ) ? esc_attr($instance['cols']) : '4';
		$enable_autoplay	= isset( $instance['enable_autoplay'] ) ? esc_attr($instance['enable_autoplay']) : 'Off';
		$autoplay 			= ( ! empty( $instance['autoplay'] ) ) ? intval( $instance['autoplay'] ) : 5000;
		$pagination			= isset( $instance['pagination'] ) ? esc_attr($instance['pagination']) : 'Hide';
		$padding 			= isset( $instance['padding'] ) ? esc_attr($instance['padding']) : 'No';
		$animation 			= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		$options = array(
			'posts'         => $number,
			'post_type'     => 'projects',
			'include'       => $category,
		);

		$projects = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => $options['post_type'],
			'posts_per_page'	  => $options['posts'],
			'project-category'	  => $options['include']
		) );

		$padding_class = '';
		if ( $padding == 'No' ) : 
			$padding_class .= ' no-padding';
		else :
			$padding_class = ' has-padding';
		endif;

		$data_autoplay = 'false';
		if ( $enable_autoplay == 'On' ) :
			$data_autoplay = intval($autoplay);
		endif;

		$data_pagination = 'false';
		if ( $pagination == 'Show' ) :
			$data_pagination = 'true';
		endif;

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

		if ( $projects->have_posts() && post_type_exists( 'projects' )  ) :

			$output = ''; //Start output
			$output .= '<div class="meteorite-projects-carousel-wrapper ' . $padding_class . '">';
				$output .= '<div class="meteorite-projects-carousel carousel owl-carousel ' . $animation_class . $animation_single . '" data-cols="' . esc_attr($cols) . '" data-autoplay="' . $data_autoplay . '" data-pagination="' . $data_pagination . '">';
					while ( $projects->have_posts() ) : $projects->the_post();
						global $post;
					
						$projectImage = '';
						$widget_image_url = get_post_meta( $post->ID, 'tt-widget-image-url', true );
						if ( $widget_image_url ) :
							$projectImage = meteorite_get_attachment_image( $widget_image_url );
						else :
							$projectImage = get_the_post_thumbnail($post->ID, 'meteorite-large-thumb');
						endif;

						$featuredImageURL = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

						if ( $projectImage ) :
							$project_url = get_post_meta( get_the_ID(), 'tt-project-link', true );
							$permalink = '';
							if ( $project_url ) {
								$permalink = esc_url($project_url);
							} else {
								$permalink = esc_url(get_the_permalink());
							}
							
							if ( $type == 'Default' ) :
								$output .= '<div class="project-carousel-item project-type-default meteorite-item ' . $padding_class . '">';
									$output .= '<h3 class="screen-reader-text">' . esc_html( get_the_title($post->ID) ) . '</h3>';
									$output .= '<div class="project-image">';
										$output .= '<a href="' . $permalink . '">';
											$output .= '<div class="project-pop"></div>';
											$output .= $projectImage;
										$output .= '</a>';
									$output .= '</div>';
								$output .= '</div>';

							elseif ( $type == 'Icons' ) :
								$output .= '<div class="project-carousel-item project-type-icons meteorite-item ' . $padding_class . '">';
									$output .= '<h3 class="screen-reader-text">' . esc_html( get_the_title($post->ID) ) . '</h3>';
									$output .= '<div class="project-image">';
										$output .= '<div class="project-pop">';
											$output .= '<div class="project-pop-meta">';
												$output .= '<span class="project-link"><a href="' . $permalink . '"><i class="fa fa-link"></i></a></span>';
												$output .= '<span class="project-image-link"><a href="' . $featuredImageURL . '"><i class="fa fa-expand"></i></a></span>';
											$output .= '</div>';
										$output .= '</div>';
										$output .= $projectImage;
									$output .= '</div>';
								$output .= '</div>';

							elseif ( $type == 'Excerpt' ) :
								$output .= '<div class="project-carousel-item project-type-excerpt meteorite-item ' . $padding_class . '">';
									$output .= '<div class="project-image">';
										$output .= '<div class="project-pop">';
											$output .= '<div class="project-pop-meta">';
												$output .= '<span class="project-link"><a href="' . $permalink . '"><i class="fa fa-link"></i></a></span>';
											$output .= '</div>';
										$output .= '</div>';
										$output .= $projectImage;
									$output .= '</div>';
									$output .= '<div class="project-carousel-excerpt-wrapper">';
										$output .= '<a href="' . $permalink . '"><h3 class="project-title">' . esc_html( get_the_title($post->ID) ) . '</h3></a>';
										$output .= '<p class="project-excerpt">' . get_the_excerpt() . '</p>';
									$output .= '</div>';
								$output .= '</div>';

							elseif ( $type == 'Title + Category' ) :
								$output .= '<div class="project-carousel-item project-type-title meteorite-item ' . $padding_class . '">';
									$output .= '<div class="project-image">';
											$output .= '<div class="project-pop">';
												$output .= '<div class="project-pop-meta">';
													$output .= '<a href="' . $permalink . '"><h3 class="project-title">' . esc_html( get_the_title($post->ID) ) . '</h3></a>';
													$output .= '<span class="project-sep"></span>';
													$output .= '<span class="project-category">' . get_the_term_list( $post->ID, "project-category", "", ", ", "" ) . '</span>';
												$output .= '</div>';
											$output .= '</div>';
										$output .= $projectImage;
									$output .= '</div>';
								$output .= '</div>';

							elseif ( $type == 'Reveal Title' ) :
								$output .= '<div class="project-carousel-item project-type-reveal-title meteorite-item ' . $padding_class . '">';
									$output .= '<a href="' . $permalink . '">';
										$output .= '<div class="project-image">';
											$output .= $projectImage;
											$output .= '<div class="project-title-wrap">';
												$output .= '<h3 class="project-title">' . esc_html( get_the_title($post->ID) ) . '</h3>';
											$output .= '</div>';
										$output .= '</div>';
									$output .= '</a>';
								$output .= '</div>';

							endif;

						endif;

					endwhile;
					
				$output .= '</div>'; // /.meteorite-projects-carousel

				$output .= '<div class="meteorite-projects-controls clearfix"><div class="prev"><i class="fa fa-angle-left"></i></div><div class="next"><i class="fa fa-angle-right"></i></div></div>';

			$output .= '</div>'; // /.meteorite-projects-wrapper

			echo $output;

		wp_reset_postdata();

		elseif ( current_user_can('edit_theme_options') ) :
		echo '<div class="no-posts-notice">' . sprintf( _x('Info: you have not created any projects. Make sure you have installed the %1$s plugin and created some projects %2$s', 'no posts info', 'meteorite_extensions'),
			'Terra Themes Tools',
			'<a href="' . esc_url( get_admin_url('', 'edit.php?post_type=projects') ) . '">' . __('here', 'meteorite_extensions') . '</a>'
		) . '</div>';
		endif;
		echo $args['after_widget'];

	}
	
}
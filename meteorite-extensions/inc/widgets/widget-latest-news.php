<?php
/**
 * Latest News Widget
 *
 * @package Meteorite
 */

class Meteorite_Latest_News extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_latest_news_widget', 'description' => __( 'Show the latest news from your blog.', 'meteorite_extensions') );
        parent::__construct(false, $name = __('Meteorite: Latest News', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_latest_news';
		
    }
	
	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$category  		= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$hide_date		= isset( $instance['hide_date'] ) ? esc_attr( $instance['hide_date'] ) : 'No';
		$hide_excerpt	= isset( $instance['hide_excerpt'] ) ? esc_attr( $instance['hide_excerpt'] ) : 'No';
		$animation 		= isset( $instance['animation'] ) ? esc_attr( $instance['animation'] ) : 'None';
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
				<h4><?php _e( 'Category', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Enter the slug for your category or leave empty to show posts from all categories.', 'meteorite_extensions' ); ?></p>
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
				<h4><?php _e( 'Customize', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Choose to hide the excerpt or button.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Hide Date', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('hide_date'); ?>" id="<?php echo $this->get_field_id('hide_date'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hide_date == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-6">
							<em class="tt-field-description"><?php _e('Hide Excerpt', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('hide_excerpt'); ?>" id="<?php echo $this->get_field_id('hide_excerpt'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hide_excerpt == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
		$instance['title'] 			= sanitize_text_field($new_instance['title']);
		$instance['category'] 		= sanitize_text_field($new_instance['category']);
		$instance['hide_date']		= sanitize_text_field($new_instance['hide_date']);
		$instance['hide_excerpt']	= sanitize_text_field($new_instance['hide_excerpt']);
		$instance['animation'] 		= sanitize_text_field($new_instance['animation']);

		return $instance;
	}
		
	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title			= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$category 		= isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$hide_date		= isset( $instance['hide_date'] ) ? esc_attr($instance['hide_date']) : 'No';
		$hide_excerpt	= isset( $instance['hide_excerpt'] ) ? esc_attr($instance['hide_excerpt']) : 'No';
		$animation 		= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		$latest_news = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'posts_per_page'	  => 3,
			'category_name'		  => $category,
			'ignore_sticky_posts' => 1
		) );

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

		if ( $latest_news->have_posts() ) :
		?>

		<div class="meteorite-latest-news row <?php echo $animation_class . $animation_single ?>">
			<?php while ( $latest_news->have_posts() ) : $latest_news->the_post(); ?>
			<div class="blog-post col-md-4 col-sm-4 col-xs-12 meteorite-item">
				<div class="blog-post-inner">
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('meteorite-medium-thumb'); ?>
						</a>
					</div>	
					<?php endif; ?>	

					<?php  if ( function_exists('meteorite_get_time_string') && $hide_date == 'No' ) :
						meteorite_get_time_string();
					endif; ?>

					<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
					
					<?php if ( $hide_excerpt == 'No' ) : ?>
						<div class="entry-summary"><?php the_excerpt(); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>
			<div class="clearfix"></div>
		</div>

		<?php
		wp_reset_postdata();

		elseif ( current_user_can('edit_theme_options') ) :
		echo '<div class="no-posts-notice">' . sprintf( _x('Info: you have not created any posts.Create some posts %s', 'no posts info', 'meteorite_extensions'),
			'<a href="' . esc_url( get_admin_url('', 'edit.php') ) . '">' . __('here', 'meteorite_extensions') . '</a>'
		) . '</div>';
		endif;
		echo $args['after_widget'];

	}
	
}
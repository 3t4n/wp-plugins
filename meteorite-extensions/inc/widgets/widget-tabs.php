<?php
/**
 * Tabs widget
 *
 * @package Meteorite
 */

class Meteorite_Tabs extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'meteorite_post_tabs_widget', 'description' => __( 'Display popular posts, recent posts and comments.', 'meteorite_extensions') );
		parent::__construct(false, $name = __('Meteorite: Post Tabs', 'meteorite_extensions'), $widget_ops);
		$this->alt_option_name = 'meteorite_post_tabs_widget';
	}

	function form($instance) {
		$title			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number			= isset( $instance['number'] ) ? intval( $instance['number'] ) : 3;
		$hide_popular	= isset( $instance['hide_popular'] ) ? esc_attr($instance['hide_popular'] ) : 'No';
		$hide_recent	= isset( $instance['hide_recent'] ) ? esc_attr($instance['hide_recent'] ) : 'No';
		$hide_comments	= isset( $instance['hide_comments'] ) ? esc_attr($instance['hide_comments'] ) : 'No';
		$animation 		= isset( $instance['animation'] ) ? esc_attr($instance['animation'] ) : 'None';
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
				<h4><?php _e( 'Number', 'meteorite_extensions' ); ?></h4>
				<p><?php _e( 'Number of posts/comments.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<select name="<?php echo $this->get_field_name('number'); ?>" id="<?php echo $this->get_field_id('number'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('1', '2', '3', '4', '5');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $number == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
				<p><?php _e( 'Hide a tab if you want.', 'meteorite_extensions' ); ?></p>
			</div>
			<div class="tt-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Hide Popular?', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('hide_popular'); ?>" id="<?php echo $this->get_field_id('hide_popular'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hide_popular == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Hide Recent?', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('hide_recent'); ?>" id="<?php echo $this->get_field_id('hide_recent'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hide_recent == $option ? ' selected="selected"' : '', '>', $option, '</option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-4">
							<em class="tt-field-description"><?php _e('Hide Comments?', 'meteorite_extensions' ); ?></em>
							<select name="<?php echo $this->get_field_name('hide_comments'); ?>" id="<?php echo $this->get_field_id('hide_comments'); ?>" class="form-control tt-form-element">
							<?php
							$options = array('No', 'Yes');
							foreach ($options as $option) {
							echo '<option value="' . $option . '" id="' . $option . '"', $hide_comments == $option ? ' selected="selected"' : '', '>', $option, '</option>';
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
		$instance['title']			= sanitize_text_field($new_instance['title']);
		$instance['number']			= sanitize_text_field($new_instance['number']);
		$instance['hide_popular']	= sanitize_text_field($new_instance['hide_popular']);
		$instance['hide_recent']	= sanitize_text_field($new_instance['hide_recent']);
		$instance['hide_comments']	= sanitize_text_field($new_instance['hide_comments']);
		$instance['animation']		= sanitize_text_field($new_instance['animation']);

		return $instance;
	}

	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number 		= isset( $instance['number'] ) ? esc_attr($instance['number']) : 3;
		$hide_popular	= isset( $instance['hide_popular'] ) ? esc_attr($instance['hide_popular']) : 'No';
		$hide_recent	= isset( $instance['hide_recent'] ) ? esc_attr($instance['hide_recent']) : 'No';
		$hide_comments	= isset( $instance['hide_comments'] ) ? esc_attr($instance['hide_comments']) : 'No';
		$animation		= isset( $instance['animation'] ) ? esc_attr($instance['animation']) : 'None';

		$popular_active = '';
		$recent_active = '';
		$comments_active = '';
		if ( $hide_popular == 'No' ) {
			$popular_active = 'in active';
		} elseif ( $hide_recent == 'No' ) {
			$recent_active = 'in active';
		} elseif ( $hide_comments == 'No' ) {
			$comments_active = 'in active';
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

		$id_popular = 'tab-popular' . rand(100,999);
		$id_recent = 'tab-recent' . rand(100,999);
		$id_comments = 'tab-comments' . rand(100,999);

		echo $args['before_widget'];

		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; } 
		?>

		<div class="meteorite-post-tabs-widget meteorite-post-tabs-wrap <?php echo $animation_class ?>">
			<ul class="nav nav-tabs">
				<?php if ( $hide_popular == 'No' ) : ?>
				<li class="<?php echo $popular_active; ?>"><a href="#<?php echo $id_popular ?>" data-toggle="tab"><?php _e('Popular', 'meteorite_extensions'); ?></a></li>
				<?php endif; ?>
				<?php if ( $hide_recent == 'No' ) : ?>
				<li class="<?php echo $recent_active; ?>"><a href="#<?php echo $id_recent ?>" data-toggle="tab"><?php _e('Recent', 'meteorite_extensions'); ?></a></li>
				<?php endif; ?>
				<?php if ( $hide_comments == 'No' ) : ?>
				<li class="<?php echo $comments_active; ?>"><a href="#<?php echo $id_comments ?>" data-toggle="tab"><i class="fa fa-comments-o"></i><span class="screen-reader-text"><?php _e('Comments', 'meteorite_extensions'); ?></span></a></li>
				<?php endif; ?>
			</ul>

			<div class="tab-content clearfix">
				
				<?php if ( $hide_popular == 'No' ) : ?>
				<div id="<?php echo $id_popular ?>" class="tab-pane fade <?php echo $popular_active; ?>">
					<?php $popular_posts = new WP_Query( 'posts_per_page=' . $number . '&orderby=comment_count&order=DESC&ignore_sticky_posts=1' ); ?>
					<ul class="news-list">
						<?php if ( $popular_posts->have_posts() ) : ?>
							<?php while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>
								<li>
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'meteorite-small-thumb' ); ?></a>
										</div>
									<?php endif; ?>
									<div class="post-holder">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<div class="entry-meta">
											<?php 
											if ( function_exists('meteorite_get_time_string') ) :
												meteorite_get_time_string(); 
											endif;
											?>
										</div>
									</div>
								</li>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php else: ?>
							<li><?php esc_attr_e( 'No posts have been published yet.', 'meteorite_extensions' ); ?></li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endif; ?>

				<?php if ( $hide_recent == 'No' ) : ?>
				<div id="<?php echo $id_recent ?>" class="tab-pane fade <?php echo $recent_active; ?>">
					<?php $recent_posts = new WP_Query( 'posts_per_page=' . $number . '&ignore_sticky_posts=1' ); ?>
					<ul class="news-list">
						<?php if ( $recent_posts->have_posts() ) : ?>
							<?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
								<li>
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'meteorite-small-thumb' ); ?></a>
										</div>
									<?php endif; ?>
									<div class="post-holder">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<div class="entry-meta">
											<?php 
											if ( function_exists('meteorite_get_time_string') ) :
												meteorite_get_time_string(); 
											endif;
											?>
										</div>
									</div>
								</li>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php else: ?>
							<li><?php _e( 'No posts have been published yet.', 'meteorite_extensions' ); ?></li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endif; ?>
				
				<?php if ( $hide_comments == 'No' ) : ?>
				<div id="<?php echo $id_comments ?>" class="tab-pane fade <?php echo $comments_active; ?>">
					<ul class="news-list">
						<?php
						global $wpdb;

						$recent_comments = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,110) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $number";
						$the_comments = $wpdb->get_results( $recent_comments );
						?>

						<?php if ( $the_comments ) : ?>
							<?php foreach ( $the_comments as $comment ) : ?>
								<li>
									<div class="image">
										<?php echo get_avatar( $comment, '50' ); ?>
									</div>

									<div class="post-holder">
										<span class="author vcard"><?php echo strip_tags( $comment->comment_author ); ?> <?php _e( 'says:', 'meteorite_extensions' ); ?></span>
										<div class="entry-meta">
											<a class="comment-text" href="<?php echo get_permalink( $comment->ID ); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php printf( __( '%1$s on %2$s', 'meteorite_extensions' ), strip_tags( $comment->comment_author ), $comment->post_title ); ?>"><?php echo wp_trim_words( strip_tags( $comment->com_excerpt ), 12 ); ?></a>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						<?php else : ?>
							<li><?php _e( 'No comments have been published yet.', 'meteorite_extensions' ); ?></li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endif; ?>

			</div>
		</div>

		<?php 
		echo $args['after_widget'];

	}
	
}
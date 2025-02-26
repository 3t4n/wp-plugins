<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Sprttm_SportsTeam extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'sprttm_sportsteam',
			'description' => esc_html__( 'Displays the next match of a team.', 'sportsteam-widget' ),
		);
		parent::__construct('sprttm_sportsteam', esc_html__('SportsTeam', 'sportsteam-widget'), $widget_ops);
	}

	public function widget( $args, $instance ) {

		$defaults = array(
			'title'       => esc_html__( 'Next Match', 'sportsteam-widget' ),
			'date'        => '',
			'subtitle'    => '',
			'out'         => '',
			'class'       => 0,
			'post_id'     => 0,
			'result'      => '',
			'color'       => 'none',
			'post_id2'    => 0,
			'result2'     => '',
			'color2'      => 'none',
			'links'       => 1,
			'bgcolor'     => '',
			'textcolor'   => '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title       = apply_filters( 'widget_title', $instance['title'] );
		$subtitle    = $instance['subtitle'];
		$date        = $instance['date'];
		$out    = ! empty( $instance['out'] ) ? '1' : '0';
		$class       = $instance['class'];
		$post_id     = $instance['post_id'];
		$result     = (string) $instance['result']; // cast to string, so 0 is a result too.
		$color       = $instance['color'];
		$post_id2    = $instance['post_id2'];
		$result2    = (string) $instance['result2']; // cast to string, so 0 is a result too.
		$color2      = $instance['color2'];
		$links  = ! empty( $instance['links'] ) ? '1' : '0';
		$bgcolor     = $instance['bgcolor'];
		$textcolor   = $instance['textcolor'];
		?>

		<?php echo $args['before_widget']; ?>
		<div class="widget_sportsteam">

		<?php
		if ( $post_id ) { ?>
			<div class="sprttm_sportsteams class_<?php echo esc_attr( $class ); ?>">
				<?php if ( $title ) { ?>
					<div class="sprttm_sportsteam_header"><?php echo $args['before_title'] . esc_html( $title ) . $args['after_title']; ?></div>
				<?php } ?>

				<div class="sprttm_sportsteam_div sprttm_sportsteam_div_first">
					<?php
					$team = get_post($post_id);
					// show featured image
					$thumb_id = get_post_thumbnail_id($team->ID);
					$thumb_size = apply_filters( 'sportsteam_widget_thumbnail_size', 'medium' );
					$foto = wp_get_attachment_image_src( $thumb_id, $thumb_size);
					$foto = $foto ? $foto : [];
					if (isset($foto[0])) {?>
					<img src="<?php echo esc_attr( $foto[0] ); ?>" alt="<?php echo esc_attr( $team->post_title ); ?>" />
					<?php
					}
					?>
					<div class="sprttm_sportsteam_div_title">
					<?php
					if ( $links ) { ?>
						<a href="<?php echo esc_attr( get_permalink($team->ID) ); ?>" title="<?php echo esc_attr( $team->post_title ); ?>">
							<?php echo esc_html( $team->post_title ); ?>
						</a><?php
					} else {
						echo esc_html( $team->post_title );
					} ?>
					</div>
					<?php
					if ( strlen($result) > 0 ) { ?>
						<div class="sprttm_sportsteam_result result_<?php echo esc_attr( $color ); ?>">
							<?php echo esc_html( $result ); ?>
						</div>
						<?php
					} ?>
				</div>

				<div class="sprttm_sportsteam_div sprttm_sportsteam_sep">
					<div class="separator"></div>
					<span><?php
						if ( $out ) {
							esc_html_e('AWAY', 'sportsteam-widget');
						} else {
							esc_html_e('HOME', 'sportsteam-widget');
						} ?>
					</span>
				</div>

				<div class="sprttm_sportsteam_div sprttm_sportsteam_div_last">
					<?php
					$team = get_post($post_id2);
					// show featured image
					$thumb_id = get_post_thumbnail_id($team->ID);
					$thumb_size = apply_filters( 'sportsteam_widget_thumbnail_size', 'medium' );
					$foto = wp_get_attachment_image_src( $thumb_id, $thumb_size);
					$foto = $foto ? $foto : [];
					if (isset($foto[0])) {?>
						<img src="<?php echo esc_attr( $foto[0] ); ?>" alt="<?php echo esc_attr( $team->post_title ); ?>" />
					<?php
					}
					?>

					<div class="sprttm_sportsteam_div_title">
					<?php
					if ( $links ) { ?>
						<a href="<?php echo esc_attr( get_permalink($team->ID) ); ?>" title="<?php echo esc_attr( $team->post_title ); ?>">
							<?php echo esc_html( $team->post_title ); ?>
						</a><?php
					} else {
						echo esc_html( $team->post_title );
					} ?>
					</div>
					<?php
					if ( strlen($result2) > 0 ) { ?>
						<div class="sprttm_sportsteam_result result_<?php echo esc_attr( $color2 ); ?>">
							<?php echo esc_html( $result2 ); ?>
						</div>
						<?php
					} ?>
				</div>

				<div class="sprttm_sportsteam_footer">
					<?php
					if ($date) { ?>
						<h4 class="sprttm_sportsteam_date">
							<?php echo esc_html( $date ); ?>
						</h4>
						<?php
					}
					if ($subtitle) { ?>
						<h4 class="sprttm_sportsteam_subtitle">
							<?php echo esc_html( $subtitle ); ?>
						</h4>
						<?php
					}
					?>
				</div>

				<style type='text/css'>
					<?php if ($bgcolor) { ?>
						.widget_sportsteam {
							background-color: <?php echo esc_attr( $bgcolor ); ?>;
						}
						<?php
					}
					if ($textcolor) { ?>
						.widget_sportsteam,
						.widget_sportsteam div,
						.widget_sportsteam span,
						.widget_sportsteam h3,
						.widget_sportsteam h4,
						.widget_sportsteam a:link,
						.widget_sportsteam a:visited,
						.widget_sportsteam a:active,
						.widget_sportsteam a:hover {
							color: <?php echo esc_attr( $textcolor ); ?>;
						}
						<?php
					} ?>
				</style>

			</div><?php
		} ?>

		</div>
		<?php echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']       = wp_strip_all_tags($new_instance['title']);
		$instance['subtitle']    = wp_strip_all_tags($new_instance['subtitle']);
		$instance['date']        = wp_strip_all_tags($new_instance['date']);
		$instance['out']         = ! empty($new_instance['out']) ? 1 : 0;
		$instance['class']       = (int) $new_instance['class'];
		$instance['post_id']     = (int) $new_instance['post_id'];
		$instance['result']      = wp_strip_all_tags($new_instance['result']);
		$instance['color']       = wp_strip_all_tags($new_instance['color']);
		$instance['post_id2']    = (int) $new_instance['post_id2'];
		$instance['result2']     = wp_strip_all_tags($new_instance['result2']);
		$instance['color2']      = wp_strip_all_tags($new_instance['color2']);
		$instance['links']       = ! empty($new_instance['links']) ? 1 : 0;
		$instance['bgcolor']     = wp_strip_all_tags($new_instance['bgcolor']);
		$instance['textcolor']   = wp_strip_all_tags($new_instance['textcolor']);

		return $instance;
	}

	public function form( $instance ) {
		$defaults = array(
			'title'       => esc_html__( 'Next Match', 'sportsteam-widget' ),
			'date'        => '',
			'subtitle'    => '',
			'out'         => '',
			'class'       => 0,
			'post_id'     => 0,
			'result'      => '',
			'color'       => 'none',
			'post_id2'    => 0,
			'result2'     => '',
			'color2'      => 'none',
			'links'       => 1,
			'bgcolor'     => '',
			'textcolor'   => '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title       = esc_attr( $instance['title'] );
		$date        = esc_attr( $instance['date'] );
		$subtitle    = esc_attr( $instance['subtitle'] );
		$out         = esc_attr( $instance['out'] );
		$class       = esc_attr( $instance['class'] );
		$post_id     = (int) esc_attr( $instance['post_id'] );
		$result      = esc_attr( $instance['result'] );
		$color       = esc_attr( $instance['color'] );
		$post_id2    = (int) esc_attr( $instance['post_id2'] );
		$result2     = esc_attr( $instance['result2'] );
		$color2      = esc_attr( $instance['color2'] );
		$links       = esc_attr( $instance['links'] );
		$bgcolor     = esc_attr( $instance['bgcolor'] );
		$textcolor   = esc_attr( $instance['textcolor'] );
		?>

		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'sportsteam-widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('date') ); ?>"><?php esc_html_e( 'Date:', 'sportsteam-widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('date') ); ?>" type="text" value="<?php echo esc_attr( $date ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>"><?php esc_html_e( 'Subtitle:', 'sportsteam-widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>" name="<?php echo esc_attr( $this->get_field_name('subtitle') ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('out') ); ?>" name="<?php echo esc_attr( $this->get_field_name('out') ); ?>"<?php checked( $out ); ?> />
		<label for="<?php echo esc_attr( $this->get_field_id('out') ); ?>"><?php esc_html_e( 'Away Match', 'sportsteam-widget' ); ?></label></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('class') ); ?>"><?php esc_html_e('Select Class:', 'sportsteam-widget'); ?></label><br />
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id('class') ); ?>" name="<?php echo esc_attr( $this->get_field_name('class') ); ?>">
			<option value="0"><?php esc_html_e('All Classes and Teams', 'sportsteam-widget'); ?></option>
			<?php
			$taxonomies = array(
				'st_classes',
			);

			$args = array(
				'orderby'      => 'name',
				'order'        => 'ASC',
				'hide_empty'   => true,
				'fields'       => 'all',
				'hierarchical' => true,
			);

			$terms = get_terms($taxonomies, $args);

			if ( is_array( $terms ) && ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$selected = false;
					if ( $term->term_id === $class ) {
						$selected = true;
					}
					echo '<option value="' . (int) $term->term_id . '"'
						. selected( $selected )
						. '>' . esc_html( $term->name ) . '</option>
						';
				}
			} ?>
		</select></p>

		<hr />

		<p><label for="<?php echo esc_attr( $this->get_field_id('post_id') ); ?>"><?php esc_html_e('Select Home Team:', 'sportsteam-widget'); ?></label><br />
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_id') ); ?>">
			<?php
			if ( $class ) {
				$args = array(
					'post_type' => 'sportsteams',
					'showposts' => -1, //all
					'paged'     => false,
					'orderby'   => 'title',
					'order'     => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'st_classes',
							'field'    => 'id',
							'terms'    => $class,
						),
					),
				);
			} else {
				$args = array(
					'post_type' => 'sportsteams',
					'showposts' => -1, //all
					'paged'     => false,
					'orderby'   => 'title',
					'order'     => 'ASC',
				);
			}

			$wp_teams = new WP_Query( $args );

			if ( $wp_teams->have_posts() ) {
				while ( $wp_teams->have_posts() ) {
					$wp_teams->the_post();
					$selected = false;
					if (get_the_ID() === $post_id) {
						$selected = true;
					}
					echo '<option value="' . (int) get_the_ID() . '"'
						. selected( $selected )
						. '>' . esc_html( get_the_title() ) . '</option>
						';
				}
			}

			/* Restore original Post Data */
			wp_reset_postdata(); ?>
		</select></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('result') ); ?>"><?php esc_html_e( 'Result:', 'sportsteam-widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('result') ); ?>" name="<?php echo esc_attr( $this->get_field_name('result') ); ?>" type="text" value="<?php echo esc_attr( $result ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('color') ); ?>"><?php esc_html_e('Color:', 'sportsteam-widget'); ?></label><br />
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id('color') ); ?>" name="<?php echo esc_attr( $this->get_field_name('color') ); ?>">
			<option value="none" <?php if ( $color === 'none' ) { echo 'selected'; } ?>><?php esc_html_e( 'None', 'sportsteam-widget' ); ?></option>
			<option value="green" <?php if ( $color === 'green' ) { echo 'selected'; } ?>><?php esc_html_e( 'Green', 'sportsteam-widget' ); ?></option>
			<option value="yellow" <?php if ( $color === 'yellow' ) { echo 'selected'; } ?>><?php esc_html_e( 'Yellow', 'sportsteam-widget' ); ?></option>
			<option value="red" <?php if ( $color === 'red' ) { echo 'selected'; } ?>><?php esc_html_e( 'Red', 'sportsteam-widget' ); ?></option>
		</select></p>

		<hr />

		<p><label for="<?php echo esc_attr( $this->get_field_id('post_id2') ); ?>"><?php esc_html_e('Select Out Team:', 'sportsteam-widget'); ?></label><br />
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_id2') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_id2') ); ?>">
			<?php
			// $args // Reuse it from the previous input

			$wp_teams = new WP_Query( $args );

			if ( $wp_teams->have_posts() ) {
				while ( $wp_teams->have_posts() ) {
					$wp_teams->the_post();
					$selected = false;
					if (get_the_ID() === $post_id2) {
						$selected = true;
					}
					echo '<option value="' . (int) get_the_ID() . '"'
						. selected( $selected )
						. '>' . esc_html( get_the_title() ) . '</option>
						';
				}
			}

			/* Restore original Post Data */
			wp_reset_postdata(); ?>
		</select></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('result2') ); ?>"><?php esc_html_e( 'Result:', 'sportsteam-widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('result2') ); ?>" name="<?php echo esc_attr( $this->get_field_name('result2') ); ?>" type="text" value="<?php echo esc_attr( $result2 ); ?>" /></p>


		<p><label for="<?php echo esc_attr( $this->get_field_id('color2') ); ?>"><?php esc_html_e('Color:', 'sportsteam-widget'); ?></label><br />
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id('color2') ); ?>" name="<?php echo esc_attr( $this->get_field_name('color2') ); ?>">
			<option value="none" <?php if ( $color2 === 'none' ) { echo 'selected'; } ?>><?php esc_html_e( 'None', 'sportsteam-widget' ); ?></option>
			<option value="green" <?php if ( $color2 === 'green' ) { echo 'selected'; } ?>><?php esc_html_e( 'Green', 'sportsteam-widget' ); ?></option>
			<option value="yellow" <?php if ( $color2 === 'yellow' ) { echo 'selected'; } ?>><?php esc_html_e( 'Yellow', 'sportsteam-widget' ); ?></option>
			<option value="red" <?php if ( $color2 === 'red' ) { echo 'selected'; } ?>><?php esc_html_e( 'Red', 'sportsteam-widget' ); ?></option>
		</select></p>

		<hr />

		<p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('links') ); ?>" name="<?php echo esc_attr( $this->get_field_name('links') ); ?>"<?php checked( $links ); ?> />
		<label for="<?php echo esc_attr( $this->get_field_id('links') ); ?>"><?php esc_html_e( 'Show as links', 'sportsteam-widget' ); ?></label></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('bgcolor') ); ?>"><?php esc_html_e( 'Background Color:', 'sportsteam-widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('bgcolor') ); ?>" name="<?php echo esc_attr( $this->get_field_name('bgcolor') ); ?>" type="text" value="<?php echo esc_attr( $bgcolor ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id('textcolor') ); ?>"><?php esc_html_e( 'Text Color:', 'sportsteam-widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('textcolor') ); ?>" name="<?php echo esc_attr( $this->get_field_name('textcolor') ); ?>" type="text" value="<?php echo esc_attr( $textcolor ); ?>" /></p>

		<?php
	}

}

function sprttm_sportsteam_widget() {
	register_widget('Sprttm_SportsTeam');
}

add_action('widgets_init', 'sprttm_sportsteam_widget' );

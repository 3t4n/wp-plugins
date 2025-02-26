<?php
 /**
  * Aarambha Kits Wp Popular Posts Widget
  *
  * @link       https://aarambhathemes.com/
  * @since      1.0.0
  *
  * @package    Aarambha_Kits
  * @subpackage Aarambha_Kits/includes/widgets
  * @author     Aarambha Themes <aarambhathemes@gmail.com>
  */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Popular Posts Widget
 *
 * Class Aarambha_Kits_Block_Widget_5
 */
class Aarambha_Kits_Block_Widget_5 extends Base_WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_block widget-aarambha-kits';
		$this->widget_description = esc_html__( 'Displays the most popular posts with number of post views.', 'aarambha-kits' );
		$this->widget_name        = esc_html__( 'Aarambha Kits: Block Popular Posts', 'aarambha-kits' );
		$this->settings           = array(
			'title' => array(
				'type'    => 'text',
				'default' => '',
				'label'   => esc_html__( 'Title', 'aarambha-kits' ),
			),
			'limit' => array(
				'type'        => 'number',
				'default'     => 5,
				'label'       => esc_html__( 'Posts Limit', 'aarambha-kits' ),
				'input_attrs' => array(
					'min' => 0,
					'max' => 6,
				),
			),
		);
		parent::__construct();

	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args     Arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {

		$title   = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$limit   = isset( $instance['limit'] ) ? $instance['limit'] : 5;
		$wp_args = aarambha_kits_query_agrs( array( 'base_posts_limit' => absint( $limit ) ), 1 );
		$wp_args = wp_parse_args(
			array(
				'orderby'  => 'meta_value_num',
				'order'    => 'DESC',
				'meta_key' => 'aarambha_kits_total_views',
			),
			$wp_args
		);

		$the_query = new WP_Query( $wp_args );

		$this->widget_start( $args );
		?>
		<div class="aarambha-kits-wp-block-group">

			<div class="aarambha-kits-wp-block-group__inner-container">
				<?php
				// Displays the widget title.
				$this->widget_title( $title );
				?>

				<?php
				if ( $the_query->have_posts() ) {
					$counter = 1;
					?>
					<div class="aarambha-kits-wp-block-popular-posts">

						<?php
						while ( $the_query->have_posts() ) :
							$the_query->the_post();

							$post_wrapper = ( $counter === 1 ) ? 'aarambha-kits-post-wrapper d-flex flex-column' : 'aarambha-kits-post-wrapper d-flex flex-row';
							$image_ratio  = ( $counter === 1 ) ? '16x9' : '1x1';
							?>

							<article id="post-<?php the_ID(); ?>" class="<?php echo esc_attr( $post_wrapper ); ?>">

								<div class="post-thumbnail-wrap">
								   <?php aarambha_kits_post_thumbnail( 'full', $image_ratio ); ?>
								</div><!-- .post-thumbnail-wrap -->
								
								<div class="aarambha-kits-post-detail-wrap">

								   <?php 	
								    printf( 
										'<h5 class="entry-title"><a href="%1$s" rel="bookmark">' . esc_html( get_the_title() ) . '</a></h5>',
										esc_url( get_permalink() )
									); ?>

								   <?php
									aarambha_kits_post_meta(
										array(
											1 => array(
												'type' => 'author',
											),
											2 => array(
												'type' => 'date',
											),
										)
									); // post meta author and date
									?>

									<?php if ( 1 == $counter ) : ?>
										<div class="entry-content">
											<?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 20, '...' ) ); ?>
										</div>
									<?php endif; ?>

								</div><!-- .aarambha-kits-post-detail-wrap -->

							</article>

							<?php
							$counter++;
endwhile;
						?>

					</div><!-- .aarambha-kits-wp-block-featured-posts -->
				<?php } ?>

			</div><!-- .aarambha-kits-wp-block-group__inner-container -->

		</div><!-- .aarambha-kits-wp-block-group -->
		<?php
		$this->widget_end( $args );
	}
}

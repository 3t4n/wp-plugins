<?php
 /**
  * Aarambha Kits Wp Featured Posts Widget
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
 * Featured Posts Widget
 *
 * Class Aarambha_Kits_Block_Widget_4
 */
class Aarambha_Kits_Block_Widget_4 extends Base_WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_block widget-aarambha-kits';
		$this->widget_description = esc_html__( 'Display latest posts or posts of specific category.', 'aarambha-kits' );
		$this->widget_name        = esc_html__( 'Aarambha Kits: Block Featured Posts', 'aarambha-kits' );
		$this->settings           = array(
			'title'    => array(
				'type'    => 'text',
				'default' => '',
				'label'   => esc_html__( 'Title', 'aarambha-kits' ),
			),
			'style'    => array(
				'type'    => 'select',
				'default' => 'style-1',
				'label'   => esc_html__( 'Style', 'aarambha-kits' ),
				'choices' => array(
					'style-1' => esc_html__( 'Style 1', 'aarambha-kits' ),
					'style-2' => esc_html__( 'Style 2', 'aarambha-kits' ),
					'style-3' => esc_html__( 'Style 3', 'aarambha-kits' ),
				),
			),
			'limit'    => array(
				'type'        => 'number',
				'default'     => 5,
				'label'       => esc_html__( 'Posts Limit', 'aarambha-kits' ),
				'input_attrs' => array(
					'min' => 0,
					'max' => 6,
				),
			),
			'category' => array(
				'type'            => 'dropdown_categories',
				'default'         => '',
				'label'           => esc_html__( 'Select category', 'aarambha-kits' ),
				'show_option_all' => esc_html__( 'All', 'aarambha-kits' ),
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
		$style   = isset( $instance['style'] ) ? $instance['style'] : 'style-1';
		$wp_args = aarambha_kits_query_agrs( array( 'base_posts_limit' => $limit ), 1 );
		if ( isset($instance['category']) ) {
			$wp_args = wp_parse_args(
				array(
					'category__in' => absint( $instance['category'] ),
				),
				$wp_args
			);
		}

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
					<div class="aarambha-kits-wp-block-featured-posts <?php echo esc_attr( $style ); ?>">

						<?php
						while ( $the_query->have_posts() ) :
							$the_query->the_post();

							$post_wrapper = ( $style == 'style-1' )
							   ? 'aarambha-kits-post-wrapper d-flex flex-column'
							   : ( $style == 'style-2'
								   ? 'aarambha-kits-post-wrapper d-flex flex-row'
								   : ( $counter === 1 ? 'aarambha-kits-post-wrapper d-flex flex-column' : 'aarambha-kits-post-wrapper d-flex flex-row' )
							   );
							$image_ratio  = ( ( $style == 'style-3' && $counter === 1 ) || $style == 'style-1' ) ? '16x9' : '3x4';
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

									<?php if ( $style == 'style-1' || ( $style == 'style-3' && 1 == $counter ) ) : ?>
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

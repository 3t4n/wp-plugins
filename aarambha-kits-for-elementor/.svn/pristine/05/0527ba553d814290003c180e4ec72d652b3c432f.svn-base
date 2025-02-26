<?php
 /**
  * Aarambha Kits WP Category Widget
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
 * Category Widget
 *
 * Class Aarambha_Kits_Block_Widget_3
 */
class Aarambha_Kits_Block_Widget_3 extends Base_WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_block widget-aarambha-kits';
		$this->widget_description = esc_html__( 'Displays categories and posts.', 'aarambha-kits' );
		$this->widget_name        = esc_html__( 'Aarambha Kits: Block Category', 'aarambha-kits' );
		$this->settings           = array(
			'title' => array(
				'type'    => 'text',
				'default' => '',
				'label'   => esc_html__( 'Title', 'aarambha-kits' ),
			),
			'limit' => array(
				'type'        => 'number',
				'default'     => 5,
				'label'       => esc_html__( 'Top Categories', 'aarambha-kits' ),
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

		$title        = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$top_category = isset( $instance['limit'] ) ? $instance['limit'] : 5;

		$post_cat_lists = get_categories(
			array( 'hide_empty' => '0' )
		);
		$slug_counts    = array();
		foreach ( $post_cat_lists as $post_cat_list ) {
			if ( $post_cat_list->count >= 1 ) {
				$slug_counts[] = array(
					'count'  => $post_cat_list->count,
					'slug'   => $post_cat_list->slug,
					'name'   => $post_cat_list->name,
					'cat_ID' => $post_cat_list->cat_ID,
				);
			}
		}

		$this->widget_start( $args );

		?>
		<div class="aarambha-kits-wp-block-group">

			<div class="aarambha-kits-wp-block-group__inner-container">
				<?php
				// Displays the widget title.
				$this->widget_title( $title );
				?>

				<?php
				if ( $slug_counts ) {
					arsort( $slug_counts );
					?>
					<ul class="aarambha-kits-wp-block-categories">

						<?php
						$count = 1;

						foreach ( $slug_counts as $slug_count ) {

							if ( $count > $top_category ) {
								break; }

							$cat_link  = get_category_link( $slug_count['cat_ID'] );
							$cat_name  = $slug_count['name'];
							$cat_count = $slug_count['count'];
							?>

							<li class="d-flex justify-content-between aarambha-kits-cat-item cat-item-<?php echo esc_attr( $slug_count['cat_ID'] ); ?>">
								<a href="<?php echo esc_url( $cat_link ); ?>">
									<span class="cat-title"><?php echo esc_html( $cat_name ); ?></span>
								</a>
								<span class="post-count"><?php echo absint( $cat_count ); ?></span>
							</li>	

						<?php $count++; } ?>

					</ul>
				<?php } ?>


			</div><!-- .aarambha-kits-wp-container -->

		</div><!-- .aarambha-kits-wp-container -->

		<?php

		$this->widget_end( $args );
	}
}

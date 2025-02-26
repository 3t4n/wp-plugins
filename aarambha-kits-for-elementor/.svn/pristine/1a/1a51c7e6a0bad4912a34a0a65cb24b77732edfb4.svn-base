<?php
 /**
  * Aarambha Kits Custom Advertisement Widget
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
 * advertisement Widget
 *
 * Class Aarambha_Kits_Block_Widget_2
 */
class Aarambha_Kits_Block_Widget_2 extends Base_WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_block widget-aarambha-kits';
		$this->widget_description = esc_html__( 'Add your 255x392 advertisement here.', 'aarambha-kits' );
		$this->widget_name        = esc_html__( 'Aarambha Kits: Block Advertisement', 'aarambha-kits' );
		$this->settings           = array(
			'title'      => array(
				'type'    => 'text',
				'default' => '',
				'label'   => esc_html__( 'Title', 'aarambha-kits' ),
			),
			'image_url'  => array(
				'type'    => 'image',
				'default' => '',
				'label'   => esc_html__( 'Upload Image', 'aarambha-kits' ),
			),
			'image_link' => array(
				'type'    => 'url',
				'default' => '#',
				'label'   => esc_html__( 'Image Link', 'aarambha-kits' ),
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

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$this->widget_start( $args );
		?>

		<div class="aarambha-kits-wp-block-group">

			<div class="aarambha-kits-wp-block-group__inner-container">
				<?php
				// Displays the widget title.
				$this->widget_title( $title );
				?>

				<div class="aarambha-kits-wp-block-advertisement">

					<?php
					if ( ! empty( $instance['image_url'] ) ) {
						$image_id  = attachment_url_to_postid( $instance['image_url'] );
						$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
						?>

						<div class="aarambha-kits-advertisement-content">
							<?php if ( ! empty( $instance['image_link'] ) ) : ?>
								<a href="<?php echo esc_url( $instance['image_link'] ); ?>" class="single-ads-255x392" target="_blank" rel="nofollow">
									<img src="<?php echo esc_url( $instance['image_url'] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
								</a>
							<?php else : ?>
								<img src="<?php echo esc_url( $instance['image_url'] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
							<?php endif; ?>
						</div>
						
					<?php } ?>

				</div><!-- .aarambha-kits-wp-block-advertisement -->

			</div><!-- .aarambha-kits-wp-block-group__inner-container -->

		</div><!-- .aarambha-kits-wp-block-group -->

		<?php
		$this->widget_end( $args );
	}
}

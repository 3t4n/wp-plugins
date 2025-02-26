<?php
 /**
  * Aarambha Kits WP Author Widget
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
 * Author Widget
 *
 * Class Aarambha_Kits_Block_Widget_1
 */
class Aarambha_Kits_Block_Widget_1 extends Base_WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_block widget-aarambha-kits';
		$this->widget_description = esc_html__( 'Displays authors details in post.', 'aarambha-kits' );
		$this->widget_name        = esc_html__( 'Aarambha Kits: Block Author', 'aarambha-kits' );
		$this->settings           = array(
			'title'        => array(
				'type'    => 'text',
				'default' => '',
				'label'   => esc_html__( 'Title', 'aarambha-kits' ),
			),
			'image_bg_url' => array(
				'type'    => 'image',
				'default' => '',
				'label'   => esc_html__( 'Background Image', 'aarambha-kits' ),
			),
			'author_name'  => array(
				'type'    => 'text',
				'default' => '',
				'label'   => esc_html__( 'Name', 'aarambha-kits' ),
			),
			'description'  => array(
				'type'    => 'textarea',
				'default' => '',
				'label'   => esc_html__( 'Description', 'aarambha-kits' ),
			),
			'image_url'    => array(
				'type'    => 'image',
				'default' => '',
				'label'   => esc_html__( 'Avatar', 'aarambha-kits' ),
			),
			'url_fc'       => array(
				'type'    => 'url',
				'default' => '',
				'label'   => esc_html__( 'Facebook URL', 'aarambha-kits' ),
			),
			'url_tw'       => array(
				'type'    => 'url',
				'default' => '',
				'label'   => esc_html__( 'Twitter URL', 'aarambha-kits' ),
			),
			'url_ldn'      => array(
				'type'    => 'url',
				'default' => '',
				'label'   => esc_html__( 'Linkedin URL', 'aarambha-kits' ),
			),
			'url_ig'       => array(
				'type'    => 'url',
				'default' => '',
				'label'   => esc_html__( 'Instagram URL', 'aarambha-kits' ),
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

				<div class="aarambha-kits-wp-block-about 
				<?php
				if ( isset($instance['image_bg_url'] ) ) {
					echo 'data-background-enable'; }
				?>
				">

				<?php if ( ! empty( $instance['image_bg_url'] ) ) { ?>
					<div class="aarambha-kits-data-background data-background-medium" data-background="<?php echo esc_url( $instance['image_bg_url'] ); ?>">
					</div>
				<?php } ?>

				<div class="author-avatar">
					<?php if ( ! empty( $instance['image_url'] ) ) { ?>
						<div class="aarambha-kits-data-background data-avatar-background" data-background="<?php echo esc_url( $instance['image_url'] ); ?>">
						</div>
					<?php } ?>
				</div>
				<div class="author-content">
					<?php if ( ! empty( $instance['author_name'] ) ) { ?>
						<h3 class="author-name"><?php echo esc_html( $instance['author_name'] ); ?></h3>
					<?php } ?>
					<?php if ( ! empty( $instance['description'] ) ) { ?>
						<div class="author-bio"><?php echo wp_kses_post( $instance['description'] ); ?></div>
					<?php } ?>
				</div>

				<div class="author-social-profiles">
					<?php if ( ! empty( $instance['url_fc'] ) ) { ?>
						<a href="<?php echo esc_url( $instance['url_fc'] ); ?>" target="_blank" class="author-social-icon author-social-facebook">
							<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M17.525,9H14V7c0-1.032,0.084-1.682,1.563-1.682h1.868v-3.18C16.522,2.044,15.608,1.998,14.693,2 C11.98,2,10,3.657,10,6.699V9H7v4l3-0.001V22h4v-9.003l3.066-0.001L17.525,9z"></path></svg>
						</a>
					<?php } ?>
					<?php if ( ! empty( $instance['url_tw'] ) ) { ?>
						<a href="<?php echo esc_url( $instance['url_tw'] ); ?>" target="_blank" class="author-social-icon author-social-twitter">
							<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M22.23,5.924c-0.736,0.326-1.527,0.547-2.357,0.646c0.847-0.508,1.498-1.312,1.804-2.27 c-0.793,0.47-1.671,0.812-2.606,0.996C18.324,4.498,17.257,4,16.077,4c-2.266,0-4.103,1.837-4.103,4.103 c0,0.322,0.036,0.635,0.106,0.935C8.67,8.867,5.647,7.234,3.623,4.751C3.27,5.357,3.067,6.062,3.067,6.814 c0,1.424,0.724,2.679,1.825,3.415c-0.673-0.021-1.305-0.206-1.859-0.513c0,0.017,0,0.034,0,0.052c0,1.988,1.414,3.647,3.292,4.023 c-0.344,0.094-0.707,0.144-1.081,0.144c-0.264,0-0.521-0.026-0.772-0.074c0.522,1.63,2.038,2.816,3.833,2.85 c-1.404,1.1-3.174,1.756-5.096,1.756c-0.331,0-0.658-0.019-0.979-0.057c1.816,1.164,3.973,1.843,6.29,1.843 c7.547,0,11.675-6.252,11.675-11.675c0-0.178-0.004-0.355-0.012-0.531C20.985,7.47,21.68,6.747,22.23,5.924z"></path></svg>
						</a>
					<?php } ?>
					<?php if ( ! empty( $instance['url_ldn'] ) ) { ?>
						<a href="<?php echo esc_url( $instance['url_ldn'] ); ?>" target="_blank" class="author-social-icon author-social-linkedin">
							<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M19.7,3H4.3C3.582,3,3,3.582,3,4.3v15.4C3,20.418,3.582,21,4.3,21h15.4c0.718,0,1.3-0.582,1.3-1.3V4.3 C21,3.582,20.418,3,19.7,3z M8.339,18.338H5.667v-8.59h2.672V18.338z M7.004,8.574c-0.857,0-1.549-0.694-1.549-1.548 c0-0.855,0.691-1.548,1.549-1.548c0.854,0,1.547,0.694,1.547,1.548C8.551,7.881,7.858,8.574,7.004,8.574z M18.339,18.338h-2.669 v-4.177c0-0.996-0.017-2.278-1.387-2.278c-1.389,0-1.601,1.086-1.601,2.206v4.249h-2.667v-8.59h2.559v1.174h0.037 c0.356-0.675,1.227-1.387,2.526-1.387c2.703,0,3.203,1.779,3.203,4.092V18.338z"></path></svg>
						</a>
					<?php } ?>
					<?php if ( ! empty( $instance['url_ig'] ) ) { ?>
						<a href="<?php echo esc_url( $instance['url_ig'] ); ?>" target="_blank" class="author-social-icon author-social-instagram">
							<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4.622c2.403,0,2.688,0.009,3.637,0.052c0.877,0.04,1.354,0.187,1.671,0.31c0.42,0.163,0.72,0.358,1.035,0.673 c0.315,0.315,0.51,0.615,0.673,1.035c0.123,0.317,0.27,0.794,0.31,1.671c0.043,0.949,0.052,1.234,0.052,3.637 s-0.009,2.688-0.052,3.637c-0.04,0.877-0.187,1.354-0.31,1.671c-0.163,0.42-0.358,0.72-0.673,1.035 c-0.315,0.315-0.615,0.51-1.035,0.673c-0.317,0.123-0.794,0.27-1.671,0.31c-0.949,0.043-1.233,0.052-3.637,0.052 s-2.688-0.009-3.637-0.052c-0.877-0.04-1.354-0.187-1.671-0.31c-0.42-0.163-0.72-0.358-1.035-0.673 c-0.315-0.315-0.51-0.615-0.673-1.035c-0.123-0.317-0.27-0.794-0.31-1.671C4.631,14.688,4.622,14.403,4.622,12 s0.009-2.688,0.052-3.637c0.04-0.877,0.187-1.354,0.31-1.671c0.163-0.42,0.358-0.72,0.673-1.035 c0.315-0.315,0.615-0.51,1.035-0.673c0.317-0.123,0.794-0.27,1.671-0.31C9.312,4.631,9.597,4.622,12,4.622 M12,3 C9.556,3,9.249,3.01,8.289,3.054C7.331,3.098,6.677,3.25,6.105,3.472C5.513,3.702,5.011,4.01,4.511,4.511 c-0.5,0.5-0.808,1.002-1.038,1.594C3.25,6.677,3.098,7.331,3.054,8.289C3.01,9.249,3,9.556,3,12c0,2.444,0.01,2.751,0.054,3.711 c0.044,0.958,0.196,1.612,0.418,2.185c0.23,0.592,0.538,1.094,1.038,1.594c0.5,0.5,1.002,0.808,1.594,1.038 c0.572,0.222,1.227,0.375,2.185,0.418C9.249,20.99,9.556,21,12,21s2.751-0.01,3.711-0.054c0.958-0.044,1.612-0.196,2.185-0.418 c0.592-0.23,1.094-0.538,1.594-1.038c0.5-0.5,0.808-1.002,1.038-1.594c0.222-0.572,0.375-1.227,0.418-2.185 C20.99,14.751,21,14.444,21,12s-0.01-2.751-0.054-3.711c-0.044-0.958-0.196-1.612-0.418-2.185c-0.23-0.592-0.538-1.094-1.038-1.594 c-0.5-0.5-1.002-0.808-1.594-1.038c-0.572-0.222-1.227-0.375-2.185-0.418C14.751,3.01,14.444,3,12,3L12,3z M12,7.378 c-2.552,0-4.622,2.069-4.622,4.622S9.448,16.622,12,16.622s4.622-2.069,4.622-4.622S14.552,7.378,12,7.378z M12,15 c-1.657,0-3-1.343-3-3s1.343-3,3-3s3,1.343,3,3S13.657,15,12,15z M16.804,6.116c-0.596,0-1.08,0.484-1.08,1.08 s0.484,1.08,1.08,1.08c0.596,0,1.08-0.484,1.08-1.08S17.401,6.116,16.804,6.116z"></path></svg>
						</a>
					<?php } ?>
				</div>

				</div><!-- .aarambha-kits-wp-block-about -->

			</div><!-- .aarambha-kits-wp-block-group__inner-container -->

		</div><!-- .aarambha-kits-wp-block-group -->

		<?php
		$this->widget_end( $args );
	}
}

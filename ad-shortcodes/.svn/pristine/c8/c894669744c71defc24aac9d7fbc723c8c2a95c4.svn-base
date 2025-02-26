<?php
/**
 * Set widget.
 */

// Import languages.
require_once __DIR__ . '/language.php';

class ZumiAdWidget extends WP_Widget {
	/**
	 * Store language obuject.

	 * @var string $lan
	 */
	private $lan;
	/**
	 * Store old_id in case of user change id.

	 * @var string $ad
	 */
	private $ad;

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->lan = new Language( get_locale() );

		parent::__construct(
			'zumi_ads',
			$this->lan->app_name . ' by Zumi',
			array( 'description' => $this->lan->app_description )
		);

	}
	/**
	 * Widget backend.

	 * @param array $instance The settings for the particular instance of the widget.
	 */
	public function form( $instance ) {


		// Import fixed ads.
		$ads = ZumiFixedAd::getByColumn( 'position', 'widget' );

		?>
		<select id = "<?php echo esc_html( $this->get_field_id( 'ad' ) ); ?> " name="<?php echo esc_html( $this->get_field_name( 'ad' ) ); ?>">
		<?php foreach ( $ads as $ad ) : ?>
			<option value="<?php echo esc_html( $ad->id ); ?>" 
				<?php
				if ( $instance['ad'] === $ad->id ) {
					echo 'selected';
				}
				?>
				>
				<?php echo esc_html( $ad->name ); ?></option>

		<?php endforeach; ?>
		</select>

		<?php
	}
	/**
	 * Widget backend.

	 * @param array $args     Display arguments including 'before_title', 'after_title', 'before_widget', and 'after_widget'.
	 * @param array $instance The settings for the particular instance of the widget.
	 */
	public function widget( $args, $instance ) {

		// Import fixed ads.
		$ad = ZumiFixedAd::get( $instance['ad'] );

		echo do_shortcode( $ad->content );
	}

}

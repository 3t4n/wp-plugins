<?php
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'grfwpDeactivationSurvey' ) ) {
/**
 * Class to handle plugin deactivation survey
 *
 * @since 1.2.3
 */
class grfwpDeactivationSurvey {

	public function __construct() {
		add_action( 'current_screen', array( $this, 'maybe_add_survey' ) );
	}

	public function maybe_add_survey() {
		if ( in_array( get_current_screen()->id, array( 'plugins', 'plugins-network' ), true) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_deactivation_scripts') );
			add_action( 'admin_footer', array( $this, 'add_deactivation_html') );
		}
	}

	public function enqueue_deactivation_scripts() {
		wp_enqueue_style( 'grfwp-deactivation-css', GRFWP_PLUGIN_URL . '/assets/css/plugin-deactivation.css' );
		wp_enqueue_script( 'grfwp-deactivation-js', GRFWP_PLUGIN_URL . '/assets/js/plugin-deactivation.js', array( 'jquery' ) );

		wp_localize_script( 'grfwp-deactivation-js', 'grfwp_deactivation_data', array( 'site_url' => site_url() ) );
	}

	public function add_deactivation_html() {

		$install_time = get_option( 'grfwp-installation-time' );
		
		$options = array(
			1 => array(
				'title'   => esc_html__( 'I no longer need the plugin', 'good-reviews-wp' ),
			),
			2 => array(
				'title'   => esc_html__( 'I\'m switching to a different plugin', 'good-reviews-wp' ),
				'details' => esc_html__( 'Please share which plugin', 'good-reviews-wp' ),
			),
			3 => array(
				'title'   => esc_html__( 'I couldn\'t get the plugin to work', 'good-reviews-wp' ),
				'details' => esc_html__( 'Please share what wasn\'t working', 'good-reviews-wp' ),
			),
			4 => array(
				'title'   => esc_html__( 'It\'s a temporary deactivation', 'good-reviews-wp' ),
			),
			5 => array(
				'title'   => esc_html__( 'Other', 'good-reviews-wp' ),
				'details' => esc_html__( 'Please share the reason', 'good-reviews-wp' ),
			),
		);
		?>
		<div class="grfwp-deactivate-survey-modal" id="grfwp-deactivate-survey-good-reviews">
			<div class="grfwp-deactivate-survey-wrap">
				<form class="grfwp-deactivate-survey" method="post" data-installtime="<?php echo $install_time; ?>">
					<span class="grfwp-deactivate-survey-title"><span class="dashicons dashicons-testimonial"></span><?php echo ' ' . __( 'Quick Feedback', 'good-reviews-wp' ); ?></span>
					<span class="grfwp-deactivate-survey-desc"><?php echo __('If you have a moment, please share why you are deactivating Five-Star Restaurant Reviews:', 'good-reviews-wp' ); ?></span>
					<div class="grfwp-deactivate-survey-options">
						<?php foreach ( $options as $id => $option ) : ?>
							<div class="grfwp-deactivate-survey-option">
								<label for="grfwp-deactivate-survey-option-good-reviews-wp-<?php echo $id; ?>" class="grfwp-deactivate-survey-option-label">
									<input id="grfwp-deactivate-survey-option-good-reviews-wp-<?php echo $id; ?>" class="grfwp-deactivate-survey-option-input" type="radio" name="code" value="<?php echo $id; ?>" />
									<span class="grfwp-deactivate-survey-option-reason"><?php echo $option['title']; ?></span>
								</label>
								<?php if ( ! empty( $option['details'] ) ) : ?>
									<input class="grfwp-deactivate-survey-option-details" type="text" placeholder="<?php echo $option['details']; ?>" />
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="grfwp-deactivate-survey-footer">
						<button type="submit" class="grfwp-deactivate-survey-submit button button-primary button-large"><?php _e('Submit and Deactivate', 'good-reviews-wp' ); ?></button>
						<a href="#" class="grfwp-deactivate-survey-deactivate"><?php _e('Skip and Deactivate', 'good-reviews-wp' ); ?></a>
					</div>
				</form>
			</div>
		</div>
		<?php
	}
}

}
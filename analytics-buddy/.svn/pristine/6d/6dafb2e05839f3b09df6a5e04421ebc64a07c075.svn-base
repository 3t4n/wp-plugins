<?php
/**
 * This file handles displaying the GA code
 *
 * @package ANBU
 */

/**
 * Creates and outputs the necessary GA code
 *
 * @since 1.0.0
 */
function anbu_add_ga_script() {
	global $analytics_buddy;
	$settings = $analytics_buddy->get_settings();

	// If the tracking ID is empty, or IF the setting to disable user is on, then check if user is logged in.
	if ( ! empty( $settings['tracking_id'] ) && ( '1' != $settings['disable_user'] || ! is_user_logged_in() ) ) {
		?>
		<!-- Google Analytics added by Analytics Buddy v1.0.0 -->
		<script>
			<?php
			// If we should honor Do Not Track, add if in JS to check.
			if ( '1' == $settings['do_not_track'] ) {
				?>
				if ('1' != navigator.doNotTrack && '1' != window.doNotTrack ) {
				<?php
			}
			?>
					(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

					ga('create', '<?php echo esc_js( $settings['tracking_id'] ); ?>', 'auto');
					<?php
					// If we are anonymizing IP addresses.
					if ( '1' == $settings['anonymize_ip'] ) {
						?>
						ga('set', 'anonymizeIp', true);
						<?php
					}
					?>
					ga('send', 'pageview');
			<?php
			if ( '1' == $settings['do_not_track'] ) {
				?>
				}
				<?php
			}
			?>
		</script>
		<?php
	}
}

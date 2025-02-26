<?php

/**
 * About panel view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Widgets
 */

require_once 'header.php';

?>

	<div class="signals-body">
		<div class="signals-tile" style="display: block !important">
			<div class="signals-single-section">
				<p><?php _e( '<strong>Widgets</strong> by <strong>69signals</strong> is a plugin which provides with the most essential widgets for the modern blog and we will make sure to update the plugin over time with more widgets & even more awesomeness.', 'signals' ); ?></p>
				<p><?php _e( 'Now that you have activated this plugin, all the widgets will appear in the Widgets section of your WordPress panel. Simply select the widget you would like to use and you are done. You don\'t have to configure anything. It\'s that simple.', 'signals' ); ?></p><br/>

				<?php

					// Getting our latest products and offer from the website
					$signals_offers = wp_remote_get( 'http://www.69signals.com/offers.php?product=widgets' );

					// Checking for the errors
					// If everything is OK, then display the information
					if ( ! is_wp_error( $signals_offers ) ) {
						echo '<div class="signals-tile-title">' . __( 'OFFERS', 'signals' ) . '</div>';
						echo $signals_offers['body'] . '<br/>';
					}

				?>

				<div class="signals-share">
					<p><?php _e( 'Show us some love. Connect with us via Social channels.', 'signals' ); ?></p>
					<a href="https://www.twitter.com/69signals" target="_blank">
						<img src="<?php echo SIGNALS_WIDGETS_URL; ?>/framework/admin/img/twitter.png" />
					</a>
					<a href="https://www.facebook.com/69Signals" target="_blank">
						<img src="<?php echo SIGNALS_WIDGETS_URL; ?>/framework/admin/img/facebook.png" />
					</a>
				</div>
			</div><!-- .signals-single-section -->
		</div><!-- .signals-tile -->
	</div><!-- .signals-body -->

<?php

require_once 'footer.php';
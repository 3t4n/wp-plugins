<?php

/**
 * Editor panel view for the plugin
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
				<div class="signals-tile-title"><?php _e( 'Custom CSS', 'signals' ); ?></div>
				<div class="signals-section-content">
					<p><?php _e( 'With the help of this editor panel, you have the option to set and use your custom css for the plugin. You can override the default plugin styles over here. Use this option only if you have working knowledge of CSS.', 'signals' ); ?></p>

					<?php

						// Showing the notification if it's set
						if ( isset( $signals_err ) ) {
							echo $signals_err;
						}

					?>

					<form role="form" method="post">
						<div id="signals-widgets-css-editor"></div>
						<textarea name="signals-widgets-css" id="signals-widgets-css" class="signals-block" rows="8" placeholder="Custom CSS for the plugin"><?php echo stripslashes( $signals_widgets_options['custom_css'] ); ?></textarea>

						<button type="submit" name="signals-css-submit" class="signals-btn signals-btn-red"><?php _e( 'Save', 'signals' ); ?></button>
					</form>
				</div><!-- .signals-section-content -->
			</div><!-- .signals-single-section -->
		</div><!-- .signals-tile -->
	</div><!-- .signals-body -->

<?php

require_once 'footer.php';
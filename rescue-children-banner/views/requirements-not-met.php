<div id="message" class="error">
	<p>
		<?php
			printf(
				__( 'Rescue Children Banner <strong>requires PHP %1$s</strong> and <strong>WordPress %2$s</strong> in order to work.', 'rescue-children-banner' ),
				esc_html( RCB_REQUIRED_PHP_VERSION ),
				esc_html( RCB_REQUIRED_WP_VERSION )
			);
		?>
		
		<?php
			printf(
				__( 'You\'re running PHP %1$s and WordPress %2$s. You\'ll need to upgrade in order to use this plugin.', 'rescue-children-banner' ),
				esc_html( PHP_VERSION ),
				esc_html( $wp_version )
			);
		?> 
		
		<?php _e( 'You can ask your hosting company to help you upgrade PHP, and if you need help upgrading WordPress you can refer to <a href="http://codex.wordpress.org/Upgrading_WordPress">the Codex</a>.', 'rescue-children-banner' ); ?>
	</p>
</div>

<div class="notice notice-success is-dismissible <?php echo esc_attr( $this->plugin_slug ); ?>-notice-welcome">
	<p>
		<?php
		printf(
			/* translators: 1: Name of Plugin 2: URL */
			wp_kses_post( __( 'Thanks for installing %1$s. <a href="%2$s">Click here</a> to configure the plugin.', 'youtube-subscribe-bar' ) ),
			esc_html( $this->plugin_name ),
			esc_url( $setting_page )
		);
		?>
	</p>
</div>
<script type="text/javascript">
	jQuery(document).ready( function($) {
		$(document).on( 'click', '.<?php echo esc_js( $this->plugin_slug ); ?>-notice-welcome button.notice-dismiss', function( event ) {
			event.preventDefault();
			$.post( '<?php echo esc_url( $ajax_url ); ?>', {
				action: '<?php echo esc_js( $this->plugin_slug ) . '_dismiss_dashboard_notices'; ?>',
				nonce: '<?php echo esc_js( wp_create_nonce( $this->plugin_slug . '-nonce' ) ); ?>'
			});
			$('.<?php echo esc_js( $this->plugin_slug ); ?>-notice-welcome').remove();
		});
	});
</script>

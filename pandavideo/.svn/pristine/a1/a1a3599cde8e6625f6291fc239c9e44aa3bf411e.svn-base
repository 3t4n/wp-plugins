<?php

class PandaVideo_ReportBug extends \Elementor\Base_Data_Control 
{
	public function get_type() 
	{
		return 'panda-report-bug';
	}
    
    public function enqueue()
	{
		wp_register_script( 'panda-report-error--sentry', 'https://browser.sentry-cdn.com/7.15.0/bundle.tracing.min.js', false, false);
		wp_enqueue_script( 'panda-report-error--sentry' );
		wp_register_script( 'panda-report-error--control', plugins_url( '/assets/js/reportBug.js', dirname( __FILE__ ) ), ['panda-report-error--sentry'], false);
		wp_enqueue_script( 'panda-report-error--control' );

		$script_params = array(
			'wp_version' => get_bloginfo( 'version' ),
			'panda_plugin_version' => get_file_data( WP_PLUGIN_DIR . PANDAVIDEO_PLUGIN_PATH . '/index.php', array('Version'), 'plugin' )[0],
			'installed_plugins' => get_plugins()
		);
		wp_localize_script( 'panda-report-error--control', 'pandaWpInfo', $script_params );
	}

	protected function get_default_settings() 
	{
		return [
			'label' => '',
			'sent_message' => ''
		];
	}

	public function content_template()
	{
		$control_uid = $this->get_control_uid();
		?>
			<div class="panda-report-bug--container">
				<div class="panda-about-plugin">
					<p><?php echo esc_html(__( 'Embed your videos from Panda Video easier with the Plugin!', 'pandavideo' )) ?></p>
					<p><?php echo esc_html(__( 'Feel free to talk to the', 'pandavideo' )) ?> <a href="https://pandavideo.com.br/" class="panda-link" target="_blank"><?php echo esc_html(__( 'support', 'pandavideo' )) ?></a> <?php echo esc_html(__( 'if needed', 'pandavideo' )) ?>.</p>
				</div>
				<div class="v-hr"></div>
				<button class="panda-report-bug--button panda--button">{{{ data.label }}}</button>
				<button class="panda-reported-bug--button panda--button">{{{ data.sent_message }}} &check;</button>
			</div>
			<style>
				.panda--button {
					border: none;
					height: 35px;
					appearance: none;
					padding: 10px;
					font-weight: 600;
					align-self: center;
					cursor: pointer;
				}

				.panda-report-bug--button {
					color: white;
					background: #478ef7;
				}

				.panda-reported-bug--button {
					background: gray;
					color: white;
					display: none;
					cursor: default;
				}

				.panda-link {
					color: #478ef7 !important;
					text-decoration: none !important;
					border-bottom: none !important;
				}

				.panda-report-bug--container {
					position: relative;
					display: grid;
					grid-template-columns: 1fr 2px .6fr;
					column-gap: 12px;
					width: 100%;
					padding: 16px 0px 2px 0px;
					border-top: 1px solid #e3e3e3;
					margin-bottom: 0px;
				}
				
				.panda-about-plugin p {
					line-height: 16px;
					font-family: rubik, sans-serif;
				}

				.panda-about-plugin p:last-child {
					margin-top: 10px;
				}

				.v-hr {
					height: 100%;
					width: 1px;
					background: #e3e3e3;
				}

				.panda-spacer {
					width: 100%;
					height: 10px;
				}
			</style>
		<?php
	}

}
<h1><?php _e( 'Google Analytics Settings', 'awesome-google-analytics' ); ?></h1>

<div id="aga-container">
	<form action="<?php echo admin_url('admin.php?page=aga_googleanalytics'); ?>" method="post">
		<?php wp_nonce_field( 'aga_settings_nonce', 'aga_settings_nonce' ); ?>
		<div class="aga-block">
			<h2 class="aga-title"><span class="dashicons dashicons-admin-generic"></span> <?php _e( 'Tracking code', 'awesome-google-analytics' ); ?>
			<small class="aga-status"><?php if( ! empty( $this->options['ua_code'] ) ): ?>
					<span class="aga-active"><span class="dashicons dashicons-yes dashicons-status"></span> <?php _e( 'Active' ); ?></span>
			<?php else: ?>
					<span class="aga-inactive"><span class="dashicons dashicons-no dashicons-status"></span> <?php _e( 'Inactive' ); ?></span>
			<?php endif; ?></small></h2>
			<?php if( ! empty( $this->options['ua_code'] ) ): ?>
				<p class="aga-text-center">Current tracking code:<br />
				<strong class="aga-tracking-code"><?php echo esc_attr( $this->options['ua_code'] ); ?></strong>
				</p>

				<p><br /></p>

				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&configure=ua_code'); ?>" class="button"><?php _e('Change UA Code', 'awesome-google-analytics'); ?></a></p>
			<?php else: ?>
				<p><?php _e( 'No universal tracking code was configured. In order to get this plugin working correctly, you\'ll need to configure a tracking code.', 'awesome-google-analytics' ); ?></p>

				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&configure=ua_code'); ?>" class="button button-primary"><?php _e('Configure UA Code', 'awesome-google-analytics'); ?></a></p>
			<?php endif; ?>
		</div>
		<div class="aga-block">
			<h2 class="aga-title"><span class="dashicons dashicons-groups"></span> <?php _e( 'Demographics & Interests', 'awesome-google-analytics' ); ?>
				<small class="aga-status"><?php if( $this->options['demographics'] === true ): ?>
						<span class="aga-active"><span class="dashicons dashicons-yes dashicons-status"></span> <?php _e( 'Active' ); ?></span>
					<?php else: ?>
						<span class="aga-inactive"><span class="dashicons dashicons-no dashicons-status"></span> <?php _e( 'Inactive' ); ?></span>
					<?php endif; ?></small></h2>
			<p><?php _e( 'With demographics & interests reports enabled, you can track a lot more information about your users. You can track their interests, age and gender. Note: in some countries you\'ll need to update your privacy policy.', 'awesome-google-analytics' ); ?></p>
			<?php if( $this->options['demographics'] === true ): ?>
				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&disable=demographics'); ?>" class="button"><?php _e('Disable this feature', 'awesome-google-analytics'); ?></a></p>
			<?php else: ?>
				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&enable=demographics'); ?>" class="button"><?php _e('Enable this feature', 'awesome-google-analytics'); ?></a></p>
			<?php endif; ?>
		</div>
		<div class="aga-block">
			<h2 class="aga-title"><span class="dashicons dashicons-admin-links"></span> <?php _e( 'Force SSL', 'awesome-google-analytics' ); ?>
				<small class="aga-status"><?php if( $this->options['forcessl'] === true ): ?>
						<span class="aga-active"><span class="dashicons dashicons-yes dashicons-status"></span> <?php _e( 'Active' ); ?></span>
					<?php else: ?>
						<span class="aga-inactive"><span class="dashicons dashicons-no dashicons-status"></span> <?php _e( 'Inactive' ); ?></span>
					<?php endif; ?></small></h2>
			<p><?php _e( 'When ForceSSL is enabled, Google Analytics is always using the HTTPs protocol. This ensures you that the data is secured to Google.', 'awesome-google-analytics' ); ?></p>
			<?php if( $this->options['forcessl'] === true ): ?>
				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&disable=forcessl'); ?>" class="button"><?php _e('Disable this feature', 'awesome-google-analytics'); ?></a></p>
			<?php else: ?>
				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&enable=forcessl'); ?>" class="button"><?php _e('Enable this feature', 'awesome-google-analytics'); ?></a></p>
			<?php endif; ?>
		</div>
		<div class="aga-block">
			<h2 class="aga-title"><span class="dashicons dashicons-welcome-view-site"></span> <?php _e( 'Anonymize IP', 'awesome-google-analytics' ); ?>
				<small class="aga-status"><?php if( $this->options['anonymizeip'] === true ): ?>
						<span class="aga-active"><span class="dashicons dashicons-yes dashicons-status"></span> <?php _e( 'Active' ); ?></span>
					<?php else: ?>
						<span class="aga-inactive"><span class="dashicons dashicons-no dashicons-status"></span> <?php _e( 'Inactive' ); ?></span>
					<?php endif; ?></small></h2>
			<p><?php _e( 'With anonymize ip addresses enabled, Google does not store the complete IP address of your visitors. This is really helpful for some countries with cookie laws, because the data could not related to a user.', 'awesome-google-analytics' ); ?></p>
			<?php if( $this->options['anonymizeip'] === true ): ?>
				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&disable=anonymizeip'); ?>" class="button"><?php _e('Disable this feature', 'awesome-google-analytics'); ?></a></p>
			<?php else: ?>
				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&enable=anonymizeip'); ?>" class="button"><?php _e('Enable this feature', 'awesome-google-analytics'); ?></a></p>
			<?php endif; ?>
		</div>
		<div class="aga-block">
			<h2 class="aga-title"><span class="dashicons dashicons-media-interactive"></span> <?php _e( 'AutoTrack', 'awesome-google-analytics' ); ?>
				<small class="aga-status"><?php if( $this->options['autotrack'] === true ): ?>
						<span class="aga-active"><span class="dashicons dashicons-yes dashicons-status"></span> <?php _e( 'Active' ); ?></span>
					<?php else: ?>
						<span class="aga-inactive"><span class="dashicons dashicons-no dashicons-status"></span> <?php _e( 'Inactive' ); ?></span>
					<?php endif; ?></small></h2>
			<p><?php _e( 'AutoTrack is a new feature in Google Analytics. The AutoTrack feature will create events on your outbound links, social media links and partially fixes the session duration.', 'awesome-google-analytics' ); ?></p>
			<?php if( $this->options['autotrack'] === true ): ?>
				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&disable=autotrack'); ?>" class="button"><?php _e('Disable this feature', 'awesome-google-analytics'); ?></a></p>
			<?php else: ?>
				<p><a href="<?php echo admin_url('admin.php?page=aga_googleanalytics&enable=autotrack'); ?>" class="button"><?php _e('Enable this feature', 'awesome-google-analytics'); ?></a></p>
			<?php endif; ?>
		</div>
		<div class="aga-block aga-no-bg">
			<h2 class="aga-title"><?php _e( 'Support & Documentation', 'awesome-google-analytics' ); ?></h2>
			<p><ul>
				<li><a href="https://wordpress.org/support/plugin/awesome-google-analytics" target="_blank"><?php _e('WordPress support forums', 'awesome-google-analytics'); ?></a></li>
				<li><a href="https://twitter.com/CodeBrothersHQ" target="_blank"><?php _e('Twitter @CodeBrothersHQ', 'awesome-google-analytics'); ?></a></li>
				<li><a href="https://spamlytics.com/?utm_source=wordpress&utm_medium=banner&utm_campaign=codebrothers-ga" target="_blank"><?php _e('SpamLytics Google Analytics blog', 'awesome-google-analytics'); ?></a></li>
				<li><a href="https://wordpress.org/support/view/plugin-reviews/awesome-google-analytics?rate=5#postform" target="_blank"><?php _e('Leave a ★★★★★ review', 'awesome-google-analytics'); ?></a></li>
			</ul></p>
		</div>
	</div>
	</form>
</div>
<div class="aga-clear"></div>

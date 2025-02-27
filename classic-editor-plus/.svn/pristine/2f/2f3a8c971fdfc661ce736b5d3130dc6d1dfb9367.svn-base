<?php
$settings = YCE_Classic_Editor::get_settings('refresh');
?>
<div class="yce-bootstrap-wrapper">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default yce-settings-panel">
				<div class="panel-heading"><?php _e('Settings', YCE_LANG)?></div>
				<div class="panel-body">
					<form action="<?php echo admin_url().'admin-post.php?action=yceSaveSettings'?>" method="POST">
						<?php wp_nonce_field('YCE_ADMIN_POST_NONCE', YCE_ADMIN_POST_NONCE);?>
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<label for="default_category"><?php _e('Default editor for all users', 'classic-editor'); ?></label>
							</div>
							<div class="col-md-6 col-xs-6">
								<div class="classic-editor-options">
									<p>
										<input type="radio" name="classic-editor-replace" id="classic-editor-classic" class="yce-editor-radio" value="classic"<?php if ($settings['editor'] === 'classic') echo ' checked'; ?> />
										<label for="classic-editor-classic" class="yce-settings-label"><?php _ex('Classic editor', 'Editor Name', 'classic-editor'); ?></label>
									</p>
									<p>
										<input type="radio" name="classic-editor-replace" id="classic-editor-block" class="yce-editor-radio" value="block"<?php if ($settings['editor'] !== 'classic') echo ' checked'; ?> />
										<label for="classic-editor-block" class="yce-settings-label"><?php _ex('Block editor', 'Editor Name', 'classic-editor'); ?></label>
									</p>
								</div>
								<script>
									jQuery('document').ready( function($) {
										if ( window.location.hash === '#classic-editor-options') {
											$('.classic-editor-options').closest('td').addClass('highlight');
										}
									});
								</script>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<label for="default_category"><?php _e('Allow users to switch editors', 'classic-editor'); ?></label>
							</div>
							<div class="col-md-6 col-xs-6">
								<div class="classic-editor-options">
									<p>
										<input type="radio" name="classic-editor-allow-users" id="classic-editor-allow" class="yce-editor-radio" value="allow"<?php if ($settings['allow-users']) echo ' checked'; ?> />
										<label for="classic-editor-allow" class="yce-settings-label"><?php _e('Yes', 'classic-editor'); ?></label>
									</p>
									<p>
										<input type="radio" name="classic-editor-allow-users" id="classic-editor-disallow" class="yce-editor-radio" value="disallow"<?php if (! $settings['allow-users']) echo ' checked'; ?> />
										<label for="classic-editor-disallow" class="yce-settings-label"><?php _e('No', 'classic-editor'); ?></label>
									</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" class="button-primary yrm-button-primary" value="<?php _e('Save changes', YCE_LANG)?>">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default yce-settings-panel">
				<div class="panel-heading"><?php _e('Support', YCE_LANG)?></div>
				<div class="panel-body">
					<p style="text-align: center">
						We love our plugin and do the best to improve all features for You. But sometimes issues happened, or you can't find required feature that you need. Don't worry, just  pressing here
						<br>
						<a href="<?php echo YCE_SUPPORT_URL; ?>" style="font-size: 18px; cursor: pointer;" target="_blank">
							<button type="button" id="yce-report-problem-button" class="yce-support-button-red" style="margin: 10px;">
								<i class="ai1wm-icon-notification"></i>
								Report issue
							</button>
						</a><br>
						and we will help you!</p>
				</div>
			</div>
		</div>
	</div>
</div>
<form action="" method="post" id="sjb-settings-form">
	<h1><?php _e( 'Job Board Widget' ); ?></h1>

	<div class="ajax-message updated notice notice-success" style="display: none; position: relative;">
		<p>Settings saved successfully</p>
		<button type="button" class="notice-dismiss">
			<span class="screen-reader-text">Dismiss this notice.</span>
		</button>
	</div>

	<div class="ajax-message error notice notice-error" style="display: none; position: relative;">
		<p>Failed to validate Smartjobboard site url</p>
		<button type="button" class="notice-dismiss">
			<span class="screen-reader-text">Dismiss this notice.</span>
		</button>
	</div>

	<table class="layout">
		<tr>
			<td id="options-pane" valign="top" class="metabox-holder">
				<div class="postbox-container">
					<div class="postbox">
						<div class="inside">
							<div class="hide update-nag" style="width: 100%; box-sizing: border-box; margin-top: 10px;">
								You must have a Smartjobboard Account to use this plugin.
								<p></p>
								<a target="_blank" class="button-primary"
								   href="https://www.smartjobboard.com/ca/trial.php?utm_source=wp-plugin&amp;utm_campaign=wp-plugin-admin">Get
									Smartjobboard Trial Account.</a>
							</div>
							<br />
							<br />
							<table class="options">
								<tr>
									<td>
										<label for="job-board-url">Smartjobboard Site URL:</label>
									</td>
									<td>
										<input required="required" type="url" name="job-board-url" id="job-board-url"
											value="<?php echo esc_html( $sjb_url ) ?>"
											placeholder="e.g. https://site-name.mysmartjobboard.com"
											style="width: 100%">
										<br />
										<em>Copy and paste URL of your Smartjobboard site here</em>
										<br />
										<br />
									</td>
								</tr>

								<tr>
									<td>
										<label for="job-board-page">Display your job board on this page:</label>
									</td>
									<td>
										<?php echo $page_list ?> <br />
										<em>Job board will be shown at the bottom of the page.</em>
									</td>
								</tr>
							</table>
							<br />
							<button type="submit" class="button-primary">Save</button>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</table>
</form>

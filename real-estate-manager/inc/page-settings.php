<div class="wrap ich-settings-main-wrap">
	<h3>Real Estate Manager - Settings</h3>
	<div class="row">
			<div class="col-sm-8">
				<form id="rem-settings-form" class="form-horizontal">
					<input type="hidden" name="action" value="wcp_rem_save_settings">
					<div class="panels-wrap">
						
						<?php
							$all_fields_settings = $this->admin_settings_fields();
							foreach ($all_fields_settings as $panel) { ?>
								<div class="panel panel-default">
									<div class="panel-heading"><b><?php echo $panel['panel_title']; ?></b></div>
									<div class="panel-body">
										<?php foreach ($panel['fields'] as $field) {
											$this->render_setting_field($field);
										} ?>
									</div>
								</div>
						<?php } ?>
					
					</div>
					<p class="text-right">
						<span class="wcp-progress" style="display:none;"><?php _e( 'Please Wait...', 'wcp-rem' ); ?></span>					
						<input class="btn btn-success" type="submit" value="<?php _e( 'Save Settings', 'wcp-rem' ); ?>">
					</p>
				</form>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading"><?php _e( 'How to use', 'wcp-rem' ); ?></div>
					<div class="panel-body">
						<a href="http://rem.webcodingplace.com/how-to-use/" target="_blank" class="btn btn-info"><?php _e( 'How to use', 'wcp-rem' ); ?></a>
					</div>
				</div>
			</div>
	</div>
</div>
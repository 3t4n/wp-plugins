<div class="wrap">
	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php wp_nonce_field('update-options'); ?>
		<?php settings_fields('ab_custom_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
		<?php if($ab_options_set['fancy_admin']==true): ?>
			<div id="ab_options">
				<div id="icon-ab-custom" class="icon32"></div>
			    <h2>Custom Theme Options</h2>
		    	<div id="tabs">
					<ul>
						<?php $main_options->print_tab(); ?>
						<?php if($groups) foreach($groups as $group) $group->print_tab(); ?>
					</ul>
					<?php if(!isset($ab_options_set['remove_donation'])): ?>
						<div id="donate">
							<?php include('donate.php'); ?>
						</div>
					<?php endif; ?>
				</div>
				<div id="content-holder">
					<?php $main_options->print_fancy_settings(); ?>
					<?php if($groups) foreach($groups as $group) $group->print_fancy_settings(); ?>
					<table class="form-table" id="fancy_submit">
						<tr valign="top">
							<td>
								<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Options') ?>" /></p>
							</td>
						</tr>
					</table>
				</div>
				<div class="clear"></div>
			</div>
			<script>
				jQuery(function(){
					jQuery('#content-holder > div + div').hide();
					jQuery('#tabs a').click(function(){
						jQuery('#tabs a').removeClass('selected');
						jQuery(this).addClass('selected');
						jQuery('#content-holder > div').hide();
						var activeTab = jQuery(this).attr("href");
						jQuery(activeTab).fadeIn();
						return false;
					});
				});
			</script>
		<?php else: ?>
			<div id="icon-ab-custom" class="icon32"></div>
		    <h2>Custom Theme Options</h2>
		    <br class="clear">
			<div class="postbox-container" style="width: 69%;">
				<?php $main_options->print_settings(); ?>
				<?php if($groups) foreach($groups as $group) $group->print_settings(); ?>
							
				<table class="form-table">
					<tr valign="top">
						<td>
							<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Options') ?>" /></p>
						</td>
					</tr>
				</table>
			</div>
			<?php if(!isset($ab_options_set['remove_donation'])): ?>
				<div class="postbox-container" style="width: 29%;">
					<div id="poststuff">
				        <div class="postbox">
				            <?php include('donate.php'); ?>
				        </div>
				    </div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</form>
</div>
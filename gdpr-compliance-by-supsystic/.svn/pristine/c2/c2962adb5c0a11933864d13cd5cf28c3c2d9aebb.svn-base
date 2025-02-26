<a href="#" class="button gdprsupAddAgreement">
	<i class="fa fa-fw fa-plus"></i>
	<?php _e('Add Agreement', GDPRSUP_LANG_CODE)?>
</a>
<div id="gdprsupAgreementsShell">
	<div class="gdprsupAgreementShellDesc"><h3><?php _e('You can load additional scripts if user agree with your global privacy policy - just add scripts to Header or Footer here', GDPRSUP_LANG_CODE)?>:</h3></div>
	<div id="gdprsupAgreementsGlobalShell"></div>
	<div class="gdprsupAgreementShellDesc"><h3><?php _e('Or you can create separate conditions to agree with - and load scripts (use cookies) according to them', GDPRSUP_LANG_CODE)?>:</h3></div>
	<div id="gdprsupAgreementsStandardShell"></div>
	<div id="gdprsupAgreementEx" class="gdprsupAgreement">
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12">
						<label class="supsystic-tooltip sup-no-init" title="<?php _e('By enabling this you will enable scripts output once use will agree with your Policies.', GDPRSUP_LANG_CODE)?>">
							<?php echo htmlGdprsup::checkbox('agreements[][enb]', array('value' => 1))?>
							<?php _e('Enable', GDPRSUP_LANG_CODE)?>
						</label>
						<a href="#" class="button gdprsupRemoveAgreementBtn" style="float: right;"><?php _e('Remove', GDPRSUP_LANG_CODE)?></a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<?php echo htmlGdprsup::text('agreements[][label]', array('attrs' => 'placeholder="'. __('Label', GDPRSUP_LANG_CODE). '" class="supsystic-tooltip sup-no-init" title="'. __('Name of agreement that user will see in notification', GDPRSUP_LANG_CODE). '"'))?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<?php echo htmlGdprsup::textarea('agreements[][desc]', array('attrs' => 'placeholder="'. __('Description', GDPRSUP_LANG_CODE). '" class="supsystic-tooltip sup-no-init" title="'. __('Description of this Agreement that users will see and will be able to agree with.', GDPRSUP_LANG_CODE). '"'))?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12"><?php echo htmlGdprsup::textarea('agreements[][scripts_header]', array('attrs' => 'placeholder="'. __('Scripts to Header', GDPRSUP_LANG_CODE). '" class="supsystic-tooltip sup-no-init" title="'. __('Those scripts will be output in the header of your site - before whole site content will be loaded - once user will agree with your Policies.', GDPRSUP_LANG_CODE). '"'))?></div>
				</div>
				<div class="row">
					<div class="col-sm-12"><?php echo htmlGdprsup::textarea('agreements[][scripts_footer]', array('attrs' => 'placeholder="'. __('Scripts to Footer', GDPRSUP_LANG_CODE). '" class="supsystic-tooltip sup-no-init" title="'. __('Those scripts will be output in the footer of your site - right after whole site content will be loaded - once user will agree with your Policies.', GDPRSUP_LANG_CODE). '"'))?></div>
				</div>
			</div>
			<?php echo htmlGdprsup::hidden('agreements[][is_global]', array('value' => '0'))?>
			<div style="clear: both;"></div>
		</div>
	</div>
</div>
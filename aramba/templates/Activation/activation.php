<div class="aramba-wrap">
	
	<h2>Aramba Integration</h2>
	
	<p><? _e('For continue need add API key', 'aramba'); ?></p>
	
	<h3><? _e('Enter API key', 'aramba'); ?></h3>
	<form action="" method="post" name="aramba_save_api_key" id="aramba_save_api_key">
		<div class="vendosoft-form-item">
			<input name="aramba_api_key" type="text" id="api_key" value="" aria-required="true" placeholder="<? _e('Enter API key', 'aramba'); ?>" required/>
		</div>
		<div class="vendosoft-form-item">
			<div class="vendosoft-error-field">
				<? _e('Invalid API key', 'aramba'); ?>
			</div>
		</div>
		<div class="vendosoft-form-item">
			<input type="submit" name="aramba_save_api_key_action" id="aramba_save_api_key_action" value="<? _e('Save API key', 'aramba'); ?>"/>
		</div>
	</form>
</div>
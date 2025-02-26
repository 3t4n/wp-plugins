<?php
	$abc_US_ad = get_option('abc_US_ad');
	$abc_CA_ad = get_option('abc_CA_ad');
	$abc_GB_ad = get_option('abc_GB_ad');
	$abc_AU_ad = get_option('abc_AU_ad');
	$abc_worldwide_ad = get_option('abc_worldwide_ad');
?>
<div class="wrap">
<?php if ( function_exists('screen_icon') ) screen_icon(); ?>
<h2><?php _e('Ads By Country', SKYROCKET_ABC_DOMAIN); ?></h2>

<p><strong>Ads By Country</strong> is a simple <strong>ad management</strong> plugin that lets you decide who will see your ads, depending on their <strong>country</strong>.</p>

<h2>Edit Ad Code by Country</h2>

<form method="post" action="options.php">
	<input type="hidden" name="action" value="update" />
	<?php wp_nonce_field('update-options'); ?>
	
	<input type="hidden" name="page_options" value="abc_US_ad, abc_GB_ad, abc_CA_ad, abc_AU_ad, abc_worldwide_ad" />
	
	<table class="form-table">
		
		<tr valign="top">
		<th scope="row"><label for="abc_US_ad"><?php _e('United States', SKYROCKET_ABC_DOMAIN); ?></label></th>
		<td><textarea name="abc_US_ad" id="abc_US_ad" class="regular-text code" cols="80" rows="3"><?php echo $abc_US_ad; ?></textarea>
		<span class="setting-description"><?php _e('HTML Allowed', SKYROCKET_ABC_DOMAIN); ?></span>
		<p><small><em>Enter the HTML Code for the ad to show to US Visitors.</em></small></p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><label for="abc_CA_ad"><?php _e('Canada', SKYROCKET_ABC_DOMAIN); ?></label></th>
		<td><textarea name="abc_CA_ad" id="abc_CA_ad" class="regular-text code" cols="80" rows="3"><?php echo $abc_CA_ad; ?></textarea>
		<span class="setting-description"><?php _e('HTML Allowed', SKYROCKET_ABC_DOMAIN); ?></span>
		<p><small><em>Enter the HTML Code for the ad to show to CA Visitors.</em></small></p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><label for="abc_GB_ad"><?php _e('United Kingdom', SKYROCKET_ABC_DOMAIN); ?></label></th>
		<td><textarea name="abc_GB_ad" id="abc_GB_ad" class="regular-text code" cols="80" rows="3"><?php echo $abc_GB_ad; ?></textarea>
		<span class="setting-description"><?php _e('HTML Allowed', SKYROCKET_ABC_DOMAIN); ?></span>
		<p><small><em>Enter the HTML Code for the ad to show to UK/GB Visitors.</em></small></p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><label for="abc_AU_ad"><?php _e('Australia', SKYROCKET_ABC_DOMAIN); ?></label></th>
		<td><textarea name="abc_AU_ad" id="abc_AU_ad" class="regular-text code" cols="80" rows="3"><?php echo $abc_AU_ad; ?></textarea>
		<span class="setting-description"><?php _e('HTML Allowed', SKYROCKET_ABC_DOMAIN); ?></span>
		<p><small><em>Enter the HTML Code for the ad to show to AU Visitors.</em></small></p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><label for="abc_worldwide_ad"><?php _e('Worldwide (everyone else)', SKYROCKET_ABC_DOMAIN); ?></label></th>
		<td><textarea name="abc_worldwide_ad" id="abc_worldwide_ad" class="regular-text code" cols="80" rows="3"><?php echo $abc_worldwide_ad; ?></textarea>
		<span class="setting-description"><?php _e('HTML Allowed', SKYROCKET_ABC_DOMAIN); ?></span>
		<p><small><em>Enter the HTML Code for the ad to show to everyone else.</em></small></p>
		</td>
		</tr>
		
		
	</table>
	<p class="submit"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" /></p>
</form>
</div>
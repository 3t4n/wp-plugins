<?php

if (
	defined('ABSPATH') &&
	(current_user_can('editor') || current_user_can('administrator'))
	)
{
	//die('all good');
}
else
{
	exit();
}



aoppt_ads1k_xOK();

$active_tab = (isset($_REQUEST['tab'])) ? $_REQUEST['tab'] : aoppt_pick_aTab();
if ($active_tab == 'ads1k_popunder_code')
$tab = 0;
else
$tab = 1;
?>

<div class="wrap">
	<h2>
		<?php echo aoppt_show_logo(); ?>
		Publisher Code Integration
		<span style="float:right;">
		<input
			type="button"
			onclick="location.href='admin.php?page=ads1k-com&tab=<?php echo $active_tab; ?>&ads1k_switch=switch';"
			value="<?php echo (get_option('aoppt_ads_off') == 1 ? 'Enable All Ads1K Codes' : 'Disable All Ads1K Codes'); ?>"
			class="button-secondary"
		/>
		</span>
	</h2>

	<var>
		If not yet a registered Ads1K Publisher do <a href="//ads1k.com/pub/new_user.php" target="_blank"><strong>sign-up here</strong></a>. - it only takes less than 1 minute.
	</var>

	<?php settings_errors(); ?>

	<div class="notice">

	<?php echo aoppt_ads1k_xKO(); ?>

<?php
if ((bool)get_option('aoppt_ads_off') === false)
{
?>

	

<form method="post" action="options.php">
<?php 
wp_nonce_field( 'ads1k_check','ads1k_nonce' );

if ($active_tab == 'ads1k_popunder_code')
{
	settings_fields( 'ads_opt_gr1' );
	do_settings_fields( 'ads1k-com', 'ads_opt_gr1' );

	echo '
			<h3>
				Main PopUnder Window
				'.aoppt_switchTab().'
			</h3>

			<span style="border-top:1px solid #EEE;">Please insert the AccountLess Panel URL or ID into the field below.</span>
			<div class="input-group" style="margin:25px 0 25px 0; padding:10px; border:1px dotted #CCC;">
				<span class="input-group-addon">Panel ID</span>
				<br />
				<input style="width:100%;" name="aoppt_ads_Pop" type="text" id="aoppt_ads_Pop" class="form-control" value="' . get_option('aoppt_ads_Pop') .'" placeholder="eg : c612da2dba8fc89a6577324e21f71676" />
			</div>
	';
}
else
{
	settings_fields( 'ads_opt_gr2' );
	do_settings_fields( 'ads1k-com', 'ads_opt_gr2' );

	echo '
			<h3>
				Redirect All Traffic
				'.aoppt_switchTab().'
			</h3>

			<span style="border-top:1px solid #EEE;">Please insert the AccountLess Panel URL or ID into the field below.</span>
			<div class="input-group" style="margin:25px 0 25px 0; padding:10px; border:1px dotted #CCC;">
				<span class="input-group-addon">Panel ID</span>
				<br />
				<input style="width:100%;" name="aoppt_ads_Red" type="text" id="aoppt_ads_Red" class="form-control" value="' . get_option('aoppt_ads_Red') .'" placeholder="eg : c612da2dba8fc89a6577324e21f71676" />
			</div>

	';
}

echo '
			<input type="hidden" name="action" value="update" />
	';

if(
	(current_user_can('editor') || current_user_can('administrator')) &&
	isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated'] == true
	)
{
	if ($tab == 0)
	{
		delete_option('aoppt_ads_Red');
		echo '<input type="hidden" name="aoppt_ads_Pop1" value="aoppt_ads_Pop" />';
	
	}
	if ($tab == 1)
	{ 
		delete_option('aoppt_ads_Pop');
		echo '<input type="hidden" name="aoppt_ads_Red1" value="aoppt_ads_Red" />';
	}
}
?>
	<p>
		<input type="submit" name="submit" value="<?php _e('Save Changes') ?>" class="button-primary" />
	</p>
</form>

<?php
}
?>

	</div>
</div>
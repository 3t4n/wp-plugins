<?php
global $alpha_cache_obj;

//check object existance
if (!isset($alpha_cache_obj) || get_class($alpha_cache_obj) != 'AlphaCacheClass') {
	exit;
}

?>

<div class="wrap">
	<h2><?php echo __('Alpha cache settings');?></h2>

	<div class="block-elm">
	<form method="post" id="ACS_form">
		<input type="hidden" name="action" value="save_cache_settings" />
		<input type="hidden" name="last-maintain" value="<?php echo $acs['last-maintain']?>" />
		<input type="hidden" id="ACS_as" name="active-section" value="" />

		<table border=0 cellspacing=5 cellpadding=0 width=775 class="sub-page-left-padding">
		<tr><td width="25%"></td><td width="25%"></td><td width="25%"></td><td width="25%"></td></tr>
		<tr valign="top">
			<td colspan=3>
			<label><input type="checkbox" name="on" value="1" <?php echo empty($acs['on']) ? '' : 'checked'?> />
			 <?php echo __('Cache is working')?></label><br />
			</td><td align="right">
				<input type="button" class="button-primary" onclick="this.form.action.value='load defaults'; this.form.submit();"
					 value="<?php echo __('Load defaults')?>" />
			</td>
		</tr>
		</table>

		<nav id="ACH_pager">
			<div id="ACH_pager_stick_1" data-page="ACH_page_1"><?php echo  __('Main controls')?></div>
			<div id="ACH_pager_stick_2" data-page="ACH_page_11"><?php echo  __('Boosters')?></div>
			<div id="ACH_pager_stick_3" data-page="ACH_page_2" id="misc-button"><?php echo  __('Cache')?></div>
			<div id="ACH_pager_stick_3" data-page="ACH_page_log"><?php echo  __('Log')?></div>
			<div id="ACH_pager_stick_4" data-page="ACH_page_3"><?php echo  __('About plugin')?></div>
		</nav>

<?php
		$users = $wpdb->get_results("SELECT ID, user_login, user_email FROM {$wpdb->prefix}users ORDER BY user_login");

		echo (new \alpha_cache\View('main-page'))
			->setParams([
				'acs' => $acs,
				'users' => $users,
			])
			->render();

		$isHtaccessWritable = \alpha_cache\HtAccess::isHtaccessWritable();

		echo (new \alpha_cache\View('booster-page'))
			->setParams([
				'acs' => $acs,
				'isHtaccessWritable' => $isHtaccessWritable,
			])
			->render();

		$stats = [];
		if (is_dir($this->ac_set['cache-dir']) && $hdir = opendir($this->ac_set['cache-dir'])) {
			while (false !== ($entry = readdir($hdir))) {
				$dname = $this->ac_set['cache-dir'] . '/' . $entry;
				if ($entry != "." && $entry != ".." && is_dir($dname) && $hcache = opendir($dname)) {

					$stats[$entry] = array('total' => 0);

					while (false !== ($entry_file = readdir($hcache))) {
						$fname = $dname . '/' . $entry_file;
						if ($entry_file != "." && $entry_file != ".." && !is_dir($fname) ) {
							$spl = explode('.', $entry_file);
							$filesize = filesize($fname);
							if (!isset($stats[$entry][$spl[1]])) {
								$stats[$entry][$spl[1]]['cnt'] = 1;
								$stats[$entry][$spl[1]]['size'] = $filesize;
							} else {
								$stats[$entry][$spl[1]]['cnt'] ++;
								$stats[$entry][$spl[1]]['size'] += $filesize;
							}
							$stats[$entry]['total'] += $filesize;
						}
					}
					closedir($hcache);
				}
			}
			closedir($hdir);
		}

		echo (new \alpha_cache\View('cache-page'))
			->setParams([
				'acs' => $acs,
				'stats' => $stats,
			])
			->render();

		$checkWritting = alpha_cache\Log::checkForWritting();
		$recs = alpha_cache\Log::readLogRecs();

		echo (new \alpha_cache\View('log-page'))
			->setParams([
				'acs' => $acs,
				'check' => $checkWritting,
				'logUrl' => alpha_cache\Log::getLogUrl(),
				'plugin_directory' => __DIR__,
				'logSizeMb' => AlphaCacheClass::inttoMB(alpha_cache\Log::getLogSize()),
				'recs' => $recs,
			])
			->render();
?>

	</form>

<?php
		echo (new \alpha_cache\View('about-page'))
			->setParams([
				'version'   => AlphaCacheClass::version(),
				'BTC_IMAGE' => AlphaCacheClass::getAssetPath('btc-wallet.jpg')
			])
			->render();
?>

	<hr />
	<div class="sub-page-left-padding">
		<button class="button-primary" onclick="jQuery('#ACS_form').submit();"><?php echo __('Save changes')?></button>
	</div>

	</div>
</div>
<link href="<?php print AlphaCacheClass::getAssetPath('options.css') ?>" rel="stylesheet" />

<?php
		echo (new \alpha_cache\View('nav-script'))
			->setParams([
				'activeSection' => empty($_POST['active-section']) ? false : $_POST['active-section']
			])
			->render();
?>
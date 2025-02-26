<div class="wrap ffwsecurity">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<h3>File and directory permissions:</h3>
	<?php echo $ffwSecurityTools->showFilePermissionsInfo(); ?>
	
	<br/><h3>Secure login and administration:</h3>
	<?php echo $ffwSecurityTools->showSecureLogin(); ?>
	
	<br/><h3>Automatic WordPress updates:</h3>
	<?php echo $ffwSecurityTools->showAutomaticUpdates(); ?>
	
	<br/>
	<h3>Admin login and names: </h3>
	<?php 
		$imgBasicUrl = FFWSecurityPluginAdmin::getAdminPluginUrl('assets/img');
		$linkUsers = FFWSecurityPlugin::getPageLink(FFWSecurityPluginAdmin::PAGE_USERS);
		
		$anyBad = false;
		foreach($users as $user) {

			$isBad = ($user['is_bad_nicename'] || $user['is_bad_displayname']) ? true : false;
			if ($isBad) {
				$anyBad = true;
				$bads = array();
				if ($user['is_bad_nicename']) {
					$bads[] = 'Nicename';
				}
				if ($user['is_bad_displayname']) {
					$bads[] = 'Display Name';
				}
				?>
				<span class="ffwsecurity-namewarning">
						<img src="<?php echo $imgBasicUrl ?>/wrong.png" alt="" style="vertical-align:middle"/>
						Login <strong><?php echo $user['user_login'] ?></strong> is the same as 

				<?php echo implode(' and ', $bads) ?>
				<strong><a href="<?php echo $linkUsers ?>">Change&nbsp;it!</a></strong></span>
	<?php 	} //if ?>
	<?php } //foreach?>
		
	<?php if (!$anyBad) { ?>
		<div><img src="<?php echo $imgBasicUrl ?>/ok.png" alt="" style="vertical-align:middle"/> All ok</div>
	<?php } ?>
	
	<p><a href="<?php echo $linkUsers?>">Display all administrators &#187;</a></p>
	
</div>

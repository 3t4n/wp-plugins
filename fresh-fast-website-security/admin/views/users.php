<div class="wrap ffwsecurity">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<table class="wp-list-table widefat fixed posts">
		<thead>
			<tr>
				<th class="manage-column column-image" id="image" scope="col"></th>
				<th class="manage-column column-login" id="login" scope="col">Login</th>
				<th class="manage-column column-nicename" id="nicename" scope="col">Nicename</th>
				<th class="manage-column column-displayname" id="displayname" scope="col">Display Name</th>
				<th class="manage-column column-info" id="info" scope="col">Info</th>
			</tr>
		</thead>
		<tbody id="the-list">
	<?php 
		foreach($users as $user) {
		$isBad = ($user['is_bad_nicename'] || $user['is_bad_displayname']) ? true : false;
		$link = $linkUrl . '&amp;id=' . $user['id'];
	?>
		
		
			<tr id="user-<?php echo $user['id'] ?>" class="alternate">
				<td class=""><img src="<?php echo self::getAdminPluginUrl('/assets/img') . '/' . ($isBad ? 'wrong.png' : 'ok.png') ?>" alt="" style="vertical-align:middle"/></td>
				<td class=""> <strong>
					<a href="<?php echo $link ?>"><?php echo $user['user_login'] ?></a></strong>
					<div class="row-actions"><span class="edit"><a href="<?php echo $link ?>">Edit</a></span></div>
				</td>
						
				<td class="name column-name"><?php echo $user['user_nicename'] ?></td>
				<td class="email column-email"><?php echo $user['display_name'] ?></td>
				<td class="email column-email">
	<?php  	
		if ($isBad) {
			$bads = array();
			if ($user['is_bad_nicename']) {
				$bads[] = 'Nicename';
			}
			if ($user['is_bad_displayname']) {
				$bads[] = 'Display Name';
			}
	?>
				<span class="ffwsecurity-namewarning">Login is the same as

				<?php echo implode(' and ', $bads)?>
				<strong><a href="<?php echo $link ?>">Change&nbsp;it!</a></strong></span>
<?php	} //if ?>
		
				</td>
			</tr>
<?php } // foreach ?>
		</tbody>
	</table>

</div>

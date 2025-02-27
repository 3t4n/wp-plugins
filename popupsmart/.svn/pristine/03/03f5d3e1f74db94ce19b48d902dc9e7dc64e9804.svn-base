<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://popupsmart.com
 * @since      1.0.0
 *
 * @package    Pop
 * @subpackage Pop/admin/partials
 */
?>


<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">
	<div class="header">
		<a href="http://app.popupsmart.com/" class="logo-container">
			<img src='<?php echo $pluginPath; ?>/images/logo.svg' />
			<span>Popupsmart</span>
		</a>
		<a href="https://popupsmart.com/help" target="_blank" class="info-container">
			<img width="24" height="24" src='<?php echo $pluginPath; ?>/images/info.svg' />
		</a>
	</div>

	<div class="content">
		<div class="userForm">
			<div class="settings-container">
				<form method="post" action="options.php">
					<?php
					settings_fields($this->plugin_name . '-account-id');
					do_settings_sections($this->plugin_name);

					submit_button('Save Settings');
					?>
				</form>

				<div class="installation-step-container">
					<h4 style="font-weight: 600;">Installation Steps</h4>
					<ul>
						<li>
							If you are a registered user go to login page and login <a href="https://app.popupsmart.com/login" target="_blank">Popupsmart</a>
						</li>
						<li>
							If you are still not a member, you can <a href="https://app.popupsmart.com/register" target="_blank">Register</a> on the page
						</li>
						<li>
							Go to <a href="https://app.popupsmart.com/account/profile" target="_blank">Personal Data</a> page and copy to "Account Id"
						</li>
						<li>
							Paste the Account Id into the input field above.
						</li>
						<li>
							Click to "Save Settings" button
						</li>
						<li>
							Congratulations! You can now see your popup on the website
						</li>
					</ul>
				</div>
			</div>

		</div>
		<div class="userHelp">
			<div id="video-container" class="video-container">
				<img class="poster" width="640" height="360" src="<?php echo $pluginPath; ?>/images/howItWorksVideoPoster.webp" />
				<div class="play-icon">
					<img onclick="handleHidePoster()" src="<?php echo $pluginPath; ?>/images/play.svg" />
				</div>
				<iframe src="https://player.vimeo.com/video/806774583?h=dbfcf4f578&&title=0&byline=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<style>
		.form-table tr:last-child {
			display: none;
		}
	</style>
</div>
<script src="https://player.vimeo.com/api/player.js" async></script>
<script>
	document.querySelector('img[src*="sidebar-icon.svg"]').style.opacity = 1

	function handleHidePoster() {
		const player = new Vimeo.Player(document.querySelector('iframe'));

		player.on('pause', function() {
			videoContainer.classList.remove('actived-video')
		});

		const videoContainer = document.getElementById('video-container');
		videoContainer.classList.add('actived-video')
		player.play();
	}
</script>
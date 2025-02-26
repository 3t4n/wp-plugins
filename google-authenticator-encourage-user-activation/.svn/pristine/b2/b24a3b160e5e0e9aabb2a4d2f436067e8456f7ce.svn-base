<?php // There are more semantic ways to mark this up, but this is closest to how Core does it, and avoids the need to add CSS rules to make it visually consistent with Core ?>

<fieldset id="gaeua-settings">
	<label for="gaeua_mode_nag">
		<input id="gaeua_mode_nag" name="gaeua_settings[mode]" type="radio" value="nag" <?php checked( $this->settings['mode'], 'nag' ); ?> />
		<strong>Gently nag</strong> the user<br />
		<span class="description">Display a warning on the Dashboard and Profile screens until the user enables two-factor authentication.</span>
	</label><br />

	<label for="gaeua_mode_nag_persistent">
		<input id="gaeua_mode_nag_persistent" name="gaeua_settings[mode]" type="radio" value="nag-persistent" <?php checked( $this->settings['mode'], 'nag-persistent' ); ?> />
		<strong>Persistently nag</strong> the user<br />
		<span class="description">Display the warning on all screens until they enable two-factor auth.</span>
	</label><br />

	<label for="gaeua_mode_force">
		<input id="gaeua_mode_force" name="gaeua_settings[mode]" type="radio" value="force" <?php checked( $this->settings['mode'], 'force' ); ?> />
		<strong>Force</strong> the user<br />
		<span class="description">Display the warning, and also remove all of their capabilities until they enable two-factor auth. This will prevent them from accessing everything, except for their profile.</span>
	</label>
</fieldset>

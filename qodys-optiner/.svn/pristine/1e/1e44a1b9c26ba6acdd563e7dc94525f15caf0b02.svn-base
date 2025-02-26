<?php
$form_presets = $this->GetOverseer()->GetFormPresets();
?>

<p>In order for the various Facebook features of the Optiner to work, you must first create a Facebook application. This is an extremely quick process 
and isn't at all difficult. Once you've made the app, just paste your ID and Secret Key (provided by Facebook) in the fields below.</p>

<p>To create a facebook application, simply <a target="_blank" href="http://plugins.qody.co/how-to-get-a-facebook-app-id-secret-key/">follow these steps</a>. 
Also, here's a link to <a target="_blank" href="https://developers.facebook.com/apps">your current apps</a>.</p>

<table class="form-table">
	<tr>
		<?php $nextItem = 'fb_app_id'; ?>
		<th>
			<label for="<?php echo $nextItem; ?>">Application ID</label>
		</th>
		<td>
			<input type="text" style="width:55%;" name="<?php echo $nextItem; ?>" value="<?php echo $this->get_option( $nextItem ); ?>" class="widefat" id="<?php echo $nextItem; ?>">
			<span class="howto">Set the ID of your Facebook application to have this work. (eg, 227282383287004)</span>
		</td>
	</tr>
	<tr>
		<?php $nextItem = 'fb_app_secret'; ?>
		<th>
			<label for="<?php echo $nextItem; ?>">Application Secret</label>
		</th>
		<td>
			<input type="text" style="width:75%;" name="<?php echo $nextItem; ?>" value="<?php echo $this->get_option( $nextItem ); ?>" class="widefat" id="<?php echo $nextItem; ?>">
			<span class="howto">Set the secret key of your Facebook application to have this work. (eg, 197bd325e2aa8c66039a2f46575e4f01)</span>
		</td>
	</tr>
</table>
<?php
$form_action = $this->Owner()->Owner()->GetUrl().'/includes/share.php?c='.$post->ID;

$name_input = 'optiner_name';
$email_input = 'optiner_email';
?>

<p>Edit your remote form to use these values. In order for your remote form to know where to go, the action url must be changed out,
and for the Optiner to know which field is the name and which is the email, those must be changed in your form as well.</p>

<table class="form-table">
	<tbody>
		<tr>
			<th>
				<label>Form Action Url</label>
			</th>
			<td>
				<?php echo htmlentities( '<form method="get" action="' ); ?>
				<input onclick="this.select();" type="text" readonly style="width:50%;" class="widefat" value="<?php echo $form_action; ?>" />
				<?php echo htmlentities( '">' ); ?>
				<span class="howto">Set your main form's <strong>action url</strong> to this value. Doing so will submit the form 
				to the proper place.</span>
			</td>
		</tr>
		<tr>
			<th>
				<label>Name field "name"<br />(optional)</label>
			</th>
			<td>
				<?php echo htmlentities( '<input type="text" name="' ); ?>
				<input onclick="this.select();" type="text" readonly style="width:30%;" class="widefat" value="<?php echo $name_input; ?>" />
				<?php echo htmlentities( '" value="" />' ); ?>
				<span class="howto">Set your main form <strong>name input field</strong>'s "name" to this value. Doing so will allow 
				the plugin to get the user's entered name.</span>
			</td>
		</tr>
		<tr>
			<th>
				<label>Email field "name"</label>
			</th>
			<td>
				<?php echo htmlentities( '<input type="text" name="' ); ?>
				<input onclick="this.select();" type="text" readonly style="width:30%;" class="widefat" value="<?php echo $email_input; ?>" />
				<?php echo htmlentities( '" value="" />' ); ?>
				<span class="howto">Set your main form <strong>email input field</strong>'s "name" to this value. Doing so will allow 
				the plugin to get the user's entered name. (optional)</span>
			</td>
		</tr>
	</tbody>
</table>
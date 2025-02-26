<?php 
	$Enable_Recovery = get_option("EWD_UAR_Enable_Recovery");
	$Activity_Type = get_option("EWD_UAR_Activity_Type");
	$User_Type = get_option("EWD_UAR_User_Type");
	$Cache_Interval = get_option("EWD_UAR_Cache_Interval");
	$Cache_Unit = get_option("EWD_UAR_Cache_Unit");
	$Recovery_Actions_Array = get_option("EWD_UAR_Recovery_Actions_Array");
	$Email_Messages_Array = get_option("EWD_UAR_Email_Messages_Array");
	if (!is_array($Email_Messages_Array)) {$Email_Messages_Array = array();}
?>

<div class="wrap uar-options-page-tabbed">
<div class="uar-options-submenu-div">
	<ul class="uar-options-submenu uar-options-page-tabbed-nav">
		<li><a id="Basic_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == '' or $Display_Tab == 'Basic') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Basic');">Basic</a></li>
	</ul>
</div>

<div class="uar-options-page-tabbed-content">

<form method="post" action="admin.php?page=EWD-UAR-options&DisplayPage=Options&UARAction=EWD_UAR_UpdateOptions">
<?php wp_nonce_field('update_options'); ?>
<div id='Basic' class='uar-option-set'>
<h2 id="basic-order-options" class="uar-options-tab-title">Basic Options</h2>
<table class="form-table">
<tr>
<th scope="row">Enable Recovery</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Enable Recovery</span></legend>
	<label title='Yes'><input type='radio' name='enable_recovery' value='Yes' <?php if($Enable_Recovery == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='enable_recovery' value='No' <?php if($Enable_Recovery == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	<p>Should the plugin be enabled?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Activity Type</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Activity Type</span></legend>
	<label title='Any'><input type='radio' name='activity_type' value='Any' <?php if($Activity_Type == "Any") {echo "checked='checked'";} ?> /> <span>Any page load</span></label><br />
	<label title='Login'><input type='radio' name='activity_type' value='Login' <?php if($Activity_Type == "Login") {echo "checked='checked'";} ?> /> <span>Login only</span></label><br />
	<p>Should any activity in the admin area reset the recovery timer, or only a login?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">User Type</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>User Type</span></legend>
	<label title='Admin'><input type='radio' name='user_type' value='Admin' <?php if($User_Type == "Admin") {echo "checked='checked'";} ?> /> <span>Admins Only</span></label><br />
	<label title='All'><input type='radio' name='user_type' value='All' <?php if($User_Type == "All") {echo "checked='checked'";} ?> /> <span>All Users</span></label><br />
	<p>Should all users reset the recovery timer, or only admins? Some plugins or themes have users create their own accounts of the site, which could count as activity.</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Check Activity Cache Time</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Check Activity Cache Time</span></legend>
	Check for admin activity every 
	<select name='cache_interval'>
		<option value='1' <?php if ($Cache_Interval == 1) {echo "selected='selected'";} ?>>1</option>
		<option value='2' <?php if ($Cache_Interval == 2) {echo "selected='selected'";} ?>>2</option>
		<option value='3' <?php if ($Cache_Interval == 3) {echo "selected='selected'";} ?>>3</option>
		<option value='4' <?php if ($Cache_Interval == 4) {echo "selected='selected'";} ?>>4</option>
		<option value='5' <?php if ($Cache_Interval == 5) {echo "selected='selected'";} ?>>5</option>
		<option value='6' <?php if ($Cache_Interval == 6) {echo "selected='selected'";} ?>>6</option>
		<option value='7' <?php if ($Cache_Interval == 7) {echo "selected='selected'";} ?>>7</option>
		<option value='8' <?php if ($Cache_Interval == 8) {echo "selected='selected'";} ?>>8</option>
		<option value='9' <?php if ($Cache_Interval == 9) {echo "selected='selected'";} ?>>9</option>
		<option value='10' <?php if ($Cache_Interval == 10) {echo "selected='selected'";} ?>>10</option>
		<option value='11' <?php if ($Cache_Interval == 11) {echo "selected='selected'";} ?>>11</option>
		<option value='12' <?php if ($Cache_Interval == 12) {echo "selected='selected'";} ?>>12</option>
	</select>
	<select name='cache_unit' class='ewd-uar-small-select'>
		<option value='Hours' <?php if ($Cache_Unit == "Hours") {echo "selected='selected'";} ?>>Hour(s)</option>
		<option value='Days' <?php if ($Cache_Unit == "Days") {echo "selected='selected'";} ?>>Day(s)</option>
		<option value='Weeks' <?php if ($Cache_Unit == "Weeks") {echo "selected='selected'";} ?>>Week(s)</option>
	</select>
	<p>How often should the plugin check to see if an admin has logged in?</p>
	</fieldset>
</td>
</tr>
<tr>
	<th scope="row">Recovery Actions</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Recovery Actions</span></legend>
			<table id='ewd-uar-recovery-actions-table'>
				<thead>
					<tr>
						<th></th>
						<th>Email Address</th>
						<th>Action Type</th>
						<th>Email to Send</th>
						<th>Inactivity Interval</th>
						<th>Inactivity Unit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$Counter = 0;
					if (!is_array($Recovery_Actions_Array)) {$Recovery_Actions_Array = array();}
					foreach ($Recovery_Actions_Array as $Recovery_Action_Item) { ?>
						<tr id='ewd-uar-recovery-action-row-<?php echo $Counter; ?>'>
							<td><a class='ewd-uar-delete-recovery-action-item' data-actionid='<?php echo $Counter; ?>'>Delete</a></td>
							<td><input type='text' name='Recovery_Action_<?php echo $Counter; ?>_Email_Address' value='<?php echo $Recovery_Action_Item['Email_Address']; ?>'/></td>
							<td><select name='Recovery_Action_<?php echo $Counter; ?>_Action_Type' >
								<option value='Reminder' <?php if ($Recovery_Action_Item['Action_Type'] == "Reminder") {echo "selected='selected'";} ?>>Reminder</option>
								<option value='New_Admin' <?php if ($Recovery_Action_Item['Action_Type'] == "New_Admin") {echo "selected='selected'";} ?>>Create Admin</option>
							</select></td>
							<td><select name='Recovery_Action_<?php echo $Counter; ?>_Email_To_Send' >
								<?php foreach ($Email_Messages_Array as $Email_Message_Item) { ?>
									<option value="<?php echo $Email_Message_Item['ID']; ?>" <?php if ($Email_Message_Item['ID'] == $Recovery_Action_Item['Email_To_Send']) {echo "selected='selected'";} ?>><?php echo $Email_Message_Item['Name'] ?></option>
								<?php } ?>
							</select></td>
							<td><select name='Recovery_Action_<?php echo $Counter; ?>_Inactivity_Interval' >
								<option value='1' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 1) {echo "selected='selected'";} ?>>1</option>
								<option value='2' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 2) {echo "selected='selected'";} ?>>2</option>
								<option value='3' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 3) {echo "selected='selected'";} ?>>3</option>
								<option value='4' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 4) {echo "selected='selected'";} ?>>4</option>
								<option value='5' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 5) {echo "selected='selected'";} ?>>5</option>
								<option value='6' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 6) {echo "selected='selected'";} ?>>6</option>
								<option value='7' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 7) {echo "selected='selected'";} ?>>7</option>
								<option value='8' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 8) {echo "selected='selected'";} ?>>8</option>
								<option value='9' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 9) {echo "selected='selected'";} ?>>9</option>
								<option value='10' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 10) {echo "selected='selected'";} ?>>10</option>
								<option value='11' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 11) {echo "selected='selected'";} ?>>11</option>
								<option value='12' <?php if ($Recovery_Action_Item['Inactivity_Interval'] == 12) {echo "selected='selected'";} ?>>12</option>
							</select></td>
							<td><select name='Recovery_Action_<?php echo $Counter; ?>_Inactivity_Unit' >
								<option value='Days' <?php if ($Recovery_Action_Item['Inactivity_Unit'] == "Days") {echo "selected='selected'";} ?>>Day(s)</option>
								<option value='Weeks' <?php if ($Recovery_Action_Item['Inactivity_Unit'] == "Weeks") {echo "selected='selected'";} ?>>Week(s)</option>
								<option value='Months' <?php if ($Recovery_Action_Item['Inactivity_Unit'] == "Months") {echo "selected='selected'";} ?>>Month(s)</option>
							</select></td>
						</tr>
						<?php $Counter++;
					} ?>
					<tr><td colspan='6'><a class='ewd-uar-add-recovery-action-item' data-nextid='<?php echo $Counter; ?>'>Add</a></td></tr>
				</tbody>
			</table>
			<p>
				Create as many recovery actions as you'd like using the table above.<br/>
				Email address is the destination for the notification,<br />
				Actions that can be taken are either notifications that an admin hasn't logged in or the option to create a new admin account,<br />
				Inactivity Interval and Unit combine to set the amount of time since last login before the action is taken.
			</p>
		</fieldset>
	</td>
</tr>
<tr>
<th scope="row">E-mail Messages</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>E-mail Messages</span></legend>
	<table id='ewd-uar-email-messages-table'>
		<tr>
			<th></th>
			<th>Message Subject</th>
			<th>Message</th>
		</tr>
		<?php 
			$Counter = 0;
			$Max_ID = 0;
			foreach ($Email_Messages_Array as $Email_Message_Item) { 
				echo "<tr id='ewd-uar-email-message-" . $Counter . "'>";
					echo "<td><input type='hidden' name='Email_Message_" . $Counter . "_ID' value='" . $Email_Message_Item['ID'] . "' /><a class='ewd-uar-delete-message' data-messagecounter='" . $Counter . "'>Delete</a></td>";
					echo "<td><input class='ewd-uar-array-text-input' type='text' name='Email_Message_" . $Counter . "_Name' value='" . $Email_Message_Item['Name']. "'/></td>";
					echo "<td><textarea class='ewd-uar-array-textarea' name='Email_Message_" . $Counter . "_Body'>" . $Email_Message_Item['Message'] . "</textarea></td>";
				echo "</tr>";
				$Counter++;
				$Max_ID = max($Max_ID, $Email_Message_Item['ID']);
			}
			$Max_ID++;
			echo "<tr><td colspan='3'><a class='ewd-uar-add-email' data-nextcounter='" . $Counter . "' data-maxid='" . $Max_ID . "'>Add</a></td></tr>";
		?>
	</table>
	<p>What should be in the messages sent to users? You can put [site-name], [last-activity-date], [inactivity-interval] or [inactivity-unit] into the message body or subject to put in the name of the site, the date of last admin activity, or the inactivity interval or units respectively.</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Send Test Email</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Send Test Email</span></legend>
	<label title='Test_Email'><input type='text' name='Test_Email' id='ewd-uar-test-email-address' /> <span><a id='ewd-uar-test-email-click' data-actionlink='<?php echo admin_url("admin.php?page=EWD-UAR-options&DisplayPage=Options&UARAction=EWD_UAR_TestEmail"); ?>'>Send</a></span></label><br />
	<p>Send out a test email, to see if they're sent and received correctly.<br />
	If the e-mail doesn't go through, please try installing <a class='ewd-uar-inline-link' href='https://en-ca.wordpress.org/plugins/wp-mail-smtp/'>WP Mail SMTP</a> and configuring it to your site.</p>
	</fieldset>
</td>
</tr>
</table>
</div>

<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>

</div>
</div>
		

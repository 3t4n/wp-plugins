
<h3>Email Settings</h3>
<br/>
<table class='table'>
<form method='post' action='#'>
<tr><td>SMTP Host</td><td>:</td><td><input type='text' name='smtp_host' id='smtp_host' /></td><td>(For ex: smtp.gmail.com)</td>
</tr>
<tr id='host_error' style='display:none;'><td colspan='4'><span class='alert alert-error'>Host Name can not be blank</span></td>
</tr>
<tr><td>SMTP PORT</td><td>:</td><td><input type='text' name='smtp_port' id='smtp_port' /></td><td>(For ex: 465, 567)</td>
</tr>
<tr id='port_error' style='display:none;'><td colspan='4'><span class='alert alert-error'>Port Number can not be blank</span></td>
</tr>
<tr><td>User Name</td><td>:</td><td><input type='text' name='smtp_username' id='smtp_username' /></td><td>(For ex: your gmail user id)</td>
</tr>
<tr id='uname_error' style='display:none;'><td colspan='4'><span class='alert alert-error'>USername can not be blank</span></td>
</tr>
<tr><td>Password</td><td>:</td><td><input type='password' name='smtp_password' id='smtp_password' /></td><td>(For ex: Your Gmail Password)</td>
</tr>
<tr id='password_error' style='display:none;'><td colspan='4'><span class='alert alert-error'>PAssword can not be blank</span></td>
</tr>
<tr><td colspan='3'><button type='submit' class='alert alert-info' id='save_Setting' name='save_Setting' onclick="return Save_settings_step1()">Save Settings</button></td></tr>
</table>
</form>
</table>

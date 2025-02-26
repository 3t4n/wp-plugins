<script>
function Save_settings_step1()
{
	var smtp_host = $('#smtp_host').val();
	if(smtp_host == '')
	{
		$('#host_error').show();
		return false;
	}
	var smtp_port = $('#smtp_port').val();
	if(smtp_port == '')
	{
		$('#port_error').show();
		return false;
	}
	var smtp_username = $('#smtp_username').val();
	if(smtp_username == '')
	{
		$('#uname_error').show();
		return false;
	}
	var smtp_password = $('#smtp_password').val();
	if(smtp_password == '')
	{
		$('#password_error').show();
		return false;
	}
}
</script>
<?php
if(isset($_POST['save_Setting']))
{
	$smtp_host = $_POST['smtp_host'];
	$smtp_port = $_POST['smtp_port'];
	$smtp_username = $_POST['smtp_username'];
	$smtp_password = $_POST['smtp_password'];
	//print_r($_POST);
	update_option('lord_setting_host',$smtp_host);
	update_option('lord_setting_port',$smtp_port);
	update_option('lord_setting_username',$smtp_username);
	update_option('lord_setting_password',$smtp_password);
	echo "<br/><div class='alert alert-success'>Settings Updated Successfully</div>";
}
?>
<div style="background:#C3D9FF; width:99%; padding-left:10px; border-radius: 4px;">
<ul class="nav nav-pills">
            <?php
            if(isset($_GET['show-setting']))
                $ShowSetting = $_GET['show-setting'];
            else
                $ShowSetting = '';
            ?>
            <li <?php if(($ShowSetting == 'email-setting') || $ShowSetting == '') echo "Class='active'"; ?>><a href="?page=settings_lordlinus&show-setting=email-setting"><?php _e('Email Setting' ,''); ?></a></li>

            <li <?php if($ShowSetting == 'display-setting') echo "Class='active'"; ?>><a href="?page=settings_lordlinus&show-setting=display-setting"><?php _e('Display Setting' ,''); ?></a></li>
</ul>
</div>
<?php
if(isset($_GET['show-setting'])) {

        if($_GET['show-setting'] == 'email-setting') {
            include('email-setting.php');
        }
	if($_GET['show-setting'] == 'display-setting') {
            include('display-setting.php');
        }
	
    }
else
{
	include('email-setting.php');
}
?>

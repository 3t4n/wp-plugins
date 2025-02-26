<?
/*
Plugin Name: Admin Renamer
Plugin URI: http://wiecek.biz/projekty/wordpress/admin-renamer
Description: Wtyczka pozwala zmienić login domyślnego użytkownika "admin".
Version: 0.1.2
Author: Łukasz Więcek
Author URI: http://wiecek.biz/
*/

function AdminRenamerSetup()
	{
	if(isset($_POST['save']))
		{
		if(strlen($_POST['nowylogin'])>=4)
			{
			global $wpdb;
			$zmianaloginu = $wpdb->query("UPDATE $wpdb->users SET user_login = '".$_POST['nowylogin']."' WHERE ID = 1");
			}
		}
	?>
	<div class="wrap">
	<h2>Admin Renamer</h2>
	
	<?php if($zmianaloginu) echo "<div id='message' class='updated fade'><p>Login administratora został zmieniony na: <strong>".$_POST['nowylogin']."</strong></p></div>"; ?>

	<form action="" method="post" id="adminrenamer_config"> 
		<table class="form-table"> 
			<tbody> 
				<tr valign='top'> 
				<th scope='row'>Nowy login:</th> 
				<td><input name='nowylogin' type='text' id='nowylogin' value='' size='20' /></td> 
			</tr>	
		</table>
		<p class="submit"><input type="submit" name="save" value="Zmień login" /></p> 
	</form>
	<?php
	}

function AdminRenamerMenu()
	{
	add_options_page('Admin Renamer', 'Admin Renamer', 0, __FILE__, 'AdminRenamerSetup');
	}

add_action('admin_menu','AdminRenamerMenu');
?>
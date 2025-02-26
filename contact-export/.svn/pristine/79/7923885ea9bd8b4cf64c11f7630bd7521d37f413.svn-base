<?php
if (get_option('ex_vis') == 1) {
  require_once('class_settings.php');
	$settings = new class_settings;

	if (isset($_POST['save']) && isset($_POST['site']) && isset($_POST['cat']) && isset($_POST['visible'])) {
		update_option('ex_which', $_POST['site']);
		update_option('ex_cat', $_POST['cat']);
		update_option('ex_vis', $_POST['visible']);
		echo 'Einstellungen gespeichert';
	}
	
	if (isset($_POST['add']) && isset($_POST['email'])) {
	  update_option('ex_post_not', $_POST['email']);
	  $settings->add_postnotification();
	  echo 'Tag gespeichert und Emails dem Verteiler hinzugefügt.';
	}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=3'; ?>" method="post">
	<table>
		<tr>
			<td><h3>Settings</h3></td>
		</tr>
		<tr>
			<td>Methode wählen</td>
			<td><?php $settings->selectBox(); ?></td>
		</tr>
		<tr>
			<td><br /><b>1 - Schritt export</b></td>
		</tr>
		<tr>
			<td>Kategorie</td>
			<td><?php wp_dropdown_categories('show_option_all&hide_empty=0&hierarchical=1&selected='.get_option('ex_cat')); ?></td>
		</tr>
		<tr>
			<td><br /><b>Sonstiges</b></td>
		</tr>
		<tr>
			<td>Einstellungsseite anzeigen</td>
			<td><?php $settings->selectradio(); ?></td>
		</tr>
		<tr>
			<td colspan="2">Vorsicht! Diese Einstellung kann nur mit PhpMyAdmin, direkt an der Datenbank, geändert werden.<br />
      <!--(change in _options 'ex_vis' from 0 to 1)--></td>
		</tr>
	</table>
<input type="submit" class="button-primary" value="speichern" name="save"/>
</form>
<?php
  if (get_option('post_notification_debug') != false){
?>
<br /><br /><br />
<h3>Post Notification</h3>
<form action="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=3'; ?>" method="post">
  <table>
    <tr>
      <td>Emailtag:</td>
      <td><input type="text" value="<?php echo get_option('ex_post_not'); ?>" name="email"/></td>
    </tr>
      <td>Alle Emailadressen zu Post Notification hinzufügen:<br>(Kategorien werden beachtet!)</td>
      <td><input type="submit" class="button-primary" value="hinzufügen" name="add"/></td>
    </tr>
  </table>
</form>
<?php
  }
} else {
	echo 'No rights';
}
?>

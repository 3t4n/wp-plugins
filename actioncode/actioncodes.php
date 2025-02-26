<?php
/*
Plugin Name: actionCodes
Plugin URI: http://log4-tutorials.22o.de
Description: Ths Plugin implements a Actioncode Widget to the Sidebar - Dieses Plugin erstellt einen Menüpunkt unter dem Reiter Plugins und registriert ein Widget, das eingebunden werden muss, vorher muss aber noch die install.php ausgeführt werden, und davor noch die Datenbankanbindung angegeben, werden(Wer will seine Aktionscode auf die übervolle WP-Datenbank haben?) und fertig. Leider arbeiten wir zur Beta noch einer Benutzerfreindlichen Version des Plugins. ActionsCodes müssen noch per Hand in die Datenbank eingegeben werden!
Author: Logander4 Tutorials
Version: 1.0
Author URI: http://log4-tutorials.22o.de
*/
require_once("conf.inc.php");

function displayProperty()
{

		$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$sql = "SELECT * FROM wp_actioncodes";
		$result = $db->query($sql);
		echo  '
		<h2>ActionCodes Widget</h2>
		NUR DIE ALPHA(1.0) VERSION UNSERES NEUEN WP_PLUGINS ACTIONCODE
	<div style="font-size: big; font-family: Arial;width: 500px;border: 1.5px solid lightgray; background-color: lightgreen; color: #ff0000;">
	<b>Bitte führe vor der Benutzung und Konfiguration die <a href="../wp-content/plugins/actioncodes/install.php" target="_blank">install.php</a> aus! Und ändere in der <i>conf.inc.php</i> die Datenbank-Daten</b>
	</div>
	<br />
	<h3>Aktionscodes</h3>
		<table style="border: 2px solid gray; padding: 5px;">
			<tr>
				<th>Code Name</th>
				<th>Internetadresse</th>
			</tr>
			<tr>';
		while ($row = $result->fetch_array())
		{
			echo '<td style="padding: 3px;">'.$row[0].'</td><td style="padding: 3px;">'.$row[1].'</td>';
		}
		$db->close();
		echo '</tr></table>';
}

function widget_sidebar_init() {
if ( !function_exists("register_sidebar_widget") )
return;
function widget_sidebar() {
// Hier kann man eigenen Code einfuegen
$widget_html = '
<h3>Sonderaktionen</h3>
<!-- Hier koennen noch Informationen hin -->
<!-- Hier nicht ändern -->
NUR DIE ALPHA(1.0) VERSION UNSERES NEUEN WP_PLUGINS ACTIONCODE
<form method="get" action="basis.php" style="border: 5px solid lightgray; height: auto;">
<input type="text" name="aktionscode" style="background-color: lightgreen; height: 40px; font-size: 35px; width: 100%;"><input type="submit" value="ACTIVATE ACTIONCODE >>" style="width: 100%; height: 40px;"><br />
</form>
<!-- Hier nicht ändern -->
<!-- Hier koennen noch Informationen hin -->

';
echo $widget_html;
}
register_sidebar_widget("WP_Sonderaktionen", "widget_sidebar");
}
add_action("plugins_loaded", "widget_sidebar_init");

function ActionCodes_addAdminMenu() {
        add_option("<b>ActionCodes</b>","1");
    add_submenu_page('plugins.php','<b>ActionCodes Property</b>','<b>ActionCodes Property</b>',get_option('ActionCodes'),__FILE__,'displayProperty');
}
add_action('admin_menu', 'ActionCodes_addAdminMenu');
?>
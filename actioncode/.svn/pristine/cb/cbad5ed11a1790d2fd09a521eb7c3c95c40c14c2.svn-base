<?php
//aktionscode.php
// Diese Datei etabliert das Aktionscode Widget!
require_once("conf.inc.php");

$actionscode = $_GET['aktionscode'];
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM wp_actioncodes WHERE actioncodes = '".$actionscode."'";
$result = $db->query($sql);
while ($row = $result->fetch_row()) 
{
	header('Location: '.$row[1]);
	
	echo '<div style="border: 1px solid lightgray; background-color: lightgreen; width: 100px; height: 50px; margin-left: 35%;"> <span style="font-size: big; color: #ff0000;">Wir distanzieren uns ausdrücklich von allen implementierten Websites dieser Funktionen!</span> Werden sie nicht weitergleitet klicken sie bitte hier: <a href="'.$codes[1].'">Zur Aktion</a></div>';
}
$db->close();
?>

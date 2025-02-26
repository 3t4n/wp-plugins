<?php
header('Content-Type: text/html; charset=UTF-8');
require '../../../wp-config.php';
require './mysql.class.php';

$sql = new CMysql();
$sql->mysql_login();

$_POST['dir'] = str_replace('/' , '' , $_POST['dir']);

echo '<div class="">';
echo gibKinder($_POST['dir'], $table_prefix);
echo '</div>';



function gibKinder($vater = 0, $table_prefix) {
	global $sql;
	$query = 'SELECT * FROM '.$table_prefix.'posts WHERE post_type = "page" AND post_parent = "'.(int)$vater.'" AND post_status NOT LIKE "auto-draft" ORDER BY ID DESC';
	
	echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
	$res = $sql->query($query);
	while ($my = mysql_fetch_assoc($res)) {
		
		$b = $sql->query_first('SELECT COUNT(ID) as B FROM '.$table_prefix.'posts WHERE post_parent = "'.$my['ID'].'" AND post_status NOT LIKE "auto-draft" AND post_type = "page"');
		if ($b['B'] > 0) {
			echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . $my['ID'] . "/\">" . $my['post_title'] ."</a> <small><a rel=\"" . $my['ID'] ."\" href=\"post.php?post=".$my['ID']."&action=edit\">edit</a></small></li>";
		} else {
			echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . $my['ID'] . "\">" . $my['post_title'] . "</a></li>";
		}
	}
	echo "</ul>";	
	return $out;
}
?>
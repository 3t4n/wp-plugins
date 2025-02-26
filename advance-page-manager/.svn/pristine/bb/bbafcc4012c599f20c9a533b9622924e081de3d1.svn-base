<?php
require '../../../wp-config.php';
require './mysql.class.php';

$sql = new CMysql();
$sql->mysql_login();


echo '<h3>Search Result for: '.$_GET['p'].'</h3>';

$keyword = mysql_real_escape_string($_REQUEST['p']);
$keyword = str_replace(' ','%',$keyword);
$keyword = str_replace('%%','',$keyword);


$query = 'SELECT ID,post_title,post_parent FROM '.$table_prefix.'posts WHERE post_type = "page" AND post_status NOT LIKE "auto-draft" AND post_title LIKE "%'.$keyword.'%" ORDER BY ID DESC';
$res = $sql->query($query);

while ($my = mysql_fetch_assoc($res)) {
	
	if ($my['post_parent'] > 0) {
		$list = gibParent($my['post_parent']);
	}
	
	$found .= '<li>'.$list.'<a href="post.php?post='.$my['ID'].'&action=edit"><b>'.$my['post_title'].'</b></a></li>';
	
}

if ($found) {
	$found = '<ul>'.$found.'</ul>';
} else {
	$found = 'Found Nothing!';
}


echo $found;


function gibParent($id) {
	global $table_prefix;
	global $sql;
	$query = 'SELECT ID,post_title,post_parent FROM '.$table_prefix.'posts WHERE ID = "'.$id.'"';
	$my = $sql->query_first($query);
	$list = '<a href="post.php?post='.$my['ID'].'&action=edit">'.$my['post_title'].'</a>  &raquo; ';
	if ($my['post_parent'] > 0) {
		$list = gibParent($my['post_parent']).' '.$list;
	}
	return $list;
}
?>
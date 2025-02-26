<?php
require '../../../wp-config.php';
require './mysql.class.php';

$sql = new CMysql();
$sql->mysql_login();


echo '
<ul class="subsubsub">
<li><a href="edit.php?post_type=page&switchpagemanager=wp">Switch to Wordpress Page Manager</a></li>
</ul>
			<div style="clear:both"></div>
		
		
		<form method="GET" name="searchform" onsubmit="liveSearchStart(); return false;" >
			<label class="screen-reader-text" for="post-search-input">Adv. Search:</label>
			<input type="search" id="post-search-input" name="q" value="" onkeyup="liveSearchStart();" />
			<input type="submit" name="" id="search-submit" class="button" value="Search Page"  />
		</form>
		<div id="searchoutput" ></div>
		<div style="clear:both"></div>';
?>
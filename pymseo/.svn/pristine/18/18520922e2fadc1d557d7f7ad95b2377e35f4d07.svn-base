<?php
//###############################
//--> Bloquear el acceso a wp-config.php wp-config-sample.php
//###############################
	array_push($pymlineashtaccessBlockFile,'# BEGIN - Protect wp-config.php | wp-config-sample.php');
	array_push($pymlineashtaccessBlockFile,'<FilesMatch "^(wp-config|wp-config-sample).*$">');
	array_push($pymlineashtaccessBlockFile,'order allow,deny');
	array_push($pymlineashtaccessBlockFile,'deny from all');
	array_push($pymlineashtaccessBlockFile,'</FilesMatch>');
	array_push($pymlineashtaccessBlockFile,'# END - Protect wp-config.php | wp-config-sample.php');

?>
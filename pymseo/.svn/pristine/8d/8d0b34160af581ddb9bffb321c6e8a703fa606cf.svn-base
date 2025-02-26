<?php
//###############################
//--> Bloquear el acceso a readme.html license.txt licencia.txt
//###############################

	array_push($pymlineashtaccessBlockFile,'# BEGIN - Protect license.txt | readme.html');
	array_push($pymlineashtaccessBlockFile,'<FilesMatch "^(license|readme|licencia).*$">');
	array_push($pymlineashtaccessBlockFile,'order allow,deny');
	array_push($pymlineashtaccessBlockFile,'deny from all');
	array_push($pymlineashtaccessBlockFile,'</FilesMatch>');
	array_push($pymlineashtaccessBlockFile,'# END - Protect license.txt | readme.html');

?>
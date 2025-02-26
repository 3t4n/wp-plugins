<?php
//###############################
//--> Bloquear el escaneo de autores
//###############################
	array_push($pymlineashtaccessBlockFile,'# BEGIN - Blocking Author ');
	array_push($pymlineashtaccessBlockFile,'RewriteCond %{QUERY_STRING} ^author= [NC]');
	array_push($pymlineashtaccessBlockFile,'RewriteRule .* - [F,L]');
	array_push($pymlineashtaccessBlockFile,'RewriteRule ^author/ - [F,L]');
	array_push($pymlineashtaccessBlockFile,'# END - Blocking Author ');
?>
<?php
//###############################
//--> Desactivar la firma del servidor
//###############################
array_push($pymlineashtaccessBlockFile,'# BEGIN - Disable Server Signature');
array_push($pymlineashtaccessBlockFile,'ServerSignature Off');
array_push($pymlineashtaccessBlockFile,'# END - Disable Server Signature');
?>
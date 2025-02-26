<?php
 header ("content-type: text/xml");
 header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
 header("Last-Modified: ".gmdate( "D, d M Y H:i:s")."GMT");
 header("Cache-Control: no-cache, must-revalidate");
 header("Pragma: no-cache");

 $doc = new DOMDocument();
 $doc->load( 'http://minnesota.publicradio.org/radio/services/the_current/songs_played/playlist_data.php' );
 print $doc->saveXML();
?>
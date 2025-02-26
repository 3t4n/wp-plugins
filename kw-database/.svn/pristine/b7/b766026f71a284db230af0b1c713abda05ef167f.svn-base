<?php 

require_once(dirname(__FILE__).'/admin.php');

require_once(dirname(__FILE__).'/config.php');

$link=mysql_connect($host,$user,$pass);

mysql_select_db($base);

// La requete
$requete="DELETE a,b,c FROM ".$prefix."posts a LEFT JOIN ".$prefix."term_relationships b ON (a.ID = b.object_id) LEFT JOIN ".$prefix."postmeta c ON (a.ID = c.post_id) WHERE a.post_type = 'revision';";

$result=mysql_query($requete); 
// Vérification du résultat 
// Ceci montre la requête envoyée à MySQL ainsi que l'erreur. Utile pour déboguer. 
if (!$result) { 
echo "<div id=\"message\" class=\"updated fade\"><p><strong>";
echo _e("Erreur. Requ&ecirc;te invalide", "kw-data" );
echo " : " . mysql_error() . "</strong></p></div>"; 
echo "<ul class=\"alerte\"><li list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png);\">";
echo _e("Erreur. Requ&ecirc;te compl&egrave;te", "kw-data" );
echo " : " . $requete . "</li></ul>"; 
}
else {
echo "<div id=\"message\" class=\"updated fade\"><p><strong>";
echo _e("Succ&egrave;s. R&eacute;visions effac&eacute;es", "kw-data" );
echo "</strong></p></div>"; 
echo "<ul class=\"alerte\"><li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\">";
echo _e("Succ&egrave;s. Requ&ecirc;te compl&egrave;te", "kw-data" );
echo " : " . $requete . "</li></ul>"; 
}

mysql_close();

?>
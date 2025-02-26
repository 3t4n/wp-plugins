<?php 

require_once(dirname(__FILE__).'/admin.php'); 

require_once(dirname(__FILE__).'/config.php');	

$link = mysql_connect($host,$user,$pass);

mysql_select_db($base);

// La requete
$requete = "DELETE FROM ".$prefix."comments WHERE comment_approved = 'spam';";

$result=mysql_query($requete); 
// Vérification du résultat 
// Ceci montre la requête envoyée à MySQL ainsi que l'erreur. Utile pour déboguer. 
if (!$result) { 
echo "<div id=\"message\" class=\"updated fade\"><p><strong>";
echo _e("Erreur. Requ&ecirc;te invalide", "kw-data" );
echo " : " . mysql_error() . "</strong></p></div>"; 
echo "<ul class=\"alerte\"><li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png);\">";
echo _e("Erreur. Requ&ecirc;te compl&egrave;te", "kw-data" );
echo " : " . $requete . "</li></ul>"; 
}
else {
echo "<div id=\"message\" class=\"updated fade\"><p><strong>";
echo _e("Succ&egrave;s. Commentaires marqu&eacute;s comme \"spam\" effac&eacute;s", "kw-data" );
echo "</strong></p></div>"; 
echo "<ul class=\"alerte\"><li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\">";
echo _e("Succ&egrave;s. Requ&ecirc;te compl&egrave;te", "kw-data" );
echo " : " . $requete . "</li></ul>"; 
}

mysql_close();

?>
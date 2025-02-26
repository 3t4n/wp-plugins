<?php 

require_once(dirname(__FILE__).'/admin.php');


function dump($ignore){
require_once(dirname(__FILE__).'/config.php');
 
 //On crée le répertoire de sauvegarde
$nom_dossier = date('d-m-Y');
$nombre = time();
mkdir(''.dirname(__FILE__).'/temp/sauvegarde-' . $nom_dossier . '-' . $nombre . '', 0705);

//Securité pour la lecture de fichier ou encore le listing répertoire
$security1 = fopen(''.dirname(__FILE__).'/temp/sauvegarde-' . $nom_dossier . '-' . $nombre . '/index.html', 'x');
fclose($security1);
$security2 = fopen(''.dirname(__FILE__).'/temp/sauvegarde-' . $nom_dossier . '-' . $nombre . '/index.php', 'x');
fclose($security2);

//On récupère la bonne adresse du répertoire
$security1 = ''.dirname(__FILE__).'/temp/sauvegarde-' . $nom_dossier . '-' . $nombre . '/index.html';
$security2 = ''.dirname(__FILE__).'/temp/sauvegarde-' . $nom_dossier . '-' . $nombre . '/index.php';
?>

<?php
//Retourne une alerte de sécurité si l'écriture d'un des fichiers d' index est possible
if (is_writable($security1 || $security2)) {
    echo '<ul class="alerte"><li style="list-style-image:url('.WP_PLUGIN_URL.'/kw-database/img/false.png);">';
	echo _e("Votre sauvegarde a r&eacute;ussie mais un de vos fichiers de s&eacute;curit&eacute; est accessible en &eacute;criture, votre sauvegarde court un risque", "kw-data" );
	echo '</li></ul>&nbsp;';
} else {
    echo '<ul class="alerte"><li style="list-style-image:url('.WP_PLUGIN_URL.'/kw-database/img/true.png);">';
	echo _e("Votre sauvegarde a r&eacute;ussie. L'analyse de s&eacute;curit&eacute; montre que le dossier de sauvegarde nouvellement cr&eacute;&eacute; est correctement prot&eacute;g&eacute;", "kw-data" );
	echo '</li></ul>&nbsp;';
}

//Liste les fichier et les retournent
$dir_nom = ''.dirname(__FILE__).'/temp/sauvegarde-' . $nom_dossier . '-' . $nombre . ''; // dossier listé 
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier
$fichier= array(); // on déclare le tableau contenant le nom des fichiers/documents
$dossier= array(); // on déclare le tableau contenant le nom des répertoires

while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);

if(!empty($dossier)) {
	sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
	echo "<h4>";
	echo _e("Liste des r&eacute;pertoires accessibles dans", "kw-data" );
	echo "&nbsp;&laquo; sauvegarde-$nom_dossier-$nombre &raquo; </h4> \n\n";
	echo "\t\t<ul class=\"alerte\">\n";
		foreach($dossier as $lien){
			echo "\t\t\t<li><a href=\"".WP_PLUGIN_URL."/kw-database/temp/sauvegarde-$nom_dossier-$nombre/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
}

if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
	echo "<h4>";
	echo _e("Liste des fichiers/documents accessibles dans", "kw-data" );
	echo "&nbsp;&laquo; sauvegarde-$nom_dossier-$nombre &raquo; </h4> \n\n";
	echo "\t\t<ul class=\"alerte\">\n";
		foreach($fichier as $lien) {
			if (is_writable($security1 || $security2)) {
    			echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png);\"><a href=\"".WP_PLUGIN_URL."/kw-database/temp/sauvegarde-$nom_dossier-$nombre/$lien \">$lien</a>&nbsp;";
				echo _e("Analyse de s&eacute;curit&eacute; : nouveau r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; sauvegarde-$nom_dossier-$nombre &raquo;&nbsp;";
				echo _e("court un risque", "kw-data" );
				echo "</li>\n";}
			else {
    			echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\"><a href=\"".WP_PLUGIN_URL."/kw-database/temp/sauvegarde-$nom_dossier-$nombre/$lien \">$lien</a>&nbsp;";
				echo _e("Analyse de s&eacute;curit&eacute; : nouveau r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; sauvegarde-$nom_dossier-$nombre &raquo;&nbsp;";
				echo _e("correctement prot&eacute;g&eacute;", "kw-data" );
				echo "</li>\n";}
			}
		echo "\t\t</ul>";
 }
 
 //Connexion à la base de données
 $db = mysql_connect($host, $user, $pass) or die(mysql_error());
 mysql_select_db($base, $db) or die(mysql_error());

 //on récupère la liste des tables de la base de données
 $sql = 'SHOW TABLES FROM '.$base;
 $tables = mysql_query($sql) or die(mysql_error());

 // si on ne veut pas récupérer les $ignore premières tables
 for ($i=0; $i<$ignore; $i++) ($donnees = mysql_fetch_array($tables));

//Un peu de style à la liste des tables
echo "<h4>";
echo _e("Liste des tables disponibles dans", "kw-data" );
echo "&nbsp;&laquo; sauvegarde-$nom_dossier-$nombre &raquo; </h4> \n\n";
echo "\t\t<ul class=\"alerte\">\n";

 // On boucle sur toutes les tables
 while ($donnees = mysql_fetch_array($tables))
 {
  // on récupère la structure de la table
  $table = $donnees[0];
  $sql = 'SHOW CREATE TABLE '.$table;
  $res = mysql_query($sql) or die(mysql_error().$sql);
  if ($res)
  {
   $nom_dossier = date('d-m-Y');
   $backup_file = ''.dirname(__FILE__).'/temp/sauvegarde-' . $nom_dossier . '-' . $nombre . '/' . $table . '.sql.gz';
   $fp = gzopen($backup_file, 'w');
   
   $tableau = mysql_fetch_array($res);
   $tableau[1] .= ";\n";
   $insertions = $tableau[1];
   gzwrite($fp, $insertions);

   $req_table = mysql_query('SELECT * FROM '.$table) or die(mysql_error());
   $nbr_champs = mysql_num_fields($req_table);
   while ($ligne = mysql_fetch_array($req_table))
   {
    $insertions = 'INSERT INTO '.$table.' VALUES (';
    for ($i=0; $i<$nbr_champs; $i++)
    {
     $insertions .= '\'' . mysql_real_escape_string($ligne[$i]) . '\', ';
    }
    $insertions = substr($insertions, 0, -2);
    $insertions .= ");\n";
    gzwrite($fp, $insertions);
   }
//Retourne l'array des tables sauvegardées
echo '<div class="array"><li>'.$tableau [0].'<span><a class="button" href="'.WP_PLUGIN_URL.'/kw-database/temp/sauvegarde-'.$nom_dossier.'-'.$nombre.'/'.$tableau [0].'.sql.gz">';
echo _e("t&eacute;l&eacute;charger", "kw-data" );
echo '&nbsp;!</a></span></li></div>';
  } //Fin if ($res)
  mysql_free_result($res);
  gzclose($fp);
 }echo "\t\t</ul>"; //Fin du "un peu de style"
 return true;
}
echo '<div id="message" class="updated fade"><p><strong>';
echo _e("Succ&egrave;s de l'op&eacute;ration sauvegarde sur serveur", "kw-data" );
echo '</strong></p></div>';
//Appel de la fonction
$dump = dump(0);
?>
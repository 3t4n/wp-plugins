<?php 

require_once(dirname(__FILE__).'/admin.php'); 

$dir_nom = ''.dirname(__FILE__).'/temp'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die(_e('Erreur de listage : le r&eacute;pertoire n\'existe pas')); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

//On récupère la bonne adresse du répertoire
$security1 = ''.dirname(__FILE__).'/temp/index.html';
$security2 = ''.dirname(__FILE__).'/temp/index.php';

while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);


if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
	echo "<h4>";
	echo _e("Analyse de s&eacute;curit&eacute; des fichiers index disponibles dans", "kw-data" );
	echo "&nbsp;&laquo; temp &raquo; </h4> \n\n";
	echo "\t\t<ul class=\"alerte\">\n";
		foreach($fichier as $lien) {
			if (is_writable($security1) || is_writable($security2)) {
    			echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png);\"><a href=\"".WP_PLUGIN_URL."/kw-database/temp/$lien \">$lien</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier est accessible en &eacute;criture, <b>vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; temp &raquo;&nbsp;";
				echo _e("courent un risque", "kw-data" );
				echo "</b></li>\n";} 
			else {
    			echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png);\"><a href=\"".WP_PLUGIN_URL."/kw-database/temp/$lien \">$lien</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que ce fichier n'est pas accessible en &eacute;criture, la sauvegarde du dossier", "kw-data" );
				echo "&nbsp;&laquo; temp &raquo;&nbsp;";
				echo _e("est prot&eacute;g&eacute;e", "kw-data" );
				echo "</li>\n";}
			} ?>
            <br />
            <?php
		foreach($fichier as $lien) {
	if (file_exists($security1) || file_exists($security2)) {
				echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/true.png)\"><a href=\"".WP_PLUGIN_URL."/kw-database/temp/$lien \">$lien</a>&nbsp;";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que au moins un des fichiers d'index existe pour prot&eacute;ger vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; temp &raquo;</li>\n";}
			else {
				echo "\t\t\t<li style=\"list-style-image:url(".WP_PLUGIN_URL."/kw-database/img/false.png)\"><a href=\"".WP_PLUGIN_URL."/kw-database/temp/$lien \">$lien</a>";
				echo _e("L' analyse de s&eacute;curit&eacute; montre que les fichiers d'index n'existe pas dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; $dir_nom &raquo;,&nbsp;<b>";
				echo _e("vos sauvegardes dans le r&eacute;pertoire", "kw-data" );
				echo "&nbsp;&laquo; temp &raquo;&nbsp;";
				echo _e("courent un risque", "kw-data" );
				echo "</b></li>\n";}
 }
 	echo "\t\t</ul>";
 }

if(!empty($dossier)) {
	rsort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
	echo "<h4>Liste des sauvegardes disponibles dans &laquo; temp &raquo; (du plus r&eacute;cent au plus ancien)</h4> \n\n";
	echo "\t\t<ol>\n";
	echo '<form method="post" name="clearDir" target="_self">';
	echo '<input name="submitted" type="hidden" value="yes" /><input type="submit" name="Submit" value="';
	echo _e("Effacer le plus vieux dossier", "kw-data" );
	echo '&nbsp;&raquo;" /></p>';
	echo "</form>";
		foreach($dossier as $lien) {
			echo "\t\t\t<li><img src=\"".WP_PLUGIN_URL."/kw-database/img/dir.gif\" />&nbsp;&nbsp;<a href=\"".WP_PLUGIN_URL."/kw-database/temp/$lien \">$lien</a>&nbsp;";
		}

	echo "\t\t</ol>";
	echo '<div id="message" class="updated fade"><p><strong>';
	echo _e("Succ&egrave;s du listing des dossiers", "kw-data" );
	echo '</strong></p></div>';
 }
 else {
	 echo "<h4>";
	 echo _e("Aucune sauvegardes disponibles dans", "kw-data" );
	 echo "&nbsp;&laquo; temp &raquo;</h4> \n\n";
	 echo '<div id="message" class="updated fade"><p><strong>';
	 echo _e("Aucune sauvegardes disponibles dans", "kw-data" );
	 echo '&nbsp;&laquo; temp &raquo;</strong></p></div>';
	 }
?>
<?php

$a_del = ''.dirname(__FILE__).'/temp/' . $lien . ''; 

clearDir($a_del);
function clearDir($dossier) {
	
if(isset($_POST['submitted']) && $_POST['submitted'] == "yes"){
	
	$ouverture=@opendir($dossier);
	if (!$ouverture) return;
	while($fichier=readdir($ouverture)) {
		if ($fichier == '.' || $fichier == '..') continue;
			if (is_dir($dossier."/".$fichier)) {
				$r=clearDir($dossier."/".$fichier);
				if (!$r) return false;
			}
			else {
				$r=@unlink($dossier."/".$fichier);
				if (!$r) return false;
			}
	}
echo '<div id="message" class="updated fade"><p><strong>';
echo _e("Succ&egrave;s. Dossier effac&eacute;", "kw-data" );
echo '</strong>&nbsp;</p><META HTTP-EQUIV="Refresh" CONTENT="1;URL=/wp-admin/options.php?page=gestionfolder"></div>';
echo '<div id="message" class="updated fade"><p><img class="load" src="'.WP_PLUGIN_URL.'/kw-database/img/attente.gif" /><b>&nbsp;';
echo _e("List des dossiers en cours de rafraichissement. Merci de patientez", "kw-data" );
echo '...</b></p></div>';
echo '<p><img class="load" src="'.WP_PLUGIN_URL.'/kw-database/img/attente.gif" /><b>&nbsp;';
echo _e("List des dossiers en cours de rafraichissement. Merci de patientez", "kw-data" );
echo '</b></p>';
closedir($ouverture);
$r=@rmdir($dossier);
@rename($dossier,"trash");
return true;

}

else {}

}
?>